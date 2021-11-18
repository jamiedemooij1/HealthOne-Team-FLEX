<!DOCTYPE html>
    <html>

    <?php
    include_once('defaults/head.php');
    include_once ('defaults/header.php');
    include_once ('defaults/menu.php');
    ?>
    <body>
        <div class="container-fluid">
        <div class='row'>
                        
                        <article class='inlogblok'>
                            <form action='' method='post'>
                                <h4>Inloggen HealthOne</h4>
                                <label for=''>Gebruikersnaam</label><br>
                                <input type='text' name='username' required>
                                <br>
                                <label for=''>Wachtwoord</label><br>
                                <input type='password' name='password' required><br><br>
                                
                                <input type='submit' name='inloggen' value='inloggen'>
                                <label for='' name='loginStatus'></label>
                            </form>
                        </article>
                    </div>
               
                    
                    <hr>
                
                <?php
                include_once ('defaults/footer.php');
                ?>

        </div>
    </body>
</html>