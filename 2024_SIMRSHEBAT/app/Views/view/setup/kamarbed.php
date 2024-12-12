<div class="col-md-12 p-2">
  <div class="card card-outline">
    <div class="overlay-wrapper" id="loading_setup_bedkamar">
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
                    <button type="button" onclick='kamar_showDetail();' class="btn bg-gradient-secondary btn-xs"><i class="fas fa-plus"> Tambah Kamar</i>
                </div>
				<div class="col-sm-auto">
					<!-- <form method="post" enctype="multipart/form-data">
					  Select File to upload:
					  <input type="file" name="fileToUploadMasterproduk" id="fileToUploadMasterproduk" multiple accept=".csv">
					  <button type="button" onclick="importMasterproduk()" class="btn bg-gradient-secondary btn-xs"><i class="fas fa-file"></i> Import Obat</i></button>
					</form>                     -->
                </div>
            </div>
            <!-- END LETAK BUTTON -->            
          </div>
        </div>
        </div>

        <div class="row p-2">
            <div class="col-sm-2">
                <label>Id Kamar</label>
                <input type="text"  id="id_kamar" class="form-control form-control-xs" disabled="true">
            </div>
            <div class="col-sm-2">
                <label>Nama kamar</label>
                <input type="text"  id="nama_kamar" class="form-control form-control-xs" disabled="true">
            </div>
            <div class="col-sm-2">
                <label>Unit</label>
                <select id="id_unit" class="form-control form-control-xs" disabled="true"></select>
            </div>
            <div class="col-sm-2">
                <label>Ruang</label>
                <select id="id_ruang" class="form-control form-control-xs" disabled="true"></select>
            </div>
            <div class="col-sm-2">
                <label>Jumlah</label>
                <input type="number"  id="jumlah_bed" class="form-control form-control-xs" disabled="true">
            </div>
            <div class="col-sm-1">
                <label>&nbsp;</label>
                <button type="button" onclick='kamar_addeditKamar();' class="btn bg-gradient-warning btn-xs" id="kamar_addedit">
            </div>
        </div>
        <div class="row m-1">
            <div class="col">
                <table
                    id="list_data_kamar"
                    data-single-select="true"
                    data-click-to-select="true"
                    data-sticky-header="true"
                    data-header-style="headerStyleLookupListSetupbedkamar"
                    data-row-style="rowStyleLookupListSetupbedkamar"
                    data-pagination="true"
                    data-pagination-parts="['pageInfo', 'pageList']"
                    data-search="true"
                    class="table-sm">
                  <thead>
                    <tr>
                      <th data-field="id_kamar" data-sortable="true" data-width="20">ID Kamar</th>
                      <th data-field="nama_kamar" data-sortable="true" data-width="60">Nama Kamar</th>
                      <th data-field="nama_unit" data-sortable="true" data-width="250">Unit</th>
                      <th data-field="nama_ruang" data-sortable="true">Ruang</th>
                      <th data-field="jumlah_bed" data-sortable="true">Jumlah Bed</th>
                    </tr>
                  </thead>
                </table>
            </div>
        </div>
    </div>

  </div>  
</div>

