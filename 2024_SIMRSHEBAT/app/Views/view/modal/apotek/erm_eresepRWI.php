<?php
  /* $data = json_decode($_GET['data']);
  $nowday       = str_replace('"','', json_encode($data->nowdayOrdEresep));
  $tglkunj      = str_replace('"','', json_encode($data->tgl_kunjOrdEresep));
  //$tglkunj      = date_format(date_create($tglkunjungan), 'd-M-Y'); //FORMAT TGL 02-Feb-2023
  $id_kunj      = str_replace('"','', json_encode($data->id_kunjOrdEresep));
  $norm         = str_replace('"','', json_encode($data->no_rmOrdEresep));
  $nmapasien    = str_replace('"','', json_encode($data->namaOrdEresep));
  $alamat       = str_replace('"','', json_encode($data->alamatOrdEresep));
  $umur         = str_replace('"','', json_encode($data->umurOrdEresep));
  $penjamin     = str_replace('"','', json_encode($data->penjaminOrdEresep));
  $sep          = str_replace('"','', json_encode($data->sepOrdEresep));
  $telp         = str_replace('"','', json_encode($data->telpOrdEresep));
  $id_unit      = str_replace('"','', json_encode($data->idunitOrdEresep));
  $unit         = str_replace('"','', json_encode($data->unitOrdEresep));  */ 
  
?>
<!-- <section class="content pb-0" id="erm_eresepRWI_content"> -->
  <div class="content modal fade" id="modal_erm_eresepRWI">
    <div class="container-fluid">
      <div class="modal-dialog modal-xl" style="min-width: 100%;">
        <!-- <div class="card card-row"> -->
        <div class="modal-content" style="overflow: auto;">
          <div class="overlay-wrapper" id="loading_modal_erm_eresepRWI">
            <div class="overlay dark">
              <i class="fas fa-3x fa-sync-alt fa-spin"></i>            
            </div>
          </div>

          <div class="card-header p-1">
            <div class="row p-1">
              <div class="col-sm-4 mb-0">
                <div class="form-group row mb-1">
                  <label for="erm_eresepRWI_idresep" class="col-sm-4">Id.Resep</label>
                  <div class="input-group col-sm-8">
                    <input type="text" class="form-control form-control-xs" id="erm_eresepRWI_idresep" name="erm_eresepRWI_idresep" disabled>
                    <div class="input-group-prepend">
                      <button type="button" class="btn btn-danger btn-xs" id="erm_eresepRWI_btnhpus_order" onclick="erm_eresepRWI_hpus_order()"><i class="fa fa-trash"></i></button>
                    </div>
                  </div>                  
                </div>
                <div class="form-group row mb-1">
                  <label for="erm_eresepRWI_tglresep" class="col-sm-4">Tanggal</label>
                  <div class="col-sm-8">
                    <input type="date" class="form-control form-control-xs" id="erm_eresepRWI_tglresep" name="erm_eresepRWI_tglresep">
                  </div>
                </div>
                <div class="form-group row mb-1">
                  <label for="erm_eresepRWI_dokter" class="col-sm-4">Dokter</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control form-control-xs" id="erm_eresepRWI_dokter" name="erm_eresepRWI_dokter" disabled>
                  </div>
                </div>
                <div class="form-group row mb-1">
                  <label class="col-sm-4">Total Jumlah</label>
                  <label class="col-sm-2">Rp.</label>
                  <h5 class="col-sm-6" id="verm_eresepRWI_grandtotal" style="text-align:right; font-weight: bold;" >0</h5>
                  <input type="text" value="0" class="form-control form-control-xs" id="erm_eresepRWI_grandtotal" name="erm_eresepRWI_grandtotal" disabled hidden>
                  
                </div>
              </div>
              
              <div class="col-sm-8 mb-0">
                <div class="form-group row mb-1">
                  <label for="erm_eresepRWI_diagnosa" class="col-sm-2">Diagnosa</label>
                  <div class="col-sm-10">
                    <textarea class="form-control form-control-sm" id="erm_eresepRWI_diagnosa" name="erm_eresepRWI_diagnosa" style="height:50px;"></textarea>
                  </div>
                </div>
                <div class="form-group row mb-1">
                  <label for="erm_eresepRWI_iter" class="col-sm-2">ITER</label>
                  <div class="col-sm-10">
                    <textarea class="form-control form-control-sm" id="erm_eresepRWI_iter" name="erm_eresepRWI_iter" style="height:50px;"></textarea>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <div class="card-header p-1 darkgrey-custom">
            <!-- <h6 class="hr6-custom"><i class="fas fa-heartbeat"></i> Resep Rawat Jalan / Gawat Darurat</h6> -->
            <!-- <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="erm_eresepRWI_modaldaftarobat()" id="reseprwj_btn_daftarobat"><i class="fa fa-plus"></i> Tambah Obat</button> -->
            <button type="button" class="btn btn-warning btn-xs" onclick="erm_eresepRWI_history()"><i class="fa fa-list-alt"></i> History Order</button>
            <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="erm_eresepRWI_simpanorder()"><i class="fa fa-save"></i> Simpan</button>
            <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="preview_detailObat()"><i class="fa fa-arrow-right"></i> Kirim ke Unit Farmasi</button>
            <button type="button" class="btn btn-info btn-xs" onclick="getData_erm_eresepRWI()">
              <i class="fa fa-sync-alt fa-spin"></i> Refresh Data</button>
            <button type="button" class="btn btn-outline-danger btn-xs" onclick="erm_eresepRWI_kembalikeawal()">
              <i class="fa fa-arrow-left"></i> Kembali</button>
			  <!-- <div class="col-sm-1" id="erm_eresepRWI_status_order_terkirim" style="display:contents;" hidden>
				  <img src="<?= base_url('_assets/dist/img/checklist.png') ?>" width="23px" height="23px" title="Sudah Dikirm"/>
				  </div>
				  <div class="col-sm-1" id="erm_eresepRWI_status_order_belumterkirim" style="display:contents;" hidden>
				  <img src="<?= base_url('_assets/dist/img/cancel.png') ?>" width="21px" height="21px" title="Belum Dikirm"/>
				  </div>
				  <div class="col-sm-1" id="erm_eresepRWI_status_dilayanitrue" style="display:contents;" hidden>
				  <img src="<?= base_url('_assets/dist/img/checklist.png') ?>" width="23px" height="23px" title="Sudah Dilayani"/>
				  </div>
				  <div class="col-sm-1" id="erm_eresepRWI_status_dilayanifalse" style="display:contents;" hidden>
				  <img src="<?= base_url('_assets/dist/img/cancel.png') ?>"  width="21px" height="21px" title="Belum Dilayani"/>
			  </div> -->

            <input type="text" class="form-control form-control-xs" id="erm_eresepRWI_penentu_resepobat" value="0" disabled style="width:50px; display:none;">
          </div>
          <div class="modal-body p-1">
            
            <div class="card-body p-0">
              <ul class="nav nav-tabs" id="rwj_resep_custom-content-above-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="pill" href="#rwi_resep_obatjadi" role="tab" aria-selected="true" onclick="tabrwj_resep_obatjadiRWI();">Obat Jadi</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="pill" href="#rwi_resep_obatracik" role="tab" aria-selected="true" onclick="tabrwj_resep_obatracikRWI();">Obat Racik</a>
                </li>
              </ul>

              <div class="tab-content" id="rwj_resep_custom-content-above-tabContent">
                <div class="tab-pane p-0 fade active show" id="rwi_resep_obatjadi" role="tabpanel">
                  <div class="col-sm-12 p-1" style="max-height: 323px; overflow-x: hidden;">
                    <div class="row mb-1" id="erm_eresepRWI_inputan_obat_jadi">
                      <!-- <div class="col-md-3">
                        <div class="form_group">
                          <label>Pencarian Obat</label>
                          <select class="form-control form-control-xs erm_eresepRWI_pencarian" id="erm_eresepRWI_pencarian"></select>
                        </div>
                      </div> -->

                      <div class="input-group col-sm-3">
                        <input type="text" class="form-control form-control-xs" id="erm_eresepRWI_obatjadi_urut" hidden disabled>
                        <div class="input-group-prepend">
                          <span class="input-group-text form-control-xs">Nama</span>
                        </div>
                        <input type="search" class="form-control form-control-xs" placeholder="Ketikkan Nama Obat" id="erm_eresepRWI_obatjadi_nm" autocomplete="false">
                      </div>
                      <div class="col-sm-2">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text form-control-xs">Banyak</span>
                          </div>              
                          <input type="number" class="form-control form-control-xs" id="erm_eresepRWI_obatjadi_qty">
                        </div>
                      </div>
                      <div class="input-group col-sm-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text form-control-xs">Signa</span>
                        </div>
                        <input type="search" class="form-control form-control-xs" id="erm_eresepRWI_obatjadi_signa">
                      </div>
                      <div class="input-group col-sm-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text form-control-xs">Ket.</span>
                        </div>
                        <input type="text" class="form-control form-control-xs" id="erm_eresepRWI_obatjadi_ket">
                        <div class="input-group-prepend">
                          <button type="button" class="btn btn-primary btn-xs" id="erm_eresepRWI_btn_check_obatjadi"><i class="fa fa-check"></i></button>
                          <button type="button" class="btn btn-outline-primary btn-xs" onclick="kosongObatJadiRWI()"><i class="fa fa-file"></i> Baru</button>
                        </div>
                      </div>
                      
                    </div> 
                    <table border="0" cellpadding="0" cellspacing="0" id="erm_eresepRWItable_obatjadi" class="table table-striped table-sm choose">
                      <thead>
                        <tr>
                          <th class="pl-0" width="30" style="text-align:center;">#</th>
                          <th width="100">Act</th>
                          <th width="100">Kode Produk</th>
                          <th>Nama Obat</th>
                          <th width="70">Qty</th>
                          <th width="250">Signa</th>
                          <th width="250">Catatan</th>
                          <!-- <th width="100">Hrga</th>
                          <th width="100">Jumlah</th> -->
                          <!-- <th width="70">Satuan</th> -->
                        </tr>
                      </thead>
                      <tbody></tbody>
                    </table> 
                  </div>
                </div>
                <div class="tab-pane p-0 fade" id="rwi_resep_obatracik" role="tabpanel">
                  <div class="col-sm-12 p-1">
                    <div class="mb-1" id="erm_eresepRWI_inputan_obat_racik">
                      <div class="row" id="erm_eresepRWI_inputan_obat_racik1">
                        <div class="input-group col-sm-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text form-control-xs">Racikan</span>
                          </div>
                          <input type="search" class="form-control form-control-xs" placeholder="Ketikkan Nama Racikan" id="erm_eresepRWI_nmaracikan">
                        </div>
                        <div class="input-group col-sm-2">
                          <div class="input-group-prepend">
                            <span class="input-group-text form-control-xs">Banyak</span>
                          </div>
                          <input type="number" class="form-control form-control-xs" id="erm_eresepRWI_bnykracikan">
                        </div> 
                        <div class="input-group col-sm-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text form-control-xs">Signa</span>
                          </div>
                          <input type="search" class="form-control form-control-xs" id="erm_eresepRWI_signaracikan">
                        </div>
                        <div class="input-group col-sm-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text form-control-xs">Ket.</span>
                          </div>
                          <input type="text" class="form-control form-control-xs" id="erm_eresepRWI_ketracikan">
                          <div class="input-group-prepend">
                            <button type="button" class="btn btn-outline-primary btn-xs" onclick="erm_eresepRWI_mulaiawalRacikan()"><i class="fa fa-file"></i> Baru</button>
                          </div>
                        </div>

                      </div>
                      <hr class="mt-2 mb-2" width="95%">
                      <div class="row" id="erm_eresepRWI_inputan_obat_racik2">
                        <div class="col-sm-auto">
                          <button type="button" class="btn btn-danger btn-xs" id="erm_eresepRWI_infojenis_racikan"></button>
                        </div>
                        <div class="input-group col-sm-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text form-control-xs">Nama</span>
                          </div>
                          <input type="search" class="form-control form-control-xs" placeholder="Ketikkan Nama Obat" autocomplete="false" id="erm_eresepRWI_obat_racik_nmaobat">
                        </div>
                        <div class="col-sm-2">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text form-control-xs">Dosis</span>
                            </div>
                            <input type="number" class="form-control form-control-xs" id="erm_eresepRWI_obat_racik_dosis">
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text form-control-xs">Banyak</span>
                            </div>
                            <input type="number" class="form-control form-control-xs" id="erm_eresepRWI_obat_racik_qty">
                          </div>
                        </div>
                        <div class="input-group col-sm-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text form-control-xs">Ket.</span>
                          </div>
                          <input type="text" class="form-control form-control-xs" id="erm_eresepRWI_obat_racik_ket">
                          <div class="input-group-prepend">
                            <button type="button" class="btn btn-outline-primary btn-xs" id="erm_eresepRWI_btn_check_obatracik"><i class="fa fa-check"></i> Pilih</button>
                          </div>
                        </div>
                      </div>

                    </div>                  
                    <div class="row p-1">
                      <div class="col-sm-3" style="max-height: 323px; overflow: hidden;">
                        <table border="0" cellpadding="0" cellspacing="0" id="erm_eresepRWItable_obatracik_jenisracikan" class="table table-striped table-sm choose">
                        <thead>
                          <tr>
                            <th width="10">#</th>
                            <th width="50">Act</th>
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
                      <div class="col-sm-9" style="max-height: 323px; overflow-x: hidden;">
                        <table border="0" cellpadding="0" cellspacing="0" id="erm_eresepRWItable_obatracik" class="table table-striped table-sm choose">
                        <thead>
                          <tr>
                            <th width="10">#</th>
                            <th width="50">Act</th>
                            <th width="100">Kode Produk</th>
                            <th>Nama Obat</th>
                            <th width="100">Dosis</th>
                            <th width="90">Qty</th>
                            <th width="150">Keterangan</th>
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
        </div>

      </div>
    </div>
  </div>
