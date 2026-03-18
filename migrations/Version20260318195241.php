<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260318195241 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE team ADD full_team_name VARCHAR(255) NOT NULL, ADD base VARCHAR(255) NOT NULL, ADD team_chief VARCHAR(255) NOT NULL, ADD technical_chief VARCHAR(255) NOT NULL, ADD chassis VARCHAR(255) NOT NULL, ADD power_unit VARCHAR(255) NOT NULL, ADD reserve_driver VARCHAR(255) NOT NULL, ADD first_team_entry VARCHAR(255) NOT NULL, ADD image_biography VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE team DROP full_team_name, DROP base, DROP team_chief, DROP technical_chief, DROP chassis, DROP power_unit, DROP reserve_driver, DROP first_team_entry, DROP image_biography');
    }
}
