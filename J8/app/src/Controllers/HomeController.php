<?php

namespace App\Controllers\HomeController;

require_once 'FrontController.php';

use App\Controllers\FrontController\FrontController;
use App\Models\Database\Database;

class HomeController extends FrontController
{

    public function showHome($params)
    {
        self::render('Homepage', $params);
    }
}
