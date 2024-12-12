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
  $iddokter     = str_replace('"','', json_encode($data->veresepRWJ_APT_iddokter));
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
              <td><input type="date" class="form-control form-control-xs" id="eresepRWIAPT_vi_tglorder"></td>
            </tr>
            <tr>
              <td width="70">Tgl. Resep.</td>
              <td>:</td>
              <td><input type="date" class="form-control form-control-xs" id="eresepRWIAPT_vi_tglresep"></td>
            </tr>
            <tr>
              <td>No. Resep</td>
              <td>:</td>
              <td>
                <div class="input-group col-sm-12 p-0">
                  <input type="text" class="form-control form-control-xs" id="eresepRWIAPT_vi_noresep" disabled>
                  <div class="input-group-prepend">
                    <button type="button" class="btn btn-outline-danger btn-xs" onclick="eresepRWIAPT_hapusresepRWIAPT()" id="eresepRWIAPT_hapusresepRWIAPT"><i class="fa fa-trash"></i></button>
                  </div>
                </div>
              </td>
            </tr> 
            <tr>
              <td>Dokter</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="eresepRWIAPT_vi_dokter" disabled></td>
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
              <td><input type="date" class="form-control form-control-xs" id="eresepRWIAPT_vi_tglkunj" disabled></td>
            </tr>
            <tr>
              <td width="70">No. RM</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="eresepRWIAPT_vi_norm" disabled></td>
            </tr>
            <tr>
              <td>Nama</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="eresepRWIAPT_vi_nama" disabled></td>
            </tr>
            <tr>
              <td>Umur</td> 
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="eresepRWIAPT_vi_umur" disabled></td>
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
                <select class="form-control form-control-xs" id="eresepRWIAPT_vi_penjamin" name="eresepRWIAPT_vi_penjamin" onchange="changePenjamin_RWIAPT();"></select>
              </td>
            </tr>
            <tr>
              <td width="70">SEP</td>
              <td>:</td>
              <td>
                <select class="form-control form-control-xs" id="eresepRWIAPT_vi_sep" name="eresepRWIAPT_vi_sep" disabled>
              </td>
            </tr>
            <tr>
              <td>Telp</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="eresepRWIAPT_vi_telp" disabled></td>
            </tr>
            <tr>
              <td>Unit</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="eresepRWIAPT_vi_unit" disabled></td>
            </tr>
          </table>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-12 p-1">
        <div class="info-box mb-0">
          <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
            <!-- <tr>
              <td class="pl-2 pt-1" colspan="3">
                <div>
                  <input type="checkbox" id="eresepRWIAPT_vi_rseplangsung" name="eresepRWIAPT_vi_rseplangsung" onclick="showModalPasienKunjunganLangsung(eresepRWIAPT_kunjLangsung);"/>
                  <label for="eresepRWIAPT_vi_rseplangsung">Resep Langsung</label>
                </div>
              </td>
            </tr> -->
            <tr>
              <td>Cat. Alergi</td>
              <td>:</td>
              <td colspan="2"><textarea class="form-control pt-0 pl-1" rows="3" id="eresepRWIAPT_vi_cat_alergi" style="height:113px;"></textarea></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <div class="card card-row">
      <div class="overlay-wrapper" id="loading_modal_eresepRWIAPT">
        <div class="overlay dark">
          <i class="fas fa-3x fa-sync-alt fa-spin" style="position: absolute; top: 111px;"></i>
        </div>
      </div>

      <div class="card-header p-1 darkgrey-custom">
        <!-- <h6 class="hr6-custom"><i class="fas fa-heartbeat"></i> Resep Rawat Jalan / Gawat Darurat</h6> -->
        <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="eresepRWIAPT_modaldaftarobat()" id="eresepRWIAPT_btn_daftarobat"><i class="fa fa-plus"></i> Tambah Obat</button>
        <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="eresepRWIAPT_simpanobatin()" id="eresepRWIAPT_btn_simpanobat"><i class="fa fa-save"></i> Simpan</button>
        <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="eresepRWIAPT_prevObat()" id="eresepRWIAPT_btn_prevobat">
          <i class="fa fa-eye"></i> Preview Obat</button>
        <div class="btn-group">
          <button type="button" class="btn bg-gradient-secondary btn-xs"><i class="fa fa-print"></i> Cetak</button>
          <button type="button" class="btn bg-gradient-secondary btn-xs dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
            <span class="sr-only"></span>
          </button>
          <div class="dropdown-menu" role="menu" style="">
            <a class="dropdown-item" href="#" onclick="cetakRWI_Bill()"><span><i class="fa fa-print"></i> Cetak Bill Resep</span></a>
            <a class="dropdown-item" href="#" onclick="cetaketiketRWI_ObatDalam()"><span><i class="fa fa-print"></i> Cetak Etiket Obat Dalam</span></a>
            <a class="dropdown-item" href="#" onclick="cetaketiketRWI_ObatLuar()"><span><i class="fa fa-print"></i> Cetak Etiket Obat Luar</span></a>
          </div>
        </div>
        <button type="button" class="btn btn-warning btn-xs" onclick="eresepRWIAPT_transferObat()" id="eresepRWIAPT_btn_transferobat"><i class="fa fa-magic"></i> Transfer</button>
        <button type="button" class="btn btn-outline-danger btn-xs" onclick="eresepRWIAPT_kembalikeawal()"><i class="fa fa-arrow-left"></i> Kembali</button>
        <button type="button" class="btn btn-info btn-xs" onclick="eresepRWIAPT_refresh()"><i class="fa fa-sync-alt fa-spin"></i> Refresh Data</button>
        <button type="button" class="btn btn-success btn-xs" onclick="eresepRWIAPT_telaahresep()"><i class="fa fa-check"></i> Telaah Resep</button>
        <button type="button" class="btn btn-danger btn-xs" onclick="eresepRWIAPT_hapusorder()"><i class="fa fa-trash"></i> Hapus Order</button>
        <input type="number" class="form-control form-control-xs" id="eresepRWIAPT_penentu_resepobat" value="0" disabled hidden>
        <input type="number" class="form-control form-control-xs" id="eresepRWIAPT_penentu_telaahobat" value="0" disabled hidden>

      </div>
      <div class="modal-body p-1">
        <div class="card-body p-0">
          <ul class="nav nav-tabs" id="eresepRWIAPT_custom-content-above-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="pill" href="#eresepRWIAPT_obatjadi" role="tab" aria-selected="true" onclick="tab_eresepRWIAPT_obatjadi();">Obat Jadi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="pill" href="#eresepRWIAPT_obatracik" role="tab" aria-selected="true" onclick="tab_eresepRWIAPT_obatracik();">Obat Racik</a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn-danger" data-toggle="pill" href="#" role="tab" aria-selected="true" id="eresepRWIAPT_infojenis_racikan" style="font-weight: bold; color: white;">-</a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn-danger" id="eresepRWIAPT_infojenis_racikan_2" style="display: none;"></a>
            </li>
          </ul>

          <div class="tab-content" id="eresepRWIAPT_custom-content-above-tabContent">
            <div class="tab-pane p-0 fade active show" id="eresepRWIAPT_obatjadi" role="tabpanel">
              <div class="col-sm-12 p-0" style="overflow-x: hidden; height:100vh; top: 0; position: sticky;">
                <div class="row mb-1" id="eresepRWIAPT_inputan_obat_jadi">
                  <div class="input-group col-sm-3">
                    <input type="text" class="form-control form-control-xs" id="eresepRWIAPT_obatjadi_urut" disabled hidden>
                    <input type="text" class="form-control form-control-xs" id="eresepRWIAPT_obatjadi_kdobat" disabled hidden>
                    <div class="input-group-prepend">
                      <span class="input-group-text form-control-xs">Nama</span>
                    </div>
                    <input type="search" class="form-control form-control-xs" id="eresepRWIAPT_obatjadi_nm" autocomplete="off" disabled>
                  </div>
                  <div class="col-sm-1">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text form-control-xs">Qty</span>
                      </div>              
                      <input type="number" class="form-control form-control-xs" id="eresepRWIAPT_obatjadi_qty">
                    </div>
                  </div>
                  <div class="input-group col-sm-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text form-control-xs">Signa</span>
                    </div>
                    <input type="search" class="form-control form-control-xs" id="eresepRWIAPT_obatjadi_signa" autocomplete="off" disabled>
                  </div>
                  <div class="input-group col-sm-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text form-control-xs">Exp</span>
                    </div>
                    <input type="date" class="form-control form-control-xs" id="eresepRWIAPT_obatjadi_expired" disabled>
                  </div>
                  <div class="input-group col-sm-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text form-control-xs">Ket.</span>
                    </div>
                    <input type="text" class="form-control form-control-xs" id="eresepRWIAPT_obatjadi_ket" disabled>
                    <div class="input-group-prepend">
                      <button type="button" class="btn btn-primary btn-xs" id="eresepRWIAPT_btn_check_obatjadi" disabled><i class="fa fa-check"></i></button>
                      <button type="button" class="btn btn-outline-primary btn-xs" onclick="eresepRWIAPT_kosongObatJadi()"><i class="fa fa-file"></i> Baru</button>
                    </div>
                  </div>
                  
                </div> 
                <table border="0" cellpadding="0" cellspacing="0" id="eresepRWIAPTtable_obatjadi" class="table table-striped table-sm choose">
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
            <div class="tab-pane p-0 fade" id="eresepRWIAPT_obatracik" role="tabpanel">
              <div class="col-sm-12 p-0" style="overflow-x: hidden; height:100vh; top: 0; position: sticky;">
                <div class="mb-1" id="eresepRWIAPT_inputan_obat_racik">
                  <div class="row" id="eresepRWIAPT_inputan_obat_racik1">
                    <div class="input-group col-sm-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text form-control-xs">Racikan</span>
                      </div>
                      <input type="search" class="form-control form-control-xs" placeholder="Ketikkan Nama Racikan" id="eresepRWIAPT_nmaracikan" autocomplete="off">
                    </div>
                    <div class="input-group col-sm-2">
                      <div class="input-group-prepend">
                        <span class="input-group-text form-control-xs">Banyak</span>
                      </div>
                      <input type="number" class="form-control form-control-xs" id="eresepRWIAPT_bnykracikan">
                    </div> 
                    <div class="input-group col-sm-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text form-control-xs">Signa</span>
                      </div>
                      <input type="search" class="form-control form-control-xs" id="eresepRWIAPT_signaracikan" autocomplete="off">
                    </div>
                    
                    <div class="input-group col-sm-2">
                      <div class="input-group-prepend">
                        <span class="input-group-text form-control-xs">Ket.</span>
                      </div>
                      <input type="text" class="form-control form-control-xs" id="eresepRWIAPT_ketracikan">
                    </div>

                    <div class="input-group col-sm-2">
                      <button type="button" class="btn btn-outline-primary btn-xs" onclick="eresepRWIAPT_mulaiawalRacikan()"><i class="fa fa-file"></i> Baru</button>
                      <button type="button" class="btn btn-warning btn-xs" id="eresepRWIAPT_editRacikan" onclick="eresepRWIAPT_editRacikan()" disabled><i class="fa fa-edit"></i> Edit Racikan</button>
                      <input type="text" class="form-control form-control-xs" id="eresepRWIAPT_flexracik" value="0" disabled style="display: none;">
                      <input type="text" class="form-control form-control-xs" id="eresepRWIAPT_urutracik" value="0" disabled style="display: none;">
                    </div>

                  </div>
                  <hr class="mt-2 mb-2" width="95%">
                  <div class="row" id="eresepRWIAPT_inputan_obat_racik2">
                    <div class="input-group col-sm-3">
                      <input type="text" class="form-control form-control-xxs" id="eresepRWIAPT_obat_racik_urut" disabled hidden>
                      <input type="text" class="form-control form-control-xs" id="eresepRWIAPT_obat_racik_kdobat" disabled hidden>
                      <div class="input-group-prepend">
                        <span class="input-group-text form-control-xs">Nama</span>
                      </div>
                      <input type="text" class="form-control form-control-xs" id="eresepRWIAPT_obat_racik_nmaobat" disabled>
                    </div>
                    <div class="input-group col-sm-2">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text form-control-xs">Dosis</span>
                        </div>
                        <input type="number" class="form-control form-control-xs" id="eresepRWIAPT_obat_racik_dosis">
                      </div>
                    </div>
                    <div class="input-group col-sm-2">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text form-control-xs">Banyak</span>
                        </div>
                        <input type="number" class="form-control form-control-xs" id="eresepRWIAPT_obat_racik_qty">
                      </div>
                    </div>
                    <div class="input-group col-sm-2">
                      <div class="input-group-prepend">
                        <span class="input-group-text form-control-xs">Exp</span>
                      </div>
                      <input type="date" class="form-control form-control-xs" id="eresepRWIAPT_obat_racik_exp" disabled>
                    </div>
                    <div class="input-group col-sm-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text form-control-xs">Ket.</span>
                      </div>
                      <input type="text" class="form-control form-control-xs" id="eresepRWIAPT_obat_racik_ket">
                      <div class="input-group-prepend">
                        <button type="button" class="btn btn-outline-primary btn-xs" id="eresepRWIAPT_btn_check_obatracik"><i class="fa fa-check"></i> Pilih</button>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="row p-1">
                  <div class="col-sm-3" style="overflow: hidden;">
                    <table border="0" cellpadding="0" cellspacing="0" id="eresepRWIAPTtable_obatracik_jenisracikan" class="table table-striped table-sm choose">
                    <thead>
                      <tr>
                        <th class="pl-0" width="30" style="text-align:center;">#</th>
                        <th width="50"></th>
                        <th>Racikan</th>
                        <!-- <th width="50">Banyak</th>
                        <th width="100">IdSigna</th>
                        <th width="100">Signa</th>
                        <th width="100">Keterangan</th> -->
                      </tr>
                    </thead>
                    <tbody></tbody>
                    </table>
                  </div>
                  <div class="col-sm-9">
                    <table border="0" cellpadding="0" cellspacing="0" id="eresepRWIAPTtable_obatracik" class="table table-striped table-sm choose">
                    <thead>
                      <tr>
                        <th class="pl-0" width="30" style="text-align:center;">#</th>
                        <th width="80"></th>
                        <th width="60">Kd. Obat</th>
                        <th>Nama Obat</th>
                        <th width="60">Dosis</th>
                        <th class="pl-0" width="60">Qty</th>
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

      <div class="card-footer p-1 darkgrey-custom" style="border-top: 1px solid; bottom: 40px; position: sticky;">
        <div class="row" style="justify-content: right; font-weight: bold;">
          <div class="input-group col-sm-2">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text form-control-xs">PPn.&nbsp;</span>
              </div>
              <input type="text" class="form-control form-control-xs" id="eresepRWIAPT_ppn" value="0" style="font-size: 15px; font-weight: bold; text-align: right;" readonly>
            </div>
          </div>
          <div class="input-group col-sm-2">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text form-control-xs">Rp.&nbsp;</span>
              </div>
              <h4 id="veresepRWIAPT_hargaTotal" name="veresepRWIAPT_hargaTotal" hidden></h4>
              <input type="text" class="form-control form-control-xs" id="eresepRWIAPT_hargaTotal" value="0" style="font-size: 15px; font-weight: bold; text-align: right;" readonly>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script type="text/javascript">
