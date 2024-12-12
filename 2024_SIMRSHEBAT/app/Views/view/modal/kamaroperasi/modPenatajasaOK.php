<?php
$data = json_decode($_GET['data']);
$no_rm  = str_replace('"', '', json_encode($data->no_rm));
$id_kunjungan  = str_replace('"', '', json_encode($data->id_kunjungan));
$id_transaksi  = str_replace('"', '', json_encode($data->id_transaksi));
$namapasien  = str_replace('"', '', json_encode($data->namapasien));
$alamat  = str_replace('"', '', json_encode($data->alamat));
$umur  = str_replace('"', '', json_encode($data->umur));
$jenkel  = str_replace('"', '', json_encode($data->jenkel));
$id_dokter  = str_replace('"', '', json_encode($data->id_dokter));
$dokter  = str_replace('"', '', json_encode($data->dokter));
$penjamin  = str_replace('"', '', json_encode($data->penjamin));
$nokartu  = str_replace('"', '', json_encode($data->nokartu));
$id_unit  = str_replace('"', '', json_encode($data->id_unit));
$unit  = str_replace('"', '', json_encode($data->unit));
$tglkunjungan  = str_replace('"', '', json_encode($data->tglkunjungan));
$id_penjamin  = str_replace('"', '', json_encode($data->id_penjamin));
?>
<section class="content pb-0" id="modalbokingKamarOK">
    <div class="container-fluid h-100">
        <div class="row p-1">
            <div class="col-md-4 col-sm-6 col-12 p-1">
                <div class="info-box mb-0">
                    <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="100">No. RM</td>
                            <td>:</td>
                            <td><input type="text" name="no_rm" class="form-control form-control-xs" id="modJadwalOKnoRM" readonly></td>
                        </tr>
                        <tr>
                            <td>Nama Pasien</td>
                            <td>:</td>
                            <td><input type="text" class="form-control form-control-xs" id="modPenataJasaOKnama" readonly></td>
                        </tr>
                        <tr>
                            <td>Usia</td>
                            <td>:</td>
                            <td><input type="text" class="form-control form-control-xs" id="modPenataJasaOKUsia" readonly></td>
                        </tr>
                        <tr>
                            <td width="100">Dokter</td>
                            <td>:</td>
                            <td><input type="text" class="form-control form-control-xs" id="modPenataJasaOKdokter" readonly>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-12 p-1">
                <div class="info-box mb-0">
                    <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="100">Alamat</td>
                            <td>:</td>
                            <td>
                                <input type="text" class="form-control form-control-xs" id="modPenataJasaOKalamat" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td width="100">Jenis Kelamin</td>
                            <td>:</td>
                            <td>
                                <input type="text" class="form-control form-control-xs" id="modPenataJasajenkel" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td width="100">Penjamin</td>
                            <td>:</td>
                            <td>
                                <select onchange="gantiPenjamintindakanOK();" class="form-control form-control-xs" id="modPenataJasaOKpenjamin"></select>
                            </td>
                        </tr>
                        <tr>
                            <td width="100">No. Kartu</td>
                            <td>:</td>
                            <td>
                                <input type="text" class="form-control form-control-xs" id="modPenataJasaOkNokartu" readonly>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class=" col-md-4 col-sm-6 col-12 p-1">
                <div class="info-box mb-0">
                    <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="100">No. SEP</td>
                            <td>:</td>
                            <td><input type="text" class="form-control form-control-xs" id="modPenataJasaOKsep" readonly></td>
                        </tr>
                        <tr>
                            <td>Layanan</td>
                            <td>:</td>
                            <td><input type="text" class="form-control form-control-xs" id="modPenataJasaOKlayanan" readonly></td>
                        </tr>
                        <tr>
                            <td>ID kunjungan</td>
                            <td>:</td>
                            <td>
                                <input type="text" class="form-control form-control-xs" id="modPenataJasaOKidkunj" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>Tgl Kunjungan</td>
                            <td>:</td>
                            <td>
                                <input class="form-control form-control-xs" id="modPenataJasaOKtglkunj" readonly>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="card card-row">
            <!-- <div class="overlay-wrapper" id="loading_modal_eresepRWJAPT">
                <div class="overlay dark">
                    <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                </div>
            </div> -->

            <div class="card-header p-1 darkgrey-custom">
                <button type="button" class="btn bg-gradient-info btn-xs" id="tombolTambahProdukbaruOK"><i class="fa fa-plus"></i> Tambah Produk</button>
                <button type="button" class="btn bg-gradient-secondary btn-xs" id="tombolSimpanSemuaTindakanOK" onclick="modPenataJasaOKsimpanTindakan()"><i class="fa fa-save"></i> Simpan</button>
                <button type="button" class="btn btn-warning btn-xs" onclick="kosongInputProduktindakanOK()"><i class="fa fa-sync-alt fa-spin"></i> Refresh Data</button>
                <button type="button" class="btn btn-outline-danger btn-xs" onclick="kembaliKePenataJasaOK()"><i class="fa fa-arrow-left"></i> Kembali</button>
            </div>
            <div class="modal-body p-1">
                <div class="card-body p-0">
                    <ul class="nav nav-tabs" id="inputTindakanPembedahanOK-content-above-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" onclick="tabInputTindakanOK();" href="#inputTindakanOK" role="tab" aria-selected="true">Input Tindakan</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="inputTindakanPembedahanOK-content-above-tabContent">
                        <div class="tab-pane p-0 fade active show" id="inputTindakanOK" role="tabpanel">
                            <div class="col-sm-12 p-1" style="max-height: 238px; overflow-x: hidden;">
                                <div class="row mt-1">
                                    <div class="input-group col-sm-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text form-control-xs">Kode/Nama Produk</span>
                                        </div>
                                        <input type="text" class="form-control form-control-xs" id="modPenataJasaOKnourut" disabled hidden>
                                        <input type="text" class="form-control form-control-xs" id="modPenataJasaOKidprd" disabled hidden>
                                        <input type="text" id="jenisProdukTindakanOK" class="form-control form-control-xs" placeholder="Masukan Kode Atau Nama">
                                    </div>
                                    <div class="input-group col-sm-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text form-control-xs">Banyak</span>
                                        </div>
                                        <input type="number" id="banyakTindakanOK" class="form-control form-control-xs">
                                    </div>
                                    <div class="input-group col-sm-2">
                                        <button type="button" class="btn btn-primary btn-xs" id="modPenataJasaOKcheckproduk"><i class="fa fa-check"></i></button>
                                        <button type="button" onclick="addnewProdukTindakanOK();" id="tombolTambahBaruProdukOK" class="btn btn-xs bg-info"><i class="fas fa-check"></i> Tambah</button>
                                    </div>
                                </div>
                                <table id="modPenataJasaOKtableproduk" class="table table-striped table-sm choose">
                                    <thead>
                                        <tr>
                                            <th width="20">No</th>
                                            <th width="60">Act</th>
                                            <th width="60">ID</th>
                                            <th>Nama Produk</th>
                                            <th width="100">Banyak</th>
                                            <th width="100">Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer p-1">
                <div class="input-group" style="justify-content: right; font-weight: bold;">
                    <h4>Rp.&nbsp;</h4>
                    <h4 id="hargaTotalProdukOK" name="hargaTotalProdukOK"></h4>
                </div>
            </div>
            <input type="text" value="0" id="OKHargaTotalTindakan" disabled>
        </div>
    </div>
