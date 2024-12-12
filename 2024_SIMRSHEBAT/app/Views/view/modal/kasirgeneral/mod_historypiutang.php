<?php
foreach ($data as $row)
  //var_dump($data);
  //echo "" . $row['id_transaksi'] . "";
  $tgltransaksi = date_create(substr($row['tgl_transaksi'], 0, 10));
$jamtransaksi = substr($row['tgl_transaksi'], 10, 16);

?>
<div class="content modal fade" id="modal_historypiutang" style="margin-left: 180px;">
  <div class="container-fluid ">
    <div class="row" style="margin-top:-40px">
      <!-- content kanan -->
      <div class="col-md-8" style="margin-top: 20px;margin-bottom: 0px;">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-body">
              <div class="overlay-wrapper" id="loading_kasir_mod_bayar_pelunasan_his">
                <div class="overlay">
                  <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                </div>
              </div>
              <!-- detail transaksi -->
              <div class="row">
                <div class="col-md-12" style="margin-top: 0px;margin-bottom: 0px;">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                  <div class="col-md-12 col-sm-12 col-12 p-1">
                    <span class="badge badge-secondary float-left" style="font-size: 15px;">
                      Pelunasan Transaksi Piutang
                    </span>
                  </div>

                  <div class="card card-outline card-danger col-md-12">
                    <div class="row">

                      <div class="col-md-6 col-sm-6 col-12 p-1">
                        <div class="info-box mb-0">
                          <table class="table table-striped table-sm" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                              <tr>
                                <td width="70">No. Transaksi.</td>
                                <td>:</td>
                                <td><input type="text" class="form-control form-control-xs " value='<?php echo $row['id_transaksi'] ?>' id='idtransaksi' name="idtransaksi" readonly></td>
                              </tr>
                              <tr>
                                <td>Tgl. Kunj.</td>
                                <td>:</td>
                                <td>
                                  <input type="text" class="form-control form-control-xs " id="tgltransaksi" value='<?php echo date_format($tgltransaksi, "d/m/Y");  ?>' name="tgltransaksi" readonly>

                                </td>
                              </tr>
                              <tr>
                                <td>No. Rm</td>
                                <td>:</td>
                                <td><input type="text" class="form-control form-control-xs" id='norm' value='<?php echo $row['no_rm'] ?>' name="norm" readonly></td>
                              </tr>
                              <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td><input type="text" class="form-control form-control-xs" id='namapas' value='<?php echo $row['nama'] ?>' name="namapas" readonly></td>
                              </tr>
                              <!-- <tr>
                                <td>SJP</td>
                                <td>:</td>
                                <td><textarea class="form-control form-control-xs" id='nosjp' name='nosjp' readonly></textarea></td>
                              </tr> -->
                            </tbody>
                          </table>
                        </div>
                      </div>

                      <div class="col-md-6 col-sm-6 col-12 p-1">
                        <div class="info-box mb-0">
                          <table class="table table-striped table-sm" id='listnosjp' cellspacing="0" cellpadding="0" border="0">
                            <thead>
                              <tr>
                                <td>No</td>
                                <td>Penjamin</td>
                                <td>No.SJP</td>
                              </tr>
                            </thead>
                            <tbody id="list_tablesjppenjaminpelunasan_his"></tbody>
                          </table>
                        </div>
                        <div class="info-box mb-0">

                          <table class="table table-striped table-sm" id='pembayaranvalue' cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                              <tr>
                                <td width="70">Tgl Bayar</td>
                                <td>:</td>
                                <td>
                                  <input type="text" class="form-control form-control-xs " data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric" id="tglbayarpelunasan" name="tglbayarpelunasan" value=''>
                                  <input type="text" class="form-control form-control-xs " id="jambayarpelunasan" value='' name="jambayarpelunasan" readonly>
                                </td>
                              </tr>
                             
                              <tr>
                                <td width="70">Jenis</td>
                                <td>:</td>
                                <td>
                                  <select name="id_jenis_pembayaran_pelunasan" id="id_jenis_pembayaran_pelunasan" onchange="pembayaran(event);" class="form-control form-control-xs">
                                  </select>
                                </td>
                              </tr>
                              <tr>
                                <td>Pembayaran</td>
                                <td>:</td>
                                <td> <select id="id_pembayaran_pelunasan" name="id_pembayaran_pelunasan" onchange="apakahkartu(event);" class="form-control form-control-xs">

                                  </select>
                                </td>
                              </tr>
                              <tr>

                                <td colspan="3">
                                  <div class="col-md-6 float-right" id='kartunomor' style="padding-top: 10px;display:none">

                                </td>
                              </tr>
                              <tr>
                                <td width="70">Kas</td>
                                <td>:</td>
                                <td>
                                  <select name="kodekaspelunasan_kasir" id="kodekaspelunasan_kasir" class="form-control form-control-xs" required>
                                  </select>
                                </td>
                              </tr>

                            </tbody>
                          </table>
                        </div>



                      </div>
                    </div>
                    <hr>

                    <div>



                      <div class="col-md-12" id="div_tablehistory_modal_kasir_pelunasan_his" style="margin-top:-30px;max-height: 10rem; overflow: auto">
                        <table id="tablehistory_modal_kasir_pelunasan_his" class="table table-striped table-sm" style="border-collapse: inherit;">
                          <thead>
                            <tr>
                              <th width="100">Tanggal</th>
                              <th width="90">No. Transaksi</th>
                              <th width="100">Shift</th>
                              <th>Pembayaran</th>
                              <th width="100">Jumlah</th>
                              <th width="100">Petugas</th>
                              <th width="250">Aksi</th>

                            </tr>
                          </thead>
                          <tbody id="list_tablehistory_modal_kasir_piutang_his">

                          </tbody>

                        </table>
                      </div>
                      <div class="col-md-12" id="div_pembayaran_pelunasan" style="margin-top:0px;display:none">
                        <div class="overlay-wrapper" id="loading_kasir_mod_bayar_pelunasan_nominal">
                          <div class="overlay">
                            <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                          </div>
                        </div>
                        <button type="button" class="btn btn-danger btn-sm float-right" onclick="kembalikehistorypelunasan();"><i class="fa fa-reply"></i> Kembali</button>
                        <!-- disini -->
                        <div class="card-body" style="margin-top:0px;">
                          <div class="row">
                            <div class="form-group col-3">
                              <label for="input">Total</label>
                              <input type="text" class="form-control" placeholder="total nominal ..." id="kasirtotalharusdibayarpelunasan" name="kasirtotalharusdibayarpelunasan" readonly>
                            </div>
                            <div class="form-group col-3">
                              <label for="input">Balance</label>
                              <input type="text" class="form-control" placeholder="balance ..." id="kasirbalance_pelunasan" name="kasirbalance_pelunasan" readonly>
                            </div>


                            <div class="form-group col-3">
                              <label for="input">Nominal Bayar</label>
                              <input type="text" class="form-control" placeholder="Nominal bayar ..." id="jumlahbayarkasir_pelunasan" name="jumlahbayarkasir_pelunasan" autocomplete="off">
                            </div>

                            <div class="col-2" style="padding-top:20px;">
                              <button type="button" class="btn bg-gradient-info btn-sm BayarKasir_pelunasan" onclick="BayarKasir_pelunasan();"><i class="fa fa-cash-register"></i> Bayar</button>
                            </div>
                            <input type="hidden" class="form-control" id="kasir_idbayarpelunasan" name="kasir_idbayarpelunasan" autocomplete="off">

                          </div>
                        </div>
                        <hr>
                        <div class="col-md-12" id="div_tablehistory_modal_kasir_pelunasan" style="margin-top: 0px;max-height: 10rem; overflow: auto">
                          <table id="tablehistory_modal_kasir_pelunasan" class="table table-striped table-sm" style="border-collapse: inherit;">
                            <thead>
                              <tr>
                                <th width="100">Tgl. Bayar</th>
                                <th width="90">No. Transaksi</th>
                                <th width="100">Shift</th>
                                <th>Pembayaran</th>
                                <th width="100">Jumlah</th>
                                <th width="100">Petugas</th>
                                <th width="250">Aksi</th>

                              </tr>
                            </thead>

                            <tbody id="list_tablehistory_modal_kasir_piutang_bayar" ;>
                              <tr>


                              </tr>
                            </tbody>

                            <tbody id="list_tablehistory_modal_kasir_piutang_perbaikan" ;>
                              <tr>


                              </tr>
                            </tbody>
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
  </div>
