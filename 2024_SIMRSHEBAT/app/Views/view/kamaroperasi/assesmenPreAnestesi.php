<div class="col-md-12 p-2">
    <div class="text-center">
        <h5><b>ASESMEN PRE ANASTESI / SEDASI</b></h5>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <div class="col-md-2">
                            <label class="col-form-label" title="ID">ID</label>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" id="IDAssesmenOK" readonly>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <h6><i><b>Note : Yang bertanda Bintang (*) wajib di isi !</b></i></h6>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-2">
                            <label class="col-form-label" title="ID">Tanggal Operasi</label>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="datetime-local" class="form-control form-control-sm" id="tglOperasiOKass">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-2">
                            <label class="col-form-label" title="ID">Dokter Anestesi</label>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <select class="form-control form-control-sm" name="" id="drAnestesiOKass"></select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <div class="col-md-2">
                            <label class="col-form-label" title="ID">Jenis Operasi</label>
                        </div>
                        <div class="col-md-8">
                            <div class="input-group">
                                <textarea class="form-control " id="jenis_operasiASS"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header" style="background-color:black;">
                            <h3 class="card-title" style="color:white;">Riwayat Kesehatan</h3>
                        </div>
                        <div class="card-body" style="max-height: 500px; overflow: auto;">
                            <div class="info-box">
                                <div class="table-responsive">
                                    <table id="tableRiwayatPenyakitdahuluOK" class="table table-striped table-sm choose" style="border-collapse: inherit;">
                                        <thead>
                                            <th width="50px">ACT</th>
                                            <th>No</th>
                                            <th>Jenis</th>
                                            <th>Keterangan</th>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <button type="button" class="btn btn-sm bg-info" onclick="tambahRiwayatPenyakitdahulu();"><i class="fas fa-plus"></i> Tambah</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header" style="background-color:black;">
                            <h3 class="card-title" style="color:white;">Riwayat Penyakit Keluarga</h3>
                        </div>
                        <div class="card-body" style="max-height: 500px; overflow: auto;">
                            <div class="info-box">
                                <div class="table-responsive">
                                    <table id="tableRiwayatPenyakitkeluargaOK" class="table table-striped table-sm choose" style="border-collapse: inherit;">
                                        <thead>
                                            <th width="50px">ACT</th>
                                            <th>No</th>
                                            <th>Jenis</th>
                                            <th>Keterangan</th>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <button type="button" class="btn btn-sm bg-info" onclick="tambahRiwayatPenyakitKeluarga();"><i class="fas fa-plus"></i> Tambah</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header" style="background-color:black;">
                            <h3 class="card-title" style="color:white;">Riwayat Pengobatan/Operasi</h3>
                        </div>
                        <div class="card-body" style="max-height: 500px; overflow: auto;">
                            <div class="info-box">
                                <div class="table-responsive">
                                    <table id="tabelRiwayatOperasiOK" class="table table-striped table-sm choose" style="border-collapse: inherit;">
                                        <thead>
                                            <th width="50px">ACT</th>
                                            <th>No</th>
                                            <th>Jenis</th>
                                            <th>Keterangan</th>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <button type="button" class="btn btn-sm bg-info" onclick="tambahRiwayatOperasiOK();"><i class="fas fa-plus"></i> Tambah</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header" style="background-color:black;">
                            <h3 class="card-title" style="color:white;">Riwayat Alergi</h3>
                        </div>
                        <div class="card-body" style="max-height: 500px; overflow: auto;">
                            <div class="info-box">
                                <div class="table-responsive">
                                    <table id="tableRiwayatAlergiOK" class="table table-striped table-sm choose" style="border-collapse: inherit;">
                                        <thead>
                                            <th width="50px">ACT</th>
                                            <th>No</th>
                                            <th>Jenis</th>
                                            <th>Keterangan</th>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <button type="button" class="btn btn-sm bg-info" onclick="tambahRiwayatAlergiOK();"><i class="fas fa-plus"></i> Tambah</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h6>Riwayat Komplikasi Sebelumnya</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <div class="col-md-2">
                            <label class="col-form-label">Riwayat Operasi</label>
                        </div>
                        <div class="col-md-3">
                            <div class="row" id="riwayatoperasi">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                            <input onclick="document.getElementById('riwayatOperasidiv').style.display='none'" name="riwayatoperasi" value="0" type="radio" class="custom-control-input" id="riwayatOperasiass1">
                                            <label class="custom-control-label" for="riwayatOperasiass1">
                                                Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                            <input onclick="document.getElementById('riwayatOperasidiv').style.display='block'" name="riwayatoperasi" value="1" type="radio" class="custom-control-input" id="riwayatOperasiass2">
                                            <label class="custom-control-label" for="riwayatOperasiass2"> Ya</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row" id="riwayatOperasidiv" style="display:none">
                        <div class="col-md-2">
                            <label class="col-form-label"> 1. Jenis Operasi / Waktu</label>
                        </div>
                        <div class="col-md-6">
                            <textarea id="ketjenisoperasiOK" class="form-control"></textarea>
                        </div>
                        <div class="col-md-2">
                            <label class="col-form-label"> 2. Komplikasi</label>
                        </div>
                        <div class="col-md-6">
                            <textarea id="ketkomplikoperasiOK" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-2">
                            <label class="col-form-label">Riwayat Anestesi</label>
                        </div>
                        <div class="col-md-3">
                            <div class="row" id="riwayatanestesi">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                            <input onclick="document.getElementById('riwayatanestesidiv').style.display='none'" name="riwayatanestesi" value="0" type="radio" class="custom-control-input" id="riwayatAnestesidivOK1">
                                            <label class="custom-control-label" for="riwayatAnestesidivOK1">
                                                Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                            <input onclick="document.getElementById('riwayatanestesidiv').style.display='block'" name="riwayatanestesi" value="1" type="radio" class="custom-control-input" id="riwayatAnestesidivOK2">
                                            <label class="custom-control-label" for="riwayatAnestesidivOK2"> Ya</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row" id="riwayatanestesidiv" style="display:none">
                        <div class="col-md-2">
                            <label class="col-form-label"> 1. Jenis Anestesi / Waktu</label>
                        </div>
                        <div class="col-md-6">
                            <textarea id="ketjenisanestesiOK" class="form-control"></textarea>
                        </div>
                        <div class="col-md-2">
                            <label class="col-form-label"> 2. Komplikasi</label>
                        </div>
                        <div class="col-md-6">
                            <textarea id="ketkomplikasianestesiOK" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label class="col-form-label">Kebiasaan Pasien</label>
                        </div>
                        <div class="col-md-8">
                            <div class="row" id="">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                            <input name="kebiasaanpasien" value="1" type="checkbox" class="custom-control-input" id="kebiasaanPasienmerokok" onchange="KebiasaanMerokok();">
                                            <label class="custom-control-label" for="kebiasaanPasienmerokok">
                                                Merokok</label>
                                            <input type="text" id="ketKebiasaanMerokok" class="form-control form-control-xs" style="display:none;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                            <input name="kebiasaanpasien" value="2" type="checkbox" class="custom-control-input" id="kebiasaanPasienMinumalkohol" onchange="KebiasaanAlkohol();">
                                            <label class="custom-control-label" for="kebiasaanPasienMinumalkohol">
                                                Minum Alkohol</label>
                                            <input type="text" id="ketKebiasaanminumAlkohol" class="form-control form-control-xs" style="display:none;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                            <input name="kebiasaanpasien" value="3" type="checkbox" class="custom-control-input" id="kebiasanNgopipasien">
                                            <label class="custom-control-label" for="kebiasanNgopipasien">
                                                Kopi / Teh / Soda</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                            <input name="kebiasaanpasien" value="4" type="checkbox" class="custom-control-input" id="kebiasaanOlahragaPasien">
                                            <label class="custom-control-label" for="kebiasaanOlahragaPasien">
                                                Olahraga rutin</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label class="col-form-label">Penyulit Anestesi Lain</label>
                        </div>
                        <div class="col-md-6">
                            <div class="row" id="penyulitanestesilain">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                            <input onclick="document.getElementById('penyulitanestesiDiv').style.display='block'" name="penyulitanestesilain" value="1" type="radio" class="custom-control-input" id="penyulitanestesi1">
                                            <label class="custom-control-label" for="penyulitanestesi1">
                                                Ada</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                            <input onclick="document.getElementById('penyulitanestesiDiv').style.display='none'" name="penyulitanestesilain" value="0" type="radio" class="custom-control-input" id="penyulitanestesi2">
                                            <label class="custom-control-label" for="penyulitanestesi2"> Tidak ada</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row" id="penyulitanestesiDiv" style="display:none">
                        <div class="col-md-6">
                            <textarea id="ketpenyulitanestesilain" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label class="col-form-label">Puasa</label>
                        </div>
                        <div class="col-md-6">
                            <div class="row" id="puasa">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                            <input onclick="document.getElementById('puasaOKODiv').style.display='block'" name="puasa" value="1" type="radio" class="custom-control-input" id="puasa1OK">
                                            <label class="custom-control-label" for="puasa1OK">
                                                Ya</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                            <input onclick="document.getElementById('puasaOKODiv').style.display='none'" name="puasa" value="0" type="radio" class="custom-control-input" id="puasa2OK">
                                            <label class="custom-control-label" for="puasa2OK"> Tidak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row" id="puasaOKODiv" style="display:none">
                        <div class="col-md-3">
                            <label for="ketlamapuasa">Lama Puasa*</label>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="number" id="ketlamapuasa" class="form-control">
                                <span class="input-group-append">
                                    <span class="input-group-text">Jam</span>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="ketlamapuasa">Makan Terakhir*</label>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="number" id="ketmakanterahir" class="form-control">
                                <span class="input-group-append">
                                    <span class="input-group-text">Jam</span>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="ketlamapuasa">Minum Terakhir*</label>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="number" id="ketminumterahir" class="form-control">
                                <span class="input-group-append">
                                    <span class="input-group-text">Jam</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="background-color:black;">
                            <h3 class="card-title" style="color:white;"> PEMERIKSAAN FISIK TANDA VITAL</h3>
                        </div>
                        <div class="card-body" style="max-height: 500px; overflow: auto;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="background-color:black;">
                            <h3 class="card-title" style="color:white;"> PEMERIKSAAN PENUNJANG</h3>
                        </div>
                        <div class="card-body" style="max-height: 500px; overflow: auto;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="background-color:black;">
                            <h3 class="card-title" style="color:white;"> KESIMPULAN</h3>
                        </div>
                        <div class="card-body" style="max-height: 500px; overflow: auto;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <button type="button" class="btn btn-sm bg-info"><i class="fas fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-sm bg-warning"><i class="fas fa-save"></i> Reset</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function KebiasaanMerokok() {
        if ($('#kebiasaanPasienmerokok').is(":checked"))
            $("#ketKebiasaanMerokok").show();
        else
            $("#ketKebiasaanMerokok").hide();
    }

    function KebiasaanAlkohol() {
        if ($('#kebiasaanPasienMinumalkohol').is(":checked"))
            $("#ketKebiasaanminumAlkohol").show();
        else
            $("#ketKebiasaanminumAlkohol").hide();
    }
</script>