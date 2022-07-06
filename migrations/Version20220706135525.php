<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220706135525 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE specialevents (id INT UNSIGNED AUTO_INCREMENT NOT NULL, registrations_id INT UNSIGNED NOT NULL, eventdate DATETIME NOT NULL, remote SMALLINT UNSIGNED DEFAULT NULL, eventperiod SMALLINT UNSIGNED DEFAULT 0 NOT NULL, arrivaltime TIME DEFAULT NULL, departuretime TIME DEFAULT NULL, message VARCHAR(500) DEFAULT NULL, INDEX IDX_758115978279080 (registrations_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE specialevents ADD CONSTRAINT FK_758115978279080 FOREIGN KEY (registrations_id) REFERENCES registrations (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE specialevents');
    }
}
