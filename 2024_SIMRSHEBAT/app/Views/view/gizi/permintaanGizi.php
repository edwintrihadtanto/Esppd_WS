<?php
$nowday       = date('Y-m-d');
$nextday    = date('Y-m-d');
$thisday     = date('Y-m-d', strtotime('-1 days', strtotime($nextday)));
?>
<div class="col-md-12 p-2" id="pengirimanGizilist1">
    <div class="card card-outline card-default mb-0">
        <div class="overlay-wrapper" id="permintaanGiziLoading1">
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
                                    <li class="dropdown-item" onclick="showCariNoRMGizi()">No. RekamMedik</a></li>
                                    <li class="dropdown-item" onclick="showCariNamaGizi()">Nama Pasien</a></li>
                                </ul>
                            </div>
                            <!-- /btn-group -->
                            <input type="number" class="form-control form-control-xs" placeholder="Entry No. RM" id="cariBynoRMGizi">
                            <input type="text" class="form-control form-control-xs" placeholder="Entry Nama Pasien" id="cariBynamaGizi">
                        </div>
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label>Unit :</label>
                        <select class="form-control form-control-xs" id="pengirimanGizi_unit"></select>
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <div class="input-group">
                            <label for="permintaanGizitglorder">Tgl. Permintaan :</label>
                            <div class="custom-control custom-checkbox ">
                                <input name="permintaanGiziTglordercek" type="checkbox" class="custom-control-input" id="permintaanGiziTglordercek" onclick="permintaanGizidaftarorder()" checked>
                                <label class="custom-control-label" for="permintaanGiziTglordercek"></label>
                            </div>
                        </div>
                        <input type="date" class="form-control form-control-xs" id="permintaanGizitglorder" name="permintaanGizitglorder">
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="permintaanGizitglorderahir">S/d :</label>
                        <input type="date" class="form-control form-control-xs" id="permintaanGizitglorderahir" name="permintaanGizitglorderahir">
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label>Jumlah Pasien :</label>
                        <select class="form-control form-control-xs" id="permintaanGizi_Jumlah">
                            <option value="10">10 Pasien</option>
                            <option value="15">15 Pasien</option>
                            <option value="25">25 Pasien</option>
                            <option value="50">50 Pasien</option>
                            <option value="">Semua Pasien</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <!-- card-outline -->


        <div class="col-md-12 p-2" id="permintaanGizilist2">
            <div class="card card-outline" style="padding: 0px; max-height: 410px;">
                <div class="overlay-wrapper" id="permintaanGiziLoadingawal">
                    <div class="overlay">
                        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                    </div>
                </div>
                <div class="card-header p-1">
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="hr6-custom"><i class="fas fa-hospital-alt"></i> List Permintaan Gizi</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn bg-gradient-dark btn-xs" onclick="tambahpermintaanmakanan()"><i class="fas fa-plus"></i> Permintaan Makanan</button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-1" style="max-height: 410px; overflow: auto;">
                    <table id="permintaanGizidaftarorder" class="table table-striped table-sm choose" style="border-collapse: inherit;">
                        <thead>
                            <tr>
                                <th width="20">No</th>
                                <th width="70">Act</th>
                                <th>ID Order</th>
                                <th>No RM</th>
                                <th>Nama Pasien</th>
                                <th>Ruangan</th>
                                <th>Kelas</th>
                                <th>Tanggal Order</th>
                                <th>Diet</th>
                                <th>Status Kirim</th>
                                <th>Status Terima</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="pengirimanGizi_content"></div>
<div class="pengirimanGizi_baru"></div>
<div class="permintaanGizibaru"></div>
<div class="penerimaanGizimodalPreview"></div>

