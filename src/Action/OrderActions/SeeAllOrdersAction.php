<?php

namespace Module3Project\Action\OrderActions;

use Module3Project\Factory\OrderRepositoryFactory;

class SeeAllOrdersAction
{
    public function handle(): void
    {
        $orderRepository = OrderRepositoryFactory::make();

        $orders = $orderRepository->findAllOrders();

        require_once __DIR__ . '/../../../views/OrderPages/allOrdersPage.php';
    }
}