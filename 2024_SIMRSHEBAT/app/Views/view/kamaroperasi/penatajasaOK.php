<?php $nowday       = date('Y-m-d'); ?>
<div class="col-md-12 p-2" id="list1PenataJasaOK">
    <div class="card card-outline card-default mb-0">
        <div class="overlay-wrapper" id="loadingPenataJasaOK">
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
                                    <li class="dropdown-item" onclick="showRMPenataJasaOK()">No. RekamMedik</a></li>
                                    <li class="dropdown-item" onclick="showNamaPenataJasaOK()">Nama Pasien</a></li>
                                </ul>
                            </div>
                            <input type="number" class="form-control form-control-xs" placeholder="Entry No. RM" id="cariByRMPenataJasaOK">
                            <input type="text" class="form-control form-control-xs" placeholder="Entry Nama Pasien" id="cariByNamaPenataJasaOK">
                        </div>
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label>Unit :</label>
                        <select class="form-control form-control-xs" id="penataJasaOKunit"></select>
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label>Tgl Kunjungan :</label>
                        <input type="date" id="penataJasaOKtglAwal" class="form-control form-control-xs">
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label>s/d :</label>
                        <input type="date" id="penataJasaOKtglahir" onkeypress="listpasienKunjunganOK2()" class="form-control form-control-xs">
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label>Jumlah Pasien :</label>
                        <select class="form-control form-control-xs" id="penataJasaOKjumlah">
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
    </div>
</div>

<div class="col-md-12 p-2" id="list2PenataJasaOK">
    <div class="card card-outline">
        <div class="overlay-wrapper" id="loading2PenataJasaOK">
            <div class="overlay">
                <i class="fas fa-3x fa-sync-alt fa-spin"></i>
            </div>
        </div>
        <div class="card-body p-1" style="max-height: 500px; overflow: auto;">
            <div class="card" style="box-shadow: 0 0 3px #343a40; margin-bottom: 0;">
                <div>
                    <div class="card-header p-1">
                        <div class="row">
                            <div class="col-md-12">
                                <h6 class="hr6-custom"><i class="fas fa-hospital-alt"></i> List Jadwal Operasi</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <table id="tableListPenataJasaOK" class="table table-striped table-sm choose" style="border-collapse: inherit;">
                <thead>
                    <tr>
                        <th width="30"><i class="fas fa-cog"></i></th>
                        <th width="100">ID Kunjungan</th>
                        <th width="100">Nama Pasien</th>
                        <th width="100">No RM</th>
                        <th width="100">Dokter</th>
                        <th width="100">Tgl Bedah</th>
                        <th width="100">Status</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
