<?php

namespace App\Entity;

use App\Repository\FingeringPerInstrumentPitchRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FingeringPerInstrumentPitchRepository::class)]
class FingeringPerInstrumentPitch
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Instrument::class, inversedBy: "fingeringPerInstrumentPitch")]
    private $instrument;

    #[ORM\ManyToOne(targetEntity: MidiNumber::class, inversedBy: "fingeringPerInstrumentPitch")]
    private $midiNumber;

    #[ORM\ManyToOne(targetEntity: FingerPosition::class)]
    private $fingeringPosition;

    public function getId(): ?int
    {
        return $this->id;
    }


    /**
     * @return mixed
     */
    public function getInstrument()
    {
        return $this->instrument;
    }

    /**
     * @param mixed $instrument
     */
    public function setInstrument($instrument): void
    {
        $this->instrument = $instrument;
    }

    public function getMidiNumberId(): ?int
    {
        return $this->midiNumber;
    }

    public function setPitch(MidiNumber $midiNumber): self
    {
        $this->midiNumber = $midiNumber;

        return $this;
    }

    public function getFingeringPosition(): ?int
    {
        return $this->fingeringPosition;
    }

    public function setFingeringPosition(FingerPosition $fingeringPosition): self
    {
        $this->fingeringPosition = $fingeringPosition;

        return $this;
    }
}

//public function getInstrumentId(): ?int
//{
//    return $this->instrumentId;
//}
//
//public function setInstrumentId(int $instrumentId): self
//{
//    $this->instrumentId = $instrumentId;
//
//    return $this;
//}