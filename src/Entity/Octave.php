<?php

namespace App\Entity;

use App\Repository\OctaveRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OctaveRepository::class)]
class Octave
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $octave;

    #[ORM\OneToMany(mappedBy: 'octave', targetEntity: MidiNumber::class)]
    private $midiNumbers;

    public function __construct()
    {
        $this->midiNumbers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOctave(): ?int
    {
        return $this->octave;
    }

    public function setOctave(int $octave): self
    {
        $this->octave = $octave;

        return $this;
    }

    /**
     * @return Collection<int, MidiNumber>
     */
    public function getMidiNumbers(): Collection
    {
        return $this->midiNumbers;
    }

    public function addMidiNumber(MidiNumber $midiNumber): self
    {
        if (!$this->midiNumbers->contains($midiNumber)) {
            $this->midiNumbers[] = $midiNumber;
            $midiNumber->setOctave($this);
        }

        return $this;
    }

    public function removeMidiNumber(MidiNumber $midiNumber): self
    {
        if ($this->midiNumbers->removeElement($midiNumber)) {
            // set the owning side to null (unless already changed)
            if ($midiNumber->getOctave() === $this) {
                $midiNumber->setOctave(null);
            }
        }

        return $this;
    }
}
