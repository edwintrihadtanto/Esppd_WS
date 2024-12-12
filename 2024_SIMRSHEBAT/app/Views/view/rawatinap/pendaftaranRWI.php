<?php
date_default_timezone_set('Asia/Jakarta');
$nowday     = date('Y-m-d');
$nextday    = $nowday;
?>
<div class="col-md-12 p-2">
  <div class="card card-outline">
    <div class="overlay-wrapper" id="RWIpend_loadingawal">
      <div class="overlay">
        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
      </div>
    </div>
    <form id='pencarianpasienrwi'>
      <div class="card-body p-2 darkgrey-custom" id='RWI_pend_pencarian'>
        <div class="row row-custom">
          <div class="col-sm-auto">
            <div class="form-group">
              <label>Cari No. RM / Nama Pasien :</label>
              <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                  <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="height:25px;"></button>
                  <ul class="dropdown-menu">
                    <li class="dropdown-item cri_normpendfRWI" onclick="show_cri_normpendfRWI()">No. RekamMedik</a></li>
                    <li class="dropdown-item cri_nmpasienpendfRWI" onclick="show_cri_nmpasienpendfRWI()">Nama Pasien</a></li>
                  </ul>
                </div>
                <input type="search" class="form-control form-control-xs" placeholder="No. RM..." id="RWIpend_kd_pasiencari" autocomplete="off">
                <input type="search" class="form-control form-control-xs" placeholder="Nama Pasien..." id="RWIpend_nm_pasiencari" autocomplete="off">
              </div>
            </div>
          </div>
          <div class="col-sm-auto">
            <div class="form-group">
              <label> NIK. Kependudukan :</label>
              <input type="search" class="form-control form-control-xs" name="RWIcarinik" id="RWIcarinik" placeholder="NIK..." autocomplete="off">
            </div>
          </div>
          <!-- <div class="col-sm-auto">
            <div class="form-group">
              <label for="exempel1"> Telp :</label>
              <input type="search" class="form-control form-control-xs" placeholder="Telp..." autocomplete="off">
            </div>
          </div> -->
          <div class="col-sm-auto">
            <div class="form-group">
              <label for="exempel1"> Alamat :</label>
              <input type="search" class="form-control form-control-xs" name="RWIcarialamatktp" id="RWIcarialamatktp" placeholder="Alamat..." autocomplete="off">
            </div>
          </div>
          <div class="col-sm-auto">
            <div class="form-group">
              <label for="exempel1"> Jmlh Pasien :</label>
              <select size="1" class="form-control form-control-xs" id="jml_pasien_rwi_cari">
                <option value="10">10 Pasien</option>
                <option value="15">15 Pasien</option>
                <option value="20">20 Pasien</option>
                <option value="25">25 Pasien</option>
                <option value="30">30 Pasien</option>
                <option value="30">Semua Pasien</option>
              </select>
            </div>
          </div>

          <input type="submit" style="display:none" />
    </form>
  </div>
</div>

<div class="col-12 p-1" id='RWIpend_tabelpasien'>
  <div class="card">
    <div class="card-header p-2 darkgrey-custom">
      <div class="row">
        <div class="col-md-10">
          <h6 class="hr6-custom"><i class="fas fa-hospital-user"></i> Daftar Pasien</h6>
          <button class="btn bg-gradient-secondary btn-xs bayibarulahir"><i class="fa fa-plus"></i> Bayi Baru Lahir</button>
        </div>
        <div class="col-md-2">
          <div class="form_group">
            <label>Tgl. Kunjung :</label>
            <input type="date" name="RWIpendf_tglkunjungan" id="RWIpendf_tglkunjungan" class="form-control form-control-xs" disabled>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body" style="padding: 0px; max-height: 320px; overflow: auto;">
      <table id="RWIpendf_tabel" class="table table-striped table-sm choose" style="border-collapse: inherit;">
        <thead>
          <tr>
            <th>#</th>
            <th>No. RM</th>
            <th>Nama</th>
            <th>Alamat(s)</th>
            <th>Telp</th>
            <th>Tgl Kunjungan</th>
            <th>Unit</th>
          </tr>
        </thead>
        <tbody id='listtablePasienRwi'></tbody>
      </table>
    </div>
  </div>
</div>

