<div class="overlay-wrapper" id="loading_indik_hasil">
    <div class="overlay">
      <i class="fas fa-3x fa-sync-alt fa-spin"></i>
    </div>
</div>
<div class="row m-2">
    <div class="col col-sm-auto">
        <button id="add_indik_hasil" type="button" onclick='showDetailIndikator();' class="btn bg-gradient-success btn-xs"><i class="fas fa-print"> Tambah</i></button>
    </div> 
    <div class="col col-sm-auto">
        <button id="edit_indik_hasil" type="button" onclick='editIndikator()' class="btn bg-gradient-warning btn-xs" style=""><i class="fas fa-brush"> Edit</i></button>
    </div>
	<div class="col col-sm-auto">
        
    </div>
    <div class="col">
        
    </div>
    <div class="col">
        <button id="cancel_indik_hasil" type="button" onclick='' class="btn bg-gradient-danger btn-xs" style="display: none;"><i class="fas fa-print"> Batal</i></button>
    </div>
</div>
<div class="row m-2">
    <div class="col">
        <label>Nama Indikator</label>
        <input type="text"  id="nama_indik_hasil" class="form-control form-control-xs" disabled="true">
    </div>
    <div class="col">
        <label>Satuan</label>
        <input type="text"  id="satuan_indik_hasil" class="form-control form-control-xs" disabled="true">
    </div>
    <div class="col">
        <label>Nilai Normal</label>
		<input type="text" id="nilai_norm_indik_hasil" class="form-control form-control-xs" disabled="true"/>
    </div>
	<div class="col">
		<button id="save_indik_hasil" type="button" onclick='saveIndikator()' class="btn bg-gradient-warning btn-xs" style="margin-block-start: 22px;margin-left: 10px;" disabled="true"><i class="fas fa-plus"> Simpan</i></button>
		<button id="save_edit_indik_hasil" type="button" onclick='saveEditMapIndikator()' class="btn bg-gradient-warning btn-xs collapse" style="margin-block-start: 22px;margin-left: 10px;" disabled="true"><i class="fas fa-plus"> Edit</i></button>
		<button id="delete_indik_hasil" type="button" onclick='delIndikator()' class="btn bg-gradient-danger btn-xs" style="margin-block-start: 22px;margin-left: 10px;" disabled="true"><i class="fas fa-trash" > Hapus</i></button>
    </div>
</div>
<div class="row m-1">
    <div class="col">
        <table
            id="list_indik_hasil"
            data-single-select="true"
            data-click-to-select="true"
            data-sticky-header="true"
            data-header-style="headerStyleLookupListIndikator"
            data-row-style="rowStyleLookupListIndikator"
            data-pagination="true"
            data-pagination-parts="['pageInfo', 'pageList']"
            class="table-sm">
          <thead>
            <tr>
              <th data-field="id_indikator_hasil" data-sortable="true">ID</th>
              <th data-field="nama_indikator_hasil" data-sortable="true">Nama Indikator</th>
              <th data-field="satuan_indikator_hasil" data-sortable="true">Satuan</th>
              <th data-field="nilai_hasil_normal" data-sortable="true">Nilai Normal</th>
            </tr>
          </thead>
        </table>
    </div>
</div>

