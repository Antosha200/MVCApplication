<?php
    class Book extends Model{

        public $Weight;

        private function __construct(){
            $this->url = $_SERVER['REQUEST_URI'];
            $this->httpMethodType = $_SERVER["REQUEST_METHOD"];
            $this->name = $_POST['name'];
            $this->SKU = $_POST['SKU'];
            $this->Price = $_POST['Price'];
            $this->Weight = $_POST['Weight'];
        }

        public function addProduct()
        {
            if (isset($SKU) && isset($name) && isset($Price) && isset($Category) && isset($Weight)){
                $sqlQuery = $this->connect();
                $sqlQuery ->query("INSERT INTO `products` (`SKU`, `Name`, `Price`, `Size`, `Weight`, `Height`, `Width`, `Length`, `Category`) VALUES ('$SKU', '$name', '$Price', NULL , '$Weight', NULL, NULL, NULL, '$Category');");
            }
        }

        public function updateProduct()
        {
            // TODO: Implement updateProduct() method.
        }
    }
