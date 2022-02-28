<?php
    class ProductFormController{
        public function act(){
            echo "ProductFormController";
            echo PHPTemplate::view("application/core/Templates/FormPage.php", ['title'=>'Product Add']);
        }
    }
