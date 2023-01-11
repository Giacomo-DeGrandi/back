<?php

/*
 * The getAll() method is defined in the Card class because it is responsible for creating Card objects from the data retrieved from the database.

In general, it is common to define database-related methods (such as insert(), update(), delete(), and getAll()) in a separate class called the "Model" class. This is because the Model class is responsible for interacting with the database and performing business logic, and these methods are typically related to database operations.

However, it is also possible to define these methods directly in the Card class, especially if the Card class is a simple class with only a few properties and methods. In this case, the Card class could be considered both the Model and the Domain Model (a term used in the MVC pattern to refer to the class that represents the data being manipulated).

Ultimately, the choice of where to define these methods depends on the needs of your specific application and how you want to organize your code. It is important to consider the separation of concerns and the Single Responsibility Principle when designing your classes.
 */


require_once('card_model.php');
require_once('db_model.php');


// representation of business logic related to a card
class CardModel extends Db {
    // Method to insert a card into the database
    public function insert($pdo, $title, $price, $description) {
        $stmt = $pdo->prepare("INSERT INTO cards (title, price, description) VALUES ( ?, ?, ?)");
        $stmt->bindParam(1, $title, PDO::PARAM_STR);
        $stmt->bindParam(2, $price, PDO::PARAM_STR);
        $stmt->bindParam(3, $description, PDO::PARAM_STR);
        $stmt->execute();
    }

    // Method to retrieve all cards from the database
    public static function getAll(PDO $pdo) {
        $stmt = $pdo->prepare("SELECT * FROM cards");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
