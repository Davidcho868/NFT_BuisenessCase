<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImageRepository::class)]
class Image
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $lien_image = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_image = null;

    #[ORM\Column(length: 255)]
    private ?string $description_image = null;

    #[ORM\OneToOne(mappedBy: 'correspond', cascade: ['persist', 'remove'])]
    private ?NFT $nFT = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLienImage(): ?string
    {
        return $this->lien_image;
    }

    public function setLienImage(string $lien_image): static
    {
        $this->lien_image = $lien_image;

        return $this;
    }

    public function getNomImage(): ?string
    {
        return $this->nom_image;
    }

    public function setNomImage(string $nom_image): static
    {
        $this->nom_image = $nom_image;

        return $this;
    }

    public function getDescriptionImage(): ?string
    {
        return $this->description_image;
    }

    public function setDescriptionImage(string $description_image): static
    {
        $this->description_image = $description_image;

        return $this;
    }

    public function getNFT(): ?NFT
    {
        return $this->nFT;
    }

    public function setNFT(NFT $nFT): static
    {
        // set the owning side of the relation if necessary
        if ($nFT->getCorrespond() !== $this) {
            $nFT->setCorrespond($this);
        }

        $this->nFT = $nFT;

        return $this;
    }
}