$('.listeresepRjRIIGD_content').show();
//$('#loading_modal_eresepRWIAPT').hide();

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
var iddokter   = "<?php echo $iddokter; ?>";
var dokter     = "<?php echo $dokter; ?>";
var eresepRWIAPT_kd_signaObatJadi;
var eresepRWIAPT_kd_signaObatRacik;
var eresepRWIAPT_kd_JenisRacikan;
var liveresepRWIAPT_check = '0';
var nama_racikan;
var stok_unit = '0';
var eresepRWIAPT_obatjadi_harga;
var eresepRWIAPT_obatjadi_hargasat;
var eresepRWIAPT_obatracik_harga;
var eresepRWIAPT_obatracik_hargasat;
var nosjp = [];
var paramIdPenjaminnosjp = ['id_penjamin', 'no_sjp', 'no_sjp'];
var id_kunjungan_far = '0';

document.getElementById('eresepRWIAPT_vi_tglorder').value   = tgl_ord;
document.getElementById('eresepRWIAPT_vi_tglresep').value   = nowday;
document.getElementById('eresepRWIAPT_vi_tglkunj').value    = tglkunj;
document.getElementById('eresepRWIAPT_vi_noresep').value    = '';
document.getElementById('eresepRWIAPT_vi_dokter').value     = dokter;
document.getElementById('eresepRWIAPT_vi_norm').value       = norm;
document.getElementById('eresepRWIAPT_vi_nama').value       = nmapasien;
document.getElementById('eresepRWIAPT_vi_umur').value       = Umur(umur);
//document.getElementById('eresepRWIAPT_vi_penjamin').value   = penjamin;
document.getElementById('eresepRWIAPT_vi_telp').value       = telp;
document.getElementById('eresepRWIAPT_vi_unit').value       = unit;

var eresepRWIAPT_vi_tglresep  = "eresepRWIAPT_vi_tglresep";
var eresepRWIAPT_vi_tglkunj   = "eresepRWIAPT_vi_tglkunj";
max_date(eresepRWIAPT_vi_tglresep);
max_date(eresepRWIAPT_vi_tglkunj);
getSignadanRacik_RWJAPT();
eresepRWIAPT_ObatJadi();
eresepRWIAPT_ObatRacik();
getPenjamin_pasien_RWJAPT();
getData_OrderEresepRWIAPT();

function getPenjamin_pasien_RWJAPT() {
  var param = {
    id_transaksi : id_trans
  }
  apiPOST('Apotek/getPenjamin_pasien_RWJAPT', param, hasil => {
    var data = hasil['data'];
    if(hasil !== null){
        nosjp = hasil['data'];
        var opsi = document.getElementById('eresepRWIAPT_vi_penjamin');
        nosjp.forEach(baru => {
            var option = document.createElement('option');
            option.value = baru['id_penjamin'];
            option.innerHTML = baru['nama_penjamin'];
            opsi.appendChild(option);
        });
        if (nosjp.length > 1){
          var penjamin = document.getElementById("eresepRWIAPT_vi_penjamin"); 
          penjamin.focus();
          toastr.info("Pasien memiliki 2 Penjamin!!");
        }
    }
    changePenjamin_RWIAPT();
  });
}

function changePenjamin_RWIAPT(){ 
  optionChildByParent(nosjp, 'eresepRWIAPT_vi_penjamin', 'eresepRWIAPT_vi_sep', paramIdPenjaminnosjp);   
}

function getSignadanRacik_RWJAPT(){
  eresepRWIAPT_kd_signaObatJadi = new AutoComplete("eresepRWIAPT_obatjadi_signa");
  eresepRWIAPT_kd_signaObatRacik = new AutoComplete("eresepRWIAPT_signaracikan");
  apiPOST('Apotek/getSigna', null, hasil => {
    if (hasil !== null) {
      var list = hasil['data'];
      list.forEach(baru => {
        eresepRWIAPT_kd_signaObatJadi.addData(baru['id_signa'], baru['signa']);
        eresepRWIAPT_kd_signaObatRacik.addData(baru['id_signa'], baru['signa']);
      });
    }
  });

  eresepRWIAPT_kd_JenisRacikan = new AutoComplete("eresepRWIAPT_nmaracikan");
  apiPOST('Apotek/getJnsRacikan_eresep', null, hasil => {
    if (hasil !== null) {
      var list = hasil['data'];
      list.forEach(baru => {
        eresepRWIAPT_kd_JenisRacikan.addData(baru['id_jns_racik'], baru['jns_racik']);
      });
    }
  });

  // const liveresepRWIAPT = document.querySelector("#eresepRWIAPT_vi_rseplangsung");
  // liveresepRWIAPT.addEventListener("change", () => {
  //   if (liveresepRWIAPT.checked) {
  //     liveresepRWIAPT_check = '1';
  //   } else {
  //     liveresepRWIAPT_check = '0';
  //   }
  // });
}

function getData_OrderEresepRWIAPT(){
  $('#loading_modal_eresepRWIAPT').show();
  // var today0 = new Date();
  // var time0 = today0.getHours() + ":" + today0.getMinutes() + ":" + today0.getSeconds();
  // console.log(time0);
  
  var param = {
    idresep   : id_order,
    id_kunj   : idkunj,
    tgl_kunj  : tglkunj,
    tglorder  : tgl_ord,
    id_transaksi : id_trans
  };

  if ((id_order != '0')||(id_order != null)){
    document.getElementById("veresepRWIAPT_hargaTotal").innerHTML  = '0';
    document.getElementById("eresepRWIAPT_hargaTotal").value = '0';

    apiPOST('Apotek/getData_OrderEresepRWIAPT', param, hasil => {
      sessionStorage.clear();
      if (hasil !== null) {
        $('#loading_modal_eresepRWIAPT').hide();
        if (hasil['code'] == '200'){
          var data        = hasil['data'];
          var ObatJadi    = hasil['ObatJadi'];
          var GroupRacik  = hasil['GroupRacik'];
          var ObatRacik   = hasil['ObatRacik'];

          id_kunjungan_far = '0';
          document.getElementById('eresepRWIAPT_vi_cat_alergi').value = data[0].cat_diagnosa;
          // document.getElementById('eresepRWIAPT_vi_penjamin').value   = '';
          // getPenjamin_pasien_RWJAPT();

          $('#eresepRWIAPTtable_obatjadi tbody').html('');
          $('#eresepRWIAPTtable_obatracik_jenisracikan tbody').html('');
          $('#eresepRWIAPTtable_obatracik tbody').html('');
          
          if ((ObatJadi.length == 0)&&(GroupRacik.length == 0)){
            toastr.info("Belum Ada Inputan Obat Jadi ataupun Obat Racik!!");
          }

          for (var o = 0; o < ObatJadi.length; o++) {
            var kd_obt    = ObatJadi[o].kd_obat;
            var nm_obat   = ObatJadi[o].nama_obat;
            var qty       = ObatJadi[o].jumlah;
            var id_signa  = ObatJadi[o].id_signa;
            var signa     = ObatJadi[o].signa;
            var ket       = ObatJadi[o].ket;
            //var harga     = numberformat(Math.floor(ObatJadi[o].total_harga));
            //var harga_satuan = ObatJadi[o].harga_jual;
            var pembulatan    = Math.floor(ObatJadi[o].harga_jual);
            var harga_satuan  = pembulatan;
            var harga         = numberformat(qty * pembulatan);
            var expired       = ObatJadi[o].exp;

            var harga_asli    = Math.floor(ObatJadi[o].harga);
            var totharga_asli = numberformat(qty * harga_asli);
            
            eresepRWIAPT_dataobatjdi(kd_obt, nm_obat, qty, id_signa, signa, ket, harga, harga_satuan, expired, totharga_asli, harga_asli);
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
                
                var Nomor = $('#eresepRWIAPTtable_obatracik_jenisracikan tbody tr').length + 1;
                var Baris = "<tr>";
                   Baris += "<td class='pl-0' style='text-align:center;'>"+Nomor+"</td>";
                   Baris += '<td style="display: flex;"><button type="button" class="btn btn-xs btn-warning" title="Tampilkan '+ nama_racikan+'" onclick="eresepRWIAPT_tampilkan_jenisracik('+"'"+Nomor+"','"+nma_racikan+"','"+byk_racikan+"','"+sig_racikan+"','"+ket_racikan+"','"+x+"'"+')" style="width: 100%;"><i class="fa fa-arrow-up"></i></button>&nbsp;<button type="button" class="btn btn-xs btn-danger" onclick="eresepRWIAPT_hapus_jenisracik(this, '+"'"+Nomor+"','"+nma_racikan+"','"+byk_racikan+"','"+sig_racikan+"','"+ket_racikan+"','"+nama_racikan+"'"+')" style="width: 100%;"><i class="fa fa-times"></i></button></td>';
                   // Baris += "<td hidden>"+Nomor+"</td>";
                   Baris += "<td>";
                   Baris += "<input type='text' class='form-control form-control-xxs' name='eresepRWIAPT_jenisracikan[]' value='" + nama_racikan +"' disabled>";
                   Baris += "</td>";
                   Baris += "<td hidden><input type='text' class='form-control form-control-xxs' name='eresepRWIAPT_byk_racikan[]' value='" + byk_racikan +"' disabled></td>";
                   Baris += "<td hidden><input type='text' class='form-control form-control-xxs' name='eresepRWIAPT_idsig_racikan[]' value='" + id_sig_rac +"' disabled></td>";
                   Baris += "<td hidden><input type='text' class='form-control form-control-xxs' name='eresepRWIAPT_sig_racikan[]' value='" + sig_racikan +"' disabled></td>";
                   Baris += "<td hidden><input type='text' class='form-control form-control-xxs' name='eresepRWIAPT_ket_racikan[]' value='" + ket_racikan +"' disabled></td>";
                   Baris += "</tr>";
                
                $('#eresepRWIAPTtable_obatracik_jenisracikan tbody').append(Baris);
                sessionStorage['RACIK_'+nama_racikan] = '[{"racikan":"'+nama_racikan+'","qty":"'+byk_racikan+'","idsigna":"'+id_sig_rac+'","signa":"'+sig_racikan+'","ket":"'+ket_racikan+'"}]';
              }

              var group_racikan = groupracikan.filter(onlyUnique);
              const group_racikandriOBAT = groupBy(ObatRacik, "jns_racikan");
                        
              for (let a = 0; a < group_racikan.length; a++) {
                var nm_kelompok = group_racikan[a];
                const params    = []; 
                for (let i = 0; i < group_racikandriOBAT[nm_kelompok].length; i++) {
                  var kd_obt    = group_racikandriOBAT[nm_kelompok][i].kd_obat;
                  var nm_obat   = group_racikandriOBAT[nm_kelompok][i].nama_obat;
                  var dosis     = group_racikandriOBAT[nm_kelompok][i].dosis;
                  var qty       = group_racikandriOBAT[nm_kelompok][i].jumlah;
                  var ket       = group_racikandriOBAT[nm_kelompok][i].ket;
                  var jns_racik = group_racikandriOBAT[nm_kelompok][i].jns_racikan;
                  var id_signa  = group_racikandriOBAT[nm_kelompok][i].id_signa;
                  //var harga_satuan = group_racikandriOBAT[nm_kelompok][i].harga_jual;
                  var pembulatan    = Math.floor(group_racikandriOBAT[nm_kelompok][i].harga_jual);
                  var harga_satuan  = pembulatan;
                  //var harga       = group_racikandriOBAT[nm_kelompok][i].total_harga;
                  var harga         = numberformat(qty * pembulatan);

                  var harga_asli    = Math.floor(group_racikandriOBAT[nm_kelompok][i].harga);
                  var totharga_asli = numberformat(qty * harga_asli);

                  var expired   = '';
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
                      x.qty         = qty;
                      x.ket         = ket;
                      x.jnsracik    = jns_racik;
                      x.total_harga = harga;
                      x.exp         = expired;
                      x.harga       = harga_satuan;
                      x.harga_asli  = harga_asli;
                      params.push(x);

                  sessionStorage[jns_racik] = JSON.stringify(params);
                  //PROSES PENJUMLAHAN HARGA OBAT
                  var totalx = document.getElementById("eresepRWIAPT_hargaTotal").value;
                  total = parseInt(totalx) + (qty * pembulatan);
                  document.getElementById("eresepRWIAPT_hargaTotal").value = total;
                  document.getElementById("veresepRWIAPT_hargaTotal").innerHTML = numberformat(total);
                  eresepRWIAPT_getPPnValue(total);
                }
              }
            }
        
        }else if (hasil['code'] == '202'){
          var noresep   = hasil['noresep'];
          var tglresep  = hasil['tglresep'];
          getData_EresepRWIAPT(noresep, tglresep);
        }else if (hasil['code'] == '501'){
          document.getElementById("eresepRWIAPT_btn_daftarobat").disabled     = true;
          document.getElementById("eresepRWIAPT_btn_simpanobat").disabled     = true;
          document.getElementById("eresepRWIAPT_btn_transferobat").disabled   = true;
          toastr.error("Order Resep Sudah Terlayani!!");
        }else{
          toastr.error("Belum Ada Order Resep Hari Ini.");
        }
      }
    }).then(function(){
      //$('#loading_modal_eresepRWIAPT').hide();
      
      // var today = new Date();
      // var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
      // console.log(time);
    });
  }else{
    toastr.error('Nomor Order Tidak Diketahui...!!');
  }
}

