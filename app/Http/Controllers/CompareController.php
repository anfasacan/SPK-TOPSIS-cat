<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data;
use App\Bobot;

class CompareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function compare_2data()
    {
       $data_kucing=Data::orderBy('jenis_kucing')->get();
         return view('compare.compare_2',compact('data_kucing'));
    }

     public function compare_3data()
     {
        $data_kucing=Data::orderBy('jenis_kucing')->get();
          return view('compare.compare_3',compact('data_kucing'));
     }

     public function compare_4data()
     {
        $data_kucing=Data::orderBy('jenis_kucing')->get();
          return view('compare.compare_4',compact('data_kucing'));
     }

     public function compare_5data()
     {
        $data_kucing=Data::orderBy('jenis_kucing')->get();
          return view('compare.compare_5',compact('data_kucing'));
     }

     public function compare_2(Request $request)
     {
         $data_kucing=Data::all();
         $bobot = Bobot::all();
         $data1 = Data::Where('jenis_kucing','LIKE','%'.$request->kucing1.'%')->first();
         $data2 = Data::Where('jenis_kucing','LIKE','%'.$request->kucing2.'%')->first();
         $x_compare_test[]=array(
             $data1,$data2
         );
 
         return $this->compare_compute($x_compare_test);
        }
        
    public function compare_3(Request $request)
    {
        $data_kucing=Data::all();
        $bobot = Bobot::all();
        $data1 = Data::Where('jenis_kucing','LIKE','%'.$request->kucing1.'%')->first();
        $data2 = Data::Where('jenis_kucing','LIKE','%'.$request->kucing2.'%')->first();
        $data3 = Data::Where('jenis_kucing','LIKE','%'.$request->kucing3.'%')->first();
        $x_compare_test[]=array(
            $data1,$data2,$data3
        );

        return $this->compare_compute($x_compare_test);
    }

    public function compare_4(Request $request)
    {
        $data_kucing=Data::all();
        $bobot = Bobot::all();
        $data1 = Data::Where('jenis_kucing','LIKE','%'.$request->kucing1.'%')->first();
        $data2 = Data::Where('jenis_kucing','LIKE','%'.$request->kucing2.'%')->first();
        $data3 = Data::Where('jenis_kucing','LIKE','%'.$request->kucing3.'%')->first();
        $data4 = Data::Where('jenis_kucing','LIKE','%'.$request->kucing4.'%')->first();
        $x_compare_test[]=array(
            $data1,$data2,$data3,$data4
        );

        return $this->compare_compute($x_compare_test);
    }

    public function compare_5(Request $request)
    {
        $data_kucing=Data::all();
        $bobot = Bobot::all();
        $data1 = Data::Where('jenis_kucing','LIKE','%'.$request->kucing1.'%')->first();
        $data2 = Data::Where('jenis_kucing','LIKE','%'.$request->kucing2.'%')->first();
        $data3 = Data::Where('jenis_kucing','LIKE','%'.$request->kucing3.'%')->first();
        $data4 = Data::Where('jenis_kucing','LIKE','%'.$request->kucing4.'%')->first();
        $data5 = Data::Where('jenis_kucing','LIKE','%'.$request->kucing5.'%')->first();
        $x_compare_test[]=array(
            $data1,$data2,$data3,$data4,$data5
        );

        return $this->compare_compute($x_compare_test);
    }


    public function compare_compute($x_compare_test){
      
      $data_kucing=Data::all();
        $bobot = Bobot::all();


      for($i=0;$i< count($x_compare_test);$i++){
        foreach($x_compare_test[$i] as $datt){
          $jenis = $datt->jenis_kucing;
          $biaya_adopsi = $datt->biaya_adopsi;
          $perawatan = $datt->perawatan;
          $lingkungan = $datt->ling_hidup;
          $sifat = $datt->sifat;
          $penampilan = $datt->penampilan;
          $ketenaran = $datt->ketenaran;
          $penjelasan = $datt->penjelasan;
          $foto = $datt->foto;
          $x_compare[]= array(
                  $jenis,$biaya_adopsi,$perawatan,$lingkungan,$sifat,$penampilan,$ketenaran
          );
        }
      }
      

      for ($j=1; $j <= 6  ; $j++) { 
        $dipangkat = 0;
          for ($i = 0; $i <= count($x_compare)-1; $i++)
          {
            $dipangkat += pow($x_compare[$i][$j],2);
          }
          $pembagi[] = sqrt($dipangkat);
        }
    
      for ($i=0; $i <= count($x_compare)-1  ; $i++) {    
        $dibagi = 0;
        for ($j = 1; $j <= 6; $j++)
        {
          $nama_kucing = 
          $dibagi = $x_compare[$i][$j]/$pembagi[$j-1];
          $hasil[] = ($dibagi);
        }
         
      }
  //mengubah ke array 2D
  $no=0;
  for($i=0; $i < count($x_compare); $i++){
        for($j=0; $j < 6; $j++){
          $hasil_pembagian[$i][$j]=$hasil[$no];
          $no++;
        }
      }
     
        $j=0;
        foreach ($bobot as $val) {
          for ($i = 0; $i <= count($x_compare)-1; $i++)
          {
            $dikalikan = $hasil_pembagian[$i][$j] * $val->value;
            $hasil_kali[$i][$j] = $dikalikan;
            $c_hasil_kali[] = $dikalikan; 
          }
          $j++;        
          }
  
  
  //membuat matriks perkalian nomer 4 menjadi matriks 2d berbentuk per kolom
  $no=0;
  for($i=0; $i < 6; $i++){
        for($j=0; $j < count($x_compare); $j++){
          $c_hasil_perkalian[$i][$j]=$c_hasil_kali[$no];
          $no++;
        }
      }
  
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
   
        for($i = 0; $i < count($x_compare);$i++)
        {
          $hitung_dplus = 0;
          for ($j=0;$j<=5;$j++)
          {
            $hitung_dplus += pow(($ymaks[$j]-$hasil_kali[$i][$j]),2);
          }
          $akar_dplus = sqrt($hitung_dplus);
          $dplus[] = ($akar_dplus); 
        }
      
      //   menghitung nilai dmin
        for($i = 0; $i < count($x_compare);$i++)
        {
          $hitung_dmin = 0;
          for ($j=0;$j<=5;$j++)
          {
            $hitung_dmin += pow(($hasil_kali[$i][$j]-$ymin[$j]),2);
          }
          $akar_dmin = sqrt($hitung_dmin);
          $dmin[] = ($akar_dmin); 
        }
     
        for($i = 0; $i < count($x_compare);$i++)
        {
          $preferensi = $dmin[$i]/($dmin[$i]+$dplus[$i]);
          $v[] = $preferensi; 
        }
  
        $i=0;
      foreach($x_compare as $kuc){ 
        for ($j=0;$j<count($x_compare);$j++){
              $vtot[$i] = array($x_compare[$i][0],$v[$i]);
          }
          $i++;
          // dd($i);
          // return $data;
      }
      // dd($vtot);
  
  
      array_multisort(array_map(function($element) {
        return $element['1'];
    }, $vtot), SORT_DESC, $vtot);
    for($k=0;$k< count($x_compare);$k++){
        for($p=0;$p< 2;$p++)
        {
        $vtot_r[$k][$p]=$vtot[$k][$p];
      }
  }
  
  for($p=0;$p < count($x_compare);$p++){
        $data_rank[$p] = array ( Data::Where('jenis_kucing','LIKE','%'.$vtot_r[$p][0].'%')->first());
  }
  
  // dd($data_rank[1]->jenis_kucing);
  // return $data_rank[0];
  // return $x_compare;
  for($i=0;$i< count($x_compare);$i++){
    foreach($data_rank[$i] as $datt){
      $jenis = $datt->jenis_kucing;
      $biaya_adopsi = $datt->biaya_adopsi;
      $perawatan = $datt->perawatan;
      $lingkungan = $datt->ling_hidup;
      $sifat = $datt->sifat;
      $penampilan = $datt->penampilan;
      $ketenaran = $datt->ketenaran;
      $penjelasan = $datt->penjelasan;
      $foto = $datt->foto;
      $x_rank[]= array(
              $jenis,$biaya_adopsi,$perawatan,$lingkungan,$sifat,$penampilan,$ketenaran,$penjelasan,$foto
      );
    }
  }
//   dd($vtot);

return view('compare.hasil_compare',compact('data_kucing','bobot','x_compare','vtot_r','x_rank'));
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
