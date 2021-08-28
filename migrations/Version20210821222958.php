<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210821222958 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE service_vehicule (id INT AUTO_INCREMENT NOT NULL, service_id INT DEFAULT NULL, vehicule_id INT DEFAULT NULL, INDEX IDX_D059A420ED5CA9E6 (service_id), INDEX IDX_D059A4204A4A3511 (vehicule_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tarif_vehicule (id INT AUTO_INCREMENT NOT NULL, type_tarif_id INT DEFAULT NULL, vehicule_id INT DEFAULT NULL, prix DOUBLE PRECISION NOT NULL, INDEX IDX_2FEA2B70F8832DA5 (type_tarif_id), INDEX IDX_2FEA2B704A4A3511 (vehicule_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicule_zone (id INT AUTO_INCREMENT NOT NULL, zone_id INT DEFAULT NULL, vehicule_id INT DEFAULT NULL, INDEX IDX_CCEC7BE89F2C3FAB (zone_id), INDEX IDX_CCEC7BE84A4A3511 (vehicule_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE service_vehicule ADD CONSTRAINT FK_D059A420ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)');
        $this->addSql('ALTER TABLE service_vehicule ADD CONSTRAINT FK_D059A4204A4A3511 FOREIGN KEY (vehicule_id) REFERENCES vehicule (id)');
        $this->addSql('ALTER TABLE tarif_vehicule ADD CONSTRAINT FK_2FEA2B70F8832DA5 FOREIGN KEY (type_tarif_id) REFERENCES type_tarif (id)');
        $this->addSql('ALTER TABLE tarif_vehicule ADD CONSTRAINT FK_2FEA2B704A4A3511 FOREIGN KEY (vehicule_id) REFERENCES vehicule (id)');
        $this->addSql('ALTER TABLE vehicule_zone ADD CONSTRAINT FK_CCEC7BE89F2C3FAB FOREIGN KEY (zone_id) REFERENCES zone (id)');
        $this->addSql('ALTER TABLE vehicule_zone ADD CONSTRAINT FK_CCEC7BE84A4A3511 FOREIGN KEY (vehicule_id) REFERENCES vehicule (id)');
        $this->addSql('ALTER TABLE vehicule ADD users_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1D67B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_292FFF1D67B3B43D ON vehicule (users_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE service_vehicule');
        $this->addSql('DROP TABLE tarif_vehicule');
        $this->addSql('DROP TABLE vehicule_zone');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1D67B3B43D');
        $this->addSql('DROP INDEX IDX_292FFF1D67B3B43D ON vehicule');
        $this->addSql('ALTER TABLE vehicule DROP users_id');
    }
}
