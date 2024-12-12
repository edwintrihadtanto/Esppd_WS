<?php
$data = json_decode($_GET['data']);
$id_pembelian_logistik       = str_replace('"', '', json_encode($data->id_pembelian_logistik));
?>

<div class="content modal fade" id="modal_ModPembelianLogistik">
    <div class="container-fluid">
        <div class="modal-dialog modal-xl" style="min-width: 100%;">
            <!-- <div class="card card-row"> -->
            <div class="modal-content" style="overflow: auto;">
                <div class="row p-1">
                    <div class="col-md-3 col-sm-6 col-12 p-1">
                        <div class="info-box mb-0">
                            <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="70">No. Faktur</td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" class="form-control form-control-xs" id="ModPembelianLogistik_id_pembelian" hidden>
                                        <input type="text" class="form-control form-control-xs" id="ModPembelianLogistik_nofak">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Suplayer</td>
                                    <td>:</td>
                                    <td>
                                        <select class="supplier_logistik_ModPembelianLogistik form-control form-control-xs" id="supplier_logistik_ModPembelianLogistik"></select>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-12 p-1">
                        <div class="info-box mb-0">
                            <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="70">Tgl. Faktur</td>
                                    <td>:</td>
                                    <td><input type="date" class="form-control form-control-xs" id="ModPembelianLogistik_tglfak"></td>
                                </tr>
                                <tr>
                                    <td>Tgl. Kedatangan</td>
                                    <td>:</td>
                                    <td><input type="date" class="form-control form-control-xs" id="ModPembelianLogistik_tgldatang"></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-12 p-1">
                        <div class="info-box mb-0">
                            <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="70">Tgl. Jatuh Tempo</td>
                                    <td>:</td>
                                    <td><input type="date" class="form-control form-control-xs" id="ModPembelianLogistik_tgltempo"></td>
                                </tr>
                                <tr>
                                    <td>Tgl. Tagih</td>
                                    <td>:</td>
                                    <td><input type="date" class="form-control form-control-xs" id="ModPembelianLogistik_tgltagih"></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-12 p-1">
                        <div class="info-box mb-0">
                            <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="70">Potongan</td>
                                    <td>:</td>
                                    <td>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text form-control-xs">Rp.</span>
                                            </div>
                                            <input type="text" class="form-control form-control-xs" id="ModPembelianLogistik_inputpotongan" disabled>
                                            <button type="button" class="btn bg-gradient-primary btn-xs" id="ModPembelianLogistik_btnpotonganfalse" onclick="ModPembelianLogistik_btnpotongan(false)"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn bg-gradient-primary btn-xs" id="ModPembelianLogistik_btnpotongantrue" onclick="ModPembelianLogistik_btnpotongan(true)" hidden><i class="fa fa-check"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="70">PPN</td>
                                    <td>:</td>
                                    <td>
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-xs" id="ModPembelianLogistik_inputppn" disabled>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text form-control-xs">%</span>
                                            </div>
                                            <button type="button" class="btn bg-gradient-primary btn-xs" id="ModPembelianLogistik_btnppnfalse" onclick="ModPembelianLogistik_btnppn(false)"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn bg-gradient-primary btn-xs" id="ModPembelianLogistik_btnppntrue" onclick="ModPembelianLogistik_btnppn(true)" hidden><i class="fa fa-check"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="70">Biaya Lain</td>
                                    <td>:</td>
                                    <td>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text form-control-xs">Rp.</span>
                                            </div>
                                            <input type="text" class="form-control form-control-xs" id="ModPembelianLogistik_inputbiayalain" disabled>
                                            <button type="button" class="btn bg-gradient-primary btn-xs" id="ModPembelianLogistik_btnbiayalainfalse" onclick="ModPembelianLogistik_btnbiayalain(false)"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn bg-gradient-primary btn-xs" id="ModPembelianLogistik_btnbiayalaintrue" onclick="ModPembelianLogistik_btnbiayalain(true)" hidden><i class="fa fa-check"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card card-row">
                    <div class="overlay-wrapper" id="loadingModPembelianLogistik">
                        <div class="overlay dark">
                            <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                        </div>
                    </div>

                    <div class="card-header p-1 darkgrey-custom">
                        <!-- <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="" id="ModPembelianLogistik_btn_tambah_barang"><i class="fa fa-plus"></i> Tambah Barang</button> -->
                        <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="ModPembelianLogistik_simpan()" id="ModPembelianLogistik_simpan"><i class="fa fa-save"></i> Simpan</button>
                        <div class="btn-group">
                            <button type="button" class="btn bg-gradient-secondary btn-xs"><i class="fa fa-print"></i> Cetak</button>
                            <button type="button" class="btn bg-gradient-secondary btn-xs dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                                <span class="sr-only"></span>
                            </button>
                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" href="#"><span><i class="fa fa-print"></i> Cetak</span></a>
                            </div>
                        </div>

                        <button type="button" class="btn bg-gradient-danger btn-xs" onclick="ModPembelianLogistik_bayar()" hidden><i class="fa fa-money-bill"></i> Bayar</button>
                        <button type="button" class="btn btn-outline-danger btn-xs" onclick="ModPembelianLogistik_kembalikeawal()"><i class="fa fa-arrow-left"></i> Kembali</button>
                        <button type="button" class="btn btn-info btn-xs" onclick="ModPembelianLogistik_refresh()"><i class="fa fa-sync-alt fa-spin"></i> Refresh Data</button>

                    </div>
                    <div class="modal-body p-1">
                        <div class="card-body p-0">
                            <div class="col-sm-12 p-1" style="max-height: 238px; overflow-x: hidden;">
                                <div class="row mb-1" id="ModPembelianLogistik_inputPembelian">
                                    <div class="input-group col-sm-4">
                                        <input type="text" class="form-control form-control-xs" id="ModPembelianLogistik_urut" disabled hidden>
                                        <input type="text" class="form-control form-control-xs" id="ModPembelianLogistik_idbarang" disabled hidden>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text form-control-xs">Nama Barang</span>
                                        </div>
                                        <input type="search" class="form-control form-control-xs" id="ModPembelianLogistik_nmBrg" autocomplete="false">
                                    </div>
                                    <div class="col-sm-1">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text form-control-xs">Qty</span>
                                            </div>
                                            <input type="number" class="form-control form-control-xs" id="ModPembelianLogistik_qty">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text form-control-xs">Disk</span>
                                            </div>
                                            <input type="number" class="form-control form-control-xs" id="ModPembelianLogistik_diskon">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text form-control-xs">%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group col-sm-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text form-control-xs">Exp</span>
                                        </div>
                                        <input type="date" class="form-control form-control-xs" id="ModPembelianLogistik_exp">
                                    </div>
                                    <div class="input-group col-sm-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text form-control-xs">Ket.</span>
                                        </div>
                                        <input type="text" class="form-control form-control-xs" id="ModPembelianLogistik_ket">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-primary btn-xs" id="ModPembelianLogistik_cekBrg"><i class="fa fa-check"></i></button>
                                            <button type="button" onclick="kosongInputPembelianLogistik()" class="btn btn-outline-primary btn-xs" onclick=""><i class="fa fa-file"></i> Baru</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <table border="0" cellpadding="0" cellspacing="0" id="ModPembelianLogistik_daftrabarang" class="table table-striped table-sm choose text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th class="pl-0" width="30" style="text-align:center;">#</th>
                                                    <th width="10"></th>
                                                    <th width="10">ID</th>
                                                    <th class="pl-0" width="100">Nama Barang</th>
                                                    <th class="pl-0" width="70" style="text-align:center;">Qty</th>
                                                    <th class="pl-0" width="70" style="text-align:center;">Diskon</th>
                                                    <th width="50">Expired</th>
                                                    <th width="50">Harga / Satuan Beli</th>
                                                    <th width="100">Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                            <thead>
                                                <tr>
                                                    <th colspan="7"></th>
                                                    <th class="text-right" width="100">Sub Total : Rp.</th>
                                                    <th id="VModPembelianLogistik_subtotal"></th>
                                                </tr>
                                                <tr>
                                                    <th colspan="7"></th>
                                                    <th class="text-right" width="100">Sub Diskon : Rp.</th>
                                                    <th id="VModPembelianLogistik_totaldiskon"></th>
                                                </tr>
                                                <tr>
                                                    <th colspan="7"></th>
                                                    <th class="text-right" width="100">Jumlah : Rp.</th>
                                                    <th id="VModPembelianLogistik_hargatotal"></th>
                                                </tr>
                                                <tr>
                                                    <th colspan="7"></th>
                                                    <th class="text-right" width="100">Potongan : Rp.</th>
                                                    <th id="VModPembelianLogistik_Potongan"></th>
                                                </tr>
                                                <tr>
                                                    <th colspan="7"></th>
                                                    <th class="text-right" width="100">PPN : Rp.</th>
                                                    <th id="VModPembelianLogistik_ppn"></th>
                                                </tr>
                                                <tr>
                                                    <th colspan="7"></th>
                                                    <th class="text-right" width="100">PPN : Rp.</th>
                                                    <th id="VModPembelianLogistik_biayalain"></th>
                                                </tr>
                                                <tr>
                                                    <th colspan="7"></th>
                                                    <th class="text-right" width="100">Grand Total : Rp.</th>
                                                    <th id="VModPembelianLogistik_grandtotal"></th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <!-- <div class="col-4">
                                        <table border="0" cellpadding="0" cellspacing="0" class="table table-striped table-sm choose">

                                            <tbody></tbody>
                                        </table>
                                    </div> -->
                                </div>

                            </div>
                        </div>
                    </div>
                    <input type="text" value="0" id="ModPembelianLogistik_hargatotal" name="ModPembelianLogistik_hargatotal" disabled hidden>
                    <input type="text" value="0" id="ModPembelianLogistik_totaldiskon" name="ModPembelianLogistik_totaldiskon" disabled hidden>
                    <input type="text" value="0" id="ModPembelianLogistik_subtotal" name="ModPembelianLogistik_subtotal" disabled hidden>
                    <input type="text" value="0" id="ModPembelianLogistik_Potongan" name="ModPembelianLogistik_Potongan" disabled hidden>
                    <input type="text" value="0" id="ModPembelianLogistik_grandtotal" name="ModPembelianLogistik_grandtotal" disabled hidden>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var id_pembelian_logistik = "<?php echo $id_pembelian_logistik ?>";

    document.getElementById("ModPembelianLogistik_tglfak").value = nowday;
    document.getElementById("ModPembelianLogistik_tgldatang").value = nowday;
    document.getElementById("ModPembelianLogistik_tgltempo").value = nowday;
    document.getElementById("ModPembelianLogistik_tgltagih").value = nowday;

    showUp_ModPembelianLogistik();
    getBarang_ModPembelianLogistik()
    listBarang_ModPembelianLogistik()
    listmodpembelianLogistik()
    getSupllierLogistik()


    function getSupllierLogistik() {
        apiPOST('Logistik/getSupllierLogistik', null, hasil => {
            var data = '';
            var a = hasil['data'];
            for (var i = 0; i < a.length; i++) {
                data += '<option value="' + a[i]['id_supplier_logistik'] + '">' + a[i]['nama_supplier'] + '</option>';
            }
            document.getElementById('supplier_logistik_ModPembelianLogistik').innerHTML = data;
        });
    }

    function ModPembelianLogistik_btnpotongan(flag) {
        if (flag == true) {
            document.getElementById("ModPembelianLogistik_btnpotongantrue").hidden = true;
            document.getElementById("ModPembelianLogistik_btnpotonganfalse").hidden = false;
            document.getElementById("ModPembelianLogistik_inputpotongan").disabled = true;
            var total = document.getElementById("ModPembelianLogistik_hargatotal").value;
            var cekpotongan = document.getElementById("ModPembelianLogistik_inputpotongan").value;
            var cekppn = document.getElementById("ModPembelianLogistik_inputppn").value;
            var cekbiayalain = document.getElementById("ModPembelianLogistik_inputbiayalain").value;
            if (cekpotongan != '') {
                var potongan = cekpotongan;
            } else {
                var potongan = '0';
            }
            if (cekppn != '' && cekppn != '0') {
                var ppn = parseInt(total) * (cekppn / 100);
            } else {
                var ppn = '0';
            }
            if (cekbiayalain != '') {
                var biayalain = cekbiayalain;
            } else {
                var biayalain = '0';
            }
            grandtotal = (parseInt(total) - parseInt(potongan)) + parseInt(ppn) + parseInt(biayalain);

            if (total != 0) {
                document.getElementById("ModPembelianLogistik_Potongan").value = potongan;
                document.getElementById("VModPembelianLogistik_Potongan").innerHTML = format_ribuan(potongan);
                document.getElementById("ModPembelianLogistik_grandtotal").value = grandtotal;
                document.getElementById("VModPembelianLogistik_grandtotal").innerHTML = format_ribuan(grandtotal);
            }

        } else {
            document.getElementById("ModPembelianLogistik_btnpotonganfalse").hidden = true;
            document.getElementById("ModPembelianLogistik_btnpotongantrue").hidden = false;
            document.getElementById("ModPembelianLogistik_inputpotongan").disabled = false;
            $("#ModPembelianLogistik_inputpotongan").trigger('focus');

        }
    }

    function ModPembelianLogistik_btnppn(flag) {
        if (flag == true) {
            document.getElementById("ModPembelianLogistik_btnppntrue").hidden = true;
            document.getElementById("ModPembelianLogistik_btnppnfalse").hidden = false;
            document.getElementById("ModPembelianLogistik_inputppn").disabled = true;
            var total = document.getElementById("ModPembelianLogistik_hargatotal").value;
            var cekpotongan = document.getElementById("ModPembelianLogistik_inputpotongan").value;
            var cekppn = document.getElementById("ModPembelianLogistik_inputppn").value;
            var cekbiayalain = document.getElementById("ModPembelianLogistik_inputbiayalain").value;
            if (cekpotongan != '') {
                var potongan = cekpotongan;
            } else {
                var potongan = '0';
            }
            if (cekppn != '' && cekppn != '0') {
                var ppn = parseInt(total) * (cekppn / 100);
            } else {
                var ppn = '0';
            }
            if (cekbiayalain != '') {
                var biayalain = cekbiayalain;
            } else {
                var biayalain = '0';
            }
            grandtotal = (parseInt(total) - parseInt(potongan)) + parseInt(ppn) + parseInt(biayalain);
            if (total != 0) {
                document.getElementById("VModPembelianLogistik_ppn").innerHTML = format_ribuan(ppn);
                document.getElementById("ModPembelianLogistik_grandtotal").value = grandtotal;
                document.getElementById("VModPembelianLogistik_grandtotal").innerHTML = format_ribuan(grandtotal);
            }

        } else {
            document.getElementById("ModPembelianLogistik_btnppnfalse").hidden = true;
            document.getElementById("ModPembelianLogistik_btnppntrue").hidden = false;
            document.getElementById("ModPembelianLogistik_inputppn").disabled = false;
            $("#ModPembelianLogistik_inputppn").trigger('focus');

        }
    }

    function ModPembelianLogistik_btnbiayalain(flag) {
        if (flag == true) {
            document.getElementById("ModPembelianLogistik_btnbiayalaintrue").hidden = true;
            document.getElementById("ModPembelianLogistik_btnbiayalainfalse").hidden = false;
            document.getElementById("ModPembelianLogistik_inputbiayalain").disabled = true;
            var total = document.getElementById("ModPembelianLogistik_hargatotal").value;
            var cekpotongan = document.getElementById("ModPembelianLogistik_inputpotongan").value;
            var cekppn = document.getElementById("ModPembelianLogistik_inputppn").value;
            var cekbiayalain = document.getElementById("ModPembelianLogistik_inputbiayalain").value;
            if (cekpotongan != '') {
                var potongan = cekpotongan;
            } else {
                var potongan = '0';
            }
            if (cekppn != '' && cekppn != '0') {
                var ppn = parseInt(total) * (cekppn / 100);
            } else {
                var ppn = '0';
            }
            if (cekbiayalain != '') {
                var biayalain = cekbiayalain;
            } else {
                var biayalain = '0';
            }
            grandtotal = (parseInt(total) - parseInt(potongan)) + parseInt(ppn) + parseInt(biayalain);
            if (total != 0) {
                document.getElementById("VModPembelianLogistik_biayalain").innerHTML = format_ribuan(biayalain);
                document.getElementById("ModPembelianLogistik_grandtotal").value = grandtotal;
                document.getElementById("VModPembelianLogistik_grandtotal").innerHTML = format_ribuan(grandtotal);
            }

        } else {
            document.getElementById("ModPembelianLogistik_btnbiayalainfalse").hidden = true;
            document.getElementById("ModPembelianLogistik_btnbiayalaintrue").hidden = false;
            document.getElementById("ModPembelianLogistik_inputbiayalain").disabled = false;
            $("#ModPembelianLogistik_inputbiayalain").trigger('focus');

        }
    }

    function listmodpembelianLogistik() {
        var param = {
            id_pembelian_logistik: id_pembelian_logistik
        };
        apiPOST('Logistik/getlistPembelianLogistik', param, hasil => {
            if (hasil['data'] != null) {
                var data = hasil['data'];
                for (var i = 0; i < 1; i++) {
                    document.getElementById("ModPembelianLogistik_id_pembelian").value = data[i]['id_pembelian_logistik'];
                    document.getElementById("ModPembelianLogistik_nofak").value = data[i]['no_faktur'];
                    document.getElementById("supplier_logistik_ModPembelianLogistik").value = data[i]['supplier'];
                    document.getElementById("ModPembelianLogistik_tglfak").value = data[i]['tgl_faktur'];
                    document.getElementById("ModPembelianLogistik_tgldatang").value = data[i]['tgl_datang'];
                    document.getElementById("ModPembelianLogistik_tgltempo").value = data[i]['tgl_tempo'];
                    document.getElementById("ModPembelianLogistik_tgltagih").value = data[i]['tgl_tagih'];
                    document.getElementById("ModPembelianLogistik_kasBank").value = data[i]['kas_bank'];
                }

                var a = hasil['datadetail'];
                var nomor = 1;
                var Baris = '';
                for (var i = 0; i < a.length; i++) {
                    Baris += "<tr>";
                    Baris += "<td class='pl-0'>";
                    Baris += "<input style='text-align:center;' type='text' class='form-control form-control-xs' name='pembelianLogistik_nourut[]' value='" + nomor + "' disabled>";
                    Baris += "</td>";
                    Baris += "<td style='display: flex;'><button type='button' class='btn btn-xs btn-danger' onclick='hapusbaris_pembelianLogistik(this, " + nomor + ")' id='hapusbaris_pembelianLogistik" + nomor + "' style='width:100%'><i class='fa fa-times'></i></button><button type='button' class='btn btn-xs btn-outline-warning' onclick='editbaris_pembelianLogistik(this, " + nomor + ")' id='editbaris_pembelianLogistik" + nomor + "' style='width:100%'><i class='fa fa-edit'></i></button></td>";
                    Baris += "<td>";
                    Baris += "<input type='text' class='form-control form-control-xs' name='pembelianLogistik_kodeBrg[]' value='" + a[i]['id_barang_logistik'] + "' disabled>";
                    Baris += "</td>";
                    Baris += "<td>";
                    Baris += "<input type='text' class='form-control form-control-xs' name='pembelianLogistik_nmBrg[]' value='" + a[i]['nama_barang'] + ' || ' + a[i]['satuan_pakai'] + "' disabled>";
                    Baris += "</td>";
                    Baris += "<td>";
                    Baris += "<input type='text' class='form-control form-control-xs' name='pembelianLogistik_qty[]' value='" + a[i]['qty'] + "' disabled>";
                    Baris += "</td>";
                    Baris += "<td>";
                    Baris += "<input type='text' class='form-control form-control-xs' name='pembelianLogistik_expBrg[]' value='" + a[i]['tgl_exp'] + "' disabled>";
                    Baris += "</td>";
                    Baris += "<td>";
                    Baris += "<input type='text' class='form-control form-control-xs' name='pembelianLogistik_harga_beli[]' value='" + format_ribuan(parseInt(a[i]['harga_beli'])) + "' disabled>";
                    Baris += "</td>";
                    Baris += "<td>";
                    Baris += "<input type='text' class='form-control form-control-xs' name='pembelianLogistik_ket[]' value='" + a[i]['ket'] + "' disabled>";
                    Baris += "</td>";
                    Baris += "<td style='display:none;'>";
                    Baris += "</td>";
                    Baris += "</tr>";
                    nomor++
                    total = +(parseInt(a[i]['qty']) * parseInt(a[i]['harga_beli']));
                }
                document.getElementById("ModPembelianLogistik_hargatotal").value = total;
                document.getElementById("VModPembelianLogistik_hargatotal").innerHTML = format_ribuan(total);
                $('#ModPembelianLogistik_daftrabarang tbody').append(Baris);
            }

        });
    }

    function ModPembelianLogistik_refresh() {
        sessionStorage.clear();
        $('#ModPembelianLogistik_daftrabarang tbody').html('');
        $('#VModPembelianLogistik_hargatotal').html('');
        $('#ModPembelianLogistik_hargatotal').val('');
    }


    function showUp_ModPembelianLogistik() {
        $("#modal_ModPembelianLogistik").modal({
            backdrop: "static"
        });
        $('#modal_ModPembelianLogistik').on('shown.bs.modal', function() {});
    }
    $('#loadingModPembelianLogistik').hide();

    function getBarang_ModPembelianLogistik() {
        var param = {
            barangcari: document.getElementById("ModPembelianLogistik_nmBrg").value,
        };

        kd_barangLogistik = new AutoComplete("ModPembelianLogistik_nmBrg");
        apiPOST('Logistik/getBarangLogistik', param, hasil => {
            if (hasil !== null) {
                var list = hasil['data'];
                list.forEach(item => {
                    kd_barangLogistik.addData([item['id_barang_logistik'], item['harga_beli']], item['nama_barang'] + ' || ' + item['satuan_beli']);
                });
            }
        });
    }


    function listBarang_ModPembelianLogistik() {

        kd_barangLogistik.onPilih(() => {
            $("#ModPembelianLogistik_qty").trigger('focus');
            $("#ModPembelianLogistik_qty").val(1);
        });

        $("#ModPembelianLogistik_qty").on("keyup", function(event) {
            if (event.keyCode == 13) {
                $("#ModPembelianLogistik_diskon").trigger('focus');
            }
        });

        $("#ModPembelianLogistik_diskon").on("keyup", function(event) {
            if (event.keyCode == 13) {
                $("#ModPembelianLogistik_exp").trigger('focus');
            }
        });

        $("#ModPembelianLogistik_exp").on("keyup", function(event) {
            if (event.keyCode == 13) {
                $("#ModPembelianLogistik_ket").trigger('focus');
            }
        });

        $("#ModPembelianLogistik_ket").on("keyup", function(event) {
            if (event.keyCode == 13) {
                var kode_brgLogistik = kd_barangLogistik.getValue()[0];
                var harga_beli = kd_barangLogistik.getValue()[1];
                var nm_brgLogistik = document.getElementById("ModPembelianLogistik_nmBrg").value;
                var diskon = document.getElementById("ModPembelianLogistik_diskon").value;
                var cekqty = document.getElementById("ModPembelianLogistik_qty").value;
                var cekpotongan = document.getElementById("ModPembelianLogistik_inputpotongan").value;
                var cekppn = document.getElementById("ModPembelianLogistik_inputppn").value;
                var cekbiayalain = document.getElementById("ModPembelianLogistik_inputbiayalain").value;
                if (cekqty != '') {
                    var qty = cekqty;
                } else {
                    var qty = '0';
                }
                if (cekpotongan != '') {
                    var potongan = cekpotongan;
                } else {
                    var potongan = '0';
                }
                if (cekppn != '') {
                    var ppn = cekppn;
                } else {
                    var ppn = '0';
                }
                if (cekbiayalain != '') {
                    var biayalain = cekbiayalain;
                } else {
                    var biayalain = '0';
                }
                var exp_brgLogistik = document.getElementById("ModPembelianLogistik_exp").value;
                var ket = document.getElementById("ModPembelianLogistik_ket").value;
                if (kode_brgLogistik != null) {
                    if ((qty != '0') || (qty != '') || (exp_brgLogistik != '')) {
                        tampilkan_barangLogistik(kode_brgLogistik, nm_brgLogistik, qty, exp_brgLogistik, ket, harga_beli, diskon, potongan, ppn, biayalain);
                        kosongInputPembelianLogistik()
                    } else {
                        toastr.error("Inputan Masih Kosong!!");
                    }
                } else {
                    toastr.error("Nama barang tidak ditemukan!!");
                    kosongInputPembelianLogistik()

                }

            }
        });

        $("#ModPembelianLogistik_cekBrg").click(function(event) {
            var kode_brgLogistik = kd_barangLogistik.getValue()[0];
            var harga_beli = kd_barangLogistik.getValue()[1];
            var nm_brgLogistik = document.getElementById("ModPembelianLogistik_nmBrg").value;
            var diskon = document.getElementById("ModPembelianLogistik_diskon").value;
            var cekqty = document.getElementById("ModPembelianLogistik_qty").value;
            var cekpotongan = document.getElementById("ModPembelianLogistik_inputpotongan").value;
            if (cekqty != '') {
                var qty = cekqty;
            } else {
                var qty = '0';
            }
            if (cekpotongan != '') {
                var potongan = cekpotongan;
            } else {
                var potongan = '0';
            }
            if (cekppn != '') {
                var ppn = cekppn;
            } else {
                var ppn = '0';
            }
            if (cekbiayalain != '') {
                var biayalain = cekbiayalain;
            } else {
                var biayalain = '0';
            }
            var exp_brgLogistik = document.getElementById("ModPembelianLogistik_exp").value;
            var ket = document.getElementById("ModPembelianLogistik_ket").value;
            if (kode_brgLogistik != null) {
                if ((qty != '0') || (qty != '') || (exp_brgLogistik != '')) {
                    tampilkan_barangLogistik(kode_brgLogistik, nm_brgLogistik, qty, exp_brgLogistik, ket, harga_beli, diskon, potongan, ppn, biayalain);
                    kosongInputPembelianLogistik()
                } else {
                    toastr.error("Inputan Masih Kosong!!");
                }
            } else {
                toastr.error("Nama barang tidak ditemukan!!");
                kosongInputPembelianLogistik()

            }
        });

    }

    function tampilkan_barangLogistik(kode_brgLogistik, nm_brgLogistik, qty, exp_brgLogistik, ket, harga_beli, diskon, potongan, ppn, biayalain) {
        var nomor = $('#ModPembelianLogistik_daftrabarang tbody tr').length + 1;
        var Baris = '';
        Baris += "<tr>";
        Baris += "<td class='pl-0'>";
        Baris += "<input style='text-align:center;' type='text' class='form-control form-control-xs' name='pembelianLogistik_nourut[]' value='" + nomor + "' disabled>";
        Baris += "</td>";
        Baris += "<td style='display: flex;'><button type='button' class='btn btn-xs btn-danger' onclick='hapusbaris_pembelianLogistik(this, " + nomor + ")' id='hapusbaris_pembelianLogistik" + nomor + "' style='width:100%'><i class='fa fa-times'></i></button><button type='button' class='btn btn-xs btn-outline-warning' onclick='editbaris_pembelianLogistik(this, " + nomor + ")' id='editbaris_pembelianLogistik" + nomor + "' style='width:100%'><i class='fa fa-edit'></i></button></td>";
        Baris += "<td>";
        Baris += "<input type='text' class='form-control form-control-xs' name='pembelianLogistik_kodeBrg[]' value='" + kode_brgLogistik + "' disabled>";
        Baris += "</td>";
        Baris += "<td>";
        Baris += "<input type='text' class='form-control form-control-xs' name='pembelianLogistik_nmBrg[]' value='" + nm_brgLogistik + "' disabled>";
        Baris += "</td>";
        Baris += "<td>";
        Baris += "<input type='text' class='form-control form-control-xs' name='pembelianLogistik_qty[]' value='" + qty + "' disabled>";
        Baris += "</td>";
        Baris += "<td>";
        Baris += "<input type='text' class='form-control form-control-xs' name='pembelianLogistik_disc[]' value='" + diskon + "' disabled>";
        Baris += "</td>";
        Baris += "<td>";
        Baris += "<input type='text' class='form-control form-control-xs' name='pembelianLogistik_expBrg[]' value='" + exp_brgLogistik + "' disabled>";
        Baris += "</td>";
        Baris += "<td>";
        Baris += "<input type='text' class='form-control form-control-xs' name='pembelianLogistik_harga_beli[]' value='" + harga_beli + "' disabled>";
        Baris += "</td>";
        Baris += "<td>";
        Baris += "<input type='text' class='form-control form-control-xs' name='pembelianLogistik_ket[]' value='" + ket + "' disabled>";
        Baris += "</td>";
        Baris += "<td style='display:none;'>";
        Baris += "</td>";
        Baris += "</tr>";

        var getKodeBrg = document.getElementsByName('pembelianLogistik_kodeBrg[]');
        var jmlBrgLogistik = $('#ModPembelianLogistik_daftrabarang tbody tr').length;
        let subtotal = 0;
        let total = 0;
        let totaldiskon = 0;
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
            $('#ModPembelianLogistik_daftrabarang tbody').append(Baris);

            /* document.getElementById("VModPembelianLogistik_hargatotal").innerHTML = format_ribuan(total); */

            var subtotalx = document.getElementById("ModPembelianLogistik_subtotal").value;
            var totaldiskonx = document.getElementById("ModPembelianLogistik_totaldiskon").value;
            cekdiskon = (diskon / 100) * parseInt(harga_beli);
            disc = parseInt(harga_beli) - parseInt(cekdiskon)
            subtotal = parseInt(subtotalx) + (parseInt(qty) * parseInt(harga_beli));
            totaldiskon = parseInt(totaldiskonx) + parseInt(cekdiskon);
            total = parseInt(subtotal) - parseInt(totaldiskon);
            cekppn = parseInt(total) * (ppn / 100);
            grandtotal = (parseInt(total) - parseInt(potongan)) + parseInt(cekppn) + parseInt(biayalain);
            document.getElementById("ModPembelianLogistik_subtotal").value = subtotal;
            document.getElementById("VModPembelianLogistik_subtotal").innerHTML = format_ribuan(subtotal);
            document.getElementById("ModPembelianLogistik_hargatotal").value = total;
            document.getElementById("VModPembelianLogistik_hargatotal").innerHTML = format_ribuan(total);
            document.getElementById("ModPembelianLogistik_totaldiskon").value = totaldiskon;
            document.getElementById("VModPembelianLogistik_totaldiskon").innerHTML = format_ribuan(totaldiskon);
            document.getElementById("ModPembelianLogistik_Potongan").value = potongan;
            document.getElementById("VModPembelianLogistik_Potongan").innerHTML = format_ribuan(potongan);
            document.getElementById("ModPembelianLogistik_grandtotal").value = grandtotal;
            document.getElementById("VModPembelianLogistik_grandtotal").innerHTML = format_ribuan(grandtotal);
            document.getElementById("VModPembelianLogistik_ppn").innerHTML = format_ribuan(cekppn);
            document.getElementById("VModPembelianLogistik_biayalain").innerHTML = format_ribuan(biayalain);



        } else {
            var urut = document.getElementById("ModPembelianLogistik_urut").value;
            if (urut != '') {
                $('#ModPembelianLogistik_daftrabarang tbody').append(Baris);

                var subtotalx = document.getElementById("ModPembelianLogistik_subtotal").value;
                var totaldiskonx = document.getElementById("ModPembelianLogistik_totaldiskon").value;
                cekdiskon = (diskon / 100) * parseInt(harga_beli);
                disc = parseInt(harga_beli) - parseInt(cekdiskon);
                subtotal = parseInt(subtotalx) + (parseInt(qty) * parseInt(harga_beli));
                totaldiskon = parseInt(totaldiskonx) + parseInt(cekdiskon);
                total = parseInt(subtotal) - parseInt(totaldiskon);
                grandtotal = (parseInt(total) - parseInt(potongan)) + parseInt(cekppn) + parseInt(biayalain);
                document.getElementById("ModPembelianLogistik_subtotal").value = subtotal;
                document.getElementById("VModPembelianLogistik_subtotal").innerHTML = format_ribuan(subtotal);
                document.getElementById("ModPembelianLogistik_hargatotal").value = total;
                document.getElementById("VModPembelianLogistik_hargatotal").innerHTML = format_ribuan(total);
                document.getElementById("ModPembelianLogistik_totaldiskon").value = totaldiskon;
                document.getElementById("VModPembelianLogistik_totaldiskon").innerHTML = format_ribuan(totaldiskon);
                document.getElementById("ModPembelianLogistik_Potongan").value = potongan;
                document.getElementById("VModPembelianLogistik_Potongan").innerHTML = format_ribuan(potongan);
                document.getElementById("ModPembelianLogistik_grandtotal").value = grandtotal;
                document.getElementById("VModPembelianLogistik_grandtotal").innerHTML = format_ribuan(grandtotal);
                document.getElementById("VModPembelianLogistik_ppn").innerHTML = format_ribuan(cekppn);
                document.getElementById("VModPembelianLogistik_biayalain").innerHTML = format_ribuan(biayalain);


                var hapusrow = document.getElementById("hapusbaris_pembelianLogistik" + urut);
                hapusrow.click();

            } else {
                toastr.error("Barang Sudah Diinputkan!!");
            }

        }
    }

    function kosongInputPembelianLogistik() {
        document.getElementById("ModPembelianLogistik_nmBrg").disabled = false;
        $("#ModPembelianLogistik_nmBrg").trigger('focus');
        document.getElementById("ModPembelianLogistik_urut").value = '';
        document.getElementById("ModPembelianLogistik_nmBrg").value = '';
        document.getElementById("ModPembelianLogistik_qty").value = '';
        document.getElementById("ModPembelianLogistik_diskon").value = '';
        document.getElementById("ModPembelianLogistik_exp").value = '';
        document.getElementById("ModPembelianLogistik_ket").value = '';
        /* kode_brgLogistik.reset(); */
    }

    function editbaris_pembelianLogistik(btn, nomor) {

        var kode_brgLogistik = document.getElementById("ModPembelianLogistik_daftrabarang").rows[nomor].cells[2].firstChild.value;
        var nm_brgLogistik = document.getElementById("ModPembelianLogistik_daftrabarang").rows[nomor].cells[3].firstChild.value;
        var qty = document.getElementById("ModPembelianLogistik_daftrabarang").rows[nomor].cells[4].firstChild.value;
        var disc = document.getElementById("ModPembelianLogistik_daftrabarang").rows[nomor].cells[5].firstChild.value;
        var exp = document.getElementById("ModPembelianLogistik_daftrabarang").rows[nomor].cells[6].firstChild.value;
        var ket = document.getElementById("ModPembelianLogistik_daftrabarang").rows[nomor].cells[8].firstChild.value;

        $("#ModPembelianLogistik_qty").trigger('focus');

        kd_barangLogistik.setValue(nm_brgLogistik);
        document.getElementById("ModPembelianLogistik_urut").value = nomor;
        document.getElementById("ModPembelianLogistik_nmBrg").disabled = true;
        document.getElementById("ModPembelianLogistik_qty").value = qty;
        document.getElementById("ModPembelianLogistik_diskon").value = disc;
        document.getElementById("ModPembelianLogistik_exp").value = exp;
        document.getElementById("ModPembelianLogistik_ket").value = ket;
    }

    function hapusbaris_pembelianLogistik(btn, nomor) {
        document.getElementById("ModPembelianLogistik_urut").value = '';
        var row = btn.parentNode.parentNode;

        let total = 0;
        var qty = document.getElementById("ModPembelianLogistik_daftrabarang").rows[nomor].cells[4].firstChild.value;
        var diskon = document.getElementById("ModPembelianLogistik_daftrabarang").rows[nomor].cells[5].firstChild.value;
        var hrg_beli = document.getElementById("ModPembelianLogistik_daftrabarang").rows[nomor].cells[7].firstChild.value;
        var totalx = document.getElementById("ModPembelianLogistik_hargatotal").value;

        var cekpotongan = document.getElementById("ModPembelianLogistik_inputpotongan").value;
        if (cekpotongan != '') {
            var potongan = cekpotongan;
        } else {
            var potongan = '0';
        }

        var subtotalx = document.getElementById("ModPembelianLogistik_subtotal").value;
        var totaldiskonx = document.getElementById("ModPembelianLogistik_totaldiskon").value;
        cekdiskon = (diskon / 100) * parseInt(hrg_beli);
        disc = parseInt(hrg_beli) - parseInt(cekdiskon)
        subtotal = parseInt(subtotalx) - (parseInt(qty) * parseInt(hrg_beli));
        totaldiskon = parseInt(totaldiskonx) - parseInt(cekdiskon);
        total = parseInt(subtotal) - parseInt(totaldiskon);
        grandtotal = (parseInt(subtotal) - parseInt(totaldiskon)) - parseInt(potongan);
        document.getElementById("ModPembelianLogistik_subtotal").value = subtotal;
        document.getElementById("VModPembelianLogistik_subtotal").innerHTML = format_ribuan(subtotal);
        document.getElementById("ModPembelianLogistik_hargatotal").value = total;
        document.getElementById("VModPembelianLogistik_hargatotal").innerHTML = format_ribuan(total);
        document.getElementById("ModPembelianLogistik_totaldiskon").value = totaldiskon;
        document.getElementById("VModPembelianLogistik_totaldiskon").innerHTML = format_ribuan(totaldiskon);
        document.getElementById("ModPembelianLogistik_Potongan").value = potongan;
        document.getElementById("VModPembelianLogistik_Potongan").innerHTML = format_ribuan(potongan);
        document.getElementById("ModPembelianLogistik_grandtotal").value = grandtotal;
        document.getElementById("VModPembelianLogistik_grandtotal").innerHTML = format_ribuan(grandtotal);
        /* total = parseInt(totalx) - (parseInt(qty) * parseInt(hrg_beli));
        console.log(total)
        document.getElementById("ModPembelianLogistik_hargatotal").value = total;
        document.getElementById("VModPembelianLogistik_hargatotal").innerHTML = format_ribuan(total); */

        row.parentNode.removeChild(row);
        var no = 1;
        $('#ModPembelianLogistik_daftrabarang tbody tr').each(function() {
            $(this).find('td:nth-child(1)').html("<input style='text-align:center;' type='text' class='form-control form-control-xs' name='pembelianLogistik_nourut[]' value='" + no + "' disabled>");
            $(this).find('td:nth-child(2)').html("<button type='button' class='btn btn-xs btn-danger' onclick='hapusbaris_pembelianLogistik(this, " + no + ")' id='hapusbaris_pembelianLogistik" + no + "' style='width:100%'><i class='fa fa-times'></i></button><button type='button' class='btn btn-xs btn-outline-warning' onclick='editbaris_pembelianLogistik(this, " + no + ")' id='editbaris_pembelianLogistik" + no + "' style='width:100%'><i class='fa fa-edit'></i></button>");
            no++;
        });

    }

    function params_pembelianLogistik() {
        var getKode_brg = document.getElementsByName('pembelianLogistik_kodeBrg[]');
        var get_Qty = document.getElementsByName('pembelianLogistik_qty[]');
        var getHargaBeli = document.getElementsByName('pembelianLogistik_harga_beli[]');
        var getKet = document.getElementsByName('pembelianLogistik_ket[]');
        var getExp = document.getElementsByName('pembelianLogistik_expBrg[]');
        var geturut = document.getElementsByName('pembelianLogistik_nourut[]');
        var count = $('#ModPembelianLogistik_daftrabarang tbody tr').length;

        var params = {};
        params.data = [];
        for (var i = 0, iLen = count; i < iLen; i++) {
            var x = {};
            x.kd_brg = getKode_brg[i].value;
            x.qty = get_Qty[i].value;
            x.hrg_beli = getHargaBeli[i].value;
            x.exp = getExp[i].value;
            x.ket = getKet[i].value;
            if (typeof(geturut[i].value) !== 'undefined') {
                x.urut = geturut[i].value;
            } else {
                x.urut = "";
            }

            params.data.push(x);
        }
        return params.data;
    }

    function ModPembelianLogistik_simpan() {
        $('#loadingModPembelianLogistik').show();
        var cekpotongan = document.getElementById("ModPembelianLogistik_inputpotongan").value;
        if (cekpotongan != '') {
            var potongan = cekpotongan;
        } else {
            var potongan = '0';
        }

        var param = {
            id_pembelian: document.getElementById("ModPembelianLogistik_id_pembelian").value,
            nofak: document.getElementById("ModPembelianLogistik_nofak").value,
            supplier: document.getElementById("supplier_logistik_ModPembelianLogistik").value,
            tglfak: document.getElementById("ModPembelianLogistik_tglfak").value,
            tgldatang: document.getElementById("ModPembelianLogistik_tgldatang").value,
            tgltempo: document.getElementById("ModPembelianLogistik_tgltempo").value,
            tgltagih: document.getElementById("ModPembelianLogistik_tgltagih").value,
            ptg: potongan,
            /* kasbank: document.getElementById("ModPembelianLogistik_kasBank").value, */
            jumlahtotal: document.getElementById('ModPembelianLogistik_hargatotal').value,
            id_peg: user['id_pegawai'],
            data: params_pembelianLogistik(),
            count: params_pembelianLogistik().length,
        };

        apiPOST('Logistik/SimpanPembelianLogistik', param, hasil => {
            if (hasil != null) {
                /* document.getElementById("erm_eresepRWJ_idresep").value = hasil['x']; */
                $('#loadingModPembelianLogistik').hide();
            }
        });
    }

    function ModPembelianLogistik_kembalikeawal() {
        var idbarang = document.getElementById("ModPembelianLogistik_idbarang").value;
        if (idbarang == '') {
            pertanyaan.fire({
                title: 'Kembali ke menu awal',
                html: '<span>Data Input Pembelian Belum diSimpan, Data yang sudah dientry akan hilang, tetap kembali ?</span>',
                icon: 'question',
                showCancelButton: true,
                reverseButtons: false,
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    keluarmodal_ModPembelianLogistik();
                } else if (result.dismiss === Swal.DismissReason.cancel) {

                }
            })
        } else {
            keluarmodal_ModPembelianLogistik();
        }
    }

    function keluarmodal_ModPembelianLogistik() {
        $('#modal_ModPembelianLogistik').modal('hide');
        $('.modal-backdrop').hide();
        tampilPembelianLogistik();
        sessionStorage.clear();
    }
</script>