<?php
$data = json_decode($_GET['data']);
$no_rm  = str_replace('"', '', json_encode($data->no_rm));
$nmpasien  = str_replace('"', '', json_encode($data->nmpasien));
$umur  = str_replace('"', '', json_encode($data->umurPasienGizi));
$id_unit  = str_replace('"', '', json_encode($data->idunitPasienGizi));
$tglkunj  = str_replace('"', '', json_encode($data->tglkunj));
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
$unit  = str_replace('"', '', json_encode($data->unitPasienGizi));
$id_ruang  = str_replace('"', '', json_encode($data->id_ruang));
$id_kamar  = str_replace('"', '', json_encode($data->id_kamar));
$nama_ruang  = str_replace('"', '', json_encode($data->nama_ruang));
$nama_kamar  = str_replace('"', '', json_encode($data->nama_kamar));
?>
<section class="content modal fade" id="modalPermintaanGiziInput">
    <div class="container-fluid h-100">
        <div class="modal-dialog modal-xl" style="min-width: 100%;">
            <div class="modal-content" style="overflow: auto;">
                <div class="overlay-wrapper" id="loadingModalPermintaanGizi">
                    <div class="overlay dark">
                        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-12 p-1">
                        <div class="info-box mb-0">
                            <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td rowspan="4" width="100" id="imgTitleL"><img width="80" src="<?= base_url('_assets/dist/img/man.png') ?>" alt=""></td>
                                    <td rowspan="4" width="100" id="imgTitleP"><img width="80" src="<?= base_url('_assets/dist/img/woman.png') ?>" alt=""></td>
                                    <td width="70">No. RM</td>
                                    <td>:</td>
                                    <td><input type="text" name="no_rm" class="form-control form-control-xs" id="permintaanGizi_vi_norm" readonly></td>
                                </tr>
                                <tr>
                                    <td>Usia</td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control form-control-xs" id="permintaanGizi_usia" readonly></td>
                                </tr>
                                <tr>
                                    <td>Nama Pasien</td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control form-control-xs" id="permintaanGizi_vi_nama" readonly></td>
                                </tr>
                                <tr>
                                    <td width="100">Dokter</td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control form-control-xs" id="permintaanGizi_dokter" readonly>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-12 p-1">
                        <div class="info-box mb-0">
                            <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="100">Jenis Makanan</td>
                                    <td>:</td>
                                    <td>
                                        <select class="form-control form-control-xs" style="cursor: pointer;" name="kd_makanan" id="pengirimanGizi_jnsmakanan">
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="100">Qty</td>
                                    <td>:</td>
                                    <td>
                                        <input type="number" class="form-control form-control-xs" style="cursor: pointer;" name="qty" id="pengirimanGizi_qty" placeholder="Qty">
                                    </td>
                                </tr>
                                <tr>
                                    <td width="100">Mulai Makan</td>
                                    <td>:</td>
                                    <td>
                                        <input type="date" class="form-control form-control-xs" name="mulai_makan" name="mulai_makan" id="permintaanGizi_mulaimakan">
                                    </td>
                                </tr>
                                <tr>
                                    <td width="100">Perawat/Bidan</td>
                                    <td>:</td>
                                    <td>
                                        <select class="form-control form-control-xs" name="id_pegawai" id="permintaanGizi_petugas">
                                        </select>
                                    </td>
                                    <td>
                                        <button class="btn bg-gradient-warning btn-xs" onclick="randomPetugas()" title="Default PJ"><i class="fas fa-undo-alt"></i></button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class=" col-md-4 col-sm-6 col-12 p-1">
                        <div class="info-box mb-0">
                            <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="100">Tgl Permintaan</td>
                                    <td>:</td>
                                    <td><input type="date" class="form-control form-control-xs" name="tglorder" id="permintaanGizi_tglMinta"></td>
                                </tr>
                                <tr>
                                    <td>Jam</td>
                                    <td>:</td>
                                    <td><input type="time" class="form-control form-control-xs" name="jam_order" id="permintaanGizi_jamMinta"></td>
                                </tr>
                                <tr>
                                    <td>Kamar</td>
                                    <td>:</td>
                                    <td>
                                        <input type="hidden" id="kamarPermintaanGiziID">
                                        <input type="text" class="form-control form-control-xs" id="kamarPermintaanGizi" readonly>
                                    </td>
                                    <td>
                                        <button class="btn bg-gradient-info btn-xs" onclick="showRuangInap()"><i class="fas fa-bed"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>No. bed</td>
                                    <td>:</td>
                                    <td>
                                        <input type="hidden" id="permintaanGiziNobedID">
                                        <input class="form-control form-control-xs" id="permintaanGiziNobed" readonly></input>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="info-box">
                        <div class="col-md-2">
                            <label for="idOrderPermintaanGizi">Id Order</label>
                            <div class="input-group">
                                <input ype="text" class="form-control form-control-sm" id="idOrderPermintaanGizi" disabled>
                                <span class="input-group-append">
                                    <button class="btn bg-gradient-danger btn-xs" onclick="hapusIdOrder()"><i class="fas fa-trash"></i></button>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="permintaanGizi_statusmakanan">Status Makanan</label>
                            <select class="form-control form-control-sm" name="status_makanan" id="permintaanGizi_statusmakanan">
                                <option value="1">Baru</option>
                                <option value="2">Pindah ke</option>
                                <option value="3">Pulang</option>
                                <option value="4">Perubahan DIIT</option>
                                <option value="5">Puasa</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="permintaanGizi_ket">Diagnosis Medis</label>
                            <textarea class="form-control" name="ket" id="permintaanGizi_ket"></textarea>
                        </div>
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-2">
                            <h6 class="text-center text-bold">Perawat Penanggung Jawab</h6>
                            <input class="form-control form-control-xs text-center" name="id_pegawai" id="" disabled>
                            <h6 class="text-center">Nama & Tanda tangan</h6>
                        </div>
                    </div>
                </div>
                <div class="card card-row mt-2">
                    <div class="overlay-wrapper" id="loading_modal_PermintaanGizi">
                        <div class="overlay">
                            <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                        </div>
                    </div>
                    <div class="card-header p-1 darkgrey-custom">
                        <button type="button" class="btn bg-gradient-info btn-xs" id="buttonSimpanPesanan" onclick="savePermintanGizi()"><i class="fa fa-save"></i> Simpan</button>
                        <button type="button" class="btn bg-gradient-success btn-xs" onclick="kirimOrderGizi()"><i class="fas fa-paper-plane"></i> Kirim Order</button>
                        <button type="button" class="btn btn-outline-danger btn-xs" onclick="permintaanGizi_kembalikeawal()"><i class="fa fa-arrow-left"></i> Kembali</button>
                    </div>
                    <div class="modal-body p-1">
                        <div class="card1">
                            <div class="card-body">
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
                                                            <div class="col-md-10">
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                                <input name="jenis_diet" value="1" type="checkbox" class="custom-control-input" id="jenis_diet_input1">
                                                                                <label class="custom-control-label" for="jenis_diet_input1">Diet Normal</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                                <input name="jenis_diet" value="2" type="checkbox" class="custom-control-input" id="jenis_diet_input2">
                                                                                <label class="custom-control-label" for="jenis_diet_input2"> Diet Jantung</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                                <input name="jenis_diet" value="3" type="checkbox" class="custom-control-input" id="jenis_diet_input3">
                                                                                <label class="custom-control-label" for="jenis_diet_input3">Diet Lambung</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                                <input name="jenis_diet" value="4" type="checkbox" class="custom-control-input" id="jenis_diet_input4">
                                                                                <label class="custom-control-label" for="jenis_diet_input4">Diet Hati</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                                <input name="jenis_diet" value="5" type="checkbox" class="custom-control-input" id="jenis_diet_input5">
                                                                                <label class="custom-control-label" for="jenis_diet_input5">Rendah Protein</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                                <input name="jenis_diet" value="6" type="checkbox" class="custom-control-input" id="jenis_diet_input6">
                                                                                <label class="custom-control-label" for="jenis_diet_input6">Rendah Kalori</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                                <input name="jenis_diet" value="7" type="checkbox" class="custom-control-input" id="jenis_diet_input7">
                                                                                <label class="custom-control-label" for="jenis_diet_input7">Rendah Gula</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                                <input name="jenis_diet" value="8" type="checkbox" class="custom-control-input" id="jenis_diet_input8">
                                                                                <label class="custom-control-label" for="jenis_diet_input8">Rendah Garam</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                                <input name="jenis_diet" value="9" type="checkbox" class="custom-control-input" id="jenis_diet_input9">
                                                                                <label class="custom-control-label" for="jenis_diet_input9">Rendah Serat</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                                <input name="jenis_diet" value="10" type="checkbox" class="custom-control-input" id="jenis_diet_input10">
                                                                                <label class="custom-control-label" for="jenis_diet_input10">Diet DM</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                                <input name="jenis_diet" value="11" type="checkbox" class="custom-control-input" id="jenis_diet_input11">
                                                                                <label class="custom-control-label" for="jenis_diet_input11">Diet TKTP</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                                <input name="jenis_diet" value="12" type="checkbox" class="custom-control-input" id="jenis_diet_input12">
                                                                                <label class="custom-control-label" for="jenis_diet_input12">Diet F75</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                                <input name="jenis_diet" value="13" type="checkbox" class="custom-control-input" id="jenis_diet_input13">
                                                                                <label class="custom-control-label" for="jenis_diet_input13">Rendah Lemak</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                                <input onclick="tampilkanKeterangan();" name="jenis_diet" value="14" type="checkbox" class="custom-control-input" id="jenis_diet_input14">
                                                                                <label class="custom-control-label" for="jenis_diet_input14">Lain-Lain</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12" id="keteranganLainlain" style="display:none;">
                                                                            <div class="form-group">
                                                                                <input type="text" name="ket_lain_lain" id="keteranganLain" class="form-control form-control-sm">
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
        </div>
    </div>
