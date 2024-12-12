<?php
$nowday     = date('Y-m-d');
$nextday    = date('Y-m-d', strtotime('+1 days', strtotime($nowday)));
?>

<div class="col-md-12 p-2">

  <div class="card card-outline card-danger">
    <div class="overlay-wrapper" id="ermKeperawatanirja_loadingawal">
      <div class="overlay">
        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
      </div>
    </div> 

    <div class="card-body p-2 darkgrey-custom" id='DivERMKeperawatanRWJ'>
      <div class="row row-custom">
        <div class="col-sm-4">
          <div class="form-group ">
            <label>Cari No. RM / Nama Pasien :</label>           
            <input type="search" id="searchPxERMKeperawatanrwj" class="form-control form-control" placeholder="Entry RM..." autocomplete="off">
            <input type="search" class="form-control" placeholder="Entry Nama Pasien..." id="RWJERMKeperawatan_nm_pasiencari" autocomplete="off">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Poliklinik</label>
            <select id="selectpoliuser" onclick="ermirja_listpasien_byunit()" class="form-control"></select>
          </div>         
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Tanggal masuk</label>
            <input type="date" name="tglasskepcariby" id="tglasskepcariby" class="form-control" value="<?php echo date('Y-m-d');?>">
          </div>
        </div>

      </div>
    </div>

    <div class="col-12 p-1">
      <div class="card">
        <div class="card-header p-2 darkgrey-custom" id="DivermKeperawatanirja_listpasien">
          <div class="col-md-12 p-2" id="ermirja_listpasien2">
            <div class="card card-outline">

              <div class="card-body p-1" style="max-height: 420px; overflow: auto;">
                <div class="row" id="ermKeperawatanirja_listpasien">
                </div>
              </div>

            </div>  
          </div>
        </div>
        <div class="card-header p-2 darkgrey-custom" id="ermKeperawatanirja_button" style="display:none;" >
          <div class="row">
            <div class="col-md-10">             
              <div id="DivErmKeperawatan">


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
                    <a class="dropdown-item" href="#" ><i class="fas fa-barcode"></i> Label Barcode</a>
                  </div>
                </div>
                <button type="button" class="btn bg-gradient-secondary btn-xs" type="submit" onclick="tambahpasienrwj()"> <i class="fas fa-user-plus"></i> Pasien Baru</button>
                <button type="button" class="btn bg-gradient-secondary btn-xs" type="submit" onclick="pendafrwjcarisep()"> <i class="fas fa-user-plus"></i> Data SEP</button>
                <button type="button" class="btn bg-gradient-secondary btn-xs" type="submit" onclick="kembaliErmKeperawatanIrja()"> <i class="fas fa-arrow-left"></i> Kembali</button>
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
        <div class="card-body p-1" id="DivPasienErmKeperawatanIrja" style="display: none; ">
          <div class="card card-info card-outline p-2">
            <div class="row">
              <div class="col-sm-3">  
                <label class="form-label" style="font-size:14px;"> No Rm:
                </label>
                <input type="text" name="rmErmKeperawatanIrja" id="rmErmKeperawatanIrja" class="form-control form-control-xs">
              </div>
              <div class="col-sm-5">  
                <label class="form-label" style="font-size:14px;"> Nama Pasien:
                </label>
                <input type="text" name="namaErmKeperawatanIrja" id="namaErmKeperawatanIrja" class="form-control form-control-xs">
              </div>
              <div class="col-sm-2">  
                <label class="form-label" style="font-size:14px;"> Poliklinik:
                </label>
                <input type="text" name="unitErmKeperawatanIrja" id="unitErmKeperawatanIrja" class="form-control form-control-xs">
                <input type="hidden" name="idKunjunganErmKeperawatanIrja" id="idKunjunganErmKeperawatanIrja">
                <input type="text" name="idTransaksiErmKeperawatanIrja" id="idTransaksiErmKeperawatanIrja">
                <input type="hidden" name="idunitErmKeperawatanIrja" id="idunitErmKeperawatanIrja">
              </div>
            </div>
          </div>
          <div class="card-body p-1" id="DivPendafDetailKeperawatanRWJ" style="display: none;">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="pill" id="linkassesKepErmKeperawatanIrja" href="#assesKepErmKeperawatanIrja" onclick="viewtandavitalperawatirja()">Assesmen Keperawatan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="soapikepermirja" data-toggle="pill" href="#SOAPIErmKeperawatanIrja" onclick="ReviewsoapkepErmIrja()">SOAP I</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="pill" onclick="onCall_MonitorHD()" href="#rwjpelayananhd">Monitoring HD</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="pill" onclick="tampilkeperawatanpenunjangradiologiirja();" href="#riwayatpenunjangasskepermrwj">Histori Penunjang</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#riwayattabasskepermrwj" onclick="tampilkunjunganpasienaskepermrwj()">History Kunjungan</a>
              </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane p-1 fade" id="riwayattabasskepermrwj" role="tabpanel">
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
                    <div id='listkunjunganasskepermrwj'>

                      <!-- akhir div id -->
                    </div>
                  </div>

                </div>
              </div>
              <div class="tab-pane p-1 fade" id="rwjpelayananhd" role="tabpanel">
                <div class="viewMonitoringHD"></div>
              </div>
              <div class="tab-pane p-1 fade" id="riwayatpenunjangasskepermrwj" role="tabpanel">
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
                   <div id='listhistorikeperawatanpenunjangirja'>

                    <!-- akhir div id -->
                  </div>
                </div>
                <div class="col-md-12" style="padding-top: 10px;">
                  <div id='listhistorikeperawatanpenunjangradirja'>

                    <!-- akhir div id -->
                  </div>
                </div>

              </div>
            </div>
            <div class="tab-pane p-1 fade active show" id="assesKepErmKeperawatanIrja" role="tabpanel">
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
                      <textarea class="form-control " id="keluhanutamaKeperawatanErmIrja"></textarea>
                      <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4 p2">
                      <label class="form-label">Riwayat Penyakit Sekarang *</label>&nbsp;&nbsp;&nbsp;<label><span class="badge bg-primary rounded-pill" onclick="penyakitKeperawatansekarang()" title="autocomplete">auto</span></label>&nbsp;<label><span class="badge bg-primary rounded-pill" onclick="showmodaltambahpenyakitKeperawatansekarang()" title="tambah icd">Tambah</span></label>
                    </div>
                    <div class="col-md-8 p2">
                      <textarea class="form-control " id="RiwayatPenyakitNowErmKeperawatanIrja"></textarea>
                      <div id="DivKeperawatanRiwayatPenyakitSekarang"></div>
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
                        <tbody id="bodyhistoripenyakitasskepermrwj"></tbody>
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
                        <tbody id="bodyhistoripenyakitkelasskepermrwj"></tbody>
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
                        <tbody id="bodyhistoriobatasskepermrwj"></tbody>
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
                        <tbody id="bodyhistorialergiasskepermrwj"></tbody>
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
                    <div class="col-md-6">
                      <select class="form-control form-control-xs" id="AgamaAssKeperawatanErmIrja">

                      </select>
                    </div>
                    <div class="col-md-4">
                      <label class="form-label">Pekerjaan :</label>
                    </div>
                    <div class="col-md-6">
                      <select class="form-control form-control-xs" id="pekerjaanAssKeperawatanErmIrja">

                      </select>
                    </div>
                    <div class="col-md-4">
                      <label class="form-label">Tinggal Bersama :</label>
                    </div>
                    <div class="col-md-6">
                      <select class="form-control form-control-xs" id="TinggalBersamaAssKeperawatanErmIrja">
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
                      <select class="form-control form-control-xs" id="StatusMentalAssKeperawatanErmIrja">
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
                      <select class="form-control form-control-xs" id="StatusPsikoAssKeperawatanErmIrja">
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
                      <select class="form-control form-control-xs" id="RestrainAssKeperawatanErmIrja" onchange="tampilasalanrestrain()">
                        <option value="1">Tidak</option>
                        <option value="2">Ya, Alasan</option>
                      </select>
                      <div style="display: none;" id="DivalasanRestrainAssKeperawatanErmIrja">
                        <input type="text"  class="form-control form-control-xs" name="alasanRestrainAssKeperawatanErmIrja" >
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label class="form-label">Budaya Yang Dianut :</label>
                    </div>
                    <div class="col-md-6">
                      <select class="form-control form-control-xs" id="BudayaAssKeperawatanErmIrja" onchange="tampilBudayaAnut()">
                        <option value="1">Tidak</option>
                        <option value="2">Ya</option>
                      </select>
                      <div style="display: none;" id="DivKetBudayaAssKeperawatanErmIrja">
                        <input type="text" class="form-control form-control-xs" name="KetBudayaAssKeperawatanErmIrja">
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
<!--                               <select class="form-control form-control-xs" id="KeadaanUmumAssKeperawatanIrja">
                                <option value="1">Baik</option>
                                <option value="2">Sedang</option>
                                <option value="3">Berat</option>
                              </select> -->
                              <input type="text" name="KeadaanUmumAssKeperawatanIrja" id="KeadaanUmumAssKeperawatanIrja" class="form-control form-control-xs">
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <label>Respirasi</label>
                            </td>
                            <td>
                              <div class="input-group">
                                <input type="text" class="form-control form-control-xs" id="respirasiAssKeperawatanIrja">
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
                                <input type="text" class="form-control form-control-xs" id="nadiAssKeperawatanIrja">
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
                                <input type="text" class="form-control form-control-xs" id="Spo2AssKeperawatanIrja">
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
                                <input type="number" class="form-control form-control-xs" id="pupilkiriAssKeperawatanIrja">
                                <div class="input-group-prepend">
                                  <span >kanan </span>
                                </div>
                                <input type="number" class="form-control form-control-xs" id="pupilkananAssKeperawatanIrja">
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
                                <input type="number" class="form-control form-control-xs" id="tekananDarahErmKeperawatanIrja1"><h3>/</h3>
                                <input type="number" class="form-control form-control-xs" id="tekananDarahErmKeperawatanIrja2">
                                <div class="input-group-prepend">
                                  <span>mmHg</span>
                                </div>
                              </div>
                              <div class="input-group">
                                <input type="text" placeholder="Diisi jika Palpasi" class="form-control form-control-xs" id="palpasiErmKeperawatanIrja" >
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
                                <input type="text" class="form-control form-control-xs" id="suhuErmKeperawatanIrja" >
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
                                <select class="form-control form-control-xs" id="reflekCahayaKiriErmKeperawatanIrja" >
                                  <option value="1">-</option>
                                  <option value="2">+</option>
                                </select>
                                <div class="input-group-prepend">
                                  <span >kanan</span>
                                </div>
                                <select class="form-control form-control-xs" id="reflekCahayaKananErmKeperawatanIrja">
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
                                <input type="number" id="bbErmKeperawatanIrja" class="form-control form-control-xs">
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
                                <input type="number" onchange="hitungimtkepirja()" onclick="hitungimtkepirja()" class="form-control form-control-xs" id="tinggiErmKeperawatanIrja" >
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
                                <input type="number" class="form-control form-control-xs" id="imtErmKeperawatanIrja" readonly>
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
                              <input type="text" name="eyeOpenErmKeperawatanIrja" id="eyeOpenErmKeperawatanIrja" class="form-control" value="4">
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
                      <input type="text" name="ResponMotorikErmKeperawatanIrja" id="ResponMotorikErmKeperawatanIrja" class="form-control" value="6">
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
          <input type="text" name="responVerbalErmKeperawatanIrja" id="responVerbalErmKeperawatanIrja" class="form-control" value="5">
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
    <select class="form-control" id="tipekesadaranasskepermrwj">
      <option value="1">Compos mentis</option>
      <option value="2">Apatis</option>
      <option value="3">Somnolen</option>
      <option value="4">Delirium</option>
      <option value="5">Sopor</option>
      <option value="6">Coma</option>
    </select>
  </td>
  <td>
    <input type="text" class="form-control" name="dacrjasesmenkeperawatan_bgcstot" id="dacrjasesmenkeperawatan_bgcstot" value="15">
  </td>
</tr>
</tbody>
</table>
</div>
</div>
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
                <input type="radio" name="fisikKepalaErmKeperawatanIrja" id="fisikKepalaErmKeperawatanIrja2" onclick="document.getElementById('fisikKepalaErmKeperawatanIrjaKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikKepalaErmKeperawatanIrjaKet" id="fisikKepalaErmKeperawatanIrjaKet" style="display:none;">
                <input type="radio" name="fisikKepalaErmKeperawatanIrja" id="fisikKepalaErmKeperawatanIrja1" onclick="document.getElementById('fisikKepalaErmKeperawatanIrjaKet').style.display='none'" checked='true' value="1">Normal
              </td>
              <td>
                Jantung
              </td>
              <td>
                <input type="radio" name="fisikJantungErmKeperawatanIrja" id="fisikJantungErmKeperawatanIrja2" onclick="document.getElementById('fisikJantungErmKeperawatanIrjaKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikJantungErmKeperawatanIrjaKet" id="fisikJantungErmKeperawatanIrjaKet" style="display:none;">
                <input type="radio" name="fisikJantungErmKeperawatanIrja" id="fisikJantungErmKeperawatanIrja1" onclick="document.getElementById('fisikJantungErmKeperawatanIrjaKet').style.display='none'" checked='true' value="1">Normal
              </td>
            </tr>
            <tr>
              <td>
                Mata
              </td>
              <td>
                <input type="radio" name="fisikMataErmKeperawatanIrja" id="fisikMataErmKeperawatanIrja2" onclick="document.getElementById('fisikMataErmKeperawatanIrjaKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikMataErmKeperawatanIrjaKet" id="fisikMataErmKeperawatanIrjaKet" style="display:none;">
                <input type="radio" name="fisikMataErmKeperawatanIrja" id="fisikMataErmKeperawatanIrja1" onclick="document.getElementById('fisikMataErmKeperawatanIrjaKet').style.display='none'" value="1" checked='true'>Normal
              </td>
              <td>
                Paru
              </td>
              <td>
                <input type="radio" name="fisikParuErmKeperawatanIrja" id="fisikParuErmKeperawatanIrja2" onclick="document.getElementById('fisikParuErmKeperawatanIrjaKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikParuErmKeperawatanIrjaKet" id="fisikParuErmKeperawatanIrjaKet" style="display:none;">
                <input type="radio" name="fisikParuErmKeperawatanIrja" id="fisikParuErmKeperawatanIrja1" onclick="document.getElementById('fisikParuErmKeperawatanIrjaKet').style.display='none'" value="1" checked='true'>Normal
              </td>
            </tr>
            <tr>
              <td>
                THT
              </td>
              <td> 
                <input type="radio" name="fisikThtErmKeperawatanIrja" id="fisikThtErmKeperawatanIrja2" onclick="document.getElementById('fisikThtErmKeperawatanIrjaKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikThtErmKeperawatanIrjaKet" id="fisikThtErmKeperawatanIrjaKet" style="display:none;">
                <input type="radio" name="fisikThtErmKeperawatanIrja" id="fisikThtErmKeperawatanIrja1" onclick="document.getElementById('fisikThtErmKeperawatanIrjaKet').style.display='none'" value="1" checked='true'>Normal
              </td>
              <td>
                Ambomen
              </td>
              <td>
                <input type="radio" name="fisikAbdomenErmKeperawatanIrja" id="fisikAbdomenErmKeperawatanIrja2" onclick="document.getElementById('fisikAbdomenErmKeperawatanIrjaKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikAbdomenErmKeperawatanIrjaKet" id="fisikAbdomenErmKeperawatanIrjaKet" style="display:none;">
                <input type="radio" name="fisikAbdomenErmKeperawatanIrja" id="fisikAbdomenErmKeperawatanIrja1" onclick="document.getElementById('fisikAbdomenErmKeperawatanIrjaKet').style.display='none'" value="1" checked='true'>Normal
              </td>
            </tr>
            <tr>
              <td>
                Leher
              </td>
              <td>
                <input type="radio" name="fisikLeherErmKeperawatanIrja" id="fisikLeherErmKeperawatanIrja2" onclick="document.getElementById('fisikLeherErmKeperawatanIrjaKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikLeherErmKeperawatanIrjaKet" id="fisikLeherErmKeperawatanIrjaKet" style="display:none;">
                <input type="radio" name="fisikLeherErmKeperawatanIrja" id="fisikLeherErmKeperawatanIrja1" onclick="document.getElementById('fisikLeherErmKeperawatanIrjaKet').style.display='none'" value="1" checked='true'>Normal
              </td>
              <td>
                Genitalia
              </td>
              <td>
                <input type="radio" name="fisikGenitaliaErmKeperawatanIrja" id="fisikGenitaliaErmKeperawatanIrja2" onclick="document.getElementById('fisikGenitaliaErmKeperawatanIrjaKet').style.display='block'" value="2" >Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikGenitaliaErmKeperawatanIrjaKet" id="fisikGenitaliaErmKeperawatanIrjaKet" style="display:none;">
                <input type="radio" name="fisikGenitaliaErmKeperawatanIrja" id="fisikGenitaliaErmKeperawatanIrja1" onclick="document.getElementById('fisikGenitaliaErmKeperawatanIrjaKet').style.display='none'" value="1" checked='true'>Normal
              </td>
            </tr>
            <tr>
              <td>
                Mulut
              </td>
              <td>
                <input type="radio" name="fisikMulutErmKeperawatanIrja" id="fisikMulutErmKeperawatanIrja2" onclick="document.getElementById('fisikMulutErmKeperawatanIrjaKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikMulutErmKeperawatanIrjaKet" id="fisikMulutErmKeperawatanIrjaKet" style="display:none;">
                <input type="radio" name="fisikMulutErmKeperawatanIrja" id="fisikMulutErmKeperawatanIrja1" onclick="document.getElementById('fisikMulutErmKeperawatanIrjaKet').style.display='none'" value="1" checked='true'>Normal
              </td>
              <td>
                Status Localis
              </td>
              <td>
                <textarea class="form-control " id="fisikStatusLocalisErmKeperawatanIrja"></textarea>
              </td>
            </tr>
            <tr>
              <td>
                Thorax
              </td>
              <td colspan="3">
                <input type="radio" name="fisikThoraxErmKeperawatanIrja" onclick="document.getElementById('fisikThoraxErmKeperawatanIrjaKet').style.display='block'" id="fisikThoraxErmKeperawatanIrja2" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs"  name="fisikThoraxErmKeperawatanIrjaKet" id="fisikThoraxErmKeperawatanIrjaKet" style="display:none;"><br>
                <input type="radio" name="fisikThoraxErmKeperawatanIrja" id="fisikThoraxErmKeperawatanIrja1" onclick="document.getElementById('fisikThoraxErmKeperawatanIrjaKet').style.display='none'" value="1" checked='true'>Norma
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
<div class="card card-default" id="divriwayatmensirja" style="display:none;">
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
<div class="card card-default" id="divskringigizianakirja" style="display:none;">
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
<div class="card card-default" id="divskrininggizidewasairja">
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
            <input type="radio" name="ermrwjkeperawatankeseimbangan" id="ermrwjkeperawatankeseimbangan1" checked='true' value="1">&nbsp;<label> Tidak</label>&nbsp;&nbsp;<input type="radio" id="ermrwjkeperawatankeseimbangan2" name="ermrwjkeperawatankeseimbangan" value="2">&nbsp;<label> Ya</label> 
          </div>
          <div>
            <label class="form-label">b. Apakah pasien memegang pinggiran kursi atau meja atau benda lain sebagai penopang saat akan duduk</label>
            <input type="radio" name="ermrwjkeperawatanpenopang" id="ermrwjkeperawatanpenopang1" value="1" checked="true">&nbsp;<label> Tidak</label>&nbsp;&nbsp;<input type="radio" id="ermrwjkeperawatanpenopang2" name="ermrwjkeperawatanpenopang" value="2">&nbsp;<label> Ya</label>
          </div>
        </div>
        <div class="col-md-6">
          <div>
            <label class="form-label">Hasil</label>
            <input type="radio" name="ermrwjkeperawatanhasilskrining" id="ermrwjkeperawatanhasilskrining1" value="1" checked='true'>
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
          <div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorface" value="0" checked='true'><label>0</label></div>
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
              <input type="radio" name="KebKomBicaraErmKeperawatanIrja" onclick="document.getElementById('DivPenjelasErmKeperawatanIrja').style.display='none'" value="1" id="PenerjemahErmKeperawatanIrja1" checked='true'>
              <label>Normal</label>
            </div>
            <div>                          
              <input type="radio" name="PenerjemahErmKeperawatanIrja" value="1" checked='true'>
              <label>Tidak</label>
            </div>
            <div>                          
              <input type="radio" name="IsyaratErmKeperawatanIrja" value="1" checked='true'>
              <label>Tidak</label>
            </div>
          </div>
          <div class="col-md-2">
            <div>
              <input type="radio" name="KebKomBicaraErmKeperawatanIrja" onclick="KebKomBicaraErmKeperawatanIrja()" value="2" id="PenerjemahErmKeperawatanIrja2">
              <label>Gangguan bicara, Jelaskan</label>
              <div id="DivPenjelasErmKeperawatanIrja" style="display:none;">
                <input type="text" name="PenjelasErmKeperawatanIrja">
              </div>
            </div>
            <div>
              <input type="radio" name="PenerjemahErmKeperawatanIrja" value="2">
              <label>Ya, Bahasa</label>
            </div>
            <div>
              <input type="radio" name="IsyaratErmKeperawatanIrja" value="2">
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
              <input type="radio" name="HamBelajarErmKeperawatanIrja" value="1" checked='true'> 
              <label>Tidak</label>
            </div>
            <div>
              <input type="radio" name="TinPendidikanErmKeperawatanIrja" value="1" checked='true'>
              <label>Tidak</label>
            </div>
            <div>
              <input type="radio" name="TinPendidikanErmKeperawatanIrja" value="2">
              <label>SMP</label>
            </div>
            <div>
              <input type="radio" name="TinPendidikanErmKeperawatanIrja" value="3">
              <label>Perguruan Tinggi</label>
            </div>
          </div>
          <div class="col-md-2">
            <div>
              <input type="radio" name="HamBelajarErmKeperawatanIrja" value="2">
              <label>Ya</label>
            </div>
            <div>
              <input type="radio" name="TinPendidikanErmKeperawatanIrja" value="4">
              <label>SD</label>
            </div>
            <div>
              <input type="radio" name="TinPendidikanErmKeperawatanIrja" value="5">
              <label>SMA</label>
            </div>
            <div>
              <input type="radio" name="TinPendidikanErmKeperawatanIrja" value="6">
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
            <textarea class="form-control" id="intervensiErmKeperawatanIrja"></textarea>
            <div id="DivintervensiErmKeperawatanIrja" style="position:relative;"></div>
          </div> 
          <div class="col-md-12">   
            <h5>Diagnosa Keperawatan</h5>                  
            <textarea class="form-control" id="DiagnosaErmKeperawatanIrja"></textarea>
            <div id="DivDiagnosaErmKeperawatanIrja"></div>
          </div>
          <div class="col-md-12">
            <button class="btn btn-primary" onclick="tampilKomunikasiPengajaranKep()">Diagnosa Perawat</button>
          </div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="row">
        <div class="col-sm-6" style="text-align: center;">
          <label>Perawat</label><br>
          <img id="ImgTtdAssesmenPerawatIrja" style="width:200px;height:200px;">
          <input type="hidden" name="HasilAssesmenPerawatIrja" id="HasilTtdAssesmenPerawatIrja">
          <input style="text-align: center;" type="text" name="dpjpasskep" id="dpjpasskep" class="form-control" readonly><br>
          <button class="btn btn-primary" onclick="ShowModalTtdAssesmenPerawatIrja()">TTD</button>
        </div>
        <div class="col-sm-6" style="text-align: center;">
          <label>Pesien</label><br>
          <img id="ImgTtdAssesmenPasienIrja" style="width:200px;height:200px;">
          <input type="hidden" name="HasilAssesmenPasienIrja" id="HasilTtdAssesmenPasienIrja">
          <input style="text-align: center;" type="text" name="ttdassesmenkepirjapasien" id="ttdassesmenkepirjapasien" class="form-control" ><br>
          <button class="btn btn-primary" onclick="ShowModalTtdAssesmenPasienIrja()">TTD</button>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="row">
        <div class="col-md-6 p-2">
          <button type="button" class="btn btn-primary" type="submit" onclick="simpanAssesmenKeperawatanIrja();"> <i class="fas fa-save"></i> Simpan Assesmen</button>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="tab-pane p-1 fade" id="tanggungjawabErmKeperawatanIrja" role="tabpanel">
  <h6 class="lead mb-0"><u></u></h6>
  <div class="row">
    <div class="col-sm-2">
      <div class="form_group">
        <label>Nama Penanggung Jawab</label>
        <input type="text" name="ErmKeperawatanIrjapenanggungjawab" id="ErmKeperawatanIrjapenanggungjawab" class="form-control form-control-xs">      
      </div>
    </div>
    <div class="col-sm-4">
      <div class="form_group ">
        <label>Hubungan Penanggung Jawab</label>
        <input type="text" name="ErmKeperawatanIrjahubpenanggungjawab" id="ErmKeperawatanIrjahubpenanggungjawab" class="form-control form-control-xs">      
      </div>
    </div>
    <div class="col-sm-2">
      <div class="form_group ">
        <label>NIK</label>
        <input type="text" name="ErmKeperawatanIrjanikpenanggungjawab" id="ErmKeperawatanIrjanikpenanggungjawab" class="form-control form-control-xs">      
      </div>
    </div>
    <div class="col-sm-2">
      <div class="form_group ">
        <label>Alamat</label>
        <input type="text" name="ErmKeperawatanIrjaalamatpenanggungjawab" id="ErmKeperawatanIrjaalamatpenanggungjawab" class="form-control form-control-xs">      
      </div>
    </div>
    <div class="col-sm-2">
      <div class="form_group ">
        <label>No. Telp</label>
        <input type="text" name="ErmKeperawatanIrjatlfpenanggungjawab" id="ErmKeperawatanIrjatlfpenanggungjawab" class="form-control form-control-xs">      
      </div>
    </div>
  </div>
