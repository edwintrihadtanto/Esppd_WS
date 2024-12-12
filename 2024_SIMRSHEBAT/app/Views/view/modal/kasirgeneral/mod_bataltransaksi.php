<?php
foreach ($data as $row)
$tgltransaksi = date_create(substr($row['tgl_transaksi'], 0, 10));
$jamtransaksi = substr($row['tgl_transaksi'], 10, 16);

?>
<div class="content modal fade" id="mod_bataltransaksi" style="margin-left: 180px;">
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
                      <u>Halaman Batal Transaksi</u>
                    </span>
                    <div class="row">

                      <div class="col-md-6 col-sm-6 col-6 p-1">
                        <div class="info-box mb-0">
                          <table class="table table-striped table-sm" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                              <tr>
                                <td width="70">No. Transaksi.</td>
                                <td>:</td>
                                <td><input type="text" class="form-control form-control-xs " value="<?php echo $row['id_transaksi'] ?>"  id="idtransaksi" readonly=""></td>
                              </tr>
                              <tr>
                                <td>Tgl. Kunj.</td>
                                <td>:</td>
                                <td><input type="text" class="form-control form-control-xs " id="tglkunjung" value="<?php echo date_format($tgltransaksi, "d/m/Y");  ?>" readonly=""></td>
                              </tr>
                              <tr>
                                <td>No. Rm</td>
                                <td>:</td>
                                <td><input type="text" class="form-control form-control-xs" id="norm" value="<?php echo $row['no_rm'] ?>" readonly=""></td>
                              </tr>
                              <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td><input type="text" class="form-control form-control-xs" id="namapas" value="<?php echo $row['nama'] ?>" readonly=""></td>
                              </tr>
                              <!-- <tr>
                                <td>SJP</td>
                                <td>:</td>
                                <td><input type="text" class="form-control form-control-xs" id="nosjp" value="983479847389639" readonly=""></td>
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
                                <td width="70">Alasan Batal Transaksi</td>
                                <td>:</td>
                                <td>
                                  <input type="text" class="form-control form-control-xs" id="alasanbataltransaksi" name="alasanbataltransaksi">
                                </td>
                              </tr>
                              
                              <tr>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                  <button type="button" class="btn bg-gradient-info btn-xs BtnbatalTransaksi float-right"><i class="fa fa-close"></i> Batal Transaksi</button>
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
    $('#loading_kasir_mod_kanan').hide();

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

  $("#mod_bataltransaksi").modal({
    backdrop: "static"
  });
  $('#mod_bataltransaksi').on('shown.bs.modal', function() {

  })

  $(".BtnbatalTransaksi").click(function() {
    //tambahbayar();
    var id_transaksi = <?php echo $row['id_transaksi'] ?>;
    var user = JSON.parse(localStorage['data_user']);
    var id_user = user['id_user'];
    var alasan = $("#alasanbataltransaksi").val();
    pertanyaan.fire({
      title: 'Proses Batal Transaksi',
      html: '<span>Transaksi Nomor ' + id_transaksi + ', Apakah Yakin di Batal Transaksi ?</span>',
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
          val_alasan : alasan

        };
        apiPOST('Kasirgeneral/Batal_transaksi', param, hasil => {
          // mod_RWJPenatajasa_getlistproduk();
          //$("body").find("#" + id).remove();
          if (hasil['status'] == 'sukses') {
          // remove_disdiv();
          $('#mod_bataltransaksi').modal('hide');
          $('#modal_kasir').modal('hide');
           $('.modal-backdrop').hide();
           caripasien();


          }
        });
      } else if (result.dismiss === Swal.DismissReason.cancel) {

      }
    })

  });

  function keluarmodal_kasir() {
    $('#modal_kasir').modal('hide');
    $('.modal-backdrop').hide();
  }
</script>