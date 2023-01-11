<?php

// init.php : votre fichier d'initialisation

session_start(); // on ouvre une nouvelle session si ce n'est pas déjà fait

try { // On essaye une action
    // Objet PDO : nous permet de communiquer avec une base de données
    $pdo = new PDO('mysql:host=localhost;dbname=nom_base_de_donnees;charset=utf8', 'root', '');
} catch(Exception $e) { // en cas d'erreur
    // On arrête l'écriture du script
    // On affiche une erreur à l'utilisateur
    die('Erreur : '.$e->getMessage());
}

/* Un objet instancié par une classe, comme on a fait avec les Cards, qui nous permet avec une base de données */