</div>

<div class="tab-pane p-1 fade" id="SOAPIErmKeperawatanIrja" role="tabpanel">

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
          <input type="text" class="form-control form-control-xs" name="cppttekanandarahkepermirja" id="cppttekanandarahkepermirja" >
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
          <input type="text" class="form-control form-control-xs" name="cpptsuhukepermirja" id="cpptsuhukepermirja">
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
          <input type="text" class="form-control form-control-xs" name="cpptnadikepermirja" id="cpptnadikepermirja" >
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
          <input type="text" class="form-control form-control-xs" name="cpptsaturasikepermirja" id="cpptsaturasikepermirja">
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
          <input type="text" class="form-control form-control-xs" name="cpptSpo2kepermirja" id="cpptSpo2kepermirja" >
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
            <button type="button" class="btn bg-gradient-secondary btn-xs" type="submit" onclick="show_cri_subjek_kep()"> <i class="fas fa-plus"></i> Simpan</button>
            <textarea class="form-control" id="subjekkepirja" style="height:100px; width: 100%;" ></textarea>
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

            <button type="button" class="btn bg-gradient-secondary btn-xs" type="button" onclick="document.getElementById('objekkepirja').value=''"> <i class="fas fa-times"></i> Clear</button>

            <textarea class="form-control" id="objekkepirja" style="height:100px; width: 100%;" ></textarea>
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
            <textarea class="form-control" id="assesmenErmKeperawatanIrja" style="height:100px; width: 100%;" ></textarea>
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
            <button type="button" class="btn bg-gradient-secondary btn-xs" type="button" onclick="document.getElementById('soapintervensiErmKeperawatanIrja').value=''"> <i class="fas fa-times"></i>Clear</button>
            <textarea class="form-control" style="height:100px; width: 100%;" id="soapintervensiErmKeperawatanIrja"></textarea>
          </div>
        </div>
      </td> 
    </tr>
    <tr style="border:2px solid black; margin: 5px;">
      <td>
        <div class="row p-1">
          <div class="col-sm-4" >
            <h4>INSTRUKSI</h4>
          </div>
          <div class="col-sm-8">
            <button type="button" class="btn bg-gradient-secondary btn-xs" type="button" onclick="document.getElementById('instruksiermirja').value='' "> <i class="fa fa-times"></i> Clear</button>
            <textarea class="form-control" style="height:50px; width: 100%;" id="instruksikepermirja"></textarea>
          </div>
        </div>
      </td> 
    </tr>
  </table>
  <button type="button" class="btn bg-gradient-secondary btn-xs" type="submit" onclick="saveSoapKeperawatanIrja()">Simpan Soap</button> 
</div>

<div class="tab-pane p-1 fade" id="ErmKeperawatanIrjariwayatpenyakit" role="tabpanel">
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

<div class="tab-pane p-1 fade" id="ErmKeperawatanIrjahistorykunjungan" role="tabpanel">
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
<div class="modal fade"  id="ModalTambahIcdPenyakitSekarang" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header"></div>
      <div class="modal-body">
        <input type="text" name="" id="ModalinputPenyakitSekarangErmIrja" class="form-control">
        <div id="ModalDivPenyakitSekarangErmIrja"></div>
      </div>
      <div class="modal-footer">
        <button onclick="InputTextAreaPenyakitSekarang()">Simpan</button>
        <button >Close</button>
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
        <div id="DivTableDiagnosaErmKeperawatanIrja">
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
        <div id="DivTableintervensiErmKeperawatanIrja">
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
<div class="modal fade" id="ModalPermintaanLabIrja">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">        
        <h4>Permintaan Laboratorium</h4>
      </div>
      <div class="modal-body">
        <div class="row"  style="height: 500px;  overflow-y: scroll;">
          <div class="col-md-6 p-2">
            <div class="card">
              <div class="card-header">
                <label class="col-form-label font-weight-bold">HEMATOLOGI</label>
              </div>
              <div class="card-body" style="height: 250px;  overflow-y: scroll;">
                <div class="row">
                  <div class="col-md-12">
                    <div class="row" id="lacrequestlabemrdiag_grouptest_1">
                      <div class="col-md-6">
                        <div class="form-group">
                          <div class="custom-control custom-checkbox ">
                            <input name="lacrequestlabemrdiag_test" value="1" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_1" onclick="lacrequestlabemrdiagex.listdatacek(1)">
                            <input name="lacrequestlabemrdiag_testhid" value="7000" hidden="true" id="lacrequestlabemrdiag_testhid_1">
                            <label class="custom-control-label" for="lacrequestlabemrdiag_test_1" value="Waktu Perdarahan / BT" title="7,000.00" id="lacrequestlabemrdiag_labeltest_1">Waktu Perdarahan / BT</label>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <div class="custom-control custom-checkbox ">
                            <input name="lacrequestlabemrdiag_test" value="611" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_611" onclick="lacrequestlabemrdiagex.listdatacek(611)">
                            <input name="lacrequestlabemrdiag_testhid" value="156400" hidden="true" id="lacrequestlabemrdiag_testhid_611">
                            <label class="custom-control-label" for="lacrequestlabemrdiag_test_611" value="PTT/APTT" title="156,400.00" id="lacrequestlabemrdiag_labeltest_611">PTT/APTT</label>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <div class="custom-control custom-checkbox ">
                            <input name="lacrequestlabemrdiag_test" value="54" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_54" onclick="lacrequestlabemrdiagex.listdatacek(54)">
                            <input name="lacrequestlabemrdiag_testhid" value="140000" hidden="true" id="lacrequestlabemrdiag_testhid_54">
                            <label class="custom-control-label" for="lacrequestlabemrdiag_test_54" value="TIBC" title="140,000.00" id="lacrequestlabemrdiag_labeltest_54">TIBC</label>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <div class="custom-control custom-checkbox ">
                            <input name="lacrequestlabemrdiag_test" value="266" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_266" onclick="lacrequestlabemrdiagex.listdatacek(266)">
                            <input name="lacrequestlabemrdiag_testhid" value="47000" hidden="true" id="lacrequestlabemrdiag_testhid_266">
                            <label class="custom-control-label" for="lacrequestlabemrdiag_test_266" value="Darah Lengkap" title="47,000.00" id="lacrequestlabemrdiag_labeltest_266">Darah Lengkap</label>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <div class="custom-control custom-checkbox ">
                            <input name="lacrequestlabemrdiag_test" value="278" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_278" onclick="lacrequestlabemrdiagex.listdatacek(278)">
                            <input name="lacrequestlabemrdiag_testhid" value="155000" hidden="true" id="lacrequestlabemrdiag_testhid_278">
                            <label class="custom-control-label" for="lacrequestlabemrdiag_test_278" value="Darah Lengkap 5 Diff" title="155,000.00" id="lacrequestlabemrdiag_labeltest_278">Darah Lengkap 5 Diff</label>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <div class="custom-control custom-checkbox ">
                            <input name="lacrequestlabemrdiag_test" value="119" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_119" onclick="lacrequestlabemrdiagex.listdatacek(119)">
                            <input name="lacrequestlabemrdiag_testhid" value="150000" hidden="true" id="lacrequestlabemrdiag_testhid_119">
                            <label class="custom-control-label" for="lacrequestlabemrdiag_test_119" value="Hapusan Darah Tepi" title="150,000.00" id="lacrequestlabemrdiag_labeltest_119">Hapusan Darah Tepi</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="2" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_2" onclick="lacrequestlabemrdiagex.listdatacek(2)"><input name="lacrequestlabemrdiag_testhid" value="14000" hidden="true" id="lacrequestlabemrdiag_testhid_2"><label class="custom-control-label" for="lacrequestlabemrdiag_test_2" value="Waktu Pembekuan / CT" title="14,000.00" id="lacrequestlabemrdiag_labeltest_2">Waktu Pembekuan / CT</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="37" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_37" onclick="lacrequestlabemrdiagex.listdatacek(37)"><input name="lacrequestlabemrdiag_testhid" value="20000" hidden="true" id="lacrequestlabemrdiag_testhid_37"><label class="custom-control-label" for="lacrequestlabemrdiag_test_37" value="Golongan Darah" title="20,000.00" id="lacrequestlabemrdiag_labeltest_37">Golongan Darah</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="342" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_342" onclick="lacrequestlabemrdiagex.listdatacek(342)"><input name="lacrequestlabemrdiag_testhid" value="125000" hidden="true" id="lacrequestlabemrdiag_testhid_342"><label class="custom-control-label" for="lacrequestlabemrdiag_test_342" value="SERUM IRON" title="125,000.00" id="lacrequestlabemrdiag_labeltest_342">SERUM IRON</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="58" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_58" onclick="lacrequestlabemrdiagex.listdatacek(58)"><input name="lacrequestlabemrdiag_testhid" value="125000" hidden="true" id="lacrequestlabemrdiag_testhid_58"><label class="custom-control-label" for="lacrequestlabemrdiag_test_58" value="Ferritin" title="125,000.00" id="lacrequestlabemrdiag_labeltest_58">Ferritin</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="589" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_589" onclick="lacrequestlabemrdiagex.listdatacek(589)"><input name="lacrequestlabemrdiag_testhid" value="350000" hidden="true" id="lacrequestlabemrdiag_testhid_589"><label class="custom-control-label" for="lacrequestlabemrdiag_test_589" value="Analisa Gas Darah " title="350,000.00" id="lacrequestlabemrdiag_labeltest_589">Analisa Gas Darah </label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="615" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_615" onclick="lacrequestlabemrdiagex.listdatacek(615)"><input name="lacrequestlabemrdiag_testhid" value="100000" hidden="true" id="lacrequestlabemrdiag_testhid_615"><label class="custom-control-label" for="lacrequestlabemrdiag_test_615" value="COOMB'S TEST " title="100,000.00" id="lacrequestlabemrdiag_labeltest_615">COOMB'S TEST </label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="11" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_11" onclick="lacrequestlabemrdiagex.listdatacek(11)"><input name="lacrequestlabemrdiag_testhid" value="24000" hidden="true" id="lacrequestlabemrdiag_testhid_11"><label class="custom-control-label" for="lacrequestlabemrdiag_test_11" value="Malaria ( Mikroskopis )" title="24,000.00" id="lacrequestlabemrdiag_labeltest_11">Malaria ( Mikroskopis )</label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group row"></div>
            </div>
            <div class="col-md-6 p-2">
              <div class="card"><div class="card-header"><label class="col-form-label font-weight-bold">KIMIA</label></div><div class="card-body" style="height: 250px;  overflow-y: scroll;"><div class="row"><div class="col-md-12"><div class="row" id="lacrequestlabemrdiag_grouptest_2"><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="82" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_82" onclick="lacrequestlabemrdiagex.listdatacek(82)"><input name="lacrequestlabemrdiag_testhid" value="24000" hidden="true" id="lacrequestlabemrdiag_testhid_82"><label class="custom-control-label" for="lacrequestlabemrdiag_test_82" value="Bilirubun Direk" title="24,000.00" id="lacrequestlabemrdiag_labeltest_82">Bilirubun Direk</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="516" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_516" onclick="lacrequestlabemrdiagex.listdatacek(516)"><input name="lacrequestlabemrdiag_testhid" value="171500" hidden="true" id="lacrequestlabemrdiag_testhid_516"><label class="custom-control-label" for="lacrequestlabemrdiag_test_516" value="LDH" title="171,500.00" id="lacrequestlabemrdiag_labeltest_516">LDH</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="68" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_68" onclick="lacrequestlabemrdiagex.listdatacek(68)"><input name="lacrequestlabemrdiag_testhid" value="25000" hidden="true" id="lacrequestlabemrdiag_testhid_68"><label class="custom-control-label" for="lacrequestlabemrdiag_test_68" value="SGPT" title="25,000.00" id="lacrequestlabemrdiag_labeltest_68">SGPT</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="117" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_117" onclick="lacrequestlabemrdiagex.listdatacek(117)"><input name="lacrequestlabemrdiag_testhid" value="38000" hidden="true" id="lacrequestlabemrdiag_testhid_117"><label class="custom-control-label" for="lacrequestlabemrdiag_test_117" value="HDL Cholesterol" title="38,000.00" id="lacrequestlabemrdiag_labeltest_117">HDL Cholesterol</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="116" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_116" onclick="lacrequestlabemrdiagex.listdatacek(116)"><input name="lacrequestlabemrdiag_testhid" value="38000" hidden="true" id="lacrequestlabemrdiag_testhid_116"><label class="custom-control-label" for="lacrequestlabemrdiag_test_116" value="LDL Cholesterol" title="38,000.00" id="lacrequestlabemrdiag_labeltest_116">LDL Cholesterol</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="115" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_115" onclick="lacrequestlabemrdiagex.listdatacek(115)"><input name="lacrequestlabemrdiag_testhid" value="38000" hidden="true" id="lacrequestlabemrdiag_testhid_115"><label class="custom-control-label" for="lacrequestlabemrdiag_test_115" value="Cholesterol Total" title="38,000.00" id="lacrequestlabemrdiag_labeltest_115">Cholesterol Total</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="443" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_443" onclick="lacrequestlabemrdiagex.listdatacek(443)"><input name="lacrequestlabemrdiag_testhid" value="38000" hidden="true" id="lacrequestlabemrdiag_testhid_443"><label class="custom-control-label" for="lacrequestlabemrdiag_test_443" value="Trigliserida" title="38,000.00" id="lacrequestlabemrdiag_labeltest_443">Trigliserida</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="60" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_60" onclick="lacrequestlabemrdiagex.listdatacek(60)"><input name="lacrequestlabemrdiag_testhid" value="25000" hidden="true" id="lacrequestlabemrdiag_testhid_60"><label class="custom-control-label" for="lacrequestlabemrdiag_test_60" value="SGOT" title="25,000.00" id="lacrequestlabemrdiag_labeltest_60">SGOT</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="90" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_90" onclick="lacrequestlabemrdiagex.listdatacek(90)"><input name="lacrequestlabemrdiag_testhid" value="24000" hidden="true" id="lacrequestlabemrdiag_testhid_90"><label class="custom-control-label" for="lacrequestlabemrdiag_test_90" value="Albumin" title="24,000.00" id="lacrequestlabemrdiag_labeltest_90">Albumin</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="605" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_605" onclick="lacrequestlabemrdiagex.listdatacek(605)"><input name="lacrequestlabemrdiag_testhid" value="300000" hidden="true" id="lacrequestlabemrdiag_testhid_605"><label class="custom-control-label" for="lacrequestlabemrdiag_test_605" value="D DIMER" title="300,000.00" id="lacrequestlabemrdiag_labeltest_605">D DIMER</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="673" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_673" onclick="lacrequestlabemrdiagex.listdatacek(673)"><input name="lacrequestlabemrdiag_testhid" value="26000" hidden="true" id="lacrequestlabemrdiag_testhid_673"><label class="custom-control-label" for="lacrequestlabemrdiag_test_673" value="Gula Darah Puasa ( stik ) " title="26,000.00" id="lacrequestlabemrdiag_labeltest_673">Gula Darah Puasa ( stik ) </label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="674" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_674" onclick="lacrequestlabemrdiagex.listdatacek(674)"><input name="lacrequestlabemrdiag_testhid" value="26000" hidden="true" id="lacrequestlabemrdiag_testhid_674"><label class="custom-control-label" for="lacrequestlabemrdiag_test_674" value="Gula Darah 2JPP ( stik)" title="26,000.00" id="lacrequestlabemrdiag_labeltest_674">Gula Darah 2JPP ( stik)</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="85" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_85" onclick="lacrequestlabemrdiagex.listdatacek(85)"><input name="lacrequestlabemrdiag_testhid" value="24000" hidden="true" id="lacrequestlabemrdiag_testhid_85"><label class="custom-control-label" for="lacrequestlabemrdiag_test_85" value="Protein Total" title="24,000.00" id="lacrequestlabemrdiag_labeltest_85">Protein Total</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="120" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_120" onclick="lacrequestlabemrdiagex.listdatacek(120)"><input name="lacrequestlabemrdiag_testhid" value="250000" hidden="true" id="lacrequestlabemrdiag_testhid_120"><label class="custom-control-label" for="lacrequestlabemrdiag_test_120" value="Na, K, Cl, iCa" title="250,000.00" id="lacrequestlabemrdiag_labeltest_120">Na, K, Cl, iCa</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="3" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_3" onclick="lacrequestlabemrdiagex.listdatacek(3)"><input name="lacrequestlabemrdiag_testhid" value="23000" hidden="true" id="lacrequestlabemrdiag_testhid_3"><label class="custom-control-label" for="lacrequestlabemrdiag_test_3" value="BUN" title="23,000.00" id="lacrequestlabemrdiag_labeltest_3">BUN</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="16" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_16" onclick="lacrequestlabemrdiagex.listdatacek(16)"><input name="lacrequestlabemrdiag_testhid" value="23000" hidden="true" id="lacrequestlabemrdiag_testhid_16"><label class="custom-control-label" for="lacrequestlabemrdiag_test_16" value="Creatinin" title="23,000.00" id="lacrequestlabemrdiag_labeltest_16">Creatinin</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="71" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_71" onclick="lacrequestlabemrdiagex.listdatacek(71)"><input name="lacrequestlabemrdiag_testhid" value="32000" hidden="true" id="lacrequestlabemrdiag_testhid_71"><label class="custom-control-label" for="lacrequestlabemrdiag_test_71" value="Gamma GT" title="32,000.00" id="lacrequestlabemrdiag_labeltest_71">Gamma GT</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="93" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_93" onclick="lacrequestlabemrdiagex.listdatacek(93)"><input name="lacrequestlabemrdiag_testhid" value="24000" hidden="true" id="lacrequestlabemrdiag_testhid_93"><label class="custom-control-label" for="lacrequestlabemrdiag_test_93" value="Globulin" title="24,000.00" id="lacrequestlabemrdiag_labeltest_93">Globulin</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="106" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_106" onclick="lacrequestlabemrdiagex.listdatacek(106)"><input name="lacrequestlabemrdiag_testhid" value="18000" hidden="true" id="lacrequestlabemrdiag_testhid_106"><label class="custom-control-label" for="lacrequestlabemrdiag_test_106" value="Glukosa 2 jam PP" title="18,000.00" id="lacrequestlabemrdiag_labeltest_106">Glukosa 2 jam PP</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="96" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_96" onclick="lacrequestlabemrdiagex.listdatacek(96)"><input name="lacrequestlabemrdiag_testhid" value="18000" hidden="true" id="lacrequestlabemrdiag_testhid_96"><label class="custom-control-label" for="lacrequestlabemrdiag_test_96" value="Glukosa Puasa" title="18,000.00" id="lacrequestlabemrdiag_labeltest_96">Glukosa Puasa</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="108" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_108" onclick="lacrequestlabemrdiagex.listdatacek(108)"><input name="lacrequestlabemrdiag_testhid" value="18000" hidden="true" id="lacrequestlabemrdiag_testhid_108"><label class="custom-control-label" for="lacrequestlabemrdiag_test_108" value="Glukosa Sewaktu" title="18,000.00" id="lacrequestlabemrdiag_labeltest_108">Glukosa Sewaktu</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="114" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_114" onclick="lacrequestlabemrdiagex.listdatacek(114)"><input name="lacrequestlabemrdiag_testhid" value="214000" hidden="true" id="lacrequestlabemrdiag_testhid_114"><label class="custom-control-label" for="lacrequestlabemrdiag_test_114" value="HbA1c" title="214,000.00" id="lacrequestlabemrdiag_labeltest_114">HbA1c</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="672" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_672" onclick="lacrequestlabemrdiagex.listdatacek(672)"><input name="lacrequestlabemrdiag_testhid" value="26000" hidden="true" id="lacrequestlabemrdiag_testhid_672"><label class="custom-control-label" for="lacrequestlabemrdiag_test_672" value="Gula Darah Sewaktu(stik)" title="26,000.00" id="lacrequestlabemrdiag_labeltest_672">Gula Darah Sewaktu(stik)</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="5" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_5" onclick="lacrequestlabemrdiagex.listdatacek(5)"><input name="lacrequestlabemrdiag_testhid" value="200000" hidden="true" id="lacrequestlabemrdiag_testhid_5"><label class="custom-control-label" for="lacrequestlabemrdiag_test_5" value="Hs-CRP" title="200,000.00" id="lacrequestlabemrdiag_labeltest_5">Hs-CRP</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="21" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_21" onclick="lacrequestlabemrdiagex.listdatacek(21)"><input name="lacrequestlabemrdiag_testhid" value="28000" hidden="true" id="lacrequestlabemrdiag_testhid_21"><label class="custom-control-label" for="lacrequestlabemrdiag_test_21" value="Asam Urat" title="28,000.00" id="lacrequestlabemrdiag_labeltest_21">Asam Urat</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="15" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_15" onclick="lacrequestlabemrdiagex.listdatacek(15)"><input name="lacrequestlabemrdiag_testhid" value="23000" hidden="true" id="lacrequestlabemrdiag_testhid_15"><label class="custom-control-label" for="lacrequestlabemrdiag_test_15" value="Ureum" title="23,000.00" id="lacrequestlabemrdiag_labeltest_15">Ureum</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="78" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_78" onclick="lacrequestlabemrdiagex.listdatacek(78)"><input name="lacrequestlabemrdiag_testhid" value="24000" hidden="true" id="lacrequestlabemrdiag_testhid_78"><label class="custom-control-label" for="lacrequestlabemrdiag_test_78" value="Bilirubin Total" title="24,000.00" id="lacrequestlabemrdiag_labeltest_78">Bilirubin Total</label>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div><div class="form-group row"></div>
