<?php
$nowday     = date('Y-m-d');
//$nextday    = date('Y-m-d', strtotime('+1 days', strtotime($nowday))); 
$nextday    = $nowday;
?>
<!-- <div class="col-md-12 p-2" id="antrianDisplay_listpembelian1">
    <div class="card card-outline card-default mb-0">
        <div class="card-body p-2 darkgrey-custom">
            <div class="row row-custom">
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="antrianDisplay_unitOrder">Unit Order :</label>
                        <input type="search" class="form-control form-control-xs" placeholder="Entry Unit Order" id="antrianDisplay_unitOrder" name="antrianDisplay_unitOrder" onkeypress="tampilantrianDisplay()">
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <div class="input-group">
                            <label for="antrianDisplay_tglpermintaan">Tgl. Permintaan :</label>
                            <div class="custom-control custom-checkbox ">
                                <input name="antrianDisplay_checkedtgl" type="checkbox" class="custom-control-input" id="antrianDisplay_checkedtgl" onclick="tampilantrianDisplay()" checked>
                                <label class="custom-control-label" for="antrianDisplay_checkedtgl"></label>
                            </div>
                        </div>
                        <input type="date" class="form-control form-control-xs" id="antrianDisplay_tglpermintaan" name="antrianDisplay_tglpermintaan" onchange="tampilantrianDisplay()">
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="antrianDisplay_jmltampil">Jumlah List :</label>
                        <select class="form-control form-control-xs" id="antrianDisplay_jmltampil" name="antrianDisplay_jmltampil" onchange="tampilantrianDisplay()">
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
</div> -->

<div class="col-md-12 p-2" id="antrianDisplay_listpembelian2">
    <div class="card card-outline">
        <!-- <div class="overlay-wrapper" id="loadingantrianDisplay">
            <div class="overlay">
                <i class="fas fa-3x fa-sync-alt fa-spin"></i>
            </div>
        </div> -->

        <div class="card-body p-1" style="max-height: 420px; overflow: auto;">
            <div class="card" style="box-shadow: 0 0 3px #343a40; margin-bottom: 0;">
                <div>
                    <div class="card-header p-1 darkgrey-custom">
                        <div class="row">
                            <div class="col-md-12">
                                <h6 class="hr6-custom" id="antrianDisplay_titleheader"><i class="fas fa-boxes"></i> </i> Display Antrian</h6>
                                <div>
                                    <button type="button" class="btn bg-gradient-success btn-xs" type="submit" id='antrianDisplay_btn_tambah' onclick="opennewtabkiosk()">Display Kios K <i class="fas fa-arrow-right"></i></button>
                                    <button type="button" class="btn bg-gradient-success btn-xs" type="submit" id='antrianDisplay_btn_tambah' onclick="opennewtabdisplayloket()">Display Antrian Loket <i class="fas fa-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- END LETAK BUTTON -->
                    </div>
                </div>
            </div>
            <div class="card" style="box-shadow: 0 0 3px #343a40; margin-bottom: 0;">
                <div>
                    <div class="card-header p-1">
                        <div class="row">
                            <div class="col-md-12">
                                <h6 class="hr6-custom" id="antrianDisplay_titleheader"><i class="fas fa-boxes"></i> </i> List Display Antrian Poli</h6>
                            </div>
                        </div>
                        <!-- END LETAK BUTTON -->
                    </div>
                </div>
            </div>
            <div class="card-body p-1" style="max-height: 420px; overflow: auto;">
                <div class="row" id="antrianDisplay_daftar">
                </div>
            </div>
        </div>

    </div>
</div>


<script>
    function opennewtabkiosk() {
        window.open('http://192.186.2.4/antriantest/Home/antrian');
    }

    function opennewtabdisplayloket() {
        window.open('http://192.186.2.4/antriantest/Display/displayloket');
    }

    tampilantrianDisplay()

    function tampilantrianDisplay() {
        $('#loadingantrianDisplay').show();

        apiPOST("Antrian/list_antrianDisplay", null, hasil => {
            $('#loadingantrianDisplay').hide();
            $('#antrianDisplay_daftar tbody').html('');
            var a = hasil['data'];


            if (hasil['data'] !== null) {
                if (hasil['code'] == 'XX') {
                    toastr.error("Data tidak ditemukan");
                    var Baris = "";
                    Baris += '<div class="col-md-12" style="cursor:not-allowed;">';
                    Baris += '<div class="info-box shadow mb-1" style="border: 2px solid; background-color: darksalmon; font-weight: bolder;">'
                    Baris += '<span class="info-box-icon bg-danger"><i class="fa fa-times"></i></span>';
                    Baris += '<div class="info-box-content">';
                    Baris += '<span class="info-box-number"></span>';
                    Baris += '<span class="info-box-text"></span>';
                    Baris += '<h5 class="info-box-text">Data tidak ditemukan</h5>';
                    Baris += '</div>';
                    Baris += '</div>';
                    Baris += '</div>';
                    $('#antrianDisplay_daftar').append(Baris);
                } else {
                    toastr.success("Data ditemukan");
                    var Baris = "";
                    var a = hasil['data'];
                    for (var i = 0; i < a.length; i++) {
                        var id_display = a[i].id_display;
                        var nama_display = a[i].nama_display;
                        Baris += '<div class="col-md-3" onclick="opennewtabdisplaypoli(' + id_display + ')" style="cursor:pointer;">';
                        Baris += '<div class="info-box info-box-hover shadow mb-1" style="border: 2px solid;">'
                        Baris += '<span class="info-box-icon bg-default"><i class="fas fa-desktop"></i></span>';
                        Baris += '<div class="info-box-content">';
                        Baris += '<span style="font-size: 20px" class="info-box-text">' + nama_display + '</span>';
                        Baris += '</div>';
                        Baris += '</div>';
                        Baris += '</div>';
                    }
                    $('#antrianDisplay_daftar').append(Baris);
                }
            }
        });

    }

    function opennewtabdisplaypoli(id_display) {
        window.open('http://192.186.2.4/antriantest/Display/displaypoli/'+id_display);
    }
</script>
<!-- <div class="modantrianDisplay_content"></div>.


<script>
    var nowday = "<?php echo $nowday; ?>";
    var nextday = "<?php echo $nextday; ?>";


    document.getElementById('antrianDisplay_tglpermintaan').value = nowday;
    /* document.getElementById('antrianDisplay_tgldatang').value = nowday;
    document.getElementById('antrianDisplay_tgltempo').value = nowday;
    document.getElementById('antrianDisplay_tgltagih').value = nowday; */
    Logistik_listpembelian_listlogistik();

    function Logistik_listpembelian_listlogistik() {
        $('#loadingantrianDisplay').hide();
    }


    tampilantrianDisplay();

    

    function bukamodantrianDisplay(id) {
        var data = {
            id_permintaan_logistik: id
        }
        var datax = JSON.stringify(data);
        $('.modantrianDisplay_content').load('Logistik/modantrianDisplay?data=' + datax);
    }
</script> -->