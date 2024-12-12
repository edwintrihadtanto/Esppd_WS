<?php
  $nowday     = date('Y-m-d');
  //$nextday    = date('Y-m-d', strtotime('+1 days', strtotime($nowday))); 
  $nextday    = $nowday; 
?>
<div class="col-md-12 p-2">

  <div class="card card-outline card-danger">
    <div class="overlay-wrapper" id="HDpend_loadingawal">
      <div class="overlay">
        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
      </div>
    </div>  

    <div class="card-body p-2 darkgrey-custom" id='DivCariPasienHD'>
      <div class="row row-custom">
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Cari No. RM / Nama Pasien :</label>
            <div class="input-group input-group-sm mb-3">
              <div class="input-group-prepend">
                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="height:25px;"></button>
                <ul class="dropdown-menu">
                  <li class="dropdown-item cri_normpendfHD" onclick="show_cri_normpendfHD()">No. RekamMedik</li>
                  <li class="dropdown-item cri_nmpasienpendfHD" onclick="show_cri_nmpasienpendfHD()">Nama Pasien</li>
                </ul>
              </div>            
              <input type="search" id="searchpendfhd" class="form-control form-control-xs" placeholder="Entry RM..." autocomplete="off" onkeypress="caripasienbyrmhd(event)">
              <input type="search" class="form-control form-control-xs" placeholder="Entry Nama Pasien..." id="HDpend_nm_pasiencari" autocomplete="off">
            </div>
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label> NIK :</label>
            <input type="search" class="form-control form-control-xs" placeholder="Entry NIK" autocomplete="off" id="caripasienhdnik" onkeypress="caripasienhdbynik(event)">
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label for="exempel1"> Nama :</label>
            <input type="search" id="pendafhdcarinama" class="form-control form-control-xs" placeholder="Entry Nama" autocomplete="off" onkeypress="caripasienhdbynama(event)">
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label for="exempel1"> Alamat :</label>
            <input type="search" id="pendafhdcarialamat" class="form-control form-control-xs" placeholder="Entry Alamat" autocomplete="off" onkeypress="caripasienhdbyalamat(event)">
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label for="exempel1"> Jmlh Pasien :</label>
            <select size="1" class="form-control form-control-xs" id="countpasienhd">
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
                <h6 class="hr6-custom" id="hd_pendf_titleheader"><i class="fas fa-hospital-user"></i> Daftar Pasien</h6>
                <div id="hd_pendf_buttonList">
                  <button type="button" class="btn bg-gradient-secondary btn-xs" type="submit" onclick="caripasienhd()"> <i class="fas fa-user-plus"></i> Pasien Baru</button>
                </div>
                <div id="hd_pendf_buttonPasienBaru">
                  <button type="button" class="btn bg-gradient-secondary btn-xs" type="submit" onclick="savependfhd();"> <i class="fas fa-save"></i> Simpan</button>
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
                      <a class="dropdown-item" onclick="createlabelhd()" ><i class="fas fa-id-card"></i> Label Pasien</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#" ><i class="fas fa-id-card"></i> Status Pasien</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#" ><i class="fas fa-barcode"></i> Label Barcode</a>
                    </div>
                  </div>                  
                  <button type="button" class="btn bg-gradient-secondary btn-xs"  onclick="pendafhdcarisep()"> <i class="fas fa-user-plus"></i> Data SEP</button>
                  <button type="button" class="btn bg-gradient-secondary btn-xs"  onclick="pendafhdupdatedata()" id="buttoneditdatahd"><i class="fas fa-arrow-left"></i>Edit Data</button>
                  <button type="button" class="btn bg-gradient-secondary btn-xs"  onclick="pendafhdcanceldata()" style="display: none;" id="buttoncanceldata"><i class="fas fa-arrow-left"></i>Cancel Data</button>
                  <button type="button" class="btn bg-gradient-secondary btn-xs"  onclick="kembali_pend_hd()"> <i class="fas fa-arrow-left"></i> Kembali</button>
                  <input type="hidden" name="updatedatapasienhd" id="updatedatapasienhd" value="0">
                </div>
              </div>
              <div class="col-md-2">
                <div class="form_group">
                <label>Tgl. Kunjung :</label>
                <input type="date" name="hdpendaftglkunjungan" id="hdpendaftglkunjungan" class="form-control form-control-xs" disabled>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body" id='tabelpasienhd' style="padding: 0px; max-height: 320px; overflow: auto;">
            <table id="tablePendafataranHD" class="table table-striped table-sm choose" style="border-collapse: inherit;">
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

        <div class="card-body p-1" id="DivPasienHD" style="display: none; ">
          <div class="row" >
            <div class="col-12 col-sm-1">
              <div class="form_group">
                <label>Rekam Medis</label>
                <input type="text" name="hdpendafkdpasien" id="hdpendafkdpasien" class="form-control form-control-xs" onkeypress="hdpendafkdpasien(event)" readonly>
              </div>
            </div>            
            <div class="col-12 col-sm-2">
              <div class="form_group">
                <label>Nma Pasien</label>
                <input type="text" name="hdpendafnamapasien" id="hdpendafnamapasien" class="form-control form-control-xs" onkeypress="hdpendafnamapasien(event)" readonly>      
              </div>
            </div> 
            <div class="col-12 col-sm-2">
              <div class="form_group">
                <label>Keluarga</label>
                <input type="text" name="hdpendafkeluarga" id="hdpendafkeluarga" class="form-control form-control-xs" onkeypress="hdpendafkeluarga(event)" readonly>
              </div>
            </div> 
            <div class="col-12 col-sm-1">
              <div class="form_group">
                <label>Agama</label> 
                <select class="form-control form-control-xs" id="hdpendafagama" name="hdpendafagama" onkeypress="hdpendafagama(event)" readonly>
                  <option value="1">Islam</option>
                  <option value="2">Kristen</option>
                  <option value="3">Hindhu</option>
                  <option value="4">Budha</option>
                </select>     
              </div>
            </div> 
            <div class="col-12 col-sm-auto">
              <div class="form_group">
                <label>G.Darah</label> 
                <select name="hdpendafgoldarah" id="hdpendafgoldarah" class="form-control form-control-xs" onkeypress="hdpendafgoldarah(event)" readonly>
                  <option value="">-</option>
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
                <select name="hdpendafkelamin" id="hdpendafkelamin" class="form-control form-control-xs" onkeypress="hdpendafkelamin(event)" readonly>
                  <option value="t">Laki-laki</option>
                  <option value="f">Perempuan</option>
                </select>   
              </div>
            </div> 
            <div class="col-12 col-sm-auto">
              <div class="form_group">
                <label>Status Marital</label>
                <select name="hdpenstatusmarital" id="hdpendafstatusmarital" class="form-control form-control-xs" onkeypress="hdpenstatusmarital(event)" readonly>
                  <option value="1">Menikah</option>
                  <option value="2">Belum Menikah</option>
                </select>     
              </div>
            </div>
            <div class="col-12 col-sm-2">
              <div class="form_group">
                <label>No Telepon</label>
                <input type="text" name="hdpendaftelepon" id="hdpendaftelepon" class="form-control form-control-xs" onkeypress="hdpendaftelepon(event)" readonly> 
              </div>
            </div>
            <div class="col-12 col-sm-auto">
              <div class="form_group">
                <div class="icheck-danger d-inline ">
                  <label>WNI</label><br>
                  <input type="checkbox" name="hdpendafwni"  checked="true" id="hdpendafwni" onkeypress="hdpendafwni(event)" readonly>
                </div> 
              </div>
            </div>
            <div class="col-12 col-sm-2" >
              <div class="form_group">
                <label>Tempat Lahir</label>
                <input type="text" name="hdpendaftempatlahir" id="hdpendaftempatlahir" class="form-control form-control-xs" onkeypress="hdpendaftempatlahir(event)" readonly>      
              </div>
            </div> 
            <div class="col-12 col-sm-auto">
              <div class="form_group">
                <label>Tanggal Lahir</label>
                <input type="date"  name="hdpendaftanggallahir" id="hdpendaftanggallahir" class="form-control form-control-xs"  onkeypress="hdpendaftanggallahir(event)"  readonly>      
              </div>
            </div>
            <div class="col-12 col-sm-2">
              <div class="form_group">
                <label>Umur</label>
                <input type="text" name="hdpendf_umur" id="hdpendf_umur" class="form-control form-control-xs" placeholder="Otomatis" disabled>
              </div>
            </div>            
            <div class="col-12 col-sm-2">
              <div class="form_group">
                <label>NIK</label>
                <input type="text" name="hdpendafnik" id="hdpendafnik" class="form-control form-control-xs" onkeypress="hdpendafnik(event)" readonly>      
              </div>
            </div>      
            <div class="col-12 col-sm-2">
              <div class="form_group">
                <label>Pendidikan</label>
                <select name="hdpendafpendidikan" id="hdpendafpendidikan" class="form-control form-control-xs" onkeypress="hdpendafpendidikan(event)" readonly>
                </select>     
              </div>
            </div> 
            <div class="col-12 col-sm-2">
              <div class="form_group">
                <label>Pekerjaan</label>
                <select name="hdpendafpekerjaan" id="hdpendafpekerjaan" class="form-control form-control-xs" onkeypress="hdpendafpekerjaan(event)" readonly>
                </select>    
              </div>
            </div> 
            <div class="col-12 col-sm-3">
              <div class="form_group">
                <label>Alamat</label>
                <input type="text" name="hdpendafalamat" id="hdpendafalamat" class="form-control form-control-xs" onkeypress="hdpendafalamat(event)" readonly>      
              </div>
            </div>
            <div class="col-12 col-sm-2">
              <div class="form_group">
                <label>Propinsi</label>
                <select name="hdpendafpropinsi" id="hdpendafpropinsi" class="form-control form-control-xs" onkeypress="hdpendafpropinsi(event)" onchange="tampil_pendfhdkota();" readonly>
                </select>  
              </div>
            </div> 
            <div class="col-12 col-sm-2">
              <div class="form_group">
                <label>Kab/Kota</label>
                <select name="hdpendafkab" id="hdpendafkab" class="form-control form-control-xs" onkeypress="hdpendafkab(event)"  onchange="tampil_pendfhdkec();" readonly>
                </select>     
              </div>
            </div> 
            <div class="col-12 col-sm-2">
              <div class="form_group">
                <label>Kecamatan</label>
                <select name="hdpendafkec" id="hdpendafkec" class="form-control form-control-xs" onkeypress="hdpendafkec(event)" onchange="tampil_pendfhdkel();" readonly>
                </select>      
              </div>
            </div> 
            <div class="col-12 col-sm-2">
              <div class="form_group">
                <label>Kelurahan</label>
                <select name="hdpendafkelurahan" id="hdpendafkelurahan" class="form-control form-control-xs" onkeypress="hdpendafkelurahan(event)" readonly>
                </select>       
              </div>
            </div> 
            <div class="col-12 col-sm-1">
              <div class="form_group">
                <label>Kd.Pos</label>
                <input type="text" name="hdpendafkdpos" id="hdpendafkdpos" class="form-control form-control-xs" onkeypress="hdpendafkdpos(event)" readonly>      
              </div>
            </div> 
            <div class="col-12 col-sm-3">
              <div class="form_group">
                <label>Alamat KTP</label>
                <input type="text" name="hdpendafalamatktp" id="hdpendafalamatktp" class="form-control form-control-xs" onkeypress="hdpendafalamatktp(event)" readonly>
              </div>
            </div> 
            <div class="col-12 col-sm-2">
              <div class="form_group">
                <label>Propinsi KTP</label> 
                <select name="hdpendafpropinsiktp" id="hdpendafpropinsiktp" class="form-control form-control-xs" onkeypress="hdpendafpropinsiktp(event)" onchange="tampil_pendfhdkotaktp();" readonly>
                </select>    
              </div>
            </div> 
            <div class="col-12 col-sm-2">
              <div class="form_group">
                <label>Kab/Kota KTP</label> 
                <select name="hdpendafkabktp" id="hdpendafkabktp"  class="form-control form-control-xs" onkeypress="hdpendafkabktp(event)" onchange="tampil_pendfhdkecktp();" readonly>
                </select>    
              </div>
            </div> 
            <div class="col-12 col-sm-2">
              <div class="form_group">
                <label>Kecamatan KTP</label>
                <select name="hdpendafkecktp" id="hdpendafkecktp"  class="form-control form-control-xs" onkeypress="hdpendafkecktp(event)" onchange="tampil_pendfhdkelktp()" readonly >
                </select>      
              </div>
            </div> 
            <div class="col-12 col-sm-2">
              <div class="form_group">
                <label>Kelurahan KTP</label>
                <select name="hdpendafkelurahanktp" id="hdpendafkelurahanktp" class="form-control form-control-xs" onkeypress="hdpendafkelurahanktp(event)" readonly>
                </select> 
              </div>
            </div> 
            <div class="col-12 col-sm-1">
              <div class="form_group">
                <label>Kd.Pos</label>
                <input type="text" name="hdpendafkdposktp" id="hdpendafkdposktp" class="form-control form-control-xs" onkeypress="hdpendafkdposktp(event)" readonly>
              </div>
            </div>
          </div>

          <div class="card-body p-1" id="DivPendafDetailHD" style="display: none;">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="pill" href="#hdpendafkunjungan">Kunjungan</a>
              </li>              
              <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#hdpendaftanggungjawab">Penanggung Jawab</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#hdpendafkeluargakunjungan">Data Keluarga</a>
              </li>
              <li class="nav-item" id="tabriwayatill">
                <a class="nav-link" data-toggle="pill" href="#hdpendafriwayatpenyakit" >Riwayat Penyakit</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#hdpendafhistorykunjungan">History Kunjungan</a>
              </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane p-1 fade active show" id="hdpendafkunjungan" role="tabpanel">
                <h6 class="lead mb-0"><u>Rujukan</u></h6>
                <div class="row mb-0">
                  <div class="col-md-auto p-2">
                    <div class="form_group">
                      <div class="icheck-danger d-inline">
                        <input type="hidden" name="hd_pendf_caraterima" id="hd_pendf_caraterima" value=1>
                        <input type="radio" name="hdpendafrujukanpasien[]"  id="hdpendafrujukanpasien"  onclick="hdpendafrujukanpasien1()" >
                        <label>Datang sendiri</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-auto p-2">
                    <div class="form_group">
                      <div class="icheck-danger d-inline ">
                        <input type="radio" name="hdpendafrujukanpasien[]"  id="hdpendafrujukanpasien" onclick="hdpendafrujukanpasien2()" checked="true">
                        <label>Rujukan</label>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-md-2 p-2" id="divRujukanHD1">
                    <div id="hd_pendf_divrujukandari">
                      <div class="form_group">
                        <label>Rujukan dari</label>
                        <select name="hd_pendf_rujukandari" id="hd_pendf_rujukandari" class="form-control form-control-xs" onchange="RujukanHD()" onkeypress="RujukanHDEnter(event)">
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 p-2" id="divRujukanHD2">
                    <div id="hd_pendf_divtempatrujukan">
                      <div class="form_group ">
                        <label>Rujukan</label>
                        <select  name="hdpendaftempatrujukan" id="hdpendaftempatrujukan" class="form-control form-control-xs" onkeypress="hdpendaftempatrujukan(event)">
                          <option value="">-Pilih-</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                 
                <div class="col-md-12 p-0">
                  <div class="row" style="border-bottom: 2px dashed darkgrey;">
                    <div class="col-sm-2" id="hd_pendf_divsepmanual">
                      <div class="form_group ">
                        <div class="icheck-danger d-inline ">
                          <input type="radio" name="hdpendf_sepmanual" id="hdpendf_sepmanual"  onclick="cariRujukanPasienIrja();">
                          <label>SEP Manual</label>
                        </div>                            
                      </div>
                    </div>
                  </div>
                  <div class="row pt-1" style="background-color: whitesmoke;">
                    <div class="col-sm-2">
                      <div class="form_group">
                        <label>Poliklinik</label>
                        <select class="form-control form-control-xs" id="hdpendafpoliklinik" name="hdpendafpoliklinik" disabled>
						  <option value="1016">Poli Heamodialisa</option>
						</select>           
                      </div>
                    </div>
                    <div class="col-sm-2" id="divkelompokpasien">
                      <div class="form_group">
                        <label>Kelompok Pasien</label> 
                        <select name="hdpendafkelompokpasien" id="hdpendafkelompokpasien" class="form-control form-control-xs" onkeypress="hdpendafkelompokpasien(event)">
                          <option value="1">Asuransi</option>
                          <option value="2">Perusahaan</option>
                          <option value="3">Perorangan</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form_group" >
                        <label>Penjamin</label>
                        <select id="hdpendafPenjamin"  class="form-control form-control-xs" onkeypress="hdpendafPenjamin(event)">
                        </select>     
                      </div>
                    </div>                    
                    <div class="col-md-3">
                      <div class="form_group">
                        <label>Diagnosa</label>
                        <select class="hdpendafdiagnosa form-control form-control-xs" id="hdpendafdiagnosa" onkeypress="hdpendafdiagnosa(event)">        
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form_group">
                        <label>Dokter</label>
                        <select  name="hdpendafdokter" id="hdpendafdokter" class="form-control form-control-xs" onkeypress="hdpendafdokter(event)" >
                        </select>    
                      </div>
                    </div>
                    <div class="col-sm-2" id="divnoasuransi">
                      <div class="form_group">
                        <label>No. Asuransi</label> 
                        <input name="hdpendafnoasuransi" id="hdpendafnoasuransi" class="form-control form-control-xs" onkeypress="tampilmodalcreatesephd(event)">     
                      </div>
                    </div>
                    <div class="col-sm-2" id="divrujukanhd">
                      <div class="form_group">
                        <label>Rujukan</label> 
                        <input name="hdpendafrujukanbpjs" id="hdpendafrujukanbpjs" class="form-control form-control-xs">     
                      </div>
                    </div>
                    <div class="col-sm-2" id="divsep">
                      <div class="form_group">
                        <label>SEP</label> 
                        <input name="hdpendafSEP" id="hdpendafSEP" class="form-control form-control-xs" >     
                      </div>
                    </div>
                  </div>
                </div>               
              </div>              

              <div class="tab-pane p-1 fade" id="hdpendaftanggungjawab" role="tabpanel">
                <h6 class="lead mb-0"><u></u></h6>
                <div class="row">
                  <div class="col-sm-2">
                    <div class="form_group">
                      <label>Nama Penanggung Jawab</label>
                      <input type="text" name="hdpendafpenanggungjawab" id="hdpendafpenanggungjawab" class="form-control form-control-xs" onkeypress="hdhubpenanggujawab(event)" value="tidak ada">      
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form_group ">
                      <label>Hubungan Penanggung Jawab</label>
                      <input type="text" name="hdpendafhubpenanggungjawab" id="hdpendafhubpenanggungjawab" class="form-control form-control-xs" onkeypress="Penanggungjawabhd(event);" value="tidak ada">      
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form_group ">
                      <label>NIK</label>
                      <input type="text" name="hdpendafnikpenanggungjawab" id="hdpendafnikpenanggungjawab" class="form-control form-control-xs" onkeypress="Penanggungjawabhdnik(event)" value="tidak ada">      
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form_group ">
                      <label>Alamat</label>
                      <input type="text" name="hdpendafalamatpenanggungjawab" id="hdpendafalamatpenanggungjawab" class="form-control form-control-xs" onkeypress="Penanggungjawabhdtlfn(event)" value="tidak ada">      
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form_group ">
                      <label>No. Telp</label>
                      <input type="text" name="hdpendaftlfpenanggungjawab" id="hdpendaftlfpenanggungjawab" class="form-control form-control-xs" value="tidak ada">      
                    </div>
                  </div>
                </div>
              </div>

              <div class="tab-pane p-1 fade" id="hdpendafkeluargakunjungan" role="tabpanel">
                <h6 class="lead mb-0"><u></u></h6>
                <div class="row">
                  <div class="col-sm-4">
                    <div class="form_group">
                      <label>Nama Ayah</label>
                      <input type="text" name="hdpendafayah" id="hdpendafayah" class="form-control form-control-xs" onkeypress="hdpekerjaanAyah(event)">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form_group">
                      <label>Pekerjaan Ayah</label>
                      <select type="text" name="hdpendafpekerjaanayah" id="hdpendafpekerjaanayah" class="form-control form-control-xs" onkeypress="hdpendidikanAyah(event)">
                      </select>   
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form_group">
                      <label>Pendidikan Ayah</label>
                      <select type="text" name="hdpendafpendidikanayah" id="hdpendafpendidikanayah" class="form-control form-control-xs" onkeypress="namaIbu(event)">  
                      </select>    
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form_group">
                      <label>Nama Ibu</label>
                      <input type="text" name="hdpendafibu" id="hdpendafibu" class="form-control form-control-xs" onkeypress="hdpekerjaanIbu(event)">      
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form_group">
                      <label>Pekerjaan Ibu</label>
                      <select type="text" name="hdpendafpekerjaanibu" id="hdpendafpekerjaanibu" class="form-control form-control-xs" onkeypress="hdpendidikanIbu(event)">
                      </select>  
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form_group">
                      <label>Pendidikan Ibu</label>
                      <select type="text" name="hdpendafpendidikanibu" id="hdpendafpendidikanibu" class="form-control form-control-xs">
                      </select>
                    </div>
                  </div>
                </div>
              </div>

              <div class="tab-pane p-1 fade" id="hdpendafriwayatpenyakit" role="tabpanel">
                <h6 class="lead mb-0"><u></u></h6>
                <div class="row">
                  <div class="col-sm-12">
                    <table  id="bodyhdhistoripenyakit" class="table table-striped table-sm">
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
        
              <div class="tab-pane p-1 fade" id="hdpendafhistorykunjungan" role="tabpanel">
                <h6 class="lead mb-0"><u></u></h6>
                <div class="row">
                  <div class="col-sm-12">
                    <table id="bodyhdhistorykunjungan" class="table table-striped table-sm">
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
            <input type="text" class="form-control form-control-xs" name="hdpendafnokartu" id="hdpendafnokartu" onkeypress="hdpendaftampilnorujukan(event)">  
          </div>
          <div class="col-sm-6">
            <label>No rujukan</label>
            <input type="text" class="form-control form-control-xs" name="hdpendafnorujukan" id="hdpendafnorujukan"> 
            <div id="Divtampilrujukanhd"></div> 
          </div>
          <div class="col-sm-6">
            <label>Poli BPJS</label>
            <input type="text" class="form-control form-control-xs" name="hdpendafklinikbpjs" id="hdpendafklinikbpjs" onkeypress="hdpendaftampilcaridokter(event)">  
            <div id="Divtampildokterhdbpjs"></div>
          </div>
          <div class="col-sm-6">
            <label>Poli RS</label>
            <input type="text" class="form-control form-control-xs" name="hdpendafklinikRS" id="hdpendafklinikRS" >  
            <div id="Divtampildokterhdbpjs"></div>
          </div>
          <div class="col-sm-6">
            <label>Dokter</label>
            <input type="text" class="form-control form-control-xs" name="hdpendafdokterbpjs" id="hdpendafdokterbpjs" onkeypress="cekhistori(event)">  
            <div id="DivtampilSEPhd"></div>

          </div>
          <div class="col-sm-6">
            <label>No SKDP</label>
            <input type="text" class="form-control form-control-xs" name="hdpendaftampilskdp" id="hdpendaftampilskdp" readonly onkeypress="CreateRencanaKontrol(event)">  
            <div id="Divtampilskdphd" ></div>
          </div>
          <div class="col-sm-6">
            <label>No Rencana Kontrol</label>
            <input type="text" class="form-control form-control-xs" name="hdpendaftampilrencanakontrol" id="hdpendaftampilrencanakontrol" >  
          </div>
          <div class="col-sm-6" id="CreateSepIrjaTujuanKontrol">
            <label>Tujuan Kontrol</label>
            <select type="text" class="form-control form-control-xs" name="hdpendaftujuankontrol" id="hdpendaftujuankontrol" onchange="tujuanKunjunganHD()"> 
              <option value="0">Normal</option>
              <option value="1">Prosedur</option>
              <option value="2">Konsul Dokter</option>
            </select>
          </div>
          <div class="col-sm-6" id="CreateSepIrjaProsedur" style="display:none;">
            <label>Prosedur</label>
            <select type="text" class="form-control form-control-xs" name="hdpendafprosedur" id="hdpendafprosedur" onchange="flagProcedure()"> 
              <option value="99">---pilih---</option> 
              <option value="0">Prosedur Tidak Berkelanjutan</option>
              <option value="1">Prosedur dan Terapi Berkelanjutan</option>
            </select>
          </div>
          <div class="col-sm-6" id="CreateSepIrjaPenunjang" style="display:none;">
            <label>Penunjang</label>
            <select type="text" class="form-control form-control-xs" name="hdpendafpenunjang" id="hdpendafpenunjang"> 
              <option value="99">---pilih---</option> 
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
          <div class="col-sm-6" id="CreateSepIrjaAssesmenPelayanan" style="display:none;">
            <label>Assesmen Pelayanan</label>
            <select type="text" class="form-control form-control-xs" name="hdpendafAssesmenPelayanan" id="hdpendafAssesmenPelayanan">  

              <!--      "4": Atas Instruksi RS} ==> diisi jika tujuanKunj = "2" atau "0" (politujuan beda dengan poli rujukan dan hari beda), -->
              <option value="99">---pilih---</option>
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
          <tbody id="listskdphd">
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
<div class="modal fade" id="HDpendaf_ModalCariDataSEP" role="dialog">
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
                <a class="nav-link active" data-toggle="pill" href="#hdpendafhddatabpjspasien" onclick="hdpendafhddatabpjspasien()">Detail Data BPJS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="pill" onclick="hdpendafhistorisep()" href="#hdpendafhistorisep">History SEP</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="pill" onclick="CekListRencanaKontrol()" href="#hdpendafhistorirencanakontrol">Data Rencana Kontrol</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="tab-content">
          <div class="tab-pane p-2 fade active show" id="hdpendafhddatabpjspasien" role="tabpanel">
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
                <tbody id="DivpendafhdDetailPesertaBPJS">
                </tbody>
               </table>
              </div>
            </div>
          </div>
          <div class="tab-pane  fade" id="hdpendafhistorisep" role="tabpanel" >
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
                  <tbody id="tbodyhdpendafhistorisep">

                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="tab-pane  fade" id="hdpendafhistorirencanakontrol" role="tabpanel" >
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
                    </tr>
                  </thead>
                  <tbody id="tbodyhdpendafhistorirencanakontrol">
                  </tbody>
                </table>
              </div>
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
document.getElementById('hdpendaftglkunjungan').value = nowday;
  
  /*--- FUNGSI SELECT 2 DIAGNOSA --*/
 var data_pasien_pendaftaran_hd = {
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

  $(document).ready(tampil_diagnosa());  

function hdpendafdiagnosa(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  document.getElementById('hdpendafdokter').focus();
 }
}  

  /*--- END FUNGSI SELECT 2 DIAGNOSA --*/
  
  $('#searchpendfhd').show();
  $('#HDpend_nm_pasiencari').hide();
  $("#hd_pendf_buttonPasienBaru").hide();

