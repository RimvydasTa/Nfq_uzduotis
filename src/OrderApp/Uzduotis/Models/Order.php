<?php
namespace OrderApp\Uzduotis\Models;


class Order
{

    //Db order data
    private $first_name;
    private $last_name;
    private $email;
    private $phone;
    private $address;
    private $quantity;

    //url param data
    public $searchString;
    public $sortBy;
    public $sort;
    public $page;
    public $perPage = 10;


    //Strips tags and assigns subbmited data to variables
    public function assignData($orderArr){


        $this->first_name = strip_tags($orderArr['name']);
        $this->last_name = strip_tags($orderArr['lname']);
        $this->email = strip_tags($orderArr['email']);
        $this->address = strip_tags($orderArr['address']);
        $this->phone = strip_tags($orderArr['phone']);
        $this->quantity = strip_tags($orderArr['quantity']);
    }
    public function insertOrder($orderArr, $pdo)
    {
        $this->assignData($orderArr);
        $statement = $pdo->getPdo()->prepare("insert into orders( first_name, last_name,email,address, quantity, phone, date) 
      values ( 
            '$this->first_name', 
            '$this->last_name',
            '$this->email',
            '$this->address',
            '$this->quantity',
            '$this->phone',
            now()
            )");

        if ($statement->execute()){
           return true;
        }else {
            die("Error order insert failed. Check db");
        }
    }

    public function fetchOrders($pdo)
    {

        $this->sortBy = $_GET['sortBy'] ?? 'id';
        $this->sort = $_GET['sort'] ?? 'ASC';
        $this->page = $_GET['page'] ?? 1;

        //How many results show per page
        $this->perPage = 10;
        //Calc page start
        $start = $this->page > 1 ? ($this->page * $this->perPage) - $this->perPage : 0;


        if (isset($_POST['searchString'])){

            $this->searchString = $_POST['searchString'];

            $statement = $pdo->getPdo()->prepare("select SQL_CALC_FOUND_ROWS * from orders where 

              first_name LIKE '%{$this->searchString}%' OR
              last_name LIKE '%{$this->searchString}%' OR
              email LIKE '%{$this->searchString}%' OR
              address LIKE '%{$this->searchString}%' OR
              quantity LIKE '%{$this->searchString}%' OR
              phone LIKE '%{$this->searchString}%'
               ORDER BY '{$this->sortBy} {$this->sort}'  
                  LIMIT {$start}, {$this->perPage}          
          ");



            if ($statement->execute()){
                $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

                //calculate returned rows
                $total = $pdo->getPdo()->query("select FOUND_ROWS() as total")->fetch()['total'];

                //Calculate how many pagination pages
                $pages = ceil($total / $this->perPage);
                session_start();
                //Pass to session for use in view
                $_SESSION['pages'] = $pages;

                //Return fetched orders
                return $results;

            }else {
                die("Error order insert failed. Check db");
            }
        }

                $statement = $pdo->getPdo()->prepare("select SQL_CALC_FOUND_ROWS * from orders 
                ORDER BY  {$this->sortBy} {$this->sort} 
                LIMIT {$start}, {$this->perPage}");

            if ($statement->execute()){

                $results = $statement->fetchAll(\PDO::FETCH_ASSOC);
                $total = $pdo->getPdo()->query("select FOUND_ROWS() as total")->fetch()['total'];
                $pages = ceil($total / $this->perPage);

                session_start();
                $_SESSION['pages'] = $pages;

                return $results;
            }else {
                die("Error order insert failed. Check db");
            }

    }

}