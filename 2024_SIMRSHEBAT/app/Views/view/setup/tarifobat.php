<div class="col-md-12 p-2">
  <div class="card card-outline">
    <div class="overlay-wrapper" id="loading_setup_tarifobat">
      <div class="overlay dark">
        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
      </div>
    </div>
    
    <div class="card-body p-1" style="max-height: 500px; overflow: auto;">
        <div class="card" style="box-shadow: 0 0 3px #343a40; margin-bottom: 0;">
        <div>
          <div class="card-header p-1 darkgrey-custom">
            <div class="row">
                <!-- <div class="col-sm-auto">
                    <button type="button" onclick='tarifobat_showDetail();' class="btn bg-gradient-secondary btn-xs"><i class="fas fa-plus"> Tambah Tarif Obat</i>
                </div> -->
				<div class="col-sm-auto">
					<form method="post" enctype="multipart/form-data">
					  Select File to upload:
					  <input type="file" name="fileToUploadTarifobat" id="fileToUploadTarifobat" multiple accept=".csv">
					  <button type="button" onclick="importTarifobat()" class="btn bg-gradient-secondary btn-xs"><i class="fas fa-file"></i> Import Obat</i></button>
					</form>                    
                </div>
            </div>
            <!-- END LETAK BUTTON -->            
          </div>
        </div>
        </div>

        <div class="row p-2">
            <div class="col-sm-1">
                <label>Id Tarif Obat</label>
                <input type="number" id="tarifobat_tarif" class="form-control form-control-xs" placeholder="Otomatis"  disabled="true">
            </div>
            <div class="col-sm-2">
                <label>Kepemilikan Obat</label>
                <select id="tarifobat_kdmilik" class="form-control form-control-xs" disabled="true"></select>
            </div>
            <div class="col-sm-2">
                <label>Pilih Obat</label>
                <select id="tarifobat_kdobat" class="form-control form-control-xs" disabled="true"></select>
            </div>
            <div class="col-sm-2">
                <label>Harga Satuan</label>
                <input type="number"  id="tarifobat_hargabeli" class="form-control form-control-xs" disabled="true">
            </div>
            <div class="col-sm-1">
                <label>Fraction</label>
                <input type="number"  id="tarifobat_frac" class="form-control form-control-xs" disabled="true" value="0">
            </div>
            <div class="col-sm-2">
                <label>&nbsp;</label>
                <button type="button" onclick='tarifobat_addeditTarifObat();' class="btn bg-gradient-warning btn-xs" id="tarifobat_addeditTarifObat">
            </div>
        </div>
        <div class="row m-1">
            <div class="col">
                <table
                    id="list_data_tarifobat"
                    data-single-select="true"
                    data-click-to-select="true"
                    data-sticky-header="true"
                    data-header-style="headerStyleLookupListSetuptarifobat"
                    data-row-style="rowStyleLookupListSetuptarifobat"
                    data-pagination="true"
                    data-pagination-parts="['pageInfo', 'pageList']"
                    data-search="true"
                    class="table-sm">
                  <thead>
                    <tr>
                      <th data-field="kd_obat" data-sortable="true" data-width="30">Kode Obat</th>
                      <th data-field="nama_obat" data-sortable="true">Nama Obat</th>
                      <th data-field="harga" data-sortable="true" data-width="100" title="Harga Satuan Belum di MarkUp">Harga Satuan</th>
                      <th data-field="fraction" data-width="100">Fraction</th>
                      <th data-field="milik" data-sortable="true" data-width="100">Kepemilikan Obat</th>
                    </tr>
                  </thead>
                </table>
            </div>
        </div>
    </div>

  </div>  
</div>