function tampilmodalcreatesephd(e) {
     if (e.keyCode == 13) {
      $('#ModalCreateSEP').modal("show");
      getMapUnitBpjs();
      dpjpBPJS();
    document.getElementById('hdpendafnokartu').value=document.getElementById('hdpendafnoasuransi').value;
    document.getElementById('CreateSepIrjaProsedur').style.display='none';
    document.getElementById('CreateSepIrjaPenunjang').style.display='none';
    document.getElementById('CreateSepIrjaAssesmenPelayanan').style.display='none';
    }
}
function tujuanKunjunganHD() {
   if (document.getElementById('hdpendaftujuankontrol').value=='1') {
    document.getElementById('CreateSepIrjaProsedur').style.display='block';
    //document.getElementById('CreateSepIrjaPenunjang').style.display='block';
    //document.getElementById('CreateSepIrjaAssesmenPelayanan').style.display='block';
   } else{
    document.getElementById('CreateSepIrjaProsedur').style.display='none';
   }
}
function flagProcedure() {
	if (document.getElementById('hdpendafprosedur').value=='1') {
	  document.getElementById('CreateSepIrjaPenunjang').style.display='block';
	} else {
	  document.getElementById('CreateSepIrjaPenunjang').style.display='none';
	}
}
function tampil_diagnosa() {
  var param = {
      id: 'n18'
    };
    apiPOST('Data_Sosial/diagnosabyname', param, hasil => {
      var diagnosa = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        diagnosa += '<option value="' + a[i]['id_penyakit'] + '">' + a[i]['id_penyakit'] + ' | ' + a[i]['penyakit'] + '</option>';
      }
      document.getElementById('hdpendafdiagnosa').innerHTML = diagnosa;
  });
}
function CreateRencanaKontrol(e) {
  if (e.keyCode == 13) {
  var param ={
    unit:     document.getElementById('hdpendafklinikRS').value,
    dokter:   document.getElementById('hdpendafdokterbpjs').value,
    skdp:     document.getElementById('hdpendaftampilskdp').value
  };
      apiPOST('Bridging/CreateRencanaKontrol', param, hasil => {
      var penjamin = '';
      var a = hasil['data']['noSuratKontrol'];
      document.getElementById('hdpendaftampilrencanakontrol').value = a;
  });
    }
}
function cekhistori(e) {
    if (e.keyCode == 13) {
    var param = {
      noka    :document.getElementById('hdpendafnokartu').value,
      rujukan :document.getElementById('hdpendafnorujukan').value,
    };
    apiPOST('Bridging/CariSep',param, hasil => {
      var b=hasil['histori'];
      var a='';
      for (var i = 0; i < b.length; i++) {
        a+='<button class="btn btn-primary" style="width:100%;"  onclick="pendafhdHistori(`'+b[i]['noSep']+'`)" >'+b[i]['noSep']+' ('+b[i]['poli']+')</button>';
      }
      document.getElementById('DivtampilSEPhd').style.display="block";
      document.getElementById('DivtampilSEPhd').innerHTML=a;
    });
  }
}
function pendafhdHistori(sep) {
  document.getElementById('DivtampilSEPhd').style.display="none";
  document.getElementById('hdpendaftampilskdp').value=sep;


}
function hdpekerjaanAyah(e) {
  if (e.keyCode==13) {
    event.preventDefault();
    document.getElementById('hdpendafpekerjaanayah').focus();
  }
}
function hdpendidikanAyah(e) {
  if (e.keyCode==13) {
    event.preventDefault();
    document.getElementById('hdpendafpendidikanayah').focus();
  }
}
function namaIbu(e) {
  if (e.keyCode==13) {
    event.preventDefault();
    document.getElementById('hdpendafibu').focus();
  }
}
function hdpekerjaanIbu(e) {
  if (e.keyCode==13) {
    event.preventDefault();
    document.getElementById('hdpendafpekerjaanibu').focus();
  }
}
function hdpendidikanIbu(e) {
  if (e.keyCode==13) {
    event.preventDefault();
    document.getElementById('hdpendafpendidikanibu').focus();
  }
}
function hdhubpenanggujawab(e) {
  if (e.keyCode==13) {
    event.preventDefault();
    document.getElementById('hdpendafhubpenanggungjawab').focus();
  }
}
function Penanggungjawabhd(e) {
  if (e.keyCode==13) {
    event.preventDefault();
    document.getElementById('hdpendafnikpenanggungjawab').focus();
  }
}
function Penanggungjawabhdnik(e) {
  if (e.keyCode==13) {
    event.preventDefault();
    document.getElementById('hdpendafalamatpenanggungjawab').focus();
  }
  // body...
}
function Penanggungjawabhdtlfn(e) {
  if (e.keyCode==13) {
    event.preventDefault();
    document.getElementById('hdpendaftlfpenanggungjawab').focus();
  }
}
function hdpendafpoliklinik(e) {
     if (e.keyCode == 13) {
    event.preventDefault();
    document.getElementById('hdpendafkelompokpasien').focus();
  }

}
function getMapUnitBpjs() {
  var param={
    id:$("#hdpendafpoliklinik").val(),
  };
      apiPOST('Bridging/cariUnit',param, hasil => {
      var b=hasil['data'];
      document.getElementById('hdpendafklinikRS').value=b;
    });
}
function hdpendafkelompokpasien(e) {
       if (e.keyCode == 13) {
    event.preventDefault();
    document.getElementById('hdpendafPenjamin').focus();
  }
}
function hdpendafPenjamin(e) {
  if (e.keyCode == 13) {
    event.preventDefault();
    document.getElementById('hdpendafdiagnosa').focus();
  }
}
function hdpendafdiagnosa(e) {
  if (e.keyCode == 13) {
    event.preventDefault();
    document.getElementById('hdpendafdokter').focus();
  }
}
function hdpendafdokter(e) {
  if (e.keyCode == 13) {
    event.preventDefault();
    document.getElementById('hdpendafnoasuransi').focus();
    dpjpBPJS();
  }
}
function CreateSepIrja() {
  var param = {
    noka    :   $("#hdpendafnokartu").val(),
    rujukan :   $("#hdpendafnorujukan").val(),
    dpjp    :   $("#hdpendafdokterbpjs").val(),
    polibpjs:   $("#hdpendafklinikbpjs").val(),
    polirs  :   $("#hdpendafklinikRS").val(),
    tglRujukan: $("#tglRujukan").val(),
    ppk     :   $("#ppk").val(),
    diagnosa:   $("#hdpendafdiagnosa").val(),
    skdp    :   $("#hdpendaftampilrencanakontrol").val(),
    tujuankunj:      $("#hdpendaftujuankontrol").val(),
    prosedurkunj:    $("#hdpendafprosedur").val(),
    penunjangkunj:   $("#hdpendafpenunjang").val(),
    assesmenkunj:    $("#hdpendafAssesmenPelayanan").val()
  };
  apiPOST('Bridging/CreateSEPIrja', param, hasil => {
     if (hasil['status']=='sukses') {
        document.getElementById('hdpendafSEP').value=hasil['data']['sep']['noSep'];
        $('#ModalCreateSEP').modal('hide');
      }else{
        alert(hasil['pesan']);
      }

  })
}
function show_cri_normpendfHD(){
  $('#searchpendfhd').show();
  $('#HDpend_nm_pasiencari').hide();
  $("#searchpendfhd").trigger('focus');
}
function show_cri_nmpasienpendfHD(){
  $('#searchpendfhd').hide();
  $('#HDpend_nm_pasiencari').show();
  $("#HDpend_nm_pasiencari").trigger('focus');
}
function refresh_pendft_hd() {
  $('#HDpend_loadingawal').hide();
}