<script>
    document.getElementById('loading_indik_hasil').style.height = document.documentElement.clientHeight;
    var cariListIndikator = false;
    var idIndikator = '';
    var lastSelectedRowIndikator = null;
	
	$(document).ready(function() {
		loadawalIndikator();
	});
    
    $('#list_indik_hasil').bootstrapTable({
        onClickRow: (row, element, field)=>{
            if(row['id_indikator_hasil'] == idIndikator){
               hideDetailIndikator();
            }else{
               showDetailIndikator(row, element[0]);
            }
        }
    });
    
	function loadawalIndikator(){
		$('#list_indik_hasil').bootstrapTable('removeAll');
		apiPOST('Setup/getIndiHasil', {}, hasil => {
			if(hasil !== null){
				$('#list_indik_hasil').bootstrapTable('append', hasil['data']);
			}
		}).then(value => {
			cariListIndikator = true;
			selesaiLoadingAwalIndikator();
		});
	}
	
    function selesaiLoadingAwalIndikator(){
        if(cariListIndikator){
            document.getElementById('loading_indik_hasil').style.display = 'none';
        }
    }
    
    function headerStyleLookupListIndikator(column){
        return {
            css: {
                background: '#a8d4da',
                color: 'black',
                border: '2px solid black',
                padding: '0px'
            }
        };
    }
    
    function rowStyleLookupListIndikator(row, index){
        return {
            css: {
                background: 'white',
                border: '2px solid black',
                padding: '2px'
            }
        };
    }
    
    function showDetailIndikator(data = null, parent = null){
        if(data == null & parent == null){            
            setDisabeledIndikator(false);
        }else{
            if(lastSelectedRowIndikator != null){
                hideDetailIndikator();
            }
            var anaks = parent.childNodes;
            anaks.forEach(anak=>{
                anak.style.background = 'red';
            });
            lastSelectedRowIndikator = parent;
            idIndikator = data['id_indikator_hasil'];
            document.getElementById('nama_indik_hasil').value = data['nama_indikator_hasil'];
            document.getElementById('satuan_indik_hasil').value = data['satuan_indikator_hasil'];
            document.getElementById('nilai_norm_indik_hasil').value = data['nilai_hasil_normal'];
            setDisabeledIndikator(true);
        }
    }
    
    function hideDetailIndikator(){
        var anaks = lastSelectedRowIndikator.childNodes;
        if(anaks != null){
            anaks.forEach(anak=>{
                anak.style.background = 'white';
            });
        }
        idIndikator = '';
        lastSelectedRowIndikator = null;
        document.getElementById('nama_indik_hasil').value = '';
        document.getElementById('satuan_indik_hasil').value = '';
        document.getElementById('nilai_norm_indik_hasil').value = '';
        setDisabeledIndikator(true);
    }
	
	function saveIndikator(){
		var param = {
			nama:document.getElementById('nama_indik_hasil').value,
			satuan:document.getElementById('satuan_indik_hasil').value,
			nilai:document.getElementById('nilai_norm_indik_hasil').value,
		};
		
		apiPOST('Setup/saveIndiHasil', param, hasil => {
          loadawalIndikator();
        });
	}
	
	function editIndikator(){
		document.getElementById('nama_indik_hasil').disabled = false;
        document.getElementById('satuan_indik_hasil').disabled = false;
        document.getElementById('nilai_norm_indik_hasil').disabled = false;
        document.getElementById('save_edit_indik_hasil').disabled = false;
        document.getElementById('delete_indik_hasil').disabled = false;
		$('#save_indik_hasil').hide();
		$('#save_edit_indik_hasil').show();
	}
	
	function saveEditMapIndikator(){
		$('#save_indik_hasil').show();
		$('#save_edit_indik_hasil').hide();
		var param={
			nama:$('#nama_indik_hasil').val(),
			satuan:$('#satuan_indik_hasil').val(),
			nilai:$('#nilai_norm_indik_hasil').val()
		}
		
		console.log(param);
		
		apiPOST('Setup/editIndiHasil', param, hasil => {
			loadawalMapIndikator();
			loadprodukMapIndikator();
			loadListIndikator();
		})
	}
	
	function delIndikator(){
		$('#save_indik_hasil').show();
		$('#save_edit_indik_hasil').hide();
		var param = {
			nama:document.getElementById('nama_indik_hasil').value,
			satuan:document.getElementById('satuan_indik_hasil').value,
			nilai:document.getElementById('nilai_norm_indik_hasil').value,
		};
		console.log(param);
		apiPOST('Setup/delIndiHasil', param, hasil => {
          // loadawalIndikator();
        });
	}
    
    function setDisabeledIndikator(flag){
        document.getElementById('nama_indik_hasil').disabled = flag;
        document.getElementById('satuan_indik_hasil').disabled = flag;
        document.getElementById('nilai_norm_indik_hasil').disabled = flag;
        document.getElementById('save_indik_hasil').disabled = flag;
        document.getElementById('delete_indik_hasil').disabled = flag;
    }
</script>