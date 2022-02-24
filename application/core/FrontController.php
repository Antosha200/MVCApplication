<?php
    //require "Controllers/DefaultController.php";
    require "Controllers/ProductListController.php";
    require "Controllers/ProductAddController.php";
    require "Controllers/ProductFormController.php";
    require "Controllers/ProductDeleteController.php";

    class FrontController
    {
        public $url;
        public $httpMethodType;
        public $name;

        private function __construct()
        {
            $this->url = $_SERVER['REQUEST_URI'];
            $this->httpMethodType = $_SERVER["REQUEST_METHOD"];
            $this->name = $_POST['name'];
        }

        public static function getInstance()
        {
            static $instance;
            if (!isset($instance)) $instance = new self;
            return $instance;
        }

        public function makeRoute()
        {
            /*
                                    GET                 ->> product list page
                /add product        GET                 ->> add product form page
                /                   POST sku,name,price ->> add product to database, show product list page
                /                   POST []sku          ->> delete products from database, show product list
                /404                GET,POST            ->> 404 page
             */

            if ($this->url === '/' && $this->httpMethodType === 'GET') { //show
                $ProductListController = new ProductListController();
                $ProductListController->act();
            } else {
                if ($this->url === '/addProduct' && $this->httpMethodType === 'GET') { //form page
                    $ProductFormController = new ProductFormController();
                    $ProductFormController->act();
                } else {
                    if ($this->url === '/' && $this->httpMethodType === 'POST' && isset($_POST['sku']) && isset($_POST['price']) && isset($_POST['name'])) { //add product to database, show product list//
                        $ProductAddController = new ProductAddController();
                        $ProductAddController->act();
                    } else {
                        if ($this->url === '/' && $this->httpMethodType === 'POST' && isset($_POST['sku'])) { //delete products from database, show product list// регистр проверить
                            $ProductDeleteController = new ProductDeleteController();
                            $ProductDeleteController->act();
                        } else {
                            (new DefaultController)->act(); //404 page
                        }
                    }
                }
            }
        }
    }
