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
        global $productpage;
        global $product;
        foreach ($productpage as &$data) {
            echo "
            <div class='flex-column'>
                <h4>" . $data->Name .  "</h4>
                <p class='description'> " . $data->Description . "</p>
                <h4 class='article-head'>Mijn reviews</h4>
                <article class='article-one'>
                    <h5><b>Mijn rating is 4 sterren</b></h5>
                    <p>Ik was de 1e keer begonnen op het roeiapparaat Tunturi FitRow 70 Water. Het was geweldig om binnen 15 minuten 100 calorieën verbrand
                        te hebbben en al mijn spieren goed kunnen gebruiken. Een hele goeie ervaring, voelde me echt een topsporter!
                    </p>
                </article>
                
            </div>
            <div class='flex-column'>
               <img src='" . $data->Picture . "' class = '" . $data->class . "'>
               
            </div>
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

