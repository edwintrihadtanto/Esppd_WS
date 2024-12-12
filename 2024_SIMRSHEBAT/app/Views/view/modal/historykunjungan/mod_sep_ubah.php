<?php
foreach ($data as $row)
  // var_dump($data);
  // echo "" . $row['id_transaksi'] . "";
  // exit();
  //   $tgltransaksi = date_create(substr($row['tgl_transaksi'], 0, 10));
  // $jamtransaksi = substr($row['tgl_transaksi'], 10, 16);
?>
<div class="content modal fade" id="mod_ubahsep" style="margin-left: 180px;">

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
                  <div class="overlay-wrapper" id="loading_Sep_modal_ubah">
                    <div class="overlay">
                      <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                    </div>
                  </div>
                  <div class="card card-outline card-danger col-md-12">
                    <span class="badge badge-secondary float-right" style="font-size:15px">
                      <u>Form Ubah SEP Pasien</u>
                    </span>
                    <div class="row">



                      <div class="col-md-12 col-sm-12 col-12 p-1">
                        <div class="info-box mb-0">
                          <table class="table table-striped table-sm" id="pembayaranvalue" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                              <input type="hidden" class="form-control" id='ubah_idpenjaminsep' name='ubah_idpenjaminsep' value="<?php echo $row['id_penjamin'] ?>">
                              <input type="hidden" class="form-control" id='ubah_id_transaksi' name='ubah_id_transaksi' value="<?php echo $row['id_transaksi'] ?>">
                              <input type="hidden" class="form-control" id='sep_lama' name='sep_lama' value="<?php echo $row['no_sjp'] ?>">
                              <tr>
                                <td width="70">SEP</td>
                                <td>:</td>
                                <td>
                                  <input type="text" class="form-control form-control-xs" id='ubah_penjaminsep' value="<?php echo $row['no_sjp'] ?>" name="ubah_penjaminsep">
                                </td>
                              </tr>



                              <tr>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                  <button type="button" class="btn bg-gradient-info btn-xs BtnUbahnomorSEP float-right"><i class="fa fa-close"></i>Simpan</button>
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
    $('#loading_Sep_modal').hide();
    $('#loading_Sep_modal_ubah').hide();
    var MyTablesep = $('#tablehistory_lokup_produk').dataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": false,
      "autoWidth": false
    });
    awal();

    function awal() {
      document.getElementById('ubah_penjaminsep').focus();
    }

    // tampilkan_isi_penjamin_transaksi();

    function sepgeneralrefresh() {
      MyTablesep = $('#tablehistory_lokup_produk').dataTable();
    }

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
    $('[data-mask]').inputmask();


  });


  $('#loading_Sep').hide();
  $('#loading_modal_sep').hide();

  $("#mod_ubahsep").modal({
    backdrop: "static"
  });
  $('#mod_ubahsep').on('shown.bs.modal', function() {

  })
  $(".BtnUbahnomorSEP").click(function() {
    $('#loading_Sep_modal_ubah').show();
    var user = JSON.parse(localStorage['data_user']);
    var id_user = user['id_user'];
    var id_penjamin = $("#ubah_idpenjaminsep").val();
    var val_sep = $("#ubah_penjaminsep").val();
    var val_id_transaksi = $("#ubah_id_transaksi").val();
    var nosjplama = $("#sep_lama").val();
    pertanyaan.fire({
      title: 'Apakah Anda Yakin Akan mengubah SEP',
      html: '<span>Transaksi Nomor ' + val_id_transaksi + ' ?</span>',
      icon: 'question',
      showCancelButton: true,
      reverseButtons: false,
      allowOutsideClick: false
    }).then((result) => {
      if (result.isConfirmed) {
        var param = {
          id_transaksi: val_id_transaksi,
          val_id_user: id_user,
          id_penjamin: id_penjamin,
          sep: val_sep,
          nosjplama: nosjplama
        };
        apiPOST('Historykunjungan/ubahseppenjamin', param, hasil => {

          if (hasil['status'] == 'sukses') {
            $('#loading_Sep_modal_ubah').hide();

            tampilkan_isi_penjamin_transaksi();
            // remove_disdiv();
            // tampilkan_isi_penjamin_transaksi();
            // tampil_kunjungan();
            // tampilkan_isi_penjamin_transaksi();
            $('#mod_ubahsep').modal('hide');

          }
        });
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        $('#loading_Sep_modal_ubah').hide();


      }
    })

  });

  $(document).on("click", ".hapuspenjamin", function() {
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
    var id_penjamin = $(this).attr("data-id");
    var idtransaksi = $(this).attr("data-id1");
    var penjamin = $(this).attr("data-id2");
    var nosjp = $(this).attr("data-id3");

    //   alert(iddetailkunjungan);
    // } else {
    //   txt = "You pressed Cancel!";
    // }
    var user = JSON.parse(localStorage['data_user']);
    var id_user = user['id_user'];

    pertanyaan.fire({
      title: 'Hapus History Penjamin',
      html: '<span>Benarkah Penjamin ' + penjamin + ', di Hapus ???</span>',
      icon: 'question',
      showCancelButton: true,
      reverseButtons: false,
      allowOutsideClick: false
    }).then((result) => {
      if (result.isConfirmed) {
        //$('#tabletindakan_modal_sep tbody').html('');
        // var alasan = $('#alasanhapuspembayaran').val();
        // console.log('ini'+alasan);
        // alert(alasan);
        // exit();
        var param = {
          id_penjamin: id_penjamin,
          idtransaksi: idtransaksi,
          nosjp: nosjp
        };

        apiPOST('Kasirgeneral/sep_deletepenjaminhistory', param, hasil => {
          // mod_RWJPenatajasa_getlistproduk();
          // $("body").find("#" + id).remove();
          tampilkan_isi_penjamin_transaksi();
          tampil_kunjungan();
          tampilkan_isi_penjamin_transaksi();

        });
      } else if (result.dismiss === Swal.DismissReason.cancel) {

      }
    })

  });

  $(document).on("click", ".gantijadiutama", function() {
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
    var id_penjamin = $(this).attr("data-id");
    var idtransaksi = $(this).attr("data-id1");
    var penjamin = $(this).attr("data-id2");
    var nosjp = $(this).attr("data-id3");

    //   alert(iddetailkunjungan);
    // } else {
    //   txt = "You pressed Cancel!";
    // }
    var user = JSON.parse(localStorage['data_user']);
    var id_user = user['id_user'];

    pertanyaan.fire({
      title: 'Yakin',
      html: '<span>Penjamin ' + penjamin + ', di jadikan penjamin utama ???</span>',
      icon: 'question',
      showCancelButton: true,
      reverseButtons: false,
      allowOutsideClick: false
    }).then((result) => {
      if (result.isConfirmed) {
        //$('#tabletindakan_modal_sep tbody').html('');
        // var alasan = $('#alasanhapuspembayaran').val();
        // console.log('ini'+alasan);
        // alert(alasan);
        // exit();
        var param = {
          id_penjamin: id_penjamin,
          idtransaksi: idtransaksi,
          nosjp: nosjp
        };

        apiPOST('Kasirgeneral/sep_ubahpenjamintransaksiutama', param, hasil => {
          // mod_RWJPenatajasa_getlistproduk();
          // $("body").find("#" + id).remove();
          tampilkan_isi_penjamin_transaksi();
          tampil_kunjungan();
          tampilkan_isi_penjamin_transaksi();

        });
      } else if (result.dismiss === Swal.DismissReason.cancel) {

      }
    })

  });

  function keluarmodal_sep() {
    $('#modal_sep').modal('hide');
    $('.modal-backdrop').hide();
  }
</script>