<script>
    document.getElementById('loading_setup_tarifobat').style.height = document.documentElement.clientHeight;
    var tarifobat_CariListData = false;
    var tarifobat_IdTarif = '';
    var lastSelectedRowSetuptarifobat = null;
    var proses = '';
    document.getElementById('tarifobat_addeditTarifObat').style.display = 'none';

    $('#list_data_tarifobat').bootstrapTable({
        onClickRow: (row, element, field)=>{
            if(row['list_data_tarifobat_id_tarif'] == tarifobat_IdTarif){
               tarifobat_hideDetail();
            }else{
               tarifobat_showDetail(row, element[0]);
            }
        }
    });
    
    apiPOST('Setup/getDataObat', null, hasil => {
        var data = hasil['data'];
        var Obat = '';
          Obat += '<option value="0">Pilih Obat</option>';
        for (var i = 0; i < data.length; i++) {
          Obat += '<option value="'+ data[i]['kd_obat'] +'">'+ data[i]['nama_obat']+'<br>Fraction : '+ data[i]['fraction']+'</option>';
        }
        document.getElementById('tarifobat_kdobat').innerHTML = Obat;
    });

    apiPOST('Setup/getKepemilikianObat', null, hasil => {
        var data = hasil['data'];
        var milik = '';
          milik += '<option value="0">Pilih Kepemilikan Obat</option>';
        for (var i = 0; i < data.length; i++) {
          milik += '<option value="'+ data[i]['kd_milik'] +'">'+ data[i]['milik']+'</option>';
        }
        document.getElementById('tarifobat_kdmilik').innerHTML = milik;
    });

    tarifobat_loaddata();
    
    function tarifobat_loaddata(){
        apiPOST('Setup/getListtarifobat', {}, hasil => {
            if(hasil !== null){
                $('#list_data_tarifobat').bootstrapTable('append', hasil['data']);
            }
        }).then(value => {
            tarifobat_CariListData = true;
            selesaiLoadingAwalSetuptarifobat();
        });
    }

    function selesaiLoadingAwalSetuptarifobat(){
        if(tarifobat_CariListData){
            document.getElementById('loading_setup_tarifobat').style.display = 'none';
        }
    }
    
    function headerStyleLookupListSetuptarifobat(column){
        return {
            css: {
                background: '#a8d4da',
                color: 'black',
                border: '2px solid black',
                padding: '0px'
            }
        };
    }
    
    function rowStyleLookupListSetuptarifobat(row, index){
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
    
    function tarifobat_showDetail(data = null, parent = null){
        if(data == null & parent == null){            
            setDisabeledSetuptarifobat(false);
            document.getElementById('tarifobat_tarif').value      = '';
            document.getElementById('tarifobat_kdobat').value     = '0';
            document.getElementById('tarifobat_hargabeli').value  = '';
            document.getElementById('tarifobat_kdmilik').value    = '0';
            document.getElementById('tarifobat_frac').value       = '0';
        }else{
            if(lastSelectedRowSetuptarifobat != null){
                tarifobat_hideDetail();
            }
            var anaks = parent.childNodes;
            anaks.forEach(anak=>{
                if (localStorage.getItem("mode") == "dark-theme") {
                    anak.style.background = 'transparant';
                }else{
                    anak.style.background = 'darkgrey';
                }
            });
            lastSelectedRowSetuptarifobat = parent;
            tarifobat_IdTarif = data['id_tarif_obat'];
            
            document.getElementById('tarifobat_tarif').value      = data['id_tarif_obat'];
            document.getElementById('tarifobat_kdobat').value     = data['kd_obat'];
            document.getElementById('tarifobat_hargabeli').value  = data['harga'];
            document.getElementById('tarifobat_kdmilik').value    = data['kd_milik'];
            document.getElementById('tarifobat_frac').value       = data['fraction'];
            setDisabeledSetuptarifobat(true);
        }
    }
    
    function tarifobat_hideDetail(){
        var anaks = lastSelectedRowSetuptarifobat.childNodes;
        if(anaks != null){
            anaks.forEach(anak=>{
                if (localStorage.getItem("mode") == "dark-theme") {
                    anak.style.background = 'transparant';
                }else{
                    anak.style.background = 'white';
                }
            });
        }
        tarifobat_IdTarif = '';
        lastSelectedRowSetuptarifobat = null;
        document.getElementById('tarifobat_tarif').value      = '';
        document.getElementById('tarifobat_kdobat').value     = '0';
        document.getElementById('tarifobat_hargabeli').value  = '';
        document.getElementById('tarifobat_kdmilik').value    = '0';
        document.getElementById('tarifobat_frac').value       = '0';

        setDisabeledSetuptarifobat(true);
    }
    
    function setDisabeledSetuptarifobat(flag){
        //document.getElementById('tarifobat_tarif').disabled   = flag;
        proses = flag;
        document.getElementById('tarifobat_addeditTarifObat').style.display = 'block';
        $('#tarifobat_addeditTarifObat').html("<i class='fas fa-edit'></i> Edit Obat");
        document.getElementById('tarifobat_kdobat').disabled      = flag;
        document.getElementById('tarifobat_hargabeli').disabled   = false;
        document.getElementById('tarifobat_kdmilik').disabled     = false;
        document.getElementById('tarifobat_frac').disabled        = flag;

        // if (flag == true){
        //     document.getElementById('tarifobat_kdobat').disabled      = false;
        //     document.getElementById('tarifobat_hargabeli').disabled   = false;
        //     document.getElementById('tarifobat_kdmilik').disabled     = false;
        //     $('#tarifobat_addeditTarifObat').html("<i class='fas fa-edit'></i> Edit Obat");
        //     proses = flag;
        // }else{
        //     document.getElementById('tarifobat_kdobat').disabled      = flag;
        //     document.getElementById('tarifobat_hargabeli').disabled   = flag;
        //     document.getElementById('tarifobat_kdmilik').disabled     = flag;
        //     $('#tarifobat_addeditTarifObat').html("<i class='fas fa-save'></i> Simpan Obat");
        //     proses = flag;
        // }
    }
    
    function tarifobat_addeditTarifObat(){
        document.getElementById('loading_setup_tarifobat').style.display = 'block';
        var param = {
          proses        : proses,
          id_tarif_obt  : document.getElementById("tarifobat_tarif").value,
          kd_obat       : document.getElementById("tarifobat_kdobat").value,
          harga         : document.getElementById("tarifobat_hargabeli").value,
          kd_milik      : document.getElementById("tarifobat_kdmilik").value,
        };

        apiPOST('Setup/tarifobat_addeditTarifObat', param, hasil => {
          if (hasil !== null) {
            document.getElementById('tarifobat_addeditTarifObat').style.display = 'none';
            document.getElementById('loading_setup_tarifobat').style.display    = 'none';
            document.getElementById('tarifobat_tarif').value      = '';
            document.getElementById('tarifobat_kdobat').value     = '0';
            document.getElementById('tarifobat_hargabeli').value  = '0';
            document.getElementById('tarifobat_kdmilik').value    = '0';
            document.getElementById('tarifobat_frac').value       = '0';
            $('#list_data_tarifobat').bootstrapTable('removeAll');
            tarifobat_loaddata();
          }
        });
    }
	
	function importTarifobat(){
		var taxtarray;	
		var input= document.getElementById('fileToUploadTarifobat');
		var berkas = input.files[0];
		
		var reader = new FileReader();
		var content = reader.readAsText(berkas);
		reader.onload = function (event) {
		  var text = event.target.result; 
		  taxtarray=csvToArrayTarifobat(text);
		  apiPOST('Setup/importTarifobat', taxtarray, hasil => {
			if (hasil !== null) {
            
            }
		  });
		  console.log(taxtarray);
		};		
	}
	
	function csvToArrayTarifobat(str,delimiter=","){
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