</div>
<div class="col-md-6">
  <div class="card">
    <div class="card-header">
      <label class="col-form-label font-weight-bold">IMUNOLOGI</label>
    </div>
    <div class="card-body" style="height: 250px;  overflow-y: scroll;">
      <div class="row">
        <div class="col-md-12">
          <div class="row" id="lacrequestlabemrdiag_grouptest_3">
            <div class="col-md-6">
              <div class="form-group">
                <div class="custom-control custom-checkbox ">
                  <input name="lacrequestlabemrdiag_test" value="19" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_19" onclick="lacrequestlabemrdiagex.listdatacek(19)">
                  <input name="lacrequestlabemrdiag_testhid" value="320000" hidden="true" id="lacrequestlabemrdiag_testhid_19">
                  <label class="custom-control-label" for="lacrequestlabemrdiag_test_19" value="Anti Toxoplasma IgG" title="320,000.00" id="lacrequestlabemrdiag_labeltest_19">Anti Toxoplasma IgG</label>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <div class="custom-control custom-checkbox ">
                  <input name="lacrequestlabemrdiag_test" value="46" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_46" onclick="lacrequestlabemrdiagex.listdatacek(46)">
                  <input name="lacrequestlabemrdiag_testhid" value="550000" hidden="true" id="lacrequestlabemrdiag_testhid_46">
                  <label class="custom-control-label" for="lacrequestlabemrdiag_test_46" value="ANA Test" title="550,000.00" id="lacrequestlabemrdiag_labeltest_46">ANA Test</label>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <div class="custom-control custom-checkbox ">
                  <input name="lacrequestlabemrdiag_test" value="527" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_527" onclick="lacrequestlabemrdiagex.listdatacek(527)">
                  <input name="lacrequestlabemrdiag_testhid" value="450000" hidden="true" id="lacrequestlabemrdiag_testhid_527">
                  <label class="custom-control-label" for="lacrequestlabemrdiag_test_527" value="Anti ds-DNA" title="450,000.00" id="lacrequestlabemrdiag_labeltest_527">Anti ds-DNA</label>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <div class="custom-control custom-checkbox ">
                  <input name="lacrequestlabemrdiag_test" value="581" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_581" onclick="lacrequestlabemrdiagex.listdatacek(581)">
                  <input name="lacrequestlabemrdiag_testhid" value="425000" hidden="true" id="lacrequestlabemrdiag_testhid_581">
                  <label class="custom-control-label" for="lacrequestlabemrdiag_test_581" value="Anti HAV IgG &amp; IgM" title="425,000.00" id="lacrequestlabemrdiag_labeltest_581">Anti HAV IgG &amp; IgM</label>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <div class="custom-control custom-checkbox ">
                  <input name="lacrequestlabemrdiag_test" value="55" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_55" onclick="lacrequestlabemrdiagex.listdatacek(55)">
                  <input name="lacrequestlabemrdiag_testhid" value="215000" hidden="true" id="lacrequestlabemrdiag_testhid_55">
                  <label class="custom-control-label" for="lacrequestlabemrdiag_test_55" value="Anti HBs" title="215,000.00" id="lacrequestlabemrdiag_labeltest_55">Anti HBs</label>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <div class="custom-control custom-checkbox ">
                  <input name="lacrequestlabemrdiag_test" value="63" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_63" onclick="lacrequestlabemrdiagex.listdatacek(63)">
                  <input name="lacrequestlabemrdiag_testhid" value="40000" hidden="true" id="lacrequestlabemrdiag_testhid_63">
                  <label class="custom-control-label" for="lacrequestlabemrdiag_test_63" value="Anti HCV" title="40,000.00" id="lacrequestlabemrdiag_labeltest_63">Anti HCV</label>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <div class="custom-control custom-checkbox ">
                  <input name="lacrequestlabemrdiag_test" value="31" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_31" onclick="lacrequestlabemrdiagex.listdatacek(31)">
                  <input name="lacrequestlabemrdiag_testhid" value="450000" hidden="true" id="lacrequestlabemrdiag_testhid_31">
                  <label class="custom-control-label" for="lacrequestlabemrdiag_test_31" value="Anti Rubella IgG / IgM" title="450,000.00" id="lacrequestlabemrdiag_labeltest_31">Anti Rubella IgG / IgM</label>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <div class="custom-control custom-checkbox ">
                  <input name="lacrequestlabemrdiag_test" value="24" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_24" onclick="lacrequestlabemrdiagex.listdatacek(24)">
                  <input name="lacrequestlabemrdiag_testhid" value="320000" hidden="true" id="lacrequestlabemrdiag_testhid_24">
                  <label class="custom-control-label" for="lacrequestlabemrdiag_test_24" value="Anti Toxaplasma IgM" title="320,000.00" id="lacrequestlabemrdiag_labeltest_24">Anti Toxaplasma IgM</label>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <div class="custom-control custom-checkbox ">
                  <input name="lacrequestlabemrdiag_test" value="618" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_618" onclick="lacrequestlabemrdiagex.listdatacek(618)">
                  <input name="lacrequestlabemrdiag_testhid" value="200000" hidden="true" id="lacrequestlabemrdiag_testhid_618">
                  <label class="custom-control-label" for="lacrequestlabemrdiag_test_618" value="CRP Kuantitatif" title="200,000.00" id="lacrequestlabemrdiag_labeltest_618">CRP Kuantitatif</label>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <div class="custom-control custom-checkbox ">
                  <input name="lacrequestlabemrdiag_test" value="291" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_291" onclick="lacrequestlabemrdiagex.listdatacek(291)">
                  <input name="lacrequestlabemrdiag_testhid" value="73000" hidden="true" id="lacrequestlabemrdiag_testhid_291">
                  <label class="custom-control-label" for="lacrequestlabemrdiag_test_291" value="DENGUE duo" title="73,000.00" id="lacrequestlabemrdiag_labeltest_291">DENGUE duo</label>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <div class="custom-control custom-checkbox ">
                  <input name="lacrequestlabemrdiag_test" value="122" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_122" onclick="lacrequestlabemrdiagex.listdatacek(122)">
                  <input name="lacrequestlabemrdiag_testhid" value="73000" hidden="true" id="lacrequestlabemrdiag_testhid_122">
                  <label class="custom-control-label" for="lacrequestlabemrdiag_test_122" value="Dengue IgG &amp; IgM" title="73,000.00" id="lacrequestlabemrdiag_labeltest_122">Dengue IgG &amp; IgM</label>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <div class="custom-control custom-checkbox ">
                  <input name="lacrequestlabemrdiag_test" value="53" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_53" onclick="lacrequestlabemrdiagex.listdatacek(53)">
                  <input name="lacrequestlabemrdiag_testhid" value="41000" hidden="true" id="lacrequestlabemrdiag_testhid_53">
                  <label class="custom-control-label" for="lacrequestlabemrdiag_test_53" value="HBsAg" title="41,000.00" id="lacrequestlabemrdiag_labeltest_53">HBsAg</label>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <div class="custom-control custom-checkbox ">
                  <input name="lacrequestlabemrdiag_test" value="606" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_606" onclick="lacrequestlabemrdiagex.listdatacek(606)">
                  <input name="lacrequestlabemrdiag_testhid" value="35000" hidden="true" id="lacrequestlabemrdiag_testhid_606">
                  <label class="custom-control-label" for="lacrequestlabemrdiag_test_606" value="Rapid Antigen SarsCoV2" title="35,000.00" id="lacrequestlabemrdiag_labeltest_606">Rapid Antigen SarsCoV2</label>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <div class="custom-control custom-checkbox ">
                  <input name="lacrequestlabemrdiag_test" value="578" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_578" onclick="lacrequestlabemrdiagex.listdatacek(578)">
                  <input name="lacrequestlabemrdiag_testhid" value="20000" hidden="true" id="lacrequestlabemrdiag_testhid_578">
                  <label class="custom-control-label" for="lacrequestlabemrdiag_test_578" value="TES KEHAMILAN" title="20,000.00" id="lacrequestlabemrdiag_labeltest_578">TES KEHAMILAN</label>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <div class="custom-control custom-checkbox ">
                  <input name="lacrequestlabemrdiag_test" value="32" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_32" onclick="lacrequestlabemrdiagex.listdatacek(32)">
                  <input name="lacrequestlabemrdiag_testhid" value="425000" hidden="true" id="lacrequestlabemrdiag_testhid_32">
                  <label class="custom-control-label" for="lacrequestlabemrdiag_test_32" value="Testosteron" title="425,000.00" id="lacrequestlabemrdiag_labeltest_32">Testosteron</label>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <div class="custom-control custom-checkbox ">
                  <input name="lacrequestlabemrdiag_test" value="10" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_10" onclick="lacrequestlabemrdiagex.listdatacek(10)">
                  <input name="lacrequestlabemrdiag_testhid" value="150000" hidden="true" id="lacrequestlabemrdiag_testhid_10"><label class="custom-control-label" for="lacrequestlabemrdiag_test_10" value="TPHA" title="150,000.00" id="lacrequestlabemrdiag_labeltest_10">TPHA</label></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="form-group row">

    </div>
  </div>
  <div class="col-md-6">
    <div class="card"><div class="card-header"><label class="col-form-label font-weight-bold">SEROLOGI </label></div><div class="card-body" style="height: 250px;  overflow-y: scroll;"><div class="row"><div class="col-md-12"><div class="row" id="lacrequestlabemrdiag_grouptest_4"><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="526" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_526" onclick="lacrequestlabemrdiagex.listdatacek(526)"><input name="lacrequestlabemrdiag_testhid" value="68000" hidden="true" id="lacrequestlabemrdiag_testhid_526"><label class="custom-control-label" for="lacrequestlabemrdiag_test_526" value="HIV" title="68,000.00" id="lacrequestlabemrdiag_labeltest_526">HIV</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="45" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_45" onclick="lacrequestlabemrdiagex.listdatacek(45)"><input name="lacrequestlabemrdiag_testhid" value="225000" hidden="true" id="lacrequestlabemrdiag_testhid_45"><label class="custom-control-label" for="lacrequestlabemrdiag_test_45" value="CRP Kualitatif" title="225,000.00" id="lacrequestlabemrdiag_labeltest_45">CRP Kualitatif</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="121" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_121" onclick="lacrequestlabemrdiagex.listdatacek(121)"><input name="lacrequestlabemrdiag_testhid" value="24000" hidden="true" id="lacrequestlabemrdiag_testhid_121"><label class="custom-control-label" for="lacrequestlabemrdiag_test_121" value="Widal" title="24,000.00" id="lacrequestlabemrdiag_labeltest_121">Widal</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="44" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_44" onclick="lacrequestlabemrdiagex.listdatacek(44)"><input name="lacrequestlabemrdiag_testhid" value="88000" hidden="true" id="lacrequestlabemrdiag_testhid_44"><label class="custom-control-label" for="lacrequestlabemrdiag_test_44" value="Remhatoid Test" title="88,000.00" id="lacrequestlabemrdiag_labeltest_44">Remhatoid Test</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="41" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_41" onclick="lacrequestlabemrdiagex.listdatacek(41)"><input name="lacrequestlabemrdiag_testhid" value="185000" hidden="true" id="lacrequestlabemrdiag_testhid_41"><label class="custom-control-label" for="lacrequestlabemrdiag_test_41" value="ASTO" title="185,000.00" id="lacrequestlabemrdiag_labeltest_41">ASTO</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="123" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_123" onclick="lacrequestlabemrdiagex.listdatacek(123)"><input name="lacrequestlabemrdiag_testhid" value="88000" hidden="true" id="lacrequestlabemrdiag_testhid_123"><label class="custom-control-label" for="lacrequestlabemrdiag_test_123" value="Rapid tes 3 metode" title="88,000.00" id="lacrequestlabemrdiag_labeltest_123">Rapid tes 3 metode</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="9" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_9" onclick="lacrequestlabemrdiagex.listdatacek(9)"><input name="lacrequestlabemrdiag_testhid" value="55000" hidden="true" id="lacrequestlabemrdiag_testhid_9"><label class="custom-control-label" for="lacrequestlabemrdiag_test_9" value="VDRL" title="55,000.00" id="lacrequestlabemrdiag_labeltest_9">VDRL</label></div></div></div></div></div></div></div></div><div class="form-group row"></div>
  </div>
  <div class="col-md-6">
    <div class="card">
      <div class="card-header"><label class="col-form-label font-weight-bold">MIKROBIOLOGI</label></div>
      <div class="card-body" style="height: 250px;  overflow-y: scroll;">
        <div class="row">
          <div class="col-md-12">
            <div class="row" id="lacrequestlabemrdiag_grouptest_5">
              <div class="col-md-6">
                <div class="form-group">
                  <div class="custom-control custom-checkbox ">
                    <input name="lacrequestlabemrdiag_test" value="79" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_79" onclick="lacrequestlabemrdiagex.listdatacek(79)">
                    <input name="lacrequestlabemrdiag_testhid" value="15000" hidden="true" id="lacrequestlabemrdiag_testhid_79">
                    <label class="custom-control-label" for="lacrequestlabemrdiag_test_79" value="Pengecatan BTA" title="15,000.00" id="lacrequestlabemrdiag_labeltest_79">Pengecatan BTA</label>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <div class="custom-control custom-checkbox ">
                    <input name="lacrequestlabemrdiag_test" value="419" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_419" onclick="lacrequestlabemrdiagex.listdatacek(419)">
                    <input name="lacrequestlabemrdiag_testhid" value="712000" hidden="true" id="lacrequestlabemrdiag_testhid_419">
                    <label class="custom-control-label" for="lacrequestlabemrdiag_test_419" value="Kultur Darah" title="712,000.00" id="lacrequestlabemrdiag_labeltest_419">Kultur Darah</label>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <div class="custom-control custom-checkbox ">
                    <input name="lacrequestlabemrdiag_test" value="528" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_528" onclick="lacrequestlabemrdiagex.listdatacek(528)">
                    <input name="lacrequestlabemrdiag_testhid" value="165000" hidden="true" id="lacrequestlabemrdiag_testhid_528">
                    <label class="custom-control-label" for="lacrequestlabemrdiag_test_528" value="Analisa Cairan Pleura" title="165,000.00" id="lacrequestlabemrdiag_labeltest_528">Analisa Cairan Pleura</label>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <div class="custom-control custom-checkbox ">
                    <input name="lacrequestlabemrdiag_test" value="426" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_426" onclick="lacrequestlabemrdiagex.listdatacek(426)">
                    <input name="lacrequestlabemrdiag_testhid" value="671000" hidden="true" id="lacrequestlabemrdiag_testhid_426">
                    <label class="custom-control-label" for="lacrequestlabemrdiag_test_426" value="Kultur Urine" title="671,000.00" id="lacrequestlabemrdiag_labeltest_426">Kultur Urine</label>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <div class="custom-control custom-checkbox ">
                    <input name="lacrequestlabemrdiag_test" value="88" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_88" onclick="lacrequestlabemrdiagex.listdatacek(88)">
                    <input name="lacrequestlabemrdiag_testhid" value="50000" hidden="true" id="lacrequestlabemrdiag_testhid_88">
                    <label class="custom-control-label" for="lacrequestlabemrdiag_test_88" value="Pap Smear" title="50,000.00" id="lacrequestlabemrdiag_labeltest_88">Pap Smear</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="form-group row">

    </div>
  </div>
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <label class="col-form-label font-weight-bold">NARKOBA</label>
      </div>
      <div class="card-body" style="height: 250px;  overflow-y: scroll;">
        <div class="row">
          <div class="col-md-12">
            <div class="row" id="lacrequestlabemrdiag_grouptest_6">
              <div class="col-md-6">
                <div class="form-group">
                  <div class="custom-control custom-checkbox ">
                    <input name="lacrequestlabemrdiag_test" value="621" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_621" onclick="lacrequestlabemrdiagex.listdatacek(621)">
                    <input name="lacrequestlabemrdiag_testhid" value="133000" hidden="true" id="lacrequestlabemrdiag_testhid_621">
                    <label class="custom-control-label" for="lacrequestlabemrdiag_test_621" value="Narkoba" title="133,000.00" id="lacrequestlabemrdiag_labeltest_621">Narkoba</label>
                  </div>
                </div>
              </div>
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
        <label class="col-form-label font-weight-bold">TINJA </label>
      </div>
      <div class="card-body" style="height: 250px;  overflow-y: scroll;">
        <div class="row">
          <div class="col-md-12">
            <div class="row" id="lacrequestlabemrdiag_grouptest_7">
              <div class="col-md-6">
                <div class="form-group">
                  <div class="custom-control custom-checkbox ">
                    <input name="lacrequestlabemrdiag_test" value="125" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_125" onclick="lacrequestlabemrdiagex.listdatacek(125)">
                    <input name="lacrequestlabemrdiag_testhid" value="20000" hidden="true" id="lacrequestlabemrdiag_testhid_125">
                    <label class="custom-control-label" for="lacrequestlabemrdiag_test_125" value="Feces Rutin" title="20,000.00" id="lacrequestlabemrdiag_labeltest_125">Feces Rutin</label>
                  </div>
                </div>
              </div>
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
        <label class="col-form-label font-weight-bold">ENDOKRINOLOGI</label>
      </div>
      <div class="card-body" style="height: 250px;  overflow-y: scroll;">
        <div class="row">
          <div class="col-md-12">
            <div class="row" id="lacrequestlabemrdiag_grouptest_9">
              <div class="col-md-6">
                <div class="form-group">
                  <div class="custom-control custom-checkbox ">
                    <input name="lacrequestlabemrdiag_test" value="39" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_39" onclick="lacrequestlabemrdiagex.listdatacek(39)">
                    <input name="lacrequestlabemrdiag_testhid" value="200000" hidden="true" id="lacrequestlabemrdiag_testhid_39">
                    <label class="custom-control-label" for="lacrequestlabemrdiag_test_39" value="T4 " title="200,000.00" id="lacrequestlabemrdiag_labeltest_39">T4 </label></div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="custom-control custom-checkbox ">
                      <input name="lacrequestlabemrdiag_test" value="36" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_36" onclick="lacrequestlabemrdiagex.listdatacek(36)">
                      <input name="lacrequestlabemrdiag_testhid" value="250000" hidden="true" id="lacrequestlabemrdiag_testhid_36">
                      <label class="custom-control-label" for="lacrequestlabemrdiag_test_36" value="TSHs" title="250,000.00" id="lacrequestlabemrdiag_labeltest_36">TSHs</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="custom-control custom-checkbox ">
                      <input name="lacrequestlabemrdiag_test" value="98" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_98" onclick="lacrequestlabemrdiagex.listdatacek(98)">
                      <input name="lacrequestlabemrdiag_testhid" value="350000" hidden="true" id="lacrequestlabemrdiag_testhid_98">
                      <label class="custom-control-label" for="lacrequestlabemrdiag_test_98" value="Beta HCG" title="350,000.00" id="lacrequestlabemrdiag_labeltest_98">Beta HCG</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="custom-control custom-checkbox ">
                      <input name="lacrequestlabemrdiag_test" value="35" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_35" onclick="lacrequestlabemrdiagex.listdatacek(35)">
                      <input name="lacrequestlabemrdiag_testhid" value="300000" hidden="true" id="lacrequestlabemrdiag_testhid_35">
                      <label class="custom-control-label" for="lacrequestlabemrdiag_test_35" value="FT4" title="300,000.00" id="lacrequestlabemrdiag_labeltest_35">FT4</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="custom-control custom-checkbox ">
                      <input name="lacrequestlabemrdiag_test" value="34" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_34" onclick="lacrequestlabemrdiagex.listdatacek(34)">
                      <input name="lacrequestlabemrdiag_testhid" value="340000" hidden="true" id="lacrequestlabemrdiag_testhid_34">
                      <label class="custom-control-label" for="lacrequestlabemrdiag_test_34" value="FT3" title="340,000.00" id="lacrequestlabemrdiag_labeltest_34">FT3</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="custom-control custom-checkbox ">
                      <input name="lacrequestlabemrdiag_test" value="38" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_38" onclick="lacrequestlabemrdiagex.listdatacek(38)">
                      <input name="lacrequestlabemrdiag_testhid" value="250000" hidden="true" id="lacrequestlabemrdiag_testhid_38">
                      <label class="custom-control-label" for="lacrequestlabemrdiag_test_38" value="T3 " title="250,000.00" id="lacrequestlabemrdiag_labeltest_38">T3 </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group row"></div>
    </div>
    <div class="col-md-6">
      <div class="card"><div class="card-header"><label class="col-form-label font-weight-bold">LAIN-LAIN</label></div><div class="card-body" style="height: 250px;  overflow-y: scroll;"><div class="row"><div class="col-md-12"><div class="row" id="lacrequestlabemrdiag_grouptest_11"><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="253" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_253" onclick="lacrequestlabemrdiagex.listdatacek(253)"><input name="lacrequestlabemrdiag_testhid" value="300000" hidden="true" id="lacrequestlabemrdiag_testhid_253"><label class="custom-control-label" for="lacrequestlabemrdiag_test_253" value="AFP" title="300,000.00" id="lacrequestlabemrdiag_labeltest_253">AFP</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="651" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_651" onclick="lacrequestlabemrdiagex.listdatacek(651)"><input name="lacrequestlabemrdiag_testhid" value="350000" hidden="true" id="lacrequestlabemrdiag_testhid_651"><label class="custom-control-label" for="lacrequestlabemrdiag_test_651" value="BGA ( Blood gas analysis )" title="350,000.00" id="lacrequestlabemrdiag_labeltest_651">BGA ( Blood gas analysis )</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="604" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_604" onclick="lacrequestlabemrdiagex.listdatacek(604)"><input name="lacrequestlabemrdiag_testhid" value="350000" hidden="true" id="lacrequestlabemrdiag_testhid_604"><label class="custom-control-label" for="lacrequestlabemrdiag_test_604" value="Pemeriksaan  Troponin" title="350,000.00" id="lacrequestlabemrdiag_labeltest_604">Pemeriksaan  Troponin</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="600" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_600" onclick="lacrequestlabemrdiagex.listdatacek(600)"><input name="lacrequestlabemrdiag_testhid" value="330000" hidden="true" id="lacrequestlabemrdiag_testhid_600"><label class="custom-control-label" for="lacrequestlabemrdiag_test_600" value="PCR COVID" title="330,000.00" id="lacrequestlabemrdiag_labeltest_600">PCR COVID</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="622" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_622" onclick="lacrequestlabemrdiagex.listdatacek(622)"><input name="lacrequestlabemrdiag_testhid" value="180000" hidden="true" id="lacrequestlabemrdiag_testhid_622"><label class="custom-control-label" for="lacrequestlabemrdiag_test_622" value="Operasi Tumor Kecil (<5 cm)" title="180,000.00" id="lacrequestlabemrdiag_labeltest_622">Operasi Tumor Kecil (&lt;5 cm)</label></div></div></div></div></div></div></div></div><div class="form-group row"></div>
      </div>
      <div class="col-md-6">
        <div class="card"><div class="card-header"><label class="col-form-label font-weight-bold">RUJUKAN</label></div><div class="card-body" style="height: 250px;  overflow-y: scroll;"><div class="row"><div class="col-md-12"><div class="row" id="lacrequestlabemrdiag_grouptest_12"><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="87" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_87" onclick="lacrequestlabemrdiagex.listdatacek(87)"><input name="lacrequestlabemrdiag_testhid" value="475000" hidden="true" id="lacrequestlabemrdiag_testhid_87"><label class="custom-control-label" for="lacrequestlabemrdiag_test_87" value="CA 125" title="475,000.00" id="lacrequestlabemrdiag_labeltest_87">CA 125</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="47" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_47" onclick="lacrequestlabemrdiagex.listdatacek(47)"><input name="lacrequestlabemrdiag_testhid" value="475000" hidden="true" id="lacrequestlabemrdiag_testhid_47"><label class="custom-control-label" for="lacrequestlabemrdiag_test_47" value="LE Test" title="475,000.00" id="lacrequestlabemrdiag_labeltest_47">LE Test</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="81" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_81" onclick="lacrequestlabemrdiagex.listdatacek(81)"><input name="lacrequestlabemrdiag_testhid" value="340000" hidden="true" id="lacrequestlabemrdiag_testhid_81"><label class="custom-control-label" for="lacrequestlabemrdiag_test_81" value="PSA" title="340,000.00" id="lacrequestlabemrdiag_labeltest_81">PSA</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="442" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_442" onclick="lacrequestlabemrdiagex.listdatacek(442)"><input name="lacrequestlabemrdiag_testhid" value="436000" hidden="true" id="lacrequestlabemrdiag_testhid_442"><label class="custom-control-label" for="lacrequestlabemrdiag_test_442" value="CA 15.3" title="436,000.00" id="lacrequestlabemrdiag_labeltest_442">CA 15.3</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="83" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_83" onclick="lacrequestlabemrdiagex.listdatacek(83)"><input name="lacrequestlabemrdiag_testhid" value="300000" hidden="true" id="lacrequestlabemrdiag_testhid_83"><label class="custom-control-label" for="lacrequestlabemrdiag_test_83" value="CEA" title="300,000.00" id="lacrequestlabemrdiag_labeltest_83">CEA</label></div></div></div></div></div></div></div></div><div class="form-group row"></div>
      </div>
      <div class="col-md-6">
        <div class="card"><div class="card-header"><label class="col-form-label font-weight-bold">URINALISA</label></div><div class="card-body" style="height: 250px;  overflow-y: scroll;"><div class="row"><div class="col-md-12"><div class="row" id="lacrequestlabemrdiag_grouptest_13"><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="124" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_124" onclick="lacrequestlabemrdiagex.listdatacek(124)"><input name="lacrequestlabemrdiag_testhid" value="30000" hidden="true" id="lacrequestlabemrdiag_testhid_124"><label class="custom-control-label" for="lacrequestlabemrdiag_test_124" value="Urine Lengkap" title="30,000.00" id="lacrequestlabemrdiag_labeltest_124">Urine Lengkap</label></div></div></div></div></div></div></div></div><div class="form-group row"></div>
      </div>
      <div class="col-md-6">
        <div class="card"><div class="card-header"><label class="col-form-label font-weight-bold"></label></div><div class="card-body" style="height: 250px;  overflow-y: scroll;"><div class="row"><div class="col-md-12"><div class="row" id="lacrequestlabemrdiag_grouptest_14"><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="357" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_357" onclick="lacrequestlabemrdiagex.listdatacek(357)"><input name="lacrequestlabemrdiag_testhid" value="326000" hidden="true" id="lacrequestlabemrdiag_testhid_357"><label class="custom-control-label" for="lacrequestlabemrdiag_test_357" value="Anti HSV I IgG" title="326,000.00" id="lacrequestlabemrdiag_labeltest_357">Anti HSV I IgG</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="629" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_629" onclick="lacrequestlabemrdiagex.listdatacek(629)"><input name="lacrequestlabemrdiag_testhid" value="200000" hidden="true" id="lacrequestlabemrdiag_testhid_629"><label class="custom-control-label" for="lacrequestlabemrdiag_test_629" value="Operasi Appendiks" title="200,000.00" id="lacrequestlabemrdiag_labeltest_629">Operasi Appendiks</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="628" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_628" onclick="lacrequestlabemrdiagex.listdatacek(628)"><input name="lacrequestlabemrdiag_testhid" value="350000" hidden="true" id="lacrequestlabemrdiag_testhid_628"><label class="custom-control-label" for="lacrequestlabemrdiag_test_628" value="Operasi Amputasi Tulang" title="350,000.00" id="lacrequestlabemrdiag_labeltest_628">Operasi Amputasi Tulang</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="626" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_626" onclick="lacrequestlabemrdiagex.listdatacek(626)"><input name="lacrequestlabemrdiag_testhid" value="400000" hidden="true" id="lacrequestlabemrdiag_testhid_626"><label class="custom-control-label" for="lacrequestlabemrdiag_test_626" value="FNAB 2 Lokasi" title="400,000.00" id="lacrequestlabemrdiag_labeltest_626">FNAB 2 Lokasi</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="627" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_627" onclick="lacrequestlabemrdiagex.listdatacek(627)"><input name="lacrequestlabemrdiag_testhid" value="450000" hidden="true" id="lacrequestlabemrdiag_testhid_627"><label class="custom-control-label" for="lacrequestlabemrdiag_test_627" value="FNAB 3 Lokasi" title="450,000.00" id="lacrequestlabemrdiag_labeltest_627">FNAB 3 Lokasi</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="636" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_636" onclick="lacrequestlabemrdiagex.listdatacek(636)"><input name="lacrequestlabemrdiag_testhid" value="350000" hidden="true" id="lacrequestlabemrdiag_testhid_636"><label class="custom-control-label" for="lacrequestlabemrdiag_test_636" value="Operasi Otak" title="350,000.00" id="lacrequestlabemrdiag_labeltest_636">Operasi Otak</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="430" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_430" onclick="lacrequestlabemrdiagex.listdatacek(430)"><input name="lacrequestlabemrdiag_testhid" value="712000" hidden="true" id="lacrequestlabemrdiag_testhid_430"><label class="custom-control-label" for="lacrequestlabemrdiag_test_430" value="Kultur Pus" title="712,000.00" id="lacrequestlabemrdiag_labeltest_430">Kultur Pus</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="637" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_637" onclick="lacrequestlabemrdiagex.listdatacek(637)"><input name="lacrequestlabemrdiag_testhid" value="200000" hidden="true" id="lacrequestlabemrdiag_testhid_637"><label class="custom-control-label" for="lacrequestlabemrdiag_test_637" value="Operasi Prostat" title="200,000.00" id="lacrequestlabemrdiag_labeltest_637">Operasi Prostat</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="638" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_638" onclick="lacrequestlabemrdiagex.listdatacek(638)"><input name="lacrequestlabemrdiag_testhid" value="350000" hidden="true" id="lacrequestlabemrdiag_testhid_638"><label class="custom-control-label" for="lacrequestlabemrdiag_test_638" value="Operasi Radikalitas" title="350,000.00" id="lacrequestlabemrdiag_labeltest_638">Operasi Radikalitas</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="639" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_639" onclick="lacrequestlabemrdiagex.listdatacek(639)"><input name="lacrequestlabemrdiag_testhid" value="300000" hidden="true" id="lacrequestlabemrdiag_testhid_639"><label class="custom-control-label" for="lacrequestlabemrdiag_test_639" value="Operasi Reseksi Usus" title="300,000.00" id="lacrequestlabemrdiag_labeltest_639">Operasi Reseksi Usus</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="640" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_640" onclick="lacrequestlabemrdiagex.listdatacek(640)"><input name="lacrequestlabemrdiag_testhid" value="300000" hidden="true" id="lacrequestlabemrdiag_testhid_640"><label class="custom-control-label" for="lacrequestlabemrdiag_test_640" value="Operasi Testis" title="300,000.00" id="lacrequestlabemrdiag_labeltest_640">Operasi Testis</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="641" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_641" onclick="lacrequestlabemrdiagex.listdatacek(641)"><input name="lacrequestlabemrdiag_testhid" value="200000" hidden="true" id="lacrequestlabemrdiag_testhid_641"><label class="custom-control-label" for="lacrequestlabemrdiag_test_641" value="Operasi Thyroid" title="200,000.00" id="lacrequestlabemrdiag_labeltest_641">Operasi Thyroid</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="642" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_642" onclick="lacrequestlabemrdiagex.listdatacek(642)"><input name="lacrequestlabemrdiag_testhid" value="200000" hidden="true" id="lacrequestlabemrdiag_testhid_642"><label class="custom-control-label" for="lacrequestlabemrdiag_test_642" value="Operasi Tonsil" title="200,000.00" id="lacrequestlabemrdiag_labeltest_642">Operasi Tonsil</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="624" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_624" onclick="lacrequestlabemrdiagex.listdatacek(624)"><input name="lacrequestlabemrdiag_testhid" value="300000" hidden="true" id="lacrequestlabemrdiag_testhid_624"><label class="custom-control-label" for="lacrequestlabemrdiag_test_624" value="Operasi Tumor Besar (> 10 cm)" title="300,000.00" id="lacrequestlabemrdiag_labeltest_624">Operasi Tumor Besar (&gt; 10 cm)</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="623" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_623" onclick="lacrequestlabemrdiagex.listdatacek(623)"><input name="lacrequestlabemrdiag_testhid" value="200000" hidden="true" id="lacrequestlabemrdiag_testhid_623"><label class="custom-control-label" for="lacrequestlabemrdiag_test_623" value="Operasi Tumor Sedang (5-10 cm)" title="200,000.00" id="lacrequestlabemrdiag_labeltest_623">Operasi Tumor Sedang (5-10 cm)</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="635" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_635" onclick="lacrequestlabemrdiagex.listdatacek(635)"><input name="lacrequestlabemrdiag_testhid" value="300000" hidden="true" id="lacrequestlabemrdiag_testhid_635"><label class="custom-control-label" for="lacrequestlabemrdiag_test_635" value="Operasi Mastektomi" title="300,000.00" id="lacrequestlabemrdiag_labeltest_635">Operasi Mastektomi</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="634" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_634" onclick="lacrequestlabemrdiagex.listdatacek(634)"><input name="lacrequestlabemrdiag_testhid" value="300000" hidden="true" id="lacrequestlabemrdiag_testhid_634"><label class="custom-control-label" for="lacrequestlabemrdiag_test_634" value="Operasi FAM Multiple" title="300,000.00" id="lacrequestlabemrdiag_labeltest_634">Operasi FAM Multiple</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="625" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_625" onclick="lacrequestlabemrdiagex.listdatacek(625)"><input name="lacrequestlabemrdiag_testhid" value="350000" hidden="true" id="lacrequestlabemrdiag_testhid_625"><label class="custom-control-label" for="lacrequestlabemrdiag_test_625" value="FNAB 1 Lokasi" title="350,000.00" id="lacrequestlabemrdiag_labeltest_625">FNAB 1 Lokasi</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="633" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_633" onclick="lacrequestlabemrdiagex.listdatacek(633)"><input name="lacrequestlabemrdiag_testhid" value="200000" hidden="true" id="lacrequestlabemrdiag_testhid_633"><label class="custom-control-label" for="lacrequestlabemrdiag_test_633" value="Operasi FAM 1 Bahan" title="200,000.00" id="lacrequestlabemrdiag_labeltest_633">Operasi FAM 1 Bahan</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="632" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_632" onclick="lacrequestlabemrdiagex.listdatacek(632)"><input name="lacrequestlabemrdiag_testhid" value="180000" hidden="true" id="lacrequestlabemrdiag_testhid_632"><label class="custom-control-label" for="lacrequestlabemrdiag_test_632" value="Operasi Endoserviks" title="180,000.00" id="lacrequestlabemrdiag_labeltest_632">Operasi Endoserviks</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="631" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_631" onclick="lacrequestlabemrdiagex.listdatacek(631)"><input name="lacrequestlabemrdiag_testhid" value="180000" hidden="true" id="lacrequestlabemrdiag_testhid_631"><label class="custom-control-label" for="lacrequestlabemrdiag_test_631" value="Operasi Endometrium" title="180,000.00" id="lacrequestlabemrdiag_labeltest_631">Operasi Endometrium</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="630" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_630" onclick="lacrequestlabemrdiagex.listdatacek(630)"><input name="lacrequestlabemrdiag_testhid" value="200000" hidden="true" id="lacrequestlabemrdiag_testhid_630"><label class="custom-control-label" for="lacrequestlabemrdiag_test_630" value="Operasi Biopsi" title="200,000.00" id="lacrequestlabemrdiag_labeltest_630">Operasi Biopsi</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="lacrequestlabemrdiag_test" value="360" type="checkbox" class="custom-control-input" id="lacrequestlabemrdiag_test_360" onclick="lacrequestlabemrdiagex.listdatacek(360)"><input name="lacrequestlabemrdiag_testhid" value="326000" hidden="true" id="lacrequestlabemrdiag_testhid_360"><label class="custom-control-label" for="lacrequestlabemrdiag_test_360" value="Anti HSV I IgM" title="326,000.00" id="lacrequestlabemrdiag_labeltest_360">Anti HSV I IgM</label></div></div></div></div></div></div></div></div><div class="form-group row"></div>
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button class="btn btn-primary">Input</button>&nbsp;
    <button class="btn  btn-secondary" data-dismiss="modal">Close</button>
  </div>
