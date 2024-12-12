<?php
  $data = json_decode($_GET['data']);
  
  $id_transaksi = str_replace('"','', json_encode($data->veresepRWJ_APT_id_transaksi));
  $id_order     = str_replace('"','', json_encode($data->veresepRWJ_APT_id_order));
  $idkunj       = str_replace('"','', json_encode($data->veresepRWJ_APT_id_kunj));
  $tglkunj      = str_replace('"','', json_encode($data->veresepRWJ_APT_tgl_kunj));
  //$tglkunj      = date_format(date_create($tglkunjungan), 'd-M-Y'); //FORMAT TGL 02-Feb-2023
  $tgl_ord      = str_replace('"','', json_encode($data->veresepRWJ_APT_tgl_ord));
  $norm         = str_replace('"','', json_encode($data->veresepRWJ_APT_no_rm));
  $nmapasien    = str_replace('"','', json_encode($data->veresepRWJ_APT_nama));
  $umur         = str_replace('"','', json_encode($data->veresepRWJ_APT_umur));
  //$penjamin     = str_replace('"','', json_encode($data->veresepRWJ_APT_penjamin));
  //$sep          = str_replace('"','', json_encode($data->veresepRWJ_APT_sep));
  $telp         = str_replace('"','', json_encode($data->veresepRWJ_APT_telp));
  $idunit       = str_replace('"','', json_encode($data->veresepRWJ_APT_idunit));
  $unit         = str_replace('"','', json_encode($data->veresepRWJ_APT_unit));
  $dokter       = str_replace('"','', json_encode($data->veresepRWJ_APT_dokter));
    
?>
<section class="content pb-0">
  <div class="container-fluid h-100">
    <div class="row p-1">
      <div class="col-md-3 col-sm-6 col-12 p-1">
        <div class="info-box mb-0">
          <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="70">Tgl. Order.</td>
              <td>:</td>
              <td><input type="date" class="form-control form-control-xs" id="eresepRWJAPT_vi_tglorder"></td>
            </tr>
            <tr>
              <td width="70">Tgl. Resep.</td>
              <td>:</td>
              <td><input type="date" class="form-control form-control-xs" id="eresepRWJAPT_vi_tglresep"></td>
            </tr>
            <tr>
              <td>No. Resep</td>
              <td>:</td>
              <td>
                <div class="input-group col-sm-12 p-0">
                  <input type="text" class="form-control form-control-xs" id="eresepRWJAPT_vi_noresep" disabled>
                  <div class="input-group-prepend">
                    <button type="button" class="btn btn-outline-danger btn-xs" onclick="eresepRWJAPT_hapusresepRWJAPT()" id="eresepRWJAPT_hapusresepRWJAPT"><i class="fa fa-trash"></i></button>
                  </div>
                </div>
              </td>
            </tr> 
            <tr>
              <td>Dokter</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="eresepRWJAPT_vi_dokter" disabled></td>
            </tr>
          </table>
        </div>
      </div>
      
      <div class="col-md-3 col-sm-6 col-12 p-1">
        <div class="info-box mb-0">
          <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td>Tgl. Kunj.</td>
              <td>:</td>
              <td><input type="date" class="form-control form-control-xs" id="eresepRWJAPT_vi_tglkunj" disabled></td>
            </tr>
            <tr>
              <td width="70">No. RM</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="eresepRWJAPT_vi_norm"></td>
            </tr>
            <tr>
              <td>Nama</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="eresepRWJAPT_vi_nama" disabled></td>
            </tr>
            <tr>
              <td>Umur</td> 
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="eresepRWJAPT_vi_umur" disabled></td>
            </tr>              
          </table>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-12 p-1">
        <div class="info-box mb-0">
          <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td>Penjamin</td>
              <td>:</td>
              <td>
                <select class="form-control form-control-xs" id="eresepRWJAPT_vi_penjamin" name="eresepRWJAPT_vi_penjamin" onchange="changePenjamin_RWJAPT();"></select>
              <!--   <input type="text" class="form-control form-control-xs" id="eresepRWJAPT_vi_penjamin" disabled> -->
              </td>
            </tr>
            <tr>
              <td width="70">SEP</td>
              <td>:</td>
              <td>
                <!-- <input type="text" class="form-control form-control-xs" id="eresepRWJAPT_vi_sep" disabled> -->
                <select class="form-control form-control-xs" id="eresepRWJAPT_vi_sep" name="eresepRWJAPT_vi_sep" disabled>
              </td>
            </tr>
            <tr>
              <td>Telp</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="eresepRWJAPT_vi_telp" disabled></td>
            </tr>
            <tr>
              <td>Unit</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="eresepRWJAPT_vi_unit" disabled></td>
            </tr>
          </table>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-12 p-1">
        <div class="info-box mb-0">
          <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <!-- <td width="100">Resep Langsung</td>
              <td>:</td>
              <td width="20"><input type="checkbox" id="eresepRWJAPT_vi_rseplangsung"></td> -->
              <td class="pl-2 pt-1" colspan="3">
                <div>
                  <input type="checkbox" id="eresepRWJAPT_vi_rseplangsung" name="eresepRWJAPT_vi_rseplangsung" onclick="showModalPasienKunjunganLangsung(eresepRWJAPT_kunjLangsung);"/>
                  <label for="eresepRWJAPT_vi_rseplangsung">Resep Langsung</label>
                </div>
              </td>
            </tr>
            <tr>
              <td>Cat. Alergi</td>
              <td>:</td>
              <td colspan="2"><textarea class="form-control pt-0 pl-1" rows="3" id="eresepRWJAPT_vi_cat_alergi" style="height:85px;"></textarea></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <div class="card card-row">
      <div class="overlay-wrapper" id="loading_modal_eresepRWJAPT">
        <div class="overlay dark">
          <i class="fas fa-3x fa-sync-alt fa-spin"></i>
        </div>
      </div>

      <div class="card-header p-1 darkgrey-custom">
        <!-- <h6 class="hr6-custom"><i class="fas fa-heartbeat"></i> Resep Rawat Jalan / Gawat Darurat</h6> -->
        <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="eresepRWJAPT_modaldaftarobat()" id="eresepRWJAPT_btn_daftarobat"><i class="fa fa-plus"></i> Tambah Obat</button>
        <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="eresepRWJAPT_simpanobatin()" id="eresepRWJAPT_btn_simpanobat"><i class="fa fa-save"></i> Simpan</button>
        <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="eresepRWJAPTAPT_prevObat()" id="eresepRWJAPT_btn_prevobat">
          <i class="fa fa-eye"></i> Preview Obat</button>
        <div class="btn-group">
          <button type="button" class="btn bg-gradient-secondary btn-xs"><i class="fa fa-print"></i> Cetak</button>
          <button type="button" class="btn bg-gradient-secondary btn-xs dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
            <span class="sr-only"></span>
          </button>
          <div class="dropdown-menu" role="menu" style="">
            <a class="dropdown-item" href="#"><span><i class="fa fa-print"></i> Cetak Billing</span></a>
            <a class="dropdown-item" href="#"><span><i class="fa fa-print"></i> Cetak Kwitansi</span></a>
            <a class="dropdown-item" href="#"><span><i class="fa fa-print"></i> Cetak Etiket</span></a>
          </div>
        </div>
        <button type="button" class="btn btn-warning btn-xs" onclick="eresepRWJAPTAPT_transferObat()" id="eresepRWJAPT_btn_transferobat"><i class="fa fa-magic"></i> Transfer</button>
        <button type="button" class="btn btn-outline-danger btn-xs" onclick="eresepRWJAPTAPT_kembalikeawal()"><i class="fa fa-arrow-left"></i> Kembali</button>
        <button type="button" class="btn btn-info btn-xs" onclick="eresepRWJAPT_refresh()"><i class="fa fa-sync-alt fa-spin"></i> Refresh Data</button>
        <input type="number" class="form-control form-control-xs" id="eresepRWJAPT_penentu_resepobat" value="0" disabled hidden>

      </div>
      <div class="modal-body p-1">
        <div class="card-body p-0">
          <ul class="nav nav-tabs" id="eresepRWJAPT_custom-content-above-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="pill" href="#eresepRWJAPT_obatjadi" role="tab" aria-selected="true" onclick="tab_eresepRWJAPT_obatjadi();">Obat Jadi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="pill" href="#eresepRWJAPT_obatracik" role="tab" aria-selected="true" onclick="tab_eresepRWJAPT_obatracik();">Obat Racik</a>
            </li>
          </ul>

          <div class="tab-content" id="eresepRWJAPT_custom-content-above-tabContent">
            <div class="tab-pane p-0 fade active show" id="eresepRWJAPT_obatjadi" role="tabpanel">
              <div class="col-sm-12 p-1" style="max-height: 238px; overflow-x: hidden;">
                <div class="row mb-1" id="eresepRWJAPT_inputan_obat_jadi">
                  <div class="input-group col-sm-3">
                    <input type="text" class="form-control form-control-xs" id="eresepRWJAPT_obatjadi_urut" disabled hidden>
                    <input type="text" class="form-control form-control-xs" id="eresepRWJAPT_obatjadi_kdobat" disabled hidden>
                    <div class="input-group-prepend">
                      <span class="input-group-text form-control-xs">Nama</span>
                    </div>
                    <input type="search" class="form-control form-control-xs" id="eresepRWJAPT_obatjadi_nm" autocomplete="false" disabled>
                  </div>
                  <div class="col-sm-2">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text form-control-xs">Banyak</span>
                      </div>              
                      <input type="number" class="form-control form-control-xs" id="eresepRWJAPT_obatjadi_qty">
                    </div>
                  </div>
                  <div class="input-group col-sm-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text form-control-xs">Signa</span>
                    </div>
                    <input type="search" class="form-control form-control-xs" id="eresepRWJAPT_obatjadi_signa">
                  </div>
                  <div class="input-group col-sm-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text form-control-xs">Ket.</span>
                    </div>
                    <input type="text" class="form-control form-control-xs" id="eresepRWJAPT_obatjadi_ket">
                    <div class="input-group-prepend">
                      <button type="button" class="btn btn-primary btn-xs" id="eresepRWJAPT_btn_check_obatjadi"><i class="fa fa-check"></i></button>
                      <button type="button" class="btn btn-outline-primary btn-xs" onclick="eresepRWJAPT_kosongObatJadi()"><i class="fa fa-file"></i> Baru</button>
                    </div>
                  </div>
                  
                </div> 
                <table border="0" cellpadding="0" cellspacing="0" id="eresepRWJAPTtable_obatjadi" class="table table-striped table-sm choose">
                  <thead>
                    <tr>
                      <th class="pl-0" width="30" style="text-align:center;">#</th>
                      <th width="100"></th>
                      <th width="60">Kd. Obat</th>
                      <th>Nama Obat</th>
                      <th class="pl-0" width="70" style="text-align:center;">Qty</th>
                      <th width="250">Signa</th>
                      <th class="pl-0" width="100" style="text-align:center;">Harga</th>
                      <th width="100">Expired</th>
                      <th>Catatan</th>
                      <!-- <th width="100">Hrga</th>
                      <th width="100">Jumlah</th> -->
                      <!-- <th width="70">Satuan</th> -->
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table> 
              </div>
            </div>
            <div class="tab-pane p-0 fade" id="eresepRWJAPT_obatracik" role="tabpanel">
              <div class="col-sm-12 p-1">
                <div class="mb-1" id="eresepRWJAPT_inputan_obat_racik">
                  <div class="row" id="eresepRWJAPT_inputan_obat_racik1">
                    <div class="input-group col-sm-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text form-control-xs">Racikan</span>
                      </div>
                      <input type="search" class="form-control form-control-xs" placeholder="Ketikkan Nama Racikan" id="eresepRWJAPT_nmaracikan">
                    </div>
                    <div class="input-group col-sm-2">
                      <div class="input-group-prepend">
                        <span class="input-group-text form-control-xs">Banyak</span>
                      </div>
                      <input type="number" class="form-control form-control-xs" id="eresepRWJAPT_bnykracikan">
                    </div> 
                    <div class="input-group col-sm-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text form-control-xs">Signa</span>
                      </div>
                      <input type="search" class="form-control form-control-xs" id="eresepRWJAPT_signaracikan">
                    </div>
                    <div class="input-group col-sm-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text form-control-xs">Ket.</span>
                      </div>
                      <input type="text" class="form-control form-control-xs" id="eresepRWJAPT_ketracikan">
                      <div class="input-group-prepend">
                        <button type="button" class="btn btn-outline-primary btn-xs" onclick="eresepRWJAPT_mulaiawalRacikan()"><i class="fa fa-file"></i> Baru</button>
                      </div>
                    </div>

                  </div>
                  <hr class="mt-2 mb-2" width="95%">
                  <div class="row" id="eresepRWJAPT_inputan_obat_racik2">
                    <div class="col-sm-auto">
                      <button type="button" class="btn btn-danger btn-xs" id="eresepRWJAPT_infojenis_racikan" style="font-weight: bold;"></button>
                    </div>
                    <div class="input-group col-sm-3">
                      <input type="text" class="form-control form-control-xs" id="eresepRWJAPT_obat_racik_kdobat" disabled hidden>
                      <div class="input-group-prepend">
                        <span class="input-group-text form-control-xs">Nama</span>
                      </div>
                      <input type="text" class="form-control form-control-xs" id="eresepRWJAPT_obat_racik_nmaobat" disabled>
                    </div>
                    <div class="col-sm-2">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text form-control-xs">Dosis</span>
                        </div>
                        <input type="number" class="form-control form-control-xs" id="eresepRWJAPT_obat_racik_dosis">
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text form-control-xs">Banyak</span>
                        </div>
                        <input type="number" class="form-control form-control-xs" id="eresepRWJAPT_obat_racik_qty">
                      </div>
                    </div>
                    <div class="input-group col-sm-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text form-control-xs">Ket.</span>
                      </div>
                      <input type="text" class="form-control form-control-xs" id="eresepRWJAPT_obat_racik_ket">
                      <div class="input-group-prepend">
                        <button type="button" class="btn btn-outline-primary btn-xs" id="eresepRWJAPT_btn_check_obatracik"><i class="fa fa-check"></i> Pilih</button>
                      </div>
                    </div>
                  </div>

                </div>                  
                <div class="row p-1">
                  <div class="col-sm-3" style="max-height: 181px; overflow: hidden;">
                    <table border="0" cellpadding="0" cellspacing="0" id="eresepRWJAPTtable_obatracik_jenisracikan" class="table table-striped table-sm choose">
                    <thead>
                      <tr>
                        <th class="pl-0" width="30" style="text-align:center;">#</th>
                        <th width="50"></th>
                        <!-- <th width="50">Kode</th> -->
                        <th>Racikan</th>
                        <!-- <th width="50">Banyak</th>
                        <th width="100">Signa</th>
                        <th width="100">Keterangan</th> -->
                      </tr>
                    </thead>
                    <tbody></tbody>
                    </table>
                  </div>
                  <div class="col-sm-9" style="max-height: 181px; overflow-x: hidden;">
                    <table border="0" cellpadding="0" cellspacing="0" id="eresepRWJAPTtable_obatracik" class="table table-striped table-sm choose">
                    <thead>
                      <tr>
                        <th class="pl-0" width="30" style="text-align:center;">#</th>
                        <th width="50"></th>
                        <th width="60">Kd. Obat</th>
                        <th>Nama Obat</th>
                        <th width="60">Dosis</th>
                        <th class="pl-0" width="60" style="text-align:center;">Qty</th>
                        <th class="pl-0" width="80" style="text-align:center;">Harga</th>
                        <th width="80">Expired</th>
                        <th>Keterangan</th>
                      </tr>
                    </thead>
                    <tbody></tbody>
                    </table> 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="card-footer p-1">
        <div class="input-group" style="justify-content: right; font-weight: bold;">
          <h4>Rp.&nbsp;</h4>
          <h4 id="veresepRWJAPT_hargaTotal" name="veresepRWJAPT_hargaTotal"></h4>
        </div>
      </div>
      <input type="text" value="0" id="eresepRWJAPT_hargaTotal" name="eresepRWJAPT_hargaTotal" disabled hidden>
    </div>
  </div>
