<!-- <style>
    table,
    tbody,
    tr,
    td {
        cursor: pointer;
        border: 1px solid black;
        border-collapse: collapse;
    }
</style> -->
<div class="card-body p-2 darkgrey-custom" id="divassesmenAnak">
    <div id="div2assesmenanak" class="rapet">
        <div class="card"><!-- TITLE -->
            <div class="col-md-12">
                <div class="row d-flex justify-content-center">
                    <h4><b><label class="col-form-label">Assesmen RI Anak</label></b></h4>
                </div>
            </div>
        </div>
        <div class="card ">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="col-form-label">ID</label>
                            </div>
                            <div class="col-md-2">
                                <input id="dacriasesmenanak_id" name="id" type="text" class="form-control" readonly="readonly">
                            </div>
                            <div class="col-md-6">
                                <b><i><label class="col-form-label">Note : Yang Bertanda Bintang (*) wajib di isi !! </label></i></b>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4  text-truncate">
                                <label class="col-form-label">Tanggal (Tiba Di Ruangan)</label>
                            </div>
                            <div class="col-md-5">
                                <input type="date" id="dacriasesmenanak_datgl" class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="col-form-label">PPJA / BPJA</label>
                            </div>
                            <div class="col-md-7">
                                <select id="dacriasesmenanak_apjId" name="apjId" class="form-control form-control-sm">
                                </select>
                            </div>
                            <div class="col-md-1">
                                <button id="dacriasesmenanak_btpjdef" class="btn btn-sm btn-primary d-none" type="button" title="Default PJ">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card ">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row" style="padding-bottom: 3px; padding-top: 3px; border-bottom-style: solid; border-bottom-width: thin;">
                            <div class="col-md-2">
                                <label class="col-form-label">Sumber Informasi </label>
                            </div>
                            <div class="col-md-10">
                                <div class="row" id="dacriasesmenanak_bsumberlist">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline" id="dacriasesmenanak_bsumberlistdiv_1">
                                                <input name="dacriasesmenanak_bsumberlist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenanak_bsumberlist_1" onclick="document.getElementById('dacriasesmenanak_bsumberlistdiv_3').style.display='none'"> <label class="custom-control-label" for="dacriasesmenanak_bsumberlist_1">Pasien</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline" id="dacriasesmenanak_bsumberlistdiv_2">
                                                <input name="dacriasesmenanak_bsumberlist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenanak_bsumberlist_2" onclick="document.getElementById('dacriasesmenanak_bsumberlistdiv_3').style.display='block'"> <label class="custom-control-label" for="dacriasesmenanak_bsumberlist_2">Keluarga/Orang lain</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline" id="dacriasesmenanak_bsumberlistdiv_3" style="display: none;">
                                                <input name="dacriasesmenanak_bsumberlist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenanak_bsumberlist_3" onclick="document.getElementById('dacriasesmenanak_div_bsumberlist3').style.display='block'"> <label class=" custom-control-label" for="dacriasesmenanak_bsumberlist_3">Hub dengan pasien</label>
                                            </div>
                                            <div class="row" id="dacriasesmenanak_div_bsumberlist3" style="display: none;">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10">
                                                    <input type="text" name="dacriasesmenanak_bsumberlistket3" id="dacriasesmenanak_bsumberlistket3" style="width: 100%;" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row" style="padding-bottom: 3px; padding-top: 3px; border-bottom-style: solid; border-bottom-width: thin;">
                            <div class="col-md-2">
                                <label class="col-form-label">Cara Masuk</label>
                            </div>
                            <div class="col-md-10">
                                <div class="row" id="dacriasesmenanak_bmasukId">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmenanak_bmasukId" value="1" type="radio" class="custom-control-input" id="dacriasesmenanak_bmasukId_1" onclick="document.getElementById('dacriasesmenanak_div_bmasukId5').style.display='none';"> <label class="custom-control-label" for="dacriasesmenanak_bmasukId_1">Jalan tanpa bantuan</label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmenanak_bmasukId" value="2" type="radio" class="custom-control-input" id="dacriasesmenanak_bmasukId_2" onclick="document.getElementById('dacriasesmenanak_div_bmasukId5').style.display='none';"> <label class="custom-control-label" for="dacriasesmenanak_bmasukId_2">Jalan dengan bantuan</label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmenanak_bmasukId" value="3" type="radio" class="custom-control-input" id="dacriasesmenanak_bmasukId_3" onclick="document.getElementById('dacriasesmenanak_div_bmasukId5').style.display='none';"> <label class="custom-control-label" for="dacriasesmenanak_bmasukId_3">Kursi roda</label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmenanak_bmasukId" value="4" type="radio" class="custom-control-input" id="dacriasesmenanak_bmasukId_4" onclick="document.getElementById('dacriasesmenanak_div_bmasukId5').style.display='none';"> <label class="custom-control-label" for="dacriasesmenanak_bmasukId_4">Brancart</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmenanak_bmasukId" value="5" type="radio" class="custom-control-input" id="dacriasesmenanak_bmasukId_5" onclick="document.getElementById('dacriasesmenanak_div_bmasukId5').style.display='block';"> <label class="custom-control-label" for="dacriasesmenanak_bmasukId_5">Lain-lain</label>
                                            </div>
                                            <div class="row" id="dacriasesmenanak_div_bmasukId5" style="display:none;">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10">
                                                    <input type="text" name="dacriasesmenanak_bmasuklain" id="dacriasesmenanak_bmasuklain" style="width: 100%;" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row" style="padding-top: 3px;">
                            <div class="col-md-2">
                                <label class="col-form-label">Asal Masuk</label>
                            </div>
                            <div class="col-md-10">
                                <div class="row" id="dacriasesmenanak_basalId">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmenanak_basalId" value="1" type="radio" class="custom-control-input" id="dacriasesmenanak_basalId_1" onclick="document.getElementById('dacriasesmenanak_div_basalId6').style.display='none';document.getElementById('dacriasesmenanak_div_basalId2').style.display='none';"> <label class="custom-control-label" for="dacriasesmenanak_basalId_1">IGD</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmenanak_basalId" value="2" type="radio" class="custom-control-input" id="dacriasesmenanak_basalId_2" onclick="document.getElementById('dacriasesmenanak_div_basalId6').style.display='none';document.getElementById('dacriasesmenanak_div_basalId2').style.display='block';"> <label class="custom-control-label" for="dacriasesmenanak_basalId_2">Poliklinik</label>
                                            </div>
                                            <div class="row" id="dacriasesmenanak_div_basalId2" style="display: none;">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10">
                                                    <input type="text" name="dacriasesmenanak_basalpoli" id="dacriasesmenanak_basalpoli" style="width: 100%;" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmenanak_basalId" value="3" type="radio" class="custom-control-input" id="dacriasesmenanak_basalId_3" onclick="document.getElementById('dacriasesmenanak_div_basalId6').style.display='none';document.getElementById('dacriasesmenanak_div_basalId2').style.display='none';"> <label class="custom-control-label" for="dacriasesmenanak_basalId_3">Kamar Bersalin</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmenanak_basalId" value="4" type="radio" class="custom-control-input" id="dacriasesmenanak_basalId_4" onclick="document.getElementById('dacriasesmenanak_div_basalId6').style.display='none';document.getElementById('dacriasesmenanak_div_basalId2').style.display='none';"> <label class="custom-control-label" for="dacriasesmenanak_basalId_4">ICU</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmenanak_basalId" value="5" type="radio" class="custom-control-input" id="dacriasesmenanak_basalId_5" onclick="document.getElementById('dacriasesmenanak_div_basalId6').style.display='none';document.getElementById('dacriasesmenanak_div_basalId2').style.display='none';"> <label class="custom-control-label" for="dacriasesmenanak_basalId_5">Kamar Operasi </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmenanak_basalId" value="6" type="radio" class="custom-control-input" id="dacriasesmenanak_basalId_6" onclick="document.getElementById('dacriasesmenanak_div_basalId6').style.display='block';document.getElementById('dacriasesmenanak_div_basalId2').style.display='none';"> <label class="custom-control-label" for="dacriasesmenanak_basalId_6">Lain-lain</label>
                                            </div>

                                            <div class="row" id="dacriasesmenanak_div_basalId6" style="display: none;">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10">
                                                    <input type="text" name="dacriasesmenanak_basallain" id="dacriasesmenanak_basallain" style="width: 100%;" class="form-control">
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
        <div class="card card-default">
            <div class="card-header" style="background-color:black;">
                <h3 class="card-title" style="color:white;">RIWAYAT BIOPSIKOSOSIAL, KULTURAL, SPIRITUAL &amp; EKONOMI</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <div class="form-group row" style="padding-bottom: 3px; padding-top: 3px; border-bottom-style: solid; border-bottom-width: thin;">
                            <div class="col-md-4">
                                <label class="form-label">Pekerjaan :</label>
                            </div>
                            <div class="col-md-6">
                                <select class="form-control form-control-xs" id="AgamaAssanakRI">

                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Agama :</label>

                            </div>
                            <div class="col-md-6">
                                <select class="form-control form-control-xs" id="pekerjaanAssanakRI">

                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Tinggal Bersama :</label>
                            </div>
                            <div class="col-md-6">
                                <select class="form-control form-control-xs" id="TinggalBersamaAssanakRI">
                                    <option value="1">Suami/Istri</option>
                                    <option value="2">Orang Tua</option>
                                    <option value="3">Anak</option>
                                    <option value="4">Lain-Lain</option>
                                    <option value="5">Tinggal Sendiri</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Status Mental :</label>
                            </div>
                            <div class="col-md-6">
                                <select class="form-control form-control-xs" id="StatusMentalAssanakRI">
                                    <option value="1">Orientasi Baik</option>
                                    <option value="2">Agitasi</option>
                                    <option value="3">Menyerang</option>
                                    <option value="4">Tidak Ada Respon</option>
                                    <option value="5">Lain-Lain</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Status Psikologis :</label>
                            </div>
                            <div class="col-md-6">
                                <select class="form-control form-control-xs" id="StatusPsikoAssanakRI">
                                    <option value="1">Kooperatif</option>
                                    <option value="2">Disorientasi</option>
                                    <option value="3">Tenang</option>
                                    <option value="4">Hiperaktif</option>
                                    <option value="5">Cemas</option>
                                    <option value="6">Kecenderungan Bunuh Diri</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Penggunaan Restrain :</label>
                            </div>
                            <div class="col-md-6">
                                <select class="form-control form-control-xs" id="RestrainAssanakRI" onchange="tampilasalanrestrain()">
                                    <option value="1">Tidak</option>
                                    <option value="2">Ya, Alasan</option>
                                </select>
                                <div style="display: none;" id="DivalasanRestrainAssanakRI">
                                    <input type="text" class="form-control form-control-xs" name="alasanRestrainAssanakRI">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Budaya Yang Dianut :</label>
                            </div>
                            <div class="col-md-6">
                                <select class="form-control form-control-xs" id="BudayaAssanakRI" onchange="tampilBudayaAnut()">
                                    <option value="1">Tidak</option>
                                    <option value="2">Ya</option>
                                </select>
                                <div style="display: none;" id="DivKetBudayaAssanakRI">
                                    <input type="text" class="form-control form-control-xs" name="KetBudayaAssanakRI">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <div class="form-group row" style="padding-bottom: 3px; padding-top: 3px; border-bottom-style: solid; border-bottom-width: thin;">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <label class="col-form-label"> Riwayat Menstruasi</label>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row" id="dacriasesmenanak_hmensId">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenanak_hmensId" value="1" type="radio" class="custom-control-input" id="dacriasesmenanak_hmensId_1"> <label class="custom-control-label" for="dacriasesmenanak_hmensId_1">Belum/Tidak Menstruasi</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenanak_hmensId" value="2" type="radio" class="custom-control-input" id="dacriasesmenanak_hmensId_2"> <label class="custom-control-label" for="dacriasesmenanak_hmensId_2">Sudah Menstruasi</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" id="dacriasesmenanak_div_hmensId2" style="display:none;">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <label class="col-form-label"> Umur Menarche</label>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="input-group input-group-sm">
                                                            <input type="number" onfocus="this.select();" class="form-control form-control-sm" id="dacriasesmenanak_hmenarche">
                                                            <span class="input-group-append"> <span class="input-group-text ">Tahun</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <label class="col-form-label" title="HPHT">HPHT</label>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="input-group date" id="dacriasesmenanak_dhtglhpht" data-target-input="nearest">
                                                        <input id="dacriasesmenanak_htglhpht" name="htglhpht" type="date" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                Siklus Haid</label>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="input-group input-group-sm">
                                                    <input type="number" onfocus="this.select();" class="form-control form-control-sm" id="dacriasesmenanak_hsiklushaid">
                                                    <span class="input-group-append"> <span class="input-group-text">Hari</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-4"><label class="col-form-label" title="Taksiran Persalinan">Perkiraan Menstruasi
                                        Berikutnya</label>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="input-group input-group-sm" id="dacriasesmenanak_dhtglmens">
                                            <input id="dacriasesmenanak_htglmens" name="htglmens" type="date" class="form-control form-control-sm">
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
<div class="form-group row">
    <div class="col-md-12">
        <div class="form-group row">
            <div class="col-md-2">
                <label class="col-form-label"> Riwayat Kehamilan Ibu</label>
            </div>
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-2">
        <label class="col-form-label"> Perawatan Antenatal</label>
    </div>
    <div class="col-md-10">
        <div class="row" id="dacriasesmenanak_hantenatalId">
            <div class="col-md-2">
                <div class="form-group">
                    <div class="row custom-control custom-checkbox custom-control-inline">
                        <input name="dacriasesmenanak_hantenatalId" value="1" type="radio" class="custom-control-input" id="dacriasesmenanak_hantenatalId_1"> <label class="custom-control-label" for="dacriasesmenanak_hantenatalId_1">Rutin</label>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <div class="row custom-control custom-checkbox custom-control-inline">
                        <input name="dacriasesmenanak_hantenatalId" value="2" type="radio" class="custom-control-input" id="dacriasesmenanak_hantenatalId_2"> <label class="custom-control-label" for="dacriasesmenanak_hantenatalId_2">Tidak Rutin</label>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <div class="row custom-control custom-checkbox custom-control-inline">
                        <input name="dacriasesmenanak_hantenatalId" value="3" type="radio" class="custom-control-input" id="dacriasesmenanak_hantenatalId_3"> <label class="custom-control-label" for="dacriasesmenanak_hantenatalId_3">Tidak Pernah</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-2">
        <label class="col-form-label"> Penyakit Kehamilan</label>
    </div>
    <div class="col-md-10">
        <div class="row" id="dacriasesmenanak_hsakithamilId">
            <div class="col-md-2">
                <div class="form-group">
                    <div class="row custom-control custom-checkbox custom-control-inline">
                        <input name="dacriasesmenanak_hsakithamilId" value="1" type="radio" class="custom-control-input" id="dacriasesmenanak_hsakithamilId_1"> <label class="custom-control-label" for="dacriasesmenanak_hsakithamilId_1">Tidak</label>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <div class="row custom-control custom-checkbox custom-control-inline">
                        <input name="dacriasesmenanak_hsakithamilId" value="2" type="radio" class="custom-control-input" id="dacriasesmenanak_hsakithamilId_2"> <label class="custom-control-label" for="dacriasesmenanak_hsakithamilId_2">Ya</label>
                    </div>
                    <div class="row" id="dacriasesmenanak_div_hsakithamilId2" style="display: none;">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <textarea rows="2" name="dacriasesmenanak_hsakithamilket" id="dacriasesmenanak_hsakithamilket" style="width: 100%;" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-group row" style="padding-bottom: 3px; border-bottom-style: solid; border-bottom-width: thin;">
    <div class="col-md-2">
        <label class="col-form-label"> Obat Yang Diminum</label>
    </div>
    <div class="col-md-10">
        <div class="row" id="dacriasesmenanak_hminumobatId">
            <div class="col-md-2">
                <div class="form-group">
                    <div class="row custom-control custom-checkbox custom-control-inline">
                        <input name="dacriasesmenanak_hminumobatId" value="1" type="radio" class="custom-control-input" id="dacriasesmenanak_hminumobatId_1"> <label class="custom-control-label" for="dacriasesmenanak_hminumobatId_1">Tidak</label>
                    </div>

                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <div class="row custom-control custom-checkbox custom-control-inline">
                        <input name="dacriasesmenanak_hminumobatId" value="2" type="radio" class="custom-control-input" id="dacriasesmenanak_hminumobatId_2"> <label class="custom-control-label" for="dacriasesmenanak_hminumobatId_2">Ya</label>
                    </div>
                    <div class="row" id="dacriasesmenanak_div_hminumobatId2" style="display: none;">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <textarea rows="2" name="dacriasesmenanak_hminumobatket" id="dacriasesmenanak_hminumobatket" style="width: 100%;" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12">
        <div class="form-group row">
            <div class="col-md-2">
                <label class="col-form-label"> Riwayat Kelahiran</label>
            </div>
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-2">
        <label class="col-form-label"> Persalinan</label>
    </div>
    <div class="col-md-10">
        <div class="row" id="dacriasesmenanak_hsalinId">
            <div class="col-md-2">
                <div class="form-group">
                    <div class="row custom-control custom-checkbox custom-control-inline">
                        <input name="dacriasesmenanak_hsalinId" value="1" type="radio" class="custom-control-input" id="dacriasesmenanak_hsalinId_1" onclick="document.getElementById('dacriasesmenanak_div_hsalinId4').style.display='none'"> <label class="custom-control-label" for="dacriasesmenanak_hsalinId_1">Spontan</label>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <div class="row custom-control custom-checkbox custom-control-inline">
                        <input name="dacriasesmenanak_hsalinId" value="2" type="radio" class="custom-control-input" id="dacriasesmenanak_hsalinId_2" onclick="document.getElementById('dacriasesmenanak_div_hsalinId4').style.display='none'"> <label class="custom-control-label" for="dacriasesmenanak_hsalinId_2">Sectio Caesaria</label>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <div class="row custom-control custom-checkbox custom-control-inline">
                        <input name="dacriasesmenanak_hsalinId" value="3" type="radio" class="custom-control-input" id="dacriasesmenanak_hsalinId_3" onclick="document.getElementById('dacriasesmenanak_div_hsalinId4').style.display='none'"> <label class="custom-control-label" for="dacriasesmenanak_hsalinId_3">Ekstraksi Vakum</label>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <div class="row custom-control custom-checkbox custom-control-inline">
                        <input name="dacriasesmenanak_hsalinId" value="4" type="radio" class="custom-control-input" id="dacriasesmenanak_hsalinId_4" onclick="document.getElementById('dacriasesmenanak_div_hsalinId4').style.display='block'"> <label class="custom-control-label" for="dacriasesmenanak_hsalinId_4">Lain-lain</label>
                    </div>
                    <div class="row" id="dacriasesmenanak_div_hsalinId4" style="display: none;">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <textarea rows="2" name="dacriasesmenanak_hsalinket" id="dacriasesmenanak_hsalinket" style="width: 100%;" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-2">
        <label class="col-form-label"> Penolong Persalinan</label>
    </div>
    <div class="col-md-10">
        <div class="row" id="dacriasesmenanak_hsalintolongId">
            <div class="col-md-2">
                <div class="form-group">
                    <div class="row custom-control custom-checkbox custom-control-inline">
                        <input name="dacriasesmenanak_hsalintolongId" value="1" type="radio" class="custom-control-input" id="dacriasesmenanak_hsalintolongId_1" onclick="document.getElementById('dacriasesmenanak_div_hsalintolongId5').style.display='none'"> <label class="custom-control-label" for="dacriasesmenanak_hsalintolongId_1">Dokter Obsgyn</label>
                    </div>

                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <div class="row custom-control custom-checkbox custom-control-inline">
                        <input name="dacriasesmenanak_hsalintolongId" value="2" type="radio" class="custom-control-input" id="dacriasesmenanak_hsalintolongId_2" onclick="document.getElementById('dacriasesmenanak_div_hsalintolongId5').style.display='none'"> <label class="custom-control-label" for="dacriasesmenanak_hsalintolongId_2">Dokter Umum</label>
                    </div>

                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <div class="row custom-control custom-checkbox custom-control-inline">
                        <input name="dacriasesmenanak_hsalintolongId" value="3" type="radio" class="custom-control-input" id="dacriasesmenanak_hsalintolongId_3" onclick="document.getElementById('dacriasesmenanak_div_hsalintolongId5').style.display='none'"> <label class="custom-control-label" for="dacriasesmenanak_hsalintolongId_3">Bidan</label>
                    </div>

                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <div class="row custom-control custom-checkbox custom-control-inline">
                        <input name="dacriasesmenanak_hsalintolongId" value="4" type="radio" class="custom-control-input" id="dacriasesmenanak_hsalintolongId_4" onclick="document.getElementById('dacriasesmenanak_div_hsalintolongId5').style.display='none'"> <label class="custom-control-label" for="dacriasesmenanak_hsalintolongId_4">Dukun</label>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <div class="row custom-control custom-checkbox custom-control-inline">
                        <input name="dacriasesmenanak_hsalintolongId" value="5" type="radio" class="custom-control-input" id="dacriasesmenanak_hsalintolongId_5" onclick="document.getElementById('dacriasesmenanak_div_hsalintolongId5').style.display='block'"> <label class="custom-control-label" for="dacriasesmenanak_hsalintolongId_5">Lain-lain</label>
                    </div>
                    <div class="row" id="dacriasesmenanak_div_hsalintolongId5" style="display: none;">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <textarea rows="2" name="dacriasesmenanak_hsalintolongket" id="dacriasesmenanak_hsalintolongket" style="width: 100%;" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-2">
        <label class="col-form-label"> Masa Gestasi</label>
    </div>
    <div class="col-md-10">
        <div class="row" id="dacriasesmenanak_hgestasiId">
            <div class="col-md-2">
                <div class="form-group">
                    <div class="row custom-control custom-checkbox custom-control-inline">
                        <input name="dacriasesmenanak_hgestasiId" value="1" type="radio" class="custom-control-input" id="dacriasesmenanak_hgestasiId_1"> <label class="custom-control-label" for="dacriasesmenanak_hgestasiId_1">Cukup Bulan</label>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <div class="row custom-control custom-checkbox custom-control-inline">
                        <input name="dacriasesmenanak_hgestasiId" value="2" type="radio" class="custom-control-input" id="dacriasesmenanak_hgestasiId_2"> <label class="custom-control-label" for="dacriasesmenanak_hgestasiId_2">Kurang Bulan</label>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <div class="row custom-control custom-checkbox custom-control-inline">
                        <input name="dacriasesmenanak_hgestasiId" value="3" type="radio" class="custom-control-input" id="dacriasesmenanak_hgestasiId_3"> <label class="custom-control-label" for="dacriasesmenanak_hgestasiId_3">Lebih Bulan</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-group row" style="padding-bottom: 3px; border-bottom-style: solid; border-bottom-width: thin;">
    <div class="col-md-2">
        <label class="col-form-label"> Keadaan Bayi</label>
    </div>
    <div class="col-md-8">
        <div class="form-group row">
            <div class="col-md-10">
                <div class="form-group row">
                    <div class="col-md-12">
                        <label class="col-form-label text-danger font-weight-bold font-italic" title="Berat Badan">Note (*) Nominal ribuan = gram, satuan / puluhan / ratusan = kg</label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3"><label class="col-form-label"> Berat Badan Lahir</label> <span class="text-danger">*</span>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group input-group-sm">
                            <input type="number" onfocus="this.select();" class="form-control form-control-sm" id="dacriasesmenanak_hbayibb"> <span class="input-group-append">
                                <span class="input-group-text">Gram</span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3"><label class="col-form-label"> Panjang Badan</label>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group input-group-sm">
                            <input type="number" onfocus="this.select();" class="form-control form-control-sm" id="dacriasesmenanak_hbayipb"> <span class="input-group-append"> <span class="input-group-text">cm</span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-3"> <label class="col-form-label"> Lingkar Kepala</label>
                </div>
                <div class="col-md-3">
                    <div class="input-group input-group-sm">
                        <input type="number" onfocus="this.select();" class="form-control form-control-sm" id="dacriasesmenanak_hbayilk"> <span class="input-group-append"> <span class="input-group-text">cm</span>
                    </span>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-3"><label class="col-form-label"> Nilai APGAR</label>
            </div>
            <div class="col-md-3">
                <div class="input-group input-group-sm">
                    <input type="number" onfocus="this.select();" class="form-control form-control-sm" id="dacriasesmenanak_hbayiapgar">
                    <span class="input-group-append"> <span class="input-group-text">/10</span>
                </span>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-3"> <label class="col-form-label"> Kelainan Bawaan</label>
        </div>
        <div class="col-md-9">
            <div class="row" id="dacriasesmenanak_hbayikelainanId">
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="row custom-control custom-checkbox custom-control-inline">
                            <input name="dacriasesmenanak_hbayikelainanId" value="1" type="radio" class="custom-control-input" id="dacriasesmenanak_hbayikelainanId_1" onclick="document.getElementById('dacriasesmenanak_div_hbayikelainanId2').style.display='none'"> <label class="custom-control-label" for="dacriasesmenanak_hbayikelainanId_1">Tidak</label>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="row custom-control custom-checkbox custom-control-inline">
                            <input name="dacriasesmenanak_hbayikelainanId" value="2" type="radio" class="custom-control-input" id="dacriasesmenanak_hbayikelainanId_2" onclick="document.getElementById('dacriasesmenanak_div_hbayikelainanId2').style.display='block'"> <label class="custom-control-label" for="dacriasesmenanak_hbayikelainanId_2">Ya</label>
                        </div>
                        <div class="row" id="dacriasesmenanak_div_hbayikelainanId2" style="display: none;">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <textarea rows="2" name="dacriasesmenanak_hbayikelainanket" id="dacriasesmenanak_hbayikelainanket" style="width: 100%;" class="form-control"></textarea>
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
<div class="form-group row" style="padding-bottom: 3px; padding-top: 3px; border-bottom-style: solid; border-bottom-width: thin;">
    <div class="col-md-12">
        <div class="form-group row">
            <div class="col-md-2">
                <label class="col-form-label"> Riwayat Tumbuh Kembang</label>
            </div>
            <div class="col-md-8">
                <div class="row" id="dacriasesmenanak_htumbuhId">
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_htumbuhId" value="1" type="radio" class="custom-control-input" id="dacriasesmenanak_htumbuhId_1" onclick="document.getElementById('dacriasesmenanak_div_htumbuhId2').style.display='none'"> <label class="custom-control-label" for="dacriasesmenanak_htumbuhId_1">Sesuai dengan tahap tumbuh kembang</label>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_htumbuhId" value="2" type="radio" class="custom-control-input" id="dacriasesmenanak_htumbuhId_2" onclick="document.getElementById('dacriasesmenanak_div_htumbuhId2').style.display='block'"> <label class="custom-control-label" for="dacriasesmenanak_htumbuhId_2">Tidak sesuai dengan tahap tumbuh kembang</label>
                            </div>
                            <div class="row" id="dacriasesmenanak_div_htumbuhId2" style="display:none;">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <textarea rows="2" name="dacriasesmenanak_htumbuhket" id="dacriasesmenanak_htumbuhket" style="width: 100%;" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12">
        <div class="form-group row">
            <div class="col-md-2">
                <label class="col-form-label"> Riwayat Imunisasi</label>
            </div>
            <div class="col-md-10">
                <textarea name="" id="rwytimunisasiassanak" class="form-control"></textarea>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /.row -->
