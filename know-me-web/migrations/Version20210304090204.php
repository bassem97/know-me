<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210304090204 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE photo (id INT AUTO_INCREMENT NOT NULL, image VARCHAR(255) DEFAULT NULL, bio VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD photo_id INT DEFAULT NULL, DROP photo');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6497E9E4C8C FOREIGN KEY (photo_id) REFERENCES photo (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D6497E9E4C8C ON user (photo_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D6497E9E4C8C');
        $this->addSql('DROP TABLE photo');
        $this->addSql('DROP INDEX UNIQ_8D93D6497E9E4C8C ON `user`');
        $this->addSql('ALTER TABLE `user` ADD photo VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP photo_id');
    }
}
