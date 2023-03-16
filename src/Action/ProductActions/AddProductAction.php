<?php

namespace Module3Project\Action\ProductActions;

use Module3Project\Entity\Product;
use Module3Project\Factory\ProductRepositoryFactory;

class AddProductAction
{
    public function handle(): void
    {
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

        $product = new Product(
            $name,
            $description,
            $productPrice,
            $availableQuantity,
        );

        $productRepository = ProductRepositoryFactory::make();
        $productRepository->storeProduct($product);

        header('Location: /index.php');
    }
}