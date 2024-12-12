<?php
  $data 			= json_decode($_GET['data']);
  $rm 				= str_replace('"','', json_encode($data->rm));
  $unit     		= str_replace('"','', json_encode($data->unit));
  $id_kunjungan     = str_replace('"','', json_encode($data->id_kunjungan));
  $id_transaksi     = str_replace('"','', json_encode($data->id_transaksi));
?>
<div class="col-md-12 p-0">  
  <div class="card-body p-2" id="DivPreoperasi">
    <div id="dacinformasisedasi_inputdiv" class="rapet">
      <div class="card"><!-- TITLE -->
        <div class="col-md-12">
          <div class="row d-flex justify-content-center">
            <h4><b><label class="col-form-label">PEMBERIAN INFORMASI ANESTESI DAN SEDASI</label></b></h4>
          </div>
        </div>
      </div>
      <div class="card "><!-- DATA PASIEN -->
        <div class="card-header" style="background-color:black;">
          <h3 class="card-title" style="color:white;">DATA PASIEN</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>       
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-5">
              <div class="form-group row">
                <div class="col-md-3">
                  <label class="col-form-label">Tanggal</label>
                </div>
                <div class="col-md-4">
                  <div class="input-group date" id="dacinformasisedasi_datgl">
                    <input id="dacinformasisedasi_atgl" type="date" class="form-control form-control-sm" value="<?php echo date('Y-m-d');?>">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-7">
              <div class="form-group row">
                <div class="col-md-4">
                  <label class="col-form-label">Dokter Pelaksana Tindakan</label>
                </div>
                <div class="col-md-7">
                  <select id="dacinformasisedasi_apj1Id" name="apj1Id" class="form-control form-control-sm" ></select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label class="col-form-label">Pemberi Informasi</label>
                </div>
                <div class="col-md-7">
                  <select id="dacinformasisedasi_apj2Id" name="apj2Id" class="form-control form-control-sm"></select>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card "><!-- JENIS INFORMASI -->
        <div class="card-header" style="background-color:black;">
          <h3 class="card-title" style="color:white;">INFORMASI</h3>
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
                  <b><label class="col-form-label">JENIS INFORMASI</label></b>
                </div>
                <div class="col-md-6">
                  <b><label class="col-form-label">ISI INFORMASI</label></b>
                </div>
                <div class="col-md-2" align="center">
                  <b><label class="col-form-label">TANDAI ( ? )</label></b>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                  <label class="col-form-label">1. Diagnosis<br>(WD &amp; DD)</label>
                </div>
                <div class="col-md-6">
                  <textarea rows="3" name="dacinformasisedasi_diagnosa" id="dacinformasisedasi_diagnosa" style="width:100%;" class="form-control"></textarea>
                </div>
                <div class="col-md-2" align="center">
                  <div class="custom-control custom-checkbox">
                    <input name="c1" id="dacinformasisedasi_c1" type="checkbox" class="custom-control-input" checked="checked">
                    <label class="custom-control-label" for="dacinformasisedasi_c1"> </label>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                  <label class="col-form-label">2. Dasar Diagnosis</label>
                </div>
                <div class="col-md-6">
                  <textarea rows="3" name="dacinformasisedasi_dasar" id="dacinformasisedasi_dasar" style="width:100%;" class="form-control"></textarea>
                </div>
                <div class="col-md-2" align="center">
                  <div class="custom-control custom-checkbox">
                    <input name="c2" id="dacinformasisedasi_c2" type="checkbox" class="custom-control-input" checked="checked">
                    <label class="custom-control-label" for="dacinformasisedasi_c2"> </label>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                  <label class="col-form-label">3. Tindakan Kedokteran</label>
                </div>
                <div class="col-md-6">
                  <b>Pembiusan</b>
                  <div class="form-group row">
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                              <input name="dacinformasisedasi_tindakanId" value="1" type="radio" class="custom-control-input" id="dacinformasisedasi_tindakanId_1" checked>
                              <label class="custom-control-label" for="dacinformasisedasi_tindakanId_1">Sedasi Ringan / Sedang / Dalam</label>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                              <input name="dacinformasisedasi_tindakanId" value="2" type="radio" class="custom-control-input" id="dacinformasisedasi_tindakanId_2">
                              <label class="custom-control-label" for="dacinformasisedasi_tindakanId_2">Umum (Total) </label>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                              <input name="dacinformasisedasi_tindakanId" value="3" type="radio" class="custom-control-input" id="dacinformasisedasi_tindakanId_3">
                              <label class="custom-control-label" for="dacinformasisedasi_tindakanId_3">Regional (Spinal/Epidural)</label>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                              <input name="dacinformasisedasi_tindakanId" value="4" type="radio" class="custom-control-input" id="dacinformasisedasi_tindakanId_4">
                              <label class="custom-control-label" for="dacinformasisedasi_tindakanId_4">Blok perifer</label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-2" align="center">
                  <div class="custom-control custom-checkbox">
                    <input name="c3" id="dacinformasisedasi_c3" type="checkbox" class="custom-control-input" checked="checked">
                    <label class="custom-control-label" for="dacinformasisedasi_c3"> </label>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                  <label class="col-form-label">4. Indikasi Tindakan</label>
                </div>
                <div class="col-md-6">
                  <textarea rows="3" name="dacinformasisedasi_indikasi" id="dacinformasisedasi_indikasi" style="width:100%;" class="form-control"></textarea>
                </div>
                <div class="col-md-2" align="center">
                  <div class="custom-control custom-checkbox">
                    <input name="c4" id="dacinformasisedasi_c4" type="checkbox" class="custom-control-input" checked="checked">
                    <label class="custom-control-label" for="dacinformasisedasi_c4"> </label>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                  <label class="col-form-label">5. Tata Cara</label>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <div class="col-md-8">
                      <div class="row" id="dacinformasisedasi_tatacaralist">
                        <div class="col-md-12">
                          <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline" id="dacinformasisedasi_tatacaralistdiv_1">
                              <input name="dacinformasisedasi_tatacaralist" value="1" type="checkbox" class="custom-control-input" id="dacinformasisedasi_tatacaralist_1"> <label class="custom-control-label" for="dacinformasisedasi_tatacaralist_1">Penyuntikan obat melalui iv line/infus (aliran darah)</label>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline" id="dacinformasisedasi_tatacaralistdiv_2">
                              <input name="dacinformasisedasi_tatacaralist" value="2" type="checkbox" class="custom-control-input" id="dacinformasisedasi_tatacaralist_2"> <label class="custom-control-label" for="dacinformasisedasi_tatacaralist_2">Penyuntikan melalui infus (aliran darah) atau pemberian zat anestesi yang dapat dihirup/dihisap, terutama pada bayi/anak disertai pemasangan alat bantu napas (bila diperlukan)</label>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline" id="dacinformasisedasi_tatacaralistdiv_3">
                              <input name="dacinformasisedasi_tatacaralist" value="3" type="checkbox" class="custom-control-input" id="dacinformasisedasi_tatacaralist_3"> <label class="custom-control-label" for="dacinformasisedasi_tatacaralist_3">Penyuntikan obat melalui celah tulang belakang</label>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline" id="dacinformasisedasi_tatacaralistdiv_4">
                              <input name="dacinformasisedasi_tatacaralist" value="4" type="checkbox" class="custom-control-input" id="dacinformasisedasi_tatacaralist_4"> <label class="custom-control-label" for="dacinformasisedasi_tatacaralist_4">Penyuntikan obat disekitar saraf perifer</label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-2" align="center">
                  <div class="custom-control custom-checkbox">
                    <input name="c5" id="dacinformasisedasi_c5" type="checkbox" class="custom-control-input" checked="checked">
                    <label class="custom-control-label" for="dacinformasisedasi_c5"> </label>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                  <label class="col-form-label">6. Tujuan</label>
                </div>
                <div class="col-md-6">
                  <textarea rows="3" name="dacinformasisedasi_tujuan" id="dacinformasisedasi_tujuan" style="width:100%;" class="form-control"></textarea>
                </div>
                <div class="col-md-2" align="center">
                  <div class="custom-control custom-checkbox">
                    <input name="c6" id="dacinformasisedasi_c6" type="checkbox" class="custom-control-input" checked="checked">
                    <label class="custom-control-label" for="dacinformasisedasi_c6"> </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <div class="col-md-3">
                  <b><label class="col-form-label">JENIS INFORMASI</label></b>
                </div>
                <div class="col-md-6">
                  <b><label class="col-form-label">ISI INFORMASI</label></b>
                </div>
                <div class="col-md-2" align="center">
                  <b><label class="col-form-label">TANDAI ( ? )</label></b>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                  <label class="col-form-label">7. Resiko</label>
                </div>
                <div class="col-md-6">
                  <textarea rows="3" name="dacinformasisedasi_risiko" id="dacinformasisedasi_risiko" style="width:100%;" class="form-control"></textarea>
                </div>
                <div class="col-md-2" align="center">
                  <div class="custom-control custom-checkbox">
                    <input name="c7" id="dacinformasisedasi_c7" type="checkbox" class="custom-control-input" checked="checked">
                    <label class="custom-control-label" for="dacinformasisedasi_c7"> </label>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                  <label class="col-form-label">8. Komplikasi</label>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                              <input name="dacinformasisedasi_komplikasiId" value="1" type="radio" class="custom-control-input" id="dacinformasisedasi_komplikasiId_1" checked>
                              <label class="custom-control-label" for="dacinformasisedasi_komplikasiId_1">Sedasi Ringan / Sedang / Dalam</label>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                              <input name="dacinformasisedasi_komplikasiId" value="2" type="radio" class="custom-control-input" id="dacinformasisedasi_komplikasiId_2">
                              <label class="custom-control-label" for="dacinformasisedasi_komplikasiId_2">Umum (Total) </label>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                              <input name="dacinformasisedasi_komplikasiId" value="3" type="radio" class="custom-control-input" id="dacinformasisedasi_komplikasiId_3">
                              <label class="custom-control-label" for="dacinformasisedasi_komplikasiId_3">Regional (Spinal/Epidural)</label>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                              <input name="dacinformasisedasi_komplikasiId" value="4" type="radio" class="custom-control-input" id="dacinformasisedasi_komplikasiId_4">
                              <label class="custom-control-label" for="dacinformasisedasi_komplikasiId_4">Blok perifer</label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-2" align="center">
                  <div class="custom-control custom-checkbox">
                    <input name="c8" id="dacinformasisedasi_c8" type="checkbox" class="custom-control-input" checked="checked">
                    <label class="custom-control-label" for="dacinformasisedasi_c8"> </label>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                  <label class="col-form-label">9. Prognosis</label>
                </div>
                <div class="col-md-6">
                  <textarea rows="3" name="dacinformasisedasi_prognosis" id="dacinformasisedasi_prognosis" style="width:100%;" class="form-control"></textarea>
                </div>
                <div class="col-md-2" align="center">
                  <div class="custom-control custom-checkbox">
                    <input name="c9" id="dacinformasisedasi_c9" type="checkbox" class="custom-control-input" checked="checked">
                    <label class="custom-control-label" for="dacinformasisedasi_c9"> </label>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                  <label class="col-form-label">10. Alternatif</label>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                              <input name="dacinformasisedasi_alternatiflist" value="1" type="checkbox" class="custom-control-input" id="dacinformasisedasi_alternatiflist_1">
                              <label class="custom-control-label" for="dacinformasisedasi_alternatiflist_1">Lokal</label>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                              <input name="dacinformasisedasi_alternatiflist" value="2" type="checkbox" class="custom-control-input" id="dacinformasisedasi_alternatiflist_2">
                              <label class="custom-control-label" for="dacinformasisedasi_alternatiflist_2">Sedasi sedang/dalam</label>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                              <input name="dacinformasisedasi_alternatiflist" value="3" type="checkbox" class="custom-control-input" id="dacinformasisedasi_alternatiflist_3">
                              <label class="custom-control-label" for="dacinformasisedasi_alternatiflist_3">Umum (total)</label>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                              <input name="dacinformasisedasi_alternatiflist" value="4" type="checkbox" class="custom-control-input" id="dacinformasisedasi_alternatiflist_4">
                              <label class="custom-control-label" for="dacinformasisedasi_alternatiflist_4">Regional</label>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                              <input name="dacinformasisedasi_alternatiflist" value="5" type="checkbox" class="custom-control-input" id="dacinformasisedasi_alternatiflist_5">
                              <label class="custom-control-label" for="dacinformasisedasi_alternatiflist_5">Blok perifer</label>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                              <input name="dacinformasisedasi_alternatiflist" value="6" type="checkbox" class="custom-control-input" id="dacinformasisedasi_alternatiflist_6">
                              <label class="custom-control-label" for="dacinformasisedasi_alternatiflist_6">Tidak ada</label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-2" align="center">
                  <div class="custom-control custom-checkbox">
                    <input name="c10" id="dacinformasisedasi_c10" type="checkbox" class="custom-control-input" checked="checked">
                    <label class="custom-control-label" for="dacinformasisedasi_c10"> </label>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                  <label class="col-form-label">11. Hal Yang Dilakukan </label>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                              <input name="dacinformasisedasi_penyelamatanlist" value="1" type="checkbox" class="custom-control-input" id="dacinformasisedasi_penyelamatanlist_1">
                              <label class="custom-control-label" for="dacinformasisedasi_penyelamatanlist_1">Resusitasi jika perlu</label>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                              <input name="dacinformasisedasi_penyelamatanlist" value="2" type="checkbox" class="custom-control-input" id="dacinformasisedasi_penyelamatanlist_2">
                              <label class="custom-control-label" for="dacinformasisedasi_penyelamatanlist_2">Transfusi jika perlu</label>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                              <input name="dacinformasisedasi_penyelamatanlist" value="3" type="checkbox" class="custom-control-input" id="dacinformasisedasi_penyelamatanlist_3">
                              <label class="custom-control-label" for="dacinformasisedasi_penyelamatanlist_3">Post op ICU/HCU jika perlu</label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-2" align="center">
                  <div class="custom-control custom-checkbox">
                    <input name="c11" id="dacinformasisedasi_c11" type="checkbox" class="custom-control-input" checked="checked">
                    <label class="custom-control-label" for="dacinformasisedasi_c11"> </label>
                  </div>
                </div>
              </div>
            </div>  
          </div>
        </div>
      </div>
      <div class="card"><!-- TTD -->
        <div class="card-header" style="background-color:black;">
          <h3 class="card-title" style="color:white;">TTD</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>       
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6" align="center">
              <label>Dengan ini menyatakan bahwa saya telah menerima informasi dari dokter sebagaimana di atas kemudian  saya beri tanda/paraf di kolom kanannya, dan telah memahaminya
              </label>
              <label>Pihak Keluarga / Pasien</label>
              <div style="text-align: center;">
                <img style="width:250px;height:250px;border: 2px dashed;background-color: #535b62d1;" id="GambarTtdPasien_AnastesiAdesi">
                <input type="text" class="form-control form-control-sm text-center d-none" id="HasilTtdPasien_GambarTtd_AnastesiAdesi" disabled>
              </div>
              <button onclick="ShowModalTtdAnastesiAdesi_Pasien()" class="btn btn-warning btn-sm">Klik Tanda Tangan</button><br>
              <label>Nama &amp; Tanda tangan</label>
            </div>
            <div class="col-md-6" align="center">
              <label>Dengan ini menyatakan bahwa saya telah menerangkan hal-hal di atas secara benar dan jelas dan memberikan kesempatan untuk bertanya dan/atau berdiskusi
              </label>
              <label>DPJP</label>
              <div style="text-align: center;">
                <img style="width:250px;height:250px;border: 2px dashed;background-color: #535b62d1;" id="GambarTtdDokter_AnastesiAdesi">
                <input type="text" class="form-control form-control-sm text-center d-none" id="HasilTtdDokter_GambarTtd_AnastesiAdesi" disabled>
              </div>
              <button onclick="ShowModalTtdAnastesiAdesi_Dokter()" class="btn btn-warning btn-sm">Klik Tanda Tangan</button><br>
              <label>Nama &amp; Tanda tangan</label>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <button onclick="SaveinfoAnes()" id="dacinformasisedasi_btsave" type="button" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Simpan Anastesi Sedasi</button>
          <button id="dacinformasisedasi_btdelete" type="button" class="btn btn-sm btn-danger" style="display:none;"><i class="fas fa-print"></i> Cetak PDF</button>
          <button id="dacinformasisedasi_btpantau" type="button" class="btn btn-sm btn-success" style="display:none;"><i class="fas fa-bars"></i> Pemantauan Restraint</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade"  id="ModalTtdAnastesiAdesi_Pasien" role="dialog">
    <div class="modal-dialog" style="width: 408px;">
      <div class="modal-content">
          <div class="modal-body">
            <div id="paint_ttdpasienanestesisedasiirna"></div>
          </div>
        <div class="modal-footer">
            <button class="btn btn-sm btn-primary" onclick="takeTtd_AnastesiAdesi_Pasien();">Simpan</button>
            <button class="btn btn-sm btn-outline-danger" onclick="$('#ModalTtdAnastesiAdesi_Pasien').modal('hide');">Batal</button>
        </div>
    </div>
  </div>
