<?php

namespace App\Entity;

use App\Repository\JalonRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JalonRepository::class)]
class Jalon
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'float')]
    private $value;

    #[ORM\Column(type: 'boolean')]
    private $mandatory_state;

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

    public function getValue(): ?float
    {
        return $this->value;
    }

    public function setValue(float $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getMandatoryState(): ?bool
    {
        return $this->mandatory_state;
    }

    public function setMandatoryState(bool $mandatory_state): self
    {
        $this->mandatory_state = $mandatory_state;

        return $this;
    }
}
