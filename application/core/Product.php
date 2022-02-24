<?php
    require "Controllers/DefaultController.php";
    abstract class Product
    {

        public $url;
        public $httpMethodType;
        public $name;
        public $SKU;
        public $price;
        public $category;

        private static function connect()
        {
            $mysqli = new mysqli("localhost", "mysql", "mysql", "products");
            if ($mysqli->connect_error) {
                (new DefaultController)->act();
            } else return $mysqli;
        } // connect to database

        public static function addProduct(Product $product)
        {

            $sqlQuery = self::connect();

            $sku = $product->getSKU();
            $name = $product->getName();
            $price = $product->getPrice();
            $category = $product->getCategory();

            if (method_exists($product,'getWeight')){
                $weight = $product->getWeight();
                $sqlQuery->query("INSERT INTO `products` (`SKU`, `Name`, `Price`, `Size`, `Weight`, `Height`, `Width`, `Length`, `Category`) VALUES ('$sku', '$name', '$price', NULL , '$weight', NULL, NULL, NULL, '$category');");
            } else {
                if (method_exists($product,'getSize')){
                    $size = $product->getSize();
                    $sqlQuery->query("INSERT INTO `products` (`SKU`, `Name`, `Price`, `Size`, `Weight`, `Height`, `Width`, `Length`, `Category`) VALUES ('$sku', '$name', '$price', '$size' , NULL , NULL, NULL, NULL, '$category');");
                } else {
                    if (method_exists($product, 'getLength')){
                        $height = $product->getHeight();
                        $wight = $product->getWight();
                        $length = $product->getLength();
                        $sqlQuery->query("INSERT INTO `products` (`SKU`, `Name`, `Price`, `Size`, `Weight`, `Height`, `Width`, `Length`, `Category`) VALUES ('$sku', '$name', '$price', NULL , NULL , '$height', '$wight', '$length', '$category');");
                    }
                }
            }}// creating object for every category of product

        public static function getProducts()
        { //на выходе тоже объект - результат запроса - теперь его нужно обработать в контроллере - "достать" значения
            $sqlQuery = self::connect();
            $sql = "SELECT * FROM `products` ";
            if ($result = $sqlQuery->query($sql)) {
                return $result;
            } else (new DefaultController)->act();
        }

        public function deleteProducts($SKUArray)
        { // WHERE Sku IN - регистр чекнуть. //принимает массив //удаляем через foreach
            // $SKUArray = $_POST['sku']
            $buff = 1;
            $sqlQuery = $this->connect();
            foreach ($SKUArray as $key => $value) {
                if($buff == 1)
                {
                    $SKU = "'" . $value . "'";
                    $buff = 0;
                }
                $SKU = $SKU.","."'".$value."'";
            }
            $sqlQuery->query("DELETE FROM `products` WHERE `sku` IN ({$SKU})");
        }
    }
