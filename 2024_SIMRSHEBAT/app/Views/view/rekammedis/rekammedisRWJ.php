<?php
$nowday     = date('Y-m-d');
$nextday    = date('Y-m-d', strtotime('+1 days', strtotime($nowday)));
?>
<div class="col-md-12 p-2">

  <div class="card card-outline card-danger">
    <div class="overlay-wrapper" id="ermirja_loadingawal">
      <div class="overlay">
        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
      </div>
    </div>  

    <div class="card-body p-2 darkgrey-custom" id='DivERMRWJ'>
      <div class="row">
        <div class="col-sm-4">
          <div class="form-group ">
            <label>Cari No. RM / Nama Pasien :</label>            
            <input type="search" id="searchPxERMrwj" class="form-control form-control" placeholder="Entry RM..." autocomplete="off">
            <input type="search" class="form-control form-control-xs" placeholder="Entry Nama Pasien..." id="RWJERM_nm_pasiencari" autocomplete="off">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Tanggal masuk</label>
            <input type="date" name="tglcariby" id="tglcariby" class="form-control" value="<?php echo date('Y-m-d');?>">
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-12 p-1">
    <div class="card">
      <div class="card-header p-0" id="Divermirja_listpasien">
        <div class="col-md-12 p-0" >
          <div class="card-body p-1" style="max-height: 420px; overflow: auto;">
            <div class="row" id="ermirja_listpasien">
            </div>
          </div>
        </div>
      </div>
      <div class="card-header p-2 darkgrey-custom" id="ermirja_button" style="display:none;" >
        <div class="row">
          <div class="col-md-10">             
            <div id="rwj_pendf_buttonPasienBaru">

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
                  <a class="dropdown-item" onclick="suratsehatirja(1)"><i class="fas fa-barcode"></i> Surat Sehat</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" onclick="suratsehatrohaniirja()"><i class="fas fa-barcode"></i> Surat Sehat Rohani</a>
                </div>
              </div>
              <button type="button" class="btn bg-gradient-secondary btn-xs" type="submit" onclick="tambahpasienrwj()"> <i class="fas fa-user-plus"></i> Pasien Baru</button>
              <button type="button" class="btn bg-gradient-secondary btn-xs" type="submit" onclick="icareRWJ()"> <i class="fas fa-user"></i> I-Care BPJS</button>
               <button type="button" class="btn bg-gradient-secondary btn-xs" type="submit" onclick="$('#ModalCreateSkdp').modal('show');"> <i class="fas fa-arrow-left"></i> Rencana Kontrol</button>
              <button type="button" class="btn bg-gradient-secondary btn-xs" type="submit" onclick="kembaliErmIrja()"> <i class="fas fa-arrow-left"></i> Kembali</button>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form_group">
              <label>Tgl. Kunjung :</label>
              <input type="date" id="ermAssMedIrja_tglkunjungan" class="form-control form-control-xs" disabled>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body p-1" id="DivPasienRWJ" style="display: none; ">
        <div class="card card-info card-outline p-2">
          <div class="row">
            <div class="col-sm-3">  
              <label class="form-label" style="font-size:14px;"> No Rm:
              </label>
              <input type="text" name="rmErmIrja" id="rmErmIrja" class="form-control form-control-xs">
            </div>
            <div class="col-sm-5">  
              <label class="form-label" style="font-size:14px;"> Nama Pasien:
              </label>
              <input type="text" name="namaErmIrja" id="namaErmIrja" class="form-control form-control-xs">
            </div>
            <div class="col-sm-2">  
              <label class="form-label" style="font-size:14px;"> Poliklinik:
              </label>
              <input type="text" name="unitErmIrja" id="unitErmIrja" class="form-control form-control-xs">
              <input type="hidden" name="idKunjunganErmIrja" id="idKunjunganErmIrja">
              <input type="hidden" name="idunitErmIrja" id="idunitErmIrja">
              <input type="hidden" name="idtransaksiermirja" id="idtransaksiermirja">
              <input type="hidden" name="penjaminermirja" id="penjaminermirja">
            </div>
          </div>
        </div>
        <div class="card-body p-1" id="DivPendafDetailRWJ" style="display: none;">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item" id="liassesmendokterermirja">
              <a class="nav-link active" id="liassesmenmedisirja" onclick="viewtandavitalmedisirja()" data-toggle="pill" href="#erekammedisRWJ">Assesmen Dokter</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="linksoap" data-toggle="pill" href="#rwjpendafkeluargakunjungan" >CPPT</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="pill" href="#ResumeErmMedisIrja" onclick="autocomplateresumeirna()">Resume</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="pill" onclick="tampilpenunjangradiologiirja()" href="#rwjpendafriwayatpenyakit">Histori Penunjang</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="pill" href="#rwjpendafhistoryrekammedis">Catatan Rekam Medis IRJA</a>
            </li>
            <li class="nav-item">
              <!-- <a class="nav-link" data-toggle="pill" onclick="onCall_ViewLayananRehabmedik()" >Layanan RJ Rehab Medis</a> -->
              <a class="nav-link" data-toggle="pill" id="linklayananrehabmedik" href="#layananrehabmedik" onclick="onCall_ViewLayananRehabmedik()">Layanan RJ Rehab Medis</a>

            </li>
            <li class="nav-item">
              <!-- <a class="nav-link" data-toggle="pill" onclick="onCall_ViewLayananRehabmedik()" >Layanan RJ Rehab Medis</a> -->
              <a class="nav-link" data-toggle="pill" id="linkBookingOk" href="#BookingOk" onclick="onCall_ViewBookingOk()">Booking Ok</a>

            </li>
          </ul>
          <!-- Tab panes -->
          <div class="tab-content">
            <div class="tab-pane p-1 fade active show" id="erekammedisRWJ" role="tabpanel">
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
                      <textarea class="form-control " id="keluhanutamaErmIrja"></textarea>
                      <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4 p2">
                      <label class="form-label">Riwayat Penyakit Sekarang *</label>&nbsp;&nbsp;&nbsp;<label><span class="badge bg-primary rounded-pill" onclick="penyakitsekarang()" title="autocomplete">auto</span></label>&nbsp;<label><span class="badge bg-primary rounded-pill" onclick="showmodaltambahpenyakitsekarang()" title="tambah icd">Tambah</span></label>
                    </div>
                    <div class="col-md-8 p2">
                      <textarea class="form-control " id="RiwayatPenyakitNowErmIrja"></textarea>
                      <div id="DivRiwayatPenyakitSekarang"></div>
                      <!-- /.form-group -->
                    </div>
                    <!-- /.col --> 
                    <div class="col-md-12 pt-4" style="border: solid;overflow-y: scroll;padding-top: 2px" >
                      <label class="form-label">Riwayat Penyakit dahulu</label>&nbsp;&nbsp;&nbsp;<!-- <label><span class="badge bg-primary rounded-pill" onclick="showmodaltambahpenyakitdahuluassmedermrwj()" title="tambah icd">Tambah</span></label> -->
                      <table   class="table table-striped table-sm">
                        <thead>
                          <tr>
                            <th style="width: 15px">#</th>
                            <th style="width: 80px">ICD 10</th>
                            <th>Penyakit</th>
                          </tr>
                        </thead>
                        <tbody id="bodyhistoripenyakitassmedermrwj"></tbody>
                      </table>
                    </div>

                    <div class="col-md-12 pt-4" style="border: solid;overflow-y: scroll;padding-top: 2px" >
                      <label class="form-label">Riwayat Penyakit Keluarga</label>&nbsp;&nbsp;&nbsp;<label><span class="badge bg-primary rounded-pill" onclick="showmodaltambahpenyakitkelassmedermrwj()" title="tambah icd">Tambah</span></label>
                      <table   class="table table-striped table-sm">
                        <thead>
                          <tr>
                            <th style="width: 15px">#</th>
                            <th style="width: 80px">ICD 10</th>
                            <th>Penyakit</th>
                          </tr>
                        </thead>
                        <tbody id="bodyhistoripenyakitkelassmedermrwj"></tbody>
                      </table>
                    </div>

                    <div class="col-md-12 pt-4" style="border: solid;overflow-y: scroll;padding-top: 2px;">
                      <label class="form-label">Riwayat Pengobatan/Operasi</label>&nbsp;&nbsp;&nbsp;<label><span class="badge bg-primary rounded-pill" onclick="showmodaltambahriwayatoperasiassmedermrwj()" title="tambah icd">Tambah</span></label>
                      <table   class="table table-striped table-sm">
                        <thead>
                          <tr>
                            <th style="width: 15px">#</th>
                            <th>Penyakit</th>
                            <th style="width: 80px">ICD 10</th>
                            <th style="width: 80px">Tanggal</th>
                          </tr>
                        </thead>
                        <tbody id="bodyhistorioperasiassmedermrwj"></tbody>
                      </table>
                    </div>
                    <div class="col-md-12 pt-4" style="border: solid;overflow-y: scroll;padding-top: 2px;">
                      <label class="form-label">Alergi</label>&nbsp;&nbsp;&nbsp;<label><span class="badge bg-primary rounded-pill" onclick="showmodaltambahalergiassmedermrwj()" title="tambah icd">Tambah</span></label>
                      <table   class="table table-striped table-sm">
                        <thead>
                          <tr>
                            <th style="width: 15px">#</th>
                            <th>Alergi</th>
                          </tr>
                        </thead>
                        <tbody id="bodyhistorialergiassmedermrwj"></tbody>
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
                            <select id="checkAgama" name="checkAgama" class="form-control form-control-xs">
                            </select></td>
                          </tr>
                          <tr>
                            <th scope="row">Pekerjaan</th>
                            <td>
                              <select name="pekerjaanermirja" id="pekerjaanermirja" class="form-control form-control-xs" >
                              </select>  
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Tinggal Bersama</th>
                            <td><input type="radio" checked='true' name="TinggalBersamaErmIRja" id="TinggalBersamaErmIRja1" value="1"> Suami/Istri </td>
                            <td><input type="radio" name="TinggalBersamaErmIRja" id="TinggalBersamaErmIRja2" value="2"> Orang Tua </td>
                            <td><input type="radio" name="TinggalBersamaErmIRja" id="TinggalBersamaErmIRja3" value="3"> Anak </td>
                            <td><input type="radio" name="TinggalBersamaErmIRja" id="TinggalBersamaErmIRja4" value="4"> Lain-Lain </td>
                            <td><input type="radio" name="TinggalBersamaErmIRja" id="TinggalBersamaErmIRja5" value="5"> Tinggal Sendiri </td>
                            <td> </td>
                          </tr>
                          <tr>
                            <th scope="row">Status Mental</th>
                            <td><input type="radio" checked='true' name="statusmentalErmIrja" id="statusmentalErmIrja1" value="1"> Orientasi Baik </td>
                            <td><input type="radio" name="statusmentalErmIrja" id="statusmentalErmIrja2" value="2"> Agitasi </td>
                            <td><input type="radio" name="statusmentalErmIrja" id="statusmentalErmIrja3" value="3"> Menyerang </td>
                            <td><input type="radio" name="statusmentalErmIrja" id="statusmentalErmIrja4" value="4"> Tidak Ada Respon </td>
                            <td><input type="radio" name="statusmentalErmIrja" id="statusmentalErmIrja5" value="5"> Lain-Lain </td>
                            <td></td>
                          </tr>
                          <tr>
                            <th scope="row">Status Psikologis</th>
                            <td>
                              <input type="radio" checked='true' name="statusPsikologis" id="statusPsikologis1" value="1"> Kooperatif <br>
                              <input type="radio" name="statusPsikologis" id="statusPsikologis2" value="2"> Gelisah 
                            </td>
                            <td>
                              <input type="radio" name="statusPsikologis" id="statusPsikologis3" value="3"> Disorientasi<br>
                              <input type="radio" name="statusPsikologis" id="statusPsikologis4" value="4"> Depresi 
                            </td>
                            <td>
                              <input type="radio" name="statusPsikologis" id="statusPsikologis5" value="5"> Tenang<br>
                              <input type="radio" name="statusPsikologis" id="statusPsikologis6" value="6"> Marah 
                            </td>
                            <td>
                              <input type="radio" name="statusPsikologis" id="statusPsikologis7" value="7"> Hiperaktif<br>
                              <input type="radio" name="statusPsikologis" id="statusPsikologis8" value="8"> Lain-Lain 
                            </td>
                            <td>
                              <input type="radio" name="statusPsikologis" id="statusPsikologis9" value="9"> Cemas 
                            </td>
                            <td>
                              <input type="radio" name="statusPsikologis" id="statusPsikologis10" value="10"> Kecenderungan Bunuh Diri 
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Penggunaan Restrain</th>
                            <td><input type="radio" checked='true' name="penggunaanRestrainErmIrja" id="penggunaanRestrainErmIrja1" value="1"> Tidak 
                            </td>
                            <td><input type="radio" name="penggunaanRestrainErmIrja" id="penggunaanRestrainErmIrja2" value="2"> Ya, Alasan </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <th scope="row">Budaya Yang Dianut</th>
                            <td><input type="text" name="BudayaErmIrja" id="BudayaErmIrja" class="form-control form-control-xs"></td>
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
                              <input type="text" name="" class="form-control form-control-xs" id="KeadaanUmumAssMedIrja">
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <label>Respirasi</label>
                            </td>
                            <td>
                              <div class="input-group">
                                <input type="text" class="form-control form-control-xs" id="respirasiAssMedIrja">
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
                                <input type="text" class="form-control form-control-xs" id="nadiAssMedIrja">
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
                                <input type="text" class="form-control form-control-xs" id="Spo2AssMedIrja">
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
                                <input type="number" class="form-control form-control-xs" id="pupilkiriAssMedIrja">
                                <div class="input-group-prepend">
                                  <span >kanan </span>
                                </div>
                                <input type="number" class="form-control form-control-xs" id="pupilkananAssMedIrja">
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
                                <input type="number" class="form-control form-control-xs" id="tekananDarahErmIrja1"><h3>/</h3>
                                <input type="number" class="form-control form-control-xs" id="tekananDarahErmIrja2">
                                <div class="input-group-prepend">
                                  <span>mmHg</span>
                                </div>
                              </div>
                              <div class="input-group">
                                <input type="text" placeholder="Diisi jika Palpasi" class="form-control form-control-xs" id="palpasiErmIrja" >
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
                                <input type="text" class="form-control form-control-xs" id="suhuErmIrja" >
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
                                <select class="form-control form-control-xs" id="reflekCahayaKiriErmIrja" >
                                  <option value="1">-</option>
                                  <option value="2">+</option>
                                </select>
                                <div class="input-group-prepend">
                                  <span >kanan</span>
                                </div>
                                <select class="form-control form-control-xs" id="reflekCahayaKananErmIrja">
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
                                <input type="number" id="bbErmIrja" class="form-control form-control-xs">
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
                                <input type="number" class="form-control form-control-xs" id="tinggiErmIrja" onchange="hitungimt()" onclick="hitungimt()">
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
                                <input type="number" class="form-control form-control-xs" id="imtErmIrja" >
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
    <select class="form-control" id="tipekesadaranassmedermrwj">
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
                <input type="radio" name="fisikKepalaErmIrja" id="fisikKepalaErmIrja2" onclick="document.getElementById('fisikKepalaErmIrjaKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikKepalaErmIrjaKet" id="fisikKepalaErmIrjaKet" style="display:none;">
                <input type="radio" id="fisikKepalaErmIrja1" name="fisikKepalaErmIrja" onclick="document.getElementById('fisikKepalaErmIrjaKet').style.display='none'"  checked="true" value="1">Normal
              </td>
              <td>
                Jantung
              </td>
              <td>
                <input type="radio" name="fisikJantungErmIrja" id="fisikJantungErmIrja2" onclick="document.getElementById('fisikJantungErmIrjaKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikJantungErmIrjaKet" id="fisikJantungErmIrjaKet" style="display:none;">
                <input type="radio" name="fisikJantungErmIrja" id="fisikJantungErmIrja1" onclick="document.getElementById('fisikJantungErmIrjaKet').style.display='none'" checked='true' value="1">Normal
              </td>
            </tr>
            <tr>
              <td>
                Mata
              </td>
              <td>
                <input type="radio" name="fisikMataErmIrja" id="fisikMataErmIrja2" onclick="document.getElementById('fisikMataErmIrjaKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text"  class="form-control form-control-xs" name="fisikMataErmIrjaKet" id="fisikMataErmIrjaKet" style="display:none;">
                <input type="radio" name="fisikMataErmIrja" id="fisikMataErmIrja1" onclick="document.getElementById('fisikMataErmIrjaKet').style.display='none'" value="1" checked='true'>Normal
              </td>
              <td>
                Paru
              </td>
              <td>
                <input type="radio" name="fisikParuErmIrja" id="fisikParuErmIrja2" onclick="document.getElementById('fisikParuErmIrjaKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikParuErmIrjaKet" id="fisikParuErmIrjaKet" style="display:none;"> 
                <input type="radio" name="fisikParuErmIrja" id="fisikParuErmIrja1" onclick="document.getElementById('fisikParuErmIrjaKet').style.display='none'" value="1" checked='true'>Normal
              </td>
            </tr>
            <tr>
              <td>
                THT
              </td>
              <td>
                <input type="radio" name="fisikThtErmIrja" onclick="document.getElementById('fisikThtErmIrjaKet').style.display='block'" id="fisikThtErmIrja2" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikThtErmIrjaKet" id="fisikThtErmIrjaKet" style="display:none;">
                <input type="radio" name="fisikThtErmIrja" onclick="document.getElementById('fisikThtErmIrjaKet').style.display='none'" id="fisikThtErmIrja1" value="1" checked='true'>Normal
              </td>
              <td>
                Ambomen
              </td>
              <td>
                <input type="radio" name="fisikAbdomenErmIrja" id="fisikAbdomenErmIrja2" onclick="document.getElementById('fisikAbdomenErmIrjaKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikAbdomenErmIrjaKet" id="fisikAbdomenErmIrjaKet" style="display:none;">
                <input type="radio" name="fisikAbdomenErmIrja" id="fisikAbdomenErmIrja1" onclick="document.getElementById('fisikAbdomenErmIrjaKet').style.display='none'" value="1" checked='true'>Normal
              </td>
            </tr>
            <tr>
              <td>
                Leher
              </td>
              <td>
                <input type="radio" name="fisikLeherErmIrja" id="fisikLeherErmIrja1" onclick="document.getElementById('fisikLeherErmIrjaKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikLeherErmIrjaKet" id="fisikLeherErmIrjaKet" style="display:none;">
                <input type="radio" name="fisikLeherErmIrja" id="fisikLeherErmIrja2" onclick="document.getElementById('fisikLeherErmIrjaKet').style.display='none'" value="1" checked='true'>Normal
              </td>
              <td>
                Genitalia
              </td>
              <td>
                <input type="radio" name="fisikGenitaliaErmIrja" id="fisikGenitaliaErmIrja2" onclick="document.getElementById('fisikGenitaliaErmIrjaKet').style.display='block'" value="2" >Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikGenitaliaErmIrjaKet" id="fisikGenitaliaErmIrjaKet" style="display:none;">
                <input type="radio" name="fisikGenitaliaErmIrja" id="fisikGenitaliaErmIrja1" onclick="document.getElementById('fisikGenitaliaErmIrjaKet').style.display='none'" value="1" checked='true'>Normal
              </td>
            </tr>
            <tr>
              <td>
                Mulut
              </td>
              <td>
                <input type="radio" name="fisikMulutErmIrja" id="fisikMulutErmIrja2" onclick="document.getElementById('fisikMulutErmIrjaKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs" name="fisikMulutErmIrjaKet" id="fisikMulutErmIrjaKet" style="display:none;">
                <input type="radio" name="fisikMulutErmIrja" id="fisikMulutErmIrja1" onclick="document.getElementById('fisikMulutErmIrjaKet').style.display='none'" value="1" checked='true'>Normal
              </td>
              <td>
                Status Localis
              </td>
              <td>
                <textarea class="form-control" id="fisikStatusLocalisErmIrja"></textarea>
              </td>
            </tr>
            <tr>
              <td>
                Thorax
              </td>
              <td colspan="3">
                <input type="radio" name="fisikThoraxErmIrja" id="fisikThoraxErmIrja2" onclick="document.getElementById('fisikThoraxErmIrjaKet').style.display='block'" value="2">Tidak Normal<br>
                <input type="text" class="form-control form-control-xs"  name="fisikThoraxErmIrjaKet" id="fisikThoraxErmIrjaKet" style="display:none;"><br>
                <input type="radio" name="fisikThoraxErmIrja" id="fisikThoraxErmIrja1" onclick="document.getElementById('fisikThoraxErmIrjaKet').style.display='none'" value="1" checked='true'>Norma
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
      <!-- <div class="col-md-6">
        <label>Anjuran</label>
        <textarea rows="3" name="dacrjrehabmedis_eanjuran" id="dacrjrehabmedis_eanjuran" style="width: 100%;" class="form-control"></textarea>
        <label>Evaluasi</label>
        <textarea rows="3" name="dacrjrehabmedis_eevaluasi" id="dacrjrehabmedis_eevaluasi" style="width: 100%;" class="form-control"></textarea>

        <label class="col-form-label font-weight-bold" title="suspek">Suspek Penyakit Akibat Kerja1</label>

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
      </div> -->
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
<div class="card card-default" id="divassesmenmedisanakirja" >
  <div class="card-header" style="background-color:black;">
    <h3 class="card-title" style="color:white;"> CHECKLIST STRATIFIKASI RISIKO RASPRO</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <div class="card-body row">
    <div class="col-md-6">
      <div class="form-group row">
        <div class="col-md-3">
          <label class="col-form-label">Checklist Stratifikasi</label>
        </div>
        <div class="col-md-8">
          <div class="row" id="dacriasesmendwsmedis_checkliststratifikasi">
            <div class="col-md-12">
              <div class="form-group">
                <div class="row custom-control custom-checkbox custom-control-inline">
                  <input name="dacriasesmendwsmedis_checkliststratifikasi" value="1" type="radio" class="custom-control-input" id="dacriasesmendwsmedis_checkliststratifikasi_1" onclick="dacriasesmendwsmedisex.setchecklistsskor();">
                  <label class="custom-control-label" for="dacriasesmendwsmedis_checkliststratifikasi_1">Sepsis / Syok Septik / Febrile Neutropenia* / HAIs**</label>
                </div>
              </div>


            </div>
            <div class="col-md-12">
              <div class="form-group">
                <div class="row custom-control custom-checkbox custom-control-inline">
                  <input name="dacriasesmendwsmedis_checkliststratifikasi" value="2" type="radio" class="custom-control-input" id="dacriasesmendwsmedis_checkliststratifikasi_2" onclick="dacriasesmendwsmedisex.setchecklistsskor();">
                  <label class="custom-control-label" for="dacriasesmendwsmedis_checkliststratifikasi_2">Perforasi Organ / Ensefalopati ec infeksi</label>
                </div>
              </div>


            </div>
            <div class="col-md-12">
              <div class="form-group">
                <div class="row custom-control custom-checkbox custom-control-inline">
                  <input name="dacriasesmendwsmedis_checkliststratifikasi" value="3" type="radio" class="custom-control-input" id="dacriasesmendwsmedis_checkliststratifikasi_3" onclick="dacriasesmendwsmedisex.setchecklistsskor();">
                  <label class="custom-control-label" for="dacriasesmendwsmedis_checkliststratifikasi_3">Immunocompromised*** / DM Tidak Terkontrol</label>
                </div>
              </div>
              <div>
                <div class="row">
                  <div class="col-md-0">   &nbsp;</div>
                  <div class="col-md-11">
                    <label class="col-form-label">» Antibiotik &lt;30 hari y.I., atau</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-0">   &nbsp;</div>
                  <div class="col-md-11">
                    <label class="col-form-label">» Rawat Inap &gt;48 jam di RS &lt;30 hari y.I., atau</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-0">   &nbsp;</div>
                  <div class="col-md-11">
                    <label class="col-form-label">» Instrumen Medis / Riwayat penggunaan &lt;30 hari y.I.</label>
                  </div>
                </div>
              </div>

            </div>
            <div class="col-md-12">
              <div class="form-group">
                <div class="row custom-control custom-checkbox custom-control-inline">
                  <input name="dacriasesmendwsmedis_checkliststratifikasi" value="4" type="radio" class="custom-control-input" id="dacriasesmendwsmedis_checkliststratifikasi_4" onclick="dacriasesmendwsmedisex.setchecklistsskor();">
                  <label class="custom-control-label" for="dacriasesmendwsmedis_checkliststratifikasi_4">Immunocompromised*** / DM Tidak Terkontrol</label>
                </div>
              </div>

              <div>
                <div class="row">
                  <div class="col-md-0">   &nbsp;</div>
                  <div class="col-md-11">
                    <label class="col-form-label">» Antibiotik &lt;90 hari y.I., atau</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-0">   &nbsp;</div>
                  <div class="col-md-11">
                    <label class="col-form-label">» Rawat Inap &gt;48 jam di RS &lt;90 hari y.I., atau</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-0">   &nbsp;</div>
                  <div class="col-md-11">
                    <label class="col-form-label">» Instrumen Medis / Riwayat penggunaan &lt;90 hari y.I.</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <div class="row custom-control custom-checkbox custom-control-inline">
                  <input name="dacriasesmendwsmedis_checkliststratifikasi" value="5" type="radio" class="custom-control-input" id="dacriasesmendwsmedis_checkliststratifikasi_5" onclick="dacriasesmendwsmedisex.setchecklistsskor();">
                  <label class="custom-control-label" for="dacriasesmendwsmedis_checkliststratifikasi_5">Selain kriteria di atas</label>
                </div>
              </div>


            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group row">
        <div class="col-md-3">
          <label class="col-form-label">Antibiotik</label>
        </div>
        <div class="col-md-8">
          <textarea rows="3" name="dacriasesmendwsmedis_checklistantibiotik" id="dacriasesmendwsmedis_checklistantibiotik" style="width:100%;" class="form-control"></textarea>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-3">
          <label class="col-form-label font-weight-bold">SKOR RASPRO</label>
        </div>
        <div class="col-md-8">
          <input type="number" onfocus="this.select();" class="form-control" name="dacriasesmendwsmedis_checklistskor" id="dacriasesmendwsmedis_checklistskor">
        </div>
      </div>
      <div class="form-group row" style="padding-top: 5px;">
        <div class="col-md-11">
          <label class="col-form-label">
            * Neutropenia: ANC &lt;500 - Berat, ANC &lt;1000 - Sedang, ANC &lt;1500 - Ringan. ANC (Absolute Neutrophil Count) = [WBC x(%Neutrofil+%Bands)] /1000
          </label>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-11">
          <label class="col-form-label">
            ** Hospital-Acquired Infections.
          </label>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-11">
          <label class="col-form-label">
            *** Neonatus Berat Badan Lahir Rendah (BBLR), Neonatus Dengan Kelahiran Prematur, 
            Neonatus Dengan Multipatologi (Banyak Komorbid) Geriatri Dengan Multipatologi, 
            HIV / AIDS, Malignancy, Penyakit Kronis / Infeksi Kronis / Infeksi Berulang / Sirosis Hati / 
            Gagal Ginjal Kronis, Autoimmune dan/atau Penggunaaan Immunosupresan.
          </label>
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
        <textarea class="form-control" id="EvaluasiErmIrja"></textarea>
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

        <label class="form-label"> Laboratorium </label>
        <textarea class="form-control" id="labassermmedirja"></textarea>
        <label class="form-label"> EKG </label>
        <textarea class="form-control" id="ekgermmedirja"></textarea>
      </div>
      <div class="col-md-6">
        <label class="form-label">Radiologi</label>
        <textarea class="form-control" id="radiologiassmesermirja"></textarea>
        <label class="form-label">> Lain-lain</label>
        <textarea class="form-control" id="lainmesermirja"></textarea>
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
        <textarea class="form-control" id="AssesmenErmIrja"></textarea>
        <div id="divAssesmenErmIrja"></div>
      </div>   
      <textarea style="display:none;" class="form-control" id="dacrjrehabmedis_fdiagnosafungsi"></textarea>                
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
   <div class="col-sm-12"> 
