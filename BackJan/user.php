<?php


require_once('database.php');
require_once('UserModel.php');

// representation of the data related to a user.
// User class
class User extends Database
{
    public function emailAlreadyExists($email): array
    {
        $pdo = Database::connect();
        return (new UserModel())->checkEmailExists($pdo, $email);
    }

    public function save($name, $email, $password)
    {
        $pdo = Database::connect();
        (new UserModel())->insert($pdo, $name, $email, $password);
    }

    public function passwordCheck($email, $password): bool|array
    {
        $pdo = Database::connect();
        return (new UserModel())->passwordCheck($pdo, $email, $password);
    }

}