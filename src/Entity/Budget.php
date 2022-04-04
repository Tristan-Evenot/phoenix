<?php

namespace App\Entity;

use App\Repository\BudgetRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BudgetRepository::class)]
class Budget {
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $initialValue;

    #[ORM\Column(type: 'float')]
    private $remaining;

    #[ORM\Column(type: 'float')]
    private $valueConsumed;

    #[ORM\Column(type: 'float')]
    private $valueInitial;

    #[ORM\Column(type: 'float')]
    private $landing;

    public function getId(): ?int {
        return $this->id;
    }

    public function getInitialValue(): ?string {
        return $this->initialValue;
    }

    public function setInitialValue(string $initialValue): self {
        $this->initialValue = $initialValue;

        return $this;
    }

    public function getRemaining(): ?float {
        return $this->remaining;
    }

    public function setRemaining(float $remaining): self {
        $this->remaining = $remaining;

        return $this;
    }

    public function getValueConsumed(): ?float {
        return $this->valueConsumed;
    }

    public function setValueConsumed(float $valueConsumed): self {
        $this->valueConsumed = $valueConsumed;

        return $this;
    }

    public function getValueInitial(): ?float {
        return $this->valueInitial;
    }

    public function setValueInitial(float $valueInitial): self {
        $this->valueInitial = $valueInitial;

        return $this;
    }

    public function getLanding(): ?float {
        return $this->landing;
    }

    public function setLanding(float $landing): self {
        $this->landing = $landing;

        return $this;
    }
}