<!-- </section> -->

<script type="text/javascript">
sessionStorage.clear();
var nowday        = "<?php echo date('Y-m-d');; ?>";

var id_kunjungan  = "<?php /* echo $id_kunj;*/  ?>";
var tglkunj       = "<?php /*echo $tglkunj;*/ ?>";
var norm          = "<?php /*echo $norm;*/ ?>";
var nmapasien     = "<?php /*echo $nmapasien;*/ ?>";
var alamat        = "<?php /*echo $alamat;*/ ?>";
var umur          = "<?php /*echo $umur;*/ ?>";
var penjamin  = "<?php /*echo $penjamin;*/ ?>";
var sep       = "<?php /*echo $sep;*/ ?>";
var telp      = "<?php /*echo $telp;*/ ?>";
var id_unit       = "<?php /*echo $id_unit;*/ ?>";
var unit          = "<?php /*echo $unit;*/ ?>";

var kd_produkObatJadi;
var kd_JenisRacikan;
var kd_produkObatRacik;
var kd_signaObatJadi;
var kd_signaObatRacik;
var nama_racikan;

document.getElementById('erm_eresepRWI_tglresep').value = nowday;
document.getElementById('erm_eresepRWI_dokter').value   = user.nama_pegawai;

$(document).ready(function() {
  showUp_erm_eresepRWI();  
});

tabrwj_resep_obatjadiRWI();
getObat_erm_eresepRWI();
getSigna();
//erm_autocomplete_obat();


function showUp_erm_eresepRWI(){  
  //$('#modal_erm_eresepRWI').modal('show');  
  $("#modal_erm_eresepRWI").modal({backdrop: "static"});
  $('#modal_erm_eresepRWI').on('shown.bs.modal', function() { });
  /* */erm_eresepRWI_ObatJadi();
  erm_eresepRWI_ObatRacik();
  getData_erm_eresepRWI(); 
}

var a = "erm_eresepRWI_tglresep";
max_date(a);

function getObat_erm_eresepRWI(){  
  var param = {
    obatcari: document.getElementById("erm_eresepRWI_obatjadi_nm").value,
  };
  
  kd_produkObatJadi = new AutoComplete("erm_eresepRWI_obatjadi_nm");
  kd_produkObatRacik = new AutoComplete("erm_eresepRWI_obat_racik_nmaobat");
  apiPOST('Apotek/getObat_eresep', param, hasil => {
    if (hasil !== null) {
      var list = hasil['data'];
      list.forEach(baru => {
        kd_produkObatJadi.addData(baru['kd_obat'], baru['nama_obat']);
        kd_produkObatRacik.addData(baru['kd_obat'], baru['nama_obat']);
      });
    }
  });

  kd_JenisRacikan = new AutoComplete("erm_eresepRWI_nmaracikan");
  apiPOST('Apotek/getJnsRacikan_eresep', null, hasil => {
    if (hasil !== null) {
      var list = hasil['data'];
      list.forEach(baru => {
        kd_JenisRacikan.addData(baru['id_jns_racik'], baru['jns_racik']);
      });
    }
  });
}

function getSigna(){
  
  kd_signaObatJadi = new AutoComplete("erm_eresepRWI_obatjadi_signa");
  kd_signaObatRacik = new AutoComplete("erm_eresepRWI_signaracikan");
  apiPOST('Apotek/getSigna', null, hasil => {
    if (hasil !== null) {
      var list = hasil['data'];
      list.forEach(baru => {
        kd_signaObatJadi.addData(baru['id_signa'], baru['signa']);
        kd_signaObatRacik.addData(baru['id_signa'], baru['signa']);
      });
    }
  });
}

