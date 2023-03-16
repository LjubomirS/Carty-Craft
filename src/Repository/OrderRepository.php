<?php

namespace Module3Project\Repository;

use Module3Project\Entity\Order;

interface OrderRepository
{
    public function storeOrder(Order $order): void;
    /** @return Order[] */
    public function findAllOrders(): array;
}