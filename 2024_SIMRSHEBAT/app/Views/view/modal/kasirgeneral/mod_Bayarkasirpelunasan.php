<?php
foreach ($data as $row)
  //var_dump($data);
  //echo "" . $row['id_transaksi'] . "";
  $tgltransaksi = date_create(substr($row['tgl_transaksi'], 0, 10));
$jamtransaksi = substr($row['tgl_transaksi'], 10, 16);

?>
<div class="content modal fade" id="modal_Bayarkasirpelunasan" style="margin-left: 180px;">
  <div class="container-fluid ">
    <div class="row" style="margin-top:-40px">
      <!-- content kanan -->
      <div class="col-md-8" style="margin-top: 20px;margin-bottom: 0px;">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-body">
              <div class="overlay-wrapper" id="loading_kasir_mod_bayar_pelunasan">
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
                    <span class="badge badge-secondary float-left">
                      <u>Pelunasan Pembayaran</u>
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
                            <tbody id="list_tablesjppenjaminpelunasan"></tbody>
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
                              <!-- <tr>
                                <td width="70">Kas</td>
                                <td>:</td>
                                <td>
                                  <select name="kodekasbayar" id="kodekasbayar" class="form-control form-control-xs">
                                  <option value=""> -- Pilih Kas -- </option>
                                  <option value="1"> Kas Besar </option>
                                  <option value="2"> Kas Kecil </option>

                                  </select>
                                </td>
                              </tr> -->
                              <tr>
                                <td width="70">Jenis</td>
                                <td>:</td>
                                <td>
                                  <select name="id_jenis_pembayaran_pelunasan" id="id_jenis_pembayaran_pelunasan" onchange="pembayaran(event);" class="form-control form-control-xs">
                                  </select>
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
                              <tr>
                                <td>Pembayaran</td>
                                <td>:</td>
                                <td> <select id="id_pembayaran_pelunasan" name="id_pembayaran_pelunasan" onchange="apakahkartup(event);" class="form-control form-control-xs">

                                  </select>
                                </td>
                              </tr>
                              <tr>

                                <td colspan="3">
                                  <div class="col-md-6 float-right" id='kartunomor' style="padding-top: 10px;display:none">

                                </td>
                              </tr>

                            </tbody>
                          </table>
                        </div>



                      </div>
                    </div>
                    <hr>

                    <div>


                      <div class="card-body"  style="margin-top:-35px;">
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
                            <button type="button" class="btn bg-gradient-info btn-sm BayarKasir_pelunasan"><i class="fa fa-cash-register"></i> Bayar</button>
                          </div>

                        </div>
                      </div>
                      <div class="col-md-12" id="div_tablehistory_modal_kasir_pelunasan" style="margin-top:-30px;max-height: 10rem; overflow: auto">
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
                          <tbody id="list_tablehistory_modal_kasir_piutang" ;>

                          </tbody>
                          <tbody id="list_tablehistory_modal_kasir_piutang_bayar" ;>
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

<!-- //menu kiri -->


