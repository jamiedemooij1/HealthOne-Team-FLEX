<?php
// TODO Zorg dat de methodes goed ingevuld worden met de juiste queries.
function getProducts(int $categoryId)
{
    $db = new PDO("mysql:host=localhost;dbname=healthone", "root", "");
    $query = $db->prepare("SELECT * FROM product WHERE Category_id =:id");
    $query->bindParam("id", $_GET['Category_id']);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_CLASS);
    return $result;
}

function getProduct(int $productId)
{
    $db = new PDO("mysql:host=localhost;dbname=healthone", "root", "");
    $query = $db->prepare("SELECT * FROM product");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_CLASS);
    return $result;
}
