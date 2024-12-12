<?php
  $data = json_decode($_GET['data']);
  $nowday       = str_replace('"','', json_encode($data->nowdayOrdEresep));
  $tglkunj      = str_replace('"','', json_encode($data->tgl_kunjOrdEresep));
  //$tglkunj      = date_format(date_create($tglkunjungan), 'd-M-Y'); //FORMAT TGL 02-Feb-2023
  $id_kunj      = str_replace('"','', json_encode($data->id_kunjOrdEresep));
  $norm         = str_replace('"','', json_encode($data->no_rmOrdEresep));
  $nmapasien    = str_replace('"','', json_encode($data->namaOrdEresep));
  $alamat       = str_replace('"','', json_encode($data->alamatOrdEresep));
  $umur         = str_replace('"','', json_encode($data->umurOrdEresep));
  $penjamin     = str_replace('"','', json_encode($data->penjaminOrdEresep));
  $sep          = str_replace('"','', json_encode($data->sepOrdEresep));
  $telp         = str_replace('"','', json_encode($data->telpOrdEresep));
  $id_unit      = str_replace('"','', json_encode($data->idunitOrdEresep));
  $unit         = str_replace('"','', json_encode($data->unitOrdEresep));  
  $stsrekammedis = str_replace('"','', json_encode($data->eresepRWJOrdEresep));
  $rekammedis    = str_replace('"','', json_encode($data->rekammedis));  
  $rekammedis_prev = str_replace('"','', json_encode($data->rekammedis_prev));  

?>
<div class="content modal fade" id="modal_erm_eresepGab">
  <div class="container-fluid">
    <div class="modal-dialog modal-xxl" style="min-width: 100%;">
      
      <div class="modal-content" style="overflow: auto;">
        <!-- <div class="overlay-wrapper" id="loading_modal_erm_eresepGab">
          <div class="overlay dark">
            <i class="fas fa-3x fa-sync-alt fa-spin"></i>            
          </div>
        </div> -->
        <div class="modal-body p-1" id="showIframeEresep"></div>
      </div>

    </div>
  </div>
</div>

<script type="text/javascript">
sessionStorage.clear();

var id_kunjungan  = "<?php echo $id_kunj; ?>";
var nowday        = "<?php echo $nowday; ?>";
var tglkunj       = "<?php echo $tglkunj; ?>";
var norm          = "<?php echo $norm; ?>";
var nmapasien     = "<?php echo $nmapasien; ?>";
var alamat        = "<?php echo $alamat; ?>";
var umur          = "<?php echo $umur; ?>";
// var penjamin  = "<?php echo $penjamin; ?>";
// var sep       = "<?php echo $sep; ?>";
// var telp      = "<?php echo $telp; ?>";
var id_unit       = "<?php echo $id_unit; ?>";
var unit          = "<?php echo $unit; ?>";
var stsrekammedis = "<?php echo $stsrekammedis; ?>";
var rekammedis    = "<?php echo $rekammedis; ?>";
var rekammedis_prev = "<?php echo $rekammedis_prev; ?>";
var user          = 0;

$(document).ready(function() {
  showUp_erm_eresepGab();
});

function showUp_erm_eresepGab(){  
  //$('#modal_erm_eresepGab').modal('show');
  $("#modal_erm_eresepGab").modal({backdrop: "static"});
  $('#modal_erm_eresepGab').on('shown.bs.modal', function() { });
  var showeresep='<iframe src="http://192.168.1.78/eresepIRNA/direct?kduser='+user+'&kd_pasien='+norm+'&kdunit='+id_unit+'&tgl_kunj='+tglkunj+'&eresep=ERM_IRNA'+'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" style="position: relative;width: 100%;height: 800px;border: none;"></iframe>';
  
  document.getElementById("showIframeEresep").innerHTML = showeresep;
}

</script>