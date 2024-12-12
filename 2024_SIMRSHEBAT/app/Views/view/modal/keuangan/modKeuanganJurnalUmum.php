<?php
$data = json_decode($_GET['data']);
$id_jurnal       = str_replace('"', '', json_encode($data->id_jurnal));
$textid       = str_replace('"', '', json_encode($data->textid));
?>
<div class="content modal fade" id="modal_ModKeuanganJurnalUmum<?= $textid ?>">
    <div class="container-fluid">
        <div class="modal-dialog modal-xl" style="min-width: 100%;">
            <!-- <div class="card card-row"> -->
            <div class="modal-content" style="overflow: auto;">
                <div class="row p-1">
                    <div class="col-md-4 col-sm-6 col-12 p-1">
                        <div class="info-box mb-0">
                            <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="70">ID</td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" class="form-control form-control-xs" id="ModKeuanganJurnalUmum<?= $textid ?>_id" disabled>
                                    </td>
                                    <td width="70">IDGL</td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" class="form-control form-control-xs" id="ModKeuanganJurnalUmum<?= $textid ?>_idgl" disabled>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tanggal</td>
                                    <td>:</td>
                                    <td colspan="4"><input type="date" class="form-control form-control-xs" id="ModKeuanganJurnalUmum<?= $textid ?>_tgltransaksiJU"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12 p-1">
                        <div class="info-box mb-0">
                            <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="70">Jumlah</td>
                                    <td>:</td>
                                    <td>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text form-control-xs">Rp.</span>
                                            </div>
                                            <input type="text" class="form-control form-control-xs" id="ModKeuanganJurnalUmum<?= $textid ?>_jumlah" value="0" disabled>
                                            <input type="text" class="form-control form-control-xs" id="ModKeuanganJurnalUmum<?= $textid ?>_totalkredit" value="0" hidden>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sisa</td>
                                    <td>:</td>
                                    <td>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text form-control-xs">Rp.</span>
                                            </div>
                                            <input type="text" class="form-control form-control-xs" id="ModKeuanganJurnalUmum<?= $textid ?>_sisa" value="0" disabled>
                                            <input type="text" class="form-control form-control-xs" id="ModKeuanganJurnalUmum<?= $textid ?>_penerima" disabled hidden>
                                            <input type="text" class="form-control form-control-xs" id="ModKeuanganJurnalUmum<?= $textid ?>_nmpenerima" disabled hidden>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12 p-1">
                        <div class="info-box mb-0">
                            <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="70">Ket</td>
                                    <td>:</td>
                                    <td><textarea class="form-control form-control-sm" id="ModKeuanganJurnalUmum<?= $textid ?>_ketjurnal" name="ModKeuanganJurnalUmum<?= $textid ?>_ketjurnal" style="height:50px;"></textarea></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card card-row">
                    <div class="overlay-wrapper" id="loadingModKeuanganJurnalUmum<?= $textid ?>">
                        <div class="overlay dark">
                            <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                        </div>
                    </div>

                    <div class="card-header p-1 darkgrey-custom">
                        <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="ModKeuanganJurnalUmum_simpan()" id="ModKeuanganJurnalUmum<?= $textid ?>_simpan"><i class="fa fa-save"></i> Simpan</button>
                        <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="ModKeuanganJurnalUmum_print()"><i class="fa fa-print"></i> Cetak</button>
                        <!-- <div class="btn-group">

                            <button type="button" class="btn bg-gradient-secondary btn-xs dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                                <span class="sr-only"></span>
                            </button>
                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" href="#"><span><i class="fa fa-print"></i> Cetak</span></a>
                            </div>
                        </div> -->
                        <button type="button" class="btn btn-outline-danger btn-xs" onclick="ModKeuanganJurnalUmum_kembalikeawal()"><i class="fa fa-arrow-left"></i> Kembali</button>
                        <button type="button" class="btn btn-info btn-xs" onclick="ModKeuanganJurnalUmum_refresh()" hidden><i class="fa fa-sync-alt fa-spin"></i> Refresh Data</button>

                    </div>
                    <div class="modal-body p-1">
                        <div class="card-body p-0">
                            <div class="col-sm-12 p-1" style="max-height: 238px; overflow-x: hidden;">
                                <div class="row mb-1" id="ModKeuanganJurnalUmum<?= $textid ?>_inputPembelian">
                                    <div class="input-group col-sm-5">
                                        <input type="text" class="form-control form-control-xs" id="ModKeuanganJurnalUmum<?= $textid ?>_urut" disabled hidden>
                                        <input type="text" class="form-control form-control-xs" id="ModKeuanganJurnalUmum<?= $textid ?>_idbarang" disabled hidden>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text form-control-xs">Account</span>
                                        </div>
                                        <input type="search" class="form-control form-control-xs" id="ModKeuanganJurnalUmum<?= $textid ?>_nmAcount" autocomplete="false">
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text form-control-xs">Debit</span>
                                            </div>
                                            <input type="text" class="form-control form-control-xs" id="ModKeuanganJurnalUmum<?= $textid ?>_debit">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text form-control-xs">Kredit</span>
                                            </div>
                                            <input type="text" class="form-control form-control-xs" id="ModKeuanganJurnalUmum<?= $textid ?>_kredit">
                                        </div>
                                    </div>
                                    <div class="input-group col-sm-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text form-control-xs">Ket.</span>
                                        </div>
                                        <input type="text" class="form-control form-control-xs" id="ModKeuanganJurnalUmum<?= $textid ?>_ket">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-primary btn-xs" id="ModKeuanganJurnalUmum<?= $textid ?>_cekAccount"><i class="fa fa-check"></i></button>
                                            <button type="button" onclick="kosongInputPembelianLogistik()" class="btn btn-outline-primary btn-xs" onclick=""><i class="fa fa-file"></i> Baru</button>
                                        </div>
                                    </div>

                                </div>
                                <table border="0" cellpadding="0" cellspacing="0" id="ModKeuanganJurnalUmum<?= $textid ?>_daftraaccount" class="table table-striped table-sm choose">
                                    <thead>
                                        <tr>
                                            <th class="pl-0" width="30" style="text-align:center;">#</th>
                                            <th width="10"></th>
                                            <th width="10">Kode Account</th>
                                            <th class="pl-0" width="100">Account</th>
                                            <th class="pl-0" width="70" style="text-align:center;">Debit</th>
                                            <th class="pl-0" width="70" style="text-align:center;">Kredit</th>
                                            <th width="100">Keterangan</th>
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
    showUp_ModKeuanganJurnalUmum();
    getAccount_ModKeuanganJurnalUmum()
    listAcount_ModKeuanganJurnalUmum()
    var idJur = '<?= $id_jurnal ?>';
    var textid = '<?= $textid ?>';
    document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_tgltransaksiJU").value = nowday;


    function ModKeuanganJurnalUmum_refresh() {
        sessionStorage.clear();
        $('#ModKeuanganJurnalUmum<?= $textid ?>_id').val('');
        $('#ModKeuanganJurnalUmum<?= $textid ?>_idgl').val('0');
        $('#ModKeuanganJurnalUmum<?= $textid ?>_tgltransaksiJU').val(nowday);
        $('#ModKeuanganJurnalUmum<?= $textid ?>_ketjurnal').val('');
        $('#ModKeuanganJurnalUmum<?= $textid ?>_jumlah').val('0');
        $('#ModKeuanganJurnalUmum<?= $textid ?>_sisa').val('0');
        $('#ModKeuanganJurnalUmum<?= $textid ?>_daftraaccount tbody').empty();
    }


    function showUp_ModKeuanganJurnalUmum() {
        $("#modal_ModKeuanganJurnalUmum<?= $textid ?>").modal({
            backdrop: "static"
        });
        $('#modal_ModKeuanganJurnalUmum<?= $textid ?>').on('shown.bs.modal', function() {});
    }
    $('#loadingModKeuanganJurnalUmum<?= $textid ?>').hide();
    tampilkan_ListAccountJurnalUmumdetail()

    function tampilkan_ListAccountJurnalUmumdetail() {
        if (idJur != 'null') {

            var param = {
                id_jurnal: idJur
            };
            apiPOST('Keuangan/list_keuanganJurnalUmumDetail', param, hasil => {
                if (hasil['data'] != null) {
                    var data = hasil['data'];
                    for (var i = 0; i < 1; i++) {
                        document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_id").value = data[i]['id_jurnal'];
                        document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_idgl").value = data[i]['id_gl'];
                        document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_tgltransaksiJU").value = data[i]['tgl_jurnal'];
                        document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_ketjurnal").value = data[i]['keterangan'];
                    }

                    var cekdetail = hasil['cekdetail'];
                    for (var i = 0; i < 1; i++) {
                        document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_penerima").value = cekdetail[i]['penerima'];
                        document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_nmpenerima").value = cekdetail[i]['nm_penerima'];
                    }


                    var detail = hasil['detail'];
                    var nomor = 1;
                    var Baris = '';

                    let totaldebit = 0;
                    let totalkredit = 0;

                    for (var i = 0; i < detail.length; i++) {
                        kode_account = detail[i]['id_acc'];
                        nm_account = detail[i]['id_coa'] + ' || ' + detail[i]['coa'];
                        debit = detail[i]['debit'];
                        kredit = detail[i]['kredit'];
                        ket = detail[i]['keterangan'];

                        totaldebit = totaldebit + parseFloat(debit);
                        totalkredit = totalkredit + parseFloat(kredit);


                        Baris += "<tr>";
                        Baris += "<td class='pl-0'>";
                        Baris += "<input style='text-align:center;' type='text' class='form-control form-control-xs' name='ModKeuanganJurnalUmum<?= $textid ?>_nourut[]' value='" + nomor + "' disabled>";
                        Baris += "</td>";
                        Baris += "<td style='display: flex;'><button type='button' class='btn btn-xs btn-danger' onclick='hapusbaris_ModKeuanganJurnalUmum(this, " + nomor + ")' id='hapusbaris_ModKeuanganJurnalUmum" + nomor + "' style='width:100%'><i class='fa fa-times'></i></button><button type='button' class='btn btn-xs btn-outline-warning' onclick='editbaris_ModKeuanganJurnalUmum(this, " + nomor + ")' id='editbaris_ModKeuanganJurnalUmum" + nomor + "' style='width:100%'><i class='fa fa-edit'></i></button></td>";
                        Baris += "<td>";
                        Baris += "<input type='text' class='form-control form-control-xs' name='ModKeuanganJurnalUmum<?= $textid ?>_kodeAccount[]' value='" + kode_account + "' disabled>";
                        Baris += "</td>";
                        Baris += "<td>";
                        Baris += "<input type='text' class='form-control form-control-xs' name='ModKeuanganJurnalUmum<?= $textid ?>_nmAcount[]' value='" + nm_account + "' disabled>";
                        Baris += "</td>";
                        Baris += "<td>";
                        Baris += "<input type='text' class='form-control form-control-xs' name='ModKeuanganJurnalUmum<?= $textid ?>_debit[]' value='" + debit + "' disabled>";
                        Baris += "</td>";
                        Baris += "<td>";
                        Baris += "<input type='text' class='form-control form-control-xs' name='ModKeuanganJurnalUmum<?= $textid ?>_kredit[]' value='" + kredit + "' disabled>";
                        Baris += "</td>";
                        Baris += "<td>";
                        Baris += "<input type='text' class='form-control form-control-xs' name='ModKeuanganJurnalUmum<?= $textid ?>_ket[]' value='" + ket + "' disabled>";
                        Baris += "</td>";
                        Baris += "<td style='display:none;'>";
                        Baris += "</td>";
                        Baris += "</tr>";
                        nomor++
                    }

                    document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_jumlah").value = totaldebit;
                    document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_totalkredit").value = totalkredit;
                    document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_sisa").value = parseInt(totaldebit) - parseInt(totalkredit);
                    /* document.getElementById("ModPembelianLogistik_hargatotal").value = total;
                    document.getElementById("VModPembelianLogistik_hargatotal").innerHTML = format_ribuan(total); */
                    $('#ModKeuanganJurnalUmum<?= $textid ?>_daftraaccount tbody').append(Baris);
                }

            });
        }
    }

    function getAccount_ModKeuanganJurnalUmum() {
        var param = {
            accountcari: document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_nmAcount").value,
        };

        kd_account = new AutoComplete("ModKeuanganJurnalUmum<?= $textid ?>_nmAcount");
        apiPOST('Keuangan/getAccount', param, hasil => {
            if (hasil !== null) {
                var list = hasil['data'];
                list.forEach(item => {
                    kd_account.addData(item['id_acc'], item['id_coa'] + ' || ' + item['coa']);
                });
            }
        });
    }



    function listAcount_ModKeuanganJurnalUmum() {

        kd_account.onPilih(() => {
            $("#ModKeuanganJurnalUmum<?= $textid ?>_debit").trigger('focus');
            // $("#ModKeuanganJurnalUmum<?= $textid ?>_debit").val('0');
        });

        $("#ModKeuanganJurnalUmum<?= $textid ?>_debit").on("keyup", function(event) {
            if (event.keyCode == 13) {
                $("#ModKeuanganJurnalUmum<?= $textid ?>_kredit").trigger('focus');
                // $("#ModKeuanganJurnalUmum<?= $textid ?>_kredit").val('0');
            }
        });

        $("#ModKeuanganJurnalUmum<?= $textid ?>_kredit").on("keyup", function(event) {
            if (event.keyCode == 13) {
                $("#ModKeuanganJurnalUmum<?= $textid ?>_ket").trigger('focus');
            }
        });

        $("#ModKeuanganJurnalUmum<?= $textid ?>_ket").on("keyup", function(event) {
            if (event.keyCode == 13) {
                var kode_account = kd_account.getValue();
                var nm_account = document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_nmAcount").value;
                var cek_debit = document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_debit").value;
                var cek_kredit = document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_kredit").value;
                if (cek_debit != '') {
                    var jml_debit = cek_debit;
                } else {
                    var jml_debit = '0';
                }
                if (cek_kredit != '') {
                    var jml_kredit = cek_kredit;
                } else {
                    var jml_kredit = '0';
                }
                var ket = document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_ket").value;
                if (kode_account != null) {
                    if (jml_debit == '0' && jml_kredit == '0' || ket == '') {
                        toastr.error("Inputan Masih Kosong!!");
                    } else {
                        if (kode_account != '') {
                            tampilkan_ListAccountJurnalUmum(kode_account, nm_account, jml_debit, jml_kredit, ket);
                            kosongInputJurnalUmum()
                        } else {
                            toastr.error("Inputan Masih Kosong!!");
                        }
                    }
                } else {
                    toastr.error("Account tidak ditemukan!!");
                    kosongInputJurnalUmum()
                }
            }
        });

        $("#ModKeuanganJurnalUmum<?= $textid ?>_cekAccount").click(function(event) {
            var kode_account = kd_account.getValue();
            var nm_account = document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_nmAcount").value;
            var cek_debit = document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_debit").value;
            var cek_kredit = document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_kredit").value;
            if (cek_debit != '') {
                var jml_debit = cek_debit;
            } else {
                var jml_debit = '0';
            }
            if (cek_kredit != '') {
                var jml_kredit = cek_kredit;
            } else {
                var jml_kredit = '0';
            }
            var ket = document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_ket").value;
            if (kode_account != null) {
                if (jml_debit == '0' && jml_kredit == '0' || ket == '') {
                    toastr.error("Inputan Masih Kosong!!");
                } else {
                    if (kode_account != '') {
                        tampilkan_ListAccountJurnalUmum(kode_account, nm_account, jml_debit, jml_kredit, ket);
                        kosongInputJurnalUmum()
                    } else {
                        toastr.error("Inputan Masih Kosong!!");
                    }
                }
            } else {
                toastr.error("Account tidak ditemukan!!");
                kosongInputJurnalUmum()
            }
        });

    }

    function tampilkan_ListAccountJurnalUmum(kode_account, nm_account, jml_debit, jml_kredit, ket) {
        var nomor = $('#ModKeuanganJurnalUmum<?= $textid ?>_daftraaccount tbody tr').length + 1;
        var Baris = '';
        Baris += "<tr>";
        Baris += "<td class='pl-0'>";
        Baris += "<input style='text-align:center;' type='text' class='form-control form-control-xs' name='ModKeuanganJurnalUmum<?= $textid ?>_nourut[]' value='" + nomor + "' disabled>";
        Baris += "</td>";
        Baris += "<td style='display: flex;'><button type='button' class='btn btn-xs btn-danger' onclick='hapusbaris_ModKeuanganJurnalUmum(this, " + nomor + ")' id='hapusbaris_ModKeuanganJurnalUmum" + nomor + "' style='width:100%'><i class='fa fa-times'></i></button><button type='button' class='btn btn-xs btn-outline-warning' onclick='editbaris_ModKeuanganJurnalUmum(this, " + nomor + ")' id='editbaris_ModKeuanganJurnalUmum" + nomor + "' style='width:100%'><i class='fa fa-edit'></i></button></td>";
        Baris += "<td>";
        Baris += "<input type='text' class='form-control form-control-xs' name='ModKeuanganJurnalUmum<?= $textid ?>_kodeAccount[]' value='" + kode_account + "' disabled>";
        Baris += "</td>";
        Baris += "<td>";
        Baris += "<input type='text' class='form-control form-control-xs' name='ModKeuanganJurnalUmum<?= $textid ?>_nmAcount[]' value='" + nm_account + "' disabled>";
        Baris += "</td>";
        Baris += "<td>";
        Baris += "<input type='text' class='form-control form-control-xs' name='ModKeuanganJurnalUmum<?= $textid ?>_debit[]' value='" + jml_debit + "' disabled>";
        Baris += "</td>";
        Baris += "<td>";
        Baris += "<input type='text' class='form-control form-control-xs' name='ModKeuanganJurnalUmum<?= $textid ?>_kredit[]' value='" + jml_kredit + "' disabled>";
        Baris += "</td>";
        Baris += "<td>";
        Baris += "<input type='text' class='form-control form-control-xs' name='ModKeuanganJurnalUmum<?= $textid ?>_ket[]' value='" + ket + "' disabled>";
        Baris += "</td>";
        Baris += "<td style='display:none;'>";
        Baris += "</td>";
        Baris += "</tr>";

        var getkodeAccount = document.getElementsByName('ModKeuanganJurnalUmum<?= $textid ?>_kodeAccount[]');
        var jmlAccountJU = $('#ModKeuanganJurnalUmum<?= $textid ?>_daftraaccount tbody tr').length;
        let total = 0;
        const data = [];

        for (var i = 0, iLen = jmlAccountJU; i < iLen; i++) {
            //PROSES ARRAY PENGECEKAN
            var datax = {};
            datax.kode_account = getkodeAccount[i].value;
            data.push(datax);
        }

        const cekkd_AccountJU = data.map(el => el.kode_account); // returns ['00007414', '00000019', '00000017']
        const status_kd_AccountJU = cekkd_AccountJU.includes(kode_account); // returns true

        if (status_kd_AccountJU == false) {
            $('#ModKeuanganJurnalUmum<?= $textid ?>_daftraaccount tbody').append(Baris);

            var totalx = document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_jumlah").value;
            var totalkreditx = document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_totalkredit").value;
            total = parseFloat(totalx) + parseFloat(jml_debit);
            totalkredit = parseFloat(totalkreditx) + parseFloat(jml_kredit);
            totalsisa = parseFloat(total) - parseFloat(totalkredit);
            document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_jumlah").value = total;
            document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_totalkredit").value = totalkredit;
            document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_sisa").value = totalsisa;

        } else {
            var urut = document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_urut").value;
            if (urut != '') {
                $('#ModKeuanganJurnalUmum<?= $textid ?>_daftraaccount tbody').append(Baris);
                var totalx = document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_jumlah").value;
                var totalkreditx = document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_totalkredit").value;
                total = parseFloat(totalx) + parseFloat(jml_debit);
                totalkredit = parseFloat(totalkreditx) + parseFloat(jml_kredit);
                totalsisa = parseFloat(total) - parseFloat(totalkredit);
                document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_jumlah").value = total;
                document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_totalkredit").value = totalkredit;
                document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_sisa").value = totalsisa;

                var hapusrow = document.getElementById("hapusbaris_ModKeuanganJurnalUmum" + urut);
                hapusrow.click();

            } else {
                toastr.error("Account Sudah Diinputkan!!");
            }

        }
    }

    function kosongInputJurnalUmum() {
        document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_nmAcount").disabled = false;
        $("#ModKeuanganJurnalUmum<?= $textid ?>_nmAcount").trigger('focus');
        document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_urut").value = '';
        document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_nmAcount").value = '';
        document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_debit").value = '';
        document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_kredit").value = '';
        document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_ket").value = '';
        // kode_brgLogistik.reset();
    }

    function editbaris_ModKeuanganJurnalUmum(btn, nomor) {

        var kode_account = document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_daftraaccount").rows[nomor].cells[2].firstChild.value;
        var nm_account = document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_daftraaccount").rows[nomor].cells[3].firstChild.value;
        var debit = document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_daftraaccount").rows[nomor].cells[4].firstChild.value;
        var kredit = document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_daftraaccount").rows[nomor].cells[5].firstChild.value;
        var ket = document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_daftraaccount").rows[nomor].cells[6].firstChild.value;

        $("#ModKeuanganJurnalUmum<?= $textid ?>_debit").trigger('focus');

        kd_account.setValue(nm_account);
        document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_urut").value = nomor;
        document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_nmAcount").disabled = true;
        document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_debit").value = debit;
        document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_kredit").value = kredit;
        document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_ket").value = ket;
    }

    function hapusbaris_ModKeuanganJurnalUmum(btn, nomor) {
        document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_urut").value = '';
        var row = btn.parentNode.parentNode;
        let total = 0;
        var debit = document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_daftraaccount").rows[nomor].cells[4].firstChild.value;
        var kredit = document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_daftraaccount").rows[nomor].cells[5].firstChild.value;

        var totalx = document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_jumlah").value;
        var totalkreditx = document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_totalkredit").value;


        total = parseFloat(totalx) - parseFloat(debit);
        totalkredit = parseFloat(totalkreditx) - parseFloat(kredit);
        totalsisa = parseFloat(total) - parseFloat(totalkredit);
        document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_jumlah").value = total;
        document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_totalkredit").value = totalkredit;
        document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_sisa").value = totalsisa;

        /* total = parseFloat(totalx) - parseFloat(debit);
        totalsisa = parseFloat(totalx) - (parseFloat(debit) - parseFloat(kredit));
        document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_jumlah").value = total;
        document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_sisa").value = totalsisa; */

        row.parentNode.removeChild(row);
        var no = 1;
        $('#ModKeuanganJurnalUmum<?= $textid ?>_daftraaccount tbody tr').each(function() {
            $(this).find('td:nth-child(1)').html("<input style='text-align:center;' type='text' class='form-control form-control-xs' name='ModKeuanganJurnalUmum<?= $textid ?>_nourut[]' value='" + no + "' disabled>");
            $(this).find('td:nth-child(2)').html("<button type='button' class='btn btn-xs btn-danger' onclick='hapusbaris_ModKeuanganJurnalUmum(this, " + no + ")' id='hapusbaris_ModKeuanganJurnalUmum" + no + "' style='width:100%'><i class='fa fa-times'></i></button><button type='button' class='btn btn-xs btn-outline-warning' onclick='editbaris_ModKeuanganJurnalUmum(this, " + no + ")' id='editbaris_ModKeuanganJurnalUmum" + no + "' style='width:100%'><i class='fa fa-edit'></i></button>");
            no++;
        });

    }

    function ModKeuanganJurnalUmum_kembalikeawal() {
        var id = document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_id").value;
        if (id == '') {
            pertanyaan.fire({
                title: 'Kembali ke menu awal',
                html: '<span>Data Input Jurnal Umum Belum diSimpan, Data yang sudah dientry akan hilang, tetap kembali ?</span>',
                icon: 'question',
                showCancelButton: true,
                reverseButtons: false,
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    keluarmodal_ModKeuanganJurnalUmum();
                } else if (result.dismiss === Swal.DismissReason.cancel) {

                }
            })
        } else {
            keluarmodal_ModKeuanganJurnalUmum();
        }
    }

    function params_KeuanganJurnalUmum() {
        var idacc = document.getElementsByName('ModKeuanganJurnalUmum<?= $textid ?>_kodeAccount[]');
        var getdebit = document.getElementsByName('ModKeuanganJurnalUmum<?= $textid ?>_debit[]');
        var getkredit = document.getElementsByName('ModKeuanganJurnalUmum<?= $textid ?>_kredit[]');
        var getKet = document.getElementsByName('ModKeuanganJurnalUmum<?= $textid ?>_ket[]');
        var geturut = document.getElementsByName('ModKeuanganJurnalUmum<?= $textid ?>_nourut[]');
        var count = $('#ModKeuanganJurnalUmum<?= $textid ?>_daftraaccount tbody tr').length;

        var params = {};
        params.data = [];
        for (var i = 0, iLen = count; i < iLen; i++) {
            var x = {};
            x.id_acc = idacc[i].value;
            x.debit = getdebit[i].value;
            x.kredit = getkredit[i].value;
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

    function ModKeuanganJurnalUmum_simpan() {
        cekket = document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_ketjurnal").value;
        cekpenerima = document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_penerima").value;
        cek = params_KeuanganJurnalUmum().length;
        if (cekpenerima == '') {
            penerima = '1';
        } else {
            penerima = cekpenerima;
        }

        if (cekket == '' || cek == '0') {
            toastr.error("Inputan Masih Kosong!!");
        } else {
            $('#loadingKeuanganJurnalUmum').show();
            var param = {
                id_jurnal: document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_id").value,
                id_gl: document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_idgl").value,
                tgl_trans: document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_tgltransaksiJU").value,
                jumlah: document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_jumlah").value,
                ket: document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_ketjurnal").value,
                id_peg: user['id_user'],
                penerima: penerima,
                nmpenerima: document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_nmpenerima").value,
                data: params_KeuanganJurnalUmum(),
                count: params_KeuanganJurnalUmum().length,
            };

            apiPOST('Keuangan/SimpankeuanganJurnalUmum', param, hasil => {
                if (hasil != null) {
                    document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_id").value = hasil['x'];
                    document.getElementById("ModKeuanganJurnalUmum<?= $textid ?>_idgl").value = hasil['xx'];
                    $('#loadingKeuanganJurnalUmum').hide();
                }
            });
        }


    }

    function keluarmodal_ModKeuanganJurnalUmum() {
        $('#modal_ModKeuanganJurnalUmum<?= $textid ?>').modal('hide');
        $('.modal-backdrop').hide();
        if (textid == 'JU') {
            tampilkeuanganJurnalUmum();
        }
        if (textid == 'NRC') {
            modkeuanganNeracaBukuBesar_getaccount();
        }
        if (textid == 'BB') {
            keuanganBukuBesarcariList();
        }
        /* sessionStorage.clear(); */
    }
</script>