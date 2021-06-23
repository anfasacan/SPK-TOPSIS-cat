@extends('Layout.master')
@section('title','Tentang')
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
    </style>
@section('tentang')

<section class="fruit_section layout_padding">
    <div class="container">
        <div class="heading_container">
            <hr>
            <h2>
              Bantu Kami
            </h2>
          </div>
          <div>
            Bantu kami untuk memaksimalkan data-data kucing, dengan menekan tombol dibawah ini.
            <br>
            <br>
            <a type="button" class="btn btn-outline-success" target="_blank" href="{{URL::to('https://docs.google.com/forms/d/e/1FAIpQLSc-S8VKBeo__SluIL8jE74_Wf9a_sz96wIEZo_aK7vwWo9YwQ/viewform?usp=pp_url')}}">Ikuti Survey</a>
          </div>

      <div class="heading_container">
        <hr>
        <h2>
          Tentang
        </h2>
      </div>
      <div>
          <p>Website ini merupakan website sistem pendukung keputusan, untuk metode yang digunakan pada website ini merupakan metode 
              TOPSIS (<i>Technique for Order Preference by Similarity to Ideal Solution</i>), dimana adanya kriteria-kriteria dan bobot yang dihitung
              hingga membuat nilai hasil yang dinamakan preference.
          </p>
      </div>
    <div>
        <p>Berikut Nilai Bobotnya :</p>
        <table class="table">
            <tr>
                <thead class="thead-dark">
              <th></th>
              <th>Biaya Adopsi</th>
              <th>Perawatan</th>
              <th>Lingkungan Hidup</th>
              <th>Sifat</th>
              <th>penampilan</th>
              <th>Ketenaran</th> 
                </thead>
            </tr>
        
            <tr>
              <td style="background-color:#343a40;"> <b style="color:white">Bobot</b> </td>
              @foreach ($bobot as $bbt)
              <td>{{$bbt->value}}</td>
              @endforeach
            </tr>
          
            <tr>
                <td style="background-color:#343a40;"> <b style="color:white">Tipe</b> </td>
              @foreach ($bobot as $bbt)
              <td>{{$bbt->tipe}}</td>
              @endforeach
            </tr>
        
          </table>
          <br>
          <br>
        <p>Berikut Nilai Kriterianya :</p>
        <p><b>1. Perawatan : </b></p>
        <table class="table">
            <tr>
                <thead class="thead-dark">
            <th>Kesulitan</th>
            <th>Value</th>
                </thead>
            </tr>
            <tr>
                <td>Sangat Mudah</td>
                <td>1</td>
            </tr>
            <tr>
                <td>Mudah</td>
                <td>2</td>
            </tr>
            <tr>
                <td>Tidak Sulit dan Tidak Mudah</td>
                <td>3</td>
            </tr>
            <tr>
                <td>Sulit</td>
                <td>4</td>
            </tr>
            <tr>
                <td>Sangat Sulit</td>
                <td>5</td>
            </tr>
        </table>
<br>
        <p><b>2. Lingkungan atau Kandang : </b></p>
        <table class="table">
            <tr>
                <thead class="thead-dark">
            <th>Kondisi Tempat</th>
            <th>Value</th>
                </thead>
            </tr>
            <tr>
                <td>Bagaimana Saja</td>
                <td>1</td>
            </tr>
            <tr>
                <td>Ditempat Bersih atau Luas</td>
                <td>2</td>
            </tr>
            <tr>
                <td>Ditempat Bersih dan Luas</td>
                <td>3</td>
            </tr>
            <tr>
                <td>Ditempat Spesial untuk Rasnya</td>
                <td>4</td>
            </tr>
            <tr>
                <td>Ditempat Bersih, Luas, dan Spesial untuk Rasnya</td>
                <td>5</td>
            </tr>
        </table>
<br>
<p><b>3. Sifat : </b></p>
        <table class="table">
            <tr>
                <thead class="thead-dark">
            <th>Sifat</th>
            <th>Value</th>
                </thead>
            </tr>
            <tr>
                <td>Kurang Cerdas dan Kurang Bersahabat</td>
                <td>1</td>
            </tr>
            <tr>
                <td>Cerdas Atau Bersahabat</td>
                <td>2</td>
            </tr>
            <tr>
                <td>Cerdas dan Bersahabat</td>
                <td>3</td>
            </tr>
            <tr>
                <td>Sangat cerdas atau sangat Bersahabat</td>
                <td>4</td>
            </tr>
            <tr>
                <td>Sangat cerdas dan sangat Bersahabat</td>
                <td>5</td>
            </tr>
        </table>
        <br>
<p><b>4. Penampilan : </b></p>
        <table class="table">
            <tr>
                <thead class="thead-dark">
            <th>Penampilan</th>
            <th>Value</th>
                </thead>
            </tr>
            <tr>
                <td>Kurang Menarik</td>
                <td>1</td>
            </tr>
            <tr>
                <td>Biasa Saja</td>
                <td>2</td>
            </tr>
            <tr>
                <td>Cukup Menarik</td>
                <td>3</td>
            </tr>
            <tr>
                <td>Menarik</td>
                <td>4</td>
            </tr>
            <tr>
                <td>Sangat Menarik</td>
                <td>5</td>
            </tr>
        </table>

        <br>
        <p><b>5. Ketenaran : </b></p>
                <table class="table">
                    <tr>
                        <thead class="thead-dark">
                    <th>Kepemilikan</th>
                    <th>Value</th>
                        </thead>
                    </tr>
                    <tr>
                        <td>Banyak yang memelihara</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>Cukup Banyak yang memelihara</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <td>Cukup sedikit yang memelihara</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <td>Jarang yang memelihara</td>
                        <td>4</td>
                    </tr>
                    <tr>
                        <td>Jarang Sekali yang memelihara</td>
                        <td>5</td>
                    </tr>
                </table>
    </div>
    </div>
</section>
@endsection