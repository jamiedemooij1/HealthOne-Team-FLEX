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
                ?>
                <div class="row">
                    <div class="flex-column">
                        <h3>Registreren bij HealthOne</h3>
                       
                    <?php 
                    echo "Hallo";
                    ?>
                    <label for="">Gebruikersnaam*</label>
                    <input type="text">

                    <label for="">Voornaam*</label>
                    <input type="text">

                    <label for="">Achternaam*</label>
                    <input type="text">

                    <label for="">Emailadres*</label>
                    <input type="text">

                    <label for="">Wachtwoord*</label>
                    <input type="text">
                    
                    <label for="">Telefoonnummer*</label>
                    <input type="text">
                    </div>
                    <hr>
                </div>
                <?php
                include_once ('defaults/footer.php');
                ?>

        </div>
    </body>
</html>
