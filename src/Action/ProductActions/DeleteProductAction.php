<?php

namespace Module3Project\Action\ProductActions;

use Module3Project\Factory\ProductRepositoryFactory;

class DeleteProductAction
{
    public function handle(): void
    {
        $productId = (int)filter_input(INPUT_GET, 'productId', FILTER_SANITIZE_NUMBER_INT);

        $productRepository = ProductRepositoryFactory::make();
        $productRepository->deleteProduct($productId);

        header('Location: /index.php');
    }
}