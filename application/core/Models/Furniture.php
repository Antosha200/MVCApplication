<?php

    class Furniture extends Model{

        public $height;
        public $wight;
        public $length;

        public function __construct(){
            parent::__construct();
            $this->height = $_POST['Height'];
            $this->wight = $_POST['Wight'];
            $this->length = $_POST['Length'];
        }

        public function getHeight()
        {
            return $this->height;
        }

        public function getWight()
        {
            return $this->wight;
        }

        public function getLength()
        {
            return $this->length;
        }

    }
