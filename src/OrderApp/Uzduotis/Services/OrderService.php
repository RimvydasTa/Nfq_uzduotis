<?php
/**
 * Created by PhpStorm.
 * User: rimvydas
 * Date: 18.9.14
 * Time: 13.18
 */

namespace OrderApp\Uzduotis\Services;
use OrderApp\Uzduotis\Models\Order;

class OrderService
{
    public $connection;
    //Validation error array
    private $errorArray;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function sanitizeData($orderArr)
    {
       // $this->validateEmail($orderArr['email']);
        $this->validateName($orderArr['name'], 'First');
        $this->validateLastName($orderArr['lname'], 'Last');
        $this->validatePhone($orderArr['phone']);
       // $this->validateAddress($orderArr['address']);
        $this->validateQuantity($orderArr['quantity']);

        if (!empty($this->errorArray)){

            return false ;
        }else {

            return true;
        }


    }
    //Second param string for first or last name
    private function validateName ($name, $letter){
        if (strlen($name) > 50 || strlen($name) < 3){
             array_push($this->errorArray, 'Error: ' . $letter . ' name must be between 3 and 50 characters');
            //$this->errorArray['name'] = 'Error: ' . $letter . ' name must be between 3 and 50 characters';

        }
    }

    private function validateLastName ($lname, $letter){
        if (strlen($lname) > 50 || strlen($lname) < 3){
             array_push($this->errorArray, 'Error: ' . $letter . ' name must be between 3 and 50 characters');
            //$this->errorArray['lname'] = 'Error: ' . $letter . ' name must be between 3 and 50 characters';

        }
    }
    private function validateEmail ($email){

        //Checks if correct email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            array_push($this->errorArray, 'Error: wrong email format');
            //$this->errorArray['email'] = Constants::$emailWrongFormat;

        }
    }

    private function validateAddress($address){
        if (!preg_match('/^(?:\\d+ [a-zA-Z ]+, ){2}[a-zA-Z ]+$/', $address)){
            array_push($this->errorArray, Constants::$badAddressFormat);
            //$this->errorArray['address'] =  Constants::$badAddressFormat;


        }
    }

    private function validateQuantity($quantity){

        if(!filter_var($quantity, FILTER_VALIDATE_INT)){
            array_push($this->errorArray, 'Error quantity must be a number');
           // $this->errorArray['quantity'] =  Constants::$badQuantityFormat;
        }

        if($quantity < 1){
            array_push($this->errorArray, 'Error: Quantity must be 1 or higher');
           // $this->errorArray['quantity'] =  Constants::$quantityTooLow;
        }


    }

    private function validatePhone($phone){
        if (!preg_match('/^\+370\d{8}$/', $phone)){
             array_push($this->errorArray, 'Error bad phone format. Example format +370xxxxxxxx (no spaces)');
            //$this->errorArray['phone'] =  Constants::$badPhoneFormat;

        }

    }



    public function createOrder(array $orderArr)
    {
        //TODO validate
           if ( $this->sanitizeData($orderArr)){
               //Todo insert i db
               $order = new Order();
               $order->insertOrder($orderArr, $this->connection);
           }else {
               //TODO if false getErrorArray()

               return $this->getErrorArray();
           }

        //return true or false
            return true;
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