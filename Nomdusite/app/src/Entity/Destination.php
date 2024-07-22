<?php

namespace App\Entity;

use App\Repository\DestinationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DestinationRepository::class)]
class Destination
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $label = null;

    #[ORM\Column(length: 255)]
    private ?string $image_path = null;

    #[ORM\Column(length: 255)]
    private ?string $drapeau = null;

    #[ORM\Column(length: 255)]
    private ?string $visa = null;

    #[ORM\Column(length: 255)]
    private ?string $passport = null;

    #[ORM\Column(length: 255)]
    private ?string $secure = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $langue = null;

    #[ORM\Column(length: 255)]
    private ?string $monnaie = null;

    #[ORM\Column(length: 255)]
    private ?string $debut_saison = null;

    #[ORM\Column(length: 255)]
    private ?string $fin_saison = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): static
    {
        $this->label = $label;

        return $this;
    }

    public function getImagePath(): ?string
    {
        return $this->image_path;
    }

    public function setImagePath(string $image_path): static
    {
        $this->image_path = $image_path;

        return $this;
    }

    public function getDrapeau(): ?string
    {
        return $this->drapeau;
    }

    public function setDrapeau(string $drapeau): static
    {
        $this->drapeau = $drapeau;

        return $this;
    }

    public function getVisa(): ?string
    {
        return $this->visa;
    }

    public function setVisa(string $visa): static
    {
        $this->visa = $visa;

        return $this;
    }

    public function getPassport(): ?string
    {
        return $this->passport;
    }

    public function setPassport(string $passport): static
    {
        $this->passport = $passport;

        return $this;
    }

    public function getSecure(): ?string
    {
        return $this->secure;
    }

    public function setSecure(string $secure): static
    {
        $this->secure = $secure;

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

    public function getLangue(): ?string
    {
        return $this->langue;
    }

    public function setLangue(string $langue): static
    {
        $this->langue = $langue;

        return $this;
    }

    public function getMonnaie(): ?string
    {
        return $this->monnaie;
    }

    public function setMonnaie(string $monnaie): static
    {
        $this->monnaie = $monnaie;

        return $this;
    }

    public function getDebutSaison(): ?string
    {
        return $this->debut_saison;
    }

    public function setDebutSaison(string $debut_saison): static
    {
        $this->debut_saison = $debut_saison;

        return $this;
    }

    public function getFinSaison(): ?string
    {
        return $this->fin_saison;
    }

    public function setFinSaison(string $fin_saison): static
    {
        $this->fin_saison = $fin_saison;

        return $this;
    }
}
