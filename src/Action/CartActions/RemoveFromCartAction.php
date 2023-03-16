<?php

namespace Module3Project\Action\CartActions;

class RemoveFromCartAction
{
    public function handle(): void
    {
        $productId = (int)filter_input(INPUT_GET, 'productId', FILTER_SANITIZE_NUMBER_INT);

        $cart = unserialize($_SESSION['cart']);

        $cart->remove($productId);

        $_SESSION['cart'] = serialize($cart);

        header('Location: /index.php?action=cart');
    }
}