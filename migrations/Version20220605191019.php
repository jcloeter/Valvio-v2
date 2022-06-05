<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220605191019 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE fingering_per_instrument_pitch (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, instrument_id INTEGER DEFAULT NULL, pitch_id INTEGER DEFAULT NULL, fingering_position_id INTEGER DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_BB185579CF11D9C ON fingering_per_instrument_pitch (instrument_id)');
        $this->addSql('CREATE INDEX IDX_BB185579FEEFC64B ON fingering_per_instrument_pitch (pitch_id)');
        $this->addSql('CREATE INDEX IDX_BB185579DD57D81F ON fingering_per_instrument_pitch (fingering_position_id)');
        $this->addSql('DROP TABLE instrument_pitch_fingerings');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE instrument_pitch_fingerings (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, fingering_position_id INTEGER DEFAULT NULL, instrument_id INTEGER DEFAULT NULL, pitch_id INTEGER DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_E1931BC3FEEFC64B ON instrument_pitch_fingerings (pitch_id)');
        $this->addSql('CREATE INDEX IDX_E1931BC3CF11D9C ON instrument_pitch_fingerings (instrument_id)');
        $this->addSql('CREATE INDEX IDX_E1931BC3DD57D81F ON instrument_pitch_fingerings (fingering_position_id)');
        $this->addSql('DROP TABLE fingering_per_instrument_pitch');
    }
}
