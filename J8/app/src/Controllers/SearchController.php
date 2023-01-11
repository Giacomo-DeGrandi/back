<?php

namespace App\Controllers\SearchController;

require_once 'FrontController.php';
require_once 'app\src\Models\Search.php';

use App\Controllers\FrontController\FrontController;
use App\Models\Search\Search;


Class SearchController extends FrontController
{
    public static function renderSearch()
    {
        $search = Search::search();
        FrontController::render('Catalogue', $search);
    }
}