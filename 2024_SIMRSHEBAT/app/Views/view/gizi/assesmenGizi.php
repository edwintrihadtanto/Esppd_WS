<?php $nowday       = date('Y-m-d'); ?>
<div class="col-md-12 p-2" id="assesmenGizilist1">
    <div class="card card-outline card-default mb-0">
        <div class="overlay-wrapper" id="assesmenGiziLoading1">
            <div class="overlay">
                <i class="fas fa-3x fa-sync-alt fa-spin"></i>
            </div>
        </div>
        <div class="card-body p-2 darkgrey-custom">
            <div class="row row-custom">
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label>Cari No. RM / Nama Pasien :</label>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="height:25px;"></button>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-item" onclick="showCariAssesmennoRM()">No. RekamMedik</a></li>
                                    <li class="dropdown-item" onclick="showCariAssesmenNama()">Nama Pasien</a></li>
                                </ul>
                            </div>
                            <input type="number" class="form-control form-control-xs" placeholder="Entry No. RM" id="cariAssesmenBynorm">
                            <input type="text" class="form-control form-control-xs" placeholder="Entry Nama Pasien" id="cariAssesmenByNama">
                        </div>
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label>Unit :</label>
                        <select class="form-control form-control-xs" id="assesmenGizi_unit"></select>
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label>Jumlh Pasien :</label>
                        <select class="form-control form-control-xs" id="jumlahPasienGiziassesmen">
                            <option value="10">10 Pasien</option>
                            <option value="15">15 Pasien</option>
                            <option value="20">20 Pasien</option>
                            <option value="25">25 Pasien</option>
                            <option value="30">30 Pasien</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <!-- card-outline -->
    </div>
</div>

<div class="col-md-12 p-2" id="assesmenGizilist2">
    <div class="card card-outline">
        <div class="overlay-wrapper" id="assesmenGiziLoadingawal">
            <div class="overlay">
                <i class="fas fa-3x fa-sync-alt fa-spin"></i>
            </div>
        </div>
        <div class="card-header p-1 darkgrey-custom mb-1">
            <h6><i class="fas fa-utensils"></i> List Pasien</h6>
        </div>

        <div class="card-body" style="padding: 0px; max-height: 320px; overflow: auto;">
            <div class="row" id="assesmenGizidaftarorder">
            </div>
        </div>
    </div>
</div>


<div class="assesmenGizi_content"></div>
<div class="modassGiziRiwayatpenyakit"></div>

