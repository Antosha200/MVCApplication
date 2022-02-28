<?php
    require "Controllers/DefaultController.php";

    class Model
    {
        public $name;
        public $SKU;
        public $price;

        public function __construct(){
            $this->name = $_POST['name'];
            $this->SKU = $_POST['sku'];
            $this->price = $_POST['price'];
        }

        private static function connect()
        {   // connect to database
            return new mysqli("localhost", "mysql", "mysql", "products");
        }

        public static function addProduct(Model $product)
        {
            $sqlQuery = self::connect();

            $category = get_class($product);
            $optionalParams = ['size', 'weight', 'length', 'width', 'height'];
            $params = [];

            foreach ($optionalParams as $property => $value){
                $methodName = 'get'.ucfirst($property);
                if (method_exists($product, $methodName)) {
                    $params[$property] = $product->$methodName();
                }
            }

            foreach ($optionalParams as $value){
                if (!isset($params[$value])){
                    $params[$value] = 'NULL';
                }
            }

            $query = "INSERT INTO `products`(`SKU`, `Name`, `Price`, `Size`, `Weight`, `Height`, `Width`, `Length`, `Category`)
            VALUES(
                   '{$product -> getSKU() }',
                   '{$product -> getName()}',
                   $product-> getPrice(),
                   '{$params['size']}',
                   '{$params['weight']}',
                   '{$params['length']}',
                   '{$params['width']}',
                   '{$params['height']}',
                   '{$category}'
            ) ";

            $sqlQuery->query($query);


        }

        public static function getProducts()
        { //на выходе тоже объект - результат запроса - теперь его нужно обработать в контроллере - "достать" значения
            $sqlQuery = self::connect();
            $sql = "SELECT * FROM `products` ";
            if ($queryResult = $sqlQuery->query($sql)) {
                return $queryResult->fetch_all(); // в идеале отсюда вернуть массив
            }
        }

        public function deleteProducts($SKUArray)
        { // WHERE Sku IN - регистр чекнуть. //принимает массив //удаляем через foreach
            // $SKUArray = $_POST['sku']
            $sqlQuery = $this->connect();
            if (count($SKUArray)){
                $toString = "'".implode("','", $SKUArray)."'";
                $sqlQuery->query("DELETE FROM 'product' WHERE 'sku' IN ({$toString})");
            }
        }

        public static function getInstance()
        {
            static $instance;
            if (!isset($instance)) $instance = new self;
            return $instance;
        }
    }
