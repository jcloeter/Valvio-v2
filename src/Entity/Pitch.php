<?php

namespace App\Entity;

use App\Repository\PitchRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PitchRepository::class)]
class Pitch
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 25)]
    private $name;

    #[ORM\Column(type: 'integer')]
    private $octave;

    #[ORM\Column(type: 'blob', nullable: true)]
    private $image_url;

    #[ORM\Column(type: 'integer')]
    private $midiNoteId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
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

    public function getImageUrl()
    {
        return $this->image_url;
    }

    public function setImageUrl($image_url): self
    {
        $this->image_url = $image_url;

        return $this;
    }

    public function getMidiNoteId(): ?int
    {
        return $this->midiNoteId;
    }

    public function setMidiNoteId(int $midiNoteId): self
    {
        $this->midiNoteId = $midiNoteId;

        return $this;
    }
}
