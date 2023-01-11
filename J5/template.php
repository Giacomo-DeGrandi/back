<?php
/*

Ici, vous pouvez requérir le fichier auth.php (si vous en êtes à cette étape)

*/

/*

Ici, incluez les fichiers des fonctions dont vous aurez besoin dans votre page

*/

/* 


Ici, insérez le traitement des formulaires,
             les requêtes à la base de données,
             la récupération des données




*/


foreach ($_POST as $key => $value) {
    $_POST[$key] = htmlspecialchars((string)$value, ENT_NOQUOTES | ENT_HTML5 | ENT_SUBSTITUTE,
        'UTF-8', double_encode: false );
}

// filter every $_POST and $_GET of user input with this controller

$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_FULL_SPECIAL_CHARS);







include 'components/Head.html';

?>

<body>


<?php
 include('components/Header.php'); ?>

<main>

<?= $main ?>

<?php if(isset($cards)){ echo $cards; }  ?>

</main>

<?php include 'components/Footer.html'; ?>

</body>


