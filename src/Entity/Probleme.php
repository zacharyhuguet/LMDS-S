<?php

namespace App\Entity;

use App\Repository\ProblemeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProblemeRepository::class)
 */
class Probleme
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
    private $NomProbleme;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomProbleme(): ?string
    {
        return $this->NomProbleme;
    }

    public function setNomProbleme(string $NomProbleme): self
    {
        $this->NomProbleme = $NomProbleme;

        return $this;
    }
}
