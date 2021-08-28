<?php

namespace App\Entity;

use App\Repository\PlanningRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlanningRepository::class)
 */
class Planning
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="time")
     */
    private $heureDebut;

    /**
     * @ORM\Column(type="time")
     */
    private $HeureFin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $jourDebut;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $jourFin;

    /**
     * @ORM\Column(type="text")
     */
    private $detail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=Users::class, inversedBy="plannings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Users;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHeureDebut(): ?\DateTimeInterface
    {
        return $this->heureDebut;
    }

    public function setHeureDebut(\DateTimeInterface $heureDebut): self
    {
        $this->heureDebut = $heureDebut;

        return $this;
    }

    public function getHeureFin(): ?\DateTimeInterface
    {
        return $this->HeureFin;
    }

    public function setHeureFin(\DateTimeInterface $HeureFin): self
    {
        $this->HeureFin = $HeureFin;

        return $this;
    }

    public function getJourDebut(): ?string
    {
        return $this->jourDebut;
    }

    public function setJourDebut(string $jourDebut): self
    {
        $this->jourDebut = $jourDebut;

        return $this;
    }

    public function getJourFin(): ?string
    {
        return $this->jourFin;
    }

    public function setJourFin(string $jourFin): self
    {
        $this->jourFin = $jourFin;

        return $this;
    }

    public function getDetail(): ?string
    {
        return $this->detail;
    }

    public function setDetail(string $detail): self
    {
        $this->detail = $detail;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getUsers(): ?Users
    {
        return $this->Users;
    }

    public function setUsers(?Users $Users): self
    {
        $this->Users = $Users;

        return $this;
    }
}
