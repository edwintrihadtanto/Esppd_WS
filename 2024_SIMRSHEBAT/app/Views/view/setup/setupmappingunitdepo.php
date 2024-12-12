<div class="col-md-12 p-2" id="setupmappingunitdepo">
  <div class="card card-outline card-default" style="margin-bottom:0;">
    
    <div class="card-body p-2 darkgrey-custom">
      <div class="row row-custom">
        <div class="col-sm-2">
          <div class="form-group">
            <label>Unit Farmasi</label>
            <select class="form-control form-control-xs" id="setupmappingunitdepo_farmasi" onchange="setupmappingunitdepo_showdata()"></select>
          </div>
        </div>
        
        <div class="col-sm-2">
          <div class="form-group">
            <label>Jumlah Data :</label>
            <select class="form-control form-control-xs" id="setupmappingunitdepo_jmlh" onchange="setupmappingunitdepo_showdata()">
              <option value="0">Tampilkan Semua</option>
              <option value="10">10 Data</option>
              <option value="20">20 Data</option>
              <option value="30">30 Data</option>
              <option value="50">50 Data</option>
              <option value="100">100 Data</option>
            </select>
          </div>
        </div>      
      </div>
    </div>

  </div>   
</div>


<div class="col-md-12 p-2" id="setupmappingunitdepo_kedua">
  <div class="card card-outline">
    <div class="overlay-wrapper" id="loading_setupmappingunitdepo">
      <div class="overlay">
        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
      </div>
    </div>  
    <div class="card-body p-1 uk-layar2" style="height: 76vh; max-height: 76vh; overflow: auto;">
      <div class="card" style="box-shadow: 0 0 3px #343a40; margin-bottom: 0;">
        <div>
          <div class="card-header p-1">
            <div class="row">
              <div class="col-md-12">
                <h6 class="hr6-custom"><i class="fas fa-heartbeat"></i> Daftar Mapping Unit Depo</h6>
              </div>
            </div>
            <button type="button" class="btn bg-gradient-info btn-xs" onclick="Vmappingdepounitplus()"> <i class="fas fa-plus"></i> Tambah Mapping Unit Depo</button>
          </div>
        </div>
      </div>

      <table id="setupmappingunitdepo_table" class="table table-striped table-sm choose" style="border-collapse: inherit;">
        <thead>
          <tr>
            <th width="15">#</th>
            <th width="30">Status</th>
            <th>Unit</th>
            <th>Depo</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>      
    </div>

  </div>  
</div>

<div class="contentVmappingdepounit"></div>

<script type="text/javascript">

apiPOST('Apotek/getUnitDepoFarmasi_Tok', null, hasil => {
    var data = hasil['data'];
    var unit = '';
      unit += '<option value="">-- Pilih Unit --</option>';
    for (var i = 0; i < data.length; i++) {
      unit += '<option value="'+ data[i]['id_unit'] +'">'+ data[i]['nama_unit']+'</option>';
    }
    document.getElementById('setupmappingunitdepo_farmasi').innerHTML = unit;
});

setupmappingunitdepo_showdata();

function setupmappingunitdepo_showdata(){  
    $('#loading_setupmappingunitdepo').show();
    var listParam = [];

    var param = {
        jmlh    : document.getElementById('setupmappingunitdepo_jmlh').value,
        idfar   : document.getElementById('setupmappingunitdepo_farmasi').value
    };

    apiPOST("Apotek/mappingunitdepo_showdata", param, hasil => {   
        $('#loading_setupmappingunitdepo').hide();
        $('#setupmappingunitdepo_table tbody').html('');

        if (hasil['data'] !== null) {
            
          var a = hasil['data'];
          if (a.length > 0){
            var Baris = "";
            for (var i = 0; i < a.length; i++) {
              var id_mapping        = a[i].id_mapping;  
              var id_unit           = a[i].id_unit;
              var namaunit          = a[i].namaunit;
              var depo_unit_tuj     = a[i].depo_unit_tuj;
              var namaunitfar       = a[i].namaunitfar;
              var status            = a[i].aktif;
              var no = i + 1;
              
              Baris += '<tr onclick="Vmappingdepounit('+"'"+id_mapping+"','"+id_unit+"','"+depo_unit_tuj+"'"+')">';
              Baris += '<td>'+no+'</td>';
              Baris += '<td>';
              
              if (status == 't'){
                Baris += '&nbsp;<div class="col-sm-1" style="display:contents;"><img src="<?= base_url('_assets/dist/img/checklist.png') ?>" width="20px" height="20px" title="Aktif"/></div>';
              }else{
                Baris += '&nbsp;<div class="col-sm-1" style="display:contents;"><img src="<?= base_url('_assets/dist/img/cancel.png') ?>" width="20px" height="20px" title="Tidak Aktif"/></div>';
              }

              Baris += '</td>';
              Baris += '<td>'+namaunit+'</td>';
              Baris += '<td>'+namaunitfar+'</td>';
              Baris += "</tr>";
            }
            $('#setupmappingunitdepo_table tbody').append(Baris);
          }else{
            toastr.error("Data tidak ditemukan");
            var Baris = '<tr>';  
                Baris += '<td colspan="4" align="center"><h6>Belum Ada Mapping<h6></td>';
                Baris += "</tr>";

            $('#setupmappingunitdepo_table tbody').append(Baris);
          }
        }

    });  
  
}

function Vmappingdepounit(id_mapping, id_unit, depo_unit_tuj){
    var json_data = {
        'Vmappingdepounit_idmapping' : id_mapping,
        'Vmappingdepounit_idunit'    : id_unit,
        'Vmappingdepounit_iddepotuj' : depo_unit_tuj
    };

    var data = JSON.stringify(json_data);
    switch(id_unit){
        case '4001':
            toastr.warning("Tidak Bisa di Rubah!!");
            return;
        case '4002':
            toastr.warning("Tidak Bisa di Rubah!!");
            return;
        case '4003':
            toastr.warning("Tidak Bisa di Rubah!!");
            return;
    }

    $('.contentVmappingdepounit').load('Apotek/addmappingdepo?data='+ data);
}

function Vmappingdepounitplus(){
    var json_data = {
        'Vmappingdepounit_idmapping'    : '',
        'Vmappingdepounit_idunit'       : '',
        'Vmappingdepounit_iddepotuj'    : ''
    };

    var data = JSON.stringify(json_data);
    $('.contentVmappingdepounit').load('Apotek/addmappingdepo?data='+ data);
}

</script>