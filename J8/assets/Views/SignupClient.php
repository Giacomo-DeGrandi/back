<?php

ob_start();
?>

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

<?php

$content = ob_get_clean();
