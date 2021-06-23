<!DOCTYPE html>
<html>

  <head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
  
    <title>Home</title>
  
    <!-- slider stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css')}}" />
  
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}" />
  
    <!-- fonts style -->
    <link href="{{asset('https://fonts.googleapis.com/css?family=Baloo+Chettan|Dosis:400,600,700|Poppins:400,600,700&display=swap')}}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet" />
    {{-- logo --}}
    <link rel="shortcut icon" href="{{asset('admin/images/Small-logo.png')}}" />
  </head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <div class="brand_box">
      <a class="navbar-brand" href="{{url('/')}}">
        <span >
          <p style="color: black">Choose Your Cat</p>
        </span>
      </a>
    </div>
    <!-- end header section -->
    <!-- slider section -->
    <section class=" slider_section position-relative">
      <div id="carouselExampleControls" class="carousel slide " data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="img-box">
              <img src="{{asset('images/bg.jpg')}}" alt="">
            </div>
          </div>   
        </div>
      </div>
    </section>
    <!-- end slider section -->
  </div>

  <!-- nav section -->

  <section class="nav_section">
    <div class="container">
      <div class="custom_nav2">
        <nav class="navbar navbar-expand custom_nav-container ">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex  flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('/ranking')}}">Ranking </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('/compare')}}">Compare </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('/tentang')}}">About</a>
                </li>
              
              
            
              <li class="nav-item d-flex ">
                
                <div class="collapse fade " id="searchForm">
                  <form method="GET" action="/home/cari">
                  <input id="search"  type="search" name="cari" class="form-control border-0 bg-light" placeholder="search" />
                  </form>
                </div>
                <a class="nav-link ml-auto" href="#searchForm" data-target="#searchForm" data-toggle="collapse">
                  <i class="nav_search-btn" >&nbsp;&ensp;&ensp;‎‎‎‎‎</i>
                </a>
              </li>
        
            </div>
          </div>
        </nav>
      </div>
    </div>
  </section>

  <!-- end nav section -->

  <!-- shop section -->
  <!-- end shop section -->

  <!-- about section -->
  <!-- end about section -->

  <!-- fruit section -->

  <section class="fruit_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <hr>
        <h2>
          Informasi Kucing
        </h2>
      </div>
    </div>
    <div class="container-fluid">
      <div class="fruit_container">
        
        @foreach ($data_home->shuffle() as $home)
            
        <div class="box">
          <img src="{{asset('images/kucing')}}/{{$home->foto}}" alt="" style="width: 100%; height: 500px;">
          <div class="link_box">
            <h5>
              {{$home->jenis_kucing}}
            </h5>
            <a  type="button" data-toggle="modal" data-target="#{{$home->jenis_kucing}}">
              info
            </a>
          </div>
        </div>
        @endforeach
       
      </div>
    </div>
  </section>
  <div style="margin-left:50%">{{$data_home->links('pagination::bootstrap-4')}}</div>
@foreach ($data_home as $modal)
    

  <!-- Modal -->
