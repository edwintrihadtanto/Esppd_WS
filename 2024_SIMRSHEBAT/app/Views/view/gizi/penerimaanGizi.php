<?php
$nowday     = date('Y-m-d');
$nextday    = date('Y-m-d');
$thisday    = date('Y-m-d', strtotime('-1 days', strtotime($nextday)));
?>
<div class="col-md-12 p-2" id="penerimaanGizilist1">
    <div class="card card-outline card-default mb-0">
        <div class="overlay-wrapper" id="penerimaanGiziLoading1">
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
                                    <li class="dropdown-item" onclick="showCariNoRMGizix()">No. RekamMedik</a></li>
                                    <li class="dropdown-item" onclick="showCariNamaGizix()">Nama Pasien</a></li>
                                </ul>
                            </div>
                            <!-- /btn-group -->
                            <input type="number" class="form-control form-control-xs" placeholder="Entry No. RM" id="cariNoRMpenerimaGizi">
                            <input type="text" class="form-control form-control-xs" placeholder="Entry Nama Pasien" id="cariNamaPenerimaGizi">
                        </div>
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label>Unit :</label>
                        <select class="form-control form-control-xs" id="penerimaanGiziUnit"></select>
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <div class="input-group">
                            <label for="penerimaanGizitglorder">Tgl. Permintaan :</label>
                            <div class="custom-control custom-checkbox ">
                                <input name="penerimaanGiziTglordercek" type="checkbox" class="custom-control-input" id="penerimaanGiziTglordercek" onclick="penerimaanGiziDaftarOrder()" checked>
                                <label class="custom-control-label" for="penerimaanGiziTglordercek"></label>
                            </div>
                        </div>
                        <input type="date" class="form-control form-control-xs" id="penerimaanGizitglorder" name="penerimaanGizitglorder">
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="penerimaanGizitglorderahir">S/d :</label>
                        <input type="date" class="form-control form-control-xs" id="penerimaanGizitglorderahir" name="penerimaanGizitglorderahir">
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label>Status Terima :</label>
                        <select class="form-control form-control-xs" id="statusterimaGizi">
                            <option value="">Semua</option>
                            <option value="1">Diterima</option>
                            <option value="0">Belum diterima</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label>Jumlah Pasien :</label>
                        <select class="form-control form-control-xs" id="penerimaanGizijumlah">
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


        <div class="col-md-12 p-2" id="penerimaanGizilist2">
            <div class="card card-outline" style="padding: 0px; max-height: 410px;">
                <div class="overlay-wrapper" id="penerimaanGiziLoading2">
                    <div class="overlay">
                        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                    </div>
                </div>
                <div class="card-header p-1">
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="hr6-custom"><i class="fas fa-hospital-alt"></i> Daftar Permintaan Gizi</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <select id="pilihwaktucetakLabelGizi" class="form-control form-control-xs">
                                <option value="">--Pilih Waktu--</option>
                                <option value="PAGI">PAGI</option>
                                <option value="SIANG">SIANG</option>
                                <option value="SORE">SORE</option>
                            </select>
                        </div>
                        <div class="col">
                            <button type="button" class="btn bg-gradient-dark btn-xs" id="btnprintsemualabelgizi" onclick="printsemuaLabelGizi();"><i class="fa fa-print"></i> Cetak Label</button>
                            <button type="button" class="btn bg-gradient-info btn-xs" id="btnterimasemuapermintaangizi" onclick="terimaSemuaorderGizi();"><i class="fa fa-save"></i> Terima</button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-1" style="max-height: 410px; overflow: auto;">
                    <table id="penerimaanGiziDaftarOrder" class="table table-striped table-sm choose" style="border-collapse: inherit;">
                        <thead>
                            <tr>
                                <th width="20">No</th>
                                <th width="20" class="text-center">
                                    <div role="columnheader"><input id="checkboxTabelGizi" class="cbox" type="checkbox" aria-checked="false"></div>
                                </th>
                                <th width="70">Act</th>
                                <th>ID Order</th>
                                <th>No RM</th>
                                <th>Nama Pasien</th>
                                <th>Ruangan</th>
                                <th>Kelas</th>
                                <th>Tanggal Order</th>
                                <th>Diet</th>
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

