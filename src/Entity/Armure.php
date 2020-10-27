<?php

namespace App\Entity;

use App\Repository\ArmureRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArmureRepository::class)
 */
class Armure
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="integer")
     */
    private $defense;

    /**
     * @ORM\Column(type="integer")
     */
    private $rarete;

    /**
     * @ORM\Column(type="boolean")
     */
    private $estEquipe;

    /**
     * @ORM\ManyToOne(targetEntity=Ennemi::class, inversedBy="armures")
     */
    private $ennemi;

    /**
     * @ORM\ManyToOne(targetEntity=Joueur::class, inversedBy="armures")
     */
    private $joueur;

    /**
     * @ORM\ManyToOne(targetEntity=Type::class, inversedBy="armures")
     */
    private $type;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDefense(): ?int
    {
        return $this->defense;
    }

    public function setDefense(int $defense): self
    {
        $this->defense = $defense;

        return $this;
    }

    public function getRarete(): ?int
    {
        return $this->rarete;
    }

    public function setRarete(int $rarete): self
    {
        $this->rarete = $rarete;

        return $this;
    }

    public function getEstEquipe(): ?bool
    {
        return $this->estEquipe;
    }

    public function setEstEquipe(bool $estEquipe): self
    {
        $this->estEquipe = $estEquipe;

        return $this;
    }

    public function getEnnemi(): ?Ennemi
    {
        return $this->ennemi;
    }

    public function setEnnemi(?Ennemi $ennemi): self
    {
        $this->ennemi = $ennemi;

        return $this;
    }

    public function getJoueur(): ?Joueur
    {
        return $this->joueur;
    }

    public function setJoueur(?Joueur $joueur): self
    {
        $this->joueur = $joueur;

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): self
    {
        $this->type = $type;

        return $this;
    }
}
