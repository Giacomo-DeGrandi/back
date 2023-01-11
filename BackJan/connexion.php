<?php

session_start();

require_once('form_controller.php');

if(isset($_SESSION['user_connected'])){
    header('location:dashboard.php');
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <!-- CSS only -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" >

    <title>Sign IN</title>
</head>
<body>


<div class="container-fluid">
    <div class="row flex-wrap">
        <div  class="col p-4 me-5">
            <form class="p-4 " method="POST" id="formSignin">
                <p class="p-2 h1 mb-4 ">Sign In</p>

                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="email" id="emailIn" name="emailIn" class="form-control" />
                    <label class="form-label" for="email">Email address</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="password" id="passwordIn" name="passwordIn" class="form-control" />
                    <label class="form-label" for="password">Password</label>
                </div>

                <!-- Submit button -->
                <div class="p-4">
                    <button type="submit" class="btn btn-outline-dark mb-4" name="signin" id="signin">Sign In</button>
                </div>

                <div class="h4 text-warning">
                    <?php
                    if(isset($error)){
                        echo $error;
                    }
                    ?>
                </div>

                <!-- Register buttons -->
                <div class="text-center">
                    <p>Not a member? <a href="inscription.php" class="text-danger">Register</a></p>
                </div>

            </form>
        </div>
    </div>
</div>

</body>
</html>

// Sur cette page, on pourra se connecter

/* On a un formulaire :
    - Contient :
        - Email
        - Mot de passe
*/

/* Quand quelqu'un nous transmet le formulaire :
    - On regarde si l'email existe
        - Si oui, on continue
        - Sinon, on arrête
            - On dit à l'utilisateur pourquoi
*/

/* Si l'utilisateur est bien inscrit :
    - On regarde si le mot de passe est valide
        - Si oui, l'utilisateur est connecté
            - Comment ?
                - $_SESSION['membre_connecte'] = true;
                - Redirige l'utilisateur vers la page index.php
                    - Fonction header("Location: ma_page.php");
        - Sinon, on refuse la connexion
            - $motdepasseIncorrect = true;
            - On dit à l'utilisateur pourquoi

*/
?>