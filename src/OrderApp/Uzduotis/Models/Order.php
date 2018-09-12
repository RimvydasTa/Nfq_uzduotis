<?php
namespace OrderApp\Uzduotis\Models;


class Order
{
    public $postArr = [];

    public function __construct($postArray)
    {
        $this->postArr = $postArray;
    }

    public function validate()
    {

    }

    public function insert()
    {

    }

}