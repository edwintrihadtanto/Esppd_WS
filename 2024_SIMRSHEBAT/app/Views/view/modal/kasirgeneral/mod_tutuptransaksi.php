<?php
foreach ($data as $row)
  //var_dump($data);
  //echo "" . $row['id_transaksi'] . "";
  $tgltransaksi = date_create(substr($row['tgl_transaksi'], 0, 10));
$jamtransaksi = substr($row['tgl_transaksi'], 10, 16);
?>
<div class="content modal fade" id="mod_tutuptransaksi" style="margin-left: 180px;">
  <div class="container-fluid ">
    <div class="row" style="margin-top:-40px">
      <!-- content kanan -->
      <div class="col-md-8" style="margin-top: 20px;margin-bottom: 0px;">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12" style="margin-top: 0px;margin-bottom: 0px;">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>

                  <div class="card card-outline card-danger col-md-12">
                    <span class="badge badge-secondary float-right" style="font-size: 15px;">
                      Halaman Tutup Transaksi
                    </span>
                    <div class="row">

                      <div class="col-md-6 col-sm-6 col-6 p-1">
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

                      <div class="col-md-6 col-sm-6 col-6 p-1">
                        <div class="info-box mb-0">
                          <table class="table table-striped table-sm" id="pembayaranvalue" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                              <tr>
                                <td width="70">Tgl. Tutup Transaksi</td>
                                <td>:</td>
                                <td>
                                  <input type="text" class="form-control form-control-xs" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric" id="tgltutuptransaksi" name="tgltutuptransaksi" value="" placeholder="dd/mm/yyyy" readonly>
                                  <input type="text" class="form-control form-control-xs" id="jamtutuptransaksi" name="jamtutuptransaksi" value="" readonly>
                                </td>
                              </tr>
                              <!-- <tr>
                                <td width="70">Shift</td>
                                <td>:</td>
                                <td>
                                  <select name="id_shift" id="id_shift" class="form-control form-control-xs">
                                    <option value="">Pilih Shift</option>
                                    <option value="1">Shift 1</option>
                                    <option value="2">Shift 2</option>
                                    <option value="3">Shift 3</option>
                                    <option value="4">Shift 4</option>

                                  </select>
                                </td>
                              </tr> -->
                              <tr>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                  <button type="button" class="btn bg-gradient-info btn-xs BtnTutupTransaksi float-right" id="BtnTutupTransaksi"><i class="fa fa-close"></i> Tutup Transaksi</button>
                                </td>
                              </tr>


                            </tbody>
                          </table>
                        </div>
                      </div>

                    </div>

                    <div>

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

    function cek_posting() {
      var listParam = [
        'val_id_transaksi'
      ];
      var id_transaksi = <?php echo $row['id_transaksi'] ?>;
      var param = {
        val_id_transaksi: id_transaksi,
      };
      apiPOST("Kasirgeneral/cekpostingtransaksiKasir", param, hasil => {
        // alert(hasil['status']); 
        if (hasil['code'] == 'XX') {
          $('#BtnTutupTransaksi').attr('disabled', true);

        }
        else{

        }
      }, listParam);
    };


    cek_posting();

    $('#loading_kasir_mod_kanan').hide();
    var today = new Date();
    //alert(today);
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    tglbayar = dd + '/' + mm + '/' + yyyy; // in   "mm/dd/yyyy" format
    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    document.getElementById('tgltutuptransaksi').value = tglbayar;
    document.getElementById('jamtutuptransaksi').value = time;


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


  $('#loading_modal_kasir').hide();

  $("#mod_tutuptransaksi").modal({
    backdrop: "static"
  });
  $('#mod_tutuptransaksi').on('shown.bs.modal', function() {

  })
  // $(".BtnTutupTransaksi").click(function() {
  //   //tambahbayar();
  //   $('#mod_tutuptransaksi').modal('hide');
  // });
  $(".BtnTutupTransaksi").click(function() {
    //tambahbayar();
    //$('#mod_bukatransaksi').modal('hide');
    var id_transaksi = <?php echo $row['id_transaksi'] ?>;
    var user = JSON.parse(localStorage['data_user']);
    var id_user = user['id_user'];
    var tgl = $("#tgltutuptransaksi").val();
    var jam = $("#jamtutuptransaksi").val();
    pertanyaan.fire({
      title: 'Proses Tutup Transaksi',
      html: '<span>Transaksi Nomor ' + id_transaksi + ', Apakah Yakin di Tutup ?</span>',
      icon: 'question',
      showCancelButton: true,
      reverseButtons: false,
      allowOutsideClick: false
    }).then((result) => {
      if (result.isConfirmed) {
        //$('#tabletindakan_modal_kasir tbody').html('');
        var param = {
          val_id_transaksi: id_transaksi,
          val_id_user: id_user,
          val_tgl: tgl,
          val_jam: jam
        };
        apiPOST('Kasirgeneral/Tutup_transaksi', param, hasil => {
          if (hasil['status'] == 'sukses') {
          add_disdiv();
          caripasien();
          }
          // mod_RWJPenatajasa_getlistproduk();
          // $("body").find("#" + id).remove();
        });
      } else if (result.dismiss === Swal.DismissReason.cancel) {

      }
    })
    $('#mod_tutuptransaksi').modal('hide');
  });

  function keluarmodal_kasir() {
    $('#modal_kasir').modal('hide');
    $('.modal-backdrop').hide();
  }
</script>