</div>

<div class="modal fade"  id="ModalTtdAnastesiAdesi_Dokter" role="dialog">
  <div class="modal-dialog" style="width: 408px;">
    <div class="modal-content">
      <div class="modal-body">
        <div id="paint_ttddokteranestesisedasiirna"></div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-sm btn-primary" onclick="takeTtd_AnastesiAdesi_Dokter();">Simpan</button>
        <button class="btn btn-sm btn-outline-danger" onclick="$('#ModalTtdAnastesiAdesi_Dokter').modal('hide');">Batal</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
var ttdDokterAnastesiSedai    = new WPaintX('paint_ttddokteranestesisedasiirna');
var ttdPasienAnastesiSedai    = new WPaintX('paint_ttdpasienanestesisedasiirna');

var no_rm   		= "<?php echo $rm; ?>";
var id_unit   		= "<?php echo $unit; ?>";
var id_kunjungan   	= "<?php echo $id_kunjungan; ?>";
var id_transaksi   	= "<?php echo $id_transaksi; ?>";
document.getElementById('loading_informasi_anestesi_sedasi').style.display = 'none';
pegawai();
$('#HasilTtdPasien_GambarTtd_AnastesiAdesi').val('');
$('#HasilTtdDokter_GambarTtd_AnastesiAdesi').val('');
loadinformasisedasi();
// function showttdanestesisedasiirna(){
//   ttddokteranestesisedasiirna.show();
//   ttdpasienanestesisedasiirna.show();
// }

