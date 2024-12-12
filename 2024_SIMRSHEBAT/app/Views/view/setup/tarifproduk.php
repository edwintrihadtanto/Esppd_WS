<div class="col-md-12 p-2">
  <div class="card card-outline">
    <div class="overlay-wrapper" id="loading_setup_tarifproduk">
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
                    <button type="button" onclick='tarifproduk_showDetail();' class="btn bg-gradient-secondary btn-xs"><i class="fas fa-plus"> TambahTarif Produk</i>
                </div>
                <div class="col-sm-auto">
                    <form method="post" enctype="multipart/form-data">
                      Select File to upload:
                      <input type="file" name="fileToUploadTarifproduk" id="fileToUploadTarifproduk" multiple accept=".csv">
                      <button type="button" onclick="importTarifproduk()" class="btn bg-gradient-secondary btn-xs"><i class="fas fa-file"></i> Import Obat</i></button>
                    </form>                    
                </div>
            </div>
            <!-- END LETAK BUTTON -->            
          </div>
        </div>
        </div>

        <div class="row p-2">
            <div class="col-sm-2">
                <label>Id Tarif</label>
                <input type="text" id="tarifproduk_tarif" class="form-control form-control-xs" disabled="true" readonly>
            </div>
            <div class="col-sm-2">
                <label>Produk</label>
                <select id="tarifproduk_produk" class="form-control form-control-xs" disabled="true"></select>
            </div>
            <div class="col-sm-2">
                <label>Penjamin</label>
                <select id="tarifproduk_penjamin" class="form-control form-control-xs" disabled="true"></select>
            </div>
            <div class="col-sm-5">
                <label>Harga</label>
                <input type="text"  id="tarifproduk_harga" class="form-control form-control-xs" disabled="true">
            </div>
            <div class="col-sm-5">
                <label>Berlaku Tanggal</label>
                <input type="date"  id="tarifproduk_berlaku" class="form-control form-control-xs" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="" inputmode="numeric" disabled="true">
            </div>
            <div class="col-sm-5">
                <label>Selesai Tanggal</label>
                <input type="date"  id="tarifproduk_selesai" class="form-control form-control-xs" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="" inputmode="numeric" disabled="true">
            </div>
            <div class="col-sm-5">
                <label>Unit</label>
                <select id="tarifproduk_unit" class="form-control form-control-xs" disabled="true"></select>
            </div>
            <div class="col-sm-1">
                <label>&nbsp;</label>
                <button type="button" onclick='tarifproduk_addeditTarif();' class="btn bg-gradient-warning btn-xs" id="tarifproduk_addeditTarif">
            </div>
        </div>
        <div class="row m-1">
            <div class="col">
                <table
                    id="list_data_tarifproduk"
                    data-single-select="true"
                    data-click-to-select="true"
                    data-sticky-header="true"
                    data-header-style="headerStyleLookupListSetupTarifProduk"
                    data-row-style="rowStyleLookupListSetupTarifProduk"
                    data-pagination="true"
                    data-search="true"
                    data-pagination-parts="['pageInfo', 'pageList']"
                    data-search="true"
                    class="table-sm">
                  <thead>
                    <tr>
                      <th data-field="id_tarif" data-sortable="true" data-width="30">ID Tarif</th>
                      <th data-field="nama_produk" data-sortable="true">Nama Produk</th>
                      <th data-field="nama_penjamin" data-sortable="true" data-width="100">Penjamin</th>
                      <th data-field="harga" data-sortable="true" data-width="100">Harga</th>
                      <th data-field="tgl_berlaku" data-sortable="true" data-width="100">Berlaku</th>
                      <th data-field="tgl_selesai" data-sortable="true" data-width="100">Selesai</th>
                      <th data-field="nama_unit" data-sortable="true" data-width="100">Unit</th>

                    </tr>
                  </thead>
                </table>
            </div>
        </div>
    </div>

  </div>  
</div>

