<?php

namespace App\Entity;

use App\Repository\MetalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MetalRepository::class)
 */
class Metal
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=MetalAssay::class, mappedBy="metal", orphanRemoval=true)
     */
    private $metalAssays;

    public function __construct()
    {
        $this->metalAssays = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getname(): ?string
    {
        return $this->name;
    }

    public function setname(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|MetalAssay[]
     */
    public function getMetalAssays(): Collection
    {
        return $this->metalAssays;
    }

    public function addMetalAssay(MetalAssay $metalAssay): self
    {
        if (!$this->metalAssays->contains($metalAssay)) {
            $this->metalAssays[] = $metalAssay;
            $metalAssay->setMetal($this);
        }

        return $this;
    }

    public function removeMetalAssay(MetalAssay $metalAssay): self
    {
        if ($this->metalAssays->removeElement($metalAssay)) {
            // set the owning side to null (unless already changed)
            if ($metalAssay->getMetal() === $this) {
                $metalAssay->setMetal(null);
            }
        }

        return $this;
    }
}
