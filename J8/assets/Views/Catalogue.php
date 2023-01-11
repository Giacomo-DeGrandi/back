<?php

ob_start();
?>

    <div class="container">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <p class="display-5">CATALOGUE</p>
            <div class="d-flex">
                <form action="index.php" class="p-3">
                    <label for="Search">Search</label>
                    <input type="hidden" name="controller" value="Search">
                    <input type="hidden" name="action" value="renderSearch">
                    <input type="text" name="Search" id="search">
                    <button type="submit" >🔍</button>
                </form>
                <div class="p-3">
                    <a href="index.php?controller=Catalogue&action=renderCatalogue" id="back">Back to all the products</a>
                </div>
            </div>
            <h5><i>our products:</i></h5>

            <div class="d-flex flex-wrap">
                <?php
                    if(isset($html)){
                        foreach($html as $card){
                            echo $card;
                        }
                    }
                ?>
            </div>
        </div>
    </div>
<?php

$content = ob_get_clean();
