<?php $nowday       = date('Y-m-d'); ?>
<div class="col-md-12 p-2" id="list1jadwalOK">
    <div class="card card-outline card-default mb-0">
        <div class="overlay-wrapper" id="loadingjadwalOK1">
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
                                    <li class="dropdown-item" onclick="showCariRMOK()">No. RekamMedik</a></li>
                                    <li class="dropdown-item" onclick="showCariNamaOK()">Nama Pasien</a></li>
                                </ul>
                            </div>
                            <input type="number" class="form-control form-control-xs" placeholder="Entry No. RM" id="cariBynoRMOK">
                            <input type="text" class="form-control form-control-xs" placeholder="Entry Nama Pasien" id="cariBynamaOK">
                        </div>
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label>Unit :</label>
                        <select class="form-control form-control-xs" id="unitJadwalOK"></select>
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label>Tgl Kunjungan :</label>
                        <input type="date" id="tglAwalKunjunganOK" class="form-control form-control-xs">
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label>s/d :</label>
                        <input type="date" id="tglAhirKunjunganOK" onkeypress="listpasienKunjunganOK()" class="form-control form-control-xs">
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label>Jumlah Pasien :</label>
                        <select class="form-control form-control-xs" id="jadwalOKjumlah">
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

<div class="col-md-12 p-2" id="list2jadwalOK">
    <div class="card card-outline">
        <div class="overlay-wrapper" id="loadingjadwalOK2">
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
                                <h6 class="hr6-custom"><i class="fas fa-hospital-alt"></i> List Kunjungan Pasien</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <table id="tabellistpasienKunjunganOK" class="table table-striped table-sm choose" style="border-collapse: inherit;">
                <thead>
                    <tr>
                        <th width="20"><i class="fas fa-cog"></i></th>
                        <th width="100">ID Kunjungan</th>
                        <th width="100">No. RM</th>
                        <th>Nama Pasien</th>
                        <th width="200">Unit</th>
                        <th width="300">Tgl.Kunjungan</th>
                        <th width="50">Status</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
