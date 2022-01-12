<?php
// TODO Zorg dat de methodes goed ingevuld worden met de juiste queries.
function getProducts(int $categoryId)
{
    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $parts = explode('/', $url);
    $number = $parts[count($parts) - 1];
    $db = new PDO("mysql:host=localhost;dbname=healthone", "root", "");
    $query = $db->prepare("SELECT * FROM product WHERE Category_id =$number");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_CLASS);
    return $result;
}

function getProductInformation(int $productId)
{
    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $parts = explode('/', $url);
    $number = $parts[count($parts) - 1];
    $db = new PDO("mysql:host=localhost;dbname=healthone", "root", "");
    $query = $db->prepare("SELECT * FROM product WHERE ID =$number");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_CLASS);
    return $result;
}
 function getAllProducts():array
 {
    global $pdo;
    $sth = $pdo->prepare('SELECT product.ID AS product_id, product.Name, product.Picture, product.Description, product.Category_id, category.ID, category.Name AS category_name
                         FROM product
                         LEFT JOIN category
                         ON product.Category_id = category.ID');
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_CLASS, 'Product');
 }
function deleteProduct(int $id) {
    global $pdo;
    $sth = $pdo->prepare('DELETE FROM product WHERE ID = ?');
    $sth->bindParam(1, $id);
    $sth->execute();
    return $sth->rowCount();
}
function addProduct(string $id, string $name, string $image, string $description, string $category) {
    global $pdo;
    $sth = $pdo->prepare('INSERT INTO product (id, name, Picture, description, Category_id) 
    VALUES(:ID, :Name, :Picture, :Description, :Category_id)');
    $sth->bindParam("ID", $id);      
    $sth->bindParam("Name", $name);
    $sth->bindParam("Picture", $image);
    $sth->bindParam("Description", $description);
    $sth->bindParam("Category_id", $category);
    $sth->execute();
}
function menuCategory() {
    global $pdo;
    $db = new PDO("mysql:host=localhost;dbname=healthone", "root", "");
    $query = $db->prepare("SELECT * FROM category" );
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_CLASS);
    return $result;
}

?>