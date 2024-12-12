<?php
$data = json_decode($_GET['data']);
$id_gudang_unit       = str_replace('"', '', json_encode($data->id_gudang_unit));
$nama_gudang       = str_replace('"', '', json_encode($data->nama_gudang));
$jml_barang       = str_replace('"', '', json_encode($data->jml_barang));
?>
<div class="col-md-12 p-2" id="ModPemakaianLogistik_list1">
    <div class="row p-1">
        <div class="col-md-3 col-sm-6 col-12 p-1">
            <div class="info-box mb-0">
                <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="70">Gudang Unit</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="form-control form-control-xs" id="ModPemakaianLogistik_idgudang" hidden>
                            <input type="text" class="form-control form-control-xs" id="ModPemakaianLogistik_gudangunit" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td width="70">Tgl. Pemakaian</td>
                        <td>:</td>
                        <td><input type="date" class="form-control form-control-xs" id="ModPemakaianLogistik_tglpakai"></td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12 p-1">
            <div class="info-box mb-0">
                <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="70">Jumlah Barang</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="form-control form-control-xs" id="ModPemakaianLogistik_totalbrg" disabled>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12 p-2" id="ModPemakaianLogistik_list2">
    <div class="card card-outline">
        <div class="overlay-wrapper" id="loadingModPemakaianLogistik">
            <div class="overlay">
                <i class="fas fa-3x fa-sync-alt fa-spin"></i>
            </div>
        </div>
        <div class="card-header p-1 darkgrey-custom">
            <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="ModPemakaianLogistikAdd()" id="ModReturnLogistik_btn_tambah_barang"><i class="fa fa-plus"></i> Tambah Barang</button>
            <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="ModPemakaianLogistik_simpan()" id="ModPemakaianLogistik_simpan"><i class="fa fa-save"></i> Simpan</button>
            <div class="btn-group">
                <button type="button" class="btn bg-gradient-secondary btn-xs"><i class="fa fa-print"></i> Cetak</button>
                <button type="button" class="btn bg-gradient-secondary btn-xs dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                    <span class="sr-only"></span>
                </button>
                <div class="dropdown-menu" role="menu">
                    <a class="dropdown-item" href="#"><span><i class="fa fa-print"></i> Cetak</span></a>
                </div>
            </div>
            <button type="button" class="btn btn-outline-danger btn-xs" onclick="ModPemakaianLogistik_kembalikeawal()"><i class="fa fa-arrow-left"></i> Kembali</button>
            <button type="button" class="btn btn-info btn-xs" onclick="ModPemakaianLogistik_refresh()"><i class="fa fa-sync-alt fa-spin"></i> Refresh Data</button>

        </div>
        <div class="card-body p-1" style="max-height: 420px; overflow: auto;">
            <div class="card-body p-0">
                <div class="col-sm-12 p-1" style="max-height: 238px; overflow-x: hidden;">
                    <div class="row mb-1" id="ModPemakaianLogistik_inputPembelian">
                        <div class="input-group col-sm-4">
                            <input type="text" class="form-control form-control-xs" id="ModPemakaianLogistik_urut" disabled hidden>
                            <input type="text" class="form-control form-control-xs" id="ModPemakaianLogistik_idbarang" disabled hidden>
                            <input type="text" class="form-control form-control-xs" id="ModPemakaianLogistik_idaccount" disabled hidden>
                            <input type="text" class="form-control form-control-xs" id="ModPemakaianLogistik_hargabeli" disabled hidden>
                            <input type="text" class="form-control form-control-xs" id="ModPemakaianLogistik_hargapokok" disabled hidden>
                            <div class="input-group-prepend">
                                <span class="input-group-text form-control-xs">Nama Barang</span>
                            </div>
                            <input type="search" class="form-control form-control-xs" id="ModPemakaianLogistik_nmBrg" autocomplete="false" disabled>
                        </div>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text form-control-xs">Stok Unit</span>
                                </div>
                                <input type="number" class="form-control form-control-xs" id="ModPemakaianLogistik_stok" disabled>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text form-control-xs">Pemakaian</span>
                                </div>
                                <input type="number" class="form-control form-control-xs" id="ModPemakaianLogistik_inputpakai" disabled>
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-primary btn-xs" id="ModPemakaianLogistik_cekBrg"><i class="fa fa-check"></i></button>
                                    <button type="button" class="btn btn-outline-primary btn-xs" onclick="ModPemakaianLogistikAdd()"><i class="fa fa-file"></i> Baru</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table border="0" cellpadding="0" cellspacing="0" id="ModPemakaianLogistik_daftarbarang" class="table table-striped table-sm choose">
                        <thead>
                            <tr>
                                <th class="pl-0" width="30" style="text-align:center;">#</th>
                                <th width="10"></th>
                                <th width="20">ID</th>
                                <th class="pl-0" width="100">Nama Barang</th>
                                <th width="70" style="text-align:center;">Stok Unit</th>
                                <th width="70" style="text-align:center;">Pemakaian</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                    <input type="text" value="0" id="ModPemakaianLogistik_hargatotal" name="ModPemakaianLogistik_hargatotal" disabled hidden>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="mod_ListBarangLogistikUnitpakai_content"></div>


