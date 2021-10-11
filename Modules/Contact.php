<?php

// TODO Zorg dat de methodes goed ingevuld worden met de juiste queries.
function getContact()
{
        $db = new PDO("mysql:host=localhost;dbname=healthone", "root", "");
        $query = $db->prepare("SELECT * FROM locatie");
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
}
?>
