<?php

namespace App\Entity;

use App\Repository\OffreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OffreRepository::class)]
class Offre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $poste = null;

    #[ORM\Column(length: 255)]
    private ?string $attentes = null;

    #[ORM\Column(length: 255)]
    private ?string $niveauEtude = null;

    #[ORM\Column(length: 255)]
    private ?string $duree = null;

    /**
     * @var Collection<int, Alternant>
     */
    #[ORM\OneToMany(targetEntity: Alternant::class, mappedBy: 'offre')]
    private Collection $alternants;

    public function __construct()
    {
        $this->alternants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPoste(): ?string
    {
        return $this->poste;
    }

    public function setPoste(string $poste): static
    {
        $this->poste = $poste;

        return $this;
    }

    public function getAttentes(): ?string
    {
        return $this->attentes;
    }

    public function setAttentes(string $attentes): static
    {
        $this->attentes = $attentes;

        return $this;
    }

    public function getNiveauEtude(): ?string
    {
        return $this->niveauEtude;
    }

    public function setNiveauEtude(string $niveauEtude): static
    {
        $this->niveauEtude = $niveauEtude;

        return $this;
    }

    public function getDuree(): ?string
    {
        return $this->duree;
    }

    public function setDuree(string $duree): static
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * @return Collection<int, Alternant>
     */
    public function getAlternants(): Collection
    {
        return $this->alternants;
    }

    public function addAlternant(Alternant $alternant): static
    {
        if (!$this->alternants->contains($alternant)) {
            $this->alternants->add($alternant);
            $alternant->setOffre($this);
        }

        return $this;
    }

    public function removeAlternant(Alternant $alternant): static
    {
        if ($this->alternants->removeElement($alternant)) {
            // set the owning side to null (unless already changed)
            if ($alternant->getOffre() === $this) {
                $alternant->setOffre(null);
            }
        }

        return $this;
    }
}