<div class="card-body p-1" id='RWIpendaftaran' style="display:none">
<div class="overlay-wrapper" id="RWIpend_loadingformdaftar">
      <div class="overlay">
        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
      </div>
    </div>
  <div class="card-header p-2 darkgrey-custom">
    <div class="row">
      <div class="col-md-12">
        <h6 class="hr6-custom"><i class="fas fa-hospital-user"></i> Pendaftaran Pasien Rawat Inap</h6>
        <button type="button" class="btn bg-gradient-secondary btn-xs" type="submit" onclick="savependfrwi();"> <i class="fas fa-save"></i> Simpan</button>
        <div class="btn-group pull-right">
          <button type="button" class="btn bg-gradient-secondary btn-xs"><i class="fas fa-print"></i> Cetak</button>
          <button type="button" class="btn bg-gradient-secondary dropdown-toggle dropdown-icon btn-xs" data-toggle="dropdown">
            <span class="sr-only">Toggle Dropdown</span>
          </button>
          <div class="dropdown-menu p-1" role="menu">
            <a class="dropdown-item" href="#"><i class="fa fa-file"></i> Surat Pernyataan</a>
            <div class="dropdown-divider m-0"></div>
            <a class="dropdown-item" href="#"><i class="fa fa-file"></i> Lembar Keluar Masuk</a>
            <div class="dropdown-divider m-0"></div>
            <a class="dropdown-item" href="#" onclick="RWIpendf_createlabelpasien()"><i class="fa fa-user"></i> Label Pasien</a>
            <div class="dropdown-divider m-0"></div>
            <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Status Pasien</a>
            <div class="dropdown-divider m-0"></div>
            <a class="dropdown-item" href="#" onclick="RWIpendf_createkartupasien()"><i class="fa fa-credit-card"></i> Kartu Pasien</a>
            <a class="dropdown-item" href="#" onclick="RWIpendf_cetakkartukontrol()"><i class="fa fa-credit-card"></i> Kartu Kontrol</a>
            <a class="dropdown-item" href="#" onclick="RWIpendf_gelang()"><i class="fa fa-user"></i> Gelang Pasien</a>
          </div>
        </div>
        <button type="button" class="btn bg-gradient-secondary btn-xs" type="submit" onclick="pendafrwicarisep()"> <i class="fas fa-user-plus"></i> Data SEP</button>
        <button type="button" class="btn bg-gradient-secondary btn-xs" type="submit" id='caripasien'> <i class="fas fa-arrow-left"></i> Kembali</button>
      </div>
    </div>
  </div>

  <form id="form-epndaftaran-rwi" method="POST" enctype="multipart/form-data">
    <div class='col-md-12 p-0'>
      <div class="row">

        <div class="col-1">
          <label for="exempel1"> No. RM :</label>
          <input type="hidden" class="form-control  form-control-xs" id="rwipendafidtransaksi" name="rwipendafidtransaksi" onkeyup="" placeholder="id trans ..." readonly>
          <input type="text" class="form-control  form-control-xs" id="rwipendafkdpasien" name="rwipendafkdpasien" onkeyup="" placeholder="Enter Medrec ..." readonly>
        </div>

        <div class="col-3">
          <label for="exempel2">Nama :</label>
          <input type="text" class="form-control form-control-xs " id="rwipendafnamapasien" name="rwipendafnamapasien" onkeypress="rwipendafnamapasienx(event)">
        </div>

        <div class="col-md-2">
          <label for="exempel">NIK Kependudukan :</label>
          <input type="text" class="form-control form-control-xs " id="rwipendafnik" name="rwipendafnik" placeholder="nomor identitas ..." onkeypress="rwipendafnikx(event)">
        </div>

        <div class="col-2">
          <label for="exempel2">Nama Keluarga :</label>
          <input type="text" class="form-control form-control-xs " id="rwipendafkeluarga" name="rwipendafkeluarga" placeholder="Nama Keluarga ..." onkeypress="rwipendafkeluargax(event)">
        </div>

        <div class="col-md-1">
          <label for="exempel">Agama :</label>
          <select class="form-control form-control-xs select2 " name="rwipendafagama" id="rwipendafagama" style="width: 100%;" onkeypress="tampil_agama(event)">

          </select>
        </div>

        <div class="col-md-1">
          <label for="exempel">Kelamin : </label>
          <select class="form-control form-control-xs " id="rwipendafkelamin" name="rwipendafkelamin" onkeypress="rwipendafkelaminx(event)">
            <option value=''>Pilih</option>
            <option value='t'>Laki - Laki</option>
            <option value='f'>Perempuan</option>

          </select>
        </div>

        <div class="col-md-1">
          <label for="exempel">Gol.Darah :</label>
          <select class="form-control form-control-xs select2 " name="rwipendafgoldarah" id="rwipendafgoldarah" style="width: 100%;" onkeypress="rwipendafgoldarahx(event)">
            <option value=''>Pilih</option>

          </select>
        </div>

        <div class="col-md-1">
          <label for="exempel">Marital :</label>
          <select class="form-control form-control-xs select2 " name="rwipendafstatusmarital" id="rwipendafstatusmarital" style="width: 100%;">
            <option value=''>Pilih</option>

          </select>
        </div>

        <div class="col-md-2">
          <label for="exempel3">Tempat. Lahir :</label>
          <input type="text" class="form-control form-control-xs datepicker " id="rwipendaftempatlahir" name="rwipendaftempatlahir" onkeypress="rwipendaftempatlahirx(event)" placeholder="Tempat Lahir ...">
        </div>

        <div class="col-md-2">
          <label for="exempel3">Tgl. Lahir :</label>
          <input type="date" class="form-control form-control-xs"  id="rwipendaftanggallahir" format-date='dd-mm-yyyy' name="rwipendaftanggallahir" placeholder="Lahir ..." onchange="age()">
        </div>
        <div class="col-md-2">
          <div class="form_group">
            <label>Umur</label>
            <input type="text" name="rwipendafumur" id="rwipendafumur" class="form-control form-control-xs" placeholder="Otomatis" disabled>
          </div>
        </div>
        <!-- <div class="col-md-1">
          <label for="exempel3">Tahun :</label>
          <input type="text" class="form-control form-control-xs datepicker " id="tahun" name="tahun" placeholder="Tahun ..." readonly>
        </div>

        <div class="col-md-1">
          <label for="exempel3">Bulan :</label>
          <input type="text" class="form-control form-control-xs datepicker " id="bulan" name="bulan" placeholder="Bulan ..." readonly>
        </div>

        <div class="col-md-1">
          <label for="exempel3">Hari :</label>
          <input type="text" class="form-control form-control-xs datepicker " id="hari" name="hari" placeholder="Bulan ..." readonly>
        </div>
 -->
        <div class="col-md-1">
          <label for="exempel">Pendidikan :</label>
          <select class="form-control form-control-xs select2 " name="rwipendafpendidikan" id="rwipendafpendidikan" onkeypress="rwipendafpendidikanx(event)" style="width: 100%;">
            <option value=''>Pilih</option>
          </select>
        </div>

        <div class="col-md-2">
          <label for="exempel">Pekerjaan :</label>
          <select class="form-control form-control-xs select2 " name="rwipendafpekerjaan" id="rwipendafpekerjaan" onkeypress="rwipendafpekerjaanx(event)" style="width: 100%;">
            <option value=''>Pilih</option>
          </select>
        </div>
        <div class="col-1">
          <label for="exempel2">Telpon :</label>
          <input type="number" min="0" max="12" class="form-control form-control-xs " id="rwipendaftelepon" name="rwipendaftelepon" placeholder="telp ...">
        </div>

        <div class="col-md-1">
          <div class="form-check">
            <label for="exempel">WNI</label><br>
            <!-- <input class="form-check-input" name="rwipendafwni" id="rwipendafwni" onkeypress="rwipendafwnix(event)" value="t" type="checkbox"> -->
            <input type="checkbox" name="rwipendafwni" checked="true" id="rwipendafwni" onkeypress="rwipendafwnix(event)">
          </div>
        </div>

        <!-- <div class="col-2">
          <label for="exempel2">Nama Ayah :</label>
          <input type="text" class="form-control form-control-xs " id="nama_ayah" name="nama_ayah" onkeypress="nama_ayahx(event)" placeholder="Nama Ayah ...">
        </div>

        <div class="col-2">
          <label for="exempel2">Nama Ibu :</label>
          <input type="text" class="form-control form-control-xs " id="nama_ibu" name="nama_ibu" onkeypress="nama_ibux(event)" placeholder="Nama Ibu ...">
        </div>

         -->

      </div>
    </div>

    <div class='col-md-12 p-0'>
      <div class="row">
        <div class="col-2">
          <label for="exempel2">Alamat KTP :</label>
          <input type="text" class="form-control form-control-xs " id="rwipendafalamatktp" name="rwipendafalamatktp" placeholder="Alamat ...">
        </div>

        <div class="col-md-2">
          <label for="exempel">Provinsi :</label>
          <select class="form-control form-control-xs select2 " name="rwipendafpropinsiktp" id="rwipendafpropinsiktp" onchange="tampil_pendfrwikotaktp(event)" style="width: 100%;">
            <option value=''> - Silahkan Pilih -</option>
          </select>
        </div>

        <div class="col-md-2">
          <label for="exempel">Kab/Kot :</label>
          <select class="form-control form-control-xs select2 " name="rwipendafkabupatenktp" id="rwipendafkabupatenktp" onchange="tampil_pendfrwikecamatanktp(event)" style="width: 100%;">
            <option value=''> - Silahkan Pilih -</option>
          </select>
        </div>

        <div class="col-md-2">
          <label for="exempel">Kecamatan :</label>
          <select class="form-control form-control-xs select2 " name="rwipendafkecamatanktp" id="rwipendafkecamatanktp" onchange="tampil_pendfrwikelurahanktp(event)" style="width: 100%;">
            <option value=''> - Silahkan Pilih -</option>
          </select>
        </div>

        <div class="col-md-2">
          <label for="exempel">Kelurahan :</label>
          <select class="form-control form-control-xs select2 " name="rwipendafkelurahanktp" id="rwipendafkelurahanktp" style="width: 100%;">
            <option value=''> - Silahkan Pilih -</option>
          </select>
        </div>

        <div class="col-1">
          <label for="exempel2">Kd. Pos :</label>
          <input type="text" class="form-control form-control-xs " id="rwipendafkdposktp" name="rwipendafkdposktp" maxlength='5' placeholder="Kode ...">
        </div>
      </div>
    </div>

    <div class='col-md-12 p-0'>
      <div class="row">
        <div class="col-2">
          <label for="exempel2">Alamat Domisili:</label>
          <input type="text" class="form-control form-control-xs " id="rwipendafalamat" name="rwipendafalamat" placeholder="Alamat ...">
        </div>

        <div class="col-md-2">
          <label for="exempel">Provinsi :</label>
          <select class="form-control form-control-xs select2 " name="rwipendafpropinsi" id="rwipendafpropinsi" onchange="tampil_pendfrwikota(event)" style="width: 100%;">
            <!--    <option value=''> - Silahkan Pilih -</option> -->
          </select>
        </div>

        <div class="col-md-2">
          <label for="exempel">Kab/Kot :</label>
          <select class="form-control form-control-xs select2 " name="rwipendafkabupaten" id="rwipendafkabupaten" onchange="tampil_pendfrwikecamatan(event)" style="width: 100%;">
            <option value=''> - Silahkan Pilih -</option>

          </select>
        </div>

        <div class="col-md-2">
          <label for="exempel">Kecamatan :</label>
          <select class="form-control form-control-xs select2 " name="rwipendafkecamatan" id="rwipendafkecamatan" onchange="tampil_pendfrwikelurahan(event)" style="width: 100%;">
            <option value=''> - Silahkan Pilih -</option>
          </select>
        </div>

        <div class="col-md-2">
          <label for="exempel">Kelurahan :</label>
          <select class="form-control form-control-xs select2 " name="rwipendafkelurahan" id="rwipendafkelurahan" style="width: 100%;">
            <option value=''> - Silahkan Pilih -</option>

          </select>
        </div>

        <div class="col-1">
          <label for="exempel2">Kd. Pos :</label>
          <input type="text" class="form-control form-control-xs " id="rwipendafkdpos" name="rwipendafkdpos" maxlength='5' placeholder="Kode ...">
        </div>

      </div>
    </div>

    <div class="card-body p-1">
      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="pill" href="#kunjungan">Kunjungan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="pill" href="#penerimaan">Penerimaan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="pill" href="#penangungjawab">Penanggung Jawab</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="pill" href="#rwipendafkeluargakunjungan">Data Keluarga</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="pill" href="#riwayatdiagnosa">Riwayat Penyakit</a>
        </li>
      </ul>

    
              <div class="tab-content">
                <div class="tab-pane fade active show" id="kunjungan" role="tabpanel">
                  <div class="tab-custom-content">
                    <p class="lead mb-0"></p>
                  </div>
                  <div class='col-md-12 p-0'>
                    <div class="row">
                      <div class="col-2">
                        <label for="exempel2">Tgl Kunjung :</label>
                        <input type="date" class="form-control form-control-xs " id="tgl_kunjungan" name="tgl_kunjungan">
                      </div>

                      <!-- <div class="col-1"> -->
                        <!-- <label for="exempel2">Jam :</label> -->
                        <input type="hidden" class="form-control form-control-xs " id="jam" name="jam" readonly>
                        <input type="hidden" class="form-control form-control-xs " id="cara_masuk" name="cara_masuk" readonly>
                      <!-- </div> -->


                      <div class="col-md-2">
                        <label for="exempel">Spesialisasi Pasien :</label>
                        <select class="form-control form-control-xs select2 " id="rwi_sps_kam" name="rwi_sps_kam" style="width: 100%;" onchange="tampil_pendfrwiunit();" onkeypress="rwipendfspesialisasi(event)">

                        </select>
                      </div>


                      <div class="has-error col-md-2">
                        <label for="exempel">Kelas Unit :</label>
                        <select class="form-control form-control-xs select2 " id="rwipendafkd_unit" name="rwipendafkd_unit" style="width: 100%;" onchange="tampil_rwipendfruang(event)">
                        </select>
                      </div>

                      <div class="has-error col-md-2">
                        <label for="exempel">Ruang :</label>
                        <select class="form-control form-control-xs select2 " id="rwipendftr_ruang" name="rwipendftr_ruang" style="width: 100%;" onchange="tampil_rwipendfkamar(event)">
                        </select>
                      </div>


                      <div class="has-warning col-md-3">
                        <label for="exempel">Tempat Tidur :</label>
                        <select class="form-control form-control-xs select2 " name="id_kamar" id="id_kamar" style="width: 100%;">
                          <option value=''> - Silahkan Pilih -</option>
                        </select>
                      </div>


                      <div class="has-warning col-md-2">
                        <label for="exempel">Penjamin :</label>
                        <select class="form-control form-control-xs select2 " name="rwidafpenjamin" id="rwidafpenjamin" onchange="tampil_nomorasuransi(event);" style="width: 100%;">
                          <option value=''> - Silahkan Pilih -</option>

                        </select>
                      </div>

                      <!-- <div class="has-warning col-md-2">
                <label for="exempel">Perseorangan :</label>
                <select class="form-control form-control-xs select2 " name="kd_customer" id="kd_customer" style="width: 100%;" >
                  <option value=''> - Silahkan Pilih -</option>

                </select>
              </div> -->
                      <div class="has-warning col-md-2">
                        <label for="exempel">No Asuransi :</label>
                        <input class="form-control form-control-xs select2 " name="rwipendafnoasuransi" id="rwipendafnoasuransi" style="width: 100%;">
                      </div>

                      <div class="has-warning col-md-2">
                        <label for="exempel">Diagnosa :</label>
                        <select class="form-control form-control-xs rwidiagnosa" id="rwidiagnosa" name="rwidiagnosa">
                        </select>
                      </div>

                      <div class="has-warning col-md-2">
                        <label for="exempel">Dokter :</label>
                        <select class="select2 form-control form-control-xs kd_dokterranap" id="kd_dokterranap" name="kd_dokterranap">
                        </select>
                      </div>

                      <div class="has-warning col-md-2">
                        <label for="exempel">No. SJP :</label>
                        <input type="text" class="form-control form-control-xs  " id="no_sjp" name="no_sjp" placeholder="SJP ...">
                      </div>

                      <div class="has-warning col-md-1" style="display: grid;align-content: space-around;">
                        <input type="hidden" class="form-control form-control-xs" id="no_sjp_rajal" name="no_sjp_rajal" placeholder="SJP Rajal ...">
                        <input type="hidden" class="form-control form-control-xs" id="map_bpjs" name="map_bpjs" placeholder=" ...">
                        <button type="button" class="btn bg-secondary btn-xs buatsepinap" id="buatsjp"><i class="fas fa-plus"></i> Buat Sep</button>
                      </div>

                    </div>
                  </div>
                </div>

                <div class="tab-pane p-1 fade" id="rwipendafkeluargakunjungan" role="tabpanel">
                  <h6 class="lead mb-0"><u></u></h6>
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form_group">
                        <label>Nama Ayah</label>
                        <input type="text" name="rwipendafayah" id="rwipendafayah" class="form-control form-control-xs" value="tidak diketahui">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form_group">
                        <label>Pekerjaan Ayah</label>
                        <select type="text" name="rwipendafalamatayah" id="rwipendafpekerjaanayah" class="form-control form-control-xs">
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form_group">
                        <label>Pendidikan Ayah</label>
                        <select type="text" name="rwipendafpendidikanayah" id="rwipendafpendidikanayah" class="form-control form-control-xs">
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form_group">
                        <label>Nama Ibu</label>
                        <input type="text" name="rwipendafibu" id="rwipendafibu" class="form-control form-control-xs" value="tidak diketahui">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form_group">
                        <label>Pekerjaan Ibu</label>
                        <select type="text" name="rwipendafpekerjaanibu" id="rwipendafpekerjaanibu" class="form-control form-control-xs">
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form_group">
                        <label>Pendidikan Ibu</label>
                        <select type="text" name="rwipendafpendidikanibu" id="rwipendafpendidikanibu" class="form-control form-control-xs">
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="penerimaan" role="tabpanel">
                  <div class="tab-custom-content">
                    <p class="lead mb-0"></p>
                  </div>
                  <div class="card-body col-md-12 p-0">
                    <div class="col-md-auto">
                      <label for="exampleInputEmail1">Rujukan Pasien :</label>
                      <select class="form-control form-control-xs select2 " name="asal_pasien" id="asal_pasien" style="width: 100%;">
                        <option value='1'> - Datang Sendiri -</option>
                        <option value='2'> - Rujukan -</option>
                      </select>
                    </div>
                    <div class="dropdown-divider"></div>

                    <div id='rujukandariluar' style="display:none">
                      <div class="col-md-auto">
                        <label for="exampleInputEmail1">Rujukan Dari :</label>
                        <select class="form-control form-control-xs select2 " name="rwipendafrujukan" id="rwipendafrujukan" onchange="tampil_rujukanbyid(event);" style="width: 100%;">
                          <option value=''> - Silahkan Pilih -</option>
                        </select>
                      </div>
                      <div class="col-md-auto">
                        <label for="exampleInputEmail1">Instansi luar :</label>
                        <select class="form-control form-control-xs select2 " name="instansi" id="instansi" style="width: 100%;" onchange="tampil_alamatrujukanbyid(event)">
                          <option value=''> - Silahkan Pilih -</option>
                        </select>
                      </div>
                      <div class="col-md-auto">
                        <label for="exampleInputEmail1">Alamat :</label>
                        <input type="text" class="form-control form-control-xs " id="alamat_ruj" name="alamat_ruj" placeholder="alamat ...">

                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="penangungjawab" role="tabpanel">
                  <div class="tab-custom-content">
                    <p class="lead mb-0"></p>
                  </div>
                  <div class="card-body p-0" id='penangungjawab'>
                    <div class="row">
                      <div class="col-2">
                        <label for="exempel1"> Nama Pj:</label>
                        <input type="text" class="form-control  form-control-xs" id="rwipendafpenanggungjawab" name="rwipendafpenanggungjawab" value="tidak ada">
                      </div>
                      <div class="col-2">
                        <label for="exempel1"> No. KTP Pj :</label>
                        <input type="text" class="form-control  form-control-xs" id="rwipendafnikpenanggungjawab" name="rwipendafnikpenanggungjawab" value="tidak ada">
                      </div>
                      <div class="col-2">
                        <label for="exempel1"> Hubungan Pj:</label>
                        <!-- <select class="form-control form-control-xs " name="rwipendafhubpenanggungjawab" id="rwipendafhubpenanggungjawab">
                  <option value=''> - Silahkan Pilih -</option>
                  <option value=''></option>
                </select> -->
                        <input type="text" class="form-control  form-control-xs" id="rwipendafhubpenanggungjawab" name="rwipendafhubpenanggungjawab" value="tidak ada">

                      </div>

                      <div class="col-2">
                        <label for="exempel1"> Alamat Pj :</label>
                        <input type="text" class="form-control form-control-xs" id="rwipendafalamatpenanggungjawab" name="rwipendafalamatpenanggungjawab" placeholder="Alamat ..." value="tidak ada">
                      </div>


                      <!-- <div class="col-2">
                <label for="exempel1"> Alamat :</label>
                <input type="text" class="form-control form-control-xs" id="rwipendafalamatpenanggungjawab" name="rwipendafalamatpenanggungjawab" placeholder="Alamat ...">
              </div>
              <div class="col-2">
                <label for="exempel1"> Provinsi :</label>
                <select class="form-control form-control-xs " name="kd_provinsi_pj" id="kd_provinsi_pj" >
                  <option value=''> - Silahkan Pilih -</option>
                </select>
              </div>
              <div class="col-2">
                <label for="exempel1"> Kabupaten/Kota:</label>
                <select class="form-control form-control-xs " name="kd_kot_pj" id="kd_kot_pj" >
                  <option value=''> - Silahkan Pilih -</option>
                </select>
              </div>
              <div class="col-2">
                <label for="exempel1"> Kecamatan :</label>
                <select class="form-control form-control-xs " name="kd_kec_pj" id="kd_kec_pj" >
                  <option value=''> - Silahkan Pilih -</option>
                </select>
              </div>
              <div class="col-2">
                <label for="exempel1"> Kelurahan :</label>
                <select class="form-control form-control-xs " name="kd_kelurahan_pj" id="kd_kelurahan_pj" >
                  <option value=''> - Silahkan Pilih -</option>
                </select>
              </div> -->
                      <div class="col-2">
                        <label for="exempel1">No Tfl</label>
                        <input class="form-control form-control-xs " id="rwipendaftlfpenanggungjawab" name="rwipendaftlfpenanggungjawab" value="tidak ada">

                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="riwayatdiagnosa" role="tabpanel">
                  <div class="tab-custom-content">
                    <p class="lead mb-0"></p>
                  </div>
                  <div class="card-body p-0" id="riwayatdiagnosa">
                    <table class="table table-striped table-sm choose" id='tabelhistoripenyakitrwi' style="border-collapse: inherit;">
                      <thead>
                        <tr class="bg-teal">
                          <th width="50">#</th>
                          <th>Tgl</th>
                          <th>Kode</th>
                          <th>Penyakit</th>
                          <th>Status Diagnosa</th>
                        </tr>
                      </thead>
                      <tbody id="listtabelhistoripenyakitrwi">

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            </div>

  </form>