function getData_erm_eresepRWI(){
  $('#loading_modal_erm_eresepRWI').hide();
  document.getElementById("erm_eresepRWI_status_order_belumterkirim").hidden  = true;
  document.getElementById("erm_eresepRWI_status_order_terkirim").hidden       = true;
  document.getElementById("erm_eresepRWI_status_dilayanifalse").hidden        = true; 
  document.getElementById("erm_eresepRWI_status_dilayanitrue").hidden         = true;
  var param = {
    idresep   : '',
    id_kunj   : id_kunjungan,
    tgl_kunj  : tglkunj,
    tglorder  : document.getElementById('erm_eresepRWI_tglresep').value,
  };

  /**/ apiPOST('Apotek/getData_erm_eresepRWI', param, hasil => {
    sessionStorage.clear();
    if (hasil !== null) {
      $('#loading_modal_erm_eresepRWI').hide();
      if (hasil['code'] == '200'){
        var data        = hasil['data'];
        var ObatJadi    = hasil['ObatJadi'];
        var GroupRacik  = hasil['GroupRacik'];
        var ObatRacik   = hasil['ObatRacik'];

        if (hasil['count'] > 1){
          toastr.warning('Terdapat Lebih dari 1 Order Resep di Tgl. '+document.getElementById('erm_eresepRWI_tglresep').value);
        }else{
          $('#erm_eresepRWItable_obatjadi tbody').html('');
          $('#erm_eresepRWItable_obatracik_jenisracikan tbody').html('');
          $('#erm_eresepRWItable_obatracik tbody').html('');
          document.getElementById("erm_eresepRWI_grandtotal").value = 0;

          for (var i = 0; i < data.length; i++) {
            document.getElementById("erm_eresepRWI_idresep").value  = data[i].id_order;
            document.getElementById("erm_eresepRWI_diagnosa").value = data[i].cat_diagnosa;
            document.getElementById("erm_eresepRWI_iter").value     = data[i].cat_iter;

            if (data[i].order_mng == 't'){
              document.getElementById("erm_eresepRWI_status_order_terkirim").hidden = false;
              if (data[i].dilayani == '1'){
                document.getElementById("erm_eresepRWI_status_dilayanitrue").hidden = false;
                document.getElementById("erm_eresepRWI_status_dilayanifalse").hidden = true;
              }else{
                document.getElementById("erm_eresepRWI_status_dilayanitrue").hidden = true;
                document.getElementById("erm_eresepRWI_status_dilayanifalse").hidden = false;
              }
            }else{
              document.getElementById("erm_eresepRWI_status_order_belumterkirim").hidden = false;
              document.getElementById("erm_eresepRWI_status_order_terkirim").hidden = true;
              document.getElementById("erm_eresepRWI_status_dilayanifalse").hidden = false; 
              document.getElementById("erm_eresepRWI_status_dilayanitrue").hidden = true;         
            }
          }

          for (var o = 0; o < ObatJadi.length; o++) {
            var kd_obat    = ObatJadi[o].kd_obat;
            var nm_obat   = ObatJadi[o].nama_obat;
            var qty       = ObatJadi[o].jumlah;
            var id_signa  = ObatJadi[o].id_signa;
            var signa     = ObatJadi[o].signa;
            var ket       = ObatJadi[o].ket;

            tampilkan_isi_obatjdi(kd_obat, nm_obat, qty, id_signa, signa, ket);
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
              
              var Nomor = $('#erm_eresepRWItable_obatracik_jenisracikan tbody tr').length + 1;
              var Baris = "<tr>";
                 Baris += "<td>"+Nomor+"</td>";
                 Baris += '<td style="display: flex; justify-content: left;"><button type="button" class="btn btn-xs btn-warning" title="Tampilkan '+ nama_racikan+'" onclick="tampilkan_jenisracik('+"'"+Nomor+"','"+nma_racikan+"','"+byk_racikan+"','"+sig_racikan+"','"+ket_racikan+"','"+x+"'"+')"><i class="fa fa-arrow-up"></i></button>&nbsp;<button type="button" class="btn btn-xs btn-danger" onclick="hapus_jenisracik(this, '+"'"+Nomor+"','"+nma_racikan+"','"+byk_racikan+"','"+sig_racikan+"','"+ket_racikan+"','"+nama_racikan+"'"+')"><i class="fa fa-times"></i></button></td>';
                 Baris += "<td hidden>"+Nomor+"</td>";
                 Baris += "<td>";
                 Baris += "<input type='text' class='form-control form-control-xs' name='ermIrja_nma_jenisracikan[]' value='" + nama_racikan +"' disabled>";
                 Baris += "</td>";
                 Baris += "<td hidden><input type='text' class='form-control form-control-xs' name='ermIrja_nma_byk_racikan[]' value='" + byk_racikan +"' disabled></td>";
                 Baris += "<td hidden><input type='text' class='form-control form-control-xs' name='ermIrja_nma_idsig_racikan[]' value='" + id_sig_rac +"' disabled></td>";
                 Baris += "<td hidden><input type='text' class='form-control form-control-xs' name='ermIrja_nma_sig_racikan[]' value='" + sig_racikan +"' disabled></td>";
                 Baris += "<td hidden><input type='text' class='form-control form-control-xs' name='ermIrja_nma_ket_racikan[]' value='" + ket_racikan +"' disabled></td>";
                 Baris += "</tr>";
              
              $('#erm_eresepRWItable_obatracik_jenisracikan tbody').append(Baris);
              sessionStorage['RACIK_'+nama_racikan] = '[{"racikan":"'+nama_racikan+'","qty":"'+byk_racikan+'","idsigna":"'+id_sig_rac+'","signa":"'+sig_racikan+'","ket":"'+ket_racikan+'"}]';
            }

            var group_racikan = groupracikan.filter(onlyUnique);
            //console.log(group_racikan);
            const group_racikandriOBAT = groupBy(ObatRacik, "jns_racikan");
            //console.log(group_racikandriOBAT);
          
            for (let a = 0; a < group_racikan.length; a++) {
              var nm_kelompok = group_racikan[a];
              const params    = []; 
              for (let i = 0; i < group_racikandriOBAT[nm_kelompok].length; i++) {
                var kd_obat    = group_racikandriOBAT[nm_kelompok][i].kd_obat;
                var nm_obat   = group_racikandriOBAT[nm_kelompok][i].nama_obat;
                var dosis     = group_racikandriOBAT[nm_kelompok][i].dosis;
                var qty       = group_racikandriOBAT[nm_kelompok][i].jumlah;
                var ket       = group_racikandriOBAT[nm_kelompok][i].ket;
                var jns_racik = group_racikandriOBAT[nm_kelompok][i].jns_racikan;
                var id_signa  = group_racikandriOBAT[nm_kelompok][i].id_signa;

                var x = {};
                var no = i + 1;
                    x.urut    = no;
                    x.kd_obat  = kd_obat;
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
                var totalx = document.getElementById("erm_eresepRWI_grandtotal").value;
                total = parseInt(totalx) + parseInt(qty);
                document.getElementById("erm_eresepRWI_grandtotal").value = total;
                document.getElementById("verm_eresepRWI_grandtotal").innerHTML = format_ribuan(total);
              }
            }
          }

        }
      
      }else if (hasil['code'] == '500'){
        toastr.error("Order Resep Sudah Dilayani Apotik!!");
        keluarmodal_erm_eresepRWI();
      }else{
        toastr.info("Belum Ada Order Resep Hari Ini.");
        document.getElementById("erm_eresepRWI_status_order_belumterkirim").hidden  = false;
        document.getElementById("erm_eresepRWI_status_order_terkirim").hidden       = true;
        document.getElementById("erm_eresepRWI_status_dilayanifalse").hidden        = false; 
        document.getElementById("erm_eresepRWI_status_dilayanitrue").hidden         = true;

        $('#erm_eresepRWItable_obatjadi tbody').html('');
        $('#erm_eresepRWItable_obatracik_jenisracikan tbody').html('');
        $('#erm_eresepRWItable_obatracik tbody').html('');
      }
    }else{

    }
  }); 
}

function getObat_erm_eresepRWI2(){/* XXXX */
  var param = {
    obatcari: ''
  };

  apiPOST('Apotek/pencarianobat2', param, hasil => {
    var data = '';
    var a = hasil['items'];      
      data += '<option>Ketikkan Nama Obat</option>';
    for (var i = 0; i < a.length; i++) {
      data += '<option data-anag="' + a[i]['kd_obat'] + '" data-col1="' + a[i]['nama_obat'] + '" data-col2="' + a[i]['kd_satuan'] + '" data-col3="' + a[i]['fractions'] + '" data-col4="' + a[i]['kegunaanobat'] + '" value="' + a[i]['kd_obat'] + '">' + a[i]['nama_obat'] +'</option>';
    }
    document.getElementById('erm_eresepRWI_pencarian').innerHTML = data;
  })
}

function erm_eresepRWI_modaldaftarobat(){/* XXXX */
  var json_data = {
    'eresepRWJ': 'erm_eresepRWI', 
  };

  var myJSON = JSON.stringify(json_data);
  $('.erm_eresepRWI_contentobat').load('Apotek/obatresepRWJ?data='+myJSON);
}

