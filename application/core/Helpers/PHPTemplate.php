<?php

    class PHPTemplate
    {
        private static $template;
        private static $input;
        public static function view($template, $input = array())
        {
            self::$template = $template;
            self::$input = $input;
            unset($template, $input);

            ob_start();
            try {
                extract(self::$input);
                require(self::$template);
            } catch (Exception $e) {
                ob_end_clean();
                throw $e;
            }
            return ob_get_clean();
        }
    }