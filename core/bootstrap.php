<?php
/**
 * Created by PhpStorm.
 * User: rimvydas
 * Date: 18.9.11
 * Time: 20.51
 */
$config = require 'config.php';
require 'database/Connection.php';
require 'database/QueryBuilder.php';

return new QueryBuilder(Connection::make($config['database']));