</div>
</div>
</div>
<!-- end modal permintaan lab -->
<!-- modal permintaan checkboxlogi -->
<div class="modal fade" id="ModalPermintaancheckboxlogiIrja">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header"><h4>Permintaan checkboxlogi</h4></div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <label class="col-form-label font-weight-bold">X-RAY</label>
              </div>
              <div class="card-body" style="height: 250px;  overflow-y: scroll;">
                <div class="row">
                  <div class="col-md-12">
                    <div class="row" id="paccheckboxlogireqemrdiag_grouptest_1"><div class="col-md-6">
                      <div class="form-group">
                        <div class="custom-control custom-checkbox ">
                          <input name="paccheckboxlogireqemrdiag_test" value="86" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_86" onclick="paccheckboxlogireqemrdiagex.listdatacek(86)">
                          <input name="paccheckboxlogireqemrdiag_testhid" value="90000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_86">
                          <label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_86" value="Shoulder Sin" title="90,000.00" id="paccheckboxlogireqemrdiag_labeltest_86">Shoulder Sin</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <div class="custom-control custom-checkbox ">
                          <input name="paccheckboxlogireqemrdiag_test" value="2" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_2" onclick="paccheckboxlogireqemrdiagex.listdatacek(2)">
                          <input name="paccheckboxlogireqemrdiag_testhid" value="155000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_2">
                          <label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_2" value="Abdomen BOF LLD" title="155,000.00" id="paccheckboxlogireqemrdiag_labeltest_2">Abdomen BOF LLD</label>

                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <div class="custom-control custom-checkbox ">
                          <input name="paccheckboxlogireqemrdiag_test" value="3" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_3" onclick="paccheckboxlogireqemrdiagex.listdatacek(3)">
                          <input name="paccheckboxlogireqemrdiag_testhid" value="90000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_3">
                          <label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_3" value="Abdomen/BOF Dewasa" title="90,000.00" id="paccheckboxlogireqemrdiag_labeltest_3">Abdomen/BOF Dewasa</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6"><div class="form-group">
                      <div class="custom-control custom-checkbox ">
                        <input name="paccheckboxlogireqemrdiag_test" value="4" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_4" onclick="paccheckboxlogireqemrdiagex.listdatacek(4)">
                        <input name="paccheckboxlogireqemrdiag_testhid" value="90000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_4">
                        <label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_4" value="Antebrachii ( Ap Lat)" title="90,000.00" id="paccheckboxlogireqemrdiag_labeltest_4">Antebrachii ( Ap Lat)</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox ">
                    <input name="paccheckboxlogireqemrdiag_test" value="5" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_5" onclick="paccheckboxlogireqemrdiagex.listdatacek(5)">
                    <input name="paccheckboxlogireqemrdiag_testhid" value="335000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_5">
                    <label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_5" value="Apendixography" title="335,000.00" id="paccheckboxlogireqemrdiag_labeltest_5">Apendixography</label>
                  </div>
                </div>
              </div>
              <div class="col-md-6"><div class="form-group">
                <div class="custom-control custom-checkbox ">
                  <input name="paccheckboxlogireqemrdiag_test" value="7" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_7" onclick="paccheckboxlogireqemrdiagex.listdatacek(7)">
                  <input name="paccheckboxlogireqemrdiag_testhid" value="90000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_7">
                  <label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_7" value="Artic Genu ( Ap Lat )" title="90,000.00" id="paccheckboxlogireqemrdiag_labeltest_7">Artic Genu ( Ap Lat )</label>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group"><div class="custom-control custom-checkbox ">
                <input name="paccheckboxlogireqemrdiag_test" value="8" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_8" onclick="paccheckboxlogireqemrdiagex.listdatacek(8)">
                <input name="paccheckboxlogireqemrdiag_testhid" value="90000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_8">
                <label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_8" value="Basis Crani" title="90,000.00" id="paccheckboxlogireqemrdiag_labeltest_8">Basis Crani</label>
              </div>
            </div>
          </div>
          <div class="col-md-6"><div class="form-group">
            <div class="custom-control custom-checkbox ">
              <input name="paccheckboxlogireqemrdiag_test" value="9" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_9" onclick="paccheckboxlogireqemrdiagex.listdatacek(9)"><input name="paccheckboxlogireqemrdiag_testhid" value="90000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_9"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_9" value="Calcaneus Dex" title="90,000.00" id="paccheckboxlogireqemrdiag_labeltest_9">Calcaneus Dex</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="10" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_10" onclick="paccheckboxlogireqemrdiagex.listdatacek(10)"><input name="paccheckboxlogireqemrdiag_testhid" value="90000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_10"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_10" value="Cervical Ap Lat" title="90,000.00" id="paccheckboxlogireqemrdiag_labeltest_10">Cervical Ap Lat</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="11" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_11" onclick="paccheckboxlogireqemrdiagex.listdatacek(11)"><input name="paccheckboxlogireqemrdiag_testhid" value="155000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_11"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_11" value="Cervical PA Lat Oblig" title="155,000.00" id="paccheckboxlogireqemrdiag_labeltest_11">Cervical PA Lat Oblig</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="12" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_12" onclick="paccheckboxlogireqemrdiagex.listdatacek(12)"><input name="paccheckboxlogireqemrdiag_testhid" value="90000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_12"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_12" value="Clavikula Dex" title="90,000.00" id="paccheckboxlogireqemrdiag_labeltest_12">Clavikula Dex</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="13" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_13" onclick="paccheckboxlogireqemrdiagex.listdatacek(13)"><input name="paccheckboxlogireqemrdiag_testhid" value="90000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_13"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_13" value="Wrist (Colles) Ap/Lat " title="90,000.00" id="paccheckboxlogireqemrdiag_labeltest_13">Wrist (Colles) Ap/Lat </label></div></div></div><div class="col-md-6">
                <div class="form-group">
                  <div class="custom-control custom-checkbox ">
                    <input name="paccheckboxlogireqemrdiag_test" value="14" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_14" onclick="paccheckboxlogireqemrdiagex.listdatacek(14)">
                    <input name="paccheckboxlogireqemrdiag_testhid" value="545000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_14">
                    <label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_14" value="Coolon in Loop" title="545,000.00" id="paccheckboxlogireqemrdiag_labeltest_14">Coolon in Loop</label>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <div class="custom-control custom-checkbox ">
                    <input name="paccheckboxlogireqemrdiag_test" value="15" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_15" onclick="paccheckboxlogireqemrdiagex.listdatacek(15)">
                    <input name="paccheckboxlogireqemrdiag_testhid" value="90000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_15">
                    <label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_15" value="Cruris ( Ap Lat )" title="90,000.00" id="paccheckboxlogireqemrdiag_labeltest_15">Cruris ( Ap Lat )</label>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <div class="custom-control custom-checkbox ">
                    <input name="paccheckboxlogireqemrdiag_test" value="44" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_44" onclick="paccheckboxlogireqemrdiagex.listdatacek(44)">
                    <input name="paccheckboxlogireqemrdiag_testhid" value="465000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_44">
                    <label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_44" value="Intra Venous Pylography" title="465,000.00" id="paccheckboxlogireqemrdiag_labeltest_44">Intra Venous Pylography</label>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <div class="custom-control custom-checkbox ">
                    <input name="paccheckboxlogireqemrdiag_test" value="45" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_45" onclick="paccheckboxlogireqemrdiagex.listdatacek(45)">
                    <input name="paccheckboxlogireqemrdiag_testhid" value="155000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_45">
                    <label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_45" value="Lumbalsacral AP LAT" title="155,000.00" id="paccheckboxlogireqemrdiag_labeltest_45">Lumbalsacral AP LAT</label>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <div class="custom-control custom-checkbox ">
                    <input name="paccheckboxlogireqemrdiag_test" value="46" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_46" onclick="paccheckboxlogireqemrdiagex.listdatacek(46)"><input name="paccheckboxlogireqemrdiag_testhid" value="90000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_46"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_46" value="Manus ( Ap Lat ) Dex" title="90,000.00" id="paccheckboxlogireqemrdiag_labeltest_46">Manus ( Ap Lat ) Dex</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="47" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_47" onclick="paccheckboxlogireqemrdiagex.listdatacek(47)"><input name="paccheckboxlogireqemrdiag_testhid" value="90000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_47"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_47" value="Mastoid Dex" title="90,000.00" id="paccheckboxlogireqemrdiag_labeltest_47">Mastoid Dex</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="48" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_48" onclick="paccheckboxlogireqemrdiagex.listdatacek(48)"><input name="paccheckboxlogireqemrdiag_testhid" value="155000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_48"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_48" value="Mastoid Sin" title="155,000.00" id="paccheckboxlogireqemrdiag_labeltest_48">Mastoid Sin</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="49" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_49" onclick="paccheckboxlogireqemrdiagex.listdatacek(49)"><input name="paccheckboxlogireqemrdiag_testhid" value="90000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_49"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_49" value="Nassal" title="90,000.00" id="paccheckboxlogireqemrdiag_labeltest_49">Nassal</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="50" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_50" onclick="paccheckboxlogireqemrdiagex.listdatacek(50)"><input name="paccheckboxlogireqemrdiag_testhid" value="335000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_50"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_50" value="Oeseophagus gram " title="335,000.00" id="paccheckboxlogireqemrdiag_labeltest_50">Oeseophagus gram </label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="51" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_51" onclick="paccheckboxlogireqemrdiagex.listdatacek(51)"><input name="paccheckboxlogireqemrdiag_testhid" value="90000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_51"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_51" value="Pedis ( Ap Lat) Dex" title="90,000.00" id="paccheckboxlogireqemrdiag_labeltest_51">Pedis ( Ap Lat) Dex</label></div></div></div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <div class="custom-control custom-checkbox ">
                          <input name="paccheckboxlogireqemrdiag_test" value="52" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_52" onclick="paccheckboxlogireqemrdiagex.listdatacek(52)">
                          <input name="paccheckboxlogireqemrdiag_testhid" value="90000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_52">
                          <label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_52" value="Pelvis" title="90,000.00" id="paccheckboxlogireqemrdiag_labeltest_52">Pelvis</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <div class="custom-control custom-checkbox ">
                          <input name="paccheckboxlogireqemrdiag_test" value="53" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_53" onclick="paccheckboxlogireqemrdiagex.listdatacek(53)">
                          <input name="paccheckboxlogireqemrdiag_testhid" value="90000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_53">
                          <label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_53" value="Pelvis Anak Bayi" title="90,000.00" id="paccheckboxlogireqemrdiag_labeltest_53">Pelvis Anak Bayi</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="54" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_54" onclick="paccheckboxlogireqemrdiagex.listdatacek(54)"><input name="paccheckboxlogireqemrdiag_testhid" value="90000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_54"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_54" value="Pelvis Dewasa" title="90,000.00" id="paccheckboxlogireqemrdiag_labeltest_54">Pelvis Dewasa</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="55" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_55" onclick="paccheckboxlogireqemrdiagex.listdatacek(55)"><input name="paccheckboxlogireqemrdiag_testhid" value="155000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_55"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_55" value="Pelvis Lihat IUD ( Ap Lat )" title="155,000.00" id="paccheckboxlogireqemrdiag_labeltest_55">Pelvis Lihat IUD ( Ap Lat )</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="56" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_56" onclick="paccheckboxlogireqemrdiagex.listdatacek(56)"><input name="paccheckboxlogireqemrdiag_testhid" value="155000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_56"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_56" value="Rheesee Dex Sin" title="155,000.00" id="paccheckboxlogireqemrdiag_labeltest_56">Rheesee Dex Sin</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="57" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_57" onclick="paccheckboxlogireqemrdiagex.listdatacek(57)"><input name="paccheckboxlogireqemrdiag_testhid" value="155000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_57"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_57" value="Skull ApLat" title="155,000.00" id="paccheckboxlogireqemrdiag_labeltest_57">Skull ApLat</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="58" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_58" onclick="paccheckboxlogireqemrdiagex.listdatacek(58)"><input name="paccheckboxlogireqemrdiag_testhid" value="155000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_58"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_58" value="Temporo Mandibulae Join" title="155,000.00" id="paccheckboxlogireqemrdiag_labeltest_58">Temporo Mandibulae Join</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="59" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_59" onclick="paccheckboxlogireqemrdiagex.listdatacek(59)"><input name="paccheckboxlogireqemrdiag_testhid" value="155000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_59"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_59" value="Thorakolumbal Ap Lat" title="155,000.00" id="paccheckboxlogireqemrdiag_labeltest_59">Thorakolumbal Ap Lat</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="custom-control custom-checkbox ">
                      <input name="paccheckboxlogireqemrdiag_test" value="60" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_60" onclick="paccheckboxlogireqemrdiagex.listdatacek(60)"><input name="paccheckboxlogireqemrdiag_testhid" value="90000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_60"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_60" value="Thorax Anak Bayi" title="90,000.00" id="paccheckboxlogireqemrdiag_labeltest_60">Thorax Anak Bayi</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="61" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_61" onclick="paccheckboxlogireqemrdiagex.listdatacek(61)"><input name="paccheckboxlogireqemrdiag_testhid" value="90000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_61"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_61" value="Thorax Dewasa" title="90,000.00" id="paccheckboxlogireqemrdiag_labeltest_61">Thorax Dewasa</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="62" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_62" onclick="paccheckboxlogireqemrdiagex.listdatacek(62)"><input name="paccheckboxlogireqemrdiag_testhid" value="335000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_62"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_62" value="Uper Gi Tractus" title="335,000.00" id="paccheckboxlogireqemrdiag_labeltest_62">Uper Gi Tractus</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="63" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_63" onclick="paccheckboxlogireqemrdiagex.listdatacek(63)"><input name="paccheckboxlogireqemrdiag_testhid" value="335000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_63"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_63" value="Urethrography" title="335,000.00" id="paccheckboxlogireqemrdiag_labeltest_63">Urethrography</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="64" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_64" onclick="paccheckboxlogireqemrdiagex.listdatacek(64)"><input name="paccheckboxlogireqemrdiag_testhid" value="335000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_64"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_64" value="Uretro - Cystography" title="335,000.00" id="paccheckboxlogireqemrdiag_labeltest_64">Uretro - Cystography</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="67" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_67" onclick="paccheckboxlogireqemrdiagex.listdatacek(67)"><input name="paccheckboxlogireqemrdiag_testhid" value="135000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_67"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_67" value="USG Kandungan" title="135,000.00" id="paccheckboxlogireqemrdiag_labeltest_67">USG Kandungan</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="75" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_75" onclick="paccheckboxlogireqemrdiagex.listdatacek(75)"><input name="paccheckboxlogireqemrdiag_testhid" value="90000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_75"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_75" value="Wates" title="90,000.00" id="paccheckboxlogireqemrdiag_labeltest_75">Wates</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="77" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_77" onclick="paccheckboxlogireqemrdiagex.listdatacek(77)"><input name="paccheckboxlogireqemrdiag_testhid" value="90000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_77"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_77" value="Ankle AP/LAT Dex" title="90,000.00" id="paccheckboxlogireqemrdiag_labeltest_77">Ankle AP/LAT Dex</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="79" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_79" onclick="paccheckboxlogireqemrdiagex.listdatacek(79)"><input name="paccheckboxlogireqemrdiag_testhid" value="90000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_79"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_79" value="Shoulder Dex" title="90,000.00" id="paccheckboxlogireqemrdiag_labeltest_79">Shoulder Dex</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="80" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_80" onclick="paccheckboxlogireqemrdiagex.listdatacek(80)"><input name="paccheckboxlogireqemrdiag_testhid" value="90000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_80"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_80" value="Elbow AP / Lat Dex" title="90,000.00" id="paccheckboxlogireqemrdiag_labeltest_80">Elbow AP / Lat Dex</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="82" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_82" onclick="paccheckboxlogireqemrdiagex.listdatacek(82)"><input name="paccheckboxlogireqemrdiag_testhid" value="155000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_82"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_82" value="Thorax A-P Ap / Lat" title="155,000.00" id="paccheckboxlogireqemrdiag_labeltest_82">Thorax A-P Ap / Lat</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="85" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_85" onclick="paccheckboxlogireqemrdiagex.listdatacek(85)"><input name="paccheckboxlogireqemrdiag_testhid" value="10000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_85"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_85" value="Jasa X-RAY Cyto" title="10,000.00" id="paccheckboxlogireqemrdiag_labeltest_85">Jasa X-RAY Cyto</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="93" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_93" onclick="paccheckboxlogireqemrdiagex.listdatacek(93)"><input name="paccheckboxlogireqemrdiag_testhid" value="90000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_93"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_93" value="Ankle AP/LAT Sin" title="90,000.00" id="paccheckboxlogireqemrdiag_labeltest_93">Ankle AP/LAT Sin</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="92" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_92" onclick="paccheckboxlogireqemrdiagex.listdatacek(92)"><input name="paccheckboxlogireqemrdiag_testhid" value="90000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_92"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_92" value="Calcaneus Sin" title="90,000.00" id="paccheckboxlogireqemrdiag_labeltest_92">Calcaneus Sin</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="91" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_91" onclick="paccheckboxlogireqemrdiagex.listdatacek(91)"><input name="paccheckboxlogireqemrdiag_testhid" value="90000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_91"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_91" value="Clavikula Sin" title="90,000.00" id="paccheckboxlogireqemrdiag_labeltest_91">Clavikula Sin</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="90" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_90" onclick="paccheckboxlogireqemrdiagex.listdatacek(90)"><input name="paccheckboxlogireqemrdiag_testhid" value="90000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_90"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_90" value="Elbow AP / Lat Sin" title="90,000.00" id="paccheckboxlogireqemrdiag_labeltest_90">Elbow AP / Lat Sin</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="89" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_89" onclick="paccheckboxlogireqemrdiagex.listdatacek(89)"><input name="paccheckboxlogireqemrdiag_testhid" value="90000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_89"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_89" value="Femur ( Ap Lat ) Sin" title="90,000.00" id="paccheckboxlogireqemrdiag_labeltest_89">Femur ( Ap Lat ) Sin</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="88" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_88" onclick="paccheckboxlogireqemrdiagex.listdatacek(88)"><input name="paccheckboxlogireqemrdiag_testhid" value="90000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_88"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_88" value="Manus ( Ap Lat ) Sin" title="90,000.00" id="paccheckboxlogireqemrdiag_labeltest_88">Manus ( Ap Lat ) Sin</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="custom-control custom-checkbox ">
                      <input name="paccheckboxlogireqemrdiag_test" value="87" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_87" onclick="paccheckboxlogireqemrdiagex.listdatacek(87)">
                      <input name="paccheckboxlogireqemrdiag_testhid" value="90000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_87">
                      <label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_87" value="Pedis ( Ap Lat) Sin" title="90,000.00" id="paccheckboxlogireqemrdiag_labeltest_87">Pedis ( Ap Lat) Sin</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="1" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_1" onclick="paccheckboxlogireqemrdiagex.listdatacek(1)"><input name="paccheckboxlogireqemrdiag_testhid" value="90000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_1"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_1" value="Abdomen Anak Bayi" title="90,000.00" id="paccheckboxlogireqemrdiag_labeltest_1">Abdomen Anak Bayi</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="39" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_39" onclick="paccheckboxlogireqemrdiagex.listdatacek(39)"><input name="paccheckboxlogireqemrdiag_testhid" value="1000000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_39"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_39" value="CT SCAN Thyroid" title="1,000,000.00" id="paccheckboxlogireqemrdiag_labeltest_39">CT SCAN Thyroid</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="40" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_40" onclick="paccheckboxlogireqemrdiagex.listdatacek(40)"><input name="paccheckboxlogireqemrdiag_testhid" value="90000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_40"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_40" value="Esler (Mandibulae) " title="90,000.00" id="paccheckboxlogireqemrdiag_labeltest_40">Esler (Mandibulae) </label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="41" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_41" onclick="paccheckboxlogireqemrdiagex.listdatacek(41)"><input name="paccheckboxlogireqemrdiag_testhid" value="90000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_41"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_41" value="Femur ( Ap Lat ) Dex" title="90,000.00" id="paccheckboxlogireqemrdiag_labeltest_41">Femur ( Ap Lat ) Dex</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="42" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_42" onclick="paccheckboxlogireqemrdiagex.listdatacek(42)"><input name="paccheckboxlogireqemrdiag_testhid" value="335000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_42"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_42" value="Fistulography" title="335,000.00" id="paccheckboxlogireqemrdiag_labeltest_42">Fistulography</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="43" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_43" onclick="paccheckboxlogireqemrdiagex.listdatacek(43)"><input name="paccheckboxlogireqemrdiag_testhid" value="90000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_43"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_43" value="Humeri ( Ap Lat )" title="90,000.00" id="paccheckboxlogireqemrdiag_labeltest_43">Humeri ( Ap Lat )</label>
                </div>
              </div>
            </div>
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
      <div class="row"><div class="col-md-12"><div class="row" id="paccheckboxlogireqemrdiag_grouptest_2"><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="66" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_66" onclick="paccheckboxlogireqemrdiagex.listdatacek(66)"><input name="paccheckboxlogireqemrdiag_testhid" value="135000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_66"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_66" value="USG Cranium ( 0 - 10 )" title="135,000.00" id="paccheckboxlogireqemrdiag_labeltest_66">USG Cranium ( 0 - 10 )</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="78" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_78" onclick="paccheckboxlogireqemrdiagex.listdatacek(78)"><input name="paccheckboxlogireqemrdiag_testhid" value="350000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_78"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_78" value="USG Echocardiograpi" title="350,000.00" id="paccheckboxlogireqemrdiag_labeltest_78">USG Echocardiograpi</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="68" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_68" onclick="paccheckboxlogireqemrdiagex.listdatacek(68)"><input name="paccheckboxlogireqemrdiag_testhid" value="135000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_68"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_68" value="USG Mammae" title="135,000.00" id="paccheckboxlogireqemrdiag_labeltest_68">USG Mammae</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="69" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_69" onclick="paccheckboxlogireqemrdiagex.listdatacek(69)"><input name="paccheckboxlogireqemrdiag_testhid" value="135000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_69"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_69" value="USG Mata" title="135,000.00" id="paccheckboxlogireqemrdiag_labeltest_69">USG Mata</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="70" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_70" onclick="paccheckboxlogireqemrdiagex.listdatacek(70)"><input name="paccheckboxlogireqemrdiag_testhid" value="135000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_70"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_70" value="USG Parotis " title="135,000.00" id="paccheckboxlogireqemrdiag_labeltest_70">USG Parotis </label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="71" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_71" onclick="paccheckboxlogireqemrdiagex.listdatacek(71)"><input name="paccheckboxlogireqemrdiag_testhid" value="135000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_71"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_71" value="USG Testis" title="135,000.00" id="paccheckboxlogireqemrdiag_labeltest_71">USG Testis</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="72" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_72" onclick="paccheckboxlogireqemrdiagex.listdatacek(72)"><input name="paccheckboxlogireqemrdiag_testhid" value="135000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_72"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_72" value="USG Thyroid" title="135,000.00" id="paccheckboxlogireqemrdiag_labeltest_72">USG Thyroid</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="73" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_73" onclick="paccheckboxlogireqemrdiagex.listdatacek(73)"><input name="paccheckboxlogireqemrdiag_testhid" value="135000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_73"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_73" value="USG Urologi" title="135,000.00" id="paccheckboxlogireqemrdiag_labeltest_73">USG Urologi</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="74" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_74" onclick="paccheckboxlogireqemrdiagex.listdatacek(74)"><input name="paccheckboxlogireqemrdiag_testhid" value="135000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_74"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_74" value="USG Vasculer " title="135,000.00" id="paccheckboxlogireqemrdiag_labeltest_74">USG Vasculer </label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="83" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_83" onclick="paccheckboxlogireqemrdiagex.listdatacek(83)"><input name="paccheckboxlogireqemrdiag_testhid" value="135000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_83"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_83" value="USG THORAKS" title="135,000.00" id="paccheckboxlogireqemrdiag_labeltest_83">USG THORAKS</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="81" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_81" onclick="paccheckboxlogireqemrdiagex.listdatacek(81)"><input name="paccheckboxlogireqemrdiag_testhid" value="135000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_81"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_81" value="USG Soft Tissue" title="135,000.00" id="paccheckboxlogireqemrdiag_labeltest_81">USG Soft Tissue</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="65" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_65" onclick="paccheckboxlogireqemrdiagex.listdatacek(65)"><input name="paccheckboxlogireqemrdiag_testhid" value="135000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_65"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_65" value="USG Abdomen" title="135,000.00" id="paccheckboxlogireqemrdiag_labeltest_65">USG Abdomen</label></div></div></div></div></div></div></div></div><div class="form-group row"></div>
    </div>
    <div class="col-md-6">
      <div class="card"><div class="card-header"><label class="col-form-label font-weight-bold">CT SCAN</label></div><div class="card-body" style="height: 250px;  overflow-y: scroll;"><div class="row"><div class="col-md-12"><div class="row" id="paccheckboxlogireqemrdiag_grouptest_11"><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="28" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_28" onclick="paccheckboxlogireqemrdiagex.listdatacek(28)"><input name="paccheckboxlogireqemrdiag_testhid" value="1200000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_28"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_28" value="CT SCAN Kontras Sinus" title="1,200,000.00" id="paccheckboxlogireqemrdiag_labeltest_28">CT SCAN Kontras Sinus</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="29" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_29" onclick="paccheckboxlogireqemrdiagex.listdatacek(29)"><input name="paccheckboxlogireqemrdiag_testhid" value="1500000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_29"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_29" value="CT SCAN Kontras Thoraks " title="1,500,000.00" id="paccheckboxlogireqemrdiag_labeltest_29">CT SCAN Kontras Thoraks </label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="30" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_30" onclick="paccheckboxlogireqemrdiagex.listdatacek(30)"><input name="paccheckboxlogireqemrdiag_testhid" value="1200000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_30"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_30" value="CT SCAN Kontras Thyroid " title="1,200,000.00" id="paccheckboxlogireqemrdiag_labeltest_30">CT SCAN Kontras Thyroid </label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="31" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_31" onclick="paccheckboxlogireqemrdiagex.listdatacek(31)"><input name="paccheckboxlogireqemrdiag_testhid" value="1000000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_31"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_31" value="CT SCAN Nasofarink " title="1,000,000.00" id="paccheckboxlogireqemrdiag_labeltest_31">CT SCAN Nasofarink </label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="32" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_32" onclick="paccheckboxlogireqemrdiagex.listdatacek(32)"><input name="paccheckboxlogireqemrdiag_testhid" value="1100000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_32"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_32" value="CT SCAN Nasofarink 3D" title="1,100,000.00" id="paccheckboxlogireqemrdiag_labeltest_32">CT SCAN Nasofarink 3D</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="33" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_33" onclick="paccheckboxlogireqemrdiagex.listdatacek(33)"><input name="paccheckboxlogireqemrdiag_testhid" value="1000000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_33"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_33" value="CT SCAN Orbita" title="1,000,000.00" id="paccheckboxlogireqemrdiag_labeltest_33">CT SCAN Orbita</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="34" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_34" onclick="paccheckboxlogireqemrdiagex.listdatacek(34)"><input name="paccheckboxlogireqemrdiag_testhid" value="1100000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_34"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_34" value="CT SCAN Pelvis 3D" title="1,100,000.00" id="paccheckboxlogireqemrdiag_labeltest_34">CT SCAN Pelvis 3D</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="35" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_35" onclick="paccheckboxlogireqemrdiagex.listdatacek(35)"><input name="paccheckboxlogireqemrdiag_testhid" value="1000000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_35"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_35" value="CT SCAN Servical thorx lumbal" title="1,000,000.00" id="paccheckboxlogireqemrdiag_labeltest_35">CT SCAN Servical thorx lumbal</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="36" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_36" onclick="paccheckboxlogireqemrdiagex.listdatacek(36)"><input name="paccheckboxlogireqemrdiag_testhid" value="1100000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_36"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_36" value="CT SCAN Servic thorx lumb 3 D" title="1,100,000.00" id="paccheckboxlogireqemrdiag_labeltest_36">CT SCAN Servic thorx lumb 3 D</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="37" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_37" onclick="paccheckboxlogireqemrdiagex.listdatacek(37)"><input name="paccheckboxlogireqemrdiag_testhid" value="1300000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_37"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_37" value="CT SCAN Thoraks" title="1,300,000.00" id="paccheckboxlogireqemrdiag_labeltest_37">CT SCAN Thoraks</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="38" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_38" onclick="paccheckboxlogireqemrdiagex.listdatacek(38)"><input name="paccheckboxlogireqemrdiag_testhid" value="1400000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_38"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_38" value="CT SCAN Thoraks 3D" title="1,400,000.00" id="paccheckboxlogireqemrdiag_labeltest_38">CT SCAN Thoraks 3D</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="16" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_16" onclick="paccheckboxlogireqemrdiagex.listdatacek(16)"><input name="paccheckboxlogireqemrdiag_testhid" value="1070000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_16"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_16" value="CT SCAN Abdomen" title="1,070,000.00" id="paccheckboxlogireqemrdiag_labeltest_16">CT SCAN Abdomen</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="84" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_84" onclick="paccheckboxlogireqemrdiagex.listdatacek(84)"><input name="paccheckboxlogireqemrdiag_testhid" value="50000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_84"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_84" value="Jasa Cyto CT SCAN" title="50,000.00" id="paccheckboxlogireqemrdiag_labeltest_84">Jasa Cyto CT SCAN</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="17" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_17" onclick="paccheckboxlogireqemrdiagex.listdatacek(17)"><input name="paccheckboxlogireqemrdiag_testhid" value="1170000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_17"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_17" value="CT SCAN Abdomen 3D" title="1,170,000.00" id="paccheckboxlogireqemrdiag_labeltest_17">CT SCAN Abdomen 3D</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="18" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_18" onclick="paccheckboxlogireqemrdiagex.listdatacek(18)"><input name="paccheckboxlogireqemrdiag_testhid" value="1000000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_18"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_18" value="CT SCAN Extremitas 3D" title="1,000,000.00" id="paccheckboxlogireqemrdiag_labeltest_18">CT SCAN Extremitas 3D</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="19" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_19" onclick="paccheckboxlogireqemrdiagex.listdatacek(19)"><input name="paccheckboxlogireqemrdiag_testhid" value="1000000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_19"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_19" value="CT SCAN Kepala" title="1,000,000.00" id="paccheckboxlogireqemrdiag_labeltest_19">CT SCAN Kepala</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="20" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_20" onclick="paccheckboxlogireqemrdiagex.listdatacek(20)"><input name="paccheckboxlogireqemrdiag_testhid" value="1100000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_20"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_20" value="CT SCAN Kepala 3 D" title="1,100,000.00" id="paccheckboxlogireqemrdiag_labeltest_20">CT SCAN Kepala 3 D</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="21" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_21" onclick="paccheckboxlogireqemrdiagex.listdatacek(21)"><input name="paccheckboxlogireqemrdiag_testhid" value="1500000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_21"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_21" value="CT SCAN Kontras Abd 3D Colon" title="1,500,000.00" id="paccheckboxlogireqemrdiag_labeltest_21">CT SCAN Kontras Abd 3D Colon</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="22" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_22" onclick="paccheckboxlogireqemrdiagex.listdatacek(22)"><input name="paccheckboxlogireqemrdiag_testhid" value="1400000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_22"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_22" value="CT SCAN Kontras Abdomen" title="1,400,000.00" id="paccheckboxlogireqemrdiag_labeltest_22">CT SCAN Kontras Abdomen</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="23" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_23" onclick="paccheckboxlogireqemrdiagex.listdatacek(23)"><input name="paccheckboxlogireqemrdiag_testhid" value="1000000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_23"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_23" value="CT SCAN Kontras Extremitas" title="1,000,000.00" id="paccheckboxlogireqemrdiag_labeltest_23">CT SCAN Kontras Extremitas</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="24" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_24" onclick="paccheckboxlogireqemrdiagex.listdatacek(24)"><input name="paccheckboxlogireqemrdiag_testhid" value="1200000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_24"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_24" value="CT SCAN Kontras Kepala" title="1,200,000.00" id="paccheckboxlogireqemrdiag_labeltest_24">CT SCAN Kontras Kepala</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="25" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_25" onclick="paccheckboxlogireqemrdiagex.listdatacek(25)"><input name="paccheckboxlogireqemrdiag_testhid" value="1200000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_25"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_25" value="CT SCAN Kontras Nasofarink" title="1,200,000.00" id="paccheckboxlogireqemrdiag_labeltest_25">CT SCAN Kontras Nasofarink</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="26" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_26" onclick="paccheckboxlogireqemrdiagex.listdatacek(26)"><input name="paccheckboxlogireqemrdiag_testhid" value="1200000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_26"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_26" value="CT SCAN Kontras Orbita" title="1,200,000.00" id="paccheckboxlogireqemrdiag_labeltest_26">CT SCAN Kontras Orbita</label></div></div></div><div class="col-md-6"><div class="form-group"><div class="custom-control custom-checkbox "><input name="paccheckboxlogireqemrdiag_test" value="27" type="checkbox" class="custom-control-input" id="paccheckboxlogireqemrdiag_test_27" onclick="paccheckboxlogireqemrdiagex.listdatacek(27)"><input name="paccheckboxlogireqemrdiag_testhid" value="1200000" hidden="true" id="paccheckboxlogireqemrdiag_testhid_27"><label class="custom-control-label" for="paccheckboxlogireqemrdiag_test_27" value="CT SCAN Kontras Pelvis" title="1,200,000.00" id="paccheckboxlogireqemrdiag_labeltest_27">CT SCAN Kontras Pelvis</label></div></div></div></div></div></div></div></div><div class="form-group row"></div>
    </div>
  </div>
