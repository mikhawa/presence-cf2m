<?php

namespace App\Repository;

use App\Entity\Promotions;
use App\Entity\Registrations;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;

/**
 * @extends ServiceEntityRepository<User>
 *
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * @return User[]|null Returns an array of User objects
     *
     * @throws NonUniqueResultException
     */
    public function findUserByEmail($mail): ?array
    {
        return $this->createQueryBuilder('u')
            ->select('u.username, u.theuid')
            ->where('u.themail = :mail')
            ->setParameter('mail', $mail)
            ->getQuery()
            ->getOneOrNullResult(Query::HYDRATE_ARRAY);
    }

    /*
     *  UPDATE user SET `password`= ?, `theuid` = ?
        WHERE 	`theuid` = ?
        AND 	`username` = ?;
     */
    public function changePassword(string $newPwd, string $lastUid, string $username): string|bool
    {
        $db = $this->getEntityManager()->getConnection();
        $sql = $db->prepare("DROP EVENT IF EXISTS `:lastUid`");
        $sql->bindValue("lastUid", "Upid-" . $lastUid);
        $sql->executeQuery();
        return $this->createQueryBuilder('')
            ->update(User::class, "u")
            ->set("u.password", ":newPwd")
            ->set("u.theuid", ":newUid")
            ->where("u.theuid = :uid")
            ->andWhere("u.username = :username")
            ->setParameters([
                "newPwd" => password_hash($newPwd, PASSWORD_DEFAULT),
                "newUid" => uniqid(more_entropy: true),
                "uid" => $lastUid,
                "username" => $username,
            ],
            )
            ->getQuery()->execute();
    }

    public function remove(User $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function upgradePassword(PasswordAuthenticatedUserInterface $user, string $newHashedPassword): void
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', get_class($user)));
        }

        $user->setPassword($newHashedPassword);

        $this->add($user, true);
    }

    public function add(User $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function getUserByUidAndName(string $uid, string $name): ?array
    {
        return $this->createQueryBuilder("u")
            ->select("u.id")
            ->where("u.theuid = :uid")
            ->andWhere("u.username = :username")
            ->setParameters([
                "uid" => $uid,
                "username" => $name,
            ])
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function password_Url_Lifetime(string $lastUid, string $userName, string $interval): void
    {
        $sql = $this->getEntityManager()->getConnection()->prepare("
            CREATE EVENT IF NOT EXISTS `:event`
                 ON SCHEDULE AT (CURRENT_TIMESTAMP + INTERVAL :interval MINUTE) ON COMPLETION NOT PRESERVE ENABLE 
                 DO 
                     UPDATE user u 
                     SET u.theuid = :newUid
                     WHERE u.theuid = :lastUid
                     AND u.username = :username;");
        $sql->bindValue("event", "Upid-" . $lastUid);
        $sql->bindValue("newUid", uniqid(more_entropy: true));
        $sql->bindValue("lastUid", $lastUid);
        $sql->bindValue("username", $userName);
        $sql->bindValue("interval", $interval);
        $sql->executeQuery();
    }

    public function findAllUsersByRole(string $role = "USER")
    {
        return $this->createQueryBuilder("u")
            ->select("u.id, u.username ,u.thename, u.thesurname, u.themail")
            ->where("JSON_CONTAINS(u.roles, :role) = 1")
            ->andWhere("u.thestatus != 0")
            ->setParameter('role', '"ROLE_' . $role . '"')
            ->getQuery()
            ->getResult();
    }

    public function findInternsByPromotions(?string $acronym = null): ?array
    {
        $query = $this->createQueryBuilder("u")
            ->select("u.id, u.thename, u.thesurname, u.themail, u.username,
                      r.startingdate AS dateInscription, 
                      p.promoname, p.acronym, p.startingdate AS dateDebutPromotion")
            ->innerJoin(Registrations::class, "r", "WITH", "r.users = u.id")
            ->innerJoin(Promotions::class, "p", "WITH", "r.promotions = p.id");
        !$acronym ?: $query
            ->where("p.acronym = :acronym")
            ->setParameter("acronym", $acronym);
        return $query
            ->andWhere("p.active != 0")
            ->andWhere("u.thestatus != 0")
            ->getQuery()
            ->getResult(QUERY::HYDRATE_ARRAY);
    }

    public function findInternByUsername(string $promotion, string $username): array
    {
        $query = $this->getEntityManager()->getConnection()->prepare("
        SELECT u.id, u.username, u.roles, u.thename, u.thesurname, u.themail,
        r.startingdate AS 'dateInscription', ifnull(r.endingdate,'NULL') AS 'dateExpulsion',
        p.promoname, p.acronym, p.startingdate AS 'dateStartPromotion', p.endingdate AS 'dateEndPromotion', p.nbdays,
        o.optionname, o.acronym,
        group_concat(ifnull(s.id,'NULL')) AS 'specialeventsid',
        group_concat(ifnull(s.eventdate,'NULL') SEPARATOR '|||') AS 'eventdate', 
        group_concat(ifnull(s.remote,'NULL') SEPARATOR '|||') AS 'remote',
        group_concat(ifnull(s.eventperiod,'NULL') SEPARATOR '|||') AS 'eventperiod', 
        group_concat(ifnull(s.arrivaltime,'NULL') SEPARATOR '|||') AS 'arrivaltime', 
        group_concat(ifnull(s.departuretime,'NULL') SEPARATOR '|||') AS 'departuretime', 
        group_concat(ifnull(s.message,'NULL') SEPARATOR '|||') AS 'message',
        group_concat(ifnull(st.eventname,'NULL') SEPARATOR '|||') AS 'eventtype',
        group_concat(ifnull(pr.file,'NULL') SEPARATOR '|||') AS 'file' ,
        group_concat(ifnull(pr.firstdaycovered,'NULL') SEPARATOR '|||') AS 'firstdaycovered',
        group_concat(ifnull(pr.lastdaycovered,'NULL') SEPARATOR '|||') AS 'lastdaycovered'
        FROM user u
        INNER JOIN registrations r
        ON u.id = r.users_id
        INNER JOIN promotions p
        ON r.promotions_id = p.id
        INNER JOIN options o
        ON p.options_id = o.id
        LEFT JOIN specialevents s
        ON r.id = s.registrations_id
        LEFT JOIN specialeventtype st
        ON s.specialeventtype_id = st.id
        LEFT JOIN proofofabsences pr
        ON s.id = pr.specialevents_id
        WHERE u.username = :username 
        AND p.acronym = :promotion
        AND json_contains(u.roles, '\"ROLE_USER\"') = 1
        AND json_length(u.roles) = 1
        GROUP BY u.id;");
        $query->bindValue("username", $username);
        $query->bindValue("promotion", $promotion);
        $result = $query->executeQuery()->fetchAssociative();
        return $result ? [$result] : [];
    }

    //    /**
    //     * @return User[] Returns an array of User objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('u')
    //            ->andWhere('u.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('u.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?User
    //    {
    //        return $this->createQueryBuilder('u')
    //            ->andWhere('u.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
