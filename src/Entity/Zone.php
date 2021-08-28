<?php

namespace App\Entity;

use App\Repository\ZoneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ZoneRepository::class)
 */
class Zone
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
     * @ORM\Column(type="float")
     */
    private $postale;

    /**
     * @ORM\ManyToOne(targetEntity=Pays::class, inversedBy="zones")
     */
    private $pays;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ile;

    /**
     * @ORM\OneToMany(targetEntity=VehiculeZone::class, mappedBy="zone")
     */
    private $vehiculeZones;

    public function __construct()
    {
        $this->vehiculeZones = new ArrayCollection();
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

    public function getPostale(): ?float
    {
        return $this->postale;
    }

    public function setPostale(float $postale): self
    {
        $this->postale = $postale;

        return $this;
    }

    public function getPays(): ?Pays
    {
        return $this->pays;
    }

    public function setPays(?Pays $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getIle(): ?string
    {
        return $this->ile;
    }

    public function setIle(?string $ile): self
    {
        $this->ile = $ile;

        return $this;
    }

    /**
     * @return Collection|VehiculeZone[]
     */
    public function getVehiculeZones(): Collection
    {
        return $this->vehiculeZones;
    }

    public function addVehiculeZone(VehiculeZone $vehiculeZone): self
    {
        if (!$this->vehiculeZones->contains($vehiculeZone)) {
            $this->vehiculeZones[] = $vehiculeZone;
            $vehiculeZone->setZone($this);
        }

        return $this;
    }

    public function removeVehiculeZone(VehiculeZone $vehiculeZone): self
    {
        if ($this->vehiculeZones->removeElement($vehiculeZone)) {
            // set the owning side to null (unless already changed)
            if ($vehiculeZone->getZone() === $this) {
                $vehiculeZone->setZone(null);
            }
        }

        return $this;
    }
}
