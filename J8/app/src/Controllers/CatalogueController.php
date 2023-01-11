<?php

namespace App\Controllers\CatalogueController;

require_once 'FrontController.php';
require_once 'app/src/Models/Database.php';
require_once 'app/src/Models/Catalogue.php';

use App\Controllers\FrontController\FrontController;
use App\Models\CatalogueModel\CatalogueModel;

class CatalogueController
{
    public static function renderCatalogue()
    {
        $catalogue = CatalogueModel::getAll();
        FrontController::render('Catalogue', $catalogue);
    }
}