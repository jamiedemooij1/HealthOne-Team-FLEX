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
                        <img class="banner-img img-groundplan" src='/public/img/plattegrond.png' />
                        <br>
                    </figure>

                    </div>
                    <div class="flex-column contact-page">
                    
                        <?php 
                        global $contact;
                        echo "
                        <h4>". $contact['title'] . "</h4>
                        <p>" . $contact['description'] . "</p>
                            <p>Sportschool " . $contact['name'] . "<br>
                            Adres: " . $contact['adres'] . "<br>
                            Postcode: " . $contact['postcode'] . " " .  $contact['place'] ."<br>
                            Telefoonnummer: " . $contact['phone'] . "</p>";
                        ?>
                    <h5>Openingstijden</h5>
                    <?php 
                        global $info;
                        foreach($info as &$data)
                        echo "
                            <p>" . $data['day'] . " " . $data['hours'] . "</p>";
                        ?>
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
