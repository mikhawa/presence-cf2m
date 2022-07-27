<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220718081526 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE promotions (id INT UNSIGNED AUTO_INCREMENT NOT NULL, promoname VARCHAR(45) NOT NULL, acronym VARCHAR(16) NOT NULL, startingdate DATE DEFAULT NULL, endingdate DATE DEFAULT NULL, nbdays SMALLINT UNSIGNED DEFAULT NULL, active SMALLINT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE registrations (id INT UNSIGNED AUTO_INCREMENT NOT NULL, users_id INT UNSIGNED DEFAULT NULL, promotions_id INT UNSIGNED DEFAULT NULL, active SMALLINT UNSIGNED DEFAULT 1 NOT NULL, startingdate DATETIME DEFAULT CURRENT_TIMESTAMP, endingdate DATETIME DEFAULT NULL, INDEX IDX_53DE51E767B3B43D (users_id), INDEX IDX_53DE51E710007789 (promotions_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specialevents (id INT UNSIGNED AUTO_INCREMENT NOT NULL, registrations_id INT UNSIGNED NOT NULL, eventdate DATETIME NOT NULL, remote SMALLINT UNSIGNED DEFAULT NULL, eventperiod SMALLINT UNSIGNED DEFAULT 0 NOT NULL, arrivaltime TIME DEFAULT NULL, departuretime TIME DEFAULT NULL, message VARCHAR(500) DEFAULT NULL, INDEX IDX_758115978279080 (registrations_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE registrations ADD CONSTRAINT FK_53DE51E767B3B43D FOREIGN KEY (users_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE registrations ADD CONSTRAINT FK_53DE51E710007789 FOREIGN KEY (promotions_id) REFERENCES promotions (id)');
        $this->addSql('ALTER TABLE specialevents ADD CONSTRAINT FK_758115978279080 FOREIGN KEY (registrations_id) REFERENCES registrations (id)');
        $this->addSql('ALTER TABLE user DROP thenationalid, CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL, CHANGE themail themail VARCHAR(180) NOT NULL, CHANGE thestatus thestatus SMALLINT UNSIGNED DEFAULT 0 NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649405C2D18 ON user (themail)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D64928110ADD ON user (theuid)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE registrations DROP FOREIGN KEY FK_53DE51E710007789');
        $this->addSql('ALTER TABLE specialevents DROP FOREIGN KEY FK_758115978279080');
        $this->addSql('DROP TABLE promotions');
        $this->addSql('DROP TABLE registrations');
        $this->addSql('DROP TABLE specialevents');
        $this->addSql('DROP INDEX UNIQ_8D93D649405C2D18 ON `user`');
        $this->addSql('DROP INDEX UNIQ_8D93D64928110ADD ON `user`');
        $this->addSql('ALTER TABLE `user` ADD thenationalid INT NOT NULL, CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE themail themail VARCHAR(180) DEFAULT NULL, CHANGE thestatus thestatus INT NOT NULL');
    }
}
