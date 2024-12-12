<?php
date_default_timezone_set('Asia/Jakarta');
$nowday     = date('Y-m-d');
  //$nextday    = date('Y-m-d', strtotime('+1 days', strtotime($nowday))); 
$nextday    = $nowday; 
?>
<div class="col-md-12 p-2">

  <div class="card card-outline card-danger">
    <div class="overlay-wrapper" id="RWJpend_loadingawal">
      <div class="overlay">
        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
      </div>
    </div>  

    <div class="card-body p-2 darkgrey-custom" id='DivCariPasienRWJ'>
      <div class="row row-custom">
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Cari No. RM / Nama Pasien :</label>
            <div class="input-group input-group-sm mb-3">
              <div class="input-group-prepend">
                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="height:25px;"></button>
                <ul class="dropdown-menu">
                  <li class="dropdown-item cri_normpendfRWJ" >No. RekamMedik</a></li>
                  <li class="dropdown-item cri_nmpasienpendfRWJ" onclick="show_cri_nmpasienpendfRWJ()">Nama Pasien</a></li>
                </ul>
              </div>            
              <input type="search" id="searchpendfrwj" class="form-control form-control-xs" placeholder="Entry RM..." autocomplete="off" onkeypress="caripasienbyrm(event)">
              <input type="search" class="form-control form-control-xs" placeholder="Entry Nama Pasien..." id="RWJpend_nm_pasiencari" autocomplete="off">
            </div>
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label> NIK :</label>
            <input type="search" class="form-control form-control-xs" placeholder="Entry NIK" autocomplete="off" id="caripasiennik" onkeypress="caripasienbynik(event)">
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label for="exempel1"> Nama :</label>
            <input type="search" id="pendafrwjcarinama" class="form-control form-control-xs" placeholder="Entry Nama" autocomplete="off" onkeypress="caripasienbynama(event)">
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label for="exempel1"> Alamat :</label>
            <input type="search" id="pendafrwjcarialamat" class="form-control form-control-xs" placeholder="Entry Alamat" autocomplete="off" onkeypress="caripasienbynama(event)">
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label for="exempel1"> Jmlh Pasien :</label>
            <select size="1" class="form-control form-control-xs" id="countpasien">
              <option value=10>10 Pasien</option>
              <option value=15>15 Pasien</option>
              <option value=20>20 Pasien</option>
              <option value=25>25 Pasien</option>
              <option value=30>30 Pasien</option>
              <option value=40>Semua Pasien</option>
            </select>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 p-1">
      <div class="card">
        <div>
          <div class="card-header p-2 darkgrey-custom">
            <div class="row">
              <div class="col-md-10">              
                <h6 class="hr6-custom" id="rwj_pendf_titleheader"><i class="fas fa-hospital-user"></i> Daftar Pasien</h6>
                <div id="rwj_pendf_buttonList">
                  <button type="button" class="btn bg-gradient-secondary btn-xs" type="submit" onclick="tambahpasienrwj()"> <i class="fas fa-user-plus"></i> Pasien Baru</button>
                </div>
                <div id="rwj_pendf_buttonPasienBaru">
                  <button type="button" class="btn bg-gradient-secondary btn-xs" type="submit" onclick="savependfrwj();"> <i class="fas fa-save"></i> Simpan</button>
                  <div class="btn-group pull-right">
                    <button type="button" class="btn bg-gradient-secondary btn-xs"><i class="fas fa-print"></i> Cetak</button>
                    <button type="button" class="btn bg-gradient-secondary dropdown-toggle dropdown-icon btn-xs" data-toggle="dropdown">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu p-1" role="menu">
                      <a class="dropdown-item" href="#"><i class="fa fa-file"></i> Surat Pernyataan</a>
                      <div class="dropdown-divider m-0"></div>
                      <a class="dropdown-item" href="#" onclick="RWJpendf_createlabelpasien()"><i class="fa fa-user"></i> Label Pasien</a>
                      <div class="dropdown-divider m-0"></div>
                      <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Status Pasien</a>
                      <div class="dropdown-divider m-0"></div>
                      <a class="dropdown-item" href="#" onclick="RWJpendf_createkartupasien()"><i class="fa fa-credit-card"></i> Kartu Pasien</a>
                      <!-- <a class="dropdown-item" href="#" onclick=""><i class="fa fa-code"></i> Gelang Pasien</a> -->
                    </div>
                  </div>
                  <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="tambahpasienrwj()"> <i class="fas fa-user-plus"></i> Pasien Baru</button>
                  <button type="button" class="btn bg-gradient-secondary btn-xs"  onclick="pendafrwjcarisep()"> <i class="fas fa-user-plus"></i> Data SEP</button>
                  <!-- <button type="button" class="btn bg-gradient-secondary btn-xs"  onclick="pendafrwjupdatedata()" id="buttoneditdata"><i class="fas fa-arrow-left"></i> Edit Data</button> -->
                  <button type="button" class="btn bg-gradient-secondary btn-xs"  onclick="pendafrwjcanceldata()" style="display: none;" id="buttoncanceldata"><i class="fas fa-arrow-left"></i> Cancel Data</button>
                  <button type="button" class="btn bg-gradient-secondary btn-xs"  onclick="kembali_pend_rwj()"> <i class="fas fa-arrow-left"></i> Kembali</button>
                  <input type="hidden" name="updatedatapasien" id="updatedatapasien" value="0">
                </div>
              </div>
              <div class="col-md-2">
                <div class="form_group">
                  <label>Tgl. Kunjung :</label>
                  <input type="date" name="rwjpendaftglkunjungan" id="rwjpendaftglkunjungan" class="form-control form-control-xs" disabled>
                </div>
              </div>
            </div>
          </div>

          <div class="card-body" id='tabelpasienrwj' style="padding: 0px; max-height: 320px; overflow: auto;">
            <table id="tablePendafataranRWJ" class="table table-striped table-sm choose" style="border-collapse: inherit;">
              <thead>
                <tr>
                  <th width="15">#</th>
                  <th>No. RM</th>
                  <th>Nama Pasien</th>
                  <th>Alamat(s)</th>
                  <th>Telp</th>
                  <th>Tgl Kunjungan</th>
                  <th>Unit</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </div>

        <div class="card-body p-1" id="DivPasienRWJ" style="display: none; ">
          <div class="row" >
            <div class="col-12 col-sm-1">
              <div class="form_group">
                <label>Rekam Medis</label>
                <input type="text" name="rwjpendafkdpasien" id="rwjpendafkdpasien" class="form-control form-control-xs" onkeypress="rwjpendafkdpasien(event)" readonly>
              </div>
            </div>            
            <div class="col-12 col-sm-2">
              <div class="form_group">
                <label>Nma Pasien</label>
                <input type="text" name="rwjpendafnamapasien" id="rwjpendafnamapasien" class="form-control form-control-xs" onkeypress="rwjpendafnamapasien(event)" readonly>      
              </div>
            </div> 
            <div class="col-12 col-sm-2">
              <div class="form_group">
                <label>Keluarga</label>
                <input type="text" name="rwjpendafkeluarga" id="rwjpendafkeluarga" class="form-control form-control-xs" onkeypress="rwjpendafkeluarga(event)" readonly>      
              </div>
            </div> 
            <div class="col-12 col-sm-1">
              <div class="form_group">
                <label>Agama</label> 
                <select class="form-control form-control-xs" id="rwjpendafagama" name="rwjpendafagama" onkeypress="rwjpendafagama(event)" readonly>
                </select>     
              </div>
            </div> 
            <div class="col-12 col-sm-auto">
              <div class="form_group">
                <label>G.Darah</label> 
                <select name="rwjpendafgoldarah" id="rwjpendafgoldarah" class="form-control form-control-xs" onkeypress="rwjpendafgoldarah(event)" readonly>
                  <option value="1">A+</option>
                  <option value="2">B+</option>
                  <option value="3">O+</option>
                  <option value="4">AB+</option>
                </select>     
              </div>
            </div> 
            <div class="col-12 col-sm-1">
              <div class="form_group">
                <label>Kelamin</label>   
                <select name="rwjpendafkelamin" id="rwjpendafkelamin" class="form-control form-control-xs" onkeypress="rwjpendafkelamin(event)" readonly>
                  <option value="t">Laki-laki</option>
                  <option value="f">Perempuan</option>
                </select>   
              </div>
            </div> 
            <div class="col-12 col-sm-auto">
              <div class="form_group">
                <label>Status Marital</label>
                <select name="rwjpenstatusmarital" id="rwjpendafstatusmarital" class="form-control form-control-xs" onkeypress="rwjpenstatusmarital(event)" readonly>
                  <option value="1">Menikah</option>
                  <option value="2">Belum Menikah</option>
                </select>     
              </div>
            </div>
            <div class="col-12 col-sm-2">
              <div class="form_group">
                <label>No Telepon</label>
                <input type="number" min="0" max="12" name="rwjpendaftelepon" id="rwjpendaftelepon" class="form-control form-control-xs" onkeypress="rwjpendaftelepon(event)" readonly>      
              </div>
            </div>
            <div class="col-12 col-sm-auto">
              <div class="form_group">
                <div class="icheck-danger d-inline ">
                  <label>WNI</label><br>
                  <input type="checkbox" name="rwjpendafwni"  checked="true" id="rwjpendafwni" onkeypress="rwjpendafwni(event)" readonly>
                </div> 
              </div>
            </div>
            <div class="col-12 col-sm-2" >
              <div class="form_group">
                <label>Tempat Lahir</label>
                <input type="text" name="rwjpendaftempatlahir" id="rwjpendaftempatlahir" class="form-control form-control-xs" onkeypress="rwjpendaftempatlahir(event)" readonly>      
              </div>
            </div> 
            <div class="col-12 col-sm-auto">
              <div class="form_group">
                <label>Tanggal Lahir</label>
                <input type="date"  name="rwjpendaftanggallahir" id="rwjpendaftanggallahir" class="form-control form-control-xs"  onkeypress="rwjpendaftanggallahir(event)"  readonly>      
              </div>
            </div>
            <div class="col-12 col-sm-2">
              <div class="form_group">
                <label>Umur</label>
                <input type="text" name="rwjpendf_umur" id="rwjpendf_umur" class="form-control form-control-xs" placeholder="Otomatis" disabled>
              </div>
            </div>            
            <div class="col-12 col-sm-2">
              <div class="form_group">
                <label>NIK</label>
                <input type="text" name="rwjpendafnik" id="rwjpendafnik" class="form-control form-control-xs" onkeypress="rwjpendafnik(event)" readonly>      
              </div>
            </div>      
            <div class="col-12 col-sm-2">
              <div class="form_group">
                <label>Pendidikan</label>
                <select name="rwjpendafpendidikan" id="rwjpendafpendidikan" class="form-control form-control-xs" onkeypress="rwjpendafpendidikan(event)" readonly>
                </select>     
              </div>
            </div> 
            <div class="col-12 col-sm-2">
              <div class="form_group">
                <label>Pekerjaan</label>
                <select name="rwjpendafpekerjaan" id="rwjpendafpekerjaan" class="form-control form-control-xs" onkeypress="rwjpendafpekerjaan(event)" readonly>
                </select>    
              </div>
            </div> 
            <div class="col-12 col-sm-3">
              <div class="form_group">
                <label>Alamat</label>
                <input type="text" name="rwjpendafalamat" id="rwjpendafalamat" class="form-control form-control-xs" onkeypress="rwjpendafalamat(event)" readonly>      
              </div>
            </div>
            <div class="col-12 col-sm-2">
              <div class="form_group">
                <label>Propinsi</label>
                <select name="rwjpendafpropinsi" id="rwjpendafpropinsi" class="form-control form-control-xs" onkeypress="rwjpendafpropinsi(event)" onchange="tampil_pendfrwjkota();" readonly>
                </select>  
              </div>
            </div> 
            <div class="col-12 col-sm-2">
              <div class="form_group">
                <label>Kab/Kota</label>
                <select name="rwjpendafkab" id="rwjpendafkab" class="form-control form-control-xs" onkeypress="rwjpendafkab(event)"  onchange="tampil_pendfrwjkec();" readonly>
                </select>     
              </div>
            </div> 
            <div class="col-12 col-sm-2">
              <div class="form_group">
                <label>Kecamatan</label>
                <select name="rwjpendafkec" id="rwjpendafkec" class="form-control form-control-xs" onkeypress="rwjpendafkec(event)" onchange="tampil_pendfrwjkel();" readonly>
                </select>      
              </div>
            </div> 
            <div class="col-12 col-sm-2">
              <div class="form_group">
                <label>Kelurahan</label>
                <select name="rwjpendafkelurahan" id="rwjpendafkelurahan" class="form-control form-control-xs" onkeypress="rwjpendafkelurahan(event)" readonly>
                </select>       
              </div>
            </div> 
            <div class="col-12 col-sm-1">
              <div class="form_group">
                <label>Kd.Pos</label>
                <input type="text" name="rwjpendafkdpos" id="rwjpendafkdpos" class="form-control form-control-xs" maxlength='5' onkeypress="rwjpendafkdpos(event)" readonly>      
              </div>
            </div> 
            <div class="col-12 col-sm-3">
              <div class="form_group">
                <label>Alamat KTP</label>
                <input type="text" name="rwjpendafalamatktp" id="rwjpendafalamatktp" class="form-control form-control-xs" onkeypress="rwjpendafalamatktp(event)" readonly>      
              </div>
            </div> 
            <div class="col-12 col-sm-2">
              <div class="form_group">
                <label>Propinsi KTP</label> 
                <select name="rwjpendafpropinsiktp" id="rwjpendafpropinsiktp" class="form-control form-control-xs" onkeypress="rwjpendafpropinsiktp(event)" onchange="tampil_pendfrwjkotaktp();" readonly>
                </select>    
              </div>
            </div> 
            <div class="col-12 col-sm-2">
              <div class="form_group">
                <label>Kab/Kota KTP</label> 
                <select name="rwjpendafkabktp" id="rwjpendafkabktp"  class="form-control form-control-xs" onkeypress="rwjpendafkabktp(event)" onchange="tampil_pendfrwjkecktp();" readonly>
                </select>    
              </div>
            </div> 
            <div class="col-12 col-sm-2">
              <div class="form_group">
                <label>Kecamatan KTP</label>
                <select name="rwjpendafkecktp" id="rwjpendafkecktp"  class="form-control form-control-xs" onkeypress="rwjpendafkecktp(event)" onchange="tampil_pendfrwjkelktp()" readonly >
                </select>      
              </div>
            </div> 
            <div class="col-12 col-sm-2">
              <div class="form_group">
                <label>Kelurahan KTP</label>
                <select name="rwjpendafkelurahanktp" id="rwjpendafkelurahanktp" class="form-control form-control-xs" onkeypress="rwjpendafkelurahanktp(event)" readonly>
                </select> 
              </div>
            </div> 
            <div class="col-12 col-sm-1">
              <div class="form_group">
                <label>Kd.Pos</label>
                <input type="text" name="rwjpendafkdposktp" id="rwjpendafkdposktp" maxlength='5' class="form-control form-control-xs" onkeypress="rwjpendafkdposktp(event)" readonly>      
              </div>
            </div>

          </div>

          <div class="card-body p-1" id="DivPendafDetailRWJ" style="display: none;">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="pill" href="#rwjpendafkunjungan">Kunjungan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#rwjpendafanamnese">Anamnese</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#rwjpendaftanggungjawab">Penanggung Jawab</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#rwjpendafkeluargakunjungan">Data Keluarga</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#rwjpendafriwayatpenyakit">Riwayat Penyakit</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#rwjpendafhistorykunjungan">History Kunjungan</a>
              </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane p-1 fade active show" id="rwjpendafkunjungan" role="tabpanel">
                <h6 class="lead mb-0"><u>Rujukan</u></h6>
                <div class="row mb-0">
                  <div class="col-md-auto p-2">
                    <div class="form_group">
                      <div class="icheck-danger d-inline">
                        <input type="hidden" name="rwj_pendf_caraterima" id="rwj_pendf_caraterima" value=1>
                        <input type="radio" name="rwjpendafrujukanpasien[]"  id="rwjpendafrujukanpasien"  onclick="rwjpendafrujukanpasien1()" >
                        <label>Datang sendiri</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-auto p-2">
                    <div class="form_group">
                      <div class="icheck-danger d-inline ">
                        <input type="radio" name="rwjpendafrujukanpasien[]"  id="rwjpendafrujukanpasien" onclick="rwjpendafrujukanpasien2()" checked="true">
                        <label>Rujukan</label>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-md-2 p-2" id="divRujukan1">
                    <div id="rwj_pendf_divrujukandari">
                      <div class="form_group">
                        <label>Rujukan dari</label>
                        <select name="rwj_pendf_rujukandari" id="rwj_pendf_rujukandari" class="form-control form-control-xs" onchange="Rujukan()" onkeypress="RujukanEnter(event)">
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 p-2" id="divRujukan2">
                    <div id="rwj_pendf_divtempatrujukan">
                      <div class="form_group ">
                        <label>Rujukan</label>
                        <select  name="rwjpendaftempatrujukan" id="rwjpendaftempatrujukan" class="form-control form-control-xs" onkeypress="rwjpendaftempatrujukan(event)">
                          <option value='0' >-Pilih-</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-12 p-0">
                  <div class="row">
                    <div class="col-sm-2">
                      <div class="form_group">
                        <div class="icheck-danger d-inline ">
                          <input type="radio" name="rwjpendaflaka" id="rwjpendaflaka" disabled>
                          <label>Laka Lantas</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-2" id="rwj_pendf_divsepmanual">
                      <div class="form_group ">
                        <div class="icheck-danger d-inline ">
                          <input type="radio" name="rwjpendf_sepmanual" id="rwjpendf_sepmanual"  onclick="cariRujukanPasienIrja();">
                          <label>SEP Manual</label>
                        </div>                            
                      </div>
                    </div>
                  </div>
                  <div class="row pt-1" style="border-top: 7px double green;">
                    <div class="col-sm-2">
                      <div class="form_group">
                        <label>Poliklinik</label>
                        <select class="form-control form-control-xs" id="rwjpendafpoliklinik" name="rwjpendafpoliklinik" onkeypress="rwjpendafpoliklinik(event)">
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-2" id="divkelompokpasien">
                      <div class="form_group">
                        <label>Kelompok Pasien</label> 
                        <select name="rwjpendafkelompokpasien" id="rwjpendafkelompokpasien" class="form-control form-control-xs" onkeypress="rwjpendafkelompokpasien(event)">
                          <option value="0">--pilih penjamin--</option>
                          <option value="1">Asuransi</option>
                          <option value="2">Perusahaan</option>
                          <option value="3">Perorangan</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form_group" >
                        <label>Penjamin</label>
                        <select id="rwjpendafPenjamin"  class="form-control form-control-xs" onkeypress="rwjpendafPenjamin(event)">
                        </select>     
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form_group">
                        <label>Diagnosa</label>
                        <select class="rwjpendafdiagnosa form-control form-control-xs" id="rwjpendafdiagnosa"  autocomplete="off">
                          <option></option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form_group">
                        <label>Dokter</label>
                        <select  name="rwjpendafdokter" id="rwjpendafdokter" class="form-control form-control-xs" onkeypress="rwjpendafdokter(event)" >
                        </select>    
                      </div>
                    </div>
                    <div class="col-sm-2" id="divnoasuransi">
                      <div class="form_group">
                        <label>No. Asuransi</label> 
                        <input name="rwjpendafnoasuransi" id="rwjpendafnoasuransi" class="form-control form-control-xs" onkeypress="tampilmodalcreateseprwj(event)">     
                      </div>
                    </div>
                    <div class="col-sm-2" id="divrujukan">
                      <div class="form_group">
                        <label>Rujukan</label> 
                        <input name="rwjpendafrujukanbpjs" id="rwjpendafrujukanbpjs" class="form-control form-control-xs">     
                      </div>
                    </div>
                    <div class="col-sm-2" id="divsep">
                      <div class="form_group">
                        <label>SEP</label> 
                        <input name="rwjpendafSEP" id="rwjpendafSEP" class="form-control form-control-xs" >     
                      </div>
                    </div>
                  </div>
                </div>

                
              </div>
              
              <div class="tab-pane p-1 fade" id="rwjpendafanamnese" role="tabpanel">
                <h6 class="lead mb-0"><u>Anamnese & Alergi</u></h6>
                <div class="row">
                  <div class="col-sm-3">
                    <div class="form_group">
                      <label>Anamnese</label>
                      <input type="text" name="rwjpendafanamnese" id="rwjpendafanamnese" class="form-control form-control-xs" onkeypress="rwjpendafanamnese(event)">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form_group">
                      <label>Alergi</label>
                      <input type="text" name="rwjpendafalergi;ergi" id="rwjpendafalergi" class="form-control form-control-xs" onkeypress="rwjpendafalergi(event)">
                    </div>
                  </div>
                </div>
              </div>

              <div class="tab-pane p-1 fade" id="rwjpendaftanggungjawab" role="tabpanel">
                <h6 class="lead mb-0"><u></u></h6>
                <div class="row">
                  <div class="col-sm-2">
                    <div class="form_group">
                      <label>Nama Penanggung Jawab</label>
                      <input type="text" name="rwjpendafpenanggungjawab" id="rwjpendafpenanggungjawab" class="form-control form-control-xs" onkeypress="hubpenanggujawab(event)" value="tidak ada">      
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form_group ">
                      <label>Hubungan Penanggung Jawab</label>
                      <input type="text" name="rwjpendafhubpenanggungjawab" id="rwjpendafhubpenanggungjawab" class="form-control form-control-xs" onkeypress="Penanggungjawab(event);" value="tidak ada">      
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form_group ">
                      <label>NIK</label>
                      <input type="text" name="rwjpendafnikpenanggungjawab" id="rwjpendafnikpenanggungjawab" class="form-control form-control-xs" onkeypress="Penanggungjawabnik(event)" value="tidak ada">      
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form_group ">
                      <label>Alamat</label>
                      <input type="text" name="rwjpendafalamatpenanggungjawab" id="rwjpendafalamatpenanggungjawab" class="form-control form-control-xs" onkeypress="Penanggungjawabtlfn(event)" value="tidak ada">      
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form_group ">
                      <label>No. Telp</label>
                      <input type="text" name="rwjpendaftlfpenanggungjawab" id="rwjpendaftlfpenanggungjawab" class="form-control form-control-xs" value="tidak ada">      
                    </div>
                  </div>
                </div>
              </div>

              <div class="tab-pane p-1 fade" id="rwjpendafkeluargakunjungan" role="tabpanel">
                <h6 class="lead mb-0"><u></u></h6>
                <div class="row">
                  <div class="col-sm-4">
                    <div class="form_group">
                      <label>Nama Ayah</label>
                      <input type="text" name="rwjpendafayah" id="rwjpendafayah" class="form-control form-control-xs" onkeypress="pekerjaanAyah(event)">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form_group">
                      <label>Pekerjaan Ayah</label>
                      <select type="text" name="rwjpendafpekerjaanayah" id="rwjpendafpekerjaanayah" class="form-control form-control-xs" onkeypress="pendidikanAyah(event)">
                      </select>   
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form_group">
                      <label>Pendidikan Ayah</label>
                      <select type="text" name="rwjpendafpendidikanayah" id="rwjpendafpendidikanayah" class="form-control form-control-xs" onkeypress="namaIbu(event)">  
                      </select>    
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form_group">
                      <label>Nama Ibu</label>
                      <input type="text" name="rwjpendafibu" id="rwjpendafibu" class="form-control form-control-xs" onkeypress="pekerjaanIbu(event)">      
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form_group">
                      <label>Pekerjaan Ibu</label>
                      <select type="text" name="rwjpendafpekerjaanibu" id="rwjpendafpekerjaanibu" class="form-control form-control-xs" onkeypress="pendidikanIbu(event)">
                      </select>  
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form_group">
                      <label>Pendidikan Ibu</label>
                      <select type="text" name="rwjpendafpendidikanibu" id="rwjpendafpendidikanibu" class="form-control form-control-xs">
                      </select>
                    </div>
                  </div>
                </div>
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

              <div class="tab-pane p-1 fade" id="rwjpendafhistorykunjungan" role="tabpanel">
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
<div class="modal fade" id="ModalCreateSEP" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header p-1">
        <h4 class="modal-title">Create SEP</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row" >
          <div class="col-sm-6">
            <input type="hidden" name="ppk" id="ppk">
            <input type="hidden" name="tglRujukan" id="tglRujukan">
            <label>No Asuransi</label>
            <input type="text" class="form-control form-control-xs" name="rwjpendafnokartu" id="rwjpendafnokartu" onkeypress="rwjpendaftampilnorujukan(event)" autofocus>  
          </div>
          <div class="col-sm-6">
            <label>No rujukan</label>
            <input type="text" class="form-control form-control-xs" name="rwjpendafnorujukan" id="rwjpendafnorujukan"> 
            <div id="Divtampilrujukanrwj"></div> 
          </div>
          <div class="col-sm-6">
            <label>Poli BPJS</label>
            <input type="text" class="form-control form-control-xs" name="rwjpendafklinikbpjs" id="rwjpendafklinikbpjs" onkeypress="rwjpendaftampilcaridokter(event)">  
            <div id="Divtampildokterbpjs"></div>
          </div>
          <div class="col-sm-6">
            <label>Poli RS</label>
            <input type="text" class="form-control form-control-xs" name="rwjpendafklinikRS" id="rwjpendafklinikRS" >  
            <div id="Divtampildokterbpjs"></div>
          </div>
          <div class="col-sm-6">
            <label>Dokter</label>
            <input type="text" class="form-control form-control-xs" name="rwjpendafdokterbpjs" id="rwjpendafdokterbpjs" onkeypress="cekhistori(event)">  
            <div id="DivtampilSEP"></div>

          </div>
          <div class="col-sm-6">
            <label>No SEP Asal</label>
            <input type="hidden" id="tglsepasal" name="tglsepasal">
            <input type="text" class="form-control form-control-xs" name="rwjpendaftampilskdp" id="rwjpendaftampilskdp" readonly onkeypress="CreateRencanaKontrol(event)" >  
            <div id="Divtampilskdp" ></div>
          </div>
          <div class="col-sm-6">
            <label>No Rencana Kontrol</label>
            <input type="text" class="form-control form-control-xs" name="rwjpendaftampilrencanakontrol" id="rwjpendaftampilrencanakontrol" >  
          </div>
          <div class="col-sm-6" id="CreateSepIrjaTujuanKontrol">
            <label>Tujuan Kontrol</label>
            <select type="text" class="form-control form-control-xs" name="rwjpendaftujuankontrol" id="rwjpendaftujuankontrol" onchange="tujuanKunjungan()"> 
              <option value="0">Normal</option>
              <option value="1">Prosedur</option>
              <option value="2">Konsul Dokter</option>
            </select>
          </div>
          <div class="col-sm-6" id="CreateSepIrjaProsedur" >
            <label>Prosedur</label>
            <select type="text" class="form-control form-control-xs" name="rwjpendafprosedur" id="rwjpendafprosedur" onchange="flagProcedure()" style="display:none;"> 
              <option value="99" selected>---pilih---</option> 
              <option value="0">Prosedur Tidak Berkelanjutan</option>
              <option value="1">Prosedur dan Terapi Berkelanjutan</option>
            </select>
          </div>
          <div class="col-sm-6" id="CreateSepIrjaPenunjang" style="display:none;">
            <label>Penunjang</label>
            <select type="text" class="form-control form-control-xs" name="rwjpendafpenunjang" id="rwjpendafpenunjang"> 
              <option value="99" selected>---pilih---</option> 
              <option value="1">Radioterapi</option>
              <option value="2">Kemoterapi</option>
              <option value="3">Rehabilitasi Medik</option>
              <option value="4">Rehabilitasi Psikososial</option>
              <option value="5">Transfusi Darah</option>
              <option value="6">Pelayanan Gigi</option>
              <option value="7">Laboratorium</option>
              <option value="8">USG</option>
              <option value="9">Farmasi</option>
              <option value="10">Lain-Lain</option>
              <option value="11">MRI</option>
              <option value="12">HEMODIALISA</option>
            </select>
          </div>
          <div class="col-sm-6" id="CreateSepIrjaAssesmenPelayanan" >
            <label>Assesmen Pelayanan</label>
            <select type="text" class="form-control form-control-xs" name="rwjpendafAssesmenPelayanan" id="rwjpendafAssesmenPelayanan">  

              <!--      "4": Atas Instruksi RS} ==> diisi jika tujuanKunj = "2" atau "0" (politujuan beda dengan poli rujukan dan hari beda), -->
              <!-- tujuan kunjung normal assesmen 2 -->
              <option value="99" selected>---pilih---</option>
              <option value="1">Poli spesialis tidak tersedia pada hari sebelumnya</option>
              <option value="2">Jam Poli telah berakhir pada hari sebelumnya</option>
              <option value="3">Dokter Spesialis yang dimaksud tidak praktek pada hari sebelumnya</option>
              <option value="4">Atas Instruksi RS</option>
              <option value="5">Tujuan Kontrol</option>
            </select>
          </div>
        </div>

      </div>
      <div class="modal-footer p-1">
        <button type="button" class="btn btn-success btn-sm" onclick="ApproveFinger()"><i class="fas fa-save"></i> Approve Finger</button>
        <button type="button" class="btn btn-success btn-sm" onclick="CreateSepIrja()"><i class="fas fa-save"></i> Create SEP</button>
        <button type="button" class="btn btn-success btn-sm" onclick="CreateSepIrjaPostMrs()"><i class="fas fa-save"></i>SEP POST MRS</button>
        <button class="btn btn-warning" onclick="closemodalcreatesep()">Close</button>
      </div>
    </div>

  </div>

