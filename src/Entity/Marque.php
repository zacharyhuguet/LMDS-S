<?php

namespace App\Entity;

use App\Repository\MarqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MarqueRepository::class)
 */
class Marque
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $NomMarque;

    /**
     * @ORM\OneToMany(targetEntity=Modele::class, mappedBy="marque")
     */
    private $marque;

    public function __construct()
    {
        $this->marque = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomMarque(): ?string
    {
        return $this->NomMarque;
    }

    public function setNomMarque(string $NomMarque): self
    {
        $this->NomMarque = $NomMarque;

        return $this;
    }

    /**
     * @return Collection|Modele[]
     */
    public function getMarque(): Collection
    {
        return $this->marque;
    }

    public function addMarque(Modele $marque): self
    {
        if (!$this->marque->contains($marque)) {
            $this->marque[] = $marque;
            $marque->setMarque($this);
        }

        return $this;
    }

    public function removeMarque(Modele $marque): self
    {
        if ($this->marque->removeElement($marque)) {
            // set the owning side to null (unless already changed)
            if ($marque->getMarque() === $this) {
                $marque->setMarque(null);
            }
        }

        return $this;
    }
}