<script type="text/javascript">
    var nowday = "<?php echo $nowday; ?>";
    var thisday = "<?php echo $thisday; ?>";
    var nextday = "<?php echo $nextday; ?>";
    document.getElementById('permintaanGizitglorder').value = thisday;
    document.getElementById('permintaanGizitglorderahir').value = nextday;
    $("#btnTambahPermintaanbaru").hide();
    $("#addtglkunjungan").hide();
    $("#formtambah").hide();

    permintaanGizidaftarorder();

    $('#cariBynoRMGizi').show();
    $('#cariBynamaGizi').hide();

    function TambahOrderGiziBaru() {
        $('#searchPasienGizi').modal("show");
    }

    function closeModalTambahOrder() {
        $('#searchPasienGizi').modal("hide");
    }
    $("#cariBynoRMGizi").keydown(function(event) {
        switch (event.which) {
            case 13:
                $('#permintaanGiziLoadingawal').show();
                permintaanGizidaftarorder();
                break;
        }
    });

    $("#cariBynamaGizi").keydown(function(event) {
        switch (event.which) {
            case 13:
                $('#permintaanGiziLoadingawal').show();
                permintaanGizidaftarorder();
                break;
        }
    });

    $("#permintaanGizi_Jumlah").change(function(event) {
        $('#permintaanGiziLoadingawal').show();
        permintaanGizidaftarorder();
    });

    permintaanGiziUnit();

    function permintaanGiziUnit() {
        apiPOST('Gizi/unit', null, hasil => {
            var data = hasil['data'];
            var unit = '';
            unit += '<option value="">Semua Unit</option>';
            for (var i = 0; i < data.length; i++) {
                unit += '<option value="' + data[i]['id_unit'] + '">' + data[i]['nama_unit'] + '</option>';
            }
            document.getElementById('pengirimanGizi_unit').innerHTML = unit;
        });
    }

    function showCariNoRMGizi() {
        $('#cariBynoRMGizi').show();
        $('#cariBynamaGizi').hide();
        $("#cariBynoRMGizi").trigger('focus');
        document.getElementById('cariBynamaGizi').value = '';
    }

    function showCariNamaGizi() {
        $('#cariBynoRMGizi').hide();
        $('#cariBynamaGizi').show();
        $("#cariBynamaGizi").trigger('focus');
        document.getElementById('cariBynoRMGizi').value = '';
    }

    $("#pengirimanGizi_unit").change(function(event) {
        $('#permintaanGiziLoadingawal').show();
        permintaanGizidaftarorder();
    });

    $("#permintaanGizitglorder").change(function(event) {
        permintaanGizidaftarorder();
    });
    $("#permintaanGizitglorderahir").change(function(event) {
        permintaanGizidaftarorder();
    });

    function permintaanGizidaftarorder() {
        $('#permintaanGiziLoadingawal').show();
        var checkBox = document.getElementById("permintaanGiziTglordercek");
        if (checkBox.checked == true) {
            document.getElementById('permintaanGizitglorder').disabled = false;
            document.getElementById('permintaanGizitglorderahir').disabled = false;
        } else {
            document.getElementById('permintaanGizitglorder').disabled = true;
            document.getElementById('permintaanGizitglorderahir').disabled = true;
        }
        var listParam = [
            'cariBynoRMGizi', 'cariBynamaGizi', 'pengirimanGizi_unit'
        ];

        var param = {
            checkedtgl: checkBox.checked,
            tglorder: document.getElementById('permintaanGizitglorder').value,
            tglorderahir: document.getElementById('permintaanGizitglorderahir').value,
            no_rm: document.getElementById('cariBynoRMGizi').value,
            nmpasien: document.getElementById('cariBynamaGizi').value,
            unit: document.getElementById('pengirimanGizi_unit').value,
            jml: document.getElementById('permintaanGizi_Jumlah').value,
            // ruang: user.id_ruang,
        };
        // console.log(param)
        apiPOST("Gizi/permintaanGizi_listorder", param, hasil => {
            $('#permintaanGiziLoading1').hide();
            $('#permintaanGiziLoadingawal').hide();
            $('#permintaanGizidaftarorder tbody').html('');

            if (hasil['code'] == 'XX') {
                toastr.error("Data tidak ditemukan");
                var Baris = '';
                Baris += "<tr style='cursor: not-allowed;'>";
                Baris += "<td colspan='11'><h6 class='text-center'>Data tidak ditemukan!!<h6></td>";
                Baris += "</tr>";

                $('#permintaanGizidaftarorder tbody').append(Baris);
                document.getElementById('cariBynoRMGizi').value = '';
                document.getElementById('cariBynamaGizi').value = '';

            } else {
                var Baris = "";
                var a = hasil['data'];
                for (var i = 0; i < a.length; i++) {
                    var no_rm = a[i].no_rm;
                    var nmpasien = a[i].nama;
                    var umur = a[i].umur;
                    var unit = a[i].nama_unit;
                    var id_unit = a[i].id_unit;
                    var id_kunj = a[i].id_kunjungan;
                    var id_dokter = a[i].id_pegawai;
                    var dokter = a[i].nama_pegawai;
                    var id_order = a[i].id_order;
                    var dilayani = a[i].dilayani;
                    var status_order = a[i].status_order;
                    var kd_makanan = a[i].kd_makanan;
                    var petugas_gizi = a[i].petugas_gizi;
                    var tglordermakan = a[i].tglorder;
                    var jam_order = a[i].jam_order;
                    var nama_ruang = a[i].nama_ruang;
                    var ket_lain_lain = a[i].ket_lain_lain;
                    var jenis_makanan = a[i].jenis_makanan;
                    var ket_diet = a[i].ket_diet;

                    var no = i + 1;

                    Baris += '<tr>';
                    Baris += '<td>' + no + '</td>';
                    Baris += '<td style="display: flex;">';
                    Baris += '<button type="button" style="width:50%" class="btn btn-xs btn-warning" title="Tampilkan" onclick="UpdatelistPermintaanGizi(' + "'" + no_rm + "','" + nmpasien + "','" + umur + "','" + id_unit + "','" + id_dokter + "','" + dokter + "','" + id_kunj + "','" + id_order + "','" + status_order + "','" + ket_lain_lain + "','" + petugas_gizi + "','" + kd_makanan + "'" + ')"><i class="fas fa-pencil-alt"></i></button>';
                    Baris += '<button type="button" style="width:50%" class="btn btn-xs btn-danger" title="Tampilkan" onclick="hapusPermintaanGizi(' + "'" + id_order + "'" + ')"><i class="fas fa-trash"></i></button>';
                    Baris += '</td>';
                    Baris += '<td>' + id_order + '</td>';
                    Baris += '<td>' + no_rm + '</td>';
                    Baris += '<td>' + nmpasien + '</td>';
                    Baris += '<td>' + nama_ruang + '</td>';
                    Baris += '<td>' + unit + '</td>';
                    Baris += '<td>' + tglordermakan + '/' + jam_order + '</td>';
                    Baris += '<td>' + jenis_makanan + ' / ' + ket_diet + '</td>';
                    if (status_order == 't') {
                        Baris += '<td>Terkirim</td>';
                    } else {
                        Baris += '<td>Belum Kirim</td>';
                    }
                    if (dilayani == 0) {
                        Baris += '<td>Menunggu</td>';
                    } else {
                        Baris += '<td>Diterima</td>';
                    }
                    Baris += '</tr>';
                }
                $('#permintaanGizidaftarorder tbody').append(Baris);
            }
        });
    }

    function UpdatelistPermintaanGizi(no_rm, nmpasien, umur, id_unit, id_dokter, dokter, id_kunj, id_order, status_order, ket_lain_lain, petugas_gizi, kd_makanan) {
        $('#pengirimanGizilist1').hide();
        $('#permintaanGizilist2').hide();
        var data = {
            no_rm: no_rm,
            id_dokter: id_dokter,
            id_kunj: id_kunj,
            id_order: id_order,
            status_order: status_order,
            kd_makanan: kd_makanan,
            petugas_gizi: petugas_gizi,
            'nmpasien': nmpasien.replace(/ /g, '%20'),
            'ket_lain_lain': ket_lain_lain.replace(/ /g, '%20'),
            'dokterPasienGizi': dokter.replace(/ /g, '%20'),
            'umurPasienGizi': umur.replace(/ /g, '%20'),
            'idunitPasienGizi': id_unit,
        }
        // console.log(data);
        var myJSON = JSON.stringify(data);
        $('.pengirimanGizi_content').load('Gizi/modalpermintaangizi?data=' + myJSON);
    }

    function tambahpermintaanmakanan() {
        $('.permintaanGizibaru').load('Gizi/modalpermintaangizibaru');
    }

    function hapusPermintaanGizi(id_order) {
        if (id_order !== null) {
            pertanyaan.fire({
                title: 'Hapus Order Gizi',
                html: '<span>Data Akan Dihapus, Yakin ?</span>',
                icon: 'question',
                showCancelButton: true,
                reverseButtons: false,
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    hapuslistPermintaanGizi(id_order);
                } else if (result.dismiss === Swal.DismissReason.cancel) {

                }
            });
        } else {
            toastr.error('Gagal Hapus Data')
        }
    }

    function hapuslistPermintaanGizi(id_order) {
        var param = {
            id_order: id_order
        }
        apiPOST('Gizi/hapusordergizi', param, hasil => {
            if (hasil['code'] == "200") {
                permintaanGizidaftarorder();
            } else {
                toastr.error('Gagal Hapus Order');
                permintaanGizidaftarorder();
            }
        });
    }
</script>