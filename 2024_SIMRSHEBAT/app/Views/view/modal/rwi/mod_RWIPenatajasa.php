<?php
date_default_timezone_set('Asia/Jakarta'); // Zona Waktu indonesia
$data = json_decode($_GET['data']);
$RWIidtrans      = str_replace('"', '', json_encode($data->idtrans));
// $RWInowday       = str_replace('"', '', json_encode($data->nowday));
$RWInowday       = date('Y-m-d');;
$RWItglkunj      = str_replace('"', '', json_encode($data->tgl_kunj));
//$tglkunj      = date_format(date_create($tglkunjungan), 'd-M-Y'); //FORMAT TGL 02-Feb-2023
$RWInorm         = str_replace('"', '', json_encode($data->no_rm));
$RWInmapasien    = str_replace('"', '', json_encode($data->nama));
$RWIalamat       = str_replace('"', '', json_encode($data->alamat));
$RWIumur         = str_replace('"', '', json_encode($data->umur));
$RWIpenjamin     = str_replace('"', '', json_encode($data->penjamin));
$RWIsep          = str_replace('"', '', json_encode($data->sep));
$RWItelp         = str_replace('"', '', json_encode($data->telp));
$RWIidunit       = str_replace('"', '', json_encode($data->idunit));
$RWIunit         = str_replace('"', '', json_encode($data->unit));
//$RWIidkunj       = str_replace('"', '', json_encode($data->idkunj));
$RWIposting      = str_replace('"', '', json_encode($data->posting));
$RWIdokter       = str_replace('"', '', json_encode($data->dokter));
$RWIidpegawai       = str_replace('"', '', json_encode($data->idpegawai));
$RWIidpenjamin      = str_replace('"', '', json_encode($data->id_penjamin));
$RWIruang      = str_replace('"', '', json_encode($data->namaruang));
$RWIkamar      = str_replace('"', '', json_encode($data->namakamar));
$RWIidkamar      = str_replace('"', '', json_encode($data->id_kamar));
$keberadaanPentajasa = $RWIruang . ' ' . $RWIkamar;



