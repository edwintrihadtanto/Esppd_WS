<div class="col-md-12 p-2">
  <div class="card card-outline">
    <div class="overlay-wrapper" id="loading_setup_accgudang">
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
                    <button type="button" onclick='accgudang_detail();' class="btn bg-gradient-warning btn-xs"><i class="fas fa-plus"> Tambah Hak Acc</i>
                </div>
            </div>
            <!-- END LETAK BUTTON -->            
          </div>
         </div>
        </div>

        <div class="row p-2">
            <div class="col-sm-auto">
                <label>Pilih Pegawai</label>
                <select id="accgudang_iduser" class="form-control form-control-xs" disabled="true"></select>
            </div>
            <div class="col-sm-auto">
                <label>Beri Akses ACC Gudang</label>
                <select id="accgudang_akses" class="form-control form-control-xs" disabled="true">
                    <option value="f">Tidak</option>
                    <option value="t">Ya</option>
                </select>
            </div>
            <div class="col-sm-auto">
                <label>&nbsp;</label>
                <button type="button" onclick='accgudang_addedit();' class="btn btn-primary btn-xs" id="accgudang_addedit"></button>
            </div>
            <div class="col-sm-auto">
                <label>&nbsp;</label>
                <button type="button" onclick='accgudang_hapus();' class="btn btn-danger btn-xs" id="accgudang_hapus"><i class='fas fa-trash'></i> Hapus Hak Acc</button>
            </div>
        </div>
        <div class="row ml-1 mr-1 mt-0" id="row_data_accgudang">
            <div class="col">
                <table
                    id="list_data_accgudang"
                    data-single-select="true"
                    data-click-to-select="true"
                    data-sticky-header="true"
                    data-header-style="headerStyleLookupListSetupAccGudang"
                    data-row-style="rowStyleLookupListSetupAccGudang"
                    data-pagination="true"
                    data-pagination-parts="['pageInfo', 'pageList']"
                    data-search="true"
                    class="table-sm">
                  <thead>
                    <tr>
                      <th data-field="id_user" data-sortable="true" data-width="20">ID User</th>
                      <th data-field="nama" data-sortable="true" data-width="150">Nama Pegawai</th>
                      <th data-field="acc_name" data-sortable="true">Hak Akses</th>
                    </tr>
                  </thead>
                </table>
            </div>
        </div>
    </div>
  </div>  
</div>

