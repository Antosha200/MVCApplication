<?php
require "application/core/Models/DVD.php";
 class ProductAddController{
     public function act(){
         echo "ProductAddController";

         $productType = $_POST['Category'];
         $product = new $productType($_POST);
         $model = Model::getInstance();
         $model->addProduct($product);

         $products = $model->getProducts();
         echo PHPTemplate::view("application/core/Templates/ProductList.php", ['event' => 'New Products added', 'products'=>$products, 'title' => 'Product List']);
     }
 }

