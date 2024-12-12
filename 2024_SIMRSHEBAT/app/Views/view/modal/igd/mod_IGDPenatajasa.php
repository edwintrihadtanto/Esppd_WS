<?php
$data = json_decode($_GET['data']);
$IGDidtrans      = str_replace('"', '', json_encode($data->idtrans));
$IGDnowday       = str_replace('"', '', json_encode($data->nowday));
$IGDtglkunj      = str_replace('"', '', json_encode($data->tgl_kunj));
//$tglkunj      = date_format(date_create($tglkunjungan), 'd-M-Y'); //FORMAT TGL 02-Feb-2023
$IGDnorm         = str_replace('"', '', json_encode($data->no_rm));
$IGDnmapasien    = str_replace('"', '', json_encode($data->nama));
$IGDalamat       = str_replace('"', '', json_encode($data->alamat));
$IGDumur         = str_replace('"', '', json_encode($data->umur));
$IGDpenjamin     = str_replace('"', '', json_encode($data->penjamin));
$IGDsep          = str_replace('"', '', json_encode($data->sep));
$IGDtelp         = str_replace('"', '', json_encode($data->telp));
$IGDid_unit       = str_replace('"', '', json_encode($data->id_unit));
$IGDunit         = str_replace('"', '', json_encode($data->unit));
$IGDidkunj       = str_replace('"', '', json_encode($data->idkunj));
$IGDposting      = str_replace('"', '', json_encode($data->posting));
$IGDidpenjamin     = str_replace('"', '', json_encode($data->id_penjamin));
$IGDdokter    = str_replace('"', '', json_encode($data->dokter));
$IGDidpegawai    = str_replace('"', '', json_encode($data->id_pegawai));

if ($IGDposting == 't') {
  $IGDdis = "disabled";
} else if ($IGDposting == 'f') {
  $IGDdis = "";
}
?>
<section class="content pb-0" id="mod_IGDPenatajasa_content">
  <div class="container-fluid h-100">
    <div class="overlay-wrapper" id="loading_penatajasa_igd">
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
              <td><input type="date" class="form-control form-control-xs" id="mod_IGDPenatajasa_tglkunj" disabled></td>
            </tr>
            <tr>
              <td>Id. Trans.</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="mod_IGDPenatajasa_notrans" disabled></td>
            </tr>
            <tr>
              <td>No. RM</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="mod_IGDPenatajasa_norm" disabled></td>
            </tr>
            <tr>
              <td>Nama</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="mod_IGDPenatajasa_nmpasien" disabled></td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="mod_IGDPenatajasa_alamat" disabled></td>
            </tr>
            <tr>
              <td>Umur</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="mod_IGDPenatajasa_umur" disabled></td>
            </tr>
            <tr>
              <td>Penjamin</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="mod_IGDPenatajasa_penjamin" disabled></td>
            </tr>
            <tr>
              <td>SEP</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="mod_IGDPenatajasa_nosep" disabled></td>
            </tr>
            <tr>
              <td>Unit</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="mod_IGDPenatajasa_unit" disabled></td>
            </tr>
            <tr>
              <td>Dokter</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="mod_IGDPenatajasa_dokter" disabled></td>
            </tr>
          </table>
        </div>
      </div>

      <div class="col-md-9 p-1">
        <div class="card card-row">
          <div class="card-header p-1 darkgrey-custom">
            <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="showModalStockUnit('<?php echo $IGDid_unit ?>')" <?php echo $IGDdis ?>><i class="fas fa-exchange"></i> Stok BHP</button>
            <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="mod_IGDPenatajasa_tmbhtindakan()" disabled hidden><i class="fa fa-plus"></i> Tambah Tindakan</button>
            <button type="button" class="btn bg-gradient-secondary btn-xs" id='modalbuttonposting' onclick="mod_IGDPenatajasa_modalposting()" <?php echo $IGDdis; ?>><i class="fa fa-plus"></i> Posting</button>
            <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="mod_RWIPenatajasa_gantidokter()" <?php echo $IGDdis ?> id="mod_RWIPenatajasa_btngantidokter"><i class="fa fa-user"></i> Ganti Dokter Pasien</button>            
            <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="mod_IGDPenatajasa_getlistproduk()"><i class="fa fa-sync-alt fa-spin"></i> Refresh</button>
            <button type="button" class="btn bg-gradient-secondary btn-xs" id='modalhd' onclick="mod_IGDPenatajasa_modalhd()" <?php echo $IGDdis; ?>><i class="fa fa-check"></i> Order HD</button>
            <button type="button" class="btn btn-outline-danger btn-xs" onclick="mod_IGDPenatajasa_kembalikeawal()">
              <i class="fa fa-arrow-left"></i> Kembali</button>

              <button type="button" class="btn bg-danger btn-xs" id="buttonspri" onclick="cetak_spri()" style="display: none;">Cetak SPRI</button>
              <div id='spributton'></div>
          </div>
          <div class="modal-body p-1">

            <div class="card-body p-0">
              <ul class="nav nav-tabs" id="mod_IGDPenatajasa_custom-content-above-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="pill" href="#div_mod_IGDPenatajasa_tindakan" role="tab" aria-selected="true">Tindakan</a>
                </li>
              </ul>

              <div class="tab-content" id="mod_IGDPenatajasa_custom-content-above-tabContent">
                <div class="tab-pane p-1 fade active show" id="div_mod_IGDPenatajasa_tindakan" role="tabpanel">

                  <!-- <div class="col-sm-8 p-1" style="max-height: 237px; overflow: auto;"> -->
                  <div class="row">
                    <div class="input-group col-sm-5">
                      <div class="input-group-prepend">
                        <span class="input-group-text form-control-xs">Kode / Nama Produk</span>
                      </div>
                      <input type="search" class="form-control form-control-xs" placeholder="Pencarian" id="mod_IGDPenatajasa_kdprd" <?php echo $IGDdis; ?>>
                    </div>
                    <div class="col-sm-2">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text form-control-xs">Banyak</span>
                        </div>
                        <input type="number" class="form-control form-control-xs" id="mod_IGDPenatajasa_qty" <?php echo $IGDdis; ?>>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <button type="button" class="btn btn-xs bg-gradient-secondary" id="simpanproduk" onclick="IGDsimpanprodukbutton();" <?php echo $IGDdis; ?>><i class="fa fa-save"></i> Simpan</button>
                    </div>
                  </div>
                  <table id="mod_IGDPenatajasa_tabletindakan" class="table table-striped table-sm choose">
                    <thead>
                      <tr>
                        <th width="10">#</th>
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


