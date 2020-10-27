<?php

namespace App\Entity;

use App\Repository\JoueurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JoueurRepository::class)
 */
class Joueur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=Arme::class, mappedBy="joueur")
     */
    private $armes;

    /**
     * @ORM\OneToMany(targetEntity=Armure::class, mappedBy="joueur")
     */
    private $armures;

    public function __construct()
    {
        $this->armes = new ArrayCollection();
        $this->armures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
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

    /**
     * @return Collection|Arme[]
     */
    public function getArmes(): Collection
    {
        return $this->armes;
    }

    public function addArme(Arme $arme): self
    {
        if (!$this->armes->contains($arme)) {
            $this->armes[] = $arme;
            $arme->setJoueur($this);
        }

        return $this;
    }

    public function removeArme(Arme $arme): self
    {
        if ($this->armes->removeElement($arme)) {
            // set the owning side to null (unless already changed)
            if ($arme->getJoueur() === $this) {
                $arme->setJoueur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Armure[]
     */
    public function getArmures(): Collection
    {
        return $this->armures;
    }

    public function addArmure(Armure $armure): self
    {
        if (!$this->armures->contains($armure)) {
            $this->armures[] = $armure;
            $armure->setJoueur($this);
        }

        return $this;
    }

    public function removeArmure(Armure $armure): self
    {
        if ($this->armures->removeElement($armure)) {
            // set the owning side to null (unless already changed)
            if ($armure->getJoueur() === $this) {
                $armure->setJoueur(null);
            }
        }

        return $this;
    }
}
