<?php
$nowday     = date('Y-m-d');
$nextday    = date('Y-m-d', strtotime('+1 days', strtotime($nowday)));
?>
<style>
    .newtable {
        border-collapse: collapse;
    }

    .newtable td {
        border: 1px solid;
    }
</style>

<div class="col-md-12 p-2">
    <div style="max-height: 500px; overflow: auto;">
        <div class="card card-outline card-danger" id="formAssesmenetObgyn">
            <div class="col-12 p-1">
                <div class="card">
                    <div class="card-header p-2 darkgrey-custom">
                        <h4 class="text-center">
                            ASESMEN RAWAT INAP KEBIDANAN
                        </h4>
                    </div>
                </div>
                <div class="card card-default" id="">
                    <div class="card-header" style="background-color:black;">
                        <h3 class="card-title" style="color:white;">RIWAYAT MENSTRUASI</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                    <i class="fas fa-times"></i>
                                                </button> -->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row mb-0">
                                        <div class="col-md-4">
                                            <label class="col-form-label" title="HPHT">HPHT</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group date" id="dacriasesmenmt_dhtglhpht">
                                                <input id="dacriasesmenmt_htglhpht" name="htglhpht" type="text" class="form-control form-control-xs">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-4">
                                            <label class="col-form-label" title="Taksiran Persalinan">Taksiran Persalinan</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group date" id="dacriasesmenmt_dhtglsalin">
                                                <input id="dacriasesmenmt_htglsalin" name="htglsalin" type="date" class="form-control form-control-xs">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-4">
                                            <label class="col-form-label" title="Taksiran Persalinan">Perkiraan Menstruasi Berikut</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group date" id="dacriasesmenmt_dhtglmens">
                                                <input id="dacriasesmenmt_htglmens" name="htglmens" type="date" class="form-control form-control-xs">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-4">
                                            <label class="col-form-label" title="Umur Menarche">Umur Menarche</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input type="number" class="form-control form-control-xs" id="dacriasesmenmt_hmenarche"><span class="input-group-text form-control-xs">Tahun</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-4">
                                            <label class="col-form-label" title="Jumlah Darah Haid">Jumlah Darah Haid</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input type="number" class="form-control form-control-xs" id="dacriasesmenmt_hdarahhaid"><span class="input-group-text form-control-xs">Kali ganti pembalut</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-4">
                                            <label class="col-form-label" title="Siklus Haid">Siklus Haid</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input type="number" class="form-control form-control-xs" id="dacriasesmenmt_hsiklushaid"><span class="input-group-text form-control-xs">Hari</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-4">
                                            <label class="col-form-label" title="Lamanya Haid">Lamanya Haid</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input type="number" class="form-control form-control-xs" id="dacriasesmenmt_hlamahaid"><span class="input-group-text form-control-xs">Hari</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row mb-0">
                                        <div class="col-md-4">
                                            <label class="col-form-label" title="Dismenore">Dismenore</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row mb-0">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline mb-0">
                                                            <input name="dacriasesmenmt_hdesminore" value="1" type="radio" class="custom-control-input" id="dacriasesmenmt_hdesminore_1"> <label class="custom-control-label" for="dacriasesmenmt_hdesminore_1">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline mb-0">
                                                            <input name="dacriasesmenmt_hdesminore" value="2" type="radio" class="custom-control-input" id="dacriasesmenmt_hdesminore_2"> <label class="custom-control-label" for="dacriasesmenmt_hdesminore_2">Ya</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-4">
                                            <label class="col-form-label" title="Riwayat Perkawinan">Riwayat Perkawinan</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input type="number" class="form-control form-control-xs" id="dacriasesmenmt_hkawin"><span class="input-group-text form-control-xs">Kali</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-4">
                                            <label class="col-form-label" title="Kawin Ke 1 Usia">Kawin Ke 1 Usia</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input type="number" class="form-control form-control-xs" id="dacriasesmenmt_hkawin1usia"><span class="input-group-text form-control-xs">Tahun</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-4">
                                            <label class="col-form-label" title="Usia Suami 1">Usia Suami 1</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input type="number" class="form-control form-control-xs" id="dacriasesmenmt_husiasuami1"><span class="input-group-text form-control-xs">Tahun</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-4">
                                            <label class="col-form-label" title="Kawin Ke 2 Usia">Kawin Ke 2 Usia</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input type="number" class="form-control form-control-xs" id="dacriasesmenmt_hkawin2usia"><span class="input-group-text form-control-xs">Tahun</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-4">
                                            <label class="col-form-label" title="Usia Suami 2">Usia Suami 2</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input type="number" class="form-control form-control-xs" id="dacriasesmenmt_husiasuami2"><span class="input-group-text form-control-xs">Tahun</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 row">
                            <div class="col-md-6">
                                <div class="form-group row" style="padding-top: 3px;">
                                    <div class="col-md-4">
                                        <label class="col-form-label font-weight-bold" title="RIWAYAT OBSTETRIK ">
                                            1. Riwayat Obstetrik</label>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <span class="input-group-text form-control-xs">G</span>
                                            </span> <input type="number" class="form-control form-control-xs" name="dacriasesmenmt_hobstetrikg" id="dacriasesmenmt_hobstetrikg"><span class="input-group-text form-control-xs">P</span>
                                            </span> <input type="number" class="form-control form-control-xs" name="dacriasesmenmt_hobstetrikp" id="dacriasesmenmt_hobstetrikp"><span class="input-group-text form-control-xs">A</span>
                                            </span> <input type="number" class="form-control form-control-xs" name="dacriasesmenmt_hobstetrika" id="dacriasesmenmt_hobstetrika">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row" style="padding-top: 3px;">
                                    <div class="col-md-4">
                                        <label class="col-form-label font-weight-bold" title="JENIS OBSTETRIK ">
                                            Jenis Obstetrik</label>
                                    </div>
                                    <div class="col-md-5 row">
                                        <div class="col-md-6">
                                            <div class="custom-control custom-checkbox">
                                                <input name="hpartus" id="dacriasesmenmt_hpartus" type="checkbox" class="custom-control-input">
                                                <label class="custom-control-label col-form-label" for="dacriasesmenmt_hpartus"> Partus</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="custom-control custom-checkbox">
                                                <input name="habortus" id="dacriasesmenmt_habortus" type="checkbox" class="custom-control-input">
                                                <label class="custom-control-label col-form-label" for="dacriasesmenmt_habortus"> Abortus</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 row">
                            <div class="col-md-12">
                                <div class="form-group row mb-0">
                                    <div class="col-md-12">
                                        <div class="form-group row mb-0">
                                            <label class="col-form-label font-weight-bold" title="RIWAYAT OBSTETRIK ">2. Riwayat Hamil Ini</label>
                                        </div>
                                        <div class="form-group row mb-0" style="padding-bottom: 3px; border-bottom-style: solid; border-bottom-width: thin;">
                                            <div class="col-md-2">
                                                <label class="col-form-label" title="TM I">&nbsp;&nbsp;&nbsp;&nbsp;TM
                                                    I</label> <input type="hidden" id="dacriasesmenmt_hhamiltm1Id">
                                            </div>
                                            <div class="col-md-10 row" id="dacriasesmenmt_hhamiltm1list">
                                                <div class="col-md-2">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenmt_hhamiltm1list" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenmt_hhamiltm1list_1"> <label class="custom-control-label" for="dacriasesmenmt_hhamiltm1list_1">Mual</label>
                                                    </div>

                                                </div>
                                                <div class="col-md-2">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenmt_hhamiltm1list" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenmt_hhamiltm1list_2"> <label class="custom-control-label" for="dacriasesmenmt_hhamiltm1list_2">Muntah</label>
                                                    </div>

                                                </div>
                                                <div class="col-md-2">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenmt_hhamiltm1list" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenmt_hhamiltm1list_3"> <label class="custom-control-label" for="dacriasesmenmt_hhamiltm1list_3">Pendarahan</label>
                                                    </div>

                                                </div>
                                                <div class="col-md-2">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenmt_hhamiltm1list" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenmt_hhamiltm1list_4"> <label class="custom-control-label" for="dacriasesmenmt_hhamiltm1list_4">Lain-Lain</label>
                                                    </div>
                                                    <div class="form-group row mb-0" id="dacriasesmenmt_div_hhamiltm1list4" style="display: none;">
                                                        <div class="col-md-1"></div>
                                                        <div class="col-md-10">
                                                            <input id="dacriasesmenmt_hhamiltm1listket4" name="dacriasesmenmt_hhamiltm1listket4" type="text" class="form-control" placeholder="Keterangan TM I (Lain-lain)">
                                                        </div>*
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenmt_hhamiltm1list" value="5" type="checkbox" class="custom-control-input" id="dacriasesmenmt_hhamiltm1list_5"> <label class="custom-control-label" for="dacriasesmenmt_hhamiltm1list_5">Tidak Ada Keluhan</label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0" style="padding-bottom: 3px; padding-top: 3px; border-bottom-style: solid; border-bottom-width: thin;">
                                            <div class="col-md-2">
                                                <label class="col-form-label" title="TM II">&nbsp;&nbsp;&nbsp;&nbsp;TM
                                                    II - III</label> <input type="hidden" id="dacriasesmenmt_hhamiltm2Id">
                                            </div>
                                            <div class="col-md-10 row" id="dacriasesmenmt_hhamiltm2list">
                                                <div class="col-md-2">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenmt_hhamiltm2list" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenmt_hhamiltm2list_1"> <label class="custom-control-label" for="dacriasesmenmt_hhamiltm2list_1">Pusing</label>
                                                    </div>

                                                </div>
                                                <div class="col-md-2">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenmt_hhamiltm2list" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenmt_hhamiltm2list_2"> <label class="custom-control-label" for="dacriasesmenmt_hhamiltm2list_2">Sakit Kepala</label>
                                                    </div>

                                                </div>
                                                <div class="col-md-2">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenmt_hhamiltm2list" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenmt_hhamiltm2list_3"> <label class="custom-control-label" for="dacriasesmenmt_hhamiltm2list_3">Pendarahan</label>
                                                    </div>

                                                </div>
                                                <div class="col-md-2">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenmt_hhamiltm2list" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenmt_hhamiltm2list_4"> <label class="custom-control-label" for="dacriasesmenmt_hhamiltm2list_4">Lain-Lain</label>
                                                    </div>
                                                    <div class="form-group row mb-0" id="dacriasesmenmt_div_hhamiltm2list4" style="display: none;">
                                                        <div class="col-md-1"></div>
                                                        <div class="col-md-10">
                                                            <input id="dacriasesmenmt_hhamiltm2listket4" name="dacriasesmenmt_hhamiltm2listket4" type="text" class="form-control" placeholder="Keterangan TM II (Lain-lain)">
                                                        </div>*
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenmt_hhamiltm2list" value="5" type="checkbox" class="custom-control-input" id="dacriasesmenmt_hhamiltm2list_5"> <label class="custom-control-label" for="dacriasesmenmt_hhamiltm2list_5">Tidak Ada Keluhan</label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-0" style="padding-bottom: 6px; padding-top: 3px; border-bottom-style: solid; border-bottom-width: thin;">
                                            <div class="col-md-2">
                                                <label class="col-form-label font-weight-bold" title="RIWAYAT GINEKOLOGI ">3. Riwayat Ginekologi </label> <input type="hidden" id="dacriasesmenmt_hginekologiId">
                                            </div>
                                            <div class="col-md-10 row" id="dacriasesmenmt_hginekologilist">
                                                <div class="col-md-2">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenmt_hginekologilist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenmt_hginekologilist_1"> <label class="custom-control-label" for="dacriasesmenmt_hginekologilist_1">Infertilitas</label>
                                                    </div>

                                                </div>
                                                <div class="col-md-2">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenmt_hginekologilist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenmt_hginekologilist_2"> <label class="custom-control-label" for="dacriasesmenmt_hginekologilist_2">Polip servix</label>
                                                    </div>

                                                </div>
                                                <div class="col-md-2">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenmt_hginekologilist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenmt_hginekologilist_3"> <label class="custom-control-label" for="dacriasesmenmt_hginekologilist_3">Tidak ada</label>
                                                    </div>

                                                </div>
                                                <div class="col-md-2">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenmt_hginekologilist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenmt_hginekologilist_4"> <label class="custom-control-label" for="dacriasesmenmt_hginekologilist_4">Cervisitis kronis</label>
                                                    </div>

                                                </div>
                                                <div class="col-md-2">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenmt_hginekologilist" value="5" type="checkbox" class="custom-control-input" id="dacriasesmenmt_hginekologilist_5"> <label class="custom-control-label" for="dacriasesmenmt_hginekologilist_5">Kanker kandungan</label>
                                                    </div>

                                                </div>
                                                <div class="col-md-2">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenmt_hginekologilist" value="6" type="checkbox" class="custom-control-input" id="dacriasesmenmt_hginekologilist_6"> <label class="custom-control-label" for="dacriasesmenmt_hginekologilist_6">PMS</label>
                                                    </div>

                                                </div>
                                                <div class="col-md-2">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenmt_hginekologilist" value="7" type="checkbox" class="custom-control-input" id="dacriasesmenmt_hginekologilist_7"> <label class="custom-control-label" for="dacriasesmenmt_hginekologilist_7">Operasi kandungan</label>
                                                    </div>

                                                </div>
                                                <div class="col-md-2">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenmt_hginekologilist" value="8" type="checkbox" class="custom-control-input" id="dacriasesmenmt_hginekologilist_8"> <label class="custom-control-label" for="dacriasesmenmt_hginekologilist_8">Endometriosis</label>
                                                    </div>

                                                </div>
                                                <div class="col-md-2">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenmt_hginekologilist" value="9" type="checkbox" class="custom-control-input" id="dacriasesmenmt_hginekologilist_9"> <label class="custom-control-label" for="dacriasesmenmt_hginekologilist_9">Myoma</label>
                                                    </div>

                                                </div>
                                                <div class="col-md-2">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenmt_hginekologilist" value="10" type="checkbox" class="custom-control-input" id="dacriasesmenmt_hginekologilist_10"> <label class="custom-control-label" for="dacriasesmenmt_hginekologilist_10">Kista</label>
                                                    </div>

                                                </div>
                                                <div class="col-md-2">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenmt_hginekologilist" value="11" type="checkbox" class="custom-control-input" id="dacriasesmenmt_hginekologilist_11"> <label class="custom-control-label" for="dacriasesmenmt_hginekologilist_11">Lain-Lain</label>
                                                    </div>
                                                    <div class="form-group row mb-0" id="dacriasesmenmt_div_hginekologilist11" style="display: none;">
                                                        <div class="col-md-1"></div>
                                                        <div class="col-md-10">
                                                            <input id="dacriasesmenmt_hginekologilistket11" name="dacriasesmenmt_hginekologilistket11" type="text" class="form-control" placeholder="Ginekologi (Lain-lain)">
                                                        </div>*
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-0" style="padding-top: 3px;">
                                            <div class="col-md-2">
                                                <label class="col-form-label font-weight-bold" title="RIWAYAT KB ">4. Riwayat KB </label> <input type="hidden" id="dacriasesmenmt_hriwayatkbId">
                                            </div>
                                            <div class="col-md-10 row" id="dacriasesmenmt_hriwayatkbpilihId">
                                                <div class="col-md-2">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenmt_hriwayatkbpilihId" value="1" type="radio" class="custom-control-input" id="dacriasesmenmt_hriwayatkbpilihId_1"> <label class="custom-control-label" for="dacriasesmenmt_hriwayatkbpilihId_1">Tidak</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenmt_hriwayatkbpilihId" value="2" type="radio" class="custom-control-input" id="dacriasesmenmt_hriwayatkbpilihId_2"> <label class="custom-control-label" for="dacriasesmenmt_hriwayatkbpilihId_2">Ya, Sebutkan</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="dacriasesmenmt_div_hriwayatkbpilihId2" style="display: none;">
                                            <label class="col-form-label font-weight-bold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Metode KB Yang Terakhir</label>
                                            <div class="form-group row" style="padding-bottom: 3px; padding-top: 3px;">
                                                <div class="col-md-2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jenis KB</div>
                                                <div class="col-md-10 row" id="dacriasesmenmt_hriwayatkblist">
                                                    <div class="col-md-2">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenmt_hriwayatkblist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenmt_hriwayatkblist_1"> <label class="custom-control-label" for="dacriasesmenmt_hriwayatkblist_1">IUD</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenmt_hriwayatkblist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenmt_hriwayatkblist_2"> <label class="custom-control-label" for="dacriasesmenmt_hriwayatkblist_2">Implant</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenmt_hriwayatkblist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenmt_hriwayatkblist_3"> <label class="custom-control-label" for="dacriasesmenmt_hriwayatkblist_3">Pil</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenmt_hriwayatkblist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenmt_hriwayatkblist_4"> <label class="custom-control-label" for="dacriasesmenmt_hriwayatkblist_4">Suntik</label>
                                                        </div>
                                                        <div class="row" id="dacriasesmenmt_div_hriwayatkblist4" style="display: none;">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">
                                                                <div class="row" id="dacriasesmenmt_hriwayatkblistket4">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                                <input name="dacriasesmenmt_hriwayatkblistket4" value="1" type="radio" class="custom-control-input" id="dacriasesmenmt_hriwayatkblistket4_1"> <label class="custom-control-label" for="dacriasesmenmt_hriwayatkblistket4_1">1 Bulan</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                                <input name="dacriasesmenmt_hriwayatkblistket4" value="2" type="radio" class="custom-control-input" id="dacriasesmenmt_hriwayatkblistket4_2"> <label class="custom-control-label" for="dacriasesmenmt_hriwayatkblistket4_2">3 Bulan</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenmt_hriwayatkblist" value="5" type="checkbox" class="custom-control-input" id="dacriasesmenmt_hriwayatkblist_5"> <label class="custom-control-label" for="dacriasesmenmt_hriwayatkblist_5">Kondom</label>
                                                        </div>


                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenmt_hriwayatkblist" value="6" type="checkbox" class="custom-control-input" id="dacriasesmenmt_hriwayatkblist_6"> <label class="custom-control-label" for="dacriasesmenmt_hriwayatkblist_6">MOW</label>
                                                        </div>


                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenmt_hriwayatkblist" value="7" type="checkbox" class="custom-control-input" id="dacriasesmenmt_hriwayatkblist_7"> <label class="custom-control-label" for="dacriasesmenmt_hriwayatkblist_7">MOP</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenmt_hriwayatkblist" value="8" type="checkbox" class="custom-control-input" id="dacriasesmenmt_hriwayatkblist_8"> <label class="custom-control-label" for="dacriasesmenmt_hriwayatkblist_8">Lain-lain</label>
                                                        </div>

                                                        <div class="form-group row" id="dacriasesmenmt_div_hriwayatkblist8" style="display: none;">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">
                                                                <input id="dacriasesmenmt_hriwayatkblistket8" name="dacriasesmenmt_hriwayatkblistket8" type="text" class="form-control" placeholder="KB (Lain-lain)">
                                                            </div>*
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lama
                                                </div>
                                                <div class="col-md-0">&nbsp;</div>
                                                <div class="col-md-2">
                                                    <div class="input-group">
                                                        <input type="number" class="form-control form-control-xs" id="dacriasesmenmt_hriwayatkblama">
                                                        <span class="input-group-append"> <span class="input-group-text form-control-xs">Tahun</span>
                                                        </span>
                                                    </div>
                                                    <!-- <input th:id="${ccm+'_hriwayatkblama'}"
											th:name="${ccm+'_hriwayatkblama'}" type="text"
											class="form-control" placeholder="Input lama"> -->
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group">
                                                        <input type="number" class="form-control form-control-xs" id="dacriasesmenmt_hriwayatkblamabulan">
                                                        <span class="input-group-append"> <span class="input-group-text form-control-xs">Bulan</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Komplikasi
                                                </div>
                                                <div class="col-md-10 row" id="dacriasesmenmt_hriwayatkbkomplikasilist">
                                                    <div class="col-md-2">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenmt_hriwayatkbkomplikasilist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenmt_hriwayatkbkomplikasilist_1"> <label class="custom-control-label" for="dacriasesmenmt_hriwayatkbkomplikasilist_1">TAK</label>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenmt_hriwayatkbkomplikasilist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenmt_hriwayatkbkomplikasilist_2"> <label class="custom-control-label" for="dacriasesmenmt_hriwayatkbkomplikasilist_2">Perdarahan</label>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenmt_hriwayatkbkomplikasilist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenmt_hriwayatkbkomplikasilist_3"> <label class="custom-control-label" for="dacriasesmenmt_hriwayatkbkomplikasilist_3">PID / Radang Panggul</label>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenmt_hriwayatkbkomplikasilist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenmt_hriwayatkbkomplikasilist_4"> <label class="custom-control-label" for="dacriasesmenmt_hriwayatkbkomplikasilist_4">Lain - Lain</label>
                                                        </div>
                                                        <div class="row" id="dacriasesmenmt_div_hriwayatkbkomplikasilist4" style="display: none;">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">
                                                                <input id="dacriasesmenmt_hriwayatkbkomplikasilistket4" name="dacriasesmenmt_hriwayatkbkomplikasilistket4" type="text" class="form-control" placeholder="Komplikasi Lain-lain">
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
                </div>
                <div class="card card-default" id="">
                    <div class="card-header" style="background-color:black;">
                        <h3 class="card-title" style="color:white;">SKRINING STATUS FUNGSIONAL</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                    <i class="fas fa-times"></i>
                                                </button> -->
                        </div>
                    </div>
                    <div class="col-lg-12 row">
                        <div class="card-body">
                            <div class="row ">
                                <div class="col-md-12">
                                    <label class="col-form-label font-italic">* Isilah dan lengkapilah penilaian Barthel Index dan tentukan tingkat ketergantungan pasien berdasarkan skor, (untuk pasien anak usia ≥ 12 – 18 tahun ), untuk pasien &lt;12 tahun hasil skrining otomatis PERLU BANTUAN BERAT</label>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-12 row d-flex justify-content-center">
                                    <h5><label class="col-form-label font-weight-bold">BARTHEL INDEKS</label></h5>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="table-responsive">
                                    <table class="table table-sm table-bordered newtable" width=" 100%">
                                        <tbody>
                                            <tr class="">
                                                <td width="40%" style="padding:0px;">
                                                    <div class="row d-flex justify-content-center">
                                                        <b><label class="col-form-label">INDIKATOR</label></b>
                                                    </div>
                                                </td>
                                                <td width="10%" style="padding:0px;">
                                                    <div class="row d-flex justify-content-center">
                                                        <b><label class="col-form-label">SKOR</label></b>
                                                    </div>
                                                </td>
                                                <td width="40%" style="padding:0px;">
                                                    <div class="row d-flex justify-content-center">
                                                        <b><label class="col-form-label">INDIKATOR</label></b>
                                                    </div>
                                                </td>
                                                <td width="10%" style="padding:0px;">
                                                    <div class="row d-flex justify-content-center">
                                                        <b><label class="col-form-label">SKOR</label></b>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="40%" style="padding:0px;">
                                                    <b>Mengendalikan Rangsang Buang Air ( BAB)</label></b>
                                                    <table class="table table-borderless table-hover" width="100%">
                                                        <tbody>
                                                            <tr onclick="dacriasesmenmtex(0, 1);">
                                                                <td width="100%" style="padding:0;">
                                                                    0 = Tidak Terkendali / Tidak Teratur (Perlu Pencahar)
                                                                </td>
                                                            </tr>
                                                            <tr onclick="dacriasesmenmtex(1, 1);">
                                                                <td style="padding:0;">
                                                                    1 = Kadang-Kadang Tidak Terkendali(Satu Kali/Minggu)
                                                                </td>
                                                            </tr>
                                                            <tr onclick="dacriasesmenmtex(2, 1);">
                                                                <td style="padding:0;">
                                                                    2 = Mandiri/Mampu Mengendalikan
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td class="text-center" width="10%">
                                                    <input type="text" class="form-control" id="skordacriasesmenmtexSatu" style="text-align:center; font-size: 40px" value="0" disabled>
                                                </td>
                                                <td width="40%" style="padding:0px;">
                                                    <b>Berubah sikap dari berbaring ke duduk</label></b>
                                                    <table class="table table-borderless table-hover" width="100%">
                                                        <tbody>
                                                            <tr onclick="dacriasesmenmtex(0, 2);">
                                                                <td width="100%" style="padding:0;">
                                                                    0 = Tidak Mampu Duduk Seimbang
                                                                </td>
                                                            </tr>
                                                            <tr onclick="dacriasesmenmtex(1, 2);">
                                                                <td style="padding:0;">
                                                                    1 = Perlu Banyak Bantuan Untuk Bisa Duduk (2 Orang)
                                                                </td>
                                                            </tr>
                                                            <tr onclick="dacriasesmenmtex(2, 2);">
                                                                <td style="padding:0;">
                                                                    2 = Bantuan Sedikit (Verbal Dan Fisik)
                                                                </td>
                                                            </tr>
                                                            <tr onclick="dacriasesmenmtex(3, 2);">
                                                                <td style="padding:0;">
                                                                    3 = Mandiri
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td class="text-center" width="10%">
                                                    <input type="text" class="form-control" id="skordacriasesmenmtexDua" style="text-align:center; font-size: 40px" value="0" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="40%" style="padding:0px;">
                                                    <b>Mengendalikan Rangsang Buang Air kecil ( BAK)</label></b>
                                                    <table class="table-borderless table-condensed table-hover" width="100%">
                                                        <tbody>
                                                            <tr onclick="dacriasesmenmtex(0, 3);">
                                                                <td width="100%" style="padding:0;">
                                                                    0=Tidak Terkendali / Pakai Kateter Dan Tidak Mampu Mengendalikan
                                                                </td>
                                                            </tr>
                                                            <tr onclick="dacriasesmenmtex(1, 3);">
                                                                <td style="padding:0;">
                                                                    1 = Kadang – Kadang Tidak Terkendali(1x 24 Jam)
                                                                </td>
                                                            </tr>
                                                            <tr onclick="dacriasesmenmtex(2, 3);">
                                                                <td style="padding:0;">
                                                                    2 = Mandiri
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td class="text-center" width="10%">
                                                    <input type="text" class="form-control" id="skordacriasesmenmtexTiga" style="text-align:center; font-size: 40px" value="0" disabled>
                                                </td>
                                                <td width="40%" style="padding:0px;">
                                                    <b>Berpindah / Berjalan</label></b>
                                                    <table class="table-borderless table-condensed table-hover" width="100%">
                                                        <tbody>
                                                            <tr onclick="dacriasesmenmtex(0, 4);">
                                                                <td width="100%" style="padding:0;">
                                                                    0 = Tidak Mampu
                                                                </td>
                                                            </tr>
                                                            <tr onclick="dacriasesmenmtex(1, 4);">
                                                                <td style="padding:0;">
                                                                    1 = Bisa (Pindah) Dengan Kursi Roda
                                                                </td>
                                                            </tr>
                                                            <tr onclick="dacriasesmenmtex(2, 4);">
                                                                <td style="padding:0;">
                                                                    2 = Berjalan Dengan Bantuan 1 Orang
                                                                </td>
                                                            </tr>
                                                            <tr onclick="dacriasesmenmtex(3, 4);">
                                                                <td style="padding:0;">
                                                                    3 = Mandiri
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td class="text-center" width="10%">
                                                    <input type="text" class="form-control" id="skordacriasesmenmtexEmpat" style="text-align:center; font-size: 40px" value="0" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="40%" style="padding:0px;">
                                                    <b>Membersihkan diri (cuci muka, sisir rambut, sikat gigi)</b>
                                                    <table class="table-borderless table-condensed table-hover" width="100%">
                                                        <tbody>
                                                            <tr onclick="dacriasesmenmtex(0, 5);">
                                                                <td width="100%" style="padding:0;">
                                                                    0 = Butuh Pertolongan Orang Lain
                                                                </td>
                                                            </tr>
                                                            <tr onclick="dacriasesmenmtex(1, 5);">
                                                                <td style="padding:0;">
                                                                    1 = Mandiri
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td class="text-center" width="10%">
                                                    <input type="text" class="form-control" id="skordacriasesmenmtexLima" style="text-align:center; font-size: 40px" value="0" disabled>
                                                </td>
                                                <td width="40%" style="padding:0px;">
                                                    <b>Memakai Baju</b>
                                                    <table class="table-borderless table-condensed table-hover" width="100%">
                                                        <tbody>
                                                            <tr onclick="dacriasesmenmtex(0, 6);">
                                                                <td width="100%" style="padding:0;">
                                                                    0 = Tergantung Orang Lain
                                                                </td>
                                                            </tr>
                                                            <tr onclick="dacriasesmenmtex(1, 6);">
                                                                <td style="padding:0;">
                                                                    1 = Sebagian Dibantu (Misalnya Mengancing Baju)
                                                                </td>
                                                            </tr>
                                                            <tr onclick="dacriasesmenmtex(2, 6);">
                                                                <td style="padding:0;">
                                                                    2 = Mandiri
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td class="text-center" width="10%">
                                                    <input type="text" class="form-control" id="skordacriasesmenmtexEnam" style="text-align:center; font-size: 40px" value="0" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="40%" style="padding:0px;">
                                                    <b>Penggunaan toilet masuk dan keluar (melepaskan, memakai celana, membersihkan, menyiram)</b>
                                                    <table class="table-borderless table-condensed table-hover" width="100%">
                                                        <tbody>
                                                            <tr onclick="dacriasesmenmtex(0, 7);">
                                                                <td width="100%" style="padding:0;">
                                                                    0 = Tergantung Pertolongan Orang Lain
                                                                </td>
                                                            </tr>
                                                            <tr onclick="dacriasesmenmtex(1, 7);">
                                                                <td style="padding:0;">
                                                                    1 = Perlu Pertolongan Pada Beberapa Kegiatan Tetapi Dapat Mengerjakan Sendiri Kegiatan Yang Lain
                                                                </td>
                                                            </tr>
                                                            <tr onclick="dacriasesmenmtex(2, 7);">
                                                                <td style="padding:0;">
                                                                    2 = Mandiri (Masuk Dan Keluar, Berpakaian Dan Membersihkan Diri)
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td class="text-center" width="10%">
                                                    <input type="text" class="form-control" id="skordacriasesmenmtexTujuh" style="text-align:center; font-size: 40px" value="0" disabled>
                                                </td>
                                                <td width="40%" style="padding:0px;">
                                                    <b>Naik Turun Tangga</b>
                                                    <table class="table-borderless table-condensed table-hover" width="100%">
                                                        <tbody>
                                                            <tr onclick="dacriasesmenmtex(0, 8);">
                                                                <td width="100%" style="padding:0;">
                                                                    0 = Tidak Mampu
                                                                </td>
                                                            </tr>
                                                            <tr onclick="dacriasesmenmtex(1, 8);">
                                                                <td style="padding:0;">
                                                                    1 = Butuh Pertolongan
                                                                </td>
                                                            </tr>
                                                            <tr onclick="dacriasesmenmtex(2, 8);">
                                                                <td style="padding:0;">
                                                                    2 = Mandiri
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td class="text-center" width="10%">
                                                    <input type="text" class="form-control" id="skordacriasesmenmtexDelapan" style="text-align:center; font-size: 40px" value="0" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="40%" style="padding:0px;">
                                                    <b>Makan</b>
                                                    <table class="table-borderless table-condensed table-hover" width="100%">
                                                        <tbody>
                                                            <tr onclick="dacriasesmenmtex(0, 9);">
                                                                <td width="100%" style="padding:0;">
                                                                    0 = Tidak Mampu
                                                                </td>
                                                            </tr>
                                                            <tr onclick="dacriasesmenmtex(1, 9);">
                                                                <td style="padding:0;">
                                                                    1 = Perlu Ditolong Memotong Makanan
                                                                </td>
                                                            </tr>
                                                            <tr onclick="dacriasesmenmtex(2, 9);">
                                                                <td style="padding:0;">
                                                                    2 = Mandiri
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td class="text-center" width="10%">
                                                    <input type="text" class="form-control" id="skordacriasesmenmtexSembilan" style="text-align:center; font-size: 40px" value="0" disabled>
                                                </td>
                                                <td width="40%" style="padding:0px;">
                                                    <b>Mandi</b>
                                                    <table class="table-borderless table-condensed table-hover" width="100%">
                                                        <tbody>
                                                            <tr onclick="dacriasesmenmtex(0, 10);">
                                                                <td width="100%" style="padding:0;">
                                                                    0 = Tergantung Orang Lain
                                                                </td>
                                                            </tr>
                                                            <tr onclick="dacriasesmenmtex(1, 10);">
                                                                <td style="padding:0;">
                                                                    1 = Mandiri
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td width="10%" style="padding:0px;">
                                                    <input type="text" class="form-control" id="skordacriasesmenmtexSepuluh" style="text-align:center; font-size: 40px" value="0" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="40%" style="padding:10px;" colspan="4">
                                                    <h5>Total Skor : </label>
                                                        <input type="text" class="form-control" id="dacriasesmenmt_lbathelskor" style="text-align:center; font-size: 40px" value="0" disabled></h5>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-12" id="dacriasesmenmt_lfungsionalId">
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input name="dacriasesmenmt_lfungsionalId" value="1" type="radio" class="custom-control-input" id="dacriasesmenmt_lfungsionalId_1" disabled>
                                        <label class="custom-control-label" for="dacriasesmenmt_lfungsionalId_1">Mandiri (Skor 20)</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input name="dacriasesmenmt_lfungsionalId" value="2" type="radio" class="custom-control-input" id="dacriasesmenmt_lfungsionalId_2" disabled>
                                        <label class="custom-control-label" for="dacriasesmenmt_lfungsionalId_2">Perlu bantuan Ringan (12 – 19)</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input name="dacriasesmenmt_lfungsionalId" value="3" type="radio" class="custom-control-input" id="dacriasesmenmt_lfungsionalId_3" disabled>
                                        <label class="custom-control-label" for="dacriasesmenmt_lfungsionalId_3">Perlu bantuan Sedang (9-11)</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input name="dacriasesmenmt_lfungsionalId" value="4" type="radio" class="custom-control-input" id="dacriasesmenmt_lfungsionalId_4" disabled>
                                        <label class="custom-control-label" for="dacriasesmenmt_lfungsionalId_4">Perlu bantuan berat (5-8)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-4">
                                    <button class="btn btn-sm btn-primary btn-xs" onclick="simpan_dacriasesmenmtex()"><i class="fas fa-save"></i> Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#dacriasesmenmt_hriwayatkbpilihId_1').change(function() {
        var checkBox = document.getElementById("dacriasesmenmt_hriwayatkbpilihId_2");
        if (checkBox.checked == false) {
            document.getElementById("dacriasesmenmt_div_hriwayatkbpilihId2").style.display = 'none';
        }
    });
    $('#dacriasesmenmt_hriwayatkbpilihId_2').change(function() {
        var checkBox = document.getElementById("dacriasesmenmt_hriwayatkbpilihId_2");
        if (checkBox.checked == true) {
            document.getElementById("dacriasesmenmt_div_hriwayatkbpilihId2").style.display = 'block';
        }
    });

    function dacriasesmenmtex(a, b) {
        switch (b) {
            case 1:
                document.getElementById('skordacriasesmenmtexSatu').value = a;
                break;
            case 2:
                document.getElementById('skordacriasesmenmtexDua').value = a;
                break;
            case 3:
                document.getElementById('skordacriasesmenmtexTiga').value = a;
                break;
            case 4:
                document.getElementById('skordacriasesmenmtexEmpat').value = a;
                break;
            case 5:
                document.getElementById('skordacriasesmenmtexLima').value = a;
                break;
            case 6:
                document.getElementById('skordacriasesmenmtexEnam').value = a;
                break;
            case 7:
                document.getElementById('skordacriasesmenmtexTujuh').value = a;
                break;
            case 8:
                document.getElementById('skordacriasesmenmtexDelapan').value = a;
                break;
            case 9:
                document.getElementById('skordacriasesmenmtexSembilan').value = a;
                break;
            case 10:
                document.getElementById('skordacriasesmenmtexSepuluh').value = a;
                break;
            default:
        }
        hitung_dacriasesmenmtex()
    }

    function hitung_dacriasesmenmtex() {
        a = document.getElementById('skordacriasesmenmtexSatu').value;
        b = document.getElementById('skordacriasesmenmtexDua').value;
        c = document.getElementById('skordacriasesmenmtexTiga').value;
        d = document.getElementById('skordacriasesmenmtexEmpat').value;
        e = document.getElementById('skordacriasesmenmtexLima').value;
        f = document.getElementById('skordacriasesmenmtexEnam').value;
        g = document.getElementById('skordacriasesmenmtexTujuh').value;
        h = document.getElementById('skordacriasesmenmtexDelapan').value;
        i = document.getElementById('skordacriasesmenmtexSembilan').value;
        j = document.getElementById('skordacriasesmenmtexSepuluh').value;
        total = parseInt(a) + parseInt(b) + parseInt(c) + parseInt(d) + parseInt(e) + parseInt(f) + parseInt(g) + parseInt(h) + parseInt(i) + parseInt(j)
        document.getElementById('dacriasesmenmt_lbathelskor').value = total;

        if (total == 20) {
            document.getElementById('dacriasesmenmt_lfungsionalId_1').checked = true;
        } else if (total >= 12 && total <= 19) {
            document.getElementById('dacriasesmenmt_lfungsionalId_2').checked = true;
        } else if (total >= 9 && total <= 11) {
            document.getElementById('dacriasesmenmt_lfungsionalId_3').checked = true;
        } else if (total >= 5 && total <= 8) {
            document.getElementById('dacriasesmenmt_lfungsionalId_4').checked = true;
        } else {
            document.getElementById('dacriasesmenmt_lfungsionalId_1').checked = false;
            document.getElementById('dacriasesmenmt_lfungsionalId_2').checked = false;
            document.getElementById('dacriasesmenmt_lfungsionalId_3').checked = false;
            document.getElementById('dacriasesmenmt_lfungsionalId_4').checked = false;
        }
    }

    function simpan_dacriasesmenmtex() {
        var params = {};
        params.dacriasesmenmt_hhamiltm1list = [];
        $("input:checkbox[name=dacriasesmenmt_hhamiltm1list]:checked").each(function() {
            params.dacriasesmenmt_hhamiltm1list.push($(this).val());
        });
        params.dacriasesmenmt_hhamiltm2list = [];
        $("input:checkbox[name=dacriasesmenmt_hhamiltm2list]:checked").each(function() {
            params.dacriasesmenmt_hhamiltm2list.push($(this).val());
        });
        params.dacriasesmenmt_hginekologilist = [];
        $("input:checkbox[name=dacriasesmenmt_hginekologilist]:checked").each(function() {
            params.dacriasesmenmt_hginekologilist.push($(this).val());
        });
        params.dacriasesmenmt_hriwayatkblist = [];
        $("input:checkbox[name=dacriasesmenmt_hriwayatkblist]:checked").each(function() {
            params.dacriasesmenmt_hriwayatkblist.push($(this).val());
        });
        params.dacriasesmenmt_hriwayatkbkomplikasilist = [];
        $("input:checkbox[name=dacriasesmenmt_hriwayatkbkomplikasilist]:checked").each(function() {
            params.dacriasesmenmt_hriwayatkbkomplikasilist.push($(this).val());
        });

        form = document.getElementById('formAssesmenetObgyn');
        var checked = form.querySelector("input[type=radio]:checked");
        if (!checked) {
            toastr.error("Inputan Masih Kosong!!");
        } else {
            param = {
                htglhpht: document.getElementById('dacriasesmenmt_htglhpht').value,
                htglsalin: document.getElementById('dacriasesmenmt_htglsalin').value,
                htglmens: document.getElementById('dacriasesmenmt_htglmens').value,
                umurenarche: document.getElementById('dacriasesmenmt_hmenarche').value,
                jmldarahhaid: document.getElementById('dacriasesmenmt_hdarahhaid').value,
                hsiklushaid: document.getElementById('dacriasesmenmt_hsiklushaid').value,
                hlamahaid: document.getElementById('dacriasesmenmt_hlamahaid').value,
                hdesminore: document.querySelector('input[name=dacriasesmenmt_hdesminore]:checked').value,
                // hdesminore_2: document.getElementById('dacriasesmenmt_hdesminore_2').value,
                hkawin: document.getElementById('dacriasesmenmt_hkawin').value,
                hkawin1usia: document.getElementById('dacriasesmenmt_hkawin1usia').value,
                husiasuami1: document.getElementById('dacriasesmenmt_husiasuami1').value,
                hkawin2usia: document.getElementById('dacriasesmenmt_hkawin2usia').value,
                husiasuami2: document.getElementById('dacriasesmenmt_husiasuami2').value,
                hobstetrikg: document.getElementById('dacriasesmenmt_hobstetrikg').value,
                hobstetrikp: document.getElementById('dacriasesmenmt_hobstetrikp').value,
                hobstetrika: document.getElementById('dacriasesmenmt_hobstetrika').value,
                hriwayatkblama: document.querySelector('input[name=dacriasesmenmt_hriwayatkbpilihId]:checked').value,
                hriwayatkblamabulan: document.getElementById('dacriasesmenmt_hriwayatkblamabulan').value,
                hhamiltm1list: params.dacriasesmenmt_hhamiltm1list,
                hhamiltm2list: params.dacriasesmenmt_hhamiltm2list,
                hginekologilist: params.dacriasesmenmt_hginekologilist,
                hriwayatkblist: params.dacriasesmenmt_hriwayatkblist,
                hriwayatkbkomplikasilist: params.dacriasesmenmt_hriwayatkbkomplikasilist
            }
            apiPOST('Assesmentbos/simpan_Assesment_Obgyn', param, hasil => {
                console.log(hasil['X'])
            })
        }
    }
</script>