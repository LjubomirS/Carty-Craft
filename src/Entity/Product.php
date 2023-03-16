<?php

namespace Module3Project\Entity;

class Product
{
    private ?int $productId;
    private string $name;
    private ?string $description;
    private float $productPrice;
    private int $availableQuantity;

    public function __construct(
        string $name = '',
        ?string $description = null,
        float $productPrice = 0,
        int $availableQuantity = 0,
    ) {
        $this->productId = null;
        $this->name = $name;
        $this->description = $description;
        $this->productPrice = $productPrice;
        $this->availableQuantity = $availableQuantity;
    }

    public function productId(): ?int
    {
        return $this->productId;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function description(): ?string
    {
        return $this->description;
    }

    public function productPrice(): float
    {
        return $this->productPrice;
    }

    public function availableQuantity(): int
    {
        return $this->availableQuantity;
    }
}