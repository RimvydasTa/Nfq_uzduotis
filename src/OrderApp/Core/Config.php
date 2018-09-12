<?php 

namespace OrderApp\Core;

class Config {

    private $configArr = [];
    
    public function __construct(){

         $road =  __DIR__ . "/../../../etc/config.php";
         $this->configArr = include $road;
    }

    public function returnConfig($key){
            return $this->configArr[$key];
    }
}