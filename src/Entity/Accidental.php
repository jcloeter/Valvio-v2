<?php

namespace App\Entity;

use App\Repository\AccidentalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AccidentalRepository::class)]
class Accidental
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'integer')]
    private $transposition;

    #[ORM\OneToMany(targetEntity: Pitch::class, mappedBy: "accidental")]
    private $pitches;

    public function __construct()
    {
        $this->pitches = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getPitches(): ArrayCollection
    {
        return $this->pitches;
    }

    /**
     * @param ArrayCollection $pitches
     */
    public function setPitches(ArrayCollection $pitches): void
    {
        $this->pitches = $pitches;
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

    public function getTransposition(): ?int
    {
        return $this->transposition;
    }

    public function setTransposition(int $transposition): self
    {
        $this->transposition = $transposition;

        return $this;
    }
}
