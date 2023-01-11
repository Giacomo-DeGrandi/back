<?php

/* Un id de session, c'est un moyen de donner un identifiant unique à chaque nouvelle session de connexion 

    On le déclare dans notre fichier init.php juste en dessous de session start
*/

if (!isset($_SESSION['id'])) {
    $_SESSION['id'] = session_id();
}

?>