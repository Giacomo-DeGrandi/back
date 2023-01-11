<?php

if(!isset($_SESSION['user_connected'])){

    header('location:inscription.php');

} else {

    header('location:dashboard.php');

}


// Sur cette page, on aura l'interface administrateur de notre site

// Aujourd'hui : on fera un bouton de déconnexion

/* Comment faire un bouton de déconnexion ?

    - Passer une requête GET dans un lien

        - Comment passer une requête GET dans un lien ?

        - Avec le symbole '?'

        - index.php?deconnexion=1;
            <a href="index.php?deconnexion=1"></a>

            (en haut de ma page, juste après avoir require mon fichier init,
            je peux dire que :) :

                - Si GET['deconnexion'] === 1 :
                    - $_SESSION['membre_connecte'] = false;

*/

/* Si l'utilisateur n'est pas connecté :
    - Je me sert de la fonction header() qui me permet de rediriger
    un utilisateur
    
    - Je renvoie l'utilisateur sur la page de connexion
    */
?>