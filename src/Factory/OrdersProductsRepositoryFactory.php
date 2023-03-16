<?php

namespace Module3Project\Factory;

use Module3Project\Repository\OrdersProductsRepository;
use Module3Project\Repository\OrdersProductsRepositoryFromPdo;

class OrdersProductsRepositoryFactory
{
    public static function make(): OrdersProductsRepository
    {
        $pdo = require __DIR__ . '/../../config/module3ProjectConn.php';
        return new OrdersProductsRepositoryFromPdo($pdo);
    }
}