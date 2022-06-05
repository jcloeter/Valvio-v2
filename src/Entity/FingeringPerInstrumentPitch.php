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

    #[ORM\ManyToOne(targetEntity: Pitch::class, inversedBy: "fingeringPerInstrumentPitch")]
    private $pitch;

    #[ORM\ManyToOne(targetEntity: FingerPosition::class)]
    private $fingeringPosition;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInstrumentId(): ?int
    {
        return $this->instrumentId;
    }

    public function setInstrumentId(int $instrumentId): self
    {
        $this->instrumentId = $instrumentId;

        return $this;
    }

    public function getPitchId(): ?int
    {
        return $this->pitchId;
    }

    public function setPitchId(int $pitchId): self
    {
        $this->pitchId = $pitchId;

        return $this;
    }

    public function getFingeringPosition(): ?int
    {
        return $this->fingeringPosition;
    }

    public function setFingeringPosition(int $fingeringPosition): self
    {
        $this->fingeringPosition = $fingeringPosition;

        return $this;
    }
}
