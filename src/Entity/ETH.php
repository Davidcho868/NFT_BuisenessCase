<?php

namespace App\Entity;

use App\Repository\ETHRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    private ?int $cours_ETH = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $jour_ETH = null;

    #[ORM\OneToMany(mappedBy: 'vaux', targetEntity: NFT::class)]
    private Collection $nFTs;

    public function __construct()
    {
        $this->nFTs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCoursETH(): ?int
    {
        return $this->cours_ETH;
    }

    public function setCoursETH(int $cours_ETH): static
    {
        $this->cours_ETH = $cours_ETH;

        return $this;
    }

    public function getJourETH(): ?\DateTimeInterface
    {
        return $this->jour_ETH;
    }

    public function setJourETH(\DateTimeInterface $jour_ETH): static
    {
        $this->jour_ETH = $jour_ETH;

        return $this;
    }

    /**
     * @return Collection<int, NFT>
     */
    public function getNFTs(): Collection
    {
        return $this->nFTs;
    }

    public function addNFT(NFT $nFT): static
    {
        if (!$this->nFTs->contains($nFT)) {
            $this->nFTs->add($nFT);
            $nFT->setVaux($this);
        }

        return $this;
    }

    public function removeNFT(NFT $nFT): static
    {
        if ($this->nFTs->removeElement($nFT)) {
            // set the owning side to null (unless already changed)
            if ($nFT->getVaux() === $this) {
                $nFT->setVaux(null);
            }
        }

        return $this;
    }
}
