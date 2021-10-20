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
                <?php 
                        try {
                            $db = new PDO("mysql:host=localhost;dbname=healthone", "root", "");
                            if (isset($_POST['Inloggen'])) {
                                $gebruikersnaam = filter_input(INPUT_POST, "gebruikersnaam", FILTER_SANITIZE_STRING);
                                $wachtwoord = $_POST['wachtwoord'];
                                $query = $db->prepare("SELECT * FROM customer WHERE gebruikersnaam = :gebruiker");
                                $query->bindParam("gebruiker", $gebruikersnaam);
                                $query->execute();
                                if ($query->rowCount() == 1) {
                                    $result = $query->fetch(PDO::FETCH_ASSOC);
                                    if (password_verify($wachtwoord, $result["wachtwoord"])) {
                                        echo "Juiste gegevens!";
                                    } else {
                                        echo "Onjuiste gegevens!";
                                    }
                                } else {
                                    echo "Onjuiste gegevens!";
                                }
                                echo "<br>";
                                }
                            }
                        
                        catch (PDOException $e) {
                            die("Error!: " . $e->getMessage());
                        }
                    ?>
                <div class="row">
                        
                        <article class="inlogblok">
                            <h4>Inloggen HealthOne</h4>
                            <label for="">Gebruikersnaam</label><br>
                            <input type="text" name="gebruikersnaam" required>
                            <br>
                            <label for="">Wachtwoord</label><br>
                            <input type="password" name="wachtwoord" required><br><br>
                            <a href="account">
                                <input type="submit" name="Inloggen" value="Inloggen" ac>
                            </a>
                                
                        </article>
                    

                    </div>
                    
                    <hr>
                
                <?php
                include_once ('defaults/footer.php');
                ?>

        </div>
    </body>
</html>
