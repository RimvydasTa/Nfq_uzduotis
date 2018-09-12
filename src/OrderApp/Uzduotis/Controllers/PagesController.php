<?php

namespace OrderApp\Uzduotis\Controllers;
use OrderApp\Core\Connection;
use OrderApp\Core\Kernel;

class PagesController {
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

    public function showOrdersPage()
    {
        $this->connection->getPdo();
        include Kernel::getViewsDir() . "orders.view.php";

    }
}
