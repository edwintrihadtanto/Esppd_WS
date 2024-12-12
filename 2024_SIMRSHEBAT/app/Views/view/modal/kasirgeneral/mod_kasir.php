<?php
foreach ($data as $row);
?>
<style>
  .disabledbutton {
    pointer-events: none;
    opacity: 0.4;
  }
</style>
<div class="content modal fade" id="modal_kasir">
  <div class="container-fluid ">
    <div class="row" style="margin-top:-40px">
      <!-- content kanan -->
      <div class="col-md-10" style="margin-top: 20px;margin-bottom: 0px;">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-body">
              <div class="overlay-wrapper" id="loading_kasir_mod">
                <div class="overlay">
                  <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                </div>
              </div>
              <!-- detail transaksi -->
              <div class="row">
                <div class="col-md-12" id="div_areatopbutton" style="margin-top: 0px;margin-bottom: 0px;">
                  <div class="card">

                    <div class="card-header p-1 darkgrey-custom">
                      <!-- <button type="button" class="btn bg-gradient-secondary btn-xs tambahbaris"><i class="fa fa-pencil-alt"></i> Tambah Baris</button> -->
                      <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="tampilkan_isi_tindakan()"><i class="fas fa-fan"></i> Refresh</button>
                      <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="tamp_look()"><i class="fab fa-searchengin"></i> Look Up Produk</button>
                      <!-- <button type="button" class="btn bg-gradient-secondary btn-xs"><i class="fas fa-hand-point-left"></i> Unposting Penata Jasa</button> -->
                      <!-- <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="tamp_depositpasien()"><i class="fas fa-money-bill"></i> Deposit Pasien</button> -->
                      <button type="button" class="btn bg-gradient-secondary btn-xs " onclick="KasirTambahPenjamin()"><i class="fas fa-check "></i> Penjamin</button>
                      <button type="button" class="btn bg-gradient-secondary btn-xs " onclick="KasirGantiPenjaminGEnerate()"><i class="fas fa-fan"></i> Ganti Tarif</button>
                      <button type="button" class="btn bg-gradient-warning btn-xs generatetarifkasirX"><i class="fa fa-sync-alt fa-spin"></i> Generate Tarif</button>
                      <button type="button" class="btn bg-gradient-success btn-xs"  onclick="UnpostingPenataJasa()"><i class="fa fa-magic"></i> Unposting PenataJasa</button>

                      <!-- <input type="text" placeholder="alasan anda ..." name="alasanhapuspembayaran" id="alasanhapuspembayaran"> -->
                      <!-- <button type="button" class="btn btn-block bg-gradient-secondary btn-xs"><i class="fab fa-searchengin"></i> Look Up Produk</button> -->
                      <!-- <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask> -->
                      <!-- <select class="form-control-xs select2" name="idunitkunjungkasir" id='idunitkunjungkasir'>
                        <option value=""> -- Pilih Tarif Unit -- </option>
                      </select> -->
                      <span class="badge badge-info float-right">
                        <u>Detail Transaksi</u>
                      </span>

                    </div>
                  </div>
                </div>
                <div class="card card-outline" id="div_areaaddproduk" style="background-color:#CCD1D1;margin-left:10px;">
                  <div class="col-md-12" style="margin-top: 0px;margin-bottom: 0px;">
                    <div class="row row-custom">
                      <div class="col-sm-auto">
                        <div class="col-sm-auto">
                          <div class="form-group">
                            <label for="exempel1" style="color: black;"> Tgl. Transaksi :</label>
                            <input type="date" class="form-control form-control-xs" data-date-format="dd-mm-yyyy" format="dd-mm-yyyy" id="mod_KasirGeneral_tgl" name="mod_KasirGeneral_tgl" placeholder="date..." autocomplete="off">
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-3">
                        <div class="form-group">
                          <label for="exempel1" style="color: black;"> Produk :</label>
                          <input type="search" class="form-control form-control-xs" id="mod_Kasirgeneral_kdprd" name="mod_Kasirgeneral_kdprd" placeholder="pencarian..." autocomplete="off">
                        </div>
                      </div>

                      <div class="col-sm-3">
                        <div class="form-group">
                          <label for="exempel1" style="color: black;">Unit</label>
                          <input type="text" class="form-control form-control-xs" id="mod_Kasirgeneral_unit" name="mod_Kasirgeneral_unit" placeholder="unit..." autocomplete="off" readonly>
                        </div>
                      </div>

                      <div class="col-sm-2">
                        <div class="form-group">
                          <label for="exempel1" style="color: black;"> Tarif :</label>
                          <input type="text" class="form-control form-control-xs" id="mod_Kasirgeneral_tarif" name="mod_Kasirgeneral_tarif" placeholder="tarif..." autocomplete="off" readonly>
                        </div>
                      </div>

                      <div class="col-sm-1">
                        <div class="form-group">
                          <label for="exempel1" style="color: black;"> Qty :</label>
                          <input type="number" class="form-control form-control-xs" onkeypress="return hanyaAngka(event)" id="mod_KasirGeneral_qty" name="mod_KasirGeneral_qty" placeholder="qty..." autocomplete="off">
                        </div>
                      </div>

                      <!-- <div class="col-sm-auto">
                        <div class="form-group">
                          <label for="exempel1" style="color: white;"> Diskon Rp:</label> -->
                          <input type="hidden" class="form-control form-control-xs" onkeypress="return hanyaAngka(event)" id="mod_Kasirgeneral_diskon" name="mod_Kasirgeneral_diskon" placeholder="Diskon Rupiah..." autocomplete="off">
                        <!-- </div>
                      </div> -->

                      <!-- <div class="col-1">
                        <div class="form-group">
                          <label for="exempel1" style="color: white;"> Penindak :</label>
                          <input type="text" class="form-control form-control-xs" id="mod_Kasirgeneral_penindak" name="mod_Kasirgeneral_penindak" placeholder="penindak..." autocomplete="off" readonly>
                        </div>
                      </div> -->

                      <!-- <div class="col-1">
                        <div class="form-group">
                          <label for="exempel1" style="color: white;"> id kunjungan :</label> -->
                      <input type="hidden" class="form-control form-control-xs" id="mod_Kasirgeneral_idkunj" name="mod_Kasirgeneral_idkunj" placeholder="idkun..." autocomplete="off" readonly>
                      <input type="hidden" class="form-control form-control-xs" id="mod_Kasirgeneral_idtarif" name="mod_Kasirgeneral_idtarif" placeholder="idtarif..." autocomplete="off" readonly>

                      <!-- </div>
                      </div> -->


                      <div class="col-sm-auto" style="padding-top:20px;">
                        <button type="button" class="btn btn-xs bg-gradient-info" id="mod_kasirgeneral_simpan"><i class="fa fa-save"></i> Simpan</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12" id="divtabletindakan_modal_kasir" style="margin-top: 10px;max-height: 17rem; overflow: auto;height: 90vh;">
                  <table id="tabletindakan_modal_kasir" class="table-bordered table-hover table-sm" style="border-collapse: inherit;">
                    <thead>
                      <tr style="background-color:#CCD1D1">
                        <th width="5" style="color: black;">#</th>
                        <th width="100" style="color: black;">Tgl. Kunjung</th>
                        <th width="100" style="color: black;">Tgl. Input</th>
                        <th width="100" style="color: black;">Unit</th>
                        <th width="100" style="color: black;">Kd Produk</th>
                        <th width="150" style="color: black;">Nma Produk</th>
                        <th style="color: black;">Komponen</th>
                        <th width="100" style="color: black;">Qty</th>
                        <th width="100" style="color: black;">Tarif</th>
                        <!-- <th width="100">Diskon</th> -->
                        <th width="100" style="color: black;">Jumlah</th>
                        <th width="100" style="color: black;">Aksi</th>

                      </tr>
                    </thead>
                    <tbody id="list_tabletindakan_modal_kasir"></tbody>
                  </table>
                </div>
              </div>


              <!-- histori bayar -->
              <div class="col-md-12" style="margin-top: 20px;">
                <div class="row">
                  <div class="col-md-12" style="margin-top: 0px;margin-bottom: 0px;">
                    <div class="card card-outline darkgrey-custom">
                      <div class="card-header">
                        <span class="badge badge-info float-right">
                          <u>Histori Bayar</u>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12" id="div_tablehistory_modal_kasir" style="margin-top: -10px;max-height: 7rem; overflow: auto">
                    <table id="tablehistory_modal_kasir" class="table table-striped table-sm" style="border-collapse: inherit;">
                      <thead>
                        <tr>
                          <th width="5">#</th>
                          <th width="100">Tgl. Bayar</th>
                          <th width="90">No. Transaksi</th>
                          <th width="100">Shift</th>
                          <th>Pembayaran</th>
                          <th width="100">Jumlah</th>
                          <th width="100">Petugas</th>
                          <th width="250">Aksi</th>

                        </tr>
                      </thead>
                      <tbody id="list_tablehistory_modal_kasir" ;>

                      </tbody>
                    </table>
                  </div>

                </div>
              </div>
              <!-- // histori bAYAR -->
            </div>
          </div>
        </div>
      </div>
      <!-- menu kiri -->

      <div class="col-md-2" style="margin-top:20px">
        <!-- <div class="col-md-2" style="margin-top: 15px;margin-bottom: 0px;">
        <div class="col-md-2"> -->
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-body">
              <div class="overlay-wrapper" id="loading_kasir_mod_kanan">
                <div class="overlay">
                  <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                </div>
              </div>
              <div class="col-md-12 justify-content-between">
                <table class="table table-striped table-sm" border="0" style="margin:0px;size:100%">
                  <tr>
                    <td>No.Transaksi</td>
                    <td> : </td>
                    <td><?php echo $row['id_transaksi'] ?></td>
                  </tr>
                  <tr>
                    <td>Kode. RM</td>
                    <td> : </td>
                    <td><?php echo $row['no_rm'] ?></td>
                    <input type="hidden" id="valnorm" name="valnorm" value="<?php echo $row['no_rm'] ?>" readonly>
                  </tr>
                  <tr>
                    <td>Nama</td>
                    <td> : </td>
                    <td><?php echo $row['nama'] ?>
                      <input type="hidden" id="valnamapas" name="valnamapas" value="<?php echo $row['nama'] ?>" readonly>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="3">
                      <select class="form-control form-control-xs select2 " name="idpenjaminkasir" id="idpenjaminkasir" style="width: 100%;">
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="3">
                      <select class="form-control form-control-xs select2 " name="idunitkunjungkasir" id="idunitkunjungkasir" style="width: 100%;">
                      </select>
                    </td>
                  </tr>


                </table>
              </div>

              <div class="btn-group-vertical" style="width: 100%;margin-top:10px">
                <button type="button" id="buttonbayar" class="btn btn-block bg-gradient-secondary btn-sm" style="text-align: start;" onclick="tamp_bayar()"><i class="fa fa-pencil-alt"></i> Pembayaran</button>
                <button type="button" id="buttondeposit" class="btn btn-block bg-gradient-secondary btn-sm" style="text-align: start;" onclick="tamp_depositPasien()"><i class="fas fa-money-bill"></i> Deposit Pasien</button>
                <button type="button" id="buttonbayarpelunasan" class="btn btn-block bg-gradient-info btn-sm" style="text-align: start;" onclick="tamp_history_piutang()"><i class="fa fa-pencil-alt"></i> Pelunasan Piutang</button>
                <button type="button" id="buttonbukatransaksi" class="btn btn-block bg-gradient-info btn-sm" style="text-align: start;" onclick="tamp_bukatransaksikasir()"><i class="fas fa-check"></i> Buka Transaksi</button>
                <button type="button" id="buttontutuptransaksi" class="btn btn-block bg-maroon btn-sm" style="text-align: start;" onclick="tamp_tutuptransaksikasir()"><i class="fas fa-door-closed"></i> Tutup Transaksi</button>
                <button type="button" id="buttonbataltransaksi" class="btn btn-block bg-gradient-danger btn-sm" style="text-align: start;" onclick="tamp_bataltransaksikasir()"><i class="fas fa-trash"></i> Batal Transaksi</button>
              </div>


              <div class="btn-group-vertical" style="width: 100%;">

                <!-- <div class="btn-group">
                  <button type="button" class="btn btn-block bg-gradient-info btn-xs" style="text-align: start;"><i class="fa fa-pencil-alt"></i> Update Data</button>
                  <button type="button" class="btn bg-gradient-info btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                    <span class="sr-only"></span>
                  </button>
                  <div class="dropdown-menu" role="menu">
                    <a class="dropdown-item" href="#">Ganti Dokter</a>
                    <a class="dropdown-item" href="#">Ganti Kelompok Pasien</a>
                  </div>
                </div> -->
                <button type="button" class="btn btn-block bg-gradient-secondary btn-sm" onclick="cetakbillkasir();" style="text-align: start;"><i class="fa fa-print"></i> Cetak Billing</button>
              </div>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger btn-sm" onclick="keluarmodal_kasir();"><i class="fa fa-reply"></i> Kembali</button>

            </div>


          </div>
          <!-- /.modal-content -->
        </div>
        <!-- </div>
      </div> -->

      </div>
    </div>
  </div>
