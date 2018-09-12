<?php
/**
 * Created by PhpStorm.
 * User: rimvydas
 * Date: 18.9.11
 * Time: 20.06
 */

require '../vendor/autoload.php';


use OrderApp\Core\Connection;
use OrderApp\Core\Config;
use OrderApp\Uzduotis\Controllers\PagesController;


$requestUri = $_SERVER['REQUEST_URI'];

$config = new Config();

$db = $config->returnConfig('database');

$connection = new Connection($db);

if ( strpos($requestUri, '/' ) === 0 ) {
    $pagesController = new PagesController($connection);
    $pagesController->renderIndex();

}elseif ( strpos($requestUri, '/orders') === 0){
    $pagesController = new PagesController($connection);
    $pagesController->showOrdersPage();
}

else {
    $pagesController = new PagesController($connection);
    $pagesController->renderIndex();
}






