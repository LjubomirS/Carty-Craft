<?php

namespace Module3Project\Action\ProductActions;

use Module3Project\Factory\ProductRepositoryFactory;

class UpdateProductAction
{
    public function handle(): void
    {
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            $productId = (int)filter_input(INPUT_GET, 'productId', FILTER_SANITIZE_NUMBER_INT);

            $productRepository = ProductRepositoryFactory::make();
            $product = $productRepository->find($productId);

            require_once __DIR__ . '/../../../views/ProductPages/updateProductPage.php';
        }else{
            $productId = (int)filter_input(INPUT_POST, 'productId', FILTER_VALIDATE_INT);
            $name = (string)filter_input(INPUT_POST, trim('name'));
            $description = (string)filter_input(INPUT_POST, 'description');
            $productPrice = (float)filter_input(INPUT_POST, 'productPrice', FILTER_VALIDATE_FLOAT);
            $availableQuantity = (integer)filter_input(INPUT_POST, 'availableQuantity', FILTER_VALIDATE_INT);

            $name = trim($name);
            $description = trim($description);

            if($name === "" || $description === "" || $productPrice < 0 || $availableQuantity < 0 ){
                header('Location: /index.php');
                die;
            }

            $productRepository = ProductRepositoryFactory::make();
            $productRepository->updateProduct($productId, $name, $description, $productPrice, $availableQuantity);

            header('Location: /index.php');
        }
    }
}