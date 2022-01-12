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
    /*
    function checkLogin ():string
    {
        global $pdo;
        //$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');
        $username = filter_input(INPUT_POST, 'email');
        if ($email!==null && $email!==false && !empty($password)) {

            $sql = 'SELECT * FROM customer WHERE username = :e AND password = :p/* AND username = :u*//*';
            $sth = $pdo->prepare($sql);
            $sth->bindParam(':e', $username);
            $sth->bindParam(':p', $password);
            //$sth->bindParam(':u', $username);
            $sth->setFetchMode(PDO::FETCH_CLASS, 'User');
            $sth->execute();
            $user = $sth->fetch();

            if ($user!==false) {

                    $_SESSION['user']=$user;
                    if ($_SESSION['user']->role=="admin") {
                        return 'admin';
                    } else {
                        return 'user';
                    }
            }
            return 'failure';
        }
        return 'incomplete';
    }
    function isAdmin():bool 
    {
        if (isset($_SESSION['user']) && !empty($_SESSION['user']))
        {
            $user=$_SESSION['user'];
            if ($user->role =="admin") {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }*/


    if (isset($_POST['inloggen'])) {
            $results = checkLogin();
                switch($results) {
                    case 'admin':
                        header("Location: /admin/account");
                        $_SESSION['login'] = true;
                        $_SESSION['username'] = $gebruikersnaam;
                        include_once "../Templates/admin/account.php";
                        break;
                    case 'user':
                        header('Location: /account');
                        $_SESSION['login'] = true;
                        $_SESSION['username'] = $gebruikersnaam;
                        
                        $titleSuffix = ' | Account';
                        $contact = getContact();
                        include_once "../Templates/account.php";
                        break;
                    case 'failure':
                        $message = "Email of wachtwoord is niet correct ingevuld!";
                        include_once "../Templates/inloggen.php";
                        break;
                    case 'incomplete':
                        $message = "Formulier niet volledig ingevuld!";
                        include_once "../Templates/inloggen.php";
                        break;
                }
            } else {
                include_once "../Templates/inloggen.php";
            }
            break;
            /*$gebruikersnaam = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
            $status = filter_input(INPUT_POST, "role", FILTER_SANITIZE_STRING);
            $wachtwoord = $_POST['password'];
            
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
            } else {
                echo "Login failed";
            }   
        }
        include_once "../Templates/inloggen.php";