<div class="col-md-12 p-2">
  <div class="card card-outline">
    <div class="overlay-wrapper" id="loading_setup_tarifprodukcomponent">
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
                    <button type="button" onclick='tarifprodukcomponent_showDetail();' class="btn bg-gradient-secondary btn-xs"><i class="fas fa-plus"> Tambah Tarif Produk Component</i>
                </div>
				<div class="col-sm-auto">
					<form method="post" enctype="multipart/form-data">
					  Select File to upload:
					  <input type="file" name="fileToUploadTarifprodukComponent" id="fileToUploadTarifprodukComponent" multiple accept=".csv">
					  <button type="button" onclick="importTarifprodukComponent()" class="btn bg-gradient-secondary btn-xs"><i class="fas fa-file"></i> Import Obat</i></button>
					</form>                    
                </div>
            </div>
            <!-- END LETAK BUTTON -->            
          </div>
        </div>
        </div>

        <div class="row p-2">
            <div class="col-sm-2">
                <label>Id Tarif</label>
                <select id="tarifprodukcomponent_idtarif" class="form-control form-control-xs" disabled="true"></select>
            </div>
            <div class="col-sm-2">
                <label>Jenis Component</label>
                <select id="tarifprodukcomponent_idjeniscomponent" class="form-control form-control-xs" disabled="true"></select>
            </div>
            <div class="col-sm-2">
                <label>Jenis Component Parent</label>
                <select id="tarifprodukcomponent_idjeniscomponentparent" class="form-control form-control-xs" disabled="true"></select>
            </div>
            <div class="col-sm-2">
                <label>Operator</label>
                <select id="tarifprodukcomponent_operator" class="form-control form-control-xs">
                    <option value="=">=</option>
                    <option value="*">*</option>
                </select>
            </div>
            <div class="col-sm-2">
                <label>Jumlah</label>
                <input type="number" name="tarifprodukcomponent_jumlah" id="tarifprodukcomponent_jumlah" class="form-control form-control-xs" disabled="true">
            </div>
            <div class="col-sm-2">
                <label>&nbsp;</label>
                <button type="button" onclick='tarifprodukcomponent_addeditTarifComponent();' class="btn bg-gradient-warning btn-xs" id="tarifprodukcomponent_addeditTarifComponent">
            </div>
        </div>
        <div class="row m-1">
            <div class="col">
                <table
                    id="list_data_tarifprodukcomponent"
                    data-single-select="true"
                    data-click-to-select="true"
                    data-sticky-header="true"
                    data-header-style="headerStyleLookupListSetupTarifProdukComponent"
                    data-row-style="rowStyleLookupListSetupTarifProdukComponent"
                    data-pagination="true"
                    data-pagination-parts="['pageInfo', 'pageList']"
                    data-search="true"
                    class="table-sm">
                  <thead>
                    <tr>
                        <th data-field="id_tarif" data-sortable="true" data-width="30">ID Tarif</th>
                        <th data-field="nama_produk" data-sortable="true">Produk</th>
                        <th data-field="nama_penjamin" data-sortable="true">Penjamin</th>
                        <th data-field="jenis_component" data-sortable="true">Jenis Component</th>
                        <th data-field="id_jenis_component_parent" data-sortable="true" data-width="30">Parent</th>
                        <th data-field="operator" data-sortable="true" data-width="30">Operator</th>
                        <th data-field="jumlah" data-sortable="true" data-width="50">Jumlah</th>
                    </tr>
                  </thead>
                </table>
            </div>
        </div>
    </div>

  </div>  
</div>

