<?php
namespace OrderApp\Uzduotis\Models;


class Order
{

    private $first_name;
    private $last_name;
    private $email;
    private $phone;
    private $address;
    private $quantity;


    public function assignData($orderArr){


        $this->first_name = $orderArr['name'];
        $this->last_name = $orderArr['lname'];
        $this->email = $orderArr['email'];
        $this->address = $orderArr['address'];
        $this->phone = $orderArr['phone'];
        $this->quantity = $orderArr['quantity'];
    }
    public function insertOrder($orderArr, $pdo)
    {
        $this->assignData($orderArr);
        $statement = $pdo->prepare("insert into orders( first_name, last_name,email,address, quantity, phone, order_date) 
      values ( 
            '$this->first_name', 
            '$this->last_name',
            '$this->email',
            '$this->address',
            '$this->phone',
            '$this->quantity',
            'now()'
            )");
        
        if ($statement->execute()){
           return true;
        }else {
            die("Error order insert failed. Check db" . mysql_error($pdo));
        }
    }

    public function fetchOrders()
    {

    }

}