</div>
<!-- modal rujuk pasien -->
<div class="modal fade" id="ModalRujukPxIrja" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header p-1">
        <h4 class="modal-title">Rujuk Pasien BPJS</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row" >
          <div class="col-sm-6">
            <label>No SEP</label>
            <input type="text" class="form-control form-control-xs" name="rwjseprujuk" id="rwjseprujuk" readonly>  
          </div>
          <div class="col-sm-6">
            <label>Tanggal Rujuk</label>
            <input type="date" class="form-control form-control-xs" name="rwjtglrujuk" id="rwjtglrujuk"> 
          </div>
          <div class="col-sm-6">
            <label>Jenis Pelayanan</label>
            <select class="form-control form-control-xs" name="rwjpelayananrujuk" id="rwjpelayananrujuk"> 
              <option value="1">
                Rawat Jalan
              </option>
              <option value="1">
                Rawat Inap
              </option>
            </select>
          </div>

          <div class="col-sm-6">
            <label>Diagnosa Rujuk</label>
            <input type="text" class="form-control form-control-xs" name="rwjdiagnosarujuk" id="rwjdiagnosarujuk" onkeypress="listdiagnosarujuk(event)">  
            <div id="DivtampilIcdRujuk"></div>

          </div>
          <div class="col-sm-6">
            <label>Tipe Rujukan</label>
            <select class="form-control form-control-xs" name="rwjtiperujuk" id="rwjtiperujuk">
              <option value="0">Penuh</option>
              <option value="1">Partial </option>
              <option value="2">Rujuk balik</option>
            </select>
          </div>
          <div class="col-sm-6">
            <label>Faskes</label>
            <select class="form-control form-control-xs" id="rwjfaskesrujuk">
              <option value="1">Faskes 1</option>
              <option value="2">Faskes 2</option>
            </select>
          </div>
          <div class="col-sm-6">
            <label>Tujuan Rujuk</label>
            <input id="rwjrstujuanrujuk" name="rwjrstujuanrujuk" class="form-control form-control-xs" onkeypress="carirstujuan(event)">
            <div id="Divtampilrstujuanrujuk" ></div>
          </div>
          <div class="col-sm-6">
            <label>Poli Rujukan</label>
            <input id="rwjpolitujuanrujuk" name="rwjpolitujuanrujuk" class="form-control form-control-xs" onkeypress="caripolirujukan(event)">
            <div id="Divtampilpolitujuanrujuk" ></div>
          </div>
          <div class="col-sm-6" id="CreateSepIrjaTujuanKontrol">
            <label>Catatan</label>
            <textarea type="text" name="rwjketeranganrujuk" id="rwjketeranganrujuk" class="form-control form-control-xs"></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer p-1">
        <button type="button" class="btn btn-success btn-sm" onclick="SimpanRujukanPasienIrja()"><i class="fas fa-save"></i> Simpan </button>
        <button type="button" class="btn btn-success btn-sm" onclick="$('#ModalRujukPxIrja').modal('hide')"><i class="fas fa-save"></i> Close</button>
      </div>
    </div>

  </div>

