<div class="content modal fade" id="modal_RWJBayarkasir" style="margin-left: 180px;">
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
                    <div class="card-header">
                      <div class="row">
                        <div class="form-group col-2">
                          <label>No. Transaksi :</label>
                          <input type="text" class="form-control form-control-sm " value='09090788'>
                        </div>

                        <div class="form-group col-3">
                          <label>Tgl. Kunjung :</label>
                          <input type="text" class="form-control form-control-sm" value='07 Agustus 2021'>
                        </div>

                        <div class="form-group col-2">
                          <label>No. RM :</label>
                          <input type="text" class="form-control form-control-sm" value='0000001'>
                        </div>

                        <div class="form-group col-4">
                          <label>Nama :</label>
                          <input type="text" class="form-control form-control-sm" value='Reski Alfan DP'>
                        </div>

                        <div class="form-group col-3">
                          <label>Pembayaran :</label>
                          <select name="pembayaran" class="form-control form-control-sm">
                            <option value='1'> ASURANSI </option>
                            <option value='2'> UMUM </option>

                          </select>
                        </div>

                        <div class="form-group col-3">
                          <label>Customer :</label>
                          <select name="pembayaran" class="form-control form-control-sm">
                            <option value='1'> BPJS </option>
                            <option value='2'> UMUM </option>

                          </select>
                        </div>

                        <div class="form-group col-3">
                          <label>SJP :</label>
                          <input type="text" class="form-control form-control-sm" value='983479847389639'>

                        </div>

                      </div>
                    </div>
                  </div>

                  <div class="card card-outline card-danger">
                    <div class="card-header">
                      <div class="btn-group">
                        <button type="button" class="btn bg-gradient-info btn-sx BayarRajalKasir"><i class="fa fa-pencil-alt"></i> Bayar</button>
                      </div>
                    </div>
                    <div class="card-body bg-teal color-palette">
                      <table class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th style="width:10px;">Tag</th>
                            <th style="width:25px;">Nama Produk</th>
                            <th style="width:10px;">Qty</th>
                            <th style="width:25px;">Harga</th>
                            <th style="width:30px;">Nominal</th>
                          </tr>
                        </thead>
                      </table>
                    </div>

                    <div style="max-height: 12rem; overflow: auto;">
                      <table class="table table-bordered table-hover">
                        <tbody>
                          <tr>
                            <td><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"></td>
                            <td> <input type="text" class="form-control form-control-sm" value='Pendaftaran'></td>
                            <td> <input type="text" class="form-control form-control-sm" value='2'></td>
                            <td> <input type="text" class="form-control form-control-sm" value='5000'></td>
                            <td> <input type="text" class="form-control form-control-sm" value='10000'></td>
                          </tr>
                          <tr>
                            <td><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"></td>
                            <td> <input type="text" class="form-control form-control-sm" value='Pemeriksaan Dokter'></td>
                            <td> <input type="text" class="form-control form-control-sm" value='1'></td>
                            <td> <input type="text" class="form-control form-control-sm" value='25000'></td>
                            <td> <input type="text" class="form-control form-control-sm" value='25000'></td>
                          </tr>
                          <tr>
                            <td><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"></td>
                            <td> <input type="text" class="form-control form-control-sm" value='Rawat Luka'></td>
                            <td> <input type="text" class="form-control form-control-sm" value='1'></td>
                            <td> <input type="text" class="form-control form-control-sm" value='25000'></td>
                            <td> <input type="text" class="form-control form-control-sm" value='25000'></td>
                          </tr>
                          <tr>
                            <td><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"></td>
                            <td> <input type="text" class="form-control form-control-sm" value='Rawat Luka'></td>
                            <td> <input type="text" class="form-control form-control-sm" value='1'></td>
                            <td> <input type="text" class="form-control form-control-sm" value='25000'></td>
                            <td> <input type="text" class="form-control form-control-sm" value='25000'></td>
                          </tr>
                          <tr>
                            <td><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"></td>
                            <td> <input type="text" class="form-control form-control-sm" value='Rawat Luka'></td>
                            <td> <input type="text" class="form-control form-control-sm" value='1'></td>
                            <td> <input type="text" class="form-control form-control-sm" value='25000'></td>
                            <td> <input type="text" class="form-control form-control-sm" value='25000'></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

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

<!-- //menu kiri -->


<script type="text/javascript">
  $('#loading_modal_RWJkasir').hide();

  $("#modal_RWJBayarkasir").modal({
    backdrop: "static"
  });
  $('#modal_RWJBayarkasir').on('shown.bs.modal', function() {

  })
  $(".BayarRajalKasir").click(function() {
    tambahbayar();
    $('#modal_RWJBayarkasir').modal('hide');
  });

  function keluarmodal_RWJkasir() {
    $('#modal_RWJkasir').modal('hide');
    $('.modal-backdrop').hide();
  }
</script>