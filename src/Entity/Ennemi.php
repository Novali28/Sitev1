<?php

namespace App\Entity;

use App\Repository\EnnemiRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EnnemiRepository::class)
 */
class Ennemi
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
    private $pv;

    /**
     * @ORM\OneToMany(targetEntity=Arme::class, mappedBy="ennemi")
     */
    private $armes;

    /**
     * @ORM\OneToMany(targetEntity=Armure::class, mappedBy="ennemi")
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

    public function getPv(): ?int
    {
        return $this->pv;
    }

    public function setPv(int $pv): self
    {
        $this->pv = $pv;

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
            $arme->setEnnemi($this);
        }

        return $this;
    }

    public function removeArme(Arme $arme): self
    {
        if ($this->armes->removeElement($arme)) {
            // set the owning side to null (unless already changed)
            if ($arme->getEnnemi() === $this) {
                $arme->setEnnemi(null);
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
            $armure->setEnnemi($this);
        }

        return $this;
    }

    public function removeArmure(Armure $armure): self
    {
        if ($this->armures->removeElement($armure)) {
            // set the owning side to null (unless already changed)
            if ($armure->getEnnemi() === $this) {
                $armure->setEnnemi(null);
            }
        }

        return $this;
    }
}