function getData_EresepRWIAPT(noresep, tglresep){
  $('#loading_modal_eresepRWIAPT').show();
  document.getElementById('eresepRWIAPT_vi_noresep').value = noresep;
  document.getElementById('eresepRWIAPT_vi_tglresep').value = tglresep;
  var param = {
    iduser    : user['id_user'],
    noresep   : noresep,
    id_kunj   : idkunj,
    id_unit   : idunit,
    norm      : norm,
    tgl_kunj  : tglkunj,
    tgl_resep : tglresep,
    vi        : 'eresepRWIAPT',
    id_transaksi : id_trans
  };

  if ((noresep != '0')||(noresep != null)){
    // apiPOST('Apotek/getData_eresepRWIAPT', param, hasil => {
    apiPOST('Apotek/lookup_detailobatRJRIIGD', param, hasil => {
      sessionStorage.clear();
      if (hasil !== null) {
        //$('#loading_modal_eresepRWIAPT').hide();
        if (hasil['code'] == '200'){
          var data        = hasil['data'];
          var ObatJadi    = hasil['ObatJadi'];
          var GroupRacik  = hasil['GroupRacik'];
          var ObatRacik   = hasil['ObatRacik'];
          var StokObatOut = hasil['StokObatOut'];

          id_kunjungan_far = data[0].id_kunjungan_far;
          document.getElementById('eresepRWIAPT_vi_cat_alergi').value = data[0].cat_alergi;
          document.getElementById('eresepRWIAPT_vi_penjamin').value   = data[0].penjamin;
          changePenjamin_RWIAPT();

          $('#eresepRWIAPTtable_obatjadi tbody').html('');
          $('#eresepRWIAPTtable_obatracik_jenisracikan tbody').html('');
          $('#eresepRWIAPTtable_obatracik tbody').html('');
          
          if ((ObatJadi.length == 0)&&(GroupRacik.length == 0)){
            toastr.info("Belum Ada Inputan Obat Jadi ataupun Obat Racik!!");
          }

          for (var o = 0; o < ObatJadi.length; o++) {
            var kd_obt    = ObatJadi[o].kd_obat;
            var nm_obat   = ObatJadi[o].nama_obat;
            var qty       = ObatJadi[o].jumlah;
            var id_signa  = ObatJadi[o].id_signa;
            var signa     = ObatJadi[o].signa;
            var ket       = ObatJadi[o].ket;
            //var harga     = numberformat(Math.floor(ObatJadi[o].total_harga));
            //var harga_satuan = ObatJadi[o].harga_jual;
            var pembulatan    = Math.floor(ObatJadi[o].harga_jual);
            var harga_satuan  = pembulatan;
            var harga     = numberformat(qty * pembulatan);
            
            var expired   = ObatJadi[o].exp;
            
            var harga_asli    = Math.floor(ObatJadi[o].harga_sat);
            var totharga_asli = numberformat(qty * harga_asli);

            eresepRWIAPT_dataobatjdi(kd_obt, nm_obat, qty, id_signa, signa, ket, harga, harga_satuan, expired, totharga_asli, harga_asli);
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
              
              var Nomor = $('#eresepRWIAPTtable_obatracik_jenisracikan tbody tr').length + 1;
              var Baris = "<tr>";
                 Baris += "<td class='pl-0' style='text-align:center;'>"+Nomor+"</td>";
                 Baris += '<td style="display: flex;"><button type="button" class="btn btn-xs btn-warning" title="Tampilkan '+ nama_racikan+'" onclick="eresepRWIAPT_tampilkan_jenisracik('+"'"+Nomor+"','"+nma_racikan+"','"+byk_racikan+"','"+sig_racikan+"','"+ket_racikan+"','"+x+"'"+')" style="width: 100%;"><i class="fa fa-arrow-up"></i></button>&nbsp;<button type="button" class="btn btn-xs btn-danger" onclick="eresepRWIAPT_hapus_jenisracik(this, '+"'"+Nomor+"','"+nma_racikan+"','"+byk_racikan+"','"+sig_racikan+"','"+ket_racikan+"','"+nama_racikan+"'"+')" style="width: 100%;"><i class="fa fa-times"></i></button></td>';
                 // Baris += "<td hidden>"+Nomor+"</td>";
                 Baris += "<td>";
                 Baris += "<input type='text' class='form-control form-control-xxs' name='eresepRWIAPT_jenisracikan[]' value='" + nama_racikan +"' disabled>";
                 Baris += "</td>";
                 Baris += "<td hidden><input type='text' class='form-control form-control-xxs' name='eresepRWIAPT_byk_racikan[]' value='" + byk_racikan +"' disabled></td>";
                 Baris += "<td hidden><input type='text' class='form-control form-control-xxs' name='eresepRWIAPT_idsig_racikan[]' value='" + id_sig_rac +"' disabled></td>";
                 Baris += "<td hidden><input type='text' class='form-control form-control-xxs' name='eresepRWIAPT_sig_racikan[]' value='" + sig_racikan +"' disabled></td>";
                 Baris += "<td hidden><input type='text' class='form-control form-control-xxs' name='eresepRWIAPT_ket_racikan[]' value='" + ket_racikan +"' disabled></td>";
                 Baris += "</tr>";
              
              $('#eresepRWIAPTtable_obatracik_jenisracikan tbody').append(Baris);
              sessionStorage['RACIK_'+nama_racikan] = '[{"racikan":"'+nama_racikan+'","qty":"'+byk_racikan+'","idsigna":"'+id_sig_rac+'","signa":"'+sig_racikan+'","ket":"'+ket_racikan+'"}]';
            }

            var group_racikan = groupracikan.filter(onlyUnique);
            const group_racikandriOBAT = groupBy(ObatRacik, "jns_racikan");
                      
            for (let a = 0; a < group_racikan.length; a++) {
              var nm_kelompok = group_racikan[a];
              const params    = []; 
              for (let i = 0; i < group_racikandriOBAT[nm_kelompok].length; i++) {
                var kd_obt        = group_racikandriOBAT[nm_kelompok][i].kd_obat;
                var nm_obat       = group_racikandriOBAT[nm_kelompok][i].nama_obat;
                var dosis         = group_racikandriOBAT[nm_kelompok][i].dosis;
                var qty           = group_racikandriOBAT[nm_kelompok][i].jumlah;
                var ket           = group_racikandriOBAT[nm_kelompok][i].ket;
                var jns_racik     = group_racikandriOBAT[nm_kelompok][i].jns_racikan;
                var id_signa      = group_racikandriOBAT[nm_kelompok][i].id_signa;
                //var harga     = group_racikandriOBAT[nm_kelompok][i].total_harga;
                //var harga_satuan = group_racikandriOBAT[nm_kelompok][i].harga_jual;
                var pembulatan    = Math.floor(group_racikandriOBAT[nm_kelompok][i].harga_jual);
                var harga_satuan  = pembulatan;
                var harga         = numberformat(qty * pembulatan);
                var expired       = group_racikandriOBAT[nm_kelompok][i].exp;

                var harga_asli    = Math.floor(group_racikandriOBAT[nm_kelompok][i].harga_sat);
                var totharga_asli = numberformat(qty * harga_asli);

                var x = {};
                var no = i + 1;
                    x.urut        = no;
                    x.kd_obt      = kd_obt;
                    x.nm_prd      = nm_obat;
                    if (dosis !== ''){
                      x.dosis     = dosis;
                    }else{
                      x.dosis     = "0";
                    }
                    x.qty         = qty;
                    x.ket         = ket;
                    x.jnsracik    = jns_racik;
                    x.total_harga = harga;
                    x.exp         = expired;
                    x.harga       = harga_satuan;
                    x.harga_asli  = harga_asli;
                    params.push(x);

                sessionStorage[jns_racik] = JSON.stringify(params);
                //PROSES PENJUMLAHAN HARGA OBAT
                var totalx = document.getElementById("eresepRWIAPT_hargaTotal").value;
                total = parseInt(totalx) + (qty * pembulatan);
                document.getElementById("eresepRWIAPT_hargaTotal").value = total;
                document.getElementById("veresepRWIAPT_hargaTotal").innerHTML = numberformat(total);
                eresepRWIAPT_getPPnValue(total);
              }
            }
          }

          groupStokobat = [];
          groupStokobatRacik = [];
          for (var gs = 0; gs < StokObatOut.length; gs++) {
            groupStokobat[gs] = StokObatOut[gs].kd_obat;
            groupStokobatRacik[gs] = StokObatOut[gs].jns_racikan_gab;
          }
          
          var group_StokObat = groupStokobat.filter(onlyUnique);
          var group_StokObatRacik = groupStokobatRacik.filter(onlyUnique);

          const group_StokObatGet = groupBy(StokObatOut, "kd_obat");
          //console.log(group_StokObatGet);          
          const group_StokObatRacikGet = groupBy(StokObatOut, "jns_racikan_gab");
          //console.log(group_StokObatRacikGet);

          for (let gso = 0; gso < group_StokObat.length; gso++) {
            var pengelompokan = group_StokObat[gso];
            const params    = [];

            for (let gsoo = 0; gsoo < group_StokObatGet[pengelompokan].length; gsoo++) {
              var kd_obt       = group_StokObatGet[pengelompokan][gsoo].kd_obat; 
              var exp          = group_StokObatGet[pengelompokan][gsoo].exp;
              var batch        = group_StokObatGet[pengelompokan][gsoo].batch;
              var id_kunj_far  = group_StokObatGet[pengelompokan][gsoo].id_kunjungan_far;
              var id_unit      = group_StokObatGet[pengelompokan][gsoo].id_unit;
              var kd_milik     = group_StokObatGet[pengelompokan][gsoo].kd_milik;
              var stok_dikel   = group_StokObatGet[pengelompokan][gsoo].stok_dikeluarkan;
              var stok_unit    = group_StokObatGet[pengelompokan][gsoo].stok_unit;
              var jns_racikan  = group_StokObatGet[pengelompokan][gsoo].jns_racikan;

              var x = {};
              if (jns_racikan == '0'){
                x.getbatch      = batch;
                x.getexp        = exp;
                x.getidUnit     = id_unit;
                x.getjumlah     = stok_dikel;
                x.getkd_obt     = kd_obt;
                x.getkdmilik    = kd_milik;
                x.getstokawal   = stok_unit;
                x.id_kunj_far   = id_kunj_far;
                x.jns_racikan   = jns_racikan;

                params.push(x);
                sessionStorage["ObatJadiRI"+x.getkd_obt] = JSON.stringify(params);

              }
            }
          }

          for (let gso = 0; gso < group_StokObatRacik.length; gso++) {
              var pengelompokanRacik = group_StokObatRacik[gso];
              //console.log(group_StokObatRacikGet);
              const paramss    = []; 

              for (let gsoo = 0; gsoo < group_StokObatRacikGet[pengelompokanRacik].length; gsoo++) {
                // console.log(group_StokObatRacikGet[pengelompokanRacik]);
                var kd_obt       = group_StokObatRacikGet[pengelompokanRacik][gsoo].kd_obat; 
                var exp          = group_StokObatRacikGet[pengelompokanRacik][gsoo].exp;
                var batch        = group_StokObatRacikGet[pengelompokanRacik][gsoo].batch;
                var id_kunj_far  = group_StokObatRacikGet[pengelompokanRacik][gsoo].id_kunjungan_far;
                var id_unit      = group_StokObatRacikGet[pengelompokanRacik][gsoo].id_unit;
                var kd_milik     = group_StokObatRacikGet[pengelompokanRacik][gsoo].kd_milik;
                var stok_dikel   = group_StokObatRacikGet[pengelompokanRacik][gsoo].stok_dikeluarkan;
                var stok_unit    = group_StokObatRacikGet[pengelompokanRacik][gsoo].stok_unit;
                var jns_racikan  = group_StokObatRacikGet[pengelompokanRacik][gsoo].jns_racikan;

                var xx = {};
                
                if (jns_racikan != '0'){
                  xx.id_kunj_far   = id_kunj_far;
                  xx.jns_racikan   = jns_racikan;
                  xx.getkd_obt     = kd_obt;
                  xx.getexp        = exp;
                  xx.getidUnit     = id_unit;
                  xx.getjumlah     = stok_dikel;
                  xx.getkdmilik    = kd_milik;
                  xx.getstokawal   = stok_unit;
                  xx.getbatch      = batch;
                  
                  paramss.push(xx);
                  sessionStorage[xx.jns_racikan +"RI"+xx.getkd_obt] = JSON.stringify(paramss);
                }
              }
            }

        
        }else if (hasil['code'] == '100'){
          var data          = hasil['data'];
          id_kunjungan_far  = data[0].id_kunjungan_far;
          sukses('-- Resep Sudah Terlayani --', '');
        }else{
          toastr.error("Belum Ada Resep Hari Ini.");
        }
      }
    }).then(function(){
      $('#loading_modal_eresepRWIAPT').hide();
      // document.getElementById("eresepRWIAPT_btn_daftarobat").disabled     = true;
      // document.getElementById("eresepRWIAPT_btn_simpanobat").disabled     = true;
      // document.getElementById("eresepRWIAPT_btn_transferobat").disabled   = true;
      // document.getElementById('eresepRWIAPT_hapusresepRWIAPT').disabled   = true;

      //toastr.error("Order Resep Sudah Terlayani!!");
    });
  }else{
    toastr.error('Nomor Resep Tidak Diketahui...!!');
  }
}

