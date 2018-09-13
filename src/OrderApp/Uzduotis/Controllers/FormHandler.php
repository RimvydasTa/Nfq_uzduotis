<?php

namespace OrderApp\Uzduotis\Controllers;
use OrderApp\Core\Constants;

class FormHandler {


    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $address;
    public $quantity;

    //Validation error array
    private $errorArray;
    //Sanitized value array
    public $postArray = [];

    /**
     * Order constructor.
     * @param $first_name
     * @param $last_name
     * @param $email
     * @param $phone
     * @param $address
     * @param $quantity
     */

    public function __construct($first_name, $last_name, $email, $phone, $address, $quantity)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
        $this->quantity = $quantity;
        //Error array
        $this->errorArray = [];
    }

    public function sanitizeData()
    {
        $this->validateEmail($this->email);
        $this->validateName($this->first_name, 'First');
        $this->validateLastName($this->last_name, 'Last');
        $this->validatePhone($this->phone);
        $this->validateAddress($this->address);
        $this->validateQuantity($this->quantity);

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

}