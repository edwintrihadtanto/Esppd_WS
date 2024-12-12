<div class="row m-1">
    <div class="col">
        <div class="row">
            <div class="overlay-wrapper" id="loading_setup_pasien">
                <div class="overlay">
                  <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                </div>
            </div>
        </div>
        
        <div class="row m-2">
            <div class="card">
                <div class="row pt-1 pr-1 pl-2">
                    <div class="col-sm-auto">
                      <div class="form-group">
                        <label>No. RM:</label>
                        <input type="search" class="form-control form-control-xs" onkeypress="lookupListPasienSetupPasienTextField(event);" placeholder="Entry RM..." id="lookup_no_rm_setup_pasien" autocomplete="off" >
                      </div>
                    </div>
                    <div class="col-sm-auto">
                      <div class="form-group">
                        <label> Nama:</label>
                        <input type="search" class="form-control form-control-xs" onkeypress="lookupListPasienSetupPasienTextField(event);" placeholder="Entry Nama Pasien..." id="lookup_nama_setup_pasien" autocomplete="off">
                      </div>
                    </div>
                    <div class="col-sm-auto">
                      <div class="form-group">
                        <label> NIK:</label>
                        <input type="search" class="form-control form-control-xs" onkeypress="lookupListPasienSetupPasienTextField(event);" id="lookup_nik_setup_pasien" placeholder="Entry NIK Pasien..." autocomplete="off">
                      </div>
                    </div>
                     <div class="col mx-auto p-3">
                         <button class="btn btn-dark" onclick="lookupListPasienSetupPasien();">Cari</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mb-5">
            <div class="col">
                <div class="card">
                    <div class="row m-2">
                        <div class="col"></div>
                        <div class="col-auto">
                            <button class=" btn btn-primary" onclick="showModalEditPasienSetupPasien();"> + Pasien Baru </button>
                        </div>
                        <div class="col-auto">
                            <button class=" btn btn-success" onclick="showModalEditPenjaminPasienSetupPasien();"> Data Penjamin </button>
                        </div>
                        <div class="col-auto">
                            <button class=" btn btn-danger" onclick="hapusPasienSetupPasien();"> - Hapus Pasien </button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <table
                            data-toggle="table"
                            data-pagination="true"
                            data-pagination-parts="['pageInfo', 'pageList']"
                            data-single-select="true"
                            data-click-to-select="true"
                            data-header-style="headerStyleSetupPasien"
                            id="tabel_setup_pasien">
                                <thead>
                                    <th data-field="no_rm">No. RM</th>
                                    <th data-field="nama">Nama Pasien</th>
                                    <th data-field="alamat">Alamat Pasien</th>
                                    <th data-field="tgl_lahir">Tanggal lahir</th>
                                    <th data-field="nik">NIK Pasien</th>
                                    <th data-field="state" data-checkbox="true"></th>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

