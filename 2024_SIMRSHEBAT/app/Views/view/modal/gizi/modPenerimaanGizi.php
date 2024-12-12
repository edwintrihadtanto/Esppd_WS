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
$dokter  = str_replace('"', '', json_encode($data->dokterPasienGizi));
$id_kunj  = str_replace('"', '', json_encode($data->id_kunj));
$id_order  = str_replace('"', '', json_encode($data->id_order));
$makanan  = str_replace('"', '', json_encode($data->makanan));
$qty  = str_replace('"', '', json_encode($data->qty));
$tglordermakan  = str_replace('"', '', json_encode($data->tglordermakan));
$keterangan  = str_replace('"', '', json_encode($data->keteranganGizi));
$petugas_gizi  = str_replace('"', '', json_encode($data->petugas_gizi));
$mulaimakan  = str_replace('"', '', json_encode($data->mulaimakan));
$dilayani  = str_replace('"', '', json_encode($data->dilayani));
$kd_makanan  = str_replace('"', '', json_encode($data->kd_makanan));
$ketLain  = str_replace('"', '', json_encode($data->ketLain));
$status_makanan  = str_replace('"', '', json_encode($data->status_makanan));
$jam_order  = str_replace('"', '', json_encode($data->jam_order));
$id_ruang  = str_replace('"', '', json_encode($data->id_ruang));
$id_kamar  = str_replace('"', '', json_encode($data->id_kamar));
$nama_ruang  = str_replace('"', '', json_encode($data->nama_ruang));
$nama_kamar  = str_replace('"', '', json_encode($data->nama_kamar));
?>
<section class="content pb-0">
    <div class="container-fluid h-100">
        <div class="overlay-wrapper" id="loadingModalpenerimaanGizi">
            <div class="overlay dark">
                <i class="fas fa-3x fa-sync-alt fa-spin"></i>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6 col-12 p-1">
                <div class="info-box mb-0">
                    <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td rowspan="4" width="100" id="imgTitleL4"><img width="80" src="<?= base_url('_assets/dist/img/man.png') ?>" alt=""></td>
                            <td rowspan="4" width="100" id="imgTitleP4"><img width="80" src="<?= base_url('_assets/dist/img/woman.png') ?>" alt=""></td>
                            <td width="70">Tgl. kunj</td>
                            <td>:</td>
                            <td>
                                <input class="form-control form-control-xs" name="tgl_kunjungan" id="penerimaanGizitglKunj" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>Diterima</td>
                            <td>:</td>
                            <td><input type="date" class="form-control form-control-xs" name="tgl_diterima" id="penerimaanGiziTglterima"></td>
                        </tr>
                        <tr>
                            <td>Tgl. Trans</td>
                            <td>:</td>
                            <td><input type="text" class="form-control form-control-xs" name="tgl_transaksi" id="penerimaanGizitgltrans" readonly></td>
                        </tr>
                        <tr>
                            <td>No. RM</td>
                            <td>:</td>
                            <td><input type="text" name="no_rm" class="form-control form-control-xs" id="penerimaanGizinoRM" readonly></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class=" col-md-4 col-sm-6 col-12 p-1">
                <div class="info-box mb-0">
                    <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td>Nama Pasien</td>
                            <td>:</td>
                            <td><input type="text" class="form-control form-control-xs" id="penerimaanGiziNamaPasien" readonly></td>
                        </tr>
                        <tr>
                            <td>Usia</td>
                            <td>:</td>
                            <td><input type="text" class="form-control form-control-xs" id="penerimaanGiziUsia" readonly></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td><input type="text" class="form-control form-control-xs" id="penerimaanGiziAlamat" readonly></td>
                        </tr>
                        <tr>
                            <td>No. Telp</td>
                            <td>:</td>
                            <td><input type="text" class="form-control form-control-xs" id="penerimaanGiziNotlp" readonly></td>
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
                                <input class="form-control form-control-xs" name="id_unit" id="penerimaanGizimodUnit" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td width="100">Penjamin</td>
                            <td>:</td>
                            <td>
                                <input class="form-control form-control-xs" id="penerimaanGiziPenjamin" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td width="100">SEP</td>
                            <td>:</td>
                            <td>
                                <input class="form-control form-control-xs" id="penerimaanGiziSEP" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td width="100">Dokter</td>
                            <td>:</td>
                            <td><input type="text" class="form-control form-control-xs" id="penerimaanGiziDokter" readonly>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="card card-row mt-2">
            <div class="overlay-wrapper" id="loadingModalPenerimaanGizi2">
                <div class="overlay">
                    <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                </div>
            </div>
            <div class="card-header p-1 darkgrey-custom">
                <button type="button" id="btnSimpanPenerimaanGizi" class="btn bg-gradient-info btn-xs" onclick="savePermintanGizi()"><i class="fa fa-save"></i> Terima</button>
                <!-- <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="penerimaanGiziShowPenyakit()"><i class="fas fa-notes-medical"></i> Riwayat Penyakit</button> -->
                <button type="button" class="btn bg-gradient-success btn-xs" onclick="kirimOrderkeGizi()"><i class="fas fa-arrow-right"></i> Kirim Ke kasir</button>
                <button type="button" class="btn btn-outline-danger btn-xs" onclick="penerimaanGiziKembali()"><i class="fa fa-arrow-left"></i> Kembali</button>
            </div>
            <div class="modal-body p-1">
                <h4 class="text-center">Detail Permintaan Gizi</h4>
                <div class="card1">
                    <div class="card-body">
                        <div class="row mt-1">
                            <div class="col-md-2">
                                <label>ID Order</label>
                                <input type="text" class="form-control form-control-xs" name="id_order" id="penerimaanGiziIDorder" disabled>
                            </div>
                            <div class="col-md-2">
                                <label>Ruangan</label>
                                <input type="text" class="form-control form-control-xs" name="id_ruang" id="penerimaanGiziRuang" disabled>
                            </div>
                            <div class="col-md-2">
                                <label>No.bed</label>
                                <input type="text" class="form-control form-control-xs" name="id_kamar" id="penerimaanGiziNobed" disabled>
                            </div>
                            <div class="col-md-2">
                                <label>Jenis Makanan</label>
                                <select class="form-control form-control-xs" style="cursor: pointer;" name="kd_makanan" id="penerimaanGiziJenisMakanan">
                                </select>
                            </div>
                            <div class="col-md-1">
                                <label>Qty</label>
                                <input type="number" class="form-control form-control-xs" style="cursor: pointer;" name="qty" id="penerimaanGiziQty" placeholder="Qty">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <label>Status Makanan</label>
                                <select class="form-control form-control-xs" style="cursor: pointer;" name="status_makanan" id="penerimaanGiziStatusMakanan">
                                    <option value="1">Baru</option>
                                    <option value="2">Pindah ke</option>
                                    <option value="3">Pulang</option>
                                    <option value="4">Perubahan DIIT</option>
                                    <option value="5">Puasa</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label>Tgl. Order</label>
                                <input type="date" class="form-control form-control-xs" name="tglorder" id="penerimaanGiziTglOrder">
                            </div>
                            <div class="col-md-2">
                                <label>Jam</label>
                                <input type="time" class="form-control form-control-xs" name="jam_order" id="penerimaanGiziJamOrder">
                            </div>
                            <div class="col-md-2">
                                <label>Mulai Makan</label>
                                <input type="date" class="form-control form-control-xs" name="mulai_makan" id="penerimaanGiziMulaimakan">
                            </div>

                            <!-- <div class="col-md-2">
                                <br>
                                <button class="btn bg-gradient-warning btn-sm" onclick="randomPetugasPenerima()" title="Default PJ"><i class="fas fa-undo-alt"></i></button>
                            </div> -->
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <label>Diagnosis Medis</label>
                                <textarea style="height:auto;" class="form-control" name="ket" id="penerimaanGiziKet"></textarea>
                            </div>
                            <div class="col-md-3">

                            </div>
                            <div class="col-md-3">

                            </div>
                            <div class="col-md-3">
                                <h6 class="text-center text-bold">Perawat Penanggung Jawab</h6>
                                <select class="form-control form-control-xs text-center" name="id_pegawai" id="penerimaanGiziPetugasGizi" disabled>
                                </select>
                                <h6 class="text-center">Nama & Tanda tangan</h6>
                            </div>
                        </div>
                        <div class="card card-default mt-2">
                            <div class="card-header darkgrey-custom">
                                <h4 class="card-title" style="color:black;">Jenis DIIT</h4>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row mt-2">
                                    <div class=" col-md-12">
                                        <table class="table1 table-borderless" cellspacing="10">
                                            <tr>
                                                <td>
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                                        <input name="jenis_diet" value="1" type="checkbox" class="custom-control-input" id="jenis_diet1">
                                                                        <label class="custom-control-label" for="jenis_diet1">Diet Normal</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                                        <input name="jenis_diet" value="2" type="checkbox" class="custom-control-input" id="jenis_diet2">
                                                                        <label class="custom-control-label" for="jenis_diet2"> Diet Jantung</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                                        <input name="jenis_diet" value="3" type="checkbox" class="custom-control-input" id="jenis_diet3">
                                                                        <label class="custom-control-label" for="jenis_diet3">Diet Lambung</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                                        <input name="jenis_diet" value="4" type="checkbox" class="custom-control-input" id="jenis_diet4">
                                                                        <label class="custom-control-label" for="jenis_diet4">Diet Hati</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                                        <input name="jenis_diet" value="5" type="checkbox" class="custom-control-input" id="jenis_diet5">
                                                                        <label class="custom-control-label" for="jenis_diet5">Rendah Protein</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                                        <input name="jenis_diet" value="6" type="checkbox" class="custom-control-input" id="jenis_diet6">
                                                                        <label class="custom-control-label" for="jenis_diet6">Rendah Kalori</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                                        <input name="jenis_diet" value="7" type="checkbox" class="custom-control-input" id="jenis_diet7">
                                                                        <label class="custom-control-label" for="jenis_diet7">Rendah Gula</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                                        <input name="jenis_diet" value="8" type="checkbox" class="custom-control-input" id="jenis_diet8">
                                                                        <label class="custom-control-label" for="jenis_diet8">Rendah Garam</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                                        <input name="jenis_diet" value="9" type="checkbox" class="custom-control-input" id="jenis_diet9">
                                                                        <label class="custom-control-label" for="jenis_diet9">Rendah Serat</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                                        <input name="jenis_diet" value="10" type="checkbox" class="custom-control-input" id="jenis_diet10">
                                                                        <label class="custom-control-label" for="jenis_diet10">Diet DM</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                                        <input name="jenis_diet" value="11" type="checkbox" class="custom-control-input" id="jenis_diet11">
                                                                        <label class="custom-control-label" for="jenis_diet11">Diet TKTP</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                                        <input name="jenis_diet" value="12" type="checkbox" class="custom-control-input" id="jenis_diet12">
                                                                        <label class="custom-control-label" for="jenis_diet12">Diet F75</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                                        <input name="jenis_diet" value="13" type="checkbox" class="custom-control-input" id="jenis_diet13">
                                                                        <label class="custom-control-label" for="jenis_diet13">Rendah Lemak</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                                        <input onclick="tampilpenkanKeterangan();" name="jenis_diet" value="14" type="checkbox" class="custom-control-input" id="jenis_diet14">
                                                                        <label class="custom-control-label" for="jenis_diet14">Lain-Lain</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12" id="penketeranganLainlain" style="display:none;">
                                                                    <div class="form-group">
                                                                        <input type="text" name="ket_lain_lain" id="penketeranganLain" class="form-control form-control-sm">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
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
</section>

