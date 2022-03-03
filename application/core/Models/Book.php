<?php

    class Book extends Model{

        public $weight;

        public function __construct(){
            parent::__construct();
            $this->weight = $_POST['Weight'];
        }

        public function getWeight()
        {
            return $this->weight;
        }
    }
