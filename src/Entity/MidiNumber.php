<?php

namespace App\Entity;

use App\Repository\MidiNumberRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MidiNumberRepository::class)]
class MidiNumber
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $midiNumber;

    #[ORM\ManyToOne(targetEntity: octave::class, inversedBy: 'midiNumbers')]
    #[ORM\JoinColumn(nullable: false)]
    private $octave;

    #[ORM\ManyToOne(targetEntity: pitch::class, inversedBy: 'midiNumbers')]
    #[ORM\JoinColumn(nullable: false)]
    private $pitch;

    #[ORM\OneToMany(mappedBy: "pitch", targetEntity: FingeringPerInstrumentPitch::class)]
    private $fingeringPerInstrumentPitch;

    public function __construct()
    {
        $this->fingeringPerInstrumentPitch = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getFingeringPerInstrumentPitch(): ArrayCollection
    {
        return $this->fingeringPerInstrumentPitch;
    }

    /**
     * @param ArrayCollection $fingeringPerInstrumentPitch
     */
    public function setFingeringPerInstrumentPitch(ArrayCollection $fingeringPerInstrumentPitch): void
    {
        $this->fingeringPerInstrumentPitch = $fingeringPerInstrumentPitch;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMidiNumber(): ?int
    {
        return $this->midiNumber;
    }

    public function setMidiNumber(int $midiNumber): self
    {
        $this->midiNumber = $midiNumber;

        return $this;
    }

    public function getOctave(): ?octave
    {
        return $this->octave;
    }

    public function setOctave(?octave $octave): self
    {
        $this->octave = $octave;

        return $this;
    }

    public function getPitch(): ?pitch
    {
        return $this->pitch;
    }

    public function setPitch(?pitch $pitch): self
    {
        $this->pitch = $pitch;

        return $this;
    }
}