function eresepRWIAPT_dataobatjdi(kd_obat, nm_obat, qty, id_signa, signa, ket, harga, harga_satuan, expired, totharga_asli, harga_asli){
  
  var nomor = $('#eresepRWIAPTtable_obatjadi tbody tr').length + 1;  
  var Baris = '';
      Baris += "<tr>";
      Baris += "<td class='pl-0'>";
      Baris += "<input style='text-align:center;' type='text' class='form-control form-control-xxs' name='eresepRWIAPT_obtjadiurut[]' value='" + nomor + "' disabled>";
      Baris += "</td>";
      Baris += "<td style='display: flex;'><button type='button' class='btn btn-xs btn-danger' onclick='eresepRWIAPT_hapusbaris_obatjadi(this, "+nomor+")' id='eresepRWIAPT_hapusbaris_obatjadi" + nomor + "' style='width:100%'><i class='fa fa-times'></i></button><button type='button' class='btn btn-xs btn-outline-warning' onclick='eresepRWIAPT_editbaris_obatjadi(this, "+nomor+")' id='eresepRWIAPT_editbaris_obatjadi" + nomor + "' style='width:100%'><i class='fa fa-edit'></i></button></td>";
      Baris += "<td>";
      Baris += "<input type='text' class='form-control form-control-xxs' name='eresepRWIAPT_obtjadikd_obt[]' value='" + kd_obat + "' disabled>";
      Baris += "</td>";
      Baris += "<td>";
      Baris += "<input type='text' class='form-control form-control-xxs' name='eresepRWIAPT_obtjadinm_obat[]' value='" + nm_obat + "' disabled>";
      Baris += "</td>";
      Baris += "<td class='pl-0'>";
      Baris += "<input type='text' class='form-control form-control-xxs' name='eresepRWIAPT_obtjadiqty[]' value='" + qty + "' disabled style='text-align: right;'>";
      Baris += "</td>";
      Baris += "<td>";
      Baris += "<input type='text' class='form-control form-control-xxs' name='eresepRWIAPT_obtjadisigna[]' value='" + signa + "' disabled>";
      Baris += "</td>";
      Baris += "<td>";
      Baris += "<input type='text' class='form-control form-control-xxs' name='eresepRWIAPT_obtjadiharga[]' value='"+ harga +"' disabled style='text-align: right;'>";
      Baris += "</td>";
      Baris += "<td>";
      Baris += "<input type='date' class='form-control form-control-xxs' name='eresepRWIAPT_obtjadiexp[]' value='" + expired + "' disabled>";
      Baris += "</td>";
      Baris += "<td>";
      Baris += "<input type='text' class='form-control form-control-xxs' name='eresepRWIAPT_obtjadiket[]' value='" + ket + "' disabled>";
      Baris += "</td>";
      Baris += "<td style='display:none;'>";
      Baris += "<input type='text' class='form-control form-control-xxs' name='eresepRWIAPT_obtjadiidsigna[]' value='" + id_signa + "' disabled>";
      Baris += "</td>";
      /*
        Harga Satuan DIBAWAH sudah ke Margin
      */
      Baris += "<td style='display:none;'>";
      Baris += "<input type='text' class='form-control form-control-xxs' name='eresepRWIAPT_obtjadiharga_satuan[]' value='" + harga_satuan + "' disabled>";
      Baris += "</td>";
      /*
        Harga Satuan DIBAWAH HARGA ASLI
      */
      Baris += "<td style='display:none;'>";
      Baris += "<input type='text' class='form-control form-control-xxs' name='eresepRWIAPT_obtjadiharga_asli[]' value='" + harga_asli + "' disabled>";
      Baris += "</td>";
      Baris += "<td style='display:none;'>";
      Baris += "<input type='text' class='form-control form-control-xxs' name='eresepRWIAPT_obtjaditotharga_asli[]' value='" + totharga_asli + "' disabled>";
      Baris += "</td>";
      Baris += "</tr>";

  var getkd_obat = document.getElementsByName('eresepRWIAPT_obtjadikd_obt[]');
  //var hrgaobat  = document.getElementsByName('eresepRWIAPT_obtjadiqty[]');
  var jmlObat   = $('#eresepRWIAPTtable_obatjadi tbody tr').length;
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
    $('#eresepRWIAPTtable_obatjadi tbody').append(Baris);
    
    var totalx = document.getElementById("eresepRWIAPT_hargaTotal").value;
    total = parseInt(totalx) + (qty * harga_satuan);
    document.getElementById("eresepRWIAPT_hargaTotal").value = total;
    document.getElementById("veresepRWIAPT_hargaTotal").innerHTML = numberformat(total);

    eresepRWIAPT_getPPnValue(total);
  }else{
    var urut = document.getElementById("eresepRWIAPT_obatjadi_urut").value;
    if (urut != ''){
      $('#eresepRWIAPTtable_obatjadi tbody').append(Baris);
      
      // document.getElementById("eresepRWIAPTtable_obatjadi").rows[urut].cells[4].firstChild.value  = qty;
      // document.getElementById("eresepRWIAPTtable_obatjadi").rows[urut].cells[5].firstChild.value  = signa;
      // document.getElementById("eresepRWIAPTtable_obatjadi").rows[urut].cells[8].firstChild.value = ket;
      // document.getElementById("eresepRWIAPTtable_obatjadi").rows[urut].cells[9].firstChild.value = (qty * harga_satuan);
      // document.getElementById("eresepRWIAPTtable_obatjadi").rows[urut].cells[10].firstChild.value = expired;
      // document.getElementById("eresepRWIAPTtable_obatjadi").rows[urut].cells[11].firstChild.value = id_signa;
      var totalx = document.getElementById("eresepRWIAPT_hargaTotal").value;
      total = parseInt(totalx) + (qty * harga_satuan);
      document.getElementById("eresepRWIAPT_hargaTotal").value = total;
      document.getElementById("veresepRWIAPT_hargaTotal").innerHTML = numberformat(total);

      eresepRWIAPT_getPPnValue(total);

      var hapusrow = document.getElementById("eresepRWIAPT_hapusbaris_obatjadi"+urut); 
      hapusrow.click();
    }else{
      toastr.error("Obat Sudah Diinputkan!!");  
    }
    
  }
}

function eresepRWIAPT_getPPnValue(total){
  if (user['id_far'] == '4001'){
    let ppnrp = 0;
    ppnrp = (parseFloat(total) * 11) / 100;
    document.getElementById("eresepRWIAPT_ppn").value = Math.ceil(ppnrp);
  }
}

function eresepRWIAPT_hapusbaris_obatjadi(btn, nomor){
  document.getElementById("eresepRWIAPT_obatjadi_urut").value = '';
  var row = btn.parentNode.parentNode;
  
  let total   = 0;
  var qty            = document.getElementById("eresepRWIAPTtable_obatjadi").rows[nomor].cells[4].firstChild.value;
  var harga_satuan   = document.getElementById("eresepRWIAPTtable_obatjadi").rows[nomor].cells[10].firstChild.value;
  var totalx = document.getElementById("eresepRWIAPT_hargaTotal").value;
  total = parseInt(totalx) - (qty * harga_satuan);
  document.getElementById("eresepRWIAPT_hargaTotal").value = total;
  document.getElementById("veresepRWIAPT_hargaTotal").innerHTML = numberformat(total);

  eresepRWIAPT_getPPnValue(total);
  row.parentNode.removeChild(row);
  var no = 1;
  $('#eresepRWIAPTtable_obatjadi tbody tr').each(function(){
    $(this).find('td:nth-child(1)').html("<input style='text-align:center;' type='text' class='form-control form-control-xxs' name='eresepRWIAPT_obtjadiurut[]' value='" + no + "' disabled>");
    $(this).find('td:nth-child(2)').html("<button type='button' class='btn btn-xs btn-danger' onclick='eresepRWIAPT_hapusbaris_obatjadi(this, "+no+")' id='eresepRWIAPT_hapusbaris_obatjadi" + no + "' style='width:100%'><i class='fa fa-times'></i></button><button type='button' class='btn btn-xs btn-outline-warning' onclick='eresepRWIAPT_editbaris_obatjadi(this, "+no+")' id='eresepRWIAPT_editbaris_obatjadi" + no + "' style='width:100%'><i class='fa fa-edit'></i></button>");
    no++;
  });

  //sessionStorage.removeItem("ObatJadi"+nomor);
}

function eresepRWIAPT_editbaris_obatjadi(btn, nomor){
  var kd_obt        = document.getElementById("eresepRWIAPTtable_obatjadi").rows[nomor].cells[2].firstChild.value;
  var nm_obat       = document.getElementById("eresepRWIAPTtable_obatjadi").rows[nomor].cells[3].firstChild.value;
  var qty           = document.getElementById("eresepRWIAPTtable_obatjadi").rows[nomor].cells[4].firstChild.value;
  var signa         = document.getElementById("eresepRWIAPTtable_obatjadi").rows[nomor].cells[5].firstChild.value;
  var ket           = document.getElementById("eresepRWIAPTtable_obatjadi").rows[nomor].cells[8].firstChild.value;
  var harga_satuan  = document.getElementById("eresepRWIAPTtable_obatjadi").rows[nomor].cells[10].firstChild.value;
  var harga_asli    = document.getElementById("eresepRWIAPTtable_obatjadi").rows[nomor].cells[11].firstChild.value;

  $("#eresepRWIAPT_obatjadi_qty").trigger('focus');

  eresepRWIAPT_kd_signaObatJadi.setValue(signa);
  document.getElementById("eresepRWIAPT_obatjadi_urut").value   = nomor;
  document.getElementById("eresepRWIAPT_obatjadi_kdobat").value = kd_obt;
  document.getElementById("eresepRWIAPT_obatjadi_nm").value     = nm_obat;
  document.getElementById("eresepRWIAPT_obatjadi_qty").value    = qty;
  document.getElementById("eresepRWIAPT_obatjadi_ket").value    = ket;
  eresepRWIAPT_obatjadi_harga     = harga_satuan;
  eresepRWIAPT_obatjadi_hargasat  = harga_asli;
  // console.log(harga_satuan);
}

function eresepRWIAPT_modaldaftarobat(){
  var data = {
    eresepRWJ : 'eresepRWIAPT',
    tabObat   : document.getElementById('eresepRWIAPT_penentu_resepobat').value,
    penjaminpas : document.getElementById('eresepRWIAPT_vi_penjamin').value,
    id_unit   : idunit,
  }
  var datax = JSON.stringify(data);
  $('.listeresepRjRIIGD_contentobat').load('Apotek/obatresepRWJ?data='+datax);
}

function eresepRWIAPT_expired(kdObat, value, nomor, eresepRacik){
  var data = {
    eresepRWJ : 'eresepRWIAPT',
    eresepRacik : eresepRacik,
    tabObat   : document.getElementById('eresepRWIAPT_penentu_resepobat').value,
    jumlah    : value,
    kdObat    : kdObat,
    nomor     : nomor,
    id_kunj_far : id_kunjungan_far
  }
  var datax = JSON.stringify(data);
  $('.listeresepRjRIIGD_contentobat').load('Apotek/expiredobatresep?data='+datax);
}

function eresepRWIAPT_kembalikeawal(){
  var noresepAPTRWI = document.getElementById("eresepRWIAPT_vi_noresep").value;
  if (noresepAPTRWI == ''){    
    pertanyaan.fire({
      title             : 'Kembali ke menu awal',
      html              : '<span>Data Order Resep Dokter Belum diSimpan, Data yang sudah dientry akan hilang, tetap kembali ?</span>',
      icon              : 'question',
      showCancelButton  : true,
      reverseButtons    : false,
      allowOutsideClick : false
    }).then((result) => {
      if (result.isConfirmed) {
        keluar_eresepRWIAPT();
      }else if(result.dismiss === Swal.DismissReason.cancel){
        
      }
    })
  }else{
    keluar_eresepRWIAPT();
  }
}

function keluar_eresepRWIAPT() {
  sessionStorage.clear();
  $('.listeresepRjRIIGD_content').hide();
  $('#eresepRWJ_listpasien1').show();
  $('#eresepRWJ_listpasien2').show();
  eresepRWJ_showdataOrderResep();
}

function tab_eresepRWIAPT_obatjadi(){
  $('#eresepRWIAPT_inputan_obat_jadi').show();
  $('#eresepRWIAPT_inputan_obat_racik').hide();
  $('#eresepRWIAPT_inputan_obat_racik1').hide(); 
  $('#eresepRWIAPT_inputan_obat_racik2').hide();
  $('#eresepRWIAPT_penentu_resepobat').val(0);
  document.getElementById("eresepRWIAPT_btn_daftarobat").disabled  = false;
  $('#eresepRWIAPT_infojenis_racikan').html('-');
  $('#eresepRWIAPT_infojenis_racikan_2').html('');
}

function tab_eresepRWIAPT_obatracik(){
  $('#eresepRWIAPT_inputan_obat_jadi').hide();
  $('#eresepRWIAPT_inputan_obat_racik').show();
  $('#eresepRWIAPT_inputan_obat_racik1').show();
  $('#eresepRWIAPT_inputan_obat_racik2').hide();
  $('#eresepRWIAPT_penentu_resepobat').val(1);
  $('#eresepRWIAPTtable_obatracik tbody').html('');
  document.getElementById("eresepRWIAPT_btn_daftarobat").disabled  = true;
  document.getElementById("eresepRWIAPT_editRacikan").disabled     = true;
  eresepRWIAPT_kosongJenisRacikan();
}

function eresepRWIAPT(kd_obt, nama_obat, harga_jual, stok, tabAktif, hargasat){ 
  if (tabAktif == 0){

    if (stok != '0'){
      stok_unit = stok;
      eresepRWIAPT_obatjadi_harga     = harga_jual;
      eresepRWIAPT_obatjadi_hargasat  = hargasat;
      keluarmodal_RWJresep_daftarobat();
      //document.getElementById("eresepRWIAPT_obatjadi_nm").disabled  = true;
      document.getElementById("eresepRWIAPT_obatjadi_kdobat").value = kd_obt;
      document.getElementById("eresepRWIAPT_obatjadi_nm").value     = nama_obat;
      document.getElementById("eresepRWIAPT_obatjadi_qty").value    = 1;
      //document.getElementById("eresepRWIAPT_obatjadi_signa").value  = '';
      document.getElementById("eresepRWIAPT_obatjadi_ket").value    = '';
      $("#eresepRWIAPT_obatjadi_qty").trigger('focus');
    }else{
      toastr.warning('Stok Obat Kosong!!');
      stok_unit = '0';
      eresepRWIAPT_obatjadi_harga     = 0;
      eresepRWIAPT_obatjadi_hargasat  = 0;
    }
  }else{
    if (stok != '0'){
      stok_unit = stok;
      eresepRWIAPT_obatracik_harga    = harga_jual;
      eresepRWIAPT_obatracik_hargasat = hargasat;
      keluarmodal_RWJresep_daftarobat();
      document.getElementById("eresepRWIAPT_obat_racik_kdobat").value  = kd_obt;
      document.getElementById("eresepRWIAPT_obat_racik_nmaobat").value = nama_obat;
      document.getElementById("eresepRWIAPT_obat_racik_dosis").value   = '';
      document.getElementById("eresepRWIAPT_obat_racik_qty").value     = 1;
      document.getElementById("eresepRWIAPT_obat_racik_ket").value     = '';
      $("#eresepRWIAPT_obat_racik_dosis").trigger('focus');
    }else{
      toastr.warning('Stok Obat Kosong!!');
      stok_unit = '0';
      eresepRWIAPT_obatracik_harga    = 0;
      eresepRWIAPT_obatracik_hargasat = 0;
    }
  }
}

