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
    function checkRole () 
    {
        global $pdo;
        $query = $pdo->prepare("SELECT  role FROM customer WHERE username = :user");
        $query->bindParam(":role", $role);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_CLASS, 'User');
        if (count($result) == 1) {
            return true;
        }
        return false; 
    }

