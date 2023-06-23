<?php

namespace App\Entity;

use App\Repository\CommuneRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommuneRepository::class)]
class Commune
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_commune = null;

    #[ORM\Column(length: 20)]
    private ?string $code_postal = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCommune(): ?string
    {
        return $this->nom_commune;
    }

    public function setNomCommune(string $nom_commune): static
    {
        $this->nom_commune = $nom_commune;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->code_postal;
    }

    public function setCodePostal(string $code_postal): static
    {
        $this->code_postal = $code_postal;

        return $this;
    }
}
