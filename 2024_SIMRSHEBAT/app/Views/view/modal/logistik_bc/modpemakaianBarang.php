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
                        <th width="5">ID</th>
                        <th width="100">
                            Nama Barang
                            <button type="button" id="inputnamabarang" class="btn bg-gradient-light btn-xs text-right" onclick="inputnamabarang(true)"><i class="fa fa-edit"></i></button>
                            <button type="button" id="falseinputnamabarang" class="btn bg-gradient-light btn-xs text-right" onclick="inputnamabarang(false)" hidden><i class="fa fa-check"></i></button>
                        </th>
                        <th width="50">
                            Satuan Pakai
                            <button type="button" id="inputsatuan" class="btn bg-gradient-light btn-xs text-right" onclick="inputsatuan(true)"><i class="fa fa-edit"></i></button>
                            <button type="button" id="falseinputsatuan" class="btn bg-gradient-light btn-xs text-right" onclick="inputsatuan(false)" hidden><i class="fa fa-check"></i></button>
                        </th>
                        <th width="50">
                            Stok
                            <button type="button" id="inputqty" class="btn bg-gradient-light btn-xs text-right" onclick="inputqty(true)"><i class="fa fa-edit"></i></button>
                            <button type="button" id="falseinputqty" class="btn bg-gradient-light btn-xs text-right" onclick="inputqty(false)" hidden><i class="fa fa-check"></i></button>
                        </th>
                        <th width="50">
                            Harga Beli
                            <button type="button" id="inputhargabelibarang" class="btn bg-gradient-light btn-xs text-right" onclick="inputhargabelibarang(true)"><i class="fa fa-edit"></i></button>
                            <button type="button" id="falseinputhargabelibarang" class="btn bg-gradient-light btn-xs text-right" onclick="inputhargabelibarang(false)" hidden><i class="fa fa-check"></i></button>
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

        apiPOST("Logistik/getBarangLogistikP", null, hasil => {
            $('#loadingpemakaianLogistik').hide();
            $('#pemakaianLogistik_daftar tbody').html('');
            var a = hasil['data'];
            console.log(a)
            if (hasil['data'] !== null) {
                toastr.success("Data ditemukan");
                var Baris = '';
                for (var i = 0; i < a.length; i++) {
                    var id_barang_logistik = a[i].id_barang_logistik;
                    var nama_barang = a[i].nama_barang;
                    var satuan_pakai = a[i].satuan_pakai;
                    var qty = a[i].qty;
                    var harga_beli = a[i].harga_beli;
                    var no = i + 1;


                    Baris += '<tr>';
                    Baris += '<td>' + no + '</td>';
                    Baris += '<td>' + id_barang_logistik + '</td>';
                    Baris += '<td><input type="text" class="inputnamabarang form-control form-control-xs" value="' + nama_barang + '" disabled></td>';
                    Baris += '<td><input type="text" class="inputsatuan form-control form-control-xs" value="' + satuan_pakai + '" disabled></td>';
                    Baris += '<td><input type="text" class="inputqty form-control form-control-xs" value="' + qty + '" disabled></td>';
                    Baris += '<td><input type="text" class="inputhargabelibarang form-control form-control-xs" value="' + harga_beli + '" disabled></td>';
                }
                $('#pemakaianLogistik_daftar').append(Baris);
            }
        });

    }

    function inputnamabarang(flag) {
        if (flag == true) {
            document.getElementById('inputnamabarang').hidden = true;
            document.getElementById('falseinputnamabarang').hidden = false;
            const inputnamabarang = document.getElementsByClassName("inputnamabarang");
            for (let i = 0; i < inputnamabarang.length; i++) {
                inputnamabarang[i].disabled = false;
            }
        } else {
            document.getElementById('inputnamabarang').hidden = false;
            document.getElementById('falseinputnamabarang').hidden = true;
            const inputnamabarang = document.getElementsByClassName("inputnamabarang");
            for (let i = 0; i < inputnamabarang.length; i++) {
                inputnamabarang[i].disabled = true;
            }
        }

    }

    function inputsatuan(flag) {
        if (flag == true) {
            document.getElementById('inputsatuan').hidden = true;
            document.getElementById('falseinputsatuan').hidden = false;
            const inputsatuan = document.getElementsByClassName("inputsatuan");
            for (let i = 0; i < inputsatuan.length; i++) {
                inputsatuan[i].disabled = false;
            }
        } else {
            document.getElementById('inputsatuan').hidden = false;
            document.getElementById('falseinputsatuan').hidden = true;
            const inputsatuan = document.getElementsByClassName("inputsatuan");
            for (let i = 0; i < inputsatuan.length; i++) {
                inputsatuan[i].disabled = true;
            }
        }
    }

    function inputqty(flag) {
        if (flag == true) {
            document.getElementById('inputqty').hidden = true;
            document.getElementById('falseinputqty').hidden = false;
            const inputqty = document.getElementsByClassName("inputqty");
            for (let i = 0; i < inputqty.length; i++) {
                inputqty[i].disabled = false;
            }
        } else {
            document.getElementById('inputqty').hidden = false;
            document.getElementById('falseinputqty').hidden = true;
            const inputqty = document.getElementsByClassName("inputqty");
            for (let i = 0; i < inputqty.length; i++) {
                inputqty[i].disabled = true;
            }
        }
    }

    function inputhargabelibarang(flag) {
        if (flag == true) {
            document.getElementById('inputhargabelibarang').hidden = true;
            document.getElementById('falseinputhargabelibarang').hidden = false;
            const inputhargabelibarang = document.getElementsByClassName("inputhargabelibarang");
            for (let i = 0; i < inputhargabelibarang.length; i++) {
                inputhargabelibarang[i].disabled = false;
            }
        } else {
            document.getElementById('inputhargabelibarang').hidden = false;
            document.getElementById('falseinputhargabelibarang').hidden = true;
            const inputhargabelibarang = document.getElementsByClassName("inputhargabelibarang");
            for (let i = 0; i < inputhargabelibarang.length; i++) {
                inputhargabelibarang[i].disabled = true;
            }
        }
    }
</script>