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
                include_once ('defaults/pictures.php');
                ?>
                <div class="row">
                    <div class="column first-col">

                        <h4>Favorieten</h4><br>
                        <h5>Roeiapparaat</h5>
                        <figure>
                            <img class="img-account" src="https://www.fitgear.nl/2391-thickbox_default/roeiapparaat-dunlop-air-750-roeitrainer.jpg" />
                        </figure>
                        <h5>Loopband</h5>
                        <figure>
                            <img class="img-account" src="https://cdn.webshopapp.com/shops/281654/files/282878592/loopband-fitrun-50i.jpg" />
                        </figure>
                        <h5>..</h5>
                        <figure>
                            <img class="img-account" src="" />
                        </figure>

                    </div>
                    <div class="column">
                    
                        <h4 class="article-head">Mijn reviews</h4>
                        <article class="article-one">
                            <?php 
                                global $review;
                                echo "
                                    <h5><b>" . $review['title'] . "</b></h5>
                                    <p>" . $review['description'] . "</p>";
                            ?>
                        </article>
                        
                        
                    </div>
                    
                    <div class="column">
                    <figure>
                        <img class="banner-img img-profile" src='https://i.pinimg.com/736x/89/5e/4b/895e4bb9f86613d924162d509752b536.jpg' />
                    </figure>
                    <article class="article-two">
                    <h4>Account informatie</h4>
                    <p>
                        Abonnement: geldig tot 01/09/2023<br>
                        Geslacht: Man<br>
                        Lengte: 1.75 meter<br>
                        Naam: Mark Rutte
                    </p>                    
                    </article>
                    
                    </div>
                    <hr>
                </div>
                <?php
                include_once ('defaults/footer.php');
                ?>

        </div>
    </body>
</html>