<script type="text/javascript">
    $('.penerimaanGizimodalcontent').show();
    $('#loadingModalPenerimaanGizi2').hide();
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
    var transaksi = "<?php echo $transaksi; ?>";
    var dokter = "<?php echo $dokter; ?>";
    var id_kunj = "<?php echo $id_kunj; ?>";
    var id_order = "<?php echo $id_order; ?>";
    var id_unit = "<?php echo $id_unit; ?>";
    var makanan = "<?php echo $makanan; ?>";
    var petugas_gizi = "<?php echo $petugas_gizi; ?>";
    var qty = "<?php echo $qty; ?>";
    var tglordermakan = "<?php echo $tglordermakan; ?>";
    var keterangan = "<?php echo $keterangan; ?>";
    var mulaimakan = "<?php echo $mulaimakan; ?>";
    var kd_makanan = "<?php echo $kd_makanan; ?>";
    var ketLain = "<?php echo $ketLain; ?>";
    var status_makanan = "<?php echo $status_makanan; ?>";
    var jam_order = "<?php echo $jam_order; ?>";
    var nama_ruang = "<?php echo $nama_ruang; ?>";
    var nama_kamar = "<?php echo $nama_kamar; ?>";
    var id_ruang = "<?php echo $id_ruang; ?>";
    var id_kamar = "<?php echo $id_kamar; ?>";

    document.getElementById('penerimaanGizinoRM').value = no_rm;
    document.getElementById('penerimaanGiziNamaPasien').value = nmpasien;
    document.getElementById('penerimaanGizitglKunj').value = tglkunj;
    document.getElementById('penerimaanGizitgltrans').value = transaksi;
    document.getElementById('penerimaanGiziAlamat').value = alamat;
    document.getElementById('penerimaanGizimodUnit').value = unit;
    document.getElementById('penerimaanGiziUsia').value = umur;
    document.getElementById('penerimaanGiziNotlp').value = telp;
    document.getElementById('penerimaanGiziPenjamin').value = penjamin;
    document.getElementById('penerimaanGiziSEP').value = sep;
    document.getElementById('penerimaanGiziDokter').value = dokter;
    document.getElementById('penerimaanGiziTglterima').value = nowday;
    document.getElementById('penerimaanGiziQty').value = qty;
    document.getElementById('penerimaanGiziTglOrder').value = tglordermakan;
    document.getElementById('penerimaanGiziKet').value = keterangan;
    document.getElementById('penerimaanGiziIDorder').value = id_order;
    document.getElementById('penerimaanGiziMulaimakan').value = mulaimakan;
    document.getElementById('penerimaanGiziStatusMakanan').value = status_makanan;
    document.getElementById('penerimaanGiziJamOrder').value = jam_order;
    document.getElementById('penerimaanGiziRuang').value = nama_ruang;
    document.getElementById('penerimaanGiziNobed').value = nama_kamar;

    var penerimaanGiziTglterima = "penerimaanGiziTglterima";
    max_date(penerimaanGiziTglterima);

    function penerimaanGiziKembali() {
        var tes = document.getElementById("penerimaanGiziJenisMakanan").value;
        if (tes == '') {
            pertanyaan.fire({
                title: 'Kembali ke menu awal',
                html: '<span>Data Pengiriman Gizi Belum diSimpan, Data yang sudah dientry akan hilang, tetap kembali ?</span>',
                icon: 'question',
                showCancelButton: true,
                reverseButtons: false,
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    keluarPenerimaanGizi();
                } else if (result.dismiss === Swal.DismissReason.cancel) {

                }
            })
        } else {
            keluarPenerimaanGizi();
        }
    }

    function tampilpenkanKeterangan() {
        if ($('#jenis_diet14').is(":checked"))
            $("#penketeranganLainlain").show();
        else
            $("#penketeranganLainlain").hide();
    }

    penerimaanGiziJenisMakanan();

    function penerimaanGiziJenisMakanan() {
        apiPOST('Gizi/jenis_makanan', null, hasil => {
            var data = hasil['data'];
            var opsi = document.getElementById('penerimaanGiziJenisMakanan');
            data.forEach(baru => {
                var option = document.createElement('option');
                option.value = baru['kd_makanan'];
                option.innerHTML = baru['jenis_makanan'];
                opsi.appendChild(option);
            });
            document.getElementById('penerimaanGiziJenisMakanan').value = kd_makanan;
        });
    }
    penerimaanGiziPetugas();

    function penerimaanGiziPetugas() {
        apiPOST('Gizi/petugas', null, hasil => {
            var data = hasil['data'];
            var opsi = document.getElementById('penerimaanGiziPetugasGizi');
            data.forEach(baru => {
                var option = document.createElement('option');
                option.value = baru['id_pegawai'];
                option.innerHTML = baru['nama_pegawai'];
                opsi.appendChild(option);
            });
            document.getElementById('penerimaanGiziPetugasGizi').value = petugas_gizi;
        });
    }

    imgTitle4();

    function imgTitle4() {
        if (jenkel == 't') {
            $('#imgTitleL4').show();
            $('#imgTitleP4').hide();
        } else {
            $('#imgTitleL4').hide();
            $('#imgTitleP4').show();
        }
    }

    function refreshPenerimaanGizi() {
        $('#loadingModalpenerimaanGizi').hide();
    }
    setTimeout(refreshPenerimaanGizi, 800);

    function keluarPenerimaanGizi() {
        $('.penerimaanGizimodalcontent').hide();
        $('#penerimaanGizilist1').show();
        $('#penerimaanGizilist2').show();
        penerimaanGiziDaftarOrder();
    }


    /* SIMPAN ORDER GIZI */
    function savePermintanGizi() {

        let checkboxes = document.querySelectorAll('input[name="jenis_diet"]:checked');
        let values = [];

        checkboxes.forEach((checkbox) => {
            values.push(checkbox.value);
        });
        jenis_diet = values;

        var param = {
            id_kunjungan: id_kunj,
            id_order: id_order,
            id_unit: id_unit,
            id_ruang: id_ruang,
            id_kamar: id_kamar,
            id_pegawai: document.getElementById('penerimaanGiziPetugasGizi').value,
            qty: document.getElementById('penerimaanGiziQty').value,
            kd_makanan: document.getElementById('penerimaanGiziJenisMakanan').value,
            status_makanan: document.getElementById('penerimaanGiziStatusMakanan').value,
            tglorder: document.getElementById('penerimaanGiziTglOrder').value,
            mulai_makan: document.getElementById('penerimaanGiziMulaimakan').value,
            ket: document.getElementById('penerimaanGiziKet').value,
            tgl_diterima: document.getElementById('penerimaanGiziTglterima').value,
            jam_order: document.getElementById('penerimaanGiziJamOrder').value,
            jenis_diet: jenis_diet,
            ket_lain_lain: document.getElementById('penketeranganLain').value,
        }

        console.log(param)
        apiPOST('Gizi/simpanPermintaanGizi', param, hasil => {
            if (hasil !== null) {
                $('#loadingModalpenerimaanGizi').hide();
                if (hasil['code'] == '200') {
                    hasil['pesan'] == 'Berhasil simpan order';
                } else if (hasil['code'] == '500') {
                    toastr.error('Order Makanan Sudah Ada!!');
                } else {
                    toastr.error('Gagal Simpan Order!!');
                }
            }
        });
    }

    function kirimOrderkeGizi() {

    }
    tampilCheckbox();

    function tampilCheckbox() {
        var param = {
            id_order: id_order
        }
        apiPOST('Gizi/cekbox', param, hasil => {
            var data = hasil['data'];
            b = JSON.parse(data);
            let array = [];
            for (i = 0; i < b.length; i++) {
                var tes = b[i]
                // console.log(tes)
                if (tes == 1) {
                    document.getElementById('jenis_diet1').checked = true;
                }
                if (tes == 2) {
                    document.getElementById('jenis_diet2').checked = true;
                }
                if (tes == 3) {
                    document.getElementById('jenis_diet3').checked = true;
                }
                if (tes == 4) {
                    document.getElementById('jenis_diet4').checked = true;
                }
                if (tes == 5) {
                    document.getElementById('jenis_diet5').checked = true;
                }
                if (tes == 6) {
                    document.getElementById('jenis_diet6').checked = true;
                }
                if (tes == 7) {
                    document.getElementById('jenis_diet7').checked = true;
                }
                if (tes == 8) {
                    document.getElementById('jenis_diet8').checked = true;
                }
                if (tes == 9) {
                    document.getElementById('jenis_diet9').checked = true;
                }
                if (tes == 10) {
                    document.getElementById('jenis_diet10').checked = true;
                }
                if (tes == 11) {
                    document.getElementById('jenis_diet11').checked = true;
                }
                if (tes == 12) {
                    document.getElementById('jenis_diet12').checked = true;
                }
                if (tes == 13) {
                    document.getElementById('jenis_diet13').checked = true;
                }
                if (tes == 14) {
                    document.getElementById('jenis_diet14').checked = true;
                    document.getElementById('penketeranganLainlain').style.display = 'block';
                    document.getElementById('penketeranganLain').value = ketLain;
                }
            }
        })
    }
</script>