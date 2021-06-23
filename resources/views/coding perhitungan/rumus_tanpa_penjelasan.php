<!-- mencari nilai pembagi -->
    <?php
    for ($j=1; $j <= 6  ; $j++) { 
      $dipangkat = 0;
        for ($i = 0; $i <= count($x)-1; $i++)
        {
          $dipangkat += pow($x[$i][$j],2);
        }
        $pembagi[] = sqrt($dipangkat);
      }
    ?>

<!-- pembagian -->
    <?php
    for ($i=0; $i <= count($x)-1  ; $i++) {    
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
      ?>
<!-- Hasil dari perkalian dengan bobot -->  
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
      ?> 


<!-- mencari nilai min dan max -->
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
<!-- Mencari nilai dplus dan dmin -->
  <?php  
//   menghitung nilai dplus
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
      ?> 

      <?php  
    //   menghitung nilai dmin
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
      ?> 

<!-- mencari hasil preferensi -->

  <?php  
      for($i = 0; $i < count($x);$i++)
      {
        $preferensi = $dmin[$i]/($dmin[$i]+$dplus[$i]);
        $v[] = $preferensi; 
      }
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
    }
    return $vtot;
    ?>
  
