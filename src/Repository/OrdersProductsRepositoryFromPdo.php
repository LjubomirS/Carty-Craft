<?php

namespace Module3Project\Repository;

use Module3Project\Entity\Cart;
use Module3Project\Entity\Order;
use PDO;

class OrdersProductsRepositoryFromPdo implements OrdersProductsRepository
{
    public function __construct(private PDO $pdo)
    {}

    public function storeQuery()
    {
        return <<<SQL
            INSERT INTO orders_products (order_id, product_id, quantity, price)
            VALUES (:order_id,:product_id, :quantity, :price)
        SQL;
    }

    public function storeOrdersProducts(Cart $cart, Order $order, $product): void
    {
        $sql = $this->storeQuery();
        $stm = $this->pdo->prepare($sql);

        $params = [
            ':order_id' => $order->orderId(),
            ':product_id' => $product->productId(),
            ':quantity' => $cart->getCartProductQuantity($product),
            ':price' => $cart->getProductTotal($product)
        ];

        $stm->execute($params);
    }

    public function ordersDetails(string $orderId)
    {
        $stm = $this->pdo->prepare(<<<SQL
            SELECT orders_products.order_id AS orderId, orders_products.product_id AS productId, orders_products.quantity, orders_products.price AS productTotalPrice, orders.total, products.name, products.product_price AS productPrice
            FROM orders_products
            JOIN orders ON orders_products.order_id = orders.order_id
            JOIN products ON orders_products.product_id = products.product_id
            WHERE orders_products.order_id = '$orderId'
        SQL);
        $stm->execute();

        $result = array();
        while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }

        return $result;
    }
}