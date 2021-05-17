<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210517110224 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE plante_tisane (plante_id INT NOT NULL, tisane_id INT NOT NULL, INDEX IDX_D4DDE49C177B16E8 (plante_id), INDEX IDX_D4DDE49C2930F991 (tisane_id), PRIMARY KEY(plante_id, tisane_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE plante_tisane ADD CONSTRAINT FK_D4DDE49C177B16E8 FOREIGN KEY (plante_id) REFERENCES plante (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE plante_tisane ADD CONSTRAINT FK_D4DDE49C2930F991 FOREIGN KEY (tisane_id) REFERENCES tisane (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE plante_tisane');
    }
}
