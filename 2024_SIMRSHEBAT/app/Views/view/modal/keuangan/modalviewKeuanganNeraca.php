<?php
$nowday     = date('Y-m-d');
//$nextday    = date('Y-m-d', strtotime('+1 days', strtotime($nowday))); 
$nextday    = $nowday;

$data = json_decode($_GET['data']);
$bulan       = str_replace('"', '', json_encode($data->bulan));
$tahun       = str_replace('"', '', json_encode($data->tahun));
?>
<div class="content modal fade" id="modal_modalviewKeuanganNeraca">
    <div class="container-fluid">
        <div class="modal-dialog modal-xl" style="min-width: 100%;">
            <!-- <div class="card card-row"> -->
            <div class="modal-content" style="overflow: auto;">
                <div class="row p-1">
                    <div class="col-md-12 p-2" id="modalviewKeuanganNeraca_listtransaksi1">
                        <div class="card card-outline card-default mb-0">
                            <div class="card-body p-2 darkgrey-custom">
                                <div class="row row-custom">
                                    <div class="col-sm-auto">
                                        <div class="form-group">
                                            <label for="modalviewKeuanganNeraca_priodebulan">Periode Bulan :</label>
                                            <select class="form-control form-control-xs" id="modalviewKeuanganNeraca_priodebulan" name="modalviewKeuanganNeraca_priodebulan">
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
                                        </div>
                                    </div>
                                    <div class="col-sm-auto">
                                        <div class="form-group">
                                            <label for="modalviewKeuanganNeraca_caritahun">Tahun</label>
                                            <div class="input-group">
                                                <select class="form-control form-control-xs" id="modalviewKeuanganNeraca_caritahun" name="modalviewKeuanganNeraca_caritahun"></select>
                                                <button type="button" class="btn btn-secondary btn-xs" onclick="tampilmodalviewKeuanganNeraca()" hidden><i class="fa fa-search"></i> Cari</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 p-2" id="modalviewKeuanganNeraca_listtransaksi2">
                        <div class="card card-outline">
                            <div class="overlay-wrapper" id="loadingmodalviewKeuanganNeraca">
                                <div class="overlay">
                                    <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                                </div>
                            </div>
                            <div class="card-body p-1">
                                <div class="card" style="box-shadow: 0 0 3px #343a40; margin-bottom: 0;">
                                    <div class="card-header p-1">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h6 class="hr6-custom" id="modalviewKeuanganNeraca_titleheader"><i class="fas fa-boxes"></i> </i> Neraca</h6>
                                                <div>

                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-outline-danger btn-xs" onclick="modmodalviewKeuanganNeraca_kembalikeawal()"><i class="fa fa-print"></i> Kembali</button>
                                        <button type="button" id="btnprintmodalviewKeuanganNeraca" class="btn btn-secondary btn-xs" onclick="printmodalviewKeuanganNeraca()" hidden><i class="fa fa-print"></i> Print</button>
                                        <!-- END LETAK BUTTON -->
                                    </div>
                                </div>
                                <div style="max-height: 420px; overflow: auto;">
                                    <table id="modalviewKeuanganNeraca_daftar" class="table table-striped table-sm choose">
                                        <thead>
                                            <tr class="text-center" style="vertical-align: center;">
                                                <th rowspan="2" class="pl-0" width="10">No.</th>
                                                <th rowspan="2" width="10"></th>
                                                <th rowspan="2" width="50">Bulan</th>
                                                <th style="vertical-align: center;" rowspan="2" width="50">Tahun</th>
                                                <th style="vertical-align: center;" rowspan="2" width="50">Kode</th>
                                                <th rowspan="2" width="150">COA</th>
                                                <th colspan="2" width="100">Saldo Awal</th>
                                                <th colspan="2" width="100">Transaksi</th>
                                                <th colspan="2" width="100">Saldo Akhir</th>
                                            </tr>
                                            <tr class="text-center">
                                                <th width="100">Debit</th>
                                                <th width="100">Kredit</th>
                                                <th width="100">Debit</th>
                                                <th width="100">Kredit</th>
                                                <th width="100">Debit</th>
                                                <th width="100">Kredit</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modmodalviewKeuanganNeraca_content"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var nowday = "<?php echo $nowday; ?>";
    var nextday = "<?php echo $nextday; ?>";
    showUp_modalviewKeuanganNeraca()

    function showUp_modalviewKeuanganNeraca() {
        $("#modal_modalviewKeuanganNeraca").modal({
            backdrop: "static"
        });
        $('#modal_modalviewKeuanganNeraca').on('shown.bs.modal', function() {});
    }


    /* cekmodalviewKeuanganNeraca = document.getElementById('keuanganTutupBulan_bulantoneraca')
    if (cekmodalviewKeuanganNeraca == null) {
        document.getElementById('modalviewKeuanganNeraca_priodebulan').value = '1';
    } else {
        modalviewKeuanganNeraca_priodebulan = document.getElementById('keuanganTutupBulan_bulantoneraca').value;
        document.getElementById('modalviewKeuanganNeraca_priodebulan').value = modalviewKeuanganNeraca_priodebulan;
    } */



    $('#loadingmodalviewKeuanganNeraca').hide();
    /* tampilmodalviewKeuanganNeraca(); */
    listtahun()

    function listtahun() {
        const tahun = new Date();
        var Option = '';
        for (i = tahun.getFullYear(); i >= 2000; i -= 1) {
            Option += "<option value='" + i + "'>" + i + "</option>";
        }
        document.getElementById('modalviewKeuanganNeraca_caritahun').innerHTML = Option;
    }

    document.getElementById('modalviewKeuanganNeraca_priodebulan').value = '<?= $bulan ?>';
    document.getElementById('modalviewKeuanganNeraca_caritahun').value = '<?= $tahun ?>';
    document.getElementById('modalviewKeuanganNeraca_priodebulan').disabled = true;
    document.getElementById('modalviewKeuanganNeraca_caritahun').disabled = true;
    tampilmodalviewKeuanganNeraca()

    function tampilmodalviewKeuanganNeraca() {
        $('#loadingmodalviewKeuanganNeraca').show();

        var param = {
            bulan: <?= $bulan ?>,
            tahun: <?= $tahun ?>
        };

        apiPOST('Keuangan/list_keuanganNeraca', param, hasil => {
            $('#loadingmodalviewKeuanganNeraca').hide();
            $('#modalviewKeuanganNeraca_daftar tbody').html('');
            var a = hasil['data'];
            var Baris = '';
            var listbulan = [null, "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
            let sumawal_d = 0;
            let sumawal_k = 0;
            let sumtrans_d = 0;
            let sumtrans_k = 0;
            let sumahir_d = 0;
            let sumahir_k = 0;
            bulan = document.getElementById('modalviewKeuanganNeraca_priodebulan').value;
            tahun = document.getElementById('modalviewKeuanganNeraca_caritahun').value;

            if (hasil['data'] !== null) {
                if (hasil['code'] == 'XX') {
                    toastr.error("Data tidak ditemukan");
                    var Baris = "";
                    Baris += '<tr><td colspan="12" align="center">Data tidak ditemukan</td></tr>';
                    $('#modalviewKeuanganNeraca_daftar').append(Baris);
                } else {
                    document.getElementById('btnprintmodalviewKeuanganNeraca').hidden = false;
                    toastr.success("Data ditemukan");
                    for (var i = 0; i < a.length; i++) {
                        id_acc = a[i]['id_acc'];
                        id_coa = a[i]['id_coa'];
                        coa = a[i]['coa'];
                        awal_d = a[i]['awald'];
                        awal_k = a[i]['awalk'];
                        trans_d = a[i]['transd'];
                        trans_k = a[i]['transk'];
                        ahir_d = a[i]['ahird'];
                        ahir_k = a[i]['ahirk'];
                        no = i + 1;

                        Baris += '<tr>';
                        Baris += '<td>' + no + '</td>';
                        Baris += '<td style="display: flex;">';
                        Baris += '<button type="button" class="btn btn-xs btn-warning" id="" onclick = "(bukamodkeuanganNeracaBB(' + "'" + id_acc + "','" + bulan + "','" + tahun + "'" + '))" style="width:100%"><i class="fa fa-pencil-alt"></i></button>';
                        /* Baris += '<button type="button" class="btn btn-xs btn-danger" id="" onclick = "(bukamodkeuanganNeraca(' + bulan + '))" style="width:100%"><i class="fa fa-times"></i></button>'; */
                        Baris += '</td>';
                        Baris += '<td>' + listbulan[bulan] + '</td>';
                        Baris += '<td>' + tahun + '</td>';
                        Baris += '<td>' + id_coa + '</td>';
                        Baris += '<td>' + coa + '</td>';
                        Baris += '<td class="text-right">' + formatMoney(awal_d) + '</td>';
                        Baris += '<td class="text-right">' + formatMoney(awal_k) + '</td>';
                        Baris += '<td class="text-right">' + formatMoney(trans_d) + '</td>';
                        Baris += '<td class="text-right">' + formatMoney(trans_k) + '</td>';
                        Baris += '<td class="text-right">' + formatMoney(ahir_d) + '</td>';
                        Baris += '<td class="text-right">' + formatMoney(ahir_k) + '</td>';
                        Baris += '</tr>';

                        sumawal_d += parseFloat(awal_d);
                        sumawal_k += parseFloat(awal_k);
                        sumtrans_d += parseFloat(trans_d);
                        sumtrans_k += parseFloat(trans_k);
                        sumahir_d += parseFloat(ahir_d);
                        sumahir_k += parseFloat(ahir_k);
                    }

                    Baris += '<tr>'
                    Baris += '<td colspan="6"></td>';
                    Baris += '<td class="text-right">' + formatMoney(sumawal_d) + '</td>';
                    Baris += '<td class="text-right">' + formatMoney(sumawal_k) + '</td>';
                    Baris += '<td class="text-right">' + formatMoney(sumtrans_d) + '</td>';
                    Baris += '<td class="text-right">' + formatMoney(sumtrans_k) + '</td>';
                    Baris += '<td class="text-right">' + formatMoney(sumahir_d) + '</td>';
                    Baris += '<td class="text-right">' + formatMoney(sumahir_k) + '</td>';
                    Baris += '</tr>'
                    $('#modalviewKeuanganNeraca_daftar').append(Baris);

                }
            }
        });
    }

    function printmodalviewKeuanganNeraca() {
        var param = {
            bulan: document.getElementById('modalviewKeuanganNeraca_priodebulan').value,
            tahun: document.getElementById('modalviewKeuanganNeraca_caritahun').value
        };
        newTabPOST('API/Keuangan/printlist_keuanganNeraca', param);
        return;
    }

    function modmodalviewKeuanganNeraca_kembalikeawal() {
        $('#modal_modalviewKeuanganNeraca').hide();
        $('#keuanganTutupBulan_listtransaksi1').show();
        $('#keuanganTutupBulan_listtransaksi2').show();
        $('.modal-backdrop').hide();
    }

    function bukamodkeuanganNeracaBB(id_acc, bulan, tahun) {
        var data = {
            flag: 'neracatb',
            id_acc: id_acc,
            bulan: bulan,
            tahun: tahun
        }
        var datax = JSON.stringify(data);
        // $('#modalviewKeuanganNeraca_listtransaksi1').hide();
        // $('#modalviewKeuanganNeraca_listtransaksi2').hide();
        $('.modmodalviewKeuanganNeraca_content').load('Keuangan/modkeuanganNeracaBukuBesar?data=' + datax);
    }
</script>