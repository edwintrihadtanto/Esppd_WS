<div class="col-md-12 p-2">
    <div class="card card-outline">
        <div class="overlay-wrapper" id="loading_setup_spesialisasikamar">
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
                                <button type="button" onclick='spesialisasikamar_showDetail();' class="btn bg-gradient-secondary btn-xs"><i class="fas fa-plus"> Spesialisasi Kamar Bed</i>
                            </div>
                        </div>
                        <!-- END LETAK BUTTON -->
                    </div>
                </div>
            </div>

            <div class="row p-2">
                <div class="col-sm-3">
                    <label>Spesialisasi</label>
                    <select id="spesialisasi_id_spesilisasi" class="form-control form-control-xs" disabled="true"></select>
                </div>
                <div class="col-sm-3">
                    <label>Unit/Kelas</label>
                    <select id="spesialisasi_id_unit" class="form-control form-control-xs"  onchange="tampil_ruang();"  disabled="true"></select>
                </div>
                <div class="col-sm-3">
                    <label>Ruang</label>
                    <select id="spesialisasi_id_ruang" class="form-control form-control-xs"disabled="true"></select>
                </div>
                <!-- <div class="col-sm-3">
                    <label>Bed TT Kamar</label>
                    <select id="spesialisasi_id_kamar" class="form-control form-control-xs" disabled="true"></select>
                </div> -->
                <div class="col-sm-1">
                    <label>&nbsp;</label>
                    <button type="button" onclick='spesialisasi_addeditSpesialisasi();' class="btn bg-gradient-warning btn-xs" id="spesialisasikamar_sps_addedit">
                </div>
            </div>
            <div class="row m-1">
                <div class="col">
                    <table id="list_data_spesialisasikamar" data-single-select="true" data-click-to-select="true" data-sticky-header="true" data-header-style="headerStyleLookupListSetupspskamar" data-row-style="rowStyleLookupListSetupspskamar" data-pagination="true" data-pagination-parts="['pageInfo', 'pageList']" data-search="true" class="table-sm">
                        <thead>
                            <tr>
                                <th data-field="nama_spesialisasi_kamar" data-sortable="true">Spesialisasi</th>
                                <th data-field="nama_unit" data-sortable="true">Kelas/Unit</th>
                                <th data-field="nama_ruang" data-sortable="true">Ruang</th>
                                <!-- <th data-field="nama_kamar" data-sortable="true">TT Kamar</th> -->
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    document.getElementById('loading_setup_spesialisasikamar').style.height = document.documentElement.clientHeight;
    var produk_Carilist_data_spesialisasikamar = false;
    var idspesialisasiSetupprodukunit = '';
    var lastSelectedRowSetupspesialisasikamar = null;
    var proses = '';
    document.getElementById('spesialisasikamar_sps_addedit').style.display = 'none'
    $('#list_data_spesialisasikamar').bootstrapTable({
        onClickRow: (row, element, field) => {
            if (row['list_data_spesialisasikamarunit_id_unit'] == idspesialisasiSetupprodukunit) {
                spesialisasi_hideDetail();
            } else {
                spesialisasikamar_showDetail(row, element[0]);
            }
        }
    });

    apiPOST('Setup/getSpesialisasi', null, hasil => {
        var data = hasil['data'];
        var unit = '';
        unit += '<option value="0">Pilih Spesialisasi</option>';
        for (var i = 0; i < data.length; i++) {
            unit += '<option value="' + data[i]['id_spesialisasi_kamar'] + '">' + data[i]['nama_spesialisasi_kamar'] + '</option>';
        }
        document.getElementById('spesialisasi_id_spesilisasi').innerHTML = unit;
    });

    apiPOST('Setup/getUnitInap', null, hasil => {
        var data = hasil['data'];
        var prod = '';
        prod += '<option value="0">Pilih Kelas UNit</option>';
        for (var i = 0; i < data.length; i++) {
            prod += '<option value="' + data[i]['id_unit'] + '">' + data[i]['nama_unit'] + '</option>';
        }
        document.getElementById('spesialisasi_id_unit').innerHTML = prod;
    });

    // apiPOST('Setup/getRuang', null, hasil => {
    //     var data = hasil['data'];
    //     var prod = '';
    //     prod += '<option value="0">Pilih Ruang</option>';
    //     for (var i = 0; i < data.length; i++) {
    //         prod += '<option value="' + data[i]['id_ruang'] + '">' + data[i]['nama_ruang'] + '</option>';
    //     }
    //     document.getElementById('spesialisasi_id_ruang').innerHTML = prod;
    // });

    // apiPOST('Setup/getKamar', null, hasil => {
    //     var data = hasil['data'];
    //     var prod = '';
    //     prod += '<option value="0">Pilih Bed / kamar</option>';
    //     for (var i = 0; i < data.length; i++) {
    //         prod += '<option value="' + data[i]['id_kamar'] + '">' + data[i]['nama_kamar'] + '</option>';
    //     }
    //     document.getElementById('spesialisasi_id_kamar').innerHTML = prod;
    // });


    function tampil_ruang() {
        var param = {
            id_unit: $("#spesialisasi_id_unit").val(),
            // id_ruang: $("#spesialisasi_id_ruang").val(),
            id_spesialisasi_kamar: $("#spesialisasi_id_spesilisasi").val(),
        };
        apiPOST('Setup/getRuangpilih', param, hasil => {
            var data = hasil['data'];
            var prod = '';
            prod += '<option value="0">Pilih Ruang</option>';
            for (var i = 0; i < data.length; i++) {
                prod += '<option value="' + data[i]['id_ruang'] + '">' + data[i]['nama_ruang'] + '</option>';
            }
            document.getElementById('spesialisasi_id_ruang').innerHTML = prod;
        });
    }

    function tampil_kamar() {
        var param = {
            id_unit: $("#spesialisasi_id_unit").val(),
            id_ruang: $("#spesialisasi_id_ruang").val(),
            id_spesialisasi_kamar: $("#spesialisasi_id_spesilisasi").val(),
        };
        apiPOST('Setup/getKamarpilih', param, hasil => {
            var data = hasil['data'];
            var prod = '';
            prod += '<option value="0">Pilih Bed / kamar</option>';
            for (var i = 0; i < data.length; i++) {
                prod += '<option value="' + data[i]['id_kamar'] + '">' + data[i]['nama_kamar'] + '</option>';
            }
            document.getElementById('spesialisasi_id_kamar').innerHTML = prod;
        });
    }

    spesialisasikamar_loaddata();

    function spesialisasikamar_loaddata() {
        apiPOST('Setup/getSpesilisasiKamar', {}, hasil => {
            if (hasil !== null) {
                $('#list_data_spesialisasikamar').bootstrapTable('append', hasil['data']);
            }
        }).then(value => {
            produk_Carilist_data_spesialisasikamar = true;
            selesaiLoadingAwalSetupspesialisasi();
        });
    }

    function selesaiLoadingAwalSetupspesialisasi() {
        if (produk_Carilist_data_spesialisasikamar) {
            document.getElementById('loading_setup_spesialisasikamar').style.display = 'none';
        }
    }

    function headerStyleLookupListSetupspskamar(column) {
        return {
            css: {
                background: '#a8d4da',
                color: 'black',
                border: '2px solid black',
                padding: '0px'
            }
        };
    }

    function rowStyleLookupListSetupspskamar(row, index) {
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

    function spesialisasikamar_showDetail(data = null, parent = null) {
        if (data == null & parent == null) {
            setDisabeledSetupspesialisasi(false);
            document.getElementById('spesialisasi_id_spesilisasi').value = '0';
            document.getElementById('spesialisasi_id_unit').value = '0';
            document.getElementById('spesialisasi_id_ruang').value = '0';
            // document.getElementById('spesialisasi_id_kamar').value = '0';


        } else {
            if (lastSelectedRowSetupspesialisasikamar != null) {
                spesialisasi_hideDetail();
            }
            var anaks = parent.childNodes;
            anaks.forEach(anak => {
                if (localStorage.getItem("mode") == "dark-theme") {
                    anak.style.background = 'transparant';
                } else {
                    anak.style.background = 'darkgrey';
                }
            });
            lastSelectedRowSetupspesialisasikamar = parent;
            idspesialisasiSetupprodukunit = data['id_unit'];
            // alert(data['id_spesialisasi_kamar']);
            document.getElementById('spesialisasi_id_spesilisasi').value = data['id_spesialisasi_kamar'];
            document.getElementById('spesialisasi_id_unit').value = data['id_unit'];
            document.getElementById('spesialisasi_id_ruang').value = data['id_ruang'];
            // document.getElementById('spesialisasi_id_kamar').value = data['id_kamar'];



            setDisabeledSetupspesialisasi(true);
        }
    }

    function spesialisasi_hideDetail() {
        var anaks = lastSelectedRowSetupspesialisasikamar.childNodes;
        if (anaks != null) {
            anaks.forEach(anak => {
                if (localStorage.getItem("mode") == "dark-theme") {
                    anak.style.background = 'transparant';
                } else {
                    anak.style.background = 'white';
                }
            });
        }
        idspesialisasiSetupprodukunit = '';
        lastSelectedRowSetupspesialisasikamar = null;
        document.getElementById('spesialisasi_id_spesilisasi').value = '0';
        document.getElementById('spesialisasi_id_unit').value = '0';
        document.getElementById('spesialisasi_id_ruang').value = '0';
        // document.getElementById('spesialisasi_id_kamar').value = '0';


        setDisabeledSetupspesialisasi(true);
    }

    function setDisabeledSetupspesialisasi(flag) {
        document.getElementById('spesialisasi_id_spesilisasi').disabled = flag;
        document.getElementById('spesialisasikamar_sps_addedit').style.display = 'block';

        if (flag == true) {
            document.getElementById('spesialisasi_id_spesilisasi').disabled = false;
            document.getElementById('spesialisasi_id_unit').disabled = false;
            document.getElementById('spesialisasi_id_ruang').disabled = false;
            // document.getElementById('spesialisasi_id_kamar').disabled = false;

            $('#spesialisasikamar_sps_addedit').html("<i class='fas fa-trash'></i> Delete");
            proses = flag;
        } else {
            document.getElementById('spesialisasi_id_spesilisasi').disabled = flag;
            document.getElementById('spesialisasi_id_unit').disabled = flag;
            document.getElementById('spesialisasi_id_ruang').disabled = flag;
            // document.getElementById('spesialisasi_id_kamar').disabled = flag;

            $('#spesialisasikamar_sps_addedit').html("<i class='fas fa-save'></i> Simpan");
            proses = flag;
        }
    }

    function spesialisasi_addeditSpesialisasi() {
        document.getElementById('loading_setup_spesialisasikamar').style.display = 'block';
        var v_id_spesialisasi_kamar = document.getElementById("spesialisasi_id_spesilisasi").value;

        var param = {
            proses: proses,
            id_spesialisasi_kamar: v_id_spesialisasi_kamar,
            id_unit: document.getElementById("spesialisasi_id_unit").value,
            id_ruang: document.getElementById("spesialisasi_id_ruang").value,
            // id_kamar: document.getElementById("spesialisasi_id_kamar").value,


        };

        apiPOST('Setup/spesialisasi_addeditSpesialisasi', param, hasil => {
            if (hasil !== null) {
                document.getElementById('loading_setup_spesialisasikamar').style.display = 'none';
                $('#list_data_spesialisasikamar').bootstrapTable('removeAll');
                spesialisasikamar_loaddata();
            }
        });
    }
</script>