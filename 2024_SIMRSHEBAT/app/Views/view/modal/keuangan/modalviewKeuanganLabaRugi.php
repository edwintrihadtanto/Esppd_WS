<?php
$nowday     = date('Y-m-d');
//$nextday    = date('Y-m-d', strtotime('+1 days', strtotime($nowday))); 
$nextday    = $nowday;

$data = json_decode($_GET['data']);
$bulan       = str_replace('"', '', json_encode($data->bulan));
$tahun       = str_replace('"', '', json_encode($data->tahun));
?>
<div class="content modal fade" id="modal_modalviewKeuanganLabaRugi">
    <div class="container-fluid">
        <div class="modal-dialog modal-xl" style="min-width: 100%;">
            <!-- <div class="card card-row"> -->
            <div class="modal-content" style="overflow: auto;">
                <div class="row p-1">
                    <div class="col-md-12 p-2" id="modalviewKeuanganLabaRugi_listtransaksi1">
                        <div class="card card-outline card-default mb-0">
                            <div class="card-body p-1">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-12 p-1">
                                        <div class="info-box mb-0 pb-0">
                                            <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td>Bulan</td>
                                                    <td>:</td>
                                                    <td>
                                                        <select class="form-control form-control-xs" id="modalviewKeuanganLabaRugi_priodebulan" name="keuanganLabaRugi_priodebulan" value='12'>
                                                            <option value="1">Januari</option>
                                                            <option value="2">Febuari</option>
                                                            <option value="3">Maret</option>
                                                            <option value="4">April</option>
                                                            <option value="5">Mei</option>
                                                            <option value="6">Juni</option>
                                                            <option value="7">Juli</option>
                                                            <option value="8">Agustus</option>
                                                            <option value="9">September</option>
                                                            <option value="10">Oktober</option>
                                                            <option value="11">November</option>
                                                            <option value="12">Desember</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Tahun</td>
                                                    <td>:</td>
                                                    <td>
                                                        <select class="form-control form-control-xs" id="modalviewKeuanganLabaRugi_caritahun" name="keuanganLabaRugi_caritahun" value="2023"></select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-12 p-1">
                                        <div class="info-box mb-0 pb-0">
                                            <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td>Debit</td>
                                                    <td>:</td>
                                                    <td>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text form-control-xs">Rp.</span>
                                                            </div>
                                                            <input type="text" style="direction:RTL;" class="form-control form-control-xs" id="modalviewKeuanganLabaRugi_Debit" value="0" disabled>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Kredit</td>
                                                    <td>:</td>
                                                    <td>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text form-control-xs">Rp.</span>
                                                            </div>
                                                            <input type="text" style="direction:RTL;" class="form-control form-control-xs" id="modalviewKeuanganLabaRugi_Kredit" value="0" disabled>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Laba Rugi</td>
                                                    <td>:</td>
                                                    <td>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text form-control-xs">Rp.</span>
                                                            </div>
                                                            <input type="text" style="direction:RTL;" class="form-control form-control-xs" id="modalviewKeuanganLabaRugi_LabaRugi" value="0" disabled>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 p-2" id="modalviewKeuanganLabaRugi_listtransaksi2">
                        <div class="card card-outline">
                            <div class="overlay-wrapper" id="loadingmodalviewKeuanganLabaRugi">
                                <div class="overlay">
                                    <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                                </div>
                            </div>
                            <div class="card-body p-1">
                                <div class="card" style="box-shadow: 0 0 3px #343a40; margin-bottom: 0;">
                                    <div class="card-header p-1">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h6 class="hr6-custom" id="modalviewKeuanganLabaRugi_titleheader"><i class="fas fa-boxes"></i> </i> Laba Rugi</h6>
                                                <div>

                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-outline-danger btn-xs" onclick="modmodalviewKeuanganNeraca_kembalikeawal()"><i class="fa fa-print"></i> Kembali</button>
                                        <button type="button" id="btnprintmodalviewKeuanganLabaRugi" class="btn btn-secondary btn-xs" onclick="printmodalviewKeuanganLabaRugi()" hidden><i class="fa fa-print"></i> Print</button>
                                        <!-- END LETAK BUTTON -->
                                    </div>
                                </div>
                                <div style="max-height: 420px; overflow: auto;">
                                    <table id="modalviewKeuanganLabaRugi_daftar" class="table table-striped table-sm choose table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <th class="pl-0" width="10">No.</th>
                                                <th width="10"></th>
                                                <th width="30">Kode</th>
                                                <th width="150">COA</th>
                                                <th width="70">Debit</th>
                                                <th width="70">Kredit</th>
                                                <th width="70">Jumlah</th>
                                                <th width="70">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modmodalviewKeuanganLabaRugi_content"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var nowday = "<?php echo $nowday; ?>";
    var nextday = "<?php echo $nextday; ?>";
    showUp_modalviewKeuanganLabaRugi()

    function showUp_modalviewKeuanganLabaRugi() {
        $("#modal_modalviewKeuanganLabaRugi").modal({
            backdrop: "static"
        });
        $('#modal_modalviewKeuanganLabaRugi').on('shown.bs.modal', function() {});
    }




    $('#loadingmodalviewKeuanganLabaRugi').hide();
    /* tampilmodalviewKeuanganLabaRugi(); */
    listtahun()

    function listtahun() {
        const tahun = new Date();
        var Option = '';
        for (i = tahun.getFullYear(); i >= 2000; i -= 1) {
            Option += "<option value='" + i + "'>" + i + "</option>";
        }
        document.getElementById('modalviewKeuanganLabaRugi_caritahun').innerHTML = Option;
    }

    tampilmodalviewKeuanganLabaRugi()
    document.getElementById('modalviewKeuanganLabaRugi_priodebulan').value = '<?= $bulan ?>';
    document.getElementById('modalviewKeuanganLabaRugi_caritahun').value = '<?= $tahun ?>';
    document.getElementById('modalviewKeuanganLabaRugi_priodebulan').disabled = true;
    document.getElementById('modalviewKeuanganLabaRugi_caritahun').disabled = true;

    function tampilmodalviewKeuanganLabaRugi() {
        $('#loadingmodalviewKeuanganLabaRugi').show();
        var param = {
            bulan: <?= $bulan ?>,
            tahun: <?= $tahun ?>
        };

        apiPOST('Keuangan/list_keuanganLabaRugi', param, hasil => {
            $('#loadingmodalviewKeuanganLabaRugi').hide();
            $('#modalviewKeuanganLabaRugi_daftar tbody').html('');
            var a = hasil['data'];
            var b = hasil['debitkredit'];
            var Baris = '';

            if (hasil['data'] !== null) {
                if (hasil['code'] == 'XX') {
                    toastr.error("Data tidak ditemukan");
                    var Baris = "";
                    Baris += '<tr><td colspan="8" align="center">Data tidak ditemukan</td></tr>';
                    $('#modalviewKeuanganLabaRugi_daftar').append(Baris);
                } else {
                    document.getElementById('btnprintmodalviewKeuanganLabaRugi').hidden = false;
                    toastr.success("Data ditemukan");
                    for (var i = 0; i < a.length; i++) {
                        id_coa = a[i]['id_coa'];
                        coa = a[i]['coa'];
                        trans_d = a[i]['trans_d'];
                        trans_k = a[i]['trans_k'];
                        level = a[i]['level'];
                        normal = a[i]['normal'];
                        jumlah = a[i]['jumlah'];

                        var no = i + 1;

                        Baris += '<tr>';
                        Baris += '<td>' + no + '</td>';
                        if (normal == "INDUK" || normal == null) {
                            Baris += '<td style="display: flex;">';
                            Baris += '<button type="button" class="btn btn-xs btn-warning p-0" id="" onclick = "(bukamodmodalviewKeuanganLabaRugi(' + id_coa + '))" style="width:100%" disabled><i class="fa fa-pencil-alt"></i></button>';
                        } else {
                            Baris += '<td style="display: flex;">';
                            Baris += '<button type="button" class="btn btn-xs btn-warning p-0" id="" onclick = "(bukamodmodalviewKeuanganLabaRugi(' + id_coa + '))" style="width:100%"><i class="fa fa-pencil-alt"></i></button>';
                        }
                        if (id_coa == null) {
                            Baris += '<td></td>';
                        } else {
                            Baris += '<td>' + id_coa + '</td>';
                        }
                        if (normal == "INDUK") {
                            if (level == 1) {
                                Baris += '<td>' + coa + '</td>';
                            }
                            if (level == 2 || level == 5) {
                                Baris += '<td style="padding-left: 20px;">' + coa + '</td>';
                            }
                        } else {
                            if (level == 5 || level == null) {
                                Baris += '<td style="padding-left: 30px;">' + coa + '</td>';
                            }
                        }
                        if (normal == "INDUK" || normal == null) {
                            Baris += '<td></td>';
                            Baris += '<td></td>';
                            Baris += '<td></td>';
                            if (normal == null) {
                                Baris += '<td class="text-right">' + formatMoney(jumlah) + '</td>';
                            } else {
                                Baris += '<td></td>';
                            }
                        } else {
                            Baris += '<td class="text-right">' + formatMoney(trans_d) + '</td>';
                            Baris += '<td class="text-right">' + formatMoney(trans_k) + '</td>';
                            Baris += '<td class="text-right">' + formatMoney(jumlah) + '</td>';
                            Baris += '<td></td>';
                        }
                        // Baris += '<td class="text-right">' + formatMoney(trans_d) + '</td>';
                        // Baris += '<td class="text-right">' + formatMoney(trans_k) + '</td>';
                        // Baris += '<td class="text-right">' + formatMoney(jumlah) + '</td>';
                        // Baris += '<td class="text-right">' + formatMoney(jumlah) + '</td>';

                    }
                    for (var i = 0; i < b.length; i++) {
                        document.getElementById('modalviewKeuanganLabaRugi_Debit').value = formatMoney(b[i]['debit']);
                        document.getElementById('modalviewKeuanganLabaRugi_Kredit').value = formatMoney(b[i]['kredit']);
                        document.getElementById('modalviewKeuanganLabaRugi_LabaRugi').value = formatMoney(b[i]['kredit'] - b[i]['debit']);
                    }
                    $('#modalviewKeuanganLabaRugi_daftar').append(Baris);

                }
            }
        });
    }

    function printmodalviewKeuanganLabaRugi() {
        var param = {
            bulan: document.getElementById('modalviewKeuanganLabaRugi_priodebulan').value,
            tahun: document.getElementById('modalviewKeuanganLabaRugi_caritahun').value
        };
        newTabPOST('API/Keuangan/printlist_keuanganLabaRugi', param);
        return;
    }

    function modmodalviewKeuanganNeraca_kembalikeawal() {
        $('#modal_modalviewKeuanganLabaRugi').hide();
        $('#keuanganTutupBulan_listtransaksi1').show();
        $('#keuanganTutupBulan_listtransaksi2').show();
        $('.modal-backdrop').hide();

    }

    function bukamodmodalviewKeuanganLabaRugi(flag, id) {
        var data = {
            flag: flag,
            id_transaksi: id
        }
        var datax = JSON.stringify(data);
        $('.modmodalviewKeuanganLabaRugi_content').load('Keuanganku/modmodalviewKeuanganLabaRugi?data=' + datax);
    }
</script>