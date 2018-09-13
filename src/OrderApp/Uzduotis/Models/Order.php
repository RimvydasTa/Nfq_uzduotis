<?php
namespace OrderApp\Uzduotis\Models;
use OrderApp\Core\Connection;

class Order
{
    private $conenction;
    private $dataArr = [];

    public function __construct($connection, $dataArr)
    {
        $this->connection = $connection;
        $this->dataArr = $dataArr;
    }
    public function insertOrder()
    {
        $statment = $this->conenction->prepare('insert into orders values (first_name, last_name, email, quantity, date_created))');

        if($statment->execute()){
            return $this->success = "Order inserted";
        }else {
            die("Execution failed");
        }

    }

}