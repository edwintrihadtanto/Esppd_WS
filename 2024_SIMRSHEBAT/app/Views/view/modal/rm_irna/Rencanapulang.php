<?php
$data             = json_decode($_GET['data']);
$rm               = str_replace('"', '', json_encode($data->rm));
$unit             = str_replace('"', '', json_encode($data->unit));
$id_kunjungan     = str_replace('"', '', json_encode($data->id_kunjungan));
$id_transaksi     = str_replace('"', '', json_encode($data->id_transaksi));
?>
<!-- PASIEN PULANG -->
<div class="card-body p-2 darkgrey-custom" id="divassesmenpulang">
  <div id="div2assesmenpulang" class="rapet">
    <div class="card"><!-- TITLE -->
      <div class="col-md-12">
        <div class="row d-flex justify-content-center">
          <h4 style="text-align: center;"><b><label class="col-form-label">RENCANA PULANG PASIEN<br>Discharge Planning</label></b></h4>
        </div>
      </div>
    </div>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group row">
          <div class="col-md-3">
            <label class="col-form-label">ID</label>
          </div>
          <div class="col-md-4">
            <input id="vdacriplanning_id" name="id" type="text" class="form-control" readonly="readonly">
            <input type="hidden" name="Vid_kamar" id="Vid_kamar" class="form-control">
          </div>
          <div class="col-md-3"></div>
        </div>
        <div class="form-group row">
          <div class="col-md-3  text-truncate">
            <label class="col-form-label">Masuk RS (Tanggal)</label>
          </div>
          <div class="col-md-4">
            <div class="input-group date" id="vdacriplanning_datgl" data-target-input="nearest">
              <input id="vdacriplanning_atgl" name="atgl" type="date" class="form-control datetimepicker-input" data-target="#vdacriplanning_datgl" data-toggle="datetimepicker" readonly="readonly">
            </div>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-3  text-truncate">
            <label class="col-form-label">Alasan Masuk RS</label>
          </div>
          <div class="col-md-7">
            <textarea rows="2" name="vdacriplanning_aalasan" id="vdacriplanning_aalasan" style="width: 100%;" class="form-control"></textarea>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-3  text-truncate">
            <label class="col-form-label">Diagnosa Klinis</label>
          </div>
          <div class="col-md-7">
            <textarea rows="2" name="vdacriplanning_adiagnosa" id="vdacriplanning_adiagnosa" style="width: 100%;" class="form-control"></textarea>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row">
          <div class="col-md-3">
            <label class="col-form-label">Pihak Keluarga / Pasien</label>
          </div>
          <div class="col-md-6">
            <input id="vdacriplanning_apx" name="apx" type="text" class="form-control" maxlength="100">
          </div>
        </div>
        <!-- <div class="form-group row">
          <div class="col-md-3">
            <label class="col-form-label">PPJA / BPJA</label>
          </div>
          <div class="col-md-6">
            <select id="vdacriplanning_apjId" name="apjId" class="form-control" tabindex="-1" aria-hidden="true">
              <option value="1">UMUM</option>
            </select>
          </div>
          <div class="col-md-1">

          </div>
        </div> -->
        <input type='hidden' id="vdacriplanning_apjId" name="apjId" class="form-control" value=''>

        <div class="form-group row">
          <div class="col-md-3  text-truncate">
            <label class="col-form-label">Rencana Pulang (Tanggal)</label>
          </div>
          <div class="col-md-4">
            <div class="input-group date" id="vdacriplanning_datglpulang">
              <input id="vdacriplanning_atglpulang" name="atglpulang" type="date" class="form-control form-control" value="<?php echo date('Y-m-d'); ?>">
            </div>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-3  text-truncate">
            <label class="col-form-label">Pendamping Saat Pulang</label>
          </div>
          <div class="col-md-6">
            <input type="text" name="vdacriplanning_apendamping" id="vdacriplanning_apendamping" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-3  text-truncate">
            <label class="col-form-label">Hubungan dengan Pasien</label>
          </div>
          <div class="col-md-6">
            <input type="text" name="vdacriplanning_ahubungan" id="vdacriplanning_ahubungan" class="form-control">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="card"><!-- FORM PASCA INAP -->
  <div class="card-header" style="background-color:black;">
    <h3 class="card-title" style="color:white;">FORM PASCA INAP</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
    </div>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-6"> <!-- 1-6 -->
        <div class="form-group row"><!-- 1 -->
          <div class="col-md-12">
            <label class="col-form-label font-weight-bold">1. Pengaruh rawat inap terhadap </label>
          </div>
        </div>
        <div class="form-group row"><!-- A -->
          <div class="col-md-3"> &nbsp;&nbsp;&nbsp;&nbsp;Pasien dan keluarga pasien</div>
          <div class="col-md-0"> </div>
          <div class="col-md-8">
            <div class="row" id="divvdacriplanning_b1_1Id">
              <div class="col-md-5">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b1_1Id" value="1" type="radio" class="custom-control-input" id="vdacriplanning_b1_1Id_1" onclick="document.getElementById('vdacriplanning_div_b1_1Id2').style.display='none'" checked>
                    <label class="custom-control-label" for="vdacriplanning_b1_1Id_1">Tidak</label>
                  </div>
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b1_1Id" value="2" type="radio" class="custom-control-input" id="vdacriplanning_b1_1Id_2">
                    <label class="custom-control-label" for="vdacriplanning_b1_1Id_2" onclick="document.getElementById('vdacriplanning_div_b1_1Id2').style.display='block'">Ya</label>
                  </div>
                  <div class="row" id="vdacriplanning_div_b1_1Id2" style="display: none;">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                      <textarea rows="2" name="vdacriplanning_b1_1Idket" id="vdacriplanning_b1_1Idket" style="width: 100%;" class="form-control"></textarea>
                    </div>*
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row"><!-- B -->
          <div class="col-md-3"> &nbsp;&nbsp;&nbsp;&nbsp;Pekerjaan / sekolah</div>
          <div class="col-md-0"> </div>
          <div class="col-md-8">
            <div class="row" id="divvdacriplanning_b1_2Id">
              <div class="col-md-5">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b1_2Id" value="1" type="radio" class="custom-control-input" id="vdacriplanning_b1_2Id_1" onclick="document.getElementById('vdacriplanning_div_b1bId2').style.display='none'" checked>
                    <label class="custom-control-label" for="vdacriplanning_b1_2Id_1">Tidak</label>
                  </div>
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b1_2Id" value="2" type="radio" class="custom-control-input" id="vdacriplanning_b1_2Id_2" onclick="document.getElementById('vdacriplanning_div_b1bId2').style.display='block'">
                    <label class="custom-control-label" for="vdacriplanning_b1_2Id_2">Ya</label>
                  </div>
                  <div class="row" id="vdacriplanning_div_b1bId2" style="display: none;">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                      <textarea rows="2" name="vdacriplanning_b1_2Idket" id="vdacriplanning_b1_2Idket" style="width: 100%;" class="form-control"></textarea>
                    </div>*
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row"><!-- C -->
          <div class="col-md-3"> &nbsp;&nbsp;&nbsp;&nbsp;Keuangan</div>
          <div class="col-md-0"> </div>
          <div class="col-md-8">
            <div class="row" id="divvdacriplanning_b1cId">
              <div class="col-md-5">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b1cId" value="1" type="radio" class="custom-control-input" id="vdacriplanning_b1cId_1" onclick="document.getElementById('vdacriplanning_div_b1_3Id2').style.display='none'" checked>
                    <label class="custom-control-label" for="vdacriplanning_b1cId_1">Tidak</label>
                  </div>
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b1cId" value="2" type="radio" class="custom-control-input" id="vdacriplanning_b1cId_2" onclick="document.getElementById('vdacriplanning_div_b1_3Id2').style.display='block'">
                    <label class="custom-control-label" for="vdacriplanning_b1cId_2">Ya</label>
                  </div>
                  <div class="row" id="vdacriplanning_div_b1_3Id2" style="display: none;">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                      <textarea rows="2" name="vdacriplanning_b1cIdket" id="vdacriplanning_b1cIdket" style="width: 100%;" class="form-control"></textarea>
                    </div>*
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row"><!-- 2 -->
          <div class="col-md-12">
            <label class="col-form-label font-weight-bold">2. Antisipasi terhadap masalah saat pulang</label>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
          <div class="col-md-8">
            <div class="row" id="divvdacriplanning_b2Id">
              <div class="col-md-5">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b2Id" value="1" type="radio" class="custom-control-input" id="vdacriplanning_b2Id_1" onclick="document.getElementById('vdacriplanning_div_b2Id2').style.display='none'" checked>
                    <label class="custom-control-label" for="vdacriplanning_b2Id_1">Tidak</label>
                  </div>
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b2Id" value="2" type="radio" class="custom-control-input" id="vdacriplanning_b2Id_2" onclick="document.getElementById('vdacriplanning_div_b2Id2').style.display='block'">
                    <label class="custom-control-label" for="vdacriplanning_b2Id_2">Ya</label>
                  </div>
                  <div class="row" id="vdacriplanning_div_b2Id2" style="display: none;">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                      <textarea rows="2" name="vdacriplanning_b2Idket" id="vdacriplanning_b2Idket" style="width: 100%;" class="form-control"></textarea>
                    </div>*
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row"><!-- 3 -->
          <div class="col-md-12">
            <label class="col-form-label font-weight-bold">3. Bantuan diperlukan dalam hal</label>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
          <div class="col-md-10">
            <div class="row" id="divvdacriplanning_b3Id">
              <div class="col-md-4">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b3Id_1" value="2" type="checkbox" class="custom-control-input" id="vdacriplanning_b3Id_1">
                    <label class="custom-control-label" for="vdacriplanning_b3Id_1">Menyiapkan Makanan</label>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b3Id_2" value="2" type="checkbox" class="custom-control-input" id="vdacriplanning_b3Id_2">
                    <label class="custom-control-label" for="vdacriplanning_b3Id_2">Mandi</label>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b3Id_3" value="2" type="checkbox" class="custom-control-input" id="vdacriplanning_b3Id_3">
                    <label class="custom-control-label" for="vdacriplanning_b3Id_3">Makan</label>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b3Id_4" value="2" type="checkbox" class="custom-control-input" id="vdacriplanning_b3Id_4">
                    <label class="custom-control-label" for="vdacriplanning_b3Id_4">Berpakaian</label>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b3Id_5" value="2" type="checkbox" class="custom-control-input" id="vdacriplanning_b3Id_5">
                    <label class="custom-control-label" for="vdacriplanning_b3Id_5">Diet</label>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b3Id_6" value="2" type="checkbox" class="custom-control-input" id="vdacriplanning_b3Id_6">
                    <label class="custom-control-label" for="vdacriplanning_b3Id_6">Transportasi</label>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b3Id_7" value="2 Obat" type="checkbox" class="custom-control-input" id="vdacriplanning_b3Id_7" checked>
                    <label class="custom-control-label" for="vdacriplanning_b3Id_7">Menyiapkan Obat</label>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b3Id_8" value="2" type="checkbox" class="custom-control-input" id="vdacriplanning_b3Id_8">
                    <label class="custom-control-label" for="vdacriplanning_b3Id_8">Edukasi Kesehatan</label>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b3Id_9" value="2" type="checkbox" class="custom-control-input" id="vdacriplanning_b3Id_9">
                    <label class="custom-control-label" for="vdacriplanning_b3Id_9">Minum Obat</label>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b3Id_10" value="2" type="checkbox" class="custom-control-input" id="vdacriplanning_b3Id_10" onclick="document.getElementById('vdacriplanning_div_b3Id10').style.display='block'">
                    <label class="custom-control-label" for="vdacriplanning_b3Id_10">Lain-lain</label>
                  </div>
                  <div class="row" id="vdacriplanning_div_b3Id10" style="display: none;">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                      <textarea rows="2" name="vdacriplanning_b3Idket10" id="vdacriplanning_b3Idket10" style="width: 100%;" class="form-control"></textarea>
                    </div>*
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group row"><!-- 4 -->
          <div class="col-md-12">
            <label class="col-form-label font-weight-bold">4. Adakah yg membantu keperluan di atas</label>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
          <div class="col-md-8">
            <div class="row" id="divvdacriplanning_b4Id">
              <div class="col-md-5">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b4Id" value="1" type="radio" class="custom-control-input" id="vdacriplanning_b4Id_1" onclick="document.getElementById('vdacriplanning_div_b4Id2').style.display='none'" checked>
                    <label class="custom-control-label" for="vdacriplanning_b4Id_1">Tidak</label>
                  </div>
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b4Id" value="2" type="radio" class="custom-control-input" id="vdacriplanning_b4Id_2" onclick="document.getElementById('vdacriplanning_div_b4Id2').style.display='block'">
                    <label class="custom-control-label" for="vdacriplanning_b4Id_2">Ya</label>
                  </div>
                  <div class="row" id="vdacriplanning_div_b4Id2" style="display: none;">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                      <textarea rows="2" name="vdacriplanning_b4Idket" id="vdacriplanning_b4Idket" style="width: 100%;" class="form-control"></textarea>
                    </div>*
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row"><!-- 5 -->
          <div class="col-md-12">
            <label class="col-form-label font-weight-bold">5. Apakah pasien tinggal sendiri setelah keluar dari rumah sakit ?</label>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
          <div class="col-md-8">
            <div class="row" id="divvdacriplanning_b5Id">
              <div class="col-md-5">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b5Id" value="1" type="radio" class="custom-control-input" id="vdacriplanning_b5Id_1" onclick="document.getElementById('vdacriplanning_div_b5Id2').style.display='none'" checked>
                    <label class="custom-control-label" for="vdacriplanning_b5Id_1">Tidak</label>
                  </div>
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b5Id" value="2" type="radio" class="custom-control-input" id="vdacriplanning_b5Id_2" onclick="document.getElementById('vdacriplanning_div_b5Id2').style.display='block'">
                    <label class="custom-control-label" for="vdacriplanning_b5Id_2">Ya</label>
                  </div>
                  <div class="row" id="vdacriplanning_div_b5Id2" style="display: none;">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                      <textarea rows="2" name="vdacriplanning_b5Idket" id="vdacriplanning_b5Idket" style="width: 100%;" class="form-control"></textarea>
                    </div>*
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row"><!-- 6 -->
          <div class="col-md-12">
            <label class="col-form-label font-weight-bold">6. Apakah pasien menggunakan peralatan medis di rumah setelah keluar rumah sakit ?</label>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
          <div class="col-md-8">
            <div class="row" id="divvdacriplanning_b6Id">
              <div class="col-md-5">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b6Id" value="1" type="radio" class="custom-control-input" id="vdacriplanning_b6Id_1" onclick="document.getElementById('divvdacriplanning_div_b6Id2').style.display='none'" checked>
                    <label class="custom-control-label" for="vdacriplanning_b6Id_1">Tidak</label>
                  </div>
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b6Id" value="2" type="radio" class="custom-control-input" id="vdacriplanning_b6Id_2" onclick="document.getElementById('divvdacriplanning_div_b6Id2').style.display='block'">
                    <label class="custom-control-label" for="vdacriplanning_b6Id_2">Ya</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row" id="divvdacriplanning_div_b6Id2" style="display: none;">
          <div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
          <div class="col-md-10">
            <div class="row" id="vdacriplanning_b6ket">
              <div class="col-md-4">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b6ket_1" value="2" type="checkbox" class="custom-control-input" id="vdacriplanning_b6ket_1">
                    <label class="custom-control-label" for="vdacriplanning_b6ket_1">Cateter</label>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b6ket_2" value="2" type="checkbox" class="custom-control-input" id="vdacriplanning_b6ket_2">
                    <label class="custom-control-label" for="vdacriplanning_b6ket_2">NGT</label>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b6ket_3" value="2" type="checkbox" class="custom-control-input" id="vdacriplanning_b6ket_3">
                    <label class="custom-control-label" for="vdacriplanning_b6ket_3">Double Lumen</label>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b6ket_4" value="2" type="checkbox" class="custom-control-input" id="vdacriplanning_b6ket_4">
                    <label class="custom-control-label" for="vdacriplanning_b6ket_4">Oksigen</label>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b6ket_5" value="2" type="checkbox" class="custom-control-input" id="vdacriplanning_b6ket_5" onclick="document.getElementById('vdacriplanning_div_b6ket5').style.display='block'">
                    <label class="custom-control-label" for="vdacriplanning_b6ket_5">Lain-lain</label>
                  </div>
                  <div class="row" id="vdacriplanning_div_b6ket5" style="display: none;">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                      <textarea rows="2" name="vdacriplanning_b6ketket5" id="vdacriplanning_b6ketket5" style="width: 100%;" class="form-control"></textarea>
                    </div>*
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6"><!-- 7-12 -->
        <div class="form-group row"><!-- 7 -->
          <div class="col-md-12">
            <label class="col-form-label font-weight-bold">7. Apakah pasien memerlukan alat bantu setelah keluar dari rumah sakit ?</label>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
          <div class="col-md-8">
            <div class="row" id="divvdacriplanning_b7Id">
              <div class="col-md-5">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b7Id" value="1" type="radio" class="custom-control-input" id="vdacriplanning_b7Id_1" onclick="document.getElementById('divvdacriplanning_div_b7Id2').style.display='none'" checked>
                    <label class="custom-control-label" for="vdacriplanning_b7Id_1">Tidak</label>
                  </div>
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b7Id" value="2" type="radio" class="custom-control-input" id="vdacriplanning_b7Id_2" onclick="document.getElementById('divvdacriplanning_div_b7Id2').style.display='block'">
                    <label class="custom-control-label" for="vdacriplanning_b7Id_2">Ya</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row" id="divvdacriplanning_div_b7Id2" style="display: none;">
          <div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
          <div class="col-md-10">
            <div class="row" id="vdacriplanning_b7ket">
              <div class="col-md-4">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b7ket_1" value="2" type="checkbox" class="custom-control-input" id="vdacriplanning_b7ket_1">
                    <label class="custom-control-label" for="vdacriplanning_b7ket_1">Tongkat</label>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b7ket_2" value="2" type="checkbox" class="custom-control-input" id="vdacriplanning_b7ket_2">
                    <label class="custom-control-label" for="vdacriplanning_b7ket_2">Kursi Roda</label>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b7ket_3" value="2" type="checkbox" class="custom-control-input" id="vdacriplanning_b7ket_3">
                    <label class="custom-control-label" for="vdacriplanning_b7ket_3">Walker</label>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b7ket_4" value="2" type="checkbox" class="custom-control-input" id="vdacriplanning_b7ket_4" onclick="document.getElementById('vdacriplanning_div_b7ket4').style.display='block'">
                    <label class="custom-control-label" for="vdacriplanning_b7ket_4">Lain-lain</label>
                  </div>
                  <div class="row" id="vdacriplanning_div_b7ket4" style="display: none;">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                      <textarea rows="2" name="vdacriplanning_b7ketket4" id="vdacriplanning_b7ketket4" style="width: 100%;" class="form-control"></textarea>
                    </div>*
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row"><!-- 8 -->
          <div class="col-md-12">
            <label class="col-form-label font-weight-bold">8. Jelaskan Apakah memerlukan bantuan / perawatan khusus di rumah setelah keluar dari rumah sakit ?</label>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
          <div class="col-md-8">
            <div class="row" id="divvdacriplanning_b8Id">
              <div class="col-md-5">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b8Id" value="1" type="radio" class="custom-control-input" id="vdacriplanning_b8Id_1" onclick="document.getElementById('divvdacriplanning_div_b8Id2').style.display='none'" checked>
                    <label class="custom-control-label" for="vdacriplanning_b8Id_1">Tidak</label>
                  </div>
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b8Id" value="2" type="radio" class="custom-control-input" id="vdacriplanning_b8Id_2" onclick="document.getElementById('divvdacriplanning_div_b8Id2').style.display='block'">
                    <label class="custom-control-label" for="vdacriplanning_b8Id_2">Ya</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row" id="divvdacriplanning_div_b8Id2" style="display: none;">
          <div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
          <div class="col-md-10">
            <div class="row" id="divvdacriplanning_b8ket">
              <div class="col-md-4">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b8ket_1" value="2" type="checkbox" class="custom-control-input" id="vdacriplanning_b8ket_1">
                    <label class="custom-control-label" for="vdacriplanning_b8ket_1">Home Care</label>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b8ket_2" value="2" type="checkbox" class="custom-control-input" id="vdacriplanning_b8ket_2">
                    <label class="custom-control-label" for="vdacriplanning_b8ket_2">Home Visit</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row"><!-- 9 -->
          <div class="col-md-12">
            <label class="col-form-label font-weight-bold">9. Apakah pasien bermasalah dalam memenuhi kebutuhan pribadinya setelah keluar dari rumah sakit ?</label>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
          <div class="col-md-8">
            <div class="row" id="divvdacriplanning_b9Id">
              <div class="col-md-5">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b9Id" value="1" type="radio" class="custom-control-input" id="vdacriplanning_b9Id_1" onclick="document.getElementById('divvdacriplanning_div_b9Id2').style.display='none'" checked>
                    <label class="custom-control-label" for="vdacriplanning_b9Id_1">Tidak</label>
                  </div>
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b9Id" value="2" type="radio" class="custom-control-input" id="vdacriplanning_b9Id_2" onclick="document.getElementById('divvdacriplanning_div_b9Id2').style.display='block'">
                    <label class="custom-control-label" for="vdacriplanning_b9Id_2">Ya</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row" id="divvdacriplanning_div_b9Id2" style="display: none;">
          <div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
          <div class="col-md-10">
            <div class="row" id="vdacriplanning_b9ket">
              <div class="col-md-4">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b9ket_1" value="2" type="checkbox" class="custom-control-input" id="vdacriplanning_b9ket_1">
                    <label class="custom-control-label" for="vdacriplanning_b9ket_1">Makan</label>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b9ket_2" value="2" type="checkbox" class="custom-control-input" id="vdacriplanning_b9ket_2">
                    <label class="custom-control-label" for="vdacriplanning_b9ket_2">Minum</label>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b9ket_3" value="2" type="checkbox" class="custom-control-input" id="vdacriplanning_b9ket_3">
                    <label class="custom-control-label" for="vdacriplanning_b9ket_3">BAB / BAK</label>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b9ket_4" value="2" type="checkbox" class="custom-control-input" id="vdacriplanning_b9ket_4" onclick="document.getElementById('vdacriplanning_div_b9ket4').style.display='block'">
                    <label class="custom-control-label" for="vdacriplanning_b9ket_4">Lain-lain</label>
                  </div>
                  <div class="row" id="vdacriplanning_div_b9ket4" style="display: none;">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                      <textarea rows="2" name="vdacriplanning_b9ketket4" id="vdacriplanning_b9ketket4" style="width: 100%;" class="form-control"></textarea>
                    </div>*
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row"><!-- 10 -->
          <div class="col-md-12">
            <label class="col-form-label font-weight-bold">10. Apakah pasien memiliki nyeri kronis dan kelelahan setelah keluar dari rumah sakit ?</label>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
          <div class="col-md-8">
            <div class="row" id="vdacriplanning_b10Id">
              <div class="col-md-5">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b10Id" value="1" type="radio" class="custom-control-input" id="vdacriplanning_b10Id_1" onclick="document.getElementById('divvdacriplanning_div_b10Id2').style.display='none'" checked>
                    <label class="custom-control-label" for="vdacriplanning_b10Id_1">Tidak</label>
                  </div>
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b10Id" value="2" type="radio" class="custom-control-input" id="vdacriplanning_b10Id_2" onclick="document.getElementById('divvdacriplanning_div_b10Id2').style.display='block'">
                    <label class="custom-control-label" for="vdacriplanning_b10Id_2">Ya</label>
                  </div>
                  <div class="row" id="divvdacriplanning_div_b10Id2" style="display: none;">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                      <textarea rows="2" name="vdacriplanning_b10Idket" id="vdacriplanning_b10Idket" style="width: 100%;" class="form-control"></textarea>
                    </div>*
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row"><!-- 11 -->
          <div class="col-md-12">
            <label class="col-form-label font-weight-bold">11. Apakah pasien dan keluarga memerlukan edukasi kesehatan setelah keluar dari rumah sakit ?</label>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
          <div class="col-md-8">
            <div class="row" id="divvdacriplanning_b11Id">
              <div class="col-md-5">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b11Id" value="1" type="radio" class="custom-control-input" id="vdacriplanning_b11Id_1" onclick="document.getElementById('divvdacriplanning_div_b11Id2').style.display='none'" checked>
                    <label class="custom-control-label" for="vdacriplanning_b11Id_1">Tidak</label>
                  </div>
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b11Id" value="2" type="radio" class="custom-control-input" id="vdacriplanning_b11Id_2" onclick="document.getElementById('divvdacriplanning_div_b11Id2').style.display='block'">
                    <label class="custom-control-label" for="vdacriplanning_b11Id_2">Ya</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row" id="divvdacriplanning_div_b11Id2" style="display: none;">
          <div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
          <div class="col-md-10">
            <div class="row" id="divvdacriplanning_b11ket">
              <div class="col-md-4">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b11ket_1" value="2" type="checkbox" class="custom-control-input" id="vdacriplanning_b11ket_1">
                    <label class="custom-control-label" for="vdacriplanning_b11ket_1">Obat - Obatan</label>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b11ket_2" value="2" type="checkbox" class="custom-control-input" id="vdacriplanning_b11ket_2">
                    <label class="custom-control-label" for="vdacriplanning_b11ket_2">Efek Samping Obat</label>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b11ket_3" value="2" type="checkbox" class="custom-control-input" id="vdacriplanning_b11ket_3">
                    <label class="custom-control-label" for="vdacriplanning_b11ket_3">Nyeri</label>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b11ket_4" value="2" type="checkbox" class="custom-control-input" id="vdacriplanning_b11ket_4">
                    <label class="custom-control-label" for="vdacriplanning_b11ket_4">DIIT</label>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b11ket_5" value="2" type="checkbox" class="custom-control-input" id="vdacriplanning_b11ket_5">
                    <label class="custom-control-label" for="vdacriplanning_b11ket_5">Mencari Pertolongan</label>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b11ket_6" value="2" type="checkbox" class="custom-control-input" id="vdacriplanning_b11ket_6">
                    <label class="custom-control-label" for="vdacriplanning_b11ket_6">Follow Up</label>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b11ket_7" value="2" type="checkbox" class="custom-control-input" id="vdacriplanning_b11ket_7" onclick="document.getElementById('vdacriplanning_div_b11ket7').style.display='block'">
                    <label class="custom-control-label" for="vdacriplanning_b11ket_7">Lain-lain</label>
                  </div>
                  <div class="row" id="vdacriplanning_div_b11ket7" style="display: none;">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                      <textarea rows="2" name="vdacriplanning_b11ketket7" id="vdacriplanning_b11ketket7" style="width: 100%;" class="form-control"></textarea>
                    </div>*
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row"><!-- 12 -->
          <div class="col-md-12">
            <label class="col-form-label font-weight-bold">12. Apakah pasien dan keluarga memerlukan keterampilan khusus setelah keluar dari rumah sakit ?</label>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
          <div class="col-md-8">
            <div class="row" id="divvdacriplanning_b12Id">
              <div class="col-md-5">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b12Id" value="1" type="radio" class="custom-control-input" id="vdacriplanning_b12Id_1" onclick="document.getElementById('divvdacriplanning_div_b12Id2').style.display='none'" checked>
                    <label class="custom-control-label" for="vdacriplanning_b12Id_1">Tidak</label>
                  </div>
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b12Id" value="2" type="radio" class="custom-control-input" id="vdacriplanning_b12Id_2" onclick="document.getElementById('divvdacriplanning_div_b12Id2').style.display='block'">
                    <label class="custom-control-label" for="vdacriplanning_b12Id_2">Ya</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row" id="divvdacriplanning_div_b12Id2" style="display: none;">
          <div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
          <div class="col-md-10">
            <div class="row" id="divvdacriplanning_b12ket">
              <div class="col-md-4">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b12ket_1" value="2" type="checkbox" class="custom-control-input" id="vdacriplanning_b12ket_1">
                    <label class="custom-control-label" for="vdacriplanning_b12ket_1">Perawatan Luka</label>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b12ket_2" value="2" type="checkbox" class="custom-control-input" id="vdacriplanning_b12ket_2">
                    <label class="custom-control-label" for="vdacriplanning_b12ket_2">Injeksi</label>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b12ket_3" value="2" type="checkbox" class="custom-control-input" id="vdacriplanning_b12ket_3">
                    <label class="custom-control-label" for="vdacriplanning_b12ket_3">Perawatan Bayi</label>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_b12ket_4" value="2" type="checkbox" class="custom-control-input" id="vdacriplanning_b12ket_4" onclick="document.getElementById('vdacriplanning_div_b12ket4').style.display='block'">
                    <label class="custom-control-label" for="vdacriplanning_b12ket_4">Lain-lain</label>
                  </div>
                  <div class="row" id="vdacriplanning_div_b12ket4" style="display: none;">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                      <textarea rows="2" name="vdacriplanning_b12ketket4" id="vdacriplanning_b12ketket4" style="width: 100%;" class="form-control"></textarea>
                    </div>*
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

