<?php $nowday       = date('Y-m-d'); ?>
<div class="content modal fade" id="APTmodal_lap_expobat">
  <div class="container-fluid ">
    <div class="row">
      
      <div class="col-md-12">
        <div class="form-group">
          <div>
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="card-header">
                  <h5>Laporan Masa Expired Kersediaan Stok Obat
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  </button>
                  </h5>
                </div>
                <div class="modal-body">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="APTlap_expObat">Unit Depo :</label>
                      <select class="form-control form-control-xs" id="APTlap_expObat" name="APTlap_expObat"></select>
                    </div>
                  </div>
                  <div class="row" >
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="APTlap_expObattglawal">Dimulai Tgl. Expired</label>
                        <input type="date" class="form-control form-control-sm" id="APTlap_expObattglawal">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="APTlap_expObattglkedua">Sampai Tgl. Expired</label>
                        <input type="date" class="form-control form-control-sm" id="APTlap_expObattglkedua">
                      </div>
                    </div>
                  </div>
                  <hr>
                  <p class="lead mb-0">
                    <button type="button" class="btn btn-xs btn-info" onclick="LaporanExpiredObat()"><i class="fa fa-file"></i> Tampilkan</button>
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

$("#APTmodal_lap_expobat").modal({backdrop: "static"});
$('#APTmodal_lap_expobat').on('shown.bs.modal', function () { 
});
var nowday = "<?php echo $nowday ?>";

document.getElementById('APTlap_expObattglawal').value          = nowday;
document.getElementById('APTlap_expObattglkedua').value         = nowday;

// var APTlap_expObattglawal = "APTlap_expObattglawal";
// var APTlap_expObattglkedua = "APTlap_expObattglkedua";
// max_date(APTlap_expObattglawal);
// max_date(APTlap_expObattglkedua);

APTlap_unit();

function APTlap_unit() {
  apiPOST('Apotek/getUnitDepoFarmasi', {id_unit : 0}, hasil => {
    var data = hasil['data'];
    var unit = '';
      unit += '<option value="0">Tentukan Unit Depo Farmasi</option>';
    for (var i = 0; i < data.length; i++) {
      unit += '<option value="'+ data[i]['id_unit'] +'">'+ data[i]['nama_unit'].toUpperCase()+'</option>';
    }
    document.getElementById('APTlap_expObat').innerHTML = unit;
  });
}

function LaporanExpiredObat() {
  var depo = $("#APTlap_expObat").val();
  if (depo > 0){

  var param = {
    tglawal   : $("#APTlap_expObattglawal").val(),
    tglakhir  : $("#APTlap_expObattglkedua").val(),
    depo      : depo,
    username  : user['nama_pegawai']
  };
    
  newTabPOST('API/Laporan/LaporanExpiredObat', param);
  return;

  }else{
    toastr.error("Tentukan Unit Terlebih Dahulu");
    $("#APTlap_expObat").trigger('focus');
  }
}

</script>