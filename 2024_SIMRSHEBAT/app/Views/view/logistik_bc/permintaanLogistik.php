<?php
$nowday     = date('Y-m-d');
//$nextday    = date('Y-m-d', strtotime('+1 days', strtotime($nowday))); 
$nextday    = $nowday;
?>
<div class="col-md-12 p-2" id="permintaanLogistik_listpembelian1">
    <div class="card card-outline card-default mb-0">
        <div class="card-body p-2 darkgrey-custom">
            <div class="row row-custom">
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="permintaanLogistik_nofaktur">No. Faktur :</label>
                        <input type="search" class="form-control form-control-xs" placeholder="Entry No. Faktur" id="permintaanLogistik_nofaktur" name="permintaanLogistik_nofaktur" onkeypress="tampilpermintaanLogistik()">
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="permintaanLogistik_tglpermintaan">Tgl. Permintaan :</label>
                        <input type="date" class="form-control form-control-xs" id="permintaanLogistik_tglpermintaan" name="permintaanLogistik_tglpermintaan" onchange="tampilpermintaanLogistik()">
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="permintaanLogistik_jmltampil">Jumlah Pembelian :</label>
                        <select class="form-control form-control-xs" id="permintaanLogistik_jmltampil" name="permintaanLogistik_jmltampil" onchange="tampilpermintaanLogistik()">
                            <option value="0">Semua Order</option>
                            <option value="10">10 Order</option>
                            <option value="20">20 Order</option>
                            <option value="30">30 Order</option>
                            <option value="40">40 Order</option>
                            <option value="50">50 Order</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="col-md-12 p-2" id="permintaanLogistik_listpembelian2">
    <div class="card card-outline">
        <div class="overlay-wrapper" id="loadingpermintaanLogistik">
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
                                <h6 class="hr6-custom" id="permintaanLogistik_titleheader"><i class="fas fa-boxes"></i> </i> Permintaan Logistik</h6>
                                <div>
                                    <button type="button" class="btn bg-gradient-secondary btn-xs" type="submit" id='permintaanLogistik_btn_tambah' onclick="bukamodpermintaanLogistik(null)"> <i class="fas fa-user-plus"></i> Tambah Permintaan</button>
                                </div>
                            </div>
                        </div>
                        <!-- END LETAK BUTTON -->
                    </div>
                </div>
            </div>

            <table id="permintaanLogistik_daftar" class="table table-striped table-sm choose">
                <thead>
                    <tr>
                        <th class="pl-0" width="10" style="text-align:center;">No.</th>
                        <th width="50"></th>
                        <th width="90">ID</th>
                        <th width="100">Pemesan</th>
                        <th width="100">Tanggal Pesan</th>
                        <th width="100">Dari</th>
                        <th width="100">Ke</th>
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

<div class="modpermintaanLogistik_content"></div>

<script>
    var nowday = "<?php echo $nowday; ?>";
    var nextday = "<?php echo $nextday; ?>";

    document.getElementById('permintaanLogistik_tglpermintaan').value = nowday;
    /* document.getElementById('permintaanLogistik_tgldatang').value = nowday;
    document.getElementById('permintaanLogistik_tgltempo').value = nowday;
    document.getElementById('permintaanLogistik_tgltagih').value = nowday; */
    Logistik_listpembelian_listlogistik();

    function Logistik_listpembelian_listlogistik() {
        $('#loadingpermintaanLogistik').hide();
    }


    tampilpermintaanLogistik();

    function tampilpermintaanLogistik() {
        $('#loadingpermintaanLogistik').show();
        var param = {
            /* nofak: document.getElementById('permintaanLogistik_nofaktur').value, */
            tglpermintaan: document.getElementById('permintaanLogistik_tglpermintaan').value,
            /* tgldatang: document.getElementById('permintaanLogistik_tgldatang').value,
            tgltempo: document.getElementById('permintaanLogistik_tgltempo').value,
            tgltagih: document.getElementById('permintaanLogistik_tgltagih').value, */
            jmlh: document.getElementById('permintaanLogistik_jmltampil').value,
        };

        apiPOST("Logistik/list_permintaanLogistik", param, hasil => {
            $('#loadingpermintaanLogistik').hide();
            $('#permintaanLogistik_daftar tbody').html('');
            var a = hasil['data'];


            if (hasil['data'] !== null) {
                if (hasil['code'] == 'XX') {
                    toastr.error("Data tidak ditemukan");
                    var Baris = "";
                    Baris += '<tr><td colspan="9" align="center">Data tidak ditemukan</td></tr>';
                    $('#permintaanLogistik_daftar').append(Baris);
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
                        Baris += '<button type="button" class="btn btn-xs btn-warning" id="" onclick = "(bukamodpermintaanLogistik(' + id_logistik_permintaan + '))" style="width:100%"><i class="fa fa-pencil-alt"></i></button>';
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
                        Baris += '<td>' + pegawai_kirim + '</td>';
                        Baris += '<td>' + tgl_kirim + '</td>';
                    }
                    $('#permintaanLogistik_daftar').append(Baris);
                }
            }
        });

    }

    function bukamodpermintaanLogistik(id) {
        var data = {
            id_permintaan_logistik: id
        }
        var datax = JSON.stringify(data);
        $('.modpermintaanLogistik_content').load('Logistik/modpermintaanLogistik?data=' + datax);
    }
</script>