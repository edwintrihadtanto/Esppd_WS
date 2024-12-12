<?php
$data 						= json_decode($_GET['data']);
$rm 							= str_replace('"','', json_encode($data->rm));
$unit     				= str_replace('"','', json_encode($data->unit));
$id_kunjungan     = str_replace('"','', json_encode($data->id_kunjungan));
$id_transaksi     = str_replace('"','', json_encode($data->id_transaksi));
?>
<div class="col-md-12 p-0">
  <div class="card"><!-- TITLE -->
    <div class="col-md-12">
      <div class="row d-flex justify-content-center">
        <h4><b><label class="col-form-label">FORMULIR ASSESMEN / PEGKAJIAN GIZI</label></b></h4>
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
              <input type="number" class="form-control form-control-sm" min="0" max="10" id="assesmenGiziImt"value="0" readonly>
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
                      <input name="assesmenGiziklinisfisik" value="0" type="checkbox" class="custom-control-input" id="assesmenGiziklinisfisik0" checked>
                      <label class="custom-control-label" for="assesmenGiziklinisfisik0">Tidak Ada</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="row custom-control custom-checkbox custom-control-inline">
                      <input name="assesmenGiziklinisfisik" value="1" type="checkbox" class="custom-control-input" id="assesmenGiziklinisfisik1">
                      <label class="custom-control-label" for="assesmenGiziklinisfisik1">Mual</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="row custom-control custom-checkbox custom-control-inline">
                      <input name="assesmenGiziklinisfisik" value="2" type="checkbox" class="custom-control-input" id="assesmenGiziklinisfisik2">
                      <label class="custom-control-label" for="assesmenGiziklinisfisik2">Muntah</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="row custom-control custom-checkbox custom-control-inline">
                      <input name="assesmenGiziklinisfisik" value="3" type="checkbox" class="custom-control-input" id="assesmenGiziklinisfisik3">
                      <label class="custom-control-label" for="assesmenGiziklinisfisik3">Diare</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="row custom-control custom-checkbox custom-control-inline">
                      <input name="assesmenGiziklinisfisik" value="4" type="checkbox" class="custom-control-input" id="assesmenGiziklinisfisik4">
                      <label class="custom-control-label" for="assesmenGiziklinisfisik4">Konstipasi</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="row custom-control custom-checkbox custom-control-inline">
                      <input name="assesmenGiziklinisfisik" value="5" type="checkbox" class="custom-control-input" id="assesmenGiziklinisfisik5">
                      <label class="custom-control-label" for="assesmenGiziklinisfisik5">Kembung</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="row custom-control custom-checkbox custom-control-inline">
                      <input name="assesmenGiziklinisfisik" value="6" type="checkbox" class="custom-control-input" id="assesmenGiziklinisfisik6">
                      <label class="custom-control-label" for="assesmenGiziklinisfisik6">Edema</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="row custom-control custom-checkbox custom-control-inline">
                      <input name="assesmenGiziklinisfisik" value="7" type="checkbox" class="custom-control-input" id="assesmenGiziklinisfisik7">
                      <label class="custom-control-label" for="assesmenGiziklinisfisik7">Ascites</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="row custom-control custom-checkbox custom-control-inline">
                      <input name="assesmenGiziklinisfisik" value="8" type="checkbox" class="custom-control-input" id="assesmenGiziklinisfisik8">
                      <label class="custom-control-label" for="assesmenGiziklinisfisik8">Gangguan Menelan</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="row custom-control custom-checkbox custom-control-inline">
                      <input name="assesmenGiziklinisfisik" value="9" type="checkbox" class="custom-control-input" id="assesmenGiziklinisfisik9">
                      <label class="custom-control-label" for="assesmenGiziklinisfisik9">Gangguan Mengunyah</label>
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
                      <input name="dacriasesmengizi_dbentuk" value="1" type="radio" class="custom-control-input" id="dacriasesmengizi_dbentuk_1" checked>
                      <label class="custom-control-label" for="dacriasesmengizi_dbentuk_1">Makanan Biasa</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="row custom-control custom-checkbox custom-control-inline">
                      <input name="dacriasesmengizi_dbentuk" value="2" type="radio" class="custom-control-input" id="dacriasesmengizi_dbentuk_2">
                      <label class="custom-control-label" for="dacriasesmengizi_dbentuk_2">Makanan Lunak</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="row custom-control custom-checkbox custom-control-inline">
                      <input name="dacriasesmengizi_dbentuk" value="3" type="radio" class="custom-control-input" id="dacriasesmengizi_dbentuk_3">
                      <label class="custom-control-label" for="dacriasesmengizi_dbentuk_3">Makanan Saring</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="row custom-control custom-checkbox custom-control-inline">
                      <input name="dacriasesmengizi_dbentuk" value="4" type="radio" class="custom-control-input" id="dacriasesmengizi_dbentuk_4">
                      <label class="custom-control-label" for="dacriasesmengizi_dbentuk_4">Makanan Cair</label>
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
                      <input name="dacriasesmengizi_dkonselinglanjutan" value="0" type="radio" class="custom-control-input" id="dacriasesmengizi_dkonselinglanjutan_1" onclick="document.getElementById('dacriasesmengizi_div_dkonselinglanjutan').style.display='none'" checked>
                      <label class="custom-control-label" for="dacriasesmengizi_dkonselinglanjutan_1">Tidak</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="row custom-control custom-checkbox custom-control-inline">
                      <input name="dacriasesmengizi_dkonselinglanjutan" value="1" type="radio" class="custom-control-input" id="dacriasesmengizi_dkonselinglanjutan_2" onclick="document.getElementById('dacriasesmengizi_div_dkonselinglanjutan').style.display='block'">
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
                      <input name="dacriasesmengizi_dkonselingmateri" value="0" type="radio" class="custom-control-input" id="dacriasesmengizi_dkonselingmateri_1" onclick="document.getElementById('dacriasesmengizi_div_dkonselingmateri').style.display='none'" checked>
                      <label class="custom-control-label" for="dacriasesmengizi_dkonselingmateri_1">Tidak</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="row custom-control custom-checkbox custom-control-inline">
                      <input name="dacriasesmengizi_dkonselingmateri" value="1" type="radio" class="custom-control-input" id="dacriasesmengizi_dkonselingmateri_2" onclick="document.getElementById('dacriasesmengizi_div_dkonselingmateri').style.display='block'">
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
                <input type="date" id="tglttdAssesmenGizi" class="form-control form-control-sm" value="<?php echo date('Y-m-d');?>">
              </div>
            </div>
          </div>
          <div class="table-responsive" align="center">
            <div class="col-md-6" align="center">
              <table>
                <tbody>
                  <tr>
                    <td width="50%" style="padding:0;">
                      <img style="width:250px;height:250px;border: 2px dashed;background-color: #535b62d1;" id="GambarTtdAssesmenGiziIrna">
                      <input type="hidden" class="form-control form-control-sm text-center" id="HasilTtdAssesmenGiziIrna">
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="col-md-12" align="center">
              <button onclick="ShowModalTtdAssesmenGiziIrna()" class="btn btn-primary">TTD</button><br>
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
      <button onclick="$('#ModalInputAdime').modal('show')" id="btnprintassesmenGizi" type="button" class="btn btn-sm btn-success"><i class="fas fa-print"></i> Adime</button>
    </div>
  </div>