function erm_eresepRWI_ObatJadi(){
/* */
  kd_produkObatJadi.onPilih(()=>{
    $("#erm_eresepRWI_obatjadi_qty").trigger('focus');
    $("#erm_eresepRWI_obatjadi_qty").val(1);
  });

  $("#erm_eresepRWI_obatjadi_qty").on("keyup", function(event){
    if (event.keyCode == 13) {
      $("#erm_eresepRWI_obatjadi_signa").trigger('focus');
    }
  });

  $("#erm_eresepRWI_obatjadi_signa").on("keyup", function(event){
    if (event.keyCode == 13) {
      $("#erm_eresepRWI_obatjadi_ket").trigger('focus');
    }
  });

  $("#erm_eresepRWI_obatjadi_ket").on("keyup", function(event){
    if (event.keyCode == 13) {
      var kd_obat  = kd_produkObatJadi.getValue();      
      var nm_obat = document.getElementById("erm_eresepRWI_obatjadi_nm").value;
      var cekqty  = document.getElementById("erm_eresepRWI_obatjadi_qty").value;
      if (cekqty != ''){
        var qty = cekqty;
      }else{
        var qty = '0';
      }
      var id_signa= kd_signaObatJadi.getValue();
      var signa   = document.getElementById("erm_eresepRWI_obatjadi_signa").value;
      var ket     = document.getElementById("erm_eresepRWI_obatjadi_ket").value;
      if (kd_obat != null){
        if ((qty != '0')||(qty != '')||(signa != '')){
          if (id_signa != null){
            tampilkan_isi_obatjdi(kd_obat, nm_obat, qty, id_signa, signa, ket);
            kosongObatJadiRWI();
          }else{
            toastr.error("Signa obat tidak ditemukan!!");
            $("#erm_eresepRWI_obatjadi_signa").trigger('focus');
          }
        }else{
          toastr.error("Inputan Masih Kosong!!");  
        }
      }else{
        toastr.error("Nama obat tidak ditemukan!!");
        kosongObatJadiRWI();
      }
            
    }
  });  

  $("#erm_eresepRWI_btn_check_obatjadi").click(function( event ) {
    var kd_obat  = kd_produkObatJadi.getValue();
    var nm_obat = document.getElementById("erm_eresepRWI_obatjadi_nm").value;
    var cekqty  = document.getElementById("erm_eresepRWI_obatjadi_qty").value;
    if (cekqty != ''){
      var qty = cekqty;
    }else{
      var qty = '0';
    }
    var id_signa= kd_signaObatJadi.getValue();
    var signa   = document.getElementById("erm_eresepRWI_obatjadi_signa").value;
    var ket     = document.getElementById("erm_eresepRWI_obatjadi_ket").value;
    if (kd_obat != null){
      if ((qty != '0')||(qty != '')||(signa != '')){
        if (id_signa != null){
          tampilkan_isi_obatjdi(kd_obat, nm_obat, qty, id_signa, signa, ket);
          kosongObatJadiRWI();
        }else{
          toastr.error("Signa obat tidak ditemukan!!");
          $("#erm_eresepRWI_obatjadi_signa").trigger('focus');
        }
      }else{
        toastr.error("Inputan Masih Kosong!!");  
      }
    }else{
      toastr.error("Nama obat tidak ditemukan!!");
      kosongObatJadiRWI();
    }
  });
 
}

function erm_eresepRWI_ObatRacik(){
  /*INPUTAN JENIS RACIKAN*/
  kd_JenisRacikan.onPilih(()=>{
    $("#erm_eresepRWI_bnykracikan").trigger('focus');
    $("#erm_eresepRWI_bnykracikan").val(1);
  });

  $("#erm_eresepRWI_bnykracikan").on("keyup", function(event){
    if (event.keyCode == 13) {
      $("#erm_eresepRWI_signaracikan").trigger('focus');
      //$("#erm_eresepRWI_signaracikan").val('3x1');
    }
  });

  // $("#erm_eresepRWI_signaracikan").on("keyup", function(event){
  //   if (event.keyCode == 13) {
  //     $("#erm_eresepRWI_ketracikan").trigger('focus');
  //   }
  // });

  kd_signaObatRacik.onPilih(()=>{
    $("#erm_eresepRWI_ketracikan").trigger('focus');
  });

  $("#erm_eresepRWI_ketracikan").on("keyup", function(event){
    if (event.keyCode == 13) {
      var nma_racikan = $('#erm_eresepRWI_nmaracikan').val().toUpperCase();
      var byk_racikan = $('#erm_eresepRWI_bnykracikan').val();
      var id_sig_rac  = kd_signaObatRacik.getValue();
      var sig_racikan = $('#erm_eresepRWI_signaracikan').val().toUpperCase();
      var ket_racikan = $('#erm_eresepRWI_ketracikan').val().toUpperCase();
      if (id_sig_rac != null){
        if (nma_racikan == '' || byk_racikan == '' || sig_racikan == ''){
          toastr.error("Inputan masih kosong!!");
        }else{
          $('#erm_eresepRWI_inputan_obat_racik1').show(); 
          $('#erm_eresepRWI_inputan_obat_racik2').show();
          $("#erm_eresepRWI_obat_racik_nmaobat").trigger('focus');
          $('#erm_eresepRWItable_obatracik tbody').html('');

          tampilkan_isi_obatracik_jenisracikan(nma_racikan, byk_racikan, id_sig_rac, sig_racikan, ket_racikan);
          //kosongObatJenisRacikRWI();
          disabledObatJenisRacikRWI();
        }
      }else{
        toastr.error("Signa obat tidak ditemukan!!");
        $("#erm_eresepRWI_signaracikan").trigger('focus');
      }  
    }
  }); 
  /*END INPUTAN JENIS RACIKAN*/
  /*INPUTAN OBAT RACIKAN */

  kd_produkObatRacik.onPilih(()=>{
    $("#erm_eresepRWI_obat_racik_dosis").trigger('focus');
  });

  $("#erm_eresepRWI_obat_racik_dosis").on("keyup", function(event){
    if (event.keyCode == 13) {
      $("#erm_eresepRWI_obat_racik_qty").trigger('focus');
      $("#erm_eresepRWI_obat_racik_qty").val(1);
    }
  });

  $("#erm_eresepRWI_obat_racik_qty").on("keyup", function(event){
    if (event.keyCode == 13) {
      $("#erm_eresepRWI_obat_racik_ket").trigger('focus');
    }
  });

  $("#erm_eresepRWI_obat_racik_ket").on("keyup", function(event){
    if (event.keyCode == 13) {
      var kd_obat  = kd_produkObatRacik.getValue();
      var nm_obat = document.getElementById("erm_eresepRWI_obat_racik_nmaobat").value;
      var cekdosis = document.getElementById("erm_eresepRWI_obat_racik_dosis").value;
      if (cekdosis != ''){
        var dosis = cekdosis;
      }else{
        var dosis = '0';
      }    
      var cekqty  = document.getElementById("erm_eresepRWI_obat_racik_qty").value;
      if (cekqty != ''){
        var qty = cekqty;
      }else{
        var qty = '0';
      }
      var ket     = document.getElementById("erm_eresepRWI_obat_racik_ket").value;
      
      if (kd_obat != null){
        if ((qty != '0')||(qty != '')){
          //PROSES PENJUMLAHAN HARGA OBAT
          var totalx = document.getElementById("erm_eresepRWI_grandtotal").value;
          total = parseInt(totalx) + parseInt(qty);
          document.getElementById("erm_eresepRWI_grandtotal").value = total;
          document.getElementById("verm_eresepRWI_grandtotal").innerHTML = format_ribuan(total);
          tampilkan_isi_obatracik(kd_obat, nm_obat, dosis, qty, ket);
          kosongObatRacikRWI();
        }else{
          toastr.error("Inputan Masih Kosong!!");  
        }
      }else{
        toastr.error("Nama obat tidak ditemukan!!");
        kosongObatRacikRWI();
      }
    }
  });  

  $("#erm_eresepRWI_btn_check_obatracik").click(function( event ) {
    var kd_obat  = kd_produkObatRacik.getValue();
    var nm_obat = document.getElementById("erm_eresepRWI_obat_racik_nmaobat").value;
    var cekdosis   = document.getElementById("erm_eresepRWI_obat_racik_dosis").value;
    if (cekdosis != ''){
      var dosis = cekdosis;
    }else{
      var dosis = '0';
    }
    var cekqty  = document.getElementById("erm_eresepRWI_obat_racik_qty").value;
    if (cekqty != ''){
      var qty = cekqty;
    }else{
      var qty = '0';
    }      
    var ket     = document.getElementById("erm_eresepRWI_obat_racik_ket").value;
    if (kd_obat != null){
      if ((qty != '0')||(qty != '')){
        //PROSES PENJUMLAHAN HARGA OBAT
        var totalx = document.getElementById("erm_eresepRWI_grandtotal").value;
        total = parseInt(totalx) + parseInt(qty);
        document.getElementById("erm_eresepRWI_grandtotal").value = total;
        document.getElementById("verm_eresepRWI_grandtotal").innerHTML = format_ribuan(total);  
        tampilkan_isi_obatracik(kd_obat, nm_obat, dosis, qty, ket);
        kosongObatRacikRWI();
      }else{
        toastr.error("Inputan Masih Kosong!!");  
      }
    }else{
      toastr.error("Nama obat tidak ditemukan!!");
      kosongObatRacikRWI();
    }
  });
 
}

function kosongObatJadiRWI(){ 
  document.getElementById("erm_eresepRWI_obatjadi_nm").disabled = false;
  $("#erm_eresepRWI_obatjadi_nm").trigger('focus');
  document.getElementById("erm_eresepRWI_obatjadi_urut").value  = '';
  document.getElementById("erm_eresepRWI_obatjadi_nm").value    = '';
  document.getElementById("erm_eresepRWI_obatjadi_qty").value   = '';
  document.getElementById("erm_eresepRWI_obatjadi_signa").value = '';
  document.getElementById("erm_eresepRWI_obatjadi_ket").value   = '';
  kd_produkObatJadi.reset();
  kd_signaObatJadi.reset();
}

