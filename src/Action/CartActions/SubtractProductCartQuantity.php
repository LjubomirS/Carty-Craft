<?php

namespace Module3Project\Action\CartActions;

use Module3Project\Factory\ProductRepositoryFactory;

class SubtractProductCartQuantity
{
    public function handle(): void
    {
        $productId = (int)filter_input(INPUT_GET, 'productId', FILTER_SANITIZE_NUMBER_INT);

        $productRepository = ProductRepositoryFactory::make();
        $product = $productRepository->find($productId);

        $cart = unserialize($_SESSION['cart']);

        $cart->subtract($product);

        $_SESSION['cart'] = serialize($cart);

        header('Location: /index.php?action=cart');
    }
}