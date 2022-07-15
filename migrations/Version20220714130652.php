<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220714130652 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE options (id INT UNSIGNED AUTO_INCREMENT NOT NULL, optionname VARCHAR(45) NOT NULL, acronym VARCHAR(10) NOT NULL, color VARCHAR(7) NOT NULL, picto VARCHAR(45) NOT NULL, active SMALLINT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE promotions ADD options_id INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE promotions ADD CONSTRAINT FK_EA1B30343ADB05F1 FOREIGN KEY (options_id) REFERENCES options (id)');
        $this->addSql('CREATE INDEX IDX_EA1B30343ADB05F1 ON promotions (options_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE promotions DROP FOREIGN KEY FK_EA1B30343ADB05F1');
        $this->addSql('DROP TABLE options');
        $this->addSql('DROP INDEX IDX_EA1B30343ADB05F1 ON promotions');
        $this->addSql('ALTER TABLE promotions DROP options_id');
    }
}
