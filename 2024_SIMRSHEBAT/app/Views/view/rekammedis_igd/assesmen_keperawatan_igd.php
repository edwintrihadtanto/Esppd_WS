<?php
$nowday     = date('Y-m-d');
$nextday    = date('Y-m-d', strtotime('+1 days', strtotime($nowday)));
?>

<div class="col-md-12 p-2">

  <div class="card card-outline card-danger">
    <div class="overlay-wrapper" id="TriageIgd_loadingawal">
      <div class="overlay">
        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
      </div>
    </div> 

    <div class="card-body p-2 darkgrey-custom" id='DivTriageRWJ'>
      <div class="row row-custom">
        <div class="col-sm-4">
          <div class="form-group ">
            <label>Cari No. RM / Nama Pasien :</label>
            <div class="input-group input-group-sm mb-3">           
              <input type="search" id="searchPxTriagerwj" class="form-control form-control" placeholder="Entry RM..." autocomplete="off">
              <input type="search" class="form-control form-control-xs" placeholder="Entry Nama Pasien..." id="RWJTriage_nm_pasiencari" autocomplete="off">
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Tanggal masuk</label>
            <input type="date" name="tgligdcariby" id="tgligdcariby" class="form-control" value="<?php echo date('Y-m-d');?>">
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 p-0">
      <div class="card">
        <div id="DivTriageIgd_listpasien">
          <div class="col-md-12 p-1" id="ermIgd_listpasien2">
            <div class="card card-outline">

              <div class="card-body p-1" style="max-height: 420px; overflow-x: hidden;">
                <div class="row" id="TriageIgd_listpasien">
                </div>
              </div>

            </div>  
          </div>
        </div>
        <div class="card-header p-2 darkgrey-custom" id="TriageIgd_button" style="display:none;" >
          <div class="row">
            <div class="col-md-10">             
              <div id="DivTriage">
               <!--              <button type="button" class="btn bg-gradient-secondary btn-xs" type="submit" onclick="saveSoapKeperawatanIgd()">Simpan Soap</button>  -->
               <div class="btn-group pull-right">
                <button type="button" class="btn bg-gradient-secondary btn-xs"><i class="fas fa-print"></i> Cetak</button>
                <button type="button" class="btn bg-gradient-secondary dropdown-toggle dropdown-icon btn-xs" data-toggle="dropdown">
                  <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu" role="menu">
                  <a class="dropdown-item" href="#" ><i class="fas fa-tag"></i> Surat Pernyataan</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#" ><i class="fas fa-id-card"></i> Lembar Keluar Masuk</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#" ><i class="fas fa-id-card"></i> Label Pasien</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#" ><i class="fas fa-id-card"></i> Status Pasien</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" onclick="suratsehatigd()"><i class="fas fa-barcode"></i> Surat Sehat</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" onclick="suratkelahiranigd()"><i class="fas fa-barcode"></i> Surat Kelahiran</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" onclick="suratkematianigd()"><i class="fas fa-barcode"></i> Surat Kematian</a>
                </div>
              </div>
              <button type="button" class="btn bg-gradient-secondary btn-xs" type="submit" onclick="tambahpasienrwj()"> <i class="fas fa-user-plus"></i> Pasien Baru</button>
              <button type="button" class="btn bg-gradient-secondary btn-xs" type="submit" onclick="pendafrwjcarisep()"> <i class="fas fa-user-plus"></i> Data SEP</button>
              <button type="button" class="btn bg-gradient-secondary btn-xs" type="submit" onclick="kembaliTriageIgd()"> <i class="fas fa-arrow-left"></i> Kembali</button>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form_group">
              <label>Tgl. Kunjung :</label>
              <input type="date" name="rwj_pendf_tglkunjungan" id="rwj_pendf_tglkunjungan" class="form-control form-control-xs" disabled>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body p-1" id="DivPasienTriageIgd" style="display: none; ">
        <div class="card card-info card-outline p-2">
          <div class="row">
            <div class="col-sm-3">  
              <label class="form-label" style="font-size:14px;"> No Rm:
              </label>
              <input type="text" name="rmTriageIgd" id="rmTriageIgd" class="form-control form-control-xs">
            </div>
            <div class="col-sm-5">  
              <label class="form-label" style="font-size:14px;"> Nama Pasien:
              </label>
              <input type="text" name="namaTriageIgd" id="namaTriageIgd" class="form-control form-control-xs">
            </div>
            <div class="col-sm-2">  
              <label class="form-label" style="font-size:14px;"> Poliklinik:
              </label>
              <input type="text" name="unitTriageIgd" id="unitTriageIgd" class="form-control form-control-xs">
              <input type="hidden" name="idKunjunganTriageIgd" id="idKunjunganTriageIgd">
              <input type="hidden" name="idunitTriageIgd" id="idunitTriageIgd">
              <input type="hidden" name="idtransaksiTriageIgd" id="idtransaksiTriageIgd">
            </div>
          </div>
        </div>
        <div class="card-body p-1" id="DivPendafDetailKeperawatanRWJ" style="display: none;">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="pill" id="linktreaseigd" onclick="viewasstreageigd()" href="#treaseigd">Treage</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " data-toggle="pill" onclick="viewtandavitalperawatigd()" id="linkassesmenkeperawatanIgd" href="#assesKepErmKeperawatanIgd">Assesmen Keperawatan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="pill" id="linkassesmenmedisIgd" onclick="viewtandavitalmedisigd()" href="#linkassesmenmedisTriageIgd">Assesmen Medis</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="pill" id="linksoapkeperawatanIgd" href="#SOAPITriageIgd">CPPT</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="pill" onclick="tampilpenunjangradiologiigd();" href="#riwayatpenyakitTriageIgd">Histori Penunjang</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" onclick="serahterimaigd()" data-toggle="pill" href="#serahterimaigd">Serah Terima</a>

            </li>
            <li class="nav-item">
             <a class="nav-link" onclick="autocomplateresumeirna()" data-toggle="pill" href="#ResumeErmMedisIrja">Resume</a>

           </li>
           <li class="nav-item">
            <a class="nav-link" data-toggle="pill" onclick="tampilhisrmermigd()" href="#historykunjunganTriageIgd">History Kunjungan</a>
          </li>
        </ul>
        <!-- Tab panes -->

        <div class="tab-content">
          <div class="tab-pane p-1 fade" id="riwayatpenyakitTriageIgd" role="tabpanel">
            <h6 class="lead mb-0"><u></u></h6>
            <div class="row">
              <div class="col-md-2" style="padding-top: 2px;">
                <select class="form-control form-control-xs">
                  <option value=""> - Record Data - </option>
                  <option value="10">10</option>
                  <option value="20">20</option>
                  <option value="30">30</option>
                  <option value="40">40</option>
                  <option value="50">50</option>
                </select>
              </div>
              <div class="col-md-12" style="padding-top: 10px;">
                <div id='listhistoripenunjangigd'>

                  <!-- akhir div id -->
                </div>
              </div>
              <div class="col-md-12" style="padding-top: 10px;">
                <div id='listhistoripenunjangradigd'>

                  <!-- akhir div id -->
                </div>
              </div>

            </div>
          </div>
          <div class="tab-pane p-1 fade" id="serahterimaigd" role="tabpanel">
            <div class="col-md-12">

              <div id="divserahterima" >    
                <div class="card "><!-- S (Situation) -->
                  <div class="card-header" style="background-color:black;">               
                    <h3 class="card-title" style="color:white;">S (Situation)</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>       
                    </div>        
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <div class="col-md-3">
                            <label class="col-form-label">ID</label>
                          </div>
                          <div class="col-md-3">
                            <input id="dactranspasien_id" name="id" type="text" class="form-control" readonly="readonly">
                            <input id="dactranspasien_mt" name="dactranspasien_mt" type="hidden" >
                            <input id="dackunjunganpasien_mt" name="dackunjunganpasien_mt" type="hidden" >
                          </div>
                          <div class="col-md-3 d-none">
                            <button id="dactranspasien_btload" class="btn btn-warning" type="button" title="Default PJ">&nbsp;&nbsp;<!-- <i class="fas fa-undo"></i> -->&nbsp;&nbsp;
                            </button>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-3">
                            <label class="col-form-label">Diagnosa Medis</label>
                          </div>
                          <div class="col-md-8">
                            <textarea rows="3" name="dactranspasien_adiag" id="dactranspasien_adiag" style="width:100%;" class="form-control"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <div class="col-md-3">
                            <label class="col-form-label">Level</label>
                          </div>
                          <div class="col-md-6">
                            <select name="level" id="dactranspasien_level" class="form-control">
                              <option value="0">Level 0</option>
                              <option value="1">Level 1</option>
                              <option value="2">Level 2</option>
                              <option value="3">Level 3</option>
                            </select>
                          </div>
                        </div>        
                        <div class="form-group row">
                          <div class="col-md-3">
                            <label class="col-form-label">Asal Ruangan</label>
                          </div>
                          <div class="col-md-6">
                            <select name="aruang1" id="dactranspasien_aruang1" class="form-control form-control-sm">
                            </select>
                            <input type="text" class="form-control mt-1" style="display:none;" id="dactranspasien_aruanglain1">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-3">
                            <label for="exempel">Spesialisasi Pasien :</label>
                            <select class="form-control form-control-xs select2 " id="serahterima_sps_kam" name="rwi_sps_kam" style="width: 100%;" onchange="tampil_serahterimarwiunit();" onkeypress="serahterimaspesialisasi(event)">
                            </select>
                          </div>
                          <div class="col-md-3">
                            <label for="exempel">Kelas Unit :</label>
                            <select class="form-control form-control-xs select2 " id="rwiserahterimakd_unit" name="rwipendafkd_unit" style="width: 100%;" onchange="tampil_rwiserahterimaruang(event)">
                            </select>
                          </div>
                          <div class="col-md-3">
                            <label for="exempel">Ruang :</label>
                            <select class="form-control form-control-xs select2 " id="rwiserahterimatr_ruang" name="rwipendftr_ruang" style="width: 100%;" onchange="tampil_rwiserahterimakamar(event)">
                            </select>
                          </div>
                          <div class="col-md-3">
                            <label for="exempel">Tempat Tidur :</label>
                            <select class="form-control form-control-xs select2 " name="id_kamar" id="serahterimaid_kamar" style="width: 100%;">
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-3">
                            <label class="col-form-label">Tanggal Pindah</label>
                          </div>
                          <div class="col-md-3">
                            <div class="input-group date" id="dactranspasien_datgl" data-target-input="nearest">
                              <input id="dactranspasien_atgl" name="atgl" type="date" class="form-control">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card"><!-- serah terima -->
                  <div class="card-header" style="background-color:black;">
                    <h3 class="card-title" style="color:white;">SERAH TERIMA PASIEN ANTAR RUANGAN</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>       
                    </div>
                  </div>
                  <div class="card-body" data-select2-id="27">
                    <div class="row" data-select2-id="26">
                      <div class="col-md-6" data-select2-id="25">
                        <div class="form-group row" data-select2-id="24">
                          <div class="col-md-3">
                            <label class="col-form-label">Perawat Yg Menyerahkan</label>
                          </div>
                          <div class="col-md-7" data-select2-id="23">
                            <select id="dactranspasien_apj1Id" name="apj1Id" class="form-control form-control-sm"  >
                            </select>
                          </div>
                        </div>
                        <div class="form-group row" data-select2-id="37">
                          <div class="col-md-3">
                            <label class="col-form-label">Dokter Yg Menyerahkan</label>
                          </div>
                          <div class="col-md-7" >
                            <select class="form-control form-control-sm" id="dactranspasien_dok1Id" name="dok1Id"  ></select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <div class="col-md-3">
                            <label class="col-form-label">Perawat Yg Menerima</label>
                          </div>
                          <div class="col-md-7">
                            <select id="dactranspasien_apj2Id" name="apj2Id" class="form-control form-control-sm" ></select>
                          </div>

                        </div>
                        <div class="form-group row">
                          <div class="col-md-3">
                            <label class="col-form-label">Dokter Yg Menerima</label>
                          </div>
                          <div class="col-md-7">
                            <select id="dactranspasien_dok2Id" name="dok2Id" class="form-control form-control-sm" ></select>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>    
                <div class="card"><!-- B (Background) -->     
                  <div class="card-header" style="background-color:black;">       
                    <h3 class="card-title" style="color:white;">B (Background)</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>       
                    </div>        
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <div class="col-md-3">
                            <label class="col-form-label">Keluhan Saat Masuk</label>
                          </div>
                          <div class="col-md-8">
                            <textarea rows="4" name="dactranspasien_bkeluhan" id="dactranspasien_bkeluhan" style="width:100%;" class="form-control"></textarea>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-3">
                            <label class="col-form-label">Indikasi Masuk Ranap</label>
                          </div>
                          <div class="col-md-8">
                            <textarea rows="4" name="dactranspasien_bindikasi" id="dactranspasien_bindikasi" style="width:100%;" class="form-control"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card"><!-- A (Assesment) -->
                  <div class="card-header" style="background-color:black;">       
                    <h3 class="card-title" style="color:white;">A (Assesment)</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>       
                    </div>        
                  </div>
                  <div class="card-body">
                    <div class="row ">
                      <div class="col-md-4">
                        <div class="form-group row">
                          <div class="col-md-3">
                            <label class="col-form-label" title="Keadaan Umum">Keadaan Umum</label>
                          </div>
                          <div class="col-md-8">
                            <div class="input-group">
                              <select name="akeadaan" id="dactranspasien_akeadaan" class="form-control">
                                <option value="1">Baik</option>
                                <option value="2">Sedang</option>
                                <option value="3">Berat</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-3">
                            <label class="col-form-label" title="Respirasi">Respirasi</label>
                          </div>
                          <div class="col-md-8">
                            <div class="input-group">
                              <input type="number" onfocus="this.select();" class="form-control" id="dactranspasien_crespirasi">
                              <span class="input-group-append">
                                <span class="input-group-text">x/Menit</span>
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-3">
                            <label class="col-form-label" title="Nadi">Nadi</label>
                          </div>
                          <div class="col-md-8">
                            <div class="input-group">
                              <input type="number" onfocus="this.select();" class="form-control" id="dactranspasien_dnadi">
                              <span class="input-group-append">
                                <span class="input-group-text">x/Menit</span>
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-3">
                            <label class="col-form-label" title="Nadi">Penggunaan O2</label>
                          </div>
                          <div class="col-md-4">
                            <div class="input-group">
                              <input type="number" onfocus="this.select();" class="form-control" id="dactranspasien_po2">
                              <span class="input-group-append">
                                <span class="input-group-text">lt/Menit</span>
                              </span>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="input-group">
                              <span class="input-group-prepend">
                                <span class="input-group-text">Via</span>
                              </span>
                              <input type="text" class="form-control" id="dactranspasien_po2via">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group row">
                          <div class="col-md-3">
                            <label class="col-form-label" title="Pupil">Pupil</label>
                          </div>
                          <div class="col-md-3">
                            <div class="input-group">
                              <span class="input-group-prepend">
                                <span class="input-group-text">Kiri</span>
                              </span>
                              <select name="epupil1" id="dactranspasien_epupil1" class="form-control">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-5">
                            <div class="input-group">
                              <span class="input-group-prepend">
                                <span class="input-group-text">Kanan</span>
                              </span>
                              <select name="epupil2" id="dactranspasien_epupil2" class="form-control">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                              </select>
                              <span class="input-group-append">
                                <span class="input-group-text">mm</span>
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-3">
                            <label class="col-form-label" title="Tensi">Tekanan Darah</label>
                          </div>
                          <div class="col-md-8">
                            <div class="input-group">
                              <input type="number" onfocus="this.select();" class="form-control" id="dactranspasien_ftensi1">
                              <label class="col-form-label">/</label>
                              <input type="number" onfocus="this.select();" class="form-control" id="dactranspasien_ftensi2">
                              <span class="input-group-append">
                                <span class="input-group-text">mmHg</span>
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-3">
                            <label class="col-form-label" title="Tensi"></label>
                          </div>
                          <div class="col-md-8">
                            <div class="input-group">
                              <input type="text" id="dactranspasien_fpalpasi" class="form-control" placeholder="Diisi jika Palpasi">
                              <span class="input-group-append">
                                <span class="input-group-text">Per palpasi</span>
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-3">
                            <label class="col-form-label" title="Suhu">Suhu</label>
                          </div>
                          <div class="col-md-8">
                            <div class="input-group">
                              <input type="number" onfocus="this.select();" class="form-control" id="dactranspasien_gsuhu">
                              <span class="input-group-append">
                                <span class="input-group-text">°C</span>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group row">
                          <div class="col-md-3">
                            <label class="col-form-label" title="Spo2">SpO2</label>
                          </div>
                          <div class="col-md-8">
                            <div class="input-group">
                              <input type="number" onfocus="this.select();" class="form-control" id="dactranspasien_hspo2">
                              <span class="input-group-append">
                                <span class="input-group-text">%</span>
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-3">
                            <label class="col-form-label" title="Reflek Cahaya">Reflek Cahaya</label>
                          </div>
                          <div class="col-md-8">
                            <div class="input-group">
                              <span class="input-group-prepend">
                                <span class="input-group-text">Kiri</span>
                              </span>
                              <select name="ireflek1" id="dactranspasien_ireflek1" class="form-control">
                                <option value="1">+</option>
                                <option value="2">-</option>
                              </select>
                              -
                              <span class="input-group-prepend">
                                <span class="input-group-text">Kanan</span>
                              </span>
                              <select name="ireflek1" id="dactranspasien_ireflek2" class="form-control">
                                <option value="1">+</option>
                                <option value="2">-</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-12">
                            <label class="col-form-label text-danger font-weight-bold font-italic" title="Berat Badan">Note (*) Nominal ribuan = gram, satuan / puluhan / ratusan = kg</label>
                          </div>
                        </div>            
                        <div class="form-group row">
                          <div class="col-md-3">
                            <label class="col-form-label" title="Berat Badan">Berat Badan</label> <span class="text-danger">*</span>
                          </div>
                          <div class="col-md-8">
                            <div class="input-group">
                              <input type="number" onfocus="this.select();" class="form-control" id="dactranspasien_jbb">
                              <span class="input-group-append">
                                <span class="input-group-text">Kg / Gram</span>
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-3">
                            <label class="col-form-label" title="Tinggi Badan">Tinggi Badan</label>
                          </div>
                          <div class="col-md-8">
                            <div class="input-group">
                              <input type="number" onfocus="this.select();" class="form-control" id="dactranspasien_jtb">
                              <span class="input-group-append">
                                <span class="input-group-text">Cm</span>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row ">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <div class="col-md-12">
                            <div class="table-responsive">
                              <table class="table table-bordered table-condensed" width="100%">
                                <tbody>
                                  <tr>
                                    <td colspan="4" width="30%" style="padding:0;"><div class="row d-flex justify-content-center">
                                      <label class="col-form-label font-weight-bold">Glasgow Coma Scale ( GCS )</label>
                                    </div></td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" width="30%" style="padding:0;">
                                      <div class="row d-flex justify-content-center">
                                        <label class="col-form-label">Kategori</label>
                                      </div>
                                    </td>
                                    <td width="20%" style="padding:0;">
                                      <div class="row d-flex justify-content-center">
                                        <label class="col-form-label">Skor</label>
                                      </div>
                                    </td>
                                    <td width="20%" style="padding:0;">
                                      <div class="row d-flex justify-content-center">
                                        <label class="col-form-label">Hasil Skor</label>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td width="20%" style="padding:0;">
                                      <div class="row d-flex justify-content-center">
                                        <label class="col-form-label">Respon Buka Mata (Eye Opening : E)</label>
                                      </div>
                                    </td>
                                    <td width="30%" style="padding:0;">
                                      <table class="table-bordered table-condensed table-hover" width="100%">
                                        <tbody><tr onclick="dactranspasienex_setScore(4, 1);">
                                          <td width="100%" style="padding:0;">
                                            <label class="col-form-label">&nbsp;Spontan</label>
                                          </td>                 
                                        </tr>

                                        <tr onclick="dactranspasienex_setScore(3, 1);">
                                          <td style="padding:0;">
                                            <label class="col-form-label">&nbsp;Terhadap Suara</label>
                                          </td>
                                        </tr>
                                        <tr onclick="dactranspasienex_setScore(2, 1);">
                                          <td style="padding:0;">
                                            <label class="col-form-label">&nbsp;Terhadap Nyeri</label>
                                          </td>
                                        </tr>
                                        <tr onclick="dactranspasienex_setScore(1, 1);">
                                          <td style="padding:0;">
                                            <label class="col-form-label">&nbsp;Tidak ada</label>
                                          </td>
                                        </tr>
                                      </tbody></table>
                                    </td>
                                    <td width="20%" style="padding:0;">
                                      <table class="table-bordered table-condensed table-hover" width="100%">
                                        <tbody><tr onclick="dactranspasienex_setScore(4, 1);">
                                          <td align="center" style="padding:0;">
                                            <label class="col-form-label">4</label>
                                          </td>
                                        </tr>
                                        <tr onclick="dactranspasienex_setScore(3, 1);">
                                          <td align="center" style="padding:0;">
                                            <label class="col-form-label">3</label>
                                          </td>
                                        </tr>
                                        <tr onclick="dactranspasienex_setScore(2, 1);">
                                          <td align="center" style="padding:0;">
                                            <label class="col-form-label">2</label>
                                          </td>
                                        </tr>
                                        <tr onclick="dactranspasienex_setScore(1, 1);">
                                          <td align="center" style="padding:0;">
                                            <label class="col-form-label">1</label>
                                          </td>
                                        </tr>
                                      </tbody></table>
                                    </td>
                                    <td width="20%">
                                      <table class="table-bordered table-condensed" width="100%">
                                        <tbody><tr height="100%" align="center">
                                          <td align="center" width="100%" style="padding:0;">
                                            <h3><label class="col-form-label" id="dactranspasien_bgcsa">0</label></h3>
                                          </td>
                                        </tr>
                                      </tbody></table>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td width="30%" style="padding:0;">
                                      <div class="row d-flex justify-content-center">
                                        <label class="col-form-label">Respon Motorik Terbaik (M)</label>
                                      </div>
                                    </td>
                                    <td width="30%" style="padding:0;">
                                      <table class="table-bordered table-condensed table-hover" width="100%">
                                        <tbody><tr onclick="dactranspasienex_setScore(6, 2);">
                                          <td width="100%" style="padding:0;">
                                            <label class="col-form-label">&nbsp;Turut Perintah</label>
                                          </td>
                                        </tr>
                                        <tr onclick="dactranspasienex_setScore(5, 2);">
                                          <td style="padding:0;">
                                            <label class="col-form-label">&nbsp;Melokalisir Nyeri</label>
                                          </td>
                                        </tr>
                                        <tr onclick="dactranspasienex_setScore(4, 2);">
                                          <td style="padding:0;">
                                            <label class="col-form-label">&nbsp;Fleksi Normal (Menarik anggota gerak yang dirangsang)</label>
                                          </td>
                                        </tr>
                                        <tr onclick="dactranspasienex_setScore(3, 2);">
                                          <td style="padding:0;">
                                            <label class="col-form-label">&nbsp;Fleksi Abnormal (dekortikasi)</label>
                                          </td>
                                        </tr>
                                        <tr onclick="dactranspasienex_setScore(2, 2);">
                                          <td style="padding:0;">
                                            <label class="col-form-label">&nbsp;Ekstensi Abnormal (deserebrasi)</label>
                                          </td>
                                        </tr>
                                        <tr onclick="dactranspasienex_setScore(1, 2);">
                                          <td style="padding:0;">
                                            <label class="col-form-label">&nbsp;Tanpa Ada (Flasid)</label>
                                          </td>
                                        </tr>
                                      </tbody></table>
                                    </td>
                                    <td width="20%" style="padding:0;">
                                      <table class="table-bordered table-condensed table-hover" width="100%">
                                        <tbody><tr onclick="dactranspasienex_setScore(6, 2);">
                                          <td align="center" style="padding:0;">
                                            <label class="col-form-label">6</label>
                                          </td>
                                        </tr>
                                        <tr onclick="dactranspasienex_setScore(5, 2);">
                                          <td align="center" style="padding:0;">
                                            <label class="col-form-label">5</label>
                                          </td>
                                        </tr>
                                        <tr onclick="dactranspasienex_setScore(4, 2);">
                                          <td style="padding:0;" align="center">
                                            <label class="col-form-label">4</label>
                                          </td>
                                        </tr>
                                        <tr onclick="dactranspasienex_setScore(3, 2);">
                                          <td style="padding:0;" align="center">
                                            <label class="col-form-label">3</label>
                                          </td>
                                        </tr>
                                        <tr onclick="dactranspasienex_setScore(2, 2);">
                                          <td style="padding:0;" align="center">
                                            <label class="col-form-label">2</label>
                                          </td>
                                        </tr>
                                        <tr onclick="dactranspasienex_setScore(1, 2);">
                                          <td style="padding:0;" align="center">
                                            <label class="col-form-label">1</label>
                                          </td>
                                        </tr>
                                      </tbody></table>
                                    </td>
                                    <td width="20%">
                                      <table class="table-bordered table-condensed" width="100%">
                                        <tbody><tr height="100%">
                                          <td style="padding:0;" align="center">
                                            <h3><label class="col-form-label" id="dactranspasien_bgcsb">0</label></h3>
                                          </td>
                                        </tr>
                                      </tbody></table>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td style="padding:0;" width="30%">
                                      <div class="row d-flex justify-content-center">
                                        <label class="col-form-label">Respon Verbal (V)</label>
                                      </div>
                                    </td>
                                    <td style="padding:0;" width="30%">
                                      <table class="table-bordered table-condensed table-hover" width="100%">
                                        <tbody><tr onclick="dactranspasienex_setScore(5, 3);">
                                          <td style="padding:0;">
                                            <label class="col-form-label">&nbsp;Berorientasi Baik</label>
                                          </td>
                                        </tr>
                                        <tr onclick="dactranspasienex_setScore(4, 3);">
                                          <td style="padding:0;">
                                            <label class="col-form-label">&nbsp;Berbicara mengacau (bingung)</label>
                                          </td>
                                        </tr>
                                        <tr onclick="dactranspasienex_setScore(3, 3);">
                                          <td style="padding:0;">
                                            <label class="col-form-label">&nbsp;Kata-Kata tidak teratur</label>
                                          </td>
                                        </tr>
                                        <tr onclick="dactranspasienex_setScore(2, 3);">
                                          <td style="padding:0;">
                                            <label class="col-form-label">&nbsp;Suara Tidak Jelas</label>
                                          </td>
                                        </tr>
                                        <tr onclick="dactranspasienex_setScore(1, 3);">
                                          <td style="padding:0;">
                                            <label class="col-form-label">&nbsp;Tanpa Ada</label>
                                          </td>
                                        </tr>
                                      </tbody></table>
                                    </td>
                                    <td style="padding:0;" width="20%">
                                      <table class="table-bordered table-condensed table-hover" width="100%">
                                        <tbody><tr onclick="dactranspasienex_setScore(5, 3);">
                                          <td style="padding:0;" align="center">
                                            <label class="col-form-label">5</label>
                                          </td>
                                        </tr>
                                        <tr onclick="dactranspasienex_setScore(4, 3);">
                                          <td style="padding:0;" align="center">
                                            <label class="col-form-label">4</label>
                                          </td>
                                        </tr>
                                        <tr onclick="dactranspasienex_setScore(3, 3);">
                                          <td style="padding:0;" align="center">
                                            <label class="col-form-label">3</label>
                                          </td>
                                        </tr>
                                        <tr onclick="dactranspasienex_setScore(2, 3);">
                                          <td style="padding:0;" align="center">
                                            <label class="col-form-label">2</label>
                                          </td>
                                        </tr>
                                        <tr onclick="dactranspasienex_setScore(1, 3);">
                                          <td style="padding:0;" align="center">
                                            <label class="col-form-label">1</label>
                                          </td>
                                        </tr>
                                      </tbody></table>
                                    </td>
                                    <td width="20%">
                                      <table class="table-bordered table-condensed" width="100%">
                                        <tbody><tr height="100%">
                                          <td style="padding:0;" align="center">
                                            <h3><label class="col-form-label" id="dactranspasien_bgcsc">0</label></h3>
                                          </td>
                                        </tr>
                                      </tbody></table>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="3">
                                      <div class="form-group row">
                                        <div class="col-md-3">
                                          <label class="col-form-label" title="Kesadaran">Kesadaran</label>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="input-group">
                                            <select name="asadar" id="dactranspasien_asadar" class="form-control">
                                              <option value="1">Compos Mentis</option>
                                              <option value="2">Apatis</option>
                                              <option value="3">Somnolen</option>
                                              <option value="4">Delirium</option>
                                              <option value="5">Sopor</option>
                                              <option value="6">Coma</option>
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                    </td>
                                    <td>
                                      <table class="table-bordered table-condensed" width="100%">
                                        <tbody><tr height="100%">
                                          <td style="padding:0;" align="center">
                                            <h3><label class="col-form-label" id="dactranspasien_bgcstot">0</label></h3>
                                          </td>
                                        </tr>
                                      </tbody></table>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <div class="col-md-3">
                            <label class="col-form-label">Nyeri</label>
                          </div>
                          <div class="col-md-3" id="dactranspasien_cnyeriId">
                            <div class="custom-control custom-checkbox custom-control-inline">
                              <input name="dactranspasien_cnyeriId" value="1" type="radio" class="custom-control-input" id="dactranspasien_cnyeriId_1">
                              <label class="custom-control-label" for="dactranspasien_cnyeriId_1">Tidak</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                              <input name="dactranspasien_cnyeriId" value="2" type="radio" class="custom-control-input" id="dactranspasien_cnyeriId_2" checked>
                              <label class="custom-control-label" for="dactranspasien_cnyeriId_2">Ya</label>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <label class="col-form-label" id="dactranspasien_lnyeri">Skala Nyeri</label>
                          </div>
                          <div class="col-md-3">
                            <select name="asadar" id="dactranspasien_nyeri" class="form-control">
                              <option value="0">0</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                              <option value="10">10</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-3">
                            <label class="col-form-label">Risiko Jatuh</label>
                          </div>
                          <div class="col-md-9" id="dactranspasien_dcederahasilId">
                            <div class="custom-control custom-checkbox custom-control-inline">
                              <input name="dactranspasien_dcederahasilId" value="1" type="radio" class="custom-control-input" id="dactranspasien_dcederahasilId_1" checked>
                              <label class="custom-control-label" for="dactranspasien_dcederahasilId_1">Tidak Berisiko</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                              <input name="dactranspasien_dcederahasilId" value="2" type="radio" class="custom-control-input" id="dactranspasien_dcederahasilId_2">
                              <label class="custom-control-label" for="dactranspasien_dcederahasilId_2" checked>Risiko Rendah</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                              <input name="dactranspasien_dcederahasilId" value="3" type="radio" class="custom-control-input" id="dactranspasien_dcederahasilId_3">
                              <label class="custom-control-label" for="dactranspasien_dcederahasilId_3">Risiko Tinggi</label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-3">
                            <label class="col-form-label">Terapi / Tindakan Medis Yang Sudah Diberikan</label>
                          </div>
                          <div class="col-md-8">
                            <textarea rows="4" name="dactranspasien_cterapi" id="dactranspasien_cterapi" style="width:100%;" class="form-control"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <div class="col-md-12">
                            <label class="col-form-label">Pemeriksaan Penunjang yang Sudah Dilakukan :</label>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-3">
                            <label class="col-form-label">1. Laboratorium</label>
                          </div>
                          <div class="col-md-6" id="dactranspasien_plab">
                            <div class="custom-control custom-checkbox custom-control-inline">
                              <input onclick="document.getElementById('dactranspasien_div_plab').style.display='none'" name="dactranspasien_plab" value="0" type="radio" class="custom-control-input" id="dactranspasien_plab_1" checked>
                              <label class="custom-control-label" for="dactranspasien_plab_1">Tidak</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                              <input onclick="document.getElementById('dactranspasien_div_plab').style.display='block'" name="dactranspasien_plab" value="1" type="radio" class="custom-control-input" id="dactranspasien_plab_2">
                              <label class="custom-control-label" for="dactranspasien_plab_2">Ya</label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row" id="dactranspasien_div_plab" style="display: none;">
                          <div class="col-md-3"></div>
                          <div class="col-md-3">
                            <label class="col-form-label">DPJP Sudah Terinfo</label>
                          </div>
                          <div class="col-md-6" id="dactranspasien_plabterinfo">
                            <div class="custom-control custom-checkbox custom-control-inline">
                              <input name="dactranspasien_plabterinfo" value="1" type="radio" class="custom-control-input" id="dactranspasien_plabterinfo_1">
                              <label class="custom-control-label" for="dactranspasien_plabterinfo_1">Tidak</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                              <input name="dactranspasien_plabterinfo" value="2" type="radio" class="custom-control-input" id="dactranspasien_plabterinfo_2">
                              <label class="custom-control-label" for="dactranspasien_plabterinfo_2">Ya</label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-3">
                            <label class="col-form-label">2. Radiologi</label>
                          </div>
                          <div class="col-md-6" id="dactranspasien_prad">
                            <div class="custom-control custom-checkbox custom-control-inline">
                              <input onclick="document.getElementById('dactranspasien_div_prad').style.display='none'" name="dactranspasien_prad" value="0" type="radio" class="custom-control-input" id="dactranspasien_prad_1" checked>
                              <label class="custom-control-label" for="dactranspasien_prad_1">Tidak</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                              <input onclick="document.getElementById('dactranspasien_div_prad').style.display='block'" name="dactranspasien_prad" value="1" type="radio" class="custom-control-input" id="dactranspasien_prad_2">
                              <label class="custom-control-label" for="dactranspasien_prad_2">Ya</label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row" id="dactranspasien_div_prad" style="display: none;">
                          <div class="col-md-3"></div>
                          <div class="col-md-3">
                            <label class="col-form-label">DPJP Sudah Terinfo</label>
                          </div>
                          <div class="col-md-6" id="dactranspasien_pradterinfo">
                            <div class="custom-control custom-checkbox custom-control-inline">
                              <input name="dactranspasien_pradterinfo" value="1" type="radio" class="custom-control-input" id="dactranspasien_pradterinfo_1">
                              <label class="custom-control-label" for="dactranspasien_pradterinfo_1">Tidak</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                              <input name="dactranspasien_pradterinfo" value="2" type="radio" class="custom-control-input" id="dactranspasien_pradterinfo_2">
                              <label class="custom-control-label" for="dactranspasien_pradterinfo_2">Ya</label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-3">
                            <label class="col-form-label">3. EKG</label>
                          </div>
                          <div class="col-md-6" id="dactranspasien_pekg">
                            <div class="custom-control custom-checkbox custom-control-inline">
                              <input onclick="document.getElementById('dactranspasien_div_pekg').style.display='none'" name="dactranspasien_pekg" value="0" type="radio" class="custom-control-input" id="dactranspasien_pekg_1" checked>
                              <label class="custom-control-label" for="dactranspasien_pekg_1">Tidak</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                              <input onclick="document.getElementById('dactranspasien_div_pekg').style.display='block'" name="dactranspasien_pekg" value="1" type="radio" class="custom-control-input" id="dactranspasien_pekg_2">
                              <label class="custom-control-label" for="dactranspasien_pekg_2">Ya</label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row" id="dactranspasien_div_pekg" style="display: none;">
                          <div class="col-md-3"></div>
                          <div class="col-md-3">
                            <label class="col-form-label">DPJP Sudah Terinfo</label>
                          </div>
                          <div class="col-md-6" id="dactranspasien_pekgterinfo">
                            <div class="custom-control custom-checkbox custom-control-inline">
                              <input name="dactranspasien_pekgterinfo" value="1" type="radio" class="custom-control-input" id="dactranspasien_pekgterinfo_1">
                              <label class="custom-control-label" for="dactranspasien_pekgterinfo_1">Tidak</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                              <input name="dactranspasien_pekgterinfo" value="2" type="radio" class="custom-control-input" id="dactranspasien_pekgterinfo_2">
                              <label class="custom-control-label" for="dactranspasien_pekgterinfo_2">Ya</label>
                            </div>
                          </div>
                          <div class="col-md-3"></div>
                          <div class="col-md-8 d-none">
                            <textarea rows="2" name="dactranspasien_cpenunjangekg" id="dactranspasien_cpenunjangekg" style="width:100%;" class="form-control"></textarea>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-3">
                            <label class="col-form-label">4. Lainnya</label>
                          </div>
                          <div class="col-md-6" id="dactranspasien_plain">
                            <div class="custom-control custom-checkbox custom-control-inline">
                              <input onclick="document.getElementById('dactranspasien_div_plain').style.display='none'" name="dactranspasien_plain" value="1" type="radio" class="custom-control-input" id="dactranspasien_plain_1" checked>
                              <label class="custom-control-label" for="dactranspasien_plain_1">Tidak</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                              <input onclick="document.getElementById('dactranspasien_div_plain').style.display='block'" name="dactranspasien_plain" value="2" type="radio" class="custom-control-input" id="dactranspasien_plain_2">
                              <label class="custom-control-label" for="dactranspasien_plain_2">Ya</label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row" id="dactranspasien_div_plain" style="display: none;">
                          <div class="col-md-3"></div>
                          <div class="col-md-8">
                            <textarea rows="2" name="dactranspasien_cpenunjanglain" id="dactranspasien_cpenunjanglain" style="width:100%;" class="form-control"></textarea>
                          </div>
                          <div class="col-md-3"></div>
                          <div class="col-md-3">
                            <label class="col-form-label">DPJP Sudah Terinfo</label>
                          </div>
                          <div class="col-md-6" id="dactranspasien_plainterinfo">
                            <div class="custom-control custom-checkbox custom-control-inline">
                              <input name="dactranspasien_plainterinfo" value="1" type="radio" class="custom-control-input" id="dactranspasien_plainterinfo_1">
                              <label class="custom-control-label" for="dactranspasien_plainterinfo_1">Tidak</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                              <input name="dactranspasien_plainterinfo" value="2" type="radio" class="custom-control-input" id="dactranspasien_plainterinfo_2">
                              <label class="custom-control-label" for="dactranspasien_plainterinfo_2">Ya</label>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card "><!-- R (Recommendation) -->    
                  <div class="card-header" style="background-color:black;">       
                    <h3 class="card-title" style="color:white;">R (Recommendation)</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>       
                    </div>        
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <div class="col-md-3">
                            <label class="col-form-label">Konsul DPJP</label>
                          </div>
                          <div class="col-md-7">
                            <select id="dactranspasien_ddokkon" name="ddokkon" class="form-control form-control-sm"></select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-3">
                            <label class="col-form-label">DPJP Sudah Terhubung</label>
                          </div>
                          <div class="row col-md-6" id="dactranspasien_dsambung">
                            <div class="custom-control custom-checkbox custom-control-inline">
                              <input onclick="document.getElementById('dactranspasien_div_dsambung1').style.display='none'" name="dactranspasien_dsambung" value="1" type="radio" class="custom-control-input" id="dactranspasien_dsambung_1" checked>
                              <label class="custom-control-label" for="dactranspasien_dsambung_1">Tidak</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                              <input onclick="document.getElementById('dactranspasien_div_dsambung1').style.display='block'" name="dactranspasien_dsambung" value="2" type="radio" class="custom-control-input" id="dactranspasien_dsambung_2">
                              <label class="custom-control-label" for="dactranspasien_dsambung_2">Ya</label>
                            </div>
                          </div>
                          <div class="col-md-2" id="dactranspasien_div_dsambung1" style="display:none;">
                            <div class="input-group date" id="dactranspasien_djamsambung" data-target-input="nearest">
                              <input id="dactranspasien_jamsambung" name="jamsambung" type="time" class="form-control form-control-sm" >
                            </div>
                          </div>
                        </div>
                        <div class="form-group row" id="dactranspasien_div_dsambung2" style="">
                          <div class="col-md-3">
                            <label class="col-form-label">&nbsp;</label>
                          </div>
                          <div class="row col-md-6" id="dactranspasien_dsambungpilih">
                            <div class="custom-control custom-checkbox custom-control-inline">
                              <input onclick="document.getElementById('dactranspasien_div_dsambungpilih').style.display='none'" name="dactranspasien_dsambungpilih" value="1" type="radio" class="custom-control-input" id="dactranspasien_dsambungpilih_1" checked>
                              <label class="custom-control-label" for="dactranspasien_dsambungpilih_1">Telepon</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                              <input onclick="document.getElementById('dactranspasien_div_dsambungpilih').style.display='none'" name="dactranspasien_dsambungpilih" value="2" type="radio" class="custom-control-input" id="dactranspasien_dsambungpilih_2">
                              <label class="custom-control-label" for="dactranspasien_dsambungpilih_2">Whats App</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                              <input onclick="document.getElementById('dactranspasien_div_dsambungpilih').style.display='block'" name="dactranspasien_dsambungpilih" value="3" type="radio" class="custom-control-input" id="dactranspasien_dsambungpilih_3">
                              <label class="custom-control-label" for="dactranspasien_dsambungpilih_3">Lain-lain</label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row" id="dactranspasien_div_dsambungpilih" style="display:none;">
                          <div class="col-md-3">
                            <label class="col-form-label">&nbsp;</label>
                          </div>
                          <div class="col-md-8">
                            <input type="text" class="form-control" id="dactranspasien_dsambungpilihket" maxlength="100">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-3">
                            <label class="col-form-label">Advis dari DPJP</label>
                          </div>
                          <div class="row col-md-6" id="dactranspasien_dadvis">
                            <div class="custom-control custom-checkbox custom-control-inline">
                              <input onclick="document.getElementById('dactranspasien_div_dadvis2').style.display='block'" name="dactranspasien_dadvis" value="0" type="radio" class="custom-control-input" id="dactranspasien_dadvis_1">
                              <label class="custom-control-label" for="dactranspasien_dadvis_1">Sudah Ada</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                              <input onclick="document.getElementById('dactranspasien_div_dadvis2').style.display='none'" name="dactranspasien_dadvis" value="1" type="radio" class="custom-control-input" id="dactranspasien_dadvis_2" checked>
                              <label class="custom-control-label" for="dactranspasien_dadvis_2">Belum Ada</label>
                            </div>
                          </div>
                          <div class="col-md-2" id="dactranspasien_div_dadvis1" style="display:none;">
                            <div class="input-group date" id="dactranspasien_djamadvis" data-target-input="nearest">
                              <input id="dactranspasien_jamadvis" name="jamadvis" type="time" class="form-control" >
                              <div class="input-group-append" data-target="#dactranspasien_djamadvis" data-toggle="datetimepicker">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row" id="dactranspasien_div_dadvis2">
                          <div class="col-md-3">
                            <label class="col-form-label">&nbsp;</label>
                          </div>
                          <div class="col-md-8">
                            <input type="text" class="form-control" id="dactranspasien_ketadvis" maxlength="100">
               <!-- <textarea rows="2" th:name="${ccm+'_ketadvis'}" th:id="${ccm+'_ketadvis'}" 
                style="width:100%;" class="form-control"></textarea> -->
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-3">
                <label class="col-form-label">Rencana Terapi</label>
              </div>
              <div class="col-md-8">
                <textarea rows="4" name="dactranspasien_drencanaterapi" id="dactranspasien_drencanaterapi" style="width:100%;" class="form-control"></textarea>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <div class="col-md-3">
                <label class="col-form-label">Rencana Tindakan</label>
              </div>
              <div class="col-md-8">
                <textarea rows="4" name="dactranspasien_drencanatindakan" id="dactranspasien_drencanatindakan" style="width:100%;" class="form-control"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-3">
                <label class="col-form-label">Hal-Hal Yang Diperhatikan</label>
              </div>
              <div class="col-md-8">
                <textarea rows="4" name="dactranspasien_dhal" id="dactranspasien_dhal" style="width:100%;" class="form-control"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-3"></div>
              <div class="col-md-3"></div>
              <div class="col-md-3"></div>
              <div class="col-md-3" style="padding-block-start: 50px;">
                <button type="submit" class="btn btn-primary btn-lg me-md-2" id="" onclick="saveSerTerPas()" ><i class="fas fa-save"></i> Save</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="tab-pane p-1 fade" id="ResumeErmMedisIrja" role="tabpanel">
  <h6 class="lead mb-0"><u></u></h6>
  <div class="card card-default">
    <div class="card-header" style="background-color:black;">
      <h3 class="card-title" style="color:white;"> Input Ringkasan Pasien Pulang</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="row">
        <div class="col-md-2 p2">
          <label class="form-label">Tanggal Masuk</label>
        </div>
        <div class="col-md-4 p2">
          <input type="date" id="TglMasukResumeErmMedisIrja" class="form-control form-control-xs" value="<?php echo date('Y-m-d');?>">
          <!-- /.form-group -->
        </div>
        <!-- /.col -->
        <div class="col-md-2 p2">
          <label class="form-label">Cara Masuk</label>
        </div>
        <div class="col-md-4 p2">

          <select class="form-control form-control-sm" id="caramasukResumeErmMedisIgd" name="caramasukResumeErmMedisIgd">

          </select>
        </div>
        <div class="col-md-2 p2">
          <label class="form-label">Tanggal Keluar</label>
        </div>
        <div class="col-md-4 p2">
          <input type="date" id="TglKeluarResumeErmMedisIrja" class="form-control form-control-xs" value="<?php echo date('Y-m-d');?>">
          <!-- /.form-group -->
        </div>
        <div class="col-md-2 p2">
          <label class="form-label">Berat Lahir</label>
        </div>
        <div class="col-md-4 p2">
          <input class="form-control form-control-xs" id="BBResumeErmMedisIrja">
        </div> 
        <div class="col-md-2 p2">
          <label class="form-label">DPJP Utama</label>
        </div>
        <div class="col-md-4 p2">
          <select class="form-control form-control-xs" id="dpjpResumeErmMedisIrja">
          </select>
        </div> 
        <div class="col-md-2 p2">
          <label class="form-label">Tanggal</label>
        </div>
        <div class="col-md-4 p2">
          <input class="form-control form-control-xs" id="tglResumeErmMedisIrja">
        </div>

      </div>
      <!-- /.row -->


    </div>
    <!-- /.card-body -->
  </div>
  <!-- riwayat diagnosa -->
  <div class="card card-default">
    <div class="card-header" style="background-color:black;">
      <h3 class="card-title" style="color:white;"> Riwayat Diagnosa (Diagnose History)</h3>
    </div>
    <!-- tbodylistresumeermirja -->
    <!-- /.card-header -->
    <div class="row p-2">

      <div class="col-md-12">
        <div class="card card-default">
          <div class="card-header">
            <h4 class="card-title">Histori Diagnosa</h4>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive-md">
              <table class="table-sm" class="table table-striped table-sm choose" style="border-collapse: inherit;" style="border:solid;">
                <thead>
                  <th>
                    NO
                  </th>
                  <th>
                    POLI
                  </th>
                  <th>
                    TGL KUNJUNGAN
                  </th>
                  <th>
                    ICD
                  </th>
                  <th>
                    DISKRIPSI
                  </th>
                </thead>
                <tbody id="tbodylistresumeermirja">
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <div class="card card-default">
    <div class="card-header" style="background-color:black;">
      <h3 class="card-title" style="color:white;"> Pemeriksaan (Examination)</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="row">
        <div class="col-md-2 p2">
          <label class="form-label">Riwayat Kesehatan</label>
        </div>
        <div class="col-md-4 p2">
          <textarea class="form-control" id="RiwayatKesResumeErmIrja"></textarea>
          <!-- /.form-group -->
        </div>
        <!-- /.col -->
        <div class="col-md-2 p2">
          <label class="form-label">Terapi</label>
        </div>
        <div class="col-md-4 p2">
          <textarea class="form-control " id="TerapiResumeErmIrja"></textarea>
          <!-- /.form-group -->
        </div>
        <!-- /.col --> 
        <div class="col-md-2 p2">
          <label class="form-label">Pemeriksaan Fisik</label>
        </div>
        <div class="col-md-4 p2">
          <textarea class="form-control " id="PemeriksaanFisikResumeErmIrja"></textarea>
        </div>
        <div class="col-md-2 p2">
          <label class="form-label">Tindakan</label>
        </div>
        <div class="col-md-4 p2">
          <textarea class="form-control" id="TindakanResumeErmIrja"></textarea>
        </div>
        <div class="col-md-2 p2">
          <label class="form-label">Pemeriksaan Diagnostik</label>
        </div>
        <div class="col-md-4 p2">
          <textarea class="form-control" id="DiagnostikResumeErmIrja"></textarea>
        </div>  
        <div class="col-md-2 p2">
          <label class="form-label">Intruksi / Tindak Lanjut</label>
        </div>
        <div class="col-md-4 p2">
          <textarea class="form-control" id="InstruksiResumeErmIrja"></textarea>
        </div>
        <div class="col-md-2 p2">
          <label class="form-label">Diagnosis</label>
        </div>
        <div class="col-md-4 p2">
          <textarea class="form-control" id="DiagnosisResumeErmIrja"></textarea>
        </div>
        <div class="col-md-2 p2">
          <label class="form-label">Perkembangan Selama Perawatan</label>
        </div>
        <div class="col-md-4 p2">
          <textarea class="form-control" id="PerkembanganResumeErmIrja"></textarea>
        </div>
      </div>
      <!-- /.row -->


    </div>
    <!-- /.card-body -->
  </div>
  <div class="card card-default">
    <div class="card-header" style="background-color:black;">
      <h3 class="card-title" style="color:white;"> Diagnosis & Prosedur Terapi (Diagnose & Therapeutic Procedure)</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-default">
            <div class="card-header">
              <h4 class="card-title">Diagnosis</h4>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive-md">
                <table class="table-sm" class="table table-striped table-sm choose" style="border-collapse: inherit;" style="border:solid;">
                  <thead>
                    <th>
                      NO
                    </th>
                    <th>
                      Jenis Pemeriksaan
                    </th>
                  </thead>
                  <tbody id="tbodylistlaboratorium">
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <button type="button" class="btn btn-default" onclick="show_modalPermintaanLabIrja()">Tambah Diagnosis</button><br>
        </div>
        <div class="col-md-6">
          <div class="card card-default">
            <div class="card-header">
              <h4 class="card-title">Procedures</h4>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive-md">
                <table class="table-sm" class="table table-striped table-sm choose" style="border-collapse: inherit;" style="border:solid;">
                  <thead>
                    <th>
                      NO
                    </th>
                    <th>
                      Jenis Pemeriksaan
                    </th>
                  </thead>
                  <tbody id="tbodylistlaboratorium">
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <button type="button" class="btn btn-default" onclick="show_modalPermintaanLabIrja()">Tambah Procedures</button><br>
        </div>
      </div>
      <!-- /.row -->


    </div>
    <!-- /.card-body -->
  </div>
  <div class="card card-default">
    <div class="card-header" style="background-color:black;">
      <h3 class="card-title" style="color:white;"> Kondisi Pasien (Patient's Status)</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="row">
        <div class="col-md-4">
          <table>
            <tr>
              <td>
                <label>Cara Keluar</label>
              </td>
              <td>
                <select class="form-control form-control-xs" name="CaraKeluarResumeErmIrja" id="CaraKeluarResumeErmIrja" ></select>
              </td>
            </tr>
            <tr>
              <td>
                <label>Keadaan Umum</label>
              </td>
              <td>
                <select class="form-control form-control-xs" name="keadaanUmumResumeErmIrja" id="keadaanUmumResumeErmIrja" ></select>
              </td>
            </tr>
            <tr>
              <td>
                <label>Kesadaran</label>  
              </td>
              <td> 
                <input type="text" class="form-control form-control-xs" name="kesadaranResumeErmIrja" id="kesadaranResumeErmIrja">
              </td>
            </tr>
            <tr>
              <td>
                <label>Mobilitasi Pulang</label>
              </td>
              <td>
                <input type="text" class="form-control form-control-xs" name="MblplgResumeErmIrja" id="MblplgResumeErmIrja">
              </td>
            </tr>
          </table>
        </div>
        <div class="col-md-4">
          <table>
            <tr>
              <td>
                <label>Covid 19</label>
              </td>
              <td>
                <input type="checkbox" name="CovidResumeErmIrja" id="CovidResumeErmIrja">
              </td>
            </tr>
            <tr>
              <td>
                <label>Tensi</label>
              </td>
              <td>
                <input type="text" class="form-control form-control-xs" name="tensiResumeErmIrja" id="tensiResumeErmIrja">
              </td>
            </tr>
            <tr>
              <td>
                <label>Nadi</label>
              </td>
              <td>
                <input type="text" class="form-control form-control-xs" name="nadiResumeErmIrja" id="nadiResumeErmIrja" >
              </td>
            </tr>
            <tr>
              <td>
                <label>Alat Bantu</label>
              </td>
              <td>
                <input type="checkbox" name="alatBntResumeErmIrja" id="alatBntResumeErmIrja">
              </td>
            </tr>
          </table>
        </div>
        <div class="col-md-4">
          <table>
            <tr>
              <td>
                <label>Kasus Baru</label>
              </td>
              <td>
                <input type="checkbox"  name="KasusBrResumeErmIRja" id="KasusBrResumeErmIRja">
              </td>
            </tr>
            <tr>
              <td>
                <label>Suhu</label>
              </td>
              <td>
                <input type="text" class="form-control form-control-xs" name="SuhuResumeErmIrja" id="SuhuResumeErmIrja">
              </td>
            </tr>
            <tr>
              <td>
                <label>Respirasi</label>
              </td>
              <td>
                <input type="text" class="form-control form-control-xs" name="RespirasiResumeErmIrja" id="RespirasiResumeErmIrja">
              </td>
            </tr>
            <tr>
              <td>
                <label>Alat Medis Terpasang</label>
              </td>
              <td>
                <input type="text" class="form-control form-control-xs" name="AlatMedisResumeErmIrja" id="AlatMedisResumeErmIrja">
              </td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.row -->


    </div>
    <!-- /.card-body -->
  </div>
  <div class="card card-default">
    <div class="card-header" style="background-color:black;">
      <h3 class="card-title" style="color:white;"> Intruksi / Tindak Lanjut (Instruction / Follow Up / Medical Advice)</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="row">
        <div class="col-md-2">
          <label>Intruksi Tindak Lanjut</label>
        </div >
        <div class="col-md-3">                      
          <select class="form-control form-control-xs" id="selectInstruksiResumeErmIrja" onchange="selectInstruksiResumeErmIrja()">
            <option value="1">DIRAWAT</option>
            <option value="2">DIRUJUK</option>
            <option value="3">PULANG</option>
            <option value="4">MENINGGAL</option>
            <option value="5">DEATH ON ARRIVA</option>
          </select>
        </div>
        <div class="col-md-6">
          <button class="btn btn-primary btn-xs"  style="display: none;">Pengantar Rawat Inap</button>
          <button class="btn btn-primary btn-xs" style="display: none;">Rujuk Alih Rawat</button>
          <button class="btn btn-primary btn-xs" style="display: none;">Surat Kontrol</button>
          <button class="btn btn-primary btn-xs" style="display: none;">Program Rujuk Balik</button>
          <button class="btn btn-primary btn-xs" style="display: none;">Surat Kematian</button>
        </div>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.card-body -->
  </div>
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-12" style="padding-top: 20px;">
          <div class="card" style="width: 500px;height: 500px;border-collapse: !important;">
           <label>Tanda tangan</label> 
           <div id="paint_ttdresumedokter"></div>
         </div>
       </div>
       <button class="btn btn-warning" onclick="showttdresumedokter()">Edit</button>
     </div>
   </div>
 </div>
 <button  class="btn btn-primary" onclick="simpanResumeigd()">Simpan Resume</button>
</div>
<div class="tab-pane p-1 fade" id="assesKepErmKeperawatanIgd" role="tabpanel">
  <h6 class="lead mb-0"><u>Assesmen Perawatan</u></h6>
  <div class="card card-default">
    <div class="card-header" style="background-color:black;">
      <h3 class="card-title" style="color:white;">ANAMNESIS</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="row">
        <div class="col-md-4 p2">
          <label class="form-label">Keluhan Utama</label>
        </div>
        <div class="col-md-8 p2">
          <textarea class="form-control " id="keluhanutamaKeperawatanErmIgd"></textarea>
          <!-- /.form-group -->
        </div>
        <!-- /.col -->
        <div class="col-md-4 p2">
          <label class="form-label">Riwayat Penyakit Sekarang *</label>&nbsp;&nbsp;&nbsp;<label><span class="badge bg-primary rounded-pill" onclick="penyakitsekarangasskepigd()" title="autocomplete">auto</span></label>&nbsp;<label><span class="badge bg-primary rounded-pill" onclick="showmodaltambahpenyakitKeperawatansekarang()" title="tambah icd">Tambah</span></label>
        </div>
        <div class="col-md-8 p2">
          <textarea class="form-control " id="RiwayatPenyakitNowasskepigd"></textarea>
          <div id="DivKeperawatanRiwayatPenyakitSekarang"></div>
          <!-- /.form-group -->
        </div>
        <!-- /.col --> 

      </div>
      <!-- /.row -->
    </div>
    <!-- /.card-body -->
  </div>
  <div class="card card-default">
    <div class="card-header" style="background-color:black;">
      <h3 class="card-title" style="color:white;">RIWAYAT BIOPSIKOSOSIAL, KULTURAL, SPIRITUAL & EKONOMI</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="row">
        <div class="col-md-4">
          <label class="form-label">Agama :</label>
        </div>
        <div class="col-md-6" >
          <select class="form-control form-control-xs" id="AgamaAssKeperawatanErmIgd">

          </select>
        </div>
        <div class="col-md-4">
          <label class="form-label">Pekerjaan :</label>
        </div>
        <div class="col-md-6">
          <select class="form-control form-control-xs" id="pekerjaanAssKeperawatanErmIgd">

          </select>
        </div>
        <div class="col-md-4">
          <label class="form-label">Tinggal Bersama :</label>
        </div>
        <div class="col-md-6">
          <select class="form-control form-control-xs" id="TinggalBersamaAssKeperawatanErmIgd">
            <option value="1">Suami/Istri</option>
            <option value="2">Orang Tua</option>
            <option value="3">Anak</option>
            <option value="4">Lain-Lain</option>
            <option value="5">Tinggal Sendiri</option>
          </select>
        </div>
        <div class="col-md-4">
          <label class="form-label">Status Mental :</label>
        </div>
        <div class="col-md-6">
          <select class="form-control form-control-xs" id="StatusMentalAssKeperawatanErmIgd">
            <option value="1">Orientasi Baik</option>
            <option value="2">Agitasi</option>
            <option value="3">Menyerang</option>
            <option value="4">Tidak Ada Respon</option>
            <option value="5">Lain-Lain</option>
          </select>
        </div>

        <div class="col-md-4">
          <label class="form-label">Status Psikologis :</label>
        </div>
        <div class="col-md-6">
          <select class="form-control form-control-xs" id="StatusPsikoAssKeperawatanErmIgd">
            <option value="1">Kooperatif</option>
            <option value="2">Disorientasi</option>
            <option value="3">Tenang</option>
            <option value="4">Hiperaktif</option>
            <option value="5">Cemas</option>
            <option value="6">Kecenderungan Bunuh Diri</option>
          </select>
        </div>
        <div class="col-md-4">
          <label class="form-label">Penggunaan Restrain :</label>
        </div>
        <div class="col-md-6">
          <select class="form-control form-control-xs" id="RestrainAssKeperawatanErmIgd" onchange="tampilasalanrestrain()">
            <option value="1">Tidak</option>
            <option value="2">Ya, Alasan</option>
          </select>
          <div style="display: none;" id="DivalasanRestrainAssKeperawatanErmIgd">
            <input type="text"  class="form-control form-control-xs" name="alasanRestrainAssKeperawatanErmIgd" >
          </div>
        </div>
        <div class="col-md-4">
          <label class="form-label">Budaya Yang Dianut :</label>
        </div>
        <div class="col-md-6">
          <select class="form-control form-control-xs" id="BudayaAssKeperawatanErmIgd" onchange="tampilBudayaAnut()">
            <option value="1">Tidak</option>
            <option value="2">Ya</option>
          </select>
          <div style="display: none;" id="DivKetBudayaAssKeperawatanErmIgd">
            <input type="text" class="form-control form-control-xs" name="KetBudayaAssKeperawatanErmIgd">
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.card-body -->
  </div>
  <div class="card card-default">
    <div class="card-header" style="background-color:black;">
      <h3 class="card-title" style="color:white;">TANDA VITAL</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="row">
        <div class="col-md-4">
          <table class="table-sm">
            <tr>
              <td>
                <label>Keadaan Umum</label>
              </td>
              <td>
                <select class="form-control form-control-xs" id="KeadaanUmumAssPerawatIgd">
                  <option value="1">Baik</option>
                  <option value="2">Sedang</option>
                  <option value="3">Berat</option>
                </select>
              </td>
            </tr>
            <tr>
              <td>
                <label>Respirasi</label>
              </td>
              <td>
                <div >
                  <input type="text" class="form-control form-control-xs" id="respirasiAssPerawatigd">
                  <div class="input-group-prepend">
                    <span>x/Menit</span>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <label>Nadi</label>
              </td>
              <td>
                <div>
                  <input type="text" class="form-control form-control-xs" id="nadiAssPerawatigd">
                  <div class="input-group-prepend">
                    <span>x/Menit</span>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <label>SpO2</label>
              </td>
              <td>
                <div >
                  <input type="text" class="form-control form-control-xs" id="Spo2AssPerawatigd">
                  <div class="input-group-prepend">
                    <span>%</span>
                  </div>
                </div>
              </td>
            </tr>
          </table>
        </div>
        <div class="col-md-4">
          <table>
            <tr>
              <td>
                <label>Pupil</label>
              </td>
              <td>
                <div  >
                  <div class="input-group-prepend">
                    <span >kiri </span>
                  </div>
                  <input type="number" class="form-control form-control-xs" id="pupilkiriAssPerawatigd">
                  <div class="input-group-prepend">
                    <span >kanan </span>
                  </div>
                  <input type="number" class="form-control form-control-xs" id="pupilkananAssPerawatigd">
                  <div class="input-group-prepend">
                    <span>mm</span>
                  </div>
                </div>

              </td>
            </tr>
            <tr>
              <td>
                <label>Tekanan Darah</label>
              </td>
              <td>
                <div class="input-group">
                  <input type="number" class="form-control form-control-xs" id="tekananDarahAssPerawatigd1"><h3>/</h3>
                  <input type="number" class="form-control form-control-xs" id="tekananDarahAssPerawatigd2">
                  <div class="input-group-prepend">
                    <span>mmHg</span>
                  </div>
                </div>
                <div class="input-group">
                  <input type="text" placeholder="Diisi jika Palpasi" class="form-control form-control-xs" id="palpasiAssPerawatigd" >
                  <div class="input-group-prepend">
                    <span>Per palpasi</span>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <label>Suhu</label>
              </td>
              <td>
                <div class="input-group">
                  <input type="text" class="form-control form-control-xs" id="suhuAssPerawatigd" >
                  <div class="input-group-prepend">
                    <span >C</span>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <label>Reflek Cahaya</label>
              </td>
              <td>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span >kiri</span>
                  </div>
                  <select class="form-control form-control-xs" id="reflekCahayaKiriAssPerawatigd" >
                    <option value="1">-</option>
                    <option value="2">+</option>
                  </select>
                  <div class="input-group-prepend">
                    <span >kanan</span>
                  </div>
                  <select class="form-control form-control-xs" id="reflekCahayaKananAssPerawatigd">
                    <option value="1">-</option>
                    <option value="2">+</option>
                  </select>
                </div>
              </td>
            </tr>
          </table>
        </div>
        <div class="col-md-4">
          <table class="table-sm">
            <tr>
              <td colspan="2">
                <h6>Note (*) Nominal ribuan = gram, satuan / puluhan / ratusan = kg</h6>
              </td>
            </tr>
            <tr>
              <td>
                <label>Berat Badan</label>
              </td>
              <td>
                <div class="input-group">
                  <input type="number" id="bbAssPerawatigd" class="form-control form-control-xs">
                  <div class="input-group-prepend">
                    <span>Kg / Gram</span>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <label>Tinggi Badan</label>
              </td>
              <td>
                <div class="input-group">
                  <input type="number" class="form-control form-control-xs" id="tinggiAssPerawatigd" >
                  <div class="input-group-prepend">
                    <span>cm</span>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <label>IMT</label>
              </td>
              <td>
                <div class="input-group">
                  <input type="number" class="form-control form-control-xs" id="imtAssPerawatigd" >
                  <div class="input-group-prepend">
                    <span>kg/m2</span>
                  </div>
                </div>
              </td>
            </tr>
          </table>
        </div>
      </div>
      <div class="row "><br>


        <div class="col-md-12">

          <table class="table table-bordered table-sm" style="display: none;"> 
            <thead>
            </thead>
            <tbody>                            
              <tr>
                <td colspan="4" style="text-align: center;">
                  <label class="form-label">Glasgow Coma Scale ( GCS )</label>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  Kategori
                </td>
                <td>  
                  Skor
                </td>
                <td>
                  Hasil Skor
                </td>
              </tr>
              <tr >
                <td rowspan="4">
                  Respon Buka Mata (Eye Opening : E)
                </td>
                <td onclick="dacrjasesmenkeperawatanex_setScore(4, 1)">
                 Spontan
               </td>
               <td>
                4
              </td>
              <td rowspan="4">
                <input type="text" name="eyeOpenasskepigd" id="eyeOpenasskepigd" class="form-control" value="4">
              </td>
            </tr>
            <tr >
             <td onclick="dacrjasesmenkeperawatanex_setScore(3, 1)">
               Terhadap Suara
             </td>
             <td>
              3
            </td>
          </tr>
          <tr>
           <td onclick="dacrjasesmenkeperawatanex_setScore(2, 1)">
            Terhadap Nyeri
          </td>
          <td>
            2
          </td>
        </tr>
        <tr>
         <td onclick="dacrjasesmenkeperawatanex_setScore(1, 1)">
           Tidak ada
         </td>
         <td>
          1
        </td>
      </tr>
      <tr>
        <td rowspan="6">
          Respon Motorik Terbaik (M)
        </td>
        <td onclick="dacrjasesmenkeperawatanex_setScore(6, 2)">
         Turut Perintah
       </td>
       <td>
        6
      </td>
      <td rowspan="6">
        <input type="text" name="ResponMotorikasskepigd" id="ResponMotorikasskepigd" class="form-control" value="6">
      </td>
    </tr>
    <tr>
     <td onclick="dacrjasesmenkeperawatanex_setScore(5, 2)">
       Melokalisir Nyeri
     </td>
     <td>
      5
    </td>
  </tr>
  <tr>
   <td onclick="dacrjasesmenkeperawatanex_setScore(4, 2)">
     Fleksi Normal (Menarik anggota gerak yang dirangsang)
   </td>
   <td>
    4
  </td>
</tr>
<tr>
 <td onclick="dacrjasesmenkeperawatanex_setScore(3, 2)">
   Fleksi Abnormal (dekortikasi)
 </td>
 <td>
  3
</td>
</tr>
<tr>
 <td onclick="dacrjasesmenkeperawatanex_setScore(2, 2)">
   Ekstensi Abnormal (deserebrasi)
 </td>
 <td>
  2
</td>
</tr>
<tr>
 <td onclick="dacrjasesmenkeperawatanex_setScore(1, 2)">
  Tidak Ada (Flasid)
</td>
<td>
  1
</td>
</tr>
<tr>
  <td rowspan="5">
    Respon Verbal (V)
  </td>
  <td onclick="dacrjasesmenkeperawatanex_setScore(5, 3)">
   Berorientasi Baik
 </td>
 <td>
  5
</td>
<td rowspan="5">
  <input type="text" name="responVerbalasskepigd" id="responVerbalasskepigd" class="form-control" value="5">
</td>
</tr>
<tr>
 <td onclick="dacrjasesmenkeperawatanex_setScore(4, 3)">
  Berbicara mengacau (bingung)

</td>
<td>
  4
</td>
</tr>
<tr>
 <td onclick="dacrjasesmenkeperawatanex_setScore(3, 3)">
  Kata-Kata tidak teratur
</td>
<td>
  3
</td>
</tr>
<tr>
 <td onclick="dacrjasesmenkeperawatanex_setScore(2, 3)">
   Suara Tidak Jelas
 </td>
 <td>
  2
</td>
</tr>
<tr>
 <td onclick="dacrjasesmenkeperawatanex_setScore(1, 3)">
   Tidak Ada
 </td>
 <td>
  1
</td>
</tr>
<tr>
  <td colspan="3">
    <div class="col-md-4">
     <select class="form-control">
      <option value="1">Compos mentis</option>
      <option value="2">Apatis</option>
      <option value="3">Somnolen</option>
      <option value="4">Delirium</option>
      <option value="5">Sopor</option>
      <option value="6">Coma</option>
    </select>
  </td>
  <td>
   <div class="col-md-4"> 
    <input type="text" class="form-control" name="skorassesmenkeperawatanIgd" id="skorassesmenkeperawatanIgd" value="1">
  </div>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>

<!-- /.card-body -->
</div>
<div class="card card-default">
  <div class="card-header " style="background-color:black;">
    <h3 class="card-title" style="color:white;">PEMERIKSAAN FISIK UMUM</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered table-sm">
          <thead></thead>
          <tbody>
            <tr>
              <td>
                Kepala
              </td>
              <td>
                <input type="radio" name="fisikKepalaasskepigd" id="fisikKepalaasskepigd1" onclick="document.getElementById('fisikKepalaasskepigdKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikKepalaasskepigdKet" id="fisikKepalaasskepigdKet" style="display:none;">
                <input type="radio" name="fisikKepalaasskepigd" id="fisikKepalaasskepigd2" onclick="document.getElementById('fisikKepalaasskepigdKet').style.display='none'" checked='true' value="1">Normal
              </td>
              <td>
                Jantung
              </td>
              <td>
                <input type="radio" name="fisikJantungasskepigd" id="fisikJantungasskepigd1" onclick="document.getElementById('fisikJantungasskepigdKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikJantungasskepigdKet" id="fisikJantungasskepigdKet" style="display:none;">
                <input type="radio" name="fisikJantungasskepigd" id="fisikJantungasskepigd2" onclick="document.getElementById('fisikJantungasskepigdKet').style.display='none'" checked='true' value="1">Normal
              </td>
            </tr>
            <tr>
              <td>
                Mata
              </td>
              <td>
                <input type="radio" name="fisikMataasskepigd" onclick="document.getElementById('fisikMataasskepigdKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikMataasskepigdKet" id="fisikMataasskepigdKet" style="display:none;">
                <input type="radio" name="fisikMataasskepigd" onclick="document.getElementById('fisikMataasskepigdKet').style.display='none'" value="1" checked='true'>Normal
              </td>
              <td>
                Paru
              </td>
              <td>
                <input type="radio" name="fisikParuasskepigd" onclick="document.getElementById('fisikParuasskepigdKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikParuasskepigdKet" id="fisikParuasskepigdKet" style="display:none;">
                <input type="radio" name="fisikParuasskepigd" onclick="document.getElementById('fisikParuasskepigdKet').style.display='none'" value="1" checked='true'>Normal
              </td>
            </tr>
            <tr>
              <td>
                THT
              </td>
              <td> 
                <input type="radio" name="fisikThtasskepigd" onclick="document.getElementById('fisikThtasskepigdKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikThtasskepigdKet" id="fisikThtasskepigdKet" style="display:none;">
                <input type="radio" name="fisikThtasskepigd" onclick="document.getElementById('fisikThtasskepigdKet').style.display='none'" value="1" checked='true'>Normal
              </td>
              <td>
                Ambomen
              </td>
              <td>
                <input type="radio" name="fisikAbdomenasskepigd" onclick="document.getElementById('fisikAbdomenasskepigdKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikAbdomenasskepigdKet" id="fisikAbdomenasskepigdKet" style="display:none;">
                <input type="radio" name="fisikAbdomenasskepigd" onclick="document.getElementById('fisikAbdomenasskepigdKet').style.display='none'" value="1" checked='true'>Normal
              </td>
            </tr>
            <tr>
              <td>
                Leher
              </td>
              <td>
                <input type="radio" name="fisikLeherasskepigd" onclick="document.getElementById('fisikLeherasskepigdKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikLeherasskepigdKet" id="fisikLeherasskepigdKet" style="display:none;">
                <input type="radio" name="fisikLeherasskepigd" onclick="document.getElementById('fisikLeherasskepigdKet').style.display='none'" value="1" checked='true'>Normal
              </td>
              <td>
                Genitalia
              </td>
              <td>
                <input type="radio" name="fisikGenitaliaasskepigd" onclick="document.getElementById('fisikGenitaliaasskepigdKet').style.display='block'" value="2" >Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikGenitaliaasskepigdKet" id="fisikGenitaliaasskepigdKet" style="display:none;">
                <input type="radio" name="fisikGenitaliaasskepigd" onclick="document.getElementById('fisikGenitaliaasskepigdKet').style.display='none'" value="1" checked='true'>Normal
              </td>
            </tr>
            <tr>
              <td>
                Mulut
              </td>
              <td>
                <input type="radio" name="fisikMulutasskepigd" onclick="document.getElementById('fisikMulutasskepigdKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikMulutasskepigdKet" id="fisikMulutasskepigdKet" style="display:none;">
                <input type="radio" name="fisikMulutasskepigd" onclick="document.getElementById('fisikMulutasskepigdKet').style.display='none'" value="1" checked='true'>Normal
              </td>
              <td>
                Status Localis
              </td>
              <td>
                <textarea class="form-control " id="fisikStatusLocalisasskepigd"></textarea>
              </td>
            </tr>
            <tr>
              <td>
                Thorax
              </td>
              <td colspan="3">
                <input type="radio" name="fisikThoraxasskepigd" onclick="document.getElementById('fisikThoraxasskepigdKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs"  name="fisikThoraxasskepigdKet" id="fisikThoraxasskepigdKet" style="display:none;"><br>
                <input type="radio" name="fisikThoraxasskepigd" onclick="document.getElementById('fisikThoraxasskepigdKet').style.display='none'" value="1" checked='true'>Norma
              </td>
            </tr>
          </tbody>
        </table>
        <!-- /.form-group -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.card-body -->
</div>
<div class="card card-default" id="divriwayatmensIgd" style="display:none;">
  <div class="card-header" style="background-color:black;">
    <h3 class="card-title" style="color:white;">RIWAYAT MENSTRUASI</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <div class="card-body">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group row">
            <div class="col-md-4">
              <label class="col-form-label"> Riwayat Menstruasi</label>
            </div>
            <div class="col-md-8">
              <div class="row" id="divdacrjasesmenneoanak_hmensId">
                <div class="col-md-5">
                  <div class="form-group">
                    <div class="row custom-control custom-checkbox custom-control-inline">
                      <input name="dacrjasesmenneoanak_hmensId" value="1" type="radio" class="custom-control-input" id="dacrjasesmenneoanak_hmensId_1"> <label class="custom-control-label" for="dacrjasesmenneoanak_hmensId_1">Belum/Tidak Menstruasi</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group">
                    <div class="row custom-control custom-checkbox custom-control-inline">
                      <input name="dacrjasesmenneoanak_hmensId" value="2" type="radio" class="custom-control-input" id="dacrjasesmenneoanak_hmensId_2"> <label class="custom-control-label" for="dacrjasesmenneoanak_hmensId_2">Sudah Menstruasi</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="row">   
          <div class="col-md-4">
            <div class="form-group row">
              <div class="col-md-4">
               <!-- <i class="fa fa-chevron-right"></i> -->
               <label class="col-form-label" title="Umur Menarche">Umur Menarche</label>
             </div>
             <div class="col-md-5">
              <div class="input-group">
                <input type="number" onfocus="this.select();" class="form-control" id="dacigdasesmenawalmt_hmenarche">
                <span class="input-group-append">
                  <span class="input-group-text">Tahun</span>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-4">
             <!-- <i class="fa fa-chevron-right"></i> -->
             <label class="col-form-label" title="Jumlah Darah Haid">Jumlah Darah Haid</label>
           </div>
           <div class="col-md-5">
            <div class="input-group">
              <input type="number" onfocus="this.select();" class="form-control" id="dacigdasesmenawalmt_hdarahhaid">
              <span class="input-group-append">
                <span class="input-group-text">Kali ganti pembalut</span>
              </span>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-4">
           <!-- <i class="fa fa-chevron-right"></i> -->
           <label class="col-form-label" title="Siklus Haid">Siklus Haid</label>
         </div>
         <div class="col-md-5">
          <div class="input-group">
            <input type="number" onfocus="this.select();" class="form-control" id="dacigdasesmenawalmt_hsiklushaid">
            <span class="input-group-append">
              <span class="input-group-text">Hari</span>
            </span>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group row">
        <div class="col-md-4">
         <!-- <i class="fa fa-chevron-right"></i> -->
         <label class="col-form-label" title="Lamanya Haid">Lamanya Haid</label>
       </div>
       <div class="col-md-5">
        <div class="input-group">
          <input type="number" onfocus="this.select();" class="form-control" id="dacigdasesmenawalmt_hlamahaid">
          <span class="input-group-append">
            <span class="input-group-text">Hari</span>
          </span>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-4">
       <!-- <i class="fa fa-chevron-right"></i> -->
       <label class="col-form-label" title="Dismenore">Dismenore</label>
     </div>
     <div class="col-md-7" id="divdacigdasesmenawalmt_hdesminore">
      <div class="custom-control custom-checkbox custom-control-inline">
        <input name="dacigdasesmenawalmt_hdesminore" value="1" type="radio" class="custom-control-input" id="dacigdasesmenawalmt_hdesminore_1">
        <label class="custom-control-label" for="dacigdasesmenawalmt_hdesminore_1">Tidak</label>
      </div>
      <div class="custom-control custom-checkbox custom-control-inline">
        <input name="dacigdasesmenawalmt_hdesminore" value="2" type="radio" class="custom-control-input" id="dacigdasesmenawalmt_hdesminore_2">
        <label class="custom-control-label" for="dacigdasesmenawalmt_hdesminore_2">Ya</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-md-4">
     <!-- <i class="fa fa-chevron-right"></i> -->
     <label class="col-form-label" title="Riwayat Perkawinan">Riwayat Perkawinan</label>
   </div>
   <div class="col-md-5">
    <div class="input-group">
      <input type="number" onfocus="this.select();" class="form-control" id="dacigdasesmenawalmt_hkawin">
      <span class="input-group-append">
        <span class="input-group-text">Kali</span>
      </span>
    </div>
  </div>
</div>
</div>
<div class="col-md-4">
  <div class="form-group row">
    <div class="col-md-4">
     <!-- <i class="fa fa-chevron-right"></i> -->
     <label class="col-form-label" title="Kawin Ke 1 Usia">Kawin Ke 1 Usia</label>
   </div>
   <div class="col-md-5">
    <div class="input-group">
      <input type="number" onfocus="this.select();" class="form-control" id="dacigdasesmenawalmt_hkawin1usia">
      <span class="input-group-append">
        <span class="input-group-text">Tahun</span>
      </span>
    </div>
  </div>
</div>
<div class="form-group row">
  <div class="col-md-4">
   <!-- <i class="fa fa-chevron-right"></i> -->
   <label class="col-form-label" title="Usia Suami 1">Usia Suami 1</label>
 </div>
 <div class="col-md-5">
  <div class="input-group">
    <input type="number" onfocus="this.select();" class="form-control" id="dacigdasesmenawalmt_husiasuami1">
    <span class="input-group-append">
      <span class="input-group-text">Tahun</span>
    </span>
  </div>
</div>
</div>
<div class="form-group row">
  <div class="col-md-4">
   <!-- <i class="fa fa-chevron-right"></i> -->
   <label class="col-form-label" title="Kawin Ke 2 Usia">Kawin Ke 2 Usia</label>
 </div>
 <div class="col-md-5">
  <div class="input-group">
    <input type="number" onfocus="this.select();" class="form-control" id="dacigdasesmenawalmt_hkawin2usia">
    <span class="input-group-append">
      <span class="input-group-text">Tahun</span>
    </span>
  </div>
</div>
</div>
<div class="form-group row">
  <div class="col-md-4">
   <!-- <i class="fa fa-chevron-right"></i> -->
   <label class="col-form-label" title="Usia Suami 2">Usia Suami 2</label>
 </div>
 <div class="col-md-5">
  <div class="input-group">
    <input type="number" onfocus="this.select();" class="form-control" id="dacigdasesmenawalmt_husiasuami2">
    <span class="input-group-append">
      <span class="input-group-text">Tahun</span>
    </span>
  </div>
</div>
</div>
</div>
</div>
<div class="row">   
  <div class="col-md-4">
    <div class="form-group row">
      <div class="col-md-4">
        <label class="col-form-label" title="RIWAYAT OBSTETRIK ">Riwayat Obstetrik</label>
      </div>
      <div class="col-md-6">
        <div class="input-group">
          <span class="input-group-prepend">
            <span class="input-group-text">G</span>
          </span>
          <input type="number" onfocus="this.select();" class="form-control" name="dacigdasesmenawalmt_hobstetrikg" id="dacigdasesmenawalmt_hobstetrikg">
          <span class="input-group-prepend">
            <span class="input-group-text">P</span>
          </span>
          <input type="number" onfocus="this.select();" class="form-control" name="dacigdasesmenawalmt_hobstetrikp" id="dacigdasesmenawalmt_hobstetrikp">
          <span class="input-group-prepend">
            <span class="input-group-text">A</span>
          </span>
          <input type="number" onfocus="this.select();" class="form-control" name="dacigdasesmenawalmt_hobstetrika" id="dacigdasesmenawalmt_hobstetrika">
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group row">
      <div class="col-md-4">
        <label class="col-form-label" title="HPHT">HPHT</label>
      </div>
      <div class="col-md-6">
        <div class="input-group date" id="dacigdasesmenawalmt_dhtglhpht" data-target-input="nearest">
          <input id="dacigdasesmenawalmt_htglhpht" name="htglhpht" type="text" class="form-control datetimepicker-input" data-target="#dacigdasesmenawalmt_dhtglhpht" data-toggle="datetimepicker">
          <div class="input-group-append" data-target="#dacigdasesmenawalmt_dhtglhpht" data-toggle="datetimepicker">
            <div class="input-group-text"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group row">
      <div class="col-md-4">
        <label class="col-form-label" title="Taksiran Persalinan">Taksiran Persalinan</label>
      </div>
      <div class="col-md-6">
        <div class="input-group date" id="dacigdasesmenawalmt_dhtglsalin" data-target-input="nearest">
          <input id="dacigdasesmenawalmt_htglsalin" name="htglsalin" type="text" class="form-control datetimepicker-input" data-target="#dacigdasesmenawalmt_dhtglsalin" data-toggle="datetimepicker">
          <div class="input-group-append" data-target="#dacigdasesmenawalmt_dhtglsalin" data-toggle="datetimepicker">
            <div class="input-group-text"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="form-group row">
      <div class="col-md-12">
        <div class="form-group row">
          <label class="col-form-label" title="RIWAYAT OBSTETRIK ">RIWAYAT HAMIL INI</label>
        </div>
        <div class="form-group row">
          <div class="col-md-2">
            <label class="col-form-label" title="TM I">&nbsp;&nbsp;&nbsp;&nbsp;TM I</label>
            <!--  <input type="hidden" id="dacigdasesmenawalmt_hhamiltm1Id" > -->
          </div>
          <div class="col-md-9 row" id="dacigdasesmenawalmt_hhamiltm1list">
            <div class="col-md-4">
              <select class="form-control">
                <option value="1">Mual</option>
                <option value="2">Muntah</option>
                <option value="3">Pendarahan</option>
                <option value="4">Lain-Lain</option>
                <option value="5">Tidak Ada Keluhan</option> 
              </select>
            </div>
<!--             <div class="col-md-2 row">
              <div class="row custom-control custom-checkbox custom-control-inline">
                <input name="dacigdasesmenawalmt_hhamiltm1list" value="1" type="checkbox" class="custom-control-input" id="dacigdasesmenawalmt_hhamiltm1list_1">
                <label class="custom-control-label" for="dacigdasesmenawalmt_hhamiltm1list_1">Mual</label>
              </div>
            </div>
            <div class="col-md-2 row">
              <div class="row custom-control custom-checkbox custom-control-inline">
                <input name="dacigdasesmenawalmt_hhamiltm1list" value="2" type="checkbox" class="custom-control-input" id="dacigdasesmenawalmt_hhamiltm1list_2">
                <label class="custom-control-label" for="dacigdasesmenawalmt_hhamiltm1list_2">Muntah</label>
              </div>
            </div>
            <div class="col-md-2 row">
              <div class="row custom-control custom-checkbox custom-control-inline">
                <input name="dacigdasesmenawalmt_hhamiltm1list" value="3" type="checkbox" class="custom-control-input" id="dacigdasesmenawalmt_hhamiltm1list_3">
                <label class="custom-control-label" for="dacigdasesmenawalmt_hhamiltm1list_3">Pendarahan</label>
              </div>
            </div>
            <div class="col-md-2 row">
              <div class="row custom-control custom-checkbox custom-control-inline">
                <input name="dacigdasesmenawalmt_hhamiltm1list" value="4" type="checkbox" class="custom-control-input" id="dacigdasesmenawalmt_hhamiltm1list_4">
                <label class="custom-control-label" for="dacigdasesmenawalmt_hhamiltm1list_4">Lain-Lain</label>
              </div>
            </div>
            <div class="col-md-2 row">
              <div class="row custom-control custom-checkbox custom-control-inline">
                <input name="dacigdasesmenawalmt_hhamiltm1list" value="5" type="checkbox" class="custom-control-input" id="dacigdasesmenawalmt_hhamiltm1list_5">
                <label class="custom-control-label" for="dacigdasesmenawalmt_hhamiltm1list_5">Tidak Ada Keluhan</label>
              </div>
            </div> -->
          </div>
        </div>
        <div class="form-group row" id="dacigdasesmenawalmt_div_hhamiltm1list" style="display:none;">
          <div class="col-md-2"></div>
          <div class="col-md-0">&nbsp;</div>
          <div class="col-md-6">
            <input id="dacigdasesmenawalmt_hhamiltm1listket4" name="dacigdasesmenawalmt_hhamiltm1listket4" type="text" class="form-control" placeholder="Keterangan TM I (Lain-lain)">
          </div>
        </div>

        <div class="form-group row">
          <div class="col-md-2">
            <label class="col-form-label" title="TM II">&nbsp;&nbsp;&nbsp;&nbsp;TM II - III</label>
            <input type="hidden" id="dacigdasesmenawalmt_hhamiltm2Id" value="2375205">
          </div>
          <div class="col-md-9 row" id="divdacigdasesmenawalmt_hhamiltm2list">
            <div class="col-md-4">
              <select class="form-control" id="dacigdasesmenawalmt_hhamiltm2list">                
                <option value="1">Pusing</option>
                <option value="2">Sakit Kepala</option>
                <option value="3">Pendarahan</option>
                <option value="4">Lain-Lain</option>
                <option value="5">Tidak Ada Keluhan</option>
              </select>
            </div>
<!--             <div class="col-md-2 row">
              <div class="row custom-control custom-checkbox custom-control-inline">
                <input name="dacigdasesmenawalmt_hhamiltm2list" value="1" type="checkbox" class="custom-control-input" id="dacigdasesmenawalmt_hhamiltm2list_1">
                <label class="custom-control-label" for="dacigdasesmenawalmt_hhamiltm2list_1">Pusing</label>
              </div>
            </div>
            <div class="col-md-2 row">
              <div class="row custom-control custom-checkbox custom-control-inline">
                <input name="dacigdasesmenawalmt_hhamiltm2list" value="2" type="checkbox" class="custom-control-input" id="dacigdasesmenawalmt_hhamiltm2list_2">
                <label class="custom-control-label" for="dacigdasesmenawalmt_hhamiltm2list_2">Sakit Kepala</label>
              </div>
            </div>
            <div class="col-md-2 row">
              <div class="row custom-control custom-checkbox custom-control-inline">
                <input name="dacigdasesmenawalmt_hhamiltm2list" value="3" type="checkbox" class="custom-control-input" id="dacigdasesmenawalmt_hhamiltm2list_3">
                <label class="custom-control-label" for="dacigdasesmenawalmt_hhamiltm2list_3">Pendarahan</label>
              </div>
            </div>
            <div class="col-md-2 row">
              <div class="row custom-control custom-checkbox custom-control-inline">
                <input name="dacigdasesmenawalmt_hhamiltm2list" value="4" type="checkbox" class="custom-control-input" id="dacigdasesmenawalmt_hhamiltm2list_4">
                <label class="custom-control-label" for="dacigdasesmenawalmt_hhamiltm2list_4">Lain-Lain</label>
              </div>
            </div>
            <div class="col-md-2 row">
              <div class="row custom-control custom-checkbox custom-control-inline">
                <input name="dacigdasesmenawalmt_hhamiltm2list" value="5" type="checkbox" class="custom-control-input" id="dacigdasesmenawalmt_hhamiltm2list_5">
                <label class="custom-control-label" for="dacigdasesmenawalmt_hhamiltm2list_5">Tidak Ada Keluhan</label>
              </div>
            </div> -->
          </div>
        </div>
        <div class="form-group row" id="dacigdasesmenawalmt_div_hhamiltm2list" style="display:none;">
          <div class="col-md-2"></div>
          <div class="col-md-0">&nbsp;</div>
          <div class="col-md-6">
            <input id="dacigdasesmenawalmt_hhamiltm2listket4" name="dacigdasesmenawalmt_hhamiltm2listket4" type="text" class="form-control" placeholder="Keterangan TM II (Lain-lain)">
          </div>
        </div>
      </div>
      <div class="col-md-12" style="padding-bottom: 5px;">
        <div class="form-group row">
          <div class="col-md-2">
            <label class="col-form-label" title="RIWAYAT GINEKOLOGI ">RIWAYAT GINEKOLOGI </label>
            <input type="hidden" id="dacigdasesmenawalmt_hginekologiId" value="2375206">
          </div>
          <div class="col-md-9 row" id="divdacigdasesmenawalmt_hginekologilist">
            <select class="form-control" id="dacigdasesmenawalmt_hginekologilist">
              <option value="1">Infertilitas</option>
              <option value="2">Polip servix</option>
              <option value="3">Tidak ada</option>
              <option value="4">Cervisitis kronis</option>
              <option value="5">Kanker kandungan</option>
              <option value="6">PMS</option>
              <option value="7">Operasi kandungan</option>
              <option value="8">Endometriosis</option>
              <option value="9">Myoma</option>
              <option value="10">Kista</option>
              <option value="11">Lain-Lain</option>
            </select>
           <!--  <div class="col-md-2 row">
              <div class="row custom-control custom-checkbox custom-control-inline">
                <input name="dacigdasesmenawalmt_hginekologilist" value="1" type="checkbox" class="custom-control-input" id="dacigdasesmenawalmt_hginekologilist_1">
                <label class="custom-control-label" for="dacigdasesmenawalmt_hginekologilist_1">Infertilitas</label>
              </div>
            </div>
            <div class="col-md-2 row">
              <div class="row custom-control custom-checkbox custom-control-inline">
                <input name="dacigdasesmenawalmt_hginekologilist" value="2" type="checkbox" class="custom-control-input" id="dacigdasesmenawalmt_hginekologilist_2">
                <label class="custom-control-label" for="dacigdasesmenawalmt_hginekologilist_2">Polip servix</label>
              </div>
            </div>
            <div class="col-md-2 row">
              <div class="row custom-control custom-checkbox custom-control-inline">
                <input name="dacigdasesmenawalmt_hginekologilist" value="3" type="checkbox" class="custom-control-input" id="dacigdasesmenawalmt_hginekologilist_3">
                <label class="custom-control-label" for="dacigdasesmenawalmt_hginekologilist_3">Tidak ada</label>
              </div>
            </div>
            <div class="col-md-2 row">
              <div class="row custom-control custom-checkbox custom-control-inline">
                <input name="dacigdasesmenawalmt_hginekologilist" value="4" type="checkbox" class="custom-control-input" id="dacigdasesmenawalmt_hginekologilist_4">
                <label class="custom-control-label" for="dacigdasesmenawalmt_hginekologilist_4">Cervisitis kronis</label>
              </div>
            </div>
            <div class="col-md-2 row">
              <div class="row custom-control custom-checkbox custom-control-inline">
                <input name="dacigdasesmenawalmt_hginekologilist" value="5" type="checkbox" class="custom-control-input" id="dacigdasesmenawalmt_hginekologilist_5">
                <label class="custom-control-label" for="dacigdasesmenawalmt_hginekologilist_5">Kanker kandungan</label>
              </div>
            </div>
            <div class="col-md-2 row">
              <div class="row custom-control custom-checkbox custom-control-inline">
                <input name="dacigdasesmenawalmt_hginekologilist" value="6" type="checkbox" class="custom-control-input" id="dacigdasesmenawalmt_hginekologilist_6">
                <label class="custom-control-label" for="dacigdasesmenawalmt_hginekologilist_6">PMS</label>
              </div>
            </div>
            <div class="col-md-2 row">
              <div class="row custom-control custom-checkbox custom-control-inline">
                <input name="dacigdasesmenawalmt_hginekologilist" value="7" type="checkbox" class="custom-control-input" id="dacigdasesmenawalmt_hginekologilist_7">
                <label class="custom-control-label" for="dacigdasesmenawalmt_hginekologilist_7">Operasi kandungan</label>
              </div>
            </div>
            <div class="col-md-2 row">
              <div class="row custom-control custom-checkbox custom-control-inline">
                <input name="dacigdasesmenawalmt_hginekologilist" value="8" type="checkbox" class="custom-control-input" id="dacigdasesmenawalmt_hginekologilist_8">
                <label class="custom-control-label" for="dacigdasesmenawalmt_hginekologilist_8">Endometriosis</label>
              </div>
            </div>
            <div class="col-md-2 row">
              <div class="row custom-control custom-checkbox custom-control-inline">
                <input name="dacigdasesmenawalmt_hginekologilist" value="9" type="checkbox" class="custom-control-input" id="dacigdasesmenawalmt_hginekologilist_9">
                <label class="custom-control-label" for="dacigdasesmenawalmt_hginekologilist_9">Myoma</label>
              </div>
            </div>
            <div class="col-md-2 row">
              <div class="row custom-control custom-checkbox custom-control-inline">
                <input name="dacigdasesmenawalmt_hginekologilist" value="10" type="checkbox" class="custom-control-input" id="dacigdasesmenawalmt_hginekologilist_10">
                <label class="custom-control-label" for="dacigdasesmenawalmt_hginekologilist_10">Kista</label>
              </div>
            </div>
            <div class="col-md-2 row">
              <div class="row custom-control custom-checkbox custom-control-inline">
                <input name="dacigdasesmenawalmt_hginekologilist" value="11" type="checkbox" class="custom-control-input" id="dacigdasesmenawalmt_hginekologilist_11">
                <label class="custom-control-label" for="dacigdasesmenawalmt_hginekologilist_11">Lain-Lain</label>
              </div>
            </div> -->
          </div>
        </div>
        <div class="form-group row" id="dacigdasesmenawalmt_div_hginekologilist" style="display:none;">
          <div class="col-md-2"></div>
          <div class="col-md-0">&nbsp;</div>
          <div class="col-md-6">
            <input id="dacigdasesmenawalmt_hginekologilistket11" name="dacigdasesmenawalmt_hginekologilistket11" type="text" class="form-control" placeholder="Ginekologi (Lain-lain)">
          </div>
        </div>
      </div>
    </div>
    <div class="form-group row ">
      <div class="col-md-12">
        <div class="form-group row">
          <div class="col-md-2">
            <label class="col-form-label" title="RIWAYAT KB ">RIWAYAT KB </label>
            <input type="hidden" id="dacigdasesmenawalmt_riwayatkbId" value="2375209">
          </div>
          <div class="col-md-10 row" id="dacigdasesmenawalmt_riwayatkbpilihId">
            <div class="col-md-12 row">
              <div class="row custom-control custom-checkbox custom-control-inline">
                <input name="dacigdasesmenawalmt_riwayatkbpilihId" value="1" type="radio" class="custom-control-input" id="dacigdasesmenawalmt_riwayatkbpilihId_1" onclick="document.getElementById('dacigdasesmenawalmt_div_riwayatkbpilihId').style.display='none'">
                <label class="custom-control-label" for="dacigdasesmenawalmt_riwayatkbpilihId_1">Tidak Menggunakan Keluarga Berencana</label>
              </div>

            </div>
            <div class="col-md-12 row">
              <div class="row custom-control custom-checkbox custom-control-inline">
                <input name="dacigdasesmenawalmt_riwayatkbpilihId" value="2" type="radio" class="custom-control-input" id="dacigdasesmenawalmt_riwayatkbpilihId_2" onclick="document.getElementById('dacigdasesmenawalmt_div_riwayatkbpilihId').style.display='block'">
                <label class="custom-control-label" for="dacigdasesmenawalmt_riwayatkbpilihId_2">Metode KB Yang Terakhir</label>
              </div>
              <div class="row col-md-12" id="dacigdasesmenawalmt_div_riwayatkbpilihId" style="display:none;">
                <div class="col-md-12">
                  <div class="form-group row">
                    <div class="col-md-1"></div>
                    <div class="col-md-1">
                      <label class="col-form-label">Lama</label>
                    </div>
                    <div class="col-md-4">
                      <input id="dacigdasesmenawalmt_riwayatkblama" name="dacigdasesmenawalmt_riwayatkblama" type="text" class="form-control" placeholder="Input lama">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-2"></div>
                    <div class="col-md-9 row" id="divdacigdasesmenawalmt_riwayatkblist">
                      <select class="form-control" id="dacigdasesmenawalmt_riwayatkblist">
                        <option value="1">IUD</option>
                        <option value="2">Implant</option>
                        <option value="3">Pil</option>
                        <option value="4">Suntik</option>
                        <option value="5">Kondom</option>
                        <option value="6">MOW</option>
                        <option value="7">MOP</option>
                        <option value="8">Lain-lain</option>
                      </select>
                    <!--   <div class="col-md-3 row">
                        <div class="row custom-control custom-checkbox custom-control-inline">
                          <input name="dacigdasesmenawalmt_riwayatkblist" value="1" type="checkbox" class="custom-control-input" id="dacigdasesmenawalmt_riwayatkblist_1">
                          <label class="custom-control-label" for="dacigdasesmenawalmt_riwayatkblist_1">IUD</label>
                        </div>
                      </div>
                      <div class="col-md-3 row">
                        <div class="row custom-control custom-checkbox custom-control-inline">
                          <input name="dacigdasesmenawalmt_riwayatkblist" value="2" type="checkbox" class="custom-control-input" id="dacigdasesmenawalmt_riwayatkblist_2">
                          <label class="custom-control-label" for="dacigdasesmenawalmt_riwayatkblist_2">Implant</label>
                        </div>
                      </div>
                      <div class="col-md-3 row">
                        <div class="row custom-control custom-checkbox custom-control-inline">
                          <input name="dacigdasesmenawalmt_riwayatkblist" value="3" type="checkbox" class="custom-control-input" id="dacigdasesmenawalmt_riwayatkblist_3">
                          <label class="custom-control-label" for="dacigdasesmenawalmt_riwayatkblist_3">Pil</label>
                        </div>
                      </div>
                      <div class="col-md-3 row">
                        <div class="row custom-control custom-checkbox custom-control-inline">
                          <input name="dacigdasesmenawalmt_riwayatkblist" value="4" type="checkbox" class="custom-control-input" id="dacigdasesmenawalmt_riwayatkblist_4">
                          <label class="custom-control-label" for="dacigdasesmenawalmt_riwayatkblist_4">Suntik</label>
                        </div>
                      </div>
                      <div class="col-md-3 row">
                        <div class="row custom-control custom-checkbox custom-control-inline">
                          <input name="dacigdasesmenawalmt_riwayatkblist" value="5" type="checkbox" class="custom-control-input" id="dacigdasesmenawalmt_riwayatkblist_5">
                          <label class="custom-control-label" for="dacigdasesmenawalmt_riwayatkblist_5">Kondom</label>
                        </div>
                      </div>
                      <div class="col-md-3 row">
                        <div class="row custom-control custom-checkbox custom-control-inline">
                          <input name="dacigdasesmenawalmt_riwayatkblist" value="6" type="checkbox" class="custom-control-input" id="dacigdasesmenawalmt_riwayatkblist_6">
                          <label class="custom-control-label" for="dacigdasesmenawalmt_riwayatkblist_6">MOW</label>
                        </div>
                      </div>
                      <div class="col-md-3 row">
                        <div class="row custom-control custom-checkbox custom-control-inline">
                          <input name="dacigdasesmenawalmt_riwayatkblist" value="7" type="checkbox" class="custom-control-input" id="dacigdasesmenawalmt_riwayatkblist_7">
                          <label class="custom-control-label" for="dacigdasesmenawalmt_riwayatkblist_7">MOP</label>
                        </div>
                      </div>
                      <div class="col-md-3 row">
                        <div class="row custom-control custom-checkbox custom-control-inline">
                          <input name="dacigdasesmenawalmt_riwayatkblist" value="8" type="checkbox" class="custom-control-input" id="dacigdasesmenawalmt_riwayatkblist_8">
                          <label class="custom-control-label" for="dacigdasesmenawalmt_riwayatkblist_8">Lain-lain</label>
                        </div>
                      </div> -->
                    </div>
                  </div>
                  <div class="form-group row" id="dacigdasesmenawalmt_div_riwayatkblist" style="display:none;">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                      <input id="dacigdasesmenawalmt_riwayatkblistket8" name="dacigdasesmenawalmt_riwayatkblistket8" type="text" class="form-control" placeholder="KB (Lain-lain)">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-1"></div>
                    <div class="col-md-1">
                      <label class="col-form-label">Komplikasi</label>
                    </div>
                    <div class="col-md-10 row" id="divdacigdasesmenawalmt_riwayatkbkomplikasilist">
                      <div class="col-md-12 row">
                        <select class="form-control" id="dacigdasesmenawalmt_riwayatkbkomplikasilist">
                          <option value="1">TAK</option>
                          <option value="2">Perdarahan</option>
                          <option value="3">PID / Radang Panggul</option>
                          <option value="4">Lain - Lain</option>
                        </select>
                      </div>
                  <!--     <div class="col-md-12 row">
                        <div class="row custom-control custom-checkbox custom-control-inline">
                          <input name="dacigdasesmenawalmt_riwayatkbkomplikasilist" value="1" type="checkbox" class="custom-control-input" id="dacigdasesmenawalmt_riwayatkbkomplikasilist_1">
                          <label class="custom-control-label" for="dacigdasesmenawalmt_riwayatkbkomplikasilist_1">TAK</label>
                        </div>
                      </div>
                      <div class="col-md-12 row">
                        <div class="row custom-control custom-checkbox custom-control-inline">
                          <input name="dacigdasesmenawalmt_riwayatkbkomplikasilist" value="2" type="checkbox" class="custom-control-input" id="dacigdasesmenawalmt_riwayatkbkomplikasilist_2">
                          <label class="custom-control-label" for="dacigdasesmenawalmt_riwayatkbkomplikasilist_2">Perdarahan</label>
                        </div>
                      </div>
                      <div class="col-md-12 row">
                        <div class="row custom-control custom-checkbox custom-control-inline">
                          <input name="dacigdasesmenawalmt_riwayatkbkomplikasilist" value="3" type="checkbox" class="custom-control-input" id="dacigdasesmenawalmt_riwayatkbkomplikasilist_3">
                          <label class="custom-control-label" for="dacigdasesmenawalmt_riwayatkbkomplikasilist_3">PID / Radang Panggul</label>
                        </div>
                      </div>
                      <div class="col-md-12 row">
                        <div class="row custom-control custom-checkbox custom-control-inline">
                          <input name="dacigdasesmenawalmt_riwayatkbkomplikasilist" value="4" type="checkbox" class="custom-control-input" id="dacigdasesmenawalmt_riwayatkbkomplikasilist_4">
                          <label class="custom-control-label" for="dacigdasesmenawalmt_riwayatkbkomplikasilist_4">Lain - Lain</label>
                        </div>
                      </div> -->
                    </div>
                  </div>
                  <div class="form-group row" id="dacigdasesmenawalmt_div_riwayatkbkomplikasilist" style="display:none;">
                    <div class="col-md-2">&nbsp;</div>
                    <div class="col-md-4">
                      <input id="dacigdasesmenawalmt_riwayatkbkomplikasilistket4" name="dacigdasesmenawalmt_riwayatkbkomplikasilistket4" type="text" class="form-control" placeholder="Komplikasi Lain-lain">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
<div class="card card-default" id="divskringigizianakIgd" style="display:none;">
  <div class="card-header" style="background-color:black;">
    <h3 class="card-title" style="color:white;">SKRINING GIZI Anak/Bayi</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <div class="card-body">
    <div class="row ">
      <div class="col-md-8">
        <div class="form-group row">
          <div class="col-md-12">
            <!-- <i class="fa fa-angle-right"></i> -->&nbsp; <label class="col-form-label">Apakah pasien tampak kurus :</label>
          </div>
        </div>
        <div class="form-group row" style="padding-bottom: 1px;">
          <div class="col-md-0"> &nbsp;</div>
          <div class="col-md-10">
            <div class="row" id="dacrjasesmenneoanak_egizia">
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dacrjasesmenneoanak_egizia" value="1" type="radio" class="custom-control-input" id="dacrjasesmenneoanak_egizia_1" onclick="dacrjasesmenneoanakex.sethasilgizi();"> <label class="custom-control-label" for="dacrjasesmenneoanak_egizia_1">Tidak</label>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dacrjasesmenneoanak_egizia" value="2" type="radio" class="custom-control-input" id="dacrjasesmenneoanak_egizia_2" onclick="dacrjasesmenneoanakex.sethasilgizi();"> <label class="custom-control-label" for="dacrjasesmenneoanak_egizia_2">Ya</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-12">
            <!-- <i class="fa fa-angle-right"></i> -->&nbsp; <label class="col-form-label">Apakah ada penurunan berat badan
            dalam satu bulan terakhir?</label>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-0"> &nbsp;</div>
          <div class="col-md-11">
            <label class="col-form-label">(Berdasarkan penilaian
              objektif data BB bila ada dan atau penilaian subjektif orang
              tua pasien atau untuk bayi &lt;1 tahun BB tidak naik selama 3
            bulan terakhir)</label>
          </div>
        </div>
        <div class="form-group row" style="padding-bottom: 1px;">
          <div class="col-md-0"> &nbsp;</div>
          <div class="col-md-10">
            <div class="row" id="dacrjasesmenneoanak_egizib">
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dacrjasesmenneoanak_egizib" value="1" type="radio" class="custom-control-input" id="dacrjasesmenneoanak_egizib_1" onclick="dacrjasesmenneoanakex.sethasilgizi();"> <label class="custom-control-label" for="dacrjasesmenneoanak_egizib_1">Tidak</label>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dacrjasesmenneoanak_egizib" value="2" type="radio" class="custom-control-input" id="dacrjasesmenneoanak_egizib_2" onclick="dacrjasesmenneoanakex.sethasilgizi();"> <label class="custom-control-label" for="dacrjasesmenneoanak_egizib_2">Ya</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-md-12">
            <!-- <i class="fa fa-angle-right"></i> -->&nbsp; <label class="col-form-label">Apakah ada salah satu kondisi
            berikut :</label>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-0">  </div>
          <div class="col-md-10">
            <label class="col-form-label"> a. Diare = 5x/hari dan
            atau muntah = 3x/hari dalam seminggu terakhir</label>
          </div>
        </div>
        <div class="form-group row" style="padding-bottom: 1px;">
          <div class="col-md-0"> &nbsp;</div>
          <div class="col-md-10">
            <div class="row" id="dacrjasesmenneoanak_egizic1">
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dacrjasesmenneoanak_egizic1" value="1" type="radio" class="custom-control-input" id="dacrjasesmenneoanak_egizic1_1" onclick="dacrjasesmenneoanakex.sethasilgizi();"> <label class="custom-control-label" for="dacrjasesmenneoanak_egizic1_1">Tidak</label>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dacrjasesmenneoanak_egizic1" value="2" type="radio" class="custom-control-input" id="dacrjasesmenneoanak_egizic1_2" onclick="dacrjasesmenneoanakex.sethasilgizi();"> <label class="custom-control-label" for="dacrjasesmenneoanak_egizic1_2">Ya</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-0">  </div>
          <div class="col-md-10">
            <label class="col-form-label">b. Asupan makan berkurang
            selama seminggu terakhir</label>
          </div>
        </div>
        <div class="form-group row" style="padding-bottom: 1px;">
          <div class="col-md-0"> &nbsp;</div>
          <div class="col-md-10">
            <div class="row" id="dacrjasesmenneoanak_egizic2">
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dacrjasesmenneoanak_egizic2" value="1" type="radio" class="custom-control-input" id="dacrjasesmenneoanak_egizic2_1" onclick="dacrjasesmenneoanakex.sethasilgizi();"> <label class="custom-control-label" for="dacrjasesmenneoanak_egizic2_1">Tidak</label>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dacrjasesmenneoanak_egizic2" value="2" type="radio" class="custom-control-input" id="dacrjasesmenneoanak_egizic2_2" onclick="dacrjasesmenneoanakex.sethasilgizi();"> <label class="custom-control-label" for="dacrjasesmenneoanak_egizic2_2">Ya</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-12">
            <!-- <i class="fa fa-angle-right"></i> -->&nbsp; <label class="col-form-label">Apakah terdapat penyakit atau keadaan yang menyebabkan pasien berisiko mengalami malnutrisi ?</label>
          </div>
        </div>  
        <div class="form-group row" style="padding-bottom: 1px;">
          <div class="col-md-0"> &nbsp;</div>
          <div class="col-md-10">
            <div class="row" id="dacrjasesmenneoanak_egizid">
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dacrjasesmenneoanak_egizid" value="1" type="radio" class="custom-control-input" id="dacrjasesmenneoanak_egizid_1" onclick="dacrjasesmenneoanakex.sethasilgizi();"> <label class="custom-control-label" for="dacrjasesmenneoanak_egizid_1">Tidak</label>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dacrjasesmenneoanak_egizid" value="2" type="radio" class="custom-control-input" id="dacrjasesmenneoanak_egizid_2" onclick="dacrjasesmenneoanakex.sethasilgizi();"> <label class="custom-control-label" for="dacrjasesmenneoanak_egizid_2">Ya</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>                      
      </div>
      <div class="col-md-4">
        <div class="form-group row">
          <div class="col-md-3">
            <b><label class="col-form-label">Total Skor </label></b>
          </div>
          <div class="col-md-5">
            <input type="number" onfocus="this.select();" class="form-control font-weight-bold" name="dacrjasesmenneoanak_egiziskor" id="dacrjasesmenneoanak_egiziskor">
          </div>
        </div>
        <div class="form-group row" style="padding-bottom: 5px;">
          <div class="col-md-12">
            <label class="col-form-label font-italic">* Catatan :
            Skor 0 Risiko Rendah, Skor 1-3 Risiko Sedang, 4-5 Risiko Berat</label>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-3">
            <b><label class="col-form-label font-weight-bold">Hasil Skrining </label></b>
          </div>
          <div class="col-md-8">
            <label class="col-form-label font-weight-bold" id="dacrjasesmenneoanak_lgiziskor">RISIKO RENDAH</label>
          </div>
        </div>
      </div>
    </div>
    <div class="row ">
      <div class="col-md-12 row d-flex justify-content-center">
        <label class="col-form-label font-weight-bold">Daftar
        penyakit / keadaan yang berisiko mengakibatkan malnutrisi</label>
      </div>
      <div class="table-responsive">
        <table class="table table-bordered table-condensed" width="100%">
          <tbody><tr class="">
            <td width="40%">
              <div class="row ">
                <div class="col-md-12">
                  <div class="form-group row">
                    <!-- <i class="fa fa-caret-right"></i> -->&nbsp;&nbsp; (Tersangka)
                    penyakit jantung bawaan
                  </div>
                  <div class="form-group row">
                    <!-- <i class="fa fa-caret-right"></i> -->&nbsp;&nbsp; (Tersangka)
                    HIV
                  </div>
                  <div class="form-group row">
                    <!-- <i class="fa fa-caret-right"></i> -->&nbsp;&nbsp; (Tersangka)
                    kanker
                  </div>
                  <div class="form-group row">
                    <!-- <i class="fa fa-caret-right"></i> -->&nbsp;&nbsp; Penyakit hati
                    kronik
                  </div>
                  <div class="form-group row">
                    <!-- <i class="fa fa-caret-right"></i> -->&nbsp;&nbsp; Kelainan
                    anatomi daerah mulut yang menyebabkan kesulitan makan
                    (misal : bibir sumbing)
                  </div>
                </div>
              </div>

            </td>
            <td width="30%" style="padding: 1;">
              <div class="row ">
                <div class="col-md-12">
                  <div class="form-group row">
                    <!-- <i class="fa fa-caret-right"></i> -->&nbsp;&nbsp; Diare kronik
                  </div>
                  <div class="form-group row">
                    <!-- <i class="fa fa-caret-right"></i> -->&nbsp;&nbsp; TB paru
                  </div>
                  <div class="form-group row">
                    <!-- <i class="fa fa-caret-right"></i> -->&nbsp;&nbsp; Luka bakar
                    luas
                  </div>
                  <div class="form-group row">
                    <!-- <i class="fa fa-caret-right"></i> -->&nbsp;&nbsp; Terpasang
                    stoma
                  </div>
                  <div class="form-group row">
                    <!-- <i class="fa fa-caret-right"></i> -->&nbsp;&nbsp; Trauma
                  </div>
                </div>
              </div>
            </td>
            <td width="30%" style="padding: 1;">
              <div class="row ">
                <div class="col-md-12">
                  <div class="form-group row">
                    <!-- <i class="fa fa-caret-right"></i> -->&nbsp;&nbsp; Retardasi
                    mental
                  </div>
                  <div class="form-group row">
                    <!-- <i class="fa fa-caret-right"></i> -->&nbsp;&nbsp; Keterlambatan
                    perkembangan
                  </div>
                  <div class="form-group row">
                    <!-- <i class="fa fa-caret-right"></i> -->&nbsp;&nbsp; Rencana /
                    paska pembedahan mayor
                  </div>
                  <div class="form-group row">
                    <!-- <i class="fa fa-caret-right"></i> -->&nbsp;&nbsp; Lain-lain
                    sesuai pertimbangan dokter
                  </div>
                  <div class="form-group row">
                   <!-- <i class="fa fa-caret-right"></i> -->&nbsp;&nbsp; Kelainan
                   metabolic bawaan
                 </div>
               </div>
             </div>
           </td>
         </tr>
       </tbody></table>
     </div>
   </div>
 </div>
</div>
<div class="card card-default" id="divskrininggizidewasaIgd">
  <div class="card-header" style="background-color:black;">
    <h3 class="card-title" style="color:white;">SKRINING GIZI</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-6">
        <label class="form-label"> > Apakah ada penurunan berat badan tidak direncanakan dalam 6 bulan terakhir</label>
        <select class="form-control form-control-xs" id="ermrwjkeperawatanbbturun">
          <option value="1">Tidak</option>
          <option value="2">Tidak Yakin</option>
        </select>
        <div>
          <select class="form-control form-control-xs" id="ermrwjkeperawatanbbturunkg" onchange="assesmengiziigd()" >
            <option value="0">BB tidak Turun</option>
            <option value="1">1 - 5 Kg (1)</option>
            <option value="2">6 - 10 Kg (2)</option>
            <option value="3">11 - 15 Kg (3)</option>
            <option value="4">> 15 Kg (4)</option>
          </select>
        </div>
        <label class="form-label"> > Apakah asupan makan berkurang karena penurunan nafsu makan/ kesulitan menerima makanan</label>
        <select class="form-control form-control-xs" id="ermrwjkeperawatanpenurunanmakan">
          <option>Tidak</option>
          <option>Ya</option>
        </select>
      </div>
      <div class="col-md-6">
        <label class="form-label">Total Skor</label>
        <input type="text" name="ermrwjkeperawatantotalskor" id="ermrwjkeperawatantotalskor" class="form-control form-control-xs" value="0">
        <label>Saran/Tindakan</label>
        <input type="text" class="form-control form-control-xs" name="ermrwjkeperawatansaran" id="ermrwjkeperawatansaran">
        <label class="form-label">Catatan : Skor 0 risiko rendah, Skor 1 risiko sedang, Skor = 2 risiko tinggi konsultasikan ahli gizi atau Bila terdapat kondisi seperti DM, luka bakar, CKD, hiperlipidemia atau kondisi khusus lainnya berdasarkan pertimbangan dokter, maka konsultasikan ke ahli gizi</label>
      </div>
    </div>
  </div><!-- end card body -->
</div>
<div class="card card-default">
  <div class="card-header" style="background-color:black;">
    <h3 class="card-title" style="color:white;">STATUS FUNGSIONAL *</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <div class="card-body">
    <input type="radio" name="ermrwjkeperawatanfungsional" id="ermrwjkeperawatanfungsional1" value="1" checked='true'>&nbsp;<label class="form-label">Mandiri</label>
    <input type="radio" name="ermrwjkeperawatanfungsional" id="ermrwjkeperawatanfungsional2" value="2">&nbsp;<label class="form-label">Perlu bantuan</label>
    <input type="radio" name="ermrwjkeperawatanfungsional" id="ermrwjkeperawatanfungsional3" value="3">&nbsp;<label class="form-label">Ketergantungan total</label>
  </div>
</div>
<div class="card card-default">
  <div class="card-header" style="background-color:black;">
    <h3 class="card-title" style="color:white;">SKRINING RISIKO CEDERA/ JATUH (Usia <13 - >60 Tahun) menggunakan Up and Go Test (Pasien ini berumur 69 Tahun) *</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <div>
            <label class="form-label">a. Perhatikan cara berjalan pasien saat akan duduk dikursi, apakah pasien tampak tidak seimbang (sempoyongan/ limbung)</label>
            <input type="radio" name="ermrwjkeperawatankeseimbangan" id="ermrwjkeperawatankeseimbangan1" checked="true" value="1">&nbsp;<label> Tidak</label>&nbsp;&nbsp;<input type="radio" name="ermrwjkeperawatankeseimbangan" id="ermrwjkeperawatankeseimbangan2" value="2">&nbsp;<label> Ya</label> 
          </div>
          <div>
            <label class="form-label">b. Apakah pasien memegang pinggiran kursi atau meja atau benda lain sebagai penopang saat akan duduk</label>
            <input type="radio" name="ermrwjkeperawatanpenopang" id="ermrwjkeperawatanpenopang1" value="1" checked="true">&nbsp;<label> Tidak</label>&nbsp;&nbsp;<input type="radio" name="ermrwjkeperawatanpenopang" id="ermrwjkeperawatanpenopang2" value="2">&nbsp;<label> Ya</label>
          </div>
        </div>
        <div class="col-md-6">
          <div>
            <label class="form-label">Hasil</label>
            <input type="radio" name="ermrwjkeperawatanhasilskrining" id="ermrwjkeperawatanhasilskrining1" value="1" checked="true">
            <label class="form-label">Tidak Berisiko</label>&nbsp;
            <input type="radio" name="ermrwjkeperawatanhasilskrining" id="ermrwjkeperawatanhasilskrining2" value="2">
            <label class="form-label">Risiko Rendah</label>&nbsp;
            <input type="radio" name="ermrwjkeperawatanhasilskrining" id="ermrwjkeperawatanhasilskrining3" value="3">
            <label class="form-label">Risiko Tinggi</label>&nbsp;
          </div>
          <div>
            <label class="form-label">Keterangan</label>
            <input class="form-control form-control-xs" type="text" name="ermrwjkeperawatanhasilkesimpulan" id="ermrwjkeperawatanhasilkesimpulan"></div>
            <div>               
              <label class="form-label">Catatan : Tidak berisiko (tidak ditemukan a dan b), Risiko rendah (ditemukan a/ b), Risiko tinggi (a dan b ditemukan)</label>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card card-default">
      <div class="card-header" style="background-color:black;">
        <h3 class="card-title" style="color:white;">ASPEK PENGKAJIAN NYERI  (Pasien ini berumur 69 Tahun)</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">         
            <label class="form-label">WONG BAKER FACE SCALE AND NUMERIC PAIN RATING SCALE (Pasien > 6 tahun)</label>
          </div>
          <div class="col-md-2" style="text-align: center;">
            <div >
              <img src="<?= base_url('_assets/nyeri0.png') ?>" style="width: 100px;height: 100px;">
            </div>
            <div >
              <label class="form-label">Tidak Nyeri</label>
            </div>
          </div>
          <div class="col-md-2" style="text-align: center;">
            <div>  
              <img src="<?= base_url('_assets/nyeri2.png') ?>" style="width: 100px;height: 100px;">
            </div>
            <div>
              <label class="form-label">Sedikit Nyeri</label>
            </div>
          </div>
          <div class="col-md-2" style="text-align: center;">
            <div>  
              <img src="<?= base_url('_assets/nyeri4.png') ?>" style="width: 100px;height: 100px;">
            </div>
            <div>
              <label class="form-label">Sedikit Lebih Nyeri</label>
            </div>
          </div>
          <div class="col-md-2" style="text-align: center;">
            <div>  
              <img src="<?= base_url('_assets/nyeri6.png') ?>" style="width: 100px;height: 100px;">
            </div>
            <div>
              <label class="form-label">Lebih Nyeri</label>
            </div>
          </div>
          <div class="col-md-2" style="text-align: center;">
            <div>  
              <img src="<?= base_url('_assets/nyeri8.png') ?>" style="width: 100px;height: 100px;">
            </div>
            <div>
              <label class="form-label">Sangat Nyeri</label>
            </div>
          </div>
          <div class="col-md-2" style="text-align: center;">
            <div>  
              <img src="<?= base_url('_assets/nyeri10.png') ?>" style="width: 100px;height: 100px;">
            </div>
            <div>
              <label class="form-label">Nyeri Sangat Hebat</label>
            </div>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorface" id="ermrwjkeperawatanskorface" value="0" checked='true'><label>0</label></div>
          <div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorface1" id="ermrwjkeperawatanskorface1" value="1"><label>1</label></div>
          <div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorface2" id="ermrwjkeperawatanskorface2" value="2"><label>2</label></div>
          <div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorface3" id="ermrwjkeperawatanskorface3" value="3"><label>3</label></div>
          <div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorface4" id="ermrwjkeperawatanskorface4" value="4"><label>4</label></div>
          <div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorface5" id="ermrwjkeperawatanskorface5" value="5"><label>5</label></div>
          <div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorface6" id="ermrwjkeperawatanskorface6" value="6"><label>6</label></div>
          <div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorface7" id="ermrwjkeperawatanskorface7" value="7"><label>7</label></div>
          <div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorface8" id="ermrwjkeperawatanskorface8" value="8"><label>8</label></div>
          <div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorface9" id="ermrwjkeperawatanskorface9" value="9"><label>9</label></div>
          <div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorface10" id="ermrwjkeperawatanskorface10" value="10"><label>10</label></div>
          <div class="col-md-1"></div>



        </div>
      </div>
    </div>
    <div class="card card-default">
      <div class="card-header" style="background-color:black;">
        <h3 class="card-title" style="color:white;">KEBUTUHAN KOMUNIKASI/PENDIDIKAN DAN PENGAJARAN *</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="row">     
          <div class="col-md-2">
            <div>  
              <label class="form-label">Bicara</label>
            </div>
            <div>  
              <label class="form-label">Perlu Penerjemah</label>
            </div>
            <div>  
              <label class="form-label">Bahasa Isyarat</label>
            </div>
          </div>
          <div class="col-md-2">
            <div>                          
              <input type="radio" name="KebKomBicaraasskepigd" onclick="document.getElementById('DivPenjelasasskepigd').style.display='none'" id="KebKomBicaraasskepigd1" value="1" id="Penerjemahasskepigd1" checked='true'>
              <label>Normal</label>
            </div>
            <div>                          
              <input type="radio" name="Penerjemahasskepigd" id="Penerjemahasskepigd1" value="1" checked='true'>
              <label>Tidak</label>
            </div>
            <div>                          
              <input type="radio" name="Isyaratasskepigd" id="Isyaratasskepigd1" value="1" checked='true'>
              <label>Tidak</label>
            </div>
          </div>
          <div class="col-md-2">
            <div>
              <input type="radio" name="KebKomBicaraasskepigd" id="KebKomBicaraasskepigd2" onclick="KebKomBicaraasskepigd()" value="2">
              <label>Gangguan bicara, Jelaskan</label>
              <div id="DivPenjelasasskepigd" style="display:none;">
                <input type="text" name="Penjelasasskepigd" id="Penjelasasskepigd">
              </div>
            </div>
            <div>
              <input type="radio" name="Penerjemahasskepigd" id="Penerjemahasskepigd2" value="2">
              <label>Ya, Bahasa</label>
            </div>
            <div>
              <input type="radio" name="Isyaratasskepigd" id="Isyaratasskepigd2" value="2">
              <label>Ya</label>
            </div>
          </div>
          <div class="col-md-2">
            <div>
              <label class="form-label">Hambatan Belajar</label>
            </div>
          </div>
          <div class="col-md-2">
            <div>
              <input type="radio" name="HamBelajarasskepigd" id="HamBelajarasskepigd1" value="1" checked='true'> 
              <label>Tidak</label>
            </div>

          </div>
          <div class="col-md-2">
            <div>
              <input type="radio" name="HamBelajarasskepigd" id="HamBelajarasskepigd2" value="2">
              <label>Ya</label>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="card card-default">
      <div class="card-header" style="background-color:black;">
        <h3 class="card-title" style="color:white;">INPUT KEGIATAN*</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <h5>Kegiatan</h5>                      
            <select id="rlkegiatanIGD" class="form-control">
            </select>
          </div> 
        </div>
      </div>
    </div>

    <div class="card card-default">
      <div class="card-header" style="background-color:black;">
        <h3 class="card-title" style="color:white;">DAFTAR DIAGNOSA KEPERAWATAN & INTERVENSI KEPERAWATAN *</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <h5>Intervensi Keperawatan</h5>                      
            <textarea class="form-control" id="intervensiasskepigd"></textarea>
            <div id="Divintervensiasskepigd" style="position:relative;"></div>
          </div> 
          <div class="col-md-12">   
            <h5>Diagnosa Keperawatan</h5>                  
            <textarea class="form-control" id="Diagnosaasskepigd"></textarea>
            <div id="DivDiagnosaasskepigd"></div>
          </div>
          <div class="col-md-12">
            <button class="btn btn-primary" onclick="tampilKomunikasiPengajaranKepigd()">Diagnosa Perawat</button>
          </div>
          <div class="col-md-12" style="padding-top: 20px;">
            <div class="card" style="width: 500px;height: 500px;border-collapse: !important;">
             <label>Tanda tangan</label> 
             <div id="paint_ttdperawat"></div>
           </div>

         </div>
         <button onclick="showttdperawat();" class="btn btn-warning">Edit</button>
       </div>

     </div>
   </div>

   <button onclick="simpanAssesmenKeperawatanIgd()" class="btn btn-primary" >Simpan</button>
 </div>
 <!-- ///// -->

 <div class="tab-pane p-1 fade" id="historykunjunganTriageIgd" role="tabpanel">
  <h6 class="lead mb-0"><u></u></h6>
  <div class="row">
    <div class="col-md-2" style="padding-top: 2px;">
      <select class="form-control form-control-xs">
        <option value=""> - Record Data - </option>
        <option value="10">10</option>
        <option value="20">20</option>
        <option value="30">30</option>
        <option value="40">40</option>
        <option value="50">50</option>
      </select>
    </div>
    <div class="col-md-12" style="padding-top: 10px;">
     <div id='listhistorirmkunjunganermigd'>

      <!-- akhir div id -->
    </div>
  </div>

</div>
</div>
<div class="tab-pane p-1 fade active show" id="treaseigd" role="tabpanel">
  <div class="card">
   <div class="card-body">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group row">
          <div class="col-md-3">
            <label class="col-form-label">ID</label>
          </div>
          <div class="col-md-2">
            <input id="dactriage_id" name="id" type="text" class="form-control" readonly="readonly">
            <input id="dactriage_status" name="statusid" type="number" class="form-control" hidden="true">                
          </div>
          <div class="col-md-1 d-none" id="dactriage_divbtn">
            <button id="dactriage_btmap" type="button" class="btn btn-sm btn-primary btn-block" title="Mapping Triage Pasien">
              <!-- <i class="fa fa-users" aria-hidden="true"></i> -->
            </button>
          </div>
          <div class="col-md-6">
            <b><i><label class="col-form-label">Note : Yang bertanda Bintang (*) wajib di isi ! </label></i></b>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-3">
            <label class="col-form-label">Tanggal Masuk IGD</label>
          </div>
          <div class="col-md-4">
            <div class="input-group date" id="dactriage_adtgl1" data-target-input="nearest">
              <input id="dactriage_atgl" name="dactriage_atgl
              " type="date" class="form-control datetimepicker-input" data-target="#dactriage_adtgl1" data-toggle="datetimepicker" value="<?php echo date('Y-m-d');?>">

            </div>
          </div>
        </div>
        <div class="form-group row">  
          <div class="col-md-3">
            <label class="col-form-label">Jam Datang</label>
          </div>
          <div class="col-md-3">
            <div class="input-group date" id="dactriage_dajammasuk" data-target-input="nearest">
              <input  name="ajammasuk" id="ajammasuk" type="time" class="form-control datetimepicker-input" data-target="#dactriage_dajammasuk" data-toggle="datetimepicker" min="00:00" max="23:59" required>

            </div>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-3">
            <label class="col-form-label">Jam Periksa</label>
          </div>
          <div class="col-md-3">
            <div class="input-group date" id="dactriage_dajamperiksa" data-target-input="nearest">
              <input id="ajamperiksa" name="ajamperiksa" type="time" class="form-control datetimepicker-input" data-target="#dactriage_dajamperiksa" data-toggle="datetimepicker">

            </div>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-3">
            <label class="col-form-label">Informasi Didapat Dari</label>
          </div>
          <div class="col-md-3">
            <select id="selectinfotreage" onclick="selectinfotreage()" class="form-control form-control-xs">
              <option value="1" >Auto Anamnesa</option>
              <option value="2" >Hetero Anamnesa</option>
            </select>
          </div>
          <div id="divinformasitreage" style="display: none;">
            <input type="text" name="namawalitreage" id="namawalitreage" class="form-control form-control-xs" placeholder="nama">
            <input type="text" name="hubwalitrage" id="hubwalitrage" class="form-control form-control-xs" placeholder="hubungan dg pasien">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-3">
            <label class="col-form-label">Status Kecelekaan</label>
          </div>
          <div class="col-md-3">
            <label>Kecelakaan</label>
            <select id="selectkecelakaantreage" onclick="selectkecelakaantreage()" class="form-control form-control-xs">
              <option value="1" >Bukan Kecelakaan</option>
              <option value="2" >Kecelakaan</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <div id="divkecelakaantreage" style="display: none;" class="col-md-6">
            <select class="form-control form-control-xs" id="selectjenislakatreage">
              <option value="1">Kecelakaan Lalu Lintas & Bukan Kecelakaan Kerja</option>
              <option value="2">Kecelakaan Lalu Lintas & Kecelakaan Kerja</option>
              <option value="3">Kecelakaan Kerja</option>
            </select>
            <div class="col-md-6">                      
              <label>Tanggal Kecelakaan</label>
              <input type="date" name="tglkecelakaantreage" id="tglkecelakaantreage"  value="<?php echo date('Y-m-d');?>" class="form-control form-control-xs">
            </div>
            <div class="col-md-6"> 
              <label>Tempat Kejadian</label>
              <input type="text" name="tempatkejadiaantreage" id="tempatkejadiaantreage" class="form-control form-control-xs">
            </div>
            <div class="col-md-3">
              <label>Pengatar Pasien</label>
              <input type="text" name="pengatarpasientreage" id="pengatarpasientreage" class="form-control form-control-xs">
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 ">
        <div class="form-group row">
          <div class="col-md-3">
            <label class="col-form-label">Petugas</label>
          </div>
          <div class="col-md-7">
            <div class="input-group">
              <select name="jnspjId" id="dactriage_jnsapjId" class="form-control" >
                <option value="1">Perawat / Bidan</option>
                <option value="2">Dokter</option>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group row" id="dactriage_divpj1">
          <div class="col-md-3">
            <label class="col-form-label">Perawat/Bidan *</label>
          </div>
          <div class="col-md-7">
            <select id="dactriage_apjId" name="apjId" class="form-control select2-hidden-accessible" data-select2-id="dactriage_apjId" tabindex="-1" aria-hidden="true" disabled="disabled">
              <option value="250" selected="" data-select2-id="3">IKE YULIYA, SST</option>
            </select>
          </div>
          <div class="col-md-1">
            <button id="dactriage_btpjdef" class="btn btn-warning d-none" type="button" title="Default PJ">
              &nbsp;&nbsp;
            </button>
          </div>
        </div>
        <div class="form-group row" id="dactriage_divpj2" style="display: none;">
          <div class="col-md-3">
            <label class="col-form-label">Dokter *</label>
          </div>
          <div class="col-md-7">
            <select id="dactriage_apj2Id" name="apjId" class="form-control select2-hidden-accessible" data-select2-id="dactriage_apj2Id" tabindex="-1" aria-hidden="true" disabled="disabled">
              <option value="29" selected="" data-select2-id="5">dr. AHMAD FIRMAN</option>
            </select>
          </div>
          <div class="col-md-1">
            <button id="dactriage_btpj2def" class="btn btn-warning d-none" type="button" title="Default PJ">
              &nbsp;&nbsp;
            </button>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-3">
            <label class="col-form-label">Cara Masuk</label>
          </div>
          <div class="col-md-7">
            <div class="input-group">
              <select name="dactriage_bmasuk" id="dactriage_bmasuk" class="form-control">
                <option value="1">Jalan tanpa bantuan</option>
                <option value="2">Jalan dengan bantuan</option>
                <option value="3">Kursi Roda</option>
                <option value="4">Tempat tidur dorong</option>
                <option value="5">Lainnya</option>
              </select>
            </div>
            <div class="row" id="dactriage_div_bmasuk" style="display:none;">
              <input type="text" name="dactriage_bmasuklain" id="dactriage_bmasuklain" maxlength="30" class="form-control" placeholder="Keterangan Lainnya *">
            </div>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-3">
            <label class="col-form-label">Asal Masuk</label>
          </div>
          <div class="col-md-3">
            <select id="selectrujukantreage" class="form-control form-control-xs">
              <option value="1"  onclick="document.getElementById('rujukandaritreage').style.display='none'">Non Rujukan</option>
              <option value="2" onclick="document.getElementById('rujukandaritreage').style.display='block'">Rujukan</option>
            </select>
          </div>
          <div id="divrujukandaritreage" style="display: none;">
            <input type="text" name="rujukandaritreage" id="rujukandaritreage">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-3">
            <label class="col-form-label">Death On Arrival</label>
          </div>
          <div class="col-md-3">
            <select id="doatreage" class="form-control form-control-xs">
              <option value="0">
                Tidak
              </option>
              <option value="1">Ya</option>
            </select>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<h6 class="lead mb-0"><u>Trease IGD</u></h6>
<div class="card card-default">
  <div class="card-header" style="background-color:black;">
    <h3 class="card-title" style="color:white;">ANAMNESIS</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <div class="row">
      <div class="col-md-4 p2">
        <label class="form-label">Keluhan Utama</label>
      </div>
      <div class="col-md-8 p2">
        <textarea class="form-control " id="Treagekeluhan"></textarea>
        <!-- /.form-group -->
      </div>
      <!-- /.col -->
      <div class="col-md-4 p2">
        <label class="form-label">Riwayat Penyakit Sekarang *</label>&nbsp;&nbsp;&nbsp;<label><span class="badge bg-primary rounded-pill" onclick="penyakitsekarangtreageigd()" title="autocomplete">auto</span></label>&nbsp;<label><span class="badge bg-primary rounded-pill" onclick="showmodaltambahpenyakitsekarangtreageigd()" title="tambah icd">Tambah</span></label>
      </div>
      <div class="col-md-8 p2">
        <textarea class="form-control " id="TreageRiwayatPenyakitNowErmIgd"></textarea>
        <div id="DivtreaseRiwayatPenyakitSekarang"></div>
        <!-- /.form-group -->
      </div>
      <!-- /.col --> 

      <div class="col-md-12 pt-4" style="border: solid;overflow-y: scroll;padding-top: 2px" >
        <label class="form-label">Riwayat Penyakit dahulu</label>&nbsp;&nbsp;&nbsp;<label><span class="badge bg-primary rounded-pill" onclick="showmodaltambahpenyakitsekarangtreageigd()" title="tambah icd">Tambah</span></label>
        <table   class="table table-striped table-sm">
          <thead>
            <tr>
              <th style="width: 15px">#</th>
              <th style="width: 80px">ICD 10</th>
              <th>Penyakit</th>
              <th style="width: 80px">Tanggal</th>
            </tr>
          </thead>
          <tbody id="bodyhistoripenyakittreageigd"></tbody>
        </table>
      </div>

      <div class="col-md-12 pt-4" style="border: solid;overflow-y: scroll;padding-top: 2px" >
        <label class="form-label">Riwayat Penyakit dahulu</label>&nbsp;&nbsp;&nbsp;<label><span class="badge bg-primary rounded-pill" onclick="showmodaltambahpenyakitkeltreageigd()" title="tambah icd">Tambah</span></label>
        <table   class="table table-striped table-sm">
          <thead>
            <tr>
              <th style="width: 15px">#</th>
              <th style="width: 80px">ICD 10</th>
              <th>Penyakit</th>
              <th style="width: 80px">Tanggal</th>
            </tr>
          </thead>
          <tbody id="bodyhistoripenyakitkeltreageigd"></tbody>
        </table>
      </div>

      <div class="col-md-12 pt-4" style="border: solid;overflow-y: scroll;padding-top: 2px;">
        <label class="form-label">Riwayat Pengobatan/Operasi</label>&nbsp;&nbsp;&nbsp;<label><span class="badge bg-primary rounded-pill" onclick="showmodaltambahpenyakitsekarangtreageigd()" title="tambah icd">Tambah</span></label>
        <table   class="table table-striped table-sm">
          <thead>
            <tr>
              <th style="width: 15px">#</th>
              <th>Penyakit</th>
              <th style="width: 80px">ICD 10</th>
              <th style="width: 80px">Tanggal</th>
            </tr>
          </thead>
          <tbody id="bodyhistoriobattrageigd"></tbody>
        </table>
      </div>
      <div class="col-md-12 pt-4" style="border: solid;overflow-y: scroll;padding-top: 2px;">
        <label class="form-label">Alergi</label>&nbsp;&nbsp;&nbsp;<label><span class="badge bg-primary rounded-pill" onclick="showmodaltambahalergitreageigd()" title="tambah icd">Tambah</span></label>
        <table   class="table table-striped table-sm">
          <thead>
            <tr>
              <th style="width: 15px">#</th>
              <th>Alergi</th>
            </tr>
          </thead>
          <tbody id="bodyhistorialergitrageigd"></tbody>
        </table>
      </div>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.card-body -->
</div>

<div class="card card-default">
  <div class="card-header" style="background-color:black;">
    <h3 class="card-title" style="color:white;">TANDA VITAL</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <div class="row">
      <div class="col-md-4">
        <table class="table-sm">
          <tr>
            <td>
              <label>Keadaan Umum</label>
            </td>
            <td>
              <select class="form-control form-control-xs" id="KeadaanUmumTriageIgd">
                <option value="1">Baik</option>
                <option value="2">Sedang</option>
                <option value="3">Berat</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>
              <label>Respirasi</label>
            </td>
            <td>
              <div class="input-group">
                <input type="text" class="form-control form-control-xs" id="respirasiTriageIgd">
                <div class="input-group-prepend">
                  <span>x/Menit</span>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <label>Nadi</label>
            </td>
            <td>
              <div class="input-group">
                <input type="text" class="form-control form-control-xs" id="nadiTriageIgd">
                <div class="input-group-prepend">
                  <span>x/Menit</span>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <label>SpO2</label>
            </td>
            <td>
              <div class="input-group">
                <input type="text" class="form-control form-control-xs" id="Spo2TriageIgd">
                <div class="input-group-prepend">
                  <span>%</span>
                </div>
              </div>
            </td>
          </tr>
        </table>
      </div>
      <div class="col-md-4">
        <table>
          <tr>
            <td>
              <label>Pupil</label>
            </td>
            <td>
              <div class="input-group" >
                <div class="input-group-prepend">
                  <span >kiri </span>
                </div>
                <input type="number" class="form-control form-control-xs" id="pupilkiriTriageIgd">
                <div class="input-group-prepend">
                  <span >kanan </span>
                </div>
                <input type="number" class="form-control form-control-xs" id="pupilkananTriageIgd">
                <div class="input-group-prepend">
                  <span>mm</span>
                </div>
              </div>

            </td>
          </tr>
          <tr>
            <td>
              <label>Tekanan Darah</label>
            </td>
            <td>
              <div class="input-group">
                <input type="number" class="form-control form-control-xs" id="tekananDarahTriageIgd1"><h3>/</h3>
                <input type="number" class="form-control form-control-xs" id="tekananDarahTriageIgd2">
                <div class="input-group-prepend">
                  <span>mmHg</span>
                </div>
              </div>
              <div class="input-group">
                <input type="text" placeholder="Diisi jika Palpasi" class="form-control form-control-xs" id="palpasiTriageIgd" >
                <div class="input-group-prepend">
                  <span>Per palpasi</span>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <label>Suhu</label>
            </td>
            <td>
              <div class="input-group">
                <input type="text" class="form-control form-control-xs" id="suhuTriageIgd" >
                <div class="input-group-prepend">
                  <span >C</span>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <label>Reflek Cahaya</label>
            </td>
            <td>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span >kiri</span>
                </div>
                <select class="form-control form-control-xs" id="reflekCahayaKiriTriageIgd" >
                  <option value="1">-</option>
                  <option value="2">+</option>
                </select>
                <div class="input-group-prepend">
                  <span >kanan</span>
                </div>
                <select class="form-control form-control-xs" id="reflekCahayaKananTriageIgd">
                  <option value="1">-</option>
                  <option value="2">+</option>
                </select>
              </div>
            </td>
          </tr>
        </table>
      </div>
      <div class="col-md-4">
        <table class="table-sm">
          <tr>
            <td colspan="2">
              <h6>Note (*) Nominal ribuan = gram, satuan / puluhan / ratusan = kg</h6>
            </td>
          </tr>
          <tr>
            <td>
              <label>Berat Badan</label>
            </td>
            <td>
              <div class="input-group">
                <input type="number" id="bbTriageIgd" class="form-control form-control-xs">
                <div class="input-group-prepend">
                  <span>Kg / Gram</span>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <label>Tinggi Badan</label>
            </td>
            <td>
              <div class="input-group">
                <input type="number" class="form-control form-control-xs" onclick="hitungimttreageigd()" onclick="hitungimttreageigd()" id="tinggiTriageIgd" >
                <div class="input-group-prepend">
                  <span>cm</span>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <label>IMT</label>
            </td>
            <td>
              <div class="input-group">
                <input type="number" class="form-control form-control-xs" id="imtTriageIgd" >
                <div class="input-group-prepend">
                  <span>kg/m2</span>
                </div>
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="row "><br>
      <div class="col-md-12">
        <table class="table table-bordered table-sm">
          <thead>
          </thead>
          <tbody>                            
            <tr>
              <td colspan="4" style="text-align: center;">
                <label class="form-label">Glasgow Coma Scale ( GCS )</label>
              </td>
            </tr>
            <tr>
              <td colspan="2">
                Kategori
              </td>
              <td>  
                Skor
              </td>
              <td>
                Hasil Skor
              </td>
            </tr>
            <tr >
              <td rowspan="4">
                Respon Buka Mata (Eye Opening : E)
              </td>
              <td onclick="dacrjtrease_setScore(4, 1)">
               Spontan
             </td>
             <td>
              4
            </td>
            <td rowspan="4">
              <input type="text" name="eyeOpenTriageIgd" id="eyeOpenTriageIgd" class="form-control" value="4">
            </td>
          </tr>
          <tr >
           <td onclick="dacrjtrease_setScore(3, 1)">
             Terhadap Suara
           </td>
           <td>
            3
          </td>
        </tr>
        <tr>
         <td onclick="dacrjtrease_setScore(2, 1)">
          Terhadap Nyeri
        </td>
        <td>
          2
        </td>
      </tr>
      <tr>
       <td onclick="dacrjtrease_setScore(1, 1)">
         Tidak ada
       </td>
       <td>
        1
      </td>
    </tr>
    <tr>
      <td rowspan="6">
        Respon Motorik Terbaik (M)
      </td>
      <td onclick="dacrjtrease_setScore(6, 2)">
       Turut Perintah
     </td>
     <td>
      6
    </td>
    <td rowspan="6">
      <input type="text" name="ResponMotorikTriageIgd" id="ResponMotorikTriageIgd" class="form-control" value="6">
    </td>
  </tr>
  <tr>
   <td onclick="dacrjtrease_setScore(5, 2)">
     Melokalisir Nyeri
   </td>
   <td>
    5
  </td>
</tr>
<tr>
 <td onclick="dacrjtrease_setScore(4, 2)">
   Fleksi Normal (Menarik anggota gerak yang dirangsang)
 </td>
 <td>
  4
</td>
</tr>
<tr>
 <td onclick="dacrjtrease_setScore(3, 2)">
   Fleksi Abnormal (dekortikasi)
 </td>
 <td>
  3
</td>
</tr>
<tr>
 <td onclick="dacrjtrease_setScore(2, 2)">
   Ekstensi Abnormal (deserebrasi)
 </td>
 <td>
  2
</td>
</tr>
<tr>
 <td onclick="dacrjtrease_setScore(1, 2)">
  Tidak Ada (Flasid)
</td>
<td>
  1
</td>
</tr>
<tr>
  <td rowspan="5">
    Respon Verbal (V)
  </td>
  <td onclick="dacrjtrease_setScore(5, 3)">
   Berorientasi Baik
 </td>
 <td>
  5
</td>
<td rowspan="5">
  <input type="text" name="responVerbalTriageIgd" id="responVerbalTriageIgd" class="form-control" value="5">
</td>
</tr>
<tr>
 <td onclick="dacrjtrease_setScore(4, 3)">
  Berbicara mengacau (bingung)

</td>
<td>
  4
</td>
</tr>
<tr>
 <td onclick="dacrjtrease_setScore(3, 3)">
  Kata-Kata tidak teratur
</td>
<td>
  3
</td>
</tr>
<tr>
 <td onclick="dacrjtrease_setScore(2, 3)">
   Suara Tidak Jelas
 </td>
 <td>
  2
</td>
</tr>
<tr>
 <td onclick="dacrjtrease_setScore(1, 3)">
   Tidak Ada
 </td>
 <td>
  1
</td>
</tr>
<tr>
  <td colspan="3">
    <select class="form-control" id="tipekesadarantriage">
      <option value="1">Compos mentis</option>
      <option value="2">Apatis</option>
      <option value="3">Somnolen</option>
      <option value="4">Delirium</option>
      <option value="5">Sopor</option>
      <option value="6">Coma</option>
    </select>
  </td>
  <td>
    <input type="text" class="form-control" name="dacrjasesmentrege_bgcstot" id="dacrjasesmentrege_bgcstot" value="15">
  </td>
</tr>
</tbody>
</table>
</div>
</div>
</div>

<!-- /.card-body -->
</div>
<div class="card card-default">
  <div class="card-header" style="background-color:black;">
    <h3 class="card-title" style="color:white;">KATEGORI TRIAGE</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
</div>
<div class="card-body">
  <div class="table-responsive">
    <table class="table table-bordered">
      <tbody>
        <tr>
          <td colspan="6" style="padding:0;"><div class="row d-flex justify-content-center">
            <label class="col-form-label">TRIAGE PASIEN</label>
          </div></td>
        </tr>
        <tr>
          <td width="16%" style="padding:0;">
            <div class="row d-flex justify-content-center bg-secondary">
              <label class="col-form-label">PEMERIKSAAN</label>
            </div>
          </td>
          <td width="16%" style="padding:0;">
            <div class="row d-flex justify-content-center bg-danger">
              <label class="col-form-label">LEVEL 1 (RESUSITASI)</label>
            </div>
          </td>
          <td width="16%" style="padding:0;">
            <div class="row d-flex justify-content-center bg-danger">
              <label class="col-form-label">LEVEL 2 (EMERGENCY)</label>
            </div>
          </td>
          <td width="16%" style="padding:0;">
            <div class="row d-flex justify-content-center bg-warning">
              <label class="col-form-label">LEVEL 3 (URGENT)</label>
            </div>
          </td>
          <td width="16%" style="padding:0;">
            <div class="row d-flex justify-content-center bg-warning">
              <label class="col-form-label">LEVEL 4 (SEMI URGENT)</label>
            </div>
          </td>
          <td width="16%" style="padding:0;">
            <div class="row d-flex justify-content-center bg-success">
              <label class="col-form-label">LEVEL 5 (NON URGENT)</label>
            </div>
          </td>
        </tr>
        <tr>
          <td style="padding:0;">
            <div class="row d-flex justify-content-center bg-secondary">
              <label class="col-form-label">RESPON TIME</label>
            </div>
          </td>
          <td style="padding:0;">
            <div class="row d-flex justify-content-center bg-danger">
              <label class="col-form-label">SEGERA</label>
            </div>
          </td>
          <td style="padding:0;">
            <div class="row d-flex justify-content-center bg-danger">
              <label class="col-form-label">10 MENIT</label>
            </div>
          </td>
          <td style="padding:0;">
            <div class="row d-flex justify-content-center bg-warning">
              <label class="col-form-label">30 MENIT</label>
            </div>
          </td>
          <td style="padding:0;">
            <div class="row d-flex justify-content-center bg-warning">
              <label class="col-form-label">60 MENIT</label>
            </div>
          </td>
          <td style="padding:0;">
            <div class="row d-flex justify-content-center bg-success">
              <label class="col-form-label">120 MENIT</label>
            </div>
          </td>
        </tr>
        <tr>
          <td style="padding:10px;">
            <label class="col-form-label">AIRWAY *</label>
          </td>
          <td style="padding:2px;">
            <div class="form-group row" id="dactriage_hlevel1alist">
              <div class="col-md-12">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dactriage_hlevel1alist" value="1" type="checkbox" class="custom-control-input" id="dactriage_hlevel1alist_1" onchange="cekbox()">
                    <label class="custom-control-label" for="dactriage_hlevel1alist_1">Sumbatan Total</label>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dactriage_hlevel1alist" value="2" type="checkbox" class="custom-control-input" id="dactriage_hlevel1alist_2" onchange="cekbox()">
                    <label class="custom-control-label" for="dactriage_hlevel1alist_2">Sumbatan sebagian</label>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td style="padding:2px;">
            <div class="form-group row" id="dactriage_hlevel2alist">
              <div class="col-md-12">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dactriage_hlevel2alist" value="1" type="checkbox" class="custom-control-input" id="dactriage_hlevel2alist_1" onchange="cekbox()">
                    <label class="custom-control-label" for="dactriage_hlevel2alist_1">Sumbatan Sebagian</label>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dactriage_hlevel2alist" value="2" type="checkbox" class="custom-control-input" id="dactriage_hlevel2alist_2" onchange="cekbox()">
                    <label class="custom-control-label" for="dactriage_hlevel2alist_2">Bebas</label>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td style="padding:2px;">
            <div class="form-group row" id="dactriage_hlevel3alist">
              <div class="col-md-12">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dactriage_hlevel3alist" value="1" type="checkbox" class="custom-control-input" id="dactriage_hlevel3alist_1" onchange="cekbox()">
                    <label class="custom-control-label" for="dactriage_hlevel3alist_1">Bebas</label>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td style="padding:2px;">
            <div class="form-group row" id="dactriage_hlevel4alist">
              <div class="col-md-12">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dactriage_hlevel4alist" value="1" type="checkbox" class="custom-control-input" id="dactriage_hlevel4alist_1" onchange="cekbox()">
                    <label class="custom-control-label" for="dactriage_hlevel4alist_1">Bebas</label>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td style="padding:2px;">
            <div class="form-group row" id="dactriage_hlevel5alist">
              <div class="col-md-12">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dactriage_hlevel5alist" value="1" type="checkbox" class="custom-control-input" id="dactriage_hlevel5alist_1" onchange="cekbox()">
                    <label class="custom-control-label" for="dactriage_hlevel5alist_1">Bebas</label>
                  </div>
                </div>
              </div>
            </div>
          </td>
        </tr>
        <tr>
          <td style="padding:10px;">
            <label class="col-form-label">BREATHING *</label>
          </td>
          <td style="padding:2px;">
            <div class="form-group row" id="dactriage_hlevel1blist">
              <div class="col-md-12">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dactriage_hlevel1blist" value="1" type="checkbox" class="custom-control-input" id="dactriage_hlevel1blist_1" onchange="cekbox()">
                    <label class="custom-control-label" for="dactriage_hlevel1blist_1">Apneu</label>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dactriage_hlevel1blist" value="2" type="checkbox" class="custom-control-input" id="dactriage_hlevel1blist_2" onchange="cekbox()">
                    <label class="custom-control-label" for="dactriage_hlevel1blist_2">Distres nafas berat</label>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td style="padding:2px;">
            <div class="form-group row" id="dactriage_hlevel2blist">
              <div class="col-md-12">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dactriage_hlevel2blist" value="1" type="checkbox" class="custom-control-input" id="dactriage_hlevel2blist_1" onchange="cekbox()">
                    <label class="custom-control-label" for="dactriage_hlevel2blist_1">RR &gt; 30x/m</label>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dactriage_hlevel2blist" value="2" type="checkbox" class="custom-control-input" id="dactriage_hlevel2blist_2" onchange="cekbox()">
                    <label class="custom-control-label" for="dactriage_hlevel2blist_2">Penggunaan otot bantu nafas</label>
                  </div>
                </div>
              </div>
            </div>
          </td>
          
          <td style="padding:2px;">
            <div class="form-group row" id="dactriage_hlevel3blist">
              <div class="col-md-12">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dactriage_hlevel3blist" value="1" type="checkbox" class="custom-control-input" id="dactriage_hlevel3blist_1" onchange="cekbox()">
                    <label class="custom-control-label" for="dactriage_hlevel3blist_1">RR &gt; 24x/m</label>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td style="padding:2px;">
            <div class="form-group row" id="dactriage_hlevel4blist">
              <div class="col-md-12">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dactriage_hlevel4blist" value="1" type="checkbox" class="custom-control-input" id="dactriage_hlevel4blist_1" onchange="cekbox()">
                    <label class="custom-control-label" for="dactriage_hlevel4blist_1">Normal</label>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td style="padding:2px;">
            <div class="form-group row" id="dactriage_hlevel5blist">
              <div class="col-md-12">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dactriage_hlevel5blist" value="1" type="checkbox" class="custom-control-input" id="dactriage_hlevel5blist_1" onchange="cekbox()">
                    <label class="custom-control-label" for="dactriage_hlevel5blist_1">Normal</label>
                  </div>
                </div>
              </div>
            </div>
          </td>
        </tr>
        <tr>
          <td style="padding:10px;">
            <label class="col-form-label">CIRCULATION *</label>
          </td>
          
          <td style="padding:2px;">
            <div class="form-group row" id="dactriage_hlevel1clist">
              <div class="col-md-12">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dactriage_hlevel1clist"  value="1" type="checkbox" class="custom-control-input" id="dactriage_hlevel1clist_1" onchange="cekbox()">
                    <label class="custom-control-label" for="dactriage_hlevel1clist_1">Henti jantung</label>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dactriage_hlevel1clist" value="2" type="checkbox" class="custom-control-input" id="dactriage_hlevel1clist_2" onchange="cekbox()">
                    <label class="custom-control-label" for="dactriage_hlevel1clist_2">Nadi tak teraba</label>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dactriage_hlevel1clist" value="3" type="checkbox" class="custom-control-input" id="dactriage_hlevel1clist_3" onchange="cekbox()">
                    <label class="custom-control-label" for="dactriage_hlevel1clist_3">Akral dingin</label>
                  </div>
                </div>
              </div>
            </div>
          </td>
          
          <td style="padding:2px;">
            <div class="form-group row" id="dactriage_hlevel2clist">
              <div class="col-md-12">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dactriage_hlevel2clist" value="1" type="checkbox" class="custom-control-input" id="dactriage_hlevel2clist_1" onchange="cekbox()">
                    <label class="custom-control-label" for="dactriage_hlevel2clist_1">Nadi teraba lemah</label>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dactriage_hlevel2clist" value="2" type="checkbox" class="custom-control-input" id="dactriage_hlevel2clist_2" onchange="cekbox()">
                    <label class="custom-control-label" for="dactriage_hlevel2clist_2">Akral dingin</label>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dactriage_hlevel2clist" value="3" type="checkbox" class="custom-control-input" id="dactriage_hlevel2clist_3" onchange="cekbox()">
                    <label class="custom-control-label" for="dactriage_hlevel2clist_3">CRT &gt; 2 detik</label>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dactriage_hlevel2clist" value="4" type="checkbox" class="custom-control-input" id="dactriage_hlevel2clist_4" onchange="cekbox()">
                    <label class="custom-control-label" for="dactriage_hlevel2clist_4">Turgor kulit buruk</label>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td style="padding:2px;">
            <div class="form-group row" id="dactriage_hlevel3clist">
              <div class="col-md-12">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dactriage_hlevel3clist" value="1" type="checkbox" class="custom-control-input" id="dactriage_hlevel3clist_1" onchange="cekbox()">
                    <label class="custom-control-label" for="dactriage_hlevel3clist_1">Nadi teraba lemah - kuat</label>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dactriage_hlevel3clist" value="2" type="checkbox" class="custom-control-input" id="dactriage_hlevel3clist_2" onchange="cekbox()">
                    <label class="custom-control-label" for="dactriage_hlevel3clist_2">CRT &lt; 2 detik</label>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td style="padding:2px;">
            <div class="form-group row" id="dactriage_hlevel4clist">
              <div class="col-md-12">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dactriage_hlevel4clist" value="1" type="checkbox" class="custom-control-input" id="dactriage_hlevel4clist_1" onchange="cekbox()">
                    <label class="custom-control-label" for="dactriage_hlevel4clist_1">Tidak ada gangguan hemodinamik</label>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td style="padding:2px;">
            <div class="form-group row" id="dactriage_hlevel5clist">
              <div class="col-md-12">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dactriage_hlevel5clist" value="1" type="checkbox" class="custom-control-input" id="dactriage_hlevel5clist_1" onchange="cekbox()">
                    <label class="custom-control-label" for="dactriage_hlevel5clist_1">Tidak ada gangguan hemodinamik</label>
                  </div>
                </div>
              </div>
            </div>
          </td>
        </tr>
        <tr>
          <td style="padding:10px;">
            <label class="col-form-label">DISABILITY *</label>
          </td>
          
          <td style="padding:2px;">
            <div class="form-group row" id="dactriage_hlevel1dlist">
              <div class="col-md-12">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dactriage_hlevel1dlist" value="1" type="checkbox" class="custom-control-input" id="dactriage_hlevel1dlist_1" onchange="cekbox()">
                    <label class="custom-control-label" for="dactriage_hlevel1dlist_1">Kejang</label>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dactriage_hlevel1dlist" value="2" type="checkbox" class="custom-control-input" id="dactriage_hlevel1dlist_2" onchange="cekbox()">
                    <label class="custom-control-label" for="dactriage_hlevel1dlist_2">GCS &lt;9</label>
                  </div>
                </div>
              </div>
            </div>
          </td>
          
          <td style="padding:2px;">
            <div class="form-group row" id="dactriage_hlevel2dlist">
              <div class="col-md-12">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dactriage_hlevel2dlist" value="1" type="checkbox" class="custom-control-input" id="dactriage_hlevel2dlist_1" onchange="cekbox()">
                    <label class="custom-control-label" for="dactriage_hlevel2dlist_1">Respon dengan rangsang nyeri</label>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dactriage_hlevel2dlist" value="2" type="checkbox" class="custom-control-input" id="dactriage_hlevel2dlist_2" onchange="cekbox()">
                    <label class="custom-control-label" for="dactriage_hlevel2dlist_2">Gelisah</label>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dactriage_hlevel2dlist" value="3" type="checkbox" class="custom-control-input" id="dactriage_hlevel2dlist_3" onchange="cekbox()">
                    <label class="custom-control-label" for="dactriage_hlevel2dlist_3">GCS 12 - 15</label>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td style="padding:2px;">
            <div class="form-group row" id="dactriage_hlevel3dlist">
              <div class="col-md-12">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dactriage_hlevel3dlist" value="1" type="checkbox" class="custom-control-input" id="dactriage_hlevel3dlist_1" onchange="cekbox()">
                    <label class="custom-control-label" for="dactriage_hlevel3dlist_1">Respon verbal</label>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dactriage_hlevel3dlist" value="2" type="checkbox" class="custom-control-input" id="dactriage_hlevel3dlist_2" onchange="cekbox()">
                    <label class="custom-control-label" for="dactriage_hlevel3dlist_2">Apatis</label>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dactriage_hlevel3dlist" value="3" type="checkbox" class="custom-control-input" id="dactriage_hlevel3dlist_3" onchange="cekbox()">
                    <label class="custom-control-label" for="dactriage_hlevel3dlist_3">Somnolen</label>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dactriage_hlevel3dlist" value="4" type="checkbox" class="custom-control-input" id="dactriage_hlevel3dlist_4" onchange="cekbox()">
                    <label class="custom-control-label" for="dactriage_hlevel3dlist_4">GCS 12 - 15</label>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td style="padding:2px;">
            <div class="form-group row" id="dactriage_hlevel4dlist">
              <div class="col-md-12">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dactriage_hlevel4dlist" value="1" type="checkbox" class="custom-control-input" id="dactriage_hlevel4dlist_1" onchange="cekbox()">
                    <label class="custom-control-label" for="dactriage_hlevel4dlist_1">Sadar</label>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dactriage_hlevel4dlist" value="2" type="checkbox" class="custom-control-input" id="dactriage_hlevel4dlist_2" onchange="cekbox()">
                    <label class="custom-control-label" for="dactriage_hlevel4dlist_2">GCS 15</label>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td style="padding:2px;">
            <div class="form-group row" id="dactriage_hlevel5dlist">
              <div class="col-md-12">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dactriage_hlevel5dlist" value="1" type="checkbox" class="custom-control-input" id="dactriage_hlevel5dlist_1" onchange="cekbox()">
                    <label class="custom-control-label" for="dactriage_hlevel5dlist_1">Sadar</label>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dactriage_hlevel5dlist" value="2" type="checkbox" class="custom-control-input" id="dactriage_hlevel5dlist_2" onchange="cekbox()">
                    <label class="custom-control-label" for="dactriage_hlevel5dlist_2">GCS 15</label>
                  </div>
                </div>
              </div>
            </div>
          </td>
        </tr>
        <tr>
          <td colspan="6" style="padding:4px;">
            <div class="col-md-5">
              <div class="form-group row">
                <div class="col-md-4">
                  <label class="col-form-label">Triage Pasien</label>
                </div>
                <div class="col-md-8">
                  <div class="input-group">
                    <select name="hlevel" id="dactriage_hlevel" class="form-control">
                      <option value="1">Level 1</option>
                      <option value="2">Level 2</option>
                      <option value="3">Level 3</option>
                      <option value="4">Level 4</option>
                      <option value="5">Level 5</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <button id="btntriage" class="btn btn-primary" onclick="treage()">Simpan Triage</button>
</div>
</div>

<div class="tab-pane p-1 fade" id="assesKepTriageIgd" role="tabpanel">
  <h6 class="lead mb-0"><u>Assesmen Perawatan</u></h6>
  <div class="card card-default">
    <div class="card-header" style="background-color:black;">
      <h3 class="card-title" style="color:white;">ANAMNESIS</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="row">
        <div class="col-md-4 p2">
          <label class="form-label">Keluhan Utama</label>
        </div>
        <div class="col-md-8 p2">
          <textarea class="form-control " id="keluhanutamaKeperawatanErmIgd"></textarea>
          <!-- /.form-group -->
        </div>
        <!-- /.col -->
        <div class="col-md-4 p2">
          <label class="form-label">Riwayat Penyakit Sekarang *</label>&nbsp;&nbsp;&nbsp;<label><span class="badge bg-primary rounded-pill" onclick="penyakitsekarangasskepigd()" title="autocomplete">auto</span></label>&nbsp;<label><span class="badge bg-primary rounded-pill" onclick="showmodaltambahpenyakitKeperawatansekarang()" title="tambah icd">Tambah</span></label>
        </div>
        <div class="col-md-8 p2">
          <textarea class="form-control " id="RiwayatPenyakitNowTriageIgd"></textarea>
          <div id="DivTreaseRiwayatPenyakitSekarang"></div>
          <!-- /.form-group -->
        </div>
        <!-- /.col --> 
        <div class="col-md-12 pt-4" style="border: solid;overflow-y: scroll;padding-top: 2px" >
          <label class="form-label">Riwayat Penyakit dahulu</label>&nbsp;&nbsp;&nbsp;<label><span class="badge bg-primary rounded-pill" onclick="showmodaltambahpenyakitsekarangtreageigd()" title="tambah icd">Tambah</span></label>
          <table   class="table table-striped table-sm">
            <thead>
              <tr>
                <th style="width: 15px">#</th>
                <th style="width: 80px">ICD 10</th>
                <th>Penyakit</th>
                <th style="width: 80px">Tanggal</th>
              </tr>
            </thead>
            <tbody id="bodyhistoripenyakittreageigd2"></tbody>
          </table>
        </div>

        <div class="col-md-12 pt-4" style="border: solid;overflow-y: scroll;padding-top: 2px" >
          <label class="form-label">Riwayat Penyakit dahulu</label>&nbsp;&nbsp;&nbsp;<label><span class="badge bg-primary rounded-pill" onclick="showmodaltambahpenyakitkeltreageigd()" title="tambah icd">Tambah</span></label>
          <table   class="table table-striped table-sm">
            <thead>
              <tr>
                <th style="width: 15px">#</th>
                <th style="width: 80px">ICD 10</th>
                <th>Penyakit</th>
                <th style="width: 80px">Tanggal</th>
              </tr>
            </thead>
            <tbody id="bodyhistoripenyakitkeltreageigd2"></tbody>
          </table>
        </div>

        <div class="col-md-12 pt-4" style="border: solid;overflow-y: scroll;padding-top: 2px;">
          <label class="form-label">Riwayat Pengobatan/Operasi</label>&nbsp;&nbsp;&nbsp;<label><span class="badge bg-primary rounded-pill" onclick="showmodaltambahpenyakitsekarangtreageigd()" title="tambah icd">Tambah</span></label>
          <table   class="table table-striped table-sm">
            <thead>
              <tr>
                <th style="width: 15px">#</th>
                <th>Penyakit</th>
                <th style="width: 80px">ICD 10</th>
                <th style="width: 80px">Tanggal</th>
              </tr>
            </thead>
            <tbody id="bodyhistoriobattrageigd2"></tbody>
          </table>
        </div>
        <div class="col-md-12 pt-4" style="border: solid;overflow-y: scroll;padding-top: 2px;">
          <label class="form-label">Alergi</label>&nbsp;&nbsp;&nbsp;<label><span class="badge bg-primary rounded-pill" onclick="showmodaltambahalergitreageigd()" title="tambah icd">Tambah</span></label>
          <table   class="table table-striped table-sm">
            <thead>
              <tr>
                <th style="width: 15px">#</th>
                <th>Alergi</th>
              </tr>
            </thead>
            <tbody id="bodyhistorialergitrageigd2"></tbody>
          </table>
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.card-body -->
  </div>
  <div class="card card-default">
    <div class="card-header" style="background-color:black;">
      <h3 class="card-title" style="color:white;">RIWAYAT BIOPSIKOSOSIAL, KULTURAL, SPIRITUAL & EKONOMI</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="row">
        <div class="col-md-4">
          <label class="form-label">Agama :</label>
        </div>
        <div class="col-md-6" >
          <select class="form-control form-control-xs" id="AgamaAssKeperawatanErmIgd">

          </select>
        </div>
        <div class="col-md-4">
          <label class="form-label">Pekerjaan :</label>
        </div>
        <div class="col-md-6">
          <select class="form-control form-control-xs" id="pekerjaanAssKeperawatanErmIgd">
          </select>
        </div>
        <div class="col-md-4">
          <label class="form-label">Tinggal Bersama :</label>
        </div>
        <div class="col-md-6">
          <select class="form-control form-control-xs" id="TinggalBersamaAssKeperawatanErmIgd">
            <option value="1">Suami/Istri</option>
            <option value="2">Orang Tua</option>
            <option value="3">Anak</option>
            <option value="4">Lain-Lain</option>
            <option value="5">Tinggal Sendiri</option>
          </select>
        </div>
        <div class="col-md-4">
          <label class="form-label">Status Mental :</label>
        </div>
        <div class="col-md-6">
          <select class="form-control form-control-xs" id="StatusMentalAssKeperawatanErmIgd">
            <option value="1">Orientasi Baik</option>
            <option value="2">Agitasi</option>
            <option value="3">Menyerang</option>
            <option value="4">Tidak Ada Respon</option>
            <option value="5">Lain-Lain</option>
          </select>
        </div>
        
        <div class="col-md-4">
          <label class="form-label">Status Psikologis :</label>
        </div>
        <div class="col-md-6">
          <select class="form-control form-control-xs" id="StatusPsikoAssKeperawatanErmIgd">
            <option value="1">Kooperatif</option>
            <option value="2">Disorientasi</option>
            <option value="3">Tenang</option>
            <option value="4">Hiperaktif</option>
            <option value="5">Cemas</option>
            <option value="6">Kecenderungan Bunuh Diri</option>
          </select>
        </div>
        <div class="col-md-4">
          <label class="form-label">Penggunaan Restrain :</label>
        </div>
        <div class="col-md-6">
          <select class="form-control form-control-xs" id="RestrainAssKeperawatanErmIgd" onchange="tampilasalanrestrain()">
            <option value="1">Tidak</option>
            <option value="2">Ya, Alasan</option>
          </select>
          <div style="display: none;" id="DivalasanRestrainAssKeperawatanErmIgd">
            <input type="text"  class="form-control form-control-xs" name="alasanRestrainAssKeperawatanErmIgd" >
          </div>
        </div>
        <div class="col-md-4">
          <label class="form-label">Budaya Yang Dianut :</label>
        </div>
        <div class="col-md-6">
          <select class="form-control form-control-xs" id="BudayaAssKeperawatanErmIgd" onchange="tampilBudayaAnut()">
            <option value="1">Tidak</option>
            <option value="2">Ya</option>
          </select>
          <div style="display: none;" id="DivKetBudayaAssKeperawatanErmIgd">
            <input type="text" class="form-control form-control-xs" name="KetBudayaAssKeperawatanErmIgd">
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.card-body -->
  </div>
  <div class="card card-default">
    <div class="card-header" style="background-color:black;">
      <h3 class="card-title" style="color:white;">TANDA VITAL</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="row">
        <div class="col-md-4">
          <table class="table-sm">
            <tr>
              <td>
                <label>Keadaan Umum</label>
              </td>
              <td>
                <select class="form-control form-control-xs" id="KeadaanUmumAssPerawatIgd">
                  <option value="1">Baik</option>
                  <option value="2">Sedang</option>
                  <option value="3">Berat</option>
                </select>
              </td>
            </tr>
            <tr>
              <td>
                <label>Respirasi</label>
              </td>
              <td>
                <div >
                  <input type="text" class="form-control form-control-xs" id="respirasiAssPerawatigd">
                  <div class="input-group-prepend">
                    <span>x/Menit</span>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <label>Nadi</label>
              </td>
              <td>
                <div>
                  <input type="text" class="form-control form-control-xs" id="nadiAssPerawatigd">
                  <div class="input-group-prepend">
                    <span>x/Menit</span>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <label>SpO2</label>
              </td>
              <td>
                <div >
                  <input type="text" class="form-control form-control-xs" id="Spo2AssPerawatigd">
                  <div class="input-group-prepend">
                    <span>%</span>
                  </div>
                </div>
              </td>
            </tr>
          </table>
        </div>
        <div class="col-md-4">
          <table>
            <tr>
              <td>
                <label>Pupil</label>
              </td>
              <td>
                <div  >
                  <div class="input-group-prepend">
                    <span >kiri </span>
                  </div>
                  <input type="number" class="form-control form-control-xs" id="pupilkiriAssPerawatigd">
                  <div class="input-group-prepend">
                    <span >kanan </span>
                  </div>
                  <input type="number" class="form-control form-control-xs" id="pupilkananAssPerawatigd">
                  <div class="input-group-prepend">
                    <span>mm</span>
                  </div>
                </div>

              </td>
            </tr>
            <tr>
              <td>
                <label>Tekanan Darah</label>
              </td>
              <td>
                <div class="input-group">
                  <input type="number" class="form-control form-control-xs" id="tekananDarahAssPerawatigd1"><h3>/</h3>
                  <input type="number" class="form-control form-control-xs" id="tekananDarahAssPerawatigd2">
                  <div class="input-group-prepend">
                    <span>mmHg</span>
                  </div>
                </div>
                <div class="input-group">
                  <input type="text" placeholder="Diisi jika Palpasi" class="form-control form-control-xs" id="palpasiAssPerawatigd" >
                  <div class="input-group-prepend">
                    <span>Per palpasi</span>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <label>Suhu</label>
              </td>
              <td>
                <div class="input-group">
                  <input type="text" class="form-control form-control-xs" id="suhuAssPerawatigd" >
                  <div class="input-group-prepend">
                    <span >C</span>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <label>Reflek Cahaya</label>
              </td>
              <td>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span >kiri</span>
                  </div>
                  <select class="form-control form-control-xs" id="reflekCahayaKiriAssPerawatigd" >
                    <option value="1">-</option>
                    <option value="2">+</option>
                  </select>
                  <div class="input-group-prepend">
                    <span >kanan</span>
                  </div>
                  <select class="form-control form-control-xs" id="reflekCahayaKananAssPerawatigd">
                    <option value="1">-</option>
                    <option value="2">+</option>
                  </select>
                </div>
              </td>
            </tr>
          </table>
        </div>
        <div class="col-md-4">
          <table class="table-sm">
            <tr>
              <td colspan="2">
                <h6>Note (*) Nominal ribuan = gram, satuan / puluhan / ratusan = kg</h6>
              </td>
            </tr>
            <tr>
              <td>
                <label>Berat Badan</label>
              </td>
              <td>
                <div class="input-group">
                  <input type="number" id="bbAssPerawatigd" class="form-control form-control-xs">
                  <div class="input-group-prepend">
                    <span>Kg / Gram</span>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <label>Tinggi Badan</label>
              </td>
              <td>
                <div class="input-group">
                  <input type="number" class="form-control form-control-xs" onclick="hitungimtkepigd()" id="tinggiAssPerawatigd" >
                  <div class="input-group-prepend">
                    <span>cm</span>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <label>IMT</label>
              </td>
              <td>
                <div class="input-group">
                  <input type="number" class="form-control form-control-xs" id="imtAssPerawatigd" >
                  <div class="input-group-prepend">
                    <span>kg/m2</span>
                  </div>
                </div>
              </td>
            </tr>
          </table>
        </div>
      </div>
      <div class="row "><br>
        <div class="col-md-12">
          <table class="table table-bordered table-sm">
            <thead>
            </thead>
            <tbody>                            
              <tr>
                <td colspan="4" style="text-align: center;">
                  <label class="form-label">Glasgow Coma Scale ( GCS )</label>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  Kategori
                </td>
                <td>  
                  Skor
                </td>
                <td>
                  Hasil Skor
                </td>
              </tr>
              <tr >
                <td rowspan="4">
                  Respon Buka Mata (Eye Opening : E)
                </td>
                <td onclick="dacrjasesmenkeperawatanex_setScore(4, 1)">
                 Spontan
               </td>
               <td>
                4
              </td>
              <td rowspan="4">
                <input type="text" name="eyeOpenasskepigd" id="eyeOpenasskepigd" class="form-control" value="4">
              </td>
            </tr>
            <tr >
             <td onclick="dacrjasesmenkeperawatanex_setScore(3, 1)">
               Terhadap Suara
             </td>
             <td>
              3
            </td>
          </tr>
          <tr>
           <td onclick="dacrjasesmenkeperawatanex_setScore(2, 1)">
            Terhadap Nyeri
          </td>
          <td>
            2
          </td>
        </tr>
        <tr>
         <td onclick="dacrjasesmenkeperawatanex_setScore(1, 1)">
           Tidak ada
         </td>
         <td>
          1
        </td>
      </tr>
      <tr>
        <td rowspan="6">
          Respon Motorik Terbaik (M)
        </td>
        <td onclick="dacrjasesmenkeperawatanex_setScore(6, 2)">
         Turut Perintah
       </td>
       <td>
        6
      </td>
      <td rowspan="6">
        <input type="text" name="ResponMotorikasskepigd" id="ResponMotorikasskepigd" class="form-control" value="6">
      </td>
    </tr>
    <tr>
     <td onclick="dacrjasesmenkeperawatanex_setScore(5, 2)">
       Melokalisir Nyeri
     </td>
     <td>
      5
    </td>
  </tr>
  <tr>
   <td onclick="dacrjasesmenkeperawatanex_setScore(4, 2)">
     Fleksi Normal (Menarik anggota gerak yang dirangsang)
   </td>
   <td>
    4
  </td>
</tr>
<tr>
 <td onclick="dacrjasesmenkeperawatanex_setScore(3, 2)">
   Fleksi Abnormal (dekortikasi)
 </td>
 <td>
  3
</td>
</tr>
<tr>
 <td onclick="dacrjasesmenkeperawatanex_setScore(2, 2)">
   Ekstensi Abnormal (deserebrasi)
 </td>
 <td>
  2
</td>
</tr>
<tr>
 <td onclick="dacrjasesmenkeperawatanex_setScore(1, 2)">
  Tidak Ada (Flasid)
</td>
<td>
  1
</td>
</tr>
<tr>
  <td rowspan="5">
    Respon Verbal (V)
  </td>
  <td onclick="dacrjasesmenkeperawatanex_setScore(5, 3)">
   Berorientasi Baik
 </td>
 <td>
  5
</td>
<td rowspan="5">
  <input type="text" name="responVerbalasskepigd" id="responVerbalasskepigd" class="form-control" value="5">
</td>
</tr>
<tr>
 <td onclick="dacrjasesmenkeperawatanex_setScore(4, 3)">
  Berbicara mengacau (bingung)

</td>
<td>
  4
</td>
</tr>
<tr>
 <td onclick="dacrjasesmenkeperawatanex_setScore(3, 3)">
  Kata-Kata tidak teratur
</td>
<td>
  3
</td>
</tr>
<tr>
 <td onclick="dacrjasesmenkeperawatanex_setScore(2, 3)">
   Suara Tidak Jelas
 </td>
 <td>
  2
</td>
</tr>
<tr>
 <td onclick="dacrjasesmenkeperawatanex_setScore(1, 3)">
   Tidak Ada
 </td>
 <td>
  1
</td>
</tr>
<tr>
  <td colspan="3">
    <select class="form-control" id="tipekesadaranasskepermigd">
      <option value="1">Compos mentis</option>
      <option value="2">Apatis</option>
      <option value="3">Somnolen</option>
      <option value="4">Delirium</option>
      <option value="5">Sopor</option>
      <option value="6">Coma</option>
    </select>
  </td>
  <td>
    <input type="text" class="form-control" name="skorassesmenkeperawatanIgd" id="skorassesmenkeperawatanIgd" value="15">
  </td>
</tr>
</tbody>
</table>
</div>
</div>
</div>

<!-- /.card-body -->
</div>
<div class="card card-default">
  <div class="card-header " style="background-color:black;">
    <h3 class="card-title" style="color:white;">PEMERIKSAAN FISIK UMUM;</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered table-sm">
          <thead></thead>
          <tbody>
            <tr>
              <td>
                Kepala
              </td>
              <td>
                <input type="radio" name="fisikkepalaTriageIgd"  id="fisikKepalaTriageIgd2"  onclick="document.getElementById('fisikKepalaTriageIgdKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikKepalaTriageIgdKet" id="fisikKepalaTriageIgdKet" style="display:none;">
                <input type="radio" name="fisikkepalaTriageIgd" id="fisikKepalaTriageIgd1" onclick="document.getElementById('fisikKepalaTriageIgdKet').style.display='none'" checked='true' value="1">Normal
              </td>
              <td>
                Jantung
              </td>
              <td>
                <input type="radio" name="fisikJantungTriageIgd" id="fisikJantungTriageIgd2" onclick="document.getElementById('fisikJantungTriageIgdKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikJantungTriageIgdKet" id="fisikJantungTriageIgdKet" style="display:none;">
                <input type="radio" name="fisikJantungTriageIgd" onclick="document.getElementById('fisikJantungTriageIgdKet').style.display='none'" id="fisikJantungTriageIgd1" checked='true' value="1">Normal
              </td>
            </tr>
            <tr>
              <td>
                Mata
              </td>
              <td>
                <input type="radio" name="fisikMataTriageIgd" id="fisikMataTriageIgd2" onclick="document.getElementById('fisikMataTriageIgdKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikMataTriageIgdKet" id="fisikMataTriageIgdKet" style="display:none;">
                <input type="radio" name="fisikMataTriageIgd" id="fisikMataTriageIgd1" onclick="document.getElementById('fisikMataTriageIgdKet').style.display='none'" value="1" checked='true'>Normal
              </td>
              <td>
                Paru
              </td>
              <td>
                <input type="radio" name="fisikParuTriageIgd" id="fisikParuTriageIgd2" onclick="document.getElementById('fisikParuTriageIgdKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikParuTriageIgdKet" id="fisikParuTriageIgdKet" style="display:none;">
                <input type="radio" name="fisikParuTriageIgd" id="fisikParuTriageIgd1" onclick="document.getElementById('fisikParuTriageIgdKet').style.display='none'" value="1" checked='true'>Normal
              </td>
            </tr>
            <tr>
              <td>
                THT
              </td>
              <td> 
                <input type="radio" name="fisikThtTriageIgd" id="fisikThtTriageIgd2" onclick="document.getElementById('fisikThtTriageIgdKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikThtTriageIgdKet" id="fisikThtTriageIgdKet" style="display:none;">
                <input type="radio" name="fisikThtTriageIgd" id="fisikThtTriageIgd1" onclick="document.getElementById('fisikThtTriageIgdKet').style.display='none'" value="1" checked='true'>Normal
              </td>
              <td>
                Ambomen
              </td>
              <td>
                <input type="radio" name="fisikAbdomenTriageIgd" id="fisikAbdomenTriageIgd2" onclick="document.getElementById('fisikAbdomenTriageIgdKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikAbdomenTriageIgdKet" id="fisikAbdomenTriageIgdKet" style="display:none;">
                <input type="radio" name="fisikAbdomenTriageIgd" id="fisikAbdomenTriageIgd1" onclick="document.getElementById('fisikAbdomenTriageIgdKet').style.display='none'" value="1" checked='true'>Normal
              </td>
            </tr>
            <tr>
              <td>
                Leher
              </td>
              <td>
                <input type="radio" name="fisikLeherTriageIgd" id="fisikLeherTriageIgd2" onclick="document.getElementById('fisikLeherTriageIgdKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikLeherTriageIgdKet" id="fisikLeherTriageIgdKet" style="display:none;">
                <input type="radio" name="fisikLeherTriageIgd" id="fisikLeherTriageIgd1" onclick="document.getElementById('fisikLeherTriageIgdKet').style.display='none'" value="1" checked='true'>Normal
              </td>
              <td>
                Genitalia
              </td>
              <td>
                <input type="radio" name="fisikGenitaliaTriageIgd" id="fisikGenitaliaTriageIgd2" onclick="document.getElementById('fisikGenitaliaTriageIgdKet').style.display='block'" value="2" >Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikGenitaliaTriageIgdKet" id="fisikGenitaliaTriageIgdKet" style="display:none;">
                <input type="radio" name="fisikGenitaliaTriageIgd" id="fisikGenitaliaTriageIgd1" onclick="document.getElementById('fisikGenitaliaTriageIgdKet').style.display='none'" value="1" checked='true'>Normal
              </td>
            </tr>
            <tr>
              <td>
                Mulut
              </td>
              <td>
                <input type="radio" name="fisikMulutTriageIgd" id="fisikMulutTriageIgd2" onclick="document.getElementById('fisikMulutTriageIgdKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikMulutTriageIgdKet" id="fisikMulutTriageIgdKet" style="display:none;">
                <input type="radio" name="fisikMulutTriageIgd" id="fisikMulutTriageIgd1" onclick="document.getElementById('fisikMulutTriageIgdKet').style.display='none'" value="1" checked='true'>Normal
              </td>
              <td>
                Status Localis
              </td>
              <td>
                <textarea class="form-control " id="fisikStatusLocalisTriageIgd"></textarea>
              </td>
            </tr>
            <tr>
              <td>
                Thorax
              </td>
              <td colspan="3">
                <input type="radio" name="fisikThoraxTriageIgd" id="fisikThoraxTriageIgd2" onclick="document.getElementById('fisikThoraxTriageIgdKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs"  name="fisikThoraxTriageIgdKet" id="fisikThoraxTriageIgdKet" style="display:none;"><br>
                <input type="radio" name="fisikThoraxTriageIgd" id="fisikThoraxTriageIgd1" onclick="document.getElementById('fisikThoraxTriageIgdKet').style.display='none'" value="1" checked='true'>Norma
              </td>
            </tr>
          </tbody>
        </table>
        <!-- /.form-group -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.card-body -->
</div>
</div>
<div class="tab-pane p-1 fade" id="assesKepTriageIgd" role="tabpanel">
  <h6 class="lead mb-0"><u>Assesmen Perawatan</u></h6>
  <div class="card card-default">
    <div class="card-header" style="background-color:black;">
      <h3 class="card-title" style="color:white;">ANAMNESIS</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="row">
        <div class="col-md-4 p2">
          <label class="form-label">Keluhan Utama</label>
        </div>
        <div class="col-md-8 p2">
          <textarea class="form-control " id="keluhanutamaKeperawatanErmIgd"></textarea>
          <!-- /.form-group -->
        </div>
        <!-- /.col -->
        <div class="col-md-4 p2">
          <label class="form-label">Riwayat Penyakit Sekarang *</label>&nbsp;&nbsp;&nbsp;<label><span class="badge bg-primary rounded-pill" onclick="penyakitsekarangasskepigd()" title="autocomplete">auto</span></label>&nbsp;<label><span class="badge bg-primary rounded-pill" onclick="showmodaltambahpenyakitKeperawatansekarang()" title="tambah icd">Tambah</span></label>
        </div>
        <div class="col-md-8 p2">
          <textarea class="form-control " id="RiwayatPenyakitNowTriageIgd"></textarea>
          <div id="DivTreageRiwayatPenyakitSekarang"></div>
          <!-- /.form-group -->
        </div>
        <!-- /.col --> 

      </div>
      <!-- /.row -->
    </div>
    <!-- /.card-body -->
  </div>
  <div class="card card-default">
    <div class="card-header" style="background-color:black;">
      <h3 class="card-title" style="color:white;">RIWAYAT BIOPSIKOSOSIAL, KULTURAL, SPIRITUAL & EKONOMI</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="row">
        <div class="col-md-4">
          <label class="form-label">Agama :</label>
        </div>
        <div class="col-md-6" id="AgamaAssKeperawatanErmIgd">
          <select class="form-control form-control-xs">
            <option value="1">Islam</option>
            <option value="2">Kristen</option>
            <option value="3">Hindu</option>
            <option value="4">Budha</option>
            <option value="5">Katolik</option>
            <option value="6">Lain-lain</option>
          </select>
        </div>
        <div class="col-md-4">
          <label class="form-label">Pekerjaan :</label>
        </div>
        <div class="col-md-6">
          <select class="form-control form-control-xs" id="pekerjaanAssKeperawatanErmIgd">
            <option value="1">PNS / POLRI</option>
            <option value="2">Swasta</option>
            <option value="3">Pensiun</option>
            <option value="4">Lain-Lain</option>
          </select>
        </div>
        <div class="col-md-4">
          <label class="form-label">Tinggal Bersama :</label>
        </div>
        <div class="col-md-6">
          <select class="form-control form-control-xs" id="TinggalBersamaAssKeperawatanErmIgd">
            <option value="1">Suami/Istri</option>
            <option value="2">Orang Tua</option>
            <option value="3">Anak</option>
            <option value="4">Lain-Lain</option>
            <option value="5">Tinggal Sendiri</option>
          </select>
        </div>
        <div class="col-md-4">
          <label class="form-label">Status Mental :</label>
        </div>
        <div class="col-md-6">
          <select class="form-control form-control-xs" id="StatusMentalAssKeperawatanErmIgd">
            <option value="1">Orientasi Baik</option>
            <option value="2">Agitasi</option>
            <option value="3">Menyerang</option>
            <option value="4">Tidak Ada Respon</option>
            <option value="5">Lain-Lain</option>
          </select>
        </div>

        <div class="col-md-4">
          <label class="form-label">Status Psikologis :</label>
        </div>
        <div class="col-md-6">
          <select class="form-control form-control-xs" id="StatusPsikoAssKeperawatanErmIgd">
            <option value="1">Kooperatif</option>
            <option value="2">Disorientasi</option>
            <option value="3">Tenang</option>
            <option value="4">Hiperaktif</option>
            <option value="5">Cemas</option>
            <option value="6">Kecenderungan Bunuh Diri</option>
          </select>
        </div>
        <div class="col-md-4">
          <label class="form-label">Penggunaan Restrain :</label>
        </div>
        <div class="col-md-6">
          <select class="form-control form-control-xs" id="RestrainAssKeperawatanErmIgd" onchange="tampilasalanrestrain()">
            <option value="1">Tidak</option>
            <option value="2">Ya, Alasan</option>
          </select>
          <div style="display: none;" id="DivalasanRestrainAssKeperawatanErmIgd">
            <input type="text"  class="form-control form-control-xs" name="alasanRestrainAssKeperawatanErmIgd" >
          </div>
        </div>
        <div class="col-md-4">
          <label class="form-label">Budaya Yang Dianut :</label>
        </div>
        <div class="col-md-6">
          <select class="form-control form-control-xs" id="BudayaAssKeperawatanErmIgd" onchange="tampilBudayaAnut()">
            <option value="1">Tidak</option>
            <option value="2">Ya</option>
          </select>
          <div style="display: none;" id="DivKetBudayaAssKeperawatanErmIgd">
            <input type="text" class="form-control form-control-xs" name="KetBudayaAssKeperawatanErmIgd">
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.card-body -->
  </div>
  <div class="card card-default">
    <div class="card-header" style="background-color:black;">
      <h3 class="card-title" style="color:white;">TANDA VITAL</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="row">
        <div class="col-md-4">
          <table class="table-sm">
            <tr>
              <td>
                <label>Keadaan Umum</label>
              </td>
              <td>
                <select class="form-control form-control-xs" id="KeadaanUmumAssPerawatIgd">
                  <option value="1">Baik</option>
                  <option value="2">Sedang</option>
                  <option value="3">Berat</option>
                </select>
              </td>
            </tr>
            <tr>
              <td>
                <label>Respirasi</label>
              </td>
              <td>
                <div >
                  <input type="text" class="form-control form-control-xs" id="respirasiAssPerawatigd">
                  <div class="input-group-prepend">
                    <span>x/Menit</span>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <label>Nadi</label>
              </td>
              <td>
                <div>
                  <input type="text" class="form-control form-control-xs" id="nadiAssPerawatigd">
                  <div class="input-group-prepend">
                    <span>x/Menit</span>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <label>SpO2</label>
              </td>
              <td>
                <div >
                  <input type="text" class="form-control form-control-xs" id="Spo2AssPerawatigd">
                  <div class="input-group-prepend">
                    <span>%</span>
                  </div>
                </div>
              </td>
            </tr>
          </table>
        </div>
        <div class="col-md-4">
          <table>
            <tr>
              <td>
                <label>Pupil</label>
              </td>
              <td>
                <div  >
                  <div class="input-group-prepend">
                    <span >kiri </span>
                  </div>
                  <input type="number" class="form-control form-control-xs" id="pupilkiriAssPerawatigd">
                  <div class="input-group-prepend">
                    <span >kanan </span>
                  </div>
                  <input type="number" class="form-control form-control-xs" id="pupilkananAssPerawatigd">
                  <div class="input-group-prepend">
                    <span>mm</span>
                  </div>
                </div>

              </td>
            </tr>
            <tr>
              <td>
                <label>Tekanan Darah</label>
              </td>
              <td>
                <div class="input-group">
                  <input type="number" class="form-control form-control-xs" id="tekananDarahAssPerawatigd1"><h3>/</h3>
                  <input type="number" class="form-control form-control-xs" id="tekananDarahAssPerawatigd2">
                  <div class="input-group-prepend">
                    <span>mmHg</span>
                  </div>
                </div>
                <div class="input-group">
                  <input type="text" placeholder="Diisi jika Palpasi" class="form-control form-control-xs" id="palpasiAssPerawatigd" >
                  <div class="input-group-prepend">
                    <span>Per palpasi</span>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <label>Suhu</label>
              </td>
              <td>
                <div class="input-group">
                  <input type="text" class="form-control form-control-xs" id="suhuAssPerawatigd" >
                  <div class="input-group-prepend">
                    <span >C</span>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <label>Reflek Cahaya</label>
              </td>
              <td>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span >kiri</span>
                  </div>
                  <select class="form-control form-control-xs" id="reflekCahayaKiriAssPerawatigd" >
                    <option value="1">-</option>
                    <option value="2">+</option>
                  </select>
                  <div class="input-group-prepend">
                    <span >kanan</span>
                  </div>
                  <select class="form-control form-control-xs" id="reflekCahayaKananAssPerawatigd">
                    <option value="1">-</option>
                    <option value="2">+</option>
                  </select>
                </div>
              </td>
            </tr>
          </table>
        </div>
        <div class="col-md-4">
          <table class="table-sm">
            <tr>
              <td colspan="2">
                <h6>Note (*) Nominal ribuan = gram, satuan / puluhan / ratusan = kg</h6>
              </td>
            </tr>
            <tr>
              <td>
                <label>Berat Badan</label>
              </td>
              <td>
                <div class="input-group">
                  <input type="number" id="bbAssPerawatigd" class="form-control form-control-xs">
                  <div class="input-group-prepend">
                    <span>Kg / Gram</span>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <label>Tinggi Badan</label>
              </td>
              <td>
                <div class="input-group">
                  <input type="number" class="form-control form-control-xs" id="tinggiAssPerawatigd" >
                  <div class="input-group-prepend">
                    <span>cm</span>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <label>IMT</label>
              </td>
              <td>
                <div class="input-group">
                  <input type="number" class="form-control form-control-xs" id="imtAssPerawatigd" >
                  <div class="input-group-prepend">
                    <span>kg/m2</span>
                  </div>
                </div>
              </td>
            </tr>
          </table>
        </div>
      </div>
      <div class="row "><br>
        <div class="col-md-12">
          <table class="table table-bordered table-sm">
            <thead>
            </thead>
            <tbody>                            
              <tr>
                <td colspan="4" style="text-align: center;">
                  <label class="form-label">Glasgow Coma Scale ( GCS )</label>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  Kategori
                </td>
                <td>  
                  Skor
                </td>
                <td>
                  Hasil Skor
                </td>
              </tr>
              <tr >
                <td rowspan="4">
                  Respon Buka Mata (Eye Opening : E)
                </td>
                <td onclick="dacrjasesmenkeperawatanex_setScore(4, 1)">
                 Spontan
               </td>
               <td>
                4
              </td>
              <td rowspan="4">
                <input type="text" name="eyeOpenTriageIgd" id="eyeOpenTriageIgd" class="form-control" value="4">
              </td>
            </tr>
            <tr >
             <td onclick="dacrjasesmenkeperawatanex_setScore(3, 1)">
               Terhadap Suara
             </td>
             <td>
              3
            </td>
          </tr>
          <tr>
           <td onclick="dacrjasesmenkeperawatanex_setScore(2, 1)">
            Terhadap Nyeri
          </td>
          <td>
            2
          </td>
        </tr>
        <tr>
         <td onclick="dacrjasesmenkeperawatanex_setScore(1, 1)">
           Tidak ada
         </td>
         <td>
          1
        </td>
      </tr>
      <tr>
        <td rowspan="6">
          Respon Motorik Terbaik (M)
        </td>
        <td onclick="dacrjasesmenkeperawatanex_setScore(6, 2)">
         Turut Perintah
       </td>
       <td>
        6
      </td>
      <td rowspan="6">
        <input type="text" name="ResponMotorikasskepigd" id="ResponMotorikasskepigd" class="form-control" value="6">
      </td>
    </tr>
    <tr>
     <td onclick="dacrjasesmenkeperawatanex_setScore(5, 2)">
       Melokalisir Nyeri
     </td>
     <td>
      5
    </td>
  </tr>
  <tr>
   <td onclick="dacrjasesmenkeperawatanex_setScore(4, 2)">
     Fleksi Normal (Menarik anggota gerak yang dirangsang)
   </td>
   <td>
    4
  </td>
</tr>
<tr>
 <td onclick="dacrjasesmenkeperawatanex_setScore(3, 2)">
   Fleksi Abnormal (dekortikasi)
 </td>
 <td>
  3
</td>
</tr>
<tr>
 <td onclick="dacrjasesmenkeperawatanex_setScore(2, 2)">
   Ekstensi Abnormal (deserebrasi)
 </td>
 <td>
  2
</td>
</tr>
<tr>
 <td onclick="dacrjasesmenkeperawatanex_setScore(1, 2)">
  Tidak Ada (Flasid)
</td>
<td>
  1
</td>
</tr>
<tr>
  <td rowspan="5">
    Respon Verbal (V)
  </td>
  <td onclick="dacrjasesmenkeperawatanex_setScore(5, 3)">
   Berorientasi Baik
 </td>
 <td>
  5
</td>
<td rowspan="5">
  <input type="text" name="responVerbalTriageIgd" id="responVerbalTriageIgd" class="form-control" value="5">
</td>
</tr>
<tr>
 <td onclick="dacrjasesmenkeperawatanex_setScore(4, 3)">
  Berbicara mengacau (bingung)

</td>
<td>
  4
</td>
</tr>
<tr>
 <td onclick="dacrjasesmenkeperawatanex_setScore(3, 3)">
  Kata-Kata tidak teratur
</td>
<td>
  3
</td>
</tr>
<tr>
 <td onclick="dacrjasesmenkeperawatanex_setScore(2, 3)">
   Suara Tidak Jelas
 </td>
 <td>
  2
</td>
</tr>
<tr>
 <td onclick="dacrjasesmenkeperawatanex_setScore(1, 3)">
   Tidak Ada
 </td>
 <td>
  1
</td>
</tr>
<tr>
  <td colspan="3">
    <select class="form-control">
      <option value="1">Compos mentis</option>
      <option value="2">Apatis</option>
      <option value="3">Somnolen</option>
      <option value="4">Delirium</option>
      <option value="5">Sopor</option>
      <option value="6">Coma</option>
    </select>
  </td>
  <td>
    <input type="text" class="form-control" name="skorassesmenkeperawatanIgd" id="skorassesmenkeperawatanIgd" value="15">
  </td>
</tr>
</tbody>
</table>
</div>
</div>
</div>

<!-- /.card-body -->
</div>
<div class="card card-default">
  <div class="card-header " style="background-color:black;">
    <h3 class="card-title" style="color:white;">PEMERIKSAAN FISIK UMUM</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered table-sm">
          <thead></thead>
          <tbody>
            <tr>
              <td>
                Kepala
              </td>
              <td>
                <input type="radio" name="fisikKepalaTriageIgd" onclick="document.getElementById('fisikKepalaTriageIgdKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikKepalaTriageIgdKet" id="fisikKepalaTriageIgdKet" style="display:none;">
                <input type="radio" name="fisikKepalaTriageIgd" onclick="document.getElementById('fisikKepalaTriageIgdKet').style.display='none'" checked='true' value="1">Normal
              </td>
              <td>
                Jantung
              </td>
              <td>
                <input type="radio" name="fisikJantungTriageIgd" onclick="document.getElementById('fisikJantungTriageIgdKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikJantungTriageIgdKet" id="fisikJantungTriageIgdKet" style="display:none;">
                <input type="radio" name="fisikJantungTriageIgd" onclick="document.getElementById('fisikJantungTriageIgdKet').style.display='none'" checked='true' value="1">Normal
              </td>
            </tr>
            <tr>
              <td>
                Mata
              </td>
              <td>
                <input type="radio" name="fisikMataTriageIgd" onclick="document.getElementById('fisikMataTriageIgdKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikMataTriageIgdKet" id="fisikMataTriageIgdKet" style="display:none;">
                <input type="radio" name="fisikMataTriageIgd" onclick="document.getElementById('fisikMataTriageIgdKet').style.display='none'" value="1" checked='true'>Normal
              </td>
              <td>
                Paru
              </td>
              <td>
                <input type="radio" name="fisikParuTriageIgd" onclick="document.getElementById('fisikParuTriageIgdKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikParuTriageIgdKet" id="fisikParuTriageIgdKet" style="display:none;">
                <input type="radio" name="fisikParuTriageIgd" onclick="document.getElementById('fisikParuTriageIgdKet').style.display='none'" value="1" checked='true'>Normal
              </td>
            </tr>
            <tr>
              <td>
                THT
              </td>
              <td> 
                <input type="radio" name="fisikThtTriageIgd" onclick="document.getElementById('fisikThtTriageIgdKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikThtTriageIgdKet" id="fisikThtTriageIgdKet" style="display:none;">
                <input type="radio" name="fisikThtTriageIgd" onclick="document.getElementById('fisikThtTriageIgdKet').style.display='none'" value="1" checked='true'>Normal
              </td>
              <td>
                Ambomen
              </td>
              <td>
                <input type="radio" name="fisikAbdomenTriageIgd" onclick="document.getElementById('fisikAbdomenTriageIgdKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikAbdomenTriageIgdKet" id="fisikAbdomenTriageIgdKet" style="display:none;">
                <input type="radio" name="fisikAbdomenTriageIgd" onclick="document.getElementById('fisikAbdomenTriageIgdKet').style.display='none'" value="1" checked='true'>Normal
              </td>
            </tr>
            <tr>
              <td>
                Leher
              </td>
              <td>
                <input type="radio" name="fisikLeherTriageIgd" onclick="document.getElementById('fisikLeherTriageIgdKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikLeherTriageIgdKet" id="fisikLeherTriageIgdKet" style="display:none;">
                <input type="radio" name="fisikLeherTriageIgd" onclick="document.getElementById('fisikLeherTriageIgdKet').style.display='none'" value="1" checked='true'>Normal
              </td>
              <td>
                Genitalia
              </td>
              <td>
                <input type="radio" name="fisikGenitaliaTriageIgd" onclick="document.getElementById('fisikGenitaliaTriageIgdKet').style.display='block'" value="2" >Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikGenitaliaTriageIgdKet" id="fisikGenitaliaTriageIgdKet" style="display:none;">
                <input type="radio" name="fisikGenitaliaTriageIgd" onclick="document.getElementById('fisikGenitaliaTriageIgdKet').style.display='none'" value="1" checked='true'>Normal
              </td>
            </tr>
            <tr>
              <td>
                Mulut
              </td>
              <td>
                <input type="radio" name="fisikMulutTriageIgd" onclick="document.getElementById('fisikMulutTriageIgdKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikMulutTriageIgdKet" id="fisikMulutTriageIgdKet" style="display:none;">
                <input type="radio" name="fisikMulutTriageIgd" onclick="document.getElementById('fisikMulutTriageIgdKet').style.display='none'" value="1" checked='true'>Normal
              </td>
              <td>
                Status Localis
              </td>
              <td>
                <textarea class="form-control " id="fisikStatusLocalisTriageIgd"></textarea>
              </td>
            </tr>
            <tr>
              <td>
                Thorax
              </td>
              <td colspan="3">
                <input type="radio" name="fisikThoraxTriageIgd" onclick="document.getElementById('fisikThoraxTriageIgdKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs"  name="fisikThoraxTriageIgdKet" id="fisikThoraxTriageIgdKet" style="display:none;"><br>
                <input type="radio" name="fisikThoraxTriageIgd" onclick="document.getElementById('fisikThoraxTriageIgdKet').style.display='none'" value="1" checked='true'>Norma
              </td>
            </tr>
          </tbody>
        </table>
        <!-- /.form-group -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.card-body -->
</div>
<div class="card card-default" id="divriwayatmensIgd" >
  <div class="card-header" style="background-color:black;">
    <h3 class="card-title" style="color:white;">RIWAYAT MENSTRUASI</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <div class="card-body">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group row">
            <div class="col-md-4">
              <label class="col-form-label"> Riwayat Menstruasi</label>
            </div>
            <div class="col-md-8">
              <div class="row" id="dacrjasesmenneoanak_hmensId">
                <div class="col-md-5">
                  <div class="form-group">
                    <div class="row custom-control custom-checkbox custom-control-inline">
                      <input name="dacrjasesmenneoanak_hmensId" value="1" type="radio" class="custom-control-input" id="dacrjasesmenneoanak_hmensId_1"> <label class="custom-control-label" for="dacrjasesmenneoanak_hmensId_1">Belum/Tidak Menstruasi</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group">
                    <div class="row custom-control custom-checkbox custom-control-inline">
                      <input name="dacrjasesmenneoanak_hmensId" value="2" type="radio" class="custom-control-input" id="dacrjasesmenneoanak_hmensId_2"> <label class="custom-control-label" for="dacrjasesmenneoanak_hmensId_2">Sudah Menstruasi</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12" id="dacrjasesmenneoanak_div_hmensId2" style="">
       <div class="row">
        <div class="col-md-6">
          <div class="form-group row">
            <div class="col-md-4">
              <!-- <i class="fa fa-angle-right"></i> -->&nbsp;
              <label class="col-form-label" title="Umur Menarche">Umur Menarche</label>
            </div>
            <div class="col-md-0">&nbsp;</div>
            <div class="col-md-4">
              <div class="input-group">
                <input type="number" onfocus="this.select();" class="form-control" id="dacrjasesmenneoanak_hmenarche">
                <span class="input-group-append">
                  <span class="input-group-text">Tahun</span>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-4">
              <!-- <i class="fa fa-angle-right"></i> -->&nbsp;
              <label class="col-form-label" title="Siklus Haid">Siklus Haid</label>
            </div>
            <div class="col-md-0">&nbsp;</div>
            <div class="col-md-4">
              <div class="input-group">
                <input type="number" onfocus="this.select();" class="form-control" id="dacrjasesmenneoanak_hsiklushaid">
                <span class="input-group-append">
                  <span class="input-group-text">Hari</span>
                </span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <div class="col-md-4">
              <!-- <i class="fa fa-angle-right"></i> -->&nbsp;
              <label class="col-form-label" title="HPHT">HPHT</label>
            </div>
            <div class="col-md-4">
              <div class="input-group date" id="dacrjasesmenneoanak_dhtglhpht" data-target-input="nearest">
                <input id="dacrjasesmenneoanak_htglhpht" name="htglhpht" type="text" class="form-control datetimepicker-input" data-target="#dacrjasesmenneoanak_dhtglhpht" data-toggle="datetimepicker">
                <div class="input-group-append" data-target="#dacrjasesmenneoanak_dhtglhpht" data-toggle="datetimepicker">
                  <div class="input-group-text"><!-- <i class="far fa-calendar"></i> --></div>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-4">
              <!-- <i class="fa fa-angle-right"></i> -->&nbsp;
              <label class="col-form-label" title="Perkiraan Menstruasi Berikutnya">Perkiraan Menstruasi Berikutnya</label>

            </div>
            <div class="col-md-4">
              <div class="input-group date" id="dacrjasesmenneoanak_dhtglmens" data-target-input="nearest">
                <input id="dacrjasesmenneoanak_htglmens" name="htglmens" type="text" class="form-control 
                datetimepicker-input" data-target="#dacrjasesmenneoanak_dhtglmens" data-toggle="datetimepicker">
                <div class="input-group-append" data-target="#dacrjasesmenneoanak_dhtglmens" data-toggle="datetimepicker">
                  <div class="input-group-text">
                    <!-- <i class="far fa-calendar"></i> -->
                  </div>
                </div>
              </div>
            </div>
          </div>            
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="card card-default" id="divskringigizianakIgd" style="display:none;">
  <div class="card-header" style="background-color:black;">
    <h3 class="card-title" style="color:white;">SKRINING GIZI Anak/Bayi</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <div class="card-body">
    <div class="row ">
      <div class="col-md-8">
        <div class="form-group row">
          <div class="col-md-12">
            <!-- <i class="fa fa-angle-right"></i> -->&nbsp; <label class="col-form-label">Apakah pasien tampak kurus :</label>
          </div>
        </div>
        <div class="form-group row" style="padding-bottom: 1px;">
          <div class="col-md-0"> &nbsp;</div>
          <div class="col-md-10">
            <div class="row" id="dacrjasesmenneoanak_egizia">
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dacrjasesmenneoanak_egizia" value="1" type="radio" class="custom-control-input" id="dacrjasesmenneoanak_egizia_1" onclick="dacrjasesmenneoanakex.sethasilgizi();"> <label class="custom-control-label" for="dacrjasesmenneoanak_egizia_1">Tidak</label>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dacrjasesmenneoanak_egizia" value="2" type="radio" class="custom-control-input" id="dacrjasesmenneoanak_egizia_2" onclick="dacrjasesmenneoanakex.sethasilgizi();"> <label class="custom-control-label" for="dacrjasesmenneoanak_egizia_2">Ya</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-12">
            <!-- <i class="fa fa-angle-right"></i> -->&nbsp; <label class="col-form-label">Apakah ada penurunan berat badan
            dalam satu bulan terakhir?</label>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-0"> &nbsp;</div>
          <div class="col-md-11">
            <label class="col-form-label">(Berdasarkan penilaian
              objektif data BB bila ada dan atau penilaian subjektif orang
              tua pasien atau untuk bayi &lt;1 tahun BB tidak naik selama 3
            bulan terakhir)</label>
          </div>
        </div>
        <div class="form-group row" style="padding-bottom: 1px;">
          <div class="col-md-0"> &nbsp;</div>
          <div class="col-md-10">
            <div class="row" id="dacrjasesmenneoanak_egizib">
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dacrjasesmenneoanak_egizib" value="1" type="radio" class="custom-control-input" id="dacrjasesmenneoanak_egizib_1" onclick="dacrjasesmenneoanakex.sethasilgizi();"> <label class="custom-control-label" for="dacrjasesmenneoanak_egizib_1">Tidak</label>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dacrjasesmenneoanak_egizib" value="2" type="radio" class="custom-control-input" id="dacrjasesmenneoanak_egizib_2" onclick="dacrjasesmenneoanakex.sethasilgizi();"> <label class="custom-control-label" for="dacrjasesmenneoanak_egizib_2">Ya</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-md-12">
            <!-- <i class="fa fa-angle-right"></i> -->&nbsp; <label class="col-form-label">Apakah ada salah satu kondisi
            berikut :</label>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-0">  </div>
          <div class="col-md-10">
            <label class="col-form-label"> a. Diare = 5x/hari dan
            atau muntah = 3x/hari dalam seminggu terakhir</label>
          </div>
        </div>
        <div class="form-group row" style="padding-bottom: 1px;">
          <div class="col-md-0"> &nbsp;</div>
          <div class="col-md-10">
            <div class="row" id="dacrjasesmenneoanak_egizic1">
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dacrjasesmenneoanak_egizic1" value="1" type="radio" class="custom-control-input" id="dacrjasesmenneoanak_egizic1_1" onclick="dacrjasesmenneoanakex.sethasilgizi();"> <label class="custom-control-label" for="dacrjasesmenneoanak_egizic1_1">Tidak</label>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dacrjasesmenneoanak_egizic1" value="2" type="radio" class="custom-control-input" id="dacrjasesmenneoanak_egizic1_2" onclick="dacrjasesmenneoanakex.sethasilgizi();"> <label class="custom-control-label" for="dacrjasesmenneoanak_egizic1_2">Ya</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-0">  </div>
          <div class="col-md-10">
            <label class="col-form-label">b. Asupan makan berkurang
            selama seminggu terakhir</label>
          </div>
        </div>
        <div class="form-group row" style="padding-bottom: 1px;">
          <div class="col-md-0"> &nbsp;</div>
          <div class="col-md-10">
            <div class="row" id="dacrjasesmenneoanak_egizic2">
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dacrjasesmenneoanak_egizic2" value="1" type="radio" class="custom-control-input" id="dacrjasesmenneoanak_egizic2_1" onclick="dacrjasesmenneoanakex.sethasilgizi();"> <label class="custom-control-label" for="dacrjasesmenneoanak_egizic2_1">Tidak</label>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dacrjasesmenneoanak_egizic2" value="2" type="radio" class="custom-control-input" id="dacrjasesmenneoanak_egizic2_2" onclick="dacrjasesmenneoanakex.sethasilgizi();"> <label class="custom-control-label" for="dacrjasesmenneoanak_egizic2_2">Ya</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-12">
            <!-- <i class="fa fa-angle-right"></i> -->&nbsp; <label class="col-form-label">Apakah terdapat penyakit atau keadaan yang menyebabkan pasien berisiko mengalami malnutrisi ?</label>
          </div>
        </div>  
        <div class="form-group row" style="padding-bottom: 1px;">
          <div class="col-md-0"> &nbsp;</div>
          <div class="col-md-10">
            <div class="row" id="dacrjasesmenneoanak_egizid">
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dacrjasesmenneoanak_egizid" value="1" type="radio" class="custom-control-input" id="dacrjasesmenneoanak_egizid_1" onclick="dacrjasesmenneoanakex.sethasilgizi();"> <label class="custom-control-label" for="dacrjasesmenneoanak_egizid_1">Tidak</label>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dacrjasesmenneoanak_egizid" value="2" type="radio" class="custom-control-input" id="dacrjasesmenneoanak_egizid_2" onclick="dacrjasesmenneoanakex.sethasilgizi();"> <label class="custom-control-label" for="dacrjasesmenneoanak_egizid_2">Ya</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>                      
      </div>
      <div class="col-md-4">
        <div class="form-group row">
          <div class="col-md-3">
            <b><label class="col-form-label">Total Skor </label></b>
          </div>
          <div class="col-md-5">
            <input type="number" onfocus="this.select();" class="form-control font-weight-bold" name="dacrjasesmenneoanak_egiziskor" id="dacrjasesmenneoanak_egiziskor">
          </div>
        </div>
        <div class="form-group row" style="padding-bottom: 5px;">
          <div class="col-md-12">
            <label class="col-form-label font-italic">* Catatan :
            Skor 0 Risiko Rendah, Skor 1-3 Risiko Sedang, 4-5 Risiko Berat</label>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-3">
            <b><label class="col-form-label font-weight-bold">Hasil Skrining </label></b>
          </div>
          <div class="col-md-8">
            <label class="col-form-label font-weight-bold" id="dacrjasesmenneoanak_lgiziskor">RISIKO RENDAH</label>
          </div>
        </div>
      </div>
    </div>
    <div class="row ">
      <div class="col-md-12 row d-flex justify-content-center">
        <label class="col-form-label font-weight-bold">Daftar
        penyakit / keadaan yang berisiko mengakibatkan malnutrisi</label>
      </div>
      <div class="table-responsive">
        <table class="table table-bordered table-condensed" width="100%">
          <tbody><tr class="">
            <td width="40%">
              <div class="row ">
                <div class="col-md-12">
                  <div class="form-group row">
                    <!-- <i class="fa fa-caret-right"></i> -->&nbsp;&nbsp; (Tersangka)
                    penyakit jantung bawaan
                  </div>
                  <div class="form-group row">
                    <!-- <i class="fa fa-caret-right"></i> -->&nbsp;&nbsp; (Tersangka)
                    HIV
                  </div>
                  <div class="form-group row">
                    <!-- <i class="fa fa-caret-right"></i> -->&nbsp;&nbsp; (Tersangka)
                    kanker
                  </div>
                  <div class="form-group row">
                    <!-- <i class="fa fa-caret-right"></i> -->&nbsp;&nbsp; Penyakit hati
                    kronik
                  </div>
                  <div class="form-group row">
                    <!-- <i class="fa fa-caret-right"></i> -->&nbsp;&nbsp; Kelainan
                    anatomi daerah mulut yang menyebabkan kesulitan makan
                    (misal : bibir sumbing)
                  </div>
                </div>
              </div>

            </td>
            <td width="30%" style="padding: 1;">
              <div class="row ">
                <div class="col-md-12">
                  <div class="form-group row">
                    <!-- <i class="fa fa-caret-right"></i> -->&nbsp;&nbsp; Diare kronik
                  </div>
                  <div class="form-group row">
                    <!-- <i class="fa fa-caret-right"></i> -->&nbsp;&nbsp; TB paru
                  </div>
                  <div class="form-group row">
                    <!-- <i class="fa fa-caret-right"></i> -->&nbsp;&nbsp; Luka bakar
                    luas
                  </div>
                  <div class="form-group row">
                    <!-- <i class="fa fa-caret-right"></i> -->&nbsp;&nbsp; Terpasang
                    stoma
                  </div>
                  <div class="form-group row">
                    <!-- <i class="fa fa-caret-right"></i> -->&nbsp;&nbsp; Trauma
                  </div>
                </div>
              </div>
            </td>
            <td width="30%" style="padding: 1;">
              <div class="row ">
                <div class="col-md-12">
                  <div class="form-group row">
                    <!-- <i class="fa fa-caret-right"></i> -->&nbsp;&nbsp; Retardasi
                    mental
                  </div>
                  <div class="form-group row">
                    <!-- <i class="fa fa-caret-right"></i> -->&nbsp;&nbsp; Keterlambatan
                    perkembangan
                  </div>
                  <div class="form-group row">
                    <!-- <i class="fa fa-caret-right"></i> -->&nbsp;&nbsp; Rencana /
                    paska pembedahan mayor
                  </div>
                  <div class="form-group row">
                    <!-- <i class="fa fa-caret-right"></i> -->&nbsp;&nbsp; Lain-lain
                    sesuai pertimbangan dokter
                  </div>
                  <div class="form-group row">
                   <!-- <i class="fa fa-caret-right"></i> -->&nbsp;&nbsp; Kelainan
                   metabolic bawaan
                 </div>
               </div>
             </div>
           </td>
         </tr>
       </tbody></table>
     </div>
   </div>
 </div>
</div>
<div class="card card-default" id="divskrininggizidewasaIgd">
  <div class="card-header" style="background-color:black;">
    <h3 class="card-title" style="color:white;">SKRINING GIZI</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-6">
        <label class="form-label"> > Apakah ada penurunan berat badan tidak direncanakan dalam 6 bulan terakhir</label>
        <select class="form-control form-control-xs" id="ermrwjkeperawatanbbturun">
          <option value="1">Tidak</option>
          <option value="2">Tidak Yakin</option>
        </select>
        <div>
          <select class="form-control form-control-xs" id="ermrwjkeperawatanbbturunkg">
            <option value="1">1 - 5 Kg (1)</option>
            <option value="2">6 - 10 Kg (2)</option>
            <option value="3">11 - 15 Kg (3)</option>
            <option value="4">> 15 Kg (4)</option>
          </select>
        </div>
        <label class="form-label"> > Apakah asupan makan berkurang karena penurunan nafsu makan/ kesulitan menerima makanan</label>
        <select class="form-control form-control-xs" id="ermrwjkeperawatanpenurunanmakan">
          <option>Tidak</option>
          <option>Ya</option>
        </select>
      </div>
      <div class="col-md-6">
        <label class="form-label">Total Skor</label>
        <input type="text" name="ermrwjkeperawatantotalskor" id="ermrwjkeperawatantotalskor" class="form-control form-control-xs">
        <label>Saran/Tindakan</label>
        <input type="text" class="form-control form-control-xs" name="ermrwjkeperawatansaran" id="ermrwjkeperawatansaran">
        <label class="form-label">Catatan : Skor 0 risiko rendah, Skor 1 risiko sedang, Skor = 2 risiko tinggi konsultasikan ahli gizi atau Bila terdapat kondisi seperti DM, luka bakar, CKD, hiperlipidemia atau kondisi khusus lainnya berdasarkan pertimbangan dokter, maka konsultasikan ke ahli gizi</label>
      </div>
    </div>
  </div><!-- end card body -->
</div>
<!-- <div class="card card-default">
  <div class="card-header" style="background-color:black;">
    <h3 class="card-title" style="color:white;">STATUS FUNGSIONAL *</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <div class="card-body">
    <input type="radio" name="ermrwjkeperawatanfungsional" value="1" checked="true">&nbsp;<label class="form-label">Mandiri</label>
    <input type="radio" name="ermrwjkeperawatanfungsional" value="2">&nbsp;<label class="form-label">Perlu bantuan</label>
    <input type="radio" name="ermrwjkeperawatanfungsional" value="3">&nbsp;<label class="form-label">Ketergantungan total</label>
  </div>
</div>
<div class="card card-default">
  <div class="card-header" style="background-color:black;">
    <h3 class="card-title" style="color:white;">SKRINING RISIKO CEDERA/ JATUH (Usia <13 - >60 Tahun) menggunakan Up and Go Test (Pasien ini berumur 69 Tahun) *</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <div>
            <label class="form-label">a. Perhatikan cara berjalan pasien saat akan duduk dikursi, apakah pasien tampak tidak seimbang (sempoyongan/ limbung);</label>
            <input type="radio" name="ermrwjkeperawatankeseimbangan" checked="true" value="1">&nbsp;<label> Tidak</label>&nbsp;&nbsp;<input type="radio" name="ermrwjkeperawatankeseimbangan" value="2">&nbsp;<label> Ya</label> 
          </div>
          <div>
            <label class="form-label">b. Apakah pasien memegang pinggiran kursi atau meja atau benda lain sebagai penopang saat akan duduk</label>
            <input type="radio" name="ermrwjkeperawatanpenopang" value="1" checked="true">&nbsp;<label> Tidak</label>&nbsp;&nbsp;<input type="radio" name="ermrwjkeperawatanpenopang" value="2">&nbsp;<label> Ya</label>
          </div>
        </div>
        <div class="col-md-6">
          <div>
            <label class="form-label">Hasil</label>
            <input type="radio" name="ermrwjkeperawatanhasilskrining" value="1" checked="true">
            <label class="form-label">Tidak Berisiko</label>&nbsp;
            <input type="radio" name="ermrwjkeperawatanhasilskrining" value="2">
            <label class="form-label">Risiko Rendah</label>&nbsp;
            <input type="radio" name="ermrwjkeperawatanhasilskrining" value="3">
            <label class="form-label">Risiko Tinggi</label>&nbsp;
          </div>
          <div>
            <label class="form-label">Keterangan</label>
            <input class="form-control form-control-xs" type="text" name="ermrwjkeperawatanhasilkesimpulan" id="ermrwjkeperawatanhasilkesimpulan"></div>
            <div>               
              <label class="form-label">Catatan : Tidak berisiko (tidak ditemukan a dan b), Risiko rendah (ditemukan a/ b), Risiko tinggi (a dan b ditemukan)</label>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card card-default">
      <div class="card-header" style="background-color:black;">
        <h3 class="card-title" style="color:white;">ASPEK PENGKAJIAN NYERI  (Pasien ini berumur 69 Tahun)</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">         
            <label class="form-label">WONG BAKER FACE SCALE AND NUMERIC PAIN RATING SCALE (Pasien > 6 tahun)</label>
          </div>
          <div class="col-md-2" style="text-align: center;">
            <div >
              <img src="<?= base_url('_assets/nyeri0.png') ?>" style="width: 100px;height: 100px;">
            </div>
            <div >
              <label class="form-label">Tidak Nyeri</label>
            </div>
          </div>
          <div class="col-md-2" style="text-align: center;">
            <div>  
              <img src="<?= base_url('_assets/nyeri2.png') ?>" style="width: 100px;height: 100px;">
            </div>
            <div>
              <label class="form-label">Sedikit Nyeri</label>
            </div>
          </div>
          <div class="col-md-2" style="text-align: center;">
            <div>  
              <img src="<?= base_url('_assets/nyeri4.png') ?>" style="width: 100px;height: 100px;">
            </div>
            <div>
              <label class="form-label">Sedikit Nyeri</label>
            </div>
          </div>
          <div class="col-md-2" style="text-align: center;">
            <div>  
              <img src="<?= base_url('_assets/nyeri6.png') ?>" style="width: 100px;height: 100px;">
            </div>
            <div>
              <label class="form-label">Sedikit Nyeri</label>
            </div>
          </div>
          <div class="col-md-2" style="text-align: center;">
            <div>  
              <img src="<?= base_url('_assets/nyeri8.png') ?>" style="width: 100px;height: 100px;">
            </div>
            <div>
              <label class="form-label">Sedikit Nyeri</label>
            </div>
          </div>
          <div class="col-md-2" style="text-align: center;">
            <div>  
              <img src="<?= base_url('_assets/nyeri10.png') ?>" style="width: 100px;height: 100px;">
            </div>
            <div>
              <label class="form-label">Sedikit Nyeri</label>
            </div>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorface" value="0" checked="true"><label>0</label></div>
          <div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorface" value="1"><label>1</label></div>
          <div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorface" value="2"><label>2</label></div>
          <div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorface" value="3"><label>3</label></div>
          <div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorface" value="4"><label>4</label></div>
          <div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorface" value="5"><label>5</label></div>
          <div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorface" value="6"><label>6</label></div>
          <div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorface" value="7"><label>7</label></div>
          <div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorface" value="8"><label>8</label></div>
          <div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorface" value="9"><label>9</label></div>
          <div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorface" value="10"><label>10</label></div>
          <div class="col-md-1"></div>



        </div>
      </div>
    </div> -->
    <div class="card card-default">
      <div class="card-header" style="background-color:black;">
        <h3 class="card-title" style="color:white;">KEBUTUHAN KOMUNIKASI/PENDIDIKAN DAN PENGAJARAN *</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="row">     
          <div class="col-md-2">
            <div>  
              <label class="form-label">Bicara</label>
            </div>
            <div>  
              <label class="form-label">Perlu Penerjemah</label>
            </div>
            <div>  
              <label class="form-label">Bahasa Isyarat</label>
            </div>
          </div>
          <div class="col-md-2">
            <div>                          
              <input type="radio" name="KebKomBicaraTriageIgd" onclick="document.getElementById('DivPenjelasTriageIgd').style.display='none'" value="1" id="PenerjemahTriageIgd1" checked='true'>
              <label>Normal</label>
            </div>
            <div>                          
              <input type="radio" name="PenerjemahTriageIgd" value="1" checked='true'>
              <label>Tidak</label>
            </div>
            <div>                          
              <input type="radio" name="IsyaratTriageIgd" value="1" checked='true'>
              <label>Tidak</label>
            </div>
          </div>
          <div class="col-md-2">
            <div>
              <input type="radio" name="KebKomBicaraTriageIgd" onclick="KebKomBicaraTriageIgd()" value="2" id="PenerjemahTriageIgd2">
              <label>Gangguan bicara, Jelaskan</label>
              <div id="DivPenjelasTriageIgd" style="display:none;">
                <input type="text" name="PenjelasTriageIgd">
              </div>
            </div>
            <div>
              <input type="radio" name="PenerjemahTriageIgd" value="2">
              <label>Ya, Bahasa</label>
            </div>
            <div>
              <input type="radio" name="IsyaratTriageIgd" value="2">
              <label>Ya</label>
            </div>
          </div>
          <div class="col-md-2">
            <div>
              <label class="form-label">Hambatan Belajar</label>
            </div>
            <div>
              <label class="form-label"> Tingkat Pendidikan</label>
            </div>
          </div>
          <div class="col-md-2">
            <div>
              <input type="radio" name="HamBelajarTriageIgd" value="1" checked='true'> 
              <label>Tidak</label>
            </div>
            <div>
              <input type="radio" name="TinPendidikanTriageIgd" value="1" checked='true'>
              <label>Tidak</label>
            </div>
            <div>
              <input type="radio" name="TinPendidikanTriageIgd" value="2">
              <label>SMP</label>
            </div>
            <div>
              <input type="radio" name="TinPendidikanTriageIgd" value="3">
              <label>Perguruan Tinggi</label>
            </div>
          </div>
          <div class="col-md-2">
            <div>
              <input type="radio" name="HamBelajarTriageIgd" value="2">
              <label>Ya</label>
            </div>
            <div>
              <input type="radio" name="TinPendidikanTriageIgd" value="4">
              <label>SD</label>
            </div>
            <div>
              <input type="radio" name="TinPendidikanTriageIgd" value="5">
              <label>SMA</label>
            </div>
            <div>
              <input type="radio" name="TinPendidikanTriageIgd" value="6">
              <label>Lain-lain</label>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card card-default">
      <div class="card-header" style="background-color:black;">
        <h3 class="card-title" style="color:white;">DAFTAR DIAGNOSA KEPERAWATAN & INTERVENSI KEPERAWATAN *</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <h5>Intervensi Keperawatan</h5>                      
            <textarea class="form-control" id="intervensiTriageIgd"></textarea>
            <div id="DivintervensiTriageIgd" style="position:relative;"></div>
          </div> 
          <div class="col-md-12">   
            <h5>Diagnosa Keperawatan</h5>                  
            <textarea class="form-control" id="DiagnosaTriageIgd"></textarea>
            <div id="DivDiagnosaTriageIgd"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- ///// -->
    <div class="card">
      <div class="row">
        <div class="col-sm-4" style="text-align: center;">
          <label>Dokter Penganggung Jawab Pasien1</label><br>
          <input type="date" name="" class="form-control"><br>
          <input type="text" name="" class="form-control"><br>
          <label>Nama & Tanda tangan</label> 

        </div>
        <div class="col-1"></div>
      </div>
    </div>
  </div>
  <div class="tab-pane p-1 fade" id="linkassesmenmedisTriageIgd" role="tabpanel">
    <h6 class="lead mb-0"><u>Assesmen Dokter</u></h6>
    <div class="card card-default">
      <div class="card-header" style="background-color:black;">
        <h3 class="card-title" style="color:white;">ANAMNESIS</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="row">
          <div class="col-md-4 p2">
            <label class="form-label">Keluhan Utama</label>
          </div>
          <div class="col-md-8 p2">
            <textarea class="form-control " id="keluhanutamaassmedigd"></textarea>
            <!-- /.form-group -->
          </div>
          <!-- /.col -->
          <div class="col-md-4 p2">
            <label class="form-label">Riwayat Penyakit Sekarang *</label>&nbsp;&nbsp;&nbsp;<label><span class="badge bg-primary rounded-pill" onclick="penyakitsekarangassmedigd()" title="autocomplete">auto</span></label>&nbsp;<label><span class="badge bg-primary rounded-pill" onclick="showmodaltambahpenyakitmedissekarang()" title="tambah icd">Tambah</span></label>
          </div>
          <div class="col-md-8 p2">
            <textarea class="form-control " id="Riwayatpenyakitnowassmedigd"></textarea>
            <div id="divAssesmenassmedigd"></div>
            <!-- /.form-group -->
          </div>
          <!-- /.col --> 

          <div class="col-md-12 pt-4" style="border: solid;overflow-y: scroll;padding-top: 2px" >
            <label class="form-label">Riwayat Penyakit dahulu</label>&nbsp;&nbsp;&nbsp;<label><span class="badge bg-primary rounded-pill" onclick="showmodaltambahpenyakitsekarangtreageigd()" title="tambah icd">Tambah</span></label>
            <table   class="table table-striped table-sm">
              <thead>
                <tr>
                  <th style="width: 15px">#</th>
                  <th style="width: 80px">ICD 10</th>
                  <th>Penyakit</th>
                  <th style="width: 80px">Tanggal</th>
                </tr>
              </thead>
              <tbody id="bodyhistoripenyakittreageigd3"></tbody>
            </table>
          </div>

          <div class="col-md-12 pt-4" style="border: solid;overflow-y: scroll;padding-top: 2px;">
            <label class="form-label">Riwayat Pengobatan/Operasi</label>&nbsp;&nbsp;&nbsp;<label><span class="badge bg-primary rounded-pill" onclick="showmodaltambahpenyakitsekarangtreageigd()" title="tambah icd">Tambah</span></label>
            <table   class="table table-striped table-sm">
              <thead>
                <tr>
                  <th style="width: 15px">#</th>
                  <th>Penyakit</th>
                  <th style="width: 80px">ICD 10</th>
                  <th style="width: 80px">Tanggal</th>
                </tr>
              </thead>
              <tbody id="bodyhistoriobattrageigd3"></tbody>
            </table>
          </div>
          <div class="col-md-12 pt-4" style="border: solid;overflow-y: scroll;padding-top: 2px;">
            <label class="form-label">Alergi</label>&nbsp;&nbsp;&nbsp;<label><span class="badge bg-primary rounded-pill" onclick="showmodaltambahalergitreageigd()" title="tambah icd">Tambah</span></label>
            <table   class="table table-striped table-sm">
              <thead>
                <tr>
                  <th style="width: 15px">#</th>
                  <th>Alergi</th>
                </tr>
              </thead>
              <tbody id="bodyhistorialergitrageigd3"></tbody>
            </table>
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.card-body -->
    </div>

    <div class="card card-default">
      <div class="card-header" style="background-color:black;">
        <h3 class="card-title" style="color:white;">RIWAYAT BIOPSIKOSOSIAL, KULTURAL, SPIRITUAL & EKONOMI</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="row">
          <table class="table table-striped">
            <thead>
            </thead>
            <tbody>
              <tr>
                <td scope="row">Agama</td>
                <td>
                  <select id="checkAgamaassmedigd" name="checkAgamaassmedigd" class="form-control form-control-xs">
                  </select></td>
                </tr>
                <tr>
                  <th scope="row">Pekerjaan</th>
                  <td>
                    <select name="pekerjaanassmedigd" id="pekerjaanassmedigd" class="form-control form-control-xs" >
                    </select>  
                  </td>
                </tr>
                <tr>
                  <th scope="row">Tinggal Bersama</th>
                  <td><input type="radio" checked='true' name="TinggalBersamaassmedigd" id="TinggalBersamaassmedigd1" value="1"> Suami/Istri </td>
                  <td><input type="radio" name="TinggalBersamaassmedigd" id="TinggalBersamaassmedigd2" value="2"> Orang Tua </td>
                  <td><input type="radio" name="TinggalBersamaassmedigd" id="TinggalBersamaassmedigd3" value="3"> Anak </td>
                  <td><input type="radio" name="TinggalBersamaassmedigd" id="TinggalBersamaassmedigd4" value="4"> Lain-Lain </td>
                  <td><input type="radio" name="TinggalBersamaassmedigd" id="TinggalBersamaassmedigd5" value="5"> Tinggal Sendiri </td>
                  <td> </td>
                </tr>
                <tr>
                  <th scope="row">Status Mental</th>
                  <td><input type="radio" checked='true' name="statusmentalassmedigd" id="statusmentalassmedigd1" value="1"> Orientasi Baik </td>
                  <td><input type="radio" name="statusmentalassmedigd" id="statusmentalassmedigd2" value="2"> Agitasi </td>
                  <td><input type="radio" name="statusmentalassmedigd" id="statusmentalassmedigd3" value="3"> Menyerang </td>
                  <td><input type="radio" name="statusmentalassmedigd" id="statusmentalassmedigd4" value="4"> Tidak Ada Respon </td>
                  <td><input type="radio" name="statusmentalassmedigd" id="statusmentalassmedigd5" value="5"> Lain-Lain </td>
                  <td></td>
                </tr>
                <tr>
                  <th scope="row">Status Psikologis</th>
                  <td>
                    <input type="radio" checked='true' name="statusPsikologisassmedigd" id="statusPsikologisassmedigd1" value="1"> Kooperatif <br>
                    <input type="radio" name="statusPsikologisassmedigd" id="statusPsikologisassmedigd2"> Gelisah 
                  </td>
                  <td>
                    <input type="radio" name="statusPsikologisassmedigd" id="statusPsikologisassmedigd3" value="2"> Disorientasi<br>
                    <input type="radio" name="statusPsikologisassmedigd" id="statusPsikologisassmedigd" value="3"> Depresi 
                  </td>
                  <td>
                    <input type="radio" name="statusPsikologisassmedigd" id="statusPsikologisassmedigd4" value="4"> Tenang<br>
                    <input type="radio" name="statusPsikologis" id="statusPsikologisassmedigd5" value="5"> Marah 
                  </td>
                  <td>
                    <input type="radio" name="statusPsikologisassmedigd" id="statusPsikologisassmedigd6" value="6"> Hiperaktif<br>
                    <input type="radio" name="statusPsikologisassmedigd" id="statusPsikologisassmedigd7" value="7"> Lain-Lain 
                  </td>
                  <td>
                    <input type="radio" name="statusPsikologis" id="statusPsikologisassmedigd8" value="8"> Cemas 
                  </td>
                  <td>
                    <input type="radio" name="statusPsikologis" id="statusPsikologisassmedigd9" value="9"> Kecenderungan Bunuh Diri 
                  </td>
                </tr>
                <tr>
                  <th scope="row">Penggunaan Restrain</th>
                  <td><input type="radio" checked='true' name="penggunaanRestrainassmedigd" id="penggunaanRestrainassmedigd1" value="1"> Tidak 
                  </td>
                  <td><input type="radio" name="penggunaanRestrainassmedigd" id="penggunaanRestrainassmedigd2" value="2"> Ya, Alasan </td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <th scope="row">Budaya Yang Dianut</th>
                  <td><input type="text" name="Budayaassmedigd" id="Budayaassmedigd" class="form-control form-control-xs"></td>
                  <td></td>
                  <td> </td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.card-body -->
      </div>
      <div class="card card-default">
        <div class="card-header" style="background-color:black;">
          <h3 class="card-title" style="color:white;">TANDA VITAL</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-4">
              <table class="table-sm">
                <tr>
                  <td>
                    <label>Keadaan Umum</label>
                  </td>
                  <td>
                    <select class="form-control form-control-xs" id="KeadaanUmumassmedigd">
                      <option value="1">Baik</option>
                      <option value="2">Sedang</option>
                      <option value="3">Berat</option>
                    </select>



                  </td>
                </tr>
                <tr>
                  <td>
                    <label>Respirasi</label>
                  </td>
                  <td>
                    <div class="input-group">
                      <input type="text" class="form-control form-control-xs" id="respirasiassmedigd">
                      <div class="input-group-prepend">
                        <span>x/Menit</span>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label>Nadi</label>
                  </td>
                  <td>
                    <div class="input-group">
                      <input type="text" class="form-control form-control-xs" id="nadiassmedigd">
                      <div class="input-group-prepend">
                        <span>x/Menit</span>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label>SpO2</label>
                  </td>
                  <td>
                    <div class="input-group">
                      <input type="text" class="form-control form-control-xs" id="Spo2assmedigd">
                      <div class="input-group-prepend">
                        <span>%</span>
                      </div>
                    </div>
                  </td>
                </tr>
              </table>
            </div>
            <div class="col-md-4">
              <table>
                <tr>
                  <td>
                    <label>Pupil</label>
                  </td>
                  <td>
                    <div class="input-group" >
                      <div class="input-group-prepend">
                        <span >kiri </span>
                      </div>
                      <input type="number" class="form-control form-control-xs" id="pupilkiriassmedigd">
                      <div class="input-group-prepend">
                        <span >kanan </span>
                      </div>
                      <input type="number" class="form-control form-control-xs" id="pupilkananassmedigd">
                      <div class="input-group-prepend">
                        <span>mm</span>
                      </div>
                    </div>

                  </td>
                </tr>
                <tr>
                  <td>
                    <label>Tekanan Darah</label>
                  </td>
                  <td>
                    <div class="input-group">
                      <input type="number" class="form-control form-control-xs" id="tekananDarahermigd1"><h3>/</h3>
                      <input type="number" class="form-control form-control-xs" id="tekananDarahermigd2">
                      <div class="input-group-prepend">
                        <span>mmHg</span>
                      </div>
                    </div>
                    <div class="input-group">
                      <input type="text" placeholder="Diisi jika Palpasi" class="form-control form-control-xs" id="palpasiassmedigd" >
                      <div class="input-group-prepend">
                        <span>Per palpasi</span>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label>Suhu</label>
                  </td>
                  <td>
                    <div class="input-group">
                      <input type="text" class="form-control form-control-xs" id="suhuassmedigd" >
                      <div class="input-group-prepend">
                        <span >C</span>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label>Reflek Cahaya</label>
                  </td>
                  <td>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span >kiri</span>
                      </div>
                      <select class="form-control form-control-xs" id="reflekCahayaKiriassmedigd" >
                        <option value="1">-</option>
                        <option value="2">+</option>
                      </select>
                      <div class="input-group-prepend">
                        <span >kanan</span>
                      </div>
                      <select class="form-control form-control-xs" id="reflekCahayaKananassmedigd">
                        <option value="1">-</option>
                        <option value="2">+</option>
                      </select>
                    </div>
                  </td>
                </tr>
              </table>
            </div>
            <div class="col-md-4">
              <table class="table-sm">
                <tr>
                  <td colspan="2">
                    <h6>Note (*) Nominal ribuan = gram, satuan / puluhan / ratusan = kg</h6>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label>Berat Badan</label>
                  </td>
                  <td>
                    <div class="input-group">
                      <input type="number" id="bbassmedigd" class="form-control form-control-xs">
                      <div class="input-group-prepend">
                        <span>Kg / Gram</span>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label>Tinggi Badan</label>
                  </td>
                  <td>
                    <div class="input-group">
                      <input type="number" class="form-control form-control-xs" onclick="hitungimtmedisigd()" onchange="hitungimtmedisigd()" id="tinggiassmedigd" >
                      <div class="input-group-prepend">
                        <span>cm</span>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label>IMT</label>
                  </td>
                  <td>
                    <div class="input-group">
                      <input type="number" class="form-control form-control-xs" id="imtassmedigd" >
                      <div class="input-group-prepend">
                        <span>kg/m2</span>
                      </div>
                    </div>
                  </td>
                </tr>
              </table>
            </div>
          </div>
          <div class="row "><br>
            <div class="col-md-12">
              <table class="table table-bordered table-sm">
                <thead>
                </thead>
                <tbody>                            
                  <tr>
                    <td colspan="4" style="text-align: center;">
                      <label class="form-label">Glasgow Coma Scale ( GCS )</label>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      Kategori
                    </td>
                    <td>  
                      Skor
                    </td>
                    <td>
                      Hasil Skor
                    </td>
                  </tr>
                  <tr >
                    <td rowspan="4">
                      Respon Buka Mata (Eye Opening : E)
                    </td>
                    <td onclick="dacrjasesmenmedisex_setScore(4, 1)">
                     Spontan
                   </td>
                   <td>
                    4
                  </td>
                  <td rowspan="4">
                    <input type="text" name="eyeOpen" id="eyeOpen" class="form-control" value="4">
                  </td>
                </tr>
                <tr >
                 <td onclick="dacrjasesmenmedisex_setScore(3, 1)">
                   Terhadap Suara
                 </td>
                 <td>
                  3
                </td>
              </tr>
              <tr>
               <td onclick="dacrjasesmenmedisex_setScore(2, 1)">
                Terhadap Nyeri
              </td>
              <td>
                2
              </td>
            </tr>
            <tr>
             <td onclick="dacrjasesmenmedisex_setScore(1, 1)">
               Tidak ada
             </td>
             <td>
              1
            </td>
          </tr>
          <tr>
            <td rowspan="6">
              Respon Motorik Terbaik (M)
            </td>
            <td onclick="dacrjasesmenmedisex_setScore(6, 2)">
             Turut Perintah
           </td>
           <td>
            6
          </td>
          <td rowspan="6">
            <input type="text" name="ResponMotorik" id="responMotorik" class="form-control" value="6">
          </td>
        </tr>
        <tr>
         <td onclick="dacrjasesmenmedisex_setScore(5, 2)">
           Melokalisir Nyeri
         </td>
         <td>
          5
        </td>
      </tr>
      <tr>
       <td onclick="dacrjasesmenmedisex_setScore(4, 2)">
         Fleksi Normal (Menarik anggota gerak yang dirangsang)
       </td>
       <td>
        4
      </td>
    </tr>
    <tr>
     <td onclick="dacrjasesmenmedisex_setScore(3, 2)">
       Fleksi Abnormal (dekortikasi)
     </td>
     <td>
      3
    </td>
  </tr>
  <tr>
   <td onclick="dacrjasesmenmedisex_setScore(2, 2)">
     Ekstensi Abnormal (deserebrasi)
   </td>
   <td>
    2
  </td>
</tr>
<tr>
 <td onclick="dacrjasesmenmedisex_setScore(1, 2)">
  Tidak Ada (Flasid)
</td>
<td>
  1
</td>
</tr>
<tr>
  <td rowspan="5">
    Respon Verbal (V)
  </td>
  <td onclick="dacrjasesmenmedisex_setScore(5, 3)">
   Berorientasi Baik
 </td>
 <td>
  5
</td>
<td rowspan="5">
  <input type="text" name="responVerbal" id="responVerbal" class="form-control" value="5">
</td>
</tr>
<tr>
 <td onclick="dacrjasesmenmedisex_setScore(4, 3)">
  Berbicara mengacau (bingung)

</td>
<td>
  4
</td>
</tr>
<tr>
 <td onclick="dacrjasesmenmedisex_setScore(3, 3)">
  Kata-Kata tidak teratur
</td>
<td>
  3
</td>
</tr>
<tr>
 <td onclick="dacrjasesmenmedisex_setScore(2, 3)">
   Suara Tidak Jelas
 </td>
 <td>
  2
</td>
</tr>
<tr>
 <td onclick="dacrjasesmenmedisex_setScore(1, 3)">
   Tidak Ada
 </td>
 <td>
  1
</td>
</tr>
<tr>
  <td colspan="3">
    <select class="form-control" id="tipekesadaranassmedmigd">
      <option value="1">Compos mentis</option>
      <option value="2">Apatis</option>
      <option value="3">Somnolen</option>
      <option value="4">Delirium</option>
      <option value="5">Sopor</option>
      <option value="6">Coma</option>
    </select>
  </td>
  <td>
    <input type="text" class="form-control" name="dacrjasesmenmedis_bgcstot" id="dacrjasesmenmedis_bgcstot" value="15">
  </td>
</tr>
</tbody>
</table>
</div>
</div>
</div>

<!-- /.card-body -->
</div>
<div class="card card-default">
  <div class="card-header " style="background-color:black;">
    <h3 class="card-title" style="color:white;">PEMERIKSAAN FISIK UMUM;</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered table-sm">
          <thead></thead>
          <tbody>
            <tr>
              <td>
                Kepala
              </td>
              <td>
                <input type="radio" name="fisikKepalaassmedigd" id="fisikKepalaassmedigd1" onclick="document.getElementById('fisikKepalaassmedigdKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikKepalaassmedigdKet" id="fisikKepalaassmedigdKet" style="display:none;">
                <input type="radio" name="fisikKepalaassmedigd" id="fisikKepalaassmedigd2" onclick="document.getElementById('fisikKepalaassmedigdKet').style.display='none'"  checked="true" value="1">Normal
              </td>
              <td>
                Jantung
              </td>
              <td>
                <input type="radio" name="fisikJantungassmedigd" id="fisikJantungassmedigd1" onclick="document.getElementById('fisikJantungassmedigdKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs"  name="fisikJantungassmedigdKet" id="fisikJantungassmedigdKet" style="display:none;">
                <input type="radio" name="fisikJantungassmedigd" id="fisikJantungassmedigd2" onclick="document.getElementById('fisikJantungassmedigdKet').style.display='none'" checked='true' value="1">Normal
              </td>
            </tr>
            <tr>
              <td>
                Mata
              </td>
              <td>
                <input type="radio" name="fisikMataassmedigd"  id="fisikMataassmedigd1" onclick="document.getElementById('fisikMataassmedigdKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikMataassmedigdKet" id="fisikMataassmedigdKet" style="display:none;">
                <input type="radio" name="fisikMataassmedigd" id="fisikMataassmedigd2" onclick="document.getElementById('fisikMataassmedigdKet').style.display='none'" value="1" checked='true'>Normal
              </td>
              <td>
                Paru
              </td>
              <td>
                <input type="radio" name="fisikParuassmedigd" id="fisikParuassmedigd1" onclick="document.getElementById('fisikParuassmedigdKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs"  name="fisikParuassmedigdKet" id="fisikParuassmedigdKet" style="display:none;"> 
                <input type="radio" name="fisikParuassmedigd" id="fisikParuassmedigd2" onclick="document.getElementById('fisikParuassmedigdKet').style.display='none'" value="1" checked='true'>Normal
              </td>
            </tr>
            <tr>
              <td>
                THT
              </td>
              <td>
                <input type="radio" name="fisikThtassmedigd"  id="fisikThtassmedigd1" onclick="document.getElementById('fisikThtassmedigdKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs"  name="fisikThtassmedigdKet" id="fisikThtassmedigdKet" style="display:none;">
                <input type="radio" name="fisikThtassmedigd" id="fisikThtassmedigd2" onclick="document.getElementById('fisikThtassmedigdKet').style.display='none'" value="1" checked='true'>Normal
              </td>
              <td>
                Ambomen
              </td>
              <td>
                <input type="radio" name="fisikAbdomenassmedigd" id="fisikAbdomenassmedigd1" onclick="document.getElementById('fisikAbdomenassmedigdKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikAbdomenassmedigdKet" id="fisikAbdomenassmedigdKet" style="display:none;">
                <input type="radio" name="fisikAbdomenassmedigd" id="fisikAbdomenassmedigd2" onclick="document.getElementById('fisikAbdomenassmedigdKet').style.display='none'" value="1" checked='true'>Normal
              </td>
            </tr>
            <tr>
              <td>
                Leher
              </td>
              <td>
                <input type="radio" name="fisikLeherassmedigd" id="fisikLeherassmedigd1" onclick="document.getElementById('fisikLeherassmedigdKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikLeherassmedigdKet" id="fisikLeherassmedigdKet" style="display:none;">
                <input type="radio" name="fisikLeherassmedigd" id="fisikLeherassmedigd2" onclick="document.getElementById('fisikLeherassmedigdKet').style.display='none'" value="1" checked='true'>Normal
              </td>
              <td>
                Genitalia
              </td>
              <td>
                <input type="radio" name="fisikGenitaliaassmedigd" id="fisikGenitaliaassmedigd1" onclick="document.getElementById('fisikGenitaliaassmedigdKet').style.display='block'" value="2" >Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikGenitaliaassmedigdKet" id="fisikGenitaliaassmedigdKet" style="display:none;"> 
                <input type="radio" name="fisikGenitaliaassmedigd" id="fisikGenitaliaassmedigd2" onclick="document.getElementById('fisikGenitaliaassmedigdKet').style.display='none'" value="1" checked='true'>Normal
              </td>
            </tr>
            <tr>
              <td>
                Mulut
              </td>
              <td>
                <input type="radio" name="fisikMulutassmedigd" id="fisikMulutassmedigd1" onclick="document.getElementById('fisikMulutassmedigdKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikMulutassmedigdKet" id="fisikMulutassmedigdKet" style="display:none;">
                <input type="radio" name="fisikMulutassmedigd" id="fisikMulutassmedigd2" onclick="document.getElementById('fisikMulutassmedigdKet').style.display='none'" value="1" checked='true'>Normal
              </td>
              <td>
                Status Localis
              </td>
              <td>
                <textarea class="form-control" id="fisikStatusLocalisassmedigd"></textarea>
              </td>
            </tr>
            <tr>
              <td>
                Thorax
              </td>
              <td colspan="3">
                <input type="radio" name="fisikThoraxassmedigd" id="fisikThoraxassmedigd1" onclick="document.getElementById('fisikThoraxassmedigdKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs"  name="fisikThoraxassmedigdKet" id="fisikThoraxassmedigdKet" style="display:none;"><br>
                <input type="radio" name="fisikThoraxassmedigd" id="fisikThoraxassmedigd2" onclick="document.getElementById('fisikThoraxassmedigdKet').style.display='none'" value="1" checked='true'>Norma
              </td>
            </tr>
          </tbody>
        </table>
        <!-- /.form-group -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.card-body -->
</div>
<div class="card card-default" id="divprosedurterapirehabirja" style="display:none;"> 
  <div class="card-header" style="background-color:black;">
    <h3 class="card-title" style="color:white;">PROSEDUR TERAPI</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
      </button>
    </div>
  </div>

  <div class="card-body">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-default">
          <div class="card-header">
            <h4 class="card-title">Prosedur</h4>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive-md">
              <table class="table-sm" class="table table-striped table-sm choose" style="border-collapse: inherit;" style="border:solid;">
                <thead>
                  <th>
                    NO
                  </th>
                  <th>
                    Jenis Pemeriksaan
                  </th>
                </thead>
                <tbody id="tbodylistlaboratorium">
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <button type="button" class="btn btn-default" onclick="show_modalPermintaanLabIrja()">Tambah Prosedur</button><br>
      </div>
      <div class="col-md-6">
        <label>Anjuran</label>
        <textarea rows="3" name="dacrjrehabmedis_eanjuran" id="dacrjrehabmedis_eanjuran" style="width: 100%;" class="form-control"></textarea>
        <label>Evaluasi</label>
        <textarea rows="3" name="dacrjrehabmedis_eevaluasi" id="dacrjrehabmedis_eevaluasi" style="width: 100%;" class="form-control"></textarea>

        <label class="col-form-label font-weight-bold" title="suspek">Suspek Penyakit Akibat Kerja</label>

        <div class="form-group">
          <div class="row custom-control custom-checkbox custom-control-inline">
            <input onclick="document.getElementById('dacrjrehabmedis_div_esuspekId2').style.display='none'" name="dacrjrehabmedis_esuspekId" value="1" type="radio" class="custom-control-input" id="dacrjrehabmedis_esuspekId_1" checked>
            <label class="custom-control-label" for="dacrjrehabmedis_esuspekId_1">Tidak</label>
          </div>
        </div>
        <div class="form-group">
          <div class="row custom-control custom-checkbox custom-control-inline">
            <input onclick="document.getElementById('dacrjrehabmedis_div_esuspekId2').style.display='block'" name="dacrjrehabmedis_esuspekId" value="2" type="radio" class="custom-control-input" id="dacrjrehabmedis_esuspekId_2">
            <label class="custom-control-label" for="dacrjrehabmedis_esuspekId_2">Ya</label>
          </div>
        </div>
        <div class="row" id="dacrjrehabmedis_div_esuspekId2" style="display: none;">
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <textarea rows="2" name="dacrjrehabmedis_esuspekket" id="dacrjrehabmedis_esuspekket" style="width: 100%;" class="form-control"></textarea>
          </div>*
        </div>                
      </div>
    </div>
  </div>
</div>
<div class="card card-default" id="divkolaborasihemodialisairja" style="display:none;">
  <div class="card-header" style="background-color:black;">
    <h3 class="card-title" style="color:white;">KOLABORASI</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <div class="card-body">
    <div class="col-md-12 row" id="dacrjasesmenmedishd_kolaborasihdlist">
      <div class="col-md-12">
        <!-- <i class="fa fa-angle-right"></i> -->&nbsp;
        <label class="col-form-label" title="Program HD">Program HD</label>
      </div>
      <div class="col-md-4 row">
        <div class="form-group col-md-12">
          <div class="row custom-control custom-checkbox custom-control-inline">
            <input name="dacrjasesmenmedishd_kolaborasihdlist_1" value="1" type="checkbox" class="custom-control-input" id="dacrjasesmenmedishd_kolaborasihdlist_1">
            <label class="custom-control-label" for="dacrjasesmenmedishd_kolaborasihdlist_1">Pemberian Preparat Besi</label>
          </div>


        </div>
      </div>
      <div class="col-md-4 row">
        <div class="form-group col-md-12">
          <div class="row custom-control custom-checkbox custom-control-inline">
            <input name="dacrjasesmenmedishd_kolaborasihdlist_2" value="2" type="checkbox" class="custom-control-input" id="dacrjasesmenmedishd_kolaborasihdlist_2">
            <label class="custom-control-label" for="dacrjasesmenmedishd_kolaborasihdlist_2">Pemberian Antipiretik</label>
          </div>


        </div>
      </div>
      <div class="col-md-4 row">
        <div class="form-group col-md-12">
          <div class="row custom-control custom-checkbox custom-control-inline">
            <input name="dacrjasesmenmedishd_kolaborasihdlist_3" value="3" type="checkbox" class="custom-control-input" id="dacrjasesmenmedishd_kolaborasihdlist_3">
            <label class="custom-control-label" for="dacrjasesmenmedishd_kolaborasihdlist_3">Transfusi Darah</label>
          </div>
          <div class="row" id="dacrjasesmenmedishd_div_kolaborasihdlist3" style="display: none;">
            <div class="col-md-1"></div>
            <div class="col-md-10">
              <div class="input-group">
                <input type="number" onfocus="this.select();" class="form-control" id="dacrjasesmenmedishd_kolaborasihdlistket3"> <span class="input-group-append"> <span class="input-group-text">cc</span>
              </span>
            </div>
          </div>
          *
        </div>

      </div>
    </div>
    <div class="col-md-4 row">
      <div class="form-group col-md-12">
        <div class="row custom-control custom-checkbox custom-control-inline">
          <input name="dacrjasesmenmedishd_kolaborasihdlist_4" value="4" type="checkbox" class="custom-control-input" id="dacrjasesmenmedishd_kolaborasihdlist_4">
          <label class="custom-control-label" for="dacrjasesmenmedishd_kolaborasihdlist_4">Pemberian Erytopoetin</label>
        </div>


      </div>
    </div>
    <div class="col-md-4 row">
      <div class="form-group col-md-12">
        <div class="row custom-control custom-checkbox custom-control-inline">
          <input name="dacrjasesmenmedishd_kolaborasihdlist_5" value="5" type="checkbox" class="custom-control-input" id="dacrjasesmenmedishd_kolaborasihdlist_5">
          <label class="custom-control-label" for="dacrjasesmenmedishd_kolaborasihdlist_5">Pemberian Antibiotik</label>
        </div>


      </div>
    </div>
    <div class="col-md-4 row">
      <div class="form-group col-md-12">
        <div class="row custom-control custom-checkbox custom-control-inline">
          <input name="dacrjasesmenmedishd_kolaborasihdlist_6" value="6" type="checkbox" class="custom-control-input" id="dacrjasesmenmedishd_kolaborasihdlist_6">
          <label class="custom-control-label" for="dacrjasesmenmedishd_kolaborasihdlist_6">Pemberian Ca Gluconas</label>
        </div>


      </div>
    </div>
    <div class="col-md-4 row">
      <div class="form-group col-md-12">
        <div class="row custom-control custom-checkbox custom-control-inline">
          <input name="dacrjasesmenmedishd_kolaborasihdlist_7" value="7" type="checkbox" class="custom-control-input" id="dacrjasesmenmedishd_kolaborasihdlist_7">
          <label class="custom-control-label" for="dacrjasesmenmedishd_kolaborasihdlist_7">Obat-Obatan Emergensi</label>
        </div>


      </div>
    </div>
    <div class="col-md-4 row">
      <div class="form-group col-md-12">
        <div class="row custom-control custom-checkbox custom-control-inline">
          <input name="dacrjasesmenmedishd_kolaborasihdlist_8" value="8" type="checkbox" class="custom-control-input" id="dacrjasesmenmedishd_kolaborasihdlist_8">
          <label class="custom-control-label" for="dacrjasesmenmedishd_kolaborasihdlist_8">Analgetik</label>
        </div>


      </div>
    </div>
    <div class="col-md-4 row">
      <div class="form-group col-md-12">
        <div class="row custom-control custom-checkbox custom-control-inline">
          <input  name="dacrjasesmenmedishd_kolaborasihdlist_9" value="9" type="checkbox" class="custom-control-input" id="dacrjasesmenmedishd_kolaborasihdlist_9">
          <label class="custom-control-label" for="dacrjasesmenmedishd_kolaborasihdlist_9">Lain-Lain</label>
        </div>

        <div class="row" id="dacrjasesmenmedishd_div_kolaborasihdlist9" >
          <div class="col-md-1">
          </div>
          <div class="col-md-10">
            <input type="text" name="dacrjasesmenmedishd_kolaborasihdlain" id="dacrjasesmenmedishd_kolaborasihdlain" style="width:100%;" class="form-control">
          </div>*
        </div>
      </div>
    </div>
  </div>
</div>
</div> 
<div class="card card-default" id="divinstruksimedikhemodialisairja" style="display:none;">
  <div class="card-header" style="background-color:black;">
    <h3 class="card-title" style="color:white;"> INTRUKSI MEDIK</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <div class="card-body">  
    <div class="col-md-12 row">
      <div class="card-body">
        <div class="form-group row">
          <div class="col-md-2">
            <label class="col-form-label" title="resep hd">Resep HD</label>
          </div>
          <div class="col-md-10">
            <div class="row" id="dacrjasesmenmedishd_resephd">
              <div class="col-md-3">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dacrjasesmenmedishd_resephd" value="1" type="radio" class="custom-control-input" id="dacrjasesmenmedishd_resephd_1" checked>
                    <label class="custom-control-label" for="dacrjasesmenmedishd_resephd_1">Inisiasi</label>
                  </div>
                  
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dacrjasesmenmedishd_resephd" value="2" type="radio" class="custom-control-input" id="dacrjasesmenmedishd_resephd_2">
                    <label class="custom-control-label" for="dacrjasesmenmedishd_resephd_2">Akut</label>
                  </div>
                  
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dacrjasesmenmedishd_resephd" value="3" type="radio" class="custom-control-input" id="dacrjasesmenmedishd_resephd_3">
                    <label class="custom-control-label" for="dacrjasesmenmedishd_resephd_3">Rutin</label>
                  </div>
                  
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dacrjasesmenmedishd_resephd" value="4" type="radio" class="custom-control-input" id="dacrjasesmenmedishd_resephd_4">
                    <label class="custom-control-label" for="dacrjasesmenmedishd_resephd_4">Pre-OP</label>
                  </div>
                  
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dacrjasesmenmedishd_resephd" value="5" type="radio" class="custom-control-input" id="dacrjasesmenmedishd_resephd_5">
                    <label class="custom-control-label" for="dacrjasesmenmedishd_resephd_5">SLED</label>
                  </div>
                  
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="dacrjasesmenmedishd_resephd" value="6" type="radio" class="custom-control-input" id="dacrjasesmenmedishd_resephd_6">
                    <label class="custom-control-label" for="dacrjasesmenmedishd_resephd_6">Lain-Lain</label>
                  </div>
                  <div class="row" id="dacrjasesmenmedishd_div_resephd6" style="display:none;">
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-10">
                      <input type="text" name="dacrjasesmenmedishd_resephdlain" id="dacrjasesmenmedishd_resephdlain" style="width:100%;" class="form-control">
                    </div>*
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <br>
        <div class="form-group row">
          <div class="col-md-2">
            <label class="col-form-label" title="dialisat">Dialisat</label>
          </div>
          <div class="col-md-10 row">
            <div class="col-md-3">
              <div class="form-group">
                <div class="row custom-control custom-checkbox custom-control-inline">
                  <input name="dacrjasesmenmedishd_dialisat" value="1" type="radio" class="custom-control-input" id="dacrjasesmenmedishd_dialisat_1" checked> <label class="custom-control-label" for="dacrjasesmenmedishd_dialisat_1">Asetat</label>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <div class="row custom-control custom-checkbox custom-control-inline">
                  <input name="dacrjasesmenmedishd_dialisat" value="2" type="radio" class="custom-control-input" id="dacrjasesmenmedishd_dialisat_2"> <label class="custom-control-label" for="dacrjasesmenmedishd_dialisat_2">Bicarbonat</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <br>
        <div class="form-group row">
          <div class="col-md-2">
            <label class="col-form-label" title="Profiling">Prog.Profiling</label><input type="hidden" id="dacrjasesmenmedishd_pprofiling" value="0">
          </div>
          <div class="col-md-10 row">
            <div class="col-md-3">
              <div class="form-group">
                <div class="row custom-control custom-checkbox custom-control-inline">
                  <input name="dacrjasesmenmedishd_pprofilinglist" value="1" type="checkbox" class="custom-control-input" id="dacrjasesmenmedishd_pprofilinglist_1" checked>
                  <label class="custom-control-label" for="dacrjasesmenmedishd_pprofilinglist_1">Na</label>
                </div>
                <div class="row" id="dacrjasesmenmedishd_div_pprofilinglist1" style="display: none;">
                  <div class="col-md-12">
                    <textarea rows="2" name="dacrjasesmenmedishd_pprofilinglistket1" id="dacrjasesmenmedishd_pprofilinglistket1" style="width: 100%;" class="form-control mt-1"></textarea>
                  </div>
                  *
                </div>
                
                
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <div class="row custom-control custom-checkbox custom-control-inline">
                  <input name="dacrjasesmenmedishd_pprofilinglist" value="2" type="checkbox" class="custom-control-input" id="dacrjasesmenmedishd_pprofilinglist_2">
                  <label class="custom-control-label" for="dacrjasesmenmedishd_pprofilinglist_2">Conductivity</label>
                </div>
                
                <div class="row" id="dacrjasesmenmedishd_div_pprofilinglist2" style="display: none;">
                  <div class="col-md-12">
                    <textarea rows="2" name="dacrjasesmenmedishd_pprofilinglistket2" id="dacrjasesmenmedishd_pprofilinglistket2" style="width: 100%;" class="form-control mt-1"></textarea>
                  </div>
                  *
                </div>
                
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <div class="row custom-control custom-checkbox custom-control-inline">
                  <input name="dacrjasesmenmedishd_pprofilinglist" value="3" type="checkbox" class="custom-control-input" id="dacrjasesmenmedishd_pprofilinglist_3">
                  <label class="custom-control-label" for="dacrjasesmenmedishd_pprofilinglist_3">Bicarbonat</label>
                </div>
                
                
                
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <div class="row custom-control custom-checkbox custom-control-inline">
                  <input name="dacrjasesmenmedishd_pprofilinglist" value="4" type="checkbox" class="custom-control-input" id="dacrjasesmenmedishd_pprofilinglist_4">
                  <label class="custom-control-label" for="dacrjasesmenmedishd_pprofilinglist_4">Temperatur</label>
                </div>
                
                
                <div class="row" id="dacrjasesmenmedishd_div_pprofilinglist4" style="display: none;">
                  <div class="col-md-12">
                    <div class="input-group">
                      <input type="number" onfocus="this.select();" class="form-control" id="dacrjasesmenmedishd_pprofilinglistket4"> <span class="input-group-append"> <span class="input-group-text">°C</span>
                    </span>
                  </div>
                </div>
                *
              </div>
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="form-group row">
        <div class="col-md-2">
          <label class="col-form-label" title="heparinisasi">Heparinisasi</label><input type="hidden" id="dacrjasesmenmedishd_heparinisasi" value="0">
        </div>
        <div class="col-md-10 row">
          <div class="col-md-3">
            <div class="form-group">
              <div class="row custom-control custom-checkbox custom-control-inline">
                <input name="dacrjasesmenmedishd_heparinisasilist" value="1" type="checkbox" class="custom-control-input" id="dacrjasesmenmedishd_heparinisasilist_1" checked>
                <label class="custom-control-label" for="dacrjasesmenmedishd_heparinisasilist_1">Dosis Sirkulasi</label>
              </div>
              <div class="row" id="dacrjasesmenmedishd_div_heparinisasilist1" style="display: none;">
                <div class="col-md-12">
                  <div class="input-group">
                    <input type="number" onfocus="this.select();" class="form-control" id="dacrjasesmenmedishd_heparinisasilistket1"> <span class="input-group-append"> <span class="input-group-text">iu</span>
                  </span>
                </div>
              </div>
              *
            </div>






          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <div class="row custom-control custom-checkbox custom-control-inline">
              <input name="dacrjasesmenmedishd_heparinisasilist" value="2" type="checkbox" class="custom-control-input" id="dacrjasesmenmedishd_heparinisasilist_2">
              <label class="custom-control-label" for="dacrjasesmenmedishd_heparinisasilist_2">Dosis Awal</label>
            </div>

            <div class="row" id="dacrjasesmenmedishd_div_heparinisasilist2" style="display: none;">
              <div class="col-md-12">
                <div class="input-group">
                  <input type="number" onfocus="this.select();" class="form-control" id="dacrjasesmenmedishd_heparinisasilistket2"> <span class="input-group-append"> <span class="input-group-text">iu</span>
                </span>
              </div>
            </div>
            *
          </div>





        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <div class="row custom-control custom-checkbox custom-control-inline">
            <input name="dacrjasesmenmedishd_heparinisasilist" value="3" type="checkbox" class="custom-control-input" id="dacrjasesmenmedishd_heparinisasilist_3">
            <label class="custom-control-label" for="dacrjasesmenmedishd_heparinisasilist_3">Dosis Maintenance</label>
          </div>


          <div class="row" id="dacrjasesmenmedishd_div_heparinisasilist3" style="display: none;">
            <div class="col-md-12">
              <div class="input-group">
                <input type="number" onfocus="this.select();" class="form-control" id="dacrjasesmenmedishd_heparinisasilistket3"> <span class="input-group-append"> <span class="input-group-text">unit</span>
              </span>
            </div>
          </div>
          *
        </div>




      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <div class="row custom-control custom-checkbox custom-control-inline">
          <input name="dacrjasesmenmedishd_heparinisasilist" value="4" type="checkbox" class="custom-control-input" id="dacrjasesmenmedishd_heparinisasilist_4">
          <label class="custom-control-label" for="dacrjasesmenmedishd_heparinisasilist_4">Continue</label>
        </div>



        <div class="row" id="dacrjasesmenmedishd_div_heparinisasilist4" style="display: none;">
          <div class="col-md-12">
            <div class="input-group">
              <input type="number" onfocus="this.select();" class="form-control" id="dacrjasesmenmedishd_heparinisasilistket4"> <span class="input-group-append"> <span class="input-group-text">iu/Jam</span>
            </span>
          </div>
        </div>
        *
      </div>



    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
      <div class="row custom-control custom-checkbox custom-control-inline">
        <input name="dacrjasesmenmedishd_heparinisasilist" value="5" type="checkbox" class="custom-control-input" id="dacrjasesmenmedishd_heparinisasilist_5">
        <label class="custom-control-label" for="dacrjasesmenmedishd_heparinisasilist_5">Intermitten</label>
      </div>




      <div class="row" id="dacrjasesmenmedishd_div_heparinisasilist5" style="display: none;">
        <div class="col-md-12">
          <div class="input-group">
            <input type="number" onfocus="this.select();" class="form-control" id="dacrjasesmenmedishd_heparinisasilistket5"> <span class="input-group-append"> <span class="input-group-text">iu/jam</span>
          </span>
        </div>
      </div>
      *
    </div>


  </div>
</div>
<div class="col-md-3">
  <div class="form-group">
    <div class="row custom-control custom-checkbox custom-control-inline">
      <input name="dacrjasesmenmedishd_heparinisasilist" value="6" type="checkbox" class="custom-control-input" id="dacrjasesmenmedishd_heparinisasilist_6">
      <label class="custom-control-label" for="dacrjasesmenmedishd_heparinisasilist_6">LMWH</label>
    </div>





    <div class="row" id="dacrjasesmenmedishd_div_heparinisasilist6" style="display: none;">
      <div class="col-md-12">
        <textarea rows="2" name="dacrjasesmenmedishd_heparinisasilistket6" id="dacrjasesmenmedishd_heparinisasilistket6" style="width: 100%;" class="form-control mt-1"></textarea>
      </div>
      *
    </div>

  </div>
</div>
<div class="col-md-3">
  <div class="form-group">
    <div class="row custom-control custom-checkbox custom-control-inline">
      <input name="dacrjasesmenmedishd_heparinisasilist" value="7" type="checkbox" class="custom-control-input" id="dacrjasesmenmedishd_heparinisasilist_7">
      <label class="custom-control-label" for="dacrjasesmenmedishd_heparinisasilist_7">Tanpa Heparin,Penyebab</label>
    </div>






    <div class="row" id="dacrjasesmenmedishd_div_heparinisasilist7" style="display: none;">
      <div class="col-md-12">
        <textarea rows="2" name="dacrjasesmenmedishd_heparinisasilistket7" id="dacrjasesmenmedishd_heparinisasilistket7" style="width: 100%;" class="form-control mt-1"></textarea>
      </div>
      *
    </div>
  </div>
</div>
<div class="col-md-3">
  <div class="form-group">
    <div class="row custom-control custom-checkbox custom-control-inline">
      <input name="dacrjasesmenmedishd_heparinisasilist" value="8" type="checkbox" class="custom-control-input" id="dacrjasesmenmedishd_heparinisasilist_8">
      <label class="custom-control-label" for="dacrjasesmenmedishd_heparinisasilist_8">Program Bilas NaCL 0.9% 100 cc/jam1/2</label>
    </div>







  </div>
</div>
</div>
</div>
<br>
<div class="form-group row">
  <div class="col-md-6">
    <div class="form-group row">
      <div class="col-md-4">
        <label class="col-form-label" title="UFG">UFG</label>
      </div>
      <div class="col-md-0">&nbsp;&nbsp;</div>
      <div class="col-md-6">
        <div class="input-group">
          <input type="number" onfocus="this.select();" class="form-control" id="dacrjasesmenmedishd_ufg">
          <span class="input-group-append">
            <span class="input-group-text">cc</span>
          </span>
        </div>
      </div>
    </div>        
    <div class="form-group row">
      <div class="col-md-4">
        <label class="col-form-label" title="Qb">QB</label>
      </div>
      <div class="col-md-0">&nbsp;&nbsp;</div>
      <div class="col-md-6">
        <div class="input-group">
          <input type="number" onfocus="this.select();" class="form-control" id="dacrjasesmenmedishd_qb">
          <span class="input-group-append">
            <span class="input-group-text">ml/Menit</span>
          </span>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-4">
        <label class="col-form-label" title="Qb">QD</label>
      </div>
      <div class="col-md-0">&nbsp;&nbsp;</div>
      <div class="col-md-6">
        <div class="input-group">
          <input type="number" onfocus="this.select();" class="form-control" id="dacrjasesmenmedishd_qd">
          <span class="input-group-append">
            <span class="input-group-text">ml/Menit</span>
          </span>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-4">
        <label class="col-form-label" title="Ureum">UREUM</label>
      </div>
      <div class="col-md-0">&nbsp;&nbsp;</div>
      <div class="col-md-6">
        <div class="input-group">
          <span class="input-group-append">
            <span class="input-group-text">PRE</span>
          </span>
          <input type="number" onfocus="this.select();" class="form-control" id="dacrjasesmenmedishd_ureumpre" onkeyup="dacrjasesmenmedishdex.onChangeURR();">
          <span class="input-group-append">
            <span class="input-group-text">POST</span>
          </span>
          <input type="number" onfocus="this.select();" class="form-control" id="dacrjasesmenmedishd_ureumpost" onkeyup="dacrjasesmenmedishdex.onChangeURR();">
        </div>
      </div>
    </div>                        
  </div>
  <div class="col-md-6">
    <div class="form-group row">
      <div class="col-md-4">
        <label class="col-form-label" title="Frekuensi">Frekuensi</label>
      </div>
      <div class="col-md-0">&nbsp;&nbsp;</div>
      <div class="col-md-6">
        <div class="input-group">
          <input type="number" onfocus="this.select();" class="form-control" id="dacrjasesmenmedishd_frekuensi">
          <span class="input-group-append">
            <span class="input-group-text">x/Minggu</span>
          </span>
        </div>
      </div>
    </div>  
    <div class="form-group row">
      <div class="col-md-4">
        <label class="col-form-label" title="Durasi HD">Time Dialisis</label>
      </div>
      <div class="col-md-0">&nbsp;&nbsp;</div>
      <div class="col-md-3">
        <div class="input-group">
          <input type="number" onfocus="this.select();" class="form-control" id="dacrjasesmenmedishd_urasihd" onkeyup="dacrjasesmenmedishdex.onChangeUFG();">
          <span class="input-group-append">
            <span class="input-group-text">Jam</span>
          </span>
        </div>
      </div>
      <div class="col-md-3">
        <div class="input-group">
          <input type="number" onfocus="this.select();" class="form-control" id="dacrjasesmenmedishd_urasihdmenit" onkeyup="dacrjasesmenmedishdex.onChangeUFG();">
          <span class="input-group-append">
            <span class="input-group-text">Menit</span>
          </span>
        </div>
      </div>                    
    </div>  
    <div class="form-group row">
      <div class="col-md-4">
        <label class="col-form-label" title="UFR">UFR</label>
      </div>
      <div class="col-md-0">&nbsp;&nbsp;</div>
      <div class="col-md-6">
        <div class="input-group">
          <input type="number" onfocus="this.select();" class="form-control" id="dacrjasesmenmedishd_ufr" onkeyup="dacrjasesmenmedishdex.onChangeUFG();">
          <span class="input-group-append">
            <span class="input-group-text">cc/Jam</span>
          </span>
        </div>
      </div>
    </div>                              
    <div class="form-group row">
      <div class="col-md-4">
        <label class="col-form-label" title="URR">URR</label>
      </div>
      <div class="col-md-0">&nbsp;&nbsp;</div>
      <div class="col-md-6">
        <div class="input-group">
          <input type="number" onfocus="this.select();" class="form-control" id="dacrjasesmenmedishd_urr">
          <span class="input-group-append">
            <span class="input-group-text">%</span>
          </span>
        </div>              
      </div>
    </div>            
  </div>
</div>
</div>
</div>
</div>
</div> 
<div class="card card-default" id="divmedikasidialisishemodialisisirja" style="display:none;">
  <div class="card-header" style="background-color:black;">
    <h3 class="card-title" style="color:white;">Medikasi Dialisis</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <div class="card-body"> 
    <div class="col-md-12 row">
      <div class="card-body">
        <div class="row ">
          <div class="col-md-12">
            <div class="form-group row">
              <div class="col-md-12">
                <textarea rows="8" name="dacrjasesmenmedishd_obatin" id="dacrjasesmenmedishd_obatin" style="width: 100%;" class="form-control "></textarea>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="card card-default" id="divriwayatobstetrikobgynirja" style="display:none;">
  <div class="card-header" style="background-color:black;">
    <h3 class="card-title" style="color:white;">RIWAYAT OBSTETRIK - (G : 0 P : 0 A : 0)</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <div class="card-body">
   <div class="col-md-12">
    <div class="card card-default">
      <div class="card-header">
        <h4 class="card-title">Permintaan Laboratorium</h4>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive-md">
          <table class="table-sm">
            <thead>
              <th>
                ACT
              </th>
              <th>
                Id
              </th>
              <th>
                Validasi
              </th>
              <th>
                Tanggal
              </th>
              <th>
                Dokter Pengirim
              </th>
              <th>
                Dokter PJ
              </th>
            </thead>
            <tbody>
              <td>
              </td>
              <td>
              </td>
              <td>
              </td>
              <td>
              </td>
              <td>
              </td>
              <td>
              </td>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
  <div class="col-md-12">
    <div class="card card-default">
      <div class="card-header">
        <h4 class="card-title">Permintaan Laboratorium</h4>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive-md">
          <table class="table-sm">
            <thead>
              <th>
                ACT
              </th>
              <th>
                Id
              </th>
              <th>
                Validasi
              </th>
              <th>
                Tanggal
              </th>
              <th>
                Dokter Pengirim
              </th>
              <th>
                Dokter PJ
              </th>
            </thead>
            <tbody>
              <td>
              </td>
              <td>
              </td>
              <td>
              </td>
              <td>
              </td>
              <td>
              </td>
              <td>
              </td>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</div>
</div>

<div class="card card-default" id="divstatusobgynirja" style="display:none;">
  <div class="card-header" style="background-color:black;">
    <h3 class="card-title" style="color:white;">STATUS OBGYN</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <div class="card-body">
    <div class="row" id="dacrjasesmenmtmedis_obgId">
      <div class="col-md-2">
        <div class="form-group">
          <div class="row custom-control custom-checkbox custom-control-inline">
            <input checked name="dacrjasesmenmtmedis_obgId" value="1" type="radio" class="custom-control-input" id="dacrjasesmenmtmedis_obgId_1"> <label class="custom-control-label" for="dacrjasesmenmtmedis_obgId_1" onclick="document.getElementById('dacrjasesmenmtmedis_div_obgId2').style.display='none'">Tidak Dilakukan</label>
          </div>
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <div class="row custom-control custom-checkbox custom-control-inline">
            <input name="dacrjasesmenmtmedis_obgId" value="2" type="radio" class="custom-control-input" id="dacrjasesmenmtmedis_obgId_2"> <label class="custom-control-label" for="dacrjasesmenmtmedis_obgId_2"  onclick="document.getElementById('dacrjasesmenmtmedis_div_obgId2').style.display='block'">Dilakukan</label>
          </div>
        </div>
      </div>
    </div>
    <div id="dacrjasesmenmtmedis_div_obgId2" style="" class="mt-1 border rounded p-3">
      <div class="row ">
        <div class="col-md-12">
          <div class="form-group row">
            <div class="col-md-2">
              <div class="input-group">
                <label class="col-form-label">1. TFU : </label>
                <input type="number" onfocus="this.select();" class="form-control" id="dacrjasesmenmtmedis_otfu">
                <span class="input-group-append">
                  <span class="input-group-text">Cm</span>
                </span>
              </div>
            </div>
            <div class="col-md-0">      </div>
            <div class="col-md-2">
              <div class="input-group">
                <label class="col-form-label">2. LILA : </label>
                <input type="number" onfocus="this.select();" class="form-control" id="dacrjasesmenmtmedis_olila">
                <span class="input-group-append">
                  <span class="input-group-text">Cm</span>
                </span>
              </div>
            </div>
            <div class="col-md-0">      </div>
            <div class="col-md-4">
              <div class="input-group">
                <label class="col-form-label">3. HIS : </label>
                <input type="number" onfocus="this.select();" class="form-control" id="dacrjasesmenmtmedis_ohis">
                <span class="input-group-append">
                  <span class="input-group-text">x per 10 menit - Lama</span>
                </span>
                <input type="number" onfocus="this.select();" class="form-control" id="dacrjasesmenmtmedis_ohislama">
                <span class="input-group-append">
                  <span class="input-group-text">detik</span>
                </span>
              </div>
            </div>
            <div class="col-md-0">      </div>
            <div class="col-md-2">
              <div class="input-group">
                <label class="col-form-label">4. DJJ : </label>
                <input type="number" onfocus="this.select();" class="form-control" id="dacrjasesmenmtmedis_odjj">
                <span class="input-group-append">
                  <span class="input-group-text">x/menit</span>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row ">
        <div class="col-md-6">
          <div class="form-group row">
            <div class="col-md-12">
              <div class="form-group">
                <div class="custom-control custom-checkbox">
                  <input checked name="iainspekulo" type="checkbox" onclick="document.getElementById('dacrjasesmenmtmedis_div_oinspekulo').style.display='block'" class="custom-control-input" id="dacrjasesmenmtmedis_oinspekulo">
                  <label class="custom-control-label" for="dacrjasesmenmtmedis_oinspekulo">5. Inspekulo</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group row" id="dacrjasesmenmtmedis_div_oinspekulo" style="display:none;">
            <div class="col-md-12">
              <div class="form-group row">
                <div class="col-md-4">
                  <!-- <i class="fa fa-chevron-right"></i> -->
                  <label class="col-form-label">Vulva/ Vagina</label>
                </div>
                <div class="col-md-7">
                  <textarea rows="2" id="dacrjasesmenmtmedis_ovulva" style="width:100%;" class="form-control"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <!-- <i class="fa fa-chevron-right"></i> -->
                  <label class="col-form-label">Portio</label>
                </div>
                <div class="col-md-7">
                  <textarea rows="2" id="dacrjasesmenmtmedis_oportio" style="width:100%;" class="form-control"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <!-- <i class="fa fa-chevron-right"></i> -->
                  <label class="col-form-label">Corpus Uteri</label>
                </div>
                <div class="col-md-7">
                  <textarea rows="2" id="dacrjasesmenmtmedis_ocorpus" style="width:100%;" class="form-control"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <!-- <i class="fa fa-chevron-right"></i> -->
                  <label class="col-form-label">Kanan/ Kiri Uterus (Parametrium)</label>
                </div>
                <div class="col-md-7">
                  <textarea rows="2" id="dacrjasesmenmtmedis_oparametrium" style="width:100%;" class="form-control"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <!-- <i class="fa fa-chevron-right"></i> -->
                  <label class="col-form-label">Cavum douglas</label>
                </div>
                <div class="col-md-7">
                  <textarea rows="2" id="dacrjasesmenmtmedis_ocavum" style="width:100%;" class="form-control"></textarea>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <div class="col-md-12">
              <div class="form-group">
                <div class="custom-control custom-checkbox">
                  <input checked name="iaperiksadalam" id="iaperiksadalam" type="checkbox" class="custom-control-input" id="dacrjasesmenmtmedis_operiksadalam" onclick="document.getElementById('dacrjasesmenmtmedis_div_operiksadalam').style.display='block'">
                  <label class="custom-control-label" for="dacrjasesmenmtmedis_operiksadalam">6. Pemeriksan dalam</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group row" id="dacrjasesmenmtmedis_div_operiksadalam" style="display:none;">
            <div class="col-md-12">
              <div class="form-group row">
                <div class="col-md-4">
                  <!-- <i class="fa fa-chevron-right"></i> -->
                  <label class="col-form-label">Vulva/ Vagina</label>
                </div>
                <div class="col-md-7">
                  <textarea rows="2" id="dacrjasesmenmtmedis_ovulvadalam" style="width:100%;" class="form-control"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <!-- <i class="fa fa-chevron-right"></i> -->
                  <label class="col-form-label">Portio</label>
                </div>
                <div class="col-md-7">
                  <textarea rows="2" id="dacrjasesmenmtmedis_oportiodalam" style="width:100%;" class="form-control"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <!-- <i class="fa fa-chevron-right"></i> -->
                  <label class="col-form-label">Pembukaan</label>
                </div>
                <div class="col-md-7">
                  <input type="number" onfocus="this.select();" class="form-control" id="dacrjasesmenmtmedis_opembukaan">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <!-- <i class="fa fa-chevron-right"></i> -->
                  <label class="col-form-label">Hodge</label>
                </div>
                <div class="col-md-7">
                  <input type="number" onfocus="this.select();" class="form-control" id="dacrjasesmenmtmedis_ohodge">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <!-- <i class="fa fa-chevron-right"></i> -->
                  <label class="col-form-label">Presentasi Janin</label>
                </div>
                <div class="col-md-7">
                  <textarea rows="2" id="dacrjasesmenmtmedis_opresentasi" style="width:100%;" class="form-control"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <!-- <i class="fa fa-chevron-right"></i> -->
                  <label class="col-form-label">Ketuban</label>
                </div>
                <div class="col-md-7">
                  <textarea rows="2" id="dacrjasesmenmtmedis_oketuban" style="width:100%;" class="form-control"></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="card card-default" id="divpemeriksaanmatairja" style="display:none;">
  <div class="card-header" style="background-color:black;">
    <h3 class="card-title" style="color:white;">PEMERIKSAAN MATA</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group row">
          <div class="col-md-12">
            <label class="col-form-label font-weight-bold">Ukuran Kacamata Lama</label>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-2">
            <label class="col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; OD</label>
          </div>
          <div class="col-md-10">
            <input type="text" name="dacrjasesmenmatmedis_mod" id="dacrjasesmenmatmedis_mod" class="form-control">
          </div>
        </div>  
        <div class="form-group row">
          <div class="col-md-2">
            <label class="col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; OS</label>
          </div>
          <div class="col-md-10">
            <input type="text" name="dacrjasesmenmatmedis_mos" id="dacrjasesmenmatmedis_mos" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-2">
            <label class="col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Adisi</label>
          </div>
          <div class="col-md-10">
            <input type="text" name="dacrjasesmenmatmedis_madisi" id="dacrjasesmenmatmedis_madisi" class="form-control">
          </div>
        </div>                                   
      </div>      
      <div class="col-md-6">
        <div class="form-group row">
          <div class="col-md-12">
            <label class="col-form-label font-weight-bold">AV OD</label>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-12">
            <textarea rows="4" name="dacrjasesmenmatmedis_mavod" id="dacrjasesmenmatmedis_mavod" style="width:100%;" class="form-control"></textarea>
          </div>
        </div>  
        <div class="form-group row">
          <div class="col-md-12">
            <label class="col-form-label font-weight-bold">AV OS</label>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-12">
            <textarea rows="4" name="dacrjasesmenmatmedis_mavos" id="dacrjasesmenmatmedis_mavos" style="width:100%;" class="form-control"></textarea>
          </div>
        </div>                
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
       <div class="form-group row" style="padding-top: 3px;">
         <div class="col-md-2">
          <label class="col-form-label font-weight-bold" title="ishihara">Tes Ishihara</label>
        </div>            
        <div class="col-md-10">
          <div class="row" id="dacrjasesmenmatmedis_mishiharaId">
            <div class="col-md-4">
              <div class="form-group">
                <div class="row custom-control custom-checkbox custom-control-inline">
                  <input checked name="dacrjasesmenmatmedis_mishiharaId" value="1" type="radio" class="custom-control-input" id="dacrjasesmenmatmedis_mishiharaId_1">
                  <label class="custom-control-label" for="dacrjasesmenmatmedis_mishiharaId_1">Tidak dilakukan</label>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <div class="row custom-control custom-checkbox custom-control-inline">
                  <input name="dacrjasesmenmatmedis_mishiharaId" value="2" type="radio" class="custom-control-input" id="dacrjasesmenmatmedis_mishiharaId_2">
                  <label class="custom-control-label" for="dacrjasesmenmatmedis_mishiharaId_2">Red green deficiencies</label>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <div class="row custom-control custom-checkbox custom-control-inline">
                  <input name="dacrjasesmenmatmedis_mishiharaId" value="3" type="radio" class="custom-control-input" id="dacrjasesmenmatmedis_mishiharaId_3">
                  <label class="custom-control-label" for="dacrjasesmenmatmedis_mishiharaId_3">Absolute color blindness</label>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <div class="row custom-control custom-checkbox custom-control-inline">
                  <input name="dacrjasesmenmatmedis_mishiharaId" value="4" type="radio" class="custom-control-input" id="dacrjasesmenmatmedis_mishiharaId_4">
                  <label class="custom-control-label" for="dacrjasesmenmatmedis_mishiharaId_4">Normal</label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> 
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group row">
        <div class="col-md-2">
          <label class="col-form-label font-weight-bold">Schimer Test</label>
        </div>
        <div class="col-md-10">
          <div class="row">
            <div class="col-md-4">              
              <div class="form-group">          
                <div class="custom-control custom-checkbox custom-control-inline">
                  <input name="mschimerc" id="dacrjasesmenmatmedis_mschimerc" type="checkbox" class="custom-control-input">
                  <label class="custom-control-label" for="dacrjasesmenmatmedis_mschimerc">Dilakukan</label>
                </div>
              </div>
            </div>  
          </div>            
        </div>                  
      </div>
      <div class="form-group row" id="dacrjasesmenmatmedis_divmschimer1" style="display: none;">
        <div class="col-md-2">
          <label class="col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; OD</label>
        </div>
        <div class="col-md-10">
          <input type="text" name="dacrjasesmenmatmedis_mschimer1" id="dacrjasesmenmatmedis_mschimer1" class="form-control">
        </div>
      </div>  
      <div class="form-group row" id="dacrjasesmenmatmedis_divmschimer2" style="display: none;">
        <div class="col-md-2">
          <label class="col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; OS</label>
        </div>
        <div class="col-md-10">
          <input type="text" name="dacrjasesmenmatmedis_mschimer2" id="dacrjasesmenmatmedis_mschimer2" class="form-control">
        </div>
      </div>
    </div>      
  </div>
</div>
</div> 
<div class="card card-default" id="divevaluasihd" style="display:none;">
  <div class="card-header" style="background-color:black;">
    <h3 class="card-title" style="color:white;">EVALUASI</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <div class="card-body">
    <div class="row">  
      <div class="col-md-12">                      
        <textarea class="form-control" id="Evaluasiermigd"></textarea>
      </div>                   
    </div>
  </div>
</div>               
<div class="card card-default" id="divpemeriksaanmulutgigiirja" style="display:none;">
  <div class="card-header" style="background-color:black;">
    <h3 class="card-title" style="color:white;">PEMERIKSAAN MULUT & GIGI</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <div class="card-body">
    <div class="row ">
      <div class="col-md-12">
        <div class="form-group row" style="padding-bottom: 3px; padding-top: 3px; border-bottom-style: solid; border-bottom-width: thin;">
          <div class="col-md-2">
            <!-- <i class="fa fa-angle-right"></i> -->&nbsp; <label class="col-form-label"> Lidah</label>
          </div>
          <div class="col-md-10">
            <textarea id="dacrjasesmengigmedis_glidahket" id="dacrjasesmengigmedis_glidahket" class="form-control form-control-sm"></textarea>
          </div>
        </div>
        <div class="form-group row" style="padding-bottom: 3px; padding-top: 3px; border-bottom-style: solid; border-bottom-width: thin;">
          <div class="col-md-2">
            <!-- <i class="fa fa-angle-right"></i> -->&nbsp; <label class="col-form-label"> Mukosa Pipi</label>
          </div>
          <div class="col-md-10">
            <textarea id="dacrjasesmengigmedis_gmukosapipi" name="dacrjasesmengigmedis_gmukosapipi" class="form-control form-control-sm"></textarea>
          </div>
        </div>
        <div class="form-group row" style="padding-bottom: 3px; padding-top: 3px; border-bottom-style: solid; border-bottom-width: thin;">
          <div class="col-md-2">
            <!-- <i class="fa fa-angle-right"></i> -->&nbsp; <label class="col-form-label"> Oklusi</label>
          </div>
          <div class="col-md-10">
            <div class="row" id="dacrjasesmengigmedis_goklusiId">
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row ">
                    <input name="dacrjasesmengigmedis_goklusiId" value="1" type="radio"  checked> <label class="form-label" >Normal Bite</label>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row ">
                    <input name="dacrjasesmengigmedis_goklusiId" value="2" type="radio"  id="dacrjasesmengigmedis_goklusiId_2"> <label class="form-label" >Cross Bite</label>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row ">
                    <input name="dacrjasesmengigmedis_goklusiId" value="3" type="radio"  id="dacrjasesmengigmedis_goklusiId_3"> <label class="form-label" >Deep Bite</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row" style="padding-bottom: 3px; padding-top: 3px; border-bottom-style: solid; border-bottom-width: thin;">
          <div class="col-md-2">
            <!-- <i class="fa fa-angle-right"></i> -->&nbsp; <label class="col-form-label"> Torus Palatinus</label>
          </div>
          <div class="col-md-10">
            <div class="row" id="dacrjasesmengigmedis_gtorus1Id">
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row ">
                    <input checked name="dacrjasesmengigmedis_gtorus1Id" value="1" type="radio"  id="dacrjasesmengigmedis_gtorus1Id_1"> <label class="form-label" >Tidak Ada</label>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row ">
                    <input name="dacrjasesmengigmedis_gtorus1Id" value="2" type="radio"  id="dacrjasesmengigmedis_gtorus1Id_2"> <label class="form-label" >Kecil</label>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row ">
                    <input name="dacrjasesmengigmedis_gtorus1Id" value="3" type="radio"  id="dacrjasesmengigmedis_gtorus1Id_3"> <label class="form-label" >Sedang</label>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row ">
                    <input name="dacrjasesmengigmedis_gtorus1Id" value="4" type="radio"  id="dacrjasesmengigmedis_gtorus1Id_4"> <label class="form-label" >Besar</label>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row ">
                    <input name="dacrjasesmengigmedis_gtorus1Id" value="5" type="radio"  id="dacrjasesmengigmedis_gtorus1Id_5"> <label class="form-label" for="dacrjasesmengigmedis_gtorus1Id_5">Multiple</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>  
        <div class="form-group row" style="padding-bottom: 3px; padding-top: 3px; border-bottom-style: solid; border-bottom-width: thin;">
          <div class="col-md-2">
            <!-- <i class="fa fa-angle-right"></i> -->&nbsp; <label class="col-form-label"> Torus Mandibularis</label>
          </div>
          <div class="col-md-10">
            <div class="row" id="dacrjasesmengigmedis_gtorus2Id">
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row ">
                    <input checked name="dacrjasesmengigmedis_gtorus2Id" value="1" type="radio"  id="dacrjasesmengigmedis_gtorus2Id_1"> <label class="form-label" for="dacrjasesmengigmedis_gtorus2Id_1">Tidak Ada</label>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row ">
                    <input name="dacrjasesmengigmedis_gtorus2Id" value="2" type="radio"  id="dacrjasesmengigmedis_gtorus2Id_2"> <label class="form-label" for="dacrjasesmengigmedis_gtorus2Id_2">Sisi Kiri</label>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row ">
                    <input name="dacrjasesmengigmedis_gtorus2Id" value="3" type="radio"  id="dacrjasesmengigmedis_gtorus2Id_3"> <label class="form-label" for="dacrjasesmengigmedis_gtorus2Id_3">Sisi Kanan</label>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row ">
                    <input name="dacrjasesmengigmedis_gtorus2Id" value="4" type="radio"  id="dacrjasesmengigmedis_gtorus2Id_4"> <label class="form-label" for="dacrjasesmengigmedis_gtorus2Id_4">Kedua Sisi</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>  
        <div class="form-group row" style="padding-bottom: 3px; padding-top: 3px; border-bottom-style: solid; border-bottom-width: thin;">
          <div class="col-md-2">
            <!-- <i class="fa fa-angle-right"></i> -->&nbsp; <label class="col-form-label"> Palatum</label>
          </div>
          <div class="col-md-10">
            <div class="row" id="dacrjasesmengigmedis_gpalatumId">
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row ">
                    <input checked name="dacrjasesmengigmedis_gpalatumId" value="1" type="radio"  id="dacrjasesmengigmedis_gpalatumId_1"> <label class="form-label" for="dacrjasesmengigmedis_gpalatumId_1">Dalam</label>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row ">
                    <input name="dacrjasesmengigmedis_gpalatumId" value="2" type="radio"  id="dacrjasesmengigmedis_gpalatumId_2"> <label class="form-label" for="dacrjasesmengigmedis_gpalatumId_2">Sedang</label>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row ">
                    <input name="dacrjasesmengigmedis_gpalatumId" value="3" type="radio"  id="dacrjasesmengigmedis_gpalatumId_3"> <label class="form-label" for="dacrjasesmengigmedis_gpalatumId_3">Rendah</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>  
        <div class="form-group row" style="padding-bottom: 3px; padding-top: 3px; border-bottom-style: solid; border-bottom-width: thin;">
          <div class="col-md-2">
            <!-- <i class="fa fa-angle-right"></i> -->&nbsp; <label class="col-form-label"> Diastema</label>
          </div>
          <div class="col-md-10">
            <div class="row" id="dacrjasesmengigmedis_gdiastemaId">
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row ">
                    <input checked name="dacrjasesmengigmedis_gdiastemaId" value="1" type="radio"  id="dacrjasesmengigmedis_gdiastemaId_1"> <label class="form-label" for="dacrjasesmengigmedis_gdiastemaId_1">Tidak Ada</label>
                  </div>

                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row ">
                    <input onclick="" name="dacrjasesmengigmedis_gdiastemaId" value="2" type="radio"  id="dacrjasesmengigmedis_gdiastemaId_2"> <label class="form-label" for="dacrjasesmengigmedis_gdiastemaId_2">Ada</label>
                  </div>
                  <div class="row" id="dacrjasesmengigmedis_div_gdiastemaId2" style="display: none;">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                      <textarea rows="2" name="dacrjasesmengigmedis_gdiastemaket" id="dacrjasesmengigmedis_gdiastemaket" style="width: 100%;" class="form-control"></textarea>
                    </div>*
                  </div>                    
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row" style="padding-bottom: 3px; padding-top: 3px; border-bottom-style: solid; border-bottom-width: thin;">
          <div class="col-md-2">
            <!-- <i class="fa fa-angle-right"></i> -->&nbsp; <label class="col-form-label"> Anomali</label>
          </div>
          <div class="col-md-10">
            <div class="row" id="dacrjasesmengigmedis_ganomaliId">
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row ">
                    <input checked name="dacrjasesmengigmedis_ganomaliId" value="1" type="radio"  id="dacrjasesmengigmedis_ganomaliId_1"> <label class="form-label" for="dacrjasesmengigmedis_ganomaliId_1">Tidak Ada</label>
                  </div>

                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row ">
                    <input name="dacrjasesmengigmedis_ganomaliId" value="2" type="radio"  id="dacrjasesmengigmedis_ganomaliId_2"> <label class="form-label" for="dacrjasesmengigmedis_ganomaliId_2">Ada</label>
                  </div>
                  <div class="row" id="dacrjasesmengigmedis_div_ganomaliId2" style="display: none;">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                      <textarea rows="2" name="dacrjasesmengigmedis_ganomaliket" id="dacrjasesmengigmedis_ganomaliket" style="width: 100%;" class="form-control"></textarea>
                    </div>*
                  </div>                    
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row" style="padding-bottom: 3px; padding-top: 3px; border-bottom-style: solid; border-bottom-width: thin;">
          <div class="col-md-2">
            <!-- <i class="fa fa-angle-right"></i> -->&nbsp; <label class="col-form-label"> Frenulum Labialis</label>
          </div>
          <div class="col-md-10">
            <div class="row" id="dacrjasesmengigmedis_gfrenulum1Id">
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row ">
                    <input checked name="dacrjasesmengigmedis_gfrenulum1Id" value="1" type="radio"  id="dacrjasesmengigmedis_gfrenulum1Id_1"> <label class="form-label" for="dacrjasesmengigmedis_gfrenulum1Id_1">Normal</label>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row ">
                    <input name="dacrjasesmengigmedis_gfrenulum1Id" value="2" type="radio"  id="dacrjasesmengigmedis_gfrenulum1Id_2"> <label class="form-label" for="dacrjasesmengigmedis_gfrenulum1Id_2">Tinggi</label>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row ">
                    <input name="dacrjasesmengigmedis_gfrenulum1Id" value="3" type="radio"  id="dacrjasesmengigmedis_gfrenulum1Id_3"> <label class="form-label" for="dacrjasesmengigmedis_gfrenulum1Id_3">Rendah</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>  
        <div class="form-group row" style="padding-bottom: 3px; padding-top: 3px; border-bottom-style: solid; border-bottom-width: thin;">
          <div class="col-md-2">
            <!-- <i class="fa fa-angle-right"></i> -->&nbsp; <label class="col-form-label"> Frenulum Lingualis</label>
          </div>
          <div class="col-md-10">
            <div class="row" id="dacrjasesmengigmedis_gfrenulum2Id">
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row ">
                    <input checked name="dacrjasesmengigmedis_gfrenulum2Id" value="1" type="radio"  id="dacrjasesmengigmedis_gfrenulum2Id_1"> <label class="form-label" for="dacrjasesmengigmedis_gfrenulum2Id_1">Normal</label>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row ">
                    <input name="dacrjasesmengigmedis_gfrenulum2Id" value="2" type="radio"  id="dacrjasesmengigmedis_gfrenulum2Id_2"> <label class="form-label" for="dacrjasesmengigmedis_gfrenulum2Id_2">Tinggi</label>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row ">
                    <input name="dacrjasesmengigmedis_gfrenulum2Id" value="3" type="radio"  id="dacrjasesmengigmedis_gfrenulum2Id_3"> <label class="form-label" for="dacrjasesmengigmedis_gfrenulum2Id_3">Rendah</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>  
        <div class="form-group row" style="padding-bottom: 3px; padding-top: 3px; border-bottom-style: solid; border-bottom-width: thin;">
          <div class="col-md-2">
            <!-- <i class="fa fa-angle-right"></i> -->&nbsp; <label class="col-form-label"> OHI-S</label>
          </div>
          <div class="col-md-10">
            <div class="row" id="dacrjasesmengigmedis_gohisId">
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row ">
                    <input checked name="dacrjasesmengigmedis_gohisId" value="1" type="radio"  id="dacrjasesmengigmedis_gohisId_1"> <label class="form-label" for="dacrjasesmengigmedis_gohisId_1">Baik</label>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row ">
                    <input name="dacrjasesmengigmedis_gohisId" value="2" type="radio"  id="dacrjasesmengigmedis_gohisId_2"> <label class="form-label" for="dacrjasesmengigmedis_gohisId_2">Sedang</label>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <div class="row ">
                    <input name="dacrjasesmengigmedis_gohisId" value="3" type="radio"  id="dacrjasesmengigmedis_gohisId_3"> <label class="form-label" for="dacrjasesmengigmedis_gohisId_3">Jelek</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>  
        <div class="form-group row" style="padding-bottom: 3px; padding-top: 3px;">
          <div class="col-md-2">
            <!-- <i class="fa fa-angle-right"></i> -->&nbsp; <label class="col-form-label"> Temuan Lainnya</label>
          </div>
          <div class="col-md-10">
            <div class="form-group row">
              <div class="col-md-12">
                <textarea rows="4" name="dacrjasesmengigmedis_gtemuanlain" id="dacrjasesmengigmedis_gtemuanlain" style="width:100%;" class="form-control"></textarea>
              </div>
            </div>
          </div>
        </div>                                                                                
      </div>
    </div>  
  </div>
</div>
<div class="card card-default">
  <div class="card-header" style="background-color:black;">
    <h3 class="card-title" style="color:white;">PEMERIKSAAN PENUNJANG</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <div class="card-body">
    <div class="row p-2">
      <div class="col-md-6">
        <div class="card card-default">
          <div class="card-header">
            <h4 class="card-title">Permintaan Laboratorium</h4>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive-md">
              <table class="table-sm" class="table table-striped table-sm choose" style="border-collapse: inherit;" style="border:solid;">
                <thead>
                  <th>
                    NO
                  </th>
                  <th>
                    Jenis Pemeriksaan
                  </th>
                </thead>
                <tbody id="tbodylistlaboratorium">
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <button type="button" class="btn btn-default" onclick="show_modalPermintaanLabIrja()">Tambah Permintaan Lab</button><br>
        <label class="form-label">> EKG </label>
        <textarea class="form-control "></textarea>
      </div>
      <div class="col-md-6">
        <div class="card card-default">
          <div class="card-header">
            <h4 class="card-title">Permintaan Laboratorium</h4>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive-md">
              <table class="table-sm">
                <thead>
                  <th>
                    ACT
                  </th>
                  <th>
                    Id
                  </th>
                  <th>
                    Validasi
                  </th>
                  <th>
                    Tanggal
                  </th>
                  <th>
                    Dokter Pengirim
                  </th>
                  <th>
                    Dokter PJ
                  </th>
                </thead>
                <tbody>
                  <td>
                  </td>
                  <td>
                  </td>
                  <td>
                  </td>
                  <td>
                  </td>
                  <td>
                  </td>
                  <td>
                  </td>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <button type="button" class="btn btn-default" onclick="show_modalPermintaancheckboxlogiIrja()">Tambah checkboxlogi</button><br>
        <label class="form-label">> Lain-lain</label>
        <textarea class="form-control"></textarea>
      </div>
    </div>
  </div>
</div>
<div class="card card-default">
  <div class="card-header" style="background-color:black;">
    <h3 class="card-title" style="color:white;">ASSESMEN *</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <div class="card-body">
    <div class="row">  
      <div class="col-md-12">                      
        Diagnosa Medis
        <textarea class="form-control" id="Assesmenassmedigd"></textarea>
        <div id="divAssesmenassmedigd2"></div>
      </div>                    
    </div>
  </div>
</div>
<div class="card card-default">
  <div class="card-header" style="background-color:black;">
    <h3 class="card-title" style="color:white;">STATUS LOCALIS *</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <div class="card-body">
   <div class="col-sm-4"> 

    <select class="form-control" onchange="selectstatuslocalisermigd()" id="selectstatuslocalisermigd">
      <option value="1">Polos</option>
      <option value="2">Badan</option>
      <option value="3">Gigi</option>
      <option value="4">Jantung</option>
      <option value="5">Ginjal</option>
      <option value="6">Hidung</option>
      <option value="7">Tulang  </option>
      <option value="8">Mata</option>
      <option value="9">Kulit</option>
      <option value="10">Kepala</option>
      <option value="11">Telinga </option>
      <option value="12">Kandungan</option>
    </select>
  </div> 
  <div class="col-md-8">                         
    <div style="width: 600px; height: 600px;">  
      <div id="tesPaint" style="width: 400px; height: 400px;"></div>
    </div>
  </div>
</div>
</div>
<div class="card card-default">
  <div class="card-header" style="background-color:black;">
    <h3 class="card-title" style="color:white;">PLANNING</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <div class="card-body">
    <textarea class="form-control" id="planningassmedigd"></textarea>
    <input type="hidden" id="tindakanassmedigd">
  </div>                
</div>
<div  class="card card-default">
  <div class="card-body">
    <label class="form-label"> Pasien Kompleks </label>
    <center>
      Ya<input type="radio" class="form-group" name="pasienKompleksassmedigd" id="pasienKompleksassmedigd1" value="2">&nbsp;Tidak<input type="radio" class="form-group" id="pasienKompleksassmedigd2" name="pasienKompleksassmedigd" value="1" checked='true'></center>
    </div>
  </div>
  <div class="card" >
    <div class="row">  

      <div class="col-md-12" style="padding-top: 20px;">
        <div class="card" style="width: 500px;height: 500px;border-collapse: !important;">
         <label>Tanda tangan</label> 
         <div id="paint_ttddokter"></div>
       </div>

     </div>
     
     <div class="col-sm-6" >
      <label>Dokter Penganggung Jawab Pasien</label><br>
      <input type="date" name="" class="form-control" value="<?php echo date('Y-m-d');?>"><br>
      <input type="text" name="dpjpigdassmed" id="dpjpigdassmed" class="form-control" ><br>
      <button onclick="showttddokter();" class="btn btn-warning">Edit</button>
    </div>
  </div>

</div>
<button type="button" class="btn btn-primary " type="submit" onclick="simpanAssesmenmedisigd();"> <i class="fas fa-save"></i> Simpan Assesmen</button>
</div>

<div class="tab-pane p-1 fade" id="SOAPITriageIgd" role="tabpanel">
  <div>
    <button class="btn btn-primary" title="Input Resep" onclick="erekammedisRWJ_show_ermeresepigd();">Eresep</button>&nbsp;<button class="btn btn-primary" title="Input Order Laboratorium" onclick="show_modalPermintaanLabIgd()">Permintaan Laboratorium</button>&nbsp;<button class="btn btn-primary" title="Input Order Radiologi" onclick="show_modalPermintaancheckboxlogiIgd()">Permintaan Radiologi</button>&nbsp;<button class="btn btn-primary" title="Input Order Radiologi" onclick="show_modalPermintaankonsultasiigd()">Permintaan Konsultasi</button>
  </div>
  <h4 class="lead mb-0"><u>CATATAN PERKEMBANGAN PASIEN TERINTEGRASI (CPPT) RAWAT JALAN</u></h4>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group row">
        <div class="col-sm-3">
          <label>Tekanan Darah</label>  
        </div>
        <div class="col-sm-auto">
          <label>:</label>  
        </div>
        <div class="col-sm-4">  
          <input type="text" class="form-control form-control-xs" name="cppttekanandarahkeperawatanermIgd" id="cppttekanandarahkeperawatanermIgd" >
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-3">
          <label>Suhu</label>
        </div>
        <div class="col-sm-auto">
          <label>:</label>  
        </div>
        <div class="col-md-4">
          <input type="text" class="form-control form-control-xs" name="cpptsuhukeperawatanermIgd" id="cpptsuhukeperawatanermIgd">
        </div>
      </div>

    </div>
    <div class="col-md-6">
      <div class="form-group row">
        <div class="col-sm-3">
          <label>Nadi</label>  
        </div>
        <div class="col-sm-auto">
          <label>:</label>  
        </div>
        <div class="col-sm-4">  
          <input type="text" class="form-control form-control-xs" name="cpptnadikeperawatanermIgd" id="cpptnadikeperawatanermIgd" >
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-3">
          <label>Respisari</label>
        </div>
        <div class="col-sm-auto">
          <label>:</label>  
        </div>
        <div class="col-md-4">
          <input type="text" class="form-control form-control-xs" name="cpptsaturasikeperawatanermIgd" id="cpptsaturasikeperawatanermIgd">
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group row">
        <div class="col-sm-3">
          <label>SpO2</label>  
        </div>
        <div class="col-sm-auto">
          <label>:</label>  
        </div>
        <div class="col-sm-4">  
          <input type="text" class="form-control form-control-xs" name="cpptSpo2keperawatanermIgd" id="cpptSpo2keperawatanermIgd" >
        </div>
      </div>
    </div>
  </div>
  <table width="100%" cellspacing="0" cellpadding="0">
    <tr style="border:2px solid black; margin: 5px;">
      <td>
        <div class="row p-1">
          <div class="col-sm-4" >
            <h4>SUBJEK</h4>
          </div>
          <div class="col-sm-8">
            <button type="button" class="btn bg-gradient-secondary btn-xs" type="submit" onclick="show_cri_subjek()"> <i class="fas fa-plus"></i>Tambah</button><button type="button" class="btn bg-gradient-secondary btn-xs" type="button" onclick="document.getElementById('subjekkeperawatanIgd').value='';"> <i class="fas fa-times"></i> clear</button>
            <textarea class="form-control" id="subjekkeperawatanIgd" style="height:100px; width: 100%;" ></textarea>
          </div>
        </div>
      </td>                    
    </tr>
    <tr style="border:2px solid black; margin: 5px;">
      <td>
        <div class="row p-1">
          <div class="col-sm-4" >
            <h4>OBJEK</h4>
          </div>
          <div class="col-sm-8">
            <button type="button" class="btn bg-gradient-secondary btn-xs" type="button" onclick="document.getElementById('objekkeperawatanIgd').value='';"> <i class="fas fa-times"></i> clear</button>
            <textarea class="form-control" id="objekkeperawatanIgd" style="height:100px; width: 100%;" ></textarea>
          </div>
        </div>
      </td>
    </tr>
    <tr style="border:2px solid black; margin: 5px;">
      <td>
        <div class="row p-1">
          <div class="col-sm-4" >
            <h4>ASESMEN (diagnosa)</h4>
          </div>
          <div class="col-sm-8">
            <button type="button" class="btn bg-gradient-secondary btn-xs" type="submit" onclick="show_diagnosa_perawat()"> <i class="fas fa-cog"></i> Diagnosa Keperawatan</button>
            <textarea class="form-control" id="assesmenTriageIgd" style="height:100px; width: 100%;" ></textarea>
            <div id="divassesmenTriageIgd"></div>
          </div>
        </div>
      </td>
    </tr>
    <tr style="border:2px solid black; margin: 5px;">
      <td>
        <div class="row p-1">
          <div class="col-sm-4" >
            <h4>PLANNING</h4>
          </div>
          <div class="col-sm-8">
            <button type="button" class="btn bg-gradient-secondary btn-xs" type="submit" onclick="show_intervensi()"> <i class="fas fa-cog" ></i> Intervensi</button>
            <button type="button" class="btn bg-gradient-secondary btn-xs" type="submit" onclick="show_daftarintervensi()"> <i class="fas fa-bars"></i> Daftar Intervensi</button>
            <button type="button" class="btn bg-gradient-secondary btn-xs" type="button" onclick="document.getElementById('soapintervensiTriageIgd').value='';"> <i class="fas fa-times"></i>Clear</button>
            <textarea class="form-control" style="height:100px; width: 100%;" id="soapintervensiTriageIgd"></textarea>
          </div>
        </div>
      </td> 
    </tr>

  </table>
  <button type="button" class="btn btn-primary" type="submit" onclick="saveSoapKeperawatanIgd()">Simpan Soap</button> 
</div>

<div class="tab-pane p-1 fade" id="TriageIgdriwayatpenyakit" role="tabpanel">
  <h6 class="lead mb-0"><u></u></h6>
  <div class="row">
    <div class="col-sm-12">
      <table  id="bodyhistoripenyakit" class="table table-striped table-sm">
        <thead>
          <tr>
            <th style="width: 10px">#</th>
            <th>Penyakit</th>
            <th style="width: 80px">ICD 10</th>
            <th style="width: 80px">Tanggal</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
  </div>
</div>

<div class="tab-pane p-1 fade" id="TriageIgdhistorykunjungan" role="tabpanel">
  <h6 class="lead mb-0"><u></u></h6>
  <div class="row">
    <div class="col-sm-12">
      <table id="bodyhistorykunjungan" class="table table-striped table-sm">
        <thead>
          <tr>
            <th style="width: 10px">#</th>
            <th>Klinik</th>
            <th>Dokter</th>
            <th style="width: 80px">Tanggal</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
  </div>
</div>

</div> <!-- END TAB CONTENT -->
</div>
</div> <!-- END CARD -->
</div>
</div>
</div>

</div>
<!-- /.nav-tabs-custom -->
</div>
<div class="modal fade"  id="ModalTambahIcdPenyakitSekarangtreageigd" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header"></div>
      <div class="modal-body">
        <input type="text" name="" id="ModalinputPenyakitSekarangtreageigd" class="form-control">
        <div id="ModalDivPenyakitSekarangtreageigd"></div>
      </div>
      <div class="modal-footer">
        <button onclick="InputTextAreaPenyakitSekarang()">Simpan</button>
        <button onclick="$('#ModalTambahIcdPenyakitSekarangtreageigd').modal('hide');">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade"  id="ModalSuratPengantarInap" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header"></div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-2">NO Rekam Medis</div>  
          <div class="col-md-10"><input type="text" class="form-control form-control-xs"></div>
          <div class="col-md-2">Nama Pasien</div>  
          <div class="col-md-10"><input type="text" class="form-control form-control-xs"></div>
          <div class="col-md-2">Alamat Pasien</div>  
          <div class="col-md-10"><input type="text" class="form-control form-control-xs"></div>
          <div class="col-md-2">Umur</div>  
          <div class="col-md-10"><input type="text" class="form-control form-control-xs"></div>
          <div class="col-md-2">Penjamin</div>  
          <div class="col-md-10"><input type="text" class="form-control form-control-xs"></div>
          <div class="col-md-2">Jenis Kelamin</div>  
          <div class="col-md-10"><input type="text" class="form-control form-control-xs"></div>
          <div class="col-md-2">Diagnosa</div>  
          <div class="col-md-10">
           <input type="text" name="" id="ModalinputPenyakitSekarangtreageigd" class="form-control form-control-xs">
         </div>
         <div class="col-md-2">Tujuan Ruang Inap</div>  
         <div class="col-md-10"><input type="text" class="form-control form-control-xs"></div>
         <div class="col-md-2">Tujuan Ruang Inap</div>  
         <div class="col-md-10"><input type="text" class="form-control form-control-xs"></div>
       </div>
     </div>
     <div class="modal-footer">
      <button onclick="InputSuratPengantarIrna()">Simpan</button>
      <button onclick="$('#ModalSuratPengantarInap').modal('hide');">Close</button>
    </div>
  </div>
</div>
</div>
<div class="modal fade"  id="ModalTambahIcdPenyakitSekarangkeperawatanigd" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header"></div>
      <div class="modal-body">
        <input type="text" name="" id="ModalinputPenyakitSekarangkeperawatanigd" class="form-control">
        <div id="ModalDivPenyakitSekarangkeperawatanigd"></div>
      </div>
      <div class="modal-footer">
        <button onclick="InputTextAreaPenyakitkeperatanSekarang()">Simpan</button>
        <button onclick="$('#ModalTambahIcdPenyakitSekarangkeperawatanigd').modal('hide');">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade"  id="ModalTambahIcdPenyakitSekarangmedisigd" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header"></div>
      <div class="modal-body">
        <input type="text" name="" id="ModalinputPenyakitSekarangmedisigd" class="form-control">
        <div id="ModalDivPenyakitSekarangmedisigd"></div>
      </div>
      <div class="modal-footer">
        <button onclick="InputTextAreaPenyakitmedisSekarang()">Simpan</button>
        <button onclick="$('#ModalTambahIcdPenyakitSekarangmedisigd').modal('hide');">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- modal diagnosa perawat -->
<div class="modal fade" id="Modaldiagnsoaperawatigd">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">        
        <h4>Diagnosa Perawat</h4>
      </div>
      <div class="modal-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Aksi</th>
              <th scope="col">Kode</th>
              <th scope="col">Diskripsi</th>
            </tr>
          </thead>
          <tbody id="tbodydiagnosaperawatigd">

          </tbody>
        </table>
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end modal diagnosa perawat -->
<div class="modal fade"  id="ModalTambahIcdPenyakitSekarangsoapigd" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header"></div>
      <div class="modal-body">
        <input type="text" name="" id="ModalinputPenyakitSekarangsoapigd" class="form-control">
        <div id="ModalDivPenyakitSekarangsoapigd"></div>
      </div>
      <div class="modal-footer">
        <button onclick="InputTextAreaPenyakitsoapSekarang()">Simpan</button>
        <button onclick="$('#ModalTambahIcdPenyakitSekarangsoapigd').modal('hide');">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- alergi -->
<div class="modal fade"  id="ModalTambahalergitreageigd" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header"></div>
      <div class="modal-body">
        <input class="form-control form-control-xs" type="text" name="" id="Modalinputalergitreageigd" class="form-control">
      </div>
      <div class="modal-footer">
        <button onclick="savetambahalergiSekarang()">Simpan</button>
        <button onclick="$('#ModalTambahalergitreageigd').modal('hide')">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end alergi -->
<div class="modal fade" id="ModalShowAssesmenKeperawatanIgd">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header"><h3>Info!!</h3></div>
      <div class="modal-body" >
        <h4>Keluhan</h4>
        <input type="text" class="form-control" name="KeluhanAssesmenKeperawatanIgd" id="KeluhanAssesmenKeperawatanIgd">
        <h4>Riwayat Penyakit</h4>
        <input type="text" class="form-control" name="RiwayatPenyakitAssesmenKeperawatanIgd" id="RiwayatPenyakitAssesmenKeperawatanIgd">
        <h4>Riwayat Alergi</h4>
        <input type="text" class="form-control" name="RiwayatAlergiAssesmenKeperawatanIgd" id="RiwayatAlergiAssesmenKeperawatanIgd">
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" onclick="createsoapikeperawatan()">CPPT</button>
        <button class="btn btn-primary" onclick="createassesmenkeperawatanulang()">Assesmen Ulang</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="ModalDiagnosaKeperawatan" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        Diagnosa Keperawatan
      </div>
      <div class="modal-body"> 
        <div id="DivTableDiagnosaTriageIgd">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn-primary" id="buttondiagnosa" onclick="inputdatadiagnosaKeperawatan()">
            Masukkan Data
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="ModalIntervensiKeperawatan" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        Intervensi Keperawatan
      </div>
      <div class="modal-body"> 
        <div id="DivTableintervensiTriageIgd">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn-primary" id="buttonintervensi" onclick="inputdataintervensiKeperawatan()">
            Masukkan Data
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- modal permintaan lab -->
<div  class="modal fade" id="ModalPermintaanLabIgd">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">        
        <h4>Permintaan Laboratorium</h4>
      </div>
      <div class="modal-body">
        <label>Tanggal Laboratorium</label>
        <input type="date" name="tglOrderLab" id="tglOrderLab" class="form-control form-control-xs">
        <label>Cari Jenis Laboratorium</label>
        <input type="input" name="cariorderlabermigd" id="cariorderlabermigd" class="form-control form-control-xs">
        <div class="row"  style="height: 500px;  overflow-y: scroll;">
          <div class="col-md-6 p-2">
            <div class="card">
              <div class="card-header">
                <label class="col-form-label font-weight-bold">Produk Laboratorium1</label>
              </div>
              <div class="card-body" style="height: 400px;  overflow-y: scroll;">
                <div class="row">
                  <div class="col-md-12">
                    <div id="lacrequestlabemrdiag_grouptest_2" class="row"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row"></div>
          </div>
          <div class="col-md-6 p-2">
            <div class="card">
              <div class="card-header">
                <label class="col-form-label font-weight-bold">Request Produk Laboratorium</label>
              </div>
              <div class="card-body" style="height: 400px;  overflow-y: scroll;">
                <div class="row">
                  <div class="col-md-12">
                    <div id="lacrequestlabemrdiag_grouptest_request" class="row"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="buttonOrderLab" onclick="inputpermohonanlaboratoriumigd()">Order</button>&nbsp;
            <button class="btn  btn-secondary" data-dismiss="modal">Close</button>
          </div>
          <!--     </form> -->
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end modal permintaan lab -->
<!-- modal permintaan checkboxlogi -->
<div class="modal fade" id="ModalPermintaancheckboxlogiIgd">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header"><h4>Permintaan checkboxlogi</h4></div>
      <div class="modal-body">
        <input type="date" name="tglOrderRad" id="tglOrderRad" class="form-control form-control-xs" value="<?php echo date('Y-m-d');?>">
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <label class="col-form-label font-weight-bold">X-RAY</label>
              </div>
              <div class="card-body" style="height: 250px;  overflow-y: scroll;">
                <div class="row">
                  <div class="col-md-12">
                    <div class="row" id="paccheckboxlogireqemrdiag_grouptest_1">

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row"></div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <label class="col-form-label font-weight-bold">ULTRASONOGRAFI (USG)</label>
              </div>
              <div class="card-body" style="height: 250px;  overflow-y: scroll;">
                <div class="row">
                  <div class="col-md-12">
                    <div class="row" id="paccheckboxlogireqemrdiag_grouptest_2">

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row"></div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <label class="col-form-label font-weight-bold">CT SCAN</label>
              </div><div class="card-body" style="height: 250px;  overflow-y: scroll;"><div class="row">
                <div class="col-md-12">
                  <div class="row" id="paccheckboxlogireqemrdiag_grouptest_11"></div>
                </div>
              </div>
            </div>
            <div class="form-group row"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal-footer">
     <button type="button" class="btn btn-primary" id="buttonOrderRad" onclick="inputpermohonanRadiologiigd()">Order</button>&nbsp;
     <button class="btn  btn-secondary" data-dismiss="modal">Close</button>
   </div>
 </div>
</div>
</div>

<!-- end modal permintaan checkboxlogi -->
<div class="modal fade " id="ModalCariSubjek" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">SUBJEK</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <table style="width:100%;" >
         <tr>
          <td>
            <div class="col-md-6">
             <input type="checkbox" name="cek_subjek" value="-">-
           </div>
         </td>
         <td>
          <div class="col-md-6">    
            <input type="checkbox" name="cek_subjek" value="">
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="col-md-6">
           <input type="checkbox" name="cek_subjek" value="Tak ada Keluhan">Tak ada Keluhan

         </div>
       </td>
       <td>
        <div class="col-md-6">    
          <input type="checkbox" name="cek_subjek" value="Mual">Mual
        </div>
      </td>
    </tr>
    <tr>
      <td>
        <div class="col-md-6">
         <input type="checkbox" name="cek_subjek" value="">
       </div>
     </td>
     <td>
      <div class="col-md-6">    
        <input type="checkbox" name="cek_subjek" value="Pusing">Pusing
      </div>
    </td>
  </tr>
  <tr>
    <td>
      <div class="col-md-6">
       <input type="checkbox" name="cek_subjek" value="Demam">Demam
     </div>
   </td>
   <td>
    <div class="col-md-6">    
      <input type="checkbox" name="cek_subjek" value="Batuk">Batuk
    </div>
  </td>
</tr>
<tr>
  <td>
    <div class="col-md-6">
     <input type="checkbox" name="cek_subjek" value="Lemas">Lemas
   </div>
 </td>
 <td>
  <div class="col-md-6">    
    <input type="checkbox" name="" value="Bab cair : Kali">Bab cair : Kali

  </div>
</td>
</tr>
<tr>
  <td>
    <div class="col-md-6">
     <input type="checkbox" name="cek_subjek" value="Tidak bisa menahan BAB">Tidak bisa menahan BAB
   </div>
 </td>
 <td>
  <div class="col-md-6">    
    <input type="checkbox" name="cek_subjek" value="Sesak">Sesak
  </div>
</td>
</tr>
<tr>
  <td>
    <div class="col-md-6">
     <input type="checkbox" name="cek_subjek" value="Gelisah">Gelisah
   </div>
 </td>
 <td>
  <div class="col-md-6">    
    <input type="checkbox" name="cek_subjek" value="Cemas">Cemas

  </div>
</td>
</tr>
<tr>
  <td>
    <div class="col-md-6">
     <input type="checkbox" name="cek_subjek" value="Khawatir">Khawatir
   </div>
 </td>
 <td>
  <div class="col-md-6">    
    <input type="checkbox" name="cek_subjek" value="Gatal">Gatal
  </div>
</td>
</tr>
<tr>
  <td>
    <div class="col-md-6">
     <input type="checkbox" name="cek_subjek" value="Kedinginan">Kedinginan
   </div>
 </td>
 <td>
  <div class="col-md-6">    
    <input type="checkbox" name="cek_subjek" value="Perineum terasa tertekan">Perineum terasa tertekan

  </div>
</td>
</tr>
<tr>
  <td>
    <div class="col-md-6">
     <input type="checkbox" name="cek_subjek" value="Merasa lapar terus menerus">Merasa lapar terus menerus

   </div>
 </td>
 <td>
  <div class="col-md-6">    
    <input type="checkbox" name="cek_subjek" value="Merasa haus terus menerus">Merasa haus terus menerus

  </div>
</td>
</tr>
<tr>
  <td>
    <div class="col-md-6">
     <input type="checkbox" name="cek_subjek" value="Merasa ingin berkemih namun tidak keluar">Merasa ingin berkemih namun tidak keluar

   </div>
 </td>
 <td>
  <div class="col-md-6">    
    <input type="checkbox" name="cek_subjek" value="Berkemih tidak lancar/ menetes sedikit-sedikit">Berkemih tidak lancar/ menetes sedikit-sedikit

  </div>
</td>
</tr>
<tr>
  <td>
    <div class="col-md-6">
     <input type="checkbox" name="cek_subjek" value="Sering Buang air kecil">Sering Buang air kecil

   </div>
 </td>
 <td>
  <div class="col-md-6">    
    <input type="checkbox" name="cek_subjek" value="Sering ngompol">Sering ngompol

  </div>
</td>
</tr>
<tr>
  <td>
    <div class="col-md-6">
     <input type="checkbox" name="cek_subjek" value="Sulit menggerakan ekstemitas pada">Sulit menggerakan ekstemitas pada

   </div>
 </td>
 <td>
  <div class="col-md-6">    
    <input type="checkbox" name="cek_subjek" value="Bengkak pada">Bengkak pada

  </div>
</td>
</tr>
<tr>
  <td>
    <div class="col-md-6">
     <input type="checkbox" name="cek_subjek" value="Sulit Tidur">Sulit Tidur

   </div>
 </td>
 <td>
  <div class="col-md-6">    
    <input type="checkbox" name="cek_subjek" value="Pandangan Kabur">Pandangan Kabur

  </div>
</td>
</tr>
<tr>
  <td>
    <div class="col-md-6">
     <input type="checkbox" name="cek_subjek" value="Sulit Menelan">Sulit Menelan

   </div>
 </td>
 <td>
  <div class="col-md-6">    
    <input type="checkbox" name="cek_subjek" value="Merasa Sedih">Merasa Sedih

  </div>
</td>
</tr>
<tr>
  <td>
    <div class="col-md-6">
     <input type="checkbox" name="cek_subjek" value="Merasa Kehilangan">Merasa Kehilangan

   </div>
 </td>
 <td>
  <div class="col-md-6">    
    <input type="checkbox" name="cek_subjek" value="Tidak Nyaman">Tidak Nyaman

  </div>
</td>
</tr>
<tr>
  <td>
    <div class="col-md-6">
     <input type="checkbox" name="cek_subjek" value="Nyeri pada daerah">Nyeri pada daerah

   </div>
 </td>
 <td>
  <div class="col-md-6">    
    <input type="checkbox" name="cek_subjek" value="Nafsu makan menurun">Nafsu makan menurun

  </div>
</td>
</tr>
<tr>
  <td>
    <div class="col-md-6">
     <input type="checkbox" name="cek_subjek" value="Kembung">Kembung
   </div>
 </td>
 <td>
  <div class="col-md-6">    
    <input type="checkbox" name="cek_subjek_dinamis" >
    <input type="text" name="cek_subjek_dinamis_input" id="cek_subjek_dinamis_input">
  </div>
</td>
</tr>
</table>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default" id="btn" onclick="inputdatasubjek()" >Input Subjek</button><button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<!-- modal pengobatan -->
<div class="modal fade" id="ModalRiwayatPengobatan" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">Tambah Riwayat Pengobatan</div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-2">
            <label>Jenis Obat</label>
          </div>
          <div class="col-md-10">
            <select class="form-control" id="selectJenisobat">
              <option value="1">Obat</option>
              <option value="2">Operasi</option>
              <option value="3">Transfusi</option>
              <option value="4">Vaksin</option>
              <option value="5">Lain-lain </option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
            <label>Keterangan</label>
          </div>
          <div class="col-md-10" >
            <textarea class="form-control" id="keteranganobat"></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="button" onclick="simpanHistoriPemberianObat()">Simpan</button>&nbsp;<button type="button" class="btn btn-secondary" data-dismiss='modal'>Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end modal pengobatan -->
<!-- modal pengobatan -->
<div class="modal fade" id="ModalRiwayatAlergi" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">Riwayat Alergi</div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-2">
            <label>Jenis Obat</label>
          </div>
          <div class="col-md-10">
            <select class="form-control" id="selectJenisalergi">
              <option value="1">Obat</option>
              <option value="2">Operasi</option>
              <option value="3">Transfusi</option>
              <option value="4">Vaksin</option>
              <option value="5">Lain-lain </option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
            <label>Keterangan</label>
          </div>
          <div class="col-md-10" >
            <textarea class="form-control" id="keteranganalergi"></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="button" onclick="simpanHistoriAlergi()">Simpan</button>&nbsp;<button type="button" class="btn btn-secondary" data-dismiss='modal'>Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end modal pengobatan -->
<!-- modal pengobatan -->
<div class="modal fade" id="ModalPenyakitDahulu" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">Riwayat Penyakit Dahulu</div>
      <div class="modal-body"></div>
      <div class="row">
        <div class="col-md-2">
          <label>Jenis Penyakit</label>
        </div>
        <div class="col-md-10">
          <select class="form-control" id="selectJenisPenyakitOld">
            <option value="1">DM</option>
            <option value="2">Hipertensi</option>
            <option value="3">Penyakit Jantung</option>
            <option value="4">Penyakit Ginjal </option>
            <option value="5">Asma </option>
            <option value="6">PPOK</option>
            <option value="7">Epilepsi</option>
            <option value="8">TBC</option>
            <option value="9">Lain-lain</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-md-2">
          <label>Keterangan</label>
        </div>
        <div class="col-md-10" >
          <textarea class="form-control" id="keteranganhistoripenyakitold"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="button" onclick="simpanHistoriPenyakitOld()">Simpan</button>&nbsp;<button type="button" class="btn btn-secondary" data-dismiss='modal'>Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end modal pengobatan -->
<!-- modal pengobatan -->
<div class="modal fade" id="ModalPenyakitKeluarga" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">Riwayat Penyakit Keluarga</div>
      <div class="modal-body">
       <div class="row">
        <div class="col-md-2">
          <label>Jenis Penyakit</label>
        </div>
        <div class="col-md-10">
          <select class="form-control" id="selectJenisPenyakitFam">
            <option value="1">DM</option>
            <option value="2">Hipertensi</option>
            <option value="3">Penyakit Jantung</option>
            <option value="4">Penyakit Ginjal </option>
            <option value="5">Asma </option>
            <option value="6">PPOK</option>
            <option value="7">Epilepsi</option>
            <option value="8">TBC</option>
            <option value="9">Lain-lain</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-md-2">
          <label>Keterangan</label>
        </div>
        <div class="col-md-10" >
          <textarea class="form-control" id="keteranganhistoripenyakitFam"></textarea>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn btn-primary" type="button" onclick="simpanHistoriPenyakitFam()">Simpan</button>&nbsp;<button type="button" class="btn btn-secondary" data-dismiss='modal'>Close</button>
    </div>
  </div>
</div>
</div>
<!-- end modal pengobatan -->
<div class="modal fade" id="ModalDaftarIntervensi" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Daftar Intervensi</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
               <button type="button" class="btn btn-default" onclick="saveSoap()" >Simpan SOAP</button>
             </div>
           </div>
           <!-- ./card-header -->
           <div class="card-body p-0">
            <table class="table table-hover">
              <tbody>
                <tr>
                  <td class="border-0">Setelah dilakukan intervensi selama</td>
                </tr>
                <tr data-widget="expandable-table" aria-expanded="false">
                  <td>
                    <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                    Risiko Penurunan Curah Jantung (D. 0011) RJ
                  </td>
                </tr>
                <tr class="expandable-body">
                  <td>
                    <div class="p-0">
                      <table class="table table-hover">
                        <tbody>
                          <tr data-widget="expandable-table" aria-expanded="false">
                            <td>
                              <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                              LUARAN KEPERAWATAN
                            </td>
                          </tr>
                          <tr class="expandable-body d-none" >
                            <td>
                              <div class="p-0">
                                <table class="table table-hover">
                                  <tbody>
                                    <tr>
                                      <td>Kekuatan nadi perifer meningkat*</td>
                                    </tr>
                                    <tr>
                                      <td>Ejection fraction (EF) meningkat*</td>
                                    </tr>
                                    <tr>
                                      <td>Cardiac index (CI) meningkat*</td>
                                    </tr>
                                    <tr>
                                      <td>Left ventricular stroke work index (LVSWI) meningkat*</td>
                                    </tr>
                                    <tr>
                                      <td>Stroke volume index (SVI) meningkat*</td>
                                    </tr>
                                    <tr>
                                      <td>Palpitasi menurun*</td>
                                    </tr>
                                    <tr>
                                      <td>Bradikardia menurun*</td>
                                    </tr>
                                    <tr>
                                      <td>Takikardia menurun*</td>
                                    </tr>
                                    <tr>
                                      <td>Gambaran EKG aritmia menurun*</td>
                                    </tr>
                                    <tr>
                                      <td>Lelah menurun*</td>
                                    </tr>
                                    <tr>
                                      <td>Edema menurun*</td>
                                    </tr>
                                    <tr>
                                      <td>Distensi vena jugularis menurun*</td>
                                    </tr>
                                    <tr>
                                      <td>Dispnea menurun*</td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </td>
                          </tr>
                          <tr data-widget="expandable-table" aria-expanded="false" >
                            <td>
                              <button type="button" class="btn btn-primary p-0">
                                <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                              </button>
                              219-2
                            </td>
                          </tr>
                          <tr class="expandable-body d-none">
                            <td>
                              <div class="p-0">
                                <table class="table table-hover">
                                  <tbody>
                                    <tr>
                                      <td>219-2-1</td>
                                    </tr>
                                    <tr>
                                      <td>219-2-2</td>
                                    </tr>
                                    <tr>
                                      <td>219-2-3</td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>219-3</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</div>
</div>
</div>
<!-- modal cari skdp -->
<div class="modal fade" id="ModalShowaddmrpenyakitmedermigd">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        Tambah Diagnosa
      </div>
      <div class="modal-body">
        <input type="hidden" name="kunjunganaddpenyakitigd" id="kunjunganaddpenyakitigd">
        <input type="hidden" name="unitaddpenyakitigd" id="unitaddpenyakitigd">
        <h3>Status Diagnosa</h3>
        <select id="selectstatusicd10" class="form-control form-control-xs">
          <option value="1">Utama</option>
          <option value="0">Awal</option>
          <option value="2">Sekunder</option>
          <option value="3">Komplikasi</option>
        </select>
        <h3>ICD 10</h3>
        <input class="form-control form-control-xs" id="textTambahdiagnosaresumemedErmigd">
        <div id="DivTambahdiagnosaresumemedErmigd"></div>
      </div>
    </div>
  </div>
</div>
<!-- icd 9 -->
<div class="modal fade" id="ModalShowaddicd9medermigd">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        Tambah Tindakan icd 9
      </div>
      <div class="modal-body">
       <input type="hidden" name="kunjunganaddicd9igd" id="kunjunganaddicd9igd">
       <input type="hidden" name="unitaddicd9igd" id="unitaddicd9igd">
       <label>ICD 9</label>
       <input class="form-control form-control-xs" id="textTambahicd9resumemedErmigd">
       <div id="DivTambahicd9resumemedErmigd"></div>
     </div>
   </div>
 </div>
</div>
<div class="rekammedisIGD_eresepIGD_content"></div>
<div class="rekammedisIGD_eresepIGD_preview"></div>
<div class="rekammedisigd_suratsehat_content"></div>
<div class="rekammedisigd_suratkelahiran_content"></div>
<div class="rekammedisigd_suratkematian_content"></div>
<script type="text/javascript">
  var tgllahir;
  var alamatpasien;
  var umur;
  var penyakitPendaftaranErmIgd;
  var ttd;
  var tesPaint;
  $(document).ready(function() {
    setTimeout(refresh_pendft_rwj, 1000);  
    ermIgd_listpasien();
    var nowday      = "<?php echo $nowday; ?>";
    RadULigd();
    RadXRigd();
    RadCTScanigd();
    LabKimiaKlinis();
    tampilpekerjaanperermigd();
    tampilagamaperermigd();
    pegawaiigd();
    Rlkegiatan();
    caramasuk();
    carakeluar();
    keadaanumum();
    document.getElementById('dpjpigd').value=user.nama_pegawai;
    
    aktifPaint();

  });

  $('#searchPxTriagerwj').show();
  $('#RWJTriage_nm_pasiencari').hide();
  $("#DivTriage").hide();
  function tampilmodalcreateseprwj(e) {
   if (e.keyCode == 13) {
    $('#ModalCreateSEP').modal("show");
    document.getElementById('TriageIgdnokartu').value=document.getElementById('TriageIgdnoasuransi').value;

  }
}
$('[type="checkbox"][name^="dactriage_hlevel1alist"]').on('change', function() {
  //alert('nilai');
});
function carakeluar() {
  apiPOST('Kunjungan/carakeluar', null,hasil=>{
    var a=hasil['data'];
    var pegawai='';
    for (var i = 0; i < a.length; i++) {
      pegawai+='<option value="'+a[i]['id_cara_keluar']+'">'+a[i]['cara_keluar']+'</option>';
    }
    document.getElementById('CaraKeluarResumeErmIrja').innerHTML=pegawai;

  });
}
function caramasuk() {
  apiPOST('Kunjungan/caramasuk', null,hasil=>{
    var a=hasil['data'];
    var pegawai='';
    for (var i = 0; i < a.length; i++) {
      pegawai+='<option value="'+a[i]['kd_cara_masuk']+'">'+a[i]['cara_masuk']+'</option>';
    }
    document.getElementById('caramasukResumeErmMedisIgd').innerHTML=pegawai;

  });
}
function keadaanumum() {
  apiPOST('Kunjungan/keadaanumum', null,hasil=>{
    var a=hasil['data'];
    var pegawai='';
    for (var i = 0; i < a.length; i++) {
      pegawai+='<option value="'+a[i]['id_keadaan']+'">'+a[i]['keadaan']+'</option>';
    }
    document.getElementById('keadaanUmumResumeErmIrja').innerHTML=pegawai;

  });
}
function tampilKomunikasiPengajaranKepigd() {
  $('#Modaldiagnsoaperawatigd').modal('show');

  
  apiPOST('Kunjungan/diagnosaperawat', null,hasil=>{
    var a=hasil['kode'];
    var unit='';
    for (var i = 0; i < a.length; i++) {
      unit+='<tr>';
      unit+='<td scope="row">1</td>';
      unit+='<td><button id="idbtndiagnosaigd'+a[i]['kd_perawat']+'" onclick="detaildiagnosaperawatigd(`'+a[i]['kd_perawat']+'`)"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>&nbsp;<button  onclick="hiddendetaildiagnosaperawatigd(`'+a[i]['kd_perawat']+'`)"><i class="fa fa-times-circle" aria-hidden="true" id="idbtnhiddendiagnosaigd'+a[i]['kd_perawat']+'"></i></button></td>';
      unit+='<td>'+a[i]['kd_perawat']+'</td>';
      unit+='<td>'+a[i]['uraian']+'</td>';
      unit+='</tr>';

      unit+='<tr >';
      unit+='<td colspan="4">';
      unit+='<div class="card" id="divtrkomunikasipengajarankepigd'+a[i]['kd_perawat']+'" >';
      unit+='</div>';
      unit+='</td>';
      unit+='</tr>';



    }
    document.getElementById('tbodydiagnosaperawatigd').innerHTML=unit;

  });
}
function hiddendetaildiagnosaperawatigd(id) {
  document.getElementById('divtrkomunikasipengajarankepigd'+id+'').style.display='none';
  document.getElementById('idbtndiagnosaigd'+id+'').style.display='block';
  document.getElementById('idbtnhiddendiagnosaigd'+id+'').style.display='none';
}
function detaildiagnosaperawatigd(id) {
  document.getElementById('divtrkomunikasipengajarankepigd'+id+'').style.display='block';
  document.getElementById('idbtnhiddendiagnosaigd'+id+'').style.display='block';
  document.getElementById('idbtndiagnosaigd'+id+'').style.display='none';
  var param ={id:id,};
  apiPOST('Kunjungan/detaildiagnosaperawat', param,hasil=>{
    var a=hasil['kode'];
    var unit='';
    unit+='<table >';
    for (var i = 0; i < a.length; i++) {
      unit+='<tr>';
      unit+='<td>#</td>';
      if (a[i]['jenis']==2) {
        unit+='<td><input type="checkbox" name="dxperawatigd" value="'+a[i]['kd_produk']+'"></td>';
        unit+='<td>'+a[i]['kd_diagnosa_perawat']+'</td>';
        unit+='<td>'+a[i]['uraian']+'</td>';
      } else{
        unit+='<td><strong>'+a[i]['kd_diagnosa_perawat']+'</strong></td>';
        unit+='<td colspan="2"><strong>'+a[i]['uraian']+'</strong></td>';
      }

      unit+='</tr>';

    }
    unit+='</table>';
    unit+='<div><button class="btn btn-primary" type="button" id="btnadddiagperawatigd" onclick="inputdiagnosaperawatigd()">Simpan</button></div>'
    document.getElementById('divtrkomunikasipengajarankepigd'+id+'').innerHTML=unit;
  });
}
function inputdiagnosaperawatigd() 
{
  const btn = document.querySelector('#btnadddiagperawatigd');
  btn.addEventListener('click', (event) => {
    let checkboxes = document.querySelectorAll('input[name="dxperawatigd"]:checked');
    let values = [];
    checkboxes.forEach((checkbox) => {
      values.push(checkbox.value);
    });
    $('#Modaldiagnsoaperawatigd').modal("hide");
    var dataarray=values;
    var param={
      id_kunjungan    :$('#idKunjunganTriageIgd').val(),
      user            :user.id_user,
      order_produk    :dataarray,};
      apiPOST('Rekammedisirja/adddiagperawat',param,hasil=>{
        tampilinputdiagnosaperawatigd();
        if (hasil['pesan']=='Berhasil') {
         checkboxes=''; 
         values=[];
       } else {
         checkboxes=''; 
         values=[];
       }
     })
    }); 
}
function tampilinputdiagnosaperawatigd() {
  var param = 
  {
    id_kunjungan:document.getElementById('idKunjunganTriageIgd').value,
  };
  apiPOST('Rekammedisirja/ReviewDiagnosaPerawat', param, hasil =>{
    var u='';
    var b=hasil['data'];
    for (var i = 0; i < b.length; i++) {
      u+=b[i].kd_diagnosa_perawat+'|'+b[i].uraian+',';
    }
    document.getElementById('Diagnosaasskepigd').value=u;

  });
}

function viewtandavitalperawatigd() {
  showttdperawat();
  var param = {
    id_kunjungan: document.getElementById('idKunjunganTriageIgd').value,
  };

  apiPOST('Rekammedisirna/viewtandavitalirja', param, hasil => {
    var x = hasil['data']; 

    document.getElementById('KeadaanUmumAssPerawatIgd').value = x.keadaan_umum;
    document.getElementById('respirasiAssPerawatigd').value = x.respirasi;
    document.getElementById('nadiAssPerawatigd').value = x.nadi;
    document.getElementById('Spo2AssPerawatigd').value = x.spo2;
    document.getElementById('pupilkiriAssPerawatigd').value = x.pupil_kiri;
    document.getElementById('pupilkananAssPerawatigd').value = x.pupil_kanan;
    document.getElementById('tekananDarahAssPerawatigd1').value = x.tekanan_darah1;
    document.getElementById('tekananDarahAssPerawatigd2').value = x.tekanan_darah2;
    document.getElementById('palpasiAssPerawatigd').value = x.palpasi;
    document.getElementById('suhuAssPerawatigd').value = x.suhu;
    document.getElementById('bbAssPerawatigd').value = x.bb;
    document.getElementById('tinggiAssPerawatigd').value = x.tinggi_badan;
    document.getElementById('imtAssPerawatigd').value = x.imt;
    viewasskepigd(x.id_kunjungan);
  })
}

function viewtandavitalmedisigd() {
  showttddokter();
  var param = {
    id_kunjungan: document.getElementById('idKunjunganTriageIgd').value,
  };

  apiPOST('Rekammedisirna/viewtandavitalirja', param, hasil => {
    var x = hasil['data']; 

    document.getElementById('KeadaanUmumassmedigd').value = x.keadaan_umum;
    document.getElementById('respirasiassmedigd').value   = x.respirasi;
    document.getElementById('nadiassmedigd').value        = x.nadi;
    document.getElementById('Spo2assmedigd').value        = x.spo2;
    document.getElementById('pupilkiriassmedigd').value   = x.pupil_kiri;
    document.getElementById('pupilkananassmedigd').value  = x.pupil_kanan;
    document.getElementById('tekananDarahermigd1').value  = x.tekanan_darah1;
    document.getElementById('tekananDarahermigd2').value  = x.tekanan_darah2;
    document.getElementById('palpasiassmedigd').value     = x.palpasi;
    document.getElementById('suhuassmedigd').value        = x.suhu;
    document.getElementById('bbassmedigd').value          = x.bb;
    document.getElementById('tinggiassmedigd').value      = x.tinggi_badan;
    document.getElementById('imtassmedigd').value         = x.imt;
    //viewasstreageigd();
    viewassesmenmedigd(x.id_kunjungan);
  })
}
function cekbox() {
  if (document.getElementById('dactriage_hlevel1alist_1').checked==true ||
    document.getElementById('dactriage_hlevel1alist_2').checked==true ||
    document.getElementById('dactriage_hlevel1blist_1').checked==true ||
    document.getElementById('dactriage_hlevel1blist_2').checked==true ||
    document.getElementById('dactriage_hlevel1clist_1').checked==true ||
    document.getElementById('dactriage_hlevel1clist_2').checked==true ||
    document.getElementById('dactriage_hlevel1clist_3').checked==true ||
    document.getElementById('dactriage_hlevel1dlist_1').checked==true ||
    document.getElementById('dactriage_hlevel1dlist_2').checked==true) {
    document.getElementById('dactriage_hlevel').value='1';
} else if(document.getElementById('dactriage_hlevel2alist_1').checked==true ||
  document.getElementById('dactriage_hlevel2alist_2').checked==true ||
  document.getElementById('dactriage_hlevel2blist_1').checked==true ||
  document.getElementById('dactriage_hlevel2blist_2').checked==true ||
  document.getElementById('dactriage_hlevel2clist_1').checked==true ||
  document.getElementById('dactriage_hlevel2clist_2').checked==true ||
  document.getElementById('dactriage_hlevel2clist_3').checked==true ||
  document.getElementById('dactriage_hlevel2clist_4').checked==true ||
  document.getElementById('dactriage_hlevel2dlist_1').checked==true ||
  document.getElementById('dactriage_hlevel2dlist_2').checked==true ||
  document.getElementById('dactriage_hlevel2dlist_3').checked==true ){
 document.getElementById('dactriage_hlevel').value='2';
} else if(document.getElementById('dactriage_hlevel3alist_1').checked==true ||
  document.getElementById('dactriage_hlevel3blist_1').checked==true ||
  document.getElementById('dactriage_hlevel3clist_1').checked==true ||
  document.getElementById('dactriage_hlevel3clist_2').checked==true ||
  document.getElementById('dactriage_hlevel3dlist_1').checked==true ||
  document.getElementById('dactriage_hlevel3dlist_2').checked==true ||
  document.getElementById('dactriage_hlevel3dlist_3').checked==true ||
  document.getElementById('dactriage_hlevel3dlist_4').checked==true){
  document.getElementById('dactriage_hlevel').value='3';
}else if(document.getElementById('dactriage_hlevel4alist_1').checked==true ||
  document.getElementById('dactriage_hlevel4dlist_1').checked==true ||
  document.getElementById('dactriage_hlevel4dlist_2').checked==true ||
  document.getElementById('dactriage_hlevel4blist_1').checked==true ||
  document.getElementById('dactriage_hlevel4clist_1').checked==true ){
  document.getElementById('dactriage_hlevel').value='4';
}else if(document.getElementById('dactriage_hlevel5alist_1').checked==true ||
  document.getElementById('dactriage_hlevel5blist_1').checked==true ||
  document.getElementById('dactriage_hlevel5clist_1').checked==true ||
  document.getElementById('dactriage_hlevel5dlist_1').checked==true ||
  document.getElementById('dactriage_hlevel5dlist_2').checked==true ){
 document.getElementById('dactriage_hlevel').value='5';
}

}

/*$(document).on('keyup', '#ermrwjkeperawatanbbturunkg', function(e) {
  var turunbb=document.getElementById('ermrwjkeperawatanbbturunkg').value;
  if($(this).val() !== '')
  {
   var charCode = e.which || e.keyCode;
   if(charCode == 40)
    {
    switch(turunbb){
    case '1':
     document.getElementById('ermrwjkeperawatantotalskor').value='1';
     break;
   case '2':
    document.getElementById('ermrwjkeperawatantotalskor').value='2';
    break;
  case '3':
    document.getElementById('ermrwjkeperawatantotalskor').value='3';
    break;
  case '4':
    document.getElementById('ermrwjkeperawatantotalskor').value='4';
    break;
  default:

     }
   }
      if(charCode == 38)
    {
    switch(turunbb){
    case '1':
     document.getElementById('ermrwjkeperawatantotalskor').value='1';
     break;
   case '2':
    document.getElementById('ermrwjkeperawatantotalskor').value='2';
    break;
  case '3':
    document.getElementById('ermrwjkeperawatantotalskor').value='3';
    break;
  case '4':
    document.getElementById('ermrwjkeperawatantotalskor').value='4';
    break;
  default:

     }
   }
      if(charCode == 13)
    {
    switch(turunbb){
    case '1':
     document.getElementById('ermrwjkeperawatantotalskor').value='1';
     break;
   case '2':
    document.getElementById('ermrwjkeperawatantotalskor').value='2';
    break;
  case '3':
    document.getElementById('ermrwjkeperawatantotalskor').value='3';
    break;
  case '4':
    document.getElementById('ermrwjkeperawatantotalskor').value='4';
    break;
  default:

     }
   }
 }
})*/

function suratsehatigd() {
  var ermjson_data = {
    'id_kunj'     : $('#idKunjunganTriageIgd').val(),
    'id_transaksi':$('#idtransaksiTriageIgd').val(),
    'tgl_kunj'    : "<?php echo date('Y-m-d') ?>",
    'nowday'      : "<?php echo date('Y-m-d') ?>",
    'rm'          : $('#rmTriageIgd').val(),
    'nama'        : $('#namaTriageIgd').val().replace(/ /g, '%20'),
    'alamat'      : alamatpasien.replace(/ /g, '%20'),
    'umur'        : tgllahir.replace(/ /g, '%20'),
  };

  var ERMmyJSON = JSON.stringify(ermjson_data);
  $('.rekammedisigd_suratsehat_content').load('Ermigd/suratsehatigd?data='+ERMmyJSON);
}
function suratkelahiranigd() {
  var ermjson_data = {
    'id_kunj'     : $('#idKunjunganTriageIgd').val(),
    'id_transaksi':$('#idtransaksiTriageIgd').val(),
    'tgl_kunj'    : "<?php echo date('Y-m-d') ?>",
    'nowday'      : "<?php echo date('Y-m-d') ?>",
    'rm'          : $('#rmTriageIgd').val(),
    'nama'        : $('#namaTriageIgd').val().replace(/ /g, '%20'),
    'alamat'      : alamatpasien.replace(/ /g, '%20'),
    'umur'        : tgllahir.replace(/ /g, '%20'),
  };

  var ERMmyJSON = JSON.stringify(ermjson_data);
  $('.rekammedisigd_suratkelahiran_content').load('Ermigd/suratkelahiranigd?data='+ERMmyJSON);
}
function suratkematianigd() {
  var ermjson_data = {
    'id_kunj'     : $('#idKunjunganTriageIgd').val(),
    'transaksi': $('#idtransaksiTriageIgd').val(),
    'tgl_kunj'    : "<?php echo date('Y-m-d') ?>",
    'nowday'      : "<?php echo date('Y-m-d') ?>",
    'rm'          : $('#rmTriageIgd').val(),
    'nama'        : $('#namaTriageIgd').val().replace(/ /g, '%20'),
    'alamat'      : alamatpasien.replace(/ /g, '%20'),
    'umur'        : tgllahir.replace(/ /g, '%20'),
  };

  var ERMmyJSON = JSON.stringify(ermjson_data);
  $('.rekammedisigd_suratkematian_content').load('Ermigd/suratkematianigd?data='+ERMmyJSON);
}

function assesmengiziigd() {
  var turunbb=document.getElementById('ermrwjkeperawatanbbturunkg').value;
  switch(turunbb){
  case '1':
    document.getElementById('ermrwjkeperawatantotalskor').value='1';
    break;
  case '2':
    document.getElementById('ermrwjkeperawatantotalskor').value='2';
    break;
  case '3':
    document.getElementById('ermrwjkeperawatantotalskor').value='3';
    break;
  case '4':
    document.getElementById('ermrwjkeperawatantotalskor').value='4';
    break;
  default:

  }
}
$(document).on('keyup', '#intervensiasskepigd', function(e) {
  if($(this).val() !== '')
  {
   var charCode = e.which || e.keyCode;
   if(charCode == 40)
   {
    DiagnosaKeperawatanigd();
  } 
  else if(charCode == 38)
  {
    DiagnosaKeperawatanigd();
  }
  else    (charCode == 13)
  {
    DiagnosaKeperawatanigd();
  }
}else{
  document.getElementById("Divintervensiasskepigd").innerHTML="";
}
})
$(document).on('keyup', '#cariorderlabermigd', function(e) {
  if($(this).val() !== '')
  {
   var charCode = e.which || e.keyCode;
   if(charCode == 40)
   {
    cariorderlabermigd();
  } 
  else if(charCode == 38)
  {
    cariorderlabermigd();
  }
  else    (charCode == 13)
  {
    cariorderlabermigd();
  }
}else{
  document.getElementById("DivPenyakitFam").innerHTML="";
}
})
function cariorderlabermigd() {
  var a='';
  var param={produk:document.getElementById('cariorderlabermigd').value,};
  apiPOST('Lab/produklabby', param, hasil =>{
    var b=hasil['produk'];
    for (var i = 0; i < b.length; i++) {
      a+='<div class="col-md-6">';
      a+='<div class="form-group">';
      a+='<div class="custom-control custom-checkbox ">';
      a+='<input name="lacrequestlabemrdiag_test" value="'+b[i].id_produk+'" type="checkbox"  id="lacrequestlabemrdiag_test_'+b[i].id_produk+'" onclick="tambahproduklabermigd(`'+b[i].id_produk+'`,`'+b[i].nama_produk+'`)" >';
      a+='<label class="form-label" for="lacrequestlabemrdiag_test_'+b[i].id_produk+'" id="lacrequestlabemrdiag_labeltest_'+b[i].id_produk+'">'+b[i].nama_produk+'</label>';
      a+='</div>';
      a+='</div>';
      a+='</div>';
    }
    document.getElementById('lacrequestlabemrdiag_grouptest_2').innerHTML=a;

  });
}
function tambahproduklabermigd(id_produk,nama) {
 var a='';
 if (id_produk!='') {  
  a+='<div class="col-md-6">';
  a+='<div class="form-group">';
  a+='<div class="custom-control custom-checkbox ">';
  a+='<input name="lacrequestlabemrdiag_request" value="'+id_produk+'" type="checkbox"  id="lacrequestlabemrdiag_test_'+id_produk+'" checked >';
  a+='<label class="form-label" for="lacrequestlabemrdiag_request_'+id_produk+'" id="lacrequestlabemrdiag_labelrequest_'+id_produk+'">'+nama+'</label>';
  a+='</div>';
  a+='</div>';
  a+='</div>';
} 
$('#lacrequestlabemrdiag_grouptest_request').append(a);
}
function hitungimttreageigd() {
  var imt='';
  var num='';
  var a=document.getElementById('tinggiTriageIgd').value;
  var b=document.getElementById('bbTriageIgd').value;
  var num=a/100;
  number=b/(num*num);
  imt=number.toFixed(2)
  document.getElementById('imtTriageIgd').value=imt;
}
$(document).on('keyup', '#imtTriageIgd', function(e) {

 var charCode = e.which || e.keyCode;
 if(charCode == 40)
 {
  hitungimttreageigd();
} 
else if(charCode == 38)
{
  hitungimttreageigd();
}
else    (charCode == 13)
{
  hitungimttreageigd();
}

})
function hitungimtkepigd() {
  var imt='';
  var num='';
  var a=document.getElementById('tinggiAssPerawatigd').value;
  var b=document.getElementById('bbAssPerawatigd').value;
  var num=a/100;
  imt=b/(num*num);
  document.getElementById('imtAssPerawatigd').value=imt;
}
$(document).on('keyup', '#imtAssPerawatigd', function(e) {

 var charCode = e.which || e.keyCode;
 if(charCode == 40)
 {
  hitungimtkepigd();
} 
else if(charCode == 38)
{
  hitungimtkepigd();
}
else    (charCode == 13)
{
  hitungimtkepigd();
}

})
function hitungimtmedisigd() {
  var imt='';
  var num='';
  var a=document.getElementById('tinggiassmedigd').value;
  var b=document.getElementById('bbassmedigd').value;
  var num=a/100;
  imt=b/(num*num);
  document.getElementById('imtassmedigd').value=imt;
}
$(document).on('keyup', '#imtassmedigd', function(e) {

 var charCode = e.which || e.keyCode;
 if(charCode == 40)
 {
  hitungimtmedisigd();
} 
else if(charCode == 38)
{
  hitungimtmedisigd();
}
else    (charCode == 13)
{
  hitungimtmedisigd();
}

})

function tampilpekerjaanperermigd() {
  apiPOST('Data_Sosial/pekerjaan', null,hasil=>{
    var pekerjaan='';
    var a=hasil['data'];
    pekerjaan = ""
    for (var i = 0; i < a.length; i++) {
      pekerjaan+='<option value="'+a[i]['kd_pekerjaan']+'">'+a[i]['pekerjaan']+'</option>';
    }
    document.getElementById('pekerjaanAssKeperawatanErmIgd').innerHTML=pekerjaan;
    document.getElementById('pekerjaanassmedigd').innerHTML=pekerjaan;
  });
}

function Rlkegiatan() {
  apiPOST('Rekammedisigd/Rlkegiatan', null,hasil=>{
    var a=hasil['data'];
    var rl='<option value="">--Pilihan--</option>';
    for (var i = 0; i < a.length; i++) {
      rl+='<option value="'+a[i]['id_kegiatan']+'">'+a[i]['nama_kegiatan']+'</option>';
    }
    document.getElementById('rlkegiatanIGD').innerHTML=rl;
  });
}
//tampil penunjang
function tampilpenunjangigd(rm){

  var barisrmhis = ''; 
  var param = {
    norm: rm,
  };
  apiPOST('Rekammedisigd/datapenunjangpasienigd', param, hasil => {
    if (hasil['code']=="00") {
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        var tgl = a[i].tgl_rencana_lab.substr(8, 2);
        var bln = a[i].tgl_rencana_lab.substr(5, 2);
        var thn = a[i].tgl_rencana_lab.substr(0, 4);
        tgl_rencana_lab = tgl + '/' + bln + '/' + thn;
        barisrmhis += '<div class="card card-secondary collapsed-card">';
        barisrmhis += '<div class="card-header">';
        barisrmhis += '<span style="font-size: 12px;" class="card-title">Labotarium PK '+ tgl_rencana_lab +' - '+ a[i]['pengirim']+' '+a[i]['id_kunjungan_lab']+' </span>';
        barisrmhis += '<div class="card-tools">';
        barisrmhis += '<button type="button"  class="btn btn-tool" data-card-widget="collapse" fdprocessedid="smpdqi"><i class="fas fa-plus"></i>';
        barisrmhis += '</button>';
        barisrmhis += '</div>';
        barisrmhis += '</div>';
        barisrmhis += '<div class="card-body">';
        barisrmhis += '<div class="row">';
        barisrmhis += '<div class="col-md-12">';
        barisrmhis += '<table   class="table table-striped table-sm">';
        barisrmhis += '<thead>';
        barisrmhis += '<tr>';
        barisrmhis += '<th style="width: 15px">#</th>';
        barisrmhis += '<th style="width: 80px"><h3>PEMERIKSAAN</h3></th>';
        barisrmhis += '<th><h3>HASIL</h3></th>';
        barisrmhis += '<th><h3>ACUAN</h3></th>';
        barisrmhis += '</tr>';
        barisrmhis += '</thead>';
        barisrmhis += '<tbody id="bodypenunjanglabigd'+a[i]['id_kunjungan_lab']+'"></tbody>';
        barisrmhis += '</table>';
        barisrmhis += '</div>';
        barisrmhis += '</div>';
        barisrmhis += '</div>';
        barisrmhis += '</div>';
        detaillabermigd(a[i]['id_kunjungan_lab']);
      // eresep(a[i]['id_kunjungan'],a[i].tgl_masuk,a[i].tgl_masuk);
      // obatditerima(a[i]['id_kunjungan']);
      // detailmrpenyakitmedermirja(a[i]['id_kunjungan']);
      // detailicd9medermirja(a[i]['id_kunjungan']);

      }
      document.getElementById('listhistoripenunjangigd').innerHTML = barisrmhis;
    }
  })
}
//tampil radiologi
function tampilpenunjangradiologiigd(){

  var barisrmhis = ''; 
  var param = {
    norm: document.getElementById('rmTriageIgd').value,
  };
  apiPOST('Rekammedisigd/datapenunjangradiologipasienigd', param, hasil => {
    if (hasil['code']=="00") {
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        var tgl = a[i].tgl_rencana_rad.substr(8, 2);
        var bln = a[i].tgl_rencana_rad.substr(5, 2);
        var thn = a[i].tgl_rencana_rad.substr(0, 4);
        tgl_rencana = tgl + '/' + bln + '/' + thn;
        barisrmhis += '<div class="card card-secondary collapsed-card">';
        barisrmhis += '<div class="card-header">';
        barisrmhis += '<span style="font-size: 12px;" class="card-title">Radiologi '+ tgl_rencana +' - '+ a[i]['pengirim']+' '+a[i]['id_kunjungan']+' </span>';
        barisrmhis += '<div class="card-tools">';
        barisrmhis += '<button type="button"  class="btn btn-tool" data-card-widget="collapse" fdprocessedid="smpdqi"><i class="fas fa-plus"></i>';
        barisrmhis += '</button>';
        barisrmhis += '</div>';
        barisrmhis += '</div>';
        barisrmhis += '<div class="card-body">';
        barisrmhis += '<div class="row">';
        barisrmhis += '<div class="col-md-12">';
        barisrmhis += '<p>'+a[i]['hasil_pembacaan']+'</p>';
        barisrmhis += '</div>';
        barisrmhis += '</div>';
        barisrmhis += '</div>';
        barisrmhis += '</div>';
      }
      document.getElementById('listhistoripenunjangradigd').innerHTML = barisrmhis;
    }
  })
}
function detaillabermigd(id_kunj) {
  var param={id_kunjungan:id_kunj,};
  apiPOST('Rekammedisigd/detaillaboratorium',param,hasil=>{
    var barisrmhis='';
    var a = hasil['data'];
    if (hasil['code']=="200") { 
      for (var i = 0; i < a.length; i++) {
        //barisrmhis += '<div>'+a[i].nama_obat+''+a[i].jumlah+''+a[i].kd_satuan+'</div>';
        barisrmhis += '<tr>';
        barisrmhis += '<th style="width: 15px">#</th>';
        barisrmhis += '<th >'+a[i].nama_indikator_hasil+'</th>';
        barisrmhis += '<th style="width: 120px">'+a[i].hasil+'</th>';
        barisrmhis += '<th style="width: 120px">'+a[i].normal+'</th>';
        barisrmhis += '</tr>';

      }
      document.getElementById('bodypenunjanglabigd'+id_kunj).innerHTML=barisrmhis;
    }
  })
}
function tampilagamaperermigd() {
  apiPOST('Data_Sosial/agama', null,hasil=>{
    var agama='';
    var a=hasil['data'];
    agama = ""
    for (var i = 0; i < a.length; i++) {
      agama+='<option value="'+a[i]['kd_agama']+'">'+a[i]['agama']+'</option>';
    }
    document.getElementById('AgamaAssKeperawatanErmIgd').innerHTML=agama;
    document.getElementById('checkAgamaassmedigd').innerHTML=agama;
  });
}
function DiagnosaKeperawatanigd() {
  var param ={id:document.getElementById("intervensiasskepigd").value,};
  apiPOST('Kunjungan/IntervensiKeperawatan', param,hasil=>{
    var a=hasil['kode'];
    var unit='';
    for (var i = 0; i < a.length; i++) {
      unit+='<button class="btn btn-primary" onclick="pilihIntervensiKepigd(`'+a[i]['uraian']+'`)">'+a[i]['kode_produk']+'|'+a[i]['uraian']+'</button><br>';
    }
    document.getElementById('Divintervensiasskepigd').innerHTML=unit;
  });
}
function pilihIntervensiKepigd(kode) {

  document.getElementById("intervensiasskepigd").value=kode;
  document.getElementById("Divintervensiasskepigd").innerHTML="";
}
$(document).on('keyup', '#Diagnosaasskepigd', function(e) {
  if($(this).val() !== '')
  {
   var charCode = e.which || e.keyCode;
   if(charCode == 40)
   {
    KomunikasiPengajaranKepigd();
  } 
  else if(charCode == 38)
  {
    KomunikasiPengajaranKepigd();
  }
  else    (charCode == 13)
  {
    KomunikasiPengajaranKepigd();
  }
}else{
  document.getElementById("DivDiagnosaasskepigd").innerHTML="";
}
})
function KomunikasiPengajaranKepigd() {
  var param ={id:document.getElementById("Diagnosaasskepigd").value,};
  apiPOST('Kunjungan/KomunikasiKeperawatan', param,hasil=>{
    var a=hasil['kode'];
    var unit='';
    for (var i = 0; i < a.length; i++) {
      unit+='<button class="btn btn-primary" onclick="pilihKomunikasiPengajaranKepigd(`'+a[i]['uraian']+'`)">'+a[i]['kode_produk']+'|'+a[i]['uraian']+'</button><br>';
    }
    document.getElementById('DivDiagnosaasskepigd').innerHTML=unit;
  });
}
function pilihKomunikasiPengajaranKepigd(kode) {

  document.getElementById("Diagnosaasskepigd").value=kode;
  document.getElementById("DivDiagnosaasskepigd").innerHTML="";
}
/*icd 10*/
$(document).on('keyup', '#textTambahdiagnosaresumemedErmigd', function(e) {
  if($(this).val() !== '')
  {
   var charCode = e.which || e.keyCode;
   if(charCode == 40)
   {
    penyakittambahresumemedermigd();
  } 
  else if(charCode == 38)
  {
    penyakittambahresumemedermigd();
  }
  else    (charCode == 13)
  {
    penyakittambahresumemedermigd();
  }
}else{
  document.getElementById("DivTambahdiagnosaresumemedErmigd").innerHTML="";
}
})
/*icd 9*/
$(document).on('keyup', '#textTambahicd9resumemedErmigd', function(e) {
  if($(this).val() !== '')
  {
   var charCode = e.which || e.keyCode;
   if(charCode == 40)
   {
    icdtambahresumemedermigd();
  } 
  else if(charCode == 38)
  {
    icdtambahresumemedermigd();
  }
  else    (charCode == 13)
  {
    icdtambahresumemedermigd();
  }
}else{
  document.getElementById("DivTambahcdi9resumemedErmigd").innerHTML="";
}
})
/*icd 10*/
function penyakittambahresumemedermigd() {
  var param ={id:document.getElementById("textTambahdiagnosaresumemedErmigd").value,};
  apiPOST('Kunjungan/icd', param,hasil=>{
    var a=hasil['icd'];
    var unit='';
    for (var i = 0; i < a.length; i++) {
      unit+='<button class="btn btn-primary"  onclick="pilihPenyakittambahresumemedermigd(`'+a[i]['id_penyakit']+'|'+a[i]['penyakit']+'`)">'+a[i]['penyakit']+'</button><br>';
    }
    document.getElementById('DivTambahdiagnosaresumemedErmigd').innerHTML=unit;
  });
}
/*icd 9*/
function icdtambahresumemedermigd() {
  var param ={id:document.getElementById("textTambahicd9resumemedErmigd").value,};
  apiPOST('Kunjungan/icd9', param,hasil=>{
    var a=hasil['icd'];
    var unit='';
    for (var i = 0; i < a.length; i++) {
      unit+='<button class="btn btn-primary"  onclick="pilihicd9tambahresumemedermigd(`'+a[i]['kd_icd9']+'|'+a[i]['deskripsi']+'`)">'+a[i]['deskripsi']+'</button><br>';
    }
    document.getElementById('DivTambahicd9resumemedErmigd').innerHTML=unit;
  });
}
/*icd 10*/
function pilihPenyakittambahresumemedermigd(kode) {
  var res = kode.split('|');
  var icd = res[0];
  var kunjungan=document.getElementById('kunjunganaddpenyakitigd').value;
  var status   =document.getElementById('selectstatusicd10').value;
  document.getElementById("DivTambahdiagnosaresumemedErmigd").innerHTML="";
  var param={
    rm     :document.getElementById('rmTriageIgd').value,
    unit   :document.getElementById('unitaddpenyakitigd').value,
    id_kunjungan :kunjungan,
    kode   :icd,
    stat   :status
  };
  apiPOST('Rekammedisirja/addmrpenyakitirja',param,hasil=>{
    $('#ModalShowaddmrpenyakitmedermigd').modal('hide');
    detailmrpenyakitmedermigd(kunjungan);
  });

}
function inputpermohonanRadiologiigd() 
{
  const btn = document.querySelector('#buttonOrderRad');
  btn.addEventListener('click', (event) => {
    let checkboxes = document.querySelectorAll('input[name="lacrequestrademrdiag_test"]:checked');
    let values = [];
    checkboxes.forEach((checkbox) => {
      values.push(checkbox.value);
    });
    $('#ModalPermintaancheckboxlogiigd').modal("hide");
    var dataarray=values;
    var param={
      id_kunjungan    :$('#idKunjunganTriageIgd').val(),
      user            :user.id_user,
      tgl_rencana_rad :$('#tglOrderRad').val(),
      order_produk    :dataarray,};
      apiPOST('Radiologi/addOrderRad',param,hasil=>{
        if (hasil['pesan']=='Berhasil') {
         checkboxes=''; 
         values=[];
       } else {
         checkboxes=''; 
         values=[];
       }
     })
    });  
}
/*icd 9*/
function inputpermohonanlaboratoriumigd() 
{
  const btn = document.querySelector('#buttonOrderLab');
  btn.addEventListener('click', (event) => {
    let checkboxes = document.querySelectorAll('input[name="lacrequestlabemrdiag_request"]:checked');
    let values = [];
    checkboxes.forEach((checkbox) => {
      values.push(checkbox.value);
    });
    $('#ModalPermintaanLabIrja').modal("hide");
    var dataarray=values;
    var param={
      id_kunjungan    :$('#idKunjunganTriageIgd').val(),
      user            :user.id_user,
      tgl_rencana_lab :$('#tglOrderLab').val(),
      order_produk    :dataarray,};
      apiPOST('Lab/addOrder',param,hasil=>{
        if (hasil['pesan']=='Berhasil') {
         checkboxes=''; 
         values=[];
         document.getElementById('lacrequestlabemrdiag_grouptest_request').innerHTML='';
         LabKimiaKlinis();
       } else {
         checkboxes=''; 
         values=[];
       }
     })
    }); 

}
function LabKimiaKlinis() {
  var a='';
  apiPOST('Lab/produk', null, hasil =>{
    var b=hasil['produk'];
    for (var i = 0; i < b.length; i++) {
      a+='<div class="col-md-6">';
      a+='<div class="form-group">';
      a+='<div class="custom-control custom-checkbox ">';
      a+='<input name="lacrequestlabemrdiag_test" value="'+b[i].id_produk+'" type="checkbox"  id="lacrequestlabemrdiag_test_'+b[i].id_produk+'"  onclick="tambahproduklabermirja(`'+b[i].id_produk+'`,`'+b[i].nama_produk+'`)">';
      a+='<label class="form-label" for="lacrequestlabemrdiag_test_'+b[i].id_produk+'" id="lacrequestlabemrdiag_labeltest_'+b[i].id_produk+'">'+b[i].nama_produk+'</label>';
      a+='</div>';
      a+='</div>';
      a+='</div>';
    }
    document.getElementById('lacrequestlabemrdiag_grouptest_2').innerHTML=a;

  });
}

function pilihicd9tambahresumemedermigd(kode) {
  var res = kode.split('|');
  var icd = res[0];
  var kunjungan=document.getElementById('kunjunganaddicd9igd').value;
  document.getElementById("DivTambahdiagnosaresumemedErmigd").innerHTML="";
  var param={
    rm     :document.getElementById('rmTriageIgd').value,
    unit   :document.getElementById('unitaddicd9igd').value,
    id_kunjungan :kunjungan,
    kode   :icd,
    stat   :2,
  };
  apiPOST('Rekammedisirja/addmricd9irja',param,hasil=>{
    $('#ModalShowaddicd9medermigd').modal('hide');
    detailicd9medermigd(kunjungan);
  });

}
function simpanAssesmenmedisigd() {
  var param={
    id_kunjungan                :$('#idKunjunganTriageIgd').val(),
    keluhanutamaErmIrja         :$('#keluhanutamaassmedigd').val(),
    RiwayatPenyakitNowErmIrja   :$('#Riwayatpenyakitnowassmedigd').val(),
    TinggalBersamaErmIRja       :document.querySelector('input[name=TinggalBersamaassmedigd]:checked').value,
    statusmentalErmIrja         :document.querySelector('input[name=statusmentalassmedigd]:checked').value,
    statusPsikologis            :document.querySelector('input[name=statusPsikologisassmedigd]:checked').value,
    penggunaanRestrainErmIrja   :document.querySelector('input[name=penggunaanRestrainassmedigd]:checked').value,
    BudayaErmIrja               :$('#Budayaassmedigd').val(), 
    KeadaanUmumassmedigd        :$('#KeadaanUmumassmedigd').val(),
    respirasiassmedigd          :$('#respirasiassmedigd').val(),
    nadiassmedigd               :$('#nadiassmedigd').val(),
    Spo2assmedigd               :$('#Spo2assmedigd').val(),
    pupilkiriassmedigd          :$('#pupilkiriassmedigd').val(),
    pupilkananassmedigd         :$('#pupilkananassmedigd').val(),
    tekananDarahassmedigd1      :$('#tekananDarahermigd1').val(),
    tekananDarahassmedigd2      :$('#tekananDarahermigd2').val(),  
    palpasiassmedigd            :$('#palpasiassmedigd').val(),
    suhuassmedigd               :$('#suhuassmedigd').val(),
    reflekCahayaKiriassmedigd   :$('#reflekCahayaKiriassmedigd').val(),
    reflekCahayaKananassmedigd  :$('#reflekCahayaKananassmedigd').val(),
    bbassmedigd                   :$('#bbassmedigd').val(),
    tinggiassmedigd               :$('#tinggiassmedigd').val(),
    imtassmedigd                   :$('#imtassmedigd').val(),
    dacrjasesmenmedis_bgcstot   :$('#dacrjasesmenmedis_bgcstot').val(),
    tipekesadaranassmedmigd     :$('#tipekesadaranassmedmigd').val(),
    Assesmenassmedigd              :$('#Assesmenassmedigd').val(),
    tindakanassmedigd              :$('#tindakanassmedigd').val(),
    planningassmedigd              :$('#planningassmedigd').val(),
    fisikStatusLocalisassmedigd    :$('#fisikStatusLocalisassmedigd').val(),
    pasienKompleksassmedigd        :document.querySelector('input[name=pasienKompleksassmedigd]:checked').value,
    fisikKepalaErmIrja           :document.querySelector('input[name=fisikKepalaassmedigd]:checked').value,
    fisikKepalaErmIrjaKet       :$('#fisikKepalaassmedigdKet').val(),
    fisikJantungErmIrja         :document.querySelector('input[name=fisikJantungassmedigd]:checked').value,
    fisikJantungErmIrjaKet      :$('#fisikJantungassmedigdKet').val(),
    fisikMataErmIrja            :document.querySelector('input[name=fisikMataassmedigd]:checked').value,
    fisikMataErmIrjaKet         :$('#fisikMataassmedigdKet').val(),
    fisikParuErmIrja            :document.querySelector('input[name=fisikParuassmedigd]:checked').value,
    fisikParuErmIrjaKet         :$('#fisikParuassmedigdKet').val(),
    fisikThtErmIrja             :document.querySelector('input[name=fisikThtassmedigd]:checked').value,
    fisikThtErmIrjaKet          :$('#fisikThtassmedigdKet').val(),
    fisikAbdomenErmIrja         :document.querySelector('input[name=fisikAbdomenassmedigd]:checked').value,
    fisikAbdomenErmIrjaKet      :$('#fisikAbdomenassmedigdKet').val(),                           
    fisikLeherErmIrja           :document.querySelector('input[name=fisikLeherassmedigd]:checked').value,
    fisikLeherErmIrjaKet        :$('#fisikLeherassmedigdKet').val(),
    fisikGenitaliaErmIrja       :document.querySelector('input[name=fisikGenitaliaassmedigd]:checked').value,
    fisikGenitaliaErmIrjaKet    :$('#fisikGenitaliaassmedigdKet').val(),
    fisikMulutErmIrja           :document.querySelector('input[name=fisikMulutassmedigd]:checked').value,
    fisikMulutErmIrjaKet        :$('#fisikMulutassmedigdKet').val(),
    fisikThoraxErmIrja          :document.querySelector('input[name=fisikThoraxassmedigd]:checked').value,
    fisikThoraxErmIrjaKet       :$('#fisikThoraxassmedigdKet').val(),
      //gigi
    dacrjasesmengigmedis_glidahket   :$('#dacrjasesmengigmedis_glidahket').val(),
    dacrjasesmengigmedis_gmukosapipi :$('#dacrjasesmengigmedis_gmukosapipi').val(),
    dacrjasesmengigmedis_goklusiId   :document.querySelector('input[name=dacrjasesmengigmedis_goklusiId]:checked').value,
    dacrjasesmengigmedis_gtorus1Id   :document.querySelector('input[name=dacrjasesmengigmedis_gtorus1Id]:checked').value,
    dacrjasesmengigmedis_gtorus2Id   :document.querySelector('input[name=dacrjasesmengigmedis_gtorus2Id]:checked').value,
    dacrjasesmengigmedis_gpalatumId  :document.querySelector('input[name=dacrjasesmengigmedis_gpalatumId]:checked').value,
    dacrjasesmengigmedis_gdiastemaId :document.querySelector('input[name=dacrjasesmengigmedis_gdiastemaId]:checked').value,
    dacrjasesmengigmedis_gdiastemaket:$('#dacrjasesmengigmedis_gdiastemaket').val(),
    dacrjasesmengigmedis_ganomaliId  :$('#dacrjasesmengigmedis_ganomaliId').val(),
    dacrjasesmengigmedis_ganomaliket :$('#dacrjasesmengigmedis_ganomaliket').val(),
    dacrjasesmengigmedis_gfrenulum1Id:document.querySelector('input[name=dacrjasesmengigmedis_gfrenulum1Id]:checked').value,
    dacrjasesmengigmedis_gfrenulum2Id:document.querySelector('input[name=dacrjasesmengigmedis_gfrenulum2Id]:checked').value,
    dacrjasesmengigmedis_gohisId     :document.querySelector('input[name=dacrjasesmengigmedis_gohisId]:checked').value,
    dacrjasesmengigmedis_gtemuanlain :$('#dacrjasesmengigmedis_gtemuanlain').val(),
      //mata
    dacrjasesmenmatmedis_mod    :$('#dacrjasesmenmatmedis_mod').val(),
    dacrjasesmenmatmedis_mos    :$('#dacrjasesmenmatmedis_mos').val(),
    dacrjasesmenmatmedis_madisi :$('#dacrjasesmenmatmedis_madisi').val(),
    dacrjasesmenmatmedis_mavod  :$('#dacrjasesmenmatmedis_mavod').val(),
    dacrjasesmenmatmedis_mavos  :$('#dacrjasesmenmatmedis_mavos').val(),
    dacrjasesmenmatmedis_mishiharaId  :document.querySelector('input[name=dacrjasesmenmatmedis_mishiharaId]:checked').value,
    dacrjasesmenmatmedis_mschimer1    :$('#dacrjasesmenmatmedis_mschimer1').val(),
    dacrjasesmenmatmedis_mschimer2    :$('#dacrjasesmenmatmedis_mschimer2').val(),
      //obgyn
    dacrjasesmenmtmedis_obgId :document.querySelector('input[name=dacrjasesmenmtmedis_obgId]:checked').value,
    dacrjasesmenmtmedis_otfu  :$('#dacrjasesmenmtmedis_otfu').val(),
    dacrjasesmenmtmedis_olila :$('#dacrjasesmenmtmedis_olila').val(),
    dacrjasesmenmtmedis_ohis  :$('#dacrjasesmenmtmedis_ohis').val(),
    dacrjasesmenmtmedis_ohislama :$('#dacrjasesmenmtmedis_ohislama').val(),
    dacrjasesmenmtmedis_odjj  :$('#dacrjasesmenmtmedis_odjj').val(),
    dacrjasesmenmtmedis_ovulva :$('#dacrjasesmenmtmedis_ovulva').val(),
    dacrjasesmenmtmedis_oportio:$('#dacrjasesmenmtmedis_oportio').val(),
    dacrjasesmenmtmedis_ocorpus:$('#dacrjasesmenmtmedis_ocorpus').val(),
    dacrjasesmenmtmedis_oparametrium:$('#dacrjasesmenmtmedis_oparametrium').val(),
    dacrjasesmenmtmedis_ocavum      :$('#dacrjasesmenmtmedis_ocavum').val(),
    dacrjasesmenmtmedis_ovulvadalam :$('#dacrjasesmenmtmedis_ovulvadalam').val(),
    dacrjasesmenmtmedis_oportiodalam:$('#dacrjasesmenmtmedis_oportiodalam').val(),
    dacrjasesmenmtmedis_opembukaan  :$('#dacrjasesmenmtmedis_opembukaan').val(),
    dacrjasesmenmtmedis_ohodge      :$('#dacrjasesmenmtmedis_ohodge').val(),
    dacrjasesmenmtmedis_opresentasi :$('#dacrjasesmenmtmedis_opresentasi').val(),
    dacrjasesmenmtmedis_oketuban    :$('#dacrjasesmenmtmedis_oketuban').val(),
      //hd
    dacrjasesmenmedishd_kolaborasihdlist_1 :document.querySelectorAll('input[name="dacrjasesmenmedishd_kolaborasihdlist_1"]:checked'),
    dacrjasesmenmedishd_kolaborasihdlist_2 :document.querySelectorAll('input[name="dacrjasesmenmedishd_kolaborasihdlist_2"]:checked'),
    dacrjasesmenmedishd_kolaborasihdlist_3 :document.querySelectorAll('input[name="dacrjasesmenmedishd_kolaborasihdlist_3"]:checked'),
    dacrjasesmenmedishd_kolaborasihdlist_4 :document.querySelectorAll('input[name="dacrjasesmenmedishd_kolaborasihdlist_4"]:checked'),
    dacrjasesmenmedishd_kolaborasihdlist_5 :document.querySelectorAll('input[name="dacrjasesmenmedishd_kolaborasihdlist_5"]:checked'),
    dacrjasesmenmedishd_kolaborasihdlist_6 :document.querySelectorAll('input[name="dacrjasesmenmedishd_kolaborasihdlist_6"]:checked'),
    dacrjasesmenmedishd_kolaborasihdlist_7 :document.querySelectorAll('input[name="dacrjasesmenmedishd_kolaborasihdlist_7"]:checked'),
    dacrjasesmenmedishd_kolaborasihdlist_8 :document.querySelectorAll('input[name="dacrjasesmenmedishd_kolaborasihdlist_8"]:checked'),
    dacrjasesmenmedishd_kolaborasihdlist_9 :document.querySelectorAll('input[name="dacrjasesmenmedishd_kolaborasihdlist_9"]:checked'),
    dacrjasesmenmedishd_kolaborasihdlain   :$('#dacrjasesmenmedishd_kolaborasihdlain').val(),
    dacrjasesmenmedishd_resephd        :document.querySelector('input[name=dacrjasesmenmedishd_resephd]:checked').value,
    dacrjasesmenmedishd_dialisat       :document.querySelector('input[name=dacrjasesmenmedishd_dialisat]:checked').value,
    dacrjasesmenmedishd_pprofilinglist :document.querySelector('input[name=dacrjasesmenmedishd_pprofilinglist]:checked').value,
    dacrjasesmenmedishd_heparinisasilist :document.querySelector('input[name=dacrjasesmenmedishd_heparinisasilist]:checked').value,
    dacrjasesmenmedishd_ufg         :$('#dacrjasesmenmedishd_ufg').val(),
    dacrjasesmenmedishd_qb          :$('#dacrjasesmenmedishd_qb').val(),
    dacrjasesmenmedishd_qd          :$('#dacrjasesmenmedishd_qd').val(),
    dacrjasesmenmedishd_ureumpre    :$('#dacrjasesmenmedishd_ureumpre').val(),
    dacrjasesmenmedishd_ureumpost   :$('#dacrjasesmenmedishd_ureumpost').val(),
    dacrjasesmenmedishd_frekuensi   :$('#dacrjasesmenmedishd_frekuensi').val(),
    dacrjasesmenmedishd_urasihd     :$('#dacrjasesmenmedishd_urasihd').val(),
    dacrjasesmenmedishd_urasihdmenit:$('#dacrjasesmenmedishd_urasihdmenit').val(),
    dacrjasesmenmedishd_ufr         :$('#dacrjasesmenmedishd_ufr').val(),
    dacrjasesmenmedishd_urr         :$('#dacrjasesmenmedishd_urr').val(),
    dacrjasesmenmedishd_obatin      :$('#dacrjasesmenmedishd_obatin').val(),
    EvaluasiErmIrja                 :$('#EvaluasiErmIrja').val(),
    respon_e                        :$('#eyeOpen').val(),
    respon_m                        :$('#responMotorik').val(),
    respon_v                        :$('#responVerbal').val(),
    id_user                         :user.id_pegawai,
    ttd                             :ttddokter.getData(),


  };
  apiPOST('Rekammedisigd/saveAssesmenDokterigd',param,hasil=>{
    document.getElementById('linksoap').click();
    document.getElementById('cppttekanandarahermirja').value=document.getElementById('tekananDarahErmIrja1').value+'/'+document.getElementById('tekananDarahErmIrja2').value;
    document.getElementById('cpptsuhuermirja').value=document.getElementById('suhuErmIrja').value;
    document.getElementById('cpptnadiermirja').value=document.getElementById('nadiassmedigd').value;
    document.getElementById('cpptsaturasiermirja').value=document.getElementById('respirasiassmedigd').value;
    document.getElementById('Spo2assmedigd').value=document.getElementById('cpptSpo2ermirja').value;
    document.getElementById('subjekirja').value=document.getElementById('keluhanutamaErmIrja').value;
    document.getElementById('assesmenirja').value=document.getElementById('RiwayatPenyakitNowErmIrja').value;
    document.getElementById('intervensiirja').value=document.getElementById('planningErmIrja').value;

  })
}

function selectkecelakaantreage() {
  var a=document.getElementById('selectkecelakaantreage').value;
  if (a=="1") {
    document.getElementById('divkecelakaantreage').style.display='none';
  } else {
    document.getElementById('divkecelakaantreage').style.display='block';
  }
}
function selectinfotreage() {
  var a=document.getElementById('selectinfotreage').value;
  if (a=="1") {
    document.getElementById('divinformasitreage').style.display='none';
  } else {
    document.getElementById('divinformasitreage').style.display='block';
  }
}
function aktifPaint(){
  tesPaint = new Paint('tesPaint');

  ttd = new DrawingPaint('paint_assesmen', {'height': 200,'width':200});
}



function showPainterro(){
  tesPaint.show();
}

function aktifwpaint() {
  $("#wPaint_assesmen").wPaint({
   menuOffsetLeft: 0,
   menuOffsetTop: 5,
   strokeStyle: '#000000',
   fillStyle:'#000000',
   fontSize:'12',
   lineWidth:'1', 
   menuOrientation      :'horizontal' ,
 });



}
$(document).on('keyup', '#searchPxTriagerwj', function(e) {
  if($(this).val() !== '')
  {
   var charCode = e.which || e.keyCode;
   if(charCode == 40)
   {
    ermIgd_listpasien_by();
  } 
  else if(charCode == 38)
  {
    ermIgd_listpasien_by();
  }
  else    (charCode == 13)
  {
    ermIgd_listpasien_by();
  }
}else{
  document.getElementById("TriageIgd_listpasien").innerHTML="";
}
})
function showmodaltambahalergitreageigd() {
  $('#ModalTambahalergitreageigd').modal('show');
}
function ermIgd_listpasien_by(){  

  var listParam = [
    'searchPxTriagerwj', 'RWJTriage_nm_pasiencari'
    ];
  var param = {
    norm    : document.getElementById('searchPxTriagerwj').value,
    tgl     : document.getElementById('tgligdcariby').value
  };
  apiPOST("Rekammedisigd/listpasienby", param, hasil => {   
    $('#TriageIgd_listpasien').html('');
    if (hasil['data'] !== null) {
      if (hasil['code'] == 'XX') {
        toastr.error("Data tidak ditemukan");
        var Baris = "";
        Baris += '<div class="col-md-12" style="cursor:not-allowed;">';
        Baris += '<div class="info-box shadow mb-1" style="border: 2px solid; background-color: darksalmon; font-weight: bolder;">'
        Baris += '<span class="info-box-icon bg-danger"><i class="fa fa-times"></i></span>';
        Baris += '<div class="info-box-content">';
        Baris += '<span class="info-box-number"></span>';
        Baris += '<span class="info-box-text"></span>';
        Baris += '<h5 class="info-box-text">Data tidak ditemukan</h5>';
        Baris += '</div>';
        Baris += '</div>';
        Baris += '</div>';
        $('#TriageIgd_listpasien').append(Baris);

      }else{

        var Baris = "";
        var a = hasil['data'];
        for (var i = 0; i < a.length; i++) {
          var tglkunj         = a[i].tgl_masuk;
          var norm            = a[i].no_rm;
          var nama            = a[i].nama.replace(/'/g, '');
          var alamat          = a[i].alamat;
          var umur            = a[i].tgl_lahir;
          var penjamin        = a[i].nama_penjamin;
          var sep             = a[i].no_sjp;
          var telp            = a[i].telepon;
          var unit            = a[i].nama_unit;
          var kunjungan       = a[i].id_kunjungan;
          var id_unit         = a[i].id_unit;
          var nama_unit       = a[i].nama_unit;
          var kd_pekerjaan    = a[i].kd_pekerjaan;
          var kd_pendidikan   = a[i].kd_pendidikan;
          var soap            = a[i].soap;
          var id_transaksi    = a[i].id_transaksi;
          var id_penjamin     = a[i].id_penjamin;
          var jam_masuk       = a[i].jam_masuk.substring(0, 16);
          if (nama.length > 18){
            namax  = nama.substring(0, 18)+'...';
          }else{
            namax  = nama;
          }

          if (alamat.length > 30){
            alamatx = alamat.substring(0, 30)+'...';
          }else{
            alamatx = alamat;
          }
/*
          Baris += '<div class="col-lg-3 col-6">';
          if (soap>''){
            Baris += '<div class="small-box btn-info" style="border: solid 2px darkblue;">';
          }else{
            Baris += '<div class="small-box btn-secondary-default" style="border: solid 2px darkred;">';
          }
          Baris += '<div class="inner p-1">';
          Baris += '<h6><strong>'+norm+'</strong> / '+ nama +'</h6>';
          Baris += '<p class="p-0 mb-1">'+alamat+'</p>';
          Baris += '<p class="p-0"><strong><i>'+nama_unit+'</i></strong></p>';
          Baris += '</div>';
          Baris += '<div class="icon">';
          Baris += '<i class="fa fa-user"></i>';
          Baris += '</div>';
          Baris += '<a href="#" class="small-box-footer" style="background-color: darkgreen;" onclick="tampilPasienTriageIgd('+"'"+norm+"','"+unit+"','"+kunjungan+"','"+id_unit+"','"+nama+"','"+id_transaksi+"','"+alamat+"','"+umur+"'"+')">Klik Detail <i class="fas fa-arrow-circle-right"></i></a>';
          Baris += '</div>';
          Baris += '</div>';   */

          Baris += '<div class="col-sm-3">';
          if (soap>''){
            Baris += '<div class="small-box btn-info" style="border: solid 2px darkblue;">';
          }else{
            Baris += '<div class="small-box btn-secondary-default" style="border: solid 2px #a8d4da ;">';
          }

          Baris += '<div class="inner p-1">';
          Baris += '<h6><strong>'+norm+'</strong> / '+ namax +'</h6>';
          Baris += '<p class="p-0 mb-1" style="font-size:12px;">'+alamatx+'</p>';
          Baris += '<p class="p-0" style="font-size:12px;"><strong><i>'+unit+'</i></strong></p>';
          Baris += '<p class="p-0 mb-1" style="font-size:14px; text-align: center;"><i class="fa fa-clock"></i> '+jam_masuk+'</p>';
          Baris += '</div>';
          Baris += '<div class="icon">';
          Baris += '<i class="fa fa-user"></i>';
          Baris += '</div>';
          Baris += '<a href="#" class="small-box-footer" style="background-color: #a8d4da; color: black;" onclick="tampilPasienTriageIgd('+"'"+norm+"','"+unit+"','"+kunjungan+"','"+id_unit+"','"+nama+"','"+id_transaksi+"','"+alamat+"','"+umur+"'"+')" style="cursor:pointer;">Klik Detail <i class="fas fa-arrow-circle-right"></i></a>';
          Baris += '</div>';
          Baris += '</div>';
        }
        $('#TriageIgd_listpasien').append(Baris);
      }       
    }

  });  
};

function ermIgd_listpasien(){  

  var listParam = [
    'searchPxTriagerwj', 'RWJTriage_nm_pasiencari'
    ];
  var param = {
    norm    : document.getElementById('searchPxTriagerwj').value,
    nmpasien: document.getElementById('RWJTriage_nm_pasiencari').value
  };
  apiPOST("Rekammedisigd/listpasien", param, hasil => {   
    $('#TriageIgd_listpasien').html('');
    if (hasil['data'] !== null) {
      if (hasil['code'] == 'XX') {
        toastr.error("Data tidak ditemukan");
        var Baris = "";
        Baris += '<div class="col-md-12" style="cursor:not-allowed;">';
        Baris += '<div class="info-box shadow mb-1" style="border: 2px solid; background-color: darksalmon; font-weight: bolder;">'
        Baris += '<span class="info-box-icon bg-danger"><i class="fa fa-times"></i></span>';
        Baris += '<div class="info-box-content">';
        Baris += '<span class="info-box-number"></span>';
        Baris += '<span class="info-box-text"></span>';
        Baris += '<h5 class="info-box-text">Data tidak ditemukan</h5>';
        Baris += '</div>';
        Baris += '</div>';
        Baris += '</div>';
        $('#TriageIgd_listpasien').append(Baris);
        document.getElementById('searchPxTriagerwj').value = '';
        document.getElementById('RWJTriage_nm_pasiencari').value = '';
      }else{

        var Baris = "";
        var a = hasil['data'];
        for (var i = 0; i < a.length; i++) {
          var tglkunj   = a[i].tgl_masuk;
          var norm      = a[i].no_rm;
          var nama      = a[i].nama.replace(/'/g, '');
          var alamat    = a[i].alamat;
          var umur      = a[i].tgl_lahir;
          var penjamin  = a[i].nama_penjamin;
          var sep       = a[i].no_sjp;
          var telp      = a[i].telepon;
          var unit      = a[i].nama_unit;
          var kunjungan = a[i].id_kunjungan;
          var id_unit   = a[i].id_unit;
          var soap      = a[i].soap;
          var transaksi = a[i].id_transaksi;
          var jam_masuk = a[i].jam_masuk.substring(0, 16);

          if (nama.length > 18){
            namax  = nama.substring(0, 18)+'...';
          }else{
            namax  = nama;
          }

          if (alamat.length > 30){
            alamatx = alamat.substring(0, 30)+'...';
          }else{
            alamatx = alamat;
          }

          Baris += '<div class="col-sm-3">';
          if (soap>''){
            Baris += '<div class="small-box btn-info" style="border: solid 2px darkblue;">';
          }else{
            Baris += '<div class="small-box btn-secondary-default" style="border: solid 2px #a8d4da ;">';
          }
          
          Baris += '<div class="inner p-1">';
          Baris += '<h6><strong>'+norm+'</strong> / '+ namax +'</h6>';
          Baris += '<p class="p-0 mb-1" style="font-size:12px;">'+alamatx+'</p>';
          Baris += '<p class="p-0" style="font-size:12px;"><strong><i>'+unit+'</i></strong></p>';
          Baris += '<p class="p-0 mb-1" style="font-size:14px; text-align: center;"><i class="fa fa-clock"></i> '+jam_masuk+'</p>';
          Baris += '</div>';
          Baris += '<div class="icon">';
          Baris += '<i class="fa fa-user"></i>';
          Baris += '</div>';
          Baris += '<a href="#" class="small-box-footer" style="background-color: #a8d4da; color: black;" onclick="tampilPasienTriageIgd('+"'"+norm+"','"+unit+"','"+kunjungan+"','"+id_unit+"','"+nama+"','"+transaksi+"','"+alamat+"','"+umur+"'"+')" style="cursor:pointer;">Klik Detail <i class="fas fa-arrow-circle-right"></i></a>';
          Baris += '</div>';
          Baris += '</div>';

        }
        $('#TriageIgd_listpasien').append(Baris);
      }       
    }

  });  
};
function erekammedisRWJ_show_ermeresepigd(){  
  var ermjson_data = {
    'id_kunjOrdEresep' : $('#idKunjunganTriageIgd').val(),
    'tgl_kunjOrdEresep': "<?php echo date('Y-m-d') ?>",
    'nowdayOrdEresep'  : "<?php echo date('Y-m-d') ?>",
    'no_rmOrdEresep'   : $('#rmTriageIgd').val(),
    'namaOrdEresep'    : $('#namaTriageIgd').val().replace(/ /g, '%20'),
    'alamatOrdEresep'  : '',
    'umurOrdEresep'    : '',
    'alamatOrdEresep'  : alamatpasien.replace(/ /g, '%20'),
    'umurOrdEresep'    : tgllahir.replace(/ /g, '%20'),
    'penjaminOrdEresep': '',
    'sepOrdEresep'     : '',
    'telpOrdEresep'    : '',
    'idunitOrdEresep'  : $('#idunitTriageIgd').val(),
    'unitOrdEresep'    : $('#unitTriageIgd').val().replace(/ /g, '%20'),
    'eresepRWJOrdEresep': 'ERM_IGD',
    'rekammedis'        : 'rekammedisIGD_eresepIGD_content',
    'rekammedis_prev'   : 'rekammedisIGD_eresepIGD_preview'
  };

  var ERMmyJSON = JSON.stringify(ermjson_data);

  $('.rekammedisIGD_eresepIGD_content').load('Apotek/erm_eresepGabung?data='+ERMmyJSON); // KE TAMPILAN ERESEP ERM
}
function data_pendaftaranirwj(e){
 if (e.keyCode == 13) {
  var a='';
  var param = 
  {
    rm : $("#searchPxTriagerwj").val(),};
    apiPOST('Kunjungan/historikunjunganIgd', param, hasil =>{
      var b=hasil['history'];
      for (var i = 0; i < b.length; i++) {
        var no = i+1;
        a+='<tr>';
        a+='<td>' + no + '</td>';
        a+='<td onclick="tampilPasienTriageIgd(`'+b[i].no_rm+'`,`'+b[i].nama_unit+'`,`'+b[i].id_kunjungan+'`,`'+b[i].id_unit+'`,`'+b[i].nama+'`)">'+b[i].no_rm+'`</td>';
        a+='<td>'+b[i].nama+'</td>';
        a+='<td>'+b[i].alamat+'</td>';
        a+='<td>'+b[i].tgl_masuk+'</td>';
        a+='<td>'+b[i].nama_pegawai+'</td>';
        a+='<td>'+b[i].nama_unit+'</td>';
        a+='</tr>';
      }
      document.getElementById('bodyErmIgdhistorykunjungan').innerHTML=a;

    });
  }
}
function show_cri_subjek(){
  $('#ModalCariSubjek').modal("show");
}
function show_modalPermintaanLabIgd() {
  $('#ModalPermintaanLabIgd').modal('show');
}
function show_intervensi(){
  TableKomunikasiPengajaranKep();
  $('#ModalIntervensiKeperawatan').modal("show");
}
function show_diagnosa_perawat(){
  TableDiagnosaKep();
  $('#ModalDiagnosaKeperawatan').modal("show");
}
function show_modalPengobatan() {
  $('#ModalRiwayatPengobatan').modal('show');
}
function show_modalRiwayatAlergi() {
  $('#ModalRiwayatAlergi').modal('show');
}
function show_modalPenyakitDahulu() {
  $('#ModalPenyakitDahulu').modal('show');
}
function show_modalPenyakitKeluarga() {
  $('#ModalPenyakitKeluarga').modal('show');
}
function show_modalPermintaancheckboxlogiIgd() {
  $('#ModalPermintaancheckboxlogiIgd').modal("show");
}
function show_daftarintervensi() {
  $("#ModalDaftarIntervensi").modal("show");
}
function showmodaltambahpenyakitsekarangtreageigd() {
  $("#ModalTambahIcdPenyakitSekarangtreageigd").modal("show");
  document.getElementById("ModalinputPenyakitSekarangtreageigd").value="";
}
function showmodaltambahpenyakitKeperawatansekarang() {
  $("#ModalTambahIcdPenyakitSekarangkeperawatanigd").modal("show");
  document.getElementById("ModalinputPenyakitSekarangkeperawatanigd").value="";
}
function showmodaltambahpenyakitmedissekarang() {
  $("#ModalTambahIcdPenyakitSekarangmedisigd").modal("show");
  document.getElementById("ModalinputPenyakitSekarangmedisigd").value="";
}
function showmodaltambahpenyakitsoapsekarang() {
  $("#ModalTambahIcdPenyakitSekarangsoapigd").modal("show");
  document.getElementById("ModalinputPenyakitSekarangsoapigd").value="";
}
function dacrjasesmenkeperawatanex_setScore(a,b) {
  switch(b){
  case 1:
    document.getElementById('eyeOpenasskepigd').value=a;
    break;
  case 2:
    document.getElementById('ResponMotorikasskepigd').value=a;
    break;
  case 3:
    document.getElementById('responVerbalasskepigd').value=a;
    break;
  default:
  }
  hitungscorekeperawatan();
}
function dacrjasesmenmedisex_setScore(a,b) {
  switch(b){
  case 1:
    document.getElementById('eyeOpen').value=a;
    break;
  case 2:
    document.getElementById('responMotorik').value=a;
    break;
  case 3:
    document.getElementById('responVerbal').value=a;
    break;
  default:
  }
  hitungscoremedis();
}
function dacrjtrease_setScore(a,b) {
  switch(b){
  case 1:
    document.getElementById('eyeOpenTriageIgd').value=a;
    break;
  case 2:
    document.getElementById('ResponMotorikTriageIgd').value=a;
    break;
  case 3:
    document.getElementById('responVerbalTriageIgd').value=a;
    break;
  default:
  }
  hitung();
}
function hitung() {
  var a=document.getElementById('eyeOpenTriageIgd').value;
  var b=document.getElementById('ResponMotorikTriageIgd').value;
  var c=document.getElementById('responVerbalTriageIgd').value;
  document.getElementById('dacrjasesmentrege_bgcstot').value=parseInt(a) + parseInt(b) + parseInt(c);
}
function hitungscoremedis() {
  var a=document.getElementById('eyeOpen').value;
  var b=document.getElementById('responMotorik').value;
  var c=document.getElementById('responVerbal').value;
  document.getElementById('dacrjasesmenmedis_bgcstot').value=parseInt(a) + parseInt(b) + parseInt(c);
}
function hitungscorekeperawatan() {
  var a=document.getElementById('eyeOpenasskepigd').value;
  var b=document.getElementById('ResponMotorikasskepigd').value;
  var c=document.getElementById('responVerbalasskepigd').value;
  document.getElementById('skorassesmenkeperawatanIgd').value=parseInt(a) + parseInt(b) + parseInt(c);
}
function KebKomBicaraTriageIgd() {
  document.getElementById('DivPenjelasTriageIgd').style.display='block';
}
function show_cri_nmpasienpendfRWJ()
{
  $('#searchPxTriagerwj').hide();
  $('#RWJTriage_nm_pasiencari').show();
  $("#RWJTriage_nm_pasiencari").trigger('focus');
}
function refresh_pendft_rwj() {
  $('#TriageIgd_loadingawal').hide();
}
function tampilPasienTriageIgd(rm,unit,kunjungan,id_unit,nama,transaksi,alamat,umur) {
  document.getElementById('listhistoripenunjangigd').innerHTML = '';
  document.getElementById('rmTriageIgd').value=rm;
  document.getElementById('namaTriageIgd').value=nama;
  document.getElementById('unitTriageIgd').value=unit;
  document.getElementById('idKunjunganTriageIgd').value=kunjungan;
  document.getElementById('idunitTriageIgd').value=id_unit;
  document.getElementById('idtransaksiTriageIgd').value=transaksi;
  tambahpasienTriagerwj();
  historipenyakittreageigd();
  historialergitreageigd();
  historipenyakitkeluarga();
  tampilpenunjangigd(rm);
  if (id_unit==3002||id_unit=='3002') {
    document.getElementById('divriwayatmensIgd').style.display='block';
  }else{
    document.getElementById('divriwayatmensIgd').style.display='none';
  }
  //document.getElementById('dpjpResumeermirna').value = user.id_pegawai;
//ReviewAssesmenPerawatErmIgd2(rm,id_unit);
//ReviewAssesmenErmIgd2(rm,id_unit);
  tgllahir = umur;
  alamatpasien = alamat;
}
function ReviewAssesmenErmIgd2(rm,unit){
  var a='';
  var param = 
  {
    rm : rm,unit :unit,
  };
  apiPOST('Rekammedisigd/ReviewAssesmenKeperawatanIgd', param, hasil =>{
    var b=hasil['data'];
    if (hasil['code']==200) {
      for (var i = 0; i < b.length; i++) {
        document.getElementById("KeluhanAssesmenKeperawatanIgd").value        =b[i].keluhan_utama;
        document.getElementById("RiwayatPenyakitAssesmenKeperawatanIgd").value=b[i].penyakit_sekarang;
        document.getElementById("RiwayatAlergiAssesmenKeperawatanIgd").value  =b[i].alergi;
      }
      $('#ModalShowAssesmenKeperawatanIgd').modal("show");
    }

  });
}
function tampilhisrmermigd(){
  var rm=document.getElementById('rmTriageIgd').value;
  var barisrmhis = ''; 
  var param = {
    norm: rm,
  };
  apiPOST('Rekammedisirja/datakunjunganhistorirm', param, hasil => {
    var a = hasil['data'];
    for (var i = 0; i < a.length; i++) {
      var tgl = a[i].tgl_masuk.substr(8, 2);
      var bln = a[i].tgl_masuk.substr(5, 2);
      var thn = a[i].tgl_masuk.substr(0, 4);
      tglmasuk = tgl + '/' + bln + '/' + thn;
      barisrmhis += '<div class="card card-secondary collapsed-card">';
      barisrmhis += '<div class="card-header">';
      barisrmhis += '<span style="font-size: 12px;" class="card-title">Kunjungan '+ tglmasuk +' - '+ a[i]['nama_unit']+' '+a[i]['id_kunjungan']+' </span>';
      barisrmhis += '<div class="card-tools">';
      barisrmhis += '<button type="button" class="btn btn-tool" data-card-widget="collapse" fdprocessedid="smpdqi"><i class="fas fa-plus"></i>';
      barisrmhis += '</button>';
      barisrmhis += '</div>';
      barisrmhis += '</div>';
      barisrmhis += '<div class="card-body">';
      barisrmhis += '<div class="row">';
      barisrmhis += '<div class="col-md-12">';
      barisrmhis += '<button type="button" class="btn bg-gradient-secondary btn-xs" onclick="assesmendokterhistoriermigd(`'+a[i]['id_kunjungan']+'`,`'+a[i]['id_unit']+'`)"> <i class="fas fa-book-medical"></i> Assesmen Dokter</button>';
      barisrmhis += ' | <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="assesmenperawathistoriermigd(`'+a[i]['id_kunjungan']+'`,`'+a[i]['id_unit']+'`)"> <i class="fas fa-book-medical"></i> Assesmen Perawat</button>';
      barisrmhis += ' | <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="treagehistoriermigd(`'+a[i]['id_kunjungan']+'`,`'+a[i]['id_unit']+'`)"> <i class="fas fa-book-medical"></i> Treage</button>';
      barisrmhis += ' | <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="resumemedisigd(`'+a[i]['id_kunjungan']+'`,`'+a[i]['id_unit']+'`)"> <i class="fas fa-book-medical"></i> Resume Medis</button>';
      barisrmhis += '</div>';
      barisrmhis += '<div class="col-md-12" style="padding-top: 10px;">';  
      barisrmhis += '<div class="info-box mb-0" id="idpanelhistorirm'+a[i]['id_kunjungan']+'">';  
      barisrmhis += 'Silahkan Pilih Button Diatas';
      barisrmhis += '</div>';

      barisrmhis += '<div class="col-md-12" style="padding-top: 10px;">';
      barisrmhis += '<div class="info-box mb-0" id="idpanelhistorirmperawat'+a[i]['id_kunjungan']+'">';
      barisrmhis += '</div>';
      barisrmhis += '</div>';

      barisrmhis += '<div class="col-md-12" style="padding-top: 10px;"> ';
      barisrmhis += '<div class="info-box mb-0" id="idpanelhistorirmtreage'+a[i]['id_kunjungan']+'">';
      barisrmhis += '</div>';
      barisrmhis += '</div>';

      barisrmhis += '<div class="col-md-12" style="padding-top: 10px;"> ';
      barisrmhis += '<div class="info-box mb-0" id="idpanelhistoriresumeigd'+a[i]['id_kunjungan']+'">';
      barisrmhis += '</div>';
      barisrmhis += '</div>';

      barisrmhis += '<div class="col-md-12" style="padding-top: 10px;">';
      barisrmhis += '<div class="col-md-12" id="detailsoapiigd'+a[i]['id_kunjungan']+'">'; 
      barisrmhis += '</div>';
      barisrmhis += '<div class="info-box mb-0" >';
      barisrmhis += '<div class="info-box mb-0" style="padding-top: 10px;">'; 
      barisrmhis += '<table class="table table-striped table-sm" cellspacing="0" cellpadding="0" border="0">';
      barisrmhis += '<thead>';
      barisrmhis += '<tr style="background-color: #6c757d;color:white">';
      barisrmhis += '<td>Nama Obat</td>';
      barisrmhis += '<td style="width: 5px;">Banyak</td>';
      barisrmhis += '<td>Keterangan</td>';
      barisrmhis += '</tr>';
      barisrmhis += '</thead>';
      barisrmhis += '<tbody id="eresephistori'+a[i]['id_kunjungan']+'">'; 
      barisrmhis += '</tbody>';
      barisrmhis += '</table>';
      barisrmhis += '</div>';
      barisrmhis += '</div>';
      barisrmhis += '<h4>Penyakit (ICD-10)&nbsp;<i class="fas fa-plus" onclick="addmrpenyakitmedermigd(`'+a[i]['id_kunjungan']+'`,`'+a[i]['id_unit']+'`)"></i></h4>';
      barisrmhis += '<div class="col-md-12" id="detailmrpenyakitmedisigd'+a[i]['id_kunjungan']+'">'; 
      barisrmhis += '</div>';
      barisrmhis += '<h4>Tindakan (ICD-9) &nbsp;<i class="fas fa-plus" onclick="addicd9medermigd(`'+a[i]['id_kunjungan']+'`,`'+a[i]['id_unit']+'`)"></i></h4>';
      barisrmhis += '<div class="col-md-12" id="detailicd9medigd'+a[i]['id_kunjungan']+'">'; 
      barisrmhis += '</div>';
      barisrmhis += '<div class="col-md-12" id="detailsoapiigd'+a[i]['id_kunjungan']+'">'; 
      barisrmhis += '</div>';
      barisrmhis += '</div>';
      barisrmhis += '</div>';
      barisrmhis += '</div>';
      barisrmhis += '</div>';
      barisrmhis += '</div>';
      detailsoapiermigd(a[i]['id_kunjungan']);
      obatigdditerima(a[i]['id_kunjungan']);
      eresepermigd(a[i]['id_kunjungan'],a[i].tgl_masuk,a[i].tgl_masuk);
      detailmrpenyakitmedermigd(a[i]['id_kunjungan']);
      detailicd9medermigd(a[i]['id_kunjungan']);
      
    }
    document.getElementById('listhistorirmkunjunganermigd').innerHTML = barisrmhis;
  })



}
function obatigdditerima(id_kunj) {
  var param={id_kunjungan:id_kunj,};
  apiPOST('Rekammedisirja/obatditerimairja',param,hasil=>{
    var barisrmhis='';
    var a = hasil['data'];
    if (hasil['code']=="200") { 
      for (var i = 0; i < a.length; i++) {
        barisrmhis += '<div>'+a[i].nama_obat+''+a[i].jumlah+''+a[i].kd_satuan+'</div>';

      }
      document.getElementById('detailobatditerimairja'+id_kunj).innerHTML=barisrmhis;
    }
  })
}
function addmrpenyakitmedermigd(kunjungan,unit) {
 $('#ModalShowaddmrpenyakitmedermigd').modal('show');
 document.getElementById('kunjunganaddpenyakitigd').value=kunjungan;
 document.getElementById('unitaddpenyakitigd').value=unit;
}
function addicd9medermigd(kunjungan,unit) {
 $('#ModalShowaddicd9medermigd').modal('show');
 document.getElementById('kunjunganaddicd9igd').value=kunjungan;
 document.getElementById('unitaddicd9igd').value=unit;
}
function detailmrpenyakitmedermigd(kunjungan){
  var param = {
    kunjungan: kunjungan
  };
  var baris = ''; 
  apiPOST('Rekammedisirja/datamrpenyakitirja', param, hasil => {
    var x = hasil['data'];
    if (hasil['code']=="200") {            
      for (var u = 0; u < x.length; u++) {
        baris += '<div>'+x[u]['id_penyakit']+'|'+x[u]['penyakit']+'('+x[u]['status']+')&nbsp;<i class="fas fa-times-circle" onclick="deletepenyakitmedermigd(`'+x[u]['id_penyakit']+'`)"></i></div>';
      }
      document.getElementById('detailmrpenyakitmedisigd'+kunjungan).innerHTML = baris;
    }
  })
}
function detailicd9medermigd(kunjungan){
  var param = {
    kunjungan: kunjungan
  };
  var baris = ''; 
  apiPOST('Rekammedisirja/datamricd9irja', param, hasil => {
    var x = hasil['data'];
    if (hasil['code']=="200") {            
      for (var u = 0; u < x.length; u++) {
        baris += '<div>'+x[u]['kd_icd9']+'|'+x[u]['deskripsi']+'('+x[u]['status']+')&nbsp;<i class="fas fa-times-circle" onclick="deletetindakanmedermirja(`'+x[u]['kd_icd9']+'`)"></i></div>';
      }
      document.getElementById('detailicd9medigd'+kunjungan).innerHTML = baris;
    }
  })
}
function deletetindakanmedermirja(kode) {
  var kunjungan=document.getElementById('idKunjunganTriageIgd').value;
  var param={
    kode:kode,
    id_kunjungan :kunjungan,
  };
  apiPOST('Rekammedisirja/deletemrtindakanirja', param, hasil => {
     // detailmrpenyakitmedermirja(kunjungan);
   detailicd9medermigd(kunjungan);
 });
  
}
function deletepenyakitmedermigd(kode) {
  var kunjungan=document.getElementById('idKunjunganTriageIgd').value;
  var param={
    kode:kode,
    id_kunjungan :kunjungan,
  };
  apiPOST('Rekammedisirja/deletemrpenyakitirja', param, hasil => {
    detailmrpenyakitmedermigd(kunjungan);
  });
  
}
function viewassesmenmedigd(idkunjunganhistori) {
  //document.getElementById('linkassesmenmedisIgd').click();
  var param = {
    id: idkunjunganhistori,
  };
  apiPOST('Rekammedisigd/datakunjunganrmmedisdetail', param, hasil => {
    //$('#idunitErmIrja').val()=a[i]['keluhan_utama'];
    var a = hasil['data'];
    for (var i = 0; i < a.length; i++) {
    //$('#idKunjunganErmIrja').val()=idkunjunganhistori;
      document.getElementById('keluhanutamaassmedigd').value=a[i]['keluhan_utama'];
      document.getElementById('Riwayatpenyakitnowassmedigd').value=a[i]['penyakit_sekarang'];
      switch (a[i]['tinggal']){
      case "1":
        document.getElementById('TinggalBersamaassmedigd1').checked='true';
        break;
      case "2":
        document.getElementById('TinggalBersamaassmedigd2').checked='true';
        break;
      case "3":
        document.getElementById('TinggalBersamaassmedigd3').checked='true';
        break;
      case "4":
        document.getElementById('TinggalBersamaassmedigd4').checked='true';
        break;
      case "5":
        document.getElementById('TinggalBersamaassmedigd5').checked='true';
        break;
      }

      switch (a[i]['status_mental']){
      case "1":
        document.getElementById('statusmentalassmedigd1').checked='true';
        break;
      case "2":
        document.getElementById('statusmentalassmedigd2').checked='true';
        break;
      case "3":
        document.getElementById('statusmentalassmedigd3').checked='true';
        break;
      case "4":
        document.getElementById('statusmentalassmedigd4').checked='true';
        break;
      case "5":
        document.getElementById('statusmentalassmedigd5').checked='true';
        break;

      }

    //
      switch (a[i]['status_psikologi']){
      case "1":
        document.getElementById('statusPsikologisassmedigd1').checked='true';
        break;
      case "2":
        document.getElementById('statusPsikologisassmedigd2').checked='true';
        break;
      case "3":
        document.getElementById('statusPsikologisassmedigd3').checked='true';
        break;
      case "4":
        document.getElementById('statusPsikologisassmedigd4').checked='true';
        break;
      case "5":
        document.getElementById('statusPsikologisassmedigd5').checked='true';
        break;
      case "6":
        document.getElementById('statusPsikologisassmedigd6').checked='true';
        break;
      case "7":
        document.getElementById('statusPsikologisassmedigd7').checked='true';
        break;
      case "8":
        document.getElementById('statusPsikologisassmedigd8').checked='true';
        break;
      case "9":
        document.getElementById('statusPsikologisassmedigd9').checked='true';
        break;
      case "10":
        document.getElementById('statusPsikologisassmedigd10').checked='true';
        break;
      }

      switch (a[i]['pengguna_restrain']){
      case "1":
        document.getElementById('penggunaanRestrainassmedigd1').checked='true';
        break;
      case "2":
        document.getElementById('penggunaanRestrainassmedigd2').checked='true';
        break;
      }

      document.getElementById('Budayaassmedigd').value        =a[i]['budaya'];
      document.getElementById('KeadaanUmumassmedigd').value=a[i]['keadaan_umum'];
      document.getElementById('respirasiassmedigd').value=a[i]['respirasi'];
      document.getElementById('nadiassmedigd').value=a[i]['nadi'];
      document.getElementById('Spo2assmedigd').value=a[i]['spo2'];
      document.getElementById('pupilkiriassmedigd').value=a[i]['pupil_kiri'];
      document.getElementById('pupilkananassmedigd').value=a[i]['pupil_kanan'];;
      document.getElementById('tekananDarahermigd1').value=a[i]['tekanan_darah1']; 
      document.getElementById('tekananDarahermigd2').value=a[i]['tekanan_darah2'];; 
      document.getElementById('palpasiassmedigd').value=a[i]['palpasi'];
      document.getElementById('suhuassmedigd').value=a[i]['suhu'];
      document.getElementById('reflekCahayaKiriassmedigd').value= a[i]['reflek_cahaya_kiri'];;
      document.getElementById('reflekCahayaKananassmedigd').value= a[i]['reflek_cahaya_kanan'];
      document.getElementById('bbassmedigd').value=a[i]['bb'];
      document.getElementById('tinggiassmedigd').value=a[i]['tinggi_badan'];
      document.getElementById('imtassmedigd').value=a[i]['imt'];
      document.getElementById('dacrjasesmenmedis_bgcstot').value=a[i]['skor_kesadaran'];
      document.getElementById('Assesmenassmedigd').value=a[i]['assesmen_medis'];
      document.getElementById('tindakanassmedigd').value=a[i]['tindakan_medis'];
      document.getElementById('planningassmedigd').value=a[i]['planning_medis'];
      document.getElementById('fisikStatusLocalisassmedigd').value=a[i]['status_lokalis'];

      switch (a[i]['pasien_kompleks']){
      case "1":
        document.getElementById('pasienKompleksassmedigd1').checked='true';
        break;
      case "2":
        document.getElementById('pasienKompleksassmedigd2').checked='true';
        break;
      }

      document.getElementById('fisikKepalaassmedigdKet').value=a[i]['kepala_ket'];
      switch (a[i]['kepala']){
      case "1":
        document.getElementById('fisikKepalaassmedigd1').checked='true';
        break;
      case "2":
        document.getElementById('fisikKepalaassmedigd2').checked='true';
        break;
      }

      document.getElementById('fisikJantungassmedigdKet').value=a[i]['jantung_ket'];
      switch (a[i]['jantung']){
      case "1":
        document.getElementById('fisikJantungassmedigd1').checked='true';
        break;
      case "2":
        document.getElementById('fisikJantungassmedigd2').checked='true';
        break; 
      }

      switch (a[i]['mata']){
      case "1":
        document.getElementById('fisikMataassmedigd1').checked='true';
        break;
      case "2":
        document.getElementById('fisikMataassmedigd2').checked='true';
        break; 
      }
      document.getElementById('fisikMataassmedigdKet').value=a[i]['mata_ket'];

      document.getElementById('fisikParuassmedigdKet').value=a[i]['paru_ket'];
      switch (a[i]['paru']){
      case "1":
        document.getElementById('fisikParuassmedigd1').checked='true';
        break;
      case "2":
        document.getElementById('fisikParuassmedigd2').checked='true';
        break; 
      }

      document.getElementById('fisikThtassmedigdKet').value=a[i]['tht_ket'];
      switch (a[i]['tht']){
      case "1":
        document.getElementById('fisikThtassmedigd1').checked='true';
        break;
      case "2":
        document.getElementById('fisikThtassmedigd2').checked='true';
        break; 
      }

      document.getElementById('fisikAbdomenassmedigdKet').value=a[i]['abdomen_ket']; 
      switch (a[i]['abdomen']){
      case "1":
        document.getElementById('fisikAbdomenassmedigd1').checked='true';
        break;
      case "2":
        document.getElementById('fisikAbdomenassmedigd2').checked='true';
        break; 
      }   

      document.getElementById('fisikLeherassmedigdKet').value=a[i]['leher_ket'];
      switch (a[i]['leher']){
      case "1":
        document.getElementById('fisikLeherassmedigd1').checked='true';
        break;
      case "2":
        document.getElementById('fisikLeherassmedigd2').checked='true';
        break; 
      }

      document.getElementById('fisikGenitaliaassmedigdKet').value=a[i]['genitalia_ket'];
      switch (a[i]['genitalia']){
      case "1":
        document.getElementById('fisikGenitaliaassmedigd1').checked='true';
        break;
      case "2":
        document.getElementById('fisikGenitaliaassmedigd2').checked='true';
        break; 
      }

      document.getElementById('fisikMulutassmedigdKet').value=a[i]['mulut_ket'];
      switch (a[i]['mulut']){
      case "1":
        document.getElementById('fisikMulutassmedigd1').checked='true';
        break;
      case "2":
        document.getElementById('fisikMulutassmedigd2').checked='true';
        break; 
      }

      document.getElementById('fisikThoraxassmedigdKet').value=a[i]['thoraks_ket'];
      switch (a[i]['thoraks']){
      case "1":
        document.getElementById('fisikThoraxassmedigd1').checked='true';
        break;
      case "2":
        document.getElementById('fisikThoraxassmedigd2').checked='true';
        break; 
      }
/*    $('#dacrjasesmengigmedis_glidahket').val()=a[i][''];
    $('#dacrjasesmengigmedis_gmukosapipi').val()=a[i][''];
    document.querySelector('input[name=dacrjasesmengigmedis_goklusiId]:checked').value,
    document.querySelector('input[name=dacrjasesmengigmedis_gtorus1Id]:checked').value,
    document.querySelector('input[name=dacrjasesmengigmedis_gtorus2Id]:checked').value,
    document.querySelector('input[name=dacrjasesmengigmedis_gpalatumId]:checked').value,
    document.querySelector('input[name=dacrjasesmengigmedis_gdiastemaId]:checked').value,
    $('#dacrjasesmengigmedis_gdiastemaket').val()=a[i][''];
    $('#dacrjasesmengigmedis_ganomaliId').val()=a[i][''];
    $('#dacrjasesmengigmedis_ganomaliket').val()=a[i][''];
    document.querySelector('input[name=dacrjasesmengigmedis_gfrenulum1Id]:checked').value,
    document.querySelector('input[name=dacrjasesmengigmedis_gfrenulum2Id]:checked').value,
    document.querySelector('input[name=dacrjasesmengigmedis_gohisId]:checked').value,
    $('#dacrjasesmengigmedis_gtemuanlain').val(),*/
      //mata
/*    $('#dacrjasesmenmatmedis_mod').val()=a[i][''];
    $('#dacrjasesmenmatmedis_mos').val()=a[i][''];
    $('#dacrjasesmenmatmedis_madisi').val()=a[i][''];
    $('#dacrjasesmenmatmedis_mavod').val()=a[i][''];
    $('#dacrjasesmenmatmedis_mavos').val()=a[i][''];
    document.querySelector('input[name=dacrjasesmenmatmedis_mishiharaId]:checked').value,
    $('#dacrjasesmenmatmedis_mschimer1').val()=a[i][''];
    $('#dacrjasesmenmatmedis_mschimer2').val()=a[i][''];
      //obgyn
    document.querySelector('input[name=dacrjasesmenmtmedis_obgId]:checked').value,
    $('#dacrjasesmenmtmedis_otfu').val()=a[i][''];
    $('#dacrjasesmenmtmedis_olila').val()=a[i][''];
    $('#dacrjasesmenmtmedis_ohis').val()=a[i][''];
    $('#dacrjasesmenmtmedis_ohislama').val()=a[i][''];
    $('#dacrjasesmenmtmedis_odjj').val()=a[i][''];
    $('#dacrjasesmenmtmedis_ovulva').val()=a[i][''];
    $('#dacrjasesmenmtmedis_oportio').val()=a[i][''];
    $('#dacrjasesmenmtmedis_ocorpus').val()=a[i][''];
    $('#dacrjasesmenmtmedis_oparametrium').val()=a[i][''];
    $('#dacrjasesmenmtmedis_ocavum').val()=a[i][''];
    $('#dacrjasesmenmtmedis_ovulvadalam').val()=a[i][''];
    $('#dacrjasesmenmtmedis_oportiodalam').val()=a[i][''];
    $('#dacrjasesmenmtmedis_opembukaan').val()=a[i][''];
    $('#dacrjasesmenmtmedis_ohodge').val()=a[i][''];
    $('#dacrjasesmenmtmedis_opresentasi').val()=a[i][''];
    $('#dacrjasesmenmtmedis_oketuban').val()=a[i][''];
      //hd
    document.querySelectorAll('input[name="dacrjasesmenmedishd_kolaborasihdlist_1"]:checked'),
    document.querySelectorAll('input[name="dacrjasesmenmedishd_kolaborasihdlist_2"]:checked'),
    document.querySelectorAll('input[name="dacrjasesmenmedishd_kolaborasihdlist_3"]:checked'),
    document.querySelectorAll('input[name="dacrjasesmenmedishd_kolaborasihdlist_4"]:checked'),
    document.querySelectorAll('input[name="dacrjasesmenmedishd_kolaborasihdlist_5"]:checked'),
    document.querySelectorAll('input[name="dacrjasesmenmedishd_kolaborasihdlist_6"]:checked'),
    document.querySelectorAll('input[name="dacrjasesmenmedishd_kolaborasihdlist_7"]:checked'),
    document.querySelectorAll('input[name="dacrjasesmenmedishd_kolaborasihdlist_8"]:checked'),
    document.querySelectorAll('input[name="dacrjasesmenmedishd_kolaborasihdlist_9"]:checked'),
    $('#dacrjasesmenmedishd_kolaborasihdlain').val(),
    document.querySelector('input[name=dacrjasesmenmedishd_resephd]:checked').value
    document.querySelector('input[name=dacrjasesmenmedishd_dialisat]:checked').value,
    document.querySelector('input[name=dacrjasesmenmedishd_pprofilinglist]:checked').value,
    document.querySelector('input[name=dacrjasesmenmedishd_heparinisasilist]:checked').value,
    $('#dacrjasesmenmedishd_ufg').val()=a[i][''];
    $('#dacrjasesmenmedishd_qb').val()=a[i][''];
    $('#dacrjasesmenmedishd_qd').val()=a[i][''];
    $('#dacrjasesmenmedishd_ureumpre').val()=a[i][''];
    $('#dacrjasesmenmedishd_ureumpost').val()=a[i][''];
    $('#dacrjasesmenmedishd_frekuensi').val()=a[i][''];
    $('#dacrjasesmenmedishd_urasihd').val()=a[i][''];
    $('#dacrjasesmenmedishd_urasihdmenit').val()=a[i][''];
    $('#dacrjasesmenmedishd_ufr').val()=a[i][''];
    $('#dacrjasesmenmedishd_urr').val()=a[i][''];
    $('#dacrjasesmenmedishd_obatin').val()=a[i][''];
    $('#EvaluasiErmIrja').val()=a[i][''];*/
    }
  })
}
function assesmendokterhistoriigdupdate(idkunjunganhistori) {
  document.getElementById('linkassesmenmedisIgd').click();
  var param = {
    id: idkunjunganhistori,
  };
  apiPOST('Rekammedisirja/datakunjunganrmmedisdetail', param, hasil => {
    //$('#idunitErmIrja').val()=a[i]['keluhan_utama'];
    var a = hasil['data'];
    for (var i = 0; i < a.length; i++) {
    //$('#idKunjunganErmIrja').val()=idkunjunganhistori;
      document.getElementById('keluhanutamaassmedigd').value=a[i]['keluhan_utama'];
      document.getElementById('Riwayatpenyakitnowassmedigd').value=a[i]['penyakit_sekarang'];
      switch (a[i]['tinggal']){
      case "1":
        document.getElementById('TinggalBersamaassmedigd1').checked='true';
        break;
      case "2":
        document.getElementById('TinggalBersamaassmedigd2').checked='true';
        break;
      case "3":
        document.getElementById('TinggalBersamaassmedigd3').checked='true';
        break;
      case "4":
        document.getElementById('TinggalBersamaassmedigd4').checked='true';
        break;
      case "5":
        document.getElementById('TinggalBersamaassmedigd5').checked='true';
        break;
      }

      switch (a[i]['status_mental']){
      case "1":
        document.getElementById('statusmentalassmedigd1').checked='true';
        break;
      case "2":
        document.getElementById('statusmentalassmedigd2').checked='true';
        break;
      case "3":
        document.getElementById('statusmentalassmedigd3').checked='true';
        break;
      case "4":
        document.getElementById('statusmentalassmedigd4').checked='true';
        break;
      case "5":
        document.getElementById('statusmentalassmedigd5').checked='true';
        break;

      }

    //
      switch (a[i]['status_psikologi']){
      case "1":
        document.getElementById('statusPsikologisassmedigd1').checked='true';
        break;
      case "2":
        document.getElementById('statusPsikologisassmedigd2').checked='true';
        break;
      case "3":
        document.getElementById('statusPsikologisassmedigd3').checked='true';
        break;
      case "4":
        document.getElementById('statusPsikologisassmedigd4').checked='true';
        break;
      case "5":
        document.getElementById('statusPsikologisassmedigd5').checked='true';
        break;
      case "6":
        document.getElementById('statusPsikologisassmedigd6').checked='true';
        break;
      case "7":
        document.getElementById('statusPsikologisassmedigd7').checked='true';
        break;
      case "8":
        document.getElementById('statusPsikologisassmedigd8').checked='true';
        break;
      case "9":
        document.getElementById('statusPsikologisassmedigd9').checked='true';
        break;
      case "10":
        document.getElementById('statusPsikologisassmedigd10').checked='true';
        break;
      }

      switch (a[i]['pengguna_restrain']){
      case "1":
        document.getElementById('penggunaanRestrainassmedigd1').checked='true';
        break;
      case "2":
        document.getElementById('penggunaanRestrainassmedigd2').checked='true';
        break;
      }

      document.getElementById('Budayaassmedigd').value        =a[i]['budaya'];
      document.getElementById('KeadaanUmumassmedigd').value=a[i]['keadaan_umum'];
      document.getElementById('respirasiassmedigd').value=a[i]['respirasi'];
      document.getElementById('nadiassmedigd').value=a[i]['nadi'];
      document.getElementById('Spo2assmedigd').value=a[i]['spo2'];
      document.getElementById('pupilkiriassmedigd').value=a[i]['pupil_kiri'];
      document.getElementById('pupilkananassmedigd').value=a[i]['pupil_kanan'];;
      document.getElementById('tekananDarahermigd1').value=a[i]['tekanan_darah1']; 
      document.getElementById('tekananDarahermigd2').value=a[i]['tekanan_darah2'];; 
      document.getElementById('palpasiassmedigd').value=a[i]['palpasi'];
      document.getElementById('suhuassmedigd').value=a[i]['suhu'];
      document.getElementById('reflekCahayaKiriassmedigd').value= a[i]['reflek_cahaya_kiri'];;
      document.getElementById('reflekCahayaKananassmedigd').value= a[i]['reflek_cahaya_kanan'];
      document.getElementById('bbassmedigd').value=a[i]['bb'];
      document.getElementById('tinggiassmedigd').value=a[i]['tinggi_badan'];
      document.getElementById('imtassmedigd').value=a[i]['imt'];
      document.getElementById('dacrjasesmenmedis_bgcstot').value=a[i]['skor_kesadaran'];
      document.getElementById('Assesmenassmedigd').value=a[i]['assesmen_medis'];
      document.getElementById('tindakanassmedigd').value=a[i]['tindakan_medis'];
      document.getElementById('planningassmedigd').value=a[i]['planning_medis'];
      document.getElementById('fisikStatusLocalisassmedigd').value=a[i]['status_lokalis'];

      switch (a[i]['pasien_kompleks']){
      case "1":
        document.getElementById('pasienKompleksassmedigd1').checked='true';
        break;
      case "2":
        document.getElementById('pasienKompleksassmedigd2').checked='true';
        break;
      }

      document.getElementById('fisikKepalaassmedigdKet').value=a[i]['kepala_ket'];
      switch (a[i]['kepala']){
      case "1":
        document.getElementById('fisikKepalaassmedigd1').checked='true';
        break;
      case "2":
        document.getElementById('fisikKepalaassmedigd2').checked='true';
        break;
      }

      document.getElementById('fisikJantungassmedigdKet').value=a[i]['jantung_ket'];
      switch (a[i]['jantung']){
      case "1":
        document.getElementById('fisikJantungassmedigd1').checked='true';
        break;
      case "2":
        document.getElementById('fisikJantungassmedigd2').checked='true';
        break; 
      }

      switch (a[i]['mata']){
      case "1":
        document.getElementById('fisikMataassmedigd1').checked='true';
        break;
      case "2":
        document.getElementById('fisikMataassmedigd2').checked='true';
        break; 
      }
      document.getElementById('fisikMataassmedigdKet').value=a[i]['mata_ket'];

      document.getElementById('fisikParuassmedigdKet').value=a[i]['paru_ket'];
      switch (a[i]['paru']){
      case "1":
        document.getElementById('fisikParuassmedigd1').checked='true';
        break;
      case "2":
        document.getElementById('fisikParuassmedigd2').checked='true';
        break; 
      }

      document.getElementById('fisikThtassmedigdKet').value=a[i]['tht_ket'];
      switch (a[i]['tht']){
      case "1":
        document.getElementById('fisikThtassmedigd1').checked='true';
        break;
      case "2":
        document.getElementById('fisikThtassmedigd2').checked='true';
        break; 
      }

      document.getElementById('fisikAbdomenassmedigdKet').value=a[i]['abdomen_ket']; 
      switch (a[i]['abdomen']){
      case "1":
        document.getElementById('fisikAbdomenassmedigd1').checked='true';
        break;
      case "2":
        document.getElementById('fisikAbdomenassmedigd2').checked='true';
        break; 
      }   

      document.getElementById('fisikLeherassmedigdKet').value=a[i]['leher_ket'];
      switch (a[i]['leher']){
      case "1":
        document.getElementById('fisikLeherassmedigd1').checked='true';
        break;
      case "2":
        document.getElementById('fisikLeherassmedigd2').checked='true';
        break; 
      }

      document.getElementById('fisikGenitaliaassmedigdKet').value=a[i]['genitalia_ket'];
      switch (a[i]['genitalia']){
      case "1":
        document.getElementById('fisikGenitaliaassmedigd1').checked='true';
        break;
      case "2":
        document.getElementById('fisikGenitaliaassmedigd2').checked='true';
        break; 
      }

      document.getElementById('fisikMulutassmedigdKet').value=a[i]['mulut_ket'];
      switch (a[i]['mulut']){
      case "1":
        document.getElementById('fisikMulutassmedigd1').checked='true';
        break;
      case "2":
        document.getElementById('fisikMulutassmedigd2').checked='true';
        break; 
      }

      document.getElementById('fisikThoraxassmedigdKet').value=a[i]['thoraks_ket'];
      switch (a[i]['thoraks']){
      case "1":
        document.getElementById('fisikThoraxassmedigd1').checked='true';
        break;
      case "2":
        document.getElementById('fisikThoraxassmedigd2').checked='true';
        break; 
      }
/*    $('#dacrjasesmengigmedis_glidahket').val()=a[i][''];
    $('#dacrjasesmengigmedis_gmukosapipi').val()=a[i][''];
    document.querySelector('input[name=dacrjasesmengigmedis_goklusiId]:checked').value,
    document.querySelector('input[name=dacrjasesmengigmedis_gtorus1Id]:checked').value,
    document.querySelector('input[name=dacrjasesmengigmedis_gtorus2Id]:checked').value,
    document.querySelector('input[name=dacrjasesmengigmedis_gpalatumId]:checked').value,
    document.querySelector('input[name=dacrjasesmengigmedis_gdiastemaId]:checked').value,
    $('#dacrjasesmengigmedis_gdiastemaket').val()=a[i][''];
    $('#dacrjasesmengigmedis_ganomaliId').val()=a[i][''];
    $('#dacrjasesmengigmedis_ganomaliket').val()=a[i][''];
    document.querySelector('input[name=dacrjasesmengigmedis_gfrenulum1Id]:checked').value,
    document.querySelector('input[name=dacrjasesmengigmedis_gfrenulum2Id]:checked').value,
    document.querySelector('input[name=dacrjasesmengigmedis_gohisId]:checked').value,
    $('#dacrjasesmengigmedis_gtemuanlain').val(),*/
      //mata
/*    $('#dacrjasesmenmatmedis_mod').val()=a[i][''];
    $('#dacrjasesmenmatmedis_mos').val()=a[i][''];
    $('#dacrjasesmenmatmedis_madisi').val()=a[i][''];
    $('#dacrjasesmenmatmedis_mavod').val()=a[i][''];
    $('#dacrjasesmenmatmedis_mavos').val()=a[i][''];
    document.querySelector('input[name=dacrjasesmenmatmedis_mishiharaId]:checked').value,
    $('#dacrjasesmenmatmedis_mschimer1').val()=a[i][''];
    $('#dacrjasesmenmatmedis_mschimer2').val()=a[i][''];
      //obgyn
    document.querySelector('input[name=dacrjasesmenmtmedis_obgId]:checked').value,
    $('#dacrjasesmenmtmedis_otfu').val()=a[i][''];
    $('#dacrjasesmenmtmedis_olila').val()=a[i][''];
    $('#dacrjasesmenmtmedis_ohis').val()=a[i][''];
    $('#dacrjasesmenmtmedis_ohislama').val()=a[i][''];
    $('#dacrjasesmenmtmedis_odjj').val()=a[i][''];
    $('#dacrjasesmenmtmedis_ovulva').val()=a[i][''];
    $('#dacrjasesmenmtmedis_oportio').val()=a[i][''];
    $('#dacrjasesmenmtmedis_ocorpus').val()=a[i][''];
    $('#dacrjasesmenmtmedis_oparametrium').val()=a[i][''];
    $('#dacrjasesmenmtmedis_ocavum').val()=a[i][''];
    $('#dacrjasesmenmtmedis_ovulvadalam').val()=a[i][''];
    $('#dacrjasesmenmtmedis_oportiodalam').val()=a[i][''];
    $('#dacrjasesmenmtmedis_opembukaan').val()=a[i][''];
    $('#dacrjasesmenmtmedis_ohodge').val()=a[i][''];
    $('#dacrjasesmenmtmedis_opresentasi').val()=a[i][''];
    $('#dacrjasesmenmtmedis_oketuban').val()=a[i][''];
      //hd
    document.querySelectorAll('input[name="dacrjasesmenmedishd_kolaborasihdlist_1"]:checked'),
    document.querySelectorAll('input[name="dacrjasesmenmedishd_kolaborasihdlist_2"]:checked'),
    document.querySelectorAll('input[name="dacrjasesmenmedishd_kolaborasihdlist_3"]:checked'),
    document.querySelectorAll('input[name="dacrjasesmenmedishd_kolaborasihdlist_4"]:checked'),
    document.querySelectorAll('input[name="dacrjasesmenmedishd_kolaborasihdlist_5"]:checked'),
    document.querySelectorAll('input[name="dacrjasesmenmedishd_kolaborasihdlist_6"]:checked'),
    document.querySelectorAll('input[name="dacrjasesmenmedishd_kolaborasihdlist_7"]:checked'),
    document.querySelectorAll('input[name="dacrjasesmenmedishd_kolaborasihdlist_8"]:checked'),
    document.querySelectorAll('input[name="dacrjasesmenmedishd_kolaborasihdlist_9"]:checked'),
    $('#dacrjasesmenmedishd_kolaborasihdlain').val(),
    document.querySelector('input[name=dacrjasesmenmedishd_resephd]:checked').value
    document.querySelector('input[name=dacrjasesmenmedishd_dialisat]:checked').value,
    document.querySelector('input[name=dacrjasesmenmedishd_pprofilinglist]:checked').value,
    document.querySelector('input[name=dacrjasesmenmedishd_heparinisasilist]:checked').value,
    $('#dacrjasesmenmedishd_ufg').val()=a[i][''];
    $('#dacrjasesmenmedishd_qb').val()=a[i][''];
    $('#dacrjasesmenmedishd_qd').val()=a[i][''];
    $('#dacrjasesmenmedishd_ureumpre').val()=a[i][''];
    $('#dacrjasesmenmedishd_ureumpost').val()=a[i][''];
    $('#dacrjasesmenmedishd_frekuensi').val()=a[i][''];
    $('#dacrjasesmenmedishd_urasihd').val()=a[i][''];
    $('#dacrjasesmenmedishd_urasihdmenit').val()=a[i][''];
    $('#dacrjasesmenmedishd_ufr').val()=a[i][''];
    $('#dacrjasesmenmedishd_urr').val()=a[i][''];
    $('#dacrjasesmenmedishd_obatin').val()=a[i][''];
    $('#EvaluasiErmIrja').val()=a[i][''];*/
    }
  })
}
function assesmendokterhistoriermigd(idkunjunganhistori){
  var assmedhis = '';
  var param = {
    id: idkunjunganhistori,
  };
  apiPOST('Rekammedisirja/datakunjunganrmmedisdetail', param, hasil => {
    var a = hasil['data'];
    for (var i = 0; i < a.length; i++) {
      assmedhis += '<div class="row col-md-12">';

      assmedhis += '<div class="row">';
      assmedhis += '<div><u>ASSESMENT MEDIS</u></div>';
      assmedhis += '</div>';
      assmedhis += '<div class="row">';
      assmedhis += '<div class="col-md-4 p2">'
      assmedhis += '<label class="form-label">Keluhan Utama</label>';
      assmedhis += '</div>';
      assmedhis += '<div class="col-md-8 p2">';
      assmedhis += '<textarea class="form-control " id="keluhanutamaErmIrjaHis" readonly>'+a[i]['keluhan_utama']+'</textarea>';
      assmedhis += '</div>';

      assmedhis += '<div class="col-md-12 p4">';
      assmedhis += '<hr>';
      assmedhis += '</div>';

      assmedhis += '<div class="col-md-12 p2">';
      assmedhis += '<label class="form-label"><u>BIOPSIKOSOSIAL, KULTURAL, SPIRITUAL</u></label>';
      assmedhis += '</div>';

      assmedhis += '<div class="col-md-4 p2">';
      assmedhis += '<label class="form-label">Status Mental</label>';
      assmedhis += '</div>';
      assmedhis += '<div class="col-md-8 p2">';
      if (a[i]['status_mental']='1') {
        assmedhis += '<textarea class="form-control" id="statusmentalErmIrjahis" readonly>Orientasi Baik</textarea>';
      } else if(a[i]['status_mental']='2') {
        assmedhis += '<textarea class="form-control" id="statusmentalErmIrjahis" readonly>Agitasi</textarea>';
      } else if(a[i]['status_mental']=='3'){
        assmedhis += '<textarea class="form-control" id="statusmentalErmIrjahis" readonly>Menyerang</textarea>';
      } else if(a[i]['status_mental']=='4'){
       assmedhis += '<textarea class="form-control" id="statusmentalErmIrjahis" readonly>Tidak Ada Respon</textarea>';
     } else {
       assmedhis += '<textarea class="form-control" id="statusmentalErmIrjahis" readonly>LAin</textarea>';
     }

     assmedhis += '</div>';
     assmedhis += '<div class="col-md-4 p2">';
     assmedhis += '<label class="form-label">Status Psikolog</label>';
     assmedhis += '</div>';
     assmedhis += '<div class="col-md-8 p2">';
     switch(a[i]['status_psikologi']) {
     case '1':
       assmedhis += '<textarea class="form-control" id="statuspsikoErmIrjahis" readonly>Kooperatif</textarea>';
       break;
     case '2':
       assmedhis += '<textarea class="form-control" id="statuspsikoErmIrjahis" readonly>Disorientasi</textarea>';
       break;
     case '3':
       assmedhis += '<textarea class="form-control" id="statuspsikoErmIrjahis" readonly>Tenang</textarea>';
       break;
     case '4':
       assmedhis += '<textarea class="form-control" id="statuspsikoErmIrjahis" readonly>Hiperaktif</textarea>';
       break;
     case '5':
       assmedhis += '<textarea class="form-control" id="statuspsikoErmIrjahis" readonly>Cemas</textarea>';
       break;
     case '6':
       assmedhis += '<textarea class="form-control" id="statuspsikoErmIrjahis" readonly>Kecenderungan Bunuh Diri</textarea>';
       break;
     case '7':
       assmedhis += '<textarea class="form-control" id="statuspsikoErmIrjahis" readonly>Gelisah</textarea>';
       break;
     case '8':
       assmedhis += '<textarea class="form-control" id="statuspsikoErmIrjahis" readonly>Depresi</textarea>';
       break;
     case '9':
       assmedhis += '<textarea class="form-control" id="statuspsikoErmIrjahis" readonly>Marah</textarea>';
       break;
     case '10':
       assmedhis += '<textarea class="form-control" id="statuspsikoErmIrjahis" readonly> Lain-Lain</textarea>';
       break;
     default:
    // code block
     }
     assmedhis += '</div>';
     assmedhis += '<div class="col-md-4 p2">';
     assmedhis += '<label class="form-label">Penggunaan restrain</label>';
     assmedhis += '</div>';
     assmedhis += '<div class="col-md-8 p2">';
     if (a[i]['pengguna_restrain']=='1') {
      assmedhis += '<textarea class="form-control" id="restrainErmIrjahis" readonly>Tidak</textarea>';
    } else {
      assmedhis += '<textarea class="form-control" id="restrainErmIrjahis" readonly>Ya</textarea>';
    }

    assmedhis += '</div>';
    assmedhis += '<div class="col-md-4 p2">';
    assmedhis += '<label class="form-label">Budaya</label>';
    assmedhis += '</div>';
    assmedhis += '<div class="col-md-8 p2">';
    assmedhis += '<textarea class="form-control" id="AgamaErmIrjahis" readonly>'+a[i]['budaya']+'</textarea>';
    assmedhis += '</div>';

    assmedhis += '<div class="col-md-12 p4">';
    assmedhis += '<hr>';
    assmedhis += '</div>';

    assmedhis += '<div class="col-md-12 p2">';
    assmedhis += '<label class="form-label"><u>TANDA VITAL</u></label>';
    assmedhis += '</div>';
    assmedhis += '<div class="col-md-2 p2">';
    assmedhis += '<label class="form-label">Keadaan Umum</label>';
    assmedhis += '</div>';
    assmedhis += '<div class="col-md-4 p2">';
    assmedhis += '<input type="text" class="form-control" id="keadaanumumErmIrjahis" value="'+a[i]['keadaan_umum']+'" readonly>';
    assmedhis += '</div>';
    assmedhis += '<div class="col-md-2 p2">';
    assmedhis += '<label class="form-label">Respirasi</label>';
    assmedhis += '</div>';
    assmedhis += '<div class="col-md-2 p2">';
    assmedhis += '<input type="text" class="form-control" id="respirasirmIrjahis" value="'+a[i]['respirasi']+'" readonly>';
    assmedhis += '</div>';
    assmedhis += '<div class="input-group-prepend"><span>x/Menit</span></div>';

    assmedhis += '<div class="col-md-2 p2">';
    assmedhis += '<label class="form-label">Nadi</label>';
    assmedhis += '</div>';
    assmedhis += '<div class="col-md-2 p2">';
    assmedhis += '<input type="text" class="form-control" id="nadirmIrjahis" value="'+a[i]['nadi']+'" readonly>';
    assmedhis += '</div>';
    assmedhis += '<div class="input-group-prepend col-md-2 p2"><span>x/Menit</span></div>';
    assmedhis += '<div class="col-md-2 p2">';
    assmedhis += '<label class="form-label">SpO2</label>';
    assmedhis += '</div>';
    assmedhis += '<div class="col-md-2 p2">';
    assmedhis += '<input type="text" class="form-control" id="spo2mIrjahis" value="'+a[i]['spo2']+'" readonly>';
    assmedhis += '</div>';
    assmedhis += '<div class="input-group-prepend"><span>x/Menit</span></div>';



    assmedhis += '<div class="col-md-2 p2">';
    assmedhis += '<label class="form-label">Pupil Kanan&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>';
    assmedhis += '</div>';
    assmedhis += '<div class="col-md-2 p2">';
    assmedhis += '<input type="text" class="form-control" id="pupilkirirmIrjahis" value="'+a[i]['pupil_kanan']+'" readonly>';
    assmedhis += '</div>';
    assmedhis += '<div class="input-group-prepend col-md-2 p2"><span>mm</span></div>';
    assmedhis += '<div class="col-md-2 p2">';
    assmedhis += '<label class="form-label">Pupil Kiri&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>';
    assmedhis += '</div>';
    assmedhis += '<div class="col-md-2 p2">';
    assmedhis += '<input type="text" class="form-control" id="pupilkirirmIrjahis" value="'+a[i]['pupil_kiri']+'" readonly>';
    assmedhis += '</div>';
    assmedhis += '<div class="input-group-prepend col-md-2 p2"><span>mm</span></div>';

    assmedhis += '<div class="col-md-2 p2">';
    assmedhis += '<label class="form-label">Tekanan Darah</label>';
    assmedhis += '</div>';
    assmedhis += '<div class="col-md-2">';
    assmedhis += '<input type="text" class="form-control" id="tekanandarahrmIrjahis" value="'+a[i]['tekanan_darah1']+'/'+a[i]['tekanan_darah2']+' " placeholder=" / " readonly>';
    assmedhis += '</div>';
    assmedhis += '<div class="input-group-prepend col-md-2"><span>mm/Hg</span></div>';

    assmedhis += '<div class="col-md-2 p2">';
    assmedhis += '<label class="form-label">Perpalpasi</label>';
    assmedhis += '</div>';
    assmedhis += '<div class="col-md-2">';
    assmedhis += '<input type="text" class="form-control" id="perpalpasirmIrjahis" value="'+a[i]['palpasi']+'" placeholder="" readonly>';
    assmedhis += '</div>';
    assmedhis += '<div class="input-group-prepend col-md-2"><span>perpalpasi</span></div>';

    assmedhis += '<div class="col-md-2 p2">';
    assmedhis += '<label class="form-label">Suhu</label>';
    assmedhis += '</div>';
    assmedhis += '<div class="col-md-2">';
    assmedhis += '<input type="text" class="form-control" id="suhurmIrjahis" value="'+a[i]['suhu']+'" placeholder="" readonly>';
    assmedhis += '</div>';
    assmedhis += '<div class="input-group-prepend col-md-2"><span>C</span></div>';

    assmedhis += '<div class="col-md-2 p2">';
    assmedhis += '<label class="form-label">Imt</label>';
    assmedhis += '</div>';
    assmedhis += '<div class="col-md-2">';
    assmedhis += '<input type="text" class="form-control" id="imtrmIrjahis" value="'+a[i]['imt']+'" placeholder="" readonly>';
    assmedhis += '</div>';
    assmedhis += '<div class="input-group-prepend col-md-2"><span>kg/m2</span></div>';

    assmedhis += '<div class="col-md-2 p2">';
    assmedhis += '<label class="form-label">Berat Badan</label>';
    assmedhis += '</div>';
    assmedhis += '<div class="col-md-2 p2">';
    assmedhis += '<input type="text" class="form-control" id="beratbadanrmIrjahis" value="'+a[i]['bb']+'" readonly>';
    assmedhis += '</div>';
    assmedhis += '<div class="input-group-prepend col-md-2 p2"><span>kg</span></div>';
    assmedhis += '<div class="col-md-2 p2">';
    assmedhis += '<label class="form-label">Tinggi Badan</label>';
    assmedhis += '</div>';
    assmedhis += '<div class="col-md-2 p2">';
    assmedhis += '<input type="text" class="form-control" id="tinggibadanrmIrjahis" value="'+a[i]['tinggi_badan']+'" readonly>';
    assmedhis += '</div>';
    assmedhis += '<div class="input-group-prepend col-md-2"><span>cm</span></div>';
    assmedhis += '<div class="col-md-2 p2">';
    assmedhis += '<label class="form-label">Reflek Cahaya Kanan</label>';
    assmedhis += '</div>';
    assmedhis += '<div class="col-md-2 p2">';
    assmedhis += '<input type="text" class="form-control" id="reflekcahayakirirmIrjahis" value="'+a[i]['reflek_cahaya_kanan']+'" readonly>';
    assmedhis += '</div>';
    assmedhis += '<div class="input-group-prepend col-md-2 p2"><span></span></div>';
    assmedhis += '<div class="col-md-2 p2">';
    assmedhis += '<label class="form-label">Reflek Cahaya Kiri</label>';
    assmedhis += '</div>';
    assmedhis += '<div class="col-md-2 p2">';
    assmedhis += '<input type="text" class="form-control" id="reflekcahayakirirmIrjahis" value="'+a[i]['reflek_cahaya_kiri']+'" readonly>';
    assmedhis += '</div>';
    assmedhis += '<div class="input-group-prepend col-md-2 p2"><span></span></div>';
    assmedhis += '<div class="col-md-12 p4">';
    assmedhis += '<hr>';
    assmedhis += '</div>';

    assmedhis += '<div class="col-md-12 p2">';
    assmedhis += '<label class="form-label"><u>GLASGOW COMA SCALE ( GCS )</u></label>';
    assmedhis += '</div>';

    assmedhis += '<div class="info-box mb-0" >'; 
    assmedhis += '<table class="table table-striped table-sm" cellspacing="0" cellpadding="0" border="0">';
    assmedhis += '<thead>';
    assmedhis += '<tr style="background-color: #6c757d;color:white">';
    assmedhis += '<td>Kategori</td>';
    assmedhis += '<td>Hasil</td>';
    assmedhis += '<td>Skor</td>';
    assmedhis += '</tr>';
    assmedhis += '</thead>';
    assmedhis += '<tbody>';
    assmedhis +=  '<tr>';
    assmedhis +=  '<td>Respon Buka Mata (Eye Opening : E)</td>';
    assmedhis += '<td>Spontan</td>';
    assmedhis +=  '<td>'+a[i]['respon_e']+'</td>';
    assmedhis +=  '</tr>';
    assmedhis +=  '<tr>';
    assmedhis +=  '<td> Respon Motorik Terbaik (M) </td>';
    assmedhis += '<td> Turut Perintah </td>';
    assmedhis +=  '<td>'+a[i]['respon_m']+'</td>';
    assmedhis +=  '</tr>';
    assmedhis +=  '<tr>';
    assmedhis +=  '<td>  Respon Verbal (V) </td>';
    assmedhis += '<td>  Berorientasi Baik  </td>';
    assmedhis +=  '<td>'+a[i]['respon_v']+'</td>';
    assmedhis +=  '</tr>';
    assmedhis +=  '</tbody>';
    assmedhis +=  '</table>';
    assmedhis +=  '</div>';

    assmedhis += '<div class="col-md-12 p4">';
    assmedhis += '<hr>';
    assmedhis += '</div>';

    assmedhis += '<div class="col-md-12 p4">';
    assmedhis += '<label class="form-label"><u>PEMERIKSAAN FISIK UMUM</u></label>';
    assmedhis += '</div>';

    assmedhis += '<div class="col-md-2 p2">';
    assmedhis += '<label class="form-label">Kepala</label>';
    assmedhis += '</div>';
    assmedhis += '<div class="col-md-4 p2">';
    if (a[i]['kepala']=='1') {
      assmedhis += '<input type="text" class="form-control" id="kepalaErmIrjahis" value="Normal" readonly>';
    } else {
      assmedhis += '<input type="text" class="form-control" id="kepalaErmIrjahis" value="'+a[i]['kepala']+'" readonly>';
    }

    assmedhis += '</div>';
    assmedhis += '<div class="col-md-2 p2">';
    assmedhis += '<label class="form-label">Mata</label>';
    assmedhis += '</div>';
    assmedhis += '<div class="col-md-4 p2">';
    if (a[i]['mata']=='1') {
      assmedhis += '<input type="text" class="form-control" id="matarmIrjahis" value="Normal" readonly>';
    } else {
      assmedhis += '<input type="text" class="form-control" id="matarmIrjahis" value="'+a[i]['mata']+'" readonly>';
    }

    assmedhis += '</div>';


    assmedhis += '<div class="col-md-2 p2">';
    assmedhis += '<label class="form-label">Tht</label>';
    assmedhis += '</div>';
    assmedhis += '<div class="col-md-4 p2">';
    if (a[i]['tht']=='1') {
     assmedhis += '<input type="text" class="form-control" id="thtErmIrjahis" value="Normal" readonly>';
   } else {
    assmedhis += '<input type="text" class="form-control" id="thtErmIrjahis" value="'+a[i]['tht']+'" readonly>';
  }

  assmedhis += '</div>';
  assmedhis += '<div class="col-md-2 p2">';
  assmedhis += '<label class="form-label">Leher</label>';
  assmedhis += '</div>';
  assmedhis += '<div class="col-md-4 p2">';
  if (a[i]['leher']=='1') {
   assmedhis += '<input type="text" class="form-control" id="leherrmIrjahis" value="Normal" readonly>';
 } else {
   assmedhis += '<input type="text" class="form-control" id="leherrmIrjahis" value="'+a[i]['leher']+'" readonly>';
 }

 assmedhis += '</div>';


 assmedhis += '<div class="col-md-2 p2">';
 assmedhis += '<label class="form-label">Mulut</label>';
 assmedhis += '</div>';
 assmedhis += '<div class="col-md-4 p2">';
 if (a[i]['mulut']=='1') {
  assmedhis += '<input type="text" class="form-control" id="mulutrmIrjahis" value="Normal" readonly>';
} else {
  assmedhis += '<input type="text" class="form-control" id="mulutrmIrjahis" value="'+a[i]['mulut_ket']+'" readonly>';
}
assmedhis += '</div>';
assmedhis += '<div class="col-md-2 p2">';
assmedhis += '<label class="form-label">Thorax</label>';
assmedhis += '</div>';
assmedhis += '<div class="col-md-4 p2">';
if (a[i]['thoraks']=='1') {
  assmedhis += '<input type="text" class="form-control" id="thoraxrmIrjahis" value="Normal" readonly>';
} else {
  assmedhis += '<input type="text" class="form-control" id="thoraxrmIrjahis" value="'+a[i]['thoraks_ket']+'" readonly>';
}
assmedhis += '</div>';

assmedhis += '<div class="col-md-2 p2">';
assmedhis += '<label class="form-label">Jantung</label>';
assmedhis += '</div>';
assmedhis += '<div class="col-md-4 p2">';
if (a[i]['jantung']=='1') {
  assmedhis += '<input type="text" class="form-control" id="jantungrmIrjahis" value="Normal" readonly>';
} else {
  assmedhis += '<input type="text" class="form-control" id="jantungrmIrjahis" value="'+a[i]['jantung_ket']+'" readonly>';
}
assmedhis += '</div>';
assmedhis += '<div class="col-md-2 p2">';
assmedhis += '<label class="form-label">Paru</label>';
assmedhis += '</div>';
assmedhis += '<div class="col-md-4 p2">';
if (a[i]['paru']=='1') {
  assmedhis += '<input type="text" class="form-control" id="parurmrjahis" value="Normal" readonly>';
} else {
  assmedhis += '<input type="text" class="form-control" id="parurmrjahis" value="'+a[i]['paru_ket']+'" readonly>';
}
assmedhis += '</div>';

assmedhis += '<div class="col-md-2 p2">';
assmedhis += '<label class="form-label">Ambomen</label>';
assmedhis += '</div>';
assmedhis += '<div class="col-md-4 p2">';
if (a[i]['abdomen']=='1') {
  assmedhis += '<input type="text" class="form-control" id="ambomenErmIrjahis" value="Normal" readonly>';
} else {
  assmedhis += '<input type="text" class="form-control" id="ambomenErmIrjahis" value="'+a[i]['abdomen_ket']+'" readonly>';
}
assmedhis += '</div>';
assmedhis += '<div class="col-md-2 p2">';
assmedhis += '<label class="form-label">Genitalia</label>';
assmedhis += '</div>';
assmedhis += '<div class="col-md-4 p2">';
if (a[i]['genitalia']=='1') {
 assmedhis += '<input type="text" class="form-control" id="genitaliarmIrjahis" value="Normal" readonly>';
} else {
 assmedhis += '<input type="text" class="form-control" id="genitaliarmIrjahis" value="'+a[i]['genitalia']+'" readonly>';
}

assmedhis += '</div>';

assmedhis += '<div class="col-md-2 p2">';
assmedhis += '<label class="form-label"> Status Localis </label>';
assmedhis += '</div>';
assmedhis += '<div class="col-md-4 p2">';
assmedhis += '<input type="text" class="form-control" id="localisrmIrjahis" value="'+a[i]['status_lokalis']+'" readonly>';
assmedhis += '</div>';

assmedhis += '<div class="col-md-12 p4">';
assmedhis += '<hr>';
assmedhis += '</div>';

assmedhis += '<div class="col-md-2 p6">'
assmedhis += '<label class="form-label">ASSESMEN</label>';
assmedhis += '</div>';
assmedhis += '<div class="col-md-10 p2">';
assmedhis += '<textarea class="form-control " id="assesmedErmIrjaHis" readonly>'+a[i]['assesmen_medis']+'</textarea>';
assmedhis += '</div>';

assmedhis += '<div class="col-md-2 p2">'
assmedhis += '<label class="form-label">PLANING</label>';
assmedhis += '</div>';
assmedhis += '<div class="col-md-10 p2">';
assmedhis += '<textarea class="form-control " id="planingmedErmIrjaHis" readonly>'+a[i]['planning_medis']+'</textarea>';
assmedhis += '</div>';

assmedhis += '<div class="col-md-2 p2">'
assmedhis += '<label class="form-label">TINDAKAN</label>';
assmedhis += '</div>';
assmedhis += '<div class="col-md-10 p2">';
assmedhis += '<textarea class="form-control " id="tindakanmedErmIrjaHis" readonly>'+a[i]['tindakan_medis']+'</textarea>';
assmedhis += '</div>';

assmedhis += '<div class="col-md-2 p2">'
assmedhis += '<label class="form-label">PASIEN KOMPLEKS</label>';
assmedhis += '</div>';
assmedhis += '<div class="col-md-10 p2">';
switch(a[i]['tipe_kesadaran']) {
case '1':
  assmedhis += '<textarea class="form-control " id="kompleksmedErmIrjaHis" readonly>Compos Metis</textarea>';
  break;
case '2':
  assmedhis += '<textarea class="form-control " id="kompleksmedErmIrjaHis" readonly>Apatis</textarea>';
  break;
case '3':
  assmedhis += '<textarea class="form-control " id="kompleksmedErmIrjaHis" readonly>Somnolen</textarea>';
  break;
case '4':
  assmedhis += '<textarea class="form-control " id="kompleksmedErmIrjaHis" readonly>Delirium</textarea>';
  break;
case '5':
  assmedhis += '<textarea class="form-control " id="kompleksmedErmIrjaHis" readonly>Sopor</textarea>';
  break;
case '6':
  assmedhis += '<textarea class="form-control " id="kompleksmedErmIrjaHis" readonly>Coma</textarea>';
  break;
default:

}

assmedhis += '</div>';
assmedhis += '<div><button class="btn btn-primary p2" onclick="assesmendokterhistoriigdupdate('+idkunjunganhistori+');">Update</button></div>';
assmedhis += '</div>';
assmedhis += '</div>';

}


document.getElementById("idpanelhistorirm"+idkunjunganhistori+"").innerHTML = assmedhis;
})
}

function treagehistoriermigd(idkunjunganhistori,idunit){
  var url = "<?php echo base_url(); ?>";

  var asskephis = '';
  var param = {
    id_kunjungan    : idkunjunganhistori,
    idunit:idunit
  };
  apiPOST('Rekammedisigd/viewasstreage', param, hasil => {
    var a = hasil.data; 
    var b = hasil.treage; 
    asskephis += '<div class="row">';
    asskephis += '<div class="col-md-12"><u>TREAGE</u></div>';
    asskephis += '</div><br>';
    asskephis += '<div class="row">';
    asskephis += '<div class="col-md-12">';

    asskephis += '        <div class="form-group row">';
    asskephis += '    <div class="col-md-3">';
    asskephis += '      <label class="col-form-label">Tanggal Masuk IGD</label>';
    asskephis += '    </div>';
    asskephis += '      <div class="input-group date" data-target-input="nearest">';
    asskephis += '    <div class="col-md-3">';
    asskephis += '        <input  class="form-control" value="'+b.tgl_masuk+'" >';

    asskephis += '      </div>';
    asskephis += '    </div>';
    asskephis += '  </div>';
    asskephis += '        <div class="form-group row">';
    asskephis += '    <div class="col-md-3">';
    asskephis += '      <label class="col-form-label">Keluhan Utama</label>';
    asskephis += '    </div>';
    asskephis += '      <div class="input-group date" data-target-input="nearest">';
    asskephis += '    <div class="col-md-9">';
    asskephis += '        <input  class="form-control" value="'+b.keluhan_utama+'" >';

    asskephis += '      </div>';
    asskephis += '    </div>';
    asskephis += '  </div>';
    asskephis += '  <div class="form-group row">  ';
    asskephis += '    <div class="col-md-3">';
    asskephis += '      <label class="col-form-label">Jam Datang</label>';
    asskephis += '    </div>';
    asskephis += '    <div class="col-md-3">';
    asskephis += '      <div class="input-group date"  data-target-input="nearest">';
    asskephis += '        <input  class="form-control " value="'+b.jam_datang+'" >';

    asskephis += '      </div>';
    asskephis += '    </div>';
    asskephis += '  </div>';
    asskephis += '  <div class="form-group row">';
    asskephis += '    <div class="col-md-3">';
    asskephis += '      <label class="col-form-label">Jam Periksa</label>';
    asskephis += '    </div>';
    asskephis += '    <div class="col-md-3">';
    asskephis += '      <div class="input-group date"  data-target-input="nearest">';
    asskephis += '        <input class="form-control" value="'+b.jam_periksa+'">';

    asskephis += '      </div>';
    asskephis += '    </div>';
    asskephis += '  </div>';
    asskephis += '  <div class="form-group row">';
    asskephis += '    <div class="col-md-3">';
    asskephis += '      <label class="col-form-label">Informasi Didapat Dari</label>';
    asskephis += '    </div>';
    asskephis += '    <div class="col-md-3">';
    switch(b.terima_informasi){
    case '1':
      asskephis += '        <input class="form-control " value="Auto Anamnesa">';
      break;
    case '2':
      asskephis += '        <input class="form-control " value="Hetero Anamnesa">';
      break;

    }

    asskephis += '    </div>';
    asskephis += '    <div style="display: none;">';
    asskephis += '      <input type="text"  class="form-control form-control-xs" >';
    asskephis += '      <input type="text"  class="form-control form-control-xs">';
    asskephis += '    </div>';
    asskephis += '  </div>';
    asskephis += '  <div class="form-group row">';
    asskephis += '    <div class="col-md-3">';
    asskephis += '      <label class="col-form-label">Status Kecelekaan</label>';
    asskephis += '    </div>';
    asskephis += '    <div class="col-md-3">';
    asskephis += '      <label>Kecelakaan</label>';
    switch(b.status_laka){
    case '1':
      asskephis += '        <input class="form-control"value="Bukan Kecelakaan">';
      break;
    case '2':
      asskephis += '        <input class="form-control"value="Kecelekaan">';
      break;

    }
    

    asskephis += '    </div>';
    asskephis += '  </div>';
    asskephis += '  <div class="form-group row">';
    asskephis += '    <div style="display: none;" class="col-md-6">';
    asskephis += '        <input class="form-control" >';

    asskephis += '      <div class="col-md-6"> ';                     
    asskephis += '        <label>Tanggal Kecelakaan</label>';
    asskephis += '        <input  class="form-control " value="'+b.tgl_laka+'">';
    asskephis += '      </div>';
    asskephis += '      <div class="col-md-6"> ';
    asskephis += '        <label>Tempat Kejadian</label>';
    asskephis += '        <input type="text" class="form-control" value="'+b.tempat_laka+'">';
    asskephis += '       </div>';
    asskephis += '      <div class="col-md-3">';
    asskephis += '        <label>Pengatar Pasien</label>';
    asskephis += '        <input type="text" class="form-control " value="'+b.pengatar_laka+'">';
    asskephis += '      </div>';
    asskephis += '    </div>';
    asskephis += '  </div>';
    asskephis += '</div>';
    asskephis += '<div class="col-md-6 ">';
    asskephis += '  <div class="form-group row">';
    asskephis += '    <div class="col-md-3">';
    asskephis += '      <label class="col-form-label">Petugas</label>';
    asskephis += '    </div>';
    asskephis += '    <div class="col-md-7">';
    asskephis += '      <div class="input-group">';
    switch(b.status_laka){
    case '1':
      asskephis += ' <input class="form-control"value="Bukan Kecelakaan">';
      break;
    case '2':
      asskephis += ' <input class="form-control"value="Kecelekaan">';
      break;

    }
    asskephis += ' </div>';
    asskephis += ' </div>';
    asskephis += ' </div>';
    asskephis += ' <div class="form-group row" >';
    asskephis += ' <div class="col-md-3">';
    asskephis += ' <label class="col-form-label">Perawat/Bidan *</label>';
    asskephis += ' </div>';
    asskephis += ' <div class="col-md-7">';
    asskephis += ' <input class="form-control" >';
    asskephis += ' </div>';
    asskephis += ' <div class="col-md-1">';

    asskephis += ' </div>';
    asskephis += ' </div>';
    asskephis += ' <div class="form-group row"  style="display: none;">';
    asskephis += ' <div class="col-md-3">';
    asskephis += ' <label class="col-form-label">Dokter *</label>';
    asskephis += ' </div>';
    asskephis += ' <div class="col-md-7">';
    asskephis += ' <input class="form-control" >';
    asskephis += ' </div>';
    asskephis += ' <div class="col-md-1">';

    asskephis += ' </div>';
    asskephis += ' </div>';
    asskephis += ' <div class="form-group row">';
    asskephis += ' <div class="col-md-3">';
    asskephis += ' <label class="col-form-label">Cara Masuk</label>';
    asskephis += ' </div>';
    asskephis += ' <div class="col-md-7">';
    asskephis += ' <div class="input-group">';
    switch(b.cara_masuk){
    case '1':
      asskephis += '        <input class="form-control"value="Jalan Tanpa Bantuan">';
      break;
    case '2':
      asskephis += '        <input class="form-control"value="Jalan dengan Bantuan">';
      break;
    case '3':
      asskephis += '        <input class="form-control"value="Kursi Roda">';
      break;
    case '4':
      asskephis += '        <input class="form-control"value="Tempat Tidur Dorong">';
      break;
    case '5':
      asskephis += '        <input class="form-control"value="Lainnyaa">';
      break;

    }
    asskephis += ' </div>';
    asskephis += ' <div class="row"  style="display:none;">';
    asskephis += ' <input type="text" class="form-control" placeholder="Keterangan Lainnya *">';
    asskephis += ' </div>';
    asskephis += ' </div>';
    asskephis += ' </div>';
    asskephis += ' <div class="form-group row">';
    asskephis += ' <div class="col-md-3">';
    asskephis += ' <label class="col-form-label">Asal Masuk</label>';
    asskephis += ' </div>';
    asskephis += ' <div class="col-md-3">';
    switch(b.asal_masuk){
    case '1':
      asskephis += '        <input class="form-control " value="Non Rujukan" >';
      break;
    case '2':
      asskephis += '        <input class="form-control " value="Rujukan" >';
      break;

    }

    asskephis += ' </div>';
    asskephis += ' <div  style="display: none;">';
    asskephis += ' <input type="text" class="form-control" >';
    asskephis += ' </div>';
    asskephis += ' </div>';
    asskephis += ' <div class="form-group row">';
    asskephis += ' <div class="col-md-3">';
    asskephis += ' <label class="col-form-label">Death On Arrival</label>';
    asskephis += ' </div>';
    asskephis += ' <div class="col-md-3">';
    switch(b.doa){
    case '0':
     asskephis += '        <input class="form-control" value="Tidak" >';
     break;
   case '1':
     asskephis += '        <input class="form-control" value="Ya" >';
     break;

   }

   asskephis += ' </div>';
   asskephis += ' </div>';
   asskephis += ' </div>';
   asskephis += ' <div class="row">';
   asskephis += ' <div class="col-md-12 p2">';
   asskephis += ' <label class="form-label"><u>TANDA VITAL</u></label>';
   asskephis += ' </div>';
   asskephis += ' <div class="col-md-2 p2">';
   asskephis += ' <label class="form-label">Keadaan Umum</label>';
   asskephis += ' </div>';
   asskephis += ' <div class="col-md-4 p2">';
   asskephis += ' <input type="text" class="form-control"  value="'+a.keadaan_umum+'" readonly>';
   asskephis += ' </div>';
   asskephis += ' <div class="col-md-2 p2">';
   asskephis += ' <label class="form-label">Respirasi</label>';
   asskephis += ' </div>';
   asskephis += ' <div class="col-md-2 p2">';
   asskephis += ' <input type="text" class="form-control"  value="'+a.respirasi+'" readonly>';
   asskephis += ' </div>';
   asskephis += ' <div class="input-group-prepend"><span>x/Menit</span></div>';

   asskephis += '<div class="col-md-2 p2">';
   asskephis += '<label class="form-label">Nadi</label>';
   asskephis += '</div>';
   asskephis += '<div class="col-md-2 p2">';
   asskephis += '<input type="text" class="form-control"  value="'+a.nadi+'" readonly>';
   asskephis += '</div>';
   asskephis += '<div class="input-group-prepend col-md-2 p2"><span>x/Menit</span></div>';
   asskephis += '<div class="col-md-2 p2">';
   asskephis += '<label class="form-label">SpO2</label>';
   asskephis += '</div>';
   asskephis += '<div class="col-md-2 p2">';
   asskephis += '<input type="text" class="form-control" value="'+a.spo2+'" readonly>';
   asskephis += '</div>';
   asskephis += '<div class="input-group-prepend"><span>x/Menit</span></div>';

   asskephis += '<div class="col-md-2 p2">';
   asskephis += '<label class="form-label">Pupil</label>';
   asskephis += '</div>';
   asskephis += '<div class="col-md-3 p2">';
   asskephis += '<input type="text" class="form-control" value="kanan='+a.pupil_kanan+'||kiri='+a.pupil_kiri+'" readonly>';
   asskephis += '</div>';
   asskephis += '<div class="input-group-prepend col-md-1 p2"><span>mm</span></div>';


   asskephis += '<div class="col-md-2 p2">';
   asskephis += '<label class="form-label">Tekanan Darah</label>';
   asskephis += '</div>';
   asskephis += '<div class="col-md-2">';
   asskephis += '<input type="text" class="form-control" value="'+a.tekanan_darah1+'/'+a.tekanan_darah2+'" readonly>';
   asskephis += '</div>';
   asskephis += '<div class="input-group-prepend col-md-2"><span>mm/Hg</span></div>';

   asskephis += '<div class="col-md-2 p2">';
   asskephis += '<label class="form-label">Perpalpasi</label>';
   asskephis += '</div>';
   asskephis += '<div class="col-md-2">';
   asskephis += '<input type="text" class="form-control" value="'+a.palpasi+'" placeholder="" readonly>';
   asskephis += '</div>';
   asskephis += '<div class="input-group-prepend col-md-2"><span>perpalpasi</span></div>';

   asskephis += '<div class="col-md-2 p2">';
   asskephis += '<label class="form-label">Suhu</label>';
   asskephis += '</div>';
   asskephis += '<div class="col-md-2">';
   asskephis += '<input type="text" class="form-control" placeholder="" value="'+a.suhu+'" readonly>';
   asskephis += '</div>';
   asskephis += '<div class="input-group-prepend col-md-2"><span>C</span></div>';

   asskephis += '<div class="col-md-2 p2">';
   asskephis += '<label class="form-label">Imt</label>';
   asskephis += '</div>';
   asskephis += '<div class="col-md-2">';
   asskephis += '<input type="text" class="form-control"  placeholder="" value="'+a.imt+'" readonly>';
   asskephis += '</div>';
   asskephis += '<div class="input-group-prepend col-md-2"><span>kg/m2</span></div>';

   asskephis += '<div class="col-md-2 p2">';
   asskephis += '<label class="form-label">Reflek Cahaya</label>';
   asskephis += '</div>';
   asskephis += '<div class="col-md-4 p2">';
   asskephis += '<input type="text" class="form-control"  value="kanan:'+a.reflek_cahaya_kanan+'||kiri:'+a.reflek_cahaya_kiri+'" readonly>';
   asskephis += '</div>';

   asskephis += '<div class="col-md-2 p2">';
   asskephis += '<label class="form-label">Berat Badan</label>';
   asskephis += '</div>';
   asskephis += '<div class="col-md-2 p2">';
   asskephis += '<input type="text" class="form-control"value="'+a.bb+'" readonly>';
   asskephis += '</div>';
   asskephis += '<div class="input-group-prepend col-md-2 p2"><span>kg</span></div>';
   asskephis += '<div class="col-md-2 p2">';
   asskephis += '<label class="form-label">Tinggi Badan</label>';
   asskephis += '</div>';
   asskephis += '<div class="col-md-2 p2">';
   asskephis += '<input type="text" class="form-control"  value="'+a.tinggi_badan+'" readonly>';
   asskephis += '</div>';
   asskephis += '<div class="input-group-prepend col-md-2"><span>cm</span></div>';

   asskephis += '<div class="col-md-12 p4">';
   asskephis += '<hr>';
   asskephis += '</div>';

   asskephis += '<div class="col-md-12 p2">';
   asskephis += '<label class="form-label"><u>LEVEL TREAGE PASIEN </u></label>';
   asskephis += '<div class="col-md-2 p2">';
   asskephis += '<H3>'+b.triage_pasien+'</H3>';
   asskephis += '</div>';
   asskephis += '</div>';

   asskephis +=  '</div>';
   document.getElementById("idpanelhistorirmtreage"+idkunjunganhistori+"").innerHTML = asskephis;
 })
}
function assesmenperawathistoriermigd(idkunjunganhistori,idunit){
  var url = "<?php echo base_url(); ?>";

  var asskephis = '';
  var param = {
    id    : idkunjunganhistori,
    idunit:idunit
  };
  apiPOST('Rekammedisigd/datakunjunganrmkeperdetail', param, hasil => {
    var a = hasil['data'];
    for (var i = 0; i < a.length; i++) {
      asskephis += '<div class="row col-md-12">';

      asskephis += '<div class="row">';
      asskephis += '<div><u>ASSESMENT KEPERAWATAN</u></div>';
      asskephis += '</div>';
      asskephis += '<div class="row">';
      asskephis += '<div class="col-md-4 p2">'
      asskephis += '<label class="form-label">Keluhan Utama</label>';
      asskephis += '</div>';
      asskephis += '<div class="col-md-8 p2">';
      asskephis += '<textarea class="form-control " id="kepkeluhanutamaErmIrjaHis" readonly>'+a[i]['keluhan_utama']+'</textarea>';
      asskephis += '</div>';
      asskephis += '<div class="col-md-4 p2">';
      asskephis += '<label class="form-label">Riwayat Penyakit Sekarang *</label>&nbsp;&nbsp;&nbsp;<label>';
      asskephis += '</div>';

      asskephis += '<div class="col-md-8 p2">';
      asskephis += '<textarea class="form-control " id="kepRiwayatPenyakitNowErmIrjahis" readonly>'+a[i]['penyakit_sekarang']+'</textarea>';
      asskephis += '</div>'; 

      asskephis += '<div class="col-md-12 p4">';
      asskephis += '<hr>';
      asskephis += '</div>';

      asskephis += '<div class="col-md-12 p2">';
      asskephis += '<label class="form-label"><u>BIOPSIKOSOSIAL, KULTURAL, SPIRITUAL</u></label>';
      asskephis += '</div>';

      asskephis += '<div class="col-md-4 p2">';
      asskephis += '<label class="form-label">Status Mental</label>';
      asskephis += '</div>';
      asskephis += '<div class="col-md-8 p2">';
      if (a[i]['status_mental']='1') {
        asskephis += '<textarea class="form-control" id="kepstatusmentalErmIrjahis" readonly>Orientasi Baik</textarea>';
      } else if(a[i]['status_mental']='2') {
        asskephis += '<textarea class="form-control" id="kepstatusmentalErmIrjahis" readonly>Agitasi</textarea>';
      } else if(a[i]['status_mental']=='3'){
        asskephis += '<textarea class="form-control" id="kepstatusmentalErmIrjahis" readonly>Menyerang</textarea>';
      } else if(a[i]['status_mental']=='4'){
       asskephis += '<textarea class="form-control" id="kepstatusmentalErmIrjahis" readonly>Tidak Ada Respon</textarea>';
     } else {
       asskephis += '<textarea class="form-control" id="kepstatusmentalErmIrjahis" readonly>LAin</textarea>';
     }
     asskephis += '</div>';
     asskephis += '<div class="col-md-4 p2">';
     asskephis += '<label class="form-label">Status Psikolog</label>';
     asskephis += '</div>';
     asskephis += '<div class="col-md-8 p2">';
     switch(a[i]['status_psikologi']) {
     case '1':
       asskephis += '<textarea class="form-control" id="statuspsikoErmIrjahis" readonly>Kooperatif</textarea>';
       break;
     case '2':
       asskephis += '<textarea class="form-control" id="statuspsikoErmIrjahis" readonly>Disorientasi</textarea>';
       break;
     case '3':
       asskephis += '<textarea class="form-control" id="statuspsikoErmIrjahis" readonly>Tenang</textarea>';
       break;
     case '4':
       asskephis += '<textarea class="form-control" id="statuspsikoErmIrjahis" readonly>Hiperaktif</textarea>';
       break;
     case '5':
       asskephis += '<textarea class="form-control" id="statuspsikoErmIrjahis" readonly>Cemas</textarea>';
       break;
     case '6':
       asskephis += '<textarea class="form-control" id="statuspsikoErmIrjahis" readonly>Kecenderungan Bunuh Diri</textarea>';
       break;
     case '7':
       asskephis += '<textarea class="form-control" id="statuspsikoErmIrjahis" readonly>Gelisah</textarea>';
       break;
     case '8':
       asskephis += '<textarea class="form-control" id="statuspsikoErmIrjahis" readonly>Depresi</textarea>';
       break;
     case '9':
       asskephis += '<textarea class="form-control" id="statuspsikoErmIrjahis" readonly>Marah</textarea>';
       break;
     case '10':
       asskephis += '<textarea class="form-control" id="statuspsikoErmIrjahis" readonly> Lain-Lain</textarea>';
       break;
     default:
    // code block
     }


     asskephis += '</div>';
     asskephis += '<div class="col-md-4 p2">';
     asskephis += '<label class="form-label">Penggunaan restrain</label>';
     asskephis += '</div>';
     asskephis += '<div class="col-md-8 p2">';
     if (a[i]['pengguna_restrain']=='1') {
      asskephis += '<textarea class="form-control" id="restrainErmIrjahis" readonly>Tidak</textarea>';
    } else {
      asskephis += '<textarea class="form-control" id="restrainErmIrjahis" readonly>Ya</textarea>';
    }
    asskephis += '</div>';
    asskephis += '<div class="col-md-4 p2">';
    asskephis += '<label class="form-label">Budaya</label>';
    asskephis += '</div>';
    asskephis += '<div class="col-md-8 p2">';
    asskephis += '<textarea class="form-control" id="kepAgamaErmIrjahis" readonly>'+a[i]['budaya']+'</textarea>';
    asskephis += '</div>';

    asskephis += '<div class="col-md-12 p4">';
    asskephis += '<hr>';
    asskephis += '</div>';

    asskephis += '<div class="col-md-12 p2">';
    asskephis += '<label class="form-label"><u>TANDA VITAL</u></label>';
    asskephis += '</div>';
    asskephis += '<div class="col-md-2 p2">';
    asskephis += '<label class="form-label">Keadaan Umum</label>';
    asskephis += '</div>';
    asskephis += '<div class="col-md-4 p2">';
    asskephis += '<input type="text" class="form-control" id="kepkeadaanumumErmIrjahis" value="'+a[i]['keadaan_umum']+'" readonly>';
    asskephis += '</div>';
    asskephis += '<div class="col-md-2 p2">';
    asskephis += '<label class="form-label">Respirasi</label>';
    asskephis += '</div>';
    asskephis += '<div class="col-md-2 p2">';
    asskephis += '<input type="text" class="form-control" id="keprespirasirmIrjahis" value="'+a[i]['respirasi']+'" readonly>';
    asskephis += '</div>';
    asskephis += '<div class="input-group-prepend"><span>x/Menit</span></div>';

    asskephis += '<div class="col-md-2 p2">';
    asskephis += '<label class="form-label">Nadi</label>';
    asskephis += '</div>';
    asskephis += '<div class="col-md-2 p2">';
    asskephis += '<input type="text" class="form-control" id="kepnadirmIrjahis" value="'+a[i]['nadi']+'" readonly>';
    asskephis += '</div>';
    asskephis += '<div class="input-group-prepend col-md-2 p2"><span>x/Menit</span></div>';
    asskephis += '<div class="col-md-2 p2">';
    asskephis += '<label class="form-label">SpO2</label>';
    asskephis += '</div>';
    asskephis += '<div class="col-md-2 p2">';
    asskephis += '<input type="text" class="form-control" id="kepspo2mIrjahis" value="'+a[i]['spo2']+'" readonly>';
    asskephis += '</div>';
    asskephis += '<div class="input-group-prepend"><span>x/Menit</span></div>';

    asskephis += '<div class="col-md-2 p2">';
    asskephis += '<label class="form-label">Pupil</label>';
    asskephis += '</div>';
    asskephis += '<div class="col-md-3 p2">';
    asskephis += '<input type="text" class="form-control" id="keppupilkirirmIrjahis" value="kanan='+a[i]['pupil_kanan']+'||kiri='+a[i]['pupil_kiri']+'" readonly>';
    asskephis += '</div>';
    asskephis += '<div class="input-group-prepend col-md-1 p2"><span>mm</span></div>';


    asskephis += '<div class="col-md-2 p2">';
    asskephis += '<label class="form-label">Tekanan Darah</label>';
    asskephis += '</div>';
    asskephis += '<div class="col-md-2">';
    asskephis += '<input type="text" class="form-control" id="keptekanandarahrmIrjahis" value="'+a[i]['tekanan_darah1']+'/'+a[i]['tekanan_darah2']+'" readonly>';
    asskephis += '</div>';
    asskephis += '<div class="input-group-prepend col-md-2"><span>mm/Hg</span></div>';

    asskephis += '<div class="col-md-2 p2">';
    asskephis += '<label class="form-label">Perpalpasi</label>';
    asskephis += '</div>';
    asskephis += '<div class="col-md-2">';
    asskephis += '<input type="text" class="form-control" id="kepperpalpasirmIrjahis" value="'+a[i]['palpasi']+'" placeholder="" readonly>';
    asskephis += '</div>';
    asskephis += '<div class="input-group-prepend col-md-2"><span>perpalpasi</span></div>';

    asskephis += '<div class="col-md-2 p2">';
    asskephis += '<label class="form-label">Suhu</label>';
    asskephis += '</div>';
    asskephis += '<div class="col-md-2">';
    asskephis += '<input type="text" class="form-control" id="kepsuhurmIrjahis" placeholder="" value="'+a[i]['suhu']+'" readonly>';
    asskephis += '</div>';
    asskephis += '<div class="input-group-prepend col-md-2"><span>C</span></div>';

    asskephis += '<div class="col-md-2 p2">';
    asskephis += '<label class="form-label">Imt</label>';
    asskephis += '</div>';
    asskephis += '<div class="col-md-2">';
    asskephis += '<input type="text" class="form-control" id="kepimtrmIrjahis" placeholder="" value="'+a[i]['imt']+'" readonly>';
    asskephis += '</div>';
    asskephis += '<div class="input-group-prepend col-md-2"><span>kg/m2</span></div>';

    asskephis += '<div class="col-md-2 p2">';
    asskephis += '<label class="form-label">Reflek Cahaya</label>';
    asskephis += '</div>';
    asskephis += '<div class="col-md-4 p2">';
    asskephis += '<input type="text" class="form-control" id="kepreflekcahayakirirmIrjahis" value="kanan:'+a[i]['reflek_cahaya_kanan']+'||kiri:'+a[i]['reflek_cahaya_kiri']+'" readonly>';
    asskephis += '</div>';



    asskephis += '<div class="col-md-2 p2">';
    asskephis += '<label class="form-label">Berat Badan</label>';
    asskephis += '</div>';
    asskephis += '<div class="col-md-2 p2">';
    asskephis += '<input type="text" class="form-control" id="kepberatbadanrmIrjahis" value="'+a[i]['bb']+'" readonly>';
    asskephis += '</div>';
    asskephis += '<div class="input-group-prepend col-md-2 p2"><span>kg</span></div>';
    asskephis += '<div class="col-md-2 p2">';
    asskephis += '<label class="form-label">Tinggi Badan</label>';
    asskephis += '</div>';
    asskephis += '<div class="col-md-2 p2">';
    asskephis += '<input type="text" class="form-control" id="keptinggibadanrmIrjahis" value="'+a[i]['tinggi_badan']+'" readonly>';
    asskephis += '</div>';
    asskephis += '<div class="input-group-prepend col-md-2"><span>cm</span></div>';

    asskephis += '<div class="col-md-12 p4">';
    asskephis += '<hr>';
    asskephis += '</div>';

    asskephis += '<div class="col-md-12 p2">';
    asskephis += '<label class="form-label"><u>GLASGOW COMA SCALE ( GCS )</u></label>';
    asskephis += '</div>';

    asskephis += '<div class="info-box mb-0" >'; 
    asskephis += '<table class="table table-striped table-sm" cellspacing="0" cellpadding="0" border="0">';
    asskephis += '<thead>';
    asskephis += '<tr style="background-color: #6c757d;color:white">';
    asskephis += '<td>Kategori</td>';
    asskephis += '<td>Hasil</td>';
    asskephis += '<td>Skor</td>';
    asskephis += '</tr>';
    asskephis += '</thead>';
    asskephis += '<tbody>';
    asskephis +=  '<tr>';
    asskephis +=  '<td>Respon Buka Mata (Eye Opening : E)</td>';
    asskephis += '<td>Spontan</td>';
    asskephis +=  '<td>'+a[i]['respon_e']+'</td>';
    asskephis +=  '</tr>';
    asskephis +=  '<tr>';
    asskephis +=  '<td> Respon Motorik Terbaik (M) </td>';
    asskephis += '<td> Turut Perintah </td>';
    asskephis +=  '<td>'+a[i]['respon_m']+'</td>';
    asskephis +=  '</tr>';
    asskephis +=  '<tr>';
    asskephis +=  '<td>  Respon Verbal (V) </td>';
    asskephis += '<td>  Berorientasi Baik  </td>';
    asskephis +=  '<td>'+a[i]['respon_v']+'</td>';
    asskephis +=  '</tr>';
    asskephis +=  '</tbody>';
    asskephis +=  '</table>';
    asskephis +=  '</div>';

    asskephis += '<div class="col-md-12 p4">';
    asskephis += '<hr>';
    asskephis += '</div>';

    asskephis += '<div class="col-md-12 p4">';
    asskephis += '<label class="form-label"><u>PEMERIKSAAN FISIK UMUM</u></label>';
    asskephis += '</div>';

    asskephis += '<div class="col-md-2 p2">';
    asskephis += '<label class="form-label">Kepala</label>';
    asskephis += '</div>';
    asskephis += '<div class="col-md-4 p2">';
    if (a[i]['kepala']=='1') {
      asskephis += '<input type="text" class="form-control" id="kepalaErmIrjahis" value="Normal" readonly>';
    } else {
      asskephis += '<input type="text" class="form-control" id="kepalaErmIrjahis" value="'+a[i]['kepala']+'" readonly>';
    }

    asskephis += '</div>';
    asskephis += '<div class="col-md-2 p2">';
    asskephis += '<label class="form-label">Mata</label>';
    asskephis += '</div>';
    asskephis += '<div class="col-md-4 p2">';
    if (a[i]['mata']=='1') {
      asskephis += '<input type="text" class="form-control" id="matarmIrjahis" value="Normal" readonly>';
    } else {
      asskephis += '<input type="text" class="form-control" id="matarmIrjahis" value="'+a[i]['mata']+'" readonly>';
    }

    asskephis += '</div>';


    asskephis += '<div class="col-md-2 p2">';
    asskephis += '<label class="form-label">Tht</label>';
    asskephis += '</div>';
    asskephis += '<div class="col-md-4 p2">';
    if (a[i]['tht']=='1') {
     asskephis += '<input type="text" class="form-control" id="thtErmIrjahis" value="Normal" readonly>';
   } else {
    asskephis += '<input type="text" class="form-control" id="thtErmIrjahis" value="'+a[i]['tht']+'" readonly>';
  }

  asskephis += '</div>';
  asskephis += '<div class="col-md-2 p2">';
  asskephis += '<label class="form-label">Leher</label>';
  asskephis += '</div>';
  asskephis += '<div class="col-md-4 p2">';
  if (a[i]['leher']=='1') {
   asskephis += '<input type="text" class="form-control" id="leherrmIrjahis" value="Normal" readonly>';
 } else {
   asskephis += '<input type="text" class="form-control" id="leherrmIrjahis" value="'+a[i]['leher']+'" readonly>';
 }

 asskephis += '</div>';


 asskephis += '<div class="col-md-2 p2">';
 asskephis += '<label class="form-label">Mulut</label>';
 asskephis += '</div>';
 asskephis += '<div class="col-md-4 p2">';
 if (a[i]['mulut']=='1') {
  asskephis += '<input type="text" class="form-control" id="mulutrmIrjahis" value="Normal" readonly>';
} else {
  asskephis += '<input type="text" class="form-control" id="mulutrmIrjahis" value="'+a[i]['mulut_ket']+'" readonly>';
}
asskephis += '</div>';
asskephis += '<div class="col-md-2 p2">';
asskephis += '<label class="form-label">Thorax</label>';
asskephis += '</div>';
asskephis += '<div class="col-md-4 p2">';
if (a[i]['thoraks']=='1') {
  asskephis += '<input type="text" class="form-control" id="thoraxrmIrjahis" value="Normal" readonly>';
} else {
  asskephis += '<input type="text" class="form-control" id="thoraxrmIrjahis" value="'+a[i]['thoraks_ket']+'" readonly>';
}
asskephis += '</div>';

asskephis += '<div class="col-md-2 p2">';
asskephis += '<label class="form-label">Jantung</label>';
asskephis += '</div>';
asskephis += '<div class="col-md-4 p2">';
if (a[i]['jantung']=='1') {
  asskephis += '<input type="text" class="form-control" id="jantungrmIrjahis" value="Normal" readonly>';
} else {
  asskephis += '<input type="text" class="form-control" id="jantungrmIrjahis" value="'+a[i]['jantung_ket']+'" readonly>';
}
asskephis += '</div>';
asskephis += '<div class="col-md-2 p2">';
asskephis += '<label class="form-label">Paru</label>';
asskephis += '</div>';
asskephis += '<div class="col-md-4 p2">';
if (a[i]['paru']=='1') {
  asskephis += '<input type="text" class="form-control" id="parurmrjahis" value="Normal" readonly>';
} else {
  asskephis += '<input type="text" class="form-control" id="parurmrjahis" value="'+a[i]['paru_ket']+'" readonly>';
}
asskephis += '</div>';

asskephis += '<div class="col-md-2 p2">';
asskephis += '<label class="form-label">Ambomen</label>';
asskephis += '</div>';
asskephis += '<div class="col-md-4 p2">';
if (a[i]['abdomen']=='1') {
  asskephis += '<input type="text" class="form-control" id="ambomenErmIrjahis" value="Normal" readonly>';
} else {
  asskephis += '<input type="text" class="form-control" id="ambomenErmIrjahis" value="'+a[i]['abdomen_ket']+'" readonly>';
}
asskephis += '</div>';
asskephis += '<div class="col-md-2 p2">';
asskephis += '<label class="form-label">Genitalia</label>';
asskephis += '</div>';
asskephis += '<div class="col-md-4 p2">';
if (a[i]['genitalia']=='1') {
 asskephis += '<input type="text" class="form-control" id="genitaliarmIrjahis" value="Normal" readonly>';
} else {
 asskephis += '<input type="text" class="form-control" id="genitaliarmIrjahis" value="'+a[i]['genitalia']+'" readonly>';
}

asskephis += '</div>';
asskephis += '<div class="col-md-2 p2">';
asskephis += '<label class="form-label"> Status Localis </label>';
asskephis += '</div>';
asskephis += '<div class="col-md-4 p2">';
asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="'+a[i]['status_lokalis']+'" >';
asskephis += '</div>';

asskephis += '<div class="col-md-12 p4">';
asskephis += '<hr>';
asskephis += '<label class="form-label"><u>RIWAYAT MENSTRUASI</u></label>';
asskephis += '</div>';
asskephis += '<div class="col-md-2 p2">';
asskephis += '<label class="form-label"> Riwayat Menstruasi </label>';
asskephis += '</div>';
asskephis += '<div class="col-md-4 p2">';
//Belum/Tidak Menstruasi
if (a[i]['rwytmenstruasi']=='1') {
  asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="Belum/Tidak Menstruasi" >';
} else {
  asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="Sudah Menstruasi" >';
}
asskephis += '</div>';
asskephis += '<div class="col-md-2 p2">';
asskephis += '<label class="form-label"> Umur Menarche </label>';
asskephis += '</div>';
asskephis += '<div class="col-md-4 p2">';
asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="'+a[i]['umurenarche']+'" >';
asskephis += '</div>';
asskephis += '<div class="col-md-2 p2">';
asskephis += '<label class="form-label"> Lamanya Haid </label>';
asskephis += '</div>';
asskephis += '<div class="col-md-4 p2">';
asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="'+a[i]['hlamahaid']+'" >';
asskephis += '</div>';
asskephis += '<div class="col-md-2 p2">';
asskephis += '<label class="form-label"> Kawin Ke 1 Usia </label>';
asskephis += '</div>';
asskephis += '<div class="col-md-4 p2">';
asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="'+a[i]['hkawin']+'" >';
asskephis += '</div>';
asskephis += '<div class="col-md-2 p2">';
asskephis += '<label class="form-label"> Jumlah Darah Haid </label>';
asskephis += '</div>';
asskephis += '<div class="col-md-4 p2">';
asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="'+a[i]['jmldarahhaid']+'" >';
asskephis += '</div>';
asskephis += '<div class="col-md-2 p2">';
asskephis += '<label class="form-label"> Dismenore </label>';
asskephis += '</div>';
asskephis += '<div class="col-md-4 p2">';
asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="'+a[i]['hdesminore']+'" >';
asskephis += '</div>';
asskephis += '<div class="col-md-2 p2">';
asskephis += '<label class="form-label"> Usia Suami 1 </label>';
asskephis += '</div>';
asskephis += '<div class="col-md-4 p2">';
asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="'+a[i]['husiasuami1']+'" >';
asskephis += '</div>';
asskephis += '<div class="col-md-2 p2">';
asskephis += '<label class="form-label"> Siklus Haid </label>';
asskephis += '</div>';
asskephis += '<div class="col-md-4 p2">';
asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="'+a[i]['hsiklushaid']+'" >';
asskephis += '</div>';
asskephis += '<div class="col-md-2 p2">';
asskephis += '<label class="form-label"> Riwayat Perkawinan </label>';
asskephis += '</div>';
asskephis += '<div class="col-md-4 p2">';
asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="'+a[i]['hkawin']+'" >';
asskephis += '</div>';
asskephis += '<div class="col-md-2 p2">';
asskephis += '<label class="form-label"> Kawin Ke 2 Usia </label>';
asskephis += '</div>';
asskephis += '<div class="col-md-4 p2">';
asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="'+a[i]['hkawin2usia']+'" >';
asskephis += '</div>';
asskephis += '<div class="col-md-2 p2">';
asskephis += '<label class="form-label"> Riwayat Obstetrik </label>';
asskephis += '</div>';
asskephis += '<div class="col-md-4 p2">';
asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="'+a[i]['hobstetrika']+'" >';
asskephis += '</div>';
asskephis += '<div class="col-md-2 p2">';
asskephis += '<label class="form-label"> HPHT </label>';
asskephis += '</div>';
asskephis += '<div class="col-md-4 p2">';
asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="'+a[i]['htglhpht']+'" >';
asskephis += '</div>';
asskephis += '<div class="col-md-2 p2">';
asskephis += '<label class="form-label"> Taksiran Persalinan </label>';
asskephis += '</div>';
asskephis += '<div class="col-md-4 p2">';
asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="'+a[i]['htglsalin']+'" >';
asskephis += '</div>';
asskephis += '<div class="col-md-12 p4">';
asskephis += '<hr>';
asskephis += '<label class="form-label"><u>RIWAYAT HAMIL INI</u></label>';
asskephis += '</div>'

asskephis += '<div class="col-md-2 p2">';
asskephis += '<label class="form-label"> Riwayat Obstetrik </label>';
asskephis += '</div>';
asskephis += '<div class="col-md-4 p2">';
asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="'+a[i]['status_lokalis']+'" >';
asskephis += '</div>';
asskephis += '<div class="col-md-2 p2">';
asskephis += '<label class="form-label">  TM I </label>';
asskephis += '</div>';
asskephis += '<div class="col-md-4 p2">';
switch (a[i]['hhamiltm1list']){
case '1':
  asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="Mual" >';
  break;
case '2':
  asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="Muntah" >';
  break;
case '3':
  asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="Pendarahan" >';
  break;
case '4':
  asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="Lain-lain" >';
  break;
case '5':
  asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="Tidak Ada Keluhan" >';
  break;
default:
  asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="" >';
}

asskephis += '</div>';
asskephis += '<div class="col-md-2 p2">';
asskephis += '<label class="form-label"> TM II - III </label>';
asskephis += '</div>';
asskephis += '<div class="col-md-4 p2">';
switch(a[i]['hhamiltm2list']){
case '1':
  asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="Pusing" >';
  break;
case '2':
  asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="Sakit Kepala" >';
  break;
case '3':
  asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="Pendarahan" >';
  break;
case '4':
  asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="Lain-lain" >';
  break;
case '5':
  asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="Tidak ada keluhan" >';
  break;
default:
  asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="" >';
}

asskephis += '</div>';
asskephis += '<div class="col-md-2 p2">';
asskephis += '<label class="form-label"> RIWAYAT GINEKOLOGI </label>';
asskephis += '</div>';
asskephis += '<div class="col-md-4 p2">';
switch(a[i]['riwayatkbkomplikasilist']){
case '1':
  asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="Infertilitas" >';
  break;
case '2':
  asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="Polip servix" >';
  break;
case '3':
  asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="Tidak ada" >';
  break;
case '4':
  asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="Cervisitis kronis" >';
  break;
case '5':
  asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="Kanker Kandungan" >';
  break;
case '6':
  asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="PMS" >';
  break;
case '7':
  asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="Operasi Kandungan" >';
  break;
case '8':
  asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="Endometriosis" >';
  break;
case '9':
  asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="Myoma" >';
  break;
case '10':
  asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="Kista" >';
  break;
case '11':
  asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="Lain-lain" >';
  break;
default:
  asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="" >';

}

asskephis += '</div>';



asskephis += '<div class="col-md-12 p4">';
asskephis += '<hr>';
asskephis += '<label class="form-label"><u>SKRINING GIZI</u></label>';
asskephis += '</div>';

asskephis +='<div class="col-md-6">';
asskephis +='<label class="form-label"> &gt; Apakah ada penurunan berat badan tidak direncanakan dalam 6 bulan terakhir;</label>';
if (a[i]['skrining_gizi']=="1") {
  asskephis +='<input type="text" class="form-control form-control-xs" name="kepermrwjkeperawatansaranhis" id="kepermrwjkeperawatansaranhis" value="Tidak" readonly>';
} else {
  asskephis +='<input type="text" class="form-control form-control-xs" name="kepermrwjkeperawatansaranhis" id="kepermrwjkeperawatansaranhis" value="Iya" readonly>';
}
asskephis +='<div>';
asskephis +='</div>';
asskephis +='<label class="form-label"> &gt; Apakah asupan makan berkurang karena penurunan nafsu makan/ kesulitan menerima makanan</label>';
asskephis +='<input type="text" class="form-control form-control-xs" name="kepnafsumakanhis" id="kepnafsumakanhis" value="'+a[i]['asupan_makan']+'" readonly>';
asskephis +='</div>';
asskephis +='<div class="col-md-6">'
asskephis +='<label class="form-label">Total Skor</label>';
asskephis +='<input type="text" name="kepermrwjkeperawatantotalskorhis" id="kepermrwjkeperawatantotalskorhis" class="form-control form-control-xs" value="'+a[i]['skor_gizi']+'" readonly>';
asskephis +='<label>Saran/Tindakan</label>';
asskephis +='<input type="text" class="form-control form-control-xs" name="kepermrwjkeperawatansaranhis" id="kepermrwjkeperawatansaranhis" value="'+a[i]['saran_tindakan_gizi']+'" readonly>';
asskephis +='<label class="form-label">Catatan : Skor 0 risiko rendah, Skor 1 risiko sedang, Skor = 2 risiko tinggi konsultasikan ahli gizi atau Bila terdapat kondisi seperti DM, luka bakar, CKD, hiperlipidemia atau kondisi khusus lainnya berdasarkan pertimbangan dokter, maka konsultasikan ke ahli gizi</label>';
asskephis +='</div>';

asskephis += '<div class="col-md-12 p4">';
asskephis += '<hr>';
asskephis += '<label class="form-label"><u>STATUS FUNGSIONAL</u></label>';
asskephis += '</div>';  
asskephis += '<div class="col-md-12 p2">';
switch (a[i]['status_fungsional']){
case '1':
  asskephis += '<textarea class="form-control " id="kepstatusfungsionalrmhis" readonly="">Mandiri</textarea>';
  break;
case '2':
  asskephis += '<textarea class="form-control " id="kepstatusfungsionalrmhis" readonly="">Perlu bantuan</textarea>';
  break;
case '3':
  asskephis += '<textarea class="form-control " id="kepstatusfungsionalrmhis" readonly="">Ketergantungan total</textarea>';
  break;
default:
}
asskephis += '</div>';
asskephis += '<div class="col-md-12 p4">';
asskephis += '<hr>';
asskephis += '<label class="form-label"><u>SKRINING RISIKO CEDERA/ JATUH (Usia <13 - >60 Tahun) menggunakan Up and Go Test (Pasien ini berumur 69 Tahun) *</u></label>';
asskephis += '</div>';

if (a[i]['cara_berjalan']=='1') {
  asskephis += '<div class="col-md-12 p2"><textarea class="form-control " id="kepresikojatuhrmhis"  readonly="">Pasien tidak sempoyongan/ limbung</textarea></div>';
} else {
  asskephis += '<div class="col-md-12 p2"><textarea class="form-control " id="kepresikojatuhrmhis"  readonly="">Pasien sempoyongan/ limbung</textarea></div>';
}

if (a[i]['cara_pegang']=='1') {
  asskephis += '<div class="col-md-12 p2"><textarea class="form-control " id="kepresikojatuhrmhis"  readonly="">Pasien tidak perlu penopang saat akan duduk</textarea></div>';
} else {
  asskephis += '<div class="col-md-12 p2"><textarea class="form-control " id="kepresikojatuhrmhis"  readonly="">Pasien penopang saat akan duduk</textarea></div>';
}

if (a[i]['resiko_jatuh']=='1') {
  asskephis += '<div class="col-md-12 p2"><textarea class="form-control " id="kepresikojatuhrmhis"  readonly="">Tidak Berisiko Jatuh</textarea></div>';
} else if(a[i]['resiko_jatuh']=='2'){
  asskephis += '<div class="col-md-12 p2"><textarea class="form-control " id="kepresikojatuhrmhis"  readonly="">Risiko Jatuh Rendah</textarea></div>';
}else{
  asskephis += '<div class="col-md-12 p2"><textarea class="form-control " id="kepresikojatuhrmhis"  readonly="">Risiko Jatuh Tinggi</textarea></div>';
}
asskephis += '<div class="col-md-12 p4">';
asskephis += '<hr>';
asskephis += '<label class="form-label"><u>Saran tindakan</u></label>';
asskephis += '</div>';
asskephis += '<div class="col-md-12 p2"><textarea class="form-control " id="kepketresikojatuhrmhis" readonly="">'+a[i]['ket_resiko_jatuh']+'</textarea></div>';


asskephis += '<div class="col-md-12 p4">';
asskephis += '<hr>';
asskephis += '<label class="form-label"><u>ASPEK PENGKAJIAN NYERI</u></label>';
asskephis += '</div>';  


asskephis += '<div class="col-md-2" style="text-align: center;">';
asskephis += '<div>';
asskephis += '<img src="'+url+'/_assets/nyeri0.png" style="width: 50px;height: 50px;">';
asskephis += '</div>';
asskephis += '<div>';
asskephis += '<label class="form-label">Tidak Nyeri</label>';
asskephis += '</div>';
asskephis += '</div>';
asskephis += '<div class="col-md-2" style="text-align: center;">';
asskephis += '<div>';  
asskephis += '<img src="'+url+'/_assets/nyeri2.png" style="width: 50px;height: 50px;">';
asskephis += '</div>';
asskephis += '<div>';
asskephis += '<label class="form-label">Sedikit Nyeri</label>';
asskephis += '</div>';
asskephis += '</div>';
asskephis += '<div class="col-md-2" style="text-align: center;">';
asskephis += '<div>';  
asskephis += '<img src="'+url+'/_assets/nyeri4.png" style="width: 50px;height: 50px;">';
asskephis += '</div>';
asskephis += '<div>';
asskephis += '<label class="form-label">Sedikit Nyeri</label>';
asskephis += '</div>';
asskephis += '</div>';
asskephis += '<div class="col-md-2" style="text-align: center;">';
asskephis += '<div>';  
asskephis += '<img src="'+url+'/_assets/nyeri6.png" style="width: 50px;height: 50px;">';
asskephis += '</div>';
asskephis += '<div>';
asskephis += '<label class="form-label">Sedikit Nyeri</label>';
asskephis += '</div>';
asskephis += '</div>';
asskephis += '<div class="col-md-2" style="text-align: center;">';
asskephis += '<div>'; 
asskephis += '<img src="'+url+'/_assets/nyeri8.png" style="width: 50px;height: 50px;">';
asskephis += '</div>';
asskephis += '<div>';
asskephis += '<label class="form-label">Sedikit Nyeri</label>';
asskephis += '</div>';
asskephis += '</div>';
asskephis += '<div class="col-md-2" style="text-align: center;">';
asskephis += '<div>';  
asskephis += '<img src="'+url+'/_assets/nyeri10.png" style="width: 50px;height: 50px;">';
asskephis += '</div>';
asskephis += '<div>';
asskephis += '<label class="form-label">Sedikit Nyeri</label>';
asskephis += '</div>';
asskephis += '</div>';
if (a[i]['skorface']=='0') {

  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="0" checked="true"><label>0</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="1" ><label>1</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="2" ><label>2</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="3" ><label>3</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="4" ><label>4</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="5" ><label>5</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="6" ><label>6</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="7" ><label>7</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="8" ><label>8</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="9" ><label>9</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="10" ><label>10</label></div>';

}
if (a[i]['skorface']=='1') {

  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="0" ><label>0</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" checked="true" name="ermrwjkeperawatanskorfacehis" value="1"><label>1</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="2" ><label>2</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="3" ><label>3</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="4" ><label>4</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="5" ><label>5</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="6" ><label>6</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="7" ><label>7</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="8" ><label>8</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="9" ><label>9</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="10" ><label>10</label></div>';
}
if (a[i]['skorface']=='2') {

  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="0" ><label>0</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="1" ><label>1</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" checked="true" name="ermrwjkeperawatanskorfacehis" value="2"><label>2</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="3" ><label>3</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="4" ><label>4</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="5" ><label>5</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="6" ><label>6</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="7" ><label>7</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="8" ><label>8</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="9" ><label>9</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="10" ><label>10</label></div>';

}
if (a[i]['skorface']=='3') {

  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="0" ><label>0</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="1" ><label>1</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="2" ><label>2</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" checked="true" name="ermrwjkeperawatanskorfacehis" value="3"><label>3</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="4" ><label>4</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="5" ><label>5</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="6" ><label>6</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="7" ><label>7</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="8" ><label>8</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="9" ><label>9</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="10" ><label>10</label></div>';
}
if (a[i]['skorface']=='4') {

  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="0" ><label>0</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="1" ><label>1</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="2" ><label>2</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="3" ><label>3</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" checked="true" name="ermrwjkeperawatanskorfacehis" value="4"><label>4</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="5" ><label>5</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="6" ><label>6</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="7" ><label>7</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="8" ><label>8</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="9" ><label>9</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="10" ><label>10</label></div>';
}
if (a[i]['skorface']=='5') {

  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="0" ><label>0</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="1" ><label>1</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="2" ><label>2</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="3" ><label>3</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="4" ><label>4</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" checked="true" name="ermrwjkeperawatanskorfacehis" value="5"><label>5</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="6" ><label>6</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="7" ><label>7</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="8" ><label>8</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="9" ><label>9</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="10" ><label>10</label></div>';
}
if (a[i]['skorface']=='6') {

  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="0" ><label>0</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="1" ><label>1</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="2" ><label>2</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="3" ><label>3</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="4" ><label>4</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="5" ><label>5</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" checked="true" name="ermrwjkeperawatanskorfacehis" value="6"><label>6</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="7" ><label>7</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="8" ><label>8</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="9" ><label>9</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="10" ><label>10</label></div>';
}
if (a[i]['skorface']=='7') {

  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="0" ><label>0</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="1" ><label>1</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="2" ><label>2</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="3" ><label>3</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="4" ><label>4</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="5" ><label>5</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="6" ><label>6</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" checked="true" name="ermrwjkeperawatanskorfacehis" value="7"><label>7</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="8" ><label>8</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="9" ><label>9</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="10" ><label>10</label></div>';
}
if (a[i]['skorface']=='8') {

  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="0" ><label>0</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="1" ><label>1</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="2" ><label>2</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="3" ><label>3</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="4" ><label>4</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="5" ><label>5</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="6" ><label>6</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="7" ><label>7</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" checked="true" name="ermrwjkeperawatanskorfacehis" value="8"><label>8</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="9" ><label>9</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="10" ><label>10</label></div>';
}
if (a[i]['skorface']=='9') {

  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="0" ><label>0</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="1" ><label>1</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="2" ><label>2</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="3" ><label>3</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="4" ><label>4</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="5" ><label>5</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="6" ><label>6</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="7" ><label>7</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="8" ><label>8</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" checked="true" name="ermrwjkeperawatanskorfacehis" value="9"><label>9</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="10" ><label>10</label></div>';
}
if (a[i]['skorface']=='10') {

  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="0" ><label>0</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="1" ><label>1</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="2" ><label>2</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="3" ><label>3</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="4" ><label>4</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="5" ><label>5</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="6" ><label>6</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="7" ><label>7</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="8" ><label>8</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="9" ><label>9</label></div>';
  asskephis += '<div class="col-md-1"><input type="radio" checked="true" name="ermrwjkeperawatanskorfacehis" value="10"><label>10</label></div>';
}
asskephis += '<div class="col-md-1"></div>';

asskephis += '<div class="col-md-12 p4">';
asskephis += '<hr>';
asskephis += '<label class="form-label"><u>DAFTAR DIAGNOSA KEPERAWATAN & INTERVENSI KEPERAWATAN *</u></label>';
asskephis += '</div>';

asskephis +='<div class="col-md-12">';
asskephis +='<h5>Intervensi Keperawatan</h5>';                      
asskephis +='<textarea class="form-control" id="intervensiErmKeperawatanIrjahis" readonly>'+a[i]['intervensi_kep']+'</textarea>';
asskephis +='</div>'; 
asskephis +='<div class="col-md-12">';   
asskephis +='<h5>Diagnosa Keperawatan</h5>';                  
asskephis +='<textarea class="form-control" id="DiagnosaErmKeperawatanIrjahis" readonly>'+a[i]['diagnosa_kep']+'</textarea>';
asskephis +='</div>';
asskephis +='<div><button class="btn btn-primary p2" onclick="updateasskepigd(`'+a[i]['id_kunjungan']+'`,`'+a[i]['id_unit']+'`)">Update</button></div>';
asskephis += '</div>';
asskephis += '</div>';
}  
document.getElementById("idpanelhistorirmperawat"+idkunjunganhistori+"").innerHTML = asskephis;
})}
function eresepermigd(id_kunj,tgl_kunj,tglorder) {
  var param={id_kunj:id_kunj,
  tgl_kunj:tgl_kunj,
  tglorder:tglorder,};
  apiPOST('Apotek/getData_historiOrderEresep',param,hasil=>{
    var barisrmhis='';
    var a = hasil['data'];
    for (var i = 0; i < a.length; i++) {
      barisrmhis += '<tr>';
      barisrmhis += '<td>'+a[i].nama_obat+'</td>';
      barisrmhis += '<td style="width: 5px;">'+a[i].jumlah+'</td>';
      barisrmhis += '<td>'+a[i].kd_satuan+'</td>';
      barisrmhis += '</tr>';

    }
    document.getElementById('eresephistori'+id_kunj).innerHTML=barisrmhis;
  })
}
function RadCTScanigd() {
  var a='';
  var param = {kode : 'CT',};
  apiPOST('Lab/produkRad', param, hasil =>{
    var b=hasil['produk'];
    for (var i = 0; i < b.length; i++) {
      a+='<div class="col-md-6">';
      a+='<div class="form-group">';
      a+='<div class="custom-control custom-checkbox ">';
      a+='<input name="lacrequestrademrdiag_test" value="'+b[i].id_produk+'" type="checkbox"  id="lacrequestlabemrdiag_test_'+b[i].id_produk+'" >';
      a+='<label class="form-label" for="lacrequestlabemrdiag_test_'+b[i].id_produk+'" id="lacrequestlabemrdiag_labeltest_'+b[i].id_produk+'">'+b[i].nama_produk+'</label>';
      a+='</div>';
      a+='</div>';
      a+='</div>';
    }
    document.getElementById('paccheckboxlogireqemrdiag_grouptest_11').innerHTML=a;

  });
}
function RadXRigd() {
  var a='';
  var param = {kode : 'XR',};
  apiPOST('Lab/produkRad', param, hasil =>{
    var b=hasil['produk'];
    for (var i = 0; i < b.length; i++) {
      a+='<div class="col-md-6">';
      a+='<div class="form-group">';
      a+='<div class="custom-control custom-checkbox ">';
      a+='<input name="lacrequestrademrdiag_test" value="'+b[i].id_produk+'" type="checkbox"  id="lacrequestlabemrdiag_test_'+b[i].id_produk+'" >';
      a+='<label class="form-label" for="lacrequestlabemrdiag_test_'+b[i].id_produk+'" id="lacrequestlabemrdiag_labeltest_'+b[i].id_produk+'">'+b[i].nama_produk+'</label>';
      a+='</div>';
      a+='</div>';
      a+='</div>';
    }
    document.getElementById('paccheckboxlogireqemrdiag_grouptest_1').innerHTML=a;

  });
}
function RadULigd() {
  var a='';
  var param = {kode : 'UR',};
  apiPOST('Lab/produkRad', param, hasil =>{
    var b=hasil['produk'];
    for (var i = 0; i < b.length; i++) {
      a+='<div class="col-md-6">';
      a+='<div class="form-group">';
      a+='<div class="custom-control custom-checkbox ">';
      a+='<input name="lacrequestrademrdiag_test" value="'+b[i].id_produk+'" type="checkbox"  id="lacrequestlabemrdiag_test_'+b[i].id_produk+'" >';
      a+='<label class="form-label" for="lacrequestlabemrdiag_test_'+b[i].id_produk+'" id="lacrequestlabemrdiag_labeltest_'+b[i].id_produk+'">'+b[i].nama_produk+'</label>';
      a+='</div>';
      a+='</div>';
      a+='</div>';
    }
    document.getElementById('paccheckboxlogireqemrdiag_grouptest_2').innerHTML=a;

  });
}
function detailsoapiermigd(idkunjungan){
  var paramsoapi = {
    idkunjungan: idkunjungan
  };
  var barisrmhisd = ''; 
  apiPOST('Rekammedisirja/datakunjunganhistorirmsoapi', paramsoapi, hasil => {
    var x = hasil['data'];
    if (hasil['code']=="200") {            
      for (var u = 0; u < x.length; u++) {
        spo2=x[u]['spo2'];
        saturasi=x[u]['saturasi'];
        nadi=x[u]['nadi'];
        tdarah=x[u]['tekanan_darah'];
        suhu=x[u]['suhu'];
        i   =x[u]['instruksi'];
        s   =x[u]['subjek'];
        o   =x[u]['objek'];
        a   =x[u]['assesmen'];
        p   =x[u]['planning'];
        barisrmhisd += '<div class="card" ><h4>CPPT</h4>';
        barisrmhisd += '<h4>'+x[u].nama_pegawai+'</h4>';
        barisrmhisd += '<table class="table table-striped table-sm" cellspacing="0" cellpadding="0" border="0">';
        barisrmhisd += '<tr>'
        barisrmhisd += '<td style="width: 5px;">S</td>';
        barisrmhisd += '<td style="width: 5px;">:</td>';
        barisrmhisd += '<td style="width:auto;">' + x[u]['subjek']+ '</td>';
        barisrmhisd += '</tr>';
        barisrmhisd += '<tr>';
        barisrmhisd += '<td>O</td>';
        barisrmhisd += '<td>:</td>';
        barisrmhisd += '<td>' + x[u]['objek']+ '</td>';
        barisrmhisd += '</tr>';
        barisrmhisd += '<tr>';
        barisrmhisd += '<td>A</td>';
        barisrmhisd += '<td>:</td>';
        barisrmhisd += '<td>' + x[u]['assesmen']+ '</td>';
        barisrmhisd += '</tr>';
        barisrmhisd += '<tr>';
        barisrmhisd += '<td>P</td>';
        barisrmhisd += '<td>:</td>';
        barisrmhisd += '<td>' + x[u]['planning']+ '</td>';
        barisrmhisd += '</tr>';
        barisrmhisd += '<tr>';
        barisrmhisd += '<td>I</td>';
        barisrmhisd += '<td>:</td>';
        barisrmhisd += '<td>' + x[u]['instruksi']+ '</td>';
        barisrmhisd += '</tr>';
        barisrmhisd += '<tr>';
        barisrmhisd += '<td>Suhu</td>';
        barisrmhisd += '<td>:</td>';
        barisrmhisd += '<td>' + x[u]['suhu']+ '</td>';
        barisrmhisd += '</tr>';
        barisrmhisd += '<tr>';
        barisrmhisd += '<td >Tekanan Darah</td>';
        barisrmhisd += '<td>:</td>';
        barisrmhisd += '<td>' + x[u]['tekanan_darah']+ '</td>';
        barisrmhisd += '</tr>';
        barisrmhisd += '<tr>';
        barisrmhisd += '<td>Nadi</td>';
        barisrmhisd += '<td>:</td>';
        barisrmhisd += '<td>' + x[u]['nadi']+ '</td>';
        barisrmhisd += '</tr>';
        barisrmhisd += '<tr>';
        barisrmhisd += '<td>Saturasi</td>';
        barisrmhisd += '<td>:</td>';
        barisrmhisd += '<td>' + x[u]['saturasi']+ '</td>';
        barisrmhisd += '</tr>';
        barisrmhisd += '<tr>';
        barisrmhisd += '<td>SpO2</td>';
        barisrmhisd += '<td>:</td>';
        barisrmhisd += '<td>' + x[u]['spo2']+ '</td>';
        barisrmhisd += '</tr>';
        barisrmhisd += '</table><br>';
        barisrmhisd += '<button class="btn btn-primary" onclick="copysoapiermigd(`'+spo2+'`,`'+saturasi+'`,`'+nadi+'`,`'+tdarah+'`,`'+suhu+'`,`'+s+'`,`'+o+'`,`'+a+'`,`'+p+'`,`'+i+'`)">Copy CPPT</button></div>';
        idkunjungan = x[u]['id_kunjungan'];
      }
      document.getElementById('detailsoapiigd'+idkunjungan+'').innerHTML = barisrmhisd;
    }
  })
}

function copysoapiermigd(spo2,saturasi,nadi,darah,suhu,s,o,a,p,i) {
  document.getElementById('linksoapkeperawatanIgd').click();
  document.getElementById('subjekkeperawatanIgd').value   =s;
  document.getElementById('assesmenTriageIgd').value =a;
  document.getElementById('objekkeperawatanIgd').value    =o;
  document.getElementById('cpptSpo2keperawatanermIgd').value=spo2;
  document.getElementById('cpptsaturasikeperawatanermIgd').value=saturasi;
  document.getElementById('cpptnadikeperawatanermIgd').value=nadi;
  document.getElementById('cpptsuhukeperawatanermIgd').value=suhu;
  document.getElementById('cppttekanandarahkeperawatanermIgd').value=darah;
  document.getElementById('soapintervensiTriageIgd').value =p;
  //document.getElementById('instruksiermirja').value =i;

}

function createsoapikeperawatan() {
 document.getElementById('linkassesmenkeperawatanIgd').style.display='none';
 document.getElementById('linksoapkeperawatanIgd').click();
 document.getElementById('subjekkeperawatanIgd').value=document.getElementById("KeluhanAssesmenKeperawatanIgd").value;
 document.getElementById('assesmenTriageIgd').value=document.getElementById("RiwayatPenyakitAssesmenKeperawatanIgd").value;
 $('#ModalShowAssesmenKeperawatanIgd').modal("hide");
}
function historialergitreageigd() {
  var a='';
  var param = 
  {
    no_rm : $("#rmTriageIgd").val(),};
    apiPOST('Kunjungan/historialergi', param, hasil =>{
      var b=hasil['history'];
      for (var i = 0; i < b.length; i++) {
        var no = i+1;
        a+='<tr>';
        a+='<td>' + no + '</td>';
        a+='<td>'+b[i].alergi+'</td>';
        a+='</tr>';
      }
      document.getElementById('bodyhistorialergitrageigd').innerHTML=a;
      document.getElementById('bodyhistorialergitrageigd2').innerHTML=a;
      document.getElementById('bodyhistorialergitrageigd3').innerHTML=a;

    });
  }

  function historipenyakittreageigd() {
    var a='';
    var param = 
    {
      no_rm : $("#rmTriageIgd").val(),};
      apiPOST('Kunjungan/historipenyakit', param, hasil =>{
        var b=hasil['history'];
        for (var i = 0; i < b.length; i++) {
          var no = i+1;
          a+='<tr>';
          a+='<td>' + no + '</td>';
          a+='<td>'+b[i].id_penyakit+'</td>';
          a+='<td>'+b[i].penyakit+'</td>';
          a+='<td>'+b[i].tgl_kunjungan+'</td>';
          a+='</tr>';
        }
        document.getElementById('bodyhistoripenyakittreageigd').innerHTML=a;
        document.getElementById('bodyhistoripenyakittreageigd2').innerHTML=a;
        document.getElementById('bodyhistoripenyakittreageigd3').innerHTML=a;

      });
    }

    function ReviewAssesmenPerawatErmIgd2(rm,unit){
      var a='';
      var param = 
      {
        rm : rm,unit :unit,
      };
      apiPOST('Rekammedisigd/ReviewAssesmenPerawatIgd', param, hasil =>{
        var b=hasil['data'];
        if (hasil['code']==200) {
          for (var i = 0; i < b.length; i++) {
            var t_darah =b[i].tekanan_darah.split('/');
            var pupil   =b[i].pupil.split('/');
            var reflek  =b[i].reflek_cahaya.split('/');
        //KeadaanUmumAssKeperawatanIgd
            document.getElementById("KeadaanUmumAssKeperawatanIgd").value  =b[i].keluhan_utama;
            document.getElementById("respirasiAssKeperawatanIgd").value    =b[i].respirasi;
            document.getElementById("nadiAssKeperawatanIgd").value         =b[i].nadi;
            document.getElementById("Spo2AssKeperawatanIgd").value         =b[i].spo2;
            document.getElementById("pupilkiriAssKeperawatanIgd").value    =pupil[0];
            document.getElementById("pupilkananAssKeperawatanIgd").value   =pupil[1];
            document.getElementById("tekananDarahTriageIgd1").value   =t_darah[0];
            document.getElementById("tekananDarahTriageIgd2").value   =t_darah[1];
            document.getElementById("palpasiTriageIgd").value         =b[i].palpasi;
            document.getElementById("reflekCahayaKiriTriageIgd").value   =reflek[0];
            document.getElementById("reflekCahayaKananTriageIgd").value  =reflek[1];
            document.getElementById("bbTriageIgd").value              =b[i].bb;
            document.getElementById("tinggiTriageIgd").value          =b[i].tinggi_badan;
            document.getElementById("imtTriageIgd").value             =b[i].imt;
            document.getElementById("suhuTriageIgd").value            =b[i].suhu;

          }
        }

      });
    }
    function tambahpasienTriagerwj() {
      var y = document.getElementById("DivPasienTriageIgd");
      var z = document.getElementById("DivPendafDetailKeperawatanRWJ");
      var a = document.getElementById("DivTriage");
      var c = document.getElementById("DivTriageRWJ");
      var d = document.getElementById("DivTriageIgd_listpasien");
      var e = document.getElementById("TriageIgd_button");
      z.style.display = "block";
      y.style.display = "block";
      a.style.display = "block";
      e.style.display = "block";
      c.style.display = "none";
      d.style.display = "none";
      $("#rwj_pendf_titleheader").html("<i class='fas fa-hospital-user'></i> Pendaftaran Pasien Baru");  
  //$("#igd_pendf_namapasien").trigger('focus');
    }
    function kembaliTriageIgd() {
      var y = document.getElementById("DivPasienTriageIgd");
      var z = document.getElementById("DivPendafDetailKeperawatanRWJ");
      var a = document.getElementById("DivTriage");
      var c = document.getElementById("DivTriageRWJ");
      var d = document.getElementById("DivTriageIgd_listpasien");
      var e = document.getElementById("TriageIgd_button");
      z.style.display = "none";
      y.style.display = "none";
      a.style.display = "none";
      e.style.display = "none";
      c.style.display = "block";
      d.style.display = "block";
      //document.getElementById( 'treaseigd' ).element.reset()\
      clearinput();
      cleartextarea();
    }
    
    function clearinput() {
      var elements = document.getElementsByTagName("input");
      for (var i=0; i < elements.length; i++) {
        if (elements[i].type == "text") {
          elements[i].value = '';
        }
      }
    }

    function cleartextarea() {
      var elements = document.getElementsByTagName("textarea");
      for (var ii=0; ii < elements.length; ii++) {
        if (elements[ii].type == "textarea") {
          elements[ii].value = '';
        }
      }
    }
    function tampilasalanrestrain() {
      if (document.getElementById('RestrainAssKeperawatanErmIgd').value=='2') { 
        document.getElementById('DivalasanRestrainAssKeperawatanErmIgd').style.display='block';} 
        else {
          document.getElementById('DivalasanRestrainAssKeperawatanErmIgd').style.display='none';
        }

      }
      function tampilBudayaAnut() {
        if (document.getElementById('BudayaAssKeperawatanErmIgd').value=='2') { 
          document.getElementById('DivKetBudayaAssKeperawatanErmIgd').style.display='block';} 
          else {
           document.getElementById('DivKetBudayaAssKeperawatanErmIgd').style.display='none';
         }

       }
   //tampil icd10
   //1 penyakit sekarang
       $(document).on('keyup', '#ModalinputPenyakitSekarangtreageigd', function(e) {
        if($(this).val() !== '')
        {
         var charCode = e.which || e.keyCode;
         if(charCode == 40)
         {
          icd10sekarangtreage(1);
        } 
        else if(charCode == 38)
        {
          icd10sekarangtreage(1);
        }
        else    (charCode == 13)
        {
          icd10sekarangtreage(1);
        }
      }else{
        document.getElementById("ModalDivPenyakitSekarangtreageigd").innerHTML="";
      }
    })
       $(document).on('keyup', '#ModalinputPenyakitSekarangkeperawatanigd', function(e) {
        if($(this).val() !== '')
        {
         var charCode = e.which || e.keyCode;
         if(charCode == 40)
         {
          icd10sekarangkeperawatan();
        } 
        else if(charCode == 38)
        {
          icd10sekarangkeperawatan();
        }
        else    (charCode == 13)
        {
          icd10sekarangkeperawatan();
        }
      }else{
        document.getElementById("ModalDivPenyakitSekarangkeperawatanigd").innerHTML="";
      }
    })
       $(document).on('keyup', '#ModalinputPenyakitSekarangmedisigd', function(e) {
        if($(this).val() !== '')
        {
         var charCode = e.which || e.keyCode;
         if(charCode == 40)
         {
          icd10sekarangmedis();
        } 
        else if(charCode == 38)
        {
          icd10sekarangmedis();
        }
        else    (charCode == 13)
        {
          icd10sekarangmedis();
        }
      }else{
        document.getElementById("ModalDivPenyakitSekarangmedisigd").innerHTML="";
      }
    })
       $(document).on('keyup', '#ModalinputPenyakitSekarangsoapigd', function(e) {
        if($(this).val() !== '')
        {
         var charCode = e.which || e.keyCode;
         if(charCode == 40)
         {
          icd10sekarangsoap();
        } 
        else if(charCode == 38)
        {
          icd10sekarangsoap();
        }
        else    (charCode == 13)
        {
          icd10sekarangsoap();
        }
      }else{
        document.getElementById("ModalDivPenyakitSekarangsoapigd").innerHTML="";
      }
    })
       $(document).on('keyup', '#TreageRiwayatPenyakitDuluErmIgd', function(e) {
        if($(this).val() !== '')
        {
         var charCode = e.which || e.keyCode;
         if(charCode == 40)
         {
          icd10sekarangtreage(2);
        } 
        else if(charCode == 38)
        {
          icd10sekarangtreage(2);
        }
        else    (charCode == 13)
        {
          icd10sekarangtreage(2);
        }
      }else{
        document.getElementById("DivKeperawatanRiwayatPenyakit").innerHTML="";
      }
    })
       $(document).on('keyup', '#TreageRiwayatPenyakitFam', function(e) {
        if($(this).val() !== '')
        {
         var charCode = e.which || e.keyCode;
         if(charCode == 40)
         {
          icd10sekarangtreage(3);
        } 
        else if(charCode == 38)
        {
          icd10sekarangtreage(3);
        }
        else    (charCode == 13)
        {
          icd10sekarangtreage(3);
        }
      }else{
        document.getElementById("DivKeperawatanPenyakitFam").innerHTML="";
      }
    })
       $(document).on('keyup', '#TreageRiwayatPenyakitNowErmIgd', function(e) {
        if($(this).val() !== '')
        {
         var charCode = e.which || e.keyCode;
         if(charCode == 40)
         {
          icd10sekarangtreage(4);
        } 
        else if(charCode == 38)
        {
          icd10sekarangtreage(4);
        }
        else    (charCode == 13)
        {
          icd10sekarangtreage(4);
        }
      }else{

        document.getElementById("DivtreaseRiwayatPenyakitSekarang").innerHTML="";
      }
    })
       function icd10sekarangtreage(nilai) {
        var param ={id:document.getElementById("TreageRiwayatPenyakitNowErmIgd").value,};
        apiPOST('Kunjungan/icd', param,hasil=>{
          var a=hasil['icd'];
          var unit='';
          for (var i = 0; i < a.length; i++) {
            unit+='<button class="btn btn-primary" onclick="pilihicd10sekarangtreage(`'+a[i]['penyakit']+'`,'+nilai+',`'+a[i]['id_penyakit']+'`)">'+a[i]['penyakit']+'</button><br>';
          }
          switch(nilai){
          case 1:
            document.getElementById('ModalDivPenyakitSekarangtreageigd').innerHTML=unit;
            break;
          case 2:
            document.getElementById('DivKeperawatanRiwayatPenyakit').innerHTML=unit;
            break;
          case 3:
            document.getElementById('DivKeperawatanPenyakitFam').innerHTML=unit;
            break;
          case 4:
            document.getElementById('DivtreaseRiwayatPenyakitSekarang').innerHTML=unit;
            break;
          }
        });
      }

      function icd10sekarangkeperawatan() {
        var param ={id:document.getElementById("ModalinputPenyakitSekarangkeperawatanigd").value,};
        apiPOST('Kunjungan/icd', param,hasil=>{
          var a=hasil['icd'];
          var unit='';
          for (var i = 0; i < a.length; i++) {
            unit+='<button class="btn btn-primary" onclick="pilihicd10sekarangkeperawatan(`'+a[i]['penyakit']+'`,`'+a[i]['id_penyakit']+'`)">'+a[i]['penyakit']+'</button><br>';
          }

          document.getElementById('ModalDivPenyakitSekarangkeperawatanigd').innerHTML=unit;

        });
      }
      function icd10sekarangmedis() {
        var param ={id:document.getElementById("ModalinputPenyakitSekarangmedisigd").value,};
        apiPOST('Kunjungan/icd', param,hasil=>{
          var a=hasil['icd'];
          var unit='';
          for (var i = 0; i < a.length; i++) {
            unit+='<button class="btn btn-primary" onclick="pilihicd10sekarangmedis(`'+a[i]['penyakit']+'`,`'+a[i]['id_penyakit']+'`)">'+a[i]['penyakit']+'</button><br>';
          }

          document.getElementById('ModalDivPenyakitSekarangmedisigd').innerHTML=unit;

        });
      }
      function icd10sekarangsoap() {
        var param ={id:document.getElementById("ModalinputPenyakitSekarangsoapigd").value,};
        apiPOST('Kunjungan/icd', param,hasil=>{
          var a=hasil['icd'];
          var unit='';
          for (var i = 0; i < a.length; i++) {
            unit+='<button class="btn btn-primary" onclick="pilihicd10sekarangsoap(`'+a[i]['penyakit']+'`,`'+a[i]['id_penyakit']+'`)">'+a[i]['penyakit']+'</button><br>';
          }

          document.getElementById('ModalDivPenyakitSekarangsoapigd').innerHTML=unit;

        });
      }
      function pilihicd10sekarangkeperawatan(kode,icd) {
        document.getElementById("RiwayatPenyakitNowasskepigd").value=document.getElementById('RiwayatPenyakitNowasskepigd').value+'+'+kode;
        document.getElementById("ModalDivPenyakitSekarangkeperawatanigd").innerHTML="";
        $('#ModalTambahIcdPenyakitSekarangkeperawatanigd').modal('hide');
      }
      function pilihicd10sekarangmedis(kode,icd) {
        document.getElementById("Riwayatpenyakitnowassmedigd").value=document.getElementById('Riwayatpenyakitnowassmedigd').value+'+'+kode;
        document.getElementById("ModalDivPenyakitSekarangmedisigd").innerHTML="";
        $('#ModalTambahIcdPenyakitSekarangmedisigd').modal('hide');
      }
      function pilihicd10sekarangsoap(kode,icd) {
        document.getElementById("assesmenTriageIgd").value=document.getElementById('assesmenTriageIgd').value+'+'+kode;
        document.getElementById("assesmenTriageIgd").innerHTML="";
        $('#ModalTambahIcdPenyakitSekarangsoapigd').modal('hide');
      }
      function pilihicd10sekarangtreage(kode,nilai,icd) {
        switch(nilai){
        case 1:
          document.getElementById("TreageRiwayatPenyakitNowErmIgd").value=document.getElementById('TreageRiwayatPenyakitNowErmIgd').value+'+'+kode;
          document.getElementById("ModalDivPenyakitSekarangtreageigd").innerHTML="";
          $('#ModalTambahIcdPenyakitSekarangtreageigd').modal('hide');
          break;
        case 2:
          document.getElementById("TreageRiwayatPenyakitDuluErmIgd").value=kode;
          document.getElementById("DivKeperawatanRiwayatPenyakit").innerHTML="";
          break;
        case 3:
          document.getElementById("TreageRiwayatPenyakitFam").value=kode;
          document.getElementById("DivKeperawatanPenyakitFam").innerHTML="";
          break;
        case 4:
          document.getElementById("TreageRiwayatPenyakitNowErmIgd").value=kode;
          document.getElementById("DivtreaseRiwayatPenyakitSekarang").innerHTML="";
          addpenyakittreageigd(icd);
          break;
        }
      }
      function addpenyakittreageigd(icd) {

       var param={
        icd         :icd,
        no_rm       :$('#rmTriageIgd').val(),
        id_kunjungan:$('#idKunjunganTriageIgd').val(),
        id_unit     :$('#idunitTriageIgd').val(),
        status_diag :1,
      };
      apiPOST('Kunjungan/addmypenyakit', param,hasil=>{

      });
    }
    $(document).on('keyup', '#KeperawatanRiwayatPenyakitFam', function(e) {
      if($(this).val() !== '')
      {
       var charCode = e.which || e.keyCode;
       if(charCode == 40)
       {
        KeperawatanpenyakitFam();
      } 
      else if(charCode == 38)
      {
        KeperawatanpenyakitFam();
      }
      else    (charCode == 13)
      {
        KeperawatanpenyakitFam();
      }
    }else{
      document.getElementById("DivKeperawatanPenyakitFam").innerHTML="";
    }
  })
    function KeperawatanpenyakitFam() {
      var param ={id:document.getElementById("KeperawatanRiwayatPenyakitFam").value,};
      apiPOST('Kunjungan/icd', param,hasil=>{
        var a=hasil['icd'];
        var unit='';
        for (var i = 0; i < a.length; i++) {
          unit+='<button class="btn btn-primary" onclick="pilihKeperawatanPenyakitFam(`'+a[i]['penyakit']+'`)">'+a[i]['penyakit']+'</button>';
        }
        document.getElementById('DivKeperawatanPenyakitFam').innerHTML=unit;
      });
    }
    function historipenyakitkeluarga() {
      var a='';
      var param = 
      {
        no_rm : $("#rmTriageIgd").val(),};
        apiPOST('Kunjungan/historipenyakitkeluarga', param, hasil =>{
          var b=hasil['history'];
          for (var i = 0; i < b.length; i++) {
            var no = i+1;
            a+='<tr>';
            a+='<td>' + no+ '</td>';
            a+='<td>' + b[i].id_penyakit+ '</td>';
            a+='<td>'+b[i].penyakit+'</td>';
            a+='</tr>';
          }
          document.getElementById('bodyhistoripenyakitkeltreageigd').innerHTML=a;
          document.getElementById('bodyhistoripenyakitkeltreageigd2').innerHTML=a;
          //document.getElementById('bodyhistoripenyakitkeltreageigd3').innerHTML=a;

        });
      }
      function pilihKeperawatanPenyakitFam(kode) {
        document.getElementById("KeperawatanRiwayatPenyakitFam").value=kode;
        document.getElementById("DivKeperawatanPenyakitFam").innerHTML="";
      }
  /*assesmen keperwatan*/
      $(document).on('keyup', '#KeperawatanRiwayatPenyakitFam', function(e) {
        if($(this).val() !== '')
        {
         var charCode = e.which || e.keyCode;
         if(charCode == 40)
         {
          KeperawatanpenyakitFam();
        } 
        else if(charCode == 38)
        {
          KeperawatanpenyakitFam();
        }
        else    (charCode == 13)
        {
          KeperawatanpenyakitFam();
        }
      }else{
        document.getElementById("DivKeperawatanPenyakitFam").innerHTML="";
      }
    })
      function KeperawatanpenyakitFam() {
        var param ={id:document.getElementById("KeperawatanRiwayatPenyakitFam").value,};
        apiPOST('Kunjungan/icd', param,hasil=>{
          var a=hasil['icd'];
          var unit='';
          for (var i = 0; i < a.length; i++) {
            unit+='<button class="btn btn-primary" onclick="pilihKeperawatanPenyakitFam(`'+a[i]['penyakit']+'`)">'+a[i]['penyakit']+'</button>';
          }
          document.getElementById('DivKeperawatanPenyakitFam').innerHTML=unit;
        });
      }
      function pilihKeperawatanPenyakitFam(kode) {
        document.getElementById("KeperawatanRiwayatPenyakitFam").value=kode;
        document.getElementById("DivKeperawatanPenyakitFam").innerHTML="";
      }
  /*end assesmen keperawatan*/
  /*modal tambah penyakit sekarang*/
      $(document).on('keyup', '#intervensiTriageIgd', function(e) {
        if($(this).val() !== '')
        {
         var charCode = e.which || e.keyCode;
         if(charCode == 40)
         {
          KomunikasiPengajaranKep();
        } 
        else if(charCode == 38)
        {
          KomunikasiPengajaranKep();
        }
        else    (charCode == 13)
        {
          KomunikasiPengajaranKep();
        }
      }else{
        document.getElementById("DivintervensiTriageIgd").innerHTML="";
      }
    })
      function KomunikasiPengajaranKep() {
        var param ={id:document.getElementById("intervensiTriageIgd").value,};
        apiPOST('Kunjungan/KomunikasiKeperawatan', param,hasil=>{
          var a=hasil['kode'];
          var unit='';
          for (var i = 0; i < a.length; i++) {
            unit+='<button class="btn btn-primary" onclick="pilihKomunikasiPengajaranKep(`'+a[i]['uraian']+'`)">'+a[i]['kode_produk']+'|'+a[i]['uraian']+'</button><br>';
          }
          document.getElementById('DivintervensiTriageIgd').innerHTML=unit;
        });
      }
      function TableKomunikasiPengajaranKep() {
        var param ={id:document.getElementById("intervensiTriageIgd").value,};
        apiPOST('Kunjungan/IntervensiKeperawatan', param,hasil=>{
          var a=hasil['kode'];
          var unit='';
          for (var i = 0; i < a.length; i++) {
            unit+=' <table>';
            unit+=' <tr>';
            unit+=' <td >';
            unit+=' <input type="checkbox" name="intervensikeperawatan" value="'+a[i]['uraian']+'">'+a[i]['uraian']+' ('+a[i]['kode_produk']+')';
            unit+='</td>';
            unit+='</tr>';
            unit+='</table>';
          }
          document.getElementById('DivTableintervensiTriageIgd').innerHTML=unit;
        });
      }
      function TableDiagnosaKep() {
        var param ={id:document.getElementById("assesmenTriageIgd").value,};
        apiPOST('Kunjungan/KomunikasiKeperawatan', param,hasil=>{
          var a=hasil['kode'];
          var unit='';
          for (var i = 0; i < a.length; i++) {
            unit+=' <table>';
            unit+=' <tr>';
            unit+=' <td >';
            unit+=' <input type="checkbox" name="diagnosakeperawatan" value="'+a[i]['uraian']+'">'+a[i]['uraian']+' ('+a[i]['kode_produk']+')';
            unit+='</td>';
            unit+='</tr>';
            unit+='</table>';
          }
          document.getElementById('DivTableDiagnosaTriageIgd').innerHTML=unit;
        });
      }
      function pilihKomunikasiPengajaranKep(kode) {

        document.getElementById("intervensiTriageIgd").value=kode;
        document.getElementById("DivintervensiTriageIgd").innerHTML="";
      }
  /*riwayat dulu*/
      function autocomplateresumeirna() {
        showttdresumedokter();
        var date = new Date();
        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear();

        if (month < 10) month = "0" + month;
        if (day < 10) day = "0" + day;

        var tgl       = year + "-" + month + "-" + day;  
        var kunjungan =document.getElementById('idKunjunganTriageIgd').value;
        var rm        =document.getElementById('rmTriageIgd').value
        detailsoapiakhir(kunjungan);
/*    eresepakhir(kunjungan,tgl,tgl);
    detailmrpenyakitmedermirjaakhir(kunjungan);
    detailicd9medermirjaakhir(kunjungan);*/
        ReviewAssesmenErmIrjaakhir(rm,unit);
      }
      function detailsoapiakhir(idkunjungan){
        var paramsoapi = {
          idkunjungan: idkunjungan,
          user       : user.id_pegawai,
        };
        var barisrmhisd = ''; 
        apiPOST('Rekammedisirja/datakunjunganhistorirmsoapiresume', paramsoapi, hasil => {
          var x = hasil['data'];
          if (hasil['code']=="200") {            
            spo2=x['spo2'];
            document.getElementById('RespirasiResumeErmIrja').value=x['saturasi'];
            document.getElementById('nadiResumeErmIrja').value=x['nadi'];
            document.getElementById('tensiResumeErmIrja').value=x['tekanan_darah'];
            document.getElementById('SuhuResumeErmIrja').value=x['suhu'];
            document.getElementById('TindakanResumeErmIrja').value   =x['instruksi'];
            s   =x['subjek'];
            o   =x['objek'];
            document.getElementById('DiagnosisResumeErmIrja').value=x['assesmen'];
            document.getElementById('InstruksiResumeErmIrja').value   =x['planning'];
          }
        })
      }
      function ReviewAssesmenErmIrjaakhir(rm,unit){
        var a='';
        var param = 
        {
          rm : rm,
          unit :unit,
          id_kunjungan:document.getElementById('idKunjunganTriageIgd').value,
          transaksi:document.getElementById('idtransaksiTriageIgd').value,
        };
        apiPOST('Rekammedisirja/ReviewAssesmenMedisIrjaresume', param, hasil =>{
          var d='';
          if (hasil['code']==200) {
            var b=hasil['data1'];
            var c=hasil['data2'];
            var obat=hasil['obat'];
            document.getElementById("PemeriksaanFisikResumeErmIrja").value=b['kepala']+','+b['mata']+','+b['tht']+','+b['leher']+','+b['mulut']+','+b['thoraks']+','+b['jantung']+','+b['paru']+','+b['abdomen']+','+b['genitalia'];
            if (c['cara_masuk']=='Datang Sendiri') {
              document.getElementById('caramasukResumeErmMedisIgd').value=c['cara_masuk'];
            } else {
              document.getElementById('caramasukResumeErmMedisIgd').value=c['cara_masuk']+' '+c['rujukan'];
            }

            for (var i = 0; i < obat.length; i++) {
             d+=obat[i]['nama_obat']+' '+obat[i]['jumlah']+'('+obat[i]['signa']+')';
           }
           document.getElementById('TerapiResumeErmIrja').value=d;
         }

       });
      }
  /*modal tambah penyakit sekarang*/
      $(document).on('keyup', '#DiagnosaTriageIgd', function(e) {
        if($(this).val() !== '')
        {
         var charCode = e.which || e.keyCode;
         if(charCode == 40)
         {
          DiagnosaKeperawatanIgd();
        } 
        else if(charCode == 38)
        {
          DiagnosaKeperawatanIgd();
        }
        else    (charCode == 13)
        {
          DiagnosaKeperawatanIgd();
        }
      }else{
        document.getElementById("DivDiagnosaTriageIgd").innerHTML="";
      }
    })
      function DiagnosaKeperawatanIgd() {
        var param ={id:document.getElementById("DiagnosaTriageIgd").value,};
        apiPOST('Kunjungan/IntervensiKeperawatan', param,hasil=>{
          var a=hasil['kode'];
          var unit='';
          for (var i = 0; i < a.length; i++) {
            unit+='<button class="btn btn-primary" onclick="pilihIntervensiKep(`'+a[i]['uraian']+'`)">'+a[i]['kode_produk']+'|'+a[i]['uraian']+'</button><br>';
          }
          document.getElementById('DivDiagnosaTriageIgd').innerHTML=unit;
        });
      }
      function pilihIntervensiKep(kode) {

        document.getElementById("DiagnosaTriageIgd").value=kode;
        document.getElementById("DivDiagnosaTriageIgd").innerHTML="";
      }
  /*riwayat dulu*/
      $(document).on('keyup', '#RiwayatPenyakitDuluTriageIgd', function(e) {
        if($(this).val() !== '')
        {
         var charCode = e.which || e.keyCode;
         if(charCode == 40)
         {
          KeperawatanriwayatPenyakit();
        } 
        else if(charCode == 38)
        {
          KeperawatanriwayatPenyakit();
        }
        else    (charCode == 13)
        {
          KeperawatanriwayatPenyakit();
        }
      }else{
        document.getElementById("DivKeperawatanRiwayatPenyakit").innerHTML="";
      }
    })
      function KeperawatanriwayatPenyakit() {
        var param ={id:document.getElementById("RiwayatPenyakitDuluTriageIgd").value,};
        apiPOST('Kunjungan/icd', param,hasil=>{
          var a=hasil['icd'];
          var unit='';
          for (var i = 0; i < a.length; i++) {
            unit+='<button class="btn btn-primary"  onclick="pilihKeperawatanPenyakitdulu(`'+a[i]['penyakit']+'`)">'+a[i]['penyakit']+'</button><br>';
          }
          document.getElementById('DivKeperawatanRiwayatPenyakit').innerHTML=unit;
        });
      }
      $(document).on('keyup', '#RiwayatPenyakitDuluAssKepIgd', function(e) {
        if($(this).val() !== '')
        {
         var charCode = e.which || e.keyCode;
         if(charCode == 40)
         {
          riwayatPenyakitasskepigd();
        } 
        else if(charCode == 38)
        {
          riwayatPenyakitasskepigd();
        }
        else    (charCode == 13)
        {
          riwayatPenyakitasskepigd();
        }
      }else{
        document.getElementById("DivRiwayatPenyakitDuluAssKepIgd").innerHTML="";
      }
    })
      function riwayatPenyakitasskepigd() {
        var param ={id:document.getElementById("RiwayatPenyakitDuluAssKepIgd").value,};
        apiPOST('Kunjungan/icd', param,hasil=>{
          var a=hasil['icd'];
          var unit='';
          for (var i = 0; i < a.length; i++) {
            unit+='<button class="btn btn-primary"  onclick="pilihPenyakitduluasskepigd(`'+a[i]['penyakit']+'`)">'+a[i]['penyakit']+'</button><br>';
          }
          document.getElementById('DivRiwayatPenyakitDuluAssKepIgd').innerHTML=unit;
        });
      }

      function pilihPenyakitduluasskepigd(kode) {
        document.getElementById("RiwayatPenyakitDuluAssKepIgd").value=kode;
        document.getElementById("DivRiwayatPenyakitDuluAssKepIgd").innerHTML="";
      }

      function pilihKeperawatanPenyakitdulu(kode) {
        document.getElementById("RiwayatPenyakitDuluTriageIgd").value=kode;
        document.getElementById("DivKeperawatanRiwayatPenyakit").innerHTML="";
      }

  /*riwayat sekarang*/
      $(document).on('keyup', '#RiwayatPenyakitNowTriageIgd', function(e) {
        if($(this).val() !== '')
        {
         var charCode = e.which || e.keyCode;
         if(charCode == 40)
         {
          KeperawatanriwayatPenyakitSekarang(1);
        } 
        else if(charCode == 38)
        {
          KeperawatanriwayatPenyakitSekarang(1);
        }
        else    (charCode == 13)
        {
          KeperawatanriwayatPenyakitSekarang(1);
        }
      }else{
        document.getElementById("DivTreaseRiwayatPenyakitSekarang").innerHTML="";
      }
    })
      $(document).on('keyup', '#RiwayatPenyakitNowasskepigd', function(e) {
        if($(this).val() !== '')
        {
         var charCode = e.which || e.keyCode;
         if(charCode == 40)
         {
          KeperawatanriwayatPenyakitSekarang(2);
        } 
        else if(charCode == 38)
        {
          KeperawatanriwayatPenyakitSekarang(2);
        }
        else    (charCode == 13)
        {
          KeperawatanriwayatPenyakitSekarang(2);
        }
      }else{
        document.getElementById("DivKeperawatanRiwayatPenyakitSekarang").innerHTML="";
      }
    })

      $(document).on('keyup', '#Riwayatpenyakitnowassmedigd', function(e) {
        if($(this).val() !== '')
        {
         var charCode = e.which || e.keyCode;
         if(charCode == 40)
         {
          KeperawatanriwayatPenyakitSekarang(3);
        } 
        else if(charCode == 38)
        {
          KeperawatanriwayatPenyakitSekarang(3);
        }
        else    (charCode == 13)
        {
          KeperawatanriwayatPenyakitSekarang(3);
        }
      }else{
        document.getElementById("Assesmenassmedigd").innerHTML="";
      }
    })
      $(document).on('keyup', '#Assesmenassmedigd', function(e) {
        if($(this).val() !== '')
        {
         var charCode = e.which || e.keyCode;
         if(charCode == 40)
         {
          KeperawatanriwayatPenyakitSekarang(4);
        } 
        else if(charCode == 38)
        {
          KeperawatanriwayatPenyakitSekarang(4);
        }
        else    (charCode == 13)
        {
          KeperawatanriwayatPenyakitSekarang(4);
        }
      }else{
        document.getElementById("Assesmenassmedigd").innerHTML="";
      }
    })
      $(document).on('keyup', '#assesmenTriageIgd', function(e) {
        if($(this).val() !== '')
        {
         var charCode = e.which || e.keyCode;
         if(charCode == 40)
         {
          KeperawatanriwayatPenyakitSekarang(5);
        } 
        else if(charCode == 38)
        {
          KeperawatanriwayatPenyakitSekarang(5);
        }
        else    (charCode == 13)
        {
          KeperawatanriwayatPenyakitSekarang(5);
        }
      }else{
        document.getElementById("assesmenTriageIgd").innerHTML="";
      }
    })

      function KeperawatanriwayatPenyakitSekarang(nilai) {
        if (nilai==1){
          var param ={id:document.getElementById("RiwayatPenyakitNowTriageIgd").value,};
        }else if(nilai==2){
          var param ={id:document.getElementById("RiwayatPenyakitNowasskepigd").value,};
        }else if(nilai==3){
          var param ={id:document.getElementById("Riwayatpenyakitnowassmedigd").value,};
        }else if(nilai==4){
          var param ={id:document.getElementById("Assesmenassmedigd").value,};
        }else{
          var param ={id:document.getElementById("assesmenTriageIgd").value,};
        }
        apiPOST('Kunjungan/icd', param,hasil=>{
          var a=hasil['icd'];
          var unit='';
          if (nilai==1){
            for (var i = 0; i < a.length; i++) {
              unit+='<button class="btn btn-primary"  onclick="pilihPenyakitsekarang(`'+a[i]['penyakit']+'`)">'+a[i]['penyakit']+'</button><br>';
            }
          }else if(nilai==2){
            for (var i = 0; i < a.length; i++) {
              unit+='<button class="btn btn-primary"  onclick="pilihPenyakitsekarang2(`'+a[i]['penyakit']+'`)">'+a[i]['penyakit']+'</button><br>';
            }
          }else if(nilai==3){
            for (var i = 0; i < a.length; i++) {
              unit+='<button class="btn btn-primary"  onclick="pilihPenyakitsekarang3(`'+a[i]['penyakit']+'`)">'+a[i]['penyakit']+'</button><br>';
            }
          }else if(nilai==4){
            for (var i = 0; i < a.length; i++) {
              unit+='<button class="btn btn-primary"  onclick="pilihPenyakitsekarang4(`'+a[i]['penyakit']+'`)">'+a[i]['penyakit']+'</button><br>';
            }
          }else{
            for (var i = 0; i < a.length; i++) {
              unit+='<button class="btn btn-primary"  onclick="pilihPenyakitsekarang5(`'+a[i]['penyakit']+'`)">'+a[i]['penyakit']+'</button><br>';
            }
          }
          if (nilai==1){
            document.getElementById('DivTreageRiwayatPenyakitSekarang').innerHTML=unit;
          }else if(nilai==2){
            document.getElementById('DivKeperawatanRiwayatPenyakitSekarang').innerHTML=unit;
          }else if(nilai==3){
            document.getElementById('divAssesmenassmedigd').innerHTML=unit;
          }else if(nilai==4){
           document.getElementById('divAssesmenassmedigd2').innerHTML=unit;
         }else{
          document.getElementById('divassesmenTriageIgd').innerHTML=unit;
        }

      });
      }

      function pilihPenyakitsekarang(kode) {
        var a=document.getElementById("RiwayatPenyakitNowTriageIgd").value;
        document.getElementById("RiwayatPenyakitNowTriageIgd").value=kode;
        document.getElementById("DivTreaseRiwayatPenyakitSekarang").innerHTML="";
      }
      function pilihPenyakitsekarang2(kode) {
        var a=document.getElementById("RiwayatPenyakitNowasskepigd").value;
        document.getElementById("RiwayatPenyakitNowasskepigd").value=kode;
        document.getElementById("DivKeperawatanRiwayatPenyakitSekarang").innerHTML="";
      }
      function pilihPenyakitsekarang3(kode) {
        var a=document.getElementById("Riwayatpenyakitnowassmedigd").value;
        document.getElementById("Riwayatpenyakitnowassmedigd").value=kode;
        document.getElementById("divAssesmenassmedigd").innerHTML="";
      }
      function pilihPenyakitsekarang4(kode) {
        var a=document.getElementById("Assesmenassmedigd").value;
        document.getElementById("Assesmenassmedigd").value=kode;
        document.getElementById("divAssesmenassmedigd2").innerHTML="";
      }
      function pilihPenyakitsekarang5(kode) {
        var a=document.getElementById("assesmenTriageIgd").value;
        document.getElementById("assesmenTriageIgd").value=kode;
        document.getElementById("divassesmenTriageIgd").innerHTML="";
      }

      function penyakitdahuluasskepirja() {
        var param ={kode:document.getElementById("rmTriageIgd").value,};
        apiPOST('Kunjungan/historipenyakit', param,hasil=>{
          var a=hasil['history'];
          var unit='';
          for (var i = 0; i < a.length; i++) {
            unit+= a[i]['penyakit']+'\n';
          }
          document.getElementById('RiwayatPenyakitDuluAssKepIgd').innerHTML=unit;
        });
      }

      function penyakitdahulutreageigd() {
        var param ={kode:document.getElementById("rmTriageIgd").value,};
        apiPOST('Kunjungan/historipenyakit', param,hasil=>{
          var a=hasil['history'];
          var unit='';
          for (var i = 0; i < a.length; i++) {
            unit+= a[i]['penyakit']+'\n';
          }
          document.getElementById('TreageRiwayatPenyakitDuluErmIgd').innerHTML=unit;
        });
      }

      function penyakitfamtreageigd() {
        var param ={no_rm:document.getElementById("rmTriageIgd").value,};
        apiPOST('Kunjungan/historipenyakitfam', param,hasil=>{
          var a=hasil['history'];
          var unit='';
          for (var i = 0; i < a.length; i++) {
            unit+= a[i]['penyakit']+'\n';
          }
          document.getElementById('TreageRiwayatPenyakitFam').innerHTML=unit;
        });
      }


      function penyakitsekarangtreageigd() {
        var param ={kode:document.getElementById("rmTriageIgd").value,};
        apiPOST('Kunjungan/penyakitsekarangirja', param,hasil=>{
          var a=hasil['history'];
          var unit='';
          for (var i = 0; i < a.length; i++) {
            unit+= a[i]['penyakit']+'\n';
          }
          document.getElementById('TreageRiwayatPenyakitNowErmIgd').innerHTML=unit;
        });
      }

      function penyakitsekarangasskepigd() {
        var param ={kode:document.getElementById("rmTriageIgd").value,};
        apiPOST('Kunjungan/penyakitsekarangirja', param,hasil=>{
          var a=hasil['history'];
          var unit='';
          for (var i = 0; i < a.length; i++) {
            unit+= a[i]['penyakit']+'\n';
          }
          document.getElementById('RiwayatPenyakitNowasskepigd').innerHTML=unit;
        });
      }
      function penyakitsekarangassmedigd() {
        var param ={kode:document.getElementById("rmTriageIgd").value,};
        apiPOST('Kunjungan/penyakitsekarangirja', param,hasil=>{
          var a=hasil['history'];
          var unit='';
          for (var i = 0; i < a.length; i++) {
            unit+= a[i]['penyakit']+'\n';
          }
          document.getElementById('Riwayatpenyakitnowassmedigd').innerHTML=unit;
        });
      }

      function inputdatasubjek() {
        var cekdinamis = document.getElementById('cek_subjek_dinamis_input').value;
        const btn = document.querySelector('#btn');
        btn.addEventListener('click', (event) => {
          let checkboxes1 = document.querySelectorAll('input[name="cek_subjek"]:checked');
          let values = [];
          checkboxes1.forEach((checkbox) => {
            values.push(checkbox.value);
          });
          $('#ModalCariSubjek').modal("hide");
          if (cekdinamis=='') {
            dataarray=values;
          } else {
            dataarray=values +','+ cekdinamis;
          }

          document.getElementById('subjekkeperawatanIgd').value=dataarray;
        });  
      }

      function inputdataintervensiKeperawatan() {
        const btn = document.querySelector('#buttonintervensi');
        btn.addEventListener('click', (event) => {
          let checkboxes = document.querySelectorAll('input[name="intervensikeperawatan"]:checked');
          let values = [];
          checkboxes.forEach((checkbox) => {
            values.push(checkbox.value);
          });
          $('#ModalIntervensiKeperawatan').modal("hide");
          document.getElementById('soapintervensiTriageIgd').value=values;
        });  
      }

      function inputdatadiagnosaKeperawatan() {
        const btn = document.querySelector('#buttondiagnosa');
        btn.addEventListener('click', (event) => {
          let checkboxes = document.querySelectorAll('input[name="diagnosakeperawatan"]:checked');
          let values = [];
          checkboxes.forEach((checkbox) => {
            values.push(checkbox.value);
          });
          $('#ModalDiagnosaKeperawatan').modal("hide");
          document.getElementById('assesmenTriageIgd').value=values;
        });  
      }

      function ShowPasien() {
       var x = document.getElementById("DivCariPasien");
       var y = document.getElementById("DivPasien");
       var z = document.getElementById("DivPendafDetail");
       z.style.display = "block"
       y.style.display = "block";
       x.style.display = "none";
     }

     function caripasienrwj() {
      tambahpasienrwj();
    }

    function unit() {
     apiPOST('Rawatjalan/unit', null,hasil=>{
      var a=hasil['data'];
      var unit='';
      for (var i = 0; i < a.length; i++) {
        unit+='<option value="'+a[i]['id_unit']+'">'+a[i]['nama_unit']+'</option>';
      }
      document.getElementById('TriageIgdpoliklinik').innerHTML=unit;
    });
   }
   function updateasskepigd(idkunjunganhistori,idunit) {

    var param = {
      id: idkunjunganhistori,
      idunit:idunit,
    };
  /**/
    apiPOST('Rekammedisigd/datakunjunganrmkeperdetail', param, hasil => {
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
/*        
        $('#RiwayatPenyakitNowTriageIgd').val()=a[i][''];
        $('#RestrainAssKeperawatanErmIgd').val()=a[i][''];
        $('#alasanRestrainAssKeperawatanErmIgd').val()=a[i][''];
        $('#BudayaAssKeperawatanErmIgd').val()=a[i][''];
        $('#KetBudayaAssKeperawatanErmIgd').val()=a[i][''];
        $('#TinggalBersamaAssKeperawatanErmIgd').val()=a[i][''];
        $('#StatusMentalAssKeperawatanErmIgd').val()=a[i][''];
        $('#StatusPsikoAssKeperawatanErmIgd').val()=a[i][''];
      //tanda vital
        $('#KeadaanUmumTriageIgd').val()=a[i][''];
        $('#tipekesadaranasskepermigd').val()=a[i][''];*/

      //end tanda vital
        document.getElementById('keluhanutamaKeperawatanErmIgd').value=a[i]['keluhan_utama'];
        $('#linkassesmenkeperawatanIgd').click();
        document.getElementById('ermrwjkeperawatanhasilkesimpulan').value=a[i]['ket_resiko_jatuh'];
        document.getElementById('intervensiasskepigd').value=a[i]['intervensi_kep'];
        document.getElementById('Diagnosaasskepigd').value=a[i]['diagnosa_kep'];
        document.getElementById('fisikStatusLocalisTriageIgd').value=a[i]['status_lokalis'];
        document.getElementById('ermrwjkeperawatanbbturun').value=a[i]['skrining_gizi'];
        document.getElementById('ermrwjkeperawatanbbturunkg').value=a[i]['penurunan_bb'];
        document.getElementById('ermrwjkeperawatanpenurunanmakan').value=a[i]['asupan_makan'];
        document.getElementById('ermrwjkeperawatantotalskor').value=a[i]['skor_gizi'];
        document.getElementById('ermrwjkeperawatansaran').value=a[i]['saran_tindakan_gizi'];
        if (a[i]['status_fungsional']=='1') {
          document.getElementById('ermrwjkeperawatanfungsional1').checked='true';
        } else if (a[i]['status_fungsional']=='2') {
          document.getElementById('ermrwjkeperawatanfungsional2').checked='true';
        }else{
         document.getElementById('ermrwjkeperawatanfungsional3').checked='true';
       }

       if (a[i]['cara_berjalan']=='1') {
        document.getElementById('ermrwjkeperawatankeseimbangan1').checked='true';
      } else {
        document.getElementById('ermrwjkeperawatankeseimbangan2').checked='true'; 
      }

      if (a[i]['cara_pegang']=='1') {
        document.getElementById('ermrwjkeperawatanpenopang1').checked='true';
      } else {
        document.getElementById('ermrwjkeperawatanpenopang2').checked='true';
      }

      if (a[i]['resiko_jatuh']=='1') {
        document.getElementById('ermrwjkeperawatanhasilskrining1').checked='true';
      } else if (a[i]['resiko_jatuh']=='2'){
        document.getElementById('ermrwjkeperawatanhasilskrining2').checked='true';
      }else{
        document.getElementById('ermrwjkeperawatanhasilskrining3').checked='true';
      }

      if (a[i]['bicara']=='1') {
        document.getElementById('KebKomBicaraasskepigd1').checked='true';
      } else {
        document.getElementById('KebKomBicaraasskepigd2').checked='true';
      }

      if (a[i]['penerjemah']=='1') {
        document.getElementById('Penerjemahasskepigd1').checked='true';
      } else {
        document.getElementById('Penerjemahasskepigd2').checked='true';
      }
      if (a[i]['bhs_isyarat']=='1') {
        document.getElementById('Isyaratasskepigd1').checked='true';
      } else {
        document.getElementById('Isyaratasskepigd2').checked='true';
      }
      if (a[i]['hambatan']=='1') {
        document.getElementById('HamBelajarasskepigd1').checked='true';
      } else {
        document.getElementById('HamBelajarasskepigd2').checked='true';
      }


      switch (a[i]['skorface']){
      case '0':
        document.getElementById('ermrwjkeperawatanskorface').checked='true';
        break;
      case '1':
        document.getElementById('ermrwjkeperawatanskorface1').checked='true';
        break;
      case '2':
        document.getElementById('ermrwjkeperawatanskorface2').checked='true';
        break;
      case '3':
        document.getElementById('ermrwjkeperawatanskorface3').checked='true';
        break;
      case '4':
        document.getElementById('ermrwjkeperawatanskorface4').checked='true';
        break;
      case '5':
        document.getElementById('ermrwjkeperawatanskorface5').checked='true';
        break;
      case '6':
        document.getElementById('ermrwjkeperawatanskorface6').checked='true';
        break;
      case '7':
        document.getElementById('ermrwjkeperawatanskorface7').checked='true';
        break;
      case '8':
        document.getElementById('ermrwjkeperawatanskorface8').checked='true';
        break;
      case '9':
        document.getElementById('ermrwjkeperawatanskorface9').checked='true';
        break;
      case '10':
        document.getElementById('ermrwjkeperawatanskorface10').checked='true';
        break;
      default:
      }

      document.getElementById('fisikKepalaTriageIgdKet').value=a[i]['kepala_ket'];
      switch (a[i]['kepala']){
      case "1":
        document.getElementById('fisikKepalaTriageIgd1').checked='true';
        break;
      case "2":
        document.getElementById('fisikKepalaTriageIgd2').checked='true';
        break;
      }

      document.getElementById('fisikJantungTriageIgdKet').value=a[i]['jantung_ket'];
      switch (a[i]['jantung']){
      case "1":
        document.getElementById('fisikJantungTriageIgd1').checked='true';
        break;
      case "2":
        document.getElementById('fisikJantungTriageIgd2').checked='true';
        break; 
      }

      switch (a[i]['mata']){
      case "1":
        document.getElementById('fisikMataTriageIgd1').checked='true';
        break;
      case "2":
        document.getElementById('fisikMataTriageIgd2').checked='true';
        break; 
      }
      document.getElementById('fisikMataTriageIgdKet').value=a[i]['mata_ket'];

      document.getElementById('fisikParuTriageIgdKet').value=a[i]['paru_ket'];
      switch (a[i]['paru']){
      case "1":
        document.getElementById('fisikParuTriageIgd1').checked='true';
        break;
      case "2":
        document.getElementById('fisikParuTriageIgd2').checked='true';
        break; 
      }

      document.getElementById('fisikThtTriageIgdKet').value=a[i]['tht_ket'];
      switch (a[i]['tht']){
      case "1":
        document.getElementById('fisikThtTriageIgd1').checked='true';
        break;
      case "2":
        document.getElementById('fisikThtTriageIgd2').checked='true';
        break; 
      }

      document.getElementById('fisikAbdomenTriageIgdKet').value=a[i]['abdomen_ket']; 
      switch (a[i]['abdomen']){
      case "1":
        document.getElementById('fisikAbdomenTriageIgd1').checked='true';
        break;
      case "2":
        document.getElementById('fisikAbdomenTriageIgd2').checked='true';
        break; 
      }   

      document.getElementById('fisikLeherTriageIgdKet').value=a[i]['leher_ket'];
      switch (a[i]['leher']){
      case "1":
        document.getElementById('fisikLeherTriageIgd1').checked='true';
        break;
      case "2":
        document.getElementById('fisikLeherTriageIgd2').checked='true';
        break; 
      }

      document.getElementById('fisikGenitaliaTriageIgdKet').value=a[i]['genitalia_ket'];
      switch (a[i]['genitalia']){
      case "1":
        document.getElementById('fisikGenitaliaTriageIgd1').checked='true';
        break;
      case "2":
        document.getElementById('fisikGenitaliaTriageIgd2').checked='true';
        break; 
      }

      document.getElementById('fisikMulutTriageIgdKet').value=a[i]['mulut_ket'];
      switch (a[i]['mulut']){
      case "1":
        document.getElementById('fisikMulutTriageIgd1').checked='true';
        break;
      case "2":
        document.getElementById('fisikMulutTriageIgd2').checked='true';
        break; 
      }

      document.getElementById('fisikThoraxTriageIgdKet').value=a[i]['thoraks_ket'];
      switch (a[i]['thoraks']){
      case "1":
        document.getElementById('fisikThoraxTriageIgd1').checked='true';
        break;
      case "2":
        document.getElementById('fisikThoraxTriageIgd2').checked='true';
        break; 
      }

    }
  })
}

function viewasskepigd(idkunjunganhistori) {

  var param = {
    id: idkunjunganhistori,
  };
  /**/
  apiPOST('Rekammedisigd/datakunjunganrmkeperdetail', param, hasil => {
    var a = hasil['data'];
    for (var i = 0; i < a.length; i++) {
/*        
        $('#RiwayatPenyakitNowTriageIgd').val()=a[i][''];
        $('#RestrainAssKeperawatanErmIgd').val()=a[i][''];
        $('#alasanRestrainAssKeperawatanErmIgd').val()=a[i][''];
        $('#BudayaAssKeperawatanErmIgd').val()=a[i][''];
        $('#KetBudayaAssKeperawatanErmIgd').val()=a[i][''];
        $('#TinggalBersamaAssKeperawatanErmIgd').val()=a[i][''];
        $('#StatusMentalAssKeperawatanErmIgd').val()=a[i][''];
        $('#StatusPsikoAssKeperawatanErmIgd').val()=a[i][''];
      //tanda vital
        $('#KeadaanUmumTriageIgd').val()=a[i][''];
        $('#tipekesadaranasskepermigd').val()=a[i][''];*/

      //end tanda vital
      document.getElementById('keluhanutamaKeperawatanErmIgd').value=a[i]['keluhan_utama'];
      document.getElementById('ermrwjkeperawatanhasilkesimpulan').value=a[i]['ket_resiko_jatuh'];
      document.getElementById('intervensiasskepigd').value=a[i]['intervensi_kep'];
      document.getElementById('Diagnosaasskepigd').value=a[i]['diagnosa_kep'];
      document.getElementById('fisikStatusLocalisTriageIgd').value=a[i]['status_lokalis'];
      document.getElementById('ermrwjkeperawatanbbturun').value=a[i]['skrining_gizi'];
      document.getElementById('ermrwjkeperawatanbbturunkg').value=a[i]['penurunan_bb'];
      document.getElementById('ermrwjkeperawatanpenurunanmakan').value=a[i]['asupan_makan'];
      document.getElementById('ermrwjkeperawatantotalskor').value=a[i]['skor_gizi'];
      document.getElementById('ermrwjkeperawatansaran').value=a[i]['saran_tindakan_gizi'];
      if (a[i]['status_fungsional']=='1') {
        document.getElementById('ermrwjkeperawatanfungsional1').checked='true';
      } else if (a[i]['status_fungsional']=='2') {
        document.getElementById('ermrwjkeperawatanfungsional2').checked='true';
      }else{
       document.getElementById('ermrwjkeperawatanfungsional3').checked='true';
     }

     if (a[i]['cara_berjalan']=='1') {
      document.getElementById('ermrwjkeperawatankeseimbangan1').checked='true';
    } else {
      document.getElementById('ermrwjkeperawatankeseimbangan2').checked='true'; 
    }

    if (a[i]['cara_pegang']=='1') {
      document.getElementById('ermrwjkeperawatanpenopang1').checked='true';
    } else {
      document.getElementById('ermrwjkeperawatanpenopang2').checked='true';
    }

    if (a[i]['resiko_jatuh']=='1') {
      document.getElementById('ermrwjkeperawatanhasilskrining1').checked='true';
    } else if (a[i]['resiko_jatuh']=='2'){
      document.getElementById('ermrwjkeperawatanhasilskrining2').checked='true';
    }else{
      document.getElementById('ermrwjkeperawatanhasilskrining3').checked='true';
    }

    if (a[i]['bicara']=='1') {
      document.getElementById('KebKomBicaraasskepigd1').checked='true';
    } else {
      document.getElementById('KebKomBicaraasskepigd2').checked='true';
    }

    if (a[i]['penerjemah']=='1') {
      document.getElementById('Penerjemahasskepigd1').checked='true';
    } else {
      document.getElementById('Penerjemahasskepigd2').checked='true';
    }
    if (a[i]['bhs_isyarat']=='1') {
      document.getElementById('Isyaratasskepigd1').checked='true';
    } else {
      document.getElementById('Isyaratasskepigd2').checked='true';
    }
    if (a[i]['hambatan']=='1') {
      document.getElementById('HamBelajarasskepigd1').checked='true';
    } else {
      document.getElementById('HamBelajarasskepigd2').checked='true';
    }


    switch (a[i]['skorface']){
    case '0':
      document.getElementById('ermrwjkeperawatanskorface').checked='true';
      break;
    case '1':
      document.getElementById('ermrwjkeperawatanskorface1').checked='true';
      break;
    case '2':
      document.getElementById('ermrwjkeperawatanskorface2').checked='true';
      break;
    case '3':
      document.getElementById('ermrwjkeperawatanskorface3').checked='true';
      break;
    case '4':
      document.getElementById('ermrwjkeperawatanskorface4').checked='true';
      break;
    case '5':
      document.getElementById('ermrwjkeperawatanskorface5').checked='true';
      break;
    case '6':
      document.getElementById('ermrwjkeperawatanskorface6').checked='true';
      break;
    case '7':
      document.getElementById('ermrwjkeperawatanskorface7').checked='true';
      break;
    case '8':
      document.getElementById('ermrwjkeperawatanskorface8').checked='true';
      break;
    case '9':
      document.getElementById('ermrwjkeperawatanskorface9').checked='true';
      break;
    case '10':
      document.getElementById('ermrwjkeperawatanskorface10').checked='true';
      break;
    default:
    }

    document.getElementById('fisikKepalaTriageIgdKet').value=a[i]['kepala_ket'];
    switch (a[i]['kepala']){
    case "1":
      document.getElementById('fisikKepalaTriageIgd1').checked='true';
      break;
    case "2":
      document.getElementById('fisikKepalaTriageIgd2').checked='true';
      break;
    }

    document.getElementById('fisikJantungTriageIgdKet').value=a[i]['jantung_ket'];
    switch (a[i]['jantung']){
    case "1":
      document.getElementById('fisikJantungTriageIgd1').checked='true';
      break;
    case "2":
      document.getElementById('fisikJantungTriageIgd2').checked='true';
      break; 
    }

    switch (a[i]['mata']){
    case "1":
      document.getElementById('fisikMataTriageIgd1').checked='true';
      break;
    case "2":
      document.getElementById('fisikMataTriageIgd2').checked='true';
      break; 
    }
    document.getElementById('fisikMataTriageIgdKet').value=a[i]['mata_ket'];

    document.getElementById('fisikParuTriageIgdKet').value=a[i]['paru_ket'];
    switch (a[i]['paru']){
    case "1":
      document.getElementById('fisikParuTriageIgd1').checked='true';
      break;
    case "2":
      document.getElementById('fisikParuTriageIgd2').checked='true';
      break; 
    }

    document.getElementById('fisikThtTriageIgdKet').value=a[i]['tht_ket'];
    switch (a[i]['tht']){
    case "1":
      document.getElementById('fisikThtTriageIgd1').checked='true';
      break;
    case "2":
      document.getElementById('fisikThtTriageIgd2').checked='true';
      break; 
    }

    document.getElementById('fisikAbdomenTriageIgdKet').value=a[i]['abdomen_ket']; 
    switch (a[i]['abdomen']){
    case "1":
      document.getElementById('fisikAbdomenTriageIgd1').checked='true';
      break;
    case "2":
      document.getElementById('fisikAbdomenTriageIgd2').checked='true';
      break; 
    }   

    document.getElementById('fisikLeherTriageIgdKet').value=a[i]['leher_ket'];
    switch (a[i]['leher']){
    case "1":
      document.getElementById('fisikLeherTriageIgd1').checked='true';
      break;
    case "2":
      document.getElementById('fisikLeherTriageIgd2').checked='true';
      break; 
    }

    document.getElementById('fisikGenitaliaTriageIgdKet').value=a[i]['genitalia_ket'];
    switch (a[i]['genitalia']){
    case "1":
      document.getElementById('fisikGenitaliaTriageIgd1').checked='true';
      break;
    case "2":
      document.getElementById('fisikGenitaliaTriageIgd2').checked='true';
      break; 
    }

    document.getElementById('fisikMulutTriageIgdKet').value=a[i]['mulut_ket'];
    switch (a[i]['mulut']){
    case "1":
      document.getElementById('fisikMulutTriageIgd1').checked='true';
      break;
    case "2":
      document.getElementById('fisikMulutTriageIgd2').checked='true';
      break; 
    }

    document.getElementById('fisikThoraxTriageIgdKet').value=a[i]['thoraks_ket'];
    switch (a[i]['thoraks']){
    case "1":
      document.getElementById('fisikThoraxTriageIgd1').checked='true';
      break;
    case "2":
      document.getElementById('fisikThoraxTriageIgd2').checked='true';
      break; 
    }

  }
})
}
/*menejemen simpan data*/
function simpanAssesmenKeperawatanIgd() {
  var id_unit  =$('#idunitTriageIgd').val();
  if (id_unit=='3002'||id_unit==3002) {
    var rwytmenstruasi  = document.querySelector('input[name=dacrjasesmenneoanak_hmensId]:checked').value;
    var umurenarche     = $('#dacigdasesmenawalmt_hmenarche').val();
    var jmldarahhaid    = $('#dacigdasesmenawalmt_hdarahhaid').val();
    var hsiklushaid     = $('#dacigdasesmenawalmt_hsiklushaid').val();
    var hlamahaid       = $('#dacigdasesmenawalmt_hlamahaid').val();
    var hdesminore      = document.querySelector('input[name=dacigdasesmenawalmt_hdesminore]:checked').value;
    var hkawin          = $('#dacigdasesmenawalmt_hkawin').val();
    var hkawin1usia     = $('#dacigdasesmenawalmt_hkawin1usia').val();
    var husiasuami1     = $('#dacigdasesmenawalmt_husiasuami1').val();
    var hkawin2usia     = $('#dacigdasesmenawalmt_hkawin2usia').val();
    var husiasuami2     = $('#dacigdasesmenawalmt_husiasuami2').val();
    var hobstetrikg     = $('#dacigdasesmenawalmt_hobstetrikg').val();
    var hobstetrikp     = $('#dacigdasesmenawalmt_hobstetrikp').val();
    var hobstetrika     = $('#dacigdasesmenawalmt_hobstetrika').val();
    var htglhpht        = $('#dacigdasesmenawalmt_htglhpht').val();
    var htglsalin       = $('#dacigdasesmenawalmt_htglsalin').val();
    //var hhamiltm1Id     = $('#dacigdasesmenawalmt_hhamiltm1Id').val();
    var hhamiltm1list   = $('#dacigdasesmenawalmt_hhamiltm1list').val();
    var hhamiltm2list   = $('#dacigdasesmenawalmt_hhamiltm2list').val();
    var hginekologilist = $('#dacigdasesmenawalmt_hginekologilist').val();
    var riwayatkblama   = $('#dacigdasesmenawalmt_riwayatkblama').val();
    var riwayatkblist   = $('#dacigdasesmenawalmt_riwayatkblist').val();
    var riwayatkbkomplikasilist = $('#dacigdasesmenawalmt_riwayatkbkomplikasilist').val();
  }
  var param={
    rwytmenstruasi    :rwytmenstruasi,
    umurenarche       :umurenarche,
    jmldarahhaid      :jmldarahhaid,
    hsiklushaid       :hsiklushaid,
    hlamahaid         :hlamahaid,
    hdesminore        :hdesminore,
    hkawin            :hkawin,
    hkawin1usia       :hkawin1usia,
    husiasuami1       :husiasuami1,
    hkawin2usia       :hkawin2usia,
    husiasuami2       :husiasuami2,
    hobstetrikg       :hobstetrikg,
    hobstetrikp       :hobstetrikp,
    hobstetrika       :hobstetrika,
    htglhpht          :htglhpht,
    htglsalin         :htglsalin,
        //hhamiltm1Id       :hhamiltm1Id,
    hhamiltm1list     :hhamiltm1list,
    hhamiltm2list     :hhamiltm2list,
    hginekologilist   :hginekologilist,
    riwayatkblama     :riwayatkblama,
    riwayatkblist     :riwayatkblist,
    riwayatkbkomplikasilist:riwayatkbkomplikasilist,
      id_kunjungan          :$('#idKunjunganTriageIgd').val(),//ok
      keluhanutama          :$('#keluhanutamaKeperawatanErmIgd').val(),
      RiwayatPenyakitNow    :$('#RiwayatPenyakitNowasskepigd').val(),
      Agama                 :$('#AgamaAssKeperawatanErmIgd').val(),
      pekerjaan             :$('#pekerjaanAssKeperawatanErmIgd').val(),
      Restrain              :$('#RestrainAssKeperawatanErmIgd').val(),
      alasanRestrain        :$('#alasanRestrainAssKeperawatanErmIgd').val(),
      Budaya                :$('#BudayaAssKeperawatanErmIgd').val(),
      KetBudaya             :$('#KetBudayaAssKeperawatanErmIgd').val(),
      TinggalBersama        :$('#TinggalBersamaAssKeperawatanErmIgd').val(),
      statusmental          :$('#StatusMentalAssKeperawatanErmIgd').val(),
      statusPsikologis      :$('#StatusPsikoAssKeperawatanErmIgd').val(),
      //tanda vital
      KeadaanUmum           :$('#KeadaanUmumTriageIgd').val(),
      tipekesadaranasskepermigd           :$('#tipekesadaranasskepermigd').val(),
      respirasi             :$('#respirasiAssPerawatigd').val(),
      nadi                  :$('#nadiAssPerawatigd').val(),
      Spo2                  :$('#Spo2AssPerawatigd').val(),
      pupilkiri             :$('#pupilkiriAssPerawatigd').val(),
      pupilkanan            :$('#pupilkananAssPerawatigd').val(),
      tekananDarah1         :$('#tekananDarahAssPerawatigd1').val(), 
      tekananDarah2         :$('#tekananDarahAssPerawatigd2').val(),
      palpasi               :$('#palpasiAssPerawatigd').val(),
      suhu                  :$('#suhuAssPerawatigd').val(),
      reflekCahayaKiri      :$('#reflekCahayaKiriAssPerawatigd').val(),
      reflekCahayaKanan     :$('#reflekCahayaKananAssPerawatigd').val(),
      bb                    :$('#bbAssPerawatigd').val(),
      tinggi                :$('#tinggiAssPerawatigd').val(),
      imt                   :$('#imtAssPerawatigd').val(),
      skor                  :$('#skorassesmenkeperawatanIgd').val(),
      intervensi            :$('#intervensiasskepigd').val(),
      diagnosaKeperawatan   :$('#Diagnosaasskepigd').val(),
      fisikStatusLocalis    :$('#fisikStatusLocalisTriageIgd').val(),
      bbturun               :document.getElementById('ermrwjkeperawatanbbturun').value,
      bbturunkg             :document.getElementById('ermrwjkeperawatanbbturunkg').value,
      penurunanmakan        :document.getElementById('ermrwjkeperawatanpenurunanmakan').value,
      totalskor             :document.getElementById('ermrwjkeperawatantotalskor').value,
      saran                 :document.getElementById('ermrwjkeperawatansaran').value,
      fungsional            :document.querySelector('input[name=ermrwjkeperawatanfungsional]:checked').value,
      keseimbangan          :document.querySelector('input[name=ermrwjkeperawatankeseimbangan]:checked').value,
      penopang              :document.querySelector('input[name=ermrwjkeperawatanpenopang]:checked').value,
      hasilskrining         :document.querySelector('input[name=ermrwjkeperawatanhasilskrining]:checked').value,
      hasilkesimpulan       :document.getElementById('ermrwjkeperawatanhasilkesimpulan').value,
      KebKomBicaraasskepigd :document.querySelector('input[name=KebKomBicaraasskepigd]:checked').value,
      Penerjemahasskepigd   :document.querySelector('input[name=Penerjemahasskepigd]:checked').value,
      Isyaratasskepigd      :document.querySelector('input[name=Isyaratasskepigd]:checked').value,
      HamBelajarasskepigd   :document.querySelector('input[name=HamBelajarasskepigd]:checked').value,
      skorface              :document.querySelector('input[name=ermrwjkeperawatanskorface]:checked').value,
      fisikKepala           :document.querySelector('input[name=fisikkepalaTriageIgd]:checked').value,
      fisikKepalaKet        :$('#fisikKepalaTriageIgdKet').val(),
      fisikJantung          :document.querySelector('input[name=fisikJantungTriageIgd]:checked').value,
      fisikJantungKet       :$('#fisikJantungTriageIgdKet').val(),
      fisikMata             :document.querySelector('input[name=fisikMataTriageIgd]:checked').value,
      fisikMataKet          :$('#fisikMataTriageIgdKet').val(),
      fisikParu             :document.querySelector('input[name=fisikParuTriageIgd]:checked').value,
      fisikParuKet          :$('#fisikParuTriageIgdKet').val(),
      fisikTht              :document.querySelector('input[name=fisikThtTriageIgd]:checked').value,
      fisikThtKet           :$('#fisikThtTriageIgdKet').val(),
      fisikAbdomen          :document.querySelector('input[name=fisikAbdomenTriageIgd]:checked').value,
      fisikAbdomenKet       :$('#fisikAbdomenTriageIgdKet').val(),                           
      fisikLeher            :document.querySelector('input[name=fisikLeherTriageIgd]:checked').value,
      fisikLeherKet         :$('#fisikLeherTriageIgdKet').val(),
      fisikGenitalia        :document.querySelector('input[name=fisikGenitaliaTriageIgd]:checked').value,
      fisikGenitaliaKet     :$('#fisikGenitaliaTriageIgdKet').val(),
      fisikMulut            :document.querySelector('input[name=fisikMulutTriageIgd]:checked').value,
      fisikMulutKet         :$('#fisikMulutTriageIgdKet').val(),
      fisikThorax           :document.querySelector('input[name=fisikThoraxTriageIgd]:checked').value,
      fisikThoraxKet        :$('#fisikThoraxTriageIgdKet').val(),
      id_user               :user.id_pegawai,
      id_unit               :id_unit,
      respon_e              :$('#eyeOpenasskepigd').val(),
      respon_m              :$('#ResponMotorikasskepigd').val(),
      respon_v              :$('#responVerbalasskepigd').val(),
      kegiatan_rl           :$('#rlkegiatanIGD').val(),
      ttd                   :ttdperawat.getData(),

    };
    apiPOST('Rekammedisigd/saveAssesmenKeperawatanIgd',param,hasil=>{

    })
  }

  function simpanResumeigd() {
    if (document.getElementById("CovidResumeErmIrja").checked == true) {
      covid='ya';
    } else {
      covid='tidak';
    }
    if (document.getElementById("alatBntResumeErmIrja").checked == true) {
      alat='ya';
    } else {
      alat='tidak';
    }
    if (document.getElementById("KasusBrResumeErmIRja").checked == true) {
      kasus='ya';
    } else {
      kasus='tidak';
    }
    param={
      id_kunjungan:$('#idKunjunganTriageIgd').val(),
      tgl_masuk :$('#TglMasukResumeErmMedisIrja').val(),
      tgl_keluar:$('#TglKeluarResumeErmMedisIrja').val(),
      dpjp      :$('#dpjpResumeErmMedisIrja').val(),
      cara_masuk:$('#caramasukResumeErmMedisIgd').val(),
      berat_lahir:$('#BBResumeErmMedisIrja').val(),
      tgl       :$('#tglResumeErmMedisIrja').val(),
      riwayat_kesehatan:$('#RiwayatKesResumeErmIrja').val(),
      pemeriksaan_fisik:$('#PemeriksaanFisikResumeErmIrja').val(),
      pemeriksaan_diagnostik:$('#DiagnostikResumeErmIrja').val(),
      terapi    :$('#TerapiResumeErmIrja').val(),
      tindakan  :$('#TindakanResumeErmIrja').val(),
      instruksi :$('#InstruksiResumeErmIrja').val(),
      diagnosis :$('#DiagnosisResumeErmIrja').val(),
      perkembangan_perawatan:$('#PerkembanganResumeErmIrja').val(),
      cara_keluar   :$('#CaraKeluarResumeErmIrja').val(),
      keadaan_umum  :$('#keadaanUmumResumeErmIrja').val(),
      kesadaran     :$('#kesadaranResumeErmIrja').val(),
      mobilitasi_plg:$('#MblplgResumeErmIrja').val(),
      covid     :covid,
      tensi     :$('#tensiResumeErmIrja').val(),
      nadi      :$('#nadiResumeErmIrja').val(),
      alat_bantu:alat,
      kasus_baru:kasus, 
      suhu      :$('#SuhuResumeErmIrja').val(),
      respirasi :$('#RespirasiResumeErmIrja').val(),
      alat_medis_terpasang:$('#AlatMedisResumeErmIrja').val(),
      kegiatan  :'0',
      instruksi_lanjutan:$('#selectInstruksiResumeErmIrja').val(),
      ttd       :ttdresumedokter.getData(),
    };
    apiPOST('Rekammedisigd/saveResumeErmIgd',param,hasil=>{
      if (hasil['pesan']=='Berhasil') {
        alert(hasil['pesan']);
      } else {
        alert(hasil['data']);
      }
    })

  }
  function pegawaiigd() {
    apiPOST('Rawatjalan/pegawai', null,hasil=>{
      var a=hasil['data'];
      var pegawai='';
      for (var i = 0; i < a.length; i++) {
        pegawai+='<option value="'+a[i]['id_pegawai']+'">'+a[i]['nama_pegawai']+'</option>';
      }
      document.getElementById('dpjpResumeErmMedisIrja').innerHTML=pegawai;
    });
  }
  function savetambahalergiSekarang() {
    var param={
      no_rm   :document.getElementById("rmTriageIgd").value,
      id_user :user.id_pegawai,
      alergi  :$('#Modalinputalergitreageigd').val(),
    };
    apiPOST('Kunjungan/tambahalergi',param,hasil=>{
      historialergitreageigd();
    })
  }
  
  function InputSuratPengantarIrna() {
    var param={
      no_rm   :document.getElementById("rmTriageIgd").value,
      id_user :user.id_pegawai,
      alergi  :$('#Modalinputalergitreageigd').val(),
    };
    apiPOST('Kunjungan/suratpengantar',param,hasil=>{
      $('#ModalSuratPengantarInap').modal('hide');
    })
  }
/*  function viewtreage() {
        var param={
      no_rm   :document.getElementById("idKunjunganTriageIgd").value,
      id_user :user.id_pegawai,
    };
    apiPOST('Kunjungan/viewtreage',param,hasil=>{
          tgl_masuk
          jam_datang
          
          id_pegawai
          
          
          asal_masuk
          hub_pemberi_informasi
          nama_pemberi_informasi
          doa
          triage_pasien
          keluhan_utama
          status_laka
          asal_rujukan
          jenis_laka
          tgl_laka
          tempat_laka
          pengatar_laka
                dactriage_atgl            :$('#dactriage_atgl').val()=tgl_masuk,
      ajammasuk                 :$('#ajammasuk').val()=jam_datang,
      ajamperiksa               :$('#ajamperiksa').val()=jam_periksa,
      id_pegawai                : user.id_pegawai,
      selectinfotreage          :$('#selectinfotreage').val()=cara_masuk,
      namawalitreage            :$('#namawalitreage').val()=terima_informasi,
      hubwalitrage              :$('#hubwalitrage').val()=hub_pemberi_informasi,
      selectkecelakaantreage    :$('#selectkecelakaantreage').val(),
      selectjenislakatreage     :$('#selectjenislakatreage').val(),
      tglkecelakaantreage       :$('#tglkecelakaantreage').val(),
      tempatkejadiaantreage     :$('#tempatkejadiaantreage').val(),
      pengatarpasientreage      :$('#pengatarpasientreage').val(),
      dactriage_bmasuk          :$('#dactriage_bmasuk').val(),
      selectrujukantreage       :$('#selectrujukantreage').val(),
      rujukandaritreage         :$('#rujukandaritreage').val(),
      doatreage                 :$('#doatreage').val(),
      Treagekeluhan             :$('#Treagekeluhan').val(),
    })
  }*/
  function treage() {
    if (document.getElementById('dactriage_hlevel1alist_1').checked==true) {
      var dactriage_hlevel1alist_1=1;
    } else {
      var dactriage_hlevel1alist_1='';
    }
    if (document.getElementById('dactriage_hlevel1alist_2').checked==true) {
      var dactriage_hlevel1alist_2=2;
    } else {
      var dactriage_hlevel1alist_2='';
    }
    if (document.getElementById('dactriage_hlevel2alist_1').checked==true) {
      var dactriage_hlevel2alist_1=1;
    } else {
      var dactriage_hlevel2alist_1='';
    }
    if (document.getElementById('dactriage_hlevel2alist_2').checked==true) {
      var dactriage_hlevel2alist_2=2;
    } else {
      var dactriage_hlevel2alist_2='';
    }
    if (document.getElementById('dactriage_hlevel3alist_1').checked==true) {
      var dactriage_hlevel3alist_1=1;
    } else {
      var dactriage_hlevel3alist_1='';
    }
    if (document.getElementById('dactriage_hlevel4alist_1').checked==true) {
      dactriage_hlevel4alist_1=2;
    } else {
      dactriage_hlevel4alist_1='';
    }
    if (document.getElementById('dactriage_hlevel5alist_1').checked==true) {
      dactriage_hlevel5alist_1=1;
    } else {
      dactriage_hlevel5alist_1='';
    }
    if (document.getElementById('dactriage_hlevel1blist_1').checked==true) {
      dactriage_hlevel1blist_1=1;
    } else {
      dactriage_hlevel1blist_1='';
    }
    if (document.getElementById('dactriage_hlevel1blist_2').checked==true) {
      dactriage_hlevel1blist_2=2;
    } else {
      dactriage_hlevel1blist_2='';
    }
    if (document.getElementById('dactriage_hlevel2blist_1').checked==true) {
      dactriage_hlevel2blist_1=2;
    } else {
      dactriage_hlevel2blist_1='';
    }
    if (document.getElementById('dactriage_hlevel2blist_2').checked==true) {
      dactriage_hlevel2blist_2=1;
    } else {
      dactriage_hlevel2blist_2='';
    }
    if (document.getElementById('dactriage_hlevel3blist_1').checked==true) {
      dactriage_hlevel3blist_1=2;
    } else {
      dactriage_hlevel3blist_1='';
    }
    if (document.getElementById('dactriage_hlevel4blist_1').checked==true) {
      dactriage_hlevel4blist_1=1;
    } else {
      dactriage_hlevel4blist_1='';
    }
    if (document.getElementById('dactriage_hlevel5blist_1').checked==true) {
      dactriage_hlevel5blist_1=2;
    } else {
      dactriage_hlevel5blist_1='';
    }
    if (document.getElementById('dactriage_hlevel1clist_1').checked==true) {
      dactriage_hlevel1clist_1=1;
    } else {
      dactriage_hlevel1clist_1='';
    }
    if (document.getElementById('dactriage_hlevel1clist_2').checked==true) {
      dactriage_hlevel1clist_2=2;
    } else {
      dactriage_hlevel1clist_2='';
    }
    if (document.getElementById('dactriage_hlevel1clist_3').checked==true) {
      dactriage_hlevel1clist_3=1;
    } else {
      dactriage_hlevel1clist_3='';
    }
    if (document.getElementById('dactriage_hlevel2clist_1').checked==true) {
      dactriage_hlevel2clist_1=2;
    } else {
      dactriage_hlevel2clist_1='';
    }
    if (document.getElementById('dactriage_hlevel2clist_2').checked==true) {
      dactriage_hlevel2clist_2=1;
    } else {
      dactriage_hlevel2clist_2='';
    }
    if (document.getElementById('dactriage_hlevel2clist_3').checked==true) {
      dactriage_hlevel2clist_3=2;
    } else {
      dactriage_hlevel2clist_3='';
    }
    if (document.getElementById('dactriage_hlevel2clist_4').checked==true) {
      dactriage_hlevel2clist_4=1;
    } else {
      dactriage_hlevel2clist_4='';
    }
    if (document.getElementById('dactriage_hlevel3clist_1').checked==true) {
      dactriage_hlevel3clist_1=2;
    } else {
      dactriage_hlevel3clist_1='';
    }
    if (document.getElementById('dactriage_hlevel3clist_2').checked==true) {
      dactriage_hlevel3clist_2=1;
    } else {
      dactriage_hlevel3clist_2='';
    }
    if (document.getElementById('dactriage_hlevel4clist_1').checked==true) {
      dactriage_hlevel4clist_1=2;
    } else {
      dactriage_hlevel4clist_1='';
    }
    if (document.getElementById('dactriage_hlevel5clist_1').checked==true) {
      dactriage_hlevel5clist_1=1;
    } else {
      dactriage_hlevel5clist_1='';
    }
    if (document.getElementById('dactriage_hlevel1dlist_1').checked==true) {
      dactriage_hlevel1dlist_1=2;
    } else {
      dactriage_hlevel1dlist_1='';
    }
    if (document.getElementById('dactriage_hlevel1dlist_2').checked==true) {
      dactriage_hlevel1dlist_2=1;
    } else {
      dactriage_hlevel1dlist_2='';
    }
    if (document.getElementById('dactriage_hlevel2dlist_1').checked==true) {
      dactriage_hlevel2dlist_1=2;
    } else {
      dactriage_hlevel2dlist_1='';
    }
    if (document.getElementById('dactriage_hlevel2dlist_2').checked==true) {
      dactriage_hlevel2dlist_2=1;
    } else {
      dactriage_hlevel2dlist_2='';
    }
    if (document.getElementById('dactriage_hlevel2dlist_3').checked==true) {
      dactriage_hlevel2dlist_3=2;
    } else {
      dactriage_hlevel2dlist_3='';
    }
    if (document.getElementById('dactriage_hlevel3dlist_1').checked==true) {
      dactriage_hlevel3dlist_1=1;
    } else {
      dactriage_hlevel3dlist_1='';
    }
    if (document.getElementById('dactriage_hlevel3dlist_2').checked==true) {
      dactriage_hlevel3dlist_2=2;
    } else {
      dactriage_hlevel3dlist_2='';
    }
    //
    if (document.getElementById('dactriage_hlevel3dlist_3').checked==true) {
      dactriage_hlevel3dlist_3=1;
    } else {
      dactriage_hlevel3dlist_3='';
    }
    if (document.getElementById('dactriage_hlevel3dlist_4').checked==true) {
      dactriage_hlevel3dlist_4=2;
    } else {
      dactriage_hlevel3dlist_4='';
    }
    if (document.getElementById('dactriage_hlevel4dlist_1').checked==true) {
      dactriage_hlevel4dlist_1=1;
    } else {
      dactriage_hlevel4dlist_1='';
    }
    if (document.getElementById('dactriage_hlevel4dlist_2').checked==true) {
      dactriage_hlevel4dlist_2=2;
    } else {
      dactriage_hlevel4dlist_2='';
    }
    if (document.getElementById('dactriage_hlevel5dlist_1').checked==true) {
      dactriage_hlevel5dlist_1=1;
    } else {
      dactriage_hlevel5dlist_1='';
    }
    if (document.getElementById('dactriage_hlevel5dlist_2').checked==true) {
      dactriage_hlevel5dlist_2=2;
    } else {
      dactriage_hlevel5dlist_2='';
    }

    var param={
      id_kunjungan              :$('#idKunjunganTriageIgd').val(),
    //treage
      id_user :user.id_pegawai,
      dactriage_atgl            :$('#dactriage_atgl').val(),
      ajammasuk                 :$('#ajammasuk').val(),
      ajamperiksa               :$('#ajamperiksa').val(),
      id_pegawai                : user.id_pegawai,
      selectinfotreage          :$('#selectinfotreage').val(),
      namawalitreage            :$('#namawalitreage').val(),
      hubwalitrage              :$('#hubwalitrage').val(),
      selectkecelakaantreage    :$('#selectkecelakaantreage').val(),
      selectjenislakatreage     :$('#selectjenislakatreage').val(),
      tglkecelakaantreage       :$('#tglkecelakaantreage').val(),
      tempatkejadiaantreage     :$('#tempatkejadiaantreage').val(),
      pengatarpasientreage      :$('#pengatarpasientreage').val(),
      dactriage_bmasuk          :$('#dactriage_bmasuk').val(),
      selectrujukantreage       :$('#selectrujukantreage').val(),
      rujukandaritreage         :$('#rujukandaritreage').val(),
      doatreage                 :$('#doatreage').val(),
      Treagekeluhan             :$('#Treagekeluhan').val(),
    //tandavital
      imtTriageIgd              :$('#imtTriageIgd').val(),
      tinggiTriageIgd           :$('#tinggiTriageIgd').val(),
      bbTriageIgd               :$('#bbTriageIgd').val(),
      reflekCahayaKananTriageIgd:$('#reflekCahayaKananTriageIgd').val(),
      reflekCahayaKiriTriageIgd :$('#reflekCahayaKiriTriageIgd').val(),
      suhuTriageIgd             :$('#suhuTriageIgd').val(),
      palpasiTriageIgd          :$('#palpasiTriageIgd').val(),
      tekananDarahTriageIgd2    :$('#tekananDarahTriageIgd2').val(),
      tekananDarahTriageIgd1    :$('#tekananDarahTriageIgd1').val(),
      pupilkananTriageIgd       :document.getElementById('pupilkananTriageIgd').value,
      pupilkiriTriageIgd        :document.getElementById('pupilkiriTriageIgd').value,
      Spo2TriageIgd             :document.getElementById('Spo2TriageIgd').value,
      nadiTriageIgd             :$('#nadiTriageIgd').val(),
      respirasiTriageIgd        :document.getElementById('respirasiTriageIgd').value,
      KeadaanUmumTriageIgd      :$('#KeadaanUmumTriageIgd').val(),
      tipe_kesadaran            :$('#tipekesadarantriage').val(),
      skor_kesadaran            :$('#dacrjasesmentrege_bgcstot').val(),
      dactriage_hlevel          :$('#dactriage_hlevel').val(),
      dactriage_hlevel1alist:dactriage_hlevel1alist_1+''+dactriage_hlevel1alist_2,
      dactriage_hlevel2alist:dactriage_hlevel2alist_1+''+dactriage_hlevel2alist_2, 
      dactriage_hlevel3alist:dactriage_hlevel3alist_1,
      dactriage_hlevel4alist:dactriage_hlevel4alist_1,
      dactriage_hlevel5alist:dactriage_hlevel5alist_1,

      dactriage_hlevel1blist:dactriage_hlevel1blist_1+''+dactriage_hlevel1blist_2,
      dactriage_hlevel2blist:dactriage_hlevel2blist_1+''+dactriage_hlevel2blist_2,
      dactriage_hlevel3blist:dactriage_hlevel3blist_1,
      dactriage_hlevel4blist:dactriage_hlevel4blist_1,
      dactriage_hlevel5blist:dactriage_hlevel5blist_1,

      dactriage_hlevel1clist:dactriage_hlevel1clist_1+''+dactriage_hlevel1clist_2+''+dactriage_hlevel1clist_3,
      dactriage_hlevel2clist:dactriage_hlevel2clist_1+''+dactriage_hlevel2clist_2+''+dactriage_hlevel2clist_3+''+dactriage_hlevel2clist_4,
      dactriage_hlevel3clist:dactriage_hlevel3clist_1+''+dactriage_hlevel3clist_2,
      dactriage_hlevel4clist:dactriage_hlevel4clist_1,
      dactriage_hlevel5clist:dactriage_hlevel5clist_1,

      dactriage_hlevel1dlist:dactriage_hlevel1dlist_1+''+dactriage_hlevel1dlist_2,
      dactriage_hlevel2dlist:dactriage_hlevel2dlist_1+''+dactriage_hlevel2dlist_2+''+dactriage_hlevel2dlist_3,
      dactriage_hlevel3dlist:dactriage_hlevel3dlist_1+''+dactriage_hlevel3dlist_2+''+dactriage_hlevel3dlist_3+''+dactriage_hlevel3dlist_4,
      dactriage_hlevel4dlist:dactriage_hlevel4dlist_1+''+dactriage_hlevel4dlist_2,
      dactriage_hlevel5dlist:dactriage_hlevel5dlist_1+''+dactriage_hlevel5dlist_2,
    };
    apiPOST('Rekammedisigd/saveTreage',param,hasil=>{
      if (hasil['pesan']!='Berhasil') {
        alert(hasil['data']);
      }
    })
  //console.log(param);
  }
  function viewasstreageigd() {
    var param = {
      id_kunjungan: document.getElementById('idKunjunganTriageIgd').value,
    };

    apiPOST('Rekammedisigd/viewasstreage', param, hasil => {
      var z = hasil.data; 

      document.getElementById('KeadaanUmumTriageIgd').value          = z.keadaan_umum;
      document.getElementById('respirasiTriageIgd').value     = z.respirasi;
      document.getElementById('nadiTriageIgd').value          = z.nadi;
      document.getElementById('Spo2TriageIgd').value          = z.spo2;
      document.getElementById('pupilkiriTriageIgd').value     = z.pupil_kiri;
      document.getElementById('pupilkananTriageIgd').value    = z.pupil_kanan;
      document.getElementById('tekananDarahTriageIgd1').value = z.tekanan_darah1;
      document.getElementById('tekananDarahTriageIgd2').value = z.tekanan_darah2;
      document.getElementById('palpasiTriageIgd').value       = z.palpasi;
      document.getElementById('suhuTriageIgd').value          = z.suhu;
      document.getElementById('bbTriageIgd').value            = z.bb;
      document.getElementById('tinggiTriageIgd').value        = z.tinggi_badan;
      document.getElementById('imtTriageIgd').value           = z.imt;
      document.getElementById('reflekCahayaKananTriageIgd').value=z.reflek_cahaya_kanan;
      document.getElementById('reflekCahayaKiriTriageIgd').value=z.reflek_cahaya_kiri;
      document.getElementById('dacrjasesmentrege_bgcstot').value=z.skor_kesadaran;
      document.getElementById('tipekesadarantriage').value    =z.tipe_kesadaran;
      document.getElementById('eyeOpenTriageIgd').value       =z.respon_e;
      document.getElementById('ResponMotorikTriageIgd').value =z.respon_m;
      document.getElementById('responVerbalTriageIgd').value  =z.respon_v;

      var y=hasil['treage'];
      document.getElementById('Treagekeluhan').value =y.keluhan_utama;
      document.getElementById('dactriage_atgl').value=y.tgl_masuk;
      document.getElementById('ajammasuk').value=y.jam_datang;
      document.getElementById('ajamperiksa').value=y.jam_periksa;
      document.getElementById('selectinfotreage').value=y.cara_masuk;
      document.getElementById('namawalitreage').value=y.terima_informasi;
      document.getElementById('hubwalitrage').value=y.hub_pemberi_informasi;
      document.getElementById('doatreage').value=y.doa;
      document.getElementById('selectrujukantreage').value=y.asal_masuk;
      document.getElementById('dactriage_bmasuk').value=y.asal_masuk;
      document.getElementById('rujukandaritreage').value=y.asal_rujukan;
      document.getElementById('dactriage_hlevel').value=y.triage_pasien;
      document.getElementById('Treagekeluhan').value=y.keluhan_utama;
      if (y.tgl_laka>'') {
        document.getElementById('divkecelakaantreage').style.display='block';
        document.getElementById('pengatarpasientreage').value=y.pengatar_laka;
        document.getElementById('tglkecelakaantreage').value=y.tgl_laka;
        document.getElementById('selectjenislakatreage').value=y.jenis_laka;
        document.getElementById('tempatkejadiaantreage').value=y.tempat_laka;
        document.getElementById('selectkecelakaantreage').value=y.status_laka;
      }
      var x=hasil['detailtreage'];
      if (x.airway_level1=="1") {
        document.getElementById('dactriage_hlevel1alist_1').checked=true;

      } else if(x.airway_level1=='2'){
        document.getElementById('dactriage_hlevel1alist_2').checked=true;
      }else if(x.airway_level1=='12'){
        document.getElementById('dactriage_hlevel1alist_1').checked=true;
        document.getElementById('dactriage_hlevel1alist_2').checked=true;
      }else{
        document.getElementById('dactriage_hlevel1alist_1').checked=false;
        document.getElementById('dactriage_hlevel1alist_2').checked=false;
      }


      if (x.airway_level2=='1') {
        document.getElementById('dactriage_hlevel2alist_1').checked=true;

      } else if(x.airway_level2=='2'){
        document.getElementById('dactriage_hlevel2alist_2').checked=true;
      }else if(x.airway_level2=='12'){
        document.getElementById('dactriage_hlevel2alist_1').checked=true;
        document.getElementById('dactriage_hlevel2alist_2').checked=true;
      }else{
        document.getElementById('dactriage_hlevel2alist_1').checked=false;
        document.getElementById('dactriage_hlevel2alist_2').checked=false;
      }


      if (x.airway_level3=='1') {
        document.getElementById('dactriage_hlevel3alist_1').checked=true;
      }
      if (x.airway_level4=='1') {
        document.getElementById('dactriage_hlevel4alist_1').checked=true;
      }
      if (x.airway_level5=='1') {
        document.getElementById('dactriage_hlevel5alist_1').checked=true;
      }


      if (x.breathing_level1=='1') {
       document.getElementById('dactriage_hlevel1blist_1').checked=true; 
     }else if(x.breathing_level1=='12'){
      document.getElementById('dactriage_hlevel1blist_1').checked=true;
      document.getElementById('dactriage_hlevel1blist_2').checked=true;
    }else if(x.breathing_level1=='2'){
      document.getElementById('dactriage_hlevel1blist_2').checked=true;
    }else{
      document.getElementById('dactriage_hlevel1blist_1').checked=false;
      document.getElementById('dactriage_hlevel1blist_2').checked=false;
    }

    if (x.breathing_level2=='1') {
      document.getElementById('dactriage_hlevel2blist_1').checked=true;
    }else if(x.breathing_level2=='2'){
      document.getElementById('dactriage_hlevel2blist_2').checked=true;
    }else if(x.breathing_level2=='12'){
      document.getElementById('dactriage_hlevel2blist_1').checked=true;
      document.getElementById('dactriage_hlevel2blist_2').checked=true;
    }else {
      document.getElementById('dactriage_hlevel2blist_1').checked=false;
      document.getElementById('dactriage_hlevel2blist_2').checked=false;
    }

    if (x.breathing_level3=='1') {
      document.getElementById('dactriage_hlevel3blist_1').checked=true;
    }
    if (x.breathing_level4=='2') {
      document.getElementById('dactriage_hlevel4blist_1').checked=true;
    }
    if (x.breathing_level5=='3') {
      document.getElementById('dactriage_hlevel5blist_1').checked=true;
    }


    switch (x.circulation_level1){
    case "1":
      document.getElementById('dactriage_hlevel1clist_1').checked=true;
      break;
    case "12":
      document.getElementById('dactriage_hlevel1clist_1').checked=true;
      document.getElementById('dactriage_hlevel1clist_2').checked=true;
      break;
    case '123':
      document.getElementById('dactriage_hlevel1clist_1').checked=true;
      document.getElementById('dactriage_hlevel1clist_2').checked=true;
      document.getElementById('dactriage_hlevel1clist_3').checked=true;
      break;
    case '23':
      document.getElementById('dactriage_hlevel1clist_2').checked=true;
      document.getElementById('dactriage_hlevel1clist_3').checked=true;
      break;
    case '3':
      document.getElementById('dactriage_hlevel1clist_3').checked=true;
      break;
    }

    switch (x.circulation_level2){
    case '1':
      document.getElementById('dactriage_hlevel2clist_1').checked=true;
      break;
    case '12':
      document.getElementById('dactriage_hlevel2clist_1').checked=true;
      document.getElementById('dactriage_hlevel2clist_2').checked=true;
      break;
    case '123':
      document.getElementById('dactriage_hlevel2clist_1').checked=true;
      document.getElementById('dactriage_hlevel2clist_2').checked=true;
      document.getElementById('dactriage_hlevel2clist_3').checked=true;
      break;
    case '1234':
      document.getElementById('dactriage_hlevel2clist_1').checked=true;
      document.getElementById('dactriage_hlevel2clist_2').checked=true;
      document.getElementById('dactriage_hlevel2clist_3').checked=true;
      document.getElementById('dactriage_hlevel2clist_4').checked=true;
      break;
    case '234':
      document.getElementById('dactriage_hlevel2clist_2').checked=true;
      document.getElementById('dactriage_hlevel2clist_3').checked=true;
      document.getElementById('dactriage_hlevel2clist_4').checked=true;
      break;
    case '34':
      document.getElementById('dactriage_hlevel2clist_3').checked=true;
      document.getElementById('dactriage_hlevel2clist_4').checked=true;
      break;

    case '4':
      document.getElementById('dactriage_hlevel2clist_4').checked=true;
      break;

    }

    switch (x.circulation_level3){
    case '1':
      document.getElementById('dactriage_hlevel3clist_1').checked=true;
      break;
    case '12':
      document.getElementById('dactriage_hlevel3clist_1').checked=true;
      document.getElementById('dactriage_hlevel3clist_2').checked=true;
      break;
    case '2':
      document.getElementById('dactriage_hlevel3clist_2').checked=true;
      break;
    }

    if (x.circulation_level4=='1') {
      document.getElementById('dactriage_hlevel4clist_1').checked=true;
    }
    if (x.circulation_level5=='1') {
      document.getElementById('dactriage_hlevel5clist_1').checked=true;
    }

    switch (x.disability_level1){
    case '1':
      document.getElementById('dactriage_hlevel1dlist_1').checked=true;
      break;
    case '12':
      document.getElementById('dactriage_hlevel1dlist_1').checked=true;
      document.getElementById('dactriage_hlevel1dlist_2').checked=true;
      break;
    case '2':
      document.getElementById('dactriage_hlevel1dlist_2').checked=true;
      break;
    }

    switch (x.disability_level2){
    case '1':
      document.getElementById('dactriage_hlevel2dlist_1').checked=true;
      break;
    case '12':
      document.getElementById('dactriage_hlevel2dlist_1').checked=true;
      document.getElementById('dactriage_hlevel2dlist_2').checked=true;
      break;
    case '123':
      document.getElementById('dactriage_hlevel2dlist_1').checked=true;
      document.getElementById('dactriage_hlevel2dlist_2').checked=true;
      document.getElementById('dactriage_hlevel2dlist_3').checked=true;
      break;
    case '23':
      document.getElementById('dactriage_hlevel2dlist_3').checked=true;
      document.getElementById('dactriage_hlevel2dlist_2').checked=true;
      break;
    case '3':
      document.getElementById('dactriage_hlevel2dlist_3').checked=true;
      break;
    }

    switch (x.disability_level3){
    case '1':
      document.getElementById('dactriage_hlevel3dlist_1').checked=true;
      break;
    case '12':
      document.getElementById('dactriage_hlevel3dlist_1').checked=true;
      document.getElementById('dactriage_hlevel3dlist_2').checked=true;
      break;
    case '123':
      document.getElementById('dactriage_hlevel3dlist_1').checked=true;
      document.getElementById('dactriage_hlevel3dlist_2').checked=true;
      document.getElementById('dactriage_hlevel3dlist_3').checked=true;
      break;
    case '1234':
      document.getElementById('dactriage_hlevel3dlist_1').checked=true;
      document.getElementById('dactriage_hlevel3dlist_2').checked=true;
      document.getElementById('dactriage_hlevel3dlist_3').checked=true;
      document.getElementById('dactriage_hlevel3dlist_4').checked=true;
      break;
    case '234':
      document.getElementById('dactriage_hlevel3dlist_2').checked=true;
      document.getElementById('dactriage_hlevel3dlist_3').checked=true;
      document.getElementById('dactriage_hlevel3dlist_4').checked=true;
      break;
    case '34':
      document.getElementById('dactriage_hlevel3dlist_3').checked=true;
      document.getElementById('dactriage_hlevel3dlist_4').checked=true;
      break;

    case '4':
      document.getElementById('dactriage_hlevel3dlist_4').checked=true;
      break;

    }

    switch (x.disability_level4){
    case '1':
      document.getElementById('dactriage_hlevel4dlist_1').checked=true;
      break;
    case '12':
      document.getElementById('dactriage_hlevel4dlist_1').checked=true;
      document.getElementById('dactriage_hlevel4dlist_2').checked=true;
      break;
    case '2':
      document.getElementById('dactriage_hlevel4dlist_2').checked=true;
      break;
    }

    switch (x.disability_level5){
    case '1':
      document.getElementById('dactriage_hlevel5dlist_1').checked=true;
      break;
    case '12':
      document.getElementById('dactriage_hlevel5dlist_1').checked=true;
      document.getElementById('dactriage_hlevel5dlist_2').checked=true;
      break;
    case '2':
      document.getElementById('dactriage_hlevel5dlist_2').checked=true;
      break;
    }


  })
}
function simpanHistoriAlergi() {
  var param={
    id_kunjungan  :$('#idKunjunganErmIgd').val(),
    id_jenis      :$('#selectJenisalergi').val(),
    keterangan    :$('#keteranganalergi').val()
  };
  apiPOST('Rekammedisigd/addhistorialergi',param,hasil=>{
    if (hasil['pesan']=='Berhasil') {
      alert(hasil['pesan']);
      $('#ModalPenyakitKeluarga').modal('hide');
    } else {
      alert(hasil['pesan']);
      $('#ModalPenyakitKeluarga').modal('hide');
    }
  })

}
function simpanHistoriPemberianObat() {
  var param={
    id_kunjungan  :$('#idKunjunganErmIgd').val(),
    id_jenis      :$('#selectJenisobat').val(),
    keterangan    :$('#keteranganobat').val()
  };
  apiPOST('Rekammedisigd/addhistoripemberianobat',param,hasil=>{
    if (hasil['pesan']=='Berhasil') {
      alert(hasil['pesan']);
      $('#ModalPenyakitKeluarga').modal('hide');
    } else {
      alert(hasil['pesan']);
      $('#ModalPenyakitKeluarga').modal('hide');
    }
  })
}
function simpanHistoriPenyakitFam() {
  var b  =$('#idKunjunganErmIgd').val();
  var c  =$('#selectJenisPenyakitFam').val();
  var d  =$('#keteranganhistoripenyakitFam').val();
  var skillsSelect = document.getElementById('selectJenisPenyakitFam');
  var selectedText = skillsSelect.options[skillsSelect.selectedIndex].text;
  var param={
    id_kunjungan  :$('#idKunjunganErmIgd').val(),
    id_jenis      :$('#selectJenisPenyakitFam').val(),
    keterangan    :$('#keteranganhistoripenyakitFam').val()
  };
  apiPOST('Rekammedisigd/addhistoripenyakitFam',param,hasil=>{
    if (hasil['pesan']=='Berhasil') {
      alert(hasil['pesan']);
      var a='';
      a+='<tr>';
      a+='<th scope="row">1</th>';
      a+='<td>'+c+'</td>';
      a+='<td>'+selectedText+'</td>';
      a+='<td>'+d+'</td>';
      a+='</tr>';
      $('#ModalPenyakitKeluarga').modal('hide');
    } else {
      alert(hasil['pesan']);
      $('#ModalPenyakitKeluarga').modal('hide');
    }
    $('#tablePenyakitFamili tbody').append(a);
  })
}

function simpanHistoriPenyakitOld() {

  var b  =$('#idKunjunganErmIgd').val();
  var c  =$('#selectJenisPenyakitOld').val();
  var skillsSelect  =document.getElementById("selectJenisPenyakitOld");
  var selectedText = skillsSelect.options[skillsSelect.selectedIndex].text;
  var e  =$('#keteranganhistoripenyakitold').val();
  var param={
    id_kunjungan  :$('#idKunjunganErmIgd').val(),
    id_jenis      :$('#selectJenisPenyakitOld').val(),
    jenis         :$('#selectJenisPenyakitOld').innerHTML,
    keterangan    :$('#keteranganhistoripenyakitold').val(),
  };
  apiPOST('Rekammedisigd/addhistoripenyakitold',param,hasil=>{
    if (hasil['pesan']=='Berhasil') {
      alert(hasil['pesan']);
      var a='';
      a+='<tr><th scope="row">1</th><td>'+c+'</td><td>'+selectedText+'</td><td>'+e+'</td></tr>';

    } else {
      alert(hasil['pesan']);
    }
    $('#tablePenyakitDulu tbody').append(a);
  })
}

function addTabelHistoriPeyakitOld() {

}

function saveSoapKeperawatanIgd() {
  var param={
    saturasi      : $('#cpptsaturasikeperawatanermIgd').val(),
    nadi          : $('#cpptnadikeperawatanermIgd').val(),
    suhu          : $('#cpptsuhukeperawatanermIgd').val(),
    tekanandarah  : $('#cppttekanandarahkeperawatanermIgd').val(),
    Spo2          : $('#cpptSpo2keperawatanermIgd').val(), 
    subjek        : $('#subjekkeperawatanIgd').val(), 
    objek         : $('#objekkeperawatanIgd').val(),
    assesmen      : $('#assesmenTriageIgd').val(),
    planning      : $('#soapintervensiTriageIgd').val(),
    id_pegawai    : user.id_pegawai,
    rm            : $('#unitTriageIgd').val(),
    unit          : $('#idunitTriageIgd').val(),
    id_kunjungan  : $('#idKunjunganTriageIgd').val(),
    instruksi     : '',
  };
  apiPOST('Rekammedisigd/addeErmIgd', param, hasil => {
   if (hasil['pesan']=='Berhasil') {
    alert(hasil['pesan']); 
  }else{
    alert(hasil['data']); 
  }
})
}
/*end simpan data*/

/*fungsi bridging*/
function resumemedisigd(idkunjungan,idunit){
  var param = {
    id_kunjungan    : idkunjungan,
    id_unit         : idunit,
    nama            : $('#namaTriageIgd').val(),
    rm              : $('#rmTriageIgd').val(),
  };
  newTabPOST('API/Laporan/Resume',param);
  return;
}
function selectstatuslocalisermigd() {
  var data = document.getElementById('selectstatuslocalisermigd').value;
  switch (data){
  case "1":
    tesSetGigi();
    break;
  case "2":
    tesSetHati();
    break;
  case "3":
    tesSetPolos();
    break;
  }
}

function tesGetData(){
  var param = {
    gambar: tesPaint.getData()
  };
  newTabPOST('API/Cetak/tesGambar',param);
}

function tesSetGigi(){
  tesPaint.setGambar('gambar/gigi.jpg');return;
  var url = 'gambar/gigi.jpg';
  ttd.setGambarBG(url);
}

function tesSetHati(){
  tesPaint.setGambar('gambar/hati.jpg');return;
  var url = 'gambar/hati.jpg';
  ttd.setGambarBG(url);
}

function tesSetPolos(){
  tesPaint.show();return;
  ttd.setPolosBG();
}
var ttdperawat = new WPaintX('paint_ttdperawat');
var ttddokter = new WPaintX('paint_ttddokter');
var ttdresumedokter = new WPaintX('paint_ttdresumedokter');

function showttdperawat(){
  ttdperawat.show();
}
function showttddokter(){
  ttddokter.show();
}
function showttdresumedokter(){
  ttdresumedokter.show();
}
function serahterimaigd() {
  var id_kunjungan=document.getElementById('idKunjunganTriageIgd').value;
  var id_unit=document.getElementById('idunitTriageIgd').value;
  tampil_dok_all();
  tampil_ruanganlama(id_kunjungan);     
  tampil_spesial();
  tampil_dok_awal(id_unit);
  tampil_rawat_awal(id_unit);
  viewtandavitalserahterima(id_kunjungan);
}
function viewtandavitalserahterima(id_kunjungan) {
  var param = {
    id_kunjungan: id_kunjungan,
  };

  apiPOST('Rekammedisirna/viewtandavitalirja', param, hasil => {
    var x = hasil['data']; 

    document.getElementById('dactranspasien_akeadaan').value = x.keadaan_umum;
    document.getElementById('dactranspasien_crespirasi').value = x.respirasi;
    document.getElementById('dactranspasien_dnadi').value = x.nadi;
    document.getElementById('dactranspasien_hspo2').value = x.spo2;
    document.getElementById('dactranspasien_epupil1').value = x.pupil_kiri;
    document.getElementById('dactranspasien_epupil2').value = x.pupil_kanan;
    document.getElementById('dactranspasien_ftensi1').value = x.tekanan_darah1;
    document.getElementById('dactranspasien_ftensi2').value = x.tekanan_darah2;
    document.getElementById('dactranspasien_fpalpasi').value = x.palpasi;
    document.getElementById('dactranspasien_gsuhu').value = x.suhu;
    document.getElementById('dactranspasien_jbb').value = x.bb;
    document.getElementById('dactranspasien_jtb').value = x.tinggi_badan;

  })
}
function tampil_dok_all(){
  apiPOST('Setup/getDokter', null, hasil => {
    var dok = "<option value=0> - Silahkan Pilih -</option>";
    var a = hasil['data'];
    for (var i = 0; i < a.length; i++) {
      dok += '<option value="' + a[i]['id_pegawai'] + '">' + a[i]['nama_pegawai'] + '</option>';
    }
    document.getElementById('dactranspasien_ddokkon').innerHTML = dok;
  })
}
function tampil_spskamar() {
  apiPOST('Data_Sosial/spesialisasikamar', null, hasil => {
    var sps = "<option value=0> Pilih Spesialisasi </option>";
    var a = hasil['data'];
    for (var i = 0; i < a.length; i++) {
      sps += '<option value="' + a[i]['id_spesialisasi_kamar'] + '">' + a[i]['nama_spesialisasi_kamar'] + '</option>';
    }
    document.getElementById('rwi_sps_kam').innerHTML = sps;
  });
}
function tampil_ruanganlama(id_kunjungan){
  apiPOST('Rekammedisigd/ruangan', id_kunjungan, hasil => {
    var ruang = "";
    var a = hasil['data'];
    for (var i = 0; i < a.length; i++) {
      ruang += '<option value="' + a[i]['id_unit'] + '">' + a[i]['nama_unit'] + '</option>';
    }
    document.getElementById('dactranspasien_aruang1').innerHTML = ruang;
  })
}
function tampil_spesial(){
  apiPOST('Setup/getSpesialisasi', null, hasil => {
    var ruang = "<option value=''> - Silahkan Pilih -</option>";
    var a = hasil['data'];
    for (var i = 0; i < a.length; i++) {
      ruang += '<option value="' + a[i]['id_spesialisasi_kamar'] + '">' + a[i]['nama_spesialisasi_kamar'] + '</option>';
    }
    document.getElementById('serahterima_sps_kam').innerHTML = ruang;
  })
}
function tampil_serahterimarwiunit() {
  var param = {
    id: $("#serahterima_sps_kam").val(),

  };
  apiPOST('Data_Sosial/unitsps', param, hasil => {
    var unit = "<option value=''> *Pilih </option>";
    var a = hasil['data'];
    for (var i = 0; i < a.length; i++) {
      unit += '<option value="' + a[i]['id_unit'] + '">' + a[i]['nama_unit'] + '</option>';
    }
    document.getElementById('rwiserahterimakd_unit').innerHTML = unit;
  });
}
function tampil_rwiserahterimaruang() {
  var param = {
    id: $("#rwiserahterimakd_unit").val(),
    id2: $("#serahterima_sps_kam").val(),
  };
  apiPOST('Data_Sosial/ruangsps', param, hasil => {
    var ruang = "<option value=''> *Pilih </option>";
    var a = hasil['data'];
    for (var i = 0; i < a.length; i++) {
      ruang += '<option value="' + a[i]['id_ruang'] + '">' + a[i]['nama_ruang'] + '</option>';
    }
    document.getElementById('rwiserahterimatr_ruang').innerHTML = ruang;
    tampil_dok_akhir($("#rwiserahterimakd_unit").val());
    tampil_rawat_akhir($("#rwiserahterimakd_unit").val());
  });
}
function tampil_rwiserahterimakamar() {
  var param = {
    id: $("#rwiserahterimatr_ruang").val(),
    id_unit: $("#rwiserahterimakd_unit").val(),
  };
  apiPOST('Data_Sosial/kamarsps', param, hasil => {
    var kamar = "<option value=''> *Pilih </option>";
    var a = hasil['data'];
    for (var i = 0; i < a.length; i++) {
      kamar += '<option value="' + a[i]['id_kamar'] + '">' + a[i]['nama_kamar'] + '  ( ' + a[i]['sisa'] + ' )</option>';
    }
    document.getElementById('serahterimaid_kamar').innerHTML = kamar;
  });
}
$('#serahterimaid_kamar').on('change', function() {
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

function tampil_rawat_awal(param){
  apiPOST('Rekammedisirna/searchPerawat', param, hasil => {
    var sus = "<option value=0> - Silahkan Pilih -</option>";
    var a = hasil['data'];
    for (var i = 0; i < a.length; i++) {
      sus += '<option value="' + a[i]['id_pegawai'] + '">' + a[i]['nama_pegawai'] + '</option>';
    }
    document.getElementById('dactranspasien_apj1Id').innerHTML = sus;
  })
}
function tampil_rawat_akhir(param){
  apiPOST('Rekammedisirna/searchPerawat', param, hasil => {
    var sus = "<option value=0> - Silahkan Pilih -</option>";
    var a = hasil['data'];
    for (var i = 0; i < a.length; i++) {
      sus += '<option value="' + a[i]['id_pegawai'] + '">' + a[i]['nama_pegawai'] + '</option>';
    }
    document.getElementById('dactranspasien_apj2Id').innerHTML = sus;
  })
}
function tampil_dok_awal(param){
  apiPOST('Rekammedisirna/searchDokter', param, hasil => {
    var dok = "<option value=0> - Silahkan Pilih -</option>";
    var a = hasil['data'];
    for (var i = 0; i < a.length; i++) {
      dok += '<option value="' + a[i]['id_pegawai'] + '">' + a[i]['nama_pegawai'] + '</option>';
    }
    document.getElementById('dactranspasien_dok1Id').innerHTML = dok;
  })
}
function tampil_dok_akhir(param){
  apiPOST('Rekammedisirna/searchDokter', param, hasil => {
    var dok = "<option value=0> - Silahkan Pilih -</option>";
    var a = hasil['data'];
    for (var i = 0; i < a.length; i++) {
      dok += '<option value="' + a[i]['id_pegawai'] + '">' + a[i]['nama_pegawai'] + '</option>';
    }
    document.getElementById('dactranspasien_dok2Id').innerHTML = dok;
  })
}
function dactranspasienex_setScore(a, b){
  switch(b){
  case 1:
    document.getElementById('dactranspasien_bgcsa').innerHTML=a;
    break;
  case 2:
    document.getElementById('dactranspasien_bgcsb').innerHTML=a;
    break;
  case 3:
    document.getElementById('dactranspasien_bgcsc').innerHTML=a;
    break;
  default:
  }
  hitungserahtrima();
}
function hitungserahtrima() {
  var a=document.getElementById('dactranspasien_bgcsa').innerHTML;
  var b=document.getElementById('dactranspasien_bgcsb').innerHTML;
  var c=document.getElementById('dactranspasien_bgcsc').innerHTML;

  total=parseInt(a) + parseInt(b) + parseInt(c);
  document.getElementById('dactranspasien_bgcstot').innerHTML=total;
}

function saveSerTerPas(){
  if($('input[name=dactranspasien_plab]:checked').val()=='1'){
    labo=$('input[name=dactranspasien_plabterinfo]:checked').val();
  }else{labo=$('input[name=dactranspasien_plab]:checked').val();}
  if($('input[name=dactranspasien_prad]:checked').val()=='1'){
    radio=$('input[name=dactranspasien_pradterinfo]:checked').val();
  }else{radio=$('input[name=dactranspasien_prad]:checked').val()}
  if($('input[name=dactranspasien_pekg]:checked').val()=='1'){
    ekg=$('input[name=dactranspasien_pekgterinfo]:checked').val();
  }else{ekg=$('input[name=dactranspasien_pekg]:checked').val()}
  if($('input[name=dactranspasien_plain]:checked').val()=='1'){
    lain=$('input[name=dactranspasien_plainterinfo]:checked').val();
  }else{lain=$('input[name=dactranspasien_plain]:checked').val()}
  if($('input[name=dactranspasien_dsambung]:checked').val()=='1'){
    hub=$('#dactranspasien_jamsambung').val();
  }else{hub=$('input[name=dactranspasien_dsambung]:checked').val()}
  if($('input[name=dactranspasien_dsambungpilih]:checked').val()=='1'){
    via=$('#dactranspasien_dsambungpilihket').val();
  }else{via=$('input[name=dactranspasien_dsambungpilih]:checked').val()}
  if($('input[name=dactranspasien_dadvis]:checked').val()=='1'){
    adv=$('#dactranspasien_ketadvis').val();
  }else{adv=$('input[name=dactranspasien_dadvis]:checked').val()}
  var param = {
    unittujuan  :$('#rwiserahterimakd_unit').val(),
    norm    :$('#rmTriageIgd').val(),
    transaksi   :$('#idtransaksiTriageIgd').val(),
    kunjungan   :$('#idKunjunganTriageIgd').val(),
    diagnosa  :$('#dactranspasien_adiag').val(),
    level     :$('#dactranspasien_level').val(),
    asal    :$('#dactranspasien_aruang1').val(),
    id_kamar  :$('#serahterimaid_kamar').val(),
    tgl_pindah  :$('#dactranspasien_atgl').val(),
    rawat_serah :$('#dactranspasien_apj1Id').val(),
    dok_serah   :$('#dactranspasien_dok1Id').val(),
    rawat_terima:$('#dactranspasien_apj2Id').val(),
    dok_terima  :$('#dactranspasien_dok2Id').val(),
    keluhan   :$('#dactranspasien_bkeluhan').val(),
    indikasi  :$('#dactranspasien_bindikasi').val(),
    konsul    :$('#dactranspasien_ddokkon').val(),
    hub_dpjb  :hub,
    hub_via   :via,
    advis:adv,
    dpjpterkonfim:$('input[name=dactranspasien_dsambung]:checked').val(),
    respon_advis:$('input[name=dactranspasien_dadvis]:checked').val(),
    terapi:$('#dactranspasien_drencanaterapi').val(),
    tindakan:$('#dactranspasien_drencanatindakan').val(),
    perhatikan:$('#dactranspasien_dhal').val(),
    keadaan:$('#dactranspasien_akeadaan').val(),
    respirasi:$('#dactranspasien_crespirasi').val(),
    nadi:$('#dactranspasien_dnadi').val(),
    spo2:$('#dactranspasien_hspo2').val(),
    pupil_kiri:$('#dactranspasien_epupil1').val(),
    tensi1:$('#dactranspasien_ftensi1').val(),
    suhu:$('#dactranspasien_gsuhu').val(),
    cahaya_kiri:$('#dactranspasien_ireflek1').val(),
    berat:$('#dactranspasien_jbb').val(),
    tinggi:$('#dactranspasien_jtb').val(),

    skor_sadar:document.getElementById('dactranspasien_bgcstot').innerHTML,
    tipe_sadar:$('#dactranspasien_asadar').val(),
    pupil_kanan:$('#dactranspasien_epupil2').val(),
    cahaya_kanan:$('#dactranspasien_ireflek2').val(),
    tensi2:$('#dactranspasien_ftensi2').val(),
    palpasi:$('#dactranspasien_fpalpasi').val(),

    o2:$('#dactranspasien_po2').val(),
    o2_via:$('#dactranspasien_po2via').val(),
    nyeri:$('input[name=dactranspasien_cnyeriId]:checked').val(),
    skala_nyeri:$('#dactranspasien_nyeri').val(),
    jatuh:$('input[name=dactranspasien_dcederahasilId]:checked').val(),
    tindakan:$('#dactranspasien_cterapi').val(),
    lab:labo,
    rad:radio,
    ekg:ekg,
    lainnya:lain,
    unit:$('#dactranspasien_cpenunjanglain').val(),
  }
  apiPOST('List_erm_irna/saveserahterima', param, hasil => {
  })
}

</script>