<script type="text/javascript">
    var dataPasienassGizi = {
        no_rm: '',
        nmpasien: ''
    };
    var nowday = "<?php echo $nowday ?>";

    showCariAssesmennoRM();
    showCariAssesmenNama();
    assesmenGizidaftarorder();
    $("#cariAssesmenBynorm").keydown(function(event) {
        switch (event.which) {
            case 13:
                $('#assesmenGiziLoadingawal').show();
                assesmenGizidaftarorder();
                break;
        }
    });

    $("#cariAssesmenByNama").keydown(function(event) {
        switch (event.which) {
            case 13:
                $('#assesmenGiziLoadingawal').show();
                assesmenGizidaftarorder();
                break;
        }
    });

    $("#jumlahPasienGiziassesmen").change(function(event) {
        $('#assesmenGiziLoadingawal').show();
        assesmenGizidaftarorder();
    });
    assesmenGizidaftarorder();
    $('#cariAssesmenBynorm').show();
    $('#cariAssesmenByNama').hide();

    $("#assesmenGizi_unit").change(function(event) {
        $('#assesmenGiziLoadingawal').hide();
        assesmenGizidaftarorder();
    });
    assesmenGiziUnit();

    function assesmenGiziUnit() {
        apiPOST('Gizi/unit', null, hasil => {
            var data = hasil['data'];
            var unit = '';
            unit += '<option value="">Semua Unit</option>';
            for (var i = 0; i < data.length; i++) {
                unit += '<option value="' + data[i]['id_unit'] + '">' + data[i]['nama_unit'] + '</option>';
            }
            document.getElementById('assesmenGizi_unit').innerHTML = unit;
        });
    }

    function showCariAssesmennoRM() {
        $('#cariAssesmenBynorm').show();
        $('#cariAssesmenByNama').hide();
        $("#cariAssesmenBynorm").trigger('focus');
        document.getElementById('cariAssesmenByNama').value = '';
    }

    function showCariAssesmenNama() {
        $('#cariAssesmenByNama').show();
        $('#cariAssesmenBynorm').hide();
        $("#cariAssesmenByNama").trigger('focus');
        document.getElementById('cariAssesmenBynorm').value = '';
    }

    function assesmenGizidaftarorder() {
        $('#assesmenGiziLoadingawal').show();
        var normxassGizi = document.getElementById('cariAssesmenBynorm').value;
        document.getElementById('cariAssesmenBynorm').value = normOtomatis(normxassGizi);
        var listParam = [
            'cariAssesmenBynorm', 'cariAssesmenByNama', 'assesmenGizi_unit'
        ];

        var param = {
            no_rm: normOtomatis(normxassGizi),
            nmpasien: document.getElementById('cariAssesmenByNama').value,
            unit: document.getElementById('assesmenGizi_unit').value,
            jml: document.getElementById('jumlahPasienGiziassesmen').value
        };
        apiPOST("Gizi/assesmenGizi_listpasien", param, hasil => {
            $('#assesmenGiziLoadingawal').hide();
            $('#assesmenGizidaftarorder').html('');

            if (hasil['data'] !== null) {
                if (hasil['code'] == 'XX') {
                    toastr.error("Data tidak ditemukan");
                    var Baris = '';
                    Baris += '<div class="col-md-12 col-sm-6 col-12" style="cursor:not-allowed;"><div class="info-box shadow mb-1 mt-1" style="border: 2px solid; background-color: darksalmon; font-weight: bolder;"><span class="info-box-icon bg-danger"><i class="fa fa-times"></i></span><div class="info-box-content"><span class="info-box-text"><h5 class="info-box-text">Data tidak ditemukan</h5></span></div></div></div>';

                    $('#assesmenGizidaftarorder').append(Baris);
                    document.getElementById('cariAssesmenBynorm').value = '';
                    document.getElementById('cariAssesmenByNama').value = '';

                } else {

                    var Baris = "";
                    var a = hasil['data'];
                    for (var i = 0; i < a.length; i++) {
                        var no_rm = a[i].no_rm;
                        var id_kamar = a[i].id_kamar;
                        var diag = a[i].cat_diagnosa;
                        var nmpasien = a[i].nama;
                        var id_penjamin = a[i].id_penjamin;
                        var umur = a[i].umur;
                        var alamat = a[i].alamat;
                        var penjamin = a[i].nama_penjamin;
                        var sep = a[i].no_sjp;
                        var telp = a[i].telepon;
                        var unit = a[i].nama_unit;
                        var id_unit = a[i].id_unit;
                        var id_kunj = a[i].id_kunjungan;
                        var tglkunj = a[i].tgl_masuk;
                        var jenkel = a[i].jenis_kelamin;
                        var transaksi = a[i].tgl_transaksi;
                        var id_dokter = a[i].id_pegawai;
                        var nama_dokter = a[i].nama_pegawai;
                        var status_assesmen = a[i].status_assesmen;
                        var skrining_perawat = a[i].skrining_perawat;
                        var skrining_ahli_gizi = a[i].skrining_ahli_gizi;
                        var kondisi_khusus = a[i].kondisi_khusus;
                        var diet_awal = a[i].diet_awal;
                        var tindak_lanjut = a[i].tindak_lanjut;
                        var ahli_gizi = a[i].ahli_gizi;
                        var jenis_pasien = a[i].jenis_pasien;
                        var tgl_assesmen = a[i].tgl_assesmen;
                        if (status_assesmen == 't') {
                            Baris += '<div class="col-lg-3 col-6">';
                            Baris += '<div class="small-box btn-secondary-default" style="border: solid 2px darkred; background-color: #00BFFF;">';
                            Baris += '<div class="inner p-1">';
                            Baris += '<h6><strong>' + no_rm + '</strong> / ' + nmpasien + '</h6>';
                            Baris += '<p class="p-0 mb-1">' + alamat + '</p>';
                            Baris += '<p class="p-0"><strong><i>' + unit + '</i></strong></p>';
                            Baris += '</div>';
                            Baris += '<div class="icon">';
                            Baris += '<i class="fa fa-user"></i>';
                            Baris += '</div>';
                            Baris += '<a class="small-box-footer" style="background-color: darkblue;" onclick="UpdatelistassesmenGizi(' + "'" + no_rm + "','" + nmpasien + "','" + umur + "','" + alamat + "','" + id_unit + "','" + unit + "','" + sep + "','" + telp + "','" + penjamin + "','" + tglkunj + "','" + transaksi + "','" + jenkel + "','" + id_dokter + "','" + nama_dokter + "','" + id_kunj + "','" + status_assesmen + "','" + skrining_perawat + "','" + skrining_ahli_gizi + "','" + kondisi_khusus + "','" + diet_awal + "','" + tindak_lanjut + "','" + ahli_gizi + "','" + jenis_pasien + "','" + tgl_assesmen + "'" + ')">Klik Detail <i class="fas fa-arrow-circle-right"></i></a>';
                            Baris += '</div>';
                            Baris += '</div>';
                        } else {
                            Baris += '<div class="col-lg-3 col-6">';
                            Baris += '<div class="small-box btn-secondary-default" style="border: solid 2px darkred;">';
                            Baris += '<div class="inner p-1">';
                            Baris += '<h6><strong>' + no_rm + '</strong> / ' + nmpasien + '</h6>';
                            Baris += '<p class="p-0 mb-1">' + alamat + '</p>';
                            Baris += '<p class="p-0"><strong><i>' + unit + '</i></strong></p>';
                            Baris += '</div>';
                            Baris += '<div class="icon">';
                            Baris += '<i class="fa fa-user"></i>';
                            Baris += '</div>';
                            Baris += '<a class="small-box-footer" style="background-color: darkgreen;" onclick="UpdatelistassesmenGizi(' + "'" + no_rm + "','" + nmpasien + "','" + umur + "','" + alamat + "','" + id_unit + "','" + unit + "','" + sep + "','" + telp + "','" + penjamin + "','" + tglkunj + "','" + transaksi + "','" + jenkel + "','" + id_dokter + "','" + nama_dokter + "','" + id_kunj + "','" + status_assesmen + "','" + skrining_perawat + "','" + skrining_ahli_gizi + "','" + kondisi_khusus + "','" + diet_awal + "','" + tindak_lanjut + "','" + ahli_gizi + "','" + jenis_pasien + "','" + tgl_assesmen + "'" + ')">Klik Detail <i class="fas fa-arrow-circle-right"></i></a>';
                            Baris += '</div>';
                            Baris += '</div>';
                        }
                    }
                    $('#assesmenGizidaftarorder').append(Baris);
                }
            }
        });
    }

    function assesmenGizi_refresh() {
        $('#assesmenGiziLoading1').hide();
        $('#assesmenGiziLoadingawal').hide();
    }
    setTimeout(assesmenGizi_refresh, 1000);

    function UpdatelistassesmenGizi(no_rm, nmpasien, umur, alamat, id_unit, unit, sep, telp, penjamin, tglkunj, transaksi, jenkel, id_dokter, nama_dokter, id_kunj, status_assesmen, skrining_perawat, skrining_ahli_gizi, kondisi_khusus, diet_awal, tindak_lanjut, ahli_gizi, jenis_pasien, tgl_assesmen) {
        $('#assesmenGizilist1').hide();
        $('#assesmenGizilist2').hide();
        var data = {
            no_rm: no_rm,
            nmpasien: nmpasien,
            tglkunj: tglkunj,
            transaksi: transaksi,
            id_dokter: id_dokter,
            jenkel: jenkel,
            id_kunj: id_kunj,
            status_assesmen: status_assesmen,
            skrining_perawat: skrining_perawat,
            skrining_ahli_gizi: skrining_ahli_gizi,
            kondisi_khusus: kondisi_khusus,
            diet_awal: diet_awal,
            tindak_lanjut: tindak_lanjut,
            ahli_gizi: ahli_gizi,
            jenis_pasien: jenis_pasien,
            tgl_assesmen: tgl_assesmen,
            'dokterPasienGizi': nama_dokter.replace(/ /g, '%20'),
            'alamatPasienGizi': alamat.replace(/ /g, '%20'),
            'umurPasienGizi': umur.replace(/ /g, '%20'),
            'penjaminPasienGizi': penjamin.replace(/ /g, '%20'),
            'sepPasienGizi': sep.replace(/ /g, '%20'),
            'telpPasienGizi': telp.replace(/ /g, '%20'),
            'idunitPasienGizi': id_unit,
            'unitPasienGizi': unit.replace(/ /g, '%20')
        }
        var myJSON = JSON.stringify(data);
        $('.assesmenGizi_content').load('Gizi/modalassesmengizi?data=' + myJSON);
        if (status_assesmen == 't') {
            toastr.success('Sudah melakukan assesmen gizi!!');
        } else {
            Swal.fire({
                icon: 'info',
                text: 'Belum melakukan assesmen gizi!'
            })
        }
    }
</script>