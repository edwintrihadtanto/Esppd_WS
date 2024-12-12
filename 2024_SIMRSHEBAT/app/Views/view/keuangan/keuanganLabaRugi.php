<?php
$nowday     = date('Y-m-d');
//$nextday    = date('Y-m-d', strtotime('+1 days', strtotime($nowday))); 
$nextday    = $nowday;
?>

<div class="col-md-12 p-2" id="keuanganLabaRugi_listtransaksi1">
    <div class="card card-outline card-default mb-0">
        <div class="card-body p-2">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-12 p-1">
                    <div class="info-box mb-0 pb-0">
                        <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td>Bulan</td>
                                <td>:</td>
                                <td>
                                    <select class="form-control form-control-xs" id="keuanganLabaRugi_priodebulan" name="keuanganLabaRugi_priodebulan" value='12'>
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
                                    <select class="form-control form-control-xs" id="keuanganLabaRugi_caritahun" name="keuanganLabaRugi_caritahun" value="2023"></select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <button type="button" class="btn btn-secondary btn-xs" onclick="tampilkeuanganLabaRugi()"><i class="fa fa-search"></i> Cari</button>
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
                                        <input type="text" style="direction:RTL;" class="form-control form-control-xs" id="keuanganLabaRugi_Debit" value="0" disabled>
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
                                        <input type="text" style="direction:RTL;" class="form-control form-control-xs" id="keuanganLabaRugi_Kredit" value="0" disabled>
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
                                        <input type="text" style="direction:RTL;" class="form-control form-control-xs" id="keuanganLabaRugi_LabaRugi" value="0" disabled>
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

<div class="col-md-12 p-2" id="keuanganLabaRugi_listtransaksi2">
    <div class="card card-outline">
        <div class="overlay-wrapper" id="loadingkeuanganLabaRugi">
            <div class="overlay">
                <i class="fas fa-3x fa-sync-alt fa-spin"></i>
            </div>
        </div>
        <div class="card-body p-1">
            <div class="card" style="box-shadow: 0 0 3px #343a40; margin-bottom: 0;">
                <div class="card-header p-1">
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="hr6-custom" id="keuanganLabaRugi_titleheader"><i class="fas fa-boxes"></i> </i> Laba Rugi</h6>
                            <div>

                            </div>
                        </div>
                    </div>
                    <button type="button" id="btnprintkeuanganLabaRugi" class="btn btn-secondary btn-xs" onclick="printkeuanganLabaRugi()" hidden><i class="fa fa-print"></i> Print</button>
                    <!-- END LETAK BUTTON -->
                </div>
            </div>
            <div style="max-height: 420px; overflow: auto;">
                <table id="keuanganLabaRugi_daftar" class="table table-striped table-sm choose table-bordered">
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


<div class="modkeuanganLabaRugi_content"></div>
<style>
    .tab1 {
        tab-size: 2;
        display: inline-block;
    }

    .tab2 {
        tab-size: 4;
        display: inline-block;
    }

    .tab4 {
        tab-size: 8;
        display: inline-block;
    }
</style>

<script>
    var nowday = "<?php echo $nowday; ?>";
    var nextday = "<?php echo $nextday; ?>";

    cekkeuanganLabaRugi = document.getElementById('keuanganTutupBulan_bulantolabarugi')
    if (cekkeuanganLabaRugi == null) {
        document.getElementById('keuanganLabaRugi_priodebulan').value = '1';
    } else {
        keuanganLabaRugi_priodebulan = document.getElementById('keuanganTutupBulan_bulantolabarugi').value;
        document.getElementById('keuanganLabaRugi_priodebulan').value = keuanganLabaRugi_priodebulan;
    }



    $('#loadingkeuanganLabaRugi').hide();
    /* tampilkeuanganLabaRugi(); */
    listtahun()

    function listtahun() {
        const tahun = new Date();
        var Option = '';
        for (i = tahun.getFullYear(); i >= 2000; i -= 1) {
            Option += "<option value='" + i + "'>" + i + "</option>";
        }
        document.getElementById('keuanganLabaRugi_caritahun').innerHTML = Option;
    }

    function tampilkeuanganLabaRugi() {
        $('#loadingkeuanganLabaRugi').show();
        var param = {
            bulan: document.getElementById('keuanganLabaRugi_priodebulan').value,
            tahun: document.getElementById('keuanganLabaRugi_caritahun').value
        };

        apiPOST('Keuangan/list_keuanganLabaRugi', param, hasil => {
            $('#loadingkeuanganLabaRugi').hide();
            $('#keuanganLabaRugi_daftar tbody').html('');
            var a = hasil['data'];
            var b = hasil['debitkredit'];
            var Baris = '';

            if (hasil['data'] !== null) {
                if (hasil['code'] == 'XX') {
                    toastr.error("Data tidak ditemukan");
                    var Baris = "";
                    Baris += '<tr><td colspan="8" align="center">Data tidak ditemukan</td></tr>';
                    $('#keuanganLabaRugi_daftar').append(Baris);
                } else {
                    document.getElementById('btnprintkeuanganLabaRugi').hidden = false;
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
                            Baris += '<button type="button" class="btn btn-xs btn-warning p-0" id="" onclick = "(bukamodkeuanganLabaRugi(' + id_coa + '))" style="width:100%" disabled><i class="fa fa-pencil-alt"></i></button>';
                            Baris += '</td>';
                        } else {
                            Baris += '<td style="display: flex;">';
                            Baris += '<button type="button" class="btn btn-xs btn-warning p-0" id="" onclick = "(bukamodkeuanganLabaRugi(' + id_coa + '))" style="width:100%"><i class="fa fa-pencil-alt"></i></button>';
                            Baris += '</td>';
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
                        document.getElementById('keuanganLabaRugi_Debit').value = formatMoney(b[i]['debit']);
                        document.getElementById('keuanganLabaRugi_Kredit').value = formatMoney(b[i]['kredit']);
                        document.getElementById('keuanganLabaRugi_LabaRugi').value = formatMoney(b[i]['kredit'] - b[i]['debit']);
                    }
                    $('#keuanganLabaRugi_daftar').append(Baris);

                }
            }
        });
    }

    function printkeuanganLabaRugi() {
        var param = {
            bulan: document.getElementById('keuanganLabaRugi_priodebulan').value,
            tahun: document.getElementById('keuanganLabaRugi_caritahun').value
        };
        newTabPOST('API/Keuangan/printlist_keuanganLabaRugi', param);
        return;
    }

    function bukamodkeuanganLabaRugi(flag, id) {
        var data = {
            flag: flag,
            id_transaksi: id
        }
        var datax = JSON.stringify(data);
        $('.modkeuanganLabaRugi_content').load('Keuanganku/modkeuanganLabaRugi?data=' + datax);
    }
</script>