<?php
$nowday     = date('Y-m-d');
//$nextday    = date('Y-m-d', strtotime('+1 days', strtotime($nowday))); 
$nextday    = $nowday;
?>

<div class="col-md-12 p-2" id="keuanganKasBank_listtransaksi1">
    <div class="card card-outline card-default mb-0">
        <div class="card-body p-2 darkgrey-custom">
            <div class="row row-custom">
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="keuanganKasBank_tgltransaksi">Tgl. Transaksi :</label>
                        <input type="date" class="form-control form-control-xs" placeholder="Entry No. Faktur" id="keuanganKasBank_tgltransaksi" name="keuanganKasBank_tgltransaksi" onchange="tampilkeuanganKasBank()">
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <div class="input-group">
                            <label for="keuanganKasBank_tgltransaksisd">s/d</label>
                            <div class="custom-control custom-checkbox ">
                                <input name="keuanganKasBank_checkedtgl" type="checkbox" class="custom-control-input" id="keuanganKasBank_checkedtgl" onclick="tampilkeuanganKasBank_checkBox()" checked>
                                <label class="custom-control-label" for="keuanganKasBank_checkedtgl"></label>
                            </div>
                        </div>
                        <input type="date" class="form-control form-control-xs" id="keuanganKasBank_tgltransaksisd" name="keuanganKasBank_tgltransaksisd" onchange="tampilkeuanganKasBank()">
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="keuanganKasBank_pilihkasBank">Kas Bank :</label>
                        <select class="form-control form-control-xs" id="keuanganKasBank_pilihkasBank" name="keuanganKasBank_pilihkasBank" onchange="tampilkeuanganKasBank()">
                        </select>
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="keuanganKasBank_jenistrans">Jenis Transaksi :</label>
                        <select class="form-control form-control-xs" id="keuanganKasBank_jenistrans" name="keuanganKasBank_jenistrans" onchange="tampilkeuanganKasBank()">
                            <option value="0">SEMUA</option>
                            <option value="KM">Kas Masuk</option>
                            <option value="KL">Kas Keluar</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="keuanganKasBank_jenispemberipenerima">Jenis Pemberi / Penerima :</label>
                        <select class="form-control form-control-xs" id="keuanganKasBank_jenispemberipenerima" name="keuanganKasBank_jenispemberipenerima" onchange="tampilkeuanganKasBank()">
                        </select>
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="keuanganKasBank_jmltransaksi">Jumlah Transaksi :</label>
                        <select class="form-control form-control-xs" id="keuanganKasBank_jmltransaksi" name="keuanganKasBank_jmltransaksi" onchange="tampilkeuanganKasBank()">
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

<div class="col-md-12 p-2" id="keuanganKasBank_listtransaksi2">
    <div class="card card-outline">
        <div class="overlay-wrapper" id="loadingkeuanganKasBank">
            <div class="overlay">
                <i class="fas fa-3x fa-sync-alt fa-spin"></i>
            </div>
        </div>

        <div class="card-body p-1" style="max-height: 420px; overflow: auto;">
            <div class="card" style="box-shadow: 0 0 3px #343a40; margin-bottom: 0;">
                <div class="card-header p-1">
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="hr6-custom" id="keuanganKasBank_titleheader"><i class="fas fa-boxes"></i> </i> Kas Bank</h6>
                            <div>
                                <button type="button" class="btn bg-gradient-secondary btn-xs" id='keuanganJurnalUmum_btn_tambah' onclick="bukamodkeuanganKasBank('KM',null)"> <i class="fas fa-user-plus"></i> Tambah Kas Masuk </button>
                                <button type="button" class="btn bg-gradient-secondary btn-xs" id='keuanganJurnalUmum_btn_tambah' onclick="bukamodkeuanganKasBank('KL',null)"> <i class="fas fa-user-plus"></i> Tambah Kas Keluar</button>
                                <button type="button" class="btn bg-gradient-info btn-xs" id='keuanganJurnalUmum_btn_refresh' onclick="tampilkeuanganKasBank()"> <i class="fa fa-sync-alt fa-spin"></i> Refresh Data</button>
                            </div>
                        </div>
                    </div>
                    <!-- END LETAK BUTTON -->
                </div>
            </div>

            <table id="keuanganKasBank_daftar" class="table table-striped table-sm choose table-bordered">
                <thead>
                    <tr>
                        <th class="pl-0" width="10" style="text-align:center;">No.</th>
                        <th width="10"></th>
                        <th width="50">ID</th>
                        <th width="100">Tgl. Transaksi</th>
                        <th width="100">Keterangan</th>
                        <th width="100">Kas Bank</th>
                        <th width="100">Debit</th>
                        <th width="100">Kredit</th>
                        <th width="100">Jenis Pemberi/Penerima</th>
                        <th width="100">Diberi/Diterima Dari</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

    </div>
</div>


<div class="modkeuanganKasBank_content"></div>

