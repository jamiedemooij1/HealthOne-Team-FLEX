<?php
    if ($_SESSION['username']) {
        $params = explode("/", $request);
        $titleSuffix = ' | Account';
        $contact = getContact();
        //$review = getReview();
        include_once "../Templates/account.php";
    } else { 
        
        include_once ('defaults/header.php');
        include_once ('defaults/menu.php');
        
        echo "
        <div class='row'>
                        
        <article class='inlogblok'>
            <form method='post'>
                <h4>Inloggen HealthOne</h4>
                <label for=''>Username</label><br>
                <input type='text' name='username' required>
                <br>
                <label for=''>Wachtwoord</label><br>
                <input type='password' name='password' required><br><br>
                
                <input type='submit' name='inloggen' value='inloggen' >
                <label for='' name='loginStatus'></label>
            </form>
        </article>
    </div>
        ";
    }

?>
<!DOCTYPE html>
    <html>

    <?php
    include_once('defaults/head.php');
    ?>
    <body>
        <div class="container-fluid">
               
               
                    
                    <hr>
                
                <?php
                include_once ('defaults/footer.php');
                ?>

        </div>
        <script src="/public/js/action.js"></script>

    </body>
</html>
