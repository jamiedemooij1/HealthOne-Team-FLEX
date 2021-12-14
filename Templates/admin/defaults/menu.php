<nav class="navbar navbar-expand-lg navbar-danger bg-danger">
    <div class="container-fluid">
        <a class="navbar-brand" href="/admin/home">
            Sportcenter
        </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNavbar" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="/admin/home">home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/products">product overview</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/contact">contact</a>
                </li>
            </ul>        
            <?php 
            
                $db = new PDO("mysql:host=localhost;dbname=healthone", "root", "");
                $query = $db->prepare("SELECT profile FROM customer WHERE username = :username");
                $query->bindParam('username', $_SESSION['username']);
                $query->execute();
                $result = $query->fetch();
                
                echo "
                <ul class='navbar-nav ms-auto menu-box'>
                <li class='nav-item'>
                <a class='nav-link' href= /uitloggen><input class='logout' type='submit' name='uitloggen' value='uitloggen'></a>
                </li>
                <li class='nav-item profile'>
                <div class='dropdown'>
                    <img src='" . $result['profile'] . "' style='width: 40%; border-radius: 30%;' alt=''>
                    <div class='dropdown-content'>
                        <a href='/admin/account'>Account</a>
                        <a href='/admin/password'>Wachtwoord aanpassen</a>
                        <a href='#'>Link 3</a>
                    </div>
                </div>
                </li>
                ";
                
                    
                 
            ?>
                    <!--<a class='nav-link' href= /inloggen>inloggen</a>-->
                
            </ul>
        </div>
    </div>
</nav>