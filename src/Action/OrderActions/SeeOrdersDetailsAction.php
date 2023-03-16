<?php

namespace Module3Project\Action\OrderActions;

use Module3Project\Factory\OrderRepositoryFactory;
use Module3Project\Factory\OrdersProductsRepositoryFactory;

class SeeOrdersDetailsAction
{
    public function handle(): void
    {
        $orderId = filter_input(INPUT_GET, 'orderId');

        $ordersProductsRepository = OrdersProductsRepositoryFactory::make();

        $ordersDetails = $ordersProductsRepository->ordersDetails($orderId);

        require_once __DIR__ . '/../../../views/OrderPages/orderDetailsPage.php';
    }
}