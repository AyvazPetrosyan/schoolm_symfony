<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210227204627 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE grade (id INT AUTO_INCREMENT NOT NULL, title_am VARCHAR(50) NOT NULL, grade_ru VARCHAR(50) DEFAULT NULL, grade_en VARCHAR(50) DEFAULT NULL, color VARCHAR(10) NOT NULL, status TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE journal (id INT AUTO_INCREMENT NOT NULL, subject_id INT NOT NULL, class_id INT NOT NULL, user_id INT NOT NULL, grade_id INT NOT NULL, date DATE NOT NULL, hour VARCHAR(30) NOT NULL, status TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE roll (id INT AUTO_INCREMENT NOT NULL, title_am VARCHAR(50) NOT NULL, title_ru VARCHAR(50) DEFAULT NULL, title_en VARCHAR(50) DEFAULT NULL, status TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sclass (id INT AUTO_INCREMENT NOT NULL, title_am VARCHAR(30) NOT NULL, title_ru VARCHAR(50) DEFAULT NULL, title_en VARCHAR(50) DEFAULT NULL, status TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subject (id INT AUTO_INCREMENT NOT NULL, title_am VARCHAR(30) NOT NULL, title_ru VARCHAR(50) DEFAULT NULL, title_en VARCHAR(50) DEFAULT NULL, status TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(50) NOT NULL, middle_name VARCHAR(50) DEFAULT NULL, last_name VARCHAR(50) DEFAULT NULL, email VARCHAR(50) NOT NULL, user_name VARCHAR(50) NOT NULL, password VARCHAR(50) NOT NULL, roll_id INT NOT NULL, status TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE grade');
        $this->addSql('DROP TABLE journal');
        $this->addSql('DROP TABLE roll');
        $this->addSql('DROP TABLE sclass');
        $this->addSql('DROP TABLE subject');
        $this->addSql('DROP TABLE user');
    }
}
