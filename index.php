<?php
/**
 * Created by PhpStorm.
 * User: rimvydas
 * Date: 18.9.11
 * Time: 20.06
 */

$database = require 'core/bootstrap.php';

$tasks = $database->selectAll('orders');

require 'views/index.view.php';