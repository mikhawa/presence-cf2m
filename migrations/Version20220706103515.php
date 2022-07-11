<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220706103515 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE promotions (id INT UNSIGNED AUTO_INCREMENT NOT NULL, promoname VARCHAR(45) NOT NULL, acronym VARCHAR(16) NOT NULL, startingdate DATE DEFAULT NULL, endingdate DATE DEFAULT NULL, nbdays SMALLINT UNSIGNED DEFAULT NULL, active SMALLINT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE registrations ADD promotions_id INT UNSIGNED DEFAULT NULL, CHANGE active active SMALLINT UNSIGNED DEFAULT 1 NOT NULL');
        $this->addSql('ALTER TABLE registrations ADD CONSTRAINT FK_53DE51E710007789 FOREIGN KEY (promotions_id) REFERENCES promotions (id)');
        $this->addSql('CREATE INDEX IDX_53DE51E710007789 ON registrations (promotions_id)');
        $this->addSql('ALTER TABLE user CHANGE thestatus thestatus SMALLINT UNSIGNED DEFAULT 0 NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE registrations DROP FOREIGN KEY FK_53DE51E710007789');
        $this->addSql('DROP TABLE promotions');
        $this->addSql('DROP INDEX IDX_53DE51E710007789 ON registrations');
        $this->addSql('ALTER TABLE registrations DROP promotions_id, CHANGE active active INT UNSIGNED DEFAULT 1 NOT NULL');
        $this->addSql('ALTER TABLE `user` CHANGE thestatus thestatus TINYINT(1) DEFAULT 0 NOT NULL');
    }
}
