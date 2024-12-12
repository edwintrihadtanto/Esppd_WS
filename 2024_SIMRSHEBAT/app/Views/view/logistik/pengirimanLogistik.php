<?php
$nowday     = date('Y-m-d');
//$nextday    = date('Y-m-d', strtotime('+1 days', strtotime($nowday))); 
$nextday    = $nowday;
?>
<div class="col-md-12 p-2" id="pengirimanLogistik_list1">
    <div class="card card-outline card-default mb-0">
        <div class="card-body p-2 darkgrey-custom">
            <div class="row row-custom">
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="pengirimanLogistik_unitOrder">Unit Permintaan</label>
                        <input type="search" class="form-control form-control-xs" placeholder="Entry Unit Order" id="pengirimanLogistik_unitOrder" name="pengirimanLogistik_unitOrder" onkeypress="tampilpengirimanLogistik()">
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <div class="input-group">
                            <label for="pengirimanLogistik_tglpermintaan">Tgl. Permintaan :</label>
                            <div class="custom-control custom-checkbox ">
                                <input name="pengirimanLogistik_checkedtgl" type="checkbox" class="custom-control-input" id="pengirimanLogistik_checkedtgl" onclick="tampilpengirimanLogistik()" checked>
                                <label class="custom-control-label" for="pengirimanLogistik_checkedtgl"></label>
                            </div>
                        </div>
                        <input type="date" class="form-control form-control-xs" id="pengirimanLogistik_tglpermintaan" name="pengirimanLogistik_tglpermintaan" onchange="tampilpengirimanLogistik()">
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="pengirimanLogistik_jmltampil">Jumlah Pembelian :</label>
                        <select class="form-control form-control-xs" id="pengirimanLogistik_jmltampil" name="pengirimanLogistik_jmltampil" onchange="tampilpengirimanLogistik()">
                            <option value="0">Semua Order</option>
                            <option value="10">10 Order</option>
                            <option value="20">20 Order</option>
                            <option value="30">30 Order</option>
                            <option value="40">40 Order</option>
                            <option value="50">50 Order</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="pengirimanLogistik_kirimflag">Jumlah Pembelian :</label>
                        <select class="form-control form-control-xs" id="pengirimanLogistik_kirimflag" name="pengirimanLogistik_kirimflag" onchange="tampilpengirimanLogistik()">
                            <option value="">Semua</option>
                            <option value="t">Sudah Dikirim</option>
                            <option value="f">Belum Dikirim</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="col-md-12 p-2" id="pengirimanLogistik_list2">
    <div class="card card-outline">
        <div class="overlay-wrapper" id="loadingpengirimanLogistik">
            <div class="overlay">
                <i class="fas fa-3x fa-sync-alt fa-spin"></i>
            </div>
        </div>

        <div class="card-body p-1" style="max-height: 420px; overflow: auto;">
            <div class="card" style="box-shadow: 0 0 3px #343a40; margin-bottom: 0;">
                <div>
                    <div class="card-header p-1">
                        <div class="row">
                            <div class="col-md-12">
                                <h6 class="hr6-custom" id="pengirimanLogistik_titleheader"><i class="fas fa-boxes"></i> </i> Permintaan Logistik</h6>
                                <button type="button" class="btn btn-info btn-xs" onclick="pengirimanLogistik_refresh()"><i class="fa fa-sync-alt fa-spin"></i> Refresh Data</button>
                            </div>
                        </div>
                        <!-- END LETAK BUTTON -->
                    </div>
                </div>
            </div>

            <table id="pengirimanLogistik_daftar" class="table table-striped table-sm choose">
                <thead>
                    <tr>
                        <th class="pl-0" width="10" style="text-align:center;">No.</th>
                        <th width="50"></th>
                        <th width="90">ID</th>
                        <th width="100">Pemesan</th>
                        <th width="100">Tanggal Permintaan</th>
                        <th width="100">Unit Kirim</th>
                        <th width="100">Unit Order</th>
                        <th width="100">Keterangan</th>
                        <th width="100">Pengirim</th>
                        <th width="100">Tanggal Kirim</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

    </div>
</div>

<div class="modpengirimanLogistik_content"></div>