function eresepRWIAPT_ObatJadi(){

  $("#eresepRWIAPT_obatjadi_qty").on("keyup", function(event){
    if (event.keyCode == 13) {
      var nomor   = document.getElementById("eresepRWIAPT_obatjadi_urut").value; 
      var kdObat  = document.getElementById("eresepRWIAPT_obatjadi_kdobat").value;  
      let value   = $(this).val();
    
      if (kdObat != ''){
        eresepRacik = 0;
        eresepRWIAPT_expired(kdObat, value, nomor, eresepRacik);
        $("#eresepRWIAPT_obatjadi_qty").trigger('blur');
      }else{
        toastr.error("Obat Belum Dipilih!!");
      }

    }
  });

  $("#eresepRWIAPT_obatjadi_signa").on("keyup", function(event){
    if (event.keyCode == 13) {
      $("#eresepRWIAPT_obatjadi_ket").trigger('focus');
    }
  });

  $("#eresepRWIAPT_obatjadi_ket").on("keyup", function(event){
    if (event.keyCode == 13) {
      var kd_obt  = document.getElementById("eresepRWIAPT_obatjadi_kdobat").value;      
      var nm_obat = document.getElementById("eresepRWIAPT_obatjadi_nm").value;
      var qty     = document.getElementById("eresepRWIAPT_obatjadi_qty").value;
      var id_signa= eresepRWIAPT_kd_signaObatJadi.getValue();
      var signa   = document.getElementById("eresepRWIAPT_obatjadi_signa").value;
      var expired = document.getElementById("eresepRWIAPT_obatjadi_expired").value;
      var ket     = document.getElementById("eresepRWIAPT_obatjadi_ket").value;
      // SUDAH MARGIN
      var harga         = (qty * eresepRWIAPT_obatjadi_harga);
      var harga_satuan  = eresepRWIAPT_obatjadi_harga;
      // Harga Asli BELUM MARGIN
      var totharga_asli = (qty * eresepRWIAPT_obatjadi_hargasat);
      var harga_asli    = eresepRWIAPT_obatjadi_hargasat;
      
      // console.log(harga_satuan);
      if (kd_obt != null){
        if ((qty != 0)||(qty != '')||(signa != '')){
          if (id_signa != null){
            eresepRWIAPT_dataobatjdi(kd_obt, nm_obat, qty, id_signa, signa, ket, harga, harga_satuan, expired, totharga_asli, harga_asli);
            eresepRWIAPT_kosongObatJadi();
          }else{
            toastr.error("Signa obat tidak ditemukan!!");
            $("#eresepRWIAPT_obatjadi_signa").trigger('focus');
          }
        }else{
          toastr.error("Inputan Masih Kosong!!");  
        }
      }else{
        toastr.error("Nama obat tidak ditemukan!!");
        eresepRWIAPT_kosongObatJadi();
      }
            
    }
  });  

  $("#eresepRWIAPT_btn_check_obatjadi").click(function( event ) {
    var kd_obt  = document.getElementById("eresepRWIAPT_obatjadi_kdobat").value;      
    var nm_obat = document.getElementById("eresepRWIAPT_obatjadi_nm").value;
    var qty     = document.getElementById("eresepRWIAPT_obatjadi_qty").value;
    var id_signa= eresepRWIAPT_kd_signaObatJadi.getValue();
    var signa   = document.getElementById("eresepRWIAPT_obatjadi_signa").value;
    var expired = document.getElementById("eresepRWIAPT_obatjadi_expired").value;
    var ket     = document.getElementById("eresepRWIAPT_obatjadi_ket").value;
    // SUDAH MARGIN
    var harga         = (qty * eresepRWIAPT_obatjadi_harga);
    var harga_satuan  = eresepRWIAPT_obatjadi_harga;
    // Harga Asli BELUM MARGIN
    var totharga_asli = (qty * eresepRWIAPT_obatjadi_hargasat);
    var harga_asli    = eresepRWIAPT_obatjadi_hargasat;

    if (kd_obt != null){
      if ((qty != 0)||(qty != '')||(signa != '')){
        if (id_signa != null){
          eresepRWIAPT_dataobatjdi(kd_obt, nm_obat, qty, id_signa, signa, ket, harga, harga_satuan, expired, totharga_asli, harga_asli);
          eresepRWIAPT_kosongObatJadi();
        }else{
          toastr.error("Signa obat tidak ditemukan!!");
          $("#eresepRWIAPT_obatjadi_signa").trigger('focus');
        }
      }else{
        toastr.error("Inputan Masih Kosong!!");  
      }
    }else{
      toastr.error("Nama obat tidak ditemukan!!");
      eresepRWIAPT_kosongObatJadi();
    }
  });

}

function eresepRWIAPT_ObatRacik(){
  /*INPUTAN JENIS RACIKAN*/
  eresepRWIAPT_kd_JenisRacikan.onPilih(()=>{
    $("#eresepRWIAPT_bnykracikan").trigger('focus');
    $("#eresepRWIAPT_bnykracikan").val(1);
  });

  $("#eresepRWIAPT_bnykracikan").on("keyup", function(event){
    if (event.keyCode == 13) {
      $("#eresepRWIAPT_signaracikan").trigger('focus');
    }
  });

  eresepRWIAPT_kd_signaObatRacik.onPilih(()=>{
    $("#eresepRWIAPT_ketracikan").trigger('focus');
  });

  $("#eresepRWIAPT_ketracikan").on("keyup", function(event){
    if (event.keyCode == 13) {
      var nma_racikan = $('#eresepRWIAPT_nmaracikan').val().toUpperCase().replace(/ /gi, "_");
      var byk_racikan = $('#eresepRWIAPT_bnykracikan').val();
      var id_sig_rac  = eresepRWIAPT_kd_signaObatRacik.getValue();
      var sig_racikan = $('#eresepRWIAPT_signaracikan').val().toUpperCase();
      var ket_racikan = $('#eresepRWIAPT_ketracikan').val().toUpperCase();
      var urut_racikan = $('#eresepRWIAPT_urutracik').val();

      if (id_sig_rac != null){
        if (nma_racikan == '' || byk_racikan == '' || sig_racikan == ''){
          toastr.error("Inputan masih kosong!!");
        }else{
          $('#eresepRWIAPT_inputan_obat_racik1').show(); 
          $('#eresepRWIAPT_inputan_obat_racik2').show();
          $("#eresepRWIAPT_obat_racik_nmaobat").trigger('focus');
          $('#eresepRWIAPTtable_obatracik tbody').html('');

          var flexRacik   = $("#eresepRWIAPT_flexracik").val();
          
          if (flexRacik == 1){ //EDIT RACIKAN
            var nama_racikan = $("#eresepRWIAPT_infojenis_racikan_2").html();
            if (urut_racikan == 0){
              toastr.error("Gagal Edit Racikan !!");
            }else{
              eresepRWIAPT_obatracik_editjenisracikan(nama_racikan, byk_racikan, id_sig_rac, sig_racikan, ket_racikan, urut_racikan);
            }
          }else{
            eresepRWIAPT_obatracik_jenisracikan(nma_racikan, byk_racikan, id_sig_rac, sig_racikan, ket_racikan);
            eresepRWIAPT_modaldaftarobat();
          }

          eresepRWIAPT_disabledObatJenisRacik();
          document.getElementById("eresepRWIAPT_btn_daftarobat").disabled  = false;
        }
      }else{
        toastr.error("Signa obat tidak ditemukan!!");
        $("#eresepRWIAPT_signaracikan").trigger('focus');
      }  
    }
  }); 
  /*END INPUTAN JENIS RACIKAN*/
  
  /*INPUTAN OBAT RACIKAN*/
  $("#eresepRWIAPT_obat_racik_dosis").on("keyup", function(event){
    if (event.keyCode == 13) {
      $("#eresepRWIAPT_obat_racik_qty").trigger('focus');
      $("#eresepRWIAPT_obat_racik_qty").val(1);
    }
  });

  $("#eresepRWIAPT_obat_racik_qty").on("keyup", function(event){
    if (event.keyCode == 13) {
      var nomor   = document.getElementById("eresepRWIAPT_obat_racik_urut").value; 
      var kdObat  = document.getElementById("eresepRWIAPT_obat_racik_kdobat").value;  
      let value   = $(this).val();
      
      if (kdObat != ''){
        eresepRacik = 1;
        eresepRWIAPT_expired(kdObat, value, nomor, eresepRacik);
        $("#eresepRWIAPT_obatjadi_qty").trigger('blur');
      }else{
        toastr.error("Obat Belum Dipilih!!");
      }
    }
  });

  $("#eresepRWIAPT_obat_racik_ket").on("keyup", function(event){
    if (event.keyCode == 13) {
      var kd_obt  = document.getElementById("eresepRWIAPT_obat_racik_kdobat").value;
      var nm_obat = document.getElementById("eresepRWIAPT_obat_racik_nmaobat").value;
      var dosis   = document.getElementById("eresepRWIAPT_obat_racik_dosis").value;
      var qty     = document.getElementById("eresepRWIAPT_obat_racik_qty").value;      
      var ket     = document.getElementById("eresepRWIAPT_obat_racik_ket").value;
      var expired = document.getElementById("eresepRWIAPT_obat_racik_exp").value;
      // Harga SUDAH MARGIN
      var harga         = (qty * eresepRWIAPT_obatracik_harga);
      var harga_satuan  = eresepRWIAPT_obatracik_harga;
      // Harga Asli BELUM MARGIN
      var totharga_asli = (qty * eresepRWIAPT_obatracik_hargasat);
      var harga_asli    = eresepRWIAPT_obatracik_hargasat;

      if ((kd_obt == 'null')||(kd_obt == '')){
        toastr.error("Nama obat tidak ditemukan!!");
      }else{
        if ((qty != 0)||(qty != '')){
          //PROSES PENJUMLAHAN HARGA OBAT
          
          var totalx = document.getElementById("eresepRWIAPT_hargaTotal").value;
          total = parseInt(totalx) + parseInt(harga);
          document.getElementById("eresepRWIAPT_hargaTotal").value = total;
          document.getElementById("veresepRWIAPT_hargaTotal").innerHTML = numberformat(total);
          eresepRWIAPT_getPPnValue(total);

          eresepRWIAPT_data_obatracik(kd_obt, nm_obat, dosis, qty, ket, harga, expired, harga_satuan, harga_asli, totharga_asli);
          eresepRWIAPT_kosongObatRacik();
        }else{
          toastr.error("Inputan Masih Kosong!!");  
        }
      }
    }
  });  

  $("#eresepRWIAPT_btn_check_obatracik").click(function( event ) {
    var kd_obt  = document.getElementById("eresepRWIAPT_obat_racik_kdobat").value;
    var nm_obat = document.getElementById("eresepRWIAPT_obat_racik_nmaobat").value;
    var dosis   = document.getElementById("eresepRWIAPT_obat_racik_dosis").value;
    var qty     = document.getElementById("eresepRWIAPT_obat_racik_qty").value;      
    var ket     = document.getElementById("eresepRWIAPT_obat_racik_ket").value;
    var expired = document.getElementById("eresepRWIAPT_obat_racik_exp").value;
    // Harga SUDAH MARGIN
    var harga         = (qty * eresepRWIAPT_obatracik_harga);
    var harga_satuan  = eresepRWIAPT_obatracik_harga;
    
    // Harga Asli BELUM MARGIN
    var totharga_asli = (qty * eresepRWIAPT_obatracik_hargasat);
    var harga_asli    = eresepRWIAPT_obatracik_hargasat;

    if ((kd_obt == 'null')||(kd_obt == '')){
        toastr.error("Nama obat tidak ditemukan!!");
    }else{
      if ((qty != 0)||(qty != '')){
        //PROSES PENJUMLAHAN HARGA OBAT
        
        var totalx = document.getElementById("eresepRWIAPT_hargaTotal").value;
        total = parseInt(totalx) + parseInt(harga);
        document.getElementById("eresepRWIAPT_hargaTotal").value = total;
        document.getElementById("veresepRWIAPT_hargaTotal").innerHTML = numberformat(total);
        eresepRWIAPT_getPPnValue(total);

        eresepRWIAPT_data_obatracik(kd_obt, nm_obat, dosis, qty, ket, harga, expired, harga_satuan, harga_asli, totharga_asli);
        eresepRWIAPT_kosongObatRacik();
      }else{
        toastr.error("Inputan Masih Kosong!!");  
      }
    }
  });
}

function eresepRWIAPT_disabledObatJadi(){
  document.getElementById("eresepRWIAPT_obatjadi_signa").disabled     = true;
  document.getElementById("eresepRWIAPT_obatjadi_ket").disabled       = true;
  document.getElementById("eresepRWIAPT_btn_check_obatjadi").disabled = true;
}

function eresepRWIAPT_kosongObatJadi(){
  document.getElementById("eresepRWIAPT_obatjadi_kdobat").value   = '';
  document.getElementById("eresepRWIAPT_obatjadi_urut").value     = '';
  document.getElementById("eresepRWIAPT_obatjadi_nm").value       = '';
  document.getElementById("eresepRWIAPT_obatjadi_qty").value      = '';
  document.getElementById("eresepRWIAPT_obatjadi_signa").value    = '';
  document.getElementById("eresepRWIAPT_obatjadi_expired").value  = '';
  document.getElementById("eresepRWIAPT_obatjadi_ket").value      = '';
  eresepRWIAPT_kd_signaObatJadi.reset();
  eresepRWIAPT_modaldaftarobat();
}

function eresepRWIAPT_kosongObatRacik(){
  document.getElementById("eresepRWIAPT_obat_racik_urut").value     = '';
  document.getElementById("eresepRWIAPT_obat_racik_kdobat").value   = '';
  document.getElementById("eresepRWIAPT_obat_racik_nmaobat").value  = '';
  document.getElementById("eresepRWIAPT_obat_racik_dosis").value    = '';
  document.getElementById("eresepRWIAPT_obat_racik_qty").value      = '';
  document.getElementById("eresepRWIAPT_obat_racik_exp").value      = '';
  document.getElementById("eresepRWIAPT_obat_racik_ket").value      = '';
  eresepRWIAPT_modaldaftarobat();
}

function eresepRWIAPT_kosongJenisRacikan(){
  document.getElementById("eresepRWIAPT_urutracik").value    = 0;
  document.getElementById("eresepRWIAPT_nmaracikan").value   = '';
  document.getElementById("eresepRWIAPT_bnykracikan").value  = '';
  document.getElementById("eresepRWIAPT_signaracikan").value = '';
  document.getElementById("eresepRWIAPT_ketracikan").value   = '';
  eresepRWIAPT_enabledObatJenisRacik();
}

