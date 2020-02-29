<?php
   $username = "root";
   $password = "";
   $server = "localhost";
   $db = "provkab";
   
   $conn = mysqli_connect($server,$username,$password,$db);
    
    
    function query($query){
     global $conn;
     $fetch = mysqli_query($conn, $query);
     $rows = [];
     while($row = mysqli_fetch_assoc($fetch)){
       $rows[] = $row;
     }
     return $rows;
    
    }
    
    
    
    function addKab($data){
      global $conn;
      $nameKab = $data['name-kab'];
      $provid = $data['prov-id'];
      $resmi = $data['resmi-kab'];
      $picture = $data['picture'];
      
      $picture = upload();
      if(!$picture){
        return false;
      }
      
      $query = mysqli_query($conn, "INSERT INTO kabupaten_tb VALUES('','$nameKab','$provid','$resmi','$picture')");
      return mysqli_affected_rows($conn);
    }
    
   
   function addProv($data){
     
     global $conn;
     
      $nameProv = $data['name-prov'];
      $resmi = $data['resmi-prov'];
      $photosProv = $data['photos-prov']; 
      $pulau = $data['pulau'];
      
      $photosProv = upload();
      if(!$photosProv){
        return false;
      }
      
      
     $query =  mysqli_query($conn, "INSERT INTO provinsi_tb VALUES('', '$nameProv','$resmi','$photosProv','$pulau')");
      return mysqli_affected_rows($conn);
   
  }
  
  function update($data){
     
     global $conn;
      $id_prov = $data['id-prov'];
      $name = $data['name-prov'];
      $resmi = $data['resmi-prov'];
      $oldPicture = $data['oldPicture'];
      $pulau = $data['pulau'];
      
      if($_FILES['picture']['error'] === 4){
        $picture = $oldPicture;
      }else{
        $picture = upload();
      }
      
     $query = "UPDATE provinsi_tb SET
                    nama_prov = '$name',
                    prov_resmi = '$resmi',
                    photo_prov = '$picture',
                    pulau = '$pulau'
                    WHERE id_prov = $id_prov
                 ";
     mysqli_query($conn, $query);
      return mysqli_affected_rows($conn);
   
  }
  
  
    function upload(){
      $namePic = $_FILES['picture']['name'];
      $tmpName = $_FILES['picture']['tmp_name'];
      $size = $_FILES['picture']['size'];
      $error = $_FILES['picture']['error'];
      
      //cek ekstensi file
       $eksValid = ["jpg","png","jpeg"];
       $eksFile = explode(".",$namePic);
       $eksFile = strtolower(end($eksFile));
       
       //cek error 
       if($error === 4){
        echo "<script>alert('Gambar Harus dimasukkan!')</script>";
         return false;
       }
       
       if(!in_array($eksFile,$eksValid)){
         echo "<script>alert('Ekstensi File salah')</script>";
         return false;
       }
       
       
      //cek size
       if($size > 2000000){
         echo "<script>alert('Ukuran File terlalu besar')</script>";
         return false;
       }
     
      
      
      $newFile = uniqid();
      $newFile .= '.';
      $newFile .= $eksFile;
      
      move_uploaded_file($tmpName, 'img/' . $newFile);
       
     return $newFile; 
       
      
    }
  
  
  
    function hapus($id){
      global $conn;
      
      $query = mysqli_query($conn,"DELETE FROM provinsi_tb WHERE id_prov = $id");
      
      return mysqli_affected_rows($conn);
        
    }
    
    

 