<script>
    document.getElementById('loading_setup_tarifprodukcomponent').style.height = document.documentElement.clientHeight;
    var tarifprodukcomponent_CariListData = false;
    var tarifprodukcomponent_IdTarif = '';
    var lastSelectedRowSetupTarifProdukComponent = null;
    var proses = '';
    document.getElementById('tarifprodukcomponent_addeditTarifComponent').style.display = 'none';

    $('#list_data_tarifprodukcomponent').bootstrapTable({
        onClickRow: (row, element, field)=>{
            if(row['list_data_tarifprodukcomponentcomponent_id_tarif'] == tarifprodukcomponent_IdTarif){
               tarifprodukcomponent_hideDetail();
            }else{
               tarifprodukcomponent_showDetail(row, element[0]);
            }
        }
    });
    
    apiPOST('Setup/getListTarifProduk', null, hasil => {
        var data = hasil['data'];
        var penj = '';
          penj += '<option value="0">Pilih Tarif</option>';
        for (var i = 0; i < data.length; i++) {
          penj += '<option value="'+ data[i]['id_tarif'] +'">'+ data[i]['nama_produk']+' // '+ data[i]['nama_penjamin']+' // '+ data[i]['harga']+' // Id Tarif : '+ data[i]['id_tarif']+'</option>';
        }
        document.getElementById('tarifprodukcomponent_idtarif').innerHTML = penj;
    });

    apiPOST('Setup/getJenisComponent', null, hasil => {
        var data = hasil['data'];
        var penj = '';
          penj += '<option value="0">Pilih Jenis Component</option>';
        for (var i = 0; i < data.length; i++) {
          penj += '<option value="'+ data[i]['id_jenis_component'] +'">'+ data[i]['jenis_component']+'</option>';
        }
        document.getElementById('tarifprodukcomponent_idjeniscomponent').innerHTML = penj;
    });

    apiPOST('Setup/getJenisComponent', null, hasil => {
        var data = hasil['data'];
        var penj = '';
          penj += '<option value="0">Pilih Parent Jenis Component</option>';
        for (var i = 0; i < data.length; i++) {
          penj += '<option value="'+ data[i]['id_jenis_component'] +'">'+ data[i]['jenis_component']+'</option>';
        }
        document.getElementById('tarifprodukcomponent_idjeniscomponentparent').innerHTML = penj;
    });

    TarifProdukcomponent_loaddata();
    
    function TarifProdukcomponent_loaddata(){
        apiPOST('Setup/getListTarifProdukComponent', {}, hasil => {
            if(hasil !== null){
                $('#list_data_tarifprodukcomponent').bootstrapTable('append', hasil['data']);
            }
        }).then(value => {
            tarifprodukcomponent_CariListData = true;
            selesaiLoadingAwalSetupTarifProdukComponent();
        });
    }

    function selesaiLoadingAwalSetupTarifProdukComponent(){
        if(tarifprodukcomponent_CariListData){
            document.getElementById('loading_setup_tarifprodukcomponent').style.display = 'none';
        }
    }
    
    function headerStyleLookupListSetupTarifProdukComponent(column){
        return {
            css: {
                background: '#a8d4da',
                color: 'black',
                border: '2px solid black',
                padding: '0px'
            }
        };
    }
    
    function rowStyleLookupListSetupTarifProdukComponent(row, index){
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
    
    function tarifprodukcomponent_showDetail(data = null, parent = null){
        if(data == null & parent == null){            
            setDisabeledSetupTarifProdukComponent(false);
            document.getElementById('tarifprodukcomponent_idtarif').value                   = '0';
            document.getElementById('tarifprodukcomponent_idjeniscomponent').value          = '0';
            document.getElementById('tarifprodukcomponent_idjeniscomponentparent').value    = '0';
            document.getElementById('tarifprodukcomponent_operator').value                  = '=';
            document.getElementById('tarifprodukcomponent_jumlah').value                    = '';

        }else{
            if(lastSelectedRowSetupTarifProdukComponent != null){
                tarifprodukcomponent_hideDetail();
            }
            var anaks = parent.childNodes;
            anaks.forEach(anak=>{
                if (localStorage.getItem("mode") == "dark-theme") {
                    anak.style.background = 'transparant';
                }else{
                    anak.style.background = 'darkgrey';
                }
            });
            lastSelectedRowSetupTarifProdukComponent = parent;
            tarifprodukcomponent_IdTarif = data['id_tarif'];
            document.getElementById('tarifprodukcomponent_idtarif').value                   = data['id_tarif'];
            document.getElementById('tarifprodukcomponent_idjeniscomponent').value          = data['id_jenis_component'];
            document.getElementById('tarifprodukcomponent_idjeniscomponentparent').value    = data['id_jenis_component_parent'];
            document.getElementById('tarifprodukcomponent_operator').value                  = data['operator'];
            document.getElementById('tarifprodukcomponent_jumlah').value                    = data['jumlah'];

            setDisabeledSetupTarifProdukComponent(true);
        }
    }
    
    function tarifprodukcomponent_hideDetail(){
        var anaks = lastSelectedRowSetupTarifProdukComponent.childNodes;
        if(anaks != null){
            anaks.forEach(anak=>{
                if (localStorage.getItem("mode") == "dark-theme") {
                    anak.style.background = 'transparant';
                }else{
                    anak.style.background = 'white';
                }
            });
        }
        tarifprodukcomponent_IdTarif = '';
        lastSelectedRowSetupTarifProdukComponent = null;
        document.getElementById('tarifprodukcomponent_idtarif').value                   = '0';
        document.getElementById('tarifprodukcomponent_idjeniscomponent').value          = '0';
        document.getElementById('tarifprodukcomponent_idjeniscomponentparent').value    = '0';
        document.getElementById('tarifprodukcomponent_operator').value                  = '=';
        document.getElementById('tarifprodukcomponent_jumlah').value                    = '';        
        
        setDisabeledSetupTarifProdukComponent(true);
    }
    
    function setDisabeledSetupTarifProdukComponent(flag){
        document.getElementById('tarifprodukcomponent_idtarif').disabled                = flag;
        document.getElementById('tarifprodukcomponent_idjeniscomponent').disabled       = flag;
        document.getElementById('tarifprodukcomponent_idjeniscomponentparent').disabled = flag;
        document.getElementById('tarifprodukcomponent_operator').disabled               = flag;
        document.getElementById('tarifprodukcomponent_jumlah').disabled                 = flag; 
        document.getElementById('tarifprodukcomponent_addeditTarifComponent').style.display = 'block';
        
        if (flag == true){
            $('#tarifprodukcomponent_addeditTarifComponent').html("<i class='fas fa-trash'></i> Hapus Tarif Component");
            proses = flag;
        }else{
            $('#tarifprodukcomponent_addeditTarifComponent').html("<i class='fas fa-save'></i> Simpan");
            proses = flag;
        }
    }
    
    function tarifprodukcomponent_addeditTarifComponent(){
        document.getElementById('loading_setup_tarifprodukcomponent').style.display = 'block';
        var param = {
          proses                    : proses,
          id_tarif                  : document.getElementById("tarifprodukcomponent_idtarif").value,
          idjeniscomponent          : document.getElementById("tarifprodukcomponent_idjeniscomponent").value,
          idjeniscomponentparent    : document.getElementById("tarifprodukcomponent_idjeniscomponentparent").value,
          operator                  : document.getElementById("tarifprodukcomponent_operator").value,
          jumlah                    : document.getElementById("tarifprodukcomponent_jumlah").value,
        };

        apiPOST('Setup/tarifprodukcomponent_addedit', param, hasil => {
          if (hasil !== null) {
            document.getElementById('loading_setup_tarifprodukcomponent').style.display = 'none';
            document.getElementById('tarifprodukcomponent_addeditTarifComponent').style.display = 'none';
            $('#list_data_tarifprodukcomponent').bootstrapTable('removeAll');
            TarifProdukcomponent_loaddata();
          }
        });
    }
	
	function importTarifprodukComponent(){
		var taxtarray;	
		var input= document.getElementById('fileToUploadTarifprodukComponent');
		var berkas = input.files[0];
		
		var reader = new FileReader();
		var content = reader.readAsText(berkas);
		reader.onload = function (event) {
		  var text = event.target.result; 
		  taxtarray=csvToArrayTarifprodukComponent(text);
		  apiPOST('Setup/importTarifprodukComponent', taxtarray, hasil => {
			if (hasil !== null) {
            
            }
		  });
		};		
	}
	
	function csvToArrayTarifprodukComponent(str,delimiter=","){
		var head = str.slice(0, str.indexOf("\n")).split(delimiter);
		var rows = str.slice(str.indexOf("\n") + 1).split("\n");
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