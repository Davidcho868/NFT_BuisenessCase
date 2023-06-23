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

    #[ORM\ManyToOne(inversedBy: 'nFTs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Acheter $achats = null;

    #[ORM\OneToOne(inversedBy: 'nFT', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Image $correspond = null;

    #[ORM\ManyToOne(inversedBy: 'nFTs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categorie $appartiens = null;

    #[ORM\ManyToOne(inversedBy: 'nFTs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?ETH $vaux = null;

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

    public function getAchats(): ?Acheter
    {
        return $this->achats;
    }

    public function setAchats(?Acheter $achats): static
    {
        $this->achats = $achats;

        return $this;
    }

    public function getCorrespond(): ?Image
    {
        return $this->correspond;
    }

    public function setCorrespond(Image $correspond): static
    {
        $this->correspond = $correspond;

        return $this;
    }

    public function getAppartiens(): ?Categorie
    {
        return $this->appartiens;
    }

    public function setAppartiens(?Categorie $appartiens): static
    {
        $this->appartiens = $appartiens;

        return $this;
    }

    public function getVaux(): ?ETH
    {
        return $this->vaux;
    }

    public function setVaux(?ETH $vaux): static
    {
        $this->vaux = $vaux;

        return $this;
    }
}
