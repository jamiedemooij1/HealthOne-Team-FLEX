<?php
// TODO Zorg dat de methodes goed ingevuld worden met de juiste queries.
function getProducts(int $categoryId)
{
    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $parts = explode('/', $url);
    $number = $parts[count($parts) - 1];
    $db = new PDO("mysql:host=localhost;dbname=healthone", "root", "");
    $query = $db->prepare("SELECT * FROM product WHERE Category_id =$number");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_CLASS);
    return $result;
}

function getProductInformation(int $productId)
{
    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $parts = explode('/', $url);
    $number = $parts[count($parts) - 1];
    $db = new PDO("mysql:host=localhost;dbname=healthone", "root", "");
    $query = $db->prepare("SELECT * FROM product WHERE ID =$number");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_CLASS);
    return $result;
}
 function getAllProducts():array
 {
    global $pdo;
    $sth = $pdo->prepare('SELECT product.ID AS product_id, product.Name, product.Picture, product.Description, product.Category_id, category.ID, category.Name AS category_name
                         FROM product
                         LEFT JOIN category
                         ON product.Category_id = category.ID');
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_CLASS, 'Product');
 }
function deleteProduct(int $id) {
    global $pdo;
    $sth = $pdo->prepare('DELETE FROM product WHERE ID = ?');
    $sth->bindParam(1, $id);
    $sth->execute();
    return $sth->rowCount();
}
function addProduct() {
    $db = new PDO("mysql:host=localhost;dbname=healthone", "root", "");
    if (isset($_POST["adding"])) {
        $name = FILTER_INPUT(INPUT_POST, 'name');
        $image = FILTER_INPUT(INPUT_POST, 'picture');
        $category = FILTER_INPUT(INPUT_POST, 'category');
        $description = FILTER_INPUT(INPUT_POST, 'description');
        $sth = $db->prepare('INSERT INTO product (Name, Picture, Description, Category_id) 
                                        VALUES(:Name, :Picture, :Description, :Category_id)');
        $sth->bindParam("Name", $name);
        $sth->bindParam("Picture", $image);
        $sth->bindParam("Description", $description);
        $sth->bindParam("Category_id", $category);
        $sth->execute();
        return $sth->rowCount();
    }
    
}
function menuCategory() {
    global $pdo;
    $db = new PDO("mysql:host=localhost;dbname=healthone", "root", "");
    $query = $db->prepare("SELECT * FROM category" );
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_CLASS);
    return $result;
}
/*$db = new PDO("mysql:host=localhost;dbname=healthone", "root", "");
        if (isset($_POST["registreren"])) {
            
            $gebruikersnaam = $_POST["username"];
            $wachtwoord = $_POST["password"];
            $EncryptPassword = md5($wachtwoord); 
            $voornaam = $_POST["firstname"];
            $achternaam = $_POST["lastname"];
            $telefoonnummer = $_POST["phonenumber"];
            $geslacht = $_POST["gender"];
            $emailadres = $_POST["mailaddress"];   
            $abonnement = $_POST["subscription"];                           
            
            $query= $db->prepare("INSERT INTO customer(username, password, firstname, lastname, phonenumber, gender, mailaddress, subscription) 
                                VALUES (:username, :password, :firstname, :lastname, :phonenumber, :gender, :mailaddress, :subscription)");    
            $query->bindParam("username", $gebruikersnaam);
            $query->bindValue("password", $wachtwoord);
            $query->bindParam("firstname", $voornaam);
            $query->bindParam("lastname", $achternaam);
            $query->bindParam("phonenumber", $telefoonnummer);
            $query->bindParam("gender", $geslacht);
            $query->bindParam("mailaddress", $emailadres);
            $query->bindParam("subscription", $abonnement);
            if ($query->execute()) {
                echo "
                <p class='registration'>Gefeliciteerd! Uw inschrijving is gelukt!</p>";
            } else {
                echo "De inschrijving is nog niet gelukt, controleer alleen velden.";
            }
        } */