</div>
<!-- /.card-body -->
</div>

<div class="card card-default">
    <div class="card-header " style="background-color:black;">
        <h3 class="card-title" style="color:white;">PEMERIKSAAN FISIK (Tanda Vital)</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row ">
            <div class="col-md-4">
                <div class="form-group row">
                    <div class="col-md-3">
                        <label class="col-form-label" title="Keadaan Umum">Keadaan
                        Umum</label>
                    </div>
                    <div class="col-md-8">
                        <div class="input-group input-group-sm">
                            <select name="akeadaan" id="dacriasesmenanak_akeadaan" class="form-control form-control-sm">
                                <option value="1">Baik</option>
                                <option value="2">Sedang</option>
                                <option value="3">Berat</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label class="col-form-label" title="Respirasi">Respirasi</label>
                    </div>
                    <div class="col-md-8">
                        <div class="input-group input-group-sm">
                            <input type="number" onfocus="this.select();" class="form-control form-control-sm" id="dacriasesmenanak_crespirasi"> <span class="input-group-append"> <span class="input-group-text">x/Menit</span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-3">
                    <label class="col-form-label" title="Nadi">Nadi</label>
                </div>
                <div class="col-md-8">
                    <div class="input-group input-group-sm">
                        <input type="number" onfocus="this.select();" class="form-control form-control-sm" id="dacriasesmenanak_dnadi"> <span class="input-group-append"> <span class="input-group-text">x/Menit</span>
                    </span>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-3">
                <label class="col-form-label" title="Spo2">SpO2</label>
            </div>
            <div class="col-md-8">
                <div class="input-group input-group-sm">
                    <input type="number" onfocus="this.select();" class="form-control form-control-sm" id="dacriasesmenanak_hspo2"> <span class="input-group-append"> <span class="input-group-text">%</span>
                </span>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-3">
            <label class="col-form-label" title="Reflek Cahaya">Reflek
            Cahaya</label>
        </div>
        <div class="col-md-8">
            <div class="input-group input-group-sm">
                <span class="input-group-prepend"> <span class="input-group-text">Kiri</span>
            </span> <select name="ireflek1" id="dacriasesmenanak_ireflek1" class="form-control form-control-sm">
                <option value="1">+</option>
                <option value="2">-</option>
            </select> - <span class="input-group-prepend"> <span class="input-group-text">Kanan</span>
        </span> <select name="ireflek1" id="dacriasesmenanak_ireflek2" class="form-control form-control-sm">
            <option value="1">+</option>
            <option value="2">-</option>
        </select>
    </div>
</div>
</div>
</div>
<div class="col-md-4">
    <div class="form-group row">
        <div class="col-md-3">
            <label class="col-form-label" title="Pupil">Pupil</label>
        </div>
        <div class="col-md-3">
            <div class="input-group input-group-sm">
                <span class="input-group-prepend"> <span class="input-group-text">Kiri</span>
            </span> <select name="epupil1" id="dacriasesmenanak_epupil1" class="form-control form-control-sm">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
    </div>
    <div class="col-md-5">
        <div class="input-group input-group-sm">
            <span class="input-group-prepend"> <span class="input-group-text">Kanan</span>
        </span> <select name="epupil2" id="dacriasesmenanak_epupil2" class="form-control form-control-sm">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select> <span class="input-group-append"> <span class="input-group-text">mm</span>
    </span>
</div>
</div>
</div>
<div class="form-group row">
    <div class="col-md-3">
        <label class="col-form-label" title="Tensi">Tekanan
        Darah</label>
    </div>
    <div class="col-md-9">
        <div class="row" id="dacriasesmenanak_gtdId">
            <div class="col-md-4">
                <div class="form-group">
                    <div class="row custom-control custom-checkbox custom-control-inline">
                        <input name="dacriasesmenanak_gtdId" value="1" type="radio" class="custom-control-input" id="dacriasesmenanak_gtdId_1" onclick="document.getElementById('dacriasesmenanak_div_gtdId2').style.display='none'"> <label class="custom-control-label" for="dacriasesmenanak_gtdId_1">Tidak Dilakukan</label>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="row custom-control custom-checkbox custom-control-inline">
                        <input name="dacriasesmenanak_gtdId" value="2" type="radio" class="custom-control-input" id="dacriasesmenanak_gtdId_2" onclick="document.getElementById('dacriasesmenanak_div_gtdId2').style.display='block'"> <label class="custom-control-label" for="dacriasesmenanak_gtdId_2">Dilakukan</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row" id="dacriasesmenanak_div_gtdId2" style="display: none;">
            <div class="col-md-3"></div>
            <div class="col-md-8" style="padding-bottom: 3px;">
                <div class="input-group input-group-sm">
                    <input type="number" onfocus="this.select();" class="form-control form-control-sm" id="dacriasesmenanak_ftensi1"> <label class="col-form-label">/</label> <input type="number" onfocus="this.select();" class="form-control" id="dacriasesmenanak_ftensi2"> <span class="input-group-append"> <span class="input-group-text">mmHg</span>
                </span>
            </div>
        </div>
        <div class="col-md-3">
            <label class="col-form-label" title="Tensi"></label>
        </div>
        <div class="col-md-8">
            <div class="input-group input-group-sm">
                <input type="text" id="dacriasesmenanak_fpalpasi" class="form-control form-control-sm" placeholder="Diisi jika Palpasi">
                <span class="input-group-append"> <span class="input-group-text">Per palpasi</span>
            </span>
        </div>
    </div>
</div>
</div>
</div>
<div class="form-group row">
    <div class="col-md-3">
        <label class="col-form-label" title="Suhu">Suhu</label>
    </div>
    <div class="col-md-8">
        <div class="input-group input-group-sm">
            <input type="number" onfocus="this.select();" class="form-control form-control-sm" id="dacriasesmenanak_gsuhu"> <span class="input-group-append"> <span class="input-group-text">°C</span>
        </span>
    </div>
</div>
</div>
<div class="form-group row">
    <div class="col-md-3">
        <label class="col-form-label" title="Lingkar Kepala">Lingkar
        Kepala</label>
    </div>
    <div class="col-md-8">
        <div class="input-group input-group-sm">
            <input type="number" onfocus="this.select();" class="form-control form-control-sm" id="dacriasesmenanak_klingkarkepala">
            <span class="input-group-append"> <span class="input-group-text">Cm</span>
        </span>
    </div>
</div>
</div>
<div class="form-group row">
    <div class="col-md-3">
        <label class="col-form-label" title="Lingkar Lengan">Lingkar
        Lengan</label>
    </div>
    <div class="col-md-8">
        <div class="input-group input-group-sm">
            <input type="number" onfocus="this.select();" class="form-control form-control-sm" id="dacriasesmenanak_klingkarlengan">
            <span class="input-group-append"> <span class="input-group-text">Cm</span>
        </span>
    </div>
</div>
</div>
<div class="form-group row">
    <div class="col-md-3">
        <label class="col-form-label" title="Lingkar Perut">Lingkar
        Perut</label>
    </div>
    <div class="col-md-8">
        <div class="input-group input-group-sm">
            <input type="number" onfocus="this.select();" class="form-control form-control-sm" id="dacriasesmenanak_klingkarperut">
            <span class="input-group-append"> <span class="input-group-text">Cm</span>
        </span>
    </div>
</div>
</div>
</div>
<div class="col-md-4">

    <div class="form-group row">
        <div class="col-md-12">
            <label class="col-form-label text-danger font-weight-bold font-italic" title="Berat Badan">Note (*) Nominal ribuan = gram, satuan / puluhan / ratusan = kg</label>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-3">
            <label class="col-form-label" title="Berat Badan">Berat
            Badan</label> <span class="text-danger">*</span>
        </div>
        <div class="col-md-8">
            <div class="input-group input-group-sm">
                <input type="number" onfocus="this.select();" class="form-control form-control-sm" id="dacriasesmenanak_jbb"> <span class="input-group-append">
                    <span class="input-group-text" id="dacriasesmenanak_divbb">Kg</span>
                </span>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-3">
            <label class="col-form-label" title="Tinggi Badan">Tinggi
            Badan</label>
        </div>
        <div class="col-md-8">
            <div class="input-group input-group-sm">
                <input type="number" onfocus="this.select();" class="form-control form-control-sm" id="dacriasesmenanak_jtb" onchange="hitungimtassanak()" onkeyup="hitungimtassanak()"> <span class="input-group-append"> <span class="input-group-text">Cm</span>
            </span>
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-3">
        <label class="col-form-label" title="Tinggi Badan">IMT</label>
    </div>
    <div class="col-md-8">
        <input type="number" onfocus="this.select();" class="form-control form-control-sm" id="dacriasesmenanak_kimt" readonly>
    </div>
