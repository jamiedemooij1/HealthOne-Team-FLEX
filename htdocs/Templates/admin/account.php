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
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item"><a href="/account">Account</a></li>
            </ol>
        </nav>
            <div class="row ">
                <div class="flex-column first-col">
                <h4>Change the website</h4>
                <p>Als administrator kun je apparaten toevoegen en verwijderen, reageren op reviews en overige
                    dingen aanpassen.
                </p>
                </div>
                <div class="flex-column">
                <h4>Je bent administrator</h4>
                <p>
                    Hier komt nog een leuke banner met foto's
                </p>
                <?php
                    /* if ($_SESSION['login'] == true) {
                        include_once ('defaults/admin.php');
                    }*/
                    
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
