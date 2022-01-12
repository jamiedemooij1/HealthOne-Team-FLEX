<html>
<head>
  <style>

  </style>
</head>
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
      <td><label for=""  class="addLabel">ID </label>
      <input type="number" name="idU" min=9 class="addForm" value="<?php echo $id; ?>"></td><br><br>
      <td><label for="" class="addLabel"> Afbeelding </label>
      <input type="text" name="imgU" class="addForm" value="<?php echo $image; ?>"></td><br><br>
      <td><label for="" class="addLabel"> Naam </label>
      <input type="text" name="nameU" class="addForm" value="<?php echo $name; ?>"></td><br><br>
      <td><label for="" class="addLabel"> Beschrijving</label>
      <input type="text" name="descriptionU" class="addForm"></td><br><br>
      <td><label for="" class="addLabel"> Categorie ID</label>
      <input type="number" min=1 max=4 name="category" class="addForm" ><br><br>
      <td><a href="/admin/productview/add"><input type="submit" value="Opslaan" name="update" class="addForm"></a></td>
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