</div>
</div>
</div>
<div class="row ">
    <div class="col-md-12">
        <div class="form-group row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table-bordered table-condensed table-hover" width="100%">
                        <tbody>
                            <tr>
                                <td colspan="4" width="30%" style="padding: 0;">
                                    <div class="row d-flex justify-content-center">
                                        <label class="col-form-label font-weight-bold">Glasgow
                                        Coma Scale ( GCS )</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" width="30%" style="padding: 0;">
                                    <div class="row d-flex justify-content-center">
                                        <label class="col-form-label">Kategori</label>
                                    </div>
                                </td>
                                <td width="20%" style="padding: 0;">
                                    <div class="row d-flex justify-content-center">
                                        <label class="col-form-label">Skor</label>
                                    </div>
                                </td>
                                <td width="20%" style="padding: 0;">
                                    <div class="row d-flex justify-content-center">
                                        <label class="col-form-label">Hasil Skor</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%" style="padding: 0;">
                                    <div class="row d-flex justify-content-center">
                                        <label class="col-form-label">Respon Buka Mata (Eye
                                        Opening : E)</label>
                                    </div>
                                </td>
                                <td width="30%" style="padding: 0;">
                                    <table class="table-bordered table-condensed table-hover" width="100%">
                                        <tbody>
                                            <tr onclick="dacriasesmenanakex_setScore(4, 1);">
                                                <td width="100%" style="padding: 0;"><label class="col-form-label">&nbsp;Spontan</label></td>
                                            </tr>

                                            <tr onclick="dacriasesmenanakex_setScore(3, 1);">
                                                <td style="padding: 0;"><label class="col-form-label">&nbsp;Terhadap
                                                Suara</label></td>
                                            </tr>
                                            <tr onclick="dacriasesmenanakex_setScore(2, 1);">
                                                <td style="padding: 0;"><label class="col-form-label">&nbsp;Terhadap
                                                Nyeri</label></td>
                                            </tr>
                                            <tr onclick="dacriasesmenanakex_setScore(1, 1);">
                                                <td style="padding: 0;"><label class="col-form-label">&nbsp;Tidak
                                                ada</label></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td width="20%" style="padding: 0;">
                                    <table class="table-bordered table-condensed table-hover" width="100%">
                                        <tbody>
                                            <tr onclick="dacriasesmenanakex_setScore(4, 1);">
                                                <td align="center" style="padding: 0;"><label class="col-form-label">4</label></td>
                                            </tr>
                                            <tr onclick="dacriasesmenanakex_setScore(3, 1);">
                                                <td align="center" style="padding: 0;"><label class="col-form-label">3</label></td>
                                            </tr>
                                            <tr onclick="dacriasesmenanakex_setScore(2, 1);">
                                                <td align="center" style="padding: 0;"><label class="col-form-label">2</label></td>
                                            </tr>
                                            <tr onclick="dacriasesmenanakex_setScore(1, 1);">
                                                <td align="center" style="padding: 0;"><label class="col-form-label">1</label></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td width="20%">
                                    <table class="" width="100%">
                                        <tbody>
                                            <tr height="100%" align="center">
                                                <td align="center" width="100%" style="padding: 0;">
                                                    <input type="text" class="form-control text-center font-weight-bold text-center" style="font-size: 30px;" id="dacriasesmenanak_bgcsa" value="4" readonly>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 0;" width="30%">
                                    <div class="row d-flex justify-content-center">
                                        <label class="col-form-label">Respon Verbal (V)</label>
                                    </div>
                                </td>
                                <td style="padding: 0;" width="30%">
                                    <table class="table-bordered table-condensed table-hover" width="100%">
                                        <tbody>
                                            <tr onclick="dacriasesmenanakex_setScore(5, 3);">
                                                <td style="padding: 0;"><label class="col-form-label">&nbsp;Berorientasi
                                                Baik</label></td>
                                            </tr>
                                            <tr onclick="dacriasesmenanakex_setScore(4, 3);">
                                                <td style="padding: 0;"><label class="col-form-label">&nbsp;Berbicara
                                                mengacau (bingung)</label></td>
                                            </tr>
                                            <tr onclick="dacriasesmenanakex_setScore(3, 3);">
                                                <td style="padding: 0;"><label class="col-form-label">&nbsp;Kata-Kata
                                                tidak teratur</label></td>
                                            </tr>
                                            <tr onclick="dacriasesmenanakex_setScore(2, 3);">
                                                <td style="padding: 0;"><label class="col-form-label">&nbsp;Suara
                                                Tidak Jelas</label></td>
                                            </tr>
                                            <tr onclick="dacriasesmenanakex_setScore(1, 3);">
                                                <td style="padding: 0;"><label class="col-form-label">&nbsp;Tidak
                                                Ada</label></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td style="padding: 0;" width="20%">
                                    <table class="table-bordered table-condensed table-hover" width="100%">
                                        <tbody>
                                            <tr onclick="dacriasesmenanakex_setScore(5, 3);">
                                                <td style="padding: 0;" align="center"><label class="col-form-label">5</label></td>
                                            </tr>
                                            <tr onclick="dacriasesmenanakex_setScore(4, 3);">
                                                <td style="padding: 0;" align="center"><label class="col-form-label">4</label></td>
                                            </tr>
                                            <tr onclick="dacriasesmenanakex_setScore(3, 3);">
                                                <td style="padding: 0;" align="center"><label class="col-form-label">3</label></td>
                                            </tr>
                                            <tr onclick="dacriasesmenanakex_setScore(2, 3);">
                                                <td style="padding: 0;" align="center"><label class="col-form-label">2</label></td>
                                            </tr>
                                            <tr onclick="dacriasesmenanakex_setScore(1, 3);">
                                                <td style="padding: 0;" align="center"><label class="col-form-label">1</label></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td width="20%">
                                    <table class="" width="100%">
                                        <tbody>
                                            <tr height="100%">
                                                <td style="padding: 0;" align="center">
                                                    <input type="text" class="form-control text-center font-weight-bold text-center" style="font-size: 30px;" id="dacriasesmenanak_bgcsc" value="5" readonly>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td width="30%" style="padding: 0;">
                                    <div class="row d-flex justify-content-center">
                                        <label class="col-form-label">Respon Motorik
                                        Terbaik (M)</label>
                                    </div>
                                </td>
                                <td width="30%" style="padding: 0;">
                                    <table class="table-bordered table-condensed table-hover" width="100%">
                                        <tbody>
                                            <tr onclick="dacriasesmenanakex_setScore(6, 2);">
                                                <td width="100%" style="padding: 0;"><label class="col-form-label">&nbsp;Turut Perintah</label></td>
                                            </tr>
                                            <tr onclick="dacriasesmenanakex_setScore(5, 2);">
                                                <td style="padding: 0;"><label class="col-form-label">&nbsp;Melokalisir
                                                Nyeri</label></td>
                                            </tr>
                                            <tr onclick="dacriasesmenanakex_setScore(4, 2);">
                                                <td style="padding: 0;"><label class="col-form-label">&nbsp;Fleksi
                                                Normal (Menarik anggota gerak yang dirangsang)</label></td>
                                            </tr>
                                            <tr onclick="dacriasesmenanakex_setScore(3, 2);">
                                                <td style="padding: 0;"><label class="col-form-label">&nbsp;Fleksi
                                                Abnormal (dekortikasi)</label></td>
                                            </tr>
                                            <tr onclick="dacriasesmenanakex_setScore(2, 2);">
                                                <td style="padding: 0;"><label class="col-form-label">&nbsp;Ekstensi
                                                Abnormal (deserebrasi)</label></td>
                                            </tr>
                                            <tr onclick="dacriasesmenanakex_setScore(1, 2);">
                                                <td style="padding: 0;"><label class="col-form-label">&nbsp;Tidak
                                                Ada (Flasid)</label></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td width="20%" style="padding: 0;">
                                    <table class="table-bordered table-condensed table-hover" width="100%">
                                        <tbody>
                                            <tr onclick="dacriasesmenanakex_setScore(6, 2);">
                                                <td align="center" style="padding: 0;"><label class="col-form-label">6</label></td>
                                            </tr>
                                            <tr onclick="dacriasesmenanakex_setScore(5, 2);">
                                                <td align="center" style="padding: 0;"><label class="col-form-label">5</label></td>
                                            </tr>
                                            <tr onclick="dacriasesmenanakex_setScore(4, 2);">
                                                <td style="padding: 0;" align="center"><label class="col-form-label">4</label></td>
                                            </tr>
                                            <tr onclick="dacriasesmenanakex_setScore(3, 2);">
                                                <td style="padding: 0;" align="center"><label class="col-form-label">3</label></td>
                                            </tr>
                                            <tr onclick="dacriasesmenanakex_setScore(2, 2);">
                                                <td style="padding: 0;" align="center"><label class="col-form-label">2</label></td>
                                            </tr>
                                            <tr onclick="dacriasesmenanakex_setScore(1, 2);">
                                                <td style="padding: 0;" align="center"><label class="col-form-label">1</label></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td width="20%">
                                    <table class="" width="100%">
                                        <tbody>
                                            <tr height="100%">
                                                <td style="padding: 0;" align="center">
                                                    <input type="text" class="form-control text-center font-weight-bold text-center" style="font-size: 30px;" id="dacriasesmenanak_bgcsb" value="6" readonly>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class="col-form-label" title="Kesadaran">Kesadaran</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <select name="asadar" id="dacriasesmenanak_asadar" class="form-control">
                                                    <option value="1">Compos Mentis</option>
                                                    <option value="2">Apatis</option>
                                                    <option value="3">Somnolen</option>
                                                    <option value="4">Delirium</option>
                                                    <option value="5">Sopor</option>
                                                    <option value="6">Coma</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <table class="" width="100%">
                                        <tbody>
                                            <tr height="100%">
                                                <td style="padding: 0;" align="center">
                                                    <input type="text" class="form-control text-center font-weight-bold text-center" style="font-size: 30px;" id="dacriasesmenanak_bgcstot" value="15" readonly>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group row" style="padding-bottom: 3px; padding-top: 3px; border-bottom-style: solid; border-bottom-width: thin;">
            <div class="col-md-2">
                <label class="col-form-label"> Kepala</label>
            </div>
            <div class="col-md-10">
                <div class="row" id="dacriasesmenanak_kkepalalist">
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kkepalalist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kkepalalist_1"> <label class="custom-control-label" for="dacriasesmenanak_kkepalalist_1">Normal</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kkepalalist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kkepalalist_2"> <label class="custom-control-label" for="dacriasesmenanak_kkepalalist_2">Mikrosefa</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kkepalalist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kkepalalist_3"> <label class="custom-control-label" for="dacriasesmenanak_kkepalalist_3">Asimetris</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kkepalalist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kkepalalist_4"> <label class="custom-control-label" for="dacriasesmenanak_kkepalalist_4">Hematoma</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kkepalalist" value="5" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kkepalalist_5"> <label class="custom-control-label" for="dacriasesmenanak_kkepalalist_5">Caput Succedaneum</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kkepalalist" value="6" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kkepalalist_6" onclick="tampilketLainassAnak();"> <label class="custom-control-label" for="dacriasesmenanak_kkepalalist_6">Lain-lain</label>
                            </div>
                            <div class="row" id="dacriasesmenanak_div_kkepalalist6" style="display: none;">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <textarea rows="2" name="dacriasesmenanak_kkepalalistket6" id="dacriasesmenanak_kkepalalistket6" style="width: 100%;" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row" style="padding-bottom: 3px; padding-top: 3px; border-bottom-style: solid; border-bottom-width: thin;">
            <div class="col-md-2">
                <label class="col-form-label"> Rambut</label>
            </div>
            <div class="col-md-10">
                <div class="row" id="dacriasesmenanak_krambutlist">
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_krambutlist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenanak_krambutlist_1"> <label class="custom-control-label" for="dacriasesmenanak_krambutlist_1">Normal</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_krambutlist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenanak_krambutlist_2"> <label class="custom-control-label" for="dacriasesmenanak_krambutlist_2">Kotor</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_krambutlist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenanak_krambutlist_3"> <label class="custom-control-label" for="dacriasesmenanak_krambutlist_3">Berminyak</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_krambutlist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenanak_krambutlist_4"> <label class="custom-control-label" for="dacriasesmenanak_krambutlist_4">Kering</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_krambutlist" value="5" type="checkbox" class="custom-control-input" id="dacriasesmenanak_krambutlist_5"> <label class="custom-control-label" for="dacriasesmenanak_krambutlist_5">Rontok</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_krambutlist" value="6" type="checkbox" class="custom-control-input" id="dacriasesmenanak_krambutlist_6" onclick="tampilketLainassAnak();"> <label class="custom-control-label" for="dacriasesmenanak_krambutlist_6">Lain-lain</label>
                            </div>
                            <div class="row" id="dacriasesmenanak_div_krambutlist6" style="display: none;">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <textarea rows="2" name="dacriasesmenanak_krambutlistket6" id="dacriasesmenanak_krambutlistket6" style="width: 100%;" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row" style="padding-bottom: 3px; padding-top: 3px; border-bottom-style: solid; border-bottom-width: thin;">
            <div class="col-md-2">
                <label class="col-form-label"> Muka</label>
            </div>
            <div class="col-md-10">
                <div class="row" id="dacriasesmenanak_kmukalist">
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kmukalist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kmukalist_1"> <label class="custom-control-label" for="dacriasesmenanak_kmukalist_1">Normal</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kmukalist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kmukalist_2"> <label class="custom-control-label" for="dacriasesmenanak_kmukalist_2">Asimetris</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kmukalist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kmukalist_3"> <label class="custom-control-label" for="dacriasesmenanak_kmukalist_3">Bells palsy</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kmukalist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kmukalist_4"> <label class="custom-control-label" for="dacriasesmenanak_kmukalist_4">Tic Facial</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kmukalist" value="5" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kmukalist_5"> <label class="custom-control-label" for="dacriasesmenanak_kmukalist_5">Kelainan konginetal</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kmukalist" value="6" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kmukalist_6" onclick="tampilketLainassAnak();"> <label class="custom-control-label" for="dacriasesmenanak_kmukalist_6">Lain-lain</label>
                            </div>
                            <div class="row" id="dacriasesmenanak_div_kmukalist6" style="display: none;">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <textarea rows="2" name="dacriasesmenanak_kmukalistket6" id="dacriasesmenanak_kmukalistket6" style="width: 100%;" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row" style="padding-bottom: 3px; padding-top: 3px; border-bottom-style: solid; border-bottom-width: thin;">
            <div class="col-md-2">
                <label class="col-form-label"> Mata</label>
            </div>
            <div class="col-md-10">
                <div class="row" id="dacriasesmenanak_kmatalist">
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kmatalist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kmatalist_1"> <label class="custom-control-label" for="dacriasesmenanak_kmatalist_1">Normal</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kmatalist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kmatalist_2"> <label class="custom-control-label" for="dacriasesmenanak_kmatalist_2">Penurunan Visus</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kmatalist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kmatalist_3"> <label class="custom-control-label" for="dacriasesmenanak_kmatalist_3">Sclera Ikterik</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kmatalist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kmatalist_4"> <label class="custom-control-label" for="dacriasesmenanak_kmatalist_4">Konjungtiva anemis</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kmatalist" value="5" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kmatalist_5"> <label class="custom-control-label" for="dacriasesmenanak_kmatalist_5">Anisokor</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kmatalist" value="6" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kmatalist_6"> <label class="custom-control-label" for="dacriasesmenanak_kmatalist_6">Midriasis/Miosis</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kmatalist" value="7" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kmatalist_7"> <label class="custom-control-label" for="dacriasesmenanak_kmatalist_7">Tidak ada reaksi cahaya</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kmatalist" value="8" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kmatalist_8" onclick="tampilketLainassAnak();"> <label class="custom-control-label" for="dacriasesmenanak_kmatalist_8">Lain-lain</label>
                            </div>
                            <div class="row" id="dacriasesmenanak_div_kmatalist8" style="display: none;">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <textarea rows="2" name="dacriasesmenanak_kmatalistket8" id="dacriasesmenanak_kmatalistket8" style="width: 100%;" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row" style="padding-bottom: 3px; padding-top: 3px; border-bottom-style: solid; border-bottom-width: thin;">
            <div class="col-md-2">
                <label class="col-form-label"> Telinga</label>
            </div>
            <div class="col-md-10">
                <div class="row" id="dacriasesmenanak_ktelingalist">
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_ktelingalist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenanak_ktelingalist_1"> <label class="custom-control-label" for="dacriasesmenanak_ktelingalist_1">Normal</label>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_ktelingalist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenanak_ktelingalist_2"> <label class="custom-control-label" for="dacriasesmenanak_ktelingalist_2">Erytema</label>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_ktelingalist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenanak_ktelingalist_3"> <label class="custom-control-label" for="dacriasesmenanak_ktelingalist_3">Discharge</label>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_ktelingalist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenanak_ktelingalist_4" onclick="tampilketLainassAnak()"> <label class="custom-control-label" for="dacriasesmenanak_ktelingalist_4">Lain-lain</label>
                            </div>
                            <div class="row" id="dacriasesmenanak_div_ktelingalist4" style="display: none;">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <textarea rows="2" name="dacriasesmenanak_ktelingalistket4" id="dacriasesmenanak_ktelingalistket4" style="width: 100%;" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row" style="padding-bottom: 3px; padding-top: 3px; border-bottom-style: solid; border-bottom-width: thin;">
            <div class="col-md-2">
                <label class="col-form-label"> Hidung</label>
            </div>
            <div class="col-md-10">
                <div class="row" id="dacriasesmenanak_khidunglist">
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_khidunglist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenanak_khidunglist_1"> <label class="custom-control-label" for="dacriasesmenanak_khidunglist_1">Normal</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_khidunglist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenanak_khidunglist_2"> <label class="custom-control-label" for="dacriasesmenanak_khidunglist_2">Epitaksis</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_khidunglist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenanak_khidunglist_3"> <label class="custom-control-label" for="dacriasesmenanak_khidunglist_3">Asimetris</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_khidunglist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenanak_khidunglist_4" onclick="tampilketLainassAnak()"> <label class="custom-control-label" for="dacriasesmenanak_khidunglist_4">Lain-lain</label>
                            </div>
                            <div class="row" id="dacriasesmenanak_div_khidunglist4" style="display: none;">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <textarea rows="2" name="dacriasesmenanak_khidunglistket4" id="dacriasesmenanak_khidunglistket4" style="width: 100%;" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row" style="padding-bottom: 3px; padding-top: 3px; border-bottom-style: solid; border-bottom-width: thin;">
            <div class="col-md-2">
                <label class="col-form-label"> Mulut</label>
            </div>
            <div class="col-md-10">
                <div class="row" id="dacriasesmenanak_kmulutlist">
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kmulutlist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kmulutlist_1"> <label class="custom-control-label" for="dacriasesmenanak_kmulutlist_1">Normal</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kmulutlist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kmulutlist_2"> <label class="custom-control-label" for="dacriasesmenanak_kmulutlist_2">Bibir Pucat</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kmulutlist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kmulutlist_3"> <label class="custom-control-label" for="dacriasesmenanak_kmulutlist_3">Asimetris</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kmulutlist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kmulutlist_4"> <label class="custom-control-label" for="dacriasesmenanak_kmulutlist_4">Sariawan</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kmulutlist" value="5" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kmulutlist_5"> <label class="custom-control-label" for="dacriasesmenanak_kmulutlist_5">Kelainan konginetal</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kmulutlist" value="6" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kmulutlist_6"> <label class="custom-control-label" for="dacriasesmenanak_kmulutlist_6">Mucosa Kering/ lembab</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kmulutlist" value="7" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kmulutlist_7" onclick="tampilketLainassAnak()"> <label class="custom-control-label" for="dacriasesmenanak_kmulutlist_7">Lain-lain</label>
                            </div>
                            <div class="row" id="dacriasesmenanak_div_kmulutlist7" style="display: none;">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <textarea rows="2" name="dacriasesmenanak_kmulutlistket7" id="dacriasesmenanak_kmulutlistket7" style="width: 100%;" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row" style="padding-bottom: 3px; padding-top: 3px; border-bottom-style: solid; border-bottom-width: thin;">
            <div class="col-md-2">
                <label class="col-form-label"> Gigi</label>
            </div>
            <div class="col-md-10">
                <div class="row" id="dacriasesmenanak_kgigilist">
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kgigilist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kgigilist_1"> <label class="custom-control-label" for="dacriasesmenanak_kgigilist_1">Normal</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kgigilist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kgigilist_2"> <label class="custom-control-label" for="dacriasesmenanak_kgigilist_2">Caries</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kgigilist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kgigilist_3"> <label class="custom-control-label" for="dacriasesmenanak_kgigilist_3">Gigi Goyang</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kgigilist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kgigilist_4" onclick="tampilketLainassAnak()"> <label class="custom-control-label" for="dacriasesmenanak_kgigilist_4">Lain-lain</label>
                            </div>
                            <div class="row" id="dacriasesmenanak_div_kgigilist4" style="display: none;">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <textarea rows="2" name="dacriasesmenanak_kgigilistket4" id="dacriasesmenanak_kgigilistket4" style="width: 100%;" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row" style="padding-bottom: 3px; padding-top: 3px; border-bottom-style: solid; border-bottom-width: thin;">
            <div class="col-md-2">
                <label class="col-form-label"> Lidah</label>
            </div>
            <div class="col-md-10">
                <div class="row" id="dacriasesmenanak_klidahlist">
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_klidahlist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenanak_klidahlist_1"> <label class="custom-control-label" for="dacriasesmenanak_klidahlist_1">Normal</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_klidahlist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenanak_klidahlist_2"> <label class="custom-control-label" for="dacriasesmenanak_klidahlist_2">Kotor</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_klidahlist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenanak_klidahlist_3"> <label class="custom-control-label" for="dacriasesmenanak_klidahlist_3">Gerakan Asimetris</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_klidahlist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenanak_klidahlist_4" onclick="tampilketLainassAnak()"> <label class="custom-control-label" for="dacriasesmenanak_klidahlist_4">Lain-lain</label>
                            </div>
                            <div class="row" id="dacriasesmenanak_div_klidahlist4" style="display: none;">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <textarea rows="2" name="dacriasesmenanak_klidahlistket4" id="dacriasesmenanak_klidahlistket4" style="width: 100%;" class="form-control"></textarea>
                                </div>
                                *
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row" style="padding-bottom: 3px; padding-top: 3px; border-bottom-style: solid; border-bottom-width: thin;">
            <div class="col-md-2">
                <label class="col-form-label"> Tenggorokan</label>
            </div>
            <div class="col-md-10">
                <div class="row" id="dacriasesmenanak_kgoroklist">
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kgoroklist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kgoroklist_1"> <label class="custom-control-label" for="dacriasesmenanak_kgoroklist_1">Normal</label>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kgoroklist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kgoroklist_2"> <label class="custom-control-label" for="dacriasesmenanak_kgoroklist_2">Faring Merah</label>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kgoroklist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kgoroklist_3"> <label class="custom-control-label" for="dacriasesmenanak_kgoroklist_3">Tonsil Membesar</label>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kgoroklist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kgoroklist_4" onclick="tampilketLainassAnak()"> <label class="custom-control-label" for="dacriasesmenanak_kgoroklist_4">Lain-lain</label>
                            </div>
                            <div class="row" id="dacriasesmenanak_div_kgoroklist4" style="display: none;">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <textarea rows="2" name="dacriasesmenanak_kgoroklistket4" id="dacriasesmenanak_kgoroklistket4" style="width: 100%;" class="form-control"></textarea>
                                </div>
                                *
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row" style="padding-bottom: 3px; padding-top: 3px; border-bottom-style: solid; border-bottom-width: thin;">
            <div class="col-md-2">
                <label class="col-form-label"> Leher</label>
            </div>
            <div class="col-md-10">
                <div class="row" id="dacriasesmenanak_kleherlist">
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kleherlist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kleherlist_1"> <label class="custom-control-label" for="dacriasesmenanak_kleherlist_1">Normal</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kleherlist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kleherlist_2"> <label class="custom-control-label" for="dacriasesmenanak_kleherlist_2">Pembesaran Tiroid</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kleherlist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kleherlist_3"> <label class="custom-control-label" for="dacriasesmenanak_kleherlist_3">Pemb. Vena Jugularis</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kleherlist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kleherlist_4"> <label class="custom-control-label" for="dacriasesmenanak_kleherlist_4">Kaku Kuduk</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kleherlist" value="5" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kleherlist_5"> <label class="custom-control-label" for="dacriasesmenanak_kleherlist_5">Keterbatasan Gerak</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kleherlist" value="6" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kleherlist_6" onclick="tampilketLainassAnak()"> <label class="custom-control-label" for="dacriasesmenanak_kleherlist_6">Lain-lain</label>
                            </div>
                            <div class="row" id="dacriasesmenanak_div_kleherlist6" style="display: none;">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <textarea rows="2" name="dacriasesmenanak_kleherlistket6" id="dacriasesmenanak_kleherlistket6" style="width: 100%;" class="form-control"></textarea>
                                </div>
                                *
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row" style="padding-bottom: 3px; padding-top: 3px; border-bottom-style: solid; border-bottom-width: thin;">
            <div class="col-md-2">
                <label class="col-form-label"> Dada &amp; Paru-paru</label>
            </div>
            <div class="col-md-10">
                <div class="row" id="dacriasesmenanak_kdadalist">
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kdadalist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kdadalist_1"> <label class="custom-control-label" for="dacriasesmenanak_kdadalist_1">Simetris</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kdadalist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kdadalist_2"> <label class="custom-control-label" for="dacriasesmenanak_kdadalist_2">Asimetris</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kdadalist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kdadalist_3" onclick="tampilketLainassAnak()"> <label class="custom-control-label" for="dacriasesmenanak_kdadalist_3">Suara nafas</label>
                            </div>
                            <div class="row" id="dacriasesmenanak_div_kdadalist3" style="display: none;">
                                <div class="col-md-1"></div>
                                <div class="col-md-11">
                                    <div class="row" id="dacriasesmenanak_kdadanafaslist">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="row custom-control custom-checkbox custom-control-inline">
                                                    <input name="dacriasesmenanak_kdadanafaslist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kdadanafaslist_1"> <label class="custom-control-label" for="dacriasesmenanak_kdadanafaslist_1">Kanan kiri sama</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="row custom-control custom-checkbox custom-control-inline">
                                                    <input name="dacriasesmenanak_kdadanafaslist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kdadanafaslist_2"> <label class="custom-control-label" for="dacriasesmenanak_kdadanafaslist_2">Ronchi</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="row custom-control custom-checkbox custom-control-inline">
                                                    <input name="dacriasesmenanak_kdadanafaslist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kdadanafaslist_3"> <label class="custom-control-label" for="dacriasesmenanak_kdadanafaslist_3">Wheezing</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="row custom-control custom-checkbox custom-control-inline">
                                                    <input name="dacriasesmenanak_kdadanafaslist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kdadanafaslist_4" onclick="tampilketLainassAnak()"> <label class="custom-control-label" for="dacriasesmenanak_kdadanafaslist_4">Lain-lain</label>
                                                </div>
                                                <div class="row" id="dacriasesmenanak_div_kdadanafaslist4" style="display: none;">
                                                    <div class="col-md-1"></div>
                                                    <div class="col-md-10">
                                                        <textarea rows="2" name="dacriasesmenanak_kdadanafaslistket4" id="dacriasesmenanak_kdadanafaslistket4" style="width: 100%;" class="form-control"></textarea>
                                                    </div>
                                                    *
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kdadalist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kdadalist_4" onclick="tampilketLainassAnak()"> <label class="custom-control-label" for="dacriasesmenanak_kdadalist_4">Respiratori</label>
                            </div>

                            <div class="row" id="dacriasesmenanak_div_kdadalist4" style="display: none;">
                                <div class="col-md-1"></div>
                                <div class="col-md-11">
                                    <div class="row" id="dacriasesmenanak_kdadarespirId">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="row custom-control custom-checkbox custom-control-inline">
                                                    <input name="dacriasesmenanak_kdadarespirId" value="1" type="radio" class="custom-control-input" id="dacriasesmenanak_kdadarespirId_1" onclick="document.getElementById('dacriasesmenanak_div_kdadarespirId2').style.display='none'"> <label class="custom-control-label" for="dacriasesmenanak_kdadarespirId_1">Spontan tanpa alat bantu</label>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="row custom-control custom-checkbox custom-control-inline">
                                                    <input name="dacriasesmenanak_kdadarespirId" value="2" type="radio" class="custom-control-input" id="dacriasesmenanak_kdadarespirId_2" onclick="document.getElementById('dacriasesmenanak_div_kdadarespirId2').style.display='block'"> <label class="custom-control-label" for="dacriasesmenanak_kdadarespirId_2">Spontan dengan alat bantu, Sebutkan</label>
                                                </div>
                                                <div class="row" id="dacriasesmenanak_div_kdadarespirId2" style="display: none;">
                                                    <div class="col-md-1"></div>
                                                    <div class="col-md-10">
                                                        <textarea rows="2" name="dacriasesmenanak_kdadarespirket" id="dacriasesmenanak_kdadarespirket" style="width: 100%;" class="form-control"></textarea>
                                                    </div>
                                                    *
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
        <div class="form-group row" style="padding-bottom: 3px; padding-top: 3px; border-bottom-style: solid; border-bottom-width: thin;">
            <div class="col-md-2">
                <label class="col-form-label"> Abdomen</label>
            </div>
            <div class="col-md-10">
                <div class="row" id="dacriasesmenanak_kabdomenlist">
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kabdomenlist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kabdomenlist_1"> <label class="custom-control-label" for="dacriasesmenanak_kabdomenlist_1">Normal</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kabdomenlist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kabdomenlist_2"> <label class="custom-control-label" for="dacriasesmenanak_kabdomenlist_2">Tegang</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kabdomenlist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kabdomenlist_3"> <label class="custom-control-label" for="dacriasesmenanak_kabdomenlist_3">Distensi</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriasesmenanak_kabdomenlist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kabdomenlist_4" onclick="tampilketLainassAnak()"> <label class="custom-control-label" for="dacriasesmenanak_kabdomenlist_4">Bising usus</label>
                            </div>
                            <div class="row" id="dacriasesmenanak_div_kabdomenlist4" style="display: none;">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <div class="input-group input-group-sm">
                                        <input type="number" onfocus="this.select();" class="form-control form-control-sm" name="dacriasesmenanak_kabdomenlistket4" id="dacriasesmenanak_kabdomenlistket4"> <span class="input-group-append"> <span class="input-group-text">x/Menit</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="row custom-control custom-checkbox custom-control-inline">
                            <input name="dacriasesmenanak_kabdomenlist" value="5" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kabdomenlist_5" onclick="tampilketLainassAnak()"> <label class="custom-control-label" for="dacriasesmenanak_kabdomenlist_5">Lain-lain</label>
                        </div>
                        <div class="row" id="dacriasesmenanak_div_kabdomenlist5" style="display: none;">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <textarea rows="2" name="dacriasesmenanak_kabdomenlistket5" id="dacriasesmenanak_kabdomenlistket5" style="width: 100%;" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row" style="padding-bottom: 3px; padding-top: 3px; border-bottom-style: solid; border-bottom-width: thin;">
        <div class="col-md-2">
            <label class="col-form-label"> Kulit</label>
        </div>
        <div class="col-md-10">
            <div class="row" id="dacriasesmenanak_kkulitlist">
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="row custom-control custom-checkbox custom-control-inline">
                            <input name="dacriasesmenanak_kkulitlist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kkulitlist_1"> <label class="custom-control-label" for="dacriasesmenanak_kkulitlist_1">Pink</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="row custom-control custom-checkbox custom-control-inline">
                            <input name="dacriasesmenanak_kkulitlist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kkulitlist_2"> <label class="custom-control-label" for="dacriasesmenanak_kkulitlist_2">Pucat</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="row custom-control custom-checkbox custom-control-inline">
                            <input name="dacriasesmenanak_kkulitlist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kkulitlist_3"> <label class="custom-control-label" for="dacriasesmenanak_kkulitlist_3">Kuning</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="row custom-control custom-checkbox custom-control-inline">
                            <input name="dacriasesmenanak_kkulitlist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kkulitlist_4"> <label class="custom-control-label" for="dacriasesmenanak_kkulitlist_4">Mottle</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="row custom-control custom-checkbox custom-control-inline">
                            <input name="dacriasesmenanak_kkulitlist" value="5" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kkulitlist_5" onclick="tampilketLainassAnak()"> <label class="custom-control-label" for="dacriasesmenanak_kkulitlist_5">Sianosis</label>
                        </div>
                        <div class="row" id="dacriasesmenanak_div_kkulitlist5" style="display: none;">
                            <div class="col-md-1"></div>
                            <div class="col-md-11">
                                <div class="row" id="dacriasesmenanak_kkulitsianosislist">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmenanak_kkulitsianosislist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kkulitsianosislist_1"> <label class="custom-control-label" for="dacriasesmenanak_kkulitsianosislist_1">TAK</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmenanak_kkulitsianosislist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kkulitsianosislist_2"> <label class="custom-control-label" for="dacriasesmenanak_kkulitsianosislist_2">Pada Kuku</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmenanak_kkulitsianosislist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kkulitsianosislist_3"> <label class="custom-control-label" for="dacriasesmenanak_kkulitsianosislist_3">Pada Sekitar Mulut</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmenanak_kkulitsianosislist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kkulitsianosislist_4"> <label class="custom-control-label" for="dacriasesmenanak_kkulitsianosislist_4">Ekstremitas Atas/ Bawah</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="row custom-control custom-checkbox custom-control-inline">
                            <input name="dacriasesmenanak_kkulitlist" value="6" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kkulitlist_6"> <label class="custom-control-label" for="dacriasesmenanak_kkulitlist_6">Kemerahan (Rash)</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="row custom-control custom-checkbox custom-control-inline">
                            <input name="dacriasesmenanak_kkulitlist" value="7" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kkulitlist_7" onclick="tampilketLainassAnak()"> <label class="custom-control-label" for="dacriasesmenanak_kkulitlist_7">Tanda Lahir, sebutkan</label>
                        </div>
                        <div class="row" id="dacriasesmenanak_div_kkulitlist7" style="display: none;">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <textarea rows="2" name="dacriasesmenanak_kkulitlistket7" id="dacriasesmenanak_kkulitlistket7" style="width: 100%;" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="row custom-control custom-checkbox custom-control-inline">
                            <input name="dacriasesmenanak_kkulitlist" value="8" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kkulitlist_8" onclick="tampilketLainassAnak()"> <label class="custom-control-label" for="dacriasesmenanak_kkulitlist_8">Turgor</label>
                        </div>
                        <div class="row" id="dacriasesmenanak_div_kkulitlist8" style="display: none;">
                            <div class="col-md-1"></div>
                            <div class="col-md-11">
                                <div class="row" id="dacriasesmenanak_kkulitturgorId">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmenanak_kkulitturgorId" value="1" type="radio" class="custom-control-input" id="dacriasesmenanak_kkulitturgorId_1"> <label class="custom-control-label" for="dacriasesmenanak_kkulitturgorId_1">Baik</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmenanak_kkulitturgorId" value="2" type="radio" class="custom-control-input" id="dacriasesmenanak_kkulitturgorId_2"> <label class="custom-control-label" for="dacriasesmenanak_kkulitturgorId_2">Tidak Elastis</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="row custom-control custom-checkbox custom-control-inline">
                            <input name="dacriasesmenanak_kkulitlist" value="9" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kkulitlist_9"> <label class="custom-control-label" for="dacriasesmenanak_kkulitlist_9">Edema</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row" style="padding-bottom: 3px; padding-top: 3px; border-bottom-style: solid; border-bottom-width: thin;">
        <div class="col-md-2">
            <label class="col-form-label"> Genetalia</label>
        </div>
        <div class="col-md-10">
            <div class="row" id="dacriasesmenanak_kgenetaliaId">
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="row custom-control custom-checkbox custom-control-inline">
                            <input name="dacriasesmenanak_kgenetaliaId" value="1" type="radio" class="custom-control-input" id="dacriasesmenanak_kgenetaliaId_1"> <label class="custom-control-label" for="dacriasesmenanak_kgenetaliaId_1">Perempuan</label>
                        </div>
                        <div class="row" id="dacriasesmenanak_div_kgenetaliaId1" style="display: none;">
                            <div class="col-md-1"></div>
                            <div class="col-md-11">
                                <div class="row" id="dacriasesmenanak_kgenetaliawanitaId">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmenanak_kgenetaliawanitaId" value="1" type="radio" class="custom-control-input" id="dacriasesmenanak_kgenetaliawanitaId_1" onclick="document.getElementById('dacriasesmenanak_div_kgenetaliawanitaId2').style.display='none'"> <label class="custom-control-label" for="dacriasesmenanak_kgenetaliawanitaId_1">Normal</label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmenanak_kgenetaliawanitaId" value="2" type="radio" class="custom-control-input" id="dacriasesmenanak_kgenetaliawanitaId_2" onclick="document.getElementById('dacriasesmenanak_div_kgenetaliawanitaId2').style.display='block'"> <label class="custom-control-label" for="dacriasesmenanak_kgenetaliawanitaId_2">Tidak Normal, Sebutkan</label>
                                            </div>
                                            <div class="row" id="dacriasesmenanak_div_kgenetaliawanitaId2" style="display: none;">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10">
                                                    <textarea rows="2" name="dacriasesmenanak_kgenetaliawanitaket" id="dacriasesmenanak_kgenetaliawanitaket" style="width: 100%;" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="row custom-control custom-checkbox custom-control-inline">
                            <input name="dacriasesmenanak_kgenetaliaId" value="2" type="radio" class="custom-control-input" id="dacriasesmenanak_kgenetaliaId_2"> <label class="custom-control-label" for="dacriasesmenanak_kgenetaliaId_2">Laki-laki</label>
                        </div>
                        <div class="row" id="dacriasesmenanak_div_kgenetaliaId2" style="display:none;">
                            <div class="col-md-1"></div>
                            <div class="col-md-11">
                                <div class="row" id="dacriasesmenanak_kgenetalialakiId">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmenanak_kgenetalialakiId" value="1" type="radio" class="custom-control-input" id="dacriasesmenanak_kgenetalialakiId_1" onclick="document.getElementById('dacriasesmenanak_div_kgenetalialakiId2').style.display='none'"> <label class="custom-control-label" for="dacriasesmenanak_kgenetalialakiId_1">Normal</label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmenanak_kgenetalialakiId" value="2" type="radio" class="custom-control-input" id="dacriasesmenanak_kgenetalialakiId_2" onclick="document.getElementById('dacriasesmenanak_div_kgenetalialakiId2').style.display='block'"> <label class="custom-control-label" for="dacriasesmenanak_kgenetalialakiId_2">Tidak Normal, Sebutkan</label>
                                            </div>
                                            <div class="row" id="dacriasesmenanak_div_kgenetalialakiId2" style="display: none;">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10">
                                                    <textarea rows="2" name="dacriasesmenanak_kgenetalialakiket" id="dacriasesmenanak_kgenetalialakiket" style="width: 100%;" class="form-control"></textarea>
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
    <div class="form-group row" style="padding-bottom: 3px; padding-top: 3px; border-bottom-style: solid; border-bottom-width: thin;">
        <div class="col-md-2">
            <label class="col-form-label"> Ekstremitas</label>
        </div>
        <div class="col-md-10">
            <div class="row" id="dacriasesmenanak_kekslist">
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="row custom-control custom-checkbox custom-control-inline">
                            <input name="dacriasesmenanak_kekslist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kekslist_1" onclick="tampilketLainassAnak()"> <label class="custom-control-label" for="dacriasesmenanak_kekslist_1">Gerak</label>
                        </div>
                        <div class="row" id="dacriasesmenanak_div_kekslist1" style="display: none;">
                            <div class="col-md-1"></div>
                            <div class="col-md-11">
                                <div class="row" id="dacriasesmenanak_keksgeraklist">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmenanak_keksgeraklist" value="1" type="radio" class="custom-control-input" id="dacriasesmenanak_keksgeraklist_1"> <label class="custom-control-label" for="dacriasesmenanak_keksgeraklist_1">Bebas</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmenanak_keksgeraklist" value="2" type="radio" class="custom-control-input" id="dacriasesmenanak_keksgeraklist_2"> <label class="custom-control-label" for="dacriasesmenanak_keksgeraklist_2">Terbatas</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmenanak_keksgeraklist" value="3" type="radio" class="custom-control-input" id="dacriasesmenanak_keksgeraklist_3"> <label class="custom-control-label" for="dacriasesmenanak_keksgeraklist_3">Tidak Terkendali</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="row custom-control custom-checkbox custom-control-inline">
                            <input name="dacriasesmenanak_kekslist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kekslist_2" onclick="tampilketLainassAnak()"> <label class="custom-control-label" for="dacriasesmenanak_kekslist_2">Ekstremitas Atas</label>
                        </div>

                        <div class="row" id="dacriasesmenanak_div_kekslist2" style="display: none;">
                            <div class="col-md-1"></div>
                            <div class="col-md-11">
                                <div class="row" id="dacriasesmenanak_keksatasId">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmenanak_keksatasId" value="1" type="radio" class="custom-control-input" id="dacriasesmenanak_keksatasId_1" onclick="document.getElementById('dacriasesmenanak_div_keksatasId2').style.display='none'"> <label class="custom-control-label" for="dacriasesmenanak_keksatasId_1">Normal</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmenanak_keksatasId" value="2" type="radio" class="custom-control-input" id="dacriasesmenanak_keksatasId_2" onclick="document.getElementById('dacriasesmenanak_div_keksatasId2').style.display='block'"> <label class="custom-control-label" for="dacriasesmenanak_keksatasId_2">Tidak Normal, Sebutkan</label>
                                            </div>
                                            <div class="row" id="dacriasesmenanak_div_keksatasId2" style="display: none;">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10">
                                                    <textarea rows="2" name="dacriasesmenanak_keksatasket" id="dacriasesmenanak_keksatasket" style="width: 100%;" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="row custom-control custom-checkbox custom-control-inline">
                            <input name="dacriasesmenanak_kekslist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kekslist_3" onclick="tampilketLainassAnak()"> <label class="custom-control-label" for="dacriasesmenanak_kekslist_3">Ekstremitas Bawah</label>
                        </div>
                        <div class="row" id="dacriasesmenanak_div_kekslist3" style="display: none;">
                            <div class="col-md-1"></div>
                            <div class="col-md-11">
                                <div class="row" id="dacriasesmenanak_keksbawahId">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmenanak_keksbawahId" value="1" type="radio" class="custom-control-input" id="dacriasesmenanak_keksbawahId_1" onclick="document.getElementById('dacriasesmenanak_div_keksbawahId2').style.display='none'"> <label class="custom-control-label" for="dacriasesmenanak_keksbawahId_1">Normal</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmenanak_keksbawahId" value="2" type="radio" class="custom-control-input" id="dacriasesmenanak_keksbawahId_2" onclick="document.getElementById('dacriasesmenanak_div_keksbawahId2').style.display='block'"> <label class="custom-control-label" for="dacriasesmenanak_keksbawahId_2">Tidak Normal, Sebutkan</label>
                                            </div>
                                            <div class="row" id="dacriasesmenanak_div_keksbawahId2" style="display: none;">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10">
                                                    <textarea rows="2" name="dacriasesmenanak_keksbawahket" id="dacriasesmenanak_keksbawahket" style="width: 100%;" class="form-control"></textarea>
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
    <div class="form-group row" style="padding-bottom: 3px; padding-top: 3px; border-bottom-style: solid; border-bottom-width: thin;">
        <div class="col-md-2">
            <label class="col-form-label"> Muskuloskeletal</label>
        </div>
        <div class="col-md-10">
            <div class="row" id="dacriasesmenanak_kmsukullist">
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="row custom-control custom-checkbox custom-control-inline">
                            <input name="dacriasesmenanak_kmsukullist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kmsukullist_1" onclick="tampilketLainassAnak()"> <label class="custom-control-label" for="dacriasesmenanak_kmsukullist_1">Kelainan Tulang</label>
                        </div>
                        <div class="row" id="dacriasesmenanak_div_kmsukullist1" style="display: none;">
                            <div class="col-md-1"></div>
                            <div class="col-md-11">
                                <div class="row" id="dacriasesmenanak_kmsukultulangId">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmenanak_kmsukultulangId" value="1" type="radio" class="custom-control-input" id="dacriasesmenanak_kmsukultulangId_1" onclick="document.getElementById('dacriasesmenanak_div_kmsukultulangId2').style.display='none'"> <label class="custom-control-label" for="dacriasesmenanak_kmsukultulangId_1">Normal</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmenanak_kmsukultulangId" value="2" type="radio" class="custom-control-input" id="dacriasesmenanak_kmsukultulangId_2" onclick="document.getElementById('dacriasesmenanak_div_kmsukultulangId2').style.display='block'"> <label class="custom-control-label" for="dacriasesmenanak_kmsukultulangId_2">Tidak Normal, Sebutkan</label>
                                            </div>
                                            <div class="row" id="dacriasesmenanak_div_kmsukultulangId2" style="display: none;">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10">
                                                    <textarea rows="2" name="dacriasesmenanak_kmsukultulangket" id="dacriasesmenanak_kmsukultulangket" style="width: 100%;" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="row custom-control custom-checkbox custom-control-inline">
                            <input name="dacriasesmenanak_kmsukullist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kmsukullist_2" onclick="tampilketLainassAnak()"> <label class="custom-control-label" for="dacriasesmenanak_kmsukullist_2">Spina/Tulang belakang</label>
                        </div>
                        <div class="row" id="dacriasesmenanak_div_kmsukullist2" style="display: none;">
                            <div class="col-md-1"></div>
                            <div class="col-md-11">
                                <div class="row" id="dacriasesmenanak_kmsukulspinaId">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmenanak_kmsukulspinaId" value="1" type="radio" class="custom-control-input" id="dacriasesmenanak_kmsukulspinaId_1" onclick="document.getElementById('dacriasesmenanak_div_kmsukulspinaId2').style.display='none'"> <label class="custom-control-label" for="dacriasesmenanak_kmsukulspinaId_1">Normal</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmenanak_kmsukulspinaId" value="2" type="radio" class="custom-control-input" id="dacriasesmenanak_kmsukulspinaId_2" onclick="document.getElementById('dacriasesmenanak_div_kmsukulspinaId2').style.display='block'"> <label class="custom-control-label" for="dacriasesmenanak_kmsukulspinaId_2">Tidak Normal, Sebutkan</label>
                                            </div>
                                            <div class="row" id="dacriasesmenanak_div_kmsukulspinaId2" style="display: none;">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10">
                                                    <textarea rows="2" name="dacriasesmenanak_kmsukulspinaket" id="dacriasesmenanak_kmsukulspinaket" style="width: 100%;" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="row custom-control custom-checkbox custom-control-inline">
                            <input name="dacriasesmenanak_kmsukullist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kmsukullist_3" onclick="tampilketLainassAnak()"> <label class="custom-control-label" for="dacriasesmenanak_kmsukullist_3">Tonus Aktifitas</label>
                        </div>
                        <div class="row" id="dacriasesmenanak_div_kmsukullist3" style="display: none;">
                            <div class="col-md-1"></div>
                            <div class="col-md-11">
                                <div class="row" id="dacriasesmenanak_kmsukultonuslist">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmenanak_kmsukultonuslist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kmsukultonuslist_1"> <label class="custom-control-label" for="dacriasesmenanak_kmsukultonuslist_1">Aktif</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmenanak_kmsukultonuslist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kmsukultonuslist_2"> <label class="custom-control-label" for="dacriasesmenanak_kmsukultonuslist_2">Tenang</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmenanak_kmsukultonuslist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kmsukultonuslist_3"> <label class="custom-control-label" for="dacriasesmenanak_kmsukultonuslist_3">Letargi</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmenanak_kmsukultonuslist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kmsukultonuslist_4"> <label class="custom-control-label" for="dacriasesmenanak_kmsukultonuslist_4">Kejang</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="row custom-control custom-checkbox custom-control-inline">
                            <input name="dacriasesmenanak_kmsukullist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenanak_kmsukullist_4" onclick="tampilketLainassAnak()"> <label class="custom-control-label" for="dacriasesmenanak_kmsukullist_4">Menangis</label>
                        </div>
                        <div class="row" id="dacriasesmenanak_div_kmsukullist4" style="display: none;">
                            <div class="col-md-1"></div>
                            <div class="col-md-11">
                                <div class="row" id="dacriasesmenanak_kmsukulnangisId">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmenanak_kmsukulnangisId" value="1" type="radio" class="custom-control-input" id="dacriasesmenanak_kmsukulnangisId_1"> <label class="custom-control-label" for="dacriasesmenanak_kmsukulnangisId_1">Keras</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmenanak_kmsukulnangisId" value="2" type="radio" class="custom-control-input" id="dacriasesmenanak_kmsukulnangisId_2"> <label class="custom-control-label" for="dacriasesmenanak_kmsukulnangisId_2">Lemah</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmenanak_kmsukulnangisId" value="3" type="radio" class="custom-control-input" id="dacriasesmenanak_kmsukulnangisId_3"> <label class="custom-control-label" for="dacriasesmenanak_kmsukulnangisId_3">Melengking</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmenanak_kmsukulnangisId" value="4" type="radio" class="custom-control-input" id="dacriasesmenanak_kmsukulnangisId_4"> <label class="custom-control-label" for="dacriasesmenanak_kmsukulnangisId_4">Sulit Menangis</label>
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
</div>
</div>
</div>

