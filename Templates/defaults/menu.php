<nav class="navbar navbar-expand-lg navbar-danger bg-danger">
    <div class="container-fluid">
        <a class="navbar-brand" href="/home">
            Sportcenter
        </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNavbar" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="/home">home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/categories">sportapparaat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">contact</a>
                </li>
            </ul>
                    <?php 
                    
                        if ($_SESSION['login'] == true) {
                            $db = new PDO("mysql:host=localhost;dbname=healthone", "root", "");
                            $query = $db->prepare("SELECT profile, info FROM customer WHERE username = :username");
                            $query->bindParam('username', $_SESSION['username']);
                            $query->execute();
                            $result = $query->fetchAll(PDO::FETCH_ASSOC);
                            foreach($result as &$data) {
                            echo "
                            <ul class='navbar-nav ms-auto menu-box dropbox'>
                            <li class='nav-item'>
                            <a class='nav-link' href= /uitloggen><input class='logout' type='submit' name='uitloggen' value='uitloggen'></a>
                            </li>
                            <li class='nav-item profile'>
                            <div class='dropdown'>
                                <img src='" . $data['profile'] . "' style='width: 40%; border-radius: 30%;' alt=''>
                                <div class='dropdown-content'>
                                    <a href='/account'>Account</a>
                                    <a href='/password'>Wachtwoord aanpassen</a>
                                    <a href='#'>Link 3</a>
                                </div>
                            </div>
                            </li>
                            ";
                            }
                           
                        } else {
                            echo 
                            "<ul class='navbar-nav ms-auto'>
                                <li class='nav-item'>
                                    <a class='nav-link'  href='/registreren'>aanmelden</a>
                                </li>
                                <li class='nav-item'>
                            <a class='nav-link' href= /inloggen>inloggen</a> 
                            </li>";
                        }
                    ?>
                    <!--<a class='nav-link' href= /inloggen>inloggen</a>-->
                
            </ul>
        </div>
    </div>
</nav>