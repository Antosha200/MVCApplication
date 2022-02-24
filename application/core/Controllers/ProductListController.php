<?php
 class ProductListController{
     public function act(){
        echo "ProductListController";
        $List = Product::getProducts();
        // через цикл достаём и показываем
     }
 }