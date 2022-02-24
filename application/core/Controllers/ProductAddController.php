<?php
require "application/core/Models/DVD.php";
 class ProductAddController{
     public function act(){
         echo "ProductAddController";
         if (isset($_POST['sku']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['category']) && isset($_POST['weight'])){
             // make object DVD
             $DVD = DVD::getInstance();
             Product::addProduct($DVD);
             } else {
         if (isset($_POST['sku']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['category']) && isset($_POST['size'])){
             $Book = Book::getInstance();
             Product::addProduct($Book);
             // make object book
             } else{
         if (isset($_POST['sku']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['category']) && isset($_POST['height']) && isset($_POST['width']) && isset($_POST['length'])){
             $Furniture = Furniture::getInstance();
             Product::addProduct($Furniture);
             // make object furniture
             } else{
             (new DefaultController)->act();
         }
         }
         }
     }
 }

