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
      </svg></a><a href="/admin/updateproduct"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-pencil-square btn-success" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg></a></td>
    </tr>
    <i class="fas fa-plus"></i>
    <?php endforeach ?>
    <tr> 
      <td></td>
      <td>Voeg apparaat toe</td>
      <td><a href="/admin/addproduct"><img src="/public/img/products/icon.png" style="width:10%;"></a></td>
    </tr>
  </tbody>
  </table>
  <hr>
  <?php  
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