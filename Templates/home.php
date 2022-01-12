<!DOCTYPE html>
    <html>

    <?php
    include_once('defaults/head.php');
    ?>
    <body>
        <div class="container-fluid home-page">
                <?php
                include_once ('defaults/header.php');
                include_once ('defaults/menu.php');
                include_once ('defaults/pictures.php');
                ?>
                <div class="row">
                    <?php
                    try {
                            $db = new PDO("mysql:host=localhost;dbname=healthone", "root", "");
                            $query = $db->prepare("SELECT * FROM home" );
                            $query->execute();
                            $result = $query->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($result as &$data) {
                                echo "<div class='flex-column home-info'>";
                                    echo "<h4>" . $data["title"] ."</h4>";
                                    echo "<p>"  . $data["description"] . "</p>";
                                echo "</div>";
                            }            
                        }
                        catch (PDOException $e) {
                            die("Error! : " . $e->getMessage());
                        }


                    global $newsblog;
                    echo "<div class='flex-column home-info newsblog'>";
                    echo "<h3>Nieuwsblog</h3>";
                    foreach ($newsblog as &$data) {
                        echo "<div>";
                        echo "<p> -$data->title </p>";
                        echo "<p>$data->date</p>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
                <hr>
                <?php
                include_once ('defaults/footer.php');
                ?>

        
        <script src="/public/js/action.js"></script>

    </body>
</html>