<!--    <button onclick="showlocalis();" class="btn-primary btn-xs">Show</button>&nbsp;
     <button onclick="tesGetData();"  class="btn-primary btn-xs">get data</button>&nbsp;
    <button onclick="tesSetGigi();"  class="btn-primary btn-xs">Gigi</button>&nbsp;
    <button onclick="tesSetHati();"  class="btn-primary btn-xs">Hati</button>&nbsp;
    <button onclick="tesSetPolos();" class="btn-primary btn-xs">Polos</button> -->
    <select class="form-control form-control-sm" id="selectstatuslocalisermirja" onchange="selectstatuslocalisermirja()">
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
  <div class="col-md-12 p-2">                         
    <div style="width: 600px; height: 600px;">  
      <div id="localis" style="width: 400px; height: 400px;"></div>
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
    <textarea class="form-control" id="planningErmIrja"></textarea><br>
    <button class="btn btn-primary" onclick="erekammedisRWJ_show_ermeresepRWJ();">Eresep</button>
  </div>                
</div>
<div class="card card-default">
  <div class="card-header" style="background-color:black;">
    <h3 class="card-title" style="color:white;">TINDAKAN</h3>
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
    <textarea class="form-control" id="tindakanErmIrja"></textarea>
  </div>
</div>
<div  class="card card-default">
  <div class="card-body">
    <label class="form-label"> Pasien Kompleks </label>
    <center>
      Ya<input type="radio" class="form-group" name="pasienKompleksErmIrja" id="pasienKompleksErmIrja1" value="2">&nbsp;Tidak<input type="radio" class="form-group" name="pasienKompleksErmIrja" id="pasienKompleksErmIrja2" value="1" checked='true'></center>
    </div>
  </div>
  <div class="card">
    <div class="col-sm-4" style="text-align: center;">
      <label style="text-align: center;">Dokter Penganggung Jawab Pasien</label><br>
      <input type="date" style="text-align: center;" name="tglinputdpjp" id="tglinputdpjp" class="form-control" readonly><br>
      <img id="ImgTtdAssesmendokterIrja" style="width:250px;height:250px;">
      <input type="hidden" name="HasilTtdAssesmendokterIrja" id="HasilTtdAssesmendokterIrja">
      <input type="text" style="text-align: center;"  name="dpjpirja" id="dpjpirja" class="form-control" readonly><br>
      <button class="btn btn-primary" onclick="ShowModalTtdAssesmendokterIrja()">TTD</button>
    </div>
  </div>
  <button type="button" class="btn btn-primary " type="submit" onclick="simpanAssesmenMedisIrja();"> <i class="fas fa-save"></i> Simpan Assesmen</button>
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
          <input type="date" id="TglMasukResumeErmMedisIrja" class="form-control form-control-xs">
          <!-- /.form-group -->
        </div>
        <!-- /.col -->
        <div class="col-md-2 p2">
          <label class="form-label">Cara Masuk</label>
        </div>
        <div class="col-md-4 p2">
          <select class="form-control form-control-sm" id="caramasukResumeErmMedisIrja" name="caramasukResumeErmMedisIrja">
          </div>
          <div class="col-md-2 p2">
            <label class="form-label">Tanggal Keluar</label>
          </div>
          <div class="col-md-4 p2">
            <input type="date" id="TglKeluarResumeErmMedisIrja" class="form-control form-control-xs">
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
          <div class="col-md-4">                      
            <select class="form-control form-control-xs" id="selectInstruksiResumeErmIrja" onchange="selectInstruksiResumeErmIrja()">
              <option value="1">DIRAWAT</option>
              <option value="2">DIRUJUK</option>
              <option value="3">PULANG</option>
              <option value="4">MENINGGAL</option>
              <option value="5">DEATH ON ARRIVA</option>
            </select>
          </div>
          <div class="col-md-8">
            <button class="btn btn-primary btn-xs" style="display: none;">Pengantar Rawat Inap</button>
            <button class="btn btn-primary btn-xs" style="display: none;">Rujuk Alih Rawat</button>
            <button class="btn btn-primary btn-xs" style="display: none;">Surat Kontrol</button>
            <button class="btn btn-primary btn-xs" style="display: none;">Program Rujuk Balik</button>
            <button class="btn btn-primary btn-xs" style="display: none;">Surat Kematian</button>
          </div>
          <div class="col-md-6">
            Tanda Tangan
            <div id="paint_ttdresumeirjadokter" class="card" style="border-collapse: !important;"></div>
            <button class="btn btn-secondary" onclick="showttdresumeirja()">Edit</button> 
          </div >
          
        </div>
        
        <!-- /.row -->

      </div>
      <!-- /.card-body -->
    </div>
    <div class="col-md-6 p-2">
      <button  class="btn btn-primary" onclick="simpanResumeIrja()">Simpan Resume</button>
    </div>
  </div>

  <div class="tab-pane p-1 fade" id="rwjpendafkeluargakunjungan" role="tabpanel">
    <div>
      <button class="btn btn-primary" title="Input Resep" onclick="erekammedisRWJ_show_ermeresepRWJ();">Eresep</button>&nbsp;<button class="btn btn-primary" title="Input Order Laboratorium" onclick="show_modalPermintaanLabIrja()">Permintaan Laboratorium</button>&nbsp;<button class="btn btn-primary" title="Input Order Radiologi" onclick="show_modalPermintaancheckboxlogiIrja()">Permintaan Radiologi</button>&nbsp;<button class="btn btn-primary" title="Input Order Radiologi" onclick="show_modalPermintaankonsultasiIrja()">Permintaan Konsultasi</button>
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
            <input type="text" class="form-control form-control-xs" name="cppttekanandarahermirja" id="cppttekanandarahermirja" >
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
            <input type="text" class="form-control form-control-xs" name="cpptsuhuermirja" id="cpptsuhuermirja">
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
            <input type="text" class="form-control form-control-xs" name="cpptnadiermirja" id="cpptnadiermirja" >
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
            <input type="text" class="form-control form-control-xs" name="cpptsaturasiermirja" id="cpptsaturasiermirja">
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
            <input type="text" class="form-control form-control-xs" name="cpptSpo2ermirja" id="cpptSpo2ermirja" >
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
              <button type="button" class="btn bg-gradient-secondary btn-xs" type="submit" onclick="show_cri_subjek()"> <i class="fa fa-plus-square"></i>Tambah</button>&nbsp;<button type="button" class="btn bg-gradient-secondary btn-xs" type="button" onclick="document.getElementById('subjekirja').value='' "> <i class="fa fa-times"></i> Clear</button>
              <textarea class="form-control" id="subjekirja" style="height:50px; width: 100%;" ></textarea>
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
              <button type="button" class="btn bg-gradient-secondary btn-xs" type="button" onclick="document.getElementById('objekirja').value='' "> <i class="fa fa-times"></i> Clear</button>
              <textarea class="form-control" id="objekirja" style="height:50px; width: 100%;" ></textarea>
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
              <button type="button" class="btn bg-gradient-secondary btn-xs" type="button" onclick="TambahdiagnosaCpptErmIrja()"> <i class="fa fa-plus-square"></i> Tambah</button>&nbsp;<button type="button" class="btn bg-gradient-secondary btn-xs" type="button" onclick="document.getElementById('assesmenirja').value='' "> <i class="fa fa-times"></i> Clear</button>
              <textarea class="form-control" id="assesmenirja" style="height:50px; width: 100%;" ></textarea>
              <div id="divcaridiagnosacpptmedis"></div>
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
              <button type="button" class="btn bg-gradient-secondary btn-xs" type="submit" onclick="show_intervensi()">  Intervensi</button>
              <button type="button" class="btn bg-gradient-secondary btn-xs" type="submit" onclick="show_daftarintervensi()">  Daftar Intervensi</button>&nbsp;<button type="button" class="btn bg-gradient-secondary btn-xs" type="button" onclick="document.getElementById('intervensiirja').value='' "> <i class="fa fa-times"></i> Clear</button>
              <textarea class="form-control" style="height:50px; width: 100%;" id="intervensiirja"></textarea>
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
              <textarea class="form-control" style="height:50px; width: 100%;" id="instruksiermirja"></textarea>
            </div>
          </div>
        </td> 
      </tr>
    </table>
    <button id="savesoap" onclick="saveSoapIrja();" class="btn btn-primary sm" style="padding-top:10px;">Simpan SOAP I</button><button id="saverevisisoap" style="display:none;" onclick="revisiSoapIrja();" class="btn btn-primary sm" style="padding-top:10px;">Revisi SOAP I</button>
  </div>

  <div class="tab-pane p-1 fade" id="rwjpendafriwayatpenyakit" role="tabpanel">
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
       <div id='listhistoripenunjangirja'>

        <!-- akhir div id -->
      </div>
    </div>
    <div class="col-md-12" style="padding-top: 10px;">
     <div id='listhistoripenunjangradirja'>

      <!-- akhir div id -->
    </div>
  </div>

</div>
</div>

<div class="tab-pane p-1 fade" id="rwjpendafhistoryrekammedis" role="tabpanel">
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
     <div id='listhistorirmkunjungan'>
     </div>
   </div>
 </div>
</div>
<!--pelayanan Rehab Medik -->

<!-- end pelayanan Rehab Medik -->
<!-- PASIEN PULANG NEW -->

<div class="tab-pane p-1 fade" id="layananrehabmedik" role="tabpanel">
  <div class="card card-row p-2">
   <div class="overlay-wrapper" id="loading_LayananRehabMedik">
    <div class="overlay dark">
     <i class="fas fa-3x fa-sync-alt fa-spin"></i>            
   </div>
 </div>
 <div class="viewRlayananrehabmedik"></div>
</div>
</div>

<div class="tab-pane p-1 fade" id="BookingOk" role="tabpanel">
  <div class="card card-row p-2">

   <div class="viewBookingOk"></div>
 </div>
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
<div class="modal fade" id="Modalinputtindakanermirja" data-bs-backdrop="static">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-body">
      <h3>Apakah Pasien mendapatkan tindakan?</h3>
      <label>Input tindakan</label><br>
      <input id="inputtindakanermirja" class="form-control form-control-xs" ><br>
      <div id="divinputtindakanermirja"></div>
      <input type="hidden" name="idtindakanermirja" id="idtindakanermirja"><br>
      <label>Jumlah Tindakan</label><br>
      <input type="number" name="qtytindakanermirja" id="qtytindakanermirja" value=1 class="form-control form-control-sm"><br>
      <label>Keterangan</label><br>
      <input type="text" name="kettindakanermirja" id="kettindakanermirja" class="form-control form-control-sm"><br>
      <input type="hidden" name="idtarifermirja" id="idtarifermirja">
    </div>
    <div class="modal-footer">
      <button class="btn btn-primary" onclick="inserttindakanbyermirja()">Input Tindakan</button><button class="btn btn-default" onclick="tampilmodalstatuskeluarermirja()">Tidak Ada tindakan</button>
    </div>
  </div>
</div>  
</div>

<div class="modal" id="ModalInputStatusKeluarIrja" data-bs-backdrop="static">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">

    </div>
    <div class="modal-body">
      <div>
        <h2>Input status pulang pasien rawat jalan</h2>
        <label class="form-label">Status Pulang</label>
        <select class="form-control" id="statusPulangassesmenermirja" onclick="pilihfasilitaskesehatanermirja()">
          <option value="01">Pulang</option>
          <option value="02">MRS</option>
          <option value="03">Dirujuk ke RS Lebih Tinggi</option>
          <option value="04">Pindah RS Lain</option>
          <option value="07">Meninggal di Poliklinik / IRNA</option>
          <option value="08">Datang Langsung Mati</option>
          <option value="09">Meninggal di Kamar Operasi</option>
          <option value="10">Melarikan diri</option>
          <option value="11">Konsultasi ke Poli Lain</option>
          <option value="12">Permintaan Sendiri (APS)</option>
        </select>
        <div id="fasilitas_kesehatanermirja" style="display:none;">
         <label class="form-label">Fasilitas Kesehatan</label>
         <select id=tujuanrujukanermirja class="form-control" onchange="rujukanpasien()">
          <option value="1">Puskesmas</option>
          <option value="2">Rumah Sakit Pemerintah</option>
          <option value="3">Rumah Sakit Swasta</option>
          <option value="4">Dokter Praktek</option>
          <option value="5">Bidan/Rumah Bersalin</option>
          <option value="6">Klinik</option>
          <option value="7">Fasilitas Kesehatan lain</option>
        </select> 
        <label class="form-label">Tujuan</label>
        <select id="rujukanpasienermrwj" name="rujukanpasienrwj" class="form-control">
        </select>
      </div>
    </div>
  </div>
  <div class="modal-footer"> 
    <center><button style="width: 100PX;height:40PX;"    onclick="insertStatusPulangermirja()" class="form-control btn btn-primary" id="btnsimpanstatuskeluar">Simpan</button></center>
  </div>
</div>
</div>
</div>
<div class="modal fade" id="ModalCreateSkdp" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header p-1">
        <h4 class="modal-title">Rencana Kontrol</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row" >
          <div class="col-sm-6">
            <label>TGL Kontrol</label>
            <input type="date" class="form-control form-control-xs" name="rwjtglkontrolupdate" id="rwjtglkontrolupdate" value="<?php date('Y-m-d'); ?>"> 
            <div id="Divtampilrujukanrwj"></div> 
          </div>
        </div>
      </div>
      <div class="modal-footer p-1">
        <button type="button" class="btn btn-success btn-sm" onclick="prosesCreateSkdp()"><i class="fas fa-save"></i> Save</button>
        <button type="button" class="btn btn-success btn-sm" onclick="$('#ModalCreateSkdp').modal('hide')"><i class="fas fa-save"></i> Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="ModalTambahdiagnosaCpptErmIrja">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        Tambah Diagnosa
      </div>
      <div class="modal-body">
        <input class="form-control form-control-xs" id="textTambahdiagnosaCpptErmIrja">
        <div id="DivTambahdiagnosaCpptErmIrja"></div>
      </div>
    </div>
  </div>
