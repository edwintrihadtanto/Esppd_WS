<div class="col-md-12 p-2" id="ModReturnLogistik_list1">
    <div class="row p-1">
        <div class="col-md-3 col-sm-6 col-12 p-1">
            <div class="info-box mb-0">
                <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="70">Gudang Unit</td>
                        <td>:</td>
                        <td>
                            <select type="text" class="form-control form-control-xs" id="ModReturnLogistik_idgudang" disabled></select>
                            <!-- <input type="text" class="form-control form-control-xs" id="ModReturnLogistik_gudangunit" disabled> -->
                        </td>
                    </tr>
                    <tr>
                        <td width="70">Tgl. Return</td>
                        <td>:</td>
                        <td><input type="date" class="form-control form-control-xs" id="ModReturnLogistik_tglreturnbrg"></td>
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
                            <input type="text" class="form-control form-control-xs" id="ModReturnLogistik_totalbrg" disabled>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12 p-1">
            <div class="info-box mb-0">
                <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="70">Keterangan</td>
                        <td>:</td>
                        <td>
                            <textarea class="form-control form-control-sm" id="ModReturnLogistik_ket" name="ModReturnLogistik_ket" style="height:50px;"></textarea>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12 p-2" id="ModReturnLogistik_list2">
    <div class="card card-outline">
        <div class="overlay-wrapper" id="loadingModReturnLogistik">
            <div class="overlay">
                <i class="fas fa-3x fa-sync-alt fa-spin"></i>
            </div>
        </div>
        <div class="card-header p-1 darkgrey-custom">
            <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="ModReturnLogistikAdd()" id="ModReturnLogistik_btn_tambah_barang"><i class="fa fa-plus"></i> Tambah Barang</button>
            <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="ModReturnLogistik_simpan()" id="ModReturnLogistik_simpan"><i class="fa fa-save"></i> Simpan</button>
            <div class="btn-group">
                <button type="button" class="btn bg-gradient-secondary btn-xs"><i class="fa fa-print"></i> Cetak</button>
                <button type="button" class="btn bg-gradient-secondary btn-xs dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                    <span class="sr-only"></span>
                </button>
                <div class="dropdown-menu" role="menu">
                    <a class="dropdown-item" href="#"><span><i class="fa fa-print"></i> Cetak</span></a>
                </div>
            </div>
            <button type="button" class="btn btn-outline-danger btn-xs" onclick="ModReturnLogistik_kembalikeawal()"><i class="fa fa-arrow-left"></i> Kembali</button>
            <button type="button" class="btn btn-info btn-xs" onclick="ModReturnLogistik_refresh()"><i class="fa fa-sync-alt fa-spin"></i> Refresh Data</button>

        </div>
        <div class="card-body p-1" style="max-height: 420px; overflow: auto;">
            <div class="card-body p-0">
                <div class="col-sm-12 p-1" style="max-height: 238px; overflow-x: hidden;">
                    <div class="row mb-1" id="ModReturnLogistik_inputPembelian">
                        <div class="input-group col-sm-4">
                            <input type="text" class="form-control form-control-xs" id="ModReturnLogistik_urut" disabled hidden>
                            <input type="text" class="form-control form-control-xs" id="ModReturnLogistik_idbarang" disabled hidden>
                            <input type="text" class="form-control form-control-xs" id="ModReturnLogistik_idaccount" disabled hidden>
                            <input type="text" class="form-control form-control-xs" id="ModReturnLogistik_hargabeli" disabled hidden>
                            <input type="text" class="form-control form-control-xs" id="ModReturnLogistik_hargapokok" disabled hidden>
                            <div class="input-group-prepend">
                                <span class="input-group-text form-control-xs">Nama Barang</span>
                            </div>
                            <input type="search" class="form-control form-control-xs" id="ModReturnLogistik_nmBrg" autocomplete="false" disabled>
                        </div>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text form-control-xs">Stok Unit</span>
                                </div>
                                <input type="number" class="form-control form-control-xs" id="ModReturnLogistik_stok" disabled>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text form-control-xs">Qty Return</span>
                                </div>
                                <input type="number" class="form-control form-control-xs" id="ModReturnLogistik_inputreturn" disabled>
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-primary btn-xs" id="ModReturnLogistik_cekBrg"><i class="fa fa-check"></i></button>
                                    <button type="button" class="btn btn-outline-primary btn-xs" onclick="ModReturnLogistikAdd()"><i class="fa fa-file"></i> Baru</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table border="0" cellpadding="0" cellspacing="0" id="ModReturnLogistik_daftarbarang" class="table table-striped table-sm choose">
                        <thead>
                            <tr>
                                <th class="pl-0" width="30" style="text-align:center;">#</th>
                                <th width="10"></th>
                                <th width="20">ID</th>
                                <th class="pl-0" width="100">Nama Barang</th>
                                <th width="70" style="text-align:center;">Stok Unit</th>
                                <th width="70" style="text-align:center;">Qty Return</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                    <input type="text" value="0" id="ModReturnLogistik_hargatotal" name="ModReturnLogistik_hargatotal" disabled hidden>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="mod_ListBarangLogistikUnitreturn_content"></div>


