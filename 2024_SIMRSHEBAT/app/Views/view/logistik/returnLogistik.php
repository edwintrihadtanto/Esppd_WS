<?php
$nowday     = date('Y-m-d');
?>
<div class="col-md-12 p-2" id="returnLogistik_list1">
    <div class="card card-outline card-default mb-0">
        <div class="card-body p-2 darkgrey-custom">
            <div class="row row-custom">
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="returnLogistik_GudangUnit">Return Logistik</label>
                        <input type="search" class="form-control form-control-xs" id="returnLogistik_GudangUnit" placeholder="Entry Nama Unit" name="okesss" onkeypress="tampilreturnLogistik()">
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="col-md-12 p-2" id="returnLogistik_list2">
    <div class="card card-outline">
        <div class="overlay-wrapper" id="loadingreturnLogistik">
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
                                <h6 class="hr6-custom" id="returnLogistik_titleheader"><i class="fas fa-boxes"></i> </i> Return Logistik</h6>
                                <button type="button" class="btn bg-gradient-secondary btn-xs" type="submit" id='pembelianLogistik_btn_tambah' onclick="bukamodreturnLogistik()"> <i class="fas fa-user-plus"></i> Return Barang</button>
                                <button type="button" class="btn bg-gradient-warning btn-xs" type="submit" id='pembelianLogistik_btn_tambah' onclick="retunrLogistikviewstokUnitBarang()"> <i class="fas fa-eye"></i> Stok Unit</button>
                                <button type="button" class="btn btn-info btn-xs" onclick="returnLogistik_refresh()"><i class="fa fa-sync-alt fa-spin"></i> Refresh Data</button>
                            </div>
                        </div>
                        <!-- END LETAK BUTTON -->
                    </div>
                </div>
            </div>

            <table id="returnLogistik_daftar" class="table table-striped table-sm choose">
                <thead>
                    <tr>
                        <th class="pl-0" width="5" style="text-align:center;">No.</th>
                        <th width="5"></th>
                        <th width="5">ID</th>
                        <th width="100">
                            Gudang Unit Asal
                        </th>
                        <th width="50">
                            Gudang Logistik
                        </th>
                        <th width="50">
                            Tgl. Return
                        </th>
                        <th width="50">
                            Keterangan
                        </th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

    </div>
</div>

<div class="modreturnLogistik_content"></div>
<div class="viewstokUnitBarang_content"></div>

<script>
    var nowday = "<?php echo $nowday; ?>";


    tampilreturnLogistik();

    function tampilreturnLogistik() {
        $('#loadingreturnLogistik').show();
        var param = {
            gudang_unit: user['id_gudang_unit']
        };

        apiPOST("Logistik/getListreturnLogistik", param, hasil => {
            $('#loadingreturnLogistik').hide();
            $('#returnLogistik_daftar tbody').html('');
            var a = hasil['data'];
            if (hasil['data'] !== null) {
                if (hasil['code'] == 'XX') {
                    toastr.error("Data tidak ditemukan");
                    var Baris = "";
                    Baris += '<tr><td colspan="7" align="center">Data tidak ditemukan</td></tr>';
                    $('#returnLogistik_daftar').append(Baris);
                } else {
                    toastr.success("Data ditemukan");
                    var Baris = '';
                    for (var i = 0; i < a.length; i++) {
                        var id_return_logistik = a[i].id_return_logistik;
                        var unit_asal = a[i].unit_asal;
                        var logistik = a[i].logistik;
                        var tgl_return = a[i].tgl_return;
                        var ket = a[i].ket;
                        var no = i + 1;


                        Baris += '<tr>';
                        Baris += '<td>' + no + '</td>';
                        Baris += '<td style="display: flex;">';
                        Baris += '<button type="button" class="btn btn-xs btn-warning" id="" onclick = "(bukamodreturnLogistik(' + "'" + id_return_logistik + "'" + '))" style="width:100%"><i class="fa fa-pencil-alt"></i></button>';
                        Baris += '</td>';
                        Baris += '<td>' + id_return_logistik + '</td>';
                        Baris += '<td>' + unit_asal + '</td>';
                        Baris += '<td>' + logistik + '</td>';
                        Baris += '<td>' + tgl_return + '</td>';
                        Baris += '<td>' + ket + '</td>';
                    }
                    $('#returnLogistik_daftar').append(Baris);
                }
            }
        });

    }

    function returnLogistik_refresh() {
        document.getElementById('returnLogistik_GudangUnit').value = '';
        tampilreturnLogistik();
    }

    function bukamodreturnLogistik() {
        $('#returnLogistik_list1').hide();
        $('#returnLogistik_list2').hide();
        /* var data = {
            id_return_logistik: id_return_logistik
        }
        var datax = JSON.stringify(data); */
        $('.modreturnLogistik_content').load('Logistik/modreturnLogistik');
        /* $('.modreturnLogistik_content').load('Logistik/modreturnLogistik?data=' + datax); */
    }

    function retunrLogistikviewstokUnitBarang() {
        $('.viewstokUnitBarang_content').load('Logistik/mod_ListBarangLogistikUnitreturn');
    }
</script>