<script type="text/javascript">
  $(document).ready(function() {
    $('#loading_kasir_mod_bayar_pelunasan').hide();
    $('#loading_kasir_mod_bayar_pelunasan_his').hide();
    tampil_jenisbayar();
    tampil_sjp();
    totalyangharusdibayarpelunasan();
    tampilkan_isi_history_piutang();
    tampilkan_isi_history_bayar_pelunasan();
    Deposit_tampil_kas_teller_pelunasan();
    $('#jumlahbayarkasir_pelunasan').val(0);
    // pembayaran();

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


  function Deposit_tampil_kas_teller_pelunasan() {
    apiPOST('Kasirgeneral/selecttellerkas', null, hasil => {
      var idjen = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        idjen += '<option value="' + a[i]['id_ac'] + '">' + a[i]['kas_nama'] + '</option>';
      }
      document.getElementById('kodekaspelunasan_kasir').innerHTML = idjen;


    });
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
        var no = $('#tablehistory_modal_kasir_pelunasan tbody tr').length + 1;
        var Barisbayarlunas = '<tr id="trbayarpelunasanbayar' + no + '">';
        var a = hasil['data'];
        for (var i = 0; i < a.length; i++) {
          var tgl = a[i].tgl_bayar.substr(8, 2);
          var bln = a[i].tgl_bayar.substr(5, 2);
          var thn = a[i].tgl_bayar.substr(0, 4);
          tglbayarpelunasan = tgl + '/' + bln + '/' + thn;
          Barisbayarlunas += '<td>' + tglbayarpelunasan + '</td>';
          Barisbayarlunas += '<td>' + a[i].id_transaksi + '</td>';
          Barisbayarlunas += '<td>' + a[i].shift + '</td>';
          Barisbayarlunas += '<td>' + a[i].deskripsi_pembayaran + '</td>';
          Barisbayarlunas += '<td>' + format_ribuan(a[i].jumlah) + '</td>';
          Barisbayarlunas += '<td>' + a[i].nama + '</td>';
          Barisbayarlunas += '<td></td>';
          // Barisbayarlunas += '<td><button type="button" class="btn bg-gradient-danger btn-xs hapusbayar" data-id="' + a[i].id_bayar + '" data-id1="' + a[i].id_transaksi + '" data-id2="' + a[i].jumlah + '" ><i class="fa fa-trash-alt"></i>Hapus</button> | <button type="button" class="btn bg-gradient-success btn-xs cetakkwitansi" data-id="' + a[i].id_bayar + '" data-id1="' + a[i].id_transaksi + '" data-id2="' + a[i].jumlah + '" ><i class="fa fa-print"></i>Kwitansi</button></td>';
          Barisbayarlunas += "</tr>";
          no++;
        }
        // $('#tablehistory_modal_kasir_pelunasan tbody').append(Barisbayar);
        document.getElementById("list_tablehistory_modal_kasir_piutang").innerHTML = Barisbayarlunas;

      }
    }, listParam);
  }

  function tampilkan_isi_history_bayar_pelunasan() {
    var listParam = [
      'id_transaksi'
    ];
    var param = {
      id_transaksi: <?php echo $row['id_transaksi'] ?>,
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
          Barisbayar += '<td>' + format_ribuan(a[i].kredit) + '</td>';
          Barisbayar += '<td>' + a[i].nama + '</td>';
          Barisbayar += '<td><button type="button" class="btn bg-gradient-danger btn-xs hapusbayar" data-id="' + a[i].id_bayar + '" data-id1="' + a[i].id_transaksi + '" data-id2="'+ a[i].kredit +'" ><i class="fa fa-trash-alt"></i>Hapus</button> | <button type="button" class="btn bg-gradient-success btn-xs cetakkwitansi" data-id="" data-id1="' + a[i].id_transaksi + '" data-id2="' + a[i].kredit + '" ><i class="fa fa-print"></i>Kwitansi</button></td>';

          // Barisbayar += '<td><button type="button" class="btn bg-gradient-danger btn-xs hapusbayar" data-id="' + a[i].id_bayar + '" data-id1="' + a[i].id_transaksi + '" data-id2="' + a[i].jumlah + '" ><i class="fa fa-trash-alt"></i>Hapus</button> | <button type="button" class="btn bg-gradient-success btn-xs cetakkwitansi" data-id="' + a[i].id_bayar + '" data-id1="' + a[i].id_transaksi + '" data-id2="' + a[i].jumlah + '" ><i class="fa fa-print"></i>Kwitansi</button></td>';
          Barisbayar += "</tr>";
          no++;
        }
        // $('#tablehistory_modal_kasir_pelunasan tbody').append(Barisbayar);
        document.getElementById("list_tablehistory_modal_kasir_piutang_bayar").innerHTML = Barisbayar;

      }
    }, listParam);
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

  $(".BayarKasir_pelunasan").click(function() {
    $('#loading_kasir_mod_bayar_pelunasan').show();
    // $('#loading_kasir_mod_bayar_pelunasan').hide();
    var val_id_pembayaran = $("#id_pembayaran").val();
    var val_idtransaksi = $("#idtransaksi").val();
    var val_jumlahbayarkasir = $("#jumlahbayarkasir_pelunasan").val();
    var val_tglbayar = $("#tglbayarpelunasan").val();
    var val_jambayar = $("#jambayarpelunasan").val();
    var user = JSON.parse(localStorage['data_user']);
    var id_user = user['id_user'];
    if ($("#kasirtotalharusdibayarpelunasan").val() <= '0') {
      $('#loading_kasir_mod_bayar_pelunasan').hide();
      toastr.error('Pembayaran Sudah Balance');
      exit();
    }
    if (val_jumlahbayarkasir <= '0') {
      $('#loading_kasir_mod_bayar_pelunasan').hide();
      toastr.error('Masukan Nominal pembayaran');
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
      id_user: id_user
    };
    // $('#loading_kasir_mod_bayar_pelunasan').hide();

    apiPOST("Kasirgeneral/paidtransaksipelunasan", param, hasil => {
      // $('#modal_Bayarkasirpelunasan').modal('hide');

      if (hasil['data'] !== null) {
        //alert('tes');
        if (hasil['code'] == 'XX') {
          toastr.error('Data Gagal ditambahkan');
        } else {
          //tampilkan_isi_history_bayar_pelunasan();
          $('#modal_Bayarkasirpelunasan').modal('hide');

        }

      }
      $('#loading_kasir_mod_bayar_pelunasan').hide();

    }, listParam);
    // $('#loading_kasir_mod_bayar_pelunasan').hide();

  });


  // $('#list-barang').delegate('.harga-satuan, .kuantitas, .ppnpersen', 'keyup', function() {
  //   $this = $(this);
  //   $table = $this.parents('table');
  //   $tr = $this.parents('tr').eq(0);
  //   $tbody = $table.find('tbody').eq(0);

  //   harga_satuan = setInt($tr.find('.harga-satuan').val());
  //   kuantitas = setInt($tr.find('.kuantitas').val());
  //   ppnpersen = setInt($tr.find('.ppnpersen').val());

  //   setInt($tr.find('.ppn-rupiah').val(format_ribuan((harga_satuan * kuantitas) * ppnpersen / 100)));
  //   ppnrupiah = setInt($tr.find('.ppn-rupiah').val());
  //   // alert(ppnrupiah);
  //   $tr.find('.harga-total').val(format_ribuan((harga_satuan * kuantitas) - ppnrupiah));

  //   sub_total = 0;
  //   $list_harga_satuan = $tbody.find('.harga-total');
  //   $list_harga_satuan.each(function(i, elm) {
  //     elm_val = $(elm).val();
  //     if (elm_val == '') {
  //       elm_val = '0';
  //     }
  //     sub_total += parseInt(elm_val.replace(/\D/g, ''), 10);
  //     // console.log(sub_total);
  //   });

  //   diskon = $table.find('.diskon').val().replace(/\D/g, '');
  //   total = sub_total - diskon;
  //   if (total < 0) {
  //     total = 0;
  //   }
  //   $table.find('.sub-total').val(sub_total).trigger('keyup');
  //   $table.find('.total').val(total).trigger('keyup');

  //   $('#list-pembayaran').find('.total-tagihan').val(total).trigger('keyup');
  //   $('#list-pembayaran').find('.item-bayar').eq(0).trigger('keyup');

  // });

  function tampil_sjp() {
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
        document.getElementById("list_tablesjppenjaminpelunasan").innerHTML = Baris;
        kasirgeneralrefresh();
      }

    }, listParam);
    $('#loading_kasir_mod').hide();
    $('#loading_kasir').hide();

  }

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
  }



  // $(".datepicker").datepicker({
  //   dateFormat: 'dd-mm-yy'
  // });

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
  }

  function apakahkartup() {
    // alert('hai');
    var idpembayaran = $("#id_pembayaran").val();
    alert(idpembayaran);
    exit();
    var param = {
      id: idpembayaran,
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

  function totalyangharusdibayarpelunasan() {
    // alert('hai');

    var param = {
      id_transaksi: $("#idtransaksi").val(),
    };
    apiPOST('Kasirgeneral/totalyangharusdibayarpelunasan', param, hasil => {
      var a = hasil['data'];
      //alert(a);
      // var Baris = "<tr><td>No Kartu</td><td>:</td><td><input type='text' class='form-control form-control-xs' id='no_kartukasir' value=''></td></tr>";
      var Baris = a;
      // for (var i = 0; i < a.length; i++) {
      //   if(a[i]['totalharusdibayar'] == null){
      //     var selisih = 0;
      //   }
      //   else{
      //     var selisih = a[i]['totalharusdibayar'];

      //   }
      //   Baris += selisih;
      // }


      document.getElementById('kasirtotalharusdibayarpelunasan').value = format_ribuan(Baris);
      document.getElementById('kasirbalance_pelunasan').value = format_ribuan(Baris);
    });
  }

  $('#loading_kasir_mod_bayar_pelunasan').hide();

  $('#loading_modal_hide').hide();

  $('#loading_kasir_mod_kanan').hide();

  $("#modal_Bayarkasirpelunasan").modal({
    backdrop: "static"
  });
  $('#modal_Bayarkasirpelunasan').on('shown.bs.modal', function() {

  })

  function keluarmodal_kasir() {
    $('#modal_kasir').modal('hide');
    $('.modal-backdrop').hide();
  }
</script>