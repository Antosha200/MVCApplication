<?php

    class Model
    {
        public $name;
        public $SKU;
        public $price;

        public function __construct(){
            $this->name = $_POST['Name'];
            $this->SKU = $_POST['SKU'];
            $this->price = $_POST['Price'];
        }

        private static function connect()
        {   // connect to database
            return new mysqli("localhost", "mysql", "mysql", "products");
        }

        public static function addProduct(Model $product)
        {
            $sqlQuery = self::connect();

            $category = get_class($product);
            $optionalParams = ['Size', 'Weight', 'Length', 'Width', 'Height'];
            $params = [];

            foreach ($optionalParams as $property => $value) {
                $methodName = 'get' . ucfirst($property);
                if (method_exists($product, $methodName)) {
                    $params[$property] = $product->$methodName();
                }
            }

            foreach ($optionalParams as $value) {
                if (!isset($params[$value])) {
                    $params[$value] = 'NULL';
                }
            }

            $price = $product->getPrice();////

            $query = "INSERT INTO `products`(`SKU`, `Name`, `Price`, `Size`, `Weight`, `Height`, `Width`, `Length`, `Category`)
            VALUES(
                   '{$product -> getSKU() }',
                   '{$product -> getName()}',
                   '$price',////
                   '{$params['Size']}',
                   '{$params['Weight']}',
                   '{$params['Length']}',
                   '{$params['Width']}',
                   '{$params['Height']}',
                   '{$category}'
            ) ";

            $sqlQuery->query($query);
        }

        public static function getProducts()
        { //на выходе тоже объект - результат запроса - теперь его нужно обработать в контроллере - "достать" значения
            $sqlQuery = self::connect();
            $sql = "SELECT * FROM `products` ";
            if ($queryResult = $sqlQuery->query($sql)) {
                return mysqli_fetch_all($queryResult, MYSQLI_ASSOC); // в идеале отсюда вернуть массив
            }
        }

        public function deleteProducts($SKUArray)
        {
            // $SKUArray = $_POST['sku']
            $sqlQuery = $this->connect();
            if (count($SKUArray)){
                $toString = "'".implode("','", $SKUArray)."'";
                echo $toString;
                $sqlQuery->query("DELETE FROM 'products' WHERE 'SKU' IN ({$toString})");
            }
        }

        public static function getInstance()
        {
            static $instance;
            if (!isset($instance)) $instance = new self;
            return $instance;
        }

        public function getName()
        {
            return $this->name;
        }
        public function getSKU()
        {
            return $this->SKU;
        }
        public function getPrice()
        {
            return $this->price;
        }

    }