</div>
<!-- modal update skdp -->
<div class="modal fade" id="ModalUpdateSkdp" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header p-1">
        <h4 class="modal-title">UPDATE SKDP</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row" >
          <div class="col-sm-6">
            <label>No SKDP</label>
            <input type="text" class="form-control form-control-xs" name="rwjskdpupdate" id="rwjskdpupdate" readonly>  
          </div>
          <div class="col-sm-6">
            <label>TGL Kontrol</label>
            <input type="date" class="form-control form-control-xs" name="rwjtglkontrolupdate" id="rwjtglkontrolupdate"> 
            <div id="Divtampilrujukanrwj"></div> 
          </div>
          <div class="col-sm-6">
            <label>Poli Tujuan</label>
            <input type="hidden" class="form-control form-control-xs" name="rwjpolikontrolupdate" id="rwjpolikontrolupdate" onkeypress="">  
            <input type="text" class="form-control form-control-xs" name="idrwjpolikontrolupdate" id="idrwjpolikontrolupdate" readonly>
          </div>
          <div class="col-sm-6">
            <label>DPJP</label>
            <input type="hidden" class="form-control form-control-xs" name="rwjdpjpkontrolupdate" id="rwjdpjpkontrolupdate" >  
            <input type="text" class="form-control form-control-xs" name="idrwjdpjpkontrolupdate" id="idrwjdpjpkontrolupdate" readonly>
            <input type="hidden" name="idrwjsepkontrolupdate" id="idrwjsepkontrolupdate">
          </div>
        </div>
      </div>
      <div class="modal-footer p-1">
        <button type="button" class="btn btn-success btn-sm" onclick="prosesUpdateskdp()"><i class="fas fa-save"></i> Update</button>
        <button type="button" class="btn btn-success btn-sm" onclick="$('#ModalUpdateSkdp').modal('hide')"><i class="fas fa-save"></i> Close</button>
      </div>
    </div>

  </div>

</div>
<!-- modal cari skdp -->
<div class="modal" id="modalTampilSKDP" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Riwayat SKDP</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">SKDP</th>
              <th scope="col">Klinik</th>
              <th scope="col">Rujukan</th>
              <th scope="col">Tanggal</th>
            </tr>
          </thead>
          <tbody id="listskdp">
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="RWJpendaf_ModalCariDataSEP" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Data SEP</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row" >
          <div class="card-body p-1" id="DivPendafRWJ" >
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="pill" href="#rwjpendafrwjdatabpjspasien" onclick="rwjpendafrwjdatabpjspasien()">Detail Data BPJS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="pill" onclick="rwjpendafhistorisep()" href="#rwjpendafhistorisep">History SEP</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="pill" onclick="CekListRencanaKontrol()" href="#rwjpendafhistorirencanakontrol">Data Rencana Kontrol</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="pill" onclick="CekListFinger()" href="#rwjpendaflistfinger">Finger</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="pill" onclick="CekListRujukanKeluar()" href="#rwjpendafhistorirujukankeluar">Rujukan Keluar</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="tab-content">
          <div class="tab-pane p-2 fade active show" id="rwjpendafrwjdatabpjspasien" role="tabpanel">
            <div class="tab-custom-content">
              <p class="lead mb-0"></p>
            </div>              
            <div class="card ">
              <div class="card-body p-2" >
               <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Data Pasien</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody id="DivpendafrwjDetailPesertaBPJS">
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="tab-pane  fade" id="rwjpendafhistorisep" role="tabpanel" >
          <div class="tab-custom-content">
            <p class="lead mb-0"></p>
          </div>              
          <div class="card ">
            <div class="card-body p-2" >
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
                <tbody id="tbodyrwjpendafhistorisep">

                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="tab-pane  fade" id="rwjpendafhistorirencanakontrol" role="tabpanel" >
          <div class="tab-custom-content">
            <p class="lead mb-0"></p>
          </div>              
          <div class="card ">
            <div class="card-body p-2" >
              <table class="table table-striped table-sm choose" style="border-collapse: inherit;">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Klinik</th>
                    <th>Dokter</th>
                    <th style="width: 80px">Terpakai</th>
                    <th>Tgl Pembuatan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody id="tbodyrwjpendafhistorirencanakontrol">

                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="tab-pane  fade" id="rwjpendafhistorirujukankeluar" role="tabpanel" >
          <div class="tab-custom-content">
            <p class="lead mb-0"></p>
          </div>              
          <div class="card ">
            <div class="card-body p-2" >
              <table class="table table-striped table-sm choose" style="border-collapse: inherit;">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Klinik</th>
                    <th>Dokter</th>
                    <th style="width: 80px">Terpakai</th>
                    <th>Tgl Pembuatan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody id="tbodyrwjpendafhistorirujukankeluar">

                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="tab-pane  fade" id="rwjpendaflistfinger" role="tabpanel" >
          <div class="tab-custom-content">
            <p class="lead mb-0"></p>
          </div>              
          <div class="card ">
            <div class="card-body p-2" >
              <table class="table table-striped table-sm choose" style="border-collapse: inherit;">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>NOKA</th>
                    <th>NO SEP</th>
                  </tr>
                </thead>
                <tbody id="tbodyrwjpendaflistfinger">

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>

</div>
<script type="text/javascript">
  var nowday      = "<?php echo $nowday; ?>";
  document.getElementById('rwjpendaftglkunjungan').value = nowday;

  /*$('.js-mySelect2').select2({
    dropdownCssClass: "custom-dropdown"
    }).on("select2:open", function(e) {
    var self = $(this);
    self.on('keyup', function() {
      console.log('ini' + self.val());
      document.getElementById("rwjpendafdiagnosa").focus();
    })
    self.on('change',function(){
      console.log('ini' + self.val());
    })
    self.on('click',function(){
      console.log('ini' + self.val());
      document.getElementById("rwjpendafdiagnosa").focus();
    })
    self.on('click',function(){
      document.getElementById("rwjpendafdiagnosa").focus();
    })
  });
  $(document).on('keyup', '.custom-dropdown .select2-search__field', function(ev) {
    var self = $(this);
    if (self.val().length > 1) {
      console.log('itu' + self.val());
      tampil_diagnosa(self.val());
    }
  });
  */
  
  /*--- FUNGSI SELECT 2 DIAGNOSA --*/
  var data_pasien_pendaftaran_igd = {
    no_rm:'',
    kd_kelurahan:'',
    kd_pendidikan:'',
    kd_pekerjaan:'',
    kd_perusahaan:'',
    kd_agama:'',
    nama:'',
    tgl_lahir:'',
    gol_darah:'',
    jenis_kelamin:'',
    status_hidup:'',
    statusmarital:'',
    alamat:'',
    kota:'',
    telepon:'',
    kd_pos:'',
    jabatan:'',
    tanda_pengenal:'',
    nik:'',
    keterangan:'',
    kode_lama:'',
    wni:'',
    nama_keluarga:'',
    tempat_lahir:'',
    pemegang_asuransi:'',
    no_reg_lama:'',
    kd_suku:'',
    ket_simpan:'',
    handphone:'',
    email:'',
    nama_ayah:'',
    nama_ibu:'',
    suami_istri:'',
    alamat_ktp:'',
    kd_pos_ktp:'',
    kd_kelurahan_ktp:'',
    kd_pendidikan_ayah:'',
    kd_pendidikan_ibu:'',
    kd_pendidikan_suamiistri:'',
    kd_pekerjaan_ayah:'',
    kd_pekerjaan_ibu:'',
    kd_pekerjaan_suamiistri:''
  };

  $(document).ready(function() {
    $(".rwjpendafdiagnosa").select2({
      placeholder: "Ketikan Kode Diagnosa",
      allowClear: true
    });
  });
  function tampilagamapendfirja() {
    apiPOST('Data_Sosial/agama', null,hasil=>{
      var agama='';
      var a=hasil['data'];
      agama = ""
      for (var i = 0; i < a.length; i++) {
        agama+='<option value="'+a[i]['kd_agama']+'">'+a[i]['agama']+'</option>';
      }
      document.getElementById('rwjpendafagama').innerHTML=agama;
    });
  }
  $(document).on('keyup', '.select2-search__field', function(ev) {
    var self = $(this);
    if (self.val().length > 1) {
      tampil_diagnosa(self.val());
    }
  });
  
  $(document).on('keydown', '.select2-search__field', function(event) {  
    switch(event.which){
    case 13:
      $("#rwjpendafdokter").trigger('focus');
      break;
    }
  });

  $('#rwjpendafdiagnosa').on('select2:selecting', function(e) {
    switch(e.which){
    case 13:
      $("#rwjpendafdokter").trigger('focus');
      break;
    }
  });

  $('#rwjpendafdiagnosa').on('select2:select', function(e) {
    $("#rwjpendafdokter").trigger('focus');
  });

  $('#rwjpendafdiagnosa').on('select2:clearing', function(e) {
    return 'Ketikan Kode Diagnosa';
  });

  /*--- END FUNGSI SELECT 2 DIAGNOSA --*/
  
  $('#searchpendfrwj').show();
  $('#RWJpend_nm_pasiencari').hide();
  $("#rwj_pendf_buttonPasienBaru").hide();

  function closemodalcreatesep() {
   document.getElementById('rwjpendafnorujukan').value='';
   document.getElementById('rwjpendafklinikbpjs').value='';
   document.getElementById('rwjpendafdokterbpjs').value='';
   document.getElementById('rwjpendaftampilskdp').value='';
   document.getElementById('rwjpendaftampilrencanakontrol').value='';
   $('#ModalCreateSEP').modal("hide");
 }

 function tampilmodalcreateseprwj(e) {
   if (e.keyCode == 13) {
    $('#ModalCreateSEP').modal("show");

    getMapUnitBpjs();
    dpjpBPJS();
    document.getElementById('rwjpendafnokartu').focus();
    document.getElementById('rwjpendafnokartu').value=document.getElementById('rwjpendafnoasuransi').value;

  }
}
function tujuanKunjungan() {
 if (document.getElementById('rwjpendaftujuankontrol').value=='2') {
    //document.getElementById('CreateSepIrjaProsedur').style.display='block';
    //document.getElementById('CreateSepIrjaPenunjang').style.display='block';
  document.getElementById('CreateSepIrjaAssesmenPelayanan').style.display='block';
} else if(document.getElementById('rwjpendaftujuankontrol').value=='1'){
  document.getElementById('CreateSepIrjaProsedur').style.display='block';
}else{
  document.getElementById('CreateSepIrjaProsedur').style.display='none';
}
}
function flagProcedure() {
  if (document.getElementById('rwjpendafprosedur').value=='1') {
    document.getElementById('CreateSepIrjaPenunjang').style.display='block';
  } else {
    document.getElementById('CreateSepIrjaPenunjang').style.display='none';
  }
}

function tampil_diagnosa(kode) {
  var param = {
    id: kode
  };
  apiPOST('Data_Sosial/diagnosabyname', param, hasil => {
    var penjamin = '';
    var a = hasil['data'];
    for (var i = 0; i < a.length; i++) {
      penjamin += '<option value="' + a[i]['id_penyakit'] + '">' + a[i]['id_penyakit'] + ' | ' + a[i]['penyakit'] + '</option>';
    }
    document.getElementById('rwjpendafdiagnosa').innerHTML = penjamin;
  });
}
function listdiagnosarujuk(e) {
 if (e.keyCode == 13) {
  var param = {
    id: document.getElementById('rwjdiagnosarujuk').value,
  };
  apiPOST('Data_Sosial/diagnosabyname', param, hasil => {
    var penjamin = '';
    var a = hasil['data'];
    for (var i = 0; i < a.length; i++) {
      penjamin += '<button class="btn btn-primary" onclick="pilihicdrujuk(`' + a[i]['id_penyakit'] + '`);" >' + a[i]['id_penyakit'] + '|' + a[i]['penyakit'] + '</button>';
    }
    document.getElementById('DivtampilIcdRujuk').style.display = 'block';
    document.getElementById('DivtampilIcdRujuk').innerHTML = penjamin;
  });
}
}
function pilihicdrujuk(kode) {
  document.getElementById('DivtampilIcdRujuk').style.display = 'none';
  document.getElementById('rwjdiagnosarujuk').value = kode;
}
function Rujukpasienirja(sep) {
  $('#RWJpendaf_ModalCariDataSEP').modal("hide");
  $('#ModalRujukPxIrja').modal('show');
  document.getElementById('rwjseprujuk').value=sep;

}
function SimpanRujukpasienirja() {
  var param = {
    id: kode
  };
  apiPOST('Bridging/InsertRujukan', param, hasil => {
    var penjamin = '';
    var a = hasil['data'];
    for (var i = 0; i < a.length; i++) {
      penjamin += '<option value="' + a[i]['id_penyakit'] + '">' + a[i]['id_penyakit'] + ' | ' + a[i]['penyakit'] + '</option>';
    }
    document.getElementById('rwjpendafdiagnosa').innerHTML = penjamin;
  });
}
function CreateRencanaKontrol(e) {
  if (e.keyCode == 13) {
    if (document.getElementById('rwjpendafklinikbpjs').value != document.getElementById('rwjpendafklinikRS').value) {
      document.getElementById('rwjpendaftampilrencanakontrol').value=0;
      alert('tidak perlu SKDP, langsung buat sep');
    } else {
      var param ={
        no_rujukan: document.getElementById('rwjpendafnorujukan').value,
        noka      : document.getElementById('rwjpendafnoasuransi').value,
        unitbpjs      : document.getElementById('rwjpendafklinikRS').value,
        unitrs      : document.getElementById('rwjpendafpoliklinik').value,
        dokter    : document.getElementById('rwjpendafdokterbpjs').value,
        skdp      : document.getElementById('rwjpendaftampilskdp').value
      };
      apiPOST('Bridging/CreateRencanaKontrol', param, hasil => {
        var penjamin = '';
        var a = hasil['data']['noSuratKontrol'];
        document.getElementById('rwjpendaftampilrencanakontrol').value = a;
      });
    }
  }
}
function cekhistori(e) {
  if (e.keyCode == 13) {
    var dpjp =document.getElementById('rwjpendafdokterbpjs').value;
    if (dpjp =="" || dpjp == "0" || dpjp == 0) {   
      alert('Dokter Belum dipilih!!');   
    } else {
      if (document.getElementById('rwjpendafklinikbpjs').value != document.getElementById('rwjpendafklinikRS').value) {
        document.getElementById('rwjpendaftampilrencanakontrol').value=0;
        alert('tidak perlu SKDP, langsung buat sep');
      } else {

        var param = {
          noka    :document.getElementById('rwjpendafnokartu').value,
          rujukan :document.getElementById('rwjpendafnorujukan').value,
        };
        apiPOST('Bridging/CariSep',param, hasil => {
          if (hasil['code']!='200') {

            alert(hasil['pesan']);
            
          } else {

            var b=hasil['histori'];
            var a='';
            for (var i = 0; i < 5; i++) {
              a+='<button class="btn btn-primary" style="width:100%;"  onclick="pendafrwjHistori(`'+b[i]['noSep']+'`,`'+b[i]['tglSep']+'`)" >'+b[i]['noSep']+' ('+b[i]['poli']+')</button>';

            }
          }

          document.getElementById('DivtampilSEP').style.display="block";
          document.getElementById('DivtampilSEP').innerHTML=a;

        });

      }

    }
    
  }
}

