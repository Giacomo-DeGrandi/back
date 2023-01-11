<?php

namespace App\Controllers\SignupController;

require_once 'FrontController.php';
require_once 'ErrorController.php';

use App\Controllers\ErrorController\ErrorController;
use App\Controllers\FrontController\FrontController;


Class SignupController extends FrontController
{
    public static function renderSignup()
    {
        FrontController::render('Signup', null);
    }

    public static function signupUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $subscribe = $_POST['subscribe'] ?? null;
            $errors = new ErrorController();

            // validate name
            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                $errors[] = "Only letters and white space allowed in name";
            }
            if (strlen($name) < 3) {
                $errors[] = "Name must be at least 3 characters long";
            }

            // validate email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid email format";
            }

            // validate password
            if (strlen($password) < 8) {
                $errors[] = "Password must be at least 8 characters long";
            }
            if (!preg_match("#[0-9]+#", $password)) {
                $errors[] = "Password must include at least one number";
            }
            if (!preg_match("#[a-zA-Z]+#", $password)) {
                $errors[] = "Password must include at least one letter";
            }
            // if there's no error
            if(empty($errors)) {
                // process form
                // ...
            } else {
                ErrorController::renderError($errors);
            }
        }

    }


}