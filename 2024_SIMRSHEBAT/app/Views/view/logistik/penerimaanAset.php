<?php
$nowday     = date('Y-m-d');
//$nextday    = date('Y-m-d', strtotime('+1 days', strtotime($nowday))); 
$nextday    = $nowday;
?>
<div class="col-md-12 p-2" id="penerimaanAset_listaset1">
    <div class="card card-outline card-default mb-0">
        <div class="card-body p-2 darkgrey-custom">
            <div class="row row-custom">
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="penerimaanAset_unitOrder">Unit Order :</label>
                        <input type="search" class="form-control form-control-xs" placeholder="Entry Unit Order" id="penerimaanAset_unitOrder" name="penerimaanAset_unitOrder" onkeypress="tampilpenerimaanAset()">
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="penerimaanAset_tglpermintaan">Tgl. Permintaan :</label>
                        <input type="date" class="form-control form-control-xs" id="penerimaanAset_tglpermintaan" name="penerimaanAset_tglpermintaan" onchange="tampilpenerimaanAset()">
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="penerimaanAset_jmltampil">Jumlah List :</label>
                        <select class="form-control form-control-xs" id="penerimaanAset_jmltampil" name="penerimaanAset_jmltampil" onchange="tampilpenerimaanAset()">
                            <option value="0">Semua List</option>
                            <option value="10">10 List</option>
                            <option value="20">20 List</option>
                            <option value="30">30 List</option>
                            <option value="40">40 List</option>
                            <option value="50">50 List</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="col-md-12 p-2" id="penerimaanAset_listaset2">
    <div class="card card-outline">
        <div class="overlay-wrapper" id="loadingpenerimaanAset">
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
                                <h6 class="hr6-custom" id="penerimaanAset_titleheader"><i class="fas fa-boxes"></i> </i> Tambah Aset</h6>
                                <div>
                                    <button type="button" class="btn bg-gradient-secondary btn-xs" type="submit" id='penerimaanAset_btn_tambah' onclick="bukamodpenerimaanAset(null)"> <i class="fas fa-user-plus"></i> Tambah Permintaan</button>
                                </div>
                            </div>
                        </div>
                        <!-- END LETAK BUTTON -->
                    </div>
                </div>
            </div>

            <table id="penerimaanAset_daftar" class="table table-striped table-sm choose">
                <thead>
                    <tr>
                        <th class="pl-0" width="10" style="text-align:center;">No.</th>
                        <th width="50"></th>
                        <th width="90">ID</th>
                        <th width="100">Nama Aset</th>
                        <th width="100">Nomor Faktur</th>
                        <th width="100">Tanggal Beli</th>
                        <th width="100">Tanggal Pakai</th>
                        <th width="100">Tanggal Akhir Penyusutan</th>
                        <th width="100">Tipe Aset</th>
                        <th width="100">Gudang Aset</th>
                        <th width="100">Supplier</th>
                        <th width="100">Keterangan</th>
                        <th width="100">Jenis Susut</th>
                        <th width="100">Total Jumlah</th>
                        <th width="100">Cicilan</th>
                        <th width="100">Sisa</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

    </div>
</div>

<div class="modpenerimaanAset_content"></div>

