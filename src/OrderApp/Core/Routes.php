<?php
/**
 * Created by PhpStorm.
 * User: rimvydas
 * Date: 18.9.12
 * Time: 17.31
 */

namespace OrderApp\Core;


use http\Exception;

class Routes
{
    private $routes = [];

    public static function load($file)
    {

        $router = new static;
        require $file;

        return $router;
    }

    public function define($routes)
    {
        $this->routes = $routes;
    }

    public function direct($uri)
    {
        if (array_key_exists($uri, $this->routes)){
            return $this->routes[$uri];
        }else {
            throw new \Exception("No routes found");
        }
    }
}