<div id="modal_edit_setup_pasien" class="modal" tabindex="-1">
    <div class="modal-dialog" style="max-width: 95%;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Data Pasien</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col">
                <div class="row m-1">
                    <div class="col">
                        <label>Rekam Medis</label>
                        <input type="text"  id="no_rm_setup_pasien" class="form-control form-control-xs" disabled>
                    </div>
                    <div class="col">
                        <label>Nama Pasien</label>
                        <input type="text"  id="nama_setup_pasien" class="form-control form-control-xs" maxlength="50">
                    </div>
                    <div class="col">
                        <label>NIK</label>
                        <input type="text"  id="nik_setup_pasien" class="form-control form-control-xs" maxlength="50">
                    </div>
                    <div class="col">
                        <label>Agama</label>
                        <select class="form-control form-control-xs" id="agama_setup_pasien"></select>
                    </div>
                    <div class="col">
                        <label>Golongan Darah</label>
                        <select class="form-control form-control-xs" id="gol_darah_setup_pasien"></select>
                    </div>
                    <div class="col">
                        <label>Jenis Kelamin</label>
                        <select class="form-control form-control-xs" id="jenis_kelamin_setup_pasien">
                          <option value="t">Laki-laki</option>
                          <option value="f">Perempuan</option>
                        </select>
                    </div>
                    <div class="col">
                        <label>Status Marital</label>
                        <select class="form-control form-control-xs" id="marital_setup_pasien"></select>
                    </div>
                    <div class="col">
                        <label>Nomor Telepon</label>
                        <input type="text"  id="telepon_setup_pasien" class="form-control form-control-xs" maxlength="30">
                    </div>
                    <div class="col">
                        <label>WNI</label><br>
                        <input type="checkbox" id="wni_setup_pasien" checked="true">
                    </div>
                </div>

                <div class="row m-1">
                    <div class="col">
                        <label>Tempat Lahir</label>
                        <input type="text"  id="tempat_lahir_setup_pasien" class="form-control form-control-xs" maxlength="25">
                    </div>
                    <div class="col">
                        <label>Tanggal Lahir</label>
                        <input type="date"  id="tgl_lahir_setup_pasien" class="form-control form-control-xs" onchange="hitungUmur('tgl_lahir_setup_pasien', 'umur_setup_pasien');">
                    </div>
                    <div class="col">
                        <label>Umur</label>
                        <input type="text"  id="umur_setup_pasien" class="form-control form-control-xs" disabled="">
                    </div>
                    <div class="col">
                        <label>Pendidikan</label>
                        <select  id="pendidikan_setup_pasien" class="form-control form-control-xs"></select>
                    </div>
                    <div class="col">
                        <label>Pekerjaan</label>
                        <select  id="pekerjaan_setup_pasien" class="form-control form-control-xs"></select>
                    </div>
                </div>

                <div class="row m-1">
                    <div class="col">
                        <label>Alamat</label>
                        <input type="text"  id="alamat_setup_pasien" class="form-control form-control-xs">
                    </div>
                    <div class="col">
                        <label>Provinsi</label>
                        <select  id="provinsi_setup_pasien" class="form-control form-control-xs" onchange="changeProvinsiSetupPasien();"></select>
                    </div>
                    <div class="col">
                        <label>Kabupaten / Kota</label>
                        <select  id="kab_kota_setup_pasien" class="form-control form-control-xs" onchange="changeKabKotaSetupPasien();"></select>
                    </div>
                    <div class="col">
                        <label>Kecamatan</label>
                        <select  id="kecamatan_setup_pasien" class="form-control form-control-xs" onchange="changeKecamatanSetupPasien();"></select>
                    </div>
                    <div class="col">
                        <label>Kelurahan</label>
                        <select  id="kelurahan_setup_pasien" class="form-control form-control-xs"></select>
                    </div>
                    <div class="col">
                        <label>Kode Pos</label>
                        <input type="text"  id="kode_pos_setup_pasien" class="form-control form-control-xs" maxlength="5">
                    </div>
                </div>

                <div class="row m-1">
                    <div class="col">
                        <label>Alamat KTP</label>
                        <input type="text"  id="alamat_ktp_setup_pasien" class="form-control form-control-xs">
                    </div>
                    <div class="col">
                        <label>Provinsi KTP</label>
                        <select  id="provinsi_ktp_setup_pasien" class="form-control form-control-xs" onchange="changeProvinsiSetupPasien(true);"></select>
                    </div>
                    <div class="col">
                        <label>Kabupaten / Kota KTP</label>
                        <select  id="kab_kota_ktp_setup_pasien" class="form-control form-control-xs" onchange="changeKabKotaSetupPasien(true);"></select>
                    </div>
                    <div class="col">
                        <label>Kecamatan KTP</label>
                        <select  id="kecamatan_ktp_setup_pasien" class="form-control form-control-xs" onchange="changeKecamatanSetupPasien(true);"></select>
                    </div>
                    <div class="col">
                        <label>Kelurahan KTP</label>
                        <select  id="kelurahan_ktp_setup_pasien" class="form-control form-control-xs"></select>
                    </div>
                    <div class="col">
                        <label>Kode Pos KTP</label>
                        <input type="text"  id="kode_pos_ktp_setup_pasien" class="form-control form-control-xs" maxlength="5">
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-1">
            <div class="col">
                <label>Nama Ayah</label>
                <input type="text"  id="nama_ayah_setup_pasien" class="form-control form-control-xs" maxlength="50">
            </div>
            <div class="col">
                <label>Pekerjaan Ayah</label>
                <select  id="pekerjaan_ayah_setup_pasien" class="form-control form-control-xs"></select>
            </div>
            <div class="col">
                <label>Pendidikan Ayah</label>
                <select  id="pendidikan_ayah_setup_pasien" class="form-control form-control-xs"></select>
            </div>
        </div>
        <div class="row m-1">
            <div class="col">
                <label>Nama Ibu</label>
                <input type="text"  id="nama_ibu_setup_pasien" class="form-control form-control-xs" maxlength="50">
            </div>
            <div class="col">
                <label>Pekerjaan Ibu</label>
                <select  id="pekerjaan_ibu_setup_pasien" class="form-control form-control-xs"></select>
            </div>
            <div class="col">
                <label>Pendidikan Ibu</label>
                <select  id="pendidikan_ibu_setup_pasien" class="form-control form-control-xs"></select>
            </div>
        </div>
        <div class="row m-1">
            <div class="col">
                <label>Nama Suami/Istri</label>
                <input type="text"  id="nama_pasangan_setup_pasien" class="form-control form-control-xs" maxlength="50">
            </div>
            <div class="col">
                <label>Pekerjaan Suami/Istri</label>
                <select  id="pekerjaan_pasangan_setup_pasien" class="form-control form-control-xs"></select>
            </div>
            <div class="col">
                <label>Pendidikan Suami/Istri</label>
                <select  id="pendidikan_pasangan_setup_pasien" class="form-control form-control-xs"></select>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" onclick="simpanSetupPasien();" data-dismiss="modal">Simpan</button>
        &nbsp;&nbsp;&nbsp;
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<div id="modal_edit_penjamin_setup_pasien" class="modal" tabindex="-1">
    <div class="modal-dialog" style="max-width: 60%;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Data Penjamin Pasien</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="row p-2">
              <div class="col-auto">
                <label>Kelompok Penjamin</label>
                <select  id="kelompok_penjamin_setup_pasien" class="form-control form-control-xs" onchange="changeKelompokPenjaminSetupPasien();"></select>
              </div>
              
              <div class="col-auto">
                <label>Penjamin</label>
                <select  id="penjamin_setup_pasien" class="form-control form-control-xs"></select>
              </div>
              
              <div class="col-sm-auto">
                <div class="form-group">
                  <label>No. Kartu</label>
                  <input type="text" class="form-control form-control-xs"  id="noka_setup_pasien" autocomplete="off" >
                </div>
              </div>
              
              <div class="col"></div>
              
              <div class="col-auto">
                <button type="button" class="btn btn-success" onclick="simpanPenjaminSetupPasien();">Simpan</button>
                &nbsp;&nbsp;&nbsp;
                <button type="button" class="btn btn-danger" onclick="hapusPenjaminSetupPasien();">Hapus</button>
              </div>
          </div>
          <div class="row p-2">
            <div class="col">
                <table
                data-toggle="table"
                data-pagination="true"
                data-pagination-parts="['pageInfo', 'pageList']"
                data-single-select="true"
                data-click-to-select="true"
                data-header-style="headerStyleSetupPasien"
                id="tabel_penjamin_setup_pasien">
                    <thead>
                        <th data-field="kelompok_penjamin">Kelompok Penjamin</th>
                        <th data-field="nama_penjamin">Penjamin</th>
                        <th data-field="no_kartu">No. Kartu</th>
                        <th data-field="state" data-checkbox="true"></th>
                    </thead>
                </table>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<script>
    var cariAgamaSetupPasien = false;
    var cariGolDarahSetupPasien = false;
    var cariMaritalSetupPasien = false;
    var cariPendidikanSetupPasien = false;
    var cariPekerjaanSetupPasien = false;
    var cariProvinsiSetupPasien = false;
    var cariUnitSetupPasien = false;
    var cariKelompokPenjaminSetupPasien = false;
    var data_pasien_setup_pasien = {
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
    
    var listKabKotaSetupPasien = [];
    var listKecamatanSetupPasien = [];
    var listKelurahanSetupPasien = [];
    var listPenjaminSetupPasien = [];
    
    var paramLookupKabKotaSetupPasien = ['kd_propinsi', 'kd_kabupaten', 'kabupaten'];
    var paramLookupKecamatanSetupPasien = ['kd_kabupaten', 'kd_kecamatan', 'kecamatan'];
    var paramLookupKelurahanSetupPasien = ['kd_kecamatan', 'kd_kelurahan', 'kelurahan'];
    var paramLookupPenjaminSetupPasien = ['id_kelompok_penjamin', 'id_penjamin', 'nama_penjamin'];
    
    var nowday = "<?php echo date('Y-m-d'); ?>";
    var tempRM = "";
    
    loadAwalSetupPasien();
    
    function headerStyleSetupPasien(){
        return {
            css: {
                'color': 'white',
                'background-color': 'black',
                'border': '1px solid black'
            }
        };
    }
    
    function loadAwalSetupPasien(){
        $('#tabel_setup_pasien').bootstrapTable({});
        $('#tabel_penjamin_setup_pasien').bootstrapTable({});
        $('#tabel_setup_pasien').on('dbl-click-row.bs.table', function (e, row, f) {
            for (const kolom in data_pasien_setup_pasien) {
                data_pasien_setup_pasien[kolom] = row[kolom];
            }
            showModalEditPasienSetupPasien(false);
        });
        
        
        apiPOST('Data_Sosial/agama', {}, hasil => {
            if(hasil !== null){
                var list = hasil['data'];
                var opsi = document.getElementById('agama_setup_pasien');
                list.forEach(baru => {
                    var option = document.createElement('option');
                    option.value = baru['kd_agama'];
                    option.innerHTML = baru['agama'];
                    opsi.appendChild(option);
                });
                cariAgamaSetupPasien = true;
                hideLoadingAwalSetupPasien();
            }
        });
        
        apiPOST('Data_Sosial/darah', {}, hasil => {
            if(hasil !== null){
                var list = hasil['data'];
                var opsi = document.getElementById('gol_darah_setup_pasien');
                list.forEach(baru => {
                    var option = document.createElement('option');
                    option.value = baru['id_gol_darah'];
                    option.innerHTML = baru['darah'];
                    opsi.appendChild(option);
                });
                cariGolDarahSetupPasien = true;
                hideLoadingAwalSetupPasien();
            }
        });        
        
        apiPOST('Data_Sosial/marital', {}, hasil => {
            if(hasil !== null){
                var list = hasil['data'];
                var opsi = document.getElementById('marital_setup_pasien');
                list.forEach(baru => {
                    var option = document.createElement('option');
                    option.value = baru['kd_marital'];
                    option.innerHTML = baru['marital'];
                    opsi.appendChild(option);
                });
                cariMaritalSetupPasien = true;
                hideLoadingAwalSetupPasien();
            }
        });
        
        apiPOST('Data_Sosial/pendidikan', {}, hasil => {
            if(hasil !== null){
                var list = hasil['data'];
                var opsi = document.getElementById('pendidikan_setup_pasien');
                var opsiAyah = document.getElementById('pendidikan_ayah_setup_pasien');
                var opsiIbu = document.getElementById('pendidikan_ibu_setup_pasien');
                var opsiPasangan = document.getElementById('pendidikan_pasangan_setup_pasien');
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
                cariPendidikanSetupPasien = true;
                hideLoadingAwalSetupPasien();
            }
        });
        
        apiPOST('Data_Sosial/pekerjaan', {}, hasil => {
            if(hasil !== null){
                var list = hasil['data'];
                var opsi = document.getElementById('pekerjaan_setup_pasien');
                var opsiAyah = document.getElementById('pekerjaan_ayah_setup_pasien');
                var opsiIbu = document.getElementById('pekerjaan_ibu_setup_pasien');
                var opsiPasangan = document.getElementById('pekerjaan_pasangan_setup_pasien');
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
                cariPekerjaanSetupPasien = true;
                hideLoadingAwalSetupPasien();
            }
        });
        
        apiPOST('Data_Sosial/propinsi', {}, hasil => {
            if(hasil !== null){
                var list = hasil['data'];
                var opsi = document.getElementById('provinsi_setup_pasien');
                var opsiKTP = document.getElementById('provinsi_ktp_setup_pasien');
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
                
                cariProvinsiSetupPasien = true;
                hideLoadingAwalSetupPasien();
            }
        });
        
        apiPOST('Data_Sosial/kotaAll', {}, hasil => {
            if(hasil !== null){
                listKabKotaSetupPasien = hasil['data'];
                hideLoadingAwalSetupPasien();
            }
        });
        
        apiPOST('Data_Sosial/kecamatanAll', {}, hasil => {
            if(hasil !== null){
                listKecamatanSetupPasien = hasil['data'];
                hideLoadingAwalSetupPasien();
            }
        });
        
        apiPOST('Data_Sosial/kelurahanAll', {}, hasil => {
            if(hasil !== null){
                listKelurahanSetupPasien = hasil['data'];
                hideLoadingAwalSetupPasien();
            }
        });
        
        apiPOST('Data_Sosial/kelompokPenjamin', {}, hasil => {
            if(hasil !== null){
                var list = hasil['data'];
                var opsi = document.getElementById('kelompok_penjamin_setup_pasien');
                list.forEach(baru => {
                    var option = document.createElement('option');
                    option.value = baru['id_kelompok_penjamin'];
                    option.innerHTML = baru['kelompok_penjamin'];
                    opsi.appendChild(option);
                });
                cariKelompokPenjaminSetupPasien = true;
                hideLoadingAwalSetupPasien();
            }
        });
        
        apiPOST('Data_Sosial/penjamin', {}, hasil => {
            if(hasil !== null){
                if(hasil !== null){
                listPenjaminSetupPasien = hasil['data'];
                hideLoadingAwalSetupPasien();
            }
            }
        });
    }
    
    function hideLoadingAwalSetupPasien(){
        if(cariAgamaSetupPasien 
            && cariGolDarahSetupPasien
            && cariMaritalSetupPasien
            && cariPendidikanSetupPasien
            && cariPekerjaanSetupPasien
            && cariProvinsiSetupPasien
            && cariKelompokPenjaminSetupPasien
            && listPenjaminSetupPasien.length > 0
            && listKabKotaSetupPasien.length > 0
            && listKecamatanSetupPasien.length > 0
            && listKelurahanSetupPasien.length > 0){
            document.getElementById('loading_setup_pasien').style.display = 'none';
        }
    }
    
    function showModalEditPasienSetupPasien(pasienBaru = true){
        if(pasienBaru){
            for (const kolom in data_pasien_setup_pasien) {
                data_pasien_setup_pasien[kolom] = '';
            }
        }
        fillIsiDataPasienSetupPasien();
        $('#modal_edit_setup_pasien').modal('show');
    }
    
    function hapusPasienSetupPasien(){
        var listPasienDihapus = $('#tabel_setup_pasien').bootstrapTable('getSelections');
        listPasienDihapus.forEach((elem) => {
            document.getElementById('loading_setup_pasien').style.display = 'block';
            var param = {
                'no_rm': elem['no_rm']
            };
            
            apiPOST('Pasien/hapusPasien', param, hasil => {
                document.getElementById('loading_setup_pasien').style.display = 'none';
                lookupListPasienSetupPasien();
            });
        });
    }
    
    function fillIsiDataPasienSetupPasien(){
        //Row 1
        document.getElementById('no_rm_setup_pasien').value = data_pasien_setup_pasien['no_rm'];
        document.getElementById('nama_setup_pasien').value = data_pasien_setup_pasien['nama'];
        document.getElementById('nik_setup_pasien').value = data_pasien_setup_pasien['nik'];
        if(data_pasien_setup_pasien['kd_agama'] == ''){
            document.getElementById('agama_setup_pasien').value = '0';
        }else{
            document.getElementById('agama_setup_pasien').value = data_pasien_setup_pasien['kd_agama'];
        }
        if(data_pasien_setup_pasien['gol_darah'] == ''){
            document.getElementById('gol_darah_setup_pasien').value = '0';
        }else{
            document.getElementById('gol_darah_setup_pasien').value = data_pasien_setup_pasien['gol_darah'];
        }
        if(data_pasien_setup_pasien['jenis_kelamin'] == ''){
            document.getElementById('jenis_kelamin_setup_pasien').value = 't';
        }else{
            document.getElementById('jenis_kelamin_setup_pasien').value = data_pasien_setup_pasien['jenis_kelamin'];
        }
        if(data_pasien_setup_pasien['status_marita'] == ''){
            document.getElementById('marital_setup_pasien').value = '2';
        }else{
            document.getElementById('marital_setup_pasien').value = data_pasien_setup_pasien['status_marita'];
        }
        document.getElementById('telepon_setup_pasien').value = data_pasien_setup_pasien['telepon'];
        if(data_pasien_setup_pasien['wni'] == ''){
            document.getElementById('wni_setup_pasien').checked = true;
        }else{
            document.getElementById('wni_setup_pasien').checked = (data_pasien_setup_pasien['wni'] == 't');
        }
        
        //Row 2
        document.getElementById('tempat_lahir_setup_pasien').value = data_pasien_setup_pasien['tempat_lahir'];
        if(data_pasien_setup_pasien['tgl_lahir'] == ''){
            document.getElementById('tgl_lahir_setup_pasien').valueAsDate = new Date();
        }else{
            document.getElementById('tgl_lahir_setup_pasien').value = data_pasien_setup_pasien['tgl_lahir'];
        }
        if(data_pasien_setup_pasien['kd_pendidikan'] == ''){
            document.getElementById('pendidikan_setup_pasien').value = '17';
        }else{
            document.getElementById('pendidikan_setup_pasien').value = data_pasien_setup_pasien['kd_pendidikan'];
        }
        if(data_pasien_setup_pasien['kd_pekerjaan'] == ''){
            document.getElementById('pekerjaan_setup_pasien').value = '96';
        }else{
            document.getElementById('pekerjaan_setup_pasien').value = data_pasien_setup_pasien['kd_pekerjaan'];
        }
        
        //Row 3 & 4
        document.getElementById('alamat_setup_pasien').value = data_pasien_setup_pasien['alamat'];
        document.getElementById('alamat_ktp_setup_pasien').value = data_pasien_setup_pasien['alamat_ktp'];
        document.getElementById('kode_pos_setup_pasien').value = data_pasien_setup_pasien['kd_pos'];
        document.getElementById('kode_pos_ktp_setup_pasien').value = data_pasien_setup_pasien['kd_pos_ktp'];
        if(data_pasien_setup_pasien['kd_kelurahan'] == ''){
            document.getElementById('provinsi_setup_pasien').value = '12';
            document.getElementById('provinsi_ktp_setup_pasien').value = '12';
            optionChildByParent(listKabKotaSetupPasien, 'provinsi_setup_pasien', 'kab_kota_setup_pasien', paramLookupKabKotaSetupPasien);
            optionChildByParent(listKabKotaSetupPasien, 'provinsi_ktp_setup_pasien', 'kab_kota_ktp_setup_pasien', paramLookupKabKotaSetupPasien);
            document.getElementById('kab_kota_setup_pasien').value = '188';
            document.getElementById('kab_kota_ktp_setup_pasien').value = '188';
            optionChildByParent(listKecamatanSetupPasien, 'kab_kota_setup_pasien', 'kecamatan_setup_pasien', paramLookupKecamatanSetupPasien);
            optionChildByParent(listKecamatanSetupPasien, 'kab_kota_ktp_setup_pasien', 'kecamatan_ktp_setup_pasien', paramLookupKecamatanSetupPasien);
            document.getElementById('kecamatan_setup_pasien').value = '1093';
            document.getElementById('kecamatan_ktp_setup_pasien').value = '1093';
            optionChildByParent(listKelurahanSetupPasien, 'kecamatan_setup_pasien', 'kelurahan_setup_pasien', paramLookupKelurahanSetupPasien);
            optionChildByParent(listKelurahanSetupPasien, 'kecamatan_ktp_setup_pasien', 'kelurahan_ktp_setup_pasien', paramLookupKelurahanSetupPasien);
            document.getElementById('kelurahan_setup_pasien').value = '3087';
            document.getElementById('kelurahan_ktp_setup_pasien').value = '3087';
        }else{
            var kdKecamatan = optionParentByChild(data_pasien_setup_pasien['kd_kelurahan'], listKelurahanSetupPasien, 'kelurahan_setup_pasien', paramLookupKelurahanSetupPasien);
            var kdKabKota = optionParentByChild(kdKecamatan, listKecamatanSetupPasien, 'kecamatan_setup_pasien', paramLookupKecamatanSetupPasien);
            var kdProvinsi = optionParentByChild(kdKabKota, listKabKotaSetupPasien, 'kab_kota_setup_pasien', paramLookupKabKotaSetupPasien);
            document.getElementById('provinsi_setup_pasien').value = kdProvinsi;
            var kdKecamatanKTP = optionParentByChild(data_pasien_setup_pasien['kd_kelurahan_ktp'], listKelurahanSetupPasien, 'kelurahan_ktp_setup_pasien', paramLookupKelurahanSetupPasien);
            var kdKabKotaKTP = optionParentByChild(kdKecamatanKTP, listKecamatanSetupPasien, 'kecamatan_ktp_setup_pasien', paramLookupKecamatanSetupPasien);
            var kdProvinsiKTP = optionParentByChild(kdKabKotaKTP, listKabKotaSetupPasien, 'kab_kota_ktp_setup_pasien', paramLookupKabKotaSetupPasien);
            document.getElementById('provinsi_ktp_setup_pasien').value = kdProvinsiKTP;
        }
        
        document.getElementById('nama_ayah_setup_pasien').value = data_pasien_setup_pasien['nama_ayah'];
        if(data_pasien_setup_pasien['kd_pendidikan_ayah'] == ''){
            document.getElementById('pendidikan_ayah_setup_pasien').value = '17';
        }else{
            document.getElementById('pendidikan_ayah_setup_pasien').value = data_pasien_setup_pasien['kd_pendidikan_ayah'];
        }
        if(data_pasien_setup_pasien['kd_pekerjaan_ayah'] == ''){
            document.getElementById('pekerjaan_ayah_setup_pasien').value = '96';
        }else{
            document.getElementById('pekerjaan_ayah_setup_pasien').value = data_pasien_setup_pasien['kd_pekerjaan_ayah'];
        }
        document.getElementById('nama_ibu_setup_pasien').value = data_pasien_setup_pasien['nama_ibu'];
        if(data_pasien_setup_pasien['kd_pendidikan_ibu'] == ''){
            document.getElementById('pendidikan_ibu_setup_pasien').value = '17';
        }else{
            document.getElementById('pendidikan_ibu_setup_pasien').value = data_pasien_setup_pasien['kd_pendidikan_ibu'];
        }
        if(data_pasien_setup_pasien['kd_pekerjaan_ibu'] == ''){
            document.getElementById('pekerjaan_ibu_setup_pasien').value = '96';
        }else{
            document.getElementById('pekerjaan_ibu_setup_pasien').value = data_pasien_setup_pasien['kd_pekerjaan_ibu'];
        }
        document.getElementById('nama_pasangan_setup_pasien').value = data_pasien_setup_pasien['suami_istri'];
        if(data_pasien_setup_pasien['kd_pendidikan_suamiistri'] == ''){
            document.getElementById('pendidikan_pasangan_setup_pasien').value = '17';
        }else{
            document.getElementById('pendidikan_pasangan_setup_pasien').value = data_pasien_setup_pasien['kd_pendidikan_suamiistri'];
        }
        if(data_pasien_setup_pasien['kd_pekerjaan_suamiistri'] == ''){
            document.getElementById('pekerjaan_pasangan_setup_pasien').value = '96';
        }else{
            document.getElementById('pekerjaan_pasangan_setup_pasien').value = data_pasien_setup_pasien['kd_pekerjaan_suamiistri'];
        }
        
        hitungUmur('tgl_lahir_setup_pasien', 'umur_setup_pasien');
    }
    
    function simpanSetupPasien(){
        document.getElementById('loading_setup_pasien').style.display = 'block';
        var param = {
            no_rm: data_pasien_setup_pasien['no_rm'],
            kd_kelurahan: document.getElementById('kelurahan_setup_pasien').value,
            kd_pendidikan: document.getElementById('pendidikan_setup_pasien').value,
            kd_pekerjaan: document.getElementById('pekerjaan_setup_pasien').value,
            kd_perusahaan: '',
            kd_agama: document.getElementById('agama_setup_pasien').value,
            nama: document.getElementById('nama_setup_pasien').value,
            tgl_lahir: document.getElementById('tgl_lahir_setup_pasien').value,
            gol_darah: document.getElementById('gol_darah_setup_pasien').value,
            jenis_kelamin: document.getElementById('jenis_kelamin_setup_pasien').value,
            status_hidup: 'true',
            status_marita: document.getElementById('marital_setup_pasien').value,
            alamat: document.getElementById('alamat_setup_pasien').value,
            kota: $("#kab_kota_setup_pasien option:selected").text(),
            telepon: document.getElementById('telepon_setup_pasien').value,
            kd_pos: document.getElementById('kode_pos_setup_pasien').value,
            jabatan: '',
            tanda_pengenal: '0',
            nik: document.getElementById('nik_setup_pasien').value,
            keterangan: '',
            kode_lama: '',
            wni: document.getElementById('wni_setup_pasien').checked,
            nama_keluarga: '',
            tempat_lahir: document.getElementById('tempat_lahir_setup_pasien').value,
            pemegang_asuransi: '',
            no_reg_lama: '',
            kd_suku: '',
            ket_simpan: '',
            handphone: document.getElementById('telepon_setup_pasien').value,
            email: '',
            nama_ayah: document.getElementById('nama_ayah_setup_pasien').value,
            nama_ibu: document.getElementById('nama_ibu_setup_pasien').value,
            suami_istri: document.getElementById('nama_pasangan_setup_pasien').value,
            alamat_ktp: document.getElementById('alamat_ktp_setup_pasien').value,
            kd_pos_ktp: document.getElementById('kode_pos_ktp_setup_pasien').value,
            kd_kelurahan_ktp: document.getElementById('kelurahan_ktp_setup_pasien').value,
            kd_pendidikan_ayah: document.getElementById('pendidikan_ayah_setup_pasien').value,
            kd_pendidikan_ibu: document.getElementById('pendidikan_ibu_setup_pasien').value,
            kd_pendidikan_suamiistri: document.getElementById('pendidikan_pasangan_setup_pasien').value,
            kd_pekerjaan_ayah: document.getElementById('pekerjaan_ayah_setup_pasien').value,
            kd_pekerjaan_ibu: document.getElementById('pekerjaan_ibu_setup_pasien').value,
            kd_pekerjaan_suamiistri: document.getElementById('pekerjaan_pasangan_setup_pasien').value
        };
        if(data_pasien_setup_pasien['no_rm'] == ''){
            apiPOST('Pasien/addPasien', param, hasil => {
                if(hasil !== null){
                    data_pasien_setup_pasien['no_rm'] = hasil['data'];
                    document.getElementById('no_rm_setup_pasien').value = hasil['data'];
                }
                document.getElementById('loading_setup_pasien').style.display = 'none';
                lookupListPasienSetupPasien();
            });
        }else{
            apiPOST('Pasien/updatePasien', param, hasil => {
                document.getElementById('loading_setup_pasien').style.display = 'none';
                lookupListPasienSetupPasien();
            });
        }
    }
    
    function changeProvinsiSetupPasien(ktp = false){
       if(ktp){
           optionChildByParent(listKabKotaSetupPasien, 'provinsi_ktp_setup_pasien', 'kab_kota_ktp_setup_pasien', paramLookupKabKotaSetupPasien);
       }else{
           optionChildByParent(listKabKotaSetupPasien, 'provinsi_setup_pasien', 'kab_kota_setup_pasien', paramLookupKabKotaSetupPasien);
       }
       changeKabKotaSetupPasien(ktp);     
    }
    
    function changeKabKotaSetupPasien(ktp = false){
       if(ktp){
           optionChildByParent(listKecamatanSetupPasien, 'kab_kota_ktp_setup_pasien', 'kecamatan_ktp_setup_pasien', paramLookupKecamatanSetupPasien);
       }else{
           optionChildByParent(listKecamatanSetupPasien, 'kab_kota_setup_pasien', 'kecamatan_setup_pasien', paramLookupKecamatanSetupPasien);
       }
       changeKecamatanSetupPasien(ktp);     
    }
    
    function changeKecamatanSetupPasien(ktp = false){
       if(ktp){
           optionChildByParent(listKelurahanSetupPasien, 'kecamatan_ktp_setup_pasien', 'kelurahan_ktp_setup_pasien', paramLookupKelurahanSetupPasien);
       }else{
           optionChildByParent(listKelurahanSetupPasien, 'kecamatan_setup_pasien', 'kelurahan_setup_pasien', paramLookupKelurahanSetupPasien);    
       }
    }
    
    function lookupListPasienSetupPasienTextField(event){
        if (event.keyCode == 13) {
            lookupListPasienSetupPasien();
        }
    }

    function lookupListPasienSetupPasien(){
        document.getElementById('loading_setup_pasien').style.display = 'block';
        $('#tabel_setup_pasien').bootstrapTable('removeAll');
        var param = {
            no_rm: $("#lookup_no_rm_setup_pasien").val().toUpperCase(),
            nama: $("#lookup_nama_setup_pasien").val().toUpperCase(),
            nik: $("#lookup_nik_setup_pasien").val().toUpperCase()
        };
        
        apiPOST('Gawat_Darurat/lookupPendaftaranPasien', param, hasil => {
            if(hasil !== null){
                $('#tabel_setup_pasien').bootstrapTable('append', hasil['data']);
            }
            document.getElementById('loading_setup_pasien').style.display = 'none';
        });
    }
    
    function showModalEditPenjaminPasienSetupPasien(){
        tempRM = '';
        var listPasienDiedit = $('#tabel_setup_pasien').bootstrapTable('getSelections');
        listPasienDiedit.forEach((elem) => {
            refreshPenjaminSetupPasien(elem['no_rm']);
        }); 
    }
    
    function changeKelompokPenjaminSetupPasien(){
       optionChildByParent(listPenjaminSetupPasien, 'kelompok_penjamin_setup_pasien', 'penjamin_setup_pasien', paramLookupPenjaminSetupPasien); 
    }
    
    function simpanPenjaminSetupPasien(){
        var param = {
            'no_rm': tempRM,
            'id_penjamin': document.getElementById('penjamin_setup_pasien').value,
            'no_kartu': document.getElementById('noka_setup_pasien').value
        };

        apiPOST('Pasien/updatePenjamin', param, hasil => {
            if(hasil !== null){
                refreshPenjaminSetupPasien(tempRM);
            }
        });
    }
    
    function hapusPenjaminSetupPasien(){
        var listPenjaminDiedit = $('#tabel_penjamin_setup_pasien').bootstrapTable('getSelections');
        listPenjaminDiedit.forEach((elem) => {
            var param = {
                'no_rm': tempRM,
                'id_penjamin': elem['id_penjamin']
            };

            apiPOST('Pasien/hapusPenjamin', param, hasil => {
                if(hasil !== null){
                    refreshPenjaminSetupPasien(tempRM);
                }
            });
        }); 
    }
    
    function refreshPenjaminSetupPasien(no_rm){
        document.getElementById('loading_setup_pasien').style.display = 'block';
        $('#tabel_penjamin_setup_pasien').bootstrapTable('removeAll');
        
        var param = {
            'no_rm': no_rm
        };

        apiPOST('Pasien/listPenjamin', param, hasil => {
            if(hasil !== null){
                tempRM = no_rm;
                $('#tabel_penjamin_setup_pasien').bootstrapTable('append', hasil['data']);
                $('#modal_edit_penjamin_setup_pasien').modal('show'); 
                var idKelompokPenjamin = optionParentByChild('1', listPenjaminSetupPasien, 'penjamin_setup_pasien', paramLookupPenjaminSetupPasien);
                document.getElementById('kelompok_penjamin_setup_pasien').value = idKelompokPenjamin;
                document.getElementById('noka_setup_pasien').value = '';
            }

            document.getElementById('loading_setup_pasien').style.display = 'none';
        });
    }
</script>