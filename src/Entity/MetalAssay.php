<?php

namespace App\Entity;

use App\Repository\MetalAssayRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MetalAssayRepository::class)
 */
class MetalAssay
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Metal::class, inversedBy="metalAssays")
     * @ORM\JoinColumn(nullable=false)
     */
    private $metal;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $assay;

    public function __construct(int $id, Metal $metal, ?int $assay)
    {
        $this->id = $id;
        $this->metal = $metal;
        $this->assay = $assay;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMetal(): ?Metal
    {
        return $this->metal;
    }

    public function setMetal(?Metal $metal): self
    {
        $this->metal = $metal;

        return $this;
    }

    public function getAssay(): ?int
    {
        return $this->assay;
    }

    public function setAssay(int $assay): self
    {
        $this->assay = $assay;

        return $this;
    }
}
