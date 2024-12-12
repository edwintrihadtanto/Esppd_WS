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
        </div>
      </div>
    </div>

    <div class="col-12 p-1">
      <div class="card">
        <div class="card-header p-0" id="Divermirja_listpasien">
          <div class="col-md-12 p-0" id="ermirja_listpasien2">
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
                <button type="button" class="btn bg-gradient-secondary btn-xs" type="submit" onclick="simpanResumeIrja()">Simpan Resume</button> 
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
                <input type="hidden" name="idTransaksiErmIrja" id="idTransaksiErmIrja">
                <input type="hidden" name="idunitErmIrja" id="idunitErmIrja">
              </div>
            </div>
          </div>
          <div class="card-body p-1" id="DivPendafDetailRWJ" style="display: none;">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item" id="liassesmendokterermirja">
                <a class="nav-link active" id="liassesmenmedisirja" data-toggle="pill" href="#erekammedisRWJ">Assesmen Dokter</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#ResumeErmMedisIrja">Resume</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="linksoap" data-toggle="pill" href="#rwjpendafkeluargakunjungan" >SOAP I</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#rwjpendafriwayatpenyakit">Histori Penunjang</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#rwjpendafhistoryrekammedis">Catatan Rekam Medis IRJA</a>
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
                      <div class="col-md-4 p2">
                        <label class="form-label">Riwayat Penyakit Dahulu</label>&nbsp;&nbsp;&nbsp;<label><span class="badge bg-primary rounded-pill" onclick="penyakitdahulu()" title="autocomplete">auto</span></label>
                      </div>
                      <div class="col-md-8 p2">
                        <textarea class="form-control" id="RiwayatPenyakitDuluErmIrja"></textarea>
                        <div id="DivRiwayatPenyakit" ></div>
                      </div>
                      <div class="col-md-4 p2">
                        <label class="form-label">Riwayat Penyakit Keluarga</label>
                      </div>
                      <div class="col-md-8 p2">
                        <textarea class="form-control" id="RiwayatPenyakitFam"></textarea>
                        <div id="DivPenyakitFam" ></div>
                      </div>
                      <div class="col-md-4 p2">
                        <label class="form-label">Riwayat Pengobatan/ Operasi</label>
                      </div>
                      <div class="col-md-8 p2">
                        <textarea class="form-control" id="RiwayatOpErmIrja"></textarea>
                      </div>  
                      <div class="col-md-4 p2">
                        <label class="form-label">Riwayat Alergi</label>
                      </div>
                      <div class="col-md-8 p2">
                        <textarea class="form-control" id="RiwayatAlergiErmIrja"></textarea>
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
                            <td><input type="radio" checked='true' name="TinggalBersamaErmIRja" value="1"> Suami/Istri </td>
                            <td><input type="radio" name="TinggalBersamaErmIRja" value="2"> Orang Tua </td>
                            <td><input type="radio" name="TinggalBersamaErmIRja" value="3"> Anak </td>
                            <td><input type="radio" name="TinggalBersamaErmIRja" value="4"> Lain-Lain </td>
                            <td><input type="radio" name="TinggalBersamaErmIRja" value="5"> Tinggal Sendiri </td>
                            <td> </td>
                          </tr>
                          <tr>
                            <th scope="row">Status Mental</th>
                            <td><input type="radio" checked='true' name="statusmentalErmIrja" value="1"> Orientasi Baik </td>
                            <td><input type="radio" name="statusmentalErmIrja" value="2"> Agitasi </td>
                            <td><input type="radio" name="statusmentalErmIrja" value="3"> Menyerang </td>
                            <td><input type="radio" name="statusmentalErmIrja" value="4"> Tidak Ada Respon </td>
                            <td><input type="radio" name="statusmentalErmIrja" value="5"> Lain-Lain </td>
                            <td></td>
                          </tr>
                          <tr>
                            <th scope="row">Status Psikologis</th>
                            <td>
                              <input type="radio" checked='true' name="statusPsikologis" value="1"> Kooperatif <br>
                              <input type="radio" name="statusPsikologis"> Gelisah 
                            </td>
                            <td>
                              <input type="radio" name="statusPsikologis" value="2"> Disorientasi<br>
                              <input type="radio" name="statusPsikologis" value="3"> Depresi 
                            </td>
                            <td>
                              <input type="radio" name="statusPsikologis" value="4"> Tenang<br>
                              <input type="radio" name="statusPsikologis" value="5"> Marah 
                            </td>
                            <td>
                              <input type="radio" name="statusPsikologis" value="6"> Hiperaktif<br>
                              <input type="radio" name="statusPsikologis" value="7"> Lain-Lain 
                            </td>
                            <td>
                              <input type="radio" name="statusPsikologis" value="8"> Cemas 
                            </td>
                            <td>
                              <input type="radio" name="statusPsikologis" value="9"> Kecenderungan Bunuh Diri 
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Penggunaan Restrain</th>
                            <td><input type="radio" checked='true' name="penggunaanRestrainErmIrja" value="1"> Tidak 
                            </td>
                            <td><input type="radio" name="penggunaanRestrainErmIrja" value="2"> Ya, Alasan </td>
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
                                <input type="number" class="form-control form-control-xs" id="tinggiErmIrja" >
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
                                  <span>x/Menit</span>
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
                                <input type="radio" name="fisikKepalaErmIrja" onclick="document.getElementById('fisikKepalaErmIrjaKet').style.display='block'" value="2">Tidak Normal<br>
                                <input type="text" class="form-control form-control-xs" name="fisikKepalaErmIrjaKet" id="fisikKepalaErmIrjaKet" style="display:none;">
                                <input type="radio" name="fisikKepalaErmIrja" onclick="document.getElementById('fisikKepalaErmIrjaKet').style.display='none'"  checked="true" value="1">Normal
                              </td>
                              <td>
                                Jantung
                              </td>
                              <td>
                                <input type="radio" name="fisikJantungErmIrja" onclick="document.getElementById('fisikJantungErmIrjaKet').style.display='block'" value="2">Tidak Normal<br>
                                <input type="text" class="form-control form-control-xs" name="fisikJantungErmIrjaKet" id="fisikJantungErmIrjaKet" style="display:none;">
                                <input type="radio" name="fisikJantungErmIrja" onclick="document.getElementById('fisikJantungErmIrjaKet').style.display='none'" checked='true' value="1">Normal
                              </td>
                            </tr>
                            <tr>
                              <td>
                                Mata
                              </td>
                              <td>
                                <input type="radio" name="fisikMataErmIrja" onclick="document.getElementById('fisikMataErmIrjaKet').style.display='block'" value="2">Tidak Normal<br>
                                <input type="text" class="form-control form-control-xs" name="fisikMataErmIrjaKet" id="fisikMataErmIrjaKet" style="display:none;">
                                <input type="radio" name="fisikMataErmIrja" onclick="document.getElementById('fisikMataErmIrjaKet').style.display='none'" value="1" checked='true'>Normal
                              </td>
                              <td>
                                Paru
                              </td>
                              <td>
                                <input type="radio" name="fisikParuErmIrja" onclick="document.getElementById('fisikParuErmIrjaKet').style.display='block'" value="2">Tidak Normal<br>
                                <input type="text" class="form-control form-control-xs" name="fisikParuErmIrjaKet" id="fisikParuErmIrjaKet" style="display:none;"> 
                                <input type="radio" name="fisikParuErmIrja" onclick="document.getElementById('fisikParuErmIrjaKet').style.display='none'" value="1" checked='true'>Normal
                              </td>
                            </tr>
                            <tr>
                              <td>
                                THT
                              </td>
                              <td>
                                <input type="radio" name="fisikThtErmIrja" onclick="document.getElementById('fisikThtErmIrjaKet').style.display='block'" value="2">Tidak Normal<br>
                                <input type="text" class="form-control form-control-xs" name="fisikThtErmIrjaKet" id="fisikThtErmIrjaKet" style="display:none;">
                                <input type="radio" name="fisikThtErmIrja" onclick="document.getElementById('fisikThtErmIrjaKet').style.display='none'" value="1" checked='true'>Normal
                              </td>
                              <td>
                                Ambomen
                              </td>
                              <td>
                                <input type="radio" name="fisikAbdomenErmIrja" onclick="document.getElementById('fisikAbdomenErmIrjaKet').style.display='block'" value="2">Tidak Normal<br>
                                <input type="text" class="form-control form-control-xs" name="fisikAbdomenErmIrjaKet" id="fisikAbdomenErmIrjaKet" style="display:none;">
                                <input type="radio" name="fisikAbdomenErmIrja" onclick="document.getElementById('fisikAbdomenErmIrjaKet').style.display='none'" value="1" checked='true'>Normal
                              </td>
                            </tr>
                            <tr>
                              <td>
                                Leher
                              </td>
                              <td>
                                <input type="radio" name="fisikLeherErmIrja" onclick="document.getElementById('fisikLeherErmIrjaKet').style.display='block'" value="2">Tidak Normal<br>
                                <input type="text" class="form-control form-control-xs" name="fisikLeherErmIrjaKet" id="fisikLeherErmIrjaKet" style="display:none;">
                                <input type="radio" name="fisikLeherErmIrja" onclick="document.getElementById('fisikLeherErmIrjaKet').style.display='none'" value="1" checked='true'>Normal
                              </td>
                              <td>
                                Genitalia
                              </td>
                              <td>
                                <input type="radio" name="fisikGenitaliaErmIrja" onclick="document.getElementById('fisikGenitaliaErmIrjaKet').style.display='block'" value="2" >Tidak Normal<br>
                                <input type="text" class="form-control form-control-xs" name="fisikGenitaliaErmIrjaKet" id="fisikGenitaliaErmIrjaKet" style="display:none;">
                                <input type="radio" name="fisikGenitaliaErmIrja" onclick="document.getElementById('fisikGenitaliaErmIrjaKet').style.display='none'" value="1" checked='true'>Normal
                              </td>
                            </tr>
                            <tr>
                              <td>
                                Mulut
                              </td>
                              <td>
                                <input type="radio" name="fisikMulutErmIrja" onclick="document.getElementById('fisikMulutErmIrjaKet').style.display='block'" value="2">Tidak Normal<br>
                                <input type="text" class="form-control form-control-xs" name="fisikMulutErmIrjaKet" id="fisikMulutErmIrjaKet" style="display:none;">
                                <input type="radio" name="fisikMulutErmIrja" onclick="document.getElementById('fisikMulutErmIrjaKet').style.display='none'" value="1" checked='true'>Normal
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
                                <input type="radio" name="fisikThoraxErmIrja" onclick="document.getElementById('fisikThoraxErmIrjaKet').style.display='block'" value="2">Tidak Normal<br>
                                <input type="text" class="form-control form-control-xs"  name="fisikThoraxErmIrjaKet" id="fisikThoraxErmIrjaKet" style="display:none;"><br>
                                <input type="radio" name="fisikThoraxErmIrja" onclick="document.getElementById('fisikThoraxErmIrjaKet').style.display='none'" value="1" checked='true'>Norma
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
								<div class="col-md-0">      </div>
								<div class="col-md-2">
							<div class="input-group">
							  <label class="col-form-label">2. LILA : </label>
							  <input type="number" onfocus="this.select();" class="form-control" id="dacrjasesmenmtmedis_olila">
							  <span class="input-group-append">
										<span class="input-group-text">Cm</span>
									  </span>
									</div>
								</div>
								<div class="col-md-0">      </div>
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
								<div class="col-md-0">      </div>
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
                    <textarea class="form-control" id="AssesmenErmIrja"></textarea>
                    </div>   
                    <div class="col-md-12" >                
                    Diagnosa Fungsi
                    <textarea class="form-control" id="dacrjrehabmedis_fdiagnosafungsi"></textarea>
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
                        <button onclick="showlocalis();" class="btn-primary btn-xs">Show</button>&nbsp;
                        <button onclick="tesGetData();"  class="btn-primary btn-xs">get data</button>&nbsp;
                        <button onclick="tesSetGigi();"  class="btn-primary btn-xs">Gigi</button>&nbsp;
                        <button onclick="tesSetHati();"  class="btn-primary btn-xs">Hati</button>&nbsp;
                        <button onclick="tesSetPolos();" class="btn-primary btn-xs">Polos</button>
                       </div> 
                       <div class="col-md-8">                         
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
                    <textarea class="form-control" id="planningErmIrja"></textarea>
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
                      Ya<input type="radio" class="form-group" name="pasienKompleksErmIrja" value="2">&nbsp;Tidak<input type="radio" class="form-group" name="pasienKompleksErmIrja" value="1" checked='true'></center>
                  </div>
                </div>
                <div class="card">
                  <div class="col-sm-4" style="text-align: center;">
                    <label>Dokter Penganggung Jawab Pasien</label><br>
                    <input type="date" name="" class="form-control"><br>
                    <input type="text" name="" class="form-control"><br>
                    <label>Nama & Tanda tangan</label> 
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
                        <select class="form-control form-control-xs" id="caramasukResumeErmMedisIrja">
                          <option value="1">SENDIRI</option>
                          <option value="2">BIDAN</option>
                          <option value="3">PUSKESMAS</option>
                          <option value="4">RS LAIN</option>
                          <option value="5">DOKTER</option>
                          <option value="6">PERAWAT</option>
                          <option value="7">POLISI</option>
                          <option value="8">FASILITAS LAIN</option>
                        </select>
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
                          <option value="1">dr. siti</option>
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
                              <input type="text" class="form-control form-control-xs" name="CaraKeluarResumeErmIrja" id="CaraKeluarResumeErmIrja">
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <label>Keadaan Umum</label>
                            </td>
                            <td>
                              <input type="text" class="form-control form-control-xs" name="keadaanUmumResumeErmIrja" id="keadaanUmumResumeErmIrja">
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
                        <button class="btn btn-primary btn-xs">Pengantar Rawat Inap</button>
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
                                 <div class="card card-default">
                  <div class="card-header" style="background-color:black;">
                    <h3 class="card-title" style="color:white;"> Kegiatan (RL)</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-4">
                          <div class="card card-default">
                            <div class="card-header">
                              <h4 class="card-title">Data Kegiatan yang dipilih</h4>
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
                                      Act
                                    </th>
                                    <th>
                                      Data Kegiatan yang dipilih
                                    </th>
                                  </thead>
                                  <tbody id="tbodylistlaboratorium">
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>

                      </div>
                      <div class="col-md-4">
                          <div class="card card-default">
                            <div class="card-header">
                              <h4 class="card-title">Data Kegiatan</h4>
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
                                      Act
                                    </th>
                                    <th>
                                      Data Kegiatan
                                    </th>
                                  </thead>
                                  <tbody id="tbodylistlaboratorium">
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
  
                      </div>
                      <div class="col-md-4">

                      </div>
                    </div>
                    <!-- /.row -->

                  </div>
                  <!-- /.card-body -->
                </div>
              </div>

              <div class="tab-pane p-1 fade" id="rwjpendafkeluargakunjungan" role="tabpanel">
                <div>
                  <button class="btn btn-primary" title="Input Resep" onclick="erekammedisRWJ_show_ermeresepRWJ();">Eresep</button>&nbsp;<button class="btn btn-primary" title="Input Order Laboratorium" onclick="show_modalPermintaanLabIrja()">Permintaan Laboratorium</button>&nbsp;<button class="btn btn-primary" title="Input Order Radiologi" onclick="show_modalPermintaancheckboxlogiIrja()">Permintaan Radiologi</button>
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
                          <h4>INSTRIKSI</h4>
                        </div>
                        <div class="col-sm-8">
                          <button type="button" class="btn bg-gradient-secondary btn-xs" type="button" onclick="document.getElementById('instruksiermirja').value='' "> <i class="fa fa-times"></i> Clear</button>
                          <textarea class="form-control" style="height:50px; width: 100%;" id="instruksiermirja"></textarea>
                        </div>
                      </div>
                    </td> 
                  </tr>
                </table>
              <button onclick="saveSoapIrja();" class="btn btn-primary sm" style="padding-top:10px;">Simpan SOAP I</button>
              </div>

              <div class="tab-pane p-1 fade" id="rwjpendafriwayatpenyakit" role="tabpanel">
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
      
                      <!-- akhir div id -->
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
        <label>Input tindakan</label>
        <select id="inputtindakanermirja" class="form-control form-control-xs" onclick="pilihtindakanermirja()">
        </select>
        <input type="text" name="idtindakanermirja" id="idtindakanermirja">
        <label>Jumlah Tindakan</label>
        <input type="text" name="qtytindakanermirja" id="qtytindakanermirja">
        <label>Keterangan</label>
        <input type="text" name="kettindakanermirja" id="kettindakanermirja">
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" onclick="inserttindakanbyermirja()">Input Tindakan</button><button class="btn btn-default" onclick="tampilmodalstatuskeluarermirja()">Tidak Ada tindakan</button>
      </div>
    </div>
  </div>  