<script>
     $('#datemask').inputmask('yyyy-mm-dd', {
      'placeholder': 'yyyy-mm-dd'
    })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('yyyy-mm-dd', {
      'placeholder': 'yyyy-mm-dd'
    })
    //Money Euro
    $('[data-mask]').inputmask()
    document.getElementById('loading_setup_tarifproduk').style.height = document.documentElement.clientHeight;
    var tarifproduk_CariListData = false;
    var tarifproduk_IdTarif = '';
    var lastSelectedRowSetupTarifProduk = null;
    var proses = '';
    document.getElementById('tarifproduk_addeditTarif').style.display = 'none';

    $('#list_data_tarifproduk').bootstrapTable({
        onClickRow: (row, element, field)=>{
            if(row['list_data_tarifproduk_id_tarif'] == tarifproduk_IdTarif){
               tarifproduk_hideDetail();
            }else{
               tarifproduk_showDetail(row, element[0]);
            }
        }
    });
    apiPOST('Setup/getUnit', { idfar : '' }, hasil => {
        var data = hasil['data'];
        var unit = '';
          unit += '<option value="0">Pilih Unit</option>';
          unit += '<option value="F-0">Farmasi</option>';
        for (var i = 0; i < data.length; i++) {
          unit += '<option value="'+ data[i]['id_unit'] +'">'+ data[i]['nama_unit']+'</option>';
        }
        document.getElementById('tarifproduk_unit').innerHTML = unit;
    });
    
    apiPOST('Setup/getJenisPenjamin', null, hasil => {
        var data = hasil['data'];
        var penj = '';
          penj += '<option value="0">Pilih Penjamin</option>';
        for (var i = 0; i < data.length; i++) {
          penj += '<option value="'+ data[i]['id_penjamin'] +'">'+ data[i]['nama_penjamin']+'</option>';
        }
        document.getElementById('tarifproduk_penjamin').innerHTML = penj;
    });

    apiPOST('Setup/getProduk', null, hasil => {
        var data = hasil['data'];
        var prod = '';
          prod += '<option value="0">Pilih Produk</option>';
        for (var i = 0; i < data.length; i++) {
          prod += '<option value="'+ data[i]['id_produk'] +'">'+ data[i]['nama_produk']+'</option>';
        }
        document.getElementById('tarifproduk_produk').innerHTML = prod;
    });

    TarifProduk_loaddata();
    
    function TarifProduk_loaddata(){
        apiPOST('Setup/getListTarifProduk', {}, hasil => {
            if(hasil !== null){
                $('#list_data_tarifproduk').bootstrapTable('append', hasil['data']);
            }
        }).then(value => {
            tarifproduk_CariListData = true;
            selesaiLoadingAwalSetupTarifProduk();
        });
    }

    function selesaiLoadingAwalSetupTarifProduk(){
        if(tarifproduk_CariListData){
            document.getElementById('loading_setup_tarifproduk').style.display = 'none';
        }
    }
    
    function headerStyleLookupListSetupTarifProduk(column){
        return {
            css: {
                background: '#a8d4da',
                color: 'black',
                border: '2px solid black',
                padding: '0px'
            }
        };
    }
    
    function rowStyleLookupListSetupTarifProduk(row, index){
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
    
    function tarifproduk_showDetail(data = null, parent = null){
        if(data == null & parent == null){            
            setDisabeledSetupTarifProduk(false);
            document.getElementById('tarifproduk_tarif').value      = '';
            document.getElementById('tarifproduk_produk').value     = '0';
            document.getElementById('tarifproduk_penjamin').value   = '0';
            document.getElementById('tarifproduk_harga').value      = '';
            document.getElementById('tarifproduk_berlaku').value      = '';
            document.getElementById('tarifproduk_unit').value      = '0';
            document.getElementById('tarifproduk_selesai').value      = '0';

        }else{
            if(lastSelectedRowSetupTarifProduk != null){
                tarifproduk_hideDetail();
            }
            var anaks = parent.childNodes;
            anaks.forEach(anak=>{
                if (localStorage.getItem("mode") == "dark-theme") {
                    anak.style.background = 'transparant';
                }else{
                    anak.style.background = 'darkgrey';
                }
            });
            lastSelectedRowSetupTarifProduk = parent;
            if(data['tgl_selesai'] == null || data['tgl_selesai'] == ''){
                //alert('a');
                var tglselsai = '';
            }
            else{
                var tglselsai = data['tgl_selesai'];
            }
            tarifproduk_IdTarif = data['id_tarif'];
            document.getElementById('tarifproduk_tarif').value      = data['id_tarif'];
            document.getElementById('tarifproduk_produk').value     = data['id_produk'];
            document.getElementById('tarifproduk_penjamin').value   = data['id_penjamin'];
            document.getElementById('tarifproduk_harga').value      = data['harga'];
            document.getElementById('tarifproduk_berlaku').value      = data['tgl_berlaku'];
            document.getElementById('tarifproduk_selesai').value      = tglselsai;
            document.getElementById('tarifproduk_unit').value      = data['id_unit'];
            
            setDisabeledSetupTarifProduk(true);
        }
    }
    
    function tarifproduk_hideDetail(){
        var anaks = lastSelectedRowSetupTarifProduk.childNodes;
        if(anaks != null){
            anaks.forEach(anak=>{
                if (localStorage.getItem("mode") == "dark-theme") {
                    anak.style.background = 'transparant';
                }else{
                    anak.style.background = 'white';
                }
            });
        }
        tarifproduk_IdTarif = '';
        lastSelectedRowSetupTarifProduk = null;
        document.getElementById('tarifproduk_tarif').value      = '';
        document.getElementById('tarifproduk_produk').value     = '0';
        document.getElementById('tarifproduk_penjamin').value   = '0';
        document.getElementById('tarifproduk_harga').value      = '';
        document.getElementById('tarifproduk_berlaku').value      = '';
        document.getElementById('tarifproduk_unit').value      = '0';
        document.getElementById('tarifproduk_selesai').value      = '0';

        
        setDisabeledSetupTarifProduk(true);
    }
    
    function setDisabeledSetupTarifProduk(flag){
        document.getElementById('tarifproduk_tarif').disabled   = flag;
        
        document.getElementById('tarifproduk_addeditTarif').style.display = 'block';
        
        if (flag == true){
            document.getElementById('tarifproduk_produk').disabled      = false;
            document.getElementById('tarifproduk_penjamin').disabled    = false;
            document.getElementById('tarifproduk_harga').disabled       = false;
            document.getElementById('tarifproduk_berlaku').disabled       = false;
            document.getElementById('tarifproduk_unit').disabled       = false;
            document.getElementById('tarifproduk_selesai').disabled       = false;
            $('#tarifproduk_addeditTarif').html("<i class='fas fa-edit'></i> Edit");
            proses = flag;
        }else{
            document.getElementById('tarifproduk_produk').disabled      = flag;
            document.getElementById('tarifproduk_penjamin').disabled    = flag;
            document.getElementById('tarifproduk_harga').disabled       = flag;
            document.getElementById('tarifproduk_berlaku').disabled       = flag;
            document.getElementById('tarifproduk_unit').disabled       = flag;
            document.getElementById('tarifproduk_selesai').disabled       = flag;

            $('#tarifproduk_addeditTarif').html("<i class='fas fa-save'></i> Simpan");
            proses = flag;
        }
    }
    
    function tarifproduk_addeditTarif(){
        document.getElementById('loading_setup_tarifproduk').style.display = 'block';
        var id_unit = document.getElementById("tarifproduk_unit").value;
        if (document.getElementById("tarifproduk_unit").value == ''){
            document.getElementById('loading_setup_tarifproduk').style.display = 'none';
            toastr.info("Info: Jika Jenis Produk <strong>Biaya Obat Apotik</strong>\nSilahkan Pilih Unit Farmasi");
            toastr.error("Unit Belum diPilih!!");                        
            return;
        }
        var param = {
          proses        : proses,
          id_tarif      : document.getElementById("tarifproduk_tarif").value,
          id_produk     : document.getElementById("tarifproduk_produk").value,
          id_penjamin   : document.getElementById("tarifproduk_penjamin").value,
          harga         : document.getElementById("tarifproduk_harga").value,
          berlaku       : document.getElementById("tarifproduk_berlaku").value,
          id_unit       : id_unit,
          tgl_selesai   : document.getElementById("tarifproduk_selesai").value,

        };
        
        apiPOST('Setup/tarifproduk_addeditTarifProduk', param, hasil => {
          if (hasil !== null) {
            document.getElementById('loading_setup_tarifproduk').style.display = 'none';
            $('#list_data_tarifproduk').bootstrapTable('removeAll');
            TarifProduk_loaddata();
          }else{
            document.getElementById('loading_setup_tarifproduk').style.display = 'none';
          }
        });
    }
    
    function importTarifproduk(){
        var taxtarray;  
        var input= document.getElementById('fileToUploadTarifproduk');
        var berkas = input.files[0];
        
        var reader = new FileReader();
        var content = reader.readAsText(berkas);
        reader.onload = function (event) {
          var text = event.target.result; 
          taxtarray=csvToArrayTarifproduk(text);
          apiPOST('Setup/importTarifproduk', taxtarray, hasil => {
            if (hasil !== null) {
            
            }
          });
        };      
    }
    
    function csvToArrayTarifproduk(str,delimiter=","){
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