</div><!-- card-body -->

<div class="modalsepinap"></div>
<div class="modal fade" id="RWIpendf_ModalCariDataSEP" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header p-2">
        <h6 class="modal-title"><b>Data SEP Pasien</b></h6>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body p-1">
        <div class="card-body p-1" id="DivPendafrwi">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="pill" href="#rwipendafrwidatabpjspasien" onclick="rwipendafrwidatabpjspasien()">Detail Data BPJS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="pill" onclick="rwipendafhistorisep()" href="#rwipendafhistorisep">History SEP</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="pill" onclick="CekListRencanaKontrol()" href="#rwipendafhistorirencanakontrol">Data Rencana Kontrol</a>
            </li>
          </ul>
        </div>
        <div class="tab-content">
          <div class="tab-pane fade active show" id="rwipendafrwidatabpjspasien" role="tabpanel">
            <div class="card">
              <div class="card-body p-1">
                <table class="table">
                  <thead>
                    <tr>
                      <th colspan="2"><input type="hidden" name="noasuransibpjs" id="noasuransibpjs"></th>
                    </tr>
                    <tr>
                      <th scope="col">Data Pasien</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody id="DivpendafrwiDetailPesertaBPJS">
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="rwipendafhistorisep" role="tabpanel">
            <div class="card">
              <div class="card-body p-1">
                <table class="table table-striped table-sm choose" style="border-collapse: inherit;">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>SEP</th>
                      <th>Poli</th>
                      <th style="width: 80px">No Rujukan</th>
                      <th>Tgl SEP</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="tbodyrwipendafhistorisep">
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="rwipendafhistorirencanakontrol" role="tabpanel">
            <div class="card">
              <div class="card-body p-2">
                <table class="table table-striped table-sm choose" style="border-collapse: inherit;">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Klinik</th>
                      <th>Dokter</th>
                      <th style="width: 80px">Tanggal</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody id="tbodyrwipendafhistorirencanakontrol">

                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>

  </div>
</div><!-- col-md-12 -->

