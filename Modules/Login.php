<?php 
    function checkLogin (string $username, string $password)
{
        global $pdo;
        $query = $pdo->prepare("SELECT username, password FROM customer WHERE username = :user AND password =:password");
        $query->bindParam(":user", $username);
        $query->bindParam(":password", $password);
        $query->execute(); 
        $result = $query->fetchAll(PDO::FETCH_CLASS, 'User');
        if (count($result) == 1) {
            return true;
        }
        return false;        
}
    function checkAccount (string $username, string $password) {
        global $pdo;
        $query = $pdo->prepare("SELECT profile, info FROM customer WHERE username = :user");
        $query->bindParam(":user", $username);
        $query->bindParam(":password", $password);
        $query->execute(); 
        $result = $query->fetchAll(PDO::FETCH_CLASS, );
        if (count($result) == 1) {
            return true;
        }
        return false; 
    }

