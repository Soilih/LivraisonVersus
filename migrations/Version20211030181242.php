<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211030181242 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie_vehicule (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entreprise (id INT AUTO_INCREMENT NOT NULL, pays_id INT NOT NULL, users_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, code_naf VARCHAR(255) NOT NULL, detail LONGTEXT NOT NULL, logo VARCHAR(255) NOT NULL, site VARCHAR(255) NOT NULL, apropos VARCHAR(255) NOT NULL, postal DOUBLE PRECISION NOT NULL, titre VARCHAR(255) NOT NULL, INDEX IDX_D19FA60A6E44244 (pays_id), INDEX IDX_D19FA6067B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE galerie (id INT AUTO_INCREMENT NOT NULL, users_id INT DEFAULT NULL, image VARCHAR(255) NOT NULL, titre VARCHAR(255) NOT NULL, INDEX IDX_9E7D159067B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pays (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE planning (id INT AUTO_INCREMENT NOT NULL, users_id INT NOT NULL, heure_debut TIME NOT NULL, heure_fin TIME NOT NULL, jour_debut VARCHAR(255) NOT NULL, jour_fin VARCHAR(255) NOT NULL, detail LONGTEXT NOT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_D499BFF667B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reset_password_request (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, selector VARCHAR(20) NOT NULL, hashed_token VARCHAR(100) NOT NULL, requested_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', expires_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_7CE748AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, type_service_id INT DEFAULT NULL, users_id INT NOT NULL, detail LONGTEXT NOT NULL, condition_vente LONGTEXT NOT NULL, moyen_transport VARCHAR(255) NOT NULL, INDEX IDX_E19D9AD2F05F7FC3 (type_service_id), INDEX IDX_E19D9AD267B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service_vehicule (id INT AUTO_INCREMENT NOT NULL, service_id INT DEFAULT NULL, vehicule_id INT DEFAULT NULL, INDEX IDX_D059A420ED5CA9E6 (service_id), INDEX IDX_D059A4204A4A3511 (vehicule_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tarif_service (id INT AUTO_INCREMENT NOT NULL, service_id INT DEFAULT NULL, type_tarif_id INT NOT NULL, prix DOUBLE PRECISION NOT NULL, INDEX IDX_92FCE897ED5CA9E6 (service_id), INDEX IDX_92FCE897F8832DA5 (type_tarif_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tarif_vehicule (id INT AUTO_INCREMENT NOT NULL, type_tarif_id INT DEFAULT NULL, vehicule_id INT DEFAULT NULL, prix DOUBLE PRECISION NOT NULL, INDEX IDX_2FEA2B70F8832DA5 (type_tarif_id), INDEX IDX_2FEA2B704A4A3511 (vehicule_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_service (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_tarif (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_vehicule (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, telephone VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, numero_siret VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicule (id INT AUTO_INCREMENT NOT NULL, typevehicule_id INT NOT NULL, users_id INT DEFAULT NULL, marque VARCHAR(255) NOT NULL, volume VARCHAR(255) NOT NULL, puissance VARCHAR(255) DEFAULT NULL, detail LONGTEXT NOT NULL, etat VARCHAR(255) NOT NULL, modele VARCHAR(255) NOT NULL, matricule VARCHAR(255) NOT NULL, kilometrage VARCHAR(255) NOT NULL, galerie LONGTEXT NOT NULL, INDEX IDX_292FFF1D3402134C (typevehicule_id), INDEX IDX_292FFF1D67B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicule_zone (id INT AUTO_INCREMENT NOT NULL, zone_id INT DEFAULT NULL, vehicule_id INT DEFAULT NULL, INDEX IDX_CCEC7BE89F2C3FAB (zone_id), INDEX IDX_CCEC7BE84A4A3511 (vehicule_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE zone (id INT AUTO_INCREMENT NOT NULL, pays_id INT DEFAULT NULL, libelle VARCHAR(255) NOT NULL, postale DOUBLE PRECISION NOT NULL, ile VARCHAR(255) DEFAULT NULL, INDEX IDX_A0EBC007A6E44244 (pays_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE entreprise ADD CONSTRAINT FK_D19FA60A6E44244 FOREIGN KEY (pays_id) REFERENCES pays (id)');
        $this->addSql('ALTER TABLE entreprise ADD CONSTRAINT FK_D19FA6067B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE galerie ADD CONSTRAINT FK_9E7D159067B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE planning ADD CONSTRAINT FK_D499BFF667B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE reset_password_request ADD CONSTRAINT FK_7CE748AA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD2F05F7FC3 FOREIGN KEY (type_service_id) REFERENCES type_service (id)');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD267B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE service_vehicule ADD CONSTRAINT FK_D059A420ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)');
        $this->addSql('ALTER TABLE service_vehicule ADD CONSTRAINT FK_D059A4204A4A3511 FOREIGN KEY (vehicule_id) REFERENCES vehicule (id)');
        $this->addSql('ALTER TABLE tarif_service ADD CONSTRAINT FK_92FCE897ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)');
        $this->addSql('ALTER TABLE tarif_service ADD CONSTRAINT FK_92FCE897F8832DA5 FOREIGN KEY (type_tarif_id) REFERENCES type_tarif (id)');
        $this->addSql('ALTER TABLE tarif_vehicule ADD CONSTRAINT FK_2FEA2B70F8832DA5 FOREIGN KEY (type_tarif_id) REFERENCES type_tarif (id)');
        $this->addSql('ALTER TABLE tarif_vehicule ADD CONSTRAINT FK_2FEA2B704A4A3511 FOREIGN KEY (vehicule_id) REFERENCES vehicule (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1D3402134C FOREIGN KEY (typevehicule_id) REFERENCES type_vehicule (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1D67B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE vehicule_zone ADD CONSTRAINT FK_CCEC7BE89F2C3FAB FOREIGN KEY (zone_id) REFERENCES zone (id)');
        $this->addSql('ALTER TABLE vehicule_zone ADD CONSTRAINT FK_CCEC7BE84A4A3511 FOREIGN KEY (vehicule_id) REFERENCES vehicule (id)');
        $this->addSql('ALTER TABLE zone ADD CONSTRAINT FK_A0EBC007A6E44244 FOREIGN KEY (pays_id) REFERENCES pays (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entreprise DROP FOREIGN KEY FK_D19FA60A6E44244');
        $this->addSql('ALTER TABLE zone DROP FOREIGN KEY FK_A0EBC007A6E44244');
        $this->addSql('ALTER TABLE service_vehicule DROP FOREIGN KEY FK_D059A420ED5CA9E6');
        $this->addSql('ALTER TABLE tarif_service DROP FOREIGN KEY FK_92FCE897ED5CA9E6');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD2F05F7FC3');
        $this->addSql('ALTER TABLE tarif_service DROP FOREIGN KEY FK_92FCE897F8832DA5');
        $this->addSql('ALTER TABLE tarif_vehicule DROP FOREIGN KEY FK_2FEA2B70F8832DA5');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1D3402134C');
        $this->addSql('ALTER TABLE entreprise DROP FOREIGN KEY FK_D19FA6067B3B43D');
        $this->addSql('ALTER TABLE galerie DROP FOREIGN KEY FK_9E7D159067B3B43D');
        $this->addSql('ALTER TABLE planning DROP FOREIGN KEY FK_D499BFF667B3B43D');
        $this->addSql('ALTER TABLE reset_password_request DROP FOREIGN KEY FK_7CE748AA76ED395');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD267B3B43D');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1D67B3B43D');
        $this->addSql('ALTER TABLE service_vehicule DROP FOREIGN KEY FK_D059A4204A4A3511');
        $this->addSql('ALTER TABLE tarif_vehicule DROP FOREIGN KEY FK_2FEA2B704A4A3511');
        $this->addSql('ALTER TABLE vehicule_zone DROP FOREIGN KEY FK_CCEC7BE84A4A3511');
        $this->addSql('ALTER TABLE vehicule_zone DROP FOREIGN KEY FK_CCEC7BE89F2C3FAB');
        $this->addSql('DROP TABLE categorie_vehicule');
        $this->addSql('DROP TABLE entreprise');
        $this->addSql('DROP TABLE galerie');
        $this->addSql('DROP TABLE pays');
        $this->addSql('DROP TABLE planning');
        $this->addSql('DROP TABLE reset_password_request');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE service_vehicule');
        $this->addSql('DROP TABLE tarif_service');
        $this->addSql('DROP TABLE tarif_vehicule');
        $this->addSql('DROP TABLE type_service');
        $this->addSql('DROP TABLE type_tarif');
        $this->addSql('DROP TABLE type_vehicule');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE vehicule');
        $this->addSql('DROP TABLE vehicule_zone');
        $this->addSql('DROP TABLE zone');
    }
}
