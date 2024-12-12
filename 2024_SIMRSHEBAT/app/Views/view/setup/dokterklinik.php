<div class="col-md-12 p-2">
  <div class="card card-outline">
    <div class="overlay-wrapper" id="loading_setup_dokterklinik">
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
                    <button type="button" onclick='dokterklinik_showDetail();' class="btn bg-gradient-secondary btn-xs"><i class="fas fa-plus"> Tambah Dokter Per Klinik</i>
                </div>
				<div class="col-sm-auto">
					<form method="post" enctype="multipart/form-data">
					  Select File to upload:
					  <input type="file" name="fileToUploadDokterklinik" id="fileToUploadDokterklinik" multiple accept=".csv">
					  <button type="button" onclick="importDokterklinik()" class="btn bg-gradient-secondary btn-xs"><i class="fas fa-file"></i> Import Obat</i></button>
					</form>                    
                </div>
            </div>
            <!-- END LETAK BUTTON -->            
          </div>
        </div>
        </div>

        <div class="row p-2">
            <div class="col-sm-3">
                <label>Nama Unit</label>
                <select id="dokterklinik_id_unit" class="form-control form-control-xs" disabled="true"></select>
            </div>
            <div class="col-sm-3">
                <label>Dokter</label>
                <select id="dokterklinik_id_pegawai" class="form-control form-control-xs" disabled="true"></select>
            </div>
            <div class="col-sm-1">
                <label>&nbsp;</label>
                <button type="button" onclick='dokterklinik_addedit();' class="btn bg-gradient-warning btn-xs" id="dokterklinik_addedit">
            </div>
        </div>
        <div class="row m-1">
            <div class="col">
                <table
                    id="list_data_dokterklinik"
                    data-single-select="true"
                    data-click-to-select="true"
                    data-sticky-header="true"
                    data-header-style="headerStyleLookupListSetupDokterKlinik"
                    data-row-style="rowStyleLookupListSetupDokterKlinik"
                    data-pagination="true"
                    data-pagination-parts="['pageInfo', 'pageList']"
                    data-search="true"
                    class="table-sm">
                  <thead>
                    <tr>
                        <th data-field="id_unit" data-sortable="true" data-width="20">ID Unit</th>
                        <th data-field="nama_unit" data-sortable="true" data-width="200">Nama Unit</th>
                        <th data-field="nama_pegawai" data-sortable="true">Nama Dokter</th>
                    </tr>
                  </thead>
                </table>
            </div>
        </div>
    </div>

  </div>  
</div>

