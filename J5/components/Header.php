<?php

ob_start();

?>
<header class="p-5">
    <nav class="navbar navbar-expand-lg navbar-light bg-dark  p-5">
        <a class="navbar-brand text-light" href="index.php">My Web Application</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" ></button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

                <?php if(!$test): ?>
                <li class="nav-item p-1">
                    <a class="nav-link text-light" href="inscription.php">Inscription</a>
                </li>
                <li class="nav-item p-1">
                    <a class="nav-link text-light" href="connexion.php">Connexion</a>
                </li>
                <?php endif; ?>
                <li class="nav-item text-light p-1">
                    <?php if(isset($btn)){ echo $btn; }  ?>
                </li>
            </ul>
        </div>
    </nav>
</header>
<?php

$header = ob_get_flush();