</div>
<!-- konsul poli -->
<div class="modal fade"  id="modalpermintaankonsultasi" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        Permintaan Konsultasi
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-2">Poliklinik</div>
          <div class="col-md-10">
            <select id="unitkonsulpoli" class="form-control form-control-sm"></select>
          </div>
          <div class="col-md-2">Dokter</div>
          <div class="col-md-10">
            <select id="dokterkonsulpoli" onclick="dpjpermirja()" onchange="dpjpermirja()" class="form-control form-control-sm"></select>
          </div>
          <br>
          <br>
          <div>Pertanyaan</div>
          <textarea id="pertanyaankonsulpoli" class="form-control" style="height: 250px;"></textarea>
          <div>Jawaban</div>
          <textarea id="jawabankonsulpoli" class="form-control" style="height: 250px;"></textarea>

        </div>
      </div>
      <div class="modal-footer">
        <button onclick="simpankonsultasipoli()" class="btn btn-primary">Simpan</button>
        <button class="btn btn-close"data-dismiss='modal'>Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="ModalIntervensiKeperawatan" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
      </div>
      <div class="modal-body">

        <table>
          <tr>
            <td class="col-md-6">
              <input type="checkbox" name="intervensikeperawatan" value="Edukasi Pengukuran Nadi Radialis ( I. 12412 )">Edukasi Pengukuran Nadi Radialis ( I. 12412 )
            </td>
            <td class="col-md-6">
              <input type="checkbox" name="intervensikeperawatan" value="Edukasi Rehabilitasi Jantung ( I. 12446 )">Edukasi Rehabilitasi Jantung ( I. 12446 )
            </td>
          </tr>
          <tr>
            <td>
              <input type="checkbox" name="intervensikeperawatan">Edukasi Proses Penyakit ( I. 12444 )
            </td>
            <td>
              <input type="checkbox" name="intervensikeperawatan">Edukasi Nutrisi ( I. 12395 ) hal 72
            </td>
          </tr>
          <tr>
            <td>
              <input type="checkbox" name="intervensikeperawatan" value="Edukasi Diet ( I.12369 )">Edukasi Diet ( I.12369 )
            </td>
            <td>
              <input type="checkbox" name="intervensikeperawatan" value="Manajemen Diare (L. 03101)">Manajemen Diare (L. 03101)
            </td>
          </tr>
          <tr>
            <td>
              <input type="checkbox" name="intervensikeperawatan" value="Perawatan Bayi ( I. 10338 )">Perawatan Bayi ( I. 10338 )
            </td>
            <td>
              <input type="checkbox" name="intervensikeperawatan" value="Konseling nutrisi ( I. 03094 )">Konseling nutrisi ( I. 03094 )
            </td>
          </tr>
          <tr>
            <td>
              <input type="checkbox" name="intervensikeperawatan" value="Manajemen Cairan (I.03098)">Manajemen Cairan (I.03098)

            </td>
            <td>
              <input type="checkbox" name="intervensikeperawatan" value="Manajemen Elektrolit (I. 03102)">Manajemen Elektrolit (I. 03102)

            </td>
          </tr>
          <tr>
            <td>
              <input type="checkbox" name="intervensikeperawatan" value="Edukasi Dehidrasi ( I. 12367 )">Edukasi Dehidrasi ( I. 12367 )

            </td>
            <td>
              <input type="checkbox" name="intervensikeperawatan" value="Dukungan Perawatan diri BAB/BAK ( I. 11349 )">Dukungan Perawatan diri BAB/BAK ( I. 11349 )

            </td>
          </tr>
          <tr>
            <td>
              <input type="checkbox" name="intervensikeperawatan" value="Manajemen Konstipasi ( I. 04155 )">Manajemen Konstipasi ( I. 04155 )

            </td>
            <td>
              <input type="checkbox" name="intervensikeperawatan" value="Edukasi Irigasi Kandung Kemih ( I. 12375 )">Edukasi Irigasi Kandung Kemih ( I. 12375 )

            </td>
          </tr>
          <tr>
            <td>
              <input type="checkbox" name="intervensikeperawatan" value="Pencegahan Konstipasi (I. 04160)">Pencegahan Konstipasi (I. 04160)

            </td>
            <td>
              <input type="checkbox" name="intervensikeperawatan" value="">Edukasi latihan fisik ( I. 12389 )

            </td>
          </tr>
          <tr>
            <td>
              <input type="checkbox" name="intervensikeperawatan" value="Edukasi aktivitas/ istirahat ( I.12362 )">Edukasi aktivitas/ istirahat ( I.12362 )

            </td>
            <td>
              <input type="checkbox" name="intervensikeperawatan"value ="Edukasi Persalinan (I. 12437)">Edukasi Persalinan (I. 12437)

            </td>
          </tr>
          <tr>
            <td>
              <input type="checkbox" name="intervensikeperawatan" value="Manajemen kehamilan tidak dikehendaki ( I. 107216 )">Manajemen kehamilan tidak dikehendaki ( I. 107216 )

            </td>
            <td>
              <input type="checkbox" name="intervensikeperawatan" value="Edukasi Manajemen Nyeri ( I. 12391 )">Edukasi Manajemen Nyeri ( I. 12391 )

            </td>
          </tr>
          <tr>
            <td>
              <input type="checkbox" name="intervensikeperawatan" value="Terapi Relaksasi ( I. 093226 )">Terapi Relaksasi ( I. 093226 )

            </td>
            <td> 
              <input type="checkbox" name="intervensikeperawatan" value="Edukasi Stimulasi Bayi/Anak ( I. 12448 )">Edukasi Stimulasi Bayi/Anak ( I. 12448 )

            </td>
          </tr>
          <tr>
            <td>
              <input type="checkbox" name="intervensikeperawatan" value="Promosi Perkembangan Anak ( I. 10340 )">Promosi Perkembangan Anak ( I. 10340 )

            </td>
            <td>
              <input type="checkbox" name="intervensikeperawatan" value="Promosi Perkembangan Remaja ( I. 10341 )">Promosi Perkembangan Remaja ( I. 10341 )

            </td>
          </tr>
          <tr>
            <td>
              <input type="checkbox" name="intervensikeperawatan" value="Edukasi Berat Badan Efektif ( I. 12365 )">Edukasi Berat Badan Efektif ( I. 12365 )

            </td>
            <td>
              <input type="checkbox" name="intervensikeperawatan" value="Edukasi Kesehatan (I. 12383)">Edukasi Kesehatan (I. 12383)

            </td>
          </tr>
          <tr>
            <td>
              <input type="checkbox" name="intervensikeperawatan" value="Edukasi Termoregulasi (I. 12457)">Edukasi Termoregulasi (I. 12457)

            </td>
            <td>
              <input type="checkbox" name="intervensikeperawatan" value="Edukasi Cairan ( I. 12455 )">Edukasi Cairan ( I. 12455 )

            </td>
          </tr>
          <tr>
            <td>
              <input type="checkbox" name="intervensikeperawatan" value="Edukasi Reaksi Alergi (I. 12445)">Edukasi Reaksi Alergi (I. 12445)

            </td>
            <td>
              <input type="checkbox" name="intervensikeperawatan" value="Edukasi Perawatan Kulit ( I. 12426 )">Edukasi Perawatan Kulit ( I. 12426 )

            </td>
          </tr>
          <tr>
            <td>
              <input type="checkbox" name="intervensikeperawatan" value="Pencegahan Infeksi (I. 14539)">Pencegahan Infeksi (I. 14539)

            </td>
            <td>
              <input type="checkbox" name="intervensikeperawatan" value="Edukasi Keselamatan Lingkungan ( I. 12384 )">Edukasi Keselamatan Lingkungan ( I. 12384 )

            </td>
          </tr>
          <tr>
            <td>
              <input type="checkbox" name="intervensikeperawatan" value="Intervensi Lain">Intervensi Lain

            </td>
            <td>
              <input type="checkbox" name="intervensikeperawatan" value="Manajemen Jalan Nafas ( I.01012)">Manajemen Jalan Nafas ( I.01012)

            </td>
          </tr>
          <tr>
            <td>
              <input type="checkbox" name="intervensikeperawatan" value="Latihan Batuk Efektif ( I.01006)">Latihan Batuk Efektif ( I.01006)

            </td>
            <td>
              <input type="checkbox" name="intervensikeperawatan" value="Manajemen Sensasi Perifer (I.06195)">Manajemen Sensasi Perifer (I.06195)

            </td>
          </tr>
          <tr>
            <td>
             <input type="checkbox" name="intervensikeperawatan" value="Perawatan Luka (I. 14564)">Perawatan Luka (I. 14564)

           </td>
           <td>
             <input type="checkbox" name="intervensikeperawatan" value="Manajemen Sensasi Perifer (I.06195)">Manajemen Sensasi Perifer (I.06195)

           </td>
         </tr>
         <tr>
          <td>
           <input type="checkbox" name="intervensikeperawatan" value="Manajemen Hipervolemia (I. 03114)">Manajemen Hipervolemia (I. 03114)

         </td>
         <td>
           <input type="checkbox" name="intervensikeperawatan" value="Manajemen Prilaku (I.12463)">Manajemen Prilaku (I.12463)

         </td>
       </tr>
       <tr>
        <td>
         <input type="checkbox" name="intervensikeperawatan" value="Edukasi Pencegahan Jatuh ( I.12407)">Edukasi Pencegahan Jatuh ( I.12407)

       </td>
       <td>
         <input type="checkbox" name="intervensikeperawatan" value="Pemantauan Respirasi ( I.01014)">Pemantauan Respirasi ( I.01014)

       </td>
     </tr>

   </table>
 </div>
 <div class="modal-footer">
  <button type="button" class="btn-primary" id="buttonintervensi" onclick="inputdataintervensi()">
    Masukkan ->
  </button>
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
        <label>Tanggal Laboratorium</label>
        <input type="date" name="tglOrderLab" id="tglOrderLab" class="form-control form-control-xs">
        <label>Cari Jenis Laboratorium</label>
        <input type="input" name="cariorderlabermirja" id="cariorderlabermirja" class="form-control form-control-xs">
        <div class="row"  style="height: 500px;  overflow-y: scroll;">
          <div class="col-md-6 p-2">
            <div class="card">
              <div class="card-header">
                <label class="col-form-label font-weight-bold">Produk Laboratorium</label>
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
            <button type="button" class="btn btn-primary" id="buttonOrderLab" onclick="inputpermohonanlaboratorium()">Order</button>&nbsp;
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
<div class="modal fade" id="ModalPermintaancheckboxlogiIrja">
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
     <button type="button" class="btn btn-primary" id="buttonOrderRad" onclick="inputpermohonanRadiologi()">Order</button>&nbsp;
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
<!-- modal assesmen -->
<div class="modal fade" id="ModalShowAssesmenMedisIrja">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header"><h3>Info!!</h3></div>
      <div class="modal-body" >
        <h4>Keluhan</h4>
        <input type="text" class="form-control" name="KeluhanAssesmenMedisIrja" id="KeluhanAssesmenMedisIrja">
        <h4>Riwayat Penyakit</h4>
        <input type="text" class="form-control" name="RiwayatPenyakitAssesmenMedisIrja" id="RiwayatPenyakitAssesmenMedisIrja">
        <h4>Riwayat Alergi</h4>
        <input type="text" class="form-control" name="RiwayatAlergiAssesmenMedisIrja" id="RiwayatAlergiAssesmenMedisIrja">
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" onclick="createsoapi()">Soap I</button>
        <button class="btn btn-primary" onclick="createassesmenulang()">Assesmen Ulang</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="ModalShowsoapermIrja">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header"><h3>Info!!</h3></div>
      <div class="modal-body" >
        <h4>CPPT sudah terinput,apakah akan diupdate?</h4>
        <div class="row">
          <div class="col-md-6">
            <label>Tekanan Darah</label>  
            <input type="text" class="form-control form-control-xs" id="cppttekanandarahermirja2" name="cppttekanandarahermirja2">
          </div>
          <div class="col-md-6">
            <label>Suhu</label>  
            <input type="text" class="form-control form-control-xs" id="cpptsuhuermirja2" name="cpptsuhuermirja2">
          </div>
          <div class="col-md-6">
           <label>Nadi</label>   
           <input type="text" class="form-control form-control-xs" id="cpptnadiermirja2" name="cpptnadiermirja2">
         </div>
         <div class="col-md-6">
          <label>Saturasi</label>  
          <input type="text" class="form-control form-control-xs" id="cpptsaturasiermirja2" name="cpptsaturasiermirja2">
        </div>
        <div class="col-md-6">
          <label>Sp02</label>  
          <input type="text" class="form-control form-control-xs" id="cpptSpo2ermirja2" name="cpptSpo2ermirja2">
        </div>
        <div class="col-md-12">
          <label>Subjek</label>  
          <input type="text" class="form-control form-control-xs" id="subjekirja2" name="subjekirja2">
        </div>
        <div class="col-md-12">
          <label>Objek</label>
          <input type="text" class="form-control form-control-xs" id="objekirja2" name="objekirja2">
        </div>
        <div class="col-md-12">
          <label>Assesmen</label>
          <input type="text" class="form-control form-control-xs" id="assesmenirja2" name="assesmenirja2">
        </div>
        <div class="col-md-12">
          <label>Intervensi</label>
          <input type="text" class="form-control form-control-xs" id="intervensiirja2" name="intervensiirja2">
        </div>
        <div class="col-md-12">
          <label>Instruksi</label>
          <input type="text" class="form-control form-control-xs" id="instruksiermirja2" name="instruksiermirja2">
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn btn-secondary" onclick="updatesoapiermrwj()">Update</button>
      <button class="btn btn-primary" onclick="$('#ModalShowsoapermIrja').modal('hide')">Tidak</button>
    </div>
  </div>
</div>
</div>
<!-- start penyakit dahulu-->
<div class="modal fade"  id="ModalTambahIcdPenyakitSekarangassmedermrwj" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h3>Input Penyakit</h3>
      </div>
      <div class="modal-body">
        <input type="text" name="" id="ModalinputPenyakitSekarangassmedermrwj" class="form-control">
        <div id="ModalDivPenyakitSekarangassmedermrwj"></div>
      </div>
      <div class="modal-footer">
        <button onclick="InputTextAreaPenyakitSekarang()">Simpan</button>
        <button onclick="$('#ModalTambahIcdPenyakitSekarangassmedermrwj').modal('hide');">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end  -->
<!-- start penyakit dahulu-->
<div class="modal fade"  id="ModalTambahIcdPenyakitkelassmedermrwj" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h3>Input Penyakit Keluarga</h3>
      </div>
      <div class="modal-body">
        <input type="hidden" name="icdpenyakitkelassmedermrwj" id="icdpenyakitkelassmedermrwj">
        <input type="text" name="ModalinputPenyakitkelassmedermrwj" id="ModalinputPenyakitkelassmedermrwj" class="form-control">
        <div id="ModalDivPenyakitkelassmedermrwj"></div>
      </div>
      <div class="modal-footer">
        <button onclick="InputTextAreaPenyakitkel()">Simpan</button>
        <button onclick="$('#ModalTambahIcdPenyakitkelassmedermrwj').modal('hide');">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end  -->
<!-- alergi -->
<div class="modal fade"  id="ModalTambahalergiassmedermrwj" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header"></div>
      <div class="modal-body">
        <input class="form-control form-control-xs" type="text" name="" id="Modalinputalergiassmedermrwj" class="form-control">
      </div>
      <div class="modal-footer">
        <button onclick="savetambahalergiassmedermrwj()">Simpan</button>
        <button onclick="$('#ModalTambahalergiassmedermrwj').modal('hide')">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end alergi -->
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
<!-- icd 10 -->
<div class="modal " id="ModalShowaddmrpenyakitmedermirja">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        Tambah Diagnosa ICD 10
      </div>
      <div class="modal-body">
        <div class="form-group"> 
          <input type="hidden" name="idkunjunganaddicd10" id="idkunjunganaddicd10">  
          <input type="hidden" name="idunitaddicd10" id="idunitaddicd10">  
          <label>ICD 10</label>
          <input class="form-control form-control-xs" id="textTambahdiagnosaresumemedErmirja">
          <div id="DivTambahdiagnosaresumemedErmirja"></div>
        </div>
        <div class="form-group">
          <label>Status Diagnosa</label>
          <select class="form-control form-control-xs" id="statusdiagnosa">
            <option value=0>Awal</option>
            <option value=1>Utama</option>
            <option value=2>Sekunder</option>
            <option value=3>Komplikasi</option>
          </select>
        </div>
        <div class="form-group">
          <button class="btn btn-primary" onclick="pilihPenyakittambahresumemedermirja()">Simpan</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- icd 9 -->
<div class="modal fade" id="ModalShowaddicd9medermirja">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        Tambah Tindakan icd 9
      </div>
      <div class="modal-body">
       <input type="hidden" name="kunjunganaddicd9irja" id="kunjunganaddicd9irja">
       <input type="hidden" name="unitaddicd9irja" id="unitaddicd9irja">
       <input class="form-control form-control-xs" id="textTambahicd9resumemedErmirja">
       <div id="DivTambahicd9resumemedErmirja"></div>
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
<div class="modal fade"  id="ModalTtdAssesmendokterIrja" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header"></div>
      <div class="modal-body">
        <div id="paint_TtdAssesmendokterIrja"></div>
      </div>
      <div class="modal-footer">
        <button onclick="takeTtdAssesmendokterIrja()">Simpan</button>
        <button onclick="$('#ModalTtdAssesmendokterIrja').modal('hide')">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- modal cari skdp -->

<div class="rekammedisRWJ_eresepRWJ_content"></div>
<div class="rekammedisRWJ_eresepRWJ_preview"></div>
<div class="rekammedisRWJ_suratsehat_content"></div>
<div class="rekammedisRWJ_suratsehatrohani_content"></div>

<script type="text/javascript">
  var tgllahir;
  var alamatpasien;
  var penyakitPendaftaranErmIrja;
  var nowday      = "<?php echo $nowday; ?>";
  document.getElementById('ermAssMedIrja_tglkunjungan').value = nowday;
  var localis;
  $(document).ready(function() {
    setTimeout(refresh_pendft_rwj, 1000);  
    ermirja_listpasien();
    LabKimiaKlinis();
    document.getElementById('dpjpirja').value=user['nama'];
    document.getElementById('tglinputdpjp').value=nowday;
    RadUL();
    RadXR();
    RadCTScan();
    time();
    tampilpekerjaanermirja();
    tampilagamaermirja();
    document.getElementById('dacrjasesmenmtmedis_div_operiksadalam').style.display='none';
    document.getElementById('dacrjasesmenmtmedis_div_oinspekulo').style.display='none';
    getDokterirja();
    caramasuk();
    keadaanumum();
    carakeluar();
    aktifPaint();

  });

  $('#searchPxERMrwj').show();
  $('#RWJERM_nm_pasiencari').hide();
  $("#rwj_pendf_buttonPasienBaru").hide();
  function autocomplateresumeirna() {
    var date = new Date();

    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();

    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;

    var tgl       = year + "-" + month + "-" + day;  
    var kunjungan =document.getElementById('idKunjunganErmIrja').value;
    var rm        =document.getElementById('rmErmIrja').value;
    showttdresumeirja();
    detailsoapiakhir(kunjungan);
/*    eresepakhir(kunjungan,tgl,tgl);
    detailmrpenyakitmedermirjaakhir(kunjungan);
    detailicd9medermirjaakhir(kunjungan);*/
    ReviewAssesmenErmIrjaakhir(rm,unit);
    
  }
  function caramasuk() {
    apiPOST('Kunjungan/caramasuk', null,hasil=>{
      var a=hasil['data'];
      var pegawai='';
      for (var i = 0; i < a.length; i++) {
        pegawai+='<option value="'+a[i]['kd_cara_masuk']+'">'+a[i]['cara_masuk']+'</option>';
      }
      document.getElementById('caramasukResumeErmMedisIrja').innerHTML=pegawai;

    });
  }
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
  function getDokterirja(){
    apiPOST('Rekammedisirna/searchDokter', null, hasil => {
      a=hasil['data'];  
      var b='';

      if (hasil !==null){ 
        for (var i = 0; i < a.length; i++) {
          z = hasil['data'][i];
          b+='<option value="'+z.id_pegawai+'">'+z.nama_pegawai+'</option>';
        }
        document.getElementById('dpjpResumeErmMedisIrja').innerHTML=b;
      } 
    });
  }
  function tampilmodalcreateseprwj(e) {
   if (e.keyCode == 13) {
    $('#ModalCreateSEP').modal("show");
    document.getElementById('rwjpendafnokartu').value=document.getElementById('rwjpendafnoasuransi').value;
  }
}
function tesGetData(){
  var param = {
    gambar: localis.getData()
  };
  newTabPOST('API/Cetak/tesGambar',param);
}
function hitungimt() {
  var imt='';
  var num='';
  var a=document.getElementById('tinggiErmIrja').value;
  var b=document.getElementById('bbErmIrja').value;
  var num=a/100;
  imt=b/(num*num);
  document.getElementById('imtErmIrja').value=imt;
}
$(document).on('keyup', '#imtErmIrja', function(e) {

 var charCode = e.which || e.keyCode;
 if(charCode == 40)
 {
  hitungimt();
} 
else if(charCode == 38)
{
  hitungimt();
}
else    (charCode == 13)
{
  hitungimt();
}

})
function selectstatuslocalisermirja() {
  var data = document.getElementById('selectstatuslocalisermirja').value;
  switch (data){
  case "1":
    tesSetPolos();
    break;
  case "2":
    tesSetBadan();
    break;
  case "3":
    tesSetGigi();
    break;
  case "4":
    tesSetJantung();
    break;
  case "5":
    tesSetGinjal();
    break;
  case "6":
    tesSetHidung();
    break;
  case "7":
    tesSetTulang();
    break;
  case "8":
    tesSetMata();
    break;
  case "9":
    tesSetKulit();
    break;
  case "10":
    tesSetKepala();
    break;
  case "11":
    tesSetTelinga();
    break;
  case "12":
    tesSetKandungan();
    break;
  }
}
/*      <option value="1">Polos</option>
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
      <option value="12">Kandungan</option>*/
function tesSetGigi(){
  localis.setGambar('gambar/gigi.jpeg');return;
  var url = 'gambar/gigi.jpeg';
  ttd.setGambarBG(url);
}

