<?php
/**
 * Created by PhpStorm.
 * User: rimvydas
 * Date: 18.9.11
 * Time: 20.06
 */



require '../vendor/autoload.php';

use Plaktukas\Core\Connection;

$config = new \Plaktukas\Core\Config();

$db = $config->returnString('database');

$connection = new Connection($db);

$indexController = new \Plaktukas\Uzduotis\Controllers\IndexController($connection);

$indexController->renderIndex();
// $home = new HomeController();

// $home->renderIndex();

