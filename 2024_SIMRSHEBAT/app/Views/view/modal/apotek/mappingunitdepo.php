<?php
  $data     = json_decode($_GET['data']);
  $nowday   = date('Y-m-d');
  $idmapping  = str_replace('"','', json_encode($data->Vmappingdepounit_idmapping));
  $id_unit    = str_replace('"','', json_encode($data->Vmappingdepounit_idunit));
  $iddepotuj  = str_replace('"','', json_encode($data->Vmappingdepounit_iddepotuj));
?>
<div class="content modal fade" id="mappingunitdepo">
  <div class="container-fluid">
    <div class="modal-dialog">
      
      <div class="modal-content">
        <div class="overlay-wrapper" id="loading_mappingunitdepo">
          <div class="overlay dark">
            <i class="fas fa-3x fa-sync-alt fa-spin"></i>            
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-12">
            <div class="card-header p-1 darkgrey-custom">
              <h3 class="card-title">Mapping Unit Depo Baru</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color: black;">×</span>
              </button>            
            </div>
            <div class="card-body p-2">
              <div class="row row-custom">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Poli</label>
                      <input type="number" class="form-control form-control-xs d-none" id="mappingunitdepo_id"></select>
                      <select class="form-control form-control-xs" id="mappingunitdepo_poli"></select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Depo Tujuan</label>
                      <select class="form-control form-control-xs" id="mappingunitdepo_depotuj"></select>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>

        <div class="modal-footer p-2">
          <button class="btn btn-xs bg-gradient-danger" onclick="hapusmappingunitdepo()"><i class="fa fa-times"></i> Hapus</button>
          <button class="btn btn-xs bg-gradient-info" onclick="savemappingunitdepo()"><i class="fa fa-save"></i> Simpan</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
var id_unit     = "<?php echo $id_unit; ?>";
var iddepotuj   = "<?php echo $iddepotuj; ?>";
var idmapping   = "<?php echo $idmapping; ?>";

$(document).ready(function() {
  showUp_mappingunitdepo();
  $('#loading_mappingunitdepo').hide();
  
  if (id_unit > 0){
    document.getElementById('mappingunitdepo_poli').disabled = 'true';
  }
});

function showUp_mappingunitdepo(){ 
  $("#mappingunitdepo").modal({backdrop: "static"});
  $('#mappingunitdepo').on('shown.bs.modal', function() { });

  apiPOST('Apotek/getUnitAPT', null, hasil => {
    var data = hasil['data'];
    var unit = '';
      unit += '<option value="">-- Tentukan Poli --</option>';
    for (var i = 0; i < data.length; i++) {
      unit += '<option value="'+ data[i]['id_unit'] +'">'+ data[i]['nama_unit']+'</option>';
    }
    document.getElementById('mappingunitdepo_poli').innerHTML = unit;
    document.getElementById('mappingunitdepo_poli').value = id_unit;
  });

  apiPOST('Apotek/getUnitDepoFarmasi_Tok', null, hasil => {
      var data = hasil['data'];
      var unit = '';
        unit += '<option value="">-- Tentukan Depo Tujuan --</option>';
      for (var i = 0; i < data.length; i++) {
        unit += '<option value="'+ data[i]['id_unit'] +'">'+ data[i]['nama_unit']+'</option>';
      }
      document.getElementById('mappingunitdepo_depotuj').innerHTML = unit;
      document.getElementById('mappingunitdepo_depotuj').value = iddepotuj;
  });

  document.getElementById('mappingunitdepo_id').value = idmapping;
}

function keluar_mappingunitdepo() {
  $('#mappingunitdepo').modal('hide');
}

function savemappingunitdepo(){
  var param = {
    id_unit     : document.getElementById('mappingunitdepo_poli').value,
    id_depotuj  : document.getElementById('mappingunitdepo_depotuj').value,
  }
  apiPOST('Apotek/savemappingunitdepo', param, hasil => {
    setupmappingunitdepo_showdata();
  });
}

function hapusmappingunitdepo(){
  var param = {
    id_mapping  : document.getElementById('mappingunitdepo_id').value,
  }
  
  pertanyaan.fire({
    title             : 'Yakin di Hapus!!',
    html              : '<span>Unit yang dihapus akan mempengaruhi kinerja per<b>RESEP</b>an, lanjut <b>HAPUS</b> ?</span>',
    icon              : 'error',
    showCancelButton  : true,
    reverseButtons    : false,
    allowOutsideClick : false
  }).then((result) => {
    if (result.isConfirmed) {
      apiPOST('Apotek/hapusmappingunitdepo', param, hasil => {
        setupmappingunitdepo_showdata();
        keluar_mappingunitdepo();
      });
    }else if(result.dismiss === Swal.DismissReason.cancel){
      
    }
  })
}
</script>
