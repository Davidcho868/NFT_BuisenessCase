<?php

namespace App\Entity;

use App\Repository\AdresseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdresseRepository::class)]
class Adresse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_adresse = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomAdresse(): ?string
    {
        return $this->nom_adresse;
    }

    public function setNomAdresse(string $nom_adresse): static
    {
        $this->nom_adresse = $nom_adresse;

        return $this;
    }
}
