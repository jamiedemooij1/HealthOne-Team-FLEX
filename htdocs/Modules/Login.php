<?php 
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

