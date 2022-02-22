<?php
    require "Controllers/DefaultController.php";
    abstract class Model{

        public $url;
        public $httpMethodType;
        public $name;
        public $SKU;
        public $Price;

        protected function connect(){
            $mysqli =  new mysqli("localhost","mysql","mysql","products");
            if($mysqli->connect_error){
                (new DefaultController)->act();
            }else return $mysqli;
        }

        abstract public function addProduct (); // creating object for every category of product
        public function getProducts(){
            $sqlQuery = $this->connect();
            $sql="SELECT * FROM `products` ";
            if ($result = $sqlQuery->query($sql)){
                return $result;
            }else (new DefaultController)->act();
        } // returned set of String -> iterate with a loop in controller
        public function deleteProducts(){ // что будет в SQL запросе?
            $sqlQuery = $this->connect();
        }

        abstract public function updateProduct(); // update для всех или для каждого?

    }
