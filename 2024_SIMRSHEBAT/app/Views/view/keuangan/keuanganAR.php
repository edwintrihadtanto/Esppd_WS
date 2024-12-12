<?php
$nowday     = date('Y-m-d');
//$nextday    = date('Y-m-d', strtotime('+1 days', strtotime($nowday))); 
$nextday    = $nowday;
?>

<div class="col-md-12 p-2" id="keuanganAR_listtransaksi1">
    <div class="card card-outline card-default mb-0">
        <div class="card-body p-2 darkgrey-custom">
            <div class="row row-custom">
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="keuanganAR_tgltransaksi">Tgl. Transaksi :</label>
                        <input type="date" class="form-control form-control-xs" placeholder="Entry No. Faktur" id="keuanganAR_tgltransaksi" name="keuanganAR_tgltransaksi" onkeypress="tampilkeuanganAR()">
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="keuanganAR_tgltransaksisd">s/d</label>
                        <input type="date" class="form-control form-control-xs" id="keuanganAR_tgltransaksisd" name="keuanganAR_tgltransaksisd" onchange="tampilkeuanganAR()">
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="keuanganAR_jmltransaksi">Jumlah Transaksi :</label>
                        <select class="form-control form-control-xs" id="keuanganAR_jmltransaksi" name="keuanganAR_jmltransaksi" onchange="tampilkeuanganAR()">
                            <option value="0">Semua Transaksi</option>
                            <option value="10">10 Transaksi</option>
                            <option value="20">20 Transaksi</option>
                            <option value="30">30 Transaksi</option>
                            <option value="40">40 Transaksi</option>
                            <option value="50">50 Transaksi</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12 p-2" id="keuanganAR_listtransaksi2">
    <div class="card card-outline">
        <div class="overlay-wrapper" id="loadingkeuanganAR">
            <div class="overlay">
                <i class="fas fa-3x fa-sync-alt fa-spin"></i>
            </div>
        </div>
        <div class="card-body p-1" style="max-height: 420px; overflow: auto;">
            <div class="card" style="box-shadow: 0 0 3px #343a40; margin-bottom: 0;">
                <div class="card-header p-1">
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="hr6-custom" id="keuanganAR_titleheader"><i class="fas fa-boxes"></i> </i> Account Receivable (AR)</h6>
                            <div>
                                <button type="button" class="btn bg-gradient-secondary btn-xs" type="submit" id='keuanganAR_btn_tambah' onclick="bukamodkeuanganAR()" hidden> <i class="fas fa-user-plus"></i> Tambah Transaksi</button>
                            </div>
                        </div>
                    </div>
                    <!-- END LETAK BUTTON -->
                </div>
            </div>
            <table id="keuanganAR_daftar" class="table table-striped table-sm choose">
                <thead>
                    <tr>
                        <th class="pl-0" width="10" style="text-align:center;">No.</th>
                        <th width="10"></th>
                        <th width="200">COA</th>
                        <!-- <th width="100">Tgl. Transaksi</th> -->
                        <th width="50">Debit</th>
                        <th width="50">Kredit</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

    </div>
</div>


<div class="content modal fade" id="modal_keuanganARListPiutangPendapatan">
    <div class="container-fluid">
        <div class="modal-dialog modal-md">
            <!-- <div class="card card-row"> -->
            <div class="modal-content">
                <div class="row p-1">
                    <div class="col">
                        <button type="button" class="btn btn-outline-danger btn-xs" onclick="keluar_modal_keuanganARListPiutangPendapatan()"><i class="fa fa-arrow-left"></i> Kembali</button>
                    </div>
                </div>
                <div class="row p-1">
                    <div class="col-12 p-1">
                        <div class="info-box mb-0">
                            <table id="keuanganARListPiutangPendapatan_daftar" class="table table-striped table-sm choose">
                                <thead>
                                    <tr>
                                        <th class="pl-0" width="10" style="text-align:center;">No.</th>
                                        <th width="50">ID</th>
                                        <th width="50">Deskripsi</th>
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

<div class="modkeuanganAR_content"></div>
<div class="modKeuanganARpiutang_content"></div>

