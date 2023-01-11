<?php

require_once 'config/init.php';
require_once 'config/auth.php';
require_once 'functions/card.php';


$test = auth($_SESSION);

if($test){

    $btn = '<form action="index.php" method="post"><button type="submit" class="btn btn-outline-dark" name="logout"> Logout </button></form>';
    require_once 'creer.php';

}

if(isset($_POST['logout'])){
    session_destroy();
    header('location:connexion.php');
}

if(isset($_GET['modifier'])){
    $id = intval($_GET['modifier']);
} else if (isset($_GET['effacer'])){
    $id = intval($_GET['effacer']);
}
$stmt = $pdo->prepare("SELECT * FROM produits WHERE id = :id ");
$stmt->bindParam(':id', $id);
$stmt->execute();
$prod = $stmt->fetchAll(PDO::FETCH_ASSOC);

ob_start();
?>
<div class="container">
    <?= card($prod,$test) ?>
</div>
<div class="container">
    <form action="modifier.php?modifier=<?php echo $prod[0]['id']?>" method="POST">
        <div class="form-group">
            <label for="titleInput">Title</label>
            <input type="text" class="form-control" id="titleInput" name="title" placeholder="" value="<?php echo $prod[0]['titre']?>">
        </div>
        <div class="form-group">
            <label for="priceInput">Price</label>
            <input type="text" class="form-control" id="priceInput" name="price" placeholder="" value="<?php echo $prod[0]['prix'] ?>">
        </div>
        <div class="form-group">
            <label for="descriptionInput">Description</label>
            <textarea class="form-control" id="descriptionInput" name="description" rows="3" placeholder=""><?php echo $prod[0]['description']?></textarea>
        </div>
        <button type="submit" name="modify" class="btn btn-outline-dark mt-3">Modify</button>

    </form>
</div>
<?php



if(isset($_POST['modify'])){
    if(isset($_POST['title'])){
       $stmt = $pdo->prepare('UPDATE `produits` SET `titre`=:title WHERE id = :id');
       $stmt->bindParam(':title', $_POST['title']);
       $stmt->bindParam(':id', $id);
       $stmt->execute();

    }
    if(isset($_POST['price'])){
        $stmt = $pdo->prepare('UPDATE `produits` SET `prix`=:price WHERE id = :id');
        $stmt->bindParam(':price', $_POST['price'], PDO::PARAM_INT);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

    }
    if(isset($_POST['description'])){
        $stmt = $pdo->prepare('UPDATE `produits` SET `description`=:description WHERE id = :id');
        $stmt->bindParam(':description', $_POST['description']);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

    }

    header('location:modifier.php?modifier='.$id);
}

if(isset($_GET['effacer'])){
?>
    <div class="container h3 text-danger p-5">Are you sure you want to delete this product?
        <a href="index.php?delete=<?php echo $_GET['effacer'] ?>"> delete </a>
    </div>';
<?php
}

$main = ob_get_clean();


require_once 'template.php';
