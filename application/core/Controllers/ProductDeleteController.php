<?php
    class ProductDeleteController{
        public function act(){
            echo "ProductDeleteController";
            if (count ($_POST['sku'])){
                $model = Model::getInstance();
                $model->deleteProducts($_POST['sku']);
            }
        }
    }
