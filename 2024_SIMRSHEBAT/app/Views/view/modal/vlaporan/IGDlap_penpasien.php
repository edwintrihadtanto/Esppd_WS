<div class="content modal fade" id="IGDmodal_lap_penpasien">
  <div class="container-fluid ">
    <div class="row">
      
      <div class="col-md-12">
        <div class="form-group">
          <div>
            <div class="modal-dialog">
              <div class="modal-content" style="overflow: auto;">
                <div class="card-header">
                  <h5>Laporan Penerimaan Pasien
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
                        <input type="date" class="form-control form-control-sm">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Tgl. Akhir</label>
                        <input type="date" class="form-control form-control-sm">
                      </div>
                    </div>
                  </div>
                  <p class="lead mb-0"><button type="button" class="btn btn-sm btn-info"><i class="fa fa-save"></i> Cari</button></p>
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
$('#loading_IGDmodal_lap_penpasien').hide();
$("#IGDmodal_lap_penpasien").modal({backdrop: "static"});
$('#IGDmodal_lap_penpasien').on('shown.bs.modal', function () {

})
</script>