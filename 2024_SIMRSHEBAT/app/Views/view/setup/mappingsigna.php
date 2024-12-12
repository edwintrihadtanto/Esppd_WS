<div class="col-md-12 p-2">
  <div class="card card-outline">
    <div class="overlay-wrapper" id="loading_setup_mappingsigna">
      <div class="overlay dark">
        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
      </div>
    </div>
    
    <div class="card-body p-1" style="max-height: 500px; overflow: auto;">
        <div class="card" style="box-shadow: 0 0 3px #343a40; margin-bottom: 0;">
        <div>
          <div class="card-header p-1 darkgrey-custom">
            <div class="row">
                <div class="col-sm-auto">
                    <button type="button" onclick='mappingsigna_showDetail();' class="btn bg-gradient-secondary btn-xs"><i class="fas fa-plus"> Tambah Signa</i>
                </div>
				<div class="col-sm-auto">
					<form method="post" enctype="multipart/form-data">
					  Select File to upload:
					  <input type="file" name="fileToUploadMappingSigna" id="fileToUploadMappingSigna" multiple accept=".csv">
					  <button type="button" onclick="importMappingSigna()" class="btn bg-gradient-secondary btn-xs"><i class="fas fa-file"></i> Import Obat</i></button>
					</form>                    
                </div>
            </div>
			
            <!-- END LETAK BUTTON -->            
          </div>
        </div>
        </div>

        <div class="row p-2">
            <div class="col-sm-2">
                <label>Id Signa</label>
                <input type="text"  id="mappingsigna_id_signa" class="form-control form-control-xs" placeholder="Otomatis" disabled="true">
            </div>
            <div class="col-sm-9">
                <label>Nama Signa</label>
                <input type="text"  id="mappingsigna_nama_signa" class="form-control form-control-xs" disabled="true">
            </div>
            <div class="col-sm-1">
                <label>&nbsp;</label>
                <button type="button" onclick='mappingsigna_addeditSigna();' class="btn bg-gradient-warning btn-xs" id="mappingsigna_addedit">
            </div>
        </div>
        <div class="row m-1">
            <div class="col">
                <table
                    id="list_mapping_signa"
                    data-single-select="true"
                    data-click-to-select="true"
                    data-sticky-header="true"
                    data-header-style="headerStyleLookupListSetupMappingSigna"
                    data-row-style="rowStyleLookupListSetupMappingSigna"
                    data-pagination="true"
                    data-pagination-parts="['pageInfo', 'pageList']"
                    data-search="true"
                    class="table-sm">
                  <thead>
                    <tr>
                      <th data-field="id_signa" data-sortable="true" data-width="20">ID Signa</th>
                      <th data-field="signa" data-sortable="true">Nama Signa</th>
                      <th data-field="status" data-width="30">Aktif</th>
                    </tr>
                  </thead>
                </table>
            </div>
        </div>
    </div>

  </div>  
</div>

