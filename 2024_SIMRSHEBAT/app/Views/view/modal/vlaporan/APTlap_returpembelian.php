<?php 
  date_default_timezone_set("Asia/Jakarta");
  $nowday = date('Y-m-d'); 
?>
<div class="content modal fade" id="APTmodal_lap_returpembelian">
  <div class="container-fluid ">
    <div class="row">
      
      <div class="col-md-12">
        <div class="form-group">
          <div>
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="card-header">
                  <h5>Laporan Retur Barang Masuk
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  </button>
                  </h5>
                </div>
                <div class="modal-body">
                  <div class="row" >
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="APTlap_returbrangmasuk_tglawal">Dimulai Tgl.</label>
                        <input type="date" class="form-control form-control-sm" id="APTlap_returbrangmasuk_tglawal">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="APTlap_returbrangmasuk_tglkedua">Sampai Tgl.</label>
                        <input type="date" class="form-control form-control-sm" id="APTlap_returbrangmasuk_tglkedua">
                      </div>
                    </div>
                  </div>
                  <hr class="p-0">
                  <p class="lead mb-0">
                    <button type="button" class="btn btn-xs btn-info" onclick="laporanreturbarangmasuk()"><i class="fa fa-file"></i> Tampilkan</button>
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

$("#APTmodal_lap_returpembelian").modal({backdrop: "static"});
$('#APTmodal_lap_returpembelian').on('shown.bs.modal', function () { 
$("#APTlap_returbrangmasuk_tglawal").val(nowday);
$("#APTlap_returbrangmasuk_tglkedua").val(nowday);
});

//toastr.info("*) Laporan yang ditampilkan merupakan Laporan yang Sudah Terverifikasi Oleh Keuangan.");

function laporanreturbarangmasuk() {
  var param = {
    tglawal   : $("#APTlap_returbrangmasuk_tglawal").val(),
    tglakhir  : $("#APTlap_returbrangmasuk_tglkedua").val(),
    username  : user['nama_pegawai']
  };
  
  newTabPOST('API/Laporan/LaporanReturBarangMasuk', param);
  return;
}

</script>