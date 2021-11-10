<?php 
    function checkLogin (string $username, string $password)
{
        global $pdo;
        $query = $pdo->prepare("SELECT gebruikersnaam, wachtwoord FROM customer WHERE gebruikersnaam = :user AND wachtwoord =:password");
        $query->bindParam(":user", $username);
        $query->bindParam(":password", $password);
        $query->execute(); 
        $result = $query->fetchAll(PDO::FETCH_CLASS, 'User');
        if (count($result) == 1) {
            return true;
        }
        return false;        
}

