<?php
foreach ($data as $row)
  //var_dump($data);
  //echo "" . $row['id_transaksi'] . "";
  $tgltransaksi = date_create(substr($row['tgl_transaksi'], 0, 10));
$jamtransaksi = substr($row['tgl_transaksi'], 10, 16);

?>
<div class="content modal fade" id="modal_Bayarkasir" style="margin-left: 180px;">
  <div class="container-fluid ">
    <div class="row" style="margin-top:-40px">
      <!-- content kanan -->
      <div class="col-md-8" style="margin-top: 20px;margin-bottom: 0px;">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-body">
              <div class="overlay-wrapper" id="loading_kasir_mod_bayar">
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
                      <u>Pembayaran</u>
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
                        <div class="info-box mb-0">
                          <table class="table table-striped table-sm" id='sisadeposit_bayar' cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                              <tr>
                                <td width="70">Jumlah Deposit</td>
                                <td>:</td>
                                <td>
                                  <input type="text" class="form-control form-control-xs" id="nominaldepositterakhirBayar_v" name="nominaldepositterakhirBayar_v" readonly>
                                  <input type="text" class="form-control form-control-xs" id="nominaldepositterakhirBayar" name="nominaldepositterakhirBayar" readonly>

                                </td>
                              </tr>
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
                            <tbody id="list_tablesjppenjamin"></tbody>
                          </table>
                        </div>
                        <div class="info-box mb-0">

                          <table class="table table-striped table-sm" id='pembayaranvalue' cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                              <tr>
                                <td width="70">Tgl Bayar</td>
                                <td>:</td>
                                <td>
                                  <input type="text" class="form-control form-control-xs " data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric" id="tglbayar" name="tglbayar" value='' readonly>
                                  <input type="hidden" class="form-control form-control-xs " id="jambayar" value='' name="jambayar" readonly>
                                </td>
                              </tr>

                              <tr>
                                <td width="70">Jenis</td>
                                <td>:</td>
                                <td>
                                  <select name="id_jenis_pembayaran" id="id_jenis_pembayaran" onchange="pembayaran(event);" class="form-control form-control-xs">
                                  </select>
                                </td>
                              </tr>
                              <tr>
                                <td>Pembayaran</td>
                                <td>:</td>
                                <td> <select id="id_pembayaran" name="id_pembayaran" onchange="apakahkartu(event);" class="form-control form-control-xs">

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
                                  <select name="kodekasbayar_kasir" id="kodekasbayar_kasir" onchange="ceknominaldeposit(event);" class="form-control form-control-xs" required>
                                  </select>
                                </td>
                              </tr>
                              <tr>
                                <td width="70"></td>
                                <td>:</td>
                                <td>
                                <div id='nominalaperkasdepositpasien' style="display: none;"><input type="text" class="form-control form-control-xs " id="deposit_peridkas" name="deposit_peridkas" value='' readonly>
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
                      <!-- <div class="card card-info">
                        <div class="card-header"> -->
                      <!-- <h3 class="card-title">Pembayaran</h3>
                        </div> -->
                      <div class="card-body">
                        <div class="row">
                          <!-- <div class="col-1">
                            <labe><strong>Bayar</strong></label>
                          </div> -->
                          <div class="form-group col-3">
                            <label for="input">Total Transaksi</label>
                            <input type="text" class="form-control" placeholder="total transaksi ..." id="kasirtotaltransaksi" name="kasirtotaltransaksi" readonly>
                          </div>
                          <div class="form-group col-3">
                            <label for="input">Belum Terbayar</label>
                            <input type="text" class="form-control" placeholder="total nominal ..." id="kasirtotalharusdibayar" name="kasirtotalharusdibayar" readonly>
                          </div>
                          <div class="form-group col-3">
                            <label for="input">Balance</label>
                            <input type="text" class="form-control" placeholder="balance ..." id="kasirbalance" name="kasirbalance" readonly>
                          </div>

                          <div class="form-group col-3">
                            <label for="input">Nominal Bayar</label>
                            <input type="text" class="form-control" placeholder="Nominal bayar ..." id="jumlahbayarkasir" name="jumlahbayarkasir" onkeypress="return hanyaAngka(event)"/ autocomplete="off">
                          </div>

                         

                          <!-- </div>
                        </div> -->
                        </div>
                        <div class="row"> 
                          <div class="col-12 " style="padding-top: 10px;">
                            <button type="button" class="btn bg-gradient-info btn-sm float-right BayarKasir"><i class="fa fa-cash-register"></i> Bayar</button>
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
</div>

