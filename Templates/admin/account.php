<?php
function startSession() {
    if (!isset($_SESSION)) {
        session_start();
    }
}
    var_dump($_SESSION['role']);
    global $gebruikersnaam;
            
?>  

<!DOCTYPE html>
    <html>

    <?php
    include_once('defaults/head.php');
    include_once('defaults/header.php');

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
                    <h4>Change the website</h4>
                    <p>Als administrator kun je apparaten toevoegen en verwijderen, reageren op reviews en overige
                        dingen aanpassen.
                    </p>
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