</section>

<script type="text/javascript">
$('.eresepRWJAPT_content').show();
//$('#loading_modal_eresepRWJAPT').hide();

var id_trans   = "<?php echo $id_transaksi; ?>";
var id_order   = "<?php echo $id_order; ?>";
var idkunj     = "<?php echo $idkunj; ?>";
var tglkunj    = "<?php echo $tglkunj; ?>";
var tgl_ord    = "<?php echo $tgl_ord; ?>";
var norm       = "<?php echo $norm; ?>";
var nmapasien  = "<?php echo $nmapasien; ?>";
var umur       = "<?php echo $umur; ?>";
var telp       = "<?php echo $telp; ?>";
var idunit     = "<?php echo $idunit; ?>";
var unit       = "<?php echo $unit; ?>";
var dokter     = "<?php echo $dokter; ?>";
var eresepRWJAPT_kd_signaObatJadi;
var eresepRWJAPT_kd_signaObatRacik;
var eresepRWJAPT_kd_JenisRacikan;
var liveresepRWJAPT_check = '0';
var nama_racikan;

var nosjp = [];
var paramIdPenjaminnosjp = ['id_penjamin', 'no_sjp', 'no_sjp'];

document.getElementById('eresepRWJAPT_vi_tglorder').value   = tgl_ord;
document.getElementById('eresepRWJAPT_vi_tglresep').value   = nowday;
document.getElementById('eresepRWJAPT_vi_tglkunj').value    = tglkunj;
document.getElementById('eresepRWJAPT_vi_noresep').value    = '';
document.getElementById('eresepRWJAPT_vi_dokter').value     = dokter;
document.getElementById('eresepRWJAPT_vi_norm').value       = norm;
document.getElementById('eresepRWJAPT_vi_nama').value       = nmapasien;
document.getElementById('eresepRWJAPT_vi_umur').value       = Umur(umur);
//document.getElementById('eresepRWJAPT_vi_penjamin').value   = penjamin;
document.getElementById('eresepRWJAPT_vi_telp').value       = telp;
document.getElementById('eresepRWJAPT_vi_unit').value       = unit;

var eresepRWJAPT_vi_tglresep  = "eresepRWJAPT_vi_tglresep";
var eresepRWJAPT_vi_tglkunj   = "eresepRWJAPT_vi_tglkunj";
max_date(eresepRWJAPT_vi_tglresep);
max_date(eresepRWJAPT_vi_tglkunj);
getSignadanRacik_RWJAPT();
eresepRWJAPT_ObatJadi();
eresepRWJAPT_ObatRacik();
getPenjamin_pasien_RWJAPT();
getData_OrderEresepRWJAPT();

function getPenjamin_pasien_RWJAPT() {
  var param = {
    id_transaksi : id_trans
  }
  apiPOST('Apotek/getPenjamin_pasien_RWJAPT', param, hasil => {
    var data = hasil['data'];
    if(hasil !== null){
        nosjp = hasil['data'];
        var opsi = document.getElementById('eresepRWJAPT_vi_penjamin');
        nosjp.forEach(baru => {
            var option = document.createElement('option');
            option.value = baru['id_penjamin'];
            option.innerHTML = baru['nama_penjamin'];
            opsi.appendChild(option);
        });
        if (nosjp.length > 1){
          var penjamin = document.getElementById("eresepRWJAPT_vi_penjamin"); 
          penjamin.focus();
          toastr.info("Pasien memiliki 2 Penjamin!!");
        }
    }
    changePenjamin_RWJAPT();
  });
}

function changePenjamin_RWJAPT(){ 
  optionChildByParent(nosjp, 'eresepRWJAPT_vi_penjamin', 'eresepRWJAPT_vi_sep', paramIdPenjaminnosjp);   
}

function getSignadanRacik_RWJAPT(){
  eresepRWJAPT_kd_signaObatJadi = new AutoComplete("eresepRWJAPT_obatjadi_signa");
  eresepRWJAPT_kd_signaObatRacik = new AutoComplete("eresepRWJAPT_signaracikan");
  apiPOST('Apotek/getSigna', null, hasil => {
    if (hasil !== null) {
      var list = hasil['data'];
      list.forEach(baru => {
        eresepRWJAPT_kd_signaObatJadi.addData(baru['id_signa'], baru['signa']);
        eresepRWJAPT_kd_signaObatRacik.addData(baru['id_signa'], baru['signa']);
      });
    }
  });

  eresepRWJAPT_kd_JenisRacikan = new AutoComplete("eresepRWJAPT_nmaracikan");
  apiPOST('Apotek/getJnsRacikan_eresep', null, hasil => {
    if (hasil !== null) {
      var list = hasil['data'];
      list.forEach(baru => {
        eresepRWJAPT_kd_JenisRacikan.addData(baru['id_jns_racik'], baru['jns_racik']);
      });
    }
  });

  const liveresepRWJAPT = document.querySelector("#eresepRWJAPT_vi_rseplangsung");
  liveresepRWJAPT.addEventListener("change", () => {
    if (liveresepRWJAPT.checked) {
      liveresepRWJAPT_check = '1';
    } else {
      liveresepRWJAPT_check = '0';
    }
  });
}

