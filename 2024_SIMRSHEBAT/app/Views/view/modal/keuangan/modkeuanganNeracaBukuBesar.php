<?php
$data = json_decode($_GET['data']);
$flag       = str_replace('"', '', json_encode($data->flag));
$id_acc       = str_replace('"', '', json_encode($data->id_acc));
$bulan       = str_replace('"', '', json_encode($data->bulan));
$tahun       = str_replace('"', '', json_encode($data->tahun));
$tanggal = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
$awal = date('Y-m-d', strtotime($tahun . '-' . $bulan . '-01'));
$akhir = date('Y-m-d', strtotime($tahun . '-' . $bulan . '-' . $tanggal));

/* if ($flag == 'neraca') { */
?>
<div class="content modal fade" id="modal_modkeuanganNeracaBukuBesar">
    <div class="container-fluid">
        <div class="modal-dialog modal-xl" style="min-width: 100%;">
            <div class="modal-content" style="overflow: auto;">
                <div class="row p-1">
                    <div class="col-md-12 p-2" id="modkeuanganNeracaBukuBesar_listtransaksi1">
                        <div class="card card-outline card-default mb-0">
                            <div class="card-body p-1">
                                <div class="row">
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-outline-danger btn-xs" onclick="modkeuanganNeracaBukuBesar_kembalikeawal()"><i class="fa fa-arrow-left"></i> Kembali</button>
                                    </div>
                                </div>
                                <div class="row p-1">
                                    <div class="col-md-4 col-sm-6 col-12 p-1">
                                        <div class="info-box mb-0">
                                            <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="70">ID COA</td>
                                                    <td>:</td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-xs" id="modkeuanganNeracaBukuBesar_idacc" disabled>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-info btn-xs" onclick="modkeuanganNeracaBukuBesarviewAccount()" hidden><i class="fas fa-search"></i></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="70">Kode COA</td>
                                                    <td>:</td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-xs" id="modkeuanganNeracaBukuBesar_kodecoa" disabled>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger btn-xs" onclick="modmodkeuanganNeracaBukuBesar_reset()" hidden><i class="fas fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>COA</td>
                                                    <td>:</td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-xs" id="modkeuanganNeracaBukuBesar_coa" disabled>
                                                        <input type="text" class="form-control form-control-xs" id="modkeuanganNeracaBukuBesar_normal" disabled hidden>
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
                                                        <input type="date" class="form-control form-control-xs" id="modkeuanganNeracaBukuBesar_tanggal" disabled>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>s/d</td>
                                                    <td>:</td>
                                                    <td>
                                                        <input type="date" class="form-control form-control-xs" id="modkeuanganNeracaBukuBesar_tanggalsd" disabled>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <button type="button" class="btn btn-info btn-xs" onclick="modkeuanganNeracaBukuBesarcariList()" hidden><i class="fas fa-search"></i> Cari</button>
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
                                                            <input type="text" style="direction:RTL;" class="form-control form-control-xs" id="modkeuanganNeracaBukuBesar_saldoawal" value="0" disabled>
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
                                                            <input type="text" style="direction:RTL;" class="form-control form-control-xs" id="modkeuanganNeracaBukuBesar_saldotrans" value="0" disabled>
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
                                                            <input type="text" style="direction:RTL;" class="form-control form-control-xs" id="modkeuanganNeracaBukuBesar_saldoakhir" value="0" disabled>
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

                    <div class="col-md-12 p-2" id="modkeuanganNeracaBukuBesar_listtransaksi2">
                        <div class="card card-outline">
                            <!-- <div class="overlay-wrapper" id="loadingmodkeuanganNeracaBukuBesar">
            <div class="overlay">
                <i class="fas fa-3x fa-sync-alt fa-spin"></i>
            </div>
        </div> -->

                            <div class="card-body p-1">
                                <div class="card" style="box-shadow: 0 0 3px #343a40; margin-bottom: 0;">
                                    <div class="card-header p-1">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h6 class="hr6-custom" id="modkeuanganNeracaBukuBesar_titleheader"><i class="fas fa-boxes"></i> </i> Buku Besar</h6>
                                                <div>
                                                    <button type="button" class="btn btn-info btn-xs" onclick="tampilmodkeuanganNeracaBukuBesar()" hidden><i class="fa fa-sync-alt fa-spin"></i> Refresh Data</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END LETAK BUTTON -->
                                    </div>
                                </div>
                                <div style="max-height: 300px; overflow: auto;">
                                    <table id="modkeuanganNeracaBukuBesar_daftar" class="table table-striped table-sm choose table-bordered">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" class="pl-0" width="10" style="text-align:center;">No.</th>
                                                <th rowspan="2" width="10"></th>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- <div class="modmodkeuanganNeracaBukuBesar_ListAccount_content"></div> -->