<script>
    var nowday = "<?php echo $nowday; ?>";
    var nextday = "<?php echo $nextday; ?>";

    document.getElementById('pengirimanLogistik_tglpermintaan').value = nowday;

    tampilpengirimanLogistik();

    function checkedtgltampilpengirimanLogistik() {
        var checkBox = document.getElementById("pengirimanLogistik_checkedtgl");
        if (checkBox.checked == true) {
            tampilpengirimanLogistik()
        } else {
            tampilpengirimanLogistik()
        }
    }


    function checkedtgltampilpengirimanLogistik() {
        document.getElementById('pengirimanLogistik_checkedtgl').checked;
    }

    function tampilpengirimanLogistik() {
        $('#loadingpengirimanLogistik').show();
        var checkBox = document.getElementById("pengirimanLogistik_checkedtgl");
        if (checkBox.checked == true) {
            document.getElementById('pengirimanLogistik_tglpermintaan').disabled = false;
        } else {
            document.getElementById('pengirimanLogistik_tglpermintaan').disabled = true;
        }
        var param = {
            checkedtgl: checkBox.checked,
            unitorder: document.getElementById('pengirimanLogistik_unitOrder').value,
            tglpermintaan: document.getElementById('pengirimanLogistik_tglpermintaan').value,
            jmlh: document.getElementById('pengirimanLogistik_jmltampil').value,
            statuskirim: document.getElementById('pengirimanLogistik_kirimflag').value,
        };

        apiPOST("Logistik/list_pengirimanLogistik", param, hasil => {
            $('#loadingpengirimanLogistik').hide();
            $('#pengirimanLogistik_daftar tbody').html('');
            var a = hasil['data'];

            console.log(a)
            if (hasil['data'] !== null) {
                if (hasil['code'] == 'XX') {
                    toastr.error("Data tidak ditemukan");
                    var Baris = "";
                    Baris += '<tr><td colspan="10" align="center">Data tidak ditemukan</td></tr>';
                    $('#pengirimanLogistik_daftar').append(Baris);
                } else {
                    toastr.success("Data ditemukan");
                    for (var i = 0; i < a.length; i++) {
                        var id_logistik_permintaan = a[i].id_logistik_permintaan;
                        var pegawai_dari = a[i].pegawai_dari;
                        var tgl_permintaan = a[i].tgl_permintaan;
                        var unit_dari = a[i].unit_dari;
                        var unit_ke = a[i].unit_ke;
                        var ket = a[i].ket;
                        var pegawai_kirim = a[i].pegawai_kirim;
                        var tgl_kirim = a[i].tgl_kirim;
                        var status = a[i].status;
                        var no = i + 1;


                        Baris += '<tr>';
                        Baris += '<td>' + no + '</td>';
                        Baris += '<td style="display: flex;">';
                        Baris += '<button type="button" class="btn btn-xs btn-warning" id="" onclick = "(bukamodpengirimanLogistik(' + id_logistik_permintaan + '))" style="width:100%"><i class="fa fa-pencil-alt"></i></button>';
                        if (status == 't') {
                            Baris += '&nbsp;<div class="col-sm-1" style="display:contents;"><img src="<?= base_url('_assets/dist/img/checklist.png') ?>" width="20px" height="20px" title="Sudah dikirim"/></div>';
                        } else {
                            Baris += '&nbsp;<div class="col-sm-1" style="display:contents;"><img src="<?= base_url('_assets/dist/img/cancel.png') ?>" width="20px" height="20px" title="Belum dikirim"/></div>';
                        }
                        Baris += '</td>';
                        Baris += '<td>' + id_logistik_permintaan + '</td>';
                        Baris += '<td>' + pegawai_dari + '</td>';
                        Baris += '<td>' + tgl_permintaan + '</td>';
                        Baris += '<td>' + unit_dari + '</td>';
                        Baris += '<td>' + unit_ke + '</td>';
                        Baris += '<td>' + ket + '</td>';
                        if (pegawai_kirim == null) {
                            Baris += '<td> - </td>';
                        } else {
                            Baris += '<td>' + pegawai_kirim + '</td>';
                        }
                        if (tgl_kirim == null) {
                            Baris += '<td> - </td>';
                        } else {
                            Baris += '<td>' + tgl_kirim + '</td>';
                        }
                    }
                    $('#pengirimanLogistik_daftar').append(Baris);
                }
            }
        });

    }

    function pengirimanLogistik_refresh() {
        tampilpengirimanLogistik();
    }

    function bukamodpengirimanLogistik(id) {
        var data = {
            id_permintaan_logistik: id
        }
        var datax = JSON.stringify(data);
        $('.modpengirimanLogistik_content').load('Logistik/modpengirimanLogistik?data=' + datax);
    }
</script>