<?php
foreach ($data as $row)
  //var_dump($data);
  //echo "" . $row['id_transaksi'] . "";
  $tglmasuk = date_create(substr($row['jam_masuk'], 0, 10));
$jamtransaksi = substr($row['jam_masuk'], 10, 16);
?>
<div class="content modal fade" id="mod_gantidokterkunjungan" style="margin-left: 180px;">
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
                    <span class="badge badge-secondary float-right" style="font-size:15px">
                      <u>Halaman Ganti Dokter </u>
                    </span>
                    <div class="row">

                      <div class="col-md-6 col-sm-6 col-6 p-1">
                        <div class="info-box mb-0">
                          <table class="table table-striped table-sm" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                              <tr>
                                <td width="70">Id Kunjungan</td>
                                <td>:</td>
                                <td><input type="text" class="form-control form-control-xs " value='<?php echo $row['id_kunjungan'] ?>' id='id_kunjungan' name="id_kunjungan" readonly></td>
                              </tr>
                              <tr>
                                <td>Tgl. Kunj.</td>
                                <td>:</td>
                                <td>
                                  <input type="text" class="form-control form-control-xs " id="tglkunjungan" value='<?php echo date_format($tglmasuk, "d/m/Y");  ?>' name="tglkunjungan" readonly>

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
                              <tr>
                                <td>Dokter</td>
                                <td>:</td>
                                <td><input type="text" class="form-control form-control-xs" id='namadok' value='<?php echo $row['nama_pegawai'] ?>' name="namadok" readonly></td>
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
                                <td width="70">Pilih</td>
                                <td>:</td>
                                <td>
                                  <select class="form-control form-control-xs" id='iddokterganti' name="iddokterganti"></select>
                                </td>
                              </tr>

                              <tr>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                  <button type="button" class="btn bg-gradient-info btn-xs BtnGantiDokter float-right"><i class="fa fa-close"></i>Ganti Dokter</button>
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
    $('#loading_kasir_mod').hide();
    var MyTablekasir = $('#tablehistory_lokup_produk').dataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": false,
      "autoWidth": false
    });

    function kasirgeneralrefresh() {
      MyTablekasir = $('#tablehistory_lokup_produk').dataTable();
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

    var id = <?php echo $row['id_transaksi'] ?>;
    var param = {
      idtrans: id,
    };
    apiPOST('Rawat_inap/dokter', param, hasil => {
      // var aga = "<option value=''> * Pilih Penjamin </option>";
      var aga = "<option value=''>* Silahkan Pilih</option>";
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        aga += '<option value="' + a[i]['id_pegawai'] + '">' + a[i]['nama_pegawai'] + '</option>';
      }
      document.getElementById('iddokterganti').innerHTML = aga;
    });

  });


  $('#loading_kasir_mod').hide();
  $('#loading_modal_kasir').hide();

  $("#mod_gantidokterkunjungan").modal({
    backdrop: "static"
  });
  $('#mod_gantidokterkunjungan').on('shown.bs.modal', function() {

  })
  $(".BtnGantiDokter").click(function() {
    //tambahbayar();
    if($("#iddokterganti").val()==''){
    toastr.error('Silahkan pilih dokter !!!');
    return;
  }
    var id_transaksi = <?php echo $row['id_transaksi'] ?>;
    var user = JSON.parse(localStorage['data_user']);
    var id_user = user['id_user'];
    var iddokterganti = $("#iddokterganti").val();
    pertanyaan.fire({
      title: 'Yakin',
      html: '<span>Ganti Dokter ?</span>',
      icon: 'question',
      showCancelButton: true,
      reverseButtons: false,
      allowOutsideClick: false
    }).then((result) => {
      if (result.isConfirmed) {
        var param = {
          id_pegawai: iddokterganti,
          id_kunjungan : <?php echo $row['id_kunjungan'] ?>
        };
        apiPOST('Kunjungan/updategantidokter', param, hasil => {
          if (hasil['status'] == 'sukses') {
            viewdokter(hasil['nama']);
          // document.getElementById('mod_RWIPenatajasa_dokter').value = hasil['nama'];
          // document.getElementById('mod_IGDPenatajasa_dokter').value = hasil['nama'];
          $('#mod_gantidokterkunjungan').modal('hide');
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