<?php

require_once('cardModel.php');
require_once('db_model.php');

// representation of the data related to a card.
// Card class
class Card extends Db {

    // Method to save the card to the database
    private $title;
    private $price;
    private $description;

    public function save($title,$price,$description) {
        $pdo = Db::connect();
        $cardModel = new CardModel();
        $cardModel->insert($pdo, $title, $price, $description);
    }

    public function show_cards($cards) {
        $html = "";
        foreach ($cards as $card) {
            $html .= '<div class="card p-3" style="width: 18rem;">';
            $html .= '  <div class="card-body">';
            $html .= '    <h5 class="card-title">' . $card[0] . '</h5>';
            $html .= '    <p class="card-text">' . $card[2] . '</p>';
            $html .= '    <p class="card-text">Price: $' . $card[1] . '</p>';
            $html .= '  </div>';
            $html .= '</div>';
        }
        return $html;
    }


}
