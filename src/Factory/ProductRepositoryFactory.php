<?php

namespace Module3Project\Factory;

use Module3Project\Repository\ProductRepository;
use Module3Project\Repository\ProductRepositoryFromPdo;

class ProductRepositoryFactory
{
    public static function make(): ProductRepository
    {
        $pdo = require __DIR__ . '/../../config/module3ProjectConn.php';
        return new ProductRepositoryFromPdo($pdo);
    }
}