<?php 

    try {
        
        $db = new PDO("mysql:host=localhost;dbname=healthone", "root", "");
        $query = $db->prepare("SELECT profile, info, firstname, lastname FROM customer WHERE username = :username");
        $query->bindParam('username', $_SESSION['username']);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as &$data) {
            echo "<h4>Account informatie</h4><br>";
            echo "<img src='". $data['profile'] . "'";
            echo "<br><br>";
            echo "<h5>Persoonsinformatie</h5>";
            echo "<p>" . $data['info'] . " ". $data['firstname'] ." ". $data['lastname'] ."</p>";
        }
          
    } 
    catch (PDOException $e) {
        die("Error!: " . $e->getMessage());
    }
?>