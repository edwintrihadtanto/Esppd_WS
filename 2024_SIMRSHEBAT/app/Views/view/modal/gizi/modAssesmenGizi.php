<?php
$data = json_decode($_GET['data']);
$no_rm  = str_replace('"', '', json_encode($data->no_rm));
$nmpasien  = str_replace('"', '', json_encode($data->nmpasien));
$alamat  = str_replace('"', '', json_encode($data->alamatPasienGizi));
$umur  = str_replace('"', '', json_encode($data->umurPasienGizi));
$penjamin  = str_replace('"', '', json_encode($data->penjaminPasienGizi));
$sep  = str_replace('"', '', json_encode($data->sepPasienGizi));
$telp  = str_replace('"', '', json_encode($data->telpPasienGizi));
$id_unit  = str_replace('"', '', json_encode($data->idunitPasienGizi));
$unit  = str_replace('"', '', json_encode($data->unitPasienGizi));
$tglkunj  = str_replace('"', '', json_encode($data->tglkunj));
$transaksi  = str_replace('"', '', json_encode($data->transaksi));
$jenkel  = str_replace('"', '', json_encode($data->jenkel));
$id_dokter  = str_replace('"', '', json_encode($data->id_dokter));
$nama_dokter  = str_replace('"', '', json_encode($data->dokterPasienGizi));
$id_kunj  = str_replace('"', '', json_encode($data->id_kunj));
$status_assesmen  = str_replace('"', '', json_encode($data->status_assesmen));
$skrining_perawat  = str_replace('"', '', json_encode($data->skrining_perawat));
$skrining_ahli_gizi  = str_replace('"', '', json_encode($data->skrining_ahli_gizi));
$kondisi_khusus  = str_replace('"', '', json_encode($data->kondisi_khusus));
$diet_awal  = str_replace('"', '', json_encode($data->diet_awal));
$tindak_lanjut  = str_replace('"', '', json_encode($data->tindak_lanjut));
$ahli_gizi  = str_replace('"', '', json_encode($data->ahli_gizi));
$jenis_pasien  = str_replace('"', '', json_encode($data->jenis_pasien));
$tgl_assesmen  = str_replace('"', '', json_encode($data->tgl_assesmen));
?>
<section class="content pb-0">
    <div class="container-fluid h-100">
        <div class="overlay-wrapper" id="loadingModalassGizi">
            <div class="overlay dark">
                <i class="fas fa-3x fa-sync-alt fa-spin"></i>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6 col-12 p-1">
                <div class="info-box mb-0">
                    <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td rowspan="4" width="100" id="imgTitleL2"><img width="80" src="<?= base_url('_assets/dist/img/man.png') ?>" alt=""></td>
                            <td rowspan="4" width="100" id="imgTitleP2"><img width="80" src="<?= base_url('_assets/dist/img/woman.png') ?>" alt=""></td>
                            <td width="70">Tgl. kunj</td>
                            <td>:</td>
                            <td>
                                <input class="form-control form-control-xs" id="assesmenGizi_vi_tglkunj" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>Tgl. Assmn</td>
                            <td>:</td>
                            <td><input type="date" class="form-control form-control-xs" id="assesmenGizi_tglAcc"></td>
                        </tr>
                        <tr>
                            <td>No. RM</td>
                            <td>:</td>
                            <td><input type="text" class="form-control form-control-xs" id="assesmenGizi_vi_norm" readonly></td>
                        </tr>
                        <tr>
                            <td>Nama Pasien</td>
                            <td>:</td>
                            <td><input type="text" class="form-control form-control-xs" id="assesmenGizi_vi_nama" readonly></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class=" col-md-4 col-sm-6 col-12 p-1">
                <div class="info-box mb-0">
                    <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td>Jenis kel</td>
                            <td>:</td>
                            <td><input type="text" class="form-control form-control-xs" id="assesmenGizi_jenkel" readonly></td>
                        </tr>
                        <tr>
                            <td>Usia</td>
                            <td>:</td>
                            <td><input type="text" class="form-control form-control-xs" id="assesmenGizi_usia" readonly></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td><input type="text" class="form-control form-control-xs" id="assesmenGizi_alamat" readonly></td>
                        </tr>
                        <tr>
                            <td>No. Telp</td>
                            <td>:</td>
                            <td><input type="text" class="form-control form-control-xs" id="assesmenGizi_tlp" readonly></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-12 p-1">
                <div class="info-box mb-0">
                    <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="100">Unit</td>
                            <td>:</td>
                            <td>
                                <input class="form-control form-control-xs" id="modassesmenGizi_unit" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td width="100">Penjamin</td>
                            <td>:</td>
                            <td>
                                <input class="form-control form-control-xs" id="assesmenGizi_penjamin" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td width="100">SEP</td>
                            <td>:</td>
                            <td>
                                <input class="form-control form-control-xs" id="assesmenGizi_sep" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td width="100">Dokter</td>
                            <td>:</td>
                            <td><input type="text" class="form-control form-control-xs" id="assesmenGizi_dokter" readonly>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="card card-row mt-2">
            <div class="overlay-wrapper" id="loading_modal_AssesmenGizi">
                <div class="overlay">
                    <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                </div>
            </div>
            <div class="card-header p-1 darkgrey-custom">
                <button type="button" class="btn bg-gradient-info btn-xs" id="simpanAproveassesmen" onclick="simpanAssesmenGizi()"><i class="fa fa-save"></i> Aprove</button>
                <!-- <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="assesmenGizi_riwayatpenyakit()"><i class="fas fa-notes-medical"></i> Riwayat Penyakit</button> -->
                <button type="button" class="btn btn-outline-danger btn-xs" onclick="assesmenGizi_kembalikeawal()"><i class="fa fa-arrow-left"></i> Kembali</button>
            </div>
            <div class="modal-body p-1">
                <h4 class="text-center">ASESMEN GIZI</h4>
                <div class="card1">
                    <div class="card-body">
                        <div class="row mt-1">
                            <div class="col-md-3">
                                <label>Jenis Pasien</label>
                                <select class="form-control form-control-xs" id="assesmenGizi_JenisPasien">
                                    <option value="1">Anak-anak</option>
                                    <option value="2">Balita</option>
                                    <option value="3">Dewasa</option>
                                    <option value="4">Lansia</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label>Ahli Gizi</label>
                                <select class="form-control form-control-xs" id="assesmenGizi_petugas">
                                </select>
                            </div>
                            <div class="col-md-2">
                                <br>
                                <button class="btn bg-gradient-warning btn-sm " onclick="randomPetugasAss()" title="Default PJ"><i class="fas fa-undo-alt"></i></button>
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label>1.Risiko Malnutrisi Berdasarkan Hasil Skrining Oleh Perawat, Kondisi Pasien Termasuk Kategori:</label>
                                </div>
                                <div class="row" id="assesmenGiziperawat">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="skrining_perawat" value="0" type="radio" class="custom-control-input" id="assesmen_cek1">
                                                <label class="custom-control-label" for="assesmen_cek1">Ringan(Nilai skor 0)</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="skrining_perawat" value="1" type="radio" class="custom-control-input" id="assesmen_cek2">
                                                <label class="custom-control-label" for="assesmen_cek2">Sedang(Nilai skor 1)</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="skrining_perawat" value="2" type="radio" class="custom-control-input" id="assesmen_cek3">
                                                <label class="custom-control-label" for="assesmen_cek3">Tinggi(Nilai skor ≥ 2)</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label>5.Preskripsi Diet Awal:</label>
                                </div>
                                <div class="row" id="assesmenGiziDietawal">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="diet_awal" value="0" type="radio" class="custom-control-input" id="assesmen_cek4">
                                                <label class="custom-control-label" for="assesmen_cek4">Makanan Umum</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="diet_awal" value="1" type="radio" class="custom-control-input" id="assesmen_cek5">
                                                <label class="custom-control-label" for="assesmen_cek5">Makanan Khusus</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label>2.Verifikasi Skrining Oleh Ahli Gizi, Kondisi Pasien Termasuk Kategori:</label>
                                </div>
                                <div class="row" id="assesmenGiziahligizi">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="skrining_ahligizi" value="0" type="radio" class="custom-control-input" id="assesmen_cek6">
                                                <label class="custom-control-label" for="assesmen_cek6">Ringan(Nilai skor 0)</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="skrining_ahligizi" value="1" type="radio" class="custom-control-input" id="assesmen_cek7">
                                                <label class="custom-control-label" for="assesmen_cek7">Sedang(Nilai skor 1)</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="skrining_ahligizi" value="2" type="radio" class="custom-control-input" id="assesmen_cek8">
                                                <label class="custom-control-label" for="assesmen_cek8">Tinggi(Nilai skor ≥ 2)</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label>6.Tindak Lanjut</label>
                                </div>
                                <div class="row" id="assesmenGiziTindaklanjut">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="tindak_lanjut" value="0" type="radio" class="custom-control-input" id="assesmen_cek9">
                                                <label class="custom-control-label" for="assesmen_cek9">Belum Perlu Asuhan Gizi</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="tindak_lanjut" value="1" type="radio" class="custom-control-input" id="assesmen_cek10">
                                                <label class="custom-control-label" for="assesmen_cek10">Perlu Asuhan Gizi</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label>3.Pasien Mempunyai Kondisi Khusus:</label>
                                </div>
                                <div class="row" id="assesmenGiziKondisi">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="kondisi_khusus" value="0" type="radio" class="custom-control-input" id="assesmen_cek11">
                                                <label class="custom-control-label" for="assesmen_cek11">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="kondisi_khusus" value="1" type="radio" class="custom-control-input" id="assesmen_cek12">
                                                <label class="custom-control-label" for="assesmen_cek12">Ya</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-8">
                                <div class="row">
                                    <label>4.Alergi Makanan:</label>
                                </div>
                                <div class="row" id="assesmenGiziRiwayatAlergi">
                                    <div class="col-md-8">
                                        <table class="table table-striped table-sm choose" id="tableriwayatAlergi">
                                            <thead>
                                                <tr>
                                                    <th>Jenis</th>
                                                </tr>
                                            </thead>
                                            <tbody id="inputAlergi">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<script type="text/javascript">
    $('.assesmenGizi_content').show();
    $('#loading_modal_AssesmenGizi').hide();

    var no_rm = "<?php echo $no_rm; ?>";
    var nmpasien = "<?php echo $nmpasien; ?>";
    var alamat = "<?php echo $alamat; ?>";
    var umur = "<?php echo $umur; ?>";
    var penjamin = "<?php echo $penjamin; ?>";
    var sep = "<?php echo $sep; ?>";
    var telp = "<?php echo $telp; ?>";
    var unit = "<?php echo $unit; ?>";
    var tglkunj = "<?php echo $tglkunj; ?>";
    var jenkel = "<?php echo $jenkel; ?>";
    var nama_dokter = "<?php echo $nama_dokter; ?>";
    var id_kunj = "<?php echo $id_kunj; ?>";
    var skrining_perawat = "<?php echo $skrining_perawat; ?>";
    var skrining_ahli_gizi = "<?php echo $skrining_ahli_gizi; ?>";
    var kondisi_khusus = "<?php echo $kondisi_khusus; ?>";
    var diet_awal = "<?php echo $diet_awal; ?>";
    var tindak_lanjut = "<?php echo $tindak_lanjut; ?>";
    var ahli_gizi = "<?php echo $ahli_gizi; ?>";
    var jenis_pasien = "<?php echo $jenis_pasien; ?>";
    var tgl_assesmen = "<?php echo $tgl_assesmen; ?>";

    document.getElementById('assesmenGizi_vi_norm').value = no_rm;
    document.getElementById('assesmenGizi_vi_nama').value = nmpasien;
    document.getElementById('assesmenGizi_dokter').value = nama_dokter;
    document.getElementById('assesmenGizi_vi_tglkunj').value = tglkunj;
    document.getElementById('assesmenGizi_alamat').value = alamat;
    document.getElementById('modassesmenGizi_unit').value = unit;
    document.getElementById('assesmenGizi_usia').value = umur;
    document.getElementById('assesmenGizi_tlp').value = telp;
    document.getElementById('assesmenGizi_penjamin').value = penjamin;
    document.getElementById('assesmenGizi_sep').value = sep;
    document.getElementById('assesmenGizi_JenisPasien').value = jenis_pasien;
    document.getElementById('assesmenGizi_tglAcc').value = tgl_assesmen;


    if (jenkel == 't') {
        document.getElementById('assesmenGizi_jenkel').value = 'Laki-laki';
    } else {
        document.getElementById('assesmenGizi_jenkel').value = 'Perempuan';
    }

    if (skrining_perawat == 0) {
        document.getElementById('assesmen_cek1').checked = true;
    }
    if (skrining_perawat == 1) {
        document.getElementById('assesmen_cek2').checked = true;
    }
    if (skrining_perawat == 2) {
        document.getElementById('assesmen_cek3').checked = true;
    }
    if (skrining_ahli_gizi == 0) {
        document.getElementById('assesmen_cek6').checked = true;
    }
    if (skrining_ahli_gizi == 1) {
        document.getElementById('assesmen_cek7').checked = true;
    }
    if (skrining_ahli_gizi == 2) {
        document.getElementById('assesmen_cek8').checked = true;
    }
    if (kondisi_khusus == 0) {
        document.getElementById('assesmen_cek11').checked = true;
    }
    if (kondisi_khusus == 1) {
        document.getElementById('assesmen_cek12').checked = true;
    }
    if (diet_awal == 0) {
        document.getElementById('assesmen_cek4').checked = true;
    }
    if (diet_awal == 1) {
        document.getElementById('assesmen_cek5').checked = true;
    }
    if (tindak_lanjut == 0) {
        document.getElementById('assesmen_cek9').checked = true;
    }
    if (tindak_lanjut == 1) {
        document.getElementById('assesmen_cek10').checked = true;
    }
    var assesmenGizi_tglPermintaan = "assesmenGizi_tglPermintaan";

    function assesmenGizi_kembalikeawal() {
        var petugasGiziAssesmen = document.getElementById("assesmenGizi_petugas").value;
        if (petugasGiziAssesmen == '') {
            pertanyaan.fire({
                title: 'Kembali ke menu awal',
                html: '<span>Data Pengiriman Gizi Belum diSimpan, Data yang sudah dientry akan hilang, tetap kembali ?</span>',
                icon: 'question',
                showCancelButton: true,
                reverseButtons: false,
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    keluarAssesmenGizi();
                } else if (result.dismiss === Swal.DismissReason.cancel) {

                }
            })
        } else {
            keluarAssesmenGizi();
        }
    }

    // assesmenGiziPetugas();

    // function assesmenGiziPetugas() {
    //     var param = {
    //         id_kunj: id_kunj
    //     }
    //     apiPOST('Gizi/ahligizi', param, hasil => {
    //         var data = hasil['data'];
    //         if (hasil !== null) {
    //             ahligizi = hasil['data'];
    //             var opsi = document.getElementById('assesmenGizi_petugas');
    //             ahligizi.forEach(baru => {
    //                 var option = document.createElement('option');
    //                 option.value = baru['id_pegawai'];
    //                 option.innerHTML = baru['nama_pegawai'];
    //                 opsi.appendChild(option);
    //             });
    //         } else {
    //             // assesmenGiziPetugas1()
    //         }
    //     })
    // }

    assesmenGiziPetugas();

    function assesmenGiziPetugas() {
        apiPOST('Gizi/petugas', null, hasil => {
            var data = hasil['data'];
            var opsi = document.getElementById('assesmenGizi_petugas');
            data.forEach(baru => {
                var option = document.createElement('option');
                option.value = baru['id_pegawai'];
                option.innerHTML = baru['nama_pegawai'];
                opsi.appendChild(option);
            });
            document.getElementById('assesmenGizi_petugas').value = ahli_gizi;

        });
    }


    tableriwayatAlergi();

    function tableriwayatAlergi() {

        $('#tableriwayatAlergi tbody').html('');

        param = {
            no_rm: no_rm
        };
        apiPOST('Gizi/getriwayatAlergi', param, hasil => {
            if (hasil['code'] == 'XX') {
                toastr.error("Alergi tidak ditemukan");
                var baris = "";
                baris += '<input type="text" id="assesmen_alergi" class="form-control form-control-xs" value="Tidak ada">';
            } else {
                var a = hasil['data'];
                var baris = '';
                for (var i = 0; i < a.length; i++) {
                    var alergi = a[i].alergi;
                    baris += '<tr>';
                    baris += '<td><input type="text" id="assesmen_alergi" class="form-control form-control-xs" value="' + alergi + '" disabled></td>';
                    baris += '</tr>';
                }

            }
            $("#tableriwayatAlergi tbody").append(baris);
        });
    }

    function refreshdataassGizi() {
        $('#loadingModalassGizi').hide();
    }
    setTimeout(refreshdataassGizi, 1000);

    imgTitle();

    function imgTitle() {
        if (jenkel == 't') {
            $('#imgTitleL2').show();
            $('#imgTitleP2').hide();
        } else {
            $('#imgTitleL2').hide();
            $('#imgTitleP2').show();
        }
    }

    function randomPetugasAss() {
        var select = document.getElementById('assesmenGizi_petugas');
        var items = select.getElementsByTagName('option');
        var index = Math.floor(Math.random() * items.length);
        select.selectedIndex = index;
    }

    function keluarAssesmenGizi() {
        $('.assesmenGizi_content').hide();
        $('#assesmenGizilist2').show();
        $('#assesmenGizilist1').show();
        assesmenGizidaftarorder();
    }

    function simpanAssesmenGizi() {

        var param = {
            id_kunjungan: id_kunj,
            id_pegawai: document.getElementById('assesmenGizi_petugas').value,
            tgl_assesmen: document.getElementById('assesmenGizi_tglAcc').value,
            jenis_pasien: document.getElementById('assesmenGizi_JenisPasien').value,
            alergi: document.getElementById('assesmen_alergi').value,
            skrining_perawat: document.querySelector('input[name="skrining_perawat"]:checked').value,
            skrining_ahli_gizi: document.querySelector('input[name="skrining_ahligizi"]:checked').value,
            kondisi_khusus: document.querySelector('input[name="kondisi_khusus"]:checked').value,
            diet_awal: document.querySelector('input[name="diet_awal"]:checked').value,
            tindak_lanjut: document.querySelector('input[name="tindak_lanjut"]:checked').value
        }
        console.log(param)

        apiPOST('Gizi/simpanassesmenGizi', param, hasil => {
            if (hasil !== null) {
                if (hasil['code'] == '200') {
                    hasil['pesan'] == 'Berhasil Simpan Assesmen';
                } else if (hasil['code'] == '500') {
                    hasil['pesan'] == 'Gagal';
                }
            }
        });
    }
</script>