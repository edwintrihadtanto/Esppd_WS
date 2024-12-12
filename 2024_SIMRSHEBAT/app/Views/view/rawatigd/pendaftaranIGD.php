<div class="col-md-13 p-2">
  <div class="form-msg"></div>

  <div class="card card-outline card-danger">
    <div class="overlay-wrapper" id="loading_pendfIGD">
      <div class="overlay">
        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
      </div>
    </div>

      <div class="card-body p-2 darkgrey-custom" id="DivCariPasienIGD">
      <div class="row row-custom">
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Cari No. RM / Nama Pasien :</label>
            <input type="search" class="form-control form-control-xs" onkeypress="lookupListPasienPendaftaranIGDTextField(event);" placeholder="Entry RM..." id="IGD_pendf_kd_pasiencariIGD" autocomplete="off" >
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label> Nama:</label>
            <input type="search" class="form-control form-control-xs" onkeypress="lookupListPasienPendaftaranIGDTextField(event);" placeholder="Entry Nama Pasien..." id="IGD_pendf_nm_pasiencariIGD" autocomplete="off">
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label> NIK:</label>
            <input type="search" class="form-control form-control-xs" onkeypress="lookupListPasienPendaftaranIGDTextField(event);" id="IGD_pendf_search_nik" placeholder="Entry NIK" autocomplete="off">
          </div>
        </div>
         <div class="col mx-auto p-3">
             <button class="btn btn-dark" onclick="lookupListPasienPendaftaranIGD();">Cari</button>
        </div>
      </div>

    </div>
    
    <div id="lookup_pasien_pendaftaran_IGD" class="card m-1">
        <div class="card-header p-2 darkgrey-custom">
            <div class="row">
                <div class="col">
                    <h6 class="hr6-custom"><i class="fas fa-hospital-user"></i> Daftar Pasien</h6>
                    <button class="btn btn-xs btn-dark" onclick="showDaftarPendaftaranIGD(true);"><i class="fas fa-user-plus"></i> Pasien Baru</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 p-2">
                <table
                    id="list_lookup_pasien_pendaftaran_IGD"
                    data-pagination="true"
                    data-header-style="headerStyleLookupPasienPendaftaranIGD"
                    data-row-style="rowStyleLookupPasienPendaftaranIGD"
                    data-pagination-loop="false"
                    data-pagination-parts="['pageInfo', 'pageList']">
                  <thead>
                    <tr>
                      <th data-field="no" data-width="10">No.</th>
                      <th data-field="no_rm">No. Rekam Medis</th>
                      <th data-field="nama">Nama Pasien</th>
                      <th data-field="alamat">Alamat</th>
                      <th data-field="telepon">Telepon</th>
                      <th data-field="nik">NIK</th>
                    </tr>
                  </thead>
                </table>
            </div>
        </div>
    </div>
      
    <div id="daftar_pasien_pendaftaran_IGD" class="card m-1">
        <div class="card-header p-2 darkgrey-custom">
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <h6 class="hr6-custom"><i class="fas fa-hospital-user"></i><span id="IGD_pendf_titleheader"></span></h6>
                            <div class="row">
                                <button class="btn btn-xs bg-gradient-secondary m-1" id="simpan_pendaftaran_IGD" onclick="simpanPendaftaranIGD();"><i class="fas fa-save"></i> Simpan</button>
                                <button class="btn btn-xs bg-gradient-warning m-1" id="edit_pasien_pendaftaran_IGD" onclick="editDataPasienPendaftaranIGD();"><i class="fas fa-user-edit"></i> Edit Data Pasien</button>
                                <button class="btn btn-xs bg-gradient-danger m-1" id="batal_edit_pasien_pendaftaran_IGD" onclick="batalEditDataPasienPendaftaranIGD();"><i class="fas fa-user-lock"></i> Batal Edit Data Pasien</button>
                                <div class="btn-group pull-right m-1">
                                    <button type="button" class="btn bg-gradient-secondary btn-xs"><i class="fas fa-print"></i> Cetak</button>
                                    <button type="button" class="btn bg-gradient-secondary dropdown-toggle dropdown-icon btn-xs" data-toggle="dropdown">
                                      <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                      <a class="dropdown-item" href="#" onclick="IGDpendf_createlabelpasien()" ><i class="fas fa-id-card"></i> Label Pasien</a>
                                      <div class="dropdown-divider m-0"></div>
                                      <a class="dropdown-item" href="#" onclick="IGDpendf_createkartupasien()"><i class="fa fa-credit-card"></i> Kartu Pasien</a>
                                    </div>
                              </div>
                                <button class="btn btn-xs bg-gradient-secondary m-1" id="data_sep_pendaftaran_IGD" onclick="showModalSEPpendaftaranIGD();"><i class="fas fa-bookmark"></i> Data SEP</button>
                            </div>
                        </div>
                        <div class="col-3">
                            <label>Tgl. Kunjung :</label>
                            <input type="date" name="IGD_pendf_tglkunjungan" id="IGD_pendf_tglkunjungan" class="form-control form-control-xs" disabled>
                        </div>
                    </div>
                </div>
                <div class="col-sm-auto">
                    <button type="button" class="btn btn-danger" onclick="showLookupPendaftaranIGD();"><i class="fas fa-times"></i></button>
                </div>
            </div>
            
        </div>
        <div class="row p-1">
            <div class="col">
                <div class="row m-1">
                    <div class="col">
                        <label>Rekam Medis</label>
                        <input type="text"  id="no_rm_pendaftaran_IGD" class="form-control form-control-xs" disabled>
                    </div>
                    <div class="col">
                        <label>Nama Pasien</label>
                        <input type="text"  id="nama_pendaftaran_IGD" class="form-control form-control-xs" maxlength="50">
                    </div>
                    <div class="col">
                        <label>NIK</label>
                        <input type="text"  id="nik_pendaftaran_IGD" class="form-control form-control-xs" maxlength="50">
                    </div>
                    <div class="col">
                        <label>Agama</label>
                        <select class="form-control form-control-xs" id="agama_pendaftaran_IGD"></select>
                    </div>
                    <div class="col">
                        <label>Golongan Darah</label>
                        <select class="form-control form-control-xs" id="gol_darah_pendaftaran_IGD"></select>
                    </div>
                    <div class="col">
                        <label>Jenis Kelamin</label>
                        <select class="form-control form-control-xs" id="jenis_kelamin_pendaftaran_IGD">
                          <option value="t">Laki-laki</option>
                          <option value="f">Perempuan</option>
                        </select>
                    </div>
                    <div class="col">
                        <label>Status Marital</label>
                        <select class="form-control form-control-xs" id="marital_pendaftaran_IGD"></select>
                    </div>
                    <div class="col">
                        <label>Nomor Telepon</label>
                        <input type="number" id="telepon_pendaftaran_IGD" class="form-control form-control-xs" maxlength="13">
                    </div>
                    <div class="col">
                        <label>WNI</label><br>
                        <input type="checkbox" id="wni_pendaftaran_IGD" checked="true">
                    </div>
                </div>

                <div class="row m-1">
                    <div class="col">
                        <label>Tempat Lahir</label>
                        <input type="text"  id="tempat_lahir_pendaftaran_IGD" class="form-control form-control-xs" maxlength="25">
                    </div>
                    <div class="col">
                        <label>Tanggal Lahir</label>
                        <input type="date"  id="tgl_lahir_pendaftaran_IGD" class="form-control form-control-xs" onchange="hitungUmur('tgl_lahir_pendaftaran_IGD', 'umur_pendaftaran_IGD');">
                    </div>
                    <div class="col">
                        <label>Umur</label>
                        <input type="text"  id="umur_pendaftaran_IGD" class="form-control form-control-xs" disabled="">
                    </div>
                    <div class="col">
                        <label>Pendidikan</label>
                        <select  id="pendidikan_pendaftaran_IGD" class="form-control form-control-xs"></select>
                    </div>
                    <div class="col">
                        <label>Pekerjaan</label>
                        <select  id="pekerjaan_pendaftaran_IGD" class="form-control form-control-xs"></select>
                    </div>
                </div>
                
                <div class="row m-1">
                    <div class="col">
                        <label>Alamat</label>
                        <input type="text"  id="alamat_pendaftaran_IGD" class="form-control form-control-xs">
                    </div>
                    <div class="col">
                        <label>Provinsi</label>
                        <select  id="provinsi_pendaftaran_IGD" class="form-control form-control-xs" onchange="changeProvinsiPendaftaranIGD();"></select>
                    </div>
                    <div class="col">
                        <label>Kabupaten / Kota</label>
                        <select  id="kab_kota_pendaftaran_IGD" class="form-control form-control-xs" onchange="changeKabKotaPendaftaranIGD();"></select>
                    </div>
                    <div class="col">
                        <label>Kecamatan</label>
                        <select  id="kecamatan_pendaftaran_IGD" class="form-control form-control-xs" onchange="changeKecamatanPendaftaranIGD();"></select>
                    </div>
                    <div class="col">
                        <label>Kelurahan</label>
                        <select  id="kelurahan_pendaftaran_IGD" class="form-control form-control-xs"></select>
                    </div>
                    <div class="col">
                        <label>Kode Pos</label>
                        <input type="text"  id="kode_pos_pendaftaran_IGD" class="form-control form-control-xs" maxlength="5">
                    </div>
                </div>
                
                <div class="row m-1">
                    <div class="col">
                        <label>Alamat KTP</label>
                        <input type="text"  id="alamat_ktp_pendaftaran_IGD" class="form-control form-control-xs">
                    </div>
                    <div class="col">
                        <label>Provinsi KTP</label>
                        <select  id="provinsi_ktp_pendaftaran_IGD" class="form-control form-control-xs" onchange="changeProvinsiPendaftaranIGD(true);"></select>
                    </div>
                    <div class="col">
                        <label>Kabupaten / Kota KTP</label>
                        <select  id="kab_kota_ktp_pendaftaran_IGD" class="form-control form-control-xs" onchange="changeKabKotaPendaftaranIGD(true);"></select>
                    </div>
                    <div class="col">
                        <label>Kecamatan KTP</label>
                        <select  id="kecamatan_ktp_pendaftaran_IGD" class="form-control form-control-xs" onchange="changeKecamatanPendaftaranIGD(true);"></select>
                    </div>
                    <div class="col">
                        <label>Kelurahan KTP</label>
                        <select  id="kelurahan_ktp_pendaftaran_IGD" class="form-control form-control-xs"></select>
                    </div>
                    <div class="col">
                        <label>Kode Pos KTP</label>
                        <input type="text"  id="kode_pos_ktp_pendaftaran_IGD" class="form-control form-control-xs" maxlength="5">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row p-1">
            <div class="col">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="pill" href="#kunjungan_pendaftaran_IGD">Kunjungan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#penangung_jawab_pendaftaran_IGD">Penangung Jawab</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#keluarga_pendaftaran_IGD">Keluarga</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#riwayat_penyakit_pendaftaran_IGD">Riwayat Penyakit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#riwayat_kunjungan_pendaftaran_IGD">Riwayat Kunjungan</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="kunjungan_pendaftaran_IGD" class="tab-pane fade p-1 active show">
                        <div class="row">
                            <div class="col-4 p-1">
                                <label>Rujukan Asal:</label>
                                <select  id="rujukan_asal_pendaftaran_IGD" class="form-control form-control-xs" onchange="changeRujukanAsalPendaftaranIGD();"></select>
                            </div>
                            <div class="col-4 p-1">
                                <label>Rujukan:</label>
                                <select  id="rujukan_pendaftaran_IGD" class="form-control form-control-xs"></select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label>Anamnese</label>
                                <input type="text"  id="anamnese_jawab_pendaftaran_IGD" class="form-control form-control-xs">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <label>Unit</label>
                                <select  id="unit_pendaftaran_IGD" class="form-control form-control-xs"></select>
                            </div>
                            <div class="col-2">
                                <label>Kelompok Penjamin</label>
                                <select  id="kelompok_penjamin_pendaftaran_IGD" class="form-control form-control-xs" onchange="changeKelompokPenjaminPendaftaranIGD();"></select>
                            </div>
                            <div class="col-2">
                                <label>Penjamin</label>
                                <select  id="penjamin_pendaftaran_IGD" class="form-control form-control-xs" onchange="gantiPenjaminPendaftaranIGD();"></select>
                            </div>
                            <div class="col-3">
                                <label>Penyakit</label>
                                <!-- <input type="text"  id="penyakit_pendaftaran_IGD" class="penyakit_pendaftaran_IGD form-control form-control-xs" autocomplete="off"> -->
								<select class="penyakit_pendaftaran_IGD form-control form-control-xs" id="penyakit_pendaftaran_IGD">
								  <option></option>
								</select>
                            </div>
                            <div class="col-3">
                                <label>Dokter</label>
                               <!--  <input type="text"  id="dokter_pendaftaran_IGD" class="form-control form-control-xs" autocomplete="off"> -->
								<select  name="" id="dokter_pendaftaran_IGD" class="form-control form-control-xs" onkeypress="" ></select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                
                            </div>
                            <div class="col-2">
                                <label>No. Kartu</label>
                                <input type="text"  id="noka_pendaftaran_IGD" class="form-control form-control-xs">
                            </div>
                            <div class="col-6">
                                <label>No. SJP</label>
                                <input type="text"  id="sjp_pendaftaran_IGD" class="form-control form-control-xs">
                            </div>
                        </div>
                    </div>
                    <div id="penangung_jawab_pendaftaran_IGD" class="tab-pane fade p-1">
                        <div class="row">
                            <div class="col">
                                <label>Nama</label>
                                <input type="text"  id="nama_penanggung_jawab_pendaftaran_IGD" class="form-control form-control-xs">
                            </div>
                            <div class="col">
                                <label>Hubungan</label>
                                <input type="text"  id="hubungan_penanggung_jawab_pendaftaran_IGD" class="form-control form-control-xs">
                            </div>
                            <div class="col">
                                <label>NIK</label>
                                <input type="text"  id="nik_penanggung_jawab_pendaftaran_IGD" class="form-control form-control-xs">
                            </div>
                            <div class="col">
                                <label>Alamat</label>
                                <input type="text"  id="alamat_penanggung_jawab_pendaftaran_IGD" class="form-control form-control-xs">
                            </div>
                            <div class="col">
                                <label>Nomor Telepon</label>
                                <input type="text"  id="telepon_penanggung_jawab_pendaftaran_IGD" class="form-control form-control-xs">
                            </div>
                        </div>
                    </div>
                    <div id="keluarga_pendaftaran_IGD" class="tab-pane fade p-1">
                        <div class="row">
                            <div class="col">
                                <label>Nama Ayah</label>
                                <input type="text"  id="nama_ayah_pendaftaran_IGD" class="form-control form-control-xs" maxlength="50">
                            </div>
                            <div class="col">
                                <label>Pekerjaan Ayah</label>
                                <select  id="pekerjaan_ayah_pendaftaran_IGD" class="form-control form-control-xs"></select>
                            </div>
                            <div class="col">
                                <label>Pendidikan Ayah</label>
                                <select  id="pendidikan_ayah_pendaftaran_IGD" class="form-control form-control-xs"></select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label>Nama Ibu</label>
                                <input type="text"  id="nama_ibu_pendaftaran_IGD" class="form-control form-control-xs" maxlength="50">
                            </div>
                            <div class="col">
                                <label>Pekerjaan Ibu</label>
                                <select  id="pekerjaan_ibu_pendaftaran_IGD" class="form-control form-control-xs"></select>
                            </div>
                            <div class="col">
                                <label>Pendidikan Ibu</label>
                                <select  id="pendidikan_ibu_pendaftaran_IGD" class="form-control form-control-xs"></select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label>Nama Suami/Istri</label>
                                <input type="text"  id="nama_pasangan_pendaftaran_IGD" class="form-control form-control-xs" maxlength="50">
                            </div>
                            <div class="col">
                                <label>Pekerjaan Suami/Istri</label>
                                <select  id="pekerjaan_pasangan_pendaftaran_IGD" class="form-control form-control-xs"></select>
                            </div>
                            <div class="col">
                                <label>Pendidikan Suami/Istri</label>
                                <select  id="pendidikan_pasangan_pendaftaran_IGD" class="form-control form-control-xs"></select>
                            </div>
                        </div>
                    </div>
                    <div id="riwayat_penyakit_pendaftaran_IGD" class="tab-pane fade p-1">
                        <table
                            id="list_riwayat_penyakit_pendaftaran_IGD"
                            data-header-style="headerStyleLookupPasienPendaftaranIGD"
                            data-row-style="rowStyleLookupPasienPendaftaranIGD">
                          <thead>
                            <tr>
                              <th data-field="tgl_kunjungan">Tanggal Kunjungan</th>
                              <th data-field="id_penyakit">ICD 10</th>
                              <th data-field="penyakit">Penyakit</th>
                              <th data-field="status">Status Diagnosa</th>
                            </tr>
                          </thead>
                        </table>
                    </div>
                    <div id="riwayat_kunjungan_pendaftaran_IGD" class="tab-pane fade p-1">
                        <table
                            id="list_riwayat_kunjungan_pendaftaran_IGD"
                            data-header-style="headerStyleLookupPasienPendaftaranIGD"
                            data-row-style="rowStyleLookupPasienPendaftaranIGD">
                          <thead>
                            <tr>
                              <th data-field="tgl_masuk">Tanggal Kunjungan</th>
                              <th data-field="nama_unit">Unit</th>
                              <th data-field="nama_pegawai">Dokter DPJP</th>
                            </tr>
                          </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

  </div>
