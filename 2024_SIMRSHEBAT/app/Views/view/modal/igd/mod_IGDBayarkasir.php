<div class="content modal fade" id="modal_IGDBayarkasir" style="margin-left: 180px;">
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
                    <div class="row">

                      <div class="col-md-6 col-sm-6 col-12 p-1">
                        <div class="info-box mb-0">
                          <table class="table table-striped table-sm" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                              <tr>
                                <td width="70">No. Transaksi.</td>
                                <td>:</td>
                                <td><input type="text" class="form-control form-control-xs " value='09090788' id='idtransaksi' readonly></td>
                              </tr>
                              <tr>
                                <td>Tgl. Kunj.</td>
                                <td>:</td>
                                <td><input type="text" class="form-control form-control-xs " id="tglkunjung" value='07 Agustus 2021' readonly></td>
                              </tr>
                              <tr>
                                <td>No. Rm</td>
                                <td>:</td>
                                <td><input type="text" class="form-control form-control-xs" id='norm' value='0000001' readonly></td>
                              </tr>
                              <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td><input type="text" class="form-control form-control-xs" id='namapas' value='Reski Alfan DP' readonly></td>
                              </tr>
                              <tr>
                                <td>SJP</td>
                                <td>:</td>
                                <td><input type="text" class="form-control form-control-xs" id='nosjp' value='983479847389639' readonly></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>

                      <div class="col-md-6 col-sm-6 col-12 p-1">
                        <div class="info-box mb-0">
                          <table class="table table-striped table-sm" id='pembayaranigdvalue' cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                              <tr>
                                <td width="70">Tgl Bayar</td>
                                <td>:</td>
                                <td>
                                  <input type="text" class="form-control form-control-xs " data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric" id="tglbayar" name="tglbayar" value=''>
                                  <!-- <input type="time" class="form-control-xs" value='' min="09:00" max="12:00"> -->
                                </td>
                              </tr>
                              <tr>
                                <td width="70">Jenis</td>
                                <td>:</td>
                                <td>
                                  <select name="id_jenis_pembayaranigd" id="id_jenis_pembayaranigd" onchange="pembayaran(event);" class="form-control form-control-xs">
                                  </select>
                                </td>
                              </tr>
                              <tr>
                                <td>Pembayaran</td>
                                <td>:</td>
                                <td> <select name="pembayaran" id="id_pembayaranigd" name="id_pembayaranigd" onchange="apakahkartu(event);" class="form-control form-control-xs">

                                  </select>
                                </td>
                              </tr>

                            </tbody>
                          </table>
                        </div>
                        <div class="col-md-3 float-right" style="padding-top: 10px;">
                          <button type="button" class="btn bg-gradient-info btn-xs BayarIGDKasir"><i class="fa fa-cash-register"></i> Bayar</button>
                        </div>
                        <div class="col-md-6 float-right" id='kartunomorigd' style="padding-top: 10px;display:none">
                        </div>

                      </div>
                    </div>
                    <div class="card-body bg-secondary color-palette">
                      <table class="table table-bordered table-sm">
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
                      <table class="table table-bordered table-hover table-sm">
                        <tbody>
                          <tr>
                            <td><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" class="form-control" readonly></td>
                            <td> <input type="text" class="form-control form-control-sm" value='Pendaftaran' readonly></td>
                            <td> <input type="text" class="form-control form-control-sm" value='2' readonly></td>
                            <td> <input type="text" class="form-control form-control-sm" value='5000' readonly></td>
                            <td> <input type="text" class="form-control form-control-sm" value='10000' readonly></td>
                          </tr>
                          <tr>
                            <td><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" class="form-control" readonly></td>
                            <td> <input type="text" class="form-control form-control-sm" value='Pendaftaran' readonly></td>
                            <td> <input type="text" class="form-control form-control-sm" value='2' readonly></td>
                            <td> <input type="text" class="form-control form-control-sm" value='5000' readonly></td>
                            <td> <input type="text" class="form-control form-control-sm" value='10000' readonly></td>
                          </tr>
                          <tr>
                            <td><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" class="form-control" readonly></td>
                            <td> <input type="text" class="form-control form-control-sm" value='Pendaftaran' readonly></td>
                            <td> <input type="text" class="form-control form-control-sm" value='2' readonly></td>
                            <td> <input type="text" class="form-control form-control-sm" value='5000' readonly></td>
                            <td> <input type="text" class="form-control form-control-sm" value='10000' readonly></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div>
                      <!-- <div class="card card-info">
                        <div class="card-header"> -->
                      <!-- <h3 class="card-title">Pembayaran</h3>
                        </div> -->
                      <div class="card-body">
                        <div class="row">
                          <div class="col-1">
                            <labe><strong>Bayar</strong></label>
                          </div>
                          <div class="col-3">
                            <input type="text" class="form-control" placeholder="jumlah bayar ...." fdprocessedid="cnt78o">
                          </div>
                          <div class="col-3">
                            <input type="text" class="form-control" placeholder="balance ...." fdprocessedid="cnt78o" readonly>
                          </div>
                          <div class="col-1">
                            <label>Total</label>
                          </div>
                          <div class="col-3">
                            <input type="text" class="form-control" placeholder="total nominal ..." fdprocessedid="cnt78o" readonly>
                          </div>
                          <!-- </div>
                        </div> -->
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
    tampil_jenisbayar();

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

  function tampil_jenisbayar() {
    apiPOST('Transaksi/jenisbayar', null, hasil => {
      var idjen = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        idjen += '<option value="' + a[i]['id_jenis_pembayaran'] + '">' + a[i]['deskripsi'] + '</option>';
      }
      document.getElementById('id_jenis_pembayaranigd').innerHTML = idjen;


    });
  }



  // $(".datepicker").datepicker({
  //   dateFormat: 'dd-mm-yy'
  // });

  function pembayaran() {
    $("#kartunomorigd").hide();

    var param = {
      id: $("#id_jenis_pembayaranigd").val(),
    };
    apiPOST('Transaksi/pembayaran', param, hasil => {
      var kab = '<option value="">*Pilih</option>';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        kab += '<option value="' + a[i]['id_pembayaran'] + '">' + a[i]['deskripsi_pembayaran'] + '</option>';
      }
      document.getElementById('id_pembayaranigd').innerHTML = kab;
    });
  }

  function apakahkartu() {
    // alert('hai');

    var param = {
      id: $("#id_pembayaranigd").val(),
    };
    apiPOST('Transaksi/apakahkartu', param, hasil => {
      var a = hasil['data'];
      // var Baris = "<tr><td>No Kartu</td><td>:</td><td><input type='text' class='form-control form-control-xs' id='no_kartukasirigd' value=''></td></tr>";
      var Baris = "<input type='text' class='form-control form-control-xs' placeholder='nomor kartu ...' id='no_kartukasirigd' value=''>";

      for (var i = 0; i < a.length; i++) {
        // alert(a[i]['kartu']);
        if (a[i]['kartu'] == 't') {
          // alert('hai');
          $("#kartunomorigd").show();

          document.getElementById("kartunomorigd").innerHTML = Baris;
          // $('#pembayaranigdvalue tbody').append(Baris);

        }
      }
      // document.getElementById('id_pembayaranigd').innerHTML = kab;
    });
  }

  $('#loading_modal_IGDkasir').hide();

  $("#modal_IGDBayarkasir").modal({
    backdrop: "static"
  });
  $('#modal_IGDBayarkasir').on('shown.bs.modal', function() {

  })
  $(".BayarIGDKasir").click(function() {
    tambahbayar();
    $('#modal_IGDBayarkasir').modal('hide');
  });

  function keluarmodal_IGDkasir() {
    $('#modal_IGDkasir').modal('hide');
    $('.modal-backdrop').hide();
  }
</script>