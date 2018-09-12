<?php 

namespace Plaktukas\Core;

class Config {

    private $configArr = [];
    
    public function __construct(){
     $road =  __DIR__ . "/../../../etc/config.php";
       // echo "road=".  $road . "\n";
      $this->configArr = include $road;
        
    }

    public function returnString($key){
            //var_dump($this->configArr);
            return $this->configArr[$key];
    }
}