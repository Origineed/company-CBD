<?php

namespace App\Entity;

use App\Repository\ProductsOrderRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Query\Expr\Func;

#[ORM\Entity(repositoryClass: ProductsOrderRepository::class)]
class ProductsOrder
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?product $product = null;

    #[ORM\Column]
    private ?int $quantityInCart = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduct(): ?product
    {
        return $this->product;
    }

    public function setProduct(?product $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getQuantityInCart(): ?int
    {
        return $this->quantityInCart;
    }

    public function setQuantityInCart(int $quantityInCart): self
    {
        $this->quantityInCart = $quantityInCart;

        return $this;
    }

}
