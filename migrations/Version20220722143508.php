<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220722143508 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE specialevents DROP FOREIGN KEY FK_758115978694366F');
        $this->addSql('DROP INDEX IDX_758115978694366F ON specialevents');
        $this->addSql('ALTER TABLE specialevents CHANGE specialeventtype_id_id specialeventtype_id INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE specialevents ADD CONSTRAINT FK_758115979BDE7D14 FOREIGN KEY (specialeventtype_id) REFERENCES specialeventtype (id)');
        $this->addSql('CREATE INDEX IDX_758115979BDE7D14 ON specialevents (specialeventtype_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE specialevents DROP FOREIGN KEY FK_758115979BDE7D14');
        $this->addSql('DROP INDEX IDX_758115979BDE7D14 ON specialevents');
        $this->addSql('ALTER TABLE specialevents CHANGE specialeventtype_id specialeventtype_id_id INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE specialevents ADD CONSTRAINT FK_758115978694366F FOREIGN KEY (specialeventtype_id_id) REFERENCES specialeventtype (id)');
        $this->addSql('CREATE INDEX IDX_758115978694366F ON specialevents (specialeventtype_id_id)');
    }
}
