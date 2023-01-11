<?php


require_once('database.php');
require_once('user.php');
require_once('userModel.php');

$error = '';

foreach ($_POST as $key => $value) {
    $_POST[$key] = htmlspecialchars((string)$value, ENT_NOQUOTES | ENT_HTML5 | ENT_SUBSTITUTE,
        'UTF-8', /*double_encode*/false );
}

// filter every $_POST and $_GET of user input with this controller

$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_FULL_SPECIAL_CHARS);



if(isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['terms'])&&isset($_POST['subscribe'])){

    if(!empty($_POST['name'])&&!empty($_POST['email'])&&!empty($_POST['password'])) {

        if (empty((new User)->emailAlreadyExists($_POST['email']))) {

            if (strlen($_POST['password']) >= 8 && strlen($_POST['password']) <= 12) {

                (new User)->save($_POST['name'], $_POST['email'], $_POST['password']);
                header('location:connexion.php');

            } else {

                $error = 'Your password have to be between 8 and 12 characters';
            }

        } else {

            $error = 'This email is already in use, please use another one';
        }

    } else {

        $error = 'Fields can\'t be empties';

    }

} else {

    $error = 'Please fill up the form to subscribe';
}


if (isset($_POST['emailIn']) && isset($_POST['passwordIn']) && isset($_POST['signin'])) {

    if (!empty((new User)->emailAlreadyExists($_POST['emailIn']))) {

       if(!empty((new User)->passwordCheck($_POST['emailIn'],$_POST['passwordIn']))){

           $_SESSION['user_connected'] = $_POST['emailIn'];

           header('location:dashboard.php');

       } else {

           $error = 'The password is incorrect';

       }

   } else {

       $error = 'This email doesn\'t exists';
   }

}

// LOGOUT

if (isset($_POST['logout'])) {

    echo 'logout';
    session_destroy();
    header('location:connexion.php');

}

