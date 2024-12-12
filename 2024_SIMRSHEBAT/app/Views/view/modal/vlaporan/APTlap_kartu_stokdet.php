<?php 
  date_default_timezone_set("Asia/Jakarta");
  $nowday = date('Y-m-d'); 
?>
<div class="content modal fade" id="APTmodal_lap_kartu_stokdet">
  <div class="container-fluid ">
    <div class="row">
      
      <div class="col-md-12">
        <div class="form-group">
          <div>
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="card-header">
                  <h5>Laporan Kartu Stok Detail
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  </button>
                  </h5>
                </div>
                <div class="modal-body">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="APTlap_kartu_stokdet_depo">Unit Farmasi :</label>
                      <select class="form-control form-control-xs" id="APTlap_kartu_stokdet_depo" name="APTlap_kartu_stokdet_depo"></select>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="APTlap_kartu_stokdet_nmobat">Pencarian Nama Obat:</label>
                      <input type="search" class="form-control form-control-xs" id="APTlap_kartu_stokdet_nmobat" name="APTlap_kartu_stokdet_nmobat" autocomplete="off">
                    </div>
                  </div>
                  <div class="row" >
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="APTlap_kartu_stokdet_reseptglawal">Dimulai Tgl.</label>
                        <input type="date" class="form-control form-control-sm" id="APTlap_kartu_stokdet_reseptglawal">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="APTlap_kartu_stokdet_reseptglkedua">Sampai Tgl.</label>
                        <input type="date" class="form-control form-control-sm" id="APTlap_kartu_stokdet_reseptglkedua">
                      </div>
                    </div>
                  </div>
                  <hr class="p-0">
                  <p class="lead mb-0">
                    <button type="button" class="btn btn-xs btn-info" onclick="show_kartu_stokdet()"><i class="fa fa-file"></i> Tampilkan</button>
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
var kd_produkObat;

$("#APTmodal_lap_kartu_stokdet").modal({backdrop: "static"});
$('#APTmodal_lap_kartu_stokdet').on('shown.bs.modal', function () { 
$("#APTlap_kartu_stokdet_reseptglawal").val(nowday);
$("#APTlap_kartu_stokdet_reseptglkedua").val(nowday);
});

APTlap_unit();
// toastr.info("*) Laporan yang ditampilkan merupakan Laporan Penjualan Resep Obat yang sudah Dilayani dan Sudah Tutup Transaksi");

function APTlap_unit() {
  apiPOST('Apotek/getUnitDepoFarmasi_Tok', null, hasil => {
    var data = hasil['data'];
    var unit = '';
      unit += '<option value="0">Tentukan Unit Farmasi</option>';
    for (var i = 0; i < data.length; i++) {
      unit += '<option value="'+ data[i]['id_unit'] +'">'+ data[i]['nama_unit'].toUpperCase()+'</option>';
    }
    document.getElementById('APTlap_kartu_stokdet_depo').innerHTML = unit;
  });

  var param = {
    obatcari: document.getElementById("APTlap_kartu_stokdet_nmobat").value,
  };
  
  kd_produkObat = new AutoComplete("APTlap_kartu_stokdet_nmobat");
  apiPOST('Apotek/getObat_eresep', param, hasil => {
    if (hasil !== null) {
      var list = hasil['data'];
      list.forEach(baru => {
        kd_produkObat.addData(baru['kd_obat'], baru['nama_obat']);
      });
    }
  });
}

function show_kartu_stokdet() {
  var depo    = $("#APTlap_kartu_stokdet_depo").val();
  var nm_obt  = $("#APTlap_kartu_stokdet_nmobat").val();
  if ((depo > 0)||(nm_obt != '')){

    var param = {
      tglawal   : $("#APTlap_kartu_stokdet_reseptglawal").val(),
      tglakhir  : $("#APTlap_kartu_stokdet_reseptglkedua").val(),
      depo      : depo,
      username  : user['nama_pegawai'],
      kd_prd    : kd_produkObat.getValue()
    };
    
    newTabPOST('API/Apotek/LaporanKartuStokDetail', param);
    return;

  }else{

    toastr.error("Tentukan Unit Terlebih Dahulu / Cari Obat Dahulu");
    $("#APTlap_kartu_stokdet_depo").trigger('focus');
  }
}

</script>