<?php
namespace OrderApp\Uzduotis\Models;
use OrderApp\Core\Connection;

class Order
{
    private $conenction;
    public function __construct($connection)
    {
        $this->connection = $connection;
    }
    public function insertOrder()
    {

    }

}