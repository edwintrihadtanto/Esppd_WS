<div class="content modal fade" id="modal_RWJkasir">
  <div class="container-fluid ">
    <div class="row" style="margin-top:-40px">
      <!-- content kanan -->
      <div class="col-md-10" style="margin-top: 20px;margin-bottom: 0px;">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-body">
              <!-- detail transaksi -->
              <div class="row">
                <div class="col-md-12" style="margin-top: 0px;margin-bottom: 0px;">
                  <div class="card card-outline card-danger">
                    <div class="card-header">
                      <div class="btn-group">
                        <button type="button" class="btn bg-gradient-info btn-sm tambahbaris"><i class="fa fa-pencil-alt"></i> Tambah Baris</button>
                        <button type="button" class="btn bg-gradient-danger btn-sm"><i class="fa fa-trash-alt"></i> Hapus Baris</button>
                        <!-- <button type="button" class="btn bg-gradient-secondary btn-sm"><i class="fab fa-searchengin"></i> Look Up Produk</button> -->
                      </div>
                      <span class="badge badge-info float-right">
                        <h6>KASIR RAWAT JALAN</h6>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="col-md-12" style="margin-top: -10px;max-height: 17rem; overflow: auto;">
                  <table id="tabletindakan_modal_RWJkasir" class="table table-striped table-sm" style="border-collapse: inherit;">
                    <thead>
                      <tr>
                        <th width="5">#</th>
                        <th width="100">Tgl. Transaksi</th>
                        <th width="90">No. Faktur</th>
                        <th width="100">Unit</th>
                        <th width="100">Kd Produk</th>
                        <th width="150">Nma Produk</th>
                        <th>Dokter</th>
                        <th width="100">Qty</th>
                        <th width="100">Tarif</th>
                        <th width="100">Folio</th>
                      </tr>
                    </thead>
                    <tbody></tbody>
                  </table>
                </div>
              </div>

              <!-- histori bayar -->
              <div class="col-md-12" style="margin-top: 20px;">
                <div class="row">
                  <div class="col-md-12" style="margin-top: 0px;margin-bottom: 0px;">
                    <div class="card card-outline card-danger">
                      <div class="card-header">
                        <div class="btn-group">
                          <button type="button" class="btn bg-gradient-danger btn-sm"><i class="fa fa-trash-alt"></i> Hapus Pembayaran</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12" style="margin-top: -10px;max-height: 10rem; overflow: auto">
                    <table id="tablehistory_modal_RWJkasir" class="table table-striped table-sm" style="border-collapse: inherit;">
                      <thead>
                        <tr>
                          <th width="5">#</th>
                          <th width="150">Urut Bayar</th>
                          <th width="100">Tgl. Bayar</th>
                          <th width="90">No. Transaksi</th>
                          <th width="100">Shift</th>
                          <th width="100">Kd Unit</th>
                          <th>Pembayaran</th>
                          <th width="100">Jumlah</th>
                          <th width="100">Petugas</th>
                        </tr>
                      </thead>
                      <tbody></tbody>
                    </table>
                  </div>

                </div>
              </div>
              <!-- // histori bAYAR -->
            </div>
          </div>
        </div>
      </div>
      <!-- menu kiri -->

      <div class="col-md-2" style="margin-top:20px">
        <!-- <div class="col-md-2" style="margin-top: 15px;margin-bottom: 0px;">
        <div class="col-md-2"> -->
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-body">

              <div class="col-md-12 justify-content-between">
                <table class="table table-striped table-sm" border="0" style="margin:0px;size:100%">
                  <tr>
                    <td>No.Transaksi</td>
                    <td> : </td>
                    <td>#8798798</td>
                  </tr>
                  <tr>
                    <td>Kode. RM</td>
                    <td> : </td>
                    <td>0909090</td>
                  </tr>
                  <tr>
                    <td>Unit</td>
                    <td> : </td>
                    <td>Poli Dalam</td>
                  </tr>
                </table>
              </div>

              <div class="btn-group-vertical" style="width: 100%;margin-top:10px">
                <button type="button" class="btn bg-gradient-secondary btn-sm" style="text-align: start;" onclick="tamp_bayarRajal()"><i class="fa fa-pencil-alt"></i> Pembayaran</button>
                <button type="button" class="btn bg-gradient-danger btn-sm" style="text-align: start;"><i class="fas fa-door-closed"></i> Tutup Transaksi</button>
                <button type="button" class="btn bg-gradient-success btn-sm" style="text-align: start;"><i class="fas fa-check"></i> Buka Transaksi</button>
                <button type="button" class="btn bg-gradient-danger btn-sm" style="text-align: start;"><i class="fas fa-trash"></i> Batal Transaksi</button>
              </div>


              <div class="btn-group-vertical" style="width: 100%;">

                <div class="btn-group">
                  <button type="button" class="btn bg-gradient-info btn-sm" style="text-align: start;"><i class="fa fa-pencil-alt"></i> Update Data</button>
                  <button type="button" class="btn bg-gradient-info btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                    <span class="sr-only"></span>
                  </button>
                  <div class="dropdown-menu" role="menu" style="">
                    <a class="dropdown-item" href="#">Ganti Dokter</a>
                    <a class="dropdown-item" href="#">Ganti Kelompok Pasien</a>
                  </div>
                </div>
                <button type="button" class="btn bg-gradient-secondary btn-sm" style="text-align: start;"><i class="fa fa-print"></i> Cetak</button>
              </div>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger btn-sm" onclick="keluarmodal_RWJkasir();"><i class="fa fa-reply"></i> Kembali</button>

            </div>


          </div>
          <!-- /.modal-content -->
        </div>
        <!-- </div>
      </div> -->

      </div>
    </div>
  </div>