function getData_OrderEresepRWJAPT(){
  $('#loading_modal_eresepRWJAPT').show();
  // var today0 = new Date();
  // var time0 = today0.getHours() + ":" + today0.getMinutes() + ":" + today0.getSeconds();
  // console.log(time0);
  
  var param = {
    idresep   : id_order,
    id_kunj   : idkunj,
    tgl_kunj  : tglkunj,
    tglorder  : tgl_ord,
  };

  if ((id_order != '0')||(id_order != null)){
    document.getElementById("veresepRWJAPT_hargaTotal").innerHTML  = '0';
    document.getElementById("eresepRWJAPT_hargaTotal").value = '0';

    apiPOST('Apotek/getData_OrderEresepRWJAPT', param, hasil => {
      sessionStorage.clear();
      if (hasil !== null) {
        $('#loading_modal_eresepRWJAPT').hide();
        if (hasil['code'] == '200'){
          var data        = hasil['data'];
          var ObatJadi    = hasil['ObatJadi'];
          var GroupRacik  = hasil['GroupRacik'];
          var ObatRacik   = hasil['ObatRacik'];

          $('#eresepRWJAPTtable_obatjadi tbody').html('');
          $('#eresepRWJAPTtable_obatracik_jenisracikan tbody').html('');
          $('#eresepRWJAPTtable_obatracik tbody').html('');
          
          if ((ObatJadi.length == 0)&&(GroupRacik.length == 0)){
            toastr.info("Belum Ada Inputan Obat Jadi ataupun Obat Racik!!");
          }

          for (var o = 0; o < ObatJadi.length; o++) {
            var kd_obt    = ObatJadi[o].kd_prd;
            var nm_obat   = ObatJadi[o].nama_obat+' || '+ObatJadi[o].kd_satuan;
            var qty       = ObatJadi[o].jumlah;
            var id_signa  = ObatJadi[o].id_signa;
            var signa     = ObatJadi[o].signa;
            var ket       = ObatJadi[o].ket;

            eresepRWJAPT_dataobatjdi(kd_obt, nm_obat, qty, id_signa, signa, ket);
          }

            if (GroupRacik.length > 0){

              groupracikan = [];
              for (var g = 0; g < GroupRacik.length; g++) {
                var nama_racikan  = GroupRacik[g].jns_racikan;
                var nma_racikan   = GroupRacik[g].jns_racikan;
                var byk_racikan   = GroupRacik[g].qty_racik;
                var ket_racikan   = GroupRacik[g].ket_racik;
                var id_sig_rac    = GroupRacik[g].id_signa;
                var sig_racikan   = GroupRacik[g].signa;
                var x             = GroupRacik[g].jns_racikan;
                groupracikan[g] = GroupRacik[g].jns_racikan;
                
                var Nomor = $('#eresepRWJAPTtable_obatracik_jenisracikan tbody tr').length + 1;
                var Baris = "<tr>";
                   Baris += "<td class='pl-0' style='text-align:center;'>"+Nomor+"</td>";
                   Baris += '<td style="display: flex;"><button type="button" class="btn btn-xs btn-warning" title="Tampilkan '+ nama_racikan+'" onclick="eresepRWJAPT_tampilkan_jenisracik('+"'"+Nomor+"','"+nma_racikan+"','"+byk_racikan+"','"+sig_racikan+"','"+ket_racikan+"','"+x+"'"+')" style="width: 100%;"><i class="fa fa-arrow-up"></i></button>&nbsp;<button type="button" class="btn btn-xs btn-danger" onclick="eresepRWJAPT_hapus_jenisracik(this, '+"'"+Nomor+"','"+nma_racikan+"','"+byk_racikan+"','"+sig_racikan+"','"+ket_racikan+"','"+nama_racikan+"'"+')" style="width: 100%;"><i class="fa fa-times"></i></button></td>';
                   Baris += "<td hidden>"+Nomor+"</td>";
                   Baris += "<td>";
                   Baris += "<input type='text' class='form-control form-control-xxs' name='eresepRWJAPT_jenisracikan[]' value='" + nama_racikan +"' disabled>";
                   Baris += "</td>";
                   Baris += "<td hidden><input type='text' class='form-control form-control-xxs' name='eresepRWJAPT_byk_racikan[]' value='" + byk_racikan +"' disabled></td>";
                   Baris += "<td hidden><input type='text' class='form-control form-control-xxs' name='eresepRWJAPT_idsig_racikan[]' value='" + id_sig_rac +"' disabled></td>";
                   Baris += "<td hidden><input type='text' class='form-control form-control-xxs' name='eresepRWJAPT_sig_racikan[]' value='" + sig_racikan +"' disabled></td>";
                   Baris += "<td hidden><input type='text' class='form-control form-control-xxs' name='eresepRWJAPT_ket_racikan[]' value='" + ket_racikan +"' disabled></td>";
                   Baris += "</tr>";
                
                $('#eresepRWJAPTtable_obatracik_jenisracikan tbody').append(Baris);
                sessionStorage['RACIK_'+nama_racikan] = '[{"racikan":"'+nama_racikan+'","qty":"'+byk_racikan+'","idsigna":"'+id_sig_rac+'","signa":"'+sig_racikan+'","ket":"'+ket_racikan+'"}]';
              }

              var group_racikan = groupracikan.filter(onlyUnique);
              const group_racikandriOBAT = groupBy(ObatRacik, "jns_racikan");
                        
              for (let a = 0; a < group_racikan.length; a++) {
                var nm_kelompok = group_racikan[a];
                const params    = []; 
                for (let i = 0; i < group_racikandriOBAT[nm_kelompok].length; i++) {
                  var kd_obt    = group_racikandriOBAT[nm_kelompok][i].kd_prd;
                  var nm_obat   = group_racikandriOBAT[nm_kelompok][i].nama_obat;
                  var dosis     = group_racikandriOBAT[nm_kelompok][i].dosis;
                  var qty       = group_racikandriOBAT[nm_kelompok][i].jumlah;
                  var ket       = group_racikandriOBAT[nm_kelompok][i].ket;
                  var jns_racik = group_racikandriOBAT[nm_kelompok][i].jns_racikan;
                  var id_signa  = group_racikandriOBAT[nm_kelompok][i].id_signa;
                  
                  var x = {};
                  var no = i + 1;
                      x.urut    = no;
                      x.kd_obt  = kd_obt;
                      x.nm_prd  = nm_obat;
                      if (dosis !== ''){
                        x.dosis = dosis;
                      }else{
                        x.dosis = "0";
                      }
                      x.qty     = qty;
                      x.ket     = ket;
                      x.jnsracik= jns_racik;
                      params.push(x);

                  sessionStorage[jns_racik] = JSON.stringify(params);
                  //PROSES PENJUMLAHAN HARGA OBAT
                  var totalx = document.getElementById("eresepRWJAPT_hargaTotal").value;
                  total = parseInt(totalx) + parseInt(qty);
                  document.getElementById("eresepRWJAPT_hargaTotal").value = total;
                  
                  document.getElementById("veresepRWJAPT_hargaTotal").innerHTML = format_ribuan(total);
                }
              }
            }
        
        }else if (hasil['code'] == '202'){
          var noresep   = hasil['noresep'];
          var tglresep  = hasil['tglresep'];
          getData_EresepRWJAPT(noresep, tglresep);
        }else if (hasil['code'] == '501'){
          document.getElementById("eresepRWJAPT_btn_daftarobat").disabled     = true;
          document.getElementById("eresepRWJAPT_btn_simpanobat").disabled     = true;
          document.getElementById("eresepRWJAPT_btn_transferobat").disabled   = true;
          toastr.error("Order Resep Sudah Terlayani!!");
        }else{
          toastr.error("Belum Ada Order Resep Hari Ini.");
        }
      }
    }).then(function(){
      //$('#loading_modal_eresepRWJAPT').hide();
      
      // var today = new Date();
      // var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
      // console.log(time);
    });
  }else{
    toastr.error('Nomor Order Tidak Diketahui...!!');
  }
}

