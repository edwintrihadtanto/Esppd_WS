<div class="col-md-12 p-2">
  <div class="card card-outline">
    <div class="overlay-wrapper" id="loading_setup_produkunit">
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
                    <button type="button" onclick='produkunit_showDetail();' class="btn bg-gradient-secondary btn-xs"><i class="fas fa-plus"> Tambah Produk Unit</i>
                </div>
				<div class="col-sm-auto">
					<form method="post" enctype="multipart/form-data">
					  Select File to upload:
					  <input type="file" name="fileToUploadProdukunit" id="fileToUploadProdukunit" multiple accept=".csv">
					  <button type="button" onclick="importProdukunit()" class="btn bg-gradient-secondary btn-xs"><i class="fas fa-file"></i> Import Obat</i></button>
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
                <select id="produkunit_id_unit" class="form-control form-control-xs" disabled="true"></select>
            </div>
            <div class="col-sm-3">
                <label>Produk</label>
                <select id="produkunit_id_produk" class="form-control form-control-xs" disabled="true"></select>
            </div>
            <div class="col-sm-1">
                <label>&nbsp;</label>
                <button type="button" onclick='produkunit_addeditProduk();' class="btn bg-gradient-warning btn-xs" id="produkunit_addedit">
            </div>
        </div>
        <div class="row m-1">
            <div class="col">
                <table
                    id="list_data_produkunit"
                    data-single-select="true"
                    data-click-to-select="true"
                    data-sticky-header="true"
                    data-header-style="headerStyleLookupListSetupprodukunit"
                    data-row-style="rowStyleLookupListSetupprodukunit"
                    data-pagination="true"
                    data-pagination-parts="['pageInfo', 'pageList']"
                    data-search="true"
                    class="table-sm">
                  <thead>
                    <tr>
                      <th data-field="nama_unit" data-sortable="true">Nama Unit</th>
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
    document.getElementById('loading_setup_produkunit').style.height = document.documentElement.clientHeight;
    var produk_Carilist_data_produkunit = false;
    var idUnitSetupprodukunit = '';
    var lastSelectedRowSetupprodukunit = null;
    var proses = '';
    document.getElementById('produkunit_addedit').style.display = 'none'
    $('#list_data_produkunit').bootstrapTable({
        onClickRow: (row, element, field)=>{
            if(row['list_data_produkunitunit_id_unit'] == idUnitSetupprodukunit){
               produkunit_hideDetail();
            }else{
               produkunit_showDetail(row, element[0]);
            }
        }
    });
    
    apiPOST('Setup/getUnit', { idfar : '' }, hasil => {
        var data = hasil['data'];
        var unit = '';
          unit += '<option value="0">Pilih Unit</option>';
        for (var i = 0; i < data.length; i++) {
          unit += '<option value="'+ data[i]['id_unit'] +'">'+ data[i]['nama_unit']+'</option>';
        }
        document.getElementById('produkunit_id_unit').innerHTML = unit;
    });

    apiPOST('Setup/getProduk', null, hasil => {
        var data = hasil['data'];
        var prod = '';
          prod += '<option value="0">Pilih Produk</option>';
        for (var i = 0; i < data.length; i++) {
          prod += '<option value="'+ data[i]['id_produk'] +'">'+ data[i]['nama_produk']+'</option>';
        }
        document.getElementById('produkunit_id_produk').innerHTML = prod;
    });

    produkunit_loaddata();
    
    function produkunit_loaddata(){
        apiPOST('Setup/getListProdukUnit', {}, hasil => {
            if(hasil !== null){
                $('#list_data_produkunit').bootstrapTable('append', hasil['data']);
            }
        }).then(value => {
            produk_Carilist_data_produkunit = true;
            selesaiLoadingAwalSetupprodukunit();
        });
    }

    function selesaiLoadingAwalSetupprodukunit(){
        if(produk_Carilist_data_produkunit){
            document.getElementById('loading_setup_produkunit').style.display = 'none';
        }
    }
    
    function headerStyleLookupListSetupprodukunit(column){
        return {
            css: {
                background: '#a8d4da',
                color: 'black',
                border: '2px solid black',
                padding: '0px'
            }
        };
    }
    
    function rowStyleLookupListSetupprodukunit(row, index){
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
    
    function produkunit_showDetail(data = null, parent = null){
        if(data == null & parent == null){            
            setDisabeledSetupprodukunit(false);
            document.getElementById('produkunit_id_unit').value    = '0';
            document.getElementById('produkunit_id_produk').value  = '0';
        }else{
            if(lastSelectedRowSetupprodukunit != null){
                produkunit_hideDetail();
            }
            var anaks = parent.childNodes;
            anaks.forEach(anak=>{
                if (localStorage.getItem("mode") == "dark-theme") {
                    anak.style.background = 'transparant';
                }else{
                    anak.style.background = 'darkgrey';
                }
            });
            lastSelectedRowSetupprodukunit = parent;
            idUnitSetupprodukunit = data['id_unit'];
            document.getElementById('produkunit_id_unit').value    = data['id_unit'];
            document.getElementById('produkunit_id_produk').value  = data['id_produk'];
            
            setDisabeledSetupprodukunit(true);
        }
    }
    
    function produkunit_hideDetail(){
        var anaks = lastSelectedRowSetupprodukunit.childNodes;
        if(anaks != null){
            anaks.forEach(anak=>{
                if (localStorage.getItem("mode") == "dark-theme") {
                    anak.style.background = 'transparant';
                }else{
                    anak.style.background = 'white';
                }
            });
        }
        idUnitSetupprodukunit = '';
        lastSelectedRowSetupprodukunit = null;
        document.getElementById('produkunit_id_unit').value    = '0';
        document.getElementById('produkunit_id_produk').value  = '0';
        
        setDisabeledSetupprodukunit(true);
    }
    
    function setDisabeledSetupprodukunit(flag){
        document.getElementById('produkunit_id_unit').disabled      = flag;
        document.getElementById('produkunit_addedit').style.display = 'block';
        
        if (flag == true){
            
            document.getElementById('produkunit_id_produk').disabled    = false;
            $('#produkunit_addedit').html("<i class='fas fa-edit'></i> Delete");
            proses = flag;
        }else{
            document.getElementById('produkunit_id_produk').disabled    = flag;
            $('#produkunit_addedit').html("<i class='fas fa-save'></i> Simpan");
            proses = flag;
        }
    }
    
    function produkunit_addeditProduk(){
        document.getElementById('loading_setup_produkunit').style.display = 'block';
        var param = {
          proses        : proses,
          id_unit       : document.getElementById("produkunit_id_unit").value,
          id_produk     : document.getElementById("produkunit_id_produk").value,
        };

        apiPOST('Setup/produkunit_addeditProduk', param, hasil => {
          if (hasil !== null) {
            document.getElementById('loading_setup_produkunit').style.display = 'none';
            $('#list_data_produkunit').bootstrapTable('removeAll');
            produkunit_loaddata();
          }
        });
    }
	
	function importProdukunit(){
		var taxtarray;	
		var input= document.getElementById('fileToUploadProdukunit');
		var berkas = input.files[0];
		
		var reader = new FileReader();
		var content = reader.readAsText(berkas);
		reader.onload = function (event) {
		  var text = event.target.result; 
		  taxtarray=csvToArrayProdukunit(text);
		  apiPOST('Setup/importProdukunit', taxtarray, hasil => {
			if (hasil !== null) {
            
            }
		  });
		  // console.log(taxtarray);
		};
	}
	
	function csvToArrayProdukunit(str,delimiter=","){
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