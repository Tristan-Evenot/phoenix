<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjectRepository::class)]
class Project {
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'text', nullable: true)]
    private $description;

    #[ORM\Column(type: 'date')]
    private $startedAt;

    #[ORM\Column(type: 'date', nullable: true)]
    private $endedAt;

    #[ORM\ManyToOne(targetEntity: Status::class, inversedBy: 'projects')]
    #[ORM\JoinColumn(nullable: false)]
    private $status;

    #[ORM\ManyToOne(targetEntity: Portfolio::class, inversedBy: 'projets')]
    private $portfolio;

    #[ORM\Column(type: 'boolean')]
    private $archived_state;

    #[ORM\OneToMany(mappedBy: 'project', targetEntity: Highlights::class)]
    private $highlights;

    #[ORM\OneToMany(mappedBy: 'project', targetEntity: Risk::class)]
    private $risk;

    #[ORM\OneToOne(targetEntity: Budget::class, cascade: ['persist', 'remove'])]
    private $budget;

    #[ORM\ManyToOne(targetEntity: Team::class, inversedBy: 'projects')]
    private $projectTeam;

    #[ORM\ManyToOne(targetEntity: Team::class, inversedBy: 'projects')]
    private $clientTeam;

    public function __construct() {
        $this->highlights = new ArrayCollection();
        $this->risk = new ArrayCollection();
    }

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

    public function getDescription(): ?string {
        return $this->description;
    }

    public function setDescription(?string $description): self {
        $this->description = $description;

        return $this;
    }

    public function getStartedAt(): ?\DateTimeInterface {
        return $this->startedAt;
    }

    public function setStartedAt(\DateTimeInterface $startedAt): self {
        $this->startedAt = $startedAt;

        return $this;
    }

    public function getEndedAt(): ?\DateTimeInterface {
        return $this->endedAt;
    }

    public function setEndedAt(?\DateTimeInterface $endedAt): self {
        $this->endedAt = $endedAt;

        return $this;
    }

    public function getStatus(): ?Status {
        return $this->status;
    }

    public function setStatus(?Status $status): self {
        $this->status = $status;

        return $this;
    }

    public function getPortfolio(): ?Portfolio {
        return $this->portfolio;
    }

    public function setPortfolio(?Portfolio $portfolio): self {
        $this->portfolio = $portfolio;

        return $this;
    }

    public function getArchivedState(): ?bool {
        return $this->archived_state;
    }

    public function setArchivedState(bool $archived_state): self {
        $this->archived_state = $archived_state;

        return $this;
    }

    /**
     * @return Collection|highlights[]
     */
    public function getHighlights(): Collection {
        return $this->highlights;
    }

    public function addHighlight(highlights $highlight): self {
        if (!$this->highlights->contains($highlight)) {
            $this->highlights[] = $highlight;
            $highlight->setProject($this);
        }

        return $this;
    }

    public function removeHighlight(highlights $highlight): self {
        if ($this->highlights->removeElement($highlight)) {
            // set the owning side to null (unless already changed)
            if ($highlight->getProject() === $this) {
                $highlight->setProject(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|risk[]
     */
    public function getRisk(): Collection {
        return $this->risk;
    }

    public function addRisk(risk $risk): self {
        if (!$this->risk->contains($risk)) {
            $this->risk[] = $risk;
            $risk->setProject($this);
        }

        return $this;
    }

    public function removeRisk(risk $risk): self {
        if ($this->risk->removeElement($risk)) {
            // set the owning side to null (unless already changed)
            if ($risk->getProject() === $this) {
                $risk->setProject(null);
            }
        }

        return $this;
    }

    public function getBudget(): ?budget {
        return $this->budget;
    }

    public function setBudget(?budget $budget): self {
        $this->budget = $budget;

        return $this;
    }

    public function getProjectTeam(): ?Team
    {
        return $this->projectTeam;
    }

    public function setProjectTeam(?Team $projectTeam): self
    {
        $this->projectTeam = $projectTeam;

        return $this;
    }

    public function getClientTeam(): ?Team
    {
        return $this->clientTeam;
    }

    public function setClientTeam(?Team $clientTeam): self
    {
        $this->clientTeam = $clientTeam;

        return $this;
    }
}
