<?php
    class Furniture extends Model{

        public $height;
        public $wight;
        public $length;

        public function __construct(){
            parent::__construct();
            $this->height = $_POST['height'];
            $this->wight = $_POST['wight'];
            $this->length = $_POST['length'];
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
