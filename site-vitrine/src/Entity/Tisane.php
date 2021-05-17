<?php

namespace App\Entity;

use App\Repository\TisaneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TisaneRepository::class)
 */
class Tisane
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
    private $nom_tisane;

    /**
     * @ORM\Column(type="text")
     */
    private $description_tisane;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image_tisane;

    /**
     * @ORM\Column(type="text")
     */
    private $conseil_utilisation;

    /**
     * @ORM\Column(type="text")
     */
    private $composition_detail;

    /**
     * @ORM\ManyToMany(targetEntity=Plante::class, mappedBy="tisane")
     */
    private $plantes;

    public function __construct()
    {
        $this->plantes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomTisane(): ?string
    {
        return $this->nom_tisane;
    }

    public function setNomTisane(string $nom_tisane): self
    {
        $this->nom_tisane = $nom_tisane;

        return $this;
    }

    public function getDescriptionTisane(): ?string
    {
        return $this->description_tisane;
    }

    public function setDescriptionTisane(string $description_tisane): self
    {
        $this->description_tisane = $description_tisane;

        return $this;
    }

    public function getImageTisane(): ?string
    {
        return $this->image_tisane;
    }

    public function setImageTisane(string $image_tisane): self
    {
        $this->image_tisane = $image_tisane;

        return $this;
    }

    public function getConseilUtilisation(): ?string
    {
        return $this->conseil_utilisation;
    }

    public function setConseilUtilisation(string $conseil_utilisation): self
    {
        $this->conseil_utilisation = $conseil_utilisation;

        return $this;
    }

    public function getCompositionDetail(): ?string
    {
        return $this->composition_detail;
    }

    public function setCompositionDetail(string $composition_detail): self
    {
        $this->composition_detail = $composition_detail;

        return $this;
    }

    /**
     * @return Collection|Plante[]
     */
    public function getPlantes(): Collection
    {
        return $this->plantes;
    }

    public function addPlante(Plante $plante): self
    {
        if (!$this->plantes->contains($plante)) {
            $this->plantes[] = $plante;
            $plante->addTisane($this);
        }

        return $this;
    }

    public function removePlante(Plante $plante): self
    {
        if ($this->plantes->removeElement($plante)) {
            $plante->removeTisane($this);
        }

        return $this;
    }
}