function tesSetGinjal(){
  localis.setGambar('gambar/ginjal.png');return;
  var url = 'gambar/ginjal.png';
  ttd.setGambarBG(url);
}
function tesSetKandungan(){
  localis.setGambar('gambar/kandungan.png');return;
  var url = 'gambar/hati.jpg';
  ttd.setGambarBG(url);
}
function tesSetTelinga(){
  localis.setGambar('gambar/telinga.png');return;
  var url = 'gambar/hati.jpg';
  ttd.setGambarBG(url);
}
function tesSetKepala(){
  localis.setGambar('gambar/otak.jpg');return;
  var url = 'gambar/otak.jpg';
  ttd.setGambarBG(url);
}
function tesSetKulit(){
  localis.setGambar('gambar/kulit.png');return;
  var url = 'gambar/kulit.png';
  ttd.setGambarBG(url);
}
function tesSetMata(){
  localis.setGambar('gambar/mata.png');return;
  var url = 'gambar/mata.png';
  ttd.setGambarBG(url);
}
function tesSetTulang(){
  localis.setGambar('gambar/tulang.png');return;
  var url = 'gambar/tulang.png';
  ttd.setGambarBG(url);
}
function tesSetHidung(){
  localis.setGambar('gambar/hidung.jpg');return;
  var url = 'gambar/hidung.jpg';
  ttd.setGambarBG(url);
}
function tesSetJantung(){
  localis.setGambar('gambar/jantung.png');return;
  var url = 'gambar/jantung.png';
  ttd.setGambarBG(url);
}
function tesSetBadan(){
  localis.setGambar('gambar/interne.png');return;
  var url = 'gambar/interne.png';
  ttd.setGambarBG(url);
}
function tesSetPolos(){
  localis.show();return;
  ttd.setPolosBG();
}
function aktifPaint(){
  localis = new Paint('localis');
}
function aktifPaintMedis(){
  statuslocalis = new DrawingPaint('paint_assesmen_medis', {'height': 500,'width':500});
}

function aktifwpaint() {
  $("#wPaint_assesmen").wPaint({
   menuOffsetLeft     : 0,
   menuOffsetTop      : 5,
   strokeStyle        : '#000000',
   fillStyle          :'#000000',
   fontSize           :'12',
   lineWidth          :'1', 
   menuOrientation    :'horizontal' ,
 });
          //document.getElementById("wPaint_assesmen_kulit").id = "wPaint_assesmen";
}
function time() {
  var date = new Date();

  var day = date.getDate();
  var month = date.getMonth() + 1;
  var year = date.getFullYear();

  if (month < 10) month = "0" + month;
  if (day < 10) day = "0" + day;

  var today = year + "-" + month + "-" + day;       
  document.getElementById("TglMasukResumeErmMedisIrja").value = today;
  document.getElementById("TglKeluarResumeErmMedisIrja").value = today;
  document.getElementById("tglOrderLab").value = today;
}

$(document).on('keyup', '#searchPxERMrwj', function(e) {
  if($(this).val() !== '')
  {
   var charCode = e.which || e.keyCode;
   if(charCode == 40)
   {
    searchby();
  } 
  else if(charCode == 38)
  {
    searchby();
  }
  else    (charCode == 13)
  {
    searchby();
  }
}else{
  document.getElementById("DivPenyakitFam").innerHTML="";
}
})

$(document).on('keyup', '#ModalinputPenyakitSekarangassmedermrwj', function(e) {
  if($(this).val() !== '')
  {
   var charCode = e.which || e.keyCode;
   if(charCode == 40)
   {
    icd10sekarangermrwj(1);
  } 
  else if(charCode == 38)
  {
    icd10sekarangermrwj(1);
  }
  else    (charCode == 13)
  {
    icd10sekarangermrwj(1);
  }
}else{
  document.getElementById("ModalDivPenyakitSekarangassmedermrwj").innerHTML="";
}
})
$(document).on('keyup', '#ModalinputPenyakitkelassmedermrwj', function(e) {
  if($(this).val() !== '')
  {
   var charCode = e.which || e.keyCode;
   if(charCode == 40)
   {
    icd10sekarangermrwj(3);
  } 
  else if(charCode == 38)
  {
    icd10sekarangermrwj(3);
  }
  else    (charCode == 13)
  {
    icd10sekarangermrwj(3);
  }
}else{
  document.getElementById("ModalinputPenyakitkelassmedermrwj").innerHTML="";
}
})
$(document).on('keyup', '#AssesmenErmIrja', function(e) {
  if($(this).val() !== '')
  {
   var charCode = e.which || e.keyCode;
   if(charCode == 40)
   {
    icd10sekarangermrwj(5);
  } 
  else if(charCode == 38)
  {
    icd10sekarangermrwj(5);
  }
  else    (charCode == 13)
  {
    icd10sekarangermrwj(5);
  }
}else{
  document.getElementById("AssesmenErmIrja").innerHTML="";
}
})
$(document).on('keyup', '#cariorderlabermirja', function(e) {
  if($(this).val() !== '')
  {
   var charCode = e.which || e.keyCode;
   if(charCode == 40)
   {
    cariorderlabermirja();
  } 
  else if(charCode == 38)
  {
    cariorderlabermirja();
  }
  else    (charCode == 13)
  {
    cariorderlabermirja();
  }
}else{
  document.getElementById("DivPenyakitFam").innerHTML="";
}
})
function icd10sekarangermrwj(nilai) {
  switch(nilai){
  case 1:
    var data=document.getElementById("ModalinputPenyakitSekarangassmedermrwj").value
    break;
  case 3:
    var data=document.getElementById("ModalinputPenyakitkelassmedermrwj").value
    break;
  case 5:
    var data=document.getElementById("AssesmenErmIrja").value
    break;
  }
  var param ={id:data,};
  apiPOST('Kunjungan/icd', param,hasil=>{
    var a=hasil['icd'];
    var unit='';
    for (var i = 0; i < a.length; i++) {

      unit+='<button class="btn btn-primary" onclick="pilihicd10sekarangassmedermrwj(`'+a[i]['penyakit']+'`,'+nilai+',`'+a[i]['id_penyakit']+'`)">'+a[i]['penyakit']+'/'+a[i]['id_penyakit']+'</button><br>';

    }
    switch(nilai){
    case 1:
      document.getElementById('ModalDivPenyakitSekarangassmedermrwj').innerHTML=unit;
      break;
    case 2:
      document.getElementById('DivKeperawatanRiwayatPenyakit').innerHTML=unit;
      break;
    case 3:
      document.getElementById('ModalDivPenyakitkelassmedermrwj').innerHTML=unit;
      break;
    case 4:
      document.getElementById('DivtreaseRiwayatPenyakitSekarang').innerHTML=unit;
      break;
    case 5:
      document.getElementById('divAssesmenErmIrja').innerHTML=unit;
      break;
    default:
    }
  });
}

function icd10kelermrwj(nilai) {
  var param ={id:document.getElementById("ModalinputPenyakitkelassmedermrwj").value,};
  apiPOST('Kunjungan/icd', param,hasil=>{
    var a=hasil['icd'];
    var unit='';
    for (var i = 0; i < a.length; i++) {
      unit+='<button class="btn btn-primary" onclick="pilihicd10sekarangassmedermrwj(`'+a[i]['penyakit']+'`,'+nilai+',`'+a[i]['id_penyakit']+'`)">'+a[i]['penyakit']+'|'+a[i]['id_penyakit']+'</button><br>';
    }
    document.getElementById('ModalDivPenyakitkelassmedermrwj').innerHTML=unit;
  });
}

function pilihicd10sekarangassmedermrwj(kode,nilai,icd) {
  switch(nilai){
  case 1:
    document.getElementById("ModalinputPenyakitSekarangassmedermrwj").value=kode;
    document.getElementById('ModalDivPenyakitSekarangassmedermrwj').style.display="none";
    break;
  case 2:
    document.getElementById("TreageRiwayatPenyakitDuluErmIgd").value=kode;
    document.getElementById("DivKeperawatanRiwayatPenyakit").style.display="none";
    break;
  case 3:
    document.getElementById("ModalinputPenyakitkelassmedermrwj").value=kode;
    document.getElementById("icdpenyakitkelassmedermrwj").value=icd;
    document.getElementById("ModalDivPenyakitkelassmedermrwj").style.display="none";
    break;
  case 5:
    //document.getElementById("ModalinputPenyakitkelassmedermrwj").value=kode;
    document.getElementById("AssesmenErmIrja").value=kode;
    document.getElementById("divAssesmenErmIrja").style.display="none";
    break;
  case 4:
    document.getElementById("TreageRiwayatPenyakitNowErmIgd").value=kode;
    document.getElementById("DivtreaseRiwayatPenyakitSekarang").style.display="none";
    addpenyakittreageigd(icd);
    break;
  }

}

function InputTextAreaPenyakitkel() {
  var param={
    icd:document.getElementById('icdpenyakitkelassmedermrwj').value,
    no_rm:document.getElementById('rmErmIrja').value,};
    apiPOST('Rekammedisirja/savepenyakitkel', param, hasil =>{
    });
    $('#ModalTambahIcdPenyakitkelassmedermrwj').modal('hide');
  }
  function cariorderlabermirja() {
    var a='';
    var param={produk:document.getElementById('cariorderlabermirja').value,};
    apiPOST('Lab/produklabby', param, hasil =>{
      var b=hasil['produk'];
      for (var i = 0; i < b.length; i++) {
        a+='<div class="col-md-6">';
        a+='<div class="form-group">';
        a+='<div class="custom-control custom-checkbox ">';
        a+='<input name="lacrequestlabemrdiag_test" value="'+b[i].id_produk+'" type="checkbox"  id="lacrequestlabemrdiag_test_'+b[i].id_produk+'" onclick="tambahproduklabermirja(`'+b[i].id_produk+'`,`'+b[i].nama_produk+'`)" >';
        a+='<label class="form-label" for="lacrequestlabemrdiag_test_'+b[i].id_produk+'" id="lacrequestlabemrdiag_labeltest_'+b[i].id_produk+'">'+b[i].nama_produk+'</label>';
        a+='</div>';
        a+='</div>';
        a+='</div>';
      }
      document.getElementById('lacrequestlabemrdiag_grouptest_2').innerHTML=a;

    });
  }
  function tambahproduklabermirja(id_produk,nama) {
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
function pemeriksaanawalperawat() {
  var param={id_kunjungan:document.getElementById('idKunjunganErmIrja').value,};
  apiPOST("Rekammedisirja/pemeriksaanawalperawat",param,hasil => {
   var a=hasil['data'];
   for (var i = 0; i < a.length; i++) {
    document.getElementById('cppttekanandarahermirja').value=a[i].tekanan_darah;
    document.getElementById('cpptsuhuermirja').value=a[i].suhu;
    document.getElementById('cpptnadiermirja').value=a[i].nadi;
    document.getElementById('cpptsaturasiermirja').value=a[i].saturasi;
    document.getElementById('cpptSpo2ermirja').value=a[i].spo2;
  }
});
}

function searchby(){  

  var listParam = [
    'searchPxERMrwj', 'RWJERM_nm_pasiencari'
    ];
  var param = {
    norm    :document.getElementById('searchPxERMrwj').value,
    tgl     : document.getElementById('tglcariby').value,
    user    :user.id_pegawai,
    unit_user : user.unit_akses,
  };
  apiPOST("Rekammedisirja/listpasienby", param, hasil => {   
    $('#ermirja_listpasien').html('');
    if (hasil['data'] !== null) {
      if (hasil['code'] == 'xx') {
        toastr.error("Data tidak ditemukan");
        var Baris = "";
        Baris += '<div class="col-sm-12">';
        Baris += '<div class="small-box bg-danger">';
        Baris += '<div class="inner p-1" style="text-align:center;">';
        Baris += '<h6><i class="fa fa-times"></i> Data Tidak Ditemukan</h6>';
        Baris += '</div>';
        Baris += '</div>';
        Baris += '</div>';

        $('#ermirja_listpasien').append(Baris);
        // document.getElementById('searchPxERMrwj').value = '';
        // document.getElementById('RWJERM_nm_pasiencari').value = '';
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
          var nama_unit = a[i].nama_unit;
          var soap      = a[i].soap;
          var id_transaksi=a[i].id_transaksi;
          var id_penjamin=a[i].id_penjamin;
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
            Baris += '<div class="small-box btn-secondary-default" style="border: solid 2px #a8d4da; margin-bottom: 5px !important;">';
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
          Baris += '<a href="#" class="small-box-footer" style="background-color: #a8d4da; color: black;" onclick="tampilPasienErmIrja('+"'"+norm+"','"+unit+"','"+kunjungan+"','"+id_unit+"','"+nama+"','"+id_transaksi+"','"+id_penjamin+"','"+umur+"','"+alamat+"'"+')" style="cursor:pointer;">Klik Disini <i class="fas fa-arrow-circle-right"></i></a>';
          Baris += '</div>';
          Baris += '</div>';
        }
        $('#ermirja_listpasien').append(Baris);
      }       
    }

  });  
};
function showlocalis(){
  localis.show();
}

