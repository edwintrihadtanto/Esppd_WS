<?php $nowday       = date('Y-m-d'); ?>
<div class="col-md-12 p-2" id="list1jadwalOKpasien">
    <div class="card card-outline card-default mb-0">
        <div class="overlay-wrapper" id="loadingjadwalOK1pasien">
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
                                    <li class="dropdown-item" onclick="showCaripaseinRMOK()">No. RekamMedik</a></li>
                                    <li class="dropdown-item" onclick="showCaripasienNamaOK()">Nama Pasien</a></li>
                                </ul>
                            </div>
                            <input type="number" class="form-control form-control-xs" placeholder="Entry No. RM" id="cariBynoRMOKpasien">
                            <input type="text" class="form-control form-control-xs" placeholder="Entry Nama Pasien" id="cariBynamaOKpasien">
                        </div>
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label>Unit :</label>
                        <select class="form-control form-control-xs" id="unitJadwalOKpasien"></select>
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label>Tgl Kunjungan :</label>
                        <input type="date" id="tglAwalKunjunganOKpasien" class="form-control form-control-xs">
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label>s/d :</label>
                        <input type="date" id="tglAhirKunjunganOKpasien" onkeypress="listpasienKunjunganOK2()" class="form-control form-control-xs">
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label>Jumlah Pasien :</label>
                        <select class="form-control form-control-xs" id="jadwalOKjumlahpasien">
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

<div class="col-md-12 p-2" id="list2jadwalOKpasien">
    <div class="card card-outline">
        <div class="overlay-wrapper" id="loadingjadwalOK2pasien">
            <div class="overlay">
                <i class="fas fa-3x fa-sync-alt fa-spin"></i>
            </div>
        </div>
        <div class="card-body p-1" style="max-height: 500px; overflow: auto;">
            <div class="card" style="box-shadow: 0 0 3px #343a40; margin-bottom: 0;">
                <div>
                    <div class="card-header p-1">
                        <div class="row">
                            <div class="col">
                                <button type="button" onclick="modalInputJadwalOK()" class="btn btn-xs bg-secondary"><i class="fas fa-plus"></i> Tambah Jadwal</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h6 class="hr6-custom"><i class="fas fa-hospital-alt"></i> List Jadwal Operasi</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <table id="tabellistpasienbokingOK" class="table table-striped table-sm choose" style="border-collapse: inherit;">
                <thead>
                    <tr>
                        <th width="30"><i class="fas fa-cog"></i></th>
                        <th width="100">ID Kunjungan</th>
                        <th width="100">Nama Pasien</th>
                        <th width="100">No RM</th>
                        <th width="100">Dokter</th>
                        <th width="100">Kamar Bedah</th>
                        <th width="100">Tgl Bedah</th>
                        <th width="100">Status</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" data-keyboard="false" data-backdrop="static" id="cariKunjunganPasienOK" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="">Input Jadwal Operasi</h2>
            </div>
            <div class="modal-body">
                <div class="row row-style">
                    <div class="col-sm-12">
                        <input type="text" id="tambahPermintaanOKnew" class="form-control form-control-sm" placeholder="Masukan No RM">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-danger" data-bs-dismiss="modal" onclick="closeModalTambahJadwalOK()">Close</button>
                <button type="button" class="btn bg-gradient-success" onclick="contentmodalInputJadwalOK()">Cari</button>
            </div>
        </div>
    </div>
