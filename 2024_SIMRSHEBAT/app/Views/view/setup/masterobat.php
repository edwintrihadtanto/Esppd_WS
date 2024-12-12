<div class="col-md-12 p-2">
  <div class="card card-outline">
    <div class="overlay-wrapper" id="loading_setup_masterobat">
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
                    <button type="button" onclick='MasterObat_showDetail();' class="btn bg-gradient-secondary btn-xs"><i class="fas fa-plus"> Tambah Obat</i>
                </div> 
				<div class="col-sm-auto">
					<form method="post" enctype="multipart/form-data">
					  Select File to upload:
					  <input type="file" name="fileToUploadMasterobat" id="fileToUploadMasterobat" multiple accept=".csv">
					  <button type="button" onclick="importMasterobat()" class="btn bg-gradient-secondary btn-xs"><i class="fas fa-file"></i> Import Obat</i></button>
					</form>                    
                </div>
            </div>
            <!-- END LETAK BUTTON -->            
          </div>
         </div>
        </div>

        <div class="row p-2">
            <div class="col-sm-1">
                <label>Id Obat</label>
                <input type="number"  id="masterobat_idobat" class="form-control form-control-xs" disabled="true" placeholder="Otomatis">
            </div>
            <div class="col-sm-1">
                <label>Satuan</label>
                <select id="masterobat_satuankecil" class="form-control form-control-xs" disabled="true"></select>
            </div>
            <div class="col-sm-3">
                <label>Nama Obat</label>
                <input type="text"  id="masterobat_nmobat" class="form-control form-control-xs" disabled="true">
            </div>
            <div class="col-sm-2">
                <label>Jenis Obat</label>
                <select id="masterobat_jenisobat" class="form-control form-control-xs" disabled="true"></select>
            </div>
            <div class="col-sm-2">
                <label>Sub Jenis Obat</label>
                <select id="masterobat_subjenisobat" class="form-control form-control-xs" disabled="true"></select>
            </div>
            <div class="col-sm-2">
                <label>Satuan Besar</label>
                <select id="masterobat_satuanbesar" class="form-control form-control-xs" disabled="true"></select>
            </div>
            <div class="col-sm-1">
                <label>Fraction</label>
                <input type="number" id="masterobat_frac" class="form-control form-control-xs" value="0" disabled="true">
            </div>
            <div class="col-sm-1">
                <label>High Alert</label>
                <select id="masterobat_ha" class="form-control form-control-xs" disabled="true">
                    <option value="f">Tidak</option>
                    <option value="t">Ya</option>
                </select>
            </div>
            <div class="col-sm-1">
                <label>Lasa</label>
                <select id="masterobat_lasa" class="form-control form-control-xs" disabled="true">
                    <option value="f">Tidak</option>
                    <option value="t">Ya</option>
                </select>
            </div>
            <div class="col-sm-2">
                <label>Tipe Obat</label>
                <select id="masterobat_tipe" class="form-control form-control-xs" disabled="true">
                    <option value="">-Pilih Tipe Obat-</option>
                    <option value="Obat Dalam">Obat Dalam</option>
                    <option value="Obat Luar">Obat Luar</option>
                </select>
            </div>
            <div class="col-sm-2">
                <label>Obat PRB (Program Rujuk Balik)</label>
                <select id="masterobat_tipeprb" class="form-control form-control-xs" disabled="true">
                    <option value="">-Tentukan-</option>
                    <option value="t">Ya</option>
                    <option value="f">Tidak</option>
                </select>
            </div>
            <div class="col-sm-2">
                <label>Obat Kronis</label>
                <select id="masterobat_tipekronis" class="form-control form-control-xs" disabled="true">
                    <option value="">-Tentukan-</option>
                    <option value="t">Ya</option>
                    <option value="f">Tidak</option>
                </select>
            </div>
            <div class="col-sm-2">
                <label>Obat Kemoterapi</label>
                <select id="masterobat_tipekemo" class="form-control form-control-xs" disabled="true">
                    <option value="">-Tentukan-</option>
                    <option value="t">Ya</option>
                    <option value="f">Tidak</option>
                </select>
            </div>
            <div class="col-sm-1">
                <label>Restriksi</label>
                <select id="masterobat_restriksi" class="form-control form-control-xs" disabled="true" onclick="cekstatusretriksi()">
                    <option value="f">Tidak</option>
                    <option value="t">Ya</option>
                </select>
            </div>
            <div class="col-sm-auto" id="masterobat_restriksiinfodiv">
                <label>Info Restriksi</label>
                <textarea id="masterobat_restriksiinfo" class="form-control p-1" disabled="true" style="width: 250px; height: 80px;"></textarea>
            </div>
            <div class="col-sm-2">
                <label>Qty Max Pemberian</label>
                <input type="number"  id="masterobat_restriksiqtymax" class="form-control form-control-xs" disabled="true" >
            </div>
            <div class="col-sm-2">
                <label>Hari Max Pemberian</label>
                <input type="number"  id="masterobat_restriksiharimax" class="form-control form-control-xs" disabled="true" >
            </div>
            <div class="col-sm-auto">
                <label>Aturan Retriksi Peresepan</label>
                <textarea id="masterobat_restriksiperesepan" class="form-control p-1" disabled="true" style="width: 250px; height: 80px;"></textarea>
            </div>
            <div class="col-sm-1">
                <label>Aktif</label>
                <select id="masterobat_aktf" class="form-control form-control-xs" disabled="true">
                    <option value="f">Tidak</option>
                    <option value="t">Ya</option>
                </select>
            </div>
            <div class="col-sm-auto">
                <label>&nbsp;</label>
                <button type="button" onclick='masterobat_addeditObat();' class="btn btn-success btn-xs" id="masterobat_addeditObat"></button>
            </div>
            <div class="col-sm-auto">
                <label>&nbsp;</label>
                <button type="button" onclick='masterobat_HapusObat();' class="btn btn-danger btn-xs" id="masterobat_HapusObat"><i class='fas fa-trash'></i> Hapus Obat</button>
            </div>
        </div>
        <div class="row ml-1 mr-1 mt-0" id="row_data_masterobat">
            <div class="col">
                <table
                    id="list_data_masterobat"
                    data-single-select="true"
                    data-click-to-select="true"
                    data-sticky-header="true"
                    data-header-style="headerStyleLookupListSetupMasterObat"
                    data-row-style="rowStyleLookupListSetupMasterObat"
                    data-pagination="true"
                    data-pagination-parts="['pageInfo', 'pageList']"
                    data-search="true"
                    class="table-sm">
                  <thead>
                    <tr>
                      <th data-field="kd_obat" data-sortable="true" data-width="20">ID Obat</th>
                      <th data-field="kd_satuan" data-sortable="true" data-width="100">Satuan</th>
                      <th data-field="nama_obat" data-sortable="true">Nama Obat</th>
                      <th data-field="nama_jenis" data-sortable="true" data-width="100">Jenis Obat</th>
                      <th data-field="sub_jenis" data-sortable="true" data-width="100">Sub Jenis Obat</th>
                      <th data-field="kd_sat_besar" data-sortable="true" data-width="100">Satuan Besar</th>
                      <th data-field="fraction" data-sortable="true" data-width="80">Fraction</th>
                      <th data-field="sts_high_alert_info" data-width="30">High Alert</th>
                      <th data-field="lasa_info" data-width="40">Lasa</th>
                      <th data-field="restriksi_info" data-sortable="true" data-width="40">Restriksi</th>
                    </tr>
                  </thead>
                </table>
            </div>
        </div>
    </div>
  </div>  
