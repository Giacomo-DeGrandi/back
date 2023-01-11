<?php

session_start();

require_once('form_controller.php');

if(!isset($_SESSION['user_connected'])){
    header('location:connexion.php');
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

    <title>Dashboard</title>
</head>
<body>

    <div class="container p-5">
        <p class="h1 p-5">Hello User</p>
    </div>

    <div class="container-fluid">
        <div class="row flex-wrap">
            <div  class="p-4 me-5">
                <form class="p-4" action="" method="POST">
                    <p class="p-2 h1 mb-4 darkgray-font">Logout</p>


                        <div class="h1 text-danger">
                            <?php
                            if(isset($error)){
                                echo $error;
                            }
                            ?>
                        </div>

                        <!-- Logout button -->
                        <div class="p-4">
                            <button type="submit" class="btn btn-outline-dark p-2 mb-4" name="logout" id="logout">Disconnect</button>
                        </div>

                </form>
            </div>
        </div>
    </div>


</body>
</html>