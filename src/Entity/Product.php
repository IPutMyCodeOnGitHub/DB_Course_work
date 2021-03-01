<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $article;

    /**
     * @ORM\ManyToOne(targetEntity=JewelType::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=Brand::class)
     */
    private $brand;

    /**
     * @ORM\ManyToOne(targetEntity=Style::class)
     */
    private $style;

    /**
     * @ORM\OneToOne(targetEntity=GemSize::class, mappedBy="product", cascade={"persist", "remove"})
     */
    private $gemSize;

    /**
     * @ORM\ManyToOne(targetEntity=MetalAssay::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $metal;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $size;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $weight;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArticle(): ?string
    {
        return $this->article;
    }

    public function setArticle(string $article): self
    {
        $this->article = $article;

        return $this;
    }

    public function getType(): ?JewelType
    {
        return $this->type;
    }

    public function setType(?JewelType $type): self
    {
        $this->type = $type;

        return $this;
    }


    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function setBrand(?Brand $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getStyle(): ?Style
    {
        return $this->style;
    }

    public function setStyle(?Style $style): self
    {
        $this->style = $style;

        return $this;
    }

    public function getGemSize(): ?GemSize
    {
        return $this->gemSize;
    }

    public function setGemSize(GemSize $gemSize): self
    {
        // set the owning side of the relation if necessary
        if ($gemSize->getProduct() !== $this) {
            $gemSize->setProduct($this);
        }

        $this->gemSize = $gemSize;

        return $this;
    }

    public function getMetal(): ?MetalAssay
    {
        return $this->metal;
    }

    public function setMetal(?MetalAssay $metal): self
    {
        $this->metal = $metal;

        return $this;
    }

    public function getSize(): ?float
    {
        return $this->size;
    }

    public function setSize(?float $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function setWeight(?float $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }
}