<script>
    document.getElementById('loading_setup_accgudang').style.height = document.documentElement.clientHeight;
    var Carilist_data_accgudang = false;
    var iduserAccGudang = '';
    var lastSelectedRowSetupAccGudang = null;
    var proses = '';
    document.getElementById('accgudang_addedit').style.display  = 'none';
    document.getElementById('accgudang_hapus').style.display    = 'none';
    
    $('#list_data_accgudang').bootstrapTable({
        onClickRow: (row, element, field)=>{
            if(row['list_data_accgudang_iduser'] == iduserAccGudang){
               accgudang_hideDetail();
            }else{
               accgudang_detail(row, element[0]);
            }
        }
    });

    apiPOST('Setup/getUserList', null, hasil => {
        var data = hasil['data'];
        var sat = '';
          sat += '<option value="0">Pilih User</option>';
        for (var i = 0; i < data.length; i++) {
          sat += '<option value="'+ data[i]['id_user'] +'">'+ data[i]['nama']+'</option>';
        }
        document.getElementById('accgudang_iduser').innerHTML = sat;
    });

    accgudang_loaddataakses();
    
    function accgudang_loaddataakses(){
        document.getElementById('loading_setup_accgudang').style.display = 'block';
        apiPOST('Setup/getListHakAksesACCGudang', {}, hasil => {
            if(hasil !== null){
                Carilist_data_accgudang = true;
                selesaiLoadingAwalSetupAccGudang();
                $('#list_data_accgudang').bootstrapTable('append', hasil['data']);
            }
        });
    }

    function selesaiLoadingAwalSetupAccGudang(){
        if(Carilist_data_accgudang){
            document.getElementById('loading_setup_accgudang').style.display = 'none';
        }
    }
    
    function headerStyleLookupListSetupAccGudang(column){
        return {
            css: {
                background: '#a8d4da',
                color: 'black',
                border: '2px solid black',
                padding: '0px'
            }
        };
    }
    
    function rowStyleLookupListSetupAccGudang(row, index){
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
    
    function accgudang_detail(data = null, parent = null){
        if(data == null & parent == null){            
            setDisabeledSetupAccGudang(false);
            document.getElementById('accgudang_iduser').value = '0';
            document.getElementById('accgudang_akses').value  = 'f';
        }else{
            if(lastSelectedRowSetupAccGudang != null){
                accgudang_hideDetail();
            }
            var anaks = parent.childNodes;
            anaks.forEach(anak=>{
                if (localStorage.getItem("mode") == "dark-theme") {
                    anak.style.background = 'transparant';
                }else{
                    anak.style.background = 'red';
                }
            });
            lastSelectedRowSetupAccGudang = parent;
            iduserAccGudang = data['id_user'];
            document.getElementById('accgudang_iduser').value  = data['id_user'];
            document.getElementById('accgudang_akses').value   = data['acc'];

            setDisabeledSetupAccGudang(true);
        }
    }
    
    function accgudang_hideDetail(){
        var anaks = lastSelectedRowSetupAccGudang.childNodes;
        if(anaks != null){
            anaks.forEach(anak=>{
                if (localStorage.getItem("mode") == "dark-theme") {
                    anak.style.background = 'transparant';
                }else{
                    anak.style.background = 'white';
                }
            });
        }
        iduserAccGudang = '';
        lastSelectedRowSetupAccGudang = null;
        document.getElementById('accgudang_iduser').value = '0';
        document.getElementById('accgudang_akses').value  = 'f';
        
        setDisabeledSetupAccGudang(true);
    }
    
    function setDisabeledSetupAccGudang(flag){
        //document.getElementById('accgudang_iduser').disabled   = flag;
        
        document.getElementById('accgudang_addedit').style.display = 'block';
        
        if (flag == true){
            document.getElementById('accgudang_iduser').disabled       = flag;
            document.getElementById('accgudang_akses').disabled        = false;

            $('#accgudang_addedit').html("<i class='fas fa-edit'></i> Edit Hak Acc");

            document.getElementById('accgudang_hapus').style.display = 'block';
            proses = flag;
        }else{
            document.getElementById('accgudang_iduser').disabled  = flag;
            document.getElementById('accgudang_akses').disabled   = flag;
            
            $('#accgudang_addedit').html("<i class='fas fa-save'></i> Simpan Hak Acc");
            document.getElementById('accgudang_hapus').style.display = 'none';

            proses = flag;
        }
    }
    
    function accgudang_addedit(){
        document.getElementById('loading_setup_accgudang').style.display = 'block';
        if (document.getElementById("accgudang_iduser").value == '0'){
            toastr.error("User Belum Dipilih");
            document.getElementById('loading_setup_accgudang').style.display = 'none';
            return;
        }

        var param = {
          proses    : proses,
          iduser    : document.getElementById("accgudang_iduser").value,
          acc       : document.getElementById("accgudang_akses").value
        };

        apiPOST('Setup/accgudang_addedit', param, hasil => {
            document.getElementById('loading_setup_accgudang').style.display = 'none';
            if (hasil !== null) {
                document.getElementById('accgudang_addedit').style.display          = 'none';
                document.getElementById('accgudang_hapus').style.display            = 'none';

                $('#list_data_accgudang').bootstrapTable('removeAll');
                accgudang_loaddataakses();
            }
        }).then(value => {
            document.getElementById('accgudang_iduser').value = '0';
            document.getElementById('accgudang_akses').value  = 'f';
        });
    }

    function accgudang_hapus(){
        document.getElementById('loading_setup_accgudang').style.display = 'block';
        var param = {
          iduser  : document.getElementById("accgudang_iduser").value
        };

        apiPOST('Setup/accgudang_hapus', param, hasil => {
            document.getElementById('loading_setup_accgudang').style.display = 'none';
            if (hasil !== null) {
                document.getElementById('accgudang_addedit').style.display          = 'none';
                document.getElementById('accgudang_hapus').style.display            = 'none';
                $('#list_data_accgudang').bootstrapTable('removeAll');
                accgudang_loaddataakses();
            }
        }).then(value => {
            document.getElementById('accgudang_iduser').value = '0';
            document.getElementById('accgudang_akses').value  = 'f';
        });
    }
	
</script>