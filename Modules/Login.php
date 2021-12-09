<?php 
function checkLogin (string $username, string $password)
{
        global $pdo;
        $query = $pdo->prepare("SELECT username, role FROM customer WHERE username = :user AND password =:password");
        $query->bindParam(1, $username);
        $query->bindParam(2, $password);
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
        $sth = $pdo->prepare("SELECT username, role FROM customer WHERE username = ? && password = ?");
        $sth->bindParam(1, $username);
        $sth->bindParam(2, $password);
        $sth->setFetchMode(PDO::FETCH_CLASS, User:: class);
        $sth->execute();
        $user = $sth->fetch();
        var_dump($user);
    }
    ?>

