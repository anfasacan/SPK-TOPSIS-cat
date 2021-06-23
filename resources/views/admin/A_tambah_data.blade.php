@extends('Layout.A_master')

@section('edit')

      <div class="card-body">
        <h4 class="card-title">Tambah Data</h4>
        <p class="card-description">
          Tempat Menambah data-data
        </p>
        <form  method="POST" class="forms-sample" action="/admin_data/tambahkan" enctype="multipart/form-data">
          @csrf
          
          <div class="form-group">
            <label for="id">id</label>
            <input type="text" class="form-control" id="id" placeholder="id" name="id" value="">
          </div>

          <div class="form-group">
            <label for="jenis_kucing">Jenis Kucing</label>
            <input type="text" class="form-control" id="jenis_kucing" placeholder="jenis_kucing" name="jenis_kucing" value="">
          </div>
    

          <div class="form-group">
            <label for="jenis_kucing">File Foto</label>
            <input type="file" class="form-control" id="foto" placeholder="foto" name="foto">
          </div>

          <div class="form-group">
            <label for="Penjelasan">Penjelasan</label>
            <textarea class="form-control" id="Penjelasan" name="penjelasan" rows="4"></textarea>
          </div>

          <div class="form-group">
            <label for="biaya_adopsi">Biaya Adopsi</label>
            <input type="text" class="form-control" id="biaya_adopsi" placeholder="biaya_adopsi" name="biaya_adopsi" value="">
          </div>

          <div class="form-group">
            <label for="perawatan">Perawatan</label>
              <select class="form-control" id="perawatan" name="perawatan">
                <option value="Mohon data Perawatan di isi" >Silahkan Pilih</option>
                <option value="1">1. Sangat Mudah</option>
                <option value="2">2. Mudah</option>
                <option value="3">3. Tidak sulit dan Tidak Mudah</option>
                <option value="4">4. Sulit</option>
                <option value="5">5. Sangat Sulit</option>
              </select>
            </div>

            <div class="form-group">
              <label for="ling_hidup">Lingkungan Hidup</label>
                <select class="form-control" id="ling_hidup" name="ling_hidup">
                  <option value="Mohon data lingkungan hidup di isi" >Silahkan Pilih</option>
                  <option value="1">1. Dimana Saja</option>
                  <option value="2">2. Ditempat Bersih atau Luas</option>
                  <option value="3">3. Ditempat Bersih dan Luas</option>
                  <option value="4">4. Ditempat Special untuk Rasnya</option>
                  <option value="5">5. Ditempat Bersi, Luas, dan Special untuk Rasnya</option>
                </select>
              </div>

              <div class="form-group">
                <label for="sifat">Sifat</label>
                  <select class="form-control" id="sifat" name="sifat">
                    <option value="Mohon data sifat di isi" >Silahkan Pilih</option>
                    <option value="1">1. Kurang Cerdas dan Kurang Bersahabat</option>
                    <option value="2">2. Cerdas Atau Bersahabat</option>
                    <option value="3">3. Cerdas dan Bersahabat</option>
                    <option value="4">4. Sangat Cerdas atau Sangat Bersahabat</option>
                    <option value="5">5. Sangat Cerdas dan Bersahabat</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="penampilan">Penampilan</label>
                    <select class="form-control" id="penampilan" name="penampilan">
                      <option value="Mohon data penamilan di isi" >Silahkan Pilih</option>
                      <option value="1">1. Kurang Menarik</option>
                      <option value="2">2. Biasa Saja</option>
                      <option value="3">3. Cukup Menarik</option>
                      <option value="4">4. Menarik</option>
                      <option value="5">5. Sangat Menarik</option>
                    </select>
                  </div>
          
                  <div class="form-group">
                    <label for="ketenaran">Ketenaran</label>
                      <select class="form-control" id="ketenaran" name="ketenaran">
                        <option value="Mohon data ketenaran di isi" >Silahkan Pilih</option>
                        <option value="1">1. Banyak yang sudah punya</option>
                        <option value="2">2. Tidak banyak dan Tidak sedikit yang punya</option>
                        <option value="3">3. Cukup jarang yang punya</option>
                        <option value="4">4. Jarang yang punya</option>
                        <option value="5">5. Jarang Sekali yang punya</option>
                      </select>
                    </div>

          <button type="submit" class="btn btn-primary mr-2">Tambah Data</button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>

@endsection