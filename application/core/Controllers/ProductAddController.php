<?php

    class ProductAddController{
         public function act(){
             echo "ProductAddController";

             $productType = $_POST['Category'];

             echo "<br>".$productType."<br>";//название категории, которая пришла в $_POST//
             print_r($_POST); //

             $product = new $productType($_POST);
             $model = Model::getInstance();
             $model->addProduct($product);
             $products = $model->getProducts();

             echo PHPTemplate::view("application/core/Templates/ProductsList.php", ['event' => 'New Products added', 'products'=>$products, 'title' => 'Product List']);
         }
     }