setTimeout(refresh_pendft_hd, 1000);  

$(document).ready(function() {
  tampil_pendfhdprov();
  tampil_pendfhdprovktp();
  tampil_pendfhdpendidikan();
  tampil_pendfhdpekerjaan();
  RujukanAsal(1);
  time();
  pegawai();

  function time() {
    var date = new Date();
    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();

    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;

    var today = year + "-" + month + "-" + day;       
    document.getElementById("hdpendaftanggallahir").value = today;
  }

  $('#asal_pasien').on('change', function() {
    $("#rujukandariluar").show();
  });

  function refresh_pendft_hd() {
    $('#HDpend_loadingawal').hide();
  }

  setTimeout(refresh_pendft_hd, 1000);

});
function pendafhdupdatedata() {
  document.getElementById("buttoncanceldata").style.display='block';
  document.getElementById("buttoneditdatahd").style.display='none';
  document.getElementById("updatedatapasienhd").value='1';
  document.getElementById("hdpendafnamapasien").removeAttribute('readonly');
  document.getElementById("hdpendafkeluarga").removeAttribute('readonly');
  document.getElementById("hdpendafagama").removeAttribute('readonly');
  document.getElementById("hdpendafgoldarah").removeAttribute('readonly');
  document.getElementById("hdpendafkelamin").removeAttribute('readonly');
  document.getElementById("hdpendafstatusmarital").removeAttribute('readonly');
  document.getElementById("hdpendaftempatlahir").removeAttribute('readonly');
  document.getElementById("hdpendaftanggallahir").removeAttribute('readonly');
  document.getElementById("hdpendafnik").removeAttribute('readonly');
  document.getElementById("hdpendafpendidikan").removeAttribute('readonly');
  document.getElementById("hdpendafpekerjaan").removeAttribute('readonly');
  document.getElementById("hdpendaftelepon").removeAttribute('readonly');
  document.getElementById("hdpendafwni").removeAttribute('readonly');
  document.getElementById("hdpendafalamat").removeAttribute('readonly');
  document.getElementById("hdpendafpropinsi").removeAttribute('readonly');
  document.getElementById("hdpendafkab").removeAttribute('readonly');
  document.getElementById("hdpendafkec").removeAttribute('readonly');
  document.getElementById("hdpendafkelurahan").removeAttribute('readonly');
  document.getElementById("hdpendafkdpos").removeAttribute('readonly');
  document.getElementById("hdpendafpropinsiktp").removeAttribute('readonly');
  document.getElementById("hdpendafkabktp").removeAttribute('readonly');
  document.getElementById("hdpendafkecktp").removeAttribute('readonly');
  document.getElementById("hdpendafkelurahanktp").removeAttribute('readonly');
  document.getElementById("hdpendafkdposktp").removeAttribute('readonly');
  document.getElementById("hdpendafalamatktp").removeAttribute('readonly');   
}
function pendafhdcanceldata() {
  document.getElementById("buttoncanceldata").style.display='none';
  document.getElementById("buttoneditdatahd").style.display='block';
  //RESET//
  document.getElementById("hdpendafkdpasien").value=data_pasien_pendaftaran_hd['no_rm'];
  document.getElementById("hdpendafnamapasien").value=data_pasien_pendaftaran_hd['nama'];
  document.getElementById("hdpendafkeluarga").value= data_pasien_pendaftaran_hd['nama_keluarga'];
  document.getElementById("hdpendafkdpasien").value=data_pasien_pendaftaran_hd['kd_agama'];
  document.getElementById("hdpendafagama").value=data_pasien_pendaftaran_hd['kd_agama'];
  document.getElementById("hdpendafnik").value=data_pasien_pendaftaran_hd['nik'];
  document.getElementById("hdpendafkelamin").value=data_pasien_pendaftaran_hd['jenis_kelamin'];
  document.getElementById("hdpendafstatusmarital").value=data_pasien_pendaftaran_hd['statusmarital'];
  document.getElementById("hdpendaftempatlahir").value=data_pasien_pendaftaran_hd['tempat_lahir'];
  document.getElementById("hdpendaftanggallahir").value=data_pasien_pendaftaran_hd['tgl_lahir'];
  document.getElementById("hdpendafpendidikan").value=data_pasien_pendaftaran_hd['kd_pendidikan'];
  document.getElementById("hdpendafpekerjaan").value=data_pasien_pendaftaran_hd['kd_pekerjaan'];
  document.getElementById("hdpendaftelepon").value=data_pasien_pendaftaran_hd['telepon'];
  document.getElementById("hdpendafwni").value=data_pasien_pendaftaran_hd['wni'];
  document.getElementById("hdpendafalamat").value=data_pasien_pendaftaran_hd['alamat'];
  document.getElementById("hdpendafpropinsi").value=data_pasien_pendaftaran_hd['kd_propinsi'];
  document.getElementById("hdpendafkdpos").value=data_pasien_pendaftaran_hd['kd_pos'];
  document.getElementById("hdpendafkdposktp").value=data_pasien_pendaftaran_hd['kd_pos_ktp'];

  //END RISET//
  document.getElementById("hdpendafnamapasien").setAttribute('readonly', true);
  document.getElementById("hdpendafkeluarga").setAttribute('readonly', true);
  document.getElementById("hdpendafagama").setAttribute('readonly', true);
  document.getElementById("hdpendafgoldarah").setAttribute('readonly', true);
  document.getElementById("hdpendafkelamin").setAttribute('readonly', true);
  document.getElementById("hdpendafstatusmarital").setAttribute('readonly', true);
  document.getElementById("hdpendaftempatlahir").setAttribute('readonly', true);
  document.getElementById("hdpendaftanggallahir").setAttribute('readonly', true);
  document.getElementById("hdpendafnik").setAttribute('readonly', true);
  document.getElementById("hdpendafpendidikan").setAttribute('readonly', true);
  document.getElementById("hdpendafpekerjaan").setAttribute('readonly', true);
  document.getElementById("hdpendaftelepon").setAttribute('readonly', true);
  document.getElementById("hdpendafwni").setAttribute('readonly', true);
  document.getElementById("hdpendafalamat").setAttribute('readonly', true);
  document.getElementById("hdpendafpropinsi").setAttribute('readonly', true);
  document.getElementById("hdpendafkab").setAttribute('readonly', true);
  document.getElementById("hdpendafkec").setAttribute('readonly', true);
  document.getElementById("hdpendafkelurahan").setAttribute('readonly', true);
  document.getElementById("hdpendafkdpos").setAttribute('readonly', true);
  document.getElementById("hdpendafpropinsiktp").setAttribute('readonly', true);
  document.getElementById("hdpendafkabktp").setAttribute('readonly', true);
  document.getElementById("hdpendafkecktp").setAttribute('readonly', true);
  document.getElementById("hdpendafkelurahanktp").setAttribute('readonly', true);
  document.getElementById("hdpendafkdposktp").setAttribute('readonly', true);
}
function savependfhd() {

  if (document.getElementById('hdpendafwni').checked =true) {
    var wni=true;
  } else {
    var wni=false;
  }
  var param = {
    no_rm:          $("#hdpendafkdpasien").val(),     
    namapasien:     $("#hdpendafnamapasien").val(),
    keluarga:       $("#hdpendafkeluarga").val(),
    agama:          $("#hdpendafagama").val(),
    goldarah:       $("#hdpendafgoldarah").val(),
    kelamin:        $("#hdpendafkelamin").val(),
    statusmarital:  $("#hdpendafstatusmarital").val(),
    tempatlahir:    $("#hdpendaftempatlahir").val(),
    tanggallahir:   $("#hdpendaftanggallahir").val(),
    nik:            $("#hdpendafnik").val(),
    pendidikan:     $("#hdpendafpendidikan").val(),
    pekerjaan:      $("#hdpendafpekerjaan").val(),
    telepon:        $("#hdpendaftelepon").val(),
    wni:            wni,
    alamat:         $("#hdpendafalamat").val(),
    propinsi:       $("#hdpendafpropinsi").val(),
    kabupaten:      $("#hdpendafkab").val(),
    kecamatan:      $("#hdpendafkec").val(),
    kelurahan:      $("#hdpendafkelurahan").val(),
    kdpos:          $("#hdpendafkdpos").val(),
    alamatktp:      $("#hdpendafalamatktp").val(),
    propinsiktp:    $("#hdpendafpropinsiktp").val(),
    kabupatenktp:   $("#hdpendafkabktp").val(),
    kecamatanktp:   $("#hdpendafkecktp").val(),
    kelurahanktp:   $("#hdpendafkelurahanktp").val(),
    kdposktp:       $("#hdpendafkdposktp").val(),
    tglkunjungan:   $("#hdpendaftglkunjungan").val(),
    nama_penanggung_jawab:          $("#hdpendafpenanggungjawab").val(),
    hubungan_penanggung_jawab:      $("#hdpendafhubpenanggungjawab").val(),
    id_penanggung_jawab:            $("#hdpendafnikpenanggungjawab").val(),
    alamatpenanggungjawab:          $("#hdpendafalamatpenanggungjawab").val(),
    no_hp_penanggung_jawab:         $("#hdpendaftlfpenanggungjawab").val(),
    ayah:                           $("#hdpendafayah").val(),
    pekerjaanayah:                  $("#hdpendafpekerjaanayah").val(),
    pendidikanayah:                 $("#hdpendafpendidikanayah").val(),
    ibu:                            $("#hdpendafibu").val(),
    pekerjaanibu:                   $("#hdpendafpekerjaanibu").val(),
    pendidikanibu:                  $("#hdpendafpendidikanibu").val(),
    id_user:                        user.id_user,
    id_unit:                        $("#hdpendafpoliklinik").val(),
    diagnosa:                       $("#hdpendafdiagnosa").val(),
    id_pegawai:                     $("#hdpendafdokter").val(),   
    caraterima:                     $("#hd_pendf_caraterima").val(), 
    rujukan:                        $("#hdpendaftempatrujukan").val(),  
    noka:                           $("#hdpendafnoasuransi").val(),       
    id_penjamin:                    $("#hdpendafPenjamin").val(),   
    no_sjp:                         $("#hdpendafSEP").val()
    
  };
  if ($("#hdpendafkdpasien").val() > '' && $("#updatedatapasienhd").val()=='0') {
    apiPOST("Kunjungan/addKunjungan", param, hasil =>{
		var par = hasil['data'];
		apiPOST("Heamodialisa/SaveKunjHD", par, hasil =>{				
			kembali_pend_hd();
		})
    });
  } else if( $("#updatedatapasienhd").val()=='1'){
     apiPOST("Heamodialisa/updatepasienhd", param, hasil => {
      if (hasil['pesan']=='Berhasil') {
        //document.getElementById('hdpendafkdpasien').value=hasil['no_rm'];
        var param = {      
          no_rm:          $("#hdpendafkdpasien").val(),     
          namapasien:     $("#hdpendafnamapasien").val(),
          keluarga:       $("#hdpendafkeluarga").val(),
          agama:          $("#hdpendafagama").val(),
          goldarah:       $("#hdpendafgoldarah").val(),
          kelamin:        $("#hdpendafkelamin").val(),
          statusmarital:  $("#hdpendafstatusmarital").val(),
          tempatlahir:    $("#hdpendaftempatlahir").val(),
          tanggallahir:   $("#hdpendaftanggallahir").val(),
          nik:            $("#hdpendafnik").val(),
          pendidikan:     $("#hdpendafpendidikan").val(),
          pekerjaan:      $("#hdpendafpekerjaan").val(),
          telepon:        $("#hdpendaftelepon").val(),
          wni:            $("#hdpendafwni").val(),
          alamat:         $("#hdpendafalamat").val(),
          propinsi:       $("#hdpendafpropinsi").val(),
          kabupaten:      $("#hdpendafkab").val(),
          kecamatan:      $("#hdpendafkec").val(),
          kelurahan:      $("#hdpendafkelurahan").val(),
          kdpos:          $("#hdpendafkdpos").val(),
          alamatktp:      $("#hdpendafalamatktp").val(),
          propinsiktp:    $("#hdpendafpropinsiktp").val(),
          kabupatenktp:   $("#hdpendafkabktp").val(),
          kecamatanktp:   $("#hdpendafkecktp").val(),
          kelurahanktp:   $("#hdpendafkelurahanktp").val(),
          kdposktp:       $("#hdpendafkdposktp").val(),
          tglkunjungan:   $("#hdpendaftglkunjungan").val(),
          nama_penanggung_jawab:          $("#hdpendafpenanggungjawab").val(),
          hubungan_penanggung_jawab:      $("#hdpendafhubpenanggungjawab").val(),
          id_penanggung_jawab:            $("#hdpendafnikpenanggungjawab").val(),
          alamatpenanggungjawab:          $("#hdpendafalamatpenanggungjawab").val(),
          no_hp_penanggung_jawab:         $("#hdpendaftlfpenanggungjawab").val(),
          ayah:                           $("#hdpendafayah").val(),
          pekerjaanayah:                  $("#hdpendafpekerjaanayah").val(),
          pendidikanayah:                 $("#hdpendafpendidikanayah").val(),
          alamat_ayah:                    $("#hdpendafalamatayah").val(),
          nik_ayah:                       $("#hdpendafnikayah").val(),
          tlfn_ayah:                      $("hdpendaftlfayah").val(),
          ibu:                            $("#hdpendafibu").val(),
          alamat_ibu:                     $("#hdpendafalamatibu").val(),
          pekerjaanibu:                   $("#hdpendafpekerjaanibu").val(),
          pendidikanibu:                  $("#hdpendafpendidikanibu").val(),
          nik_ibu:                        $("#hdpendafnikibu").val(),
          tlfn_ibu:                       $("hdpendaftlfibu").val(),
          id_user:                        user.id_user,
          id_unit:                        $("#hdpendafpoliklinik").val(),
          id_pegawai:                     $("#hdpendafdokter").val(), //hdpendafdiagnosa
          diagnosa:                       $("#hdpendafdiagnosa").val(),
          caraterima:                     $("#hd_pendf_caraterima").val(), 
          rujukan:                        $("#hdpendaftempatrujukan").val(),
          noka:                           $("#hdpendafnoasuransi").val(), 
          id_penjamin:                    $("#hdpendafPenjamin").val(),   
          no_sjp:                         $("#hdpendafSEP").val()
        };
        apiPOST("Kunjungan/addKunjungan", param, hasil =>{
			var par = hasil['data'];
			apiPOST("Heamodialisa/SaveKunjHD", par, hasil =>{				
				kembali_pend_hd();
			})
        });
      } else {
        alert(hasil['pesan']); 
      }     
    });
  } else {
    apiPOST("Heamodialisa/simpanpasienhd", param, hasil => {
      if (hasil['pesan']=='Berhasil') {
        document.getElementById('hdpendafkdpasien').value=hasil['no_rm'];
        var param = {      
          no_rm:          $("#hdpendafkdpasien").val(),     
          namapasien:     $("#hdpendafnamapasien").val(),
          keluarga:       $("#hdpendafkeluarga").val(),
          agama:          $("#hdpendafagama").val(),
          goldarah:       $("#hdpendafgoldarah").val(),
          kelamin:        $("#hdpendafkelamin").val(),
          statusmarital:  $("#hdpendafstatusmarital").val(),
          tempatlahir:    $("#hdpendaftempatlahir").val(),
          tanggallahir:   $("#hdpendaftanggallahir").val(),
          nik:            $("#hdpendafnik").val(),
          pendidikan:     $("#hdpendafpendidikan").val(),
          pekerjaan:      $("#hdpendafpekerjaan").val(),
          telepon:        $("#hdpendaftelepon").val(),
          wni:            $("#hdpendafwni").val(),
          alamat:         $("#hdpendafalamat").val(),
          propinsi:       $("#hdpendafpropinsi").val(),
          kabupaten:      $("#hdpendafkab").val(),
          kecamatan:      $("#hdpendafkec").val(),
          kelurahan:      $("#hdpendafkelurahan").val(),
          kdpos:          $("#hdpendafkdpos").val(),
          alamatktp:      $("#hdpendafalamatktp").val(),
          propinsiktp:    $("#hdpendafpropinsiktp").val(),
          kabupatenktp:   $("#hdpendafkabktp").val(),
          kecamatanktp:   $("#hdpendafkecktp").val(),
          kelurahanktp:   $("#hdpendafkelurahanktp").val(),
          kdposktp:       $("#hdpendafkdposktp").val(),
          tglkunjungan:   $("#hdpendaftglkunjungan").val(),
          nama_penanggung_jawab:          $("#hdpendafpenanggungjawab").val(),
          hubungan_penanggung_jawab:      $("#hdpendafhubpenanggungjawab").val(),
          id_penanggung_jawab:            $("#hdpendafnikpenanggungjawab").val(),
          alamatpenanggungjawab:          $("#hdpendafalamatpenanggungjawab").val(),
          no_hp_penanggung_jawab:         $("#hdpendaftlfpenanggungjawab").val(),
          ayah:                           $("#hdpendafayah").val(),
          pekerjaanayah:                  $("#hdpendafpekerjaanayah").val(),
          pendidikanayah:                 $("#hdpendafpendidikanayah").val(),
          alamat_ayah:                    $("#hdpendafalamatayah").val(),
          nik_ayah:                       $("#hdpendafnikayah").val(),
          tlfn_ayah:                      $("hdpendaftlfayah").val(),
          ibu:                            $("#hdpendafibu").val(),
          alamat_ibu:                     $("#hdpendafalamatibu").val(),
          pekerjaanibu:                   $("#hdpendafpekerjaanibu").val(),
          pendidikanibu:                  $("#hdpendafpendidikanibu").val(),
          nik_ibu:                        $("#hdpendafnikibu").val(),
          tlfn_ibu:                       $("hdpendaftlfibu").val(),
          id_user:                        user.id_user,
          id_unit:                        $("#hdpendafpoliklinik").val(),
          id_pegawai:                     $("#hdpendafdokter").val(), //hdpendafdiagnosa
          diagnosa:                       $("#hdpendafdiagnosa").val(),
          caraterima:                     $("#hd_pendf_caraterima").val(), 
          rujukan:                        $("#hdpendaftempatrujukan").val(),
          noka:                           $("#hdpendafnoasuransi").val(), 
          id_penjamin:                    $("#hdpendafPenjamin").val(),   
          no_sjp:                         $("#hdpendafSEP").val()
        };
        apiPOST("Kunjungan/addKunjungan", param, hasil =>{
			var par = hasil['data'];
			apiPOST("Heamodialisa/SaveKunjHD", par, hasil =>{				
				kembali_pend_hd();
			})
        });
      } else {
        alert(hasil['pesan']); 
      }     
    });
  }
}
function pendafhdcarisep() {
  $('#HDpendaf_ModalCariDataSEP').modal("show");
}
function tampil_pendfhdpekerjaan() {
  apiPOST('Data_Sosial/pekerjaan', null,hasil=>{
    var pekerjaan='';
    var a=hasil['data'];
    pekerjaan = ""
    for (var i = 0; i < a.length; i++) {
      pekerjaan+='<option value="'+a[i]['kd_pekerjaan']+'">'+a[i]['pekerjaan']+'</option>';
    }
    document.getElementById('hdpendafpekerjaan').innerHTML=pekerjaan;
    document.getElementById('hdpendafpekerjaanayah').innerHTML=pekerjaan;
    document.getElementById('hdpendafpekerjaanibu').innerHTML=pekerjaan;
  });
}
function tampil_pendfhdpendidikan() {
  apiPOST('Data_Sosial/pendidikan', null,hasil=>{
    var pendidikan='';
    var a=hasil['data'];
    pendidikan = ""
    for (var i = 0; i < a.length; i++) {
      pendidikan+='<option value="'+a[i]['kd_pendidikan']+'">'+a[i]['pendidikan']+'</option>';
    }
    document.getElementById('hdpendafpendidikan').innerHTML=pendidikan;
    document.getElementById('hdpendafpendidikanayah').innerHTML=pendidikan;
    document.getElementById('hdpendafpendidikanibu').innerHTML=pendidikan;
  });
}
function tampil_pendfhdprov() {
  apiPOST('Heamodialisa/propinsi', null,hasil=>{
    var prov='';
    var a=hasil['data'];
    for (var i = 0; i < a.length; i++) {
      prov+='<option value="'+a[i]['kd_propinsi']+'">'+a[i]['propinsi']+'</option>';
    }
    document.getElementById('hdpendafpropinsi').innerHTML=prov;
  });
}
function RujukanAsal(kode) {
  var param = {id:kode,};
  apiPOST('Heamodialisa/rujukanAsal', param,hasil=>{
    var b='';
    var a=hasil['data'];
    for (var i = 0; i < a.length; i++) {
      b+='<option value="'+a[i]['cara_penerimaan']+'">'+a[i]['penerimaan']+'</option>';
    }
    document.getElementById('hd_pendf_rujukandari').innerHTML=b;
	RujukanHD()
  });
}
function RujukanHD() {
    var param = {id:$('#hd_pendf_rujukandari').val(),};
  apiPOST('Heamodialisa/rujukan', param,hasil=>{
    var b='';
    var a=hasil['data'];
    for (var i = 0; i < a.length; i++) {
      b+='<option value="'+a[i]['kd_rujukan']+'">'+a[i]['rujukan']+'</option>';
    }
    document.getElementById('hdpendaftempatrujukan').innerHTML=b;
  });
}
function tampil_pendfhdkota() {
  var param={id : $("#hdpendafpropinsi").val(),};
  apiPOST('Heamodialisa/kota', param,hasil=>{
    var kab='';
    var a=hasil['data'];
    for (var i = 0; i < a.length; i++) {
      kab+='<option value="'+a[i]['kd_kabupaten']+'">'+a[i]['kabupaten']+'</option>';
    }
    document.getElementById('hdpendafkab').innerHTML=kab;
  });
}
function tampil_pendfhdkotaby(kode) {
  var param={id : kode,};
  apiPOST('Heamodialisa/kota', param,hasil=>{
    var kab='';
    var a=hasil['data'];
    for (var i = 0; i < a.length; i++) {
      kab+='<option value="'+a[i]['kd_kabupaten']+'">'+a[i]['kabupaten']+'</option>';
    }
    document.getElementById('hdpendafkab').innerHTML=kab;

  });
}
function tampil_pendfhdkotaktpby(kode) {
  var param={id : kode,};
  apiPOST('Heamodialisa/kota', param,hasil=>{
    var kab='';
    var a=hasil['data'];
    for (var i = 0; i < a.length; i++) {
      kab+='<option value="'+a[i]['kd_kabupaten']+'">'+a[i]['kabupaten']+'</option>';
    }
    document.getElementById('hdpendafkabktp').innerHTML=kab;

  });
}
  
  //hdpendafkec
