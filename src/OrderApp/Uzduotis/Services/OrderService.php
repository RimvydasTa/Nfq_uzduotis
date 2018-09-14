<?php
/**
 * Created by PhpStorm.
 * User: rimvydas
 * Date: 18.9.14
 * Time: 13.18
 */

namespace OrderApp\Uzduotis\Services;

use OrderApp\Core\Connection;
use OrderApp\Uzduotis\Models\Order;

class OrderService
{
    public $connection;
    //Validation error array
    private $errorArray;
    //Sanitized value array
    public $postArray = [];

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function sanitizeData($first_name, $last_name, $email, $phone, $address, $quantity)
    {
        $this->validateEmail($email);
        $this->validateName($first_name, 'First');
        $this->validateLastName($last_name, 'Last');
        $this->validatePhone($phone);
        $this->validateAddress($address);
        $this->validateQuantity($quantity);

        if (!empty($this->errorArray)){
            return $this->errorArray;
        }else {
            $this->getPostArray();
            return true;
        }


    }
    //Second param string for first or last name
    private function validateName ($name, $letter){
        if (strlen($name) > 50 || strlen($name) < 3){
            // array_push($this->errorArray, 'Error: ' . $letter . ' name must be between 3 and 50 characters');
            $this->errorArray['name'] = 'Error: ' . $letter . ' name must be between 3 and 50 characters';
            return;
        }
    }

    private function validateLastName ($lname, $letter){
        if (strlen($lname) > 50 || strlen($lname) < 3){
            // array_push($this->errorArray, 'Error: ' . $letter . ' name must be between 3 and 50 characters');
            $this->errorArray['lname'] = 'Error: ' . $letter . ' name must be between 3 and 50 characters';
            return;
        }
    }
    private function validateEmail ($email){

        //Checks if correct email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            //array_push($this->errorArray, Constants::$emailWrongFormat);
            $this->errorArray['email'] = Constants::$emailWrongFormat;
            return;
        }
    }

    private function validateAddress($address){
        if (!preg_match('/^(?:\\d+ [a-zA-Z ]+, ){2}[a-zA-Z ]+$/', $address)){
            //array_push($this->errorArray, Constants::$badAddressFormat);
            $this->errorArray['address'] =  Constants::$badAddressFormat;

            return;
        }
    }

    private function validateQuantity($quantity){

        if(!filter_var($quantity, FILTER_VALIDATE_INT)){
            //array_push($this->errorArray, Constants::$badQuantityFormat);
            $this->errorArray['quantity'] =  Constants::$badQuantityFormat;
        }

        if($quantity < 1){
            //array_push($this->errorArray, Constants::$badQuantityFormat);
            $this->errorArray['quantity'] =  Constants::$quantityTooLow;
        }

        return;
    }

    private function validatePhone($phone){
        if (!preg_match('/^\+370\d{8}$/', $phone)){
            // array_push($this->errorArray, Constants::$badPhoneFormat);
            $this->errorArray['phone'] =  Constants::$badPhoneFormat;

        }
        return;
    }

    public function getPostArray()
    {
        $this->postArray = [

            "name" => $this->first_name,
            "lname" => $this->last_name,
            "email" => $this->email,
            "address" => $this->address,
            "phone" => $this->phone,
            "quantity" => $this->quantity,

        ];

        return $this->postArray;
    }

    public function createOrder(Order $order)
    {
        //TODO validate

        //TODO if false getErrorArray()

        //Todo insert i db

        //return true or false

    }

    public function getOrders()
    {
        include "../views/orders.view.php";
    }

    public function getErrorArray()
    {
        return $this->errorArray;
    }

    //TODO Search logic

    //TODO Pagination Logic

    //TODO Filter LOGIC
}