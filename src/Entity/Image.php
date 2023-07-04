<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


#[ORM\Entity(repositoryClass: ImageRepository::class)]
#[Vich\Uploadable]
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

    #[Vich\UploadableField(mapping: 'nft_image', fileNameProperty:'liens')]
    private ?File $file = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updatedDate = null;


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


	public function getFile(): ?File {
            		return $this->file;
            	}
	
	
	public function setFile(File|UploadedFile|null $file): self {
            		$this->file = $file;
            
                    if(null !== $file); {
                        $this->setUpdatedDate(new \DateTime);
                    }
                    
            		return $this;
            	}

    public function getUpdatedDate(): ?\DateTimeInterface
    {
        return $this->updatedDate;
    }

    public function setUpdatedDate(?\DateTimeInterface $updatedDate): static
    {
        $this->updatedDate = $updatedDate;

        return $this;
    }
}