function ermirja_listpasien(){  

  var listParam = [
    'searchPxERMrwj', 'RWJERM_nm_pasiencari'
    ];
  var param = {
    norm    : document.getElementById('searchPxERMrwj').value,
    tgl     : document.getElementById('tglcariby').value,
    unit_user    :user.unit_akses,
  };
  apiPOST("Rekammedisirja/listpasien", param, hasil => {   
    $('#ermirja_listpasien').html('');
    if (hasil['data'] !== null) {
      if (hasil['code'] == 'xx') {
        toastr.error("Data tidak ditemukan");
        var Baris = "";
        Baris += '<div class="col-sm-12">';
        Baris += '<div class="small-box bg-danger">';
        Baris += '<div class="inner p-1" style="text-align:center;">';
        Baris += '<h6><i class="fa fa-times"></i> Data Tidak Ditemukan</h6>';
        Baris += '</div>';
        Baris += '</div>';
        Baris += '</div>';

        $('#ermirja_listpasien').append(Baris);
        document.getElementById('searchPxERMrwj').value = '';
        document.getElementById('RWJERM_nm_pasiencari').value = '';
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
          var nama_unit = a[i].nama_unit;
          var soap      = a[i].soap;
          var id_transaksi=a[i].id_transaksi;
          var id_penjamin=a[i].id_penjamin;
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
          Baris += '<a href="#" class="small-box-footer" style="background-color: #a8d4da; color: black;" onclick="tampilPasienErmIrja('+"'"+norm+"','"+unit+"','"+kunjungan+"','"+id_unit+"','"+nama+"','"+id_transaksi+"','"+id_penjamin+"','"+umur+"','"+alamat+"'"+')" style="cursor:pointer;">Klik Disini <i class="fas fa-arrow-circle-right"></i></a>';
          Baris += '</div>';
          Baris += '</div>';

        }
        $('#ermirja_listpasien').append(Baris);
      }       
    }

  });  
};
function RadCTScan() {
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

function rujukanpasien() {
  var rujukan='';
  var param={res:document.getElementById('tujuanrujukanermirja').value,};
  apiPOST('Kunjungan/carakeluarpasienirja', param, hasil =>{
    var a=hasil['data'];
    for (var i = 0; i < a.length; i++) {
      rujukan+='<option value='+a[i].kd_rujukan+'>'+a[i].rujukan+'</option>';
    }
    document.getElementById('rujukanpasienermrwj').innerHTML=rujukan;
  });

}

function RadXR() {
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
function RadUL() {
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

function LabHematologi() {
  var a='';
  var param = {kode : 'H',};
  apiPOST('Lab/produk', param, hasil =>{
    var b=hasil['produk'];
    for (var i = 0; i < b.length; i++) {
      a+='<div class="col-md-6">';
      a+='<div class="form-group">';
      a+='<div class="custom-control custom-checkbox ">';
      a+='<input name="lacrequestlabemrdiag_test" value="'+b[i].id_produk+'" type="checkbox"  id="lacrequestlabemrdiag_test_'+b[i].id_produk+'" >';
      a+='<label class="form-label" for="lacrequestlabemrdiag_test_'+b[i].id_produk+'" id="lacrequestlabemrdiag_labeltest_'+b[i].id_produk+'">'+b[i].nama_produk+'</label>';
      a+='</div>';
      a+='</div>';
      a+='</div>';
    }
    document.getElementById('lacrequestlabemrdiag_grouptest_1').innerHTML=a;

  });
}
function Labimunologi() {
  var a='';
  var param = {kode : 'I',};
  apiPOST('Lab/produk', param, hasil =>{
    var b=hasil['produk'];
    for (var i = 0; i < b.length; i++) {
      a+='<div class="col-md-6">';
      a+='<div class="form-group">';
      a+='<div class="custom-control custom-checkbox ">';
      a+='<input name="lacrequestlabemrdiag_test" value="'+b[i].id_produk+'" type="checkbox"  id="lacrequestlabemrdiag_test_'+b[i].id_produk+'" >';
      a+='<label class="form-label" for="lacrequestlabemrdiag_test_'+b[i].id_produk+'" id="lacrequestlabemrdiag_labeltest_'+b[i].id_produk+'">'+b[i].nama_produk+'</label>';
      a+='</div>';
      a+='</div>';
      a+='</div>';
    }
    document.getElementById('lacrequestlabemrdiag_grouptest_3').innerHTML=a;

  });
}
function Labserulogi() {
  var a='';
  var param = {kode : 'S',};
  apiPOST('Lab/produk', param, hasil =>{
    var b=hasil['produk'];
    for (var i = 0; i < b.length; i++) {
      a+='<div class="col-md-6">';
      a+='<div class="form-group">';
      a+='<div class="custom-control custom-checkbox ">';
      a+='<input name="lacrequestlabemrdiag_test" value="'+b[i].id_produk+'" type="checkbox"  id="lacrequestlabemrdiag_test_'+b[i].id_produk+'" >';
      a+='<label class="form-label" for="lacrequestlabemrdiag_test_'+b[i].id_produk+'" id="lacrequestlabemrdiag_labeltest_'+b[i].id_produk+'">'+b[i].nama_produk+'</label>';
      a+='</div>';
      a+='</div>';
      a+='</div>';
    }
    document.getElementById('lacrequestlabemrdiag_grouptest_4').innerHTML=a;

  });
}
function Labmikroba() {
  var a='';
  var param = {kode : 'M',};
  apiPOST('Lab/produk', param, hasil =>{
    var b=hasil['produk'];
    for (var i = 0; i < b.length; i++) {
      a+='<div class="col-md-6">';
      a+='<div class="form-group">';
      a+='<div class="custom-control custom-checkbox ">';
      a+='<input name="lacrequestlabemrdiag_test" value="'+b[i].id_produk+'" type="checkbox"  id="lacrequestlabemrdiag_test_'+b[i].id_produk+'" >';
      a+='<label class="form-label" for="lacrequestlabemrdiag_test_'+b[i].id_produk+'" id="lacrequestlabemrdiag_labeltest_'+b[i].id_produk+'">'+b[i].nama_produk+'</label>';
      a+='</div>';
      a+='</div>';
      a+='</div>';
    }
    document.getElementById('lacrequestlabemrdiag_grouptest_5').innerHTML=a;

  });
}
function LabENDOKRINOLOGI() {
  var a='';
  var param = {kode : 'E',};
  apiPOST('Lab/produk', param, hasil =>{
    var b=hasil['produk'];
    for (var i = 0; i < b.length; i++) {
      a+='<div class="col-md-6">';
      a+='<div class="form-group">';
      a+='<div class="custom-control custom-checkbox ">';
      a+='<input name="lacrequestlabemrdiag_test" value="'+b[i].id_produk+'" type="checkbox"  id="lacrequestlabemrdiag_test_'+b[i].id_produk+'" >';
      a+='<label class="form-label" for="lacrequestlabemrdiag_test_'+b[i].id_produk+'" id="lacrequestlabemrdiag_labeltest_'+b[i].id_produk+'">'+b[i].nama_produk+'</label>';
      a+='</div>';
      a+='</div>';
      a+='</div>';
    }
    document.getElementById('lacrequestlabemrdiag_grouptest_9').innerHTML=a;

  });
}
function LabLainLain() {
  var a='';
  var param = {kode : 'L',};
  apiPOST('Lab/produk', param, hasil =>{
    var b=hasil['produk'];
    for (var i = 0; i < b.length; i++) {
      a+='<div class="col-md-6">';
      a+='<div class="form-group">';
      a+='<div class="custom-control custom-checkbox ">';
      a+='<input name="lacrequestlabemrdiag_test" value="'+b[i].id_produk+'" type="checkbox"  id="lacrequestlabemrdiag_test_'+b[i].id_produk+'" >';
      a+='<label class="form-label" for="lacrequestlabemrdiag_test_'+b[i].id_produk+'" id="lacrequestlabemrdiag_labeltest_'+b[i].id_produk+'">'+b[i].nama_produk+'</label>';
      a+='</div>';
      a+='</div>';
      a+='</div>';
    }
    document.getElementById('lacrequestlabemrdiag_grouptest_11').innerHTML=a;

  });
}
//ENDOKRINOLOGI
function Labtambahan() {
  var a='';
  var param = {kode : 'Z',};
  apiPOST('Lab/produk', param, hasil =>{
    var b=hasil['produk'];
    for (var i = 0; i < b.length; i++) {
      a+='<div class="col-md-6">';
      a+='<div class="form-group">';
      a+='<div class="custom-control custom-checkbox ">';
      a+='<input name="lacrequestlabemrdiag_test" value="'+b[i].id_produk+'" type="checkbox"  id="lacrequestlabemrdiag_test_'+b[i].id_produk+'" >';
      a+='<label class="form-label" for="lacrequestlabemrdiag_test_'+b[i].id_produk+'" id="lacrequestlabemrdiag_labeltest_'+b[i].id_produk+'">'+b[i].nama_produk+'</label>';
      a+='</div>';
      a+='</div>';
      a+='</div>';
    }
    document.getElementById('lacrequestlabemrdiag_grouptest_14').innerHTML=a;

  });
}
function LabRujukan() {
  var a='';
  var param = {kode : 'R',};
  apiPOST('Lab/produk', param, hasil =>{
    var b=hasil['produk'];
    for (var i = 0; i < b.length; i++) {
      a+='<div class="col-md-6">';
      a+='<div class="form-group">';
      a+='<div class="custom-control custom-checkbox ">';
      a+='<input name="lacrequestlabemrdiag_test" value="'+b[i].id_produk+'" type="checkbox"  id="lacrequestlabemrdiag_test_'+b[i].id_produk+'" >';
      a+='<label class="form-label" for="lacrequestlabemrdiag_test_'+b[i].id_produk+'" id="lacrequestlabemrdiag_labeltest_'+b[i].id_produk+'">'+b[i].nama_produk+'</label>';
      a+='</div>';
      a+='</div>';
      a+='</div>';
    }
    document.getElementById('lacrequestlabemrdiag_grouptest_12').innerHTML=a;

  });
}
//lacrequestlabemrdiag_grouptest_12
function data_pendaftaranirwj(e){
 if (e.keyCode == 13) {
  var a='';
  var param = 
  {
    rm : $("#searchPxERMrwj").val(),};
    apiPOST('Kunjungan/historikunjunganirja', param, hasil =>{
      var b=hasil['history'];
      for (var i = 0; i < b.length; i++) {
        var no = i+1;
        a+='<tr>';
        a+='<td>' + no + '</td>';
        a+='<td onclick="tampilPasienErmIrja(`'+b[i].no_rm+'`,`'+b[i].nama_unit+'`,`'+b[i].id_kunjungan+'`,`'+b[i].id_unit+'`,`'+b[i].nama+'`,`'+b[i].id_transaksi+'`,`'+b[i].id_penjamin+'`)">'+b[i].no_rm+'`</td>';
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
//tbodylistresumeermirja
function historipenyakitresumeirja() {
  var a='';
  var param = 
  {
    no_rm : $("#rmErmIrja").val(),};
    apiPOST('Kunjungan/historipenyakit', param, hasil =>{
      var b=hasil['history'];
      for (var i = 0; i < b.length; i++) {
        var no = i+1;
        a+='<tr>';
        a+='<td>' + no + '</td>';
        a+='<td>'+b[i].nama_unit+'</td>';
        a+='<td>'+b[i].tgl_kunjungan+'</td>';
        a+='<td>'+b[i].id_penyakit+'</td>';
        a+='<td>'+b[i].penyakit+'</td>';
        a+='</tr>';
      }
      document.getElementById('tbodylistresumeermirja').innerHTML=a;

    });
  }
  function historipenyakitkeluarga(rm) {
    var a='';
    var param = 
    {
      no_rm : rm,};
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
        document.getElementById('bodyhistoripenyakitkelassmedermrwj').innerHTML=a;

      });
    }
    function OrderLabPk(){
      var today = new Date();
      var dd = String(today.getDate()).padStart(2, '0');
  var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
  var yyyy = today.getFullYear();

  var tgl_rencana_lab = yyyy + '-' + mm + '-' + dd;
  var a='';
  var param = 
  {
    id_kunjungan   : $('#idKunjunganErmIrja').val(),
    tgl_rencana_lab:tgl_rencana_lab,};
    apiPOST('Lab/getListOrderProduk', param, hasil =>{
      var b=hasil['data'];
      for (var i = 0; i < b.length; i++) {
        var no = i+1;
        a+='<tr>';
        a+='<td>' + no + '</td>';
        a+='<td>'+b[i].nama_produk+'</td>';
        a+='</tr>';
      }
      document.getElementById('tbodylistlaboratorium').innerHTML=a;

    });
  }
  function ReviewAssesmenErmIrjaakhir(rm,unit){
    var a='';
    var param = 
    {
      rm : rm,
      unit :unit,
      id_kunjungan:document.getElementById('idKunjunganErmIrja').value,
      transaksi:document.getElementById('idtransaksiermirja').value,
    };
    apiPOST('Rekammedisirja/ReviewAssesmenMedisIrjaresume', param, hasil =>{
      var b=hasil['data1'];
      var c=hasil['data2'];
      var obat=hasil['obat'];
      var d='';
      if (hasil['code']==200) {
       document.getElementById("PemeriksaanFisikResumeErmIrja").value=b['kepala']+','+b['mata']+','+b['tht']+','+b['leher']+','+b['mulut']+','+b['thoraks']+','+b['jantung']+','+b['paru']+','+b['abdomen']+','+b['genitalia'];
       if (c['cara_masuk']=='Datang Sendiri') {
         document.getElementById('caramasukResumeErmMedisIrja').value=c['cara_masuk'];
       } else {
         document.getElementById('caramasukResumeErmMedisIrja').value=c['cara_masuk']+' '+c['rujukan'];
       }
       
       for (var i = 0; i < obat.length; i++) {
         d+='<label>'+obat['nama_obat']+' '+obat['jumlah']+'('+kd_satuan+') </label><br>';
       }
       document.getElementById('TerapiResumeErmIrja').value=d;
     }

   });
  }
  function ReviewAssesmenErmIrja(rm,unit){
    var a='';
    var param = 
    {
      rm : rm,unit :unit,id_kunjungan:document.getElementById('idKunjunganErmIrja').value,
    };
    apiPOST('Rekammedisirja/ReviewAssesmenMedisIrja', param, hasil =>{
      var b=hasil['data'];
      if (hasil['code']==200) {
        for (var i = 0; i < b.length; i++) {
          document.getElementById("KeluhanAssesmenMedisIrja").value        =b[i].keluhan_utama;
          document.getElementById("RiwayatPenyakitAssesmenMedisIrja").value=b[i].penyakit_sekarang;
          document.getElementById("RiwayatAlergiAssesmenMedisIrja").value  =b[i].alergi;
        }
        $('#ModalShowAssesmenMedisIrja').modal("show");
      }

    });
  }
  function ReviewsoapErmIrja(){
    $('#ModalShowAssesmenMedisIrja').modal("hide");
    var a='';
    var param = 
    {
      kunjungan : document.getElementById('idKunjunganErmIrja').value,
      id_user   :user.id_pegawai,
    };
    apiPOST('Rekammedisirja/ReviewSoapIrja', param, hasil =>{
      if (hasil['code']==200 || hasil['code']=='200') {
        var b=hasil['data'];
        var rm   =document.getElementById('idKunjunganErmIrja').value;
        var unit =document.getElementById('idunitErmIrja').value;
        if (hasil['code']==200) {
          for (var i = 0; i < b.length; i++) {
            document.getElementById("cppttekanandarahermirja2").value    =b[i].tekanan_darah;
            document.getElementById("cpptsuhuermirja2").value            =b[i].suhu;
            document.getElementById("cpptnadiermirja2").value            =b[i].nadi;
            document.getElementById("cpptsaturasiermirja2").value        =b[i].saturasi;
            document.getElementById("cpptSpo2ermirja2").value            =b[i].spo2;
            document.getElementById("subjekirja2").value                 =b[i].subjek;
            document.getElementById("objekirja2").value                  =b[i].objek;
            document.getElementById("assesmenirja2").value               =b[i].assesmen;
            document.getElementById("intervensiirja2").value             =b[i].planning;
            document.getElementById("instruksiermirja2").value           =b[i].instruksi;

          }
          $('#ModalShowsoapermIrja').modal("show");
        }else{
          ReviewAssesmenErmIrja(rm,id_unit);
        }
      }
    });
  }
  function ReviewAssesmenPerawatErmIrja(rm,unit,id_kunjungan){
    var a='';
    var param = 
    {
      rm : rm,unit :unit,id_kunjungan:id_kunjungan,
    };
    apiPOST('Rekammedisirja/ReviewAssesmenPerawatIrja', param, hasil =>{
      var b=hasil['data'];
      document.getElementById('keluhanutamaErmIrja').value=b['keluhan_utama'];

/*      if (hasil['code']==200) {
        for (var i = 0; i < b.length; i++) {
          var t_darah =b[i].tekanan_darah.split('/');
          var pupil   =b[i].pupil.split('/');
          var reflek  =b[i].reflek_cahaya.split('/');
          document.getElementById("KeadaanUmumAssMedIrja").value  =b[i].keluhan_utama;
          document.getElementById("respirasiAssMedIrja").value    =b[i].respirasi;
          document.getElementById("nadiAssMedIrja").value         =b[i].nadi;
          document.getElementById("Spo2AssMedIrja").value         =b[i].spo2;
          document.getElementById("pupilkiriAssMedIrja").value    =pupil[0];
          document.getElementById("pupilkananAssMedIrja").value   =pupil[1];
          document.getElementById("tekananDarahErmIrja1").value   =t_darah[0];
          document.getElementById("tekananDarahErmIrja2").value   =t_darah[1];
          document.getElementById("palpasiErmIrja").value         =b[i].palpasi;
          document.getElementById("reflekCahayaKiriErmIrja").value   =reflek[0];
          document.getElementById("reflekCahayaKananErmIrja").value  =reflek[1];
          document.getElementById("bbErmIrja").value              =b[i].bb;
          document.getElementById("tinggiErmIrja").value          =b[i].tinggi_badan;
          document.getElementById("imtErmIrja").value             =b[i].imt;
          document.getElementById("suhuErmIrja").value            =b[i].suhu;

        }
      }*/

    });
  }
  function prosesCreateSkdp() {
    var param = 
    { id_transaksi:document.getElementById('idtransaksiermirja').value,
    id_kunjungan : document.getElementById('idKunjunganErmIrja').value,
    unit : $("#idunitErmIrja").val(),
    dpjp : user.id_pegawai,
    tgl  : $("#rwjtglkontrolupdate").val(),};
    apiPOST('Bridging/CreateRencanaKontrolbyRM', param, hasil =>{
     $('#ModalCreateSkdp').modal('hide');
   });
  }
  function resumemedisirja(idkunjungan,idunit){
    var param = {
      id_kunjungan    : idkunjungan,
      id_unit         : idunit,
      nama            : $('#namaErmIrja').val(),
      rm              : $('#rmErmIrja').val(),
    };
    newTabPOST('API/Laporan/Resume',param);
    return;
  }
  function updatesoapiermrwj() {

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
    document.getElementById('linksoap').click();
    document.getElementById('liassesmendokterermirja').style.display='none';
    $('#ModalShowsoapermIrja').modal('hide');
  }
  function pilihfasilitaskesehatanermirja() {
    var fkt=document.getElementById('statusPulangassesmenermirja').value;
    if (fkt=='03'||fkt=='04'||fkt=='11') {
     document.getElementById('fasilitas_kesehatanermirja').style.display='block';
   } else {
    document.getElementById('fasilitas_kesehatanermirja').style.display='none';
  }
}
function createsoapi() {
 document.getElementById('liassesmendokterermirja').style.display='none';
 document.getElementById('linksoap').click();
 document.getElementById('subjekirja').value=document.getElementById("KeluhanAssesmenMedisIrja").value;
 document.getElementById('assesmenirja').value=document.getElementById("RiwayatPenyakitAssesmenMedisIrja").value;
 $('#ModalShowAssesmenMedisIrja').modal("hide");
}
function createassesmenulang() {
  document.getElementById('liassesmendokterermirja').style.display='block';
  document.getElementById('liassesmendokterermirja').click();
  document.getElementById('liassesmenmedisirja').click();
  $('#ModalShowAssesmenMedisIrja').modal("hide");
}
function TambahdiagnosaCpptErmIrja(){
  $('#ModalTambahdiagnosaCpptErmIrja').modal("show");  
}
function show_cri_subjek(){
  $('#ModalCariSubjek').modal("show");
}
function show_modalPermintaanLabIrja() {
  $('#ModalPermintaanLabIrja').modal('show');
}
function show_modalPermintaankonsultasiIrja() {
  $('#modalpermintaankonsultasi').modal('show');
  unitkonsulermirja();
}
function show_intervensi(){
  $('#ModalIntervensiKeperawatan').modal("show");
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
  hitung()
}
function hitung() {
  var a=document.getElementById('eyeOpen').value;
  var b=document.getElementById('responMotorik').value;
  var c=document.getElementById('responVerbal').value;
  document.getElementById('dacrjasesmenmedis_bgcstot').value=parseInt(a) + parseInt(b) + parseInt(c);
}
function show_cri_nmpasienpendfRWJ()
{
  $('#searchPxERMrwj').hide();
  $('#RWJERM_nm_pasiencari').show();
  $("#RWJERM_nm_pasiencari").trigger('focus');
}
function refresh_pendft_rwj() {
  $('#ermirja_loadingawal').hide();
}

function tampilPasienErmIrja(rm,unit,kunjungan,id_unit,nama,transaksi,penjamin,umur,alamat) {
  document.getElementById('listhistoripenunjangirja').innerHTML = "";
  document.getElementById('rmErmIrja').value=rm;
  document.getElementById('namaErmIrja').value=nama;
  document.getElementById('unitErmIrja').value=unit;
  document.getElementById('idKunjunganErmIrja').value=kunjungan;
  document.getElementById('idunitErmIrja').value=id_unit;
  document.getElementById('idtransaksiermirja').value=transaksi;
  document.getElementById('penjaminermirja').value=penjamin;

  tambahpasienrwj();
  tampilpasien(rm);
  OrderLabPk();
  historipenyakitresumeirja();
  //ReviewAssesmenErmIrja(rm,id_unit);
  ReviewAssesmenPerawatErmIrja(rm,id_unit,kunjungan);
  viewkondisiawal(rm);
  tampilhisrm(rm);
  tampilpenunjangirja(rm);
  pemeriksaanawalperawat();
  ReviewsoapErmIrja();
  historipenyakitkeluarga(rm);
  historialergiassmedermrwj(rm);
  penyakitdahuluassmedermrwj(rm);
   //assesmendokterhistoriupdate(724);
  //assesmendokterhistoriupdate(724);
  viewtandavitalmedisirja();
  tgllahir = umur;
  alamatpasien = alamat;
//tampiltindakaninputermirja();
  switch(id_unit) {
  case '1002':
    document.getElementById('divpemeriksaanmatairja').style.display='block';
    //
    document.getElementById('divevaluasihd').style.display='none';
    document.getElementById('divkolaborasihemodialisairja').style.display='none';
    document.getElementById('divinstruksimedikhemodialisairja').style.display='none';
    document.getElementById('divpemeriksaanmulutgigiirja').style.display='none';
    document.getElementById('divriwayatobstetrikobgynirja').style.display='none';
    document.getElementById('divstatusobgynirja').style.display='none';
    document.getElementById('divmedikasidialisishemodialisisirja').style.display='none';
    document.getElementById('divprosedurterapirehabirja').style.display='none';
    break;
  case '7001':
    document.getElementById('divkolaborasihemodialisairja').style.display='block';
    document.getElementById('divinstruksimedikhemodialisairja').style.display='block';
    document.getElementById('divmedikasidialisishemodialisisirja').style.display='block';
    //
    document.getElementById('divevaluasihd').style.display='none';
    document.getElementById('divkolaborasihemodialisairja').style.display='none';
    document.getElementById('divinstruksimedikhemodialisairja').style.display='none';
    document.getElementById('divmedikasidialisishemodialisisirja').style.display='none';
    document.getElementById('divpemeriksaanmatairja').style.display='none';
    document.getElementById('divpemeriksaanmulutgigiirja').style.display='none';
    document.getElementById('divprosedurterapirehabirja').style.display='none';
    break;
  case '1014':
    document.getElementById('divriwayatobstetrikobgynirja').style.display='block';
    document.getElementById('divstatusobgynirja').style.display='block';
    //
    document.getElementById('divevaluasihd').style.display='none';
    document.getElementById('divkolaborasihemodialisairja').style.display='none';
    document.getElementById('divinstruksimedikhemodialisairja').style.display='none';
    document.getElementById('divpemeriksaanmatairja').style.display='none';
    document.getElementById('divpemeriksaanmulutgigiirja').style.display='none';
    document.getElementById('divmedikasidialisishemodialisisirja').style.display='none';
    document.getElementById('divprosedurterapirehabirja').style.display='none';
    break;
  case '1008':
    document.getElementById('divpemeriksaanmulutgigiirja').style.display='block';
    //
    document.getElementById('divevaluasihd').style.display='none';
    document.getElementById('divriwayatobstetrikobgynirja').style.display='none';
    document.getElementById('divstatusobgynirja').style.display='none';
    document.getElementById('divpemeriksaanmatairja').style.display='none';
    document.getElementById('divkolaborasihemodialisairja').style.display='none';
    document.getElementById('divinstruksimedikhemodialisairja').style.display='none';
    document.getElementById('divmedikasidialisishemodialisisirja').style.display='none';
    document.getElementById('divprosedurterapirehabirja').style.display='none';
    break;
  case '1016':
    document.getElementById('divkolaborasihemodialisairja').style.display='block';
    document.getElementById('divinstruksimedikhemodialisairja').style.display='block';
    document.getElementById('divevaluasihd').style.display='block';
    document.getElementById('divpemeriksaanmulutgigiirja').style.display='none';
    document.getElementById('divriwayatobstetrikobgynirja').style.display='none';
    document.getElementById('divstatusobgynirja').style.display='none';
    document.getElementById('divpemeriksaanmatairja').style.display='none';
    document.getElementById('divprosedurterapirehabirja').style.display='none';
    document.getElementById('divmedikasidialisishemodialisisirja').style.display='block';
    break;
  case '1009':
    document.getElementById('divprosedurterapirehabirja').style.display='block';
    document.getElementById('divkolaborasihemodialisairja').style.display='none';
    document.getElementById('divinstruksimedikhemodialisairja').style.display='none';
    document.getElementById('divevaluasihd').style.display='none';
    document.getElementById('divpemeriksaanmulutgigiirja').style.display='none';
    document.getElementById('divriwayatobstetrikobgynirja').style.display='none';
    document.getElementById('divstatusobgynirja').style.display='none';
    document.getElementById('divpemeriksaanmatairja').style.display='none';
    document.getElementById('divmedikasidialisishemodialisisirja').style.display='none';
    break;
  default:
    document.getElementById('divprosedurterapirehabirja').style.display='none';
    document.getElementById('divkolaborasihemodialisairja').style.display='none';
    document.getElementById('divinstruksimedikhemodialisairja').style.display='none';
    document.getElementById('divevaluasihd').style.display='none';
    document.getElementById('divpemeriksaanmulutgigiirja').style.display='none';
    document.getElementById('divriwayatobstetrikobgynirja').style.display='none';
    document.getElementById('divstatusobgynirja').style.display='none';
    document.getElementById('divpemeriksaanmatairja').style.display='none';
    document.getElementById('divmedikasidialisishemodialisisirja').style.display='none'; 
  }

}
function viewtandavitalmedisirja() {
  var param = {
    id_kunjungan: document.getElementById('idKunjunganErmIrja').value,
  };
  
  apiPOST('Rekammedisirna/viewtandavitalirja', param, hasil => {

    var x = hasil['data']; 
    document.getElementById('KeadaanUmumAssMedIrja').value = x.keadaan_umum;
    document.getElementById('respirasiAssMedIrja').value   = x.respirasi;
    document.getElementById('nadiAssMedIrja').value        = x.nadi;
    document.getElementById('Spo2AssMedIrja').value        = x.spo2;
    document.getElementById('pupilkiriAssMedIrja').value   = x.pupil_kiri;
    document.getElementById('pupilkananAssMedIrja').value  = x.pupil_kanan;
    document.getElementById('tekananDarahErmIrja1').value  = x.tekanan_darah1;
    document.getElementById('tekananDarahErmIrja2').value  = x.tekanan_darah2;
    document.getElementById('palpasiErmIrja').value     = x.palpasi;
    document.getElementById('suhuErmIrja').value        = x.suhu;
    document.getElementById('bbErmIrja').value          = x.bb;
    document.getElementById('tinggiErmIrja').value      = x.tinggi_badan;                  
    
  })
}
//tampilagamaermirja
function tampiltindakaninputermirja() {
  var param={
    id_unit:document.getElementById('idunitErmIrja').value,
    id_penjamin:document.getElementById('penjaminermirja').value,
    cari:document.getElementById('inputtindakanermirja').value,
  };
  apiPOST('Kunjungan/getProdukby',param,hasil=>{
    var a=hasil['data'];
    var nilai='';
    for (var i = 0; i < a.length; i++) {
      nilai+='<button class="btn-primary btn-sm" onclick="pilihtindakanermirja(`'+a[i].id_produk+'`,`'+a[i].id_tarif+'`);" >'+a[i].nama_produk+'</button><br>'
    }
    document.getElementById('divinputtindakanermirja').innerHTML=nilai;
  })
}
$(document).on('keyup', '#inputtindakanermirja', function(e) {
  if($(this).val() !== '')
  {
   var charCode = e.which || e.keyCode;
   if(charCode == 40)
   {
    tampiltindakaninputermirja();
  } 
  else if(charCode == 38)
  {
    tampiltindakaninputermirja();
  }
  else    (charCode == 13)
  {
    tampiltindakaninputermirja();
  }
}else{
  document.getElementById("divinputtindakanermirja").innerHTML="";
}
})
function unitkonsulermirja() {
    //rwjpendafpoliklinik
 apiPOST('Rawatjalan/unit', null,hasil=>{
  var a=hasil['data'];
  var unit='';
  for (var i = 0; i < a.length; i++) {
    unit+='<option value="'+a[i]['id_unit']+'">'+a[i]['nama_unit']+'</option>';
  }
  document.getElementById('unitkonsulpoli').innerHTML=unit;
});
}
/*$(document).on('keyup', '#unitkonsulpoli', function(e) {
  if($(this).val() !== '')
  {
   var charCode = e.which || e.keyCode;
   if(charCode == 40)
   {
    dpjpermirja();
  } 
  else if(charCode == 38)
  {
    dpjpermirja();
  }
  else    (charCode == 13)
  {
    dpjpermirja();
  }
}else{
  document.getElementById("unitkonsulpoli").innerHTML="";
}
})*/
function dpjpermirja() {
  var unitakses=document.getElementById('unitkonsulpoli').value;
  param={unitakses:unitakses,};
  apiPOST('Rawatjalan/dokter', param,hasil=>{
    var a=hasil['data'];
    dokter = ""
    for (var i = 0; i < a.length; i++) {
      dokter+='<option value="'+a[i]['id_pegawai']+'">'+a[i]['nama_pegawai']+'</option>';
    }
    document.getElementById('dokterkonsulpoli').innerHTML=dokter;
  });

}
function tampilpekerjaanermirja() {
  apiPOST('Data_Sosial/pekerjaan', null,hasil=>{
    var pekerjaan='';
    var a=hasil['data'];
    pekerjaan = ""
    for (var i = 0; i < a.length; i++) {
      pekerjaan+='<option value="'+a[i]['kd_pekerjaan']+'">'+a[i]['pekerjaan']+'</option>';
    }
    document.getElementById('pekerjaanermirja').innerHTML=pekerjaan;
  });
}
function showmodaltambahpenyakitdahuluassmedermrwj() {
  $("#ModalTambahIcdPenyakitSekarangassmedermrwj").modal("show");
  document.getElementById("ModalinputPenyakitSekarangassmedermrwj").value="";
}
function showmodaltambahpenyakitkelassmedermrwj() {
  $("#ModalTambahIcdPenyakitkelassmedermrwj").modal("show");
  document.getElementById("ModalinputPenyakitkelassmedermrwj").value="";
  document.getElementById("icdpenyakitkelassmedermrwj").value="";
}
function showmodaltambahalergiassmedermrwj() {
  $("#ModalTambahalergiassmedermrwj").modal("show");
  document.getElementById("ModalinputPenyakitkelassmedermrwj").value="";
  document.getElementById("icdpenyakitkelassmedermrwj").value="";
}
function showmodaltambahriwayatoperasiassmedermrwj() {
  $("#ModalTambahIcdPenyakitkelassmedermrwj").modal("show");
  document.getElementById("ModalinputPenyakitkelassmedermrwj").value="";
  document.getElementById("icdpenyakitkelassmedermrwj").value="";
}
function tampilagamaermirja() {
  apiPOST('Data_Sosial/agama', null,hasil=>{
    var agama='';
    var a=hasil['data'];
    agama = ""
    for (var i = 0; i < a.length; i++) {
      agama+='<option value="'+a[i]['kd_agama']+'">'+a[i]['agama']+'</option>';
    }
    document.getElementById('checkAgama').innerHTML=agama;
  });
}

function tampilmodalstatuskeluarermirja() {
  $('#ModalInputStatusKeluarIrja').modal('show');
  $('#Modalinputtindakanermirja').modal('hide');
}

function tampilstatuskeluarassesmenmesiirja() {
  apiPOST('Kunjungan/carakeluarpasienirja', null,hasil=>{
    var data='';
    var a=hasil['data'];
    for (var i = 0; i < a.length; i++) {
      data+='<option value="'+a[i]['id_cara_keluar']+'">'+a[i]['cara_keluar']+'</option>';
    }
    document.getElementById('statusKeluarassesmenmedisermirja').innerHTML=data;
  });
}
function tampilketerangankeluarrassesmenmesiirja() {
  var param={};
  apiPOST('Kunjungan/carakeluarpasienirja', param,hasil=>{
    var data='';
    var a=hasil['data'];
    for (var i = 0; i < a.length; i++) {
      data+='<option value="'+a[i]['id_cara_keluar']+'">'+a[i]['cara_keluar']+'</option>';
    }
    document.getElementById('statusKeluarassesmenmedisermirja').innerHTML=data;
  });
}
function tampiltujuankeluarassesmenmesiirja() {
  apiPOST('Kunjungan/carakeluarpasienirja', null,hasil=>{
    var data='';
    var a=hasil['data'];
    for (var i = 0; i < a.length; i++) {
      data+='<option value="'+a[i]['id_cara_keluar']+'">'+a[i]['cara_keluar']+'</option>';
    }
    document.getElementById('statusKeluarassesmenmedisermirja').innerHTML=data;
  });
}

function tampilpasien(rm) {
 param={id:rm,};
 apiPOST('Pasien/caripasienbyrm', param,hasil=>{
  var a=hasil['data'];
  for (var i = 0; i < a.length; i++) {
    document.getElementById('checkAgama').value=a[i].kd_agama;
    document.getElementById('pekerjaanermirja').value=a[i].kd_pekerjaan
    document.getElementById('BudayaErmIrja').value=a[i].keyakinan;
  }
});
}
function tambahpasienrwj() {
  var y = document.getElementById("DivPasienRWJ");
  var z = document.getElementById("DivPendafDetailRWJ");
  var a = document.getElementById("rwj_pendf_buttonPasienBaru");
  var c = document.getElementById("DivERMRWJ");
  var d = document.getElementById("Divermirja_listpasien");
  var e = document.getElementById("ermirja_button");
  z.style.display = "block";
  y.style.display = "block";
  a.style.display = "block";
  e.style.display = "block";
  c.style.display = "none";
  d.style.display = "none";
  $("#rwj_pendf_titleheader").html("<i class='fas fa-hospital-user'></i> Pendaftaran Pasien Baru");  
  //$("#igd_pendf_namapasien").trigger('focus');
}
function viewkondisiawal(rm) {
  param={rm:rm,};
  apiPOST('Rekammedisirja/viewkondisiawal', param,hasil=>{
    var unit='';
    var a=hasil['data'];
    for (var i = 0; i < a.length; i++) {
      document.getElementById('cppttekanandarahermirja').value=a[i].tekanan_darah;
      document.getElementById('cpptsuhuermirja').value        =a[i].suhu;
      document.getElementById('cpptnadiermirja').value        =a[i].nadi;
      document.getElementById('cpptsaturasiermirja').value    =a[i].saturasi;
      var t_darah=a[i].tekanan_darah.split('/');
      document.getElementById('tekananDarahErmIrja1').value   =t_darah[0];
      document.getElementById('tekananDarahErmIrja2').value   =t_darah[1];
      document.getElementById('suhuErmIrja').value            =a[i].suhu;
      document.getElementById('nadiAssMedIrja').value         =a[i].nadi;
      document.getElementById('respirasiAssMedIrja').value    =a[i].saturasi;

    }
  });
}
function kembaliErmIrja() {
  var y = document.getElementById("DivPasienRWJ");
  var z = document.getElementById("DivPendafDetailRWJ");
  var a = document.getElementById("rwj_pendf_buttonPasienBaru");
  var c = document.getElementById("DivERMRWJ");
  var d = document.getElementById("Divermirja_listpasien");
  var e = document.getElementById("ermirja_button");
  document.getElementById('liassesmendokterermirja').style.display='block';
  document.getElementById('dacrjasesmenmtmedis_div_operiksadalam').style.display='none';
  document.getElementById('dacrjasesmenmtmedis_div_oinspekulo').style.display='none';
  z.style.display = "none";
  y.style.display = "none";
  a.style.display = "none";
  e.style.display = "none";
  c.style.display = "block";
  d.style.display = "block";
  clearinputmedirja();
  cleartextareamedirja();
}

function clearinputmedirja() {
  var elements = document.getElementsByTagName("input");
  for (var i=0; i < elements.length; i++) {
    if (elements[i].type == "text") {
      elements[i].value = '';
    }
  }
}

function cleartextareamedirja() {
  var elements = document.getElementsByTagName("textarea");
  for (var ii=0; ii < elements.length; ii++) {
    if (elements[ii].type == "textarea") {
      elements[ii].value = '';
    }
  }
}

$(document).on('keyup', '#RiwayatPenyakitFam', function(e) {
  if($(this).val() !== '')
  {
   var charCode = e.which || e.keyCode;
   if(charCode == 40)
   {
    penyakitFam();
  } 
  else if(charCode == 38)
  {
    penyakitFam();
  }
  else    (charCode == 13)
  {
    penyakitFam();
  }
}else{
  document.getElementById("DivPenyakitFam").innerHTML="";
}
})
function penyakitFam() {
  var param ={id:document.getElementById("RiwayatPenyakitFam").value,};
  apiPOST('Kunjungan/icd', param,hasil=>{
    var a=hasil['icd'];
    var unit='';
    for (var i = 0; i < a.length; i++) {
      unit+='<button class="btn btn-primary"  onclick="pilihPenyakitFam(`'+a[i]['penyakit']+'`)">'+a[i]['penyakit']+'</button><br>';
    }
    document.getElementById('DivPenyakitFam').innerHTML=unit;
  });
}
function pilihPenyakitFam(kode) {
  document.getElementById("RiwayatPenyakitFam").value=kode;
  document.getElementById("DivPenyakitFam").innerHTML="";
}
/*modal tambah penyakit sekarang*/
$(document).on('keyup', '#ModalinputPenyakitSekarangErmIrja', function(e) {
  if($(this).val() !== '')
  {
   var charCode = e.which || e.keyCode;
   if(charCode == 40)
   {
    tambahpenyakitsekarang();
  } 
  else if(charCode == 38)
  {
    tambahpenyakitsekarang();
  }
  else    (charCode == 13)
  {
    tambahpenyakitsekarang();
  }
}else{
  document.getElementById("ModalDivPenyakitSekarangErmIrja").innerHTML="";
}
})
function tambahpenyakitsekarang() {
  var param ={id:document.getElementById("ModalinputPenyakitSekarangErmIrja").value,};
  apiPOST('Kunjungan/icd', param,hasil=>{
    var a=hasil['icd'];
    var unit='';
    for (var i = 0; i < a.length; i++) {
      unit+='<label onclick="pilihtambahmodalpenyakitsekarang(`'+a[i]['penyakit']+'`)">'+a[i]['penyakit']+'</label>';
    }
    document.getElementById('ModalDivPenyakitSekarangErmIrja').innerHTML=unit;
  });
}
function pilihtambahmodalpenyakitsekarang(kode) {

  document.getElementById("RiwayatPenyakitNowErmIrja").value=document.getElementById("RiwayatPenyakitNowErmIrja").value+' + '+kode;
  document.getElementById("ModalDivPenyakitSekarangErmIrja").innerHTML="";

  $("#ModalTambahIcdPenyakitSekarang").modal("hide");
}
/*riwayat dulu*/
$(document).on('keyup', '#RiwayatPenyakitDuluErmIrja', function(e) {
  if($(this).val() !== '')
  {
   var charCode = e.which || e.keyCode;
   if(charCode == 40)
   {
    riwayatPenyakit();
  } 
  else if(charCode == 38)
  {
    riwayatPenyakit();
  }
  else    (charCode == 13)
  {
    riwayatPenyakit();
  }
}else{
  document.getElementById("DivRiwayatPenyakit").innerHTML="";
}
})
function riwayatPenyakit() {
  var param ={id:document.getElementById("RiwayatPenyakitDuluErmIrja").value,};
  apiPOST('Kunjungan/icd', param,hasil=>{
    var a=hasil['icd'];
    var unit='';
    for (var i = 0; i < a.length; i++) {
      unit+='<button class="btn btn-primary"  onclick="pilihPenyakitdulu(`'+a[i]['penyakit']+'`)">'+a[i]['penyakit']+'</button><br>';
    }
    document.getElementById('DivRiwayatPenyakit').innerHTML=unit;
  });
}
function pilihPenyakitdulu(kode) {
  document.getElementById("RiwayatPenyakitDuluErmIrja").value=kode;
  document.getElementById("DivRiwayatPenyakit").innerHTML="";
}
/*riwayat sekarang*/
$(document).on('keyup', '#RiwayatPenyakitNowErmIrja', function(e) {
  if($(this).val() !== '')
  {
   var charCode = e.which || e.keyCode;
   if(charCode == 40)
   {
    riwayatPenyakitSekarang();
  } 
  else if(charCode == 38)
  {
    riwayatPenyakitSekarang();
  }
  else    (charCode == 13)
  {
    riwayatPenyakitSekarang();
  }
}else{
  document.getElementById("DivRiwayatPenyakitSekarang").innerHTML="";
}
})

$(document).on('keyup', '#assesmenirja', function(e) {
  if($(this).val() !== '')
  {
   var charCode = e.which || e.keyCode;
   if(charCode == 40)
   {
    penyakitcpptmedis();
  } 
  else if(charCode == 38)
  {
    penyakitcpptmedis();
  }
  else    (charCode == 13)
  {
    penyakitcpptmedis();
  }
}else{
  document.getElementById("divcaridiagnosacpptmedis").innerHTML="";
}
})

$(document).on('keyup', '#textTambahdiagnosaCpptErmIrja', function(e) {
  if($(this).val() !== '')
  {
   var charCode = e.which || e.keyCode;
   if(charCode == 40)
   {
    penyakittambahcpptmedis();
  } 
  else if(charCode == 38)
  {
    penyakittambahcpptmedis();
  }
  else    (charCode == 13)
  {
    penyakittambahcpptmedis();
  }
}else{
  document.getElementById("DivTambahdiagnosaCpptErmIrja").innerHTML="";
}
})
function pilihtindakanermirja(kode,id_tarif) {
  document.getElementById('idtindakanermirja').value=kode;
  document.getElementById('idtarifermirja').value   =id_tarif;
  document.getElementById('divinputtindakanermirja').innerHTML=''

}
function inserttindakanbyermirja() {
  var param ={id_kunj:document.getElementById('idKunjunganErmIrja').value,
  idprd:document.getElementById('idtindakanermirja').value,
  ket:document.getElementById('kettindakanermirja').value,
  qty:document.getElementById('qtytindakanermirja').value,
  id_transak:document.getElementById('idtransaksiermirja').value,
  idtarif:document.getElementById('idtarifermirja').value,
};
apiPOST('Rawatjalan/penatajasaRWJ_simpanProduk',param,hasil=>{

});
document.getElementById('idtindakanermirja').value='';
document.getElementById('kettindakanermirja').value='';
document.getElementById('qtytindakanermirja').value='';
document.getElementById('idtransaksiermirja').value='';
document.getElementById('idtarifermirja').value='';
}
function penyakitcpptmedis() {
  var param ={id:document.getElementById("assesmenirja").value,};
  apiPOST('Kunjungan/icd', param,hasil=>{
    var a=hasil['icd'];
    var unit='';
    for (var i = 0; i < a.length; i++) {
      unit+='<button class="btn btn-primary"  onclick="pilihPenyakitcppt(`'+a[i]['id_penyakit']+'|'+a[i]['penyakit']+'`)">'+a[i]['penyakit']+'</button><br>';
    }
    document.getElementById('divcaridiagnosacpptmedis').innerHTML=unit;
  });
}

function penyakittambahcpptmedis() {
  var param ={id:document.getElementById("textTambahdiagnosaCpptErmIrja").value,};
  apiPOST('Kunjungan/icd', param,hasil=>{
    var a=hasil['icd'];
    var unit='';
    for (var i = 0; i < a.length; i++) {
      unit+='<button class="btn btn-primary"  onclick="pilihPenyakittambahcppt(`'+a[i]['id_penyakit']+'|'+a[i]['penyakit']+'`)">'+a[i]['penyakit']+'</button><br>';
    }
    document.getElementById('DivTambahdiagnosaCpptErmIrja').innerHTML=unit;
  });
}

function riwayatPenyakitSekarang() {
  var param ={id:document.getElementById("RiwayatPenyakitNowErmIrja").value,};
  apiPOST('Kunjungan/icd', param,hasil=>{
    var a=hasil['icd'];
    var unit='';
    for (var i = 0; i < a.length; i++) {
      unit+='<button class="btn btn-primary"  onclick="pilihPenyakitsekarang(`'+a[i]['penyakit']+'`)">'+a[i]['penyakit']+'|'+a[i]['id_penyakit']+'</button><br>';
    }
    document.getElementById('DivRiwayatPenyakitSekarang').innerHTML=unit;
  });
}
function pilihPenyakitsekarang(kode) {
  var a=document.getElementById("RiwayatPenyakitNowErmIrja").value;
  document.getElementById("RiwayatPenyakitNowErmIrja").value=kode;
  document.getElementById("DivRiwayatPenyakitSekarang").innerHTML="";

}
function pilihPenyakitcppt(kode) {
  var res = kode.split('|');
  var icd = res[0];
  var a=document.getElementById("assesmenirja").value;
  document.getElementById("assesmenirja").value=kode;
  document.getElementById("divcaridiagnosacpptmedis").innerHTML="";
  var param={
    rm     :document.getElementById('rmErmIrja').value,
    unit   :document.getElementById('idunitErmIrja').value,
    id_kunjungan :document.getElementById('idKunjunganErmIrja').value,
    kode   :icd,
    stat   :1,
    id_transaksi : document.getElementById('idtransaksiermirja').value,
  };
  apiPOST('Rekammedisirja/addmrpenyakitirja',param,hasil=>{
  });

}
function pilihPenyakittambahcppt(kode) {
  var res = kode.split('|');
  var icd = res[0];
  $('#ModalTambahdiagnosaCpptErmIrja').modal('hide');
  var a=document.getElementById("assesmenirja").value;
  document.getElementById("assesmenirja").value=a+'+'+kode;
  document.getElementById("DivTambahdiagnosaCpptErmIrja").innerHTML="";
  var param={
    rm     :document.getElementById('rmErmIrja').value,
    unit   :document.getElementById('idunitErmIrja').value,
    id_kunjungan :document.getElementById('idKunjunganErmIrja').value,
    kode   :icd,
    stat   :2,
    id_transaksi : document.getElementById('idtransaksiermirja').value,
  };
  apiPOST('Rekammedisirja/addmrpenyakitirja',param,hasil=>{
  });

}
function penyakitdahuluassmedermrwj(rm) {
  var param ={no_rm:rm,};
  apiPOST('Kunjungan/historipenyakit', param,hasil=>{
    var a=hasil['history'];
    var unit='';
    for (var i = 0; i < a.length; i++) {
      var no = i+1;
      unit+='<tr>';
      unit+='<td>' + no + '</td>';
      unit+='<td>'+a[i].id_penyakit+'</td>';
      unit+='<td>'+a[i].penyakit+'</td>';
      unit+='</tr>';
    }
    document.getElementById('bodyhistoripenyakitassmedermrwj').innerHTML=unit;
  });
}
function historialergiassmedermrwj(rm) {
  var a='';
  var param = 
  {
    no_rm : rm,};
    apiPOST('Kunjungan/historialergi', param, hasil =>{
      var b=hasil['history'];
      for (var i = 0; i < b.length; i++) {
        var no = i+1;
        a+='<tr>';
        a+='<td>' + no + '</td>';
        a+='<td>'+b[i].alergi+'</td>';
        a+='</tr>';
      }
      document.getElementById('bodyhistorialergiassmedermrwj').innerHTML=a;

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
      $('#ModalCariSubjek').modal("hide");
      if (cekdinamis=='') {
        dataarray=values;
      } else {
        dataarray=values +','+ cekdinamis;
      }

      document.getElementById('subjekirja').value=dataarray;
    });  
  }

  function inputdataintervensi() 
  {
    const btn = document.querySelector('#buttonintervensi');
    btn.addEventListener('click', (event) => {
      let checkboxes = document.querySelectorAll('input[name="intervensikeperawatan"]:checked');
      let values = [];
      checkboxes.forEach((checkbox) => {
        values.push(checkbox.value);
      });
      $('#ModalIntervensiKeperawatan').modal("hide");
      document.getElementById('intervensiirja').value=values;
    });  
  }

  function inputpermohonanlaboratorium() 
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
        id_kunjungan    :$('#idKunjunganErmIrja').val(),
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

  function inputpermohonanRadiologi() 
  {
    const btn = document.querySelector('#buttonOrderRad');
    btn.addEventListener('click', (event) => {
      let checkboxes = document.querySelectorAll('input[name="lacrequestrademrdiag_test"]:checked');
      let values = [];
      checkboxes.forEach((checkbox) => {
        values.push(checkbox.value);
      });
      $('#ModalPermintaancheckboxlogiIrja').modal("hide");
      var dataarray=values;
      var param={
        id_kunjungan    :$('#idKunjunganErmIrja').val(),
        user            :user.id_pegawai,
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
  document.getElementById('rwjpendafpoliklinik').innerHTML=unit;
});
}

/*menejemen simpan data*/
function simpankonsultasipoli() {
  param={id_kunjungan  :$('#idKunjunganErmIrja').val(),
  pertanyaankonsulpoli :$('#pertanyaankonsulpoli').val(),
  jawabankonsulpoli    :$('#jawabankonsulpoli').val(),
  dokterkonsulpoli     :$('#dokterkonsulpoli').val(),
  unitkonsulpoli       :$('#unitkonsulpoli').val(),
  id_transaksi         :$('#idtransaksiermirja').val(),
  user                 :user.id_pegawai};

  apiPOST('Rekammedisirja/savekonsultasipoli',param,hasil=>{
    $('#modalpermintaankonsultasi').modal('hide');

  })

}
function simpanResumeIrja() {
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
    id_kunjungan:$('#idKunjunganErmIrja').val(),
    tgl_masuk   :$('#TglMasukResumeErmMedisIrja').val(),
    tgl_keluar  :$('#TglKeluarResumeErmMedisIrja').val(),
    dpjp        :$('#dpjpResumeErmMedisIrja').val(),
    cara_masuk  :$('#caramasukResumeErmMedisIrja').val(),
    berat_lahir :$('#BBResumeErmMedisIrja').val(),
    tgl         :$('#tglResumeErmMedisIrja').val(),
    riwayat_kesehatan:$('#RiwayatKesResumeErmIrja').val(),
    pemeriksaan_fisik:$('#PemeriksaanFisikResumeErmIrja').val(),
    pemeriksaan_diagnostik:$('#DiagnostikResumeErmIrja').val(),
    terapi      :$('#TerapiResumeErmIrja').val(),
    tindakan    :$('#TindakanResumeErmIrja').val(),
    instruksi   :$('#InstruksiResumeErmIrja').val(),
    diagnosis   :$('#DiagnosisResumeErmIrja').val(),
    perkembangan_perawatan:$('#PerkembanganResumeErmIrja').val(),
    cara_keluar :$('#CaraKeluarResumeErmIrja').val(),
    keadaan_umum:$('#keadaanUmumResumeErmIrja').val(),
    kesadaran   :$('#kesadaranResumeErmIrja').val(),
    mobilitasi_plg:$('#MblplgResumeErmIrja').val(),
    covid       :covid,
    tensi       :$('#tensiResumeErmIrja').val(),
    nadi        :$('#nadiResumeErmIrja').val(),
    alat_bantu  :alat,
    kasus_baru  :kasus, 
    suhu        :$('#SuhuResumeErmIrja').val(),
    respirasi   :$('#RespirasiResumeErmIrja').val(),
    alat_medis_terpasang:$('#AlatMedisResumeErmIrja').val(),
    kegiatan    :'0',
    instruksi_lanjutan:$('#selectInstruksiResumeErmIrja').val(),
    ttd         :ttdresumeirjadokter.getData(),
  };
  apiPOST('Rekammedisirja/saveResumeErmIrja',param,hasil=>{
    if (hasil['pesan']=='Berhasil') {
      alert(hasil['pesan']);
    } else {
      alert(hasil['data']);
    }
  })
  
}
function simpanAssesmenMedisIrja() {
  var param={
    gambar                      : localis.getData(),
    id_unit                     :$('#idunitErmIrja').val(),
    id_kunjungan                :$('#idKunjunganErmIrja').val(),
    keluhanutamaErmIrja         :$('#keluhanutamaErmIrja').val(),
    RiwayatPenyakitNowErmIrja   :$('#RiwayatPenyakitNowErmIrja').val(),
    RiwayatPenyakitDuluErmIrja  :$('#RiwayatPenyakitDuluErmIrja').val(),
    RiwayatPenyakitFam          :$('#RiwayatPenyakitFam').val(),
    RiwayatOpErmIrja            :$('#RiwayatOpErmIrja').val(),
    RiwayatAlergiErmIrja        :$('#RiwayatAlergiErmIrja').val(),
    tipekesadaranassmedermrwj   :$('#tipekesadaranassmedermrwj').val(),
    TinggalBersamaErmIRja       :document.querySelector('input[name=TinggalBersamaErmIRja]:checked').value,
    statusmentalErmIrja         :document.querySelector('input[name=statusmentalErmIrja]:checked').value,
    statusPsikologis            :document.querySelector('input[name=statusPsikologis]:checked').value,
    penggunaanRestrainErmIrja   :document.querySelector('input[name=penggunaanRestrainErmIrja]:checked').value,
    BudayaErmIrja               :$('#BudayaErmIrja').val(), 
    KeadaanUmumAssMedIrja       :$('#KeadaanUmumAssMedIrja').val(),
    respirasiAssMedIrja         :$('#respirasiAssMedIrja').val(),
    nadiAssMedIrja              :$('#nadiAssMedIrja').val(),
    Spo2AssMedIrja              :$('#Spo2AssMedIrja').val(),
    pupilAssMedIrjakiri         :$('#pupilkiriAssMedIrja').val(),
    pupilAssMedIrjakanan        :$('#pupilkananAssMedIrja').val(),
    tekananDarahErmIrja         :$('#tekananDarahErmIrja1').val(), 
    tekananDarahErmIrja2        :$('#tekananDarahErmIrja2').val(),
    palpasiErmIrja              :$('#palpasiErmIrja').val(),
    suhuErmIrja                 :$('#suhuErmIrja').val(),
    reflekCahayaKiriErmIrja     :$('#reflekCahayaKiriErmIrja').val(),
    reflekCahayaKananErmIrja    :$('#reflekCahayaKananErmIrja').val(),
    bbErmIrja                   :$('#bbErmIrja').val(),
    tinggiErmIrja               :$('#tinggiErmIrja').val(),
    imtErmIrja                  :$('#imtErmIrja').val(),
    dacrjasesmenmedis_bgcstot   :$('#dacrjasesmenmedis_bgcstot').val(),
    AssesmenErmIrja             :$('#AssesmenErmIrja').val(),
    tindakanErmIrja             :$('#tindakanErmIrja').val(),
    planningErmIrja             :$('#planningErmIrja').val(),
    fisikStatusLocalisErmIrja   :$('#fisikStatusLocalisErmIrja').val(),
    laboratorium                :$('#labassermmedirja').val(),
    radiologi                   :$('#radiologiassmesermirja').val(),
    ekg                         :$('#ekgermmedirja').val(),
    lain                        :$('#lainmesermirja').val(),
    pasienKompleksErmIrja       :document.querySelector('input[name=pasienKompleksErmIrja]:checked').value,
    fisikKepalaErmIrja          :document.querySelector('input[name=fisikKepalaErmIrja]:checked').value,
    fisikKepalaErmIrjaKet       :$('#fisikKepalaErmIrjaKet').val(),
    fisikJantungErmIrja         :document.querySelector('input[name=fisikJantungErmIrja]:checked').value,
    fisikJantungErmIrjaKet      :$('#fisikJantungErmIrjaKet').val(),
    fisikMataErmIrja            :document.querySelector('input[name=fisikMataErmIrja]:checked').value,
    fisikMataErmIrjaKet         :$('#fisikMataErmIrjaKet').val(),
    fisikParuErmIrja            :document.querySelector('input[name=fisikParuErmIrja]:checked').value,
    fisikParuErmIrjaKet         :$('#fisikParuErmIrjaKet').val(),
    fisikThtErmIrja             :document.querySelector('input[name=fisikThtErmIrja]:checked').value,
    fisikThtErmIrjaKet          :$('#fisikThtErmIrjaKet').val(),
    fisikAbdomenErmIrja         :document.querySelector('input[name=fisikAbdomenErmIrja]:checked').value,
    fisikAbdomenErmIrjaKet      :$('#fisikAbdomenErmIrjaKet').val(),                           
    fisikLeherErmIrja           :document.querySelector('input[name=fisikLeherErmIrja]:checked').value,
    fisikLeherErmIrjaKet        :$('#fisikLeherErmIrjaKet').val(),
    fisikGenitaliaErmIrja       :document.querySelector('input[name=fisikGenitaliaErmIrja]:checked').value,
    fisikGenitaliaErmIrjaKet    :$('#fisikGenitaliaErmIrjaKet').val(),
    fisikMulutErmIrja           :document.querySelector('input[name=fisikMulutErmIrja]:checked').value,
    fisikMulutErmIrjaKet        :$('#fisikMulutErmIrjaKet').val(),
    fisikThoraxErmIrja          :document.querySelector('input[name=fisikThoraxErmIrja]:checked').value,
    fisikThoraxErmIrjaKet       :$('#fisikThoraxErmIrjaKet').val(),
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
    eyeOpen                         :$('#eyeOpen').val(),
    responMotorik                   :$('#responMotorik').val(),
    responVerbal                    :$('#responVerbal').val(),
    id_user                         :user.id_pegawai,
    ttd                             :document.getElementById('HasilTtdAssesmendokterIrja').value


  };
  apiPOST('Rekammedisirja/saveAssesmenDokterIrja',param,hasil=>{
    document.getElementById('linksoap').click();
    document.getElementById('cppttekanandarahermirja').value=document.getElementById('tekananDarahErmIrja1').value+'/'+document.getElementById('tekananDarahErmIrja2').value;
    document.getElementById('cpptsuhuermirja').value=document.getElementById('suhuErmIrja').value;
    document.getElementById('cpptnadiermirja').value=document.getElementById('nadiAssMedIrja').value;
    document.getElementById('cpptsaturasiermirja').value=document.getElementById('respirasiAssMedIrja').value;
    document.getElementById('Spo2AssMedIrja').value=document.getElementById('cpptSpo2ermirja').value;
    document.getElementById('subjekirja').value=document.getElementById('keluhanutamaErmIrja').value;
    document.getElementById('assesmenirja').value=document.getElementById('RiwayatPenyakitNowErmIrja').value;
    document.getElementById('intervensiirja').value=document.getElementById('planningErmIrja').value;

  })
}
function savetambahalergiassmedermrwj() {
  var param={
    no_rm   :document.getElementById("rmErmIrja").value,
    id_user :user.id_pegawai,
    alergi  :$('#Modalinputalergiassmedermrwj').val(),
  };
  apiPOST('Kunjungan/tambahalergi',param,hasil=>{
  })
  $('$ModalTambahalergiassmedermrwj').modal('hide');
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

function insertStatusPulangermirja() {
  var param ={
    id_kunjungan  : $('#idKunjunganErmIrja').val(),
    statuspulang  : $('#statusPulangassesmenermirja').val(),
    rujukan       : $('#rujukanpasienermrwj').val(),
  };
  apiPOST('Rekammedisirja/statuspulangirja', param, hasil => {
   if (hasil['pesan']=='Berhasil') {
    $('#ModalInputStatusKeluarIrja').modal('hide');
    alert('Berhasil');
  }else{
    alert(hasil['pesan']); 
  }
})
}

function revisiSoapIrja() {
  var param={
    subjek        : $('#subjekirja').val(), 
    objek         : $('#objekirja').val(),
    assesmen      : $('#assesmenirja').val(),
    planning      : $('#intervensiirja').val(),
    instruksi     : $('#instruksiermirja').val(),
    id_pegawai    : user.id_pegawai,
    rm            : $('#rmErmIrja').val(),
    unit          : $('#idunitErmIrja').val(),
    id_kunjungan  : $('#idKunjunganErmIrja').val(),
    saturasi      : $('#cpptsaturasiermirja').val(),
    nadi          : $('#cpptnadiermirja').val(),
    suhu          : $('#cpptsuhuermirja').val(),
    tekanandarah  : $('#cppttekanandarahermirja').val(),
    Spo2          : $('#cpptSpo2ermirja').val(), 
  };
  apiPOST('Rekammedisirja/addeErmIrja', param, hasil => {
   if (hasil['pesan']=='Berhasil') {
    document.getElementById('savesoap').style.display='none';
    document.getElementById('saverevisisoap').style.display='block';
    //$('#Modalinputtindakanermirja').modal('show');
  }else{
    alert(hasil['data']); 
  }
})
}
function saveSoapIrja() {
  var param={
    subjek        : $('#subjekirja').val(), 
    objek         : $('#objekirja').val(),
    assesmen      : $('#assesmenirja').val(),
    planning      : $('#intervensiirja').val(),
    instruksi     : $('#instruksiermirja').val(),
    id_pegawai    : user.id_pegawai,
    rm            : $('#rmErmIrja').val(),
    unit          : $('#idunitErmIrja').val(),
    id_kunjungan  : $('#idKunjunganErmIrja').val(),
    saturasi      : $('#cpptsaturasiermirja').val(),
    nadi          : $('#cpptnadiermirja').val(),
    suhu          : $('#cpptsuhuermirja').val(),
    tekanandarah  : $('#cppttekanandarahermirja').val(),
    Spo2          : $('#cpptSpo2ermirja').val(), 
  };
  apiPOST('Rekammedisirja/addeErmIrja', param, hasil => {
   if (hasil['pesan']=='Berhasil') {
    document.getElementById('savesoap').style.display='none';
    document.getElementById('saverevisisoap').style.display='block';
    $('#Modalinputtindakanermirja').modal('show');
  }else{
    alert(hasil['data']); 
  }
})
}
/*end simpan data*/

/*fungsi bridging*/

/*fungsi memanggil eresep*/
function erekammedisRWJ_show_ermeresepRWJ(){  
  var ermjson_data = {
    'id_kunjOrdEresep' : $('#idKunjunganErmIrja').val(),
    'tgl_kunjOrdEresep': nowday,
    'nowdayOrdEresep'  : nowday,
    'no_rmOrdEresep'   : $('#rmErmIrja').val(),
    'namaOrdEresep'    : $('#namaErmIrja').val().replace(/ /g, '%20'),
    'alamatOrdEresep'  : '',
    'umurOrdEresep'    : '',
    'alamatOrdEresep'  : alamatpasien.replace(/ /g, '%20'),
    'umurOrdEresep'    : tgllahir.replace(/ /g, '%20'),
    'penjaminOrdEresep': '',
    'sepOrdEresep'     : '',
    'telpOrdEresep'    : '',
    'idunitOrdEresep'  : $('#idunitErmIrja').val(),
    'unitOrdEresep'    : $('#unitErmIrja').val().replace(/ /g, '%20'),
    'eresepRWJOrdEresep': 'ERM_IRJA',
    'rekammedis'       : 'rekammedisRWJ_eresepRWJ_content',
    'rekammedis_prev'  : 'rekammedisRWJ_eresepRWJ_preview'
  };

  var ERMmyJSON = JSON.stringify(ermjson_data);

  $('.rekammedisRWJ_eresepRWJ_content').load('Apotek/erm_eresepGabung?data='+ERMmyJSON); // KE TAMPILAN ERESEP ERM


}

function suratsehatirja() {
  var ermjson_data = {
    'id_kunj'     : $('#idKunjunganErmIrja').val(),
    'id_transaksi':$('#idtransaksiermirja').val(),
    'tgl_kunj'    : nowday,
    'nowday'      : nowday,
    'rm'          : $('#rmErmIrja').val(),
    'nama'        : $('#namaErmIrja').val().replace(/ /g, '%20'),
    'alamat'      : alamatpasien.replace(/ /g, '%20'),
    'umur'        : tgllahir.replace(/ /g, '%20'),
  };

  var ERMmyJSON = JSON.stringify(ermjson_data);
  $('.rekammedisRWJ_suratsehat_content').load('Ermirja/suratsehatirja?data='+ERMmyJSON);
}
function suratsehatrohaniirja() {
  var ermjson_data = {
    'id_kunj'     : $('#idKunjunganErmIrja').val(),
    'id_transaksi':$('#idtransaksiermirja').val(),
    'tgl_kunj'    : nowday,
    'nowday'      : nowday,
    'rm'          : $('#rmErmIrja').val(),
    'nama'        : $('#namaErmIrja').val().replace(/ /g, '%20'),
    'alamat'      : alamatpasien.replace(/ /g, '%20'),
    'umur'        : tgllahir.replace(/ /g, '%20'),
  };

  var ERMmyJSON = JSON.stringify(ermjson_data);
  $('.rekammedisRWJ_suratsehatrohani_content').load('Ermirja/suratsehatrohaniirja?data='+ERMmyJSON);
}


function assesmendokterhistoriupdate(idkunjunganhistori) {
  document.getElementById('liassesmenmedisirja').click();
  var param = {
    id: idkunjunganhistori,
  };
  apiPOST('Rekammedisirja/datakunjunganrmmedisdetail', param, hasil => {
    //$('#idunitErmIrja').val()=a[i]['keluhan_utama'];
    var a = hasil['data'];
    for (var i = 0; i < a.length; i++) {
    //$('#idKunjunganErmIrja').val()=idkunjunganhistori;
      document.getElementById('keluhanutamaErmIrja').value=a[i]['keluhan_utama'];
      document.getElementById('RiwayatPenyakitNowErmIrja').value=a[i]['penyakit_sekarang'];
      switch (a[i]['tinggal']){
      case "1":
        document.getElementById('TinggalBersamaErmIRja1').checked='true';
        break;
      case "2":
        document.getElementById('TinggalBersamaErmIRja2').checked='true';
        break;
      case "3":
        document.getElementById('TinggalBersamaErmIRja3').checked='true';
        break;
      case "4":
        document.getElementById('TinggalBersamaErmIRja4').checked='true';
        break;
      case "5":
        document.getElementById('TinggalBersamaErmIRja5').checked='true';
        break;
      }

      switch (a[i]['status_mental']){
      case "1":
        document.getElementById('statusmentalErmIrja1').checked='true';
        break;
      case "2":
        document.getElementById('statusmentalErmIrja2').checked='true';
        break;
      case "3":
        document.getElementById('statusmentalErmIrja3').checked='true';
        break;
      case "4":
        document.getElementById('statusmentalErmIrja4').checked='true';
        break;
      case "5":
        document.getElementById('statusmentalErmIrja5').checked='true';
        break;

      }

    //
      switch (a[i]['status_psikologi']){
      case "1":
        document.getElementById('statusPsikologis1').checked='true';
        break;
      case "2":
        document.getElementById('statusPsikologis2').checked='true';
        break;
      case "3":
        document.getElementById('statusPsikologis3').checked='true';
        break;
      case "4":
        document.getElementById('statusPsikologis4').checked='true';
        break;
      case "5":
        document.getElementById('statusPsikologis5').checked='true';
        break;
      case "6":
        document.getElementById('statusPsikologis6').checked='true';
        break;
      case "7":
        document.getElementById('statusPsikologis7').checked='true';
        break;
      case "8":
        document.getElementById('statusPsikologis8').checked='true';
        break;
      case "9":
        document.getElementById('statusPsikologis9').checked='true';
        break;
      case "10":
        document.getElementById('statusPsikologis10').checked='true';
        break;
      }

      switch (a[i]['pengguna_restrain']){
      case "1":
        document.getElementById('penggunaanRestrainErmIrja1').checked='true';
        break;
      case "2":
        document.getElementById('penggunaanRestrainErmIrja2').checked='true';
        break;
      }

      document.getElementById('BudayaErmIrja').value        =a[i]['budaya'];
      document.getElementById('KeadaanUmumAssMedIrja').value=a[i]['keadaan_umum'];
      document.getElementById('respirasiAssMedIrja').value=a[i]['respirasi'];
      document.getElementById('nadiAssMedIrja').value=a[i]['nadi'];
      document.getElementById('Spo2AssMedIrja').value=a[i]['spo2'];
      document.getElementById('pupilkiriAssMedIrja').value=a[i]['pupil_kiri'];
      document.getElementById('pupilkananAssMedIrja').value=a[i]['pupil_kanan'];;
      document.getElementById('tekananDarahErmIrja1').value=a[i]['tekanan_darah1']; 
      document.getElementById('tekananDarahErmIrja2').value=a[i]['tekanan_darah2'];; 
      document.getElementById('palpasiErmIrja').value=a[i]['palpasi'];
      document.getElementById('suhuErmIrja').value=a[i]['suhu'];
      document.getElementById('reflekCahayaKiriErmIrja').value= a[i]['reflek_cahaya_kiri'];;
      document.getElementById('reflekCahayaKananErmIrja').value= a[i]['reflek_cahaya_kanan'];
      document.getElementById('bbErmIrja').value=a[i]['bb'];
      document.getElementById('tinggiErmIrja').value=a[i]['tinggi_badan'];
      document.getElementById('imtErmIrja').value=a[i]['imt'];
      document.getElementById('dacrjasesmenmedis_bgcstot').value=a[i]['skor_kesadaran'];
      document.getElementById('AssesmenErmIrja').value=a[i]['assesmen_medis'];
      document.getElementById('tindakanErmIrja').value=a[i]['tindakan_medis'];
      document.getElementById('planningErmIrja').value=a[i]['planning_medis'];
      document.getElementById('fisikStatusLocalisErmIrja').value=a[i]['status_lokalis'];

      switch (a[i]['pasien_kompleks']){
      case "1":
        document.getElementById('pasienKompleksErmIrja1').checked='true';
        break;
      case "2":
        document.getElementById('pasienKompleksErmIrja2').checked='true';
        break;
      }

      document.getElementById('fisikKepalaErmIrjaKet').value=a[i]['kepala_ket'];
      switch (a[i]['kepala']){
      case "1":
        document.getElementById('fisikKepalaErmIrja1').checked='true';
        break;
      case "2":
        document.getElementById('fisikKepalaErmIrja2').checked='true';
        break;
      }

      document.getElementById('fisikJantungErmIrjaKet').value=a[i]['jantung_ket'];
      switch (a[i]['jantung']){
      case "1":
        document.getElementById('fisikJantungErmIrja1').checked='true';
        break;
      case "2":
        document.getElementById('fisikJantungErmIrja2').checked='true';
        break; 
      }

      switch (a[i]['mata']){
      case "1":
        document.getElementById('fisikMataErmIrja1').checked='true';
        break;
      case "2":
        document.getElementById('fisikMataErmIrja2').checked='true';
        break; 
      }
      document.getElementById('fisikMataErmIrjaKet').value=a[i]['mata_ket'];

      document.getElementById('fisikParuErmIrjaKet').value=a[i]['paru_ket'];
      switch (a[i]['paru']){
      case "1":
        document.getElementById('fisikParuErmIrja1').checked='true';
        break;
      case "2":
        document.getElementById('fisikParuErmIrja2').checked='true';
        break; 
      }

      document.getElementById('fisikThtErmIrjaKet').value=a[i]['tht_ket'];
      switch (a[i]['tht']){
      case "1":
        document.getElementById('fisikThtErmIrja1').checked='true';
        break;
      case "2":
        document.getElementById('fisikThtErmIrja2').checked='true';
        break; 
      }

      document.getElementById('fisikAbdomenErmIrjaKet').value=a[i]['abdomen_ket']; 
      switch (a[i]['abdomen']){
      case "1":
        document.getElementById('fisikAbdomenErmIrja1').checked='true';
        break;
      case "2":
        document.getElementById('fisikAbdomenErmIrja2').checked='true';
        break; 
      }   

      document.getElementById('fisikLeherErmIrjaKet').value=a[i]['leher_ket'];
      switch (a[i]['leher']){
      case "1":
        document.getElementById('fisikLeherErmIrja1').checked='true';
        break;
      case "2":
        document.getElementById('fisikLeherErmIrja2').checked='true';
        break; 
      }

      document.getElementById('fisikGenitaliaErmIrjaKet').value=a[i]['genitalia_ket'];
      switch (a[i]['genitalia']){
      case "1":
        document.getElementById('fisikGenitaliaErmIrja1').checked='true';
        break;
      case "2":
        document.getElementById('fisikGenitaliaErmIrja2').checked='true';
        break; 
      }

      document.getElementById('fisikMulutErmIrjaKet').value=a[i]['mulut_ket'];
      switch (a[i]['mulut']){
      case "1":
        document.getElementById('fisikMulutErmIrja1').checked='true';
        break;
      case "2":
        document.getElementById('fisikMulutErmIrja2').checked='true';
        break; 
      }

      document.getElementById('fisikThoraxErmIrjaKet').value=a[i]['thoraks_ket'];
      switch (a[i]['thoraks']){
      case "1":
        document.getElementById('fisikThoraxErmIrja1').checked='true';
        break;
      case "2":
        document.getElementById('fisikThoraxErmIrja2').checked='true';
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

function assesmendokterhistori(idkunjunganhistori){

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
  assmedhis += '<input type="text" class="form-control" id="tekanandarahrmIrjahis" value="'+a[i]['tekanan_darah1']+' " placeholder=" / " readonly>';
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
assmedhis += '<div><button class="btn-primary" onclick="assesmendokterhistoriupdate('+idkunjunganhistori+');">Update</button></div>';
assmedhis += '</div>';
assmedhis += '</div>';
}


document.getElementById("idpanelhistorirm"+idkunjunganhistori+"").innerHTML = assmedhis;
})
}

function assesmenperawathistori(idkunjunganhistori,idunit){
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
if (idunit=='3002') {
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
}





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
asskephis += '</div>';
asskephis += '</div>';
}  
document.getElementById("idpanelhistorirmperawat"+idkunjunganhistori+"").innerHTML = asskephis;
})}


function penunjangmedishistori(idkunjunganhistori){
  var histpenunjangrm = '';
  histpenunjangrm += '<div class="row">';
  histpenunjangrm += '<div class="col-md-12">';
  //  histpenunjangrm += '<div class="info-box mb-0">'; 
  histpenunjangrm += '<button type="button" class="btn btn-outline-secondary btn-xs" onclick="labpkhistorirm_(event)"> <i class="fas fa-book-medical"></i> Lab. PK</button>';
  histpenunjangrm += ' | <button type="button" class="btn btn-outline-secondary btn-xs" onclick="labpahistorirm_(event)"> <i class="fas fa-book-medical"></i> Lab. PA</button>';
  histpenunjangrm += ' | <button type="button" class="btn btn-outline-secondary btn-xs" onclick="radhistorirm_(event)"> <i class="fas fa-book-medical"></i> Radilologi</button>';
  histpenunjangrm += ' | <button type="button" class="btn btn-outline-secondary btn-xs" onclick="penunjanglainhistorirm_(event)"> <i class="fas fa-book-medical"></i> Penunjang Lain</button>';
  histpenunjangrm += '</div>';
  histpenunjangrm += '<div class="col-md-12" id="listpenunjangrm">'; 
  histpenunjangrm += 'Silahkan Pilih Tombol Diatas';
  histpenunjangrm += '</div>';
  histpenunjangrm += '</div>';

  document.getElementById('idpanelhistorirm').innerHTML = histpenunjangrm;
}

function labpkhistorirm_(idkunjunganhistori){
  var histedukasirm = '';
  histedukasirm += 'Lab Pk';
  document.getElementById('listpenunjangrm').innerHTML = histedukasirm;
}

function labpahistorirm_(idkunjunganhistori){
  var histedukasirm = '';
  histedukasirm += 'Lab PA';
  document.getElementById('listpenunjangrm').innerHTML = histedukasirm;
}

function radhistorirm_(idkunjunganhistori){
  var histedukasirm = '';
  histedukasirm += 'Radiologi';
  document.getElementById('listpenunjangrm').innerHTML = histedukasirm;
}

function penunjanglainhistorirm_(idkunjunganhistori){
  var histedukasirm = '';
  histedukasirm += 'Penunjang Lain';
  document.getElementById('listpenunjangrm').innerHTML = histedukasirm;
}


function edukasimedishistori(idkunjunganhistori){
  var histedukasirm = '';
  histedukasirm += 'history edukasi';
  document.getElementById('idpanelhistorirm').innerHTML = histedukasirm;
}

//tampilhisrm();
function tampilhisrm(rm){
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
      barisrmhis += '<button type="button" class="btn bg-gradient-secondary btn-xs" onclick="assesmendokterhistori('+a[i]['id_kunjungan']+')"> <i class="fas fa-book-medical"></i> Assesmen Dokter</button>';
      barisrmhis += ' | <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="assesmenperawathistori(`'+a[i]['id_kunjungan']+'`,`'+a[i]['id_unit']+'`)"> <i class="fas fa-book-medical"></i> Assesmen Perawat</button>';
      barisrmhis += ' | <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="resumemedisirja(`'+a[i]['id_kunjungan']+'`,`'+a[i]['id_unit']+'`)"> <i class="fas fa-book-medical"></i> Resume </button>';
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
      barisrmhis += '<div class="col-md-12" style="padding-top: 10px;">';
      barisrmhis += '<div class="col-md-12" id="detailsoapimedermirja'+a[i]['id_kunjungan']+'">'; 
      barisrmhis += '</div>';

      barisrmhis += '<h4>Eresep </h4>';
      barisrmhis += '<div class="col-md-12" id="eresephistori'+a[i]['id_kunjungan']+'">'; 
      barisrmhis += '</div>';
      barisrmhis += '<h4>Obat diterima</h4>';
      barisrmhis += '<div class="col-md-12" id="detailobatditerimairja'+a[i]['id_kunjungan']+'">'; 
      barisrmhis += '</div>';
      barisrmhis += '<h4>Penyakit &nbsp;<i class="fas fa-plus" onclick="addmrpenyakitmedermirja(`'+a[i]['id_kunjungan']+'`,`'+a[i]['id_unit']+'`)"></i></h4>';
      barisrmhis += '<div class="col-md-12" id="detailmrpenyakitmedirja'+a[i]['id_kunjungan']+'">'; 
      barisrmhis += '</div>';
      barisrmhis += '<h4>Tindakan (ICD-9) &nbsp;<i class="fas fa-plus" onclick="addicd9medermirja(`'+a[i]['id_kunjungan']+'`,`'+a[i]['id_unit']+'`)"></i></h4>';
      barisrmhis += '<div class="col-md-12" id="detailicd9medirja'+a[i]['id_kunjungan']+'">'; 
      barisrmhis += '</div>';
      barisrmhis += '</div>';
      barisrmhis += '</div>';
      barisrmhis += '</div>';
      barisrmhis += '</div>';
      barisrmhis += '</div>';
      detailsoapi(a[i]['id_kunjungan']);
      eresep(a[i]['id_kunjungan'],a[i].tgl_masuk,a[i].tgl_masuk);
      obatditerima(a[i]['id_kunjungan']);
      detailmrpenyakitmedermirja(a[i]['id_kunjungan']);
      detailicd9medermirja(a[i]['id_kunjungan']);
      
    }
    document.getElementById('listhistorirmkunjungan').innerHTML = barisrmhis;
  })



}
//tampil radiologi
function tampilpenunjangradiologiirja(){

  var barisrmhis = ''; 
  var param = {
    norm: document.getElementById('rmErmIrja').value,
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
      document.getElementById('listhistoripenunjangradirja').innerHTML = barisrmhis;
    }
  })
}
//tampil penunjang
function tampilpenunjangirja(rm){

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
        detaillabermirja(a[i]['id_kunjungan_lab']);  
      }
      document.getElementById('listhistoripenunjangirja').innerHTML = barisrmhis;
    }
  })
}
/*icd 9*/
$(document).on('keyup', '#textTambahicd9resumemedErmirja', function(e) {
  if($(this).val() !== '')
  {
   var charCode = e.which || e.keyCode;
   if(charCode == 40)
   {
    icdtambahresumemedermirja();
  } 
  else if(charCode == 38)
  {
    icdtambahresumemedermirja();
  }
  else    (charCode == 13)
  {
    icdtambahresumemedermirja();
  }
}else{
  document.getElementById("DivTambahcdi9resumemedErmirja").innerHTML="";
}
})

