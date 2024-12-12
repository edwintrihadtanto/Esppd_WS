<?php $nowday       = date('Y-m-d'); ?>
<div class="content modal fade" id="SetupUserModulFar">
  <div class="container-fluid ">
    <div class="row">
      
      <div class="col-md-12">
        <div class="form-group">
          <div>
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="card-header">
                  <h5>Konfigurasi Modul Farmasi
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  </button>
                  </h5>
                </div>
                <div class="modal-body">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="modulfar_aktif">Unit Depo :</label>
                      <select class="form-control form-control-xs" id="modulfar_aktif" name="modulfar_aktif"></select>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="modulfar_milik">Kepemilikan Obat:</label>
                      <select class="form-control form-control-xs" id="modulfar_milik" name="modulfar_milik"></select>
                    </div>
                  </div>
                  <p class="lead mb-0">
                    <button type="button" class="btn btn-xs btn-success" onclick="save()"><i class="fa fa-save"></i> Simpan</button>
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

$("#SetupUserModulFar").modal({backdrop: "static"});
$('#SetupUserModulFar').on('shown.bs.modal', function () { 
});
var nowday = "<?php echo $nowday ?>";

module_far();

function module_far() {
  apiPOST('Apotek/getUnitDepoFarmasi', {id_unit : 0}, hasil => {
    var data = hasil['data'];
    var far = '';
      far += '<option value="0">Unit Depo Farmasi</option>';
    for (var i = 0; i < data.length; i++) {
      far += '<option value="'+ data[i]['id_unit'] +'">'+ data[i]['nama_unit'].toUpperCase()+'</option>';
    }
    document.getElementById('modulfar_aktif').innerHTML = far;
    $("#modulfar_aktif").val(user['id_far']);
  });

  apiPOST('Apotek/getKepemilikanObat', null, hasil => {
    var data  = hasil['data'];
    var milik = '';
      milik += '<option value="0">Kepemilikan Obat Aktif</option>';
    for (var i = 0; i < data.length; i++) {
      milik += '<option value="'+ data[i]['kd_milik'] +'">'+ data[i]['milik'].toUpperCase()+'</option>';
    }
    document.getElementById('modulfar_milik').innerHTML = milik;
    $("#modulfar_milik").val(user['kepemilikan_obat']);
  });
}

function save(){
    var param = {
        iduser          : user['id_user'],
        module_far      : document.getElementById('modulfar_aktif').value,
        modulfar_milik  : document.getElementById('modulfar_milik').value
    }
    apiPOST('Setup/savemodFar', param, hasil => {
        
        $('#SetupUserModulFar').modal('hide');
        logout();
    });
}

</script>