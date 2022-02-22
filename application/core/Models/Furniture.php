<?php
    class Furniture extends Model{

        public $Height;
        public $Wight;
        public $Lenght;

        private function __construct(){
            $this->url = $_SERVER['REQUEST_URI'];
            $this->httpMethodType = $_SERVER["REQUEST_METHOD"];
            $this->name = $_POST['name'];
            $this->SKU = $_POST['SKU'];
            $this->Price = $_POST['Price'];
            $this->Height = $_POST['Height'];
            $this->Wight = $_POST['Wight'];
            $this->Lenght = $_POST['Length'];
        }

        public function addProduct()
        {
            if (isset($SKU) && isset($name) && isset($Price) && isset($Category) && isset($Height) && isset($Wight) && isset($Length)){
                $sqlQuery = $this->connect();
                $sqlQuery ->query("INSERT INTO `products` (`SKU`, `Name`, `Price`, `Size`, `Weight`, `Height`, `Width`, `Length`, `Category`) VALUES ('$SKU', '$name', '$Price', NULL , NULL , '$Height', '$Wight', '$Length', '$Category');");
            }
        }

        public function updateProduct()
        {
            // TODO: Implement updateProduct() method.
        }
    }
