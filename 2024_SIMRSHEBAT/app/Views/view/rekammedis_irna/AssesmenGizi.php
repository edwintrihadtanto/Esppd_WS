<div class="card-body p-2 darkgrey-custom" id="divassesmenGizi">
    <div id="div2assesmenGizi" class="rapet">
        <div class="card"><!-- TITLE -->
            <div class="col-md-12">
                <div class="row d-flex justify-content-center">
                    <h4><b><label class="col-form-label">FORMULIR ASESMEN / PEGKAJIAN GIZI</label></b></h4>
                </div>
            </div>
        </div>
        <div class="card "><!-- JENIS INFORMASI -->
            <div class="card-header" style="background-color:black;">
                <h3 class="card-title" style="color:white;"> ANTROPOMETRI & KLINIS / FISIK</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="col-form-label" title="Tensi">Tekanan Darah</label>
                            </div>
                            <div class="col-md-5">
                                <div class="input-group input-group-sm">
                                    <input type="number" onfocus="this.select();" class="form-control form-control-sm" id="assesmenGizitensi1">
                                    <label class="col-form-label">/</label>
                                    <input type="number" onfocus="this.select();" class="form-control form-control-sm" id="assesmenGizitensi2">
                                    <span class="input-group-append">
                                        <span class="input-group-text">mmHg</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="col-form-label">Berat Badan</label>
                            </div>
                            <div class="col-md-5">
                                <div class="input-group input-group-sm">
                                    <input type="number" onfocus="this.select();" class="form-control form-control-sm" id="assesmenGiziberatbadan">
                                    <span class="input-group-append">
                                        <span class="input-group-text" id="assesmenGizidivbb">Kg</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="col-form-label">Tinggi Badan</label>
                            </div>
                            <div class="col-md-5">
                                <div class="input-group input-group-sm">
                                    <input type="number" onkeyup="hitungimtassgizi()" class="form-control form-control-sm" id="assesmenGizitinggibadan">
                                    <span class="input-group-append">
                                        <span class="input-group-text">Cm</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="col-form-label">IMT</label>
                            </div>
                            <div class="col-md-5">
                                <input type="number" onfocus="this.select();" class="form-control form-control-sm" id="assesmenGiziImt" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="col-form-label font-italic">* ( Sesuai Tanda Vital Terakhir Pasien Selama Perawatan )</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="col-form-label" title="Diagnosa Klinis">Diagnosa Klinis</label>
                                <br>
                                <label class="col-form-label font-italic">* ( Sesuai Dokter )</label>
                            </div>
                            <div class="col-md-0">&nbsp;</div>
                            <div class="col-md-7">
                                <textarea rows="4" id="assesmenGizidiagnosa" style="width:100%;" class="form-control form-control-sm "></textarea>
                            </div>
                        </div>
                        <div class="form-group row" style="padding-top: 4px;">
                            <div class="col-md-3">
                                <label class="col-form-label" title="Klinis / Fisik">Klinis / Fisik</label>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="assesmenGiziklinisfisik" value="1" type="checkbox" class="custom-control-input" id="assesmenGizicekKlinis1">
                                                <label class="custom-control-label" for="assesmenGizicekKlinis1">Mual</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="assesmenGiziklinisfisik" value="2" type="checkbox" class="custom-control-input" id="assesmenGizicekKlinis2">
                                                <label class="custom-control-label" for="assesmenGizicekKlinis2">Muntah</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="assesmenGiziklinisfisik" value="3" type="checkbox" class="custom-control-input" id="assesmenGizicekKlinis3">
                                                <label class="custom-control-label" for="assesmenGizicekKlinis3">Diare</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="assesmenGiziklinisfisik" value="4" type="checkbox" class="custom-control-input" id="assesmenGizicekKlinis4">
                                                <label class="custom-control-label" for="assesmenGizicekKlinis4">Konstipasi</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="assesmenGiziklinisfisik" value="5" type="checkbox" class="custom-control-input" id="assesmenGizicekKlinis5">
                                                <label class="custom-control-label" for="assesmenGizicekKlinis5">Kembung</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="assesmenGiziklinisfisik" value="6" type="checkbox" class="custom-control-input" id="assesmenGizicekKlinis6">
                                                <label class="custom-control-label" for="assesmenGizicekKlinis6">Edema</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="assesmenGiziklinisfisik" value="7" type="checkbox" class="custom-control-input" id="assesmenGizicekKlinis7">
                                                <label class="custom-control-label" for="assesmenGizicekKlinis7">Ascites</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="assesmenGiziklinisfisik" value="8" type="checkbox" class="custom-control-input" id="assesmenGizicekKlinis8">
                                                <label class="custom-control-label" for="assesmenGizicekKlinis8">Gangguan Menelan</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="assesmenGiziklinisfisik" value="9" type="checkbox" class="custom-control-input" id="assesmenGizicekKlinis9">
                                                <label class="custom-control-label" for="assesmenGizicekKlinis9">Gangguan Mengunyah</label>
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
        <div class="card "><!-- ASSESMEN -->
            <div class="card-header" style="background-color:black;">
                <h3 class="card-title" style="color:white;">ASESMEN / PEGKAJIAN</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="col-form-label font-weight-bold">1. Risiko Malnutrisi Berdasarkan Hasil Skrining Oleh Perawat,
                                Kondisi Pasien Termasuk Kategori : </label>
                            </div>
                            <div class="col-md-12">
                                <label class="col-form-label font-italic"> * ( Sesuai Skor Skrining Gizi Pada Form Asesmen Yang Dilakukan Oleh Petugas Perawat Rawat Inap )</label>
                            </div>
                        </div>
                        <div class="form-group row" id="divrisiko1assesmenGizi">
                            <div class="col-md-0">&nbsp;&nbsp;&nbsp;&nbsp;</div>
                            <div class="col-md-11">
                                <div class="row" id="assesmenGiziskorskrining1">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="assesmenGiziskorskrining1" value="1" type="radio" class="custom-control-input" id="assesmenGizinilaiskor1skrining1" checked>
                                                <label class="custom-control-label" for="assesmenGizinilaiskor1skrining1">Ringan (Nilai Skor 0)</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="assesmenGiziskorskrining1" value="2" type="radio" class="custom-control-input" id="assesmenGizinilaiskor1skrining2">
                                                <label class="custom-control-label" for="assesmenGizinilaiskor1skrining2">Sedang (Nilai Skor 1)</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="assesmenGiziskorskrining1" value="3" type="radio" class="custom-control-input" id="assesmenGizinilaiskor1skrining3">
                                                <label class="custom-control-label" for="assesmenGizinilaiskor1skrining3">Tinggi (Nilai Skor ≥ 2)</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row" style="padding-top:6px;">
                            <div class="col-md-12">
                                <label class="col-form-label font-weight-bold">2. Verifikasi Skrining Gizi Oleh Ahli Gizi, Kondisi Pasien Termasuk Kategori : </label>
                            </div>
                        </div>
                        <div class="form-group row" id="assesmenGizidivverivikasiskrining2">
                            <div class="col-md-0">&nbsp;&nbsp;&nbsp;&nbsp;</div>
                            <div class="col-md-11">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="assesmenGiziverivikasi1" value="1" type="radio" class="custom-control-input" id="assesmenGizinilai1verivikasi1" checked>
                                                <label class="custom-control-label" for="assesmenGizinilai1verivikasi1">Ringan (Nilai Skor 0)</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="assesmenGiziverivikasi1" value="2" type="radio" class="custom-control-input" id="assesmenGizinilai1verivikasi2">
                                                <label class="custom-control-label" for="assesmenGizinilai1verivikasi2">Sedang (Nilai Skor 1)</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="assesmenGiziverivikasi1" value="3" type="radio" class="custom-control-input" id="assesmenGizinilai1verivikasi3">
                                                <label class="custom-control-label" for="assesmenGizinilai1verivikasi3">Tinggi (Nilai Skor ≥ 2)</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row" style="padding-top:6px;">
                            <div class="col-md-12">
                                <label class="col-form-label font-weight-bold">3. Pasien Mempunyai Kondisi Khusus : </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-0">&nbsp;&nbsp;&nbsp;&nbsp;</div>
                            <div class="col-md-11">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="assesmenGizikondisiKhusus" value="1" type="radio" class="custom-control-input" id="assesmenGizikondisiKhusus1" onclick="document.getElementById('divdacriasesmengizi_div_bkondisikhususId').style.display='none'" checked>
                                                <label class="custom-control-label" for="assesmenGizikondisiKhusus1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="assesmenGizikondisiKhusus" value="2" type="radio" class="custom-control-input" id="assesmenGizikondisiKhusus2" onclick="document.getElementById('divdacriasesmengizi_div_bkondisikhususId').style.display='block'">
                                                <label class="custom-control-label" for="assesmenGizikondisiKhusus2">Ya</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 row" id="divdacriasesmengizi_div_bkondisikhususId" style="display:none;">
                                <div class=" col-md-4"> </div>
                                <div class="col-md-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                <div class="col-md-8">
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text">Sebutkan : </span>
                                        </span>
                                        <input type="text" class="form-control form-control-sm" id="assesmenGizikondisiKhususket">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- MID -->
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="col-form-label font-weight-bold">4. Alergi Makanan :</label>
                            </div>
                            <div class="col-md-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                            <div class="col-md-11">
                                <input type="text" class="form-control form-control-sm" id="assesmenGiziketAlergi">
                            </div>
                        </div>
                        <div class="form-group row" id="labelassesmenGizidietawal">
                            <div class="col-md-12">
                                <label class="col-form-label font-weight-bold">5. Preskripsi Diet Awal :</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-0">&nbsp;&nbsp;&nbsp;&nbsp;</div>
                            <div class="col-md-11">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="assesmenGizidietawal" value="1" type="radio" class="custom-control-input" id="assesmenGizidietawal1" checked>
                                                <label class="custom-control-label" for="assesmenGizidietawal1">Makanan Umum</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="assesmenGizidietawal" value="2" type="radio" class="custom-control-input" id="assesmenGizidietawal2">
                                                <label class="custom-control-label" for="assesmenGizidietawal2">Makanan Khusus</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row" style="padding-top:6px;">
                            <div class="col-md-12">
                                <label class="col-form-label font-weight-bold" id="labelassesmenGizitindaklanjut">6. Tindak Lanjut : </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-0">&nbsp;&nbsp;&nbsp;&nbsp;</div>
                            <div class="col-md-11">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="assesmenGizitindaklajut" value="1" type="radio" class="custom-control-input" id="assesmenGizitindaklajut1">
                                                <label class="custom-control-label" for="assesmenGizitindaklajut1">Perlu Asuhan Gizi</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="assesmenGizitindaklajut" value="2" type="radio" class="custom-control-input" id="assesmenGizitindaklajut2" checked>
                                                <label class="custom-control-label" for="assesmenGizitindaklajut2">Belum Perlu Asuhan Gizi</label>
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
        <div class="card" id="cardriwayatgizi"><!-- ASSESMEN -->
            <div class="card-header" style="background-color:black;">
                <h3 class="card-title" style="color:white;"> RIWAYAT GIZI</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="col-form-label" title="Pantangan Makanan">Pantangan Makanan</label>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="assesmenGizipantangan" value="1" type="radio" class="custom-control-input" id="assesmenGizipantangan1" onclick="document.getElementById('assesmenGizipantangandiv').style.display='none'" checked>
                                                <label class="custom-control-label" for="assesmenGizipantangan1">Tidak Ada</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="assesmenGizipantangan" value="2" type="radio" class="custom-control-input" id="assesmenGizipantangan2" onclick="document.getElementById('assesmenGizipantangandiv').style.display='block'">
                                                <label class="custom-control-label" for="assesmenGizipantangan2">Ada, Sebutkan :</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row" id="assesmenGizipantangandiv" style="display:none;">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-0">&nbsp;</div>
                                    <div class="col-md-7">
                                        <textarea rows="2" name="assesmenGizipantanganket" id="assesmenGizipantanganket" style="width:100%;" class="form-control form-control-sm "></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="col-form-label" title="Pola Makan">Pola Makan</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="col-form-label" title="Pola Makan"> Makan Utama</label>
                            </div>
                            <div class="col-md-0">&nbsp;</div>
                            <div class="col-md-5">
                                <div class="input-group input-group-sm">
                                    <input type="number" onfocus="this.select();" class="form-control form-control-sm" id="assesmenGizimakanutama">
                                    <span class="input-group-append">
                                        <span class="input-group-text"> x/Hari </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="col-form-label" title="Pola Makan"> Selingan</label>
                            </div>
                            <div class="col-md-0">&nbsp;</div>
                            <div class="col-md-5">
                                <div class="input-group input-group-sm">
                                    <input type="number" onfocus="this.select();" class="form-control form-control-sm" id="assesmenGizimakananselingan">
                                    <span class="input-group-append">
                                        <span class="input-group-text"> x/Hari </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="col-form-label" title="Asupan Gizi">Asupan Gizi</label>
                            </div>
                            <div class="col-md-0">&nbsp;</div>
                            <div class="col-md-7">
                                <textarea rows="3" name="assesmenGiziasupan" id="assesmenGiziasupan" style="width:100%;" class="form-control form-control-sm "></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="col-form-label" title="Riwayat Personal">Riwayat Personal</label>
                            </div>
                            <div class="col-md-0">&nbsp;</div>
                            <div class="col-md-7">
                                <textarea rows="3" name="assesmenGiziriwayatpersonal" id="assesmenGiziriwayatpersonal" style="width:100%;" class="form-control form-control-sm "></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card "><!-- ASSESMEN -->
            <div class="card-header" style="background-color:black;">
                <h3 class="card-title" style="color:white;"> DIAGNOSA / MASALAH GIZI</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <textarea rows="3" id="assesmenGizidiagnosamasalah" style="width:100%;" class="form-control form-control-sm "></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card "><!-- ASSESMEN -->
            <div class="card-header" style="background-color:black;">
                <h3 class="card-title" style="color:white;"> INTERVENSI GIZI</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="col-form-label">Konseling Gizi</label>
                            </div>
                            <div class="col-md-0">&nbsp;</div>
                            <div class="col-md-7">
                                <textarea rows="3" name="assesmenGizikonseling" id="assesmenGizikonseling" style="width:100%;" class="form-control form-control-sm "></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="col-form-label">Asupan Makanan</label>
                            </div>
                            <div class="col-md-0">&nbsp;</div>
                            <div class="col-md-7">
                                <textarea rows="3" name="assesmenGiziasupanmakanan" id="assesmenGiziasupanmakanan" style="width:100%;" class="form-control form-control-sm "></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="col-form-label">Perencanaan Kebutuhan</label>
                            </div>
                            <div class="col-md-0">&nbsp;</div>
                            <div class="col-md-7">
                                <textarea rows="3" name="assesmenGiziperencanaankeb" id="assesmenGiziperencanaankeb" style="width:100%;" class="form-control form-control-sm "></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="col-form-label">Jenis Diet</label>
                            </div>
                            <div class="col-md-0">&nbsp;</div>
                            <div class="col-md-7">
                                <textarea rows="3" name="dacriasesmengizi_djenisdiet" id="dacriasesmengizi_djenisdiet" style="width:100%;" class="form-control form-control-sm "></textarea>
                            </div>
                        </div>
                        <div class="form-group row" style="padding-top: 4px;">
                            <div class="col-md-3">
                                <label class="col-form-label">Cara Pemberian</label>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmengizi_dcarapemberian" value="1" type="radio" class="custom-control-input" id="dacriasesmengizi_dcarapemberian_1" checked>
                                                <label class="custom-control-label" for="dacriasesmengizi_dcarapemberian_1">Oral</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmengizi_dcarapemberian" value="2" type="radio" class="custom-control-input" id="dacriasesmengizi_dcarapemberian_2">
                                                <label class="custom-control-label" for="dacriasesmengizi_dcarapemberian_2">NGT</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="col-form-label">Bentuk Makanan</label>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmengizi_dbentuk" value="1" type="radio" class="custom-control-input" id="dacriasesmengizi_dbentuk_1">
                                                <label class="custom-control-label" for="dacriasesmengizi_dbentuk_1">Makanan Cair</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmengizi_dbentuk" value="2" type="radio" class="custom-control-input" id="dacriasesmengizi_dbentuk_2">
                                                <label class="custom-control-label" for="dacriasesmengizi_dbentuk_2">Bubur Saring</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmengizi_dbentuk" value="3" type="radio" class="custom-control-input" id="dacriasesmengizi_dbentuk_3">
                                                <label class="custom-control-label" for="dacriasesmengizi_dbentuk_3">Bubur</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmengizi_dbentuk" value="4" type="radio" class="custom-control-input" id="dacriasesmengizi_dbentuk_4">
                                                <label class="custom-control-label" for="dacriasesmengizi_dbentuk_4">Nasi TIM</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmengizi_dbentuk" value="5" type="radio" class="custom-control-input" id="dacriasesmengizi_dbentuk_5" checked>
                                                <label class="custom-control-label" for="dacriasesmengizi_dbentuk_5">Nasi Biasa</label>
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
        <div class="card"><!-- TTD -->
            <div class="card-header" style="background-color:black;">
                <h3 class="card-title" style="color:white;">RENCANA MONITORING DAN EVALUASI</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6" id="dacriasesmengizi_div5">
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="col-form-label">Rencana Monitoring</label>
                            </div>
                            <div class="col-md-0">&nbsp;</div>
                            <div class="col-md-7">
                                <textarea rows="3" name="dacriasesmengizi_devaluasi" id="dacriasesmengizi_devaluasi" style="width:100%;" class="form-control form-control-sm "></textarea>
                            </div>
                        </div>
                        <div class="form-group row" style="padding-top: 3px;">
                            <div class="col-md-3">
                                <label class="col-form-label">Konseling Gizi Lanjutan</label>
                            </div>
                            <div class="col-md-9">
                                <div class="row" id="dacriasesmengizi_dkonselinglanjutan">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmengizi_dkonselinglanjutan" value="1" type="radio" class="custom-control-input" id="dacriasesmengizi_dkonselinglanjutan_1" onclick="document.getElementById('dacriasesmengizi_div_dkonselinglanjutan').style.display='none'" checked>
                                                <label class="custom-control-label" for="dacriasesmengizi_dkonselinglanjutan_1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmengizi_dkonselinglanjutan" value="2" type="radio" class="custom-control-input" id="dacriasesmengizi_dkonselinglanjutan_2" onclick="document.getElementById('dacriasesmengizi_div_dkonselinglanjutan').style.display='block'">
                                                <label class="custom-control-label" for="dacriasesmengizi_dkonselinglanjutan_2">Ya</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="dacriasesmengizi_div_dkonselinglanjutan" style="padding-bottom: 5px; display:none;">
                                    <div class="col-md-3"> </div>
                                    <div class="col-md-6">
                                        <input type="date" id="tglkonselingassesmenGizi" class="form-control form-control-sm">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="col-form-label">Pemahaman Materi Konseling</label>
                            </div>
                            <div class="col-md-9">
                                <div class="row" id="dacriasesmengizi_dkonselingmateri">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmengizi_dkonselingmateri" value="1" type="radio" class="custom-control-input" id="dacriasesmengizi_dkonselingmateri_1" onclick="document.getElementById('dacriasesmengizi_div_dkonselingmateri').style.display='none'" checked>
                                                <label class="custom-control-label" for="dacriasesmengizi_dkonselingmateri_1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmengizi_dkonselingmateri" value="2" type="radio" class="custom-control-input" id="dacriasesmengizi_dkonselingmateri_2" onclick="document.getElementById('dacriasesmengizi_div_dkonselingmateri').style.display='block'">
                                                <label class="custom-control-label" for="dacriasesmengizi_dkonselingmateri_2">Ya</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="dacriasesmengizi_div_dkonselingmateri" style="padding-bottom: 5px; display:none;">
                                    <div class="col-md-3"> </div>
                                    <div class="col-md-6">
                                        <input type="date" id="tglkonselingmateriassesmengizi" class="form-control form-control-sm">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-md-12" align="center">
                                <label class="col-form-label">Ahli Gizi
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 " align="center">
                                <div class="col-md-6">
                                    <input type="date" id="tglttdAssesmenGizi" class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive" align="center">
                            <div class="col-md-6" align="center">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td width="50%" style="padding:0;">
                                                <input type="text" class="form-control form-control-sm text-center" id="dacinformasisedasi_zpjttd1">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12" align="center">
                                <label class="col-form-label">Nama &amp; Tanda tangan</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button onclick="simpanAssesmenGizi()" id="btnsimpanassesmenGizi" type="button" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Simpan</button>
                <!-- <button onclick="deleteAssesmenGizi()" id="btnhapusassesmenGizi" type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</button> -->
                <button onclick="printAssesmenGizi()" id="btnprintassesmenGizi" type="button" class="btn btn-sm btn-success"><i class="fas fa-print"></i> Print Pdf</button>
                <button onclick="adime()" id="btnprintassesmenGizi" type="button" class="btn btn-sm btn-success"><i class="fas fa-print"></i> ADIME</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var data = document.getElementById('profilepasienirna').value;
        if (data == '') {
            $('#modallistpasienirna').modal('show');
        }

        //setTimeout(refresh_listpasermirna_instruksi, 1000); 
    });

    function tampilPasienermirna(no_rm, unit, id_kunjungan, id_unit, nama, transaksi, tgl_lahir, alamat, id_pegawai) {
        $('#modallistpasienirna').modal('hide');
        $('.tab-empty').hide();
        showDetailDataPasienIrna();
        document.getElementById('rmermirna').value = no_rm;
        document.getElementById('namaermirna').value = nama;
        document.getElementById('unitermirna').value = unit;
        document.getElementById('idKunjunganermirna').value = id_kunjungan;
        document.getElementById('idunitermirna').value = id_unit;
        document.getElementById('transaksiermirna').value = transaksi;
        document.getElementById('alamatermirna').value = alamat;
        document.getElementById('profilepasienirna').value = id_kunjungan;
        data.namas = nama;
        data.norms = no_rm;
        data.units = unit;
        data.id_units = id_unit;
        data.id_kunjungans = id_kunjungan;
        alamatpasien = alamat;
        tgllahir = tgl_lahir;
    }

    function hitungimtassgizi() {
        var imt = '';
        var num = '';
        var a = document.getElementById('assesmenGizitinggibadan').value;
        var b = document.getElementById('assesmenGiziberatbadan').value;
        var num = a / 100;
        imt = b / (num * num);
        document.getElementById('assesmenGiziImt').value = imt;
    }
    function adime() {
        // body...
    }
    function simpanAssesmenGizi() {
        if ($('input[name=assesmenGizikondisiKhusus]:checked').val() == 2) {
            kondisikusus = $('#assesmenGizikondisiKhususket').val();
        } else {
            kondisikusus = $('input[name=assesmenGizikondisiKhusus]:checked').val();
        }
        if ($('input[name=assesmenGizipantangan]:checked').val() == 2) {
            pantangan = $('#assesmenGizipantanganket').val();
        } else {
            pantangan = $('input[name=assesmenGizipantangan]:checked').val();
        }
        if ($('input[name=dacriasesmengizi_dkonselinglanjutan]:checked').val() == 2) {
            konsullanjut = $('#tglkonselingassesmenGizi').val();
        } else {
            konsullanjut = $('input[name=dacriasesmengizi_dkonselinglanjutan]:checked').val();
        }
        if ($('input[name=dacriasesmengizi_dkonselingmateri]:checked').val() == 2) {
            konsulmateri = $('#tglkonselingmateriassesmengizi').val();
        } else {
            konsulmateri = $('input[name=dacriasesmengizi_dkonselingmateri]:checked').val();
        }

        // var arrayklinis = Array.from(document.querySelectorAll('input[name=assesmenGiziklinisfisik]:checked')).map(c => c.value);
        // klinisfisik = arrayklinis.join();

        var param = {
            id_kunjungan: $('#idKunjunganermirna').val(),
            id_pegawai: user.id_pegawai,
            transaksi: $('#transaksiermirna').val(),
            tglassesmengizi: $('#assesmenGiziTgl').val(),
            // jenispasien: $('assesmenGizijenispasien').val(),
            // ahligizi: $('assesmenGiziahligizi').val(),
            // tensi1: $('assesmenGizitensi1').val(),
            // tensi2: $('assesmenGizitensi2').val(),
            // beratbdan: $('assesmenGiziberatbadan').val(),
            // tinggibadan: $('assesmenGizitinggibadan').val(),
            // imt: $('assesmenGiziImt').val(),
            // diagnosa: $('assesmenGizidiagnosa').val(),
            // klinisfisik: klinisfisik,
            skrining_perawat: $('input[name=assesmenGiziskorskrining1]:checked').val(),
            skrining_ahli_gizi: $('input[name=assesmenGiziverivikasi1]:checked').val(),
            kondisi_khusus: kondisikusus,
            alergi: $('#assesmenGiziketAlergi').val(),
            diet_awal: $('input[name=assesmenGizidietawal]:checked').val(),
            tindak_lanjut: $('input[name=assesmenGizitindaklajut]:checked').val(),
            pantangan: pantangan,
            makananutama: $('#assesmenGizimakanutama').val(),
            selingan: $('#assesmenGizimakananselingan').val(),
            asupan: $('#assesmenGiziasupan').val(),
            rwytpersonal: $('#assesmenGiziriwayatpersonal').val(),
            diagmasalah: $('#assesmenGizidiagnosamasalah').val(),
            konseling: $('#assesmenGizikonseling').val(),
            asupanmakanan: $('#assesmenGiziasupanmakanan').val(),
            kebutuhangizi: $('#assesmenGiziperencanaankeb').val(),
            jenisdiet: $('#dacriasesmengizi_djenisdiet').val(),
            caraberi: $('input[name=dacriasesmengizi_dcarapemberian]:checked').val(),
            bentuk: $('input[name=dacriasesmengizi_dbentuk]:checked').val(),
            evaluasi: $('#dacriasesmengizi_devaluasi').val(),
            konsullanjut: konsullanjut,
            konsulmateri: konsulmateri,
            // tglttdass: $('tglttdAssesmenGizi').val(),
            ttdahligizi: $('#dacinformasisedasi_zpjttd1').val(),
        }
        console.log(param)
        apiPOST('Assesmen_RS/simpanassesmengiziirna', param, hasil => {

        })
    }
</script>