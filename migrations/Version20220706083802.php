<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220706083802 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE registrations (id INT UNSIGNED AUTO_INCREMENT NOT NULL, userid_id INT UNSIGNED DEFAULT NULL, theactive INT UNSIGNED DEFAULT 1 NOT NULL, thebeginning DATETIME DEFAULT CURRENT_TIMESTAMP, theend DATETIME DEFAULT NULL, INDEX IDX_53DE51E758E0A285 (userid_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE registrations ADD CONSTRAINT FK_53DE51E758E0A285 FOREIGN KEY (userid_id) REFERENCES `user` (id)');
        $this->addSql('DROP TABLE inscription');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE inscription (id INT UNSIGNED AUTO_INCREMENT NOT NULL, userid_id INT UNSIGNED DEFAULT NULL, theactive INT UNSIGNED DEFAULT 1 NOT NULL, thebeginning DATETIME DEFAULT CURRENT_TIMESTAMP, theend DATETIME DEFAULT NULL, INDEX IDX_5E90F6D658E0A285 (userid_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D658E0A285 FOREIGN KEY (userid_id) REFERENCES user (id)');
        $this->addSql('DROP TABLE registrations');
    }
}