<div class="modalPenataJasaOK"></div>
<script>
    var nowday = "<?php echo $nowday; ?>";
    document.getElementById('penataJasaOKtglAwal').value = nowday;
    document.getElementById('penataJasaOKtglahir').value = nowday;

    listbookingKamarOK()
    $('#cariByRMPenataJasaOK').show();
    $('#cariByNamaPenataJasaOK').hide();

    function showRMPenataJasaOK() {
        $('#cariByRMPenataJasaOK').show();
        $('#cariByNamaPenataJasaOK').hide();
        $("#cariByRMPenataJasaOK").trigger('focus');
        document.getElementById('cariByNamaPenataJasaOK').value = '';
    }

    function showNamaPenataJasaOK() {
        $('#cariByRMPenataJasaOK').hide();
        $('#cariByNamaPenataJasaOK').show();
        $("#cariByNamaPenataJasaOK").trigger('focus');
        document.getElementById('cariByRMPenataJasaOK').value = '';
    }
    bookingKamarOKunit();

    function bookingKamarOKunit() {
        apiPOST('Kamaroperasi/unit', null, hasil => {
            var data = hasil['data'];
            var unit = '';
            unit += '<option value="">Semua Unit</option>';
            for (var i = 0; i < data.length; i++) {
                unit += '<option value="' + data[i]['id_unit'] + '">' + data[i]['nama_unit'] + '</option>';
            }
            document.getElementById('penataJasaOKunit').innerHTML = unit;
        });
    }
    $("#cariByRMPenataJasaOK").keydown(function(event) {
        switch (event.which) {
            case 13:
                $('#loading2PenataJasaOK').show();
                listbookingKamarOK();
                break;
        }
    });

    $("#cariByNamaPenataJasaOK").keydown(function(event) {
        switch (event.which) {
            case 13:
                $('#loading2PenataJasaOK').show();
                listbookingKamarOK();
                break;
        }
    });

    $("#penataJasaOKunit").change(function(event) {
        $('#loading2PenataJasaOK').show();
        listbookingKamarOK();
    });
    // $("#tglAwalKunjunganOK").change(function(event) {
    //     $('#loadingjadwalOK2').show();
    //     listpasienKunjunganOK();
    // });
    // $("#tglAhirKunjunganOK").change(function(event) {
    //     $('#loadingjadwalOK2').show();
    //     listpasienKunjunganOK();
    // });

    $("#penataJasaOKjumlah").change(function(event) {
        $('#loading2PenataJasaOK').show();
        listbookingKamarOK();
    });

    function OKrefrespasien() {
        $('#loadingPenataJasaOK').hide();
        $('#loading2PenataJasaOK').hide();
    }
    setTimeout(OKrefrespasien, 1000);

    function listbookingKamarOK() {
        $('#loading2PenataJasaOK').show();
        var listParam = [
            'cariByRMPenataJasaOK', 'cariByNamaPenataJasaOK', 'penataJasaOKunit'
        ];

        var param = {
            no_rm: document.getElementById('cariByRMPenataJasaOK').value,
            nmpasien: document.getElementById('cariByNamaPenataJasaOK').value,
            unit: document.getElementById('penataJasaOKunit').value,
            jml: document.getElementById('penataJasaOKjumlah').value,
            tglawal: document.getElementById('penataJasaOKtglAwal').value,
            tglahir: document.getElementById('penataJasaOKtglahir').value
        };
        apiPOST("Kamaroperasi/listbookingkamarOK", param, hasil => {
            $('#loading2PenataJasaOK').hide();
            $('#tableListPenataJasaOK tbody').html('');

            if (hasil['data'] !== null) {
                if (hasil['code'] == 'XX') {
                    toastr.error("Data tidak ditemukan");
                    var Baris = '';
                    Baris += '<tr>';
                    Baris += '<td colspan="8">';
                    Baris += '<div class="col-md-12 col-sm-6 col-12" style="cursor:not-allowed;"><div class="info-box shadow mb-1 mt-1" style="border: 2px solid; background-color: darksalmon; font-weight: bolder;"><span class="info-box-icon bg-danger"><i class="fa fa-times"></i></span><div class="info-box-content"><span class="info-box-text"><h5 class="info-box-text">Data tidak ditemukan</h5></span></div></div></div>';
                    Baris += '</td>';
                    Baris += '</tr>';

                    $('#tableListPenataJasaOK tbody').append(Baris);
                    document.getElementById('cariByRMPenataJasaOK').value = '';
                    document.getElementById('cariByNamaPenataJasaOK').value = '';

                } else {

                    var Baris = "";
                    var a = hasil['data'];
                    for (var i = 0; i < a.length; i++) {
                        var no_rm = a[i].no_rm;
                        var nmpasien = a[i].nama;
                        var id_kunjungan = a[i].id_kunjungan;
                        var id_transaksi = a[i].id_transaksi;
                        var unit = a[i].nama_unit;
                        var tgl_kunj = a[i].tgl_masuk;
                        var status_kunj = a[i].status_kunjungan;
                        var alamat = a[i].alamat;
                        var umur = a[i].umur;
                        var jenkel = a[i].jenis_kelamin;
                        var id_dokter = a[i].id_pegawai;
                        var dokter = a[i].nama_pegawai;
                        var id_penjamin = a[i].id_penjamin;
                        var penjamin = a[i].nama_penjamin;
                        var nokartu = a[i].no_kartu;
                        var produk = a[i].nama_produk;
                        var id_unit = a[i].id_unit;
                        var unit = a[i].nama_unit;
                        var pjpasien = a[i].nama_penanggung_jawab;
                        var nopjpasien = a[i].no_hp_penanggung_jawab;
                        var unit = a[i].nama_unit;
                        var tgl_boking = a[i]['tgl_boking'];
                        var status_boking = a[i]['status_boking'];

                        Baris += '<tr>';
                        Baris += '<td><button class="btn btn-sm bg-warning" onclick="inputJasapembedahanOK(' + "'" + no_rm + "','" + id_transaksi + "','" + id_kunjungan + "','" + tgl_kunj + "','" + nmpasien + "','" + alamat + "','" + umur + "','" + jenkel + "','" + id_dokter + "','" + dokter + "','" + penjamin + "','" + nokartu + "','" + unit + "','" + id_unit + "','" + id_penjamin + "'" + ');"><i class="fas fa-pencil-alt"></i></td>';
                        Baris += '<td>' + id_kunjungan + '</td>';
                        Baris += '<td>' + nmpasien + '</td>';
                        Baris += '<td>' + no_rm + '</td>';
                        Baris += '<td>' + dokter + '</td>';
                        Baris += '<td>' + tgl_boking + '</td>';
                        Baris += '<td>' + status_boking + '</td>';

                        Baris += '</tr>';
                    }
                    $('#tableListPenataJasaOK tbody').append(Baris);
                }
            }
        });
    }

    function inputJasapembedahanOK(no_rm, id_transaksi, id_kunjungan, tgl_kunj, nmpasien, alamat, umur, jenkel, id_dokter, dokter, penjamin, nokartu, unit, id_unit, id_penjamin) {
        $('#list1PenataJasaOK').hide();
        $('#list2PenataJasaOK').hide();
        var data = {
            no_rm: no_rm,
            id_dokter: id_dokter,
            id_transaksi: id_transaksi,
            id_kunjungan: id_kunjungan,
            id_unit: id_unit,
            id_penjamin: id_penjamin,
            'tglkunjungan': tgl_kunj.replace(/ /g, '%20'),
            'namapasien': nmpasien.replace(/ /g, '%20'),
            'alamat': alamat.replace(/ /g, '%20'),
            'umur': umur.replace(/ /g, '%20'),
            'jenkel': jenkel.replace(/ /g, '%20'),
            'dokter': dokter.replace(/ /g, '%20'),
            'penjamin': penjamin.replace(/ /g, '%20'),
            'nokartu': nokartu.replace(/ /g, '%20'),
            'unit': unit.replace(/ /g, '%20')
        }
        // console.log(data)
        var datax = JSON.stringify(data);
        $('.modalPenataJasaOK').load('Kamaroperasi/modalInputpenataJasaOK?data=' + datax);
    }
</script>