<script>
    var nowday = "<?php echo $nowday; ?>";
    var nextday = "<?php echo $nextday; ?>";

    document.getElementById('penerimaanAset_tglpermintaan').value = nowday;
    /* document.getElementById('penerimaanAset_tgldatang').value = nowday;
    document.getElementById('penerimaanAset_tgltempo').value = nowday;
    document.getElementById('penerimaanAset_tgltagih').value = nowday; */
    Logistik_listpembelian_listlogistik();

    function Logistik_listpembelian_listlogistik() {
        $('#loadingpenerimaanAset').hide();
    }


    tampilpenerimaanAset();

    function tampilpenerimaanAset() {
        $('#loadingpenerimaanAset').show();
        var param = {
            /* unitorder: document.getElementById('penerimaanAset_unitOrder').value,
            tglpermintaan: document.getElementById('penerimaanAset_tglpermintaan').value, */
            /* tgldatang: document.getElementById('penerimaanAset_tgldatang').value,
            tgltempo: document.getElementById('penerimaanAset_tgltempo').value,
            tgltagih: document.getElementById('penerimaanAset_tgltagih').value, */
            jmlh: document.getElementById('penerimaanAset_jmltampil').value,
        };

        apiPOST("Aset/list_penerimaanAset", param, hasil => {
            $('#loadingpenerimaanAset').hide();
            $('#penerimaanAset_daftar tbody').html('');
            var a = hasil['data'];


            if (hasil['data'] !== null) {
                if (hasil['code'] == 'XX') {
                    toastr.error("Data tidak ditemukan");
                    var Baris = "";
                    Baris += '<tr><td colspan="9" align="center">Data tidak ditemukan</td></tr>';
                    $('#penerimaanAset_daftar').append(Baris);
                } else {
                    toastr.success("Data ditemukan");
                    for (var i = 0; i < a.length; i++) {
                        var id_barang_aset = a[i].id_barang_aset;
                        var nama_aset = a[i].nama_aset;
                        var no_faktur = a[i].no_faktur;
                        var tgl_beli = a[i].tgl_beli;
                        var tgl_pakai = a[i].tgl_pakai;
                        var tgl_akhir_susut = a[i].tgl_akhir_susut;
                        var tipe_aset = a[i].tipe_aset;
                        var id_gudang_unit = a[i].id_gudang_unit;
                        var id_supplier = a[i].id_supplier;
                        var ket = a[i].ket;
                        var jenis_susut = a[i].jenis_susut;
                        var total_jml = a[i].total_jml;
                        var cicilan = a[i].cicilan;
                        var sisa = a[i].sisa;
                        var no = i + 1;


                        Baris += '<tr>';
                        Baris += '<td>' + no + '</td>';
                        Baris += '<td style="display: flex;">';
                        Baris += '<button type="button" class="btn btn-xs btn-warning" id="" onclick = "(bukamodpenerimaanAset(' + id_barang_aset + '))" style="width:100%"><i class="fa fa-pencil-alt"></i></button>';
                        // if (status == 't') {
                        //     Baris += '&nbsp;<div class="col-sm-1" style="display:contents;"><img src="<?= base_url('_assets/dist/img/checklist.png') ?>" width="20px" height="20px" title="Sudah dikirim"/></div>';
                        // } else {
                        //     Baris += '&nbsp;<div class="col-sm-1" style="display:contents;"><img src="<?= base_url('_assets/dist/img/cancel.png') ?>" width="20px" height="20px" title="Belum dikirim"/></div>';
                        // }
                        Baris += '</td>';
                        Baris += '<td>' + id_barang_aset + '</td>';
                        Baris += '<td>' + nama_aset + '</td>';
                        Baris += '<td>' + no_faktur + '</td>';
                        Baris += '<td>' + tgl_beli + '</td>';
                        Baris += '<td>' + tgl_pakai + '</td>';
                        Baris += '<td>' + tgl_akhir_susut + '</td>';
                        Baris += '<td>' + tipe_aset + '</td>';
                        Baris += '<td>' + id_gudang_unit + '</td>';
                        Baris += '<td>' + id_supplier + '</td>';
                        Baris += '<td>' + ket + '</td>';
                        Baris += '<td>' + jenis_susut + '</td>';
                        Baris += '<td>' + total_jml + '</td>';
                        Baris += '<td>' + cicilan + '</td>';
                        Baris += '<td>' + sisa + '</td>';

                    }
                    $('#penerimaanAset_daftar').append(Baris);
                }
            }
        });

    }

    function bukamodpenerimaanAset() {
        $('#penerimaanAset_listaset1').hide();
        $('#penerimaanAset_listaset2').hide();
        $('.modpenerimaanAset_content').load('Aset/modpenerimaanAset');
    }
</script>