</div>
<div class="modal fade" id="ModalInputStatusKeluarIrja" data-bs-backdrop="static">
 <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
<div class="modal fade"  id="ModalTambahIcdPenyakitSekarang" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header"></div>
      <div class="modal-body">
        <input type="text"  id="ModalinputPenyakitSekarangErmIrja" class="form-control">
        <div id="ModalDivPenyakitSekarangErmIrja"></div>
      </div>
      <div class="modal-footer">
        <button onclick="InputTextAreaPenyakitSekarang()">Simpan</button>
        <button >Close</button>
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
<div class="rekammedisIGD_eresepIGD_content"></div>
<div class="rekammedisIGD_eresepIGD_preview"></div>

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
/*  LabHematologi();
  Labimunologi();
  Labserulogi();
  Labtambahan();
  Labmikroba();
  LabLainLain();
  LabRujukan();
  LabENDOKRINOLOGI();*/
  RadUL();
  RadXR();
  RadCTScan();
  time();
  //aktifPaintMedis();
  tampilpekerjaanermirja();
  tampilagamaermirja();
  document.getElementById('dacrjasesmenmtmedis_div_operiksadalam').style.display='none';
  document.getElementById('dacrjasesmenmtmedis_div_oinspekulo').style.display='none';
  aktifPaint();
  });

  $('#searchPxERMrwj').show();
  $('#RWJERM_nm_pasiencari').hide();
  $("#rwj_pendf_buttonPasienBaru").hide();
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