if ($RWIposting == 't') {
  $RWIdis = "disabled";
} else if ($RWIposting == 'f') {
  $RWIdis = "";
}
?>
<section class="content pb-0" id="mod_RWIPenatajasa_content">
  <div class="container-fluid h-100">

    <div class="row p-1">
      <div class="overlay-wrapper" id="loading_penatajasa_rwi">
        <div class="overlay">
          <i class="fas fa-3x fa-sync-alt fa-spin"></i>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-12 p-1">
        <div class="info-box mb-0">
          <input type="hidden" class="form-control form-control-xs" id="mod_RWIPenatajasa_idunit" name="mod_RWIPenatajasa_idunit" value="<?php echo $RWIidunit ?>" disabled>

          <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
            <tbody>
              <tr>
                <td width="70">Tgl. Kunj.</td>
                <td>:</td>
                <td><input type="date" class="form-control form-control-xs" id="mod_RWIPenatajasa_tglkunj" disabled></td>
              </tr>

              <tr>
                <td>Id. Transaksi.</td>
                <td>:</td>
                <td><input type="text" class="form-control form-control-xs" id="mod_RWIPenatajasa_notrans" disabled></td>
              </tr>
              <tr>
                <td>Penjamin</td>
                <td>:</td>
                <td><input type="text" class="form-control form-control-xs" id="mod_RWIPenatajasa_penjamin" disabled></td>
              </tr>
              <tr>
                <td>SJP/SEP</td>
                <td>:</td>
                <td><input type="text" class="form-control form-control-xs" id="mod_RWIPenatajasa_nosep" disabled></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-12 p-1">
        <div class="info-box mb-0">
          <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
            <tbody>
              <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><input type="text" class="form-control form-control-xs" id="mod_RWIPenatajasa_alamat" disabled></td>
              </tr>
              <tr>
                <td>Umur</td>
                <td>:</td>
                <td><input type="text" class="form-control form-control-xs" id="mod_RWIPenatajasa_umur" disabled></td>
              </tr>
              <tr>
                <td>No. RM</td>
                <td>:</td>
                <td><input type="text" class="form-control form-control-xs" id="mod_RWIPenatajasa_norm" disabled></td>
              </tr>
              <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" class="form-control form-control-xs" id="mod_RWIPenatajasa_nmpasien" disabled></td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>

      <div class="col-md-6 col-sm-6 col-12 p-1">
        <div class="info-box mb-0">
          <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
            <tbody>
              <tr>
                <td>Unit</td>
                <td>:</td>
                <td><input type="text" class="form-control form-control-xs" id="mod_RWIPenatajasa_unit" disabled></td>
                <td>Kunj.</td>
                <td>:</td>
                <td><input type="text" class="form-control form-control-xs" id="mod_RWIPenatajasa_idkunjungandinamis" name="mod_RWIPenatajasa_idkunjungandinamis" disabled></td>
                <td>Depo</td>
                <td>:</td>
                <td><input type="text" class="form-control form-control-xs" id="mod_RWIPenatajasa_depo" disabled></td>
              </tr>
              <tr>
                <td>Dokter</td>
                <td>:</td>
                <td colspan="7"><input type="text" class="form-control form-control-xs" id="mod_RWIPenatajasa_dokter" disabled></td>
              </tr>
              <tr>
                <td>Ruang</td>
                <td>:</td>
                <td colspan="7"><input type="text" class="form-control form-control-xs" id="mod_RWIPenatajasa_ruang" disabled></td>
              </tr>
              <tr>
                <td>Kamar</td>
                <td>:</td>
                <td colspan="7"><input type="text" class="form-control form-control-xs" id="mod_RWIPenatajasa_kamar" disabled></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="col-md-12 p-1">
        <div class="card card-row">
          <div class="card-header p-1 darkgrey-custom">
            <!-- <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="showModalStockUnit('<?php  ?>')" <?php echo $RWIdis ?>><i class="fas fa-exchange"></i> Stok BHP</button> -->
            <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="mod_RWIPenatajasa_modalposting()" <?php echo $RWIdis ?> id="mod_RWIPenatajasa_btnposting1"><i class="fa fa-check"></i> Posting Transaksi</button>
            <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="mod_RWIPenatajasa_modalpindahkamar()" <?php echo $RWIdis ?> id="mod_RWIPenatajasa_btnpindahkamar"><i class="fas fa-exchange"></i> Pindah Kamar</button>
            <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="mod_RWIPenatajasa_gantidokter()" <?php echo $RWIdis ?> id="mod_RWIPenatajasa_btngantidokter"><i class="fa fa-user"></i> Ganti Dokter Pasien</button>
            <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="mod_RWIPenatajasa_getlistproduk()"><i class="fa fa-sync-alt fa-spin"></i> Refresh</button>
            <button type="button" class="btn bg-gradient-secondary btn-xs" id='modalhd' onclick="mod_RWIPenatajasa_modalhd()" <?php echo $RWIdis; ?>><i class="fa fa-check"></i> Order HD</button>
            <button type="button" class="btn btn-outline-danger btn-xs" onclick="mod_RWIPenatajasa_kembalikeawal()">
              <i class="fa fa-arrow-left"></i> Kembali</button>
          </div>
          <div class="modal-body p-1">

            <div class="card-body p-0">
              <ul class="nav nav-tabs" id="mod_RWIPenatajasa_custom-content-above-tab" role="tablist">
                <li class="nav-item p-1">
                  <a class="nav-link active" data-toggle="pill" href="#div_mod_RWIPenatajasa_tindakan" role="tab" aria-selected="true">Tindakan</a>
                </li>
                <li class="nav-item p-1">
                  <div id="div_buttonbhp">
                    <!-- <a class="nav-link active" data-toggle="pill" onclick="showModalStockUnit('0')" role="tab" aria-selected="true">Stok Bhp</a> -->
                  </div>
                </li>
              </ul>

              <div class="tab-content" id="mod_RWIPenatajasa_custom-content-above-tabContent">
                <div class="tab-pane p-1 fade active show" id="div_mod_RWIPenatajasa_tindakan" role="tabpanel">

                  <!-- <div class="col-sm-8 p-1" style="max-height: 237px; overflow: auto;"> -->
                  <div class="row">
                    <div class="input-group col-sm-5">
                      <div class="input-group-prepend">
                        <span class="input-group-text form-control-xs">Kode / Nama Produk</span>
                      </div>
                      <input type="text" class="form-control form-control-xs" placeholder="Pencarian" id="mod_RWIPenatajasa_kdprd" <?php echo $RWIdis ?>>
                    </div>
                    <div class="col-sm-2">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text form-control-xs">Banyak</span>
                        </div>
                        <input type="number" class="form-control form-control-xs" id="mod_RWIPenatajasa_qty" <?php echo $RWIdis ?>>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <button type="button" class="btn btn-xs bg-gradient-secondary" id="mod_RWIPenatajasa_simpanproduk" <?php echo $RWIdis ?>><i class="fa fa-save"></i> Simpan</button>
                    </div>
                  </div>
                  <div style="max-height: 70rem; overflow: auto">
                    <table id="mod_RWIPenatajasa_tabletindakan" class="table table-striped table-sm choose mt-2">
                      <thead>
                        <tr>
                          <th width="10">#</th>
                          <!-- <th width="120">Kode Produk</th> -->
                          <th width="50">Tgl Input</th>
                          <th width="250">Kode / Nama Produk</th>
                          <th width="50">Banyak</th>
                          <th width="250">Unit</th>
                          <th width="70">Act</th>
                        </tr>
                      </thead>
                      <tbody></tbody>
                    </table>
                  </div>
                  <!-- </div> -->

                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<div class="modal fade" id="mod_RWIPenatajasa_modalpindahkamar" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="overlay-wrapper" id="loading_penatajasa_rwi_modal_pindahkamar">
      <div class="overlay">
        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
      </div>
    </div>
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header p-2">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body p-1">
        <!-- <form id="simpankonsulrwj" method='POST'> -->

        <div class="row">

          <div class="col-md-1">
            <label for="exempel1"> Id Trans :</label>
            <input type="text" class="form-control form-control-xs" id="mod_RWIPenatajasa_yidtransaksi" name="mod_RWIPenatajasa_yidtransaksi" disabled="">
          </div>

          <div class="col-md-3">
            <label for="exempel">Spesialisasi :</label>
            <select class="form-control form-control-xs select2 " id="rwi_sps_kam" name="rwi_sps_kam" style="width: 100%;" onchange="tampil_pendfrwiunit();" onkeypress="rwipendfspesialisasi(event)">

            </select>
          </div>


          <div class="has-error col-md-2">
            <label for="exempel">Kelas Unit :</label>
            <select class="form-control form-control-xs select2 " id="rwipendafkd_unit" name="rwipendafkd_unit" style="width: 100%;" onchange="tampil_rwipendfruang(event)">
            </select>
          </div>

          <div class="has-error col-md-2">
            <label for="exempel">Ruang :</label>
            <select class="form-control form-control-xs select2 " id="rwipendftr_ruang" name="rwipendftr_ruang" style="width: 100%;" onchange="tampil_rwipendfkamar(event)">
            </select>
          </div>


          <div class="has-warning col-md-4">
            <label for="exempel">Tempat Tidur :</label>
            <select class="form-control form-control-xs select2 " name="RWI_Penjasa_id_kamar" id="RWI_Penjasa_id_kamar" style="width: 100%;">
              <option value=''> - Silahkan Pilih -</option>
            </select>
          </div>

          <div class="col-md-12 float-right" style="padding-top: 30px;padding-bottom: 30px;">
            <button type='submit' id='buttonkonsul' class="btn bg-success btn-xs float-right" onclick="savepindahkamarrwi();"><i class="fas fa-check"></i> Pindah kamar</button><br>
          </div>



        </div>
        <!-- </form> -->
      </div>
    </div>

  </div>
