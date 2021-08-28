<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ServiceRepository::class)
 */
class Service
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $detail;

    

    /**
     * @ORM\Column(type="text")
     */
    private $conditionVente;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $moyenTransport;

    /**
     * @ORM\ManyToOne(targetEntity=TypeService::class, inversedBy="services")
     */
    private $typeService;

   

    /**
     * @ORM\OneToMany(targetEntity=TarifService::class, mappedBy="service")
     */
    private $tarifServices;

    /**
     * @ORM\OneToMany(targetEntity=ServiceVehicule::class, mappedBy="service")
     */
    private $serviceVehicules;

    /**
     * @ORM\ManyToOne(targetEntity=Users::class, inversedBy="services")
     * @ORM\JoinColumn(nullable=false)
     */
    private $users;

    public function __construct()
    {
        $this->tarifServices = new ArrayCollection();
        $this->serviceVehicules = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCharte(): ?string
    {
        return $this->charte;
    }

    public function setCharte(?string $charte): self
    {
        $this->charte = $charte;

        return $this;
    }

    public function getConditionVente(): ?string
    {
        return $this->conditionVente;
    }

    public function setConditionVente(string $conditionVente): self
    {
        $this->conditionVente = $conditionVente;

        return $this;
    }

    public function getMoyenTransport(): ?string
    {
        return $this->moyenTransport;
    }

    public function setMoyenTransport(string $moyenTransport): self
    {
        $this->moyenTransport = $moyenTransport;

        return $this;
    }

    public function getTypeService(): ?TypeService
    {
        return $this->typeService;
    }

    public function setTypeService(?TypeService $typeService): self
    {
        $this->typeService = $typeService;

        return $this;
    }

    public function getAssurance(): ?string
    {
        return $this->assurance;
    }

    public function setAssurance(?string $assurance): self
    {
        $this->assurance = $assurance;

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
            $tarifService->setService($this);
        }

        return $this;
    }

    public function removeTarifService(TarifService $tarifService): self
    {
        if ($this->tarifServices->removeElement($tarifService)) {
            // set the owning side to null (unless already changed)
            if ($tarifService->getService() === $this) {
                $tarifService->setService(null);
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
            $serviceVehicule->setService($this);
        }

        return $this;
    }

    public function removeServiceVehicule(ServiceVehicule $serviceVehicule): self
    {
        if ($this->serviceVehicules->removeElement($serviceVehicule)) {
            // set the owning side to null (unless already changed)
            if ($serviceVehicule->getService() === $this) {
                $serviceVehicule->setService(null);
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
}
