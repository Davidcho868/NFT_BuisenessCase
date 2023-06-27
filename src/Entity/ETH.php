<?php

namespace App\Entity;

use App\Repository\ETHRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ETHRepository::class)]
class ETH
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $cours_eth = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_ajout_eth = null;

    #[ORM\ManyToOne(inversedBy: 'eths')]
    #[ORM\JoinColumn(nullable: false)]
    private ?NFT $nFT = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCoursEth(): ?int
    {
        return $this->cours_eth;
    }

    public function setCoursEth(int $cours_eth): static
    {
        $this->cours_eth = $cours_eth;

        return $this;
    }

    public function getDateAjoutEth(): ?\DateTimeInterface
    {
        return $this->date_ajout_eth;
    }

    public function setDateAjoutEth(\DateTimeInterface $date_ajout_eth): static
    {
        $this->date_ajout_eth = $date_ajout_eth;

        return $this;
    }

    public function getNFT(): ?NFT
    {
        return $this->nFT;
    }

    public function setNFT(?NFT $nFT): static
    {
        $this->nFT = $nFT;

        return $this;
    }
}
