<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220718081449 extends AbstractMigration
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
        $this->addSql('CREATE TABLE `user` (id INT UNSIGNED AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, thename VARCHAR(100) NOT NULL, thesurname VARCHAR(100) NOT NULL, themail VARCHAR(180) NOT NULL, theuid VARCHAR(25) NOT NULL, thestatus SMALLINT UNSIGNED DEFAULT 0 NOT NULL, UNIQUE INDEX UNIQ_8D93D649405C2D18 (themail), UNIQUE INDEX UNIQ_8D93D64928110ADD (theuid), UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE registrations ADD CONSTRAINT FK_53DE51E767B3B43D FOREIGN KEY (users_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE registrations ADD CONSTRAINT FK_53DE51E710007789 FOREIGN KEY (promotions_id) REFERENCES promotions (id)');
        $this->addSql('ALTER TABLE specialevents ADD CONSTRAINT FK_758115978279080 FOREIGN KEY (registrations_id) REFERENCES registrations (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE registrations DROP FOREIGN KEY FK_53DE51E710007789');
        $this->addSql('ALTER TABLE specialevents DROP FOREIGN KEY FK_758115978279080');
        $this->addSql('ALTER TABLE registrations DROP FOREIGN KEY FK_53DE51E767B3B43D');
        $this->addSql('DROP TABLE promotions');
        $this->addSql('DROP TABLE registrations');
        $this->addSql('DROP TABLE specialevents');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
