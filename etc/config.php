<?php
/**
 * Created by PhpStorm.
 * User: rimvydas
 * Date: 18.9.11
 * Time: 20.46
 */

return [
  'database' => [
      'name' => 'orders',
      'username' => 'root',
      'password' => 'root',
      'connection' => 'mysql:host=localhost',
      'options' => [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      ]
  ]
];