function pendafrwjHistori(sep,tgl) {
  document.getElementById('rwjpendaftampilskdp').focus();
  document.getElementById('DivtampilSEP').style.display="none";
  document.getElementById('rwjpendaftampilskdp').value=sep;
  document.getElementById('rwjpendaftampilrencanakontrol').value='';
  document.getElementById('tglsepasal').value=tgl;


}
function pekerjaanAyah(e) {
  if (e.keyCode==13) {
    event.preventDefault();
    document.getElementById('rwjpendafpekerjaanayah').focus();
  }
}
function pendidikanAyah(e) {
  if (e.keyCode==13) {
    event.preventDefault();
    document.getElementById('rwjpendafpendidikanayah').focus();
  }
}
function namaIbu(e) {
  if (e.keyCode==13) {
    event.preventDefault();
    document.getElementById('rwjpendafibu').focus();
  }
}
function pekerjaanIbu(e) {
  if (e.keyCode==13) {
    event.preventDefault();
    document.getElementById('rwjpendafpekerjaanibu').focus();
  }
}
function pendidikanIbu(e) {
  if (e.keyCode==13) {
    event.preventDefault();
    document.getElementById('rwjpendafpendidikanibu').focus();
  }
}
function hubpenanggujawab(e) {
  if (e.keyCode==13) {
    event.preventDefault();
    document.getElementById('rwjpendafhubpenanggungjawab').focus();
  }
}
function Penanggungjawab(e) {
  if (e.keyCode==13) {
    event.preventDefault();
    document.getElementById('rwjpendafnikpenanggungjawab').focus();
  }
}
function Penanggungjawabnik(e) {
  if (e.keyCode==13) {
    event.preventDefault();
    document.getElementById('rwjpendafalamatpenanggungjawab').focus();
  }
  // body...
}
function Penanggungjawabtlfn(e) {
  if (e.keyCode==13) {
    event.preventDefault();
    document.getElementById('rwjpendaftlfpenanggungjawab').focus();
  }
}
function rwjpendafpoliklinik(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  document.getElementById('rwjpendafkelompokpasien').focus();
}

}
function getMapUnitBpjs() {
  var param={
    id:$("#rwjpendafpoliklinik").val(),
  };
  apiPOST('Bridging/cariUnit',param, hasil => {
    var b=hasil['data'];
    document.getElementById('rwjpendafklinikRS').value=b;
  });
}
function rwjpendafkelompokpasien(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  document.getElementById('rwjpendafPenjamin').focus();
}
}

function rwjpendafPenjamin(e) {
  if (e.keyCode == 13) {
    event.preventDefault();
    document.getElementById('rwjpendafdiagnosa').focus();
    tampil_noka();
  }
}

function rwjpendafdiagnosa(e) {
  if (e.keyCode == 13) {
    event.preventDefault();
    document.getElementById('rwjpendafdokter').focus();
  }
}
function rwjpendafdokter(e) {
  if (e.keyCode == 13) {
    event.preventDefault();
    document.getElementById('rwjpendafnoasuransi').focus();
    dpjpBPJS();
  }
}
function CreateSepIrja() {
  var param = {
    noka    :   $("#rwjpendafnokartu").val(),
    rujukan :   $("#rwjpendafnorujukan").val(),
    dpjp    :   $("#rwjpendafdokterbpjs").val(),
    polibpjs:   $("#rwjpendafklinikbpjs").val(),
    polirs  :   $("#rwjpendafklinikRS").val(),
    tglRujukan: $("#tglRujukan").val(),
    ppk     :   $("#ppk").val(),
    diagnosa:   $("#rwjpendafdiagnosa").val(),
    skdp    :   $("#rwjpendaftampilrencanakontrol").val(),
    tujuankunj    : $("#rwjpendaftujuankontrol").val(),
    prosedurkunj  : $("#rwjpendafprosedur").val(),
    penunjangkunj : $("#rwjpendafpenunjang").val(),
    assesmenkunj  : $("#rwjpendafAssesmenPelayanan").val(),
    postmrs       : 0,
  };
  apiPOST('Bridging/CreateSEPIrja', param, hasil => {
   if (hasil['status']=='sukses') {
    document.getElementById('rwjpendafSEP').value=hasil['data']['sep']['noSep'];
    $('#ModalCreateSEP').modal('hide');
  }else{
    alert(hasil['pesan']);
  }

})
}
function CreateSepIrjaPostMrs() {
  var param = {
    noka    :   $("#rwjpendafnokartu").val(),
    rujukan :   $("#rwjpendafnorujukan").val(),
    dpjp    :   $("#rwjpendafdokterbpjs").val(),
    polibpjs:   $("#rwjpendafklinikbpjs").val(),
    polirs  :   $("#rwjpendafklinikRS").val(),
    tglRujukan : $("#tglRujukan").val(),
    ppk        : $("#ppk").val(),
    diagnosa   : $("#rwjpendafdiagnosa").val(),
    skdp       : $("#rwjpendaftampilrencanakontrol").val(),
    tujuankunj   : $("#rwjpendaftujuankontrol").val(),
    prosedurkunj : $("#rwjpendafprosedur").val(),
    penunjangkunj: $("#rwjpendafpenunjang").val(),
    assesmenkunj : $("#rwjpendafAssesmenPelayanan").val(),
    postmrs      :1,
  };
  apiPOST('Bridging/CreateSEPIrja', param, hasil => {
   if (hasil['status']=='sukses') {
    document.getElementById('rwjpendafSEP').value=hasil['data']['sep']['noSep'];
    $('#ModalCreateSEP').modal('hide');
  }else{
    alert(hasil['pesan']);
  }

})
}
function show_cri_normpendfRWJ(){
  $('#searchpendfrwj').show();
  $('#RWJpend_nm_pasiencari').hide();
  $("#searchpendfrwj").trigger('focus');
}

function show_cri_nmpasienpendfRWJ(){
  $('#searchpendfrwj').hide();
  $('#RWJpend_nm_pasiencari').show();
  $("#RWJpend_nm_pasiencari").trigger('focus');
}
function refresh_pendft_rwj() {
  $('#RWJpend_loadingawal').hide();
}

setTimeout(refresh_pendft_rwj, 1000);  