</div>



<div class="modal fade" id="mod_RWIPenatajasa_modalposting" role="dialog">
<div class="overlay-wrapper" id="loading_mod_RWIPenatajasa_modalposting">
        <div class="overlay">
          <i class="fas fa-3x fa-sync-alt fa-spin"></i>
        </div>
      </div>
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header p-2">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body p-1">
        <!-- <form id="simpanpostingrwi" method='POST'> -->
        <div class="card card-outline">
          <div class="row p-2">
            <input type="hidden" class="form-control form-control-xs" id="mod_RWIPenatajasa_xtglkunjung" name="mod_RWIPenatajasa_xtglkunjung">
            <div class="col-md-3">
              <label>Nama :</label>
              <input type="text" class="form-control form-control-xs" id="mod_RWIPenatajasa_xnama" name="mod_RWIPenatajasa_xnama" disabled="">
            </div>
            <div class="col-md-3">
              <label>No Rm :</label>
              <input type="text" class="form-control form-control-xs" id="mod_RWIPenatajasa_xorm" name="mod_RWIPenatajasa_xorm" disabled="">
            </div>
            <div class="col-md-3">
              <label>Id Trans :</label>
              <input type="text" class="form-control form-control-xs" id="mod_RWIPenatajasa_xidtransaksi" name="mod_RWIPenatajasa_xidtransaksi" disabled="">
            </div>
            <div class="col-md-3">
              <label>Id Kunj :</label>
              <input type="text" class="form-control form-control-xs" id="mod_RWIPenatajasa_xidkunj" name="mod_RWIPenatajasa_xidkunj" disabled="">
            </div>
            <div class="col-md-3">
              <label>Cara Keluar :</label>
              <select class="form-control form-control-xs" name="mod_RWIPenatajasa_xcarakeluar" id="mod_RWIPenatajasa_xcarakeluar" onchange="carakeluarcek(event)" required></select>
            </div>
            <div class="col-md-6">
              <label>Keterangan :</label>
              <input type="text" class="form-control form-control-xs mod_RWIPenatajasa_xtketerangan" id="mod_RWIPenatajasa_xtketerangan" name="mod_RWIPenatajasa_xtketerangan">
            </div>
            <div class="col-md-3">
              <label>Tgl Keluar :</label>
              <input type="date" class="form-control form-control-xs datepicker" id="mod_RWIPenatajasa_xtglkeluar" name="mod_RWIPenatajasa_xtglkeluar" required>
            </div>
          </div>
          <div class="modal-footer p-1">
            <button type='submit' class="btn bg-success btn-xs" id="mod_RWIPenatajasa_btnposting2" onclick="savepostingrwi();"><i class="fas fa-check"></i> Posting Kunjungan</button><br>
          </div>
        </div>
        <!-- </form> -->
        <div id="pulang_DIV" style="display: none;">
        <div class="col-md-12">
          <label>Status Pulang :</label>
          <select class="form-control form-control-xs" name="mod_RWIPenatajasa_xstatuspulang" id="mod_RWIPenatajasa_xstatuspulang" onchange="cekstatuspulang(event)" required>
            <option value="1">Atas Persetujuan Dokter</option>
            <option value="3">Atas Permintaan Sendiri</option>
            <option value="4">Meninggal</option>
            <option value="5">Lain-lain</option>
          </select>
        </div>
        
        <div class="col-md-12">

                <div class="form-group">
                <label>KLL &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</label>

                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="pulangKLL" value="1" type="checkbox" class="custom-control-input" id="pulangKLL" onclick="document.getElementById('view_id_no_KLL').style.display='block'">
                    <label class="custom-control-label" for="pulangKLL">Ya</label>
                  </div>
                  
                </div>
              </div>

              <div id="view_id_no_KLL" style="display: none;">
              <div class="col-md-6">
              <label>Nomor KLL :</label>
              <input type="text" class="form-control form-control-xs datepicker" id="nomorKLLPulang" name="nomorKLLPulang">
              </div>
              </div>

              <div id="pulang_meninggal_DIV" style="display: none;">
        <div class="col-md-12">
          <label>Nosurat Meninggal :</label>
          <input type="text" class="form-control form-control-xs" name="mod_RWIPenatajasa_xsuratmeninggal" id="mod_RWIPenatajasa_xsuratmeninggal">
            
        </div>

        <div class="col-md-12">
          <label>Tgl Meninggal :</label>
          <input type="date" class="form-control form-control-xs" name="mod_RWIPenatajasa_xtglmeninggal" id="mod_RWIPenatajasa_xtglmeninggal" required>
            
        </div>

      </div>

      </div>
      </div>


      

      

      <br>
    </div>

  </div>
