<?php
    function getAdminMenu () {
        $db = new PDO("mysql:host=localhost;dbname=healthone", "root", "");
        $query = $db->prepare("SELECT profile FROM customer WHERE username = 'mradmin'");
        //$query->bindParam('username', $_SESSION['username']);
        $query->execute();
        $result = $query->fetch();
    }
    function getMenu() {
        $db = new PDO("mysql:host=localhost;dbname=healthone", "root", "");
        $query = $db->prepare("SELECT profile, info FROM customer WHERE username = :username");
        $query->bindParam('username', $_SESSION['username']);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
    }
?>