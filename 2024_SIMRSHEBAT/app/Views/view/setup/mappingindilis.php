<div class="overlay-wrapper" id="loading_map_indik_LIS">
    <div class="overlay">
      <i class="fas fa-3x fa-sync-alt fa-spin"></i>
    </div>
</div>
<div class="row m-2">
    <div class="col col-sm-auto">
        <button id="add_map_indik_LIS" type="button" onclick='showDetailMapIndikator();' class="btn bg-gradient-success btn-xs"><i class="fas fa-print"> Tambah</i></button>
    </div>
    <div class="col col-sm-auto">
        <button id="edit_map_indik_LIS" type="button" onclick='editMapIndikator()' class="btn bg-gradient-warning btn-xs" style=""><i class="fas fa-print"> Edit</i></button>
    </div>
    <div class="col">
        
    </div>
    <div class="col">
        <button id="cancel_map_indik_LIS" type="button" onclick='' class="btn bg-gradient-danger btn-xs" style="display: none;"><i class="fas fa-print"> Batal</i></button>
    </div>
    <div class="col">
        <button id="delete_map_indik_LIS" type="button" onclick='' class="btn bg-gradient-danger btn-xs" style="display: none;"><i class="fas fa-print"> Hapus</i></button>
    </div>
</div>
<div class="row m-2">
    <div class="col col-sm-4">
        <label>Produk</label>
		<select class="form-control form-control-xs" name="" id="produk_map_indik_LIS" disabled="true"></select>
    </div>
	<div class="col col-sm-4">
        <label>Indikator</label>
		<select class="form-control form-control-xs" name="" id="indikator_map_indik_LIS" disabled="true"></select>
    </div>
	<div class="col col-sm-auto">
		<button id="save_map_indik_LIS" type="button" onclick='saveIndikator()' class="btn bg-gradient-warning btn-xs" style="margin-block-start: 22px;margin-left: 10px;" disabled="true"><i class="fas fa-plus"> Simpan</i></button>
    </div>
	<div class="col col-sm-2">
		<button id="save_edit_map_indik_LIS" type="button" onclick='saveEditMapIndikator()' class="btn bg-gradient-warning btn-xs collapse" style="margin-block-start: 22px;margin-left: 10px;" disabled="true"><i class="fas fa-plus"> Edit</i></button>
    </div>
</div>
<div class="row m-1">
    <div class="col">
        <table
            id="list_map_indik_LIS"
            data-single-select="true"
            data-click-to-select="true"
            data-sticky-header="true"
            data-header-style="headerStyleLookupListMapIndikator"
            data-row-style="rowStyleLookupListMapIndikator"
            data-pagination="true"
            data-pagination-parts="['pageInfo', 'pageList']"
            class="table-sm">
          <thead>
            <tr>
              <th data-field="nama_produk" data-sortable="true">Nama Produk</th>
              <th data-field="nmtestind" data-sortable="true">Nama Indikator</th>
              <th data-field="unittest" data-sortable="true">Unit Test Indikator</th>
            </tr>
          </thead>
        </table>
    </div>
</div>