function tampil_pendfhdkec() {
  var param={id : $("#hdpendafkab").val(),};
  apiPOST('Heamodialisa/kecamatan', param,hasil=>{
    var kec='';
    var a=hasil['data'];
    for (var i = 0; i < a.length; i++) {
      kec+='<option value="'+a[i]['kd_kecamatan']+'">'+a[i]['kecamatan']+'</option>';
    }
    document.getElementById('hdpendafkec').innerHTML=kec;
  });
}
function tampil_pendfhdkecby(kode) {
  var param={id : kode,};
  apiPOST('Heamodialisa/kecamatan', param,hasil=>{
    var kec='';
    var a=hasil['data'];
    for (var i = 0; i < a.length; i++) {
      kec+='<option value="'+a[i]['kd_kecamatan']+'">'+a[i]['kecamatan']+'</option>';
    }
    document.getElementById('hdpendafkec').innerHTML=kec;
    document.getElementById('hdpendafkab').value=kode;
  });
}
function tampil_pendfhdkecktpby(kode) {
  var param={id : kode,};
  apiPOST('Heamodialisa/kecamatan', param,hasil=>{
    var kec='';
    var a=hasil['data'];
    for (var i = 0; i < a.length; i++) {
      kec+='<option value="'+a[i]['kd_kecamatan']+'">'+a[i]['kecamatan']+'</option>';
    }
    document.getElementById('hdpendafkecktp').innerHTML=kec;
    document.getElementById('hdpendafkabktp').value=kode;
    
  });
}
function tampil_pendfhdkel() {
  var param={id : $("#hdpendafkec").val(),};
  apiPOST('Heamodialisa/kelurahan', param,hasil=>{
    var kec='';
    var a=hasil['data'];
    for (var i = 0; i < a.length; i++) {
      kec+='<option value="'+a[i]['kd_kelurahan']+'">'+a[i]['kelurahan']+'</option>';
    }
    document.getElementById('hdpendafkelurahan').innerHTML=kec;
  });
}
function tampil_pendfhdkelby(kode) {
  var param={id : kode  ,};
  apiPOST('Heamodialisa/kelurahan', param,hasil=>{
    var kec='';
    var a=hasil['data'];
    for (var i = 0; i < a.length; i++) {
      kec+='<option value="'+a[i]['kd_kelurahan']+'">'+a[i]['kelurahan']+'</option>';
    }
    document.getElementById('hdpendafkelurahan').innerHTML=kec;
    document.getElementById('hdpendafkec').value=kode;
  });
}
function tampil_pendfhdkelktpby(kode) {
  var param={id : kode  ,};
  apiPOST('Heamodialisa/kelurahan', param,hasil=>{
    var kec='';
    var a=hasil['data'];
    for (var i = 0; i < a.length; i++) {
      kec+='<option value="'+a[i]['kd_kelurahan']+'">'+a[i]['kelurahan']+'</option>';
    }
    document.getElementById('hdpendafkelurahanktp').innerHTML=kec;
    document.getElementById('hdpendafkecktp').value=kode;
    //document.getElementById('hdpendafkelurahanktp').value=kode;
  });
}
function tampil_pendfhdprovktp() {
  apiPOST('Heamodialisa/propinsi', null,hasil=>{
    var prov='';
    var a=hasil['data'];
    for (var i = 0; i < a.length; i++) {
      prov+='<option value="'+a[i]['kd_propinsi']+'">'+a[i]['propinsi']+'</option>';
    }
    document.getElementById('hdpendafpropinsiktp').innerHTML=prov;
  });
}
function tampil_pendfhdkotaktp() {
  var param={id : $("#hdpendafpropinsiktp").val(),};
  apiPOST('Heamodialisa/kota', param,hasil=>{
    var kab='';
    var a=hasil['data'];
    for (var i = 0; i < a.length; i++) {
      kab+='<option value="'+a[i]['kd_kabupaten']+'">'+a[i]['kabupaten']+'</option>';
    }
    document.getElementById('hdpendafkabktp').innerHTML=kab;
  });
}
  
  //hdpendafkec
