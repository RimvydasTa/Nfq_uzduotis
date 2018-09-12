<?php

namespace OrderApp\Uzduotis\Controllers;
use OrderApp\Core\Connection;
use OrderApp\Core\Kernel;

class IndexController {
    /**
     * @var Connection
     */
    private $connection;

    public function __construct(Connection $connection){
        $this->connection = $connection;
    }
    public function renderIndex(){
      $this->connection->getPdo();
      include Kernel::getViewsDir() . "index.view.php";
    }
}
