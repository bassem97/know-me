<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210305103017 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, fname VARCHAR(255) NOT NULL, lname VARCHAR(255) NOT NULL, pwd VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, gerant_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, date DATE NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_3BAE0AA7A500A924 (gerant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gerant (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, f_name VARCHAR(255) NOT NULL, l_name VARCHAR(255) NOT NULL, pwd VARCHAR(255) NOT NULL, name_prop VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, img VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, content VARCHAR(255) NOT NULL, date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, bio VARCHAR(255) DEFAULT NULL, INDEX IDX_14B78418A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reclamation (id INT AUTO_INCREMENT NOT NULL, sent_by_id INT NOT NULL, content VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_CE606404A45BB98C (sent_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, iduser_id INT NOT NULL, idroom_id INT NOT NULL, date DATETIME NOT NULL, nbpersonne INT NOT NULL, UNIQUE INDEX UNIQ_42C84955786A81FB (iduser_id), UNIQUE INDEX UNIQ_42C849558B1322FD (idroom_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE room (id INT AUTO_INCREMENT NOT NULL, menu_id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_729F519BCCD7E912 (menu_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, joined_at_id INT NOT NULL, email VARCHAR(255) NOT NULL, f_name VARCHAR(255) NOT NULL, l_name VARCHAR(255) NOT NULL, pwd VARCHAR(255) NOT NULL, location VARCHAR(255) NOT NULL, INDEX IDX_8D93D649EA5C6B (joined_at_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE matchs (user_id INT NOT NULL, match_user_id INT NOT NULL, INDEX IDX_6B1E6041A76ED395 (user_id), INDEX IDX_6B1E6041D0C88CFA (match_user_id), PRIMARY KEY(user_id, match_user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA7A500A924 FOREIGN KEY (gerant_id) REFERENCES gerant (id)');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B78418A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE606404A45BB98C FOREIGN KEY (sent_by_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955786A81FB FOREIGN KEY (iduser_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849558B1322FD FOREIGN KEY (idroom_id) REFERENCES room (id)');
        $this->addSql('ALTER TABLE room ADD CONSTRAINT FK_729F519BCCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id)');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D649EA5C6B FOREIGN KEY (joined_at_id) REFERENCES room (id)');
        $this->addSql('ALTER TABLE matchs ADD CONSTRAINT FK_6B1E6041A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE matchs ADD CONSTRAINT FK_6B1E6041D0C88CFA FOREIGN KEY (match_user_id) REFERENCES `user` (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA7A500A924');
        $this->addSql('ALTER TABLE room DROP FOREIGN KEY FK_729F519BCCD7E912');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849558B1322FD');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D649EA5C6B');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B78418A76ED395');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE606404A45BB98C');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955786A81FB');
        $this->addSql('ALTER TABLE matchs DROP FOREIGN KEY FK_6B1E6041A76ED395');
        $this->addSql('ALTER TABLE matchs DROP FOREIGN KEY FK_6B1E6041D0C88CFA');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE gerant');
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE photo');
        $this->addSql('DROP TABLE reclamation');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE room');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE matchs');
    }
}