function tampil_pendfhdkecktp() {
  var param={id : $("#hdpendafkabktp").val(),};
  apiPOST('Heamodialisa/kecamatan', param,hasil=>{
    var kec='';
    var a=hasil['data'];
    for (var i = 0; i < a.length; i++) {
      kec+='<option value="'+a[i]['kd_kecamatan']+'">'+a[i]['kecamatan']+'</option>';
    }
    document.getElementById('hdpendafkecktp').innerHTML=kec;
  });
}
function tampil_pendfhdkelktp() {
  var param={id : $("#hdpendafkecktp").val(),};
  apiPOST('Heamodialisa/kelurahan', param,hasil=>{
    var kec='';
    var a=hasil['data'];
    for (var i = 0; i < a.length; i++) {
      kec+='<option value="'+a[i]['kd_kelurahan']+'">'+a[i]['kelurahan']+'</option>';
    }
    document.getElementById('hdpendafkelurahanktp').innerHTML=kec;
  });
}
function datapasien() {
  var param = {
    nik:'12345566',
  };
  apiPOST('Bridging/CariRujukanIrja', param, hasil =>{
   alert(hasil['status']);
   document.getElementById('hdpendafnamapasien').value=hasil['peserta']['nama'];
 });
}
function inputskdp(skdp) {
  document.getElementById('hdpendaftampilrencanakontrol').value=skdp;
  $('#HDpendaf_ModalCariDataSEP').modal("hide");
}
function pendafhdtampildokter(kode,nama) {
  document.getElementById('Divtampildokterhdbpjs').style.display="none";
  document.getElementById('hdpendafdokterbpjs').value=kode;
}
function pendafhdcarirujukan(norujukan,kode,ppk,tgl) {
  document.getElementById('Divtampilrujukanhd').style.display="none";
  document.getElementById('hdpendafnorujukan').value=norujukan;
  document.getElementById('hdpendafrujukanbpjs').value=norujukan;
  document.getElementById('hdpendafklinikbpjs').value=kode;
  document.getElementById('ppk').value=ppk;
  document.getElementById('tglRujukan').value=tgl;
  if (document.getElementById('hdpendafklinikRS').value==kode) {
        document.getElementById('hdpendaftampilskdp').value='';
        } else {
          document.getElementById('hdpendaftampilskdp').value='0';
          document.getElementById('hdpendaftampilrencanakontrol').value='0';
          
        }
}

