<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210821221922 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tarif_service (id INT AUTO_INCREMENT NOT NULL, service_id INT DEFAULT NULL, type_tarif_id INT NOT NULL, prix DOUBLE PRECISION NOT NULL, INDEX IDX_92FCE897ED5CA9E6 (service_id), INDEX IDX_92FCE897F8832DA5 (type_tarif_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tarif_service ADD CONSTRAINT FK_92FCE897ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)');
        $this->addSql('ALTER TABLE tarif_service ADD CONSTRAINT FK_92FCE897F8832DA5 FOREIGN KEY (type_tarif_id) REFERENCES type_tarif (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE tarif_service');
    }
}
