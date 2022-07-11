<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220706085333 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE registrations DROP FOREIGN KEY FK_53DE51E758E0A285');
        $this->addSql('DROP INDEX IDX_53DE51E758E0A285 ON registrations');
        $this->addSql('ALTER TABLE registrations CHANGE userid_id users_id INT UNSIGNED DEFAULT NULL, CHANGE theactive active INT UNSIGNED DEFAULT 1 NOT NULL, CHANGE thebeginning startingdate DATETIME DEFAULT CURRENT_TIMESTAMP, CHANGE theend endingdate DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE registrations ADD CONSTRAINT FK_53DE51E767B3B43D FOREIGN KEY (users_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_53DE51E767B3B43D ON registrations (users_id)');
        $this->addSql('DROP INDEX UNIQ_8D93D6492BF1E44A ON user');
        $this->addSql('ALTER TABLE user DROP thenationalid');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE registrations DROP FOREIGN KEY FK_53DE51E767B3B43D');
        $this->addSql('DROP INDEX IDX_53DE51E767B3B43D ON registrations');
        $this->addSql('ALTER TABLE registrations CHANGE users_id userid_id INT UNSIGNED DEFAULT NULL, CHANGE active theactive INT UNSIGNED DEFAULT 1 NOT NULL, CHANGE startingdate thebeginning DATETIME DEFAULT CURRENT_TIMESTAMP, CHANGE endingdate theend DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE registrations ADD CONSTRAINT FK_53DE51E758E0A285 FOREIGN KEY (userid_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_53DE51E758E0A285 ON registrations (userid_id)');
        $this->addSql('ALTER TABLE `user` ADD thenationalid VARCHAR(11) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D6492BF1E44A ON `user` (thenationalid)');
    }
}
