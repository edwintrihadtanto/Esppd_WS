<?php
$nowday     = date('Y-m-d');
?>
<div class="col-md-12 p-2" id="pemakaianLogistik_list1">
    <div class="card card-outline card-default mb-0">
        <div class="card-body p-2 darkgrey-custom">
            <div class="row row-custom">
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="pemakaianLogistik_GudangUnit">Gudang Unit</label>
                        <input type="search" class="form-control form-control-xs" id="pemakaianLogistik_GudangUnit" placeholder="Entry Nama Unit" name="okesss" onkeypress="tampilpemakaianLogistik()">
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
                                <button type="button" class="btn btn-info btn-xs" onclick="pemakaianLogistik_refresh()"><i class="fa fa-sync-alt fa-spin"></i> Refresh Data</button>
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
                            Jumlah Stok
                        </th>
                        <th width="50">
                            Jumlah Barang
                        </th>
                        <th width="50">
                            Transaksi Permintaan
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


    tampilpemakaianLogistik();
    getGudangUnitpemakaian();

    function getGudangUnitpemakaian() {
        apiPOST('Logistik/getGudangUnit', null, hasil => {
            var data = '';
            var a = hasil['data'];
            data = '<option value = "">--Semua--</option>'
            for (var i = 0; i < a.length; i++) {
                data += '<option value="' + a[i]['id_gudang_unit'] + '">' + a[i]['nama_gudang'] + '</option>';
            }
            document.getElementById('pemakaianLogistik_GudangUnit').innerHTML = data;

        });
    }

    function tampilpemakaianLogistik() {
        $('#loadingpemakaianLogistik').show();
        var param = {
            gudang_unit: document.getElementById('pemakaianLogistik_GudangUnit').value
        };

        apiPOST("Logistik/getListGudang_pemakaianLogistik", param, hasil => {
            $('#loadingpemakaianLogistik').hide();
            $('#pemakaianLogistik_daftar tbody').html('');
            var a = hasil['data'];
            if (hasil['data'] !== null) {
                if (hasil['code'] == 'XX') {
                    toastr.error("Data tidak ditemukan");
                    var Baris = "";
                    Baris += '<tr><td colspan="7" align="center">Data tidak ditemukan</td></tr>';
                    $('#pemakaianLogistik_daftar').append(Baris);
                } else {
                    toastr.success("Data ditemukan");
                    var Baris = '';
                    for (var i = 0; i < a.length; i++) {
                        var id_gudang_unit = a[i].id_gudang_unit;
                        var nama_gudang = a[i].nama_gudang;
                        var stok_total = a[i].stok_total;
                        var transaksi = a[i].transaksi;
                        var jml_barang = a[i].jml_barang;
                        var no = i + 1;


                        Baris += '<tr>';
                        Baris += '<td>' + no + '</td>';
                        Baris += '<td style="display: flex;">';
                        Baris += '<button type="button" class="btn btn-xs btn-warning" id="" onclick = "(bukamodpemakaianLogistik(' + "'" + id_gudang_unit + "','" + nama_gudang + "','" + jml_barang + "'" + '))" style="width:100%"><i class="fa fa-pencil-alt"></i></button>';
                        Baris += '</td>';
                        Baris += '<td>' + id_gudang_unit + '</td>';
                        Baris += '<td>' + nama_gudang + '</td>';
                        Baris += '<td>' + stok_total + '</td>';
                        Baris += '<td>' + jml_barang + '</td>';
                        Baris += '<td>' + transaksi + '</td>';
                    }
                    $('#pemakaianLogistik_daftar').append(Baris);
                }
            }
        });

    }

    function pemakaianLogistik_refresh() {
        document.getElementById('pemakaianLogistik_GudangUnit').value = '';
        tampilpemakaianLogistik();
    }

    function bukamodpemakaianLogistik(id_gudang_unit, nama_gudang, jml_barang) {
        $('#pemakaianLogistik_list1').hide();
        $('#pemakaianLogistik_list2').hide();
        var data = {
            id_gudang_unit: id_gudang_unit,
            nama_gudang: nama_gudang.replace(/ /g, '%20'),
            jml_barang: jml_barang
        }
        var datax = JSON.stringify(data);
        $('.modpemakaianLogistik_content').load('Logistik/modpemakaianLogistik?data=' + datax);
    }
</script>