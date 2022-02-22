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

        public function addProduct() //проверки и валидация в контроллере -> все; передается объект
        {
            if (isset($_POST['Sku']) && isset($name) && isset($Price) && isset($Category) && isset($Weight)){ //isset - подправить уже в контролеере.
                $sqlQuery = $this->connect();
                $sqlQuery ->query("INSERT INTO `products` (`SKU`, `Name`, `Price`, `Size`, `Weight`, `Height`, `Width`, `Length`, `Category`) VALUES ('$SKU', '$name', '$Price', NULL , '$Weight', NULL, NULL, NULL, '$Category');");
            }
        }
    }
