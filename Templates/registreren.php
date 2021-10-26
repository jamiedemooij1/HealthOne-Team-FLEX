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
                        <h3 class="registratie-heading">Aanmelden bij HealthOne</h3>
                       

                    <form method="post" action="">
                        <input type="text" class="inputvelden" name="gebruikersnaam" placeholder="Gebruikersnaam*" required>
                        <input type="password" class="inputvelden" name="wachtwoord" placeholder="Wachtwoord*" required><br>
                        <br>
                    
                        <input type="text" class="inputvelden" name="voornaam" placeholder="Voornaam*" required>
                        <input type="text" class="inputvelden" name="achternaam" placeholder="Achternaam*" required><br>
                        <br>
                    
                        <input type="text" class="inputvelden" name="telefoonnummer" placeholder="Telefoonnummer">
                        <input type="text" class="inputvelden" name="geslacht" placeholder="Geslacht"><br>
                        <br>
                        <input type="number" class="email" name="abonnement" placeholder="Uw abonnement in maanden*" min="1" max="36" required><br>
                        
                        <label class="price-label">&#x20AC 21,99 per maand - &#x20AC 249,99 per jaar</label>
                        <br>
                        <br>
                    <input type="text" class="email" name="emailadres" placeholder="Emailadres*" required><br>
                    <br>
                    <!--<input type="number" name="" name="id" min="2" class="id-number"><br>-->
                    <input type="submit" name="registreren" class="button" value="registreren">
                    </form>
                    </div>
                    <br>
                    <?php
                        include_once ('defaults/registration.php');
                    ?>
                    <hr>
                </div>
                <?php
                include_once ('defaults/footer.php');
                ?>

        </div>
    </body>
</html>
