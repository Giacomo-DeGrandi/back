<?php

require_once 'config/init.php';
require_once 'config/auth.php';


/**
 * Generates a CSRF token and stores it in the session.
 * @throws Exception
 */
function token()
{
    // Generate a random token and store it in the session
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

try {
    token();
} catch (Exception $e) {

}

$errors = [];

$test = auth($_SESSION);

ob_start();


if(isset($_POST['emailIn'],$_POST['passwordIn'],$_POST['signin'])){
    (empty($_POST['emailIn'])) ? $errors[] = 'fill up the email field' : true;
    (empty($_POST['passwordIn'])) ? $errors[] = 'fill up the password field' : true;
    if(!empty($_POST['emailIn']) && !preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/", $_POST['emailIn'])) {
        $errors[] = "Invalid email format";
    }
    if(empty($errors)) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email AND mdp = :password ");
        $stmt->bindParam(':email', $_POST['emailIn']);
        $stmt->bindParam(':password', $_POST['passwordIn']);
        $stmt->execute();
        $test = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($test)){
            if($test[0]['blocked'] !== 0){
                $errors[] = "You account has been blocked, please contact the administration to unblock it";
            } else {
                $_SESSION['user_connected'] = $_POST['emailIn'];
                header('location:index.php');
            }
        } else {
            if(isset($_SESSION['invalid'])){
                $_SESSION['invalid'] += 1;
                if($_SESSION['invalid'] >= 3 && $_SESSION['invalid'] <= 5){
                    $errors[] = "Invalid login credentials you still have ".(5 - $_SESSION['invalid'])." attempts";
                    if($_SESSION['invalid'] >= 5) {
                        $x = 1;
                        $stmt = $pdo->prepare('UPDATE `users` SET `blocked`=:blocked WHERE email = :email');
                        $stmt->bindParam(':blocked', $x);
                        $stmt->bindParam(':email', $_POST['emailIn']);
                        $stmt->execute();
                        $_SESSION['invalid'] = 0;
                        $errors[] = "Invalid login credentials you account has been blocked, please contact the administration to unblock it";
                        $_SESSION['invalid'] = 0;
                    }

                } else {
                    $errors[] = "Invalid login credentials";
                }
            } else {
                $_SESSION['invalid'] = 0;
            }
        }
    }
}



?>
<div class="container-fluid">
    <div class="row flex-wrap">
        <div  class="col p-4 me-5">
            <form class="p-4" method="POST" id="formSignin">
                <p class="p-2 h1 mb-4 ">Sign In</p>

                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="email" id="emailIn" name="emailIn" class="form-control" />
                    <label class="form-label" for="email">Addresse Email</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="password" id="passwordIn" name="passwordIn" class="form-control" />
                    <label class="form-label" for="password">Mot de Passe</label>
                </div>

                <!-- Submit button -->
                <div class="p-4">
                    <button type="submit" class="btn btn-outline-dark mb-4" name="signin" id="signin">Sign In</button>
                </div>

                <?php if(isset($errors)){
                    require_once 'functions/messageErreur.php';
                    echo messageErreur($errors);
                }
                ?>


                <!-- Register buttons -->
                <div class="text-center">
                    <p>Not a member? <a href="inscription.php" class="text-danger">Register</a></p>
                </div>

            </form>
        </div>
    </div>
</div>
<?php

$main = ob_get_clean();


require_once 'template.php';