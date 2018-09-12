<?php

namespace OrderApp\Core;

class Kernel {
    public static function getRootDir(){
        return __DIR__ . "/../../../";
    }
    
    public static function getViewsDir(){
        return self::getRootDir() . 'views/';
    }
}