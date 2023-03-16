<?php

namespace Module3Project\Factory;

use Module3Project\Repository\OrderRepository;
use Module3Project\Repository\OrderRepositoryFromPdo;

class OrderRepositoryFactory
{
    public static function make(): OrderRepository
    {
        $pdo = require __DIR__ . '/../../config/module3ProjectConn.php';
        return new OrderRepositoryFromPdo($pdo);
    }
}