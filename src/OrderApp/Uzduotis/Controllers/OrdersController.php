<?php

namespace OrderApp\Uzduotis\Controllers;

use OrderApp\Core\Config;
use OrderApp\Core\Connection;
use OrderApp\Uzduotis\Services\OrderService;



class OrdersController {
    public $msg;

    public function renderIndex()
    {

        require "../views/createOrder.view.php";
        session_unset();
        $errors = [];
    }


    public function createOrder()
    {

        $createOrder = $this->getPostParam('createOrder', 'createOrder');


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
            if ( $rez === true) {
                header("Location: ../index.php?order=success");

            } else {

                    session_start();
                    $_SESSION['errors'] = $rez;
                    header("Location: ../");
            }
        } else  {
           die("Error; something went wrong check logs or db config");
        }
        return;
    }

    public function listOrders()
    {

        $config = new Config();
        $db = $config->returnConfig('database');
        $connection = new Connection($db);
        $ordersService = new OrderService($connection) ;

        $orders = $ordersService->getOrders();

        // render view / response
        // TODO include orders view
        include "../views/orders.view.php";
    }


    private function getPostParam( $name, $default ) {
        if ( isset($_POST[$name])) {
            return true;
        }
        else {
            return $default;
        }
    }

    private function getOrderDataFromPost () {
        return [
            "name" => $_POST['first_name'],
            "lname" =>  $_POST['last_name'],
            "email" => $_POST['email'],
            "address" =>  $_POST['address'],
            "phone" =>  $_POST['phone'],
            "quantity" =>  $_POST['quantity'],
        ];
    }
    
}