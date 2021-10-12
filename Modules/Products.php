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

function getProduct(int $productId)
{
    $db = new PDO("mysql:host=localhost;dbname=healthone", "root", "");
    $query = $db->prepare("SELECT * FROM product");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_CLASS);
    return $result;
}