$(document).ready(function() {
  tampil_pendfrwjprov();
  tampil_pendfrwjprovktp();
  tampil_pendfrwjpendidikan();
  tampil_pendfrwjpekerjaan();
  RujukanAsal(1);
  time();
  unit();
  pegawai();
  tampilagamapendfirja();
  function time() {
    var date = new Date();

    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();

    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;

    var today = year + "-" + month + "-" + day;       
    document.getElementById("rwjpendaftanggallahir").value = today;
  }

  $('#asal_pasien').on('change', function() {
    $("#rujukandariluar").show();
  });

  function refresh_pendft_rwi() {
    $('#loading_pend_rwi').hide();
  }

  setTimeout(refresh_pendft_rwi, 1000);

});
function pendafrwjupdatedata() {
  document.getElementById("buttoncanceldata").style.display='inline-block';
  document.getElementById("buttoneditdata").style.display='none';
  document.getElementById("updatedatapasien").value='1';
  document.getElementById("rwjpendafnamapasien").removeAttribute('readonly');
  document.getElementById("rwjpendafkeluarga").removeAttribute('readonly');
  document.getElementById("rwjpendafagama").removeAttribute('readonly');
  document.getElementById("rwjpendafgoldarah").removeAttribute('readonly');
  document.getElementById("rwjpendafkelamin").removeAttribute('readonly');
  document.getElementById("rwjpendafstatusmarital").removeAttribute('readonly');
  document.getElementById("rwjpendaftempatlahir").removeAttribute('readonly');
  document.getElementById("rwjpendaftanggallahir").removeAttribute('readonly');
  document.getElementById("rwjpendafnik").removeAttribute('readonly');
  document.getElementById("rwjpendafpendidikan").removeAttribute('readonly');
  document.getElementById("rwjpendafpekerjaan").removeAttribute('readonly');
  document.getElementById("rwjpendaftelepon").removeAttribute('readonly');
  document.getElementById("rwjpendafwni").removeAttribute('readonly');
  document.getElementById("rwjpendafalamat").removeAttribute('readonly');
  document.getElementById("rwjpendafpropinsi").removeAttribute('readonly');
  document.getElementById("rwjpendafkab").removeAttribute('readonly');
  document.getElementById("rwjpendafkec").removeAttribute('readonly');
  document.getElementById("rwjpendafkelurahan").removeAttribute('readonly');
  document.getElementById("rwjpendafkdpos").removeAttribute('readonly');
  document.getElementById("rwjpendafpropinsiktp").removeAttribute('readonly');
  document.getElementById("rwjpendafkabktp").removeAttribute('readonly');
  document.getElementById("rwjpendafkecktp").removeAttribute('readonly');
  document.getElementById("rwjpendafkelurahanktp").removeAttribute('readonly');
  document.getElementById("rwjpendafkdposktp").removeAttribute('readonly');
  document.getElementById("rwjpendafalamatktp").removeAttribute('readonly');

}
function pendafrwjcanceldata() {
  document.getElementById("buttoncanceldata").style.display='none';
  document.getElementById("buttoneditdata").style.display='inline-block';
  //RESET//
  document.getElementById("rwjpendafkdpasien").value=data_pasien_pendaftaran_igd['no_rm'];
  document.getElementById("rwjpendafnamapasien").value=data_pasien_pendaftaran_igd['nama'];
  document.getElementById("rwjpendafkeluarga").value= data_pasien_pendaftaran_igd['nama_keluarga'];
  document.getElementById("rwjpendafkdpasien").value=data_pasien_pendaftaran_igd['kd_agama'];
  document.getElementById("rwjpendafagama").value=data_pasien_pendaftaran_igd['kd_agama'];
  document.getElementById("rwjpendafnik").value=data_pasien_pendaftaran_igd['nik'];
  document.getElementById("rwjpendafkelamin").value=data_pasien_pendaftaran_igd['jenis_kelamin'];
  document.getElementById("rwjpendafstatusmarital").value=data_pasien_pendaftaran_igd['statusmarital'];
  document.getElementById("rwjpendaftempatlahir").value=data_pasien_pendaftaran_igd['tempat_lahir'];
  document.getElementById("rwjpendaftanggallahir").value=data_pasien_pendaftaran_igd['tgl_lahir'];
  document.getElementById("rwjpendafpendidikan").value=data_pasien_pendaftaran_igd['kd_pendidikan'];
  document.getElementById("rwjpendafpekerjaan").value=data_pasien_pendaftaran_igd['kd_pekerjaan'];
  document.getElementById("rwjpendaftelepon").value=data_pasien_pendaftaran_igd['telepon'];
  document.getElementById("rwjpendafwni").value=data_pasien_pendaftaran_igd['wni'];
  document.getElementById("rwjpendafalamat").value=data_pasien_pendaftaran_igd['alamat'];
  document.getElementById("rwjpendafpropinsi").value=data_pasien_pendaftaran_igd['kd_propinsi'];
  document.getElementById("rwjpendafkdpos").value=data_pasien_pendaftaran_igd['kd_pos'];
  document.getElementById("rwjpendafkdposktp").value=data_pasien_pendaftaran_igd['kd_pos_ktp'];

  //END RISET//
  document.getElementById("rwjpendafnamapasien").setAttribute('readonly', true);
  document.getElementById("rwjpendafkeluarga").setAttribute('readonly', true);
  document.getElementById("rwjpendafagama").setAttribute('readonly', true);
  document.getElementById("rwjpendafgoldarah").setAttribute('readonly', true);
  document.getElementById("rwjpendafkelamin").setAttribute('readonly', true);
  document.getElementById("rwjpendafstatusmarital").setAttribute('readonly', true);
  document.getElementById("rwjpendaftempatlahir").setAttribute('readonly', true);
  document.getElementById("rwjpendaftanggallahir").setAttribute('readonly', true);
  document.getElementById("rwjpendafnik").setAttribute('readonly', true);
  document.getElementById("rwjpendafpendidikan").setAttribute('readonly', true);
  document.getElementById("rwjpendafpekerjaan").setAttribute('readonly', true);
  document.getElementById("rwjpendaftelepon").setAttribute('readonly', true);
  document.getElementById("rwjpendafwni").setAttribute('readonly', true);
  document.getElementById("rwjpendafalamat").setAttribute('readonly', true);
  document.getElementById("rwjpendafpropinsi").setAttribute('readonly', true);
  document.getElementById("rwjpendafkab").setAttribute('readonly', true);
  document.getElementById("rwjpendafkec").setAttribute('readonly', true);
  document.getElementById("rwjpendafkelurahan").setAttribute('readonly', true);
  document.getElementById("rwjpendafkdpos").setAttribute('readonly', true);
  document.getElementById("rwjpendafpropinsiktp").setAttribute('readonly', true);
  document.getElementById("rwjpendafkabktp").setAttribute('readonly', true);
  document.getElementById("rwjpendafkecktp").setAttribute('readonly', true);
  document.getElementById("rwjpendafkelurahanktp").setAttribute('readonly', true);
  document.getElementById("rwjpendafkdposktp").setAttribute('readonly', true);
}
function savependfrwj() {

  if (document.getElementById('rwjpendafwni').checked =true) {
    var wni=true;
  } else {
    var wni=false;
  }
  if($("#rwjpendafPenjamin").val()=='2' && $("#rwjpendafSEP").val()==''){
    alert('Nomor SEP Kosong');
    return;
  }else{
    var param = {
      no_rm:          $("#rwjpendafkdpasien").val(),     
      namapasien:     $("#rwjpendafnamapasien").val(),
      keluarga:       $("#rwjpendafkeluarga").val(),
      agama:          $("#rwjpendafagama").val(),
      goldarah:       $("#rwjpendafgoldarah").val(),
      kelamin:        $("#rwjpendafkelamin").val(),
      statusmarital:  $("#rwjpendafstatusmarital").val(),
      tempatlahir:    $("#rwjpendaftempatlahir").val(),
      tanggallahir:   $("#rwjpendaftanggallahir").val(),
      nik:            $("#rwjpendafnik").val(),
      pendidikan:     $("#rwjpendafpendidikan").val(),
      pekerjaan:      $("#rwjpendafpekerjaan").val(),
      telepon:        $("#rwjpendaftelepon").val(),
      wni:            wni,
      alamat:         $("#rwjpendafalamat").val(),
      propinsi:       $("#rwjpendafpropinsi").val(),
      kabupaten:      $("#rwjpendafkab").val(),
      kecamatan:      $("#rwjpendafkec").val(),
      kelurahan:      $("#rwjpendafkelurahan").val(),
      kdpos:          $("#rwjpendafkdpos").val(),
      alamatktp:      $("#rwjpendafalamatktp").val(),
      propinsiktp:    $("#rwjpendafpropinsiktp").val(),
      kabupatenktp:   $("#rwjpendafkabktp").val(),
      kecamatanktp:   $("#rwjpendafkecktp").val(),
      kelurahanktp:   $("#rwjpendafkelurahanktp").val(),
      kdposktp:       $("#rwjpendafkdposktp").val(),
      tglkunjungan:   $("#rwjpendaftglkunjungan").val(),
      nama_penanggung_jawab:          $("#rwjpendafpenanggungjawab").val(),
      hubungan_penanggung_jawab:      $("#rwjpendafhubpenanggungjawab").val(),
      id_penanggung_jawab:            $("#rwjpendafnikpenanggungjawab").val(),
      alamatpenanggungjawab:          $("#rwjpendafalamatpenanggungjawab").val(),
      no_hp_penanggung_jawab:         $("#rwjpendaftlfpenanggungjawab").val(),
      ayah:                           $("#rwjpendafayah").val(),
      pekerjaanayah:                  $("#rwjpendafpekerjaanayah").val(),
      pendidikanayah:                 $("#rwjpendafpendidikanayah").val(),
      ibu:                            $("#rwjpendafibu").val(),
      pekerjaanibu:                   $("#rwjpendafpekerjaanibu").val(),
      pendidikanibu:                  $("#rwjpendafpendidikanibu").val(),
      id_user:                        user.id_user,
      id_unit:                        $("#rwjpendafpoliklinik").val(),
      diagnosa:                       $("#rwjpendafdiagnosa").val(),
      id_pegawai:                     $("#rwjpendafdokter").val(),   
      caraterima:                     $("#rwj_pendf_caraterima").val(), 
      rujukan:                        $("#rwjpendaftempatrujukan").val(),  
      noka:                           $("#rwjpendafnoasuransi").val(),       
      id_penjamin:                    $("#rwjpendafPenjamin").val(),   
      no_sjp:                         $("#rwjpendafSEP").val()

    };
    if ($("#rwjpendafkdpasien").val() > '' && $("#updatedatapasien").val()=='0') {
      apiPOST("Kunjungan/addKunjungan", param, hasil =>{
      });
    } else if( $("#updatedatapasien").val()=='1'){
     apiPOST("Rawatjalan/updatepasienrwj", param, hasil => {
      if (hasil['pesan']=='Berhasil') {
        //document.getElementById('rwjpendafkdpasien').value=hasil['no_rm'];
        var param = {      
          no_rm:          $("#rwjpendafkdpasien").val(),     
          namapasien:     $("#rwjpendafnamapasien").val(),
          keluarga:       $("#rwjpendafkeluarga").val(),
          agama:          $("#rwjpendafagama").val(),
          goldarah:       $("#rwjpendafgoldarah").val(),
          kelamin:        $("#rwjpendafkelamin").val(),
          statusmarital:  $("#rwjpendafstatusmarital").val(),
          tempatlahir:    $("#rwjpendaftempatlahir").val(),
          tanggallahir:   $("#rwjpendaftanggallahir").val(),
          nik:            $("#rwjpendafnik").val(),
          pendidikan:     $("#rwjpendafpendidikan").val(),
          pekerjaan:      $("#rwjpendafpekerjaan").val(),
          telepon:        $("#rwjpendaftelepon").val(),
          wni:            $("#rwjpendafwni").val(),
          alamat:         $("#rwjpendafalamat").val(),
          propinsi:       $("#rwjpendafpropinsi").val(),
          kabupaten:      $("#rwjpendafkab").val(),
          kecamatan:      $("#rwjpendafkec").val(),
          kelurahan:      $("#rwjpendafkelurahan").val(),
          kdpos:          $("#rwjpendafkdpos").val(),
          alamatktp:      $("#rwjpendafalamatktp").val(),
          propinsiktp:    $("#rwjpendafpropinsiktp").val(),
          kabupatenktp:   $("#rwjpendafkabktp").val(),
          kecamatanktp:   $("#rwjpendafkecktp").val(),
          kelurahanktp:   $("#rwjpendafkelurahanktp").val(),
          kdposktp:       $("#rwjpendafkdposktp").val(),
          tglkunjungan:   $("#rwjpendaftglkunjungan").val(),
          nama_penanggung_jawab:          $("#rwjpendafpenanggungjawab").val(),
          hubungan_penanggung_jawab:      $("#rwjpendafhubpenanggungjawab").val(),
          id_penanggung_jawab:            $("#rwjpendafnikpenanggungjawab").val(),
          alamatpenanggungjawab:          $("#rwjpendafalamatpenanggungjawab").val(),
          no_hp_penanggung_jawab:         $("#rwjpendaftlfpenanggungjawab").val(),
          ayah:                           $("#rwjpendafayah").val(),
          pekerjaanayah:                  $("#rwjpendafpekerjaanayah").val(),
          pendidikanayah:                 $("#rwjpendafpendidikanayah").val(),
          alamat_ayah:                    $("#rwjpendafalamatayah").val(),
          nik_ayah:                       $("#rwjpendafnikayah").val(),
          tlfn_ayah:                      $("rwjpendaftlfayah").val(),
          ibu:                            $("#rwjpendafibu").val(),
          alamat_ibu:                     $("#rwjpendafalamatibu").val(),
          pekerjaanibu:                   $("#rwjpendafpekerjaanibu").val(),
          pendidikanibu:                  $("#rwjpendafpendidikanibu").val(),
          nik_ibu:                        $("#rwjpendafnikibu").val(),
          tlfn_ibu:                       $("rwjpendaftlfibu").val(),
          id_user:                        user.id_user,
          id_unit:                        $("#rwjpendafpoliklinik").val(),
          id_pegawai:                     $("#rwjpendafdokter").val(), //rwjpendafdiagnosa
          diagnosa:                       $("#rwjpendafdiagnosa").val(),
          caraterima:                     $("#rwj_pendf_caraterima").val(), 
          rujukan:                        $("#rwjpendaftempatrujukan").val(),
          noka:                           $("#rwjpendafnoasuransi").val(), 
          id_penjamin:                    $("#rwjpendafPenjamin").val(),   
          no_sjp:                         $("#rwjpendafSEP").val()
        };
        apiPOST("Kunjungan/addKunjungan", param, hasil =>{

        });
      } else {
        alert(hasil['pesan']); 
      }     
    });
   } else {
    apiPOST("Rawatjalan/simpanpasienrwj", param, hasil => {
      if (hasil['pesan']=='Berhasil') {
        document.getElementById('rwjpendafkdpasien').value=hasil['no_rm'];
        var param = {      
          no_rm:          $("#rwjpendafkdpasien").val(),     
          namapasien:     $("#rwjpendafnamapasien").val(),
          keluarga:       $("#rwjpendafkeluarga").val(),
          agama:          $("#rwjpendafagama").val(),
          goldarah:       $("#rwjpendafgoldarah").val(),
          kelamin:        $("#rwjpendafkelamin").val(),
          statusmarital:  $("#rwjpendafstatusmarital").val(),
          tempatlahir:    $("#rwjpendaftempatlahir").val(),
          tanggallahir:   $("#rwjpendaftanggallahir").val(),
          nik:            $("#rwjpendafnik").val(),
          pendidikan:     $("#rwjpendafpendidikan").val(),
          pekerjaan:      $("#rwjpendafpekerjaan").val(),
          telepon:        $("#rwjpendaftelepon").val(),
          wni:            $("#rwjpendafwni").val(),
          alamat:         $("#rwjpendafalamat").val(),
          propinsi:       $("#rwjpendafpropinsi").val(),
          kabupaten:      $("#rwjpendafkab").val(),
          kecamatan:      $("#rwjpendafkec").val(),
          kelurahan:      $("#rwjpendafkelurahan").val(),
          kdpos:          $("#rwjpendafkdpos").val(),
          alamatktp:      $("#rwjpendafalamatktp").val(),
          propinsiktp:    $("#rwjpendafpropinsiktp").val(),
          kabupatenktp:   $("#rwjpendafkabktp").val(),
          kecamatanktp:   $("#rwjpendafkecktp").val(),
          kelurahanktp:   $("#rwjpendafkelurahanktp").val(),
          kdposktp:       $("#rwjpendafkdposktp").val(),
          tglkunjungan:   $("#rwjpendaftglkunjungan").val(),
          nama_penanggung_jawab:          $("#rwjpendafpenanggungjawab").val(),
          hubungan_penanggung_jawab:      $("#rwjpendafhubpenanggungjawab").val(),
          id_penanggung_jawab:            $("#rwjpendafnikpenanggungjawab").val(),
          alamatpenanggungjawab:          $("#rwjpendafalamatpenanggungjawab").val(),
          no_hp_penanggung_jawab:         $("#rwjpendaftlfpenanggungjawab").val(),
          ayah:                           $("#rwjpendafayah").val(),
          pekerjaanayah:                  $("#rwjpendafpekerjaanayah").val(),
          pendidikanayah:                 $("#rwjpendafpendidikanayah").val(),
          alamat_ayah:                    $("#rwjpendafalamatayah").val(),
          nik_ayah:                       $("#rwjpendafnikayah").val(),
          tlfn_ayah:                      $("rwjpendaftlfayah").val(),
          ibu:                            $("#rwjpendafibu").val(),
          alamat_ibu:                     $("#rwjpendafalamatibu").val(),
          pekerjaanibu:                   $("#rwjpendafpekerjaanibu").val(),
          pendidikanibu:                  $("#rwjpendafpendidikanibu").val(),
          nik_ibu:                        $("#rwjpendafnikibu").val(),
          tlfn_ibu:                       $("rwjpendaftlfibu").val(),
          id_user:                        user.id_user,
          id_unit:                        $("#rwjpendafpoliklinik").val(),
          id_pegawai:                     $("#rwjpendafdokter").val(), //rwjpendafdiagnosa
          diagnosa:                       $("#rwjpendafdiagnosa").val(),
          caraterima:                     $("#rwj_pendf_caraterima").val(), 
          rujukan:                        $("#rwjpendaftempatrujukan").val(),
          noka:                           $("#rwjpendafnoasuransi").val(), 
          id_penjamin:                    $("#rwjpendafPenjamin").val(),   
          no_sjp:                         $("#rwjpendafSEP").val()
        };
        apiPOST("Kunjungan/addKunjungan", param, hasil =>{

        });
      } else {
        alert(hasil['pesan']); 
      }     
    });
  }
}
}
function SimpanRujukanPasienIrja() {


  var param = {    
    keterangan  :  $("#rwjketeranganrujuk").val(),
    poli        :  $("#rwjpolitujuanrujuk").val(),
    tipe        :  $("#rwjtiperujuk").val(),
    diagnosa    :  $("#rwjdiagnosarujuk").val(),
    pelayanan   :  $("#rwjpelayananrujuk").val(),
    tgl         :  $("#rwjtglrujuk").val(),
    sep         :  $("#rwjseprujuk").val(),
    rs          :  $("#rwjrstujuanrujuk").val(),
    
  };
  apiPOST("Bridging/InsertRujukan", param, hasil =>{
  });
}
function pendafrwjcarisep() {

  $('#RWJpendaf_ModalCariDataSEP').modal("show");
}
function tampil_pendfrwjpekerjaan() {
  apiPOST('Data_Sosial/pekerjaan', null,hasil=>{
    var pekerjaan='';
    var a=hasil['data'];
    pekerjaan = ""
    for (var i = 0; i < a.length; i++) {
      pekerjaan+='<option value="'+a[i]['kd_pekerjaan']+'">'+a[i]['pekerjaan']+'</option>';
    }
    document.getElementById('rwjpendafpekerjaan').innerHTML=pekerjaan;
    document.getElementById('rwjpendafpekerjaanayah').innerHTML=pekerjaan;
    document.getElementById('rwjpendafpekerjaanibu').innerHTML=pekerjaan;
  });
}
function tampil_pendfrwjpendidikan() {
  apiPOST('Data_Sosial/pendidikan', null,hasil=>{
    var pendidikan='';
    var a=hasil['data'];
    pendidikan = ""
    for (var i = 0; i < a.length; i++) {
      pendidikan+='<option value="'+a[i]['kd_pendidikan']+'">'+a[i]['pendidikan']+'</option>';
    }
    document.getElementById('rwjpendafpendidikan').innerHTML=pendidikan;
    document.getElementById('rwjpendafpendidikanayah').innerHTML=pendidikan;
    document.getElementById('rwjpendafpendidikanibu').innerHTML=pendidikan;
  });
}
function tampil_pendfrwjprov() {

  apiPOST('Rawatjalan/propinsi', null,hasil=>{
    var prov='';
    var a=hasil['data'];
    for (var i = 0; i < a.length; i++) {
      prov+='<option value="'+a[i]['kd_propinsi']+'">'+a[i]['propinsi']+'</option>';
    }
    document.getElementById('rwjpendafpropinsi').innerHTML=prov;
  });
}

function RujukanAsal(kode) {
  var param = {id:kode,};
  apiPOST('Rawatjalan/rujukanAsal', param,hasil=>{
    var b='';
    var a=hasil['data'];
    for (var i = 0; i < a.length; i++) {
      b+='<option value="'+a[i]['cara_penerimaan']+'">'+a[i]['penerimaan']+'</option>';
    }
    document.getElementById('rwj_pendf_rujukandari').innerHTML=b;
  });
}

function Rujukan() {
  var param = {id:$('#rwj_pendf_rujukandari').val(),};
  apiPOST('Rawatjalan/rujukan', param,hasil=>{
    var b='';
    var a=hasil['data'];
    for (var i = 0; i < a.length; i++) {
      b+='<option value="'+a[i]['kd_rujukan']+'">'+a[i]['rujukan']+'</option>';
    }
    document.getElementById('rwjpendaftempatrujukan').innerHTML=b;
  });
}
function tampil_pendfrwjkota() {
  var param={id : $("#rwjpendafpropinsi").val(),};
  apiPOST('Rawatjalan/kota', param,hasil=>{
    var kab='';
    var a=hasil['data'];
    for (var i = 0; i < a.length; i++) {
      kab+='<option value="'+a[i]['kd_kabupaten']+'">'+a[i]['kabupaten']+'</option>';
    }
    document.getElementById('rwjpendafkab').innerHTML=kab;
  });
}
function tampil_pendfrwjkotaby(kode) {
  var param={id : kode,};
  apiPOST('Rawatjalan/kota', param,hasil=>{
    var kab='';
    var a=hasil['data'];
    for (var i = 0; i < a.length; i++) {
      kab+='<option value="'+a[i]['kd_kabupaten']+'">'+a[i]['kabupaten']+'</option>';
    }
    document.getElementById('rwjpendafkab').innerHTML=kab;

  });
}
function tampil_pendfrwjkotaktpby(kode) {
  var param={id : kode,};
  apiPOST('Rawatjalan/kota', param,hasil=>{
    var kab='';
    var a=hasil['data'];
    for (var i = 0; i < a.length; i++) {
      kab+='<option value="'+a[i]['kd_kabupaten']+'">'+a[i]['kabupaten']+'</option>';
    }
    document.getElementById('rwjpendafkabktp').innerHTML=kab;

  });
}
  //rwjpendafkec
function tampil_pendfrwjkec() {
  var param={id : $("#rwjpendafkab").val(),};
  apiPOST('Rawatjalan/kecamatan', param,hasil=>{
    var kec='';
    var a=hasil['data'];
    for (var i = 0; i < a.length; i++) {
      kec+='<option value="'+a[i]['kd_kecamatan']+'">'+a[i]['kecamatan']+'</option>';
    }
    document.getElementById('rwjpendafkec').innerHTML=kec;
  });
}
function tampil_pendfrwjkecby(kode) {
  var param={id : kode,};
  apiPOST('Rawatjalan/kecamatan', param,hasil=>{
    var kec='';
    var a=hasil['data'];
    for (var i = 0; i < a.length; i++) {
      kec+='<option value="'+a[i]['kd_kecamatan']+'">'+a[i]['kecamatan']+'</option>';
    }
    document.getElementById('rwjpendafkec').innerHTML=kec;
    document.getElementById('rwjpendafkab').value=kode;
  });
}
function tampil_pendfrwjkecktpby(kode) {
  var param={id : kode,};
  apiPOST('Rawatjalan/kecamatan', param,hasil=>{
    var kec='';
    var a=hasil['data'];
    for (var i = 0; i < a.length; i++) {
      kec+='<option value="'+a[i]['kd_kecamatan']+'">'+a[i]['kecamatan']+'</option>';
    }
    document.getElementById('rwjpendafkecktp').innerHTML=kec;
    document.getElementById('rwjpendafkabktp').value=kode;
    
  });
}
function tampil_pendfrwjkel() {
  var param={id : $("#rwjpendafkec").val(),};
  apiPOST('Rawatjalan/kelurahan', param,hasil=>{
    var kec='';
    var a=hasil['data'];
    for (var i = 0; i < a.length; i++) {
      kec+='<option value="'+a[i]['kd_kelurahan']+'">'+a[i]['kelurahan']+'</option>';
    }
    document.getElementById('rwjpendafkelurahan').innerHTML=kec;
  });
}
function tampil_pendfrwjkelby(kode,id) {
  var param={id : kode  ,};
  apiPOST('Rawatjalan/kelurahan', param,hasil=>{
    var kec='';
    var a=hasil['data'];
    for (var i = 0; i < a.length; i++) {
      kec+='<option value="'+a[i]['kd_kelurahan']+'">'+a[i]['kelurahan']+'</option>';
    }
    document.getElementById('rwjpendafkelurahan').innerHTML=kec;
    document.getElementById('rwjpendafkec').value=kode;
    document.getElementById('rwjpendafkelurahan').value=id;
  });
}
function tampil_pendfrwjkelktpby(kode,id) {
  var param={id : kode  ,};
  apiPOST('Rawatjalan/kelurahan', param,hasil=>{
    var kec='';
    var a=hasil['data'];
    for (var i = 0; i < a.length; i++) {
      kec+='<option value="'+a[i]['kd_kelurahan']+'">'+a[i]['kelurahan']+'</option>';
    }
    document.getElementById('rwjpendafkelurahanktp').innerHTML=kec;
    document.getElementById('rwjpendafkecktp').value=kode;
    document.getElementById('rwjpendafkelurahanktp').value=id;
  });
}
function tampil_pendfrwjprovktp() {
  apiPOST('Rawatjalan/propinsi', null,hasil=>{
    var prov='';
    var a=hasil['data'];
    for (var i = 0; i < a.length; i++) {
      prov+='<option value="'+a[i]['kd_propinsi']+'">'+a[i]['propinsi']+'</option>';
    }
    document.getElementById('rwjpendafpropinsiktp').innerHTML=prov;
  });
}
function tampil_pendfrwjkotaktp() {
  var param={id : $("#rwjpendafpropinsiktp").val(),};
  apiPOST('Rawatjalan/kota', param,hasil=>{
    var kab='';
    var a=hasil['data'];
    for (var i = 0; i < a.length; i++) {
      kab+='<option value="'+a[i]['kd_kabupaten']+'">'+a[i]['kabupaten']+'</option>';
    }
    document.getElementById('rwjpendafkabktp').innerHTML=kab;
  });
}
  //rwjpendafkec
