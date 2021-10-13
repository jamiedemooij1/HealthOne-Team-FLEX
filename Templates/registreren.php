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
                <div class="row registratie">
                    <div class="">
                        <h3>Registreren bij HealthOne</h3>
                       
                    <?php 
                    //echo "Hallo";
                    ?>
                    <label for="" class="labels">Gebruikersnaam*</label><label for="" class="labels">Wachtwoord*</label><br>
                    <input type="text" class="inputvelden"><input type="text" class="inputvelden"><br>
                    <br>
                    <label for="" class="labels">Voornaam*</label><label for="" class="labels">Achternaam*</label><br>
                    <input type="text" class="inputvelden"><input type="text" class="inputvelden"><br>
                    <br>
                    <label for="" class="labels">Telefoonnummer</label><label for="" class="labels">Geslacht</label><br>
                    <input type="text" class="inputvelden"><input type="text" class="inputvelden"><br>
                    <br>
                    <label for="">Emailadres*</label><br>
                    <input type="text" class="email"><br>
                    
                    </div>
                    <hr>
                </div>
                <?php
                include_once ('defaults/footer.php');
                ?>

        </div>
    </body>
</html>