function getData_EresepRWJAPT(noresep, tglresep){
  $('#loading_modal_eresepRWJAPT').show();
  document.getElementById('eresepRWJAPT_vi_noresep').value = noresep;
  document.getElementById('eresepRWJAPT_vi_tglresep').value = tglresep;
  var param = {
    noresep   : noresep,
    id_kunj   : idkunj,
    id_unit   : idunit,
    norm      : norm,
    tgl_kunj  : tglkunj,
    tgl_resep : tglresep,
    vi        : 'eresepRWJAPT'
  };

  if ((noresep != '0')||(noresep != null)){
    apiPOST('Apotek/getData_EresepRWJAPT', param, hasil => {
      sessionStorage.clear();
      if (hasil !== null) {
        //$('#loading_modal_eresepRWJAPT').hide();
        if (hasil['code'] == '200'){
          var data        = hasil['data'];
          var ObatJadi    = hasil['ObatJadi'];
          var GroupRacik  = hasil['GroupRacik'];
          var ObatRacik   = hasil['ObatRacik'];

          $('#eresepRWJAPTtable_obatjadi tbody').html('');
          $('#eresepRWJAPTtable_obatracik_jenisracikan tbody').html('');
          $('#eresepRWJAPTtable_obatracik tbody').html('');
          
          if ((ObatJadi.length == 0)&&(GroupRacik.length == 0)){
            toastr.info("Belum Ada Inputan Obat Jadi ataupun Obat Racik!!");
          }

          for (var o = 0; o < ObatJadi.length; o++) {
            var kd_obt    = ObatJadi[o].kd_prd;
            var nm_obat   = ObatJadi[o].nama_obat+' || '+ObatJadi[o].kd_satuan;
            var qty       = ObatJadi[o].jumlah;
            var id_signa  = ObatJadi[o].id_signa;
            var signa     = ObatJadi[o].signa;
            var ket       = ObatJadi[o].ket;

            eresepRWJAPT_dataobatjdi(kd_obt, nm_obat, qty, id_signa, signa, ket);
          }

            if (GroupRacik.length > 0){

              groupracikan = [];
              for (var g = 0; g < GroupRacik.length; g++) {
                var nama_racikan  = GroupRacik[g].jns_racikan;
                var nma_racikan   = GroupRacik[g].jns_racikan;
                var byk_racikan   = GroupRacik[g].qty_racik;
                var ket_racikan   = GroupRacik[g].ket_racik;
                var id_sig_rac    = GroupRacik[g].id_signa;
                var sig_racikan   = GroupRacik[g].signa;
                var x             = GroupRacik[g].jns_racikan;
                groupracikan[g] = GroupRacik[g].jns_racikan;
                
                var Nomor = $('#eresepRWJAPTtable_obatracik_jenisracikan tbody tr').length + 1;
                var Baris = "<tr>";
                   Baris += "<td class='pl-0' style='text-align:center;'>"+Nomor+"</td>";
                   Baris += '<td style="display: flex;"><button type="button" class="btn btn-xs btn-warning" title="Tampilkan '+ nama_racikan+'" onclick="eresepRWJAPT_tampilkan_jenisracik('+"'"+Nomor+"','"+nma_racikan+"','"+byk_racikan+"','"+sig_racikan+"','"+ket_racikan+"','"+x+"'"+')" style="width: 100%;"><i class="fa fa-arrow-up"></i></button>&nbsp;<button type="button" class="btn btn-xs btn-danger" onclick="eresepRWJAPT_hapus_jenisracik(this, '+"'"+Nomor+"','"+nma_racikan+"','"+byk_racikan+"','"+sig_racikan+"','"+ket_racikan+"','"+nama_racikan+"'"+')" style="width: 100%;"><i class="fa fa-times"></i></button></td>';
                   Baris += "<td hidden>"+Nomor+"</td>";
                   Baris += "<td>";
                   Baris += "<input type='text' class='form-control form-control-xxs' name='eresepRWJAPT_jenisracikan[]' value='" + nama_racikan +"' disabled>";
                   Baris += "</td>";
                   Baris += "<td hidden><input type='text' class='form-control form-control-xxs' name='eresepRWJAPT_byk_racikan[]' value='" + byk_racikan +"' disabled></td>";
                   Baris += "<td hidden><input type='text' class='form-control form-control-xxs' name='eresepRWJAPT_idsig_racikan[]' value='" + id_sig_rac +"' disabled></td>";
                   Baris += "<td hidden><input type='text' class='form-control form-control-xxs' name='eresepRWJAPT_sig_racikan[]' value='" + sig_racikan +"' disabled></td>";
                   Baris += "<td hidden><input type='text' class='form-control form-control-xxs' name='eresepRWJAPT_ket_racikan[]' value='" + ket_racikan +"' disabled></td>";
                   Baris += "</tr>";
                
                $('#eresepRWJAPTtable_obatracik_jenisracikan tbody').append(Baris);
                sessionStorage['RACIK_'+nama_racikan] = '[{"racikan":"'+nama_racikan+'","qty":"'+byk_racikan+'","idsigna":"'+id_sig_rac+'","signa":"'+sig_racikan+'","ket":"'+ket_racikan+'"}]';
              }

              var group_racikan = groupracikan.filter(onlyUnique);
              const group_racikandriOBAT = groupBy(ObatRacik, "jns_racikan");
                        
              for (let a = 0; a < group_racikan.length; a++) {
                var nm_kelompok = group_racikan[a];
                const params    = []; 
                for (let i = 0; i < group_racikandriOBAT[nm_kelompok].length; i++) {
                  var kd_obt    = group_racikandriOBAT[nm_kelompok][i].kd_prd;
                  var nm_obat   = group_racikandriOBAT[nm_kelompok][i].nama_obat;
                  var dosis     = group_racikandriOBAT[nm_kelompok][i].dosis;
                  var qty       = group_racikandriOBAT[nm_kelompok][i].jumlah;
                  var ket       = group_racikandriOBAT[nm_kelompok][i].ket;
                  var jns_racik = group_racikandriOBAT[nm_kelompok][i].jns_racikan;
                  var id_signa  = group_racikandriOBAT[nm_kelompok][i].id_signa;
                  
                  var x = {};
                  var no = i + 1;
                      x.urut    = no;
                      x.kd_obt  = kd_obt;
                      x.nm_prd  = nm_obat;
                      if (dosis !== ''){
                        x.dosis = dosis;
                      }else{
                        x.dosis = "0";
                      }
                      x.qty     = qty;
                      x.ket     = ket;
                      x.jnsracik= jns_racik;
                      params.push(x);

                  sessionStorage[jns_racik] = JSON.stringify(params);
                  //PROSES PENJUMLAHAN HARGA OBAT
                  var totalx = document.getElementById("eresepRWJAPT_hargaTotal").value;
                  total = parseInt(totalx) + parseInt(qty);
                  document.getElementById("eresepRWJAPT_hargaTotal").value = total;
                  document.getElementById("veresepRWJAPT_hargaTotal").innerHTML = format_ribuan(total);
                }
              }
            }
        
        }else{
          toastr.error("Belum Ada Resep Hari Ini.");
        }
      }
    }).then(function(){
      $('#loading_modal_eresepRWJAPT').hide();
      // document.getElementById("eresepRWJAPT_btn_daftarobat").disabled     = true;
      // document.getElementById("eresepRWJAPT_btn_simpanobat").disabled     = true;
      // document.getElementById("eresepRWJAPT_btn_transferobat").disabled   = true;
      // document.getElementById('eresepRWJAPT_hapusresepRWJAPT').disabled   = true;

      //toastr.error("Order Resep Sudah Terlayani!!");
    });
  }else{
    toastr.error('Nomor Resep Tidak Diketahui...!!');
  }
}

function eresepRWJAPT_dataobatjdi(kd_prd, nm_obat, qty, id_signa, signa, ket){
  
  var nomor = $('#eresepRWJAPTtable_obatjadi tbody tr').length + 1;  
  var Baris = '';
      Baris += "<tr>";
      Baris += "<td class='pl-0'>";
      Baris += "<input style='text-align:center;' type='text' class='form-control form-control-xxs' name='eresepRWJAPT_obtjadiurut[]' value='" + nomor + "' disabled>";
      Baris += "</td>";
      Baris += "<td style='display: flex;'><button type='button' class='btn btn-xs btn-danger' onclick='eresepRWJAPT_hapusbaris_obatjadi(this, "+nomor+")' id='eresepRWJAPT_hapusbaris_obatjadi" + nomor + "' style='width:100%'><i class='fa fa-times'></i></button><button type='button' class='btn btn-xs btn-outline-warning' onclick='eresepRWJAPT_editbaris_obatjadi(this, "+nomor+")' id='eresepRWJAPT_editbaris_obatjadi" + nomor + "' style='width:100%'><i class='fa fa-edit'></i></button></td>";
      Baris += "<td>";
      Baris += "<input type='text' class='form-control form-control-xxs' name='eresepRWJAPT_obtjadikd_obt[]' value='" + kd_prd + "' disabled>";
      Baris += "</td>";
      Baris += "<td>";
      Baris += "<input type='text' class='form-control form-control-xxs' name='eresepRWJAPT_obtjadinm_obat[]' value='" + nm_obat + "' disabled>";
      Baris += "</td>";
      Baris += "<td class='pl-0'>";
      Baris += "<input type='text' class='form-control form-control-xxs' name='eresepRWJAPT_obtjadiqty[]' value='" + qty + "' disabled style='text-align: right;'>";
      Baris += "</td>";
      Baris += "<td>";
      Baris += "<input type='text' class='form-control form-control-xxs' name='eresepRWJAPT_obtjadisigna[]' value='" + signa + "' disabled>";
      Baris += "</td>";
      Baris += "<td>";
      Baris += "<input type='text' class='form-control form-control-xxs' name='eresepRWJAPT_obtjadiharga[]' value='' disabled>";
      Baris += "</td>";
      Baris += "<td>";
      Baris += "<input type='date' class='form-control form-control-xxs' name='eresepRWJAPT_obtjadiexp[]' value='" + nowday + "'>";
      Baris += "</td>";
      Baris += "<td>";
      Baris += "<input type='text' class='form-control form-control-xxs' name='eresepRWJAPT_obtjadiket[]' value='" + ket + "' disabled>";
      Baris += "</td>";
      Baris += "<td style='display:none;'>";
      Baris += "<input type='text' class='form-control form-control-xxs' name='eresepRWJAPT_obtjadiidsigna[]' value='" + id_signa + "'>";
      Baris += "</td>";
      Baris += "</tr>";

  var getkd_prd = document.getElementsByName('eresepRWJAPT_obtjadikd_obt[]');
  //var hrgaobat  = document.getElementsByName('eresepRWJAPT_obtjadiqty[]');
  var jmlObat   = $('#eresepRWJAPTtable_obatjadi tbody tr').length;
  let total     = 0;
  const data    = [];

  for(var i = 0, iLen = jmlObat ; i < iLen; i++){
    //PROSES ARRAY PENGECEKAN KODE OBAT
    var datax = {};
    datax.kd_prd = getkd_prd[i].value;
    data.push(datax);
  }
  
  const cekkd_prd = data.map(el => el.kd_prd); // returns ['00007414', '00000019', '00000017']
  const status_kd_prdk = cekkd_prd.includes(kd_prd); // returns true
  //console.log(status_kd_prdk);

  if (status_kd_prdk == false){
    $('#eresepRWJAPTtable_obatjadi tbody').append(Baris);
    
    var totalx = document.getElementById("eresepRWJAPT_hargaTotal").value;
    total = parseInt(totalx) + parseInt(qty);
    document.getElementById("eresepRWJAPT_hargaTotal").value = total;
    document.getElementById("veresepRWJAPT_hargaTotal").innerHTML = format_ribuan(total);

  }else{
    var urut = document.getElementById("eresepRWJAPT_obatjadi_urut").value;
    if (urut != ''){
      $('#eresepRWJAPTtable_obatjadi tbody').append(Baris);
      var totalx = document.getElementById("eresepRWJAPT_hargaTotal").value;
      total = parseInt(totalx) + parseInt(qty);
      document.getElementById("eresepRWJAPT_hargaTotal").value = total;
      document.getElementById("veresepRWJAPT_hargaTotal").innerHTML = format_ribuan(total);
     
      var hapusrow = document.getElementById("eresepRWJAPT_hapusbaris_obatjadi"+urut); 
      hapusrow.click();
    }else{
      toastr.error("Obat Sudah Diinputkan!!");  
    }
    
  }
}

