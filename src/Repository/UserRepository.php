<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;
use function get_class;

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
    public function findUserByEmail($mail) : ?array
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
    public function changePassword(string $newPwd, string $lastUid, string $username) : string|bool
    {
        return $this->createQueryBuilder('')
                    ->update(User::class, "u")
                    ->set("u.password", ":newPwd")
                    ->set("u.theuid", ":newUid")
                    ->where("u.theuid = :uid")
                    ->andWhere("u.username = :username")
                    ->setParameters([
                        "newPwd"   => password_hash($newPwd, PASSWORD_DEFAULT),
                        "newUid"   => uniqid(more_entropy: true),
                        "uid"      => $lastUid,
                        "username" => $username,
                    ],
                    )
                    ->getQuery()->execute();
    }

    public function remove(User $entity, bool $flush = false) : void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function upgradePassword(PasswordAuthenticatedUserInterface $user, string $newHashedPassword) : void
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', get_class($user)));
        }

        $user->setPassword($newHashedPassword);

        $this->add($user, true);
    }

    public function add(User $entity, bool $flush = false) : void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function getUserByUidAndName(string $uid, string $name) : ?array
    {
        return $this->createQueryBuilder("u")
                    ->select("u.id")
                    ->where("u.theuid = :uid")
                    ->andWhere("u.username = :username")
                    ->setParameters([
                        "uid"      => $uid,
                        "username" => $name,
                    ])
                    ->getQuery()
                    ->getOneOrNullResult();
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