function kosongJenisRacikanRWI(){
  //kd_JenisRacikan.reset();
  //kd_signaObatRacik.reset();
  //$("#erm_eresepRWI_nmaracikan").trigger('focus');
  document.getElementById("erm_eresepRWI_nmaracikan").value   = '';
  document.getElementById("erm_eresepRWI_bnykracikan").value  = '';
  document.getElementById("erm_eresepRWI_signaracikan").value = '';
  document.getElementById("erm_eresepRWI_ketracikan").value   = '';
  enabledObatJenisRacikRWI();
}

function kosongObatRacikRWI(){
  kd_produkObatRacik.reset();
  document.getElementById("erm_eresepRWI_obat_racik_nmaobat").value = '';
  document.getElementById("erm_eresepRWI_obat_racik_dosis").value   = '';
  document.getElementById("erm_eresepRWI_obat_racik_qty").value     = '';
  document.getElementById("erm_eresepRWI_obat_racik_ket").value     = '';
  $("#erm_eresepRWI_obat_racik_nmaobat").trigger('focus');
}

function kosongObatJenisRacikRWI(){
  //document.getElementById("erm_eresepRWI_nmaracikan").disabled  = false;
  document.getElementById("erm_eresepRWI_nmaracikan").value     = '';
  document.getElementById("erm_eresepRWI_bnykracikan").value    = '';
  document.getElementById("erm_eresepRWI_signaracikan").value   = '';
  document.getElementById("erm_eresepRWI_ketracikan").value     = '';
}

function disabledObatJenisRacikRWI(){
  document.getElementById("erm_eresepRWI_nmaracikan").disabled      = true;
  document.getElementById("erm_eresepRWI_bnykracikan").disabled     = true;
  document.getElementById("erm_eresepRWI_signaracikan").disabled    = true;
  document.getElementById("erm_eresepRWI_ketracikan").disabled      = true;
}

function enabledObatJenisRacikRWI(){
  document.getElementById("erm_eresepRWI_nmaracikan").disabled      = false;
  document.getElementById("erm_eresepRWI_bnykracikan").disabled     = false;
  document.getElementById("erm_eresepRWI_signaracikan").disabled    = false;
  document.getElementById("erm_eresepRWI_ketracikan").disabled      = false;
  //$("#erm_eresepRWI_nmaracikan").trigger('focus');
}

function erm_eresepRWI_mulaiawalRacikan(){
  $("#erm_eresepRWI_nmaracikan").trigger('focus');
  kd_JenisRacikan.reset();
  kd_signaObatRacik.reset();
  kosongJenisRacikanRWI();
  $('#erm_eresepRWItable_obatracik tbody').html('');
  $('#erm_eresepRWI_inputan_obat_racik2').hide();
}

function tampilkan_isi_obatjdi(kd_obat, nm_obat, qty, id_signa, signa, ket){/* ???? */
  //$('#erm_eresepRWItable_obatjadi tbody').html('');
  var nomor = $('#erm_eresepRWItable_obatjadi tbody tr').length + 1;  
  var Baris = '';
      Baris += "<tr>";
      //Baris += '<td>'+nomor+'</td>';
      Baris += "<td class='pl-0'>";
      Baris += "<input style='text-align:center;' type='text' class='form-control form-control-xs' name='ermIrja_obtjadiurut[]' value='" + nomor + "' disabled>";
      Baris += "</td>";
      Baris += "<td style='display: flex;'><button type='button' class='btn btn-xs btn-danger' onclick='hapusbaris_obatjadi(this, "+nomor+")' id='hapusbaris_obatjadi" + nomor + "' style='width:100%'><i class='fa fa-times'></i></button><button type='button' class='btn btn-xs btn-outline-warning' onclick='editbaris_obatjadi(this, "+nomor+")' id='editbaris_obatjadi" + nomor + "' style='width:100%'><i class='fa fa-edit'></i></button></td>";
      Baris += "<td>";
      Baris += "<input type='text' class='form-control form-control-xs' name='ermIrja_obtjadikd_obat[]' value='" + kd_obat + "' disabled>";
      Baris += "</td>";
      Baris += "<td>";
      Baris += "<input type='text' class='form-control form-control-xs' name='ermIrja_obtjadinm_obat[]' value='" + nm_obat + "' disabled>";
      Baris += "</td>";
      Baris += "<td>";
      Baris += "<input type='text' class='form-control form-control-xs' name='ermIrja_obtjadiqty[]' value='" + qty + "' disabled>";
      Baris += "</td>";
      Baris += "<td>";
      Baris += "<input type='text' class='form-control form-control-xs' name='ermIrja_obtjadisigna[]' value='" + signa + "' disabled>";
      Baris += "</td>";
      Baris += "<td>";
      Baris += "<input type='text' class='form-control form-control-xs' name='ermIrja_obtjadiket[]' value='" + ket + "' disabled>";
      Baris += "</td>";
      Baris += "<td style='display:none;'>";
      Baris += "<input type='text' class='form-control form-control-xs' name='ermIrja_obtjadiidsigna[]' value='" + id_signa + "'>";
      Baris += "</td>";
      Baris += "</tr>";

  var getkd_obat = document.getElementsByName('ermIrja_obtjadikd_obat[]');
  //var hrgaobat  = document.getElementsByName('ermIrja_obtjadiqty[]');
  var jmlObat   = $('#erm_eresepRWItable_obatjadi tbody tr').length;
  let total     = 0;
  const data    = [];

  for(var i = 0, iLen = jmlObat ; i < iLen; i++){
    //PROSES ARRAY PENGECEKAN KODE OBAT
    var datax = {};
    datax.kd_obat = getkd_obat[i].value;
    data.push(datax);
  }
  
  const cekkd_obat = data.map(el => el.kd_obat); // returns ['00007414', '00000019', '00000017']
  const status_kd_obatk = cekkd_obat.includes(kd_obat); // returns true
  //console.log(status_kd_obatk);

  if (status_kd_obatk == false){
    $('#erm_eresepRWItable_obatjadi tbody').append(Baris);
    //PROSES PENJUMLAHAN HARGA OBAT
    // for(var i = 0, iLen = jmlObat ; i < iLen; i++){     
    //   total+=Number(hrgaobat[i].value);
    //   document.getElementById("erm_eresepRWI_grandtotal").value = total;
    document.getElementById("verm_eresepRWI_grandtotal").innerHTML = format_ribuan(total);
    // }
    var totalx = document.getElementById("erm_eresepRWI_grandtotal").value;
    total = parseInt(totalx) + parseInt(qty);
    document.getElementById("erm_eresepRWI_grandtotal").value = total;
    document.getElementById("verm_eresepRWI_grandtotal").innerHTML = format_ribuan(total);

  }else{
    var urut = document.getElementById("erm_eresepRWI_obatjadi_urut").value;
    if (urut != ''){
      $('#erm_eresepRWItable_obatjadi tbody').append(Baris);
      var totalx = document.getElementById("erm_eresepRWI_grandtotal").value;
      total = parseInt(totalx) + parseInt(qty);
      document.getElementById("erm_eresepRWI_grandtotal").value = total;
      document.getElementById("verm_eresepRWI_grandtotal").innerHTML = format_ribuan(total);
      
      var hapusrow = document.getElementById("hapusbaris_obatjadi"+urut); 
      hapusrow.click();
      //hapusbaris_obatjadi(this, urut)
      //document.getElementById("erm_eresepRWItable_obatjadi").deleteRow(urut);  
    }else{
      toastr.error("Obat Sudah Diinputkan!!");  
    }
    
  }
}

function editbaris_obatjadi(btn, nomor){/* ???? */
  
  var kd_obat  = document.getElementById("erm_eresepRWItable_obatjadi").rows[nomor].cells[2].firstChild.value;
  var nm_obat = document.getElementById("erm_eresepRWItable_obatjadi").rows[nomor].cells[3].firstChild.value;
  var qty     = document.getElementById("erm_eresepRWItable_obatjadi").rows[nomor].cells[4].firstChild.value;
  var signa   = document.getElementById("erm_eresepRWItable_obatjadi").rows[nomor].cells[5].firstChild.value;
  var ket     = document.getElementById("erm_eresepRWItable_obatjadi").rows[nomor].cells[6].firstChild.value;
  
  //kd_produkObatJadi.reset();
  //kd_produkObatJadi = kd_obat;
  $("#erm_eresepRWI_obatjadi_qty").trigger('focus');

  kd_produkObatJadi.setValue(nm_obat);
  kd_signaObatJadi.setValue(signa);
  document.getElementById("erm_eresepRWI_obatjadi_urut").value  = nomor;
  document.getElementById("erm_eresepRWI_obatjadi_nm").disabled = true;
  //document.getElementById("erm_eresepRWI_obatjadi_nm").value    = nm_obat;
  document.getElementById("erm_eresepRWI_obatjadi_qty").value   = qty;
  //document.getElementById("erm_eresepRWI_obatjadi_signa").value = signa;
  document.getElementById("erm_eresepRWI_obatjadi_ket").value   = ket;
}

