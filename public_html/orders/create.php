<?php
/**
 * Created by PhpStorm.
 * User: rimvydas
 * Date: 18.9.12
 * Time: 20.39
 */

use OrderApp\Uzduotis\Models\Order;

if (isset($_POST['first_name'])){
    $postArr = $_POST['first_name'];

}

print_r($_POST['first_name']);
//$order = new Order($postArr);

//if($order->validate){
//    $order->insert();
//    header("Location: index.php");
//
//}