<?php
require '../vendor/autoload.php';

$requestUri = $_SERVER['REQUEST_URI'];
if ( strpos($requestUri, '/orders/create') === 0){
    $ordersController = new \OrderApp\Uzduotis\Controllers\OrdersController();
    $ordersController->createOrder();
}else if ( strpos($requestUri, '/orders') === 0){
    $ordersController = new \OrderApp\Uzduotis\Controllers\OrdersController();
    $ordersController->listOrders();
}else {
    $ordersController = new \OrderApp\Uzduotis\Controllers\OrdersController();
    $ordersController->createOrder();
}
