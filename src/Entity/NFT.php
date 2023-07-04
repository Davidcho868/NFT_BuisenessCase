<?php

namespace App\Entity;

use App\Repository\NFTRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: NFTRepository::class)]

class NFT
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $valeur = null;

    #[ORM\Column]
    private ?int $prix = null;

    #[ORM\Column]
    private ?bool $is_vente = null;

    #[ORM\ManyToMany(targetEntity: Acheter::class, inversedBy: 'nFTs')]
    private Collection $nfts;

    #[ORM\OneToOne(inversedBy: 'nFT', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Image $images = null;

    #[ORM\OneToMany(mappedBy: 'nFT', targetEntity: Categorie::class, cascade: ['persist', 'remove'])]
    private Collection $categories;

    #[ORM\OneToMany(mappedBy: 'nFT', targetEntity: ETH::class)]
    private Collection $eths;

    public function __construct()
    {
        $this->nfts = new ArrayCollection();
        $this->categories = new ArrayCollection();
        $this->eths = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValeur(): ?int
    {
        return $this->valeur;
    }

    public function setValeur(int $valeur): static
    {
        $this->valeur = $valeur;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function isIsVente(): ?bool
    {
        return $this->is_vente;
    }

    public function setIsVente(bool $is_vente): static
    {
        $this->is_vente = $is_vente;

        return $this;
    }

    /**
     * @return Collection<int, Acheter>
     */
    public function getNfts(): Collection
    {
        return $this->nfts;
    }

    public function addNft(Acheter $nft): static
    {
        if (!$this->nfts->contains($nft)) {
            $this->nfts->add($nft);
        }

        return $this;
    }

    public function removeNft(Acheter $nft): static
    {
        $this->nfts->removeElement($nft);

        return $this;
    }

    public function getImages(): ?Image
    {
        return $this->images;
    }

    public function setImages(Image $images): static
    {
        $this->images = $images;

        return $this;
    }

    /**
     * @return Collection<int, Categorie>
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Categorie $category): static
    {
        if (!$this->categories->contains($category)) {
            $this->categories->add($category);
            $category->setNFT($this);
        }

        return $this;
    }

    public function removeCategory(Categorie $category): static
    {
        if ($this->categories->removeElement($category)) {
            // set the owning side to null (unless already changed)
            if ($category->getNFT() === $this) {
                $category->setNFT(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ETH>
     */
    public function getEths(): Collection
    {
        return $this->eths;
    }

    public function addEth(ETH $eth): static
    {
        if (!$this->eths->contains($eth)) {
            $this->eths->add($eth);
            $eth->setNFT($this);
        }

        return $this;
    }

    public function removeEth(ETH $eth): static
    {
        if ($this->eths->removeElement($eth)) {
            // set the owning side to null (unless already changed)
            if ($eth->getNFT() === $this) {
                $eth->setNFT(null);
            }
        }

        return $this;
    }
}
