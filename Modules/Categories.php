<?php
$host = '127.0.0.1';
$db   = 'healthone';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
// TODO Zorg dat de methodes goed ingevuld worden met de juiste queries.
function getCategories(/*int $id, varchar $name, varchar $picture, varchar $description*/)
{
        $db = new PDO("mysql:host=localhost;dbname=healthone", "root", "");
        $query = $db->prepare("SELECT * FROM product");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_CLASS);
        return $result;
}

function getCategoryName(int $id)
{
    
}