/*icd 9*/
function icdtambahresumemedermirja() {
  var param ={id:document.getElementById("textTambahicd9resumemedErmirja").value,};
  apiPOST('Kunjungan/icd9', param,hasil=>{
    var a=hasil['icd'];
    var unit='';
    for (var i = 0; i < a.length; i++) {
      unit+='<button class="btn btn-primary"  onclick="pilihicd9tambahresumemedermirja(`'+a[i]['kd_icd9']+'|'+a[i]['deskripsi']+'`)">'+a[i]['deskripsi']+'</button><br>';
    }
    document.getElementById('DivTambahicd9resumemedErmirja').innerHTML=unit;
  });
}
/*icd 9*/
function pilihicd9tambahresumemedermirja(kode) {
  var res = kode.split('|');
  var icd = res[0];
  var kunjungan=document.getElementById('kunjunganaddicd9irja').value;
  document.getElementById("DivTambahdiagnosaresumemedErmirja").innerHTML="";
  var param={
    rm     :document.getElementById('rmErmIrja').value,
    unit   :document.getElementById('unitaddicd9irja').value,
    id_kunjungan :kunjungan,
    kode   :icd,
    stat   :2,
  };
  apiPOST('Rekammedisirja/addmricd9irja',param,hasil=>{
    $('#ModalShowaddicd9medermirja').modal('hide');
    detailicd9medermirja(kunjungan);
  });

}
/*icd 10*/
function penyakittambahresumemedermigd() {
  var param ={id:document.getElementById("textTambahdiagnosaresumemedErmirja").value,};
  apiPOST('Kunjungan/icd', param,hasil=>{
    var a=hasil['icd'];
    var unit='';
    for (var i = 0; i < a.length; i++) {
      unit+='<button class="btn btn-primary"  onclick="pilihPenyakittambahresumemedermirja(`'+a[i]['id_penyakit']+'|'+a[i]['penyakit']+'`)">'+a[i]['penyakit']+'</button><br>';
    }
    document.getElementById('DivTambahdiagnosaresumemedErmirja').innerHTML=unit;
  });
}
function addicd9medermirja(kunjungan,unit) {
 $('#ModalShowaddicd9medermirja').modal('show');
 document.getElementById('kunjunganaddicd9irja').value=kunjungan;
 document.getElementById('unitaddicd9irja').value=unit;
}
function addmrpenyakitmedermirja(id,unit) {
 $('#ModalShowaddmrpenyakitmedermirja').modal('show');
 document.getElementById('idkunjunganaddicd10').value=id;
 document.getElementById('idunitaddicd10').value=unit;
}
$(document).on('keyup', '#textTambahdiagnosaresumemedErmirja', function(e) {
  if($(this).val() !== '')
  {
   var charCode = e.which || e.keyCode;
   if(charCode == 40)
   {
    //alert('coba');
    penyakittambahresumemedermirja();
  } 
  else if(charCode == 38)
  {
    //alert('coba');
    penyakittambahresumemedermirja();
  }
  else    (charCode == 13)
  {
    //alert('coba');
    penyakittambahresumemedermirja();
  }
}else{
  document.getElementById("DivTambahdiagnosaresumemedErmirja").innerHTML="";
}
})

