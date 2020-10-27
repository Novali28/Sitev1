<?php

namespace App\Entity;

use App\Repository\ArmeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArmeRepository::class)
 */
class Arme
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
    private $damage;

    /**
     * @ORM\Column(type="integer")
     */
    private $rarete;

    /**
     * @ORM\Column(type="boolean")
     */
    private $estEquipe;

    /**
     * @ORM\ManyToOne(targetEntity=Ennemi::class, inversedBy="armes")
     */
    private $ennemi;

    /**
     * @ORM\ManyToOne(targetEntity=Joueur::class, inversedBy="armes")
     */
    private $joueur;

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

    public function getDamage(): ?int
    {
        return $this->damage;
    }

    public function setDamage(int $damage): self
    {
        $this->damage = $damage;

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
}
