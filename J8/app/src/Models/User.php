<?php

namespace App\Controllers\UserController;

require_once 'FrontController.php';

use Application\Models\Database\Database;

Class UserController extends Database
{
    public static function signupUser()
    {
        $stmt = Database::connect()->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

    }

    public static function signinUser()
    {

    }
}