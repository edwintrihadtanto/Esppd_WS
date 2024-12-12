<div class="col-md-12" style="margin-top: 15px;">
  <div class="card card-outline card-success">
    <div class="overlay-wrapper" id="loading_pend_rwi">
      <div class="overlay">
        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
      </div>
    </div>

    <div class="card-body bg-teal color-palette" id='pencarian'>
      <div class="row">

        <div class="form-group col-2">
          <label for="exempel1"> Medrec</label>
          <input type="search" class="form-control form-control-sm" id="kd_pasiencari" placeholder="Enter Medrec ..." autocomplete="off">
        </div>

        <div class="form-group col-2">
          <label for="exempel1"> Nama</label>
          <input type="search" class="form-control form-control-sm" id="neme" placeholder="Nama ..." autocomplete="off">
        </div>

        <div class="form-group col-2">
          <label for="exempel1"> Nik. Kependudukan :</label>
          <input type="search" class="form-control form-control-sm" id="nik" placeholder="Nik ..." autocomplete="off">
        </div>

        <div class="form-group col-2">
          <label for="exempel1"> Telp :</label>
          <input type="search" class="form-control form-control-sm" id="telp" placeholder="Telp ..." autocomplete="off">
        </div>

        <div class="form-group col-2">
          <label for="exempel1"> Alamat :</label>
          <input type="search" class="form-control form-control-sm" id="alamat" placeholder="Alamat ..." autocomplete="off">
        </div>

        <div class="form-group col-2">
          <label for="exempel1"> Jmlh Pasien :</label>
          <select size="1" class="form-control form-control-sm" id="RWIkasir_jumlah_tampilkan" onchange="jumlah_tampilkan();">
            <option value="10">10 Pasien</option>
            <option value="15">15 Pasien</option>
            <option value="20">20 Pasien</option>
            <option value="25">25 Pasien</option>
            <option value="30">30 Pasien</option>
          </select>
        </div>



      </div>

    </div>
  </div>
</div>

<section class="content" id='tabelpasien'>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header  bg-teal color-palette">
            <h3 class="card-title"><i class="fas fa-hospital-user"></i> Kunjungan</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body" id='idmedrec'>
            <table id="list-data" class="table table-bordered table-hover">
              <thead>
                <tr class="bg-teal color-palette">
                  <th>No. Medrec</th>
                  <th>Nama</th>
                  <th>Alamat(s)</th>
                  <th>Telp</th>
                  <th>Tgl Kunjungan</th>
                  <th>Unit</th>
                </tr>
              </thead>
              <tbody id="list-databody">
              </tbody>
              <tfoot>
                <tr class="bg-teal color-palette">
                  <th>No. Medrec</th>
                  <th>Nama</th>
                  <th>Alamat(s)</th>
                  <th>Telp</th>
                  <th>Tgl Kunjungan</th>
                  <th>Unit</th>

                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->


        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>


