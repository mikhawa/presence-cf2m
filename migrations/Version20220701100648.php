<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220701100648 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inscription ADD userid_id INT UNSIGNED DEFAULT NULL');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D658E0A285 FOREIGN KEY (userid_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_5E90F6D658E0A285 ON inscription (userid_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D658E0A285');
        $this->addSql('DROP INDEX IDX_5E90F6D658E0A285 ON inscription');
        $this->addSql('ALTER TABLE inscription DROP userid_id');
    }
}