</div>

<!-- //menu kiri -->


<script type="text/javascript">
  $('#loading_modal_RWJkasir').hide();

  $("#modal_RWJkasir").modal({
    backdrop: "static"
  });

  $('#modal_RWJkasir').on('shown.bs.modal', function() {});

  // $(".BayarRajalKasir").click(function() {
  //   alert("tambah");
  //   // BarisBaru();
  // });





  function BarisBaru() {
    var Nomor = $('#tabletindakan_modal_RWJkasir tbody tr').length + 1;
    var Baris = "<tr>";
    Baris += "<td>"+Nomor+"</td>";
    Baris += "<td><input type='text' class='form-control form-control-sm' name='tesx' id='tesx'></td>";
    Baris += "<td><input type='text' class='form-control form-control-sm' name='tes' id='tes'></td></td>";
    Baris += "<td><input type='text' class='form-control form-control-sm' name='tes' id='tes'></td></td>";
    Baris += "<td><input type='text' class='form-control form-control-sm' name='tes' id='tes'></td></td>";
    Baris += "<td><input type='text' class='form-control form-control-sm' name='tes' id='tes'></td></td>";
    Baris += "<td><input type='text' class='form-control form-control-sm' name='tes' id='tes'></td></td>";
    Baris += "<td><input type='text' class='form-control form-control-sm' name='tes' id='tes'></td></td>";
    Baris += "<td><input type='text' class='form-control form-control-sm' name='tes' id='tes'></td></td>";
    Baris += "<td><input type='text' class='form-control form-control-sm' name='tes' id='tes'></td></td>";
    Baris += "</tr>";

    $('#tabletindakan_modal_RWJkasir tbody').append(Baris);

    $('#tabletindakan_modal_RWJkasir tbody tr').each(function() {
      $(this).find('td:nth-child(2) input').focus();
    });

  }



  tampilkan_isi_tindakan();
  tampilkan_isi_history();

  function keluarmodal_RWJkasir() {
    $('#modal_RWJkasir').modal('hide');
    $('.modal-backdrop').hide();
  }

  function tampilkan_isi_tindakan() {
    var Baris = '<tr>';
    for (var i = 0; i < 15; i++) {
      var no = i + 1;
      Baris += '<td>' + no + '</td>';
      Baris += '<td>' + no + ' February 2023</td>';
      Baris += '<td>000' + no + '</td>';
      Baris += '<td>Unit ' + no + '</td>';
      Baris += '<td>kdProduk' + no + '</td>';
      Baris += '<td>Biaya Obat Transfer' + no + '</td>';
      Baris += '<td>dr. Joko Islami</td>';
      Baris += '<td>' + (no + 5) + '</td>';
      Baris += '<td>Rp. ' + no + '000</td>';
      Baris += '<td></td>';
      Baris += "</tr>";
    }
    $('#tabletindakan_modal_RWJkasir tbody').append(Baris);
  }

  function tampilkan_isi_history() {
    var no = $('#tablehistory_modal_RWJkasir tbody tr').length + 1;
    var Barisbayar = '<tr>';
    // for (var i = 0; i < 1; i++) {
      // var no = i + 1;
      Barisbayar += '<td>' + no + '</td>';
      Barisbayar += '<td>UrutBayar ' + no + '</td>';
      Barisbayar += '<td>' + no + ' Maret 2023</td>';
      Barisbayar += '<td>0232' + no + '</td>';
      Barisbayar += '<td>Shift ' + no + '</td>';
      Barisbayar += '<td>Unit ' + no + '</td>';
      Barisbayar += '<td>BPJS</td>';
      Barisbayar += '<td>Rp. 19' + no + '</td>';
      Barisbayar += '<td>Edwin Tri H.</td>';
      Barisbayar += "</tr>";
    // }
    $('#tablehistory_modal_RWJkasir tbody').append(Barisbayar);
  }

  
  $(".tambahbaris").click(function() {
    // alert("tambah");
    BarisBaru();
  });

  function tambahbayar(){
    tampilkan_isi_history();

  }
</script>