<div class="modkeuanganNeracaBukuBesar_content"></div>

<script>
    // $('.modkeuanganNeraca_content').show();
    var ncrFlag = '<?= $flag ?>';
    var nrcAwal = '<?= $awal ?>';
    var nrcAkhir = '<?= $akhir ?>';
    var nrcId_acc = '<?= $id_acc ?>';
    showUp_modkeuanganNeracaBukuBesar()
    if (ncrFlag == 'neraca') {}

    function showUp_modkeuanganNeracaBukuBesar() {
        $("#modal_modkeuanganNeracaBukuBesar").modal({
            backdrop: "static"
        });
        $('#modal_modkeuanganNeracaBukuBesar').on('shown.bs.modal', function() {});
    }

    modkeuanganNeracaBukuBesar_getaccount()

    function modkeuanganNeracaBukuBesar_getaccount() {
        var param = {
            id_acc: nrcId_acc,
        };
        apiPOST('Keuangan/getAccountbyIdacc', param, hasil => {
            if (hasil !== null) {
                a = hasil['data']
                for (var i = 0; i < a.length; i++) {
                    var id_acc = a[i].id_acc;
                    var id_coa = a[i].id_coa;
                    var coa = a[i].coa;
                    var normal = a[i].normal;
                    document.getElementById("modkeuanganNeracaBukuBesar_idacc").value = id_acc;
                    document.getElementById("modkeuanganNeracaBukuBesar_kodecoa").value = id_coa;
                    document.getElementById("modkeuanganNeracaBukuBesar_coa").value = coa;
                    document.getElementById("modkeuanganNeracaBukuBesar_normal").value = normal;
                    document.getElementById('modkeuanganNeracaBukuBesar_tanggal').value = nrcAwal;
                    document.getElementById('modkeuanganNeracaBukuBesar_tanggalsd').value = nrcAkhir;
                }
            }
            modkeuanganNeracaBukuBesarcariList()
        })
    }

    /* document.getElementById('modkeuanganNeracaBukuBesar_tanggal').value = nowday;
    document.getElementById('modkeuanganNeracaBukuBesar_tanggalsd').value = nowday; */

    function modkeuanganNeracaBukuBesarcariList() {
        id_coa = document.getElementById('modkeuanganNeracaBukuBesar_idacc').value;
        normal = document.getElementById('modkeuanganNeracaBukuBesar_normal').value;
        if (id_coa == '') {
            modkeuanganNeracaBukuBesarviewAccount()
        } else {

            $('#loadingmodkeuanganNeracaBukuBesar').show();

            var param = {
                id_coa: document.getElementById('modkeuanganNeracaBukuBesar_idacc').value,
                tgl_transaksi: document.getElementById('modkeuanganNeracaBukuBesar_tanggal').value,
                tgl_transaksisd: document.getElementById('modkeuanganNeracaBukuBesar_tanggalsd').value,
            };

            apiPOST("Keuangan/list_keuanganBukuBesar", param, hasil => {
                $('#loadingmodkeuanganNeracaBukuBesar').hide();
                $('#modkeuanganNeracaBukuBesar_daftar tbody').html('');
                var a = hasil['data'];
                var b = hasil['saldoawal'];
                tgl_trans = document.getElementById('modkeuanganNeracaBukuBesar_tanggal').value;

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
                        Baris += '</td>';
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
                    Baris += '</td>';
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
                    document.getElementById('modkeuanganNeracaBukuBesar_saldoawal').value = formatMoney(saldo);
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
                            Baris += '<button type="button" class="btn btn-xs btn-warning" id="" onclick = "(bukamodkeuanganNeracaBukuBesar_detail(' + id_jurnal + '))" style="width:100%"><i class="fa fa-pencil-alt"></i></button>';
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
                    document.getElementById('modkeuanganNeracaBukuBesar_saldotrans').value = formatMoney(saldotrans);
                    document.getElementById('modkeuanganNeracaBukuBesar_saldoakhir').value = formatMoney(parseInt(saldoawal) +
                        parseInt(saldotrans));
                } else {
                    let saldo = sumsaldo;
                    let saldoawal = sumsaldo;
                    document.getElementById('modkeuanganNeracaBukuBesar_saldoawal').value = formatMoney(saldo);
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
                            Baris += '<button type="button" class="btn btn-xs btn-warning" id="" onclick = "(bukamodkeuanganNeracaBukuBesar_detail(' + id_jurnal + '))" style="width:100%"><i class="fa fa-pencil-alt"></i></button>';
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
                    document.getElementById('modkeuanganNeracaBukuBesar_saldotrans').value = formatMoney(saldotrans);
                    document.getElementById('modkeuanganNeracaBukuBesar_saldoakhir').value = formatMoney(parseInt(saldoawal) +
                        parseInt(saldotrans));
                }
                $('#modkeuanganNeracaBukuBesar_daftar').append(Baris);
            });
        }

    }

    function editBukuBesar() {
        toastr.error("Belum Bisa");
    }

    function modkeuanganNeracaBukuBesarviewAccount() {
        $('.modmodkeuanganNeracaBukuBesar_ListAccount_content').load('Keuangan/modmodkeuanganNeracaBukuBesar_ListAccount');
    }


    $('#loadingmodkeuanganNeracaBukuBesar').hide();

    function modmodkeuanganNeracaBukuBesar_reset() {
        document.getElementById("modkeuanganNeracaBukuBesar_idacc").value = '';
        document.getElementById("modkeuanganNeracaBukuBesar_kodecoa").value = '';
        document.getElementById("modkeuanganNeracaBukuBesar_coa").value = '';
    }

    function modmodkeuanganNeracaBukuBesar_pilih(id_acc, id_coa, coa, normal) {
        // keluarmodmodkeuanganNeracaBukuBesar_ListAccount_daftar()
        document.getElementById("modkeuanganNeracaBukuBesar_idacc").value = id_acc;
        document.getElementById("modkeuanganNeracaBukuBesar_kodecoa").value = id_coa;
        document.getElementById("modkeuanganNeracaBukuBesar_coa").value = coa;
        document.getElementById("modkeuanganNeracaBukuBesar_normal").value = normal;
    }

    function modkeuanganNeracaBukuBesar_kembalikeawal() {
        if (ncrFlag == 'neraca') {
            $('#modal_modkeuanganNeracaBukuBesar').hide();
            $('#keuanganNeraca_listtransaksi1').show();
            $('#keuanganNeraca_listtransaksi2').show();
            $('.modal-backdrop').hide();
        } else {
            $('#modal_modkeuanganNeracaBukuBesar').hide();

            $('.modal-backdrop').hide();
        }

    }

    function bukamodkeuanganNeracaBukuBesar_detail(id_jurnal) {
        var data = {
            id_jurnal: id_jurnal,
            textid: 'NCR'
        }
        var datax = JSON.stringify(data);
        $('.modkeuanganNeracaBukuBesar_content').load('Keuangan/modKeuanganJurnalUmum?data=' + datax);
    }
</script>