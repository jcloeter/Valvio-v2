<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220604210609 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__instrument_pitch_fingerings AS SELECT id FROM instrument_pitch_fingerings');
        $this->addSql('DROP TABLE instrument_pitch_fingerings');
        $this->addSql('CREATE TABLE instrument_pitch_fingerings (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, instrument_id_id INTEGER DEFAULT NULL, pitch_id_id INTEGER DEFAULT NULL, fingering_position_id INTEGER DEFAULT NULL, CONSTRAINT FK_E1931BC3A79E2A3E FOREIGN KEY (instrument_id_id) REFERENCES instrument (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_E1931BC3B79B28CE FOREIGN KEY (pitch_id_id) REFERENCES pitch (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_E1931BC3DD57D81F FOREIGN KEY (fingering_position_id) REFERENCES finger_position (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO instrument_pitch_fingerings (id) SELECT id FROM __temp__instrument_pitch_fingerings');
        $this->addSql('DROP TABLE __temp__instrument_pitch_fingerings');
        $this->addSql('CREATE INDEX IDX_E1931BC3A79E2A3E ON instrument_pitch_fingerings (instrument_id_id)');
        $this->addSql('CREATE INDEX IDX_E1931BC3B79B28CE ON instrument_pitch_fingerings (pitch_id_id)');
        $this->addSql('CREATE INDEX IDX_E1931BC3DD57D81F ON instrument_pitch_fingerings (fingering_position_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_E1931BC3A79E2A3E');
        $this->addSql('DROP INDEX IDX_E1931BC3B79B28CE');
        $this->addSql('DROP INDEX IDX_E1931BC3DD57D81F');
        $this->addSql('CREATE TEMPORARY TABLE __temp__instrument_pitch_fingerings AS SELECT id FROM instrument_pitch_fingerings');
        $this->addSql('DROP TABLE instrument_pitch_fingerings');
        $this->addSql('CREATE TABLE instrument_pitch_fingerings (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, instrument_id INTEGER NOT NULL, pitch_id INTEGER NOT NULL, fingering_position INTEGER NOT NULL)');
        $this->addSql('INSERT INTO instrument_pitch_fingerings (id) SELECT id FROM __temp__instrument_pitch_fingerings');
        $this->addSql('DROP TABLE __temp__instrument_pitch_fingerings');
    }
}
