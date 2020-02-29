<?php
include 'functions.php';

$prov = query("SELECT * FROM provinsi_tb");
?>
<!doctype html>
<html lang="en">
 <head> 
  <!-- Required meta tags --> 
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
  <!-- Bootstrap CSS --> 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> 
  <title>Data Provinsi</title> 
 </head> 
 <body> 
  <div class="container"> 
   <div class="row mt-3 mb-3"> 
    <div class="col"> 
     <h3>All Database</h3> 
    </div> 
   </div> 
   <div class="row mt-3 mb-3 ml-1"> 
    <div class="col"> 
     <button type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target="#exampleModal2">Tambah Provinsi</button> 
     <button type="button" class="btn btn-info mr-2" data-toggle="modal" data-target="#exampleModal1">Tambah Kabupaten</button> 
    </div> 
   </div> 
   <div class="row"> 
     <?php foreach($prov as $p) : ?>
    <div class="col-sm-4"> 
     <div class="card"> 
      <img src="img/<?= $p['photo_prov']; ?>" class="card-img-top" alt="..."> 
      <div class="card-body"> 
       <h5 class="card-title"><?= $p['nama_prov']; ?></h5> 
       <p class="card-text"><b><?= $p['prov_resmi']; ?></b></p> 
       <p class="card-text"><b><?= $p['pulau']; ?></b></p> 
       <a href="detail.php?id=<?= $p['id_prov']; ?>" class="btn btn-success">See Detail</a> 
       <a href="hapus.php?id=<?= $p['id_prov']; ?>" class="btn btn-danger" onclick="return confirm('Yakin Mau Hapus Buku?');">Delete</a> 
       <a href="update.php?id=<?= $p['id_prov']; ?>" class="btn btn-primary">Edit</a> 

      </div> 
     </div> 
    </div> 
      
    <?php endforeach; ?>
   </div> 
     
  </div> 
  <!-- Modal --> 
  
  
  <?php 
    if(isset($_POST['editProv'])){
      if(editProv($_POST) > 0){
        echo "<script>alert('success')
              document.location.href = 'index.php';
            </script>";
      }else{
        echo "<script>alert('failed')
              document.location.href = 'index.php';
            </script>";
      }
    }
  ?> 
  <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
   <div class="modal-dialog" role="document"> 
    <div class="modal-content"> 
     <div class="modal-header"> 
      <h5 class="modal-title" id="exampleModalLabel">Tambah Provinsi</h5> 
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button> 
     </div> 
     <div class="modal-body"> 
      <form action="" method="post" enctype="multipart/form-data"> 
       <div class="form-group"> 
        <label>Provinsi :</label> 
        <input type="text" class="form-control" name="name-prov" placeholder="Nama Provinsi"> 
       </div> 
       <div class="form-group"> 
        <label>Diresmikan :</label> 
        <input type="date" class="form-control" name="resmi-prov" placeholder="Diresmikan"> 
       </div> 
       <div class="form-group"> 
        <input type="file" name="picture"> 
       </div> 
       <div class="form-group"> 
        <label>Pulau :</label> 
        <input type="text" class="form-control" name="pulau" placeholder="Pulau"> 
       </div> 
       <div class="modal-footer"> 
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button> 
        <button type="submit" name="editProv" class="btn btn-primary">Add</button> 
       </div> 
      </form> 
     </div> 
    </div> 
   </div> 
  </div> 
  <!-- Modal -->
  
  <?php 
    if(isset($_POST['tambahKab'])){
      if(addKab($_POST) > 0){
        echo "<script>alert('success')
            document.location.href = 'index.php';
        </script>";
      }else{
        echo "<script>alert('failed')
            document.location.href = 'index.php';
        </script>";
      }
    }
  ?>
  <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
   <div class="modal-dialog" role="document"> 
    <div class="modal-content"> 
     <div class="modal-header"> 
      <h5 class="modal-title" id="exampleModalLabel">Tambah Kabupaten</h5> 
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button> 
     </div> 
     <div class="modal-body"> 
      <form action="" method="post" enctype="multipart/form-data"> 
       <div class="form-group"> 
        <label>Kabupaten :</label> 
        <input type="text" class="form-control" name="name-kab"> 
       </div> 
       <div class="form-group"> 
        <button type="button" class="btn btn-info mr-2" data-toggle="modal" data-target="#exampleModal4">Info Prov ID</button> 
        <br> 
        <label>Prov ID :</label> 
        <input type="text" class="form-control" name="prov-id"> 
       </div> 
       <div class="form-group"> 
        <label>Diresmikan :</label> 
        <input type="date" class="form-control" name="resmi-kab"> 
       </div> 
       <div class="form-group"> 
        <input type="file" name="picture"> 
       </div> 
       <div class="modal-footer"> 
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button> 
        <button type="submit" class="btn btn-primary" name="tambahKab">Tambah</button> 
       </div> 
      </form> 
     </div> 
    </div> 
   </div> 
  </div> 
  
  <?php 
    if(isset($_POST['tambahProv'])){
      if(addProv($_POST) > 0){
        echo "<script>alert('success')
              document.location.href = 'index.php';
            </script>";
      }else{
        echo "<script>alert('failed')
              document.location.href = 'index.php';
            </script>";
      }
    }
  ?> 
  <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
   <div class="modal-dialog" role="document"> 
    <div class="modal-content"> 
     <div class="modal-header"> 
      <h5 class="modal-title" id="exampleModalLabel">Tambah Provinsi</h5> 
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button> 
     </div> 
     <div class="modal-body"> 
      <form action="" method="post" enctype="multipart/form-data"> 
       <div class="form-group"> 
        <label>Provinsi :</label> 
        <input type="text" class="form-control" name="name-prov" placeholder="Nama Provinsi"> 
       </div> 
       <div class="form-group"> 
        <label>Diresmikan :</label> 
        <input type="date" class="form-control" name="resmi-prov" placeholder="Diresmikan"> 
       </div> 
       <div class="form-group"> 
        <input type="file" name="picture"> 
       </div> 
       <div class="form-group"> 
        <label>Pulau :</label> 
        <input type="text" class="form-control" name="pulau" placeholder="Pulau"> 
       </div> 
       <div class="modal-footer"> 
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button> 
        <button type="submit" name="tambahProv" class="btn btn-primary">Add</button> 
       </div> 
      </form> 
     </div> 
    </div> 
   </div> 
  </div> 
  <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
   <div class="modal-dialog" role="document"> 
    <div class="modal-content"> 
     <div class="modal-header"> 
      <h5 class="modal-title" id="exampleModalLabel">Prov ID Info</h5> 
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button> 
     </div> 
     <div class="modal-body"> 
      <?php foreach($prov as $p) : ?> 
      <?php echo "Prov ID ".$p['id_prov']. " = ". $p['nama_prov']; ?> 
      <?= "<br>"; ?>
      <?php endforeach; ?> 
      <br> 
      <b>Jika ID Prov Tidak Tersedia Silahkan Input Provinsi Baru!!</b> 
     </div> 
     <div class="modal-footer"> 
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
     </div> 
    </div> 
   </div> 
  </div> 
  <!-- Optional JavaScript --> 
  <!-- jQuery first, then Popper.js, then Bootstrap JS --> 
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> 
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> 
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> 
 </body>
</html>
