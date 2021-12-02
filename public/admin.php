<?php
global $params;

if (!isAdmin()) {
    logout();
    header ("Location:/home");
} else {
    switch ($params[2]) {
        case 'home':
            include_once "../Templates/admin/home.php";
            break;
        case 'categories':
            include_once "../Templates/admin/categories.php";
            break;
        case 'products':
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
        default:
            include_once "../Templates/admin/home.php";
            break;
}
}