function eresepRWIAPT_disabledObatJenisRacik(){
  document.getElementById("eresepRWIAPT_nmaracikan").disabled      = true;
  document.getElementById("eresepRWIAPT_bnykracikan").disabled     = true;
  document.getElementById("eresepRWIAPT_signaracikan").disabled    = true;
  document.getElementById("eresepRWIAPT_ketracikan").disabled      = true;
  $("#eresepRWIAPT_flexracik").val('0');
  document.getElementById("eresepRWIAPT_editRacikan").innerHTML = '<i class="fa fa-edit"></i> Edit Racikan';
}

function eresepRWIAPT_enabledObatJenisRacik(){
  document.getElementById("eresepRWIAPT_nmaracikan").disabled      = false;
  document.getElementById("eresepRWIAPT_bnykracikan").disabled     = false;
  document.getElementById("eresepRWIAPT_signaracikan").disabled    = false;
  document.getElementById("eresepRWIAPT_ketracikan").disabled      = false;
  $("#eresepRWIAPT_nmaracikan").trigger('focus');
}

function eresepRWIAPT_mulaiawalRacikan(){
  eresepRWIAPT_kd_JenisRacikan.reset();
  eresepRWIAPT_kd_signaObatRacik.reset();
  eresepRWIAPT_kosongJenisRacikan();
  $('#eresepRWIAPTtable_obatracik tbody').html('');
  $('#eresepRWIAPT_inputan_obat_racik2').hide();
  document.getElementById("eresepRWIAPT_btn_daftarobat").disabled     = true;
  document.getElementById("eresepRWIAPT_editRacikan").disabled        = true;
  $("#eresepRWIAPT_flexracik").val('0');
  $('#eresepRWIAPT_urutracik').val('0');
}

function eresepRWIAPT_editRacikan(){
  var flexRacik         = $("#eresepRWIAPT_flexracik").val();
  var qtyRacikBefore    = $("#eresepRWIAPT_bnykracikan").val();
  var signaRacikBefore  = $("#eresepRWIAPT_signaracikan").val();
  var ketRacikBefore    = $("#eresepRWIAPT_ketracikan").val();

  if (flexRacik == 0){ //EDIT
    document.getElementById("eresepRWIAPT_bnykracikan").disabled     = false;
    document.getElementById("eresepRWIAPT_signaracikan").disabled    = false;
    document.getElementById("eresepRWIAPT_ketracikan").disabled      = false;
    $("#eresepRWIAPT_bnykracikan").trigger('focus');
    $("#eresepRWIAPT_flexracik").val('1');
    document.getElementById("eresepRWIAPT_editRacikan").innerHTML = '<i class="fa fa-times"></i> Batal Racikan';
  }else{ // BATAL
    document.getElementById("eresepRWIAPT_bnykracikan").disabled     = true;
    document.getElementById("eresepRWIAPT_signaracikan").disabled    = true;
    document.getElementById("eresepRWIAPT_ketracikan").disabled      = true;
    $("#eresepRWIAPT_flexracik").val('0');
    document.getElementById("eresepRWIAPT_editRacikan").innerHTML = '<i class="fa fa-edit"></i> Edit Racikan';

    var nmx              = $("#eresepRWIAPT_infojenis_racikan_2").html();
    var eresepRWIAPT_ambillgi = JSON.parse(sessionStorage.getItem("RACIK_"+nmx));
    
    var racikan  = eresepRWIAPT_ambillgi[0].racikan;
    var qty      = eresepRWIAPT_ambillgi[0].qty;
    var idsigna  = eresepRWIAPT_ambillgi[0].idsigna;
    var signa    = eresepRWIAPT_ambillgi[0].signa;
    var ket      = eresepRWIAPT_ambillgi[0].ket;

    $("#eresepRWIAPT_bnykracikan").val(qty);
    $("#eresepRWIAPT_signaracikan").val(signa);
    $("#eresepRWIAPT_ketracikan").val(ket);
  }
  
  
}

//JENIS RACIKAN
function eresepRWIAPT_obatracik_jenisracikan(nma_racikan, byk_racikan, id_sig_rac, sig_racikan, ket_racikan){
  var Nomor = $('#eresepRWIAPTtable_obatracik_jenisracikan tbody tr').length + 1;
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
     Baris += '<td style="display: flex;"><button type="button" class="btn btn-xs btn-warning" title="Tampilkan '+ nama_racikan+'" onclick="eresepRWIAPT_tampilkan_jenisracik('+"'"+Nomor+"','"+nma_racikan+"','"+byk_racikan+"','"+sig_racikan+"','"+ket_racikan+"','"+x+"'"+')" style="width:100%"><i class="fa fa-arrow-up"></i></button>&nbsp;<button type="button" class="btn btn-xs btn-danger" onclick="eresepRWIAPT_hapus_jenisracik(this, '+"'"+Nomor+"','"+nma_racikan+"','"+byk_racikan+"','"+sig_racikan+"','"+ket_racikan+"','"+nama_racikan+"'"+')" style="width:100%"><i class="fa fa-times"></i></button></td>';
     // Baris += "<td hidden>"+Nomor+"</td>";
     Baris += "<td>";
     Baris += "<input type='text' class='form-control form-control-xxs' name='eresepRWIAPT_jenisracikan[]' value='" + nama_racikan +"' disabled>";
     Baris += "</td>";
     Baris += "<td hidden><input type='text' class='form-control form-control-xxs' name='eresepRWIAPT_byk_racikan[]' value='" + byk_racikan +"' disabled></td>";
     Baris += "<td hidden><input type='text' class='form-control form-control-xxs' name='eresepRWIAPT_idsig_racikan[]' value='" + id_sig_rac +"' disabled></td>";
     Baris += "<td hidden><input type='text' class='form-control form-control-xxs' name='eresepRWIAPT_sig_racikan[]' value='" + sig_racikan +"' disabled></td>";
     Baris += "<td hidden><input type='text' class='form-control form-control-xxs' name='eresepRWIAPT_ket_racikan[]' value='" + ket_racikan +"' disabled></td>";
     Baris += "</tr>";
  
  $('#eresepRWIAPTtable_obatracik_jenisracikan tbody').append(Baris);
  $('#eresepRWIAPT_infojenis_racikan').html('<i class="fa fa-check"></i> '+nama_racikan);
  $('#eresepRWIAPT_infojenis_racikan_2').html(nama_racikan);
  sessionStorage[nama_racikan] = '[{"urut":"1","kd_obt":"kosong","nm_prd":"","dosis":"","qty":"","ket":""}]';
  sessionStorage['RACIK_'+nama_racikan] = '[{"racikan":"'+nama_racikan+'","qty":"'+byk_racikan+'","idsigna":"'+id_sig_rac+'","signa":"'+sig_racikan+'","ket":"'+ket_racikan+'"}]';
}

function eresepRWIAPT_obatracik_editjenisracikan(nama_racikan, byk_racikan, id_sig_rac, sig_racikan, ket_racikan, urut_racikan){
  
  sessionStorage.removeItem('RACIK_'+nama_racikan);
  var current = sessionStorage.getItem('RACIK_'+nama_racikan);
  if (!current) { // check if an item is already registered
    current = []; // if not, we initiate an empty array
  } else {
    current = JSON.parse(current);
    //console.log(current);
  }

  current.push({
    racikan: nama_racikan,
    qty: byk_racikan,
    idsigna: id_sig_rac,
    signa: sig_racikan,
    ket: ket_racikan,
  });
  
  sessionStorage.setItem('RACIK_'+nama_racikan, JSON.stringify(current)); // replace
  eresepRWIAPT_disabledObatJenisRacik();

  document.getElementById("eresepRWIAPTtable_obatracik_jenisracikan").rows[urut_racikan].cells[3].firstChild.value = byk_racikan;
  document.getElementById("eresepRWIAPTtable_obatracik_jenisracikan").rows[urut_racikan].cells[4].firstChild.value = id_sig_rac;
  document.getElementById("eresepRWIAPTtable_obatracik_jenisracikan").rows[urut_racikan].cells[5].firstChild.value = sig_racikan;
  document.getElementById("eresepRWIAPTtable_obatracik_jenisracikan").rows[urut_racikan].cells[6].firstChild.value = ket_racikan;
  tab_eresepRWIAPT_obatracik();
}

function eresepRWIAPT_tampilkan_jenisracik(Nomor, nma_racikan, byk_racikan, sig_racikan, ket_racikan, x){
  nama_racikan = x;
  var current = sessionStorage.getItem('RACIK_'+x);
  if (!current) {
    current = [];
    toastr.error("Gagal ditampilkan!!");
    //break;
  } else {
    current = JSON.parse(current);
    //console.log(current);
    document.getElementById("eresepRWIAPT_urutracik").value     = Nomor;
    var abc;
    for (abc = 0; abc < current.length; abc++) {
      
      var nama  = current[abc].racikan;
      var qty   = current[abc].qty;
      var ket   = current[abc].ket;
      var idsig = current[abc].idsigna;
      var sig   = current[abc].signa;
      
      document.getElementById("eresepRWIAPT_nmaracikan").value     = nama;
      if ((qty != 'null')||(ket != 'null')){
        document.getElementById("eresepRWIAPT_bnykracikan").value  = qty;
        document.getElementById("eresepRWIAPT_ketracikan").value   = ket;
      }else{
        document.getElementById("eresepRWIAPT_bnykracikan").value  = 0;
        document.getElementById("eresepRWIAPT_ketracikan").value   = '';
      }
      
      document.getElementById("eresepRWIAPT_signaracikan").value = sig;
      
    }
  }

  $('#eresepRWIAPT_infojenis_racikan').html('<i class="fa fa-check"></i> '+nama_racikan);
  $('#eresepRWIAPT_infojenis_racikan_2').html(nama_racikan);
  $('#eresepRWIAPT_inputan_obat_racik2').show();
  eresepRWIAPT_disabledObatJenisRacik();
  document.getElementById("eresepRWIAPT_editRacikan").disabled     = false;

  var eresepRWIAPT_storedArray_ObatRacik = JSON.parse(sessionStorage.getItem(nama_racikan));
  
  $('#eresepRWIAPTtable_obatracik tbody').html('');
  
  var i;
  for (i = 0; i < eresepRWIAPT_storedArray_ObatRacik.length; i++) {
    var kd_obt  = eresepRWIAPT_storedArray_ObatRacik[i].kd_obt;
    if (kd_obt != 'kosong'){
      var nm_obat       = eresepRWIAPT_storedArray_ObatRacik[i].nm_prd;
      var dosis         = eresepRWIAPT_storedArray_ObatRacik[i].dosis;
      var qty           = eresepRWIAPT_storedArray_ObatRacik[i].qty;
      var ket           = eresepRWIAPT_storedArray_ObatRacik[i].ket;
      var harga         = eresepRWIAPT_storedArray_ObatRacik[i].total_harga;
      var expired       = eresepRWIAPT_storedArray_ObatRacik[i].exp;
      var harga_satuan  = eresepRWIAPT_storedArray_ObatRacik[i].harga;
      var harga_asli    = eresepRWIAPT_storedArray_ObatRacik[i].harga_asli;
      var totharga_asli = qty * harga_asli;
      eresepRWIAPT_data_obatracik(kd_obt, nm_obat, dosis, qty, ket, harga, expired, harga_satuan, harga_asli, totharga_asli);
    }
    //console.log(kd_obat, nm_obat, dosis, qty, ket);
  }
  document.getElementById("eresepRWIAPT_btn_daftarobat").disabled  = false;
  //eresepRWIAPT_modaldaftarobat();
  eresepRWIAPT_kosongObatRacik();
}

function eresepRWIAPT_hapus_jenisracik(btn, Nomor, nma_racikan, byk_racikan, sig_racikan, ket_racikan, nama_racikan){
  var eresepRWIAPT_session_nama_racikan = nama_racikan;

  var row = btn.parentNode.parentNode;
  row.parentNode.removeChild(row);
  
  //PROSES GET TOTAL QTY OBAT RACIK
  // CARA 2 => let count     =  Object.keys(JSON.parse(sessionStorage.getItem(session_nama_racikan))).length;
  let countx  = JSON.parse(sessionStorage.getItem(eresepRWIAPT_session_nama_racikan));
  let xtotal  = 0;
  let total   = 0;
  var i;
  for (i = 0; i < countx.length; i++) {
    var kd_obat  = countx[i].kd_obat;

    if (kd_obat != 'kosong'){
      let hrgasatobat = countx[i].harga;
      let qtyobat     = countx[i].qty;
      let hrgaobat    = (qtyobat * hrgasatobat);
      xtotal += Number(hrgaobat);
      sessionStorage.removeItem(nama_racikan+"RI"+countx[i].kd_obt);
    }
  }
  
  var totalx = document.getElementById("eresepRWIAPT_hargaTotal").value;
  total = parseInt(totalx) - parseInt(xtotal);
  // console.log(parseInt(totalx));
  // console.log(parseInt(xtotal));
  
  document.getElementById("eresepRWIAPT_hargaTotal").value = total;
  document.getElementById("veresepRWIAPT_hargaTotal").innerHTML = numberformat(total);
  eresepRWIAPT_getPPnValue(total);
  var no = 1;
  $('#eresepRWIAPTtable_obatracik_jenisracikan tbody tr').each(function(){
    $(this).find('td:nth-child(1)').html(no);
    no++;
  });

  sessionStorage.removeItem(eresepRWIAPT_session_nama_racikan);
  sessionStorage.removeItem('RACIK_'+eresepRWIAPT_session_nama_racikan);
  $('#eresepRWIAPTtable_obatracik tbody').html('');
  tab_eresepRWIAPT_obatracik();
  eresepRWIAPT_enabledObatJenisRacik();
  $("#eresepRWIAPT_nmaracikan").trigger('focus');
}