</div>
<div class="modal-footer">
  <button class="btn btn-primary" >Input</button>&nbsp;
  <button class="btn btn-secondary" data-dismiss="modal"></button>
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
  <input type="text" name="operatorcpptirja" id="operatorcpptirja">
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
<!-- modal diagnosa perawat -->
<div class="modal fade" id="Modaldiagnsoaperawat">
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
          <tbody id="tbodydiagnosaperawat">

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
<div class="modal fade" id="ModalShowsoapkepermIrja">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header"><h3>Info!!</h3></div>
      <div class="modal-body" >
        <h4>CPPT sudah terinput,apakah akan diupdate?</h4>
        <div class="row">
          <div class="col-md-6">
            <label>Tekanan Darah</label>  
            <input type="text" class="form-control form-control-xs" id="cppttekanandarahkepermirja2" name="cppttekanandarahermirja2">
          </div>
          <div class="col-md-6">
            <label>Suhu</label>  
            <input type="text" class="form-control form-control-xs" id="cpptsuhukepermirja2" name="cpptsuhuermirja2">
          </div>
          <div class="col-md-6">
           <label>Nadi</label>   
           <input type="text" class="form-control form-control-xs" id="cpptnadikepermirja2" name="cpptnadiermirja2">
         </div>
         <div class="col-md-6">
          <label>Saturasi</label>  
          <input type="text" class="form-control form-control-xs" id="cpptsaturasikepermirja2" name="cpptsaturasiermirja2">
        </div>
        <div class="col-md-6">
          <label>Sp02</label>  
          <input type="text" class="form-control form-control-xs" id="cpptSpo2kepermirja2" name="cpptSpo2ermirja2">
        </div>
        <div class="col-md-12">
          <label>Subjek</label>  
          <input type="text" class="form-control form-control-xs" id="subjekkepirja2" name="subjekirja2">
        </div>
        <div class="col-md-12">
          <label>Objek</label>
          <input type="text" class="form-control form-control-xs" id="objekkepirja2" name="objekirja2">
        </div>
        <div class="col-md-12">
          <label>Assesmen</label>
          <input type="text" class="form-control form-control-xs" id="assesmenkepirja2" name="assesmenirja2">
        </div>
        <div class="col-md-12">
          <label>Intervensi</label>
          <input type="text" class="form-control form-control-xs" id="intervensikepirja2" name="intervensiirja2">
        </div>
        <div class="col-md-12">
          <label>Instruksi</label>
          <input type="text" class="form-control form-control-xs" id="instruksikepermirja2" name="instruksiermirja2">
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn btn-secondary" onclick="updatesoapiperawatermrwj()">Update</button>
      <button class="btn btn-primary" onclick="$('#ModalShowsoapkepermIrja').modal('hide')">Tidak</button>
    </div>
  </div>
</div>
</div>
<div class="modal fade" id="ModalShowAssesmenKepIrja">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header"><h3>Info!!</h3></div>
      <div class="modal-body" >
        <h4>Keluhan</h4>
        <input type="text" class="form-control" name="KeluhanAssesmenKepIrja" id="KeluhanAssesmenKepIrja">
        <h4>Riwayat Penyakit</h4>
        <input type="text" class="form-control" name="RiwayatPenyakitAssesmenKepIrja" id="RiwayatPenyakitAssesmenKepIrja">
        <h4>Riwayat Alergi</h4>
        <input type="text" class="form-control" name="RiwayatAlergiAssesmenKepIrja" id="RiwayatAlergiAssesmenKepIrja">
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" onclick="createsoapikepermirja()">Soap I</button>
        <button class="btn btn-primary" onclick="createassesmenulangkepermirja()">Assesmen Ulang</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="ModalShowaddmrpenyakitermirja">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        Tambah Diagnosa
      </div>
      <div class="modal-body">
        <input class="form-control form-control-xs" id="textTambahdiagnosaresumeErmIrja">
        <div id="DivTambahdiagnosaresumeErmIrja"></div>
      </div>
    </div>
  </div>
