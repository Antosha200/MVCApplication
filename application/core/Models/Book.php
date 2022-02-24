<?php
    class Book extends Product{

        public $weight;

        private function __construct(){
            $this->url = $_SERVER['REQUEST_URI'];
            $this->httpMethodType = $_SERVER["REQUEST_METHOD"];
            $this->name = $_POST['name'];
            $this->SKU = $_POST['SKU'];
            $this->price = $_POST['price'];
            $this->weight = $_POST['weight'];
            $this->category = $_POST['category'];
        }

        public function getSKU()
        {
            return $this->SKU;
        }

        public function getCategory()
        {
            return $this->category;
        }

        public function getHttpMethodType()
        {
            return $this->httpMethodType;
        }

        public function getName()
        {
            return $this->name;
        }

        public function getPrice()
        {
            return $this->price;
        }

        public function getUrl()
        {
            return $this->url;
        }

        public function getWeight()
        {
            return $this->weight;
        }

        public static function getInstance()
        {
            static $instance;
            if (!isset($instance)) $instance = new self;
            return $instance;
        }
    }
