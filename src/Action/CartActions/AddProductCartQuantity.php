<?php

namespace Module3Project\Action\CartActions;

use Module3Project\Entity\Cart;
use Module3Project\Factory\ProductRepositoryFactory;

class AddProductCartQuantity
{
    public function handle(): void
    {
        $productId = (int)filter_input(INPUT_GET, 'productId', FILTER_SANITIZE_NUMBER_INT);

        $productRepository = ProductRepositoryFactory::make();
        $product = $productRepository->find($productId);

        $sessionCart = $_SESSION['cart'] ?? null;
        $cart = null === $sessionCart ? new Cart() : unserialize($sessionCart);

        $cart->add($product);

        $_SESSION['cart'] = serialize($cart);
    }
}