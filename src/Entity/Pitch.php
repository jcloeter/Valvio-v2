<?php

namespace App\Entity;

use App\Repository\PitchRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\Column(type: 'blob', nullable: true)]
    private $image_url;

    #[ORM\OneToMany(mappedBy: 'pitch', targetEntity: MidiNumber::class, orphanRemoval: true)]
    private $midiNumbers;

    #[ORM\ManyToOne(targetEntity: Accidental::class, inversedBy: "pitches")]
    private $accidental;

    /**
     * @return mixed
     */
    public function getAccidental()
    {
        return $this->accidental;
    }

    /**
     * @param mixed $accidental
     */
    public function setAccidental($accidental): void
    {
        $this->accidental = $accidental;
    }

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

    public function getImageUrl()
    {
        return $this->image_url;
    }

    public function setImageUrl($image_url): self
    {
        $this->image_url = $image_url;

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
        $midiNumber->setPitch($this);
    }

    return $this;
}

public function removeMidiNumber(MidiNumber $midiNumber): self
{
    if ($this->midiNumbers->removeElement($midiNumber)) {
        // set the owning side to null (unless already changed)
        if ($midiNumber->getPitch() === $this) {
            $midiNumber->setPitch(null);
        }
    }

    return $this;
}
}