</section>

<script>
    var no_rm = '<?php echo $no_rm; ?>';
    var nama = '<?php echo $namapasien; ?>';
    var alamat = '<?php echo $alamat; ?>';
    var umur = '<?php echo $umur; ?>';
    var jenkel = '<?php echo $jenkel; ?>';
    var dokter = '<?php echo $dokter; ?>';
    var penjamin = '<?php echo $penjamin; ?>';
    var nokartu = '<?php echo $nokartu; ?>';
    var unit = '<?php echo $unit; ?>';
    var tglkunjungan = '<?php echo $tglkunjungan; ?>';
    var nosjp = [];
    var paramIdPenjaminnosjp = ['id_penjamin', 'no_sjp', 'no_sjp'];
    var id_transaksi = "<?php echo $id_transaksi; ?>";
    var id_kunjungan = "<?php echo $id_kunjungan; ?>";
    var id_unit = "<?php echo $id_unit; ?>";
    var id_dokter = "<?php echo $id_dokter; ?>";
    var id_penjamin = "<?php echo $id_penjamin; ?>";
    modPenataJasaOKaddProduk();
    getListProdukOK();
    // modPenataJasaOKgetListProduk();
    // var produkOK;
    document.getElementById('modJadwalOKnoRM').value = no_rm;
    document.getElementById('modPenataJasaOKtglkunj').value = tglkunjungan;
    document.getElementById('modPenataJasaOKnama').value = nama;
    document.getElementById('modPenataJasaOKalamat').value = alamat;
    document.getElementById('modPenataJasaOKUsia').value = umur;
    document.getElementById('modPenataJasaOKdokter').value = dokter;
    document.getElementById('modPenataJasaOkNokartu').value = nokartu;
    document.getElementById('modPenataJasaOKidkunj').value = id_kunjungan;
    document.getElementById('modPenataJasaOKlayanan').value = unit;
    if (jenkel == 't') {
        document.getElementById('modPenataJasajenkel').value = 'Laki-laki';
    } else {
        document.getElementById('modPenataJasajenkel').value = 'Perempuan';
    }

    function modPenataJasaOKaddProduk() {
        var param = {
            id_unit: id_unit,
            id_penjamin: id_penjamin
        };

        produkOK = new AutoComplete("jenisProdukTindakanOK");
        apiPOST('Kamaroperasi/getOkproduk', param, hasil => {
            if (hasil !== null) {
                var list = hasil['data'];
                list.forEach(baru => {
                    produkOK.addData([baru['id_produk'], baru['harga'], baru['id_tarif']], baru['nama_produk'] + '||' + baru['kd_produk']);
                });
            }
        });
    }

    function getListProdukOK() {
        $("#jenisProdukTindakanOK").on("keyup", function(event) {

            if (event.keyCode == 13) {
                $("#banyakTindakanOK").trigger('focus');
                $("#banyakTindakanOK").val(1);
            }
        });
        $("#banyakTindakanOK").on("keyup", function(event) {
            if (event.keyCode == 13) {
                var kodeProdukOK = produkOK.getValue()[0];
                var harga = produkOK.getValue()[1];
                var idTarifOK = produkOK.getValue()[2];
                // var idJenisComp = produkOK.getValue()[3];
                var nmBarangOK = document.getElementById("jenisProdukTindakanOK").value;
                var cekqty = document.getElementById("banyakTindakanOK").value;
                if (cekqty != '') {
                    var qty = cekqty;
                } else {
                    var qty = '0';
                }
                if (kodeProdukOK != null) {
                    if ((qty != '0') || (qty != '')) {
                        tampilkanProduktindakanOK(kodeProdukOK, nmBarangOK, qty, harga, idTarifOK);
                        kosongInputProduktindakanOK();
                    } else {
                        toastr.error("Inputan Masih Kosong!!");
                    }
                } else {
                    toastr.error("Nama Produk tidak ditemukan!!");
                    kosongInputProduktindakanOK();
                }

                // console.log(idTarifOK)
            }
        });

        $("#modPenataJasaOKcheckproduk").click(function(event) {
            var kodeProdukOK = produkOK.getValue()[0];
            var harga = produkOK.getValue()[1];
            var nmBarangOK = document.getElementById("jenisProdukTindakanOK").value;
            var cekqty = document.getElementById("banyakTindakanOK").value;
            if (cekqty != '') {
                var qty = cekqty;
            } else {
                var qty = '0';
            }
            if (kodeProdukOK != null) {
                if ((qty != '0') || (qty != '')) {
                    tampilkanProduktindakanOK(kodeProdukOK, nmBarangOK, qty, harga, idTarifOK);
                    kosongInputProduktindakanOK();
                } else {
                    toastr.error("Inputan Masih Kosong!!");
                }
            } else {
                toastr.error("Nama Produk tidak ditemukan!!");
                kosongInputProduktindakanOK();
            }
        });
    }

    $("#tombolTambahBaruProdukOK").click(function(event) {
        kosongInputProduktindakanOK();
    });

    function tampilkanProduktindakanOK(kodeProdukOK, nmBarangOK, qty, harga, idTarifOK) {
        var nomor = $('#modPenataJasaOKtableproduk tbody tr').length + 1;
        var Baris = '';
        Baris += "<tr>";
        Baris += "<td class='pl-0'>";
        Baris += "<input style='text-align:center;' type='text' class='form-control form-control-xs' name='penataJasaOKnourut[]' value='" + nomor + "' disabled>";
        Baris += "</td>";
        Baris += "<td style='display: flex;'><button type='button' class='btn btn-xs btn-danger' onclick='hapusBarisrodukOK(this, " + nomor + ")' id='hapusBarisrodukOK" + nomor + "' style='width:100%'><i class='fa fa-times'></i></button><button type='button' class='btn btn-xs btn-outline-warning' onclick='editBarisProdukOK(this, " + nomor + ")' id='editBarisProdukOK" + nomor + "' style='width:100%'><i class='fa fa-edit'></i></button></td>";
        Baris += "<td>";
        Baris += "<input type='text' class='form-control form-control-xs' name='modPenataJasaOKkodeProduk[]' value='" + kodeProdukOK + "' disabled>";
        Baris += "</td>";
        Baris += "<td>";
        Baris += "<input type='text' class='form-control form-control-xs' name='modPenataJasaOKnamaProduk[]' value='" + nmBarangOK + "' disabled>";
        Baris += "</td>";
        Baris += "<td>";
        Baris += "<input type='text' class='form-control form-control-xs' name='modPenataJasaOKQty[]' value='" + qty + "' disabled>";
        Baris += "</td>";
        Baris += "<td>";
        Baris += "<input type='text' class='form-control form-control-xs' name='hargaTotalProdukJasaOK[]' value='" + format_ribuan(parseInt(harga)) + "' disabled>";
        Baris += "</td>";
        Baris += "<td class='pl-0'>";
        Baris += "<input style='text-align:center;' type='text' class='form-control form-control-xs' name='idTarifprodukOK[]' value='" + idTarifOK + "' disabled hidden>";
        Baris += "</td>";
        Baris += "<td style='display:none;'>";
        Baris += "</td>";
        Baris += "</tr>";

        var getKodeBrg = document.getElementsByName('modPenataJasaOKkodeProduk[]');
        // var getKodeComp = document.getElementsByName('idJenisComponentprodukOK[]');
        var jmlProdukOK = $('#modPenataJasaOKtableproduk tbody tr').length;
        let total = 0;
        const data = [];

        for (var i = 0, iLen = jmlProdukOK; i < iLen; i++) {
            var datax = {};
            datax.kodeProdukOK = getKodeBrg[i].value;
            data.push(datax);
        }

        const cekKodeprdOK = data.map(el => el.kodeProdukOK);
        const statusKodePrdOK = cekKodeprdOK.includes(kodeProdukOK);

        // const cekKodeprdOK = data.map(el => el.kodeProdukOK);
        // const statusKodePrdOK = cekKodeprdOK.includes(kodeProdukOK);

        if (statusKodePrdOK == false) {
            $('#modPenataJasaOKtableproduk tbody').append(Baris);

            document.getElementById("hargaTotalProdukOK").innerHTML = format_ribuan(total);

            var totalx = document.getElementById("OKHargaTotalTindakan").value;
            total = parseInt(totalx) + (parseInt(qty) * parseInt(harga));
            document.getElementById("OKHargaTotalTindakan").value = total;
            document.getElementById("hargaTotalProdukOK").innerHTML = format_ribuan(total);

        } else {
            var urut = document.getElementById("modPenataJasaOKnourut").value;
            if (urut != '') {
                $('#modPenataJasaOKtableproduk tbody').append(Baris);

                var totalx = document.getElementById("OKHargaTotalTindakan").value;
                total = parseInt(totalx) + (parseInt(qty) * parseInt(harga));
                document.getElementById("OKHargaTotalTindakan").value = total;
                document.getElementById("hargaTotalProdukOK").innerHTML = format_ribuan(total);

                var hapusrow = document.getElementById("hapusBarisrodukOK" + urut);
                hapusrow.click();
            } else {
                toastr.error("Produk Sudah Diinputkan!!");
            }

        }
    }

    function kosongInputProduktindakanOK() {
        document.getElementById("jenisProdukTindakanOK").disabled = false;
        $("#jenisProdukTindakanOK").trigger('focus');
        document.getElementById("modPenataJasaOKnourut").value = '';
        document.getElementById("jenisProdukTindakanOK").value = '';
        document.getElementById("banyakTindakanOK").value = '';
        // document.getElementById("OKHargaTotalTindakan").value = '';
    }

    function editBarisProdukOK(btn, nomor) {

        var kodeProdukOK = document.getElementById("modPenataJasaOKtableproduk").rows[nomor].cells[2].firstChild.value;
        var nmBarangOK = document.getElementById("modPenataJasaOKtableproduk").rows[nomor].cells[3].firstChild.value;
        var qty = document.getElementById("modPenataJasaOKtableproduk").rows[nomor].cells[4].firstChild.value;

        $("#banyakTindakanOK").trigger('focus');

        produkOK.setValue(nmBarangOK);
        document.getElementById("modPenataJasaOKnourut").value = nomor;
        document.getElementById("jenisProdukTindakanOK").disabled = true;
        document.getElementById("banyakTindakanOK").value = qty;
    }

    function hapusBarisrodukOK(btn, nomor) {
        document.getElementById("modPenataJasaOKnourut").value = '';
        var row = btn.parentNode.parentNode;

        let total = 0;
        var qty = document.getElementById("modPenataJasaOKtableproduk").rows[nomor].cells[4].firstChild.value;
        var harga = document.getElementById("modPenataJasaOKtableproduk").rows[nomor].cells[5].firstChild.value;
        var totalx = document.getElementById("OKHargaTotalTindakan").value;
        total = parseInt(totalx) - (parseInt(qty) * parseInt(harga));
        document.getElementById("OKHargaTotalTindakan").value = total;
        document.getElementById("hargaTotalProdukOK").innerHTML = format_ribuan(total);

        row.parentNode.removeChild(row);
        var no = 1;
        $('#modPenataJasaOKtableproduk tbody tr').each(function() {
            $(this).find('td:nth-child(1)').html("<input style='text-align:center;' type='text' class='form-control form-control-xs' name='penataJasaOKnourut[]' value='" + no + "' disabled>");
            $(this).find('td:nth-child(2)').html("<button type='button' class='btn btn-xs btn-danger' onclick='hapusBarisrodukOK(this, " + no + ")' id='hapusBarisrodukOK" + no + "' style='width:100%'><i class='fa fa-times'></i></button><button type='button' class='btn btn-xs btn-outline-warning' onclick='editBarisProdukOK(this, " + no + ")' id='editBarisProdukOK" + no + "' style='width:100%'><i class='fa fa-edit'></i></button>");
            no++;
        });
    }

    function paramsPenataJasaOK() {
        // var id_kunj = id_kunjungan;
        // var id_trans = id_transaksi;
        var id_tarif = document.getElementsByName('idTarifprodukOK[]');
        var getKDprd = document.getElementsByName('modPenataJasaOKkodeProduk[]');
        var get_Qty = document.getElementsByName('modPenataJasaOKQty[]');
        var getHargaBeli = document.getElementsByName('hargaTotalProdukJasaOK[]');
        var geturut = document.getElementsByName('penataJasaOKnourut[]');
        var count = $('#modPenataJasaOKtableproduk tbody tr').length;

        var params = {};
        params.data = [];
        for (var i = 0, iLen = count; i < iLen; i++) {
            var x = {};
            // x.id_kunj = id_kunj[i].value;
            // x.id_trans = id_trans[i].value;
            x.id_tarif = id_tarif[i].value;
            x.kd_prd = getKDprd[i].value;
            x.qty = get_Qty[i].value;
            x.hrg_beli = getHargaBeli[i].value;
            if (typeof(geturut[i].value) !== 'undefined') {
                x.urut = geturut[i].value;
            } else {
                x.urut = "";
            }

            console.log(params.data);
            params.data.push(x);
        }
        return params.data;
    }

    function modPenataJasaOKsimpanTindakan() {
        var param = {
            id_transaksi: id_transaksi,
            id_kunjungan: id_kunjungan,
            data: paramsPenataJasaOK(),
            count: paramsPenataJasaOK().length,
        };

        apiPOST('Kamaroperasi/penatajasaOK_simpanProduk', param, hasil => {
            // if (hasil != null) {
            // }
        });
    }

    function kembaliKePenataJasaOK() {
        pertanyaan.fire({
            title: 'Kembali ke menu awal',
            html: '<span>Yakin, tetap kembali ?</span>',
            icon: 'question',
            showCancelButton: true,
            reverseButtons: false,
            allowOutsideClick: false
        }).then((result) => {
            if (result.isConfirmed) {
                keluarKemenuawalPenataJasaOK();
            } else if (result.dismiss === Swal.DismissReason.cancel) {}
        })
    }

    function keluarKemenuawalPenataJasaOK() {
        $('#modalbokingKamarOK').hide();
        $('#list1PenataJasaOK').show();
        $('#list2PenataJasaOK').show();
        listbookingKamarOK();
        sessionStorage.clear();
    }
</script>