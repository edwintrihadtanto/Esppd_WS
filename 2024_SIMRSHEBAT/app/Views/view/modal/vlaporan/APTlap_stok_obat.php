<?php $nowday       = date('Y-m-d'); ?>
<div class="content modal fade" id="APTmodal_lap_stokObat">
  <div class="container-fluid ">
    <div class="row">
      
      <div class="col-md-12">
        <div class="form-group">
          <div>
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="card-header">
                  <h5>Laporan Stok Obat Per Unit Depo
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  </button>
                  </h5>
                </div>
                <div class="modal-body">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="APTlap_stokObat">Unit Depo :</label>
                      <select class="form-control form-control-xs" id="APTlap_stokObat" name="APTlap_stokObat"></select>
                    </div>
                  </div>
                  <hr>
                  <p class="lead mb-0">
                    <button type="button" class="btn btn-xs btn-info" onclick="laporanstokobat()"><i class="fa fa-file"></i> Tampilkan</button>
                  </p>
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

$("#APTmodal_lap_stokObat").modal({backdrop: "static"});
$('#APTmodal_lap_stokObat').on('shown.bs.modal', function () { 
});
var nowday = "<?php echo $nowday ?>";

APTlap_unit();

function APTlap_unit() {
  apiPOST('Apotek/getUnitDepoFarmasi', {id_unit : 0}, hasil => {
    var data = hasil['data'];
    var unit = '';
      unit += '<option value="0">Tentukan Unit Depo Farmasi</option>';
    for (var i = 0; i < data.length; i++) {
      unit += '<option value="'+ data[i]['id_unit'] +'">'+ data[i]['nama_unit'].toUpperCase()+'</option>';
    }
    document.getElementById('APTlap_stokObat').innerHTML = unit;
  });
}

function laporanstokobat() {
  var param = {
    depo      : $("#APTlap_stokObat").val()
  };
    
  newTabPOST('API/Laporan/laporanstokobat', param);
  return;
}

</script>