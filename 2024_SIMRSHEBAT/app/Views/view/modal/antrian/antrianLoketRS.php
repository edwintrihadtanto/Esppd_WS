<?php
$data = json_decode($_GET['data']);
$id_loket       = str_replace('"', '', json_encode($data->id_loket));
$nama_loket       = str_replace('"', '', json_encode($data->nama_loket));
$id_jenis_antrian       = str_replace('"', '', json_encode($data->jenis_loket));
$hariini = str_replace('"', '', json_encode($data->hariini));
date_default_timezone_set('Asia/Jakarta');
?>
<section class="content pb-0">
    <div class="container-fluid h-100">
        <div class="col-md-12 p-2" id="antrianLoket_listpasien1">
            <div class="card card-outline card-default mb-0">
                <div class="card-body p-2 darkgrey-custom">
                    <div class="card" style="box-shadow: 0 0 3px #343a40; margin-bottom: 1;">
                        <div>
                            <div class="card-header p-1">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h6 class="hr6-custom" id="titleAntrianLoket"></h6>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-outline-danger btn-xs" onclick="loket_Kembaliawal()">
                                    <i class="fa fa-arrow-left"></i> Kembali</button>
                                <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="antrianLoket_list()"><i class="fa fa-sync-alt fa-spin"></i> Refresh</button>
                            </div>
                        </div>
                    </div>
                    <div class="row row-custom mb-2">
                        <div class="col-md-3">
                            <div class="info-box info-box-hover shadow mb-1" style="border: 2px solid;">
                                <div class="info-box-content">
                                    <span class="info-box-number">Jumlah Antrian</span>
                                </div>
                                <span class="info-box-icon bg-default" id="jmlantrian_Loket"></span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="info-box info-box-hover shadow mb-1" style="border: 2px solid;">
                                <div class="info-box-content">
                                    <span class="info-box-number">Antrian Sekarang</span>
                                </div>
                                <span class="info-box-icon bg-default" id="antriansekarang_Loket"></span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="info-box info-box-hover shadow mb-1" style="border: 2px solid;">
                                <div class="info-box-content">
                                    <span class="info-box-number">Antrian Selanjutnya</span>
                                </div>
                                <span class="info-box-icon bg-default" id="antrianselanjutnya_Loket"></span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="info-box info-box-hover shadow mb-1" style="border: 2px solid;">
                                <div class="info-box-content">
                                    <span class="info-box-number">Sisa Antrian</span>
                                </div>
                                <span class="info-box-icon bg-default" id="sisaantrian_Loket"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- card-outline -->
            </div>
        </div>

        <div class="col-md-12 p-2" id="antrianLoket_listpasien2">
            <div class="card card-outline">
                <div class="overlay-wrapper" id="antrianLoket_loadingawal">
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
                                        <h6 class="hr6-custom" id="igd_pendf_titleheader"><i class="fas fa-heartbeat"></i> Daftar Antrian Loket</h6>
                                        <!-- <div>
                  <button type="button" class="btn bg-gradient-secondary btn-xs pasienbaruigd" type="submit" id='resepRWJAPT_btn_addresep' onclick="vOrderResepDokter()"> <i class="fas fa-user-plus"></i> Tambah Resep</button>
                  <button type="button" class="btn bg-gradient-secondary btn-xs pasienbaruigd" type="submit" id='resepRWJAPT_btn_editresep'> <i class="fas fa-edit"></i> Edit Resep</button>
                </div> -->
                                    </div>
                                </div>
                                <!-- END LETAK BUTTON -->
                            </div>
                        </div>
                    </div>

                    <table id="antrianLoket_list" class="table table-striped table-sm choose">
                        <thead>
                            <tr>
                                <th width="100">Nomor Antrian</th>
                                <th width="100">Tanggal</th>
                                <th width="60">Act</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    var id_loket = "<?php echo $id_loket ?>";
    var nama_loket = "<?php echo $nama_loket ?>";
    var id_jenis_antrian = "<?php echo $id_jenis_antrian ?>";
    var hariini = "<?php echo $hariini ?>";


    $('.antrianLoket_content').show();
    $('#antrianLoket_loadingawal').hide();

    document.getElementById('titleAntrianLoket').innerHTML = "Loket " + nama_loket + " " + id_loket;


    antrianLoket_list();
    jmlantrian_Loket();
    antriansekarang_Loket();
    antrianselanjutnya_Loket();
    sisaantrian_Loket();


    function jmlantrian_Loket() {
        var param = {
            id_jenis_antrian: id_jenis_antrian,
            hariini: hariini,
        };
        apiPOST('Antrian/jmlantrian_Loket', param, hasil => {
            var data = hasil['data'];
            document.getElementById('jmlantrian_Loket').innerHTML = data;
        });
    }

    function antriansekarang_Loket() {
        var param = {
            id_jenis_antrian: id_jenis_antrian,
            hariini: hariini,
        };
        apiPOST('Antrian/antriansekarang_Loket', param, hasil => {
            var data = hasil['data'];
            document.getElementById('antriansekarang_Loket').innerHTML = data;
        });
    }

    function antrianselanjutnya_Loket() {
        var param = {
            id_jenis_antrian: id_jenis_antrian,
            hariini: hariini,
        };
        apiPOST('Antrian/antrianselanjutnya_Loket', param, hasil => {
            var data = hasil['data'];
            document.getElementById('antrianselanjutnya_Loket').innerHTML = data;
        });
    }

    function sisaantrian_Loket() {
        var param = {
            id_jenis_antrian: id_jenis_antrian,
            hariini: hariini,
        };
        apiPOST('Antrian/sisaantrian_Loket', param, hasil => {
            var data = hasil['data'];
            document.getElementById('sisaantrian_Loket').innerHTML = data;
        });
    }

    function antrianLoket_list() {
        var param = {
            id_jenis_antrian: id_jenis_antrian,
            hariini: hariini,
        };
        apiPOST('Antrian/antrianLoket_list', param, hasil => {
            var data = hasil['data'];
            $('#antrianLoket_loadingawal').hide();
            $('#antrianLoket_list tbody').html('');
            var Baris = "";
            var a = hasil['data'];
            for (var i = 0; i < a.length; i++) {
                var id_antrian_loket = a[i].id;
                var kode = a[i].kode;
                var status = a[i].status;
                var no_antrian = a[i].no_antrian;
                var tanggal = a[i].tanggal;

                Baris += '<tr>';
                Baris += '<td>' + kode + no_antrian + '</td>';
                Baris += '<td>' + tanggal + '</td>';
                if (status == 1) {
                    Baris += '<td style="display: flex; justify-content: space-around ;"><button type="button" class="btn btn-xs btn-danger" onclick="panggilAntrianLoket(' + "'" + id_loket + "','" + nama_loket + "','" + id_antrian_loket + "'" + ')"><i class="fas fa-microphone"></i></button></td>';
                } else {
                    Baris += '<td style="display: flex; justify-content: space-around ;"><button type="button" class="btn btn-xs btn-success" onclick="panggilAntrianLoket(' + "'" + id_loket + "','" + nama_loket + "','" + id_antrian_loket + "'" + ')"><i class="fas fa-microphone"></i></button></td>';

                }
            }
            $('#antrianLoket_list tbody').append(Baris);
        });
    }

    function panggilAntrianLoket(id_loket, nama_loket, id_antrian_loket) {
        console.log('<?= date('Y-m-d H:i:s') ?>')
        var param = {
            id_loket: id_loket,
            nama_loket: nama_loket,
            id_antrian_loket: id_antrian_loket
        };
        apiPOST('Antrian/updateAntrianLoket', param, hasil => {
            console.log(hasil)
            antrianLoket_list();
            jmlantrian_Loket();
            antriansekarang_Loket();
            antrianselanjutnya_Loket();
            sisaantrian_Loket();


        });
    }

    function loket_Kembaliawal() {
        $('.antrianLoket_content').hide();
        $('#loket_list1').show();
        $('#loket_list2').show();
    }
</script>