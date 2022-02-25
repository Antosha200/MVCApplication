<?php
 class ProductListController{
     public function act(){
        echo "ProductListController";

        $model = Model::getInstance();
        $products = $model->getProducts();

        //достаём и показываем в template //
     }
 }