function eresepRWJAPT_hapusbaris_obatjadi(btn, nomor){
  document.getElementById("eresepRWJAPT_obatjadi_urut").value = '';
  var row = btn.parentNode.parentNode;
  
  let total   = 0;
  var qty     = document.getElementById("eresepRWJAPTtable_obatjadi").rows[nomor].cells[4].firstChild.value;
  
  var totalx = document.getElementById("eresepRWJAPT_hargaTotal").value;
  total = parseInt(totalx) - parseInt(qty);
  document.getElementById("eresepRWJAPT_hargaTotal").value = total;
  document.getElementById("veresepRWJAPT_hargaTotal").innerHTML = format_ribuan(total);

  row.parentNode.removeChild(row);
  var no = 1;
  $('#eresepRWJAPTtable_obatjadi tbody tr').each(function(){
    $(this).find('td:nth-child(1)').html("<input style='text-align:center;' type='text' class='form-control form-control-xxs' name='eresepRWJAPT_obtjadiurut[]' value='" + no + "' disabled>");
    $(this).find('td:nth-child(2)').html("<button type='button' class='btn btn-xs btn-danger' onclick='eresepRWJAPT_hapusbaris_obatjadi(this, "+no+")' id='eresepRWJAPT_hapusbaris_obatjadi" + no + "' style='width:100%'><i class='fa fa-times'></i></button><button type='button' class='btn btn-xs btn-outline-warning' onclick='eresepRWJAPT_editbaris_obatjadi(this, "+no+")' id='eresepRWJAPT_editbaris_obatjadi" + no + "' style='width:100%'><i class='fa fa-edit'></i></button>");
    no++;
  });

}

function eresepRWJAPT_editbaris_obatjadi(btn, nomor){
  var kd_obt  = document.getElementById("eresepRWJAPTtable_obatjadi").rows[nomor].cells[2].firstChild.value;
  var nm_obat = document.getElementById("eresepRWJAPTtable_obatjadi").rows[nomor].cells[3].firstChild.value;
  var qty     = document.getElementById("eresepRWJAPTtable_obatjadi").rows[nomor].cells[4].firstChild.value;
  var signa   = document.getElementById("eresepRWJAPTtable_obatjadi").rows[nomor].cells[5].firstChild.value;
  var ket     = document.getElementById("eresepRWJAPTtable_obatjadi").rows[nomor].cells[6].firstChild.value;
  
  $("#eresepRWJAPT_obatjadi_qty").trigger('focus');

  eresepRWJAPT_kd_signaObatJadi.setValue(signa);
  document.getElementById("eresepRWJAPT_obatjadi_urut").value   = nomor;
  document.getElementById("eresepRWJAPT_obatjadi_kdobat").value = kd_obt;
  document.getElementById("eresepRWJAPT_obatjadi_nm").value     = nm_obat;
  document.getElementById("eresepRWJAPT_obatjadi_qty").value    = qty;
  document.getElementById("eresepRWJAPT_obatjadi_ket").value    = ket;
}

function eresepRWJAPT_modaldaftarobat(){
  var data = {
    eresepRWJ : 'eresepRWJAPT',
    tabObat   : document.getElementById('eresepRWJAPT_penentu_resepobat').value,
  }
  var datax = JSON.stringify(data);
  $('.eresepRWJAPT_contentobat').load('Apotek/obatresepRWJ?data='+datax);
}

function eresepRWJAPTAPT_kembalikeawal(){
  var noresepAPTRWJ = document.getElementById("eresepRWJAPT_vi_noresep").value;
  if (noresepAPTRWJ == ''){    
    pertanyaan.fire({
      title             : 'Kembali ke menu awal',
      html              : '<span>Data Order Resep Dokter Belum diSimpan, Data yang sudah dientry akan hilang, tetap kembali ?</span>',
      icon              : 'question',
      showCancelButton  : true,
      reverseButtons    : false,
      allowOutsideClick : false
    }).then((result) => {
      if (result.isConfirmed) {
        keluar_eresepRWJAPTAPT();
      }else if(result.dismiss === Swal.DismissReason.cancel){
        
      }
    })
  }else{
    keluar_eresepRWJAPTAPT();
  }
}

function keluar_eresepRWJAPTAPT() {
  sessionStorage.clear();
  $('.eresepRWJAPT_content').hide();
  $('#eresepRWJ_listpasien1').show();
  $('#eresepRWJ_listpasien2').show();
  tampilkan_isi_resepRWJ();
}

function tab_eresepRWJAPT_obatjadi(){
  $('#eresepRWJAPT_inputan_obat_jadi').show();
  $('#eresepRWJAPT_inputan_obat_racik').hide();
  $('#eresepRWJAPT_inputan_obat_racik1').hide(); 
  $('#eresepRWJAPT_inputan_obat_racik2').hide();
  $('#eresepRWJAPT_penentu_resepobat').val(0);
  document.getElementById("eresepRWJAPT_btn_daftarobat").disabled  = false;
}

function tab_eresepRWJAPT_obatracik(){
  $('#eresepRWJAPT_inputan_obat_jadi').hide();
  $('#eresepRWJAPT_inputan_obat_racik').show();
  $('#eresepRWJAPT_inputan_obat_racik1').show();
  $('#eresepRWJAPT_inputan_obat_racik2').hide();
  $('#eresepRWJAPT_penentu_resepobat').val(1);
  document.getElementById("eresepRWJAPT_btn_daftarobat").disabled  = true;
  eresepRWJAPT_kosongJenisRacikan();
}

function eresepRWJAPT(kd_obt, nama_obat, satuan, harga, exp, tabAktif){ 
  if (tabAktif == 0){
    keluarmodal_RWJresep_daftarobat();
    //document.getElementById("eresepRWJAPT_obatjadi_nm").disabled  = true;
    document.getElementById("eresepRWJAPT_obatjadi_kdobat").value = kd_obt;
    document.getElementById("eresepRWJAPT_obatjadi_nm").value     = nama_obat;
    document.getElementById("eresepRWJAPT_obatjadi_qty").value    = 1;
    document.getElementById("eresepRWJAPT_obatjadi_signa").value  = '';
    document.getElementById("eresepRWJAPT_obatjadi_ket").value    = '';
    $("#eresepRWJAPT_obatjadi_qty").trigger('focus');
  }else{
    keluarmodal_RWJresep_daftarobat();
    document.getElementById("eresepRWJAPT_obat_racik_kdobat").value  = kd_obt;
    document.getElementById("eresepRWJAPT_obat_racik_nmaobat").value = nama_obat;
    document.getElementById("eresepRWJAPT_obat_racik_dosis").value   = '';
    document.getElementById("eresepRWJAPT_obat_racik_qty").value     = 1;
    document.getElementById("eresepRWJAPT_obat_racik_ket").value     = '';
    $("#eresepRWJAPT_obat_racik_dosis").trigger('focus');
  }
}

function eresepRWJAPT_ObatJadi(){

  $("#eresepRWJAPT_obatjadi_qty").on("keyup", function(event){
    if (event.keyCode == 13) {
      $("#eresepRWJAPT_obatjadi_signa").trigger('focus');
    }
  });

  $("#eresepRWJAPT_obatjadi_signa").on("keyup", function(event){
    if (event.keyCode == 13) {
      $("#eresepRWJAPT_obatjadi_ket").trigger('focus');
    }
  });

  $("#eresepRWJAPT_obatjadi_ket").on("keyup", function(event){
    if (event.keyCode == 13) {
      var kd_obt  = document.getElementById("eresepRWJAPT_obatjadi_kdobat").value;      
      var nm_obat = document.getElementById("eresepRWJAPT_obatjadi_nm").value;
      var qty     = document.getElementById("eresepRWJAPT_obatjadi_qty").value;
      var id_signa= eresepRWJAPT_kd_signaObatJadi.getValue();
      var signa   = document.getElementById("eresepRWJAPT_obatjadi_signa").value;
      var ket     = document.getElementById("eresepRWJAPT_obatjadi_ket").value;
      if (kd_obt != null){
        if ((qty != 0)||(qty != '')||(signa != '')){
          if (id_signa != null){
            eresepRWJAPT_dataobatjdi(kd_obt, nm_obat, qty, id_signa, signa, ket);
            eresepRWJAPT_kosongObatJadi();
          }else{
            toastr.error("Signa obat tidak ditemukan!!");
            $("#eresepRWJAPT_obatjadi_signa").trigger('focus');
          }
        }else{
          toastr.error("Inputan Masih Kosong!!");  
        }
      }else{
        toastr.error("Nama obat tidak ditemukan!!");
        eresepRWJAPT_kosongObatJadi();
      }
            
    }
  });  

  $("#eresepRWJAPT_btn_check_obatjadi").click(function( event ) {
    var kd_obt  = document.getElementById("eresepRWJAPT_obatjadi_kdobat").value;      
    var nm_obat = document.getElementById("eresepRWJAPT_obatjadi_nm").value;
    var qty     = document.getElementById("eresepRWJAPT_obatjadi_qty").value;
    var id_signa= eresepRWJAPT_kd_signaObatJadi.getValue();
    var signa   = document.getElementById("eresepRWJAPT_obatjadi_signa").value;
    var ket     = document.getElementById("eresepRWJAPT_obatjadi_ket").value;
    if (kd_obt != null){
      if ((qty != 0)||(qty != '')||(signa != '')){
        if (id_signa != null){
          eresepRWJAPT_dataobatjdi(kd_obt, nm_obat, qty, id_signa, signa, ket);
          eresepRWJAPT_kosongObatJadi();
          eresepRWJAPT_modaldaftarobat();
        }else{
          toastr.error("Signa obat tidak ditemukan!!");
          $("#eresepRWJAPT_obatjadi_signa").trigger('focus');
        }
      }else{
        toastr.error("Inputan Masih Kosong!!");  
      }
    }else{
      toastr.error("Nama obat tidak ditemukan!!");
      eresepRWJAPT_kosongObatJadi();
    }
  });

}