<div class="modal fade" id="mod_IGDPenatajasa_modalposting" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header p-2">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body p-1">
        <!-- <form id="simpanpostingigd" method='POST'> -->

        <div class="row">


          <input type="hidden" class="form-control form-control-xs" id="mod_IGDPenatajasa_xtglkunjung" name="mod_IGDPenatajasa_xtglkunjung">


          <div class="col-md-3">
            <label for="exempel1"> Nama :</label>
            <input type="text" class="form-control form-control-xs" id="mod_IGDPenatajasa_xnama" name="mod_IGDPenatajasa_xnama" disabled="">
          </div>

          <div class="col-md-3">
            <label for="exempel1"> No Rm :</label>
            <input type="text" class="form-control form-control-xs" id="mod_IGDPenatajasa_xorm" name="mod_IGDPenatajasa_xorm" disabled="">
          </div>

          <div class="col-md-3">
            <label for="exempel1"> Id Trans :</label>
            <input type="text" class="form-control form-control-xs" id="mod_IGDPenatajasa_xidtransaksi" name="mod_IGDPenatajasa_xidtransaksi" disabled="">
          </div>

          <div class="col-md-3">
            <label for="exempel1"> Id Kunj :</label>
            <input type="text" class="form-control form-control-xs" id="mod_IGDPenatajasa_xidkunj" name="mod_IGDPenatajasa_xidkunj" disabled="">
          </div>



          <div class="col-md-3">
            <label for="exempel1"> Cara Keluar :</label>
            <select class="form-control form-control-xs" name="mod_IGDPenatajasa_xcarakeluar" id="mod_IGDPenatajasa_xcarakeluar" onchange="cekspri(event)" required>
            </select>
          </div>

          <div class="col-md-6">
            <label for="exempel1"> Keterangan :</label>
            <input type="text" class="form-control form-control-xs mod_IGDPenatajasa_xtketerangan" id="mod_IGDPenatajasa_xtketerangan" name="mod_IGDPenatajasa_xtketerangan">
          </div>

          <div class="col-md-3">
            <label for="exempel1"> Tgl Keluar :</label>
            <input type="date" class="form-control form-control-xs datepicker" id="mod_IGDPenatajasa_xtglkeluar" name="mod_IGDPenatajasa_xtglkeluar" required>
          </div>
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
              <select name="dokterpengirimIGD" id="dokterpengirimIGD" class="form-control form-control-xs">
                <OPtion value=""> -- Silahkan Pilih -- </OPtion>
              </select>
            </div>
            <div class="col-md-6">
              <label for="exempel1"> Keluhan Utama / Alasan Ranap :</label>
              <textarea style="height: 50px;" type="text" class="form-control" id="mod_IGDPenatajasa_keluhanutama" name="mod_IGDPenatajasa_keluhanutama"></textarea>
            </div>

            <div class="col-md-6">
              <label for="exempel1"> Dokter DPJP :</label>
              <select name="dokterdpjpIGD" id="dokterdpjpIGD" class="form-control form-control-xs">
                <OPtion value=""> -- Silahkan Pilih -- </OPtion>
              </select>
            </div>



            <div class="col-md-6">
              <label for="exempel1"> Rikjang:</label>
              <textarea type="text" class="form-control" id="mod_IGDPenatajasa_rikjang" name="mod_IGDPenatajasa_rikjang"></textarea>
            </div>



            <div class="col-md-6">
              <label for="exempel1"> Status Emergency :</label>
              <select name="kodeemergencyIGD" id="kodeemergencyIGD" class="form-control form-control-xs">
                <!-- <OPtion value=""> -- Silahkan Pilih -- </OPtion> -->
                <OPtion value="1">EMERGENCY</OPtion>
                <OPtion value="2">NON EMERGENCY</OPtion>
              </select>
            </div>


            <div class="col-md-6">
              <label for="exempel1"> Diagnosa:</label>
              <textarea style="height: 50px;" type="text" class="form-control" id="mod_IGDPenatajasa_diagnosa" name="mod_IGDPenatajasa_diagnosa"></textarea>
            </div>



            <div class="col-md-6">
              <label for="exempel1"> Ruangan :</label>
              <select name="permintaanruangIGD" id="permintaanruangIGD" class="form-control form-control-xs">
                <OPtion value=""> -- Silahkan Pilih -- </OPtion>
              </select>
            </div>


            <div class="col-md-6">
              <label for="exempel1"> Tindakaan Pembedahan:</label>
              <textarea style="height: 50px;" type="text" class="form-control" id="mod_IGDPenatajasa_tindakanpembedahan" name="mod_IGDPenatajasa_tindakanpembedahan"></textarea>
            </div>

            <div class="col-md-6">
              <label for="exempel1"> Instruksi DPJP:</label>
              <textarea style="height: 50px;" type="text" class="form-control" id="mod_IGDPenatajasa_intruksi" name="mod_IGDPenatajasa_intruksi"></textarea>
            </div>

            <div class="col-md-6">
              <label for="exempel1"> Terapi</label>
              <textarea style="height: 50px;" type="text" class="form-control" id="mod_IGDPenatajasa_terapi" name="mod_IGDPenatajasa_terapi"></textarea>
            </div>

          </div>

        </div>


        <div class="col-md-12 float-right" style="padding-top: 30px;padding-bottom: 30px;">
          <button type='submit' id='buttonposting' onclick="savepostingigd();" class="btn bg-success btn-xs float-right"><i class="fas fa-check"></i> Posting Kunjungan</button><br>
        </div>
        <!-- </form> -->
      </div>
    </div>

  </div>
