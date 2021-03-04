<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210304115950 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gerant (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, f_name VARCHAR(255) NOT NULL, l_name VARCHAR(255) NOT NULL, pwd VARCHAR(255) NOT NULL, name_prop VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, img VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, content VARCHAR(255) NOT NULL, date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo (id INT AUTO_INCREMENT NOT NULL, image VARCHAR(255) DEFAULT NULL, bio VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, photo_id INT DEFAULT NULL, email VARCHAR(255) NOT NULL, f_name VARCHAR(255) NOT NULL, l_name VARCHAR(255) NOT NULL, pwd VARCHAR(255) NOT NULL, location VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D6497E9E4C8C (photo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE matchs (user_id INT NOT NULL, match_user_id INT NOT NULL, INDEX IDX_6B1E6041A76ED395 (user_id), INDEX IDX_6B1E6041D0C88CFA (match_user_id), PRIMARY KEY(user_id, match_user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D6497E9E4C8C FOREIGN KEY (photo_id) REFERENCES photo (id)');
        $this->addSql('ALTER TABLE matchs ADD CONSTRAINT FK_6B1E6041A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE matchs ADD CONSTRAINT FK_6B1E6041D0C88CFA FOREIGN KEY (match_user_id) REFERENCES `user` (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D6497E9E4C8C');
        $this->addSql('ALTER TABLE matchs DROP FOREIGN KEY FK_6B1E6041A76ED395');
        $this->addSql('ALTER TABLE matchs DROP FOREIGN KEY FK_6B1E6041D0C88CFA');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE gerant');
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE photo');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE matchs');
    }
}
