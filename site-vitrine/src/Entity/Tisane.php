<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\TisaneRepository;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;


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

    // /**
    //  * @var File|null
    //  */
    // private $imageTisaneFile;

    // /**
    //  * @ORM\Column(type="datetime", nullable=true)
    //  * @var \DateTime
    //  */
    // private $updated_at;
    

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
        // $this->updatedAt = new \DateTime('now');
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

    // /**
    // * @param File|null $image_tisane
    // */
    // public function setImageTisaneFile(?File $image_tisane = null):void
    // {
    //     $this->imageTisaneFile = $image_tisane;
    //     // dd($imageTisaneFile);
    //     if (null ==! $image_tisane) {
    //      $this->updatedAt = new \DateTime('now');
    //     //  dd($this);
    //     }
    // }
  
    // ici par défaut, on initialise la variable $image_tisane à null
    // $image_tisane est de type file et est null
    // public function setImageTisaneFile(File $image_tisane = null)
    // {
        // $this->imageTisaneFile = $imageTisaneFile;
        // $this->imageTisaneFile = $image_tisane;
        // if ( $this->imageTisaneFile instanceof UploadedFile ) {
        //     // si imageTisaneFile est de type uploadedFile alors maj le updated_at
        //     $this->updated_at = new \DateTime('now');
        // }
        //    if($image_tisane) {
            // if 'updatedAt' is not defined in your entity, use another property
        //     $this->updatedAt = new \DateTime('now');
        // }

        // return $this;
        // $this->imageTisaneFile = $image_tisane;

        // // VERY IMPORTANT:
        // // It is required that at least one field changes if you are using Doctrine,
        // // otherwise the event listeners won't be called and the file is lost
        // // VichUploader impose une mise à jour d'un champs de notre entité dès que l'image est mise à jour
        // if (null !== $image_tisane) {
        //     // if 'updatedAt' is not defined in your entity, use another property
        //     $this->updatedAt = new \DateTime('now');
        // }
    // }

    
    // /**
    // * @return File|null
    // */
    // public function getImageTisaneFile(): ?File
    // // ?File = typage de la propriété, ici on retourne un type File
    // {
    //     return $this->imageTisaneFile;
    // }


    public function getImageTisane(): ?string
    {
        return $this->image_tisane;
    }

    public function setImageTisane( ?string $image_tisane): self
    {
        $this->image_tisane = $image_tisane;

        return $this;
    }
    
    // public function getUpdatedAt(): ?\DateTimeInterface {
    //     return $this->updated_at;
    // }

    // public function setUpdatedAt( \DateTimeInterface $updated_at ): self {
    //     $this->updated_at = $updated_at;

    //     return $this;
    // }
    

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


// Notes : 
// updated_at = permet à Doctrine de savoir qd un fichier a été mis à jour. VichUploader impose une mise à jour d'un champs de notre entité dès que l'image est mise à jour
