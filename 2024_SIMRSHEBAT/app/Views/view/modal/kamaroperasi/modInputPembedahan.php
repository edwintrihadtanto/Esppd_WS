<?php
date_default_timezone_set("Asia/Jakarta");
?>
<div class="content modal fade" id="showdetailinputpembedahan">
    <div class="container-fluid">
        <div class="modal-dialog modal-xl" style="min-width: 100%;">

            <div class="modal-content" style="overflow-x: hidden;">
                <div class="overlay-wrapper" id="inputpembedahan_loadingawal">
                  <div class="overlay dark">
                    <i class="fas fa-3x fa-sync-alt fa-spin"></i>            
                  </div>
                </div>

                <div class="col-md-12 p-2">
                    <div class="card-header p-1 darkgrey-custom">
                        <h3 class="card-title p-1">Dokumen Input Pembedahan</h3>
                        <div class="card-tools p-1">
                            <button type="button" class="btn btn-tool" onclick="showInputPembedahan()">
                                <i class="fa fa-sync-alt" style="color: black;"></i>
                            </button>  
                            <button type="button" class="btn btn-tool" data-dismiss="modal" aria-label="Close">
                              <i class="fa fa-times" style="color: black;"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-2" id="Divinputpembedahan" >
                        <div class="card"><!-- KONDISI PASIEN -->
                            <div class="card-header" style="background-color:black;">
                                <h3 class="card-title" style="color:white;">KONDISI PASIEN</h3>
                                <div class="card-tools"> 
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>             
                                </div>
                            </div>
                            <div class="card-body row">
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <label class="col-form-label">Berat Badan</label>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <input type="number" id="qacbedahemr_beratbadan" maxlength="20" class="form-control form-control-sm">
                                                    <div class="input-group-prepend">
                                                        <button type="button" class="btn btn-outline-info btn-xs">Kg</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Suhu Pasien</label>
                                            <div class="col-sm-auto">
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input class="custom-control-input" id="qacbedahemr_suhupasien1" type="radio" checked="checked" value="true" name="suhupasien"><label class="custom-control-label" for="qacbedahemr_suhupasien1">&lt;
                                                    37,5 C </label>
                                                </div>
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input class="custom-control-input" id="qacbedahemr_suhupasien2" type="radio" value="false" name="suhupasien"> <label class="custom-control-label" for="qacbedahemr_suhupasien2">&gt;= 37,5 C</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Gula Darah</label>
                                            <div class="col-md-7">
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input class="custom-control-input" id="qacbedahemr_guladarah1" type="radio" checked="checked" value="true" name="guladarah"> <label class="custom-control-label" for="qacbedahemr_guladarah1">&lt;= 200 </label>
                                                </div>
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input class="custom-control-input" id="qacbedahemr_guladarah2" type="radio" value="false" name="guladarah"> <label class="custom-control-label" for="qacbedahemr_guladarah2">&gt;
                                                    200</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Merokok</label>
                                            <div class="col-md-7">
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input name="qacbedahemr_merokok" value="1" type="radio" class="custom-control-input" id="qacbedahemr_merokok_1" checked="checked">
                                                    <label class="custom-control-label" for="qacbedahemr_merokok_1">Tidak</label>
                                                </div>
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input name="qacbedahemr_merokok" value="2" type="radio" class="custom-control-input" id="qacbedahemr_merokok_2">
                                                    <label class="custom-control-label" for="qacbedahemr_merokok_2">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Kelengkapan
                                            Informed consent</label>
                                            <div class="col-md-7">
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input name="qacbedahemr_informedconsent" value="1" type="radio" class="custom-control-input" id="qacbedahemr_informedconsent_1">
                                                    <label class="custom-control-label" for="qacbedahemr_informedconsent_1">Tidak</label>
                                                </div>
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input name="qacbedahemr_informedconsent" value="2" type="radio" class="custom-control-input" id="qacbedahemr_informedconsent_2" checked="checked">
                                                    <label class="custom-control-label" for="qacbedahemr_informedconsent_2">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <label class="col-form-label">Albumin</label>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <input type="number" id="qacbedahemr_albumin" maxlength="20" class="form-control form-control-sm">
                                                    <div class="input-group-prepend">
                                                        <button type="button" class="btn btn-outline-info btn-xs">g/dl</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">Penyakit Saat Ini</label>
                                            <div class="col-md-7">
                                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <div class="row custom-control custom-checkbox custom-control-inline">
                                        <input name="qacbedahemr_penyakitsaatini" value="1" type="checkbox" class="custom-control-input" id="qacbedahemr_penyakitsaatini1">
                                        <label class="custom-control-label" for="qacbedahemr_penyakitsaatini1">DM</label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <div class="row custom-control custom-checkbox custom-control-inline">
                                        <input name="qacbedahemr_penyakitsaatini" value="2" type="checkbox" class="custom-control-input" id="qacbedahemr_penyakitsaatini2">
                                        <label class="custom-control-label" for="qacbedahemr_penyakitsaatini2">Hipertensi</label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <div class="row custom-control custom-checkbox custom-control-inline">
                                        <input name="qacbedahemr_penyakitsaatini" value="3" type="checkbox" class="custom-control-input" id="qacbedahemr_penyakitsaatini3">
                                        <label class="custom-control-label" for="qacbedahemr_penyakitsaatini3">GGK</label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <div class="row custom-control custom-checkbox custom-control-inline">
                                        <input name="qacbedahemr_penyakitsaatini" value="4" type="checkbox" class="custom-control-input" id="qacbedahemr_penyakitsaatini4">
                                        <label class="custom-control-label" for="qacbedahemr_penyakitsaatini4">NA</label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <div class="row custom-control custom-checkbox custom-control-inline">
                                        <input name="qacbedahemr_penyakitsaatini" value="5" type="checkbox" class="custom-control-input" id="qacbedahemr_penyakitsaatini5">
                                        <label class="custom-control-label" for="qacbedahemr_penyakitsaatini5">Sepsis</label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <div class="row custom-control custom-checkbox custom-control-inline">
                                        <input name="qacbedahemr_penyakitsaatini" value="6" type="checkbox" class="custom-control-input" id="qacbedahemr_penyakitsaatini6" onclick="lainnya_penyakitsaatini()">
                                        <label class="custom-control-label" for="qacbedahemr_penyakitsaatini6">Lainnya</label>
                                      </div>
                                      <input type="search" size="35" maxlength="20" id="qacbedahemr_penyakitsaatiniisi" class="form-control form-control-sm" style="display: none;">
                                    </div>
                                  </div>
                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Assesment Pra OP Oleh DPJP</label>
                                            <div class="col-md-7">
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input name="qacbedahemr_assesmentdpjp" value="1" type="radio" class="custom-control-input" id="qacbedahemr_assesmentdpjp_1">
                                                    <label class="custom-control-label" for="qacbedahemr_assesmentdpjp_1">Tidak</label>
                                                </div>
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input name="qacbedahemr_assesmentdpjp" value="2" type="radio" class="custom-control-input" id="qacbedahemr_assesmentdpjp_2" checked="checked"> 
                                                    <label class="custom-control-label" for="qacbedahemr_assesmentdpjp_2" >Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Assesment Pra OP Oleh Anastesi</label>
                                            <div class="col-md-7">
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input name="qacbedahemr_assesmentanastesi" value="1" type="radio" class="custom-control-input" id="qacbedahemr_assesmentanastesi_1">
                                                    <label class="custom-control-label" for="qacbedahemr_assesmentanastesi_1">Tidak</label>
                                                </div>
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input name="qacbedahemr_assesmentanastesi" value="2" type="radio" class="custom-control-input" id="qacbedahemr_assesmentanastesi_2" checked="checked">
                                                    <label class="custom-control-label" for="qacbedahemr_assesmentanastesi_2">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Screening MRSA</label>
                                            <div class="col-md-7">
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input onclick="document.getElementById('qacbedahemr_changediv4').style.display='none'" name="qacbedahemr_screningmrsa" value="1" type="radio" class="custom-control-input" id="qacbedahemr_screningmrsa_1">
                                                    <label class="custom-control-label" for="qacbedahemr_screningmrsa_1">Tidak</label>
                                                </div>
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input onclick="document.getElementById('qacbedahemr_changediv4').style.display='block'" name="qacbedahemr_screningmrsa" value="2" type="radio" class="custom-control-input" id="qacbedahemr_screningmrsa_2" checked="checked">
                                                    <label class="custom-control-label" for="qacbedahemr_screningmrsa_2">Ya</label>
                                                </div>
                                                <div id="qacbedahemr_changediv4" style="display: none">
                                                    <div class="col-md-auto">
                                                        <div class="custom-control custom-checkbox custom-control-inline">
                                                            <input class="custom-control-input" id="qacbedahemr_screningmrsahasil1" checked="checked" type="radio" value="-" name="screningmrsahasil"> <label class="custom-control-label" for="qacbedahemr_screningmrsahasil1">(-)</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox custom-control-inline">
                                                            <input class="custom-control-input" id="qacbedahemr_screningmrsahasil2" type="radio" value="+" name="screningmrsahasil"> <label class="custom-control-label" for="qacbedahemr_screningmrsahasil2">(+)</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Pencukuran</label>
                                            <div class="col-4">
                                                <select class="form-control form-control-sm" id="qacbedahemr_pencukuran" name="Pencukuran">
                                                    <option value="1">Clipper</option>
                                                    <option value="2">Silet</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <label class="col-form-label">Waktu Pencukuran</label>
                                            </div>
                                            <div class="col-md-auto">
                                                <div class="input-group date" id="qacbedahemr_dwaktupencukuran">
                                                    <input id="qacbedahemr_waktupencukuran" name="waktupencukuran" type="time" class="form-control form-control-sm">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Mechanical   Bowel</label>
                                            <div class="col-md-7">
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input name="qacbedahemr_mechanicalbowel" value="1" type="radio" class="custom-control-input" id="qacbedahemr_mechanicalbowel_1">
                                                    <label class="custom-control-label" for="qacbedahemr_mechanicalbowel_1">Tidak</label>
                                                </div>
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input name="qacbedahemr_mechanicalbowel" value="2" type="radio" class="custom-control-input" id="qacbedahemr_mechanicalbowel_2" checked="checked">
                                                    <label class="custom-control-label" for="qacbedahemr_mechanicalbowel_2">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Steroid Jangka   Panjang</label>
                                            <div class="col-md-7">
                                                <div class="form-check checkbox">
                                                    <input class="form-check-input" id="" type="checkbox">
                                                </div>
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input name="qacbedahemr_steroidjangkapanjang" value="1" type="radio" class="custom-control-input" id="qacbedahemr_steroidjangkapanjang_1">
                                                    <label class="custom-control-label" for="qacbedahemr_steroidjangkapanjang_1">Tidak</label>
                                                </div>
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input name="qacbedahemr_steroidjangkapanjang" value="2" type="radio" class="custom-control-input" id="qacbedahemr_steroidjangkapanjang_2" checked="checked">
                                                    <label class="custom-control-label" for="qacbedahemr_steroidjangkapanjang_2">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Radioterapi Sebelumnya</label>
                                            <div class="col-md-7">
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input name="qacbedahemr_radiotrapisebelumnya" value="1" type="radio" class="custom-control-input" id="qacbedahemr_radiotrapisebelumnya_1" checked="checked">
                                                    <label class="custom-control-label" for="qacbedahemr_radiotrapisebelumnya_1">Tidak</label>
                                                </div>
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input name="qacbedahemr_radiotrapisebelumnya" value="2" type="radio" class="custom-control-input" id="qacbedahemr_radiotrapisebelumnya_2">
                                                    <label class="custom-control-label" for="qacbedahemr_radiotrapisebelumnya_2">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Mandi Sebelum OP</label>
                                            <div class="col-4">
                                                <select class="form-control form-control-sm" id="qacbedahemr_mandisebelumop" name="mandisebelumop">
                                                    <option value="1">Sabun Biasa</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <label class="col-form-label" title="profilaksis">Profilaksis</label>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="form-check checkbox">
                                                    <input class="form-check-input" id="" type="checkbox">
                                                </div>
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input onclick="document.getElementById('qacbedahemr_changediv2').style.display='none'" name="qacbedahemr_prokfilaksis" value="1" type="radio" class="custom-control-input" id="qacbedahemr_prokfilaksis_1" checked>
                                                    <label class="custom-control-label" for="qacbedahemr_prokfilaksis_1">Tidak</label>
                                                </div>
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input onclick="document.getElementById('qacbedahemr_changediv2').style.display='block'" name="qacbedahemr_prokfilaksis" value="2" type="radio" class="custom-control-input" id="qacbedahemr_prokfilaksis_2">
                                                    <label class="custom-control-label" for="qacbedahemr_prokfilaksis_2">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row" id="qacbedahemr_changediv2" style="display: none">
                                            <div class="col-md-4">
                                                <label class="col-form-label">Nama Obat</label>
                                            </div>
                                            <div class="col-md-7">
                                                <input id="qacbedahemr_prokfilaksisobat" maxlength="20" class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="col-form-label">Dosis</label>
                                            </div>
                                            <div class="col-md-7">
                                                <input id="qacbedahemr_prokfilaksidosis" maxlength="20" class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="col-form-label">Diberikan Jam</label>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group date" id="qacbedahemr_dprokfilaksidiberikanjam" data-target-input="nearest">
                                                    <input id="qacbedahemr_prokfilaksidiberikanjam" name="prokfilaksidiberikanjam" type="time" class="form-control form-control-sm">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">Penyakit Infeksi Lain</label>
                                            <div class="col-md-8">
                                                <div class="row pl-2">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <div class="row custom-control custom-checkbox custom-control-inline">
                                        <input name="qacbedahemr_penyakitinfeksi" value="1" type="checkbox" class="custom-control-input" id="qacbedahemr_penyakitinfeksi1">
                                        <label class="custom-control-label" for="qacbedahemr_penyakitinfeksi1">Infeksi Kulit</label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <div class="row custom-control custom-checkbox custom-control-inline">
                                        <input name="qacbedahemr_penyakitinfeksi" value="2" type="checkbox" class="custom-control-input" id="qacbedahemr_penyakitinfeksi2">
                                        <label class="custom-control-label" for="qacbedahemr_penyakitinfeksi2">Infeksi Mata</label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <div class="row custom-control custom-checkbox custom-control-inline">
                                        <input name="qacbedahemr_penyakitinfeksi" value="3" type="checkbox" class="custom-control-input" id="qacbedahemr_penyakitinfeksi3">
                                        <label class="custom-control-label" for="qacbedahemr_penyakitinfeksi3">Infeksi Paru</label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <div class="row custom-control custom-checkbox custom-control-inline">
                                        <input name="qacbedahemr_penyakitinfeksi" value="4" type="checkbox" class="custom-control-input" id="qacbedahemr_penyakitinfeksi4">
                                        <label class="custom-control-label" for="qacbedahemr_penyakitinfeksi4">Infeksi Mulut/Gigi</label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <div class="row custom-control custom-checkbox custom-control-inline">
                                        <input name="qacbedahemr_penyakitinfeksi" value="5" type="checkbox" class="custom-control-input" id="qacbedahemr_penyakitinfeksi5">
                                        <label class="custom-control-label" for="qacbedahemr_penyakitinfeksi5">Infeksi THT</label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <div class="row custom-control custom-checkbox custom-control-inline">
                                        <input name="qacbedahemr_penyakitinfeksi" value="6" type="checkbox" class="custom-control-input" id="qacbedahemr_penyakitinfeksi6">
                                        <label class="custom-control-label" for="qacbedahemr_penyakitinfeksi6">Infeksi G1 Tract</label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-auto">
                                    <div class="form-group">
                                      <div class="row custom-control custom-checkbox custom-control-inline">
                                        <input name="qacbedahemr_penyakitinfeksi" value="7" type="checkbox" class="custom-control-input" id="qacbedahemr_penyakitinfeksi7" onclick="lainnya_penyakitinfeksisaatini()">
                                        <label class="custom-control-label" for="qacbedahemr_penyakitinfeksi7">Lainnya</label>
                                      </div>
                                      <input type="search" size="35" maxlength="20" id="qacbedahemr_penyakitinfeksiisi" class="form-control form-control-sm" style="display: none;">
                                    </div>
                                  </div>
                                </div>                              
                                            </div>
                                        </div>
                                    </div>
                                </div>          
                            </div>
                        </div>
                        <div class="card"><!-- KONDISI PEMBEDAHAN -->
                            <div class="card-header" style="background-color:black;">
                                <h3 class="card-title" style="color:white;">KONDISI PEMBEDAHAN</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>             
                                </div>
                            </div>
                            <div class="card-body row">
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Ruang Oprasi</label>
                                            <div class="col-4">
                                                <select class="form-control form-control-sm" id="qacbedahemr_ruangoprasi" name="ruangoprasi">
                                                    <option value="1">OK 1</option>
                                                    <option value="2">OK 2</option>
                                                    <option value="3">OK 3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Operasi Karna Trauma</label>
                                            <div class="col-md-7">
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input name="qacbedahemr_oprasikarnatrauma" value="1" type="radio" class="custom-control-input" id="qacbedahemr_oprasikarnatrauma_1" checked>
                                                    <label class="custom-control-label" for="qacbedahemr_oprasikarnatrauma_1">Tidak</label>
                                                </div>
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input name="qacbedahemr_oprasikarnatrauma" value="2" type="radio" class="custom-control-input" id="qacbedahemr_oprasikarnatrauma_2">
                                                    <label class="custom-control-label" for="qacbedahemr_oprasikarnatrauma_2">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">SSC</label>
                                            <div class="col-md-7">
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input name="qacbedahemr_ssc" value="1" type="radio" class="custom-control-input" id="qacbedahemr_ssc_1" checked>
                                                    <label class="custom-control-label" for="qacbedahemr_ssc_1">Tidak</label>
                                                </div>
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input name="qacbedahemr_ssc" value="2" type="radio" class="custom-control-input" id="qacbedahemr_ssc_2">
                                                    <label class="custom-control-label" for="qacbedahemr_ssc_2">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Prosedure Operasi</label>
                                            <div class="col-md-7">
                                                <input type="search" size="50" maxlength="50" id="qacbedahemr_prosedureoprasi" class="form-control form-control-sm">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <label class="col-form-label">Diagnosa</label>
                                            </div>
                                            <div class="col-md-7">
                                                <textarea cols="47" rows="3" id="qacbedahemr_diagnosa" class="form-control form-control-sm"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Multiprosedure Dg insisi yang sama</label>
                                            <div class="col-md-7">
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input name="qacbedahemr_multiprosedure" value="1" type="radio" class="custom-control-input" id="qacbedahemr_multiprosedure_1" checked>
                                                    <label class="custom-control-label" for="qacbedahemr_multiprosedure_1">Tidak</label>
                                                </div>
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input name="qacbedahemr_multiprosedure" value="2" type="radio" class="custom-control-input" id="qacbedahemr_multiprosedure_2">
                                                    <label class="custom-control-label" for="qacbedahemr_multiprosedure_2">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">ASA Score</label>
                                            <div class="col-md-auto">
                                                <select class="form-control form-control-sm" id="qacbedahemr_asascore" name="asascore">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Klasifikasi Luka</label>
                                            <div class="col-md-auto">
                                                <select class="form-control form-control-sm" id="qacbedahemr_klasifikasiluka" name="klasifikasiluka">
                                                    <option value="1">Bersih</option>
                                                    <option value="2">Bersih Terkontaminasi</option>
                                                    <option value="3">Terkontaminasi</option>
                                                    <option value="4">Kotor</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <label class="col-form-label">Sirkulasi Udara OK</label>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="input-group input-group-sm">
                                                    <input type="number" name="bb" id="qacbedahemr_sirkulasiudaraok" maxlength="20" class="form-control form-control-sm">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">x/Jam</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Tekanan Udara OK</label>
                                            <div class="col-md-7">
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input class="custom-control-input" id="qacbedahemr_tekananudara1" checked="checked" type="radio" value="true" name="tekananudara">
                                                    <label class="custom-control-label" for="qacbedahemr_tekananudara1">(-)</label>
                                                </div>
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input class="custom-control-input" id="qacbedahemr_tekananudara2" type="radio" value="false" name="tekananudara"><label class="custom-control-label" for="qacbedahemr_tekananudara2">(+)</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <label class="col-form-label">Suhu Ruangan</label>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group input-group-sm">
                                                    <input type="number" name="suhuruangang" id="qacbedahemr_suhuruang" maxlength="20" class="form-control form-control-sm">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">&deg;C</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <label class="col-form-label">Jumlah Staf</label>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group input-group-sm">
                                                    <input type="number" name="jumlahstaf" id="qacbedahemr_jumlahstaf" maxlength="20" class="form-control form-control-sm">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">Orang</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Air Count OK</label>
                                            <div class="col-md-7">
                                                <input type="search" size="35" maxlength="20" id="qacbedahemr_aircountok" class="form-control form-control-sm">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Jamur AC</label>
                                            <div class="col-md-7">
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input name="qacbedahemr_jamurac" value="1" type="radio" class="custom-control-input" id="qacbedahemr_jamurac_1" checked>
                                                    <label class="custom-control-label" for="qacbedahemr_jamurac_1">Tidak</label>
                                                </div>
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input name="qacbedahemr_jamurac" value="2" type="radio" class="custom-control-input" id="qacbedahemr_jamurac_2">
                                                    <label class="custom-control-label" for="qacbedahemr_jamurac_2">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Kelembapan OK</label>
                                            <div class="col-md-7">
                                                <input type="search" size="35" maxlength="20" id="qacbedahemr_kelembabanok" class="form-control form-control-sm">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Drain</label>
                                            <div class="col-md-7">
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input name="qacbedahemr_drain" value="1" type="radio" class="custom-control-input" id="qacbedahemr_drain_1" checked>
                                                    <label class="custom-control-label" for="qacbedahemr_drain_1">Tidak</label>
                                                </div>
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input name="qacbedahemr_drain" value="2" type="radio" class="custom-control-input" id="qacbedahemr_drain_2">
                                                    <label class="custom-control-label" for="qacbedahemr_drain_2">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Posisi Drain</label>
                                            <div class="col-md-7">
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input class="custom-control-input" id="qacbedahemr_posisidrain1" checked="checked" type="radio" value="1" name="posisidrain"><label class="custom-control-label" for="qacbedahemr_posisidrain1">Tertutup</label>
                                                </div>
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input class="custom-control-input" id="qacbedahemr_posisidrain2" type="radio" value="2" name="posisidrain"><label class="custom-control-label" for="qacbedahemr_posisidrain2">Terbuka</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Jenis Drain</label>
                                            <div class="col-md-7">
                                                <input type="search" size="35" maxlength="20" id="qacbedahemr_jenidrain" class="form-control form-control-sm">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">No Registrasi</label>
                                            <div class="col-md-7">
                                                <input type="search" size="35" maxlength="20" id="qacbedahemr_noregis" class="form-control form-control-sm">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Sterilisasi Oleh CSSD</label>
                                            <div class="col-md-7">
                                                <div class="form-check checkbox">
                                                    <input class="form-check-input" id="" type="checkbox">
                                                </div>
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input name="qacbedahemr_sterilisasi" value="1" type="radio" class="custom-control-input" id="qacbedahemr_sterilisasi_1" checked>
                                                    <label class="custom-control-label" for="qacbedahemr_sterilisasi_1">Tidak</label>
                                                </div>
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input name="qacbedahemr_sterilisasi" value="2" type="radio" class="custom-control-input" id="qacbedahemr_sterilisasi_2">
                                                    <label class="custom-control-label" for="qacbedahemr_sterilisasi_2">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <label class="col-form-label" title="antibiotiktambahan">Antibiotik Tambahan Saat OP</label>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="form-check checkbox">
                                                    <input class="form-check-input" id="" type="checkbox">
                                                </div>
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input onclick="antibiotikcek()" name="qacbedahemr_antibiotiktambahan" value="1" type="radio" class="custom-control-input" id="qacbedahemr_antibiotiktambahan_1" checked>
                                                    <label class="custom-control-label" for="qacbedahemr_antibiotiktambahan_1">Tidak</label>
                                                </div>
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input onclick="antibiotikcek()" name="qacbedahemr_antibiotiktambahan" value="2" type="radio" class="custom-control-input" id="qacbedahemr_antibiotiktambahan_2">
                                                    <label class="custom-control-label" for="qacbedahemr_antibiotiktambahan_2">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row" id="qacbedahemr_changediv3" style="display: none">
                                            <div class="col-md-4">
                                                <label class="col-form-label">Nama Obat</label>
                                            </div>
                                            <div class="col-md-7">
                                                <input id="qacbedahemr_antibiotiktambahanobat" maxlength="20" class="form-control form-control-sm" type="search">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="col-form-label">Dosis</label>
                                            </div>
                                            <div class="col-md-7">
                                                <input id="qacbedahemr_antibiotiktambahandosis" maxlength="20" class="form-control form-control-sm" type="search">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="col-form-label">Diberikan Jam</label>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group date" id="qacbedahemr_dantibiotiktambahandiberikanjam">
                                                    <input id="qacbedahemr_antibiotiktambahandiberikanjam" name="antibiotiktambahandiberikanjam" type="time" class="form-control form-control-sm" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">Disinfeksi  Kulit</label>
                                            <div class="col-md-7">
                                                <div class="row pl-2">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <div class="row custom-control custom-checkbox custom-control-inline">
                                        <input name="qacbedahemr_disinfeksikulit" value="1" type="checkbox" class="custom-control-input" id="qacbedahemr_disinfeksikulit1">
                                        <label class="custom-control-label" for="qacbedahemr_disinfeksikulit1">Chlorhexidine</label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <div class="row custom-control custom-checkbox custom-control-inline">
                                        <input name="qacbedahemr_disinfeksikulit" value="2" type="checkbox" class="custom-control-input" id="qacbedahemr_disinfeksikulit2">
                                        <label class="custom-control-label" for="qacbedahemr_disinfeksikulit2">Povidone Iodine</label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <div class="row custom-control custom-checkbox custom-control-inline">
                                        <input name="qacbedahemr_disinfeksikulit" value="3" type="checkbox" class="custom-control-input" id="qacbedahemr_disinfeksikulit3">
                                        <label class="custom-control-label" for="qacbedahemr_disinfeksikulit3">Alkohol 70%</label>
                                      </div>
                                    </div>
                                  </div>
                                  
                                  <div class="col-md-auto">
                                    <div class="form-group">
                                      <div class="row custom-control custom-checkbox custom-control-inline">
                                        <input name="qacbedahemr_disinfeksikulit" value="4" type="checkbox" class="custom-control-input" id="qacbedahemr_disinfeksikulit4" onclick="lainnya_disinfeksikulit()">
                                        <label class="custom-control-label" for="qacbedahemr_disinfeksikulit4">Lainnya</label>
                                      </div>
                                      <input type="search" size="35" maxlength="20" id="qacbedahemr_disinfeksikulitisi" class="form-control form-control-sm" style="display: none;">
                                    </div>
                                  </div>
                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">Indikator Instrumen/Alat Steril</label>
                                            <div class="col-md-7">
                                                <div class="row pl-2">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <div class="row custom-control custom-checkbox custom-control-inline">
                                        <input name="qacbedahemr_indikatorinstrumen" value="1" type="checkbox" class="custom-control-input" id="qacbedahemr_indikatorinstrumen1">
                                        <label class="custom-control-label" for="qacbedahemr_indikatorinstrumen1">Internal</label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <div class="row custom-control custom-checkbox custom-control-inline">
                                        <input name="qacbedahemr_indikatorinstrumen" value="2" type="checkbox" class="custom-control-input" id="qacbedahemr_indikatorinstrumen2">
                                        <label class="custom-control-label" for="qacbedahemr_indikatorinstrumen2">External</label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-auto">
                                    <div class="form-group">
                                      <div class="row custom-control custom-checkbox custom-control-inline">
                                        <input name="qacbedahemr_indikatorinstrumen" value="3" type="checkbox" class="custom-control-input" id="qacbedahemr_indikatorinstrumen3" onclick="lainnya_alat()">
                                        <label class="custom-control-label" for="qacbedahemr_indikatorinstrumen3">Lainnya</label>
                                      </div>
                                      <input type="search" size="35" maxlength="20" id="qacbedahemr_indikatorinstrumenlainya" class="form-control form-control-sm" style="display: none;">
                                    </div>
                                  </div>
                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card"><!-- DATA PEMBEDAHAN -->
                            <div class="card-header" style="background-color:black;">
                                <h3 class="card-title" style="color:white;">DATA PEMBEDAHAN</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>             
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="col-lg-12 row">
                                    <div class="col-md-6">
                                        <!-- <div class="form-group row">
                                            <div class="col-md-3">
                                                <label class="col-form-label" title="ID">ID</label>
                                            </div>
                                            <div class="col-md-5">
                                                <label id="qacbedahemr_lid" class="col-form-label">-</label>
                                            </div>
                                        </div> -->
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label class="col-form-label" title="Jenis Pembedahan">Jenis Pembedahan</label>
                                            </div>
                                            <div class="col-md-6">
                                                <select name="jenistrans_id" id="qacbedahemr_jenistrans_id" class="form-control form-control-sm">
                                                    <option value="0">-- Pilih Jenis Pembedahan --</option>
                                                    <option value="1">SC 1</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label class="col-form-label">Dokter Operator 1</label>
                                            </div>
                                            <div class="col-md-6">
                                                <select id="qacbedahemr_op1_id" name="op1" class="form-control form-control-sm"></select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label class="col-form-label">Dokter Operator 2</label>
                                            </div>
                                            <div class="col-md-6">
                                                <select id="qacbedahemr_op2_id" name="op2" class="form-control form-control-sm" ></select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label class="col-form-label">Dokter Anestesi 1</label>
                                            </div>
                                            <div class="col-md-6">
                                                <select id="qacbedahemr_an_id" name="an" class="form-control form-control-sm"></select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label class="col-form-label">Dokter Anestesi 2</label>
                                            </div>
                                            <div class="col-md-6">
                                                <select id="qacbedahemr_an2_id" name="an" class="form-control form-control-sm" ></select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label class="col-form-label">Perawat Asisten 1</label>
                                            </div>
                                            <div class="col-md-6">
                                                <select id="qacbedahemr_assb1_id" name="assb1" class="form-control form-control-sm"></select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label class="col-form-label">Perawat Asisten 2</label>
                                            </div>
                                            <div class="col-md-6">
                                                <select id="qacbedahemr_assb2_id" name="assb2" class="form-control form-control-sm"></select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label class="col-form-label">Perawat Instrument</label>
                                            </div>
                                            <div class="col-md-6">
                                                <select id="qacbedahemr_ins_id" name="ins" class="form-control form-control-sm" ></select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label class="col-form-label">Perawat Omloop 1</label>
                                            </div>
                                            <div class="col-md-6">
                                                <select id="qacbedahemr_omloop_id" name="omloop" class="form-control form-control-sm"></select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label class="col-form-label">Perawat Omloop 2</label>
                                            </div>
                                            <div class="col-md-6">
                                                <select id="qacbedahemr_omloop2_id" name="omloop2" class="form-control form-control-sm" ></select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label class="col-form-label">Perawat Omloop 3</label>
                                            </div>
                                            <div class="col-md-6">
                                                <select id="qacbedahemr_omloop3_id" name="omloop3" class="form-control form-control-sm" ></select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label class="col-form-label">Perawat Omloop 4</label>
                                            </div>
                                            <div class="col-md-6">
                                                <select id="qacbedahemr_omloop4_id" name="omloop4" class="form-control form-control-sm"></select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label class="col-form-label">Penata Anestesi 1</label>
                                            </div>
                                            <div class="col-md-6">
                                                <select id="qacbedahemr_pntantesi_id" name="pntantesi" class="form-control form-control-sm" ></select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label class="col-form-label">Penata Anestesi 2</label>
                                            </div>
                                            <div class="col-md-6">
                                                <select id="qacbedahemr_pntantesi2_id" name="pntantesi" class="form-control form-control-sm" ></select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label class="col-form-label">Tanggal Pembedahan</label>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group date" id="qacbedahemr_dtglstart" data-target-input="nearest">
                                                    <input id="qacbedahemr_tglstart" name="tglstart" type="datetime-local" class="form-control form-control-sm" value="<?php echo date('Y-m-d H:i');?>">
                                                </div>
                                            </div>
                                            <div class="col-md-0">
                                                <label class="col-form-label">&nbsp;s/d&nbsp;</label>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group date" id="qacbedahemr_dtglstop" data-target-input="nearest">
                                                    <input id="qacbedahemr_tglstop" name="tglstop" type="datetime-local" class="form-control  form-control-sm" value="<?php //echo date('Y-m-d H:i');?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label class="col-form-label" title="Klasifikasi">Klasifikasi Bedah</label>
                                            </div>
                                            <div class="col-md-4">
                                                <select name="Klasifikasi_id" id="qacbedahemr_klasifikasi_id" class="form-control form-control-sm">
                                                    <option value="0">-- Pilih Klasifikasi--</option>
                                                    <option value="1">EMERGENCY/CITO</option>
                                                    <option value="2">ELEKTIF</option>
                                                    <option value="3">POLIKLINIK/ODC</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label class="col-form-label" title="Jenis Bedah">Jenis Bedah</label>
                                            </div>
                                            <div class="col-md-4">
                                                <select name="jenisbedah_id" id="qacbedahemr_jenisbedah_id" class="form-control form-control-sm">
                                                    <option value="0">-- Pilih Jenis Bedah--</option>
                                                    <option value="1">MAYOR</option>
                                                    <option value="2">MEDIUM</option>
                                                    <option value="3">MINOR</option>
                                                    <option value="4">KHUSUS</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label class="col-form-label" title="Jenis Anastesi">Jenis Anestesi</label>
                                            </div>
                                            <div class="col-md-5">
                                                <select name="jenisan_id" id="qacbedahemr_jenisan_id" class="form-control form-control-sm"></select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label class="col-form-label">ICD 10 Pra Bedah</label>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form_group">
                                                    <select class="diagnos_prabedah form-control form-control-xs" id="diagnos_prabedah">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label id="qacbedahemr_icdpralabel" class="col-form-label">NON ICD</label>
                                                <input id="qacbedahemr_icdpraId" name="icdpraId" type="hidden" value="0">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label class="col-form-label">ICD 10 Pasca Bedah</label>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form_group">
                                                    <select class="diagnos_pascabedah form-control form-control-xs" id="diagnos_pascabedah"></select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label id="qacbedahemr_icdpascalabel" class="col-form-label">NON ICD</label>
                                                <input id="qacbedahemr_icdpascaId" name="icdpascaId" type="hidden" value="0">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label class="col-form-label">Diagnosis Klinis Pra Bedah</label>
                                            </div>
                                            <div class="col-md-7">
                                                <textarea cols="47" id="qacbedahemr_diagklinisprabedah" rows="3" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label class="col-form-label">Diagnosis Klinis Pasca Bedah</label>
                                            </div>
                                            <div class="col-md-7">
                                                <textarea cols="47" id="qacbedahemr_diagklinispascabedah" rows="3" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label class="col-form-label">Jumlah Perdarahan</label>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="input-group input-group-sm">
                                                    <input type="number" id="qacbedahemr_jumperdarahan" maxlength="30" class="form-control form-control-sm">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">cc</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label class="col-form-label">Jumlah Transfusi</label>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="input-group input-group-sm">
                                                    <input type="number" id="qacbedahemr_jumdarahtransfusi" maxlength="30" class="form-control form-control-sm">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">cc</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label class="col-form-label" title="Jarpart">Jaringan Ke Patologi</label>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input onclick="patologicek()" name="qacbedahemr_jarpart" value="0" type="radio" class="custom-control-input" id="qacbedahemr_jarpart_1" checked>
                                                    <label class="custom-control-label" for="qacbedahemr_jarpart_1">Tidak</label>
                                                </div>
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input onclick="patologicek()" name="qacbedahemr_jarpart" value="1" type="radio" class="custom-control-input" id="qacbedahemr_jarpart_2">
                                                    <label class="custom-control-label" for="qacbedahemr_jarpart_2">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="qacbedahemr_changediv" style="display:none">
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <label class="col-form-label"> &nbsp; &nbsp; &nbsp; Tanggal</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group date" id="qacbedahemr_dtgljarpart" data-target-input="nearest">
                                                        <input id="qacbedahemr_tgljarpart" name="tgljarpart" type="date" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <label class="col-form-label"> &nbsp; &nbsp; &nbsp; Asal Jaringan</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input id="qacbedahemr_asaljarpat" maxlength="60" class="form-control form-control-sm" type="search">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label class="col-form-label" title="komplikasi">Komplikasi</label>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="form-check checkbox">
                                                    <input class="form-check-input" id="" type="checkbox">
                                                </div>
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input onclick="komplikasicek()" name="qacbedahemr_komplikasi" value="0" type="radio" class="custom-control-input" id="qacbedahemr_komplikasi_1" checked>
                                                    <label class="custom-control-label" for="qacbedahemr_komplikasi_1">Tidak</label>
                                                </div>
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input onclick="komplikasicek()" name="qacbedahemr_komplikasi" value="1" type="radio" class="custom-control-input" id="qacbedahemr_komplikasi_2">
                                                    <label class="custom-control-label" for="qacbedahemr_komplikasi_2">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="qacbedahemr_changediv5" style="display:none">
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <label class="col-form-label"> &nbsp; &nbsp; &nbsp; Isian Komplikasi</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input id="qacbedahemr_komplikasiisi" class="form-control form-control-sm" type="search">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Implant</label>
                                            <div class="col-md-7">
                                                <div class="form-check checkbox">
                                                    <input class="form-check-input" id="" type="checkbox">
                                                </div>
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input name="qacbedahemr_implat" value="0" type="radio" class="custom-control-input" id="qacbedahemr_implat_1" checked>
                                                    <label class="custom-control-label" for="qacbedahemr_implat_1">Tidak</label>
                                                </div>
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input name="qacbedahemr_implat" value="1" type="radio" class="custom-control-input" id="qacbedahemr_implat_2">
                                                    <label class="custom-control-label" for="qacbedahemr_implat_2">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Jenis Implant</label>
                                            <div class="col-md-7">
                                                <input type="search" id="qacbedahemr_jeniimplat" class="form-control form-control-sm">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label>Uraian Pembedahan   :</label>
                                        <textarea class="form-control form-control-sm" id="urai_bedah"></textarea>
                                    </div>

                                    <div class="col-md-12 pt-5 pl-5">
                                        <button class="btn btn-sm btn-primary" onclick="saveInputBedah()"><i class="fa fa-save"></i> Simpan Tindakan</button>
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
<script>

    $(document).ready(function() {
        $("#showdetailinputpembedahan").modal({backdrop: "static"});
        $('#showdetailinputpembedahan').on('shown.bs.modal', function() { });
        getDokterbedah();
        getPerawatbedah();
        getJenisAnastesi();
        showInputPembedahan();

        $(".diagnos_prabedah").select2({
            placeholder: "Ketikan Kode Diagnosa",
            allowClear: true
        });
        $(".diagnos_pascabedah").select2({
            placeholder: "Ketikan Kode Diagnosa",
            allowClear: true
        });
    });

    $(document).on('keyup', '.select2-search__field', function(ev) {
        var self = $(this);
        if (self.val().length > 1) {
            tampil_diagnosa_pra(self.val());
        }
    });

    $(document).on('keyup', '.select2-search__field', function(ev) {
        var selfa = $(this);
        if (selfa.val().length > 1) {
            tampil_diagnosa_pasca(selfa.val());
        }
    });

    function lainnya_penyakitsaatini(){
        if ($("#qacbedahemr_penyakitsaatini6").prop("checked") == true ){
            document.getElementById('qacbedahemr_penyakitsaatiniisi').style.display='block';
        }else{
            document.getElementById('qacbedahemr_penyakitsaatiniisi').style.display='none';
        }
    }

    function lainnya_penyakitinfeksisaatini(){
        if ($("#qacbedahemr_penyakitinfeksi7").prop("checked") == true ){
            document.getElementById('qacbedahemr_penyakitinfeksiisi').style.display='block';
        }else{
            document.getElementById('qacbedahemr_penyakitinfeksiisi').style.display='none';
        }
    }

    function lainnya_disinfeksikulit(){
        if ($("#qacbedahemr_disinfeksikulit4").prop("checked") == true ){
            document.getElementById('qacbedahemr_disinfeksikulitisi').style.display='block';
        }else{
            document.getElementById('qacbedahemr_disinfeksikulitisi').style.display='none';
        }
    }

    function profilaksiscek(){
        if ($("#qacbedahemr_prokfilaksis_2").prop("checked") == true ){
            document.getElementById('qacbedahemr_changediv2').style.display='block';
        }else{
            document.getElementById('qacbedahemr_changediv2').style.display='none';
        }
    }

    function antibiotikcek(){
        if ($("#qacbedahemr_antibiotiktambahan_2").prop("checked") == true ){
            document.getElementById('qacbedahemr_changediv3').style.display='block';
        }else{
            document.getElementById('qacbedahemr_changediv3').style.display='none';
        }
    }

    function patologicek(){
        if ($("#qacbedahemr_jarpart_2").prop("checked") == true ){
            document.getElementById('qacbedahemr_changediv').style.display='block';
        }else{
            document.getElementById('qacbedahemr_changediv').style.display='none';
        }
    }

    function komplikasicek(){
        if ($("#qacbedahemr_komplikasi_2").prop("checked") == true ){
            document.getElementById('qacbedahemr_changediv5').style.display='block';
        }else{
            document.getElementById('qacbedahemr_changediv5').style.display='none';
        }
    }

    function lainnya_alat(){
        if ($("#qacbedahemr_indikatorinstrumen3").prop("checked") == true ){
            document.getElementById('qacbedahemr_indikatorinstrumenlainya').style.display='block';
        }else{
            document.getElementById('qacbedahemr_indikatorinstrumenlainya').style.display='none';
        }
    }

    function tampil_diagnosa_pra(kode) {
        var param = {
            id: kode
        };
        apiPOST('Data_Sosial/diagnosabyname', param, hasil => {
            var penjamin = '';
            var a = hasil['data'];
            for (var i = 0; i < a.length; i++) {
                penjamin += '<option value="' + a[i]['id_penyakit'] + '">' + a[i]['id_penyakit'] + ' | ' + a[i]['penyakit'] + '</option>';
            }
            document.getElementById('diagnos_prabedah').innerHTML = penjamin;
        });
    }

    function tampil_diagnosa_pasca(kode) {
        var param = {
            id: kode
        };
        apiPOST('Data_Sosial/diagnosabyname', param, hasil => {
            var penjamin = '';
            var a = hasil['data'];
            for (var i = 0; i < a.length; i++) {
                penjamin += '<option value="' + a[i]['id_penyakit'] + '">' + a[i]['id_penyakit'] + ' | ' + a[i]['penyakit'] + '</option>';
            }
            document.getElementById('diagnos_pascabedah').innerHTML = penjamin;
        });
    }
    
    function getPerawatbedah(){

        apiPOST('Rekammedisirna/searchPerawat', null, hasil => {
            a=hasil['data'];
            var b='';
            b += '<option value="0">-- Pilih Perawat --</option>';
            if (hasil !==null){ 
                for (var i = 0; i < a.length; i++) {
                    z = hasil['data'][i];
                    b+='<option value="'+z.id_pegawai+'">'+z.nama_pegawai+'</option>';
                }
                document.getElementById('qacbedahemr_assb1_id').innerHTML=b;
                document.getElementById('qacbedahemr_assb2_id').innerHTML=b;
                document.getElementById('qacbedahemr_ins_id').innerHTML=b;
                document.getElementById('qacbedahemr_omloop_id').innerHTML=b;
                document.getElementById('qacbedahemr_omloop2_id').innerHTML=b;
                document.getElementById('qacbedahemr_omloop3_id').innerHTML=b;
                document.getElementById('qacbedahemr_omloop4_id').innerHTML=b;
                document.getElementById('qacbedahemr_pntantesi_id').innerHTML=b;
                document.getElementById('qacbedahemr_pntantesi2_id').innerHTML=b;
            } 
        });
    }

    function getDokterbedah(){
        apiPOST('Rekammedisirna/searchDokter', null, hasil => {
            a=hasil['data'];    
            var b='';
            b += '<option value="0">-- Pilih Dokter --</option>';
            if (hasil !==null){ 
                for (var i = 0; i < a.length; i++) {
                    z = hasil['data'][i];
                    b+='<option value="'+z.id_pegawai+'">'+z.nama_pegawai+'</option>';
                }
                document.getElementById('qacbedahemr_op1_id').innerHTML=b;
                document.getElementById('qacbedahemr_op2_id').innerHTML=b;
                document.getElementById('qacbedahemr_an_id').innerHTML=b;
                document.getElementById('qacbedahemr_an2_id').innerHTML=b;
            } 
        });
    }

    function getJenisAnastesi(){

        apiPOST('Rekammedisirna/jenisanastesi', null, hasil => {
            a=hasil['data'];
            var b='';
            b += '<option value="0">-- Pilih Jenis Anstesi --</option>';
            if (hasil !==null){ 
                for (var i = 0; i < a.length; i++) {
                    z = hasil['data'][i];
                    b+='<option value="'+z.idjns_anestesi+'">'+z.nama_anastesi+'</option>';
                }
                document.getElementById('qacbedahemr_jenisan_id').innerHTML=b;
            } 
        });
    }

    function saveInputBedah(){
        document.getElementById("inputpembedahan_loadingawal").style.display = 'block';
        
        if($('input[name=qacbedahemr_screningmrsa]:checked').val()==2){
            mrsa=$('input[name=screningmrsahasil]:checked').val();
        }else{
            mrsa=$('input[name=qacbedahemr_screningmrsa]:checked').val();
        }
        
        var sakit = Array.from(document.querySelectorAll('input[name=qacbedahemr_penyakitsaatini]:checked')).map(c=>c.value);
        sakit.push($('#qacbedahemr_penyakitsaatiniisi').val());
        pnyakit     = sakit.join();
        
        var inf     = Array.from(document.querySelectorAll('input[name=qacbedahemr_penyakitinfeksi]:checked')).map(c=>c.value);
        inf.push($('#qacbedahemr_penyakitinfeksiisi').val());
        feksi       = inf.join();
        
        var deinf = Array.from(document.querySelectorAll('input[name=qacbedahemr_disinfeksikulit]:checked')).map(c=>c.value);
        deinf.push($('#qacbedahemr_disinfeksikulitisi').val());
        desin       = deinf.join();
        
        var ins     = Array.from(document.querySelectorAll('input[name=qacbedahemr_indikatorinstrumen]:checked')).map(c=>c.value);
        ins.push($('#qacbedahemr_indikatorinstrumenlainya').val());
        instr       = ins.join();

        if ($('#qacbedahemr_tglstart').val() == ''){
            toastr.error('Tgl. Pembedahan Belum diisi !!');
            document.getElementById("inputpembedahan_loadingawal").style.display = 'none';
            return;
        }

        if ($('#qacbedahemr_tglstop').val() == ''){
            toastr.error('Tgl. Pembedahan Belum diisi !!');
            document.getElementById("inputpembedahan_loadingawal").style.display = 'none';
            return;
        }

        var tglpato     = $('#qacbedahemr_tgljarpart').val();
        var isianpato = $('#qacbedahemr_asaljarpat').val();
        
        if($('input[name=qacbedahemr_jarpart]:checked').val() == 1){
            if ($('#qacbedahemr_tgljarpart').val() == ''){
                toastr.error('Tgl. Patologi Belum diisi !!');
                document.getElementById("inputpembedahan_loadingawal").style.display = 'none';
                return;
            }

            if ($('#qacbedahemr_asaljarpat').val() == ''){
                toastr.error('Catatan Jaringan Patologi Belum diisi !!');
                document.getElementById("inputpembedahan_loadingawal").style.display = 'none';
                return;
            }
        }else{
            $('#qacbedahemr_tgljarpart').val('');
            $('#qacbedahemr_asaljarpat').val('');
            tglpato     = '';
            isianpato = '';
        }

        var param={
            id_transaksi        : $('#transaksiermirna').val(),
            id_kunjungan            : $('#idKunjunganermirna').val(),
            air_count               : $('#qacbedahemr_aircountok').val(),
            albumin                     : $('#qacbedahemr_albumin').val(),
            asa                             : $('#qacbedahemr_asascore').val(),
            asesmen_dpjp            : $('input[name=qacbedahemr_assesmentdpjp]:checked').val(),
            asesmen_anestesi    : $('input[name=qacbedahemr_assesmentanastesi]:checked').val(),
            alat                            : instr,
            antibiotik              : $('input[name=qacbedahemr_antibiotiktambahan]:checked').val(),
            antibiotikobat      : $('#qacbedahemr_antibiotiktambahanobat').val(),
            antibiotikdosis   : $('#qacbedahemr_antibiotiktambahandosis').val(),
            antibiotikjam     : $('#qacbedahemr_antibiotiktambahandiberikanjam').val(),
            berat                       : $('#qacbedahemr_beratbadan').val(),
            bowel                       : $('input[name=qacbedahemr_mechanicalbowel]:checked').val(),
            bedah                       : $('#qacbedahemr_jenisbedah_id').val(),
            cukur                       : $('#qacbedahemr_pencukuran').val(),
            drain                       : $('input[name=qacbedahemr_drain]:checked').val(),
            diagnosa                    : $('#qacbedahemr_diagnosa').val(),
            desinfeksi              : desin,
            diagnose_pra            : $('#qacbedahemr_diagklinisprabedah').val(),
            diagnose_pasca      : $('#qacbedahemr_diagklinispascabedah').val(),
            dok_op1                 : $('#qacbedahemr_op1_id').val(),
            dok_op2                 : $('#qacbedahemr_op2_id').val(),
            dok_ane1                : $('#qacbedahemr_an_id').val(),
            dok_ane2                    : $('#qacbedahemr_an2_id').val(),
            gula                            : $('input[name=guladarah]:checked').val(),
            icd_pra                     : $('#diagnos_prabedah').val(),
            icd_pasca               : $('#diagnos_pascabedah').val(),
            implant                     : $('input[name=qacbedahemr_komplikasi]:checked').val(),
            jamur                       : $('input[name=qacbedahemr_jamurac]:checked').val(),
            jns_anestesi            : $('#qacbedahemr_jenisan_id').val(),
            jns_drain               : $('#qacbedahemr_jenidrain').val(),
            jns_bedah               : $('#qacbedahemr_jenistrans_id').val(),
            jns_implant             : $('#qacbedahemr_jeniimplat').val(),
            kelengkapan             : $('input[name=qacbedahemr_informedconsent]:checked').val(),
            klasifikasi             : $('#qacbedahemr_klasifikasi_id').val(),
            komplikasi              : $('input[name=qacbedahemr_komplikasi]:checked').val(),
            isiankompli             : $('#qacbedahemr_komplikasiisi').val(),
            luka                            : $('#qacbedahemr_klasifikasiluka').val(),
            lembab                      : $('#qacbedahemr_kelembabanok').val(),
            mrsa                            : mrsa,
            multiprosedur       : $('input[name=qacbedahemr_multiprosedure]:checked').val(),
            mandi                       : $('#qacbedahemr_mandisebelumop').val(),
            nata_anes1              : $('#qacbedahemr_pntantesi_id').val(),
            nata_anes2          : $('#qacbedahemr_pntantesi2_id').val(),
            no_reg                  : $('#qacbedahemr_noregis').val(),
            penyakit                    : pnyakit,
            profilaksis       : $('input[name=qacbedahemr_prokfilaksis]:checked').val(),
            prokfilaksisobat  : $('#qacbedahemr_prokfilaksisobat').val(),
            prokfilaksidosis  : $('#qacbedahemr_prokfilaksidosis').val(),
            prokfilaksijam    : $('#qacbedahemr_prokfilaksidiberikanjam').val(),
            posisi_drain        : $('input[name=posisidrain]:checked').val(),
            patologi                : $('input[name=qacbedahemr_jarpart]:checked').val(),
            tglpato                 : tglpato,
            isianpato               : isianpato,
            prosedur                : $('#qacbedahemr_prosedureoprasi').val(),
            pendarahan          : $('#qacbedahemr_jumperdarahan').val(),
            rokok                       : $('input[name=qacbedahemr_merokok]:checked').val(),
            radioterapi         : $('input[name=qacbedahemr_radiotrapisebelumnya]:checked').val(),
            ruang                       : $('#qacbedahemr_ruangoprasi').val(),
            suhu                        : $('input[name=suhupasien]:checked').val(),
            ssc                         : $('input[name=qacbedahemr_ssc]:checked').val(),
            sirkulasi               : $('#qacbedahemr_sirkulasiudaraok').val(),
            suhuruang               : $('#qacbedahemr_suhuruang').val(),
            staff                       : $('#qacbedahemr_jumlahstaf').val(),
            sterilisasi         : $('input[name=qacbedahemr_sterilisasi]:checked').val(),
            sus_ass1                : $('#qacbedahemr_assb1_id').val(),
            sus_ass2                : $('#qacbedahemr_assb2_id').val(),
            sus_instru          : $('#qacbedahemr_ins_id').val(),
            sus_omloop1         : $('#qacbedahemr_omloop_id').val(),
            sus_omloop2         : $('#qacbedahemr_omloop2_id').val(),
            sus_omloop3         : $('#qacbedahemr_omloop3_id').val(),
            sus_omloop4         : $('#qacbedahemr_omloop4_id').val(),
            steroid                 : $('input[name=qacbedahemr_steroidjangkapanjang]:checked').val(),
            trauma                  : $('input[name=qacbedahemr_oprasikarnatrauma]:checked').val(),
            tekanan                 : $('input[name=tekananudara]:checked').val(),
            tgl_awal                : $('#qacbedahemr_tglstart').val(),
            tgl_akhir               : $('#qacbedahemr_tglstop').val(),
            transfusi               : $('#qacbedahemr_jumdarahtransfusi').val(),
            waktu_cukur         : $('#qacbedahemr_waktupencukuran').val(),
            infeksi                     : feksi,
            uraian                  : $('#urai_bedah').val(),
        };

        apiPOST('Rekammedisirna/saveinputpembedahan', param, hasil => {
            document.getElementById("inputpembedahan_loadingawal").style.display = 'none';
            if (hasil['status']=='sukses') {
                // toastr.info(hasil['pesan']);
            }else{
                toastr.error(hasil['pesan']);
                console.log(hasil['data']); 
            }
        })
    }

    function showInputPembedahan(){
        document.getElementById("inputpembedahan_loadingawal").style.display = 'block';
        var param = {
          id_transaksi    : $('#transaksiermirna').val(),
          id_kunjungan    : $('#idKunjunganermirna').val(),
          iduser          : user.id_user
        }
        
        apiPOST('Rekammedisirna/showinputpembedahan', param,hasil=>{
            document.getElementById("inputpembedahan_loadingawal").style.display = 'none';
            if (hasil['data'].length == 0){
                toastr.error("Belum Ada Inputan Pembedahan!");
            }else{
                // toastr.info("Data Input Pembedahan di Temukan");
                var a=hasil['data'];
                for (var i = 0; i < a.length; i++) {

                    document.getElementById('qacbedahemr_beratbadan').value= a[i]['berat'];
                    if (a[i]['gula']=="true" || a[i]['gula']==true) {
                        document.getElementById('qacbedahemr_guladarah1').checked='true';
                    } else {
                        document.getElementById('qacbedahemr_guladarah2').checked='true';
                    }
                    if (a[i]['rokok']=="1" || a[i]['rokok']==1) {
                        document.getElementById('qacbedahemr_merokok_1').checked='true';
                    } else {
                        document.getElementById('qacbedahemr_merokok_2').checked='true';
                    }
                    if (a[i]['kelengkapan']=="1" || a[i]['kelengkapan']==1) {
                        document.getElementById('qacbedahemr_informedconsent_1').checked='true';
                    } else {
                        document.getElementById('qacbedahemr_informedconsent_2').checked='true';
                    }

                    document.getElementById('qacbedahemr_albumin').value=a[i]['albumin'];

                    var penyakit         = a[i]['penyakit'].split(',');
                    var penyakitlainnya  = a[i]['penyakit'].split('6,');
                    for(var p = 0; p < penyakit.length; p++){
                        $("#qacbedahemr_penyakitsaatini"+penyakit[p]).prop("checked", true);
                        lainnya_penyakitsaatini();
                        document.getElementById('qacbedahemr_penyakitsaatiniisi').value = penyakitlainnya[1];
                    }

                    if (a[i]['asesmen_dpjp']=="1" || a[i]['asesmen_dpjp']==1) {
                        document.getElementById('qacbedahemr_assesmentdpjp_1').checked='true';
                    } else {
                        document.getElementById('qacbedahemr_assesmentdpjp_2').checked='true';
                    }

                    if (a[i]['asesmen_anestesi']=="1" || a[i]['asesmen_anestesi']==1) {
                        document.getElementById('qacbedahemr_assesmentanastesi_1').checked='true';
                    } else {
                        document.getElementById('qacbedahemr_assesmentanastesi_2').checked='true';
                    }

                    if (a[i]['mrsa']=="1" || a[i]['mrsa']==1) {
                        document.getElementById('qacbedahemr_screningmrsa_1').checked='true';
                    } else {
                        document.getElementById('qacbedahemr_screningmrsa_2').checked='true';
                    }

                    document.getElementById('qacbedahemr_pencukuran').value= a[i]['cukur'];
                    document.getElementById('qacbedahemr_waktupencukuran').value= a[i]['waktu_cukur'];

                    if (a[i]['bowel']=="1" || a[i]['bowel']==1) {
                        document.getElementById('qacbedahemr_mechanicalbowel_1').checked='true';
                    } else {
                        document.getElementById('qacbedahemr_mechanicalbowel_2').checked='true';
                    }

                    if (a[i]['steroid']=="1" || a[i]['steroid']==1) {
                        document.getElementById('qacbedahemr_steroidjangkapanjang_1').checked='true';
                    } else {
                        document.getElementById('qacbedahemr_steroidjangkapanjang_2').checked='true';
                    }

                    if (a[i]['radioterapi']=="1" || a[i]['radioterapi']==1) {
                        document.getElementById('qacbedahemr_radiotrapisebelumnya_1').checked='true';
                    } else {
                        document.getElementById('qacbedahemr_radiotrapisebelumnya_2').checked='true';
                    }
                    document.getElementById('qacbedahemr_mandisebelumop').value= a[i]['mandi'];

                    if (a[i]['profilaksis']=="1" || a[i]['profilaksis']==1) {
                        document.getElementById('qacbedahemr_prokfilaksis_1').checked='true';
                    } else {
                        document.getElementById('qacbedahemr_prokfilaksis_2').checked='true';
                        profilaksiscek();
                        document.getElementById('qacbedahemr_prokfilaksisobat').value = a[i]['profilaksisobat'];
                        document.getElementById('qacbedahemr_prokfilaksidosis').value = a[i]['profilaksisdosis'];
                        document.getElementById('qacbedahemr_prokfilaksidiberikanjam').value = a[i]['profilaksiswaktu'];
                    }

                    var infeksi         = a[i]['infeksi'].split(',');
                    var infeksilainnya  = a[i]['infeksi'].split('7,');
                    for(var inf = 0; inf < infeksi.length; inf++){
                        $("#qacbedahemr_penyakitinfeksi"+infeksi[inf]).prop("checked", true);
                        lainnya_penyakitinfeksisaatini();
                        document.getElementById('qacbedahemr_penyakitinfeksiisi').value = infeksilainnya[1];
                    }

                    document.getElementById('qacbedahemr_ruangoprasi').value= a[i]['ruang'];

                    if (a[i]['trauma']=="1" || a[i]['trauma']==1) {
                        document.getElementById('qacbedahemr_oprasikarnatrauma_1').checked='true';
                    } else {
                        document.getElementById('qacbedahemr_oprasikarnatrauma_2').checked='true';
                    }

                    if (a[i]['ssc']=="1" || a[i]['ssc']==1) {
                        document.getElementById('qacbedahemr_ssc_1').checked='true';
                    } else {
                        document.getElementById('qacbedahemr_ssc_2').checked='true';
                    }
                    document.getElementById('qacbedahemr_prosedureoprasi').value= a[i]['prosedur'];
                    document.getElementById('qacbedahemr_diagnosa').value= a[i]['diagnosa'];

                    if (a[i]['multiprosedur']=="1" || a[i]['multiprosedur']==1) {
                        document.getElementById('qacbedahemr_multiprosedure_1').checked='true';
                    } else {
                        document.getElementById('qacbedahemr_multiprosedure_2').checked='true';
                    }
                    document.getElementById('qacbedahemr_asascore').value= a[i]['asa'];
                    document.getElementById('qacbedahemr_klasifikasiluka').value= a[i]['luka'];
                    document.getElementById('qacbedahemr_sirkulasiudaraok').value= a[i]['sirkulasi'];

                    if (a[i]['tekanan']=="true" || a[i]['tekanan']==true) {
                        document.getElementById('qacbedahemr_tekananudara1').checked='true';
                    } else {
                        document.getElementById('qacbedahemr_tekananudara2').checked='true';
                    }
                    //suhu
                    document.getElementById('qacbedahemr_jumlahstaf').value= a[i]['staff'];
                    document.getElementById('qacbedahemr_aircountok').value= a[i]['air_count'];

                    if (a[i]['jamur']=="1" || a[i]['jamur']==1) {
                        document.getElementById('qacbedahemr_jamurac_1').checked='true';
                    } else {
                        document.getElementById('qacbedahemr_jamurac_2').checked='true';
                    }
                    document.getElementById('qacbedahemr_kelembabanok').value= a[i]['lembab'];

                    if (a[i]['drain']=="1" || a[i]['drain']==1) {
                        document.getElementById('qacbedahemr_drain_1').checked='true';
                    } else {
                        document.getElementById('qacbedahemr_drain_2').checked='true';
                    }

                    if (a[i]['posisi_drain']=="1" || a[i]['posisi_drain']==1) {
                        document.getElementById('qacbedahemr_posisidrain1').checked='true';
                    } else {
                        document.getElementById('qacbedahemr_posisidrain2').checked='true';
                    }
                    document.getElementById('qacbedahemr_jenidrain').value= a[i]['jns_drain'];

                    if (a[i]['sterilisasi']=="1" || a[i]['sterilisasi']==1) {
                        document.getElementById('qacbedahemr_sterilisasi_1').checked='true';
                    } else {
                        document.getElementById('qacbedahemr_sterilisasi_2').checked='true';
                    }

                    var desinfeksi         = a[i]['desinfeksi'].split(',');
                    var desinfeksilainnya  = a[i]['desinfeksi'].split('4,');
                    for(var des = 0; des < desinfeksi.length; des++){
                        $("#qacbedahemr_disinfeksikulit"+desinfeksi[des]).prop("checked", true);
                        lainnya_disinfeksikulit();
                        document.getElementById('qacbedahemr_disinfeksikulitisi').value = desinfeksilainnya[1];
                    }

                    var alat         = a[i]['alat'].split(',');
                    var alatlainnya  = a[i]['alat'].split('3,');
                    for(var al = 0; al < alat.length; al++){
                        $("#qacbedahemr_indikatorinstrumen"+alat[al]).prop("checked", true);
                        lainnya_alat();
                        document.getElementById('qacbedahemr_indikatorinstrumenlainya').value = alatlainnya[1];
                    }

                    if (a[i]['antibiotik']=="1" || a[i]['antibiotik']==1) {
                        document.getElementById('qacbedahemr_antibiotiktambahan_1').checked='true';
                    } else {
                        document.getElementById('qacbedahemr_antibiotiktambahan_2').checked='true';
                        antibiotikcek();
                        document.getElementById('qacbedahemr_antibiotiktambahanobat').value = a[i]['antibiotikobat'];
                        document.getElementById('qacbedahemr_antibiotiktambahandosis').value = a[i]['antibiotikdosis'];
                        document.getElementById('qacbedahemr_antibiotiktambahandiberikanjam').value = a[i]['antibiotikwaktu'];
                    }

                    document.getElementById('qacbedahemr_jenistrans_id').value= a[i]['jns_bedah'];
                    document.getElementById('qacbedahemr_op1_id').value= a[i]['dok_op1'];
                    document.getElementById('qacbedahemr_op2_id').value= a[i]['dok_op2'];
                    document.getElementById('qacbedahemr_an_id').value= a[i]['dok_ane1'];
                    document.getElementById('qacbedahemr_an2_id').value=a[i]['dok_ane2'];
                    document.getElementById('qacbedahemr_assb1_id').value=a[i]['sus_ass1'];
                    document.getElementById('qacbedahemr_assb2_id').value=a[i]['sus_ass2'];
                    document.getElementById('qacbedahemr_ins_id').value=a[i]['sus_instru'];
                    document.getElementById('qacbedahemr_omloop_id').value=a[i]['sus_omloop1'];
                    document.getElementById('qacbedahemr_omloop2_id').value=a[i]['sus_omloop2'];
                    document.getElementById('qacbedahemr_omloop3_id').value=a[i]['sus_omloop3'];
                    document.getElementById('qacbedahemr_omloop4_id').value=a[i]['sus_omloop4'];
                    document.getElementById('qacbedahemr_pntantesi_id').value=a[i]['nata_anes1'];
                    document.getElementById('qacbedahemr_pntantesi2_id').value=a[i]['nata_anes2'];
                    document.getElementById('qacbedahemr_tglstart').value=a[i]['tgl_awal'];
                    document.getElementById('qacbedahemr_tglstop').value=a[i]['tgl_akhir'];
                    document.getElementById('qacbedahemr_klasifikasi_id').value=a[i]['klasifikasi'];
                    document.getElementById('qacbedahemr_jenisbedah_id').value=a[i]['bedah'];
                    document.getElementById('qacbedahemr_jenisan_id').value=a[i]['jns_anestesi'];
                    document.getElementById('diagnos_prabedah').value=a[i]['icd_pra'];
                    document.getElementById('diagnos_pascabedah').value=a[i]['icd_pasca'];
                    document.getElementById('qacbedahemr_diagklinisprabedah').value=a[i]['diagnose_pra'];
                    document.getElementById('qacbedahemr_diagklinispascabedah').value=a[i]['diagnose_pasca'];
                    document.getElementById('qacbedahemr_jumperdarahan').value=a[i]['pendarahan'];
                    document.getElementById('qacbedahemr_jumdarahtransfusi').value=a[i]['transfusi'];
                    
                    if (a[i]['patologi']=="0" || a[i]['patologi']==0) {
                       document.getElementById('qacbedahemr_jarpart_1').checked='true';
                    } else {
                      document.getElementById('qacbedahemr_jarpart_2').checked='true';
                      patologicek();
                      document.getElementById('qacbedahemr_tgljarpart').value=a[i]['tglpatologi'];
                      document.getElementById('qacbedahemr_asaljarpat').value=a[i]['isianpatologi'];
                    }
                    
                    if (a[i]['komplikasi']=="0" || a[i]['komplikasi']==0) {
                      document.getElementById('qacbedahemr_komplikasi_1').checked='true';
                    } else {
                      document.getElementById('qacbedahemr_komplikasi_2').checked='true';
                      komplikasicek();
                      document.getElementById('qacbedahemr_komplikasiisi').value=a[i]['isiankomplikasi'];
                    }

                    if (a[i]['implant']=="0" || a[i]['implant']==0) {
                      document.getElementById('qacbedahemr_implat_1').checked='true';
                    } else {
                      document.getElementById('qacbedahemr_implat_2').checked='true';
                      document.getElementById('qacbedahemr_jeniimplat').value=a[i]['jns_implant'];
                    }

                    document.getElementById('urai_bedah').value=a[i]['uraian'];
                    document.getElementById('qacbedahemr_suhuruang').value= a[i]['suhuruang'];

                }
            }
        });
    }
</script>