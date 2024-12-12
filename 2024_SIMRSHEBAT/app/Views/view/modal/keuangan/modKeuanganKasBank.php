<?php
$data = json_decode($_GET['data']);
$jns_TransaksiKasBank       = str_replace('"', '', json_encode($data->flag));
$id_gl       = str_replace('"', '', json_encode($data->id_gl));
?>
<div class="content modal fade" id="modal_ModKeuanganKasBank">
    <div class="container-fluid">
        <div class="modal-dialog modal-xl" style="min-width: 100%;">
            <!-- <div class="card card-row"> -->
            <div class="modal-content" style="overflow: auto;">
                <div class="card" style="box-shadow: 0 0 3px #343a40; margin-bottom: 0;">
                    <div class="card-header p-1">
                        <div class="row">
                            <div class="col-md-12">
                                <h6 class="hr6-custom" id="modal_ModKeuanganKasBank_titleheader"></h6>
                            </div>
                        </div>
                        <!-- END LETAK BUTTON -->
                    </div>
                </div>
                <div class="row p-1">
                    <div class="col-md-3 col-sm-6 col-12 p-1">
                        <div class="info-box mb-0">
                            <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="70">ID</td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" class="form-control form-control-xs" id="ModKeuanganKasBank_id" disabled>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="70">IDGL</td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" class="form-control form-control-xs" id="ModKeuanganKasBank_idgl" disabled>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tanggal</td>
                                    <td>:</td>
                                    <td><input type="date" class="form-control form-control-xs" id="ModKeuanganKasBank_tgltransaksi"></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-12 p-1">
                        <div class="info-box mb-0">
                            <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                                <!-- <tr>
                                    <td>Jenis Transaksi</td>
                                    <td>:</td>
                                    <td>
                                        <select class="form-control form-control-xs" id="ModKeuanganKasBank_jenistransaksikasbank">
                                        </select>
                                    </td>
                                </tr> -->
                                <tr>
                                    <td>Kas - Bank</td>
                                    <td>:</td>
                                    <td>
                                        <select class="form-control form-control-xs" id="ModKeuanganKasBank_kasbank">
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jumlah</td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control form-control-xs" id="ModKeuanganKasBank_jumlahkas" value="0"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12 p-1">
                        <div class="info-box mb-0">
                            <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td>Jenis Pemberi/Penerima</td>
                                    <td>:</td>
                                    <td>
                                        <select class="form-control form-control-xs" onchange="pilihJenisPemberiPenerimaKasBank()" id="ModKeuanganKasBank_jenispemberipenerima">
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Pemberi/Penerima</td>
                                    <td>:</td>
                                    <td>
                                        <div class="input-group-prepend">
                                            <input type="text" class="form-control form-control-xs" id="ModKeuanganKasBank_pemberipenerima" disabled>
                                            <button type="button" class="btn btn-info btn-xs" onclick="bukamodkeuanganKasBankpenerima()"><i class="fas fa-search"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12 p-1">
                        <div class="info-box mb-0">
                            <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td>Keterangan</td>
                                    <td>:</td>
                                    <td><textarea class="form-control form-control-sm" id="ModKeuanganKasBank_keterangan" name="ModKeuanganKasBank_keterangan" style="height:50px;"></textarea></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card card-row">
                    <div class="overlay-wrapper" id="loadingModKeuanganKasBank">
                        <div class="overlay dark">
                            <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                        </div>
                    </div>

                    <div class="card-header p-1 darkgrey-custom">
                        <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="ModKeuanganKasBank_simpan()" id="ModKeuanganKasBank_simpan"><i class="fa fa-save"></i> Simpan</button>
                        <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="ModKeuanganKasBank_cetak()" id="ModKeuanganKasBank_cetak"><i class="fa fa-print"></i> Cetak</button>
                        <button type="button" class="btn btn-outline-danger btn-xs" onclick="ModKeuanganKasBank_kembalikeawal()"><i class="fa fa-arrow-left"></i> Kembali</button>
                        <button type="button" class="btn btn-info btn-xs" onclick="ModKeuanganKasBank_refresh()"><i class="fa fa-sync-alt fa-spin"></i> Refresh Data</button>

                    </div>
                    <div class="modal-body p-1">
                        <div class="card-body p-0">
                            <div class="col-sm-12 p-1" style="max-height: 238px; overflow-x: hidden;">
                                <div class="row mb-1" id="ModKeuanganKasBank_inputTransaksi">
                                    <div class="input-group col-sm-5">
                                        <input type="text" class="form-control form-control-xs" id="ModKeuanganKasBank_urut" disabled hidden>
                                        <input type="text" class="form-control form-control-xs" id="ModKeuanganKasBank_idbarang" disabled hidden>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text form-control-xs">Account</span>
                                        </div>
                                        <input type="search" class="form-control form-control-xs" id="ModKeuanganKasBank_nmKasBank" autocomplete="false">
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text form-control-xs">Debit</span>
                                            </div>
                                            <input type="text" class="form-control form-control-xs" id="ModKeuanganKasBank_debit">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text form-control-xs">Kredit</span>
                                            </div>
                                            <input type="text" class="form-control form-control-xs" id="ModKeuanganKasBank_kredit">
                                        </div>
                                    </div>
                                    <div class="input-group col-sm-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text form-control-xs">Ket.</span>
                                        </div>
                                        <input type="text" class="form-control form-control-xs" id="ModKeuanganKasBank_ket">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-primary btn-xs" id="ModKeuanganKasBank_cekAccount"><i class="fa fa-check"></i></button>
                                            <button type="button" onclick="kosongInputPembelianLogistik()" class="btn btn-outline-primary btn-xs" disabled><i class="fa fa-file"></i> Baru</button>
                                        </div>
                                    </div>
                                </div>
                                <table border="0" cellpadding="0" cellspacing="0" id="ModKeuanganKasBank_daftraaccount" class="table table-striped table-sm choose">
                                    <thead>
                                        <tr>
                                            <th class="pl-0" width="30" style="text-align:center;">#</th>
                                            <th width="10"></th>
                                            <th width="10">Kode Account</th>
                                            <th class="pl-0" width="100">Account</th>
                                            <th class="pl-0" width="70" style="text-align:center;">Jumlah</th>
                                            <th width="100">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <input type="text" value="0" id="ModKeuanganKasBank_jumlahtotal" name="ModKeuanganKasBank_jumlahtotal" disabled hidden>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modkeuanganKasBankpenerima_content"></div>


