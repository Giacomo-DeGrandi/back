<?php

namespace App\Models\Search;

require_once 'app/src/Models/Database.php';
require_once 'app/src/Models/CatalogueCard.php';


use App\Models\CatalogueCard\CatalogueCard;
use Application\Models\Database\Database;

class Search extends Database
{
    public static function search(): bool|array
    {
        $search = $_GET['Search'];
        $sql = "SELECT * FROM products WHERE title LIKE '%$search%'";
        $stmt = (new Search)->connect()->prepare($sql);
        $stmt->execute();
        return self::tableCard($stmt->fetchAll());
    }

    private static function tableCard(bool|array $fetchAll): array
    {
        return (new CatalogueCard())->tableCard($fetchAll);
    }

}