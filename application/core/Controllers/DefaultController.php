<?php
    class DefaultController{
        public function act(){
            //избегать перенаправлений по возмможности
            echo PHPTemplate::view("application/core/Views/404.php", ['header'=>'Error 404', 'anotherKey'=>'Another Value']); //
            //echo "DefaultController";
        }
    }
