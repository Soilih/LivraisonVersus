<?php

namespace App\Entity;

use App\Repository\TypeTarifRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeTarifRepository::class)
 */
class TypeTarif
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity=TarifService::class, mappedBy="typeTarif")
     */
    private $tarifServices;

    /**
     * @ORM\OneToMany(targetEntity=TarifVehicule::class, mappedBy="typeTarif")
     */
    private $tarifVehicules;

    public function __construct()
    {
        $this->tarifServices = new ArrayCollection();
        $this->tarifVehicules = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection|TarifService[]
     */
    public function getTarifServices(): Collection
    {
        return $this->tarifServices;
    }

    public function addTarifService(TarifService $tarifService): self
    {
        if (!$this->tarifServices->contains($tarifService)) {
            $this->tarifServices[] = $tarifService;
            $tarifService->setTypeTarif($this);
        }

        return $this;
    }

    public function removeTarifService(TarifService $tarifService): self
    {
        if ($this->tarifServices->removeElement($tarifService)) {
            // set the owning side to null (unless already changed)
            if ($tarifService->getTypeTarif() === $this) {
                $tarifService->setTypeTarif(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|TarifVehicule[]
     */
    public function getTarifVehicules(): Collection
    {
        return $this->tarifVehicules;
    }

    public function addTarifVehicule(TarifVehicule $tarifVehicule): self
    {
        if (!$this->tarifVehicules->contains($tarifVehicule)) {
            $this->tarifVehicules[] = $tarifVehicule;
            $tarifVehicule->setTypeTarif($this);
        }

        return $this;
    }

    public function removeTarifVehicule(TarifVehicule $tarifVehicule): self
    {
        if ($this->tarifVehicules->removeElement($tarifVehicule)) {
            // set the owning side to null (unless already changed)
            if ($tarifVehicule->getTypeTarif() === $this) {
                $tarifVehicule->setTypeTarif(null);
            }
        }

        return $this;
    }
}
