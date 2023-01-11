<?php

require 'connexion_pdo.php';

/* 3 étapes

Étape 1 : on prépare notre requête

Étape 2 : on dit à l'objet PDO de préparer notre requête

Étape 3 : on dit à l'ojet PDO d'exécuter notre requête

*/

// péraper notre requête : c'est cette requête qui va s'éxécuter
$requete = "SELECT * FROM clients";

// pdo va être prêt à éxécuter cette requête, MAIS PAS D'AUTRE CODE
// Il n'ya que la requete qu'on lui passe en paramère qui va s'exécuter
$rq = $pdo->prepare($requete);

/* PDO lit : requete prépare, puis "drop database";

"OK, c'est très bien, tu as mis du code, je sais que tu as mis du code, mais je ne vais pas l'éxécuter, car ce n'est pas
la requête qu'on m'a dit d'exécuter" */

// execute : pdo va exécuter notre requête
// On a pas besoinde dire à l'objet pdo quoi exécuter puisque'il le sait depuis la préparation de la requête
$rq->execute();

