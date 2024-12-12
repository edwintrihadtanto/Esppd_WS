<?php
$data = json_decode($_GET['data']);
$id_permintaan_logistik       = str_replace('"', '', json_encode($data->id_permintaan_logistik));
?>
<div class="content modal fade" id="modal_ModPengirimanLogistik">
    <div class="container-fluid">
        <div class="modal-dialog modal-xl" style="min-width: 100%;">
            <!-- <div class="card card-row"> -->
            <div class="modal-content" style="overflow: auto;">
                <div class="row p-1">
                    <div class="col-md-3 col-sm-6 col-12 p-1">
                        <div class="info-box mb-0">
                            <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="70">Tanggal Order</td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" class="form-control form-control-xs" id="ModPengirimanLogistik_id_permintaan" hidden>
                                        <input type="date" class="form-control form-control-xs" id="ModPengirimanLogistik_tglorder" disabled>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="70">Tanggal Kirim</td>
                                    <td>:</td>
                                    <td>
                                        <input type="date" class="form-control form-control-xs" id="ModPengirimanLogistik_tglkirim">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-12 p-1">
                        <div class="info-box mb-0">
                            <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="70">Dari</td>
                                    <td>:</td>
                                    <td><select type="text" class="form-control form-control-xs" id="ModPengirimanLogistik_dari" disabled></select></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-12 p-1">
                        <div class="info-box mb-0">
                            <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="70">Ke</td>
                                    <td>:</td>
                                    <td><select type="text" class="form-control form-control-xs" id="ModPengirimanLogistik_ke" disabled></select></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-12 p-1">
                        <div class="info-box mb-0">
                            <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="70">Ket</td>
                                    <td>:</td>
                                    <td><textarea class="form-control form-control-sm" id="ModPengirimanLogistik_ket" name="ModPengirimanLogistik_ket" style="height:50px;"></textarea></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card card-row">
                    <!-- <div class="overlay-wrapper" id="loadingModPengirimanLogistik">
                        <div class="overlay dark">
                            <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                        </div>
                    </div> -->

                    <div class="card-header p-1 darkgrey-custom">
                        <!-- <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="" id="ModPengirimanLogistik_btn_tambah_barang"><i class="fa fa-plus"></i> Tambah Barang</button> -->
                        <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="ModPengirimanLogistik_simpan()" id="ModPengirimanLogistik_simpan"><i class="fa fa-save"></i> Simpan</button>
                        <div class="btn-group">
                            <button type="button" class="btn bg-gradient-secondary btn-xs"><i class="fa fa-print"></i> Cetak</button>
                            <button type="button" class="btn bg-gradient-secondary btn-xs dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                                <span class="sr-only"></span>
                            </button>
                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" href="#"><span><i class="fa fa-print"></i> Cetak</span></a>
                            </div>
                        </div>
                        <button type="button" class="btn bg-gradient-warning btn-xs" id="ModPengirimanLogistik_kirimunit" onclick="ModPengirimanLogistik_kirimunit()"><i class="fa fa-paper-plane"></i> Kirim Unit</button>
                        <button type="button" class="btn btn-outline-danger btn-xs" onclick="ModPengirimanLogistik_kembalikeawal()"><i class="fa fa-arrow-left"></i> Kembali</button>
                        <button type="button" class="btn btn-info btn-xs" onclick="ModPengirimanLogistik_refresh()"><i class="fa fa-sync-alt fa-spin"></i> Refresh Data</button>

                    </div>
                    <div class="modal-body p-1">
                        <div class="card-body p-0">
                            <div class="col-sm-12 p-1" style="max-height: 238px; overflow-x: hidden;">
                                <div class="row mb-1" id="ModPengirimanLogistik_inputPembelian">
                                    <div class="input-group col-sm-4">
                                        <input type="text" class="form-control form-control-xs" id="ModPengirimanLogistik_urut" disabled hidden>
                                        <input type="text" class="form-control form-control-xs" id="ModPengirimanLogistik_idbarang" disabled hidden>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text form-control-xs">Nama Barang</span>
                                        </div>
                                        <input type="search" class="form-control form-control-xs" id="ModPengirimanLogistik_nmBrg" autocomplete="false" disabled>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text form-control-xs">Permintaan</span>
                                            </div>
                                            <input type="number" class="form-control form-control-xs" id="ModPengirimanLogistik_qty" disabled>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text form-control-xs">Permintaan Acc</span>
                                            </div>
                                            <input type="number" class="form-control form-control-xs" id="ModPengirimanLogistik_qtyacc" disabled>
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-primary btn-xs" id="ModPengirimanLogistik_cekBrg"><i class="fa fa-check"></i></button>
                                                <button type="button" class="btn btn-outline-primary btn-xs" onclick=""><i class="fa fa-file"></i> Baru</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <table border="0" cellpadding="0" cellspacing="0" id="ModPengirimanLogistik_daftrabarang" class="table table-striped table-sm choose">
                                    <thead>
                                        <tr>
                                            <th class="pl-0" width="30" style="text-align:center;">#</th>
                                            <th width="10"></th>
                                            <th width="20">ID</th>
                                            <th class="pl-0" width="100">Nama Barang</th>
                                            <th width="70" style="text-align:center;">Permintaan Stok</th>
                                            <th width="70" style="text-align:center;">Permintaan Acc</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var id_permintaan_logistik = "<?php echo $id_permintaan_logistik ?>";
    document.getElementById("ModPengirimanLogistik_tglkirim").value = nowday;

    showUp_ModPengirimanLogistik()
    getUnit()
    getBarang_ModPengirimanLogistik()
    listBarang_ModPengirimanLogistik()
    listmodpengirimanLogistik()

    function showUp_ModPengirimanLogistik() {
        $("#modal_ModPengirimanLogistik").modal({
            backdrop: "static"
        });
        $('#modal_ModPengirimanLogistik').on('shown.bs.modal', function() {});
    }
    $('#loadingModPengirimanLogistik').hide();

    function getUnit() {
        apiPOST('Logistik/getGudangUnit', null, hasil => {
            var data = '';
            var a = hasil['data'];
            for (var i = 0; i < a.length; i++) {
                data += '<option value="' + a[i]['id_gudang_unit'] + '">' + a[i]['nama_gudang'] + '</option>';
            }
            document.getElementById('ModPengirimanLogistik_dari').innerHTML = data;
            document.getElementById('ModPengirimanLogistik_ke').innerHTML = data;
        });
    }

    function getBarang_ModPengirimanLogistik() {
        var param = {
            barangcari: document.getElementById("ModPengirimanLogistik_nmBrg").value,
        };

        kd_barangLogistik = new AutoComplete("ModPengirimanLogistik_nmBrg");
        apiPOST('Logistik/getBarangLogistik', param, hasil => {
            if (hasil !== null) {
                var list = hasil['data'];
                list.forEach(item => {
                    kd_barangLogistik.addData([item['id_barang_logistik'], item['harga_beli']], item['nama_barang'] + ' || ' + item['satuan_beli']);
                });
            }
        });
    }

    function listmodpengirimanLogistik() {
        var param = {
            id_permintaan_logistik: id_permintaan_logistik
        };
        apiPOST('Logistik/getlistPermintaanLogistik', param, hasil => {
            if (hasil['data'] != null) {
                var data = hasil['data'];
                for (var i = 0; i < 1; i++) {
                    flag = data[i]['status'];
                    document.getElementById("ModPengirimanLogistik_id_permintaan").value = data[i]['id_logistik_permintaan'];
                    document.getElementById("ModPengirimanLogistik_tglorder").value = data[i]['tgl_permintaan'];
                    document.getElementById("ModPengirimanLogistik_dari").value = data[i]['id_gudang_unit_dari'];
                    document.getElementById("ModPengirimanLogistik_ke").value = data[i]['id_gudang_unit_ke'];
                    document.getElementById("ModPengirimanLogistik_ket").value = data[i]['ket'];
                    if (flag == 't') {
                        document.getElementById("ModPengirimanLogistik_kirimunit").disabled = true;
                        document.getElementById("ModPengirimanLogistik_ket").disabled = true;
                        document.getElementById("ModPengirimanLogistik_simpan").disabled = true;
                        document.getElementById("ModPengirimanLogistik_tglkirim").value = data[i]['tgl_kirim'];
                        document.getElementById("ModPengirimanLogistik_tglkirim").disabled = true;
                    }
                }

                var a = hasil['datadetail'];
                var nomor = 1;
                var Baris = '';
                for (var i = 0; i < a.length; i++) {
                    Baris += "<tr>";
                    Baris += "<td class='pl-0'>";
                    Baris += "<input style='text-align:center;' type='text' class='form-control form-control-xs' name='pengirimanLogistik_nourut[]' value='" + nomor + "' disabled>";
                    Baris += "</td>";
                    if (flag == 't') {
                        Baris += "<td style='display: flex;'><button type='button' class='btn btn-xs btn-danger' onclick='hapusbaris_pengirimanLogistik(this, " + nomor + ")' id='hapusbaris_pengirimanLogistik" + nomor + "' style='width:100%' disabled><i class='fa fa-times'></i></button><button type='button' class='btn btn-xs btn-outline-warning' onclick='editbaris_pengirimanLogistik(this, " + nomor + ")' id='editbaris_pengirimanLogistik" + nomor + "' style='width:100%' disabled><i class='fa fa-edit'></i></button></td>"
                    } else {
                        Baris += "<td style='display: flex;'><button type='button' class='btn btn-xs btn-danger' onclick='hapusbaris_pengirimanLogistik(this, " + nomor + ")' id='hapusbaris_pengirimanLogistik" + nomor + "' style='width:100%'><i class='fa fa-times'></i></button><button type='button' class='btn btn-xs btn-outline-warning' onclick='editbaris_pengirimanLogistik(this, " + nomor + ")' id='editbaris_pengirimanLogistik" + nomor + "' style='width:100%'><i class='fa fa-edit'></i></button></td>"
                    }
                    Baris += "<td>";
                    Baris += "<input type='text' class='form-control form-control-xs' name='pengirimanLogistik_kodeBrg[]' value='" + a[i]['id_barang_logistik'] + "' disabled>";
                    Baris += "</td>";
                    Baris += "<td>";
                    Baris += "<input type='text' class='form-control form-control-xs' name='pengirimanLogistik_nmBrg[]' value='" + a[i]['nama_barang'] + ' || ' + a[i]['satuan_pakai'] + "' disabled>";
                    Baris += "</td>";
                    Baris += "<td>";
                    Baris += "<input type='text' class='form-control form-control-xs' name='pengirimanLogistik_qty[]' value='" + a[i]['qty'] + "' disabled>";
                    Baris += "</td>";
                    Baris += "<td>";
                    Baris += "<input type='text' class='form-control form-control-xs' name='pengirimanLogistik_qtyacc[]' value='" + a[i]['qty'] + "' disabled>";
                    Baris += "</td>";
                    Baris += "<td style='display:none;'>";
                    Baris += "</td>";
                    Baris += "</tr>";
                    nomor++
                    /* total = +(parseInt(a[i]['qty']) * parseInt(a[i]['harga_beli'])); */
                }
                /* document.getElementById("ModPembelianLogistik_hargatotal").value = total;
                document.getElementById("VModPembelianLogistik_hargatotal").innerHTML = format_ribuan(total); */
                $('#ModPengirimanLogistik_daftrabarang tbody').append(Baris);
                toastr.success("Data ditemukan");
            }

        });
    }

    function listBarang_ModPengirimanLogistik() {
        $("#ModPengirimanLogistik_qtyacc").on("keyup", function(event) {
            if (event.keyCode == 13) {
                var kode_brgLogistik = kd_barangLogistik.getValue()[0];
                var harga_beli = kd_barangLogistik.getValue()[1];
                var nm_brgLogistik = document.getElementById("ModPengirimanLogistik_nmBrg").value;
                var qty = document.getElementById("ModPengirimanLogistik_qty").value;
                var cekqtyacc = document.getElementById("ModPengirimanLogistik_qtyacc").value;
                if (cekqtyacc != '') {
                    var qtyacc = cekqtyacc;
                } else {
                    var qtyacc = '0';
                }
                /* var exp_brgLogistik = document.getElementById("ModPengirimanLogistik_exp").value; */
                var ket = document.getElementById("ModPengirimanLogistik_ket").value;
                if (kode_brgLogistik != null) {
                    if ((qtyacc != '0') || (qtyacc != '')) {
                        if (parseInt(qty) < parseInt(qtyacc)) {
                            toastr.error("Melebihi Permintaan");
                        } else {
                            list_ModPengirimanLogistik(kode_brgLogistik, nm_brgLogistik, qty, qtyacc, harga_beli);
                            kosongInputPermintaanLogistik()
                            document.getElementById("ModPengirimanLogistik_kirimunit").disabled = true;
                            ModPengirimanLogistik_kirimunit
                        }
                    } else {
                        toastr.error("Inputan Masih Kosong!!");
                    }
                } else {
                    toastr.error("Nama barang tidak ditemukan!!");
                    kosongInputPermintaanLogistik()

                }

            }
        });

        $("#ModPengirimanLogistik_cekBrg").click(function(event) {
            var kode_brgLogistik = kd_barangLogistik.getValue()[0];
            var harga_beli = kd_barangLogistik.getValue()[1];
            var nm_brgLogistik = document.getElementById("ModPengirimanLogistik_nmBrg").value;
            var qty = document.getElementById("ModPengirimanLogistik_qty").value;
            var cekqtyacc = document.getElementById("ModPengirimanLogistik_qtyacc").value;
            console.log()
            if (cekqtyacc != '') {
                var qtyacc = cekqtyacc;
            } else {
                var qtyacc = '0';
            }
            /* var exp_brgLogistik = document.getElementById("ModPengirimanLogistik_exp").value; */
            var ket = document.getElementById("ModPengirimanLogistik_ket").value;
            if (kode_brgLogistik != null) {
                if ((qtyacc != '0') || (qtyacc != '')) {
                    if (parseInt(qty) < parseInt(qtyacc)) {
                        toastr.error("Melebihi Permintaan");
                    } else {
                        list_ModPengirimanLogistik(kode_brgLogistik, nm_brgLogistik, qty, qtyacc, harga_beli);
                        kosongInputPermintaanLogistik()
                        document.getElementById("ModPengirimanLogistik_kirimunit").disabled = true;
                        ModPengirimanLogistik_kirimunit
                    }
                } else {
                    toastr.error("Inputan Masih Kosong!!");
                }
            } else {
                toastr.error("Nama barang tidak ditemukan!!");
                kosongInputPermintaanLogistik()
            }
        });
    }

    function list_ModPengirimanLogistik(kode_brgLogistik, nm_brgLogistik, qty, qtyacc, harga_beli) {
        var nomor = $('#ModPengirimanLogistik_daftrabarang tbody tr').length + 1;
        var Baris = '';
        Baris += "<tr>";
        Baris += "<td class='pl-0'>";
        Baris += "<input style='text-align:center;' type='text' class='form-control form-control-xs' name='pengirimanLogistik_nourut[]' value='" + nomor + "' disabled>";
        Baris += "</td>";
        Baris += "<td style='display: flex;'><button type='button' class='btn btn-xs btn-danger' onclick='hapusbaris_pengirimanLogistik(this, " + nomor + ")' id='hapusbaris_pengirimanLogistik" + nomor + "' style='width:100%'><i class='fa fa-times'></i></button><button type='button' class='btn btn-xs btn-outline-warning' onclick='editbaris_pengirimanLogistik(this, " + nomor + ")' id='editbaris_pengirimanLogistik" + nomor + "' style='width:100%'><i class='fa fa-edit'></i></button></td>";
        Baris += "<td>";
        Baris += "<input type='text' class='form-control form-control-xs' name='pengirimanLogistik_kodeBrg[]' value='" + kode_brgLogistik + "' disabled>";
        Baris += "</td>";
        Baris += "<td>";
        Baris += "<input type='text' class='form-control form-control-xs' name='pengirimanLogistik_nmBrg[]' value='" + nm_brgLogistik + "' disabled>";
        Baris += "</td>";
        Baris += "<td>";
        Baris += "<input type='text' class='form-control form-control-xs' name='pengirimanLogistik_qty[]' value='" + qty + "' disabled>";
        Baris += "</td>";
        Baris += "<td>";
        Baris += "<input type='text' class='form-control form-control-xs' name='pengirimanLogistik_qtyacc[]' value='" + qtyacc + "' disabled>";
        Baris += "</td>";
        Baris += "<td style='display:none;'>";
        Baris += "</td>";
        Baris += "</tr>";

        var getKodeBrg = document.getElementsByName('pengirimanLogistik_kodeBrg[]');
        var jmlBrgLogistik = $('#ModPengirimanLogistik_daftrabarang tbody tr').length;
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
            $('#ModPengirimanLogistik_daftrabarang tbody').append(Baris);

            /* document.getElementById("VModPembelianLogistik_hargatotal").innerHTML = format_ribuan(total);

            var totalx = document.getElementById("ModPembelianLogistik_hargatotal").value;
            total = parseInt(totalx) + (parseInt(qty) * parseInt(harga_beli));
            document.getElementById("ModPembelianLogistik_hargatotal").value = total;
            document.getElementById("VModPembelianLogistik_hargatotal").innerHTML = format_ribuan(total); */

        } else {
            var urut = document.getElementById("ModPengirimanLogistik_urut").value;
            if (urut != '') {
                $('#ModPengirimanLogistik_daftrabarang tbody').append(Baris);

                /* var totalx = document.getElementById("ModPembelianLogistik_hargatotal").value;
                total = parseInt(totalx) + (parseInt(qty) * parseInt(harga_beli));
                document.getElementById("ModPembelianLogistik_hargatotal").value = total;
                document.getElementById("VModPembelianLogistik_hargatotal").innerHTML = format_ribuan(total); */

                var hapusrow = document.getElementById("hapusbaris_pengirimanLogistik" + urut);
                hapusrow.click();

            } else {
                toastr.error("Obat Sudah Diinputkan!!");
            }

        }
    }

    function kosongInputPermintaanLogistik() {
        document.getElementById("ModPengirimanLogistik_nmBrg").value = '';
        /* $("#ModPengirimanLogistik_nmBrg").trigger('focus'); */
        document.getElementById("ModPengirimanLogistik_urut").value = '';
        document.getElementById("ModPengirimanLogistik_nmBrg").value = '';
        document.getElementById("ModPengirimanLogistik_qty").value = '';
        document.getElementById("ModPengirimanLogistik_qtyacc").value = '';
        document.getElementById("ModPengirimanLogistik_qtyacc").disabled = true;
        /* kode_brgLogistik.reset(); */
    }

    function editbaris_pengirimanLogistik(btn, nomor) {

        var kode_brgLogistik = document.getElementById("ModPengirimanLogistik_daftrabarang").rows[nomor].cells[2].firstChild.value;
        var nm_brgLogistik = document.getElementById("ModPengirimanLogistik_daftrabarang").rows[nomor].cells[3].firstChild.value;
        var qty = document.getElementById("ModPengirimanLogistik_daftrabarang").rows[nomor].cells[4].firstChild.value;
        var qtyacc = document.getElementById("ModPengirimanLogistik_daftrabarang").rows[nomor].cells[5].firstChild.value;
        document.getElementById("ModPengirimanLogistik_qtyacc").disabled = false;
        $("#ModPengirimanLogistik_qtyacc").trigger('focus');

        kd_barangLogistik.setValue(nm_brgLogistik);
        document.getElementById("ModPengirimanLogistik_urut").value = nomor;
        document.getElementById("ModPengirimanLogistik_nmBrg").disabled = true;
        document.getElementById("ModPengirimanLogistik_qty").value = qty;
        document.getElementById("ModPengirimanLogistik_qtyacc").value = qtyacc;
    }

    function hapusbaris_pengirimanLogistik(btn, nomor) {
        document.getElementById("ModPengirimanLogistik_urut").value = '';
        var row = btn.parentNode.parentNode;

        let total = 0;
        var qty = document.getElementById("ModPengirimanLogistik_daftrabarang").rows[nomor].cells[4].firstChild.value;
        /* var hrg_beli = document.getElementById("ModPengirimanLogistik_daftrabarang").rows[nomor].cells[6].firstChild.value; */
        /* var totalx = document.getElementById("ModPengirimanLogistik_hargatotal").value;
        total = parseInt(totalx) - (parseInt(qty) * parseInt(hrg_beli));
        document.getElementById("ModPengirimanLogistik_hargatotal").value = total;
        document.getElementById("VModPengirimanLogistik_hargatotal").innerHTML = format_ribuan(total); */

        row.parentNode.removeChild(row);
        var no = 1;
        $('#ModPengirimanLogistik_daftrabarang tbody tr').each(function() {
            $(this).find('td:nth-child(1)').html("<input style='text-align:center;' type='text' class='form-control form-control-xs' name='pengirimanLogistik_nourut[]' value='" + no + "' disabled>");
            $(this).find('td:nth-child(2)').html("<button type='button' class='btn btn-xs btn-danger' onclick='hapusbaris_pengirimanLogistik(this, " + no + ")' id='hapusbaris_pengirimanLogistik" + no + "' style='width:100%'><i class='fa fa-times'></i></button><button type='button' class='btn btn-xs btn-outline-warning' onclick='editbaris_pengirimanLogistik(this, " + no + ")' id='editbaris_pengirimanLogistik" + no + "' style='width:100%'><i class='fa fa-edit'></i></button>");
            no++;
        });

    }

    function params_pengirimanLogistik() {
        var getKode_brg = document.getElementsByName('pengirimanLogistik_kodeBrg[]');
        var get_Qty = document.getElementsByName('pengirimanLogistik_qtyacc[]');
        /* var getHargaBeli = document.getElementsByName('pengirimanLogistik_harga_beli[]'); */
        var geturut = document.getElementsByName('pengirimanLogistik_nourut[]');
        var count = $('#ModPengirimanLogistik_daftrabarang tbody tr').length;

        var params = {};
        params.data = [];
        for (var i = 0, iLen = count; i < iLen; i++) {
            var x = {};
            x.kd_brg = getKode_brg[i].value;
            x.qty = get_Qty[i].value;
            if (typeof(geturut[i].value) !== 'undefined') {
                x.urut = geturut[i].value;
            } else {
                x.urut = "";
            }

            params.data.push(x);
        }
        return params.data;
    }

    function ModPengirimanLogistik_simpan() {
        $('#loadingModPengirimanLogistik').show();
        var param = {
            id_permintaan: document.getElementById("ModPengirimanLogistik_id_permintaan").value,
            data: params_pengirimanLogistik(),
            count: params_pengirimanLogistik().length,
        };


        apiPOST('Logistik/SimpanUpdatePengirimanLogistik', param, hasil => {
            if (hasil != null) {
                $('#loadingModPengirimanLogistik').hide();
                document.getElementById("ModPengirimanLogistik_kirimunit").disabled = false;

            }
        });
    }

    function ModPengirimanLogistik_kirimunitsimpan() {
        $('#loadingModPengirimanLogistik').show();
        var param = {
            id_permintaan: document.getElementById("ModPengirimanLogistik_id_permintaan").value,
            tgl_kirim: document.getElementById("ModPengirimanLogistik_tglkirim").value,
            data: params_pengirimanLogistik(),
            count: params_pengirimanLogistik().length,
        };
        apiPOST('Logistik/pengirimanLogistikKirimLogistik', param, hasil => {
            if (hasil != null) {
                keluarmodal_ModPengirimanLogistik()
            }
        });
    }

    function ModPengirimanLogistik_kirimunit() {
        var id_permintaan = document.getElementById("ModPengirimanLogistik_id_permintaan").value;
        if (id_permintaan != '') {
            pertanyaan.fire({
                title: 'Kirim Logistik',
                html: '<span>Apakah Anda Yakin Mengirim ?</span>',
                icon: 'question',
                showCancelButton: true,
                reverseButtons: false,
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    ModPengirimanLogistik_kirimunitsimpan();
                } else if (result.dismiss === Swal.DismissReason.cancel) {

                }
            })
        } else {
            keluarmodal_ModPengirimanLogistik();
        }
    }

    function ModPengirimanLogistik_kembalikeawal() {
        var cek = document.getElementById("ModPengirimanLogistik_kirimunit").disabled;
        if (cek == true) {
            pertanyaan.fire({
                title: 'Kembali ke menu awal',
                html: '<span>Edit data Belum diSimpan, Data yang sudah dientry akan hilang, tetap kembali ?</span>',
                icon: 'question',
                showCancelButton: true,
                reverseButtons: false,
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    keluarmodal_ModPengirimanLogistik();
                } else if (result.dismiss === Swal.DismissReason.cancel) {

                }
            })
        } else {
            keluarmodal_ModPengirimanLogistik();
        }
    }

    function keluarmodal_ModPengirimanLogistik() {
        $('#modal_ModPengirimanLogistik').modal('hide');
        $('.modal-backdrop').hide();
        tampilpengirimanLogistik();
        sessionStorage.clear();
    }
</script>