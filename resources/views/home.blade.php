<!DOCTYPE html>
<html >
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}


}
</style>
<body>

  <h2>1. Bobot</h2>

  <table>
    <tr>
      <th></th>
    @foreach ($bobot as $nama_bbt)
      <th>{{$nama_bbt->nama_bobot}}</th> 
      @endforeach
    </tr>

    <tr>
      <td> BOBOT </td>
      @foreach ($bobot as $bbt)
      <td>{{$bbt->value}}</td>
      @endforeach
    </tr>
  
    <tr>
      <td> Tipe </td>
      @foreach ($bobot as $bbt)
      <td>{{$bbt->tipe}}</td>
      @endforeach
    </tr>

  </table>

<h2>2. Data</h2>

<table>
  <tr>
    <th>Jenis Kucing</th>
    <th>Biaya Adopsi</th> 
    <th>Perawatan</th>
    <th>ling_hidup</th>
    <th>sifat</th>
    <th>penampilan</th>
    <th>ketenaran</th>
  </tr>
  
  @foreach ($data as $kucing)
      
 
  <tr>
    <td>{{$kucing->jenis_kucing}}</td>
    <td>{{$kucing->biaya_adopsi}}</td>
    <td>{{$kucing->perawatan}}</td>
    <td>{{$kucing->ling_hidup}}</td>
    <td>{{$kucing->sifat}}</td>
    <td>{{$kucing->penampilan}}</td>
    <td>{{$kucing->ketenaran}}</td>
  </tr>

  @endforeach
</table>

<h2>3.1. Pembagi</h2>

<table>
  <tr>
    <th></th>
  @foreach ($bobot as $nama_bbt)
    <th>{{$nama_bbt->nama_bobot}}</th> 
    @endforeach
  </tr>
  
  <tr>
    <td>Pembagi</td>
    <?php
    for ($j=1; $j <= 6  ; $j++) { 
      $dipangkat = 0;
        for ($i = 0; $i <= count($x)-1; $i++)
        {
          $dipangkat += pow($x[$i][$j],2);
        }
        $pembagi[] = sqrt($dipangkat);
        echo "<td>".($pembagi[$j-1])."</td>";
      }
    ?>

        
  </tr>

</table>

