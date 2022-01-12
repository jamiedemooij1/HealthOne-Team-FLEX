<?php

//require '../Modules/Login.php';
//require '../Modules/Categories.php';
//require '../Modules/Products.php';
global $params;
if (!isAdmin()) {
    //checkLogin();
    header('location:/Templates/admin/home.php');
}

else {    
        switch ($params[2]) {
            case 'home':
                include_once "../Templates/admin/home.php";
                break;
            case 'productview':
                $getCategory = menuCategory();
                if (isset($params[3]) && isset($params[4])) {
                    $productId = $params[3];
                    $delete = $params[4];
                    if ($delete) {
                        $count = deleteProduct($productId);
                        if ($count === 1) {

                        } else {
                            
                        }
                    }
                } else if (isset($params[3]) == "add") {
                    $add = $params[3];
                    if ($add) {
                        $count = addProduct();
                        if ($count === 1) {

                        } else {
                         
                       }
                    } 
                }
                
                $product = getAllProducts();    
                include_once "../Templates/admin/productview.php";
                break;
            case 'contact':
                $contact = getContact();
                include_once "../Templates/admin/contact.php";
                break;
            case 'addproduct':
                $categories = getCategories();
                if (isset($_POST["adding"])) {
                    $id = FILTER_INPUT(INPUT_POST, 'id');
                    $name = FILTER_INPUT(INPUT_POST, 'name');
                    $image = FILTER_INPUT(INPUT_POST, 'img');
                    $category = FILTER_INPUT(INPUT_POST, 'category');
                    $description = FILTER_INPUT(INPUT_POST, 'description');
                    var_dump($name);
                    $path = fileupload("img");
                    if ($path === false) {
                        echo "Incorrect image";
                        echo "Try again";
                    } else {
                        addProduct($id, $name, $path, $description, $category);
                        
                        echo "File upload successed";
                    }
                }
                
                include_once "../Templates/admin/addproduct.php";
                break;
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
                    include_once "../Templates/admin/product.php";
                    $review = getReview();
                    
                    // TODO Zorg dat je hier de product pagina laat zien
                } else {
                    // TODO Zorg dat je hier alle producten laat zien van een categorie
                    $getproducts = getProducts($categoryId);
                    include_once "../Templates/admin/products.php";      
                }

            } else {
                // TODO Toon de categorieen
                $categories = getCategories();
                include_once "../Templates/admin/categories.php";
            }
            break;
            case 'addproducts':
                include_once "../Templates/admin/home.php";
                break;
            case 'deleteproducts':
                include_once "../Templates/admin/home.php";
                break;
            case 'reviews':
                include_once "../Templates/admin/home.php";
                break;
            case 'account':
                include_once "../Templates/admin/account.php";
                break;
            default:
                include_once "../Templates/admin/home.php";
                break;
            } 
    }
