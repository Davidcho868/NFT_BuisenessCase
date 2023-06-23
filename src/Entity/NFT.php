<?php

namespace App\Entity;

use App\Repository\NFTRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NFTRepository::class)]
class NFT
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $valeur_NFT = null;

    #[ORM\Column]
    private ?int $prix_NFT = null;

    #[ORM\Column]
    private ?bool $en_vente = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValeurNFT(): ?int
    {
        return $this->valeur_NFT;
    }

    public function setValeurNFT(int $valeur_NFT): static
    {
        $this->valeur_NFT = $valeur_NFT;

        return $this;
    }

    public function getPrixNFT(): ?int
    {
        return $this->prix_NFT;
    }

    public function setPrixNFT(int $prix_NFT): static
    {
        $this->prix_NFT = $prix_NFT;

        return $this;
    }

    public function isEnVente(): ?bool
    {
        return $this->en_vente;
    }

    public function setEnVente(bool $en_vente): static
    {
        $this->en_vente = $en_vente;

        return $this;
    }
}
