<?php

    class DefaultController{
        public function act(){
            echo PHPTemplate::view("application/core/Templates/404.php", ['header'=>'Error 404']); //
        }
    }