<script>
    var nowday = "<?php echo $nowday; ?>";
    var nextday = "<?php echo $nextday; ?>";

    document.getElementById('keuanganAR_tgltransaksi').value = nowday;
    document.getElementById('keuanganAR_tgltransaksisd').value = nowday;


    $('#loadingkeuanganAR').hide();
    tampilkeuanganAR();

    function tampilkeuanganAR() {
        apiPOST('Keuangan/list_keuanganAR', null, hasil => {
            $('#loadingkeuanganAR').hide();
            $('#keuanganAR_daftar tbody').html('');
            var a = hasil['data'];
            var Baris = '';

            if (hasil['data'] !== null) {
                if (hasil['code'] == 'XX') {
                    toastr.error("Data tidak ditemukan");
                    var Baris = "";
                    Baris += '<tr><td colspan="7" align="center">Data tidak ditemukan</td></tr>';
                    $('#keuanganAR_daftar').append(Baris);
                } else {
                    toastr.success("Data ditemukan");
                    for (var i = 0; i < a.length; i++) {

                        id_acc = a[i]['id_ac'];
                        id_bayar = a[i]['id_bayar'];
                        coa = a[i]['coa'];
                        id_coa = a[i]['id_coa'];
                        debit = a[i]['debit'];
                        kredit = a[i]['kredit'];
                        flag = a[i]['flag'];
                        no = i + 1;

                        Baris += '<tr>';
                        Baris += '<td>' + no + '</td>';
                        Baris += '<td style="display: flex;">';
                        Baris += '<button type="button" class="btn btn-xs btn-warning" id="" onclick = "(bukamodkeuanganAR(' + "'" + flag + "','" + id_acc + "'" + '))" style="width:100%"><i class="fa fa-pencil-alt"></i></button>';
                        Baris += '</td>';
                        Baris += '<td>' + id_coa + ' || ' + coa + '</td>';
                        Baris += '<td class="text-right">' + format_ribuan(debit) + '</td>';
                        Baris += '<td class="text-right">' + format_ribuan(kredit) + '</td>';
                        /* Baris += '<td>ASURANSI</td>'; */
                    }
                    $('#keuanganAR_daftar').append(Baris);

                }
            }
        });
    }

    function tampilmodal_keuanganARListPiutangPendapatan() {
        apiPOST('Keuangan/keuanganARListPiutangPendapatan', null, hasil => {
            /* $('#loadingkeuanganARListPiutangPendapatan').hide(); */
            $('#keuanganARListPiutangPendapatan_daftar tbody').html('');
            var a = hasil['data'];
            var Baris = '';

            if (hasil['data'] !== null) {
                if (hasil['code'] == 'XX') {
                    toastr.error("Data tidak ditemukan");
                    var Baris = "";
                    Baris += '<tr><td colspan="7" align="center">Data tidak ditemukan</td></tr>';
                    $('#keuanganARListPiutangPendapatan_daftar').append(Baris);
                } else {
                    toastr.success("Data ditemukan");
                    for (var i = 0; i < a.length; i++) {

                        id_pembayaran = a[i]['id_pembayaran'];
                        deskripsi_pembayaran = a[i]['deskripsi_pembayaran'];
                        no = i + 1;

                        Baris += '<tr class="odd" onclick="bukamodKeuanganARpiutang(' + "'" + id_pembayaran + "','" + deskripsi_pembayaran + "'" + ')">';
                        Baris += '<td>' + no + '</td>';
                        Baris += '<td>' + id_pembayaran + '</td>';
                        Baris += '<td>' + deskripsi_pembayaran + '</td>';
                        Baris += '</tr>';
                        /* Baris += '<td>ASURANSI</td>'; */
                    }
                    $('#keuanganARListPiutangPendapatan_daftar').append(Baris);

                }
            }
        });
    }

    function bukamodkeuanganAR(flag, id_acc) {
        if (flag == '1') {
            $("#modal_keuanganARListPiutangPendapatan").modal({
                backdrop: "static"
            });
            $('#modal_keuanganARListPiutangPendapatan').on('shown.bs.modal', function() {});
            tampilmodal_keuanganARListPiutangPendapatan()
            // modal_keuanganARListPiutangPendapatan
        } else {
            $('#keuanganAR_listtransaksi1').hide();
            $('#keuanganAR_listtransaksi2').hide();
            var data = {
                id_acc: id_acc
            }
            var datax = JSON.stringify(data);
            $('.modkeuanganAR_content').load('Keuangan/modKeuanganAR?data=' + datax);
        }
    }

    function bukamodKeuanganARpiutang(id_pembayaran, deskripsi_pembayaran) {
        $('#keuanganAR_listtransaksi1').hide();
        $('#keuanganAR_listtransaksi2').hide();
        $('#modal_keuanganARListPiutangPendapatan').modal('hide');
        $('.modal-backdrop').hide();
        var data = {
            id_pembayaran: id_pembayaran,
            deskripsi_pembayaran: deskripsi_pembayaran.replace(/ /g, '%20'),

        }
        var datax = JSON.stringify(data);
        $('.modKeuanganARpiutang_content').load('Keuangan/modKeuanganARpiutang?data=' + datax);
    }

    function keluar_modal_keuanganARListPiutangPendapatan() {
        $('#modal_keuanganARListPiutangPendapatan').modal('hide');
        $('.modal-backdrop').hide();
    }
</script>