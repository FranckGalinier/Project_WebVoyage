<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240723071220 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE destination (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, image_path VARCHAR(255) NOT NULL, drapeau VARCHAR(255) NOT NULL, visa VARCHAR(255) NOT NULL, passport VARCHAR(255) NOT NULL, secure VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, langue VARCHAR(255) NOT NULL, monnaie VARCHAR(255) NOT NULL, debut_saison VARCHAR(255) NOT NULL, fin_saison VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE destination');
    }
}
