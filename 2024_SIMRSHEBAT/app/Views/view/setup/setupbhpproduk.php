<div class="col-md-12 p-2">
    <div class="card card-outline">
        <div class="overlay-wrapper" id="loading_setup_mapbhp">
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
                                <button type="button" onclick='bhp_showDetail();' class="btn bg-gradient-secondary btn-xs"><i class="fas fa-plus"> Tambah Maping BHP</i>
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
                    <label>Jenis Produk</label>
                    <select id="id_jenis_produk" class="form-control form-control-xs" disabled="true" onchange="comboproduk()"></select>
                </div>
                <div class="col-sm-2">
                    <label>Produk</label>
                    <select id="id_produk" class="form-control form-control-xs" disabled="true"></select>
                </div>
                <div class="col-sm-2">
                    <label>Jenis BHP</label>
                    <select id="kd_sub_jns" class="form-control form-control-xs" disabled="true" onchange="bhpobat()"></select>
                </div>
                <div class="col-sm-2">
                    <label>BHP</label>
                    <select id="kd_obat" class="form-control form-control-xs" disabled="true"></select>
                </div>
                <div class="col-sm-1">
                    <label>Jumlah</label>
                    <input type="text" id="default_jumlah" class="form-control form-control-xs" disabled="true">
                </div>
                <div class="col-sm-1">
                    <label>&nbsp;</label>
                    <button type="button" onclick='bhp_addeditbhp();' class="btn bg-gradient-warning btn-xs" id="bhp_addedit">
                </div>
                <div class="col-sm-1">
                    <label>&nbsp;</label>
                    <button type="button" onclick='bhp_hapus();' class="btn bg-gradient-danger btn-xs" id="hapusmapbhp">Hapus</button>
                </div>
            </div>
            <div class="row m-1">
                <div class="col">
                    <table id="list_data_bhp" data-single-select="true" data-click-to-select="true" data-sticky-header="true" data-header-style="headerStyleLookupListSetupmapbhp" data-row-style="rowStyleLookupListSetupmapbhp" data-pagination="true" data-pagination-parts="['pageInfo', 'pageList']" data-search="true" class="table-sm">
                        <thead>
                            <tr>
                                <th data-field="nama_produk" data-sortable="true" data-width="250">Nama Produk</th>
                                <th data-field="nama_obat" data-sortable="true" data-width="250">BHP / Alkes</th>
                                <th data-field="default_jumlah" data-sortable="true" data-width="60">Jumlah Penggunaan</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    document.getElementById('loading_setup_mapbhp').style.height = document.documentElement.clientHeight;
    var bhp_Carilist_data_bhp = false;
    var idProdukSetupproduk = '';
    var lastSelectedRowSetupproduk = null;
    var proses = '';
    document.getElementById('bhp_addedit').style.display = 'none'
    document.getElementById('hapusmapbhp').style.display = 'none';
    $('#list_data_bhp').bootstrapTable({
        onClickRow: (row, element, field) => {
            if (row['list_data_id_bhp'] == idProdukSetupproduk) {
                bhp_hideDetail();
            } else {
                bhp_showDetail(row, element[0]);
            }
        }
    });
    comboproduk_d();
    bhpobat_d();

    apiPOST('Setup/jenis_produk', null, hasil => {
        var data = hasil['data'];
        var res = '';
        res += '<option value="0">Pilih jenis</option>';
        for (var i = 0; i < data.length; i++) {
            res += '<option value="' + data[i]['id_jenis_produk'] + '">' + data[i]['deskripsi'] + '</option>';
        }
        document.getElementById('id_jenis_produk').innerHTML = res;
    });

    function comboproduk() {
        var param = {
            id: $("#id_jenis_produk").val(),
        };
        apiPOST('Setup/produk_by_jenis', param, hasil => {
            var data = hasil['data'];
            var res = '';
            res += '<option value="0">Pilih Produk</option>';
            for (var i = 0; i < data.length; i++) {
                res += '<option value="' + data[i]['id_produk'] + '">' + data[i]['nama_produk'] + '</option>';
            }
            document.getElementById('id_produk').innerHTML = res;
        });
    }

    function comboproduk_d() {
        var id='false';
        var param = {
            id: id,
        };
        apiPOST('Setup/produk_by_jenis', param, hasil => {
            var data = hasil['data'];
            var res = '';
            res += '<option value="0">Pilih Produk</option>';
            for (var i = 0; i < data.length; i++) {
                res += '<option value="' + data[i]['id_produk'] + '">' + data[i]['nama_produk'] + '</option>';
            }
            document.getElementById('id_produk').innerHTML = res;
        });
    }

    apiPOST('Setup/subjenisbhp', null, hasil => {
        var data = hasil['data'];
        var res = '';
        res += '<option value="0">Pilih jenis</option>';
        for (var i = 0; i < data.length; i++) {
            res += '<option value="' + data[i]['kd_sub_jns'] + '">' + data[i]['sub_jenis'] + '</option>';
        }
        document.getElementById('kd_sub_jns').innerHTML = res;
    });

    function bhpobat() {
        var param = {
            id: $("#kd_sub_jns").val(),
        };
        apiPOST('Setup/far_obat', param, hasil => {
            var data = hasil['data'];
            var res = '';
            res += '<option value="0">Pilih BHP</option>';
            for (var i = 0; i < data.length; i++) {
                res += '<option value="' + data[i]['kd_obat'] + '">' + data[i]['nama_obat'] + ' / ' + data[i]['kd_satuan'] + '</option>';
            }
            document.getElementById('kd_obat').innerHTML = res;
        });
    }

    function bhpobat_d() {
        var id ='false';
        var param = {
            id: id,
        };
        apiPOST('Setup/far_obat', param, hasil => {
            var data = hasil['data'];
            var res = '';
            res += '<option value="0">Pilih BHP</option>';
            for (var i = 0; i < data.length; i++) {
                res += '<option value="' + data[i]['kd_obat'] + '">' + data[i]['nama_obat'] + ' / ' + data[i]['kd_satuan'] + '</option>';
            }
            document.getElementById('kd_obat').innerHTML = res;
        });
    }


    bhp_loaddata();

    function bhp_loaddata() {
        apiPOST('Setup/getListbhp', {}, hasil => {
            if (hasil !== null) {
                $('#list_data_bhp').bootstrapTable('append', hasil['data']);
            }
        }).then(value => {
            bhp_Carilist_data_bhp = true;
            selesaiLoadingAwalSetupbhp();
        });
    }

    function selesaiLoadingAwalSetupbhp() {
        if (bhp_Carilist_data_bhp) {
            document.getElementById('loading_setup_mapbhp').style.display = 'none';
        }
    }

    function headerStyleLookupListSetupmapbhp(column) {
        return {
            css: {
                background: '#a8d4da',
                color: 'black',
                border: '2px solid black',
                padding: '0px'
            }
        };
    }

    function rowStyleLookupListSetupmapbhp(row, index) {
        if (localStorage.getItem("mode") == "dark-theme") {
            return {
                css: {
                    background: 'transparant',
                    border: '2px solid black',
                    padding: '2px'
                }
            };
        } else {
            return {
                css: {
                    background: 'white',
                    border: '2px solid black',
                    padding: '2px'
                }
            };
        }
    }

    function bhp_showDetail(data = null, parent = null) {
        if (data == null & parent == null) {
            setDisabeledSetupbhp(false);
            document.getElementById('id_jenis_produk').value = '';
            document.getElementById('id_produk').value = '';
            document.getElementById('kd_sub_jns').value = '0';
            document.getElementById('kd_obat').value = '0';
            document.getElementById('default_jumlah').value = '0';


        } else {
            if (lastSelectedRowSetupproduk != null) {
                bhp_hideDetail();
                //alert('c');

            }
            var anaks = parent.childNodes;
            anaks.forEach(anak => {
                if (localStorage.getItem("mode") == "dark-theme") {
                    anak.style.background = 'transparant';
                } else {
                    anak.style.background = 'darkgrey';
                }
            });
          

            //alert('a');
            lastSelectedRowSetupproduk = parent;
            document.getElementById('id_jenis_produk').value = data['id_jenis_produk'];
            document.getElementById('id_produk').value = data['id_produk'];
            document.getElementById('kd_sub_jns').value = data['kd_sub_jns'];
            document.getElementById('kd_obat').value = data['kd_obat'];
            document.getElementById('default_jumlah').value = data['default_jumlah'];
            //document.getElementById('id_produk').value =  data['id_produk'];


            //document.getElementById('kd_obat').value =  data['kd_obat'];
            

            setDisabeledSetupbhp(true);
        }
    }

    function bhp_hideDetail() {
        var anaks = lastSelectedRowSetupproduk.childNodes;
        if (anaks != null) {
            anaks.forEach(anak => {
                if (localStorage.getItem("mode") == "dark-theme") {
                    anak.style.background = 'transparant';
                } else {
                    anak.style.background = 'white';
                }
            });
        }
        idProdukSetupproduk = '';
        lastSelectedRowSetupproduk = null;

        document.getElementById('id_jenis_produk').value = '';
        document.getElementById('id_produk').value = '';
        document.getElementById('kd_sub_jns').value = '0';
        document.getElementById('kd_obat').value = '0';
        document.getElementById('default_jumlah').value = '0';




        setDisabeledSetupbhp(true);
    }

    function setDisabeledSetupbhp(flag) {
        document.getElementById('id_jenis_produk').disabled = flag;

        document.getElementById('bhp_addedit').style.display = 'block';
        document.getElementById('hapusmapbhp').style.display = 'block';
        //document.getElementById('bhp_addedit').innerHTML("<i class='fas fa-save'></i> Simpan");
        if (flag == true) {
            document.getElementById('id_jenis_produk').disabled = false;
            document.getElementById('id_produk').disabled = false;
            document.getElementById('kd_sub_jns').disabled = false;
            document.getElementById('kd_obat').disabled = false;
            document.getElementById('default_jumlah').disabled = false;

            $('#bhp_addedit').html("<i class='fas fa-edit'></i> Edit");
            $('#hapusmapbhp').html("<i class='fas fa-trash'></i> Delete");

            // alert('x');
            //comboproduk_d();
            // bhpobat();
            proses = flag;
        } else {
            document.getElementById('id_jenis_produk').disabled = flag;
            document.getElementById('id_produk').disabled = flag;
            document.getElementById('kd_sub_jns').disabled = flag;
            document.getElementById('kd_obat').disabled = flag;
            document.getElementById('default_jumlah').disabled = flag;
 

            $('#bhp_addedit').html("<i class='fas fa-save'></i> Simpan");
            proses = flag;
        }
    }

    function bhp_addeditbhp() {
        document.getElementById('loading_setup_mapbhp').style.display = 'block';
        var param = {
            proses: proses,
            id_produk: document.getElementById("id_produk").value,
            kd_obat: document.getElementById("kd_obat").value,
            default_jumlah: document.getElementById("default_jumlah").value,
        };

        apiPOST('Setup/penggunaanbhp_addedit', param, hasil => {
            if (hasil !== null) {
                document.getElementById('loading_setup_mapbhp').style.display = 'none';
                $('#list_data_bhp').bootstrapTable('removeAll');
                bhp_loaddata();
            }
        });
    }

    function bhp_hapus() {
        document.getElementById('loading_setup_mapbhp').style.display = 'block';
        var param = {
            id_produk: document.getElementById("id_produk").value,
            kd_obat: document.getElementById("kd_obat").value,
            default_jumlah: document.getElementById("default_jumlah").value,
        };

        apiPOST('Setup/penggunaanbhp_mapdelete', param, hasil => {
            if (hasil !== null) {
                document.getElementById('loading_setup_mapbhp').style.display = 'none';
                $('#list_data_bhp').bootstrapTable('removeAll');
                bhp_loaddata();
            }
        });
    }

    function importMasterproduk() {
        var taxtarray;
        var input = document.getElementById('fileToUploadMasterproduk');
        var berkas = input.files[0];

        var reader = new FileReader();
        var content = reader.readAsText(berkas);
        reader.onload = function(event) {
            var text = event.target.result;
            taxtarray = csvToArrayMasterproduk(text);
            apiPOST('Setup/importMasterproduk', taxtarray, hasil => {
                if (hasil !== null) {

                }
            });
        };
    }

    function csvToArrayMasterproduk(str, delimiter = ",") {
        var head = str.slice(0, str.indexOf("\n")).split(delimiter);
        var rows = str.slice(str.indexOf("\n") + 1).split("\n");
        const arr = rows.map(function(row) {
            const values = row.split(delimiter);
            const el = head.reduce(function(object, header, index) {
                object[header] = values[index];
                return object;
            }, {});
            return el;
        });

        // return the array
        return arr;
    }
</script>