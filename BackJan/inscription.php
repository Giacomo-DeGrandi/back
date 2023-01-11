<?php

session_start();

require_once('form_controller.php');

if(isset($_SESSION['user_connected'])){
    header('location:index.php');
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

    <title>Sign UP</title>
</head>
<body>


<div class="container-fluid">
    <div class="row flex-wrap">
        <div  class="p-4 me-5">
            <form class="p-4" id="formSignup" action="" method="POST">
                <p class="p-2 h1 mb-4 darkgray-font">Subscribe</p>

                <div class="row mb-2">
                    <p class="h4 darkgray-font">Details</p>

                    <!-- Firstname input -->
                    <div>
                        <input class="form-control" id="name" name="name" type="text">
                        <label class="form-label" for="firstname">First Name</label><br>
                    </div>

                <hr>
                <p class="h4 darkgray-font">Account</p>

                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="email" id="email" name="email" class="form-control" />
                    <label class="form-label" for="email">Email address</label><br>
                    <small></small>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="password" id="password" name="password" class="form-control" />
                    <label class="form-label" for="password">Password</label><br>
                    <small></small>
                </div>

                <!-- DOB -->
                <div class="row text-start">
                    <!-- Terms -->
                    <div class="d-flex flex-column text-start text-nowrap">
                        <div class="row w-75">
                            <p class="small h6">I've read and I accept<br><a href="TERMS.md" class=" p-2">all the Terms</a>
                                <input type="checkbox" class="p-2 border border-0 " name="terms" id="termsBox">
                                <label for="terms" class="py-1">Terms</label><br>
                                <br><small></small>
                            </p>
                        </div>
                    </div>
                </div>

                    <div class="h4 text-warning">
                        <?php
                        if(isset($error)){
                            echo $error;
                        }
                        ?>
                    </div>



                <!-- Submit button -->
                <div class="p-4">
                    <button type="submit" class="btn btn-outline-dark mb-4" name="subscribe" id="subscribe">Subscribe</button>
                </div>

                <!-- Register buttons -->
                <div class="text-center">
                    <p>Already a member? <a href="connexion.php" class="text-danger">Sign in</a></p>
                </div>


            </form>
        </div>
    </div>
</div>

</body>
</html>
// Sur cette page, on pourra créer un compte

/* On doit créer un formulaire

Ce formulaire a plusieurs inputs :

    - l'email de l'utilisateur
    - le nom (facultatif)
    - le mot de passe
*/

/* Une fois le formulaire créé :

    - On transmet les informations à la base de données
    - On regarde si l'email n'est pas déjà inscrit
        - Comment on peut regarder si l'email n'est pas déjà inscrit ?
            - Sélectionner tous les utilisateurs de la BDD qui ont comme
            email celui transmit par le formulaire
            - On regarde le résultat
                - Si le résultat est égal à 0, on autorise l'inscription
                - Sinon, on la refuse
                    - On dit  l'utilisateur pourquoi
    - On regarde si le mot de passe fait bien entre 8 et 12 caractères
        - Si oui, on autorise l'inscription
        - Sinon, on la refuse
            - On dit à l'utilisateur pourquoi
*/

/* Si les informations sont toutes valides, on inscrit l'utilisateur
    - Requête INSERT
    - On lui dit qu'il peut se connecter
*/
?>