function penyakittambahresumemedermirja() {
  var param ={id:document.getElementById("textTambahdiagnosaresumemedErmirja").value,};
  apiPOST('Kunjungan/icd', param,hasil=>{
    var a=hasil['icd'];
    var unit='';
    for (var i = 0; i < a.length; i++) {
      unit+='<button class="btn btn-primary"  onclick="pilihicd10(`'+a[i]['id_penyakit']+'|'+a[i]['penyakit']+'`)">'+a[i]['penyakit']+'</button><br>';
    }
    document.getElementById('DivTambahdiagnosaresumemedErmirja').innerHTML=unit;
  });
}
function detailmrpenyakitmedermirja(kunjungan){
  var param = {
    kunjungan: kunjungan
  };
  var baris = ''; 
  apiPOST('Rekammedisirja/datamrpenyakitirja', param, hasil => {

    if (hasil['code']=="200") {            
      var x = hasil['data'];
      for (var u = 0; u < x.length; u++) {
        baris += '<div>'+x[u]['id_penyakit']+'|'+x[u]['penyakit']+'('+x[u]['status']+')&nbsp;<i class="fas fa-times-circle" onclick="deletepenyakitmedermirja(`'+x[u]['id_penyakit']+'|'+kunjungan+'`)"></i></div>';
      }
      document.getElementById('detailmrpenyakitmedirja'+kunjungan).innerHTML = baris;
    }else{
     document.getElementById('detailmrpenyakitmedirja'+kunjungan).innerHTML = "";
   }
 })
}
function deletepenyakitmedermirja(kode) {
  var ambil = kode;
  var res   = ambil.split('|');
  var icd      = res[0];
  var kunjungan= res[1];
  var param={
    kode:icd,
    id_kunjungan :kunjungan,
  };
  apiPOST('Rekammedisirja/deletemrpenyakitirja', param, hasil => {
    detailmrpenyakitmedermirja(kunjungan);
  });
  
}
function deletetindakanmedermirja(kode,kunjungan) {
  var param={
    kode:kode,
    id_kunjungan :kunjungan,
  };
  apiPOST('Rekammedisirja/deletemrtindakanirja', param, hasil => {
     // detailmrpenyakitmedermirja(kunjungan);
   detailicd9medermirja(kunjungan);
 });
  
}
function pilihicd10(kode) {
  document.getElementById('textTambahdiagnosaresumemedErmirja').value=kode;
  document.getElementById("DivTambahdiagnosaresumemedErmirja").innerHTML="";
}
function pilihPenyakittambahresumemedermirja() {
  var kode =document.getElementById('textTambahdiagnosaresumemedErmirja').value;
  var res = kode.split('|');
  var icd = res[0];
  var kunjungan=document.getElementById('idkunjunganaddicd10').value;
  var param={
    rm     :document.getElementById('rmErmIrja').value,
    unit   :document.getElementById('idunitaddicd10').value,
    id_kunjungan :kunjungan,
    kode   :icd,
    stat   :document.getElementById('statusdiagnosa').value,
    id_transaksi : document.getElementById('idtransaksiermirja').value,
  };
  apiPOST('Rekammedisirja/addmrpenyakitirja',param,hasil=>{
    $('#ModalShowaddmrpenyakitmedermirja').modal('hide');
    detailmrpenyakitmedermirja(kunjungan);
  });

}
function eresep(id_kunj,tgl_kunj,tglorder) {
  var param={id_kunj:id_kunj,
  tgl_kunj:tgl_kunj,
  tglorder:tglorder,};
  apiPOST('Apotek/getData_historiOrderEresep',param,hasil=>{
    var barisrmhis='';
    var a = hasil['data'];
    for (var i = 0; i < a.length; i++) {
     barisrmhis += '<div>'+a[i].nama_obat+''+a[i].jumlah+''+a[i].kd_satuan+'</div>';

   }
   document.getElementById('eresephistori'+id_kunj).innerHTML=barisrmhis;
 })
}
function obatditerima(id_kunj) {
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
function detaillabermirja(id_kunj) {
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

function detailicd9medermirja(kunjungan){
  var param = {
    kunjungan: kunjungan
  };
  var baris = ''; 
  apiPOST('Rekammedisirja/datamricd9irja', param, hasil => {
    if (hasil['code']=="200") {            
      var x = hasil['data'];
      for (var u = 0; u < x.length; u++) {
        baris += '<div>'+x[u]['kd_icd9']+'|'+x[u]['deskripsi']+'('+x[u]['status']+')&nbsp;<i class="fas fa-times-circle" onclick="deletetindakanmedermirja(`'+x[u]['kd_icd9']+'`,`'+kunjungan+'`)"></i></div>';
      }
      document.getElementById('detailicd9medirja'+kunjungan).innerHTML = baris;
    }else{
      document.getElementById('detailicd9medirja'+kunjungan).innerHTML = "";
    }
  })
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
function detailsoapi(idkunjungan){
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
        barisrmhisd += '<div class="card" ><h4>SOAP I</h4>';
        barisrmhisd += '<h4>'+x[u].nama_pegawai+', '+x[u].jam_input+'</h4>';
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
        barisrmhisd += '<button class="btn btn-primary" onclick="copysoapierm(`'+spo2+'`,`'+saturasi+'`,`'+nadi+'`,`'+tdarah+'`,`'+suhu+'`,`'+s+'`,`'+o+'`,`'+a+'`,`'+p+'`,`'+i+'`)">Copy SOAP I</button></div>';
        idkunjungan = x[u]['id_kunjungan'];
      }
      document.getElementById('detailsoapimedermirja'+idkunjungan+'').innerHTML = barisrmhisd;
    }
  })
}