// OBAT RACIK
function eresepRWIAPT_data_obatracik(kd_obt, nm_obat, dosis, qty, ket, harga, expired, harga_satuan, harga_asli, totharga_asli){
  var nomor = $('#eresepRWIAPTtable_obatracik tbody tr').length + 1;  
  var Baris = '';
      Baris += '<tr>';
      Baris += "<td class='pl-0'>";
      Baris += "<input style='text-align:center;' type='text' class='form-control form-control-xxs' name='eresepRWIAPT_obtracikurut[]' value='" + nomor + "' disabled>";
      Baris += "</td>";
      Baris += "<td style='display: flex;'><button type='button' class='btn btn-xs btn-danger' onclick='eresepRWIAPT_hapusbaris_obatracik(this, "+nomor+")' id='eresepRWIAPT_hapusbaris_obatracik" + nomor + "' style='width:100%'><i class='fa fa-times'></i></button><button type='button' class='btn btn-xs btn-warning' onclick='eresepRWIAPT_editbaris_obatracik(this, "+nomor+")' style='width:100%'><i class='fa fa-edit'></i></button></td>";
      Baris += "<td>";
      Baris += "<input type='text' class='form-control form-control-xxs' name='eresepRWIAPT_obtracikkd_obt[]' value='" + kd_obt + "' disabled>";
      Baris += "</td>";
      Baris += "<td>";
      Baris += "<input type='text' class='form-control form-control-xxs' name='eresepRWIAPT_obtraciknm_obat[]' value='" + nm_obat + "' disabled>";
      Baris += "</td>";
      Baris += "<td>";
      Baris += "<input type='text' class='form-control form-control-xxs' name='eresepRWIAPT_obtracikdosis[]' value='" + dosis + "' disabled>";
      Baris += "</td>";
      Baris += "<td class='pl-0'>";
      Baris += "<input type='number' class='form-control form-control-xxs' name='eresepRWIAPT_obtracikqty[]' value='" + qty + "' style='text-align: left;' disabled>";
      Baris += "</td>";
      Baris += "<td class='pl-0'>";
      Baris += "<input type='text' class='form-control form-control-xxs' name='eresepRWIAPT_obtracikharga[]' value='" + harga + "' disabled style='text-align: right;'>";
      Baris += "</td>";
      Baris += "<td>";
      Baris += "<input type='date' class='form-control form-control-xxs' name='eresepRWIAPT_obtracikexp[]' value='" + expired + "' disabled>";
      Baris += "</td>";
      Baris += "<td>";
      Baris += "<input type='text' class='form-control form-control-xxs' name='eresepRWIAPT_obtracikket[]' value='" + ket + "' disabled>";
      Baris += "</td>";
      /*
        Harga Satuan DIBAWAH HARGA SUDAH MARGIN
      */
      Baris += "<td style='display:none;'>";
      Baris += "<input type='text' class='form-control form-control-xxs' name='eresepRWIAPT_obtracikharga_satuan[]' value='" + harga_satuan + "' disabled>";
      Baris += "</td>";
      /*
        Harga Satuan DIBAWAH HARGA ASLI
      */
      Baris += "<td style='display:none;'>";
      Baris += "<input type='text' class='form-control form-control-xxs' name='eresepRWIAPT_obtracikharga_asli[]' value='" + harga_asli + "' disabled>";
      Baris += "</td>";
      Baris += "<td style='display:none;'>";
      Baris += "<input type='text' class='form-control form-control-xxs' name='eresepRWIAPT_obtraciktotharga_asli[]' value='" + totharga_asli + "' disabled>";
      Baris += "</td>";

      Baris += "</tr>";

  var getkd_obtx = document.getElementsByName('eresepRWIAPT_obtracikkd_obt[]');
  
  var jmlObat   = $('#eresepRWIAPTtable_obatracik tbody tr').length;
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
  //console.log(status_kd_obatk);

  if (status_kd_obt == false){
    $('#eresepRWIAPTtable_obatracik tbody').append(Baris);
    
    eresepRWIAPT_sessionStorage_Racikan();
  }else{
    var urut = document.getElementById("eresepRWIAPT_obat_racik_urut").value;
    if (urut != ''){
      $('#eresepRWIAPTtable_obatracik tbody').append(Baris);
      
      // var totalx = document.getElementById("eresepRWIAPT_hargaTotal").value;
      // total = parseInt(totalx) - parseInt(eresepRWIAPT_obatracik_harga);
      // document.getElementById("eresepRWIAPT_hargaTotal").value = total;
      // document.getElementById("veresepRWIAPT_hargaTotal").innerHTML = numberformat(total);

      var hapusrow = document.getElementById("eresepRWIAPT_hapusbaris_obatracik"+urut); 
      hapusrow.click();

      eresepRWIAPT_sessionStorage_Racikan();
    }else{
      toastr.error("Obat Sudah Diinputkan!!");
    }
  }
}

function eresepRWIAPT_hapusbaris_obatracik(btn, nomor){
  var row = btn.parentNode.parentNode;
  
  let total   = 0;
  //var harga   = document.getElementById("eresepRWIAPTtable_obatracik").rows[nomor].cells[6].firstChild.value;
  var qty           = document.getElementById("eresepRWIAPTtable_obatracik").rows[nomor].cells[5].firstChild.value;
  var harga_satuan  = document.getElementById("eresepRWIAPTtable_obatracik").rows[nomor].cells[9].firstChild.value;
  var totalx = document.getElementById("eresepRWIAPT_hargaTotal").value;
  total = parseInt(totalx) - (qty * harga_satuan);
  document.getElementById("eresepRWIAPT_hargaTotal").value = total;
  document.getElementById("veresepRWIAPT_hargaTotal").innerHTML = numberformat(total);
  eresepRWIAPT_getPPnValue(total);
  
  row.parentNode.removeChild(row);
  eresepRWIAPT_sessionStorage_Racikan();
  var no = 1;
  $('#eresepRWIAPTtable_obatracik tbody tr').each(function(){
    $(this).find('td:nth-child(1)').html("<input style='text-align:center;' type='text' class='form-control form-control-xxs' name='eresepRWIAPT_obtracikurut[]' value='" + no + "' disabled>");
    $(this).find('td:nth-child(2)').html("<button type='button' class='btn btn-xs btn-danger' onclick='eresepRWIAPT_hapusbaris_obatracik(this, "+no+")' id='eresepRWIAPT_hapusbaris_obatracik" + no + "' style='width:100%'><i class='fa fa-times'></i></button><button type='button' class='btn btn-xs btn-warning' onclick='eresepRWIAPT_editbaris_obatracik(this, "+no+")' style='width:100%'><i class='fa fa-edit'></i></button>");
    no++;
  });
}

function eresepRWIAPT_editbaris_obatracik(btn, nomor){
  var kd_obt        = document.getElementById("eresepRWIAPTtable_obatracik").rows[nomor].cells[2].firstChild.value;
  var nm_obat       = document.getElementById("eresepRWIAPTtable_obatracik").rows[nomor].cells[3].firstChild.value;
  var dosis         = document.getElementById("eresepRWIAPTtable_obatracik").rows[nomor].cells[4].firstChild.value;
  var qty           = document.getElementById("eresepRWIAPTtable_obatracik").rows[nomor].cells[5].firstChild.value;
  var ket           = document.getElementById("eresepRWIAPTtable_obatracik").rows[nomor].cells[8].firstChild.value;
  var harga_satuan  = document.getElementById("eresepRWIAPTtable_obatracik").rows[nomor].cells[9].firstChild.value;
  var exp           = document.getElementById("eresepRWIAPTtable_obatracik").rows[nomor].cells[7].firstChild.value;
  var urut          = document.getElementById("eresepRWIAPTtable_obatracik").rows[nomor].cells[0].firstChild.value;
  var harga_asli    = document.getElementById("eresepRWIAPTtable_obatracik").rows[nomor].cells[10].firstChild.value;

  $("#eresepRWIAPT_obat_racik_qty").trigger('focus');

  document.getElementById("eresepRWIAPT_obat_racik_kdobat").value  = kd_obt;
  document.getElementById("eresepRWIAPT_obat_racik_nmaobat").value = nm_obat;
  document.getElementById("eresepRWIAPT_obat_racik_dosis").value   = dosis;
  document.getElementById("eresepRWIAPT_obat_racik_qty").value     = qty;
  document.getElementById("eresepRWIAPT_obat_racik_ket").value     = ket;
  document.getElementById("eresepRWIAPT_obat_racik_exp").value     = exp;
  document.getElementById("eresepRWIAPT_obat_racik_urut").value    = urut;
  eresepRWIAPT_obatracik_harga = harga_satuan;
  eresepRWIAPT_obatracik_hargasat = harga_asli;
  //console.log(eresepRWIAPT_obatracik_harga);
}

function eresepRWIAPT_sessionStorage_Racikan(){
  var getkd_obat      = document.getElementsByName('eresepRWIAPT_obtracikkd_obt[]');
  var getnm_prd       = document.getElementsByName('eresepRWIAPT_obtraciknm_obat[]');
  var getdosis        = document.getElementsByName('eresepRWIAPT_obtracikdosis[]');
  var getqty          = document.getElementsByName('eresepRWIAPT_obtracikqty[]');
  var getharga        = document.getElementsByName('eresepRWIAPT_obtracikharga[]');
  var getket          = document.getElementsByName('eresepRWIAPT_obtracikket[]');
  var geturut         = document.getElementsByName('eresepRWIAPT_obtracikurut[]');
  var getexp          = document.getElementsByName('eresepRWIAPT_obtracikexp[]');
  var getharga_satuan = document.getElementsByName('eresepRWIAPT_obtracikharga_satuan[]');
  var getharga_asli   = document.getElementsByName('eresepRWIAPT_obtracikharga_asli[]');
  var count           = $('#eresepRWIAPTtable_obatracik tbody tr').length;
  
  const params  = [];  
  
  for(var i = 0, iLen = count ; i < iLen; i++){
    var x = {};
    x.urut          = geturut[i].value;
    x.kd_obt        = getkd_obat[i].value;
    x.nm_prd        = getnm_prd[i].value;
    
    if (getdosis[i].value !== ''){
      x.dosis       = getdosis[i].value;
    }else{
      x.dosis       = "0";
    }

    x.qty           = getqty[i].value;
    x.total_harga   = getharga[i].value;
    x.ket           = getket[i].value;
    x.exp           = getexp[i].value;
    x.harga         = getharga_satuan[i].value; // SUDAH MARGIN
    x.harga_asli    = getharga_asli[i].value;   // BELUM MARGIN
    params.push(x);
  }
  
  if (nama_racikan != '' || nama_racikan != null){
    sessionStorage[nama_racikan] = JSON.stringify(params);
  }else{

  }
}

//PROSES SIMPAN
function eresepRWIAPT_params_SimpanObatJadi(){  
  var getkd_obt     = document.getElementsByName('eresepRWIAPT_obtjadikd_obt[]');
  var getnm_prd     = document.getElementsByName('eresepRWIAPT_obtjadinm_obat[]');
  var getqty        = document.getElementsByName('eresepRWIAPT_obtjadiqty[]');
  var getidsig      = document.getElementsByName('eresepRWIAPT_obtjadiidsigna[]');
  var getsigna      = document.getElementsByName('eresepRWIAPT_obtjadisigna[]');
  var getket        = document.getElementsByName('eresepRWIAPT_obtjadiket[]');
  var geturut       = document.getElementsByName('eresepRWIAPT_obtjadiurut[]');
  var getharga      = document.getElementsByName('eresepRWIAPT_obtjadiharga[]');
  var gethargaJual  = document.getElementsByName('eresepRWIAPT_obtjadiharga_satuan[]');
  var gethargaAsli  = document.getElementsByName('eresepRWIAPT_obtjadiharga_asli[]');
  var getexp        = document.getElementsByName('eresepRWIAPT_obtjadiexp[]');
  var count         = $('#eresepRWIAPTtable_obatjadi tbody tr').length;
  
  var params = {};  
  params.data     = [];
  for(var i = 0, iLen = count ; i < iLen; i++){
    var x = {};
    x.kd_obt    = getkd_obt[i].value;
    x.nm_prd    = getnm_prd[i].value;
    x.qty       = getqty[i].value;
    x.signa     = getidsig[i].value;
    x.ket       = getket[i].value;
    x.harga     = getharga[i].value;
    x.hargaJual = gethargaJual[i].value;
    x.hargaAsli = gethargaAsli[i].value;
    x.hargaAsliTot = (x.qty * x.hargaAsli);
    //params.push(x);
    if (typeof(geturut[i].value) !== 'undefined') {
      x.urut  = geturut[i].value;
    }else{
      x.urut  = "";
    }

    if (getexp[i].value != ''){
      x.exp     = getexp[i].value;
      x.stok    = JSON.parse(sessionStorage.getItem("ObatJadiRI"+x.kd_obt));
    }else{
      toastr.error('Expired Date Obat Belum di Tentukan...');
    }
    
    params.data.push(x);
  }
  
  //console.log(params.data);
  return params.data;
}

function eresepRWIAPT_params_SimpanObatRacik(){

  var getNma      = document.getElementsByName('eresepRWIAPT_jenisracikan[]');
  var getBnyk     = document.getElementsByName('eresepRWIAPT_byk_racikan[]');
  var getIdSigna  = document.getElementsByName('eresepRWIAPT_idsig_racikan[]');
  var getSigna    = document.getElementsByName('eresepRWIAPT_sig_racikan[]');
  var getKet      = document.getElementsByName('eresepRWIAPT_ket_racikan[]');
  var count       = $('#eresepRWIAPTtable_obatracik_jenisracikan tbody tr').length;
    
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
    // for(var a = 0, iLen2 = x.obat.length ; a < iLen2; a++){
    //   var xx = {};
    //   xx.kd_obt  = x.obat[a].kd_obt;
    //   xx.stok    = JSON.parse(sessionStorage.getItem("ObatRacik-"+x.obat[a].kd_obt));
    //   params.data.push(xx);
    // }
  }

  //console.log(params.data);
  return params.data;
}

function eresepRWIAPT_updateStokObat1(){
  var getkd_obt = document.getElementsByName('eresepRWIAPT_obtjadikd_obt[]');
  var count     = $('#eresepRWIAPTtable_obatjadi tbody tr').length;
  
  var params = {};  
  params.data     = [];
  for(var i = 0, iLen = count ; i < iLen; i++){
    var x = {};
    var nm = 'ObatJadiRI'+getkd_obt[i].value;
    
    if (sessionStorage.getItem(nm) != null){
      x.stok       = JSON.parse(sessionStorage.getItem("ObatJadiRI"+getkd_obt[i].value));
      x.countjmlh  = x.stok.length;
    }else{
      x.countjmlh  = 0;
    }
    
    params.data.push(x);
  }

  return params.data;
}

function eresepRWIAPT_updateStokObat2(){
  var getNma    = document.getElementsByName('eresepRWIAPT_jenisracikan[]');
  var count    = $('#eresepRWIAPTtable_obatracik_jenisracikan tbody tr').length;
  
  var params = {};  
  params.data     = [];
  for(var ii = 0, iLen = count ; ii < iLen; ii++){
    
    Nama  = getNma[ii].value;
    obat  = JSON.parse(sessionStorage.getItem(Nama));

    for(var a = 0, iLen2 = obat.length ; a < iLen2; a++){
      var x   = {};
      var nm  = Nama+"RI"+obat[a].kd_obt;
      //console.log(nm);
      if (sessionStorage.getItem(nm) != null){
        x.stok       = JSON.parse(sessionStorage.getItem(nm));
        x.countjmlh  = x.stok.length;
      }else{
        x.countjmlh  = 0;
      }
      params.data.push(x);
    }
  }
  
  return params.data;
}