$('#hdpendafkelompokpasien').on('change', function() {
   var param={kel_penj : $("#hdpendafkelompokpasien").val()};

  apiPOST('Heamodialisa/penjamin', param,hasil=>{
    var res='';
    var a=hasil['data'];
    for (var i = 0; i < a.length; i++) {
      res+='<option value="'+a[i]['id_penjamin']+'">'+a[i]['nama_penjamin']+'</option>';
    }
    document.getElementById('hdpendafPenjamin').innerHTML=res;
  });
});
$('#hdpendafkelompokpasien').on('keyup', function() {
   var param={kel_penj : $("#hdpendafkelompokpasien").val(),};
  apiPOST('Heamodialisa/penjamin', param,hasil=>{
    var res='';
    var a=hasil['data'];
    for (var i = 0; i < a.length; i++) {
      res+='<option value="'+a[i]['id_penjamin']+'">'+a[i]['nama_penjamin']+'</option>';
    }
    document.getElementById('hdpendafPenjamin').innerHTML=res;
  });
});
function penjaminTunai() {
  // var param={no_rm:  };
  if($("#hdpendafkdpasien").val()>0){
    apiPOST('Heamodialisa/penjamin', $("#hdpendafkdpasien").val(),hasil=>{
    var res='';
    var a=hasil['data'];
    for (var i = 0; i < a.length; i++) {
      res+='<option value="'+a[i]['id_penjamin']+'">'+a[i]['nama_penjamin']+'</option>';
    }
    document.getElementById('hdpendafPenjamin').innerHTML=res;
    });
  }else{
  document.getElementById('hdpendafPenjamin').innerHTML='<option value="1">UMUM</option>';
  }
}
function hdpendaftempatrujukan(e) {
  if (e.keyCode == 13) {
    event.preventDefault();
    document.getElementById('hdpendafpoliklinik').focus();
  }
}
function RujukanHDEnter(e) {
  if (e.keyCode==13) {
    event.preventDefault();
    document.getElementById('hdpendaftempatrujukan').focus();
  }
}
function hdpendafkdpasien(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  document.getElementById('hdpendafnamapasien').focus();
}
}
function hdpendafnamapasien(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  document.getElementById('hdpendafkeluarga').focus();
}
}
function hdpendafkeluarga(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  document.getElementById('hdpendafagama').focus();
}
}
function hdpendafagama(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  document.getElementById('hdpendafgoldarah').focus();
}
}
function hdpendafgoldarah(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  document.getElementById('hdpendafkelamin').focus();
}
}
function hdpendafkelamin(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  document.getElementById('hdpendafstatusmarital').focus();
}
}
function hdpenstatusmarital(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  document.getElementById('hdpendaftelepon').focus();
}
}
function hdpendaftempatlahir(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  document.getElementById('hdpendaftanggallahir').focus();
}
}
function hdpendaftanggallahir(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  age();
  document.getElementById('hdpendafnik').focus();
}
}
function hdpendafnik(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  document.getElementById('hdpendafpendidikan').focus();
}
}
function hdpendafpendidikan(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  document.getElementById('hdpendafpekerjaan').focus();
}
}
function hdpendafpekerjaan(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  document.getElementById('hdpendafalamat').focus();
}
}
function hdpendaftelepon(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  document.getElementById('hdpendafwni').focus();
}
}
function hdpendafwni(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  document.getElementById('hdpendaftempatlahir').focus();
}
}
function hdpendafalamat(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  document.getElementById('hdpendafpropinsi').focus();
}
}
function hdpendafpropinsi(e) {
 if (e.keyCode == 13) {
  if (document.getElementById('hdpendafkdpasien').value=='') {
    event.preventDefault();
    document.getElementById('hdpendafkab').focus();
    tampil_pendfhdkota() ;
  } else {
    event.preventDefault();
    document.getElementById('hdpendafkab').focus();
  }
}
}
function hdpendafkab(e) {
 if (e.keyCode == 13) {
  if (document.getElementById('hdpendafkdpasien').value=='') {
  event.preventDefault();
  document.getElementById('hdpendafkec').focus();
  tampil_pendfhdkec();
}else{
  event.preventDefault();
  document.getElementById('hdpendafkec').focus();
  }
}
}
function hdpendafkec(e) {
 if (e.keyCode == 13) {
  if (document.getElementById('hdpendafkdpasien').value=='') {
    event.preventDefault();
    document.getElementById('hdpendafkelurahan').focus();
    tampil_pendfhdkel();
  }else{
    event.preventDefault();
    document.getElementById('hdpendafkelurahan').focus();
    }
  }
}
function hdpendafkelurahan(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  document.getElementById('hdpendafkdpos').focus();
}
}
function hdpendafkdpos(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  document.getElementById('hdpendafalamatktp').focus();
}
}
function hdpendafalamatktp(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  document.getElementById('hdpendafpropinsiktp').focus();
}
}
function hdpendafpropinsiktp(e) {
 if (e.keyCode == 13) {
  if (document.getElementById('hdpendafkdpasien').value=='') {
      event.preventDefault();
    document.getElementById('hdpendafkabktp').focus();
    tampil_pendfhdkotaktp();
  } else {
    event.preventDefault();
    document.getElementById('hdpendafkabktp').focus();
  }

}
}
function hdpendafkabktp(e) {
 if (e.keyCode == 13) {
  if (document.getElementById('hdpendafkdpasien').value=='') {
      event.preventDefault();
    document.getElementById('hdpendafkecktp').focus();
    tampil_pendfhdkecktp();
  } else {
    event.preventDefault();
    document.getElementById('hdpendafkecktp').focus();
  }

}
}
function hdpendafkelktp(e) {
 if (e.keyCode == 13) {
  if (document.getElementById('hdpendafkdpasien').value=='') {
      event.preventDefault();
    document.getElementById('hdpendafkelurahanktp').focus();
  tampil_pendfhdkelktp();
  } else {
    event.preventDefault();
    document.getElementById('hdpendafkelurahanktp').focus();
  }

}
}
function hdpendafkecktp(e) {
 if (e.keyCode == 13) {
  if (true) {
      event.preventDefault();
    document.getElementById('hdpendafkelurahanktp').focus();
  tampil_pendfhdkelktp();
  } else {
    event.preventDefault();
    document.getElementById('hdpendafkelurahanktp').focus();
  }
}
}
function hdpendafkelurahanktp(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  document.getElementById('hdpendafkdposktp').focus();
}
}
function hdpendafkdposktp(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  document.getElementById('hdpendafpoliklinik').focus();
}
}
function hdpendaftglkunjungan(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  document.getElementById('hdpendafalergi').focus();
}
}
function hd_pendf_rujukandari(e) {
 if (e.keyCode == 13) {
  event.preventDefault();
  document.getElementById('hdpendaftempatrujukan').focus();
}
}
function age() {
   var spliya = $('#hdpendaftanggallahir').val(); // in   "mm/dd/yyyy" format
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
    document.getElementById('hdpendf_umur').value = fyear + " Thn "+ fmonths + " Bln "+ fdays + " Hri";
    document.getElementById('hdpendafnik').focus();
  }

