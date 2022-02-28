<?php
 class ProductListController{
     public function act(){
        echo "ProductListController";

        $model = Model::getInstance();
        $products = $model->getProducts();
        echo PHPTemplate::view("application/core/Templates/ProductsList.php", ['products'=>$products, 'title' => 'Product List']);
     }
 }