function ShowModalTtdAnastesiAdesi_Pasien() {
  showttdanestesisedasiirna();
  $('#ModalTtdAnastesiAdesi_Pasien').modal('show');
}

function takeTtd_AnastesiAdesi_Pasien() {
  document.getElementById('GambarTtdPasien_AnastesiAdesi').src = ttdPasienAnastesiSedai.getData();
  document.getElementById('HasilTtdPasien_GambarTtd_AnastesiAdesi').value = ttdPasienAnastesiSedai.getData();
  $('#ModalTtdAnastesiAdesi_Pasien').modal('hide');
}

function ShowModalTtdAnastesiAdesi_Dokter() {
  showttdanestesisedasiirna();
  $('#ModalTtdAnastesiAdesi_Dokter').modal('show');
}

function showttdanestesisedasiirna(){
  ttdDokterAnastesiSedai.show();
  ttdPasienAnastesiSedai.show();
}

function takeTtd_AnastesiAdesi_Dokter() {
  document.getElementById('GambarTtdDokter_AnastesiAdesi').src = ttdDokterAnastesiSedai.getData();
  document.getElementById('HasilTtdDokter_GambarTtd_AnastesiAdesi').value = ttdDokterAnastesiSedai.getData();
  $('#ModalTtdAnastesiAdesi_Dokter').modal('hide');
}
function SaveinfoAnes(){
  var ttdPasien     = $('#HasilTtdPasien_GambarTtd_AnastesiAdesi').val();
  var ttdDokter     = $('#HasilTtdDokter_GambarTtd_AnastesiAdesi').val();  
  var diagnosa      = $('#dacinformasisedasi_diagnosa').val();
  var dasardiagnosa = $('#dacinformasisedasi_dasar').val();
  var indikasi_tind = $('#dacinformasisedasi_indikasi').val();
  var tujuan        = $('#dacinformasisedasi_tujuan').val();
  var risiko        = $('#dacinformasisedasi_risiko').val();
  var prognosis     = $('#dacinformasisedasi_prognosis').val();

  if (diagnosa == ''){
    toastr.warning("Diagnosis Masih Kosong!");
    $("#dacinformasisedasi_c1").prop("checked", false);
    $('#dacinformasisedasi_diagnosa').trigger('focus');
    return;
  }else{
    $("#dacinformasisedasi_c1").prop("checked", true);
  }

  if (dasardiagnosa == ''){
    toastr.warning("Dasar Diagnosis Masih Kosong!");
    $("#dacinformasisedasi_c2").prop("checked", false);
    $('#dacinformasisedasi_dasar').trigger('focus');
    return;
  }else{
    $("#dacinformasisedasi_c2").prop("checked", true);
  }

  if (indikasi_tind == ''){
    toastr.warning("Indikasi Tindakan Masih Kosong!");
    $("#dacinformasisedasi_c4").prop("checked", false);
    $('#dacinformasisedasi_indikasi').trigger('focus');
    return;
  }else{
    $("#dacinformasisedasi_c4").prop("checked", true);
  }

  if (tujuan == ''){
    toastr.warning("Tujuan Masih Kosong!");
    $("#dacinformasisedasi_c6").prop("checked", false);
    $('#dacinformasisedasi_tujuan').trigger('focus');
    return;
  }else{
    $("#dacinformasisedasi_c6").prop("checked", true);
  }

  if (risiko == ''){
    toastr.warning("Risiko Masih Kosong!");
    $("#dacinformasisedasi_c7").prop("checked", false);
    $('#dacinformasisedasi_risiko').trigger('focus');
    return;
  }else{
    $("#dacinformasisedasi_c7").prop("checked", true);
  }

  if (prognosis == ''){
    toastr.warning("Prognosis Masih Kosong!");
    $("#dacinformasisedasi_c9").prop("checked", false);
    $('#dacinformasisedasi_prognosis').trigger('focus');
    return;
  }else{
    $("#dacinformasisedasi_c9").prop("checked", true);
  }

  var tinddokter  = Array.from(document.querySelectorAll('input[name=dacinformasisedasi_tindakanId]:checked')).map(c=>c.value);
  var komplikasi  = Array.from(document.querySelectorAll('input[name=dacinformasisedasi_komplikasiId]:checked')).map(c=>c.value);
  var tata        = Array.from(document.querySelectorAll('input[name=dacinformasisedasi_tatacaralist]:checked')).map(c=>c.value);
  var natif       = Array.from(document.querySelectorAll('input[name=dacinformasisedasi_alternatiflist]:checked')).map(c=>c.value);
  var poin        = Array.from(document.querySelectorAll('input[name=dacinformasisedasi_penyelamatanlist]:checked')).map(c=>c.value);
  
  if (tinddokter.length == 0){
    toastr.warning("Tindakan Dokter Belum Dipilih!");
    $("#dacinformasisedasi_c3").prop("checked", false);
    return;
  }else{
    $("#dacinformasisedasi_c3").prop("checked", true);
  }

  if (komplikasi.length == 0){
    toastr.warning("Komplikasi Belum Dipilih!");
    $("#dacinformasisedasi_c8").prop("checked", false);
    return;
  }else{
    $("#dacinformasisedasi_c8").prop("checked", true);
  }

  if (tata.length == 0){
    toastr.warning("Tata Cara Belum Dipilih!");
    $("#dacinformasisedasi_c5").prop("checked", false);
    return;
  }else{
    $("#dacinformasisedasi_c5").prop("checked", true);
  }

  if (natif.length == 0){
    toastr.warning("Alternatif Belum Dipilih!");
    $("#dacinformasisedasi_c10").prop("checked", false);
    return;
  }else{
    $("#dacinformasisedasi_c10").prop("checked", true);
  }
  
  if (poin.length == 0){
    toastr.warning("Hal yang dilakukan Belum Dipilih!");
    $("#dacinformasisedasi_c11").prop("checked", false);
    return;
  }else{
    $("#dacinformasisedasi_c11").prop("checked", true);
  }

  if (ttdPasien == ''){
    toastr.error("Belum Ada Tanda Tangan Pasien!");
    return;
  }

  if (ttdDokter == ''){
    toastr.error("Belum Ada Tanda Tangan Dokter!");
    return;
  }

  var param = {
    id_kunjungan  : id_kunjungan,
    id_transaksi  : id_transaksi,
    tgl           : $('#dacinformasisedasi_atgl').val(),
    dokter        : $('#dacinformasisedasi_apj1Id').val(),
    informan      : $('#dacinformasisedasi_apj2Id').val(),
    user          : user.id_user,
    diagnosis     : diagnosa,
    diagnosis_c   : $('#dacinformasisedasi_c1').is(':checked'),
    dasar_diag    : dasardiagnosa,
    dasar_diag_c  : $('#dacinformasisedasi_c2').is(':checked'),
    tindakan      : $('input[name=dacinformasisedasi_tindakanId]:checked').val(),
    tindakan_c    : $('#dacinformasisedasi_c3').is(':checked'),
    indikasi      : indikasi_tind,
    indikasi_c    : $('#dacinformasisedasi_c4').is(':checked'),
    tata_cara     : tata.join(),
    tata_cara_c   : $('#dacinformasisedasi_c5').is(':checked'),
    tujuan        : tujuan,
    tujuan_c      : $('#dacinformasisedasi_c6').is(':checked'),
    resiko        : risiko,
    resiko_c      : $('#dacinformasisedasi_c7').is(':checked'),
    komplikasi    : $('input[name=dacinformasisedasi_komplikasiId]:checked').val(),
    komplikasi_c  : $('#dacinformasisedasi_c8').is(':checked'),
    prognosis     : prognosis,
    prognosis_c   : $('#dacinformasisedasi_c9').is(':checked'),
    alternatif    : natif.join(),
    alternatif_c  : $('#dacinformasisedasi_c10').is(':checked'),
    next_point    : poin.join(),
    next_point_c  : $('#dacinformasisedasi_c11').is(':checked'),
    //hal_penting   : $('input[name=dacinformasisedasi_penyelamatanlist]:checked').val(),
    ttd_dokter    : $('#HasilTtdDokter_GambarTtd_AnastesiAdesi').val(), //ttdDokterAnastesiSedai.getData(),
    ttd_pasien    : $('#HasilTtdPasien_GambarTtd_AnastesiAdesi').val() //ttdPasienAnastesiSedai.getData(),
  };
  
  apiPOST('Rekammedisirna/saveinformasisedasi', param, hasil=>{

  })
}

