<?php
$nowday     = date('Y-m-d');
//$nextday    = date('Y-m-d', strtotime('+1 days', strtotime($nowday))); 
$nextday    = $nowday;
?>

<div class="col-md-12 p-2" id="keuanganJurnalUmum_listtransaksi1">
    <div class="card card-outline card-default mb-0">
        <div class="card-body p-2 darkgrey-custom">
            <div class="row row-custom">
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="keuanganJurnalUmum_idgl">ID GL :</label>
                        <input type="text" class="form-control form-control-xs" placeholder="Entry ID GL" id="keuanganJurnalUmum_idgl" name="keuanganJurnalUmum_idgl" onkeyup="tampilkeuanganJurnalUmum()">
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="keuanganJurnalUmum_tgltransaksi">Tgl. Transaksi :</label>
                        <input type="date" class="form-control form-control-xs" id="keuanganJurnalUmum_tgltransaksi" name="keuanganJurnalUmum_tgltransaksi" onchange="tampilkeuanganJurnalUmum()">
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <div class="input-group">
                            <label for="keuanganJurnalUmum_tgltransaksisd">s/d</label>
                            <div class="custom-control custom-checkbox ">
                                <input name="keuanganJurnalUmum_checkedtgl" type="checkbox" class="custom-control-input" id="keuanganJurnalUmum_checkedtgl" onclick="tampilkeuanganJurnalUmum_checkBox()" checked>
                                <label class="custom-control-label" for="keuanganJurnalUmum_checkedtgl"></label>
                            </div>
                        </div>
                        <input type="date" class="form-control form-control-xs" id="keuanganJurnalUmum_tgltransaksisd" name="keuanganJurnalUmum_tgltransaksisd" onchange="tampilkeuanganJurnalUmum()">
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="keuanganJurnalUmum_jmltransaksi">Jumlah Transaksi :</label>
                        <select class="form-control form-control-xs" id="keuanganJurnalUmum_jmltransaksi" name="keuanganJurnalUmum_jmltransaksi" onchange="tampilkeuanganJurnalUmum()">
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

<div class="col-md-12 p-2" id="keuanganJurnalUmum_listtransaksi2">
    <div class="card card-outline">
        <div class="overlay-wrapper" id="loadingkeuanganJurnalUmum">
            <div class="overlay">
                <i class="fas fa-3x fa-sync-alt fa-spin"></i>
            </div>
        </div>

        <div class="card-body p-1" style="max-height: 420px; overflow: auto;">
            <div class="card" style="box-shadow: 0 0 3px #343a40; margin-bottom: 0;">
                <div class="card-header p-1">
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="hr6-custom" id="keuanganJurnalUmum_titleheader"><i class="fas fa-boxes"></i> </i> Jurnal Umum</h6>
                            <div>
                                <button type="button" class="btn bg-gradient-secondary btn-xs" type="submit" id='keuanganJurnalUmum_btn_tambah' onclick="bukamodkeuanganJurnalUmum('null')"> <i class="fas fa-user-plus"></i> Tambah Transaksi</button>
                                <button type="button" class="btn btn-info btn-xs" onclick="tampilkeuanganJurnalUmum()"><i class="fa fa-sync-alt fa-spin"></i> Refresh Data</button>
                            </div>
                        </div>
                    </div>
                    <!-- END LETAK BUTTON -->
                </div>
            </div>

            <table id="keuanganJurnalUmum_daftar" class="table table-striped table-sm choose table-bordered">
                <thead>
                    <tr>
                        <th class="pl-0" width="10" style="text-align:center;">No.</th>
                        <th width="50"></th>
                        <th width="50">ID</th>
                        <th width="50">ID GL</th>
                        <th width="50">Tgl. Transaksi</th>
                        <th width="150">Keterangan</th>
                        <th width="50">Jumlah</th>
                        <th width="100">Pembuat</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

    </div>
</div>

<div class="modKeuanganJurnalUmum_content"></div>

