<?php
foreach ($data as $row)
  $tgltransaksi = date_create(substr($row['tgl_transaksi'], 0, 10));
$jamtransaksi = substr($row['tgl_transaksi'], 10, 16);
?>
<div class="content modal fade" id="mod_KasirUnpostingPJ" style="margin-left: 180px;">
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
                      <u>Halaman Unposting Penata Jasa</u>
                    </span>
                    <div class="row">

                      <div class="col-md-12 col-sm-12 col-12 p-1">
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
                            </tbody>
                          </table>
                        </div>

                      </div>

                    </div>
                    <div class="col-md-12" id="div_tablehistory_kunjunganPasien" style="margin-top:10px;max-height: 10rem; overflow: auto">
                      <table id="tablehistory_kunjunganPasien" class="table table-striped table-sm" style="border-collapse: inherit;">
                        <thead>
                          <tr>
                            <th width="100">Tgl.Kunjung</th>
                            <th width="90">Unit</th>
                            <th width="90">Jenis</th>
                            <th width="250">Aksi</th>
                          </tr>
                        </thead>
                        <tbody id="list_tablehistory_kunjungan" ;>

                        </tbody>
                      </table>
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
    var MyTablekasir = $('#tablehistory_kunjunganPasien').dataTable({
      "paging": false,
      "lengthChange": true,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false
    });
    tampilkan_history_kunjungan();

    function kasirgeneralrefresh() {
      MyTablekasir = $('#tablehistory_kunjunganPasien').dataTable();
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

  function tampilkan_history_kunjungan() {
    var listParam = [
      'id_transaksi'
    ];
    var param = {
      idtrans: <?php echo $row['id_transaksi'] ?>,
    };
    apiPOST("Kasirgeneral/kunjunganpas_unposting", param, hasil => {
      if (hasil['data'] !== null) {
        //alert('tes');
        if (hasil['code'] == 'XX') {
          toastr.error('Data Tidak ditemukan');
        }
        var no = $('#tablehistory_kunjunganPasien tbody tr').length + 1;
        var BarisKunjungan = '<tr id="trpenjamintransaksi' + no + '">';
        var a = hasil['data'];
        for (var i = 0; i < a.length; i++) {
          var tglmasuk = a[i].tgl_masuk.substr(8, 2);
          var blnmasuk = a[i].tgl_masuk.substr(5, 2);
          var thnmasuk = a[i].tgl_masuk.substr(0, 4);
          tglkunjung = tglmasuk + '/' + blnmasuk + '/' + thnmasuk;
          if (a[i].coba == 'ranap') {
            var inap = a[i].nama_ruang + ' ' + a[i].nama_kamar;

          } else {
            var inap = " ";
          }
          var no = i + 1;
          BarisKunjungan += '<td>' + tglkunjung + '</td>';
          BarisKunjungan += '<td>' + a[i].nama_unit + ' ' + inap + '</td>';
          BarisKunjungan += '<td>' + a[i].coba + '</td>';
          if (a[i].posting == 'f') {
            BarisKunjungan += '<td><button type="button" class="btn bg-gradient-success btn-xs unpostingpenatajasaX" data-id="' + a[i].id_kunjungan + '" data-id1="' + a[i].nama_unit + '" data-id2="' + tglkunjung + '" disabled ><i class="fa fa-sync-alt fa-spin"></i> Sudah Terbuka</button></td>';
          } else {
            if (a[i].coba == 'ranap' && a[i].status_kunjungan != '3') {
              BarisKunjungan += '<td></td>';
            } else {
              BarisKunjungan += '<td><button type="button" class="btn bg-gradient-danger btn-xs unpostingpenatajasa" data-id="' + a[i].id_kunjungan + '" data-id1="' + a[i].nama_unit + '" data-id2="' + tglkunjung + '" ><i class="fa fa-sync-alt fa-spin"></i> Unposting Kunjungan</button></td>';
            }
          }
          BarisKunjungan += "</tr>";
          no++;
        }
        MyTablekasir.fnDestroy();
        // $('#tablehistory_modal_kasir_pelunasan tbody').append(Barisbayar);
        document.getElementById("list_tablehistory_kunjungan").innerHTML = BarisKunjungan;
        kasirgeneralrefresh();

      }
    }, listParam);
  }
  $('#loading_kasir_mod').hide();
  $('#loading_modal_kasir').hide();

  $("#mod_KasirUnpostingPJ").modal({
    backdrop: "static"
  });
  $('#mod_KasirUnpostingPJ').on('shown.bs.modal', function() {

  })


  $(document).on("click", ".unpostingpenatajasa", function() {
    // var txt;
    var id = this.id;
    var id = jQuery(this).closest('tr').attr('id');
    var id_kunjungan = $(this).attr("data-id");
    var nama_unit = $(this).attr("data-id1");
    var tglkunjung = $(this).attr("data-id2");
    var user = JSON.parse(localStorage['data_user']);
    var id_user = user['id_user'];
    pertanyaan.fire({
      title: 'Unposting Penata Jasa',
      html: '<span> ' + nama_unit + ' ' + tglkunjung + ', Yakin ???</span>',
      icon: 'question',
      showCancelButton: true,
      reverseButtons: false,
      allowOutsideClick: false
    }).then((result) => {
      if (result.isConfirmed) {
        //$('#tabletindakan_modal_kasir tbody').html('');
        // var alasan = $('#alasanhapuspembayaran').val();
        // console.log('ini'+alasan);
        // alert(alasan);
        // exit();
        var param = {
          id_kunjungan: id_kunjungan
        };

        apiPOST('Kasirgeneral/Kasir_bukapenatajasa', param, hasil => {
          // mod_RWJPenatajasa_getlistproduk();
          // $("body").find("#" + id).remove();
          tampilkan_history_kunjungan();
          tampil_kunjungan();

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