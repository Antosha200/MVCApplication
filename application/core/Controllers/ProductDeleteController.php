<?php

    class ProductDeleteController{
        public function act(){
            echo "ProductDeleteController";
            if (count ($_POST['SKU'])){
                $model = Model::getInstance();
                $model->deleteProducts($_POST['SKU']);
            }
            $productListController = new ProductListController();
            $productListController->act();
        }
    }
