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
    private ?string $liens = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_img = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\OneToOne(mappedBy: 'images', cascade: ['persist', 'remove'])]
    private ?NFT $nFT = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLiens(): ?string
    {
        return $this->liens;
    }

    public function setLiens(string $liens): static
    {
        $this->liens = $liens;

        return $this;
    }

    public function getNomImg(): ?string
    {
        return $this->nom_img;
    }

    public function setNomImg(string $nom_img): static
    {
        $this->nom_img = $nom_img;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getNFT(): ?NFT
    {
        return $this->nFT;
    }

    public function setNFT(NFT $nFT): static
    {
        // set the owning side of the relation if necessary
        if ($nFT->getImages() !== $this) {
            $nFT->setImages($this);
        }

        $this->nFT = $nFT;

        return $this;
    }
}
