<?php

namespace App\Entity;

use App\Repository\DepartementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DepartementRepository::class)]
class Departement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $dpt_nom = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDptNom(): ?string
    {
        return $this->dpt_nom;
    }

    public function setDptNom(string $dpt_nom): static
    {
        $this->dpt_nom = $dpt_nom;

        return $this;
    }
}
