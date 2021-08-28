<?php

namespace App\Entity;

use App\Repository\VehiculeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VehiculeRepository::class)
 */
class Vehicule
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
    private $marque;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $volume;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $puissance;

    /**
     * @ORM\Column(type="text")
     */
    private $detail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $etat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $modele;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $matricule;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $kilometrage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $galerie;

    /**
     * @ORM\ManyToOne(targetEntity=TypeVehicule::class, inversedBy="vehicules")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typevehicule;

    /**
     * @ORM\OneToMany(targetEntity=TarifVehicule::class, mappedBy="vehicule")
     */
    private $tarifVehicules;

    /**
     * @ORM\ManyToOne(targetEntity=Users::class, inversedBy="vehicules")
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity=VehiculeZone::class, mappedBy="vehicule")
     */
    private $vehiculeZones;

    /**
     * @ORM\OneToMany(targetEntity=ServiceVehicule::class, mappedBy="vehicule")
     */
    private $serviceVehicules;

    public function __construct()
    {
        $this->tarifVehicules = new ArrayCollection();
        $this->vehiculeZones = new ArrayCollection();
        $this->serviceVehicules = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getVolume(): ?string
    {
        return $this->volume;
    }

    public function setVolume(string $volume): self
    {
        $this->volume = $volume;

        return $this;
    }

    public function getPuissance(): ?string
    {
        return $this->puissance;
    }

    public function setPuissance(?string $puissance): self
    {
        $this->puissance = $puissance;

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

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(string $modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(string $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getKilometrage(): ?string
    {
        return $this->kilometrage;
    }

    public function setKilometrage(string $kilometrage): self
    {
        $this->kilometrage = $kilometrage;

        return $this;
    }

    public function getGalerie(): ?string
    {
        return $this->galerie;
    }

    public function setGalerie(string $galerie): self
    {
        $this->galerie = $galerie;

        return $this;
    }

    public function getTypevehicule(): ?TypeVehicule
    {
        return $this->typevehicule;
    }

    public function setTypevehicule(?TypeVehicule $typevehicule): self
    {
        $this->typevehicule = $typevehicule;

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
            $tarifVehicule->setVehicule($this);
        }

        return $this;
    }

    public function removeTarifVehicule(TarifVehicule $tarifVehicule): self
    {
        if ($this->tarifVehicules->removeElement($tarifVehicule)) {
            // set the owning side to null (unless already changed)
            if ($tarifVehicule->getVehicule() === $this) {
                $tarifVehicule->setVehicule(null);
            }
        }

        return $this;
    }

    public function getUsers(): ?Users
    {
        return $this->users;
    }

    public function setUsers(?Users $users): self
    {
        $this->users = $users;

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
            $vehiculeZone->setVehicule($this);
        }

        return $this;
    }

    public function removeVehiculeZone(VehiculeZone $vehiculeZone): self
    {
        if ($this->vehiculeZones->removeElement($vehiculeZone)) {
            // set the owning side to null (unless already changed)
            if ($vehiculeZone->getVehicule() === $this) {
                $vehiculeZone->setVehicule(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ServiceVehicule[]
     */
    public function getServiceVehicules(): Collection
    {
        return $this->serviceVehicules;
    }

    public function addServiceVehicule(ServiceVehicule $serviceVehicule): self
    {
        if (!$this->serviceVehicules->contains($serviceVehicule)) {
            $this->serviceVehicules[] = $serviceVehicule;
            $serviceVehicule->setVehicule($this);
        }

        return $this;
    }

    public function removeServiceVehicule(ServiceVehicule $serviceVehicule): self
    {
        if ($this->serviceVehicules->removeElement($serviceVehicule)) {
            // set the owning side to null (unless already changed)
            if ($serviceVehicule->getVehicule() === $this) {
                $serviceVehicule->setVehicule(null);
            }
        }

        return $this;
    }
}
