@extends('Layout.A_master')



@section('data')

     <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">Data Kucing</h4>
                </div>
                <div>
                    <a type="button" href="/admin_data/tambah_data" class="btn btn-primary btn-icon-text ">
                      <i class="ti-plus btn-icon-prepend"></i>Tambah Data
                    </a>
                </div>
              </div>
          <div class="table-responsive">
            <table id="myTable" class="table table-striped" >
              <thead>
                <tr>
                  <th>
                      id  
                  </th> 
                  <th>
                      Jenis Kucing  
                  </th>
                  <th>
                    Foto  
                </th>
                  <th>
                      Penjelasan  
                  </th>
                  <th>
                      Biaya Adopsi  
                  </th>
                  <th>
                     Perawatan 
                </th>
                <th>
                    Lingkungan Hidup
                </th>
                <th>
                    Sifat  
                </th>
                <th>
                    Penampilan  
                </th>
                <th>
                    Ketenaran  
                </th>
                <th>
                    Edit  
                </th>
                <th>
                    Hapus 
                </th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($data->reverse() as $kuc)
                <tr>
                  <td>
                    {{$kuc->id}}
                  </td>
                  <td>
                    {{$kuc->jenis_kucing}}
                  </td>
                  <td>
                    <img src="{{asset('images/kucing')}}/{{$kuc->foto}}" alt="{{$kuc->foto}}" width="500" height="600">
                    
                  </td>
                  <td>
                    <p style="max-width:70ch; overflow: hidden;">{{$kuc->penjelasan}}</p>
                  </td>
                  <td>
                    {{$kuc->biaya_adopsi}}
                  </td>

                  <?php
                    if($kuc->perawatan==1){
                        $perawatan = "sangat mudah (1)";
                    }
                    elseif ($kuc->perawatan==2) {
                        $perawatan = "mudah (2)";
                    }
                    elseif ($kuc->perawatan==3) {
                        $perawatan = "tidak sulit dan tidak mudah (3)";
                    }
                    elseif ($kuc->perawatan==4) {
                        $perawatan = "sulit (4)";
                    }
                    elseif ($kuc->perawatan==5) {
                        $perawatan = "sangat sulit (5)";
                    }
                    ?>
                  <td>
                    {{$perawatan}}
                  </td>
                  
                  <?php
                    if($kuc->ling_hidup==1){
                        $lingkungan_hidup = "Dimana Saja (1)";
                    }
                    elseif ($kuc->ling_hidup==2) {
                        $lingkungan_hidup = "Ditempat Bersih atau Luas (2)";
                    }
                    elseif ($kuc->ling_hidup==3) {
                        $lingkungan_hidup = "Ditempat Bersih dan Luas (3)";
                    }
                    elseif ($kuc->ling_hidup==4) {
                        $lingkungan_hidup = "Ditempat Spesial untuk Rasnya (4)";
                    }
                    elseif ($kuc->ling_hidup==5) {
                        $lingkungan_hidup = "Ditempat Bersih, Luas, dan Spesial untuk Rasnya (5)";
                    }
                    ?>
                  <td>
                    {{$lingkungan_hidup}}
                  </td>

                  <?php
                    if($kuc->sifat==1){
                        $sifat = "Kurang Cerdas dan Kurang Bersahabat (1)";
                    }
                    elseif ($kuc->sifat==2) {
                        $sifat = "Cerdas Atau Bersahabat (2)";
                    }
                    elseif ($kuc->sifat==3) {
                        $sifat = "Cerdas dan Bersahabat (3)";
                    }
                    elseif ($kuc->sifat==4) {
                        $sifat = "Sangat cerdas atau sangat Bersahabat (4)";
                    }
                    elseif ($kuc->sifat==5) {
                        $sifat = "Sangat cerdas dan sangat Bersahabat (5)";
                    }
                    ?>
                  <td>
                    {{$sifat}}
                  </td>

                  <?php
                    if($kuc->penampilan==1){
                        $penampilan = "Kurang Menarik (1)";
                    }
                    elseif ($kuc->penampilan==2) {
                        $penampilan = "Biasa Saja (2)";
                    }
                    elseif ($kuc->penampilan==3) {
                        $penampilan = "Cukup Menarik (3)";
                    }
                    elseif ($kuc->penampilan==4) {
                        $penampilan = "Menarik (4)";
                    }
                    elseif ($kuc->penampilan==5) {
                        $penampilan = "Sangat Menarik (5)";
                    }
                    ?>
                  <td>
                    {{$penampilan}}
                  </td>

                  <?php
                  if($kuc->ketenaran==1){
                      $kepemilikan = "Banyak yang sudah punya (1)";
                  }
                  elseif ($kuc->ketenaran==2) {
                      $kepemilikan = "Tidak banyak dan Tidak sedikit yang punya (2)";
                  }
                  elseif ($kuc->ketenaran==3) {
                      $kepemilikan = "Cukup jarang yang punya (3)";
                  }
                  elseif ($kuc->ketenaran==4) {
                      $kepemilikan = "Jarang yang punya (4)";
                  }
                  elseif ($kuc->ketenaran==5) {
                      $kepemilikan = "Jarang Sekali yang punya (5)";
                  }
                  ?>
                  <td>
                    {{$kepemilikan}}
                  </td>
                  <td>
                    <a type="button" href="/admin_data/{{$kuc->id}}/edit" class="btn btn-outline-info btn-icon-text">
                        <i class="ti-pencil btn-icon-prepend"></i>                                                    
                        Edit
                    </a>
                  </td>
                  <td>
                    <form action="admin_data/{{$kuc -> id}}/hapus" method="POST">
                      @method('delete')
                      @csrf
                    <button type="submit" onclick="return confirm('anda yakin ingin menghapus data degan id = {{$kuc->id}}')" class="btn btn-outline-danger btn-icon-text" >Hapus</button></form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    
     

@endsection

@section('search')
           <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="ti-search"></i>
                </span>
              </div>
              <input type="text" onkeyup="carifunction()" name="cari" class="form-control" id="myInput" placeholder="pencarian" aria-label="search" aria-describedby="search" autocomplete="off">
            </div>
          </li>   

          <script>
            function carifunction() {
       // Deklarasi variable
       var input, filter, table, tr, td, i, txtValue;
       input = document.getElementById("myInput");
       filter = input.value.toUpperCase();
       table = document.getElementById("myTable");
       tr = table.getElementsByTagName("tr");
     
       // ngeload ulang table, jika ada yang sesuai dengan namanya di tampilkan jika tidak sembunyikan
       for (i = 0; i < tr.length; i++) {
         td = tr[i].getElementsByTagName("td")[1];
         if (td) {
           txtValue = td.textContent || td.innerText;
           if (txtValue.toUpperCase().indexOf(filter) > -1) {
             tr[i].style.display = "";
           } else {
             tr[i].style.display = "none";
           }
         }
       }
     }
             </script>
@endsection

