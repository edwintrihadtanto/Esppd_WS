<?php
foreach ($data as $row);
?>
<div class="content modal fade" id="mod_lookkup" style="margin-left: 180px;">
  <div class="container-fluid ">
    <div class="row" style="margin-top:-40px">
      <!-- content kanan -->
      <div class="col-md-8" style="margin-top: 20px;margin-bottom: 0px;">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-body">
              <!-- detail transaksi -->
              <div class="row">
                <div class="col-md-12" style="margin-top: 0px;margin-bottom: 0px;">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>

                  <div class="card card-outline card-danger col-md-12">
                    <table id="tablehistory_lokup_produk" class="table table-bordered table-hover table-sm">
                      <thead>
                        <tr>
                          <th style="width:10px;">No</th>
                          <th style="width:10px;">Kd Produk</th>
                          <th style="width:10px;">Unit</th>
                          <th style="width:25px;">Nama Produk</th>
                          <th style="width:10px;">Tarif</th>
                        </tr>
                      </thead>
                      <tbody id='listlookup_produk'>


                      </tbody>
                    </table>
                    <div style="max-height: 20rem; overflow: auto;">

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
  // $(document).ready(function() {
  var MyTablelookup = $('#tablehistory_lokup_produk').dataTable({
    "paging": true,
    "lengthChange": true,
    "searching": false,
    "ordering": true,
    "info": false,
    "autoWidth": false
  });

  function lookupprodukrefresh() {
    MyTablelookup = $('#tablehistory_lokup_produk').dataTable();
  }

  function tampil_produk() {
    var listParam = [
      'id_transaksi'
    ];
    var param = {
      id_transaksi: <?php echo $row['id_transaksi'] ?>,
    };
    apiPOST("Kasirgeneral/tampilprodukunit", param, hasil => {
      if (hasil['data'] !== null) {
        //alert('tes');
        if (hasil['code'] == 'XX') {
          toastr.error('Data Tidak ditemukan');
        }
        var Baris = '';
        var a = hasil['data'];
        for (var i = 0; i < a.length; i++) {
          var no = i + 1;
          Baris += '<tr class="odd tarifidproduk" data-id="' + a[i].kd_produk + '" data-id1="' + a[i].id_tarif + '">';
          Baris += '<td>' + no + '</td>';
          Baris += '<td>' + a[i].kd_produk + '</td>';
          Baris += '<td>' + a[i].nama_unit + '</td>';
          Baris += '<td>' + a[i].nama_produk + '</td>';
          Baris += '<td>' + format_ribuan(a[i].harga) + '</td>';
          Baris += "</tr>";
          // alert('cari pasien' + a[i].id_transaksi );
          no++;
        }
        MyTablelookup.fnDestroy();
        //$('#tableKasir tbody').append(Baris);
        document.getElementById("listlookup_produk").innerHTML = Baris;
        lookupprodukrefresh();
        $('#loading_kasir_mod').hide();
      }
    }, listParam);
  };

  tampil_produk();
  $('#loading_modal_IGDkasir').hide();

  $("#mod_lookkup").modal({
    backdrop: "static"
  });
  $('#mod_lookkup').on('shown.bs.modal', function() {

  })
  $(".BayarIGDKasir").click(function() {
    tambahbayar();
    $('#mod_lookkup').modal('hide');
  });

  function keluarmodal_IGDkasir() {
    $('#modal_IGDkasir').modal('hide');
    $('.modal-backdrop').hide();
  }

  // })
</script>