<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Data;
use App\Bobot;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function home()
    {
        $data = Data::all();
        $data_home = Data::Paginate(9);
        $bobot = Bobot::all();

        //membuat array 2D
        foreach($data as $dat)
        {

            $jenis = $dat->jenis_kucing;
            $biaya_adopsi = $dat->biaya_adopsi;
            $perawatan = $dat->perawatan;
            $lingkungan = $dat->ling_hidup;
            $sifat = $dat->sifat;
            $penampilan = $dat->penampilan;
            $ketenaran = $dat->ketenaran;
            $x[]= array(
                    $jenis,$biaya_adopsi,$perawatan,$lingkungan,$sifat,$penampilan,$ketenaran
            );
        }

        return view('index',compact('data','bobot','x','data_home'));
    }

    public function cari_home(Request $request)
    {

      
      $bobot = Bobot::all();

      if($request -> has('cari')){
        $data_home = \App\Data::where('jenis_kucing', $request -> cari)->orWhere('jenis_kucing', 'LIKE', '%' . $request -> cari . '%')-> latest() ->paginate(9);
        $data_home->appends(['cari' => $request->cari]);
        
    } 
    else{
        
        
        $data_home = Data::Paginate(3);
    }
    return view('index',(compact('data_home')));
    }

    public function rank()
    {
        $data = Data::all();
        $bobot = Bobot::all();

        //membuat array 2D
        foreach($data as $dat)
        {

            $jenis = $dat->jenis_kucing;
            $biaya_adopsi = $dat->biaya_adopsi;
            $perawatan = $dat->perawatan;
            $lingkungan = $dat->ling_hidup;
            $sifat = $dat->sifat;
            $penampilan = $dat->penampilan;
            $ketenaran = $dat->ketenaran;
            $penjelasan = $dat->penjelasan;
            $foto = $dat->foto;
            $x[]= array(
                    $jenis,$biaya_adopsi,$perawatan,$lingkungan,$sifat,$penampilan,$ketenaran,$penjelasan,$foto
            );
        }

    for ($j=1; $j <= 6  ; $j++) { 
      $dipangkat = 0;
        for ($i = 0; $i <= count($x)-1; $i++)
        {
          $dipangkat += pow($x[$i][$j],2);
        }
        $pembagi[] = sqrt($dipangkat);
      }
  
    for ($i=0; $i <= count($x)-1  ; $i++) {    
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


//membuat matriks perkalian nomer 4 menjadi matriks 2d berbentuk per kolom
$no=0;
for($i=0; $i < 6; $i++){
      for($j=0; $j < count($x); $j++){
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
    
    //   menghitung nilai dmin
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
   
      for($i = 0; $i < count($x);$i++)
      {
        $preferensi = $dmin[$i]/($dmin[$i]+$dplus[$i]);
        $v[] = $preferensi; 
      }

      $i=0;
    foreach($data as $kuc){ 
      for ($j=0;$j<count($x);$j++){
            $vtot[$i] = array($kuc->jenis_kucing,$v[$i]);
        }
        $i++;
        // dd($i);
        // return $data;
    }
    // dd($vtot);


    array_multisort(array_map(function($element) {
      return $element['1'];
  }, $vtot), SORT_DESC, $vtot);
  for($k=0;$k< count($x);$k++){
      for($p=0;$p< 2;$p++)
      {
      $vtot_r[$k][$p]=$vtot[$k][$p];
    }
}

for($p=0;$p < count($x);$p++){
      $data_rank[$p] = array ( Data::Where('jenis_kucing','LIKE','%'.$vtot_r[$p][0].'%')->first());
}

// dd($data_rank[1]->jenis_kucing);
// return $data_rank[0];
// return $x;
for($i=0;$i< count($x);$i++){
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

// dd($xxx);

return view('ranking',compact('data','bobot','x','vtot_r','x_rank'));
return $vtot;

}
    
    public function tentang()
    {
      $bobot = Bobot::all();
        return view('tentang',compact('bobot'));
    }

    public function compare()
    {
      $data_kucing=Data::all();
        return view('compare.compare',compact('data_kucing'));
    }


    public function data()
    {
        $data = Data::all();
        $data_home = Data::Paginate(6);
        $bobot = Bobot::all();

        //membuat array 2D
        foreach($data as $dat)
        {

            $jenis = $dat->jenis_kucing;
            $biaya_adopsi = $dat->biaya_adopsi;
            $perawatan = $dat->perawatan;
            $lingkungan = $dat->ling_hidup;
            $sifat = $dat->sifat;
            $penampilan = $dat->penampilan;
            $ketenaran = $dat->ketenaran;
            $x[]= array(
                    $jenis,$biaya_adopsi,$perawatan,$lingkungan,$sifat,$penampilan,$ketenaran
            );
        }

        return view('home',compact('data','bobot','x','data_home'));
    }

    public function Login()
    {
      return view ('admin.login_admin');
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
