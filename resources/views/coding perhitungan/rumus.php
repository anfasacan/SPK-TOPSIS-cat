
/* <!-- <h2>3.1. Pembagi</h2> -->
    <!-- <td>Pembagi</td> -->
    <!-- mencari niali pembagi untuk tahap selanjutnya --> */
    <?php
    for ($j=1; $j <= 6  ; $j++) { 
      $dipangkat = 0;
        for ($i = 0; $i <= count($x)-1; $i++)
        {
          $dipangkat += pow($x[$i][$j],2);
        }
        $pembagi[] = sqrt($dipangkat);
        // digunakan untuk mencetak nilai pembagi
        // echo "<td>".round($pembagi[$j-1],3)."</td>";
      }
    ?>

<!-- <h2>3.2. Pembagian</h2> -->

    <?php
    for ($i=0; $i <= count($x)-1  ; $i++) { 
      // foreach($data as $kuc)
      
      $dibagi = 0;
      for ($j = 1; $j <= 6; $j++)
      {
        $nama_kucing = 
        $dibagi = $x[$i][$j]/$pembagi[$j-1];
        $hasil[] = round($dibagi,3);
      }
       
    }
//mengubah ke array 2D
$no=0;
for($i=0; $i < count($x); $i++){
      for($j=0; $j < 6; $j++){
        $hasil_pembagian[$i][$j]=$hasil[$no];
        $no++;
      }
    }
    // digunakan untuk mencetak hasil dari pembagian
    // $i = 0;
    // foreach($data as $kuc){ 
    //   {
    //     echo "<td>".$kuc->jenis_kucing."</td>";
    //     for($j=0;$j <= 5;$j++)
    //     echo "<td>".$hasil_pembagian[$i][$j]."</td>";
    //     $i++;
    //   }
    //   echo "<tr>";
    //   }
      ?>


<!-- <h2>4. Dikali Bobot</h2> -->
  
    <?php  
      $j=0;
      foreach ($bobot as $val) {
        for ($i = 0; $i <= count($x)-1; $i++)
        {
          $dikalikan = $hasil_pembagian[$i][$j] * $val->value;
          $hasil_kali[$i][$j] = $dikalikan;
          $c_hasil_kali[] = $dikalikan; 
        }
        $j++;
        
        }
        // digunakan untuk mencetak nalai dari hasil tahap 4
        // $i = 0;
        // foreach($data as $kuc){ 
        //   {
        //     echo "<td>".$kuc->jenis_kucing."</td>";
        //     for($j=0;$j <= 5;$j++)
        //     echo "<td>".$hasil_kali[$i][$j]."</td>";
        //     $i++;
        //   }
        //   echo "<tr>";
        //   }
      ?> 


<!-- <h2>5. Mencari Nilai Min dan Max</h2> -->
<?php
//membuat matriks perkalian nomer 4 menjadi matriks 2d berbentuk per kolom
$no=0;
for($i=0; $i < 6; $i++){
      for($j=0; $j < count($x); $j++){
        $c_hasil_perkalian[$i][$j]=$c_hasil_kali[$no];
        $no++;
      }
    }
?>
  
  <?php  
    //mencari ymaks
    foreach ($bobot as $penentu) {
      if($penentu->bool_tipe == 0){
        $ymaks[] = min($c_hasil_perkalian[($penentu->id-1)]);
      }
      elseif ($penentu->bool_tipe == 1) {
        $ymaks[] = max($c_hasil_perkalian[($penentu->id-1)]);
      }
    }
    
    //mencari ymin
    foreach ($bobot as $penentu) {
      if($penentu->bool_tipe == 0){
        $ymin[] = max($c_hasil_perkalian[($penentu->id-1)]);
      }
      elseif ($penentu->bool_tipe == 1) {
        $ymin[] = min($c_hasil_perkalian[($penentu->id-1)]);
      }
    }
    ?> 


      <!-- digunakan untuk mencetak nilai maks -->
      <?php
    //   for($k = 0; $k < count($ymaks);$k++){
    //     echo "<td>".$ymaks[$k]."</td>";
    //   }
      ?>
<!-- digunakan untuk mencetak niali min -->
    <?php
    //   for($k = 0; $k < count($ymin);$k++){
    //     echo "<td>".$ymin[$k]."</td>";
    //   }
      ?>



<!-- {{-- Membuat Nilai Dplus dan Dmin --}} -->
<!-- <h2>6. Menentukan Nilai Dplus dan Dmin</h2> -->
  <!-- {{-- mencari nilai dplus --}} -->
  <?php  
      for($i = 0; $i < count($x);$i++)
      {
        $hitung_dplus = 0;
        for ($j=0;$j<=5;$j++)
        {
          $hitung_dplus += pow(($ymaks[$j]-$hasil_kali[$i][$j]),2);
        }
        $akar_dplus = sqrt($hitung_dplus);
        $dplus[] = round($akar_dplus,3); 
      }
      // dd($dplus);
      ?> 

      <!-- {{-- mencari nilai dmin --}} -->
      <?php  
      for($i = 0; $i < count($x);$i++)
      {
        $hitung_dmin = 0;
        for ($j=0;$j<=5;$j++)
        {
          $hitung_dmin += pow(($hasil_kali[$i][$j]-$ymin[$j]),2);
        }
        $akar_dmin = sqrt($hitung_dmin);
        $dmin[] = round($akar_dmin,3); 
      }
      
      // echo sqrt(pow($hasil_kali[2][0]-$ymin[0],2)+pow($hasil_kali[2][1]-$ymin[1],2)+pow($hasil_kali[2][2]-$ymin[2],2)+pow($hasil_kali[2][3]-$ymin[3],2)+pow($hasil_kali[2][4]-$ymin[4],2)+pow($hasil_kali[2][5]-$ymin[5],2));
      ?> 

      <!-- untuk mencetaknya dapat menggunakan cara dibawah ini -->
    <?php
    //         $k=0;
    // foreach($data as $kuc){ 
    //         echo "<td>".$kuc->jenis_kucing."</td>";
    //         echo "<td>".$dplus[$k]."</td>";
    //         echo "<td>".$dmin[$k]."</td>";
    //         $k++;
    //       echo "<tr>";
    //       }
    ?>

<!-- <h2>7. Mencari Hasil Prefensi</h2> -->

  <?php  
      for($i = 0; $i < count($x);$i++)
      {
        $preferensi = $dmin[$i]/($dmin[$i]+$dplus[$i]);
        $v[] = $preferensi; 
      }
      //$v[] merupakan isi dari niali preferensi
      ?> 


<!-- {{-- Pembuatan Matriks 2D untuk menggabungkan hasil referensi dan nama kucing --}} -->

<?php
      $i=0;
    foreach($data as $kuc){ 
      for ($j=0;$j<count($x);$j++){
            $vtot[$i] = array($kuc->jenis_kucing,$v[$i]);
          }
          $i++;
    }
?>

<!-- 8. Ranking -->
    <?php
    array_multisort(array_map(function($element) {
      return $element['1'];
  }, $vtot), SORT_DESC, $vtot);
  for($k=0;$k< count($x);$k++){
      for($p=0;$p< 2;$p++)
      {
      $vtot_r[$k][$p]=$vtot[$k][$p];
    }
    // untuk mencetak ranking pakai $k+1
    // untuk variable yang di panggil menggunakan $vtot_r[$k][$p]
    }
    return $vtot;
    ?>
  
