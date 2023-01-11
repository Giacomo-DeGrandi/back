<?php

require_once 'config/init.php';
require_once 'config/auth.php';
require_once 'functions/card.php';
require_once 'functions/messageErreur.php';
require_once 'functions/messageValidation.php';


/**
 * Generates a CSRF token and stores it in the session.
 * @throws Exception
 */
function token()
{
    // Generate a random token and store it in the session
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

    token();


var_dump($_SESSION['csrf_token']);
//---------------------------------------------------------> BOT
/**
 * Deletes a specified number of entities from the 'produits' table.
 *
 * @param int $numEntities The number of entities to delete.
 * @param PDO $pdo A PDO object connected to the database.
 *
 * @return string A message indicating that the deletion is complete.
 */
function deleteBot($numEntities,$pdo) {

    // Get the number of entities in the table
    $sql = "SELECT COUNT(*) FROM produits";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $numEntitiesInTable = $stmt->fetchColumn();

    // Delete the specified number of entities, or all remaining entities if there aren't enough
    for ($i = 0; $i < min($numEntities, $numEntitiesInTable); $i++) {
        $sql = "DELETE FROM produits LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $_SESSION['bot'] += 1 ;

        if($_SESSION['bot'] <= min($numEntities, $numEntitiesInTable) ){
            header("Refresh:0");
        } else {
            return '<div class="h3 text-warning bg-dark po-2">done</div>';
        }
        // Refresh the page
    }
    return '<div class="h3 text-warning bg-dark po-2">done</div>';
}

// echo deleteBot(3,$pdo);

//---------------------------------------------------------> ADD FORM
/**
 * ADD FORM
 */
if(isset($_POST['title'], $_POST['price'], $_POST['description'], $_POST['add'])){
    if(isset($_POST['title'], $_POST['price'], $_POST['description'], $_POST['add'])){
        (empty($_POST['title'])) ? $errors[] = 'fill up the title field' : true;
        (empty($_POST['price'])) ? $errors[] = 'fill up the price field' : true;
        (empty($_POST['description'])) ? $errors[] = 'fill up the description field' : true;
        if(empty($errors)) {

                $stmt = $pdo->prepare("INSERT INTO produits (titre, prix, description, date, img_url) VALUES ( ?, ?, ?, ?, 'https://www.nicepng.com/png/full/308-3081994_aesthetic-transparent-white-flower-gardening-flower-transparent-aesthetic.png')");
                $stmt->bindParam(1, $_POST['title']);
                $stmt->bindParam(2, $_POST['price'], PDO::PARAM_INT);
                $stmt->bindParam(3, $_POST['description']);
                $date = date('Y-m-d');
                $stmt->bindParam(4, $date);
                $stmt->execute();
                header('location:index.php');

        }
    }
}




//---------------------------------------------------------> DELETE
/**
 * DELETE
 */

if(isset($_GET['delete'])){

    $stmt = $pdo->prepare("DELETE FROM produits WHERE id = :id ");
    $stmt->bindParam(':id', $_GET['delete']);
    $stmt->execute();
    $message =  'products deleted';
    echo messageValidation($message);
}

//---------------------------------------------------------> BUFFER START
/**
 * BUFFER START
 */

ob_start();

//---------------------------------------------------------> AUTH FUNCT
/**
 * AUTH FUNCTION
 */

$test = auth($_SESSION);

//---------------------------------------------------------> ADD FORM
/**
 * LOGOUT BUTTON
 */

if($test){

    $btn = '<form action="index.php" method="post">
                <button type="submit" class="btn btn-outline-dark border text-white border-white " name="logout"> Logout </button>
                <input type="hidden" name="csrf_token" value="'.$_SESSION['csrf_token'].'" >
            </form>';
    require_once 'creer.php';

}


if(isset($_POST['logout'])){
        session_destroy();
        header('location: connexion.php');
        exit();

}

//---------------------------------------------------------> FILTER CONDITIONS
/**
 * FILTER CONDITIONS
 */
$conditions = [
    'price-asc' => "SELECT * FROM produits ORDER BY prix ASC",
    'price-desc' => "SELECT * FROM produits ORDER BY prix DESC",
    'date-new' => "SELECT * FROM produits ORDER BY date DESC",
    'date-old' => "SELECT * FROM produits ORDER BY date ASC"
];


//---------------------------------------------------------> SEARCH && SORT
/**
 * SEARCH INPUT AND SORTING FILTER
 */
if(isset($_GET['search'],$_GET['searchbtn'])){
        $search = $_GET['search'];
        $stmt = $pdo->prepare("SELECT * FROM produits WHERE titre like :search");
        $stmt->execute(array(':search' => '%' . $search . '%'));
        $searchResults = $stmt->fetchAll();

} else if(isset($_GET['sort'],$_GET['sortbtn'])) {
        $sort = $_GET['sort'];
        $_SESSION['sort'] = $sort;
        $stmt = $pdo->prepare($conditions[$sort]);
        $stmt->execute();
        $allProduits = $stmt->fetchAll(PDO::FETCH_ASSOC);

} else {
    $stmt = $pdo->prepare("SELECT * FROM produits");
    $stmt->execute();
    $allProduits = $stmt->fetchAll(PDO::FETCH_ASSOC);
}




//--------------------------------------------------------->HTML
/**
 * HTML STRUCTURE
 */
?>
    <div class="container">
        <div class="container">
            <div class="d-flex">
                <form class="p-3">
                    <label for="search">Search</label>
                    <input type="text" name="search" id="search">
                    <button type="submit" name="searchbtn">🔍</button>
                </form>
                <div class="p-3">
                    <a href="index.php" id="back">Back to all the products</a>
                </div>
                <form>
                    <label for="sort_by">Sort by:</label><br>
                    <select name="sort" id="sort_by">
                        <?php
                        foreach ($conditions as $k => $v) {
                            if(isset($_SESSION['sort'])){
                                if($k === $_SESSION['sort']){
                                    echo "<option value='$k' selected> $k </option>";
                                } else {
                                    echo "<option value='$k'> $k </option>";
                                }
                            } else {
                                echo "<option value='$k'> $k </option>";
                            }
                        }
                        ?>
                    </select>
                    <button type="submit" name="sortbtn">🎚filter</button>
                </form>
            </div>
            <?php if(isset($form)){ echo $form; }?>
            <div class="d-flex p-3 flex-wrap">
                <?php
                    if(isset($allProduits)){
                        echo card($allProduits,$test);
                    } else {
                        echo card($searchResults,$test);
                    }
                ?>
            </div>
        </div>
    </div>
<?php

if(!$test){
?>
    <div class="container text-center">
        <span class="h3 p-4">
            <a href="inscription.php">Crée tes nouveaux produits avec nous!</a>
        </span>
    </div>
<?php
}


$main = ob_get_clean();



require_once 'template.php';