<div class="col">
    <div class="overlay-wrapper" id="gantiShiftRWI_loading">
        <div class="overlay">
          <i class="fas fa-3x fa-sync-alt fa-spin"></i>
        </div>
    </div>
    <div class="row ml-2 mt-2">
        <div class="p-2" id="namaRuanganGantiShift" style="color: white; background-color: teal; font-weight: bold; font-size: large;"></div>
    </div>
    <div class="row flex-fill m-2" style="height: 40vh;">
        <div class="col-6 m-1 card card-outline card-default">
            <div class="card-title p-2" style="color: white; background-color: darkgreen">
                <b>Petugas Shift Sekarang</b>
            </div>
            <div class="card-text m-2">
                <table id="shiftRWISekarang">
                    <thead>
                        <tr>
                            <th data-field="no" data-width="1">No</th>
                            <th data-field="nama_pegawai">Nama</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

        <div class="col m-1 card card-outline card-default">
            <div class="card-title p-2" style="color: white; background-color: darkblue">
                <b>Petugas Shift selanjutnya</b>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card-text m-2">
                        <div class="card-text m-2">
                            <table id="shiftRWIBaru">
                                <thead>
                                    <tr>
                                        <th data-field="state" data-checkbox="true"></th>
                                        <th data-field="nama_pegawai">Nama</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-auto pt-2">
                    <div class="row pr-2 pb-3">
                        <button class="btn btn-danger btn-block" onclick="hapusPetugasGantiShiftRWI();">- Hapus</button>
                    </div>
                    <div class="row pr-2 pb-3">
                        <button class="btn btn-warning btn-block" onclick="gantiShiftRWI();">Ganti<br>Shift</button>
                    </div>
                    <div class="row pr-2">
                        <div class="p-1" style="background-color: gold; font-size: medium;">
                            Jumlah :
                            <a id="jumlahPetugasBaruGantiShift"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row flex-grow-0 m-2 pb-5">
        <div class="col m-1 card card-outline card-default">
            <div class="card-title p-2" style="color: black; background-color: lightblue">
                    <b>List petugas</b>
            </div>
            <div class="row">
                <div class="col">
                    <table id="shiftRWICalon" 
                    data-search="true"
                    data-click-to-select="true"
                    data-searchable="true">
                        <thead>
                            <tr>
                                <th data-field="state" data-checkbox="true"></th>
                                <th data-field="nama_pegawai">Nama</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                
                <div class="col-auto p-2">
                    <div class="row pr-2 pb-3">
                        <button class="btn btn-success" onclick="tambahPetugasGantiShiftRWI();">+ Tambah</button>
                    </div>
                    <div class="row pr-2">
                        <button class="btn btn-primary btn-block" onclick="reloadPetugasGantiShiftRWI();">Reload<br>Data</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var $tableShiftRWISekarang = $('#shiftRWISekarang');
    var $tableShiftRWIBaru = $('#shiftRWIBaru');
    var $tableShiftRWICalon = $('#shiftRWICalon');
    var gantiShiftRWILoading = document.getElementById('gantiShiftRWI_loading');
    var jumlahPetugasBaruGantiShift = document.getElementById('jumlahPetugasBaruGantiShift');
    var idRuangGantiShiftRWI = '';
    loadAwal();
        
    function loadAwal(){
        $tableShiftRWISekarang.bootstrapTable();
        $tableShiftRWIBaru.bootstrapTable();
        $tableShiftRWICalon.bootstrapTable();
        cekAktifShiftUserGantiShiftRWI();
    }
    
    function cekAktifShiftUserGantiShiftRWI(){
        var param = {
            user: user['id_user']
        };
        
        apiPOST("Rawat_inap/cekShiftUser", param, hasil => {
            if(hasil !== null){
                if(hasil['data'] == ""){
                    cekSettinganRuanganUserGantiShiftRWI();
                }else{
                    idRuangGantiShiftRWI = hasil['data']['id_ruang'];
                    document.getElementById('namaRuanganGantiShift').innerHTML = 'Ruangan ' + hasil['data']['nama_ruang'];
                    loadCalonPegawaiGantiShiftRWI();
                }
            }else{
                gantiShiftRWILoading.style.display = 'none';
            }
        });
    }
    
    function cekSettinganRuanganUserGantiShiftRWI(){
        var param = {
            user: user['id_user']
        };
        
        apiPOST("Rawat_inap/cekSettingRuangUser", param, hasil => {
            if(hasil !== null){
                idRuangGantiShiftRWI = hasil['data']['id_ruang'];
                document.getElementById('namaRuanganGantiShift').innerHTML = 'Ruangan ' + hasil['data']['nama_ruang'];
                loadCalonPegawaiGantiShiftRWI();
            }else{
                gantiShiftRWILoading.style.display = 'none';
            }
        });
    }
    
    function loadCalonPegawaiGantiShiftRWI(){
        $tableShiftRWIBaru.bootstrapTable('removeAll');
        jumlahPetugasBaruGantiShift.innerHTML = 0;
        var param = {
            ruang: idRuangGantiShiftRWI
        };
                
        apiPOST("Rawat_inap/getCalonPegawaiShiftRuangan", param, hasil => {
            if(hasil !== null){
                $tableShiftRWICalon.bootstrapTable('load', hasil['data']);
                loadShiftSekarangGantiShiftRWI();
            }else{
                gantiShiftRWILoading.style.display = 'none';
            }
        });
    }
    
    function loadShiftSekarangGantiShiftRWI(){
        var param = {
            ruang: idRuangGantiShiftRWI
        };
                
        apiPOST("Rawat_inap/getShiftRuangan", param, hasil => {
            if(hasil !== null){
                $tableShiftRWISekarang.bootstrapTable('load', hasil['data']);
            }
            gantiShiftRWILoading.style.display = 'none';
        });
    }
    
    function tambahPetugasGantiShiftRWI(){
        var listCalon = $tableShiftRWICalon.bootstrapTable('getSelections');
        var listBaru = $tableShiftRWIBaru.bootstrapTable('getData');
        listCalon.forEach((element) => {
            if(listBaru.includes(element) == false){
                $tableShiftRWIBaru.bootstrapTable('append', element);
            }
        });
        jumlahPetugasBaruGantiShift.innerHTML = $tableShiftRWIBaru.bootstrapTable('getData').length;
    }
    
    function reloadPetugasGantiShiftRWI(){
        gantiShiftRWILoading.style.display = 'block';
        loadCalonPegawaiGantiShiftRWI();
    }
    
    function hapusPetugasGantiShiftRWI(){
        var ids = $.map($tableShiftRWIBaru.bootstrapTable('getSelections'), function (row) {
            return row.id_user;
        });
        $tableShiftRWIBaru.bootstrapTable('remove', {
            field: 'id_user',
            values: ids
        });
        jumlahPetugasBaruGantiShift.innerHTML = $tableShiftRWIBaru.bootstrapTable('getData').length;
    } 
    
    
    
    function gantiShiftRWI(){
        var param = {
            ruang: idRuangGantiShiftRWI,
            petugas: $tableShiftRWIBaru.bootstrapTable('getData'),
            user: user['id_user']
        };
        
        gantiShiftRWILoading.style.display = 'block';
        
        apiPOST("Rawat_inap/gantiShiftRuangan", param, hasil => {
            if(hasil !== null){
                loadCalonPegawaiGantiShiftRWI();
            }
        });
    }
    
</script>