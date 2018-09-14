<?php

namespace OrderApp\Uzduotis\Controllers;

use OrderApp\Core\Config;
use OrderApp\Core\Connection;
use OrderApp\Uzduotis\Services\OrderService;

class OrdersController {

    public function renderIndex()
    {
        //TODO Include index view
        include "../views/createOrder.view.php";
    }


    public function createOrder()
    {
        // gauti duomanis is request
        $createOrder = $this->getPostParam('createOrder'); // jau submitas

       // BL
        if ($createOrder) {

            $orderData = $this->getOrderDataFromPost();


            $config = new Config();
            //Getting config from /etc
            $db = $config->returnConfig('database');
            //init connection
            $connection = new Connection($db);
            //init order service
            $ordersService = new OrderService($connection) ;


            $rez = $ordersService->createOrder($orderData);
            if ( $rez) {
                // TODO redirect to list
                header("Location: /");


            } else {
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
        // TODO include orders view
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