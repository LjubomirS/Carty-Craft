<?php

namespace Module3Project\Action\CheckoutActions;

use Module3Project\Factory\ProductRepositoryFactory;

class SeeCheckoutAction
{
    public function handle(): void
    {
        $productRepository = ProductRepositoryFactory::make();

        $cart = unserialize($_SESSION['cart']);

        $cart->resetTotal();
        $cart->calculateTotal();

        $_SESSION['cart'] = serialize($cart);

        require_once __DIR__ . '/../../../views/CheckoutPage/checkoutPage.php';
    }
}