</div>
<!-- ttd -->
<div class="modal fade"  id="ModalTtdAssesmenPerawatIrja" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header"></div>
      <div class="modal-body">
        <div id="paint_TtdAssesmenPerawatIrja"></div>
      </div>
      <div class="modal-footer">
        <button onclick="takeTtdAssesmenPerawatIrja()">Simpan</button>
        <button onclick="$('#ModalTtdAssesmenPerawatIrja').modal('hide')">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade"  id="ModalTtdAssesmenPasienIrja" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header"></div>
      <div class="modal-body">
        <div id="paint_TtdAssesmenPasienIrja"></div>
      </div>
      <div class="modal-footer">
        <button onclick="takeTtdAssesmenPasienIrja()">Simpan</button>
        <button onclick="$('#ModalTtdAssesmenPasienIrja').modal('hide')">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  var penyakitPendaftaranErmIrja;
  var ttd;
  var tesPaint;
  var tesPaintImg;
  var id_transaksi='';
  var data = {
    norms:'',
    namas:'',
    units:'',
    id_units:'',
    id_transaksis:'',
  };
  var gambarBlank = true;
  var localis;
  $(document).ready(function() {
    setTimeout(refresh_pendft_rwj, 1000);  
    ermirja_listpasien();
    tampilpekerjaanperermirja();
    tampilagamaperermirja();
    selectpoliuser();

  });

  function tampilpekerjaanperermirja() {
    apiPOST('Data_Sosial/pekerjaan', null,hasil=>{
      var pekerjaan='';
      var a=hasil['data'];
      pekerjaan = ""
      for (var i = 0; i < a.length; i++) {
        pekerjaan+='<option value="'+a[i]['kd_pekerjaan']+'">'+a[i]['pekerjaan']+'</option>';
      }
      document.getElementById('pekerjaanAssKeperawatanErmIrja').innerHTML=pekerjaan;
    });
  }
  function tampilkeperawatanpenunjangirja(rm){

    var barisrmhis = ''; 
    var param = {
      norm: rm,
    };
    apiPOST('Rekammedisirja/datapenunjangpasienirja', param, hasil => {
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
          barisrmhis += '<tbody id="bodypenunjanglabirja'+a[i]['id_kunjungan_lab']+'"></tbody>';
          barisrmhis += '</table>';
          barisrmhis += '</div>';
          barisrmhis += '</div>';
          barisrmhis += '</div>';
          barisrmhis += '</div>';
          detailkeperawatanlabermirja(a[i]['id_kunjungan_lab']);
      // eresep(a[i]['id_kunjungan'],a[i].tgl_masuk,a[i].tgl_masuk);
      // obatditerima(a[i]['id_kunjungan']);
      // detailmrpenyakitmedermirja(a[i]['id_kunjungan']);
      // detailicd9medermirja(a[i]['id_kunjungan']);

        }
        document.getElementById('listhistorikeperawatanpenunjangirja').innerHTML = barisrmhis;
      }
    })

  }
  //tampil radiologi
  function tampilkeperawatanpenunjangradiologiirja(){

    var barisrmhis = ''; 
    var param = {
      norm: document.getElementById('rmErmKeperawatanIrja').value,
    };
    apiPOST('Rekammedisirja/datapenunjangradiologipasienirja', param, hasil => {
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
        document.getElementById('listhistorikeperawatanpenunjangradirja').innerHTML = barisrmhis;
      }
    })
  }
  function hitungimtkepirja() {
    var imt='';
    var num='';
    var a=document.getElementById('tinggiErmKeperawatanIrja').value;
    var b=document.getElementById('bbErmKeperawatanIrja').value;
    var num=a/100;
    imt=b/(num*num);
    document.getElementById('imtErmKeperawatanIrja').value=imt;
  }
  function tampilagamaperermirja() {
    apiPOST('Data_Sosial/agama', null,hasil=>{
      var agama='';
      var a=hasil['data'];
      agama = ""
      for (var i = 0; i < a.length; i++) {
        agama+='<option value="'+a[i]['kd_agama']+'">'+a[i]['agama']+'</option>';
      }
      document.getElementById('AgamaAssKeperawatanErmIrja').innerHTML=agama;
    });
  }
  $('#searchPxERMKeperawatanrwj').show();
  $('#RWJERMKeperawatan_nm_pasiencari').hide();
  $("#DivErmKeperawatan").hide();
  function tampilmodalcreateseprwj(e) {
   if (e.keyCode == 13) {
    $('#ModalCreateSEP').modal("show");
    document.getElementById('ErmKeperawatanIrjanokartu').value=document.getElementById('ErmKeperawatanIrjanoasuransi').value;
  }
}
$(document).on('keyup', '#textTambahdiagnosaresumeErmIrja', function(e) {
  if($(this).val() !== '')
  {
   var charCode = e.which || e.keyCode;
   if(charCode == 40)
   {
    penyakittambahresumeermirja();
  } 
  else if(charCode == 38)
  {
    penyakittambahresumeermirja();
  }
  else    (charCode == 13)
  {
    penyakittambahresumeermirja();
  }
}else{
  document.getElementById("DivTambahdiagnosaresumeErmIrja").innerHTML="";
}
})
function penyakittambahresumeermirja() {
  var param ={id:document.getElementById("textTambahdiagnosaresumeErmIrja").value,};
  apiPOST('Kunjungan/icd', param,hasil=>{
    var a=hasil['icd'];
    var unit='';
    for (var i = 0; i < a.length; i++) {
      unit+='<button class="btn btn-primary"  onclick="pilihPenyakittambahresumeermirja(`'+a[i]['id_penyakit']+'|'+a[i]['penyakit']+'`)">'+a[i]['penyakit']+'</button><br>';
    }
    document.getElementById('DivTambahdiagnosaresumeErmIrja').innerHTML=unit;
  });
}
function pilihPenyakittambahresumeermirja(kode) {
  var res = kode.split('|');
  var icd = res[0];
  $('#ModalTambahdiagnosaresumeErmIrja').modal('hide');
  document.getElementById("DivTambahdiagnosaresumeErmIrja").innerHTML="";
  var param={
    rm     :document.getElementById('rmErmKeperawatanIrja').value,
    unit   :document.getElementById('idunitErmKeperawatanIrja').value,
    id_kunjungan :document.getElementById('idKunjunganErmKeperawatanIrja').value,
    kode   :icd,
    stat   :2,
  };
  apiPOST('Rekammedisirja/addmrpenyakitirja',param,hasil=>{
  });

}
function tesSetPolos(){
  localis.show();return;
  ttd.setPolosBG();
}
function aktifPaintPerawat(){
  localis = new Paint('localis', 
    {'height': 100,'width':100},
    {hiddenTools: ['select', 'settings', 'pixelize', 'crop', 'line', 'arrow', 'rect', 'ellipse', 'rotate', 'resize',  'save', 'open', 'zoomin', 'zoomout', 'bucket','eraser','text','undo','redo']});
}
function showlocalisPerawat(){
  localis.show();
}
/*function aktifPaint(){
  var lokasiTesPaint = document.getElementById('tesPaint');
  tesPaintImg        = document.createElement('img');
  lokasiTesPaint.appendChild(tesPaintImg);
  var tesPaintPaint  = document.createElement('div');
  tesPaintPaint.setAttribute('id', 'tesPaint-paint');
  lokasiTesPaint.appendChild(tesPaintPaint);
  tesPaint = Painterro({
    id: 'tesPaint-paint',
    defaultTool: 'brush',
    onImageLoaded: function(){
      tesPaint.doScale({width: 450, height: 450});
    },
    onBeforeClose: function(hasUnsavedChaged, done){
      tesPaint.doScale({width: 450, height: 450});
      tesPaint.save();
      done(true);
    },
    saveHandler: function (image, done) {
     tesPaintImg.src = image.asDataURL();
     gambarBlank = false;
     done(true);
   },
   colorScheme: {
    inputBorderColor: '#000000'
  },
  hiddenTools: ['select', 'settings', 'pixelize', 'crop', 'line', 'arrow', 'rect', 'ellipse', 'rotate', 'resize',  'save', 'open', 'zoomin', 'zoomout', 'bucket','eraser','text','undo','redo']
});

  ttd = new DrawingPaint('paint_assesmen', {'height': 200,'width':200});
}*/

/*function showPainterro(){
  tesPaint.show(gambarBlank);
}
*/
/*function aktifwpaint() {
  $("#wPaint_assesmen").wPaint({
   menuOffsetLeft: 0,
   menuOffsetTop: 5,
   strokeStyle: '#000000',
   fillStyle:'#000000',
   fontSize:'12',
   lineWidth:'1', 
   menuOrientation      :'horizontal' ,
 });
          //document.getElementById("wPaint_assesmen_kulit").id = "wPaint_assesmen";
}*/
$(document).on('keyup', '#searchPxERMKeperawatanrwj', function(e) {
  if($(this).val() !== '')
  {
   var charCode = e.which || e.keyCode;
   if(charCode == 40)
   {
    ermirja_listpasien_by();
  } 
  else if(charCode == 38)
  {
    ermirja_listpasien_by();
  }
  else    (charCode == 13)
  {
    ermirja_listpasien_by();
  }
}else{
  document.getElementById("ermKeperawatanirja_listpasien").innerHTML="";
}
})

function ermirja_listpasien_by(){  

  var listParam = [
    'searchPxERMKeperawatanrwj', 'RWJERMKeperawatan_nm_pasiencari'
    ];
  var param = {
    norm    : document.getElementById('searchPxERMKeperawatanrwj').value,
    tgl     : document.getElementById('tglasskepcariby').value,      
    unit_user:user.unit_akses,
  };
  apiPOST("Rekammedisirja/listpasienby", param, hasil => {   
    $('#ermKeperawatanirja_listpasien').html('');
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
        $('#ermKeperawatanirja_listpasien').append(Baris);
        document.getElementById('searchPxERMKeperawatanrwj').value = '';
        document.getElementById('RWJERMKeperawatan_nm_pasiencari').value = '';
      }else{

        var Baris = "";
        var a = hasil['data'];
        for (var i = 0; i < a.length; i++) {
          var tglkunj   = a[i].tgl_masuk;
          var norm      = a[i].no_rm;
          var nama      = a[i].nama;
          var alamat    = a[i].alamat;
          var umur      = a[i].tgl_lahir;
          var penjamin  = a[i].nama_penjamin;
          var sep       = a[i].no_sjp;
          var telp      = a[i].telepon;
          var unit      = a[i].nama_unit;
          var kunjungan = a[i].id_kunjungan;
          var id_unit   = a[i].id_unit;
          var kd_agama   = a[i].kd_agama;
          var nama_unit = a[i].nama_unit;
          var kd_pekerjaan   = a[i].kd_pekerjaan;
          var kd_pendidikan   = a[i].kd_pendidikan;
          var soap      = a[i].soap;
          var id_transaksi=a[i].id_transaksi;
          var id_penjamin=a[i].id_penjamin;
          var nama_dpjp=a[i].nama_pegawai;
          var jam_masuk = a[i].jam_masuk.substring(0, 16);
          

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
          Baris += '<p class="p-0 mb-1" style="font-size:14px; text-align: center;"><i class="fa fa-clock"></i> '+jam_masuk+'</p>';
          Baris += '</div>';
          Baris += '<div class="icon">';
          Baris += '<i class="fa fa-user"></i>';
          Baris += '</div>';
          Baris += '<a href="#" class="small-box-footer" style="background-color: darkgreen;" onclick="tampilPasienErmKeperawatanIrja('+"'"+norm+"','"+unit+"','"+kunjungan+"','"+id_unit+"','"+nama+"','"+kd_agama+"','"+kd_pekerjaan+"','"+kd_pendidikan+"','"+nama_dpjp+"','"+id_transaksi+"'"+')">Klik Detail <i class="fas fa-arrow-circle-right"></i></a>';
          Baris += '</div>';
          Baris += '</div>'; 

        }
        $('#ermKeperawatanirja_listpasien').append(Baris);
      }       
    }

  });  
};
function ermirja_listpasien_byunit(){  

  var listParam = [
    'searchPxERMKeperawatanrwj', 'RWJERMKeperawatan_nm_pasiencari'
    ];
  var param = {
    norm    : document.getElementById('searchPxERMKeperawatanrwj').value,
    tgl     : document.getElementById('tglasskepcariby').value,      
    unit_user:document.getElementById('selectpoliuser').value,
  };
  apiPOST("Rekammedisirja/listpasienbyunit", param, hasil => {   
    $('#ermKeperawatanirja_listpasien').html('');
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
        $('#ermKeperawatanirja_listpasien').append(Baris);
        document.getElementById('searchPxERMKeperawatanrwj').value = '';
        document.getElementById('RWJERMKeperawatan_nm_pasiencari').value = '';
      }else{

        var Baris = "";
        var a = hasil['data'];
        for (var i = 0; i < a.length; i++) {
          var tglkunj   = a[i].tgl_masuk;
          var norm      = a[i].no_rm;
          var nama      = a[i].nama;
          var alamat    = a[i].alamat;
          var umur      = a[i].tgl_lahir;
          var penjamin  = a[i].nama_penjamin;
          var sep       = a[i].no_sjp;
          var telp      = a[i].telepon;
          var unit      = a[i].nama_unit;
          var kunjungan = a[i].id_kunjungan;
          var id_unit   = a[i].id_unit;
          var kd_agama   = a[i].kd_agama;
          var nama_unit = a[i].nama_unit;
          var kd_pekerjaan   = a[i].kd_pekerjaan;
          var kd_pendidikan   = a[i].kd_pendidikan;
          var soap      = a[i].soap;
          var id_transaksi=a[i].id_transaksi;
          var id_penjamin=a[i].id_penjamin;
          var nama_dpjp=a[i].nama_pegawai;
          var jam_masuk = a[i].jam_masuk.substring(0, 16);
          

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
          Baris += '<p class="p-0 mb-1" style="font-size:14px; text-align: center;"><i class="fa fa-clock"></i> '+jam_masuk+'</p>';
          Baris += '</div>';
          Baris += '<div class="icon">';
          Baris += '<i class="fa fa-user"></i>';
          Baris += '</div>';
          Baris += '<a href="#" class="small-box-footer" style="background-color: darkgreen;" onclick="tampilPasienErmKeperawatanIrja('+"'"+norm+"','"+unit+"','"+kunjungan+"','"+id_unit+"','"+nama+"','"+kd_agama+"','"+kd_pekerjaan+"','"+kd_pendidikan+"','"+nama_dpjp+"','"+id_transaksi+"'"+')">Klik Detail <i class="fas fa-arrow-circle-right"></i></a>';
          Baris += '</div>';
          Baris += '</div>'; 

        }
        $('#ermKeperawatanirja_listpasien').append(Baris);
      }       
    }

  });  
};
function tampilkunjunganpasienaskepermrwj(){
  var rm    =document.getElementById('rmErmKeperawatanIrja').value;
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
      barisrmhis += '<button type="button" class="btn bg-gradient-secondary btn-xs" onclick="assesmendokterhistoriasskepermrwj('+a[i]['id_kunjungan']+')"> <i class="fas fa-book-medical"></i> Assesmen Dokter</button>';
      barisrmhis += ' | <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="assesmenperawathistoriasskepermrwj(`'+a[i]['id_kunjungan']+'`,`'+a[i]['id_unit']+'`)"> <i class="fas fa-book-medical"></i> Assesmen Perawat</button>';
      barisrmhis += ' | <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="penunjangmedishistori(event)"> <i class="fas fa-book-medical"></i> Penunjang Medis</button>';
      barisrmhis += ' | <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="edukasimedishistori(event)"> <i class="fas fa-book-medical"></i> Edukasi</button>';  
      barisrmhis += '</div>';
      barisrmhis += '<div class="col-md-12" style="padding-top: 10px;">';  
      barisrmhis += '<div class="info-box mb-0" id="idpanelhistorirm'+a[i]['id_kunjungan']+'">';  
      barisrmhis += 'Silahkan Pilih Button Diatas';
      barisrmhis += '</div>';
      barisrmhis += '<div class="col-md-12" style="padding-top: 10px;">';
      barisrmhis += '<div class="info-box mb-0" id="idpanelhistorirmperawat'+a[i]['id_kunjungan']+'">';
      barisrmhis += '</div>';

      barisrmhis += '</div>';
      barisrmhis += '<div class="col-md-12" id="detailsoapi'+a[i]['id_kunjungan']+'">'; 
      barisrmhis += '</div>';
      barisrmhis += '<h4>Penyakit &nbsp;<i class="fas fa-plus" onclick="addmrpenyakitermirja()"></i></h4>';
      barisrmhis += '<div class="col-md-12" id="detailmrpenyakitkepirja'+a[i]['id_kunjungan']+'">'; 
      barisrmhis += '</div>';
      barisrmhis += '<h4>Eresep</h4>';
      barisrmhis += '<div class="row" id="eresephistoriermirja'+a[i]['id_kunjungan']+'">'; 
      barisrmhis += '</div>';
      barisrmhis += '</div>';
      barisrmhis += '</div>';
      barisrmhis += '</div>';
      barisrmhis += '</div>';
      barisrmhis += '</div>';
      barisrmhis += '</div>';
      detailsoapiasskepermrwj(a[i]['id_kunjungan']);
      eresepviewkepermrwj(a[i]['id_kunjungan'],a[i].tgl_masuk,a[i].tgl_masuk);
      detailmrpenyakitkepermirja(a[i]['id_kunjungan']);
    }
    document.getElementById('listkunjunganasskepermrwj').innerHTML = barisrmhis;
  })



}
function addmrpenyakitermirja() {
 $('#ModalShowaddmrpenyakitermirja').modal('show')
}

function detailkeperawatanlabermirja(id_kunj) {
  var param={id_kunjungan:id_kunj,};
  apiPOST('Rekammedisirja/detaillaboratorium',param,hasil=>{
    var barisrmhis='';
    var a = hasil['data'];
    if (hasil['code']=="200") { 
      for (var i = 0; i < a.length; i++) {
        //barisrmhis += '<div>'+a[i].nama_obat+''+a[i].jumlah+''+a[i].kd_satuan+'</div>';
        barisrmhis += '<tr>';
        barisrmhis += '<th style="width: 15px">#</th>';
        barisrmhis += '<th >'+a[i].nama_indikator_hasil+'</th>';
        barisrmhis += '<th style="width: 120px">'+a[i].hasil+'</th>';
        barisrmhis += '<th style="width: 120px">'+a[i].nilai_hasil_normal+'</th>';
        barisrmhis += '</tr>';

      }
      document.getElementById('bodypenunjanglabirja'+id_kunj).innerHTML=barisrmhis;
    }
  })
}

function detailmrpenyakitkepermirja(kunjungan){
  var param = {
    kunjungan: kunjungan
  };
  var baris = ''; 
  apiPOST('Rekammedisirja/datamrpenyakitirja', param, hasil => {
    var x = hasil['data'];
    if (hasil['code']=="200") {            
      for (var u = 0; u < x.length; u++) {
        baris += '<div>'+x[u]['id_penyakit']+'|'+x[u]['penyakit']+'&nbsp;<i class="fas fa-edit"></i><i class="fas fa-trash-o"></i></div>';
      }
      document.getElementById('detailmrpenyakitkepirja'+kunjungan).innerHTML = baris;
    }
  })
}
function hiddendetaildiagnosaperawat(id) {
  document.getElementById('divtrkomunikasipengajarankep'+id+'').style.display='none';
  document.getElementById('idbtndiagnosa'+id+'').style.display='block';
  document.getElementById('idbtnhiddendiagnosa'+id+'').style.display='none';
}
function detaildiagnosaperawat(id) {
  document.getElementById('divtrkomunikasipengajarankep'+id+'').style.display='block';
  document.getElementById('idbtnhiddendiagnosa'+id+'').style.display='block';
  document.getElementById('idbtndiagnosa'+id+'').style.display='none';
  var param ={id:id,};
  apiPOST('Kunjungan/detaildiagnosaperawat', param,hasil=>{
    var a=hasil['kode'];
    var unit='';
    unit+='<table >';
    for (var i = 0; i < a.length; i++) {
      unit+='<tr>';
      unit+='<td>#</td>';
      if (a[i]['jenis']==2) {
        unit+='<td><input type="checkbox" name="dxperawatirja" value="'+a[i]['kd_produk']+'"></td>';
        unit+='<td>'+a[i]['kd_diagnosa_perawat']+'</td>';
        unit+='<td>'+a[i]['uraian']+'</td>';
      } else{
        unit+='<td><strong>'+a[i]['kd_diagnosa_perawat']+'</strong></td>';
        unit+='<td colspan="2"><strong>'+a[i]['uraian']+'</strong></td>';
      }

      unit+='</tr>';

    }
    unit+='</table>';
    unit+='<div><button class="btn btn-primary" type="button" id="btnadddiagperawat" onclick="inputdiagnosaperawat()">Simpan</button></div>'
    document.getElementById('divtrkomunikasipengajarankep'+id+'').innerHTML=unit;
  });
}
function tampilKomunikasiPengajaranKep() {
  $('#Modaldiagnsoaperawat').modal('show');

  
  apiPOST('Kunjungan/diagnosaperawat', null,hasil=>{
    var a=hasil['kode'];
    var unit='';
    for (var i = 0; i < a.length; i++) {
      unit+='<tr>';
      unit+='<td scope="row">1</td>';
      unit+='<td><button id="idbtndiagnosa'+a[i]['kd_perawat']+'" onclick="detaildiagnosaperawat(`'+a[i]['kd_perawat']+'`)"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>&nbsp;<button  onclick="hiddendetaildiagnosaperawat(`'+a[i]['kd_perawat']+'`)"><i class="fa fa-times-circle" aria-hidden="true" id="idbtnhiddendiagnosa'+a[i]['kd_perawat']+'"></i></button></td>';
      unit+='<td>'+a[i]['kd_perawat']+'</td>';
      unit+='<td>'+a[i]['uraian']+'</td>';
      unit+='</tr>';

      unit+='<tr >';
      unit+='<td colspan="4">';
      unit+='<div class="card" id="divtrkomunikasipengajarankep'+a[i]['kd_perawat']+'" >';
      unit+='</div>';
      unit+='</td>';
      unit+='</tr>';



    }
    document.getElementById('tbodydiagnosaperawat').innerHTML=unit;

  });
}
function assesmenperawathistoriasskepermrwjupdate(idkunjunganhistori,idunit) {
  document.getElementById('linkassesKepErmKeperawatanIrja').click();
  var asskephis = '';
  var param = {
    id: idkunjunganhistori,
    idunit:idunit,
  };
  apiPOST('Rekammedisirja/datakunjunganrmkeperdetail', param, hasil => {
    var a = hasil['data'];
    for (var i = 0; i < a.length; i++) {
      document.getElementById('keluhanutamaKeperawatanErmIrja').value=a[i]['keluhan_utama'];
      document.getElementById('RiwayatPenyakitNowErmKeperawatanIrja').value=a[i]['penyakit_sekarang'];
      document.getElementById('RestrainAssKeperawatanErmIrja').value=a[i]['pengguna_restrain'];
      //$('#alasanRestrainAssKeperawatanErmIrja').val()=a[i][''];
      document.getElementById('BudayaAssKeperawatanErmIrja').value=a[i]['budaya'];
      //$('#KetBudayaAssKeperawatanErmIrja').val()=a[i][''];
      document.getElementById('TinggalBersamaAssKeperawatanErmIrja').value=a[i]['tinggal'];
      document.getElementById('StatusMentalAssKeperawatanErmIrja').value=a[i]['status_mental'];
      document.getElementById('StatusPsikoAssKeperawatanErmIrja').value=a[i]['status_psikologi'];
      document.getElementById('KeadaanUmumAssKeperawatanIrja').value=a[i]['keadaan_umum'];
      document.getElementById('respirasiAssKeperawatanIrja').value=a[i]['respirasi'];
      document.getElementById('nadiAssKeperawatanIrja').value=a[i]['nadi'];
      document.getElementById('Spo2AssKeperawatanIrja').value=a[i]['spo2'];
      document.getElementById('pupilkiriAssKeperawatanIrja').value=a[i]['pupil_kiri'];
      document.getElementById('pupilkananAssKeperawatanIrja').value=a[i]['pupil_kanan'];
      document.getElementById('tekananDarahErmKeperawatanIrja1').value=a[i]['tekanan_darah1'];
      document.getElementById('tekananDarahErmKeperawatanIrja2').value=a[i]['tekanan_darah2'];
      document.getElementById('palpasiErmKeperawatanIrja').value=a[i]['palpasi'];
      document.getElementById('suhuErmKeperawatanIrja').value=a[i]['suhu'];
      document.getElementById('reflekCahayaKiriErmKeperawatanIrja').value=a[i]['reflek_cahaya_kiri'];
      document.getElementById('reflekCahayaKananErmKeperawatanIrja').value=a[i]['reflek_cahaya_kanan'];
      document.getElementById('bbErmKeperawatanIrja').value=a[i]['bb'];
      document.getElementById('tinggiErmKeperawatanIrja').value=a[i]['tinggi_badan'];
      document.getElementById('imtErmKeperawatanIrja').value=a[i]['imt'];
      document.getElementById('dacrjasesmenkeperawatan_bgcstot').value=a[i]['skor_kesadaran'];
      document.getElementById('intervensiErmKeperawatanIrja').value=a[i]['intervensi_kep'];
      document.getElementById('DiagnosaErmKeperawatanIrja').value=a[i]['diagnosa_kep'];
      document.getElementById('fisikStatusLocalisErmKeperawatanIrja').value=a[i]['status_lokalis'];
/*       document.getElementById('ermrwjkeperawatanbbturun').value=a[i]['penurunan_bb'];
        document.getElementById('ermrwjkeperawatanbbturunkg').value=a[i]['penurunan_bb'];
        document.getElementById('ermrwjkeperawatanpenurunanmakan').value=a[i]['penurunan_bb'];
        document.getElementById('ermrwjkeperawatantotalskor').value=a[i]['penurunan_bb'];
        document.getElementById('ermrwjkeperawatansaran').value=a[i]['penurunan_bb'];
      document.querySelector('input[name=ermrwjkeperawatanfungsional]:checked').value=a[i][''];*/
/*      switch (a[i]['status_fungsional']){
      case "1":
        document.getElementById('ermrwjkeperawatanfungsional1').checked='true';
      case "2":
        document.getElementById('ermrwjkeperawatanfungsional2').checked='true';
      case "3":
        document.getElementById('ermrwjkeperawatanfungsional3').checked='true';

      }
      switch (a[i]['ermrwjkeperawatankeseimbangan']){
      case "1":
        document.getElementById('ermrwjkeperawatankeseimbangan1').checked='true';
      case "2":
        document.getElementById('ermrwjkeperawatankeseimbangan2').checked='true';
      }*/
/*      document.querySelector('input[name=ermrwjkeperawatankeseimbangan]:checked').value=a[i][''];
      document.querySelector('input[name=ermrwjkeperawatanpenopang]:checked').value=a[i][''];
      document.querySelector('input[name=ermrwjkeperawatanhasilskrining]:checked').value=a[i][''];
      document.getElementById('ermrwjkeperawatanhasilkesimpulan').value=a[i][''];
      document.querySelector('input[name=ermrwjkeperawatanskorface]:checked').value=a[i][''];*/
      switch(a[i]['kepala']){
      case "1":
        document.getElementById('fisikKepalaErmKeperawatanIrja1').checked='true';
      case "2":
        document.getElementById('fisikKepalaErmKeperawatanIrja2').checked='true';
      }
      document.getElementById('fisikKepalaErmKeperawatanIrjaKet').value=a[i]['kepala_ket'];
      switch(a[i]['jantung']){
      case "1":
        document.getElementById('fisikJantungErmKeperawatanIrja1').checked='true';
      case "2":
        document.getElementById('fisikJantungErmKeperawatanIrja2').checked='true';
      }
      document.getElementById('fisikJantungErmKeperawatanIrjaKet').value=a[i]['jantung_ket'];

      switch(a[i]['mata']){
      case "1":
        document.getElementById('fisikMataErmKeperawatanIrja1').checked='true';
      case "2":
        document.getElementById('fisikMataErmKeperawatanIrja2').checked='true';

      }
      document.getElementById('fisikMataErmKeperawatanIrjaKet').value=a[i]['mata_ket'];
      switch(a[i]['paru']){
      case "1":
        document.getElementById('fisikParuErmKeperawatanIrja1').checked='true';
      case "2":
        document.getElementById('fisikParuErmKeperawatanIrja2').checked='true';

      }
      document.getElementById('fisikParuErmKeperawatanIrjaKet').value=a[i]['paru_ket'];
      switch(a[i]['tht']){
      case "1":
        document.getElementById('fisikThtErmKeperawatanIrja1').checked='true';
      case "2":
        document.getElementById('fisikThtErmKeperawatanIrja2').checked='true';

      }
      document.getElementById('fisikThtErmKeperawatanIrjaKet').value=a[i]['tht_ket'];
      switch(a[i]['abdomen']){
      case "1":
        document.getElementById('fisikAbdomenErmKeperawatanIrja1').checked='true';
      case "2":
        document.getElementById('fisikAbdomenErmKeperawatanIrja2').checked='true';

      }
      document.getElementById('fisikAbdomenErmKeperawatanIrjaKet').value=a[i]['abdomen_ket'];                        
      switch(a[i]['leher']){
      case "1":
        document.getElementById('fisikLeherErmKeperawatanIrja1').checked='true';
      case "2":
        document.getElementById('fisikLeherErmKeperawatanIrja2').checked='true';

      }
      document.getElementById('fisikLeherErmKeperawatanIrjaKet').value=a[i]['leher_ket'];
      switch(a[i]['genitalia']){
      case "1":
        document.getElementById('fisikGenitaliaErmKeperawatanIrja1').checked='true';
      case "2":
        document.getElementById('fisikGenitaliaErmKeperawatanIrja2').checked='true';

      }
      document.getElementById('fisikGenitaliaErmKeperawatanIrjaKet').value=a[i]['genitalia_ket'];
      switch(a[i]['mulut']){
      case "1":
        document.getElementById('fisikMulutErmKeperawatanIrja1').checked='true';
      case "2":
        document.getElementById('fisikMulutErmKeperawatanIrja2').checked='true';

      }
      document.getElementById('fisikMulutErmKeperawatanIrjaKet').value=a[i]['mulut_ket'];
      switch(a[i]['thoraks']){
      case "1":
        document.getElementById('fisikThoraxErmKeperawatanIrja1').checked='true';
      case "2":
        document.getElementById('fisikThoraxErmKeperawatanIrja2').checked='true';

      }
      document.getElementById('fisikThoraxErmKeperawatanIrjaKet').value=a[i]['thoraks_ket'];

    }
  })
}

