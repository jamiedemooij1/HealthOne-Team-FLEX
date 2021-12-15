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
  
    <form method="post" enctype="multipart/form-data">
    <tr>
      <td><label for="" >ID </label>
      <option value=""></option>
      <select name="Category" id="">
      <?php 
      foreach ($categories as &$data) {
          echo "<option value=" .  $data->Name . "></option> "; 
      }

      ?>
      </select>
      <input type="number" name="id" min=9 ></td>
      <td><label for="" >Afbeelding </label>
      <input type="file" name="img" ></td>
      <td><label for="" >Naam </label>
      <input type="text" name="name" ></td>
      <td><label for="" >Beschrijving</label>
      <input type="text" name="description" ></td>
      <td><label for="" >Categorie ID</label>
      <input type="number" min=1 max=4 name="category" >
      <td><a href="/admin/productview/add"><input type="submit" value="Toevoegen" name="adding"></a></td>
    </tr>
    </form>

  <hr>
  <?php
    
  include_once('defaults/footer.php');
  ?>
</div>

<script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
</body>
</html>