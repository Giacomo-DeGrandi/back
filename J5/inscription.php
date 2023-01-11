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


if(isset($_POST['name'], $_POST['email'], $_POST['password'], $_POST['subscribe'])){
    (empty($_POST['name'])) ? $errors[] = 'fill up all the fields to subscribe' : true;
    (empty($_POST['email'])) ? $errors[] = 'fill up the email field' : true;
    (empty($_POST['password'])) ? $errors[] = 'fill up the password field' : true;
    if (!empty($_POST['email'])) {
        $email = $_POST['email'];
        $emailParts = str_split($email, strrpos($email, '@'));
        $domain = $emailParts[1];
        if ($domain !== 'gmail.com' && $domain !== 'hotmail.fr' && $domain !== 'outlook.com') {
            $errors[] = "Invalid email format";
        }
    }
    if(empty($errors)) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
        $stmt->execute();
        $test = $stmt->fetchAll();
        (empty($test)) ? true : $errors[] = 'this email already exists';
        if(empty($errors)) {

            // Hash the password
            $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $stmt = $pdo->prepare("INSERT INTO users (name, email, mdp) VALUES ( ?, ?, ?)");
            $stmt->bindParam(1, $_POST['name'], PDO::PARAM_STR);
            $stmt->bindParam(2, $_POST['email'], PDO::PARAM_STR);
            $stmt->bindParam(3, $hashedPassword, PDO::PARAM_STR);
            $stmt->execute();
            header('location:connexion.php');
        }
    }
}




?>
<div class="container-fluid">
    <div class="row flex-wrap">
        <div  class="p-4 me-5">
            <form class="p-4" id="formSignup" action="inscription.php" method="POST">
                <p class="p-2 h1 mb-4 darkgray-font">Inscription</p>

                <div class="row mb-2">
                    <p class="h4 darkgray-font p-2">Details</p>

                    <!-- Name input -->
                    <div>
                        <input class="form-control" id="name" name="name" type="text">
                        <label class="form-label" for="name">Name</label><br>
                    </div>

                    <hr class="mb-2">
                    <p class="h4 darkgray-font p-2">Account</p>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="email" name="email" class="form-control" />
                        <label class="form-label" for="email">Adresse Email</label><br>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="password" name="password" class="form-control" />
                        <label class="form-label" for="password">Mot de Passe</label><br>
                    </div>
                    <?php if(isset($errors)){
                        require_once 'functions/messageErreur.php';
                        echo messageErreur($errors);
                    }
                    ?>

                    <!-- Submit button -->
                    <div class="p-4">
                        <button type="submit" class="btn btn-outline-dark mb-4" name="subscribe" id="subscribe">Subscribe</button>
                    </div>

                    <!-- Register buttons -->
                    <div class="text-center">
                        <p>Already a member? <a href="connexion.php" class="text-info">Sign in</a></p>
                    </div>


            </form>
        </div>
    </div>
</div>
<?php

$main = ob_get_clean();


require_once 'template.php';