<div class="card card-default">
    <div class="card-header" style="background-color:black;">
        <h3 class="card-title" style="color:white;">ASPEK PENGKAJIAN NYERI (Pasien ini berumur Tahun)</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12 row">
                <div class="card-body">
                    <div class="row" id="dacriasesmenanak_divnyeri2">
                        <div class="col-md-12">
                            <div class="row ">
                                <div class="col-md-12 row d-flex justify-content-center">
                                    <h5>
                                        <label class="col-form-label font-weight-bold">Skrining
                                        Nyeri Anak ≤ 6 tahun Menggunakan FLACC Scale</label>
                                    </h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table-bordered table-condensed table-hover" width="100%">
                                        <tbody>
                                            <tr class="">
                                                <td width="20%" style="padding: 6px;">
                                                    <div class="row d-flex justify-content-center">
                                                        <b><label class="col-form-label">KRITERIA</label></b>
                                                    </div>
                                                </td>
                                                <td width="60%" style="padding: 6px;">
                                                    <div class="row d-flex justify-content-center">
                                                        <b><label class="col-form-label">INDIKATOR</label></b>
                                                    </div>
                                                </td>
                                                <td width="10%" style="padding: 6px;">
                                                    <div class="row d-flex justify-content-center">
                                                        <b><label class="col-form-label">Skor</label></b>
                                                    </div>
                                                </td>
                                                <td width="10%" style="padding: 6px;">
                                                    <div class="row d-flex justify-content-center">
                                                        <b><label class="col-form-label">HASIL</label></b>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="20%" style="padding: 6px;">
                                                    <div class="col-md-12 row d-flex justify-content-center">
                                                        <label class="col-form-label font-weight-bold">Face
                                                        (Wajah)</label>
                                                    </div>
                                                </td>
                                                <td width="60%" style="padding: 6px;">
                                                    <table class="table-borderless table-condensed table-hover" width="100%">
                                                        <tbody>
                                                            <tr onclick="dacriasesmenanakex_setScoreflacc(1, 0);">
                                                                <td width="100%" style="padding: 0;"><label class="col-form-label">Tidak ada ekspresi tertentu atau senyum</label></td>
                                                            </tr>
                                                            <tr onclick="dacriasesmenanakex_setScoreflacc(1, 1);">
                                                                <td style="padding: 0;"><label class="col-form-label">Sesekali meringis/ mengerutkan kening/ menarikdiri/ tidak tertarik</label>
                                                                </td>
                                                            </tr>
                                                            <tr onclick="dacriasesmenanakex_setScoreflacc(1, 2);">
                                                                <td style="padding: 0;"><label class="col-form-label">Sering sampai konstan mengerutkan kening, rahang terkatup, dagu gemetar</label></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td width="10%" style="padding: 6px;">
                                                    <table class="table-borderless table-condensed table-hover" width="100%">
                                                        <tbody>
                                                            <tr align="center" onclick="dacriasesmenanakex_setScoreflacc(1, 0);">
                                                                <td width="100%" style="padding: 0;"><label class="col-form-label">0</label></td>
                                                            </tr>
                                                            <tr align="center" onclick="dacriasesmenanakex_setScoreflacc(1, 1);">
                                                                <td style="padding: 0;"><label class="col-form-label">1</label>
                                                                </td>
                                                            </tr>
                                                            <tr align="center" onclick="dacriasesmenanakex_setScoreflacc(1, 2);">
                                                                <td style="padding: 0;"><label class="col-form-label">2</label>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td width="10%" style="padding: 6px;">
                                                    <table class="" width="100%">
                                                        <tbody>
                                                            <tr height="100%" align="center">
                                                                <td align="center" width="100%" style="padding: 0;">
                                                                    <input type="text" class="form-control text-center font-weight-bold text-center" style="font-size: 30px;" id="dacriasesmenanak_cnyeriflacc1" value="2" readonly>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td width="20%" style="padding: 6px;">
                                                    <div class="col-md-12 row d-flex justify-content-center">
                                                        <label class="col-form-label font-weight-bold">Legs
                                                        (Kaki)</label>
                                                    </div>
                                                </td>
                                                <td width="60%" style="padding: 6px;">
                                                    <table class="table-borderless table-condensed table-hover" width="100%">
                                                        <tbody>
                                                            <tr onclick="dacriasesmenanakex_setScoreflacc(2, 0);">
                                                                <td width="100%" style="padding: 0;"><label class="col-form-label">Posisi normal atau santai</label></td>
                                                            </tr>
                                                            <tr onclick="dacriasesmenanakex_setScoreflacc(2, 1);">
                                                                <td style="padding: 0;"><label class="col-form-label">Cemas,
                                                                gelisah, tegang</label></td>
                                                            </tr>
                                                            <tr onclick="dacriasesmenanakex_setScoreflacc(2, 2);">
                                                                <td style="padding: 0;"><label class="col-form-label">Menendang/
                                                                menarik kaki</label></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td width="10%" style="padding: 6px;">
                                                    <table class="table-borderless table-condensed table-hover" width="100%">
                                                        <tbody>
                                                            <tr align="center" onclick="dacriasesmenanakex_setScoreflacc(2, 0);">
                                                                <td width="100%" style="padding: 0;"><label class="col-form-label">0</label></td>
                                                            </tr>
                                                            <tr align="center" onclick="dacriasesmenanakex_setScoreflacc(2, 1);">
                                                                <td style="padding: 0;"><label class="col-form-label">1</label>
                                                                </td>
                                                            </tr>
                                                            <tr align="center" onclick="dacriasesmenanakex_setScoreflacc(2, 2);">
                                                                <td style="padding: 0;"><label class="col-form-label">2</label>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td width="10%" style="padding: 6px;">
                                                    <table class="" width="100%">
                                                        <tbody>
                                                            <tr height="100%" align="center">
                                                                <td align="center" width="100%" style="padding: 0;">
                                                                    <input style="font-size: 30px;" type="text" class="form-control text-center font-weight-bold" id="dacriasesmenanak_cnyeriflacc2" value="2" readonly>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td width="20%" style="padding: 6px;">
                                                    <div class="col-md-12 row d-flex justify-content-center">
                                                        <label class="col-form-label font-weight-bold">Activity
                                                        (Aktivitas)</label>
                                                    </div>
                                                </td>
                                                <td width="60%" style="padding: 6px;">
                                                    <table class="table-borderless table-condensed table-hover" width="100%">
                                                        <tbody>
                                                            <tr onclick="dacriasesmenanakex_setScoreflacc(3, 0);">
                                                                <td width="100%" style="padding: 0;"><label class="col-form-label">Berbaring tenang, posisi
                                                                normal, bergerak dengan mudah</label></td>
                                                            </tr>
                                                            <tr onclick="dacriasesmenanakex_setScoreflacc(3, 1);">
                                                                <td style="padding: 0;"><label class="col-form-label">Menggeliat,
                                                                mondar-mandir, tegang</label></td>
                                                            </tr>
                                                            <tr onclick="dacriasesmenanakex_setScoreflacc(3, 2);">
                                                                <td style="padding: 0;"><label class="col-form-label">Melengkung/
                                                                kaku/ menyentak</label></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td width="10%" style="padding: 6px;">
                                                    <table class="table-borderless table-condensed table-hover" width="100%">
                                                        <tbody>
                                                            <tr align="center" onclick="dacriasesmenanakex_setScoreflacc(3, 0);">
                                                                <td width="100%" style="padding: 0;"><label class="col-form-label">0</label></td>
                                                            </tr>
                                                            <tr align="center" onclick="dacriasesmenanakex_setScoreflacc(3, 1);">
                                                                <td style="padding: 0;"><label class="col-form-label">1</label>
                                                                </td>
                                                            </tr>
                                                            <tr align="center" onclick="dacriasesmenanakex_setScoreflacc(3, 2);">
                                                                <td style="padding: 0;"><label class="col-form-label">2</label>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td width="10%" style="padding: 6px;">
                                                    <table class="" width="100%">
                                                        <tbody>
                                                            <tr height="100%" align="center">
                                                                <td align="center" width="100%" style="padding: 0;">
                                                                    <input type="text" style="font-size: 30px;" class="form-control font-weight-bold text-center" id="dacriasesmenanak_cnyeriflacc3" value="2" readonly>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td width="20%" style="padding: 6px;">
                                                    <div class="col-md-12 row d-flex justify-content-center">
                                                        <label class="col-form-label font-weight-bold">Cry
                                                        (Menangis)</label>
                                                    </div>
                                                </td>
                                                <td width="60%" style="padding: 6px;">
                                                    <table class="table-borderless table-condensed table-hover" width="100%">
                                                        <tbody>
                                                            <tr onclick="dacriasesmenanakex_setScoreflacc(4, 0);">
                                                                <td width="100%" style="padding: 0;"><label class="col-form-label">Tidak ada teriakan (terjaga
                                                                atau tertidur)</label></td>
                                                            </tr>
                                                            <tr onclick="dacriasesmenanakex_setScoreflacc(4, 1);">
                                                                <td style="padding: 0;"><label class="col-form-label">Mengerang
                                                                atau merintih, sesekali mengeluh</label></td>
                                                            </tr>
                                                            <tr onclick="dacriasesmenanakex_setScoreflacc(4, 2);">
                                                                <td style="padding: 0;"><label class="col-form-label">Menangis
                                                                terus, teriak/ isak tangis, sering mengeluh</label></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td width="10%" style="padding: 6px;">
                                                    <table class="table-borderless table-condensed table-hover" width="100%">
                                                        <tbody>
                                                            <tr align="center" onclick="dacriasesmenanakex_setScoreflacc(4, 0);">
                                                                <td width="100%" style="padding: 0;"><label class="col-form-label">0</label></td>
                                                            </tr>
                                                            <tr align="center" onclick="dacriasesmenanakex_setScoreflacc(4, 1);">
                                                                <td style="padding: 0;"><label class="col-form-label">1</label>
                                                                </td>
                                                            </tr>
                                                            <tr align="center" onclick="dacriasesmenanakex_setScoreflacc(4, 2);">
                                                                <td style="padding: 0;"><label class="col-form-label">2</label>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td width="10%" style="padding: 6px;">
                                                    <table class="" width="100%">
                                                        <tbody>
                                                            <tr height="100%" align="center">
                                                                <td align="center" width="100%" style="padding: 0;">
                                                                    <input type="text" style="font-size: 30px;" class="form-control font-weight-bold text-center" id="dacriasesmenanak_cnyeriflacc4" value="2" readonly>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td width="20%" style="padding: 6px;">
                                                    <div class="col-md-12 row d-flex justify-content-center">
                                                        <label class="col-form-label font-weight-bold">Consolability
                                                        (Bicara/bersuara)</label>
                                                    </div>
                                                </td>
                                                <td width="60%" style="padding: 6px;">
                                                    <table class="table-borderless table-condensed table-hover" width="100%">
                                                        <tbody>
                                                            <tr onclick="dacriasesmenanakex_setScoreflacc(5, 0);">
                                                                <td width="100%" style="padding: 0;"><label class="col-form-label">Puas/ senang/ santai</label></td>
                                                            </tr>
                                                            <tr onclick="dacriasesmenanakex_setScoreflacc(5, 1);">
                                                                <td style="padding: 0;"><label class="col-form-label">Sesekali
                                                                    diyakinkan dengan sentuhan, pelukan atau diajak
                                                                berbicara, dialihkan</label></td>
                                                            </tr>
                                                            <tr onclick="dacriasesmenanakex_setScoreflacc(5, 2);">
                                                                <td style="padding: 0;"><label class="col-form-label">Sulit
                                                                untuk dihibur/ dibuat nyaman</label></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td width="10%" style="padding: 6px;">
                                                    <table class="table-borderless table-condensed table-hover" width="100%">
                                                        <tbody>
                                                            <tr align="center" onclick="dacriasesmenanakex_setScoreflacc(5, 0);">
                                                                <td width="100%" style="padding: 0;"><label class="col-form-label">0</label></td>
                                                            </tr>
                                                            <tr align="center" onclick="dacriasesmenanakex_setScoreflacc(5, 1);">
                                                                <td style="padding: 0;"><label class="col-form-label">1</label>
                                                                </td>
                                                            </tr>
                                                            <tr align="center" onclick="dacriasesmenanakex_setScoreflacc(5, 2);">
                                                                <td style="padding: 0;"><label class="col-form-label">2</label>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td width="10%" style="padding: 6px;">
                                                    <table class="" width="100%">
                                                        <tbody>
                                                            <tr height="100%" align="center">
                                                                <td align="center" width="100%" style="padding: 0;">
                                                                    <input type="text" style="font-size: 30px;" class="form-control font-weight-bold text-center" id="dacriasesmenanak_cnyeriflacc5" value="2" readonly>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="20%" style="padding: 10px;" colspan="3">
                                                    <div class="col-md-12 row d-flex ">
                                                        <h5>
                                                            <label class="col-form-label font-weight-bold">Total
                                                            Skor :</label>
                                                        </h5>
                                                    </div>
                                                </td>
                                                <td width="10%" style="padding: 6px;">
                                                    <table class="" width="100%">
                                                        <tbody>
                                                            <tr height="100%" align="center">
                                                                <td align="center" width="100%" style="padding: 0;">
                                                                    <input type="text" style="font-size: 30px;" class="form-control font-weight-bold text-center" id="dacriasesmenanak_cnyeriflacctot" value="10" readonly>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" style="padding: 10px;">
                                                    <div class="col-md-12 row d-flex">
                                                        <label class="col-form-label font-italic">* Keterangan :
                                                            Skor 0 Tidak Nyeri, 1-3 Nyeri Ringan, 4-6 Nyeri Sedang, 7-10
                                                        Nyeri Berat</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" style="padding: 10px;">
                                                    <div class="col-md-12 row d-flex">
                                                        <label class="col-form-label font-weight-bold">Hasil
                                                        Skrining :&nbsp;</label> <label class="col-form-label font-weight-bold" id="dacriasesmenanak_lskriningnyeri">
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="dacriasesmenanak_divnyeri1">
                            <div class="col-md-12">
                                <div class="row ">
                                    <div class="col-md-12 row d-flex justify-content-center">
                                        <h5>
                                            <label class="col-form-label font-weight-bold">WONG BAKER FACE SCALE AND NUMERIC PAIN RATING SCALE (Pasien &gt; 6 tahun)</label>
                                        </h5>
                                    </div>
                                </div>
                                <div class="row" id="dacriasesmenanak_divnyeri2">
                                    <div class="col-md-2" style="text-align: center;">
                                        <div>
                                            <img src="_assets/nyeri0.png" style="width: 100px;height: 100px;">
                                        </div>
                                        <div>
                                            <label class="form-label">Tidak Nyeri</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="text-align: center;">
                                        <div>
                                            <img src="_assets/nyeri2.png" style="width: 100px;height: 100px;">
                                        </div>
                                        <div>
                                            <label class="form-label">Sedikit Nyeri</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="text-align: center;">
                                        <div>
                                            <img src="_assets/nyeri4.png" style="width: 100px;height: 100px;">
                                        </div>
                                        <div>
                                            <label class="form-label">
                                            Sedikit Lebih Nyeri</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="text-align: center;">
                                        <div>
                                            <img src="_assets/nyeri6.png" style="width: 100px;height: 100px;">
                                        </div>
                                        <div>
                                            <label class="form-label">Lebih Nyeri</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="text-align: center;">
                                        <div>
                                            <img src="_assets/nyeri8.png" style="width: 100px;height: 100px;">
                                        </div>
                                        <div>
                                            <label class="form-label">
                                                Sangat Nyeri
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="text-align: center;">
                                        <div>
                                            <img src="_assets/nyeri10.png" style="width: 100px;height: 100px;">
                                        </div>
                                        <div>
                                            <label class="form-label">Nyeri Sangat Hebat</label>
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-1"><input type="radio" name="keperawatanskorfaceermirna" id="keperawatanskorfaceermirna1" value="0" checked="true"><label>0</label></div>
                                    <div class="col-md-1"><input type="radio" name="keperawatanskorfaceermirna" id="keperawatanskorfaceermirna2" value="1"><label>1</label></div>
                                    <div class="col-md-1"><input type="radio" name="keperawatanskorfaceermirna" id="keperawatanskorfaceermirna3" value="2"><label>2</label></div>
                                    <div class="col-md-1"><input type="radio" name="keperawatanskorfaceermirna" id="keperawatanskorfaceermirna4" value="3"><label>3</label></div>
                                    <div class="col-md-1"><input type="radio" name="keperawatanskorfaceermirna" id="keperawatanskorfaceermirna5" value="4"><label>4</label></div>
                                    <div class="col-md-1"><input type="radio" name="keperawatanskorfaceermirna" id="keperawatanskorfaceermirna6" value="5"><label>5</label></div>
                                    <div class="col-md-1"><input type="radio" name="keperawatanskorfaceermirna" id="keperawatanskorfaceermirna7" value="6"><label>6</label></div>
                                    <div class="col-md-1"><input type="radio" name="keperawatanskorfaceermirna" id="keperawatanskorfaceermirna8" value="7"><label>7</label></div>
                                    <div class="col-md-1"><input type="radio" name="keperawatanskorfaceermirna" id="keperawatanskorfaceermirna9" value="8"><label>8</label></div>
                                    <div class="col-md-1"><input type="radio" name="keperawatanskorfaceermirna" id="keperawatanskorfaceermirna10" value="9"><label>9</label></div>
                                    <div class="col-md-1"><input type="radio" name="keperawatanskorfaceermirna" id="keperawatanskorfaceermirna11" value="10"><label>10</label></div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-default">
        <div class="card-header" style="background-color:black;">
            <h3 class="card-title" style="color:white;">SKRINING STATUS FUNGSIONAL</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 row">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-12">
                                <label class="col-form-label font-italic">* Isilah dan
                                    lengkapilah penilaian Barthel Index dan tentukan tingkat
                                    ketergantungan pasien berdasarkan skor, (untuk pasien anak usia ≥
                                    12 – 18 tahun ), untuk pasien &lt;12 tahun hasil skrining otomatis
                                PERLU BANTUAN BERAT</label>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-12 row d-flex justify-content-center">
                                <h5>
                                    <label class="col-form-label font-weight-bold">BARTHEL
                                    INDEKS</label>
                                </h5>
                            </div>
                        </div>
                        <div class="row " id="dacriasesmenanak_lbatheldiv">
                            <div class="table-responsive">
                                <table class="table-bordered table-condensed table-hover" width="100%">
                                    <tbody>
                                        <tr class="">
                                            <td width="40%" style="padding: 6px;">
                                                <div class="row d-flex justify-content-center">
                                                    <b><label class="col-form-label">INDIKATOR</label></b>
                                                </div>
                                            </td>
                                            <td width="10%" style="padding: 6px;">
                                                <div class="row d-flex justify-content-center">
                                                    <b><label class="col-form-label">SKOR</label></b>
                                                </div>
                                            </td>
                                            <td width="40%" style="padding: 6px;">
                                                <div class="row d-flex justify-content-center">
                                                    <b><label class="col-form-label">INDIKATOR</label></b>
                                                </div>
                                            </td>
                                            <td width="10%" style="padding: 6px;">
                                                <div class="row d-flex justify-content-center">
                                                    <b><label class="col-form-label">SKOR</label></b>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="40%" style="padding: 6px;"><b><label class="col-form-label">Mengendalikan Rangsang Buang
                                            Air ( BAB)</label></b>
                                            <table class="table-borderless table-condensed table-hover" width="100%">
                                                <tbody>
                                                    <tr onclick="dacriasesmenanakex_setScoreBarthel(0, 1);">
                                                        <td width="100%" style="padding: 0;"><label class="col-form-label">0 = Tidak Terkendali / Tidak
                                                        Teratur (Perlu Pencahar)</label></td>
                                                    </tr>
                                                    <tr onclick="dacriasesmenanakex_setScoreBarthel(1, 1);">
                                                        <td style="padding: 0;"><label class="col-form-label">1
                                                        = Kadang-Kadang Tidak Terkendali(Satu Kali/Minggu)</label></td>
                                                    </tr>
                                                    <tr onclick="dacriasesmenanakex_setScoreBarthel(2, 1);">
                                                        <td style="padding: 0;"><label class="col-form-label">2
                                                        = Mandiri/Mampu Mengendalikan</label></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td width="10%" style="padding: 6px;">
                                            <table class="" width="100%">
                                                <tbody>
                                                    <tr height="100%" align="center">
                                                        <td align="center" width="100%" style="padding: 0;">
                                                            <input type="text" class="form-control text-center font-weight-bold text-center" style="font-size: 30px;" id="dacriasesmenanak_lbathel1" value="2" readonly>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td width="40%" style="padding: 6px;"><b><label class="col-form-label">Berubah sikap dari berbaring ke
                                        duduk</label></b>
                                        <table class="table-borderless table-condensed table-hover" width="100%">
                                            <tbody>
                                                <tr onclick="dacriasesmenanakex_setScoreBarthel(0, 2);">
                                                    <td width="100%" style="padding: 0;"><label class="col-form-label">0 = Tidak Mampu Duduk
                                                    Seimbang</label></td>
                                                </tr>
                                                <tr onclick="dacriasesmenanakex_setScoreBarthel(1, 2);">
                                                    <td style="padding: 0;"><label class="col-form-label">1
                                                    = Perlu Banyak Bantuan Untuk Bisa Duduk (2 Orang)</label></td>
                                                </tr>
                                                <tr onclick="dacriasesmenanakex_setScoreBarthel(2, 2);">
                                                    <td style="padding: 0;"><label class="col-form-label">2
                                                    = Bantuan Sedikit (Verbal Dan Fisik)</label></td>
                                                </tr>
                                                <tr onclick="dacriasesmenanakex_setScoreBarthel(3, 2);">
                                                    <td style="padding: 0;"><label class="col-form-label">3
                                                    = Mandiri</label></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td width="10%" style="padding: 6px;">
                                        <table class="" width="100%">
                                            <tbody>
                                                <tr height="100%" align="center">
                                                    <td align="center" width="100%" style="padding: 0;">
                                                        <input type="text" class="form-control text-center font-weight-bold text-center" style="font-size: 30px;" id="dacriasesmenanak_lbathel2" value="3" readonly>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="40%" style="padding: 6px;"><b><label class="col-form-label">Mengendalikan Rangsang Buang
                                    Air kecil ( BAK)</label></b>
                                    <table class="table-borderless table-condensed table-hover" width="100%">
                                        <tbody>
                                            <tr onclick="dacriasesmenanakex_setScoreBarthel(0, 3);">
                                                <td width="100%" style="padding: 0;"><label class="col-form-label">0=Tidak Terkendali / Pakai
                                                Kateter Dan Tidak Mampu Mengendalikan</label></td>
                                            </tr>
                                            <tr onclick="dacriasesmenanakex_setScoreBarthel(1, 3);">
                                                <td style="padding: 0;"><label class="col-form-label">1
                                                = Kadang – Kadang Tidak Terkendali(1x 24 Jam)</label></td>
                                            </tr>
                                            <tr onclick="dacriasesmenanakex_setScoreBarthel(2, 3);">
                                                <td style="padding: 0;"><label class="col-form-label">2
                                                = Mandiri</label></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td width="10%" style="padding: 6px;">
                                    <table class="" width="100%">
                                        <tbody>
                                            <tr height="100%" align="center">
                                                <td align="center" width="100%" style="padding: 0;">
                                                    <input type="text" class="form-control text-center font-weight-bold text-center" style="font-size: 30px;" id="dacriasesmenanak_lbathel3" value="2" readonly>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td width="40%" style="padding: 6px;"><b><label class="col-form-label">Berpindah / Berjalan</label></b>
                                    <table class="table-borderless table-condensed table-hover" width="100%">
                                        <tbody>
                                            <tr onclick="dacriasesmenanakex_setScoreBarthel(0, 4);">
                                                <td width="100%" style="padding: 0;"><label class="col-form-label">0 = Tidak Mampu</label></td>
                                            </tr>
                                            <tr onclick="dacriasesmenanakex_setScoreBarthel(1, 4);">
                                                <td style="padding: 0;"><label class="col-form-label">1
                                                = Bisa (Pindah) Dengan Kursi Roda</label></td>
                                            </tr>
                                            <tr onclick="dacriasesmenanakex_setScoreBarthel(2, 4);">
                                                <td style="padding: 0;"><label class="col-form-label">2
                                                = Berjalan Dengan Bantuan 1 Orang</label></td>
                                            </tr>
                                            <tr onclick="dacriasesmenanakex_setScoreBarthel(3, 4);">
                                                <td style="padding: 0;"><label class="col-form-label">3
                                                = Mandiri</label></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td width="10%" style="padding: 6px;">
                                    <table class="" width="100%">
                                        <tbody>
                                            <tr height="100%" align="center">
                                                <td align="center" width="100%" style="padding: 0;">
                                                    <input type="text" class="form-control text-center font-weight-bold text-center" style="font-size: 30px;" id="dacriasesmenanak_lbathel4" value="3" readonly>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" style="padding: 6px;"><b><label class="col-form-label">Membersihkan diri (cuci muka,
                                sisir rambut, sikat gigi)</label></b>
                                <table class="table-borderless table-condensed table-hover" width="100%">
                                    <tbody>
                                        <tr onclick="dacriasesmenanakex_setScoreBarthel(0, 5);">
                                            <td width="100%" style="padding: 0;"><label class="col-form-label">0 = Butuh Pertolongan Orang
                                            Lain</label></td>
                                        </tr>
                                        <tr onclick="dacriasesmenanakex_setScoreBarthel(1, 5);">
                                            <td style="padding: 0;"><label class="col-form-label">1
                                            = Mandiri</label></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td width="10%" style="padding: 6px;">
                                <table class="" width="100%">
                                    <tbody>
                                        <tr height="100%" align="center">
                                            <td align="center" width="100%" style="padding: 0;">
                                                <input type="text" class="form-control text-center font-weight-bold text-center" style="font-size: 30px;" id="dacriasesmenanak_lbathel5" value="1" readonly>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td width="40%" style="padding: 6px;"><b><label class="col-form-label">Memakai Baju</label></b>
                                <table class="table-borderless table-condensed table-hover" width="100%">
                                    <tbody>
                                        <tr onclick="dacriasesmenanakex_setScoreBarthel(0, 6);">
                                            <td width="100%" style="padding: 0;"><label class="col-form-label">0 = Tergantung Orang Lain</label></td>
                                        </tr>
                                        <tr onclick="dacriasesmenanakex_setScoreBarthel(1, 6);">
                                            <td style="padding: 0;"><label class="col-form-label">1
                                            = Sebagian Dibantu (Misalnya Mengancing Baju)</label></td>
                                        </tr>
                                        <tr onclick="dacriasesmenanakex_setScoreBarthel(2, 6);">
                                            <td style="padding: 0;"><label class="col-form-label">2
                                            = Mandiri</label></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td width="10%" style="padding: 6px;">
                                <table class="" width="100%">
                                    <tbody>
                                        <tr height="100%" align="center">
                                            <td align="center" width="100%" style="padding: 0;">
                                                <input type="text" class="form-control text-center font-weight-bold text-center" style="font-size: 30px;" id="dacriasesmenanak_lbathel6" value="2" readonly>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td width="40%" style="padding: 6px;"><b><label class="col-form-label">Penggunaan toilet masuk dan
                            keluar (melepaskan, memakai celana, membersihkan, menyiram)</label></b>
                            <table class="table-borderless table-condensed table-hover" width="100%">
                                <tbody>
                                    <tr onclick="dacriasesmenanakex_setScoreBarthel(0, 7);">
                                        <td width="100%" style="padding: 0;"><label class="col-form-label">0 = Tergantung Pertolongan
                                        Orang Lain</label></td>
                                    </tr>
                                    <tr onclick="dacriasesmenanakex_setScoreBarthel(1, 7);">
                                        <td style="padding: 0;"><label class="col-form-label">1
                                            = Perlu Pertolongan Pada Beberapa Kegiatan Tetapi Dapat
                                        Mengerjakan Sendiri Kegiatan Yang Lain</label></td>
                                    </tr>
                                    <tr onclick="dacriasesmenanakex_setScoreBarthel(2, 7);">
                                        <td style="padding: 0;"><label class="col-form-label">2
                                            = Mandiri (Masuk Dan Keluar, Berpakaian Dan Membersihkan
                                        Diri)</label></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td width="10%" style="padding: 6px;">
                            <table class="" width="100%">
                                <tbody>
                                    <tr height="100%" align="center">
                                        <td align="center" width="100%" style="padding: 0;">
                                            <input type="text" class="form-control text-center font-weight-bold text-center" style="font-size: 30px;" id="dacriasesmenanak_lbathel7" value="2" readonly>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td width="40%" style="padding: 6px;"><b><label class="col-form-label">Naik Turun Tangga</label></b>
                            <table class="table-borderless table-condensed table-hover" width="100%">
                                <tbody>
                                    <tr onclick="dacriasesmenanakex_setScoreBarthel(0, 8);">
                                        <td width="100%" style="padding: 0;"><label class="col-form-label">0 = Tidak Mampu</label></td>
                                    </tr>
                                    <tr onclick="dacriasesmenanakex_setScoreBarthel(1, 8);">
                                        <td style="padding: 0;"><label class="col-form-label">1
                                        = Butuh Pertolongan</label></td>
                                    </tr>
                                    <tr onclick="dacriasesmenanakex_setScoreBarthel(2, 8);">
                                        <td style="padding: 0;"><label class="col-form-label">2
                                        = Mandiri</label></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td width="10%" style="padding: 6px;">
                            <table class="" width="100%">
                                <tbody>
                                    <tr height="100%" align="center">
                                        <td align="center" width="100%" style="padding: 0;">
                                            <input type="text" class="form-control text-center font-weight-bold text-center" style="font-size: 30px;" id="dacriasesmenanak_lbathel8" value="2" readonly>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td width="40%" style="padding: 6px;"><b><label class="col-form-label">Makan</label></b>
                            <table class="table-borderless table-condensed table-hover" width="100%">
                                <tbody>
                                    <tr onclick="dacriasesmenanakex_setScoreBarthel(0, 9);">
                                        <td width="100%" style="padding: 0;"><label class="col-form-label">0 = Tidak Mampu</label></td>
                                    </tr>
                                    <tr onclick="dacriasesmenanakex_setScoreBarthel(1, 9);">
                                        <td style="padding: 0;"><label class="col-form-label">1
                                        = Perlu Ditolong Memotong Makanan</label></td>
                                    </tr>
                                    <tr onclick="dacriasesmenanakex_setScoreBarthel(2, 9);">
                                        <td style="padding: 0;"><label class="col-form-label">2
                                        = Mandiri</label></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td width="10%" style="padding: 6px;">
                            <table class="" width="100%">
                                <tbody>
                                    <tr height="100%" align="center">
                                        <td align="center" width="100%" style="padding: 0;">
                                            <input type="text" class="form-control text-center font-weight-bold text-center" style="font-size: 30px;" id="dacriasesmenanak_lbathel9" value="2" readonly>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td width="40%" style="padding: 6px;"><b><label class="col-form-label">Mandi</label></b>
                            <table class="table-borderless table-condensed table-hover" width="100%">
                                <tbody>
                                    <tr onclick="dacriasesmenanakex_setScoreBarthel(0, 10);">
                                        <td width="100%" style="padding: 0;"><label class="col-form-label">0 = Tergantung Orang Lain</label></td>
                                    </tr>
                                    <tr onclick="dacriasesmenanakex_setScoreBarthel(1, 10);">
                                        <td style="padding: 0;"><label class="col-form-label">1
                                        = Mandiri</label></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td width="10%" style="padding: 6px;">
                            <table class="" width="100%">
                                <tbody>
                                    <tr height="100%" align="center">
                                        <td align="center" width="100%" style="padding: 0;">
                                            <input type="text" class="form-control text-center font-weight-bold text-center" style="font-size: 30px;" id="dacriasesmenanak_lbathel10" value="1" readonly>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td width="20%" style="padding: 10px;" colspan="3">
                            <div class="col-md-12 row d-flex ">
                                <h5>
                                    <label class="col-form-label font-weight-bold">Total
                                    Skor :</label>
                                </h5>
                            </div>
                        </td>
                        <td width="10%" style="padding: 10px;">
                            <table width="100%">
                                <tbody>
                                    <tr height="100%" align="center">
                                        <td align="center" width="100%" style="padding: 0;">
                                            <input type="text" class="form-control text-center font-weight-bold text-center" style="font-size: 30px;" id="dacriasesmenanak_lbatheltotal" value="20" readonly>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" id="dacriasesmenanak_lfungsionalId">
            <div class="custom-control custom-checkbox custom-control-inline">
                <input name="dacriasesmenanak_lfungsionalId" value="1" type="radio" class="custom-control-input" id="dacriasesmenanak_lfungsionalId_1"> <label class="custom-control-label" for="dacriasesmenanak_lfungsionalId_1">Mandiri (Skor 20)</label>
            </div>
            <div class="custom-control custom-checkbox custom-control-inline">
                <input name="dacriasesmenanak_lfungsionalId" value="2" type="radio" class="custom-control-input" id="dacriasesmenanak_lfungsionalId_2"> <label class="custom-control-label" for="dacriasesmenanak_lfungsionalId_2">Perlu bantuan Ringan (12 – 19)</label>
            </div>
            <div class="custom-control custom-checkbox custom-control-inline">
                <input name="dacriasesmenanak_lfungsionalId" value="3" type="radio" class="custom-control-input" id="dacriasesmenanak_lfungsionalId_3"> <label class="custom-control-label" for="dacriasesmenanak_lfungsionalId_3">Perlu bantuan Sedang (9-11)</label>
            </div>
            <div class="custom-control custom-checkbox custom-control-inline">
                <input name="dacriasesmenanak_lfungsionalId" value="4" type="radio" class="custom-control-input" id="dacriasesmenanak_lfungsionalId_4"> <label class="custom-control-label" for="dacriasesmenanak_lfungsionalId_4">Perlu bantuan berat (5-8)</label>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
