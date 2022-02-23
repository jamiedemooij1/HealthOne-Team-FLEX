<?php 

    try {
        
        $db = new PDO("mysql:host=localhost;dbname=healthone", "root", "");
        if (isset($_POST['verander'])) {
            $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $firstname = filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_STRING, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $lastname = filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_STRING, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $query = $db->prepare("UPDATE customer SET username = :username,
                                                       password = :password,
                                                       firstname =:firstname,
                                                       lastname = :lastname
                                                       WHERE username = :username");
            $query->bindParam("username", $username);
            $query->bindParam("password", $password);
            $query->bindParam("firstname", $firstname);
            $query->bindParam("lastname", $lastname);
            $query->bindParam('username', $_SESSION['username']);
            if ($query->execute()) {
                echo "De gegevens zijn gewijzigd!";
            } else {
                echo "Er is een fout opgetreden!";
            }
            echo "<br>";
        } else {
            $query = $db->prepare("SELECT username, password, firstname, lastname FROM customer WHERE username = :username");
            $query->bindParam('username', $_SESSION['username']);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as &$data) {
                $username = $data["username"];
                $password = $data["password"];
                $firstname = $data["firstname"];
                $lastname = $data["lastname"];
            }
        }
    } 
    catch (PDOException $e) {
        die("Error!: " . $e->getMessage());
    }
             
?>
<form method="post" class="changeProfile">
    <h3>Wijzig uw profiel hier</h3>

    <label for="">Gebruikersnaam</label>
    <input type="text" name="username" id="" value="<?php echo $username ?>"><br>

    <label for="">Wachtwoord</label>
    <input type="text" name="password" id="" value="<?php echo $password ?>"><br>

    <label for="">Voornaam</label>
    <input type="text" name="firstname" id="" value="<?php echo $firstname ?>"><br>

    <label for="">Achternaam</label>
    <input type="text" name="lastname" id="" value="<?php echo $lastname ?>"><br>

    <input type="submit" name="verander" value="Wijzig">
</form>