function tampil_pendfrwjkecktp() {
  var param={id : $("#rwjpendafkabktp").val(),};
  apiPOST('Rawatjalan/kecamatan', param,hasil=>{
    var kec='';
    var a=hasil['data'];
    for (var i = 0; i < a.length; i++) {
      kec+='<option value="'+a[i]['kd_kecamatan']+'">'+a[i]['kecamatan']+'</option>';
    }
    document.getElementById('rwjpendafkecktp').innerHTML=kec;
  });
}
function tampil_pendfrwjkelktp() {
  var param={id : $("#rwjpendafkecktp").val(),};
  apiPOST('Rawatjalan/kelurahan', param,hasil=>{
    var kec='';
    var a=hasil['data'];
    for (var i = 0; i < a.length; i++) {
      kec+='<option value="'+a[i]['kd_kelurahan']+'">'+a[i]['kelurahan']+'</option>';
    }
    document.getElementById('rwjpendafkelurahanktp').innerHTML=kec;
  });
}
function tampil_noka() {

  var param={
    id : $("#rwjpendafPenjamin").val(),
    rm : $("#rwjpendafkdpasien").val(),};
    apiPOST('Kunjungan/noka', param,hasil=>{
      if (hasil['code']==201 || hasil['data']=="undefined") {
        datanik();
      } else {
        var kab='';
        var a=hasil['data'];
        document.getElementById('rwjpendafnoasuransi').value=a;

      }
    });
  }

  function datanik() {
    var param = {
      nik: $("#rwjpendafnik").val(),
    };
    apiPOST('Bridging/cekNik', param, hasil =>{
      var a=hasil['data'];
      document.getElementById('rwjpendafnoasuransi').value=a;
    });
  }

  function datapasien() {
    var param = {
      nik:'12345566',
    };
    apiPOST('Bridging/CariRujukanIrja', param, hasil =>{
     alert(hasil['status']);
     document.getElementById('rwjpendafnamapasien').value=hasil['peserta']['nama'];
   });
  }

  function inputskdp(skdp) {
    document.getElementById('rwjpendaftampilrencanakontrol').value=skdp;
    document.getElementById('rwjpendafnokartu').value=document.getElementById('rwjpendafnoasuransi').value;
    $('#RWJpendaf_ModalCariDataSEP').modal("hide");
    $('#ModalCreateSEP').modal("show");
  }
  function pendafrwjtampildokter(kode,nama) {
    document.getElementById('rwjpendafdokterbpjs').focus();
    document.getElementById('Divtampildokterbpjs').style.display="none";
    document.getElementById('rwjpendafdokterbpjs').value=kode;
  }
  function pendafrwjcarirujukan(norujukan,kode,ppk,tgl) {
   document.getElementById('rwjpendafklinikbpjs').focus();
   document.getElementById('Divtampilrujukanrwj').style.display="none";
   document.getElementById('rwjpendafnorujukan').value=norujukan;
   document.getElementById('rwjpendafrujukanbpjs').value=norujukan;
   document.getElementById('rwjpendafklinikbpjs').value=kode;
   document.getElementById('ppk').value=ppk;
   document.getElementById('tglRujukan').value=tgl;
   if (document.getElementById('rwjpendafklinikRS').value==kode) {
    document.getElementById('rwjpendaftampilskdp').value='';
  } else {
    document.getElementById('rwjpendaftampilskdp').value='0';
    document.getElementById('rwjpendaftampilrencanakontrol').value='0';

  }
}

$('#rwjpendafkelompokpasien').on('change', function() {
 var param={id : $("#rwjpendafkelompokpasien").val(),};
 apiPOST('Rawatjalan/penjamin', param,hasil=>{
  var res='';
  var a=hasil['data'];
  for (var i = 0; i < a.length; i++) {
    res+='<option value="'+a[i]['id_penjamin']+'">'+a[i]['nama_penjamin']+'</option>';
  }
  document.getElementById('rwjpendafPenjamin').innerHTML=res;
});
});
$('#rwjpendafPenjamin').on('change', function() {
 var penjamin= document.getElementById('rwjpendafPenjamin').value;
 if (penjamin=='2') {    
  tampil_noka();
} 
});
$('#rwjpendafkelompokpasien').on('keyup', function() {
 var param={id : $("#rwjpendafkelompokpasien").val(),};
 apiPOST('Rawatjalan/penjamin', param,hasil=>{
  var res='';
  var a=hasil['data'];
  for (var i = 0; i < a.length; i++) {
    res+='<option value="'+a[i]['id_penjamin']+'">'+a[i]['nama_penjamin']+'</option>';
  }
  document.getElementById('rwjpendafPenjamin').innerHTML=res;
});
});
function penjaminTunai() {
  var param={id:3,};
  apiPOST('Rawatjalan/penjamin', param,hasil=>{
    var res='';
    var a=hasil['data'];
    for (var i = 0; i < a.length; i++) {
      res+='<option value="'+a[i]['id_penjamin']+'">'+a[i]['nama_penjamin']+'</option>';
    }
    document.getElementById('rwjpendafPenjamin').innerHTML=res;
  });
}
function rwjpendaftempatrujukan(e) {
  if (e.keyCode == 13) {
    event.preventDefault();
    document.getElementById('rwjpendafpoliklinik').focus();
  }
}
function RujukanEnter(e) {
  if (e.keyCode==13) {
    event.preventDefault();
    document.getElementById('rwjpendaftempatrujukan').focus();
  }
}
function rwjpendafkdpasien(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  document.getElementById('rwjpendafnamapasien').focus();
}
}
function rwjpendafnamapasien(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  document.getElementById('rwjpendafkeluarga').focus();
}
}
function rwjpendafkeluarga(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  document.getElementById('rwjpendafagama').focus();
}
}
function rwjpendafagama(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  document.getElementById('rwjpendafgoldarah').focus();
}
}
function rwjpendafgoldarah(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  document.getElementById('rwjpendafkelamin').focus();
}
}
function rwjpendafkelamin(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  document.getElementById('rwjpendafstatusmarital').focus();
}
}
function rwjpenstatusmarital(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  document.getElementById('rwjpendaftelepon').focus();
}
}
function rwjpendaftempatlahir(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  document.getElementById('rwjpendaftanggallahir').focus();
}
}
function rwjpendaftanggallahir(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  age();
  document.getElementById('rwjpendafnik').focus();
}
}
function rwjpendafnik(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  document.getElementById('rwjpendafpendidikan').focus();
}
}
function rwjpendafpendidikan(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  document.getElementById('rwjpendafpekerjaan').focus();
}
}
function rwjpendafpekerjaan(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  document.getElementById('rwjpendafalamat').focus();
}
}
function rwjpendaftelepon(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  document.getElementById('rwjpendafwni').focus();
}
}
function rwjpendafwni(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  document.getElementById('rwjpendaftempatlahir').focus();
}
}
function rwjpendafalamat(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  document.getElementById('rwjpendafpropinsi').focus();
}
}
function rwjpendafpropinsi(e) {
 if (e.keyCode == 13) {
  if(document.getElementById('rwjpendafpropinsi').value==''){
    alert('Data Propinsi kosong!!');
  }else{

    if (document.getElementById('rwjpendafkdpasien').value=='') {
      event.preventDefault();
      document.getElementById('rwjpendafkab').focus();
      tampil_pendfrwjkota() ;
    } else {
      event.preventDefault();
      document.getElementById('rwjpendafkab').focus();
    }
  }
}
}
function rwjpendafkab(e) {
 if (e.keyCode == 13) {
  if(document.getElementById('rwjpendafkab').value==''){
    alert('Data Kabupaten kosong!!');
  }else{
    if (document.getElementById('rwjpendafkdpasien').value=='') {
      event.preventDefault();
      document.getElementById('rwjpendafkec').focus();
      tampil_pendfrwjkec();
    }else{
      event.preventDefault();
      document.getElementById('rwjpendafkec').focus();
    }
  }
}
}
function rwjpendafkec(e) {
 if (e.keyCode == 13) {
  if(document.getElementById('rwjpendafkec').value==''){
    alert('Data Kecamatan kosong!!');
  }else{
    if (document.getElementById('rwjpendafkdpasien').value=='') {
      event.preventDefault();
      document.getElementById('rwjpendafkelurahan').focus();
      tampil_pendfrwjkel();
    }else{
      event.preventDefault();
      document.getElementById('rwjpendafkelurahan').focus();
    }
  }
}
}
function rwjpendafkelurahan(e) {
 if (e.keyCode == 13) {
  if(document.getElementById('rwjpendafkelurahan').value==''){
    alert('Data Kecamatan kosong!!');
  }else{
    event.preventDefault();
    document.getElementById('rwjpendafkdpos').focus();
  }
}
}
function rwjpendafkdpos(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  document.getElementById('rwjpendafalamatktp').focus();
}
}
function rwjpendafalamatktp(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  document.getElementById('rwjpendafpropinsiktp').focus();
}
}
function rwjpendafpropinsiktp(e) {
 if (e.keyCode == 13) {
  if (document.getElementById('rwjpendafkdpasien').value=='') {
    event.preventDefault();
    document.getElementById('rwjpendafkabktp').focus();
    tampil_pendfrwjkotaktp();
  } else {
    event.preventDefault();
    document.getElementById('rwjpendafkabktp').focus();
  }

}
}
function rwjpendafkabktp(e) {
 if (e.keyCode == 13) {
  if (document.getElementById('rwjpendafkdpasien').value=='') {
    event.preventDefault();
    document.getElementById('rwjpendafkecktp').focus();
    tampil_pendfrwjkecktp();
  } else {
    event.preventDefault();
    document.getElementById('rwjpendafkecktp').focus();
  }

}
}
function rwjpendafkelktp(e) {
 if (e.keyCode == 13) {
  if (document.getElementById('rwjpendafkdpasien').value=='') {
    event.preventDefault();
    document.getElementById('rwjpendafkelurahanktp').focus();
    tampil_pendfrwjkelktp();
  } else {
    event.preventDefault();
    document.getElementById('rwjpendafkelurahanktp').focus();
  }

}
}
function rwjpendafkecktp(e) {
 if (e.keyCode == 13) {
  if (true) {
    event.preventDefault();
    document.getElementById('rwjpendafkelurahanktp').focus();
    tampil_pendfrwjkelktp();
  } else {
    event.preventDefault();
    document.getElementById('rwjpendafkelurahanktp').focus();
  }
}
}
function rwjpendafkelurahanktp(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  document.getElementById('rwjpendafkdposktp').focus();
}
}
function rwjpendafkdposktp(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  document.getElementById('rwjpendafpoliklinik').focus();
}
}
function rwjpendaftglkunjungan(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  document.getElementById('rwjpendafanamnese').focus();
}
}
function rwjpendafanamnese(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  document.getElementById('rwjpendafalergi').focus();
}
}
function rwj_pendf_rujukandari(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  document.getElementById('rwjpendaftempatrujukan').focus();
}
}

function age() {
   var spliya = $('#rwjpendaftanggallahir').val(); // in   "mm/dd/yyyy" format
   var tgl = spliya.substr(8, 9);
   var bln = spliya.substr(5, 2);
   var thn = spliya.substr(0, 4);
  //  birthdate = tgl + '/' + bln + '/' + thn
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
    document.getElementById('rwjpendf_umur').value = fyear + " Thn "+ fmonths + " Bln "+ fdays + " Hri";
    document.getElementById('rwjpendafnik').focus();
  }

//rwjpendafrujukanpasien
  function rwjpendafrujukanpasien1() {
    document.getElementById("rwj_pendf_divrujukandari").style.display   = "none";
    document.getElementById("rwj_pendf_divtempatrujukan").style.display = "none";
    document.getElementById("rwj_pendf_divsepmanual").style.display     = "none";
    document.getElementById("rwj_pendf_caraterima").value               = 1;
    document.getElementById("divRujukan1").style.display                = "none";
    document.getElementById("divRujukan2").style.display                = "none";
    RujukanAsal(99);
    penjaminTunai();
    document.getElementById('divkelompokpasien').style.display          = "none";     
    document.getElementById('divnoasuransi').style.display              = "none";
    document.getElementById('divrujukan').style.display                 = "none"; 
    document.getElementById('divsep').style.display                     = "none";  
  }

  function rwjpendafrujukanpasien2() {
    document.getElementById("rwj_pendf_divrujukandari").style.display   = "block";
    document.getElementById("rwj_pendf_divtempatrujukan").style.display = "block";    
    document.getElementById("rwj_pendf_divsepmanual").style.display     = "block";
    document.getElementById("rwj_pendf_rujukandari").focus();
    document.getElementById("rwj_pendf_caraterima").value               = 2;
    document.getElementById("divRujukan1").style.display                = "block";
    document.getElementById("divRujukan2").style.display                = "block";
    document.getElementById('divkelompokpasien').style.display          = "block";     
    document.getElementById('divnoasuransi').style.display              = "block";
    document.getElementById('divrujukan').style.display                 = "block"; 
    document.getElementById('divsep').style.display                     = "block"; 
    RujukanAsal(1);
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
    //rwjpendafpoliklinik
 apiPOST('Rawatjalan/unit', null,hasil=>{
  var a=hasil['data'];
  var unit='';
  for (var i = 0; i < a.length; i++) {
    unit+='<option value="'+a[i]['id_unit']+'">'+a[i]['nama_unit']+'</option>';
  }
  document.getElementById('rwjpendafpoliklinik').innerHTML=unit;
});
}
function pegawai() {
 apiPOST('Rawatjalan/pegawai', null,hasil=>{
  var a=hasil['data'];
  var pegawai='';
  for (var i = 0; i < a.length; i++) {
    pegawai+='<option value="'+a[i]['id_pegawai']+'">'+a[i]['nama_pegawai']+'</option>';
  }
  document.getElementById('rwjpendafdokter').innerHTML=pegawai;
});
}
function dpjpBPJS() {
  var param={
    id:$("#rwjpendafdokter").val(),
  };
  apiPOST('Rawatjalan/dpjpBPJS', param,hasil=>{
    var a=hasil['data'];
    document.getElementById('rwjpendafdokterbpjs').value=a;
  });

}
function caripropinsibyrm(kode){
  var param={id:kode,};
  apiPOST('Data_Sosial/propinsiby', param,hasil=>{
    var prov=hasil['data']['kd_propinsi'];
    var kota=hasil['data']['kd_kabupaten'];
    var kec =hasil['data']['kd_kecamatan'];
    var kel =hasil['data']['kd_kelurahan'];
    tampil_pendfrwjkotaby(prov);
    tampil_pendfrwjkecby(kota);
    tampil_pendfrwjkelby(kec,kode);
    document.getElementById('rwjpendafpropinsi').value  =prov;
  });
}

