<?php
$data = json_decode($_GET['data']);
$no_rm  = str_replace('"', '', json_encode($data->no_rm));
$namaPasien  = str_replace('"', '', json_encode($data->namaPasien));
$umur  = str_replace('"', '', json_encode($data->umur));
$id_unit  = str_replace('"', '', json_encode($data->id_unit));
$dokter  = str_replace('"', '', json_encode($data->dokter));
$id_kunj  = str_replace('"', '', json_encode($data->id_kunj));
$id_order  = str_replace('"', '', json_encode($data->id_order));
$id_pegawai  = str_replace('"', '', json_encode($data->id_pegawai));
?>
<section class="content modal fade" id="modalPermintaanGizibaru">
    <div class="container-fluid h-100">
        <div class="modal-dialog modal-xl" style="min-width: 100%;">
            <div class="modal-content" style="overflow: auto;">
                <div class="overlay-wrapper" id="loadingModPermintaanGizibaru">
                    <div class="overlay dark">
                        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-12 p-1">
                        <div class="info-box mb-0">
                            <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="100">No. RM</td>
                                    <td>:</td>
                                    <td><input type="text" name="no_rm" class="form-control form-control-xs" id="modOrderGizibaru_norm" readonly></td>
                                </tr>
                                <tr>
                                    <td>Usia</td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control form-control-xs" id="modOrderGizibaru_usia" readonly></td>
                                </tr>
                                <tr>
                                    <td>Nama Pasien</td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control form-control-xs" id="modOrderGizibaru_nama" readonly></td>
                                </tr>
                                <tr>
                                    <td width="100">Dokter</td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control form-control-xs" id="modOrderGizibarudokter" readonly>
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
                                        <select class="form-control form-control-xs" style="cursor: pointer;" name="kd_makanan" id="modOrderGizibaru_makanan">
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="100">Qty</td>
                                    <td>:</td>
                                    <td>
                                        <input type="number" class="form-control form-control-xs" style="cursor: pointer;" name="qty" id="modOrderGizibaru_qty" placeholder="Qty">
                                    </td>
                                </tr>
                                <tr>
                                    <td width="100">Mulai Makan</td>
                                    <td>:</td>
                                    <td>
                                        <input type="date" class="form-control form-control-xs" name="mulai_makan" name="mulai_makan" id="modOrderGizibaru_mulaimakan">
                                    </td>
                                </tr>
                                <tr>
                                    <td width="100">Perawat/Bidan</td>
                                    <td>:</td>
                                    <td>
                                        <select class="form-control form-control-xs" name="id_pegawai" id="modOrderGizibarupetugas">
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
                                    <td><input type="date" class="form-control form-control-xs" name="tglorder" id="permintaanGizi_tglMintabaru"></td>
                                </tr>
                                <tr>
                                    <td>Jam</td>
                                    <td>:</td>
                                    <td><input type="time" class="form-control form-control-xs" name="jam_order" id="permintaanGizi_jamMintabaru"></td>
                                </tr>
                                <tr>
                                    <td>Kamar</td>
                                    <td>:</td>
                                    <td>
                                        <input type="hidden" id="kamarPermintaanGizibaruID">
                                        <input type="text" class="form-control form-control-xs" id="kamarPermintaanGizibaru" readonly>
                                    </td>
                                    <td>
                                        <button class="btn bg-gradient-info btn-xs" onclick="showRuangInapbaru()"><i class="fas fa-bed"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>No. bed</td>
                                    <td>:</td>
                                    <td>
                                        <input type="hidden" id="permintaanGiziNobedbaruID">
                                        <input class="form-control form-control-xs" id="permintaanGiziNobedbaru" readonly></input>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="info-box">
                        <div class="col-md-2">
                            <label for="modOrderGizibaruId">Id Order</label>
                            <div class="input-group">
                                <input ype="text" class="form-control form-control-sm" id="modOrderGizibaruId" disabled>
                                <span class="input-group-append">
                                    <button class="btn bg-gradient-danger btn-xs" onclick="hapusIdOrder()"><i class="fas fa-trash"></i></button>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="permintaanGizi_statusmakananbaru">Status Makanan</label>
                            <select class="form-control form-control-sm" name="status_makanan" id="permintaanGizi_statusmakananbaru">
                                <option value="1">Baru</option>
                                <option value="2">Pindah ke</option>
                                <option value="3">Pulang</option>
                                <option value="4">Perubahan DIIT</option>
                                <option value="5">Puasa</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="permintaanGizi_ketbaru">Diagnosis Medis</label>
                            <textarea class="form-control" name="ket" id="modOrderGizibaruket"></textarea>
                        </div>
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-2">
                            <h6 class="text-center text-bold">Perawat Penanggung Jawab</h6>
                            <input class="form-control form-control-xs text-center" id="perawatPenanggungjawab" name="id_pegawai" id="" disabled>
                            <h6 class="text-center">Nama & Tanda tangan</h6>
                        </div>
                    </div>
                </div>
                <div class="card card-row mt-2">
                    <div class="overlay-wrapper" id="loading2ModBaru">
                        <div class="overlay">
                            <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                        </div>
                    </div>
                    <div class="card-header p-1 darkgrey-custom">
                        <button type="button" class="btn bg-gradient-info btn-xs" id="tombolSimpanBaru" onclick="simpanBaru()"><i class="fa fa-save"></i> Simpan</button>
                        <button type="button" class="btn bg-gradient-success btn-xs" onclick="kirimKeUnitGizi()"><i class="fas fa-paper-plane"></i> Kirim Order</button>
                        <button type="button" class="btn btn-outline-danger btn-xs" onclick="kembaliKeawalBaru()"><i class="fa fa-arrow-left"></i> Kembali</button>
                    </div>
                    <div class="modal-body p-1">
                        <div class="card1">
                            <div class="card-body">
                                <div class="card card-default mt-2">
                                    <div class="card-header darkgrey-custom">
                                        <h4 class="card-title" style="color:black;">Jenis Diet</h4>
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
                                                                                <input name="jenis_diet" value="1" type="checkbox" class="custom-control-input" id="jenisdiet1baru">
                                                                                <label class="custom-control-label" for="jenisdiet1baru">Diet Normal</label>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                                <input name="jenis_diet" value="2" type="checkbox" class="custom-control-input" id="jenisdiet2baru">
                                                                                <label class="custom-control-label" for="jenisdiet2baru"> Diet Jantung</label>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                                <input name="jenis_diet" value="3" type="checkbox" class="custom-control-input" id="jenisdiet3baru">
                                                                                <label class="custom-control-label" for="jenisdiet3baru">Diet Lambung</label>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                                <input name="jenis_diet" value="4" type="checkbox" class="custom-control-input" id="jenisdiet4baru">
                                                                                <label class="custom-control-label" for="jenisdiet4baru">Diet Hati</label>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                                <input name="jenis_diet" value="5" type="checkbox" class="custom-control-input" id="jenisdiet5baru">
                                                                                <label class="custom-control-label" for="jenisdiet5baru">Rendah Protein</label>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                                <input name="jenis_diet" value="6" type="checkbox" class="custom-control-input" id="jenisdiet6baru">
                                                                                <label class="custom-control-label" for="jenisdiet6baru">Rendah Kalori</label>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                                <input name="jenis_diet" value="7" type="checkbox" class="custom-control-input" id="jenisdiet7baru">
                                                                                <label class="custom-control-label" for="jenisdiet7baru">Rendah Gula</label>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                                <input name="jenis_diet" value="8" type="checkbox" class="custom-control-input" id="jenisdiet8baru">
                                                                                <label class="custom-control-label" for="jenisdiet8baru">Rendah Garam</label>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                                <input name="jenis_diet" value="9" type="checkbox" class="custom-control-input" id="jenisdiet9baru">
                                                                                <label class="custom-control-label" for="jenisdiet9baru">Rendah Serat</label>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                                <input name="jenis_diet" value="10" type="checkbox" class="custom-control-input" id="jenisdiet10baru">
                                                                                <label class="custom-control-label" for="jenisdiet10baru">Diet DM</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                                <input name="jenis_diet" value="11" type="checkbox" class="custom-control-input" id="jenisdiet11baru">
                                                                                <label class="custom-control-label" for="jenisdiet11baru">Diet TKTP</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                                <input name="jenis_diet" value="12" type="checkbox" class="custom-control-input" id="jenisdiet12baru">
                                                                                <label class="custom-control-label" for="jenisdiet12baru">Diet F75</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                                <input name="jenis_diet" value="13" type="checkbox" class="custom-control-input" id="jenisdiet13baru">
                                                                                <label class="custom-control-label" for="jenisdiet13baru">Rendah Lemak</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                                <input onclick="tampilkanKeteranganbaru();" name="jenis_diet" value="14" type="checkbox" class="custom-control-input" id="jenisdiet14baru">
                                                                                <label class="custom-control-label" for="jenisdiet14baru">Lain-Lain</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12" id="keteranganLainlainbaru" style="display:none;">
                                                                            <div class="form-group">
                                                                                <input type="text" name="ket_lain_lain" id="keteranganLainbaru" class="form-control form-control-sm">
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

