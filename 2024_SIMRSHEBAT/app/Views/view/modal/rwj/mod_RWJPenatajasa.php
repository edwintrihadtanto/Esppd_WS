<?php
$data = json_decode($_GET['data']);
$RWJidtrans      = str_replace('"', '', json_encode($data->idtrans));
$RWJnowday       = str_replace('"', '', json_encode($data->nowday));
$RWJtglkunj      = str_replace('"', '', json_encode($data->tgl_kunj));
//$tglkunj         = tglindo($RWJtglkunj); //FORMAT TGL 02-Feb-2023
$RWJnorm         = str_replace('"', '', json_encode($data->no_rm));
$RWJnmapasien    = str_replace('"', '', json_encode($data->nama));
$RWJalamat       = str_replace('"', '', json_encode($data->alamat));
$RWJumur         = str_replace('"', '', json_encode($data->umur));
$RWJpenjamin     = str_replace('"', '', json_encode($data->penjamin));
$RWJsep          = str_replace('"', '', json_encode($data->sep));
$RWJtelp         = str_replace('"', '', json_encode($data->telp));
$RWJunit         = str_replace('"', '', json_encode($data->unit));
$RWJidkunj       = str_replace('"', '', json_encode($data->idkunj));
$RWJposting      = str_replace('"', '', json_encode($data->posting));
$RWJdokter       = str_replace('"', '', json_encode($data->dokter));
$RWJid_unit      = str_replace('"', '', json_encode($data->id_unit));
$RWJid_penjamin     = str_replace('"', '', json_encode($data->id_penjamin));
$RWJid_pegawai     = str_replace('"', '', json_encode($data->id_pegawai));


if ($RWJposting == 't') {
  $dis = "disabled";
} else if ($RWJposting == 'f') {
  $dis = "";
}

?>
<section class="content pb-0" id="mod_RWJPenatajasa_content">
  <div class="container-fluid h-100">
    <div class="overlay-wrapper" id="loading_penatajasa_rwj">
      <div class="overlay">
        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
      </div>
    </div>
    <div class="row">

      <div class="col-md-3 p-1">
        <div class="info-box mb-0">
          <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="70">Tgl. Kunj.</td>
              <td>:</td>
              <td><input type="date" class="form-control form-control-xs" id="mod_RWJPenatajasa_tglkunj" disabled></td>
            </tr>
            <tr>
              <td>Id. Trans.</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="mod_RWJPenatajasa_notrans" disabled></td>
            </tr>
            <tr>
              <td>No. RM</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="mod_RWJPenatajasa_norm" disabled></td>
            </tr>
            <tr>
              <td>Nama</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="mod_RWJPenatajasa_nmpasien" disabled></td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="mod_RWJPenatajasa_alamat" disabled></td>
            </tr>
            <tr>
              <td>Umur</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="mod_RWJPenatajasa_umur" disabled></td>
            </tr>
            <tr>
              <td>Penjamin</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="mod_RWJPenatajasa_penjamin" disabled></td>
            </tr>
            <tr>
              <td>SEP</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="mod_RWJPenatajasa_nosep" disabled></td>
            </tr>
            <tr>
              <td>Unit</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="mod_RWJPenatajasa_unit" disabled></td>
            </tr>
            <tr>
              <td>Dokter</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="mod_RWJPenatajasa_dokter" disabled></td>
            </tr>
          </table>
        </div>
      </div>

      <div class="col-md-9 p-1">
        <div class="card card-row">
          <div class="card-header p-1 darkgrey-custom">
            <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="showModalStockUnit('<?php echo $RWJid_unit ?>')" <?php echo $dis ?>><i class="fas fa-exchange"></i> Stok BHP</button>
            <button type="button" class="btn bg-gradient-secondary btn-xs" id='modalbuttonposting' onclick="mod_RWJPenatajasa_posting()" <?php echo $dis ?>>
              <i class="fa fa-check"></i> Posting Transaksi</button>
            <button type="button" class="btn bg-gradient-secondary btn-xs" id='modalkonsul' onclick="mod_RWJPenatajasa_modalkonsul()" <?php echo $dis; ?>><i class="fa fa-search"></i> Konsul</button>
            <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="mod_RWJPenatajasa_gantidokter()" <?php echo $dis ?> id="mod_RWIPenatajasa_btngantidokter"><i class="fa fa-user"></i> Ganti Dokter Pasien</button>
            <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="mod_RWJPenatajasa_getlistproduk()"><i class="fa fa-sync-alt fa-spin"></i> Refresh</button>
            <button type="button" class="btn bg-gradient-secondary btn-xs" id='modalhd' onclick="mod_RWJPenatajasa_modalhd()" <?php echo $dis; ?>><i class="fa fa-check"></i> Order HD</button>    
            <button type="button" class="btn btn-outline-danger btn-xs" onclick="mod_RWJPenatajasa_kembalikeawal()">
              <i class="fa fa-arrow-left"></i> Kembali</button>
            <button type="button" class="btn bg-danger btn-xs" id="buttonspri" onclick="cetak_spri()" style="display: none;">Cetak SPRI</button>
          </div>
          <div class="modal-body p-1">
            <div class="card-body p-0">
              <ul class="nav nav-tabs" id="mod_RWJPenatajasa_custom-content-above-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="pill" href="#div_mod_RWJPenatajasa_tindakan" role="tab" aria-selected="true">Tindakan</a>
                </li>
              </ul>

              <div class="tab-content" id="mod_RWJPenatajasa_custom-content-above-tabContent">
                <div class="tab-pane p-1 fade active show" id="div_mod_RWJPenatajasa_tindakan" role="tabpanel">

                  <div class="row">
                    <div class="input-group col-sm-5">
                      <div class="input-group-prepend">
                        <span class="input-group-text form-control-xs">Kode / Nama Produk</span>
                      </div>
                      <input type="search" class="form-control form-control-xs" placeholder="Pencarian" id="mod_RWJPenatajasa_kdprd" <?php echo $dis; ?>>
                    </div>
                    <div class="col-sm-2">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text form-control-xs">Banyak</span>
                        </div>
                        <input type="number" class="form-control form-control-xs" id="mod_RWJPenatajasa_qty" <?php echo $dis; ?>>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <button type="button" class="btn btn-xs bg-gradient-secondary" id='simpanproduk' onclick="simpanprodukbuttonpjrajal();" <?php echo $dis; ?>><i class="fa fa-save"></i> Simpan</button>
                    </div>
                  </div>
                  <!-- <div class="col-sm-8 p-1" style="max-height: 237px; overflow: auto;"> -->
                  <table id="mod_RWJPenatajasa_tabletindakan" class="table table-striped table-sm choose mt-2">
                    <thead>
                      <tr>
                        <th width="10">#</th>
                        <!-- <th width="120">Kode Produk</th> -->
                        <th width="150">Tgl Input</th>
                        <th>Kode / Nama Produk</th>
                        <th width="60">Banyak</th>
                        <th width="150">Act</th>
                      </tr>
                    </thead>
                    <tbody></tbody>
                  </table>
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

