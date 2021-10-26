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
    <div class="row products-information">
    <?php
        global $getproducts;
        foreach ($getproducts as &$data) {
            echo "<div class='col-sm-5'>
                    <h4 class='product-heading'> " . $data->Name .  "</h4>
                    <a href=$data->Category_id/product/$data->ID>
                        <img src='" . $data->Picture . "' class = '" . $data->class .  "'>
                    </a>
                  </div>
            ";
        }
        ?>
        <br><br>
        <p class="basic-info">
            U kunt bij ons komen sporten zonder afspraak. U kunt gebruik maken van de vrije apparaten voor maximaal een halfuur, u kunt gewoon
            beginnen op een apparaat en mocht u er niet uitkomen kunt u altijd hulp/advies vragen aan een van onze medewerkers. <br>
            Zodat iedereen optiomaal gebruik van hun tijd kan maken. Het is niet mogelijk om een apparaat te reserveren, 
            ieder heeft dezelfde kans en anders moet u even ergens anders op trainen als u een voorkeur heeft.
        </p>
    </div>
    <hr>
    <?php
    include_once('defaults/footer.php');
    ?>
</div>

</body>
</html>