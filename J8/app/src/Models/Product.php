<?php

namespace App\Models\Product;

require_once 'app/src/Models/Database.php';

use Application\Models\Database\Database;

class Product extends Database
{
    public function getAll(): bool|array
    {
        $db = $this->connect();
        $query = $db->prepare('SELECT * FROM products');
        $query->execute();
        return $query->fetchAll();
    }

    public function getOne(int $id): bool|array
    {
        $db = Database::connect();
        $query = $db->prepare('SELECT * FROM products WHERE id = :id');
        $query->execute(['id' => $id]);
        return $query->fetch();
    }

}