function hapusbaris_obatjadi(btn, nomor){/* ???? */
  document.getElementById("erm_eresepRWI_obatjadi_urut").value = '';
  var row = btn.parentNode.parentNode;
  
  let total   = 0;
  var qty     = document.getElementById("erm_eresepRWItable_obatjadi").rows[nomor].cells[4].firstChild.value;
  var totalx  = document.getElementById("erm_eresepRWI_grandtotal").value;
  total = parseInt(totalx) - parseInt(qty);
  document.getElementById("erm_eresepRWI_grandtotal").value = total;
  document.getElementById("verm_eresepRWI_grandtotal").innerHTML = format_ribuan(total);

  row.parentNode.removeChild(row);
  var no = 1;
  $('#erm_eresepRWItable_obatjadi tbody tr').each(function(){
    //$(this).find('td:nth-child(1)').html(no);
    $(this).find('td:nth-child(1)').html("<input style='text-align:center;' type='text' class='form-control form-control-xs' name='ermIrja_obtjadiurut[]' value='" + no + "' disabled>");
    $(this).find('td:nth-child(2)').html("<button type='button' class='btn btn-xs btn-danger' onclick='hapusbaris_obatjadi(this, "+no+")' id='hapusbaris_obatjadi" + no + "' style='width:100%'><i class='fa fa-times'></i></button><button type='button' class='btn btn-xs btn-outline-warning' onclick='editbaris_obatjadi(this, "+no+")' id='editbaris_obatjadi" + no + "' style='width:100%'><i class='fa fa-edit'></i></button>");
    no++;
  });

}

/*function tampilkan_isi_obatjdi2(kd_obat, nm_obat, qty, signa, ket){
  //$('#erm_eresepRWItable_obatjadi tbody').html('');
  var nomor = $('#erm_eresepRWItable_obatjadi tbody tr').length + 1;  
  var Baris = '';
      Baris += '<tr ondblclick="">';
      Baris += '<td>'+nomor+'</td>';
      Baris += "<td style='display: grid;align-content: space-around;'><button type='button' class='btn btn-xs btn-danger' id='ermIrja_obtjadidelete" + nomor + "' ><i class='fa fa-times'></i></button></td>";
      Baris += "<td>";
      Baris += "<input type='text' class='form-control form-control-xs' name='ermIrja_obtjadikd_obat[]' id='ermIrja_obtjadikd_obat" + nomor + "'  disabled>";
      Baris += "</td>";
      Baris += "<td>";
      Baris += "<input type='text' class='form-control form-control-xs' name='ermIrja_obtjadinm_obat[]' id='ermIrja_obtjadinm_obat" + nomor + "'  disabled>";
      Baris += "</td>";
      Baris += "<td>";
      Baris += "<input type='text' class='form-control form-control-xs' name='ermIrja_obtjadiqty[]' id='ermIrja_obtjadiqty" + nomor + "'  disabled>";
      Baris += "</td>";
      Baris += "<td>";
      Baris += "<input type='text' class='form-control form-control-xs' name='ermIrja_obtjadisigna[]' id='ermIrja_obtjadisigna" + nomor + "'  disabled>";
      Baris += "</td>";
      Baris += "<td>";
      Baris += "<input type='text' class='form-control form-control-xs' name='ermIrja_obtjadiket[]' id='ermIrja_obtjadiket" + nomor + "'  disabled>";
      Baris += "</td>";
      // Baris += '<td>'+kd_satuan+'</td>';
      Baris += "</tr>";
  
  $("#ermIrja_obtjadidelete" + nomor).click(function(event) {
    $(this).parent().parent().remove();
    var no = 1;
    $('#erm_eresepRWItable_obatjadi tbody tr').each(function(){
      $(this).find('td:nth-child(1)').html(no);
      no++;
    });
    //mod_RWIPenatajasa_deleteProduk(RWIid_tindakan, RWInm_prd);
  });
  //var a = document.getElementsByName('ermIrja_obtjadiqty[]');  
  var kd_obatk = document.getElementsByName('ermIrja_obtjadikd_obat[]');  
  var jmlObat  = $('#erm_eresepRWItable_obatjadi tbody tr').length;  
  let total = 0
  const datax   = [];
  for(var i = 0, iLen = jmlObat ; i < iLen; i++){

    //total+=Number(a[i].value);
    var data = {};
    data.name = kd_obatk[i].value;
    
    //console.log(data);
    datax.push(data);        
    //document.getElementById("erm_eresepRWI_grandtotal").value = total;
    document.getElementById("verm_eresepRWI_grandtotal").innerHTML = format_ribuan(total);
  }  
  // console.log(datax);
  // console.log(JSON.stringify(datax));
  const names = datax.map(el => el.name); // returns ['frog', 'monkey', 'gorilla', 'lion']
  const status_kd_obatk = names.includes(kd_obat); // returns true
  console.log(status_kd_obatk);
  // const jungle = [
  //   { name: "frog", threat: 0 },
  //   { name: "monkey", threat: 5 },
  //   { name: "gorilla", threat: 8 },
  //   { name: "lion", threat: 10 }
  // ];

  if (status_kd_obatk == false){
    $('#erm_eresepRWItable_obatjadi tbody').append(Baris);

    $("#ermIrja_obtjadikd_obat" + nomor).val(kd_obat);
    $("#ermIrja_obtjadinm_obat" + nomor).val(nm_obat);
    $("#ermIrja_obtjadiqty" + nomor).val(qty);
    $("#ermIrja_obtjadisigna" + nomor).val(signa);
    $("#ermIrja_obtjadiket" + nomor).val(ket);

  }else{
    toastr.error("Obat Sudah Diinputkan!!");
  }
  // console.log(names.indexOf("lion"));
  //console.log(jungle);

}
*/
function tampilkan_isi_obatracik(kd_obat, nm_obat, dosis, qty, ket){/* ???? */
  var nomor = $('#erm_eresepRWItable_obatracik tbody tr').length + 1;  
  var Baris = '';
      Baris += '<tr>';
      Baris += "<td class='pl-0'>";
      Baris += "<input style='text-align:center;' type='text' class='form-control form-control-xs' name='ermIrja_obtracikurut[]' value='" + nomor + "' disabled>";
      Baris += "</td>";
      Baris += "<td style='display: grid;align-content: space-around;'><button type='button' class='btn btn-xs btn-danger' onclick='hapusbaris_obatracik(this, "+nomor+")' ><i class='fa fa-times'></i></button></td>";
      Baris += "<td>";
      Baris += "<input type='text' class='form-control form-control-xs' name='ermIrja_obtracikkd_obat[]' value='" + kd_obat + "' disabled>";
      Baris += "</td>";
      Baris += "<td>";
      Baris += "<input type='text' class='form-control form-control-xs' name='ermIrja_obtraciknm_obat[]' value='" + nm_obat + "' disabled>";
      Baris += "</td>";
      Baris += "<td>";
      Baris += "<input type='text' class='form-control form-control-xs' name='ermIrja_obtracikdosis[]' value='" + dosis + "' disabled>";
      Baris += "</td>";
      Baris += "<td>";
      Baris += "<input type='text' class='form-control form-control-xs' name='ermIrja_obtracikqty[]' value='" + qty + "' disabled>";
      Baris += "</td>";
      Baris += "<td>";
      Baris += "<input type='text' class='form-control form-control-xs' name='ermIrja_obtracikket[]' value='" + ket + "' disabled>";
      Baris += "</td>";      
      Baris += "</tr>";

  //$('#erm_eresepRWItable_obatracik tbody').append(Baris);
  var getkd_obatx = document.getElementsByName('ermIrja_obtracikkd_obat[]');
  
  var jmlObat   = $('#erm_eresepRWItable_obatracik tbody tr').length;
  let total     = 0;
  const data    = [];  
  for(var i = 0, iLen = jmlObat ; i < iLen; i++){
    //PROSES ARRAY PENGECEKAN KODE OBAT
    var datax = {};
    datax.kd_obat  = getkd_obatx[i].value;
    data.push(datax);
  }

  const cekkd_obat = data.map(el => el.kd_obat); // returns ['00007414', '00000019', '00000017']
  const status_kd_obatk = cekkd_obat.includes(kd_obat); // returns true
  //console.log(status_kd_obatk);

  if (status_kd_obatk == false){
    $('#erm_eresepRWItable_obatracik tbody').append(Baris);
    
    sessionStorage_Racikan();
  }else{
    toastr.error("Obat Sudah Diinputkan!!");
  }  
}

