<?php

namespace Module3Project\Action;

use Module3Project\Factory\ProductRepositoryFactory;

class HomeAction
{
    public function handle(): void
    {
        $productRepository = ProductRepositoryFactory::make();
        $products = $productRepository->findAll();

        require_once __DIR__ . '/../../views/ProductPages/addProductPage.php';
    }
}