</div>

<!-- //menu kiri -->


<script type="text/javascript">
  $(document).ready(function() {
    $('#loading_kasir_mod_bayar_pelunasan_his').hide();
    tampil_sjp_aja();
    tampilkan_isi_history_piutang();
    tampil_jenisbayar();
    // tampil_kas_teller_pelunasan_piutang();

    var today = new Date();
    //alert(today);
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    tglbayarpelunasan = dd + '/' + mm + '/' + yyyy; // in   "mm/dd/yyyy" format
    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    document.getElementById('tglbayarpelunasan').value = tglbayarpelunasan;
    document.getElementById('jambayarpelunasan').value = time;

    // time();
    // unit();
    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', {
      'placeholder': 'dd/mm/yyyy'
    })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', {
      'placeholder': 'mm/dd/yyyy'
    })
    //Money Euro
    $('[data-mask]').inputmask()


  });





  function tampil_jenisbayar() {
    apiPOST('Kasirgeneral/jenisbayarpelunasan', null, hasil => {
      var idjen = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        idjen += '<option value="' + a[i]['id_jenis_pembayaran'] + '">' + a[i]['deskripsi'] + '</option>';
      }
      document.getElementById('id_jenis_pembayaran_pelunasan').innerHTML = idjen;
      pembayaran();


    });
  };

  function pembayaran() {
    $("#kartunomor").hide();

    var param = {
      id: $("#id_jenis_pembayaran_pelunasan").val(),
    };
    apiPOST('Kasirgeneral/pembayaran', param, hasil => {
      // var kab = '<option value="">*Pilih</option>';
      var kab = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        kab += '<option value="' + a[i]['id_pembayaran'] + '">' + a[i]['deskripsi_pembayaran'] + '</option>';
      }
      document.getElementById('id_pembayaran_pelunasan').innerHTML = kab;
    });
    lihatkas();

  }

    
  function lihatkas() {
    var id_jenis_pembayaran = $("#id_jenis_pembayaran_pelunasan").val();

    // alert(id_jenis_pembayaran);
    // exit();
    var user = JSON.parse(localStorage['data_user']);
    var id_user = user['id_user'];
    var param = {
      id: id_jenis_pembayaran,
      id_user: id_user
    };
    apiPOST('Kasirgeneral/selecttellerkas', param, hasil => {
      // var kab = '<option value="">*Pilih</option>';
      var kas = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        kas += '<option value="' + a[i]['id_kas'] + '">' + a[i]['kas_nama'] + '</option>';
      }
      document.getElementById('kodekaspelunasan_kasir').innerHTML = kas;
    });
  }

  function apakahkartu() {
    // alert('hai');

    var param = {
      id: $("#id_pembayaran_pelunasan").val(),
    };
    apiPOST('Kasirgeneral/apakahkartu', param, hasil => {
      var a = hasil['data'];
      // var Baris = "<tr><td>No Kartu</td><td>:</td><td><input type='text' class='form-control form-control-xs' id='no_kartukasir' value=''></td></tr>";
      var Baris = "<input type='text' class='form-control form-control-xs' placeholder='nomor kartu ...' id='no_kartukredit' value=''>";

      for (var i = 0; i < a.length; i++) {
        // alert(a[i]['kartu']);
        if (a[i]['kartu'] == 't') {
          // alert('hai');
          $("#kartunomor").show();

          document.getElementById("kartunomor").innerHTML = Baris;
          // $('#pembayaranvalue tbody').append(Baris);

        }
      }
      // document.getElementById('id_pembayaran').innerHTML = kab;
    });
  }

  $("#jumlahbayarkasir_pelunasan").on("keyup", function() {
    var bayar = setInt(this.value);
    //var val_bayar = bayar.replace(/\D/g, '');

    var harusdibayar = setInt($("#kasirtotalharusdibayarpelunasan").val());
    var balance = setInt($("#kasirbalance_pelunasan").val());
    var val_balance = harusdibayar - bayar;
    if (val_balance < 0) {
      val_balance = 0;
      alert('kelebihan bayar');
      $("#jumlahbayarkasir_pelunasan").val(0);
    }
    document.getElementById('kasirbalance_pelunasan').value = format_ribuan(val_balance);
  });

  // $(".BayarKasir_pelunasan").click(function() {
  function BayarKasir_pelunasan() {
    // $('#loading_kasir_mod_bayar_pelunasan_nominal').show();
    // $('#loading_kasir_mod_bayar_pelunasan').show();
    var val_id_pembayaran = $("#id_pembayaran_pelunasan").val();
    var val_idtransaksi = $("#idtransaksi").val();
    var val_jumlahbayarkasir = $("#jumlahbayarkasir_pelunasan").val();
    var val_tglbayar = $("#tglbayarpelunasan").val();
    var val_jambayar = $("#jambayarpelunasan").val();
    var user = JSON.parse(localStorage['data_user']);
    var id_user = user['id_user'];
    var idbayar = $("#kasir_idbayarpelunasan").val();
    var kodekaspelunasan_kasir = $("#kodekaspelunasan_kasir").val();

    // alert(val_id_pembayaran);
    // exit();

    if ($("#kasirtotalharusdibayarpelunasan").val() <= '0') {
      $('#loading_kasir_mod_bayar_pelunasan').hide();
      toastr.error('Pembayaran Sudah Balance');
      return;
    }
    if (val_jumlahbayarkasir <= '0') {

      toastr.error('Masukan Nominal pembayaran');
      $('#loading_kasir_mod_bayar_pelunasan').hide();
      $('#loading_kasir_mod_bayar_pelunasan').hide();
      return;
    }

    //console.log('id_pemabayaran:'+val_id_pembayaran+', id_transaksi :'+val_idtransaksi+'jumlahbayar:'+val_jumlahbayarkasir)
    var listParam = [
      'val_id_pembayaran', 'val_idtransaksi', 'val_jumlahbayarkasir', 'val_tglbayar', 'id_user', 'val_jambayar'
    ];
    var param = {
      val_idtransaksi: val_idtransaksi,
      val_id_pembayaran: val_id_pembayaran,
      val_jumlahbayarkasir: val_jumlahbayarkasir,
      val_tglbayar: val_tglbayar,
      val_jambayar: val_jambayar,
      id_user: id_user,
      val_idbayar: idbayar,
      val_id_kas : kodekaspelunasan_kasir
    };
    // $('#loading_kasir_mod_bayar_pelunasan').hide();

    apiPOST("Kasirgeneral/paidtransaksipelunasan", param, hasil => {
      // $('#modal_Bayarkasirpelunasan').modal('hide');

      if (hasil['data'] !== null) {
        //alert('tes');
        if (hasil['code'] == 'XX') {
          toastr.error('Data Gagal disimpan');
          $('#loading_kasir_mod_bayar_pelunasan_nominal').hide();
        } else {
          tampilkan_isi_history_bayar_pelunasan(idbayar);
          totalyangharusdibayarpelunasan(idbayar);
          document.getElementById('jumlahbayarkasir_pelunasan').value = 0;

          $('#loading_kasir_mod_bayar_pelunasan_nominal').hide();
        }

      }
      $('#loading_kasir_mod_bayar_pelunasan_nominal').hide();
      $('#loading_kasir_mod_bayar_pelunasan').hide();

    }, listParam);
    // $('#loading_kasir_mod_bayar_pelunasan').hide();

  };


  function tampil_sjp_aja() {
    var listParam = [
      'id_transaksi'
    ];
    var param = {
      id_transaksi: <?php echo $row['id_transaksi'] ?>,
    };
    apiPOST("Kasirgeneral/tampilsjp", param, hasil => {
      if (hasil['data'] !== null) {
        //alert('tes');
        if (hasil['code'] == 'XX') {
          toastr.error('Data Tidak ditemukan');
        }
        var Baris = '';
        var a = hasil['data'];
        for (var i = 0; i < a.length; i++) {
          var no = i + 1;
          Baris += '<tr id="baris' + no + '" >';
          Baris += '<td>' + no + '</td>';
          Baris += '<td>' + a[i].nama_penjamin + '</td>';
          Baris += '<td>' + a[i].no_sjp + '</td>';
          Baris += "</tr>";

        }
        MyTablekasir.fnDestroy();
        document.getElementById("list_tablesjppenjaminpelunasan_his").innerHTML = Baris;
        kasirgeneralrefresh();
      }

    }, listParam);
    $('#loading_kasir_mod').hide();
    $('#loading_kasir').hide();

  }

  function tampilkan_isi_history_piutang() {
    var listParam = [
      'id_transaksi'
    ];
    var param = {
      id_transaksi: <?php echo $row['id_transaksi'] ?>,
    };
    apiPOST("Kasirgeneral/tampilhispiutang", param, hasil => {
      if (hasil['data'] !== null) {
        //alert('tes');
        if (hasil['code'] == 'XX') {
          toastr.error('Data Tidak ditemukan');
        }
        var no = $('#tablehistory_modal_kasir_pelunasan_his tbody tr').length + 1;
        var Barisbayarlunas_his = '<tr id="trbayarpelunasanbayar_his' + no + '">';
        var a = hasil['data'];
        for (var i = 0; i < a.length; i++) {
          var tgl = a[i].tgl_bayar.substr(8, 2);
          var bln = a[i].tgl_bayar.substr(5, 2);
          var thn = a[i].tgl_bayar.substr(0, 4);
          tglbayarpelunasan = tgl + '/' + bln + '/' + thn;
          Barisbayarlunas_his += '<td>' + tglbayarpelunasan + '</td>';
          Barisbayarlunas_his += '<td>' + a[i].id_transaksi + '</td>';
          Barisbayarlunas_his += '<td>' + a[i].shift + '</td>';
          Barisbayarlunas_his += '<td>' + a[i].deskripsi_pembayaran + '</td>';
          Barisbayarlunas_his += '<td>' + format_ribuan(a[i].jumlah) + '</td>';
          Barisbayarlunas_his += '<td>' + a[i].nama + '</td>';
          Barisbayarlunas_his += '<td><button type="button" onclick="Kasirpembayaranpiutang(' + a[i].id_bayar + ',' + a[i].id_transaksi + ')" class="btn bg-gradient-info btn-xs KasirpembayaranpiutangXX" data-id="' + a[i].id_bayar + '" data-id1="' + a[i].id_transaksi + '" data-id2="' + a[i].jumlah + '" ><i class="fas fa-check"></i> Bayar Piutang</button> </td>';
          Barisbayarlunas_his += "</tr>";
          no++;
        }
        // $('#tablehistory_modal_kasir_pelunasan_his tbody').append(Barisbayar);
        document.getElementById("list_tablehistory_modal_kasir_piutang_his").innerHTML = Barisbayarlunas_his;

      }
    }, listParam);
  };

  function Kasirpembayaranpiutang(idbayar, idtransaksi) {
    // $('#loading_kasir_mod_bayar_pelunasan_his').show();
    var idbayar = idbayar;
    var id_transaksi = $(this).attr("data-id1");
    var a = document.getElementById("div_pembayaran_pelunasan");
    var b = document.getElementById("div_tablehistory_modal_kasir_pelunasan_his");
    a.style.display = "block";
    b.style.display = "none";
    tampilkan_isi_history_bayar_pelunasan(idbayar);
    tampilkan_isi_history_bayar_pelunasan_perbaikan(idbayar);
    totalyangharusdibayarpelunasan(idbayar);
    $('#jumlahbayarkasir_pelunasan').val(0);
    $('#kasir_idbayarpelunasan').val(idbayar);
    return;
  }

  function kembalikehistorypelunasan() {
    var a = document.getElementById("div_pembayaran_pelunasan");
    var b = document.getElementById("div_tablehistory_modal_kasir_pelunasan_his");
    a.style.display = "none";
    b.style.display = "block";
  }


  function tampilkan_isi_history_bayar_pelunasan(idbayar) {
    // alert(idbayar);
    // exit();
    var listParam = [
      'id_transaksi', 'id_bayar'
    ];
    var param = {
      id_transaksi: <?php echo $row['id_transaksi'] ?>,
      id_bayar: idbayar
    };
    apiPOST("Kasirgeneral/tampilhispembayaranpiutang", param, hasil => {
      if (hasil['data'] !== null) {
        //alert('tes');
        if (hasil['code'] == 'XX') {
          toastr.error('Data Tidak ditemukan');
        }
        var no = $('#tablehistory_modal_kasir_pelunasan tbody tr').length + 1;
        var Barisbayar = '<tr id="trbayarpelunasan' + no + '">';
        var a = hasil['data'];
        for (var i = 0; i < a.length; i++) {
          var tgl = a[i].tgl_aktivitas.substr(8, 2);
          var bln = a[i].tgl_aktivitas.substr(5, 2);
          var thn = a[i].tgl_aktivitas.substr(0, 4);
          tglbayarpelunasan = tgl + '/' + bln + '/' + thn;
          Barisbayar += '<td>' + tglbayarpelunasan + '</td>';
          Barisbayar += '<td>' + a[i].id_transaksi + '</td>';
          Barisbayar += '<td>' + a[i].shift + '</td>';
          Barisbayar += '<td>' + a[i].jenis_aktivitas_keuangan + '</td>';
          Barisbayar += '<td>' + format_ribuan(a[i].debit) + '</td>';
          Barisbayar += '<td>' + a[i].nama + '</td>';
          Barisbayar += '<td><button type="button" class="btn bg-gradient-danger btn-xs hapusbayarpelunasan" data-id="' + a[i].jenis_aktivitas_keuangan + '" data-id1="' + a[i].id_transaksi + '" data-id2="' + a[i].debit + '" data-id3="penghapusan" ><i class="fa fa-trash-alt"></i>Hapus</button> | <button type="button" class="btn bg-gradient-success btn-xs cetakkwitansi" data-id="" data-id1="' + a[i].id_transaksi + '" data-id2="' + a[i].debit + '" ><i class="fa fa-print"></i>Kwitansi</button></td>';

          // Barisbayar += '<td><button type="button" class="btn bg-gradient-danger btn-xs hapusbayar" data-id="' + a[i].id_bayar + '" data-id1="' + a[i].id_transaksi + '" data-id2="' + a[i].jumlah + '" ><i class="fa fa-trash-alt"></i>Hapus</button> | <button type="button" class="btn bg-gradient-success btn-xs cetakkwitansi" data-id="' + a[i].id_bayar + '" data-id1="' + a[i].id_transaksi + '" data-id2="' + a[i].jumlah + '" ><i class="fa fa-print"></i>Kwitansi</button></td>';
          Barisbayar += "</tr>";
          no++;
        }
        // $('#tablehistory_modal_kasir_pelunasan tbody').append(Barisbayar);
        document.getElementById("list_tablehistory_modal_kasir_piutang_bayar").innerHTML = Barisbayar;

      }
    }, listParam);
  }

  function tampilkan_isi_history_bayar_pelunasan_perbaikan(idbayar) {
    // alert(idbayar);
    // exit();
    var listParam = [
      'id_transaksi', 'id_bayar'
    ];
    var param = {
      id_transaksi: <?php echo $row['id_transaksi'] ?>,
      id_bayar: idbayar
    };
    apiPOST("Kasirgeneral/tampilhispembayaranpiutang_perbaikan", param, hasil => {
      if (hasil['data'] !== null) {
        //alert('tes');
        if (hasil['code'] == 'XX') {
          toastr.error('Data Tidak ditemukan');
        }
        var no = $('#tablehistory_modal_kasir_pelunasan tbody tr').length + 1;
        var Barisbayar = '<tr id="trbayarpelunasan' + no + '">';
        var a = hasil['data'];
        for (var i = 0; i < a.length; i++) {
          var tgl = a[i].tgl_aktivitas.substr(8, 2);
          var bln = a[i].tgl_aktivitas.substr(5, 2);
          var thn = a[i].tgl_aktivitas.substr(0, 4);
          tglbayarpelunasan = tgl + '/' + bln + '/' + thn;
          Barisbayar += '<td>' + tglbayarpelunasan + '</td>';
          Barisbayar += '<td>' + a[i].id_transaksi + '</td>';
          Barisbayar += '<td>' + a[i].shift + '</td>';
          Barisbayar += '<td>' + a[i].jenis_aktivitas_keuangan + '</td>';
          Barisbayar += '<td> - ' + format_ribuan(a[i].kredit) + '</td>';
          Barisbayar += '<td>' + a[i].nama + '</td>';
          Barisbayar += '<td></td>';
          // Barisbayar += '<td><button type="button" class="btn bg-gradient-danger btn-xs hapusbayarpelunasan" data-id="' + a[i].jenis_aktivitas_keuangan + '" data-id1="' + a[i].id_transaksi + '" data-id2="' + a[i].debit + '" data-id3="penghapusan" ><i class="fa fa-trash-alt"></i>Hapus</button> | <button type="button" class="btn bg-gradient-success btn-xs cetakkwitansi" data-id="" data-id1="' + a[i].id_transaksi + '" data-id2="' + a[i].debit + '" ><i class="fa fa-print"></i>Kwitansi</button></td>';

          // Barisbayar += '<td><button type="button" class="btn bg-gradient-danger btn-xs hapusbayar" data-id="' + a[i].id_bayar + '" data-id1="' + a[i].id_transaksi + '" data-id2="' + a[i].jumlah + '" ><i class="fa fa-trash-alt"></i>Hapus</button> | <button type="button" class="btn bg-gradient-success btn-xs cetakkwitansi" data-id="' + a[i].id_bayar + '" data-id1="' + a[i].id_transaksi + '" data-id2="' + a[i].jumlah + '" ><i class="fa fa-print"></i>Kwitansi</button></td>';
          Barisbayar += "</tr>";
          no++;
        }
        // $('#tablehistory_modal_kasir_pelunasan tbody').append(Barisbayar);
        document.getElementById("list_tablehistory_modal_kasir_piutang_perbaikan").innerHTML = Barisbayar;

      }
    }, listParam);
  }

  function totalyangharusdibayarpelunasan(idbayar) {
    var param = {
      id_transaksi: $("#idtransaksi").val(),
      id_bayar: idbayar
    };
    apiPOST('Kasirgeneral/totalyangharusdibayarpelunasan', param, hasil => {
      var a = hasil['data'];
      var Baris = a;
      var tampilnominalharusdibayar = document.getElementById('kasirtotalharusdibayarpelunasan').value = format_ribuan(Baris);
      document.getElementById('kasirbalance_pelunasan').value = format_ribuan(Baris);
      if (tampilnominalharusdibayar) {
        $('#loading_kasir_mod_bayar_pelunasan_nominal').hide();
      } else {
        $('#loading_kasir_mod_bayar_pelunasan_nominal').hide();
      }
    });

  }
  $(document).on("click", ".hapusbayarpelunasan", function() {
    // function hapusbayarpelunasan() {
    var user = JSON.parse(localStorage['data_user']);
    var id_user = user['id_user'];
    var val_id_pembayaran = $("#id_pembayaran").val();
    var val_idtransaksi = $("#idtransaksi").val();
    var val_jumlahbayarkasir = setInt(($(this).attr("data-id2")));
    // alert(val_jumlahbayarkasir);
    // exit();
    var val_tglbayar = $("#tglbayarpelunasan").val();
    var val_jambayar = $("#jambayarpelunasan").val();
    var user = JSON.parse(localStorage['data_user']);
    var id_user = user['id_user'];
    var idbayar = $("#kasir_idbayarpelunasan").val();
    var alasan = $('#alasanhapuspembayaran').val();
    pertanyaan.fire({
      title: 'Hapus Data Pembayaran',
      html: '<span>Benarkah ' + val_jumlahbayarkasir + ', di Hapus ???<br></span>',
      icon: 'question',
      showCancelButton: true,
      reverseButtons: false,
      allowOutsideClick: false
    }).then((result) => {
      if (result.isConfirmed) {

        var param = {
          val_idtransaksi: val_idtransaksi,
          val_id_pembayaran: val_id_pembayaran,
          val_jumlahbayarkasir: val_jumlahbayarkasir,
          val_tglbayar: val_tglbayar,
          val_jambayar: val_jambayar,
          id_user: id_user,
          val_idbayar: idbayar
        };
        apiPOST('Kasirgeneral/hapustransaksipelunasan', param, hasil => {
          tampilkan_isi_history_bayar_pelunasan(idbayar);
          totalyangharusdibayarpelunasan(idbayar);
          document.getElementById('jumlahbayarkasir_pelunasan').value = 0;
        });
      } else if (result.dismiss === Swal.DismissReason.cancel) {

      }
    })
  });
  // });

  $('#loading_modal_hide').hide();

  $('#loading_kasir_mod_kanan').hide();

  $("#modal_historypiutang").modal({
    backdrop: "static"
  });
  // $('#modal_historypiutang').on('shown.bs.modal', function() {

  // })

  function keluarmodal_kasir() {
    $('#modal_kasir').modal('hide');
    $('.modal-backdrop').hide();
  }
</script>