
<?php
function getReview(int $reviewId){
    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $parts = explode('/', $url);
    $number = $parts[count($parts) - 1];
    $db = new PDO("mysql:host=localhost;dbname=healthone", "root", "");
    $query = $db->prepare("SELECT * FROM review WHERE product_id =$number");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_CLASS);
    return $result;
}

function getUserForReview(string $username){
    $db = new PDO("mysql:host=localhost;dbname=healthone", "root", "");
    $query = $db->prepare("SELECT * FROM customer WHERE username = :username");
    $query->bindParam('username', $username);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_CLASS);
    return $result;
}
function getPersonalReviews(int $userid){
    $db = new PDO("mysql:host=localhost;dbname=healthone", "root", "");
    $query = $db->prepare("SELECT * FROM review WHERE customer_id = $userid");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_CLASS);
    return $result;
}
?>
