<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20240421181716 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Initial tables structure';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE fish (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, fishname VARCHAR(50) NOT NULL, age INTEGER NOT NULL, level VARCHAR(10) NOT NULL)');
        $this->addSql('CREATE TABLE time_slot (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, date DATE NOT NULL, duration INTEGER NOT NULL, start_time TIME NOT NULL)');
        $this->addSql('CREATE TABLE reservation (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, fish_id INTEGER NOT NULL, time_slot_id INTEGER NOT NULL, CONSTRAINT FK_42C849558311A1E2 FOREIGN KEY (fish_id) REFERENCES fish (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_42C84955D62B0FA FOREIGN KEY (time_slot_id) REFERENCES time_slot (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_42C849558311A1E2 ON reservation (fish_id)');
        $this->addSql('CREATE INDEX IDX_42C84955D62B0FA ON reservation (time_slot_id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE fish');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE time_slot');
    }
}
