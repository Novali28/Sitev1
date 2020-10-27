<?php

namespace App\Entity;

use App\Repository\TypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeRepository::class)
 */
class Type
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
     * @ORM\OneToMany(targetEntity=Armure::class, mappedBy="type")
     */
    private $armures;

    public function __construct()
    {
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
            $armure->setType($this);
        }

        return $this;
    }

    public function removeArmure(Armure $armure): self
    {
        if ($this->armures->removeElement($armure)) {
            // set the owning side to null (unless already changed)
            if ($armure->getType() === $this) {
                $armure->setType(null);
            }
        }

        return $this;
    }
}
