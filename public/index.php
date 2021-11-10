<?php
require '../Modules/Categories.php';
require '../Modules/Products.php';
require '../Modules/Contact.php';
require '../Modules/Database.php';
require '../Modules/Reviews.php';

$request = $_SERVER['REQUEST_URI'];
$params = explode("/", $request);
$title = "HealthOne";
$titleSuffix = "";
include_once "../Modules/Login.php";

switch ($params[1]) {
    case 'categories':
        $titleSuffix = ' | Categories';
        
        if (isset($_GET['category_id'])) {
            $categoryId = $_GET['category_id'];
            $products = getProducts($categoryId);
            $name = getCategoryName($categoryId);

            if (isset($_GET['product_id'])) {
                $productId = $_GET['product_id'];
                $product = getProductInformation($productId);
                $titleSuffix = ' | ' . $product[0]->Name;
                $reviews=getReview($productId);
                if(isset($_POST['name']) && isset($_POST['review'])) {
                    saveReview($_POST['name'],$_POST['review']);
                }
                $productpage = getProductInformation($productId);
                include_once "../Templates/product.php";
                $review = getReview();
                
                // TODO Zorg dat je hier de product pagina laat zien
            } else {
                // TODO Zorg dat je hier alle producten laat zien van een categorie
                $getproducts = getProducts($categoryId);
                include_once "../Templates/products.php";
                
            }

        } else {
            // TODO Toon de categorieen
            $categories = getCategories();
            include_once "../Templates/categories.php";
        }
        break;
    case 'inloggen':
        $titleSuffix = ' | Inloggen';
        
        if (isset($_POST['inloggen'])) {
            $gebruikersnaam = filter_input(INPUT_POST, "gebruikersnaam", FILTER_SANITIZE_STRING);
            $wachtwoord = $_POST['wachtwoord'];
            $checkLoginning = checkLogin();
            /*if ($query->rowCount() == 1) {
                $result = $query->fetch(PDO::FETCH_ASSOC);
                if (password_verify($wachtwoord, $result["wachtwoord"])) {
                    echo "Juiste gegevens!";
                } else {
                    echo "Onjuiste gegevens!";
                }
            } else {
                echo "Onjuiste gegevens!";
            }
            echo "<br>";*/
            }

            
        include_once "../Templates/inloggen.php";

        break;
    case 'registreren':
        $titleSuffix = ' | Registreren';
        include_once "../Templates/registreren.php";
        break;
    case 'contact':
        $titleSuffix = ' | Contact';
        $contact = getContact();
        include_once "../Templates/contact.php";
        break;
    case 'account':
        $titleSuffix = ' | Account';
        $contact = getContact();
        //$review = getReview();
        include_once "../Templates/account.php";
        break;
    default:
        $titleSuffix = ' | Home';
        
        include_once "../Templates/home.php";


}

function getTitle() {
    global $title, $titleSuffix;
    return $title . $titleSuffix;
}
?>