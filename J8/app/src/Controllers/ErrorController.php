<?php

namespace App\Controllers\ErrorController;

require_once 'FrontController.php';

use App\Controllers\FrontController\FrontController;

class ErrorController extends FrontController
{
    public static function renderError($errors)
    {
        FrontController::inj(self::collectErrors($errors));
    }

    public static function collectErrors($error)
    {
        return array_push($error);
    }
    /*
    public static function render404()
    {
        FrontController::render('404', null);
    }*/


}