<?php
$data = json_decode($_GET['data']);
$no_rm  = str_replace('"', '', json_encode($data->no_rm));
$id_transaksi  = str_replace('"', '', json_encode($data->id_transaksi));
// $id_kunjungan  = str_replace('"', '', json_encode($data->id_kunjungan));
// $namapasien  = str_replace('"', '', json_encode($data->namapasien));
// $alamat  = str_replace('"', '', json_encode($data->alamat));
// $umur  = str_replace('"', '', json_encode($data->umur));
// $jenkel  = str_replace('"', '', json_encode($data->jenkel));
// $id_dokter  = str_replace('"', '', json_encode($data->id_dokter));
// $dokter  = str_replace('"', '', json_encode($data->dokter));
// // $penjamin  = str_replace('"', '', json_encode($data->penjamin));
// // $nokartu  = str_replace('"', '', json_encode($data->nokartu));
// $id_unit  = str_replace('"', '', json_encode($data->id_unit));
// $unit  = str_replace('"', '', json_encode($data->unit));
?>
<section class="content pb-0" id="modalbokingKamarOK">
    <div class="container-fluid h-100">
        <div class="row p-1">
            <div class="col-md-4 col-sm-6 col-12 p-1">
                <div class="info-box mb-0">
                    <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="100">No. RM</td>
                            <td>:</td>
                            <td><input type="text" name="no_rm" class="form-control form-control-xs" id="modJadwalOKnoRM" readonly></td>
                        </tr>
                        <tr>
                            <td>Nama Pasien</td>
                            <td>:</td>
                            <td><input type="text" class="form-control form-control-xs" id="modJadwalOKNama" readonly></td>
                        </tr>
                        <tr>
                            <td>Usia</td>
                            <td>:</td>
                            <td><input type="text" class="form-control form-control-xs" id="modJadwalOKUsia" readonly></td>
                        </tr>
                        <tr>
                            <td width="100">Dokter</td>
                            <td>:</td>
                            <td><select class="form-control form-control-xs" id="modJadwalOKDokter"></select>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-12 p-1">
                <div class="info-box mb-0">
                    <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="100">Alamat</td>
                            <td>:</td>
                            <td>
                                <input type="text" class="form-control form-control-xs" id="modJadwalOKAlamat" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td width="100">Jenis Kelamin</td>
                            <td>:</td>
                            <td>
                                <input type="text" class="form-control form-control-xs" id="modJadwalOKJK" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td width="100">Penjamin</td>
                            <td>:</td>
                            <td>
                                <select onchange="gantiPenjaminOK();" class="form-control form-control-xs" id="modJadwalOKPenjamin"></select>
                            </td>
                        </tr>
                        <tr>
                            <td width="100">No. SEP</td>
                            <td>:</td>
                            <td><input type="text" class="form-control form-control-xs" id="modJadwalOKnoSEP" readonly></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class=" col-md-4 col-sm-6 col-12 p-1">
                <div class="info-box mb-0">
                    <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td>Unit Asal</td>
                            <td>:</td>
                            <td><select class="form-control form-control-xs" id="modJadwalOKunit"></select></td>
                        </tr>
                        <!-- <tr>
                            <td>ID kunjungan</td>
                            <td>:</td>
                            <td>
                                <input type="text" class="form-control form-control-xs" id="modJadwalOKidkunj" readonly>
                            </td>
                        </tr> -->
                        <tr>
                            <td>ID booking</td>
                            <td>:</td>
                            <td>
                                <input class="form-control form-control-xs" id="modJadwalOKidboking" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>Tgl booking</td>
                            <td>:</td>
                            <td>
                                <input type="datetime-local" class="form-control form-control-xs" id="modJadwalOKtglboking">
                            </td>
                        </tr>
                        <tr>
                            <td>Unit Sekarang</td>
                            <td>:</td>
                            <td>
                                <select class="form-control form-control-xs" id="modJadwalOKunitsekarang">
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="card card-row">
            <!-- <div class="overlay-wrapper" id="loading_modal_eresepRWJAPT">
                <div class="overlay dark">
                    <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                </div>
            </div> -->

            <div class="card-header p-1 darkgrey-custom">
                <button type="button" class="btn bg-gradient-secondary btn-xs" id="tombolSimpanBaru" onclick="simpanBookingOK()"><i class="fa fa-save"></i> Simpan</button>
                <button type="button" class="btn btn-xs bg-danger" id="tombolSimpanBedah" onclick="simpanPembedahanOK()"><i class="fa fa-save"></i> Simpan
                </button>
                <button type="button" class="btn btn-info btn-xs" onclick="modJadwawalOK_refresh()"><i class="fa fa-sync-alt fa-spin"></i> Reset</button>
                <button type="button" class="btn btn-outline-danger btn-xs" onclick="kembaliKeOK()"><i class="fa fa-arrow-left"></i> Kembali</button>
            </div>
            <div class="modal-body p-1">
                <div class="card-body p-0">
                    <ul class="nav nav-tabs" id="inputPembedahanOK-content-above-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" onclick="tabBookingKamar();" href="#bookingKamar" role="tab" aria-selected="true">Booking Kamar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" onclick="tabInputPembedahan();" href="#inputPembedahan" role="tab" aria-selected="true">Input Pembedahan</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="inputPembedahanOK-content-above-tabContent">
                        <div class="tab-pane p-0 fade active show" id="bookingKamar" role="tabpanel">
                            <div class="col-sm-12 p-1" style="max-height: 238px; overflow-x: hidden;">
                                <div class="row mt-1">
                                    <div class="input-group col-sm-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text form-control-xs">Klasifikasi Bedah</span>
                                        </div>
                                        <select class="form-control form-control-xs" id="modJadwalOKklasbedah">
                                        </select>
                                    </div>
                                    <div class="input-group col-sm-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text form-control-xs">Jenis Bedah</span>
                                        </div>
                                        <select class="form-control form-control-xs" id="modJadwalOKJenisbedah"></select>
                                    </div>
                                    <div class="input-group col-sm-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text form-control-xs">Kamar Operasi</span>
                                        </div>
                                        <select id="modOKkamaroperasi" class="form-control form-control-xs">
                                        </select>
                                    </div>
                                    <div class="input-group col-sm-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text form-control-xs">Status</span>
                                        </div>
                                        <select class="form-control form-control-xs" id="modJadwalOKStatusbedah">
                                            <option value="">--Pilihan--</option>
                                            <option value="0">Menunggu</option>
                                            <option value="1">Proses</option>
                                            <option value="2">Selesai</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-sm-6">
                                        <label for="OKTindakanProsedure">Tindakan/Prosedure</label>
                                        <label><span class="badge bg-primary rounded-pill" style="cursor:pointer;" onclick="showModaltambahMrpenyakitOK()" title="tambah prosedur">Tambah</span></label>
                                        <textarea class="form-control" id="modOKTindakanProsedure"></textarea>
                                        <div id="DivmodOKTindakanProsedure"></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="OKTindakanProsedure">Keterangan</label>
                                        <textarea class="form-control" id="modOKKeterangan"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane p-0 fade" id="inputPembedahan" role="tabpanel">
                            <div class="row mt-1">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class="col-form-label">Dokter Operator </label>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <select name="dokteroperator" id="dokterOperatorOK" class="form-control form-control-xs">
                                                    <option value="0">UMUM</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col"><button class="btn bg-warning btn-xs" title="Default PJ"><i class="fas fa-undo-alt"></i></button></div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class="col-form-label">Dokter Anestesi </label>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <select name="dokteranestesi" id="dokterAnestesiOK" class="form-control form-control-xs select2">
                                                    <option value="0">UMUM</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col"><button class="btn bg-warning btn-xs" title="Default PJ"><i class="fas fa-undo-alt"></i></button></div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class="col-form-label">Perawat Asisten </label>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <select name="perawatasisten" id="perawatAsistenOK" class="form-control form-control-xs">
                                                    <option value="0">UMUM</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col"><button class="btn bg-warning btn-xs" title="Default PJ"><i class="fas fa-undo-alt"></i></button></div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class="col-form-label">Perawat Instrument</label>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <select name="perawatinstrumenok" id="perawatInstrumenOk" class="form-control form-control-xs">
                                                    <option value="0">UMUM</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col"><button class="btn bg-warning btn-xs" title="Default PJ"><i class="fas fa-undo-alt"></i></button></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class="col-form-label">Perawat Omloop </label>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <select name="perawatomloop" id="perawatOmloop" class="form-control form-control-xs">
                                                    <option value="0">UMUM</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col"><button class="btn bg-warning btn-xs" title="Default PJ"><i class="fas fa-undo-alt"></i></button></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class="col-form-label">Penata Anestesi </label>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <select name="penataanestesi" id="penataAnestesi" class="form-control form-control-xs">
                                                    <option value="0">UMUM</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col"><button class="btn bg-warning btn-xs" title="Default PJ"><i class="fas fa-undo-alt"></i></button></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class="col-form-label">Tanggal Pembedahan</label>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input class="form-control form-control-xs" type="datetime-local" id="tgl_awal_bedah">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <label class="col-form-label">Sampai</label>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input class="form-control form-control-xs" type="datetime-local" id="tgl_ahir_bedah">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class="col-form-label">Jenis Anestesi</label>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <select class="form-control form-control-xs" id="jenisAnestesiOK">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class="col-form-label">Kegiatan RL Pembedahan</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <button type="btn" id="addKegiatanRLOK" onclick="addKegiatanRLOK();" class="btn btn-xs bg-info" title="Tambah RL"><i class="fas fa-plus"></i> Tambah</button>
                                                <textarea class="form-control" id="kegiatanRLPembedahanOK"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class="col-form-label">ICD 10 Pra Bedah
                                            </label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <textarea class="form-control" id="getIcdPrabedahOK"></textarea>
                                                <div id="DivPrabedahOK"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class="col-form-label">Diagnosis Klinis Pra Bedah
                                            </label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea name="" class="form-control" id="diagnosisiKlinisPrabedah"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class="col-form-label">Tindakan Medis
                                            </label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea name="" class="form-control" id="tindakanmedisOK"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header" style="background-color:black;">
                                            <h3 class="card-title" style="color:white;">Uraian Pembedahan</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body" style="max-height: 500px; overflow: auto;">
                                            <div class="info-box">
                                                <div class="col-md-8">
                                                    <textarea id="isiPedomanOK" class="form-control"></textarea>
                                                </div>
                                                <div class="col-md-1"></div>
                                                <div class="col-md-3">
                                                    <h6 class="text-center weight-bold">Dokter Penanggungjawab</h6>
                                                    <input type="text" class="form-control form-control-xs text-center" id="dokterPenanggungjawabOK" disabled>
                                                    <h6 class="text-center">Nama & Tanda Tangan</h6>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-xs bg-info" onclick="TambahPedomanOK();"><i class="fa fa-edit"></i> Pedoman</button>
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
<div class="modal fade" id="modalTambahMrpenyakitsekarang" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header"></div>
            <div class="modal-body">
                <input type="text" name="" id="modalInputMrPenyakitSekarang" class="form-control">
                <div id="modalDivmrPenyakitSekarang"></div>
            </div>
        </div>
    </div>
