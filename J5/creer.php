<?php

ob_start();

?>
<div class="container p-5">
    <form action="index.php" method="POST" class="p-5">
        <span class="display-6 p-4 mt-4">Add a product</span>

        <div class="form-group p-1">
            <label for="titleInput">Title</label>
            <input type="text" class="form-control" id="titleInput" name="title" placeholder="Enter title">
        </div>
        <div class="form-group p-1">
            <label for="priceInput">Price</label>
            <input type="text" class="form-control" id="priceInput" name="price" placeholder="Enter price">
        </div>
        <div class="form-group p-1 mb-3">
            <label for="descriptionInput">Description</label>
            <textarea class="form-control" id="descriptionInput" name="description" rows="3"></textarea>
        </div>
        <button type="submit" name="add" class="btn btn-outline-dark">add product</button>

    </form>
</div>


<?php

$form = ob_get_clean();