</div>
</div>


<div class="lookkup_penatajasa_igd"></div>
<div class="modal_gantidokter_igd"></div>

<script type="text/javascript">
  var IGDidtrans = "<?php echo $IGDidtrans; ?>";
  var IGDnowday = "<?php echo $IGDnowday; ?>";
  var IGDtglkunj = "<?php echo $IGDtglkunj; ?>";
  var IGDnorm = "<?php echo $IGDnorm; ?>";
  var IGDnmapasien = "<?php echo $IGDnmapasien; ?>";
  var IGDalamat = "<?php echo $IGDalamat; ?>";
  var IGDumur = "<?php echo $IGDumur; ?>";
  var IGDpenjamin = "<?php echo $IGDpenjamin; ?>";
  var IGDsep = "<?php echo $IGDsep; ?>";
  var IGDtelp = "<?php echo $IGDtelp; ?>";
  var IGDunit = "<?php echo $IGDunit; ?>";
  var IGDidkunj = "<?php echo $IGDidkunj; ?>";
  var IGDid_unit = "<?php echo $IGDid_unit; ?>";
  var IGDdis = "<?php echo $IGDdis; ?>";
  var IGDidpenjamin = "<?php echo $IGDidpenjamin; ?>";
  var IGDdokter = "<?php echo $IGDdokter; ?>";
  var IGDidpegawai = "<?php echo $IGDidpegawai; ?>";



  var produkIGD;
  mod_IGDPenatajasa_getProduk();
  mod_IGDPenatajasa();
  mod_IGDPenatajasa_getlistproduk();
  $('#loading_penatajasa_igd').hide();
  apakahadaspri();


  function apakahadaspri() {
    var paramspri = {
      id_kunjungan: IGDidkunj
    };
    apiPOST('Kunjungan/apakahadaspri', paramspri, hasil => {
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
      id_kunjungan: IGDidkunj
    };
    newTabPOST('API/Gawat_Darurat/cetak_spri', param);
    return;
  }



  function cekspri() {
    dokterpengirim();
    dokterdpjp();
    mintaruangan();
    id = $("#mod_IGDPenatajasa_xcarakeluar").val();
    if (id == '3') {
      document.getElementById("spri_DIV").style.display = "block";
      //alert(IGDidkunj);
      var paramspri = {
        id_kunjungan: IGDidkunj
      };
      apiPOST('Kunjungan/data_spri', paramspri, hasil => {
        var a = hasil['data'];
        var no = 1;
        for (var i = 0; i < a.length; i++) {
          document.getElementById('sjprajal_spri').value = a[i]['no_sjp_rajal'];
          document.getElementById('mod_IGDPenatajasa_keluhanutama').value = a[i]['keluhan'];
          document.getElementById('mod_IGDPenatajasa_rikjang').value = a[i]['rikjang'];
          document.getElementById('mod_IGDPenatajasa_diagnosa').value = a[i]['diagnosa'];
          document.getElementById('mod_IGDPenatajasa_tindakanpembedahan').value = a[i]['tindakan_pembedahan'];
          document.getElementById('mod_IGDPenatajasa_intruksi').value = a[i]['intruksi_dpjp'];
          document.getElementById('mod_IGDPenatajasa_terapi').value = a[i]['terapi'];
          document.getElementById('dokterpengirimIGD').value = a[i]['id_dokterpengirim'];
          document.getElementById('dokterdpjpIGD').value = a[i]['id_dokterdpjp'];
          document.getElementById('kodeemergencyIGD').value = a[i]['status_emergency'];
          document.getElementById('permintaanruangIGD').value = a[i]['ruangan'];
          // dokterpengirim(a[i]['id_dokterpengirim']);
          // dokterdpjp();
        }
      });


    } else {
      document.getElementById("spri_DIV").style.display = "none";

    }



  }


  function dokterpengirim() {
    apiPOST('Kunjungan/dokter', null, hasil => {
      var dok = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        dok += '<option value="' + a[i]['id_pegawai'] + '">' + a[i]['nama_pegawai'] + '</option>';
      }
      document.getElementById('dokterpengirimIGD').innerHTML = dok;

    });
  }

  function dokterdpjp() {
    apiPOST('Kunjungan/dokter', null, hasil => {
      var dok = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        dok += '<option value="' + a[i]['id_pegawai'] + '">' + a[i]['nama_pegawai'] + '</option>';
      }
      document.getElementById('dokterdpjpIGD').innerHTML = dok;

    });
  }

  function statusemergency() {
    apiPOST('Kunjungan/statusemergency', null, hasil => {
      var dok = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        dok += '<option value="' + a[i]['id_emergency'] + '">' + a[i]['emergency'] + '</option>';
      }
      document.getElementById('kodeemergencyIGD').innerHTML = dok;

    });
  }

  function mintaruangan() {
    apiPOST('Kunjungan/ruang_inap', null, hasil => {
      var dok = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        dok += '<option value="' + a[i]['id_ruang'] + '">' + a[i]['nama_ruang'] + '</option>';
      }
      document.getElementById('permintaanruangIGD').innerHTML = dok;

    });
  }

  function savepostingigd() {
    var param = {
      idcarakeluar: $("#mod_IGDPenatajasa_xcarakeluar").val(),
      keterangankeluar: $("#mod_IGDPenatajasa_xtketerangan").val(),
      tglkeluar: $("#mod_IGDPenatajasa_xtglkeluar").val(),
      idtransaksi: $("#mod_IGDPenatajasa_xidtransaksi").val(),
      idkunjungan: $("#mod_IGDPenatajasa_xidkunj").val(),
      tglkunj: $("#mod_IGDPenatajasa_xtglkunjung").val(),
      keluhan: $("#mod_IGDPenatajasa_keluhanutama").val(),
      rikjang: $("#mod_IGDPenatajasa_rikjang").val(),
      diagnosatext: $("#mod_IGDPenatajasa_diagnosa").val(),
      tindakanpembedahan: $("#mod_IGDPenatajasa_tindakanpembedahan").val(),
      terapi: $("#mod_IGDPenatajasa_terapi").val(),
      dokterpengirim: $("#dokterpengirimIGD").val(),
      dokterdpjpIGD: $("#dokterdpjpIGD").val(),
      kodeemergencyIGD: $("#kodeemergencyIGD").val(),
      permintaanruangIGD: $("#permintaanruangIGD").val(),
      intruksi: $("#mod_IGDPenatajasa_intruksi").val(),

    }
    apiPOST("Kunjungan/postingcarakeluar", param, hasil => {
      if (hasil['status'] == 'sukses') {
        apakahadaspri();
        document.getElementById("modalbuttonposting").disabled = true;
        document.getElementById("buttonposting").disabled = true;
        document.getElementById("simpanproduk").disabled = true;
        document.getElementById("mod_IGDPenatajasa_kdprd").disabled = true;
        document.getElementById("mod_IGDPenatajasa_qty").disabled = true;
        $(".buttondeleteigd").attr("disabled", true);

        $('#mod_IGDPenatajasa_modalposting').modal("hide");
      }
    })
  }
  //   e.preventDefault();
  // });

  function mod_IGDPenatajasa_getProduk() {
    var param = {
      id_unit: IGDid_unit,
      id_penjamin: IGDidpenjamin
    };

    produkIGD = new AutoComplete("mod_IGDPenatajasa_kdprd");
    apiPOST('Kunjungan/getProduk', param, hasil => {
      if (hasil !== null) {
        var list = hasil['data'];
        list.forEach(baru => {
          produkIGD.addData(baru['id_produk'], baru['nama_produk'] + ' || ' + baru['harga'] + ' || ' + baru['id_tarif'] + ' || ' + baru['kd_produk']);
          // produkIGD.addData(baru['id_produk'], baru['kd_produk'] + ' || ' + baru['nama_produk']);
        });
      }
    });

    $("#mod_IGDPenatajasa_kdprd").on("keyup", function(event) {

      if (event.keyCode == 13) {
        $("#mod_IGDPenatajasa_qty").trigger('focus');
        $("#mod_IGDPenatajasa_qty").val(1);
      }
    });

    $("#mod_IGDPenatajasa_qty").keydown(function(event) {
      switch (event.which) {
        case 13:
          var IGDidprd = produkIGD.getValue();
          // var nm_prd = $("#mod_IGDPenatajasa_kdprd").val();
          var IGDqty = $("#mod_IGDPenatajasa_qty").val();

          var string = $("#mod_IGDPenatajasa_kdprd").val();
          var arrkasirgen = string.split('||');
          var IGDnm_prd = arrkasirgen[0]; //nama
          var IGDarrharga = arrkasirgen[1]; //harga
          var IGDarridtarif = arrkasirgen[2]; //idtarif

          mod_IGDPenatajasa_addproduk(IGDidprd, IGDnm_prd, IGDarrharga, IGDarridtarif, IGDqty);
          break;
      }
    });

  }

  function mod_IGDPenatajasa() {
    document.getElementById('mod_IGDPenatajasa_tglkunj').value = IGDtglkunj;
    document.getElementById('mod_IGDPenatajasa_notrans').value = IGDidtrans;
    document.getElementById('mod_IGDPenatajasa_norm').value = IGDnorm;
    document.getElementById('mod_IGDPenatajasa_nmpasien').value = IGDnmapasien;
    document.getElementById('mod_IGDPenatajasa_alamat').value = IGDalamat;
    document.getElementById('mod_IGDPenatajasa_umur').value = IGDumur;
    document.getElementById('mod_IGDPenatajasa_penjamin').value = IGDpenjamin;
    document.getElementById('mod_IGDPenatajasa_nosep').value = IGDsep;
    document.getElementById('mod_IGDPenatajasa_unit').value = IGDunit;
    document.getElementById('mod_IGDPenatajasa_dokter').value = IGDdokter;
    document.getElementById('sjprajal_spri').value = IGDsep;

  }

  function mod_IGDPenatajasa_kembalikeawal() {
    pertanyaan.fire({
      title: 'Kembali ke menu awal',
      html: '<span>Apakah, tetap kembali ?</span>',
      icon: 'question',
      showCancelButton: true,
      reverseButtons: false,
      allowOutsideClick: false
    }).then((result) => {
      if (result.isConfirmed) {
        $('#mod_IGDPenatajasa_content').hide();
        $('#penatajasaIGD_1').show();
        penatajasaIGD_tablepasien();
      } else if (result.dismiss === Swal.DismissReason.cancel) {

      }
    })
  }

  function mod_IGDPenatajasa_modalposting() {
    $('#mod_IGDPenatajasa_modalposting').modal("show");
    document.getElementById('mod_IGDPenatajasa_xtglkunjung').value = IGDtglkunj;
    document.getElementById('mod_IGDPenatajasa_xtglkeluar').value = IGDnowday;
    document.getElementById('mod_IGDPenatajasa_xidtransaksi').value = IGDidtrans;
    document.getElementById('mod_IGDPenatajasa_xorm').value = IGDnorm;
    document.getElementById('mod_IGDPenatajasa_xnama').value = IGDnmapasien;
    document.getElementById('mod_IGDPenatajasa_xidkunj').value = IGDidkunj;
    IGDPenatajasa_tampil_carakeluar();

  }

  function mod_IGDPenatajasa_modalkonsul() {
    $('#mod_IGDPenatajasa_modalkonsul').modal("show");
    document.getElementById('mod_IGDPenatajasa_yidtransaksi').value = IGDidtrans;
  }

  function IGDPenatajasa_tampil_carakeluar() {
    var param = {
      posisi: 'IGD'
    };
    apiPOST('Data_Sosial/carakeluar', param, hasil => {
      var prov = '<option value="">* Pilih</option>';
      var a = hasil['data'];
      var no = 1;
      for (var i = 0; i < a.length; i++) {

        prov += '<option value="' + a[i]['id_cara_keluar'] + '">' + no + '. ' + a[i]['cara_keluar'] + '</option>';
        no++;
      }
      document.getElementById('mod_IGDPenatajasa_xcarakeluar').innerHTML = prov;
    });
  }

  function mod_IGDPenatajasa_tmbhtindakan(IGDidprd, IGDnm_prd, IGDqty, IGDid_tindakan, IGDdetailtransaksi, IGDtglinput) {
    var tgl = IGDtglinput.substr(8, 2);
    var bln = IGDtglinput.substr(5, 2);
    var thn = IGDtglinput.substr(0, 4);
    var tglinputpenatajasa = tgl + '/' + bln + '/' + thn;
    var Nomor = $('#mod_IGDPenatajasa_tabletindakan tbody tr').length + 1;
    var Baris = "";
    Baris += "<tr>";
    Baris += "<td>" + Nomor + "</td>";
    /*Baris += "<td>";
    // Baris += "<input type='text' class='form-control form-control-xs' name='mod_IGDPenatajasa_kdprd[]' id='mod_IGDPenatajasa_kdprd"+Nomor+"' value='"+idprd+"' disabled>";
    Baris += "</td>";*/
    Baris += "<td><input type='tex' class='form-control form-control-xs' name='mod_IGDPenatajasa_tglinput[]' id='mod_IGDPenatajasa_tglinput" + Nomor + "' value=" + tglinputpenatajasa + " disabled></td>";
    Baris += "<td>";
    Baris += "<input type='text' class='form-control form-control-xs' name='mod_IGDPenatajasa_nmprd[]' id='mod_IGDPenatajasa_nmprd" + Nomor + "' value='" + IGDnm_prd + "' disabled>";
    Baris += "</td>";
    Baris += "<td><input type='number' class='form-control form-control-xs' name='mod_IGDPenatajasa_qty[]' id='mod_IGDPenatajasa_qty" + Nomor + "' value=" + IGDqty + " disabled></td>";
    Baris += "<td><button type='button' class='btn btn-xs btn-outline-danger buttondeleteigd' id='mod_IGDPenatajasa_delrow" + Nomor + "' " + IGDdis + "><i class='fa fa-trash'></i></button> | <button type='button' tittle='BHP' class='btn btn-xs btn-outline-danger mod_IGDPenatajasa_Bhp' id='mod_IGDPenatajasa_Bhp" + Nomor + "' <?php echo $IGDdis; ?> data-id='" + IGDid_tindakan + "' data-id1='" + IGDid_unit + "'><i class='fa fa-plus'></i></button> | <button type='button' class='btn btn-xs btn-outline-success' <?php echo $IGDdis; ?> onclick='jas_look_penatajasa_IGD(" + IGDdetailtransaksi + ")'><i class='fa fa-user'></i></button></td>";
    Baris += "</tr>";

    $('#mod_IGDPenatajasa_tabletindakan tbody').append(Baris);

    $("#mod_IGDPenatajasa_delrow" + Nomor).click(function(event) {
      // $(this).parent().parent().remove();
      // var no = 1;
      // $('#mod_IGDPenatajasa_tabletindakan tbody tr').each(function(){
      //   $(this).find('td:nth-child(1)').html(no);
      //   no++;
      // });
      mod_IGDPenatajasa_deleteProduk(IGDid_tindakan, IGDnm_prd);

    });

    $("#mod_IGDPenatajasa_Bhp" + Nomor).click(function(event) {
      var id_detail_kunjungan = $(this).attr("data-id");
      var id_unit = $(this).attr("data-id1");
      // alert(id_detail_kunjungan+' x '+id_unit);
      showModalBHPProduk(id_detail_kunjungan, id_unit);
    });

    //document.getElementById('mod_IGDPenatajasa_kdprd').html = ''; 
  }

  function mod_IGDPenatajasa_addproduk(IGDidprd, IGDnm_prd, IGDarrharga, IGDarridtarif, IGDqty) {
    var param = {
      id_transak: IGDidtrans,
      id_kunj: IGDidkunj,
      idprd: IGDidprd,
      ket: '',
      qty: IGDqty,
      idtarif: IGDarridtarif,
      idpegawai: IGDidpegawai
    };

    apiPOST("Gawat_Darurat/penatajasaIGD_simpanProduk", param, hasil => {
      if (hasil['status'] == 'sukses') {
        //alert(hasil['id_detail_transaksi'] + ' ' + hasil['id_pegawai']);
        var param_penindak = {
          id_detail_transaksi: hasil['id_detail_transaksi'],
          id_pegawai: hasil['id_pegawai'],
        };
        apiPOST("Rawat_inap/penatajasaRWI_updatedokterpenindak", param_penindak, hasil => {


        })
      }
      //mod_IGDPenatajasa_tmbhtindakan(idprd, nm_prd, qty);
      mod_IGDPenatajasa_getlistproduk();
      $("#mod_IGDPenatajasa_kdprd").trigger('focus');
      $("#mod_IGDPenatajasa_kdprd").val('');
      $("#mod_IGDPenatajasa_qty").val('');
    });
  }

  function mod_IGDPenatajasa_getlistproduk() {
    $('#mod_IGDPenatajasa_tabletindakan tbody').html('');
    var param = {
      id_kunj: IGDidkunj,
    };

    apiPOST('Gawat_Darurat/penatajasaIGD_detailtindakan', param, hasil => {
      //alert(hasil['status']);
      if (hasil['data'] !== null) {
        if (hasil['status'] !== 'gagal') {
          var a = hasil['data'];
          for (var i = 0; i < a.length; i++) {
            var IGDid_tindakan = a[i]['id_detail_kunjungan'];
            var IGDidprd = a[i]['id_produk'];
            var IGDnm_prd = a[i]['kd_produk'] + " || " + a[i]['nama_produk'];
            var IGDket = a[i]['ketrangan'];
            var IGDqty = a[i]['qty'];
            var IGDdetailtransaksi = a[i]['id_detail_transaksi'];
            var IGDtglinput = a[i]['tgl_input'];
            mod_IGDPenatajasa_tmbhtindakan(IGDidprd, IGDnm_prd, IGDqty, IGDid_tindakan, IGDdetailtransaksi, IGDtglinput);
          }
        } else {
          var Baris = "";
          Baris += "<tr>";
          Baris += "<td colspan='4'>Data tidak ditemukan!!</td>";
          Baris += "</tr>";

          $('#mod_IGDPenatajasa_tabletindakan tbody').append(Baris);
        }
      }

    });
  }

  function IGDsimpanprodukbutton() {
    var IGDidprd = produkIGD.getValue();
    // var nm_prd = $("#mod_IGDPenatajasa_kdprd").val();
    var IGDqty = $("#mod_IGDPenatajasa_qty").val();

    var string = $("#mod_IGDPenatajasa_kdprd").val();
    var arrkasirgen = string.split('||');
    var IGDnm_prd = arrkasirgen[0]; //nama
    var IGDarrharga = arrkasirgen[1]; //harga
    var IGDarridtarif = arrkasirgen[2]; //idtarif

    mod_IGDPenatajasa_addproduk(IGDidprd, IGDnm_prd, IGDarrharga, IGDarridtarif, IGDqty);
  };

  function mod_IGDPenatajasa_deleteProduk(IGDid_tindakan, IGDnm_prd) {
    pertanyaan.fire({
      title: 'Hapus Data Produk',
      html: '<span>Benarkah Produk ' + IGDnm_prd + ', di Hapus ?</span>',
      icon: 'question',
      showCancelButton: true,
      reverseButtons: false,
      allowOutsideClick: false
    }).then((result) => {
      if (result.isConfirmed) {
        var param = {
          id_detail_kunjungan: IGDid_tindakan,
          id_transak: IGDidtrans

        };

        apiPOST('Gawat_Darurat/penatajasaIGD_deleteProduk', param, hasil => {
          if (hasil['code'] == '200') {
            $('#mod_IGDPenatajasa_tabletindakan tbody').html('');
            mod_IGDPenatajasa_getlistproduk();

          }
        });
      } else if (result.dismiss === Swal.DismissReason.cancel) {

      }
    })
  }

  function jas_look_penatajasa_IGD(id_detail_transaksi) {
    // alert('lol');
    $('#loading_penatajasa_igd').show();
    var json_datajas = {
      'id_detailtransaksi': id_detail_transaksi
    };
    var myJSONjas = JSON.stringify(json_datajas);
    //alert(id_detail_transaksi);
    $('.lookkup_penatajasa_igd').load('Kasirgeneral/mod_lookkup_penatajasa?data=' + myJSONjas);
  };

  function mod_RWIPenatajasa_gantidokter() {
  // exit();
    //$('#loading_kasir_mod').show();
    var json_data = {
      id_kunjungan: IGDidkunj,
    };
    var myJSON = JSON.stringify(json_data);
    $('.modal_gantidokter_igd').load('Gawatdarurat/mod_gantidokterkunjungan?data=' + myJSON);
  }

  function viewdokter(data){
    document.getElementById('mod_IGDPenatajasa_dokter').value = data;
  }

  function mod_IGDPenatajasa_modalhd(){
  pertanyaan.fire({
    title:'Konfirmasi',
    html:'<p>Validasi</p><p>Apakah Anda Ingin Pesan HD ?</p>',
    icon:'question',
    showCancelButton:true,
    reverseButtons:false,
    allowOutsideClick:false,
  }).then((result)=>{
    if(result.isConfirmed){         
      apiPOST('Heamodialisa/orderHD', IGDidkunj, hasil => {
      
      })
    }else if(result.dismiss===Swal.DissmissReason.cancel){}
    })
  }
</script>