<?php

namespace App\Models\CatalogueCard;

require_once 'app/src/Models/Database.php';
require_once 'app/src/Models/Product.php';

use App\Models\Product\Product;
use Application\Models\Database\Database;

class CatalogueCard extends Database
{
    public static function getAll(): bool|array
    {
       $products = (new Product)->getAll();
        return self::tableCard($products);
    }

    public static function tableCard(bool|array $products): array
    {
        $cards = [];
        foreach ($products as $product) {
            $card = [
                'id' => $product['id'],
                'title' => $product['title'],
                'price' => $product['price'],
                'description' => $product['description'],
                'category' => $product['cat'],
            ];
            $cards[] = $card;
        }
        return self::formatHTML($cards);
    }

    private static function formatHTML(array $cards): array
    {
        $html = "";
        $stack = [];
        $endpoint = 0;
        foreach ($cards as $card) {
            $html .= '<div class="card p-3" style="width: 18rem;">';
            $html .= '  <div class="card-body">';
            $html .= '    <h5 class="card-title">' . $card['title'] . '</h5>';
            $html .= '    <p class="card-text">' . substr( $card['description'], 0,100) . '...</p>';
            $html .= '    <p class="card-text">Price: $' . $card['price'] . '</p>';
            $html .= '  </div>';
            $html .= '</div>';
            $stack[] = $html;
            $endpoint++;
        }
        return [$stack[$endpoint - 1]];
    }

}