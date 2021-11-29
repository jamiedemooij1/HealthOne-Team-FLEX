<?php 
    function checkLogin (string $username, string $password)
{
        global $pdo;
        $query = $pdo->prepare("SELECT username, password, role FROM customer WHERE username = :user AND password =:password");
        $query->bindParam(":user", $username);
        $query->bindParam(":password", $password);
        
        $query->execute(); 
        $result = $query->fetchAll(PDO::FETCH_CLASS, 'User');
        if (count($result) == 1) {
            return true;
        }
        return false;        
}
    function checkRole (string $username, string $password) 
    {
        global $pdo;
        $query = $pdo->prepare("SELECT role FROM customer WHERE username = :user AND password =:password");
        $query->bindParam(":role", $role);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_CLASS);
        if (count($result) == 1) {
            return true;
        }
        return false; 
    }

    ?>