<script>
    document.getElementById('loading_setup_dokterklinik').style.height = document.documentElement.clientHeight;
    var Carilist_data_dokterklinik = false;
    var idUnitSetupDokterKlinik = '';
    var lastSelectedRowSetupDokterKlinik = null;
    var proses = '';
    document.getElementById('dokterklinik_addedit').style.display = 'none'
    $('#list_data_dokterklinik').bootstrapTable({
        onClickRow: (row, element, field)=>{
            if(row['list_data_dokterklinik_idunit'] == idUnitSetupDokterKlinik){
               dokterklinik_hideDetail();
            }else{
               dokterklinik_showDetail(row, element[0]);
            }
        }
    });
    
    apiPOST('Setup/getUnit', {idfar:0}, hasil => {
        var data = hasil['data'];
        var unit = '';
          unit += '<option value="0">Pilih Unit</option>';
        for (var i = 0; i < data.length; i++) {
          unit += '<option value="'+ data[i]['id_unit'] +'">'+ data[i]['nama_unit']+'</option>';
        }
        document.getElementById('dokterklinik_id_unit').innerHTML = unit;
    });

    apiPOST('Setup/getDokter', null, hasil => {
        var data = hasil['data'];
        var dok = '';
          dok += '<option value="0">Pilih Dokter</option>';
        for (var i = 0; i < data.length; i++) {
          dok += '<option value="'+ data[i]['id_pegawai'] +'">'+ data[i]['nama_pegawai']+'</option>';
        }
        document.getElementById('dokterklinik_id_pegawai').innerHTML = dok;
    });

    dokterklinik_loaddata();
    
    function dokterklinik_loaddata(){
        var param = {
            id_unit : ''
        }
        apiPOST('Setup/getListDokterKlinik', param, hasil => {
            if(hasil !== null){
                $('#list_data_dokterklinik').bootstrapTable('append', hasil['data']);
            }
        }).then(value => {
            Carilist_data_dokterklinik = true;
            selesaiLoadingAwalSetupDokterKlinik();
        });
    }

    function selesaiLoadingAwalSetupDokterKlinik(){
        if(Carilist_data_dokterklinik){
            document.getElementById('loading_setup_dokterklinik').style.display = 'none';
        }
    }
    
    function headerStyleLookupListSetupDokterKlinik(column){
        return {
            css: {
                background: '#a8d4da',
                color: 'black',
                border: '2px solid black',
                padding: '0px'
            }
        };
    }
    
    function rowStyleLookupListSetupDokterKlinik(row, index){
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
    
    function dokterklinik_showDetail(data = null, parent = null){
        if(data == null & parent == null){            
            setDisabeledSetupDokterKlinik(false);
            document.getElementById('dokterklinik_id_unit').value       = '0';
            document.getElementById('dokterklinik_id_pegawai').value    = '0';
        }else{
            if(lastSelectedRowSetupDokterKlinik != null){
                dokterklinik_hideDetail();
            }
            var anaks = parent.childNodes;
            anaks.forEach(anak=>{
                if (localStorage.getItem("mode") == "dark-theme") {
                    anak.style.background = 'transparant';
                }else{
                    anak.style.background = 'darkgrey';
                }
            });
            lastSelectedRowSetupDokterKlinik = parent;
            idUnitSetupDokterKlinik = data['id_unit'];
            document.getElementById('dokterklinik_id_unit').value       = data['id_unit'];
            document.getElementById('dokterklinik_id_pegawai').value    = data['id_pegawai'];
            
            setDisabeledSetupDokterKlinik(true);
        }
    }
    
    function dokterklinik_hideDetail(){
        var anaks = lastSelectedRowSetupDokterKlinik.childNodes;
        if(anaks != null){
            anaks.forEach(anak=>{
                if (localStorage.getItem("mode") == "dark-theme") {
                    anak.style.background = 'transparant';
                }else{
                    anak.style.background = 'white';
                }
            });
        }
        idUnitSetupDokterKlinik = '';
        lastSelectedRowSetupDokterKlinik = null;
        document.getElementById('dokterklinik_id_unit').value       = '0';
        document.getElementById('dokterklinik_id_pegawai').value    = '0';
        
        setDisabeledSetupDokterKlinik(true);
    }
    
    function setDisabeledSetupDokterKlinik(flag){
        document.getElementById('dokterklinik_id_unit').disabled      = flag;
        document.getElementById('dokterklinik_addedit').style.display = 'block';
        
        if (flag == true){
            
            document.getElementById('dokterklinik_id_pegawai').disabled    = false;
            $('#dokterklinik_addedit').html("<i class='fas fa-trash'></i> Hapus");
            proses = flag;
        }else{
            document.getElementById('dokterklinik_id_pegawai').disabled    = flag;
            $('#dokterklinik_addedit').html("<i class='fas fa-save'></i> Simpan");
            proses = flag;
        }
    }
    
    function dokterklinik_addedit(){
        document.getElementById('loading_setup_dokterklinik').style.display = 'block';
        var param = {
          proses        : proses,
          id_unit       : document.getElementById("dokterklinik_id_unit").value,
          id_pegawai    : document.getElementById("dokterklinik_id_pegawai").value,
        };

        apiPOST('Setup/dokterklinik_addedit', param, hasil => {
          if (hasil !== null) {
            document.getElementById('loading_setup_dokterklinik').style.display = 'none';
            $('#list_data_dokterklinik').bootstrapTable('removeAll');
            dokterklinik_loaddata();
          }
            document.getElementById('dokterklinik_id_unit').value       = '0';
            document.getElementById('dokterklinik_id_pegawai').value    = '0';
            document.getElementById('dokterklinik_addedit').style.display = 'none';
        }).then(value => {
            Carilist_data_dokterklinik = true;
            selesaiLoadingAwalSetupDokterKlinik();
        });
    }
	
	function importDokterklinik(){
		var taxtarray;	
		var input= document.getElementById('fileToUploadDokterklinik');
		var berkas = input.files[0];
		
		var reader = new FileReader();
		var content = reader.readAsText(berkas);
		reader.onload = function (event) {
		  var text = event.target.result; 
		  taxtarray=csvToArrayDokterklinik(text);
		  apiPOST('Setup/importDokterklinik', taxtarray, hasil => {
			if (hasil !== null) {
            
            }
		  });
		};		
	}
	
	function csvToArrayDokterklinik(str,delimiter=","){
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