function assesmenperawathistoriasskepermrwj(idkunjunganhistori,idunit){
  var url = "<?php echo base_url(); ?>";
  var asskephis = '';
  var param = {
    id: idkunjunganhistori,
    idunit:idunit,
  };
  apiPOST('Rekammedisirja/datakunjunganrmkeperdetail', param, hasil => {
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
  asskephis += '<div class="input-group-prepend col-md-2"><span>x/menit</span></div>';

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
asskephis +='<div><button onclick="assesmenperawathistoriasskepermrwjupdate(`'+a[i]['id_kunjungan']+'`,`'+a[i]['id_unit']+'`)">Update</button></div>';
asskephis += '</div>';
asskephis += '</div>';
}  
document.getElementById("idpanelhistorirmperawat"+idkunjunganhistori+"").innerHTML = asskephis;
})}
function assesmendokterhistoriasskepermrwj(idkunjunganhistori){
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
    assmedhis += '<div class="input-group-prepend col-md-2"><span>x/menit</span></div>';

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
assmedhis += '</div>';
assmedhis += '</div>';

}


document.getElementById("idpanelhistorirm"+idkunjunganhistori+"").innerHTML = assmedhis;
})
}
function eresepviewkepermrwj(id_kunj,tgl_kunj,tglorder) {
  var param={id_kunj:id_kunj,
  tgl_kunj:tgl_kunj,
  tglorder:tglorder,};
  apiPOST('Apotek/getData_historiOrderEresep',param,hasil=>{
    var barisrmhis='';
    var a = hasil['data'];
    for (var i = 0; i < a.length; i++) {
      barisrmhis += '<div class="col-md-5">'+a[i].nama_obat+'</div>';
      barisrmhis += '<div class="col-md-7">'+a[i].jumlah+' '+a[i].kd_satuan+'</div>';

    }
    document.getElementById('eresephistoriermirja'+id_kunj).innerHTML=barisrmhis;
  })
}
function detailsoapiasskepermrwj(idkunjungan){
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
        barisrmhisd += '<div class="card"><h4>SOAP I</h4><br>';
        barisrmhisd += '<h4>'+ x[u]['nama_pegawai']+ ',' + x[u]['jam_input']+ '</h4><br>';
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
        barisrmhisd += '<button class="btn btn-primary" onclick="copysoapikeperm(`'+spo2+'`,`'+saturasi+'`,`'+nadi+'`,`'+tdarah+'`,`'+suhu+'`,`'+s+'`,`'+o+'`,`'+a+'`,`'+p+'`,`'+i+'`)">Copy SOAP I</button></div>';
        idkunjungan = x[u]['id_kunjungan'];
      }
      document.getElementById('detailsoapi'+idkunjungan+'').innerHTML = barisrmhisd;
    }
  })
}
function ermirja_listpasien(){  

  var listParam = [
    'searchPxERMKeperawatanrwj', 'RWJERMKeperawatan_nm_pasiencari'
    ];
  var param = {
    norm    : document.getElementById('searchPxERMKeperawatanrwj').value,
    tgl     : document.getElementById('tglasskepcariby').value,
    unit_user:user.unit_akses,
  };
  apiPOST("Rekammedisirja/listpasien", param, hasil => {   
    $('#ermKeperawatanirja_listpasien').html('');
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
        $('#ermKeperawatanirja_listpasien').append(Baris);
        document.getElementById('searchPxERMKeperawatanrwj').value = '';
        document.getElementById('RWJERMKeperawatan_nm_pasiencari').value = '';
      }else{

        var Baris = "";
        var a = hasil['data'];
        for (var i = 0; i < a.length; i++) {
          var tglkunj   = a[i].tgl_masuk;
          var norm      = a[i].no_rm;
          var nama      = a[i].nama;
          var alamat    = a[i].alamat;
          var umur      = a[i].tgl_lahir;
          var penjamin  = a[i].nama_penjamin;
          var sep       = a[i].no_sjp;
          var telp      = a[i].telepon;
          var unit      = a[i].nama_unit;
          var kunjungan = a[i].id_kunjungan;
          var id_unit   = a[i].id_unit;
          var kd_agama   = a[i].kd_agama;
          var kd_pekerjaan   = a[i].kd_pekerjaan;
          var kd_pendidikan   = a[i].kd_pendidikan;
          var nama_unit = a[i].nama_unit;
          var soap      = a[i].soap;
          var id_transaksi=a[i].id_transaksi;
          var id_penjamin=a[i].id_penjamin;
          var nama_dpjp=a[i].nama_pegawai;
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
          Baris += '<a href="#" class="small-box-footer" style="background-color: darkgreen;" onclick="tampilPasienErmKeperawatanIrja('+"'"+norm+"','"+unit+"','"+kunjungan+"','"+id_unit+"','"+nama+"','"+kd_agama+"','"+kd_pekerjaan+"','"+kd_pendidikan+"','"+nama_dpjp+"','"+id_transaksi+"'"+')">Klik Detail <i class="fas fa-arrow-circle-right"></i></a>';
          Baris += '</div>';
          Baris += '</div>'; 
        }
        $('#ermKeperawatanirja_listpasien').append(Baris);
      }       
    }

  });  
};
function data_pendaftaranirwj(e){
 if (e.keyCode == 13) {
  var a='';
  var param = 
  {
    rm : $("#searchPxERMKeperawatanrwj").val(),};
    apiPOST('Kunjungan/historikunjunganirja', param, hasil =>{
      var b=hasil['history'];
      for (var i = 0; i < b.length; i++) {
        var no = i+1;
        a+='<tr>';
        a+='<td>' + no + '</td>';
        a+='<td onclick="tampilPasienErmKeperawatanIrja(`'+b[i].no_rm+'`,`'+b[i].nama_unit+'`,`'+b[i].id_kunjungan+'`,`'+b[i].id_unit+'`,`'+b[i].nama+'`)">'+b[i].no_rm+'`</td>';
        a+='<td>'+b[i].nama+'</td>';
        a+='<td>'+b[i].alamat+'</td>';
        a+='<td>'+b[i].tgl_masuk+'</td>';
        a+='<td>'+b[i].nama_pegawai+'</td>';
        a+='<td>'+b[i].nama_unit+'</td>';
        a+='</tr>';
      }
      document.getElementById('bodyErmIrjahistorykunjungan').innerHTML=a;

    });
  }
}
function show_cri_subjek(){
  $('#ModalCariSubjek').modal("show");
  document.getElementById('operatorcpptirja').value=1;
}
function show_cri_subjek_kep(){
  $('#ModalCariSubjek').modal("show");
  document.getElementById('operatorcpptirja').value=2;
}
function show_modalPermintaanLabIrja() {
  $('#ModalPermintaanLabIrja').modal('show');
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
function show_modalPermintaancheckboxlogiIrja() {
  $('#ModalPermintaancheckboxlogiIrja').modal("show");
}
function show_daftarintervensi() {
  $("#ModalDaftarIntervensi").modal("show");
}
function showmodaltambahpenyakitsekarang() {
  $("#ModalTambahIcdPenyakitSekarang").modal("show");
  document.getElementById("ModalinputPenyakitSekarangErmIrja").value="";
}
function dacrjasesmenkeperawatanex_setScore(a,b) {
  switch(b){
  case 1:
    document.getElementById('eyeOpenErmKeperawatanIrja').value=a;
    break;
  case 2:
    document.getElementById('ResponMotorikErmKeperawatanIrja').value=a;
    break;
  case 3:
    document.getElementById('responVerbalErmKeperawatanIrja').value=a;
    break;
  default:
  }
  hitung()
}
function hitung() {
  var a=document.getElementById('eyeOpen').value;
  var b=document.getElementById('responMotorik').value;
  var c=document.getElementById('responVerbal').value;
  document.getElementById('dacrjasesmenkeperawatan_bgcstot').value=parseInt(a) + parseInt(b) + parseInt(c);
}
function KebKomBicaraErmKeperawatanIrja() {
  document.getElementById('DivPenjelasErmKeperawatanIrja').style.display='block';
}
function show_cri_nmpasienpendfRWJ()
{
  $('#searchPxERMKeperawatanrwj').hide();
  $('#RWJERMKeperawatan_nm_pasiencari').show();
  $("#RWJERMKeperawatan_nm_pasiencari").trigger('focus');
}
function refresh_pendft_rwj() {
  $('#ermKeperawatanirja_loadingawal').hide();
}
function tampilPasienErmKeperawatanIrja(rm,unit,kunjungan,id_unit,nama,agama,pekerjaan,pendidikan,dpjp,id_transaksi) {
  document.getElementById('listhistorikeperawatanpenunjangirja').innerHTML = "";
  document.getElementById('rmErmKeperawatanIrja').value=rm;
  document.getElementById('namaErmKeperawatanIrja').value=nama;
  document.getElementById('ttdassesmenkepirjapasien').value=nama;
  document.getElementById('unitErmKeperawatanIrja').value=unit;
  document.getElementById('idKunjunganErmKeperawatanIrja').value=kunjungan;
  document.getElementById('idTransaksiErmKeperawatanIrja').value=id_transaksi;
  document.getElementById('idunitErmKeperawatanIrja').value=id_unit;
  document.getElementById('AgamaAssKeperawatanErmIrja').value=agama;
  document.getElementById('pekerjaanAssKeperawatanErmIrja').value=pekerjaan;
  document.getElementById('dpjpasskep').value=user.nama_pegawai;
  tambahpasienermkeperawatanrwj();
  historipenyakitermkeperawatanrwj();
  historialergiermkeperawatanrwj();
  historipenyakitkeluargaermkeperawatanrwj();
  pemeriksaanawalperawatermirja();
  ReviewAssesmenkepErmIrja(rm,unit);
  tampilkeperawatanpenunjangirja(rm);
  switch (id_unit){
  case '1013':
   document.getElementById('divskringigizianakirja').style.display='block';
   document.getElementById('divriwayatmensirja').style.display='block';
   document.getElementById('divskrininggizidewasairja').style.display='none';
   break;
 }
}
function historipenyakitermkeperawatanrwj() {
  var a='';
  var param = 
  {
    no_rm : $("#rmErmKeperawatanIrja").val(),};
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
      document.getElementById('bodyhistoripenyakitasskepermrwj').innerHTML=a;


    });
  }
  function historialergiermkeperawatanrwj() {
    var a='';
    var param = 
    {
      no_rm : $("#rmErmKeperawatanIrja").val(),};
      apiPOST('Kunjungan/historialergi', param, hasil =>{
        var b=hasil['history'];
        for (var i = 0; i < b.length; i++) {
          var no = i+1;
          a+='<tr>';
          a+='<td>' + no + '</td>';
          a+='<td>'+b[i].alergi+'</td>';
          a+='</tr>';
        }
        document.getElementById('bodyhistorialergiasskepermrwj').innerHTML=a;


      });
    }
    function historipenyakitkeluargaermkeperawatanrwj() {
      var a='';
      var param = 
      {
        no_rm : $("#rmErmKeperawatanIrja").val(),};
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
          document.getElementById('bodyhistoripenyakitkelasskepermrwj').innerHTML=a;


        });
      }
      function tambahpasienermkeperawatanrwj() {
        var y = document.getElementById("DivPasienErmKeperawatanIrja");
        var z = document.getElementById("DivPendafDetailKeperawatanRWJ");
        var a = document.getElementById("DivErmKeperawatan");
        var c = document.getElementById("DivERMKeperawatanRWJ");
        var d = document.getElementById("DivermKeperawatanirja_listpasien");
        var e = document.getElementById("ermKeperawatanirja_button");
        z.style.display = "block";
        y.style.display = "block";
        a.style.display = "block";
        e.style.display = "block";
        c.style.display = "none";
        d.style.display = "none";
        $("#rwj_pendf_titleheader").html("<i class='fas fa-hospital-user'></i> Pendaftaran Pasien Baru");  
  //$("#igd_pendf_namapasien").trigger('focus');
      }
      function kembaliErmKeperawatanIrja() {
        var y = document.getElementById("DivPasienErmKeperawatanIrja");
        var z = document.getElementById("DivPendafDetailKeperawatanRWJ");
        var a = document.getElementById("DivErmKeperawatan");
        var c = document.getElementById("DivERMKeperawatanRWJ");
        var d = document.getElementById("DivermKeperawatanirja_listpasien");
        var e = document.getElementById("ermKeperawatanirja_button");
        z.style.display = "none";
        y.style.display = "none";
        a.style.display = "none";
        e.style.display = "none";
        c.style.display = "block";
        d.style.display = "block";
        clearinputkepirja();
        cleartextareakepirja();
      }
      function clearinputkepirja() {
        var elements = document.getElementsByTagName("input");
        for (var i=0; i < elements.length; i++) {
          if (elements[i].type == "text") {
            elements[i].value = '';
          }
        }
      }

      function cleartextareakepirja() {
        var elements = document.getElementsByTagName("textarea");
        for (var ii=0; ii < elements.length; ii++) {
          if (elements[ii].type == "textarea") {
            elements[ii].value = '';
          }
        }
      }
      function tampilasalanrestrain() {
        if (document.getElementById('RestrainAssKeperawatanErmIrja').value=='2') { 
          document.getElementById('DivalasanRestrainAssKeperawatanErmIrja').style.display='block';} 
          else {
            document.getElementById('DivalasanRestrainAssKeperawatanErmIrja').style.display='none';
          }

        }
        function tampilBudayaAnut() {
          if (document.getElementById('BudayaAssKeperawatanErmIrja').value=='2') { 
            document.getElementById('DivKetBudayaAssKeperawatanErmIrja').style.display='block';} 
            else {
             document.getElementById('DivKetBudayaAssKeperawatanErmIrja').style.display='none';
           }

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
        $(document).on('keyup', '#intervensiErmKeperawatanIrja', function(e) {
          if($(this).val() !== '')
          {
           var charCode = e.which || e.keyCode;
           if(charCode == 40)
           {
            DiagnosaKeperawatanIrja();
          } 
          else if(charCode == 38)
          {
            DiagnosaKeperawatanIrja();
          }
          else    (charCode == 13)
          {
            DiagnosaKeperawatanIrja();
          }
        }else{
          document.getElementById("DivintervensiErmKeperawatanIrja").innerHTML="";
        }
      })
        function KomunikasiPengajaranKep() {
          var param ={id:document.getElementById("DiagnosaErmKeperawatanIrja").value,};
          apiPOST('Kunjungan/KomunikasiKeperawatan', param,hasil=>{
            var a=hasil['kode'];
            var unit='';
            for (var i = 0; i < a.length; i++) {
              unit+='<button class="btn btn-primary" onclick="pilihKomunikasiPengajaranKep(`'+a[i]['uraian']+'`)">'+a[i]['kode_produk']+'|'+a[i]['uraian']+'</button><br>';
            }
            document.getElementById('DivDiagnosaErmKeperawatanIrja').innerHTML=unit;
          });
        }
        function TableKomunikasiPengajaranKep() {
          var param ={id:document.getElementById("intervensiErmKeperawatanIrja").value,};
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
            document.getElementById('DivTableintervensiErmKeperawatanIrja').innerHTML=unit;
          });
        }
        function TableDiagnosaKep() {
          var param ={id:document.getElementById("assesmenErmKeperawatanIrja").value,};
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
            document.getElementById('DivTableDiagnosaErmKeperawatanIrja').innerHTML=unit;
          });
        }
        function pilihKomunikasiPengajaranKep(kode) {

          document.getElementById("DiagnosaErmKeperawatanIrja").value=kode;
          document.getElementById("DivDiagnosaErmKeperawatanIrja").innerHTML="";
        }
/*riwayat dulu*/
/*modal tambah penyakit sekarang*/
        $(document).on('keyup', '#DiagnosaErmKeperawatanIrja', function(e) {
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
          document.getElementById("DivDiagnosaErmKeperawatanIrja").innerHTML="";
        }
      })
        function DiagnosaKeperawatanIrja() {
          var param ={id:document.getElementById("DiagnosaErmKeperawatanIrja").value,};
          apiPOST('Kunjungan/IntervensiKeperawatan', param,hasil=>{
            var a=hasil['kode'];
            var unit='';
            for (var i = 0; i < a.length; i++) {
              unit+='<button class="btn btn-primary" onclick="pilihIntervensiKep(`'+a[i]['uraian']+'`)">'+a[i]['kode_produk']+'|'+a[i]['uraian']+'</button><br>';
            }
            document.getElementById('DivintervensiErmKeperawatanIrja').innerHTML=unit;
          });
        }
        function pilihIntervensiKep(kode) {

          document.getElementById("intervensiErmKeperawatanIrja").value=kode;
          document.getElementById("DivintervensiErmKeperawatanIrja").innerHTML="";
        }
