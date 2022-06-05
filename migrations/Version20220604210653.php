<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220604210653 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_E1931BC3DD57D81F');
        $this->addSql('DROP INDEX IDX_E1931BC3B79B28CE');
        $this->addSql('DROP INDEX IDX_E1931BC3A79E2A3E');
        $this->addSql('CREATE TEMPORARY TABLE __temp__instrument_pitch_fingerings AS SELECT id, fingering_position_id FROM instrument_pitch_fingerings');
        $this->addSql('DROP TABLE instrument_pitch_fingerings');
        $this->addSql('CREATE TABLE instrument_pitch_fingerings (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, fingering_position_id INTEGER DEFAULT NULL, instrument_id INTEGER DEFAULT NULL, pitch_id INTEGER DEFAULT NULL, CONSTRAINT FK_E1931BC3CF11D9C FOREIGN KEY (instrument_id) REFERENCES instrument (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_E1931BC3FEEFC64B FOREIGN KEY (pitch_id) REFERENCES pitch (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_E1931BC3DD57D81F FOREIGN KEY (fingering_position_id) REFERENCES finger_position (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO instrument_pitch_fingerings (id, fingering_position_id) SELECT id, fingering_position_id FROM __temp__instrument_pitch_fingerings');
        $this->addSql('DROP TABLE __temp__instrument_pitch_fingerings');
        $this->addSql('CREATE INDEX IDX_E1931BC3DD57D81F ON instrument_pitch_fingerings (fingering_position_id)');
        $this->addSql('CREATE INDEX IDX_E1931BC3CF11D9C ON instrument_pitch_fingerings (instrument_id)');
        $this->addSql('CREATE INDEX IDX_E1931BC3FEEFC64B ON instrument_pitch_fingerings (pitch_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_E1931BC3CF11D9C');
        $this->addSql('DROP INDEX IDX_E1931BC3FEEFC64B');
        $this->addSql('DROP INDEX IDX_E1931BC3DD57D81F');
        $this->addSql('CREATE TEMPORARY TABLE __temp__instrument_pitch_fingerings AS SELECT id, fingering_position_id FROM instrument_pitch_fingerings');
        $this->addSql('DROP TABLE instrument_pitch_fingerings');
        $this->addSql('CREATE TABLE instrument_pitch_fingerings (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, fingering_position_id INTEGER DEFAULT NULL, instrument_id_id INTEGER DEFAULT NULL, pitch_id_id INTEGER DEFAULT NULL)');
        $this->addSql('INSERT INTO instrument_pitch_fingerings (id, fingering_position_id) SELECT id, fingering_position_id FROM __temp__instrument_pitch_fingerings');
        $this->addSql('DROP TABLE __temp__instrument_pitch_fingerings');
        $this->addSql('CREATE INDEX IDX_E1931BC3DD57D81F ON instrument_pitch_fingerings (fingering_position_id)');
        $this->addSql('CREATE INDEX IDX_E1931BC3B79B28CE ON instrument_pitch_fingerings (pitch_id_id)');
        $this->addSql('CREATE INDEX IDX_E1931BC3A79E2A3E ON instrument_pitch_fingerings (instrument_id_id)');
    }
}
