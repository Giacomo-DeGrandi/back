<?php

namespace App\Controllers\SignupClientController;

require_once 'FrontController.php';

use App\Controllers\FrontController\FrontController;

Class SignupClientController extends FrontController
{
    public static function renderSignupClient()
    {
        FrontController::render('SignupClient', null);
    }

}