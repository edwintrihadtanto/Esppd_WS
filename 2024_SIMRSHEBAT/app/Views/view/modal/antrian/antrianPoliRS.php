<?php
$data = json_decode($_GET['data']);
$id_pegawai       = str_replace('"', '', json_encode($data->id_pegawai));
$nama_unit       = str_replace('"', '', json_encode($data->nama_unit));
$hariini = str_replace('"', '', json_encode($data->hariini));
?>
<section class="content pb-0">
    <div class="container-fluid h-100">
        <div class="col-md-12 p-2" id="antrianPoli_listpasien1">
            <div class="card card-outline card-default mb-0">
                <div class="card" style="box-shadow: 0 0 3px #343a40; margin-bottom: 0;">
                    <div>
                        <div class="card-header p-1">
                            <div class="row">
                                <div class="col-md-12">
                                    <h6 class="hr6-custom" id="titleAntrianPoli"></h6>
                                </div>
                            </div>
                            <button type="button" class="btn btn-outline-danger btn-xs" onclick="poli_Kembaliawal()">
                                <i class="fa fa-arrow-left"></i> Kembali</button>
                            <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="antrianPoli_list()"><i class="fa fa-sync-alt fa-spin"></i> Refresh</button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-2 darkgrey-custom">
                    <div class="row row-custom mb-2">
                        <div class="col-md-3">
                            <div class="info-box info-box-hover shadow mb-1" style="border: 2px solid;">
                                <div class="info-box-content">
                                    <span class="info-box-number">Jumlah Antrian</span>
                                </div>
                                <span class="info-box-icon bg-default" id="jmlantrian_Poli"></span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="info-box info-box-hover shadow mb-1" style="border: 2px solid;">
                                <div class="info-box-content">
                                    <span class="info-box-number">Antrian Sekarang</span>
                                </div>
                                <span class="info-box-icon bg-default" id="antriansekarang_Poli"></span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="info-box info-box-hover shadow mb-1" style="border: 2px solid;">
                                <div class="info-box-content">
                                    <span class="info-box-number">Antrian Selanjutnya</span>
                                </div>
                                <span class="info-box-icon bg-default" id="antrianselanjutnya_Poli"></span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="info-box info-box-hover shadow mb-1" style="border: 2px solid;">
                                <div class="info-box-content">
                                    <span class="info-box-number">Sisa Antrian</span>
                                </div>
                                <span class="info-box-icon bg-default" id="sisaantrian_Poli"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- card-outline -->
            </div>
        </div>

        <div class="col-md-12 p-2" id="antrianPoli_listpasien2">
            <div class="card card-outline">
                <div class="overlay-wrapper" id="antrianPoli_loadingawal">
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
                                        <h6 class="hr6-custom" id="igd_pendf_titleheader"><i class="fas fa-heartbeat"></i> Daftar Antrian Poli</h6>
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

                    <table id="antrianPoli_list" class="table table-striped table-sm choose">
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
    var id_pegawai = "<?php echo $id_pegawai ?>";
    var nama_unit = "<?php echo $nama_unit ?>";
    var hariini = "<?php echo $hariini ?>";


    $('.antrianPoli_content').show();
    $('#antrianPoli_loadingawal').hide();

    document.getElementById('titleAntrianPoli').innerHTML = nama_unit;

    antrianPoli_list();
    jmlantrian_Poli();
    antriansekarang_Poli();
    antrianselanjutnya_Poli();
    sisaantrian_Poli();


    function jmlantrian_Poli() {
        var param = {
            id_pegawai: id_pegawai,
            hariini: hariini,
        };
        apiPOST('Antrian/jmlantrian_Poli', param, hasil => {
            var data = hasil['data'];
            document.getElementById('jmlantrian_Poli').innerHTML = data;
        });
    }

    function antriansekarang_Poli() {
        var param = {
            id_pegawai: id_pegawai,
            hariini: hariini,
        };
        apiPOST('Antrian/antriansekarang_Poli', param, hasil => {
            var data = hasil['data'];
            document.getElementById('antriansekarang_Poli').innerHTML = data;
        });
    }

    function antrianselanjutnya_Poli() {
        var param = {
            id_pegawai: id_pegawai,
            hariini: hariini,
        };
        apiPOST('Antrian/antrianselanjutnya_Poli', param, hasil => {
            var data = hasil['data'];
            document.getElementById('antrianselanjutnya_Poli').innerHTML = data;
        });
    }

    function sisaantrian_Poli() {
        var param = {
            id_pegawai: id_pegawai,
            hariini: hariini,
        };
        apiPOST('Antrian/sisaantrian_Poli', param, hasil => {
            var data = hasil['data'];
            document.getElementById('sisaantrian_Poli').innerHTML = data;
        });
    }

    function antrianPoli_list() {
        var param = {
            id_pegawai: id_pegawai,
            hariini: hariini,
        };
        apiPOST('Antrian/antrianPoli_list', param, hasil => {
            var data = hasil['data'];
            $('#antrianPoli_loadingawal').hide();
            $('#antrianPoli_list tbody').html('');
            var Baris = "";
            var a = hasil['data'];
            for (var i = 0; i < a.length; i++) {
                var id_antrian_poli = a[i].id_antrian_poli;
                /* var kode = a[i].kode; */
                var status = a[i].status;
                var no_antrian = a[i].no_antrian;
                var tanggal = a[i].tanggal;

                Baris += '<tr>';
                Baris += '<td>' + no_antrian + '</td>';
                Baris += '<td>' + tanggal + '</td>';
                if (status == 1) {
                    Baris += '<td style="display: flex; justify-content: space-around ;"><button type="button" class="btn btn-xs btn-danger" onclick="panggilAntrianPoli(' + "'" + id_antrian_poli + "'" + ')"><i class="fas fa-microphone"></i></button></td>';
                } else {
                    Baris += '<td style="display: flex; justify-content: space-around ;"><button type="button" class="btn btn-xs btn-success" onclick="panggilAntrianPoli(' + "'" + id_antrian_poli + "'" + ')"><i class="fas fa-microphone"></i></button></td>';

                }
            }
            $('#antrianPoli_list tbody').append(Baris);
        });
    }

    function panggilAntrianPoli(id_antrian_poli) {
        var param = {
            id_antrian_poli: id_antrian_poli
        };
        apiPOST('Antrian/updateAntrianPoli', param, hasil => {
            antrianPoli_list();
            jmlantrian_Poli();
            antriansekarang_Poli();
            antrianselanjutnya_Poli();
            sisaantrian_Poli();


        });
    }

    function poli_Kembaliawal() {
        $('.antrianPoli_content').hide();
        $('#poli_list1').show();
        $('#poli_list2').show();
    }
</script>