<!-- 
	RUJUKAN KONTROL 
-->
<div class="card">
  <div class="card-header" style="background-color:black;">
    <h3 class="card-title" style="color:white;">RUJUKAN KONTROL</h3>
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
          <div class="col-md-3  text-truncate">
            <label class="col-form-label">Tanggal Kontrol</label>
          </div>
          <div class="col-md-4">
            <div class="input-group date" id="vdacriplanning_dctglkontrol" data-target-input="nearest">
              <input id="vdacriplanning_ctglkontrol" name="ctglkontrol" type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>">
            </div>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-3  text-truncate">
            <label class="col-form-label">Tempat (Poliklinik)</label>
          </div>
          <div class="col-md-4">
            <select name="cpoli" id="vdacriplanning_cpoli" class="form-control" onclick="dpjpdisplan()">
              <option value="0">-- pilih --</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-3  text-truncate">
            <label class="col-form-label">Dokter</label>
          </div>
          <div class="col-md-6">
            <select id="vdacriplanning_cdokter1Id" name="cdokter1Id" class="form-control"  >
              <option value="0">-- pilih --</option>
            </select>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row">
          <div class="col-md-12 text-truncate">
            <label class="col-form-label">Dokumen &amp; Hasil pemeriksaan yang disertakan</label>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
          <div class="col-md-8">
            <div class="row" id="divvdacriplanning_cdokumenId">
              <div class="col-md-12">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_cdokumenId_1" value="2" type="checkbox" class="custom-control-input" id="vdacriplanning_cdokumenId_1">
                    <label class="custom-control-label" for="vdacriplanning_cdokumenId_1">Laboratorium</label>
                  </div>

                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_cdokumenId_2" value="2" type="checkbox" class="custom-control-input" id="vdacriplanning_cdokumenId_2">
                    <label class="custom-control-label" for="vdacriplanning_cdokumenId_2">Radiologi</label>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <div class="row custom-control custom-checkbox custom-control-inline">
                    <input name="vdacriplanning_cdokumenId_3" value="2" type="checkbox" class="custom-control-input" id="vdacriplanning_cdokumenId_3" onclick="document.getElementById('vdacriplanning_div_cdokumenId3').style.display='block'">
                    <label class="custom-control-label" for="vdacriplanning_cdokumenId_3">Lain-lain</label>
                  </div>
                  <div class="row" id="vdacriplanning_div_cdokumenId3" style="display: none;">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                      <textarea rows="2" name="vdacriplanning_cdokumenIdket3" id="vdacriplanning_cdokumenIdket3" style="width: 100%;" class="form-control"></textarea>
                    </div>*
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
<div class="card"><!-- SAKSI -->
  <div class="card-body">
    <div class="form group row">
      <div class="col-md-6">
        <div class="form group row">
          <div class="col-md-3">
            <label>Tanggal </label>
          </div>
          <div class="col-md-6">
            <div class="input-group date" id="vdacriplanning_tglcatat1" data-target-input="nearest">
              <input id="vdacriplanning_tglcatat" name="tglcatat" type="date" class="form-control" data-target="#vdacriplanning_tglcatat1" readonly="readonly" value="<?php echo date('Y-m-d'); ?>">
            </div>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-3">
            <label>Catatan</label>
          </div>
          <div class="col-md-6">
            <textarea rows="5" name="vdacriplanning_catat" id="vdacriplanning_catat" class="form-control"></textarea>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-3">
            <label>Nama TTD PPA</label>
          </div>
          <div class="col-md-6">
            <input type="text" class="form-control" id="vdacriplanning_zpjttd3" readonly="readonly">
          </div>
        </div>
        <div class="table-responsive" style="text-align: center;border: solid;">
          <center>
            <h4>Tanda Tangan Perawat</h4>
          </center>
          <img id="ImgTtdRencanaPulang" style="width:250px;height: 250px;">
          <input type="hidden" name="HasilTtdDpjpRencanaPulang" id="HasilTtdDpjpRencanaPulang">
          <center><button class="btn btn-warning" onclick="ShowModalTtdDpjpRencanaPulang()">Tanda Tangan </button> </center>
        </div>

        <!-- <div class="card" align="center">
          <div class="row">
            <div class="col-md-12" id="paint_ttdrencanapulang">

            </div>
          </div>
        </div> -->

        <!-- ttdresume -->
        <div class="modal fade" id="ModalTtdRencanaPulang" role="dialog">
          <div class="modal-dialog" style="width: 408px;">
            <div class="modal-content">
              <div class="modal-header"></div>
              <div class="modal-body">
                <div id="paint_ttdRencanaPulang"></div>
              </div>
              <div class="modal-footer">
                <button onclick="takeTtdDpjpRencanaPulang()">Simpan Tanda Tangan</button>
                <button onclick="$('#ModalTtdRencanaPulang').modal('hide')">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <button onclick="save_discharge_planning()" class="btn btn-primary p2">Simpan</button>
    <button onclick="printrencanapulang()" class="btn btn-primary p2">Cetak</button>

  </div>
