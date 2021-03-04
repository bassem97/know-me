<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210304142553 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, gerant_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, date DATE NOT NULL, INDEX IDX_3BAE0AA7A500A924 (gerant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gerant (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, f_name VARCHAR(255) NOT NULL, l_name VARCHAR(255) NOT NULL, pwd VARCHAR(255) NOT NULL, name_prop VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, img VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, f_name VARCHAR(255) NOT NULL, l_name VARCHAR(255) NOT NULL, pwd VARCHAR(255) NOT NULL, location VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA7A500A924 FOREIGN KEY (gerant_id) REFERENCES gerant (id)');
        $this->addSql('ALTER TABLE photo ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B78418A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_14B78418A76ED395 ON photo (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA7A500A924');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B78418A76ED395');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE gerant');
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP INDEX IDX_14B78418A76ED395 ON photo');
        $this->addSql('ALTER TABLE photo DROP user_id');
    }
}
