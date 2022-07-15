<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220715123020 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE registrations DROP FOREIGN KEY FK_53DE51E76CA9C868');
        $this->addSql('CREATE TABLE specialeventtype (id INT UNSIGNED AUTO_INCREMENT NOT NULL, eventname VARCHAR(45) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE followups');
        $this->addSql('DROP INDEX UNIQ_53DE51E76CA9C868 ON registrations');
        $this->addSql('ALTER TABLE registrations DROP followups_id');
        $this->addSql('ALTER TABLE specialevents ADD specialeventtype_id_id INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE specialevents ADD CONSTRAINT FK_758115978694366F FOREIGN KEY (specialeventtype_id_id) REFERENCES specialeventtype (id)');
        $this->addSql('CREATE INDEX IDX_758115978694366F ON specialevents (specialeventtype_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE specialevents DROP FOREIGN KEY FK_758115978694366F');
        $this->addSql('CREATE TABLE followups (id INT UNSIGNED AUTO_INCREMENT NOT NULL, meetingdate DATETIME NOT NULL, punctuality VARCHAR(512) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, evolution VARCHAR(512) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, tests VARCHAR(512) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, behaviour VARCHAR(512) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE specialeventtype');
        $this->addSql('ALTER TABLE registrations ADD followups_id INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE registrations ADD CONSTRAINT FK_53DE51E76CA9C868 FOREIGN KEY (followups_id) REFERENCES followups (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_53DE51E76CA9C868 ON registrations (followups_id)');
        $this->addSql('DROP INDEX IDX_758115978694366F ON specialevents');
        $this->addSql('ALTER TABLE specialevents DROP specialeventtype_id_id');
    }
}
