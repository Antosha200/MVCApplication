<?php

     class DVD extends Model{

        public $size;

        public function __construct(){
            parent::__construct();
            $this->size = $_POST['Size'];
        }
         public function getSize()
         {
             return $this->size;
         }
    }