<div class="card card-default">
    <div class="card-header" style="background-color:black;">
        <h3 class="card-title" style="color:white;">SKRINING GIZI</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="row ">
            <div class="col-md-6">
                <div class="form-group row">
                    <div class="col-md-12">
                        <label class="col-form-label">1. Apakah pasien tampak kurus :</label>
                    </div>
                </div>
                <div class="form-group row" style="padding-bottom: 10px;">
                    <div class="col-md-1"></div>
                    <div class="col-md-9">
                        <div class="row" id="dacriasesmenanak_egizia">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                        <input name="dacriasesmenanak_egizia" value="0" type="radio" class="custom-control-input" id="dacriasesmenanak_egizia_1" onclick="dacriasesmenanakex_sethasilgizi();" checked> <label class="custom-control-label" for="dacriasesmenanak_egizia_1">Tidak</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                        <input name="dacriasesmenanak_egizia" value="1" type="radio" class="custom-control-input" id="dacriasesmenanak_egizia_2" onclick="dacriasesmenanakex_sethasilgizi();"> <label class="custom-control-label" for="dacriasesmenanak_egizia_2">Ya</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label class="col-form-label">2. Apakah ada penurunan berat badan
                        dalam satu bulan terakhir?</label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label class="col-form-label">(Berdasarkan penilaian
                            objektif data BB bila ada dan atau penilaian subjektif orang
                            tua pasien atau untuk bayi &lt;1 tahun BB tidak naik selama 3
                        bulan terakhir)</label>
                    </div>
                </div>
                <div class="form-group row" style="padding-bottom: 10px;">
                    <div class="col-md-1"></div>
                    <div class="col-md-9">
                        <div class="row" id="dacriasesmenanak_egizib">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                        <input name="dacriasesmenanak_egizib" value="0" type="radio" class="custom-control-input" id="dacriasesmenanak_egizib_1" onclick="dacriasesmenanakex_sethasilgizi();" checked> <label class="custom-control-label" for="dacriasesmenanak_egizib_1">Tidak</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                        <input name="dacriasesmenanak_egizib" value="1" type="radio" class="custom-control-input" id="dacriasesmenanak_egizib_2" onclick="dacriasesmenanakex_sethasilgizi();"> <label class="custom-control-label" for="dacriasesmenanak_egizib_2">Ya</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <div class="col-md-12"><label class="col-form-label">3. Apakah ada salah satu kondisi
                    berikut :</label>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-1"></div>
                <div class="col-md-9">
                    <label class="col-form-label">a. Diare ≥ 5x/hari dan
                    atau muntah ≥ 3x/hari dalam seminggu terakhir</label>
                </div>
            </div>
            <div class="form-group row" style="padding-bottom: 10px;">
                <div class="col-md-1"></div>
                <div class="col-md-9">
                    <div class="row" id="dacriasesmenanak_egizic1">
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="row custom-control custom-checkbox custom-control-inline">
                                    <input name="dacriasesmenanak_egizic1" value="0" type="radio" class="custom-control-input" id="dacriasesmenanak_egizic1_1" onclick="dacriasesmenanakex_sethasilgizi();" checked> <label class="custom-control-label" for="dacriasesmenanak_egizic1_1">Tidak</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="row custom-control custom-checkbox custom-control-inline">
                                    <input name="dacriasesmenanak_egizic1" value="1" type="radio" class="custom-control-input" id="dacriasesmenanak_egizic1_2" onclick="dacriasesmenanakex_sethasilgizi();"> <label class="custom-control-label" for="dacriasesmenanak_egizic1_2">Ya</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-1"></div>
                <div class="col-md-9">
                    <label class="col-form-label">b. Asupan makan berkurang
                    selama seminggu terakhir</label>
                </div>
            </div>
            <div class="form-group row" style="padding-bottom: 10px;">
                <div class="col-md-1"></div>
                <div class="col-md-9">
                    <div class="row" id="dacriasesmenanak_egizic2">
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="row custom-control custom-checkbox custom-control-inline">
                                    <input name="dacriasesmenanak_egizic2" value="0" type="radio" class="custom-control-input" id="dacriasesmenanak_egizic2_1" onclick="dacriasesmenanakex_sethasilgizi();" checked> <label class="custom-control-label" for="dacriasesmenanak_egizic2_1">Tidak</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="row custom-control custom-checkbox custom-control-inline">
                                    <input name="dacriasesmenanak_egizic2" value="1" type="radio" class="custom-control-input" id="dacriasesmenanak_egizic2_2" onclick="dacriasesmenanakex_sethasilgizi();"> <label class="custom-control-label" for="dacriasesmenanak_egizic2_2">Ya</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <label class="col-form-label">4. Apakah terdapat penyakit atau keadaan yang menyebabkan pasien berisiko mengalami malnutrisi ?</label>
                </div>
            </div>
            <div class="form-group row" style="padding-bottom: 10px;">
                <div class="col-md-1"></div>
                <div class="col-md-9">
                    <div class="row" id="dacriasesmenanak_egizid">
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="row custom-control custom-checkbox custom-control-inline">
                                    <input name="dacriasesmenanak_egizid" value="0" type="radio" class="custom-control-input" id="dacriasesmenanak_egizid_1" onclick="dacriasesmenanakex_sethasilgizi();" checked> <label class="custom-control-label" for="dacriasesmenanak_egizid_1">Tidak</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="row custom-control custom-checkbox custom-control-inline">
                                    <input name="dacriasesmenanak_egizid" value="1" type="radio" class="custom-control-input" id="dacriasesmenanak_egizid_2" onclick="dacriasesmenanakex_sethasilgizi();"> <label class="custom-control-label" for="dacriasesmenanak_egizid_2">Ya</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <div class="col-md-2">
                    <b><label class="col-form-label">Total Skor </label></b>
                </div>
                <div class="col-md-2">
                    <input type="number" onfocus="this.select();" class="form-control font-weight-bold" name="dacriasesmenanak_egiziskor" id="dacriasesmenanak_egiziskor" value="0">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <label class="col-form-label font-italic">* Catatan :
                    Skor 0 Risiko Rendah, Skor 1-3 Risiko Sedang, 4-5 Risiko Berat</label>
                </div>
                <div class="col-md-12 row d-flex">
                    <label class="col-form-label font-weight-bold">Hasil
                    Skrining :&nbsp;</label> <label class="col-form-label font-weight-bold" id="dacriasesmenanak_lgiziskor"></label>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="card card-default">
    <div class="card-header" style="background-color:black;">
        <h3 class="card-title" style="color:white;">SKRINING RISIKO CEDERA / JATUH</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="row ">
            <div class="col-lg-12 row">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row ">
                                <div class="col-md-12">
                                    <label class="col-form-label font-italic">* Anak usia &lt;
                                        13 tahun dianggap berisiko tinggi dan untuk anak usia 13 sampai
                                        &lt;18 tahun dilakukan pengkajian risiko jatuh anak dengan
                                    menggunakan Humpty Dumpty Scale</label>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-12 row d-flex justify-content-center">
                                    <h5>
                                        <label class="col-form-label font-weight-bold">PENGKAJIAN
                                        RISIKO JATUH PADA ANAK USIA 13 SAMPAI &lt;18 TAHUN</label>
                                    </h5>
                                </div>
                            </div>
                            <div class="row " id="dacriasesmenanak_mrisikodiv">
                                <div class="table-responsive">
                                    <table class="table-bordered table-condensed table-hover" width="100%">
                                        <tbody>
                                            <tr class="">
                                                <td width="20%" style="padding: 6px;" colspan="2">
                                                    <div class="row d-flex justify-content-center">
                                                        <b><label class="col-form-label">PARAMETER</label></b>
                                                    </div>
                                                </td>
                                                <td width="60%" style="padding: 6px;">
                                                    <div class="row d-flex justify-content-center">
                                                        <b><label class="col-form-label">STATUS KONDISI
                                                        PASIEN</label></b>
                                                    </div>
                                                </td>
                                                <td width="10%" style="padding: 6px;">
                                                    <div class="row d-flex justify-content-center">
                                                        <b><label class="col-form-label">SKOR</label></b>
                                                    </div>
                                                </td>
                                                <td width="10%" style="padding: 6px;">
                                                    <div class="row d-flex justify-content-center">
                                                        <b><label class="col-form-label">HASIL</label></b>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="5%" style="padding: 6px;">
                                                    <div class="col-md-12 row d-flex justify-content-center">
                                                        <label class="col-form-label font-weight-bold">A</label>
                                                    </div>
                                                </td>
                                                <td width="15%" style="padding: 6px;">
                                                    <div class="col-md-12 row d-flex justify-content-center">
                                                        <label class="col-form-label font-weight-bold">Usia</label>
                                                    </div>
                                                </td>
                                                <td width="60%" style="padding: 6px;">
                                                    <table class="table-borderless table-condensed table-hover" width="100%">
                                                        <tbody>
                                                            <tr onclick="dacriasesmenanakex_setScoreRisiko(1, 1);">
                                                                <td width="100%" style="padding: 0;"><label class="col-form-label">≥ 13 Tahun</label></td>
                                                            </tr>
                                                            <tr onclick="dacriasesmenanakex_setScoreRisiko(2, 1);">
                                                                <td style="padding: 0;"><label class="col-form-label">7
                                                                - &lt;13 Tahun</label></td>
                                                            </tr>
                                                            <tr onclick="dacriasesmenanakex_setScoreRisiko(3, 1);">
                                                                <td style="padding: 0;"><label class="col-form-label">3
                                                                - &lt;7 Tahun</label></td>
                                                            </tr>
                                                            <tr onclick="dacriasesmenanakex_setScoreRisiko(4, 1);">
                                                                <td style="padding: 0;"><label class="col-form-label">
                                                                &lt;3 Tahun</label></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td width="10%" style="padding: 6px;">
                                                    <table class="table-borderless table-condensed table-hover" width="100%">
                                                        <tbody>
                                                            <tr align="center" onclick="dacriasesmenanakex_setScoreRisiko(1, 1);">
                                                                <td width="100%" style="padding: 0;"><label class="col-form-label">1</label></td>
                                                            </tr>
                                                            <tr align="center" onclick="dacriasesmenanakex_setScoreRisiko(2, 1);">
                                                                <td style="padding: 0;"><label class="col-form-label">2</label>
                                                                </td>
                                                            </tr>
                                                            <tr align="center" onclick="dacriasesmenanakex_setScoreRisiko(3, 1);">
                                                                <td style="padding: 0;"><label class="col-form-label">3</label>
                                                                </td>
                                                            </tr>
                                                            <tr align="center" onclick="dacriasesmenanakex_setScoreRisiko(4, 1);">
                                                                <td style="padding: 0;"><label class="col-form-label">4</label>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td width="10%" style="padding: 6px;">
                                                    <table class="" width="100%">
                                                        <tbody>
                                                            <tr height="100%" align="center">
                                                                <td align="center" width="100%" style="padding: 0;">
                                                                    <input type="text" class="form-control text-center font-weight-bold text-center" style="font-size: 30px;" id="dacriasesmenanak_mrisikoskor1" value="4" readonly>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="5%" style="padding: 6px;">
                                                    <div class="col-md-12 row d-flex justify-content-center">
                                                        <label class="col-form-label font-weight-bold">B</label>
                                                    </div>
                                                </td>
                                                <td width="15%" style="padding: 6px;">
                                                    <div class="col-md-12 row d-flex justify-content-center">
                                                        <label class="col-form-label font-weight-bold">Jenis
                                                        Kelamin</label>
                                                    </div>
                                                </td>
                                                <td width="60%" style="padding: 6px;">
                                                    <table class="table-borderless table-condensed table-hover" width="100%">
                                                        <tbody>
                                                            <tr onclick="dacriasesmenanakex_setScoreRisiko(1, 2);">
                                                                <td width="100%" style="padding: 0;"><label class="col-form-label">Perempuan</label></td>
                                                            </tr>
                                                            <tr onclick="dacriasesmenanakex_setScoreRisiko(2, 2);">
                                                                <td style="padding: 0;"><label class="col-form-label">Laki-laki</label>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td width="10%" style="padding: 6px;">
                                                    <table class="table-borderless table-condensed table-hover" width="100%">
                                                        <tbody>
                                                            <tr align="center" onclick="dacriasesmenanakex_setScoreRisiko(1, 2);">
                                                                <td width="100%" style="padding: 0;"><label class="col-form-label">1</label></td>
                                                            </tr>
                                                            <tr align="center" onclick="dacriasesmenanakex_setScoreRisiko(2, 2);">
                                                                <td style="padding: 0;"><label class="col-form-label">2</label>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td width="10%" style="padding: 6px;">
                                                    <table class="" width="100%">
                                                        <tbody>
                                                            <tr height="100%" align="center">
                                                                <td align="center" width="100%" style="padding: 0;">
                                                                    <input type="text" class="form-control text-center font-weight-bold text-center" style="font-size: 30px;" id="dacriasesmenanak_mrisikoskor2" value="2" readonly>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="5%" style="padding: 6px;">
                                                    <div class="col-md-12 row d-flex justify-content-center">
                                                        <label class="col-form-label font-weight-bold">C</label>
                                                    </div>
                                                </td>
                                                <td width="15%" style="padding: 6px;">
                                                    <div class="col-md-12 row d-flex justify-content-center">
                                                        <label class="col-form-label font-weight-bold">Diagnosis</label>
                                                    </div>
                                                </td>
                                                <td width="60%" style="padding: 6px;">
                                                    <table class="table-borderless table-condensed table-hover" width="100%">
                                                        <tbody>
                                                            <tr onclick="dacriasesmenanakex_setScoreRisiko(1, 3);">
                                                                <td width="100%" style="padding: 0;"><label class="col-form-label">Diagnosis lainnya</label></td>
                                                            </tr>
                                                            <tr onclick="dacriasesmenanakex_setScoreRisiko(2, 3);">
                                                                <td style="padding: 0;"><label class="col-form-label">Gangguan
                                                                prilaku / psikiatri</label></td>
                                                            </tr>
                                                            <tr onclick="dacriasesmenanakex_setScoreRisiko(3, 3);">
                                                                <td style="padding: 0;"><label class="col-form-label">Perubahan
                                                                    oksigenisasi (Diagnosis respiratorik, dehidrasi, anemia,
                                                                anoreksia, sinkop, sakit kepala, dll)</label></td>
                                                            </tr>
                                                            <tr onclick="dacriasesmenanakex_setScoreRisiko(4, 3);">
                                                                <td style="padding: 0;"><label class="col-form-label">Diagnosis
                                                                neurologi</label></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td width="10%" style="padding: 6px;">
                                                    <table class="table-borderless table-condensed table-hover" width="100%">
                                                        <tbody>
                                                            <tr align="center" onclick="dacriasesmenanakex_setScoreRisiko(1, 3);">
                                                                <td width="100%" style="padding: 0;"><label class="col-form-label">1</label></td>
                                                            </tr>
                                                            <tr align="center" onclick="dacriasesmenanakex_setScoreRisiko(2, 3);">
                                                                <td style="padding: 0;"><label class="col-form-label">2</label>
                                                                </td>
                                                            </tr>
                                                            <tr align="center" onclick="dacriasesmenanakex_setScoreRisiko(3, 3);">
                                                                <td style="padding: 0;"><label class="col-form-label">3</label>
                                                                </td>
                                                            </tr>
                                                            <tr align="center" onclick="dacriasesmenanakex_setScoreRisiko(4, 3);">
                                                                <td style="padding: 0;"><label class="col-form-label">4</label>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td width="10%" style="padding: 6px;">
                                                    <table class="" width="100%">
                                                        <tbody>
                                                            <tr height="100%" align="center">
                                                                <td align="center" width="100%" style="padding: 0;">
                                                                    <input type="text" class="form-control text-center font-weight-bold text-center" style="font-size: 30px;" id="dacriasesmenanak_mrisikoskor3" value="4" readonly>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="5%" style="padding: 6px;">
                                                    <div class="col-md-12 row d-flex justify-content-center">
                                                        <label class="col-form-label font-weight-bold">D</label>
                                                    </div>
                                                </td>
                                                <td width="15%" style="padding: 6px;">
                                                    <div class="col-md-12 row d-flex justify-content-center">
                                                        <label class="col-form-label font-weight-bold">Gangguan
                                                        Kognitif</label>
                                                    </div>
                                                </td>
                                                <td width="60%" style="padding: 6px;">
                                                    <table class="table-borderless table-condensed table-hover" width="100%">
                                                        <tbody>
                                                            <tr onclick="dacriasesmenanakex_setScoreRisiko(1, 4);">
                                                                <td width="100%" style="padding: 0;"><label class="col-form-label">Orientasi baik terhadap
                                                                diri sendiri</label></td>
                                                            </tr>
                                                            <tr onclick="dacriasesmenanakex_setScoreRisiko(2, 4);">
                                                                <td style="padding: 0;"><label class="col-form-label">Lupa
                                                                akan keterbatasan</label></td>
                                                            </tr>
                                                            <tr onclick="dacriasesmenanakex_setScoreRisiko(3, 4);">
                                                                <td style="padding: 0;"><label class="col-form-label">Tidak
                                                                menyadari keterbatasan dirinya</label></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td width="10%" style="padding: 6px;">
                                                    <table class="table-borderless table-condensed table-hover" width="100%">
                                                        <tbody>
                                                            <tr align="center" onclick="dacriasesmenanakex_setScoreRisiko(1, 4);">
                                                                <td width="100%" style="padding: 0;"><label class="col-form-label">1</label></td>
                                                            </tr>
                                                            <tr align="center" onclick="dacriasesmenanakex_setScoreRisiko(2, 4);">
                                                                <td style="padding: 0;"><label class="col-form-label">2</label>
                                                                </td>
                                                            </tr>
                                                            <tr align="center" onclick="dacriasesmenanakex_setScoreRisiko(3, 4);">
                                                                <td style="padding: 0;"><label class="col-form-label">3</label>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td width="10%" style="padding: 6px;">
                                                    <table class="" width="100%">
                                                        <tbody>
                                                            <tr height="100%" align="center">
                                                                <td align="center" width="100%" style="padding: 0;">
                                                                    <input type="text" class="form-control text-center font-weight-bold text-center" style="font-size: 30px;" id="dacriasesmenanak_mrisikoskor4" value="3" readonly>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="5%" style="padding: 6px;">
                                                    <div class="col-md-12 row d-flex justify-content-center">
                                                        <label class="col-form-label font-weight-bold">E</label>
                                                    </div>
                                                </td>
                                                <td width="15%" style="padding: 6px;">
                                                    <div class="col-md-12 row d-flex justify-content-center">
                                                        <label class="col-form-label font-weight-bold">Faktor
                                                        Lingkungan</label>
                                                    </div>
                                                </td>
                                                <td width="60%" style="padding: 6px;">
                                                    <table class="table-borderless table-condensed table-hover" width="100%">
                                                        <tbody>
                                                            <tr onclick="dacriasesmenanakex_setScoreRisiko(1, 5);">
                                                                <td width="100%" style="padding: 0;"><label class="col-form-label">Area rawat jalan</label></td>
                                                            </tr>
                                                            <tr onclick="dacriasesmenanakex_setScoreRisiko(2, 5);">
                                                                <td style="padding: 0;"><label class="col-form-label">Pasien
                                                                ditempatkan di tempat tidur</label></td>
                                                            </tr>
                                                            <tr onclick="dacriasesmenanakex_setScoreRisiko(3, 5);">
                                                                <td style="padding: 0;"><label class="col-form-label">Pasien
                                                                    menggunakan alat bantu atau anak (usia 0-3 tahun)
                                                                diletakkan di tempat tidur khusus bayi/ anak</label></td>
                                                            </tr>
                                                            <tr onclick="dacriasesmenanakex_setScoreRisiko(4, 5);">
                                                                <td style="padding: 0;"><label class="col-form-label">Riwayat
                                                                    jatuh atau bila anak (usia 0-3 tahun) diletakkan di
                                                                tempat tidur dewasa</label></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td width="10%" style="padding: 6px;">
                                                    <table class="table-borderless table-condensed table-hover" width="100%">
                                                        <tbody>
                                                            <tr align="center" onclick="dacriasesmenanakex_setScoreRisiko(1, 5);">
                                                                <td width="100%" style="padding: 0;"><label class="col-form-label">1</label></td>
                                                            </tr>
                                                            <tr align="center" onclick="dacriasesmenanakex_setScoreRisiko(2, 5);">
                                                                <td style="padding: 0;"><label class="col-form-label">2</label>
                                                                </td>
                                                            </tr>
                                                            <tr align="center" onclick="dacriasesmenanakex_setScoreRisiko(3, 5);">
                                                                <td style="padding: 0;"><label class="col-form-label">3</label>
                                                                </td>
                                                            </tr>
                                                            <tr align="center" onclick="dacriasesmenanakex_setScoreRisiko(4, 5);">
                                                                <td style="padding: 0;"><label class="col-form-label">4</label>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td width="10%" style="padding: 6px;">
                                                    <table class="" width="100%">
                                                        <tbody>
                                                            <tr height="100%" align="center">
                                                                <td align="center" width="100%" style="padding: 0;">
                                                                    <input type="text" class="form-control text-center font-weight-bold text-center" style="font-size: 30px;" id="dacriasesmenanak_mrisikoskor5" value="4" readonly>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="5%" style="padding: 6px;">
                                                    <div class="col-md-12 row d-flex justify-content-center">
                                                        <label class="col-form-label font-weight-bold">F</label>
                                                    </div>
                                                </td>
                                                <td width="15%" style="padding: 6px;">
                                                    <div class="col-md-12 row d-flex justify-content-center">
                                                        <label class="col-form-label font-weight-bold">Respon
                                                        Terhadap Operasi&nbsp;/&nbsp;</label> <label class="col-form-label font-weight-bold">Obat
                                                        Penenang&nbsp;/&nbsp;</label> <label class="col-form-label font-weight-bold">Efek
                                                        Anastesi </label>
                                                    </div>
                                                </td>
                                                <td width="60%" style="padding: 6px;">
                                                    <table class="table-borderless table-condensed table-hover" width="100%">
                                                        <tbody>
                                                            <tr onclick="dacriasesmenanakex_setScoreRisiko(1, 6);">
                                                                <td width="100%" style="padding: 0;"><label class="col-form-label">&gt; 48 Jam atau tidak
                                                                menjalani pembedahan / Anesthesi Sedasi</label></td>
                                                            </tr>
                                                            <tr onclick="dacriasesmenanakex_setScoreRisiko(2, 6);">
                                                                <td style="padding: 0;"><label class="col-form-label">Dalam
                                                                48 Jam</label></td>
                                                            </tr>
                                                            <tr onclick="dacriasesmenanakex_setScoreRisiko(3, 6);">
                                                                <td style="padding: 0;"><label class="col-form-label">Dalam
                                                                24 Jam</label></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td width="10%" style="padding: 6px;">
                                                    <table class="table-borderless table-condensed table-hover" width="100%">
                                                        <tbody>
                                                            <tr align="center" onclick="dacriasesmenanakex_setScoreRisiko(1, 6);">
                                                                <td width="100%" style="padding: 0;"><label class="col-form-label">1</label></td>
                                                            </tr>
                                                            <tr align="center" onclick="dacriasesmenanakex_setScoreRisiko(2, 6);">
                                                                <td style="padding: 0;"><label class="col-form-label">2</label>
                                                                </td>
                                                            </tr>
                                                            <tr align="center" onclick="dacriasesmenanakex_setScoreRisiko(3, 6);">
                                                                <td style="padding: 0;"><label class="col-form-label">3</label>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td width="10%" style="padding: 6px;">
                                                    <table class="" width="100%">
                                                        <tbody>
                                                            <tr height="100%" align="center">
                                                                <td align="center" width="100%" style="padding: 0;">
                                                                    <input type="text" class="form-control text-center font-weight-bold text-center" style="font-size: 30px;" id="dacriasesmenanak_mrisikoskor6" value="3" readonly>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="5%" style="padding: 6px;">
                                                    <div class="col-md-12 row d-flex justify-content-center">
                                                        <label class="col-form-label font-weight-bold">G</label>
                                                    </div>
                                                </td>
                                                <td width="15%" style="padding: 6px;">
                                                    <div class="col-md-12 row d-flex justify-content-center">
                                                        <label class="col-form-label font-weight-bold">Penggunaan
                                                        Obat </label>
                                                    </div>
                                                </td>
                                                <td width="60%" style="padding: 6px;">
                                                    <table class="table-borderless table-condensed table-hover" width="100%">
                                                        <tbody>
                                                            <tr onclick="dacriasesmenanakex_setScoreRisiko(1, 7);">
                                                                <td width="100%" style="padding: 0;"><label class="col-form-label">Tidak ada medikasi obat di
                                                                bawah atau pengobatan lain</label></td>
                                                            </tr>
                                                            <tr onclick="dacriasesmenanakex_setScoreRisiko(2, 7);">
                                                                <td style="padding: 0;"><label class="col-form-label">Penggunaan
                                                                salah satu obat di bawah</label></td>
                                                            </tr>
                                                            <tr onclick="dacriasesmenanakex_setScoreRisiko(3, 7);">
                                                                <td style="padding: 0;"><label class="col-form-label">Penggunaan
                                                                    multipel: sedatif, obat hipnosis, barbiturat, fenotiazin,
                                                                antidepresan, pencahar, diuretik, narkose</label></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td width="10%" style="padding: 6px;">
                                                    <table class="table-borderless table-condensed table-hover" width="100%">
                                                        <tbody>
                                                            <tr align="center" onclick="dacriasesmenanakex_setScoreRisiko(1, 7);">
                                                                <td width="100%" style="padding: 0;"><label class="col-form-label">1</label></td>
                                                            </tr>
                                                            <tr align="center" onclick="dacriasesmenanakex_setScoreRisiko(2, 7);">
                                                                <td style="padding: 0;"><label class="col-form-label">2</label>
                                                                </td>
                                                            </tr>
                                                            <tr align="center" onclick="dacriasesmenanakex_setScoreRisiko(3, 7);">
                                                                <td style="padding: 0;"><label class="col-form-label">3</label>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td width="10%" style="padding: 6px;">
                                                    <table class="" width="100%">
                                                        <tbody>
                                                            <tr height="100%" align="center">
                                                                <td align="center" width="100%" style="padding: 0;">
                                                                    <input type="text" class="form-control text-center font-weight-bold text-center" style="font-size: 30px;" id="dacriasesmenanak_mrisikoskor7" value="3" readonly>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="90%" colspan="4" style="padding: 10px;">
                                                    <div class="col-md-12 row d-flex">
                                                        <h5>
                                                            <label class="col-form-label font-weight-bold">Total
                                                            Skor:</label>
                                                        </h5>
                                                    </div>
                                                </td>
                                                <td width="10%" style="padding: 6px;">
                                                    <table class="" width="100%">
                                                        <tbody>
                                                            <tr height="100%" align="center">
                                                                <td align="center" width="100%" style="padding: 0;">
                                                                    <input type="text" class="form-control text-center font-weight-bold text-center" style="font-size: 30px;" id="dacriasesmenanak_mrisikoskortot" value="23" readonly>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row " style="padding-bottom: 10px;">
                        <div class="col-md-8">
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label class="col-form-label">Derajat Risiko Jatuh</label>
                                </div>
                                <div class="col-md-8" id="dacriasesmenanak_mjatuhId">
                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                        <input name="dacriasesmenanak_mjatuhId" value="1" type="radio" class="custom-control-input" id="dacriasesmenanak_mjatuhId_1" onclick="document.getElementById('dacriasesmenanak_divmrisiko1').style.display='block';document.getElementById('dacriasesmenanak_divmrisiko2').style.display='none';"> <label class="custom-control-label" for="dacriasesmenanak_mjatuhId_1">Skor 7 – 11 : Risiko rendah</label>
                                    </div>
                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                        <input name="dacriasesmenanak_mjatuhId" value="2" type="radio" class="custom-control-input" id="dacriasesmenanak_mjatuhId_2" onclick="document.getElementById('dacriasesmenanak_divmrisiko2').style.display='block';document.getElementById('dacriasesmenanak_divmrisiko1').style.display='none';"> <label class="custom-control-label" for="dacriasesmenanak_mjatuhId_2">Skor ≥ 12 : Risiko tinggi</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 row d-flex justify-content-center">
                            <h5>
                                <label class="col-form-label font-weight-bold">INTERVENSI
                                RISIKO JATUH</label>
                            </h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-responsive" id="dacriasesmenanak_divmrisiko1">
                            <table class="table-bordered table-condensed table-hover" width="100%">
                                <tbody>
                                    <tr>
                                        <td width="20%" style="padding: 1;">
                                            <div class="row d-flex justify-content-center">
                                                <b><label class="col-form-label">DERAJAT RISIKO
                                                JATUH</label></b>
                                            </div>
                                        </td>
                                        <td width="80%" style="padding: 1;">
                                            <div class="row d-flex justify-content-center">
                                                <b><label class="col-form-label">INTERVENSI</label></b>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="padding: 0;"><b class="row d-flex justify-content-center"><label class="col-form-label">Risiko Rendah</label></b> <input hidden="true" class="form-control" id="dacriasesmenanak_mrendahId">
                                        </td>
                                        <td width="80%" style="padding: 1;">
                                            <div class="col-md-12" id="dacriasesmenanak_mrendahlist">
                                                <div class="row custom-control custom-checkbox custom-control-inline">
                                                    <input name="dacriasesmenanak_mrendahlist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenanak_mrendahlist_1" checked> <label class="custom-control-label" for="dacriasesmenanak_mrendahlist_1">Pastikan bel mudah dijangkau</label>
                                                </div>
                                                <div class="row custom-control custom-checkbox custom-control-inline">
                                                    <input name="dacriasesmenanak_mrendahlist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenanak_mrendahlist_2" checked> <label class="custom-control-label" for="dacriasesmenanak_mrendahlist_2">Pastikan roda tempat tidur terkunci</label>
                                                </div>
                                                <div class="row custom-control custom-checkbox custom-control-inline">
                                                    <input name="dacriasesmenanak_mrendahlist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenanak_mrendahlist_3" checked> <label class="custom-control-label" for="dacriasesmenanak_mrendahlist_3">Posisikan tempat tidur pada posisi rendah</label>
                                                </div>
                                                <div class="row custom-control custom-checkbox custom-control-inline">
                                                    <input name="dacriasesmenanak_mrendahlist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenanak_mrendahlist_4" checked> <label class="custom-control-label" for="dacriasesmenanak_mrendahlist_4">Pagar pengaman tempat tidur dinaikkan</label>
                                                </div>
                                                <div class="row custom-control custom-checkbox custom-control-inline">
                                                    <input name="dacriasesmenanak_mrendahlist" value="5" type="checkbox" class="custom-control-input" id="dacriasesmenanak_mrendahlist_5" checked> <label class="custom-control-label" for="dacriasesmenanak_mrendahlist_5">Anjurkan pasien menggunakan kaos kaki atau sepatu yang tidak licin</label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive" id="dacriasesmenanak_divmrisiko2" style="display: none;">
                            <table class="table-bordered table-condensed table-hover" width="100%">
                                <tbody>
                                    <tr>
                                        <td width="20%" style="padding: 1;">
                                            <div class="row d-flex justify-content-center">
                                                <b><label class="col-form-label">DERAJAT RISIKO
                                                JATUH</label></b>
                                            </div>
                                        </td>
                                        <td width="80%" style="padding: 1;">
                                            <div class="row d-flex justify-content-center">
                                                <b><label class="col-form-label">INTERVENSI</label></b>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td width="20%" style="padding: 0;"><b class="row d-flex justify-content-center"><label class="col-form-label">Risiko Tinggi</label></b> <input hidden="true" class="form-control" id="dacriasesmenanak_mtinggiId">
                                        </td>
                                        <td width="80%" style="padding: 1;">
                                            <div class="col-md-12" id="dacriasesmenanak_mtinggilist">
                                                <div class="row custom-control custom-checkbox custom-control-inline">
                                                    <input name="dacriasesmenanak_mtinggilist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenanak_mtinggilist_1" checked> <label class="custom-control-label" for="dacriasesmenanak_mtinggilist_1">Pastikan bel mudah dijangkau</label>
                                                </div>
                                                <div class="row custom-control custom-checkbox custom-control-inline">
                                                    <input name="dacriasesmenanak_mtinggilist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenanak_mtinggilist_2" checked> <label class="custom-control-label" for="dacriasesmenanak_mtinggilist_2">Pastikan roda tempat tidur terkunci</label>
                                                </div>
                                                <div class="row custom-control custom-checkbox custom-control-inline">
                                                    <input name="dacriasesmenanak_mtinggilist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenanak_mtinggilist_3" checked> <label class="custom-control-label" for="dacriasesmenanak_mtinggilist_3">Posisikan tempat tidur pada posisi rendah</label>
                                                </div>
                                                <div class="row custom-control custom-checkbox custom-control-inline">
                                                    <input name="dacriasesmenanak_mtinggilist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenanak_mtinggilist_4" checked> <label class="custom-control-label" for="dacriasesmenanak_mtinggilist_4">Pagar pengaman tempat tidur dinaikkan</label>
                                                </div>
                                                <div class="row custom-control custom-checkbox custom-control-inline">
                                                    <input name="dacriasesmenanak_mtinggilist" value="5" type="checkbox" class="custom-control-input" id="dacriasesmenanak_mtinggilist_5" checked> <label class="custom-control-label" for="dacriasesmenanak_mtinggilist_5">Anjurkan pasien menggunakan kaos kaki atau sepatu yang tidak licin</label>
                                                </div>
                                                <div class="row custom-control custom-checkbox custom-control-inline">
                                                    <input name="dacriasesmenanak_mtinggilist" value="6" type="checkbox" class="custom-control-input" id="dacriasesmenanak_mtinggilist_6" checked> <label class="custom-control-label" for="dacriasesmenanak_mtinggilist_6">Pakaikan stiker risiko jatuh pada gelang pasien (untuk pasien usia 13-18 tahun)</label>
                                                </div>
                                                <div class="row custom-control custom-checkbox custom-control-inline">
                                                    <input name="dacriasesmenanak_mtinggilist" value="7" type="checkbox" class="custom-control-input" id="dacriasesmenanak_mtinggilist_7" checked> <label class="custom-control-label" for="dacriasesmenanak_mtinggilist_7">Pasangkan tanda risiko jatuh pada tiang infus dan pintu kamar pasien </label>
                                                </div>
                                                <div class="row custom-control custom-checkbox custom-control-inline">
                                                    <input name="dacriasesmenanak_mtinggilist" value="8" type="checkbox" class="custom-control-input" id="dacriasesmenanak_mtinggilist_8" checked> <label class="custom-control-label" for="dacriasesmenanak_mtinggilist_8">Edukasi pasien/ keluarga tentang risiko jatuh dan pencegahannya </label>
                                                </div>
                                                <div class="row custom-control custom-checkbox custom-control-inline">
                                                    <input name="dacriasesmenanak_mtinggilist" value="9" type="checkbox" class="custom-control-input" id="dacriasesmenanak_mtinggilist_9" checked> <label class="custom-control-label" for="dacriasesmenanak_mtinggilist_9">Libatkan keluarga pasien untuk selalu menunggui pasien</label>
                                                </div>
                                                <div class="row custom-control custom-checkbox custom-control-inline">
                                                    <input name="dacriasesmenanak_mtinggilist" value="10" type="checkbox" class="custom-control-input" id="dacriasesmenanak_mtinggilist_10" checked> <label class="custom-control-label" for="dacriasesmenanak_mtinggilist_10">Pertimbangkan penempatan pasien, jika perlu pasien ditempatkan di dekat nurse station</label>
                                                </div>
                                                <div class="row custom-control custom-checkbox custom-control-inline">
                                                    <input name="dacriasesmenanak_mtinggilist" value="11" type="checkbox" class="custom-control-input" id="dacriasesmenanak_mtinggilist_11" checked> <label class="custom-control-label" for="dacriasesmenanak_mtinggilist_11">Monitor kebutuhan pasien secara berkala (minimal tiap 2 jam)</label>
                                                </div>
                                                <div class="row custom-control custom-checkbox custom-control-inline">
                                                    <input name="dacriasesmenanak_mtinggilist" value="12" type="checkbox" class="custom-control-input" id="dacriasesmenanak_mtinggilist_12" checked> <label class="custom-control-label" for="dacriasesmenanak_mtinggilist_12">Membantu kebutuhan eliminasi pasien setiap 2 jam</label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="row ">
            <div class="col-md-6">
                <div class="col-md-6" align="center">
                  <label>Perawat Penanggung Jawab</label>
                  <input type="date" id="tglttdppjassanak" class="form-control form-control-sm">
                  <div style="text-align: center;">
                    <img style="width:250px;height:250px;border: 2px dashed;background-color: #535b62d1;" id="GambarTttdperawatassanakRI">
                    <input type="text" class="form-control form-control-sm text-center d-none" id="Hasilpaint_TttdperawatassanakRI" disabled>
                  </div>
                  <button onclick="ShowModalttdperawatassanakRI()" class="btn btn-warning btn-sm">Klik Tanda Tangan</button><br>
                  <label>Nama &amp; Tanda tangan</label>
                </div>
            </div>
        </div>
        <div class="row">
            <button type="button" class="btn btn-sm btn-primary btnsave" onclick="saveAssesmenAnakRI();" id="btnsave_assanak"><i class="fas fa-save"></i> SIMPAN</button>
        </div>
    </div>