<div class="col-md-12" style="margin-top: 0px;display:none" id='pendaftaran_rwi'>
  <div class="card">
    <!-- /.card-header -->
    <div class="card-body">

      <div class="form-msg"></div>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <div class="alert bg-teal color-palette alert-dismissible col-xs-offset-2">
        <i class="fas fa-hospital-user"></i> PENDAFTARAN RAWAT INAP
        <button type="button" class="btn bg-success btn-xs" type="submit" id='btn_submit'> <i class="fas fa-save"></i> Save</button>

        <div class="btn-group pull-right">
          <button type="button" class="btn bg-maroon btn-xs"><i class="fas fa-print"></i> Cetak</button>
          <button type="button" class="btn btn-danger dropdown-toggle dropdown-icon btn-xs" data-toggle="dropdown">
            <span class="sr-only">Toggle Dropdown</span>
          </button>
          <div class="dropdown-menu" role="menu">
            <a class="dropdown-item" href="#" style='color:brown'><i class="fas fa-tag"></i> Surat Pernyataan</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" style='color:brown'><i class="fas fa-id-card"></i> Lembar Keluar Masuk</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" style='color:brown'><i class="fas fa-id-card"></i> Label Pasien</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" style='color:brown'><i class="fas fa-id-card"></i> Status Pasien</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" style='color:brown'><i class="fas fa-barcode"></i> Label Barcode</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" style='color:brown'><i class="fas fa-barcode"></i> Gelang Pasien</a>
            <div class="dropdown-divider"></div>
          </div>
        </div>

        <button type="button" class="btn bg-lightblue btn-xs"> <i class="fas fa-tag"></i> Data Bpjs</button>
        <button type="button" class="btn bg-warning btn-xs" id='caripasien'> <i class="fas fa-search"></i></i> Search</button>

      </div>

      <form id="form-epndaftaran-rwi" method="POST" enctype="multipart/form-data">
        <input type="hidden" class="form-control" id="waktu_create" name="waktu_create" value="" placeholder="Enter Medrec">


        <div class='col-md-12'>

          <div class="row">

            <div class="form-group col-2">
              <label for="exempel1"> Medrec :</label>
              <input type="text" class="form-control is-warning form-control-sm" id="kd_pasien" name="kd_pasien" onkeyup="" placeholder="Enter Medrec ...">
            </div>

            <div class="form-group col-3">
              <label for="exempel2">Nama :</label>
              <input type="text" class="form-control form-control-sm is-warning" id="nama" name="nama" placeholder="Nama ..." required>
            </div>

            <div class="form-group col-md-2">
              <label for="exempel">Nik Kependudukan :</label>
              <input type="text" class="form-control form-control-sm is-warning" id="no_pengenal" name="no_pengenal" placeholder="nomor identitas ..." required>
            </div>

            <div class="form-group col-2">
              <label for="exempel2">Nama Keluarga :</label>
              <input type="text" class="form-control form-control-sm is-warning" id="nama_keluarga" name="nama_keluarga" placeholder="Nama Keluarga ..." required>
            </div>

            <div class="form-group col-md-1">
              <label for="exempel">Agama :</label>
              <select class="form-control form-control-sm select2 is-warning" name="agama" id="agama" style="width: 100%;" required>
                <option value=''>Pilih</option>
              </select>
            </div>

            <div class="form-group col-md-1">
              <label for="exempel">Kelamin : </label>
              <select class="form-control form-control-sm is-warning" id="jenis_kelamin" name="jenis_kelamin" required>
                <option value=''>Pilih</option>
                <option value='t'>Laki - Laki</option>
                <option value='f'>Perempuan</option>

              </select>
            </div>

            <div class="form-group col-md-1">
              <label for="exempel">Gol.Darah :</label>
              <select class="form-control form-control-sm select2 is-warning" name="darah" id="darah" style="width: 100%;" required>
                <option value=''>Pilih</option>

              </select>
            </div>

            <div class="form-group col-md-1">
              <label for="exempel">Marital :</label>
              <select class="form-control form-control-sm select2 is-warning" name="merital" id="merital" style="width: 100%;" required>
                <option value=''>Pilih</option>

              </select>
            </div>



            <div class="form-group col-md-2">
              <label for="exempel3">Tempat. Lahir :</label>
              <input type="text" class="form-control form-control-sm datepicker is-warning" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir ..." required>
            </div>

            <div class="form-group col-md-2">
              <label for="exempel3">Tgl. Lahir :</label>
              <input type="date" class="form-control form-control-sm datepicker is-warning" id="tgl_lahir" data-date-format="yyyy-mm-dd" name="tgl_lahir" placeholder="Lahir ..." required>
            </div>

            <div class="form-group col-md-1">
              <label for="exempel3">Tahun :</label>
              <input type="text" class="form-control form-control-sm datepicker is-warning" id="tahun" name="tahun" placeholder="Tahun ..." required>
            </div>

            <div class="form-group col-md-1">
              <label for="exempel3">Bulan :</label>
              <input type="text" class="form-control form-control-sm datepicker is-warning" id="bulan" name="bulan" placeholder="Bulan ..." required>
            </div>

            <div class="form-group col-md-1">
              <label for="exempel3">Hari :</label>
              <input type="text" class="form-control form-control-sm datepicker is-warning" id="hari" name="hari" placeholder="Bulan ..." required>
            </div>



            <div class="form-group col-md-1">
              <label for="exempel">Pendidikan :</label>
              <select class="form-control form-control-sm select2 is-warning" name="pendidikan" id="pendidikan" style="width: 100%;" required>
                <option value=''>Pilih</option>

              </select>
            </div>


            <div class="form-group col-md-2">
              <label for="exempel">Pekerjaan :</label>
              <select class="form-control form-control-sm select2 is-warning" name="pekerjaan" id="pekerjaan" style="width: 100%;" required>
                <option value=''>Pilih</option>

              </select>
            </div>

            <div class="form-group col-md-1">
              <div class="form-check">
                <label for="exempel"></label>
                <input class="form-check-input" name="marital" id="marital" value="t" type="checkbox">
                <label class="form-check-label">WNA</label>
              </div>
            </div>

            <div class="form-group col-2">
              <label for="exempel2">Nama Ayah :</label>
              <input type="text" class="form-control form-control-sm is-warning" id="nama_ayah" name="nama_ayah" placeholder="Nama Ayah ..." required>
            </div>

            <div class="form-group col-2">
              <label for="exempel2">Nama Ibu :</label>
              <input type="text" class="form-control form-control-sm is-warning" id="nama_ibu" name="nama_ibu" placeholder="Nama Ibu ..." required>
            </div>
            <div class="form-group col-2">
              <label for="exempel2">Telpon :</label>
              <input type="text" class="form-control form-control-sm is-warning" id="telp" name="telp" placeholder="telp ..." required>
            </div>



          </div>
        </div>



        <div class='col-md-12'>
          <div class="row">
            <!-- <div class="col-md-12 alert alert-success alert-dismissible">ALAMAT KTP</div> -->

            <div class="form-group col-2">
              <label for="exempel2">Alamat KTP :</label>
              <input type="text" class="form-control form-control-sm is-valid" id="alamat" name="alamat" placeholder="Alamat ..." required>
            </div>

            <div class="form-group col-md-2">
              <label for="exempel">Provinsi :</label>
              <select class="form-control form-control-sm select2 is-valid" name="provinsi" id="provinsi" style="width: 100%;" required>
                <option value=''> - Silahkan Pilih -</option>

              </select>
            </div>



            <div class="form-group col-md-2">
              <label for="exempel">Kab/Kot :</label>
              <select class="form-control form-control-sm select2 is-valid" name="kab" id="kab" style="width: 100%;" required>
                <option value=''> - Silahkan Pilih -</option>

              </select>
            </div>


            <div class="form-group col-md-2">
              <label for="exempel">Kecamatan :</label>
              <select class="form-control form-control-sm select2 is-valid" name="kecamatan" id="kecamatan" style="width: 100%;" required>
                <option value=''> - Silahkan Pilih -</option>

              </select>
            </div>


            <div class="form-group col-md-2">
              <label for="exempel">Kelurahan :</label>
              <select class="form-control form-control-sm select2 is-valid" name="kelurahan" id="kelurahan" style="width: 100%;" required>
                <option value=''> - Silahkan Pilih -</option>

              </select>
            </div>

            <div class="form-group col-1">
              <label for="exempel2">Kd. Pos :</label>
              <input type="text" class="form-control form-control-sm is-valid" id="kode_pos" name="kode_pos" placeholder="Kode ..." required>
            </div>
          </div>
        </div>
        <div class='col-md-12'>
          <div class="row">
            <!-- <div class="col-md-12 alert alert-success alert-dismissible">ALAMAT DOMISILI</div> -->

            <div class="form-group col-2">
              <label for="exempel2">Alamat Domisili:</label>
              <input type="text" class="form-control form-control-sm is-valid" id="alamat" name="alamat" placeholder="Alamat ..." required>
            </div>

            <div class="form-group col-md-2">
              <label for="exempel">Provinsi :</label>
              <select class="form-control form-control-sm select2 is-valid" name="provinsi" id="provinsi" style="width: 100%;" required>
                <option value=''> - Silahkan Pilih -</option>

              </select>
            </div>



            <div class="form-group col-md-2">
              <label for="exempel">Kab/Kot :</label>
              <select class="form-control form-control-sm select2 is-valid" name="kab" id="kab" style="width: 100%;" required>
                <option value=''> - Silahkan Pilih -</option>

              </select>
            </div>


            <div class="form-group col-md-2">
              <label for="exempel">Kecamatan :</label>
              <select class="form-control form-control-sm select2 is-valid" name="kecamatan" id="kecamatan" style="width: 100%;" required>
                <option value=''> - Silahkan Pilih -</option>

              </select>
            </div>


            <div class="form-group col-md-2">
              <label for="exempel">Kelurahan :</label>
              <select class="form-control form-control-sm select2 is-valid" name="kelurahan" id="kelurahan" style="width: 100%;" required>
                <option value=''> - Silahkan Pilih -</option>

              </select>
            </div>

            <div class="form-group col-1">
              <label for="exempel2">Kd. Pos :</label>
              <input type="text" class="form-control form-control-sm is-valid" id="kode_pos" name="kode_pos" placeholder="Kode ..." required>
            </div>

          </div>
        </div>
        <div class="col-md-12">
          <!-- <div class="row"> -->
          <div class="card bg-teal color-palette card-tabs">
            <div class="card-header p-0 pt-1">
              <ul class="nav nav-tabs" id="tabs_pend_rwi" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" style="color:black" data-toggle="tab" href="#kunjungan">Kunjungan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" style="color:black" data-toggle="tab" href="#penerimaan">Penerimaan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" style="color:black" data-toggle="tab" href="#penangungjawab">Penanggung Jawab</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" style="color:black" data-toggle="tab" href="#riwayatdiagnosa">Riwayat Penyakit</a>
                </li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div id="kunjungan" class="container tab-pane active"><br>

                  <div class='col-md-12'>
                    <div class="row">
                      <!-- <div class="col-md-12 alert alert-success alert-dismissible"><h3>KUNJUNGAN</h3></div> -->
                      <div class="form-group col-2">
                        <label for="exempel2">Tgl Kunjung :</label>
                        <input type="date" class="form-control form-control-sm is-warning" id="tgl_kunjungan" name="tgl_kunjungan" placeholder="Tgl Kunjung ..." required>
                      </div>

                      <div class="form-group col-1">
                        <label for="exempel2">Jam :</label>
                        <input type="text" class="form-control form-control-sm is-warning" id="jam" name="jam" placeholder="jam ..." required>
                      </div>


                      <div class="form-group col-md-2">
                        <label for="exempel">Spesialisasi Pasien :</label>
                        <select class="form-control form-control-sm select2 is-warning" id="kd_spesial" name="kd_spesial" style="width: 100%;" required>

                        </select>
                      </div>


                      <div class="form-group has-error col-md-2">
                        <label for="exempel">Kelas :</label>
                        <select class="form-control form-control-sm select2 is-warning" id="kd_kelas" name="kd_kelas" style="width: 100%;" required>
                        </select>
                      </div>


                      <div class="form-group has-error col-md-2">
                        <label for="exempel">Unit :</label>
                        <select class="form-control form-control-sm select2 is-warning" id="kd_unit" name="kd_unit" style="width: 100%;" required>
                        </select>
                      </div>


                      <div class="form-group has-warning col-md-3">
                        <label for="exempel">Tempat Tidur :</label>
                        <select class="form-control form-control-sm select2 is-warning" name="no_kamar" id="no_kamar" style="width: 100%;" required>
                          <option value=''> - Silahkan Pilih -</option>

                        </select>
                      </div>


                      <div class="form-group has-warning col-md-2">
                        <label for="exempel">Kelompok pasien :</label>
                        <select class="form-control form-control-sm select2 is-warning" name="kel_pas" id="kel_pasien" style="width: 100%;" required>
                          <option value=''> - Silahkan Pilih -</option>

                        </select>
                      </div>

                      <div class="form-group has-warning col-md-2">
                        <label for="exempel">Perseorangan :</label>
                        <select class="form-control form-control-sm select2 is-warning" name="kd_customer" id="kd_customer" style="width: 100%;" required>
                          <option value=''> - Silahkan Pilih -</option>

                        </select>
                      </div>

                      <div class="form-group has-warning col-md-2">
                        <label for="exempel">Cara Masuk :</label>
                        <select class="form-control form-control-sm select2 is-warning" name="cara_masuk" id="cara_masuk" style="width: 100%;" required>
                          <option value=''> - Silahkan Pilih -</option>

                        </select>
                      </div>

                      <div class="form-group has-warning col-md-3">
                        <label for="exempel">Diagnosa :</label>
                        <input type="text" class="form-control form-control-sm is-valid is-warning" id="diagnosa" name="diagnosa" placeholder="Diagnosa ..." required>


                        </select>
                      </div>

                      <div class="form-group has-warning col-md-3">
                        <label for="exempel">No. SJP :</label>
                        <input type="text" class="form-control form-control-sm is-valid is-warning" id="sjp" name="sjp" placeholder="Diagnosa ..." required>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="penerimaan" class="container tab-pane fade"><br>

                  <div class="card-body col-md-12">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Rujukan Pasien :</label>
                      <select class="form-control form-control-sm select2 is-warning" name="asal_pasien" id="asal_pasien" style="width: 100%;" required>
                        <option value='1'> - Datang Sendiri -</option>
                        <option value='2'> - Rujukan -</option>

                      </select>
                    </div>
                    <div class="dropdown-divider"></div>

                    <div id='rujukandariluar' style="display:none">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Rujukan Dari :</label>
                        <select class="form-control form-control-sm select2 is-warning" name="asal_pasien" id="asal_pasien" style="width: 100%;" required>
                          <option value=''> - Silahkan Pilih -</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Instansi luar :</label>
                        <select class="form-control form-control-sm select2 is-warning" name="instansi" id="instansi" style="width: 100%;" required>
                          <option value=''> - Silahkan Pilih -</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Alamat :</label>
                        <input type="text" class="form-control form-control-sm is-warning" id="alamat_ruj" name="alamat_ruj" placeholder="alamat ..." required>

                      </div>
                    </div>



                  </div>
                </div>
                <div id="penangungjawab" class="container tab-pane fade"><br>
                  <div class="card-body" id='penangungjawab'>
                    <div class="row">

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-md-4 col-form-label">Nama</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control form-control-sm" id="namapj" placeholder="Nama ...">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-md-4 col-form-label">No. Ktp</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control form-control-sm" id="noktppj" placeholder="Ktp ...">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-md-4 col-form-label">Hubungan</label>
                        <div class="col-sm-10">
                          <div class="col-sm-10">
                            <select class="form-control form-control-sm select2 is-warning" name="hub_pj" id="hub_pj" style="width: 100%;" required>
                              <option value=''> - Silahkan Pilih -</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-md-4 col-form-label">Kelamin</label>
                        <div class="col-sm-10">
                          <select class="form-control form-control-sm select2 is-warning" name="jenis_kel_pj" id="jenis_kel_pj" style="width: 100%;" required>
                            <option value=''> - Silahkan Pilih -</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-md-4 col-form-label">Marital</label>
                        <div class="col-sm-10">
                          <select class="form-control form-control-sm select2 is-warning" name="status_material_pj" id="status_material_pj" style="width: 100%;" required>
                            <option value=''> - Silahkan Pilih -</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-md-4 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control form-control-sm" id="tempatlahirpj" placeholder="Alamat ...">

                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-md-4 col-form-label">Provinsi</label>
                        <div class="col-sm-10">
                          <select class="form-control form-control-sm select2 is-warning" name="kd_provinsi_pj" id="kd_provinsi_pj" style="width: 100%;" required>
                            <option value=''> - Silahkan Pilih -</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-md-4 col-form-label">Kab Kot</label>
                        <div class="col-sm-10">
                          <select class="form-control form-control-sm select2 is-warning" name="kd_kot_pj" id="kd_kot_pj" style="width: 100%;" required>
                            <option value=''> - Silahkan Pilih -</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-md-4 col-form-label">Kec</label>
                        <div class="col-sm-10">
                          <select class="form-control form-control-sm select2 is-warning" name="kd_kec_pj" id="kd_kec_pj" style="width: 100%;" required>
                            <option value=''> - Silahkan Pilih -</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-md-4 col-form-label">Kelurahan</label>
                        <div class="col-sm-10">
                          <select class="form-control form-control-sm select2 is-warning" name="kd_kelurahan_pj" id="kd_kelurahan_pj" style="width: 100%;" required>
                            <option value=''> - Silahkan Pilih -</option>
                          </select>
                        </div>
                      </div>


                    </div>
                  </div>
                </div>
                <div id="riwayatdiagnosa" class="container tab-pane fade"><br>

                  <div class="card-body" id="riwayatdiagnosa">
                    <table id="" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>Tgl</th>
                          <th>Kode</th>
                          <th>Penyakit</th>
                          <th>Status Diagnosa</th>
                        </tr>
                      </thead>
                      <tbody id="list-databody">
                        <tr>
                          <td>19/12/2023</td>
                          <td>M.ji</td>
                          <td>Diabetus</td>
                          <td>Daignosa Utama</td>
                        </tr>
                        <tr>
                          <td>19/12/2023</td>
                          <td>M.ji</td>
                          <td>Diabetus</td>
                          <td>Daignosa Utama</td>
                        </tr>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>Tgl</th>
                          <th>Kode</th>
                          <th>Penyakit</th>
                          <th>Status Diagnosa</th>

                        </tr>
                      </tfoot>
                    </table>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- </div> -->






    </div>
  </div>

  </form>

