<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220606125736 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_BB185579DD57D81F');
        $this->addSql('DROP INDEX IDX_BB185579FEEFC64B');
        $this->addSql('DROP INDEX IDX_BB185579CF11D9C');
        $this->addSql('CREATE TEMPORARY TABLE __temp__fingering_per_instrument_pitch AS SELECT id, instrument_id, pitch_id, fingering_position_id FROM fingering_per_instrument_pitch');
        $this->addSql('DROP TABLE fingering_per_instrument_pitch');
        $this->addSql('CREATE TABLE fingering_per_instrument_pitch (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, instrument_id INTEGER DEFAULT NULL, midi_number_id INTEGER DEFAULT NULL, fingering_position_id INTEGER DEFAULT NULL, CONSTRAINT FK_BB185579CF11D9C FOREIGN KEY (instrument_id) REFERENCES instrument (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_BB185579FD80BEB2 FOREIGN KEY (midi_number_id) REFERENCES midi_number (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_BB185579DD57D81F FOREIGN KEY (fingering_position_id) REFERENCES finger_position (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO fingering_per_instrument_pitch (id, instrument_id, midi_number_id, fingering_position_id) SELECT id, instrument_id, pitch_id, fingering_position_id FROM __temp__fingering_per_instrument_pitch');
        $this->addSql('DROP TABLE __temp__fingering_per_instrument_pitch');
        $this->addSql('CREATE INDEX IDX_BB185579DD57D81F ON fingering_per_instrument_pitch (fingering_position_id)');
        $this->addSql('CREATE INDEX IDX_BB185579CF11D9C ON fingering_per_instrument_pitch (instrument_id)');
        $this->addSql('CREATE INDEX IDX_BB185579FD80BEB2 ON fingering_per_instrument_pitch (midi_number_id)');
        $this->addSql('DROP INDEX IDX_E1D109F8FEEFC64B');
        $this->addSql('DROP INDEX IDX_E1D109F8352DB38');
        $this->addSql('CREATE TEMPORARY TABLE __temp__midi_number AS SELECT id, octave_id, pitch_id, midi_number FROM midi_number');
        $this->addSql('DROP TABLE midi_number');
        $this->addSql('CREATE TABLE midi_number (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, octave_id INTEGER NOT NULL, pitch_id INTEGER NOT NULL, midi_number INTEGER NOT NULL, CONSTRAINT FK_E1D109F8352DB38 FOREIGN KEY (octave_id) REFERENCES octave (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_E1D109F8FEEFC64B FOREIGN KEY (pitch_id) REFERENCES pitch (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO midi_number (id, octave_id, pitch_id, midi_number) SELECT id, octave_id, pitch_id, midi_number FROM __temp__midi_number');
        $this->addSql('DROP TABLE __temp__midi_number');
        $this->addSql('CREATE INDEX IDX_E1D109F8FEEFC64B ON midi_number (pitch_id)');
        $this->addSql('CREATE INDEX IDX_E1D109F8352DB38 ON midi_number (octave_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_BB185579CF11D9C');
        $this->addSql('DROP INDEX IDX_BB185579FD80BEB2');
        $this->addSql('DROP INDEX IDX_BB185579DD57D81F');
        $this->addSql('CREATE TEMPORARY TABLE __temp__fingering_per_instrument_pitch AS SELECT id, instrument_id, midi_number_id, fingering_position_id FROM fingering_per_instrument_pitch');
        $this->addSql('DROP TABLE fingering_per_instrument_pitch');
        $this->addSql('CREATE TABLE fingering_per_instrument_pitch (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, instrument_id INTEGER DEFAULT NULL, pitch_id INTEGER DEFAULT NULL, fingering_position_id INTEGER DEFAULT NULL)');
        $this->addSql('INSERT INTO fingering_per_instrument_pitch (id, instrument_id, pitch_id, fingering_position_id) SELECT id, instrument_id, midi_number_id, fingering_position_id FROM __temp__fingering_per_instrument_pitch');
        $this->addSql('DROP TABLE __temp__fingering_per_instrument_pitch');
        $this->addSql('CREATE INDEX IDX_BB185579CF11D9C ON fingering_per_instrument_pitch (instrument_id)');
        $this->addSql('CREATE INDEX IDX_BB185579DD57D81F ON fingering_per_instrument_pitch (fingering_position_id)');
        $this->addSql('CREATE INDEX IDX_BB185579FEEFC64B ON fingering_per_instrument_pitch (pitch_id)');
        $this->addSql('DROP INDEX IDX_E1D109F8352DB38');
        $this->addSql('DROP INDEX IDX_E1D109F8FEEFC64B');
        $this->addSql('CREATE TEMPORARY TABLE __temp__midi_number AS SELECT id, octave_id, pitch_id, midi_number FROM midi_number');
        $this->addSql('DROP TABLE midi_number');
        $this->addSql('CREATE TABLE midi_number (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, octave_id INTEGER NOT NULL, pitch_id INTEGER NOT NULL, midi_number INTEGER NOT NULL)');
        $this->addSql('INSERT INTO midi_number (id, octave_id, pitch_id, midi_number) SELECT id, octave_id, pitch_id, midi_number FROM __temp__midi_number');
        $this->addSql('DROP TABLE __temp__midi_number');
        $this->addSql('CREATE INDEX IDX_E1D109F8352DB38 ON midi_number (octave_id)');
        $this->addSql('CREATE INDEX IDX_E1D109F8FEEFC64B ON midi_number (pitch_id)');
    }
}
