<?php

namespace Module3Project\Action\ProductActions;

use Module3Project\Factory\ProductRepositoryFactory;

class SeeCatalogAction
{
    public function handle(): void
    {
        $productRepository = ProductRepositoryFactory::make();
        $products = $productRepository->findAll();

        require_once __DIR__ . '/../../../views/ProductPages/catalogPage.php';
    }
}