/*riwayat dulu*/
        $(document).on('keyup', '#RiwayatPenyakitDuluErmKeperawatanIrja', function(e) {
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
          var param ={id:document.getElementById("RiwayatPenyakitDuluErmKeperawatanIrja").value,};
          apiPOST('Kunjungan/icd', param,hasil=>{
            var a=hasil['icd'];
            var unit='';
            for (var i = 0; i < a.length; i++) {
              unit+='<button class="btn btn-primary"  onclick="pilihKeperawatanPenyakitdulu(`'+a[i]['penyakit']+'`)">'+a[i]['penyakit']+'</button><br>';
            }
            document.getElementById('DivKeperawatanRiwayatPenyakit').innerHTML=unit;
          });
        }
        function pilihKeperawatanPenyakitdulu(kode) {
          document.getElementById("RiwayatPenyakitDuluErmKeperawatanIrja").value=kode;
          document.getElementById("DivKeperawatanRiwayatPenyakit").innerHTML="";
        }
/*riwayat sekarang*/
        $(document).on('keyup', '#RiwayatPenyakitNowErmKeperawatanIrja', function(e) {
          if($(this).val() !== '')
          {
           var charCode = e.which || e.keyCode;
           if(charCode == 40)
           {
            KeperawatanriwayatPenyakitSekarang();
          } 
          else if(charCode == 38)
          {
            KeperawatanriwayatPenyakitSekarang();
          }
          else    (charCode == 13)
          {
            KeperawatanriwayatPenyakitSekarang();
          }
        }else{
          document.getElementById("DivKeperawatanRiwayatPenyakitSekarang").innerHTML="";
        }
      })
        function KeperawatanriwayatPenyakitSekarang() {
          var param ={id:document.getElementById("RiwayatPenyakitNowErmKeperawatanIrja").value,};
          apiPOST('Kunjungan/icd', param,hasil=>{
            var a=hasil['icd'];
            var unit='';
            for (var i = 0; i < a.length; i++) {
              unit+='<button class="btn btn-primary"  onclick="pilihPenyakitsekarang(`'+a[i]['penyakit']+'`)">'+a[i]['penyakit']+'</button><br>';
            }
            document.getElementById('DivKeperawatanRiwayatPenyakitSekarang').innerHTML=unit;
          });
        }
        function pilihPenyakitsekarang(kode) {
          var a=document.getElementById("RiwayatPenyakitNowErmKeperawatanIrja").value;
          document.getElementById("RiwayatPenyakitNowErmKeperawatanIrja").value=kode;
          document.getElementById("DivKeperawatanRiwayatPenyakitSekarang").innerHTML="";
        }
        function penyakitdahulu() {
          var param ={kode:document.getElementById("rmErmIrja").value,};
          apiPOST('Kunjungan/historipenyakitirja', param,hasil=>{
            var a=hasil['history'];
            var unit='';
            for (var i = 0; i < a.length; i++) {
              unit+= a[i]['penyakit']+'\n';
            }
            document.getElementById('RiwayatPenyakitDuluErmIrja').innerHTML=unit;
          });
        }
        function penyakitsekarang() {
          var param ={kode:document.getElementById("rmErmIrja").value,};
          apiPOST('Kunjungan/penyakitsekarangirja', param,hasil=>{
            var a=hasil['history'];
            var unit='';
            for (var i = 0; i < a.length; i++) {
              unit+= a[i]['penyakit']+'\n';
            }
            document.getElementById('RiwayatPenyakitNowErmIrja').innerHTML=unit;
          });
        }
        function selectpoliuser() {
          var param ={unit:user.unit_akses,};
          apiPOST('Rawatjalan/unitakses', param,hasil=>{
            var a=hasil['data'];
            var unit='';
            for (var i = 0; i < a.length; i++) {
              unit+='<option value="'+a[i]['id_unit']+'">'+a[i]['nama_unit']+'</option>';
            }
            document.getElementById('selectpoliuser').innerHTML=unit;
          });
        }
        function inputdatasubjek() 
        {
          var cekdinamis = document.getElementById('cek_subjek_dinamis_input').value;
          const btn = document.querySelector('#btn');
          btn.addEventListener('click', (event) => {
            let checkboxes = document.querySelectorAll('input[name="cek_subjek"]:checked');
            let values = [];
            checkboxes.forEach((checkbox) => {
              values.push(checkbox.value);
            });

            if (cekdinamis=='') {
              dataarray=values;
            } else {
              dataarray=values +','+ cekdinamis;
            }
            if (document.getElementById('operatorcpptirja').value==1) {
              document.getElementById('subjekirja').value=dataarray;
            } else {
              document.getElementById('subjekkepirja').value=dataarray;
            }
            $('#ModalCariSubjek').modal("hide");
          });  
        }


        function inputdataintervensiKeperawatan() 
        {
          const btn = document.querySelector('#buttonintervensi');
          btn.addEventListener('click', (event) => {
            let checkboxes = document.querySelectorAll('input[name="intervensikeperawatan"]:checked');
            let values = [];
            checkboxes.forEach((checkbox) => {
              values.push(checkbox.value);
            });
            $('#ModalIntervensiKeperawatan').modal("hide");
            document.getElementById('soapintervensiErmKeperawatanIrja').value=values;
          });  
        }
        function inputdatadiagnosaKeperawatan() 
        {
          const btn = document.querySelector('#buttondiagnosa');
          btn.addEventListener('click', (event) => {
            let checkboxes = document.querySelectorAll('input[name="diagnosakeperawatan"]:checked');
            let values = [];
            checkboxes.forEach((checkbox) => {
              values.push(checkbox.value);
            });
            $('#ModalDiagnosaKeperawatan').modal("hide");
            document.getElementById('assesmenErmKeperawatanIrja').value=values;
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
        document.getElementById('ErmKeperawatanIrjapoliklinik').innerHTML=unit;
      });
     }
     function updatesoapiperawatermrwj() {

      document.getElementById("cppttekanandarahkepermirja").value    =document.getElementById("cppttekanandarahkepermirja2").value;
      document.getElementById("cpptsuhukepermirja").value            =document.getElementById("cpptsuhukepermirja2").value ;
      document.getElementById("cpptnadikepermirja").value            =document.getElementById("cpptnadikepermirja2").value;
      document.getElementById("cpptsaturasikepermirja").value        =document.getElementById("cpptsaturasikepermirja2").value;
      document.getElementById("cpptSpo2kepermirja").value            =document.getElementById("cpptSpo2kepermirja2").value;
      document.getElementById("subjekkepirja").value                 =document.getElementById("subjekkepirja2").value;
      document.getElementById("objekkepirja").value                  =document.getElementById("objekkepirja2").value;
      document.getElementById("assesmenErmKeperawatanIrja").value               =document.getElementById("assesmenkepirja2").value;
      document.getElementById("soapintervensiErmKeperawatanIrja").value             =document.getElementById("intervensikepirja2").value ;
      document.getElementById("instruksikepermirja").value           =document.getElementById("instruksikepermirja2").value;
      $('#ModalShowsoapkepermIrja').modal('hide');
    }
    function pilihfasilitaskesehatanermirja() {
      var fkt=document.getElementById('statusPulangassesmenermirja').value;
      if (fkt=='03'||fkt=='04'||fkt=='11') {
       document.getElementById('fasilitas_kesehatanermirja').style.display='block';
     } else {
      document.getElementById('fasilitas_kesehatanermirja').style.display='none';
    }
  }
/*  function updatesoapiperawatermrwj() {

    document.getElementById("cppttekanandarahermirja").value    =document.getElementById("cppttekanandarahermirja2").value;
    document.getElementById("cpptsuhuermirja").value            =document.getElementById("cpptsuhuermirja2").value ;
    document.getElementById("cpptnadiermirja").value            =document.getElementById("cpptnadiermirja2").value;
    document.getElementById("cpptsaturasiermirja").value        =document.getElementById("cpptsaturasiermirja2").value;
    document.getElementById("cpptSpo2ermirja").value            =document.getElementById("cpptSpo2ermirja2").value;
    document.getElementById("subjekirja").value                 =document.getElementById("subjekirja2").value;
    document.getElementById("objekirja").value                  =document.getElementById("objekirja2").value;
    document.getElementById("assesmenirja").value               =document.getElementById("assesmenirja2").value;
    document.getElementById("intervensiirja").value             =document.getElementById("intervensiirja2").value ;
    document.getElementById("instruksiermirja").value           =document.getElementById("instruksiermirja2").value;
    $('#ModalShowsoapermIrja').modal('hide');
  }*/
  function pilihfasilitaskesehatanermirja() {
    var fkt=document.getElementById('statusPulangassesmenermirja').value;
    if (fkt=='03'||fkt=='04'||fkt=='11') {
     document.getElementById('fasilitas_kesehatanermirja').style.display='block';
   } else {
    document.getElementById('fasilitas_kesehatanermirja').style.display='none';
  }
}
/*menejemen simpan data*/
function simpanAssesmenKeperawatanIrja() {
  var param={
    id_kunjungan                           :$('#idKunjunganErmKeperawatanIrja').val(),
    keluhanutamaErmKeperawatanIrja         :$('#keluhanutamaKeperawatanErmIrja').val(),
    RiwayatPenyakitNowErmKeperawatanIrja   :$('#RiwayatPenyakitNowErmKeperawatanIrja').val(),
    RiwayatPenyakitDuluErmKeperawatanIrja  :$('#RiwayatPenyakitDuluErmKeperawatanIrja').val(),
    KeperawatanRiwayatPenyakitFam    :$('#KeperawatanRiwayatPenyakitFam').val(),
    KeperawatanRiwayatOpErmIrja      :$('#KeperawatanRiwayatOpErmIrja').val(),
    KeperawatanRiwayatAlergiErmIrja  :$('#KeperawatanRiwayatAlergiErmIrja').val(),
    AgamaAssKeperawatanErmIrja       :$('#AgamaAssKeperawatanErmIrja').val(),
    pekerjaanAssKeperawatanErmIrja   :$('#pekerjaanAssKeperawatanErmIrja').val(),
    RestrainAssKeperawatanErmIrja    :$('#RestrainAssKeperawatanErmIrja').val(),
    alasanRestrainAssKeperawatanErmIrja    :$('#alasanRestrainAssKeperawatanErmIrja').val(),
    BudayaAssKeperawatanErmIrja      :$('#BudayaAssKeperawatanErmIrja').val(),
    KetBudayaAssKeperawatanErmIrja   :$('#KetBudayaAssKeperawatanErmIrja').val(),
    TinggalBersamaErmIrja            :$('#TinggalBersamaAssKeperawatanErmIrja').val(),
    statusmentalErmIrja              :$('#StatusMentalAssKeperawatanErmIrja').val(),
    statusPsikologis                 :$('#StatusPsikoAssKeperawatanErmIrja').val(),
    KeadaanUmumAssKepIrja            :$('#KeadaanUmumAssKeperawatanIrja').val(),
    respirasiAssKepIrja              :$('#respirasiAssKeperawatanIrja').val(),
    nadiAssKepIrja                   :$('#nadiAssKeperawatanIrja').val(),
    Spo2AssKepIrja                   :$('#Spo2AssKeperawatanIrja').val(),
    pupilkiri                        :$('#pupilkiriAssKeperawatanIrja').val(),
    pupilkanan                       :$('#pupilkananAssKeperawatanIrja').val(),
    tekananDarahErmKepIrja1          :$('#tekananDarahErmKeperawatanIrja1').val(), 
    tekananDarahErmKepIrja2          :$('#tekananDarahErmKeperawatanIrja2').val(),
    palpasiErmKepIrja                :$('#palpasiErmKeperawatanIrja').val(),
    suhuErmKepIrja                   :$('#suhuErmKeperawatanIrja').val(),
    reflekCahayaKiriErmKepIrja       :$('#reflekCahayaKiriErmKeperawatanIrja').val(),
    reflekCahayaKananErmKepIrja      :$('#reflekCahayaKananErmKeperawatanIrja').val(),
    bbErmKepIrja                     :$('#bbErmKeperawatanIrja').val(),
    tinggiErmKepIrja                 :$('#tinggiErmKeperawatanIrja').val(),
    imtErmKepIrja                    :$('#imtErmKeperawatanIrja').val(),
    dacrjasesmenkeperawatan_bgcstot  :$('#dacrjasesmenkeperawatan_bgcstot').val(),
    tipekesadaranasskepermrwj        :$('#tipekesadaranasskepermrwj').val(),
    intervensiErmKeperawatanIrja     :$('#intervensiErmKeperawatanIrja').val(),
    diagnosaKeperawatan              :$('#DiagnosaErmKeperawatanIrja').val(),
    fisikStatusLocalisErmIrja        :$('#fisikStatusLocalisErmKeperawatanIrja').val(),
    ermrwjkeperawatanbbturun         :document.getElementById('ermrwjkeperawatanbbturun').value,
    ermrwjkeperawatanbbturunkg       :document.getElementById('ermrwjkeperawatanbbturunkg').value,
    ermrwjkeperawatanpenurunanmakan  :document.getElementById('ermrwjkeperawatanpenurunanmakan').value,
    ermrwjkeperawatantotalskor       :document.getElementById('ermrwjkeperawatantotalskor').value,
    ermrwjkeperawatansaran           :document.getElementById('ermrwjkeperawatansaran').value,
    ermrwjkeperawatanfungsional      :document.querySelector('input[name=ermrwjkeperawatanfungsional]:checked').value,
    ermrwjkeperawatankeseimbangan    :document.querySelector('input[name=ermrwjkeperawatankeseimbangan]:checked').value,
    ermrwjkeperawatanpenopang        :document.querySelector('input[name=ermrwjkeperawatanpenopang]:checked').value,
    ermrwjkeperawatanhasilskrining   :document.querySelector('input[name=ermrwjkeperawatanhasilskrining]:checked').value,
    ermrwjkeperawatanhasilkesimpulan :document.getElementById('ermrwjkeperawatanhasilkesimpulan').value,
    ermrwjkeperawatanskorface        :document.querySelector('input[name=ermrwjkeperawatanskorface]:checked').value,
    fisikKepalaErmIrja          :document.querySelector('input[name=fisikKepalaErmKeperawatanIrja]:checked').value,
    fisikKepalaErmIrjaKet       :$('#fisikKepalaErmKeperawatanIrjaKet').val(),
    fisikJantungErmIrja         :document.querySelector('input[name=fisikJantungErmKeperawatanIrja]:checked').value,
    fisikJantungErmIrjaKet      :$('#fisikJantungErmKeperawatanIrjaKet').val(),
    fisikMataErmIrja            :document.querySelector('input[name=fisikMataErmKeperawatanIrja]:checked').value,
    fisikMataErmIrjaKet         :$('#fisikMataErmKeperawatanIrjaKet').val(),
    fisikParuErmIrja            :document.querySelector('input[name=fisikParuErmKeperawatanIrja]:checked').value,
    fisikParuErmIrjaKet         :$('#fisikParuErmKeperawatanIrjaKet').val(),
    fisikThtErmIrja             :document.querySelector('input[name=fisikThtErmKeperawatanIrja]:checked').value,
    fisikThtErmIrjaKet          :$('#fisikThtErmKeperawatanIrjaKet').val(),
    fisikAbdomenErmIrja         :document.querySelector('input[name=fisikAbdomenErmKeperawatanIrja]:checked').value,
    fisikAbdomenErmIrjaKet      :$('#fisikAbdomenErmKeperawatanIrjaKet').val(),                           
    fisikLeherErmIrja           :document.querySelector('input[name=fisikLeherErmKeperawatanIrja]:checked').value,
    fisikLeherErmIrjaKet        :$('#fisikLeherErmKeperawatanIrjaKet').val(),
    fisikGenitaliaErmIrja       :document.querySelector('input[name=fisikGenitaliaErmKeperawatanIrja]:checked').value,
    fisikGenitaliaErmIrjaKet    :$('#fisikGenitaliaErmKeperawatanIrjaKet').val(),
    fisikMulutErmIrja           :document.querySelector('input[name=fisikMulutErmKeperawatanIrja]:checked').value,
    fisikMulutErmIrjaKet        :$('#fisikMulutErmKeperawatanIrjaKet').val(),
    fisikThoraxErmIrja          :document.querySelector('input[name=fisikThoraxErmKeperawatanIrja]:checked').value,
    fisikThoraxErmIrjaKet       :$('#fisikThoraxErmKeperawatanIrjaKet').val(),
    //gambar                      : localis.getData(),
    id_user                     :user.id_pegawai,
    eyeOpen                     :$('#eyeOpenErmKeperawatanIrja').val(),
    responMotorik               :$('#ResponMotorikErmKeperawatanIrja').val(),
    responVerbal                :$('#responVerbalErmKeperawatanIrja').val(),
    ttd                         :$('#HasilTtdAssesmenPerawatIrja').val(),
    ttd_pasien                  :$('#HasilTtdAssesmenPasienIrja').val(),
    nama_ttd_pasien             :$('#ttdassesmenkepirjapasien').val()

  };
  apiPOST('Rekammedisirja/saveAssesmenKeperawatanIrja',param,hasil=>{

  })
}
function simpanHistoriAlergi() {
  var param={
    id_kunjungan  :$('#idKunjunganErmIrja').val(),
    id_jenis      :$('#selectJenisalergi').val(),
    keterangan    :$('#keteranganalergi').val()
  };
  apiPOST('Rekammedisirja/addhistorialergi',param,hasil=>{
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
    id_kunjungan  :$('#idKunjunganErmIrja').val(),
    id_jenis      :$('#selectJenisobat').val(),
    keterangan    :$('#keteranganobat').val()
  };
  apiPOST('Rekammedisirja/addhistoripemberianobat',param,hasil=>{
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
  var b  =$('#idKunjunganErmIrja').val();
  var c  =$('#selectJenisPenyakitFam').val();
  var d  =$('#keteranganhistoripenyakitFam').val();
  var skillsSelect = document.getElementById('selectJenisPenyakitFam');
  var selectedText = skillsSelect.options[skillsSelect.selectedIndex].text;
  var param={
    id_kunjungan  :$('#idKunjunganErmIrja').val(),
    id_jenis      :$('#selectJenisPenyakitFam').val(),
    keterangan    :$('#keteranganhistoripenyakitFam').val()
  };
  apiPOST('Rekammedisirja/addhistoripenyakitFam',param,hasil=>{
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

  var b  =$('#idKunjunganErmIrja').val();
  var c  =$('#selectJenisPenyakitOld').val();
  var skillsSelect  =document.getElementById("selectJenisPenyakitOld");
  var selectedText = skillsSelect.options[skillsSelect.selectedIndex].text;
  var e  =$('#keteranganhistoripenyakitold').val();
  var param={
    id_kunjungan  :$('#idKunjunganErmIrja').val(),
    id_jenis      :$('#selectJenisPenyakitOld').val(),
    jenis         :$('#selectJenisPenyakitOld').innerHTML,
    keterangan    :$('#keteranganhistoripenyakitold').val(),
  };
  apiPOST('Rekammedisirja/addhistoripenyakitold',param,hasil=>{
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
function saveSoapKeperawatanIrja() {
  var param={
    Spo2          : $('#cpptSpo2kepermirja').val(), 
    saturasi      : $('#cpptsaturasikepermirja').val(), 
    nadi          : $('#cpptnadikepermirja').val(), 
    suhu          : $('#cpptsuhukepermirja').val(), 
    tekanandarah  : $('#cppttekanandarahkepermirja').val(), 
    subjek        : $('#subjekkepirja').val(), 
    objek         : $('#objekkepirja').val(),
    assesmen      : $('#assesmenErmKeperawatanIrja').val(),
    planning      : $('#soapintervensiErmKeperawatanIrja').val(),
    id_pegawai    : user.id_pegawai,
    rm            : $('#rmErmKeperawatanIrja').val(),
    unit          : $('#idunitErmKeperawatanIrja').val(),
    id_kunjungan  : $('#idKunjunganErmKeperawatanIrja').val(),
    instruksi     :$('#instruksikepermirja').val()
  };
  apiPOST('Rekammedisirja/addeErmIrja', param, hasil => {
   if (hasil['pesan']=='Berhasil') {
    alert(hasil['pesan']); 
  }else{
    alert(hasil['data']); 
  }
})
}
/*end simpan data*/

/*fungsi bridging*/
function pemeriksaanawalperawatermirja() {
  var param={id_kunjungan:document.getElementById('idKunjunganErmKeperawatanIrja').value,};
  apiPOST("Rekammedisirja/pemeriksaanawalperawat",param,hasil => {
   var a=hasil['data'];
   for (var i = 0; i < a.length; i++) {
    document.getElementById('cppttekanandarahkepermirja').value=a[i].tekanan_darah;
    document.getElementById('cpptsuhukepermirja').value=a[i].suhu;
    document.getElementById('cpptnadikepermirja').value=a[i].nadi;
    document.getElementById('cpptsaturasikepermirja').value=a[i].saturasi;
    document.getElementById('cpptSpo2kepermirja').value=a[i].spo2;
  }
});
}
function viewtandavitalperawatirja() {
  var param = {
    id_kunjungan: document.getElementById('idKunjunganErmKeperawatanIrja').value,
  };
  apiPOST('Rekammedisirna/viewtandavitalirja', param, hasil => {
    if (hasil['code']=="200"){
      var x = hasil['data']; 
      document.getElementById('KeadaanUmumAssKeperawatanIrja').value = x.keadaan_umum;
      document.getElementById('respirasiAssKeperawatanIrja').value   = x.respirasi;
      document.getElementById('nadiAssKeperawatanIrja').value        = x.nadi;
      document.getElementById('Spo2AssKeperawatanIrja').value        = x.spo2;
      document.getElementById('pupilkiriAssKeperawatanIrja').value   = x.pupil_kiri;
      document.getElementById('pupilkananAssKeperawatanIrja').value  = x.pupil_kanan;
      document.getElementById('tekananDarahErmKeperawatanIrja1').value  = x.tekanan_darah1;
      document.getElementById('tekananDarahErmKeperawatanIrja2').value  = x.tekanan_darah2;
      document.getElementById('palpasiErmKeperawatanIrja').value     = x.palpasi;
      document.getElementById('suhuErmKeperawatanIrja').value        = x.suhu;
      document.getElementById('bbErmKeperawatanIrja').value          = x.bb;
      document.getElementById('tinggiErmKeperawatanIrja').value      = x.tinggi_badan;
      document.getElementById('imtErmKeperawatanIrja').value         = x.imt;
      document.getElementById('reflekCahayaKiriErmKeperawatanIrja').value   = x.reflek_cahaya_kiri;
      document.getElementById('reflekCahayaKananErmKeperawatanIrja').value  = x.reflek_cahaya_kanan;
    }
  })
}
function ReviewsoapkepErmIrja(){
  $('#ModalShowAssesmenKepIrja').modal("hide");
  var a='';
  var param = 
  {
    kunjungan : document.getElementById('idKunjunganErmKeperawatanIrja').value,
    id_user   :user.id_pegawai,
  };
  apiPOST('Rekammedisirja/ReviewSoapIrja', param, hasil =>{
    if (hasil['status']=='sukses') {
      var b=hasil['data'];
      var rm   =document.getElementById('idKunjunganErmKeperawatanIrja').value;
      var unit =document.getElementById('idunitErmKeperawatanIrja').value;
      for (var i = 0; i < b.length; i++) {
        document.getElementById("cppttekanandarahkepermirja2").value    =b[i].tekanan_darah;
        document.getElementById("cpptsuhukepermirja2").value            =b[i].suhu;
        document.getElementById("cpptnadikepermirja2").value            =b[i].nadi;
        document.getElementById("cpptsaturasikepermirja2").value        =b[i].saturasi;
        document.getElementById("cpptSpo2kepermirja2").value            =b[i].spo2;
        document.getElementById("subjekkepirja2").value                 =b[i].subjek;
        document.getElementById("objekkepirja2").value                  =b[i].objek;
        document.getElementById("assesmenkepirja2").value               =b[i].assesmen;
        document.getElementById("intervensikepirja2").value             =b[i].planning;
        document.getElementById("instruksikepermirja2").value           =b[i].instruksi;

      }
      $('#ModalShowsoapkepermIrja').modal("show");
    }else{
      ReviewAssesmenkepErmIrja(rm,id_unit);
    }

  });
}
function createsoapikepermirja() {
 document.getElementById('linkassesKepErmKeperawatanIrja').style.display='none';
 document.getElementById('soapikepermirja').click();
 document.getElementById('subjekkepirja').value=document.getElementById("KeluhanAssesmenKepIrja").value;
 document.getElementById('assesmenErmKeperawatanIrja').value=document.getElementById("RiwayatPenyakitAssesmenKepIrja").value;
 $('#ModalShowAssesmenKepIrja').modal("hide");
}
function createassesmenulangkepermirja() {
  document.getElementById('linkassesKepErmKeperawatanIrja').style.display='block';
  document.getElementById('linkassesKepErmKeperawatanIrja').click();
  //document.getElementById('liassesmenmedisirja').click();
  $('#ModalShowAssesmenKepIrja').modal("hide");
}
function ReviewAssesmenkepErmIrja(rm,unit){
  var a='';
  var param = 
  {
    rm : rm,
    id_unit :document.getElementById('idunitErmKeperawatanIrja').value,
    id_kunjungan:document.getElementById('idKunjunganErmKeperawatanIrja').value,
  };
  apiPOST('Rekammedisirja/ReviewAssesmenKepIrja', param, hasil =>{
    if (hasil['code']==200) {
      var b=hasil['data'];
      for (var i = 0; i < b.length; i++) {
        document.getElementById("KeluhanAssesmenKepIrja").value        =b[i].keluhan_utama;
        document.getElementById("RiwayatPenyakitAssesmenKepIrja").value=b[i].penyakit_sekarang;
        document.getElementById("RiwayatAlergiAssesmenKepIrja").value  =b[i].alergi;
      }
      $('#ModalShowAssesmenKepIrja').modal("show");
    }

  });
}
function copysoapikeperm(spo2,saturasi,nadi,darah,suhu,s,o,a,p,i) {
  document.getElementById('soapikepermirja').click();
  document.getElementById('subjekkepirja').value   =s;
  document.getElementById('assesmenErmKeperawatanIrja').value =a;
  document.getElementById('objekkepirja').value    =o;
  document.getElementById('cpptSpo2kepermirja').value=spo2;
  document.getElementById('cpptsaturasikepermirja').value=saturasi;
  document.getElementById('cpptnadikepermirja').value=nadi;
  document.getElementById('cpptsuhukepermirja').value=suhu;
  document.getElementById('cppttekanandarahkepermirja').value=darah;
  document.getElementById('soapintervensiErmKeperawatanIrja').value =p;
  document.getElementById('instruksikepermirja').value =i;
}
function inputdiagnosaperawat() 
{
  const btn = document.querySelector('#btnadddiagperawat');
  btn.addEventListener('click', (event) => {
    let checkboxes = document.querySelectorAll('input[name="dxperawatirja"]:checked');
    let values = [];
    checkboxes.forEach((checkbox) => {
      values.push(checkbox.value);
    });
    $('#Modaldiagnsoaperawat').modal("hide");
    var dataarray=values;
    var param={
      id_kunjungan    :$('#idKunjunganErmKeperawatanIrja').val(),
      user            :user.id_user,
      order_produk    :dataarray,};
      apiPOST('Rekammedisirja/adddiagperawat',param,hasil=>{
        tampilinputdiagnosaperawat();
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
function tampilinputdiagnosaperawat() {
  var param = 
  {
    id_kunjungan:document.getElementById('idKunjunganErmKeperawatanIrja').value,
  };
  apiPOST('Rekammedisirja/ReviewDiagnosaPerawat', param, hasil =>{
    var u='';
    var b=hasil['data'];
    for (var i = 0; i < b.length; i++) {
      u+=b[i].kd_diagnosa_perawat+'|'+b[i].uraian+',';
    }
    document.getElementById('DiagnosaErmKeperawatanIrja').value=u;

  });
}

function tesGetData(){
  var param = {
    gambar: localis.getData()
  };
  newTabPOST('API/Cetak/tesGambar',param);
}

function tesSetPolos(){
  localis.show();return;
  ttd.setPolosBG();
}

function showTtdAssesmenPerawatIrja(){
  ttdAssesmenPerawatIrja.show();
}
function showTtdAssesmenPasienIrja(){
  ttdAssesmenPasienIrja.show();
}

var ttdAssesmenPerawatIrja  = new WPaintX('paint_TtdAssesmenPerawatIrja');
var ttdAssesmenPasienIrja  = new WPaintX('paint_TtdAssesmenPasienIrja');

function ShowModalTtdAssesmenPerawatIrja() {
  showTtdAssesmenPerawatIrja();
  $('#ModalTtdAssesmenPerawatIrja').modal('show');
}

function ShowModalTtdAssesmenPasienIrja() {
  showTtdAssesmenPasienIrja();
  $('#ModalTtdAssesmenPasienIrja').modal('show');
}
function takeTtdAssesmenPerawatIrja() {
  document.getElementById('ImgTtdAssesmenPerawatIrja').src=ttdAssesmenPerawatIrja.getData();
  document.getElementById('HasilTtdAssesmenPerawatIrja').value=ttdAssesmenPerawatIrja.getData();
  $('#ModalTtdAssesmenPerawatIrja').modal('hide');
}
function takeTtdAssesmenPasienIrja() {
  document.getElementById('ImgTtdAssesmenPasienIrja').src=ttdAssesmenPasienIrja.getData();
  document.getElementById('HasilTtdAssesmenPasienIrja').value=ttdAssesmenPasienIrja.getData();
  $('#ModalTtdAssesmenPasienIrja').modal('hide');
}
function onCall_MonitorHD(){
  var param = {
    view            : 'viewMonitoringHD',
    rm              : $('#rmErmKeperawatanIrja').val(),
    unit            : $('#idunitErmKeperawatanIrja').val(),
    id_kunjungan    : $('#idKunjunganErmKeperawatanIrja').val(),
    id_transaksi    : $('#idTransaksiErmKeperawatanIrja').val(),
  }
  
  var data = JSON.stringify(param);
  $('.viewMonitoringHD').load('Rekammedisirja/viewMonitoringHD?data='+data);
}
</script>