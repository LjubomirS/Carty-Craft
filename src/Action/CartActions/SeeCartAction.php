<?php

namespace Module3Project\Action\CartActions;

use Module3Project\Entity\Cart;

class SeeCartAction
{
    public function handle(): void
    {
        $sessionCart = $_SESSION['cart'] ?? null;
        $cart = null === $sessionCart ? new Cart() : unserialize($sessionCart);

        require_once __DIR__ . '/../../../views/CartPage/cartPage.php';
    }
}