<div class="modal fade" id="{{$modal->jenis_kucing}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered " role="document">
	<div class="modal-content">

		<div class="modal-header">
  
            <h1  style="margin-left : 30%" id="exampleModalLongTitle">{{$modal->jenis_kucing}}</h1>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		</div>
		<div class="modal-body">

			<div class="card mb-3">
				<div class=" row no-gutters">
					<div class="col-md-6 mt-5">
					<img src="{{asset('/images/kucing')}}/{{$modal->foto}}" width="100"  class="card-img" alt=""></a>
					</div>
					<div class="col-md-6">
						<div class="card-body">
							{{-- <h4 class="card-title text-black">Informasi Kucing</h4> --}}
                            <div class="text-black">
                              <p>{{$modal->penjelasan}}</p>
                                <tr>
									<td><h4 style="text-align: left;"><b>Biaya Adopsi :</h5></b></td>
									<td><h5>Rp.{{number_format($modal->biaya_adopsi,2,',',',')}},-</h5></td>
								</tr>
                                <?php
                                if($modal->perawatan==1){
                                    $perawatan = "sangat mudah";
                                }
                                elseif ($modal->perawatan==2) {
                                    $perawatan = "mudah";
                                }
                                elseif ($modal->perawatan==3) {
                                    $perawatan = "tidak sulit dan tidak mudah";
                                }
                                elseif ($modal->perawatan==4) {
                                    $perawatan = "sulit";
                                }
                                elseif ($modal->perawatan==5) {
                                    $perawatan = "sangat sulit";
                                }
                                ?>
								<tr>
									<td><h4 style="text-align: left;"><b>Perawatan :</b></h4></td>
									<td><h5>{{$perawatan}}</h5></td>
								</tr>
								
                                <?php
                                if($modal->ling_hidup==1){
                                    $lingkungan_hidup = "Dimana Saja";
                                }
                                elseif ($modal->ling_hidup==2) {
                                    $lingkungan_hidup = "Ditempat Bersih atau Luas";
                                }
                                elseif ($modal->ling_hidup==3) {
                                    $lingkungan_hidup = "Ditempat Bersih dan Luas";
                                }
                                elseif ($modal->ling_hidup==4) {
                                    $lingkungan_hidup = "Ditempat Spesial untuk Rasnya";
                                }
                                elseif ($modal->ling_hidup==5) {
                                    $lingkungan_hidup = "Ditempat Bersih, Luas, dan Spesial untuk Rasnya";
                                }
                                ?>
								<tr>
									<td><h4 style="text-align: left;"><b>Lingkungan Hidup atau kandang :</b></h4></td>
									<td><h5>{{$lingkungan_hidup}}</h5></td>
								</tr>
                <?php
                if($modal->sifat==1){
                    $sifat = "Kurang Cerdas dan Kurang Bersahabat";
                }
                elseif ($modal->sifat==2) {
                    $sifat = "Cerdas Atau Bersahabat";
                }
                elseif ($modal->sifat==3) {
                    $sifat = "Cerdas dan Bersahabat";
                }
                elseif ($modal->sifat==4) {
                    $sifat = "Sangat cerdas atau sangat Bersahabat";
                }
                elseif ($modal->sifat==5) {
                    $sifat = "Sangat cerdas dan sangat Bersahabat";
                }
                ?>
                                <tr>
									<td><h4 style="text-align: left;"><b>Sifat :</b></h4></td>
									<td><h5>{{$sifat}}</h5></td>
								</tr>

                                <?php
                                if($modal->penampilan==1){
                                    $penampilan = "Kurang Menarik";
                                }
                                elseif ($modal->penampilan==2) {
                                    $penampilan = "Biasa Saja";
                                }
                                elseif ($modal->penampilan==3) {
                                    $penampilan = "Cukup Menarik";
                                }
                                elseif ($modal->penampilan==4) {
                                    $penampilan = "Menarik";
                                }
                                elseif ($modal->penampilan==5) {
                                    $penampilan = "Sangat Menarik";
                                }
                                ?>
                                <tr>
									<td><h4 style="text-align: left;"><b>penampilan :</b></h4></td>
									<td><h5>{{$penampilan}}</h5></td>
								</tr>

                                <?php
                                if($modal->ketenaran==1){
                                    $kepemilikan = "Banyak yang sudah punya";
                                }
                                elseif ($modal->ketenaran==2) {
                                    $kepemilikan = "Tidak banyak dan Tidak sedikit yang punya";
                                }
                                elseif ($modal->ketenaran==3) {
                                    $kepemilikan = "Cukup jarang yang punya";
                                }
                                elseif ($modal->ketenaran==4) {
                                    $kepemilikan = "Jarang yang punya";
                                }
                                elseif ($modal->ketenaran==5) {
                                    $kepemilikan = "Jarang Sekali yang punya";
                                }
                                ?>
                                <tr>
									<td><h4 style="text-align: left;"><b>kepemilikan :</b></h4></td>
									<td><h5>{{$kepemilikan}}</h5></td>
								</tr>
							</div>
						</div>
					</div>
				</div>
			</div>
    </div>
  </div>
  </div>
</div>

      @endforeach
      {{-- end modal --}}

  <!-- end fruit section -->
  <!-- client section -->
  <!-- end client section -->
  <!-- contact section -->
  <!-- end contact section -->
  <!-- info section -->
  <!-- end info section -->
  <!-- footer section -->
  {{-- <section class="container-fluid footer_section ">
    <p>
      &copy; <span id="displayYear"></span> All Rights Reserved. Design by
      <a href="https://html.design/">Free Html Templates</a>
    </p>
  </section> --}}
  <!-- footer section -->

  <script type="text/javascript" src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/custom.js')}}"></script>

</body>

</html>