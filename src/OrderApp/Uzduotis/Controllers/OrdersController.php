<?php

namespace OrderApp\Uzduotis\Controllers;
use OrderApp\Core\Constants;
use OrderApp\Uzduotis\Services\OrderService;

class OrdersController {
    public function createOrder()
    {
        // gauti duomanis iis request
        $createOrder = $this->getPostParam('createOrder'); // jau submitas

       // BL
        if ( $createOrder ) {

            $orderData = $this->getOrderDataFromPost();


            $config = new Config();
            $db = $config->returnConfig('database');
            $connection = new Connection($db);
            $ordersService = new OrderService($connection) ;


            $rez = $ordersService->createOrder($orderData);
            if ( $rez) {
                // TODO redirect to list
            }
            else {
                // render view / response
                // TODO error message pass to .. order edit form
                // include order edit form
            }
        } else  {
            // render view / response
            // TODO include order edit form
        }
    }

    public function listOrders()
    {
        // gauti duomanis iis request

        // BL
        $config = new Config();
        $db = $config->returnConfig('database');
        $connection = new Connection($db);
        $ordersService = new OrderService($connection) ; // TODO galima tik dao kviesti

        $orders = $ordersService->getOrders(); // TODO galima tik dao kviesti

        // render view / response
        // TOOD include orders view
    }


    private function getPostParam( $name, $default ) {
        if ( isset($_POST[$name])) {
            return $_POST[$name];
        }
        else {
            return $default;
        }
    }

    private function getOrderDataFromPost () {
        // TODO
        return [];
    }
    
}