//hdpendafrujukanpasien
function hdpendafrujukanpasien1() {
    document.getElementById("hd_pendf_divrujukandari").style.display   = "none";
    document.getElementById("hd_pendf_divtempatrujukan").style.display = "none";
    document.getElementById("hd_pendf_divsepmanual").style.display     = "none";
    document.getElementById("hd_pendf_caraterima").value               = 1;
    document.getElementById("divRujukanHD1").style.display                = "none";
    document.getElementById("divRujukanHD2").style.display                = "none";
    RujukanAsal(99);
    penjaminTunai();
    document.getElementById('divkelompokpasien').style.display          = "none";     
    document.getElementById('divnoasuransi').style.display              = "none";
    document.getElementById('divrujukanhd').style.display                 = "none"; 
    document.getElementById('divsep').style.display                     = "none";  
}
function hdpendafrujukanpasien2() {
    document.getElementById("hd_pendf_divrujukandari").style.display   = "block";
    document.getElementById("hd_pendf_divtempatrujukan").style.display = "block";    
    document.getElementById("hd_pendf_divsepmanual").style.display     = "block";
    document.getElementById("hd_pendf_rujukandari").focus();
    document.getElementById("hd_pendf_caraterima").value               = 2;
    document.getElementById("divRujukanHD1").style.display                = "block";
    document.getElementById("divRujukanHD2").style.display                = "block";
    document.getElementById('divkelompokpasien').style.display          = "block";     
    document.getElementById('divnoasuransi').style.display              = "block";
    document.getElementById('divrujukanhd').style.display                 = "block"; 
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
function caripasienhd() {
  tambahpasienhd();
  carihistorikunjungan(0);
  carihistoripenyakit(0);
}
function pegawai() {
   apiPOST('Heamodialisa/pegawai', null,hasil=>{
  var a=hasil['data'];
  var pegawai='';
  for (var i = 0; i < a.length; i++) {
    pegawai+='<option value="'+a[i]['id_pegawai']+'">'+a[i]['nama_pegawai']+'</option>';
  }
  document.getElementById('hdpendafdokter').innerHTML=pegawai;
});
}
function dpjpBPJS() {
  var param={
    id:$("#hdpendafdokter").val(),
  };
   apiPOST('Heamodialisa/dpjpBPJS', param,hasil=>{
  var a=hasil['data'];
  document.getElementById('hdpendafdokterbpjs').value=a;
});

}
function caripropinsibyrm(kode){
  var param={id:kode,};
  apiPOST('Data_Sosial/propinsiby', param,hasil=>{
    var prov=hasil['data']['kd_propinsi'];
    var kota=hasil['data']['kd_kabupaten'];
    var kec =hasil['data']['kd_kecamatan'];
    var kel =hasil['data']['kd_kelurahan'];
    tampil_pendfhdkotaby(prov);
    tampil_pendfhdkecby(kota);
    tampil_pendfhdkelby(kec);
    document.getElementById('hdpendafpropinsi').value  =prov;
  });
}
function tampilicd() {
 var icd=document.getElementById('hdpendafdiagnosa').val();
 var param={id:icd,};
  if (icd.length >2 ) {
     apiPOST('Bridging/icd', param,hasil=>{
        var tampil='';
        var a=hasil['data'];
        for (var i = 0; i < a.length; i++) {
          tampil+='<option value='+a[i].id_penyakit+'>'+a[i].a.id_penyakit+'</option>';
        }
        document.getElementById('hdpendafdiagnosa').innerHTML=tampil;
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
    tampil_pendfhdkotaktpby(prov);
    tampil_pendfhdkecktpby(kota);
    tampil_pendfhdkelktpby(kec);
    document.getElementById('hdpendafpropinsiktp').value =prov;
  });
}
function caripasienhdbynik(e) {
  if (e.keyCode==13) {
    event.preventDefault();
    var param={
      jumlah: $("#countpasienhd").val(),
      nik:    $("#caripasienhdnik").val(),};
    apiPOST('Pasien/caripasienhdbynik',param,hasil=>{
    $('#tablePendafataranHD tbody').html('');
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
    $('#tablePendafataranHD tbody').append(Baris);
    })
  } 
}
function caripasienhdbyalamat(e) {
  if (e.keyCode==13) {
    event.preventDefault();
    var param={
      nama:   $("#pendafhdcarinama").val(),
      alamat: $("#pendafhdcarialamat").val(),
      jumlah: $("#countpasienhd").val(),
      nik:    $("#caripasienhdnik").val(),};
    apiPOST('Pasien/caripasienhdbyalamat',param,hasil=>{
    $('#tablePendafataranHD tbody').html('');
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
    $('#tablePendafataranHD tbody').append(Baris);
    })
  } 
}
function caripasienhdbynama(e) {
  if (e.keyCode==13) {
    event.preventDefault();
    var param={
      nama:   $("#pendafhdcarinama").val(),
      alamat: $("#pendafhdcarialamat").val(),
      jumlah: $("#countpasienhd").val(),
      nik:    $("#caripasienhdnik").val(),};
    apiPOST('Pasien/caripasienhdbynama',param,hasil=>{
    $('#tablePendafataranHD tbody').html('');
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
    $('#tablePendafataranHD tbody').append(Baris);
    })
  } 
}
function caripasienbytable(rm) {
    var param={id : rm,};
    apiPOST('Pasien/caripasienbyrm', param,hasil=>{
      var a=hasil['data'];
      for (var i = 0; i < a.length; i++) {
        caripropinsibyrm(a[i].kd_kelurahan);//cari propinsi 
        caripropinsiktpbyrm(a[i].kd_kelurahan_ktp);//cari propinsi sesuai ktp
        carihistoripenyakit(a[i].no_rm);//cari histori penyakit
        carihistorikunjungan(a[i].no_rm);//cari histori kunjungan
        document.getElementById('hdpendafnamapasien').value   =a[i].nama;
        document.getElementById('hdpendafkdpasien').value      =a[i].no_rm;     
        document.getElementById('hdpendafkeluarga').value     =a[i].nama_keluarga;
        document.getElementById('hdpendafagama').value        =a[i].kd_agama;
        document.getElementById('hdpendafgoldarah').value     =a[i].gol_darah;
        document.getElementById('hdpendafkelamin').value      =a[i].jenis_kelamin;
        document.getElementById('hdpendafstatusmarital').value=a[i].status_marita;
        document.getElementById('hdpendaftempatlahir').value  =a[i].tempat_lahir;
        document.getElementById('hdpendaftanggallahir').value =a[i].tgl_lahir.substr(0, 10);
        document.getElementById('hdpendafnik').value          =a[i].nik;
        document.getElementById('hdpendafpendidikan').value   =a[i].kd_pendidikan;
        document.getElementById('hdpendafpekerjaan').value    =a[i].kd_pekerjaan;
        document.getElementById('hdpendaftelepon').value      =a[i].telepon;
        document.getElementById('hdpendafwni').value          =a[i].wni;
        document.getElementById('hdpendafalamat').value       =a[i].alamat;
        document.getElementById('hdpendafkelurahan').value    =a[i].kd_kelurahan;
        document.getElementById('hdpendafkelurahanktp').value =a[i].kd_kelurahan_ktp;
        document.getElementById('hdpendafkdpos').value        =a[i].kd_pos;
        document.getElementById('hdpendafalamatktp').value    =a[i].alamat_ktp;
        document.getElementById('hdpendafnoasuransi').value   =a[i].no_kartu;
        document.getElementById('hdpendafkdposktp').value     =a[i].kd_pos_ktp;
        document.getElementById('hdpendafibu').value          =a[i].nama_ibu;
        document.getElementById('hdpendafpekerjaanibu').value =a[i].kd_pos_ktp;
        document.getElementById('hdpendafpendidikanibu').value=a[i].kd_pos_ktp;
        document.getElementById('hdpendafayah').value         =a[i].nama_ayah;
        document.getElementById('hdpendafpekerjaanayah').value=a[i].kd_pos_ktp;
        document.getElementById('hdpendafpendidikanayah').value=a[i].kd_pos_ktp;
        data_pasien_pendaftaran_hd['nama']           =a[i].nama;
        data_pasien_pendaftaran_hd['nama_keluarga']  =a[i].nama_keluarga;
        data_pasien_pendaftaran_hd['nik']            =a[i].nik;
        data_pasien_pendaftaran_hd['kd_agama']       =a[i].kd_agama;
        data_pasien_pendaftaran_hd['gol_darah']      =a[i].gol_darah;
        data_pasien_pendaftaran_hd['jenis_kelamin']  =a[i].jenis_kelamin;
        data_pasien_pendaftaran_hd['kd_pendidikan']  =a[i].kd_pendidikan;
        data_pasien_pendaftaran_hd['kd_pekerjaan']   =a[i].kd_pekerjaan;
        data_pasien_pendaftaran_hd['telepon']        =a[i].telepon;
        data_pasien_pendaftaran_hd['statusmarital']  =a[i].status_marita;
        data_pasien_pendaftaran_hd['alamat']         =a[i].alamat_ktp;
        data_pasien_pendaftaran_hd['alamat_ktp']     =a[i].alamat;
        data_pasien_pendaftaran_hd['no_rm']          =a[i].no_rm;         
      }
    });
    tambahpasienhd();
  }
function caripasienbyrmhd(e) {
  if (e.keyCode == 13) {
    event.preventDefault();
    var param={id : $("#searchpendfhd").val(),};
  var a;
    apiPOST('Pasien/caripasienbyrm', param,hasil=>{
      a=hasil['data'];
      for (var i = 0; i < a.length; i++) {
        caripropinsibyrm(a[i].kd_kelurahan);//cari propinsi 
        caripropinsiktpbyrm(a[i].kd_kelurahan_ktp);//cari propinsi sesuai ktp
        carihistoripenyakit(a[i].no_rm);//cari histori penyakit
        carihistorikunjungan(a[i].no_rm);//cari histori kunjungan
        document.getElementById('hdpendafnamapasien').value   =a[i].nama;
        document.getElementById('hdpendafkdpasien').value      =a[i].no_rm;     
        document.getElementById('hdpendafkeluarga').value     =a[i].nama_keluarga;
        document.getElementById('hdpendafagama').value        =a[i].kd_agama;
        document.getElementById('hdpendafgoldarah').value     =a[i].gol_darah;
        document.getElementById('hdpendafkelamin').value      =a[i].jenis_kelamin;
        document.getElementById('hdpendafstatusmarital').value=a[i].status_marita;
        document.getElementById('hdpendaftempatlahir').value  =a[i].tempat_lahir;
        document.getElementById('hdpendaftanggallahir').value =a[i].tgl_lahir.substr(0, 10);
        document.getElementById('hdpendafnik').value          =a[i].nik;
        document.getElementById('hdpendafpendidikan').value   =a[i].kd_pendidikan;
        document.getElementById('hdpendafpekerjaan').value    =a[i].kd_pekerjaan;
        document.getElementById('hdpendaftelepon').value      =a[i].telepon;
        document.getElementById('hdpendafwni').value          =a[i].wni;
        document.getElementById('hdpendafalamat').value       =a[i].alamat;
        document.getElementById('hdpendafkelurahan').value    =a[i].kd_kelurahan;
        document.getElementById('hdpendafkelurahanktp').value =a[i].kd_kelurahan_ktp;
        document.getElementById('hdpendafkdpos').value        =a[i].kd_pos;
        document.getElementById('hdpendafalamatktp').value    =a[i].alamat_ktp;
        document.getElementById('hdpendafnoasuransi').value   =a[i].no_kartu;
        document.getElementById('hdpendafkdposktp').value     =a[i].kd_pos_ktp;
        document.getElementById('hdpendafibu').value          =a[i].nama_ibu;
        document.getElementById('hdpendafpekerjaanibu').value =a[i].kd_pos_ktp;
        document.getElementById('hdpendafpendidikanibu').value=a[i].kd_pos_ktp;
        document.getElementById('hdpendafayah').value         =a[i].nama_ayah;
        document.getElementById('hdpendafpekerjaanayah').value=a[i].kd_pos_ktp;
        document.getElementById('hdpendafpendidikanayah').value=a[i].kd_pos_ktp;
        data_pasien_pendaftaran_hd['nama']           =a[i].nama;
        data_pasien_pendaftaran_hd['nama_keluarga']  =a[i].nama_keluarga;
        data_pasien_pendaftaran_hd['nik']            =a[i].nik;
        data_pasien_pendaftaran_hd['kd_agama']       =a[i].kd_agama;
        data_pasien_pendaftaran_hd['gol_darah']      =a[i].gol_darah;
        data_pasien_pendaftaran_hd['jenis_kelamin']  =a[i].jenis_kelamin;
        data_pasien_pendaftaran_hd['kd_pendidikan']  =a[i].kd_pendidikan;
        data_pasien_pendaftaran_hd['kd_pekerjaan']   =a[i].kd_pekerjaan;
        data_pasien_pendaftaran_hd['telepon']        =a[i].telepon;
        data_pasien_pendaftaran_hd['statusmarital']  =a[i].status_marita;
        data_pasien_pendaftaran_hd['alamat']         =a[i].alamat_ktp;
        data_pasien_pendaftaran_hd['alamat_ktp']     =a[i].alamat;
        data_pasien_pendaftaran_hd['no_rm']          =a[i].no_rm;         
      }
    });
    tambahpasienhd();
  }
}
function carihistoripenyakit(no) {
  var a='';
  var param = {rm : no};
  apiPOST('Pasien/historipenyakit', param, hasil =>{    
  document.getElementById('bodyhdhistoripenyakit').innerHTML='';
  var b=hasil['history'];
    for (var i = 0; i < b.length; i++) {
      a+='<tr>';
      a+='<td>'+b.length+'</td>';
      a+='<td>'+b[i].penyakit+'</td>';
      a+='<td>'+b[i].id_penyakit+'</td>';
      a+='<td>'+b[i].tgl_kunjungan+'</td>';   
      a+='</tr>';
    }
    document.getElementById('bodyhdhistoripenyakit').innerHTML=a;

  });
}
function carihistorikunjungan(no) {
  var a='';
  var param = 
  {rm : no};
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
    document.getElementById('bodyhdhistorykunjungan').innerHTML=a;

  });
}
function tambahpasienhd() {
  var x = document.getElementById("DivCariPasienHD");
  var y = document.getElementById("DivPasienHD");
  var z = document.getElementById("DivPendafDetailHD");
  var w = document.getElementById("tabelpasienhd");
  var a = document.getElementById("hd_pendf_buttonPasienBaru");
  var b = document.getElementById("hd_pendf_buttonList");
 
  z.style.display = "block";
  y.style.display = "block";
  a.style.display = "block";
  x.style.display = "none";
  w.style.display = "none";
  b.style.display = "none";
  $("#hd_pendf_titleheader").html("<i class='fas fa-hospital-user'></i> Pendaftaran Pasien Baru");
  document.getElementById("hdpendafnamapasien").removeAttribute('readonly');
  document.getElementById("hdpendafkeluarga").removeAttribute('readonly');
  document.getElementById("hdpendafagama").removeAttribute('readonly');
  document.getElementById("hdpendafgoldarah").removeAttribute('readonly');
  document.getElementById("hdpendafkelamin").removeAttribute('readonly');
  document.getElementById("hdpendafstatusmarital").removeAttribute('readonly');
  document.getElementById("hdpendaftempatlahir").removeAttribute('readonly');
  document.getElementById("hdpendaftanggallahir").removeAttribute('readonly');
  document.getElementById("hdpendafnik").removeAttribute('readonly');
  document.getElementById("hdpendafpendidikan").removeAttribute('readonly');
  document.getElementById("hdpendafpekerjaan").removeAttribute('readonly');
  document.getElementById("hdpendaftelepon").removeAttribute('readonly');
  document.getElementById("hdpendafwni").removeAttribute('readonly');
  document.getElementById("hdpendafalamat").removeAttribute('readonly');
  document.getElementById("hdpendafpropinsi").removeAttribute('readonly');
  document.getElementById("hdpendafkab").removeAttribute('readonly');
  document.getElementById("hdpendafkec").removeAttribute('readonly');
  document.getElementById("hdpendafkelurahan").removeAttribute('readonly');
  document.getElementById("hdpendafkdpos").removeAttribute('readonly');
  document.getElementById("hdpendafpropinsiktp").removeAttribute('readonly');
  document.getElementById("hdpendafkabktp").removeAttribute('readonly');
  document.getElementById("hdpendafkecktp").removeAttribute('readonly');
  document.getElementById("hdpendafkelurahanktp").removeAttribute('readonly');
  document.getElementById("hdpendafkdposktp").removeAttribute('readonly');
  document.getElementById("hdpendafalamatktp").removeAttribute('readonly');
}
function kembali_pend_hd() {
  var x = document.getElementById("DivCariPasienHD");
  var y = document.getElementById("DivPasienHD");
  var z = document.getElementById("DivPendafDetailHD");
  var w = document.getElementById("tabelpasienhd");
  var a = document.getElementById("hd_pendf_buttonPasienBaru");
  var b = document.getElementById("hd_pendf_buttonList");
  x.style.display = "block";
  b.style.display = "block";  
  w.style.display = "block";  
  a.style.display = "none";  
  y.style.display = "none";
  z.style.display = "none";
  $("#hd_pendf_titleheader").html("<i class='fas fa-hospital-user'></i> Daftar Pasien");
        document.getElementById('hdpendafnamapasien').value  ='';
        document.getElementById('hdpendafkdpasien').value      ='';     
        document.getElementById('hdpendafkeluarga').value     ='';
        document.getElementById('hdpendafagama').value        ='';
        document.getElementById('hdpendafgoldarah').value     ='';
        document.getElementById('hdpendafkelamin').value      ='';
        document.getElementById('hdpendafstatusmarital').value='';
        document.getElementById('hdpendaftempatlahir').value  ='';
        document.getElementById('hdpendaftanggallahir').value ='';
        document.getElementById('hdpendafnik').value          ='';
        document.getElementById('hdpendafpendidikan').value   ='';
        document.getElementById('hdpendafpekerjaan').value    ='';
        document.getElementById('hdpendaftelepon').value      ='';
        document.getElementById('hdpendafwni').value          ='';
        document.getElementById('hdpendafalamat').value       ='';
        document.getElementById('hdpendafkelurahan').value    ='';
        document.getElementById('hdpendafkelurahanktp').value ='';
        document.getElementById('hdpendafkdpos').value        ='';
        document.getElementById('hdpendafalamatktp').value    ='';
        document.getElementById('hdpendafnoasuransi').value   ='';
        document.getElementById('hdpendafkdposktp').value     ='';
        document.getElementById('hdpendafibu').value          ='';
        document.getElementById('hdpendafpekerjaanibu').value ='';
        document.getElementById('hdpendafpendidikanibu').value='';
        document.getElementById('hdpendafayah').value         ='';
        document.getElementById('hdpendafpekerjaanayah').value='';
        document.getElementById('hdpendafpendidikanayah').value='';
}