<script>
    var idGL = '<?= $id_gl ?>';
    var jns_TransaksiKasBank = '<?= $jns_TransaksiKasBank ?>';
    // console.log(jns_TransaksiKasBank)

    document.getElementById("ModKeuanganKasBank_tgltransaksi").value = nowday;

    showUp_ModKeuanganKasBank();
    getKasmasuk_ModKeuanganKasBank()
    getAccount_ModKeuanganKasBank();
    getPenerima_ModKeuanganKasBank()
    listAcount_ModKeuanganKasBank();
    // getjenistransaksi_ModKeuanganKasBank();

    function ModKeuanganKasBank_refresh() {
        sessionStorage.clear();
        $('#ModKeuanganKasBank_jumlah').val('');
        $('#ModKeuanganKasBank_sisa').val('');
    }


    function showUp_ModKeuanganKasBank() {
        $("#modal_ModKeuanganKasBank").modal({
            backdrop: "static"
        });
        $('#modal_ModKeuanganKasBank').on('shown.bs.modal', function() {});
        if (jns_TransaksiKasBank == 'KM') {
            document.getElementById("ModKeuanganKasBank_debit").disabled = true;
            document.getElementById("ModKeuanganKasBank_cetak").disabled = true;
            document.getElementById("modal_ModKeuanganKasBank_titleheader").innerHTML = '<i class="fas fa-boxes"></i> Tambah Kas Masuk';
        }
        if (jns_TransaksiKasBank == 'KL') {
            document.getElementById("ModKeuanganKasBank_kredit").disabled = true;
            document.getElementById("modal_ModKeuanganKasBank_titleheader").innerHTML = '<i class="fas fa-boxes"></i> Tambah Kas Keluar';

        }
    }
    $('#loadingModKeuanganKasBank').hide();

    function getKasmasuk_ModKeuanganKasBank() {
        var param = {
            kascari: ''
        };
        apiPOST('Keuangan/getKas', param, hasil => {
            var data = '';
            if (hasil !== null) {
                var a = hasil['data'];
                for (var i = 0; i < a.length; i++) {
                    data += '<option value="' + a[i]['id_acc'] + '">' + a[i]['kas_nama'] + '</option>';
                }
                document.getElementById('ModKeuanganKasBank_kasbank').innerHTML = data;
            }
        });
    }

    function getPenerima_ModKeuanganKasBank() {
        apiPOST('Keuangan/getPenerima', null, hasil => {
            var data = '';
            if (hasil !== null) {
                var a = hasil['data'];
                for (var i = 0; i < a.length; i++) {
                    data += '<option value="' + a[i]['id_penerima'] + '">' + a[i]['customer'] + '</option>';
                }
                document.getElementById('ModKeuanganKasBank_jenispemberipenerima').innerHTML = data;
            }
        });
    }

    function getAccount_ModKeuanganKasBank() {
        var param = {
            kascari: document.getElementById("ModKeuanganKasBank_nmKasBank").value
        };

        kd_account = new AutoComplete("ModKeuanganKasBank_nmKasBank");
        apiPOST('Keuangan/getKasCoa', param, hasil => {
            if (hasil !== null) {
                var list = hasil['data'];
                list.forEach(item => {
                    kd_account.addData(item['id_acc'], item['id_coa'] + ' || ' + item['coa'] + ' || ' + item['kas_nama']);
                });
            }
        });
    }


    tampilkan_keuanganKasBank_detail()

    function tampilkan_keuanganKasBank_detail() {
        if (idGL != 'null') {

            var param = {
                id_gl: idGL,
                jns_TransaksiKasBank: jns_TransaksiKasBank
            };
            apiPOST('Keuangan/list_keuanganKasBank_detail', param, hasil => {
                if (hasil['data'] != null) {
                    var data = hasil['data'];
                    for (var i = 0; i < 1; i++) {
                        console.log(data[i]['id_acc'])
                        document.getElementById("ModKeuanganKasBank_id").value = data[i]['id_jurnal'];
                        document.getElementById("ModKeuanganKasBank_idgl").value = data[i]['id_gl'];
                        document.getElementById("ModKeuanganKasBank_tgltransaksi").value = data[i]['tgl_jurnal'];
                        document.getElementById("ModKeuanganKasBank_kasbank").value = data[i]['id_acc'];
                        if (jns_TransaksiKasBank == 'KM') {
                            document.getElementById("ModKeuanganKasBank_jumlahkas").value = data[i]['debit'];
                        } else {
                            document.getElementById("ModKeuanganKasBank_jumlahkas").value = data[i]['kredit'];
                        }
                        document.getElementById("ModKeuanganKasBank_jenispemberipenerima").value = data[i]['penerima'];
                        document.getElementById("ModKeuanganKasBank_pemberipenerima").value = data[i]['nm_penerima'];
                        document.getElementById("ModKeuanganKasBank_keterangan").value = data[i]['keterangan'];
                    }



                    var detail = hasil['detail'];
                    var nomor = 1;
                    var Baris = '';

                    /* let totaldebit = 0;
                    let totalkredit = 0; */

                    for (var i = 0; i < detail.length; i++) {
                        kode_account = detail[i]['id_acc'];
                        nm_account = detail[i]['id_coa'] + ' || ' + detail[i]['coa'] + ' || ' + detail[i]['kas_nama'];
                        debit = detail[i]['debit'];
                        kredit = detail[i]['kredit'];
                        ket = detail[i]['keterangan'];

                        Baris += "<tr>";
                        Baris += "<td class='pl-0'>";
                        Baris += "<input style='text-align:center;' type='text' class='form-control form-control-xs' name='ModKeuanganKasBank_nourut[]' value='" + nomor + "' disabled>";
                        Baris += "</td>";
                        Baris += "<td style='display: flex;'><button type='button' class='btn btn-xs btn-danger' onclick='hapusbaris_ModKeuanganKasBank(this, " + nomor + ")' id='hapusbaris_ModKeuanganKasBank" + nomor + "' style='width:100%'><i class='fa fa-times'></i></button><button type='button' class='btn btn-xs btn-outline-warning' onclick='editbaris_ModKeuanganKasBank(this, " + nomor + ")' id='editbaris_ModKeuanganKasBank" + nomor + "' style='width:100%'><i class='fa fa-edit'></i></button></td>";
                        Baris += "<td>";
                        Baris += "<input type='text' class='form-control form-control-xs' name='ModKeuanganKasBank_kodeAccount[]' value='" + kode_account + "' disabled>";
                        Baris += "</td>";
                        Baris += "<td>";
                        Baris += "<input type='text' class='form-control form-control-xs' name='ModKeuanganKasBank_nmKasBank[]' value='" + nm_account + "' disabled>";
                        Baris += "</td>";
                        Baris += "<td>";
                        if (jns_TransaksiKasBank == 'KM') {
                            Baris += "<input type='text' class='form-control form-control-xs' name='ModKeuanganKasBank_jumlah[]' value='" + kredit + "' disabled>";
                        } else {
                            Baris += "<input type='text' class='form-control form-control-xs' name='ModKeuanganKasBank_jumlah[]' value='" + debit + "' disabled>";
                        }
                        Baris += "</td>";
                        Baris += "<td>";
                        Baris += "<input type='text' class='form-control form-control-xs' name='ModKeuanganKasBank_ket[]' value='" + ket + "' disabled>";
                        Baris += "</td>";
                        Baris += "<td style='display:none;'>";
                        Baris += "</td>";
                        Baris += "</tr>";
                        nomor++;
                    }

                    /* document.getElementById("ModKeuanganJurnalUmum_jumlah").value = totaldebit;
                    document.getElementById("ModKeuanganJurnalUmum_totalkredit").value = totalkredit;
                    document.getElementById("ModKeuanganJurnalUmum_sisa").value = parseInt(totaldebit) - parseInt(totalkredit); */
                    /* document.getElementById("ModPembelianLogistik_hargatotal").value = total;
                    document.getElementById("VModPembelianLogistik_hargatotal").innerHTML = format_ribuan(total); */
                    $('#ModKeuanganKasBank_daftraaccount tbody').append(Baris);
                }

            });
        }
    }



    function listAcount_ModKeuanganKasBank() {
        if (jns_TransaksiKasBank == 'KM') {
            kd_account.onPilih(() => {
                $("#ModKeuanganKasBank_kredit").trigger('focus');
            });

            $("#ModKeuanganKasBank_kredit").on("keyup", function(event) {
                if (event.keyCode == 13) {
                    $("#ModKeuanganKasBank_ket").trigger('focus');
                }
            });

            $("#ModKeuanganKasBank_ket").on("keyup", function(event) {
                if (event.keyCode == 13) {
                    var kode_account = kd_account.getValue();
                    var nm_account = document.getElementById("ModKeuanganKasBank_nmKasBank").value;
                    var cek_kredit = document.getElementById("ModKeuanganKasBank_kredit").value;
                    if (cek_kredit != '') {
                        var jml = cek_kredit;
                    } else {
                        var jml = '0';
                    }
                    var ket = document.getElementById("ModKeuanganKasBank_ket").value;
                    if (kode_account != null) {
                        if ((kode_account != '')) {
                            if (jml == '0') {
                                toastr.error("Inputan Masih Kosong!!");
                            } else {
                                tampilkan_ListModKeuanganKasBank(kode_account, nm_account, jml, ket);
                                kosongInputJurnalUmum()
                            }
                        } else {
                            toastr.error("Inputan Masih Kosong!!");
                        }
                    } else {
                        toastr.error("Account tidak ditemukan!!");
                        kosongInputJurnalUmum()
                    }
                }
            });

            $("#ModKeuanganKasBank_cekAccount").click(function(event) {
                var kode_account = kd_account.getValue();
                var nm_account = document.getElementById("ModKeuanganKasBank_nmKasBank").value;
                var cek_kredit = document.getElementById("ModKeuanganKasBank_kredit").value;
                if (cek_kredit != '') {
                    var jml = cek_kredit;
                } else {
                    var jml = '0';
                }
                var ket = document.getElementById("ModKeuanganKasBank_ket").value;
                if (kode_account != null) {
                    if ((kode_account != '')) {
                        if (jml == '0') {
                            toastr.error("Inputan Masih Kosong!!");
                        } else {
                            tampilkan_ListModKeuanganKasBank(kode_account, nm_account, jml, ket);
                            kosongInputJurnalUmum()
                        }
                    } else {
                        toastr.error("Inputan Masih Kosong!!");
                    }
                } else {
                    toastr.error("Account tidak ditemukan!!");
                    kosongInputJurnalUmum()
                }
            });
        }
        if (jns_TransaksiKasBank == 'KL') {
            kd_account.onPilih(() => {
                $("#ModKeuanganKasBank_debit").trigger('focus');
            });

            $("#ModKeuanganKasBank_debit").on("keyup", function(event) {
                if (event.keyCode == 13) {
                    $("#ModKeuanganKasBank_ket").trigger('focus');
                }
            });

            $("#ModKeuanganKasBank_ket").on("keyup", function(event) {
                if (event.keyCode == 13) {
                    var kode_account = kd_account.getValue();
                    var nm_account = document.getElementById("ModKeuanganKasBank_nmKasBank").value;
                    var cek_debit = document.getElementById("ModKeuanganKasBank_debit").value;
                    if (cek_debit != '') {
                        var jml = cek_debit;
                    } else {
                        var jml = '0';
                    }
                    var ket = document.getElementById("ModKeuanganKasBank_ket").value;
                    if (kode_account != null) {
                        if ((kode_account != '')) {
                            if (jml == '0') {
                                toastr.error("Inputan Masih Kosong!!");
                            } else {
                                tampilkan_ListModKeuanganKasBank(kode_account, nm_account, jml, ket);
                                kosongInputJurnalUmum()
                            }
                        } else {
                            toastr.error("Inputan Masih Kosong!!");
                        }
                    } else {
                        toastr.error("Account tidak ditemukan!!");
                        kosongInputJurnalUmum()
                    }
                }
            });

            $("#ModKeuanganKasBank_cekAccount").click(function(event) {
                var kode_account = kd_account.getValue();
                var nm_account = document.getElementById("ModKeuanganKasBank_nmKasBank").value;
                var cek_debit = document.getElementById("ModKeuanganKasBank_debit").value;
                if (cek_debit != '') {
                    var jml = cek_debit;
                } else {
                    var jml = '0';
                }
                var ket = document.getElementById("ModKeuanganKasBank_ket").value;
                if (kode_account != null) {
                    if ((kode_account != '')) {
                        if (jml == '0') {
                            toastr.error("Inputan Masih Kosong!!");
                        } else {
                            tampilkan_ListModKeuanganKasBank(kode_account, nm_account, jml, ket);
                            kosongInputJurnalUmum()
                        }
                    } else {
                        toastr.error("Inputan Masih Kosong!!");
                    }
                } else {
                    toastr.error("Account tidak ditemukan!!");
                    kosongInputJurnalUmum()
                }
            });
        }
    }

    function tampilkan_ListModKeuanganKasBank(kode_account, nm_account, jml, ket) {
        var nomor = $('#ModKeuanganKasBank_daftraaccount tbody tr').length + 1;
        var Baris = '';
        Baris += "<tr>";
        Baris += "<td class='pl-0'>";
        Baris += "<input style='text-align:center;' type='text' class='form-control form-control-xs' name='ModKeuanganKasBank_nourut[]' value='" + nomor + "' disabled>";
        Baris += "</td>";
        Baris += "<td style='display: flex;'><button type='button' class='btn btn-xs btn-danger' onclick='hapusbaris_ModKeuanganKasBank(this, " + nomor + ")' id='hapusbaris_ModKeuanganKasBank" + nomor + "' style='width:100%'><i class='fa fa-times'></i></button><button type='button' class='btn btn-xs btn-outline-warning' onclick='editbaris_ModKeuanganKasBank(this, " + nomor + ")' id='editbaris_ModKeuanganKasBank" + nomor + "' style='width:100%'><i class='fa fa-edit'></i></button></td>";
        Baris += "<td>";
        Baris += "<input type='text' class='form-control form-control-xs' name='ModKeuanganKasBank_kodeAccount[]' value='" + kode_account + "' disabled>";
        Baris += "</td>";
        Baris += "<td>";
        Baris += "<input type='text' class='form-control form-control-xs' name='ModKeuanganKasBank_nmKasBank[]' value='" + nm_account + "' disabled>";
        Baris += "</td>";
        Baris += "<td>";
        Baris += "<input type='text' class='form-control form-control-xs' name='ModKeuanganKasBank_jumlah[]' value='" + jml + "' disabled>";
        Baris += "</td>";
        Baris += "<td>";
        Baris += "<input type='text' class='form-control form-control-xs' name='ModKeuanganKasBank_ket[]' value='" + ket + "' disabled>";
        Baris += "</td>";
        Baris += "<td style='display:none;'>";
        Baris += "</td>";
        Baris += "</tr>";

        var getkodeAccount = document.getElementsByName('ModKeuanganKasBank_kodeAccount[]');
        var jmlAccountJU = $('#ModKeuanganKasBank_daftraaccount tbody tr').length;
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
            $('#ModKeuanganKasBank_daftraaccount tbody').append(Baris);

            var totalx = document.getElementById("ModKeuanganKasBank_jumlahtotal").value;
            total = parseFloat(totalx) + parseFloat(jml);
            document.getElementById("ModKeuanganKasBank_jumlahtotal").value = total;

        } else {
            var urut = document.getElementById("ModKeuanganKasBank_urut").value;
            if (urut != '') {
                $('#ModKeuanganKasBank_daftraaccount tbody').append(Baris);
                var totalx = document.getElementById("ModKeuanganKasBank_jumlahtotal").value;
                total = parseFloat(totalx) + parseFloat(jml);
                document.getElementById("ModKeuanganKasBank_jumlahtotal").value = total;

                var hapusrow = document.getElementById("hapusbaris_ModKeuanganKasBank" + urut);
                hapusrow.click();

            } else {
                toastr.error("Account Sudah Diinputkan!!");
            }

        }
    }

    function kosongInputJurnalUmum() {
        document.getElementById("ModKeuanganKasBank_nmKasBank").disabled = false;
        $("#ModKeuanganKasBank_nmKasBank").trigger('focus');
        document.getElementById("ModKeuanganKasBank_urut").value = '';
        document.getElementById("ModKeuanganKasBank_nmKasBank").value = '';
        document.getElementById("ModKeuanganKasBank_debit").value = '';
        document.getElementById("ModKeuanganKasBank_kredit").value = '';
        document.getElementById("ModKeuanganKasBank_ket").value = '';
        // kode_brgLogistik.reset();
    }

    function editbaris_ModKeuanganKasBank(btn, nomor) {

        var kode_account = document.getElementById("ModKeuanganKasBank_daftraaccount").rows[nomor].cells[2].firstChild.value;
        var nm_account = document.getElementById("ModKeuanganKasBank_daftraaccount").rows[nomor].cells[3].firstChild.value;
        var jumlah = document.getElementById("ModKeuanganKasBank_daftraaccount").rows[nomor].cells[4].firstChild.value;
        var ket = document.getElementById("ModKeuanganKasBank_daftraaccount").rows[nomor].cells[5].firstChild.value;


        if (jns_TransaksiKasBank == 'KM') {
            $("#ModKeuanganKasBank_kredit").trigger('focus');
            document.getElementById("ModKeuanganKasBank_kredit").value = jumlah;
        }
        if (jns_TransaksiKasBank == 'KL') {
            $("#ModKeuanganKasBank_debit").trigger('focus');
            document.getElementById("ModKeuanganKasBank_debit").value = jumlah;
        }
        kd_account.setValue(nm_account);
        document.getElementById("ModKeuanganKasBank_urut").value = nomor;
        document.getElementById("ModKeuanganKasBank_nmKasBank").disabled = true;

        document.getElementById("ModKeuanganKasBank_ket").value = ket;
    }

    function hapusbaris_ModKeuanganKasBank(btn, nomor) {
        document.getElementById("ModKeuanganKasBank_urut").value = '';
        var row = btn.parentNode.parentNode;
        let total = 0;
        var jumlah = document.getElementById("ModKeuanganKasBank_daftraaccount").rows[nomor].cells[4].firstChild.value;
        var totalx = document.getElementById("ModKeuanganKasBank_jumlahtotal").value;
        total = parseFloat(totalx) - parseFloat(jumlah);
        document.getElementById("ModKeuanganKasBank_jumlahtotal").value = total;

        row.parentNode.removeChild(row);
        var no = 1;
        $('#ModKeuanganKasBank_daftraaccount tbody tr').each(function() {
            $(this).find('td:nth-child(1)').html("<input style='text-align:center;' type='text' class='form-control form-control-xs' name='ModKeuanganKasBank_nourut[]' value='" + no + "' disabled>");
            $(this).find('td:nth-child(2)').html("<button type='button' class='btn btn-xs btn-danger' onclick='hapusbaris_ModKeuanganKasBank(this, " + no + ")' id='hapusbaris_ModKeuanganKasBank" + no + "' style='width:100%'><i class='fa fa-times'></i></button><button type='button' class='btn btn-xs btn-outline-warning' onclick='editbaris_ModKeuanganKasBank(this, " + no + ")' id='editbaris_ModKeuanganKasBank" + no + "' style='width:100%'><i class='fa fa-edit'></i></button>");
            no++;
        });

    }

    function params_ModKeuanganKasBank() {
        var idacc = document.getElementsByName('ModKeuanganKasBank_kodeAccount[]');
        var getjml_transkas = document.getElementsByName('ModKeuanganKasBank_jumlah[]');
        var getKet = document.getElementsByName('ModKeuanganKasBank_ket[]');
        var geturut = document.getElementsByName('ModKeuanganKasBank_nourut[]');
        var count = $('#ModKeuanganKasBank_daftraaccount tbody tr').length;

        var params = {};
        params.data = [];
        for (var i = 0, iLen = count; i < iLen; i++) {
            var x = {};
            x.id_acc = idacc[i].value;
            x.jmltrans_kas = getjml_transkas[i].value;
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

    function ModKeuanganKasBank_simpan() {
        kasall = document.getElementById("ModKeuanganKasBank_jumlahtotal").value;
        kas = document.getElementById("ModKeuanganKasBank_jumlahkas").value;
        if (kas != kasall) {
            toastr.error("Debit Kredit Tidak Seimbang!!");
        } else {
            $('#loadingModKeuanganKasBank').show();
            var param = {
                jenis_trans: jns_TransaksiKasBank,
                id_jurnal: document.getElementById("ModKeuanganKasBank_id").value,
                id_gl: document.getElementById("ModKeuanganKasBank_idgl").value,
                idacc_kas: document.getElementById("ModKeuanganKasBank_kasbank").value,
                jmlkasall: document.getElementById("ModKeuanganKasBank_jumlahtotal").value,
                jmlkas: document.getElementById("ModKeuanganKasBank_jumlahkas").value,
                tgl_trans: document.getElementById("ModKeuanganKasBank_tgltransaksi").value,
                keterangan: document.getElementById("ModKeuanganKasBank_keterangan").value,
                penerima: document.getElementById("ModKeuanganKasBank_jenispemberipenerima").value,
                nm_penerima: document.getElementById("ModKeuanganKasBank_pemberipenerima").value,
                id_peg: user['id_user'],
                data: params_ModKeuanganKasBank(),
                count: params_ModKeuanganKasBank().length,
            };

            apiPOST('Keuangan/SimpankeuanganKasBank', param, hasil => {
                if (hasil != null) {
                    document.getElementById("ModKeuanganKasBank_id").value = hasil['x'];
                    document.getElementById("ModKeuanganKasBank_idgl").value = hasil['xx'];
                    $('#loadingModKeuanganKasBank').hide();
                }
            });
        }
    }

    function ModKeuanganKasBank_kembalikeawal() {
        var id = document.getElementById("ModKeuanganKasBank_id").value;
        if (id == '') {
            pertanyaan.fire({
                title: 'Kembali ke menu awal',
                html: '<span>Data Input Kas Bank Belum diSimpan, Data yang sudah dientry akan hilang, tetap kembali ?</span>',
                icon: 'question',
                showCancelButton: true,
                reverseButtons: false,
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    keluarmodal_ModKeuanganKasBank();
                } else if (result.dismiss === Swal.DismissReason.cancel) {

                }
            })
        } else {
            keluarmodal_ModKeuanganKasBank();
        }
    }

    function ModKeuanganKasBank_cetak() {
        var id = document.getElementById("ModKeuanganKasBank_id").value;
        if (id == '') {
            pertanyaan.fire({
                position: "center",
                icon: "error",
                title: "Simpan Dulu !!!, Belum disimpan udah mau cetak",
                showConfirmButton: false,
                timer: 2000
            });
        } else {
            var param = {
                id_gl: document.getElementById("ModKeuanganKasBank_idgl").value,
                ket: document.getElementById("ModKeuanganKasBank_keterangan").value,
                penerima: document.getElementById("ModKeuanganKasBank_pemberipenerima").value,
                tgl: document.getElementById("ModKeuanganKasBank_tgltransaksi").value,
                jumlah: document.getElementById("ModKeuanganKasBank_jumlahkas").value,
                kasbank: $('#ModKeuanganKasBank_kasbank').find(":selected").text(),
                nama: user['nama_pegawai']
            };

            console.log(param)
            newTabPOST('API/Keuangan/CetakKasKeluar', param);
            return;
        }
    }


    function keluarmodal_ModKeuanganKasBank() {
        $('#modal_ModKeuanganKasBank').modal('hide');
        $('.modal-backdrop').hide();
        tampilkeuanganKasBank();
        sessionStorage.clear();
    }

    function pilihJenisPemberiPenerimaKasBank() {
        document.getElementById("ModKeuanganKasBank_pemberipenerima").disabled = true;
        document.getElementById("ModKeuanganKasBank_pemberipenerima").value = '';
    }

    function modKeuanganBukuBesar_ListPenerima_pilih(nama) {
        document.getElementById("ModKeuanganKasBank_pemberipenerima").value = nama;
    }

    function bukamodkeuanganKasBankpenerima() {
        penerima = document.getElementById("ModKeuanganKasBank_jenispemberipenerima").value;
        if (penerima == '1') {
            document.getElementById("ModKeuanganKasBank_pemberipenerima").disabled = false;
            $("#ModKeuanganKasBank_pemberipenerima").trigger('focus');
        }
        if (penerima == '2') {
            $('.modkeuanganKasBankpenerima_content').load('Keuangan/modkeuanganKasBankPenerima');
        }
        if (penerima == '4') {
            $('.modkeuanganKasBankpenerima_content').load('Keuangan/modkeuanganKasBankPasien');
        }
        if (penerima == '6') {
            $('.modkeuanganKasBankpenerima_content').load('Keuangan/modkeuanganKasBankAsuransi');
        }
        if (penerima == '6') {
            $('.modkeuanganKasBankpenerima_content').load('Keuangan/modkeuanganKasBankSupplier');
        }
        if (penerima == '7') {
            $('.modkeuanganKasBankpenerima_content').load('Keuangan/modkeuanganKasBankSupplier');
        }
    }
</script>