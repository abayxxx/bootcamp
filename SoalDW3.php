<?php


function draw($loop){
 
  //Cek apakah parameter ganjil atau genap
  if($loop % 2 == 0 ){ 
    echo "Parameter Harus Bilangan Ganjil!";
    die();
  }else{
    $up = ceil($loop/2);
    $down = floor($loop/2);
  }
  
  
  //segitiga pertama
   for($i = 0; $i < $up; $i++){
     for($j=0; $j < $i; $j++){
       echo "=";
     }for($b=$up; $b>$j; $b--){
       echo "@";
     }for ($c=$down; $c>$b; $c--){
        echo "@";
     }for($v=0; $v<$i; $v++){
       echo "=";
     }
     echo "\n";
   }
   
   //segitiga kedua
   for($i=0; $i<$down; $i++){
     for($j=$down-1; $j>$i; $j--){
       echo "=";
     }for($a=0; $a<$j+1; $a++){
       echo "@";
     }for($c=0; $c<$a+1; $c++){
       echo "@";
     }for($v=$down-1; $v>$i; $v--){
       echo "=";
     }
     
     echo "\n";
   }
 } 
 
 //cetak gambar 
 draw(7);

 ?>