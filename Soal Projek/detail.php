<?php
  
include 'functions.php';

$id = $_GET['id'];

$kab = query("SELECT * FROM kabupaten_tb JOIN provinsi_tb ON provinsi_tb.id_prov = '$id' AND kabupaten_tb.prov_id = provinsi_tb.id_prov");

?>
<!doctype html>
<html lang="en">
 <head> 
  <!-- Required meta tags --> 
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
  <!-- Bootstrap CSS --> 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> 
  <title>Data Kabupaten</title> 
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
     <?php foreach($kab as $p) : ?>
    <div class="col-sm-4"> 
     <div class="card"> 
      <img src="img/<?= $p['photo_kab']; ?>" class="card-img-top" alt="..."> 
      <div class="card-body"> 
       <h5 class="card-title"><?= $p['nama_kab']; ?></h5> 
       <p class="card-text"><b><?= $p['kab_resmi']; ?></b></p>   
       <a href="hapus.php?id=<?= $p['id_kab']; ?>" class="btn btn-danger" onclick="return confirm('Yakin Mau Hapus Kabupaten?');">Delete</a> 
        
      </div> 
     </div> 
    </div> 
      
    <?php endforeach; ?>
   </div> 
     
  </div> 
  
  
  <!-- Optional JavaScript --> 
  <!-- jQuery first, then Popper.js, then Bootstrap JS --> 
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> 
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> 
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> 
 </body>
</html>
 