<script>
    document.getElementById('loading_map_indik_LIS').style.height = document.documentElement.clientHeight;
    var cariListMapIndikator = false;
    var namaMapIndikator = '';
    var idMapIndikator = '';
    var idMapproduk = '';
    var lastSelectedRowMapIndikator = null;
	
	$(document).ready(function() {
		loadawalMapIndikator();
		loadprodukMapIndikator();
		loadListIndikator();
	});
    
    $('#list_map_indik_LIS').bootstrapTable({
        onClickRow: (row, element, field)=>{
            if(row['nama_produk'] == namaMapIndikator){
               hideDetailMapIndikator();
            }else{
               showDetailMapIndikator(row, element[0]);
            }
        }
    });
    
	function loadawalMapIndikator(){
		$('#list_map_indik_LIS').bootstrapTable('removeAll');
		apiPOST('Setup/getMapIndiLIS', {}, hasil => {
			if(hasil !== null){
				$('#list_map_indik_LIS').bootstrapTable('append', hasil['data']);
			}
		}).then(value => {
			cariListMapIndikator = true;
			selesaiLoadingAwalMapIndikator();
		});
	}
	
	function loadprodukMapIndikator(){
		document.getElementById('produk_map_indik_LIS').innerHTML = '';
		apiPOST('Setup/getProdukLab', {}, hasil => {
			var data = hasil['data'];
			var prod = '';
			  prod += '<option value="0">Pilih Produk</option>';
			for (var i = 0; i < data.length; i++) {
			  prod += '<option value="'+ data[i]['id_produk'] +'">'+data[i]['nama_produk']+' / '+data[i]['id_produk']+'</option>';
			}
			document.getElementById('produk_map_indik_LIS').innerHTML = prod;
		});
	}
	
	function loadListIndikator(){
		document.getElementById('indikator_map_indik_LIS').innerHTML = '';
		apiPOST('Setup/getIndiLIS', {}, hasil => {
			var data = hasil['data'];
			var map = '';
			  map += '<option value="0">Pilih Indikator</option>';
			for (var i = 0; i < data.length; i++) {
			  map += '<option value="'+ data[i]['id'] +'">'+data[i]['nmtestind']+' ('+data[i]['unittest']+')/ '+data[i]['id']+'</option>';
			}
			document.getElementById('indikator_map_indik_LIS').innerHTML = map;
		});
	}
	
    function selesaiLoadingAwalMapIndikator(){
        if(cariListMapIndikator){
            document.getElementById('loading_map_indik_LIS').style.display = 'none';
        }
    }
    
    function headerStyleLookupListMapIndikator(column){
        return {
            css: {
                background: '#a8d4da',
                color: 'black',
                border: '2px solid black',
                padding: '0px'
            }
        };
    }
    
    function rowStyleLookupListMapIndikator(row, index){
        return {
            css: {
                background: 'white',
                border: '2px solid black',
                padding: '2px'
            }
        };
    }
    
    function showDetailMapIndikator(data = null, parent = null){
        if(data == null & parent == null){            
            setDisabeledMapIndikator(false);
        }else{
            if(lastSelectedRowMapIndikator != null){
                hideDetailMapIndikator();
            }
            var anaks = parent.childNodes;
            anaks.forEach(anak=>{
                anak.style.background = 'red';
            });
            lastSelectedRowMapIndikator = parent;
            namaMapproduk = data['nama_produk'];
            idMapproduk = data['id_produk'];
            namaMapIndikator = data['nama_indikator_hasil'];
            idMapIndikator = data['id'];
			
			apiPOST('Setup/getProdukLab', {}, hasil => {
				var data1 = hasil['data'];
				var prod = '';
				prod += '<option value="0">Pilih Produk</option>';
				
				for (var i = 0; i < data1.length; i++) {
					if(namaMapproduk==data1[i]['nama_produk']){
						prod += '<option value="'+ data1[i]['id_produk'] +'"selected>'+data1[i]['nama_produk']+' / '+data1[i][	'id_produk']+'</option>';
					}else{
						prod += '<option value="'+ data1[i]['id_produk'] +'">'+data1[i]['nama_produk']+' / '+data1[i]['id_produk']+'</option>';
					}
				}
				document.getElementById('produk_map_indik_LIS').innerHTML = prod;
			});
			
			apiPOST('Setup/getIndiLIS', {}, hasil => {
				var data2 = hasil['data'];
				var map = '';
				map += '<option value="0">Pilih Indikator</option>';
				
				for (var i = 0; i < data2.length; i++) {
					if(namaMapIndikator==data2[i]['nama_indikator_hasil']){
						map += '<option value="'+ data2[i]['id'] +'"selected>'+data2[i]['nama_indikator_hasil']+' ('+data2[i]['unittest']+')/ '+data2[i]['id']+'</option>';
					}else{
						map += '<option value="'+ data2[i]['id'] +'">'+data2[i]['nama_indikator_hasil']+' ('+data2[i]['unittest']+')/ '+data2[i]['id']+'</option>';
					}
				}
				document.getElementById('indikator_map_indik_LIS').innerHTML = map;
			});
            setDisabeledMapIndikator(true);
        }
    }
    
    function hideDetailMapIndikator(){
        var anaks = lastSelectedRowMapIndikator.childNodes;
        if(anaks != null){
            anaks.forEach(anak=>{
                anak.style.background = 'white';
            });
        }
        namaMapIndikator = '';
        idMapIndikator = '';
        idMapproduk = '';
        namaMapproduk = '';
        lastSelectedRowMapIndikator = null;
        document.getElementById('produk_map_indik_LIS').value = '';
        document.getElementById('indikator_map_indik_LIS').value = '';
        setDisabeledMapIndikator(true);
    }
	
	function editMapIndikator(){
		document.getElementById('produk_map_indik_LIS').disabled = false;
        document.getElementById('indikator_map_indik_LIS').disabled = false;
        document.getElementById('save_edit_map_indik_LIS').disabled = false;
		$('#save_map_indik_LIS').hide();
		$('#save_edit_map_indik_LIS').show();
	}
	
	function saveEditMapIndikator(){
		$('#save_map_indik_LIS').show();
		$('#save_edit_map_indik_LIS').hide();
		var param={
			id_produk:$('#produk_map_indik_LIS').val(),
			id_produk_lama:idMapproduk,
			id_indikator_hasil:$('#indikator_map_indik_LIS').val(),
			id_indikator_hasil_lama:idMapIndikator
		}
		
		// console.log(param);
		
		apiPOST('Setup/editMapIndi', param, hasil => {
			loadawalMapIndikator();
			loadprodukMapIndikator();
			loadListIndikator();
		})
	}
	
	function saveIndikator(){
		var param = {
			id_produk:$('#produk_map_indik_LIS').val(),
			id_indikator_hasil:$('#indikator_map_indik_LIS').val()
		};
		
		apiPOST('Setup/saveMapIndi', param, hasil => {
          loadawalMapIndikator();
		  loadprodukMapIndikator();
		  loadListIndikator();
        }).then(value => {
			cariListMapIndikator = true;
			selesaiLoadingAwalMapIndikator();
		});
	}
    
    function setDisabeledMapIndikator(flag){
        document.getElementById('produk_map_indik_LIS').disabled = flag;
        document.getElementById('indikator_map_indik_LIS').disabled = flag;
        document.getElementById('save_map_indik_LIS').disabled = flag;
		document.getElementById('save_edit_map_indik_LIS').disabled = flag;
    }
</script>