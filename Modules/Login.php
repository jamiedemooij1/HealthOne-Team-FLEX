<?php 

    /*function checkLogin (string $username, string $password)
    {
            global $pdo;
            $query = $pdo->prepare("SELECT username, role FROM customer WHERE username = :username AND password =:password");
            $query->bindParam(1, $username);
            $query->bindParam(2, $password);
            $query->execute(); 
            $result = $query->fetchAll(PDO::FETCH_CLASS, 'User');
            if (count($result) == 1) {
                return true;
            }
            return false;        
    }*/
    function checkAdmin():string {
        global $pdo;
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');

        if ($username !==null && $username !==false && !empty($password)) {
            $sql = 'SELECT * FROM customer WHERE username = :e AND password = :p';

            $sth = $pdo->prepare($sql);
            $sth->bindParam(':e', $username);
            $sth->bindParam(':p', $password);
            $sth->setFetchMode(PDO::FETCH_CLASS, 'User');
            $sth->execute();
            $user = $sth->fetch();

            if ($user !== false) {
                $_SESSION['user'] = $user;
                if ($_SESSION['user']->role=="admin") {
                    return 'ADMIN';
                } else {
                    return 'USER';
                }
            }
            return 'FAILURE';
        }
        return 'INCOMPLETE';
    }
    function isAdmin():bool 
    {
        if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
            $username=$_SESSION['user'];
            if ($username->role == "admin")
            {
                return true;
            } else {
                return false;
            }
        }
        return false; 
    }
?>