<div class="modalAddJadwalOK"></div>
<script>
    var nowday = "<?php echo $nowday; ?>";
    document.getElementById('tglAwalKunjunganOK').value = nowday;
    document.getElementById('tglAhirKunjunganOK').value = nowday;
    listpasienKunjunganOK();

    $('#cariBynoRMOK').show();
    $('#cariBynamaOK').hide();

    function showCariRMOK() {
        $('#cariBynoRMOK').show();
        $('#cariBynamaOK').hide();
        $("#cariBynoRMOK").trigger('focus');
        document.getElementById('cariBynamaOK').value = '';
    }

    function showCariNamaOK() {
        $('#cariBynoRMOK').hide();
        $('#cariBynamaOK').show();
        $("#cariBynamaOK").trigger('focus');
        document.getElementById('cariBynoRMOK').value = '';
    }
    jadwalOKunit();

    function jadwalOKunit() {
        apiPOST('Kamaroperasi/unit', null, hasil => {
            var data = hasil['data'];
            var unit = '';
            unit += '<option value="">Semua Unit</option>';
            for (var i = 0; i < data.length; i++) {
                unit += '<option value="' + data[i]['id_unit'] + '">' + data[i]['nama_unit'] + '</option>';
            }
            document.getElementById('unitJadwalOK').innerHTML = unit;
        });
    }
    $("#cariBynoRMOK").keydown(function(event) {
        switch (event.which) {
            case 13:
                $('#loadingjadwalOK2').show();
                listpasienKunjunganOK();
                break;
        }
    });

    $("#cariBynamaOK").keydown(function(event) {
        switch (event.which) {
            case 13:
                $('#loadingjadwalOK2').show();
                listpasienKunjunganOK();
                break;
        }
    });

    $("#unitJadwalOK").change(function(event) {
        $('#loadingjadwalOK2').show();
        listpasienKunjunganOK();
    });
    // $("#tglAwalKunjunganOK").change(function(event) {
    //     $('#loadingjadwalOK2').show();
    //     listpasienKunjunganOK();
    // });
    // $("#tglAhirKunjunganOK").change(function(event) {
    //     $('#loadingjadwalOK2').show();
    //     listpasienKunjunganOK();
    // });

    $("#jadwalOKjumlah").change(function(event) {
        $('#loadingjadwalOK2').show();
        listpasienKunjunganOK();
    });

    function OKrefres() {
        $('#loadingjadwalOK1').hide();
        $('#loadingjadwalOK2').hide();
    }
    setTimeout(OKrefres, 1000);

    function listpasienKunjunganOK() {
        $('#loadingjadwalOK2').show();
        var listParam = [
            'cariBynoRMOK', 'cariBynamaOK', 'unitJadwalOK'
        ];

        var param = {
            no_rm: document.getElementById('cariBynoRMOK').value,
            nmpasien: document.getElementById('cariBynamaOK').value,
            unit: document.getElementById('unitJadwalOK').value,
            jml: document.getElementById('jadwalOKjumlah').value,
            tglawal: document.getElementById('tglAwalKunjunganOK').value,
            tglahir: document.getElementById('tglAhirKunjunganOK').value
        };
        apiPOST("Kamaroperasi/listkunjunganPasien", param, hasil => {
            $('#loadingjadwalOK2').hide();
            $('#tabellistpasienKunjunganOK tbody').html('');

            if (hasil['data'] !== null) {
                if (hasil['code'] == 'XX') {
                    toastr.error("Data tidak ditemukan");
                    var Baris = '';
                    Baris += "<tr style='cursor: not-allowed;'>";
                    Baris += "<td colspan='7'><h6 class='text-center'>Data tidak ditemukan!!<h6></td>";
                    Baris += "</tr>";

                    $('#tabellistpasienKunjunganOK tbody').append(Baris);
                    document.getElementById('cariBynoRMOK').value = '';
                    document.getElementById('cariBynamaOK').value = '';

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
                        var penjamin = a[i].nama_penjamin;
                        // var nokartu = a[i].no_kartu;
                        var produk = a[i].nama_produk;
                        var id_unit = a[i].id_unit;
                        var unit = a[i].nama_unit;
                        Baris += '<tr>';
                        Baris += '<td><button class="btn btn-sm bg-warning" onclick="addJadwalOK(' + "'" + no_rm + "','" + id_transaksi + "','" + id_kunjungan + "','" + nmpasien + "','" + alamat + "','" + umur + "','" + jenkel + "','" + id_dokter + "','" + dokter + "','" + penjamin + "','" + unit + "','" + id_unit + "'" + ');"><i class="fas fa-pencil-alt"></i></td>';
                        Baris += '<td>' + id_kunjungan + '</td>';
                        Baris += '<td>' + no_rm + '</td>';
                        Baris += '<td>' + nmpasien + '</td>';
                        Baris += '<td>' + unit + '</td>';
                        Baris += '<td>' + tgl_kunj + '</td>';
                        Baris += '<td>' + status_kunj + '</td>';
                        Baris += '</tr>';
                    }
                    $('#tabellistpasienKunjunganOK tbody').append(Baris);
                }
            }
        });
    }

    function addJadwalOK(no_rm, id_transaksi, id_kunjungan, nmpasien, alamat, umur, jenkel, id_dokter, dokter, penjamin, unit, id_unit) {
        $('#list1jadwalOK').hide();
        $('#list2jadwalOK').hide();
        var data = {
            no_rm: no_rm,
            id_dokter: id_dokter,
            id_transaksi: id_transaksi,
            id_kunjungan: id_kunjungan,
            id_unit: id_unit,
            'namapasien': nmpasien.replace(/ /g, '%20'),
            'alamat': alamat.replace(/ /g, '%20'),
            'umur': umur.replace(/ /g, '%20'),
            'jenkel': jenkel.replace(/ /g, '%20'),
            'dokter': dokter.replace(/ /g, '%20'),
            'penjamin': penjamin.replace(/ /g, '%20'),
            'unit': unit.replace(/ /g, '%20'),
        }

        var datax = JSON.stringify(data);
        $('.modalAddJadwalOK').load('Kamaroperasi/modaladdjadwalok?data=' + datax);
    }
</script>