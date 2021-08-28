<?php

namespace App\Entity;

use App\Repository\TarifVehiculeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TarifVehiculeRepository::class)
 */
class TarifVehicule
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
     * @ORM\ManyToOne(targetEntity=TypeTarif::class, inversedBy="tarifVehicules")
     */
    private $typeTarif;

    /**
     * @ORM\ManyToOne(targetEntity=Vehicule::class, inversedBy="tarifVehicules")
     */
    private $vehicule;

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

    public function getTypeTarif(): ?TypeTarif
    {
        return $this->typeTarif;
    }

    public function setTypeTarif(?TypeTarif $typeTarif): self
    {
        $this->typeTarif = $typeTarif;

        return $this;
    }

    public function getVehicule(): ?Vehicule
    {
        return $this->vehicule;
    }

    public function setVehicule(?Vehicule $vehicule): self
    {
        $this->vehicule = $vehicule;

        return $this;
    }
}
