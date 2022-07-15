<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220715093208 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE attendancesheets DROP FOREIGN KEY FK_FFE2C73CE8DB0A1E');
        $this->addSql('DROP INDEX IDX_FFE2C73CE8DB0A1E ON attendancesheets');
        $this->addSql('ALTER TABLE attendancesheets CHANGE promotions_id_id promotions_id INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE attendancesheets ADD CONSTRAINT FK_FFE2C73C10007789 FOREIGN KEY (promotions_id) REFERENCES promotions (id)');
        $this->addSql('CREATE INDEX IDX_FFE2C73C10007789 ON attendancesheets (promotions_id)');
        $this->addSql('ALTER TABLE promotions DROP FOREIGN KEY FK_EA1B3034BE3123F4');
        $this->addSql('DROP INDEX IDX_EA1B3034BE3123F4 ON promotions');
        $this->addSql('ALTER TABLE promotions CHANGE options_id_id options_id INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE promotions ADD CONSTRAINT FK_EA1B30343ADB05F1 FOREIGN KEY (options_id) REFERENCES options (id)');
        $this->addSql('CREATE INDEX IDX_EA1B30343ADB05F1 ON promotions (options_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE attendancesheets DROP FOREIGN KEY FK_FFE2C73C10007789');
        $this->addSql('DROP INDEX IDX_FFE2C73C10007789 ON attendancesheets');
        $this->addSql('ALTER TABLE attendancesheets CHANGE promotions_id promotions_id_id INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE attendancesheets ADD CONSTRAINT FK_FFE2C73CE8DB0A1E FOREIGN KEY (promotions_id_id) REFERENCES promotions (id)');
        $this->addSql('CREATE INDEX IDX_FFE2C73CE8DB0A1E ON attendancesheets (promotions_id_id)');
        $this->addSql('ALTER TABLE promotions DROP FOREIGN KEY FK_EA1B30343ADB05F1');
        $this->addSql('DROP INDEX IDX_EA1B30343ADB05F1 ON promotions');
        $this->addSql('ALTER TABLE promotions CHANGE options_id options_id_id INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE promotions ADD CONSTRAINT FK_EA1B3034BE3123F4 FOREIGN KEY (options_id_id) REFERENCES options (id)');
        $this->addSql('CREATE INDEX IDX_EA1B3034BE3123F4 ON promotions (options_id_id)');
    }
}
