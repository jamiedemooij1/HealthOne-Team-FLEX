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
                <div class="row contact-page">
                    <div class="flex-column contact-page">
                    <figure>
                        <img class="banner-img img-groundplan" src='/public/img/categories/gym.jpg' />
                        <br>
                    </figure>

                    </div>
                    <div class="flex-column contact-page">
                    <h4>Contact HealthOne</h4>
                        <p>Wilt u graag eens langskomen om te komen voor een proefles of wilt u graag een coachinggesprek? <br> 
                        Kom langs op onze locatie </p>
                    <?php 
                    global $contact;
                    echo "
                        <p>Sportschool " . $contact['name'] . "<br>
                         Adres: " . $contact['adres'] . "<br>
                         Postcode: " . $contact['postcode'] . " " .  $contact['place'] ."<br>
                         Telefoonnummer: " . $contact['phone'] . "</p>";
                    ?>
                    <h5>Openingstijden</h5>
                    <p>
                        Maandag 07:00 - 21:00 <br>
                        Dinsdag 07:00 - 21:00 <br>
                        Woensdag 07:00 - 21:00 <br>
                        Donderdag 07:00 - 23:00 <br>
                        Vrijdag 07:00 - 22:00 <br>
                        Zaterdag 08:00 - 21:00 <br>
                        Zondag 10:00 - 20:00
                    </p>
                    </div>
                </div>
                <?php
                include_once ('defaults/footer.php');
                ?>

        </div>
    </body>
</html>
