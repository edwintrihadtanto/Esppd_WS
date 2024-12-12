<div class="col-md-12 p-2">
  <div class="card card-outline">
    <div class="overlay-wrapper" id="loading_setup_tarifobatcustcust">
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
                    <button type="button" onclick='tarifobatcust_showDetail();' class="btn bg-gradient-secondary btn-xs"><i class="fas fa-plus"> Tambah</i>
                </div>
                <div class="col-sm-auto">
                    <form method="post" enctype="multipart/form-data">
                      Select File to upload:
                      <input type="file" name="fileToUploadTarifobatcust" id="fileToUploadTarifobatcust" multiple accept=".csv">
                      <button type="button" onclick="importTarifobatcust()" class="btn bg-gradient-secondary btn-xs"><i class="fas fa-file"></i> Import Obat Tarif Cust</i></button>
                    </form>                    
                </div>
            </div>
            <!-- END LETAK BUTTON -->            
          </div>
        </div>
        </div>

        <div class="row p-2">
            <div class="col-sm-1">
                <label>Kode</label>
                <input type="number" id="tarifobatcust_id" class="form-control form-control-xs" placeholder="Otomatis"  disabled="true">
            </div>
            <div class="col-sm-auto">
                <label>Pilih Unit</label>
                <select id="tarifobatcust_unit" class="form-control form-control-xs" disabled="true"></select>
            </div>
            <div class="col-sm-2">
                <label>Penjamin</label>
                <select id="tarifobatcust_penjamin" class="form-control form-control-xs" disabled="true"></select>
            </div>
            <div class="col-sm-2">
                <label>Jenis Unit</label>
                <select id="tarifobatcust_jenisunit" class="form-control form-control-xs" disabled="true"></select>
            </div>
            <div class="col-sm-auto">
                <label>Jenis Tarif</label>
                <select id="tarifobatcust_jenitarif" class="form-control form-control-xs" disabled="true"></select>
            </div>
            <div class="col-sm-auto">
                <label>Tag</label>
                <select id="tarifobatcust_tag" class="form-control form-control-xs" disabled="true"></select>
            </div>
            <div class="col-sm-1">
                <label>Markup</label>
                <input type="number"  id="tarifobatcust_markup" class="form-control form-control-xs" disabled="true" value="1.25">
            </div>
            <div class="col-sm-auto">
                <label>&nbsp;</label>
                <button type="button" onclick='tarifobatcust_addedit();' class="btn btn-info btn-xs" id="tarifobatcust_addedit"></button>
            </div>
            <div class="col-sm-1">
                <label>&nbsp;</label>
                <button type="button" onclick='tarifobatcust_hapus();' class="btn btn-outline-danger btn-xs" id="tarifobatcust_hapus"><i class="fa fa-trash"> Hapus</i></button>
            </div>
        </div>
        <div class="row m-1">
            <div class="col">
                <table
                    id="list_data_tarifobatcust"
                    data-single-select="true"
                    data-click-to-select="true"
                    data-sticky-header="true"
                    data-header-style="headerStyleLookupListSetuptarifobatcust"
                    data-row-style="rowStyleLookupListSetuptarifobatcust"
                    data-pagination="true"
                    data-pagination-parts="['pageInfo', 'pageList']"
                    data-search="true"
                    class="table-sm">
                  <thead>
                    <tr>
                      <th data-field="nama_unit" data-sortable="true" data-width="30">Unit Farmasi</th>
                      <th data-field="kelompok_penjamin" data-sortable="true">Kelompok Penjamin</th>
                      <th data-field="deskripsi_jenis_unit" data-sortable="true" data-width="100">Jenis Unit</th>
                      <th data-field="jenis_tarif" data-width="100">Jenis Tarif</th>
                      <th data-field="jumlah" data-width="100">Jumlah</th>
                      <th data-field="tag_else" data-width="100">Tag</th>
                    </tr>
                  </thead>
                </table>
            </div>
        </div>
    </div>

  </div>  
</div>

