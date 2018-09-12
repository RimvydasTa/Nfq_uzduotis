<?php
/**
 * Created by PhpStorm.
 * User: rimvydas
 * Date: 18.9.11
 * Time: 20.41
 */

namespace Plaktukas\Core;

class Connection
{
    private $config;
    private $pdo;
    public function __construct($config){
        $this->config = $config;
    }


    public  function getPdo(){
        
        if($this->pdo == null){
            $this->pdo = new PDO(
                $config['connection'] . ';dbname=' . $config['name'],
                $config['username'],
                $config['password'],
                $config['options']
            );
        }
        
        return $this->pdo;  
    }
}