<div class="content modal fade" id="modalRuangInapGizibaru">
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
                        <table id="TableruangInapGizibaru" class="table table-striped table-sm choose tableData">
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

<script src="<?= base_url('_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js') ?>"></script>
<script type="text/javascript">
    $('.pengirimanGizi_content').show();
    $('#loading2ModBaru').hide();
    var no_rm = "<?php echo $no_rm; ?>";
    var nama = "<?php echo $namaPasien; ?>";
    var umur = "<?php echo $umur; ?>";
    var dokter = "<?php echo $dokter; ?>";
    var id_kunj = "<?php echo $id_kunj; ?>";
    var id_unit = "<?php echo $id_unit; ?>";
    var id_order = "<?php echo $id_order; ?>";
    var id_pegawai = "<?php echo $id_pegawai; ?>";

    document.getElementById('modOrderGizibaru_norm').value = no_rm;
    document.getElementById('modOrderGizibaru_usia').value = umur;
    document.getElementById('modOrderGizibaru_nama').value = nama;
    document.getElementById('modOrderGizibarudokter').value = dokter;
    document.getElementById('permintaanGizi_tglMintabaru').value = nowday;
    document.getElementById('modOrderGizibaru_mulaimakan').value = nowday;
    document.getElementById('modOrderGizibaru_qty').value = '1';

    $(document).ready(function() {
        ShowModal();
    });

    function ShowModal() {
        $("#modalPermintaanGizibaru").modal({
            backdrop: "static"
        });
        $('#modalPermintaanGizibaru').on('shown.bs.modal', function() {});
    }

    function kembaliKeawalBaru() {
        var idOrder = document.getElementById("modOrderGizibaruId").value;
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

    $("#cariByNamaRuangbaru").keydown(function(event) {
        switch (event.which) {
            case 13:
                showRuangInapbaru();
                break;
        }
    });

    $("#showJumlahRuangInapbaru").change(function(event) {
        showRuangInapbaru();
    });

    function showRuangInapbaru() {
        $("#modalRuangInapGizibaru").modal({
            backdrop: "static"
        });
        $('#modalRuangInapGizibaru').on('shown.bs.modal', function() {});
        apiPOST('Gizi/ruangInap', null, hasil => {
            $('#TableruangInapGizibaru tbody').html('');

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
                baris += '<td>' + '<button type="button" onclick="addRuangInapGizibaru(' + "'" + id_ruang + "','" + id_kamar + "','" + nama_ruang + "','" + nama_kamar + "'" + ');" class="btn bg-warning btn-xs"><i class="fas fa-arrow-circle-left"></i></button>' + '</td>';
                baris += '<td>' + no++ + '</td>';
                baris += '<td>' + id_ruang + '</td>';
                baris += '<td>' + nama_ruang + '</td>';
                baris += '<td>' + nama_kamar + '</td>';
                baris += '<td>' + nama_unit + '</td>';
                baris += '</tr>';
            }
            $('#TableruangInapGizibaru tbody').append(baris);
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

    function addRuangInapGizibaru(id_ruang, id_kamar, nama_ruang, nama_kamar) {
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
        document.getElementById('kamarPermintaanGizibaru').value = nama_ruang;
        document.getElementById('permintaanGiziNobedbaru').value = nama_kamar;
        document.getElementById('kamarPermintaanGizibaruID').value = id_ruang;
        document.getElementById('permintaanGiziNobedbaruID').value = id_kamar;
        $('#modalRuangInapGizibaru').modal('hide');
    }

    function tampilkanKeteranganbaru() {
        if ($('#jenisdiet14baru').is(":checked"))
            $("#keteranganLainlainbaru").show();
        else
            $("#keteranganLainlainbaru").hide();
    }

    permintaanGiziJenisMakanan();

    function permintaanGiziJenisMakanan() {
        apiPOST('Gizi/jenis_makanan', null, hasil => {
            var data = hasil['data'];
            var makanan = '';
            for (var i = 0; i < data.length; i++) {
                makanan += '<option value="' + data[i]['kd_makanan'] + '">' + data[i]['jenis_makanan'] + '</option>';
            }
            document.getElementById('modOrderGizibaru_makanan').innerHTML = makanan;
        });
    }
    permintaanGiziPetugas();

    function permintaanGiziPetugas() {
        apiPOST('Gizi/petugas', null, hasil => {
            var data = hasil['data'];
            var petugas = '';
            for (var i = 0; i < data.length; i++) {
                petugas += '<option value="' + data[i]['id_pegawai'] + '">' + data[i]['nama_pegawai'] + '</option>';
            }
            document.getElementById('modOrderGizibarupetugas').innerHTML = petugas;
        });
    }

    function refreshdataGizi() {
        $('#loadingModPermintaanGizibaru').hide();
    }
    setTimeout(refreshdataGizi, 800);

    function keluarPermintaanGizi() {
        $('#pengirimanGizilist1').show();
        $('#permintaanGizilist2').show();
        $('#modalPermintaanGizibaru').modal('hide');
        $('.modal-backdrop').hide();
        sessionStorage.clear();
        permintaanGizidaftarorder();
    }

    // random petugas
    function randomPetugas() {
        var select = document.getElementById('modOrderGizibarupetugas');
        var items = select.getElementsByTagName('option');
        var index = Math.floor(Math.random() * items.length);
        select.selectedIndex = index;
    }


    /* SIMPAN ORDER GIZI */
    function simpanBaru() {
        $('#loadingModPermintaanGizibaru').show();

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
            id_pegawai: document.getElementById('modOrderGizibarupetugas').value,
            qty: document.getElementById('modOrderGizibaru_qty').value,
            kd_makanan: document.getElementById('modOrderGizibaru_makanan').value,
            status_makanan: document.getElementById('permintaanGizi_statusmakananbaru').value,
            mulai_makan: document.getElementById('modOrderGizibaru_mulaimakan').value,
            ket: document.getElementById('modOrderGizibaruket').value,
            tglorder: document.getElementById('permintaanGizi_tglMintabaru').value,
            jam_order: document.getElementById('permintaanGizi_jamMintabaru').value,
            jenis_diet: jenis_diet,
            ket_lain_lain: document.getElementById('keteranganLainbaru').value,
            id_ruang: document.getElementById('kamarPermintaanGizibaruID').value,
            id_kamar: document.getElementById('permintaanGiziNobedbaruID').value
        }
        console.log(param)
        apiPOST('Gizi/simpanOrderGizibaru', param, hasil => {
            if (hasil !== null) {
                var a = hasil['data'];
                for (i = 0; i < a.length; i++) {
                    document.getElementById('modOrderGizibaruId').value = a[i].id_order;
                }
                $('#loadingModPermintaanGizibaru').hide();
            } else {
                toastr.error('Gagal Simpan Order!!');
                $('#loadingModPermintaanGizibaru').hide();
            }
        });
    }

    function kirimKeUnitGizi() {

        var data = {
            no_rm: no_rm,
            id_kunjungan: id_kunj,
            nmpasien: nmpasien,
            id_order: id_order,
            'umurPasien': umur.replace(/ /g, '%20'),
            'petugas_gizi': document.getElementById('modOrderGizibarupetugas').value,
            'dokterPasienGizi': dokter.replace(/ /g, '%20'),
            'idunitPasienGizi': id_unit,
            'unitPasienGizi': unit.replace(/ /g, '%20')
        }
        // console.log(data)
        var myJSON = JSON.stringify(data);
        $('.penerimaanGizimodalPreview').load('Gizi/modalpermintaangizipreview?data=' + myJSON);
    }
</script>