<script>
    document.getElementById('loading_setup_tarifobatcustcust').style.height = document.documentElement.clientHeight;
    var tarifobatcust_CariListData = false;
    var tarifobatcust_Id = '';
    var lastSelectedRowSetuptarifobatcust = null;
    var proses = '';
    document.getElementById('tarifobatcust_addedit').style.display  = 'none';
    document.getElementById('tarifobatcust_hapus').style.display    = 'none';

    $('#list_data_tarifobatcust').bootstrapTable({
        onClickRow: (row, element, field)=>{
            if(row['list_data_tarifobatcust_id'] == tarifobatcust_Id){
               tarifobatcust_hideDetail();
            }else{
               tarifobatcust_showDetail(row, element[0]);
            }
        }
    });
    var param = {
        id_unit : '',
    }
    apiPOST('Setup/getUnitFarmasi', param, hasil => {
        var data = hasil['data'];
        var unit = '';
          unit += '<option value="">Pilih Unit</option>';
        for (var i = 0; i < data.length; i++) {
          unit += '<option value="'+ data[i]['id_unit'] +'">'+ data[i]['nama_unit']+'</option>';
        }
        document.getElementById('tarifobatcust_unit').innerHTML = unit;
    });

    apiPOST('Setup/getkelompok_penjamin', null, hasil => {
        var data = hasil['data'];
        var penj = '';
          penj += '<option value="">Pilih Penjamin</option>';
        for (var i = 0; i < data.length; i++) {
          penj += '<option value="'+ data[i]['id_kelompok_penjamin'] +'">'+ data[i]['kelompok_penjamin']+'</option>';
        }
        document.getElementById('tarifobatcust_penjamin').innerHTML = penj;
    });

    apiPOST('Setup/getJenisUnit', null, hasil => {
        var data = hasil['data'];
        var jnis = '';
          jnis += '<option value="">Pilih Jenis Unit</option>';
        for (var i = 0; i < data.length; i++) {
          jnis += '<option value="'+ data[i]['jenis_unit'] +'">'+ data[i]['deskripsi_jenis_unit']+'</option>';
        }
        document.getElementById('tarifobatcust_jenisunit').innerHTML = jnis;
    });

    apiPOST('Setup/getJenisTarif', null, hasil => {
        var data = hasil['data'];
        var jnisT = '';
          jnisT += '<option value="">Pilih Jenis Tarif</option>';
        for (var i = 0; i < data.length; i++) {
          jnisT += '<option value="'+ data[i]['id_jenis_tarif'] +'">'+ data[i]['jenis_tarif']+'</option>';
        }
        document.getElementById('tarifobatcust_jenitarif').innerHTML = jnisT;
    });

    apiPOST('Setup/getTagTarif', null, hasil => {
        var data = hasil['data'];
        var tag = '';
        for (var i = 0; i < data.length; i++) {
          tag += '<option value="'+ data[i]['id'] +'">'+ data[i]['tag']+'</option>';
        }
        document.getElementById('tarifobatcust_tag').innerHTML = tag;
    });

    tarifobatcust_loaddata();
    
    function tarifobatcust_loaddata(){
        apiPOST('Setup/getListtarifobatcust', {}, hasil => {
            if(hasil !== null){
                $('#list_data_tarifobatcust').bootstrapTable('append', hasil['data']);
            }
        }).then(value => {
            tarifobatcust_CariListData = true;
            selesaiLoadingAwalSetuptarifobatcust();
        });
    }

    function selesaiLoadingAwalSetuptarifobatcust(){
        if(tarifobatcust_CariListData){
            document.getElementById('loading_setup_tarifobatcustcust').style.display = 'none';
        }
    }
    
    function headerStyleLookupListSetuptarifobatcust(column){
        return {
            css: {
                background: '#a8d4da',
                color: 'black',
                border: '2px solid black',
                padding: '0px'
            }
        };
    }
    
    function rowStyleLookupListSetuptarifobatcust(row, index){
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
    
    function tarifobatcust_showDetail(data = null, parent = null){
        if(data == null & parent == null){            
            setDisabeledSetuptarifobatcust(false);
            tarifobatcust_empty();
        }else{
            if(lastSelectedRowSetuptarifobatcust != null){
                tarifobatcust_hideDetail();
            }
            var anaks = parent.childNodes;
            anaks.forEach(anak=>{
                if (localStorage.getItem("mode") == "dark-theme") {
                    anak.style.background = 'transparant';
                }else{
                    anak.style.background = 'darkgrey';
                }
            });
            lastSelectedRowSetuptarifobatcust = parent;
            tarifobatcust_Id = data['id'];
            
            document.getElementById('tarifobatcust_id').value           = data['id'];
            document.getElementById('tarifobatcust_unit').value         = data['id_unit'];
            document.getElementById('tarifobatcust_penjamin').value     = data['id_kelompok_penjamin'];
            document.getElementById('tarifobatcust_jenisunit').value    = data['jenis_unit'];
            document.getElementById('tarifobatcust_jenitarif').value    = data['id_jenis_tarif'];
            document.getElementById('tarifobatcust_tag').value          = data['tag'];
            document.getElementById('tarifobatcust_markup').value       = data['jumlah'];

            setDisabeledSetuptarifobatcust(true);
        }
    }
    
    function tarifobatcust_hideDetail(){
        var anaks = lastSelectedRowSetuptarifobatcust.childNodes;
        if(anaks != null){
            anaks.forEach(anak=>{
                if (localStorage.getItem("mode") == "dark-theme") {
                    anak.style.background = 'transparant';
                }else{
                    anak.style.background = 'white';
                }
            });
        }
        tarifobatcust_Id = '';
        lastSelectedRowSetuptarifobatcust = null;
        tarifobatcust_empty();

        setDisabeledSetuptarifobatcust(true);
    }
    
    function setDisabeledSetuptarifobatcust(flag){
        
        proses = flag;
        
        document.getElementById('tarifobatcust_addedit').style.display = 'block';
        
        if (flag == true){
            
            document.getElementById('tarifobatcust_unit').disabled          = false;
            document.getElementById('tarifobatcust_penjamin').disabled      = false;
            document.getElementById('tarifobatcust_jenisunit').disabled     = false;
            document.getElementById('tarifobatcust_jenitarif').disabled     = false;
            document.getElementById('tarifobatcust_tag').disabled           = false;
            document.getElementById('tarifobatcust_markup').disabled        = false;

            $('#tarifobatcust_addedit').html("<i class='fas fa-edit'></i> Edit Tarif");
            document.getElementById('tarifobatcust_hapus').style.display = 'block';

        }else{
            
            document.getElementById('tarifobatcust_unit').disabled          = flag;
            document.getElementById('tarifobatcust_penjamin').disabled      = flag;
            document.getElementById('tarifobatcust_jenisunit').disabled     = flag;
            document.getElementById('tarifobatcust_jenitarif').disabled     = flag;
            document.getElementById('tarifobatcust_tag').disabled           = flag;
            document.getElementById('tarifobatcust_markup').disabled        = flag;

            $('#tarifobatcust_addedit').html("<i class='fas fa-save'></i> Simpan Tarif");
            document.getElementById('tarifobatcust_hapus').style.display = 'none';
        }

        document.getElementById('tarifobatcust_unit').focus();
    }
    
    function tarifobatcust_addedit(){
        document.getElementById('loading_setup_tarifobatcustcust').style.display = 'block';
        var param = {
          proses        : proses,
          id_tarif_cust : document.getElementById("tarifobatcust_id").value,
          id_unit       : document.getElementById("tarifobatcust_unit").value,
          id_kelompok   : document.getElementById("tarifobatcust_penjamin").value,
          jenis_unit    : document.getElementById("tarifobatcust_jenisunit").value,
          jumlah        : document.getElementById("tarifobatcust_markup").value,
          tag           : document.getElementById("tarifobatcust_tag").value,
          jenis_tarif   : document.getElementById("tarifobatcust_jenitarif").value
        };

        apiPOST('Setup/tarifobatcust_addedit', param, hasil => {
          if (hasil !== null) {
            tarifobatcust_empty();
            $('#list_data_tarifobatcust').bootstrapTable('removeAll');
            tarifobatcust_loaddata();
          }
        });
    }

    function tarifobatcust_hapus(){
        document.getElementById('loading_setup_tarifobatcustcust').style.display = 'block';
        var param = {
          id_tarif_obtcust  : document.getElementById("tarifobatcust_id").value
        };

        apiPOST('Setup/tarifobatcust_hapus', param, hasil => {
          if (hasil !== null) {
            tarifobatcust_empty();
            document.getElementById('tarifobatcust_addedit').style.display  = 'none';
            $('#list_data_tarifobatcust').bootstrapTable('removeAll');
            tarifobatcust_loaddata();
          }
        });
    }
    
    function tarifobatcust_empty(){
        document.getElementById('tarifobatcust_id').value           = '';
        document.getElementById('tarifobatcust_unit').value         = '';
        document.getElementById('tarifobatcust_penjamin').value     = '';
        document.getElementById('tarifobatcust_jenisunit').value    = '';
        document.getElementById('tarifobatcust_jenitarif').value    = '';
        document.getElementById('tarifobatcust_tag').value          = '1';
        document.getElementById('tarifobatcust_markup').value       = '1.25';
        
        document.getElementById('tarifobatcust_hapus').style.display    = 'none';
    }

    function importTarifobatcust(){
        var taxtarray;  
        var input= document.getElementById('fileToUploadTarifobatcust');
        var berkas = input.files[0];
        
        var reader = new FileReader();
        var content = reader.readAsText(berkas);
        reader.onload = function (event) {
          var text = event.target.result; 
          taxtarray=csvToArrayTarifobatcust(text);
          apiPOST('Setup/importTarifobatcust', taxtarray, hasil => {
            if (hasil !== null) {
            
            }
          });
          console.log(taxtarray);
        };      
    }
    
    function csvToArrayTarifobatcust(str,delimiter=","){
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