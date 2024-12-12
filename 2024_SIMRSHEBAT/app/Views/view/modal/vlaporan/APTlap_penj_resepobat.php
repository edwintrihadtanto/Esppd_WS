<?php 
  date_default_timezone_set("Asia/Jakarta");
  $nowday = date('Y-m-d'); 
?>
<div class="content modal fade" id="APTmodal_lap_penj_resep">
  <div class="container-fluid ">
    <div class="row">
      
      <div class="col-md-12">
        <div class="form-group">
          <div>
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="card-header">
                  <h5>Laporan Penjualan dan Retur Resep Obat
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  </button>
                  </h5>
                </div>
                <div class="modal-body">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="APTlap_lap_penj_resep_unit">Unit Farmasi :</label>
                      <select class="form-control form-control-xs" id="APTlap_lap_penj_resep_unit" name="APTlap_lap_penj_resep_unit"></select>
                    </div>
                  </div>
                  <div class="row" >
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="APTlap_lap_penj_reseptglawal">Dimulai Tgl.</label>
                        <input type="date" class="form-control form-control-sm" id="APTlap_lap_penj_reseptglawal">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="APTlap_lap_penj_reseptglkedua">Sampai Tgl.</label>
                        <input type="date" class="form-control form-control-sm" id="APTlap_lap_penj_reseptglkedua">
                      </div>
                    </div>
                  </div>
                  <hr class="p-0">
                  <p class="lead mb-0">
                    <button type="button" class="btn btn-xs btn-info" onclick="laporanpenjualanresepobat()"><i class="fa fa-file"></i> Tampilkan</button>
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
var nowday = "<?php echo $nowday ?>";

$("#APTmodal_lap_penj_resep").modal({backdrop: "static"});
$('#APTmodal_lap_penj_resep').on('shown.bs.modal', function () { 
$("#APTlap_lap_penj_reseptglawal").val(nowday);
$("#APTlap_lap_penj_reseptglkedua").val(nowday);
});

APTlap_unit();
toastr.info("*) Laporan yang ditampilkan merupakan Laporan Penjualan dan Retur Resep Obat yang sudah Dilayani dan Sudah Tutup Transaksi");

function APTlap_unit() {
  apiPOST('Apotek/getUnitDepoFarmasi_Tok', null, hasil => {
    var data = hasil['data'];
    var unit = '';
      unit += '<option value="0">Tentukan Unit Farmasi</option>';
    for (var i = 0; i < data.length; i++) {
      unit += '<option value="'+ data[i]['id_unit'] +'">'+ data[i]['nama_unit'].toUpperCase()+'</option>';
    }
    document.getElementById('APTlap_lap_penj_resep_unit').innerHTML = unit;
  });
}

function laporanpenjualanresepobat() {
  var depo = $("#APTlap_lap_penj_resep_unit").val();
  if (depo > 0){

    var param = {
      tglawal   : $("#APTlap_lap_penj_reseptglawal").val(),
      tglakhir  : $("#APTlap_lap_penj_reseptglkedua").val(),
      depo      : depo,
      username  : user['nama_pegawai']
    };
    
    newTabPOST('API/Apotek/LaporanPenjualanObat', param);
    return;

  }else{

    toastr.error("Tentukan Unit Terlebih Dahulu");
    $("#APTlap_lap_penj_resep_unit").trigger('focus');
  }
}

</script>