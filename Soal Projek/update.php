<?php

require('functions.php');

$id = $_GET['id'];

$val = query("SELECT * FROM provinsi_tb WHERE id_prov = $id")[0];

if(isset($_POST['update-btn'])){
  if(update($_POST) > 0){
    echo "<script>alert('Data Provins Berhasil di Ubah')
           document.location.href = 'index.php';
            </script>";
  }else{
    echo "<script>alert('Data Provinsi Gagal di Ubah')
            document.location.href = 'index.php';
            </script>";
  }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Pokemon</title>
  </head>
  <body>

   <div class="container">

    <div class="row mt-3 mb-3">
      <div class="col">
        <h3>Update Pokemon</h3>
      </div>
    </div>


    <div class="row ml-3">
      <div class="col-sm-5">
           <form action="" method="post" enctype="multipart/form-data">
             
                      <div class="form-group">
                        <input type="hidden" class="form-control" name="id-prov" value="<?= $val['id_prov']; ?>">
                      </div>
                      <div class="form-group">
                        <input type="hidden" class="form-control" name="oldPicture" 
                         value=<?= $val['photo_prov']; ?>>
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" name="name-prov" placeholder="Nama Provinsi"
                         value="<?= $val['nama_prov']; ?>">
                      </div>
                      <div class="form-group">
                        <input type="date" class="form-control" name="resmi-prov"
                         value="<?= $val['prov_resmi']; ?>">
                      </div>
                      <div class="form-group">
                        <img src="img/<?= $val['photo_prov'] ?>" width=100px heigth=100px>
                        <input type="file" name="picture">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" name="pulau" placeholder="Pulau"
                       value="<?= $val['pulau']; ?>">
                      </div>
                      <div class="modal-footer">
                        <a href="index.php" class="btn btn-secondary">Cancel</a>
                        <button type="submit" name="update-btn" class="btn btn-primary">Update</button>
                      </div>
                </form>
      <div class="col">
    </div>

  </div>
  
  

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
