<?php 
    try {
        $db = new PDO("mysql:host=localhost;dbname=healthone", "root", "");
        if (isset($_POST["send"])) {
            
            $customer_id = $_POST["id"];
            $titel = $_POST["title"];
            $description = $_POST["description"];
            $rating = $_POST["rating"];
            $product_id =
            
            $query= $db->prepare("INSERT INTO review(customer_id, title, description, rating, product_id) 
                                VALUES (:customer_id, :title, :description, :rating, :product_id)");
            $query->bindParam("customer_id", $customer_id);
            $query->bindValue("title", $titel);
            $query->bindParam("description", $description);
            $query->bindParam("rating", $rating);
            $query->bindParam("product_id", $product_id);
            if ($query->execute()) {
                echo "
                <p class='registration'>De plaatsing van uw review is gelukt!</p>";
            } else {
                echo "De review is nog niet geplaatst, controleer de velden of probeer het later opnieuw.";
            }
        } 
        
    }
    catch (PDOException $e) {
        die("Error!: " . $e->getMessage());
    }
    ?>