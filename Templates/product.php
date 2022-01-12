<?php
    function startSession() {
        if (!isset($_SESSION)) {
            session_start();
        }
    }
?>
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
                
            </div>
            <div class='flex-column'>
               <img src='" . $data->Picture . "' class = '" . $data->class . "'>
               
            </div>
            ";
            global $reviews;
            foreach($reviews as &$data){
                echo "
            <h4 class='article-head'>Product reviews</h4>
                <article class='article-one'>
                    <h5><b>$data->title</b></h5>
                    <p>$data->description
                    </p>
                </article>
                
            ";
            }
        }

        ?>
        <?php
        if($_SESSION['login'] == true){
            include_once('defaults/postreview.php');
        }
        ?>
        </div>
    <?php
    include_once('defaults/footer.php');

    ?>

<script src="/public/js/action.js"></script>

</body>
</html>

