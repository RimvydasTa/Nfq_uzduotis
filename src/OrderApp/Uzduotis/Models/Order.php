<?php
namespace OrderApp\Uzduotis\Models;


class Order
{

//    public $first_name;
//    public $last_name;
//    public $email;
//    public $phone;
//    public $address;
//    public $quantity;


    public function initializeFrom(){

    }
    public function insertOrder($orderArr, $pdo)
    {
        $statement = $pdo->prepare("insert into orders( first_name, last_name,email,quantity) values ('Rimvydas', 'Tamo', 'email@email', 2)");
        
        if ($statement->execute()){
            $this->successMsg = "Order successfully added! Check all orders here:";
            return $this->successMsg;
        }else {
            die("Error order insert failed");
        }
    }

    public function fetchOrders()
    {

    }

}