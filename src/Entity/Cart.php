<?php

namespace Module3Project\Entity;

class Cart
{
    /** @var Product[] */
    private array $products;
    private array $quantities;
    private array $productTotal;
    private float $total;

    public function __construct(Product $product = null)
    {
        $this->products = [];
        $this->quantities = [];
        $this->productTotal = [];
        $this->total = 0;

        if ($product !== null) {
            $this->add($product);
        }
    }

    public function add(Product $product): void
    {
        $this->productTotalIncrease($product);
        $this->products[$product->productId()] = $product;
        $this->quantities[$product->productId()] += 1;
    }

    public function subtract(Product $product): void
    {
        $this->quantities[$product->productId()] -= 1;
        $this->productTotalDecrease($product);
        if($this->quantities[$product->productId()] === 0){
            $this->remove($product->productId());
        }
    }

    public function productTotalIncrease(Product $product): void
    {
        $this->productTotal[$product->productId()] += $product->productPrice();
    }

    public function productTotalDecrease(Product $product): void
    {
        $this->productTotal[$product->productId()] -= $product->productPrice();
    }

    public function remove($productId): void
    {
        foreach ($this->products as $key => $product){
            if($product->productId() === $productId){
                $this->productTotal[$product->productId()] = 0;
                unset($this->products[$key]);
                unset($this->quantities[$product->productId()]);
            }
        }
    }

    /**
     * @return Product[]
     */
    public function products(): array
    {
        return $this->products;
    }

    public function calculateTotal(): void
    {
        foreach ($this->productTotal as $value){
            $this->total += $value;
        }
    }

    public function resetTotal(): void
    {
        $this->total = 0;
    }

    public function getCartProductQuantity(Product $product): int
    {
        return $this->quantities[$product->productId()] ?? 0;
    }

    public function getProductTotal(Product $product): float
    {
        return $this->productTotal[$product->productId()] ?? 0;
    }

    public function getTotal(): float
    {
        return $this->total;
    }

}