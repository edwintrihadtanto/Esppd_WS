<?php
  $data = json_decode($_GET['data']);
  $eresepRWJ  = str_replace('"','', json_encode($data->eresepRWJ));
  $tabObat    = str_replace('"','', json_encode($data->tabObat));
  $stokObat   = str_replace('"','', json_encode($data->stokObat));
  $kdObat     = str_replace('"','', json_encode($data->kdObat));
?>
<div class="content modal fade" id="resepRWJ_expiredObat">
  <div class="container-fluid ">
    <div class="modal-dialog">
      <div class="overlay-wrapper" id="resepRWJ_expiredObat_loading">
        <div class="overlay">
          <i class="fas fa-3x fa-sync-alt fa-spin"></i>
        </div>
      </div>
      <h6 id="nm_function" style="display: none;"><?php echo $eresepRWJ; ?></h6>
      <div class="modal-content" style="overflow: auto;">
        <div class="modal-body p-1">
          <div class="row">
            <div class="col-sm-11 input-group">
              <input type="number" class="form-control form-control-xs" id="jumlahstok" value="<?php echo $stokObat; ?>">
            </div>
            <div class="col-sm-1">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
          </div>
          <div class="p-1">
            <table border="0" cellpadding="0" cellspacing="0" id="list_data_expiredObat" class="table table-striped table-bordered table-hover table-sm choose">
              <thead>
                <tr>
                  <th data-sortable="true" data-width="80">Expired Obat</th>
                  <th data-sortable="true" data-width="80">Stok</th>
                  <th>Jumlah</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
          
        </div>
        <div class="modal-footer p-1">
          <button class="btn btn-xs btn-success"><i class="fa fa-save"></i> Simpan</button>
        </div>
      </div>

    </div>
  </div>
</div>

<script type="text/javascript">
var tabAktif = "<?php echo $tabObat; ?>";
var kdObat = "<?php echo $kdObat; ?>";
var stokObat = "<?php echo $stokObat; ?>";

var nm = $("#nm_function").html();
$("#resepRWJ_expiredObat").modal({backdrop: "static"});
$('#resepRWJ_expiredObat').on('shown.bs.modal', function () {
  
});

document.getElementById('resepRWJ_expiredObat_loading').style.height = document.documentElement.clientHeight;
var cek_data = false;

resepRWJ_expiredObat();

function resepRWJ_expiredObat(){
    document.getElementById('resepRWJ_expiredObat_loading').style.display = 'block';
    var param ={
      kd_obat : kdObat,
      id_unit : idunit
    };
    apiPOST('Apotek/getExpObat', param, hasil => {
        if(hasil !== null){
            cek_data = true;
            loading();

            var ExpObat    = hasil['data'];
            for (var o = 0; o < ExpObat.length; o++) {
              var kd_obt    = ExpObat[o].kd_obat;
              var nm_obat   = ExpObat[o].nama_obat;
              var expired   = ExpObat[o].exp;
              var stok_unit = ExpObat[o].stok_unit;
             
              resepRWJ_expiredObat_data(kd_obt, nm_obat, expired, stok_unit);
            }
        }
    }).then(value => {
        loading();
    });
}

function resepRWJ_expiredObat_data(kd_obt, nm_obat, expired, stok_unit){
  var nomor = $('#list_data_expiredObat tbody tr').length + 1;  
  var Baris = '';
      Baris += '<tr>';
      Baris += "<td>";
      Baris += "<input style='text-align:left;' type='text' class='form-control form-control-xxs' name='resepRWJ_expiredObat_exp[]' value='" + expired + "' disabled>";
      Baris += "</td>";
      Baris += "<td><input style='text-align:center;' type='text' class='form-control form-control-xxs' name='resepRWJ_expiredObat_stok[]' value='" + stok_unit + "' disabled></td>";
      Baris += "<td>";
      Baris += "<input type='text' class='form-control form-control-xxs' name='resepRWJ_expiredObat_jmlh[]'";
      Baris += "</td>";
      Baris += "</tr>";

    $('#list_data_expiredObat tbody').append(Baris);
}

function loading(){
  if(cek_data){
      document.getElementById('resepRWJ_expiredObat_loading').style.display = 'none';
  }
}

function keluarresepRWJ_expiredObat() {
  $('#resepRWJ_expiredObat').modal('hide');
  $('.modal-backdrop').hide();
}

</script>