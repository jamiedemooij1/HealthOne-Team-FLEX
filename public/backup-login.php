if ($checkLoginning == true) {
                echo $status;
                header('Location: /account');
                $_SESSION['login'] = true;
                $_SESSION['username'] = $gebruikersnaam;
                
                $titleSuffix = ' | Account';
                $contact = getContact();
                //$review = getReview();
                include_once "../Templates/account.php";
                if ($_SERVER["REQUST_METHOD"] == "POST") {
                    $sql =  "select * from username where username='" . $gebruikersnaam . "' AND password='" . $wachtwoord .  "'";
                    $result = mysqli_query($data, $sql);
                    $row = mysqli_fetch_array($result);
                    if ($row['role'] == "user") {
                        header('Location: /account');
                        $_SESSION['login'] = true;
                        $_SESSION['username'] = $gebruikersnaam;
                        
                        $titleSuffix = ' | Account';
                        $contact = getContact();
                        //$review = getReview();
                        include_once "../Templates/account.php";
                    } else if ($row['role'] == "admin") {
                        header('Location: /admin');
                        $_SESSION['login'] = true;
                        $_SESSION['username'] = $gebruikersnaam;
                        $titleSuffix = ' | Account';
                        $contact = getContact();
                        //$review = getReview();
                        include_once "../Templates/admin/account.php";
                    }
                }
            }


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