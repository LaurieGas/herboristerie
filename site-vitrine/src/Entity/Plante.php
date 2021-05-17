<?php

namespace App\Entity;

use App\Repository\PlanteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlanteRepository::class)
 */
class Plante
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
    private $nom_plante;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_latin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_commun;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $famille;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $origine_geographique;

    /**
     * @ORM\Column(type="text")
     */
    private $description_botanique;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $parties_utilisees;

    /**
     * @ORM\Column(type="text")
     */
    private $proprietes;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image_plante;

    /**
     * @ORM\ManyToMany(targetEntity=Tisane::class, inversedBy="plantes")
     */
    private $tisane;

    public function __construct()
    {
        $this->tisane = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPlante(): ?string
    {
        return $this->nom_plante;
    }

    public function setNomPlante(string $nom_plante): self
    {
        $this->nom_plante = $nom_plante;

        return $this;
    }

    public function getNomLatin(): ?string
    {
        return $this->nom_latin;
    }

    public function setNomLatin(string $nom_latin): self
    {
        $this->nom_latin = $nom_latin;

        return $this;
    }

    public function getNomCommun(): ?string
    {
        return $this->nom_commun;
    }

    public function setNomCommun(string $nom_commun): self
    {
        $this->nom_commun = $nom_commun;

        return $this;
    }

    public function getFamille(): ?string
    {
        return $this->famille;
    }

    public function setFamille(string $famille): self
    {
        $this->famille = $famille;

        return $this;
    }

    public function getOrigineGeographique(): ?string
    {
        return $this->origine_geographique;
    }

    public function setOrigineGeographique(string $origine_geographique): self
    {
        $this->origine_geographique = $origine_geographique;

        return $this;
    }

    public function getDescriptionBotanique(): ?string
    {
        return $this->description_botanique;
    }

    public function setDescriptionBotanique(string $description_botanique): self
    {
        $this->description_botanique = $description_botanique;

        return $this;
    }

    public function getPartiesUtilisees(): ?string
    {
        return $this->parties_utilisees;
    }

    public function setPartiesUtilisees(string $parties_utilisees): self
    {
        $this->parties_utilisees = $parties_utilisees;

        return $this;
    }

    public function getProprietes(): ?string
    {
        return $this->proprietes;
    }

    public function setProprietes(string $proprietes): self
    {
        $this->proprietes = $proprietes;

        return $this;
    }

    public function getImagePlante(): ?string
    {
        return $this->image_plante;
    }

    public function setImagePlante(string $image_plante): self
    {
        $this->image_plante = $image_plante;

        return $this;
    }

    /**
     * @return Collection|Tisane[]
     */
    public function getTisane(): Collection
    {
        return $this->tisane;
    }

    public function addTisane(Tisane $tisane): self
    {
        if (!$this->tisane->contains($tisane)) {
            $this->tisane[] = $tisane;
        }

        return $this;
    }

    public function removeTisane(Tisane $tisane): self
    {
        $this->tisane->removeElement($tisane);

        return $this;
    }
}
