<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $label = null;

    #[ORM\Column(name:'ordreCateg', nullable: false, type: 'integer')]
    private $orderCateg = null;

    #[ORM\Column(nullable: true)]
    private ?int $categoryParentId = null;

    #[ORM\OneToMany(targetEntity: Product::class, mappedBy: 'category')]
    private $products;

    public function __construct(){
        $this->products = new ArrayCollection();
    }

    public function getProduct(){
        return $this->products;
    }

    public function addProduct(Product $product){
        if(!$this->products->contains($product)){
            $this->products->add($product);
        }

    }
    public function removeProduct(Product $product){
        if($this->products->contains($product)){
            $this->products->removeElement($product);
        }
    }

    public function __toString(){
        if($this->label){
            return $this->label;
        } else {
            return '';
        }

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(?string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getCategoryParentId(): ?int
    {
        return $this->categoryParentId;
    }

    public function setCategoryParentId(?int $categoryParentId): self
    {
        $this->categoryParentId = $categoryParentId;

        return $this;
    }

    public function getOrderCateg()
    {
        return $this->orderCateg;
    }


    public function setOrderCateg($orderCateg): void
    {
        $this->orderCateg = $orderCateg;
    }
   
}
