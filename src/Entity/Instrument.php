<?php

namespace App\Entity;

use App\Repository\InstrumentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\FingeringPerInstrumentPitch;

#[ORM\Entity(repositoryClass: InstrumentRepository::class)]
class Instrument
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $transposition;

    #[ORM\OneToMany(mappedBy: "instrument", targetEntity: FingeringPerInstrumentPitch::class)]
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getTransposition(): ?string
    {
        return $this->transposition;
    }

    public function setTransposition(string $transposition): self
    {
        $this->transposition = $transposition;

        return $this;
    }
}