</div>

<div class="modal fade"  id="ModalTtdAssesmenGiziIrna" role="dialog">
  <div class="modal-dialog" style="width: 408px;">
    <div class="modal-content">
      <div class="modal-body">
        <div id="paint_ttdAssesmenGiziIrna"></div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-sm btn-primary" onclick="takeTtdAssesmenGiziIrna();">Simpan</button>
        <button class="btn btn-sm btn-outline-danger" onclick="$('#ModalTtdAssesmenGiziIrna').modal('hide');">Batal</button>
      </div>
    </div>
  </div>
</div>


<div class="modal" id="ModalInputAdime" data-bs-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h2>Input Adime</h2>
      </div>
      <div class="modal-body">
        <div class="card">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <div class="col-md-4">
                  Tgl Input
                </div>
                <div class="col-md-8">
                  <input type="date" name="tgl_input_adime" id="tgl_input_adime">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-4">Assesmen</div>
                <div class="col-md-8"><textarea id="adimeassesmen" class="form-control"></textarea> </div>
              </div>
              <div class="form-group">
                <div class="col-md-4">Diagnosa</div>
                <div class="col-md-8"><textarea id="adimediagnosa" class="form-control"></textarea> </div>
              </div>
              <div class="form-group">
                <div class="col-md-4">Intervensi</div>
                <div class="col-md-8"><textarea id="adimeintervensi" class="form-control"></textarea> </div>
              </div>
              <div class="form-group">
                <div class="col-md-4">Monitoring</div>
                <div class="col-md-8"><textarea id="adimemonitoring" class="form-control"></textarea> </div>
              </div>
              <div class="form-group">
                <div class="col-md-4">Evaluasi</div>
                <div class="col-md-8"><textarea id="adimeevaluasi" class="form-control"></textarea> </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">                  
                <div id="divttdadime1" class="sigPad border border-dark" style="width: 240px;border: 1px;">
                  <div class="sig sigWrapper border border-dark current" style="height: auto; display: block;">
                    <img id="ImgTtdadime" style="width:250px;height:250px;border: 1px;">
                  </div>
                  <input type="hidden" name="HasilTtdadime" id="HasilTtdadime">
                  <div><button class="btn btn-primary" onclick="showModaladime()">TTD</button> 
                  </div>
                </div>
                </div>
              </div>
              <div class="form-group">
                <div id="divttdadime2" style="display: none;border: 1px;" class="col-md-12">
                  <div  style="width: 408px;border: 1px;" id="paint_ttdadime" style="border:1px;"></div>

                  <div>

                    <button class="btn btn-sm btn-primary" onclick="takeTtdadime();">Simpan</button>
                    <button class="btn btn-sm btn-outline-danger" onclick="$('#ModalTtdPemberianinfus2').modal('hide');">Batal</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer"> 
        <center><button style="width: 100PX;height:40PX;"    onclick="insertAdime()" class="form-control btn btn-primary" id="btnsimpanadime">Simpan</button></center>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  var ttdAssesmenGiziIrna = new WPaintX('paint_ttdAssesmenGiziIrna'); 
  var no_rm   				= "<?php echo $rm; ?>";
  var id_unit   			= "<?php echo $unit; ?>";
  var id_kunjungan   	= "<?php echo $id_kunjungan; ?>";
  var id_transaksi   	= "<?php echo $id_transaksi; ?>";

  document.getElementById('loading_assesmengizi').style.display = 'block';
  document.getElementById('assesmenGizitensi1').disabled = true;
  document.getElementById('assesmenGizitensi2').disabled = true;
  document.getElementById('assesmenGiziberatbadan').disabled = true;
  document.getElementById('assesmenGizitinggibadan').disabled = true;
  document.getElementById('assesmenGiziImt').disabled = true;
  document.getElementById('assesmenGizidiagnosa').disabled = true;

  viewtandavitalassgizi();
  loadAssesmenGizi();
  function ShowModalTtdAssesmenGiziIrna() {
    showttdAssesmenGiziIrna();
    $('#ModalTtdAssesmenGiziIrna').modal('show');
  }
  function showttdAssesmenGiziIrna(){
    ttdAssesmenGiziIrna.show();
  }
  function takeTtdAssesmenGiziIrna() {
    document.getElementById('GambarTtdAssesmenGiziIrna').src=ttdAssesmenGiziIrna.getData();
    document.getElementById('HasilTtdAssesmenGiziIrna').value=ttdAssesmenGiziIrna.getData();
    $('#ModalTtdAssesmenGiziIrna').modal('hide');
  }
  function insertAdime() {
   var param = {
    id_kunjungan: id_kunjungan,
    id_transaksi: id_transaksi,
    tgl_masuk   :document.getElementById('tgl_input_adime').value, 
    assesmen    :document.getElementById('adimeassesmen').value,
    diagnosa    :document.getElementById('adimediagnosa').value, 
    intervensi  :document.getElementById('adimeintervensi').value, 
    monitoring  :document.getElementById('adimemonitoring').value, 
    evaluasi    :document.getElementById('adimeevaluasi').value,
    ttd         :document.getElementById('HasilTtdadime').value,
    id_pegawai  :user.id_pegawai,
  };

  apiPOST('Rekammedisirna/simpanadimeirna', param, hasil => {
    $('#ModalInputAdime').modal('hide');
  })
}
function viewtandavitalassgizi() {
  var param = {
    id_kunjungan: id_kunjungan,
  };

  apiPOST('Rekammedisirna/viewtandavital', param, hasil => {
    var x = hasil['data'];
    if (x != 0){
      document.getElementById('assesmenGizitensi1').value       = x.tekanan_darah1;
      document.getElementById('assesmenGizitensi2').value       = x.tekanan_darah2;
      document.getElementById('assesmenGiziberatbadan').value   = x.bb;
      document.getElementById('assesmenGizitinggibadan').value  = x.tinggi_badan;
      document.getElementById('assesmenGiziImt').value          = x.imt;
      if ((x.imt == '')||(x.imt == '0')){
        hitungimtassgizi();
      }
    }else{
      toastr.error("Tanda Vital tidak ditemukan\nCek Assesmen Medis!");
    }
  })
}