<div class="modal fade" id="mod_RWJPenatajasa_modalkonsul" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header p-2">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body p-1">
        <!-- <form id="simpankonsulrwj" method='POST'> -->

        <div class="row">

          <div class="col-md-3">
            <label for="exempel1"> Id Trans :</label>
            <input type="text" class="form-control form-control-xs" id="mod_RWJPenatajasa_yidtransaksi" name="mod_RWJPenatajasa_yidtransaksi" disabled="">
          </div>
          <div class="col-md-3">
            <label for="exempel1"> Unit :</label>
            <select class="form-control form-control-xs" name="mod_RWJPenatajasa_yidunit" id="mod_RWJPenatajasa_yidunit" onchange="tampil_dokter(event)" required>
            </select>
          </div>
          <div class="col-md-3">
            <label for="exempel1"> Dokter :</label>
            <select class="form-control form-control-xs" name="mod_RWJPenatajasa_ydokter" id="mod_RWJPenatajasa_ydokter" required>
            </select>
          </div>
          <div class="col-md-12 float-right" style="padding-top: 30px;padding-bottom: 30px;">
            <button type='submit' id='buttonkonsul' class="btn bg-success btn-xs float-right" onclick="savekonsulrwj();"><i class="fas fa-check"></i> Konsul</button><br>
          </div>
        </div>
        <!-- </form> -->
      </div>
    </div>

  </div>
</div>

