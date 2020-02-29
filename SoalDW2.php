<?php


function minmax($input = 0){
  

  $data = [3,4,5,6,7,8];

  $hasil = [];
  
   //perulangan untuk menjumlahkan array setelah di unset
   for($i=0; $i < count($data)+1; $i++){
     $data = [3,4,5,6,7,8];
     unset($data[$i]);
     $hasil[]=array_sum($data);//memasukan hasil penjumlahan ke variabel $hasil
   }
   
   if($input == 1){
     $min = min($hasil);
     $max = max($hasil);
     $minmax = $min.".".$max;
     return explode(".",$minmax);
   }
   return $hasil;
 }
  /*Masukkan parameter 1 untuk melihat
    nilai terkecil dan terbesar */
  
  /*Jalankan tanpa menggunakan parameter untuk
    melihat isi array sebelum di ambil min max valuenya*/
  var_dump(minmax());
  var_dump(minmax(1));
  
?>