function tesSetGigi(){
    localis.setGambar('gambar/gigi.jpg');return;
    var url = 'gambar/gigi.jpg';
    ttd.setGambarBG(url);
}

function tesSetHati(){
    localis.setGambar('gambar/hati.jpg');return;
    var url = 'gambar/hati.jpg';
    ttd.setGambarBG(url);
}

function tesSetPolos(){
    localis.show();return;
    ttd.setPolosBG();
}
  function aktifPaint(){
        localis = new Paint('localis');
        
        //ttd = new DrawingPaint('paint_assesmen', {'height': 200,'width':200});
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
  apiPOST("RekamMedisirja/pemeriksaanawalperawat",param,hasil => {
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
    norm    : document.getElementById('searchPxERMrwj').value,
  };
  apiPOST("RekamMedisirja/listpasienby", param, hasil => {   
    $('#ermirja_listpasien').html('');
    if (hasil['data'] !== null) {
      if (hasil['code'] == 'XX') {
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
          Baris += '</div>';
          Baris += '<div class="icon">';
          Baris += '<i class="fa fa-user"></i>';
          Baris += '</div>';
          Baris += '<a href="#" class="small-box-footer" style="background-color: #a8d4da; color: black;" onclick="tampilPasienErmIrja('+"'"+norm+"','"+unit+"','"+kunjungan+"','"+id_unit+"','"+nama+"','"+id_transaksi+"','"+id_penjamin+"','"+umur+"','"+alamat+"'"+')" style="cursor:pointer;">Klik Disini <i class="fas fa-arrow-circle-right"></i></a>';
          Baris += '</div>';
          Baris += '</div>';

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
              Baris += '<a href="#" class="small-box-footer" style="background-color: darkgreen;" onclick="tampilPasienErmIrja('+"'"+norm+"','"+unit+"','"+kunjungan+"','"+id_unit+"','"+nama+"','"+umur+"','"+alamat+"'"+')">Klik Detail <i class="fas fa-arrow-circle-right"></i></a>';
            Baris += '</div>';
          Baris += '</div>';   */       
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
    nmpasien: document.getElementById('RWJERM_nm_pasiencari').value
  };
  apiPOST("RekamMedisirja/listpasien", param, hasil => {   
    $('#ermirja_listpasien').html('');
    if (hasil['data'] !== null) {
      if (hasil['code'] == 'XX') {
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
          Baris += '</div>';
          Baris += '<div class="icon">';
          Baris += '<i class="fa fa-user"></i>';
          Baris += '</div>';
          Baris += '<a href="#" class="small-box-footer" style="background-color: #a8d4da; color: black;" onclick="tampilPasienErmIrja('+"'"+norm+"','"+unit+"','"+kunjungan+"','"+id_unit+"','"+nama+"','"+id_transaksi+"','"+id_penjamin+"','"+umur+"','"+alamat+"'"+')" style="cursor:pointer;">Klik Disini <i class="fas fa-arrow-circle-right"></i></a>';
          Baris += '</div>';
          Baris += '</div>';

 
          /*Baris += '<div class="col-lg-3 col-6">';
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
              Baris += '<a href="#" class="small-box-footer" style="background-color: darkgreen;" onclick="tampilPasienErmIrja('+"'"+norm+"','"+unit+"','"+kunjungan+"','"+id_unit+"','"+nama+"','"+umur+"','"+alamat+"'"+')">Klik Detail <i class="fas fa-arrow-circle-right"></i></a>';
            Baris += '</div>';
          Baris += '</div>';*/

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
        a+='<input name="lacrequestlabemrdiag_test" value="'+b[i].id_produk+'" type="checkbox"  id="lacrequestlabemrdiag_test_'+b[i].id_produk+'" >';
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
        a+='<input name="lacrequestlabemrdiag_test" value="'+b[i].id_produk+'" type="checkbox"  id="lacrequestlabemrdiag_test_'+b[i].id_produk+'" >';
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
        a+='<input name="lacrequestlabemrdiag_test" value="'+b[i].id_produk+'" type="checkbox"  id="lacrequestlabemrdiag_test_'+b[i].id_produk+'" >';
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
      a+='<td onclick="tampilPasienErmIrja(`'+b[i].no_rm+'`,`'+b[i].nama_unit+'`,`'+b[i].id_kunjungan+'`,`'+b[i].id_unit+'`,`'+b[i].nama+'`)">'+b[i].no_rm+'`</td>';
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
    rm : $("#rmErmIrja").val(),};
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
function ReviewAssesmenErmIrja(rm,unit){
  var a='';
  var param = 
  {
    rm : rm,unit :unit,
  };
      apiPOST('RekamMedisirja/ReviewAssesmenMedisIrja', param, hasil =>{
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
function ReviewAssesmenPerawatErmIrja(rm,unit){
  var a='';
  var param = 
  {
    rm : rm,unit :unit,
  };
      apiPOST('RekamMedisirja/ReviewAssesmenPerawatIrja', param, hasil =>{
    var b=hasil['data'];
    if (hasil['code']==200) {
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
    }

  });
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

function tampilPasienErmIrja(rm,unit,kunjungan,id_unit,nama,id_transaksi,id_penjamin,umur,alamat) {
document.getElementById('rmErmIrja').value=rm;
document.getElementById('namaErmIrja').value=nama;
document.getElementById('unitErmIrja').value=unit;
document.getElementById('idKunjunganErmIrja').value=kunjungan;
document.getElementById('idTransaksiErmIrja').value=id_transaksi;
document.getElementById('idunitErmIrja').value=id_unit;
tambahpasienrwj();
tampilpasien(rm);
OrderLabPk();
historipenyakitresumeirja();
ReviewAssesmenErmIrja(rm,id_unit);
ReviewAssesmenPerawatErmIrja(rm,id_unit);
viewkondisiawal(rm);
tampilhisrm(rm);
pemeriksaanawalperawat();
tampiltindakaninputermirja();
tgllahir = umur;
alamatpasien = alamat;
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
//tampilagamaermirja
function tampiltindakaninputermirja() {

  apiPOST('RekamMedisirja/tindakanirja',null,hasil=>{
    var a=hasil['data'];
    var nilai='';
    for (var i = 0; i < a.length; i++) {
      nilai+='<option value="'+a[i].id_produk+'" >'+a[i].nama_produk+'</option>'
    }
    document.getElementById('inputtindakanermirja').innerHTML=nilai;
  })
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
  apiPOST('RekamMedisirja/viewkondisiawal', param,hasil=>{
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
function pilihtindakanermirja() {
  document.getElementById('idtindakanermirja').value=document.getElementById('inputtindakanermirja').value;
}
function inserttindakanbyermirja() {
  var param ={id_kunj:document.getElementById('idKunjunganErmIrja').value,
          idprd:document.getElementById('idtindakanermirja').value,
          ket:document.getElementById('kettindakanermirja').value,
          qty:document.getElementById('qtytindakanermirja').value,};
  apiPOST('Rawatjalan/penatajasaRWJ_simpanProduk',param,hasil=>{

  });
          document.getElementById('idtindakanermirja').value='';
          document.getElementById('kettindakanermirja').value='';
          document.getElementById('qtytindakanermirja').value='';
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
    unit+='<button class="btn btn-primary"  onclick="pilihPenyakitsekarang(`'+a[i]['penyakit']+'`)">'+a[i]['penyakit']+'</button><br>';
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
    id_transaksi :document.getElementById('idTransaksiErmIrja').value,
    kode   :icd,
    stat   :1,
  };
  apiPOST('RekamMedisirja/addmrpenyakitirja',param,hasil=>{
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
    id_transaksi :document.getElementById('idTransaksiErmIrja').value,
    kode   :icd,
    stat   :2,
  };
  apiPOST('RekamMedisirja/addmrpenyakitirja',param,hasil=>{
  });

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
  let checkboxes = document.querySelectorAll('input[name="lacrequestlabemrdiag_test"]:checked');
            let values = [];
    checkboxes.forEach((checkbox) => {
            values.push(checkbox.value);
    });
    $('#ModalPermintaancheckboxlogiIrja').modal("hide");
    var dataarray=values;
    var param={
      id_kunjungan    :$('#idKunjunganErmIrja').val(),
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
function simpanResumeIrja(argument) {
  param={
    id_kunjungan:$('#idKunjunganErmIrja').val(),
    tgl_masuk:$('#TglMasukResumeErmMedisIrja').val(),
    tgl_keluar:$('#TglKeluarResumeErmMedisIrja').val(),
    dpjp:$('#dpjpResumeErmMedisIrja').val(),
    cara_masuk:$('#caramasukResumeErmMedisIrja').val(),
    berat_lahir:$('#BBResumeErmMedisIrja').val(),
    tgl:$('#tglResumeErmMedisIrja').val(),
    riwayat_kesehatan:$('#RiwayatKesResumeErmIrja').val(),
    pemeriksaan_fisik:$('#PemeriksaanFisikResumeErmIrja').val(),
    pemeriksaan_diagnostik:$('#DiagnostikResumeErmIrja').val(),
    terapi:$('#TerapiResumeErmIrja').val(),
    tindakan:$('#TindakanResumeErmIrja').val(),
    instruksi:$('#InstruksiResumeErmIrja').val(),
    diagnosis:$('#DiagnosisResumeErmIrja').val(),
    perkembangan_perawatan:$('#PerkembanganResumeErmIrja').val(),
    cara_keluar:$('#CaraKeluarResumeErmIrja').val(),
    keadaan_umum:$('#keadaanUmumResumeErmIrja').val(),
    kesadaran:$('#kesadaranResumeErmIrja').val(),
    mobilitasi_plg:$('#MblplgResumeErmIrja').val(),
    covid:document.getElementById('CovidResumeErmIrja').value,
    tensi:$('#tensiResumeErmIrja').val(),
    nadi:$('#nadiResumeErmIrja').val(),
    alat_bantu:document.getElementById('alatBntResumeErmIrja').value,
    kasus_baru:document.getElementById('KasusBrResumeErmIRja').value, 
    suhu:$('#SuhuResumeErmIrja').val(),
    respirasi:$('#RespirasiResumeErmIrja').val(),
    alat_medis_terpasang:$('#AlatMedisResumeErmIrja').val(),
    kegiatan:'0',
    instruksi_lanjutan:$('#selectInstruksiResumeErmIrja').val(),
  };
      apiPOST('RekamMedisirja/saveResumeErmIrja',param,hasil=>{
      if (hasil['pesan']=='Berhasil') {
      alert(hasil['pesan']);
      } else {
      alert(hasil['data']);
      }
    })
  
}
function simpanAssesmenMedisIrja() {
    var param={
      id_unit                     :$('#idunitErmIrja').val(),
      id_kunjungan                :$('#idKunjunganErmIrja').val(),
      keluhanutamaErmIrja         :$('#keluhanutamaErmIrja').val(),
      RiwayatPenyakitNowErmIrja   :$('#RiwayatPenyakitNowErmIrja').val(),
      RiwayatPenyakitDuluErmIrja  :$('#RiwayatPenyakitDuluErmIrja').val(),
      RiwayatPenyakitFam          :$('#RiwayatPenyakitFam').val(),
      RiwayatOpErmIrja            :$('#RiwayatOpErmIrja').val(),
      RiwayatAlergiErmIrja        :$('#RiwayatAlergiErmIrja').val(),
      TinggalBersamaErmIRja       :document.querySelector('input[name=TinggalBersamaErmIRja]:checked').value,
      statusmentalErmIrja         :document.querySelector('input[name=statusmentalErmIrja]:checked').value,
      statusPsikologis            :document.querySelector('input[name=statusPsikologis]:checked').value,
      penggunaanRestrainErmIrja   :document.querySelector('input[name=penggunaanRestrainErmIrja]:checked').value,
      BudayaErmIrja               :$('#BudayaErmIrja').val(), 
      KeadaanUmumAssMedIrja       :$('#KeadaanUmumAssMedIrja').val(),
      respirasiAssMedIrja         :$('#respirasiAssMedIrja').val(),
      nadiAssMedIrja              :$('#nadiAssMedIrja').val(),
      Spo2AssMedIrja              :$('#Spo2AssMedIrja').val(),
      pupilAssMedIrja             :$('#pupilkiriAssMedIrja').val()+'/'+$('#pupilkananAssMedIrja').val(),
      tekananDarahErmIrja         :$('#tekananDarahErmIrja1').val()+'/'+$('#tekananDarahErmIrja2').val(), 
      palpasiErmIrja              :$('#palpasiErmIrja').val(),
      suhuErmIrja                 :$('#suhuErmIrja').val(),
      reflekCahayaKiriErmIrja     :$('#reflekCahayaKiriErmIrja').val()+'/'+$('#reflekCahayaKananErmIrja').val(),
      bbErmIrja                   :$('#bbErmIrja').val(),
      tinggiErmIrja               :$('#tinggiErmIrja').val(),
      imtErmIrja                  :$('#imtErmIrja').val(),
      dacrjasesmenmedis_bgcstot   :$('#dacrjasesmenmedis_bgcstot').val(),
      AssesmenErmIrja             :$('#AssesmenErmIrja').val(),
      tindakanErmIrja             :$('#tindakanErmIrja').val(),
      planningErmIrja             :$('#planningErmIrja').val(),
      fisikStatusLocalisErmIrja   :$('#fisikStatusLocalisErmIrja').val(),
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
      EvaluasiErmIrja                 :$('#EvaluasiErmIrja').val()


    };
    apiPOST('RekamMedisirja/saveAssesmenDokterIrja',param,hasil=>{
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
function simpanHistoriAlergi() {
    var param={
      id_kunjungan  :$('#idKunjunganErmIrja').val(),
      id_jenis      :$('#selectJenisalergi').val(),
      keterangan    :$('#keteranganalergi').val()
    };
    apiPOST('RekamMedisirja/addhistorialergi',param,hasil=>{
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
  apiPOST('RekamMedisirja/addhistoripemberianobat',param,hasil=>{
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
  apiPOST('RekamMedisirja/addhistoripenyakitFam',param,hasil=>{
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
  apiPOST('RekamMedisirja/addhistoripenyakitold',param,hasil=>{
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
        apiPOST('RekamMedisirja/statuspulangirja', param, hasil => {
     if (hasil['pesan']=='Berhasil') {
      $('#ModalInputStatusKeluarIrja').modal('hide');
      alert('Berhasil');
     }else{
      alert(hasil['pesan']); 
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
    id_pegawai    : user.id_user,
    rm            : $('#rmErmIrja').val(),
    unit          : $('#idunitErmIrja').val(),
    id_kunjungan  : $('#idKunjunganErmIrja').val(),
    saturasi      : $('#cpptsaturasiermirja').val(),
    nadi          : $('#cpptnadiermirja').val(),
    suhu          : $('#cpptsuhuermirja').val(),
    tekanandarah  : $('#cppttekanandarahermirja').val(),
    Spo2          : $('#cpptSpo2ermirja').val(), 
  };
  apiPOST('RekamMedisirja/addeErmIrja', param, hasil => {
     if (hasil['pesan']=='Berhasil') {
      //alert(hasil['pesan']); 
      //tampilstatuskeluarassesmenmesiirja();
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
    'eresepRWJOrdEresep': 'ERM_IGD',
    'rekammedis'        : 'rekammedisIGD_eresepIGD_content',
    'rekammedis_prev'   : 'rekammedisIGD_eresepIGD_preview'
  };

  var ERMmyJSON = JSON.stringify(ermjson_data);

  $('.rekammedisIGD_eresepIGD_content').load('Apotek/erm_eresepGabung?data='+ERMmyJSON); // KE TAMPILAN ERESEP ERM
}
/*end fungsi memanggil eresep*/


function assesmendokterhistori(idkunjunganhistori){
  var assmedhis = '';
        var param = {
          id: idkunjunganhistori,
        };
        apiPOST('RekamMedisirja/datakunjunganrmmedisdetail', param, hasil => {
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
   assmedhis += '<div class="col-md-4 p2">';
   assmedhis += '<label class="form-label">Riwayat Penyakit Sekarang *</label>&nbsp;&nbsp;&nbsp;<label>';
   assmedhis += '</div>';
   assmedhis += '<div class="col-md-8 p2">';
   assmedhis += '<textarea class="form-control " id="RiwayatPenyakitNowErmIrjahis" readonly>'+a[i]['penyakit_sekarang']+'</textarea>';
   assmedhis += '</div>'; 
   assmedhis += '<div class="col-md-4 p2">';
   assmedhis += '<label class="form-label">Riwayat Penyakit Dahulu</label>&nbsp;&nbsp;&nbsp;';
   assmedhis += '</div>';
   assmedhis += '<div class="col-md-8 p2">';
   assmedhis += '<textarea class="form-control" id="RiwayatPenyakitDuluErmIrja" readonly>'+a[i]['riwayat_penyakit_dulu']+'</textarea>';
   assmedhis += '<div id="DivRiwayatPenyakit" ></div>';
   assmedhis += '</div>';
   assmedhis += '<div class="col-md-4 p2">';
   assmedhis += '<label class="form-label">Riwayat Penyakit Keluarga</label>';
   assmedhis += '</div>';
   assmedhis += '<div class="col-md-8 p2">';
   assmedhis += '<textarea class="form-control" id="RiwayatPenyakitFamhis" readonly>'+a[i]['riwayat_penyakit_kel']+'</textarea>';
   assmedhis += '<div id="DivPenyakitFam" ></div>';
   assmedhis += '</div>';
   assmedhis += '<div class="col-md-4 p2">';
   assmedhis += '<label class="form-label">Riwayat Pengobatan/ Operasi</label>';
   assmedhis += '</div>';
   assmedhis += '<div class="col-md-8 p2">';
   assmedhis += '<textarea class="form-control" id="RiwayatOpErmIrjahis" readonly>'+a[i]['riwayat_obat_tindakan']+'</textarea>';
   assmedhis += '</div>';  
   assmedhis += '<div class="col-md-4 p2">';
   assmedhis += '<label class="form-label">Riwayat Alergi</label>';
   assmedhis += '</div>';
   assmedhis += '<div class="col-md-8 p2">';
   assmedhis += '<textarea class="form-control" id="RiwayatAlergiErmIrjahis" readonly>'+a[i]['alergi']+'</textarea>';
   assmedhis += '</div>';

   assmedhis += '<div class="col-md-12 p4">';
   assmedhis += '<hr>';
   assmedhis += '</div>';

   assmedhis += '<div class="col-md-12 p2">';
   assmedhis += '<label class="form-label"><u>BIOPSIKOSOSIAL, KULTURAL, SPIRITUAL</u></label>';
   assmedhis += '</div>';
   assmedhis += '<div class="col-md-4 p2">';
   assmedhis += '<label class="form-label">Agama</label>';
   assmedhis += '</div>';
   assmedhis += '<div class="col-md-8 p2">';
   assmedhis += '<textarea class="form-control" id="AgamaErmIrjahis" readonly></textarea>';
   assmedhis += '</div>';
   assmedhis += '<div class="col-md-4 p2">';
   assmedhis += '<label class="form-label">Pekerjaan</label>';
   assmedhis += '</div>';
   assmedhis += '<div class="col-md-8 p2">';
   assmedhis += '<textarea class="form-control" id="pekerjaanErmIrjahis" readonly></textarea>';
   assmedhis += '</div>';
   assmedhis += '<div class="col-md-4 p2">';
   assmedhis += '<label class="form-label">Tinggal</label>';
   assmedhis += '</div>';
   assmedhis += '<div class="col-md-8 p2">';
   assmedhis += '<textarea class="form-control" id="tinggalErmIrjahis" readonly></textarea>';
   assmedhis += '</div>';
   assmedhis += '<div class="col-md-4 p2">';
   assmedhis += '<label class="form-label">Status Mental</label>';
   assmedhis += '</div>';
   assmedhis += '<div class="col-md-8 p2">';
   assmedhis += '<textarea class="form-control" id="statusmentalErmIrjahis" readonly>'+a[i]['status_mental']+'</textarea>';
   assmedhis += '</div>';
   assmedhis += '<div class="col-md-4 p2">';
   assmedhis += '<label class="form-label">Status Psikolog</label>';
   assmedhis += '</div>';
   assmedhis += '<div class="col-md-8 p2">';
   assmedhis += '<textarea class="form-control" id="statuspsikoErmIrjahis" readonly>'+a[i]['status_psikologi']+'</textarea>';
   assmedhis += '</div>';
   assmedhis += '<div class="col-md-4 p2">';
   assmedhis += '<label class="form-label">Penggunaan restrain</label>';
   assmedhis += '</div>';
   assmedhis += '<div class="col-md-8 p2">';
   assmedhis += '<textarea class="form-control" id="restrainErmIrjahis" readonly>'+a[i]['pengguna_restrain']+'</textarea>';
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
   assmedhis += '<label class="form-label">Pupil &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>';
   assmedhis += '</div>';
   assmedhis += '<div class="col-md-6 p2">';
   assmedhis += '<input type="text" class="form-control" id="pupilkirirmIrjahis" value="'+a[i]['pupil']+'" readonly>';
   assmedhis += '</div>';
   assmedhis += '<div class="input-group-prepend col-md-4"><span>mm</span></div>';
  
   assmedhis += '<div class="col-md-2 p2">';
   assmedhis += '<label class="form-label">Tekanan Darah</label>';
   assmedhis += '</div>';
   assmedhis += '<div class="col-md-2">';
   assmedhis += '<input type="text" class="form-control" id="tekanandarahrmIrjahis" value="'+a[i]['tekanan_darah']+'" placeholder=" / " readonly>';
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
   assmedhis += '<label class="form-label">Reflek Cahaya</label>';
   assmedhis += '</div>';
   assmedhis += '<div class="col-md-2 p2">';
   assmedhis += '<input type="text" class="form-control" id="reflekcahayakirirmIrjahis" value="'+a[i]['reflek_cahaya']+'" readonly>';
   assmedhis += '</div>';
   assmedhis += '<div class="input-group-prepend col-md-2 p2"><span></span></div>';


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
  assmedhis +=  '<td>4</td>';
  assmedhis +=  '</tr>';
  assmedhis +=  '<tr>';
  assmedhis +=  '<td> Respon Motorik Terbaik (M) </td>';
  assmedhis += '<td> Turut Perintah </td>';
  assmedhis +=  '<td>4</td>';
  assmedhis +=  '</tr>';
  assmedhis +=  '<tr>';
  assmedhis +=  '<td>  Respon Verbal (V) </td>';
  assmedhis += '<td>  Berorientasi Baik  </td>';
  assmedhis +=  '<td>4</td>';
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
   assmedhis += '<input type="text" class="form-control" id="kepalaErmIrjahis" value="'+a[i]['kepala']+'" readonly>';
   assmedhis += '</div>';
   assmedhis += '<div class="col-md-2 p2">';
   assmedhis += '<label class="form-label">Mata</label>';
   assmedhis += '</div>';
   assmedhis += '<div class="col-md-4 p2">';
   assmedhis += '<input type="text" class="form-control" id="matarmIrjahis" value="'+a[i]['mata']+'" readonly>';
   assmedhis += '</div>';


   assmedhis += '<div class="col-md-2 p2">';
   assmedhis += '<label class="form-label">Tht</label>';
   assmedhis += '</div>';
   assmedhis += '<div class="col-md-4 p2">';
   assmedhis += '<input type="text" class="form-control" id="thtErmIrjahis" value="'+a[i]['tht']+'" readonly>';
   assmedhis += '</div>';
   assmedhis += '<div class="col-md-2 p2">';
   assmedhis += '<label class="form-label">Leher</label>';
   assmedhis += '</div>';
   assmedhis += '<div class="col-md-4 p2">';
   assmedhis += '<input type="text" class="form-control" id="leherrmIrjahis" value="'+a[i]['leher']+'" readonly>';
   assmedhis += '</div>';


   assmedhis += '<div class="col-md-2 p2">';
   assmedhis += '<label class="form-label">Mulut</label>';
   assmedhis += '</div>';
   assmedhis += '<div class="col-md-4 p2">';
   assmedhis += '<input type="text" class="form-control" id="mulutrmIrjahis" value="'+a[i]['mulut']+'" readonly>';
   assmedhis += '</div>';
   assmedhis += '<div class="col-md-2 p2">';
   assmedhis += '<label class="form-label">Thorax</label>';
   assmedhis += '</div>';
   assmedhis += '<div class="col-md-4 p2">';
   assmedhis += '<input type="text" class="form-control" id="thoraxrmIrjahis" value="'+a[i]['thoraks']+'" readonly>';
   assmedhis += '</div>';

   assmedhis += '<div class="col-md-2 p2">';
   assmedhis += '<label class="form-label">Jantung</label>';
   assmedhis += '</div>';
   assmedhis += '<div class="col-md-4 p2">';
   assmedhis += '<input type="text" class="form-control" id="jantungrmIrjahis" value="'+a[i]['jantung']+'" readonly>';
   assmedhis += '</div>';
   assmedhis += '<div class="col-md-2 p2">';
   assmedhis += '<label class="form-label">Paru</label>';
   assmedhis += '</div>';
   assmedhis += '<div class="col-md-4 p2">';
   assmedhis += '<input type="text" class="form-control" id="parurmrjahis" value="'+a[i]['paru']+'" readonly>';
   assmedhis += '</div>';

   assmedhis += '<div class="col-md-2 p2">';
   assmedhis += '<label class="form-label">Ambomen</label>';
   assmedhis += '</div>';
   assmedhis += '<div class="col-md-4 p2">';
   assmedhis += '<input type="text" class="form-control" id="ambomenErmIrjahis" value="'+a[i]['abdomen']+'" readonly>';
   assmedhis += '</div>';
   assmedhis += '<div class="col-md-2 p2">';
   assmedhis += '<label class="form-label">Genitalia</label>';
   assmedhis += '</div>';
   assmedhis += '<div class="col-md-4 p2">';
   assmedhis += '<input type="text" class="form-control" id="genitaliarmIrjahis" value="'+a[i]['genitalia']+'" readonly>';
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
   assmedhis += '<textarea class="form-control " id="kompleksmedErmIrjaHis" readonly>'+a[i]['pasien_kompleks']+'</textarea>';
   assmedhis += '</div>';

   assmedhis += '</div>';
   assmedhis += '</div>';

          }
 
   
   document.getElementById("idpanelhistorirm"+idkunjunganhistori+"").innerHTML = assmedhis;
  })
}

function assesmenperawathistori(idkunjunganhistori){
  var url = "<?php echo base_url(); ?>";

  var asskephis = '';
  var param = {
          id: idkunjunganhistori,
        };
        apiPOST('RekamMedisirja/datakunjunganrmkeperdetail', param, hasil => {
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
   asskephis += '<div class="col-md-4 p2">';
   asskephis += '<label class="form-label">Riwayat Penyakit Dahulu</label>&nbsp;&nbsp;&nbsp;';
   asskephis += '</div>';
   asskephis += '<div class="col-md-8 p2">';
   asskephis += '<textarea class="form-control" id="kepRiwayatPenyakitDuluErmIrja" readonly>'+a[i]['riwayat_penyakit_dulu']+'</textarea>';
   asskephis += '<div id="DivRiwayatPenyakit" ></div>';
   asskephis += '</div>';
   asskephis += '<div class="col-md-4 p2">';
   asskephis += '<label class="form-label">Riwayat Penyakit Keluarga</label>';
   asskephis += '</div>';
   asskephis += '<div class="col-md-8 p2">';
   asskephis += '<textarea class="form-control" id="kepRiwayatPenyakitFamhis" readonly>'+a[i]['riwayat_penyakit_kel']+'</textarea>';
   asskephis += '<div id="DivPenyakitFam" ></div>';
   asskephis += '</div>';
   asskephis += '<div class="col-md-4 p2">';
   asskephis += '<label class="form-label">Riwayat Pengobatan/ Operasi</label>';
   asskephis += '</div>';
   asskephis += '<div class="col-md-8 p2">';
   asskephis += '<textarea class="form-control" id="kepRiwayatOpErmIrjahis" readonly>'+a[i]['riwayat_obat_tindakan']+'</textarea>';
   asskephis += '</div>';  
   asskephis += '<div class="col-md-4 p2">';
   asskephis += '<label class="form-label">Riwayat Alergi</label>';
   asskephis += '</div>';
   asskephis += '<div class="col-md-8 p2">';
   asskephis += '<textarea class="form-control" id="kepRiwayatAlergiErmIrjahis" readonly>'+a[i]['alergi']+'</textarea>';
   asskephis += '</div>';

   asskephis += '<div class="col-md-12 p4">';
   asskephis += '<hr>';
   asskephis += '</div>';

   asskephis += '<div class="col-md-12 p2">';
   asskephis += '<label class="form-label"><u>BIOPSIKOSOSIAL, KULTURAL, SPIRITUAL</u></label>';
   asskephis += '</div>';
   asskephis += '<div class="col-md-4 p2">';
   asskephis += '<label class="form-label">Agama</label>';
   asskephis += '</div>';
   asskephis += '<div class="col-md-8 p2">';
   asskephis += '<textarea class="form-control" id="kepAgamaErmIrjahis" readonly></textarea>';
   asskephis += '</div>';
   asskephis += '<div class="col-md-4 p2">';
   asskephis += '<label class="form-label">Pekerjaan</label>';
   asskephis += '</div>';
   asskephis += '<div class="col-md-8 p2">';
   asskephis += '<textarea class="form-control" id="keppekerjaanErmIrjahis" readonly></textarea>';
   asskephis += '</div>';
   asskephis += '<div class="col-md-4 p2">';
   asskephis += '<label class="form-label">Tinggal</label>';
   asskephis += '</div>';
   asskephis += '<div class="col-md-8 p2">';
   asskephis += '<textarea class="form-control" id="keptinggalErmIrjahis" readonly></textarea>';
   asskephis += '</div>';
   asskephis += '<div class="col-md-4 p2">';
   asskephis += '<label class="form-label">Status Mental</label>';
   asskephis += '</div>';
   asskephis += '<div class="col-md-8 p2">';
   asskephis += '<textarea class="form-control" id="kepstatusmentalErmIrjahis" readonly>'+a[i]['status_mental']+'</textarea>';
   asskephis += '</div>';
   asskephis += '<div class="col-md-4 p2">';
   asskephis += '<label class="form-label">Status Psikolog</label>';
   asskephis += '</div>';
   asskephis += '<div class="col-md-8 p2">';
   asskephis += '<textarea class="form-control" id="kepstatuspsikoErmIrjahis" readonly>'+a[i]['status_psikologi']+'</textarea>';
   asskephis += '</div>';
   asskephis += '<div class="col-md-4 p2">';
   asskephis += '<label class="form-label">Penggunaan restrain</label>';
   asskephis += '</div>';
   asskephis += '<div class="col-md-8 p2">';
   asskephis += '<textarea class="form-control" id="keprestrainErmIrjahis" readonly>'+a[i]['pengguna_restrain']+'</textarea>';
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
   asskephis += '<div class="col-md-2 p2">';
   asskephis += '<input type="text" class="form-control" id="keppupilkirirmIrjahis" value="'+a[i]['pupil']+'" readonly>';
   asskephis += '</div>';
   asskephis += '<div class="input-group-prepend col-md-2 p2"><span>mm</span></div>';
   

   asskephis += '<div class="col-md-2 p2">';
   asskephis += '<label class="form-label">Tekanan Darah</label>';
   asskephis += '</div>';
   asskephis += '<div class="col-md-2">';
   asskephis += '<input type="text" class="form-control" id="keptekanandarahrmIrjahis" value="'+a[i]['tekanan_darah']+'" readonly>';
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
   asskephis += '<input type="text" class="form-control" id="kepreflekcahayakirirmIrjahis" value="'+a[i]['reflek_cahaya']+'" readonly>';
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
  asskephis +=  '<td>4</td>';
  asskephis +=  '</tr>';
  asskephis +=  '<tr>';
  asskephis +=  '<td> Respon Motorik Terbaik (M) </td>';
  asskephis += '<td> Turut Perintah </td>';
  asskephis +=  '<td>4</td>';
  asskephis +=  '</tr>';
  asskephis +=  '<tr>';
  asskephis +=  '<td>  Respon Verbal (V) </td>';
  asskephis += '<td>  Berorientasi Baik  </td>';
  asskephis +=  '<td>4</td>';
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
   asskephis += '<input type="text" class="form-control" id="kepkepalaErmIrjahis" value="'+a[i]['kepala']+'" readonly>';
   asskephis += '</div>';
   asskephis += '<div class="col-md-2 p2">';
   asskephis += '<label class="form-label">Mata</label>';
   asskephis += '</div>';
   asskephis += '<div class="col-md-4 p2">';
   asskephis += '<input type="text" class="form-control" id="kepmatarmIrjahis" value="'+a[i]['mata']+'" readonly>';
   asskephis += '</div>';


   asskephis += '<div class="col-md-2 p2">';
   asskephis += '<label class="form-label">Tht</label>';
   asskephis += '</div>';
   asskephis += '<div class="col-md-4 p2">';
   asskephis += '<input type="text" class="form-control" id="kepthtErmIrjahis" value="'+a[i]['tht']+'" readonly>';
   asskephis += '</div>';
   asskephis += '<div class="col-md-2 p2">';
   asskephis += '<label class="form-label">Leher</label>';
   asskephis += '</div>';
   asskephis += '<div class="col-md-4 p2">';
   asskephis += '<input type="text" class="form-control" id="kepleherrmIrjahis" value="'+a[i]['leher']+'" readonly>';
   asskephis += '</div>';


   asskephis += '<div class="col-md-2 p2">';
   asskephis += '<label class="form-label">Mulut</label>';
   asskephis += '</div>';
   asskephis += '<div class="col-md-4 p2">';
   asskephis += '<input type="text" class="form-control" id="kepmulutrmIrjahis" value="'+a[i]['mulut']+'" readonly>';
   asskephis += '</div>';
   asskephis += '<div class="col-md-2 p2">';
   asskephis += '<label class="form-label">Thorax</label>';
   asskephis += '</div>';
   asskephis += '<div class="col-md-4 p2">';
   asskephis += '<input type="text" class="form-control" id="kepthoraxrmIrjahis" value="'+a[i]['thorax']+'" readonly>';
   asskephis += '</div>';

   asskephis += '<div class="col-md-2 p2">';
   asskephis += '<label class="form-label">Jantung</label>';
   asskephis += '</div>';
   asskephis += '<div class="col-md-4 p2">';
   asskephis += '<input type="text" class="form-control" id="kepjantungrmIrjahis" value="'+a[i]['jantung']+'" readonly>';
   asskephis += '</div>';
   asskephis += '<div class="col-md-2 p2">';
   asskephis += '<label class="form-label">Paru</label>';
   asskephis += '</div>';
   asskephis += '<div class="col-md-4 p2">';
   asskephis += '<input type="text" class="form-control" id="kepparurmrjahis" value="paru" readonly>';
   asskephis += '</div>';

   asskephis += '<div class="col-md-2 p2">';
   asskephis += '<label class="form-label">Ambomen</label>';
   asskephis += '</div>';
   asskephis += '<div class="col-md-4 p2">';
   asskephis += '<input type="text" class="form-control" id="kepambomenErmIrjahis" value="'+a[i]['abdomen']+'" readonly>';
   asskephis += '</div>';
   asskephis += '<div class="col-md-2 p2">';
   asskephis += '<label class="form-label">Genitalia</label>';
   asskephis += '</div>';
   asskephis += '<div class="col-md-4 p2">';
   asskephis += '<input type="text" class="form-control" id="kepgenitaliarmIrjahis" value="'+a[i]['genitalia']+'" readonly>';
   asskephis += '</div>';

   asskephis += '<div class="col-md-2 p2">';
   asskephis += '<label class="form-label"> Status Localis </label>';
   asskephis += '</div>';
   asskephis += '<div class="col-md-4 p2">';
   asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="'+a[i]['status_lokalis']+'" readonly>';
   asskephis += '</div>';
   

   asskephis += '<div class="col-md-12 p4">';
   asskephis += '<hr>';
   asskephis += '<label class="form-label"><u>SKRINING GIZI</u></label>';
   asskephis += '</div>';

    asskephis +='<div class="col-md-6">';
    asskephis +='<label class="form-label"> &gt; Apakah ada penurunan berat badan tidak direncanakan dalam 6 bulan terakhir</label>';
    asskephis +='<input type="text" class="form-control form-control-xs" name="kepermrwjkeperawatansaranhis" id="kepermrwjkeperawatansaranhis value="'+a[i]['penurunan_bb']+'" readonly>';
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
    asskephis +='<label class="form-label">Catatan : Skor 0 risiko rendah, Skor 1 risiko sedang, Skor ≥ 2 risiko tinggi konsultasikan ahli gizi atau Bila terdapat kondisi seperti DM, luka bakar, CKD, hiperlipidemia atau kondisi khusus lainnya berdasarkan pertimbangan dokter, maka konsultasikan ke ahli gizi</label>';
    asskephis +='</div>';

    asskephis += '<div class="col-md-12 p4">';
    asskephis += '<hr>';
    asskephis += '<label class="form-label"><u>STATUS FUNGSIONAL</u></label>';
    asskephis += '</div>';  
    asskephis += '<div class="col-md-12 p2"><textarea class="form-control " id="kepstatusfungsionalrmhis" readonly="">'+a[i]['status_fungsional']+'</textarea></div>';

   asskephis += '<div class="col-md-12 p4">';
   asskephis += '<hr>';
   asskephis += '<label class="form-label"><u>SKRINING RISIKO CEDERA/ JATUH (Usia <13 - >60 Tahun) menggunakan Up and Go Test (Pasien ini berumur 69 Tahun) *</u></label>';
   asskephis += '</div>';
   asskephis += '<div class="col-md-12 p2"><textarea class="form-control " id="kepresikojatuhrmhis"  readonly="">'+a[i]['resiko_jatuh']+'</textarea></div>';
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

    asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="0" checked="true"><label>0</label></div>';
    asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="1"><label>1</label></div>';
    asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="2"><label>2</label></div>';
    asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="3"><label>3</label></div>';
    asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="4"><label>4</label></div>';
    asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="5"><label>5</label></div>';
    asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="6"><label>6</label></div>';
    asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="7"><label>7</label></div>';
    asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="8"><label>8</label></div>';
    asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="9"><label>9</label></div>';
    asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="10"><label>10</label></div>';
    asskephis += '<div class="col-md-1"></div>';

    asskephis += '<div class="col-md-12 p4">';
   asskephis += '<hr>';
   asskephis += '<label class="form-label"><u>DAFTAR DIAGNOSA KEPERAWATAN & INTERVENSI KEPERAWATAN *</u></label>';
   asskephis += '</div>';

   asskephis +='<div class="col-md-12">';
   asskephis +='<h5>Intervensi Keperawatan</h5>';                      
   asskephis +='<textarea class="form-control" id="intervensiErmKeperawatanIrjahis" readonly></textarea>';
   asskephis +='</div>'; 
   asskephis +='<div class="col-md-12">';   
   asskephis +='<h5>Diagnosa Keperawatan</h5>';                  
   asskephis +='<textarea class="form-control" id="DiagnosaErmKeperawatanIrjahis" readonly></textarea>';
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
        apiPOST('RekamMedisirja/datakunjunganhistorirm', param, hasil => {
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
      barisrmhis += ' | <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="assesmenperawathistori('+a[i]['id_kunjungan']+')"> <i class="fas fa-book-medical"></i> Assesmen Perawat</button>';
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
      barisrmhis += '<div class="col-md-12" style="padding-top: 10px;">';
      barisrmhis += '<div class="info-box mb-0" id="detailsoapi'+a[i]['id_kunjungan']+'">'; 
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

      detailsoapi(a[i]['id_kunjungan']);
      eresep(a[i]['id_kunjungan'],a[i].tgl_masuk,a[i].tgl_masuk);
      barisrmhis += '</div>';
      barisrmhis += '</div>';
      barisrmhis += '</div>';
      barisrmhis += '</div>';
    }
    document.getElementById('listhistorirmkunjungan').innerHTML = barisrmhis;
    })

    

    }
    function eresep(id_kunj,tgl_kunj,tglorder) {
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
    function detailsoapi(idkunjungan){
      var paramsoapi = {
          idkunjungan: idkunjungan
        };
      var barisrmhisd = ''; 
      apiPOST('RekamMedisirja/datakunjunganhistorirmsoapi', paramsoapi, hasil => {
          var x = hasil['data'];
          if (hasil['pesan']=="Data ditemukan") {            
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
      barisrmhisd += '<div><h4>SOAP I</h4><br>';
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
      document.getElementById('detailsoapi'+idkunjungan+'').innerHTML = barisrmhisd;
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

</script>