function loadinformasisedasi(){
  var param = {
    norm            : no_rm,
    id_kunjungan    : id_kunjungan,
    id_transaksi    : id_transaksi,
  };

  document.getElementById("loading_informasi_anestesi_sedasi").style.display = 'block';
  apiPOST('Rekammedisirna/loadinformasisedasi', param, hasil => {

    if (hasil['data'] != 0){
      var DataInfAnastesi  = hasil['data'];
      if (DataInfAnastesi.length > 0){
          var id_kunjungan  = DataInfAnastesi[0].id_kunjungan;
          var id_penyakit   = DataInfAnastesi[0].id_penyakit;
          var diagnosis_c   = DataInfAnastesi[0].diagnosis_c;
          var dasar_diag    = DataInfAnastesi[0].dasar_diag;
          var dasar_diag_c  = DataInfAnastesi[0].dasar_diag_c;
          var tindakan      = DataInfAnastesi[0].tindakan;
          var tindakan_c    = DataInfAnastesi[0].tindakan_c;
          var indikasi      = DataInfAnastesi[0].indikasi;
          var indikasi_c    = DataInfAnastesi[0].indikasi_c;
          if ((DataInfAnastesi[0].tata_cara == 0)||(DataInfAnastesi[0].tata_cara == null)){
            var tata_cara  = 0;
            toastr.error("Tata Cara Masih Kosong!");
          }else{
            var tata_cara     = DataInfAnastesi[0].tata_cara.split(',');
          }
          var tata_cara_c   = DataInfAnastesi[0].tata_cara_c;
          var tujuan        = DataInfAnastesi[0].tujuan;
          var tujuan_c      = DataInfAnastesi[0].tujuan_c;
          var resiko        = DataInfAnastesi[0].resiko;
          var resiko_c      = DataInfAnastesi[0].resiko_c;
          var komplikasi    = DataInfAnastesi[0].komplikasi;
          var komplikasi_c  = DataInfAnastesi[0].komplikasi_c;
          var prognosis     = DataInfAnastesi[0].prognosis;
          var prognosis_c   = DataInfAnastesi[0].prognosis_c;
          if ((DataInfAnastesi[0].alternatif == 0)||(DataInfAnastesi[0].alternatif == null)){
            var alternatif  = 0;
            toastr.error("Alternatif Masih Kosong!");
          }else{
            var alternatif  = DataInfAnastesi[0].alternatif.split(',');
          }
          var alternatif_c  = DataInfAnastesi[0].alternatif_c;
          if ((DataInfAnastesi[0].next_point == 0)||(DataInfAnastesi[0].next_point == null)){
            var next_point  = 0;
            toastr.error("Hal yg dilakukan Masih Kosong!");
          }else{
            var next_point  = DataInfAnastesi[0].next_point.split(',');
          }
          var next_point_c  = DataInfAnastesi[0].next_point_c;
          var tgl_input     = DataInfAnastesi[0].tgl_input;
          var aktif         = DataInfAnastesi[0].aktif;
          var ttd_dokter    = DataInfAnastesi[0].ttd_dokter;
          var ttd_pasien    = DataInfAnastesi[0].ttd_pasien;
          var iddokter      = DataInfAnastesi[0].iddokter;
          var iduserpemberi = DataInfAnastesi[0].iduserpemberi;
          var id_pegawai    = DataInfAnastesi[0].id_pegawai;

          $('#dacinformasisedasi_atgl').val(tgl_input);
          $('#dacinformasisedasi_apj1Id').val(iddokter);
          $('#dacinformasisedasi_apj2Id').val(iduserpemberi);

          if (diagnosis_c != 1){
            document.getElementById('dacinformasisedasi_diagnosa').value  = id_penyakit;
            $("#dacinformasisedasi_c1").prop("checked", false);
            toastr.error("Diagnosis Belum di Ceklist!");
          }else{
            document.getElementById('dacinformasisedasi_diagnosa').value  = id_penyakit;
            $("#dacinformasisedasi_c1").prop("checked", true);
          }

          if (dasar_diag_c != 1){
            document.getElementById('dacinformasisedasi_dasar').value  = dasar_diag;
            $("#dacinformasisedasi_c2").prop("checked", false);
            toastr.error("Dasar Diagnosis Belum di Ceklist!");
          }else{
            document.getElementById('dacinformasisedasi_dasar').value  = dasar_diag;
            $("#dacinformasisedasi_c2").prop("checked", true);
          }

          if (indikasi_c != 1){
            $("#dacinformasisedasi_c4").prop("checked", false);
            document.getElementById('dacinformasisedasi_indikasi').value  = indikasi;
            toastr.error("Indikasi Tindakan Belum di Ceklist!");
          }else{
            $("#dacinformasisedasi_c4").prop("checked", true);
            document.getElementById('dacinformasisedasi_indikasi').value  = indikasi;
          }

          if (tujuan_c != 1){
            $("#dacinformasisedasi_c6").prop("checked", false);
            document.getElementById('dacinformasisedasi_tujuan').value  = tujuan;
            toastr.error("Tujuan Belum di Ceklist!");
          }else{
            $("#dacinformasisedasi_c6").prop("checked", true);
            document.getElementById('dacinformasisedasi_tujuan').value  = tujuan;
          }

          if (resiko_c != 1){
            $("#dacinformasisedasi_c7").prop("checked", false);
            document.getElementById('dacinformasisedasi_risiko').value  = resiko;
            toastr.error("Resiko Belum di Ceklist!");
          }else{
            $("#dacinformasisedasi_c7").prop("checked", true);
            document.getElementById('dacinformasisedasi_risiko').value  = resiko;
          }

          if (prognosis_c != 1){
            $("#dacinformasisedasi_c9").prop("checked", false);
            document.getElementById('dacinformasisedasi_prognosis').value  = prognosis;
            toastr.error("Prognosis Belum di Ceklist!");
          }else{
            $("#dacinformasisedasi_c9").prop("checked", true);
            document.getElementById('dacinformasisedasi_prognosis').value  = prognosis;
          }

          if (tindakan_c != 1){
            $("#dacinformasisedasi_c3").prop("checked", false);
            $("input[name='dacinformasisedasi_tindakanId'][value='"+tindakan+"']").prop('checked', true);
            toastr.error("Tindakan Kedokteran Belum di Ceklist!");
          }else{
            $("#dacinformasisedasi_c3").prop("checked", true);
            $("input[name='dacinformasisedasi_tindakanId'][value='"+tindakan+"']").prop('checked', true);
          }

          if (tata_cara_c != 1){
            $("#dacinformasisedasi_c5").prop("checked", false);
            for(var a = 0; a < tata_cara.length; a++){
              $("#dacinformasisedasi_tatacaralist_"+tata_cara[a]).prop("checked", true);
            }
            toastr.error("Tata Cara Belum di Ceklist!");
          }else{
            $("#dacinformasisedasi_c5").prop("checked", true);
            for(var a = 0; a < tata_cara.length; a++){
              $("#dacinformasisedasi_tatacaralist_"+tata_cara[a]).prop("checked", true);
            }
          }

          if (komplikasi_c != 1){
            $("#dacinformasisedasi_c8").prop("checked", false);
            $("input[name='dacinformasisedasi_komplikasiId'][value='"+komplikasi+"']").prop('checked', true);
            toastr.error("Komplikasi Belum di Ceklist!");
          }else{
            $("#dacinformasisedasi_c8").prop("checked", true);
            $("input[name='dacinformasisedasi_komplikasiId'][value='"+komplikasi+"']").prop('checked', true);
          }

          if (alternatif_c != 1){
            $("#dacinformasisedasi_c10").prop("checked", false);
            for(var a = 0; a < alternatif.length; a++){
              $("#dacinformasisedasi_alternatiflist_"+alternatif[a]).prop("checked", true);
            }
            toastr.error("Alternatif Belum di Ceklist!");
          }else{
            $("#dacinformasisedasi_c10").prop("checked", true);
            for(var a = 0; a < alternatif.length; a++){
              $("#dacinformasisedasi_alternatiflist_"+alternatif[a]).prop("checked", true);
            }
          }

          if (next_point_c != 1){
            $("#dacinformasisedasi_c11").prop("checked", false);
            for(var a = 0; a < next_point.length; a++){
              $("#dacinformasisedasi_penyelamatanlist_"+next_point[a]).prop("checked", true);
            }
            toastr.error("Hal yg dilakukan Belum di Ceklist!");
          }else{
            $("#dacinformasisedasi_c11").prop("checked", true);
            for(var a = 0; a < next_point.length; a++){
              $("#dacinformasisedasi_penyelamatanlist_"+next_point[a]).prop("checked", true);
            }
          }

          var imgPasien = document.getElementById('GambarTtdPasien_AnastesiAdesi'); 
          imgPasien.src = ttd_pasien;

          var imgDokter = document.getElementById('GambarTtdDokter_AnastesiAdesi'); 
          imgDokter.src = ttd_dokter;
          
          document.getElementById('loading_informasi_anestesi_sedasi').style.display = 'none';
          var id = "linkinformasi_anestesi_sedasi";
          selesai(id);
      }else{
        document.getElementById('loading_informasi_anestesi_sedasi').style.display = 'none';
      }
    }else{
      toastr.error("Informasi Anestesi Sedasi Masih Kosong!!");
      document.getElementById('loading_informasi_anestesi_sedasi').style.display = 'none';
      var id = "linkinformasi_anestesi_sedasi";
      belumselesai(id);
    }
  })
}

function pegawai() {
  apiPOST('Rawatjalan/pegawai', null,hasil=>{
    var a=hasil['data'];
    var pegawai='';
    for (var i = 0; i < a.length; i++) {
      pegawai+='<option value="'+a[i]['id_pegawai']+'">'+a[i]['nama_pegawai']+'</option>';
    }
    document.getElementById('dacinformasisedasi_apj1Id').innerHTML=pegawai;
    document.getElementById('dacinformasisedasi_apj2Id').innerHTML=pegawai;
  });
}
</script>