<?php
$data = json_decode($_GET['data']);
$id_permintaan_logistik       = str_replace('"', '', json_encode($data->id_permintaan_logistik));
?>
<div class="content modal fade" id="modal_ModPermintaanLogistik">
    <div class="container-fluid">
        <div class="modal-dialog modal-xl" style="min-width: 100%;">
            <!-- <div class="card card-row"> -->
            <div class="modal-content" style="overflow: auto;">
                <div class="row p-1">
                    <div class="col-md-3 col-sm-6 col-12 p-1">
                        <div class="info-box mb-0">
                            <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="70">Tanggal</td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" class="form-control form-control-xs" id="ModPermintaanLogistik_id_permintaan" hidden>
                                        <input type="date" class="form-control form-control-xs" id="ModPermintaanLogistik_tglorder">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-12 p-1">
                        <div class="info-box mb-0">
                            <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="70">Unit Asal</td>
                                    <td>:</td>
                                    <td><select type="text" class="form-control form-control-xs" id="ModPermintaanLogistik_dari" disabled></select></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-12 p-1">
                        <div class="info-box mb-0">
                            <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="70">Unit Order</td>
                                    <td>:</td>
                                    <td><select type="text" class="form-control form-control-xs" id="ModPermintaanLogistik_ke" disabled></select></td>
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
                                    <td><textarea class="form-control form-control-sm" id="ModPermintaanLogistik_ket" name="ModPermintaanLogistik_ket" style="height:50px;"></textarea></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card card-row">
                    <!-- <div class="overlay-wrapper" id="loadingModPermintaanLogistik">
                        <div class="overlay dark">
                            <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                        </div>
                    </div> -->

                    <div class="card-header p-1 darkgrey-custom">
                        <!-- <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="" id="ModPermintaanLogistik_btn_tambah_barang"><i class="fa fa-plus"></i> Tambah Barang</button> -->
                        <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="ModPermintaanLogistik_simpan()" id="ModPermintaanLogistik_simpan"><i class="fa fa-save"></i> Simpan</button>
                        <div class="btn-group">
                            <button type="button" class="btn bg-gradient-secondary btn-xs"><i class="fa fa-print"></i> Cetak</button>
                            <button type="button" class="btn bg-gradient-secondary btn-xs dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                                <span class="sr-only"></span>
                            </button>
                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" href="#"><span><i class="fa fa-print"></i> Cetak</span></a>
                            </div>
                        </div>
                        <button type="button" class="btn btn-outline-danger btn-xs" onclick="ModPermintaanLogistik_kembalikeawal()"><i class="fa fa-arrow-left"></i> Kembali</button>
                        <button type="button" class="btn btn-info btn-xs" onclick="ModPermintaanLogistik_refresh()"><i class="fa fa-sync-alt fa-spin"></i> Refresh Data</button>

                    </div>
                    <div class="modal-body p-1">
                        <div class="card-body p-0">
                            <div class="col-sm-12 p-1" style="max-height: 238px; overflow-x: hidden;">
                                <div class="row mb-1" id="ModPermintaanLogistik_inputPembelian">
                                    <div class="input-group col-sm-5">
                                        <input type="text" class="form-control form-control-xs" id="ModPermintaanLogistik_urut" disabled hidden>
                                        <input type="text" class="form-control form-control-xs" id="ModPermintaanLogistik_idbarang" disabled hidden>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text form-control-xs">Nama Barang</span>
                                        </div>
                                        <input type="search" class="form-control form-control-xs" id="ModPermintaanLogistik_nmBrg" autocomplete="false">
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text form-control-xs">Qty</span>
                                            </div>
                                            <input type="number" class="form-control form-control-xs" id="ModPermintaanLogistik_qty">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-primary btn-xs" id="ModPermintaanLogistik_cekBrg"><i class="fa fa-check"></i></button>
                                                <button type="button" class="btn btn-outline-primary btn-xs" onclick=""><i class="fa fa-file"></i> Baru</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <table border="0" cellpadding="0" cellspacing="0" id="ModPermintaanLogistik_daftrabarang" class="table table-striped table-sm choose">
                                    <thead>
                                        <tr>
                                            <th class="pl-0" width="30" style="text-align:center;">#</th>
                                            <th width="10"></th>
                                            <th width="60">ID</th>
                                            <th class="pl-0" width="70">Nama Barang</th>
                                            <th width="70" style="text-align:center;">Permintaan Stok</th>
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

    document.getElementById("ModPermintaanLogistik_tglorder").value = nowday

    showUp_ModPermintaanLogistik()
    getUnit()
    getBarang_ModPermintaanLogistik()
    listBarang_ModPermintaanLogistik()
    listmodpermintaanLogistik()

    function showUp_ModPermintaanLogistik() {
        $("#modal_ModPermintaanLogistik").modal({
            backdrop: "static"
        });
        $('#modal_ModPermintaanLogistik').on('shown.bs.modal', function() {});

    }
    $('#loadingModPermintaanLogistik').hide();

    function getUnit() {
        apiPOST('Logistik/getGudangUnit', null, hasil => {
            var data = '';
            var a = hasil['data'];
            for (var i = 0; i < a.length; i++) {
                data += '<option value="' + a[i]['id_gudang_unit'] + '">' + a[i]['nama_gudang'] + '</option>';
            }
            document.getElementById('ModPermintaanLogistik_dari').innerHTML = data;
            document.getElementById('ModPermintaanLogistik_ke').innerHTML = data;
            document.getElementById('ModPermintaanLogistik_dari').value = '58';
            document.getElementById('ModPermintaanLogistik_ke').value = user['id_gudang_unit'];

        });
    }

    function getBarang_ModPermintaanLogistik() {
        var param = {
            barangcari: document.getElementById("ModPermintaanLogistik_nmBrg").value,
        };

        kd_barangLogistik = new AutoComplete("ModPermintaanLogistik_nmBrg");
        apiPOST('Logistik/getBarangLogistik', param, hasil => {
            if (hasil !== null) {
                var list = hasil['data'];
                list.forEach(item => {
                    kd_barangLogistik.addData([item['id_barang_logistik'], item['harga_beli']], item['nama_barang'] + ' || ' + item['satuan_beli']);
                });
            }
        });
    }

    function listmodpermintaanLogistik() {
        var param = {
            id_permintaan_logistik: id_permintaan_logistik
        };
        apiPOST('Logistik/getlistPermintaanLogistik', param, hasil => {
            if (hasil['data'] != null) {
                var data = hasil['data'];
                for (var i = 0; i < 1; i++) {
                    flag = data[i]['status'];
                    document.getElementById("ModPermintaanLogistik_id_permintaan").value = data[i]['id_logistik_permintaan'];
                    document.getElementById("ModPermintaanLogistik_tglorder").value = data[i]['tgl_permintaan'];
                    document.getElementById("ModPermintaanLogistik_dari").value = data[i]['id_unit_dari'];
                    document.getElementById("ModPermintaanLogistik_ke").value = data[i]['id_unit_ke'];
                    document.getElementById("ModPermintaanLogistik_ket").value = data[i]['ket'];
                    if (flag == 't') {
                        document.getElementById("ModPermintaanLogistik_ket").disabled = true;
                        document.getElementById("ModPermintaanLogistik_simpan").disabled = true;
                        document.getElementById("ModPermintaanLogistik_tglorder").disabled = true;
                    }
                }

                var a = hasil['datadetail'];
                var nomor = 1;
                var Baris = '';
                for (var i = 0; i < a.length; i++) {
                    Baris += "<tr>";
                    Baris += "<td class='pl-0'>";
                    Baris += "<input style='text-align:center;' type='text' class='form-control form-control-xs' name='permintaanLogistik_nourut[]' value='" + nomor + "' disabled>";
                    Baris += "</td>";
                    if (flag == 't') {
                        Baris += "<td style='display: flex;'><button type='button' class='btn btn-xs btn-danger' onclick='hapusbaris_permintaanLogistik(this, " + nomor + ")' id='hapusbaris_permintaanLogistik" + nomor + "' style='width:100%' disabled><i class='fa fa-times'></i></button><button type='button' class='btn btn-xs btn-outline-warning' onclick='editbaris_permintaanLogistik(this, " + nomor + ")' id='editbaris_permintaanLogistik" + nomor + "' style='width:100%' disabled><i class='fa fa-edit'></i></button></td>";
                        Baris += "<td>";
                    } else {
                        Baris += "<td style='display: flex;'><button type='button' class='btn btn-xs btn-danger' onclick='hapusbaris_permintaanLogistik(this, " + nomor + ")' id='hapusbaris_permintaanLogistik" + nomor + "' style='width:100%'><i class='fa fa-times'></i></button><button type='button' class='btn btn-xs btn-outline-warning' onclick='editbaris_permintaanLogistik(this, " + nomor + ")' id='editbaris_permintaanLogistik" + nomor + "' style='width:100%'><i class='fa fa-edit'></i></button></td>";
                        Baris += "<td>";
                    }
                    Baris += "<input type='text' class='form-control form-control-xs' name='permintaanLogistik_kodeBrg[]' value='" + a[i]['id_barang_logistik'] + "' disabled>";
                    Baris += "</td>";
                    Baris += "<td>";
                    Baris += "<input type='text' class='form-control form-control-xs' name='permintaanLogistik_nmBrg[]' value='" + a[i]['nama_barang'] + ' || ' + a[i]['satuan_pakai'] + "' disabled>";
                    Baris += "</td>";
                    Baris += "<td>";
                    Baris += "<input type='text' class='form-control form-control-xs' name='permintaanLogistik_qty[]' value='" + a[i]['qty'] + "' disabled>";
                    Baris += "</td>";
                    Baris += "<td style='display:none;'>";
                    Baris += "</td>";
                    Baris += "</tr>";
                    nomor++
                    /* total = +(parseInt(a[i]['qty']) * parseInt(a[i]['harga_beli'])); */
                }
                /* document.getElementById("ModPembelianLogistik_hargatotal").value = total;
                document.getElementById("VModPembelianLogistik_hargatotal").innerHTML = format_ribuan(total); */
                $('#ModPermintaanLogistik_daftrabarang tbody').append(Baris);
            }

        });
    }

    function listBarang_ModPermintaanLogistik() {

        kd_barangLogistik.onPilih(() => {
            $("#ModPermintaanLogistik_qty").trigger('focus');
            $("#ModPermintaanLogistik_qty").val(1);
        });

        $("#ModPermintaanLogistik_qty").on("keyup", function(event) {
            if (event.keyCode == 13) {
                var kode_brgLogistik = kd_barangLogistik.getValue()[0];
                var harga_beli = kd_barangLogistik.getValue()[1];
                var nm_brgLogistik = document.getElementById("ModPermintaanLogistik_nmBrg").value;
                var cekqty = document.getElementById("ModPermintaanLogistik_qty").value;
                if (cekqty != '') {
                    var qty = cekqty;
                } else {
                    var qty = '0';
                }
                /* var exp_brgLogistik = document.getElementById("ModPermintaanLogistik_exp").value; */
                var ket = document.getElementById("ModPermintaanLogistik_ket").value;
                if (kode_brgLogistik != null) {
                    if ((qty != '0') || (qty != '')) {
                        list_ModPermintaanLogistik(kode_brgLogistik, nm_brgLogistik, qty, harga_beli);
                        kosongInputPermintaanLogistik()
                    } else {
                        toastr.error("Inputan Masih Kosong!!");
                    }
                } else {
                    toastr.error("Nama barang tidak ditemukan!!");
                    kosongInputPermintaanLogistik()

                }

            }
        });

        $("#ModPermintaanLogistik_cekBrg").click(function(event) {
            var kode_brgLogistik = kd_barangLogistik.getValue()[0];
            var harga_beli = kd_barangLogistik.getValue()[1];
            var nm_brgLogistik = document.getElementById("ModPermintaanLogistik_nmBrg").value;
            var cekqty = document.getElementById("ModPermintaanLogistik_qty").value;
            if (cekqty != '') {
                var qty = cekqty;
            } else {
                var qty = '0';
            }
            /* var exp_brgLogistik = document.getElementById("ModPermintaanLogistik_exp").value; */
            var ket = document.getElementById("ModPermintaanLogistik_ket").value;
            if (kode_brgLogistik != null) {
                if ((qty != '0') || (qty != '')) {
                    list_ModPermintaanLogistik(kode_brgLogistik, nm_brgLogistik, qty, harga_beli);
                    kosongInputPermintaanLogistik()
                } else {
                    toastr.error("Inputan Masih Kosong!!");
                }
            } else {
                toastr.error("Nama barang tidak ditemukan!!");
                kosongInputPermintaanLogistik()
            }
        });
    }

    function list_ModPermintaanLogistik(kode_brgLogistik, nm_brgLogistik, qty, harga_beli) {
        var nomor = $('#ModPermintaanLogistik_daftrabarang tbody tr').length + 1;
        var Baris = '';
        Baris += "<tr>";
        Baris += "<td class='pl-0'>";
        Baris += "<input style='text-align:center;' type='text' class='form-control form-control-xs' name='permintaanLogistik_nourut[]' value='" + nomor + "' disabled>";
        Baris += "</td>";
        Baris += "<td style='display: flex;'><button type='button' class='btn btn-xs btn-danger' onclick='hapusbaris_permintaanLogistik(this, " + nomor + ")' id='hapusbaris_permintaanLogistik" + nomor + "' style='width:100%'><i class='fa fa-times'></i></button><button type='button' class='btn btn-xs btn-outline-warning' onclick='editbaris_permintaanLogistik(this, " + nomor + ")' id='editbaris_permintaanLogistik" + nomor + "' style='width:100%'><i class='fa fa-edit'></i></button></td>";
        Baris += "<td>";
        Baris += "<input type='text' class='form-control form-control-xs' name='permintaanLogistik_kodeBrg[]' value='" + kode_brgLogistik + "' disabled>";
        Baris += "</td>";
        Baris += "<td>";
        Baris += "<input type='text' class='form-control form-control-xs' name='permintaanLogistik_nmBrg[]' value='" + nm_brgLogistik + "' disabled>";
        Baris += "</td>";
        Baris += "<td>";
        Baris += "<input type='text' class='form-control form-control-xs' name='permintaanLogistik_qty[]' value='" + qty + "' disabled>";
        Baris += "</td>";
        Baris += "<td style='display:none;'>";
        Baris += "</td>";
        Baris += "</tr>";

        var getKodeBrg = document.getElementsByName('permintaanLogistik_kodeBrg[]');
        var jmlBrgLogistik = $('#ModPermintaanLogistik_daftrabarang tbody tr').length;
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
            $('#ModPermintaanLogistik_daftrabarang tbody').append(Baris);

            /* document.getElementById("VModPembelianLogistik_hargatotal").innerHTML = format_ribuan(total);

            var totalx = document.getElementById("ModPembelianLogistik_hargatotal").value;
            total = parseInt(totalx) + (parseInt(qty) * parseInt(harga_beli));
            document.getElementById("ModPembelianLogistik_hargatotal").value = total;
            document.getElementById("VModPembelianLogistik_hargatotal").innerHTML = format_ribuan(total); */

        } else {
            var urut = document.getElementById("ModPermintaanLogistik_urut").value;
            if (urut != '') {
                $('#ModPermintaanLogistik_daftrabarang tbody').append(Baris);

                /* var totalx = document.getElementById("ModPembelianLogistik_hargatotal").value;
                total = parseInt(totalx) + (parseInt(qty) * parseInt(harga_beli));
                document.getElementById("ModPembelianLogistik_hargatotal").value = total;
                document.getElementById("VModPembelianLogistik_hargatotal").innerHTML = format_ribuan(total); */

                var hapusrow = document.getElementById("hapusbaris_permintaanLogistik" + urut);
                hapusrow.click();

            } else {
                toastr.error("Obat Sudah Diinputkan!!");
            }

        }
    }

    function kosongInputPermintaanLogistik() {
        document.getElementById("ModPermintaanLogistik_nmBrg").disabled = false;
        $("#ModPermintaanLogistik_nmBrg").trigger('focus');
        document.getElementById("ModPermintaanLogistik_urut").value = '';
        document.getElementById("ModPermintaanLogistik_nmBrg").value = '';
        document.getElementById("ModPermintaanLogistik_qty").value = '';
        /* kode_brgLogistik.reset(); */
    }

    function editbaris_permintaanLogistik(btn, nomor) {

        var kode_brgLogistik = document.getElementById("ModPermintaanLogistik_daftrabarang").rows[nomor].cells[2].firstChild.value;
        var nm_brgLogistik = document.getElementById("ModPermintaanLogistik_daftrabarang").rows[nomor].cells[3].firstChild.value;
        var qty = document.getElementById("ModPermintaanLogistik_daftrabarang").rows[nomor].cells[4].firstChild.value;

        $("#ModPermintaanLogistik_qty").trigger('focus');

        kd_barangLogistik.setValue(nm_brgLogistik);
        document.getElementById("ModPermintaanLogistik_urut").value = nomor;
        document.getElementById("ModPermintaanLogistik_nmBrg").disabled = true;
        document.getElementById("ModPermintaanLogistik_qty").value = qty;
    }

    function hapusbaris_permintaanLogistik(btn, nomor) {
        document.getElementById("ModPermintaanLogistik_urut").value = '';
        var row = btn.parentNode.parentNode;

        let total = 0;
        var qty = document.getElementById("ModPermintaanLogistik_daftrabarang").rows[nomor].cells[4].firstChild.value;
        /* var hrg_beli = document.getElementById("ModPermintaanLogistik_daftrabarang").rows[nomor].cells[6].firstChild.value; */
        /* var totalx = document.getElementById("ModPermintaanLogistik_hargatotal").value;
        total = parseInt(totalx) - (parseInt(qty) * parseInt(hrg_beli));
        document.getElementById("ModPermintaanLogistik_hargatotal").value = total;
        document.getElementById("VModPermintaanLogistik_hargatotal").innerHTML = format_ribuan(total); */

        row.parentNode.removeChild(row);
        var no = 1;
        $('#ModPermintaanLogistik_daftrabarang tbody tr').each(function() {
            $(this).find('td:nth-child(1)').html("<input style='text-align:center;' type='text' class='form-control form-control-xs' name='permintaanLogistik_nourut[]' value='" + no + "' disabled>");
            $(this).find('td:nth-child(2)').html("<button type='button' class='btn btn-xs btn-danger' onclick='hapusbaris_permintaanLogistik(this, " + no + ")' id='hapusbaris_permintaanLogistik" + no + "' style='width:100%'><i class='fa fa-times'></i></button><button type='button' class='btn btn-xs btn-outline-warning' onclick='editbaris_permintaanLogistik(this, " + no + ")' id='editbaris_permintaanLogistik" + no + "' style='width:100%'><i class='fa fa-edit'></i></button>");
            no++;
        });

    }

    function params_permintaanLogistik() {
        var getKode_brg = document.getElementsByName('permintaanLogistik_kodeBrg[]');
        var get_Qty = document.getElementsByName('permintaanLogistik_qty[]');
        /* var getHargaBeli = document.getElementsByName('permintaanLogistik_harga_beli[]'); */
        var geturut = document.getElementsByName('permintaanLogistik_nourut[]');
        var count = $('#ModPermintaanLogistik_daftrabarang tbody tr').length;

        var params = {};
        params.data = [];
        for (var i = 0, iLen = count; i < iLen; i++) {
            var x = {};
            x.kd_brg = getKode_brg[i].value;
            x.qty = get_Qty[i].value;
            /* x.hrg_beli = getHargaBeli[i].value; */
            if (typeof(geturut[i].value) !== 'undefined') {
                x.urut = geturut[i].value;
            } else {
                x.urut = "";
            }

            params.data.push(x);
        }
        /* console.log(params.data); */
        return params.data;
    }

    function ModPermintaanLogistik_simpan() {
        $('#loadingModPermintaanLogistik').show();
        var param = {
            idpeg: user['id_pegawai'],
            id_permintaan: document.getElementById("ModPermintaanLogistik_id_permintaan").value,
            tglorder: document.getElementById("ModPermintaanLogistik_tglorder").value,
            dari: document.getElementById("ModPermintaanLogistik_dari").value,
            ke: document.getElementById("ModPermintaanLogistik_ke").value,
            ket: document.getElementById("ModPermintaanLogistik_ket").value,
            data: params_permintaanLogistik(),
            count: params_permintaanLogistik().length,
        };

        /* console.log(param) */

        apiPOST('Logistik/SimpanPermintaanLogistik', param, hasil => {
            if (hasil != null) {
                document.getElementById("ModPermintaanLogistik_id_permintaan").value = hasil['x'];
                $('#loadingModPermintaanLogistik').hide();
            }
        });
    }

    function ModPermintaanLogistik_kembalikeawal() {
        var idpermintaan = document.getElementById("ModPermintaanLogistik_id_permintaan").value;
        if (idpermintaan == '') {
            pertanyaan.fire({
                title: 'Kembali ke menu awal',
                html: '<span>Data Input Pembelian Belum diSimpan, Data yang sudah dientry akan hilang, tetap kembali ?</span>',
                icon: 'question',
                showCancelButton: true,
                reverseButtons: false,
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    keluarmodal_ModPermintaanLogistik();
                } else if (result.dismiss === Swal.DismissReason.cancel) {

                }
            })
        } else {
            keluarmodal_ModPermintaanLogistik();
        }
    }

    function keluarmodal_ModPermintaanLogistik() {
        $('#modal_ModPermintaanLogistik').modal('hide');
        $('.modal-backdrop').hide();
        tampilpermintaanLogistik();
        sessionStorage.clear();
    }
</script>