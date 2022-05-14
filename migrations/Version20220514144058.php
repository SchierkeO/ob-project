<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220514144058 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__damage_type AS SELECT id, class, name FROM damage_type');
        $this->addSql('DROP TABLE damage_type');
        $this->addSql('CREATE TABLE damage_type (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, class VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO damage_type (id, class, name) SELECT id, class, name FROM __temp__damage_type');
        $this->addSql('DROP TABLE __temp__damage_type');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE damage_type ADD COLUMN test VARCHAR(255) NOT NULL');
    }
}
