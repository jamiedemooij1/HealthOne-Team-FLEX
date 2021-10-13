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
                        <h3 class="registratie-heading">Registreren bij HealthOne</h3>
                       
                    <?php 
                    //echo "Hallo";
                    ?>
                   
                        <input type="text" class="inputvelden" placeholder="Gebruikersnaam*">
                        <input type="text" class="inputvelden" placeholder="Wachtwoord*"><br>
                        <br>
                    
                        <input type="text" class="inputvelden" placeholder="Voornaam*">
                        <input type="text" class="inputvelden" placeholder="Achternaam*"><br>
                        <br>
                    
                        <input type="text" class="inputvelden" placeholder="Telefoonnummer">
                        <input type="text" class="inputvelden" placeholder="Geslacht"><br>
                        <br>
                    <input type="text" class="email" placeholder="Emailadres"><br>
                    <br>
                    <input type="submit" name="Registreren" class="button" value="Registreren">
                    </div>
                    <br>
                    <hr>
                </div>
                <?php
                include_once ('defaults/footer.php');
                ?>

        </div>
    </body>
</html>
