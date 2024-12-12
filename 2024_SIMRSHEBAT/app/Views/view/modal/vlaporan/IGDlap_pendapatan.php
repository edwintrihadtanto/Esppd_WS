<div class="content modal fade" id="IGDmodal_lap_pendapatan">
  <div class="container-fluid ">
    <div class="row">

      <div class="col-md-12">
        <div class="form-group">
          <div>
            <div class="modal-dialog">
              <div class="modal-content" style="overflow: auto;">
                <div class="card-header">
                  <h5>Laporan Pendapatan RS
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </h5>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Tgl. Awal</label>
                        <input type="text" id="tglawal" name="tglawal" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" class="form-control form-control-sm">
                      </div>
                    </div>
                    <div class="col-sm-2" style="padding-top: 20px;">
                      <div class="form-group">
                        <input class="" type="checkbox" id="tglawal_shift1" name="tglawal_shift1">
                        <label class="form-check-label">Shift 1</label>
                      </div>
                    </div>

                    <div class="col-sm-2" style="padding-top: 20px;">
                      <div class="form-group">
                        <div class="custom-control custom-checkbox">
                          <input class="form-check-input" type="checkbox" id="tglawal_shift2" name="tglawal_shift2" value="2">
                          <label class="form-check-label">Shift 2</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-2" style="padding-top: 20px;">
                      <div class="form-group">
                        <div class="custom-control custom-checkbox">
                          <input class="form-check-input" type="checkbox" id="tglawal_shift3" name="tglawal_shift3" value="3">
                          <label class="form-check-label">Shift 3</label>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Tgl. Akhir</label>
                        <input type="text" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" id="tglakhir" name="tglakhir" class="form-control form-control-sm">
                      </div>
                    </div>
                    <div class="col-sm-2" style="padding-top: 20px;">
                      <div class="form-group">
                        <div class="custom-control custom-checkbox">
                          <input class="form-check-input" type="checkbox" id="tglakhir_shift1" name="tglakhir_shift1" value="1">
                          <label class="form-check-label">Shift 1</label>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-2" style="padding-top: 20px;">
                      <div class="form-group">
                        <div class="custom-control custom-checkbox">
                          <input class="form-check-input" type="checkbox" id="tglakhir_shift2" name="tglakhir_shift2" value="2">
                          <label class="form-check-label">Shift 2</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-2" style="padding-top: 20px;">
                      <div class="form-group">
                        <div class="custom-control custom-checkbox">
                          <input class="form-check-input" type="checkbox" id="tglakhir_shift3" name="tglakhir_shift3" value="3">
                          <label class="form-check-label">Shift 3</label>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <label>Cara Bayar</label>
                      <div class="form-group">
                        <select name="id_jenis_pembayaran_laporan" id="id_jenis_pembayaran_laporan" onchange="pembayaran(event);" class="form-control form-control-xs"></select>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <label>Detail Bayar</label>
                      <div class="form-group">
                        <select id="id_pembayaran_laporan" name="id_pembayaran_laporan" onchange="pembayaran();" class="form-control form-control-xs"></select>
                      </div>
                    </div>

                    <div class="col-sm-12">
                      <label></label>
                      <div class="form-group">
                        <select id="id_userpaid" name="id_userpaid" class="form-control form-control-xs"></select>
                      </div>
                    </div>

                  </div>
                  <p class="lead mb-0"><button type="button" class="btn btn-sm btn-info" onclick="lihatlaporanpendapatanrs()"><i class="fa fa-save"></i> Cari</button></p>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    tampil_jenisbayar();
    var option = '<option value="all">ALL</option>';
    document.getElementById('id_pembayaran_laporan').innerHTML = option;
    $('#datemask').inputmask('dd/mm/yyyy', {
      'placeholder': 'dd/mm/yyyy'
    })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', {
      'placeholder': 'mm/dd/yyyy'
    })
    //Money Euro
    $('[data-mask]').inputmask()

    $("#IGDmodal_lap_pendapatan").modal({
      backdrop: "static"
    });

    var today = new Date();
    //alert(today);
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    tglsekarang = dd + '/' + mm + '/' + yyyy; // in   "mm/dd/yyyy" format
    // var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    document.getElementById('tglawal').value = tglsekarang;
    document.getElementById('tglakhir').value = tglsekarang;


  })


  function tampil_jenisbayar() {
    apiPOST('Kasirgeneral/jenisbayar', null, hasil => {
      var idjen = '<option value="all">ALL</option>';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        idjen += '<option value="' + a[i]['id_jenis_pembayaran'] + '">' + a[i]['deskripsi'] + '</option>';
      }
      document.getElementById('id_jenis_pembayaran_laporan').innerHTML = idjen;
    });
  };

  function pembayaran() {

    if ($("#id_jenis_pembayaran_laporan").val() == 'all') {
      var option = '<option value="all">ALL</option>';
      document.getElementById('id_pembayaran_laporan').innerHTML = option;
      return;
    }
    var param = {
      id: $("#id_jenis_pembayaran_laporan").val(),
    };
    apiPOST('Kasirgeneral/pembayaran', param, hasil => {
      // var kab = '<option value="">*Pilih</option>';
      var kab = '';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        kab += '<option value="' + a[i]['id_pembayaran'] + '">' + a[i]['deskripsi_pembayaran'] + '</option>';
      }
      document.getElementById('id_pembayaran_laporan').innerHTML = kab;
    });
  }

  pegawaipembayaran();
  function pegawaipembayaran() {
    apiPOST('Kasirgeneral/pegawaikas', null, hasil => {
      var kab = '<option value="all">ALL</option>';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        kab += '<option value="' + a[i]['id_user'] + '">' + a[i]['nama'] + '</option>';
      }
      document.getElementById('id_userpaid').innerHTML = kab;
    });
  }

  // $(document).on("click", ".cetakkwitansi", function() {
  function lihatlaporanpendapatanrs() {
    var tglawal = $("#tglawal").val();
    var tglakhir = $("#tglakhir").val();
    var id_jenis_pembayaran_laporan = $("#id_jenis_pembayaran_laporan").val();
    var id_pembayaran_laporan = $("#id_pembayaran_laporan").val();
    var id_userpaid = $("#id_userpaid").val();


    var tglawal_shift1 = $("#tglawal_shift1").is(":checked") ? "true" : "false";
    // var tglawal_shift1 = $('#tglawal_shift1:checked').val();
    var tglawal_shift2 = $("#tglawal_shift2").is(":checked") ? "true" : "false";
    var tglawal_shift3 = $("#tglawal_shift3").is(":checked") ? "true" : "false";

    var tglakhir_shift1 = $("#tglakhir_shift1").is(":checked") ? "true" : "false";
    var tglakhir_shift2 = $("#tglakhir_shift2").is(":checked") ? "true" : "false";
    var tglakhir_shift3 = $("#tglakhir_shift3").is(":checked") ? "true" : "false";

    var param = {
      tglawal: tglawal,
      tglakhir: tglakhir,
      id_jenis_pembayaran_laporan: id_jenis_pembayaran_laporan,
      id_pembayaran_laporan: id_pembayaran_laporan,
      tglawal_shift1: tglawal_shift1,
      tglawal_shift2: tglawal_shift2,
      tglawal_shift3: tglawal_shift3,
      tglakhir_shift1: tglakhir_shift1,
      tglakhir_shift2: tglakhir_shift2,
      tglakhir_shift3: tglakhir_shift3,
      id_userpaid
    };
    newTabPOST('API/Kasirgeneral/laporanpendapatanrs', param);
    return;
  };

  $('#IGDmodal_lap_pendapatan').on('shown.bs.modal', function() {

  })
</script>