<?php
/**
 * Created by PhpStorm.
 * User: rimvydas
 * Date: 18.9.11
 * Time: 20.41
 */

class Connection
{

    public static function make($config){
        try{
            return new PDO(
                $config['connection'] . ';dbname=' . $config['name'],
                $config['username'],
                $config['password'],
                $config['options']
            );
        }catch (PDOException $e){
            die($e->getMessage());
        }
    }
}