function eresepRWJAPT_ObatRacik(){
  /*INPUTAN JENIS RACIKAN*/
  eresepRWJAPT_kd_JenisRacikan.onPilih(()=>{
    $("#eresepRWJAPT_bnykracikan").trigger('focus');
    $("#eresepRWJAPT_bnykracikan").val(1);
  });

  $("#eresepRWJAPT_bnykracikan").on("keyup", function(event){
    if (event.keyCode == 13) {
      $("#eresepRWJAPT_signaracikan").trigger('focus');
    }
  });

  eresepRWJAPT_kd_signaObatRacik.onPilih(()=>{
    $("#eresepRWJAPT_ketracikan").trigger('focus');
  });

  $("#eresepRWJAPT_ketracikan").on("keyup", function(event){
    if (event.keyCode == 13) {
      var nma_racikan = $('#eresepRWJAPT_nmaracikan').val().toUpperCase();
      var byk_racikan = $('#eresepRWJAPT_bnykracikan').val();
      var id_sig_rac  = eresepRWJAPT_kd_signaObatRacik.getValue();
      var sig_racikan = $('#eresepRWJAPT_signaracikan').val().toUpperCase();
      var ket_racikan = $('#eresepRWJAPT_ketracikan').val().toUpperCase();
      if (id_sig_rac != null){
        if (nma_racikan == '' || byk_racikan == '' || sig_racikan == ''){
          toastr.error("Inputan masih kosong!!");
        }else{
          $('#eresepRWJAPT_inputan_obat_racik1').show(); 
          $('#eresepRWJAPT_inputan_obat_racik2').show();
          $("#eresepRWJAPT_obat_racik_nmaobat").trigger('focus');
          $('#eresepRWJAPTtable_obatracik tbody').html('');

          eresepRWJAPT_obatracik_jenisracikan(nma_racikan, byk_racikan, id_sig_rac, sig_racikan, ket_racikan);
          eresepRWJAPT_disabledObatJenisRacik();
          eresepRWJAPT_modaldaftarobat();
          document.getElementById("eresepRWJAPT_btn_daftarobat").disabled  = false;
        }
      }else{
        toastr.error("Signa obat tidak ditemukan!!");
        $("#eresepRWJAPT_signaracikan").trigger('focus');
      }  
    }
  }); 
  /*END INPUTAN JENIS RACIKAN*/
  
  /*INPUTAN OBAT RACIKAN*/
  $("#eresepRWJAPT_obat_racik_dosis").on("keyup", function(event){
    if (event.keyCode == 13) {
      $("#eresepRWJAPT_obat_racik_qty").trigger('focus');
      $("#eresepRWJAPT_obat_racik_qty").val(1);
    }
  });

  $("#eresepRWJAPT_obat_racik_qty").on("keyup", function(event){
    if (event.keyCode == 13) {
      $("#eresepRWJAPT_obat_racik_ket").trigger('focus');
    }
  });

  $("#eresepRWJAPT_obat_racik_ket").on("keyup", function(event){
    if (event.keyCode == 13) {
      var kd_obt  = document.getElementById("eresepRWJAPT_obat_racik_kdobat").value;
      var nm_obat = document.getElementById("eresepRWJAPT_obat_racik_nmaobat").value;
      var dosis   = document.getElementById("eresepRWJAPT_obat_racik_dosis").value;
      var qty     = document.getElementById("eresepRWJAPT_obat_racik_qty").value;      
      var ket     = document.getElementById("eresepRWJAPT_obat_racik_ket").value;
      
      if ((kd_obt == 'null')||(kd_obt == '')){
        toastr.error("Nama obat tidak ditemukan!!");
      }else{
        if ((qty != 0)||(qty != '')){
          //PROSES PENJUMLAHAN HARGA OBAT
          
          var totalx = document.getElementById("eresepRWJAPT_hargaTotal").value;
          total = parseInt(totalx) + parseInt(qty);
          document.getElementById("eresepRWJAPT_hargaTotal").value = total;
          document.getElementById("veresepRWJAPT_hargaTotal").innerHTML = format_ribuan(total);

          eresepRWJAPT_data_obatracik(kd_obt, nm_obat, dosis, qty, ket);
          eresepRWJAPT_kosongObatRacik();
        }else{
          toastr.error("Inputan Masih Kosong!!");  
        }
      }
    }
  });  

  $("#eresepRWJAPT_btn_check_obatracik").click(function( event ) {
    var kd_obt  = document.getElementById("eresepRWJAPT_obat_racik_kdobat").value;
    var nm_obat = document.getElementById("eresepRWJAPT_obat_racik_nmaobat").value;
    var dosis   = document.getElementById("eresepRWJAPT_obat_racik_dosis").value;
    var qty     = document.getElementById("eresepRWJAPT_obat_racik_qty").value;      
    var ket     = document.getElementById("eresepRWJAPT_obat_racik_ket").value;
    
    if ((kd_obt == 'null')||(kd_obt == '')){
        toastr.error("Nama obat tidak ditemukan!!");
    }else{
      if ((qty != 0)||(qty != '')){
        //PROSES PENJUMLAHAN HARGA OBAT
        
        var totalx = document.getElementById("eresepRWJAPT_hargaTotal").value;
        total = parseInt(totalx) + parseInt(qty);
        document.getElementById("eresepRWJAPT_hargaTotal").value = total;
        document.getElementById("veresepRWJAPT_hargaTotal").innerHTML = format_ribuan(total);

        eresepRWJAPT_data_obatracik(kd_obt, nm_obat, dosis, qty, ket);
        eresepRWJAPT_kosongObatRacik();
      }else{
        toastr.error("Inputan Masih Kosong!!");  
      }
    }
  });
}

function eresepRWJAPT_kosongObatJadi(){
  document.getElementById("eresepRWJAPT_obatjadi_kdobat").value   = '';
  document.getElementById("eresepRWJAPT_obatjadi_urut").value     = '';
  document.getElementById("eresepRWJAPT_obatjadi_nm").value       = '';
  document.getElementById("eresepRWJAPT_obatjadi_qty").value      = '';
  document.getElementById("eresepRWJAPT_obatjadi_signa").value    = '';
  document.getElementById("eresepRWJAPT_obatjadi_ket").value      = '';
  eresepRWJAPT_kd_signaObatJadi.reset();
  eresepRWJAPT_modaldaftarobat();
}

function eresepRWJAPT_kosongObatRacik(){
  document.getElementById("eresepRWJAPT_obat_racik_kdobat").value = '';
  document.getElementById("eresepRWJAPT_obat_racik_nmaobat").value = '';
  document.getElementById("eresepRWJAPT_obat_racik_dosis").value   = '';
  document.getElementById("eresepRWJAPT_obat_racik_qty").value     = '';
  document.getElementById("eresepRWJAPT_obat_racik_ket").value     = '';
  eresepRWJAPT_modaldaftarobat();
}

function eresepRWJAPT_kosongJenisRacikan(){
  document.getElementById("eresepRWJAPT_nmaracikan").value   = '';
  document.getElementById("eresepRWJAPT_bnykracikan").value  = '';
  document.getElementById("eresepRWJAPT_signaracikan").value = '';
  document.getElementById("eresepRWJAPT_ketracikan").value   = '';
  eresepRWJAPT_enabledObatJenisRacik();
}

function eresepRWJAPT_disabledObatJenisRacik(){
  document.getElementById("eresepRWJAPT_nmaracikan").disabled      = true;
  document.getElementById("eresepRWJAPT_bnykracikan").disabled     = true;
  document.getElementById("eresepRWJAPT_signaracikan").disabled    = true;
  document.getElementById("eresepRWJAPT_ketracikan").disabled      = true;
}

function eresepRWJAPT_enabledObatJenisRacik(){
  document.getElementById("eresepRWJAPT_nmaracikan").disabled      = false;
  document.getElementById("eresepRWJAPT_bnykracikan").disabled     = false;
  document.getElementById("eresepRWJAPT_signaracikan").disabled    = false;
  document.getElementById("eresepRWJAPT_ketracikan").disabled      = false;
  $("#eresepRWJAPT_nmaracikan").trigger('focus');
}

function eresepRWJAPT_mulaiawalRacikan(){
  eresepRWJAPT_kd_JenisRacikan.reset();
  eresepRWJAPT_kd_signaObatRacik.reset();
  eresepRWJAPT_kosongJenisRacikan();
  $('#eresepRWJAPTtable_obatracik tbody').html('');
  $('#eresepRWJAPT_inputan_obat_racik2').hide();
  document.getElementById("eresepRWJAPT_btn_daftarobat").disabled  = true;
}

//JENIS RACIKAN
function eresepRWJAPT_obatracik_jenisracikan(nma_racikan, byk_racikan, id_sig_rac, sig_racikan, ket_racikan){
  var Nomor = $('#eresepRWJAPTtable_obatracik_jenisracikan tbody tr').length + 1;
  /*
    !important PuooolllLLL Simple tapi Bermanfaat
    PROSES PERULANGAN PENGECEKAN JENIS RACIKAN
  */
  for(var i = 1, iLen = 11 ; i < iLen; i++){ 
    var a = sessionStorage.getItem(nma_racikan+i);
    if (a == null){
      var x = nma_racikan+i;
      break;
    }else{
      let xx = Nomor + 1;
      var x = nma_racikan+''+xx;
    }
  }
  nama_racikan = x;

  var Baris = "<tr>";
     Baris += "<td class='pl-0' style='text-align:center;'>"+Nomor+"</td>";
     Baris += '<td style="display: flex;"><button type="button" class="btn btn-xs btn-warning" title="Tampilkan '+ nama_racikan+'" onclick="eresepRWJAPT_tampilkan_jenisracik('+"'"+Nomor+"','"+nma_racikan+"','"+byk_racikan+"','"+sig_racikan+"','"+ket_racikan+"','"+x+"'"+')" style="width:100%"><i class="fa fa-arrow-up"></i></button>&nbsp;<button type="button" class="btn btn-xs btn-danger" onclick="eresepRWJAPT_hapus_jenisracik(this, '+"'"+Nomor+"','"+nma_racikan+"','"+byk_racikan+"','"+sig_racikan+"','"+ket_racikan+"','"+nama_racikan+"'"+')" style="width:100%"><i class="fa fa-times"></i></button></td>';
     Baris += "<td hidden>"+Nomor+"</td>";
     Baris += "<td>";
     Baris += "<input type='text' class='form-control form-control-xs' name='eresepRWJAPT_jenisracikan[]' value='" + nama_racikan +"' disabled>";
     Baris += "</td>";
     Baris += "<td hidden><input type='text' class='form-control form-control-xxs' name='eresepRWJAPT_byk_racikan[]' value='" + byk_racikan +"' disabled></td>";
     Baris += "<td hidden><input type='text' class='form-control form-control-xxs' name='eresepRWJAPT_idsig_racikan[]' value='" + id_sig_rac +"' disabled></td>";
     Baris += "<td hidden><input type='text' class='form-control form-control-xxs' name='eresepRWJAPT_sig_racikan[]' value='" + sig_racikan +"' disabled></td>";
     Baris += "<td hidden><input type='text' class='form-control form-control-xxs' name='eresepRWJAPT_ket_racikan[]' value='" + ket_racikan +"' disabled></td>";
     Baris += "</tr>";
  
  $('#eresepRWJAPTtable_obatracik_jenisracikan tbody').append(Baris);
  $('#eresepRWJAPT_infojenis_racikan').html('<i class="fa fa-check"></i> '+nama_racikan);

  sessionStorage[nama_racikan] = '[{"urut":"1","kd_obt":"kosong","nm_prd":"","dosis":"","qty":"","ket":""}]';
  sessionStorage['RACIK_'+nama_racikan] = '[{"racikan":"'+nama_racikan+'","qty":"'+byk_racikan+'","idsigna":"'+id_sig_rac+'","signa":"'+sig_racikan+'","ket":"'+ket_racikan+'"}]';
}