<script>
    document.getElementById('loading_setup_mappingsigna').style.height = document.documentElement.clientHeight;
    var mappingsigna_Carilist_mapping_signa = false;
    var idSignaSetupMappingSIgna = '';
    var lastSelectedRowSetupMappingSigna = null;
    var proses = '';
    document.getElementById('mappingsigna_addedit').style.display = 'none'
    $('#list_mapping_signa').bootstrapTable({
        onClickRow: (row, element, field)=>{
            if(row['list_mapping_signa_id_signa'] == idSignaSetupMappingSIgna){
               mappingsigna_hideDetail();
            }else{
               mappingsigna_showDetail(row, element[0]);
            }
        }
    });
    
    mappingsigna_loaddata();
    
    function mappingsigna_loaddata(){
        apiPOST('Setup/getListMappingSigna', {}, hasil => {
            if(hasil !== null){
                $('#list_mapping_signa').bootstrapTable('append', hasil['data']);
            }
        }).then(value => {
            mappingsigna_Carilist_mapping_signa = true;
            selesaiLoadingAwalSetupMappingSigna();
        });
    }

    function selesaiLoadingAwalSetupMappingSigna(){
        if(mappingsigna_Carilist_mapping_signa){
            document.getElementById('loading_setup_mappingsigna').style.display = 'none';
        }
    }
    
    function headerStyleLookupListSetupMappingSigna(column){
        return {
            css: {
                background: '#a8d4da',
                color: 'black',
                border: '2px solid black',
                padding: '0px'
            }
        };
    }
    
    function rowStyleLookupListSetupMappingSigna(row, index){
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
    
    function mappingsigna_showDetail(data = null, parent = null){
        if(data == null & parent == null){            
            setDisabeledSetupMappingSigna(false);
            document.getElementById('mappingsigna_id_signa').value      = '';
            document.getElementById('mappingsigna_nama_signa').value    = '';

        }else{
            if(lastSelectedRowSetupMappingSigna != null){
                mappingsigna_hideDetail();
            }
            var anaks = parent.childNodes;
            anaks.forEach(anak=>{
                if (localStorage.getItem("mode") == "dark-theme") {
                    anak.style.background = 'transparant';
                }else{
                    anak.style.background = 'red';
                }
            });
            lastSelectedRowSetupMappingSigna = parent;
            idSignaSetupMappingSIgna = data['id_signa'];
            document.getElementById('mappingsigna_id_signa').value = data['id_signa'];
            document.getElementById('mappingsigna_nama_signa').value = data['signa'];

            
            setDisabeledSetupMappingSigna(true);
        }
    }
    
    function mappingsigna_hideDetail(){
        var anaks = lastSelectedRowSetupMappingSigna.childNodes;
        if(anaks != null){
            anaks.forEach(anak=>{
                if (localStorage.getItem("mode") == "dark-theme") {
                    anak.style.background = 'transparant';
                }else{
                    anak.style.background = 'white';
                }
            });
        }
        idSignaSetupMappingSIgna = '';
        lastSelectedRowSetupMappingSigna = null;
        document.getElementById('mappingsigna_id_signa').value      = '';
        document.getElementById('mappingsigna_nama_signa').value    = '';
        
        
        setDisabeledSetupMappingSigna(true);
    }
    
    function setDisabeledSetupMappingSigna(flag){
        document.getElementById('mappingsigna_id_signa').disabled   = flag;
        
        document.getElementById('mappingsigna_addedit').style.display = 'block';
        //document.getElementById('mappingsigna_addedit').innerHTML("<i class='fas fa-save'></i> Simpan");
        if (flag == true){
            document.getElementById('mappingsigna_nama_signa').disabled = false;
            $('#mappingsigna_addedit').html("<i class='fas fa-edit'></i> Edit");
            proses = flag;
        }else{
            document.getElementById('mappingsigna_nama_signa').disabled = flag;
            $('#mappingsigna_addedit').html("<i class='fas fa-save'></i> Simpan");
            proses = flag;
        }
    }
    
    function mappingsigna_addeditSigna(){
        document.getElementById('loading_setup_mappingsigna').style.display = 'block';
        var param = {
          proses    : proses,
          id_signa  : document.getElementById("mappingsigna_id_signa").value,
          signa     : document.getElementById("mappingsigna_nama_signa").value,
          user      : user['id_user'],
        };

        apiPOST('Setup/mappingsigna_addeditSigna', param, hasil => {
          if (hasil !== null) {
            document.getElementById('loading_setup_mappingsigna').style.display = 'none';
            $('#list_mapping_signa').bootstrapTable('removeAll');
            mappingsigna_loaddata();
          }
        });
    }
	
	function importMappingSigna(){
		var taxtarray;	
		var input= document.getElementById('fileToUploadMappingSigna');
		var berkas = input.files[0];
		
		var reader = new FileReader();
		var content = reader.readAsText(berkas);
		reader.onload = function (event) {
		  var text = event.target.result; 
		  taxtarray=csvToArrayMappingSigna(text);
		  apiPOST('Setup/importMappingSigna', taxtarray, hasil => {
			if (hasil !== null) {
            
            }
		  });
		  // console.log(taxtarray);
		};		
	}
	
	function csvToArrayMappingSigna(str,delimiter=";"){
		var head = str.slice(0, str.indexOf("\n")).split(delimiter);
		var rows = str.slice(str.indexOf("\n") + 1).split("\r\n");
		const arr = rows.map(function (row) {
			const values = row.split(delimiter);
			const el = head.reduce(function (object, header, index) {
			  object[header] = values[index];
			  return object;
			}, {});
			return el;
		});

      // return the array
		return arr;
	}
	
</script>