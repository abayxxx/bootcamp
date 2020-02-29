<?php
   //diketahui
   $kBagus = 7; // m/s
   $kIsmail = 10; // m/s
   $waktuAwalBagus = "12:00";
   $waktuAwalIsmail = "13:00";
   
   
   //Waktu yang dibutuhkan bagus dari A ke B = 1 jam
   $jarakTempuhBagus = 7 * 3600 / 1000; // 25.2km/jam
   $jarakAB = $jarakTempuhBagus;
   
   
   $jarakTempuhIsmail = 10 * 3600 / 1000; //36km/jam
   $waktuTempuhIsmail = $jarakAB / $jarakTempuhIsmail; // 0.7 jam = 42 Menit
   $waktuTempuhIsmail = "42 Menit"; // 0.7 Jam di convert menjadi menit
   $berpapasan = "Waktu mereka berpapasan adalah $waktuAwalIsmail + $waktuTempuhIsmail = 13.42";
   echo $berpapasan;
   
   
   
   
   
   

 ?>