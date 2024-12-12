<div class="content modal fade" id="IGDmodal_lap_pendapatan">
  <div class="container-fluid ">
    <div class="row">

      <div class="col-md-12">
        <div class="form-group">
          <div>
            <div class="modal-dialog">
              <div class="modal-content" style="overflow: auto;">
                <div class="card-header">
                  <h5>Laporan Penerimaan Percomponent
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

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Tgl. Akhir</label>
                        <input type="text" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" id="tglakhir" name="tglakhir" class="form-control form-control-sm">
                      </div>
                    </div>
                   
                  </div>
                  <p class="lead mb-0"><button type="button" class="btn btn-sm btn-info" onclick="lihatlaporancomponenrspaid()"><i class="fa fa-save"></i> Cari</button></p>
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



  // $(document).on("click", ".cetakkwitansi", function() {
  function lihatlaporancomponenrspaid() {
    var tglawal = $("#tglawal").val();
    var tglakhir = $("#tglakhir").val();
    var param = {
      tglawal: tglawal,
      tglakhir: tglakhir
    };
    newTabPOST('API/Kasirgeneral/laporanpercomponen', param);
    return;
  };


</script>