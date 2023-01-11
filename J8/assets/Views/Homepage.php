<?php

ob_start();
?>

<div class="container">
    <div class="d-flex flex-column justify-content-center align-items-center">
        <p class="display-1">Hell0 Homepage</p>
    </div>
</div>
<?php

$content = ob_get_clean();
