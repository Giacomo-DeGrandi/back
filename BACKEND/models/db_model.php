<?php

class Db{

    public static function connect(){
        try { // On essaye une action
            // Objet PDO : nous permet de communiquer avec une base de données
            return $pdo = new PDO('mysql:host=localhost;dbname=cards;charset=utf8', 'root', '');
        } catch(Exception $e) { // en cas d'erreur
            // On arrête l'écriture du script
            // On affiche une erreur à l'utilisateur
            die('Erreur : '.$e->getMessage());
        }
    }


}