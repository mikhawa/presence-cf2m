<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220718090903 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE proofofabsences (id INT UNSIGNED AUTO_INCREMENT NOT NULL, specialevents_id INT UNSIGNED DEFAULT NULL, file VARCHAR(255) NOT NULL, firstdaycovered DATE NOT NULL, lastdaycovered DATE NOT NULL, INDEX IDX_82DD998F33173E92 (specialevents_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE proofofabsences ADD CONSTRAINT FK_82DD998F33173E92 FOREIGN KEY (specialevents_id) REFERENCES specialevents (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE proofofabsences');
    }
}
