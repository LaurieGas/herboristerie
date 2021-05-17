<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210517104346 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE plante (id INT AUTO_INCREMENT NOT NULL, nom_plante VARCHAR(255) NOT NULL, nom_latin VARCHAR(255) NOT NULL, nom_commun VARCHAR(255) NOT NULL, famille VARCHAR(255) NOT NULL, origine_geographique VARCHAR(255) NOT NULL, description_botanique LONGTEXT NOT NULL, parties_utilisees VARCHAR(255) NOT NULL, proprietes LONGTEXT NOT NULL, image_plante VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE plante');
    }
}