function eresepRWJAPT_tampilkan_jenisracik(Nomor, nma_racikan, byk_racikan, sig_racikan, ket_racikan, x){
  nama_racikan = x;
  document.getElementById("eresepRWJAPT_nmaracikan").value   = nma_racikan;
  if ((byk_racikan != 'null')||(ket_racikan != 'null')){
    document.getElementById("eresepRWJAPT_bnykracikan").value  = byk_racikan;
    document.getElementById("eresepRWJAPT_ketracikan").value   = ket_racikan;
  }else{
    document.getElementById("eresepRWJAPT_bnykracikan").value  = 0;
    document.getElementById("eresepRWJAPT_ketracikan").value   = '';
  }
  
  document.getElementById("eresepRWJAPT_signaracikan").value = sig_racikan;
  
  $('#eresepRWJAPT_infojenis_racikan').html('<i class="fa fa-check"></i> '+nama_racikan);  
  $('#eresepRWJAPT_inputan_obat_racik2').show();
  eresepRWJAPT_disabledObatJenisRacik();
  
  var storedArray_ObatRacik = JSON.parse(sessionStorage.getItem(nama_racikan));
  //console.log(storedArray_ObatRacik);
  
  $('#eresepRWJAPTtable_obatracik tbody').html('');
  
  var i;
  for (i = 0; i < storedArray_ObatRacik.length; i++) {
    var kd_obt  = storedArray_ObatRacik[i].kd_obt;
    if (kd_obt != 'kosong'){
      var nm_obat = storedArray_ObatRacik[i].nm_prd;
      var dosis   = storedArray_ObatRacik[i].dosis;
      var qty     = storedArray_ObatRacik[i].qty;
      var ket     = storedArray_ObatRacik[i].ket;
      eresepRWJAPT_data_obatracik(kd_obt, nm_obat, dosis, qty, ket);
    }
    //console.log(kd_prd, nm_obat, dosis, qty, ket);
  }
  document.getElementById("eresepRWJAPT_btn_daftarobat").disabled  = false;
  eresepRWJAPT_modaldaftarobat();
}

function eresepRWJAPT_hapus_jenisracik(btn, Nomor, nma_racikan, byk_racikan, sig_racikan, ket_racikan, nama_racikan){
  var eresepRWJAPT_session_nama_racikan = nama_racikan;

  var row = btn.parentNode.parentNode;
  row.parentNode.removeChild(row);
  
  //PROSES GET TOTAL QTY OBAT RACIK
  // CARA 2 => let count     =  Object.keys(JSON.parse(sessionStorage.getItem(session_nama_racikan))).length;
  let countx  = JSON.parse(sessionStorage.getItem(eresepRWJAPT_session_nama_racikan));
  let xtotal  = 0;
  let total   = 0;
  var i;
  for (i = 0; i < countx.length; i++) {
    var kd_prd  = countx[i].kd_prd;
    if (kd_prd != 'kosong'){
      let hrgaobat     = countx[i].qty;
      xtotal += Number(hrgaobat);
    }
  }
  
  var totalx = document.getElementById("eresepRWJAPT_hargaTotal").value;
  total = parseInt(totalx) - parseInt(xtotal);
  document.getElementById("eresepRWJAPT_hargaTotal").value = total;
  document.getElementById("veresepRWJAPT_hargaTotal").innerHTML = format_ribuan(total);

  var no = 1;
  $('#eresepRWJAPTtable_obatracik_jenisracikan tbody tr').each(function(){
    $(this).find('td:nth-child(1)').html(no);
    no++;
  });

  sessionStorage.removeItem(eresepRWJAPT_session_nama_racikan);
  sessionStorage.removeItem('RACIK_'+eresepRWJAPT_session_nama_racikan);
  $('#eresepRWJAPTtable_obatracik tbody').html('');
  tab_eresepRWJAPT_obatracik();
  eresepRWJAPT_enabledObatJenisRacik();
  $("#eresepRWJAPT_nmaracikan").trigger('focus');
}

// OBAT RACIK
function eresepRWJAPT_data_obatracik(kd_obt, nm_obat, dosis, qty, ket){
  var nomor = $('#eresepRWJAPTtable_obatracik tbody tr').length + 1;  
  var Baris = '';
      Baris += '<tr>';
      Baris += "<td class='pl-0'>";
      Baris += "<input style='text-align:center;' type='text' class='form-control form-control-xxs' name='eresepRWJAPT_obtracikurut[]' value='" + nomor + "' disabled>";
      Baris += "</td>";
      Baris += "<td style='display: grid;align-content: space-around;'><button type='button' class='btn btn-xs btn-danger' onclick='eresepRWJAPT_hapusbaris_obatracik(this, "+nomor+")' ><i class='fa fa-times'></i></button></td>";
      Baris += "<td>";
      Baris += "<input type='text' class='form-control form-control-xxs' name='eresepRWJAPT_obtracikkd_obt[]' value='" + kd_obt + "' disabled>";
      Baris += "</td>";
      Baris += "<td>";
      Baris += "<input type='text' class='form-control form-control-xxs' name='eresepRWJAPT_obtraciknm_obat[]' value='" + nm_obat + "' disabled>";
      Baris += "</td>";
      Baris += "<td>";
      Baris += "<input type='text' class='form-control form-control-xxs' name='eresepRWJAPT_obtracikdosis[]' value='" + dosis + "' disabled>";
      Baris += "</td>";
      Baris += "<td class='pl-0'>";
      Baris += "<input type='text' class='form-control form-control-xxs' name='eresepRWJAPT_obtracikqty[]' value='" + qty + "' disabled style='text-align: right;'>";
      Baris += "</td>";
      Baris += "<td class='pl-0'>";
      Baris += "<input type='text' class='form-control form-control-xxs' name='eresepRWJAPT_obtracikharga[]' value='' disabled style='text-align: right;'>";
      Baris += "</td>";
      Baris += "<td>";
      Baris += "<input type='date' class='form-control form-control-xxs' name='eresepRWJAPT_obtracikexp[]' value='" + nowday + "'>";
      Baris += "</td>";
      Baris += "<td>";
      Baris += "<input type='text' class='form-control form-control-xxs' name='eresepRWJAPT_obtracikket[]' value='" + ket + "' disabled>";
      Baris += "</td>";      
      Baris += "</tr>";

  var getkd_obtx = document.getElementsByName('eresepRWJAPT_obtracikkd_obt[]');
  
  var jmlObat   = $('#eresepRWJAPTtable_obatracik tbody tr').length;
  let total     = 0;
  const data    = [];  
  for(var i = 0, iLen = jmlObat ; i < iLen; i++){
    //PROSES ARRAY PENGECEKAN KODE OBAT
    var datax = {};
    datax.kd_obt  = getkd_obtx[i].value;
    data.push(datax);
  }

  const cekkd_obt = data.map(el => el.kd_obt); // returns ['00007414', '00000019', '00000017']
  const status_kd_obt = cekkd_obt.includes(kd_obt); // returns true
  //console.log(status_kd_prdk);

  if (status_kd_obt == false){
    $('#eresepRWJAPTtable_obatracik tbody').append(Baris);
    
    eresepRWJAPT_sessionStorage_Racikan();
  }else{
    toastr.error("Obat Sudah Diinputkan!!");
  }  
}

function eresepRWJAPT_hapusbaris_obatracik(btn, nomor){
  var row = btn.parentNode.parentNode;
  
  let total   = 0;
  var qty     = document.getElementById("eresepRWJAPTtable_obatracik").rows[nomor].cells[5].firstChild.value;
  var totalx = document.getElementById("eresepRWJAPT_hargaTotal").value;
  total = parseInt(totalx) - parseInt(qty);
  document.getElementById("eresepRWJAPT_hargaTotal").value = total;
  document.getElementById("veresepRWJAPT_hargaTotal").innerHTML = format_ribuan(total);

  row.parentNode.removeChild(row);
  eresepRWJAPT_sessionStorage_Racikan();
  var no = 1;
  $('#eresepRWJAPTtable_obatracik tbody tr').each(function(){
    $(this).find('td:nth-child(1)').html("<input style='text-align:center;' type='text' class='form-control form-control-xxs' name='eresepRWJAPT_obtracikurut[]' value='" + no + "' disabled>");
    $(this).find('td:nth-child(2)').html("<button type='button' class='btn btn-xs btn-danger' onclick='eresepRWJAPT_hapusbaris_obatracik(this, "+no+")' ><i class='fa fa-times'></i></button>");
    no++;
  });
}

