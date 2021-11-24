<?php
function startSession() {
    if (!isset($_SESSION)) {
        session_start();
    }
}
    global $gebruikersnaam;
            
?>  

<!DOCTYPE html>
    <html>

    <?php
    include_once('defaults/head.php');
    ?>
    <body>
        <div class="container-fluid">
                <?php
                include_once ('defaults/header.php');
                include_once ('defaults/menu.php');
                include_once ('defaults/pictures.php');
                ?>
                <div class="row account">
                    <div class="column first-col">

                        <h4>Favorieten</h4><br>
                        <h5>Roeiapparaat</h5>
                        <figure>
                            <img class="img-account" src="https://www.fitgear.nl/2391-thickbox_default/roeiapparaat-dunlop-air-750-roeitrainer.jpg" />
                        </figure>
                        <h5>Loopband</h5>
                        <figure>
                            <img class="img-account" src="https://cdn.webshopapp.com/shops/281654/files/282878592/loopband-fitrun-50i.jpg" />
                        </figure>
                        <h5>..</h5>
                        <figure>
                            <img class="img-account" src="" />
                        </figure>

                    </div>
                    <h4>Je bent administrator</h4>
                    <div class="column">
                    <?php
                         if ($_SESSION['login'] == true) {
                            include_once ('defaults/user.php');
                        }
                        
                    ?>                    
                    </div>
                    <hr>
                </div>
                <?php
                include_once ('defaults/footer.php');
                ?>

        </div>
    </body>
</html>
