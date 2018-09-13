<?php
/**
 * Created by PhpStorm.
 * User: rimvydas
 * Date: 18.9.12
 * Time: 20.39
 */

require '../../vendor/autoload.php';


use OrderApp\Core\Connection;
use OrderApp\Core\Config;
use OrderApp\Uzduotis\Models\Order;
use OrderApp\Core\Constants;
use OrderApp\Uzduotis\Controllers\FormHandler;

if (isset($_POST['submit'])){

    $first_name = $_POST['first_name'] ?? '';
    $last_name = $_POST['last_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $address = $_POST['address'] ?? '';
    $quantity = $_POST['quantity'] ?? 0;

    $formHandler = new FormHandler($first_name, $last_name, $email, $phone, $address, $quantity);


    $config = new Config();

    $db = $config->returnConfig('database');

    $connection = new Connection($db);

    $orderData = $formHandler->sanitizeData();

    if ($orderData === true){
        $order = new Order($connection, $formHandler->postArray);
        $order->insertOrder();

    }else {
       $errorArray = $orderData;
    }
}




//if($order->validate){
//    $order->insert();
//    header("Location: index.php");
//
//}