function tampilicd() {
 var icd=document.getElementById('rwjpendafdiagnosa').val();
 var param={id:icd,};
 if (icd.length >2 ) {
   apiPOST('Bridging/icd', param,hasil=>{
    var tampil='';
    var a=hasil['data'];
    for (var i = 0; i < a.length; i++) {
      tampil+='<option value='+a[i].id_penyakit+'>'+a[i].a.id_penyakit+'</option>';
    }
    document.getElementById('rwjpendafdiagnosa').innerHTML=tampil;
  });
 }

}
function caripropinsiktpbyrm(kode){
  var param={id:kode,};
  apiPOST('Data_Sosial/propinsiby', param,hasil=>{
    var prov=hasil['data']['kd_propinsi'];
    var kota=hasil['data']['kd_kabupaten'];
    var kec =hasil['data']['kd_kecamatan'];
    var kel =hasil['data']['kd_kelurahan'];
    tampil_pendfrwjkotaktpby(prov);
    tampil_pendfrwjkecktpby(kota);
    tampil_pendfrwjkelktpby(kec,kode);
    document.getElementById('rwjpendafpropinsiktp').value =prov;
  });
}
function caripasienbynik(e) {
  if (e.keyCode==13) {
    event.preventDefault();
    var param={
      jumlah: $("#countpasien").val(),
      nik:    $("#caripasiennik").val(),};
      apiPOST('Pasien/caripasienbynik',param,hasil=>{
        $('#tablePendafataranRWJ tbody').html('');
        var a=hasil['data'];
        var Baris = '<tr>';
        for (var i = 0; i < a.length; i++) {
          var no = i+1;
          Baris += '<td>' + no + '</td>';
          Baris += '<td onclick="caripasienbytable(`'+a[i].no_rm+'`)">'+a[i].no_rm + '</td>';
          Baris += '<td>'+a[i].nama+'</td>';
          Baris += '<td>'+a[i].alamat+'</td>';
          Baris += '<td>'+a[i].telepon + '</td>';      
          Baris += '<td>'+a[i].tgl_lahir + '</td>'
          Baris += '<td>'+a[i].tempat_lahir +'</td>';
          Baris += "</tr>";
        }
        $('#tablePendafataranRWJ tbody').append(Baris);
      })
    } 
  }

  function caripasienbynama(e) {
    if (e.keyCode==13) {
      event.preventDefault();
      var param={
        nama:   $("#pendafrwjcarinama").val(),
        alamat: $("#pendafrwjcarialamat").val(),
        jumlah: $("#countpasien").val(),
        nik:    $("#caripasiennik").val(),};
        apiPOST('Pasien/caripasienbynamaalamat',param,hasil=>{
          $('#tablePendafataranRWJ tbody').html('');
          var a=hasil['data'];
          var Baris = '<tr>';
          for (var i = 0; i < a.length; i++) {
            var no = i+1;
            Baris += '<td>' + no + '</td>';
            Baris += '<td onclick="caripasienbytable(`'+a[i].no_rm+'`)">'+a[i].no_rm + '</td>';
            Baris += '<td>'+a[i].nama+'</td>';
            Baris += '<td>'+a[i].alamat+'</td>';
            Baris += '<td>'+a[i].telepon + '</td>';      
            Baris += '<td>'+a[i].tgl_lahir + '</td>'
            Baris += '<td>'+a[i].tempat_lahir +'</td>';
            Baris += "</tr>";
          }
          $('#tablePendafataranRWJ tbody').append(Baris);
        })
      } 
    }
    function caripasienbytable(rm) {
      var param={id : rm,};
      apiPOST('Pasien/caripasienbyrm', param,hasil=>{
        if (hasil['code']==200) {

          var a=hasil['data'];
          for (var i = 0; i < a.length; i++) {
        caripropinsibyrm(a[i].kd_kelurahan);//cari propinsi 
        caripropinsiktpbyrm(a[i].kd_kelurahan_ktp);//cari propinsi sesuai ktp
        carihistoripenyakit(a[i].no_rm);//cari histori penyakit
        carihistorikunjungan(a[i].no_rm);//cari histori kunjungan
        document.getElementById('rwjpendafnamapasien').value   =a[i].nama;
        document.getElementById('rwjpendafkdpasien').value     =a[i].no_rm;     
        document.getElementById('rwjpendafkeluarga').value     =a[i].nama_keluarga;
        document.getElementById('rwjpendafagama').value        =a[i].kd_agama;
        document.getElementById('rwjpendafgoldarah').value     =a[i].gol_darah;
        document.getElementById('rwjpendafkelamin').value      =a[i].jenis_kelamin;
        document.getElementById('rwjpendafstatusmarital').value=a[i].status_marita;
        document.getElementById('rwjpendaftempatlahir').value  =a[i].tempat_lahir;
        document.getElementById('rwjpendaftanggallahir').value =a[i].tgl_lahir.substr(0, 10);
        document.getElementById('rwjpendafnik').value          =a[i].nik;
        document.getElementById('rwjpendafpendidikan').value   =a[i].kd_pendidikan;
        document.getElementById('rwjpendafpekerjaan').value    =a[i].kd_pekerjaan;
        document.getElementById('rwjpendaftelepon').value      =a[i].telepon;
        document.getElementById('rwjpendafwni').value          =a[i].wni;
        document.getElementById('rwjpendafalamat').value       =a[i].alamat;
        document.getElementById('rwjpendafkelurahan').value    =a[i].kd_kelurahan;
        document.getElementById('rwjpendafkelurahanktp').value =a[i].kd_kelurahan_ktp;
        document.getElementById('rwjpendafkdpos').value        =a[i].kd_pos;
        document.getElementById('rwjpendafalamatktp').value    =a[i].alamat_ktp;
        document.getElementById('rwjpendafnoasuransi').value   =a[i].no_kartu;
        document.getElementById('rwjpendafkdposktp').value     =a[i].kd_pos_ktp;
        document.getElementById('rwjpendafibu').value          =a[i].nama_ibu;
        document.getElementById('rwjpendafpekerjaanibu').value =a[i].kd_pos_ktp;
        document.getElementById('rwjpendafpendidikanibu').value=a[i].kd_pos_ktp;
        document.getElementById('rwjpendafayah').value         =a[i].nama_ayah;
        document.getElementById('rwjpendafpekerjaanayah').value=a[i].kd_pos_ktp;
        document.getElementById('rwjpendafpendidikanayah').value=a[i].kd_pos_ktp;
        data_pasien_pendaftaran_igd['nama']           =a[i].nama;
        data_pasien_pendaftaran_igd['nama_keluarga']  =a[i].nama_keluarga;
        data_pasien_pendaftaran_igd['nik']            =a[i].nik;
        data_pasien_pendaftaran_igd['kd_agama']       =a[i].kd_agama;
        data_pasien_pendaftaran_igd['gol_darah']      =a[i].gol_darah;
        data_pasien_pendaftaran_igd['jenis_kelamin']  =a[i].jenis_kelamin;
        data_pasien_pendaftaran_igd['kd_pendidikan']  =a[i].kd_pendidikan;
        data_pasien_pendaftaran_igd['kd_pekerjaan']   =a[i].kd_pekerjaan;
        data_pasien_pendaftaran_igd['telepon']        =a[i].telepon;
        data_pasien_pendaftaran_igd['statusmarital']  =a[i].status_marita;
        data_pasien_pendaftaran_igd['alamat']         =a[i].alamat_ktp;
        data_pasien_pendaftaran_igd['alamat_ktp']     =a[i].alamat;
        data_pasien_pendaftaran_igd['no_rm']          =a[i].no_rm;    
        tambahpasienrwj();
      }
    } else {
      alert('Pasien Tidak Ditemukan');
    }
  });

    }

    function caripasienbyrm(e) {
      if (e.keyCode == 13) {
        event.preventDefault();
        var param={id : $("#searchpendfrwj").val(),};
        apiPOST('Pasien/caripasienbyrm', param,hasil=>{
          if (hasil['code']==200) {
            var a=hasil['data'];
            for (var i = 0; i < a.length; i++) {
        caripropinsibyrm(a[i].kd_kelurahan);//cari propinsi 
        caripropinsiktpbyrm(a[i].kd_kelurahan_ktp);//cari propinsi sesuai ktp
        carihistoripenyakit(a[i].no_rm);//cari histori penyakit
        carihistorikunjungan(a[i].no_rm);//cari histori kunjungan
        document.getElementById('rwjpendafnamapasien').value   =a[i].nama;
        document.getElementById('rwjpendafkdpasien').value     =a[i].no_rm;     
        document.getElementById('rwjpendafkeluarga').value     =a[i].nama_keluarga;
        document.getElementById('rwjpendafagama').value        =a[i].kd_agama;
        document.getElementById('rwjpendafgoldarah').value     =a[i].gol_darah;
        document.getElementById('rwjpendafkelamin').value      =a[i].jenis_kelamin;
        document.getElementById('rwjpendafstatusmarital').value=a[i].status_marita;
        document.getElementById('rwjpendaftempatlahir').value  =a[i].tempat_lahir;
        document.getElementById('rwjpendaftanggallahir').value =a[i].tgl_lahir.substr(0, 10);
        document.getElementById('rwjpendafnik').value          =a[i].nik;
        document.getElementById('rwjpendafpendidikan').value   =a[i].kd_pendidikan;
        document.getElementById('rwjpendafpekerjaan').value    =a[i].kd_pekerjaan;
        document.getElementById('rwjpendaftelepon').value      =a[i].telepon;
        document.getElementById('rwjpendafwni').value          =a[i].wni;
        document.getElementById('rwjpendafalamat').value       =a[i].alamat;
        document.getElementById('rwjpendafkelurahan').value    =a[i].kd_kelurahan;
        document.getElementById('rwjpendafkelurahanktp').value =a[i].kd_kelurahan_ktp;
        document.getElementById('rwjpendafkdpos').value        =a[i].kd_pos;
        document.getElementById('rwjpendafalamatktp').value    =a[i].alamat_ktp;
        document.getElementById('rwjpendafnoasuransi').value   =a[i].no_kartu;
        document.getElementById('rwjpendafkdposktp').value     =a[i].kd_pos_ktp;
        document.getElementById('rwjpendafibu').value          =a[i].nama_ibu;
        document.getElementById('rwjpendafpekerjaanibu').value =a[i].kd_pos_ktp;
        document.getElementById('rwjpendafpendidikanibu').value=a[i].kd_pos_ktp;
        document.getElementById('rwjpendafayah').value         =a[i].nama_ayah;
        document.getElementById('rwjpendafpekerjaanayah').value=a[i].kd_pos_ktp;
        document.getElementById('rwjpendafpendidikanayah').value=a[i].kd_pos_ktp;
        data_pasien_pendaftaran_igd['nama']           =a[i].nama;
        data_pasien_pendaftaran_igd['nama_keluarga']  =a[i].nama_keluarga;
        data_pasien_pendaftaran_igd['nik']            =a[i].nik;
        data_pasien_pendaftaran_igd['kd_agama']       =a[i].kd_agama;
        data_pasien_pendaftaran_igd['gol_darah']      =a[i].gol_darah;
        data_pasien_pendaftaran_igd['jenis_kelamin']  =a[i].jenis_kelamin;
        data_pasien_pendaftaran_igd['kd_pendidikan']  =a[i].kd_pendidikan;
        data_pasien_pendaftaran_igd['kd_pekerjaan']   =a[i].kd_pekerjaan;
        data_pasien_pendaftaran_igd['telepon']        =a[i].telepon;
        data_pasien_pendaftaran_igd['statusmarital']  =a[i].status_marita;
        data_pasien_pendaftaran_igd['alamat']         =a[i].alamat_ktp;
        data_pasien_pendaftaran_igd['alamat_ktp']     =a[i].alamat;
        data_pasien_pendaftaran_igd['no_rm']          =a[i].no_rm; 

        
        tambahpasienrwj();
      }
    } else {
      alert('Pasien Tidak Ditemukan');
    }
  });

      }
    }

    function carihistoripenyakit(no) {
      var a='';
      var param = 
      {rm : $("#searchpendfrwj").val(),};
      apiPOST('Pasien/historipenyakit', param, hasil =>{
        var b=hasil['history'];
        for (var i = 0; i < b.length; i++) {
          a+='<tr>';
          a+='<td>'+b.length+'</td>';
          a+='<td>'+b[i].penyakit+'</td>';
          a+='<td>'+b[i].id_penyakit+'</td>';
          a+='<td>'+b[i].tgl_masuk+'</td>';   
          a+='</tr>';
        }
        document.getElementById('bodyhistoripenyakit').innerHTML=a;

      });
    }

    function carihistorikunjungan(no) {
      var a='';
      var param = 
      {rm : $("#searchpendfrwj").val(),};
      apiPOST('Kunjungan/historikunjunganirja', param, hasil =>{
        var b=hasil['history'];
        for (var i = 0; i < b.length; i++) {
          a+='<tr>';
          a+='<td>'+b.length+'</td>';
          a+='<td>'+b[i].nama_unit+'</td>';
          a+='<td>'+b[i].nama_pegawai+'</td>';
          a+='<td>'+b[i].tgl_masuk+'</td>';  
          a+='</tr>';
        }
        document.getElementById('bodyhistorykunjungan').innerHTML=a;

      });
    }

    function tambahpasienrwj() {
      var x = document.getElementById("DivCariPasienRWJ");
      var y = document.getElementById("DivPasienRWJ");
      var z = document.getElementById("DivPendafDetailRWJ");
      var w = document.getElementById("tabelpasienrwj");
      var a = document.getElementById("rwj_pendf_buttonPasienBaru");
      var b = document.getElementById("rwj_pendf_buttonList");
      z.style.display = "block";
      y.style.display = "block";
      a.style.display = "block";
      x.style.display = "none";
      w.style.display = "none";
      b.style.display = "none";
      $("#rwj_pendf_titleheader").html("<i class='fas fa-hospital-user'></i> Pendaftaran Pasien Baru");
      document.getElementById("rwjpendafnamapasien").removeAttribute('readonly');
      document.getElementById("rwjpendafkeluarga").removeAttribute('readonly');
      document.getElementById("rwjpendafagama").removeAttribute('readonly');
      document.getElementById("rwjpendafgoldarah").removeAttribute('readonly');
      document.getElementById("rwjpendafkelamin").removeAttribute('readonly');
      document.getElementById("rwjpendafstatusmarital").removeAttribute('readonly');
      document.getElementById("rwjpendaftempatlahir").removeAttribute('readonly');
      document.getElementById("rwjpendaftanggallahir").removeAttribute('readonly');
      document.getElementById("rwjpendafnik").removeAttribute('readonly');
      document.getElementById("rwjpendafpendidikan").removeAttribute('readonly');
      document.getElementById("rwjpendafpekerjaan").removeAttribute('readonly');
      document.getElementById("rwjpendaftelepon").removeAttribute('readonly');
      document.getElementById("rwjpendafwni").removeAttribute('readonly');
      document.getElementById("rwjpendafalamat").removeAttribute('readonly');
      document.getElementById("rwjpendafpropinsi").removeAttribute('readonly');
      document.getElementById("rwjpendafkab").removeAttribute('readonly');
      document.getElementById("rwjpendafkec").removeAttribute('readonly');
      document.getElementById("rwjpendafkelurahan").removeAttribute('readonly');
      document.getElementById("rwjpendafkdpos").removeAttribute('readonly');
      document.getElementById("rwjpendafpropinsiktp").removeAttribute('readonly');
      document.getElementById("rwjpendafkabktp").removeAttribute('readonly');
      document.getElementById("rwjpendafkecktp").removeAttribute('readonly');
      document.getElementById("rwjpendafkelurahanktp").removeAttribute('readonly');
      document.getElementById("rwjpendafkdposktp").removeAttribute('readonly');
      document.getElementById("rwjpendafalamatktp").removeAttribute('readonly');

    }

    function kembali_pend_rwj() {
      var x = document.getElementById("DivCariPasienRWJ");
      var y = document.getElementById("DivPasienRWJ");
      var z = document.getElementById("DivPendafDetailRWJ");
      var w = document.getElementById("tabelpasienrwj");
      var a = document.getElementById("rwj_pendf_buttonPasienBaru");
      var b = document.getElementById("rwj_pendf_buttonList");
      x.style.display = "block";
      b.style.display = "block";  
      w.style.display = "block";  
      a.style.display = "none";  
      y.style.display = "none";
      z.style.display = "none";
      $("#rwj_pendf_titleheader").html("<i class='fas fa-hospital-user'></i> Daftar Pasien");
      document.getElementById('rwjpendafnamapasien').value ='';
      document.getElementById('rwjpendafkdpasien').value     ='';     
      document.getElementById('rwjpendafkeluarga').value     ='';
      document.getElementById('rwjpendafagama').value        ='';
      document.getElementById('rwjpendafgoldarah').value     ='';
      document.getElementById('rwjpendafkelamin').value      ='';
      document.getElementById('rwjpendafstatusmarital').value='';
      document.getElementById('rwjpendaftempatlahir').value  ='';
      document.getElementById('rwjpendaftanggallahir').value ='';
      document.getElementById('rwjpendafnik').value          ='';
      document.getElementById('rwjpendafpendidikan').value   ='';
      document.getElementById('rwjpendafpekerjaan').value    ='';
      document.getElementById('rwjpendaftelepon').value      ='';
      document.getElementById('rwjpendafwni').value          ='';
      document.getElementById('rwjpendafalamat').value       ='';
      document.getElementById('rwjpendafkelurahan').value    ='';
      document.getElementById('rwjpendafkelurahanktp').value ='';
      document.getElementById('rwjpendafkdpos').value        ='';
      document.getElementById('rwjpendafalamatktp').value    ='';
      document.getElementById('rwjpendafnoasuransi').value   ='';
      document.getElementById('rwjpendafkdposktp').value     ='';
      document.getElementById('rwjpendafibu').value          ='';
      document.getElementById('rwjpendafpekerjaanibu').value ='0';
      document.getElementById('rwjpendafpendidikanibu').value='0';
      document.getElementById('rwjpendafayah').value         ='';
      document.getElementById('rwjpendafpekerjaanayah').value='0';
      document.getElementById('rwjpendafpendidikanayah').value='0';
    }

