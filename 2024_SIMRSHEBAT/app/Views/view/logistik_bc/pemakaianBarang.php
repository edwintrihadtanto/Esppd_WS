<?php
$nowday     = date('Y-m-d');
//$nextday    = date('Y-m-d', strtotime('+1 days', strtotime($nowday))); 
$nextday    = $nowday;
?>
<div class="col-md-12 p-2" id="pemakaianLogistik_list1">
    <div class="card card-outline card-default mb-0">
        <div class="card-body p-2 darkgrey-custom">
            <div class="row row-custom">
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="pemakaianLogistik_nofaktur">Unit Permintaan</label>
                        <input type="search" class="form-control form-control-xs" placeholder="Entry No. Faktur" id="pemakaianLogistik_nofaktur" name="pemakaianLogistik_nofaktur" onkeypress="tampilpemakaianLogistik()">
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="pemakaianLogistik_tglpemakaian">Tgl. Permintaan :</label>
                        <input type="date" class="form-control form-control-xs" id="pemakaianLogistik_tglpemakaian" name="pemakaianLogistik_tglpemakaian" onchange="tampilpemakaianLogistik()">
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="pemakaianLogistik_jmltampil">Jumlah Pembelian :</label>
                        <select class="form-control form-control-xs" id="pemakaianLogistik_jmltampil" name="pemakaianLogistik_jmltampil" onchange="tampilpemakaianLogistik()">
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

<div class="col-md-12 p-2" id="pemakaianLogistik_list2">
    <div class="card card-outline">
        <div class="overlay-wrapper" id="loadingpemakaianLogistik">
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
                                <h6 class="hr6-custom" id="pemakaianLogistik_titleheader"><i class="fas fa-boxes"></i> </i> Pemakaian Barang</h6>
                            </div>
                        </div>
                        <!-- END LETAK BUTTON -->
                    </div>
                </div>
            </div>

            <table id="pemakaianLogistik_daftar" class="table table-striped table-sm choose">
                <thead>
                    <tr>
                        <th class="pl-0" width="5" style="text-align:center;">No.</th>
                        <th width="5"></th>
                        <th width="5">ID</th>
                        <th width="100">
                            Gudang
                        </th>
                        <th width="50">
                            Jumlah Barang
                        </th>
                        <th width="50">
                            Jumlah Stok
                        </th>
                        <th width="50">
                            Transaksi
                        </th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

    </div>
</div>

<div class="modpemakaianLogistik_content"></div>

<script>
    var nowday = "<?php echo $nowday; ?>";
    var nextday = "<?php echo $nextday; ?>";

    document.getElementById('pemakaianLogistik_tglpemakaian').value = nowday;

    tampilpemakaianLogistik();

    function tampilpemakaianLogistik() {
        $('#loadingpemakaianLogistik').show();
        var param = {
            tglpermintaan: document.getElementById('pemakaianLogistik_tglpemakaian').value,
            jmlh: document.getElementById('pemakaianLogistik_jmltampil').value,
        };

        apiPOST("Logistik/getListGudang_pemakaianLogistik", param, hasil => {
            $('#loadingpemakaianLogistik').hide();
            $('#pemakaianLogistik_daftar tbody').html('');
            var a = hasil['data'];
            console.log(a)
            if (hasil['data'] !== null) {
                toastr.success("Data ditemukan");
                var Baris = '';
                for (var i = 0; i < a.length; i++) {
                    var id_gudang_unit = a[i].id_gudang_unit;
                    var nama_gudang = a[i].nama_gudang;
                    var no = i + 1;


                    Baris += '<tr>';
                    Baris += '<td>' + no + '</td>';
                    Baris += '<td style="display: flex;">';
                    Baris += '<button type="button" class="btn btn-xs btn-warning" id="" onclick = "(bukamodPembelianLogistik(' + id_gudang_unit + '))" style="width:100%"><i class="fa fa-pencil-alt"></i></button>';
                    Baris += '</td>';
                    Baris += '<td>' + id_gudang_unit + '</td>';
                    Baris += '<td>' + nama_gudang + '</td>';
                    Baris += '<td>10</td>';
                    Baris += '<td>20</td>';
                    Baris += '<td>30</td>';
                }
                $('#pemakaianLogistik_daftar').append(Baris);
            }
        });

    }
</script>