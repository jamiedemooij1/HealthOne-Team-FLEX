<!DOCTYPE html>
    <html>

    <?php
    include_once('defaults/head.php');
    ?>
    <body>
        <div class="container-fluid">
                <?php
                include_once ('defaults/header.php');
                include_once ('defaults/menu.php');
                ?>
                <div class="row">
                    <div class="flex-column">
                        <h4>Contact HealthOne</h4>
                        <p>Wilt u graag eens langskomen om te komen voor een proefles of wilt u graag een coachinggesprek? <br> 
                        Kom langs op onze locatie </p>
                    <?php 
                    global $contact;
                    echo "<p> " . $data->name . "</p>
                         <p> " . $data->adres . "</p>
                         <p> " . $data->postcode . "</p>
                         <p> " . $data->place . "</p>
                         <p> " . $data->phone . "</p>";
                    ?>

                    </div>
                    <div class="flex-column">
                        

                    </div>
                    <hr>
                </div>
                <?php
                include_once ('defaults/footer.php');
                ?>

        </div>
    </body>
</html>