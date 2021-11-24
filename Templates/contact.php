<?php
  ?>
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
                <h5>Openingstijden</h5><br>
                <?php
                    try {
                            $db = new PDO("mysql:host=localhost;dbname=healthone", "root", "");
                            $query = $db->prepare("SELECT * FROM opening" );
                            $query->execute();
                            $result = $query->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($result as &$data) {
                                echo "<p class='hours'>"  . $data["day"] . " " . $data["hours"] . "</p>";
                            }            
                        }
                        catch (PDOException $e) {
                            die("Error! : " . $e->getMessage());
                        }
                ?>
                </div>
            </div>
            <?php
           
            include_once ('defaults/footer.php');
            ?>

        </div>
    </body>
</html>
