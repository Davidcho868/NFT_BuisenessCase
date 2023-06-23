<?php

namespace App\Entity;

use App\Repository\AcheterRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AcheterRepository::class)]
class Acheter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_achat = null;

    #[ORM\Column]
    private ?int $prix_achat = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateAchat(): ?\DateTimeInterface
    {
        return $this->date_achat;
    }

    public function setDateAchat(\DateTimeInterface $date_achat): static
    {
        $this->date_achat = $date_achat;

        return $this;
    }

    public function getPrixAchat(): ?int
    {
        return $this->prix_achat;
    }

    public function setPrixAchat(int $prix_achat): static
    {
        $this->prix_achat = $prix_achat;

        return $this;
    }
}
