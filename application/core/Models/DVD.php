<?php
     class DVD extends Model{

        public $size;

        public function __construct(){
            parent::__construct();
            $this->size = $_POST['size'];
        }
         public function getSize()
         {
             return $this->size;
         }

    }