<div class="modal fade" id="mod_RWJPenatajasa_modalposting" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="container-fluid">
      <div class="row" style="margin-top:-40px">
        <div class="col-md-10" style="margin-top: 20px;margin-bottom: 0px;">
          <div class="modal-content">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12" style="margin-top: 0px;margin-bottom: 0px;">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>

                  <div class="card card-outline card-danger col-md-12">
                    <!-- <div class="overlay-wrapper" id="modalposting">
                      <div class="overlay">
                        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                      </div>
                    </div> -->
                    <div class="col-md-12">
                      <!-- <form id="simpanpostingrwj" method='POST'> -->

                      <div class="row">


                        <input type="hidden" class="form-control form-control-xs" id="mod_RWJPenatajasa_xtglkunjung" name="mod_RWJPenatajasa_xtglkunjung">


                        <div class="col-md-3">
                          <label for="exempel1"> Nama :</label>
                          <input type="text" class="form-control form-control-xs" id="mod_RWJPenatajasa_xnama" name="mod_RWJPenatajasa_xnama" disabled="">
                        </div>

                        <div class="col-md-3">
                          <label for="exempel1"> No Rm :</label>
                          <input type="text" class="form-control form-control-xs" id="mod_RWJPenatajasa_xorm" name="mod_RWJPenatajasa_xorm" disabled="">
                        </div>

                        <div class="col-md-3">
                          <label for="exempel1"> Id Trans :</label>
                          <input type="text" class="form-control form-control-xs" id="mod_RWJPenatajasa_xidtransaksi" name="mod_RWJPenatajasa_xidtransaksi" disabled="">
                        </div>

                        <div class="col-md-3">
                          <label for="exempel1"> Id Kunj :</label>
                          <input type="text" class="form-control form-control-xs" id="mod_RWJPenatajasa_xidkunj" name="mod_RWJPenatajasa_xidkunj" disabled="">
                        </div>

                        <div class="col-md-3">
                          <label for="exempel1"> Cara Keluar :</label>
                          <select class="form-control form-control-xs" name="mod_RWJPenatajasa_xcarakeluar" id="mod_RWJPenatajasa_xcarakeluar" onchange="cekspri(event)" required>
                          </select>
                        </div>

                        <div class="col-md-6">
                          <label for="exempel1"> Keterangan :</label>
                          <input type="text" class="form-control form-control-xs mod_RWJPenatajasa_xtketerangan" id="mod_RWJPenatajasa_xtketerangan" name="mod_RWJPenatajasa_xtketerangan">
                        </div>

                        <div class="col-md-3">
                          <label for="exempel1"> Tgl Keluar :</label>
                          <input type="date" class="form-control form-control-xs datepicker" id="mod_RWJPenatajasa_xtglkeluar" name="mod_RWJPenatajasa_xtglkeluar" required>
                        </div>

                        <div id="spri_DIV" style="display: none;">
                          <div class="row">

                            <div class="modal-header p-2 col-md-12">
                              <b>SPRI</b>
                            </div>
                            <div class="col-md-6">
                              <label for="exempel1"> SEP Surat Kontrol Rajal:</label>
                              <input type="text" name="sjprajal_spri" id="sjprajal_spri" class="form-control">
                            </div>

                            <div class="col-md-6">
                              <label for="exempel1"> Dokter Pengirim :</label>
                              <select name="dokterpengirimRWJ" id="dokterpengirimRWJ" class="form-control form-control-xs">
                                <OPtion value=""> -- Silahkan Pilih -- </OPtion>
                              </select>
                            </div>
                            <div class="col-md-6">
                              <label for="exempel1"> Keluhan Utama / Alasan Ranap :</label>
                              <textarea style="height: 50px;" type="text" class="form-control" id="mod_RWJPenatajasa_keluhanutama" name="mod_RWJPenatajasa_keluhanutama"></textarea>
                            </div>

                            <div class="col-md-6">
                              <label for="exempel1"> Dokter DPJP :</label>
                              <select name="dokterdpjpRWJ" id="dokterdpjpRWJ" class="form-control form-control-xs">
                                <OPtion value=""> -- Silahkan Pilih -- </OPtion>
                              </select>
                            </div>



                            <div class="col-md-6">
                              <label for="exempel1"> Rikjang:</label>
                              <textarea type="text" class="form-control" id="mod_RWJPenatajasa_rikjang" name="mod_RWJPenatajasa_rikjang"></textarea>
                            </div>



                            <div class="col-md-6">
                              <label for="exempel1"> Status Emergency :</label>
                              <select name="kodeemergencyRWJ" id="kodeemergencyRWJ" class="form-control form-control-xs">
                                <!-- <OPtion value=""> -- Silahkan Pilih -- </OPtion> -->
                                <OPtion value="1">EMERGENCY</OPtion>
                                <OPtion value="2">NON EMERGENCY</OPtion>
                              </select>
                            </div>


                            <div class="col-md-6">
                              <label for="exempel1"> Diagnosa:</label>
                              <textarea style="height: 50px;" type="text" class="form-control" id="mod_RWJPenatajasa_diagnosa" name="mod_RWJPenatajasa_diagnosa"></textarea>
                            </div>



                            <div class="col-md-6">
                              <label for="exempel1"> Ruangan :</label>
                              <select name="permintaanruangRWJ" id="permintaanruangRWJ" class="form-control form-control-xs">
                                <OPtion value=""> -- Silahkan Pilih -- </OPtion>
                              </select>
                            </div>


                            <div class="col-md-6">
                              <label for="exempel1"> Tindakaan Pembedahan:</label>
                              <textarea style="height: 50px;" type="text" class="form-control" id="mod_RWJPenatajasa_tindakanpembedahan" name="mod_RWJPenatajasa_tindakanpembedahan"></textarea>
                            </div>

                            <div class="col-md-6">
                              <label for="exempel1"> Instruksi DPJP:</label>
                              <textarea style="height: 50px;" type="text" class="form-control" id="mod_RWJPenatajasa_intruksi" name="mod_RWJPenatajasa_intruksi"></textarea>
                            </div>

                            <div class="col-md-6">
                              <label for="exempel1"> Terapi</label>
                              <textarea style="height: 50px;" type="text" class="form-control" id="mod_RWJPenatajasa_terapi" name="mod_RWJPenatajasa_terapi"></textarea>
                            </div>

                          </div>

                        </div>

                        <div class="col-md-12 float-right" style="padding-top: 30px;padding-bottom: 30px;">
                          <button type='submit' class="btn bg-success btn-xs float-right" id='buttonposting' onclick="savepostingrwj();"><i class="fas fa-check"></i> Posting Kunjungan</button><br>
                        </div>
                        <!-- </form> -->
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
</div>