</div>
<div class="modal" id="modalSEPPendaftaranIGD" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pembuatan SEP BPJS Pendaftaran IGD</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row ml-1 mr-1">
                    <div class="col">
                        <div class="row">
                            <label>No. Kartu</label>
                            <input type="text"  id="noka_sep_pendaftaran_IGD" class="form-control form-control-xs" disabled>
                        </div>
                        <div class="row">
                            <label>Tanggal SEP</label>
                            <input type="text"  id="tgl_sep_pendaftaran_IGD" class="form-control form-control-xs" disabled>
                        </div>
                        <div class="row">
                            <label>Status Kepersertaan</label>
                            <input type="text"  id="status_sep_pendaftaran_IGD" class="form-control form-control-xs" disabled>
                        </div>
                        <div class="row">
                            <label>Diagnosa Awal</label>
                            <input type="text"  id="diagnosa_sep_pendaftaran_IGD" class="form-control form-control-xs" autocomplete="off">
                        </div>
                        <div class="row">
                            <label>COB</label>
                            <select  id="cob_sep_pendaftaran_IGD" class="form-control form-control-xs">
                                <option value='0'>Tidak</option>
                                <option value='1'>Ya</option>
                            </select>
                        </div>
                        <div class="row">
                            <label>Kecelakaan Lalu Lintas</label>
                            <select  id="laka_sep_pendaftaran_IGD" class="form-control form-control-xs" onchange="editLakaSEPPendIGD();">
                                <option value='0'>Bukan Kecelakaan lalu lintas [BKLL]</option>
                                <option value='1'>KLL dan bukan kecelakaan Kerja [BKK]</option>
                                <option value='2'>Kecelakaan lalu lintas dan kecelakaan kerja[KLL & KK]</option>
                                <option value='3'>Kecelakaan Kerja [KK]</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-1"></div>
                    <div class="col">
                        <div class="row">
                            <label>Nama</label>
                            <input type="text"  id="nama_sep_pendaftaran_IGD" class="form-control form-control-xs" disabled>
                        </div>
                        <div class="row">
                            <label>Tanggal Lahir</label>
                            <input type="text"  id="lahir_sep_pendaftaran_IGD" class="form-control form-control-xs" disabled>
                        </div>
                        <div class="row">
                            <label>Hak Kelas</label>
                            <input type="text"  id="kelas_sep_pendaftaran_IGD" class="form-control form-control-xs" disabled>
                        </div>
                        <div class="row">
                            <label>Spesialisasi</label>
                            <select id="spc_sep_pendaftaran_IGD" class="form-control form-control-xs" onchange="cariListDPJPPendaftaranIGD();"></select>
                        </div>
                        <div class="row">
                            <label>Dokter DPJP</label>
                            <select id="dpjp_sep_pendaftaran_IGD" class="form-control form-control-xs"></select>
                        </div>
                        <div class="row">
                            <label>Katarak</label>
                            <select  id="katarak_sep_pendaftaran_IGD" class="form-control form-control-xs">
                                <option value='0'>Tidak</option>
                                <option value='1'>Ya</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div id='form_laka_sep_pendaftaran_IGD' class="row m-1" style="background-color: #FDBCB4;">
                    <div class="col pt-2 pb-2 pr-4 pl-4">
                        <div class="row">
                            <label>No. Laporan Polisi</label>
                            <input type="text"  id="no_lp_sep_pendaftaran_IGD" class="form-control form-control-xs" autocomplete="off">
                        </div>
                        <div class="row">
                            <label>Tanggal Kejadian</label>
                            <input type="date" id="tgl_laka_sep_pendaftaran_IGD" class="form-control form-control-xs" autocomplete="off">
                        </div>
                        <div class="row">
                            <label>Keterangan Kejadian</label>
                            <input type="text"  id="keterangan_laka_sep_pendaftaran_IGD" class="form-control form-control-xs" autocomplete="off">
                        </div>
                        <div class="row">
                            <label>Suplesi</label>
                            <select  id="suplesi_sep_pendaftaran_IGD" class="form-control form-control-xs" onchange="editSuplesiSEPPendIGD()">
                                <option value='0'>Tidak</option>
                                <option value='1'>Ya</option>
                            </select>
                        </div>
                        <div id='form_suplesi_sep_pendaftaran_IGD' class="row">
                            <div class='col'>
                                <div class="row">
                                    <label>No. SEP Suplesi</label>
                                    <input type="text"  id="no_sep_suplesi_sep_pendaftaran_IGD" class="form-control form-control-xs" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                            <label>Lokasi kejadian</label>
                        </div>
                        <div class='row'>
                            <label>Provinsi</label>
                            <select  id="provinsi_laka_sep_pendaftaran_IGD" class="form-control form-control-xs" onchange="gantiProvinsiSEPPendIGD();"></select>
                        </div>
                        <div class='row'>
                            <label>Kota / Kabupaten</label>
                            <select  id="kota_laka_sep_pendaftaran_IGD" class="form-control form-control-xs" onchange="gantiKotaSEPPendIGD();"></select>
                        </div>
                        <div class='row'>
                            <label>Kecamatan</label>
                            <select  id="kecamatan_laka_sep_pendaftaran_IGD" class="form-control form-control-xs"></select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-success" id='btn_ok_sep_pendaftaran_IGD' onclick="OKModalSEPPendaftaranIGD();">Buat SEP</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var data_pasien_pendaftaran_IGD = {
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
        status_marita:'',
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
    var simpanPasienPendaftaranIGD = false;
    var cariAgamaPendaftaranIGD = false;
    var cariGolDarahPendaftaranIGD = false;
    var cariMaritalPendaftaranIGD = false;
    var cariPendidikanPendaftaranIGD = false;
    var cariPekerjaanPendaftaranIGD = false;
    var cariProvinsiPendaftaranIGD = false;
    var cariUnitPendaftaranIGD = false;
    var cariKelompokPenjaminPendaftaranIGD = false;
    var cariPenyakitPendaftaranIGD = false;
    var cariDokterPendaftaranIGD = false;
    var cariRujukanAsalPendaftaranIGD = false;
    
    var listKabKotaPendaftaranIGD = [];
    var listKecamatanPendaftaranIGD = [];
    var listKelurahanPendaftaranIGD = [];
    var listPenjaminPendaftaranIGD = [];
    var listNokaPenjaminPendaftaranIGD = [];
    var listRujukanPendaftaranIGD = [];
    
    var paramLookupKabKotaPendaftaranIGD = ['kd_propinsi', 'kd_kabupaten', 'kabupaten'];
    var paramLookupKecamatanPendaftaranIGD = ['kd_kabupaten', 'kd_kecamatan', 'kecamatan'];
    var paramLookupKelurahanPendaftaranIGD = ['kd_kecamatan', 'kd_kelurahan', 'kelurahan'];
    var paramLookupPenjaminPendaftaranIGD = ['id_kelompok_penjamin', 'id_penjamin', 'nama_penjamin'];
    var paramLookupRujukanPendaftaranIGD = ['cara_penerimaan', 'kd_rujukan', 'rujukan'];
    
    var penyakitPendaftaranIGD;
    var dokterPendaftaranIGD;
    
    var modalSEPPendaftaranIGD;
    
    var sep_tgl;
    var sep_noka;
    var sep_kelas;
    var sep_list_provinsi = [];
    
    loadAwalPendaftaranIGD();
	
	$(document).ready(function() {
		$(".penyakit_pendaftaran_IGD").select2({
		  placeholder: "Ketikan Kode Diagnosa",
		  allowClear: true
		});
	});
	
	$(document).on('keyup', '.select2-search__field', function(ev) {
			var self = $(this);
			if (self.val().length > 1) {
				tampil_diagnosa_igd(self.val());
			}
		});
    
    function headerStyleLookupPasienPendaftaranIGD(column){
        return {
            css: {
                background: '#a8d4da',
                color: 'black',
                border: '2px solid black',
                padding: '0px'
            }
        };
    }
    
    function rowStyleLookupPasienPendaftaranIGD(row, index){
        return {
            css: {
                background: 'white',
                border: '2px solid black',
                padding: '2px'
            }
        };
    }
    
    function loadAwalPendaftaranIGD(){
        showLookupPendaftaranIGD();
        modalSEPPendaftaranIGD = document.getElementById('modalSEPPendaftaranIGD');
        $('#list_lookup_pasien_pendaftaran_IGD').bootstrapTable({});
        $('#list_riwayat_penyakit_pendaftaran_IGD').bootstrapTable({});
        $('#list_riwayat_kunjungan_pendaftaran_IGD').bootstrapTable({});
        //document.getElementById('IGD_pendf_tglkunjungan').valueAsDate = new Date();
        var nowday      = "<?php echo date('Y-m-d'); ?>";
        document.getElementById('IGD_pendf_tglkunjungan').value = nowday;
        $('#list_lookup_pasien_pendaftaran_IGD').on('click-row.bs.table', function (e, row, f) {
            for (const kolom in data_pasien_pendaftaran_IGD) {
                data_pasien_pendaftaran_IGD[kolom] = row[kolom];
            }
            showDaftarPendaftaranIGD();
        });
        
        /* penyakitPendaftaranIGD = new AutoComplete("penyakit_pendaftaran_IGD");
        apiPOST('Data_Sosial/getAllPenyakit', {}, hasil => {
            if(hasil !== null){
                var list = hasil['data'];
                list.forEach(baru => {
                    penyakitPendaftaranIGD.addData(baru['id_penyakit'], baru['id_penyakit'] +' - '+ baru['penyakit']);
                });
                cariPenyakitPendaftaranIGD = true;
                hideLoadingAwalPendaftaranIGD();
            }
        }); */
	
	cariPenyakitPendaftaranIGD = true;
			
		apiPOST('Rawatjalan/pegawai', null,hasil=>{
		  var a=hasil['data'];
		  var pegawai='';
		  for (var i = 0; i < a.length; i++) {
			pegawai+='<option value="'+a[i]['id_pegawai']+'">'+a[i]['nama_pegawai']+'</option>';
		  }
		  hideLoadingAwalPendaftaranIGD();
		  cariDokterPendaftaranIGD = true;
		  document.getElementById('dokter_pendaftaran_IGD').innerHTML=pegawai;
		});
           
        /* dokterPendaftaranIGD = new AutoComplete("dokter_pendaftaran_IGD");
        apiPOST('Data_Sosial/getAllDokter', {}, hasil => {
            if(hasil !== null){
                var list = hasil['data'];
                list.forEach(baru => {
                    dokterPendaftaranIGD.addData(baru['id_pegawai'], baru['nama_pegawai']);
                });
                cariDokterPendaftaranIGD = true;
                hideLoadingAwalPendaftaranIGD();
            }
        }); */
        
        apiPOST('Data_Sosial/agama', {}, hasil => {
            if(hasil !== null){
                var list = hasil['data'];
                var opsi = document.getElementById('agama_pendaftaran_IGD');
                list.forEach(baru => {
                    var option = document.createElement('option');
                    option.value = baru['kd_agama'];
                    option.innerHTML = baru['agama'];
                    opsi.appendChild(option);
                });
                cariAgamaPendaftaranIGD = true;
                hideLoadingAwalPendaftaranIGD();
            }
        });
        
        apiPOST('Data_Sosial/darah', {}, hasil => {
            if(hasil !== null){
                var list = hasil['data'];
                var opsi = document.getElementById('gol_darah_pendaftaran_IGD');
                list.forEach(baru => {
                    var option = document.createElement('option');
                    option.value = baru['id_gol_darah'];
                    option.innerHTML = baru['darah'];
                    opsi.appendChild(option);
                });
                cariGolDarahPendaftaranIGD = true;
                hideLoadingAwalPendaftaranIGD();
            }
        });        
        
        apiPOST('Data_Sosial/marital', {}, hasil => {
            if(hasil !== null){
                var list = hasil['data'];
                var opsi = document.getElementById('marital_pendaftaran_IGD');
                list.forEach(baru => {
                    var option = document.createElement('option');
                    option.value = baru['kd_marital'];
                    option.innerHTML = baru['marital'];
                    opsi.appendChild(option);
                });
                cariMaritalPendaftaranIGD = true;
                hideLoadingAwalPendaftaranIGD();
            }
        });
        
        apiPOST('Data_Sosial/rujukan_asal', {}, hasil => {
            if(hasil !== null){
                var list = hasil['data'];
                var opsi = document.getElementById('rujukan_asal_pendaftaran_IGD');
                list.forEach(baru => {
                    var option = document.createElement('option');
                    option.value = baru['cara_penerimaan'];
                    option.innerHTML = baru['penerimaan'];
                    opsi.appendChild(option);
                });
                cariRujukanAsalPendaftaranIGD = true;
                hideLoadingAwalPendaftaranIGD();
            }
        });
        
        apiPOST('Data_Sosial/rujukanAll', {}, hasil => {
            if(hasil !== null){
                listRujukanPendaftaranIGD = hasil['data'];
                hideLoadingAwalPendaftaranIGD();
            }
        });
        
        apiPOST('Data_Sosial/pendidikan', {}, hasil => {
            if(hasil !== null){
                var list = hasil['data'];
                var opsi = document.getElementById('pendidikan_pendaftaran_IGD');
                var opsiAyah = document.getElementById('pendidikan_ayah_pendaftaran_IGD');
                var opsiIbu = document.getElementById('pendidikan_ibu_pendaftaran_IGD');
                var opsiPasangan = document.getElementById('pendidikan_pasangan_pendaftaran_IGD');
                list.forEach(baru => {
                    var option = document.createElement('option');
                    option.value = baru['kd_pendidikan'];
                    option.innerHTML = baru['pendidikan'];
                    opsi.appendChild(option);
                    var optionAyah = document.createElement('option');
                    optionAyah.value = baru['kd_pendidikan'];
                    optionAyah.innerHTML = baru['pendidikan'];
                    opsiAyah.appendChild(optionAyah);
                    var optionIbu = document.createElement('option');
                    optionIbu.value = baru['kd_pendidikan'];
                    optionIbu.innerHTML = baru['pendidikan'];
                    opsiIbu.appendChild(optionIbu);
                    var optionPasangan = document.createElement('option');
                    optionPasangan.value = baru['kd_pendidikan'];
                    optionPasangan.innerHTML = baru['pendidikan'];
                    opsiPasangan.appendChild(optionPasangan);
                });
                cariPendidikanPendaftaranIGD = true;
                hideLoadingAwalPendaftaranIGD();
            }
        });
        
        apiPOST('Data_Sosial/pekerjaan', {}, hasil => {
            if(hasil !== null){
                var list = hasil['data'];
                var opsi = document.getElementById('pekerjaan_pendaftaran_IGD');
                var opsiAyah = document.getElementById('pekerjaan_ayah_pendaftaran_IGD');
                var opsiIbu = document.getElementById('pekerjaan_ibu_pendaftaran_IGD');
                var opsiPasangan = document.getElementById('pekerjaan_pasangan_pendaftaran_IGD');
                list.forEach(baru => {
                    var option = document.createElement('option');
                    option.value = baru['kd_pekerjaan'];
                    option.innerHTML = baru['pekerjaan'];
                    opsi.appendChild(option);                    
                    var optionAyah = document.createElement('option');
                    optionAyah.value = baru['kd_pekerjaan'];
                    optionAyah.innerHTML = baru['pekerjaan'];
                    opsiAyah.appendChild(optionAyah);
                    var optionIbu = document.createElement('option');
                    optionIbu.value = baru['kd_pekerjaan'];
                    optionIbu.innerHTML = baru['pekerjaan'];
                    opsiIbu.appendChild(optionIbu);
                    var optionPasangan = document.createElement('option');
                    optionPasangan.value = baru['kd_pekerjaan'];
                    optionPasangan.innerHTML = baru['pekerjaan'];
                    opsiPasangan.appendChild(optionPasangan);
                });
                cariPekerjaanPendaftaranIGD = true;
                hideLoadingAwalPendaftaranIGD();
            }
        });
        
        apiPOST('Data_Sosial/propinsi', {}, hasil => {
            if(hasil !== null){
                var list = hasil['data'];
                var opsi = document.getElementById('provinsi_pendaftaran_IGD');
                var opsiKTP = document.getElementById('provinsi_ktp_pendaftaran_IGD');
                list.forEach(baru => {
                    var option = document.createElement('option');
                    option.value = baru['kd_propinsi'];
                    option.innerHTML = baru['propinsi'];
                    opsi.appendChild(option);                    
                    var optionKTP = document.createElement('option');
                    optionKTP.value = baru['kd_propinsi'];
                    optionKTP.innerHTML = baru['propinsi'];
                    opsiKTP.appendChild(optionKTP);
                });
                
                cariProvinsiPendaftaranIGD = true;
                hideLoadingAwalPendaftaranIGD();
            }
        });
        
        apiPOST('Data_Sosial/kotaAll', {}, hasil => {
            if(hasil !== null){
                listKabKotaPendaftaranIGD = hasil['data'];
                hideLoadingAwalPendaftaranIGD();
            }
        });
        
        apiPOST('Data_Sosial/kecamatanAll', {}, hasil => {
            if(hasil !== null){
                listKecamatanPendaftaranIGD = hasil['data'];
                hideLoadingAwalPendaftaranIGD();
            }
        });
        
        apiPOST('Data_Sosial/kelurahanAll', {}, hasil => {
            if(hasil !== null){
                listKelurahanPendaftaranIGD = hasil['data'];
                hideLoadingAwalPendaftaranIGD();
            }
        });
        
        apiPOST('Gawat_Darurat/unit', {}, hasil => {
            if(hasil !== null){
                var list = hasil['data'];
                var opsi = document.getElementById('unit_pendaftaran_IGD');
                list.forEach(baru => {
                    var option = document.createElement('option');
                    option.value = baru['id_unit'];
                    option.innerHTML = baru['nama_unit'];
                    opsi.appendChild(option);
                });
                cariUnitPendaftaranIGD = true;
                hideLoadingAwalPendaftaranIGD();
            }
        });
        
        apiPOST('Data_Sosial/kelompokPenjamin', {}, hasil => {
            if(hasil !== null){
                var list = hasil['data'];
                var opsi = document.getElementById('kelompok_penjamin_pendaftaran_IGD');
                list.forEach(baru => {
                    var option = document.createElement('option');
                    option.value = baru['id_kelompok_penjamin'];
                    option.innerHTML = baru['kelompok_penjamin'];
                    opsi.appendChild(option);
                });
                cariKelompokPenjaminPendaftaranIGD = true;
                hideLoadingAwalPendaftaranIGD();
            }
        });
        
        apiPOST('Data_Sosial/penjamin', {}, hasil => {
            if(hasil !== null){
                if(hasil !== null){
                listPenjaminPendaftaranIGD = hasil['data'];
                hideLoadingAwalPendaftaranIGD();
            }
            }
        });
    }
    
    function hideLoadingAwalPendaftaranIGD(){
        if(cariAgamaPendaftaranIGD 
            && cariGolDarahPendaftaranIGD
            && cariMaritalPendaftaranIGD
            && cariPendidikanPendaftaranIGD
            && cariPekerjaanPendaftaranIGD
            && cariProvinsiPendaftaranIGD
            && listKabKotaPendaftaranIGD.length > 0
            && listKecamatanPendaftaranIGD.length > 0
            && listKelurahanPendaftaranIGD.length > 0
            && listRujukanPendaftaranIGD.length > 0
            && cariUnitPendaftaranIGD
            && cariPenyakitPendaftaranIGD
            && cariDokterPendaftaranIGD
            && cariRujukanAsalPendaftaranIGD){
            document.getElementById('loading_pendfIGD').style.display = 'none';
        }
    }
    
    function lookupListPasienPendaftaranIGDTextField(event){
        if (event.keyCode == 13) {
            lookupListPasienPendaftaranIGD();
        }
    }
    
    function showDaftarPendaftaranIGD(pasienBaru = false){
        simpanPasienPendaftaranIGD = pasienBaru;
        if(simpanPasienPendaftaranIGD){
            document.getElementById('IGD_pendf_titleheader').innerHTML = " Pendaftaran Pasien Baru";
            document.getElementById('edit_pasien_pendaftaran_IGD').style.display = 'none';
        }else{
            document.getElementById('IGD_pendf_titleheader').innerHTML = " Pendaftaran Pasien";
            document.getElementById('edit_pasien_pendaftaran_IGD').style.display = 'block';
        }
        
        updateDisabeledDataPasienPendaftaranIGD();
        fillIsiDataPasienPendaftaranIGD();
        
        document.getElementById('unit_pendaftaran_IGD').value = '3001';
        var idKelompokPenjamin = optionParentByChild('1', listPenjaminPendaftaranIGD, 'penjamin_pendaftaran_IGD', paramLookupPenjaminPendaftaranIGD);
        document.getElementById('kelompok_penjamin_pendaftaran_IGD').value = idKelompokPenjamin;
        document.getElementById('nama_penanggung_jawab_pendaftaran_IGD').value = '';
        document.getElementById('hubungan_penanggung_jawab_pendaftaran_IGD').value = '';
        document.getElementById('alamat_penanggung_jawab_pendaftaran_IGD').value = '';
        document.getElementById('nik_penanggung_jawab_pendaftaran_IGD').value = '';
        document.getElementById('telepon_penanggung_jawab_pendaftaran_IGD').value = '';
        document.getElementById('rujukan_asal_pendaftaran_IGD').value = '99';
        
        document.getElementById('lookup_pasien_pendaftaran_IGD').style.display = 'none';
        document.getElementById('daftar_pasien_pendaftaran_IGD').style.display = 'block';
        document.getElementById('batal_edit_pasien_pendaftaran_IGD').style.display = 'none';
        
        //load data from database
        loadRiwayatPenyakitPendaftaranIGD();
        loadRiwayatKunjunganPendaftaranIGD();
        loadListNokaPenjaminPendaftaranIGD();
        changeRujukanAsalPendaftaranIGD();
        // penyakitPendaftaranIGD.reset();
        // dokterPendaftaranIGD.reset();
        
        document.getElementById('noka_pendaftaran_IGD').value = '';
        document.getElementById('sjp_pendaftaran_IGD').value = '';
    }
    
    function loadRiwayatPenyakitPendaftaranIGD(){
        $('#list_riwayat_penyakit_pendaftaran_IGD').bootstrapTable('removeAll');
        if(data_pasien_pendaftaran_IGD['no_rm'] != ''){
            var param = {
                no_rm: data_pasien_pendaftaran_IGD['no_rm']
            };
            apiPOST('Gawat_Darurat/riwayatPenyakit', param, hasil => {
                if(hasil !== null){
                    $('#list_riwayat_penyakit_pendaftaran_IGD').bootstrapTable('append', hasil['data']);
                }
            }); 
        }
    }
    
    function loadRiwayatKunjunganPendaftaranIGD(){
        $('#list_riwayat_kunjungan_pendaftaran_IGD').bootstrapTable('removeAll');
        if(data_pasien_pendaftaran_IGD['no_rm'] != ''){
            var param = {
                no_rm: data_pasien_pendaftaran_IGD['no_rm']
            };
            apiPOST('Gawat_Darurat/riwayatKunjungan', param, hasil => {
                if(hasil !== null){
                    $('#list_riwayat_kunjungan_pendaftaran_IGD').bootstrapTable('append', hasil['data']);
                }
            }); 
        }
    }
    
    function loadListNokaPenjaminPendaftaranIGD(){
        listNokaPenjaminPendaftaranIGD = [];
        if(data_pasien_pendaftaran_IGD['no_rm'] != ''){
            var param = {
                no_rm: data_pasien_pendaftaran_IGD['no_rm']
            };
            apiPOST('Gawat_Darurat/listNoka', param, hasil => {
                if(hasil !== null){
                    listNokaPenjaminPendaftaranIGD = hasil['data'];
                }
            }); 
        }
    }
    
    function gantiPenjaminPendaftaranIGD(){
        var noka = '';
        var penjamin = document.getElementById('penjamin_pendaftaran_IGD').value;
        listNokaPenjaminPendaftaranIGD.forEach(element => {
            if(element['id_penjamin'] == penjamin){
                noka = element['no_kartu'];
            }
        });
        document.getElementById('noka_pendaftaran_IGD').value = noka;
    }
    
    function changeProvinsiPendaftaranIGD(ktp = false){
       if(ktp){
           optionChildByParent(listKabKotaPendaftaranIGD, 'provinsi_ktp_pendaftaran_IGD', 'kab_kota_ktp_pendaftaran_IGD', paramLookupKabKotaPendaftaranIGD);
       }else{
           optionChildByParent(listKabKotaPendaftaranIGD, 'provinsi_pendaftaran_IGD', 'kab_kota_pendaftaran_IGD', paramLookupKabKotaPendaftaranIGD);
       }
       changeKabKotaPendaftaranIGD(ktp);     
    }
    
    function changeKabKotaPendaftaranIGD(ktp = false){
       if(ktp){
           optionChildByParent(listKecamatanPendaftaranIGD, 'kab_kota_ktp_pendaftaran_IGD', 'kecamatan_ktp_pendaftaran_IGD', paramLookupKecamatanPendaftaranIGD);
       }else{
           optionChildByParent(listKecamatanPendaftaranIGD, 'kab_kota_pendaftaran_IGD', 'kecamatan_pendaftaran_IGD', paramLookupKecamatanPendaftaranIGD);
       }
       changeKecamatanPendaftaranIGD(ktp);     
    }
    
    function changeKecamatanPendaftaranIGD(ktp = false){
       if(ktp){
           optionChildByParent(listKelurahanPendaftaranIGD, 'kecamatan_ktp_pendaftaran_IGD', 'kelurahan_ktp_pendaftaran_IGD', paramLookupKelurahanPendaftaranIGD);
       }else{
           optionChildByParent(listKelurahanPendaftaranIGD, 'kecamatan_pendaftaran_IGD', 'kelurahan_pendaftaran_IGD', paramLookupKelurahanPendaftaranIGD);    
       }
    }
    
    function changeKelompokPenjaminPendaftaranIGD(){
       optionChildByParent(listPenjaminPendaftaranIGD, 'kelompok_penjamin_pendaftaran_IGD', 'penjamin_pendaftaran_IGD', paramLookupPenjaminPendaftaranIGD); 
       gantiPenjaminPendaftaranIGD();
    }
    
    function changeRujukanAsalPendaftaranIGD(){
       optionChildByParent(listRujukanPendaftaranIGD, 'rujukan_asal_pendaftaran_IGD', 'rujukan_pendaftaran_IGD', paramLookupRujukanPendaftaranIGD);
    }
    
    function updateDisabeledDataPasienPendaftaranIGD(){
        $('#nama_pendaftaran_IGD').prop('disabled', (!simpanPasienPendaftaranIGD));
        $('#nik_pendaftaran_IGD').prop('disabled', (!simpanPasienPendaftaranIGD));
        $('#agama_pendaftaran_IGD').prop('disabled', (!simpanPasienPendaftaranIGD));
        $('#gol_darah_pendaftaran_IGD').prop('disabled', (!simpanPasienPendaftaranIGD));
        $('#jenis_kelamin_pendaftaran_IGD').prop('disabled', (!simpanPasienPendaftaranIGD));
        $('#marital_pendaftaran_IGD').prop('disabled', (!simpanPasienPendaftaranIGD));
        $('#telepon_pendaftaran_IGD').prop('disabled', (!simpanPasienPendaftaranIGD));
        $('#wni_pendaftaran_IGD').prop('disabled', (!simpanPasienPendaftaranIGD));
        
        $('#tempat_lahir_pendaftaran_IGD').prop('disabled', (!simpanPasienPendaftaranIGD));
        $('#tgl_lahir_pendaftaran_IGD').prop('disabled', (!simpanPasienPendaftaranIGD));
        $('#pendidikan_pendaftaran_IGD').prop('disabled', (!simpanPasienPendaftaranIGD));
        $('#pekerjaan_pendaftaran_IGD').prop('disabled', (!simpanPasienPendaftaranIGD));
        
        $('#alamat_pendaftaran_IGD').prop('disabled', (!simpanPasienPendaftaranIGD));
        $('#provinsi_pendaftaran_IGD').prop('disabled', (!simpanPasienPendaftaranIGD));
        $('#kab_kota_pendaftaran_IGD').prop('disabled', (!simpanPasienPendaftaranIGD));
        $('#kecamatan_pendaftaran_IGD').prop('disabled', (!simpanPasienPendaftaranIGD));
        $('#kelurahan_pendaftaran_IGD').prop('disabled', (!simpanPasienPendaftaranIGD));
        $('#kode_pos_pendaftaran_IGD').prop('disabled', (!simpanPasienPendaftaranIGD));
        
        $('#alamat_ktp_pendaftaran_IGD').prop('disabled', (!simpanPasienPendaftaranIGD));
        $('#provinsi_ktp_pendaftaran_IGD').prop('disabled', (!simpanPasienPendaftaranIGD));
        $('#kab_kota_ktp_pendaftaran_IGD').prop('disabled', (!simpanPasienPendaftaranIGD));
        $('#kecamatan_ktp_pendaftaran_IGD').prop('disabled', (!simpanPasienPendaftaranIGD));
        $('#kelurahan_ktp_pendaftaran_IGD').prop('disabled', (!simpanPasienPendaftaranIGD));
        $('#kode_pos_ktp_pendaftaran_IGD').prop('disabled', (!simpanPasienPendaftaranIGD));
        
        $('#nama_ayah_pendaftaran_IGD').prop('disabled', (!simpanPasienPendaftaranIGD));
        $('#pekerjaan_ayah_pendaftaran_IGD').prop('disabled', (!simpanPasienPendaftaranIGD));
        $('#pendidikan_ayah_pendaftaran_IGD').prop('disabled', (!simpanPasienPendaftaranIGD));
        $('#nama_ibu_pendaftaran_IGD').prop('disabled', (!simpanPasienPendaftaranIGD));
        $('#pekerjaan_ibu_pendaftaran_IGD').prop('disabled', (!simpanPasienPendaftaranIGD));
        $('#pendidikan_ibu_pendaftaran_IGD').prop('disabled', (!simpanPasienPendaftaranIGD));
        $('#nama_pasangan_pendaftaran_IGD').prop('disabled', (!simpanPasienPendaftaranIGD));
        $('#pekerjaan_pasangan_pendaftaran_IGD').prop('disabled', (!simpanPasienPendaftaranIGD));
        $('#pendidikan_pasangan_pendaftaran_IGD').prop('disabled', (!simpanPasienPendaftaranIGD));
    }
    
    function fillIsiDataPasienPendaftaranIGD(){
        //Row 1
        document.getElementById('no_rm_pendaftaran_IGD').value = data_pasien_pendaftaran_IGD['no_rm'];
        document.getElementById('nama_pendaftaran_IGD').value = data_pasien_pendaftaran_IGD['nama'];
        document.getElementById('nik_pendaftaran_IGD').value = data_pasien_pendaftaran_IGD['nik'];
        if(data_pasien_pendaftaran_IGD['kd_agama'] == ''){
            document.getElementById('agama_pendaftaran_IGD').value = '0';
        }else{
            document.getElementById('agama_pendaftaran_IGD').value = data_pasien_pendaftaran_IGD['kd_agama'];
        }
        if(data_pasien_pendaftaran_IGD['gol_darah'] == ''){
            document.getElementById('gol_darah_pendaftaran_IGD').value = '0';
        }else{
            document.getElementById('gol_darah_pendaftaran_IGD').value = data_pasien_pendaftaran_IGD['gol_darah'];
        }
        if(data_pasien_pendaftaran_IGD['jenis_kelamin'] == ''){
            document.getElementById('jenis_kelamin_pendaftaran_IGD').value = 't';
        }else{
            document.getElementById('jenis_kelamin_pendaftaran_IGD').value = data_pasien_pendaftaran_IGD['jenis_kelamin'];
        }
        if(data_pasien_pendaftaran_IGD['status_marita'] == ''){
            document.getElementById('marital_pendaftaran_IGD').value = '2';
        }else{
            document.getElementById('marital_pendaftaran_IGD').value = data_pasien_pendaftaran_IGD['status_marita'];
        }
        document.getElementById('telepon_pendaftaran_IGD').value = data_pasien_pendaftaran_IGD['telepon'];
        if(data_pasien_pendaftaran_IGD['wni'] == ''){
            document.getElementById('wni_pendaftaran_IGD').checked = true;
        }else{
            document.getElementById('wni_pendaftaran_IGD').checked = (data_pasien_pendaftaran_IGD['wni'] == 't');
        }
        
        //Row 2
        document.getElementById('tempat_lahir_pendaftaran_IGD').value = data_pasien_pendaftaran_IGD['tempat_lahir'];
        if(data_pasien_pendaftaran_IGD['tgl_lahir'] == ''){
            document.getElementById('tgl_lahir_pendaftaran_IGD').valueAsDate = new Date();
        }else{
            document.getElementById('tgl_lahir_pendaftaran_IGD').value = data_pasien_pendaftaran_IGD['tgl_lahir'];
        }
        if(data_pasien_pendaftaran_IGD['kd_pendidikan'] == ''){
            document.getElementById('pendidikan_pendaftaran_IGD').value = '17';
        }else{
            document.getElementById('pendidikan_pendaftaran_IGD').value = data_pasien_pendaftaran_IGD['kd_pendidikan'];
        }
        if(data_pasien_pendaftaran_IGD['kd_pekerjaan'] == ''){
            document.getElementById('pekerjaan_pendaftaran_IGD').value = '96';
        }else{
            document.getElementById('pekerjaan_pendaftaran_IGD').value = data_pasien_pendaftaran_IGD['kd_pekerjaan'];
        }
        
        //Row 3 & 4
        document.getElementById('alamat_pendaftaran_IGD').value = data_pasien_pendaftaran_IGD['alamat'];
        document.getElementById('alamat_ktp_pendaftaran_IGD').value = data_pasien_pendaftaran_IGD['alamat_ktp'];
        document.getElementById('kode_pos_pendaftaran_IGD').value = data_pasien_pendaftaran_IGD['kd_pos'];
        document.getElementById('kode_pos_ktp_pendaftaran_IGD').value = data_pasien_pendaftaran_IGD['kd_pos_ktp'];
        if(data_pasien_pendaftaran_IGD['kd_kelurahan'] == ''){
            document.getElementById('provinsi_pendaftaran_IGD').value = '12';
            document.getElementById('provinsi_ktp_pendaftaran_IGD').value = '12';
            optionChildByParent(listKabKotaPendaftaranIGD, 'provinsi_pendaftaran_IGD', 'kab_kota_pendaftaran_IGD', paramLookupKabKotaPendaftaranIGD);
            optionChildByParent(listKabKotaPendaftaranIGD, 'provinsi_ktp_pendaftaran_IGD', 'kab_kota_ktp_pendaftaran_IGD', paramLookupKabKotaPendaftaranIGD);
            document.getElementById('kab_kota_pendaftaran_IGD').value = '188';
            document.getElementById('kab_kota_ktp_pendaftaran_IGD').value = '188';
            optionChildByParent(listKecamatanPendaftaranIGD, 'kab_kota_pendaftaran_IGD', 'kecamatan_pendaftaran_IGD', paramLookupKecamatanPendaftaranIGD);
            optionChildByParent(listKecamatanPendaftaranIGD, 'kab_kota_ktp_pendaftaran_IGD', 'kecamatan_ktp_pendaftaran_IGD', paramLookupKecamatanPendaftaranIGD);
            document.getElementById('kecamatan_pendaftaran_IGD').value = '1093';
            document.getElementById('kecamatan_ktp_pendaftaran_IGD').value = '1093';
            optionChildByParent(listKelurahanPendaftaranIGD, 'kecamatan_pendaftaran_IGD', 'kelurahan_pendaftaran_IGD', paramLookupKelurahanPendaftaranIGD);
            optionChildByParent(listKelurahanPendaftaranIGD, 'kecamatan_ktp_pendaftaran_IGD', 'kelurahan_ktp_pendaftaran_IGD', paramLookupKelurahanPendaftaranIGD);
            document.getElementById('kelurahan_pendaftaran_IGD').value = '3087';
            document.getElementById('kelurahan_ktp_pendaftaran_IGD').value = '3087';
        }else{
            var kdKecamatan = optionParentByChild(data_pasien_pendaftaran_IGD['kd_kelurahan'], listKelurahanPendaftaranIGD, 'kelurahan_pendaftaran_IGD', paramLookupKelurahanPendaftaranIGD);
            var kdKabKota = optionParentByChild(kdKecamatan, listKecamatanPendaftaranIGD, 'kecamatan_pendaftaran_IGD', paramLookupKecamatanPendaftaranIGD);
            var kdProvinsi = optionParentByChild(kdKabKota, listKabKotaPendaftaranIGD, 'kab_kota_pendaftaran_IGD', paramLookupKabKotaPendaftaranIGD);
            document.getElementById('provinsi_pendaftaran_IGD').value = kdProvinsi;
            var kdKecamatanKTP = optionParentByChild(data_pasien_pendaftaran_IGD['kd_kelurahan_ktp'], listKelurahanPendaftaranIGD, 'kelurahan_ktp_pendaftaran_IGD', paramLookupKelurahanPendaftaranIGD);
            var kdKabKotaKTP = optionParentByChild(kdKecamatanKTP, listKecamatanPendaftaranIGD, 'kecamatan_ktp_pendaftaran_IGD', paramLookupKecamatanPendaftaranIGD);
            var kdProvinsiKTP = optionParentByChild(kdKabKotaKTP, listKabKotaPendaftaranIGD, 'kab_kota_ktp_pendaftaran_IGD', paramLookupKabKotaPendaftaranIGD);
            document.getElementById('provinsi_ktp_pendaftaran_IGD').value = kdProvinsiKTP;
        }
        
        //Tab Keluarga
        document.getElementById('nama_ayah_pendaftaran_IGD').value = data_pasien_pendaftaran_IGD['nama_ayah'];
        if(data_pasien_pendaftaran_IGD['kd_pendidikan_ayah'] == ''){
            document.getElementById('pendidikan_ayah_pendaftaran_IGD').value = '17';
        }else{
            document.getElementById('pendidikan_ayah_pendaftaran_IGD').value = data_pasien_pendaftaran_IGD['kd_pendidikan_ayah'];
        }
        if(data_pasien_pendaftaran_IGD['kd_pekerjaan_ayah'] == ''){
            document.getElementById('pekerjaan_ayah_pendaftaran_IGD').value = '96';
        }else{
            document.getElementById('pekerjaan_ayah_pendaftaran_IGD').value = data_pasien_pendaftaran_IGD['kd_pekerjaan_ayah'];
        }
        document.getElementById('nama_ibu_pendaftaran_IGD').value = data_pasien_pendaftaran_IGD['nama_ibu'];
        if(data_pasien_pendaftaran_IGD['kd_pendidikan_ibu'] == ''){
            document.getElementById('pendidikan_ibu_pendaftaran_IGD').value = '17';
        }else{
            document.getElementById('pendidikan_ibu_pendaftaran_IGD').value = data_pasien_pendaftaran_IGD['kd_pendidikan_ibu'];
        }
        if(data_pasien_pendaftaran_IGD['kd_pekerjaan_ibu'] == ''){
            document.getElementById('pekerjaan_ibu_pendaftaran_IGD').value = '96';
        }else{
            document.getElementById('pekerjaan_ibu_pendaftaran_IGD').value = data_pasien_pendaftaran_IGD['kd_pekerjaan_ibu'];
        }
        document.getElementById('nama_pasangan_pendaftaran_IGD').value = data_pasien_pendaftaran_IGD['suami_istri'];
        if(data_pasien_pendaftaran_IGD['kd_pendidikan_suamiistri'] == ''){
            document.getElementById('pendidikan_pasangan_pendaftaran_IGD').value = '17';
        }else{
            document.getElementById('pendidikan_pasangan_pendaftaran_IGD').value = data_pasien_pendaftaran_IGD['kd_pendidikan_suamiistri'];
        }
        if(data_pasien_pendaftaran_IGD['kd_pekerjaan_suamiistri'] == ''){
            document.getElementById('pekerjaan_pasangan_pendaftaran_IGD').value = '96';
        }else{
            document.getElementById('pekerjaan_pasangan_pendaftaran_IGD').value = data_pasien_pendaftaran_IGD['kd_pekerjaan_suamiistri'];
        }
        
        hitungUmur('tgl_lahir_pendaftaran_IGD', 'umur_pendaftaran_IGD');
    }
    
    function editDataPasienPendaftaranIGD(){
        document.getElementById('edit_pasien_pendaftaran_IGD').style.display = 'none';
        document.getElementById('batal_edit_pasien_pendaftaran_IGD').style.display = 'block';
        simpanPasienPendaftaranIGD = true;
        updateDisabeledDataPasienPendaftaranIGD();
    }
    
    function batalEditDataPasienPendaftaranIGD(){
        document.getElementById('batal_edit_pasien_pendaftaran_IGD').style.display = 'none';
        document.getElementById('edit_pasien_pendaftaran_IGD').style.display = 'block';
        simpanPasienPendaftaranIGD = false;
        updateDisabeledDataPasienPendaftaranIGD();
        fillIsiDataPasienPendaftaranIGD();
    }
    
    function showLookupPendaftaranIGD(){
        resetDataPasienPendaftaranIGD();
        document.getElementById('daftar_pasien_pendaftaran_IGD').style.display = 'none';
        document.getElementById('lookup_pasien_pendaftaran_IGD').style.display = 'block';
    }
    
    function resetDataPasienPendaftaranIGD(){
        for (const kolom in data_pasien_pendaftaran_IGD) {
            data_pasien_pendaftaran_IGD[kolom] = '';
        }
    }
    
    function lookupListPasienPendaftaranIGD(){
        document.getElementById('loading_pendfIGD').style.display = 'block';
        showLookupPendaftaranIGD();
        $('#list_lookup_pasien_pendaftaran_IGD').bootstrapTable('removeAll');
        var param = {
            no_rm: $("#IGD_pendf_kd_pasiencariIGD").val().toUpperCase(),
            nama: $("#IGD_pendf_nm_pasiencariIGD").val().toUpperCase(),
            nik: $("#IGD_pendf_search_nik").val().toUpperCase()
        };
        
        apiPOST('Gawat_Darurat/lookupPendaftaranPasien', param, hasil => {
            if(hasil !== null){
                $('#list_lookup_pasien_pendaftaran_IGD').bootstrapTable('append', hasil['data']);
            }
        }).then(value => {
            document.getElementById('loading_pendfIGD').style.display = 'none';
        });
    }
    
    function simpanPendaftaranIGD(){
        /* if($("#dokter_pendaftaran_IGD").val()==''){
			toastr.error('Dokter Harap Diisi');
			return;
		}
        if($("#penyakit_pendaftaran_IGD").val()==''){
			toastr.error('Diagnosa Harap Diisi');
			return;
		}
        if (dokterPendaftaranIGD.getValue() == ''){
            toastr.error("Dokter Belum Dipilh");
            return;
        } */
        if(simpanPasienPendaftaranIGD){
            var param = {
                no_rm: data_pasien_pendaftaran_IGD['no_rm'],
                kd_kelurahan: document.getElementById('kelurahan_pendaftaran_IGD').value,
                kd_pendidikan: document.getElementById('pendidikan_pendaftaran_IGD').value,
                kd_pekerjaan: document.getElementById('pekerjaan_pendaftaran_IGD').value,
                kd_perusahaan: '',
                kd_agama: document.getElementById('agama_pendaftaran_IGD').value,
                nama: document.getElementById('nama_pendaftaran_IGD').value,
                tgl_lahir: document.getElementById('tgl_lahir_pendaftaran_IGD').value,
                gol_darah: document.getElementById('gol_darah_pendaftaran_IGD').value,
                jenis_kelamin: document.getElementById('jenis_kelamin_pendaftaran_IGD').value,
                status_hidup: 'true',
                status_marita: document.getElementById('marital_pendaftaran_IGD').value,
                alamat: document.getElementById('alamat_pendaftaran_IGD').value,
                kota: $("#kab_kota_pendaftaran_IGD option:selected").text(),
                telepon: document.getElementById('telepon_pendaftaran_IGD').value,
                kd_pos: document.getElementById('kode_pos_pendaftaran_IGD').value,
                jabatan: '',
                tanda_pengenal: '0',
                nik: document.getElementById('nik_pendaftaran_IGD').value,
                keterangan: '',
                kode_lama: '',
                wni: document.getElementById('wni_pendaftaran_IGD').checked,
                nama_keluarga: '',
                tempat_lahir: document.getElementById('tempat_lahir_pendaftaran_IGD').value,
                pemegang_asuransi: '',
                no_reg_lama: '',
                kd_suku: '',
                ket_simpan: '',
                handphone: document.getElementById('telepon_pendaftaran_IGD').value,
                email: '',
                nama_ayah: document.getElementById('nama_ayah_pendaftaran_IGD').value,
                nama_ibu: document.getElementById('nama_ibu_pendaftaran_IGD').value,
                suami_istri: document.getElementById('nama_pasangan_pendaftaran_IGD').value,
                alamat_ktp: document.getElementById('alamat_ktp_pendaftaran_IGD').value,
                kd_pos_ktp: document.getElementById('kode_pos_ktp_pendaftaran_IGD').value,
                kd_kelurahan_ktp: document.getElementById('kelurahan_ktp_pendaftaran_IGD').value,
                kd_pendidikan_ayah: document.getElementById('pendidikan_ayah_pendaftaran_IGD').value,
                kd_pendidikan_ibu: document.getElementById('pendidikan_ibu_pendaftaran_IGD').value,
                kd_pendidikan_suamiistri: document.getElementById('pendidikan_pasangan_pendaftaran_IGD').value,
                kd_pekerjaan_ayah: document.getElementById('pekerjaan_ayah_pendaftaran_IGD').value,
                kd_pekerjaan_ibu: document.getElementById('pekerjaan_ibu_pendaftaran_IGD').value,
                kd_pekerjaan_suamiistri: document.getElementById('pekerjaan_pasangan_pendaftaran_IGD').value
            };
            if(data_pasien_pendaftaran_IGD['no_rm'] == ''){
                apiPOST('Pasien/addPasien', param, hasil => {
                    if(hasil !== null){
                        data_pasien_pendaftaran_IGD['no_rm'] = hasil['data'];
                        document.getElementById('no_rm_pendaftaran_IGD').value = hasil['data'];
                        simpanKunjunganPendaftaranIGD();
                    }
                });
            }else{
                apiPOST('Pasien/updatePasien', param, hasil => {
                    if(hasil !== null){
                        simpanKunjunganPendaftaranIGD();
                    }
                });
            }
        }else{
            simpanKunjunganPendaftaranIGD();
        }
    }
    
    function simpanKunjunganPendaftaranIGD(){
        var param = {
            id_user: user.id_user,
            no_rm: data_pasien_pendaftaran_IGD['no_rm'],
            id_unit: document.getElementById('unit_pendaftaran_IGD').value,
            id_penanggung_jawab: document.getElementById('nik_penanggung_jawab_pendaftaran_IGD').value,
            nama_penanggung_jawab: document.getElementById('nama_penanggung_jawab_pendaftaran_IGD').value,
            hubungan_penanggung_jawab: document.getElementById('hubungan_penanggung_jawab_pendaftaran_IGD').value,
            no_hp_penanggung_jawab: document.getElementById('telepon_penanggung_jawab_pendaftaran_IGD').value,
            // id_pegawai: dokterPendaftaranIGD.getValue(),
            id_pegawai: $('#dokter_pendaftaran_IGD').val(),
            // diagnosa: penyakitPendaftaranIGD.getValue(),
            diagnosa: $('#penyakit_pendaftaran_IGD').val(),
            id_penjamin: document.getElementById('penjamin_pendaftaran_IGD').value,
            noka: document.getElementById('noka_pendaftaran_IGD').value,
            no_sjp: document.getElementById('sjp_pendaftaran_IGD').value,
            rujukan: document.getElementById('rujukan_pendaftaran_IGD').value,
            caraterima:document.getElementById('rujukan_asal_pendaftaran_IGD').value
        };
        apiPOST("Kunjungan/addKunjungan", param, hasil =>{
            if(hasil != null){
                loadRiwayatPenyakitPendaftaranIGD();
                loadRiwayatKunjunganPendaftaranIGD();
            }
        });
    }

    function IGDpendf_createlabelpasien(){
        if (document.getElementById('no_rm_pendaftaran_IGD').value == ''){
           toastr.error('Silahkan Lakukan Pendaftaran Dahulu.');
        }else{

          var param = {
            norm      : document.getElementById('no_rm_pendaftaran_IGD').value,
            nm_pasien : document.getElementById('nama_pendaftaran_IGD').value,
            modul     : '3'
          };
          newTabPOST('API/Rawatjalan/createlabel',param);
          return;

        }
    }

    function IGDpendf_createkartupasien() {
        if (document.getElementById('no_rm_pendaftaran_IGD').value == ''){
           toastr.error('Silahkan Lakukan Pendaftaran Dahulu.');
        }else{

          var param = {
            norm      : document.getElementById('no_rm_pendaftaran_IGD').value,
            nm_pasien : document.getElementById('nama_pendaftaran_IGD').value
          };
          newTabPOST('API/Cetak/cetakkartupasien', param);
          return;
        }
    }
	
	function tampil_diagnosa_igd(kode) {
		var param = {
			id: kode
		};
		apiPOST('Data_Sosial/diagnosabyname', param, hasil => {
			var penyakit = '';
			var a = hasil['data'];
			for (var i = 0; i < a.length; i++) {
			  penyakit += '<option value="' + a[i]['id_penyakit'] + '">' + a[i]['id_penyakit'] + ' | ' + a[i]['penyakit'] + '</option>';
			}
			document.getElementById('penyakit_pendaftaran_IGD').innerHTML = penyakit;
		});
	}
        
        function showModalSEPpendaftaranIGD(){
            sep_noka = document.getElementById('noka_pendaftaran_IGD').value;
            var sekarang = new Date();
            sekarang.setTime(sekarang.getTime() + 7 * 3600000);
            //sep_noka = '0002077926175';
            sep_tgl = sekarang.toJSON().slice(0,10);
            sep_kelas = '';
            var param = {};
            document.getElementById('tgl_sep_pendaftaran_IGD').value = sep_tgl;
            document.getElementById('tgl_laka_sep_pendaftaran_IGD').valueAsDate = sekarang;
            document.getElementById('diagnosa_sep_pendaftaran_IGD').value = $('#penyakit_pendaftaran_IGD').val();
            document.getElementById('katarak_sep_pendaftaran_IGD').value = '0';
            document.getElementById('cob_sep_pendaftaran_IGD').value = '0';
            document.getElementById('laka_sep_pendaftaran_IGD').value = '0';
            editLakaSEPPendIGD();
            apiPOST('Bridging_UAT/peserta/noka/'+sep_noka, param, hasil => {
                document.getElementById('noka_sep_pendaftaran_IGD').value = hasil['data']['peserta']['noKartu'];
                document.getElementById('nama_sep_pendaftaran_IGD').value = hasil['data']['peserta']['nama'];
                document.getElementById('lahir_sep_pendaftaran_IGD').value = hasil['data']['peserta']['tglLahir'];
                document.getElementById('kelas_sep_pendaftaran_IGD').value = hasil['data']['peserta']['hakKelas']['keterangan'];
                sep_kelas = hasil['data']['peserta']['hakKelas']['kode'];
                if(hasil['data']['peserta']['statusPeserta']['kode'] == '0'){
                    document.getElementById('status_sep_pendaftaran_IGD').style.backgroundColor = '#90EE90';
                    document.getElementById('btn_ok_sep_pendaftaran_IGD').disabled = false;
                }else{
                    document.getElementById('status_sep_pendaftaran_IGD').style.backgroundColor = '#FFC0CB';
                    document.getElementById('btn_ok_sep_pendaftaran_IGD').disabled = true;
                }
                document.getElementById('status_sep_pendaftaran_IGD').value = hasil['data']['peserta']['statusPeserta']['keterangan'];
            });
            document.getElementById('dpjp_sep_pendaftaran_IGD').innerHTML = '';
            
            /*
            apiPOST('Bridging_UAT/ref/DPJP/INT', param, hasil => {
                var option = '';
                var x = hasil['data']['list'];
                x.forEach((elemX) => {
                    option += '<option value="'+elemX['kode']+'">'+elemX['nama']+'</option>';
                });
                document.getElementById('dpjp_sep_pendaftaran_IGD').innerHTML = option;
                document.getElementById('dpjp_sep_pendaftaran_IGD').value = x[0]['kode'];
            });
            */
           
            apiPOST('Gawat_Darurat/listPoliBPJS', param, hasil => {
                var option = '';
                var x = hasil['data'];
                x.forEach((elemX) => {
                    option += '<option value="'+elemX['map_bpjs']+'">'+elemX['map_bpjs']+'</option>';
                });
                document.getElementById('spc_sep_pendaftaran_IGD').innerHTML = option;
                document.getElementById('spc_sep_pendaftaran_IGD').value = x[0]['map_bpjs'];
                cariListDPJPPendaftaranIGD();
            });
            $('#modalSEPPendaftaranIGD').modal('show');
        }
        
        function editLakaSEPPendIGD(){
            if(document.getElementById('laka_sep_pendaftaran_IGD').value == '0'){
                document.getElementById('form_laka_sep_pendaftaran_IGD').style.display = 'none';
                document.getElementById('no_lp_sep_pendaftaran_IGD').value = '';
                document.getElementById('keterangan_laka_sep_pendaftaran_IGD').value = '';
                document.getElementById('suplesi_sep_pendaftaran_IGD').value == '0';
                editSuplesiSEPPendIGD();
            }else{
                if(sep_list_provinsi.length == 0){
                    apiPOST('Bridging_UAT/ref/Propinsi', {}, hasil => {
			var option = '';
			sep_list_provinsi = hasil['data']['list'];
			sep_list_provinsi.forEach((elemX) => {
                            option += '<option value="'+elemX['kode']+'">'+elemX['nama']+'</option>';
                        });
			document.getElementById('provinsi_laka_sep_pendaftaran_IGD').innerHTML = option;
                        document.getElementById('provinsi_laka_sep_pendaftaran_IGD').value = sep_list_provinsi[0]['kode'];
                    });
                }else{
                    document.getElementById('provinsi_laka_sep_pendaftaran_IGD').value = sep_list_provinsi[0]['kode'];
                }
                document.getElementById('kota_laka_sep_pendaftaran_IGD').innerHTML = '';
                document.getElementById('kota_laka_sep_pendaftaran_IGD').disabled = true;
                document.getElementById('kecamatan_laka_sep_pendaftaran_IGD').innerHTML = '';
                document.getElementById('kecamatan_laka_sep_pendaftaran_IGD').disabled = true;
                document.getElementById('form_laka_sep_pendaftaran_IGD').style.display = 'block';
            }
        }
        
        function editSuplesiSEPPendIGD(){
            if(document.getElementById('suplesi_sep_pendaftaran_IGD').value == '0'){
                document.getElementById('form_suplesi_sep_pendaftaran_IGD').style.display = 'none';
            }else{
                document.getElementById('no_sep_suplesi_sep_pendaftaran_IGD').value = '';
                document.getElementById('form_suplesi_sep_pendaftaran_IGD').style.display = 'block';
            }
        }
        
        function gantiProvinsiSEPPendIGD(){
            apiPOST('Bridging_UAT/ref/Kabupaten/'+document.getElementById('provinsi_laka_sep_pendaftaran_IGD').value, {}, hasil => {
                var option = '';
                var x = hasil['data']['list'];
                x.forEach((elemX) => {
                    option += '<option value="'+elemX['kode']+'">'+elemX['nama']+'</option>';
                });
                document.getElementById('kota_laka_sep_pendaftaran_IGD').innerHTML = option;
                document.getElementById('kota_laka_sep_pendaftaran_IGD').value = x[0]['kode'];
                document.getElementById('kota_laka_sep_pendaftaran_IGD').disabled = false;
                document.getElementById('kecamatan_laka_sep_pendaftaran_IGD').innerHTML = '';
                document.getElementById('kecamatan_laka_sep_pendaftaran_IGD').disabled = true;
            });
        }
        
        function gantiKotaSEPPendIGD(){
            apiPOST('Bridging_UAT/ref/Kecamatan/'+document.getElementById('kota_laka_sep_pendaftaran_IGD').value, {}, hasil => {
                var option = '';
                var x = hasil['data']['list'];
                x.forEach((elemX) => {
                    option += '<option value="'+elemX['kode']+'">'+elemX['nama']+'</option>';
                });
                document.getElementById('kecamatan_laka_sep_pendaftaran_IGD').innerHTML = option;
                document.getElementById('kecamatan_laka_sep_pendaftaran_IGD').value = x[0]['kode'];
                document.getElementById('kecamatan_laka_sep_pendaftaran_IGD').disabled = false;
            });
        }

        function cariListDPJPPendaftaranIGD(){
            document.getElementById('spc_sep_pendaftaran_IGD').disabled = true;
            var ada_pilihan = false;
            var poliTerpilih = document.getElementById('spc_sep_pendaftaran_IGD').value;
            document.getElementById('dpjp_sep_pendaftaran_IGD').value = '';
            document.getElementById('dpjp_sep_pendaftaran_IGD').disabled = true;
            apiPOST('Bridging_UAT/ref/DPJP/'+poliTerpilih, param, hasil => {
                var option = '';
                var x = hasil['data']['list'];
                x.forEach((elemX) => {
                    option += '<option value="'+elemX['kode']+'">'+elemX['nama']+'</option>';
                    ada_pilihan = true;
                });
                document.getElementById('dpjp_sep_pendaftaran_IGD').innerHTML = option;
                if(ada_pilihan){
                    document.getElementById('dpjp_sep_pendaftaran_IGD').value = x[0]['kode'];
                    document.getElementById('dpjp_sep_pendaftaran_IGD').disabled = false;
                }
            }).then(() => {
                document.getElementById('spc_sep_pendaftaran_IGD').disabled = false;
            });
        }
        
        function OKModalSEPPendaftaranIGD(){
            var no_lp = '';
            var tgl_laka = '';
            var keterangan_laka = '';
            var suplesi = '0';
            var no_suplesi = '';
            var provinsi_laka = '';
            var kota_laka = '';
            var kecamatan_laka = '';
            
            if(document.getElementById('laka_sep_pendaftaran_IGD').value != '0'){
                no_lp = document.getElementById('no_lp_sep_pendaftaran_IGD').value;
                tgl_laka = document.getElementById('tgl_laka_sep_pendaftaran_IGD').valueAsDate.toJSON().slice(0,10);
                keterangan_laka = document.getElementById('keterangan_laka_sep_pendaftaran_IGD').value;
                if(document.getElementById('suplesi_sep_pendaftaran_IGD').value != '0'){
                    no_suplesi = document.getElementById('no_sep_suplesi_sep_pendaftaran_IGD').value;
                }
                provinsi_laka = document.getElementById('provinsi_laka_sep_pendaftaran_IGD').value;
                kota_laka = document.getElementById('kota_laka_sep_pendaftaran_IGD').value;
                kecamatan_laka = document.getElementById('kecamatan_laka_sep_pendaftaran_IGD').value;
            }
            
            var param = {
                no_rm: data_pasien_pendaftaran_IGD['no_rm'],
                noka: sep_noka,
                tgl: sep_tgl,
                kls: sep_kelas,
                diagnosa: document.getElementById('diagnosa_sep_pendaftaran_IGD').value,
                cob: document.getElementById('cob_sep_pendaftaran_IGD').value,
                katarak: document.getElementById('katarak_sep_pendaftaran_IGD').value,
                laka: document.getElementById('laka_sep_pendaftaran_IGD').value,
                no_lp: no_lp,
                tgl_laka: tgl_laka,
                keterangan_laka: keterangan_laka,
                suplesi: suplesi,
                no_suplesi: no_suplesi,
                provinsi_laka: provinsi_laka,
                kota_laka: kota_laka,
                kecamatan_laka: kecamatan_laka,
                dpjp: document.getElementById('dpjp_sep_pendaftaran_IGD').value,
                telp: document.getElementById('telepon_pendaftaran_IGD').value,
                user: user['nama']
            };
            apiPOST('Bridging_UAT/SEPIGD', param, hasil => {
                if(hasil['status'] == 'sukses'){
                    document.getElementById('sjp_pendaftaran_IGD').value = hasil['data']['sep']['noSep'];
                    $('#modalSEPPendaftaranIGD').modal('hide');
                }
            });
        }
</script>