<?php
    class DefaultController{
        public function act(){
            //избегать перенаправлений по возмможности
            echo PHPTemplate::view("application/core/Templates/404.php", ['header'=>'Error 404']); //
            echo "DefaultController";
        }
    }
