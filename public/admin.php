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
            case 'products':
                
                if (isset($params[3]) && isset($params[4])) {
                    $productId = $params[3];
                    $delete = $params[4];
                    if ($delete) {
                        deleteProduct($productId);
                    }
                }
                $product = getAllProducts();    
                var_dump($params[3], $params[4]);
                include_once "../Templates/admin/categories.php";
                break;
            case 'cat':
                include_once "../Templates/admin/products.php";
                break;
            case 'product':
                include_once "../Templates/admin/product.php";
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
