<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220718072702 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE attendancesheets (id INT UNSIGNED AUTO_INCREMENT NOT NULL, promotions_id INT UNSIGNED NOT NULL, file VARCHAR(150) NOT NULL, startingweekdate DATE NOT NULL, endingweekdate DATE NOT NULL, INDEX IDX_FFE2C73C10007789 (promotions_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE followups (id INT UNSIGNED AUTO_INCREMENT NOT NULL, meetingdate DATETIME NOT NULL, punctuality VARCHAR(512) NOT NULL, evolution VARCHAR(512) NOT NULL, tests VARCHAR(512) NOT NULL, behaviour VARCHAR(512) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE holidays (id INT UNSIGNED AUTO_INCREMENT NOT NULL, day DATE NOT NULL, holidayperiod INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE holidays_promotions (holidays_id INT UNSIGNED NOT NULL, promotions_id INT UNSIGNED NOT NULL, INDEX IDX_FEA484FF7C9675AB (holidays_id), INDEX IDX_FEA484FF10007789 (promotions_id), PRIMARY KEY(holidays_id, promotions_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE attendancesheets ADD CONSTRAINT FK_FFE2C73C10007789 FOREIGN KEY (promotions_id) REFERENCES promotions (id)');
        $this->addSql('ALTER TABLE holidays_promotions ADD CONSTRAINT FK_FEA484FF7C9675AB FOREIGN KEY (holidays_id) REFERENCES holidays (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE holidays_promotions ADD CONSTRAINT FK_FEA484FF10007789 FOREIGN KEY (promotions_id) REFERENCES promotions (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE inscription');
        $this->addSql('ALTER TABLE registrations ADD followups_id INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE registrations ADD CONSTRAINT FK_53DE51E76CA9C868 FOREIGN KEY (followups_id) REFERENCES followups (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_53DE51E76CA9C868 ON registrations (followups_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE registrations DROP FOREIGN KEY FK_53DE51E76CA9C868');
        $this->addSql('ALTER TABLE holidays_promotions DROP FOREIGN KEY FK_FEA484FF7C9675AB');
        $this->addSql('CREATE TABLE inscription (id INT UNSIGNED AUTO_INCREMENT NOT NULL, userid_id INT UNSIGNED DEFAULT NULL, theactive INT UNSIGNED DEFAULT 1 NOT NULL, thebeginning DATETIME DEFAULT CURRENT_TIMESTAMP, theend DATETIME DEFAULT NULL, INDEX IDX_5E90F6D658E0A285 (userid_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D658E0A285 FOREIGN KEY (userid_id) REFERENCES user (id)');
        $this->addSql('DROP TABLE attendancesheets');
        $this->addSql('DROP TABLE followups');
        $this->addSql('DROP TABLE holidays');
        $this->addSql('DROP TABLE holidays_promotions');
        $this->addSql('DROP INDEX UNIQ_53DE51E76CA9C868 ON registrations');
        $this->addSql('ALTER TABLE registrations DROP followups_id');
    }
}