<!-- //menu kiri -->


<script type="text/javascript">
  $(document).ready(function() {
    $('#loading_kasir_mod_bayar').hide();
    ceknominal();

    // tampil_kas_teller_bayar();
    $('#jumlahbayarkasir').val(0);
    // pembayaran();
    
    var today = new Date();
    //alert(today);
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    tglbayar = dd + '/' + mm + '/' + yyyy; // in   "mm/dd/yyyy" format
    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    document.getElementById('tglbayar').value = tglbayar;
    document.getElementById('jambayar').value = time;

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

  })

  function ceknominal(){
    var param = {
      id_transaksi: $("#idtransaksi").val(),
    };
    apiPOST('Kasirgeneral/ceknominalkoma', param, hasil => {
      var adakah = hasil['data'];
      if (adakah > 0) {
        $('#modal_Bayarkasir').modal('hide');
        toastr.error('Terdapat nominal desimal, silahkan cek detail transaksi');
      } else {
        tampil_jenisbayar();
        tampil_sjp();
        totalyangharusdibayar();
        sisadepositpasienBayar();
      }
    });
  }

  $("#jumlahbayarkasir").on("keyup", function() {
    var val_jumlahbayarkasir = $("#jumlahbayarkasir").val();
    var val_id_pembayaran = $("#id_pembayaran").val();
    if (val_id_pembayaran == '6' || val_id_pembayaran == 6) {
      var val_depositpasien = $("#deposit_peridkas").val();
      if (setInt(val_jumlahbayarkasir) > setInt(val_depositpasien)) {
        $('#loading_kasir_mod_bayar').hide();
        toastr.error('Tidak Boleh Melebihi Sisa Deposit Pasien'+val_jumlahbayarkasir+'>'+val_depositpasien);
        $("#jumlahbayarkasir").val(val_depositpasien);
        // exit();
        // document.getElementById('kasirbalance').value = format_ribuan(val_balance);
        // return;
      }
    }

    var bayar = setInt(this.value);
    //var val_bayar = bayar.replace(/\D/g, '');

    var harusdibayar = setInt($("#kasirtotalharusdibayar").val());
    var balance = setInt($("#kasirbalance").val());
    var val_balance = harusdibayar - bayar;
    if (val_balance < 0) {
      val_balance = 0;
      toastr.error('Kelebihan Bayar');
      $("#jumlahbayarkasir").val(harusdibayar);
      // return;
    }
    document.getElementById('kasirbalance').value = format_ribuan(val_balance);
    // document.getElementById('kasirbalance').value = (val_balance);
  });

  $(".BayarKasir").click(function() {
    $('#loading_kasir_mod_bayar').show();
    var val_id_pembayaran = $("#id_pembayaran").val();
    var val_idtransaksi = $("#idtransaksi").val();
    var _jumlahbayarkasir = $("#jumlahbayarkasir").val();
    var val_tglbayar = $("#tglbayar").val();
    var val_jambayar = $("#jambayar").val();
    var user = JSON.parse(localStorage['data_user']);
    var id_user = user['id_user'];
    var id_kas = $("#kodekasbayar_kasir").val();
    var val_nominal_deposit = $("#nominaldepositterakhirBayar").val();

    var val_jumlahbayarkasir = _jumlahbayarkasir.replace(".", "");

    if (val_id_pembayaran == '6' || val_id_pembayaran == 6) {
      var val_depositpasien = $("#deposit_peridkas").val();
      if (setInt(val_jumlahbayarkasir) > setInt(val_depositpasien)) {
        $('#loading_kasir_mod_bayar').hide();
        toastr.error('Tidak Boleh Melebihi Sisa Deposit Pasien');
        exit();
      }
    }

     if ($("#jumlahbayarkasir").val() == '0') {
      $('#loading_kasir_mod_bayar').hide();
      toastr.error('Nominal harus lebih dari 0');
      exit();
    }

    // if ($("#jumlahbayarkasir").val() > $("#kasirtotalharusdibayar").val() ) {
    //   $('#loading_kasir_mod_bayar').hide();
    //   toastr.error('Nominal tidak boleh lebih besar dari tagihan');
    //   exit();
    // }

    //nonalktif tgl 22/02/2024 karena retur
    // if ($("#kasirtotalharusdibayar").val() <= '0') {
    //   $('#loading_kasir_mod_bayar').hide();
    //   toastr.error('Pembayaran Sudah Balance');
    //   exit();
    // }

    // if (val_jumlahbayarkasir <= '0') {
    //   $('#loading_kasir_mod_bayar').hide();
    //   toastr.error('Masukan Nominal pembayaran');
    //   return;
    // }
    //nonalktif tgl 22/02/2024 karena retur

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
      id_kas:id_kas,
      val_nominal_deposit : val_nominal_deposit
    };
    // $('#loading_kasir_mod_bayar').hide();

    apiPOST("Kasirgeneral/paidtransaksi", param, hasil => {
      // $('#modal_Bayarkasir').modal('hide');

      if (hasil['data'] !== null) {
        //alert('tes');
        if (hasil['code'] == 'XX') {
          toastr.error('Data Gagal ditambahkan');
        } else {
          tambahbayar();
          $('#modal_Bayarkasir').modal('hide');

        }

      }
      $('#loading_kasir_mod_bayar').hide();

    }, listParam);
    // $('#loading_kasir_mod_bayar').hide();

  });

  function sisadepositpasienBayar() {
    var val_norm = "<?php echo $row['no_rm'] ?>";
    // alert(val_norm);
    var param = {
      val_norm: val_norm
    };
    apiPOST('Kasirgeneral/totalsisadepositpasien', param, hasil => {
      var a = hasil['data'];
      var Baris = a;
      document.getElementById('nominaldepositterakhirBayar_v').value = format_ribuan(Baris);
      document.getElementById('nominaldepositterakhirBayar').value = (Baris);
    });
  };


  function tampil_jenisbayar_deposit_bayar() {
    apiPOST('Kasirgeneral/jenisbayardeposit', null, hasil => {
      var idjen = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        idjen += '<option value="' + a[i]['id_jenis_pembayaran'] + '">' + a[i]['deskripsi'] + '</option>';
      }
      document.getElementById('id_jenis_pembayaran').innerHTML = idjen;


    });
  }

  // function tampil_kas_teller_bayar() {
  //   var user = JSON.parse(localStorage['data_user']);
  //   var id_user = user['id_user'];
  //   var param = {
  //     id_user: id_user,
  //   };
  //   apiPOST('Kasirgeneral/selecttellerkas', param, hasil => {
  //     var idjen = '';
  //     var a = hasil['data'];
  //     for (var i = 0; i < a.length; i++) {
  //       idjen += '<option value="' + a[i]['id_ac'] + '">' + a[i]['kas_nama'] + '</option>';
  //     }
  //     document.getElementById('kodekasbayar_kasir').innerHTML = idjen;


  //   });
  // }

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
        document.getElementById("list_tablesjppenjamin").innerHTML = Baris;
        kasirgeneralrefresh();
      }

    }, listParam);
    $('#loading_kasir_mod').hide();
    $('#loading_kasir').hide();

  }

  function tampil_jenisbayar() {
    apiPOST('Kasirgeneral/jenisbayar', null, hasil => {
      var idjen = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        idjen += '<option value="' + a[i]['id_jenis_pembayaran'] + '">' + a[i]['deskripsi'] + '</option>';
      }
      document.getElementById('id_jenis_pembayaran').innerHTML = idjen;
      pembayaran();


    });
  }



  // $(".datepicker").datepicker({
  //   dateFormat: 'dd-mm-yy'
  // });

  function pembayaran() {
    $("#kartunomor").hide();
    var user = JSON.parse(localStorage['data_user']);
    var id_user = user['id_user'];
    var param = {
      id: $("#id_jenis_pembayaran").val(),
      id_user: id_user
    };
    apiPOST('Kasirgeneral/pembayaran', param, hasil => {
      // var kab = '<option value="">*Pilih</option>';
      var kab = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        kab += '<option value="' + a[i]['id_pembayaran'] + '">' + a[i]['deskripsi_pembayaran'] + '</option>';
      }
      document.getElementById('id_pembayaran').innerHTML = kab;
      lihatkas();
    });

  }

  function lihatkas() {
    var id_jenis_pembayaran = $("#id_jenis_pembayaran").val();
    var norm = "<?php echo $row['no_rm'] ?>";

    // alert(id_jenis_pembayaran);
    // exit();
    var user = JSON.parse(localStorage['data_user']);
    var id_user = user['id_user'];
    var param = {
      id: id_jenis_pembayaran,
      id_user: id_user,
      norm:norm
    };
    apiPOST('Kasirgeneral/selecttellerkas', param, hasil => {
      // var kab = '<option value="">*Pilih</option>';
      var kas = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        kas += '<option value="' + a[i]['id_kas'] + '">' + a[i]['kas_nama'] + '</option>';
      }
      document.getElementById('kodekasbayar_kasir').innerHTML = kas;
      // ceknominaldeposit();
      if($("#id_pembayaran").val() == '6'){
      var id_kasDepositPasien = $("#kodekasbayar_kasir").val();
      var param = {
      id: id_jenis_pembayaran,
      id_user: id_user,
      norm:norm,
      id_kas : id_kasDepositPasien
      };
      apiPOST('Kasirgeneral/selectnomialkasperidKas', param, hasil => {
      // var kab = '<option value="">*Pilih</option>';
      var nominalidkas = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        document.getElementById('deposit_peridkas').value =  a[i]['sisadepositperidkas'];
        document.getElementById('jumlahbayarkasir').value =  0;

      }
      ceknominaldeposit();
    });
      document.getElementById('nominalaperkasdepositpasien').style.display = 'block';
    }
    else{
      document.getElementById('nominalaperkasdepositpasien').style.display = 'none';

    }
    });

  }

  function ceknominaldeposit(){
    var norm = "<?php echo $row['no_rm'] ?>";
    if($("#id_pembayaran").val() == '6'){
      var id_kasDepositPasien = $("#kodekasbayar_kasir").val();
      var param = {
      id: id_jenis_pembayaran,
      id_user: id_user,
      norm:norm,
      id_kas : id_kasDepositPasien
      };
      apiPOST('Kasirgeneral/selectnomialkasperidKas', param, hasil => {
      // var kab = '<option value="">*Pilih</option>';
      var nominalidkas = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        document.getElementById('deposit_peridkas').value =  a[i]['sisadepositperidkas'];
        document.getElementById('jumlahbayarkasir').value =  0;


      }
    });
      document.getElementById('nominalaperkasdepositpasien').style.display = 'block';
    }
    else{
      document.getElementById('nominalaperkasdepositpasien').style.display = 'none';

    }
  }

  function apakahkartu() {
    // alert('hai');

    var param = {
      id: $("#id_pembayaran").val(),
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

  function totalyangharusdibayar() {

    var param = {
      id_transaksi: $("#idtransaksi").val(),
      norm: $("#norm").val(),
    };
    apiPOST('Kasirgeneral/totalyangharusdibayar', param, hasil => {
      var a = hasil['data'];
      var Baris = a;
      if(Baris < 0){
        var totalharusdiabayardikasir = document.getElementById('jumlahbayarkasir').value = format_ribuan(Baris);
      }
      var totalharusdiabayardikasir = document.getElementById('kasirtotalharusdibayar').value = format_ribuan(Baris);
      var totalharusdiabayardikasir = document.getElementById('kasirtotaltransaksi').value = format_ribuan(hasil['totaltransaksi']);

      //var nominaldepositterakhirBayar = document.getElementById('nominaldepositterakhirBayar').value
      // var totalharusdiabayardikasir = document.getElementById('kasirtotalharusdibayar').value = (Baris);
      var jumlah = Baris;
      // alert(+totalharusdiabayardikasir+'-'+nominaldepositterakhirBayar);
      document.getElementById('kasirbalance').value = format_ribuan(jumlah);
      // document.getElementById('kasirbalance').value = (Baris);
      if (totalharusdiabayardikasir) {
        $('#loading_kasir_mod_bayar').hide();
      }
    });
  }


  $('#loading_modal_hide').hide();

  $('#loading_kasir_mod_kanan').hide();

  $("#modal_Bayarkasir").modal({
    backdrop: "static"
  });
  $('#modal_Bayarkasir').on('shown.bs.modal', function() {

  })

  function keluarmodal_kasir() {
    $('#modal_kasir').modal('hide');
    $('.modal-backdrop').hide();
  }
</script>