<div class="modal_gantidokter"></div>
<div class="lookkup_penatajasa_rwj"></div>


<script type="text/javascript">
  var RWJidtrans = "<?php echo $RWJidtrans; ?>";
  var RWJnowday = "<?php echo $RWJnowday; ?>";
  var RWJtglkunj = "<?php echo $RWJtglkunj; ?>";
  var RWJnorm = "<?php echo $RWJnorm; ?>";
  var RWJnmapasien = "<?php echo $RWJnmapasien; ?>";
  var RWJalamat = "<?php echo $RWJalamat; ?>";
  var RWJumur = "<?php echo $RWJumur; ?>";
  var RWJpenjamin = "<?php echo $RWJpenjamin; ?>";
  var RWJsep = "<?php echo $RWJsep; ?>";
  var RWJtelp = "<?php echo $RWJtelp; ?>";
  var RWJunit = "<?php echo $RWJunit; ?>";
  var RWJidkunj = "<?php echo $RWJidkunj; ?>";
  var RWJdokter = "<?php echo $RWJdokter; ?>";
  var RWJidunit = "<?php echo $RWJid_unit; ?>";
  var RWJidpenjamin = "<?php echo $RWJid_penjamin; ?>";
  var dis = "<?php echo $dis; ?>";
  var produkRWJ;
  var RWJidpegawai = "<?php echo $RWJid_pegawai; ?>";

  document.getElementById('sjprajal_spri').value = RWJsep;
  document.getElementById('mod_RWJPenatajasa_tglkunj').value = RWJtglkunj;
  document.getElementById('mod_RWJPenatajasa_notrans').value = RWJidtrans;
  document.getElementById('mod_RWJPenatajasa_norm').value = RWJnorm;
  document.getElementById('mod_RWJPenatajasa_nmpasien').value = RWJnmapasien;
  document.getElementById('mod_RWJPenatajasa_alamat').value = RWJalamat;
  document.getElementById('mod_RWJPenatajasa_umur').value = RWJumur;
  document.getElementById('mod_RWJPenatajasa_penjamin').value = RWJpenjamin;
  document.getElementById('mod_RWJPenatajasa_nosep').value = RWJsep;
  document.getElementById('mod_RWJPenatajasa_unit').value = RWJunit;
  document.getElementById('mod_RWJPenatajasa_dokter').value = RWJdokter;

  mod_RWJPenatajasa_getProduk();
  mod_RWJPenatajasa_getlistproduk();
  tampil_carakeluar();
  tampil_unitrajal();
  tampil_dokter();
  $('#loading_penatajasa_rwj').hide();
  apakahadaspri();

  function apakahadaspri() {
    var paramspri = {
      id_kunjungan: RWJidkunj
    };
    apiPOST('Kunjungan/apakahadaspri', paramspri, hasil => {
      // alert(hasil['data'] );
      // exit();
      // if (hasil['data'] == '' || hasil['data'] == null) {
      if (hasil['data'] == null || hasil['data'] == '') {
        // alert('kosong');
      } else {
        document.getElementById("buttonspri").style.display = "block";
        // alert('ada')
      }
    });
  }

  function cetak_spri() {
    var param = {
      id_kunjungan: RWJidkunj
    };
    newTabPOST('API/Gawat_Darurat/cetak_spri', param);
    return;
  }

  function dokterpengirim() {
    apiPOST('Kunjungan/dokter', null, hasil => {
      var dok = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        dok += '<option value="' + a[i]['id_pegawai'] + '">' + a[i]['nama_pegawai'] + '</option>';
      }
      document.getElementById('dokterpengirimRWJ').innerHTML = dok;

    });
  }

  function dokterdpjp() {
    apiPOST('Kunjungan/dokter', null, hasil => {
      var dok = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        dok += '<option value="' + a[i]['id_pegawai'] + '">' + a[i]['nama_pegawai'] + '</option>';
      }
      document.getElementById('dokterdpjpRWJ').innerHTML = dok;

    });
  }

  function statusemergency() {
    apiPOST('Kunjungan/statusemergency', null, hasil => {
      var dok = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        dok += '<option value="' + a[i]['id_emergency'] + '">' + a[i]['emergency'] + '</option>';
      }
      document.getElementById('kodeemergencyRWJ').innerHTML = dok;

    });
  }

  function mintaruangan() {
    apiPOST('Kunjungan/ruang_inap', null, hasil => {
      var dok = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        dok += '<option value="' + a[i]['id_ruang'] + '">' + a[i]['nama_ruang'] + '</option>';
      }
      document.getElementById('permintaanruangRWJ').innerHTML = dok;

    });
  }

  function cekspri() {
    dokterpengirim();
    dokterdpjp();
    mintaruangan();
    id = $("#mod_RWJPenatajasa_xcarakeluar").val();
    if (id == '3') {
      document.getElementById("spri_DIV").style.display = "block";
      //alert(IGDidkunj);
      var paramspri = {
        id_kunjungan: RWJidkunj
      };
      apiPOST('Kunjungan/data_spri', paramspri, hasil => {
        var a = hasil['data'];
        var no = 1;
        for (var i = 0; i < a.length; i++) {
          document.getElementById('sjprajal_spri').value = a[i]['no_sjp_rajal'];
          document.getElementById('mod_RWJPenatajasa_keluhanutama').value = a[i]['keluhan'];
          document.getElementById('mod_RWJPenatajasa_rikjang').value = a[i]['rikjang'];
          document.getElementById('mod_RWJPenatajasa_diagnosa').value = a[i]['diagnosa'];
          document.getElementById('mod_RWJPenatajasa_tindakanpembedahan').value = a[i]['tindakan_pembedahan'];
          document.getElementById('mod_RWJPenatajasa_intruksi').value = a[i]['intruksi_dpjp'];
          document.getElementById('mod_RWJPenatajasa_terapi').value = a[i]['terapi'];
          document.getElementById('dokterpengirimRWJ').value = a[i]['id_dokterpengirim'];
          document.getElementById('dokterdpjpRWJ').value = a[i]['id_dokterdpjp'];
          document.getElementById('kodeemergencyRWJ').value = a[i]['status_emergency'];
          document.getElementById('permintaanruangRWJ').value = a[i]['ruangan'];
          // dokterpengirim(a[i]['id_dokterpengirim']);
          // dokterdpjp();
        }
      });
    } else {
      document.getElementById("spri_DIV").style.display = "none";
    }
  }

  function simpanprodukbuttonpjrajal() {
    var string = $("#mod_RWJPenatajasa_kdprd").val();
    var arrkasirgen = string.split('||');
    var arrnama = arrkasirgen[0]; //nama
    var arrharga = arrkasirgen[1]; //harga
    var arridtarif = arrkasirgen[2]; //idtarif
    var RWJidprd = produkRWJ.getValue(); //idproduk
    // var RWJnm_prd = $("#mod_RWJPenatajasa_kdprd").val();
    var RWJqty = $("#mod_RWJPenatajasa_qty").val();

    mod_RWJPenatajasa_addproduk(RWJidprd, arrnama, arrharga, arridtarif, RWJqty);
  };

  function tampil_carakeluar() {
    var param = {
      posisi: 'rajal'
    };
    apiPOST('Data_Sosial/carakeluar', param, hasil => {
      var prov = '<option value="">* Pilih</option>';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        prov += '<option value="' + a[i]['id_cara_keluar'] + '">' + a[i]['cara_keluar'] + '</option>';
      }
      document.getElementById('mod_RWJPenatajasa_xcarakeluar').innerHTML = prov;
    });
  }

  function tampil_unitrajal() {
    apiPOST('Rawatjalan/unit', null, hasil => {
      var prov = '<option value="">* Pilih</option>';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        prov += '<option value="' + a[i]['id_unit'] + '">' + a[i]['nama_unit'] + '</option>';
      }
      document.getElementById('mod_RWJPenatajasa_yidunit').innerHTML = prov;
    });
  }

  function tampil_dokter() {
    var param = {
      id: $("#mod_RWJPenatajasa_yidunit").val(),
    };
    apiPOST('Kunjungan/dokter_unit', param, hasil => {
      var prov = '<option value="">* Pilih</option>';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        prov += '<option value="' + a[i]['id_pegawai'] + '">' + a[i]['nama_pegawai'] + '</option>';
      }
      document.getElementById('mod_RWJPenatajasa_ydokter').innerHTML = prov;
    });
  }

  function mod_RWJPenatajasa_posting() {
    $('#mod_RWJPenatajasa_modalposting').modal("show");
    document.getElementById('mod_RWJPenatajasa_xtglkunjung').value = RWJtglkunj;
    document.getElementById('mod_RWJPenatajasa_xidtransaksi').value = RWJidtrans;
    document.getElementById('mod_RWJPenatajasa_xorm').value = RWJnorm;
    document.getElementById('mod_RWJPenatajasa_xnama').value = RWJnmapasien;
    document.getElementById('mod_RWJPenatajasa_xidkunj').value = RWJidkunj;
    document.getElementById('mod_RWJPenatajasa_xtglkeluar').value = RWJnowday;

  }

  function mod_RWJPenatajasa_modalkonsul() {
    $('#mod_RWJPenatajasa_modalkonsul').modal("show");
    document.getElementById('mod_RWJPenatajasa_yidtransaksi').value = RWJidtrans;
  }

  // $(document).on('submit', '#simpanpostingrwj', function(e) {
  //alert('hai');
  function savepostingrwj() {
    var param = {
      idcarakeluar: $("#mod_RWJPenatajasa_xcarakeluar").val(),
      keterangankeluar: $("#mod_RWJPenatajasa_xtketerangan").val(),
      tglkeluar: $("#mod_RWJPenatajasa_xtglkeluar").val(),
      idtransaksi: $("#mod_RWJPenatajasa_xidtransaksi").val(),
      idkunjungan: $("#mod_RWJPenatajasa_xidkunj").val(),
      tglkunj: $("#mod_RWJPenatajasa_xtglkunjung").val(),
      keluhan: $("#mod_RWJPenatajasa_keluhanutama").val(),
      rikjang: $("#mod_RWJPenatajasa_rikjang").val(),
      diagnosatext: $("#mod_RWJPenatajasa_diagnosa").val(),
      tindakanpembedahan: $("#mod_RWJPenatajasa_tindakanpembedahan").val(),
      terapi: $("#mod_RWJPenatajasa_terapi").val(),
      dokterpengirim: $("#dokterpengirimRWJ").val(),
      dokterdpjpIGD: $("#dokterdpjpRWJ").val(),
      kodeemergencyIGD: $("#kodeemergencyRWJ").val(),
      permintaanruangIGD: $("#permintaanruangRWJ").val(),
      intruksi: $("#mod_RWJPenatajasa_intruksi").val(),
    }
    apiPOST("Kunjungan/postingcarakeluar", param, hasil => {
      if (hasil['status'] == 'sukses') {
        apakahadaspri();
        document.getElementById("modalbuttonposting").disabled = true;
        document.getElementById("buttonposting").disabled = true;
        document.getElementById("simpanproduk").disabled = true;
        document.getElementById("mod_RWJPenatajasa_kdprd").disabled = true;
        document.getElementById("mod_RWJPenatajasa_qty").disabled = true;
        $(".buttondeleterwj").attr("disabled", true);

        $('#mod_RWJPenatajasa_modalposting').modal("hide");
      }

    })
    // e.preventDefault();
  }
  //   e.preventDefault();

  // });

  // $(document).on('submit', '#simpankonsulrwj', function(e) {
  //alert('hai');
  function savekonsulrwj() {
    var param = {
      rwjkonsulidtrans: $("#mod_RWJPenatajasa_yidtransaksi").val(),
      rwjkonsulunit: $("#mod_RWJPenatajasa_yidunit").val(),
      rwjkonsuldokter: $("#mod_RWJPenatajasa_ydokter").val(),
    }
    apiPOST("Kunjungan/konsulrajal", param, hasil => {
      if (hasil['status'] == 'sukses') {
        $('#mod_RWJPenatajasa_modalkonsul').modal("hide");
      }
    })
  }
  //   e.preventDefault();

  // });

  function mod_RWJPenatajasa_getProduk() {
    var param = {
      id_unit: RWJidunit,
      id_penjamin: RWJidpenjamin
    };

    produkRWJ = new AutoComplete("mod_RWJPenatajasa_kdprd");
    apiPOST('Kunjungan/getProduk', param, hasil => {
      if (hasil !== null) {
        var list = hasil['data'];
        list.forEach(baru => {
          produkRWJ.addData(baru['id_produk'], baru['nama_produk'] + ' || ' + baru['harga'] + ' || ' + baru['id_tarif'] + ' || ' + baru['kd_produk']);
          // produkRWJ.addData(baru['id_produk'], baru['kd_produk'] + ' || ' + baru['nama_produk']);
        });
      }
    });

    $("#mod_RWJPenatajasa_kdprd").on("keyup", function(event) {

      if (event.keyCode == 13) {
        $("#mod_RWJPenatajasa_qty").trigger('focus');
        $("#mod_RWJPenatajasa_qty").val(1);
      }
    });

    $("#mod_RWJPenatajasa_qty").keydown(function(event) {
      switch (event.which) {
        case 13:
          var string = $("#mod_RWJPenatajasa_kdprd").val();
          var arrkasirgen = string.split('||');
          var arrnama = arrkasirgen[0]; //nama
          var arrharga = arrkasirgen[1]; //harga
          var arridtarif = arrkasirgen[2]; //idtarif
          var RWJidprd = produkRWJ.getValue(); //idproduk
          // var RWJnm_prd = $("#mod_RWJPenatajasa_kdprd").val();
          var RWJqty = $("#mod_RWJPenatajasa_qty").val();
          mod_RWJPenatajasa_addproduk(RWJidprd, arrnama, arrharga, arridtarif, RWJqty);
          break;
      }
    });
  }

  function mod_RWJPenatajasa_kembalikeawal() {
    pertanyaan.fire({
      title: 'Kembali ke menu awal',
      html: '<span>Apakah, tetap kembali ?</span>',
      icon: 'question',
      showCancelButton: true,
      reverseButtons: false,
      allowOutsideClick: false
    }).then((result) => {
      if (result.isConfirmed) {
        $('#mod_RWJPenatajasa_content').hide();
        $('#penatajasaRWJ_1').show();
        penatajasaRWJ_tablepasien();
      } else if (result.dismiss === Swal.DismissReason.cancel) {

      }
    })
  }

  function mod_RWJPenatajasa_tmbhtindakan(RWJidprd, RWJnm_prd, RWJqty, RWJid_tindakan, RWJdetailtransaksi, RWJtglinput) {
    var tgl = RWJtglinput.substr(8, 2);
    var bln = RWJtglinput.substr(5, 2);
    var thn = RWJtglinput.substr(0, 4);
    var tglinputpenatajasa = tgl + '/' + bln + '/' + thn;
    var Nomor = $('#mod_RWJPenatajasa_tabletindakan tbody tr').length + 1;
    var Baris = "";
    Baris += "<tr>";
    Baris += "<td>" + Nomor + "</td>";
    Baris += "<td><input type='tex' class='form-control form-control-xs' name='mod_RWJPenatajasa_tglinput[]' id='mod_RWJPenatajasa_tglinput" + Nomor + "' value=" + tglinputpenatajasa + " disabled></td>";
    Baris += "<td>";
    Baris += "<input type='text' class='form-control form-control-xs' name='mod_RWJPenatajasa_nmprd[]' id='mod_RWJPenatajasa_nmprd" + Nomor + "' value='" + RWJnm_prd + "' disabled>";
    Baris += "</td>";
    Baris += "<td><input type='number' class='form-control form-control-xs' name='mod_RWJPenatajasa_qty[]' id='mod_RWJPenatajasa_qty" + Nomor + "' value=" + RWJqty + " disabled></td>";
    Baris += "<td><button type='button' class='btn btn-xs btn-outline-danger buttondeleterwj' id='mod_RWJPenatajasa_delrow" + Nomor + "' " + dis + "><i class='fa fa-trash'></i></button> | <button type='button' class='btn btn-xs btn-outline-danger mod_RWJPenatajasa_Bhp' tittle='BHP' id='mod_RWJPenatajasa_Bhp" + Nomor + "' <?php echo $dis; ?> data-id='" + RWJid_tindakan + "' data-id1='" + RWJidunit + "' ><i class='fa fa-plus'></i></button> | <button type='button' class='btn btn-xs btn-outline-success' <?php echo $dis; ?> onclick='jas_look_penatajasa_RWJ(" + RWJdetailtransaksi + ")'><i class='fa fa-user'></i></button> </td>";
    Baris += "</tr>";

    $('#mod_RWJPenatajasa_tabletindakan tbody').append(Baris);

    $("#mod_RWJPenatajasa_delrow" + Nomor).click(function(event) {
      // $(this).parent().parent().remove();
      // var no = 1;
      // $('#mod_RWJPenatajasa_tabletindakan tbody tr').each(function(){
      //   $(this).find('td:nth-child(1)').html(no);
      //   no++;
      // });
      mod_RWJPenatajasa_deleteProduk(RWJid_tindakan, RWJnm_prd);
    });
    $("#mod_RWJPenatajasa_Bhp" + Nomor).click(function(event) {
      var id_detail_kunjungan = $(this).attr("data-id");
      var id_unit = $(this).attr("data-id1");
      // alert(id_detail_kunjungan+' x '+id_unit);
      showModalBHPProduk(id_detail_kunjungan, id_unit);
    });
  }

  function mod_RWJPenatajasa_addproduk(RWJidprd, arrnama, arrharga, arridtarif, RWJqty) {
    var param = {
      id_transak: RWJidtrans,
      id_kunj: RWJidkunj,
      idprd: RWJidprd,
      ket: '',
      qty: RWJqty,
      idtarif: arridtarif,
      idpegawai: RWJidpegawai
    };

    apiPOST("Rawatjalan/penatajasaRWJ_simpanProduk", param, hasil => {
      if (hasil['status'] == 'sukses') {
        //alert(hasil['id_detail_transaksi'] + ' ' + hasil['id_pegawai']);
        var param_penindak = {
          id_detail_transaksi: hasil['id_detail_transaksi'],
          id_pegawai: hasil['id_pegawai'],
        };
        apiPOST("Rawat_inap/penatajasaRWI_updatedokterpenindak", param_penindak, hasil => {


        })
      }
      mod_RWJPenatajasa_getlistproduk();
      $("#mod_RWJPenatajasa_kdprd").trigger('focus');
      $("#mod_RWJPenatajasa_kdprd").val('');
      $("#mod_RWJPenatajasa_qty").val('');
    });
  }

  function mod_RWJPenatajasa_getlistproduk() {
    $('#mod_RWJPenatajasa_tabletindakan tbody').html('');
    var param = {
      id_kunj: RWJidkunj,
    };

    apiPOST('Rawatjalan/penatajasaRWJ_detailtindakan', param, hasil => {

      if (hasil['status'] !== 'gagal') {
        var a = hasil['data'];
        for (var i = 0; i < a.length; i++) {
          var RWJid_tindakan = a[i]['id_detail_kunjungan'];
          var RWJidprd = a[i]['id_produk'];
          var RWJnm_prd = a[i]['kd_produk'] + " || " + a[i]['nama_produk'];
          var RWJket = a[i]['ketrangan'];
          var RWJqty = a[i]['qty'];
          var RWJdetailtransaksi = a[i]['id_detail_transaksi'];
          var RWJtglinput = a[i]['tgl_input'];


          mod_RWJPenatajasa_tmbhtindakan(RWJidprd, RWJnm_prd, RWJqty, RWJid_tindakan, RWJdetailtransaksi, RWJtglinput);
        }
      } else {
        var Baris = "";
        Baris += "<tr>";
        Baris += "<td colspan='4'>Data tidak ditemukan!!</td>";
        Baris += "</tr>";

        $('#mod_RWJPenatajasa_tabletindakan tbody').append(Baris);
      }

    });
  }

  function mod_RWJPenatajasa_deleteProduk(RWJid_tindakan, RWJnm_prd) {
    pertanyaan.fire({
      title: 'Hapus Data Produk',
      html: '<span>Benarkah Produk ' + RWJnm_prd + ', di Hapus ?</span>',
      icon: 'question',
      showCancelButton: true,
      reverseButtons: false,
      allowOutsideClick: false
    }).then((result) => {
      if (result.isConfirmed) {
        var param = {
          id_transak: RWJidtrans,
          id_detail_kunjungan: RWJid_tindakan,
        };

        apiPOST('Rawatjalan/penatajasaRWJ_deleteProduk', param, hasil => {
          if (hasil['code'] == '200') {
            $('#mod_RWJPenatajasa_tabletindakan tbody').html('');
            mod_RWJPenatajasa_getlistproduk();
          }
        });
      } else if (result.dismiss === Swal.DismissReason.cancel) {

      }
    })
  }

  function jas_look_penatajasa_RWJ(id_detail_transaksi) {
    // alert('lol');
    // $('#loading_penatajasa_rwj').show();
    var json_datajas = {
      'id_detailtransaksi': id_detail_transaksi
    };
    var myJSONjas = JSON.stringify(json_datajas);
    //alert(id_detail_transaksi);
    $('.lookkup_penatajasa_rwj').load('Kasirgeneral/mod_lookkup_penatajasa?data=' + myJSONjas);
  };

  function mod_RWJPenatajasa_gantidokter() {
    // exit();
    //$('#loading_kasir_mod').show();
    var json_data = {
      id_kunjungan: RWJidkunj,
    };
    var myJSON = JSON.stringify(json_data);
    $('.modal_gantidokter').load('Gawatdarurat/mod_gantidokterkunjungan?data=' + myJSON);
  }

  function viewdokter(data) {
    document.getElementById('mod_RWJPenatajasa_dokter').value = data;
  }

  function mod_RWJPenatajasa_modalhd(){
  pertanyaan.fire({
    title:'Konfirmasi',
    html:'<p>Validasi</p><p>Apakah Anda Ingin Pesan HD ?</p>',
    icon:'question',
    showCancelButton:true,
    reverseButtons:false,
    allowOutsideClick:false,
  }).then((result)=>{
    if(result.isConfirmed){         
      apiPOST('Heamodialisa/orderHD', RWJidkunj, hasil => {
      
      })
    }else if(result.dismiss===Swal.DissmissReason.cancel){}
    })
  }
</script>