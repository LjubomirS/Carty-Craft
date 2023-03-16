<?php

namespace Module3Project\Repository;

use Module3Project\Entity\Product;

interface ProductRepository
{
    public function storeProduct(Product $product): void;
    public function updateProduct($productId, $name, $description, $productPrice, $availableQuantity): void;
    public function deleteProduct(int $productId): void;
    /** @return Product[] */
    public function findAll(): array;
    public function find(int $productId): Product;
}