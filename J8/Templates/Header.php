<?php

ob_start();
?>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">My Web Application</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" ></button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php?controller=Catalogue&action=renderCatalogue">Catalogue</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=Signup&action=renderSignup">Inscription</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Inscription Clients</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
<?php

$header = ob_get_clean();