<div class="penerimaanGizimodalcontent"></div>

<script type="text/javascript">
    var nowday = "<?php echo $nowday; ?>";
    var thisday = "<?php echo $thisday; ?>";
    var nextday = "<?php echo $nextday; ?>";
    document.getElementById('penerimaanGizitglorder').value = thisday;
    document.getElementById('penerimaanGizitglorderahir').value = nextday;
    penerimaanGiziDaftarOrder();
    $('#cariNoRMpenerimaGizi').show();
    $('#cariNamaPenerimaGizi').hide();

    $("#cariNoRMpenerimaGizi").keydown(function(event) {
        switch (event.which) {
            case 13:
                $('#penerimaanGiziLoading2').show();
                penerimaanGiziDaftarOrder();
                break;
        }
    });

    $("#cariNamaPenerimaGizi").keydown(function(event) {
        switch (event.which) {
            case 13:
                $('#penerimaanGiziLoading2').show();
                penerimaanGiziDaftarOrder();
                break;
        }
    });

    $("#penerimaanGizijumlah").change(function(event) {
        $('#penerimaanGiziLoading2').show();
        penerimaanGiziDaftarOrder();
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
            document.getElementById('penerimaanGiziUnit').innerHTML = unit;
        });
    }

    function showCariNoRMGizix() {
        $('#cariNoRMpenerimaGizi').show();
        $('#cariNamaPenerimaGizi').hide();
        $("#cariNoRMpenerimaGizi").trigger('focus');
        document.getElementById('cariNamaPenerimaGizi').value = '';
    }

    function showCariNamaGizix() {
        $('#cariNamaPenerimaGizi').show();
        $('#cariNoRMpenerimaGizi').hide();
        $("#cariNamaPenerimaGizi").trigger('focus');
        document.getElementById('cariNoRMpenerimaGizi').value = '';
    }

    $("#penerimaanGiziUnit").change(function(event) {
        $('#penerimaanGiziLoading2').show();
        penerimaanGiziDaftarOrder();
    });
    $("#statusterimaGizi").change(function(event) {
        $('#penerimaanGiziLoading2').show();
        penerimaanGiziDaftarOrder();
    });

    $("#penerimaanGizitglorder").change(function(event) {
        penerimaanGiziDaftarOrder();
    });
    $("#penerimaanGizitglorderahir").change(function(event) {
        penerimaanGiziDaftarOrder();
    });


    function penerimaanGiziDaftarOrder() {
        $('#penerimaanGiziLoading2').show();
        var checkBox = document.getElementById("penerimaanGiziTglordercek");
        if (checkBox.checked == true) {
            document.getElementById('penerimaanGizitglorder').disabled = false;
            document.getElementById('penerimaanGizitglorderahir').disabled = false;
        } else {
            document.getElementById('penerimaanGizitglorder').disabled = true;
            document.getElementById('penerimaanGizitglorderahir').disabled = true;
        }
        var listParam = [
            'cariNoRMpenerimaGizi', 'cariNamaPenerimaGizi', 'penerimaanGiziUnit'
        ];

        var param = {
            checkedtgl: checkBox.checked,
            tglorder: document.getElementById('penerimaanGizitglorder').value,
            tglorderahir: document.getElementById('penerimaanGizitglorderahir').value,
            no_rm: document.getElementById('cariNoRMpenerimaGizi').value,
            nmpasien: document.getElementById('cariNamaPenerimaGizi').value,
            statusGz: document.getElementById('statusterimaGizi').value,
            unit: document.getElementById('penerimaanGiziUnit').value,
            jml: document.getElementById('penerimaanGizijumlah').value
        };
        apiPOST("Gizi/penerimaanGizi_listorder", param, hasil => {
            $('#penerimaanGiziLoading1').hide();
            $('#penerimaanGiziLoading2').hide();
            $('#penerimaanGiziDaftarOrder tbody').html('');

            if (hasil['data'] !== null) {
                if (hasil['code'] == 'XX') {
                    toastr.error("Data tidak ditemukan");
                    var Baris = '';
                    Baris += "<tr style='cursor: not-allowed;'>";
                    Baris += "<td colspan='11'><h6 class='text-center'>Data tidak ditemukan!!<h6></td>";
                    Baris += "</tr>";

                    document.getElementById('cariNoRMpenerimaGizi').value = '';
                    document.getElementById('cariNamaPenerimaGizi').value = '';

                } else {

                    var Baris = '';
                    var jenisdiet = '';
                    var a = hasil['data'];
                    for (var i = 0; i < a.length; i++) {
                        var no_rm = a[i].no_rm;
                        var nmpasien = a[i].nama;
                        var umur = a[i].umur;
                        var unit = a[i].nama_unit;
                        var id_unit = a[i].id_unit;
                        var id_kunj = a[i].id_kunjungan;
                        var tgl_transaksi = a[i].tgl_transaksi;
                        var id_dokter = a[i].id_pegawai;
                        var dokter = a[i].nama_pegawai;
                        var id_order = a[i].id_order;
                        var dilayani = a[i].dilayani;
                        var ket_lain = a[i].ket_lain_lain;
                        var id_ruang = a[i].id_ruang;
                        var id_kamar = a[i].id_kamar;
                        var nama_ruang = a[i].nama_ruang;
                        var nama_kamar = a[i].nama_kamar;
                        var cat_alergi = a[i].cat_alergi;
                        var tgl_diterima = a[i].tgl_diterima;
                        var tglordermakan = a[i].tglorder;
                        var jam_order = a[i].jam_order;
                        var kd_makanan = a[i].kd_makanan;
                        var jenis_makanan = a[i].jenis_makanan;
                        var jenis_diet = a[i]['jenis_diet'];
                        var ket_diet = a[i]['ket_diet'];
                        var petugas_gizi = a[i].petugas_gizi;
                        var ket_lain_lain = a[i].ket_lain_lain;

                        var no = i + 1;
                        Baris += '<tr>';
                        Baris += '<td>' + no + '</td>';
                        Baris += '<td class="text-center"><input onclick="selecteddataPrintGizi()" id="checkboxfieldTableGizi"' + id_order + '"" name="checkboxselectedGizi" data-id-order="' + id_order + '" class="checkboxfieldTableGizi" type="checkbox" aria-checked="false" value="' + id_order + '"></td>';
                        Baris += '<td style="display: flex;">';
                        Baris += '<button type="button" style="width:50%" class="btn btn-xs btn-warning" title="Tampilkan" onclick="UpdatePenerimaanGizi(' + "'" + no_rm + "','" + nmpasien + "','" + umur + "','" + id_unit + "','" + id_dokter + "','" + dokter + "','" + id_kunj + "','" + id_order + "','" + ket_lain + "','" + tgl_diterima + "','" + dilayani + "','" + id_ruang + "','" + id_kamar + "','" + kd_makanan + "','" + petugas_gizi + "'" + ')"><i class="fas fa-pencil-alt"></i></button>';
                        Baris += '<button type="button" style="width:50%" class="btn btn-xs btn-danger" title="Tampilkan" onclick="hapusPenerimaanGizi(' + "'" + id_order + "'" + ')"><i class="fas fa-trash"></i></button>';
                        Baris += '</td>';
                        Baris += '<td>' + id_order + '</td>';
                        Baris += '<td>' + no_rm + '</td>';
                        Baris += '<td>' + nmpasien + '</td>';
                        Baris += '<td>' + nama_ruang + '</td>';
                        Baris += '<td>' + unit + '</td>';
                        Baris += '<td>' + tglordermakan + '/' + jam_order + '</td>';
                        if (ket_diet == null) {
                            ket_diet1 = "";
                        } else {
                            ket_diet1 = ket_diet;
                        }
                        Baris += '<td>' + jenis_makanan + ' / ' + ket_diet1 + '</td>';
                        // console.log(tes());

                        if (dilayani == 0) {
                            Baris += '<td>Menunggu</td>';
                        } else {
                            Baris += '<td>Diterima / ' + tgl_diterima + '</td>';
                        }
                        Baris += '</tr>';
                    }
                }
                $('#penerimaanGiziDaftarOrder tbody').append(Baris);
            }
        });
    }

    function UpdatePenerimaanGizi(no_rm, nmpasien, umur, id_unit, id_dokter, dokter, id_kunj, id_order, ket_lain, tgl_diterima, dilayani, id_ruang, id_kamar, kd_makanan, petugas_gizi) {

        $('#penerimaanGizilist1').hide();
        $('#penerimaanGizilist2').hide();
        var data = {
            no_rm: no_rm,
            nmpasien: nmpasien.replace(/ /g, '%20'),
            id_dokter: id_dokter,
            id_kunj: id_kunj,
            id_order: id_order,
            tgl_diterima: tgl_diterima,
            dilayani: dilayani,
            id_ruang: id_ruang,
            id_kamar: id_kamar,
            petugas_gizi: petugas_gizi,
            kd_makanan: kd_makanan,
            'ketLain': ket_lain.replace(/ /g, '%20'),
            'dokterPasienGizi': dokter.replace(/ /g, '%20'),
            'umurPasienGizi': umur.replace(/ /g, '%20'),
            'idunitPasienGizi': id_unit,
            'tgl_diterima': tgl_diterima.replace(/ /g, '%20')
        }

        var myJSON = JSON.stringify(data);
        $('.penerimaanGizimodalcontent').load('Gizi/modalpenerimaangizi?data=' + myJSON);
        if (dilayani != 0) {
            toastr.success('Permintaan Sudah Diterima!!');
        } else {
            toastr.error('Permintaan Belum Diterima!!');
        }
    }

    $('#checkboxTabelGizi').on('click', function(e) {
        if ($(this).is(':checked', true)) {
            $(".checkboxfieldTableGizi").prop('checked', true);
            selecteddataPrintGizi()
        } else {
            $(".checkboxfieldTableGizi").prop('checked', false);
        }
    })

    function selecteddataPrintGizi() {
        var cekidordergizi = [];
        $(".checkboxfieldTableGizi:checked").each(function() {
            cekidordergizi.push($(this).data('id-order'));
        });
        var selected_values = cekidordergizi.join(",");
    }

    function printsemuaLabelGizi() {
        var cekidordergizi = [];
        $(".checkboxfieldTableGizi:checked").each(function() {
            cekidordergizi.push($(this).data('id-order'));
        });
        var selectedgz = cekidordergizi.join(",");
        var waktu = document.getElementById('pilihwaktucetakLabelGizi').value;
        if (waktu == '') {
            toastr.error('Pilih Waktu Terima!');
            $("#pilihwaktucetakLabelGizi").trigger('focus');
        } else if (cekidordergizi.length <= 0) {
            toastr.error('Tidak ada data yang dipilih!');
        } else {
            var param = {
                waktu: waktu,
                selectedgz: selectedgz,
            };
            newTabPOST('API/Gizi/cetaksemualabelgizi', param);
            return;
        }
    }

    function terimaSemuaorderGizi() {
        var cekidordergizi = [];
        $(".checkboxfieldTableGizi:checked").each(function() {
            cekidordergizi.push($(this).data('id-order'));
        });
        var selectedgz = cekidordergizi.join(",");
        // console.log(selectedgz)

        if (cekidordergizi.length <= 0) {
            toastr.error('Tidak ada data yang dipilih!');
        } else {
            var param = {
                selectedgz: selectedgz,
            }
            apiPOST('Gizi/terimasemuaorder', param, hasil => {
                if (hasil['status'] == "sukses") {
                    penerimaanGiziDaftarOrder();
                }
            })
        }
    }

    function hapusPenerimaanGizi(id_order) {
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
                    hapusListpenerimaanGizi(id_order);
                } else if (result.dismiss === Swal.DismissReason.cancel) {

                }
            });
        } else {
            toastr.error('Gagal Hapus Data')
        }
    }

    function hapusListpenerimaanGizi(id_order) {
        var param = {
            id_order: id_order
        }
        apiPOST('Gizi/hapusordergizi', param, hasil => {
            if (hasil['code'] == "200") {
                penerimaanGiziDaftarOrder();
            } else {
                toastr.error('Gagal Hapus Order');
                penerimaanGiziDaftarOrder();
            }
        });
    }
</script>