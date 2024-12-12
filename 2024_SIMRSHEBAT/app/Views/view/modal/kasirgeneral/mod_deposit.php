<?php
foreach ($data as $rowdeposit)
  //var_dump($data);
  // echo "" . $rowdeposit['no_rm'] . "";
  $tgltransaksi = date_create(substr($rowdeposit['tgl_transaksi'], 0, 10));
$jamtransaksi = substr($rowdeposit['tgl_transaksi'], 10, 16);
$normdeposit = $rowdeposit['no_rm'];
?>
<div class="content modal fade" id="modal_DepositPasien" style="margin-left: 180px;">
  <div class="container-fluid ">
    <div class="row" style="margin-top:-40px">
      <!-- content kanan -->
      <div class="col-md-8" style="margin-top: 20px;margin-bottom: 0px;">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-body">
              <div class="overlay-wrapper" id="loading_deposit_mod_bayar">
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
                      <u>Deposit Pasien</u>
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
                                <td><input type="text" class="form-control form-control-xs " value='<?php echo $rowdeposit['id_transaksi'] ?>' id='idtransaksi' name="idtransaksi" readonly></td>
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
                                <td><input type="text" class="form-control form-control-xs" id='norm' value='<?php echo $rowdeposit['no_rm'] ?>' name="norm" readonly></td>
                              </tr>
                              <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td><input type="text" class="form-control form-control-xs" id='namapas' value='<?php echo $rowdeposit['nama'] ?>' name="namapas" readonly></td>
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
                          <table class="table table-striped table-sm" id='pembayaranvalue' cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                              <tr>
                                <td width="70">Tgl Deposit</td>
                                <td>:</td>
                                <td>
                                  <input type="text" class="form-control form-control-xs " data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric" id="tglbayar_deposit" name="tglbayar_deposit" value=''>
                                  <input type="text" class="form-control form-control-xs " id="jambayar_deposit" value='' name="jambayar_deposit" readonly>
                                </td>
                              </tr>
                              <!-- <tr>
                                <td width="70">Kas</td>
                                <td>:</td>
                                <td>
                                  <select name="kodekasdeposit_kasir" id="kodekasdeposit_kasir" class="form-control form-control-xs" required>
                                  </select>
                                </td>
                              </tr> -->

                              <tr>
                                <td width="70">Jenis</td>
                                <td>:</td>
                                <td>
                                  <select name="id_jenis_pembayaran_deposit" id="id_jenis_pembayaran_deposit" onchange="pembayaran(event);" class="form-control form-control-xs">
                                  </select>
                                </td>
                              </tr>
                              <tr>
                                <td>Pembayaran</td>
                                <td>:</td>
                                <td> <select id="id_pembayaran_deposit" name="id_pembayaran_deposit" class="form-control form-control-xs">

                                  </select>
                                </td>
                              </tr>
                              <tr>
                                <td width="70">Kas</td>
                                <td>:</td>
                                <td>
                                  <select name="kodekasbayar_kasir_deposit" id="kodekasbayar_kasir_deposit" class="form-control form-control-xs" required>
                                  </select>
                                </td>
                              </tr>

                            </tbody>
                          </table>
                        </div>
                      </div>

                      <div class="col-md-6 col-sm-6 col-12 p-1">
                        <div class="info-box mb-0">
                          <table class="table table-striped table-sm" id='sisadeposit' cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                              <tr>
                                <td width="70">Sisa Deposit</td>
                                <td>:</td>
                                <td>
                                  <input type="text" class="form-control form-control-xs" id="nominaldepositterakhir_v" name="nominaldepositterakhir_v" readonly>
                                  <input type="hidden" class="form-control form-control-xs" id="nominaldepositterakhir" name="nominaldepositterakhir" readonly>

                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>

                      <div class="col-md-6 col-sm-6 col-12 p-1">
                        <div class="info-box mb-0">
                          <div class="row float-right">

                            <div class="form-group col-6">
                              <label for="input">Tambah Nominal Deposit</label>
                              <input type="text" class="form-control" placeholder="Nominal bayar ..." id="jumlahbayardeposit" name="jumlahbayardeposit" autocomplete="off">
                            </div>

                            <div class="col-6" style="padding-top:23px;">
                              <button type="button" class="btn bg-gradient-info btn-sm SimpanDeposit"><i class="fa fa-cash-register"></i> Simpan Deposit</button>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>

                    <div>

                      <!-- <div class="card-body">
                        <div class="row float-right">

                          <div class="form-group col-6">
                            <label for="input">Nominal Deposit</label>
                            <input type="text" class="form-control" placeholder="Nominal bayar ..." id="jumlahbayardeposit" name="jumlahbayardeposit" autocomplete="off">
                          </div>

                          <div class="col-6" style="padding-top:23px;">
                            <button type="button" class="btn bg-gradient-info btn-sm SimpanDeposit"><i class="fa fa-cash-register"></i> Simpan Deposit</button>
                          </div>
                        </div>
                      </div> -->
                      <hr>
                      <div class="col-md-12" id="div_tablehistory_modal_kasir_pelunasan" style="margin-top: 0px;max-height: 10rem; overflow: auto">
                        <table id="tablehistory_modal_kasir_pelunasan" class="table table-striped table-sm" style="border-collapse: inherit;">
                          <thead>
                            <tr>
                              <th width="100">Tgl. Deposit</th>
                              <th width="100">Jumlah</th>
                              <th width="100">Shift</th>
                              <th width="100">Petugas</th>
                              <th width="100">Kas</th>
                              <th width="250">Aksi</th>
                            </tr>
                          </thead>

                          <tbody id="list_tablehistory_modal_kasir_deposit" ;>

                          </tbody>

                          <tbody id="list_tablehistory_modal_kasir_deposit_bayar" ;>

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
    $('#loading_deposit_mod_bayar').hide();
    tampil_jenisbayar_deposit();
    tampilkan_history_deposit();
    refresh_deposit();
    sisadepositpasien();
    // Deposit_tampil_kas_teller_bayar();
    $('#jumlahbayardeposit').val(0);
    // pembayaran();



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

    var normpasien = <?php echo $normdeposit ?>;
    // alert(normpasien);

  })

  function Deposit_tampil_kas_teller_bayar() {
    apiPOST('Kasirgeneral/selecttellerkas', null, hasil => {
      var idjen = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        idjen += '<option value="' + a[i]['id_ac'] + '">' + a[i]['kas_nama'] + '</option>';
      }
      document.getElementById('kodekasdeposit_kasir').innerHTML = idjen;


    });
  }

  function refresh_deposit() {
    var today = new Date();
    //alert(today);
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    tglbayar_deposit = dd + '/' + mm + '/' + yyyy; // in   "mm/dd/yyyy" format
    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    document.getElementById('tglbayar_deposit').value = tglbayar_deposit;
    document.getElementById('jambayar_deposit').value = time;
    sisadepositpasien();
  };

  function tampilkan_history_deposit() {
    var normd = "<?php echo $rowdeposit['no_rm'] ?>";

    // alert(normd);
    // exit();
    var listParam = [
      'no_rm'
    ];
    var param = {
      no_rm: normd
    };
    apiPOST("Kasirgeneral/tampilhisdeposit", param, hasil => {
      if (hasil['data'] !== null) {
        //alert('tes');
        if (hasil['code'] == 'XX') {
          toastr.error('Data Tidak ditemukan');
        }
        var no = $('#tablehistory_modal_kasir_pelunasan tbody tr').length + 1;
        var Barisbayar = '<tr id="trbayarpelunasan' + no + '">';
        var a = hasil['data'];
        for (var i = 0; i < a.length; i++) {
          var tgl = a[i].tgl_deposit.substr(8, 2);
          var bln = a[i].tgl_deposit.substr(5, 2);
          var thn = a[i].tgl_deposit.substr(0, 4);
          tgldeposit = tgl + '/' + bln + '/' + thn;
          Barisbayar += '<td>' + tgldeposit + '</td>';
          Barisbayar += '<td>' + format_ribuan(a[i].kredit) + '</td>';
          Barisbayar += '<td>' + a[i].shift + '</td>';
          Barisbayar += '<td>' + a[i].nama + '</td>';
          Barisbayar += '<td>' + a[i].kas_nama + '</td>';
          Barisbayar += '<td><button type="button" class="btn bg-gradient-danger btn-xs hapusdeposit" data-id="' + a[i].no_rm + '"  data-id1="' + a[i].kredit + '" data-id2="' + a[i].id_kas + '" data-id3="' + a[i].id_acc + '" data-id4="' + a[i].namapasien + '"><i class="fa fa-trash-alt"></i>Hapus</button> | <button type="button" class="btn bg-gradient-success btn-xs cetakkwitansi" data-id="" data-id1="RM/' + a[i].no_rm + '" data-id2="' + a[i].kredit + '" ><i class="fa fa-print"></i>Kwitansi</button></td>';
          // Barisbayar += '<td><button type="button" class="btn bg-gradient-success btn-xs cetakkwitansi" data-id="" data-id1="RM/' + a[i].no_rm + '" data-id2="' + a[i].kredit + '" ><i class="fa fa-print"></i>Kwitansi</button></td>';
          Barisbayar += "</tr>";
          no++;
        }
        // $('#tablehistory_modal_kasir_pelunasan tbody').append(Barisbayar);
        document.getElementById("list_tablehistory_modal_kasir_deposit").innerHTML = Barisbayar;

      }
    }, listParam);
  }

  // $("#jumlahbayardeposit").on("keyup", function() {
  //   var bayar = setInt(this.value);
  //   //var val_bayar = bayar.replace(/\D/g, '');

  //   var harusdibayar = setInt($("#kasirtotalharusdibayar").val());
  //   var balance = setInt($("#kasirbalance").val());
  //   var val_balance = harusdibayar - bayar;
  //   if (val_balance < 0) {
  //     val_balance = 0;
  //     alert('kelebihan bayar');
  //     $("#jumlahbayardeposit").val(0);
  //   }
  //   document.getElementById('kasirbalance').value = format_ribuan(val_balance);
  // });

  $(".SimpanDeposit").click(function() {
    //$('#loading_deposit_mod_bayar').show();
    var val_norm = "<?php echo $rowdeposit['no_rm'] ?>";
    var val_id_pembayaran = $("#id_pembayaran_deposit").val();
    var val_jumlahbayarkasir = $("#jumlahbayardeposit").val();
    var val_tglbayar = $("#tglbayar_deposit").val();
    var val_jambayar = $("#jambayar_deposit").val();
    var user = JSON.parse(localStorage['data_user']);
    var id_user = user['id_user'];
    var idtransaksi =  $("#idtransaksi").val();
    var val_idkas =  $("#kodekasbayar_kasir_deposit").val();
    if (val_jumlahbayarkasir <= '0') {
      $('#loading_deposit_mod_bayar').hide();
      toastr.error('Masukan Nominal pembayaran');
      return;
    }

    //console.log('id_pemabayaran:'+val_id_pembayaran+', id_transaksi :'+val_idtransaksi+'jumlahbayar:'+val_jumlahbayarkasir)
    var listParam = [
      'val_norm'
    ]; 
    var param = {
      val_norm: val_norm,
      val_id_pembayaran: val_id_pembayaran,
      val_jumlahbayarkasir: val_jumlahbayarkasir,
      val_tglbayar: val_tglbayar,
      val_jambayar: val_jambayar,
      id_user: id_user,
      val_id_transaksi : idtransaksi,
      val_id_kas : val_idkas

    };
    // $('#loading_deposit_mod_bayar').hide();

    apiPOST("Kasirgeneral/tambahdeposit", param, hasil => {
      // $('#modal_DepositPasien').modal('hide');

      if (hasil['data'] !== null) {
        //alert('tes');
        if (hasil['code'] == 'XX') {
          toastr.error('Data Gagal ditambahkan');
        } else {
          tampilkan_history_deposit();
          refresh_deposit();
          tambahbayar();
          //$('#modal_DepositPasien').modal('hide');

        }

      }
      $('#loading_deposit_mod_bayar').hide();

    }, listParam);
    // $('#loading_deposit_mod_bayar').hide();

  });

  $(document).on("click", ".hapusdeposit", function() {

    var user = JSON.parse(localStorage['data_user']);
    var id_user = user['id_user'];
    var val_norm = $(this).attr("data-id");
    var val_nominalhapus = $(this).attr("data-id1");
    var tglbayar_deposit = $('#tglbayar_deposit').val();
    var jambayar_deposit = $('#jambayar_deposit').val();
    var jumdepositsaatini = $("#nominaldepositterakhir").val();
    var val_id_kas = $(this).attr("data-id2");
    var val_id_acc = $(this).attr("data-id3");
    var val_namapasien = $(this).attr("data-id4");

    if (setInt(jumdepositsaatini) < setInt(val_nominalhapus)) {
      toastr.error('Deposit sudah digunakan');
      return;
      exit();
    }
    else{
    
    pertanyaan.fire({
      title: 'Hapus Data Deposit',
      html: '<span>Benarkah ' + val_nominalhapus + ', di Hapus ???<br></span>',
      icon: 'question',
      showCancelButton: true,
      reverseButtons: false,
      allowOutsideClick: false
    }).then((result) => {
      if (result.isConfirmed) {
        var param = {
          val_nominalhapus: val_nominalhapus,
          val_norm: val_norm,
          id_user: id_user,
          val_tglbayar : tglbayar_deposit,
          val_jambayar : jambayar_deposit,
          val_id_kas : val_id_kas,
          val_id_acc : val_id_acc,
          namapasien : val_namapasien

        };
        apiPOST('Kasirgeneral/hapusdepositperbaikan', param, hasil => {
          tampilkan_history_deposit();
          refresh_deposit();
          document.getElementById('jumlahbayardeposit').value = 0;
        });
      } else if (result.dismiss === Swal.DismissReason.cancel) {

      }
    })
  }
  });


  function tampil_jenisbayar_deposit() {
    apiPOST('Kasirgeneral/jenisbayardeposit', null, hasil => {
      var idjen = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        idjen += '<option value="' + a[i]['id_jenis_pembayaran'] + '">' + a[i]['deskripsi'] + '</option>';
      }
      document.getElementById('id_jenis_pembayaran_deposit').innerHTML = idjen;
      pembayaran();

    });
  }


  function pembayaran() {
    var user = JSON.parse(localStorage['data_user']);
    var id_user = user['id_user'];

    var param = {
      id: $("#id_jenis_pembayaran_deposit").val(),
      id_user: id_user
    };
    apiPOST('Kasirgeneral/pembayaran', param, hasil => {
      // var kab = '<option value="">*Pilih</option>';
      var kab = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        kab += '<option value="' + a[i]['id_pembayaran'] + '">' + a[i]['deskripsi_pembayaran'] + '</option>';
      }
      document.getElementById('id_pembayaran_deposit').innerHTML = kab;
      lihatkas_deposit();
    });
  }

  function lihatkas_deposit() {
    var id_jenis_pembayaran = $("#id_jenis_pembayaran_deposit").val();

    // alert(id_jenis_pembayaran);
    // exit();
    var user = JSON.parse(localStorage['data_user']);
    var id_user = user['id_user'];
    var param = {
      id: id_jenis_pembayaran,
      id_user: id_user
    };
    apiPOST('Kasirgeneral/selecttellerkasdeposit', param, hasil => {
      // var kab = '<option value="">*Pilih</option>';
      var kas = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        kas += '<option value="' + a[i]['id_kas'] + '">' + a[i]['kas_nama'] + '</option>';
      }
      document.getElementById('kodekasbayar_kasir_deposit').innerHTML = kas;
    });
  }

  function sisadepositpasien() {
    var val_norm = "<?php echo $rowdeposit['no_rm'] ?>";
    var param = {
      val_norm: val_norm
    };
    apiPOST('Kasirgeneral/totalsisadepositpasien', param, hasil => {
      var a = hasil['data'];
      var Baris = a;
      document.getElementById('nominaldepositterakhir_v').value = format_ribuan(Baris);
      document.getElementById('nominaldepositterakhir').value = (Baris);

    });

  }



  $('#loading_modal_hide').hide();

  $('#loading_kasir_mod_kanan').hide();

  $("#modal_DepositPasien").modal({
    backdrop: "static"
  });
  $('#modal_DepositPasien').on('shown.bs.modal', function() {

  })

  function keluarmodal_kasir() {
    $('#modal_kasir').modal('hide');
    $('.modal-backdrop').hide();
  }
</script>