/*fungsi bridging*/
function ApproveFinger() {
  var param={
    noka : $("#hdpendafnoasuransi").val(),
  };
  apiPOST('Bridging/ApprovAuto', param, hasil =>{

    })
}
function hdpendaftampilcaridokter(e) {
  if (e.keyCode ==13) {
    var a='';
    var param = 
    {poli : $("#hdpendafklinikRS").val(),};
    apiPOST('Bridging/CariDokter', param, hasil =>{
    // alert(hasil['status']);hdpendafdokterbpjs
      var b=hasil['list'];
      for (var i = 0; i < b.length; i++) {
        a+='<button class="btn btn-primary" style="width:100%;"  onclick="pendafhdtampildokter(`'+b[i]['kodeDokter']+'`,`'+b[i]['NamaDokter']+'`)" >'+b[i]['namaDokter']+' ('+b[i]['kodeDokter']+')</button>';
      }

      document.getElementById('Divtampildokterhdbpjs').style.display="block";
      document.getElementById('Divtampildokterhdbpjs').innerHTML=a;
    });
  }
}
function hdpendaftampilnoskdp(norujukan) {
  var a='';
  var param = 
  {noka : $("#hdpendafnoasuransi").val(),};
  apiPOST('Bridging/CariSep', param, hasil =>{
    var b=hasil['histori'];
    for (var i = 0; i < b.length; i++) {
      a+='<tr>';
      a+='<th scope="row">1</th>';
      a+='<td><button class="btn-primary" onclick=inputskdp(`'+b[i]['noSep']+'`)>'+b[i]['noSep']+'</button></td>';
      a+='<td>'+b[i]['poli']+'</td>';
      a+='<td>'+b[i]['noRujukan']+'</td>';
      a+='<td>'+b[i]['tglSep']+'</td>';
      a+='</tr>';
    }
    $('#modalTampilSKDP').modal("show");
    document.getElementById('listskdphd').innerHTML=a;

  });

}
function cariRujukanPasienIrja() {
  var param = 
  {noka : $("#hdpendafnoasuransi").val(),};
  apiPOST('Bridging/CariRujukanIrja', param, hasil =>{
   alert(hasil['status']);
   //document.getElementById('hdpendafnamapasien').value=hasil['peserta']['nama'];
 });
}
function hdpendaftampilnorujukan(e) {
  if (e.keyCode ==13) {
    var a='';
    var param = 
    {noka : $("#hdpendafnoasuransi").val(),};
    apiPOST('Bridging/CariRujukanIrja', param, hasil =>{
    // alert(hasil['status']);
      var c=hasil['rujukan'];
      var b=c.filter(sort);
      for (var i = 0; i < b.length; i++) {
        a+='<button class="btn btn-primary" onclick="pendafhdcarirujukan(`'+b[i]['noKunjungan']+'`,`'+b[i]['poliRujukan']['kode']+'`,`'+b[i]['provPerujuk']['kode']+'`,`'+b[i]['tglKunjungan']+'`)" >'+b[i]['noKunjungan']+' ('+b[i]['poliRujukan']['nama']+'|'+b[i]['tglKunjungan']+')</button>';
      }
      document.getElementById('Divtampilrujukanhd').style.display="block";
      document.getElementById('Divtampilrujukanhd').innerHTML =a;
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
function hdpendafhistorisep() {
 var a='';
 var param = 
 {noka : $("#hdpendafnoasuransi").val(),};
 apiPOST('Bridging/CariSep', param, hasil =>{
  var b=hasil['histori'];
  for (var i = 0; i < b.length; i++) {
    a+='<tr>';
    a+='<th scope="row">1</th>';
    a+='<td><button class="btn-primary" onclick=inputskdp(`'+b[i]['noSep']+'`)>'+b[i]['noSep']+'</button></td>';
    a+='<td>'+b[i]['poli']+'</td>';
    a+='<td>'+b[i]['noRujukan']+'</td>';
    a+='<td>'+b[i]['tglSep']+'</td>';
    a+='<td><button class="btn-primary" onclick=CetakSepIrja(`'+b[i]['noSep']+'`)><i class="fas fa-print"></i></button></td></td>'
    a+='</tr>';
  }
        //document.getElementById('Divtampilskdphd').style.display="block";
    //$('#modalTampilSKDP').modal("show");
  document.getElementById('tbodyhdpendafhistorisep').innerHTML=a;

});
}
function hdpendafhddatabpjspasien() {
 var c='';
 var param = 
 {noka : $("#hdpendafnoasuransi").val(),};
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
  document.getElementById('DivpendafhdDetailPesertaBPJS').innerHTML=c;

});
}
function CekListRencanaKontrol() {
 var a='';
 var param = 
 {noka : $("#hdpendafnoasuransi").val(),};
 apiPOST('Bridging/CekListRencanaKontrol', param, hasil =>{
  var b=hasil['data']['list'];
  for (var i = 0; i < b.length; i++) {
    a+='<tr>';
    a+='<th scope="row">1</th>';
    a+='<td><button class="btn-primary" onclick=inputskdp(`'+b[i]['noSuratKontrol']+'`)>'+b[i]['noSuratKontrol']+'</button></td>';
    a+='<td>'+b[i]['namaPoliTujuan']+'</td>';
    a+='<td>'+b[i]['terbitSEP']+'</td>';
    a+='<td>'+b[i]['tglTerbitKontrol']+'</td>';
    a+='</tr>';
  }
  document.getElementById('tbodyhdpendafhistorirencanakontrol').innerHTML=a;

});
}

/*proses cetak*/
function createlabelhd(){
  var param = {
      norm      : '12345',
      nm_pasien : 'Edwin'
  };
  newTabPOST('API/Rawatjalan/createlabelhd',param);
  return;
}
function CetakSepIrja(sep){
  var param = {
      sep      : sep,
  };
  newTabPOST('API/Bridging/CetakSEPIRJA',param);
  return;
}
/*end proses cetak*/
</script>