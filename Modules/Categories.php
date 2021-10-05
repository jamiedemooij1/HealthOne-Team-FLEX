<?php

// TODO Zorg dat de methodes goed ingevuld worden met de juiste queries.
function getCategories()
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
