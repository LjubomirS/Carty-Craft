<?php

namespace Module3Project\Entity;

class Order
{
    private string $orderId;
    private float $total;
    private string $completedAt;

    public function __construct(Cart $cart)
    {
        $this->orderId = uniqid();
        $this->total = $cart->getTotal();
        $this->completedAt = date('Y-m-d H:i:s');
    }

    public function orderId(): string
    {
        return $this->orderId;
    }

    public function total(): float
    {
        return $this->total;
    }

    public function completedAt(): string
    {
        return $this->completedAt;
    }
}