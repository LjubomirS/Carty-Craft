<?php

session_start();
//session_destroy();

use Module3Project\Action\CartActions\AddToCartAction;
use Module3Project\Action\CartActions\RemoveFromCartAction;
use Module3Project\Action\CartActions\SeeCartAction;
use Module3Project\Action\CartActions\SubtractProductCartQuantity;
use Module3Project\Action\CheckoutActions\SeeCheckoutAction;
use Module3Project\Action\HomeAction;
use Module3Project\Action\OrderActions\CompleteOrderAction;
use Module3Project\Action\OrderActions\SeeAllOrdersAction;
use Module3Project\Action\OrderActions\SeeOrdersDetailsAction;
use Module3Project\Action\ProductActions\AddProductAction;
use Module3Project\Action\ProductActions\DeleteProductAction;
use Module3Project\Action\ProductActions\SeeCatalogAction;
use Module3Project\Action\ProductActions\UpdateProductAction;

require_once __DIR__ . '/../vendor/autoload.php';

$action = filter_input(INPUT_GET, 'action');

match ($action) {
    'add-product' => (new AddProductAction())->handle(),
    'catalog' => (new SeeCatalogAction())->handle(),
    'update' => (new UpdateProductAction())->handle(),
    'delete' => (new DeleteProductAction())->handle(),
    'add-to-cart' => (new AddToCartAction())->handle(),
    'cart' => (new SeeCartAction())->handle(),
    'subtract-from-cart' => (new SubtractProductCartQuantity())->handle(),
    'remove-from-cart' => (new RemoveFromCartAction())->handle(),
    'checkout' => (new SeeCheckoutAction())->handle(),
    'complete-order' => (new CompleteOrderAction())->handle(),
    'see-all-orders' => (new SeeAllOrdersAction())->handle(),
    'see-orders-details' => (new SeeOrdersDetailsAction())->handle(),
    default => (new HomeAction())->handle(),
};



