<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260318205819 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE game_plateforme (game_id INT NOT NULL, plateforme_id INT NOT NULL, INDEX IDX_D2DECBFCE48FD905 (game_id), INDEX IDX_D2DECBFC391E226B (plateforme_id), PRIMARY KEY (game_id, plateforme_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE plateforme (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, manufacturer VARCHAR(255) NOT NULL, color VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE game_plateforme ADD CONSTRAINT FK_D2DECBFCE48FD905 FOREIGN KEY (game_id) REFERENCES game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE game_plateforme ADD CONSTRAINT FK_D2DECBFC391E226B FOREIGN KEY (plateforme_id) REFERENCES plateforme (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE game_plateforme DROP FOREIGN KEY FK_D2DECBFCE48FD905');
        $this->addSql('ALTER TABLE game_plateforme DROP FOREIGN KEY FK_D2DECBFC391E226B');
        $this->addSql('DROP TABLE game_plateforme');
        $this->addSql('DROP TABLE plateforme');
    }
}