function sessionStorage_Racikan(){/* ???? */
  var getkd_obat = document.getElementsByName('ermIrja_obtracikkd_obat[]');
  var getnm_prd = document.getElementsByName('ermIrja_obtraciknm_obat[]');
  var getdosis  = document.getElementsByName('ermIrja_obtracikdosis[]');
  var getqty    = document.getElementsByName('ermIrja_obtracikqty[]');
  var getket    = document.getElementsByName('ermIrja_obtracikket[]');
  var geturut   = document.getElementsByName('ermIrja_obtracikurut[]');
  var count     = $('#erm_eresepRWItable_obatracik tbody tr').length;
  
  const params    = [];  
  
  for(var i = 0, iLen = count ; i < iLen; i++){
    var x = {};
    x.urut    = geturut[i].value;
    x.kd_obat  = getkd_obat[i].value;
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

function hapusbaris_obatracik(btn, nomor){/* ???? */
  var row = btn.parentNode.parentNode;
  
  let total   = 0;
  var qty     = document.getElementById("erm_eresepRWItable_obatracik").rows[nomor].cells[5].firstChild.value;
  var totalx  = document.getElementById("erm_eresepRWI_grandtotal").value;
  total = parseInt(totalx) - parseInt(qty);
  document.getElementById("erm_eresepRWI_grandtotal").value = total;
  document.getElementById("verm_eresepRWI_grandtotal").innerHTML = format_ribuan(total);

  row.parentNode.removeChild(row);
  sessionStorage_Racikan();
  var no = 1;
  $('#erm_eresepRWItable_obatracik tbody tr').each(function(){
    $(this).find('td:nth-child(1)').html("<input style='text-align:center;' type='text' class='form-control form-control-xs' name='ermIrja_obtracikurut[]' value='" + no + "' disabled>");
    $(this).find('td:nth-child(2)').html("<button type='button' class='btn btn-xs btn-danger' onclick='hapusbaris_obatracik(this, "+no+")' ><i class='fa fa-times'></i></button>");
    no++;
  });
}

function tampilkan_isi_obatracik_jenisracikan(nma_racikan, byk_racikan, id_sig_rac, sig_racikan, ket_racikan){/* ???? */  
  
  var Nomor = $('#erm_eresepRWItable_obatracik_jenisracikan tbody tr').length + 1;
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
     Baris += "<td>"+Nomor+"</td>";
     Baris += '<td style="display: flex; justify-content: left;"><button type="button" class="btn btn-xs btn-warning" title="Tampilkan '+ nama_racikan+'" onclick="tampilkan_jenisracik('+"'"+Nomor+"','"+nma_racikan+"','"+byk_racikan+"','"+sig_racikan+"','"+ket_racikan+"','"+x+"'"+')"><i class="fa fa-arrow-up"></i></button>&nbsp;<button type="button" class="btn btn-xs btn-danger" onclick="hapus_jenisracik(this, '+"'"+Nomor+"','"+nma_racikan+"','"+byk_racikan+"','"+sig_racikan+"','"+ket_racikan+"','"+nama_racikan+"'"+')"><i class="fa fa-times"></i></button></td>';
     Baris += "<td hidden>"+Nomor+"</td>";
     Baris += "<td>";
     Baris += "<input type='text' class='form-control form-control-xs' name='ermIrja_nma_jenisracikan[]' value='" + nama_racikan +"' disabled>";
     Baris += "</td>";
     Baris += "<td hidden><input type='text' class='form-control form-control-xs' name='ermIrja_nma_byk_racikan[]' value='" + byk_racikan +"' disabled></td>";
     Baris += "<td hidden><input type='text' class='form-control form-control-xs' name='ermIrja_nma_idsig_racikan[]' value='" + id_sig_rac +"' disabled></td>";
     Baris += "<td hidden><input type='text' class='form-control form-control-xs' name='ermIrja_nma_sig_racikan[]' value='" + sig_racikan +"' disabled></td>";
     Baris += "<td hidden><input type='text' class='form-control form-control-xs' name='ermIrja_nma_ket_racikan[]' value='" + ket_racikan +"' disabled></td>";
     Baris += "</tr>";
  
  $('#erm_eresepRWItable_obatracik_jenisracikan tbody').append(Baris);
  $('#erm_eresepRWI_infojenis_racikan').html('<i class="fa fa-check"></i> '+nama_racikan);

  sessionStorage[nama_racikan] = '[{"urut":"1","kd_obat":"kosong","nm_prd":"","dosis":"","qty":"","ket":""}]';
  sessionStorage['RACIK_'+nama_racikan] = '[{"racikan":"'+nama_racikan+'","qty":"'+byk_racikan+'","idsigna":"'+id_sig_rac+'","signa":"'+sig_racikan+'","ket":"'+ket_racikan+'"}]';
}

function tampilkan_jenisracik(Nomor, nma_racikan, byk_racikan, sig_racikan, ket_racikan, x){/* ???? */
  nama_racikan = x;
  document.getElementById("erm_eresepRWI_nmaracikan").value   = nma_racikan;
  document.getElementById("erm_eresepRWI_bnykracikan").value  = byk_racikan;
  document.getElementById("erm_eresepRWI_signaracikan").value = sig_racikan;
  document.getElementById("erm_eresepRWI_ketracikan").value   = ket_racikan;

  $('#erm_eresepRWI_infojenis_racikan').html('<i class="fa fa-check"></i> '+nama_racikan);  
  $('#erm_eresepRWI_inputan_obat_racik2').show();
  $("#erm_eresepRWI_obat_racik_nmaobat").trigger('focus');
  disabledObatJenisRacikRWI();
  //kosongObatRacikRWI();
  //console.log(sessionStorage.getItem(nama_racikan));
  var storedArray_ObatRacik = JSON.parse(sessionStorage.getItem(nama_racikan));
  //console.log(storedArray_ObatRacik);
  
  $('#erm_eresepRWItable_obatracik tbody').html('');
  
  var i;
  for (i = 0; i < storedArray_ObatRacik.length; i++) {
    var kd_obat  = storedArray_ObatRacik[i].kd_obat;
    if (kd_obat != 'kosong'){
      var nm_obat = storedArray_ObatRacik[i].nm_prd;
      var dosis   = storedArray_ObatRacik[i].dosis;
      var qty     = storedArray_ObatRacik[i].qty;
      var ket     = storedArray_ObatRacik[i].ket;
      tampilkan_isi_obatracik(kd_obat, nm_obat, dosis, qty, ket);
    }
    //console.log(kd_obat, nm_obat, dosis, qty, ket);
  }
  
}

function hapus_jenisracik(btn, Nomor, nma_racikan, byk_racikan, sig_racikan, ket_racikan, nama_racikan){/* ???? */
  var session_nama_racikan = nama_racikan;

  var row = btn.parentNode.parentNode;
  row.parentNode.removeChild(row);
  
  //PROSES GET TOTAL QTY OBAT RACIK
  // CARA 2 => let count     =  Object.keys(JSON.parse(sessionStorage.getItem(session_nama_racikan))).length;
  let count     = JSON.parse(sessionStorage.getItem(session_nama_racikan));
  let xtotal    = 0;
  var i;
  for (i = 0; i < count.length; i++) {
    var kd_obat  = count[i].kd_obat;
    if (kd_obat != 'kosong'){
      let hrgaobat     = count[i].qty;
      xtotal += Number(hrgaobat);
    }
  }
  
  var totalx = document.getElementById("erm_eresepRWI_grandtotal").value;
  total = parseInt(totalx) - parseInt(xtotal);
  document.getElementById("erm_eresepRWI_grandtotal").value = total;
  document.getElementById("verm_eresepRWI_grandtotal").innerHTML = format_ribuan(total);

  var no = 1;
  $('#erm_eresepRWItable_obatracik_jenisracikan tbody tr').each(function(){
    $(this).find('td:nth-child(1)').html(no);
    no++;
  });

  sessionStorage.removeItem(session_nama_racikan);
  sessionStorage.removeItem('RACIK_'+session_nama_racikan);
  $('#erm_eresepRWItable_obatracik tbody').html('');
  tabrwj_resep_obatracikRWI();
  enabledObatJenisRacikRWI();
  $("#erm_eresepRWI_nmaracikan").trigger('focus');
}

function tabrwj_resep_obatjadiRWI(){
  $('#erm_eresepRWI_inputan_obat_jadi').show();
  $('#erm_eresepRWI_inputan_obat_racik').hide();
  $('#erm_eresepRWI_inputan_obat_racik1').hide(); 
  $('#erm_eresepRWI_inputan_obat_racik2').hide(); 
  $('#erm_eresepRWI_penentu_resepobat').val(0);
  $("#erm_eresepRWI_obatjadi_nm").trigger('focus');
}

function tabrwj_resep_obatracikRWI(){
  $('#erm_eresepRWI_inputan_obat_jadi').hide();
  $('#erm_eresepRWI_inputan_obat_racik').show(); 
  $('#erm_eresepRWI_inputan_obat_racik1').show(); 
  $('#erm_eresepRWI_inputan_obat_racik2').hide(); 
  $('#erm_eresepRWI_penentu_resepobat').val(1);  
  kosongObatJenisRacikRWI();
  $("#erm_eresepRWI_nmaracikan").trigger('focus');
}

function keluarmodal_erm_eresepRWI() {
  $('#modal_erm_eresepRWI').modal('hide');
  $('.modal-backdrop').hide();
  sessionStorage.clear();
}

function erm_eresepRWI_kembalikeawal(){
  var idresep = document.getElementById("erm_eresepRWI_idresep").value;
  if (idresep == ''){    
    pertanyaan.fire({
      title             : 'Kembali ke menu awal',
      html              : '<span>Data Input Resep Belum diSimpan, Data yang sudah dientry akan hilang, tetap kembali ?</span>',
      icon              : 'question',
      showCancelButton  : true,
      reverseButtons    : false,
      allowOutsideClick : false
    }).then((result) => {
      if (result.isConfirmed) {
        keluarmodal_erm_eresepRWI();
      }else if(result.dismiss === Swal.DismissReason.cancel){
        
      }
    })
  }else{
    keluarmodal_erm_eresepRWI();
  }
}

function erm_eresepRWI_hpus_order(){
  var idresep = document.getElementById("erm_eresepRWI_idresep").value;
  if (idresep != ''){    
    pertanyaan.fire({
      title             : 'Hapus Order Resep RJ',
      html              : '<span>Yakin dihapus ?</span>',
      icon              : 'question',
      showCancelButton  : true,
      reverseButtons    : false,
      allowOutsideClick : false
    }).then((result) => {
      if (result.isConfirmed) {
        var param = {
          id_peg    : user['id_pegawai'],
          id_order  : idresep,
          user      : user['id_user'],
          tglorder  : document.getElementById("erm_eresepRWI_tglresep").value,
        };

        apiPOST('Apotek/HapusOrderEresepRJ', param, hasil => {
          if (hasil !== null) {
            sessionStorage.clear();
            var penentu = $('#erm_eresepRWI_penentu_resepobat').val(1);  

            if(penentu != 0){ // OBAT RACIK
              tabrwj_resep_obatracikRWI();
              enabledObatJenisRacikRWI();
            }else{
              tabrwj_resep_obatjadiRWI();
            }
            
            $('#erm_eresepRWItable_obatjadi tbody').html('');
            $('#erm_eresepRWItable_obatracik_jenisracikan tbody').html('');
            $('#erm_eresepRWItable_obatracik tbody').html('');
            document.getElementById("erm_eresepRWI_idresep").value  = '';
            document.getElementById("erm_eresepRWI_diagnosa").value = '';
            document.getElementById("erm_eresepRWI_iter").value     = '';
            document.getElementById("erm_eresepRWI_grandtotal").value = '0';
            document.getElementById("verm_eresepRWI_grandtotal").innerHTML = '0';

            document.getElementById("erm_eresepRWI_status_order_belumterkirim").hidden  = false;
            document.getElementById("erm_eresepRWI_status_order_terkirim").hidden       = true;
            document.getElementById("erm_eresepRWI_status_dilayanifalse").hidden        = false; 
            document.getElementById("erm_eresepRWI_status_dilayanitrue").hidden         = true;
          }
        });
      }else if(result.dismiss === Swal.DismissReason.cancel){
        
      }
    })
  }
}

function params_SimpanObatJadiRWI(){  
  var getkd_obat = document.getElementsByName('ermIrja_obtjadikd_obat[]');
  var getnm_prd = document.getElementsByName('ermIrja_obtjadinm_obat[]');
  var getqty    = document.getElementsByName('ermIrja_obtjadiqty[]');
  var getidsig  = document.getElementsByName('ermIrja_obtjadiidsigna[]');
  var getsigna  = document.getElementsByName('ermIrja_obtjadisigna[]');
  var getket    = document.getElementsByName('ermIrja_obtjadiket[]');
  var geturut   = document.getElementsByName('ermIrja_obtjadiurut[]');
  var count     = $('#erm_eresepRWItable_obatjadi tbody tr').length;
  
  // const params    = [];  
  var params = {};  
  params.data     = [];
  for(var i = 0, iLen = count ; i < iLen; i++){
    var x = {};
    x.kd_obat  = getkd_obat[i].value;
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
  //params.data       = JSON.stringify(params.data);
  //console.log(params);
  console.log(params.data);
  return params.data;
}

function params_SimpanObatRacikRWI(){

  var getNma      = document.getElementsByName('ermIrja_nma_jenisracikan[]');
  var getBnyk     = document.getElementsByName('ermIrja_nma_byk_racikan[]');
  var getIdSigna  = document.getElementsByName('ermIrja_nma_idsig_racikan[]');
  var getSigna    = document.getElementsByName('ermIrja_nma_sig_racikan[]');
  var getKet      = document.getElementsByName('ermIrja_nma_ket_racikan[]');
  var count       = $('#erm_eresepRWItable_obatracik_jenisracikan tbody tr').length;
  
  // const params    = [];  
  var params = {};  
  params.data     = [];
  for(var i = 0, iLen = count ; i < iLen; i++){
    var x = {};
    x.Nama  = getNma[i].value;
    x.Bnyk  = getBnyk[i].value;
    x.Signa = getIdSigna[i].value;
    x.Ket   = getKet[i].value;
    
    x.obat  = JSON.parse(sessionStorage.getItem(x.Nama));
    
      // var storedArray_ObatRacik = JSON.parse(sessionStorage.getItem(x.Nama));
      // var cetak = 0;
      // for(i = 0; i < x.obat.length; i++) {
      //   cetak += storedArray_ObatRacik[i];
      // }
    x.count = x.obat.length;

    params.data.push(x);
    //console.log(JSON.parse(sessionStorage.getItem(x.Nama)));
  }
  //params.data       = JSON.stringify(params.data);
  //console.log(params);
  console.log(params.data);
  return params.data;
}

function erm_eresepRWI_simpanorder(){
  $('#loading_modal_erm_eresepRWI').show();
  var param = {
    id_kunj       : id_kunjungan,
    id_unit       : id_unit,
    id_peg        : user['id_pegawai'],
    id_order      : document.getElementById("erm_eresepRWI_idresep").value,
    diag          : document.getElementById("erm_eresepRWI_diagnosa").value,
    iter          : document.getElementById("erm_eresepRWI_iter").value,
    user          : user['id_user'],
    data          : params_SimpanObatJadiRWI(),
    jmlObat       : $('#erm_eresepRWItable_obatjadi tbody tr').length,
    data_racik    : params_SimpanObatRacikRWI(),
    jmlObatRacik  : $('#erm_eresepRWItable_obatracik_jenisracikan tbody tr').length,
    tglorder      : document.getElementById('erm_eresepRWI_tglresep').value,
    
  };

  apiPOST('Apotek/CreateOrderResepRWJ', param, hasil => {
    if (hasil !== null) {
      document.getElementById("erm_eresepRWI_idresep").value = hasil['x'];
      // $('#loading_modal_erm_eresepRWI').hide();
    }
  });
}

function preview_detailObat(){  
    
  var json_data = {
    'id_kunjprevRWJ' : id_kunjungan,
    'tgl_kunjprevRWJ': tglkunj,
    'tgl_ordprevRWJ' : document.getElementById('erm_eresepRWI_tglresep').value,
    'nowdayprevRWJ'  : nowday,
    'no_rmprevRWJ'   : norm,
    'namaprevRWJ'    : nmapasien.replace(/ /g, '%20'),
    'umurprevRWJ'    : umur.replace(/ /g, '%20'),
    'alamatprevRWJ'  : alamat.replace(/ /g, '%20'),        
    'unitprevRWJ'    : unit.replace(/ /g, '%20'),
    'idresepRWJ'     : document.getElementById("erm_eresepRWI_idresep").value,
  };

  var myJSON = JSON.stringify(json_data);
  $('.rekammedisRWJ_eresepRWJ_preview').load('Apotek/preview_detailObat?data='+ myJSON);
  
}

/*
function erm_autocomplete_obat(){
    getObat_erm_eresepRWI2();
    $(".erm_eresepRWI_pencarian").select2({      
      placeholder: "Ketikan Nama Obat",
      allowClear: true,
      minimumInputLength: 4,
      templateResult: templateData,
      //templateSelection: formatRepoSelection,
      delay: 250,
      processResults: function (data, params) {
        params.page = params.page || 1;

        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      },
      cache: true,
    }); 
}

function templateData (repo){
  if (repo.loading) {
    return repo.text;
  }

  var kd_obat      = $(repo.element).data('anag');
  var nm_obat     = $(repo.element).data('col1');
  var kd_sat      = $(repo.element).data('col2');
  var fractions   = $(repo.element).data('col3');
  var keg_obt     = $(repo.element).data('col4');
  
  var $container = $(
    "<div class='select2-result-repository clearfix'>" +      
      "<div class='select2-result-repository__meta'>" +
      "<div class='row'>" +
        "<div class='col-sm-2 select2-result-repository__title'></div>" +
        "<div class='col-sm-10 select2-result-repository__description'></div>" +
      "</div>" +
        "<div class='select2-result-repository__statistics' style='display:flex; justify-content: space-between; flex-direction: row;'>" +
          "<div class='select2-result-repository__forks'><i class='fa fa-pencil'></i> </div>" +
          "<div class='select2-result-repository__stargazers'><i class='fa fa-heart'></i> </div>" +
          "<div class='select2-result-repository__watchers'><i class='fa fa-check'></i> </div>" +
        "</div>" +
      "</div>" +
    "</div>"
  );

  $container.find(".select2-result-repository__title").text(kd_obat);
  $container.find(".select2-result-repository__description").text(nm_obat);
  $container.find(".select2-result-repository__forks").append(" "+ kd_sat);
  $container.find(".select2-result-repository__stargazers").append(" "+fractions);
  $container.find(".select2-result-repository__watchers").append(" "+keg_obt);  

  return $container;
}
*/
</script>
