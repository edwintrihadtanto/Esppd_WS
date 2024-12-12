<?php
$nowday     = date('Y-m-d');
//$nextday    = date('Y-m-d', strtotime('+1 days', strtotime($nowday))); 
$nextday    = $nowday;
?>

<div class="col-md-12 p-2" id="keuanganBukuBesar_listtransaksi1">
    <div class="card card-outline card-default mb-0">
        <div class="card-body p-1">
            <div class="row p-1">
                <div class="col-md-4 col-sm-6 col-12 p-1">
                    <div class="info-box mb-0">
                        <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td width="70">ID COA</td>
                                <td>:</td>
                                <td>
                                    <input type="text" class="form-control form-control-xs" id="keuanganBukuBesar_idacc" disabled>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-info btn-xs" onclick="keuanganBukuBesarviewAccount()"><i class="fas fa-search"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td width="70">Kode COA</td>
                                <td>:</td>
                                <td>
                                    <input type="text" class="form-control form-control-xs" id="keuanganBukuBesar_kodecoa" disabled>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-xs" onclick="modKeuanganBukuBesar_reset()"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>COA</td>
                                <td>:</td>
                                <td>
                                    <input type="text" class="form-control form-control-xs" id="keuanganBukuBesar_coa" disabled>
                                    <input type="text" class="form-control form-control-xs" id="keuanganBukuBesar_normal" disabled hidden>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-12 p-1">
                    <div class="info-box mb-0">
                        <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td>Tanggal</td>
                                <td>:</td>
                                <td>
                                    <input type="date" class="form-control form-control-xs" id="keuanganBukuBesar_tanggal">
                                </td>
                            </tr>
                            <tr>
                                <td>s/d</td>
                                <td>:</td>
                                <td>
                                    <input type="date" class="form-control form-control-xs" id="keuanganBukuBesar_tanggalsd">
                                </td>
                            </tr>
                        </table>
                    </div>
                    <button type="button" class="btn btn-info btn-xs" onclick="keuanganBukuBesarcariList()"><i class="fas fa-search"></i> Cari</button>
                </div>
                <div class="col-md-4 col-sm-6 col-12 p-1">
                    <div class="info-box mb-0">
                        <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td>Saldo Awal</td>
                                <td>:</td>
                                <td>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text form-control-xs">Rp.</span>
                                        </div>
                                        <input type="text" style="direction:RTL;" class="form-control form-control-xs" id="keuanganBukuBesar_saldoawal" value="0" disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Saldo Transaksi</td>
                                <td>:</td>
                                <td>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text form-control-xs">Rp.</span>
                                        </div>
                                        <input type="text" style="direction:RTL;" class="form-control form-control-xs" id="keuanganBukuBesar_saldotrans" value="0" disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Saldo Akhir</td>
                                <td>:</td>
                                <td>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text form-control-xs">Rp.</span>
                                        </div>
                                        <input type="text" style="direction:RTL;" class="form-control form-control-xs" id="keuanganBukuBesar_saldoakhir" value="0" disabled>
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

<div class="col-md-12 p-2" id="keuanganBukuBesar_listtransaksi2">
    <div class="card card-outline">
        <!-- <div class="overlay-wrapper" id="loadingkeuanganBukuBesar">
            <div class="overlay">
                <i class="fas fa-3x fa-sync-alt fa-spin"></i>
            </div>
        </div> -->

        <div class="card-body p-1" style="max-height: 420px; overflow: auto;">
            <div class="card" style="box-shadow: 0 0 3px #343a40; margin-bottom: 0;">
                <div class="card-header p-1">
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="hr6-custom" id="keuanganBukuBesar_titleheader"><i class="fas fa-boxes"></i> </i> Buku Besar</h6>
                            <div>
                                <button type="button" class="btn btn-info btn-xs" onclick="tampilkeuanganBukuBesar()" hidden><i class="fa fa-sync-alt fa-spin"></i> Refresh Data</button>
                            </div>
                        </div>
                    </div>
                    <!-- END LETAK BUTTON -->
                </div>
            </div>

            <table id="keuanganBukuBesar_daftar" class="table table-striped table-sm choose table-bordered">
                <thead>
                    <tr>
                        <th rowspan="2" class="pl-0" width="10" style="text-align:center;">No.</th>
                        <th rowspan="2" width="50"></th>
                        <th rowspan="2" width="50">Tanggal </th>
                        <th rowspan="2" width="150">Keterangan</th>
                        <th rowspan="2" width="50">ID GL</th>
                        <th rowspan="2" width="50">Debit</th>
                        <th rowspan="2" width="50">Kredit</th>
                        <th colspan="2" class="text-center">Saldo</th>
                    </tr>
                    <tr>
                        <th width="50">Debit</th>
                        <th width="50">Kredit</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

    </div>
