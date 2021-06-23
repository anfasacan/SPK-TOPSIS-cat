@extends('Layout.A_master')

@section('dashboard')


 
    

<div class="main-panel">
    <div class="content-wrapper">
{{-- tempat berada --}}
        <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">Dashboard</h4>
                </div>
              </div>
            </div>
          </div>
{{-- isi --}}
      <div class="row">
        <div class="col-md-3 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <p class="card-title text-md-center text-xl-left">Ras Kucing yang terdaftar</p>
              <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{$nilai_data}}</h3>
                <i class="ti-layers icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
              </div>  
            </div>
          </div>
        </div>  
        
        <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <p class="card-title text-md-center text-xl-left">Lihat dan edit hasil survei</p>
                <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <a type="button" class="btn btn-outline-success btn-fw" href="https://docs.google.com/forms/d/1SynGsdMHFWi1MbwPL4wqbP2KFge9EKsdmABPaSHRJ1A/edit#responses" target="_blank">Hasil Survei</a>
                    <i class="ti-bar-chart-alt icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                </div>  
              </div>
            </div>
          </div> 
        
    </div>
    {{-- pemisah --}}
    {{-- pemisah --}}
    
      <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title">Bobot Kriteria</h2>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>
                        #  
                    </th> 
                    <th>
                        Nama Bobot  
                    </th>
                    <th>
                        Value  
                    </th>
                    <th>
                        Jenis  
                    </th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($bobot as $bbt)
                  <tr>
                    <td>
                      {{$bbt->id}}
                    </td>
                    <td>
                      {{$bbt->nama_bobot}}
                    </td>
                    <td>
                      {{$bbt->value}}
                    </td>
                    <td>
                      {{$bbt->tipe}}
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      </div>
@endsection