function eresepRWJAPT_sessionStorage_Racikan(){
  var getkd_prd = document.getElementsByName('eresepRWJAPT_obtracikkd_obt[]');
  var getnm_prd = document.getElementsByName('eresepRWJAPT_obtraciknm_obat[]');
  var getdosis  = document.getElementsByName('eresepRWJAPT_obtracikdosis[]');
  var getqty    = document.getElementsByName('eresepRWJAPT_obtracikqty[]');
  var getket    = document.getElementsByName('eresepRWJAPT_obtracikket[]');
  var geturut   = document.getElementsByName('eresepRWJAPT_obtracikurut[]');
  var count     = $('#eresepRWJAPTtable_obatracik tbody tr').length;
  
  const params    = [];  
  
  for(var i = 0, iLen = count ; i < iLen; i++){
    var x = {};
    x.urut    = geturut[i].value;
    x.kd_obt  = getkd_prd[i].value;
    x.nm_prd  = getnm_prd[i].value;
    //x.dosis   = getdosis[i].value;
    
    if (getdosis[i].value !== ''){
      x.dosis   = getdosis[i].value;
    }else{
      x.dosis   = "0";
    }

    x.qty     = getqty[i].value;
    x.ket     = getket[i].value
    
    params.push(x);
  }
  
  if (nama_racikan != '' || nama_racikan != null){
    sessionStorage[nama_racikan] = JSON.stringify(params);
  }else{

  }
}

//PROSES SIMPAN
function eresepRWJAPT_params_SimpanObatJadi(){  
  var getkd_obt = document.getElementsByName('eresepRWJAPT_obtjadikd_obt[]');
  var getnm_prd = document.getElementsByName('eresepRWJAPT_obtjadinm_obat[]');
  var getqty    = document.getElementsByName('eresepRWJAPT_obtjadiqty[]');
  var getidsig  = document.getElementsByName('eresepRWJAPT_obtjadiidsigna[]');
  var getsigna  = document.getElementsByName('eresepRWJAPT_obtjadisigna[]');
  var getket    = document.getElementsByName('eresepRWJAPT_obtjadiket[]');
  var geturut   = document.getElementsByName('eresepRWJAPT_obtjadiurut[]');
  var count     = $('#eresepRWJAPTtable_obatjadi tbody tr').length;
  
  var params = {};  
  params.data     = [];
  for(var i = 0, iLen = count ; i < iLen; i++){
    var x = {};
    x.kd_obt  = getkd_obt[i].value;
    x.nm_prd  = getnm_prd[i].value;
    x.qty     = getqty[i].value;
    x.signa   = getidsig[i].value;
    x.ket     = getket[i].value;
    //params.push(x);
    if (typeof(geturut[i].value) !== 'undefined') {
      x.urut  = geturut[i].value;
    }else{
      x.urut  = "";
    }

    params.data.push(x);
  }
  
  console.log(params.data);
  return params.data;
}

function eresepRWJAPT_params_SimpanObatRacik(){

  var getNma      = document.getElementsByName('eresepRWJAPT_jenisracikan[]');
  var getBnyk     = document.getElementsByName('eresepRWJAPT_byk_racikan[]');
  var getIdSigna  = document.getElementsByName('eresepRWJAPT_idsig_racikan[]');
  var getSigna    = document.getElementsByName('eresepRWJAPT_sig_racikan[]');
  var getKet      = document.getElementsByName('eresepRWJAPT_ket_racikan[]');
  var count       = $('#eresepRWJAPTtable_obatracik_jenisracikan tbody tr').length;
    
  var params = {};  
  params.data     = [];
  for(var i = 0, iLen = count ; i < iLen; i++){
    var x = {};
    x.Nama  = getNma[i].value;
    x.Bnyk  = getBnyk[i].value;
    x.Signa = getIdSigna[i].value;
    x.Ket   = getKet[i].value;
    
    x.obat  = JSON.parse(sessionStorage.getItem(x.Nama));
    x.count = x.obat.length;

    params.data.push(x);
  }

  console.log(params.data);
  return params.data;
}

function eresepRWJAPT_simpanobatin(){
  $('#loading_modal_eresepRWJAPT').show();
  
  var param = {
    noresepRWJAPT       : document.getElementById("eresepRWJAPT_vi_noresep").value,
    normRWJAPT          : norm,
    sepRWJAPT           : document.getElementById("eresepRWJAPT_vi_sep").value,
    id_orderRWJAPT      : id_order,
    id_kunjRWJAPT       : idkunj,
    id_unitRWJAPT       : idunit,
    id_pegRWJAPT        : user['id_pegawai'],
    userRWJAPT          : user['id_user'],
    dataRWJAPT          : eresepRWJAPT_params_SimpanObatJadi(),
    jmlObatRWJAPT       : $('#eresepRWJAPTtable_obatjadi tbody tr').length,
    data_racikRWJAPT    : eresepRWJAPT_params_SimpanObatRacik(),
    jmlObatRacikRWJAPT  : $('#eresepRWJAPTtable_obatracik_jenisracikan tbody tr').length,
    tgl_kunjRWJAPT      : tglkunj,
    tglorderRWJAPT      : tgl_ord,
    tglresepRWJAPT      : document.getElementById('eresepRWJAPT_vi_tglresep').value,
    catalergiRWJAPT     : document.getElementById('eresepRWJAPT_vi_cat_alergi').value,
    liveresepRWJAPT     : liveresepRWJAPT_check,
    penjaminresepRWJAPT : document.getElementById('eresepRWJAPT_vi_penjamin').value
  };
    
  apiPOST('Apotek/CreateResepRWJAPT', param, hasil => {
    if (hasil !== null) {
      $('#loading_modal_eresepRWJAPT').hide();
      if (hasil['code'] == '200'){
        document.getElementById("eresepRWJAPT_vi_noresep").value = hasil['x'];
      }else if (hasil['code'] == '501'){
        toastr.error('Resep Sudah Dilayani Apotik!!');
      }else{
        toastr.error('Gagal Simpan Resep!!');
      }
    }
  }).then(function(){
    //$('#loading_modal_eresepRWJAPT').hide();
  });
}

function eresepRWJAPTAPT_transferObat(){
  var noresepAPTRWJ = document.getElementById("eresepRWJAPT_vi_noresep").value;
  
  if (noresepAPTRWJ != ''){
    pertanyaan.fire({
      title             : 'Tranfer Kasir',
      html              : '<span>Resep sudah benar, lanjut transfer ?</span>',
      icon              : 'warning',
      showCancelButton  : true,
      reverseButtons    : false,
      allowOutsideClick : false
    }).then((result) => {
      if (result.isConfirmed) {
        $('#loading_modal_eresepRWJAPT').show();
        var param = {
          noresep   : noresepAPTRWJ,
          id_kunj   : idkunj,
          id_unit   : idunit,
          norm      : norm,
          tgl_kunj  : tglkunj,
          tgl_resep : document.getElementById('eresepRWJAPT_vi_tglresep').value,
          id_peg    : user['id_pegawai'],
          user      : user['id_user'],
          totharga  : document.getElementById("eresepRWJAPT_hargaTotal").value
        };

        apiPOST('Apotek/eresepRWJAPTAPT_transferObat', param, hasil => {
          if (hasil !== null) {
            $('#loading_modal_eresepRWJAPT').hide();
            //toastr.success("Berhasil di Transfer!!");
            keluar_eresepRWJAPTAPT();
            sukses('Berhasil di Transfer', '');
          }
        }).then(function(){
          $('#loading_modal_eresepRWJAPT').hide();
        });
        
      }else if(result.dismiss === Swal.DismissReason.cancel){
        
      }
    })
  }else{
    toastr.warning("Resep Belum disimpan...");
  }
}

function eresepRWJAPT_hapusresepRWJAPT(){
  var noresep = document.getElementById("eresepRWJAPT_vi_noresep").value;
  if (noresep != ''){    
    pertanyaan.fire({
      title             : 'Hapus Resep RJ',
      html              : '<span>Yakin dihapus ?</span>',
      icon              : 'error',
      showCancelButton  : true,
      reverseButtons    : false,
      allowOutsideClick : false
    }).then((result) => {
      if (result.isConfirmed) {
        $('#loading_modal_eresepRWJAPT').show();
        var param = {
          id_peg    : user['id_pegawai'],
          noresep   : noresep,
          idkunj    : idkunj,
          idunit    : idunit,
          user      : user['id_user'],
          tglkunj   : tglkunj,
          tglresep  : document.getElementById("eresepRWJAPT_vi_tglresep").value,
          tglorder  : tgl_ord,
          id_order  : id_order
        };

        apiPOST('Apotek/HapusResepRWJAPT', param, hasil => {
          if (hasil !== null) {
            $('#loading_modal_eresepRWJAPT').hide();
            sessionStorage.clear();
            
            $('#eresepRWJAPTtable_obatjadi tbody').html('');
            $('#eresepRWJAPTtable_obatracik_jenisracikan tbody').html('');
            $('#eresepRWJAPTtable_obatracik tbody').html('');

            document.getElementById("eresepRWJAPT_vi_noresep").value      = '';
            document.getElementById("eresepRWJAPT_vi_cat_alergi").value   = '';
            document.getElementById("veresepRWJAPT_hargaTotal").innerHTML  = '0';
            document.getElementById("eresepRWJAPT_hargaTotal").value = '0';
          }
        });
      }else if(result.dismiss === Swal.DismissReason.cancel){
        
      }
    })
  }
}

function eresepRWJAPTAPT_prevObat(){  
    
  var json_data = {
    'id_kunjprevRWJAPT'   : idkunj,
    'tgl_kunjprevRWJAPT'  : tglkunj,
    'tgl_respprevRWJAPT'  : document.getElementById('eresepRWJAPT_vi_tglresep').value,
    'no_rmprevRWJAPT'     : norm,
    'idunitprevRWJAPT'    : idunit,
    'noresepRWJAPT'       : document.getElementById("eresepRWJAPT_vi_noresep").value,
  };

  var myJSON = JSON.stringify(json_data);
  $('.eresepRWJAPT_contentobat').load('Apotek/preview_detailObatRJRIIGD_APT?data='+ myJSON);
  
}

function eresepRWJAPT_refresh(){
  pertanyaan.fire({
    title             : 'Refresh Data',
    html              : '<span>Jika Resep sudah tersimpan, Data akan dikembalikan ke Data terakhir tersimpan. Jika belum tersimpan, kembali semula Order Resep. Tetap lanjut ?</span>',
    icon              : 'warning',
    showCancelButton  : true,
    reverseButtons    : false,
    allowOutsideClick : false
  }).then((result) => {
    if (result.isConfirmed) {
      getData_OrderEresepRWJAPT();
    }else if(result.dismiss === Swal.DismissReason.cancel){
      
    }
  })
}
</script>