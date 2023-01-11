<?php

namespace App\Models\CatalogueModel;

require_once 'app/src/Models/Database.php';
require_once 'app/src/Models/CatalogueCard.php';

use App\Models\CatalogueCard\CatalogueCard;
use Application\Models\Database\Database;

class  CatalogueModel extends Database
{
    public static function getAll(): bool|array
    {
        return CatalogueCard::getAll();
    }
}
