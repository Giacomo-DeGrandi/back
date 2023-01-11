<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <title>Product Cards</title>
</head>
<body>
<?php
// Include the header file
include 'header.php';
?>
<main>
    <div class="container text-center">
        <div class="row p-4 text-center">
            <?php
            // Include the controller file
            require_once 'controller.php';

        // Generate the HTML for the cards
        $card = new Card();
        $html = $card->show_cards($cards);

        echo $html;

            ?>
        </div>
    </div>

    <div class="container">
        <form action="../BACKEND/controller.php" method="POST">
            <div class="form-group">
                <label for="titleInput">Title</label>
                <input type="text" class="form-control" id="titleInput" name="title" placeholder="Enter title">
            </div>
            <div class="form-group">
                <label for="priceInput">Price</label>
                <input type="text" class="form-control" id="priceInput" name="price" placeholder="Enter price">
            </div>
            <div class="form-group">
                <label for="descriptionInput">Description</label>
                <textarea class="form-control" id="descriptionInput" name="description" rows="3"></textarea>
            </div>
            <button type="submit" name="add" class="btn btn-primary">Submit</button>

        </form>
    </div>




</main>
<?php
// Include the footer file
include 'footer.php';
?>
</body>
</html>
