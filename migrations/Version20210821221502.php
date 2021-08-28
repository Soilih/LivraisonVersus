<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210821221502 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE type_vehicule (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicule (id INT AUTO_INCREMENT NOT NULL, typevehicule_id INT NOT NULL, marque VARCHAR(255) NOT NULL, volume VARCHAR(255) NOT NULL, puissance VARCHAR(255) DEFAULT NULL, detail LONGTEXT NOT NULL, etat VARCHAR(255) NOT NULL, modele VARCHAR(255) NOT NULL, matricule VARCHAR(255) NOT NULL, kilometrage VARCHAR(255) NOT NULL, galerie VARCHAR(255) NOT NULL, INDEX IDX_292FFF1D3402134C (typevehicule_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1D3402134C FOREIGN KEY (typevehicule_id) REFERENCES type_vehicule (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1D3402134C');
        $this->addSql('DROP TABLE type_vehicule');
        $this->addSql('DROP TABLE vehicule');
    }
}
