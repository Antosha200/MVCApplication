<?php
require "application/core/Models/DVD.php";
 class ProductAddController{
     public function act(){
         echo "ProductAddController";

         $productType = $_POST['category'];
         $product = new $productType($_POST);
         $model = Model::getInstance();
         $model->addProduct($product);

         $products = $model->getProducts();
         echo PHPTemplate::view("application/core/Templates/ProductList.php", ['products'=>$products]);
     }
 }