<script>
    document.getElementById('loading_setup_bedkamar').style.height = document.documentElement.clientHeight;
    var kamar_Carilist_data_kamar = false;
    var idProdukSetupproduk = '';
    var lastSelectedRowSetupproduk = null;
    var proses = '';
    document.getElementById('kamar_addedit').style.display = 'none'
    $('#list_data_kamar').bootstrapTable({
        onClickRow: (row, element, field)=>{
            if(row['list_data_id_kamar'] == idProdukSetupproduk){
               kamar_hideDetail();
            }else{
               kamar_showDetail(row, element[0]);
            }
        }
    });
    
    apiPOST('Setup/getListUnitinap', null, hasil => {
        var data = hasil['data'];
        var res = '';
          res += '<option value="0">Pilih Unit</option>';
        for (var i = 0; i < data.length; i++) {
          res += '<option value="'+ data[i]['id_unit'] +'">'+ data[i]['nama_unit']+'</option>';
        }
        document.getElementById('id_unit').innerHTML = res;
    });

    apiPOST('Setup/getListRuang', null, hasil => {
        var data = hasil['data'];
        var res = '';
          res += '<option value="0">Pilih Unit</option>';
        for (var i = 0; i < data.length; i++) {
          res += '<option value="'+ data[i]['id_ruang'] +'">'+ data[i]['nama_ruang']+'</option>';
        }
        document.getElementById('id_ruang').innerHTML = res;
    });

    kamar_loaddata();
    
    function kamar_loaddata(){
        apiPOST('Setup/getListkamar', {}, hasil => {
            if(hasil !== null){
                $('#list_data_kamar').bootstrapTable('append', hasil['data']);
            }
        }).then(value => {
            kamar_Carilist_data_kamar = true;
            selesaiLoadingAwalSetupkamar();
        });
    }

    function selesaiLoadingAwalSetupkamar(){
        if(kamar_Carilist_data_kamar){
            document.getElementById('loading_setup_bedkamar').style.display = 'none';
        }
    }
    
    function headerStyleLookupListSetupbedkamar(column){
        return {
            css: {
                background: '#a8d4da',
                color: 'black',
                border: '2px solid black',
                padding: '0px'
            }
        };
    }
    
    function rowStyleLookupListSetupbedkamar(row, index){
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
    
    function kamar_showDetail(data = null, parent = null){
        if(data == null & parent == null){            
            setDisabeledSetupkamar(false);
            document.getElementById('id_kamar').value      = '';
            document.getElementById('nama_kamar').value    = '';
            document.getElementById('nama_unit').value   = '0';
            document.getElementById('id_ruang').value   = '0';
            document.getElementById('jumlah_bed').value   = '0';


        }else{
            if(lastSelectedRowSetupproduk != null){
                kamar_hideDetail();
            }
            var anaks = parent.childNodes;
            anaks.forEach(anak=>{
                if (localStorage.getItem("mode") == "dark-theme") {
                    anak.style.background = 'transparant';
                }else{
                    anak.style.background = 'darkgrey';
                }
            });
            lastSelectedRowSetupproduk = parent;
            idProdukSetupproduk = data['id_produk'];
            document.getElementById('id_kamar').value       = data['id_kamar'];
            document.getElementById('nama_kamar').value     = data['nama_kamar'];
            document.getElementById('id_unit').value    = data['id_unit'];
            document.getElementById('id_ruang').value    = data['id_ruang'];
            document.getElementById('jumlah_bed').value    = data['jumlah_bed'];

            setDisabeledSetupkamar(true);
        }
    }
    
    function kamar_hideDetail(){
        var anaks = lastSelectedRowSetupproduk.childNodes;
        if(anaks != null){
            anaks.forEach(anak=>{
                if (localStorage.getItem("mode") == "dark-theme") {
                    anak.style.background = 'transparant';
                }else{
                    anak.style.background = 'white';
                }
            });
        }
        idProdukSetupproduk = '';
        lastSelectedRowSetupproduk = null;
        document.getElementById('id_kamar').value      = '';
        document.getElementById('nama_kamar').value    = '';
        document.getElementById('id_unit').value   = '0';
        document.getElementById('id_ruang').value   = '0';
        document.getElementById('jumlah_bed').value   = '0';
        
        setDisabeledSetupkamar(true);
    }
    
    function setDisabeledSetupkamar(flag){
        document.getElementById('id_kamar').disabled   = flag;
        
        document.getElementById('kamar_addedit').style.display = 'block';
        //document.getElementById('kamar_addedit').innerHTML("<i class='fas fa-save'></i> Simpan");
        if (flag == true){
            document.getElementById('nama_kamar').disabled = false;
            document.getElementById('id_unit').disabled = false;
            document.getElementById('id_ruang').disabled = false;
            document.getElementById('jumlah_bed').disabled = false;
            $('#kamar_addedit').html("<i class='fas fa-edit'></i> Edit");
            proses = flag;
        }else{
            document.getElementById('nama_kamar').disabled  = flag;
            document.getElementById('id_unit').disabled = flag;
            document.getElementById('id_ruang').disabled = flag;
            document.getElementById('jumlah_bed').disabled = flag;
            $('#kamar_addedit').html("<i class='fas fa-save'></i> Simpan");
            proses = flag;
        }
    }
    
    function kamar_addeditKamar(){
        document.getElementById('loading_setup_bedkamar').style.display = 'block';
        var param = {
          proses        : proses,
          id_kamar     : document.getElementById("id_kamar").value,
          nama_kamar     : document.getElementById("nama_kamar").value,
          id_unit  : document.getElementById("id_unit").value,
          id_ruang        : document.getElementById("id_ruang").value,
          jumlah_bed  : document.getElementById("jumlah_bed").value,
        };

        apiPOST('Setup/kamar_addeditKamar', param, hasil => {
          if (hasil !== null) {
            document.getElementById('loading_setup_bedkamar').style.display = 'none';
            $('#list_data_kamar').bootstrapTable('removeAll');
            kamar_loaddata();
          }
        });
    }
	
	function importMasterproduk(){
		var taxtarray;	
		var input= document.getElementById('fileToUploadMasterproduk');
		var berkas = input.files[0];
		
		var reader = new FileReader();
		var content = reader.readAsText(berkas);
		reader.onload = function (event) {
		  var text = event.target.result; 
		  taxtarray=csvToArrayMasterproduk(text);
		  apiPOST('Setup/importMasterproduk', taxtarray, hasil => {
			if (hasil !== null) {
            
            }
		  });
		};		
	}
	
	function csvToArrayMasterproduk(str,delimiter=","){
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