<script>
    $('.modpemakaianLogistik_content').show();
    $('#loadingModPemakaianLogistik').hide();


    var id_gudang_unit = '<?= $id_gudang_unit ?>';
    var nama_gudang = '<?= $nama_gudang ?>';
    var jml_barang = '<?= $jml_barang ?>';

    document.getElementById('ModPemakaianLogistik_tglpakai').value = nowday;
    document.getElementById('ModPemakaianLogistik_idgudang').value = id_gudang_unit;
    document.getElementById('ModPemakaianLogistik_gudangunit').value = nama_gudang;
    document.getElementById('ModPemakaianLogistik_totalbrg').value = jml_barang;
    listBarang_ModPemakaianLogistik()

    function ModPemakaianLogistik_pilih(id_barang_logistik, nama_barang, qty_total, id_acc, harga_beli, harga_pokok) {
        keluarmod_ListBarangLogistikUnitpakai_daftarBarang()
        document.getElementById("ModPemakaianLogistik_inputpakai").disabled = false;
        $("#ModPemakaianLogistik_inputpakai").trigger('focus');

        document.getElementById("ModPemakaianLogistik_idbarang").value = id_barang_logistik;
        document.getElementById("ModPemakaianLogistik_nmBrg").value = nama_barang;
        document.getElementById("ModPemakaianLogistik_nmBrg").disabled = true;
        document.getElementById("ModPemakaianLogistik_stok").value = qty_total;
        document.getElementById("ModPemakaianLogistik_idaccount").value = id_acc;
        document.getElementById("ModPemakaianLogistik_hargabeli").value = harga_beli;
        document.getElementById("ModPemakaianLogistik_hargapokok").value = harga_pokok;
    }

    function listBarang_ModPemakaianLogistik() {

        $("#ModPemakaianLogistik_inputpakai").on("keyup", function(event) {
            if (event.keyCode == 13) {
                var kode_brgLogistik = document.getElementById("ModPemakaianLogistik_idbarang").value;
                var nm_brgLogistik = document.getElementById("ModPemakaianLogistik_nmBrg").value;
                var stok = document.getElementById("ModPemakaianLogistik_stok").value;
                var cekpakai = document.getElementById("ModPemakaianLogistik_inputpakai").value;
                var id_acc = document.getElementById("ModPemakaianLogistik_idaccount").value;
                var hrgBeli = document.getElementById("ModPemakaianLogistik_hargabeli").value;
                var hrgPokok = document.getElementById("ModPemakaianLogistik_hargapokok").value;

                if (cekpakai != '') {
                    var pakai = cekpakai;
                } else {
                    var pakai = '0';
                }
                if (kode_brgLogistik != null) {
                    if ((pakai != '0') && (pakai != '')) {
                        if (parseInt(stok) < parseInt(pakai)) {
                            toastr.error("Pemakaian Melebihi Stok Unit!!");
                        } else {
                            tampilkan_pemakaianBarangLogistikUnit(kode_brgLogistik, nm_brgLogistik, stok, pakai, id_acc, hrgBeli, hrgPokok);
                            kosongInputModPemakaianLogistik()
                        }
                    } else {
                        toastr.error("Inputan Masih Kosong!!");
                    }
                } else {
                    toastr.error("Nama barang tidak ditemukan!!");
                    kosongInputModPemakaianLogistik()

                }

            }
        });

        $("#ModPemakaianLogistik_cekBrg").click(function(event) {
            var kode_brgLogistik = document.getElementById("ModPemakaianLogistik_idbarang").value;
            var nm_brgLogistik = document.getElementById("ModPemakaianLogistik_nmBrg").value;
            var stok = document.getElementById("ModPemakaianLogistik_stok").value;
            var cekpakai = document.getElementById("ModPemakaianLogistik_inputpakai").value;
            var id_acc = document.getElementById("ModPemakaianLogistik_idaccount").value;
            var hrgBeli = document.getElementById("ModPemakaianLogistik_hargabeli").value;
            var hrgPokok = document.getElementById("ModPemakaianLogistik_hargapokok").value;

            if (cekpakai != '') {
                var pakai = cekpakai;
            } else {
                var pakai = '0';
            }
            if (kode_brgLogistik != null) {
                if ((pakai != '0') && (pakai != '')) {
                    if (parseInt(stok) < parseInt(pakai)) {
                        toastr.error("Pemakaian Melebihi Stok Unit!!");
                    } else {
                        tampilkan_pemakaianBarangLogistikUnit(kode_brgLogistik, nm_brgLogistik, stok, pakai, id_acc, hrgBeli, hrgPokok);
                        kosongInputModPemakaianLogistik()
                    }
                } else {
                    toastr.error("Inputan Masih Kosong!!");
                }
            } else {
                toastr.error("Nama barang tidak ditemukan!!");
                kosongInputModPemakaianLogistik()

            }
        });

    }

    function kosongInputModPemakaianLogistik() {
        document.getElementById("ModPemakaianLogistik_urut").value = '';
        document.getElementById("ModPemakaianLogistik_inputpakai").disabled = true;
        document.getElementById("ModPemakaianLogistik_idbarang").value = '';
        document.getElementById("ModPemakaianLogistik_inputpakai").value = '';
        document.getElementById("ModPemakaianLogistik_nmBrg").value = '';
        document.getElementById("ModPemakaianLogistik_stok").value = '';
        document.getElementById("ModPemakaianLogistik_idaccount").value = '';
        document.getElementById("ModPemakaianLogistik_hargabeli").value = '';
        document.getElementById("ModPemakaianLogistik_hargapokok").value = '';
    }

    function tampilkan_pemakaianBarangLogistikUnit(kode_brgLogistik, nm_brgLogistik, stok, pakai, id_acc, hrgBeli, hrgPokok) {
        var nomor = $('#ModPemakaianLogistik_daftarbarang tbody tr').length + 1;
        var Baris = '';
        Baris += "<tr>";
        Baris += "<td class='pl-0'>";
        Baris += "<input style='text-align:center;' type='text' class='form-control form-control-xs' name='ModPemakaianLogistik_nourut[]' value='" + nomor + "' disabled>";
        Baris += "</td>";
        Baris += "<td style='display: flex;'><button type='button' class='btn btn-xs btn-danger' onclick='hapusbaris_ModPemakaianLogistik(this, " + nomor + ")' id='hapusbaris_ModPemakaianLogistik" + nomor + "' style='width:100%'><i class='fa fa-times'></i></button><button type='button' class='btn btn-xs btn-outline-warning' onclick='editbaris_ModPemakaianLogistik(this, " + nomor + ")' id='editbaris_ModPemakaianLogistik" + nomor + "' style='width:100%'><i class='fa fa-edit'></i></button></td>";
        Baris += "<td hidden>";
        Baris += "<input type='text' class='form-control form-control-xs' name='ModPemakaianLogistik_id_acc[]' value='" + id_acc + "'>";
        Baris += "</td>";
        Baris += "<td hidden>";
        Baris += "<input type='text' class='form-control form-control-xs' name='ModPemakaianLogistik_hrgBeli[]' value='" + hrgBeli + "'>";
        Baris += "</td>";
        Baris += "<td hidden>";
        Baris += "<input type='text' class='form-control form-control-xs' name='ModPemakaianLogistik_hrgPokok[]' value='" + hrgPokok + "'>";
        Baris += "</td>";
        Baris += "<td>";
        Baris += "<input type='text' class='form-control form-control-xs' name='ModPemakaianLogistik_kodeBrg[]' value='" + kode_brgLogistik + "' disabled>";
        Baris += "</td>";
        Baris += "<td>";
        Baris += "<input type='text' class='form-control form-control-xs' name='ModPemakaianLogistik_nmBrg[]' value='" + nm_brgLogistik + "' disabled>";
        Baris += "</td>";
        Baris += "<td>";
        Baris += "<input type='text' class='form-control form-control-xs' name='ModPemakaianLogistik_stok[]' value='" + stok + "' disabled>";
        Baris += "</td>";
        Baris += "<td>";
        Baris += "<input type='text' class='form-control form-control-xs' name='ModPemakaianLogistik_pakai[]' value='" + pakai + "' disabled>";
        Baris += "</td>";
        Baris += "<td style='display:none;'>";
        Baris += "</td>";
        Baris += "</tr>";

        var getKodeBrg = document.getElementsByName('ModPemakaianLogistik_kodeBrg[]');
        var jmlBrgLogistik = $('#ModPemakaianLogistik_daftarbarang tbody tr').length;
        let total = 0;
        const data = [];

        for (var i = 0, iLen = jmlBrgLogistik; i < iLen; i++) {
            //PROSES ARRAY PENGECEKAN
            var datax = {};
            datax.kode_brgLogistik = getKodeBrg[i].value;
            data.push(datax);
        }

        const cekkd_BrgLog = data.map(el => el.kode_brgLogistik); // returns ['00007414', '00000019', '00000017']
        const status_kd_BrgLogistik = cekkd_BrgLog.includes(kode_brgLogistik); // returns true

        if (status_kd_BrgLogistik == false) {
            $('#ModPemakaianLogistik_daftarbarang tbody').append(Baris);
            var totalx = document.getElementById("ModPemakaianLogistik_hargatotal").value;
            total = parseInt(totalx) + (parseInt(pakai) * parseInt(hrgBeli));
            document.getElementById("ModPemakaianLogistik_hargatotal").value = total;

        } else {
            var urut = document.getElementById("ModPemakaianLogistik_urut").value;
            if (urut != '') {
                $('#ModPemakaianLogistik_daftarbarang tbody').append(Baris);
                var totalx = document.getElementById("ModPemakaianLogistik_hargatotal").value;
                total = parseInt(totalx) + (parseInt(pakai) * parseInt(hrgBeli));
                document.getElementById("ModPemakaianLogistik_hargatotal").value = total;

                var hapusrow = document.getElementById("hapusbaris_ModPemakaianLogistik" + urut);
                hapusrow.click();

            } else {
                toastr.error("Barang Sudah Diinputkan!!");
            }

        }
    }

    function editbaris_ModPemakaianLogistik(btn, nomor) {
        var id_account = document.getElementById("ModPemakaianLogistik_daftarbarang").rows[nomor].cells[2].firstChild.value;
        var harga_Beli = document.getElementById("ModPemakaianLogistik_daftarbarang").rows[nomor].cells[3].firstChild.value;
        var harga_Pokok = document.getElementById("ModPemakaianLogistik_daftarbarang").rows[nomor].cells[4].firstChild.value;
        var kode_brgLogistik = document.getElementById("ModPemakaianLogistik_daftarbarang").rows[nomor].cells[5].firstChild.value;
        var nm_brgLogistik = document.getElementById("ModPemakaianLogistik_daftarbarang").rows[nomor].cells[6].firstChild.value;
        var stok = document.getElementById("ModPemakaianLogistik_daftarbarang").rows[nomor].cells[7].firstChild.value;
        var pakai = document.getElementById("ModPemakaianLogistik_daftarbarang").rows[nomor].cells[8].firstChild.value;

        document.getElementById("ModPemakaianLogistik_inputpakai").disabled = false;
        $("#ModPemakaianLogistik_inputpakai").trigger('focus');

        document.getElementById("ModPemakaianLogistik_urut").value = nomor;
        document.getElementById("ModPemakaianLogistik_idbarang").value = kode_brgLogistik;
        document.getElementById("ModPemakaianLogistik_inputpakai").value = pakai;
        document.getElementById("ModPemakaianLogistik_nmBrg").value = nm_brgLogistik;
        document.getElementById("ModPemakaianLogistik_stok").value = stok;
        document.getElementById("ModPemakaianLogistik_idaccount").value = id_account;
        document.getElementById("ModPemakaianLogistik_hargabeli").value = harga_Beli;
        document.getElementById("ModPemakaianLogistik_hargapokok").value = harga_Pokok;
    }

    function hapusbaris_ModPemakaianLogistik(btn, nomor) {
        document.getElementById("ModPemakaianLogistik_urut").value = '';
        var row = btn.parentNode.parentNode;
        var harga_Beli = document.getElementById("ModPemakaianLogistik_daftarbarang").rows[nomor].cells[3].firstChild.value;
        var pakai = document.getElementById("ModPemakaianLogistik_daftarbarang").rows[nomor].cells[8].firstChild.value;

        var totalx = document.getElementById("ModPemakaianLogistik_hargatotal").value;
        total = parseInt(totalx) - (parseInt(pakai) * parseInt(harga_Beli));
        document.getElementById("ModPemakaianLogistik_hargatotal").value = total;

        row.parentNode.removeChild(row);
        var no = 1;
        $('#ModPemakaianLogistik_daftarbarang tbody tr').each(function() {
            $(this).find('td:nth-child(1)').html("<input style='text-align:center;' type='text' class='form-control form-control-xs' name='ModPemakaianLogistik_nourut[]' value='" + no + "' disabled>");
            $(this).find('td:nth-child(2)').html("<button type='button' class='btn btn-xs btn-danger' onclick='hapusbaris_ModPemakaianLogistik(this, " + no + ")' id='hapusbaris_ModPemakaianLogistik" + no + "' style='width:100%'><i class='fa fa-times'></i></button><button type='button' class='btn btn-xs btn-outline-warning' onclick='editbaris_ModPemakaianLogistik(this, " + no + ")' id='editbaris_ModPemakaianLogistik" + no + "' style='width:100%'><i class='fa fa-edit'></i></button>");
            no++;
        });

    }

    function params_ModPemakaianLogistik() {
        var getKode_brg = document.getElementsByName('ModPemakaianLogistik_kodeBrg[]');
        var get_pakai = document.getElementsByName('ModPemakaianLogistik_pakai[]');
        var geturut = document.getElementsByName('ModPemakaianLogistik_nourut[]');
        var getidacc = document.getElementsByName('ModPemakaianLogistik_id_acc[]');
        var gethargabeli = document.getElementsByName('ModPemakaianLogistik_hrgBeli[]');
        var gethargapokok = document.getElementsByName('ModPemakaianLogistik_hrgPokok[]');
        var count = $('#ModPemakaianLogistik_daftarbarang tbody tr').length;

        var params = {};
        params.data = [];
        for (var i = 0, iLen = count; i < iLen; i++) {
            var x = {};
            x.kd_brg = getKode_brg[i].value;
            x.pakai = get_pakai[i].value;
            x.idacc = getidacc[i].value;
            x.hargabeli = gethargabeli[i].value;
            x.hargapokok = gethargapokok[i].value;
            if (typeof(geturut[i].value) !== 'undefined') {
                x.urut = geturut[i].value;
            } else {
                x.urut = "";
            }

            params.data.push(x);
        }
        return params.data;
    }

    function ModPemakaianLogistik_simpan() {
        a = $('#ModPemakaianLogistik_daftarbarang tbody tr').length;
        $('#loadingModPemakaianLogistik').show();
        var param = {
            id_gudang: document.getElementById("ModPemakaianLogistik_idgudang").value,
            tgl_pakai: document.getElementById("ModPemakaianLogistik_tglpakai").value,
            hargatotal: document.getElementById("ModPemakaianLogistik_hargatotal").value,
            id_peg: user['id_pegawai'],
            data: params_ModPemakaianLogistik(),
            count: params_ModPemakaianLogistik().length,
        };
        if (a == 0) {
            $('#loadingModPemakaianLogistik').hide();
            toastr.error("Tambah Barang Dulu");
            ModPemakaianLogistikAdd()

        } else {
            apiPOST('Logistik/SimpanPemakaianLogistik', param, hasil => {
                if (hasil != null) {
                    $('#loadingModPemakaianLogistik').hide();
                    ModPemakaianLogistik_kembalikeawal()
                }
            });
        }
    }

    function ModPemakaianLogistik_refresh() {
        sessionStorage.clear();
        $('#ModPemakaianLogistik_daftarbarang tbody').html('');
        kosongInputModPemakaianLogistik()
    }

    function ModPemakaianLogistik_kembalikeawal() {
        tampilpemakaianLogistik();
        $('.modpemakaianLogistik_content').hide();
        $('#pemakaianLogistik_list1').show();
        $('#pemakaianLogistik_list2').show();
    }

    function ModPemakaianLogistikAdd() {
        var data = {
            id_gudang_unit: id_gudang_unit
        }
        var datax = JSON.stringify(data);
        $('.mod_ListBarangLogistikUnitpakai_content').load('Logistik/mod_ListBarangLogistikUnitpakai?data=' + datax);
    }
</script>