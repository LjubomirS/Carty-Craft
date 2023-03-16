<?php

namespace Module3Project\Repository;

use Module3Project\Entity\Order;
use PDO;

class OrderRepositoryFromPdo implements OrderRepository
{
    public function __construct(private PDO $pdo)
    {}

    public function storeQuery()
    {
        return <<<SQL
            INSERT INTO orders (order_id, total, completed_at)
            VALUES (:order_id, :total, :completed_at)
        SQL;
    }

    public function findOrderQuery()
    {
        return <<<SQL
            INSERT INTO orders (order_id, total, completed_at)
            VALUES (:order_id, :total, :completed_at)
        SQL;
    }

    public function storeOrder(Order $order): void
    {
        $sql = $this->storeQuery();
        $stm = $this->pdo->prepare($sql);

        $params = [
            ':order_id' => $order->orderId(),
            ':total' => $order->total(),
            ':completed_at' => $order->completedAt()
        ];

        $stm->execute($params);
    }

    public function findAllOrders(): array
    {
        $stm = $this->pdo->prepare(<<<SQL
            SELECT order_id AS orderId, total, completed_at AS completedAt
            FROM orders
        SQL);
        $stm->execute();

        $result = array();
        while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }

        return $result;
    }
}