<script type="text/javascript">
  $(document).ready(function() {
    var nowday = "<?php echo $nowday; ?>";
    document.getElementById('RWIpendf_tglkunjungan').value = nowday;
    tampil_pendfrwiprov();
    tampil_pendfrwiprovktp();
    tampil_pendfrwipendidikan();
    tampil_pendfrwipekerjaan();
    tampil_spskamar();
    tampil_agama();
    tampil_darah();
    tampil_marital();
    tampil_penjamin();
    tampil_kekerabatan();
    tampil_dokter();
    tampil_pendfrwipekerjaanayah();
    tampil_pendfrwipekerjaanibu();
    tampil_pendfrwipendidikanibu();
    tampil_pendfrwipendidikanayah();
    $('#RWIpend_loadingformdaftar').hide();
    var kosong = "Tidak Diketahui";
    document.getElementById('rwipendafpenanggungjawab').value = kosong;
  });

  function pendafrwicarisep() {
    var param = {
      id: '2',
      id2: $("#rwipendafkdpasien").val(),
    };
    apiPOST('Data_Sosial/nomorasuransibyid', param, hasil => {
      var nomorkartu = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        nomorkartu += '' + a[i]['no_kartu'];
      }
      document.getElementById('noasuransibpjs').value = '' + nomorkartu;
      if (hasil['status'] == 'sukses') {
        rwipendafrwidatabpjspasien();
      }
    });



    $('#ModalCariDataSEP').modal("show");
    $('#RWIpendf_ModalCariDataSEP').modal("show");
  }

  function rwipendafrwidatabpjspasien() {
    var c = '';
    var param = {
      noka: $("#noasuransibpjs").val(),
    };
    apiPOST('Bridging/CariDetailPesertaBPJS', param, hasil => {
      var res = hasil['peserta'];
      c += ' <tr>';
      c += '<th scope="row">NOKA</th>';
      c += '<td>' + res['noKartu'] + '</td>';
      c += '</tr>';
      c += ' <tr>';
      c += '<th scope="row">NIK</th>';
      c += '<td>' + res['nik'] + '</td>';
      c += '</tr>';
      c += ' <tr>';
      c += '<th scope="row">Nama</th>';
      c += '<td>' + res['nama'] + '</td>';
      c += '</tr>';
      c += ' <tr>';
      c += '<th scope="row">Kelas</th>';
      c += '<td>' + res['hakKelas']['keterangan'] + '</td>';
      c += '</tr>';
      c += ' <tr>';
      c += '<th scope="row">Status</th>';
      c += '<td>' + res['statusPeserta']['keterangan'] + '</td>';
      c += '</tr>';
      document.getElementById('DivpendafrwiDetailPesertaBPJS').innerHTML = c;

    });
  }

  function rwipendafhistorisep() {
    var a = '';
    var param = {
      noka: $("#noasuransibpjs").val(),
    };
    apiPOST('Bridging/CariSep', param, hasil => {
      var b = hasil['histori'];
      for (var i = 0; i < b.length; i++) {
        a += '<tr>';
        a += '<th scope="row">1</th>';
        a += '<td><button class="btn-primary" onclick=inputskdp(`' + b[i]['noSep'] + '`)>' + b[i]['noSep'] + '</button></td>';
        a += '<td>' + b[i]['poli'] + '</td>';
        a += '<td>' + b[i]['noRujukan'] + '</td>';
        a += '<td>' + b[i]['tglSep'] + '</td>';
        a += '<td><button class="btn-primary" onclick=CetakSepIrna(`' + b[i]['noSep'] + '`)><i class="fas fa-print"></i></button></td></td>'
        a += '</tr>';
      }
      //document.getElementById('Divtampilskdp').style.display="block";
      //$('#modalTampilSKDP').modal("show");
      document.getElementById('tbodyrwipendafhistorisep').innerHTML = a;

    });
  }

  function CetakSepIrna(sep) {
    var param = {
      sep: sep,
    };
    newTabPOST('API/Bridging/CetakSEPIrna', param);
    return;
  }

  function CekListRencanaKontrol() {
    var a = '';
    var param = {
      noka: $("#noasuransibpjs").val(),
    };
    apiPOST('Bridging/CekListRencanaKontrol', param, hasil => {
      var b = hasil['data']['list'];
      for (var i = 0; i < b.length; i++) {
        a += '<tr>';
        a += '<th scope="row">1</th>';
        a += '<td><button class="btn-primary" onclick=inputskdp(`' + b[i]['noSuratKontrol'] + '`)>' + b[i]['noSuratKontrol'] + '</button></td>';
        a += '<td>' + b[i]['namaPoliTujuan'] + '</td>';
        a += '<td>' + b[i]['terbitSEP'] + '</td>';
        a += '<td>' + b[i]['tglTerbitKontrol'] + '</td>';
        a += '</tr>';
      }
      document.getElementById('tbodyrwipendafhistorirencanakontrol').innerHTML = a;

    });
  }

  function rwipendafnamapasienx(e) {
    if (e.keyCode == 13) {
      event.preventDefault();
      document.getElementById('rwipendafnik').focus();
    }
  }

  function rwipendafnikx(e) {
    if (e.keyCode == 13) {
      document.getElementById('rwipendafkeluarga').focus();
    }
  }

  function rwipendafkeluargax(e) {
    if (e.keyCode == 13) {
      document.getElementById('rwipendafagama').focus();
    }
  }

  function rwipendafkelaminx(e) {
    if (e.keyCode == 13) {
      document.getElementById('rwipendafgoldarah').focus();
    }
  }

  function rwipendafgoldarahx(e) {
    if (e.keyCode == 13) {
      document.getElementById('rwipendafstatusmarital').focus();
    }
  }

  function rwipendaftempatlahirx(e) {
    if (e.keyCode == 13) {
      document.getElementById('rwipendaftanggallahir').focus();
    }
  }

  function rwipendaftempatlahirx(e) {
    if (e.keyCode == 13) {
      document.getElementById('rwipendafpendidikan').focus();
    }
  }

  function rwipendafpendidikanx(e) {
    if (e.keyCode == 13) {
      document.getElementById('rwipendafpekerjaan').focus();
    }
  }

  function rwipendafpekerjaanx(e) {
    if (e.keyCode == 13) {
      document.getElementById('rwipendafwni').focus();
    }
  }

  function rwipendafwnix(e) {
    if (e.keyCode == 13) {
      document.getElementById('nama_ayah').focus();
    }
  }

  function nama_ayahx(e) {
    if (e.keyCode == 13) {
      document.getElementById('nama_ibu').focus();
    }
  }

  function nama_ayahx(e) {
    if (e.keyCode == 13) {
      document.getElementById('nama_ibu').focus();
    }
  }

  function nama_ibux(e) {
    if (e.keyCode == 13) {
      document.getElementById('rwipendaftelepon').focus();
    }
  }

  function rwipendafteleponx(e) {
    if (e.keyCode == 13) {
      document.getElementById('rwipendafalamatktp').focus();
    }
  }

  $(document).on("click", ".buatsepinap", function() {
    $('#RWIpend_loadingawal').show();
    var seprajal = $("#no_sjp_rajal").val();
    var telp = $("#rwipendaftelepon").val();
    var tglsep = $("#tgl_kunjungan").val();
    var id_unit = $("#rwipendafkd_unit").val();
    var no_rm = $("#rwipendafkdpasien").val();
    var poli_map_bpjs = $("#map_bpjs").val();
    var kd_dokter = $("#kd_dokterranap").val();
    var kd_diagnosa = $("#rwidiagnosa").val();



    user = JSON.parse(localStorage['data_user']);
    var id_user = user['id_user'];

    var json_data = {
      'seprajal': seprajal,
      'telp': telp,
      'tglsep': tglsep,
      'id_unit': id_unit,
      'user': id_user,
      'no_rm': no_rm,
      'poli': poli_map_bpjs,
      'kd_dokter': kd_dokter,
      'kd_diagnosa': kd_diagnosa
    };
    var myJSON = JSON.stringify(json_data);
    //alert(id);
    $('.modalsepinap').load('Bridging/modalsepinap?data=' + myJSON);
    // toastr.error('Data Permintaan Inap Tidak ditemukan');
    // return;
    $('#RWIpend_loadingawal').hide();

  })


  // $('.js-mySelect2').select2({
  //   dropdownCssClass: "custom-dropdown",
  //   placeholder: "Ketikan Kode Diagnosa",
  //     allowClear: true
  // }).on("select2:open", function(e) {
  //   var self = $(this);
  //   self.on('keyup', function() {
  //     console.log('ini' + self.val());
  //     document.getElementById("rwidiagnosa").focus();
  //   })
  //   self.on('change', function() {
  //     console.log('ini' + self.val());
  //   })
  //   self.on('click', function() {
  //     console.log('ini' + self.val());
  //     document.getElementById("rwidiagnosa").focus();
  //   })
  //   self.on('click', function() {
  //     document.getElementById("rwidiagnosa").focus();
  //   })
  // });

  // $(document).on('keyup', '.custom-dropdown .select2-search__field', function(ev) {
  //   var self = $(this);
  //   if (self.val().length > 2) {
  //     console.log('itu' + self.val());
  //     tampil_diagnosa(self.val());
  //   }
  // });
  // $("#kd_dokterranap").select2({
  //     placeholder: "Cari Dokter",
  //     allowClear: true
  //   });

  /*--- FUNGSI SELECT 2 DIAGNOSA --*/
  $(document).ready(function() {
    $("#rwidiagnosa").select2({
      placeholder: "Cari Diagnosa",
      allowClear: true,
    });

    $("#kd_dokterranap").select2({
      placeholder: "Pilih Dokter",
      allowClear: true,
      selectionCssClass: ":all:"
    });

    $(document).on('keyup', '.select2-search__field', function(event) {
          var self = $(this).val();
          if (self.length > 1) {
            RWIpendf_tampil_diagnosa(self);
          } 
        //}    
    });

  });

 /* $(document).on('select2:open', () => {
    document.querySelector('.select2-search__field').focus();
  });*/

  

  $('#rwidiagnosa').on('select2:selecting', function(e) {
    switch (e.which) {
      case 13:
        $("#kd_dokterranap").trigger('focus');
        break;
    }
  });

  $(document).on('keydown', '.select2-search__field', function(event) {  
    switch(event.which){
    case 13:
      $("#kd_dokterranap").trigger('focus');
      break;
    }
  });

  $('#rwidiagnosa').on('select2:select', function(e) {
    $("#kd_dokterranap").trigger('focus');
  });

  $('#rwidiagnosa').on('select2:clearing', function(e) {
    return 'Ketikan Kode Diagnosa';
  });

  $('#kd_dokterranap').on('select2:selecting', function(e) {
    switch (e.which) {
      case 13:
        $("#no_sjp").trigger('focus');
        break;
    }
  });

  /*--- END FUNGSI SELECT 2 DIAGNOSA --*/


  function RWIpendf_tampil_diagnosa(kode) {
    var param = {
      id: kode
    };
    apiPOST('Data_Sosial/diagnosabyname', param, hasil => {
      var diagnosa = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        diagnosa += '<option value="' + a[i]['id_penyakit'] + '">' + a[i]['id_penyakit'] + ' | ' + a[i]['penyakit'] + '</option>';
        // diagnosa += '<option value='+a[i].id_penyakit+'>'+a[i].a.id_penyakit+'</option>';
      }
      document.getElementById('rwidiagnosa').innerHTML = diagnosa;
    });
  }


  function tampil_penjamin() {
    apiPOST('Data_Sosial/penjamin', null, hasil => {
      var penjamin = '<option value=>*Pilih</option>';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        penjamin += '<option value="' + a[i]['id_penjamin'] + '">' + a[i]['nama_penjamin'] + '</option>';
      }
      document.getElementById('rwidafpenjamin').innerHTML = penjamin;
    });
  }

  function tampil_kekerabatan() {
    apiPOST('Data_Sosial/kekerabatan', null, hasil => {
      var penjamin = '<option value=>*Pilih</option>';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        penjamin += '<option value="' + a[i]['kd_kekerabatan'] + '">' + a[i]['nama_kekerabatan'] + '</option>';
      }
      document.getElementById('rwipendafhubpenanggungjawab').innerHTML = penjamin;
    });
  }



  function tampil_rujukanrwi() {
    apiPOST('Data_Sosial/rujukan_asal', null, hasil => {
      var penjamin = '<option value=>*Pilih</option>';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        penjamin += '<option value="' + a[i]['cara_penerimaan'] + '">' + a[i]['penerimaan'] + '</option>';
      }
      document.getElementById('rwipendafrujukan').innerHTML = penjamin;
    });
  }


  function tampil_rujukanbyid() {
    var param = {
      id: $("#rwipendafrujukan").val(),
    };
    apiPOST('Data_Sosial/rujukan', param, hasil => {
      var penjamin = '';
      //var penjamin = '<option value=>*Pilih</option>';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        penjamin += '<option value="' + a[i]['kd_rujukan'] + '">' + a[i]['rujukan'] + '</option>';
        var alamat = a[i]['alamat'];
      }
      document.getElementById('instansi').innerHTML = penjamin;
      // $('#instansi option').each(function() {
      // if($(this).is(':selected')) {
      //   alert('lol');
      // document.getElementById('alamat_ruj').value = alamat;
      // }
      // });
    });
  }

  function tampil_alamatrujukanbyid() {
    var param = {
      id: $("#instansi").val(),
    };
    apiPOST('Data_Sosial/rujukanbyidx', param, hasil => {
      var penjamin = '';
      //var penjamin = '<option value=>*Pilih</option>';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        var alamat = a[i]['alamat'];
      }
      document.getElementById('alamat_ruj').value = alamat;
      // $('#instansi option').each(function() {
      // if($(this).is(':selected')) {
      //   alert('lol');
      // }
      // });
    });
  }

  // function tampilalamatrujuakn(kode) {
  //   var param = {
  //     id: kode
  //   };
  //   document.getElementById("rwipendafstatusmarital").value = kode;
  // }

  function tampil_nomorasuransi() {
    var param = {
      id: $("#rwidafpenjamin").val(),
      id2: $("#rwipendafkdpasien").val(),
    };
    apiPOST('Data_Sosial/nomorasuransibyid', param, hasil => {
      var nomorkartu = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        nomorkartu += '' + a[i]['no_kartu'];
      }
      document.getElementById('rwipendafnoasuransi').value = '' + nomorkartu;

    });
  }

  function tampil_pendfrwikotaktp() {
    var param = {
      id: $("#rwipendafpropinsiktp").val(),
    };
    apiPOST('Data_Sosial/kota', param, hasil => {
      var kab = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        kab += '<option value="' + a[i]['kd_kabupaten'] + '">' + a[i]['kabupaten'] + '</option>';
      }
      document.getElementById('rwipendafkabupatenktp').innerHTML = kab;
    });
  }

  function tampil_pendfrwikecamatanktp() {
    var param = {
      id: $("#rwipendafkabupatenktp").val(),
    };
    apiPOST('Data_Sosial/kecamatan', param, hasil => {
      var kab = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        kab += '<option value="' + a[i]['kd_kecamatan'] + '">' + a[i]['kecamatan'] + '</option>';
      }
      document.getElementById('rwipendafkecamatanktp').innerHTML = kab;
    });
  }

  function tampil_pendfrwikabupatenktp() {
    var param = {
      id: $("#rwipendafkabupatenktp").val(),
    };
    apiPOST('Data_Sosial/kecamatan', param, hasil => {
      var kab = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        kab += '<option value="' + a[i]['kd_kecamatan'] + '">' + a[i]['kecamatan'] + '</option>';
      }
      document.getElementById('rwipendafkecamatanktp').innerHTML = kab;
    });
  }

  function tampil_pendfrwikelurahanktp() {
    var param = {
      id: $("#rwipendafkecamatanktp").val(),
    };
    apiPOST('Data_Sosial/kelurahan', param, hasil => {
      var kab = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        kab += '<option value="' + a[i]['kd_kelurahan'] + '">' + a[i]['kelurahan'] + '</option>';
      }
      document.getElementById('rwipendafkelurahanktp').innerHTML = kab;
    });
  }

  //hai
  function tampil_pendfrwikota() {
    var param = {
      id: $("#rwipendafpropinsi").val(),
    };
    apiPOST('Data_Sosial/kota', param, hasil => {
      var kab = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        kab += '<option value="' + a[i]['kd_kabupaten'] + '">' + a[i]['kabupaten'] + '</option>';
      }
      document.getElementById('rwipendafkabupaten').innerHTML = kab;
    });
  }

  // function tampil_pendfrwikabupaten() {
  //   var param = {
  //     id: $("#rwipendafkabupaten").val(),
  //   };
  //   apiPOST('Data_Sosial/kabupaten', param, hasil => {
  //     var kabx = '';
  //     var a = hasil['data'];
  //     for (var i = 0; i < a.length; i++) {
  //       kabx += '<option value="' + a[i]['kd_kabupaten'] + '">' + a[i]['kabupaten'] + '</option>';
  //     }
  //     document.getElementById('rwipendafkecamatan').innerHTML = kabx;
  //   });
  // }

  function tampil_pendfrwikecamatan() {
    var param = {
      id: $("#rwipendafkabupaten").val(),
    };
    apiPOST('Data_Sosial/kecamatan', param, hasil => {
      var kab = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        kab += '<option value="' + a[i]['kd_kecamatan'] + '">' + a[i]['kecamatan'] + '</option>';
      }
      document.getElementById('rwipendafkecamatan').innerHTML = kab;
    });
  }



  function tampil_pendfrwikelurahan() {
    var param = {
      id: $("#rwipendafkecamatan").val(),
    };
    apiPOST('Data_Sosial/kelurahan', param, hasil => {
      var kab = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        kab += '<option value="' + a[i]['kd_kelurahan'] + '">' + a[i]['kelurahan'] + '</option>';
      }
      document.getElementById('rwipendafkelurahan').innerHTML = kab;
    });
  }
  //hai

  function rwipendafmaritalbyid(kode) {
    var param = {
      id: kode
    };
    document.getElementById("rwipendafstatusmarital").value = kode;
  }

  function rwipendafagamabyid(kode) {
    var param = {
      id: kode
    };
    document.getElementById("rwipendafagama").value = kode;
  }

  function rwipendafkelaminbyid(kode) {
    var param = {
      id: kode
    };
    document.getElementById("rwipendafkelamin").value = kode;
  }

  function rwipendafdarahbyid(kode) {
    var param = {
      id: kode
    };
    document.getElementById("rwipendafgoldarah").value = kode;
  }

  function tampil_pendfrwikotaby(kode) {
    var param = {
      id: kode,
    };
    apiPOST('Data_Sosial/kota', param, hasil => {
      var kab = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        kab += '<option value="' + a[i]['kd_kabupaten'] + '">' + a[i]['kabupaten'] + '</option>';
      }
      document.getElementById('rwipendafkabupaten').innerHTML = kab;

    });
  }

  function tampil_marital() {
    apiPOST('Data_Sosial/marital', null, hasil => {
      var dar = "<option value=''> * Pilih </option>";
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        dar += '<option value="' + a[i]['kd_marital'] + '">' + a[i]['marital'] + '</option>';
      }
      document.getElementById('rwipendafstatusmarital').innerHTML = dar;
      // document.getElementById('status_material_pj').innerHTML = dar;

    });
  }

  function tampil_dokter() {
    apiPOST('Rawat_inap/dokter', null, hasil => {
      var dar = "<option value=''> * Pilih </option>";
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        dar += '<option value="' + a[i]['id_pegawai'] + '">' + a[i]['nama_pegawai'] + '</option>';
      }
      document.getElementById('kd_dokterranap').innerHTML = dar;
    });
  }

  function tampil_agama() {
    apiPOST('Data_Sosial/agama', null, hasil => {
      var aga = "<option value=''> * Pilih </option>";
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        aga += '<option value="' + a[i]['kd_agama'] + '">' + a[i]['agama'] + '</option>';
      }
      document.getElementById('rwipendafagama').innerHTML = aga;
    });
  }

  function tampil_darah() {
    apiPOST('Data_Sosial/darah', null, hasil => {
      var dar = "<option value=''> * Pilih </option>";
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        dar += '<option value="' + a[i]['id_gol_darah'] + '">' + a[i]['darah'] + '</option>';
      }
      document.getElementById('rwipendafgoldarah').innerHTML = dar;
    });
  }

  function historidiagnosa(kode) {
    $('#tabelhistoripenyakitrwi tbody').html('');
    var Baris = '';
    var listParam = [
      'cri_normpendfRWI'
    ];
    var param = {
      RWIpendkdpasiencari: kode

    };
    apiPOST("Rawat_inap/historipenyakit", param, hasil => {
      if (hasil['data'] !== null || hasil['data'] !== '' || empty(hasil['data'])) {
        //alert('tes');
        var no = 1;
        var a = hasil['data'];
        for (var i = 0; i < a.length; i++) {
          // alert(a[i].tgl_transaksi);
          Baris += '<tr>';
          Baris += '<td>' + no + '</td>';
          Baris += '<td>' + a[i].tgl_kunjungan + '</td>';
          Baris += '<td>' + a[i].id_penyakit + '</td>';
          Baris += '<td>' + a[i].penyakit + '</td>';
          Baris += '<td>' + a[i].status + '</td>'
          Baris += "</tr>";
          // alert('cari pasien' + a[i].id_transaksi );
          no++;
        }
        // $('#RWIpendf_tabel tbody').append(Baris);
        document.getElementById("listtabelhistoripenyakitrwi").innerHTML = Baris;
      }

    }, listParam);
  };

  $("#pencarianpasienrwi").submit(function(event) {
    $('#RWIpend_loadingawal').show();
    caripasienrwi();

    // alert("Handler for .submit() called.");
    event.preventDefault();
  });

  function caripasienrwi() {
    var normxrwi = document.getElementById('RWIpend_kd_pasiencari').value;
    // document.getElementById('RWIpend_kd_pasiencari').value = normOtomatis(normxrwi);

    $('#tableKasirIGD tbody').html('');
    var Baris = '';
    var listParam = [
      'cri_normpendfRWI', 'cri_nmpasienpendfRWI'
    ];
    var param = {
      RWIpendkdpasiencari: $("#RWIpend_kd_pasiencari").val(),
      RWIpendnmpasiencari: $("#RWIpend_nm_pasiencari").val(),
      RWIcarinik: $("#RWIcarinik").val(),
      RWIcarialamatktp: $("#RWIcarialamatktp").val(),
      jmlpasienrwicari: $("#jml_pasien_rwi_cari").val(),
    };
    apiPOST("Rawat_inap/caripasienrwi", param, hasil => {
      if (hasil['data'] !== null || hasil['data'] !== '' || empty(hasil['data'])) {
        //alert('tes');
        if (hasil['code'] == 'XX') {
          toastr.error('Data Permintaan Inap Tidak ditemukan');
          return;
        }
        if (hasil['data']) {
          var a = hasil['data'];
          for (var i = 0; i < a.length; i++) {
            // alert(a[i].tgl_transaksi);
            var tgl = a[i].tgl_masuk.substr(8, 2);
            var bln = a[i].tgl_masuk.substr(5, 2);
            var thn = a[i].tgl_masuk.substr(0, 4);
            tglmasuk = tgl + '/' + bln + '/' + thn;
            var no = i + 1;
            // if (a[i].id_transaksi == false) {
            //   var status = 'BELUM LUNAS';
            // } else {
            //   var status = 'LUNAS';
            // }
            Baris += '<tr onclick="detailpasienrwi(' + a[i].id_kunjungan + ')">';
            Baris += '<td>' + no + '</td>';
            Baris += '<td>' + a[i].no_rm + '</td>';
            Baris += '<td>' + a[i].nama + '</td>';
            Baris += '<td>' + a[i].alamat + '</td>';
            Baris += '<td>' + a[i].telepon + '</td>'
            Baris += '<td>' + tglmasuk + '</td>';
            Baris += '<td>' + a[i].nama_unit + '</td>';
            Baris += "</tr>";
            // alert('cari pasien' + a[i].id_transaksi );
            no++;
          }
        }
        $('#RWIpend_loadingawal').hide();
        // $('#RWIpendf_tabel tbody').append(Baris);
        document.getElementById("listtablePasienRwi").innerHTML = Baris;
      }

    }, listParam);
  };



  function tampil_spskamar() {
    apiPOST('Data_Sosial/spesialisasikamar', null, hasil => {
      var sps = "<option value=''> Pilih Spesialisasi </option>";
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        sps += '<option value="' + a[i]['id_spesialisasi_kamar'] + '">' + a[i]['nama_spesialisasi_kamar'] + '</option>';
      }
      document.getElementById('rwi_sps_kam').innerHTML = sps;
    });
  }

  function tampil_pendfrwiunit() {
    var param = {
      id: $("#rwi_sps_kam").val(),

    };
    apiPOST('Data_Sosial/unitsps', param, hasil => {
      var unit = "<option value=''> *Pilih </option>";
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        unit += '<option value="' + a[i]['id_unit'] + '">' + a[i]['nama_unit'] + '</option>';
      }
      document.getElementById('rwipendafkd_unit').innerHTML = unit;
    });
  }




  function tampil_rwipendfruang() {
    var param = {
      id: $("#rwipendafkd_unit").val(),
      id2: $("#rwi_sps_kam").val(),
    };
    apiPOST('Data_Sosial/ruangsps', param, hasil => {
      var ruang = "<option value=''> *Pilih </option>";
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        ruang += '<option value="' + a[i]['id_ruang'] + '">' + a[i]['nama_ruang'] + '</option>';
      }
      document.getElementById('rwipendftr_ruang').innerHTML = ruang;
    });
  }

  function tampil_rwipendfkamar() {
    var param = {
      id: $("#rwipendftr_ruang").val(),
      id_unit: $("#rwipendafkd_unit").val(),
    };
    apiPOST('Data_Sosial/kamarsps', param, hasil => {
      var kamar = "<option value=''> *Pilih </option>";
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        kamar += '<option value="' + a[i]['id_kamar'] + '">' + a[i]['nama_kamar'] + '  ( ' + a[i]['sisa'] + ' )</option>';
      }
      document.getElementById('id_kamar').innerHTML = kamar;
    });
  }

  $('#id_kamar').on('change', function() {
    var id_kamar = ($(this).find(":selected").val());
    var param = {
      id: id_kamar,
    };
    apiPOST('Rawat_inap/cekketersediaankamar', param, hasil => {
      var ruang = "";
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {

        if (a[i]['sisa'] <= 0) {
          tampil_rwipendfkamar();
          alert('Kamar Penuh' + a[i]['sisa']);
        }
      }
      // document.getElementById('rwipendftr_ruang').innerHTML = ruang;
    });
  });



  function savependfrwi() {
    if (document.getElementById('rwipendafwni').checked =true) {
    var wni=true;
  } else {
    var wni=false;
  }
  if($("#rwipendafnamapasien").val()==''){
    toastr.error('Nama Pasien Harap Diisi');
    return;
  }
  if($("#rwipendafkdposktp").val().length > 5 || $("#rwipendafkdpos").val().length > 5){
    toastr.error('Kode Pos Maksimal 5');
    return;
  }
  if($("#rwi_sps_kam").val()==''){
    toastr.error('Spesialisasi Mohon Diisi');
    return;
  }
  if($("#rwipendafkd_unit").val()==''){
    toastr.error('Kelas Unit Mohon Diisi');
    return;
  }
  if($("#rwipendftr_ruang").val()==''){
    toastr.error('Ruang Mohon Diisi');
    return;
  }
  if($("#id_kamar").val()==''){
    toastr.error('Kamar bed Mohon Diisi');
    return;
  }
  if($("#rwidiagnosa").val()==''){
    toastr.error('Diagnosa Awal Mohon Diisi');
    return;
  }
  if($("#rwidafpenjamin").val()==''){
    toastr.error('Penjamin Pasien Awal Mohon Diisi');
    return;
  }
  if($("#kd_dokterranap").val()==''){
    toastr.error('Dokter Mohon Diisi');
    return;
  }
   // $('#RWIpend_loadingformdaftar').show();
    var param = {
      no_rm: $("#rwipendafkdpasien").val(),
      namapasien: $("#rwipendafnamapasien").val(),
      keluarga: $("#rwipendafkeluarga").val(),
      agama: $("#rwipendafagama").val(),
      goldarah: $("#rwipendafgoldarah").val(),
      kelamin: $("#rwipendafkelamin").val(),
      statusmarital: $("#rwipendafstatusmarital").val(),
      tempatlahir: $("#rwipendaftempatlahir").val(),
      tanggallahir: $("#rwipendaftanggallahir").val(),
      nik: $("#rwipendafnik").val(),
      pendidikan: $("#rwipendafpendidikan").val(),
      pekerjaan: $("#rwipendafpekerjaan").val(),
      telepon: $("#rwipendaftelepon").val(),
      wni: wni,
      alamat: $("#rwipendafalamat").val(),
      propinsi: $("#rwipendafpropinsi").val(),
      kabupaten: $("#rwipendafkabupaten").val(),
      kecamatan: $("#rwipendafkecamatan").val(),
      kelurahan: $("#rwipendafkelurahan").val(),
      kdpos: $("#rwipendafkdpos").val(),
      alamatktp: $("#rwipendafalamatktp").val(),
      propinsiktp: $("#rwipendafpropinsiktp").val(),
      kabupatenktp: $("#rwipendafkabupatenktp").val(),
      kecamatanktp: $("#rwipendafkecamatanktp").val(),
      kelurahanktp: $("#rwipendafkelurahanktp").val(),
      kdposktp: $("#rwipendafkdposktp").val(),
      id_kamar: $("#id_kamar").val(),
      no_sjp: $("#no_sjp").val(),
      no_sjp_rajal: $("#no_sjp_rajal").val(),
      nama_penanggung_jawab: $("#rwipendafpenanggungjawab").val(),
      hubungan_penanggung_jawab: $("#rwipendafhubpenanggungjawab").val(),
      id_penanggung_jawab: $("#rwipendafnikpenanggungjawab").val(),
      alamatpenanggungjawab: $("#rwipendafalamatpenanggungjawab").val(),
      no_hp_penanggung_jawab: $("#rwipendaftlfpenanggungjawab").val(),
      ayah: $("#rwipendafayah").val(),
      pekerjaanayah: $("#rwipendafpekerjaanayah").val(),
      pendidikanayah: $("#rwipendafpendidikanayah").val(),
      ibu: $("#rwipendafibu").val(),
      pekerjaanibu: $("#rwipendafpekerjaanibu").val(),
      pendidikanibu: $("#rwipendafpendidikanibu").val(),
      id_user: user.id_user,
      id_unit: $("#rwipendafkd_unit").val(),
      caraterima: $("#asal_pasien").val(),
      // rujukan: $("#rwipendafrujukan").val(),
      rujukan: $("#instansi").val(),
      id_penjamin: $("#rwidafpenjamin").val(),
      tgl_masuk: $("#tgl_kunjungan").val(),
      jam_masuk: $("#jam").val(),
      nama_penanggung_jawab: $("#rwipendafpenanggungjawab").val(),

      diagnosa: $("#rwidiagnosa").val(),
      id_pegawai: $("#kd_dokterranap").val(),
      no_sjp: $("#no_sjp").val(),
      noka: $("#rwipendafnoasuransi").val(),
      idtransaksi: $("#rwipendafidtransaksi").val(),
    };
    if ($("#rwipendafkdpasien").val() > '') {
      apiPOST("Rawat_inap/addKunjunganrwi_lanjutan", param, hasil => {
        if (hasil['status'] == 'sukses') {
          apiPOST("Rawat_inap/updatepasienrwi", param, hasil => {
            $('#RWIpend_loadingformdaftar').hide();


          });
        }

      });
    } else {
      apiPOST("Rawat_inap/simpanpasienrwi", param, hasil => {
        if (hasil['status'] == 'sukses') {
          document.getElementById('rwipendafkdpasien').value = hasil['no_rm'];
          var param = {
            no_rm: $("#rwipendafkdpasien").val(),
      namapasien: $("#rwipendafnamapasien").val(),
      keluarga: $("#rwipendafkeluarga").val(),
      agama: $("#rwipendafagama").val(),
      goldarah: $("#rwipendafgoldarah").val(),
      kelamin: $("#rwipendafkelamin").val(),
      statusmarital: $("#rwipendafstatusmarital").val(),
      tempatlahir: $("#rwipendaftempatlahir").val(),
      tanggallahir: $("#rwipendaftanggallahir").val(),
      nik: $("#rwipendafnik").val(),
      pendidikan: $("#rwipendafpendidikan").val(),
      pekerjaan: $("#rwipendafpekerjaan").val(),
      telepon: $("#rwipendaftelepon").val(),
      wni: wni,
      alamat: $("#rwipendafalamat").val(),
      propinsi: $("#rwipendafpropinsi").val(),
      kabupaten: $("#rwipendafkabupaten").val(),
      kecamatan: $("#rwipendafkecamatan").val(),
      kelurahan: $("#rwipendafkelurahan").val(),
      kdpos: $("#rwipendafkdpos").val(),
      alamatktp: $("#rwipendafalamatktp").val(),
      propinsiktp: $("#rwipendafpropinsiktp").val(),
      kabupatenktp: $("#rwipendafkabupatenktp").val(),
      kecamatanktp: $("#rwipendafkecamatanktp").val(),
      kelurahanktp: $("#rwipendafkelurahanktp").val(),
      kdposktp: $("#rwipendafkdposktp").val(),
      id_kamar: $("#id_kamar").val(),
      no_sjp: $("#no_sjp").val(),
      no_sjp_rajal: $("#no_sjp_rajal").val(),
      nama_penanggung_jawab: $("#rwipendafpenanggungjawab").val(),
      hubungan_penanggung_jawab: $("#rwipendafhubpenanggungjawab").val(),
      id_penanggung_jawab: $("#rwipendafnikpenanggungjawab").val(),
      alamatpenanggungjawab: $("#rwipendafalamatpenanggungjawab").val(),
      no_hp_penanggung_jawab: $("#rwipendaftlfpenanggungjawab").val(),
      ayah: $("#rwipendafayah").val(),
      pekerjaanayah: $("#rwipendafpekerjaanayah").val(),
      pendidikanayah: $("#rwipendafpendidikanayah").val(),
      ibu: $("#rwipendafibu").val(),
      pekerjaanibu: $("#rwipendafpekerjaanibu").val(),
      pendidikanibu: $("#rwipendafpendidikanibu").val(),
      id_user: user.id_user,
      id_unit: $("#rwipendafkd_unit").val(),
      caraterima: $("#asal_pasien").val(),
      // rujukan: $("#rwipendafrujukan").val(),
      rujukan: $("#instansi").val(),
      id_penjamin: $("#rwidafpenjamin").val(),
      tgl_masuk: $("#tgl_kunjungan").val(),
      jam_masuk: $("#jam").val(),
      nama_penanggung_jawab: $("#rwipendafpenanggungjawab").val(),

      diagnosa: $("#rwidiagnosa").val(),
      id_pegawai: $("#kd_dokterranap").val(),
      no_sjp: $("#no_sjp").val(),
      noka: $("#rwipendafnoasuransi").val(),

          };
          apiPOST("Kunjungan/addKunjunganrwi", param, hasil => {
            $('#RWIpend_loadingformdaftar').hide();
          });
          
        } else {
          alert(hasil['pesan']);
        }
      });
    }
  }

  function tampil_pendfrwipendidikan() {
    apiPOST('Data_Sosial/pendidikan', null, hasil => {
      var pendidikan = "";
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        pendidikan += '<option value="' + a[i]['kd_pendidikan'] + '">' + a[i]['pendidikan'] + '</option>';
      }
      document.getElementById('rwipendafpendidikan').innerHTML = pendidikan;
      document.getElementById('rwipendafpendidikanayah').innerHTML = pendidikan;
      document.getElementById('rwipendafpendidikanibu').innerHTML = pendidikan;

    });
  }

  function tampil_pendfrwipekerjaan() {
    apiPOST('Data_Sosial/pekerjaan', null, hasil => {
      var pekerjaan = "";
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        pekerjaan += '<option value="' + a[i]['kd_pekerjaan'] + '">' + a[i]['pekerjaan'] + '</option>';
      }
      document.getElementById('rwipendafpekerjaan').innerHTML = pekerjaan;
      document.getElementById('rwipendafpekerjaanayah').innerHTML = pekerjaan;
      document.getElementById('rwipendafpekerjaanibu').innerHTML = pekerjaan;

    });
  }

  // function tampil_pendfrwipekerjaanayah(kode) {
  //   var param={id : kode};
  //   apiPOST('Data_Sosial/pekerjaanby', param, hasil => {
  //     var pekerjaan = '<option value="">*Pilih</option>';
  //     var a = hasil['data'];
  //     for (var i = 0; i < a.length; i++) {
  //       pekerjaan += '<option value="' + a[i]['kd_pekerjaan'] + '">' + a[i]['pekerjaan'] + '</option>';
  //     }
  //     // document.getElementById('rwipendafpekerjaan').innerHTML = pekerjaan;
  //     document.getElementById('rwipendafpekerjaanayah').innerHTML = pekerjaan;
  //     // document.getElementById('rwipendafpekerjaanibu').innerHTML = pekerjaan;

  //   });
  // }

  function tampil_pendfrwipekerjaanayah(kode) {
    var param = {
      id: kode
    };
    document.getElementById("rwipendafpekerjaanayah").value = kode;
  }

  function tampil_pendfrwipekerjaanibu(kode) {
    var param = {
      id: kode
    };
    document.getElementById("rwipendafpekerjaanibu").value = kode;
  }

  function tampil_pendfrwipendidikanayah(kode) {
    var param = {
      id: kode
    };
    document.getElementById("rwipendafpendidikanayah").value = kode;
  }

  function tampil_pendfrwipendidikanibu(kode) {
    var param = {
      id: kode
    };
    document.getElementById("rwipendafpendidikanibu").value = kode;
  }


  function tampil_pendfrwiprov() {

    apiPOST('Data_Sosial/propinsi', null, hasil => {
      var prov = '<option value="">* Pilih</option>';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        prov += '<option value="' + a[i]['kd_propinsi'] + '">' + a[i]['propinsi'] + '</option>';
      }
      document.getElementById('rwipendafpropinsi').innerHTML = prov;
    });
  }

  function tampil_pendfrwikota() {
    var param = {
      id: $("#rwipendafpropinsi").val(),
    };
    apiPOST('Data_Sosial/kota', param, hasil => {
      var kab = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        kab += '<option value="' + a[i]['kd_kabupaten'] + '">' + a[i]['kabupaten'] + '</option>';
      }
      document.getElementById('rwipendafkabupaten').innerHTML = kab;
    });
  }

  function tampil_pendfrwikec() {
    var param = {
      id: $("#rwipendafkabupaten").val(),
    };
    apiPOST('Data_Sosial/kecamatan', param, hasil => {
      var kec = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        kec += '<option value="' + a[i]['kd_kecamatan'] + '">' + a[i]['kecamatan'] + '</option>';
      }
      document.getElementById('rwipendafkecamatan').innerHTML = kec;
    });
  }

  function tampil_pendfrwikel() {
    var param = {
      id: $("#rwipendafkecamatan").val(),
    };
    apiPOST('Data_Sosial/kelurahan', param, hasil => {
      var kec = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        kec += '<option value="' + a[i]['kd_kelurahan'] + '">' + a[i]['kelurahan'] + '</option>';
      }
      document.getElementById('rwipendafkelurahan').innerHTML = kec;
    });
  }

  function tampil_pendfrwiprovktp() {
    apiPOST('Data_Sosial/propinsi', null, hasil => {
      var prov = '<option value="">* Pilih</option>';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        prov += '<option value="' + a[i]['kd_propinsi'] + '">' + a[i]['propinsi'] + '</option>';
      }
      document.getElementById('rwipendafpropinsiktp').innerHTML = prov;
    });
  }

  function tampil_pendfrwikotaktpx() {
    var param = {
      id: $("#rwipendafpropinsiktp").val(),
    };
    apiPOST('Data_Sosial/kota', param, hasil => {
      var kab = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        kab += '<option value="' + a[i]['kd_kabupaten'] + '">' + a[i]['kabupaten'] + '</option>';
      }
      document.getElementById('rwipendafkabupatenktp').innerHTML = kab;
    });
  }
  //rwipendafkec
  function tampil_pendfrwikecktp() {
    var param = {
      id: $("#rwipendafkabktp").val(),
    };
    apiPOST('Data_Sosial/kecamatan', param, hasil => {
      var kec = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        kec += '<option value="' + a[i]['kd_kecamatan'] + '">' + a[i]['kecamatan'] + '</option>';
      }
      document.getElementById('rwipendafkecktp').innerHTML = kec;
    });
  }

  function tampil_pendfrwikelktp() {
    var param = {
      id: $("#rwipendafkecktp").val(),
    };
    apiPOST('Data_Sosial/kelurahan', param, hasil => {
      var kec = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        kec += '<option value="' + a[i]['kd_kelurahan'] + '">' + a[i]['kelurahan'] + '</option>';
      }
      document.getElementById('rwipendafkelurahanktp').innerHTML = kec;
    });
  }


  $('#RWIpend_kd_pasiencari').show();
  $('#RWIpend_nm_pasiencari').hide();

  function show_cri_normpendfRWI() {
    $('#RWIpend_kd_pasiencari').show();
    $('#RWIpend_nm_pasiencari').hide();
    $("#RWIpend_kd_pasiencari").trigger('focus');
  }

  function show_cri_nmpasienpendfRWI() {
    $('#RWIpend_kd_pasiencari').hide();
    $('#RWIpend_nm_pasiencari').show();
    $("#RWIpend_nm_pasiencari").trigger('focus');
  }


  $('.bayibarulahir').click(function() {
    document.getElementById("form-epndaftaran-rwi").reset();

    bayibarulahir();

  });

  function bayibarulahir() {
    //alert("Menuju halaman pendaftran.");
    $("#RWI_pend_pencarian").hide();
    $("#RWIpend_tabelpasien").hide();
    $("#RWIpendaftaran").show();
    //var date =
    var dt = new Date();
    //var time = getHours() + ":" + getMinutes() + ":" + getSeconds();
    var dateime = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
    //alert('date:'+dt+'dateime:'+dateime);
    //alert(today);
    var dd = String(dt.getDate()).padStart(2, '0');
    var mm = String(dt.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = dt.getFullYear();
    //datesekarang = dd + '-' + mm + '-' + yyyy; // in   "mm/dd/yyyy" format
    datesekarang = yyyy + '-' + mm + '-' + dd; // in   "mm/dd/yyyy" format

    // document.getElementById('tgl_kunjungan').value = datesekarang;
    document.getElementById('jam').value = dateime;
    document.getElementsByName("tgl_kunjungan")[0].value = datesekarang;
    //document.getElementById('tgl_kunjungan').value = a[i].tgl_keluar;
  }

  $("#caripasien").click(function() {
    pertanyaan.fire({
      title: 'Kembali ke menu awal',
      html: '<span>Data yang sudah dientry akan hilang, tetap kembali ?</span>',
      icon: 'question',
      showCancelButton: true,
      reverseButtons: false,
      allowOutsideClick: false
    }).then((result) => {
      if (result.isConfirmed) {
        $("#RWI_pend_pencarian").show();
        $("#RWIpend_tabelpasien").show();
        $("#RWIpendaftaran").hide();
      } else if (result.dismiss === Swal.DismissReason.cancel) {

      }
    })

  });

  $('#asal_pasien').on('change', function() {
    tampil_rujukanrwi();
    $("#rujukandariluar").show();
  });

  // $('#rwipendaftanggallahir').on('keyup', function() {
  //   text = $('#rwipendaftanggallahir').val();
  //   age(text);
  // });

  function refresh_pendft_rwi() {
    $('#RWIpend_loadingawal').hide();
  }

  function tampil_pendfrwikotaktpby(kode) {
    var param = {
      id: kode,
    };
    apiPOST('Data_Sosial/kota', param, hasil => {
      var kab = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        kab += '<option value="' + a[i]['kd_kabupaten'] + '">' + a[i]['kabupaten'] + '</option>';
      }
      document.getElementById('rwipendafkabupatenktp').innerHTML = kab;

    });
  }

  function tampil_pendfrwikecby(kode) {
    var param = {
      id: kode,
    };
    apiPOST('Data_Sosial/kecamatan', param, hasil => {
      var kec = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        kec += '<option value="' + a[i]['kd_kecamatan'] + '">' + a[i]['kecamatan'] + '</option>';
      }
      document.getElementById('rwipendafkecamatan').innerHTML = kec;
      document.getElementById('rwipendafkabupaten').value = kode;
    });
  }

  // function tampil_pendfrwikelby(kode,kel) {
  //   var param = {
  //     id: kode,
  //   };
  //   apiPOST('Data_Sosial/kelurahan', param, hasil => {
  //     var kec = '';
  //     var a = hasil['data'];
  //     for (var i = 0; i < a.length; i++) {
  //       kec += '<option value="' + a[i]['kd_kelurahan'] + '">' + a[i]['kelurahan'] + '</option>';
  //     }
  //     document.getElementById('rwipendafkelurahan').innerHTML = kel;
  //     document.getElementById('rwipendafkecamatan').value = kode;
  //   });
  // }

  function tampil_pendfrwikotaktpby(kode) {
    var param = {
      id: kode,
    };
    apiPOST('Data_Sosial/kota', param, hasil => {
      var kab = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        kab += '<option value="' + a[i]['kd_kabupaten'] + '">' + a[i]['kabupaten'] + '</option>';
      }
      document.getElementById('rwipendafkabupatenktp').innerHTML = kab;

    });
  }

  function tampil_pendfrwikecktpby(kode) {
    var param = {
      id: kode,
    };
    apiPOST('Data_Sosial/kecamatan', param, hasil => {
      var kec = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        kec += '<option value="' + a[i]['kd_kecamatan'] + '">' + a[i]['kecamatan'] + '</option>';
      }
      document.getElementById('rwipendafkecamatanktp').innerHTML = kec;
      document.getElementById('rwipendafkabupatenktp').value = kode;

    });
  }

  function tampil_pendfrwikotaby(kode) {
    var param = {
      id: kode,
    };
    apiPOST('Data_Sosial/kota', param, hasil => {
      var kab = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        kab += '<option value="' + a[i]['kd_kabupaten'] + '">' + a[i]['kabupaten'] + '</option>';
      }
      document.getElementById('rwipendafkabupaten').innerHTML = kab;

    });
  }

  function tampil_pendfrwikecby(kode) {
    var param = {
      id: kode,
    };
    apiPOST('Data_Sosial/kecamatan', param, hasil => {
      var kec = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        kec += '<option value="' + a[i]['kd_kecamatan'] + '">' + a[i]['kecamatan'] + '</option>';
      }
      document.getElementById('rwipendafkecamatan').innerHTML = kec;
      document.getElementById('rwipendafkabupaten').value = kode;
    });
  }
  

  function caripropinsibyrm(kode) {
    var param = {
      id: kode,
    };
    apiPOST('Data_Sosial/propinsiby', param, hasil => {
      var prov = hasil['data']['kd_propinsi'];
      var kota = hasil['data']['kd_kabupaten'];
      var kec = hasil['data']['kd_kecamatan'];
      var kel = hasil['data']['kd_kelurahan'];
      //alert(kel);
      tampil_pendfrwikotaby(prov);
      tampil_pendfrwikecby(kota);
      tampil_pendfrwikelby(kec,kel);
      document.getElementById('rwipendafpropinsi').value = prov;
      /*    document.getElementById('rwipendafkab').value       =kota;
          document.getElementById('rwipendafkec').value       =kec;
          document.getElementById('rwipendafkelurahan').value =kel;*/
      // alert(kel);
    });
  }
  //asli
  function tampil_pendfrwikelby(kode,kel) {
    var param = {
      id: kode,
    };
    apiPOST('Data_Sosial/kelurahan', param, hasil => {
      var kec = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        kec += '<option value="' + a[i]['kd_kelurahan'] + '">' + a[i]['kelurahan'] + '</option>';
      }
      document.getElementById('rwipendafkelurahan').innerHTML = kec;
      document.getElementById('rwipendafkecamatan').value = kode;
      document.getElementById('rwipendafkelurahan').value=kel;
    });
  }


  function caripropinsiktpbyrm(kode) {
    var param = {
      id: kode,
    };
    apiPOST('Data_Sosial/propinsiby', param, hasil => {
      var prov = hasil['data']['kd_propinsi'];
      var kota = hasil['data']['kd_kabupaten'];
      var kec = hasil['data']['kd_kecamatan'];
      var kel = hasil['data']['kd_kelurahan'];
      tampil_pendfrwikotaktpby(prov);
      tampil_pendfrwikecktpby(kota);
      tampil_pendfrwikelktpby(kec,kel);
      document.getElementById('rwipendafpropinsiktp').value = prov;
      /*    document.getElementById('rwipendafkabktp').value      =kota;
          document.getElementById('rwipendafkecktp').value      =kec;
          document.getElementById('rwipendafkelurahanktp').value=kel;*/
      //alert(kel);
    });
  }

  function tampil_pendfrwikelktpby(kode,kel) {
    var param = {
      id: kode,
    };
    apiPOST('Data_Sosial/kelurahan', param, hasil => {
      var kec = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        kec += '<option value="' + a[i]['kd_kelurahan'] + '">' + a[i]['kelurahan'] + '</option>';
      }
      document.getElementById('rwipendafkelurahanktp').innerHTML = kec;
      document.getElementById('rwipendafkecamatanktp').value = kode;
      document.getElementById('rwipendafkelurahanktp').value=kel;
    });
  }

  function age() {
    //alert('age');
    //if (e.keyCode == 13) {
    event.preventDefault();
    var spliya = $('#rwipendaftanggallahir').val(); // in   "mm/dd/yyyy" format
    //alert(spliya);
    var tgl = spliya.substr(8, 9);
    var bln = spliya.substr(5, 2);
    var thn = spliya.substr(0, 4);
    birthdate = bln + '/' + tgl + '/' + thn;
    //alert(birthdate);
    var today = new Date();
    //alert(today);
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    senddate = mm + '/' + dd + '/' + yyyy; // in   "mm/dd/yyyy" format
    //alert(senddate);
    var x = birthdate.split("/");
    var y = senddate.split("/");
    var bdays = x[1];
    var bmonths = x[0];
    var byear = x[2];
    //alert(bdays);
    var sdays = y[1];
    var smonths = y[0];
    var syear = y[2];
    //alert(sdays);
    if (sdays < bdays) {
      sdays = parseInt(sdays) + 30;
      smonths = parseInt(smonths) - 1;
      //alert(sdays);
      var fdays = sdays - bdays;
      //alert(fdays);
    } else {
      var fdays = sdays - bdays;
    }
    if (smonths < bmonths) {
      smonths = parseInt(smonths) + 12;
      syear = syear - 1;
      var fmonths = smonths - bmonths;
    } else {
      var fmonths = smonths - bmonths;
    }
    var fyear = syear - byear;
    //alert(fdays+fmonths+fyear);
    // document.getElementById('tahun').value = fyear;
    // document.getElementById('bulan').value = fmonths;
    // document.getElementById('hari').value = fdays;
    document.getElementById('rwipendafumur').value = fyear + " Thn " + fmonths + " Bln " + fdays + " Hri";
    document.getElementById('rwipendafpendidikan').focus();

    // }
  }

  function agebyrm(tgl) {
    // alert('age');
    // event.preventDefault();
    var spliya = tgl; // in   "mm/dd/yyyy" format
    //alert(spliya);
    var tgl = spliya.substr(8, 9);
    var bln = spliya.substr(5, 2);
    var thn = spliya.substr(0, 4);
    // birthdate = tgl + '/' + bln + '/' + thn;
    birthdate = bln + '/' + tgl + '/' + thn;
    var today = new Date();
    //alert(today);
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    senddate = mm + '/' + dd + '/' + yyyy; // in   "mm/dd/yyyy" format
    var x = birthdate.split("/");
    var y = senddate.split("/");
    var bdays = x[1];
    var bmonths = x[0];
    var byear = x[2];
    //alert(bdays);
    var sdays = y[1];
    var smonths = y[0];
    var syear = y[2];
    //alert(sdays);
    if (sdays < bdays) {
      sdays = parseInt(sdays) + 30;
      smonths = parseInt(smonths) - 1;
      //alert(sdays);
      var fdays = sdays - bdays;
      //alert(fdays);
    } else {
      var fdays = sdays - bdays;
    }
    if (smonths < bmonths) {
      smonths = parseInt(smonths) + 12;
      syear = syear - 1;
      var fmonths = smonths - bmonths;
    } else {
      var fmonths = smonths - bmonths;
    }
    var fyear = syear - byear;
    // document.getElementById('tahun').value = fyear;
    // document.getElementById('bulan').value = fmonths;
    // document.getElementById('hari').value = fdays;
    document.getElementById('rwipendafumur').value = fyear + " Thn " + fmonths + " Bln " + fdays + " Hri";
    document.getElementById('rwipendafnik').focus();

  }

  function ageCalculator(tgl) {
    var userinput = tgl;
    var dob = new Date(userinput);
    // if(userinput==null || userinput=='') {  
    //   document.getElementById("message").innerHTML = "**Choose a date please!";    
    //   return false;   
    // } else {  

    //calculate month difference from current date in time  
    var month_diff = Date.now() - dob.getTime();

    //convert the calculated difference in date format  
    var age_dt = new Date(month_diff);

    //extract year from date      
    var year = age_dt.getUTCFullYear();

    //now calculate the age of the user  
    var age = Math.abs(year - 1970);

    //display the calculated age  

    alert('tahun:' + age);
    //return document.getElementById("result").innerHTML ="Age is: " + age + " years. ";  
    // }  
  }

  function detailpasienrwi(kode) {

    event.preventDefault();
    $("#RWI_pend_pencarian").hide();
    $("#RWIpend_tabelpasien").hide();
    $("#RWIpendaftaran").show();
    var param = {
      id: $("#RWIpend_kd_pasiencari").val(),
      id_kunjungan: kode,
    };
    apiPOST('Rawat_inap/detailpasienrwi', param, hasil => {
      var a = hasil['data'];
      var tanggal = new Date();  
      var jamsekarang = tanggal.getHours()+":"+tanggal.getMinutes()+":"+tanggal.getSeconds();
      for (var i = 0; i < a.length; i++) {
        //console.log('hallo'+a[i].tgl_keluar);
        caripropinsibyrm(a[i].kd_kelurahan);
        caripropinsiktpbyrm(a[i].kd_kelurahan_ktp);
        rwipendafagamabyid(a[i].kd_agama);
        rwipendafkelaminbyid(a[i].jenis_kelamin);
        rwipendafdarahbyid(a[i].gol_darah);
        historidiagnosa(a[i].no_rm);
        tampil_pendfrwipekerjaanayah(a[i].kd_pekerjaan_ayah);
        tampil_pendfrwipekerjaanibu(a[i].kd_pekerjaan_ibu);
        tampil_pendfrwipendidikanayah(a[i].kd_pendidikan_ayah);
        tampil_pendfrwipendidikanibu(a[i].kd_pendidikan_ibu);
        agebyrm(a[i].tgl_lahir.substr(0, 10));
        //ageCalculator(a[i].tgl_lahir.substr(0, 10));
        document.getElementById('rwipendafidtransaksi').value = a[i].id_transaksi;
        document.getElementById('rwipendafnamapasien').value = a[i].nama;
        document.getElementById('rwipendafkdpasien').value = a[i].no_rm;
        document.getElementById('rwipendafkeluarga').value = a[i].nama_keluarga;
        document.getElementById('rwipendafagama').value = a[i].kd_agama;
        document.getElementById('rwipendafgoldarah').value = a[i].gol_darah;
        document.getElementById('rwipendafkelamin').value = a[i].jenis_kelamin;
        document.getElementById('rwipendafstatusmarital').value = a[i].status_marita;
        document.getElementById('rwipendaftempatlahir').value = a[i].tempat_lahir;
        document.getElementById('rwipendaftanggallahir').value = a[i].tgl_lahir.substr(0, 10);
        document.getElementById('rwipendafnik').value = a[i].nik;
        document.getElementById('rwipendafpendidikan').value = a[i].kd_pendidikan;
        document.getElementById('rwipendafpekerjaan').value = a[i].kd_pekerjaan;
        document.getElementById('rwipendaftelepon').value = a[i].telepon;
        document.getElementById('rwipendafwni').value = a[i].wni;
        document.getElementById('rwipendafalamat').value = a[i].alamat;
        document.getElementById('rwipendafkelurahan').value = a[i].kd_kelurahan;
        document.getElementById('rwipendafkelurahanktp').value = a[i].kd_kelurahan_ktp;
        document.getElementById('rwipendafkdpos').value = a[i].kd_pos;
        document.getElementById('rwipendafalamatktp').value = a[i].alamat_ktp;
        document.getElementById('rwipendafkdposktp').value = a[i].kd_pos_ktp;
        document.getElementById('rwipendafayah').value = a[i].nama_ayah;
        document.getElementById('rwipendafibu').value = a[i].nama_ibu;
        document.getElementById('tgl_kunjungan').value = a[i].tgl_keluar;
        document.getElementById('jam').value = jamsekarang;
        // document.getElementById('jam').value = a[i].jam_keluar.substring(11, 19);
        document.getElementById('cara_masuk').value = a[i].cara_masuk_pasien;
        document.getElementById('no_sjp_rajal').value = a[i].no_sjp_rajal;
        document.getElementById('map_bpjs').value = a[i].map_bpjs;
        document.getElementById('rwipendafhubpenanggungjawab').value = a[i].hubungan_penanggung_jawab;
        document.getElementById('rwipendafpenanggungjawab').value = a[i].nama_penanggung_jawab;
        document.getElementById('rwipendafalamatpenanggungjawab').value = a[i].alamat_penanggung_jawab;
        document.getElementById('rwipendaftlfpenanggungjawab').value = a[i].no_hp_penanggung_jawab;
        document.getElementById('rwipendafnikpenanggungjawab').value = a[i].nik_penanggung_jawab;


        // alert('lol' + a[i].cara_masuk_pasien);


        /*------------------cariprovinsi-------------------*/
      }
    });

    // tambahpasienrwi();

  }

  function RWIpendf_createlabelpasien() {
    if (document.getElementById('rwipendafkdpasien').value == ''){
       toastr.error('Silahkan Lakukan Pendaftaran Dahulu.');
    }else{

      var param = {
        nm_pasien : document.getElementById('rwipendafnamapasien').value,
        norm      : document.getElementById('rwipendafkdpasien').value,
        modul     : '2'
      };
      newTabPOST('API/Rawatjalan/createlabel',param);
      return;

    }

  }

  function RWIpendf_createkartupasien() {
    if (document.getElementById('rwipendafkdpasien').value == ''){
       toastr.error('Silahkan Lakukan Pendaftaran Dahulu.');
    }else{
      var param = {
        nm_pasien : document.getElementById('rwipendafnamapasien').value,
        norm      : document.getElementById('rwipendafkdpasien').value
      };
      newTabPOST('API/Cetak/cetakkartupasien', param);
      return;
    }
  }

  function RWIpendf_cetakkartukontrol() {
    if (document.getElementById('rwipendafkdpasien').value == ''){
       toastr.error('Silahkan Lakukan Pendaftaran Dahulu.');
    }else{
      var param = {
        nm_pasien : document.getElementById('rwipendafnamapasien').value,
        norm      : document.getElementById('rwipendafkdpasien').value
      };
      newTabPOST('API/Cetak/cetakkartukontrol', param);
      return;
    }
  }

  function RWIpendf_gelang() {
    if (document.getElementById('rwipendafkdpasien').value == ''){
       toastr.error('Silahkan Lakukan Pendaftaran Dahulu.');
    }else{
      var param = {
        norm      : $("#rwipendafkdpasien").val(),
        nm_pasien : $("#rwipendafnamapasien").val(),
        lahir     : $("#rwipendaftanggallahir").val(),
        modul     : '2'
      };
      newTabPOST('API/Cetak/cetakgelang', param);
      return;
    }
    
  }

  setTimeout(refresh_pendft_rwi, 1000);
</script>