function loadAssesmenGizi(){
  var param = {
    norm            : no_rm,
    id_kunjungan    : id_kunjungan,
    id_transaksi    : id_transaksi,
  };

  document.getElementById("loading_assesmengizi").style.display = 'block';
  apiPOST('Assesmen_RS/loadAssesmenGizi', param, hasil => {
    if (hasil['dataAssMedis'] != 0){
      var AssesmenMedis = hasil['dataAssMedis'];
      document.getElementById("assesmenGizidiagnosa").value  = AssesmenMedis[0].keluhan_utama;
    }else{
      toastr.error("Diagnosa Klinis tidak diketahui, Cek Assesmen Medis Pasien!!");
    }

    if (hasil['dataAssGizi'] != 0){
      var AssesmenGizi  = hasil['dataAssGizi'];
      if (AssesmenGizi.length > 0){

        var id_kunjungan        = AssesmenGizi[0].id_kunjungan;
        var id_pegawai          = AssesmenGizi[0].id_pegawai;
        var tgl_assesmen        = AssesmenGizi[0].tgl_assesmen;
        var skrining_perawat    = AssesmenGizi[0].skrining_perawat;
        var skrining_ahli_gizi  = AssesmenGizi[0].skrining_ahli_gizi;
        var kondisi_khusus      = AssesmenGizi[0].kondisi_khusus;
        var alergi              = AssesmenGizi[0].alergi;
        var diet_awal           = AssesmenGizi[0].diet_awal;
        var tindak_lanjut       = AssesmenGizi[0].tindak_lanjut;
        var pantangan           = AssesmenGizi[0].pantangan;
        var pantangan_ket       = AssesmenGizi[0].pantangan_ket;
        var makanan_utama       = AssesmenGizi[0].makanan_utama;
        var makanan_selingan    = AssesmenGizi[0].makanan_selingan;
        var asupan_gizi         = AssesmenGizi[0].asupan_gizi;
        var riwayat_personal    = AssesmenGizi[0].riwayat_personal;
        var diagnosa_gizi       = AssesmenGizi[0].diagnosa_gizi;
        var konseling_gizi      = AssesmenGizi[0].konseling_gizi;
        var asupan_makanan      = AssesmenGizi[0].asupan_makanan;
        var kebutuhan_gizi      = AssesmenGizi[0].kebutuhan_gizi;
        var jenis_diet          = AssesmenGizi[0].jenis_diet;
        var cara_beri           = AssesmenGizi[0].cara_beri;
        var bentuk_makanan      = AssesmenGizi[0].bentuk_makanan;
        var evaluasi            = AssesmenGizi[0].evaluasi;
        var konsul_lanjut       = AssesmenGizi[0].konsul_lanjut;
        var konsul_materi       = AssesmenGizi[0].konsul_materi;
        var ttd_ahli_gizi       = AssesmenGizi[0].ttd_ahli_gizi;
        var tgl_update          = AssesmenGizi[0].tgl_update;
        var kondisi_khusus_ket  = AssesmenGizi[0].kondisi_khusus_ket;
        var ttd                 = AssesmenGizi[0].ttd;
        var aktif               = AssesmenGizi[0].aktif;
        var klinisfisik         = AssesmenGizi[0].klinisfisik.split(',');

        for(var i=0; i<klinisfisik.length; i++){
          $("#assesmenGiziklinisfisik"+klinisfisik[i]).prop("checked", true);
          if (klinisfisik[i] != 0){
            $("#assesmenGiziklinisfisik0").prop("checked", false);
          }
        }

        $("input[name='assesmenGiziskorskrining1'][value='"+AssesmenGizi[0].skrining_perawat+"']").prop('checked', true);
        $("input[name='assesmenGiziverivikasi1'][value='"+AssesmenGizi[0].skrining_ahli_gizi+"']").prop('checked', true);
        $("input[name='assesmenGizikondisiKhusus'][value='"+AssesmenGizi[0].kondisi_khusus+"']").prop('checked', true);

        if (kondisi_khusus == 2){
          document.getElementById('divdacriasesmengizi_div_bkondisikhususId').style.display='block';
          document.getElementById('assesmenGizikondisiKhususket').value = kondisi_khusus_ket;
        }else{
          document.getElementById('assesmenGizikondisiKhususket').value = "";
        }

        document.getElementById("assesmenGiziketAlergi").value  = AssesmenGizi[0].alergi;
        $("input[name='assesmenGizidietawal'][value='"+AssesmenGizi[0].diet_awal+"']").prop('checked', true);
        $("input[name='assesmenGizitindaklajut'][value='"+AssesmenGizi[0].tindak_lanjut+"']").prop('checked', true);

        $("input[name='assesmenGizipantangan'][value='"+AssesmenGizi[0].pantangan+"']").prop('checked', true);
        if (pantangan == 2){
          document.getElementById('assesmenGizipantangandiv').style.display='block';
          document.getElementById('assesmenGizipantanganket').value = pantangan_ket;
        }else{
          document.getElementById('assesmenGizipantanganket').value = "";
        }

        document.getElementById('assesmenGizimakanutama').value       = makanan_utama;
        document.getElementById('assesmenGizimakananselingan').value  = makanan_selingan;
        document.getElementById('assesmenGiziasupan').value           = asupan_gizi;
        document.getElementById('assesmenGiziriwayatpersonal').value  = riwayat_personal;

        document.getElementById('assesmenGizidiagnosamasalah').value  = diagnosa_gizi;
        document.getElementById('assesmenGizikonseling').value        = konseling_gizi;
        document.getElementById('assesmenGiziasupanmakanan').value    = asupan_makanan;
        document.getElementById('assesmenGiziperencanaankeb').value   = kebutuhan_gizi;
        document.getElementById('dacriasesmengizi_djenisdiet').value  = jenis_diet;

        $("input[name='dacriasesmengizi_dcarapemberian'][value='"+AssesmenGizi[0].cara_beri+"']").prop('checked', true);
        $("input[name='dacriasesmengizi_dbentuk'][value='"+AssesmenGizi[0].bentuk_makanan+"']").prop('checked', true);

        document.getElementById('dacriasesmengizi_devaluasi').value  = evaluasi;

        if ((konsul_lanjut == '')||(konsul_lanjut == 0)||(konsul_lanjut == null)){
          document.getElementById('tglkonselingassesmenGizi').value  = '';
          $("input[name='dacriasesmengizi_dkonselinglanjutan'][value='0']").prop('checked', true);
          document.getElementById('dacriasesmengizi_div_dkonselinglanjutan').style.display='none';
        }else{
          $("input[name='dacriasesmengizi_dkonselinglanjutan'][value='1']").prop('checked', true);
          if (konsul_lanjut == 1){
            toastr.warning("Tgl Konseling Gizi Lanjutan Belum diisi!!");
          }else{
            document.getElementById('tglkonselingassesmenGizi').value  = konsul_lanjut;
          }
          document.getElementById('dacriasesmengizi_div_dkonselinglanjutan').style.display='block';
        }

        if ((konsul_materi == '')||(konsul_materi == 0)||(konsul_materi == null)){
          document.getElementById('tglkonselingmateriassesmengizi').value  = '';
          $("input[name='dacriasesmengizi_dkonselingmateri'][value='0']").prop('checked', true);
          document.getElementById('dacriasesmengizi_div_dkonselingmateri').style.display='none';
        }else{
          $("input[name='dacriasesmengizi_dkonselingmateri'][value='1']").prop('checked', true);
          if (konsul_materi == 1){
            toastr.warning("Tgl Pemahaman Materi Konseling Lanjutan Belum diisi!!");
          }else{
            document.getElementById('tglkonselingmateriassesmengizi').value  = konsul_materi;
          }
          document.getElementById('dacriasesmengizi_div_dkonselingmateri').style.display='block';
        }

        var img = document.getElementById('GambarTtdAssesmenGiziIrna'); 
        img.src = ttd;

        document.getElementById('loading_assesmengizi').style.display = 'none';
        var id = "linkassesmengizi";
        selesai(id);
      }else{
        document.getElementById('loading_assesmengizi').style.display = 'none';
      }
    }else{
      toastr.error("Assesmen Gizi Masih Kosong!!");
      document.getElementById('loading_assesmengizi').style.display = 'none';
      var id = "linkassesmengizi";
      belumselesai(id);
    }
  })
}
/*
function simpanassgiziirna_GAGDIPAKE() {
  var ketkhusus=document.getElementById('dacriasesmengizi_bkondisikhususlain').value;
  param={
    id_kunjungan       :$('#idKunjunganermirna').val(),
    id_transaksi  : $('#transaksiermirna').val(),
    skrining_perawat   : document.querySelector('input[name=dacriasesmengizi_brisikoId3]:checked').value,
    skrining_ahli_gizi : document.querySelector('input[name=dacriasesmengizi_bverifikasiId3]:checked').value,
    kondisi_khusus     : document.querySelector('input[name=dacriasesmengizi_bkondisikhususId]:checked').value,
    alergi         : document.getElementById('alergimakananassgiziirna').value,
    ket_kondisi_khusus : ketkhusus,
    diet_awal          : document.querySelector('input[name=dacriasesmengizi_bdietId]:checked').value,
    tindak_lanjut      : document.querySelector('input[name=dacriasesmengizi_btndklanjutId]:checked').value,
    id_pegawai         :user.id_pegawai,
    id_transaksi     : document.getElementById('transaksiermirna').value,

  };
  apiPOST('Rekammedisirna/simpanassesmengiziirna', param, hasil => {

  })
}*/

