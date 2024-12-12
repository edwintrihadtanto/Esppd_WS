<?php
$nowday     = date('Y-m-d');
//$nextday    = date('Y-m-d', strtotime('+1 days', strtotime($nowday))); 
$nextday    = $nowday;
?>
<div class="col-md-12 p-2" id="pembelianLogistik_listpembelian1">
    <div class="card card-outline card-default mb-0">
        <div class="card-body p-2 darkgrey-custom">
            <div class="row row-custom">
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="pembelianLogistik_nofaktur">No. Faktur :</label>
                        <input type="search" class="form-control form-control-xs" placeholder="Entry No. Faktur" id="pembelianLogistik_nofaktur" name="pembelianLogistik_nofaktur" onkeypress="tampilPembelianLogistik()">
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="pembelianLogistik_tglfaktur">Tgl. Faktur :</label>
                        <input type="date" class="form-control form-control-xs" id="pembelianLogistik_tglfaktur" name="pembelianLogistik_tglfaktur" onchange="tampilPembelianLogistik()">
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="pembelianLogistik_tgldatang">Tgl. Kedatangan :</label>
                        <input type="date" class="form-control form-control-xs" id="pembelianLogistik_tgldatang" name="pembelianLogistik_tgldatang" onchange="tampilPembelianLogistik()">
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="pembelianLogistik_tgltempo">Tgl. Jatuh Tempo :</label>
                        <input type="date" class="form-control form-control-xs" id="pembelianLogistik_tgltempo" name="pembelianLogistik_tgltempo" onchange="tampilPembelianLogistik()">
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="pembelianLogistik_tgltagih">Tgl. Tagih :</label>
                        <input type="date" class="form-control form-control-xs" id="pembelianLogistik_tgltagih" name="pembelianLogistik_tgltagih" onchange="tampilPembelianLogistik()">
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="pembelianLogistik_jmlbeli">Jumlah Pembelian :</label>
                        <select class="form-control form-control-xs" id="pembelianLogistik_jmlbeli" name="pembelianLogistik_jmlbeli" onchange="tampilPembelianLogistik()">
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

<div class="col-md-12 p-2" id="pembelianLogistik_listpembelian2">
    <div class="card card-outline">
        <div class="overlay-wrapper" id="loadingpembelianLogistik">
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
                                <h6 class="hr6-custom" id="pembelianLogistik_titleheader"><i class="fas fa-boxes"></i> </i> Pembelian Logistik</h6>
                                <div>
                                    <button type="button" class="btn bg-gradient-secondary btn-xs" type="submit" id='pembelianLogistik_btn_tambah' onclick="bukamodPembelianLogistik(null)"> <i class="fas fa-user-plus"></i> Tambah Pembelian</button>
                                </div>
                            </div>
                        </div>
                        <!-- END LETAK BUTTON -->
                    </div>
                </div>
            </div>

            <table id="pembelianLogistik_daftar" class="table table-striped table-sm choose">
                <thead>
                    <tr>
                        <th class="pl-0" width="10" style="text-align:center;">No.</th>
                        <th width="50"></th>
                        <th width="90">No. Faktur</th>
                        <th width="100">Supliyer</th>
                        <th width="100">Tgl.Faktur</th>
                        <th width="100">Tgl.Kedatangan</th>
                        <th width="100">Tgl.Jatuh Tempo</th>
                        <th width="100">Tgl.Tagih</th>
                        <th width="240">Kas Bank</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

    </div>
</div>

<div class="modpenmbelianLogistik_content"></div>

<script>
    var nowday = "<?php echo $nowday; ?>";
    var nextday = "<?php echo $nextday; ?>";

    document.getElementById('pembelianLogistik_tglfaktur').value = nowday;
    document.getElementById('pembelianLogistik_tgldatang').value = nowday;
    document.getElementById('pembelianLogistik_tgltempo').value = nowday;
    document.getElementById('pembelianLogistik_tgltagih').value = nowday;
    Logistik_listpembelian_listlogistik();

    function Logistik_listpembelian_listlogistik() {
        $('#loadingpembelianLogistik').hide();
    }


    tampilPembelianLogistik();

    function tampilPembelianLogistik() {
        $('#loadingpembelianLogistik').show();
        var param = {
            nofak: document.getElementById('pembelianLogistik_nofaktur').value,
            tglfak: document.getElementById('pembelianLogistik_tglfaktur').value,
            tgldatang: document.getElementById('pembelianLogistik_tgldatang').value,
            tgltempo: document.getElementById('pembelianLogistik_tgltempo').value,
            tgltagih: document.getElementById('pembelianLogistik_tgltagih').value,
            jmlh: document.getElementById('pembelianLogistik_jmlbeli').value,
        };

        apiPOST("Logistik/list_pembelianLogistik", param, hasil => {
            $('#loadingpembelianLogistik').hide();
            $('#pembelianLogistik_daftar tbody').html('');
            var a = hasil['data'];


            if (hasil['data'] !== null) {
                if (hasil['code'] == 'XX') {
                    toastr.error("Data tidak ditemukan");
                    var Baris = "";
                    Baris += '<tr><td colspan="9" align="center">Data tidak ditemukan</td></tr>';
                    $('#pembelianLogistik_daftar').append(Baris);
                } else {
                    toastr.success("Data ditemukan");
                    for (var i = 0; i < a.length; i++) {
                        var id_pembelian_logistik = a[i].id_pembelian_logistik;
                        var no_faktur = a[i].no_faktur;
                        var nama_supplier = a[i].nama_supplier;
                        var tgl_faktur = a[i].tgl_faktur;
                        var tgl_datang = a[i].tgl_datang;
                        var tgl_tempo = a[i].tgl_tempo;
                        var tgl_tagih = a[i].tgl_tagih;
                        var kas_bank = a[i].kas_bank;
                        var no = i + 1;


                        Baris += '<tr>';
                        Baris += '<td>' + no + '</td>';
                        Baris += '<td style="display: flex;">';
                        Baris += '<button type="button" class="btn btn-xs btn-warning" id="" onclick = "(bukamodPembelianLogistik(' + id_pembelian_logistik + '))" style="width:100%"><i class="fa fa-pencil-alt"></i></button>';
                        if (status == 1) {
                            Baris += '&nbsp;<div class="col-sm-1" style="display:contents;"><img src="<?= base_url('_assets/dist/img/checklist.png') ?>" width="20px" height="20px" title="Sudah Dilayani"/></div>';
                        } else {
                            Baris += '&nbsp;<div class="col-sm-1" style="display:contents;"><img src="<?= base_url('_assets/dist/img/cancel.png') ?>" width="20px" height="20px" title="Belum Dilayani"/></div>';
                        }
                        Baris += '</td>';
                        Baris += '<td>' + no_faktur + '</td>';
                        Baris += '<td>' + nama_supplier + '</td>';
                        Baris += '<td>' + tgl_faktur + '</td>';
                        Baris += '<td>' + tgl_datang + '</td>';
                        Baris += '<td>' + tgl_tempo + '</td>';
                        Baris += '<td>' + tgl_tagih + '</td>';
                        Baris += '<td>' + kas_bank + '</td>';
                    }
                    $('#pembelianLogistik_daftar').append(Baris);
                }
            }
        });

    }

    function bukamodPembelianLogistik(id) {
        var data = {
            id_pembelian_logistik: id
        }
        var datax = JSON.stringify(data);
        $('.modpenmbelianLogistik_content').load('Logistik/modpenmbelianLogistik?data=' + datax);
    }
</script>