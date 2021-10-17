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
        global $product;
        var_dump($product);
        foreach ($product as &$data) {
            echo "<div class='col-sm-4 col-md-3'>
                    <div class='card'>
                        <div class='card-body'>
                        <img class='product-img img-responsive center-block' src='". $data->Picture . "'>
                            <div class='card-title mb-3'>" . $data->Name . "</div>
                        </div>
                    </div>
                </div>";
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