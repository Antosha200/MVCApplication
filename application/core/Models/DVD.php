<?php
    class DVD extends Model{

        public $Size;

        private function __construct(){
            $this->url = $_SERVER['REQUEST_URI'];
            $this->httpMethodType = $_SERVER["REQUEST_METHOD"];
            $this->name = $_POST['name'];
            $this->SKU = $_POST['SKU'];
            $this->Price = $_POST['Price'];
            $this->Size = $_POST['Size'];
        }

        public function addProduct()
        {
            if (isset($SKU) && isset($name) && isset($Price) && isset($Category) && isset($Size)){
                $sqlQuery = $this->connect();
                $sqlQuery ->query("INSERT INTO `products` (`SKU`, `Name`, `Price`, `Size`, `Weight`, `Height`, `Width`, `Length`, `Category`) VALUES ('$SKU', '$name', '$Price', '$Size' , NULL , NULL, NULL, NULL, '$Category');");
            }
        }

        public function updateProduct()
        {
            // TODO: Implement updateProduct() method.
        }
    }