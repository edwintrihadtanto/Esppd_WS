<?php
$nowday     = date('Y-m-d');
//$nextday    = date('Y-m-d', strtotime('+1 days', strtotime($nowday))); 
$nextday    = $nowday;
?>

<div class="col-md-12 p-2" id="keuanganAP_listtransaksi1">
    <div class="card card-outline card-default mb-0">
        <div class="card-body p-2 darkgrey-custom">
            <div class="row row-custom">
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="keuanganAP_carivendor">Nama Vendor :</label>
                        <input type="text" class="form-control form-control-xs" placeholder="Entry Nama Vendor" id="keuanganAP_carivendor" name="keuanganAP_carivendor" onkeypress="tampilkeuanganAP()">
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="keuanganAP_jmltransaksi">Jumlah Transaksi :</label>
                        <select class="form-control form-control-xs" id="keuanganAP_jmltransaksi" name="keuanganAP_jmltransaksi" onchange="tampilkeuanganAP()">
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

<div class="col-md-12 p-2" id="keuanganAP_listtransaksi2">
    <div class="card card-outline">
        <div class="overlay-wrapper" id="loadingkeuanganAP">
            <div class="overlay">
                <i class="fas fa-3x fa-sync-alt fa-spin"></i>
            </div>
        </div>

        <div class="card-body p-1" style="max-height: 420px; overflow: auto;">
            <div class="card" style="box-shadow: 0 0 3px #343a40; margin-bottom: 0;">
                <div class="card-header p-1">
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="hr6-custom" id="keuanganAP_titleheader"><i class="fas fa-boxes"></i> </i> Account Payable (AP)</h6>
                            <div>
                                <button type="button" class="btn bg-gradient-secondary btn-xs" type="submit" id='keuanganAP_btn_tambah' onclick="bukamodkeuanganAP()" hidden> <i class="fas fa-user-plus"></i> Tambah Transaksi</button>
                                <button type="button" class="btn btn-info btn-xs" onclick="tampilkeuanganAP()"><i class="fa fa-sync-alt fa-spin"></i> Refresh Data</button>
                            </div>
                        </div>
                    </div>
                    <!-- END LETAK BUTTON -->
                </div>
            </div>

            <table id="keuanganAP_daftar" class="table table-striped table-sm choose table-bordered">
                <thead>
                    <tr>
                        <th class="pl-0" width="10" style="text-align:center;">No.</th>
                        <th width="10"></th>
                        <th width="100">Vendor</th>
                        <th width="150">Debit</th>
                        <th width="150">Kredit</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

    </div>
</div>

<div class="modkeuanganAP_content"></div>

<script>
    var nowday = "<?php echo $nowday; ?>";


    $('#loadingkeuanganAP').hide();
    tampilkeuanganAP();

    function tampilkeuanganAP() {
        var param = {
            carivendor: document.getElementById("keuanganAP_carivendor").value
        }
        apiPOST('Keuangan/list_keuanganAP', param, hasil => {
            $('#loadingkeuanganAP').hide();
            $('#keuanganAP_daftar tbody').html('');
            var a = hasil['data'];
            var Baris = '';

            if (hasil['data'] !== null) {
                if (hasil['code'] == 'XX') {
                    toastr.error("Data tidak ditemukan");
                    var Baris = "";
                    Baris += '<tr><td colspan="7" align="center">Data tidak ditemukan</td></tr>';
                    $('#keuanganAP_daftar').append(Baris);
                } else {
                    toastr.success("Data ditemukan");
                    for (var i = 0; i < a.length; i++) {

                        kode_vendor = a[i]['kode_vendor'];
                        nama_ven = a[i]['nama'];
                        debit = a[i]['debit'];
                        kredit = a[i]['kredit'];
                        id_acc = a[i]['id_acc'];
                        no = i + 1;

                        Baris += '<tr>';
                        Baris += '<td>' + no + '</td>';
                        Baris += '<td style="display: flex;">';
                        Baris += '<button type="button" class="btn btn-xs btn-warning" id="" onclick ="(bukamodkeuanganAP(' + "'" + kode_vendor + "','" + nama_ven + "','" + id_acc + "'" + '))" style="width:100%"><i class="fa fa-pencil-alt"></i></button>';
                        Baris += '</td>';
                        Baris += '<td>' + nama_ven + '</td>';
                        Baris += '<td class="text-right">' + formatMoney(debit) + '</td>';
                        Baris += '<td class="text-right">' + formatMoney(kredit) + '</td>';
                        /* Baris += '<td>ASURANSI</td>'; */
                    }
                    $('#keuanganAP_daftar').append(Baris);

                }
            }
        });
    }

    // function bukamodkeuanganAPRwtByr() {
    //     $('#keuanganAP_listtransaksi1').hide();
    //     $('#keuanganAP_listtransaksi2').hide();
    //     $('.modkeuanganAPRwtByr_content').load('Keuangan/modKeuanganAPRwtByr');
    // }

    function bukamodkeuanganAP(kode_vendor, nama_ven, id_acc) {
        $('#keuanganAP_listtransaksi1').hide();
        $('#keuanganAP_listtransaksi2').hide();
        var data = {
            kode_vendor: kode_vendor,
            id_acc: id_acc,
            nama_ven: nama_ven.replace(/ /g, '%20')

        }
        var datax = JSON.stringify(data);
        $('.modkeuanganAP_content').load('Keuangan/modKeuanganAP?data=' + datax);
    }
</script>