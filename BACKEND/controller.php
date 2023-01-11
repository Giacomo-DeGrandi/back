<?php

// Include the Card and CardModel classes
require_once 'models/cardModel.php';
require_once 'models/card_model.php';


    // Connect to the database
    $pdo = Db::connect();

// Retrieve all the cards from the database
    $cardModel = new CardModel();


    if(isset($_POST['title'], $_POST['price'], $_POST['description'], $_POST['add'])){

        $card = new Card();
        $card->save($_POST['title'], $_POST['price'], $_POST['description']);
        $results = $cardModel->getAll($pdo);
// Create an array of Card objects
        $cards = [];


        foreach($results as $res){
            $cards[] = [$res['title'], $res['price'], $res['description']];
        }

        require_once ('view/view.php');

    } else {


        $results = $cardModel->getAll($pdo);

// Create an array of Card objects
        $cards = [];


        foreach($results as $res){
            $cards[] = [$res['title'], $res['price'], $res['description']];
        }

    }




