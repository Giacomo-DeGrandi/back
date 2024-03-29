<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="assets/bootstrap-5.1.3-dist/js/bootstrap.bundle.js"></script>

    <!-- MY SCRIPTS -->
    <?php if(isset($script)){ echo $script; } ?>


    <script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"
            integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY="
            crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="assets/public/css/style.css">
    <!-- CSS only -->
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-5.1.3-dist/css/bootstrap.css" >
    <link href="assets/bootstrap-5.1.3-dist/css/bootstrap.css">

    <noscript>
        This page needs JavaScript activated to work.
        <style>div { display:none; }</style>
    </noscript>

    <title><?php $title ?></title>
</head>
<body>

<header class="container-fluid">

    <?= $header ?>

</header>

<span class="h3 p-4 text-danger">
    <?php if(isset($errors)){ echo $errors; } ?>
</span>

<main>

    <?= $content  ?>

</main>

<footer>

    <?= $footer ?>

</footer>

</html>