/*fungsi bridging*/
    function ApproveFinger() {
      var param={
        noka : $("#rwjpendafnoasuransi").val(),
      };
      apiPOST('Bridging/ApprovAuto', param, hasil =>{

      })
    }
    function rwjpendaftampilcaridokter(e) {
      if (e.keyCode ==13) {
        var a='';
        var param = 
        {poli : $("#rwjpendafklinikRS").val(),};
        apiPOST('Bridging/CariDokter', param, hasil =>{
    // alert(hasil['status']);rwjpendafdokterbpjs
          var b=hasil['list'];
          for (var i = 0; i < b.length; i++) {
            a+='<button class="btn btn-primary" style="width:100%;"  onclick="pendafrwjtampildokter(`'+b[i]['kodeDokter']+'`,`'+b[i]['NamaDokter']+'`)" >'+b[i]['namaDokter']+' ('+b[i]['kodeDokter']+')</button>';
          }

          document.getElementById('Divtampildokterbpjs').style.display="block";
          document.getElementById('Divtampildokterbpjs').innerHTML=a;
        });
      }
    }
    function rwjpendaftampilnoskdp(norujukan) {
      var a='';
      var param = 
      {noka : $("#rwjpendafnoasuransi").val(),};
      apiPOST('Bridging/CariSep', param, hasil =>{
        var b=hasil['histori'];
        for (var i = 0; i < 5; i++) {
          a+='<tr>';
          a+='<th scope="row">1</th>';
          a+='<td><button class="btn-primary" onclick=inputskdp(`'+b[i]['noSep']+'`,`'+b[i]['tglSep']+'`)>'+b[i]['noSep']+'</button></td>';
          a+='<td>'+b[i]['poli']+'</td>';
          a+='<td>'+b[i]['noRujukan']+'</td>';
          a+='<td>'+b[i]['tglSep']+'</td>';
          a+='</tr>';
        }
        $('#modalTampilSKDP').modal("show");
        document.getElementById('listskdp').innerHTML=a;

      });

    }
    function cariRujukanPasienIrja() {
      var param = 
      {noka : $("#rwjpendafnoasuransi").val(),faskes:$("#rwj_pendf_rujukandari").val(),};
      apiPOST('Bridging/CariRujukanIrja', param, hasil =>{
       alert(hasil['status']);
   //document.getElementById('rwjpendafnamapasien').value=hasil['peserta']['nama'];
     });
    }
    //ModalRujukPxIrja
    function caripolirujukan(e) {
      if (e.keyCode ==13) {
        var poli= $("#rwjpolitujuanrujuk").val();
        if (poli.length < 3) {
          alert('Minimal 3 Karakter');
        } else {
          var a='';
          var param = 
          {poli : $("#rwjpolitujuanrujuk").val(),};
          apiPOST('Bridging/caripolirujukan', param, hasil =>{
            var b=hasil['poli'];
            for (var i = 0; i < b.length; i++) {
              a+='<button class="btn btn-primary" onclick="pilihpolitujuanrujuk(`'+b[i]['kode']+'`,`'+b[i]['nama']+'`)">'+b[i]['nama']+'</button>';
            }
            document.getElementById('Divtampilpolitujuanrujuk').style.display="block";
            document.getElementById('Divtampilpolitujuanrujuk').innerHTML =a;
          });
        }
      }
    }

    function carirstujuan(e) {
      if (e.keyCode ==13) {
        var poli= $("#rwjrstujuanrujuk").val();
        if (poli.length < 3) {
          alert('Minimal 3 Karakter');
        } else {
          document.getElementById('Divtampilrstujuanrujuk').innerHTML ="";
          var a='';
          var param = 
          {rs : $("#rwjrstujuanrujuk").val(),klas:$("#rwjfaskesrujuk").val(),};
          apiPOST('Bridging/carirsrujukan', param, hasil =>{
            var b=hasil['faskes'];
            for (var i = 0; i < b.length; i++) {
              a+='<button class="btn btn-primary" onclick="pilihrstujuanrujuk(`'+b[i]['kode']+'`,`'+b[i]['nama']+'`)">'+b[i]['nama']+'</button>';
            }
            document.getElementById('Divtampilrstujuanrujuk').style.display="block";
            document.getElementById('Divtampilrstujuanrujuk').innerHTML =a;
          });
        }
      }
    }
    function pilihrstujuanrujuk(kode,unit) {
      document.getElementById('rwjrstujuanrujuk').value=kode;
      document.getElementById('Divtampilrstujuanrujuk').style.display="none";
    }
    function pilihpolitujuanrujuk(kode,unit) {
      document.getElementById('rwjpolitujuanrujuk').value=kode;
      document.getElementById('Divtampilpolitujuanrujuk').style.display="none";
    }
    function rwjpendaftampilnorujukan(e) {
      if (e.keyCode ==13) {
        var a='';
        var param = 
        {noka : $("#rwjpendafnoasuransi").val(),faskes:$("#rwj_pendf_rujukandari").val(),};
        apiPOST('Bridging/CariRujukanIrja', param, hasil =>{
    // alert(hasil['status']);
          var c=hasil['rujukan'];
          var b=c.filter(sort);
          for (var i = 0; i < b.length; i++) {
            a+='<button class="btn btn-primary" onclick="pendafrwjcarirujukan(`'+b[i]['noKunjungan']+'`,`'+b[i]['poliRujukan']['kode']+'`,`'+b[i]['provPerujuk']['kode']+'`,`'+b[i]['tglKunjungan']+'`)" >'+b[i]['noKunjungan']+' ('+b[i]['poliRujukan']['nama']+'|'+b[i]['tglKunjungan']+')</button>';
          }
          document.getElementById('Divtampilrujukanrwj').style.display="block";
          document.getElementById('Divtampilrujukanrwj').innerHTML =a;
        });
      }
    }

    function sort(a) {

/*var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();
var TglNow='';
TglNow = yyyy+'-'+mm+'-'+dd;*/

      return  a['tglKunjungan'] > '2022-01-01';
    }


    function rwjpendafhistorisep() {
     var a='';
     var param = 
     {noka : $("#rwjpendafnoasuransi").val(),};
     apiPOST('Bridging/CariSep', param, hasil =>{
      var b=hasil['histori'];
      for (var i = 0; i < 6; i++) {
        a+='<tr>';
        a+='<th scope="row">1</th>';
        a+='<td><button class="btn-primary" onclick=inputskdp(`'+b[i]['noSep']+'`,`'+b[i]['tglSep']+'`)>'+b[i]['noSep']+'</button></td>';
        a+='<td>'+b[i]['poli']+'</td>';
        a+='<td>'+b[i]['noRujukan']+'</td>';
        a+='<td>'+b[i]['tglSep']+'</td>';
        a+='<td><button class="btn-primary" onclick=CetakSepIrja(`'+b[i]['noSep']+'`)><i class="fas fa-print"></i></button><button class="btn-primary" onclick=Deletesepirja(`'+b[i]['noSep']+'`)><i class="fas fa-times-circle"></i></button><button class="btn-primary" onclick=Rujukpasienirja(`'+b[i]['noSep']+'`)><i class="fas fa-paper-plane"></i></button></td>'
        a+='</tr>';
      }
        //document.getElementById('Divtampilskdp').style.display="block";
    //$('#modalTampilSKDP').modal("show");
      document.getElementById('tbodyrwjpendafhistorisep').innerHTML=a;

    });
   }
   function rwjpendafrwjdatabpjspasien() {
     var c='';
     var param = 
     {noka : $("#rwjpendafnoasuransi").val(),};
     apiPOST('Bridging/CariDetailPesertaBPJS', param, hasil =>{
      var res=hasil['peserta'];
      c+=' <tr>';
      c+='<th scope="row">NOKA</th>';
      c+='<td>'+res['noKartu']+'</td>';
      c+='</tr>';
      c+=' <tr>';
      c+='<th scope="row">NIK</th>';
      c+='<td>'+res['nik']+'</td>';
      c+='</tr>';
      c+=' <tr>';
      c+='<th scope="row">Nama</th>';
      c+='<td>'+res['nama']+'</td>';
      c+='</tr>';
      c+=' <tr>';
      c+='<th scope="row">Kelas</th>';
      c+='<td>'+res['hakKelas']['keterangan']+'</td>';
      c+='</tr>';
      c+=' <tr>';
      c+='<th scope="row">Status</th>';
      c+='<td>'+res['statusPeserta']['keterangan']+'</td>';
      c+='</tr>';
      c+=' <tr>';
      c+='<th scope="row">Dinsos</th>';
      c+='<td>'+res['informasi']['dinsos']+'</td>';
      c+='</tr>';
      c+=' <tr>';
      c+='<th scope="row">prolanisPRB</th>';
      c+='<td>'+res['informasi']['prolanisPRB']+'</td>';
      c+='</tr>';
      document.getElementById('DivpendafrwjDetailPesertaBPJS').innerHTML=c;

    });
   }

   function CekListRencanaKontrol() {
     var a='';
     var param = 
     {noka : $("#rwjpendafnoasuransi").val(),};
     apiPOST('Bridging/CekListRencanaKontrol', param, hasil =>{
      var b=hasil['data']['list'];
      for (var i = 0; i < b.length; i++) {
        a+='<tr>';
        a+='<th scope="row">1</th>';
        a+='<td><button class="btn-primary" onclick=inputskdp(`'+b[i]['noSuratKontrol']+'`)>'+b[i]['noSuratKontrol']+'</button></td>';
        a+='<td>'+b[i]['namaPoliTujuan']+'</td>';
        a+='<td>'+b[i]['terbitSEP']+'</td>';
        a+='<td>'+b[i]['tglTerbitKontrol']+'</td>';
        a+='<td><button class="btn-primary" onclick=Updateskdp(`'+b[i]['noSuratKontrol']+'`,`'+b[i]['poliTujuan']+'`,`'+b[i]['kodeDokter']+'`,`'+b[i]['noSepAsalKontrol']+'`)><i class="fas fa-pencil-alt"></i></button><button class="btn-primary" onclick=Deleteskdp(`'+b[i]['noSuratKontrol']+'`)><i class="fas fa-times-circle"></i></button></td>'
        a+='</tr>';
      }
      document.getElementById('tbodyrwjpendafhistorirencanakontrol').innerHTML=a;

    });
   }
   function Deleteskdp(skdp) {
    var a='';
    var param = 
    {skdp : skdp,
    user:  user.nama,};
    apiPOST('Bridging/DeleteRencanaKontrol', param, hasil =>{
    // alert(hasil['status']);

    });
  }
  function CekListRujukanKeluar() {
   var a='';
   var param = 
   {noka : $("#rwjpendafnoasuransi").val(),};
   apiPOST('Bridging/CekListRujukanKeluar', param, hasil =>{
    var b=hasil['data']['list'];
    for (var i = 0; i < b.length; i++) {
      a+='<tr>';
      a+='<th scope="row">1</th>';
      a+='<td><button class="btn-primary" onclick=inputskdp(`'+b[i]['noRujukan']+'`)>'+b[i]['noRujukan']+'</button></td>';
      a+='<td>'+b[i]['nama']+'</td>';
      a+='<td>'+b[i]['namaPpkDirujuk']+'</td>';
      a+='<td>'+b[i]['tglRujukan']+'</td>';
      a+='<td><button class="btn-primary" onclick=Updateskdp(`'+b[i]['noRujukan']+'`,`'+b[i]['tglRujukan']+'`)><i class="fas fa-pencil-alt"></i></button><button class="btn-primary" onclick=Deleterujukan(`'+b[i]['noRujukan']+'`)><i class="fas fa-times-circle"></i></button></td>'
      a+='</tr>';
    }
    document.getElementById('tbodyrwjpendafhistorirujukankeluar').innerHTML=a;

  });
 }
 function CekListFinger() {
   var a='GetListFingerPrint';
   var param = 
   {data:a,
   method:'GET',
   parameter:'1',parameter2:'2',};
   apiPOST('Bridging/bridging_tes', param, hasil =>{
    var b=hasil['data']['list'];
    for (var i = 0; i < 10; i++) {
      a+='<tr>';
      a+='<td>'+b[i]['noKartu']+'</td>';
      a+='<td>'+b[i]['noSEP']+'</td>';

      a+='</tr>';
    }
    document.getElementById('tbodyrwjpendaflistfinger').innerHTML=a;

  });
 }
 function Updateskdp(skdp,id_unit,id_dokter,sep) {
  $('#RWJpendaf_ModalCariDataSEP').modal('hide');
  $('#ModalUpdateSkdp').modal('show');
  document.getElementById('rwjskdpupdate').value         =skdp;
     // document.getElementById('rwjpolikontrolupdate').value=poli;
     // document.getElementById('rwjdpjpkontrolupdate').value=dokter;
  document.getElementById('idrwjpolikontrolupdate').value=id_unit;
  document.getElementById('idrwjdpjpkontrolupdate').value=id_dokter;
  document.getElementById('idrwjsepkontrolupdate').value =sep;
}
function Deleterujukan(rujukan) {
 var a='';
 var param = 
 {rujukan : rujukan,};
 apiPOST('Bridging/DeleteRujukan', param, hasil =>{
    // alert(hasil['status']);

 });
}
function prosesUpdateskdp() {
  var param = 
  {
    skdp : $("#rwjskdpupdate").val(),
    unit : $("#idrwjpolikontrolupdate").val(),
    dpjp : $("#idrwjdpjpkontrolupdate").val(),
    tgl  : $("#rwjtglkontrolupdate").val(),
    sep  : $("#idrwjsepkontrolupdate").val(),};
    apiPOST('Bridging/UpdateRencanaKontrol', param, hasil =>{

    });
  }
/*proses cetak*/
  function RWJpendf_createlabelpasien(){
    if (document.getElementById('rwjpendafkdpasien').value == ''){
     toastr.error('Silahkan Lakukan Pendaftaran Dahulu.');
   }else{

    var param = {
      norm      : document.getElementById('rwjpendafkdpasien').value,
      nm_pasien : document.getElementById('rwjpendafnamapasien').value,
      modul     : '1'
    };
    newTabPOST('API/Rawatjalan/createlabel',param);
    return;

  }
}

function RWJpendf_createkartupasien() {
  if (document.getElementById('rwjpendafkdpasien').value == ''){
   toastr.error('Silahkan Lakukan Pendaftaran Dahulu.');
 }else{

  var param = {
        //norm      : normOtomatis(document.getElementById('rwjpendafkdpasien').value),
    norm      : document.getElementById('rwjpendafkdpasien').value,
    nm_pasien : document.getElementById('rwjpendafnamapasien').value
  };
  newTabPOST('API/Cetak/cetakkartupasien', param);
  return;
}

}


function CetakSepIrja(sep){
  var param = {
    sep      : sep,
  };
  newTabPOST('API/Bridging/CetakSEPIRJA',param);
  return;
}
function Deletesepirja(sep){
  var param = {
    sep      : sep,
  };
  apiPOST('Bridging/DeleteSEP',param, hasil => {
  });
}

/*end proses cetak*/
</script>