</div>



<!-- /.nav-tabs-custom -->

<script type="text/javascript">
  $(document).ready(function() {
    // var MyTable = $('#list-data').dataTable({
    //   "paging": true,
    //   "lengthChange": true,
    //   "searching": true,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false
    // });

    // $('#list-data').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    //   "responsive": true,
    // });

    // function refresh() {
    //   MyTable = $('#list-data').dataTable();
    // }

    // $("#kd_pasiencari").keypress(function() {
    $(document).on('keypress', function(e) {
      if (e.which == 13) {
        alert('Data Tersedia !');
        var table = document.getElementById("list-data");
        var row = table.insertRow(1);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell6 = row.insertCell(4);
        cell1.innerHTML = "000001";
        cell2.innerHTML = "Reski Alfan";
        cell3.innerHTML = "Jln Alang-alang";
        cell4.innerHTML = "089890890";
        cell5.innerHTML = "07-10-2023";
        cell6.innerHTML = "General Checkup";
      }
      console.log("Handler for .keypress() called.");
      // $("list-databody").append("<tr><td>000001</td><td>Sumitro Supir</td><td>Bangkalan meduro</td><td> 42323232323</td><td>07-10-1990</td><td>Poli saraf</td></tr>");


    })

    $("#idmedrec").click(function() {
      alert("Menuju halaman pendaftran.");
      $("#pencarian").hide();
      $("#tabelpasien").hide();
      $("#pendaftaran_rwi").show();


    });

    $("#caripasien").click(function() {
      alert("Kembali ke pencarian.");
      $("#pencarian").show();
      $("#tabelpasien").show();
      $("#pendaftaran_rwi").hide();

    });

    $('#asal_pasien').on('change', function() {
      $("#rujukandariluar").show();
    });

    function refresh_pendft_rwi() {
      $('#loading_pend_rwi').hide();
    }

    setTimeout(refresh_pendft_rwi, 1000);

  });
</script>