</div>


<div class="modal_gantidokter"></div>

<div class="lookkup_penatajasa"></div>


<script type="text/javascript">
  $(document).ready(function() {
    $('#loading_penatajasa_rwi').hide();
    tampil_kunjungan_terakhir();
  });

  function tampil_kunjungan_terakhir() {
    var param = {
      id_transaksi: RWIidtrans
    };
    apiPOST('Rawat_inap/last_idkunjunganranap', param, hasil => {
      if (hasil['status'] == 'sukses') {
        var idkunjunganlast = hasil['data'];
        var depo = hasil['datadepo'];
        var RWIidkunj = idkunjunganlast;
        document.getElementById('mod_RWIPenatajasa_idkunjungandinamis').value = RWIidkunj;
        document.getElementById('mod_RWIPenatajasa_depo').value = depo;
        var buttonbhp = "<a class='nav-link active' data-toggle='pill' onclick='showModalStockUnit(" + depo + ")' role='tab' aria-selected='true'>Stok Bhp</a>";
        document.getElementById('div_buttonbhp').innerHTML = buttonbhp;
        // $('#div_buttonbhp').append('<button class="btn bg-gradient-secondary btn-xs">Stok BHP Unit</button>');
      } else {
        alert('a');
        $('#penatajasaRWI_1').show();
      }
    });
  }

  var RWIidtrans = "<?php echo $RWIidtrans; ?>";
  var RWInowday = "<?php echo $RWInowday; ?>";
  var RWItglkunj = "<?php echo $RWItglkunj; ?>";
  var RWInorm = "<?php echo $RWInorm; ?>";
  var RWInmapasien = "<?php echo $RWInmapasien; ?>";
  var RWIalamat = "<?php echo $RWIalamat; ?>";
  var RWIumur = "<?php echo $RWIumur; ?>";
  var RWIpenjamin = "<?php echo $RWIpenjamin; ?>";
  var RWIsep = "<?php echo $RWIsep; ?>";
  var RWItelp = "<?php echo $RWItelp; ?>";
  var RWIunit = "<?php echo $RWIunit; ?>";
  // var RWIidkunj = "<?php //echo $RWIidkunj; 
                      ?>";
  var RWIidunit = "<?php echo $RWIidunit; ?>";
  var RWIdokter = "<?php echo $RWIdokter; ?>";
  var RWIidpegawai = "<?php echo $RWIidpegawai; ?>";
  var RWIprodukRWI;
  var RWIidpenjamin = "<?php echo $RWIidpenjamin; ?>";
  var RWIruang = "<?php echo $RWIruang; ?>";
  var RWIkamar = "<?php echo $RWIkamar; ?>";
  var keberadaanPentajasa = "<?php echo $keberadaanPentajasa; ?>";
  var RWIidkamar = "<?php echo $RWIidkamar; ?>";



  mod_RWIPenatajasa_getProduk();
  mod_RWIPenatajasa();
  mod_RWIPenatajasa_getlistproduk();
  tampil_spskamar();

  function carakeluarcek() {
    id = $("#mod_RWIPenatajasa_xcarakeluar").val();
    if (id == '1') {
      document.getElementById("pulang_DIV").style.display = "block";
    } else {
      document.getElementById("pulang_meninggal_DIV").style.display = "none";
      document.getElementById("pulang_DIV").style.display = "none";
    }
  }
  function cekstatuspulang(){
    id = $("#mod_RWIPenatajasa_xstatuspulang").val();
    if (id == '4') {
      document.getElementById("pulang_meninggal_DIV").style.display = "block";
    } else {
      document.getElementById("pulang_meninggal_DIV").style.display = "none";
      // document.getElementById("pulang_DIV").style.display = "none";


    }
  }

  function mod_RWIPenatajasa_getProduk() {
    var param = {
      id_unit: $("#mod_RWIPenatajasa_idunit").val(),
      id_penjamin: RWIidpenjamin
    };

    produkRWI = new AutoComplete("mod_RWIPenatajasa_kdprd");
    apiPOST('Kunjungan/getProduk', param, hasil => {
      if (hasil !== null) {
        var list = hasil['data'];
        list.forEach(baru => {
          // produkRWI.addData(baru['id_produk'], baru['kd_produk'] + ' || ' + baru['nama_produk']);
          produkRWI.addData(baru['id_produk'], baru['nama_produk'] + ' || ' + baru['harga'] + ' || ' + baru['id_tarif'] + ' || ' + baru['kd_produk']);

        });
      }
    });

    $("#mod_RWIPenatajasa_kdprd").on("keyup", function(event) {
      if (event.keyCode == 13) {
        $("#mod_RWIPenatajasa_qty").trigger('focus');
        $("#mod_RWIPenatajasa_qty").val(1);
      }
    });

    $("#mod_RWIPenatajasa_qty").keydown(function(event) {
      switch (event.which) {
        case 13:
          var RWIidprd = produkRWI.getValue();
          // var nm_prd = $("#mod_IGDPenatajasa_kdprd").val();
          var RWIqty = $("#mod_RWIPenatajasa_qty").val();
          var string = $("#mod_RWIPenatajasa_kdprd").val();
          var arrkasirgen = string.split('||');
          var RWInm_prd = arrkasirgen[0]; //nama
          var RWIarrharga = arrkasirgen[1]; //harga
          var RWIarridtarif = arrkasirgen[2]; //idtarif

          mod_RWIPenatajasa_addproduk(RWIidprd, RWInm_prd, RWIarrharga, RWIarridtarif, RWIqty);
          break;
      }
    });

    function RWIsimpanprodukbutton() {
      var RWIidprd = produkRWI.getValue();
      // var nm_prd = $("#mod_IGDPenatajasa_kdprd").val();
      var RWIqty = $("#mod_RWIPenatajasa_qty").val();
      var string = $("#mod_RWIPenatajasa_kdprd").val();
      var arrkasirgen = string.split('||');
      var RWInm_prd = arrkasirgen[0]; //nama
      var RWIarrharga = arrkasirgen[1]; //harga
      var RWIarridtarif = arrkasirgen[2]; //idtarif
      mod_RWIPenatajasa_addproduk(RWIidprd, RWInm_prd, RWIarrharga, RWIarridtarif, RWIqty);
    };

    $("#mod_RWIPenatajasa_simpanproduk").click(function(event) {
      var RWIidprd = produkRWI.getValue();
      // var nm_prd = $("#mod_IGDPenatajasa_kdprd").val();
      var RWIqty = $("#mod_RWIPenatajasa_qty").val();
      var string = $("#mod_RWIPenatajasa_kdprd").val();
      var arrkasirgen = string.split('||');
      var RWInm_prd = arrkasirgen[0]; //nama
      var RWIarrharga = arrkasirgen[1]; //harga
      var RWIarridtarif = arrkasirgen[2]; //idtarif
      mod_RWIPenatajasa_addproduk(RWIidprd, RWInm_prd, RWIarrharga, RWIarridtarif, RWIqty);
    });

  }

  function mod_RWIPenatajasa() {
    document.getElementById('mod_RWIPenatajasa_tglkunj').value = RWItglkunj;
    document.getElementById('mod_RWIPenatajasa_notrans').value = RWIidtrans;
    document.getElementById('mod_RWIPenatajasa_norm').value = RWInorm;
    document.getElementById('mod_RWIPenatajasa_nmpasien').value = RWInmapasien;
    document.getElementById('mod_RWIPenatajasa_alamat').value = RWIalamat;
    document.getElementById('mod_RWIPenatajasa_umur').value = RWIumur;
    document.getElementById('mod_RWIPenatajasa_penjamin').value = RWIpenjamin;
    document.getElementById('mod_RWIPenatajasa_nosep').value = RWIsep;
    document.getElementById('mod_RWIPenatajasa_unit').value = RWIunit;
    document.getElementById('mod_RWIPenatajasa_dokter').value = RWIdokter;
    document.getElementById('mod_RWIPenatajasa_ruang').value = RWIruang;
    document.getElementById('mod_RWIPenatajasa_kamar').value = RWIkamar;
  }

  function mod_RWIPenatajasa_kembalikeawal() {
    pertanyaan.fire({
      title: 'Kembali ke menu awal',
      html: '<span>Yakin, tetap kembali ?</span>',
      icon: 'question',
      showCancelButton: true,
      reverseButtons: false,
      allowOutsideClick: false
    }).then((result) => {
      if (result.isConfirmed) {
        $('#mod_RWIPenatajasa_content').hide();
        $('#penatajasaRWI_1').show();
        penatajasaRWI_tablepasien();
      } else if (result.dismiss === Swal.DismissReason.cancel) {

      }
    })
  }

  function mod_RWIPenatajasa_modalposting() {
    $('#mod_RWIPenatajasa_modalposting').modal("show");
    document.getElementById('loading_mod_RWIPenatajasa_modalposting').style.display = 'none';
    document.getElementById('mod_RWIPenatajasa_xtglkunjung').value = RWItglkunj;
    document.getElementById('mod_RWIPenatajasa_xtglkeluar').value = RWInowday;
    document.getElementById('mod_RWIPenatajasa_xidtransaksi').value = RWIidtrans;
    document.getElementById('mod_RWIPenatajasa_xorm').value = RWInorm;
    document.getElementById('mod_RWIPenatajasa_xnama').value = RWInmapasien;
    document.getElementById('mod_RWIPenatajasa_xidkunj').value = $("#mod_RWIPenatajasa_idkunjungandinamis").val();
    RWIPenatajasa_tampil_carakeluar();
  }

  function RWIPenatajasa_tampil_carakeluar() {
    var param = {
      posisi: 'rwi'
    };
    apiPOST('Data_Sosial/carakeluar', param, hasil => {
      var prov = '<option value="">* Pilih</option>';
      var a = hasil['data'];
      var no = 1;
      for (var i = 0; i < a.length; i++) {

        prov += '<option value="' + a[i]['id_cara_keluar'] + '">' + no + '. ' + a[i]['cara_keluar'] + '</option>';
        no++;
      }
      document.getElementById('mod_RWIPenatajasa_xcarakeluar').innerHTML = prov;
    });
  }


  function savepostingrwi() {
    document.getElementById('loading_mod_RWIPenatajasa_modalposting').style.display = 'block';
    
    if ($('#pulangKLL').is(':checked')) {
      var pulangKLL = document.querySelector('input[name=pulangKLL]:checked').value;
    } else {
      var pulangKLL = '0';
    }
    var param = {
      idcarakeluar: $("#mod_RWIPenatajasa_xcarakeluar").val(),
      keterangankeluar: $("#mod_RWIPenatajasa_xtketerangan").val(),
      tglkeluar: $("#mod_RWIPenatajasa_xtglkeluar").val(),
      idtransaksi: $("#mod_RWIPenatajasa_xidtransaksi").val(),
      idkunjungan: $("#mod_RWIPenatajasa_idkunjungandinamis").val(),
      tglkunj: $("#mod_RWIPenatajasa_xtglkunjung").val(),
      idkamar: RWIidkamar,
      sep: $("#mod_RWIPenatajasa_nosep").val(),
      statuspulangbpjs : $("#mod_RWIPenatajasa_xstatuspulang").val(),
      nomorKLLPulang : $("#nomorKLLPulang").val(),
      pulangKLL : pulangKLL,
      RWIpenjamin : RWIpenjamin
    }
    apiPOST("Kunjungan/postingcarakeluar", param, hasil => {
      if (hasil['status'] == 'sukses') {
        document.getElementById("mod_RWIPenatajasa_btnposting1").disabled = true;
        document.getElementById("mod_RWIPenatajasa_btnposting2").disabled = true;
        document.getElementById("mod_RWIPenatajasa_simpanproduk").disabled = true;
        document.getElementById("mod_RWIPenatajasa_kdprd").disabled = true;
        document.getElementById("mod_RWIPenatajasa_qty").disabled = true;
        document.getElementById("mod_RWIPenatajasa_btnpindahkamar").disabled = true;
        document.getElementById('loading_mod_RWIPenatajasa_modalposting').style.display = 'none';


        $('.mod_RWIPenatajasa_delrow').attr("disabled", true);
        $('#mod_RWIPenatajasa_modalposting').modal("hide");

      }else{
        document.getElementById('loading_mod_RWIPenatajasa_modalposting').style.display = 'none';
        $('#mod_RWIPenatajasa_modalposting').modal("hide");

      }
    })
  }
  //   e.preventDefault();

  // });

  function mod_RWIPenatajasa_tmbhtindakan(RWIidprd, RWInm_prd, RWIqty, RWIid_tindakan, RWIdetailtransaksi, RWItglinput, RWIunitruangkamar, RWIdet_idUnit) {
    var tgl = RWItglinput.substr(8, 2);
    var bln = RWItglinput.substr(5, 2);
    var thn = RWItglinput.substr(0, 4);
    var tglinputpenatajasa = tgl + '/' + bln + '/' + thn;
    var Nomor = $('#mod_RWIPenatajasa_tabletindakan tbody tr').length + 1;
    var Baris = "";
    Baris += "<tr>";
    Baris += '<td >' + Nomor + '</td>';
    Baris += "<td><input type='tex' class='form-control form-control-xs' name='mod_RWIPenatajasa_tglinput[]' id='mod_RWIPenatajasa_tglinput" + Nomor + "' value=" + tglinputpenatajasa + " disabled></td>";
    /*Baris += "<td>";
    Baris += "<input type='text' class='form-control form-control-xs' name='mod_RWIPenatajasa_kdprd[]' id='mod_RWIPenatajasa_kdprd"+Nomor+"' value='"+idprd+"' disabled>";
    Baris += "</td>";*/
    Baris += '<td>';
    Baris += "<input type='text' class='form-control form-control-xs' name='mod_RWIPenatajasa_nmprd[]' id='mod_RWIPenatajasa_nmprd" + Nomor + "' value='" + RWInm_prd + "' disabled>";
    Baris += "</td>";
    Baris += "<td><input type='number' class='form-control form-control-xs' name='mod_RWIPenatajasa_qty[]' id='mod_RWIPenatajasa_qty" + Nomor + "' value=" + RWIqty + " disabled></td>";
    Baris += "<td><textarea class='form-control form-control-xs' disabled>" + RWIunitruangkamar + "</textarea></td>";
    Baris += "<td><button type='button' class='btn btn-xs btn-outline-danger mod_RWIPenatajasa_delrow' id='mod_RWIPenatajasa_delrow" + Nomor + "' <?php echo $RWIdis; ?>><i class='fa fa-trash'></i></button> | <button type='button' class='btn btn-xs btn-outline-danger mod_RWIPenatajasa_Bhp' id='mod_RWIPenatajasa_Bhp" + Nomor + "' <?php echo $RWIdis; ?> data-id='" + RWIid_tindakan + "' data-id1='" + RWIdet_idUnit + "'><i class='fa fa-plus'></i></button> | <button type='button' class='btn btn-xs btn-outline-success' <?php echo $RWIdis; ?> onclick='jas_look_penatajasa(" + RWIdetailtransaksi + ")'><i class='fa fa-user'></i></button> </td>";
    Baris += "</tr>";

    $('#mod_RWIPenatajasa_tabletindakan tbody').append(Baris);

    $("#mod_RWIPenatajasa_delrow" + Nomor).click(function(event) {
      // $(this).parent().parent().remove();
      // var no = 1;
      // $('#mod_RWIPenatajasa_tabletindakan tbody tr').each(function(){
      //   $(this).find('td:nth-child(1)').html(no);
      //   no++;
      // });
      mod_RWIPenatajasa_deleteProduk(RWIid_tindakan, RWInm_prd);
    });

    $("#mod_RWIPenatajasa_Bhp" + Nomor).click(function(event) {
      var id_detail_kunjungan = $(this).attr("data-id");
      var id_unit = $("#mod_RWIPenatajasa_depo").val();
      // alert(id_detail_kunjungan+' x '+id_unit);
      showModalBHPProduk(id_detail_kunjungan, id_unit);
    });

  }

  function mod_RWIPenatajasa_addproduk(RWIidprd, RWInm_prd, RWIarrharga, RWIarridtarif, RWIqty) {
    $('#loading_penatajasa_rwi').show();
    var param = {
      id_transak: RWIidtrans,
      id_kunj: $("#mod_RWIPenatajasa_idkunjungandinamis").val(),
      idprd: RWIidprd,
      ket: '',
      qty: RWIqty,
      idtarif: RWIarridtarif,
      idpegawai: RWIidpegawai
    };
    apiPOST("Rawat_inap/penatajasaRWI_simpanProduk", param, hasil => {
      if (hasil['status'] == 'sukses') {
        $('#loading_penatajasa_rwi').hide();
        //alert(hasil['id_detail_transaksi'] + ' ' + hasil['id_pegawai']);
        var param_penindak = {
          id_detail_transaksi: hasil['id_detail_transaksi'],
          id_pegawai: hasil['id_pegawai'],
        };
        // apiPOST("Rawat_inap/penatajasaRWI_updatedokterpenindak", param_penindak, hasil => {

        // })
      } else {
        $('#loading_penatajasa_rwi').hide();

      }
      //mod_RWIPenatajasa_tmbhtindakan(idprd, nm_prd, qty);
      mod_RWIPenatajasa_getlistproduk();
      $("#mod_RWIPenatajasa_kdprd").trigger('focus');
      $("#mod_RWIPenatajasa_kdprd").val('');
      $("#mod_RWIPenatajasa_qty").val('');
    });
  }

  function mod_RWIPenatajasa_getlistproduk() {
    $('#mod_RWIPenatajasa_tabletindakan tbody').html('');
    var param = {
      id_kunj: $("#mod_RWIPenatajasa_idkunjungandinamis").val(),
      id_transak: RWIidtrans
    };

    apiPOST('Rawat_inap/penatajasaRWI_detailtindakan', param, hasil => {

      if (hasil['status'] !== 'gagal') {
        var a = hasil['data'];
        for (var i = 0; i < a.length; i++) {
          var RWIid_tindakan = a[i]['id_detail_kunjungan'];
          var RWIidprd = a[i]['id_produk'];
          var RWInm_prd = a[i]['kd_produk'] + " || " + a[i]['nama_produk'];
          var RWIket = a[i]['ketrangan'];
          var RWIqty = a[i]['qty'];
          var RWIdetailtransaksi = a[i]['id_detail_transaksi'];
          var RWItglinput = a[i]['tgl_input'];
          var RWIunitruangkamar = a[i]['unit_ruang_kamar'];
          var RWIdet_idUnit = a[i]['id_unit_depo'];
          //alert(RWIdetailtransaksi);

          mod_RWIPenatajasa_tmbhtindakan(RWIidprd, RWInm_prd, RWIqty, RWIid_tindakan, RWIdetailtransaksi, RWItglinput, RWIunitruangkamar, RWIdet_idUnit);
        }
      } else {
        var Baris = "";
        Baris += "<tr>";
        Baris += "<td colspan='4'>Data tidak ditemukan!!</td>";
        Baris += "</tr>";

        $('#mod_RWIPenatajasa_tabletindakan tbody').append(Baris);
      }

    });
  }

  function jas_look_penatajasa(id_detail_transaksi) {
    // alert('lol');
    $('#loading_penatajasa_rwi').show();
    var json_datajas = {
      'id_detailtransaksi': id_detail_transaksi
    };
    var myJSONjas = JSON.stringify(json_datajas);
    //alert(id_detail_transaksi);
    $('.lookkup_penatajasa').load('Kasirgeneral/mod_lookkup_penatajasa?data=' + myJSONjas);
  };

  function mod_RWIPenatajasa_deleteProduk(RWIid_tindakan, RWInm_prd) {
    pertanyaan.fire({
      title: 'Hapus Data Produk',
      html: '<span>Benarkah Produk ' + RWInm_prd + ', di Hapus ?</span>',
      icon: 'question',
      showCancelButton: true,
      reverseButtons: false,
      allowOutsideClick: false
    }).then((result) => {
      if (result.isConfirmed) {
        var param = {
          id_detail_kunjungan: RWIid_tindakan,
          id_transak: RWIidtrans
        };

        apiPOST('Rawat_inap/penatajasaRWI_deleteProduk', param, hasil => {
          if (hasil['code'] == '200') {
            $('#mod_RWIPenatajasa_tabletindakan tbody').html('');
            mod_RWIPenatajasa_getlistproduk();
          }
        });
      } else if (result.dismiss === Swal.DismissReason.cancel) {

      }
    })
  }

  function mod_RWIPenatajasa_modalpindahkamar() {
    $('#loading_penatajasa_rwi_modal_pindahkamar').hide();
    $('#mod_RWIPenatajasa_modalpindahkamar').modal("show");
    document.getElementById('mod_RWIPenatajasa_yidtransaksi').value = RWIidtrans;
  }

  function savepindahkamarrwi() {
    $('#loading_penatajasa_rwi_modal_pindahkamar').show();

    var param = {
      rwjpindahidtrans: $("#mod_RWIPenatajasa_yidtransaksi").val(),
      rwjpindahidkamar: $("#RWI_Penjasa_id_kamar").val(),
      rwjpindahidpegawai: RWIidpegawai,
      rwjpindahidunit: $("#rwipendafkd_unit").val(),
      rwiidkunjungan: $("#mod_RWIPenatajasa_idkunjungandinamis").val(),
      rwiidkamarlama: RWIidkamar
    }
    apiPOST("Rawat_inap/pindahkamar", param, hasil => {
      if (hasil['status'] == 'sukses') {
        if (hasil['flag'] == 'erm') {
          location.reload();
        }
        document.getElementById('mod_RWIPenatajasa_idunit').value = $("#rwipendafkd_unit").val();
        mod_RWIPenatajasa_getProduk();
        //$('#mod_RWIPenatajasa_modalpindahkamar').modal("hide");
        apiPOST("Rawat_inap/selectruangkamarganti", param, hasil => {
          var a = hasil['data'];
          for (var i = 0; i < a.length; i++) {
            var Ruangkamarganti = a[i]['tempat'];
            var unitruangkamar = a[i]['nama_unit'];
            document.getElementById('mod_RWIPenatajasa_ruang').value = Ruangkamarganti;
            document.getElementById('mod_RWIPenatajasa_unit').value = unitruangkamar;
            document.getElementById('mod_RWIPenatajasa_kamar').value = Ruangkamarganti;
            tampil_kunjungan_terakhir();
            $('#loading_penatajasa_rwi_modal_pindahkamar').hide();
            $('#mod_RWIPenatajasa_modalpindahkamar').modal("hide");
            $('#mod_RWIPenatajasa_content').hide();
            $('#penatajasaRWI_1').show();
            penatajasaRWI_tablepasien();
          }
        })
      } else {
        $('#loading_penatajasa_rwi_modal_pindahkamar').hide();

      }
    })
  }

  function tampil_spskamar() {
    apiPOST('Data_Sosial/spesialisasikamar', null, hasil => {
      var sps = "<option value=''> Pilih Spesialisasi </option>";
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        sps += '<option value="' + a[i]['id_spesialisasi_kamar'] + '">' + a[i]['nama_spesialisasi_kamar'] + '</option>';
      }
      document.getElementById('rwi_sps_kam').innerHTML = sps;
    });
  }

  function tampil_pendfrwiunit() {
    var param = {
      id: $("#rwi_sps_kam").val(),

    };
    apiPOST('Data_Sosial/unitsps', param, hasil => {
      var unit = "<option value=''> *Pilih </option>";
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        unit += '<option value="' + a[i]['id_unit'] + '">' + a[i]['nama_unit'] + '</option>';
      }
      document.getElementById('rwipendafkd_unit').innerHTML = unit;
    });
  }

  function tampil_rwipendfruang() {
    var param = {
      id: $("#rwipendafkd_unit").val(),
      id2: $("#rwi_sps_kam").val(),
    };
    apiPOST('Data_Sosial/ruangsps', param, hasil => {
      var ruang = "<option value=''> *Pilih </option>";
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        ruang += '<option value="' + a[i]['id_ruang'] + '">' + a[i]['nama_ruang'] + '</option>';
      }
      document.getElementById('rwipendftr_ruang').innerHTML = ruang;
    });
  }

  function tampil_rwipendfkamar() {
    var param = {
      id: $("#rwipendftr_ruang").val(),
      id_unit: $("#rwipendafkd_unit").val(),
    };
    apiPOST('Data_Sosial/kamarsps', param, hasil => {
      var kamar = "<option value=''> *Pilih </option>";
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        kamar += '<option value="' + a[i]['id_kamar'] + '">' + a[i]['nama_kamar'] + '  ( sisa = ' + a[i]['sisa'] + ' )</option>';
      }
      document.getElementById('RWI_Penjasa_id_kamar').innerHTML = kamar;
    });
  }
  $('#RWI_Penjasa_id_kamar').on('change', function() {
    var id_kamar = ($(this).find(":selected").val());
    var param = {
      id: id_kamar,
    };
    apiPOST('Rawat_inap/cekketersediaankamar', param, hasil => {
      var ruang = "";
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {

        if (a[i]['sisa'] <= 0) {
          tampil_rwipendfkamar();
          alert('Kamar Penuh' + a[i]['sisa']);
        }
      }
      // document.getElementById('rwipendftr_ruang').innerHTML = ruang;
    });
  });

  function mod_RWIPenatajasa_gantidokter() {
    // exit();
    //$('#loading_kasir_mod').show();
    var json_data = {
      id_kunjungan: $("#mod_RWIPenatajasa_idkunjungandinamis").val(),
    };
    var myJSON = JSON.stringify(json_data);
    $('.modal_gantidokter').load('Gawatdarurat/mod_gantidokterkunjungan?data=' + myJSON);
  }

  function viewdokter(data) {
    document.getElementById('mod_RWIPenatajasa_dokter').value = data;
  }

  function mod_RWIPenatajasa_modalhd(){
  pertanyaan.fire({
    title:'Konfirmasi',
    html:'<p>Validasi</p><p>Apakah Anda Ingin Pesan HD ?</p>',
    icon:'question',
    showCancelButton:true,
    reverseButtons:false,
    allowOutsideClick:false,
  }).then((result)=>{
    if(result.isConfirmed){         
      apiPOST('Heamodialisa/orderHD', $("#mod_RWIPenatajasa_idkunjungandinamis").val(), hasil => {
      
      })
    }else if(result.dismiss===Swal.DissmissReason.cancel){}
    })
  }

  // function mod_RWIPenatajasa_bhp() {
  //   alert('ON GOING');
  // }
</script>