<script>
    var nowday = "<?php echo $nowday; ?>";
    var nextday = "<?php echo $nextday; ?>";

    document.getElementById('keuanganJurnalUmum_tgltransaksi').value = nowday;
    document.getElementById('keuanganJurnalUmum_tgltransaksisd').value = nowday;


    $('#loadingkeuanganJurnalUmum').hide();
    tampilkeuanganJurnalUmum();

    function tampilkeuanganJurnalUmum_checkBox() {
        var checkBox = document.getElementById("keuanganJurnalUmum_checkedtgl");
        if (checkBox.checked == true) {
            document.getElementById('keuanganJurnalUmum_tgltransaksi').disabled = false;
            document.getElementById('keuanganJurnalUmum_tgltransaksisd').disabled = false;
            document.getElementById('keuanganJurnalUmum_tgltransaksisd').value = nowday;
            document.getElementById('keuanganJurnalUmum_tgltransaksi').value = nowday;
            tampilkeuanganJurnalUmum()

        } else {
            document.getElementById('keuanganJurnalUmum_tgltransaksi').disabled = true;
            document.getElementById('keuanganJurnalUmum_tgltransaksisd').disabled = true;
            document.getElementById('keuanganJurnalUmum_tgltransaksisd').value = null;
            document.getElementById('keuanganJurnalUmum_tgltransaksi').value = null;
            tampilkeuanganJurnalUmum()
        }
    }

    function tampilkeuanganJurnalUmum() {
        $('#loadingkeuanganJurnalUmum').show();
        var checkBox = document.getElementById("keuanganJurnalUmum_checkedtgl");

        var param = {
            checkedtgl: checkBox.checked,
            tgl_transaksi: document.getElementById('keuanganJurnalUmum_tgltransaksi').value,
            tgl_transaksisd: document.getElementById('keuanganJurnalUmum_tgltransaksisd').value,
            jmlh: document.getElementById('keuanganJurnalUmum_jmltransaksi').value,
            id_gl: document.getElementById('keuanganJurnalUmum_idgl').value,
        };

        apiPOST("Keuangan/list_keuanganJurnalUmum", param, hasil => {
            $('#loadingkeuanganJurnalUmum').hide();
            $('#keuanganJurnalUmum_daftar tbody').html('');
            var a = hasil['data'];


            if (hasil['data'] !== null) {
                if (hasil['code'] == 'XX') {
                    toastr.error("Data tidak ditemukan");
                    var Baris = "";
                    Baris += '<tr><td colspan="9" align="center">Data tidak ditemukan</td></tr>';
                    $('#keuanganJurnalUmum_daftar').append(Baris);
                } else {
                    toastr.success("Data ditemukan");
                    for (var i = 0; i < a.length; i++) {
                        var id_jurnal = a[i].id_jurnal;
                        var id_gl = a[i].id_gl;
                        var tgl_jurnal = a[i].tgl_jurnal;
                        var keterangan = a[i].keterangan;
                        var jumlah = a[i].jumlah;
                        var nama_pegawai = a[i].nama_pegawai;
                        var no = i + 1;


                        Baris += '<tr>';
                        Baris += '<td>' + no + '</td>';
                        Baris += '<td style="display: flex;">';
                        Baris += '<button type="button" class="btn btn-xs btn-warning" id="" onclick = "(bukamodkeuanganJurnalUmum(' + id_jurnal + '))" style="width:50%"><i class="fa fa-pencil-alt"></i></button>';
                        Baris += '<button type="button" class="btn btn-xs btn-danger" id="" onclick="(hapusmodkeuanganJurnalUmum(' + id_jurnal + '))" style="width:50%"><i class="fa fa-times"></i></button>';
                        Baris += '</td>';
                        Baris += '<td>' + id_jurnal + '</td>';
                        Baris += '<td>' + id_gl + '</td>';
                        Baris += '<td>' + tgl_jurnal + '</td>';
                        Baris += '<td>' + keterangan + '</td>';
                        Baris += '<td class="text-right">' + format_ribuan(jumlah) + '</td>';
                        Baris += '<td>' + nama_pegawai + '</td>';
                    }
                    $('#keuanganJurnalUmum_daftar').append(Baris);
                }
            }
        });

    }

    function hapusmodkeuanganJurnalUmum(id_jurnal) {
        var param = {
            id_user: user['id_user']
        };
        apiPOST("Keuangan/cekAksesKeu", param, hasil => {
            if (hasil['data'] == 'f' || hasil['data'] == '') {
                pertanyaan.fire({
                    title: 'Anda Tidak Memiliki Akses',
                    icon: 'error'
                })
            } else {
                pertanyaan.fire({
                    title: 'Apakah Anda Yakin Hapus Jurnal ?',
                    html: '<span>Data akan dihapus secara permanen, Data yang sudah dihapus akan hilang, tetap hapus ?</span>',
                    icon: 'question',
                    showCancelButton: true,
                    reverseButtons: false,
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        var paramhapus = {
                            id_jurnal: id_jurnal,
                            id_user: user['id_user']
                        };
                        apiPOST("Keuangan/hapuskeuanganJurnalUmum", paramhapus, hasil => {
                            if (hasil['code'] == 'XX') {
                                toastr.success("Berhasil Hapus");
                            } else {
                                toastr.error("Gagal Hapus");
                            }
                            tampilkeuanganJurnalUmum()
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {

                    }
                })
            }
        });
    }

    // function ModKeuanganJurnalUmum_kembalikeawal() {
    //     var id = document.getElementById("ModKeuanganJurnalUmum_id").value;
    //     if (id == '') {
    //         pertanyaan.fire({
    //             title: 'Kembali ke menu awal',
    //             html: '<span>Data Input Jurnal Umum Belum diSimpan, Data yang sudah dientry akan hilang, tetap kembali ?</span>',
    //             icon: 'question',
    //             showCancelButton: true,
    //             reverseButtons: false,
    //             allowOutsideClick: false
    //         }).then((result) => {
    //             if (result.isConfirmed) {
    //                 keluarmodal_ModKeuanganJurnalUmum();
    //             } else if (result.dismiss === Swal.DismissReason.cancel) {

    //             }
    //         })
    //     } else {
    //         keluarmodal_ModKeuanganJurnalUmum();
    //     }
    // }

    function bukamodkeuanganJurnalUmum(id_jurnal) {
        var data = {
            id_jurnal: id_jurnal,
            textid: 'JU'
        }
        var datax = JSON.stringify(data);
        $('.modKeuanganJurnalUmum_content').load('Keuangan/modKeuanganJurnalUmum?data=' + datax);
    }
</script>