<div class="content modal fade" id="LABmodal_lap_kunj">
  <div class="container-fluid ">
    <div class="row">
      
      <div class="col-md-12">
        <div class="form-group">
          <div>
            <div class="modal-dialog">
              <div class="modal-content" style="overflow: auto;">                
                <div class="card-header">
                  <h5>Laporan Kunjungan Pasien Laboratorium
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  </button>
                  </h5>
                </div>
                <div class="modal-body">
                  <div class="row" >
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Tgl. Awal</label>
                        <input type="date" name="tglawal" id="tglawal" class="form-control form-control-sm">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Tgl. Akhir</label>
                        <input type="date" name="tglakhir" id="tglakhir" class="form-control form-control-sm">
                      </div>
                    </div>
                  </div>
                  <p class="lead mb-0"><button type="button" onclick="lap_kunjungan_lab()" class="btn btn-sm btn-info"><i class="fa fa-save"></i> Cari</button></p>
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

$("#LABmodal_lap_kunj").modal({backdrop: "static"});
$('#LABmodal_lap_kunj').on('shown.bs.modal', function () {

})

function lap_kunjungan_lab() {
    var tglawal = $("#tglawal").val();
    var tglakhir = $("#tglakhir").val();
    // alert('awal'+tglawal+'akhir'+tglakhir);
    // exit();
    var param = {
      tglawal: tglawal,
      tglakhir: tglakhir
    };
    newTabPOST('API/Laporan/laporan_kunjungan_lab', param);
    return;
  };
</script>