function hitungimtassgizi() {
  let imt = 0;
  let num = 0;
  var a = document.getElementById('assesmenGizitinggibadan').value;
  var b = document.getElementById('assesmenGiziberatbadan').value;
  let imta = a;
  let imtb = b;
  num = Number(imta) / Number(100);
  imt = Number(imtb) / (Number(num) * Number(num));
  document.getElementById('assesmenGiziImt').value = parseFloat(imt).toFixed(3);
}

function simpanAssesmenGizi() {
  if ($('input[name=assesmenGizikondisiKhusus]:checked').val() == 2) {
    kondisikususket = $('#assesmenGizikondisiKhususket').val();
    kondisikusus = $('input[name=assesmenGizikondisiKhusus]:checked').val();
  } else {
    kondisikusus = $('input[name=assesmenGizikondisiKhusus]:checked').val();
    kondisikususket = document.getElementById('assesmenGizikondisiKhususket').value = "";
  }
  if ($('input[name=assesmenGizipantangan]:checked').val() == 2) {
    pantangan = $('#assesmenGizipantanganket').val();
  } else {
    pantangan = $('input[name=assesmenGizipantangan]:checked').val();
  }
  if ($('input[name=dacriasesmengizi_dkonselinglanjutan]:checked').val() == 1) {
    konsullanjut = $('#tglkonselingassesmenGizi').val();
  } else {
    konsullanjut = $('input[name=dacriasesmengizi_dkonselinglanjutan]:checked').val();
  }
  if ($('input[name=dacriasesmengizi_dkonselingmateri]:checked').val() == 1) {
    konsulmateri = $('#tglkonselingmateriassesmengizi').val();
  } else {
    konsulmateri = $('input[name=dacriasesmengizi_dkonselingmateri]:checked').val();
  }

  let assesmenGiziklinis_cekbox = document.querySelectorAll("input[name='assesmenGiziklinisfisik']:checked");
  let assesmenGiziklinis_values = [];
  assesmenGiziklinis_cekbox.forEach((assesmenGiziklinis_cekbox) => {
    assesmenGiziklinis_values.push(assesmenGiziklinis_cekbox.value);
  });

  var klinisfisik = JSON.stringify(assesmenGiziklinis_values);

  var param = {
    id_kunjungan      : $('#idKunjunganermirna').val(),
    id_pegawai        : user.id_pegawai,
    transaksi         : $('#transaksiermirna').val(),
    tglassesmengizi   : $('#assesmenGiziTgl').val(),
    // jenispasien: $('assesmenGizijenispasien').val(),
    // ahligizi: $('assesmenGiziahligizi').val(),
    // tensi1: $('assesmenGizitensi1').val(),
    // tensi2: $('assesmenGizitensi2').val(),
    // beratbdan: $('assesmenGiziberatbadan').val(),
    // tinggibadan: $('assesmenGizitinggibadan').val(),
    // imt: $('assesmenGiziImt').val(),
    // diagnosa: $('assesmenGizidiagnosa').val(),
    klinisfisik       : klinisfisik,
    skrining_perawat  : $('input[name=assesmenGiziskorskrining1]:checked').val(),
    skrining_ahli_gizi: $('input[name=assesmenGiziverivikasi1]:checked').val(),
    kondisi_khusus    : kondisikusus,
    kondisi_khusus_ket: kondisikususket,
    alergi            : $('#assesmenGiziketAlergi').val(),
    diet_awal         : $('input[name=assesmenGizidietawal]:checked').val(),
    tindak_lanjut     : $('input[name=assesmenGizitindaklajut]:checked').val(),
    pantangan         : pantangan,
    makananutama      : $('#assesmenGizimakanutama').val(),
    selingan          : $('#assesmenGizimakananselingan').val(),
    asupan            : $('#assesmenGiziasupan').val(),
    rwytpersonal      : $('#assesmenGiziriwayatpersonal').val(),
    diagmasalah       : $('#assesmenGizidiagnosamasalah').val(),
    konseling         : $('#assesmenGizikonseling').val(),
    asupanmakanan     : $('#assesmenGiziasupanmakanan').val(),
    kebutuhangizi     : $('#assesmenGiziperencanaankeb').val(),
    jenisdiet         : $('#dacriasesmengizi_djenisdiet').val(),
    caraberi          : $('input[name=dacriasesmengizi_dcarapemberian]:checked').val(),
    bentuk            : $('input[name=dacriasesmengizi_dbentuk]:checked').val(),
    evaluasi          : $('#dacriasesmengizi_devaluasi').val(),
    konsullanjut      : konsullanjut,
    konsulmateri      : konsulmateri,
    // tglttdass: $('tglttdAssesmenGizi').val(),
    ttdahligizi       : user.id_user,
    ttd               : $('#HasilTtdAssesmenGiziIrna').val()
  }
  //console.log(param);
  apiPOST('Assesmen_RS/simpanassesmengiziirna', param, hasil => {

  })
}

function printAssesmenGizi() {
  var param = {
    id_kunjungan: $('#idKunjunganermirna').val(),
    transaksi: $('#transaksiermirna').val(),
  }
  newTabPOST('API/Assesmen_RS/printassesmenGizi', param);
  return;

}

var ttdadime      = new WPaintX('paint_ttdadime');
function showModaladime() {
  showttdadime();
    //$('#ModalTtdPemberianinfus2').modal('show');
  document.getElementById('divttdadime2').style.display='block';
  document.getElementById('divttdadime1').style.display='none';
}
function showttdadime(){
  ttdadime.show();
}
function takeTtdadime() {
  document.getElementById('ImgTtdadime').src=ttdadime.getData();
  document.getElementById('HasilTtdadime').value=ttdadime.getData();
  document.getElementById('divttdadime1').style.display='block';
  document.getElementById('divttdadime2').style.display='none';

}
</script>