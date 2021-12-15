<html>
<?php
include_once('defaults/head.php');
?>

<body>

<div class="container-fluid">
  <?php
  include_once('defaults/header.php');
  include_once('defaults/menu.php');
  ?>
  <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/home">Home</a></li>
          <li class="breadcrumb-item"><a href="/categories">Product overview</a></li>
      </ol>
  </nav>
  
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Product ID</th>
      <th scope="col">Afbeelding</th>
      <th scope="col">Naam</th>
      <th scope="col">Categorie</th>
      <th scope="col">Delete</th>
      <th>Extra</th>
    </tr>
  </thead>
  <tbody>
  <?php
    //  global $categories;
    foreach ($product as &$product):?> 
    <tr>
      <td><?=$product->product_id?></td>
      <th   ><img class='product-view img-responsive center-block' src="<?php echo $product->Picture?>"
      width="50px"></th>
      <td><?=$product->Name ?></td>
      <td><?=$product->category_name ?></td>
      <td><a href="/admin/productview/<?=$product->product_id?>/delete" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="iconify bi bi-trash-fill" viewBox="0 0 16 16">
      <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
      </svg></a></td>
      
    </tr>
    
    <?php endforeach ?>
    <form method="post">
    <tr>
      <td><label for="" >ID </label><br>
      <input type="number" name="id" min=9 required></td>
      <td><label for="" >Afbeelding </label><br>
      <input type="text" name="picture" required></td>
      <td><label for="" >Naam </label><br>
      <input type="text" name="name" required></td>
      <td><label for="" >Beschrijving</label><br>
      <input type="text" name="description" required></td>
      <td><label for="" >Categorie ID</label><br><br> 
      <input type="number" min=1 max=4 name="category" required>
      <td><a href="/admin/productview/add"><input type="submit" value="Toevoegen" name="adding"></a></td>
    </tr>
    </form>
  </tbody>
  </table>
  <hr>
  <?php
    try {
      global $pdo;
      if (isset($_POST["adding"])) {
          $id = FILTER_INPUT(INPUT_POST, 'id');
          $name = FILTER_INPUT(INPUT_POST, 'name');
          $image = FILTER_INPUT(INPUT_POST, 'picture');
          $category = FILTER_INPUT(INPUT_POST, 'category');
          $description = FILTER_INPUT(INPUT_POST, 'description');
          $sth = $db->prepare('INSERT INTO product (ID, Name, Picture, Description, Category_id) 
                                            VALUES(:ID, :Name, :Picture, :Description, :Category_id)');
          $sth->bindParam("ID", $id);      
          $sth->bindParam("Name", $name);
          $sth->bindParam("Picture", $image);
          $sth->bindParam("Description", $description);
          $sth->bindParam("Category_id", $category);
          if ($sth->execute()) {
            echo "Je product is toegevoegd!"; 
          } else {
            echo "Het toevoegen van een product is niet gelukt...";
          }
      }
    }
      catch (PDOException $e){
        die("Error!: " . $e->getMessage());
    }
    
    
  include_once('defaults/footer.php');
  ?>
</div>
<script src="/public/js/action.js"></script>
<script>
  const deleteButtons = document.querySelectorAll('.btn-danger');
  for (const deleteButton of deleteButtons) {
    deleteButton.addEventListener('click', (event) => {
      const result = window.confirm('Weet je het zeker');
      if (result === false) {
        event.preventDefault();
      }
    })
  }
</script>
<script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
</body>
</html>