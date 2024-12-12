<div class="overlay-wrapper" id="loading_setup_unit">
    <div class="overlay">
      <i class="fas fa-3x fa-sync-alt fa-spin"></i>
    </div>
</div>
<div class="row m-2">
    <div class="col">
        <button id="add_setup_unit" type="button" onclick='showDetailSetupUnit();' class="btn bg-gradient-success btn-xs"><i class="fas fa-print"> Tambah</i>
    </div>
    <div class="col">
        <button id="edit_setup_unit" type="button" onclick='editSetupUnit();' class="btn bg-gradient-warning btn-xs" style="display: none;"><i class="fas fa-print"> Edit</i>
    </div>
    <div class="col">
        <button id="save_setup_unit" type="button" onclick='saveSetupUnit();' class="btn bg-gradient-success btn-xs" style="display: none;"><i class="fas fa-print"> Simpan</i>
    </div>
    <div class="col">
        <button id="cancel_setup_unit" type="button" onclick='cancelSetupUnit();' class="btn bg-gradient-danger btn-xs" style="display: none;"><i class="fas fa-print"> Batal</i>
    </div>
    <div class="col">
        <button id="delete_setup_unit" type="button" onclick='deleteSetupUnit();' class="btn bg-gradient-danger btn-xs" style="display: none;"><i class="fas fa-print"> Hapus</i>
    </div>
</div>
<div class="row m-2">
    <div class="col">
        <label>Nama Unit</label>
        <input type="text"  id="nama_unit_setup_unit" class="form-control form-control-xs" disabled="true">
    </div>
    <div class="col">
        <label>Mapping Unit BPJS</label>
        <input type="text"  id="bpjs_unit_setup_unit" class="form-control form-control-xs" disabled="true">
    </div>
    <div class="col">
        <label>Jenis Unit</label>
        <select class="form-control form-control-xs" id="jenis_unit_setup_unit" disabled="true"></select>
    </div>
    <div class="col">
        <label>Status</label><br>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="status_setup_unit" onchange="cekStatusSetupUnit();" disabled>
            <label class="form-check-label" for="status_setup_unit" id="label_status_setup_unit">Tidak Aktif</label>
        </div>
    </div>
</div>
<div class="row m-1">
    <div class="col">
        <table
            id="list_unit_setup_unit"
            data-single-select="true"
            data-click-to-select="true"
            data-sticky-header="true"
            data-header-style="headerStyleLookupListUnitSetupUnit"
            data-row-style="rowStyleLookupListUnitSetupUnit"
            data-pagination="true"
            data-pagination-parts="['pageInfo', 'pageList']"
            class="table-sm">
          <thead>
            <tr>
              <th data-field="id_unit" data-sortable="true">ID</th>
              <th data-field="nama_unit" data-sortable="true">Nama Unit</th>
              <th data-field="map_bpjs" data-sortable="true">Mapping Unit BPJS</th>
              <th data-field="deskripsi_jenis_unit" data-sortable="true">Jenis Unit</th>
              <th data-field="status" data-sortable="true">Status</th>
            </tr>
          </thead>
        </table>
    </div>
</div>

<script>
    document.getElementById('loading_setup_unit').style.height = document.documentElement.clientHeight;
    var cariListUnitSetupUnit = false;
    var cariListJenisUnitSetupUnit = false;
    var idUnitSetupUnit = '';
    var lastSelectedRowSetupUnit = null;
    
    $('#list_unit_setup_unit').bootstrapTable({
        onClickRow: (row, element, field)=>{
            if(row['id_unit'] == idUnitSetupUnit){
               hideDetailSetupUnit();
            }else{
               showDetailSetupUnit(row, element[0]);
            }
        }
    });
    
    apiPOST('Setup/getListUnit', {}, hasil => {
        if(hasil !== null){
            $('#list_unit_setup_unit').bootstrapTable('append', hasil['data']);
        }
    }).then(value => {
        cariListUnitSetupUnit = true;
        selesaiLoadingAwalSetupUnit();
    });
    
    apiPOST('Setup/getJenisListUnit', {}, hasil => {
        if(hasil !== null){
            var select = document.getElementById('jenis_unit_setup_unit');
            var listHasil = hasil['data'];
            
            listHasil.forEach(element=>{
                var opsi = document.createElement('option');
                opsi.value = element['jenis_unit'];
                opsi.innerHTML = element['deskripsi_jenis_unit'];
                
                select.appendChild(opsi);
            });
            
            select.value = '';
        }
    }).then(value => {
        cariListJenisUnitSetupUnit = true;
        selesaiLoadingAwalSetupUnit();
    });
    
    function selesaiLoadingAwalSetupUnit(){
        if(cariListUnitSetupUnit
            && cariListJenisUnitSetupUnit){
            document.getElementById('loading_setup_unit').style.display = 'none';
        }
    }
    
    function headerStyleLookupListUnitSetupUnit(column){
        return {
            css: {
                background: '#a8d4da',
                color: 'black',
                border: '2px solid black',
                padding: '0px'
            }
        };
    }
    
    function rowStyleLookupListUnitSetupUnit(row, index){
        if (localStorage.getItem("mode") == "dark-theme") {
            return {
                css: {
                    background: 'transparant',
                    border: '2px solid black',
                    padding: '2px'
                }
            };
        }else{
            return {
                css: {
                    background: 'white',
                    border: '2px solid black',
                    padding: '2px'
                }
            };   
        }
    }
    
    function showDetailSetupUnit(data = null, parent = null){
        if(data == null & parent == null){            
            setDisabeledSetupUnit(false);
        }else{
            if(lastSelectedRowSetupUnit != null){
                hideDetailSetupUnit();
            }
            var anaks = parent.childNodes;
            anaks.forEach(anak=>{
                anak.style.background = 'red';
            });
            lastSelectedRowSetupUnit = parent;
            idUnitSetupUnit = data['id_unit'];
            document.getElementById('nama_unit_setup_unit').value = data['nama_unit'];
            document.getElementById('bpjs_unit_setup_unit').value = data['map_bpjs'];
            document.getElementById('jenis_unit_setup_unit').value = data['jenis_unit'];
            document.getElementById('status_setup_unit').checked = data['aktif'] == 't';
            cekStatusSetupUnit();
            setDisabeledSetupUnit(true);
        }
    }
    
    function hideDetailSetupUnit(){
        var anaks = lastSelectedRowSetupUnit.childNodes;
        if(anaks != null){
            anaks.forEach(anak=>{
                anak.style.background = 'white';
            });
        }
        idUnitSetupUnit = '';
        lastSelectedRowSetupUnit = null;
        document.getElementById('nama_unit_setup_unit').value = '';
        document.getElementById('bpjs_unit_setup_unit').value = '';
        document.getElementById('jenis_unit_setup_unit').value = '';
        document.getElementById('status_setup_unit').checked = false;
        cekStatusSetupUnit();
        setDisabeledSetupUnit(true);
    }
    
    function setDisabeledSetupUnit(flag){
        document.getElementById('nama_unit_setup_unit').disabled = flag;
        document.getElementById('bpjs_unit_setup_unit').disabled = flag;
        document.getElementById('jenis_unit_setup_unit').disabled = flag;
        document.getElementById('status_setup_unit').disabled = flag;
    }
    
    function cekStatusSetupUnit(){
        if(document.getElementById('status_setup_unit').checked){
            document.getElementById('label_status_setup_unit').innerHTML = 'Aktif';
        }else{
            document.getElementById('label_status_setup_unit').innerHTML = 'Tidak Aktif';
        }
    }
</script>