<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260318170530 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE driver CHANGE photo photo VARCHAR(255) DEFAULT NULL, CHANGE description description LONGTEXT DEFAULT NULL, CHANGE quotes quotes VARCHAR(255) DEFAULT NULL, CHANGE image_biography image_biography VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE game ADD description LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE team ADD description LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE driver CHANGE photo photo VARCHAR(255) NOT NULL, CHANGE description description LONGTEXT NOT NULL, CHANGE quotes quotes VARCHAR(255) NOT NULL, CHANGE image_biography image_biography VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE game DROP description');
        $this->addSql('ALTER TABLE team DROP description');
    }
}