<script>
    var nowday = "<?php echo $nowday; ?>";
    var nextday = "<?php echo $nextday; ?>";

    document.getElementById('keuanganKasBank_tgltransaksi').value = nowday;
    document.getElementById('keuanganKasBank_tgltransaksisd').value = nowday;


    $('#loadingkeuanganKasBank').hide();
    getKas_KeuanganKasBank();
    getPenerima_KeuanganKasBank();
    tampilkeuanganKasBank();

    function tampilkeuanganKasBank_checkBox() {
        var checkBox = document.getElementById("keuanganKasBank_checkedtgl");
        if (checkBox.checked == true) {
            document.getElementById('keuanganKasBank_tgltransaksi').disabled = false;
            document.getElementById('keuanganKasBank_tgltransaksisd').disabled = false;
            document.getElementById('keuanganKasBank_tgltransaksisd').value = nowday;
            document.getElementById('keuanganKasBank_tgltransaksi').value = nowday;
            tampilkeuanganKasBank()
        } else {
            document.getElementById('keuanganKasBank_tgltransaksi').disabled = true;
            document.getElementById('keuanganKasBank_tgltransaksisd').disabled = true;
            document.getElementById('keuanganKasBank_tgltransaksisd').value = null;
            document.getElementById('keuanganKasBank_tgltransaksi').value = null;
            tampilkeuanganKasBank()
        }
    }

    function getKas_KeuanganKasBank() {
        var param = {
            kascari: ''
        };
        apiPOST('Keuangan/getKas', param, hasil => {
            var data = '';
            data += '<option value="0">Semua Kas</option>';
            if (hasil !== null) {
                var a = hasil['data'];
                for (var i = 0; i < a.length; i++) {
                    data += '<option value="' + a[i]['id_acc'] + '">' + a[i]['kas_nama'] + '</option>';
                };
                document.getElementById('keuanganKasBank_pilihkasBank').innerHTML = data;
            };
        });
    };

    function getPenerima_KeuanganKasBank() {
        apiPOST('Keuangan/getPenerima', null, hasil => {
            var data = '';
            if (hasil !== null) {
                var a = hasil['data'];
                for (var i = 0; i < a.length; i++) {
                    data += '<option value="' + a[i]['id_penerima'] + '">' + a[i]['customer'] + '</option>';
                }
                document.getElementById('keuanganKasBank_jenispemberipenerima').innerHTML = data;
            };
        });
    };


    function tampilkeuanganKasBank() {
        var checkBox = document.getElementById("keuanganKasBank_checkedtgl");
        var param = {
            checkedtgl: checkBox.checked,
            tgl_transaksi: document.getElementById('keuanganKasBank_tgltransaksi').value,
            tgl_transaksisd: document.getElementById('keuanganKasBank_tgltransaksisd').value,
            jenistrans: document.getElementById('keuanganKasBank_jenistrans').value,
            kasBank: document.getElementById('keuanganKasBank_pilihkasBank').value
        };
        apiPOST('Keuangan/list_keuanganKasBank', param, hasil => {
            $('#loadingkeuanganKasBank').hide();
            $('#keuanganKasBank_daftar tbody').html('');
            var a = hasil['data'];
            var Baris = '';

            if (hasil['data'] !== null) {
                if (hasil['code'] == 'XX') {
                    toastr.error("Data tidak ditemukan");
                    var Baris = "";
                    Baris += '<tr><td colspan="10" align="center">Data tidak ditemukan</td></tr>';
                    $('#keuanganKasBank_daftar').append(Baris);
                } else {
                    toastr.success("Data ditemukan");
                    for (var i = 0; i < a.length; i++) {
                        /* console.log(listbulan) */

                        id = a[i]['id'];
                        id_gl = a[i]['id_gl'];
                        tgl_jurnal = a[i]['tgl_jurnal'];
                        keterangan = a[i]['keterangan'];
                        kas_nama = a[i]['kas_nama'];
                        jenis = a[i]['jenis'];
                        penerima = a[i]['penerima'];
                        nm_penerima = a[i]['nm_penerima'];
                        jml = a[i]['jml'];
                        customer = a[i]['customer'];
                        nilai_nol = 0;
                        no = i + 1;

                        Baris += '<tr>';
                        Baris += '<td>' + no + '</td>';
                        Baris += '<td style="display: flex;">';
                        Baris += '<button type="button" class="btn btn-xs btn-warning" id="" onclick = "(bukamodkeuanganKasBank(' + "'" + jenis + "','" + id_gl + "'" + '))" style="width:100%"><i class="fa fa-pencil-alt"></i></button>';
                        Baris += '</td>';
                        Baris += '<td>' + id + '</td>';
                        Baris += '<td>' + tgl_jurnal + '</td>';
                        Baris += '<td>' + keterangan + '</td>';
                        Baris += '<td>' + kas_nama + '</td>';
                        if (jenis == 'KM') {
                            Baris += '<td class="text-right">' + formatMoney(jml) + '</td>';
                            Baris += '<td class="text-right">' + formatMoney(nilai_nol) + '</td>';
                        } else {
                            Baris += '<td class="text-right">' + formatMoney(nilai_nol) + '</td>';
                            Baris += '<td class="text-right">' + formatMoney(jml) + '</td>';
                        }
                        Baris += '<td>' + customer + '</td>';
                        Baris += '<td>' + nm_penerima + '</td>';
                        Baris += '</tr>';
                    }
                    $('#keuanganKasBank_daftar').append(Baris);

                }
            }
        });
    }

    function bukamodkeuanganKasBank(flag, id_gl) {
        var data = {
            flag: flag,
            id_gl: id_gl
        }
        var datax = JSON.stringify(data);
        $('.modkeuanganKasBank_content').load('Keuangan/modKeuanganKasBank?data=' + datax);
    }
</script>