</div>

<script>
    // document.getElementById('row_data_masterobat').style.marginTop   = '-46px';
    // document.getElementById('row_data_masterobat').style.marginLeft  = '1px';
    // document.getElementById('row_data_masterobat').style.marginRight = '1px';
    document.getElementById('loading_setup_masterobat').style.height = document.documentElement.clientHeight;
    var Carilist_data_masterobat = false;
    var idObatSetupMasterObat = '';
    var lastSelectedRowSetupMasterObat = null;
    var proses = '';
    document.getElementById('masterobat_addeditObat').style.display = 'none';
    document.getElementById('masterobat_HapusObat').style.display = 'none';
    cekstatusretriksi();
    $('#list_data_masterobat').bootstrapTable({
        onClickRow: (row, element, field)=>{
            if(row['list_data_masterobat_idobat'] == idObatSetupMasterObat){
               MasterObat_hideDetail();
            }else{
               MasterObat_showDetail(row, element[0]);
            }
        }
    });
    apiPOST('Setup/getSatuanKecil', null, hasil => {
        var data = hasil['data'];
        var sat = '';
          sat += '<option value="0">Pilih Satuan Kecil</option>';
        for (var i = 0; i < data.length; i++) {
          sat += '<option value="'+ data[i]['kd_satuan'] +'">'+ data[i]['satuan']+'</option>';
        }
        document.getElementById('masterobat_satuankecil').innerHTML = sat;
    });

    apiPOST('Setup/getSatuanBesar', null, hasil => {
        var data = hasil['data'];
        var satb = '';
          satb += '<option value="0">Pilih Satuan Besar</option>';
        for (var i = 0; i < data.length; i++) {
          satb += '<option value="'+ data[i]['kd_satuan_besar'] +'">'+ data[i]['nama']+'</option>';
        }
        document.getElementById('masterobat_satuanbesar').innerHTML = satb;
    });

    apiPOST('Setup/getJenisObat', null, hasil => {
        var data = hasil['data'];
        var res = '';
          res += '<option value="0">Pilih Jenis Obat</option>';
        for (var i = 0; i < data.length; i++) {
          res += '<option value="'+ data[i]['kd_jns_obt'] +'">'+ data[i]['nama_jenis']+'</option>';
        }
        document.getElementById('masterobat_jenisobat').innerHTML = res;
    });

    apiPOST('Setup/getSubJenisObat', null, hasil => {
        var data = hasil['data'];
        var res = '';
          res += '<option value="0">Pilih Sub Jenis Obat</option>';
        for (var i = 0; i < data.length; i++) {
          res += '<option value="'+ data[i]['kd_sub_jns'] +'">'+ data[i]['sub_jenis']+'</option>';
        }
        document.getElementById('masterobat_subjenisobat').innerHTML = res;
    });

    MasterObat_loaddata();
    
    function MasterObat_loaddata(){
        document.getElementById('loading_setup_masterobat').style.display = 'block';
        apiPOST('Setup/getListObat', {}, hasil => {
            if(hasil !== null){
                Carilist_data_masterobat = true;
                selesaiLoadingAwalSetupMasterObat();
                $('#list_data_masterobat').bootstrapTable('append', hasil['data']);
            }
        });
        // .then(value => {
        //     selesaiLoadingAwalSetupMasterObat();
        // });
    }

    function selesaiLoadingAwalSetupMasterObat(){
        if(Carilist_data_masterobat){
            document.getElementById('loading_setup_masterobat').style.display = 'none';
        }
    }
    
    function headerStyleLookupListSetupMasterObat(column){
        return {
            css: {
                background: '#a8d4da',
                color: 'black',
                border: '2px solid black',
                padding: '0px'
            }
        };
    }
    
    function rowStyleLookupListSetupMasterObat(row, index){
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
    
    function MasterObat_showDetail(data = null, parent = null){
        if(data == null & parent == null){            
            setDisabeledSetupMasterObat(false);
            document.getElementById('masterobat_idobat').value          = '';
            document.getElementById('masterobat_satuankecil').value     = '0';
            document.getElementById('masterobat_nmobat').value          = '';
            document.getElementById('masterobat_jenisobat').value       = '0';
            document.getElementById('masterobat_subjenisobat').value    = '0';
            document.getElementById('masterobat_satuanbesar').value     = '0';
            document.getElementById('masterobat_ha').value              = 'f';
            document.getElementById('masterobat_restriksi').value       = 'f';
            document.getElementById('masterobat_lasa').value            = 'f';
            document.getElementById('masterobat_aktf').value            = 't';
            document.getElementById('masterobat_frac').value            = '0';
            document.getElementById('masterobat_tipe').value            = '';
            document.getElementById("masterobat_tipeprb").value         = 't';
            document.getElementById("masterobat_tipekronis").value      = 'f';
            document.getElementById("masterobat_tipekemo").value        = 'f';
            document.getElementById("masterobat_restriksiinfo").value   = '';
            document.getElementById("masterobat_restriksiqtymax").value      = '';
            document.getElementById("masterobat_restriksiharimax").value     = '';
            document.getElementById("masterobat_restriksiperesepan").value   = '';
        }else{
            if(lastSelectedRowSetupMasterObat != null){
                MasterObat_hideDetail();
            }
            var anaks = parent.childNodes;
            anaks.forEach(anak=>{
                if (localStorage.getItem("mode") == "dark-theme") {
                    anak.style.background = 'transparant';
                }else{
                    anak.style.background = 'red';
                }
            });
            lastSelectedRowSetupMasterObat = parent;
            idObatSetupMasterObat = data['kd_obat'];
            document.getElementById('masterobat_idobat').value          = data['kd_obat'];
            document.getElementById('masterobat_satuankecil').value     = data['kd_satuan'];
            document.getElementById('masterobat_nmobat').value          = data['nama_obat'];
            document.getElementById('masterobat_jenisobat').value       = data['kd_jns_obt'];
            document.getElementById('masterobat_subjenisobat').value    = data['kd_sub_jns'];
            document.getElementById('masterobat_satuanbesar').value     = data['kd_sat_besar'];
            document.getElementById('masterobat_ha').value              = data['sts_high_alert'];
            document.getElementById('masterobat_restriksi').value       = data['restriksi'];
            document.getElementById('masterobat_lasa').value            = data['lasa'];
            document.getElementById('masterobat_aktf').value            = data['aktif'];
            document.getElementById('masterobat_frac').value            = data['fraction'];
            document.getElementById('masterobat_tipe').value            = data['tipe'];
            document.getElementById("masterobat_tipeprb").value         = data['prb'];
            document.getElementById("masterobat_tipekronis").value      = data['kronis'];
            document.getElementById("masterobat_tipekemo").value        = data['kemo'];
            document.getElementById("masterobat_restriksiinfo").value   = data['retriksiinfo'];
            document.getElementById("masterobat_restriksiqtymax").value      = data['maxqty'];
            document.getElementById("masterobat_restriksiharimax").value     = data['maxhari'];
            document.getElementById("masterobat_restriksiperesepan").value   = data['retriksiperesepan'];
            setDisabeledSetupMasterObat(true);
        }
    }
    
    function MasterObat_hideDetail(){
        var anaks = lastSelectedRowSetupMasterObat.childNodes;
        if(anaks != null){
            anaks.forEach(anak=>{
                if (localStorage.getItem("mode") == "dark-theme") {
                    anak.style.background = 'transparant';
                }else{
                    anak.style.background = 'white';
                }
            });
        }
        idObatSetupMasterObat = '';
        lastSelectedRowSetupMasterObat = null;
        document.getElementById('masterobat_idobat').value          = '';
        document.getElementById('masterobat_nmobat').value          = '';
        document.getElementById('masterobat_jenisobat').value       = '0';
        document.getElementById('masterobat_subjenisobat').value    = '0';
        document.getElementById('masterobat_ha').value              = 'f';
        document.getElementById('masterobat_restriksi').value       = 'f';
        document.getElementById('masterobat_lasa').value            = 'f';
        document.getElementById('masterobat_aktf').value            = 't';
        document.getElementById('masterobat_frac').value            = '0';
        document.getElementById('masterobat_tipe').value            = '';
        document.getElementById("masterobat_tipeprb").value         = 't';
        document.getElementById("masterobat_tipekronis").value      = 'f';
        document.getElementById("masterobat_tipekemo").value        = 'f';
        document.getElementById("masterobat_restriksiinfo").value   = '';
        document.getElementById("masterobat_restriksiqtymax").value      = '';
        document.getElementById("masterobat_restriksiharimax").value     = '';
        document.getElementById("masterobat_restriksiperesepan").value   = '';
        setDisabeledSetupMasterObat(true);
    }
    
    function setDisabeledSetupMasterObat(flag){
        //document.getElementById('masterobat_idobat').disabled   = flag;
        
        document.getElementById('masterobat_addeditObat').style.display = 'block';
        
        if (flag == true){
            //document.getElementById('masterobat_idobat').disabled       = false;
            document.getElementById('masterobat_nmobat').disabled       = false;
            document.getElementById('masterobat_jenisobat').disabled    = false;
            document.getElementById('masterobat_subjenisobat').disabled = false;
            document.getElementById('masterobat_ha').disabled           = false;
            document.getElementById('masterobat_restriksi').disabled    = false;
            document.getElementById('masterobat_lasa').disabled         = false;
            document.getElementById('masterobat_aktf').disabled         = false;
            document.getElementById('masterobat_satuankecil').disabled  = false;
            document.getElementById('masterobat_satuanbesar').disabled  = false;
            document.getElementById('masterobat_frac').disabled         = false;
            document.getElementById('masterobat_tipe').disabled         = false;
            document.getElementById("masterobat_tipeprb").disabled      = false;
            document.getElementById("masterobat_tipekronis").disabled   = false;
            document.getElementById("masterobat_tipekemo").disabled     = false;
            document.getElementById("masterobat_restriksiinfo").disabled= false;
            document.getElementById("masterobat_restriksiqtymax").disabled      = false;
            document.getElementById("masterobat_restriksiharimax").disabled     = false;
            document.getElementById("masterobat_restriksiperesepan").disabled   = false;

            $('#masterobat_addeditObat').html("<i class='fas fa-edit'></i> Edit Obat");
            document.getElementById('masterobat_HapusObat').style.display = 'block';
            proses = flag;
        }else{
            document.getElementById('masterobat_nmobat').disabled       = flag;
            document.getElementById('masterobat_jenisobat').disabled    = flag;
            document.getElementById('masterobat_subjenisobat').disabled = flag;
            document.getElementById('masterobat_ha').disabled           = flag;
            document.getElementById('masterobat_restriksi').disabled    = flag;
            document.getElementById('masterobat_lasa').disabled         = flag;
            document.getElementById('masterobat_aktf').disabled         = flag;
            document.getElementById('masterobat_satuankecil').disabled  = flag;
            document.getElementById('masterobat_satuanbesar').disabled  = flag;
            document.getElementById('masterobat_frac').disabled         = flag;
            document.getElementById('masterobat_tipe').disabled         = flag;
            document.getElementById("masterobat_tipeprb").disabled      = flag;
            document.getElementById("masterobat_tipekronis").disabled   = flag;
            document.getElementById("masterobat_tipekemo").disabled     = flag;
            document.getElementById("masterobat_restriksiinfo").disabled= flag;
            document.getElementById("masterobat_restriksiqtymax").disabled      = flag;
            document.getElementById("masterobat_restriksiharimax").disabled     = flag;
            document.getElementById("masterobat_restriksiperesepan").disabled   = flag;

            $('#masterobat_addeditObat').html("<i class='fas fa-save'></i> Simpan Obat");
            document.getElementById('masterobat_HapusObat').style.display = 'none';

            proses = flag;
        }
        cekstatusretriksi();
    }
    
    function masterobat_addeditObat(){
        document.getElementById('loading_setup_masterobat').style.display = 'block';
        var param = {
          proses        : proses,
          kd_obat       : document.getElementById("masterobat_idobat").value,
          nama_obat     : document.getElementById("masterobat_nmobat").value,
          kd_jns_obt    : document.getElementById("masterobat_jenisobat").value,
          kd_sub_jns    : document.getElementById("masterobat_subjenisobat").value,
          sts_high_alert: document.getElementById("masterobat_ha").value,
          restriksi     : document.getElementById("masterobat_restriksi").value,
          inforestriksi : document.getElementById("masterobat_restriksiinfo").value,
          lasa          : document.getElementById("masterobat_lasa").value,
          aktif         : document.getElementById("masterobat_aktf").value,
          kd_satuan     : document.getElementById("masterobat_satuankecil").value,
          kd_sat_besar  : document.getElementById("masterobat_satuanbesar").value,
          fraction      : document.getElementById("masterobat_frac").value,
          tipe          : document.getElementById("masterobat_tipe").value,
          prb           : document.getElementById("masterobat_tipeprb").value,
          kronis        : document.getElementById("masterobat_tipekronis").value,
          kemo          : document.getElementById("masterobat_tipekemo").value,
          qtymax        : document.getElementById("masterobat_restriksiqtymax").value,
          maxhari       : document.getElementById("masterobat_restriksiharimax").value,
          retperesepan  : document.getElementById("masterobat_restriksiperesepan").value,
        };

        apiPOST('Setup/masterobat_addeditObat', param, hasil => {
          // if (hasil !== null) {
            document.getElementById('loading_setup_masterobat').style.display   = 'none';
            document.getElementById('masterobat_addeditObat').style.display     = 'none';
            document.getElementById('masterobat_HapusObat').style.display       = 'none';
            
            $('#list_data_masterobat').bootstrapTable('removeAll');
            MasterObat_loaddata();
          // }
        }).then(value => {
            
        });
    }

    function masterobat_HapusObat(){
        document.getElementById('loading_setup_masterobat').style.display = 'block';
        var param = {
          kd_obat       : document.getElementById("masterobat_idobat").value
        };

        apiPOST('Setup/masterobat_HapusObat', param, hasil => {
          if (hasil !== null) {
            document.getElementById('loading_setup_masterobat').style.display   = 'none';
            document.getElementById('masterobat_HapusObat').style.display       = 'none';
            $('#list_data_masterobat').bootstrapTable('removeAll');
            MasterObat_loaddata();
          }
        }).then(value => {
            document.getElementById('loading_setup_masterobat').style.display = 'none';
        });
    }
	
	function importMasterobat(){
		var taxtarray;	
		var input= document.getElementById('fileToUploadMasterobat');
		var berkas = input.files[0];
		
		var reader = new FileReader();
		var content = reader.readAsText(berkas);
		reader.onload = function (event) {
		  var text = event.target.result; 
		  taxtarray=csvToArrayMasterobat(text);
		  apiPOST('Setup/importMasterobat', taxtarray, hasil => {
			if (hasil !== null) {
            
            }
		  });
		};		
	}
	
	function csvToArrayMasterobat(str,delimiter=","){
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

    function cekstatusretriksi(){
        var retriksi = document.getElementById("masterobat_restriksi").value;
        var inforestriksi = document.getElementById("masterobat_restriksiinfo").value;

        if (retriksi == 't'){
            document.getElementById("masterobat_restriksiinfodiv").style.display = 'block';
        }else{
            document.getElementById("masterobat_restriksiinfodiv").style.display = 'none';
            document.getElementById("masterobat_restriksiinfo").value = '';
        }

    }
</script>