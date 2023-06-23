<?php

namespace App\Entity;

use App\Repository\AdresseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdresseRepository::class)]
class Adresse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_adresse = null;

    #[ORM\OneToOne(mappedBy: 'habite', cascade: ['persist', 'remove'])]
    private ?User $user = null;

    #[ORM\OneToMany(mappedBy: 'adresse', targetEntity: Commune::class)]
    private Collection $situer;

    public function __construct()
    {
        $this->situer = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomAdresse(): ?string
    {
        return $this->nom_adresse;
    }

    public function setNomAdresse(string $nom_adresse): static
    {
        $this->nom_adresse = $nom_adresse;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): static
    {
        // set the owning side of the relation if necessary
        if ($user->getHabite() !== $this) {
            $user->setHabite($this);
        }

        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, Commune>
     */
    public function getSituer(): Collection
    {
        return $this->situer;
    }

    public function addSituer(Commune $situer): static
    {
        if (!$this->situer->contains($situer)) {
            $this->situer->add($situer);
            $situer->setAdresse($this);
        }

        return $this;
    }

    public function removeSituer(Commune $situer): static
    {
        if ($this->situer->removeElement($situer)) {
            // set the owning side to null (unless already changed)
            if ($situer->getAdresse() === $this) {
                $situer->setAdresse(null);
            }
        }

        return $this;
    }
}
