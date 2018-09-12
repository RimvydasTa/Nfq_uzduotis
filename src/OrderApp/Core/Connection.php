<?php
/**
 * Created by PhpStorm.
 * User: rimvydas
 * Date: 18.9.11
 * Time: 20.41
 */

namespace OrderApp\Core;


class Connection
{
    private $config;
    private $pdo;

    public function __construct($config){
        $this->config = $config;
    }

    public  function getPdo(){
        
        if($this->pdo == null){
            $this->pdo = new \PDO(
                $this->config['connection'] . ';dbname=' . $this->config['name'],
                $this->config['username'],
                $this->config['password'],
                $this->config['options']
            );
        }
        
        return $this->pdo;  
    }
}