</div>

<div class="modKeuanganBukuBesar_ListAccount_content"></div>
<div class="modkeuanganBukuBesar_content"></div>

<script>
    var nowday = '<?= $nowday ?>'

    document.getElementById('keuanganBukuBesar_tanggal').value = nowday;
    document.getElementById('keuanganBukuBesar_tanggalsd').value = nowday;

    function keuanganBukuBesarcariList() {
        id_coa = document.getElementById('keuanganBukuBesar_idacc').value;
        normal = document.getElementById('keuanganBukuBesar_normal').value;
        if (id_coa == '') {
            keuanganBukuBesarviewAccount()
        } else {

            $('#loadingkeuanganBukuBesar').show();

            var param = {
                id_coa: document.getElementById('keuanganBukuBesar_idacc').value,
                tgl_transaksi: document.getElementById('keuanganBukuBesar_tanggal').value,
                tgl_transaksisd: document.getElementById('keuanganBukuBesar_tanggalsd').value,
            };

            apiPOST("Keuangan/list_keuanganBukuBesar", param, hasil => {
                $('#loadingkeuanganBukuBesar').hide();
                $('#keuanganBukuBesar_daftar tbody').html('');
                var a = hasil['data'];
                var b = hasil['saldoawal'];
                tgl_trans = document.getElementById('keuanganBukuBesar_tanggal').value;

                var Baris = "";
                /* if (hasil['code'] !== 'XX') { */
                if (b.length !== 0) {
                    for (var i = 0; i < b.length; i++) {
                        var id_acc = b[i].id_acc;
                        var sumsaldo = b[i].sumsaldo;

                        Baris += '<tr>';
                        Baris += '<td>1</td>';
                        Baris += '<td style="display: flex;">';
                        // Baris += '<button type="button" class="btn btn-xs btn-warning" id="" onclick = "(editBukuBesar())" style="width:100%"><i class="fa fa-pencil-alt"></i></button>';
                        // Baris += '<button type="button" class="btn btn-xs btn-danger" id="" onclick="(editBukuBesar())" style="width:100%"><i class="fa fa-times"></i></button>';
                        Baris += '</td>'
                        Baris += '<td>' + tgl_trans + '</td>';
                        Baris += '<td>Saldo Awal</td>';
                        Baris += '<td></td>';
                        Baris += '<td class="text-right">' + formatMoney(0) + '</td>';
                        Baris += '<td class="text-right">' + formatMoney(0) + '</td>';
                        if (normal == 'DEBET') {
                            Baris += '<td class="text-right">' + formatMoney(sumsaldo) + '</td>';
                            Baris += '<td class="text-right">' + formatMoney(0) + '</td>';
                        } else {
                            Baris += '<td class="text-right">' + formatMoney(0) + '</td>';
                            Baris += '<td class="text-right">' + formatMoney(sumsaldo) + '</td>';
                        }
                        Baris += '</tr>';
                    }
                } else {
                    var sumsaldo = 0;
                    Baris += '<tr>';
                    Baris += '<td>1</td>';
                    Baris += '<td style="display: flex;">';
                    // Baris += '<button type="button" class="btn btn-xs btn-warning" id="" onclick = "(editBukuBesar())" style="width:100%"><i class="fa fa-pencil-alt"></i></button>';
                    // Baris += '<button type="button" class="btn btn-xs btn-danger" id="" onclick="(editBukuBesar())" style="width:100%"><i class="fa fa-times"></i></button>';
                    Baris += '</td>'
                    Baris += '<td>' + tgl_trans + '</td>';
                    Baris += '<td>Saldo Awal</td>';
                    Baris += '<td></td>';
                    Baris += '<td class="text-right">' + formatMoney(0) + '</td>';
                    Baris += '<td class="text-right">' + formatMoney(0) + '</td>';
                    Baris += '<td class="text-right">' + formatMoney(sumsaldo) + '</td>';
                    Baris += '<td class="text-right">' + formatMoney(sumsaldo) + '</td>';
                    Baris += '</tr>';
                }

                if (normal == 'DEBET') {
                    let saldo = sumsaldo;
                    let saldoawal = sumsaldo;
                    document.getElementById('keuanganBukuBesar_saldoawal').value = formatMoney(saldo);
                    let saldotrans = 0;

                    if (hasil['data'] !== null) {
                        for (var i = 0; i < a.length; i++) {
                            var id_jurnal = a[i].id_jurnal;
                            var id_gl = a[i].id_gl;
                            var date_created = a[i].date_created;
                            var keterangan = a[i].keterangan;
                            var debit = a[i].debit;
                            var kredit = a[i].kredit;
                            var no = i + 2;
                            if (normal == 'DEBET') {
                                saldo = parseInt(saldo) + (parseInt(debit) - parseInt(kredit));
                            } else {
                                saldo = parseInt(saldo) + (parseInt(kredit) - parseInt(debit));
                            }


                            Baris += '<tr>';
                            Baris += '<td>' + no + '</td>';
                            Baris += '<td style="display: flex;">';
                            Baris += '<button type="button" class="btn btn-xs btn-warning p-0" id="" onclick = "(bukamodkeuanganBukuBesar_detail(' + id_jurnal + '))" style="width:100%"><i class="fa fa-pencil-alt"></i></button>';
                            // Baris += '<button type="button" class="btn btn-xs btn-danger" id="" onclick="(editBukuBesar())" style="width:100%"><i class="fa fa-times"></i></button>';
                            Baris += '</td>';
                            Baris += '<td>' + date_created + '</td>';
                            Baris += '<td>' + keterangan + '</td>';
                            Baris += '<td>' + id_gl + '</td>';
                            Baris += '<td class="text-right">' + formatMoney(debit) + '</td>';
                            Baris += '<td class="text-right">' + formatMoney(kredit) + '</td>';
                            Baris += '<td class="text-right">' + formatMoney(saldo) + '</td>';
                            Baris += '<td class="text-right">' + formatMoney(0) + '</td>';
                            Baris += '</tr>';
                            saldotrans = parseInt(saldotrans) + (parseInt(debit) - parseInt(kredit))

                        }
                    }
                    document.getElementById('keuanganBukuBesar_saldotrans').value = formatMoney(saldotrans);
                    document.getElementById('keuanganBukuBesar_saldoakhir').value = formatMoney(parseInt(saldoawal) +
                        parseInt(saldotrans));
                } else {
                    let saldo = sumsaldo;
                    let saldoawal = sumsaldo;
                    document.getElementById('keuanganBukuBesar_saldoawal').value = formatMoney(saldo);
                    let saldotrans = 0;

                    if (hasil['data'] !== null) {
                        for (var i = 0; i < a.length; i++) {
                            var id_jurnal = a[i].id_jurnal;
                            var id_gl = a[i].id_gl;
                            var date_created = a[i].date_created;
                            var keterangan = a[i].keterangan;
                            var debit = a[i].debit;
                            var kredit = a[i].kredit;
                            var no = i + 2;
                            saldo = parseInt(saldo) + (parseInt(kredit) - parseInt(debit));


                            Baris += '<tr>';
                            Baris += '<td>' + no + '</td>';
                            Baris += '<td style="display: flex;">';
                            Baris += '<button type="button" class="btn btn-xs btn-warning p-0" id="" onclick = "(bukamodkeuanganBukuBesar_detail(' + id_jurnal + '))" style="width:100%"><i class="fa fa-pencil-alt"></i></button>';
                            // Baris += '<button type="button" class="btn btn-xs btn-danger" id="" onclick="(editBukuBesar())" style="width:100%"><i class="fa fa-times"></i></button>';
                            Baris += '</td>';
                            Baris += '<td>' + date_created + '</td>';
                            Baris += '<td>' + keterangan + '</td>';
                            Baris += '<td>' + id_gl + '</td>';
                            Baris += '<td class="text-right">' + formatMoney(debit) + '</td>';
                            Baris += '<td class="text-right">' + formatMoney(kredit) + '</td>';
                            Baris += '<td class="text-right">' + formatMoney(0) + '</td>';
                            Baris += '<td class="text-right">' + formatMoney(saldo) + '</td>';
                            Baris += '</tr>';

                            if (normal == 'DEBET') {
                                saldotrans = parseInt(saldotrans) + (parseInt(debit) - parseInt(kredit))
                            } else {
                                saldotrans = parseInt(saldotrans) + (parseInt(kredit) - parseInt(debit))
                            }
                        }
                    }
                    document.getElementById('keuanganBukuBesar_saldotrans').value = formatMoney(saldotrans);
                    document.getElementById('keuanganBukuBesar_saldoakhir').value = formatMoney(parseInt(saldoawal) +
                        parseInt(saldotrans));
                }
                /* console.log(saldo)
                let saldotrans = 0;

                if (hasil['data'] !== null) {
                    for (var i = 0; i < a.length; i++) {
                        var id_jurnal = a[i].id_jurnal;
                        var id_gl = a[i].id_gl;
                        var date_created = a[i].date_created;
                        var keterangan = a[i].keterangan;
                        var debit = a[i].debit;
                        var kredit = a[i].kredit;
                        var no = i + 2;
                        if (normal == 'DEBIT') {
                            saldo = parseInt(saldo) + (parseInt(debit) - parseInt(kredit));
                        } else {
                            saldo = parseInt(saldo) + (parseInt(kredit) - parseInt(debit));
                        }


                        Baris += '<tr>';
                        Baris += '<td>' + no + '</td>';
                        Baris += '<td style="display: flex;">';
                        Baris += '<button type="button" class="btn btn-xs btn-warning" id="" onclick = "(editBukuBesar())" style="width:100%"><i class="fa fa-pencil-alt"></i></button>';
                        Baris += '<button type="button" class="btn btn-xs btn-danger" id="" onclick="(editBukuBesar())" style="width:100%"><i class="fa fa-times"></i></button>';
                        Baris += '</td>';
                        Baris += '<td>' + date_created + '</td>';
                        Baris += '<td>' + keterangan + '</td>';
                        Baris += '<td>' + id_gl + '</td>';
                        Baris += '<td class="text-right">' + debit + '</td>';
                        Baris += '<td class="text-right">' + kredit + '</td>';
                        Baris += '<td class="text-right">' + saldo + '</td>';
                        Baris += '<td class="text-right">0</td>';
                        Baris += '</tr>';

                        if (normal == 'DEBIT') {
                            saldotrans = parseInt(saldotrans) + (parseInt(debit) - parseInt(kredit))
                        } else {
                            saldotrans = parseInt(saldotrans) + (parseInt(kredit) - parseInt(debit))
                        }
                    }

                } */
                /* document.getElementById('keuanganBukuBesar_saldotrans').value = saldotrans;
                document.getElementById('keuanganBukuBesar_saldoakhir').value = parseInt(saldoawal) +
                    parseInt(saldotrans); */
                $('#keuanganBukuBesar_daftar').append(Baris);
            });
        }

    }

    function editBukuBesar() {
        toastr.error("Belum Bisa");
    }

    function keuanganBukuBesarviewAccount() {
        $('.modKeuanganBukuBesar_ListAccount_content').load('Keuangan/modKeuanganBukuBesar_ListAccount');
    }


    $('#loadingkeuanganBukuBesar').hide();

    function modKeuanganBukuBesar_reset() {
        document.getElementById("keuanganBukuBesar_idacc").value = '';
        document.getElementById("keuanganBukuBesar_kodecoa").value = '';
        document.getElementById("keuanganBukuBesar_coa").value = '';
    }

    function modKeuanganBukuBesar_pilih(id_acc, id_coa, coa, normal) {
        // keluarmodKeuanganBukuBesar_ListAccount_daftar()
        document.getElementById("keuanganBukuBesar_idacc").value = id_acc;
        document.getElementById("keuanganBukuBesar_kodecoa").value = id_coa;
        document.getElementById("keuanganBukuBesar_coa").value = coa;
        document.getElementById("keuanganBukuBesar_normal").value = normal;
    }

    function bukamodkeuanganBukuBesar_detail(id_jurnal) {
        var data = {
            id_jurnal: id_jurnal,
            textid: 'BB'
        }
        var datax = JSON.stringify(data);
        $('.modkeuanganBukuBesar_content').load('Keuangan/modKeuanganJurnalUmum?data=' + datax);
    }
</script>