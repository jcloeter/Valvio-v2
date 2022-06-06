<?php

namespace App\Entity;

use App\Repository\AccidentalRepository;
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
