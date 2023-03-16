<?php

namespace Module3Project\Action\OrderActions;

use Module3Project\Entity\Order;
use Module3Project\Factory\OrderRepositoryFactory;
use Module3Project\Factory\OrdersProductsRepositoryFactory;
use Module3Project\Factory\ProductRepositoryFactory;

class CompleteOrderAction
{
    public function handle(): void
    {
        $cart = unserialize($_SESSION['cart']);

        $productRepository =  productRepositoryFactory::make();
        foreach ($cart->products() as $productCart){
            $productDb = $productRepository->find($productCart->productId());

            $cartQuantity = $cart->getCartProductQuantity($productCart);
            $availableQuantity = $productDb->availableQuantity();

            if($availableQuantity<$cartQuantity){
                echo 'Not enough products :/';
                echo <<<HTML
                    <meta http-equiv="refresh" content="2; url='http://localhost:8888/index.php?action=checkout'" />
                HTML;
                die;
            }

            $availableQuantity -= $cartQuantity;
            $productRepository->updateProduct($productDb->productId(), $productDb->name(), $productDb->description(), $productDb->productPrice(), $availableQuantity);
        }

        $order = new Order($cart);
        $orderRepository = OrderRepositoryFactory::make();
        $orderRepository->storeOrder($order);

        $orderProductsRepository = OrdersProductsRepositoryFactory::make();
        foreach ($cart->products() as $product){
            $orderProductsRepository->storeOrdersProducts($cart, $order, $product);
        }

        session_unset();

        header('Location: /index.php?action=catalog');
    }
}