<script>
    $('.modreturnLogistik_content').show();
    $('#loadingModReturnLogistik').hide();

    /* document.getElementById('ModReturnLogistik_tglreturnbrg').value = nowday;
    document.getElementById('ModReturnLogistik_idgudang').value = id_gudang_unit;
    document.getElementById('ModReturnLogistik_gudangunit').value = nama_gudang;
    document.getElementById('ModReturnLogistik_totalbrg').value = jml_barang; */
    listBarang_ModReturnLogistik()
    getGudangUnit()

    document.getElementById('ModReturnLogistik_tglreturnbrg').value = nowday;


    function getGudangUnit() {
        apiPOST('Logistik/getGudangUnit', null, hasil => {
            var data = '';
            var a = hasil['data'];
            for (var i = 0; i < a.length; i++) {
                data += '<option value="' + a[i]['id_gudang_unit'] + '">' + a[i]['nama_gudang'] + '</option>';
            }
            document.getElementById('ModReturnLogistik_idgudang').innerHTML = data;
            document.getElementById('ModReturnLogistik_idgudang').value = user['id_gudang_unit'];

        });
    }

    function ModReturnLogistik_pilih(id_barang_logistik, nama_barang, qty_total, id_acc, harga_beli, harga_pokok) {
        keluarmod_ListBarangLogistikUnitreturn_daftarBarang()
        document.getElementById("ModReturnLogistik_inputreturn").disabled = false;
        $("#ModReturnLogistik_inputreturn").trigger('focus');

        document.getElementById("ModReturnLogistik_idbarang").value = id_barang_logistik;
        document.getElementById("ModReturnLogistik_nmBrg").value = nama_barang;
        document.getElementById("ModReturnLogistik_nmBrg").disabled = true;
        document.getElementById("ModReturnLogistik_stok").value = qty_total;
        document.getElementById("ModReturnLogistik_idaccount").value = id_acc;
        document.getElementById("ModReturnLogistik_hargabeli").value = harga_beli;
        document.getElementById("ModReturnLogistik_hargapokok").value = harga_pokok;
    }

    function listBarang_ModReturnLogistik() {

        $("#ModReturnLogistik_inputreturn").on("keyup", function(event) {
            if (event.keyCode == 13) {
                var kode_brgLogistik = document.getElementById("ModReturnLogistik_idbarang").value;
                var nm_brgLogistik = document.getElementById("ModReturnLogistik_nmBrg").value;
                var stok = document.getElementById("ModReturnLogistik_stok").value;
                var cekreturn = document.getElementById("ModReturnLogistik_inputreturn").value;
                var id_acc = document.getElementById("ModReturnLogistik_idaccount").value;
                var hrgBeli = document.getElementById("ModReturnLogistik_hargabeli").value;
                var hrgPokok = document.getElementById("ModReturnLogistik_hargapokok").value;

                if (cekreturn != '') {
                    var returnbrg = cekreturn;
                } else {
                    var returnbrg = '0';
                }
                if (kode_brgLogistik != null) {
                    if ((returnbrg != '0') && (returnbrg != '')) {
                        if (parseInt(stok) < parseInt(returnbrg)) {
                            toastr.error("Pemakaian Melebihi Stok Unit!!");
                        } else {
                            tampilkan_pemakaianBarangLogistikUnit(kode_brgLogistik, nm_brgLogistik, stok, returnbrg, id_acc, hrgBeli, hrgPokok);
                            kosongInputModReturnLogistik()
                        }
                    } else {
                        toastr.error("Inputan Masih Kosong!!");
                    }
                } else {
                    toastr.error("Nama barang tidak ditemukan!!");
                    kosongInputModReturnLogistik()

                }

            }
        });

        $("#ModReturnLogistik_cekBrg").click(function(event) {
            var kode_brgLogistik = document.getElementById("ModReturnLogistik_idbarang").value;
            var nm_brgLogistik = document.getElementById("ModReturnLogistik_nmBrg").value;
            var stok = document.getElementById("ModReturnLogistik_stok").value;
            var cekreturn = document.getElementById("ModReturnLogistik_inputreturn").value;
            var id_acc = document.getElementById("ModReturnLogistik_idaccount").value;
            var hrgBeli = document.getElementById("ModReturnLogistik_hargabeli").value;
            var hrgPokok = document.getElementById("ModReturnLogistik_hargapokok").value;

            if (cekreturn != '') {
                var returnbrg = cekreturn;
            } else {
                var returnbrg = '0';
            }
            if (kode_brgLogistik != null) {
                if ((returnbrg != '0') && (returnbrg != '')) {
                    if (parseInt(stok) < parseInt(returnbrg)) {
                        toastr.error("Pemakaian Melebihi Stok Unit!!");
                    } else {
                        tampilkan_pemakaianBarangLogistikUnit(kode_brgLogistik, nm_brgLogistik, stok, returnbrg, id_acc, hrgBeli, hrgPokok);
                        kosongInputModReturnLogistik()
                    }
                } else {
                    toastr.error("Inputan Masih Kosong!!");
                }
            } else {
                toastr.error("Nama barang tidak ditemukan!!");
                kosongInputModReturnLogistik()

            }
        });

    }

    function kosongInputModReturnLogistik() {
        document.getElementById("ModReturnLogistik_urut").value = '';
        document.getElementById("ModReturnLogistik_inputreturn").disabled = true;
        document.getElementById("ModReturnLogistik_idbarang").value = '';
        document.getElementById("ModReturnLogistik_inputreturn").value = '';
        document.getElementById("ModReturnLogistik_nmBrg").value = '';
        document.getElementById("ModReturnLogistik_stok").value = '';
        document.getElementById("ModReturnLogistik_idaccount").value = '';
        document.getElementById("ModReturnLogistik_hargabeli").value = '';
        document.getElementById("ModReturnLogistik_hargapokok").value = '';
    }

    function tampilkan_pemakaianBarangLogistikUnit(kode_brgLogistik, nm_brgLogistik, stok, returnbrg, id_acc, hrgBeli, hrgPokok) {
        var nomor = $('#ModReturnLogistik_daftarbarang tbody tr').length + 1;
        var Baris = '';
        Baris += "<tr>";
        Baris += "<td class='pl-0'>";
        Baris += "<input style='text-align:center;' type='text' class='form-control form-control-xs' name='ModReturnLogistik_nourut[]' value='" + nomor + "' disabled>";
        Baris += "</td>";
        Baris += "<td style='display: flex;'><button type='button' class='btn btn-xs btn-danger' onclick='hapusbaris_ModReturnLogistik(this, " + nomor + ")' id='hapusbaris_ModReturnLogistik" + nomor + "' style='width:100%'><i class='fa fa-times'></i></button><button type='button' class='btn btn-xs btn-outline-warning' onclick='editbaris_ModReturnLogistik(this, " + nomor + ")' id='editbaris_ModReturnLogistik" + nomor + "' style='width:100%'><i class='fa fa-edit'></i></button></td>";
        Baris += "<td hidden>";
        Baris += "<input type='text' class='form-control form-control-xs' name='ModReturnLogistik_id_acc[]' value='" + id_acc + "'>";
        Baris += "</td>";
        Baris += "<td hidden>";
        Baris += "<input type='text' class='form-control form-control-xs' name='ModReturnLogistik_hrgBeli[]' value='" + hrgBeli + "'>";
        Baris += "</td>";
        Baris += "<td hidden>";
        Baris += "<input type='text' class='form-control form-control-xs' name='ModReturnLogistik_hrgPokok[]' value='" + hrgPokok + "'>";
        Baris += "</td>";
        Baris += "<td>";
        Baris += "<input type='text' class='form-control form-control-xs' name='ModReturnLogistik_kodeBrg[]' value='" + kode_brgLogistik + "' disabled>";
        Baris += "</td>";
        Baris += "<td>";
        Baris += "<input type='text' class='form-control form-control-xs' name='ModReturnLogistik_nmBrg[]' value='" + nm_brgLogistik + "' disabled>";
        Baris += "</td>";
        Baris += "<td>";
        Baris += "<input type='text' class='form-control form-control-xs' name='ModReturnLogistik_stok[]' value='" + stok + "' disabled>";
        Baris += "</td>";
        Baris += "<td>";
        Baris += "<input type='text' class='form-control form-control-xs' name='ModReturnLogistik_returnbrg[]' value='" + returnbrg + "' disabled>";
        Baris += "</td>";
        Baris += "<td style='display:none;'>";
        Baris += "</td>";
        Baris += "</tr>";

        var getKodeBrg = document.getElementsByName('ModReturnLogistik_kodeBrg[]');
        var jmlBrgLogistik = $('#ModReturnLogistik_daftarbarang tbody tr').length;
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
            $('#ModReturnLogistik_daftarbarang tbody').append(Baris);
            var totalx = document.getElementById("ModReturnLogistik_hargatotal").value;
            total = parseInt(totalx) + (parseInt(returnbrg) * parseInt(hrgBeli));
            document.getElementById("ModReturnLogistik_hargatotal").value = total;

        } else {
            var urut = document.getElementById("ModReturnLogistik_urut").value;
            if (urut != '') {
                $('#ModReturnLogistik_daftarbarang tbody').append(Baris);
                var totalx = document.getElementById("ModReturnLogistik_hargatotal").value;
                total = parseInt(totalx) + (parseInt(returnbrg) * parseInt(hrgBeli));
                document.getElementById("ModReturnLogistik_hargatotal").value = total;

                var hapusrow = document.getElementById("hapusbaris_ModReturnLogistik" + urut);
                hapusrow.click();

            } else {
                toastr.error("Barang Sudah Diinputkan!!");
            }

        }
    }

    function editbaris_ModReturnLogistik(btn, nomor) {
        var id_account = document.getElementById("ModReturnLogistik_daftarbarang").rows[nomor].cells[2].firstChild.value;
        var harga_Beli = document.getElementById("ModReturnLogistik_daftarbarang").rows[nomor].cells[3].firstChild.value;
        var harga_Pokok = document.getElementById("ModReturnLogistik_daftarbarang").rows[nomor].cells[4].firstChild.value;
        var kode_brgLogistik = document.getElementById("ModReturnLogistik_daftarbarang").rows[nomor].cells[5].firstChild.value;
        var nm_brgLogistik = document.getElementById("ModReturnLogistik_daftarbarang").rows[nomor].cells[6].firstChild.value;
        var stok = document.getElementById("ModReturnLogistik_daftarbarang").rows[nomor].cells[7].firstChild.value;
        var returnbrg = document.getElementById("ModReturnLogistik_daftarbarang").rows[nomor].cells[8].firstChild.value;

        document.getElementById("ModReturnLogistik_inputreturn").disabled = false;
        $("#ModReturnLogistik_inputreturn").trigger('focus');

        document.getElementById("ModReturnLogistik_urut").value = nomor;
        document.getElementById("ModReturnLogistik_idbarang").value = kode_brgLogistik;
        document.getElementById("ModReturnLogistik_inputreturn").value = returnbrg;
        document.getElementById("ModReturnLogistik_nmBrg").value = nm_brgLogistik;
        document.getElementById("ModReturnLogistik_stok").value = stok;
        document.getElementById("ModReturnLogistik_idaccount").value = id_account;
        document.getElementById("ModReturnLogistik_hargabeli").value = harga_Beli;
        document.getElementById("ModReturnLogistik_hargapokok").value = harga_Pokok;
    }

    function hapusbaris_ModReturnLogistik(btn, nomor) {
        document.getElementById("ModReturnLogistik_urut").value = '';
        var row = btn.parentNode.parentNode;
        var harga_Beli = document.getElementById("ModReturnLogistik_daftarbarang").rows[nomor].cells[3].firstChild.value;
        var returnbrg = document.getElementById("ModReturnLogistik_daftarbarang").rows[nomor].cells[8].firstChild.value;

        var totalx = document.getElementById("ModReturnLogistik_hargatotal").value;
        total = parseInt(totalx) - (parseInt(returnbrg) * parseInt(harga_Beli));
        document.getElementById("ModReturnLogistik_hargatotal").value = total;

        row.parentNode.removeChild(row);
        var no = 1;
        $('#ModReturnLogistik_daftarbarang tbody tr').each(function() {
            $(this).find('td:nth-child(1)').html("<input style='text-align:center;' type='text' class='form-control form-control-xs' name='ModReturnLogistik_nourut[]' value='" + no + "' disabled>");
            $(this).find('td:nth-child(2)').html("<button type='button' class='btn btn-xs btn-danger' onclick='hapusbaris_ModReturnLogistik(this, " + no + ")' id='hapusbaris_ModReturnLogistik" + no + "' style='width:100%'><i class='fa fa-times'></i></button><button type='button' class='btn btn-xs btn-outline-warning' onclick='editbaris_ModReturnLogistik(this, " + no + ")' id='editbaris_ModReturnLogistik" + no + "' style='width:100%'><i class='fa fa-edit'></i></button>");
            no++;
        });

    }

    function params_ModReturnLogistik() {
        var getKode_brg = document.getElementsByName('ModReturnLogistik_kodeBrg[]');
        var get_returnbrg = document.getElementsByName('ModReturnLogistik_returnbrg[]');
        var geturut = document.getElementsByName('ModReturnLogistik_nourut[]');
        var getidacc = document.getElementsByName('ModReturnLogistik_id_acc[]');
        var gethargabeli = document.getElementsByName('ModReturnLogistik_hrgBeli[]');
        var gethargapokok = document.getElementsByName('ModReturnLogistik_hrgPokok[]');
        var count = $('#ModReturnLogistik_daftarbarang tbody tr').length;

        var params = {};
        params.data = [];
        for (var i = 0, iLen = count; i < iLen; i++) {
            var x = {};
            x.kd_brg = getKode_brg[i].value;
            x.returnbrg = get_returnbrg[i].value;
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

    function ModReturnLogistik_simpan() {
        a = $('#ModReturnLogistik_daftarbarang tbody tr').length;
        $('#loadingModReturnLogistik').show();
        var param = {
            id_gudang: document.getElementById("ModReturnLogistik_idgudang").value,
            tgl_return: document.getElementById("ModReturnLogistik_tglreturnbrg").value,
            ket: document.getElementById("ModReturnLogistik_ket").value,
            hargatotal: document.getElementById("ModReturnLogistik_hargatotal").value,
            id_peg: user['id_pegawai'],
            data: params_ModReturnLogistik(),
            count: params_ModReturnLogistik().length,
        };
        if (a == 0) {
            $('#loadingModReturnLogistik').hide();
            toastr.error("Tambah Barang Dulu");
            ModReturnLogistikAdd()

        } else {
            apiPOST('Logistik/SimpanReturnLogistik', param, hasil => {
                if (hasil != null) {
                    $('#loadingModReturnLogistik').hide();
                    ModReturnLogistik_kembalikeawal()
                }
            });
        }
    }

    function ModReturnLogistik_refresh() {
        sessionStorage.clear();
        $('#ModReturnLogistik_daftarbarang tbody').html('');
        kosongInputModReturnLogistik()
    }

    function ModReturnLogistik_kembalikeawal() {
        tampilreturnLogistik();
        $('.modreturnLogistik_content').hide();
        $('#returnLogistik_list1').show();
        $('#returnLogistik_list2').show();
    }

    function ModReturnLogistikAdd() {
        /* var data = {
            id_gudang_unit: id_gudang_unit
        }
        var datax = JSON.stringify(data); */
        $('.viewstokUnitBarang_content').load('Logistik/mod_ListBarangLogistikUnitreturn');
        /* $('.mod_ListBarangLogistikUnitreturn_content_content').load('Logistik/mod_ListBarangLogistikUnitreturn_content?data=' + datax); */
    }
</script>