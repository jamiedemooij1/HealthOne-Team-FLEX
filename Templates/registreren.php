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
                    try {
                        $db = new PDO("mysql:host=localhost;dbname=healthone", "root", "");
                        if (isset($_POST['Registreren'])) {
                            $gebruikersnaam = filter_input(INPUT_POST, "gebruikersnaam", FILTER_SANITIZE_STRING);
                            $wachtwoord = filter_input(INPUT_POST, "wachtwoord", FILTER_SANITIZE_STRING);
                            $voornaam = filter_input(INPUT_POST, "voornaam", FILTER_SANITIZE_STRING);
                            $achternaam = filter_input(INPUT_POST, "achternaam", FILTER_SANITIZE_STRING);
                            $telefoonnummer = filter_input(INPUT_POST, "telefoonnummer", FILTER_SANITIZE_STRING);
                            $geslacht = filter_input(INPUT_POST, "geslacht", FILTER_SANITIZE_STRING);
                            $emailadres = filter_input(INPUT_POST, "emailadres", FILTER_SANITIZE_STRING);
                            var_dump($gebruikersnaam, $wachtwoord, $voornaam, $achternaam, $telefoonnummer, $geslacht, $emailadres);
                            $query= $db->prepare("INSERT INTO customer(gebruikersnaam, wachtwoord, voornaam, achternaam, telefoonnummer, geslacht, emailadres) 
                                                VALUES (:gebruikersnaam, :wachtwoord:, voornaam:, achternaam, :telefoonnummer, :geslacht, :emailadres)");
                            $query->bindParam("gebruikersnaam", $gebruikersnaam, PDO::PARAM_STR);
                            $query->bindParam("wachtwoord", $wachtwoord, PDO::PARAM_STR);
                            $query->bindParam("voornaam", $voornaam, PDO::PARAM_STR);
                            $query->bindParam("achternaam", $achternaam, PDO::PARAM_STR);
                            $query->bindParam("telefoonnummer", $telefoonnummer, PDO::PARAM_STR);
                            $query->bindParam("geslacht", $geslacht, PDO::PARAM_STR);
                            $query->bindParam("emailadres", $emailadres, PDO::PARAM_STR);
                            if ($query->execute()) {
                                echo "Gefeliciteerd! Uw inschrijving is gelukt!";
                            } else {
                                echo "De inschrijving is nog niet gelukt, controleer alleen velden.";
                            }
                        } 
                        
                    }
                    catch (PDOException $e) {
                        die("Error!: " . $e->getMessage());
                    }
                    ?>
                    <form method="post" action="">
                        <input type="text" class="inputvelden" name="gebruikersnaam" placeholder="Gebruikersnaam*">
                        <input type="password" class="inputvelden" name="wachtwoord" placeholder="Wachtwoord*"><br>
                        <br>
                    
                        <input type="text" class="inputvelden" name="voornaam" placeholder="Voornaam*">
                        <input type="text" class="inputvelden" name="achternaam" placeholder="Achternaam*"><br>
                        <br>
                    
                        <input type="text" class="inputvelden" name="telefoonnummer" placeholder="Telefoonnummer">
                        <input type="text" class="inputvelden" name="geslacht" placeholder="Geslacht"><br>
                        <br>
                    <input type="text" class="email" name="emailadres" placeholder="Emailadres"><br>
                    <br>
                    <input type="submit" name="Registreren" class="button" value="Registreren">
                    </form>
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