</div>
<script>
    var nosjp = [];
    var paramIdPenjaminnosjp = ['id_penjamin', 'no_sjp', 'no_sjp'];
    var no_rm = '<?php echo $no_rm; ?>';
    var id_transaksi = '<?php echo $id_transaksi; ?>';
    modalInputjadwalOKbaru();

    function modalInputjadwalOKbaru() {
        var param = {
            no_rm: no_rm
        }
        apiPOST('Kamaroperasi/listkunjunganbaruPasienOK', param, hasil => {
            if (hasil['data'] !== null) {
                var a = hasil['data'];
                for (var i = 0; i < a.length; i++) {
                    no_rm = a[i].no_rm;
                    nama = a[i].nama;
                    alamat = a[i].alamat;
                    umur = a[i].umur;
                    jenkel = a[i].jenis_kelamin;
                    id_dokter = a[i].id_pegawai;
                    id_unit = a[i].id_unit;
                }
                document.getElementById('modJadwalOKnoRM').value = no_rm;
                document.getElementById('modJadwalOKNama').value = nama;
                document.getElementById('modJadwalOKAlamat').value = alamat;
                document.getElementById('modJadwalOKUsia').value = umur;
                document.getElementById('modJadwalOKDokter').value = id_dokter;
                document.getElementById('modJadwalOKunit').value = id_unit;
                if (jenkel == 't') {
                    document.getElementById('modJadwalOKJK').value = 'Laki-laki';
                } else {
                    document.getElementById('modJadwalOKJK').value = 'Perempuan';
                }
                // document.getElementById('modJadwalOKidkunj').value = id_kunjungan;
                // document.getElementById('modJadwalOKunit').value = unit;
            } else {
                dokterOKkunj();
                getUnitdulu();
            }
        });
    }
    // document.getElementById('dokterPenanggungjawabOK').value = dokter;
    var now = new Date();
    now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
    document.getElementById('modJadwalOKtglboking').value = now.toISOString().slice(0, 16);
    document.getElementById('tgl_awal_bedah').value = now.toISOString().slice(0, 16);
    document.getElementById('tgl_ahir_bedah').value = now.toISOString().slice(0, 16);

    document.getElementById('tombolSimpanBedah').style.display = 'none';

    function tabBookingKamar() {
        $('#tombolSimpanBaru').show();
        $('#tombolSimpanBedah').hide();
    }

    function tabInputPembedahan() {
        $('#tombolSimpanBaru').hide();
        $('#tombolSimpanBedah').show();
    }

    getUnitdulu();

    function getUnitdulu() {
        apiPOST('Kamaroperasi/unit', null, hasil => {
            var a = hasil['data'];
            var b = '';
            for (var i = 0; i < a.length; i++) {
                b += '<option value=' + a[i]['id_unit'] + '>' + a[i]['nama_unit'] + '</option>';
            }
            document.getElementById('modJadwalOKunit').innerHTML = b;
        });
    }
    unitSekarangOK();

    function unitSekarangOK() {
        var param = {
            id_user: user.id_unit
        }
        // console.log(param)
        apiPOST('Kamaroperasi/unitsekarang', param, hasil => {
            var a = hasil['data'];
            var b = '';
            for (var i = 0; i < a.length; i++) {
                b += '<option value=' + a[i]['id_unit'] + '>' + a[i]['nama_unit'] + '</option>';
            }
            document.getElementById('modJadwalOKunitsekarang').innerHTML = b;
        });
    }
    KamarBedahOK();

    function KamarBedahOK() {
        apiPOST('Kamaroperasi/kamarOK', null, hasil => {
            var a = hasil['data'];
            var b = '<option value="0">--Pilihan--</option>';
            for (var i = 0; i < a.length; i++) {
                b += '<option value=' + a[i]['id_kamar_ok'] + '>' + a[i]['nama_kamar_ok'] + '</option>';
            }
            document.getElementById('modOKkamaroperasi').innerHTML = b;
        });
    }

    function showModaltambahMrpenyakitOK() {
        $("#modalTambahMrpenyakitsekarang").modal("show");
        document.getElementById("modalInputMrPenyakitSekarang").value = "";
    }
    $(document).on('keyup', '#modalInputMrPenyakitSekarang', function(e) {
        if ($(this).val() !== '') {
            mrPenyakitSekarangOK();
        } else {
            document.getElementById("modalDivmrPenyakitSekarang").innerHTML = "";
        }
    })

    function mrPenyakitSekarangOK() {
        var param = {
            id: document.getElementById("modalInputMrPenyakitSekarang").value,
        };
        apiPOST('Kunjungan/icd', param, hasil => {
            var a = hasil['icd'];
            var b = '';
            for (var i = 0; i < a.length; i++) {
                b += '<button class="btn btn-primary" onclick="pilihMrpenyakitSekarangOK(`' + a[i]['penyakit'] + '`,`' + a[i]['id_penyakit'] + '`)">' + a[i]['penyakit'] + '</button><br>';
            }
            document.getElementById('modalDivmrPenyakitSekarang').innerHTML = b;
        });
    }

    function pilihMrpenyakitSekarangOK(kode, icd) {
        document.getElementById("modOKTindakanProsedure").value = document.getElementById('modOKTindakanProsedure').value + ',' + kode;
        document.getElementById("modalDivmrPenyakitSekarang").innerHTML = "";
        $('#modalTambahMrpenyakitsekarang').modal('hide');
    }

    dokterOKkunj();

    function dokterOKkunj() {
        apiPOST('Kamaroperasi/dokterOperator', null, hasil => {
            var data = hasil['data'];
            var opsi = document.getElementById('modJadwalOKDokter');
            data.forEach(baru => {
                var option = document.createElement('option');
                option.value = baru['id_pegawai'];
                option.innerHTML = baru['nama_pegawai'];
                opsi.appendChild(option);
            });
            // document.getElementById('dokterOperatorOK').value = id_dokter;
        });
    }
    dokterOperator();

    function dokterOperator() {
        apiPOST('Kamaroperasi/dokterOperator', null, hasil => {
            var data = hasil['data'];
            var opsi = document.getElementById('dokterOperatorOK');
            data.forEach(baru => {
                var option = document.createElement('option');
                option.value = baru['id_pegawai'];
                option.innerHTML = baru['nama_pegawai'];
                opsi.appendChild(option);
            });
            // document.getElementById('dokterOperatorOK').value = id_dokter;
        });
    }

    dokterAnestesi();

    function dokterAnestesi() {
        apiPOST('Kamaroperasi/dokterAnestesi', null, hasil => {
            var data = hasil['data'];
            var opsi = document.getElementById('dokterAnestesiOK');
            data.forEach(baru => {
                var option = document.createElement('option');
                option.value = baru['id_pegawai'];
                option.innerHTML = baru['nama_pegawai'];
                opsi.appendChild(option);
            });
        });
    }

    perawatAsisten();

    function perawatAsisten() {
        apiPOST('Kamaroperasi/perawatAsisten', null, hasil => {
            var data = hasil['data'];
            var opsi = document.getElementById('perawatAsistenOK');
            data.forEach(baru => {
                var option = document.createElement('option');
                option.value = baru['id_pegawai'];
                option.innerHTML = baru['nama_pegawai'];
                opsi.appendChild(option);
            });
        });
    }

    perawatInstrumenOK();

    function perawatInstrumenOK() {
        apiPOST('Kamaroperasi/perawatInstrumen', null, hasil => {
            var data = hasil['data'];
            var opsi = document.getElementById('perawatInstrumenOk');
            data.forEach(baru => {
                var option = document.createElement('option');
                option.value = baru['id_pegawai'];
                option.innerHTML = baru['nama_pegawai'];
                opsi.appendChild(option);
            });
        });
    }

    perawatOmloop();

    function perawatOmloop() {
        apiPOST('Kamaroperasi/perawatOmloop', null, hasil => {
            var data = hasil['data'];
            var opsi = document.getElementById('perawatOmloop');
            data.forEach(baru => {
                var option = document.createElement('option');
                option.value = baru['id_pegawai'];
                option.innerHTML = baru['nama_pegawai'];
                opsi.appendChild(option);
            });
        });
    }

    penataAnestesi();

    function penataAnestesi() {
        apiPOST('Kamaroperasi/penataAnestesi', null, hasil => {
            var data = hasil['data'];
            var opsi = document.getElementById('penataAnestesi');
            data.forEach(baru => {
                var option = document.createElement('option');
                option.value = baru['id_pegawai'];
                option.innerHTML = baru['nama_pegawai'];
                opsi.appendChild(option);
            });
        });
    }

    $(document).on('keyup', '#modOKTindakanProsedure', function(e) {
        console.log($(this).val())
        if ($(this).val() !== '') {
            mrPenyakitOK();
        } else {
            document.getElementById('DivmodOKTindakanProsedure').innerHTML = "";
        }
    })

    function mrPenyakitOK() {
        var param = {
            id: document.getElementById("modOKTindakanProsedure").value,
        };
        apiPOST('Kunjungan/icd', param, hasil => {
            var a = hasil['icd'];
            var b = '';
            for (var i = 0; i < a.length; i++) {
                b += '<button class="btn btn-primary" onclick="pilihMrpenyakit(`' + a[i]['penyakit'] + '`)">' + a[i]['penyakit'] + '</button>';
            }
            document.getElementById('DivmodOKTindakanProsedure').innerHTML = b;
        });
    }

    function pilihMrpenyakit(kode) {
        document.getElementById("modOKTindakanProsedure").value = kode;
        document.getElementById('DivmodOKTindakanProsedure').innerHTML = "";
    }
    $(document).on('keyup', '#getIcdPrabedahOK', function(e) {
        console.log($(this).val())
        if ($(this).val() !== '') {
            icdPrabedah();
        } else {
            document.getElementById('DivPrabedahOK').innerHTML = "";
        }
    })

    function icdPrabedah() {
        var param = {
            id: document.getElementById("getIcdPrabedahOK").value,
        };
        apiPOST('Kunjungan/icd', param, hasil => {
            var a = hasil['icd'];
            var b = '';
            for (var i = 0; i < a.length; i++) {
                b += '<button class="btn btn-primary" onclick="pilihIcdOK(`' + a[i]['penyakit'] + '`)">' + a[i]['penyakit'] + '</button>';
            }
            document.getElementById('DivPrabedahOK').innerHTML = b;
        });
    }

    function pilihIcdOK(kode) {
        document.getElementById("getIcdPrabedahOK").value = kode;
        document.getElementById('DivPrabedahOK').innerHTML = "";
    }

    getpenjaminOK();

    function getpenjaminOK() {
        var param = {
            id_transaksi: id_transaksi
        }
        apiPOST('Kamaroperasi/getpenjaminOK', param, hasil => {
            var data = hasil['data'];
            if (hasil !== null) {
                nosjp = hasil['data'];
                var opsi = document.getElementById('modJadwalOKPenjamin');
                nosjp.forEach(baru => {
                    var option = document.createElement('option');
                    option.value = baru['id_penjamin'];
                    option.innerHTML = baru['nama_penjamin'];
                    opsi.appendChild(option);
                });
                if (nosjp.length > 1) {
                    var penjamin = document.getElementById("modJadwalOKPenjamin");
                    penjamin.focus();
                    toastr.info("Penjamin Pasien Lebih dari 1!!");
                }
            }
            gantiPenjaminOK();
        });
    }

    function gantiPenjaminOK() {
        optionChildByParent(nosjp, 'modJadwalOKPenjamin', 'modJadwalOKnoSEP', paramIdPenjaminnosjp);
    }

    jenisBedahOK();

    function jenisBedahOK() {
        apiPOST('Kamaroperasi/jenisbedah', null, hasil => {
            var data = hasil['data'];
            var a = '';
            a += '<option value="0">--Pilihan--</option>';
            for (var i = 0; i < data.length; i++) {
                a += '<option value="' + data[i]['id_jenis_bedah'] + '">' + data[i]['jenis_bedah'] + '</option>';
            }
            document.getElementById('modJadwalOKJenisbedah').innerHTML = a;
        });
    }
    klasifikasiBedahOK();

    function klasifikasiBedahOK() {
        apiPOST('Kamaroperasi/klasifikasibedah', null, hasil => {
            var data = hasil['data'];
            var a = '';
            a += '<option value="0">--Pilihan--</option>';
            for (var i = 0; i < data.length; i++) {
                a += '<option value="' + data[i]['id_klasifikasi_bedah'] + '">' + data[i]['klasifikasi_bedah'] + '</option>';
            }
            document.getElementById('modJadwalOKklasbedah').innerHTML = a;
        });
    }

    jenisAnestesiOK();

    function jenisAnestesiOK() {
        apiPOST('Kamaroperasi/jenisanestesi', null, hasil => {
            var data = hasil['data'];
            var a = '';
            a += '<option value="0">--Pilihan--</option>';
            for (var i = 0; i < data.length; i++) {
                a += '<option value="' + data[i]['id_jenis_anestesi'] + '">' + data[i]['jenis_anestesi'] + '</option>';
            }
            document.getElementById('jenisAnestesiOK').innerHTML = a;
        });
    }

    function kembaliKeOK() {
        var idbooking = document.getElementById("modJadwalOKidboking").value;
        if (idbooking == '') {
            pertanyaan.fire({
                title: 'Kembali ke menu awal',
                html: '<span>Jadwal Operasi Belum diSimpan, Data yang sudah dientry akan hilang, tetap kembali ?</span>',
                icon: 'question',
                showCancelButton: true,
                reverseButtons: false,
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    keluarKeListOK();
                } else if (result.dismiss === Swal.DismissReason.cancel) {

                }
            })
        } else {
            keluarKeListOK();
        }
    }

    function keluarKeListOK() {
        $('#list1jadwalOKpasien').show();
        $('#list2jadwalOKpasien').show();
        $('#cariKunjunganPasienOK').modal("hide");
        // $('#list1jadwalOK').show();
        // $('#list2jadwalOK').show();
        $('#modalbokingKamarOK').hide();
        listbookingKamarOK();
    }

    function modJadwawalOK_refresh() {
        document.getElementById('modJadwalOKklasbedah').value = '0';
        document.getElementById('modJadwalOKJenisbedah').value = '0';
        document.getElementById('modOKkamaroperasi').value = '0';
        document.getElementById('modJadwalOKStatusbedah').value = '0';
        document.getElementById('modOKTindakanProsedure').value = '';
        document.getElementById('modOKKeterangan').value = '';
    }

    function simpanBookingOK() {
        var param = {
            id_boking: document.getElementById('modJadwalOKidboking').value,
            id_user: user.id_user,
            id_transaksi: id_transaksi,
            id_unit: document.getElementById('modJadwalOKunitsekarang').value,
            id_pegawai: document.getElementById('modJadwalOKDokter').value,
            tglboking: document.getElementById('modJadwalOKtglboking').value,
            klasifikasi: document.getElementById('modJadwalOKklasbedah').value,
            jenis_bedah: document.getElementById('modJadwalOKJenisbedah').value,
            kamar: document.getElementById('modOKkamaroperasi').value,
            statusboking: document.getElementById('modJadwalOKStatusbedah').value,
            tindakan: document.getElementById('modOKTindakanProsedure').value,
            ket: document.getElementById('modOKKeterangan').value,
        }
        console.log(param)
        apiPOST('Kamaroperasi/simpanBookingOK', param, hasil => {
            var a = hasil['data'];
            for (i = 0; i < a.length; i++) {
                document.getElementById('modJadwalOKidboking').value = a[i].id_boking;
            }
        })
    }

    function simpanPembedahanOK() {

        var param = {
            id_bedah: '',
            dokterOperator: document.getElementById('dokterOperatorOK').value,
            dokterAnestesi: document.getElementById('dokterAnestesiOK').value,
            perawatAsisten: document.getElementById('perawatAsistenOK').value,
            perawatInstrumen: document.getElementById('perawatInstrumenOk').value,
            perawatOmloop: document.getElementById('perawatOmloop').value,
            penataAnestesi: document.getElementById('penataAnestesi').value,
            tglBedahAwal: document.getElementById('tgl_awal_bedah').value,
            tglBedahAhir: document.getElementById('tgl_ahir_bedah').value,
            jenisAnestesi: document.getElementById('jenisAnestesiOK').value,
            rlBedah: $('#kegiatanRLPembedahanOK').val(),
            icdPrabedah: $('#getIcdPrabedahOK').val(),
            diagPrabedah: $('#diagnosisiKlinisPrabedah').val(),
            tindakanOK: $('#tindakanmedisOK').val()

        }
        console.log(param);
        apiPOST('Kamaroperasi/simpanPembedahanOK', param, hasil => {
            var a = hasil['data'];
        })
    }
</script>