</div>
<div class="lookkup_jas"></div>



<!-- //menu kiri -->


<script type="text/javascript">
  $(document).ready(function() {
    var tutuptransaksi = "<?php echo $row['tgl_tutup'] ?>";

    tampil_kunjungan();
    if (tutuptransaksi == null || tutuptransaksi == 'null' || tutuptransaksi == '') {
      // alert('urung tutup'+tutuptransaksi);
      remove_disdiv();
    } else {
      add_disdiv();
      // alert('wes tutup'+tutuptransaksi);
    }
  });

  $(document).on("click", ".cetakkwitansixx", function() {
    var user = JSON.parse(localStorage['data_user']);
    var namauser = user['nama'];
    var idbayar = $(this).attr("data-id");
    var idtransaksi = $(this).attr("data-id1");
    var idnominal = $(this).attr("data-id2");
    var namapas = $("#valnamapas").val();

    // alert(idtrans);
    // exit();
    var param = {
      idtransaksi: idtransaksi,
      idbayar: idbayar,
      idnominal: idnominal,
      val_namauser: namauser,
      val_namapas: namapas
    };
    newTabPOST('API/Kasirgeneral/cetakkwitansi', param);
    return;
  });

  $(document).on("click", ".cetakkwitansi", function() {
    var user = JSON.parse(localStorage['data_user']);
    var namauser = user['nama'];
    var iduser = user['id_user'];
    var idbayar = $(this).attr("data-id");
    var idtransaksi = $(this).attr("data-id1");
    var idnominal = $(this).attr("data-id2");
    var namapas = $("#valnamapas").val();
    var norm = $("#valnorm").val();
    pertanyaan.fire({
      title: 'Anda akan Mencetak Kwitansi',
      html: '<span><br><input type="text" placeholder="Nama ..." name="KasirtextFreenama" id="KasirtextFreenama" value="'+namapas+' / '+norm+'"  required><br><textarea type="text" placeholder="Uraian kwitansi ..." name="KasirtextFreeuraian" value="Pembayaran Pelayanan Kesehatan" id="KasirtextFreeuraian">Layanan Kesehatan</textarea></span>',
      icon: 'question',
      showCancelButton: true,
      reverseButtons: false,
      allowOutsideClick: false
    }).then((result) => {
      if (result.isConfirmed) {
        // $('#loading_kasir_mod').show();
        var param = {
          idtransaksi: idtransaksi,
          idbayar: idbayar,
          idnominal: idnominal,
          val_namauser: namauser,
          val_namapas: namapas,
          val_freenama : $("#KasirtextFreenama").val(),
          val_freeuraian : $("#KasirtextFreeuraian").val(),
          val_iduser : iduser
        };
        newTabPOST('API/Kasirgeneral/cetakkwitansi', param);
        return;
      } else if (result.dismiss === Swal.DismissReason.cancel) {

      }
    })

  });

  $(".generatetarifkasir").click(function(event) {
    $('#loading_kasir_mod').show();

    var id_transaksi = "<?php echo $row['id_transaksi'] ?>";
    var id_penjamin = $("#idpenjaminkasir").val();
    var listParam = [
      'val_id_transaksi', 'val_id_penjamin'
    ];
    var param = {
      val_id_transaksi: id_transaksi,
      val_id_penjamin: id_penjamin,
    };
    apiPOST("Kasirgeneral/generatetarifkasir", param, hasil => {
      if (hasil['data'] !== null) {
        //alert('tes');
        if (hasil['code'] == 'XX' || hasil['code'] == '300') {
          toastr.error(hasil['pesan']);
        } else {
          tampilkan_isi_tindakan();
        }

      }
      $('#loading_kasir_mod').hide();
    }, listParam);

    //  alert('hallo')
  });

  function add_disdiv() {
    $("#divtabletindakan_modal_kasir").addClass("disabledbutton");
    $("#div_areaaddproduk").addClass("disabledbutton");
    $("#div_areatopbutton").addClass("disabledbutton");
    $("#div_tablehistory_modal_kasir").addClass("disabledbutton");
    $('#buttonbayar').attr('disabled', true);
    $("#buttonbayarpelunasan").removeClass("disabledbutton");
    $("#buttonbukatransaksi").removeClass("disabledbutton");

    

    $('#buttonbayarpelunasan').attr('disabled', false);
    $('#buttonbukatransaksi').attr('disabled', false);
    $('#buttontutuptransaksi').attr('disabled', true);
    $('#buttonbataltransaksi').attr('disabled', true);

  }

  function remove_disdiv() {
    $("#divtabletindakan_modal_kasir").removeClass("disabledbutton")

    $("#div_areaaddproduk").removeClass("disabledbutton");
    $("#div_areatopbutton").removeClass("disabledbutton");
    $("#div_tablehistory_modal_kasir").removeClass("disabledbutton");
    $('#buttonbayar').attr('disabled', false);
    $("#buttonbayarpelunasan").addClass("disabledbutton");
    $("#buttonbukatransaksi").addClass("disabledbutton");


    $('#buttonbayarpelunasan').attr('disabled', true);
    $('#buttonbukatransaksi').attr('disabled', true);
    $('#buttontutuptransaksi').attr('disabled', false);
    $('#buttonbataltransaksi').attr('disabled', false);
  }

  function tamp_bayar() {
    //alert('ok');
    $('#loading_kasir_mod_kanan').show();
    var json_data = {
      id_transaksi: <?php echo $row['id_transaksi'] ?>,
    };
    var myJSON = JSON.stringify(json_data);
    //alert(id);
    $('.dtlBayar').load('Kasirgeneral/mod_Bayarkasir?data=' + myJSON);

    //$('.dtlBayar').load('Kasirgeneral/mod_Bayarkasir');
  }

  function tamp_depositPasien() {
    //alert('ok');
    $('#loading_kasir_mod_kanan').show();
    var json_data = {
      id_transaksi: <?php echo $row['id_transaksi'] ?>,
    };
    var myJSON = JSON.stringify(json_data);
    //alert(id);
    $('.depositpasien').load('Kasirgeneral/mod_DepositPasien?data=' + myJSON);

    //$('.dtlBayar').load('Kasirgeneral/mod_Bayarkasir');
  }

  function tamp_bayar_pelunasan() {
    //alert('ok');
    $('#loading_kasir_mod_kanan').show();
    var json_data = {
      id_transaksi: <?php echo $row['id_transaksi'] ?>,
    };
    var myJSON = JSON.stringify(json_data);
    //alert(id);
    $('.dtlBayarPelunasan').load('Kasirgeneral/mod_Bayarkasirpelunasan?data=' + myJSON);
    // $('.dtlBayarPelunasan').load('Kasirgeneral/mod_Bayarkasirpelunasan');
  }

  function tamp_history_piutang() {
    //alert('ok');
    $('#loading_kasir_mod_kanan').show();
    var json_data = {
      id_transaksi: <?php echo $row['id_transaksi'] ?>,
    };
    var myJSON = JSON.stringify(json_data);
    //alert(id);
    $('.dtlhistoryPiutang').load('Kasirgeneral/mod_historipiutang?data=' + myJSON);
    // $('.dtlBayarPelunasan').load('Kasirgeneral/mod_Bayarkasirpelunasan');
  }

  function tamp_bukatransaksikasir() {
    $('#loading_kasir_mod_kanan').show();
    var json_data = {
      id_transaksi: <?php echo $row['id_transaksi'] ?>,
    };
    var myJSON = JSON.stringify(json_data);
    $('.bukatransakasikasir').load('Kasirgeneral/mod_bukatransaksi?data=' + myJSON);
  }

  function KasirTambahPenjamin() {
    $('#loading_kasir_mod').show();
    var json_data = {
      id_transaksi: <?php echo $row['id_transaksi'] ?>,
    };
    var myJSON = JSON.stringify(json_data);
    $('.tambahpenjaminkasir').load('Kasirgeneral/mod_KasirPEnjamintransaksi?data=' + myJSON);
  }

  function UnpostingPenataJasa() {
    $('#loading_kasir_mod').show();
    var json_data = {
      id_transaksi: <?php echo $row['id_transaksi'] ?>,
    };
    var myJSON = JSON.stringify(json_data);
    $('.tambahpenjaminkasir').load('Kasirgeneral/mod_KasirUnpostingPJ?data=' + myJSON);
  }

  function tamp_look() {
    $('#loading_kasir_mod').show();
    var json_data = {
      id_transaksi: <?php echo $row['id_transaksi'] ?>,
    };
    var myJSON = JSON.stringify(json_data);
    $('.tambahpenjaminkasir').load('Kasirgeneral/mod_lookkup?data=' + myJSON);
  }

  function tamp_tutuptransaksikasir() {
    $('#loading_kasir_mod_kanan').show();
    var json_data = {
      id_transaksi: <?php echo $row['id_transaksi'] ?>,
    };
    var myJSON = JSON.stringify(json_data);
    $('.tutuptransakasikasir').load('Kasirgeneral/mod_tutuptransaksi?data=' + myJSON);
    // $('.lookkup').load('Kasirgeneral/mod_tutuptransaksi');
  }

  function tamp_bataltransaksikasir() {
    $('#loading_kasir_mod_kanan').show();
    var json_data = {
      id_transaksi: <?php echo $row['id_transaksi'] ?>,
    };
    var myJSON = JSON.stringify(json_data);
    $('.bataltransakasikasir').load('Kasirgeneral/mod_bataltransaksi?data=' + myJSON);

    // $('.bataltransakasikasir').load('Kasirgeneral/mod_bataltransaksi');
  }



  function tampilkan_isi_tindakan() {
    $('#loading_kasir_mod').show();

    var listParam = [
      'id_transaksi'
    ];
    var param = {
      id_transaksi: <?php echo $row['id_transaksi'] ?>,
    };
    apiPOST("Kasirgeneral/detailtransaksi", param, hasil => {
      if (hasil['data'] !== null) {
        $('#loading_kasir_mod').hide();

        //alert('tes');
        if (hasil['code'] == 'XX') {
          $('#loading_kasir_mod').hide();

          toastr.error('Data Tidak ditemukan');
        }
        var Baris = '';
        var a = hasil['data'];
        for (var i = 0; i < a.length; i++) {
          // alert(a[i].tgl_transaksi);
          if(a[i].namapeg == null){
            var doktercomponen = '';
          }
          else{
            var doktercomponen = a[i].namapeg;
          }
          var tgl = a[i].tgl_input.substr(8, 2);
          var bln = a[i].tgl_input.substr(5, 2);
          var thn = a[i].tgl_input.substr(0, 4);
          tglinput = tgl + '/' + bln + '/' + thn;
          jamtranskasi = a[i].tgl_input.substr(11, 8);
          var tglmasuk = a[i].tgl_masuk.substr(8, 2);
          var blnmasuk = a[i].tgl_masuk.substr(5, 2);
          var thnmasuk = a[i].tgl_masuk.substr(0, 4);
          tglkunjung = tglmasuk + '/' + blnmasuk + '/' + thnmasuk;
          var no = i + 1;
          Baris += '<tr id="baris' + no + '" >';
          Baris += '<td>' + no + '</td>';
          Baris += '<td>' + tglkunjung + '</td>';
          Baris += '<td>' + tglinput + '</td>';
          Baris += '<td>' + a[i].nama_unit + '</td>';
          Baris += '<td>' + a[i].kd_produk + '</td>';
          Baris += '<td>' + a[i].nama_produk + '</td>';
          Baris += '<td onclick="jas_look(' + a[i].id_detail_transaksi + ')">' + doktercomponen + '</td>';
          // Baris += '<td class="jas_look" data-id="' + a[i].id_detail_transaksi + '">' + a[i].namapeg + '</td>';
          Baris += '<td>' + a[i].qty + '</td>';
          // Baris += '<td>' + format_ribuan(a[i].harga) + '</td>';
          Baris += '<td>' + a[i].harga + '</td>';
          // Baris += '<td>' + a[i].diskon + '</td>';
          Baris += '<td>' + format_ribuan(a[i].total_harga) + '</td>';
          // Baris += '<td>' + a[i].total_harga + '</td>';
          Baris += "<td><button type='button' class='btn btn-block bg-gradient-danger btn-xs hapuskosongan' data-id='" + a[i].id_detail_transaksi + "' data-id1='" + a[i].nama_produk + "'><i class='fa fa-trash-alt'></i>Hapus</button></td>";
          Baris += "</tr>";

          // dataaraypenindak(a[i].id_detail_transaksi);
        }
        MyTablekasir.fnDestroy();
        //$('#tableKasir tbody').append(Baris);
        // $('#tabletindakan_modal_kasir tbody').append(Baris);
        document.getElementById("list_tabletindakan_modal_kasir").innerHTML = Baris;
        kasirgeneralrefresh();
        $('#loading_kasir_mod').hide();

      }

    }, listParam);
    $('#loading_kasir').hide();


  };



  // function dataaraypenindak(id_detail_transaksi) {
  //   var paramid_detail_transaksi = {
  //     id_detail_transaksi: id_detail_transaksi
  //   };
  //   var barispenindak = '';
  //   apiPOST('Kasirgeneral/datapenindakbyiddettransaksi', paramid_detail_transaksi, hasil => {
  //     var x = hasil['data'];
  //     for (var u = 0; u < x.length; u++) {
  //       barispenindak += '<div>'+ x[u]['namapeg']+ '</div>';
  //     }
  //     document.getElementById('penindakarray'+id_detail_transaksi +'').innerHTML = barispenindak;
  //   });
  // }

  $("#idunitkunjungkasir").on('change', function() {
    var valueselectunkun = this.value;
    var arrvalueselectunkun = valueselectunkun.split('||');
    var valueidunit = arrvalueselectunkun[0]; //idunit
    var valueidkunjung = arrvalueselectunkun[1]; //idkunj
    var validpenjaminkasir = $("#idpenjaminkasir").val();
    //alert(valueidunit);
    mod_kasirgeneral_getProduk(valueidunit, validpenjaminkasir);
    $("#mod_KasirGeneral_tgl").trigger('focus');
    $("#mod_Kasirgeneral_idkunj").val(valueidkunjung);

    $("#mod_Kasirgeneral_kdprd").val('');
    $("#mod_Kasirgeneral_unit").val('');
    $("#mod_Kasirgeneral_tarif").val('');
    $("#mod_KasirGeneral_qty").val('');
    $("#mod_Kasirgeneral_diskon").val('');
    $("#mod_Kasirgeneral_idtarif").val('');

  });

  // function jas_look(id_detail_transaksi) {
  //   $('#loading_kasir_mod').show();
  //       var json_datajas = {
  //         'id_detailtransaksi': id_detail_transaksi
  //       };
  //       var myJSONjas = JSON.stringify(json_datajas);
  //       //alert(id_detail_transaksi);
  //       $('.lookkup_jas').load('Kasirgeneral/mod_lookkup_jas?data=' + myJSONjas);
  //     }
  function jas_look(id_detail_transaksi) {
    $('#loading_kasir_mod').show();
    var json_datajas = {
      'id_detailtransaksi': id_detail_transaksi
    };
    var myJSONjas = JSON.stringify(json_datajas);
    //alert(id_detail_transaksi);
    $('.lookkup_jas').load('Kasirgeneral/mod_lookkup_jas2?data=' + myJSONjas);
  }

  $("#idpenjaminkasir").on('change', function() {
    var validpenjaminkasir = this.value;
    var valueselectunkun = $("#idunitkunjungkasir").val();
    var arrvalueselectunkun = valueselectunkun.split('||');
    var valueidunit = arrvalueselectunkun[0]; //idunit
    var valueidkunjung = arrvalueselectunkun[1]; //idkunj
    // var validpenjaminkasir = $("#idpenjaminkasir").val();
    //alert(valueidunit);
    mod_kasirgeneral_getProduk(valueidunit, validpenjaminkasir);
    $("#mod_KasirGeneral_tgl").trigger('focus');
    $("#mod_Kasirgeneral_idkunj").val(valueidkunjung);

    $("#mod_Kasirgeneral_kdprd").val('');
    $("#mod_Kasirgeneral_unit").val('');
    $("#mod_Kasirgeneral_tarif").val('');
    $("#mod_KasirGeneral_qty").val('');
    $("#mod_Kasirgeneral_diskon").val('');
    $("#mod_Kasirgeneral_idtarif").val('');
  });


  $("#mod_KasirGeneral_tgl").on("keyup", function(event) {
    if (event.keyCode == 13) {
      $("#mod_Kasirgeneral_kdprd").trigger('focus');
    }
  });

  // $("#mod_KasirGeneral_qty").on("keyup", function(event) {
  //   if (event.keyCode == 13) {
  //     $("#mod_Kasirgeneral_diskon").trigger('focus');
  //   }
  // });

  // $("#mod_Kasirgeneral_diskon").on("keyup", function(event) {
    $("#mod_KasirGeneral_qty").on("keyup", function(event) {
    if (event.keyCode == 13) {
      $("#mod_Kasirgeneral_kdprd").trigger('focus');
      var id_transaksi = "<?php echo $row['id_transaksi'] ?>";
      var id_produk = produkgeneral.getValue();
      var id_kunjungan = $("#mod_Kasirgeneral_idkunj").val();
      // var id_produk = $("#mod_Kasirgeneral_kdprd").val();
      var tgl_input = $("#mod_KasirGeneral_tgl").val();
      var id_tarif = $("#mod_Kasirgeneral_idtarif").val();
      var qty = $("#mod_KasirGeneral_qty").val();
      var diskon = $("#mod_Kasirgeneral_diskon").val();
      mod_KasirGeneral_addproduk(id_transaksi, id_produk, id_kunjungan, tgl_input, id_tarif, qty, diskon);
    }
  });

  function mod_KasirGeneral_addproduk(id_transaksi, id_produk, id_kunjungan, tgl_input, id_tarif, qty, diskon) {
    $("#mod_Kasirgeneral_kdprd").trigger('focus');
    var user = JSON.parse(localStorage['data_user']);
    var id_user = user['id_user'];
    var listParam = [
      'in_id_transaksi',
      'in_id_kunjungan',
      'in_id_produk',
      'in_tgl_input',
      'in_id_tarif',
      'in_qty',
      'in_diskon',
      'in_id_user'
    ];
    var param = {
      // id_detail_transaksi:  $("#mod_KasirGeneral_qty").val(),
      in_id_transaksi: id_transaksi,
      in_id_produk: id_produk,
      in_id_kunjungan: id_kunjungan,
      in_tgl_input: tgl_input,
      in_id_tarif: id_tarif,
      in_qty: qty,
      in_diskon: diskon,
      in_id_user: id_user,

    };
    apiPOST("Kasirgeneral/KasirG_simpanTransaksi", param, hasil => {
      tampilkan_isi_tindakan();
      $("#mod_Kasirgeneral_kdprd").trigger('focus');
      $("#mod_Kasirgeneral_kdprd").val('');
      $("#mod_Kasirgeneral_unit").val('');
      $("#mod_Kasirgeneral_tarif").val('');
      $("#mod_KasirGeneral_qty").val('');
      $("#mod_Kasirgeneral_diskon").val('');
      // $("#mod_Kasirgeneral_idkunj").val('');
      $("#mod_Kasirgeneral_idtarif").val('');
    }, listParam);
  }



  function mod_kasirgeneral_getProduk(valueidunit, validpenjaminkasir) {
    var param = {
      id_unit: valueidunit,
      id_penjamin: validpenjaminkasir,
    };

    produkgeneral = new AutoComplete("mod_Kasirgeneral_kdprd");
    apiPOST('Kunjungan/getProduk', param, hasil => {
      if (hasil !== null) {
        var list = hasil['data'];
        list.forEach(baru => {
          produkgeneral.addData(baru['id_produk'], baru['nama_produk'] + ' || ' + baru['harga'] + ' || ' + baru['nama_unit'] + ' || ' + baru['id_tarif'] + ' || ' + baru['kd_produk']);
          // document.getElementById('mod_Kasirgeneral_unit').value = baru['nama_unit'];
          // document.getElementById('mod_Kasirgeneral_tarif').value = baru['harga'];


        });
      }
    });

    produkgeneral.onPilih(() => {
      var string = $("#mod_Kasirgeneral_kdprd").val();
      var arrkasirgen = string.split('||');
      var arrkasirgen0 = arrkasirgen[0]; //nama
      var arrkasirgen1 = arrkasirgen[1]; //harga
      var arrkasirgen2 = arrkasirgen[2]; //namaunit
      var arrkasirgen3 = arrkasirgen[3]; //idtarif
      // alert(arrkasirgen0 + '-' + arrkasirgen1 + '-' + arrkasirgen2 + '-' + arrkasirgen3);
      document.getElementById('mod_Kasirgeneral_unit').value = arrkasirgen2;
      document.getElementById('mod_Kasirgeneral_tarif').value = arrkasirgen1;
      document.getElementById('mod_Kasirgeneral_idtarif').value = arrkasirgen3;

      $("#mod_KasirGeneral_qty").trigger('focus');
      $("#mod_KasirGeneral_qty").val(1);
    });

    $("#mod_Kasirgeneral_kdprd").on("keyup", function(event) {

      if (event.keyCode == 13) {
        $("#mod_KasirGeneral_qty").trigger('focus');
        $("#mod_KasirGeneral_qty").val(1);
      }
    });


    $("#mod_kasirgeneral_simpan").click(function(event) {
      var id_transaksi = "<?php echo $row['id_transaksi'] ?>";
      var id_produk = produkgeneral.getValue();
      var id_kunjungan = $("#mod_Kasirgeneral_idkunj").val();
      // var id_produk = $("#mod_Kasirgeneral_kdprd").val();
      var tgl_input = $("#mod_KasirGeneral_tgl").val();
      var id_tarif = $("#mod_Kasirgeneral_idtarif").val();
      var qty = $("#mod_KasirGeneral_qty").val();
      var diskon = $("#mod_Kasirgeneral_diskon").val();
      mod_KasirGeneral_addproduk(id_transaksi, id_produk, id_kunjungan, tgl_input, id_tarif, qty, diskon);
    });

  }

  function mod_RWIPenatajasa_addproduk(RWIidprd, RWInm_prd, RWIqty) {
    var param = {
      id_kunj: RWIidkunj,
      idprd: RWIidprd,
      ket: '',
      qty: RWIqty,
    };

    apiPOST("Rawat_inap/penatajasaRWI_simpanProduk", param, hasil => {
      //mod_RWIPenatajasa_tmbhtindakan(idprd, nm_prd, qty);
      mod_RWIPenatajasa_getlistproduk();
      $("#mod_RWIPenatajasa_kdprd").trigger('focus');
      $("#mod_RWIPenatajasa_kdprd").val('');
      $("#mod_RWIPenatajasa_qty").val('');
    });
  }

  function mod_RWIPenatajasa_getlistproduk() {
    $('#tabletindakan_modal_kasir tbody').html('');
    var param = {
      id_kunj: RWIidkunj,
    };

    apiPOST('Rawat_inap/penatajasaRWI_detailtindakan', param, hasil => {

      if (hasil['status'] !== 'gagal') {
        var a = hasil['data'];
        for (var i = 0; i < a.length; i++) {
          var RWIid_tindakan = a[i]['id_detail_tindakan'];
          var RWIidprd = a[i]['id_produk'];
          var RWInm_prd = a[i]['kd_produk'] + " || " + a[i]['nama_produk'];
          var RWIket = a[i]['ketrangan'];
          var RWIqty = a[i]['qty'];

          mod_RWIPenatajasa_tmbhtindakan(RWIidprd, RWInm_prd, RWIqty, RWIid_tindakan);
        }
      } else {
        var Baris = "";
        Baris += "<tr>";
        Baris += "<td colspan='4'>Data tidak ditemukan!!</td>";
        Baris += "</tr>";

        $('#tabletindakan_modal_kasir tbody').append(Baris);
      }

    });
  }

  function mod_RWIPenatajasa_tmbhtindakan(RWIidprd, RWInm_prd, RWIqty, RWIid_tindakan) {
    var Nomor = $('#tabletindakan_modal_kasir tbody tr').length + 1;
    var Baris = "";
    Baris += "<tr>";
    Baris += "<td>" + Nomor + "</td>";
    /*Baris += "<td>";
    Baris += "<input type='text' class='form-control form-control-xs' name='mod_RWIPenatajasa_kdprd[]' id='mod_RWIPenatajasa_kdprd"+Nomor+"' value='"+idprd+"' disabled>";
    Baris += "</td>";*/
    Baris += "<td>";
    Baris += "<input type='text' class='form-control form-control-xs' name='mod_RWIPenatajasa_nmprd[]' id='mod_RWIPenatajasa_nmprd" + Nomor + "' value='" + RWInm_prd + "' disabled>";
    Baris += "</td>";
    Baris += "<td><input type='number' class='form-control form-control-xs' name='mod_RWIPenatajasa_qty[]' id='mod_RWIPenatajasa_qty" + Nomor + "' value=" + RWIqty + " disabled></td>";
    Baris += "<td><button type='button' class='btn btn-xs btn-outline-danger mod_RWIPenatajasa_delrow' id='mod_RWIPenatajasa_delrow" + Nomor + "' ><i class='fa fa-trash'></i></button></td>";
    Baris += "</tr>";

    $('#tabletindakan_modal_kasir tbody').append(Baris);

    $("#mod_RWIPenatajasa_delrow" + Nomor).click(function(event) {
      // $(this).parent().parent().remove();
      // var no = 1;
      // $('#tabletindakan_modal_kasir tbody tr').each(function(){
      //   $(this).find('td:nth-child(1)').html(no);
      //   no++;
      // });
      mod_RWIPenatajasa_deleteProduk(RWIid_tindakan, RWInm_prd);
    });
  }

  function tampil_kunjungan() {
    $("#idunitkunjungkasir").trigger('focus');
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var tgl2 = now.getFullYear() + "-" + (month) + "-" + (day);
    $('#mod_KasirGeneral_tgl').val(tgl2);

    var id = "<?php echo $row['id_transaksi'] ?>";
    var param = {
      idtrans: id,
    };
    apiPOST('Kasirgeneral/kunjunganpas', param, hasil => {
      var aga = "<option value=''> * Pilih Tarif Unit </option>";
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        if(a[i]['nama_ruang'] == null || a[i]['nama_ruang'] == 'null' || a[i]['nama_kamar'] == null || a[i]['nama_kamar'] == 'null'){
          a[i]['nama_ruang'] = '';
          a[i]['nama_kamar'] = '';
        }
        aga += '<option value="' + a[i]['id_unit'] + '||' + a[i]['id_kunjungan'] + '">' + a[i]['nama_unit'] + ' ' + a[i]['nama_ruang'] + ' ' + a[i]['nama_kamar'] + '</option>';
      }
      document.getElementById('idunitkunjungkasir').innerHTML = aga;
    });

    apiPOST('Kasirgeneral/penjamintransaksi', param, hasil => {
      // var aga = "<option value=''> * Pilih Penjamin </option>";
      var aga = "";
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        aga += '<option value="' + a[i]['id_penjamin'] + '">' + a[i]['nama_penjamin'] + '</option>';
      }
      document.getElementById('idpenjaminkasir').innerHTML = aga;
    });

  }

  function cetakbillkasir() {
    var idtrans = <?php echo $row['id_transaksi'] ?>;
    var user = JSON.parse(localStorage['data_user']);
    var namauser = user['nama'];
    // alert(idtrans);
    // exit();
    var param = {
      idtransaksi: idtrans,
      namausernya:namauser
    };
    newTabPOST('API/Kasirgeneral/cetakbill', param);
    return;
  }

  function hanyaAngka(evt) {
    //alert('hai');
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;
    return true;
  }

  function tampil_tarif() {
    apiPOST('Kasirgeneral/tarif', null, hasil => {
      var dar = "<option value=''> * Pilih </option>";
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        dar += '<option value="' + a[i]['id_pegawai'] + '">' + a[i]['nama_pegawai'] + '</option>';
      }
      document.getElementById('kd_dokterranap').innerHTML = dar;
    });
  }



  function tampil_diagnosa(kode) {
    var param = {
      id: kode
    };
    apiPOST('Data_Sosial/diagnosabyname', param, hasil => {
      var penjamin = '<option value=>*Pilih</option>';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        penjamin += '<option value="' + a[i]['id_penyakit'] + '">' + a[i]['id_penyakit'] + ' | ' + a[i]['penyakit'] + '</option>';
      }
      document.getElementById('diagnosa').innerHTML = penjamin;
    });
  }

  $('.tglinput').inputmask('dd/mm/yyyy', {
    'placeholder': 'dd/mm/yyyy'
  })
  //Money Euro
  //Datemask2 mm/dd/yyyy
  $('#datemask2').inputmask('mm/dd/yyyy', {
    'placeholder': 'mm/dd/yyyy'
  })
  //Money Euro
  $('[data-mask]').inputmask();

  $('.js-mySelect2').select2({
    dropdownCssClass: "custom-dropdown"
  }).on("select2:open", function(e) {
    var self = $(this);
    self.on('keyup', function() {
      console.log('ini' + self.val());
      //console.log('fru');
    })
  });


  $(document).ready(function() {

    // time();
    // unit();
    //Datemask dd/mm/yyyy

    // $(".tambahbaris").click(function() {
    //   $('.js-mySelect2').select2({
    //     dropdownCssClass: "custom-dropdown"
    //   }).on("select2:open", function(e) {
    //     var self = $(this);
    //     self.on('keyup', function() {
    //       console.log('ini' + self.val());
    //       //console.log('fru');
    //     })
    //   });

    //   $(document).on('keyup', '.custom-dropdown .select2-search__field', function(ev) {
    //     var self = $(this);
    //     if (self.val().length > 1) {
    //       console.log('itu' + self.val());
    //       tampil_diagnosa(self.val());
    //     }
    //   });
    //   $('.tglinput').inputmask('dd/mm/yyyy', {
    //     'placeholder': 'dd/mm/yyyy'
    //   })
    //   //Money Euro
    //   //Datemask2 mm/dd/yyyy
    //   $('#datemask2').inputmask('mm/dd/yyyy', {
    //     'placeholder': 'mm/dd/yyyy'
    //   })
    //   //Money Euro
    //   $('[data-mask]').inputmask();

    //   var now = new Date();
    //   var day = ("0" + now.getDate()).slice(-2);
    //   var month = ("0" + (now.getMonth() + 1)).slice(-2);
    //   var tglsekarang = (day) + "/" + (month) + "/" + now.getFullYear();

    //   var Nomor = $('#tabletindakan_modal_kasir tbody tr').length + 1;
    //   var Baris = "<tr id=" + Nomor + ">";
    //   Baris += "<td>" + Nomor + "</td>";
    //   Baris += "<td><input type='text' class='form-control form-control-sm' inputmode='numeric' data-inputmask-alias='datetime' data-inputmask-inputformat='dd/mm/yyyy' value='" + tglsekarang + "' data-mask></td>";
    //   Baris += "<td><input type='text' class='form-control form-control-sm' name='tes' id='tes' onkeypress='return hanyaAngka(event)'></td>";
    //   Baris += "<td><input type='text' class='form-control form-control-sm' name='tes' id='tes'></td>";
    //   Baris += "<td><select class='select2 form-control form-control-sm' id='nama_produk' name='nama_produk'></select></td>";
    //   Baris += "<td><input type='text' class='form-control form-control-sm' name='tes' id='tes'></td>";
    //   Baris += "<td><input type='text' class='form-control form-control-sm' name='tes' id='tes'></td>";
    //   Baris += "<td><input type='text' class='form-control form-control-sm' name='tes' id='tes'></td>";
    //   Baris += "<td><input type='text' class='form-control form-control-sm' name='tes' id='tes'></td>";
    //   Baris += "<td><button type='button' class='btn btn-block bg-gradient-danger btn-xs hapuskosongan'><i class='fa fa-trash-alt'></i>Hapus</button></td>";
    //   Baris += "</tr>";

    //   $('#tabletindakan_modal_kasir tbody').append(Baris);

    //   $('#tabletindakan_modal_kasir tbody tr').each(function() {
    //     $(this).find('td:nth-child(5) input').focus();
    //   });

    // });

  })



  $('#loading_modal_kasir').hide();
  $('#loading_kasir_mod_kanan').hide();


  $("#modal_kasir").modal({
    backdrop: "static"
  });

  $('#modal_kasir').on('shown.bs.modal', function() {});


  tampilkan_isi_tindakan();
  tampilkan_isi_history_bayar();

  function keluarmodal_kasir() {
    $('#modal_kasir').modal('hide');
    $('.modal-backdrop').hide();
  }

  // function tampilkan_isi_tindakanx() {
  //   var Baris = '';
  //   for (var i = 0; i < 3; i++) {
  //     var no = i + 1;
  //     Baris += '<tr id="baris' + no + '">';
  //     Baris += '<td>' + no + '</td>';
  //     Baris += '<td>02/06/2023</td>';
  //     Baris += '<td>Unit ' + no + '</td>';
  //     Baris += '<td>kdProduk' + no + '</td>';
  //     Baris += '<td>Biaya Obat Transfer' + no + '</td>';
  //     Baris += '<td>dr. Joko Islami</td>';
  //     Baris += '<td>' + (no + 5) + '</td>';
  //     Baris += '<td>Rp. ' + no + '000</td>';
  //     Baris += "<td><button type='button' class='btn btn-block bg-gradient-danger btn-xs hapuskosongan'><i class='fa fa-trash-alt'></i>Hapus</button></td>";
  //     Baris += "</tr>";
  //   }
  //   $('#tabletindakan_modal_kasir tbody').append(Baris);
  // }



  $(document).on("click", ".hapuskosongan", function() {
    var id = this.id;
    var id = jQuery(this).closest('tr').attr('id');
    var iddetailtransaksi = $(this).attr("data-id");
    var namaproduk = $(this).attr("data-id1");
    var kasiridtranskasi = <?php echo $row['id_transaksi'] ?>;

    pertanyaan.fire({
      title: 'Hapus Data Produk',
      html: '<span>Benarkah Produk ' + namaproduk + ', di Hapus ?</span>',
      icon: 'question',
      showCancelButton: true,
      reverseButtons: false,
      allowOutsideClick: false
    }).then((result) => {
      if (result.isConfirmed) {
        //$('#tabletindakan_modal_kasir tbody').html('');
        var param = {
          id_detail_transaksi: iddetailtransaksi,
          id_transaksi : kasiridtranskasi
        };

        apiPOST('Kasirgeneral/Kasir_deletetindakan', param, hasil => {
          // mod_RWJPenatajasa_getlistproduk();
          if (hasil['status'] == 'sukses') {
            $("body").find("#" + id).remove();
          }
        });
      } else if (result.dismiss === Swal.DismissReason.cancel) {

      }
    })

  });

  function KasirGantiPenjaminGEnerate() {
    var Kasirid_penjamin = $('#idpenjaminkasir').val();
    // var Kasirnamapenjamin = $(this).find('option:selected').attr("idpenjaminkasir");
    var Kasirnamapenjamin = $("#idpenjaminkasir  option:selected").text();
    var Kasirid_transaksi = "<?php echo $row['id_transaksi'] ?>";
    // alert(name);
    // exit();
    pertanyaan.fire({
      title: 'Ganti Tarif akan mengganti semua tarif berdasarkan menu penjamin yang anda pilih ,',
      html: '<span>Anda akan mengganti tarif dengan Penjamin <b>' + Kasirnamapenjamin + '</b>, Yakin ?</span>',
      icon: 'question',
      showCancelButton: true,
      reverseButtons: false,
      allowOutsideClick: false
    }).then((result) => {
      if (result.isConfirmed) {
        toastr.error('Masih Proses Pengembangan');
        //$('#loading_kasir_mod').show();
        //$('#tabletindakan_modal_kasir tbody').html('');
        var param = {
          id_transaksi: Kasirid_transaksi,
          id_penjamin: Kasirid_penjamin
        };

        apiPOST('Kasirgeneral/Kasir_GantipenjamingenerateTarif_ujicobalagi', param, hasil => {
          if (hasil['data'] !== null) {
            //alert('tes');
            if (hasil['code'] == '200') {
              tampilkan_isi_tindakan();
              $('#loading_kasir_mod').hide();
            }
          } else {
            $('#loading_kasir_mod').hide();

          }
          // mod_RWJPenatajasa_getlistproduk();
          // $("body").find("#" + id).remove();
        });
      } else if (result.dismiss === Swal.DismissReason.cancel) {

      }
    })

  };

  $(document).on("click", ".hapusbayar", function() {
    // var txt;
    var id = this.id;
    // var r = confirm("Apakah yakin akan menghapus!");
    // if (r == true) {
    //   txt = "You pressed OK! ";
    //   //console.log(txt);
    var id = jQuery(this).closest('tr').attr('id');
    //   // $("body").find(id).remove();
    //   $("body").find("#" + id).remove();
    //   // console.log('tes hapus a' + id_barang);
    //   console.log('tes hapus id =' + id)
    //   // calculate_total();
    var idbayar = $(this).attr("data-id");
    var idtransaksi = $(this).attr("data-id1");
    var idnominal = $(this).attr("data-id2");
    var idpembayaran = $(this).attr("data-id3");

    //   alert(iddetailkunjungan);
    // } else {
    //   txt = "You pressed Cancel!";
    // }
    var user = JSON.parse(localStorage['data_user']);
    var id_user = user['id_user'];
    if(idpembayaran == 6 || idpembayaran == '6'){
      toastr.error('Pembayaran dengan deposit tidak dapat dihapus, abaikan saja dan tutup transaksi');
      return;
    }
    pertanyaan.fire({
      title: 'Hapus Data Pembayaran',
      html: '<span>Benarkah ' + idnominal + ', di Hapus ???<br><input type="text" placeholder="alasan anda ..." name="alasanhapuspembayaran" id="alasanhapuspembayaran"></span>',
      icon: 'question',
      showCancelButton: true,
      reverseButtons: false,
      allowOutsideClick: false
    }).then((result) => {
      if (result.isConfirmed) {
        //$('#tabletindakan_modal_kasir tbody').html('');
        var alasan = $('#alasanhapuspembayaran').val();
        // console.log('ini'+alasan);
        // alert(alasan);
        // exit();
        var param = {
          val_idbayar: idbayar,
          val_idtransakasi: idtransaksi,
          val_iduser: id_user,
          val_alasan: alasan,
          val_nominal: idnominal,
          val_idpembayaran : idpembayaran
        };

        apiPOST('Kasirgeneral/Kasir_deletepembayaran', param, hasil => {
          // mod_RWJPenatajasa_getlistproduk();
          // $("body").find("#" + id).remove();
          tampilkan_isi_history_bayar();
        });
      } else if (result.dismiss === Swal.DismissReason.cancel) {

      }
    })

  });


  function tampilkan_isi_history_bayar() {
    var listParam = [
      'id_transaksi'
    ];
    var param = {
      id_transaksi: <?php echo $row['id_transaksi'] ?>,
    };
    apiPOST("Kasirgeneral/tampilhisbayar", param, hasil => {
      if (hasil['data'] !== null) {
        //alert('tes');
        if (hasil['code'] == 'XX') {
          toastr.error('Data Tidak ditemukan');
        }
        var no = $('#tablehistory_modal_kasir tbody tr').length + 1;
        var Barisbayar = '<tr id="trbayar' + no + '">';
        var a = hasil['data'];
        for (var i = 0; i < a.length; i++) {
          var tgl = a[i].tgl_bayar.substr(8, 2);
          var bln = a[i].tgl_bayar.substr(5, 2);
          var thn = a[i].tgl_bayar.substr(0, 4);
          tglbayar = tgl + '/' + bln + '/' + thn;
          Barisbayar += '<td>' + no + '</td>';
          Barisbayar += '<td>' + tglbayar + '</td>';
          Barisbayar += '<td>' + a[i].id_transaksi + '</td>';
          Barisbayar += '<td>' + a[i].shift + '</td>';
          Barisbayar += '<td>' + a[i].deskripsi_pembayaran + '</td>';
          Barisbayar += '<td>' + format_ribuan(a[i].jumlah) + '</td>';
          Barisbayar += '<td>' + a[i].nama + '</td>';
          Barisbayar += '<td><button type="button" class="btn bg-gradient-danger btn-xs hapusbayar" data-id="' + a[i].id_bayar + '" data-id1="' + a[i].id_transaksi + '" data-id2="' + a[i].jumlah + '" data-id3="' + a[i].id_pembayaran + '" ><i class="fa fa-trash-alt"></i>Hapus</button> | <button type="button" class="btn bg-gradient-success btn-xs cetakkwitansi" data-id="' + a[i].id_bayar + '" data-id1="' + a[i].id_transaksi + '" data-id2="' + a[i].jumlah + '" ><i class="fa fa-print"></i>Kwitansi</button></td>';
          Barisbayar += "</tr>";
          no++;
        }
        // $('#tablehistory_modal_kasir tbody').append(Barisbayar);
        document.getElementById("list_tablehistory_modal_kasir").innerHTML = Barisbayar;
        // sisadepositpasienBayar();

      }
    }, listParam);
  }


  // $(".tambahbaris").click(function() {
  //   // alert("tambah");
  //   BarisBaru();
  // });

  function tambahbayar() {
    tampilkan_isi_history_bayar();
  }
</script>