function copysoapierm(spo2,saturasi,nadi,darah,suhu,s,o,a,p,i) {
  document.getElementById('linksoap').click();
  document.getElementById('subjekirja').value   =s;
  document.getElementById('assesmenirja').value =a;
  document.getElementById('objekirja').value    =o;
  document.getElementById('cpptSpo2ermirja').value=spo2;
  document.getElementById('cpptsaturasiermirja').value=saturasi;
  document.getElementById('cpptnadiermirja').value=nadi;
  document.getElementById('cpptsuhuermirja').value=suhu;
  document.getElementById('cppttekanandarahermirja').value=darah;
  document.getElementById('intervensiirja').value =p;
  document.getElementById('instruksiermirja').value =i;
}
var ttdresumeirjadokter = new WPaintX('paint_ttdresumeirjadokter');
var ttdAssesmendokterIrja  = new WPaintX('paint_TtdAssesmendokterIrja');

function showttdresumeirja(){
  ttdresumeirjadokter.show();
}

function showTtdAssesmendokterIrja(){
  ttdAssesmendokterIrja.show();
}

function ShowModalTtdAssesmendokterIrja() {
  showTtdAssesmendokterIrja();
  $('#ModalTtdAssesmendokterIrja').modal('show');
}
function takeTtdAssesmendokterIrja() {
  document.getElementById('ImgTtdAssesmendokterIrja').src=ttdAssesmendokterIrja.getData();
  document.getElementById('HasilTtdAssesmendokterIrja').value=ttdAssesmendokterIrja.getData();
  $('#ModalTtdAssesmendokterIrja').modal('hide');
}

function onCall_ViewLayananRehabmedik(){
  var param = {
    view      : 'viewRlayananrehabmedik',
    rm            : $('#rmErmIrja').val(),
    unit          : $('#idunitErmIrja').val(),
    id_kunjungan    : $('#idKunjunganErmIrja').val(),
    id_transaksi    : $('#idtransaksiermirja').val(),
  }
  var data = JSON.stringify(param);
  $('.viewRlayananrehabmedik').load('Rekammedisirja/viewLayananRehabmedik?data='+data);
}
function onCall_ViewBookingOk(){
  var param = {
    view      : 'viewBookingOk',
    rm            : $('#rmErmIrja').val(),
    unit          : $('#idunitErmIrja').val(),
    id_kunjungan  : $('#idKunjunganErmIrja').val(),
    id_transaksi  : $('#idtransaksiermirja').val(),
    namapasien    : $('#namaErmIrja').val().replace(/ /g, '%20'),
  }
  var data = JSON.stringify(param);
  $('.viewBookingOk').load('Rekammedisirja/viewbookingok?data='+data);
}

function icareRWJ(){
  var param = {
    no_rm: document.getElementById('rmErmIrja').value,
    user: user.id_pegawai
  };
  
  apiPOST('Bridging_UAT/Icare', param, hasil => {
    console.log(hasil);
    if (hasil['status']=="sukses") { 
      let timerInterval;
      Swal.fire({
        title: "Sukses",
        html: "Anda akan diarahkan ke halaman I-Care.",
        timer: 3000,
        timerProgressBar: true,
        didOpen: () => {
          Swal.showLoading();
          const timer = Swal.getPopup().querySelector("b");
          timerInterval = setInterval(() => {}, 100);
        },
        willClose: () => {
          clearInterval(timerInterval);
        }
      }).then((result) => {
        window.open(hasil['data']['url'], '_blank').focus();
      });
    }
  })
}



</script>