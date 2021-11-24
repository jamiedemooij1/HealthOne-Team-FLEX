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
                    ?>
                </div>
                <hr>
                <?php
                include_once ('defaults/footer.php');
                ?>

        </div>
    </body>
</html>
