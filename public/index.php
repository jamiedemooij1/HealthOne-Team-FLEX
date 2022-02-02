<?php
require '../Modules/Categories.php';
require '../Modules/Products.php';
require '../Modules/Contact.php';
require '../Modules/Database.php';
require '../Modules/Reviews.php';
require '../Modules/Login.php';
require '../Modules/View.php';
require '../Modules/Fileupload.php';
require '../Modules/Newsblog.php';
session_start();
$getMenus = getMenu();
define("DOC_ROOT", realpath(dirname(__DIR__)));
define("TEMPLATE_ROOT", realpath(DOC_ROOT . "/Templates"));
$request = $_SERVER['REQUEST_URI'];
$params = explode("/", $request);
$title = "HealthOne";
$titleSuffix = "";

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
                $username = $_SESSION['username'];
                $userid = getUserForReview($username);
                if(isset($_POST['name']) && isset($_POST['review'])) {
                    saveReview($_POST['name'],$_POST['review']);
                }
                $productpage = getProductInformation($productId);
                include_once "../Templates/product.php";
                
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
            /*$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
            $wachtwoord = $_POST['password'];*/
            //$checkLoginning = checkLogin($username, $wachtwoord);
            
            $result = checkAdmin();
            var_dump($result);
            switch ($result) {
                case 'ADMIN':
                    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
                    $wachtwoord = $_POST['password'];
                    $_SESSION['login'] = true;
                    $_SESSION['username'] = $username;
                    $_SESSION['password'] = $wachtwoord;
                    $_SESSION['role'] = $checkRole->role;
                    header('Location: /admin/home');

                break;
                
                case 'USER':
                    
                    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
                    $wachtwoord = $_POST['password'];
                    header('Location: /account');
                    
                    $_SESSION['login'] = true;
                    $_SESSION['username'] = $username;
                    $_SESSION['password'] = $wachtwoord;
                    $_SESSION['role'] = $checkRole->role;
                    include_once "../Templates/account.php";
                break;
                case 'FAILURE':
                    $message = "Gebruikersnaam of wachtwoord is niet correct ingevuld!";
                    include_once("../Templates/inloggen.php");       
                break;
                case 'INCOMPLETE':
                    $message = "Niet alle velden zijn ingevuld!";
                    include_once("../Templates/inloggen.php");    
                break;
            }
            
        } else {
            include_once("../Templates/inloggen.php");
        }
        break;
    case 'uitloggen':
        $titleSuffix = ' | Uitloggen';
        $_SESSION['login'] = false;
        if (isset($_POST['inloggen'])) {
            $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
            $wachtwoord = $_POST['password'];
            //$checkLoginning = checkLogin($username, $wachtwoord);
            
            $result = checkAdmin();
            switch ($result) {
                case 'ADMIN':
                    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
                    $wachtwoord = $_POST['password'];
                    $_SESSION['login'] = true;
                    $_SESSION['username'] = $username;
                    $_SESSION['password'] = $wachtwoord;
                    $_SESSION['role'] = $checkRole->role;
                    include_once "../Templates/admin/home.php";
                break;
                case 'USER':
                    var_dump($result);
                    header('Location: /account');
                    $_SESSION['login'] = true;
                    $_SESSION['username'] = $username;
                    $_SESSION['password'] = $wachtwoord;
                    $_SESSION['role'] = $checkRole->role;
                    include_once "../Templates/account.php";
                break;
                case 'FAILURE':
                    $message = "Gebruikersnaam of wachtwoord is niet correct ingevuld!";
                    include_once("../Templates/inloggen.php");
                    
                break;
                case 'INCOMPLETE':
                    $message = "Niet alle velden zijn ingevuld!";
                    include_once("../Templates/inloggen.php");
                    
                break;
            }
        } else {
            include_once("../Templates/uitloggen.php");
        }
        break;
    case 'registreren':
        $titleSuffix = ' | Registreren';
        include_once "../Templates/registreren.php";
        break;
    case 'change':
    $titleSuffix = ' | Registreren';
    include_once "../Templates/change.php";
    break;
    case 'contact':
        $titleSuffix = ' | Contact';
        $contact = getContact();
        include_once "../Templates/contact.php";
        break;
    case 'admin':  
        $_SESSION['login'] = true;  
        $getMenu = getAdminMenu();  
        include_once ('admin.php');
        break;
    case 'account':
        $_SESSION['login'] = true;
        $username = $_SESSION['username'];
        
        $userid = getUserForReview($username);
        foreach($userid as &$data){
            $personalReviews = getPersonalReviews($data->id);
        }
        if (isset($_POST['uitloggen'])) {
            $_SESSION['login'] = false;
            echo $_SESSION['login'];
        }
        $titleSuffix = ' | Account';
        $contact = getContact();
        include_once "../Templates/account.php";
        break;
    default:
        $titleSuffix = ' | Home';
        $newsblog = getNewsblog();
        include_once "../Templates/home.php";


}

function getTitle() {
    global $title, $titleSuffix;
    return $title . $titleSuffix;
}
function showUserReview(){

}
?>