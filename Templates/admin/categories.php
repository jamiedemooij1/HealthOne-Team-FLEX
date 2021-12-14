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
            <li class="breadcrumb-item"><a href="/categories">Categories</a></li>
        </ol>
    </nav>
    
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Afbeelding</th>
      <th scope="col">Naam</th>
      <th scope="col">Categorie</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
  <?php
    //  global $categories;
    foreach ($product as &$product):?> 
    <tr>
    <td><?=$product->product_id?></td>
      <th scope="row"><img class='product-img img-responsive center-block' src="<?php$product->Picture?>"
      width="50px"></th>
      <td><?=$product->Name ?></td>
      <td><?=$product->category_name ?></td>
      <td><a href="/admin/products/<?= $product->product_id?>/delete" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="iconify bi bi-trash-fill" viewBox="0 0 16 16">
  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
</svg></a></span></td>
    <?php //var_dump($product->Picture);?>
    </tr>
    <?php endforeach ?>    
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