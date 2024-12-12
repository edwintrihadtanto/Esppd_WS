<div class="col-md-12 p-2">
  <div class="card card-outline">
    <div class="overlay-wrapper" id="loading_setup_produk">
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
                    <button type="button" onclick='produk_showDetail();' class="btn bg-gradient-secondary btn-xs"><i class="fas fa-plus"> Tambah Produk</i>
                </div>
				<div class="col-sm-auto">
					<form method="post" enctype="multipart/form-data">
					  Select File to upload:
					  <input type="file" name="fileToUploadMasterproduk" id="fileToUploadMasterproduk" multiple accept=".csv">
					  <button type="button" onclick="importMasterproduk()" class="btn bg-gradient-secondary btn-xs"><i class="fas fa-file"></i> Import Obat</i></button>
					</form>                    
                </div>
            </div>
            <!-- END LETAK BUTTON -->            
          </div>
        </div>
        </div>

        <div class="row p-2">
            <div class="col-sm-2">
                <label>Id Produk</label>
                <input type="text"  id="produk_id_produk" class="form-control form-control-xs" disabled="true">
            </div>
            <div class="col-sm-2">
                <label>Kode Produk</label>
                <input type="text"  id="produk_kode_produk" class="form-control form-control-xs" disabled="true">
            </div>
            <div class="col-sm-2">
                <label>Jenis Produk</label>
                <select id="produk_jenis_produk" class="form-control form-control-xs" disabled="true"></select>
            </div>
            <div class="col-sm-5">
                <label>Nama Produk</label>
                <input type="text"  id="produk_nama_produk" class="form-control form-control-xs" disabled="true">
            </div>
            <div class="col-sm-1">
                <label>&nbsp;</label>
                <button type="button" onclick='produk_addeditProduk();' class="btn bg-gradient-warning btn-xs" id="produk_addedit">
            </div>
        </div>
        <div class="row m-1">
            <div class="col">
                <table
                    id="list_data_produk"
                    data-single-select="true"
                    data-click-to-select="true"
                    data-sticky-header="true"
                    data-header-style="headerStyleLookupListSetupproduk"
                    data-row-style="rowStyleLookupListSetupproduk"
                    data-pagination="true"
                    data-pagination-parts="['pageInfo', 'pageList']"
                    data-search="true"
                    class="table-sm">
                  <thead>
                    <tr>
                      <th data-field="id_produk" data-sortable="true" data-width="20">ID Produk</th>
                      <th data-field="kd_produk" data-sortable="true" data-width="60">Kode Produk</th>
                      <th data-field="deskripsi" data-sortable="true" data-width="250">Jenis Produk</th>
                      <th data-field="nama_produk" data-sortable="true">Nama Produk</th>
                    </tr>
                  </thead>
                </table>
            </div>
        </div>
    </div>

  </div>  
</div>

<script>
    document.getElementById('loading_setup_produk').style.height = document.documentElement.clientHeight;
    var produk_Carilist_data_produk = false;
    var idProdukSetupproduk = '';
    var lastSelectedRowSetupproduk = null;
    var proses = '';
    document.getElementById('produk_addedit').style.display = 'none'
    $('#list_data_produk').bootstrapTable({
        onClickRow: (row, element, field)=>{
            if(row['list_data_produk_id_produk'] == idProdukSetupproduk){
               produk_hideDetail();
            }else{
               produk_showDetail(row, element[0]);
            }
        }
    });
    
    apiPOST('Setup/getJenisProduk', null, hasil => {
        var data = hasil['data'];
        var res = '';
          res += '<option value="0">Pilih Jenis Produk</option>';
        for (var i = 0; i < data.length; i++) {
          res += '<option value="'+ data[i]['id_jenis_produk'] +'">'+ data[i]['deskripsi']+'</option>';
        }
        document.getElementById('produk_jenis_produk').innerHTML = res;
    });

    produk_loaddata();
    
    function produk_loaddata(){
        apiPOST('Setup/getListproduk', {}, hasil => {
            if(hasil !== null){
                $('#list_data_produk').bootstrapTable('append', hasil['data']);
            }
        }).then(value => {
            produk_Carilist_data_produk = true;
            selesaiLoadingAwalSetupproduk();
        });
    }

    function selesaiLoadingAwalSetupproduk(){
        if(produk_Carilist_data_produk){
            document.getElementById('loading_setup_produk').style.display = 'none';
        }
    }
    
    function headerStyleLookupListSetupproduk(column){
        return {
            css: {
                background: '#a8d4da',
                color: 'black',
                border: '2px solid black',
                padding: '0px'
            }
        };
    }
    
    function rowStyleLookupListSetupproduk(row, index){
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
    
    function produk_showDetail(data = null, parent = null){
        if(data == null & parent == null){            
            setDisabeledSetupproduk(false);
            document.getElementById('produk_id_produk').value      = '';
            document.getElementById('produk_kode_produk').value    = '';
            document.getElementById('produk_jenis_produk').value   = '0';
            document.getElementById('produk_nama_produk').value    = '';

        }else{
            if(lastSelectedRowSetupproduk != null){
                produk_hideDetail();
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
            document.getElementById('produk_id_produk').value       = data['id_produk'];
            document.getElementById('produk_kode_produk').value     = data['kd_produk'];
            document.getElementById('produk_jenis_produk').value    = data['id_jenis_produk'];
            document.getElementById('produk_nama_produk').value     = data['nama_produk'];
            
            setDisabeledSetupproduk(true);
        }
    }
    
    function produk_hideDetail(){
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
        document.getElementById('produk_id_produk').value      = '';
        document.getElementById('produk_kode_produk').value    = '';
        document.getElementById('produk_jenis_produk').value   = '0';
        document.getElementById('produk_nama_produk').value    = '';
        
        setDisabeledSetupproduk(true);
    }
    
    function setDisabeledSetupproduk(flag){
        document.getElementById('produk_id_produk').disabled   = flag;
        
        document.getElementById('produk_addedit').style.display = 'block';
        //document.getElementById('produk_addedit').innerHTML("<i class='fas fa-save'></i> Simpan");
        if (flag == true){
            document.getElementById('produk_kode_produk').disabled = false;
            document.getElementById('produk_jenis_produk').disabled = false;
            document.getElementById('produk_nama_produk').disabled = false;
            $('#produk_addedit').html("<i class='fas fa-edit'></i> Edit");
            proses = flag;
        }else{
            document.getElementById('produk_kode_produk').disabled  = flag;
            document.getElementById('produk_jenis_produk').disabled = flag;
            document.getElementById('produk_nama_produk').disabled  = flag;
            $('#produk_addedit').html("<i class='fas fa-save'></i> Simpan");
            proses = flag;
        }
    }
    
    function produk_addeditProduk(){
        document.getElementById('loading_setup_produk').style.display = 'block';
        var param = {
          proses        : proses,
          id_produk     : document.getElementById("produk_id_produk").value,
          kd_produk     : document.getElementById("produk_kode_produk").value,
          jenis_produk  : document.getElementById("produk_jenis_produk").value,
          produk        : document.getElementById("produk_nama_produk").value,
        };

        apiPOST('Setup/produk_addeditProduk', param, hasil => {
          if (hasil !== null) {
            document.getElementById('loading_setup_produk').style.display = 'none';
            $('#list_data_produk').bootstrapTable('removeAll');
            produk_loaddata();
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