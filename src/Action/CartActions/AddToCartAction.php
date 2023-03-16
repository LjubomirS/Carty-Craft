<?php

namespace Module3Project\Action\CartActions;

class AddToCartAction
{
    public function handle(): void
    {
        (new AddProductCartQuantity())->handle();

        match ($_SERVER['HTTP_REFERER']) {
            "http://localhost:8888/index.php?action=catalog" => header('Location: /index.php?action=catalog'),
            "http://localhost:8888/index.php?action=cart" => header('Location: /index.php?action=cart')
        };
    }
}