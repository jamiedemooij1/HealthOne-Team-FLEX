<!DOCTYPE html>
<html>
<?php
include_once('defaults/head.php');
?>

<body>

<div class="container-fluid">
    <?php
    include_once('defaults/header.php');
    include_once('defaults/menu.php');
    ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/product">Product</a></li>
        </ol>
    </nav>
    <div class="row gy-3 product-information">
    <?php
        global $getproducts;
        foreach ($getproducts as &$data) {
            echo "<h4>" . $data->Name .  "</h4>
                  <p> " . $data->Description . "</p>
                  <a href=". 3 .  "/products>
                    <img src='" . $data->Picture . "' class = 'product'>
                  </a>
            ";
        }
        ?>
    </div>
    <hr>
    <?php
    include_once('defaults/footer.php');
    ?>
</div>

</body>
</html>