</div>
</div>
</div>

<div class="modal fade"  id="Modalpaint_ttdperawatassanakRI" role="dialog">
  <div class="modal-dialog" style="width: 408px;">
    <div class="modal-content">
      <div class="modal-body">
        <div id="paint_ttdperawatassanakRI"></div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-sm btn-primary" onclick="takepaint_ttdperawatassanakRI()"><i class="fa fa-save"></i> Simpan</button>
        <button class="btn btn-sm btn-outline-danger" onclick="$('#Modalpaint_ttdperawatassanakRI').modal('hide')"><i class="fa fa-times"></i> Batal</button>
      </div>
    </div>
  </div>
</div>

<script>
var ttdpaint_ttdperawatassanakRI   = new WPaintX('paint_ttdperawatassanakRI');

$(document).ready(function() {
    var data =document.getElementById('profilepasienirna').value;
    if (data=='') {
        var url  = '';
        var view = 'viewassesmenAnak';
        onCall_listpasien(view, url);
    }else{
        showAssessmenAnakRI();
    }
});

function takepaint_ttdperawatassanakRI() {
  document.getElementById('GambarTttdperawatassanakRI').src = ttdpaint_ttdperawatassanakRI.getData();
  document.getElementById('Hasilpaint_TttdperawatassanakRI').value = ttdpaint_ttdperawatassanakRI.getData();
  $('#Modalpaint_ttdperawatassanakRI').modal('hide');
}

