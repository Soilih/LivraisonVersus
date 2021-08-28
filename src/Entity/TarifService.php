<?php

namespace App\Entity;

use App\Repository\TarifServiceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TarifServiceRepository::class)
 */
class TarifService
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    /**
     * @ORM\ManyToOne(targetEntity=Service::class, inversedBy="tarifServices")
     */
    private $service;

    /**
     * @ORM\ManyToOne(targetEntity=TypeTarif::class, inversedBy="tarifServices")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typeTarif;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getService(): ?Service
    {
        return $this->service;
    }

    public function setService(?Service $service): self
    {
        $this->service = $service;

        return $this;
    }

    public function getTypeTarif(): ?TypeTarif
    {
        return $this->typeTarif;
    }

    public function setTypeTarif(?TypeTarif $typeTarif): self
    {
        $this->typeTarif = $typeTarif;

        return $this;
    }
}
