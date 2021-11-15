<?php 

    try {
        global $gebruikersnaam;
        $db = new PDO("mysql:host=localhost;dbname=healthone", "root", "");
        $query = $db->prepare("SELECT profile, info FROM customer WHERE username = 'De Rock'");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as &$data) {
            echo "<img src='". $data['profile'] . "'";
            echo "<br>";
            echo "<h4>Account informatie</h4><br>";
            echo "<p>" . $data['info'] . "</p>";
        }
          
    } 
    catch (PDOException $e) {
        die("Error!: " . $e->getMessage());
    }
?>