</section>

<div class="content modal fade" id="modalRuangInapGizi">
    <div class="container-fluid ">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="overflow: auto;">
                <div class="modal-body p-1">
                    <div class="row">
                        <div class="col-sm-11 input-group">
                            <h4>Data Tempat Tidur</h4>
                        </div>
                        <div class="col-sm-1">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    </div>
                    <div class="p-1">
                        <table id="TableruangInapGizi" class="table table-striped table-sm choose tableData">
                            <thead>
                                <tr>
                                    <th width="40px">Act</th>
                                    <th width="40px">No</th>
                                    <th width="40px">ID</th>
                                    <th>Ruangan</th>
                                    <th>Kamar</th>
                                    <th>Kelas</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('.pengirimanGizi_content').show();
    $('#loading_modal_PermintaanGizi').hide();
    var no_rm = "<?php echo $no_rm; ?>";
    var nmpasien = "<?php echo $nmpasien; ?>";
    var umur = "<?php echo $umur; ?>";
    var tglkunj = "<?php echo $tglkunj; ?>";
    var jenkel = "<?php echo $jenkel; ?>";
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
    var unit = "<?php echo $unit; ?>";
    var nama_ruang = "<?php echo $nama_ruang; ?>";
    var nama_kamar = "<?php echo $nama_kamar; ?>";
    var id_ruang = "<?php echo $id_ruang; ?>";
    var id_kamar = "<?php echo $id_kamar; ?>";

    document.getElementById('permintaanGizi_vi_norm').value = no_rm;
    document.getElementById('permintaanGizi_vi_nama').value = nmpasien;
    document.getElementById('permintaanGizi_usia').value = umur;
    document.getElementById('permintaanGizi_dokter').value = dokter;
    document.getElementById('permintaanGizi_tglMinta').value = tglordermakan;
    document.getElementById('permintaanGizi_mulaimakan').value = mulaimakan;
    document.getElementById('idOrderPermintaanGizi').value = id_order;
    document.getElementById('pengirimanGizi_qty').value = qty;
    document.getElementById('permintaanGizi_jamMinta').value = jam_order;
    document.getElementById('permintaanGizi_statusmakanan').value = status_makanan;
    document.getElementById('permintaanGizi_ket').value = keterangan;
    document.getElementById('kamarPermintaanGizi').value = nama_ruang;
    document.getElementById('permintaanGiziNobed').value = nama_kamar;
    document.getElementById('kamarPermintaanGiziID').value = id_ruang;
    document.getElementById('permintaanGiziNobedID').value = id_kamar;

    var permintaanGizi_tglMinta = "permintaanGizi_tglMinta";
    max_date(permintaanGizi_tglMinta);
    $(document).ready(function() {
        ShowModal();
    });

    function ShowModal() {
        //$('#modal_erm_eresepRWJ').modal('show');  
        $("#modalPermintaanGiziInput").modal({
            backdrop: "static"
        });
        $('#modalPermintaanGiziInput').on('shown.bs.modal', function() {});
    }

    function permintaanGizi_kembalikeawal() {
        var idOrder = document.getElementById("idOrderPermintaanGizi").value;
        if (idOrder == '') {
            pertanyaan.fire({
                title: 'Kembali ke menu awal',
                html: '<span>Data Pengiriman Gizi Belum diSimpan, Data yang sudah dientry akan hilang, tetap kembali ?</span>',
                icon: 'question',
                showCancelButton: true,
                reverseButtons: false,
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    keluarPermintaanGizi();
                } else if (result.dismiss === Swal.DismissReason.cancel) {

                }
            })
        } else {
            keluarPermintaanGizi();
        }
    }

    permintaanGiziJenisMakanan();

    function permintaanGiziJenisMakanan() {
        apiPOST('Gizi/jenis_makanan', null, hasil => {
            var data = hasil['data'];
            var opsi = document.getElementById('pengirimanGizi_jnsmakanan');
            data.forEach(baru => {
                var option = document.createElement('option');
                option.value = baru['kd_makanan'];
                option.innerHTML = baru['jenis_makanan'];
                opsi.appendChild(option);
            });
            document.getElementById('pengirimanGizi_jnsmakanan').value = kd_makanan;
        });
    }
    permintaanGiziPetugas();

    function permintaanGiziPetugas() {
        apiPOST('Gizi/petugas', null, hasil => {
            var data = hasil['data'];
            var opsi = document.getElementById('permintaanGizi_petugas');
            data.forEach(baru => {
                var option = document.createElement('option');
                option.value = baru['id_pegawai'];
                option.innerHTML = baru['nama_pegawai'];
                opsi.appendChild(option);
            });
            document.getElementById('permintaanGizi_petugas').value = petugas_gizi;
        });
    }

    imgTitle();

    function imgTitle() {
        if (jenkel == 't') {
            $('#imgTitleL').show();
            $('#imgTitleP').hide();
        } else {
            $('#imgTitleL').hide();
            $('#imgTitleP').show();
        }
    }

    function refreshdataGizi() {
        $('#loadingModalPermintaanGizi').hide();
    }
    setTimeout(refreshdataGizi, 800);

    function keluarPermintaanGizi() {
        $('#pengirimanGizilist1').show();
        $('#permintaanGizilist2').show();
        $('#modalPermintaanGiziInput').modal('hide');
        $('.modal-backdrop').hide();
        sessionStorage.clear();
        permintaanGizidaftarorder();
    }

    function tampilkanKeterangan() {
        if ($('#jenis_diet_input14').is(":checked"))
            $("#keteranganLainlain").show();
        else
            $("#keteranganLainlain").hide();
    }

    // random petugas
    function randomPetugas() {
        var select = document.getElementById('permintaanGizi_petugas');
        var items = select.getElementsByTagName('option');
        var index = Math.floor(Math.random() * items.length);
        select.selectedIndex = index;
    }

    function showRuangInap() {
        $("#modalRuangInapGizi").modal({
            backdrop: "static"
        });
        $('#modalRuangInapGizi').on('shown.bs.modal', function() {});
        apiPOST('Gizi/ruangInap', null, hasil => {
            $('#TableruangInapGizi tbody').html('');

            var baris = '';
            var a = hasil['data'];
            var no = 1;
            for (var i = 0; i < a.length; i++) {
                var id_ruang = a[i].id_ruang;
                var id_kamar = a[i].id_kamar;
                var nama_ruang = a[i].nama_ruang;
                var nama_kamar = a[i].nama_kamar;
                var nama_unit = a[i].nama_unit;
                baris += '<tr>';
                baris += '<td>' + '<button type="button" onclick="addRuangInapGizi(' + "'" + id_ruang + "','" + id_kamar + "','" + nama_ruang + "','" + nama_kamar + "'" + ');" class="btn bg-warning btn-xs"><i class="fas fa-arrow-circle-left"></i></button>' + '</td>';
                baris += '<td>' + no++ + '</td>';
                baris += '<td>' + id_ruang + '</td>';
                baris += '<td>' + nama_ruang + '</td>';
                baris += '<td>' + nama_kamar + '</td>';
                baris += '<td>' + nama_unit + '</td>';
                baris += '</tr>';
            }
            $('#TableruangInapGizi tbody').append(baris);
            $('.tableData').dataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "bDestroy": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        })
    }

    function addRuangInapGizi(id_ruang, id_kamar, nama_ruang, nama_kamar) {
        var data = {
            id_ruang,
            id_kamar,
            nama_ruang,
            nama_kamar,
        };
        for (i = 0; i < data.length; i++) {
            id_ruang = a[i].id_ruang;
            id_kamar = a[i].id_kamar;
            nama_ruang = a[i].nama_ruang;
            nama_kamar = a[i].nama_kamar;
        }
        // console.log(data)
        document.getElementById('kamarPermintaanGizi').value = nama_ruang;
        document.getElementById('permintaanGiziNobed').value = nama_kamar;
        document.getElementById('kamarPermintaanGiziID').value = id_ruang;
        document.getElementById('permintaanGiziNobedID').value = id_kamar;
        $('#modalRuangInapGizi').modal('hide');
    }


    /* SIMPAN ORDER GIZI */
    function savePermintanGizi() {
        $('#loadingModalPermintaanGizi').show();

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
            id_pegawai: document.getElementById('permintaanGizi_petugas').value,
            qty: document.getElementById('pengirimanGizi_qty').value,
            kd_makanan: document.getElementById('pengirimanGizi_jnsmakanan').value,
            status_makanan: document.getElementById('permintaanGizi_statusmakanan').value,
            mulai_makan: document.getElementById('permintaanGizi_mulaimakan').value,
            ket: document.getElementById('permintaanGizi_ket').value,
            tglorder: document.getElementById('permintaanGizi_tglMinta').value,
            jam_order: document.getElementById('permintaanGizi_jamMinta').value,
            jenis_diet: jenis_diet,
            ket_lain_lain: document.getElementById('keteranganLain').value,
            id_ruang: document.getElementById('kamarPermintaanGiziID').value,
            id_kamar: document.getElementById('permintaanGiziNobedID').value
        }
        console.log(param)
        apiPOST('Gizi/simpanOrderGizi', param, hasil => {
            if (hasil !== null) {
                // document.getElementById('idOrderPermintaanGizi').value = id_order;
                // document.getElementById('buttonSimpanPesanan').disabled = true;
                $('#loadingModalPermintaanGizi').hide();
            } else {
                toastr.error('Gagal Simpan Order!!');
            }
        });
    }

    function kirimOrderGizi() {

        var data = {
            no_rm: no_rm,
            id_kunj: id_kunj,
            nmpasien: nmpasien,
            id_order: id_order,
            'umurPasien': umur.replace(/ /g, '%20'),
            'petugas_gizi': document.getElementById('permintaanGizi_petugas').value,
            'dokterPasienGizi': dokter.replace(/ /g, '%20'),
            'idunitPasienGizi': id_unit,
            'unitPasienGizi': unit.replace(/ /g, '%20')
        }
        // console.log(data)
        var myJSON = JSON.stringify(data);
        $('.penerimaanGizimodalPreview').load('Gizi/modalpermintaangizipreview?data=' + myJSON);
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
                if (tes == 1) {
                    document.getElementById('jenis_diet_input1').checked = true;
                }
                if (tes == 2) {
                    document.getElementById('jenis_diet_input2').checked = true;
                }
                if (tes == 3) {
                    document.getElementById('jenis_diet_input3').checked = true;
                }
                if (tes == 4) {
                    document.getElementById('jenis_diet_input4').checked = true;
                }
                if (tes == 5) {
                    document.getElementById('jenis_diet_input5').checked = true;
                }
                if (tes == 6) {
                    document.getElementById('jenis_diet_input6').checked = true;
                }
                if (tes == 7) {
                    document.getElementById('jenis_diet_input7').checked = true;
                }
                if (tes == 8) {
                    document.getElementById('jenis_diet_input8').checked = true;
                }
                if (tes == 9) {
                    document.getElementById('jenis_diet_input9').checked = true;
                }
                if (tes == 10) {
                    document.getElementById('jenis_diet_input10').checked = true;
                }
                if (tes == 11) {
                    document.getElementById('jenis_diet_input11').checked = true;
                }
                if (tes == 12) {
                    document.getElementById('jenis_diet_input12').checked = true;
                }
                if (tes == 13) {
                    document.getElementById('jenis_diet_input13').checked = true;
                }
                if (tes == 14) {
                    document.getElementById('jenis_diet_input14').checked = true;
                    document.getElementById('keteranganLainlain').style.display = 'block';
                    document.getElementById('keteranganLain').value = ketLain;
                }
            }
        })
    }
</script>