<?php

namespace Module3Project\Repository;

use Module3Project\Entity\Product;
use PDO;

class ProductRepositoryFromPdo implements ProductRepository
{
    public function __construct(private PDO $pdo)
    {}

    private function storeQuery(Product $product) {
        if ($product->productId()) {
            return <<<SQL
                UPDATE products
                SET name=:name,
                    description=:description,
                    product_price=:product_price,
                    available_quantity=:available_quantity
                WHERE product_id=:product_id
            SQL;
        }
        return <<<SQL
            INSERT INTO products (name, description, product_price, available_quantity)
            VALUES (:name, :description, :product_price, :available_quantity)
        SQL;
    }

    private function deleteQuery() {
        return <<<SQL
            DELETE FROM products 
            WHERE product_id = :product_id
        SQL;
    }

    public function storeProduct(Product $product): void
    {
        $sql = $this->storeQuery($product);
        $stm = $this->pdo->prepare($sql);

        $params = [
            ':name' => $product->name(),
            ':description' => $product->description(),
            ':product_price' => $product->productPrice(),
            ':available_quantity' => $product->availableQuantity(),
        ];

        if ($product->productId()) {
            $params[':product_id'] = $product->productId();
        }

        $stm->execute($params);
    }

    public function findAll(): array
    {
        $stm = $this->pdo->prepare(<<<SQL
            SELECT product_id AS productId, name, description, product_price AS productPrice, available_quantity AS availableQuantity
            FROM products
        SQL);

        $stm->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Product::class);
        $stm->execute();

        return $stm->fetchAll();
    }

    public function find(int $productId): Product
    {
        $stm = $this->pdo->prepare(<<<SQL
            SELECT product_id AS productId, name, description, product_price AS productPrice, available_quantity AS availableQuantity
            FROM products
            WHERE product_id=:product_id
        SQL);

        $stm->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Product::class);
        $stm->bindParam(':product_id', $productId);
        $stm->execute();

        return $stm->fetch();
    }

    public function updateProduct($productId, $name, $description, $productPrice, $availableQuantity): void
    {
        $product = $this->find($productId);

        $sql = $this->storeQuery($product);
        $stm = $this->pdo->prepare($sql);

        $params = [
            ':product_id' => $productId,
            ':name' => $name,
            ':description' => $description,
            ':product_price' => $productPrice,
            ':available_quantity' => $availableQuantity,
        ];

        $stm->execute($params);
    }

    public function deleteProduct(int $productId): void
    {
        $sql = $this->deleteQuery();
        $stm = $this->pdo->prepare($sql);

        $params = [
            ':product_id' => $productId,
        ];

        $stm->execute($params);
    }
}