<h2>3.2. Pembagian</h2>
<table>
  <tr>
    <th>Jenis Keucing</th>
  @foreach ($bobot as $nama_bbt)
    <th>{{$nama_bbt->nama_bobot}}</th> 
    @endforeach
  </tr>

  <tr>
    <?php
    for ($i=0; $i <= count($x)-1  ; $i++) { 
      // foreach($data as $kuc)
      
      $dibagi = 0;
      for ($j = 1; $j <= 6; $j++)
      {
        $nama_kucing = 
        $dibagi = $x[$i][$j]/$pembagi[$j-1];
        $hasil[] = ($dibagi);
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
    
    $i = 0;
    foreach($data as $kuc){ 
      {
        echo "<td>".$kuc->jenis_kucing."</td>";
        for($j=0;$j <= 5;$j++)
        echo "<td>".$hasil_pembagian[$i][$j]."</td>";
        $i++;
      }
      echo "<tr>";
      }
      ?>
</tr>
</table>

<h2>4. Dikali Bobot</h2>

<table>
  <tr>
    <th>Jenis Kucing</th>
    @foreach ($bobot as $nama_bbt)
    <th>{{$nama_bbt->nama_bobot}}</th> 
    @endforeach
  </tr>
  
  <tr>
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
        echo"<tr>";
        }
        $i = 0;
        foreach($data as $kuc){ 
          {
            echo "<td>".$kuc->jenis_kucing."</td>";
            for($j=0;$j <= 5;$j++)
            echo "<td>".$hasil_kali[$i][$j]."</td>";
            $i++;
          }
          echo "<tr>";
          }
      ?> 
  </tr>
  
</table>

<h2>5. Mencari Nilai Min dan Max</h2>
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
<table>
  <tr>
    <th></th>
    @foreach ($bobot as $nama_bbt)
    <th>{{$nama_bbt->nama_bobot}}</th> 
    @endforeach
  </tr>
  
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

    <tr>
      <td>Maks</td>
      <?php
      for($k = 0; $k < count($ymaks);$k++){
        echo "<td>".$ymaks[$k]."</td>";
      }
      ?>
  </tr>

  <tr>
    <td>Min</td>
    <?php
      for($k = 0; $k < count($ymin);$k++){
        echo "<td>".$ymin[$k]."</td>";
      }
      ?>
  </tr>
  
</table>


{{-- Membuat Nilai Dplus dan Dmin --}}

<h2>6. Menentukan Nilai Dplus dan Dmin</h2>

<table>
  <tr>
    <th>Jenis Kucing</th>
    <th>D+</th>
    <th>D-</th>
    
  </tr>
  {{-- mencari nilai dplus --}}
  <?php  
      for($i = 0; $i < count($x);$i++)
      {
        $hitung_dplus = 0;
        for ($j=0;$j<=5;$j++)
        {
          $hitung_dplus += pow(($ymaks[$j]-$hasil_kali[$i][$j]),2);
        }
        $akar_dplus = sqrt($hitung_dplus);
        $dplus[] = ($akar_dplus); 
      }
      // dd($dplus);
      ?> 

      {{-- mencari nilai dmin --}}
      <?php  
      for($i = 0; $i < count($x);$i++)
      {
        $hitung_dmin = 0;
        for ($j=0;$j<=5;$j++)
        {
          $hitung_dmin += pow(($hasil_kali[$i][$j]-$ymin[$j]),2);
        }
        $akar_dmin = sqrt($hitung_dmin);
        $dmin[] = ($akar_dmin); 
      }
      // dd($dmin);

      // echo sqrt(pow($hasil_kali[2][0]-$ymin[0],2)+pow($hasil_kali[2][1]-$ymin[1],2)+pow($hasil_kali[2][2]-$ymin[2],2)+pow($hasil_kali[2][3]-$ymin[3],2)+pow($hasil_kali[2][4]-$ymin[4],2)+pow($hasil_kali[2][5]-$ymin[5],2));
      ?> 
      <tr>
    <?php
            $k=0;
    foreach($data as $kuc){ 
            echo "<td>".$kuc->jenis_kucing."</td>";
            echo "<td>".$dplus[$k]."</td>";
            echo "<td>".$dmin[$k]."</td>";
            $k++;
          echo "<tr>";
          }
    ?>
  </tr>
</table>

<h2>7. Mencari Hasil Prefensi</h2>

<table>
  <tr>
    <th>Jenis Kucing</th>
    <th>Preferensi</th>
    
  </tr>
  {{-- mencari nilai dplus --}}
  <?php  
      for($i = 0; $i < count($x);$i++)
      {
        $preferensi = $dmin[$i]/($dmin[$i]+$dplus[$i]);
        $v[] = $preferensi; 
      }
      // dd($v);
      ?> 

      {{-- mencari nilai dmin --}}
      <?php  
      
      ?> 
      <tr>
    <?php
            $k=0;
    foreach($data as $kuc){ 
            echo "<td>".$kuc->jenis_kucing."</td>";
            echo "<td>".$v[$k]."</td>";
            $k++;
          echo "<tr>";
          }
    ?>
  </tr>
</table>

{{-- Pembuatan Matriks 2D untuk menggabungkan hasil referensi dan nama kucing --}}

<?php
      $i=0;
    foreach($data as $kuc){ 
      for ($j=0;$j<count($x);$j++){
            // echo "<td>".$kuc->jenis_kucing."</td>";
            // echo "<td>".$v[$i]."</td>";
            $vtot[$i] = array($kuc->jenis_kucing,$v[$i]);
          }
          $i++;
    }
?>

<h2>8. Ranking</h2>

<table>
  <tr>
    <th>Jenis Kucing</th>
    <th>Preferensi</th>
    <th>Ranking</th>
    
  </tr>

      <tr>
    <?php
    array_multisort(array_map(function($element) {
      return $element['1'];
  }, $vtot), SORT_DESC, $vtot);
  for($k=0;$k< count($x);$k++){
      for($p=0;$p< 2;$p++)
      {
      echo "<td>".$vtot[$k][$p]."</td>";
    }
    echo "<td>".($k+1)."</td>";
    echo "<tr>";
    }
    return $vtot;
    ?>
  </tr>

  
</table>

</body>
</html>
