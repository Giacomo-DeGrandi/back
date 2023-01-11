<?php

require_once('database.php');
require_once('user.php');

// Representation of business logic related to a User
// UserModel Class
class UserModel extends Database {

    // Method to check email existence
    public function checkEmailExists(PDO $pdo, $email): array
    {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function insert($pdo, $name, $email, $password) {
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES ( ?, ?, ?)");
        $stmt->bindParam(1, $name, PDO::PARAM_STR);
        $stmt->bindParam(2, $email, PDO::PARAM_STR);
        $stmt->bindParam(3, $password, PDO::PARAM_STR);
        $stmt->execute();
    }

    // Method to retrieve one User by it's ID
    public static function getUserByID(PDO $pdo, $id): bool|array
    {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id ");
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function passwordCheck(PDO $pdo, mixed $email, mixed $password): bool|array
    {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email AND password = :password ");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}