</div>



<script type="text/javascript">
  // $(document).ready(function() {
  var ttdRencanaPulang = new WPaintX('paint_ttdRencanaPulang');

  var no_rm = "<?php echo $rm; ?>";
  var id_unit = "<?php echo $unit; ?>";
  var id_kunjungan = "<?php echo $id_kunjungan; ?>";
  var id_transaksi = "<?php echo $id_transaksi; ?>";
  //document.getElementById().value=user.full_names;
  //pegawaiDischarge();
  document.getElementById('loading_DaftarPemberianInfus').style.display = 'block';
  // loadrencanapulang();
  // datatranskasi();
  viewhistrencplgpas();
  unitkonsulermirja();
  polidisplan();

  function dpjpdisplan(){
    var param={
      id:document.getElementById('vdacriplanning_cpoli').value};
      apiPOST('user/dokterbyunit', param,hasil=>{
        var a=hasil['data'];
        var pegawai='';
        for (var i = 0; i < a.length; i++) {
          pegawai+='<option value="'+a[i]['kd_dokter']+'">'+a[i]['full_name']+'</option>';
        }
        document.getElementById('vdacriplanning_cdokter1Id').innerHTML=pegawai;
      });
    }

    function polidisplan() {
      apiPOST('Rekammedisirna/unit', null, hasil => {
        var a = hasil['data'];
        var unit = '';
        for (var i = 0; i < a.length; i++) {
          unit += '<option value="' + a[i]['kd_unit'] + '">' + a[i]['nama_unit'] + '</option>';
        }
        document.getElementById('vdacriplanning_cpoli').innerHTML = unit;
      });
    }

    function ShowModalTtdDpjpRencanaPulang() {
      showttdRencanaPulang();
      $('#ModalTtdRencanaPulang').modal('show');
    }

    function showttdRencanaPulang() {
      ttdRencanaPulang.show();
    }

    function takeTtdDpjpRencanaPulang() {
      document.getElementById('ImgTtdRencanaPulang').src = ttdRencanaPulang.getData();
      document.getElementById('HasilTtdDpjpRencanaPulang').value = ttdRencanaPulang.getData();
      $('#ModalTtdRencanaPulang').modal('hide');

    }


    function save_discharge_planning() {
      document.getElementById('loading_RencanaPemulanganPasien').style.display = 'block';

      if ($('#vdacriplanning_b3Id_1').is(':checked')) {
        var vdacriplanning_b3Id_1 = document.querySelector('input[name=vdacriplanning_b3Id_1]:checked').value;
      } else {
        var vdacriplanning_b3Id_1 = '1';
      }

      if ($('#vdacriplanning_b3Id_2').is(':checked')) {
        var vdacriplanning_b3Id_2 = document.querySelector('input[name=vdacriplanning_b3Id_2]:checked').value;
      } else {
        var vdacriplanning_b3Id_2 = '1';
      }

      if ($('#vdacriplanning_b3Id_3').is(':checked')) {
        var vdacriplanning_b3Id_3 = document.querySelector('input[name=vdacriplanning_b3Id_3]:checked').value;
      } else {
        var vdacriplanning_b3Id_3 = '1';
      }
    // alert(vdacriplanning_b3Id_3);

      if ($('#vdacriplanning_b3Id_4').is(':checked')) {
        var vdacriplanning_b3Id_4 = document.querySelector('input[name=vdacriplanning_b3Id_4]:checked').value;
      } else {
        var vdacriplanning_b3Id_4 = '1';
      }

      if ($('#vdacriplanning_b3Id_5').is(':checked')) {
        var vdacriplanning_b3Id_5 = document.querySelector('input[name=vdacriplanning_b3Id_5]:checked').value;
      } else {
        var vdacriplanning_b3Id_5 = '1';
      }

      if ($('#vdacriplanning_b3Id_6').is(':checked')) {
        var vdacriplanning_b3Id_6 = document.querySelector('input[name=vdacriplanning_b3Id_6]:checked').value;
      } else {
        var vdacriplanning_b3Id_6 = '1';
      }

      if ($('#vdacriplanning_b3Id_7').is(':checked')) {
        var vdacriplanning_b3Id_7 = document.querySelector('input[name=vdacriplanning_b3Id_7]:checked').value;
      } else {
        var vdacriplanning_b3Id_7 = '1';
      }

      if ($('#vdacriplanning_b3Id_8').is(':checked')) {
        var vdacriplanning_b3Id_8 = document.querySelector('input[name=vdacriplanning_b3Id_8]:checked').value;
      } else {
        var vdacriplanning_b3Id_8 = '1';
      }

      if ($('#vdacriplanning_b3Id_9').is(':checked')) {
        var vdacriplanning_b3Id_9 = document.querySelector('input[name=vdacriplanning_b3Id_9]:checked').value;
      } else {
        var vdacriplanning_b3Id_9 = '1';
      }

      if ($('#vdacriplanning_b3Id_10').is(':checked')) {
        var vdacriplanning_b3Id_10 = document.querySelector('input[name=vdacriplanning_b3Id_10]:checked').value;
      } else {
        var vdacriplanning_b3Id_10 = '1';
      }

      if ($('#vdacriplanning_b6ket_1').is(':checked')) {
        var vdacriplanning_b6ket_1 = document.querySelector('input[name=vdacriplanning_b6ket_1]:checked').value;
      } else {
        var vdacriplanning_b6ket_1 = '1';
      }

      if ($('#vdacriplanning_b6ket_2').is(':checked')) {
        var vdacriplanning_b6ket_2 = document.querySelector('input[name=vdacriplanning_b6ket_2]:checked').value;
      } else {
        var vdacriplanning_b6ket_2 = '1';
      }

      if ($('#vdacriplanning_b6ket_3').is(':checked')) {
        var vdacriplanning_b6ket_3 = document.querySelector('input[name=vdacriplanning_b6ket_3]:checked').value;
      } else {
        var vdacriplanning_b6ket_3 = '1';
      }

      if ($('#vdacriplanning_b6ket_4').is(':checked')) {
        var vdacriplanning_b6ket_4 = document.querySelector('input[name=vdacriplanning_b6ket_4]:checked').value;
      } else {
        var vdacriplanning_b6ket_4 = '1';
      }


      if ($('#vdacriplanning_b6ket_5').is(':checked')) {
        var vdacriplanning_b6ket_5 = document.querySelector('input[name=vdacriplanning_b6ket_5]:checked').value;
      } else {
        var vdacriplanning_b6ket_5 = '1';
      }


      if ($('#vdacriplanning_b7ket_1').is(':checked')) {
        var vdacriplanning_b7ket_1 = document.querySelector('input[name=vdacriplanning_b7ket_1]:checked').value;
      } else {
        var vdacriplanning_b7ket_1 = '1';
      }

      if ($('#vdacriplanning_b7ket_2').is(':checked')) {
        var vdacriplanning_b7ket_2 = document.querySelector('input[name=vdacriplanning_b7ket_2]:checked').value;
      } else {
        var vdacriplanning_b7ket_2 = '1';
      }

      if ($('#vdacriplanning_b7ket_3').is(':checked')) {
        var vdacriplanning_b7ket_3 = document.querySelector('input[name=vdacriplanning_b7ket_3]:checked').value;
      } else {
        var vdacriplanning_b7ket_3 = '1';
      }

      if ($('#vdacriplanning_b7ket_4').is(':checked')) {
        var vdacriplanning_b7ket_4 = document.querySelector('input[name=vdacriplanning_b7ket_4]:checked').value;
      } else {
        var vdacriplanning_b7ket_4 = '1';
      }

      if ($('#vdacriplanning_b8ket_1').is(':checked')) {
        var vdacriplanning_b8ket_1 = document.querySelector('input[name=vdacriplanning_b8ket_1]:checked').value;
      } else {
        var vdacriplanning_b8ket_1 = '1';
      }

      if ($('#vdacriplanning_b8ket_2').is(':checked')) {
        var vdacriplanning_b8ket_2 = document.querySelector('input[name=vdacriplanning_b8ket_2]:checked').value;
      } else {
        var vdacriplanning_b8ket_2 = '1';
      }

      if ($('#vdacriplanning_b9ket_1').is(':checked')) {
        var vdacriplanning_b9ket_1 = document.querySelector('input[name=vdacriplanning_b9ket_1]:checked').value;
      } else {
        var vdacriplanning_b9ket_1 = '1';
      }

      if ($('#vdacriplanning_b9ket_2').is(':checked')) {
        var vdacriplanning_b9ket_2 = document.querySelector('input[name=vdacriplanning_b9ket_2]:checked').value;
      } else {
        var vdacriplanning_b9ket_2 = '1';
      }

      if ($('#vdacriplanning_b9ket_3').is(':checked')) {
        var vdacriplanning_b9ket_3 = document.querySelector('input[name=vdacriplanning_b9ket_3]:checked').value;
      } else {
        var vdacriplanning_b9ket_3 = '1';
      }

      if ($('#vdacriplanning_b9ket_4').is(':checked')) {
        var vdacriplanning_b9ket_4 = document.querySelector('input[name=vdacriplanning_b9ket_4]:checked').value;
      } else {
        var vdacriplanning_b9ket_4 = '1';
      }

      if ($('#vdacriplanning_b11ket_1').is(':checked')) {
        var vdacriplanning_b11ket_1 = document.querySelector('input[name=vdacriplanning_b11ket_1]:checked').value;
      } else {
        var vdacriplanning_b11ket_1 = '1';
      }

      if ($('#vdacriplanning_b11ket_2').is(':checked')) {
        var vdacriplanning_b11ket_2 = document.querySelector('input[name=vdacriplanning_b11ket_2]:checked').value;
      } else {
        var vdacriplanning_b11ket_2 = '1';
      }

      if ($('#vdacriplanning_b11ket_3').is(':checked')) {
        var vdacriplanning_b11ket_3 = document.querySelector('input[name=vdacriplanning_b11ket_3]:checked').value;
      } else {
        var vdacriplanning_b11ket_3 = '1';
      }

      if ($('#vdacriplanning_b11ket_4').is(':checked')) {
        var vdacriplanning_b11ket_4 = document.querySelector('input[name=vdacriplanning_b11ket_4]:checked').value;
      } else {
        var vdacriplanning_b11ket_4 = '1';
      }

      if ($('#vdacriplanning_b11ket_5').is(':checked')) {
        var vdacriplanning_b11ket_5 = document.querySelector('input[name=vdacriplanning_b11ket_5]:checked').value;
      } else {
        var vdacriplanning_b11ket_5 = '1';
      }

      if ($('#vdacriplanning_b11ket_6').is(':checked')) {
        var vdacriplanning_b11ket_6 = document.querySelector('input[name=vdacriplanning_b11ket_6]:checked').value;
      } else {
        var vdacriplanning_b11ket_6 = '1';
      }

      if ($('#vdacriplanning_b11ket_7').is(':checked')) {
        var vdacriplanning_b11ket_7 = document.querySelector('input[name=vdacriplanning_b11ket_7]:checked').value;
      } else {
        var vdacriplanning_b11ket_7 = '1';
      }

      if ($('#vdacriplanning_b12ket_1').is(':checked')) {
        var vdacriplanning_b12ket_1 = document.querySelector('input[name=vdacriplanning_b12ket_1]:checked').value;
      } else {
        var vdacriplanning_b12ket_1 = '1';
      }

      if ($('#vdacriplanning_b12ket_2').is(':checked')) {
        var vdacriplanning_b12ket_2 = document.querySelector('input[name=vdacriplanning_b12ket_2]:checked').value;
      } else {
        var vdacriplanning_b12ket_2 = '1';
      }

      if ($('#vdacriplanning_b12ket_3').is(':checked')) {
        var vdacriplanning_b12ket_3 = document.querySelector('input[name=vdacriplanning_b12ket_3]:checked').value;
      } else {
        var vdacriplanning_b12ket_3 = '1';
      }

      if ($('#vdacriplanning_b12ket_4').is(':checked')) {
        var vdacriplanning_b12ket_4 = document.querySelector('input[name=vdacriplanning_b12ket_4]:checked').value;
      } else {
        var vdacriplanning_b12ket_4 = '1';
      }

      if ($('#vdacriplanning_cdokumenId_1').is(':checked')) {
        var vdacriplanning_cdokumenId_1 = document.querySelector('input[name=vdacriplanning_cdokumenId_1]:checked').value;
      } else {
        var vdacriplanning_cdokumenId_1 = '1';
      }

      if ($('#vdacriplanning_cdokumenId_2').is(':checked')) {
        var vdacriplanning_cdokumenId_2 = document.querySelector('input[name=vdacriplanning_cdokumenId_2]:checked').value;
      } else {
        var vdacriplanning_cdokumenId_2 = '1';
      }

      if ($('#vdacriplanning_cdokumenId_3').is(':checked')) {
        var vdacriplanning_cdokumenId_3 = document.querySelector('input[name=vdacriplanning_cdokumenId_3]:checked').value;
      } else {
        var vdacriplanning_cdokumenId_3 = '1';
      }



      var bant = $('#vdacriplanning_b3Idket10').val();
      var param = {
        Vid_kamar: $('#Vid_kamar').val(),
        vdacriplanning_atgl: $('#vdacriplanning_atgl').val(),
        vdacriplanning_b1_1Id: document.querySelector('input[name=vdacriplanning_b1_1Id]:checked').value,
        vdacriplanning_b1_2Id: document.querySelector('input[name=vdacriplanning_b1_2Id]:checked').value,
        vdacriplanning_b1cId: document.querySelector('input[name=vdacriplanning_b1cId]:checked').value,
        vdacriplanning_b1_1Idket: $('#vdacriplanning_b1_1Idket').val(),
        vdacriplanning_b1_2Idket: $('#vdacriplanning_b1_2Idket').val(),
        vdacriplanning_b1cIdket: $('#vdacriplanning_b1cIdket').val(),
        vdacriplanning_b2Id: document.querySelector('input[name=vdacriplanning_b2Id]:checked').value,
        vdacriplanning_b2Idket: $('#vdacriplanning_b2Idket').val(),
      //vdacriplanning_b3Id : document.querySelector('input[name=vdacriplanning_b3Id]:checked').value,
        vdacriplanning_b3Id_1: vdacriplanning_b3Id_1,
        vdacriplanning_b3Id_2: vdacriplanning_b3Id_2,
        vdacriplanning_b3Id_3: vdacriplanning_b3Id_3,
        vdacriplanning_b3Id_4: vdacriplanning_b3Id_4,
        vdacriplanning_b3Id_5: vdacriplanning_b3Id_5,
        vdacriplanning_b3Id_6: vdacriplanning_b3Id_6,
        vdacriplanning_b3Id_7: vdacriplanning_b3Id_7,
        vdacriplanning_b3Id_8: vdacriplanning_b3Id_8,
        vdacriplanning_b3Id_9: vdacriplanning_b3Id_9,
        vdacriplanning_b3Id_10: vdacriplanning_b3Id_10,
        vdacriplanning_b3Idket10: $('#vdacriplanning_b3Idket10').val(),
        vdacriplanning_b4Id: document.querySelector('input[name=vdacriplanning_b4Id]:checked').value,
        vdacriplanning_b4Idket: $('#vdacriplanning_b4Idket').val(),
        vdacriplanning_b5Id: document.querySelector('input[name=vdacriplanning_b5Id]:checked').value,
        vdacriplanning_b5Idket: $('#vdacriplanning_b5Idket').val(),
        vdacriplanning_b6Id: document.querySelector('input[name=vdacriplanning_b6Id]:checked').value,
        vdacriplanning_b6ket_1: vdacriplanning_b6ket_1,
        vdacriplanning_b6ket_2: vdacriplanning_b6ket_2,
        vdacriplanning_b6ket_3: vdacriplanning_b6ket_3,
        vdacriplanning_b6ket_4: vdacriplanning_b6ket_4,
        vdacriplanning_b6ket_5: vdacriplanning_b6ket_5,
        vdacriplanning_b6ketket5: $('#vdacriplanning_b6ketket5').val(),
        vdacriplanning_b7Id: document.querySelector('input[name=vdacriplanning_b7Id]:checked').value,
        vdacriplanning_b7ket_1: vdacriplanning_b7ket_1,
        vdacriplanning_b7ket_2: vdacriplanning_b7ket_2,
        vdacriplanning_b7ket_3: vdacriplanning_b7ket_3,
        vdacriplanning_b7ket_4: vdacriplanning_b7ket_4,
        vdacriplanning_b7ketket4: $('#vdacriplanning_b7ketket4').val(),
        vdacriplanning_b8Id: document.querySelector('input[name=vdacriplanning_b8Id]:checked').value,
        vdacriplanning_b8ket_1: vdacriplanning_b8ket_1,
        vdacriplanning_b8ket_2: vdacriplanning_b8ket_2,
        vdacriplanning_b9Id: document.querySelector('input[name=vdacriplanning_b9Id]:checked').value,
        vdacriplanning_b9ket_1: vdacriplanning_b9ket_1,
        vdacriplanning_b9ket_2: vdacriplanning_b9ket_2,
        vdacriplanning_b9ket_3: vdacriplanning_b9ket_3,
        vdacriplanning_b9ket_4: vdacriplanning_b9ket_4,
        vdacriplanning_b9ketket4: $('#vdacriplanning_b9ketket4').val(),
        vdacriplanning_b10Id: document.querySelector('input[name=vdacriplanning_b10Id]:checked').value,
        vdacriplanning_b10Idket: $('#vdacriplanning_b10Idket').val(),
        vdacriplanning_b11Id: document.querySelector('input[name=vdacriplanning_b11Id]:checked').value,
        vdacriplanning_b11ket_1: vdacriplanning_b11ket_1,
        vdacriplanning_b11ket_2: vdacriplanning_b11ket_2,
        vdacriplanning_b11ket_3: vdacriplanning_b11ket_3,
        vdacriplanning_b11ket_4: vdacriplanning_b11ket_4,
        vdacriplanning_b11ket_5: vdacriplanning_b11ket_5,
        vdacriplanning_b11ket_6: vdacriplanning_b11ket_6,
        vdacriplanning_b11ket_7: vdacriplanning_b11ket_7,
        vdacriplanning_b11ketket7: $('#vdacriplanning_b11ketket7').val(),
        vdacriplanning_b12Id: document.querySelector('input[name=vdacriplanning_b12Id]:checked').value,
        vdacriplanning_b12ket_1: vdacriplanning_b12ket_1,
        vdacriplanning_b12ket_2: vdacriplanning_b12ket_2,
        vdacriplanning_b12ket_3: vdacriplanning_b12ket_3,
        vdacriplanning_b12ket_4: vdacriplanning_b12ket_4,
        vdacriplanning_b12ketket4: $('#vdacriplanning_b12ketket4').val(),
        vdacriplanning_ctglkontrol: $('#vdacriplanning_ctglkontrol').val(),
        vdacriplanning_cpoli: $('#vdacriplanning_cpoli').val(),
        vdacriplanning_cdokter1Id: $('#vdacriplanning_cdokter1Id').val(),
        vdacriplanning_cdokumenId_1: vdacriplanning_cdokumenId_1,
        vdacriplanning_cdokumenId_2: vdacriplanning_cdokumenId_2,
        vdacriplanning_cdokumenId_3: vdacriplanning_cdokumenId_3,
        vdacriplanning_cdokumenIdket3: $('#vdacriplanning_cdokumenIdket3').val(),
        vdacriplanning_catat: $('#vdacriplanning_catat').val(),
        ttd: ttdRencanaPulang.getData(),
        vdacriplanning_aalasan: $('#vdacriplanning_aalasan').val(),
        vdacriplanning_adiagnosa: $('#vdacriplanning_adiagnosa').val(),
        vdacriplanning_apx: $('#vdacriplanning_apx').val(),
        vdacriplanning_apjId: $('#vdacriplanning_apjId').val(),
        vdacriplanning_atglpulang: $('#vdacriplanning_atglpulang').val(),
        vdacriplanning_apendamping: $('#vdacriplanning_apendamping').val(),
        vdacriplanning_ahubungan: $('#vdacriplanning_ahubungan').val(),
        norm: no_rm,
        id_user: id_user,
        id_transaksi: id_transaksi


      }
      console.log('jhihi' + vdacriplanning_b3Id_1);
      apiPOST('Rekammedisirna/save_discharge_planning', param, hasil => {
        document.getElementById('vdacriplanning_div_cdokumenId3').style.display = 'none';
        document.getElementById('vdacriplanning_div_b3Id10').style.display = 'none';
        document.getElementById('loading_RencanaPemulanganPasien').style.display = 'none';

      });
    }

    function printrencanapulang() {
      var param = {
        id_kunjungan: $('#idKunjunganermirna').val(),
        transaksi: $('#transaksiermirna').val(),
      }
      newTabPOST('API/Laporan/printrencanapulang', param);
      return;

    }

    function showttdrencanapulang() {
      ttdRencanaPulang.show();
    }

    function viewhistrencplgpas() {
      document.getElementById('loading_RencanaPemulanganPasien').style.display = 'block';

      showttdrencanapulang();
      var param = {
        id_transaksi: id_transaksi,
        norm: data.norms,
        nmpasien: data.namas

      }

    // apiPOST('Rekammedisirna/searchPasien', param, hasil => {


      apiPOST('Rekammedisirna/showPasienPulang', param, hasil => {
        if (hasil !== null) {
        // var datarenpasienplg = hasil['data'];
          var a = hasil['data'][0];
          var b = a.pengaruh_keluarga.split(',');
        //var c = a.bantuan.split(',');
          var d = a.alat_medis.split(',');
          var e = a.kesulitan.split(',');
          var f = a.edukasi.split(',');
          var g = a.keterampilan.split(',');
        // var h = a.dokumen.split(',');
          var j = 1;
          var z = 0;
          var y = 0;
          var x = 0;
          var w = 0;
          var v = 0;
          var u = 0;
          var tglmasuk = a.tgl_masuk.substr(0, 10);

          document.getElementById('vdacriplanning_atgl').value = tglmasuk;
          document.getElementById('vdacriplanning_id').value = a.no_rm;
          document.getElementById('vdacriplanning_zpjttd3').value = a.nama_pegawai;
          document.getElementById('vdacriplanning_apx').value = a.px_wali;
          document.getElementById('vdacriplanning_atglpulang').value = a.tgl_input;


          document.getElementById("vdacriplanning_aalasan").value = a.alasan_mrs;
          document.getElementById("vdacriplanning_adiagnosa").value = a.diagnosa;
          document.getElementById("vdacriplanning_apendamping").value = a.pendamping;
          document.getElementById("vdacriplanning_ahubungan").value = a.hubungan;
          document.getElementById("vdacriplanning_catat").value = a.catatan;
          document.getElementById("Vid_kamar").value = a.id_kamar;


        /* 1 pengaruh_keluarga */

          if (a.pengaruh_keluarga == '1') {
            $('#vdacriplanning_b1_1Id_1').prop('checked', true);
          } else {
            $('#vdacriplanning_b1_1Id_2').prop('checked', true);
            $('#vdacriplanning_div_b1_1Id2').show();
            document.getElementById('vdacriplanning_b1_1Idket').value = a.pengaruh_keluarga_ket;
          }
        /* 1 Pekerjaan / sekolah*/
          if (a.pengaruh_pekerjaan == '1') {
            $('#vdacriplanning_b1_2Id_1').prop('checked', true);
          } else {
            $('#vdacriplanning_b1_2Id_2').prop('checked', true);
            $('#vdacriplanning_div_b1bId2').show();
            document.getElementById('vdacriplanning_b1_2Idket').value = a.pengaruh_pekerjaan_ket;

          }
        /* 1 Pekerjaan / keuangan*/
          if (a.pengaruh_keuangan == '1') {
            $('#vdacriplanning_b1cId_1').prop('checked', true);
          } else {
            $('#vdacriplanning_b1cId_2').prop('checked', true);
            $('#vdacriplanning_div_b1_3Id2').show();
            document.getElementById('vdacriplanning_b1cIdket').value = a.pengaruh_keuangan_ket;

          }
        /* 2 Antisipasi*/
          if (a.antisipasi == '1') {
            $('#vdacriplanning_b2Id_1').prop('checked', true);
          } else {
            $('#vdacriplanning_b2Id_2').prop('checked', true);
            $('#vdacriplanning_div_b2Id2').show();
            document.getElementById('vdacriplanning_b2Idket').value = a.antisipasi_ket;

          }
        /*  3. Bantuan diperlukan dalam hal MENYIAPKAN MAKANAN*/
          if (a.bantuan_menyiapkan_makanan == '2') {
            $('#vdacriplanning_b3Id_1').prop('checked', true);
          }
        /*  3. Bantuan diperlukan dalam hal MANDI*/
          if (a.bantuan_mandi == '2') {
            $('#vdacriplanning_b3Id_2').prop('checked', true);
          }

        /*  3. Bantuan diperlukan dalam hal MAKAN*/
          if (a.bantuan_makanan == '2') {
            $('#vdacriplanning_b3Id_3').prop('checked', true);
          }

        /*  3. Bantuan diperlukan dalam hal MAKAN*/
          if (a.bantuan_perpakaian == '2') {
            $('#vdacriplanning_b3Id_4').prop('checked', true);
          }

        /*  3. Bantuan diperlukan dalam hal DIET*/
          if (a.bantuan_diet == '2') {
            $('#vdacriplanning_b3Id_5').prop('checked', true);
          }
        /*  3. Bantuan diperlukan dalam hal TRANSPORTASI*/
          if (a.bantuan_transportasi == '2') {
            $('#vdacriplanning_b3Id_6').prop('checked', true);
          }

        /*  3. Bantuan diperlukan dalam hal MENYIAPKAN OBAY*/
          if (a.bantuan_menyiapkan_obat == '2') {
            $('#vdacriplanning_b3Id_7').prop('checked', true);
          }

        /*  3. Bantuan diperlukan dalam hal  EDUKASI*/
          if (a.bantuan_edukasi_kesehatan == '2') {
            $('#vdacriplanning_b3Id_8').prop('checked', true);
          }
        /*  3. Bantuan diperlukan dalam hal  MINUM OBAT*/
          if (a.bantuan_minum_obat == '2') {
            $('#vdacriplanning_b3Id_9').prop('checked', true);
          }
        /*  3. Bantuan diperlukan dalam hal LAIN*/
          if (a.bantuan_lain == '2') {
            $('#vdacriplanning_b3Id_10').prop('checked', true);
            $('#vdacriplanning_div_b3Id10').show();
            document.getElementById('vdacriplanning_b3Idket10').value = a.bantuanlain_ket;
          }
        /*  4. Adakah yg membantu keperluan di atas*/
          if (a.helper == '1') {
            $('#vdacriplanning_b4Id_1').prop('checked', true);
          } else {
            $('#vdacriplanning_b4Id_2').prop('checked', true);
            $('#vdacriplanning_div_b4Id2').show();
            document.getElementById('vdacriplanning_b4Idket').value = a.helper_ket;
          }
        /*  5. Apakah pasien tinggal sendiri setelah keluar dari rumah sakit ?*/
          if (a.sendiri == '1') {
            $('#vdacriplanning_b5Id_1').prop('checked', true);
          } else {
            $('#vdacriplanning_b5Id_2').prop('checked', true);
            $('#vdacriplanning_div_b5Id2').show();
            document.getElementById('vdacriplanning_b5Idket').value = a.sendiri_ket;
          }
        /*  6. Apakah pasien menggunakan peralatan medis di rumah setelah keluar rumah sakit | alat_medis ?*/
          if (a.alat_medis == '1') {
            $('#vdacriplanning_b6Id_1').prop('checked', true);
          } else {
            $('#vdacriplanning_b6Id_2').prop('checked', true);
            $('#divvdacriplanning_div_b6Id2').show();
          /*  CATETER*/
            if (a.alat_medis_cateter == '2') {
              $('#vdacriplanning_b6ket_1').prop('checked', true);
            }
          /*  NGT*/
            if (a.alat_medis_ngt == '2') {
              $('#vdacriplanning_b6ket_2').prop('checked', true);
            }
          /*  dobelumen*/
            if (a.alat_medis_dobelumen == '2') {
              $('#vdacriplanning_b6ket_3').prop('checked', true);
            }
          /*  oksigen*/
            if (a.alat_medis_oksigen == '2') {
              $('#vdacriplanning_b6ket_4').prop('checked', true);
            }
          /*  lain*/
            if (a.alat_medis_lain == '2') {
              $('#vdacriplanning_b6ket_5').prop('checked', true);
              $('#vdacriplanning_div_b6ket5').show();
              document.getElementById('vdacriplanning_b6ketket5').value = a.alat_medis_ket;
            }
          }
        /*  7. Apakah pasien memerlukan alat bantu setelah keluar dari rumah sakit ?*/
          if (a.alat_jln == '1') {
            $('#vdacriplanning_b7Id_1').prop('checked', true);
          } else {
            $('#vdacriplanning_b7Id_2').prop('checked', true);
            $('#divvdacriplanning_div_b7Id2').show();
          /*  tongkat*/
            if (a.alat_jln_tongkat == '2') {
              $('#vdacriplanning_b7ket_1').prop('checked', true);
            }
          /*  kursiroda*/
            if (a.alat_jln_kursiroda == '2') {
              $('#vdacriplanning_b7ket_2').prop('checked', true);
            }
          /*  walker*/
            if (a.alat_jln_walker == '2') {
              $('#vdacriplanning_b7ket_3').prop('checked', true);
            }
          /*  lain*/
            if (a.alat_jln_lain == '2') {
              $('#vdacriplanning_b7ket_4').prop('checked', true);
            }

          }

        /*  8. Jelaskan Apakah memerlukan bantuan / perawatan khusus di rumah setelah keluar dari rumah sakit ?*/
          if (a.rawat_khusus == '1') {
            $('#vdacriplanning_b8Id_1').prop('checked', true);
          } else {
            $('#vdacriplanning_b8Id_2').prop('checked', true);
            $('#divvdacriplanning_div_b8Id2').show();
          /*  home care*/
            if (a.home_care == '2') {
              $('#vdacriplanning_b8ket_1').prop('checked', true);
            }
          /*  home visite*/
            if (a.visite_care == '2') {
              $('#vdacriplanning_b8ket_2').prop('checked', true);
            }

          }

        /*  9. Apakah pasien bermasalah dalam memenuhi kebutuhan pribadinya setelah keluar dari rumah sakit ?*/
          if (a.kesulitan == '1') {
            $('#vdacriplanning_b9Id_1').prop('checked', true);
          } else {
            $('#vdacriplanning_b9Id_2').prop('checked', true);
            $('#divvdacriplanning_div_b9Id2').show();
          /*  Makan*/
            if (a.masalah_makan == '2') {
              $('#vdacriplanning_b9ket_1').prop('checked', true);
            }
          /*  Minumm*/
            if (a.masalah_minum == '2') {
              $('#vdacriplanning_b9ket_2').prop('checked', true);
            }
          /*  BAB*/
            if (a.masalah_bab == '2') {
              $('#vdacriplanning_b9ket_3').prop('checked', true);
            }
          /*  BAB*/
            if (a.masalah_lain == '2') {
              $('#vdacriplanning_b9ket_4').prop('checked', true);
            }
          }

        /*   10. Apakah pasien memiliki nyeri kronis dan kelelahan setelah keluar dari rumah sakit ? */
          if (a.nyeri == '1') {
            $('#vdacriplanning_b10Id_1').prop('checked', true);
          } else {
            $('#vdacriplanning_b10Id_2').prop('checked', true);
            $('#divvdacriplanning_div_b10Id2').show();
            document.getElementById('vdacriplanning_b10Idket').value = a.nyeri_ket;


          }

        /*   11. Apakah pasien dan keluarga memerlukan edukasi kesehatan setelah keluar dari rumah sakit ? */
          if (a.edukasi == '1') {
            $('#vdacriplanning_b11Id_1').prop('checked', true);
          } else {
            $('#vdacriplanning_b11Id_2').prop('checked', true);
            $('#divvdacriplanning_div_b11Id2').show();
          /*  Obatann*/
            if (a.edukasi_obat == '2') {
              $('#vdacriplanning_b11ket_1').prop('checked', true);
            }
          /*  efeksamping*/
            if (a.edukasi_efeksamping == '2') {
              $('#vdacriplanning_b11ket_2').prop('checked', true);
            }
          /*  nyeri*/
            if (a.edukasi_nyeri == '2') {
              $('#vdacriplanning_b11ket_3').prop('checked', true);
            }
          /*  diit*/
            if (a.edukasi_diit == '2') {
              $('#vdacriplanning_b11ket_4').prop('checked', true);
            }
          /*  mencari*/
            if (a.edukasi_tolong == '2') {
              $('#vdacriplanning_b11ket_5').prop('checked', true);
            }
          /*  edukasi_folup*/
            if (a.edukasi_folup == '2') {
              $('#vdacriplanning_b11ket_6').prop('checked', true);
            }
          /*  lain*/
            if (a.edukasi_lain == '2') {
              $('#vdacriplanning_b11ket_7').prop('checked', true);
              $('#vdacriplanning_div_b11ket7').show();
              document.getElementById('vdacriplanning_b11ketket7').value = a.edukasi_ket;

            }

          }
        /*   12. Apakah pasien dan keluarga memerlukan keterampilan khusus setelah keluar dari rumah sakit ? */
          if (a.keterampilan == '1') {
            $('#vdacriplanning_b12Id_1').prop('checked', true);
          } else {
            $('#vdacriplanning_b12Id_2').prop('checked', true);
            $('#divvdacriplanning_div_b12Id2').show();
          /*  Perawatan Luka*/
            if (a.keterampilan_rawatluka == '2') {
              $('#vdacriplanning_b12ket_1').prop('checked', true);
            }
          /*  keterampilan_injeksi*/
            if (a.keterampilan_injeksi == '2') {
              $('#vdacriplanning_b12ket_2').prop('checked', true);
            }

          /*  Perawatan Bayi*/
            if (a.keterampilan_bayi == '2') {
              $('#vdacriplanning_b12ket_3').prop('checked', true);
            }

          /*  keterampilan_laini*/
            if (a.keterampilan_lain == '2') {
              $('#vdacriplanning_b12ket_4').prop('checked', true);
              $('#vdacriplanning_div_b12ket4').show();
              document.getElementById('vdacriplanning_b12ketket4').value = a.keterampilan_ket;
            }
          }

        /*   
         Dokumen & Hasil pemeriksaan yang disertakan
         */
          if (a.dokumen_lab == '2') {
            $('#vdacriplanning_cdokumenId_1').prop('checked', true);
          }
          if (a.dokumen_rad == '2') {
            $('#vdacriplanning_cdokumenId_2').prop('checked', true);
          }
          if (a.dokumen_lain == '2') {
            $('#vdacriplanning_cdokumenId_3').prop('checked', true);
            $('#vdacriplanning_div_cdokumenId3').show();
            document.getElementById('vdacriplanning_cdokumenIdket3').value = a.dokumen_lain_ket;

          }


          document.getElementById('vdacriplanning_ctglkontrol').value = hasil['data'][0].tgl_kontrol;
          document.getElementById('vdacriplanning_atglpulang').value = hasil['data'][0].tgl_input;
          document.getElementById('vdacriplanning_tglcatat').value = hasil['data'][0].tgl_input;
          document.getElementById('vdacriplanning_cpoli').value = hasil['data'][0].id_unit;

          apiPOST('Rekammedisirna/viewDokter', hasil['data'][0].id_dpjp, hasil => {
            var dokt = '';
            var b = hasil['data'];
            for (var i = 0; i < b.length; i++) {
              dokt += '<option value="' + b[i]['id_pegawai'] + '">' + b[i]['nama_pegawai'] + '</option>';
            }
            document.getElementById('vdacriplanning_cdokter1Id').innerHTML = dokt;
          });

          var img = document.getElementById('ImgTtdRencanaPulang');
          img.src = hasil['data'][0].ttddpjp;

          apiPOST('Rekammedisirna/searchdataPasien', param, hasil => {
            if (hasil !== null) {
              document.getElementById('vdacriplanning_zpjttd3').value = hasil['data'][0].nama_pegawai;
            }
          });

        } else {
          apiPOST('Rekammedisirna/searchdataPasien', param, hasil => {
            if (hasil !== null) {
              document.getElementById('vdacriplanning_aalasan').value = hasil['data'][0].keluhan;
              document.getElementById('vdacriplanning_id').value = hasil['data'][0].no_rm;
              document.getElementById('vdacriplanning_adiagnosa').value = hasil['data'][0].diagnosapengantar;
              document.getElementById('vdacriplanning_atgl').value = hasil['data'][0].tgl_transaksi;
              document.getElementById('vdacriplanning_zpjttd3').value = hasil['data'][0].nama_pegawai;
              document.getElementById('vdacriplanning_apx').value = hasil['data'][0].nama_keluarga;
              document.getElementById('Vid_kamar').value = hasil['data'][0].id_kamar;
            }
          });
          document.getElementById('loading_RencanaPemulanganPasien').style.display = 'none';

        }

        document.getElementById('loading_RencanaPemulanganPasien').style.display = 'none';

      });

}
  // });
</script>