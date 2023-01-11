<?php

namespace App\Controllers\FrontController;


Class FrontController
{
    public static function render($title,$html)
    {

        require_once 'Templates/Header.php';
        require_once 'Templates/Footer.php';

        // $content variable is used in Layout.php as Header and Footer
        require_once 'assets/Views/' . $title . '.php';

        $errors = self::inj($html);
        // keep the Layout under the others

        require_once 'Templates/Layout.php';

    }

    public static function inj($collectErrors)
    {
        if(isset($collectErrors)){
            return $collectErrors;
        }
        return false;
    }


}
