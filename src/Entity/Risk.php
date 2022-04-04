<?php

namespace App\Entity;

use App\Repository\RiskRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RiskRepository::class)]
class Risk {
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'date')]
    private $identification_date;

    #[ORM\Column(type: 'date')]
    private $solved_date;

    #[ORM\Column(type: 'string', length: 255)]
    private $severity;

    #[ORM\Column(type: 'string', length: 255)]
    private $probability;

    #[ORM\ManyToOne(targetEntity: Project::class, inversedBy: 'risk')]
    private $project;

    public function getId(): ?int {
        return $this->id;
    }

    public function getName(): ?string {
        return $this->name;
    }

    public function setName(string $name): self {
        $this->name = $name;

        return $this;
    }

    public function getIdentificationDate(): ?\DateTimeInterface {
        return $this->identification_date;
    }

    public function setIdentificationDate(\DateTimeInterface $identification_date): self {
        $this->identification_date = $identification_date;

        return $this;
    }

    public function getSolvedDate(): ?\DateTimeInterface {
        return $this->solved_date;
    }

    public function setSolvedDate(\DateTimeInterface $solved_date): self {
        $this->solved_date = $solved_date;

        return $this;
    }

    public function getSeverity(): ?string {
        return $this->severity;
    }

    public function setSeverity(string $severity): self {
        $this->severity = $severity;

        return $this;
    }

    public function getProbability(): ?string {
        return $this->probability;
    }

    public function setProbability(string $probability): self {
        $this->probability = $probability;

        return $this;
    }

    public function getProject(): ?Project {
        return $this->project;
    }

    public function setProject(?Project $project): self {
        $this->project = $project;

        return $this;
    }
}