</div>
<div class="modalListBookingOK"></div>
<div class="modalAddJadwalOK"></div>
<script>
    var nowday = "<?php echo $nowday; ?>";
    document.getElementById('tglAwalKunjunganOKpasien').value = nowday;
    document.getElementById('tglAhirKunjunganOKpasien').value = nowday;

    listbookingKamarOK()
    $('#cariBynoRMOKpasien').show();
    $('#cariBynamaOKpasien').hide();

    function showCaripaseinRMOK() {
        $('#cariBynoRMOKpasien').show();
        $('#cariBynamaOKpasien').hide();
        $("#cariBynoRMOKpasien").trigger('focus');
        document.getElementById('cariBynamaOKpasien').value = '';
    }

    function showCaripasienNamaOK() {
        $('#cariBynoRMOKpasien').hide();
        $('#cariBynamaOKpasien').show();
        $("#cariBynamaOKpasien").trigger('focus');
        document.getElementById('cariBynoRMOKpasien').value = '';
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
            document.getElementById('unitJadwalOKpasien').innerHTML = unit;
        });
    }
    $("#cariBynoRMOKpasien").keydown(function(event) {
        switch (event.which) {
            case 13:
                $('#loadingjadwalOK2pasien').show();
                listbookingKamarOK();
                break;
        }
    });

    $("#cariBynamaOKpasien").keydown(function(event) {
        switch (event.which) {
            case 13:
                $('#loadingjadwalOK2pasien').show();
                listbookingKamarOK();
                break;
        }
    });

    $("#unitJadwalOKpasien").change(function(event) {
        $('#loadingjadwalOK2pasien').show();
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

    $("#jadwalOKjumlahpasien").change(function(event) {
        $('#loadingjadwalOK2pasien').show();
        listbookingKamarOK();
    });

    function OKrefrespasien() {
        $('#loadingjadwalOK1pasien').hide();
        $('#loadingjadwalOK2pasien').hide();
    }
    setTimeout(OKrefrespasien, 1000);

    function listbookingKamarOK() {
        $('#loadingjadwalOK2pasien').show();
        var listParam = [
            'cariBynoRMOKpasien', 'cariBynamaOKpasien', 'unitJadwalOKpasien'
        ];

        var param = {
            no_rm: document.getElementById('cariBynoRMOKpasien').value,
            nmpasien: document.getElementById('cariBynamaOKpasien').value,
            unit: document.getElementById('unitJadwalOKpasien').value,
            jml: document.getElementById('jadwalOKjumlahpasien').value,
            tglawal: document.getElementById('tglAwalKunjunganOKpasien').value,
            tglahir: document.getElementById('tglAhirKunjunganOKpasien').value
        };
        apiPOST("Kamaroperasi/listbookingkamarOK", param, hasil => {
            $('#loadingjadwalOK2pasien').hide();
            $('#tabellistpasienbokingOK tbody').html('');

            if (hasil['data'] !== null) {
                if (hasil['code'] == 'XX') {
                    toastr.error("Data tidak ditemukan");
                    var Baris = '';
                    // Baris += '<tr>';
                    // Baris += '<td colspan="8">';
                    // Baris += '<div class="col-md-12 col-sm-6 col-12" style="cursor:not-allowed;"><div class="info-box shadow mb-1 mt-1" style="border: 2px solid; background-color: darksalmon; font-weight: bolder;"><span class="info-box-icon bg-danger"><i class="fa fa-times"></i></span><div class="info-box-content"><span class="info-box-text"><h5 class="info-box-text">Data tidak ditemukan</h5></span></div></div></div>';
                    // Baris += '</td>';
                    // Baris += '</tr>';
                    Baris += "<tr style='cursor: not-allowed;'>";
                    Baris += "<td colspan='8'><h6 class='text-center'>Data tidak ditemukan!!<h6></td>";
                    Baris += "</tr>";

                    $('#tabellistpasienbokingOK tbody').append(Baris);
                    document.getElementById('cariBynoRMOKpasien').value = '';
                    document.getElementById('cariBynamaOKpasien').value = '';

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
                        var produk = a[i].nama_produk;
                        var id_unit = a[i].id_unit;
                        var unit = a[i].nama_unit;
                        var pjpasien = a[i].nama_penanggung_jawab;
                        var nopjpasien = a[i].no_hp_penanggung_jawab;
                        var unit = a[i].nama_unit;
                        var kamarok = a[i].nama_kamar_ok;
                        var id_boking = a[i]['id_boking'];
                        var id_jenis_bedah = a[i]['id_jenis_bedah'];
                        var id_klasifikasi_bedah = a[i]['id_klasifikasi_bedah'];
                        var id_kamar = a[i]['id_kamar'];
                        var tgl_boking = a[i]['tgl_boking'];
                        var tindakan = a[i]['tindakan'];
                        var keterangan = a[i]['keterangan'];
                        var status_boking = a[i]['status_boking'];

                        Baris += '<tr>';
                        Baris += '<td><button class="btn btn-sm bg-warning" onclick="updateListbokingOK(' + "'" + no_rm + "','" + id_transaksi + "','" + id_kunjungan + "','" + nmpasien + "','" + alamat + "','" + umur + "','" + jenkel + "','" + id_dokter + "','" + dokter + "','" + penjamin + "','" + unit + "','" + id_unit + "','" + id_boking + "','" + tindakan + "','" + keterangan + "','" + id_jenis_bedah + "','" + id_kamar + "','" + status_boking + "','" + id_klasifikasi_bedah + "','" + pjpasien + "','" + nopjpasien + "','" + tgl_boking + "','" + id_penjamin + "'" + ');"><i class="fas fa-pencil-alt"></i></td>';
                        Baris += '<td>' + id_kunjungan + '</td>';
                        Baris += '<td>' + nmpasien + '</td>';
                        Baris += '<td>' + no_rm + '</td>';
                        Baris += '<td>' + dokter + '</td>';
                        Baris += '<td>' + kamarok + '</td>';
                        Baris += '<td>' + tgl_boking + '</td>';
                        if (status_boking == 0) {
                            Baris += '<td>Menunggu</td>';
                        }
                        if (status_boking == 1) {
                            Baris += '<td>Proses</td>';
                        }
                        if (status_boking == 2) {
                            Baris += '<td>Selesai</td>';
                        }

                        Baris += '</tr>';
                    }
                    $('#tabellistpasienbokingOK tbody').append(Baris);
                }
            }
        });
    }

    function modalInputJadwalOK() {
        $('#cariKunjunganPasienOK').modal("show");
    }

    function closeModalTambahJadwalOK() {
        $('#cariKunjunganPasienOK').modal("hide");
    }

    function contentmodalInputJadwalOK() {
        $('#list1jadwalOKpasien').hide();
        $('#cariKunjunganPasienOK').modal("hide");
        $('#list2jadwalOKpasien').hide();
        var param = {
            no_rm: document.getElementById('tambahPermintaanOKnew').value
        }
        apiPOST('Kamaroperasi/listkunjunganPasienbaru', param, hasil => {
            if (hasil['data'] !== null) {
                var a = hasil['data'];
                for (var i = 0; i < a.length; i++) {
                    var data = {
                        no_rm: a[i].no_rm,
                        id_transaksi: a[i].id_transaksi,
                    }
                }
                var datax = JSON.stringify(data);
                $('.modalAddJadwalOK').load('Kamaroperasi/modaladdjadwalok?data=' + datax);
            }
        });
    }

    function updateListbokingOK(no_rm, id_transaksi, id_kunjungan, nmpasien, alamat, umur, jenkel, id_dokter, dokter, penjamin, unit, id_unit, id_boking, tindakan, keterangan, id_jenis_bedah, id_kamar, status_boking, id_klasifikasi_bedah, pjpasien, nopjpasien, tgl_boking, id_penjamin) {
        $('#list1jadwalOKpasien').hide();
        $('#list2jadwalOKpasien').hide();
        var data = {
            no_rm: no_rm,
            id_dokter: id_dokter,
            id_transaksi: id_transaksi,
            id_kunjungan: id_kunjungan,
            id_unit: id_unit,
            id_boking: id_boking,
            id_jenis_bedah: id_jenis_bedah,
            id_kamar: id_kamar,
            status_boking: status_boking,
            id_klasifikasi_bedah: id_klasifikasi_bedah,
            id_penjamin: id_penjamin,
            'tgl_boking': tgl_boking.replace(/ /g, '%20'),
            'pjpasien': pjpasien.replace(/ /g, '%20'),
            'nopjpasien': nopjpasien.replace(/ /g, '%20'),
            'namapasien': nmpasien.replace(/ /g, '%20'),
            'alamat': alamat.replace(/ /g, '%20'),
            'umur': umur.replace(/ /g, '%20'),
            'jenkel': jenkel.replace(/ /g, '%20'),
            'dokter': dokter.replace(/ /g, '%20'),
            'penjamin': penjamin.replace(/ /g, '%20'),
            'unit': unit.replace(/ /g, '%20'),
            'tindakan': tindakan.replace(/ /g, '%20'),
            'keterangan': keterangan.replace(/ /g, '%20')
        }
        // console.log(data)
        var datax = JSON.stringify(data);
        $('.modalListBookingOK').load('Kamaroperasi/modalListjadwalok?data=' + datax);
    }
</script>