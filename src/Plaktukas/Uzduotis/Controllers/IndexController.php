<?php

namespace Plaktukas\Uzduotis\Controllers;
use Plaktukas\Core\Connection;
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
      include \Plaktukas\Core\Kernel::getViewsDir() . "index.view.php";
    }
}