function ShowModalttdperawatassanakRI() {
  showttdperawatassanakRI();
  $('#Modalpaint_ttdperawatassanakRI').modal('show');
}

function showttdperawatassanakRI(){
  ttdpaint_ttdperawatassanakRI.show();
}

function tampilketLainassAnak() {
    if ($('#dacriasesmenanak_kkepalalist_6').is(":checked"))
        $("#dacriasesmenanak_div_kkepalalist6").show();
    else
        $("#dacriasesmenanak_div_kkepalalist6").hide();
    if ($('#dacriasesmenanak_krambutlist_6').is(":checked"))
        $("#dacriasesmenanak_div_krambutlist6").show();
    else
        $("#dacriasesmenanak_div_krambutlist6").hide();
    if ($('#dacriasesmenanak_kmukalist_6').is(":checked"))
        $("#dacriasesmenanak_div_kmukalist6").show();
    else
        $("#dacriasesmenanak_div_kmukalist6").hide();
    if ($('#dacriasesmenanak_kmatalist_8').is(":checked"))
        $("#dacriasesmenanak_div_kmatalist8").show();
    else
        $("#dacriasesmenanak_div_kmatalist8").hide();
    if ($('#dacriasesmenanak_ktelingalist_4').is(":checked"))
        $("#dacriasesmenanak_div_ktelingalist4").show();
    else
        $("#dacriasesmenanak_div_ktelingalist4").hide();
    if ($('#dacriasesmenanak_khidunglist_4').is(":checked"))
        $("#dacriasesmenanak_div_khidunglist4").show();
    else
        $("#dacriasesmenanak_div_khidunglist4").hide();
    if ($('#dacriasesmenanak_kmulutlist_7').is(":checked"))
        $("#dacriasesmenanak_div_kmulutlist7").show();
    else
        $("#dacriasesmenanak_div_kmulutlist7").hide();
    if ($('#dacriasesmenanak_kgigilist_4').is(":checked"))
        $("#dacriasesmenanak_div_kgigilist4").show();
    else
        $("#dacriasesmenanak_div_kgigilist4").hide();
    if ($('#dacriasesmenanak_klidahlist_4').is(":checked"))
        $("#dacriasesmenanak_div_klidahlist4").show();
    else
        $("#dacriasesmenanak_div_klidahlist4").hide();
    if ($('#dacriasesmenanak_kgoroklist_4').is(":checked"))
        $("#dacriasesmenanak_div_kgoroklist4").show();
    else
        $("#dacriasesmenanak_div_kgoroklist4").hide();
    if ($('#dacriasesmenanak_kleherlist_6').is(":checked"))
        $("#dacriasesmenanak_div_kleherlist6").show();
    else
        $("#dacriasesmenanak_div_kleherlist6").hide();
    if ($('#dacriasesmenanak_kdadalist_3').is(":checked"))
        $("#dacriasesmenanak_div_kdadalist3").show();
    else
        $("#dacriasesmenanak_div_kdadalist3").hide();
    if ($('#dacriasesmenanak_kdadanafaslist_4').is(":checked"))
        $("#dacriasesmenanak_div_kdadanafaslist4").show();
    else
        $("#dacriasesmenanak_div_kdadanafaslist4").hide();
    if ($('#dacriasesmenanak_kdadalist_4').is(":checked"))
        $("#dacriasesmenanak_div_kdadalist4").show();
    else
        $("#dacriasesmenanak_div_kdadalist4").hide();
    if ($('#dacriasesmenanak_kabdomenlist_4').is(":checked"))
        $("#dacriasesmenanak_div_kabdomenlist4").show();
    else
        $("#dacriasesmenanak_div_kabdomenlist4").hide();
    if ($('#dacriasesmenanak_kabdomenlist_5').is(":checked"))
        $("#dacriasesmenanak_div_kabdomenlist5").show();
    else
        $("#dacriasesmenanak_div_kabdomenlist5").hide();
    if ($('#dacriasesmenanak_kkulitlist_5').is(":checked"))
        $("#dacriasesmenanak_div_kkulitlist5").show();
    else
        $("#dacriasesmenanak_div_kkulitlist5").hide();
    if ($('#dacriasesmenanak_kkulitlist_7').is(":checked"))
        $("#dacriasesmenanak_div_kkulitlist7").show();
    else
        $("#dacriasesmenanak_div_kkulitlist7").hide();
    if ($('#dacriasesmenanak_kkulitlist_8').is(":checked"))
        $("#dacriasesmenanak_div_kkulitlist8").show();
    else
        $("#dacriasesmenanak_div_kkulitlist8").hide();
    if ($('#dacriasesmenanak_kekslist_1').is(":checked"))
        $("#dacriasesmenanak_div_kekslist1").show();
    else
        $("#dacriasesmenanak_div_kekslist1").hide();
    if ($('#dacriasesmenanak_kekslist_2').is(":checked"))
        $("#dacriasesmenanak_div_kekslist2").show();
    else
        $("#dacriasesmenanak_div_kekslist2").hide();
    if ($('#dacriasesmenanak_kekslist_3').is(":checked"))
        $("#dacriasesmenanak_div_kekslist3").show();
    else
        $("#dacriasesmenanak_div_kekslist3").hide();
    if ($('#dacriasesmenanak_kmsukullist_1').is(":checked"))
        $("#dacriasesmenanak_div_kmsukullist1").show();
    else
        $("#dacriasesmenanak_div_kmsukullist1").hide();
    if ($('#dacriasesmenanak_kmsukullist_2').is(":checked"))
        $("#dacriasesmenanak_div_kmsukullist2").show();
    else
        $("#dacriasesmenanak_div_kmsukullist2").hide();
    if ($('#dacriasesmenanak_kmsukullist_3').is(":checked"))
        $("#dacriasesmenanak_div_kmsukullist3").show();
    else
        $("#dacriasesmenanak_div_kmsukullist3").hide();
    if ($('#dacriasesmenanak_kmsukullist_4').is(":checked"))
        $("#dacriasesmenanak_div_kmsukullist4").show();
    else
        $("#dacriasesmenanak_div_kmsukullist4").hide();
}

$('#dacriasesmenanak_hmensId_1').on('click', function() {
    document.getElementById('dacriasesmenanak_div_hmensId2').style.display = 'none'
})
$('#dacriasesmenanak_hmensId_2').on('click', function() {
    document.getElementById('dacriasesmenanak_div_hmensId2').style.display = 'block'
})
$('#dacriasesmenanak_hsakithamilId_1').on('click', function() {
    document.getElementById('dacriasesmenanak_div_hsakithamilId2').style.display = 'none'
})
$('#dacriasesmenanak_hsakithamilId_2').on('click', function() {
    document.getElementById('dacriasesmenanak_div_hsakithamilId2').style.display = 'block'
})
$('#dacriasesmenanak_hminumobatId_1').on('click', function() {
    document.getElementById('dacriasesmenanak_div_hminumobatId2').style.display = 'none'
})
$('#dacriasesmenanak_hminumobatId_2').on('click', function() {
    document.getElementById('dacriasesmenanak_div_hminumobatId2').style.display = 'block'
})
$('#dacriasesmenanak_kgenetaliaId_1').on('click', function() {
    document.getElementById('dacriasesmenanak_div_kgenetaliaId1').style.display = 'block'
    document.getElementById('dacriasesmenanak_div_kgenetaliaId2').style.display = 'none'
})
$('#dacriasesmenanak_kgenetaliaId_2').on('click', function() {
    document.getElementById('dacriasesmenanak_div_kgenetaliaId1').style.display = 'none'
    document.getElementById('dacriasesmenanak_div_kgenetaliaId2').style.display = 'block'
})

function dacriasesmenanakex_setScore(a, b) {
    var data = a;
    var nilai = b;
    if (nilai == 1) {
        switch (a) {
        case 1:
            document.getElementById('dacriasesmenanak_bgcsa').value = 1;
            hitunggcsirna();
            break;
        case 2:
            document.getElementById('dacriasesmenanak_bgcsa').value = 2;
            hitunggcsirna();
            break;
        case 3:
            document.getElementById('dacriasesmenanak_bgcsa').value = 3;
            hitunggcsirna();
            break;
        case 4:
            document.getElementById('dacriasesmenanak_bgcsa').value = 4;
            hitunggcsirna();
            break;
        }

    } else if (nilai == 2) {
            //alert(a);
        switch (a) {
        case 1:
            document.getElementById('dacriasesmenanak_bgcsb').value = 1;
            hitunggcsirna();
            break;
        case 2:
            document.getElementById('dacriasesmenanak_bgcsb').value = 2;
            hitunggcsirna();
            break;
        case 3:
            document.getElementById('dacriasesmenanak_bgcsb').value = 3;
            hitunggcsirna();
            break;
        case 4:
            document.getElementById('dacriasesmenanak_bgcsb').value = 4;
            hitunggcsirna();
            break;
        case 5:
            document.getElementById('dacriasesmenanak_bgcsb').value = 5;
            hitunggcsirna();
            break;
        case 6:
            document.getElementById('dacriasesmenanak_bgcsb').value = 6;
            hitunggcsirna();
            break;

        }
    } else {
        switch (a) {
        case 1:
            document.getElementById('dacriasesmenanak_bgcsc').value = 1;
            hitunggcsirna();
            break;
        case 2:
            document.getElementById('dacriasesmenanak_bgcsc').value = 2;
            hitunggcsirna();
            break;
        case 3:
            document.getElementById('dacriasesmenanak_bgcsc').value = 3;
            hitunggcsirna();
            break;
        case 4:
            document.getElementById('dacriasesmenanak_bgcsc').value = 4;
            hitunggcsirna();
            break;
        case 5:
            document.getElementById('dacriasesmenanak_bgcsc').value = 5;
            hitunggcsirna();
            break;
        }

    }
}

function hitunggcsirna() {
    var a = document.getElementById('dacriasesmenanak_bgcsa').value;
    var b = document.getElementById('dacriasesmenanak_bgcsb').value;
    var c = document.getElementById('dacriasesmenanak_bgcsc').value;
    d = parseInt(a) + parseInt(b) + parseInt(c);
    document.getElementById('dacriasesmenanak_bgcstot').value = d;
    if (d >= 14) {
        document.getElementById('dacriasesmenanak_asadar').value = '1';
    }
    if (d == 13 || d == 12) {
        document.getElementById('dacriasesmenanak_asadar').value = '2';
    }
    if (d == 11 || d == 10) {
        document.getElementById('dacriasesmenanak_asadar').value = '3';
    }
    if (d == 7 || d == 8 || d == 9) {
        document.getElementById('dacriasesmenanak_asadar').value = '4';
    }
    if (d == 4 || d == 5 || d == 6) {
        document.getElementById('dacriasesmenanak_asadar').value = '5';
    }
    if (d <= 3) {
        document.getElementById('dacriasesmenanak_asadar').value = '6';
    }
}

function dacriasesmenanakex_setScoreflacc(b, a) {
    var data = a;
    var nilai = b;
    if (nilai == 1) {
        switch (a) {
        case 0:
            document.getElementById('dacriasesmenanak_cnyeriflacc1').value = 0;
            hitungskorfaceassanak();
            break;
        case 1:
            document.getElementById('dacriasesmenanak_cnyeriflacc1').value = 1;
            hitungskorfaceassanak();
            break;
        case 2:
            document.getElementById('dacriasesmenanak_cnyeriflacc1').value = 2;
            hitungskorfaceassanak();
            break;

        }

    } else if (nilai == 2) {
            //alert(a);
        switch (a) {
        case 0:
            document.getElementById('dacriasesmenanak_cnyeriflacc2').value = 0;
            hitungskorfaceassanak();
            break;
        case 1:
            document.getElementById('dacriasesmenanak_cnyeriflacc2').value = 1;
            hitungskorfaceassanak();
            break;
        case 2:
            document.getElementById('dacriasesmenanak_cnyeriflacc2').value = 2;
            hitungskorfaceassanak();
            break;
        }
    } else if (nilai == 3) {
        switch (a) {
        case 0:
            document.getElementById('dacriasesmenanak_cnyeriflacc3').value = 0;
            hitungskorfaceassanak();
            break;
        case 1:
            document.getElementById('dacriasesmenanak_cnyeriflacc3').value = 1;
            hitungskorfaceassanak();
            break;
        case 2:
            document.getElementById('dacriasesmenanak_cnyeriflacc3').value = 2;
            hitungskorfaceassanak();
            break;
        }

    } else if (nilai == 4) {
        switch (a) {
        case 0:
            document.getElementById('dacriasesmenanak_cnyeriflacc4').value = 0;
            hitungskorfaceassanak();
            break;
        case 1:
            document.getElementById('dacriasesmenanak_cnyeriflacc4').value = 1;
            hitungskorfaceassanak();
            break;
        case 2:
            document.getElementById('dacriasesmenanak_cnyeriflacc4').value = 2;
            hitungskorfaceassanak();
            break;
        }

    } else if (nilai == 5) {
        switch (a) {
        case 0:
            document.getElementById('dacriasesmenanak_cnyeriflacc5').value = 0;
            hitungskorfaceassanak();
            break;
        case 1:
            document.getElementById('dacriasesmenanak_cnyeriflacc5').value = 1;
            hitungskorfaceassanak();
            break;
        case 2:
            document.getElementById('dacriasesmenanak_cnyeriflacc5').value = 2;
            hitungskorfaceassanak();
            break;
        }

    }
}

function hitungskorfaceassanak() {
    var a = document.getElementById('dacriasesmenanak_cnyeriflacc1').value;
    var b = document.getElementById('dacriasesmenanak_cnyeriflacc2').value;
    var c = document.getElementById('dacriasesmenanak_cnyeriflacc3').value;
    var d = document.getElementById('dacriasesmenanak_cnyeriflacc4').value;
    var e = document.getElementById('dacriasesmenanak_cnyeriflacc5').value;
    f = parseInt(a) + parseInt(b) + parseInt(c) + parseInt(d) + parseInt(e);
    document.getElementById('dacriasesmenanak_cnyeriflacctot').value = f;
    if (f == 0) {
        document.getElementById('dacriasesmenanak_lskriningnyeri').innerHTML = "TIDAK NYERI";
    }
    if (f == 1 || f == 2 || f == 3) {
        document.getElementById('dacriasesmenanak_lskriningnyeri').innerHTML = "NYERI RINGAN";
    }
    if (f == 4 || f == 5 || f == 6) {
        document.getElementById('dacriasesmenanak_lskriningnyeri').innerHTML = "NYERI SEDANG";
    }
    if (f >= 7) {
        document.getElementById('dacriasesmenanak_lskriningnyeri').innerHTML = "NYERI BERAT";
    }
}

function dacriasesmenanakex_setScoreBarthel(a, b) {
    var data = a;
    var nilai = b;
    if (nilai == 1) {
        switch (a) {
        case 0:
            document.getElementById('dacriasesmenanak_lbathel1').value = 0;
            hitungskorbarthelassanak();
            break;
        case 1:
            document.getElementById('dacriasesmenanak_lbathel1').value = 1;
            hitungskorbarthelassanak();
            break;
        case 2:
            document.getElementById('dacriasesmenanak_lbathel1').value = 2;
            hitungskorbarthelassanak();
            break;

        }

    } else if (nilai == 2) {
            //alert(a);
        switch (a) {
        case 0:
            document.getElementById('dacriasesmenanak_lbathel2').value = 0;
            hitungskorbarthelassanak();
            break;
        case 1:
            document.getElementById('dacriasesmenanak_lbathel2').value = 1;
            hitungskorbarthelassanak();
            break;
        case 2:
            document.getElementById('dacriasesmenanak_lbathel2').value = 2;
            hitungskorbarthelassanak();
            break;
        case 3:
            document.getElementById('dacriasesmenanak_lbathel2').value = 3;
            hitungskorbarthelassanak();
            break;
        }
    } else if (nilai == 3) {
        switch (a) {
        case 0:
            document.getElementById('dacriasesmenanak_lbathel3').value = 0;
            hitungskorbarthelassanak();
            break;
        case 1:
            document.getElementById('dacriasesmenanak_lbathel3').value = 1;
            hitungskorbarthelassanak();
            break;
        case 2:
            document.getElementById('dacriasesmenanak_lbathel3').value = 2;
            hitungskorbarthelassanak();
            break;
        }

    } else if (nilai == 4) {
        switch (a) {
        case 0:
            document.getElementById('dacriasesmenanak_lbathel4').value = 0;
            hitungskorbarthelassanak();
            break;
        case 1:
            document.getElementById('dacriasesmenanak_lbathel4').value = 1;
            hitungskorbarthelassanak();
            break;
        case 2:
            document.getElementById('dacriasesmenanak_lbathel4').value = 2;
            hitungskorbarthelassanak();
            break;
        case 3:
            document.getElementById('dacriasesmenanak_lbathel4').value = 3;
            hitungskorbarthelassanak();
            break;
        }

    } else if (nilai == 5) {
        switch (a) {
        case 0:
            document.getElementById('dacriasesmenanak_lbathel5').value = 0;
            hitungskorbarthelassanak();
            break;
        case 1:
            document.getElementById('dacriasesmenanak_lbathel5').value = 1;
            hitungskorbarthelassanak();
            break;
        }

    } else if (nilai == 6) {
        switch (a) {
        case 0:
            document.getElementById('dacriasesmenanak_lbathel6').value = 0;
            hitungskorbarthelassanak();
            break;
        case 1:
            document.getElementById('dacriasesmenanak_lbathel6').value = 1;
            hitungskorbarthelassanak();
            break;
        case 2:
            document.getElementById('dacriasesmenanak_lbathel6').value = 2;
            hitungskorbarthelassanak();
            break;
        }

    } else if (nilai == 7) {
        switch (a) {
        case 0:
            document.getElementById('dacriasesmenanak_lbathel7').value = 0;
            hitungskorbarthelassanak();
            break;
        case 1:
            document.getElementById('dacriasesmenanak_lbathel7').value = 1;
            hitungskorbarthelassanak();
            break;
        case 2:
            document.getElementById('dacriasesmenanak_lbathel7').value = 2;
            hitungskorbarthelassanak();
            break;
        }

    } else if (nilai == 8) {
        switch (a) {
        case 0:
            document.getElementById('dacriasesmenanak_lbathel8').value = 0;
            hitungskorbarthelassanak();
            break;
        case 1:
            document.getElementById('dacriasesmenanak_lbathel8').value = 1;
            hitungskorbarthelassanak();
            break;
        case 2:
            document.getElementById('dacriasesmenanak_lbathel8').value = 2;
            hitungskorbarthelassanak();
            break;
        }

    } else if (nilai == 9) {
        switch (a) {
        case 0:
            document.getElementById('dacriasesmenanak_lbathel9').value = 0;
            hitungskorbarthelassanak();
            break;
        case 1:
            document.getElementById('dacriasesmenanak_lbathel9').value = 1;
            hitungskorbarthelassanak();
            break;
        case 2:
            document.getElementById('dacriasesmenanak_lbathel9').value = 2;
            hitungskorbarthelassanak();
            break;
        }

    } else if (nilai == 10) {
        switch (a) {
        case 0:
            document.getElementById('dacriasesmenanak_lbathel10').value = 0;
            hitungskorbarthelassanak();
            break;
        case 1:
            document.getElementById('dacriasesmenanak_lbathel10').value = 1;
            hitungskorbarthelassanak();
            break;
        }

    }
}

