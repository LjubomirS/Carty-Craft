<?php

namespace Module3Project\Repository;

use Module3Project\Entity\Cart;
use Module3Project\Entity\Order;
use Module3Project\Entity\Product;

interface OrdersProductsRepository
{
    public function storeOrdersProducts(Cart $cart, Order $order, Product $product): void;
    public function ordersDetails(string $orderId);
}