var cek_data = false;

function eresepRWIAPT_simpanobatin(){
  document.getElementById('loading_modal_eresepRWIAPT').style.display = 'block';

  var param = {
    dataRWJAPT            : eresepRWIAPT_params_SimpanObatJadi(),
    data_racikRWJAPT      : eresepRWIAPT_params_SimpanObatRacik(),
    noresepRWJAPT         : document.getElementById("eresepRWIAPT_vi_noresep").value,
    normRWJAPT            : norm,
    sepRWJAPT             : document.getElementById("eresepRWIAPT_vi_sep").value,
    id_orderRWJAPT        : id_order,
    id_kunjRWJAPT         : idkunj,
    id_unitRWJAPT         : idunit,
    id_pegRWJAPT          : iddokter,
    userRWJAPT            : user['id_user'],
    id_pegUserRWJAPT      : user['id_pegawai'],
    jmlObatRWJAPT         : $('#eresepRWIAPTtable_obatjadi tbody tr').length,
    jmlObatRacikRWJAPT    : $('#eresepRWIAPTtable_obatracik_jenisracikan tbody tr').length,
    tgl_kunjRWJAPT        : tglkunj,
    tglorderRWJAPT        : tgl_ord,
    tglresepRWJAPT        : document.getElementById('eresepRWIAPT_vi_tglresep').value,
    catalergiRWJAPT       : document.getElementById('eresepRWIAPT_vi_cat_alergi').value,
    liveresepRWJAPT       : liveresepRWIAPT_check,
    penjaminresepRWJAPT   : document.getElementById('eresepRWIAPT_vi_penjamin').value,
    grandtotalresepRWJAPT : document.getElementById('eresepRWIAPT_hargaTotal').value,
    ppnresepRWJAPT        : document.getElementById('eresepRWIAPT_ppn').value,
    hppresepRWJAPT        : 0,
    updateStokObatJadi    : eresepRWIAPT_updateStokObat1(),
    updateStokObatRacik   : eresepRWIAPT_updateStokObat2(),
    kd_milikObatbyUser    : user['kepemilikan_obat'],
  };
    
  apiPOST('Apotek/CreateResepRJRIIGD', param, hasil => {
    cek_data = true;
    eresepRWIAPT_loading();
    if (hasil !== null) {
      
      if (hasil['code'] == '200'){
        //document.getElementById("eresepRWIAPT_vi_noresep").value = hasil['x'];
        var result = hasil['result'];
        for (var i = 0; i < result.length; i++) {
          document.getElementById("eresepRWIAPT_vi_noresep").value = result[i].noresep;
          document.getElementById("eresepRWIAPT_vi_unit").value    = result[i].id_unit;
          //idkunj      = result[i].id_kunjungan;
          id_kunjungan_far  = result[i].id_kunjungan_far;
          //idunit      = result[i].id_unit;
          //noresep     = result[i].noresep;
          //id_trans    = hasil['id_transaksi'];
        }
      }else if (hasil['code'] == '501'){
        toastr.error('Resep Sudah Dilayani Apotik!!');
      }else if (hasil['code'] == '502'){
        toastr.error('Expired Date Obat Belum di Tentukan...');
      }else{
        toastr.error('Gagal Simpan Resep!!');
      }
    }
  }).then(function(){
    //eresepRWIAPT_loading();
  });
}

function eresepRWIAPT_loading(){
  if(cek_data){
    document.getElementById('loading_modal_eresepRWIAPT').style.display = 'none';
  }else{
    document.getElementById('loading_modal_eresepRWIAPT').style.display = 'none';
  }
}

function eresepRWIAPT_transferObat(){
  var noresepAPTRWI = document.getElementById("eresepRWIAPT_vi_noresep").value;
  var sts_telaah    = document.getElementById("eresepRWIAPT_penentu_telaahobat").value;

  if (sts_telaah == 0){
    toastr.info('Resep Belum di Telaah!!');
    eresepRWIAPT_telaahresep();
    return;
  }

  if (noresepAPTRWI != ''){
    pertanyaan.fire({
      title             : 'Tranfer Kasir<br>(Jangan Lupa di Simpan Kemudian Transfer!!)',
      html              : 'Resep sudah benar, lanjut transfer ?',
      icon              : 'warning',
      // showCancelButton  : true,
      reverseButtons    : false,
      allowOutsideClick : false,
      showDenyButton    : true,
      showCancelButton  : true,
      confirmButtonText : '<i class="fa fa-thumbs-up"></i> Transfer',
      denyButtonText    : '<i class="fa fa-eye"></i> Preview Detail Obat',
      focusConfirm      : false,
    }).then((result) => {
      if (result.isConfirmed) {
        $('#loading_modal_eresepRWIAPT').show();
        var param = {
          noresep   : noresepAPTRWI,
          id_kunj   : idkunj,
          id_unit   : idunit,
          norm      : norm,
          nmpasien  : nmapasien,
          tgl_kunj  : tglkunj,
          tgl_resep : document.getElementById('eresepRWIAPT_vi_tglresep').value,
          id_peg    : iddokter,
          user      : user['id_user'],
          totharga  : document.getElementById("eresepRWIAPT_hargaTotal").value
        };

        apiPOST('Apotek/transferObat_penjualanApotek', param, hasil => {
          if (hasil !== null) {
            $('#loading_modal_eresepRWIAPT').hide();
            //toastr.success("Berhasil di Transfer!!");
            keluar_eresepRWIAPT();
            sukses('Berhasil di Transfer', '');
          }else{
            $('#loading_modal_eresepRWIAPT').hide();
          }
        }).then(function(){
          $('#loading_modal_eresepRWIAPT').hide();
        });
        
      // }else if(result.dismiss === Swal.DismissReason.cancel){
        
      // }
      } else if (result.isDenied) {
        eresepRWIAPT_prevObat();
      }
    })
  }else{
    toastr.warning("Resep Belum disimpan...");
  }
}

function eresepRWIAPT_hapusresepRWIAPT(){
  var noresep = document.getElementById("eresepRWIAPT_vi_noresep").value;
  if (noresep != ''){    
    pertanyaan.fire({
      title             : 'Hapus Resep RI, masukkan alasan dihapus ?',
      //html              : '<span>Yakin dihapus ?</span>',
      html              : '<input type="text" class="form-control form-control-sm" id="reasonhapus_resep" class="swal2-input" placeholder="Enter your reason" autocomplete="off" required>',
      icon              : 'error',
      showCancelButton  : true,
      reverseButtons    : false,
      allowOutsideClick : false
    }).then((result) => {
      if (result.isConfirmed) {
        var reasonhapus_resep = document.getElementById('reasonhapus_resep').value;
        if (reasonhapus_resep != ''){
          $('#loading_modal_eresepRWIAPT').show();
          var param = {
            id_peg    : user['id_pegawai'],
            noresep   : noresep,
            idkunj    : idkunj,
            idunit    : idunit,
            user      : user['id_user'],
            tglkunj   : tglkunj,
            tglresep  : document.getElementById("eresepRWIAPT_vi_tglresep").value,
            tglorder  : tgl_ord,
            id_order  : id_order,
            norm      : norm,
            reason    : reasonhapus_resep,
            totharga  : document.getElementById("eresepRWIAPT_hargaTotal").value
          };

          apiPOST('Apotek/HapusResepRWJAPT', param, hasil => {
            if (hasil !== null) {
              $('#loading_modal_eresepRWIAPT').hide();
              sessionStorage.clear();
              
              $('#eresepRWIAPTtable_obatjadi tbody').html('');
              $('#eresepRWIAPTtable_obatracik_jenisracikan tbody').html('');
              $('#eresepRWIAPTtable_obatracik tbody').html('');

              document.getElementById("eresepRWIAPT_vi_noresep").value            = '';
              document.getElementById("eresepRWIAPT_vi_cat_alergi").value         = '';
              document.getElementById("veresepRWIAPT_hargaTotal").innerHTML       = '0';
              document.getElementById("eresepRWIAPT_hargaTotal").value            = '0';
              document.getElementById("eresepRWIAPT_infojenis_racikan").innerHTML = '-';
              document.getElementById("eresepRWIAPT_infojenis_racikan_2").innerHTML = '';

              eresepRWIAPT_kosongJenisRacikan();
              let total = 0;
              eresepRWIAPT_getPPnValue(total);
            }else{
              $('#loading_modal_eresepRWIAPT').hide();
              document.getElementById("eresepRWIAPT_btn_daftarobat").disabled  = true;
            }
          });
        }else{
          swal_center('Alasan tidak boleh kosong!!','error')
        }
        
      }else if(result.dismiss === Swal.DismissReason.cancel){
        
      }
    })
  }
}

function eresepRWIAPT_prevObat(){
  var json_data = {
    'id_kunjprevRWJAPT'   : idkunj,
    'tgl_kunjprevRWJAPT'  : tglkunj,
    'tgl_respprevRWJAPT'  : document.getElementById('eresepRWIAPT_vi_tglresep').value,
    'no_rmprevRWJAPT'     : norm,
    'idunitprevRWJAPT'    : idunit,
    'noresepRWJAPT'       : document.getElementById("eresepRWIAPT_vi_noresep").value,
  };

  var myJSON = JSON.stringify(json_data);
  $('.listeresepRjRIIGD_contentobat').load('Apotek/preview_detailObatRJRIIGD_APT?data='+ myJSON);
}

function eresepRWIAPT_refresh(){
  pertanyaan.fire({
    title             : 'Refresh Data',
    html              : '<span>Jika Resep sudah tersimpan, Data akan dikembalikan ke Data terakhir tersimpan. Jika belum tersimpan, kembali semula Order Resep. Tetap lanjut ?</span>',
    icon              : 'warning',
    showCancelButton  : true,
    reverseButtons    : false,
    allowOutsideClick : false
  }).then((result) => {
    if (result.isConfirmed) {
      getData_OrderEresepRWIAPT();
    }else if(result.dismiss === Swal.DismissReason.cancel){
      
    }
  })
}

function cetaketiketRWI_ObatDalam(){

  var param = {
    'id_kunj'   : idkunj,
    'tgl_kunj'  : tglkunj,
    'tgl_resp'  : document.getElementById('eresepRWIAPT_vi_tglresep').value,
    'no_rm'     : norm,
    'idunit'    : idunit,
    'noresep'   : document.getElementById("eresepRWIAPT_vi_noresep").value,
    'jenisObat' : '1'
  };

  if (document.getElementById("eresepRWIAPT_vi_noresep").value == ''){
    toastr.error('Resep Belum Disimpan!!');
  }else{
    newTabPOST('API/Apotek/etiketUDD', param);
  }
  return;
}

function cetaketiketRWI_ObatLuar(){

  var param = {
    'id_kunj'   : idkunj,
    'tgl_kunj'  : tglkunj,
    'tgl_resp'  : document.getElementById('eresepRWIAPT_vi_tglresep').value,
    'no_rm'     : norm,
    'idunit'    : idunit,
    'noresep'   : document.getElementById("eresepRWIAPT_vi_noresep").value,
    'jenisObat' : '2'
  };
    
  if (document.getElementById("eresepRWIAPT_vi_noresep").value == ''){
    toastr.error('Resep Belum Disimpan!!');
  }else{
    newTabPOST('API/Apotek/etiketUDD', param);
  }
  return;
}

function cetakRWI_Bill(){

  var param = {
    'id_kunj'   : idkunj,
    'tgl_kunj'  : tglkunj,
    'tgl_resp'  : document.getElementById('eresepRWIAPT_vi_tglresep').value,
    'no_rm'     : norm,
    'idunit'    : idunit,
    'noresep'   : document.getElementById("eresepRWIAPT_vi_noresep").value
  };
  
  if (document.getElementById("eresepRWIAPT_vi_noresep").value == ''){
    toastr.error('Resep Belum Disimpan!!');
  }else{
    newTabPOST('API/Laporan/LaporanBillResep', param);
  }
  return;
}

function eresepRWIAPT_telaahresep(){
  var noresepAPTRI = document.getElementById("eresepRWIAPT_vi_noresep").value;

  if (noresepAPTRI == ''){
    swal_center('Tidak ada Resep?!','error')
  }else{
    var json_data = {
      'nm_modul'  : 'eresepRWIAPT_penentu_telaahobat',
      'id_kunj'   : id_kunjungan_far,
      'tgl_kunj'  : tglkunj,
      'tgl_resep' : document.getElementById('eresepRWIAPT_vi_tglresep').value,
      'no_rm'     : norm,
      'idunit'    : idunit,
      'noresep'   : noresepAPTRI,
    };

    var myJSON = JSON.stringify(json_data);
    $('.listeresepRjRIIGD_contentobat').load('Apotek/telaah_ResepObat?data='+ myJSON);
  }
}

function eresepRWIAPT_hapusorder(){
  var noresep = document.getElementById("eresepRWIAPT_vi_noresep").value;
  $('#loading_modal_eresepRWIAPT').show();
  if (id_order == ''){
    toastr.error("Order Tidak DiKetahui!!");
    $('#loading_modal_eresepRWIAPT').hide();
    return;
  }

  if (noresep == ''){
    pertanyaan.fire({
      title             : 'Hapus Order Resep RI',
      html              : '<span>Yakin dihapus ?</span>',
      icon              : 'question',
      showCancelButton  : true,
      reverseButtons    : false,
      allowOutsideClick : false
    }).then((result) => {
      if (result.isConfirmed) {
        $('#loading_modal_eresepRWIAPT').show();
        var param = {
          id_peg    : user['id_pegawai'],
          id_order  : id_order,
          user      : user['id_user'],
          tglorder  : tgl_ord,
        };

        apiPOST('Apotek/HapusOrderEresepRJ', param, hasil => {
          $('#loading_modal_eresepRWIAPT').hide();
          if (hasil !== null) {
            sessionStorage.clear();
            keluar_eresepRWIAPT();
          }else{
            document.getElementById("eresepRWIAPT_btn_daftarobat").disabled  = true;
          }
        });
      }else if(result.dismiss === Swal.DismissReason.cancel){
        $('#loading_modal_eresepRWIAPT').hide();
      }
    })
  }else{
    toastr.error("Order Resep Sudah Di Layani !!.");
    $('#loading_modal_eresepRWIAPT').hide();
    return;
  }
}

</script>