function hitungskorbarthelassanak() {
    var a = document.getElementById('dacriasesmenanak_lbathel1').value;
    var b = document.getElementById('dacriasesmenanak_lbathel2').value;
    var c = document.getElementById('dacriasesmenanak_lbathel3').value;
    var d = document.getElementById('dacriasesmenanak_lbathel4').value;
    var e = document.getElementById('dacriasesmenanak_lbathel5').value;
    var f = document.getElementById('dacriasesmenanak_lbathel6').value;
    var g = document.getElementById('dacriasesmenanak_lbathel7').value;
    var h = document.getElementById('dacriasesmenanak_lbathel8').value;
    var i = document.getElementById('dacriasesmenanak_lbathel9').value;
    var j = document.getElementById('dacriasesmenanak_lbathel10').value;
    k = parseInt(a) + parseInt(b) + parseInt(c) + parseInt(d) + parseInt(e) + parseInt(f) + parseInt(g) + parseInt(h) + parseInt(i) + parseInt(j);
    document.getElementById('dacriasesmenanak_lbatheltotal').value = k;
}

function dacriasesmenanakex_setScoreRisiko(a, b) {
    var data = a;
    var nilai = b;
    if (nilai == 1) {
        switch (a) {
        case 1:
            document.getElementById('dacriasesmenanak_mrisikoskor1').value = 1;
            hitungskorresikoassanak();
            break;
        case 2:
            document.getElementById('dacriasesmenanak_mrisikoskor1').value = 2;
            hitungskorresikoassanak();
            break;
        case 3:
            document.getElementById('dacriasesmenanak_mrisikoskor1').value = 3;
            hitungskorresikoassanak();
            break;
        case 4:
            document.getElementById('dacriasesmenanak_mrisikoskor1').value = 4;
            hitungskorresikoassanak();
            break;

        }

    } else if (nilai == 2) {
            //alert(a);
        switch (a) {
        case 1:
            document.getElementById('dacriasesmenanak_mrisikoskor2').value = 1;
            hitungskorresikoassanak();
            break;
        case 2:
            document.getElementById('dacriasesmenanak_mrisikoskor2').value = 2;
            hitungskorresikoassanak();
            break;
        }
    } else if (nilai == 3) {
        switch (a) {
        case 1:
            document.getElementById('dacriasesmenanak_mrisikoskor3').value = 1;
            hitungskorresikoassanak();
            break;
        case 2:
            document.getElementById('dacriasesmenanak_mrisikoskor3').value = 2;
            hitungskorresikoassanak();
            break;
        case 3:
            document.getElementById('dacriasesmenanak_mrisikoskor3').value = 3;
            hitungskorresikoassanak();
            break;
        case 4:
            document.getElementById('dacriasesmenanak_mrisikoskor3').value = 4;
            hitungskorresikoassanak();
            break;
        }

    } else if (nilai == 4) {
        switch (a) {
        case 1:
            document.getElementById('dacriasesmenanak_mrisikoskor4').value = 1;
            hitungskorresikoassanak();
            break;
        case 2:
            document.getElementById('dacriasesmenanak_mrisikoskor4').value = 2;
            hitungskorresikoassanak();
            break;
        case 3:
            document.getElementById('dacriasesmenanak_mrisikoskor4').value = 3;
            hitungskorresikoassanak();
            break;
        }

    } else if (nilai == 5) {
        switch (a) {
        case 1:
            document.getElementById('dacriasesmenanak_mrisikoskor5').value = 1;
            hitungskorresikoassanak();
            break;
        case 2:
            document.getElementById('dacriasesmenanak_mrisikoskor5').value = 2;
            hitungskorresikoassanak();
            break;
        case 3:
            document.getElementById('dacriasesmenanak_mrisikoskor5').value = 3;
            hitungskorresikoassanak();
            break;
        case 4:
            document.getElementById('dacriasesmenanak_mrisikoskor5').value = 4;
            hitungskorresikoassanak();
            break;
        }

    } else if (nilai == 6) {
        switch (a) {
        case 1:
            document.getElementById('dacriasesmenanak_mrisikoskor6').value = 1;
            hitungskorresikoassanak();
            break;
        case 2:
            document.getElementById('dacriasesmenanak_mrisikoskor6').value = 2;
            hitungskorresikoassanak();
            break;
        case 3:
            document.getElementById('dacriasesmenanak_mrisikoskor6').value = 3;
            hitungskorresikoassanak();
            break;
        }

    } else if (nilai == 7) {
        switch (a) {
        case 1:
            document.getElementById('dacriasesmenanak_mrisikoskor7').value = 1;
            hitungskorresikoassanak();
            break;
        case 2:
            document.getElementById('dacriasesmenanak_mrisikoskor7').value = 2;
            hitungskorresikoassanak();
            break;
        case 3:
            document.getElementById('dacriasesmenanak_mrisikoskor7').value = 3;
            hitungskorresikoassanak();
            break;
        }

    }
}

function hitungskorresikoassanak() {
    var a = document.getElementById('dacriasesmenanak_mrisikoskor1').value;
    var b = document.getElementById('dacriasesmenanak_mrisikoskor2').value;
    var c = document.getElementById('dacriasesmenanak_mrisikoskor3').value;
    var d = document.getElementById('dacriasesmenanak_mrisikoskor4').value;
    var e = document.getElementById('dacriasesmenanak_mrisikoskor5').value;
    var f = document.getElementById('dacriasesmenanak_mrisikoskor6').value;
    var g = document.getElementById('dacriasesmenanak_mrisikoskor7').value;
    k = parseInt(a) + parseInt(b) + parseInt(c) + parseInt(d) + parseInt(e) + parseInt(f) + parseInt(g);
    document.getElementById('dacriasesmenanak_mrisikoskortot').value = k;
    if (k <= 11) {
        document.getElementById('dacriasesmenanak_mjatuhId_1').checked = true;
        document.getElementById('dacriasesmenanak_divmrisiko1').style.display = 'block';
        document.getElementById('dacriasesmenanak_divmrisiko2').style.display = 'none';
    }
    if (k >= 12) {
        document.getElementById('dacriasesmenanak_mjatuhId_2').checked = true;
        document.getElementById('dacriasesmenanak_divmrisiko1').style.display = 'none';
        document.getElementById('dacriasesmenanak_divmrisiko2').style.display = 'block';
    }
}

function dacriasesmenanakex_sethasilgizi() {

    var a = $('input[name=dacriasesmenanak_egizia]:checked').val();
    var b = $('input[name=dacriasesmenanak_egizib]:checked').val();
    var c1 = $('input[name=dacriasesmenanak_egizic1]:checked').val();
    var c2 = $('input[name=dacriasesmenanak_egizic2]:checked').val();
    var d = $('input[name=dacriasesmenanak_egizid]:checked').val();
    var ttl = parseInt(a) + parseInt(b) + parseInt(c1) + parseInt(c2) + parseInt(d);
    document.getElementById('dacriasesmenanak_egiziskor').value = ttl;
    if (ttl == 0) {
        document.getElementById('dacriasesmenanak_lgiziskor').innerHTML = 'RISIKO RENDAH';
    }
    if (ttl == 1 || ttl == 2 || ttl == 3) {
        document.getElementById('dacriasesmenanak_lgiziskor').innerHTML = 'RISIKO SEDANG';
    }
    if (ttl == 4 || ttl == 5) {
        document.getElementById('dacriasesmenanak_lgiziskor').innerHTML = 'RISIKO BERAT';
    }
}

function hitungimtassanak() {
    var imt = '';
    var num = '';
    var a = document.getElementById('dacriasesmenanak_jtb').value;
    var b = document.getElementById('dacriasesmenanak_jbb').value;
    var num = a / 100;
    imt = b / (num * num);
    document.getElementById('dacriasesmenanak_kimt').value = imt;
}
getppjassanak()

function getppjassanak() {

    apiPOST('Rekammedisirna/searchPerawat', null, hasil => {
        a = hasil['data'];
        var b = '';

        if (hasil !== null) {
            for (var i = 0; i < a.length; i++) {
                z = hasil['data'][i];
                b += '<option value="' + z.id_pegawai + '">' + z.nama_pegawai + '</option>';
            }
            document.getElementById('dacriasesmenanak_apjId').innerHTML = b;
        }
    });
}

function saveAssesmenAnakRI() {
    if ($('input[name=dacriasesmenanak_hsakithamilId]:checked').val() == 2) {
        penyakithml = $('#dacriasesmenanak_hsakithamilket').val();
    } else {
        penyakithml = $('input[name=dacriasesmenanak_hsakithamilId]:checked').val();
    }
    if ($('input[name=dacriasesmenanak_hminumobatId]:checked').val() == 2) {
        obat = $('#dacriasesmenanak_hminumobatket').val();
    } else {
        obat = $('input[name=dacriasesmenanak_hminumobatId]:checked').val();
    }
    if ($('input[name=dacriasesmenanak_hsalinId]:checked').val() == 2) {
        persalinan = $('#dacriasesmenanak_hsalinket').val();
    } else {
        persalinan = $('input[name=dacriasesmenanak_hsalinId]:checked').val();
    }
    if ($('input[name=dacriasesmenanak_hsalintolongId]:checked').val() == 2) {
        penolong = $('#dacriasesmenanak_hsalintolongket').val();
    } else {
        penolong = $('input[name=dacriasesmenanak_hsalintolongId]:checked').val();
    }
    if ($('input[name=dacriasesmenanak_hbayikelainanId]:checked').val() == 2) {
        kelainan = $('#dacriasesmenanak_hbayikelainanket').val();
    } else {
        kelainan = $('input[name=dacriasesmenanak_hbayikelainanId]:checked').val();
    }
    if ($('input[name=dacriasesmenanak_htumbuhId]:checked').val() == 2) {
        rwyttumbuh = $('#dacriasesmenanak_htumbuhket').val();
    } else {
        rwyttumbuh = $('input[name=dacriasesmenanak_htumbuhId]:checked').val();
    }
    if ($('input[name=dacriasesmenanak_bmasukId]:checked').val() == 5) {
        caramasuk = $('#dacriasesmenanak_bmasuklain').val();
    } else {
        caramasuk = $('input[name=dacriasesmenanak_bmasukId]:checked').val();
    }
    if ($('input[name=dacriasesmenanak_basalId]:checked').val() == 6) {
        asalmsk = $('#dacriasesmenanak_basallain').val();
    } else {
        asalmsk = $('input[name=dacriasesmenanak_basalId]:checked').val();
    }
    if ($('input[name=dacriasesmenanak_bsumberlist]:checked').val() == 2) {
        info = $('#dacriasesmenanak_bsumberlist_2').val() + ',' + $('#dacriasesmenanak_bsumberlist_3').val() + ',' + $('#dacriasesmenanak_bsumberlistket3').val();
    } else {
        info = $('input[name=dacriasesmenanak_bsumberlist]:checked').val();
    }
    var param = {
        id_kunjungan: $('#idKunjunganermirna').val(),
        id_transaksi: $('#transaksiermirna').val(),
        no_rm: $('#rmermirna').val(),
        id_pegawai: user.id_pegawai,
        sumber_info: info,
        cara_masuk: caramasuk,
        asal_masuk: asalmsk,
        rwtantenatal: $('input[name=dacriasesmenanak_hantenatalId]:checked').val(),
        pnykithamil: penyakithml,
        obat: obat,
        persalinan: persalinan,
        penolong: penolong,
        getasi: $('input[name=dacriasesmenanak_hgestasiId]:checked').val(),
        bblahir: $('#dacriasesmenanak_hbayibb').val(),
        panjangbdn: $('#dacriasesmenanak_hbayipb').val(),
        lingkarkep: $('#dacriasesmenanak_hbayilk').val(),
        apgarskor: $('#dacriasesmenanak_hbayiapgar').val(),
        kelainan: kelainan,
        rwyttumbuh: rwyttumbuh,
        rwytimunisasi: $('#rwytimunisasiassanak').val(),
        face: document.getElementById('dacriasesmenanak_cnyeriflacc1').value,
        legs: document.getElementById('dacriasesmenanak_cnyeriflacc2').value,
        actv: document.getElementById('dacriasesmenanak_cnyeriflacc3').value,
        cry: document.getElementById('dacriasesmenanak_cnyeriflacc4').value,
        consolblity: document.getElementById('dacriasesmenanak_cnyeriflacc5').value,
        totalskornyeri: document.getElementById('dacriasesmenanak_cnyeriflacctot').value,
        bab: document.getElementById('dacriasesmenanak_lbathel1').value,
        sikap: document.getElementById('dacriasesmenanak_lbathel2').value,
        bak: document.getElementById('dacriasesmenanak_lbathel3').value,
        jalan: document.getElementById('dacriasesmenanak_lbathel4').value,
        bersihdiri: document.getElementById('dacriasesmenanak_lbathel5').value,
        pakaibaju: document.getElementById('dacriasesmenanak_lbathel6').value,
        klrmasktoilet: document.getElementById('dacriasesmenanak_lbathel7').value,
        naikturuntngga: document.getElementById('dacriasesmenanak_lbathel8').value,
        makan: document.getElementById('dacriasesmenanak_lbathel9').value,
        mandi: document.getElementById('dacriasesmenanak_lbathel10').value,
        totalbarthel: document.getElementById('dacriasesmenanak_lbatheltotal').value,
        skorbarthel: $('input[name=dacriasesmenanak_lfungsionalId]:checked').val(),
        skorgizia: $('input[name=dacriasesmenanak_egizia]:checked').val(),
        skorgizib: $('input[name=dacriasesmenanak_egizib]:checked').val(),
        skorgizic1: $('input[name=dacriasesmenanak_egizic1]:checked').val(),
        skorgizic2: $('input[name=dacriasesmenanak_egizic2]:checked').val(),
        skorgizid: $('input[name=dacriasesmenanak_egizid]:checked').val(),
        totalgizi: document.getElementById('dacriasesmenanak_egiziskor').value,
        resjatuhusia: document.getElementById('dacriasesmenanak_mrisikoskor1').value,
        resjatuhjk: document.getElementById('dacriasesmenanak_mrisikoskor2').value,
        resjatuhdiag: document.getElementById('dacriasesmenanak_mrisikoskor3').value,
        resjatuhkog: document.getElementById('dacriasesmenanak_mrisikoskor4').value,
        resjatuhlink: document.getElementById('dacriasesmenanak_mrisikoskor5').value,
        resjatuhresop: document.getElementById('dacriasesmenanak_mrisikoskor6').value,
        resjatuhobt: document.getElementById('dacriasesmenanak_mrisikoskor7').value,
        resjatuhtotal: document.getElementById('dacriasesmenanak_mrisikoskortot').value,
        derajatresjatuh: $('input[name=dacriasesmenanak_mjatuhId]:checked').val(),
        ttd: document.getElementById('Hasilpaint_TttdperawatassanakRI').value,
        keadaan_umum: document.getElementById('dacriasesmenanak_akeadaan').value,
        respirasi: document.getElementById('dacriasesmenanak_crespirasi').value,
        nadi: document.getElementById('dacriasesmenanak_dnadi').value,
        spo2: document.getElementById('dacriasesmenanak_hspo2').value,
        pupil_kiri: document.getElementById('dacriasesmenanak_epupil1').value,
        pupil_kanan: document.getElementById('dacriasesmenanak_epupil2').value,
        reflek_cahaya_kiri: document.getElementById('dacriasesmenanak_ireflek1').value,
        reflek_cahaya_kanan: document.getElementById('dacriasesmenanak_ireflek2').value,
        tekanan_darah1: document.getElementById('dacriasesmenanak_ftensi1').value,
        tekanan_darah2: document.getElementById('dacriasesmenanak_ftensi2').value,
        palpasi: document.getElementById('dacriasesmenanak_fpalpasi').value,
        suhu: document.getElementById('dacriasesmenanak_gsuhu').value,
        lingkarkepala: document.getElementById('dacriasesmenanak_klingkarkepala').value,
        lingkarlengan: document.getElementById('dacriasesmenanak_klingkarlengan').value,
        lingkarperut: document.getElementById('dacriasesmenanak_klingkarperut').value,
        bb: document.getElementById('dacriasesmenanak_jbb').value,
        tinggi_badan: document.getElementById('dacriasesmenanak_jtb').value,
        imt: document.getElementById('dacriasesmenanak_kimt').value,
        skor_kesadaran: document.getElementById('dacriasesmenanak_bgcstot').value,
        tipe_kesadaran: document.getElementById('dacriasesmenanak_asadar').value,
        respon_e: document.getElementById('dacriasesmenanak_bgcsa').value,
        respon_m: document.getElementById('dacriasesmenanak_bgcsb').value,
        respon_v: document.getElementById('dacriasesmenanak_bgcsc').value
    }

    console.log(param)

        // var arraykepala = Array.from(document.querySelectorAll('input[name=dacriasesmenanak_kkepalalist]:checked')).map(c => c.value);
        // fkepala = arraykepala.join();
        // if ($('#dacriasesmenanak_kkepalalist_6').is(':checked')) {
        //     kepala = fkepala + ',' + document.getElementById('dacriasesmenanak_kkepalalistket6').value;
        // } else {
        //     kepala = fkepala;
        // }
        // var arrayrambut = Array.from(document.querySelectorAll('input[name=dacriasesmenanak_krambutlist]:checked')).map(c => c.value);
        // frambut = arrayrambut.join();
        // if ($('#dacriasesmenanak_krambutlist_6').is(':checked')) {
        //     rambut = frambut + ',' + document.getElementById('dacriasesmenanak_krambutlistket6').value;
        // } else {
        //     rambut = frambut;
        // }
        // var arraymuka = Array.from(document.querySelectorAll('input[name=dacriasesmenanak_kmukalist]:checked')).map(c => c.value);
        // fmuka = arraymuka.join();
        // if ($('#dacriasesmenanak_kmukalist_6').is(':checked')) {
        //     muka = fmuka + ',' + document.getElementById('dacriasesmenanak_kmukalistket6').value;
        // } else {
        //     muka = fmuka;
        // }
        // var arraymata = Array.from(document.querySelectorAll('input[name=dacriasesmenanak_kmatalist]:checked')).map(c => c.value);
        // fmata = arraymata.join();
        // if ($('#dacriasesmenanak_kmatalist_8').is(':checked')) {
        //     mata = fmata + ',' + document.getElementById('dacriasesmenanak_kmatalistket8').value;
        // } else {
        //     mata = fmata;
        // }
        // var arraytelinga = Array.from(document.querySelectorAll('input[name=dacriasesmenanak_ktelingalist]:checked')).map(c => c.value);
        // ftelinga = arraytelinga.join();
        // if ($('#dacriasesmenanak_ktelingalist_4').is(':checked')) {
        //     telinga = ftelinga + ',' + document.getElementById('dacriasesmenanak_ktelingalistket4').value;
        // } else {
        //     telinga = ftelinga;
        // }
        // var arrayhidung = Array.from(document.querySelectorAll('input[name=dacriasesmenanak_khidunglist]:checked')).map(c => c.value);
        // fhidung = arrayhidung.join();
        // if ($('#dacriasesmenanak_khidunglist_4').is(':checked')) {
        //     hidung = fhidung + ',' + document.getElementById('dacriasesmenanak_khidunglistket4').value;
        // } else {
        //     hidung = fhidung;
        // }
        // var arraymulut = Array.from(document.querySelectorAll('input[name=dacriasesmenanak_kmulutlist]:checked')).map(c => c.value);
        // fmulut = arraymulut.join();
        // if ($('#dacriasesmenanak_kmulutlist_7').is(':checked')) {
        //     mulut = fmulut + ',' + document.getElementById('dacriasesmenanak_kmulutlistket7').value;
        // } else {
        //     mulut = fmulut;
        // }
        // var arraygigi = Array.from(document.querySelectorAll('input[name=dacriasesmenanak_kgigilist]:checked')).map(c => c.value);
        // fgigi = arraygigi.join();
        // if ($('#dacriasesmenanak_kgigilist_4').is(':checked')) {
        //     gigi = fgigi + ',' + document.getElementById('dacriasesmenanak_kgigilistket4').value;
        // } else {
        //     gigi = fgigi;
        // }
        // var arraylidah = Array.from(document.querySelectorAll('input[name=dacriasesmenanak_klidahlist]:checked')).map(c => c.value);
        // flidah = arraylidah.join();
        // if ($('#dacriasesmenanak_klidahlist_4').is(':checked')) {
        //     lidah = flidah + ',' + document.getElementById('dacriasesmenanak_klidahlistket4').value;
        // } else {
        //     lidah = flidah;
        // }
        // var arraytenggorokan = Array.from(document.querySelectorAll('input[name=dacriasesmenanak_kgoroklist]:checked')).map(c => c.value);
        // ftgrk = arraytenggorokan.join();
        // if ($('#dacriasesmenanak_kgoroklist_4').is(':checked')) {
        //     tengrkn = ftgrk + ',' + document.getElementById('dacriasesmenanak_kgoroklistket4').value;
        // } else {
        //     tengrkn = ftgrk;
        // }
        // var arrayleher = Array.from(document.querySelectorAll('input[name=dacriasesmenanak_kleherlist]:checked')).map(c => c.value);
        // fleher = arrayleher.join();
        // if ($('#dacriasesmenanak_kleherlist_6').is(':checked')) {
        //     leher = fleher + ',' + document.getElementById('dacriasesmenanak_kleherlistket6').value;
        // } else {
        //     leher = fleher;
        // }
        // var arraydada = Array.from(document.querySelectorAll('input[name=dacriasesmenanak_kdadalist]:checked')).map(c => c.value);
        // fdada = arraydada.join();
        // if ($('#dacriasesmenanak_kdadalist_3').is(':checked')) {
        //     if ($('#dacriasesmenanak_kdadanafaslist_4').is(':checked')) {
        //         dada = fdada + ',' + document.querySelector('input[name=dacriasesmenanak_kdadanafaslist]:checked').value + ',' + document.getElementById('dacriasesmenanak_kdadanafaslistket4').value;
        //     } else {
        //         dada = fdada + ',' + document.querySelector('input[name=dacriasesmenanak_kdadanafaslist]:checked').value;
        //     }
        // } else if ($('#dacriasesmenanak_kdadalist_4').is(':checked')) {
        //     if ($('#dacriasesmenanak_kdadarespirId_2').is(':checked')) {
        //         dada = fdada + ',' + document.querySelector('input[name=dacriasesmenanak_kdadarespirId]:checked').value + ',' + document.getElementById('dacriasesmenanak_kdadarespirket').value;
        //     } else {
        //         dada = fdada + ',' + document.querySelector('input[name=dacriasesmenanak_kdadarespirId]:checked').value;
        //     }
        // } else {
        //     dada = fdada;
        // }

        // var pfisik = {
        //     kepala: kepala,
        //     rambut: rambut,
        //     muka: muka,
        //     mata: mata,
        //     telinga: telinga,
        //     hidung: hidung,
        //     mulut: mulut,
        //     gigi: gigi,
        //     lidah: lidah,
        //     tengrkn: tengrkn,
        //     leher: leher,
        //     dada: dada,
        // }
        // console.log(pfisik)

        // if ($('input[name=dacriasesmenanak_mjatuhId]:checked').val() == 1) {
        //     var arrayjth = Array.from(document.querySelectorAll('input[name=dacriasesmenanak_mrendahlist]:checked')).map(c => c.value);
        //     resjatuh = arrayjth.join();
        // }
        // if ($('input[name=dacriasesmenanak_mjatuhId]:checked').val() == 2) {
        //     var arrayjth = Array.from(document.querySelectorAll('input[name=dacriasesmenanak_mtinggilist]:checked')).map(c => c.value);
        //     resjatuh = arrayjth.join();
        // }
        // var res_jatuh = {
        //     resjatuh: resjatuh
        // }
        // console.log(res_jatuh)
    apiPOST('Assesmen_RS/simpanassesmenanakirna', param, hasil => {

    })
}

function showAssessmenAnakRI(no_rm,unit,id_kunjungan,id_unit,nama,transaksi,tgl_lahir,alamat,id_pegawai,jnskelamin,nama_kamar,penjamin,jam_masuk, nama_dokter){

}
</script>