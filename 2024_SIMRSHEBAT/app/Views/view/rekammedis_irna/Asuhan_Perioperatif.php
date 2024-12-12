<div class="col-md-12 p-2">
	<div class="card-body p-2 darkgrey-custom" id="DivPreoperasi" >
		<div class="card"><!-- DATA PASIEN -->
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
					<div class="col-md-6">
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">ID</label>
							</div>
							<div class="col-md-3">
								<input id="dacperioperatifpra_id" name="id" type="hidden" class="form-control" readonly="readonly">
							</div>
							<div class="col-md-6">
								<b><i><label class="col-form-label" id="dacperioperatifpra_note"></label></i></b>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3  text-truncate">
								<label class="col-form-label">Diagnosis</label>
							</div>
							<div class="col-md-7">
								<textarea rows="2" name="dacperioperatifpra_bdiagnosa" id="dacperioperatifpra_bdiagnosa" style="width:100%;" class="form-control"></textarea>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3  text-truncate">
								<label class="col-form-label">Tindakan</label>
							</div>
							<div class="col-md-7">
								<textarea rows="2" name="dacperioperatifpra_btindakan" id="dacperioperatifpra_btindakan" style="width:100%;" class="form-control"></textarea>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group row">
							<div class="col-md-3  text-truncate">
								<label class="col-form-label">Tanggal</label>
							</div>
							<div class="col-md-4">
								<div class="input-group date" id="dacperioperatifpra_datgl" data-target-input="nearest">
									<input value="<?php echo date('Y-m-d')?>" id="dacperioperatifpra_atgl" name="atgl" type="date" class="form-control" >				              
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3  text-truncate">
								<label class="col-form-label">Kasus Trauma</label>
							</div>
							<div class="col-md-9">
								<div class="row" id="dacperioperatifpra_btrauma">
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_btrauma" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_btrauma_1">
												<label class="custom-control-label" for="dacperioperatifpra_btrauma_1">Tidak</label>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_btrauma" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_btrauma_2">
												<label class="custom-control-label" for="dacperioperatifpra_btrauma_2">Ya</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Dokter Operator</label>
							</div>
							<div class="col-md-6">
								<select id="dacperioperatifpra_bdokop" name="bdokop" class="form-control form-control-sm" >
								</select>
							</div>
							<div class="col-md-auto">
								<button id="dacperioperatifpra_btpjdef3" class="btn btn-warning" type="button" title="Default PJ">
									&nbsp;&nbsp;<i class="fas fa-undo"></i>&nbsp;&nbsp;
								</button>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Dokter Anastesi</label>
							</div>
							<div class="col-md-6">
								<select id="dacperioperatifpra_bdokanas" name="bdokanas" class="form-control form-control-sm"></select>
							</div>
							<div class="col-md-auto">
								<button id="dacperioperatifpra_btpjdef4" class="btn btn-warning" type="button" title="Default PJ">
									&nbsp;&nbsp;<i class="fas fa-undo "></i> &nbsp;&nbsp;
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card"><!-- KEADAAN PASIEN -->
			<div class="card-header" style="background-color:black;">
				<h3 class="card-title" style="color:white;">KEADAAN PASIEN</h3>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse">
						<i class="fas fa-minus"></i>
					</button>			  
				</div>
			</div>
			<div class="card-body">
				<div class="row ">
					<div class="col-md-4">
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label" title="Keadaan Umum">Keadaan Umum</label>
							</div>
							<div class="col-md-8">
								<div class="input-group">
									<select name="akeadaan" id="dacperioperatifpra_akeadaan" class="form-control">
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
								<div class="input-group">
									<input type="number" onfocus="this.select();" class="form-control" id="dacperioperatifpra_crespirasi">
									<span class="input-group-append">
										<span class="input-group-text">x/Menit</span>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label" title="Nadi">Nadi</label>
							</div>
							<div class="col-md-8">
								<div class="input-group">
									<input type="number" onfocus="this.select();" class="form-control" id="dacperioperatifpra_dnadi">
									<span class="input-group-append">
										<span class="input-group-text">x/Menit</span>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Skrining Nyeri</label>
							</div>
							<div class="col-md-9">
								<div class="row" id="dacperioperatifpra_nyeria">
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_nyeria_2').style.display='none'" name="dacperioperatifpra_nyeria" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_nyeria_1">
												<label class="custom-control-label" for="dacperioperatifpra_nyeria_1">Tidak</label>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_nyeria_2').style.display='block'" name="dacperioperatifpra_nyeria" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_nyeria_2">
												<label class="custom-control-label" for="dacperioperatifpra_nyeria_2">Ya</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row" id="dacperioperatifpra_div_nyeria_2" style="display:none;">
							<div class="col-md-1">
							</div>					
							<div class="col-md-2">
								<label class="col-form-label" title="Skala">Skala</label>
							</div>
							<div class="col-md-7">
								<div class="form-group">
									<select name="skr" id="dacperioperatifpra_nyeria2" class="form-control">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
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
							<div class="col-md-4">
								<div class="input-group">
									<span class="input-group-prepend">
										<span class="input-group-text">Kiri</span>
									</span>
									<select name="epupil1" id="dacperioperatifpra_epupil1" class="form-control">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
									</select>
								</div>
							</div>
							<div class="col-md-5">
								<div class="input-group">
									<span class="input-group-prepend">
										<span class="input-group-text">Kanan</span>
									</span>
									<select name="epupil2" id="dacperioperatifpra_epupil2" class="form-control">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
									</select>
									<span class="input-group-append">
										<span class="input-group-text">mm</span>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label" title="Tensi">Tensi</label>
							</div>
							<div class="col-md-8">
								<div class="input-group">
									<input type="number" onfocus="this.select();" class="form-control" id="dacperioperatifpra_ftensi1">
									<label class="col-form-label"> / </label>
									<input type="number" onfocus="this.select();" class="form-control" id="dacperioperatifpra_ftensi2">
									<span class="input-group-append">
										<span class="input-group-text">mmHg</span>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label" title="Tensi"></label>
							</div>
							<div class="col-md-8">
								<div class="input-group">
									<input type="text" id="dacperioperatifpra_fpalpasi" class="form-control" placeholder="Diisi jika Palpasi">
									<span class="input-group-append">
										<span class="input-group-text">Per palpasi</span>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label" title="Suhu">Suhu</label>
							</div>
							<div class="col-md-8">
								<div class="input-group">
									<input type="number" onfocus="this.select();" class="form-control" id="dacperioperatifpra_gsuhu">
									<span class="input-group-append">
										<span class="input-group-text">°C</span>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Resiko jatuh</label>
							</div>
							<div class="col-md-9">
								<div class="row" id="dacperioperatifpra_jatuha">
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_jatuha" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_jatuha_1">
												<label class="custom-control-label" for="dacperioperatifpra_jatuha_1">Rendah</label>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_jatuha" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_jatuha_2">
												<label class="custom-control-label" for="dacperioperatifpra_jatuha_2">Sedang</label>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_jatuha" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_jatuha_3">
												<label class="custom-control-label" for="dacperioperatifpra_jatuha_3">Tinggi</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>						
					</div>
					<div class="col-md-4">
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label" title="Spo2">SpO2</label>
							</div>
							<div class="col-md-8">
								<div class="input-group">
									<input type="number" onfocus="this.select();" class="form-control" id="dacperioperatifpra_hspo2">
									<span class="input-group-append">
										<span class="input-group-text">%</span>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label" title="Reflek Cahaya">Reflek Cahaya</label>
							</div>
							<div class="col-md-8">
								<div class="input-group">
									<span class="input-group-prepend">
										<span class="input-group-text">Kiri</span>
									</span>
									<select name="ireflek1" id="dacperioperatifpra_ireflek1" class="form-control">
										<option value="1">+</option>
										<option value="2">-</option>
									</select>
									-
									<span class="input-group-prepend">
										<span class="input-group-text">Kanan</span>
									</span>
									<select name="ireflek1" id="dacperioperatifpra_ireflek2" class="form-control">
										<option value="1">+</option>
										<option value="2">-</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-12">
								<label class="col-form-label text-danger font-weight-bold font-italic" title="Berat Badan">Note (*) Nominal ribuan = gram, satuan / puluhan / ratusan = kg</label>
							</div>
						</div>							
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label" title="Berat Badan">Berat Badan</label> <span class="text-danger">*</span>
							</div>
							<div class="col-md-8">
								<div class="input-group">
									<input type="number" onfocus="this.select();" class="form-control" id="dacperioperatifpra_jbb" value=0 onkeyup="dacperioperatifpraex.onChangeIMT();">
									<span class="input-group-append">
										<span class="input-group-text">Kg / Gram</span>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label" title="Tinggi Badan">Tinggi Badan</label>
							</div>
							<div class="col-md-8">
								<div class="input-group">
									<input type="number" value=0 onfocus="this.select();" class="form-control" id="dacperioperatifpra_jtb" onkeyup="dacperioperatifpraex.onChangeIMT();">
									<span class="input-group-append">
										<span class="input-group-text">Cm</span>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label" title="Tinggi Badan">IMT</label>
							</div>
							<div class="col-md-8">
								<input type="number" value=0 onfocus="this.select();" class="form-control" id="dacperioperatifpra_kimt">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label" title="Tinggi Badan">Kategori IMT</label>
							</div>
							<div class="col-md-8">
								<label class="col-form-label font-weight-bold" id="dacperioperatifpra_hasilimt">Kekurangan berat badan tingkat BERAT</label>
							</div>
						</div>						
					</div>
				</div>
				<div class="row "><br>
					<div class="col-md-12">
						<table class="table table-bordered table-sm">
							<thead></thead>
							<tbody>                            
								<tr>
									<td colspan="4" style="text-align: center;">
										<label class="form-label">Glasgow Coma Scale ( GCS )</label>
									</td>
								</tr>
								<tr>
									<td colspan="2">
										Kategori
									</td>
									<td>  
										Skor
									</td>
									<td>
										Hasil Skor
									</td>
								</tr>
								<tr >
									<td rowspan="4">
										Respon Buka Mata (Eye Opening : E)
									</td>
									<td onclick="dacrjasesmenmedisex_setScore(4, 1)">
										Spontan
									</td>
									<td>
										4
									</td>
									<td rowspan="4">
										<input type="text" name="eyeOpenAP" id="eyeOpenAP" class="form-control" value="4">
									</td>
								</tr>
								<tr >
									<td onclick="dacrjasesmenmedisex_setScore(3, 1)">
										Terhadap Suara
									</td>
									<td>
										3
									</td>
								</tr>
								<tr>
									<td onclick="dacrjasesmenmedisex_setScore(2, 1)">
										Terhadap Nyeri
									</td>
									<td>
										2
									</td>
								</tr>
								<tr>
									<td onclick="dacrjasesmenmedisex_setScore(1, 1)">
										Tidak ada
									</td>
									<td>
										1
									</td>
								</tr>
								<tr>
									<td rowspan="6">
										Respon Motorik Terbaik (M)
									</td>
									<td onclick="dacrjasesmenmedisex_setScore(6, 2)">
										Turut Perintah
									</td>
									<td>
										6
									</td>
									<td rowspan="6">
										<input type="text" name="ResponMotorikAP" id="responMotorikAP" class="form-control" value="6">
									</td>
								</tr>
								<tr>
									<td onclick="dacrjasesmenmedisex_setScore(5, 2)">
										Melokalisir Nyeri
									</td>
									<td>
										5
									</td>
								</tr>
								<tr>
									<td onclick="dacrjasesmenmedisex_setScore(4, 2)">
										Fleksi Normal (Menarik anggota gerak yang dirangsang)
									</td>
									<td>
										4
									</td>
								</tr>
								<tr>
									<td onclick="dacrjasesmenmedisex_setScore(3, 2)">
										Fleksi Abnormal (dekortikasi)
									</td>
									<td>
										3
									</td>
								</tr>
								<tr>
									<td onclick="dacrjasesmenmedisex_setScore(2, 2)">
										Ekstensi Abnormal (deserebrasi)
									</td>
									<td>
										2
									</td>
								</tr>
								<tr>
									<td onclick="dacrjasesmenmedisex_setScore(1, 2)">
										Tidak Ada (Flasid)
									</td>
									<td>
										1
									</td>
								</tr>
								<tr>
									<td rowspan="5">
										Respon Verbal (V)
									</td>
									<td onclick="dacrjasesmenmedisex_setScore(5, 3)">
										Berorientasi Baik
									</td>
									<td>
										5
									</td>
									<td rowspan="5">
										<input type="text" name="responVerbalAP" id="responVerbalAP" class="form-control" value="5">
									</td>
								</tr>
								<tr>
									<td onclick="dacrjasesmenmedisex_setScore(4, 3)">
										Berbicara mengacau (bingung)

									</td>
									<td>
										4
									</td>
								</tr>
								<tr>
									<td onclick="dacrjasesmenmedisex_setScore(3, 3)">
										Kata-Kata tidak teratur
									</td>
									<td>
										3
									</td>
								</tr>
								<tr>
									<td onclick="dacrjasesmenmedisex_setScore(2, 3)">
										Suara Tidak Jelas
									</td>
									<td>
										2
									</td>
								</tr>
								<tr>
									<td onclick="dacrjasesmenmedisex_setScore(1, 3)">
										Tidak Ada
									</td>
									<td>
										1
									</td>
								</tr>
								<tr>
									<td colspan="3">
										<select class="form-control" name="dacrjasesmenmedis_bgcstypeAP" id="dacrjasesmenmedis_bgcstypeAP">
											<option value="1">Compos mentis</option>
											<option value="2">Apatis</option>
											<option value="3">Somnolen</option>
											<option value="4">Delirium</option>
											<option value="5">Sopor</option>
											<option value="6">Coma</option>
										</select>
									</td>
									<td>
										<input type="text" class="form-control" name="dacrjasesmenmedis_bgcstotAP" id="dacrjasesmenmedis_bgcstotAP" value="15">
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group row">
							<div class="col-md-3  text-truncate">
								<label class="col-form-label">Status Emosional</label>
							</div>
							<div class="col-md-6">
								<div class="row" id="dacperioperatifpra_bemosi">
									<div class="col-md-6">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_bemosi_4').style.display='none'" name="dacperioperatifpra_bemosi" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_bemosi_1" checked>
												<label class="custom-control-label" for="dacperioperatifpra_bemosi_1">Tenang</label>
											</div>									
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_bemosi_4').style.display='none'" name="dacperioperatifpra_bemosi" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_bemosi_2">
												<label class="custom-control-label" for="dacperioperatifpra_bemosi_2">Gelisah</label>
											</div>									
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_bemosi_4').style.display='none'" name="dacperioperatifpra_bemosi" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_bemosi_3">
												<label class="custom-control-label" for="dacperioperatifpra_bemosi_3">Cemas</label>
											</div>									
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_bemosi_4').style.display='block'" name="dacperioperatifpra_bemosi" value="4" type="radio" class="custom-control-input" id="dacperioperatifpra_bemosi_4">
												<label class="custom-control-label" for="dacperioperatifpra_bemosi_4">Lain-lain</label>
											</div>
											<div class="row" id="dacperioperatifpra_div_bemosi_4" style="display:none;">
												<div class="col-md-1"></div>
												<div class="col-md-11">
													<input type="text" class="form-control" id="dacperioperatifpra_bemosiket">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-12  text-truncate">
								<label class="col-form-label">Visit Dokter</label>
							</div>
							<div class="col-md-3  text-truncate">
								<label class="col-form-label">&nbsp;- &nbsp;Asesmen Pre Operasi</label>
							</div>
							<div class="col-md-6">
								<div class="row" id="dacperioperatifpra_bvisitdrop">
									<div class="col-md-6">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_bvisitdrop" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_bvisitdrop_1" checked>
												<label class="custom-control-label" for="dacperioperatifpra_bvisitdrop_1">Tidak</label>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_bvisitdrop" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_bvisitdrop_2">
												<label class="custom-control-label" for="dacperioperatifpra_bvisitdrop_2">Ya</label>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3  text-truncate"></div>
							<div class="col-md-3  text-truncate">
								<label class="col-form-label">&nbsp;- &nbsp;Asesmen Pre Anestesi</label>
							</div>
							<div class="col-md-6">
								<div class="row" id="dacperioperatifpra_bvisitdrop">
									<div class="col-md-6">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_bvisitdran" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_bvisitdran_1" checked>
												<label class="custom-control-label" for="dacperioperatifpra_bvisitdran_1">Tidak</label>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_bvisitdran" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_bvisitdran_2">
												<label class="custom-control-label" for="dacperioperatifpra_bvisitdran_2">Ya</label>
											</div>
										</div>
									</div>
								</div>
							</div>
							
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group row">
							<div class="col-md-12 text-truncate">
								<label class="col-form-label">Untuk pasien wanita</label>
							</div>
							<div class="col-md-3 text-truncate">
								<label class="col-form-label">&nbsp;- &nbsp;Hamil</label>
							</div>
							<div class="col-md-6">
								<div class="row" id="dacperioperatifpra_bhamil">
									<div class="col-md-6">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_bhamil_2').style.display='none'" name="dacperioperatifpra_bhamil" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_bhamil_1" checked>
												<label class="custom-control-label" for="dacperioperatifpra_bhamil_1">Tidak</label>
											</div>									
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_bhamil_2').style.display='block'" name="dacperioperatifpra_bhamil" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_bhamil_2">
												<label class="custom-control-label" for="dacperioperatifpra_bhamil_2">Ya</label>
											</div>
											<div class="row" id="dacperioperatifpra_div_bhamil_2" style="display:none;">
												<div class="col-md-1"></div>
												<div class="col-md-11">
													<div class="input-group">
														<input type="text" onfocus="this.select();" class="form-control" id="dacperioperatifpra_bhamilket">
														<span class="input-group-append">
															<span class="input-group-text">Minggu</span>
														</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3  text-truncate"></div>
							<div class="col-md-3  text-truncate">
								<label class="col-form-label">&nbsp;- &nbsp;Haid</label>
							</div>
							<div class="col-md-6">
								<div class="row" id="dacperioperatifpra_bhaid">
									<div class="col-md-6">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_bhaid_2').style.display='none'" name="dacperioperatifpra_bhaid" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_bhaid_1" checked>
												<label class="custom-control-label" for="dacperioperatifpra_bhaid_1">Tidak</label>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_bhaid_2').style.display='block'" name="dacperioperatifpra_bhaid" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_bhaid_2">
												<label class="custom-control-label" for="dacperioperatifpra_bhaid_2">Ya</label>
											</div>
											<div class="row" id="dacperioperatifpra_div_bhaid_2" style="display:none;">
												<div class="col-md-1"></div>
												<div class="col-md-11">
													<div class="input-group">
														<input type="text" onfocus="this.select();" class="form-control" id="dacperioperatifpra_bhaidket">
														<span class="input-group-append">
															<span class="input-group-text">Hari</span>
														</span>
													</div>
												</div>
											</div>											
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3  text-truncate"></div>
						</div>
						<div class="form-group row">
							<div class="col-md-3  text-truncate">
								<label class="col-form-label">Premedikasi</label>
							</div>
							<div class="col-md-6">
								<div class="row" id="dacperioperatifpra_bpremedikasi">
									<div class="col-md-6">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_bpremedikasi_2').style.display='none'" name="dacperioperatifpra_bpremedikasi" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_bpremedikasi_1" checked>
												<label class="custom-control-label" for="dacperioperatifpra_bpremedikasi_1">Tidak</label>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_bpremedikasi_2').style.display='block'" name="dacperioperatifpra_bpremedikasi" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_bpremedikasi_2">
												<label class="custom-control-label" for="dacperioperatifpra_bpremedikasi_2">Ya</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row" id="dacperioperatifpra_div_bpremedikasi_2" style="display:none;">
							<div class="col-md-3 text-truncate"></div>
							<div class="col-md-9 ">
								<div class="row" id="dacperioperatifpra_bpremedikasipilihlist">
									<div class="col-md-12">
										<div class="form-group">
											<div class="row custom-control custom-radio custom-control-inline">
												<input name="dacperioperatifpra_bpremedikasipilihlist" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_bpremedikasipilihlist_1">
												<label class="custom-control-label" for="dacperioperatifpra_bpremedikasipilihlist_1">Antibiotik profilaksis</label>
											</div>
											<div id="dacperioperatifpra_div_bpremedikasipilihlist_1" class="row" style="display: none;">
												<div class="col-md-1  text-truncate">
												</div>
												<div class="col-md-5  text-truncate">
													<input type="text" onfocus="this.select();" class="form-control form-control-xs" id="dacperioperatifpra_bpremedikasipilihlistket1">
												</div>
												<div class="col-md-3  text-truncate">
													<div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">Dosis</span>
														</span>
														<input type="text" onfocus="this.select();" class="form-control form-control-xs" id="dacperioperatifpra_bdosis1">
													</div>
												</div>
												<div class="col-md-3">
													<div class="input-group date" id="dacperioperatifpra_dajam">
														<input id="dacperioperatifpra_bdosisijam1" name="bdosisijam1" type="time" value="<?php echo date('hh:mm:ss')?>" class="form-control form-control-xs">
													</div>
												</div>												
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<div class="row custom-control custom-radio custom-control-inline">
												<input name="dacperioperatifpra_bpremedikasipilihlist" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_bpremedikasipilihlist_2">
												<label class="custom-control-label" for="dacperioperatifpra_bpremedikasipilihlist_2">Lainnya</label>
											</div>
											<div id="dacperioperatifpra_div_bpremedikasipilihlist_2" class="row" style="display: none;">
												<div class="col-md-1  text-truncate">
													<span class="input-group-prepend">
														<span class="input-group-text">1</span>
													</span>
												</div>
												<div class="col-md-4  text-truncate">
													<input type="text" onfocus="this.select();" class="form-control" id="dacperioperatifpra_bpremedikasipilihlistket2">
												</div>
												<div class="col-md-3  text-truncate">
													<div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">Dosis</span>
														</span>
														<input type="text" onfocus="this.select();" class="form-control form-control-xs" id="dacperioperatifpra_bdosis2">
													</div>
												</div>
												<div class="col-md-4">
													<div class="input-group date" id="dacperioperatifpra_dajam2" data-target-input="nearest">
														<span class="input-group-prepend">
															<span class="input-group-text">Jam</span>
														</span>
														<input id="dacperioperatifpra_bdosisijam2" name="bdosisijam2" type="time"  class="form-control form-control-xs">
													</div>
												</div>												
												<div class="col-md-1  text-truncate">
													<span class="input-group-prepend">
														<span class="input-group-text">2</span>
													</span>
												</div>
												<div class="col-md-4  text-truncate mt-2">
													<input type="text" onfocus="this.select();" class="form-control" id="dacperioperatifpra_bpremedikasipilihlistket3">
												</div>
												<div class="col-md-3  text-truncate mt-2">
													<div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">Dosis</span>
														</span>
														<input type="text" onfocus="this.select();" class="form-control form-control-xs" id="dacperioperatifpra_bdosis3">
													</div>
												</div>
												<div class="col-md-4 mt-2">
													<div class="input-group date" id="dacperioperatifpra_dajam33" data-target-input="nearest">
														<span class="input-group-prepend">
															<span class="input-group-text">Jam</span>
														</span>
														<input id="dacperioperatifpra_bdosisijam3" name="bdosisijam3" type="time" class="form-control form-control-xs">
													</div>
												</div>												
												<div class="col-md-1  text-truncate ">
													<span class="input-group-prepend">
														<span class="input-group-text">3</span>
													</span>
												</div>
												<div class="col-md-4  text-truncate mt-2">
													<input type="text" onfocus="this.select();" class="form-control form-control-xs" id="dacperioperatifpra_bpremedikasipilihlistket4">
												</div>
												<div class="col-md-3  text-truncate mt-2">
													<div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">Dosis</span>
														</span>
														<input type="text" onfocus="this.select();" class="form-control form-control-xs" id="dacperioperatifpra_bdosis4">
													</div>
												</div>
												<div class="col-md-4 mt-2">
													<div class="input-group date" id="dacperioperatifpra_dajam44" data-target-input="nearest">
														<span class="input-group-prepend">
															<span class="input-group-text ">Jam</span>
														</span>
														<input id="dacperioperatifpra_bdosisijam4" name="bdosisijam4" type="time" class="form-control form-control-xs">
													</div>
												</div>												
											</div>					            			
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row" style="padding-top: 3px;">
							<div class="col-md-3  text-truncate">
								<label class="col-form-label">Skrining MRSA</label>
							</div>
							<div class="col-md-6">
								<div class="row" id="dacperioperatifpra_bskriningmrsa">
									<div class="col-md-6">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_bskriningmrsa_2').style.display='none'" name="dacperioperatifpra_bskriningmrsa" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_bskriningmrsa_1" checked>
												<label class="custom-control-label" for="dacperioperatifpra_bskriningmrsa_1">Tidak</label>
											</div>									
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_bskriningmrsa_2').style.display='block'" name="dacperioperatifpra_bskriningmrsa" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_bskriningmrsa_2">
												<label class="custom-control-label" for="dacperioperatifpra_bskriningmrsa_2">Ya</label>
											</div>
											<div id="dacperioperatifpra_div_bskriningmrsa_2" class="row" style="display:none;">
												<div class="col-md-1  text-truncate"></div>
												<div class="col-md-11 text-truncate">
													<div class="row" id="dacperioperatifpra_bskrininghasil">
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bskrininghasil" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_bskrininghasil_1">
																	<label class="custom-control-label" for="dacperioperatifpra_bskrininghasil_1">(+)</label>
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bskrininghasil" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_bskrininghasil_2">
																	<label class="custom-control-label" for="dacperioperatifpra_bskrininghasil_2">( - )</label>
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
		<div class="card"><!-- TANDA VITAL -->
			<div class="card-header" style="background-color:black;">
				<h3 class="card-title" style="color:white;">TANDA VITAL</h3>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse">
						<i class="fas fa-minus"></i>
					</button>			  
				</div>
				<!-- <i class="fas fa-user"></i> -->&nbsp;		
				<input id="dacperioperatifpra_gtandavitalId" name="gtandavitalId" type="hidden" value="0">
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-bordered table-condensed" width="100%">
								<tbody>
									<tr>
										<td width="30%" style="padding:3px;">
											<div class="row d-flex justify-content-center">
												<label class="col-form-label font-weight-bold">(Diisi oleh perawat ruangan dan kamar operasi)</label>
											</div>
										</td>
										<td width="20%" style="padding:3px;">
											<div class="row d-flex justify-content-center">
												<label class="col-form-label font-weight-bold">Ruangan</label>
											</div>
										</td>
										<td width="20%" style="padding:3px;">
											<div class="row d-flex justify-content-center">
												<label class="col-form-label font-weight-bold">Penerima OK</label>
											</div>
										</td>
										<td width="30%" style="padding:3px;">
											<div class="row d-flex justify-content-center">
												<label class="col-form-label font-weight-bold">Keterangan</label>
											</div>
										</td>
									</tr>
									<tr>
										<td width="30%" style="padding:3px;">
											<div class="row d-flex">
												<label class="col-form-label " style="padding-left: 10px;">Identifikasi sesuai gelang dan status pasien </label>
											</div>
										</td>
										<td width="20%" style="padding:3px;">
											<div class="row d-flex justify-content-center">
												<div class="col-md-2  text-truncate"> </div>
												<div class="col-md-9  text-truncate">
													<div class="row" id="dacperioperatifpra_cruangcek1">
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cruangcek1" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_cruangcek1_1">
																	<label class="custom-control-label" for="dacperioperatifpra_cruangcek1_1">Tidak</label>
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cruangcek1" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_cruangcek1_2" checked>
																	<label class="custom-control-label" for="dacperioperatifpra_cruangcek1_2">Ya</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td width="20%" style="padding:3px;">
											<div class="row d-flex justify-content-center">
												<div class="col-md-2  text-truncate"> </div>
												<div class="col-md-9  text-truncate">
													<div class="row" id="dacperioperatifpra_cokcek1">
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cokcek1" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_cokcek1_1" checked>
																	<label class="custom-control-label" for="dacperioperatifpra_cokcek1_1">Tidak</label>
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cokcek1" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_cokcek1_2">
																	<label class="custom-control-label" for="dacperioperatifpra_cokcek1_2">Ya</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td width="30%" style="padding:3px;">
											<div class="row d-flex">
												<div class="col-md-12">
													<textarea rows="1" name="dacperioperatifpra_cketcek1" id="dacperioperatifpra_cketcek1" style="width:100%;" class="form-control"></textarea>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td width="30%" style="padding:3px;">
											<div class="row d-flex">
												<label class="col-form-label " style="padding-left: 10px;">Surat ijin operasi</label>
											</div>
										</td>
										<td width="20%" style="padding:3px;">
											<div class="row d-flex justify-content-center">
												<div class="col-md-2  text-truncate"> </div>
												<div class="col-md-9  text-truncate">
													<div class="row" id="dacperioperatifpra_cruangcek2">
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cruangcek2" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_cruangcek2_1">
																	<label class="custom-control-label" for="dacperioperatifpra_cruangcek2_1">Tidak</label>
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cruangcek2" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_cruangcek2_2" checked>
																	<label class="custom-control-label" for="dacperioperatifpra_cruangcek2_2">Ya</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td width="20%" style="padding:3px;">
											<div class="row d-flex justify-content-center">
												<div class="col-md-2  text-truncate"> </div>
												<div class="col-md-9  text-truncate">
													<div class="row" id="dacperioperatifpra_cokcek2">
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cokcek2" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_cokcek2_1" checked>
																	<label class="custom-control-label" for="dacperioperatifpra_cokcek2_1">Tidak</label>
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cokcek2" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_cokcek2_2">
																	<label class="custom-control-label" for="dacperioperatifpra_cokcek2_2">Ya</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td width="30%" style="padding:3px;">
											<div class="row d-flex">
												<div class="col-md-12">
													<textarea rows="1" name="dacperioperatifpra_cketcek2" id="dacperioperatifpra_cketcek2" style="width:100%;" class="form-control"></textarea>
												</div>
											</div>
										</td>
									</tr>						    
									<tr>
										<td width="30%" style="padding:3px;">
											<div class="row d-flex">
												<label class="col-form-label " style="padding-left: 10px;">Surat ijin anastesi  </label>
											</div>
										</td>
										<td width="20%" style="padding:3px;">
											<div class="row d-flex justify-content-center">
												<div class="col-md-2  text-truncate"> </div>
												<div class="col-md-9  text-truncate">
													<div class="row" id="dacperioperatifpra_cruangcek3">
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cruangcek3" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_cruangcek3_1">
																	<label class="custom-control-label" for="dacperioperatifpra_cruangcek3_1">Tidak</label>
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cruangcek3" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_cruangcek3_2" checked>
																	<label class="custom-control-label" for="dacperioperatifpra_cruangcek3_2">Ya</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td width="20%" style="padding:3px;">
											<div class="row d-flex justify-content-center">
												<div class="col-md-2  text-truncate"> </div>
												<div class="col-md-9  text-truncate">
													<div class="row" id="dacperioperatifpra_cokcek3">
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cokcek3" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_cokcek3_1" checked>
																	<label class="custom-control-label" for="dacperioperatifpra_cokcek3_1">Tidak</label>
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cokcek3" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_cokcek3_2">
																	<label class="custom-control-label" for="dacperioperatifpra_cokcek3_2">Ya</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td width="30%" style="padding:3px;">
											<div class="row d-flex">
												<div class="col-md-12">
													<textarea rows="1" name="dacperioperatifpra_cketcek3" id="dacperioperatifpra_cketcek3" style="width:100%;" class="form-control"></textarea>
												</div>
											</div>
										</td>
									</tr>						    
									<tr>
										<td width="30%" style="padding:3px;">
											<div class="row d-flex">
												<label class="col-form-label " style="padding-left: 10px;">Puasa</label>
											</div>
										</td>
										<td width="20%" style="padding:3px;">
											<div class="row d-flex justify-content-center">
												<div class="col-md-2  text-truncate"> </div>
												<div class="col-md-9  text-truncate">
													<div class="row" id="dacperioperatifpra_cruangcek4">
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cruangcek4" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_cruangcek4_1">
																	<label class="custom-control-label" for="dacperioperatifpra_cruangcek4_1">Tidak</label>
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cruangcek4" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_cruangcek4_2" checked>
																	<label class="custom-control-label" for="dacperioperatifpra_cruangcek4_2">Ya</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td width="20%" style="padding:3px;">
											<div class="row d-flex justify-content-center">
												<div class="col-md-2  text-truncate"> </div>
												<div class="col-md-9  text-truncate">
													<div class="row" id="dacperioperatifpra_cokcek4">
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cokcek4" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_cokcek4_1" checked>
																	<label class="custom-control-label" for="dacperioperatifpra_cokcek4_1">Tidak</label>
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cokcek4" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_cokcek4_2">
																	<label class="custom-control-label" for="dacperioperatifpra_cokcek4_2">Ya</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td width="30%" style="padding:3px;">
											<div class="row d-flex">
												<div class="col-md-12">
													<textarea rows="1" name="dacperioperatifpra_cketcek4" id="dacperioperatifpra_cketcek4" style="width:100%;" class="form-control"></textarea>
												</div>
											</div>
										</td>
									</tr>						    
									<tr>
										<td width="30%" style="padding:3px;">
											<div class="row d-flex">
												<label class="col-form-label " style="padding-left: 10px;">Hasil laboratorium</label>
											</div>
										</td>
										<td width="20%" style="padding:3px;">
											<div class="row d-flex justify-content-center">
												<div class="col-md-2  text-truncate"> </div>
												<div class="col-md-9  text-truncate">
													<div class="row" id="dacperioperatifpra_cruangcek5">
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cruangcek5" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_cruangcek5_1">
																	<label class="custom-control-label" for="dacperioperatifpra_cruangcek5_1">Tidak</label>
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cruangcek5" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_cruangcek5_2" checked>
																	<label class="custom-control-label" for="dacperioperatifpra_cruangcek5_2">Ya</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td width="20%" style="padding:3px;">
											<div class="row d-flex justify-content-center">
												<div class="col-md-2  text-truncate"> </div>
												<div class="col-md-9  text-truncate">
													<div class="row" id="dacperioperatifpra_cokcek5">
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cokcek5" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_cokcek5_1" checked>
																	<label class="custom-control-label" for="dacperioperatifpra_cokcek5_1">Tidak</label>
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cokcek5" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_cokcek5_2">
																	<label class="custom-control-label" for="dacperioperatifpra_cokcek5_2">Ya</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td width="30%" style="padding:3px;">
											<div class="row d-flex">
												<div class="col-md-12">
													<textarea rows="1" name="dacperioperatifpra_cketcek5" id="dacperioperatifpra_cketcek5" style="width:100%;" class="form-control"></textarea>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td width="30%" style="padding:3px;">
											<div class="row d-flex">
												<label class="col-form-label " style="padding-left: 10px;">Hasil radiologi</label>
											</div>
										</td>
										<td width="20%" style="padding:3px;">
											<div class="row d-flex justify-content-center">
												<div class="col-md-2  text-truncate"> </div>
												<div class="col-md-9  text-truncate">
													<div class="row" id="dacperioperatifpra_cruangcek6">
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cruangcek6" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_cruangcek6_1">
																	<label class="custom-control-label" for="dacperioperatifpra_cruangcek6_1">Tidak</label>
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cruangcek6" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_cruangcek6_2" checked>
																	<label class="custom-control-label" for="dacperioperatifpra_cruangcek6_2">Ya</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td width="20%" style="padding:3px;">
											<div class="row d-flex justify-content-center">
												<div class="col-md-2  text-truncate"> </div>
												<div class="col-md-9  text-truncate">
													<div class="row" id="dacperioperatifpra_cokcek6">
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cokcek6" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_cokcek6_1" checked>
																	<label class="custom-control-label" for="dacperioperatifpra_cokcek6_1">Tidak</label>
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cokcek6" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_cokcek6_2">
																	<label class="custom-control-label" for="dacperioperatifpra_cokcek6_2">Ya</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td width="30%" style="padding:3px;">
											<div class="row d-flex">
												<div class="col-md-12">
													<textarea rows="1" name="dacperioperatifpra_cketcek6" id="dacperioperatifpra_cketcek6" style="width:100%;" class="form-control"></textarea>
												</div>
											</div>
										</td>
									</tr>						    
									<tr>
										<td width="30%" style="padding:3px;">
											<div class="row d-flex">
												<label class="col-form-label " style="padding-left: 10px;">Persiapan darah </label>
											</div>
										</td>
										<td width="20%" style="padding:3px;">
											<div class="row d-flex justify-content-center">
												<div class="col-md-2  text-truncate"> </div>
												<div class="col-md-9  text-truncate">
													<div class="row" id="dacperioperatifpra_cruangcek7">
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cruangcek7" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_cruangcek7_1">
																	<label class="custom-control-label" for="dacperioperatifpra_cruangcek7_1">Tidak</label>
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cruangcek7" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_cruangcek7_2" checked>
																	<label class="custom-control-label" for="dacperioperatifpra_cruangcek7_2">Ya</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td width="20%" style="padding:3px;">
											<div class="row d-flex justify-content-center">
												<div class="col-md-2  text-truncate"> </div>
												<div class="col-md-9  text-truncate">
													<div class="row" id="dacperioperatifpra_cokcek7">
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cokcek7" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_cokcek7_1" checked>
																	<label class="custom-control-label" for="dacperioperatifpra_cokcek7_1">Tidak</label>
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cokcek7" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_cokcek7_2">
																	<label class="custom-control-label" for="dacperioperatifpra_cokcek7_2">Ya</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td width="30%" style="padding:3px;">
											<div class="row d-flex">
												<div class="col-md-12">
													<textarea rows="1" name="dacperioperatifpra_cketcek7" id="dacperioperatifpra_cketcek7" style="width:100%;" class="form-control"></textarea>
												</div>
											</div>
										</td>
									</tr>						    
									<tr>
										<td width="30%" style="padding:3px;">
											<div class="row d-flex">
												<label class="col-form-label " style="padding-left: 10px;">Protesa luar dilepas (gigi palsu, lensa kontak)</label>
											</div>
										</td>
										<td width="20%" style="padding:3px;">
											<div class="row d-flex justify-content-center">
												<div class="col-md-2  text-truncate"> </div>
												<div class="col-md-9  text-truncate">
													<div class="row" id="dacperioperatifpra_cruangcek8">
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cruangcek8" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_cruangcek8_1">
																	<label class="custom-control-label" for="dacperioperatifpra_cruangcek8_1">Tidak</label>
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cruangcek8" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_cruangcek8_2" checked>
																	<label class="custom-control-label" for="dacperioperatifpra_cruangcek8_2">Ya</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td width="20%" style="padding:3px;">
											<div class="row d-flex justify-content-center">
												<div class="col-md-2  text-truncate"> </div>
												<div class="col-md-9  text-truncate">
													<div class="row" id="dacperioperatifpra_cokcek8">
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cokcek8" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_cokcek8_1" checked>
																	<label class="custom-control-label" for="dacperioperatifpra_cokcek8_1">Tidak</label>
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cokcek8" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_cokcek8_2">
																	<label class="custom-control-label" for="dacperioperatifpra_cokcek8_2">Ya</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td width="30%" style="padding:3px;">
											<div class="row d-flex">
												<div class="col-md-12">
													<textarea rows="1" name="dacperioperatifpra_cketcek8" id="dacperioperatifpra_cketcek8" style="width:100%;" class="form-control"></textarea>
												</div>
											</div>
										</td>
									</tr>						    
									<tr>
										<td width="30%" style="padding:3px;">
											<div class="row d-flex">
												<label class="col-form-label " style="padding-left: 10px;">Protesa dalam (alat pacu jantung, dll)</label>
											</div>
										</td>
										<td width="20%" style="padding:3px;">
											<div class="row d-flex justify-content-center">
												<div class="col-md-2  text-truncate"> </div>
												<div class="col-md-9  text-truncate">
													<div class="row" id="dacperioperatifpra_cruangcek9">
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cruangcek9" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_cruangcek9_1">
																	<label class="custom-control-label" for="dacperioperatifpra_cruangcek9_1">Tidak</label>
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cruangcek9" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_cruangcek9_2" checked>
																	<label class="custom-control-label" for="dacperioperatifpra_cruangcek9_2">Ya</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td width="20%" style="padding:3px;">
											<div class="row d-flex justify-content-center">
												<div class="col-md-2  text-truncate"> </div>
												<div class="col-md-9  text-truncate">
													<div class="row" id="dacperioperatifpra_cokcek9">
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cokcek9" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_cokcek9_1" checked>
																	<label class="custom-control-label" for="dacperioperatifpra_cokcek9_1">Tidak</label>
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cokcek9" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_cokcek9_2">
																	<label class="custom-control-label" for="dacperioperatifpra_cokcek9_2">Ya</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td width="30%" style="padding:3px;">
											<div class="row d-flex">
												<div class="col-md-12">
													<textarea rows="1" name="dacperioperatifpra_cketcek9" id="dacperioperatifpra_cketcek9" style="width:100%;" class="form-control"></textarea>
												</div>
											</div>
										</td>
									</tr>						    
									<tr>
										<td width="30%" style="padding:3px;">
											<div class="row d-flex">
												<label class="col-form-label " style="padding-left: 10px;" >Persiapan kulit</label>
											</div>
										</td>
										<td width="20%" style="padding:3px;">
										</td>
										<td width="20%" style="padding:3px;">

										</td>
										<td width="30%" style="padding:3px;">
										</td>
									</tr>						    
									<tr>
										<td width="30%" style="padding:3px;">
											<div class="row d-flex">
												<label class="col-form-label " style="padding-left: 10px;">    • Mandi Sabun yang digunakan : Sabun Chlorhexidine/ Sabun Biasa</label>
											</div>
										</td>
										<td width="20%" style="padding:3px;">
											<div class="row d-flex justify-content-center">
												<div class="col-md-2  text-truncate"> </div>
												<div class="col-md-9  text-truncate">
													<div class="row" id="dacperioperatifpra_cruangcek11">
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cruangcek11" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_cruangcek11_1">
																	<label class="custom-control-label" for="dacperioperatifpra_cruangcek11_1">Tidak</label>
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cruangcek11" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_cruangcek11_2" checked>
																	<label class="custom-control-label" for="dacperioperatifpra_cruangcek11_2" >Ya</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td width="20%" style="padding:3px;">
											<div class="row d-flex justify-content-center">
												<div class="col-md-2  text-truncate"> </div>
												<div class="col-md-9  text-truncate">
													<div class="row" id="dacperioperatifpra_cokcek11">
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cokcek11" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_cokcek11_1" checked>
																	<label class="custom-control-label" for="dacperioperatifpra_cokcek11_1">Tidak</label>
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cokcek11" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_cokcek11_2">
																	<label class="custom-control-label" for="dacperioperatifpra_cokcek11_2">Ya</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td width="30%" style="padding:3px;">
											<div class="row d-flex">
												<div class="col-md-12">
													<textarea rows="1" name="dacperioperatifpra_cketcek11" id="dacperioperatifpra_cketcek11" style="width:100%;" class="form-control"></textarea>
												</div>
											</div>
										</td>
									</tr>						    
									<tr>
										<td width="30%" style="padding:3px;">
											<div class="row d-flex">
												<label class="col-form-label " style="padding-left: 10px;">    • Cukur
												Jam Pencukuran      : Metode Pencukuran : Clipper/ Silet</label>
											</div>
										</td>
										<td width="20%" style="padding:3px;">
											<div class="row d-flex justify-content-center">
												<div class="col-md-2  text-truncate"> </div>
												<div class="col-md-9  text-truncate">
													<div class="row" id="dacperioperatifpra_cruangcek12">
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cruangcek12" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_cruangcek12_1" >
																	<label class="custom-control-label" for="dacperioperatifpra_cruangcek12_1">Tidak</label>
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cruangcek12" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_cruangcek12_2" checked>
																	<label class="custom-control-label" for="dacperioperatifpra_cruangcek12_2">Ya</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td width="20%" style="padding:3px;">
											<div class="row d-flex justify-content-center">
												<div class="col-md-2  text-truncate"> </div>
												<div class="col-md-9  text-truncate">
													<div class="row" id="dacperioperatifpra_cokcek12">
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cokcek12" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_cokcek12_1" checked>
																	<label class="custom-control-label" for="dacperioperatifpra_cokcek12_1">Tidak</label>
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cokcek12" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_cokcek12_2">
																	<label class="custom-control-label" for="dacperioperatifpra_cokcek12_2">Ya</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td width="30%" style="padding:3px;">
											<div class="row d-flex">
												<div class="col-md-12">
													<textarea rows="1" name="dacperioperatifpra_cketcek12" id="dacperioperatifpra_cketcek12" style="width:100%;" class="form-control"></textarea>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td width="30%" style="padding:3px;">
											<div class="row d-flex">
												<label class="col-form-label " style="padding-left: 10px;">Pengosongan saluran cerna</label>
											</div>
										</td>
										<td width="20%" style="padding:3px;">
											<div class="row d-flex justify-content-center">
												<div class="col-md-2  text-truncate"> </div>
												<div class="col-md-9  text-truncate">
													<div class="row" id="dacperioperatifpra_cruangcek13">
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cruangcek13" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_cruangcek13_1" >
																	<label class="custom-control-label" for="dacperioperatifpra_cruangcek13_1">Tidak</label>
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cruangcek13" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_cruangcek13_2" checked>
																	<label class="custom-control-label" for="dacperioperatifpra_cruangcek13_2">Ya</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td width="20%" style="padding:3px;">
											<div class="row d-flex justify-content-center">
												<div class="col-md-2  text-truncate"> </div>
												<div class="col-md-9  text-truncate">
													<div class="row" id="dacperioperatifpra_cokcek13">
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cokcek13" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_cokcek13_1" checked>
																	<label class="custom-control-label" for="dacperioperatifpra_cokcek13_1">Tidak</label>
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cokcek13" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_cokcek13_2">
																	<label class="custom-control-label" for="dacperioperatifpra_cokcek13_2">Ya</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td width="30%" style="padding:3px;">
											<div class="row d-flex">
												<div class="col-md-12">
													<textarea rows="1" name="dacperioperatifpra_cketcek13" id="dacperioperatifpra_cketcek13" style="width:100%;" class="form-control"></textarea>
												</div>
											</div>
										</td>
									</tr>						    
									<tr>
										<td width="30%" style="padding:3px;">
											<div class="row d-flex">
												<label class="col-form-label " style="padding-left: 10px;">Perhiasan, baju dilepas</label>
											</div>
										</td>
										<td width="20%" style="padding:3px;">
											<div class="row d-flex justify-content-center">
												<div class="col-md-2  text-truncate"> </div>
												<div class="col-md-9  text-truncate">
													<div class="row" id="dacperioperatifpra_cruangcek14">
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cruangcek14" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_cruangcek14_1" >
																	<label class="custom-control-label" for="dacperioperatifpra_cruangcek14_1">Tidak</label>
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cruangcek14" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_cruangcek14_2" checked>
																	<label class="custom-control-label" for="dacperioperatifpra_cruangcek14_2">Ya</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td width="20%" style="padding:3px;">
											<div class="row d-flex justify-content-center">
												<div class="col-md-2  text-truncate"> </div>
												<div class="col-md-9  text-truncate">
													<div class="row" id="dacperioperatifpra_cokcek14">
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cokcek14" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_cokcek14_1" checked>
																	<label class="custom-control-label" for="dacperioperatifpra_cokcek14_1">Tidak</label>
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cokcek14" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_cokcek14_2">
																	<label class="custom-control-label" for="dacperioperatifpra_cokcek14_2">Ya</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td width="30%" style="padding:3px;">
											<div class="row d-flex">
												<div class="col-md-12">
													<textarea rows="1" name="dacperioperatifpra_cketcek14" id="dacperioperatifpra_cketcek14" style="width:100%;" class="form-control"></textarea>
												</div>
											</div>
										</td>
									</tr>						    
									<tr>
										<td width="30%" style="padding:3px;">
											<div class="row d-flex">
												<label class="col-form-label " style="padding-left: 10px;">Terpasang  kateter</label>
											</div>
										</td>
										<td width="20%" style="padding:3px;">
											<div class="row d-flex justify-content-center">
												<div class="col-md-2  text-truncate"> </div>
												<div class="col-md-9  text-truncate">
													<div class="row" id="dacperioperatifpra_cruangcek15">
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cruangcek15" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_cruangcek15_1" >
																	<label class="custom-control-label" for="dacperioperatifpra_cruangcek15_1">Tidak</label>
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cruangcek15" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_cruangcek15_2" checked>
																	<label class="custom-control-label" for="dacperioperatifpra_cruangcek15_2">Ya</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td width="20%" style="padding:3px;">
											<div class="row d-flex justify-content-center">
												<div class="col-md-2  text-truncate"> </div>
												<div class="col-md-9  text-truncate">
													<div class="row" id="dacperioperatifpra_cokcek15">
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cokcek15" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_cokcek15_1" >
																	<label class="custom-control-label" for="dacperioperatifpra_cokcek15_1">Tidak</label>
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cokcek15" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_cokcek15_2" checked>
																	<label class="custom-control-label" for="dacperioperatifpra_cokcek15_2">Ya</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td width="30%" style="padding:3px;">
											<div class="row d-flex">
												<div class="col-md-12">
													<textarea rows="1" name="dacperioperatifpra_cketcek15" id="dacperioperatifpra_cketcek15" style="width:100%;" class="form-control"></textarea>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td width="30%" style="padding:3px;">
											<div class="row d-flex">
												<label class="col-form-label " style="padding-left: 10px;">Terpasang  infus</label>
											</div>
										</td>
										<td width="20%" style="padding:3px;">
											<div class="row d-flex justify-content-center">
												<div class="col-md-2  text-truncate"> </div>
												<div class="col-md-9  text-truncate">
													<div class="row" id="dacperioperatifpra_cruangcek16">
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cruangcek16" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_cruangcek16_1" >
																	<label class="custom-control-label" for="dacperioperatifpra_cruangcek16_1">Tidak</label>
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cruangcek16" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_cruangcek16_2" checked>
																	<label class="custom-control-label" for="dacperioperatifpra_cruangcek16_2">Ya</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td width="20%" style="padding:3px;">
											<div class="row d-flex justify-content-center">
												<div class="col-md-2  text-truncate"> </div>
												<div class="col-md-9  text-truncate">
													<div class="row" id="dacperioperatifpra_cokcek16">
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cokcek16" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_cokcek16_1" >
																	<label class="custom-control-label" for="dacperioperatifpra_cokcek16_1">Tidak</label>
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_cokcek16" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_cokcek16_2" checked>
																	<label class="custom-control-label" for="dacperioperatifpra_cokcek16_2">Ya</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td width="30%" style="padding:3px;">
											<div class="row d-flex">
												<div class="col-md-12">
													<textarea rows="1" name="dacperioperatifpra_cketcek16" id="dacperioperatifpra_cketcek16" style="width:100%;" class="form-control"></textarea>
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
		<div class="card"><!-- Asuhan Keperawatan Pra Operasi -->
			<div class="card-header" style="background-color:black;">
				<h3 class="card-title" style="color:white;">Asuhan Keperawatan Pra Operasi</h3>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse">
						<i class="fas fa-minus"></i>
					</button>			  
				</div>			
			</div>
			<div class="card-body" >
				<div class="row" >
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-bordered table-condensed" width="100%">
								<tbody >
									<tr>
										<td width="33%" style="padding:3px;">
											<div class="row d-flex justify-content-center">
												<label class="col-form-label font-weight-bold">DIAGNOSIS KEPERAWATAN </label>
											</div>
										</td>
										<td width="33%" style="padding:3px;">
											<div class="row d-flex justify-content-center">
												<label class="col-form-label font-weight-bold">LUARAN KEPERAWATAN</label>
											</div>
										</td>
										<td width="34%" style="padding:3px;">
											<div class="row d-flex justify-content-center">
												<label class="col-form-label font-weight-bold">INTERVENSI KEPERAWATAN </label>
											</div>
										</td>
									</tr>
									<tr>
										<td style="padding:3px;">
											<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
												<label class="col-form-label ">Ansietas  (D.0080) </label>
											</div>
											<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
												<label class="col-form-label">Berhubungan dengan :  </label>
											</div>
											<div class="row" style="padding:3px;margin-inline-start: 15px">
												<div class="col-md-12  text-truncate">
													<div class="row" id="divdacperioperatifpra_asuhan1">
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan1" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan1_1">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan1_1">Krisis situasional</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan1" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan1_2">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan1_2">Ancaman terhadap kematian</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan1" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan1_3">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan1_3">Kekhawatiran mengalami kegagalan </label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
												<label class="col-form-label">Dibuktikan  Dengan :  </label>
											</div>
											<div class="row" style="padding:3px;margin-inline-start: 15px">
												<div class="col-md-12 text-truncate">
													<div class="row" id="dacperioperatifpra_asuhan2">
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan2" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan2_1">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan2_1">Tampak gelisah</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan2" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan2_2">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan2_2">Tampak tegang</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan2" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan2_3">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan2_3">Sulit tidur</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan2" value="4" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan2_4">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan2_4">Merasa bingung</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan2" value="5" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan2_5">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan2_5">Merasa khawatir dengan akibat dari kondisi yang dihadapi</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td style="padding:3px;">
											<div class="row d-flex" style="padding:3px;margin-inline-end: 15px">
												<label class="col-form-label ">Setelah dilakukan intervensi selama</label>
												<input type="text" name="dacperioperatifpra_asuhan3" id="dacperioperatifpra_asuhan3" style="width:100%;" class="form-control">
											</div>
											<div class="row d-flex" style="padding:3px;margin-inline-end: 15px">
												<label class="col-form-label ">Maka Tingkat Ansietas  (L.09093) Menurun, dengan Kriteria Hasil :  </label>
											</div>
											<div class="row" style="padding:3px;margin-inline-end: 15px">
												<div class="col-md-12  text-truncate">
													<div class="row" id="dacperioperatifpra_asuhan4">
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan4" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan4_1">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan4_1">Verbalisasi kebingungan menurun</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan4" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan4_2">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan4_2">Verbal khawatir akibat kondisi yang dihadapi menurun</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan4" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan4_3">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan4_3">Perilaku gelisah menurun</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan4" value="4" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan4_4">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan4_4">Perilaku tegang menurun</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan4" value="5" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan4_5">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan4_5">Orientasi membaik</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td style="padding:3px;">
											<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
												<label class="col-form-label ">Reduksi Ansietas (I.09314)</label>
											</div>
											<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
												<label class="col-form-label">Observasi </label>
											</div>
											<div class="row" style="padding:3px;margin-inline-start: 15px">
												<div class="col-md-12  text-truncate">
													<div class="row" id="dacperioperatifpra_asuhan5">
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan5" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan5_1">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan5_1">Identifikasi saat tingkat ansietas berubah ( mis, kondisi, waktu, stresor )</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan5" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan5_2">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan5_2">Identifikasi kemampuan mengambil keputusan </label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
												<label class="col-form-label">Terapeutik </label>
											</div>
											<div class="row" style="padding:3px;margin-inline-start: 15px">
												<div class="col-md-12 text-truncate">
													<div class="row" id="dacperioperatifpra_asuhan6">
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan6" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan6_1">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan6_1">Ciptakan suasana terapeutik untuk menumbuhkan kepercayaan</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan6" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan6_2">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan6_2">Temani pasien untuk mengurangi kecemasan, jika memungkinkan</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan6" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan6_3">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan6_3">Pahami situasi yang membuat ansietas </label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan6" value="4" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan6_4">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan6_4">Dengarkan dengan penuh perhatian </label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
												<label class="col-form-label">Edukasi </label>
											</div>
											<div class="row" style="padding:3px;margin-inline-start: 15px">
												<div class="col-md-12 text-truncate">
													<div class="row" id="dacperioperatifpra_asuhan7">
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan7" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan7_1">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan7_1">Jelaskan prosedur, termasuk sensasi yang mungkin di alami</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan7" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan7_2">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan7_2">Informasikan secara faktual mengenai diagnosa, pengobatan, dan prognosis </label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
												<label class="col-form-label">Kolaborasi </label>
											</div>
											<div class="row" style="padding:3px;margin-inline-start: 15px">
												<div class="col-md-12 text-truncate">
													<div class="row" id="dacperioperatifpra_asuhan8">
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-checkbox custom-control-inline">
																	<input name="dacperioperatifpra_asuhan8" value="1" type="checkbox" class="custom-control-input" id="dacperioperatifpra_asuhan8_1">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan8_1">Kolaborasi pemberian antiansietas, jika perlu</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td style="padding:3px;">
											<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
												<label class="col-form-label ">Defisit Pengetahuan (D.0111) </label>
											</div>
											<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
												<label class="col-form-label">Berhubungan dengan :  </label>
											</div>
											<div class="row" style="padding:3px;margin-inline-start: 15px">
												<div class="col-md-12  text-truncate">
													<div class="row" id="dacperioperatifpra_asuhan9">
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan9" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan9_1">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan9_1">Keteratasan kognitif</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan9" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan9_2">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan9_2">Gangguan fungsi kognitif</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan9" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan9_3">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan9_3">Kekeliruan mengikuti anjuran</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan9" value="4" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan9_4">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan9_4">Kurang terpapar informasi</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan9" value="5" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan9_5">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan9_5">Kurang minat daiam beiajar</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan9" value="6" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan9_6">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan9_6">Kurang mampu mengingat</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan9" value="7" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan9_7">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan9_7">Ketidaktahuan menemukan sumber informasi</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
												<label class="col-form-label">Dibuktikan  Dengan :  </label>
											</div>
											<div class="row" style="padding:3px;margin-inline-start: 15px">
												<div class="col-md-12 text-truncate">
													<div class="row" id="dacperioperatifpra_asuhan10">
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan10" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan10_1">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan10_1">Menanyakan masalah yang dihadapi</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan10" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan10_2">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan10_2">Menunjukan perilaku tidak sesuai anjuran</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan10" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan10_3">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan10_3">Menunjukkan persepsi yang keliru terhadap masalah</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td  style="padding:3px;">
											<div class="row d-flex" style="padding:3px;margin-inline-end: 15px">
												<label class="col-form-label ">Setelah dilakukan intervensi selama</label>
												<input type="text" name="dacperioperatifpra_asuhan11" id="dacperioperatifpra_asuhan11" style="width:100%;" class="form-control">
											</div>
											<div class="row d-flex" style="padding:3px;margin-inline-end: 15px">
												<label class="col-form-label ">Maka Tingkat Pengetahuan (L.12111) Meningkat, dengan Kriteria Hasil :  </label>
											</div>
											<div class="row" style="padding:3px;margin-inline-end: 15px">
												<div class="col-md-12  text-truncate">
													<div class="row" id="dacperioperatifpra_asuhan12">
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan12" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan12_1">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan12_1">Perilaku sesuai anjuran meningkat *</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan12" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan12_2">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan12_2">Verbalisasi minat daiam beiajar meningkat  meningkat *</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan12" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan12_3">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan12_3">Kemampuan menjeiaskan pengetahuan tentang suatu topik meningkat *</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan12" value="4" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan12_4">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan12_4">Perilaku membaik</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td  style="padding:3px;">
											<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
												<label class="col-form-label ">Eduksi Kesahatan (I.12384)</label>
											</div>
											<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
												<label class="col-form-label">Observasi </label>
											</div>
											<div class="row" style="padding:3px;margin-inline-start: 15px">
												<div class="col-md-12  text-truncate">
													<div class="row" id="dacperioperatifpra_asuhan13">
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan13" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan13_1">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan13_1">Identifikasi kesiapan dan kemampuan menerima informasi</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan13" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan13_2">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan13_2">Identifikasi kebutuhan keseiamatan berdasarkan tingkat fungsi fisik, kognitif dan kebiasaan</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
												<label class="col-form-label">Terapeutik </label>
											</div>
											<div class="row" style="padding:3px;margin-inline-start: 15px">
												<div class="col-md-12 text-truncate">
													<div class="row" id="dacperioperatifpra_asuhan14">
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan14" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan14_1">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan14_1">Sediakan materi dan media pendidikan kesehatan</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan14" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan14_2">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan14_2">Berikan kesempatan untuk bertanya</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
												<label class="col-form-label">Edukasi </label>
											</div>
											<div class="row" style="padding:3px;margin-inline-start: 15px">
												<div class="col-md-12 text-truncate">
													<div class="row" id="dacperioperatifpra_asuhan15">
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan15" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan15_1">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan15_1">Anjurkan menghilangkan bahaya lingkungan</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
												<label class="col-form-label">Kolaborasi </label>
											</div>
											<div class="row" style="padding:3px;margin-inline-start: 15px">
												<div class="col-md-12 text-truncate">
													<div class="row" id="dacperioperatifpra_asuhan16">
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-checkbox custom-control-inline">
																	<input name="dacperioperatifpra_asuhan16" value="1" type="checkbox" class="custom-control-input" id="dacperioperatifpra_asuhan16_1">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan16_1">Koiaborasi dengan pihak lain untuk meningkatkan keamanan lingkungan </label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td style="padding:3px;">
											<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
												<label class="col-form-label ">Resiko Hipotermia Perioperatif (D. 0141)</label>
											</div>
											<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
												<label class="col-form-label">Dibuktikan dengan :  </label>
											</div>
											<div class="row" style="padding:3px;margin-inline-start: 15px">
												<div class="col-md-12  text-truncate">
													<div class="row" id="dacperioperatifpra_asuhan17">
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan17" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan17_1">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan17_1">Prosedur pembedahan</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan17" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan17_2">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan17_2">Kombinasi anastesi regional dan umum</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan17" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan17_3">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan17_3">Suhu pra-operasi rendah (&lt;36°C)</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan17" value="4" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan17_4">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan17_4">Berat badan rendah</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan17" value="5" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan17_5">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan17_5">Suhu lingkungan rendah</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan17" value="6" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan17_6">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan17_6">Transfer panas</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td style="padding:3px;">
											<div class="row d-flex" style="padding:3px;margin-inline-end: 15px">
												<label class="col-form-label ">Setelah dilakukan intervensi selama</label>
												<input type="text" name="dacperioperatifpra_asuhan18" id="dacperioperatifpra_asuhan18" style="width:100%;" class="form-control">
											</div>
											<div class="row d-flex" style="padding:3px;margin-inline-end: 15px">
												<label class="col-form-label ">Maka Termoregulasi (L.14134) Membaik, dengan Kriteria Hasil :  </label>
											</div>
											<div class="row" style="padding:3px;margin-inline-end: 15px">
												<div class="col-md-12  text-truncate">
													<div class="row" id="dacperioperatifpra_asuhan19">
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan19" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan19_1">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan19_1">Mengigil menurun*</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan19" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan19_2">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan19_2">Kulit merah menurun*</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan19" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan19_3">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan19_3">Akrosianosis menurun*</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan19" value="4" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan19_4">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan19_4">Pucat menurun*</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan19" value="5" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan19_5">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan19_5">Takikardi menurun*</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan19" value="6" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan19_6">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan19_6">Takipnea menurun*</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan19" value="7" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan19_7">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan19_7">Baradikardi menurun</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan19" value="8" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan19_8">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan19_8">Hipoksia menurun</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan19" value="9" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan19_9">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan19_9">Suhu tubuh membaik</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan19" value="10" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan19_10">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan19_10">Suhu kulit membaik</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan19" value="11" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan19_11">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan19_11">Pengisian kapiler membaik</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan19" value="12" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan19_12">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan19_12">Ventilasi&nbsp; membaik</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan19" value="13" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan19_13">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan19_13">Tekanan darah membaik</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td style="padding:3px;">
											<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
												<label class="col-form-label ">Manajemen Hipotermia (I.14507)</label>
											</div>
											<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
												<label class="col-form-label">Observasi </label>
											</div>
											<div class="row" style="padding:3px;margin-inline-start: 15px">
												<div class="col-md-12  text-truncate">
													<div class="row" id="dacperioperatifpra_asuhan20">
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan20" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan20_1">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan20_1">Monitor suhu tubuh</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan20" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan20_2">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan20_2">Identifikasi penyebab hipotermia</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan20" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan20_3">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan20_3">Monitor tanda dan gejala hipotermia</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
												<label class="col-form-label">Terapeutik </label>
											</div>
											<div class="row" style="padding:3px;margin-inline-start: 15px">
												<div class="col-md-12 text-truncate">
													<div class="row" id="dacperioperatifpra_asuhan21">
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan21" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan21_1">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan21_1">Sediakan lingkungan yang hangat (mis: atur suhu ruangan, inkubator)</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan21" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan21_2">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan21_2">Ganti pakaian atau linen yang basar</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_asuhan21" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_asuhan21_3">
																	<label class="custom-control-label" for="dacperioperatifpra_asuhan21_3">Lakukan penghangatan pasif (mis: selimut, menutu kepala, pakaian tebal)</label>
																</div>
															</div>
														</div>
													</div>
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
			<div class="card-footer">
				<button class="btn btn-primary btn-sm" onclick="BtnPraOperasi()"><i class="fas fa-save"></i> Simpan</button>
			</div>
		</div>
		<div class="card"><!-- B. DOKUMENTASI KEPERAWATAN INTRA OPERASI -->
			<div class="card-header" style="background-color:black;">
				<h3 class="card-title" style="color:white;">B. DOKUMENTASI KEPERAWATAN INTRA OPERASI</h3>
				<div class="card-tools">
					<label class="col-form-label font-italic" style="color:white;"> ( diisi oleh perawat kamar operasi ) </label>
					<button type="button" class="btn btn-tool" data-card-widget="collapse">
						<i class="fas fa-minus"></i>
					</button>			  
				</div>
			</div>		
			<div class="card-body">
				<div class="row ">
					<div class="col-md-6">
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">ID</label>
							</div>
							<div class="col-md-3">
								<input id="dacperioperatifpra_id2" name="id2" type="hidden" class="form-control" readonly="readonly" value="10">
							</div>
							<div class="col-md-6">
								<b><i><label class="col-form-label" id="dacperioperatifpra_note2"></label></i></b>
							</div>
						</div>				
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Tempat Operasi</label>
							</div>
							<div class="col-md-9">
								<div class="row" id="divdacperioperatifpra_tempatok">
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_tempatok" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_tempatok_1">
												<label class="custom-control-label" for="dacperioperatifpra_tempatok_1">OK 1</label>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_tempatok" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_tempatok_2">
												<label class="custom-control-label" for="dacperioperatifpra_tempatok_2">OK 2</label>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_tempatok" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_tempatok_3">
												<label class="custom-control-label" for="dacperioperatifpra_tempatok_3">OK 3</label>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_tempatok" value="4" type="radio" class="custom-control-input" id="dacperioperatifpra_tempatok_4">
												<label class="custom-control-label" for="dacperioperatifpra_tempatok_4">OK 4</label>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_tempatok" value="5" type="radio" class="custom-control-input" id="dacperioperatifpra_tempatok_5">
												<label class="custom-control-label" for="dacperioperatifpra_tempatok_5">OK 5</label>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_tempatok" value="6" type="radio" class="custom-control-input" id="dacperioperatifpra_tempatok_6">
												<label class="custom-control-label" for="dacperioperatifpra_tempatok_6">OK 6</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group row">
							<div class="col-md-3  text-truncate">
								<label class="col-form-label">Mulai Operasi</label>
							</div>
							<div class="col-md-4">
								<div class="input-group date" id="dacperioperatifpra_datglmulaiop" data-target-input="nearest">
									<input id="dacperioperatifpra_atglmulaiop" name="atglmulaiop" type="date" class="form-control datetimepicker-input" >
									<div class="input-group-append" data-target="#dacperioperatifpra_datglmulaiop" data-toggle="datetimepicker">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3  text-truncate">
								<label class="col-form-label">Selesai Operasi</label>
							</div>
							<div class="col-md-4">
								<div class="input-group date" id="dacperioperatifpra_datglselesaiop" data-target-input="nearest">
									<input id="dacperioperatifpra_atglselesaiop" name="atglselesaiop" type="date" class="form-control datetimepicker-input">
									<div class="input-group-append" data-target="#dacperioperatifpra_datglselesaiop" data-toggle="datetimepicker">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card"><!-- KEADAAN PASIEN -->
			<div class="card-header" style="background-color:black;">
				<h3 class="card-title" style="color:white;">KEADAAN PASIEN</h3>
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
							<div class="col-md-3">
								<label class="col-form-label">1. Kesadaran</label>
							</div>
							<div class="col-md-9">
								<div class="row" id="divdacperioperatifpra_sadar">
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_sadar_3').style.display='none'" name="dacperioperatifpra_sadar" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_sadar_1">
												<label class="custom-control-label" for="dacperioperatifpra_sadar_1">Terjaga</label>
											</div>										
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_sadar_3').style.display='none'" name="dacperioperatifpra_sadar" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_sadar_2">
												<label class="custom-control-label" for="dacperioperatifpra_sadar_2">Mudah dibangunkan</label>
											</div>										
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_sadar_3').style.display='block'" name="dacperioperatifpra_sadar" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_sadar_3">
												<label class="custom-control-label" for="dacperioperatifpra_sadar_3">Lain-lain</label>
											</div>
											<div class="row" id="dacperioperatifpra_div_sadar_3" style="display:none;">
												<div class="col-md-1"></div>
												<div class="col-md-11">
													<input type="text" onfocus="this.select();" class="form-control" id="dacperioperatifpra_sadarket">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">2. Status emosi</label>
							</div>
							<div class="col-md-9">
								<div class="row" id="divdacperioperatifpra_emosi">
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_emosi_3').style.display='none'"  name="dacperioperatifpra_emosi" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_emosi_1">
												<label class="custom-control-label" for="dacperioperatifpra_emosi_1">Rileks</label>
											</div>
											
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_emosi_3').style.display='none'" name="dacperioperatifpra_emosi" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_emosi_2">
												<label class="custom-control-label" for="dacperioperatifpra_emosi_2">Gelisah</label>
											</div>										
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_emosi_3').style.display='block'" name="dacperioperatifpra_emosi" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_emosi_3">
												<label class="custom-control-label" for="dacperioperatifpra_emosi_3">Lain-lain</label>
											</div>
											<div class="row" id="dacperioperatifpra_div_emosi_3" style="display:none;">
												<div class="col-md-1"></div>
												<div class="col-md-11">
													<input type="text" onfocus="this.select();" class="form-control" id="dacperioperatifpra_emosiket">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">3. Tindakan Operasi</label>
							</div>
							<div class="col-md-9">
								<div class="row" id="divdacperioperatifpra_tindakan">
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_tindakan" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_tindakan_1">
												<label class="custom-control-label" for="dacperioperatifpra_tindakan_1">1 Tindakan</label>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="divdacperioperatifpra_tindakan" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_tindakan_2">
												<label class="custom-control-label" for="dacperioperatifpra_tindakan_2">&gt; 1 Tindakan</label>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<label class="col-form-label">    Jenis Tindakan</label>
							</div>
							<div class="col-md-0">&nbsp;</div>
							<div class="col-md-5">
								<input type="text" onfocus="this.select();" class="form-control" id="dacperioperatifpra_tindakanket">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">4. Tipe Operasi</label>
							</div>
							<div class="col-md-9">
								<div class="row" id="divdacperioperatifpra_tipeop">
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_tipeop" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_tipeop_1">
												<label class="custom-control-label" for="dacperioperatifpra_tipeop_1">Elektif</label>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_tipeop" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_tipeop_2">
												<label class="custom-control-label" for="dacperioperatifpra_tipeop_2">Cito/ darurat</label>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_tipeop" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_tipeop_3">
												<label class="custom-control-label" for="dacperioperatifpra_tipeop_3">ODC</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">5. Jenis Pembiusan</label>
							</div>
							<div class="col-md-9">
								<div class="row" id="divdacperioperatifpra_bius">
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_bius" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_bius_1">
												<label class="custom-control-label" for="dacperioperatifpra_bius_1">Umum</label>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_bius" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_bius_2">
												<label class="custom-control-label" for="dacperioperatifpra_bius_2">Spinal/ Epidural</label>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_bius" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_bius_3">
												<label class="custom-control-label" for="dacperioperatifpra_bius_3">Blok Perifer</label>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_bius" value="4" type="radio" class="custom-control-input" id="dacperioperatifpra_bius_4">
												<label class="custom-control-label" for="dacperioperatifpra_bius_4">Sedasi</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">6. Jenis Operasi</label>
							</div>
							<div class="col-md-9">
								<div class="row" id="divdacperioperatifpra_jenisop">
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_jenisop_5').style.display='none'" name="dacperioperatifpra_jenisop" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_jenisop_1">
												<label class="custom-control-label" for="dacperioperatifpra_jenisop_1">Bersih</label>
											</div>										
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_jenisop_5').style.display='none'" name="dacperioperatifpra_jenisop" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_jenisop_2">
												<label class="custom-control-label" for="dacperioperatifpra_jenisop_2">Bersih terkontaminasi</label>
											</div>										
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_jenisop_5').style.display='none'" name="dacperioperatifpra_jenisop" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_jenisop_3">
												<label class="custom-control-label" for="dacperioperatifpra_jenisop_3">Terkontaminasi</label>
											</div>										
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_jenisop_5').style.display='none'" name="dacperioperatifpra_jenisop" value="4" type="radio" class="custom-control-input" id="dacperioperatifpra_jenisop_4">
												<label class="custom-control-label" for="dacperioperatifpra_jenisop_4">Kotor</label>
											</div>										
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_jenisop_5').style.display='block'" name="dacperioperatifpra_jenisop" value="5" type="radio" class="custom-control-input" id="dacperioperatifpra_jenisop_5">
												<label class="custom-control-label" for="dacperioperatifpra_jenisop_5">Keterangan Lain</label>
											</div>
											<div class="row" id="dacperioperatifpra_div_jenisop_5" style="display:none;">
												<div class="col-md-1"></div>
												<div class="col-md-11">
													<input type="text" onfocus="this.select();" class="form-control" id="dacperioperatifpra_jenisopket">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">7. Posisi canul intravena</label>
							</div>
							<div class="col-md-9">
								<div class="row" id="divdacperioperatifpra_canul">
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_canul_6').style.display='none'" name="dacperioperatifpra_canul" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_canul_1">
												<label class="custom-control-label" for="dacperioperatifpra_canul_1">Tangan Kanan</label>
											</div>										
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_canul_6').style.display='none'" name="dacperioperatifpra_canul" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_canul_2">
												<label class="custom-control-label" for="dacperioperatifpra_canul_2">Tangan Kiri</label>
											</div>										
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_canul_6').style.display='none'" name="dacperioperatifpra_canul" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_canul_3">
												<label class="custom-control-label" for="dacperioperatifpra_canul_3">Kaki Kanan</label>
											</div>										
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_canul_6').style.display='none'" name="dacperioperatifpra_canul" value="4" type="radio" class="custom-control-input" id="dacperioperatifpra_canul_4">
												<label class="custom-control-label" for="dacperioperatifpra_canul_4">Kaki Kiri</label>
											</div>										
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_canul_6').style.display='none'" name="dacperioperatifpra_canul" value="5" type="radio" class="custom-control-input" id="dacperioperatifpra_canul_5">
												<label class="custom-control-label" for="dacperioperatifpra_canul_5">Arteri line</label>
											</div>										
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_canul_6').style.display='block'" name="dacperioperatifpra_canul" value="6" type="radio" class="custom-control-input" id="dacperioperatifpra_canul_6">
												<label class="custom-control-label" for="dacperioperatifpra_canul_6">Lain-lain</label>
											</div>
											<div class="row" id="dacperioperatifpra_div_canul_6" style="display:none;">
												<div class="col-md-1"></div>
												<div class="col-md-11">
													<input type="text" onfocus="this.select();" class="form-control" id="dacperioperatifpra_canulket">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">8. Posisi Operasi</label>
							</div>
							<div class="col-md-9">
								<div class="row" id="divdacperioperatifpra_posisiop">
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_posisiop_6').style.display='none'" name="dacperioperatifpra_posisiop" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_posisiop_1">
												<label class="custom-control-label" for="dacperioperatifpra_posisiop_1">Supinasi</label>
											</div>										
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_posisiop_6').style.display='none'" name="dacperioperatifpra_posisiop" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_posisiop_2">
												<label class="custom-control-label" for="dacperioperatifpra_posisiop_2">Pronasi</label>
											</div>										
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_posisiop_6').style.display='none'" name="dacperioperatifpra_posisiop" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_posisiop_3">
												<label class="custom-control-label" for="dacperioperatifpra_posisiop_3">Lithotomi</label>
											</div>										
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_posisiop_6').style.display='none'" name="dacperioperatifpra_posisiop" value="4" type="radio" class="custom-control-input" id="dacperioperatifpra_posisiop_4">
												<label class="custom-control-label" for="dacperioperatifpra_posisiop_4">Kidney Position</label>
											</div>										
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_posisiop_6').style.display='none'" name="dacperioperatifpra_posisiop" value="5" type="radio" class="custom-control-input" id="dacperioperatifpra_posisiop_5">
												<label class="custom-control-label" for="dacperioperatifpra_posisiop_5">Lateral</label>
											</div>										
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_posisiop_6').style.display='block'" name="dacperioperatifpra_posisiop" value="6" type="radio" class="custom-control-input" id="dacperioperatifpra_posisiop_6">
												<label class="custom-control-label" for="dacperioperatifpra_posisiop_6">Lain-lain</label>
											</div>
											<div class="row" id="dacperioperatifpra_div_posisiop_6" style="display:none;">
												<div class="col-md-1"></div>
												<div class="col-md-11">
													<input type="text" onfocus="this.select();" class="form-control" id="dacperioperatifpra_posisiopket">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>					
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">9. Posisi Lengan</label>
							</div>
							<div class="col-md-9">
								<div class="row" id="divdacperioperatifpra_lengan">
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_lengan_3').style.display='none'" name="dacperioperatifpra_lengan" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_lengan_1">
												<label class="custom-control-label" for="dacperioperatifpra_lengan_1">Adduksi</label>
											</div>
										</div>									
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_lengan_3').style.display='none'" name="dacperioperatifpra_lengan" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_lengan_2">
												<label class="custom-control-label" for="dacperioperatifpra_lengan_2">Abduksi</label>
											</div>
										</div>								
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_lengan_3').style.display='block'" name="dacperioperatifpra_lengan" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_lengan_3">
												<label class="custom-control-label" for="dacperioperatifpra_lengan_3">Lain-lain</label>
											</div>
										</div>
										<div class="row" id="dacperioperatifpra_div_lengan_3" style="display:none;">
											<div class="col-md-1"></div>
											<div class="col-md-11">
												<input type="text" onfocus="this.select();" class="form-control" id="dacperioperatifpra_lenganket">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">10. Urine catheter</label>
							</div>
							<div class="col-md-9">
								<div class="row" id="divdacperioperatifpra_urincat">
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_urincat_2').style.display='none'" name="dacperioperatifpra_urincat" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_urincat_1">
												<label class="custom-control-label" for="dacperioperatifpra_urincat_1">Tidak</label>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_urincat_2').style.display='block'" name="dacperioperatifpra_urincat" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_urincat_2">
												<label class="custom-control-label" for="dacperioperatifpra_urincat_2">Ya</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row" id="dacperioperatifpra_div_urincat_2" style="display:none;">
							<div class="col-md-3"> </div>
							<div class="col-md-9">
								<div class="row" id="divdacperioperatifpra_urinpasang">
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-radio custom-control-inline">
												<input name="dacperioperatifpra_urinpasang" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_urinpasang_1">
												<label class="custom-control-label" for="dacperioperatifpra_urinpasang_1">IBS</label>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-radio custom-control-inline">
												<input name="dacperioperatifpra_urinpasang" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_urinpasang_2">
												<label class="custom-control-label" for="dacperioperatifpra_urinpasang_2">Ruangan</label>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3"> </div>
							<div class="col-md-0">    &nbsp;</div>
							<div class="col-md-3">Petugas</div>
							<div class="col-md-4">
								<input type="text" onfocus="this.select();" class="form-control" id="dacperioperatifpra_petugascatket">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">11. Desinfektan Kulit</label>
							</div>										
							<div class="col-md-9">
								<div class="row" id="dacperioperatifpra_desinfektan">
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_desinfektan" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_desinfektan_1">
												<label class="custom-control-label" for="dacperioperatifpra_desinfektan_1">Yodium</label>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_desinfektan" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_desinfektan_2">
												<label class="custom-control-label" for="dacperioperatifpra_desinfektan_2">Povidon Iodine</label>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_desinfektan" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_desinfektan_3">
												<label class="custom-control-label" for="dacperioperatifpra_desinfektan_3">Chlorhexidine</label>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_desinfektan" value="4" type="radio" class="custom-control-input" id="dacperioperatifpra_desinfektan_4">
												<label class="custom-control-label" for="dacperioperatifpra_desinfektan_4">Alkohol 70%</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-12">
								<label class="col-form-label">12. Insisi Kulit</label>
							</div>
							<div class="col-md-3">
								<label class="col-form-label">    Jumlah Insisi</label>
							</div>
							<div class="col-md-9">
								<div class="row" id="divdacperioperatifpra_insisijml">
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_insisijml" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_insisijml_1">
												<label class="custom-control-label" for="dacperioperatifpra_insisijml_1">1</label>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_insisijml" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_insisijml_2">
												<label class="custom-control-label" for="dacperioperatifpra_insisijml_2">&gt; 1</label>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_insisijml" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_insisijml_3">
												<label class="custom-control-label" for="dacperioperatifpra_insisijml_3">Tidak</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">    Jenis Insisi</label>
							</div>
							<div class="col-md-9">
								<div class="row" id="divdacperioperatifpra_insisijns">
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_insisijns" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_insisijns_1">
												<label class="custom-control-label" for="dacperioperatifpra_insisijns_1">Mediana</label>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_insisijns" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_insisijns_2">
												<label class="custom-control-label" for="dacperioperatifpra_insisijns_2">Pfannenstiel</label>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_insisijns" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_insisijns_3">
												<label class="custom-control-label" for="dacperioperatifpra_insisijns_3">Keduanya</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">13. Pemakaian Diatermi</label>
							</div>
							<div class="col-md-9">
								<div class="row" id="divdacperioperatifpra_diatermiyesno">
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_diatermiyesno_2').style.display='none'" name="dacperioperatifpra_diatermiyesno" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_diatermiyesno_1">
												<label class="custom-control-label" for="dacperioperatifpra_diatermiyesno_1">Tidak</label>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_diatermiyesno_2').style.display='block'" name="dacperioperatifpra_diatermiyesno" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_diatermiyesno_2">
												<label class="custom-control-label" for="dacperioperatifpra_diatermiyesno_2">Ya</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row" id="dacperioperatifpra_div_diatermiyesno_2" style="display:none;">
							<div class="col-md-3">
								<label class="col-form-label">    Jenis Diatermi</label>
							</div>
							<div class="col-md-9">
								<div class="row" id="divdacperioperatifpra_diatermi">
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_diatermi" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_diatermi_1">
												<label class="custom-control-label" for="dacperioperatifpra_diatermi_1">Monopolar</label>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_diatermi" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_diatermi_2">
												<label class="custom-control-label" for="dacperioperatifpra_diatermi_2">Bipolar</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">14. Lokasi Netral Electrode</label>
							</div>
							<div class="col-md-9">
								<div class="row" id="divdacperioperatifpra_netral">
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_netral" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_netral_1">
												<label class="custom-control-label" for="dacperioperatifpra_netral_1">Bokong</label>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_netral" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_netral_2">
												<label class="custom-control-label" for="dacperioperatifpra_netral_2">Tungkai atas</label>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_netral" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_netral_3">
												<label class="custom-control-label" for="dacperioperatifpra_netral_3">Tungkai bawah</label>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_netral" value="4" type="radio" class="custom-control-input" id="dacperioperatifpra_netral_4">
												<label class="custom-control-label" for="dacperioperatifpra_netral_4">Punggung</label>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_netral" value="5" type="radio" class="custom-control-input" id="dacperioperatifpra_netral_5">
												<label class="custom-control-label" for="dacperioperatifpra_netral_5">Bahu</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">15. Pemakaian Tourniquet</label>
							</div>
							<div class="col-md-9">
								<div class="row" id="divdacperioperatifpra_touryesno">
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_touryesno_2').style.display='none'" name="dacperioperatifpra_touryesno" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_touryesno_1">
												<label class="custom-control-label" for="dacperioperatifpra_touryesno_1">Tidak</label>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_touryesno_2').style.display='block'" name="dacperioperatifpra_touryesno" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_touryesno_2">
												<label class="custom-control-label" for="dacperioperatifpra_touryesno_2">Ya</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row" id="dacperioperatifpra_div_touryesno_2" style="display:none;">
							<div class="col-md-3">
								<label class="col-form-label">    Lokasi</label>
							</div>
							<div class="col-md-9">
								<div class="row" id="divdacperioperatifpra_tour">
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_tour" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_tour_1">
												<label class="custom-control-label" for="dacperioperatifpra_tour_1">Lengan</label>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_tour" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_tour_2">
												<label class="custom-control-label" for="dacperioperatifpra_tour_2">Kaki</label>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3"> </div>
							<div class="col-md-0">&nbsp;</div>
							<div class="col-md-4">
								<div class="input-group date" id="dacperioperatifpra_djamtour1" data-target-input="nearest">
									<span class="input-group-prepend">
										<span class="input-group-text">&nbsp;Jam Mulai&nbsp;</span>
									</span>
									<input id="dacperioperatifpra_jamtour1" name="jamtour1" type="time" class="form-control datetimepicker-input">
								</div>
							</div>
							<div class="col-md-4">
								<div class="input-group date" id="dacperioperatifpra_djamtour2" data-target-input="nearest">
									<span class="input-group-prepend">
										<span class="input-group-text">&nbsp;Jam Selesai&nbsp;</span>
									</span>
									<input id="dacperioperatifpra_jamtour2" name="jamtour2" type="time" class="form-control datetimepicker-input">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">16. Implant</label>
							</div>
							<div class="col-md-9">
								<div class="row" id="divdacperioperatifpra_implant">
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_implant_2').style.display='none'" name="dacperioperatifpra_implant" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_implant_1">
												<label class="custom-control-label" for="dacperioperatifpra_implant_1">Tidak</label>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_implant_2').style.display='block'" name="dacperioperatifpra_implant" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_implant_2">
												<label class="custom-control-label" for="dacperioperatifpra_implant_2">Ya</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row" id="dacperioperatifpra_div_implant_2" style="display:none;">
							<div class="col-md-3">
								<label class="col-form-label">    Jenis</label>
							</div>
							<div class="col-md-0">&nbsp;</div>
							<div class="col-md-3">
								<input type="text" onfocus="this.select();" class="form-control" id="dacperioperatifpra_implantjenis">
							</div>
							<div class="col-md-2">
								<label class="col-form-label">   Lokasi</label>
							</div>
							<div class="col-md-3">
								<input type="text" onfocus="this.select();" class="form-control" id="dacperioperatifpra_implantlokasi">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">17. Pemakaian Drain</label>
							</div>
							<div class="col-md-9">
								<div class="row" id="divdacperioperatifpra_drain">
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_drain_2').style.display='none'" name="dacperioperatifpra_drain" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_drain_1">
												<label class="custom-control-label" for="dacperioperatifpra_drain_1">Tidak</label>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_drain_2').style.display='block'" name="dacperioperatifpra_drain" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_drain_2">
												<label class="custom-control-label" for="dacperioperatifpra_drain_2">Ya</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row" id="dacperioperatifpra_div_drain_2" style="display:none;">
							<div class="col-md-3">
								<label class="col-form-label">    Jenis</label>
							</div>
							<div class="col-md-0">&nbsp;</div>
							<div class="col-md-3">
								<input type="text" onfocus="this.select();" class="form-control" id="dacperioperatifpra_drainjenis">
							</div>
							<div class="col-md-2">
								<label class="col-form-label">   Lokasi</label>
							</div>
							<div class="col-md-3">
								<input type="text" onfocus="this.select();" class="form-control" id="dacperioperatifpra_drainlokasi">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">18. Irigasi Luka</label>
							</div>
							<div class="col-md-9">
								<div class="row" id="divdacperioperatifpra_irigasiyesno">
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_irigasiyesno_2').style.display='none'" name="dacperioperatifpra_irigasiyesno" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_irigasiyesno_1">
												<label class="custom-control-label" for="dacperioperatifpra_irigasiyesno_1">Tidak</label>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_irigasiyesno_2').style.display='block'" name="dacperioperatifpra_irigasiyesno" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_irigasiyesno_2">
												<label class="custom-control-label" for="dacperioperatifpra_irigasiyesno_2">Ya</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row" id="dacperioperatifpra_div_irigasiyesno_2" style="display:none;">
							<div class="col-md-3"> </div>
							<div class="col-md-9">
								<div class="row" id="divdacperioperatifpra_irigasi">
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-radio custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_irigasi_4').style.display='none'" name="dacperioperatifpra_irigasi" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_irigasi_1">
												<label class="custom-control-label" for="dacperioperatifpra_irigasi_1">NaCl 0.9%</label>
											</div>										
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-radio custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_irigasi_4').style.display='none'" name="dacperioperatifpra_irigasi" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_irigasi_2">
												<label class="custom-control-label" for="dacperioperatifpra_irigasi_2">H2O2</label>
											</div>										
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-radio custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_irigasi_4').style.display='none'" name="dacperioperatifpra_irigasi" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_irigasi_3">
												<label class="custom-control-label" for="dacperioperatifpra_irigasi_3">Antibiotik</label>
											</div>										
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-radio custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_irigasi_4').style.display='block'" name="dacperioperatifpra_irigasi" value="4" type="radio" class="custom-control-input" id="dacperioperatifpra_irigasi_4">
												<label class="custom-control-label" for="dacperioperatifpra_irigasi_4">Lain-lain</label>
											</div>
											<div class="row" id="dacperioperatifpra_div_irigasi_4" style="display:none;">
												<div class="col-md-1"></div>
												<div class="col-md-11">
													<input type="text" onfocus="this.select();" class="form-control" id="dacperioperatifpra_irigasiket">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">19. Tampon</label>
							</div>
							<div class="col-md-9">
								<div class="row" id="divdacperioperatifpra_tampon">
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_tampon_2').style.display='none'" name="dacperioperatifpra_tampon" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_tampon_1">
												<label class="custom-control-label" for="dacperioperatifpra_tampon_1">Tidak</label>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_tampon_2').style.display='block'" name="dacperioperatifpra_tampon" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_tampon_2">
												<label class="custom-control-label" for="dacperioperatifpra_tampon_2">Ya</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row" id="dacperioperatifpra_div_tampon_2" style="display:none;">
							<div class="col-md-3">
								<label class="col-form-label">    Lokasi</label>
							</div>
							<div class="col-md-0">&nbsp;</div>
							<div class="col-md-3">
								<input type="text" onfocus="this.select();" class="form-control" id="dacperioperatifpra_tamponlokasi">
							</div>
							<div class="col-md-2">
								<label class="col-form-label">   Jumlah</label>
							</div>
							<div class="col-md-3">
								<input type="text" onfocus="this.select();" class="form-control" id="dacperioperatifpra_tamponjumlah">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">20. Pemakaian Antibiotik</label>
							</div>
							<div class="col-md-9">
								<div class="row" id="divdacperioperatifpra_antibiotik">
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_antibiotik_2').style.display='none'" name="dacperioperatifpra_antibiotik" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_antibiotik_1">
												<label class="custom-control-label" for="dacperioperatifpra_antibiotik_1">Tidak</label>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_antibiotik_2').style.display='block'" name="dacperioperatifpra_antibiotik" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_antibiotik_2">
												<label class="custom-control-label" for="dacperioperatifpra_antibiotik_2">Ya</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row" id="dacperioperatifpra_div_antibiotik_2" style="display:none;">
							<div class="col-md-3">
								<label class="col-form-label">    Jenis</label>
							</div>
							<div class="col-md-0">&nbsp;</div>
							<div class="col-md-3">
								<input type="text" onfocus="this.select();" class="form-control" id="dacperioperatifpra_antibiotikjenis">
							</div>
							<div class="col-md-2">
								<label class="col-form-label">   Dosis</label>
							</div>
							<div class="col-md-3">
								<input type="text" onfocus="this.select();" class="form-control" id="dacperioperatifpra_antibiotikdosis">
							</div>
							<div class="col-md-3 mt-2">
								<label class="col-form-label">    Jam</label>
							</div>
							<div class="col-md-0">&nbsp;</div>
							<div class="col-md-3 mt-2">
								<div class="input-group date" id="dacperioperatifpra_djamantibiotik" data-target-input="nearest">
									<input id="dacperioperatifpra_jamantibiotik" name="jamantibiotik" type="time" class="form-control datetimepicker-input">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-12">
								<label class="col-form-label">21. Cairan Infus</label>
							</div>
							<div class="col-md-4 text-center">
								<label class="col-form-label">Input</label>
							</div>
							<div class="col-md-2 text-center">
								<label class="col-form-label">Jumlah</label>
							</div>
							<div class="col-md-4 text-center">
								<label class="col-form-label">Output</label>
							</div>
							<div class="col-md-2 text-center">
								<label class="col-form-label">Jumlah</label>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-4 text-center">
								<input type="text" id="dacperioperatifpra_input1" class="form-control">
							</div>
							<div class="col-md-2 text-center">
								<input type="number" onfocus="this.select();" id="dacperioperatifpra_jmlinput1" class="form-control" onchange="dacperioperatifpraex.setJmlInfus();">
							</div>
							<div class="col-md-4 text-center">
								<input type="text" id="dacperioperatifpra_output1" class="form-control">
							</div>
							<div class="col-md-2 text-center">
								<input type="number" onfocus="this.select();" id="dacperioperatifpra_jmloutput1" class="form-control" onchange="dacperioperatifpraex.setJmlInfus();">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-4 text-center">
								<input type="text" id="dacperioperatifpra_input2" class="form-control">
							</div>
							<div class="col-md-2 text-center">
								<input type="number" onfocus="this.select();" id="dacperioperatifpra_jmlinput2" class="form-control" onchange="dacperioperatifpraex.setJmlInfus();">
							</div>
							<div class="col-md-4 text-center">
								<input type="text" id="dacperioperatifpra_output2" class="form-control">
							</div>
							<div class="col-md-2 text-center">
								<input type="number" onfocus="this.select();" id="dacperioperatifpra_jmloutput2" class="form-control" onchange="dacperioperatifpraex.setJmlInfus();">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-4 text-center">
								<input type="text" id="dacperioperatifpra_input3" class="form-control">
							</div>
							<div class="col-md-2 text-center">
								<input type="number" onfocus="this.select();" id="dacperioperatifpra_jmlinput3" class="form-control" onchange="dacperioperatifpraex.setJmlInfus();">
							</div>
							<div class="col-md-4 text-center">
								<input type="text" id="dacperioperatifpra_output3" class="form-control">
							</div>
							<div class="col-md-2 text-center">
								<input type="number" onfocus="this.select();" id="dacperioperatifpra_jmloutput3" class="form-control" onchange="dacperioperatifpraex.setJmlInfus();">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-4 text-center">
								<input type="text" id="dacperioperatifpra_input4" class="form-control">
							</div>
							<div class="col-md-2 text-center">
								<input type="number" onfocus="this.select();" id="dacperioperatifpra_jmlinput4" class="form-control" onchange="dacperioperatifpraex.setJmlInfus();">
							</div>
							<div class="col-md-4 text-center">
								<input type="text" id="dacperioperatifpra_output4" class="form-control">
							</div>
							<div class="col-md-2 text-center">
								<input type="number" onfocus="this.select();" id="dacperioperatifpra_jmloutput4" class="form-control" onchange="dacperioperatifpraex.setJmlInfus();">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-4">
								<label class="col-form-label">    Keseimbangan Cairan</label>
							</div>
							<div class="col-md-8">
								<input type="text" id="dacperioperatifpra_seimbangcairan" class="form-control">
							</div>
						</div>									
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">22. Spesimen Jaringan</label>
							</div>
							<div class="col-md-9">
								<div class="row" id="dacperioperatifpra_spesimenyesno">
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_spesimenyesno_2').style.display='none'" name="dacperioperatifpra_spesimenyesno" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_spesimenyesno_1">
												<label class="custom-control-label" for="dacperioperatifpra_spesimenyesno_1">Tidak</label>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacperioperatifpra_div_spesimenyesno_2').style.display='block'" name="dacperioperatifpra_spesimenyesno" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_spesimenyesno_2">
												<label class="custom-control-label" for="dacperioperatifpra_spesimenyesno_2">Ya</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>	
						<div class="form-group row" id="dacperioperatifpra_div_spesimenyesno_2" style="display:none;">
							<div class="col-md-3"> </div>
							<div class="col-md-9">
								<div class="row" id="dacperioperatifpra_spesimen">
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-radio custom-control-inline">
												<input name="dacperioperatifpra_spesimen" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_spesimen_1">
												<label class="custom-control-label" for="dacperioperatifpra_spesimen_1">Histologi</label>
											</div>
										</div>									
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-radio custom-control-inline">
												<input name="dacperioperatifpra_spesimen" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_spesimen_2">
												<label class="custom-control-label" for="dacperioperatifpra_spesimen_2">Kultur</label>
											</div>
										</div>									
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-radio custom-control-inline">
												<input name="dacperioperatifpra_spesimen" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_spesimen_3">
												<label class="custom-control-label" for="dacperioperatifpra_spesimen_3">Sitologi</label>
											</div>
										</div>									
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-radio custom-control-inline">
												<input name="dacperioperatifpra_spesimen" value="4" type="radio" class="custom-control-input" id="dacperioperatifpra_spesimen_4">
												<label class="custom-control-label" for="dacperioperatifpra_spesimen_4">Frozen section</label>
											</div>
										</div>									
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<label class="col-form-label">    Jenis </label>
							</div>
							<div class="col-md-0">&nbsp;</div>
							<div class="col-md-5">
								<input type="text" onfocus="this.select();" class="form-control" id="dacperioperatifpra_spesimenket">
							</div>						
						</div>	
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label"></label>
							</div>
							<div class="col-md-3 text-center">
								<label class="col-form-label">Sebelum Operasi</label>
							</div>
							<div class="col-md-3 text-center">
								<label class="col-form-label">Penambahan Selama Operasi</label>
							</div>
							<div class="col-md-3 text-center">
								<label class="col-form-label">Setelah Operasi</label>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">23. Jumlah Kassa</label>
							</div>
							<div class="col-md-3 text-center">
								<input type="number" onfocus="this.select();" id="dacperioperatifpra_kasa1" class="form-control">
							</div>
							<div class="col-md-3 text-center">
								<input type="number" onfocus="this.select();" id="dacperioperatifpra_kasa2" class="form-control">
							</div>
							<div class="col-md-3 text-center">
								<input type="number" onfocus="this.select();" id="dacperioperatifpra_kasa3" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">24. Jumlah Jarum</label>
							</div>
							<div class="col-md-3 text-center">
								<input type="number" onfocus="this.select();" id="dacperioperatifpra_jarum1" class="form-control">
							</div>
							<div class="col-md-3 text-center">
								<input type="number" onfocus="this.select();" id="dacperioperatifpra_jarum2" class="form-control">
							</div>
							<div class="col-md-3 text-center">
								<input type="number" onfocus="this.select();" id="dacperioperatifpra_jarum3" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">25. Jumlah Bisturi</label>
							</div>
							<div class="col-md-3 text-center">
								<input type="number" onfocus="this.select();" id="dacperioperatifpra_bisturi1" class="form-control">
							</div>
							<div class="col-md-3 text-center">
								<input type="number" onfocus="this.select();" id="dacperioperatifpra_bisturi2" class="form-control">
							</div>
							<div class="col-md-3 text-center">
								<input type="number" onfocus="this.select();" id="dacperioperatifpra_bisturi3" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">26. Jumlah Depper</label>
							</div>
							<div class="col-md-3 text-center">
								<input type="number" onfocus="this.select();" id="dacperioperatifpra_depper1" class="form-control">
							</div>
							<div class="col-md-3 text-center">
								<input type="number" onfocus="this.select();" id="dacperioperatifpra_depper2" class="form-control">
							</div>
							<div class="col-md-3 text-center">
								<input type="number" onfocus="this.select();" id="dacperioperatifpra_depper3" class="form-control">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card"><!-- Asuhan Keperawatan Intra Operasi -->
			<div class="card-header" style="background-color:black;">
				<h3 class="card-title" style="color:white;">Asuhan Keperawatan Intra Operasi</h3>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse">
						<i class="fas fa-minus"></i>
					</button>			  
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-bordered table-condensed" width="100%">
								<tbody>
									<tr>
										<td width="33%" style="padding:3px;">
											<div class="row d-flex justify-content-center">
												<label class="col-form-label font-weight-bold">DIAGNOSIS KEPERAWATAN </label>
											</div>
										</td>
										<td width="33%" style="padding:3px;">
											<div class="row d-flex justify-content-center">
												<label class="col-form-label font-weight-bold">LUARAN KEPERAWATAN</label>
											</div>
										</td>
										<td width="34%" style="padding:3px;">
											<div class="row d-flex justify-content-center">
												<label class="col-form-label font-weight-bold">INTERVENSI KEPERAWATAN </label>
											</div>
										</td>
									</tr>
									<tr>
										<td width="30%">
											<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
												<label class="col-form-label ">Risiko Perdarahan (D.0012) </label>
											</div>
											<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
												<label class="col-form-label font-weight-bold">Dibuktikan  Dengan :  </label>
											</div>
											<div class="row" style="padding:3px;margin-inline-start: 15px">
												<div class="col-md-12  text-truncate">
													<div class="row" id="dacperioperatifpra_bsuhan1">
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan1" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan1_1">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan1_1">Tindakan Pembedahan</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan1" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan1_2">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan1_2">Proses Keganasan</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan1" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan1_3">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan1_3">Komplikasi Kehamilan (Placengta Previa/Abrupsio, Kehamilan Kembar)</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan1" value="4" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan1_4">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan1_4">Komplikasi Pasca Partum (Antonio Uterus, Retensi Placenta)</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td width="30%">
											<div class="row d-flex" style="padding:3px;margin-inline-end: 15px">
												<label class="col-form-label ">Setelah dilakukan intervensi selama</label>
												<input type="text" name="dacperioperatifpra_bsuhan2" id="dacperioperatifpra_bsuhan2" style="width:100%;" class="form-control">
											</div>
											<div class="row d-flex" style="padding:3px;margin-inline-end: 15px">
												<label class="col-form-label ">Maka Tingkat Perdarahan  (L.02017) Menurun, dengan Kriteria Hasil :  </label>
											</div>
											<div class="row" style="padding:3px;margin-inline-end: 15px">
												<div class="col-md-12  text-truncate">
													<div class="row" id="dacperioperatifpra_bsuhan3">
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan3" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan3_1">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan3_1">Perdarahan pasca operasi menurun*</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan3" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan3_2">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan3_2">Hemoglobin membaik*</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan3" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan3_3">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan3_3">Hematokrit membaik*</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan3" value="4" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan3_4">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan3_4">Tekanan darah membaik*</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan3" value="5" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan3_5">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan3_5">Denyut nadi apikal membaik*</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan3" value="6" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan3_6">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan3_6">Capillary refill time (crt) membaik*</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td width="20%">
											<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
												<label class="col-form-label ">Pencegahan Perdarahan (I.02067)</label>
											</div>
											<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
												<label class="col-form-label">Observasi </label>
											</div>
											<div class="row" style="padding:3px;margin-inline-start: 15px">
												<div class="col-md-12  text-truncate">
													<div class="row" id="dacperioperatifpra_bsuhan4">
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan4" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan4_1">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan4_1">Monitor tanda dan gejala perdarahan</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan4" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan4_2">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan4_2">Monitor nilai hematokrit / hemoglobin sebelum atau sesudah kehilangan darah</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan4" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan4_3">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan4_3">Monitor tanda – tanda vital ortostatik</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
												<label class="col-form-label">Terapeutik </label>
											</div>
											<div class="row" style="padding:3px;margin-inline-start: 15px">
												<div class="col-md-12  text-truncate">
													<div class="row" id="dacperioperatifpra_bsuhan5">
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan5" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan5_1">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan5_1">Pertahankan bed rest selama perdarahan</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan5" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan5_2">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan5_2">Batasi tindakan invasif, jika perlu</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td width="30%">
											<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
												<label class="col-form-label ">Resiko Aspirasi (D.0006) </label>
											</div>
											<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
												<label class="col-form-label">Dibuktikan  Dengan :  </label>
											</div>
											<div class="row" style="padding:3px;margin-inline-start: 15px">
												<div class="col-md-12 text-truncate">
													<div class="row" id="dacperioperatifpra_bsuhan6">
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan6" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan6_1">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan6_1">Penurunan tingkat kesadaran</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan6" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan6_2">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan6_2">Penurunan reflek muntah dan / atau batuk</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan6" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan6_3">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan6_3">Trauma / pembedahan leher, mulut, dan / atau wajah</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan6" value="4" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan6_4">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan6_4">Peningkatan residu lambung</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan6" value="5" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan6_5">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan6_5">Peningkatan tekanan intragastrik</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan6" value="6" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan6_6">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan6_6">Perlambatan pengosongan lambung</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td width="30%">
											<div class="row d-flex" style="padding:3px;margin-inline-end: 15px">
												<label class="col-form-label ">Setelah dilakukan intervensi selama</label>
												<input type="text" name="dacperioperatifpra_bsuhan7" id="dacperioperatifpra_bsuhan7" style="width:100%;" class="form-control">
											</div>
											<div class="row d-flex" style="padding:3px;margin-inline-end: 15px">
												<label class="col-form-label ">Maka Tingkat Aspirasi (L.01006) Meningkat, dengan Kriteria Hasil :  </label>
											</div>
											<div class="row" style="padding:3px;margin-inline-end: 15px">
												<div class="col-md-12 text-truncate">
													<div class="row" id="dacperioperatifpra_bsuhan8">
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan8" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan8_1">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan8_1">Tingkat kesadaran meningkat*</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan8" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan8_2">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan8_2">Dispnea menurun*</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan8" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan8_3">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan8_3">Sianosis menurun*</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan8" value="4" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan8_4">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan8_4">Gelisah menurun*</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan8" value="5" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan8_5">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan8_5">Frekuensi nafas membaik*</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td width="20%">
											<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
												<label class="col-form-label ">Pencegahan Aspirasi (I.01018)</label>
											</div>
											<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
												<label class="col-form-label">Observasi </label>
											</div>
											<div class="row" style="padding:3px;margin-inline-start: 15px">
												<div class="col-md-12  text-truncate">
													<div class="row" id="dacperioperatifpra_bsuhan9">
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan9" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan9_1">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan9_1">Monitor tingkat kesadara, batuk, muntah dan kemampuan menelan</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan9" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan9_2">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan9_2">Monitor status pernapasan</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
												<label class="col-form-label">Terapeutik  </label>
											</div>
											<div class="row" style="padding:3px;margin-inline-start: 15px">
												<div class="col-md-12 text-truncate">
													<div class="row" id="dacperioperatifpra_bsuhan10">
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan10" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan10_1">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan10_1">Pertahankan kepatenan jalan nafas (Tehnik head tilt chin lift, jauthrust inline)</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan10" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan10_2">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan10_2">Pertahankan pengembangan balon ETT</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan10" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan10_3">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan10_3">Lakukan penghisapan jalan nafas, jika produksi sekret meningkat</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan10" value="4" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan10_4">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan10_4">Sediakan suction diruangan</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td width="30%">
											<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
												<label class="col-form-label ">Resiko Hipotermia Perioperatif (D. 0141)</label>
											</div>
											<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
												<label class="col-form-label">Dibuktikan dengan :  </label>
											</div>
											<div class="row" style="padding:3px;margin-inline-start: 15px">
												<div class="col-md-12  text-truncate">
													<div class="row" id="dacperioperatifpra_bsuhan11">
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan11" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan11_1">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan11_1">Prosedur pembedahan</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan11" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan11_2">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan11_2">Kombinasi anastesi regional dan umum</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan11" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan11_3">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan11_3">Suhu pra-operasi rendah (&lt;36°C)</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan11" value="4" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan11_4">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan11_4">Berat badan rendah</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan11" value="5" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan11_5">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan11_5">Suhu lingkungan rendah</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan11" value="6" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan11_6">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan11_6">Transfer panas</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td width="30%">
											<div class="row d-flex" style="padding:3px;margin-inline-end: 15px">
												<label class="col-form-label ">Setelah dilakukan intervensi selama</label>
												<input type="text" name="dacperioperatifpra_bsuhan12" id="dacperioperatifpra_bsuhan12" style="width:100%;" class="form-control">
											</div>
											<div class="row d-flex" style="padding:3px;margin-inline-enq: 15px">
												<label class="col-form-label ">Maka Termoregulasi (L.14134) Membaik, dengan Kriteria Hasil :  </label>
											</div>
											<div class="row d-flex" style="padding:3px;margin-inline-end: 15px">
												<label class="col-form-label">Terapeutik </label>
											</div>
											<div class="row" style="padding:3px;margin-inline-end: 15px">
												<div class="col-md-12 text-truncate">
													<div class="row" id="dacperioperatifpra_bsuhan13">
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan13" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan13_1">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan13_1">Mengigil menurun*</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan13" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan13_2">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan13_2">Kulit merah menurun*</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan13" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan13_3">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan13_3">Akrosianosis menurun*</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan13" value="4" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan13_4">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan13_4">Pucat menurun*</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan13" value="5" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan13_5">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan13_5">Takikardi menurun*</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan13" value="6" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan13_6">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan13_6">Takipnea menurun*</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan13" value="7" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan13_7">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan13_7">Baradikardi menurun</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan13" value="8" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan13_8">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan13_8">Hipoksia menurun</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan13" value="9" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan13_9">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan13_9">Suhu tubuh membaik</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan13" value="10" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan13_10">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan13_10">Suhu kulit membaik</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan13" value="11" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan13_11">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan13_11">Pengisian kapiler membaik</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan13" value="12" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan13_12">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan13_12">Ventilasi&nbsp; membaik</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan13" value="13" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan13_13">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan13_13">Tekanan darah membaik</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td width="20%">
											<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
												<label class="col-form-label ">Manajemen Hipotermia (I.14507)</label>
											</div>
											<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
												<label class="col-form-label">Observasi </label>
											</div>
											<div class="row" style="padding:3px;margin-inline-start: 15px">
												<div class="col-md-12  text-truncate">
													<div class="row" id="dacperioperatifpra_bsuhan14">
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan14" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan14_1">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan14_1">Monitor suhu tubuh</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan14" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan14_2">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan14_2">Identifikasi penyebab hipotermia</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan14" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan14_3">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan14_3">Monitor tanda dan gejala hipotermia</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
												<label class="col-form-label">Terapeutik </label>
											</div>
											<div class="row" style="padding:3px;margin-inline-start: 15px">
												<div class="col-md-12 text-truncate">
													<div class="row" id="dacperioperatifpra_bsuhan15">
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan15" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan15_1">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan15_1">Sediakan lingkungan yang hangat (mis: atur suhu ruangan, inkubator)</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan15" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan15_2">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan15_2">Ganti pakaian atau linen yang basar</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<div class="row custom-control custom-radio custom-control-inline">
																	<input name="dacperioperatifpra_bsuhan15" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_bsuhan15_3">
																	<label class="custom-control-label" for="dacperioperatifpra_bsuhan15_3">Lakukan penghangatan pasif (mis: selimut, menutu kepala, pakaian tebal)</label>
																</div>
															</div>
														</div>
													</div>
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
		<div class="card"><!-- TTD Perawat Asisten -->			
			<div class="card-body">
			    <div class="row">
			        <div class="col-md-3" align="center">
			          <label>Perawat Asisten</label>
			          <div style="text-align: center;">
			            <img style="width:200px;height:200px;border: 2px dashed;background-color: #535b62d1;" id="gambarttd">
			            <input type="text" class="form-control form-control-sm text-center d-none" id="hasilttdperawatasisten" disabled>
			          </div>
			          <button  class="btn btn-warning btn-sm" onclick="openmodalasuhanperoperatif('modalttdperawatasisten');">Klik Tanda Tangan</button><br>
			          <select id="dacperioperatifpra_apj6Id" class="form-control"></select><br>
			          <label>Nama &amp; Tanda tangan</label>
			        </div>

			        <div class="col-md-3" align="center">
			          <label>Perawat Instrumen</label>
			          <div style="text-align: center;">
	                    	<img style="width:200px;height:200px;border: 2px dashed;background-color: #535b62d1;" id="gambarttdinstrumen">
	                    	<input type="text" class="form-control form-control-sm text-center d-none" id="hasilttdperawatinstrumen" disabled>
	                  </div>
	                  <button onclick="openmodalasuhanperoperatif('modalttdperawatinstrumen')" class="btn btn-warning btn-sm">Klik Tanda Tangan</button><br>
			          <select id="dacperioperatifpra_apj7Id" class="form-control"></select><br>
			          <label>Nama &amp; Tanda tangan</label>
			        </div>

			        <div class="col-md-3" align="center">
			          <label>Perawat Sirkuler</label>
			          <div style="text-align: center;">
	                    <img style="width:200px;height:200px;border: 2px dashed;background-color: #535b62d1;" id="gambarttdsirkuler">
	                    <input type="text" class="form-control form-control-sm text-center d-none" id="hasilttdperawatsirkuler" disabled>
	                  </div>
	                  <button onclick="openmodalasuhanperoperatif('modalttdperawatsirkuler')" class="btn btn-warning btn-sm">Klik Tanda Tangan</button><br>
			          <select id="dacperioperatifpra_apj8Id" class="form-control"></select><br>
			          <label>Nama &amp; Tanda tangan</label>
			        </div>

			        <div class="col-md-3" align="center">
			          <label>Perawat Anestesi</label>
			          <div style="text-align: center;">
	                    <img style="width:200px;height:200px;border: 2px dashed;background-color: #535b62d1;" id="gambarttdanestesi">
	                    <input type="text" class="form-control form-control-sm text-center d-none" id="hasilttdperawatanestesi" disabled>
	                  </div>
	                  <button onclick="openmodalasuhanperoperatif('modalttdperawatanestesi')" class="btn btn-warning btn-sm">Klik Tanda Tangan</button><br>
			          <select id="dacperioperatifpra_apj9Id" class="form-control"></select><br>
			          <label>Nama &amp; Tanda tangan</label>
			        </div>
			    </div>
			</div>
			<div class="card-footer">
				<button id="dacperioperatifpra_btsave2" onclick="saveasuhanperoperatif1()" type="button" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Simpan</button>
				<button id="dacperioperatifpra_btdelete2" type="button" class="btn btn-sm btn-danger d-none"><!-- <i class="fas fa-trash"></i> --> Hapus</button>
				<button id="dacperioperatifpra_btprint2" type="button" class="btn btn-sm btn-success d-none"><!-- <i class="fas fa-print"></i> --> Print PDF</button>
				<button id="dacperioperatifpra_btreset2" type="button" class="btn btn-sm btn-warning d-none"><i class="fas fa-ban"></i>Reset</button>
			</div>		
		</div>
		<div class="card"><!-- C. DOKUMENTASI PASCA OPERASI -->
			<div class="card-header" style="background-color:black;">
				<h3 class="card-title" style="color:white;">C. DOKUMENTASI PASCA OPERASI</h3>
				<div class="card-tools">
					<label class="col-form-label font-italic" style="color:white;"> ( diisi oleh perawat ruang pemulihan ) </label>
					<button type="button" class="btn btn-tool" data-card-widget="collapse">
						<i class="fas fa-minus"></i>
					</button>			  
				</div>
			</div>
			<div class="card-body">
				<div class="row ">
					<div class="col-md-6">
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">ID</label>
							</div>
							<div class="col-md-3">
								<input id="dacperioperatifpra_id3" name="id3" type="hidden" class="form-control" readonly="readonly" value="0">
							</div>
							<div class="col-md-6">
								<b><i><label class="col-form-label" id="dacperioperatifpra_note3"></label></i></b>
							</div>
						</div>				
						<div class="form-group row">
							<div class="col-md-3  text-truncate">
								<label class="col-form-label">Masuk Ruang Pemulihan</label>
							</div>
							<div class="col-md-0">&nbsp;</div>
							<div class="col-md-3">
								<div class="input-group date" id="dacperioperatifpra_dcjammasuk" data-target-input="nearest">
									<input id="dacperioperatifpra_cjammasuk" name="cjammasuk" type="time" class="form-control datetimepicker-input">				              
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3  text-truncate">
								<label class="col-form-label">Keluar Ruang Pemulihan</label>
							</div>
							<div class="col-md-0">&nbsp;</div>
							<div class="col-md-3">
								<div class="input-group date" id="dacperioperatifpra_dcjamkeluar" data-target-input="nearest">
									<input id="dacperioperatifpra_cjamkeluar" name="cjamkeluar" type="time" class="form-control datetimepicker-input">				              
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Kembali Ke</label>
							</div>
							<div class="col-md-9">
								<div class="row" id="dacperioperatifpra_ckembali">
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_ckembali" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_ckembali_1">
												<label class="custom-control-label" for="dacperioperatifpra_ckembali_1">Ruangan</label>
											</div>
											<!-- <div class="row" th:if="${a.id==3}" th:id="${ccm+'_div_ckembali_3'}" style="display:none;">
												<div class="col-md-1"></div>
												<div class="col-md-11">
													<input type="text" onfocus="this.select();" class="form-control" th:id="${ccm+'_ckembaliket'}" >
												</div>
											</div> -->
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_ckembali" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_ckembali_2">
												<label class="custom-control-label" for="dacperioperatifpra_ckembali_2">ICU</label>
											</div>
											<!-- <div class="row" th:if="${a.id==3}" th:id="${ccm+'_div_ckembali_3'}" style="display:none;">
												<div class="col-md-1"></div>
												<div class="col-md-11">
													<input type="text" onfocus="this.select();" class="form-control" th:id="${ccm+'_ckembaliket'}" >
												</div>
											</div> -->
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_ckembali" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_ckembali_3">
												<label class="custom-control-label" for="dacperioperatifpra_ckembali_3">Lain-lain</label>
											</div>
											<!-- <div class="row" th:if="${a.id==3}" th:id="${ccm+'_div_ckembali_3'}" style="display:none;">
												<div class="col-md-1"></div>
												<div class="col-md-11">
													<input type="text" onfocus="this.select();" class="form-control" th:id="${ccm+'_ckembaliket'}" >
												</div>
											</div> -->
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<label class="col-form-label">&nbsp;</label>
							</div>
							<div class="col-md-0">&nbsp;</div>
							<div class="col-md-7">
								<input type="text" onfocus="this.select();" class="form-control" id="dacperioperatifpra_ckembaliket">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card"><!-- KEADAAN PASCA OPERASI -->
			<div class="card-header" style="background-color:black;">
				<h3 class="card-title" style="color:white;">KEADAAN PASCA OPERASI</h3>
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
							<div class="col-md-3">
								<label class="col-form-label">1. Keadaan Umum</label>
							</div>
							<div class="col-md-9">
								<div class="row" id="dacperioperatifpra_cku">
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_cku" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_cku_1">
												<label class="custom-control-label" for="dacperioperatifpra_cku_1">Baik</label>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_cku" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_cku_2">
												<label class="custom-control-label" for="dacperioperatifpra_cku_2">Sedang</label>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacperioperatifpra_cku" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_cku_3">
												<label class="custom-control-label" for="dacperioperatifpra_cku_3">Berat</label>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- 					</div> -->
							<!-- 					<div class="form-group row"> -->
								<div class="col-md-3">
									<label class="col-form-label">    GCS </label>
								</div>
								<div class="col-md-0">&nbsp;</div>
								<div class="col-md-2">
									<div class="input-group">
										<span class="input-group-prepend">
											<span class="input-group-text">&nbsp;E&nbsp;</span>
										</span>
										<input type="text" id="dacperioperatifpra_ce" class="form-control">
									</div>
								</div>
								<div class="col-md-2">
									<div class="input-group">
										<span class="input-group-prepend">
											<span class="input-group-text">&nbsp;M&nbsp;</span>
										</span>
										<input type="text" id="dacperioperatifpra_cm" class="form-control">
									</div>
								</div>
								<div class="col-md-3">
									<div class="input-group">
										<span class="input-group-prepend">
											<span class="input-group-text">&nbsp;V&nbsp;</span>
										</span>
										<input type="text" id="dacperioperatifpra_cv" class="form-control">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-3">    Kesadaran</div>
								<div class="col-md-0">&nbsp;</div>
								<div class="col-md-7">
									<select name="cku2" id="dacperioperatifpra_cku2" class="form-control">
										<option value="1">Compos Mentis</option>
										<option value="2">Apatis</option>
										<option value="3">Somnolen</option>
										<option value="4">Delirium</option>
										<option value="5">Sopor</option>
										<option value="6">Coma</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-3">
									<label class="col-form-label" title="Reflek Cahaya">    Reflek Cahaya</label>
								</div>
								<div class="col-md-0">&nbsp;</div>
								<div class="col-md-3">
									<div class="input-group">
										<span class="input-group-prepend">
											<span class="input-group-text">&nbsp;Kiri&nbsp;</span>
										</span>
										<select name="creflek1" id="dacperioperatifpra_creflek1" class="form-control">
											<option value="1">+</option>
											<option value="2">-</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group">
										<span class="input-group-prepend">
											<span class="input-group-text">&nbsp;Kanan&nbsp;</span>
										</span>
										<select name="creflek1" id="dacperioperatifpra_creflek2" class="form-control">
											<option value="1">+</option>
											<option value="2">-</option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-3">
									<label class="col-form-label" title="Pupil">    Pupil</label>
								</div>
								<div class="col-md-0">&nbsp;</div>
								<div class="col-md-3">
									<div class="input-group">
										<span class="input-group-prepend">
											<span class="input-group-text">&nbsp;Kiri&nbsp;</span>
										</span>
										<select name="cpupil1" id="dacperioperatifpra_cpupil1" class="form-control">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group">
										<span class="input-group-prepend">
											<span class="input-group-text">&nbsp;Kanan&nbsp;</span>
										</span>
										<select name="cpupil2" id="dacperioperatifpra_cpupil2" class="form-control">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
										</select>
										<span class="input-group-append">
											<span class="input-group-text">&nbsp;mm&nbsp;</span>
										</span>
									</div>
								</div>
							</div>
							<div class="form-group row" style="padding-top: 5px;">
								<div class="col-md-3">
									<label class="col-form-label">2. Keadaan Kulit Waktu Datang</label>
								</div>
								<div class="col-md-9">
									<div class="row" id="dacperioperatifpra_kulitdatang">
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input onclick="document.getElementById('dacperioperatifpra_div_kulitdatang_6').style.display='none'"  name="dacperioperatifpra_kulitdatang" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_kulitdatang_1">
													<label class="custom-control-label" for="dacperioperatifpra_kulitdatang_1">Kering</label>
												</div>

											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input onclick="document.getElementById('dacperioperatifpra_div_kulitdatang_6').style.display='none'"  name="dacperioperatifpra_kulitdatang" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_kulitdatang_2">
													<label class="custom-control-label" for="dacperioperatifpra_kulitdatang_2">Lembab</label>
												</div>

											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input onclick="document.getElementById('dacperioperatifpra_div_kulitdatang_6').style.display='none'"  name="dacperioperatifpra_kulitdatang" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_kulitdatang_3">
													<label class="custom-control-label" for="dacperioperatifpra_kulitdatang_3">Merah Muda</label>
												</div>										
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input name="dacperioperatifpra_kulitdatang" value="4" type="radio" class="custom-control-input" id="dacperioperatifpra_kulitdatang_4">
													<label class="custom-control-label" for="dacperioperatifpra_kulitdatang_4">Kebiruan</label>
												</div>

											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input onclick="document.getElementById('dacperioperatifpra_div_kulitdatang_6').style.display='none'" name="dacperioperatifpra_kulitdatang" value="5" type="radio" class="custom-control-input" id="dacperioperatifpra_kulitdatang_5">
													<label class="custom-control-label" for="dacperioperatifpra_kulitdatang_5">Hangat</label>
												</div>										
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input onclick="document.getElementById('dacperioperatifpra_div_kulitdatang_6').style.display='block'" name="dacperioperatifpra_kulitdatang" value="6" type="radio" class="custom-control-input" id="dacperioperatifpra_kulitdatang_6">
													<label class="custom-control-label" for="dacperioperatifpra_kulitdatang_6">Lainnya</label>
												</div>
												<div class="row" id="dacperioperatifpra_div_kulitdatang_6" style="display:none;">
													<div class="col-md-1"></div>
													<div class="col-md-11">
														<input type="text" onfocus="this.select();" class="form-control" id="dacperioperatifpra_kulitdatangket">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-3">
									<label class="col-form-label">3. Keadaan Kulit Waktu Keluar</label>
								</div>
								<div class="col-md-9">
									<div class="row" id="dacperioperatifpra_kulitkeluar">
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input onclick="document.getElementById('dacperioperatifpra_div_kulitkeluar_6').style.display='none'" name="dacperioperatifpra_kulitkeluar" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_kulitkeluar_1">
													<label class="custom-control-label" for="dacperioperatifpra_kulitkeluar_1">Kering</label>
												</div>										
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input onclick="document.getElementById('dacperioperatifpra_div_kulitkeluar_6').style.display='none'" name="dacperioperatifpra_kulitkeluar" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_kulitkeluar_2">
													<label class="custom-control-label" for="dacperioperatifpra_kulitkeluar_2">Lembab</label>
												</div>										
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input onclick="document.getElementById('dacperioperatifpra_div_kulitkeluar_6').style.display='none'" name="dacperioperatifpra_kulitkeluar" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_kulitkeluar_3">
													<label class="custom-control-label" for="dacperioperatifpra_kulitkeluar_3">Merah Muda</label>
												</div>										
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input onclick="document.getElementById('dacperioperatifpra_div_kulitkeluar_6').style.display='none'" name="dacperioperatifpra_kulitkeluar" value="4" type="radio" class="custom-control-input" id="dacperioperatifpra_kulitkeluar_4">
													<label class="custom-control-label" for="dacperioperatifpra_kulitkeluar_4">Kebiruan</label>
												</div>										
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input onclick="document.getElementById('dacperioperatifpra_div_kulitkeluar_6').style.display='none'" name="dacperioperatifpra_kulitkeluar" value="5" type="radio" class="custom-control-input" id="dacperioperatifpra_kulitkeluar_5">
													<label class="custom-control-label" for="dacperioperatifpra_kulitkeluar_5">Hangat</label>
												</div>										
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input onclick="document.getElementById('dacperioperatifpra_div_kulitkeluar_6').style.display='block'" name="dacperioperatifpra_kulitkeluar" value="6" type="radio" class="custom-control-input" id="dacperioperatifpra_kulitkeluar_6">
													<label class="custom-control-label" for="dacperioperatifpra_kulitkeluar_6">Lainnya</label>
												</div>
												<div class="row" id="dacperioperatifpra_div_kulitkeluar_6" style="display:none;">
													<div class="col-md-1"></div>
													<div class="col-md-11">
														<input type="text" onfocus="this.select();" class="form-control" id="dacperioperatifpra_kulitkeluarket">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-3">
									<label class="col-form-label">4. Sirkulasi Anggota Badan</label>
								</div>
								<div class="col-md-9">
									<div class="row" id="dacperioperatifpra_sirkulasi">
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input name="dacperioperatifpra_sirkulasi" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_sirkulasi_1">
													<label class="custom-control-label" for="dacperioperatifpra_sirkulasi_1">Merah Muda</label>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input name="dacperioperatifpra_sirkulasi" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_sirkulasi_2">
													<label class="custom-control-label" for="dacperioperatifpra_sirkulasi_2">Kebiruan</label>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group row">
								<div class="col-md-3">
									<label class="col-form-label">5. Mukosa Mulut</label>
								</div>
								<div class="col-md-9">
									<div class="row" id="dacperioperatifpra_mukosa">
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input name="dacperioperatifpra_mukosa" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_mukosa_1">
													<label class="custom-control-label" for="dacperioperatifpra_mukosa_1">Kering</label>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input name="dacperioperatifpra_mukosa" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_mukosa_2">
													<label class="custom-control-label" for="dacperioperatifpra_mukosa_2">Lembab</label>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-3">
									<label class="col-form-label">6. Posisi Pasien</label>
								</div>
								<div class="col-md-9">
									<div class="row" id="dacperioperatifpra_posisipx">
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input name="dacperioperatifpra_posisipx" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_posisipx_1">
													<label class="custom-control-label" for="dacperioperatifpra_posisipx_1">Lateral Kanan</label>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input name="dacperioperatifpra_posisipx" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_posisipx_2">
													<label class="custom-control-label" for="dacperioperatifpra_posisipx_2">Lateral Kiri</label>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input name="dacperioperatifpra_posisipx" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_posisipx_3">
													<label class="custom-control-label" for="dacperioperatifpra_posisipx_3">Datar</label>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input name="dacperioperatifpra_posisipx" value="4" type="radio" class="custom-control-input" id="dacperioperatifpra_posisipx_4">
													<label class="custom-control-label" for="dacperioperatifpra_posisipx_4">Head up 30o</label>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input name="dacperioperatifpra_posisipx" value="5" type="radio" class="custom-control-input" id="dacperioperatifpra_posisipx_5">
													<label class="custom-control-label" for="dacperioperatifpra_posisipx_5">Semi fowler</label>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-3">
									<label class="col-form-label">7. Perdarahan</label>
								</div>
								<div class="col-md-9">
									<div class="row" id="dacperioperatifpra_perdarahan">
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input onclick="document.getElementById('dacperioperatifpra_div_perdarahan_2').style.display='none'" name="dacperioperatifpra_perdarahan" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_perdarahan_1">
													<label class="custom-control-label" for="dacperioperatifpra_perdarahan_1">Tidak</label>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input onclick="document.getElementById('dacperioperatifpra_div_perdarahan_2').style.display='block'" name="dacperioperatifpra_perdarahan" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_perdarahan_2">
													<label class="custom-control-label" for="dacperioperatifpra_perdarahan_2">Ya</label>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row" id="dacperioperatifpra_div_perdarahan_2" style="display:none;">
								<div class="col-md-3"></div>
								<div class="col-md-0">&nbsp;</div>
								<div class="col-md-4">
									<div class="input-group">
										<span class="input-group-prepend">
											<span class="input-group-text">&nbsp;Jumlah&nbsp;</span>
										</span>
										<input type="number" onfocus="this.select();" class="form-control" id="dacperioperatifpra_perdarahanjumlah">
										<span class="input-group-append">
											<span class="input-group-text">&nbsp;cc&nbsp;</span>
										</span>
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group">
										<span class="input-group-prepend">
											<span class="input-group-text">&nbsp;Lokasi&nbsp;</span>
										</span>
										<input type="text" onfocus="this.select();" class="form-control" id="dacperioperatifpra_perdarahanlokasi">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-3">
									<label class="col-form-label">8. Muntah</label>
								</div>
								<div class="col-md-9">
									<div class="row" id="dacperioperatifpra_muntah">
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input onclick="document.getElementById('dacperioperatifpra_div_muntah_2').style.display='none'" name="dacperioperatifpra_muntah" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_muntah_1">
													<label class="custom-control-label" for="dacperioperatifpra_muntah_1">Tidak</label>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input onclick="document.getElementById('dacperioperatifpra_div_muntah_2').style.display='block'" name="dacperioperatifpra_muntah" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_muntah_2">
													<label class="custom-control-label" for="dacperioperatifpra_muntah_2">Ya</label>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row" id="dacperioperatifpra_div_muntah_2" style="display:none;">
								<div class="col-md-3">
								</div>
								<div class="col-md-0">&nbsp;</div>
								<div class="col-md-4">
									<div class="input-group">
										<span class="input-group-prepend">
											<span class="input-group-text">&nbsp;Frekuesi&nbsp;</span>
										</span>
										<input type="text" onfocus="this.select();" class="form-control" id="dacperioperatifpra_muntahket">
										<span class="input-group-append">
											<span class="input-group-text">&nbsp;kali&nbsp;</span>
										</span>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-3">
									<label class="col-form-label">9. Skrining Nyeri</label>
								</div>
								<div class="col-md-9">
									<div class="row" id="dacperioperatifpra_nyeric">
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input onclick="document.getElementById('dacperioperatifpra_div_nyeric_2').style.display='none'" name="dacperioperatifpra_nyeric" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_nyeric_1">
													<label class="custom-control-label" for="dacperioperatifpra_nyeric_1">Tidak</label>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input onclick="document.getElementById('dacperioperatifpra_div_nyeric_2').style.display='block'" name="dacperioperatifpra_nyeric" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_nyeric_2">
													<label class="custom-control-label" for="dacperioperatifpra_nyeric_2">Ya</label>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row" id="dacperioperatifpra_div_nyeric_2" style="display:none;">
								<div class="col-md-1">
								</div>					
								<div class="col-md-2">
									<label class="col-form-label" title="Skala">Skala</label>
								</div>
								<div class="col-md-7">
									<div class="form-group">
										<select name="skr" id="dacperioperatifpra_nyeric2" class="form-control">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
											<option value="10">10</option>
										</select>
									</div>
								</div>
							</div>
							<!-- 					<div class="form-group row" th:id="${ccm+'_div_nyeric_2'}" style="display:none;"> -->
								<!-- 						<div class="col-md-3"> -->
									<!-- 						</div> -->
									<!-- 						<div class="col-md-9"> -->
										<!-- 				            <div class="row" th:id="${ccm+'_nyeric2'}"> -->
											<!-- 				            	<div th:each="a : ${map.skr}" class="col-md-4"> -->
												<!-- 									<div class="form-group"> -->
													<!-- 										<div class="row custom-control custom-radio custom-control-inline" > -->
														<!-- 											<input th:name="${ccm+'_nyeric2'}" th:value="${a.value}" type="radio" class="custom-control-input"  -->
														<!-- 											th:id="${ccm+'_nyeric2_'+a.key}" /> -->
														<!-- 											<label class="custom-control-label" th:for="${ccm+'_nyeric2_'+a.key}" th:text="${a.value}"></label> -->
														<!-- 										</div> -->
														<!-- 									</div> -->
														<!-- 								</div> -->
														<!-- 				            </div> -->
														<!-- 						</div> -->
														<!-- 					</div> -->
														<div class="form-group row">
															<div class="col-md-3">
																<label class="col-form-label">10. Resiko jatuh</label>
															</div>
															<div class="col-md-9">
																<div class="row" id="dacperioperatifpra_jatuhc">
																	<div class="col-md-4">
																		<div class="form-group">
																			<div class="row custom-control custom-checkbox custom-control-inline">
																				<input name="dacperioperatifpra_jatuhc" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_jatuhc_1">
																				<label class="custom-control-label" for="dacperioperatifpra_jatuhc_1">Rendah</label>
																			</div>
																		</div>
																	</div>
																	<div class="col-md-4">
																		<div class="form-group">
																			<div class="row custom-control custom-checkbox custom-control-inline">
																				<input name="dacperioperatifpra_jatuhc" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_jatuhc_2">
																				<label class="custom-control-label" for="dacperioperatifpra_jatuhc_2">Sedang</label>
																			</div>
																		</div>
																	</div>
																	<div class="col-md-4">
																		<div class="form-group">
																			<div class="row custom-control custom-checkbox custom-control-inline">
																				<input name="dacperioperatifpra_jatuhc" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_jatuhc_3">
																				<label class="custom-control-label" for="dacperioperatifpra_jatuhc_3">Tinggi</label>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="form-group row">
															<div class="col-md-3">
																<label class="col-form-label">11. Jaringan PA dan Formulir</label>
															</div>
															<div class="col-md-9">
																<div class="row" id="dacperioperatifpra_jaringan">
																	<div class="col-md-4">
																		<div class="form-group">
																			<div class="row custom-control custom-checkbox custom-control-inline">
																				<input onclick="document.getElementById('dacperioperatifpra_div_jaringan_2').style.display='none'" name="dacperioperatifpra_jaringan" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_jaringan_1">
																				<label class="custom-control-label" for="dacperioperatifpra_jaringan_1">Tidak</label>
																			</div>
																		</div>
																	</div>
																	<div class="col-md-4">
																		<div class="form-group">
																			<div class="row custom-control custom-checkbox custom-control-inline">
																				<input onclick="document.getElementById('dacperioperatifpra_div_jaringan_2').style.display='block'" name="dacperioperatifpra_jaringan" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_jaringan_2">
																				<label class="custom-control-label" for="dacperioperatifpra_jaringan_2">Ya</label>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="form-group row" id="dacperioperatifpra_div_jaringan_2" style="display:none;">
															<div class="col-md-3"></div>
															<div class="col-md-9">
																<div class="row" id="dacperioperatifpra_jaringan2">
																	<div class="col-md-4">
																		<div class="form-group">
																			<div class="row custom-control custom-radio custom-control-inline">
																				<input name="dacperioperatifpra_jaringan2" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_jaringan2_1">
																				<label class="custom-control-label" for="dacperioperatifpra_jaringan2_1">OK</label>
																			</div>
																		</div>
																	</div>
																	<div class="col-md-4">
																		<div class="form-group">
																			<div class="row custom-control custom-radio custom-control-inline">
																				<input name="dacperioperatifpra_jaringan2" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_jaringan2_2">
																				<label class="custom-control-label" for="dacperioperatifpra_jaringan2_2">Ruangan</label>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="col-md-3"></div>
															<div class="col-md-0">&nbsp;</div>
															<div class="col-md-4">
																<div class="input-group">
																	<span class="input-group-prepend">
																		<span class="input-group-text">&nbsp;Jumlah&nbsp;</span>
																	</span>
																	<input type="text" onfocus="this.select();" class="form-control" id="dacperioperatifpra_jaringanket">
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
<!-- 
SCORE PEMINDAHAN PASIEN
-->
<!-- 
???? 
-->
<div class="card">
	<div class="card-header" style="background-color:black;">
		<h3 class="card-title" style="color:white;">SCORE PEMINDAHAN PASIEN</h3>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse">
				<i class="fas fa-minus"></i>
			</button>			  
		</div>
	</div>
	<div class="card-body">
		<div class="row ">
			<div class="col-md-12">
				<div class="form-group row">
					<div class="col-md-12">
						<label class="col-form-label font-weight-bold">1. Skor Aldrete untuk pasien dewasa dengan general anastesi / narcose umum </label>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-bordered table-condensed" width="100%">
								<tbody>
									<tr>
										<td width="5%" style="padding:1px;">
											<div class="row d-flex justify-content-center">
												<label class="col-form-label font-weight-bold">No</label>
											</div>
										</td>
										<td width="25%" style="padding:1px;">
											<div class="row d-flex justify-content-center">
												<label class="col-form-label font-weight-bold">Item</label>
											</div>
										</td>
										<td width="40%" style="padding:1px;">
											<div class="row d-flex justify-content-center">
												<label class="col-form-label font-weight-bold">Kriteria</label>
											</div>
										</td>
										<td width="15%" style="padding:1px;">
											<div class="row d-flex justify-content-center">
												<label class="col-form-label font-weight-bold">Skor</label>
											</div>
										</td>
										<td width="15%" style="padding:1px;">
											<div class="row d-flex justify-content-center">
												<label class="col-form-label font-weight-bold">Hasil Skor</label>
											</div>
										</td>
									</tr>
									<tr>
										<td class="align-middle">
											<div class="row d-flex justify-content-center">
												<label class="col-form-label">1</label>
											</div>
										</td>
										<td class="align-middle">
											<div class="row d-flex justify-content-center">
												<label class="col-form-label">Tingkat Aktivitas</label>
											</div>
										</td>
										<td style="padding:0;">
											<table class="table-bordered table-condensed table-hover" width="100%">
												<tbody>
													<tr onclick="dacperioperatifpraex_setScorec1(2, 1);">
														<td width="100%" style="padding:0;">
															<label class="col-form-label">&nbsp;Dapat menggerakkan 4 ekstremitas</label>
														</td>									
													</tr>
													<tr onclick="dacperioperatifpraex_setScorec1(1, 1);">
														<td style="padding:0;">
															<label class="col-form-label">&nbsp;Dapat menggerakkan 2 ekstremitas</label>
														</td>
													</tr>
													<tr onclick="dacperioperatifpraex_setScorec1(0, 1);">
														<td style="padding:0;">
															<label class="col-form-label">&nbsp;Tidak dapat menggerakkan ekstremitas</label>
														</td>
													</tr>
												</tbody></table>
											</td>
											<td style="padding:0;">
												<table class="table-bordered table-condensed table-hover" width="100%">
													<tbody><tr onclick="dacperioperatifpraex_setScorec1(2, 1);">
														<td align="center" style="padding:0;">
															<label class="col-form-label">2</label>
														</td>
													</tr>
													<tr onclick="dacperioperatifpraex_setScorec1(1, 1);">
														<td align="center" style="padding:0;">
															<label class="col-form-label">1</label>
														</td>
													</tr>
													<tr onclick="dacperioperatifpraex_setScorec1(0, 1);">
														<td align="center" style="padding:0;">
															<label class="col-form-label">0</label>
														</td>
													</tr>
												</tbody></table>
											</td>
											<td class="align-middle">
												<table class="table-bordered table-condensed" width="100%">
													<tbody><tr height="100%" align="center">
														<td align="center" width="100%" style="padding:0;">
															<label class="col-form-label font-weight-bold" id="dacperioperatifpra_skorc1">0</label>
														</td>
													</tr>
												</tbody></table>
											</td>
										</tr>
										<tr>
											<td class="align-middle">
												<div class="row d-flex justify-content-center">
													<label class="col-form-label">2</label>
												</div>
											</td>
											<td class="align-middle">
												<div class="row d-flex justify-content-center">
													<label class="col-form-label">Respirasi</label>
												</div>
											</td>
											<td style="padding:0;">
												<table class="table-bordered table-condensed table-hover" width="100%">
													<tbody>
														<tr onclick="dacperioperatifpraex_setScorec1(2, 2);">
															<td width="100%" style="padding:0;">
																<label class="col-form-label">&nbsp;Dapat bernafas dalam dan batuk</label>
															</td>									
														</tr>
														<tr onclick="dacperioperatifpraex_setScorec1(1, 2);">
															<td style="padding:0;">
																<label class="col-form-label">&nbsp;Bernafas terbatas jalan nafas baik</label>
															</td>
														</tr>
														<tr onclick="dacperioperatifpraex_setScorec1(0, 2);">
															<td style="padding:0;">
																<label class="col-form-label">&nbsp;Apneu - obstruksi</label>
															</td>
														</tr>
													</tbody></table>
												</td>
												<td style="padding:0;">
													<table class="table-bordered table-condensed table-hover" width="100%">
														<tbody><tr onclick="dacperioperatifpraex_setScorec1(2, 2);">
															<td align="center" style="padding:0;">
																<label class="col-form-label">2</label>
															</td>
														</tr>
														<tr onclick="dacperioperatifpraex_setScorec1(1, 2);">
															<td align="center" style="padding:0;">
																<label class="col-form-label">1</label>
															</td>
														</tr>
														<tr onclick="dacperioperatifpraex_setScorec1(0, 2);">
															<td align="center" style="padding:0;">
																<label class="col-form-label">0</label>
															</td>
														</tr>
													</tbody></table>
												</td>
												<td class="align-middle">
													<table class="table-bordered table-condensed" width="100%">
														<tbody><tr height="100%" align="center">
															<td align="center" width="100%" style="padding:0;">
																<label class="col-form-label font-weight-bold" id="dacperioperatifpra_skorc2">0</label>
															</td>
														</tr>
													</tbody></table>
												</td>
											</tr>
											<tr>
												<td class="align-middle">
													<div class="row d-flex justify-content-center">
														<label class="col-form-label">3</label>
													</div>
												</td>
												<td class="align-middle">
													<div class="row d-flex justify-content-center">
														<label class="col-form-label">Sirkulasi</label>
													</div>
												</td>
												<td style="padding:0;">
													<table class="table-bordered table-condensed table-hover" width="100%">
														<tbody><tr onclick="dacperioperatifpraex_setScorec1(2, 3);">
															<td width="100%" style="padding:0;">
																<label class="col-form-label">&nbsp;Tekanan sistolik +20% dari pra operasi</label>
															</td>									
														</tr>
														<tr onclick="dacperioperatifpraex_setScorec1(1, 3);">
															<td style="padding:0;">
																<label class="col-form-label">&nbsp;Tekanan sistolik +20% - 50% dari pra operasi</label>
															</td>
														</tr>
														<tr onclick="dacperioperatifpraex_setScorec1(0, 3);">
															<td style="padding:0;">
																<label class="col-form-label">&nbsp;Tekanan sistolik +50% dari pra operasi</label>
															</td>
														</tr>
													</tbody></table>
												</td>
												<td style="padding:0;">
													<table class="table-bordered table-condensed table-hover" width="100%">
														<tbody><tr onclick="dacperioperatifpraex_setScorec1(2, 3);">
															<td align="center" style="padding:0;">
																<label class="col-form-label">2</label>
															</td>
														</tr>
														<tr onclick="dacperioperatifpraex_setScorec1(1, 3);">
															<td align="center" style="padding:0;">
																<label class="col-form-label">1</label>
															</td>
														</tr>
														<tr onclick="dacperioperatifpraex_setScorec1(0, 3);">
															<td align="center" style="padding:0;">
																<label class="col-form-label">0</label>
															</td>
														</tr>
													</tbody></table>
												</td>
												<td class="align-middle">
													<table class="table-bordered table-condensed" width="100%">
														<tbody><tr height="100%" align="center">
															<td align="center" width="100%" style="padding:0;">
																<label class="col-form-label font-weight-bold" id="dacperioperatifpra_skorc3">0</label>
															</td>
														</tr>
													</tbody></table>
												</td>
											</tr>
											<tr>
												<td class="align-middle">
													<div class="row d-flex justify-content-center">
														<label class="col-form-label">4</label>
													</div>
												</td>
												<td class="align-middle">
													<div class="row d-flex justify-content-center">
														<label class="col-form-label">Kesadaran</label>
													</div>
												</td>
												<td style="padding:0;">
													<table class="table-bordered table-condensed table-hover" width="100%">
														<tbody><tr onclick="dacperioperatifpraex_setScorec1(2, 4);">
															<td width="100%" style="padding:0;">
																<label class="col-form-label">&nbsp;Terjaga</label>
															</td>									
														</tr>
														<tr onclick="dacperioperatifpraex_setScorec1(1, 4);">
															<td style="padding:0;">
																<label class="col-form-label">&nbsp;Mudah dibangunkan</label>
															</td>
														</tr>
														<tr onclick="dacperioperatifpraex_setScorec1(0, 4);">
															<td style="padding:0;">
																<label class="col-form-label">&nbsp;Tidak ada respon</label>
															</td>
														</tr>
													</tbody></table>
												</td>
												<td style="padding:0;">
													<table class="table-bordered table-condensed table-hover" width="100%">
														<tbody><tr onclick="dacperioperatifpraex_setScorec1(2, 4);">
															<td align="center" style="padding:0;">
																<label class="col-form-label">2</label>
															</td>
														</tr>
														<tr onclick="dacperioperatifpraex_setScorec1(1, 4);">
															<td align="center" style="padding:0;">
																<label class="col-form-label">1</label>
															</td>
														</tr>
														<tr onclick="dacperioperatifpraex_setScorec1(0, 4);">
															<td align="center" style="padding:0;">
																<label class="col-form-label">0</label>
															</td>
														</tr>
													</tbody></table>
												</td>
												<td class="align-middle">
													<table class="table-bordered table-condensed" width="100%">
														<tbody><tr height="100%" align="center">
															<td align="center" width="100%" style="padding:0;">
																<label class="col-form-label font-weight-bold" id="dacperioperatifpra_skorc4">0</label>
															</td>
														</tr>
													</tbody></table>
												</td>
											</tr>
											<tr>
												<td class="align-middle">
													<div class="row d-flex justify-content-center">
														<label class="col-form-label">5</label>
													</div>
												</td>
												<td class="align-middle">
													<div class="row d-flex justify-content-center">
														<label class="col-form-label">Warna Kulit</label>
													</div>
												</td>
												<td style="padding:0;">
													<table class="table-bordered table-condensed table-hover" width="100%">
														<tbody><tr onclick="dacperioperatifpraex_setScorec1(2, 5);">
															<td width="100%" style="padding:0;">
																<label class="col-form-label">&nbsp;Merah muda</label>
															</td>									
														</tr>
														<tr onclick="dacperioperatifpraex_setScorec1(1, 5);">
															<td style="padding:0;">
																<label class="col-form-label">&nbsp;Pucat, kekuningan</label>
															</td>
														</tr>
														<tr onclick="dacperioperatifpraex_setScorec1(0, 5);">
															<td style="padding:0;">
																<label class="col-form-label">&nbsp;Sianosis</label>
															</td>
														</tr>
													</tbody></table>
												</td>
												<td style="padding:0;">
													<table class="table-bordered table-condensed table-hover" width="100%">
														<tbody><tr onclick="dacperioperatifpraex_setScorec1(2, 5);">
															<td align="center" style="padding:0;">
																<label class="col-form-label">2</label>
															</td>
														</tr>
														<tr onclick="dacperioperatifpraex_setScorec1(1, 5);">
															<td align="center" style="padding:0;">
																<label class="col-form-label">1</label>
															</td>
														</tr>
														<tr onclick="dacperioperatifpraex_setScorec1(0, 5);">
															<td align="center" style="padding:0;">
																<label class="col-form-label">0</label>
															</td>
														</tr>
													</tbody></table>
												</td>
												<td class="align-middle">
													<table class="table-bordered table-condensed" width="100%">
														<tbody><tr height="100%" align="center">
															<td align="center" width="100%" style="padding:0;">
																<label class="col-form-label font-weight-bold" id="dacperioperatifpra_skorc5">0</label>
															</td>
														</tr>
													</tbody></table>
												</td>
											</tr>
											<tr>
												<td colspan="2" class="align-middle">
													<div class="row d-flex justify-content-center">
														<label class="col-form-label font-weight-bold">Total Skor</label>
													</div>
												</td>
												<td colspan="2" class="align-middle">
													<div class="row d-flex justify-content-center">
														<label class="col-form-label font-weight-bold" id="dacperioperatifpra_skorchasil">Hasil Skor : Pasien Tidak Dapat Dipindahkan Ke Ruangan</label>
													</div>
												</td>
												<td>
													<table class="table-bordered table-condensed" width="100%">
														<tbody><tr height="100%">
															<td style="padding:0;" align="center">
																<label class="col-form-label font-weight-bold" id="dacperioperatifpra_skorctot">0</label>
															</td>
														</tr>
													</tbody></table>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row ">
					<div class="col-md-12">
						<div class="form-group row">
							<div class="col-md-12">
								<label class="col-form-label font-weight-bold">2. Bromage Score untuk pasien dengan regional anastesi / spinal </label>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group row">
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="table table-bordered table-condensed" width="100%">
										<tbody>
											<tr>
												<td width="5%" style="padding:1px;">
													<div class="row d-flex justify-content-center">
														<label class="col-form-label font-weight-bold">No</label>
													</div>
												</td>
												<td width="80%" style="padding:1px;">
													<div class="row d-flex justify-content-center">
														<label class="col-form-label font-weight-bold">Item</label>
													</div>
												</td>
												<td width="15%" style="padding:1px;">
													<div class="row d-flex justify-content-center">
														<label class="col-form-label font-weight-bold">Skor</label>
													</div>
												</td>
											</tr>
											<tr>
												<td class="align-middle" style="padding:1px;">
													<div class="row d-flex justify-content-center">
														<label class="col-form-label">1</label>
													</div>
												</td>
												<td style="padding:1px;" onclick="dacperioperatifpraex.setScorec2(0);">
													<div class="row d-flex">
														<label class="col-form-label"> &nbsp;Gerakan penuh dari tungkai</label>
													</div>
												</td>
												<td style="padding:1px;" onclick="dacperioperatifpraex.setScorec2(0);">
													<div class="row d-flex justify-content-center">
														<label class="col-form-label">0</label>
													</div>
												</td>
											</tr>
											<tr>
												<td class="align-middle" style="padding:1px;">
													<div class="row d-flex justify-content-center">
														<label class="col-form-label">2</label>
													</div>
												</td>
												<td style="padding:1px;" onclick="dacperioperatifpraex.setScorec2(1);">
													<div class="row d-flex">
														<label class="col-form-label"> &nbsp;Tak mampu ekstensi tungkai</label>
													</div>
												</td>
												<td style="padding:1px;" onclick="dacperioperatifpraex.setScorec2(1);">
													<div class="row d-flex justify-content-center">
														<label class="col-form-label">1</label>
													</div>
												</td>
											</tr>
											<tr>
												<td class="align-middle" style="padding:1px;">
													<div class="row d-flex justify-content-center">
														<label class="col-form-label">3</label>
													</div>
												</td>
												<td style="padding:1px;" onclick="dacperioperatifpraex.setScorec2(2);">
													<div class="row d-flex">
														<label class="col-form-label"> &nbsp;Tak mampu fleksi lutut</label>
													</div>
												</td>
												<td style="padding:1px;" onclick="dacperioperatifpraex.setScorec2(2);">
													<div class="row d-flex justify-content-center">
														<label class="col-form-label">2</label>
													</div>
												</td>
											</tr>
											<tr>
												<td class="align-middle" style="padding:1px;">
													<div class="row d-flex justify-content-center">
														<label class="col-form-label">4</label>
													</div>
												</td>
												<td style="padding:1px;" onclick="dacperioperatifpraex.setScorec2(3);">
													<div class="row d-flex">
														<label class="col-form-label"> &nbsp;Tak mampu fleksi  pergelangan kaki</label>
													</div>
												</td>
												<td style="padding:1px;" onclick="dacperioperatifpraex.setScorec2(3);">
													<div class="row d-flex justify-content-center">
														<label class="col-form-label">3</label>
													</div>
												</td>
											</tr>
											<tr>
												<td colspan="2" class="align-middle" style="padding:1px;">
													<div class="row d-flex justify-content-center">
														<label class="col-form-label font-weight-bold" id="dacperioperatifpra_skorchasil2">Hasil Skor : Pasien Dapat Dipindahkan Ke Ruangan</label>
													</div>
												</td>
												<td style="padding:1px;">
													<div class="row d-flex justify-content-center">
														<label class="col-form-label font-weight-bold" id="dacperioperatifpra_skorctot2">0</label>
													</div>
												</td>
											</tr>
										</tbody></table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row ">
						<div class="col-md-12">
							<div class="form-group row">
								<div class="col-md-12">
									<label class="col-form-label font-weight-bold">3. Steward Score untuk pasien pediatrik / anak</label>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group row">
								<div class="col-md-12">
									<div class="table-responsive">
										<table class="table table-bordered table-condensed" width="100%">
											<tbody>
												<tr>
													<td width="5%" style="padding:1px;">
														<div class="row d-flex justify-content-center">
															<label class="col-form-label font-weight-bold">No</label>
														</div>
													</td>
													<td width="25%" style="padding:1px;">
														<div class="row d-flex justify-content-center">
															<label class="col-form-label font-weight-bold">Item</label>
														</div>
													</td>
													<td width="40%" style="padding:1px;">
														<div class="row d-flex justify-content-center">
															<label class="col-form-label font-weight-bold">Kriteria</label>
														</div>
													</td>
													<td width="15%" style="padding:1px;">
														<div class="row d-flex justify-content-center">
															<label class="col-form-label font-weight-bold">Skor</label>
														</div>
													</td>
													<td width="15%" style="padding:1px;">
														<div class="row d-flex justify-content-center">
															<label class="col-form-label font-weight-bold">Hasil Skor</label>
														</div>
													</td>
												</tr>
												<tr>
													<td class="align-middle">
														<div class="row d-flex justify-content-center">
															<label class="col-form-label">1</label>
														</div>
													</td>
													<td class="align-middle">
														<div class="row d-flex justify-content-center">
															<label class="col-form-label">Pergerakan</label>
														</div>
													</td>
													<td style="padding:0;">
														<table class="table-bordered table-condensed table-hover" width="100%">
															<tbody><tr onclick="dacperioperatifpraex_setScorec3(2, 1);">
																<td width="100%" style="padding:0;">
																	<label class="col-form-label">&nbsp;Gerak bertujuan</label>
																</td>									
															</tr>
															<tr onclick="dacperioperatifpraex_setScorec3(1, 1);">
																<td style="padding:0;">
																	<label class="col-form-label">&nbsp;Gerak tak bertujuan</label>
																</td>
															</tr>
															<tr onclick="dacperioperatifpraex_setScorec3(0, 1);">
																<td style="padding:0;">
																	<label class="col-form-label">&nbsp;Tidak bergerak</label>
																</td>
															</tr>
														</tbody></table>
													</td>
													<td style="padding:0;">
														<table class="table-bordered table-condensed table-hover" width="100%">
															<tbody><tr onclick="dacperioperatifpraex_setScorec3(2, 1);">
																<td align="center" style="padding:0;">
																	<label class="col-form-label">2</label>
																</td>
															</tr>
															<tr onclick="dacperioperatifpraex_setScorec3(1, 1);">
																<td align="center" style="padding:0;">
																	<label class="col-form-label">1</label>
																</td>
															</tr>
															<tr onclick="dacperioperatifpraex_setScorec3(0, 1);">
																<td align="center" style="padding:0;">
																	<label class="col-form-label">0</label>
																</td>
															</tr>
														</tbody></table>
													</td>
													<td class="align-middle">
														<table class="table-bordered table-condensed" width="100%">
															<tbody><tr height="100%" align="center">
																<td align="center" width="100%" style="padding:0;">
																	<label class="col-form-label font-weight-bold" id="dacperioperatifpra_bskorc1">0</label>
																</td>
															</tr>
														</tbody></table>
													</td>
												</tr>
												<tr>
													<td class="align-middle">
														<div class="row d-flex justify-content-center">
															<label class="col-form-label">2</label>
														</div>
													</td>
													<td class="align-middle">
														<div class="row d-flex justify-content-center">
															<label class="col-form-label">Pernafasan</label>
														</div>
													</td>
													<td style="padding:0;">
														<table class="table-bordered table-condensed table-hover" width="100%">
															<tbody><tr onclick="dacperioperatifpraex_setScorec3(2, 2);">
																<td width="100%" style="padding:0;">
																	<label class="col-form-label">&nbsp;Batuk, menangis</label>
																</td>									
															</tr>
															<tr onclick="dacperioperatifpraex_setScorec3(1, 2);">
																<td style="padding:0;">
																	<label class="col-form-label">&nbsp;Pertahankan jalan nafas</label>
																</td>
															</tr>
															<tr onclick="dacperioperatifpraex_setScorec3(0, 2);">
																<td style="padding:0;">
																	<label class="col-form-label">&nbsp;Perlu bantuan</label>
																</td>
															</tr>
														</tbody></table>
													</td>
													<td style="padding:0;">
														<table class="table-bordered table-condensed table-hover" width="100%">
															<tbody><tr onclick="dacperioperatifpraex_setScorec3(2, 2);">
																<td align="center" style="padding:0;">
																	<label class="col-form-label">2</label>
																</td>
															</tr>
															<tr onclick="dacperioperatifpraex_setScorec3(1, 2);">
																<td align="center" style="padding:0;">
																	<label class="col-form-label">1</label>
																</td>
															</tr>
															<tr onclick="dacperioperatifpraex_setScorec3(0, 2);">
																<td align="center" style="padding:0;">
																	<label class="col-form-label">0</label>
																</td>
															</tr>
														</tbody></table>
													</td>
													<td class="align-middle">
														<table class="table-bordered table-condensed" width="100%">
															<tbody><tr height="100%" align="center">
																<td align="center" width="100%" style="padding:0;">
																	<label class="col-form-label font-weight-bold" id="dacperioperatifpra_bskorc2">0</label>
																</td>
															</tr>
														</tbody></table>
													</td>
												</tr>
												<tr>
													<td class="align-middle">
														<div class="row d-flex justify-content-center">
															<label class="col-form-label">3</label>
														</div>
													</td>
													<td class="align-middle">
														<div class="row d-flex justify-content-center">
															<label class="col-form-label">Kesadaran</label>
														</div>
													</td>
													<td style="padding:0;">
														<table class="table-bordered table-condensed table-hover" width="100%">
															<tbody><tr onclick="dacperioperatifpraex_setScorec3(2, 3);">
																<td width="100%" style="padding:0;">
																	<label class="col-form-label">&nbsp;Menangis</label>
																</td>									
															</tr>
															<tr onclick="dacperioperatifpraex_setScorec3(1, 3);">
																<td style="padding:0;">
																	<label class="col-form-label">&nbsp;Bereaksi terhadap rangsangan</label>
																</td>
															</tr>
															<tr onclick="dacperioperatifpraex_setScorec3(0, 3);">
																<td style="padding:0;">
																	<label class="col-form-label">&nbsp;Tidak bereaksi</label>
																</td>
															</tr>
														</tbody></table>
													</td>
													<td style="padding:0;">
														<table class="table-bordered table-condensed table-hover" width="100%">
															<tbody><tr onclick="dacperioperatifpraex_setScorec3(2, 3);">
																<td align="center" style="padding:0;">
																	<label class="col-form-label">2</label>
																</td>
															</tr>
															<tr onclick="dacperioperatifpraex_setScorec3(1, 3);">
																<td align="center" style="padding:0;">
																	<label class="col-form-label">1</label>
																</td>
															</tr>
															<tr onclick="dacperioperatifpraex_setScorec3(0, 3);">
																<td align="center" style="padding:0;">
																	<label class="col-form-label">0</label>
																</td>
															</tr>
														</tbody></table>
													</td>
													<td class="align-middle">
														<table class="table-bordered table-condensed" width="100%">
															<tbody><tr height="100%" align="center">
																<td align="center" width="100%" style="padding:0;">
																	<label class="col-form-label font-weight-bold" id="dacperioperatifpra_bskorc3">0</label>
																</td>
															</tr>
														</tbody></table>
													</td>
												</tr>
												<tr>
													<td colspan="2" class="align-middle">
														<div class="row d-flex justify-content-center">
															<label class="col-form-label font-weight-bold">Total Skor</label>
														</div>
													</td>
													<td colspan="2" class="align-middle">
														<div class="row d-flex justify-content-center">
															<label class="col-form-label font-weight-bold" id="dacperioperatifpra_skorchasil3">Hasil Skor : Pasien Tidak Dapat Dipindahkan Ke Ruangan</label>
														</div>
													</td>
													<td>
														<table class="table-bordered table-condensed" width="100%">
															<tbody><tr height="100%">
																<td style="padding:0;" align="center">
																	<label class="col-form-label font-weight-bold" id="dacperioperatifpra_skorctot3">0</label>
																</td>
															</tr>
														</tbody></table>
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
			<div class="card"><!-- Asuhan Keperawatan Pasca Operasi -->
				<div class="card-header" style="background-color:black;">
					<h3 class="card-title" style="color:white;">Asuhan Keperawatan Pasca Operasi</h3>
					<div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse">
							<i class="fas fa-minus"></i>
						</button>			  
					</div>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-bordered table-condensed" width="100%">
									<tbody>
										<tr>
											<td width="33%" style="padding:3px;">
												<div class="row d-flex justify-content-center">
													<label class="col-form-label font-weight-bold">DIAGNOSIS KEPERAWATAN </label>
												</div>
											</td>
											<td width="33%" style="padding:3px;">
												<div class="row d-flex justify-content-center">
													<label class="col-form-label font-weight-bold">LUARAN KEPERAWATAN</label>
												</div>
											</td>
											<td width="34%" style="padding:3px;">
												<div class="row d-flex justify-content-center">
													<label class="col-form-label font-weight-bold">INTERVENSI KEPERAWATAN </label>
												</div>
											</td>
										</tr>
										<tr>
											<td width="30%" style="padding:3px;">
												<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
													<label class="col-form-label ">Risiko Syok (D. 0039) </label>
												</div>
												<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
													<label class="col-form-label font-weight-bold">Dibuktikan  Dengan :  </label>
												</div>
												<div class="row" style="padding:3px;margin-inline-start: 15px">
													<div class="col-md-12  text-truncate">
														<div class="row" id="divdacperioperatifpra_csuhan1">
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan1" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan1_1">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan1_1">Hipoksemia</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan1" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan1_2">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan1_2">Hipoksia</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan1" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan1_3">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan1_3">Hipotensi</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan1" value="4" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan1_4">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan1_4">Kekurangan volume cairan</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan1" value="5" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan1_5">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan1_5">Sepsis</label>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</td>
											<td width="30%" style="padding:3px;">
												<div class="row d-flex" style="padding:3px;margin-inline-end: 15px">
													<label class="col-form-label ">Setelah dilakukan intervensi selama</label>
													<input type="text" name="dacperioperatifpra_csuhan2" id="dacperioperatifpra_csuhan2" style="width:100%;" class="form-control">
												</div>
												<div class="row d-flex" style="padding:3px;margin-inline-end: 15px">
													<label class="col-form-label ">Maka Tingkat Syok Menurun, dengan Kriteria Hasil :  </label>
												</div>
												<div class="row" style="padding:3px;margin-inline-end: 15px">
													<div class="col-md-12  text-truncate">
														<div class="row" id="dacperioperatifpra_csuhan3">
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan3" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan3_1">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan3_1">Kekuatan nadi meningkat*</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan3" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan3_2">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan3_2">Output urine meningkat*</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan3" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan3_3">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan3_3">Tingkat kesadaran meningkat*</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan3" value="4" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan3_4">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan3_4">Saturasi oksigen meningkat*</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan3" value="5" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan3_5">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan3_5">Akral dingin menurun*</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan3" value="6" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan3_6">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan3_6">Tekanan darah diastolik membaik*</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan3" value="7" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan3_7">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan3_7">Tekanan nadi membaik*</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan3" value="8" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan3_8">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan3_8">Pengisian kapiler membaik*</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan3" value="9" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan3_9">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan3_9">Frekuensi nadi membaik*</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan3" value="10" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan3_10">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan3_10">Frekuensi napas membaik*</label>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</td>
											<td width="20%" style="padding:3px;">
												<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
													<label class="col-form-label ">Pencegahan Syok (I. 02068)</label>
												</div>
												<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
													<label class="col-form-label">Observasi </label>
												</div>
												<div class="row" style="padding:3px;margin-inline-start: 15px">
													<div class="col-md-12  text-truncate">
														<div class="row" id="dacperioperatifpra_csuhan4">
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan4" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan4_1">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan4_1">Monitor status kardiopulmonal (frekuensi dan kekuatan nadi, frekuensi napas, TD. MAP)</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan4" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan4_2">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan4_2">Monitor status cairan (masukan dan haluaran, turgor kulit, CRT)</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan4" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan4_3">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan4_3">Monito tingkat kesadaran dan respon pupil</label>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
													<label class="col-form-label">Terapeutik </label>
												</div>
												<div class="row" style="padding:3px;margin-inline-start: 15px">
													<div class="col-md-12  text-truncate">
														<div class="row" id="dacperioperatifpra_csuhan5">
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan5" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan5_1">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan5_1">Berikan oksigen untuk mempertahankan saturasi oksigen &gt; 94%</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan5" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan5_2">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan5_2">Persiapkan intubasi dan ventilasi mekanis, jika perlu</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan5" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan5_3">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan5_3">Pasang jalur IV, jika perlu</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan5" value="4" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan5_4">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan5_4">Pasang kateter urine untuk menilai produksi urine, jika perlu</label>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td width="30%" style="padding:3px;">
												<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
													<label class="col-form-label ">Risiko ketidakseimbangan cairan (D.0036)</label>
												</div>
												<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
													<label class="col-form-label">Dibuktikan  Dengan :  </label>
												</div>
												<div class="row" style="padding:3px;margin-inline-start: 15px">
													<div class="col-md-12 text-truncate">
														<div class="row" id="dacperioperatifpra_csuhan6">
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan6" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan6_1">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan6_1">Prosedur pembedahan mayor</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan6" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan6_2">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan6_2">Trauma / perdarahan</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan6" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan6_3">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan6_3">Obstruksi intestinal</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan6" value="4" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan6_4">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan6_4">Disfungsi intestinal</label>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</td>
											<td width="30%" style="padding:3px;">
												<div class="row d-flex" style="padding:3px;margin-inline-end: 15px">
													<label class="col-form-label ">Setelah dilakukan intervensi selama</label>
													<input type="text" name="dacperioperatifpra_csuhan7" id="dacperioperatifpra_csuhan7" style="width:100%;" class="form-control">
												</div>
												<div class="row d-flex" style="padding:3px;margin-inline-end: 15px">
													<label class="col-form-label ">Maka Tingkat Status Cairan (L.03028) Membaik, dengan Kriteria Hasil :  </label>
												</div>
												<div class="row" style="padding:3px;margin-inline-end: 15px">
													<div class="col-md-12 text-truncate">
														<div class="row" id="dacperioperatifpra_csuhan8">
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan8" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan8_1">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan8_1">Kekuatan nadi meningkat*</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan8" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan8_2">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan8_2">Turgor kulit meningkat*</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan8" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan8_3">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan8_3">Output urine Meningkat*</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan8" value="4" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan8_4">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan8_4">Pengisian Vena meningkat*</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan8" value="5" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan8_5">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan8_5">Ortopne Menurun*</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan8" value="6" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan8_6">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan8_6">Dipsnea menurun*</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan8" value="7" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan8_7">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan8_7">Paroxysmal nocturnal dypsnea (PND) menurun*</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan8" value="8" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan8_8">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan8_8">Frekuensi nadi membaik*</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan8" value="9" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan8_9">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan8_9">Tekanan Darah membaik*</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan8" value="10" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan8_10">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan8_10">Tekanan Nadi membaik*</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan8" value="11" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan8_11">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan8_11">Suhu tubuh membaik *</label>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</td>
											<td width="20%" style="padding:3px;">
												<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
													<label class="col-form-label ">Manajemen Cairan (I.03098)</label>
												</div>
												<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
													<label class="col-form-label">Observasi </label>
												</div>
												<div class="row" style="padding:3px;margin-inline-start: 15px">
													<div class="col-md-12  text-truncate">
														<div class="row" id="dacperioperatifpra_csuhan9">
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan9" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan9_1">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan9_1">Monitor status hidrasi (Frekuensi nadi, kekuatan nadi, akral, pengisian kapiler, dll)</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan9" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan9_2">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan9_2">Monitor hasil pemeriksaan laboratorium (Hematokrit, Na, K, Cl, Berat jenis urine, BUN)</label>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
													<label class="col-form-label">Terapeutik  </label>
												</div>
												<div class="row" style="padding:3px;margin-inline-start: 15px">
													<div class="col-md-12 text-truncate">
														<div class="row" id="divdacperioperatifpra_csuhan10">
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan10" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan10_1">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan10_1">Catat intake – output dan hitung balance cairan 24 jam</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan10" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan10_2">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan10_2">Berikan asupan cairan , sesuai kebutuhan</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan10" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan10_3">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan10_3">Berikan cairan intravena, jika perlu</label>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
													<label class="col-form-label">Kolaborasi  </label>
												</div>
												<div class="row" style="padding:3px;margin-inline-start: 15px">
													<div class="col-md-12 text-truncate">
														<div class="row" id="divdacperioperatifpra_csuhan11">
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-checkbox custom-control-inline">
																		<input name="dacperioperatifpra_csuhan11" value="1" type="checkbox" class="custom-control-input" id="dacperioperatifpra_csuhan11_1">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan11_1">Kolaborasi pemberian diuretik, jika perlu</label>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td width="30%" style="padding:3px;">
												<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
													<label class="col-form-label ">Nyeri akut (D.0077)</label>
												</div>
												<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
													<label class="col-form-label">Berhubungan dengan :  </label>
												</div>
												<div class="row" style="padding:3px;margin-inline-start: 15px">
													<div class="col-md-12  text-truncate">
														<div class="row" id="divdacperioperatifpra_csuhan12">
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-checkbox custom-control-inline">
																		<input name="dacperioperatifpra_csuhan12" value="1" type="checkbox" class="custom-control-input" id="dacperioperatifpra_csuhan12_1">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan12_1">Agen pencedera fisik (prosedur operasi)</label>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
													<label class="col-form-label">Dibuktikan dengan :  </label>
												</div>
												<div class="row" style="padding:3px;margin-inline-start: 15px">
													<div class="col-md-12  text-truncate">
														<div class="row" id="divdacperioperatifpra_csuhan13">
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan13" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan13_1">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan13_1">Mengeluh nyeri</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan13" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan13_2">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan13_2">Tampak meringis</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan13" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan13_3">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan13_3">Bersikap protektif (mis. waspada, posisi menghindari nyeri)</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan13" value="4" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan13_4">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan13_4">Gelisah</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan13" value="5" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan13_5">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan13_5">Frekuensi nadi meningkat</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan13" value="6" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan13_6">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan13_6">Tekanan darah meningkat</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan13" value="7" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan13_7">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan13_7">Pola nafas berubah</label>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</td>
											<td width="30%" style="padding:3px;">
												<div class="row d-flex" style="padding:3px;margin-inline-end: 15px">
													<label class="col-form-label ">Setelah dilakukan intervensi selama</label>
													<input type="text" name="dacperioperatifpra_csuhan14" id="dacperioperatifpra_csuhan14" style="width:100%;" class="form-control">
												</div>
												<div class="row d-flex" style="padding:3px;margin-inline-end: 15px">
													<label class="col-form-label ">Maka Tingkat Nyeri (L.08066) Menurun, dengan Kriteria Hasil :  </label>
												</div>
												<div class="row" style="padding:3px;margin-inline-end: 15px">
													<div class="col-md-12 text-truncate">
														<div class="row" id="divdacperioperatifpra_csuhan15">
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan15" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan15_1">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan15_1">Kemampuan menuntaskan aktivitas meningkat*</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan15" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan15_2">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan15_2">Keluhan nyeri menurun*</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan15" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan15_3">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan15_3">Meringis menurun*</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan15" value="4" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan15_4">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan15_4">Sikap protektif menurun*</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan15" value="5" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan15_5">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan15_5">Gelisah menurun*</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan15" value="6" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan15_6">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan15_6">Ketegangan otot menurun*</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan15" value="7" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan15_7">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan15_7">Pupil dilatasi menurun*</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan15" value="8" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan15_8">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan15_8">Frekuensi nadi membaik*</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan15" value="9" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan15_9">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan15_9">Pola nafas membaik*</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan15" value="10" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan15_10">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan15_10">Tekanan darah membaik*</label>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</td>
											<td width="20%" style="padding:3px;">
												<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
													<label class="col-form-label ">Manajemen nyeri (I.08238)</label>
												</div>
												<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
													<label class="col-form-label">Observasi </label>
												</div>
												<div class="row" style="padding:3px;margin-inline-start: 15px">
													<div class="col-md-12  text-truncate">
														<div class="row" id="divdacperioperatifpra_csuhan16">
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan16" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan16_1">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan16_1">Identifikasi lokasi, karakteristik, durasi, frekuensi, kualitas, Intensitas nyeri</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan16" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan16_2">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan16_2">Identifikasi skala nyeri</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan16" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan16_3">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan16_3">Identifikasi respon nyeri non verbal</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan16" value="4" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan16_4">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan16_4">Identifikasi factor yang memperberat dan memperingan nyeri</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan16" value="5" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan16_5">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan16_5">Monitor efek samping pengaruh analgetik</label>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
													<label class="col-form-label">Terapeutik </label>
												</div>
												<div class="row" style="padding:3px;margin-inline-start: 15px">
													<div class="col-md-12 text-truncate">
														<div class="row" id="divdacperioperatifpra_csuhan17">
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan17" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan17_1">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan17_1">Berikan teknik nonfarmakologis untuk mengurangi rasa nyeri</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan17" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan17_2">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan17_2">Kontrol lingkungan yang mempeberat rasa nyeri (mis. suhu ruangan, pencahayaan, kebisingan)</label>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
													<label class="col-form-label">Edukasi </label>
												</div>
												<div class="row" style="padding:3px;margin-inline-start: 15px">
													<div class="col-md-12 text-truncate">
														<div class="row" id="divdacperioperatifpra_csuhan18">
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan18" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan18_1">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan18_1">Jelaskan Penyebab, periode dan pemicu nyeri</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-radio custom-control-inline">
																		<input name="dacperioperatifpra_csuhan18" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_csuhan18_2">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan18_2">Jelaskan strategi meredakan nyeri</label>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="row d-flex" style="padding:3px;margin-inline-start: 15px">
													<label class="col-form-label">Kolaborasi </label>
												</div>
												<div class="row" style="padding:3px;margin-inline-start: 15px">
													<div class="col-md-12 text-truncate">
														<div class="row" id="divdacperioperatifpra_csuhan19">
															<div class="col-md-12">
																<div class="form-group">
																	<div class="row custom-control custom-checkbox custom-control-inline">
																		<input name="dacperioperatifpra_csuhan19" value="1" type="checkbox" class="custom-control-input" id="dacperioperatifpra_csuhan19_1">
																		<label class="custom-control-label" for="dacperioperatifpra_csuhan19_1">Kolaborasi pemberian analgetik, jika perlu</label>
																	</div>
																</div>
															</div>
														</div>
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
			<div class="card"><!-- TTD DOKTER PERAWAT -->				
				<div class="card-body">
				    <div class="row">
				        <div class="col-md-6" align="center">
				          <label>Dokter Anestesi</label>
				          <div style="text-align: center;">
				            <img style="width:200px;height:200px;border: 2px dashed;background-color: #535b62d1;" id="gambarttddokteranestesi">
				            <input type="text" class="form-control form-control-sm text-center d-none" id="hasilttddokteranestesi" disabled>
				          </div>
				          <button  class="btn btn-warning btn-sm" onclick="openmodalasuhanperoperatif('modalttddokteranestesi');">Klik Tanda Tangan</button><br>
				          <div class="col-sm-6" align="center">
				          <select id="dacperioperatifpra_apj10Id" class="form-control"></select>
				      	  </div>
				          <label>Nama &amp; Tanda tangan</label>
				        </div>

				        <div class="col-md-6" align="center">
				          <label>Perawat Anestesi</label>
		                  <div style="text-align: center;">
		                    <img style="width:200px;height:200px;border: 2px dashed;background-color: #535b62d1;" id="gambarttdanestesi2">
		                    <input type="text" class="form-control form-control-sm text-center d-none" id="hasilttdperawatanestesi2" disabled>
		                  </div>
		                  <button onclick="openmodalasuhanperoperatif('modalttdperawatanestesi2')" class="btn btn-warning btn-sm">Klik Tanda Tangan</button><br>
		                  <div class="col-sm-6" align="center">
				          <select id="dacperioperatifpra_apj11Id" class="form-control"></select>
				      	  </div>
				          <label>Nama &amp; Tanda tangan</label>
				        </div>
				    </div>
				</div>
				<div class="card-footer">
					<button id="dacperioperatifpra_btsave3" type="button" class="btn btn-sm btn-primary" onclick="saveasuhanperoperatif2();" ><i class="fas fa-save"></i> Simpan</button>
					<button id="dacperioperatifpra_btdelete3" type="button" class="btn btn-sm btn-danger d-none" ><!-- <i class="fas fa-trash"></i> --> Hapus</button>
					<button id="dacperioperatifpra_btprint3" type="button" class="btn btn-sm btn-success d-none" onclick=""><!-- <i class="fas fa-print"></i> --> Print PDF</button>
					<button id="dacperioperatifpra_btreset3" type="button" class="btn btn-sm btn-warning d-none"><!-- <i class="fas fa-ban"></i> --> Reset</button>
				</div>
			</div>
			<div class="card"><!-- Dokumentasi Post Operasi -->
				<div class="card-header" style="background-color:black;">
					<h3 class="card-title" style="color:white;">DOKUMENTASI POST OPERASI</h3>
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
								<div class="col-md-3">
									<label class="col-form-label">1. Dokumentasi Post Operasi</label>
								</div>
								<div class="col-md-9">
									<div class="row" id="dacperioperatifpra_dokumentasi">
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input name="dacperioperatifpra_dokumentasi" value="1" type="checkbox" class="custom-control-input" id="dacperioperatifpra_dokumentasi_1">
													<label class="custom-control-label" for="dacperioperatifpra_dokumentasi_1">Laporan Operasi</label>
												</div>										
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input name="dacperioperatifpra_dokumentasi" value="2" type="checkbox" class="custom-control-input" id="dacperioperatifpra_dokumentasi_2">
													<label class="custom-control-label" for="dacperioperatifpra_dokumentasi_2">Catatan Anestesi</label>
												</div>											
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input name="dacperioperatifpra_dokumentasi" value="3" type="checkbox" class="custom-control-input" id="dacperioperatifpra_dokumentasi_3">
													<label class="custom-control-label" for="dacperioperatifpra_dokumentasi_3">Resume</label>
												</div>

											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input name="dacperioperatifpra_dokumentasi" value="4" type="checkbox" class="custom-control-input" id="dacperioperatifpra_dokumentasi_4">
													<label class="custom-control-label" for="dacperioperatifpra_dokumentasi_4">Resep</label>
												</div>

											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input name="dacperioperatifpra_dokumentasi" value="5" type="checkbox" class="custom-control-input" id="dacperioperatifpra_dokumentasi_5">
													<label class="custom-control-label" for="dacperioperatifpra_dokumentasi_5">Form PA</label>
												</div>

											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input name="dacperioperatifpra_dokumentasi" value="6" type="checkbox" class="custom-control-input" id="dacperioperatifpra_dokumentasi_6">
													<label class="custom-control-label" for="dacperioperatifpra_dokumentasi_6">Form radiologi</label>
												</div>

											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input name="dacperioperatifpra_dokumentasi" value="7" type="checkbox" class="custom-control-input" id="dacperioperatifpra_dokumentasi_7">
													<label class="custom-control-label" for="dacperioperatifpra_dokumentasi_7">Status / EMR Pasien</label>
												</div>

											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input name="dacperioperatifpra_dokumentasi" value="8" type="checkbox" class="custom-control-input" id="dacperioperatifpra_dokumentasi_8">
													<label class="custom-control-label" for="dacperioperatifpra_dokumentasi_8">Hasil radiologi</label>
												</div>

											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input name="dacperioperatifpra_dokumentasi" value="9" type="checkbox" class="custom-control-input" id="dacperioperatifpra_dokumentasi_9">
													<label class="custom-control-label" for="dacperioperatifpra_dokumentasi_9">Darah</label>
												</div>

											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input name="dacperioperatifpra_dokumentasi" value="10" type="checkbox" class="custom-control-input" id="dacperioperatifpra_dokumentasi_10">
													<label class="custom-control-label" for="dacperioperatifpra_dokumentasi_10">Lainnya</label>
												</div>
												<div class="row" id="dacperioperatifpra_div_dokumentasi_10" style="display:none;">
													<div class="col-md-1"></div>
													<div class="col-md-11">
														<input type="text" onfocus="this.select();" class="form-control" id="dacperioperatifpra_dokumentasiket10">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-3">
									<label class="col-form-label">2. Pemberitahuan Keluarga Pasien</label>
								</div>
								<div class="col-md-0">&nbsp;</div>
								<div class="col-md-3">
									<div class="input-group date" id="dacperioperatifpra_dkelpx" data-target-input="nearest">
										<span class="input-group-prepend">
											<span class="input-group-text">&nbsp;Jam&nbsp;</span>
										</span>
										<input id="dacperioperatifpra_kelpx" name="prruang" type="time" class="form-control datetimepicker-input">
									</div>
								</div>
								<div class="col-md-5">
									<div class="input-group">
										<span class="input-group-prepend">
											<span class="input-group-text">&nbsp;Ket&nbsp;</span>
										</span>
										<input type="text" onfocus="this.select();" class="form-control" id="dacperioperatifpra_kelket">
									</div>
								</div>
							</div>
							<div class="form-group row" style="padding-top: 4px;">
								<div class="col-md-3">
									<label class="col-form-label">3. Alat yang Terpasang</label>
								</div>
								<div class="col-md-9">
									<div class="row" id="dacperioperatifpra_alat">
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input name="dacperioperatifpra_alat" value="1" type="checkbox" class="custom-control-input" id="dacperioperatifpra_alat_1">
													<label class="custom-control-label" for="dacperioperatifpra_alat_1">Infus</label>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input name="dacperioperatifpra_alat" value="2" type="checkbox" class="custom-control-input" id="dacperioperatifpra_alat_2">
													<label class="custom-control-label" for="dacperioperatifpra_alat_2">Transfusi</label>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input name="dacperioperatifpra_alat" value="3" type="checkbox" class="custom-control-input" id="dacperioperatifpra_alat_3">
													<label class="custom-control-label" for="dacperioperatifpra_alat_3">NGT</label>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input name="dacperioperatifpra_alat" value="4" type="checkbox" class="custom-control-input" id="dacperioperatifpra_alat_4">
													<label class="custom-control-label" for="dacperioperatifpra_alat_4">Kateter</label>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input name="dacperioperatifpra_alat" value="5" type="checkbox" class="custom-control-input" id="dacperioperatifpra_alat_5">
													<label class="custom-control-label" for="dacperioperatifpra_alat_5">ETT</label>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input name="dacperioperatifpra_alat" value="6" type="checkbox" class="custom-control-input" id="dacperioperatifpra_alat_6">
													<label class="custom-control-label" for="dacperioperatifpra_alat_6">Drain</label>
												</div>
												<div class="row" id="dacperioperatifpra_div_alat_6" style="display:none;">
													<div class="col-md-1"></div>
													<div class="col-md-11">
														<input type="text" onfocus="this.select();" class="form-control" id="dacperioperatifpra_alatket6">
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input name="dacperioperatifpra_alat" value="7" type="checkbox" class="custom-control-input" id="dacperioperatifpra_alat_7">
													<label class="custom-control-label" for="dacperioperatifpra_alat_7">Tampon</label>
												</div>										
												<div class="row" id="dacperioperatifpra_div_alat_7" style="display:none;">
													<div class="col-md-1"></div>
													<div class="col-md-11">
														<input type="text" onfocus="this.select();" class="form-control" id="dacperioperatifpra_alatket7">
													</div>
												</div>										
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input name="dacperioperatifpra_alat" value="8" type="checkbox" class="custom-control-input" id="dacperioperatifpra_alat_8">
													<label class="custom-control-label" for="dacperioperatifpra_alat_8">Lainnya</label>
												</div>
												<div class="row" id="dacperioperatifpra_div_alat_8" style="display:none;">
													<div class="col-md-1"></div>
													<div class="col-md-11">
														<input type="text" onfocus="this.select();" class="form-control" id="dacperioperatifpra_alatket8">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-12">
									<div class="row ">

									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group row">
								<div class="col-md-3">
									<label class="col-form-label">4. Keadaan Pasien</label>
								</div>
								<div class="col-md-9">
									<div class="row" id="dacperioperatifpra_dku">
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input name="dacperioperatifpra_dku" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_dku_1">
													<label class="custom-control-label" for="dacperioperatifpra_dku_1">Baik</label>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input name="dacperioperatifpra_dku" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_dku_2">
													<label class="custom-control-label" for="dacperioperatifpra_dku_2">Sedang</label>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input name="dacperioperatifpra_dku" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_dku_3">
													<label class="custom-control-label" for="dacperioperatifpra_dku_3">Berat</label>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- 					</div> -->
								<!-- 					<div class="form-group row"> -->
									<div class="col-md-3">
										<label class="col-form-label">    GCS </label>
									</div>
									<div class="col-md-0">&nbsp;</div>
									<div class="col-md-2">
										<div class="input-group">
											<span class="input-group-prepend">
												<span class="input-group-text">&nbsp;E&nbsp;</span>
											</span>
											<input type="text" id="dacperioperatifpra_de" class="form-control">
										</div>
									</div>
									<div class="col-md-2">
										<div class="input-group">
											<span class="input-group-prepend">
												<span class="input-group-text">&nbsp;M&nbsp;</span>
											</span>
											<input type="text" id="dacperioperatifpra_dm" class="form-control">
										</div>
									</div>
									<div class="col-md-2">
										<div class="input-group">
											<span class="input-group-prepend">
												<span class="input-group-text">&nbsp;V&nbsp;</span>
											</span>
											<input type="text" id="dacperioperatifpra_dv" class="form-control">
										</div>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-3">
										<label class="col-form-label">    Kesadaran</label>
									</div>
									<div class="col-md-0">&nbsp;</div>
									<div class="col-md-6">
										<select name="cku2" id="dacperioperatifpra_dku2" class="form-control">
											<option value="1">Compos Mentis</option>
											<option value="2">Apatis</option>
											<option value="3">Somnolen</option>
											<option value="4">Delirium</option>
											<option value="5">Sopor</option>
											<option value="6">Coma</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-3">
										<label class="col-form-label" title="Reflek Cahaya">    Reflek Cahaya</label>
									</div>
									<div class="col-md-0">&nbsp;</div>
									<div class="col-md-4">
										<div class="input-group">
											<span class="input-group-prepend">
												<span class="input-group-text">&nbsp;Kiri&nbsp;</span>
											</span>
											<select name="creflek1" id="dacperioperatifpra_dreflek1" class="form-control">
												<option value="1">+</option>
												<option value="2">-</option>
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="input-group">
											<span class="input-group-prepend">
												<span class="input-group-text">&nbsp;Kanan&nbsp;</span>
											</span>
											<select name="creflek1" id="dacperioperatifpra_dreflek2" class="form-control">
												<option value="1">+</option>
												<option value="2">-</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-3">
										<label class="col-form-label" title="Pupil">    Pupil</label>
									</div>
									<div class="col-md-0">&nbsp;</div>
									<div class="col-md-4">
										<div class="input-group">
											<span class="input-group-prepend">
												<span class="input-group-text">&nbsp;Kiri&nbsp;</span>
											</span>
											<select name="cpupil1" id="dacperioperatifpra_dpupil1" class="form-control">
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="input-group">
											<span class="input-group-prepend">
												<span class="input-group-text">&nbsp;Kanan&nbsp;</span>
											</span>
											<select name="cpupil2" id="dacperioperatifpra_dpupil2" class="form-control">
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
											</select>
											<span class="input-group-append">
												<span class="input-group-text">&nbsp;mm&nbsp;</span>
											</span>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-3">
										<label class="col-form-label">    Tanda Vital</label>
									</div>
									<div class="col-md-0">&nbsp;</div>
									<div class="col-md-4">
										<div class="input-group">
											<span class="input-group-prepend">
												<span class="input-group-text">&nbsp;TD&nbsp;</span>
											</span>
											<input type="text" id="dacperioperatifpra_dtensi1" class="form-control">
										</div>
									</div>
									<div class="col-md-4">
										<div class="input-group">
											<input type="text" id="dacperioperatifpra_dtensi2" class="form-control">
											<span class="input-group-append">
												<span class="input-group-text">&nbsp;mmHg&nbsp;</span>
											</span>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-3">
										<label class="col-form-label"> </label>
									</div>
									<div class="col-md-0">&nbsp;</div>
									<div class="col-md-4">
										<div class="input-group">
											<span class="input-group-prepend">
												<span class="input-group-text">&nbsp;Nadi&nbsp;</span>
											</span>
											<input type="text" id="dacperioperatifpra_dn" class="form-control">
											<span class="input-group-append">
												<span class="input-group-text">&nbsp;x/mnt&nbsp;</span>
											</span>
										</div>
									</div>
									<div class="col-md-4">
										<div class="input-group">
											<span class="input-group-prepend">
												<span class="input-group-text">&nbsp;Respirasi&nbsp;</span>
											</span>
											<input type="text" id="dacperioperatifpra_dp" class="form-control">
											<span class="input-group-append">
												<span class="input-group-text">&nbsp;x/mnt&nbsp;</span>
											</span>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-3">
										<label class="col-form-label"> </label>
									</div>
									<div class="col-md-0">&nbsp;</div>
									<div class="col-md-4">
										<div class="input-group">
											<span class="input-group-prepend">
												<span class="input-group-text">&nbsp;Suhu&nbsp;</span>
											</span>
											<input type="text" id="dacperioperatifpra_ds" class="form-control">
											<span class="input-group-append">
												<span class="input-group-text">&nbsp;°C&nbsp;</span>
											</span>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-3">
										<label class="col-form-label">    Skrining Nyeri</label>
									</div>
									<div class="col-md-9">
										<div class="row" id="dacperioperatifpra_nyerid">
											<div class="col-md-4">
												<div class="form-group">
													<div class="row custom-control custom-checkbox custom-control-inline">
														<input onclick="document.getElementById('dacperioperatifpra_div_nyerid_2').style.display='none'" name="dacperioperatifpra_nyerid" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_nyerid_1">
														<label class="custom-control-label" for="dacperioperatifpra_nyerid_1">Tidak</label>
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<div class="row custom-control custom-checkbox custom-control-inline">
														<input onclick="document.getElementById('dacperioperatifpra_div_nyerid_2').style.display='block'" name="dacperioperatifpra_nyerid" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_nyerid_2">
														<label class="custom-control-label" for="dacperioperatifpra_nyerid_2">Ya</label>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group row" id="dacperioperatifpra_div_nyerid_2" style="display:none;">
									<div class="col-md-1"></div>					
									<div class="col-md-2">
										<label class="col-form-label" title="Skala">Skala</label>
									</div>
									<div class="col-md-7">
										<div class="form-group">
											<select name="skr" id="dacperioperatifpra_nyerid2" class="form-control">
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="6">6</option>
												<option value="7">7</option>
												<option value="8">8</option>
												<option value="9">9</option>
												<option value="10">10</option>
											</select>
										</div>
									</div>
								</div>										
								<div class="form-group row">
									<div class="col-md-3">
										<label class="col-form-label">    Resiko jatuh</label>
									</div>
									<div class="col-md-9">
										<div class="row" id="dacperioperatifpra_jatuhd">
											<div class="col-md-4">
												<div class="form-group">
													<div class="row custom-control custom-checkbox custom-control-inline">
														<input name="dacperioperatifpra_jatuhd" value="1" type="radio" class="custom-control-input" id="dacperioperatifpra_jatuhd_1">
														<label class="custom-control-label" for="dacperioperatifpra_jatuhd_1">Rendah</label>
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<div class="row custom-control custom-checkbox custom-control-inline">
														<input name="dacperioperatifpra_jatuhd" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_jatuhd_2">
														<label class="custom-control-label" for="dacperioperatifpra_jatuhd_2">Sedang</label>
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<div class="row custom-control custom-checkbox custom-control-inline">
														<input name="dacperioperatifpra_jatuhd" value="3" type="radio" class="custom-control-input" id="dacperioperatifpra_jatuhd_3">
														<label class="custom-control-label" for="dacperioperatifpra_jatuhd_3">Tinggi</label>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>					
								<div class="form-group row">
									<div class="col-md-3">
										<label class="col-form-label">    Perdarahan</label>
									</div>
									<div class="col-md-9">
										<div class="row" id="dacperioperatifpra_darah">
											<div class="col-md-4">
												<div class="form-group">
													<div class="row custom-control custom-checkbox custom-control-inline">
														<input onclick="document.getElementById('dacperioperatifpra_div_darah_2').style.display='none'" name="dacperioperatifpra_darah" value="Tidak" type="radio" class="custom-control-input" id="dacperioperatifpra_darah_1">
														<label class="custom-control-label" for="dacperioperatifpra_darah_1">Tidak</label>
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<div class="row custom-control custom-checkbox custom-control-inline">
														<input onclick="document.getElementById('dacperioperatifpra_div_darah_2').style.display='block'" name="dacperioperatifpra_darah" value="2" type="radio" class="custom-control-input" id="dacperioperatifpra_darah_2">
														<label class="custom-control-label" for="dacperioperatifpra_darah_2">Ya</label>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group row" id="dacperioperatifpra_div_darah_2" style="display:none;">
									<div class="col-md-3"></div>
									<div class="col-md-0">&nbsp;</div>
									<div class="col-md-4">
										<div class="input-group">
											<span class="input-group-prepend">
												<span class="input-group-text">&nbsp;Jumlah&nbsp;</span>
											</span>
											<input type="number" onfocus="this.select();" class="form-control" id="dacperioperatifpra_darahjumlah">
											<span class="input-group-append">
												<span class="input-group-text">&nbsp;mm&nbsp;</span>
											</span>
										</div>
									</div>
									<div class="col-md-4">
										<div class="input-group">
											<span class="input-group-prepend">
												<span class="input-group-text">&nbsp;Lokasi&nbsp;</span>
											</span>
											<input type="text" onfocus="this.select();" class="form-control" id="dacperioperatifpra_darahlokasi">
										</div>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-3">
										<label class="col-form-label">    Urine Output</label>
									</div>
									<div class="col-md-0">&nbsp;</div>
									<div class="col-md-4">
										<div class="input-group">
											<span class="input-group-prepend">
												<span class="input-group-text">&nbsp;Jumlah&nbsp;</span>
											</span>
											<input type="number" onfocus="this.select();" id="dacperioperatifpra_urinout" class="form-control">
											<span class="input-group-append">
												<span class="input-group-text">&nbsp;cc&nbsp;</span>
											</span>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-3">
										<label class="col-form-label">    Score Aldrete</label>
									</div>
									<div class="col-md-0">&nbsp;</div>
									<div class="col-md-4">
										<input type="text" id="dacperioperatifpra_dskor1" class="form-control">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-3">
										<label class="col-form-label">    Score Bromage</label>
									</div>
									<div class="col-md-0">&nbsp;</div>
									<div class="col-md-4">
										<input type="text" id="dacperioperatifpra_dskor2" class="form-control">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-3">
										<label class="col-form-label">    Score Steward</label>
									</div>
									<div class="col-md-0">&nbsp;</div>
									<div class="col-md-4">
										<input type="text" id="dacperioperatifpra_dskor3" class="form-control">
									</div>
								</div>
							</div>
						</div>						
					</div>
				<div class="card-footer">
					<button class="btn btn-sm btn-primary" onclick="savePostoperasi()"><i class="fas fa-save"></i> Simpan</button>
				</div>
				</div>
			</div>
		</div>
		<div class="modal fade"  id="modalttddokteranestesi" role="dialog">
			<div class="modal-dialog" style="width: 408px;">
				<div class="modal-content">
					<div class="modal-body">
						<div id="wpaintttddokteranestesi"></div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-sm btn-primary" onclick="takettddokteranestesi()"><i class="fa fa-save"></i> Simpan</button>
						<button class="btn btn-sm btn-outline-danger" onclick="$('#modalttddokteranestesi').modal('hide')"><i class="fa fa-times"></i> Batal</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade"  id="modalttdperawatanestesi2" role="dialog">
			<div class="modal-dialog" style="width: 408px;">
				<div class="modal-content">
					<div class="modal-body">
						<div id="wpaintttdperawatanestesi2"></div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-sm btn-primary" onclick="takettdanestesiperawat2()"><i class="fa fa-save"></i> Simpan</button>
						<button class="btn btn-sm btn-outline-danger" onclick="$('#modalttdperawatanestesi2').modal('hide')"><i class="fa fa-times"></i> Batal</button>
					</div>
				</div>
			</div>
		</div>	
		<div class="modal fade"  id="modalttdperawatasisten" role="dialog">
			<div class="modal-dialog" style="width: 408px;">
				<div class="modal-content">
					<div class="modal-body">
						<div id="wpaintttdperawatasisten"></div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-sm btn-primary" onclick="takettdasistenperawat()"><i class="fa fa-save"></i> Simpan</button>
						<button class="btn btn-sm btn-outline-danger" onclick="$('#modalttdperawatasisten').modal('hide')"><i class="fa fa-times"></i> Batal</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade"  id="modalttdperawatinstrumen" role="dialog">
			<div class="modal-dialog" style="width: 408px;">
				<div class="modal-content">
					<div class="modal-body">
						<div id="wpaintttdperawatinstrumen"></div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-sm btn-primary" onclick="takettdinstrumenperawat()"><i class="fa fa-save"></i> Simpan</button>
						<button class="btn btn-sm btn-outline-danger" onclick="$('#modalttdperawatinstrumen').modal('hide')"><i class="fa fa-times"></i> Batal</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade"  id="modalttdperawatsirkuler" role="dialog">
			<div class="modal-dialog" style="width: 408px;">
				<div class="modal-content">
					<div class="modal-body">
						<div id="wpaintttdperawatsirkuler"></div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-sm btn-primary" onclick="takettdsirkulerperawat()"><i class="fa fa-save"></i> Simpan</button>
						<button class="btn btn-sm btn-outline-danger" onclick="$('#modalttdperawatsirkuler').modal('hide')"><i class="fa fa-times"></i> Batal</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade"  id="modalttdperawatanestesi" role="dialog">
			<div class="modal-dialog" style="width: 408px;">
				<div class="modal-content">
					<div class="modal-body">
						<div id="wpaintttdperawatanestesi"></div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-sm btn-primary" onclick="takettdanestesiperawat()"><i class="fa fa-save"></i> Simpan</button>
						<button class="btn btn-sm btn-outline-danger" onclick="$('#modalttdperawatanestesi').modal('hide')"><i class="fa fa-times"></i> Batal</button>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			var nowday      = "<?php echo date('Y-m-d'); ?>";
			var id_kunjungan_priope;
			$('#dacperioperatifpra_bpremedikasipilihlist_1').on('click', function() {
				$("#dacperioperatifpra_div_bpremedikasipilihlist_1").show();
				$("#dacperioperatifpra_div_bpremedikasipilihlist_2").hide();
			});
			$('#dacperioperatifpra_bpremedikasipilihlist_2').on('click', function() {
				$("#dacperioperatifpra_div_bpremedikasipilihlist_2").show();
				$("#dacperioperatifpra_div_bpremedikasipilihlist_1").hide();
			});
			$('#dacperioperatifpra_dokumentasi_10').on('change', function() {
				if(document.getElementById('dacperioperatifpra_dokumentasi_10').checked){
					$("#dacperioperatifpra_div_dokumentasi_10").show();
				}else{
					$("#dacperioperatifpra_div_dokumentasi_10").hide();
				}
			});
			$('#dacperioperatifpra_alat_8').on('change', function() {
				if(document.getElementById('dacperioperatifpra_alat_8').checked){
					$("#dacperioperatifpra_div_alat_8").show();
				}else{
					$("#dacperioperatifpra_div_alat_8").hide();
				}
			});
			$(document).ready(function() {
				var data =document.getElementById('profilepasienirna').value;
				if (data=='') {
					var url  = ""
					var view = 'viewasuhanperioperatif';
					onCall_listpasien(view, url);
				}else{
					id_kunjungan = document.getElementById('idKunjunganermirna').value;
					viewdetail1(id_kunjungan);
					viewdetail2(id_kunjungan);
					viewdetail3(id_kunjungan);
				}

				pegawaiper();
				pegawaidok();
				showttdperawatasisten();
				showttdperawatinstrumen();
				showttdperawatsirkuler();
				showttdperawatanestesi();
				showttdperawatanestesi2();
				showttddokteranestesi();
				document.getElementById('dacperioperatifpra_atglmulaiop').value=nowday;
				document.getElementById('dacperioperatifpra_atglselesaiop').value=nowday;				
				setTimeout(refresh_listpasermirna_operasi, 1000); 
			});
			
function dacrjasesmenmedisex_setScore(a,b) {
	switch(b){
		case 1:
		document.getElementById('eyeOpenAP').value=a;
		break;
		case 2:
		document.getElementById('responMotorikAP').value=a;
		break;
		case 3:
		document.getElementById('responVerbalAP').value=a;
		break;
		default:
	}
	hitung()
}
function dacperioperatifpraex_setScorec1(a,b) {
	switch(b){
		case 1:
		document.getElementById('dacperioperatifpra_skorc1').innerHTML=a;
		break;
		case 2:
		document.getElementById('dacperioperatifpra_skorc2').innerHTML=a;
		break;
		case 3:
		document.getElementById('dacperioperatifpra_skorc3').innerHTML=a;
		break;
		case 4:
		document.getElementById('dacperioperatifpra_skorc4').innerHTML=a;
		break;
		case 5:
		document.getElementById('dacperioperatifpra_skorc5').innerHTML=a;
		break;
		default:
	}
	hitung2()
}
function dacperioperatifpraex_setScorec3(a,b) {
	switch(b){
		case 1:
		document.getElementById('dacperioperatifpra_bskorc1').innerHTML=a;
		break;
		case 2:
		document.getElementById('dacperioperatifpra_bskorc2').innerHTML=a;
		break;
		case 3:
		document.getElementById('dacperioperatifpra_bskorc3').innerHTML=a;
		break;
		default:
	}
	hitung3()
}
function hitung() {
	var a=document.getElementById('eyeOpenAP').value;
	var b=document.getElementById('responMotorikAP').value;
	var c=document.getElementById('responVerbalAP').value;
	document.getElementById('dacrjasesmenmedis_bgcstotAP').value=parseInt(a) + parseInt(b) + parseInt(c);
}
function hitung2() {
	var a=document.getElementById('dacperioperatifpra_skorc1').innerHTML;
	var b=document.getElementById('dacperioperatifpra_skorc2').innerHTML;
	var c=document.getElementById('dacperioperatifpra_skorc3').innerHTML;
	var d=document.getElementById('dacperioperatifpra_skorc4').innerHTML;
	var e=document.getElementById('dacperioperatifpra_skorc5').innerHTML;
	total=parseInt(a) + parseInt(b) + parseInt(c)+ parseInt(d) + parseInt(e);
	document.getElementById('dacperioperatifpra_skorctot').innerHTML=total;
}
function hitung3() {
	var a=document.getElementById('dacperioperatifpra_bskorc1').innerHTML;
	var b=document.getElementById('dacperioperatifpra_bskorc2').innerHTML;
	var c=document.getElementById('dacperioperatifpra_bskorc3').innerHTML;
	
	total=parseInt(a) + parseInt(b) + parseInt(c);
	document.getElementById('dacperioperatifpra_skorctot3').innerHTML=total;
}

function pegawaidok() {
	apiPOST('Rekammedisirna/pegawaidokok', null,hasil=>{
		var a=hasil['data'];
		var pegawai='';
		for (var i = 0; i < a.length; i++) {
			pegawai+='<option value="'+a[i]['id_pegawai']+'">'+a[i]['nama_pegawai']+'</option>';
		}
		document.getElementById('dacperioperatifpra_bdokop').innerHTML=pegawai;
		document.getElementById('dacperioperatifpra_bdokanas').innerHTML=pegawai;
		document.getElementById('dacperioperatifpra_apj10Id').innerHTML=pegawai;

	});
}
function pegawaiper() {
	apiPOST('Rekammedisirna/pegawaiperok', null,hasil=>{
		var a=hasil['data'];
		var pegawai='';
		for (var i = 0; i < a.length; i++) {
			pegawai+='<option value="'+a[i]['id_pegawai']+'">'+a[i]['nama_pegawai']+'</option>';
		}
		document.getElementById('dacperioperatifpra_apj6Id').innerHTML=pegawai;
		document.getElementById('dacperioperatifpra_apj7Id').innerHTML=pegawai;
		document.getElementById('dacperioperatifpra_apj8Id').innerHTML=pegawai;
		document.getElementById('dacperioperatifpra_apj9Id').innerHTML=pegawai;
		document.getElementById('dacperioperatifpra_apj11Id').innerHTML=pegawai;
	});
}
function saveAsuhanPerioperatif() {
	var dacperioperatifpra_akeadaan  = document.getElementById('dacperioperatifpra_akeadaan').value;
	var dacperioperatifpra_crespirasi= document.getElementById('dacperioperatifpra_crespirasi').value;
	var dacperioperatifpra_dnadi     = document.getElementById('dacperioperatifpra_dnadi').value;
	var dacperioperatifpra_nyeria    = document.getElementById('dacperioperatifpra_nyeria').value;
	var dacperioperatifpra_div_nyeria_2=document.getElementById('dacperioperatifpra_div_nyeria_2').value;
	var dacperioperatifpra_epupil1   =document.getElementById('dacperioperatifpra_epupil1').value;
	var dacperioperatifpra_epupil2   =document.getElementById('dacperioperatifpra_epupil2').value;
	var dacperioperatifpra_ftensi1   =document.getElementById('dacperioperatifpra_ftensi1').value;
	var dacperioperatifpra_ftensi2   =document.getElementById('dacperioperatifpra_ftensi2').value;
	var dacperioperatifpra_fpalpasi  =document.getElementById('dacperioperatifpra_fpalpasi').value;
	var dacperioperatifpra_gsuhu     =document.getElementById('dacperioperatifpra_gsuhu').value;
	var dacperioperatifpra_jatuha    =document.getElementById('dacperioperatifpra_jatuha').value;
	var dacperioperatifpra_hspo2     =document.getElementById('dacperioperatifpra_hspo2').value;
	var dacperioperatifpra_ireflek1  =document.getElementById('dacperioperatifpra_ireflek1').value;
	var dacperioperatifpra_ireflek2  =document.getElementById('dacperioperatifpra_ireflek2').value;
	var dacperioperatifpra_jbb       =document.getElementById('dacperioperatifpra_jbb').value;
	var dacperioperatifpra_jtb       =document.getElementById('dacperioperatifpra_jtb').value;
	var dacperioperatifpra_kimt      =document.getElementById('dacperioperatifpra_kimt').value;
	var dacrjasesmenmedis_bgcstotAP  =document.getElementById('dacrjasesmenmedis_bgcstotAP').value;
	var dacperioperatifpra_bemosi    =document.getElementById('dacperioperatifpra_bemosi').value;
	var dacperioperatifpra_bemosiket =document.getElementById('dacperioperatifpra_bemosiket').value;
	var dacperioperatifpra_bvisitdran=document.getElementById('dacperioperatifpra_bvisitdran').value;
	var dacperioperatifpra_bhamil    =document.getElementById('dacperioperatifpra_bhamil').value;
	var dacperioperatifpra_bhamilket =document.getElementById('dacperioperatifpra_bhamilket').value;
	var dacperioperatifpra_bhaid     =document.getElementById('dacperioperatifpra_bhaid').value;
	var dacperioperatifpra_bhaidket  =document.getElementById('dacperioperatifpra_bhaidket').value;
	var dacperioperatifpra_bpremedikasi=document.getElementById('dacperioperatifpra_bpremedikasi').value;
	var dacperioperatifpra_bdosis1     =document.getElementById('dacperioperatifpra_bdosis1').value;
	var dacperioperatifpra_bskriningmrsa =document.getElementById('dacperioperatifpra_bskriningmrsa').value;
	var dacperioperatifpra_bskrininghasil=document.getElementById('dacperioperatifpra_bskrininghasil').value;
	var dacperioperatifpra_cruangcek1    =document.getElementById('dacperioperatifpra_cruangcek1').value;
	var dacperioperatifpra_cruangcek2    =document.getElementById('dacperioperatifpra_cruangcek2').value;
	var dacperioperatifpra_cruangcek3    =document.getElementById('dacperioperatifpra_cruangcek3').value;
	var dacperioperatifpra_cruangcek4    =document.getElementById('dacperioperatifpra_cruangcek4').value;
	var dacperioperatifpra_cruangcek5    =document.getElementById('dacperioperatifpra_cruangcek5').value;
	var dacperioperatifpra_cruangcek6    =document.getElementById('dacperioperatifpra_cruangcek6').value;
	var dacperioperatifpra_cruangcek7    =document.getElementById('dacperioperatifpra_cruangcek7').value;
	var dacperioperatifpra_cruangcek8    =document.getElementById('dacperioperatifpra_cruangcek8').value;
	var dacperioperatifpra_cruangcek9    =document.getElementById('dacperioperatifpra_cruangcek9').value;
	var dacperioperatifpra_cruangcek10   =document.getElementById('dacperioperatifpra_cruangcek10').value;
	var dacperioperatifpra_cruangcek11   =document.getElementById('dacperioperatifpra_cruangcek11').value;
	var dacperioperatifpra_cruangcek12   =document.getElementById('dacperioperatifpra_cruangcek12').value;
	var dacperioperatifpra_cruangcek13   =document.getElementById('dacperioperatifpra_cruangcek13').value;
	var dacperioperatifpra_cruangcek14   =document.getElementById('dacperioperatifpra_cruangcek14').value;
	var dacperioperatifpra_cruangcek15   =document.getElementById('dacperioperatifpra_cruangcek15').value;
	var dacperioperatifpra_cruangcek16   =document.getElementById('dacperioperatifpra_cruangcek16').value;
	var dacperioperatifpra_cokcek1       =document.getElementById('dacperioperatifpra_cokcek1').value;
	var dacperioperatifpra_cokcek2       =document.getElementById('dacperioperatifpra_cokcek2').value;
	var dacperioperatifpra_cokcek3       =document.getElementById('dacperioperatifpra_cokcek3').value;
	var dacperioperatifpra_cokcek4=document.getElementById('dacperioperatifpra_cokcek4').value;
	var dacperioperatifpra_cokcek5=document.getElementById('dacperioperatifpra_cokcek5').value;
	var dacperioperatifpra_cokcek6=document.getElementById('dacperioperatifpra_cokcek6').value;
	var dacperioperatifpra_cokcek7=document.getElementById('dacperioperatifpra_cokcek7').value;
	var dacperioperatifpra_cokcek8=document.getElementById('dacperioperatifpra_cokcek8').value;
	var dacperioperatifpra_cokcek9=document.getElementById('dacperioperatifpra_cokcek9').value;
	var dacperioperatifpra_cokcek10=document.getElementById('dacperioperatifpra_cokcek10').value;
	var dacperioperatifpra_cokcek11=document.getElementById('dacperioperatifpra_cokcek11').value;
	var dacperioperatifpra_cokcek12=document.getElementById('dacperioperatifpra_cokcek12').value;
	var dacperioperatifpra_cokcek13=document.getElementById('dacperioperatifpra_cokcek13').value;
	var dacperioperatifpra_cokcek14=document.getElementById('dacperioperatifpra_cokcek14').value;
	var dacperioperatifpra_cokcek15=document.getElementById('dacperioperatifpra_cokcek15').value;
	var dacperioperatifpra_cokcek16=document.getElementById('dacperioperatifpra_cokcek16').value;
	var dacperioperatifpra_cketcek1=document.getElementById('dacperioperatifpra_cketcek1').value;
	var dacperioperatifpra_cketcek2=document.getElementById('dacperioperatifpra_cketcek2').value;
	var dacperioperatifpra_cketcek3=document.getElementById('dacperioperatifpra_cketcek3').value;
	var dacperioperatifpra_cketcek4=document.getElementById('dacperioperatifpra_cketcek4').value;
	var dacperioperatifpra_cketcek5=document.getElementById('dacperioperatifpra_cketcek5').value;
	var dacperioperatifpra_cketcek6=document.getElementById('dacperioperatifpra_cketcek6').value;
	var dacperioperatifpra_cketcek7=document.getElementById('dacperioperatifpra_cketcek7').value;
	var dacperioperatifpra_cketcek8=document.getElementById('dacperioperatifpra_cketcek8').value;
	var dacperioperatifpra_cketcek9=document.getElementById('dacperioperatifpra_cketcek9').value;
	var dacperioperatifpra_cketcek10=document.getElementById('dacperioperatifpra_cketcek10').value;
	var dacperioperatifpra_cketcek11=document.getElementById('dacperioperatifpra_cketcek11').value;
	var dacperioperatifpra_cketcek12=document.getElementById('dacperioperatifpra_cketcek12').value;
	var dacperioperatifpra_cketcek13=document.getElementById('dacperioperatifpra_cketcek13').value;
	var dacperioperatifpra_cketcek14=document.getElementById('dacperioperatifpra_cketcek14').value;
	var dacperioperatifpra_cketcek15=document.getElementById('dacperioperatifpra_cketcek15').value;
	var dacperioperatifpra_cketcek16=document.getElementById('dacperioperatifpra_cketcek16').value;
	var dacperioperatifpra_asuhan1=document.getElementById('dacperioperatifpra_asuhan1').value;
	var dacperioperatifpra_asuhan2=document.getElementById('dacperioperatifpra_asuhan2').value;
	var dacperioperatifpra_asuhan3=document.getElementById('dacperioperatifpra_asuhan3').value;
	var dacperioperatifpra_asuhan4=document.getElementById('dacperioperatifpra_asuhan4').value;
	var dacperioperatifpra_asuhan5=document.getElementById('dacperioperatifpra_asuhan5').value;
	var dacperioperatifpra_asuhan6=document.getElementById('dacperioperatifpra_asuhan6').value;
	var dacperioperatifpra_asuhan7=document.getElementById('dacperioperatifpra_asuhan7').value;
	var dacperioperatifpra_asuhan8=document.getElementById('dacperioperatifpra_asuhan8').value;
	var dacperioperatifpra_asuhan9=document.getElementById('dacperioperatifpra_asuhan9').value;
	var dacperioperatifpra_asuhan10=document.getElementById('dacperioperatifpra_asuhan10').value;
	var dacperioperatifpra_asuhan11=document.getElementById('dacperioperatifpra_asuhan11').value;
	var dacperioperatifpra_asuhan12=document.getElementById('dacperioperatifpra_asuhan12').value;
	var dacperioperatifpra_asuhan13=document.getElementById('dacperioperatifpra_asuhan13').value;
	var dacperioperatifpra_asuhan14=document.getElementById('dacperioperatifpra_asuhan14').value;
	var dacperioperatifpra_asuhan15=document.getElementById('dacperioperatifpra_asuhan15').value;
	var dacperioperatifpra_asuhan16=document.getElementById('dacperioperatifpra_asuhan16').value;
	var dacperioperatifpra_asuhan17=document.getElementById('dacperioperatifpra_asuhan17').value;
	var dacperioperatifpra_asuhan18=document.getElementById('dacperioperatifpra_asuhan18').value;
	var dacperioperatifpra_asuhan19=document.getElementById('dacperioperatifpra_asuhan19').value;
	var dacperioperatifpra_asuhan20=document.getElementById('dacperioperatifpra_asuhan20').value;
}

function refresh_listpasermirna_operasi() {
	$('#preoperasi_loadingawal').hide();
}

// function viewFormPriope(no_rm,unit,id_kunjungan,id_unit,nama,transaksi,tgl_lahir,alamat,id_pegawai,jnskelamin,nama_kamar,penjamin,jam_masuk, nama_dokter){
// 	$('#Divcardlistpasermirna_operasi').hide();
// 	$('#DivPreoperasi').show();	
// }

function showdetailasuhanPerioperatif(no_rm,unit,id_kunjungan,id_unit,nama,transaksi,tgl_lahir,alamat,id_pegawai,jnskelamin,nama_kamar,penjamin,jam_masuk, nama_dokter){
	$('#Divcardlistpasermirna_operasi').hide();
	$('#DivPreoperasi').show();	

	viewdetail1(id_kunjungan);
	viewdetail2(id_kunjungan);
	viewdetail3(id_kunjungan);
}

function saveKeadaanPas(){
	if($('input[name=dacperioperatifpra_jatuha]:checked').val()==1){
		nyer=1;
	}else{
		nyer='2,'+$('#dacperioperatifpra_nyeria2').val();
	}

	var params={
		id_kunjungan		:$('#idKunjunganermirna').val(),
		keadaan_umum		:$('#dacperioperatifpra_akeadaan').val(),
		respirasi			:$('#dacperioperatifpra_crespirasi').val(),
		nadi				:$('#dacperioperatifpra_dnadi').val(),
		spo2				:$('#dacperioperatifpra_hspo2').val(),
		pupil_kiri			:$('#dacperioperatifpra_epupil1').val(),
		tekanan_darah1		:$('#dacperioperatifpra_ftensi1').val(),
		suhu				:$('#dacperioperatifpra_gsuhu').val(),
		cahaya_kiri			:$('#dacperioperatifpra_ireflek1').val(),
		bb					:$('#dacperioperatifpra_jbb').val(),
		tinggi				:$('#dacperioperatifpra_jtb').val(),
		imt					:$('#dacperioperatifpra_kimt').val(),	
		pupil_kanan			:$('#dacperioperatifpra_epupil2').val(),
		cahaya_kanan		:$('#dacperioperatifpra_ireflek2').val(),
		tekanan_darah2		:$('#dacperioperatifpra_ftensi2').val(),
		palpasi				:$('#dacperioperatifpra_fpalpasi').val(),
		skor_kesadaran		:$('#dacrjasesmenmedis_bgcstotAP').val(),
		tipe_kesadaran		:$('#dacrjasesmenmedis_bgcstypeAP').val(),
		jatuh				:$('input[name=dacperioperatifpra_jatuha]:checked').val(),
		nyeri				:nyer,
		diagnosa 			:$('#dacperioperatifpra_bdiagnosa').val(),
		tindakan 			:$('#dacperioperatifpra_btindakan').val(),
		tgl_operasi 		:$('#dacperioperatifpra_atgl').val(),
		kasus 				:$('input[name=dacperioperatifpra_btrauma]:checked').val(),
		dokter_op 			:$('#dacperioperatifpra_bdokop').val(),
		dokter_anas 		:$('#dacperioperatifpra_bdokanas').val(),

	}; 
	apiPOST('Rekammedisirna/saveKeadaanPas', params,hasil=>{

	});
	// console.log(params);
}
function saveStatusPas(){
	var params={
		id_kunjungan:$('#idKunjunganermirna').val(),
		identifikasi_ruang:$('input[name=dacperioperatifpra_cruangcek1]:checked').val(),
		identifikasi_terima:$('input[name=dacperioperatifpra_cokcek1]:checked').val(),
		identifikasi_ket:$('#dacperioperatifpra_cketcek1').val(),
		operasi_ruang:$('input[name=dacperioperatifpra_cruangcek2]:checked').val(),
		operasi_terima:$('input[name=dacperioperatifpra_cokcek2]:checked').val(),
		operasi_ket:$('#dacperioperatifpra_cketcek2').val(),
		anestesi_ruang:$('input[name=dacperioperatifpra_cruangcek3]:checked').val(),
		anestesi_terima:$('input[name=dacperioperatifpra_cokcek3]:checked').val(),
		anestesi_ket:$('#dacperioperatifpra_cketcek3').val(),
		puasa_ruang:$('input[name=dacperioperatifpra_cruangcek4]:checked').val(),
		puasa_terima:$('input[name=dacperioperatifpra_cokcek4]:checked').val(),
		puasa_ket:$('#dacperioperatifpra_cketcek4').val(),
		hasil_lab_ruang:$('input[name=dacperioperatifpra_cruangcek5]:checked').val(),
		hasil_lab_terima:$('input[name=dacperioperatifpra_cokcek5]:checked').val(),
		hasil_lab_ket:$('#dacperioperatifpra_cketcek5').val(),
		hasil_rad_ruang:$('input[name=dacperioperatifpra_cruangcek6]:checked').val(),
		hasil_rad_terima:$('input[name=dacperioperatifpra_cokcek6]:checked').val(),
		hasil_rad_ket:$('#dacperioperatifpra_cketcek6').val(),
		darah_ruang:$('input[name=dacperioperatifpra_cruangcek7]:checked').val(),
		darah_terima:$('input[name=dacperioperatifpra_cokcek7]:checked').val(),
		darah_ket:$('#dacperioperatifpra_cketcek7').val(),
		protesa_luar_ruang:$('input[name=dacperioperatifpra_cruangcek8]:checked').val(),
		protesa_luar_terima:$('input[name=dacperioperatifpra_cokcek8]:checked').val(),
		protesa_luar_ket:$('#dacperioperatifpra_cketcek8').val(),
		protesa_dalam_ruang:$('input[name=dacperioperatifpra_cruangcek9]:checked').val(),
		protesa_dalam_terima:$('input[name=dacperioperatifpra_cokcek9]:checked').val(),
		protesa_dalam_ket:$('#dacperioperatifpra_cketcek9').val(),
		mandi_sabun_ruang:$('input[name=dacperioperatifpra_cruangcek11]:checked').val(),
		mandi_sabun_terima:$('input[name=dacperioperatifpra_cokcek11]:checked').val(),
		mandi_sabun_ket:$('#dacperioperatifpra_cketcek11').val(),
		cukur_ruang:$('input[name=dacperioperatifpra_cruangcek12]:checked').val(),
		cukur_terima:$('input[name=dacperioperatifpra_cokcek12]:checked').val(),
		cukur_ket:$('#dacperioperatifpra_cketcek12').val(),
		pencernaan_ruang:$('input[name=dacperioperatifpra_cruangcek13]:checked').val(),
		pencernaan_terima:$('input[name=dacperioperatifpra_cokcek13]:checked').val(),
		pencernaan_ket:$('#dacperioperatifpra_cketcek13').val(),
		baju_ruang:$('input[name=dacperioperatifpra_cruangcek14]:checked').val(),
		baju_terima:$('input[name=dacperioperatifpra_cokcek14]:checked').val(),
		baju_ket:$('#dacperioperatifpra_cketcek14').val(),
		kateter_ruang:$('input[name=dacperioperatifpra_cruangcek15]:checked').val(),
		kateter_terima:$('input[name=dacperioperatifpra_cokcek15]:checked').val(),
		kateter_ket:$('#dacperioperatifpra_cketcek15').val(),
		infus_ruang:$('input[name=dacperioperatifpra_cruangcek16]:checked').val(),
		infus_terima:$('input[name=dacperioperatifpra_cokcek16]:checked').val(),
		infus_ket:$('#dacperioperatifpra_cketcek16').val()
	};
	apiPOST('Rekammedisirna/saveStatusPas', params,hasil=>{

	});
	// console.log(params);
}

function savePraOperasi(){
	if($('#dacperioperatifpra_asuhan8_1').checked){
		var kolab=1;
	}else{
		var kolab=0;
	}
	if($('#dacperioperatifpra_asuhan16_1').checked){
		var edu_kolab=1;
	}else{
		var edu_kolab=0;
	}
	if($('#dacperioperatifpra_asuhan15').checked){
		var edu_link=1;
	}else{
		var edu_link=0;
	}
	if ($('input[name=dacperioperatifpra_asuhan17]:checked').length > 0) {
		var hipotermia=$('input[name=dacperioperatifpra_asuhan17]:checked').val();
	}else{
		var hipotermia=0;
	}
	if ($('input[name=dacperioperatifpra_asuhan1]:checked').length > 0) {
		var hub_ansietas=$('input[name=dacperioperatifpra_asuhan1]:checked').val();
	}else{
		var hub_ansietas=0;
	}
	if ($('input[name=dacperioperatifpra_asuhan2]:checked').length > 0) {
		var bukti_ansietas=$('input[name=dacperioperatifpra_asuhan2]:checked').val();
	}else{
		var bukti_ansietas=0;
	}
	if ($('input[name=dacperioperatifpra_asuhan3]:checked').length > 0) {
		var ansietas_intervensi=$('input[name=dacperioperatifpra_asuhan3]:checked').val();
	}else{
		var ansietas_intervensi=0;
	}
	if ($('input[name=dacperioperatifpra_asuhan4]:checked').length > 0) {
		var hasil_ansietas=$('input[name=dacperioperatifpra_asuhan4]:checked').val();
	}else{
		var hasil_ansietas=0;
	}
	if ($('input[name=dacperioperatifpra_asuhan5]:checked').length > 0) {
		var observasi_ansietas=$('input[name=dacperioperatifpra_asuhan5]:checked').val();
	}else{
		var observasi_ansietas=0;
	}
	if ($('input[name=dacperioperatifpra_asuhan6]:checked').length > 0) {
		var terapeutik_ansietas=$('input[name=dacperioperatifpra_asuhan6]:checked').val();
	}else{
		var terapeutik_ansietas=0;
	}
	if ($('input[name=dacperioperatifpra_asuhan7]:checked').length > 0) {
		var edukasi_ansietas=$('input[name=dacperioperatifpra_asuhan7]:checked').val();
	}else{
		var edukasi_ansietas=0;
	}
	if ($('input[name=dacperioperatifpra_asuhan9]:checked').length > 0) {
		var hub_pengetahuan=$('input[name=dacperioperatifpra_asuhan9]:checked').val();
	}else{
		var hub_pengetahuan=0;
	}
	if ($('input[name=dacperioperatifpra_asuhan10]:checked').length > 0) {
		var bukti_pengetahuan=$('input[name=dacperioperatifpra_asuhan10]:checked').val();
	}else{
		var bukti_pengetahuan=0;
	}
	if ($('input[name=dacperioperatifpra_asuhan12]:checked').length > 0) {
		var hasil_pengetahuan=$('input[name=dacperioperatifpra_asuhan12]:checked').val();
	}else{
		var hasil_pengetahuan=0;
	}
	if ($('input[name=dacperioperatifpra_asuhan13]:checked').length > 0) {
		var observasi_ilmu=$('input[name=dacperioperatifpra_asuhan13]:checked').val();
	}else{
		var observasi_ilmu=0;
	}
	if ($('input[name=dacperioperatifpra_asuhan14]:checked').length > 0) {
		var terapeutik_ilmu=$('input[name=dacperioperatifpra_asuhan14]:checked').val();
	}else{
		var terapeutik_ilmu=0;
	}
	if ($('input[name=dacperioperatifpra_asuhan19]:checked').length > 0) {
		var hasil_hipo=$('input[name=dacperioperatifpra_asuhan19]:checked').val();
	}else{
		var hasil_hipo=0;
	}
	if ($('input[name=dacperioperatifpra_asuhan20]:checked').length > 0) {
		var observasi_hipo=$('input[name=dacperioperatifpra_asuhan20]:checked').val();
	}else{
		var observasi_hipo=0;
	}
	if ($('input[name=dacperioperatifpra_asuhan21]:checked').length > 0) {
		var terapeutik_hipo=$('input[name=dacperioperatifpra_asuhan21]:checked').val();
	}else{
		var terapeutik_hipo=0;
	}
	if($('input[name=dacperioperatifpra_jatuha]:checked').val()==1){
		var nyer=1;
	}else{
		var nyer='2,'+$('#dacperioperatifpra_nyeria2').val();
	}
	nama_obat='';
	dosis='';
	jam='';
	skrining='';
	anestesi='';
	if($('input[name=dacperioperatifpra_bemosi]:checked').val()==4){
		emo=$('#dacperioperatifpra_bemosiket').val();
	}else{
		emo=$('input[name=dacperioperatifpra_bemosi]:checked').val();
	};
	if($('input[name=dacperioperatifpra_bhamil]:checked').val()==2){
		hmil='2,'+$('#dacperioperatifpra_bhamilket').val();
	}else{
		hmil=$('input[name=dacperioperatifpra_bhamil]:checked').val();
	}
	if($('input[name=dacperioperatifpra_bhaid]:checked').val()==2){
		hid='2,'+$('#dacperioperatifpra_bhaidket').val();
	}else{
		hid=$('input[name=dacperioperatifpra_bhaid]:checked').val();
	}
	if($('input[name=dacperioperatifpra_bskriningmrsa]:checked').val()==2){
		skrining='2,'+$('input[name=dacperioperatifpra_bskrininghasil]:checked').val()
	}else{
		skrining=$('input[name=dacperioperatifpra_bskriningmrsa]:checked').val();
	}
	if($('input[name=dacperioperatifpra_bpremedikasi]:checked').val()==2){
		if($('input[name=dacperioperatifpra_bpremedikasipilihlist]:checked').val()==1){
			premedikasi=2;
			nama_obat=$('#dacperioperatifpra_bpremedikasipilihlistket1').val();
			dosis=$('#dacperioperatifpra_bdosis1').val();
			jam=$('#dacperioperatifpra_bdosisijam1').val();
		}else{
			premedikasi=3;
			nama_obat=$('#dacperioperatifpra_bpremedikasipilihlistket2').val();
			dosis=$('#dacperioperatifpra_bdosis2').val();
			jam=$('#dacperioperatifpra_bdosisijam2').val();
		}
	}else{
		premedikasi=$('input[name=dacperioperatifpra_bpremedikasi]:checked').val();
	}

	var params={
		id_kunjungan 		:$('#idKunjunganermirna').val(),
		hub_ansietas 		:hub_ansietas,
		bukti_ansietas		:bukti_ansietas,
		ansietas_intervensi	:ansietas_intervensi,
		hasil_ansietas		:hasil_ansietas,
		observasi_ansietas	:observasi_ansietas,
		terapeutik_ansietas	:terapeutik_ansietas,
		edukasi_ansietas	:edukasi_ansietas,
		kolab_ansietas		:kolab,
		hub_pengetahuan		:hub_pengetahuan,
		bukti_pengetahuan	:bukti_pengetahuan,
		pengetahuan_intervensi:$('#dacperioperatifpra_asuhan11').val(),
		hasil_pengetahuan	:hasil_pengetahuan,
		observasi_ilmu		:observasi_ilmu,
		terapeutik_ilmu		:terapeutik_ilmu,
		edukasi_ilmu		:edu_link,
		kolab_ilmu			:edu_kolab,
		hipotermia			:hipotermia,
		hipo_intervensi		:$('#dacperioperatifpra_asuhan18').val(),
		hasil_hipo 			:hasil_hipo,
		observasi_hipo		:observasi_hipo,
		terapeutik_hipo		:terapeutik_hipo,
		identifikasi_ruang  :$('input[name=dacperioperatifpra_cruangcek1]:checked').val(),
		identifikasi_terima :$('input[name=dacperioperatifpra_cokcek1]:checked').val(),
		identifikasi_ket 	:$('#dacperioperatifpra_cketcek1').val(),
		operasi_ruang 		:$('input[name=dacperioperatifpra_cruangcek2]:checked').val(),
		operasi_terima 		:$('input[name=dacperioperatifpra_cokcek2]:checked').val(),
		operasi_ket  		:$('#dacperioperatifpra_cketcek2').val(),
		anestesi_ruang 		:$('input[name=dacperioperatifpra_cruangcek3]:checked').val(),
		anestesi_terima  	:$('input[name=dacperioperatifpra_cokcek3]:checked').val(),
		anestesi_ket 		:$('#dacperioperatifpra_cketcek3').val(),
		puasa_ruang 		:$('input[name=dacperioperatifpra_cruangcek4]:checked').val(),
		puasa_terima  		:$('input[name=dacperioperatifpra_cokcek4]:checked').val(),
		puasa_ket  			:$('#dacperioperatifpra_cketcek4').val(),
		hasil_lab_ruang     :$('input[name=dacperioperatifpra_cruangcek5]:checked').val(),
		hasil_lab_terima    :$('input[name=dacperioperatifpra_cokcek5]:checked').val(),
		hasil_lab_ket       :$('#dacperioperatifpra_cketcek5').val(),
		hasil_rad_ruang     :$('input[name=dacperioperatifpra_cruangcek6]:checked').val(),
		hasil_rad_terima    :$('input[name=dacperioperatifpra_cokcek6]:checked').val(),
		hasil_rad_ket 		:$('#dacperioperatifpra_cketcek6').val(),
		darah_ruang 		:$('input[name=dacperioperatifpra_cruangcek7]:checked').val(),
		darah_terima 		:$('input[name=dacperioperatifpra_cokcek7]:checked').val(),
		darah_ket 			:$('#dacperioperatifpra_cketcek7').val(),
		protesa_luar_ruang  :$('input[name=dacperioperatifpra_cruangcek8]:checked').val(),
		protesa_luar_terima :$('input[name=dacperioperatifpra_cokcek8]:checked').val(),
		protesa_luar_ket 	:$('#dacperioperatifpra_cketcek8').val(),
		protesa_dalam_ruang :$('input[name=dacperioperatifpra_cruangcek9]:checked').val(),
		protesa_dalam_terima:$('input[name=dacperioperatifpra_cokcek9]:checked').val(),
		protesa_dalam_ket 	:$('#dacperioperatifpra_cketcek9').val(),
		mandi_sabun_ruang 	:$('input[name=dacperioperatifpra_cruangcek11]:checked').val(),
		mandi_sabun_terima 	:$('input[name=dacperioperatifpra_cokcek11]:checked').val(),
		mandi_sabun_ket 	:$('#dacperioperatifpra_cketcek11').val(),
		cukur_ruang 		:$('input[name=dacperioperatifpra_cruangcek12]:checked').val(),
		cukur_terima 		:$('input[name=dacperioperatifpra_cokcek12]:checked').val(),
		cukur_ket 			:$('#dacperioperatifpra_cketcek12').val(),
		pencernaan_ruang 	:$('input[name=dacperioperatifpra_cruangcek13]:checked').val(),
		pencernaan_terima 	:$('input[name=dacperioperatifpra_cokcek13]:checked').val(),
		pencernaan_ket 		:$('#dacperioperatifpra_cketcek13').val(),
		baju_ruang 			:$('input[name=dacperioperatifpra_cruangcek14]:checked').val(),
		baju_terima 		:$('input[name=dacperioperatifpra_cokcek14]:checked').val(),
		baju_ket 			:$('#dacperioperatifpra_cketcek14').val(),
		kateter_ruang 		:$('input[name=dacperioperatifpra_cruangcek15]:checked').val(),
		kateter_terima 		:$('input[name=dacperioperatifpra_cokcek15]:checked').val(),
		kateter_ket 		:$('#dacperioperatifpra_cketcek15').val(),
		infus_ruang 		:$('input[name=dacperioperatifpra_cruangcek16]:checked').val(),
		infus_terima 		:$('input[name=dacperioperatifpra_cokcek16]:checked').val(),
		infus_ket 			:$('#dacperioperatifpra_cketcek16').val(),
		keadaan_umum		:$('#dacperioperatifpra_akeadaan').val(),
		respirasi			:$('#dacperioperatifpra_crespirasi').val(),
		nadi				:$('#dacperioperatifpra_dnadi').val(),
		spo2				:$('#dacperioperatifpra_hspo2').val(),
		pupil_kiri			:$('#dacperioperatifpra_epupil1').val(),
		tekanan_darah1		:$('#dacperioperatifpra_ftensi1').val(),
		suhu				:$('#dacperioperatifpra_gsuhu').val(),
		cahaya_kiri			:$('#dacperioperatifpra_ireflek1').val(),
		bb					:$('#dacperioperatifpra_jbb').val(),
		tinggi				:$('#dacperioperatifpra_jtb').val(),
		imt					:$('#dacperioperatifpra_kimt').val(),	
		pupil_kanan			:$('#dacperioperatifpra_epupil2').val(),
		cahaya_kanan		:$('#dacperioperatifpra_ireflek2').val(),
		tekanan_darah2		:$('#dacperioperatifpra_ftensi2').val(),
		palpasi				:$('#dacperioperatifpra_fpalpasi').val(),
		skor_kesadaran		:$('#dacrjasesmenmedis_bgcstotAP').val(),
		tipe_kesadaran		:$('#dacrjasesmenmedis_bgcstypeAP').val(),
		jatuh				:$('input[name=dacperioperatifpra_jatuha]:checked').val(),
		nyeri				:nyer,
		diagnosa 			:$('#dacperioperatifpra_bdiagnosa').val(),
		tindakan 			:$('#dacperioperatifpra_btindakan').val(),
		tgl_operasi 		:$('#dacperioperatifpra_atgl').val(),
		kasus 				:$('input[name=dacperioperatifpra_btrauma]:checked').val(),
		dokter_op 			:$('#dacperioperatifpra_bdokop').val(),
		dokter_anas 		:$('#dacperioperatifpra_bdokanas').val(),
		operasi  			:$('input[name=dacperioperatifpra_bvisitdrop]:checked').val(),
		anestesi  			:$('input[name=dacperioperatifpra_bvisitdran]:checked').val(),
		emosi  				:emo,
		hamil   			:hmil,
		haid  				:hid,
		premedikasi  		:premedikasi,
		nama_obat  			:nama_obat,
		dosis   			:dosis,
		jam   				:jam,
		mrsa  	 			:skrining

	};
	apiPOST('Rekammedisirna/savePraoperasi', params,hasil=>{

	});
	// console.log(params);
}


function savePraOperasites() {
	if ($('input[name=dacperioperatifpra_asuhan17]:checked').length > 0) {
		var hipotermia=$('input[name=dacperioperatifpra_asuhan17]:checked').val();
	}else{
		var hipotermia=0;
	}
	console.log(hipotermia);
}

function savePraOperasitry(){
	if($('#dacperioperatifpra_asuhan8_1').checked){
		var kolab=1;
	}else{
		var kolab=0;
	}
	if($('#dacperioperatifpra_asuhan16_1').checked){
		var edu_kolab=1;
	}else{
		var edu_kolab=0;
	}
	if($('#dacperioperatifpra_asuhan15').checked){
		var edu_link=1;
	}else{
		var edu_link=0;
	}
	if ($('input[name=dacperioperatifpra_asuhan17]:checked').length > 0) {
		var hipotermia=$('input[name=dacperioperatifpra_asuhan17]:checked').val();
	}else{
		var hipotermia=0;
	}
	if ($('input[name=dacperioperatifpra_asuhan1]:checked').length > 0) {
		var hub_ansietas=$('input[name=dacperioperatifpra_asuhan1]:checked').val();
	}else{
		var hub_ansietas=0;
	}
	if ($('input[name=dacperioperatifpra_asuhan2]:checked').length > 0) {
		var bukti_ansietas=$('input[name=dacperioperatifpra_asuhan2]:checked').val();
	}else{
		var bukti_ansietas=0;
	}
	if ($('input[name=dacperioperatifpra_asuhan3]:checked').length > 0) {
		var ansietas_intervensi=$('input[name=dacperioperatifpra_asuhan3]:checked').val();
	}else{
		var ansietas_intervensi=0;
	}
	if ($('input[name=dacperioperatifpra_asuhan4]:checked').length > 0) {
		var hasil_ansietas=$('input[name=dacperioperatifpra_asuhan4]:checked').val();
	}else{
		var hasil_ansietas=0;
	}
	if ($('input[name=dacperioperatifpra_asuhan5]:checked').length > 0) {
		var observasi_ansietas=$('input[name=dacperioperatifpra_asuhan5]:checked').val();
	}else{
		var observasi_ansietas=0;
	}
	if ($('input[name=dacperioperatifpra_asuhan6]:checked').length > 0) {
		var terapeutik_ansietas=$('input[name=dacperioperatifpra_asuhan6]:checked').val();
	}else{
		var terapeutik_ansietas=0;
	}
	if ($('input[name=dacperioperatifpra_asuhan7]:checked').length > 0) {
		var edukasi_ansietas=$('input[name=dacperioperatifpra_asuhan7]:checked').val();
	}else{
		var edukasi_ansietas=0;
	}
	if ($('input[name=dacperioperatifpra_asuhan9]:checked').length > 0) {
		var hub_pengetahuan=$('input[name=dacperioperatifpra_asuhan9]:checked').val();
	}else{
		var hub_pengetahuan=0;
	}
	if ($('input[name=dacperioperatifpra_asuhan10]:checked').length > 0) {
		var bukti_pengetahuan=$('input[name=dacperioperatifpra_asuhan10]:checked').val();
	}else{
		var bukti_pengetahuan=0;
	}
	if ($('input[name=dacperioperatifpra_asuhan12]:checked').length > 0) {
		var hasil_pengetahuan=$('input[name=dacperioperatifpra_asuhan12]:checked').val();
	}else{
		var hasil_pengetahuan=0;
	}
	if ($('input[name=dacperioperatifpra_asuhan13]:checked').length > 0) {
		var observasi_ilmu=$('input[name=dacperioperatifpra_asuhan13]:checked').val();
	}else{
		var observasi_ilmu=0;
	}
	if ($('input[name=dacperioperatifpra_asuhan14]:checked').length > 0) {
		var terapeutik_ilmu=$('input[name=dacperioperatifpra_asuhan14]:checked').val();
	}else{
		var terapeutik_ilmu=0;
	}
	if ($('input[name=dacperioperatifpra_asuhan19]:checked').length > 0) {
		var hasil_hipo=$('input[name=dacperioperatifpra_asuhan19]:checked').val();
	}else{
		var hasil_hipo=0;
	}
	if ($('input[name=dacperioperatifpra_asuhan20]:checked').length > 0) {
		var observasi_hipo=$('input[name=dacperioperatifpra_asuhan20]:checked').val();
	}else{
		var observasi_hipo=0;
	}
	if ($('input[name=dacperioperatifpra_asuhan21]:checked').length > 0) {
		var terapeutik_hipo=$('input[name=dacperioperatifpra_asuhan21]:checked').val();
	}else{
		var terapeutik_hipo=0;
	}



	var params={
		id_kunjungan:$('#idKunjunganermirna').val(),
		hub_ansietas 		:hub_ansietas,
		bukti_ansietas		:bukti_ansietas,
		ansietas_intervensi	:ansietas_intervensi,
		hasil_ansietas		:hasil_ansietas,
		observasi_ansietas	:observasi_ansietas,
		terapeutik_ansietas	:terapeutik_ansietas,
		edukasi_ansietas	:edukasi_ansietas,
		kolab_ansietas		:kolab,
		hub_pengetahuan		:hub_pengetahuan,
		bukti_pengetahuan	:bukti_pengetahuan,
		pengetahuan_intervensi:$('#dacperioperatifpra_asuhan11').val(),
		hasil_pengetahuan	:hasil_pengetahuan,
		observasi_ilmu		:observasi_ilmu,
		terapeutik_ilmu		:terapeutik_ilmu,
		edukasi_ilmu		:edu_link,
		kolab_ilmu			:edu_kolab,
		hipotermia			:hipotermia,
		hipo_intervensi		:$('#dacperioperatifpra_asuhan18').val(),
		hasil_hipo 			:hasil_hipo,
		observasi_hipo		:observasi_hipo,
		terapeutik_hipo		:terapeutik_hipo
	};
	apiPOST('Rekammedisirna/savePraoperasi', params,hasil=>{

	});
	// console.log(params);
}

function saveKeadaanPas2(){	
	nama_obat='';
	dosis='';
	jam='';
	skrining='';
	anestesi='';
	if($('input[name=dacperioperatifpra_bemosi]:checked').val()==4){
		emo=$('#dacperioperatifpra_bemosiket').val();
	}else{
		emo=$('input[name=dacperioperatifpra_bemosi]:checked').val();
	};
	if($('input[name=dacperioperatifpra_bhamil]:checked').val()==2){
		hmil='2,'+$('#dacperioperatifpra_bhamilket').val();
	}else{
		hmil=$('input[name=dacperioperatifpra_bhamil]:checked').val();
	}
	if($('input[name=dacperioperatifpra_bhaid]:checked').val()==2){
		hid='2,'+$('#dacperioperatifpra_bhaidket').val();
	}else{
		hid=$('input[name=dacperioperatifpra_bhaid]:checked').val();
	}
	if($('input[name=dacperioperatifpra_bskriningmrsa]:checked').val()==2){
		skrining='2,'+$('input[name=dacperioperatifpra_bskrininghasil]:checked').val()
	}else{
		skrining=$('input[name=dacperioperatifpra_bskriningmrsa]:checked').val();
	}
	if($('input[name=dacperioperatifpra_bpremedikasi]:checked').val()==2){
		if($('input[name=dacperioperatifpra_bpremedikasipilihlist]:checked').val()==1){
			premedikasi=2;
			nama_obat=$('#dacperioperatifpra_bpremedikasipilihlistket1').val();
			dosis=$('#dacperioperatifpra_bdosis1').val();
			jam=$('#dacperioperatifpra_bdosisijam1').val();
		}else{
			premedikasi=3;
			nama_obat=$('#dacperioperatifpra_bpremedikasipilihlistket2').val();
			dosis=$('#dacperioperatifpra_bdosis2').val();
			jam=$('#dacperioperatifpra_bdosisijam2').val();
		}
	}else{
		premedikasi=$('input[name=dacperioperatifpra_bpremedikasi]:checked').val();
	} 
	var params={
		id_kunjungan:			$('#idKunjunganermirna').val(),
		operasi:				$('input[name=dacperioperatifpra_bvisitdrop]:checked').val(),
		anestesi:				$('input[name=dacperioperatifpra_bvisitdran]:checked').val(),
		emosi: 					emo,
		hamil:					hmil,
		haid:					hid,
		premedikasi:			premedikasi,
		nama_obat:				nama_obat,
		dosis:					dosis,
		jam:					jam,
		mrsa:					skrining
	};
	apiPOST('Rekammedisirna/saveKeadaanPas2', params,hasil=>{

	});
	// console.log(params);
}

function saveDocIntraOperasi(){
	var params={
		id_kunjungan:$('#idKunjunganermirna').val(),
		tempat:$('input[name=dacperioperatifpra_tempatok]:checked').val(),
		mulai:$('#dacperioperatifpra_atglmulaiop').val(),
		selesai:$('#dacperioperatifpra_atglselesaiop').val()
	};
	apiPOST('Rekammedisirna/saveDocIntraOperasi', params,hasil=>{

	});
	// console.log(params);
}

function saveKeadaanPas3(){
	if($('input[name=dacperioperatifpra_sadar]:checked').val()==3){
		sdar=$('#dacperioperatifpra_sadarket').val();
	}else{
		sdar=$('input[name=dacperioperatifpra_sadar]:checked').val();
	};
	if($('input[name=dacperioperatifpra_emosi]:checked').val()==3){
		emo=$('#dacperioperatifpra_emosiket').val();
	}else{
		emo=$('input[name=dacperioperatifpra_emosi]:checked').val();
	};
	if($('input[name=dacperioperatifpra_jenisop]:checked').val()==5){
		jns_ope=$('#dacperioperatifpra_jenisopket').val();
	}else{
		jns_ope=$('input[name=dacperioperatifpra_jenisop]:checked').val();
	};
	if($('input[name=dacperioperatifpra_canul]:checked').val()==6){
		canul=$('#dacperioperatifpra_canulket').val();
	}else{
		canul=$('input[name=dacperioperatifpra_canul]:checked').val();
	};
	if($('input[name=dacperioperatifpra_posisiop]:checked').val()==6){
		ope=$('#dacperioperatifpra_posisiopket').val();
	}else{
		ope=$('input[name=dacperioperatifpra_posisiop]:checked').val();
	};
	if($('input[name=dacperioperatifpra_lengan]:checked').val()==3){
		lngan=$('#dacperioperatifpra_lenganket').val();
	}else{
		lngan=$('input[name=dacperioperatifpra_lengan]:checked').val();
	};
	if($('input[name=dacperioperatifpra_urincat]:checked').val()==2){
		cat=$('input[name=dacperioperatifpra_urinpasang]:checked').val()+','+$('#dacperioperatifpra_petugascatket').val();
	}else{
		cat=$('input[name=dacperioperatifpra_lengan]:checked').val();
	};
	if($('input[name=dacperioperatifpra_diatermiyesno]:checked').val()==2){
		termi=$('input[name=dacperioperatifpra_diatermiyesno]:checked').val()+','+$('input[name=dacperioperatifpra_diatermi]:checked').val();
	}else{
		termi=$('input[name=dacperioperatifpra_lengan]:checked').val();
	};
	if($('input[name=dacperioperatifpra_touryesno]:checked').val()==2){
		torni=$('input[name=dacperioperatifpra_tour]:checked').val()+','+$('#dacperioperatifpra_jamtour1').val()+','+$('#dacperioperatifpra_jamtour2').val();
	}else{
		torni=0;
	};
	if($('input[name=dacperioperatifpra_implant]:checked').val()==2){
		mplan='2,'+$('#dacperioperatifpra_implantjenis').val()+','+$('#dacperioperatifpra_implantlokasi').val();
	}else{
		mplan=$('input[name=dacperioperatifpra_implant]:checked').val();
	};
	if($('input[name=dacperioperatifpra_drain]:checked').val()==2){
		drn=$('#dacperioperatifpra_drainjenis').val()+','+$('#dacperioperatifpra_drainlokasi').val();
	}else{
		drn=$('input[name=dacperioperatifpra_drain]:checked').val();
	};
	if($('input[name=dacperioperatifpra_irigasiyesno]:checked').val()==2){
		if($('input[name=dacperioperatifpra_irigasi]:checked').val()==4){
			lka=$('input[name=dacperioperatifpra_irigasiyesno]:checked').val()+','+$('#dacperioperatifpra_irigasiket').val();
		}else{
			lka=$('input[name=dacperioperatifpra_irigasiyesno]:checked').val()+','+$('input[name=dacperioperatifpra_irigasi]:checked').val();
		}
	}else{
		lka=$('input[name=dacperioperatifpra_irigasiyesno]:checked').val();
	};
	if($('input[name=dacperioperatifpra_tampon]:checked').val()==2){
		tmpon=$('#dacperioperatifpra_tamponlokasi').val()+','+$('#dacperioperatifpra_tamponjumlah').val();
	}else{
		tmpon=$('input[name=dacperioperatifpra_tampon]:checked').val();
	};
	if($('input[name=dacperioperatifpra_antibiotik]:checked').val()==2){
		antibio=$('#dacperioperatifpra_antibiotikjenis').val()+','+$('#dacperioperatifpra_antibiotikdosis').val()+','+$('#dacperioperatifpra_jamantibiotik').val();
	}else{
		antibio=$('input[name=dacperioperatifpra_antibiotik]:checked').val();
	};
	if($('input[name=dacperioperatifpra_spesimenyesno]:checked').val()==2){
		spesi_jar='2,'+$('input[name=dacperioperatifpra_spesimen]:checked').val()+','+$('#dacperioperatifpra_spesimenket').val();
	}else{
		spesi_jar=$('input[name=dacperioperatifpra_spesimenyesno]:checked').val();
	};
	
	var params={
		id_kunjungan:$('#idKunjunganermirna').val(),
		sadar:sdar,
		emosi:emo,
		tindakan:$('input[name=dacperioperatifpra_tindakan]:checked').val(),
		jns_tindakan:$('#dacperioperatifpra_tindakanket').val(),
		tipe:$('input[name=dacperioperatifpra_tipeop]:checked').val(),
		jenis_bius:$('input[name=dacperioperatifpra_bius]:checked').val(),
		jenis_operasi:jns_ope,
		canul_intravera:canul,
		operasi:ope,
		lengan:lngan,
		cateter:cat,
		desinfektan:$('input[name=dacperioperatifpra_desinfektan]:checked').val(),
		insisi:$('input[name=dacperioperatifpra_insisijml]:checked').val()+','+$('input[name=dacperioperatifpra_insisijns]:checked').val(),
		diatermi:termi,
		normal_elektrode:$('input[name=dacperioperatifpra_netral]:checked').val(),
		torniquet:torni,
		implan:mplan,
		drain:drn,
		luka:lka,
		tampon:tmpon,
		antibiotik:antibio,
		infus_input1:$('#dacperioperatifpra_input1').val(),
		infus_input_jml1:$('#dacperioperatifpra_jmlinput1').val(),
		infus_output1:$('#dacperioperatifpra_output1').val(),
		infus_output_jml1:$('#dacperioperatifpra_jmloutput1').val(),
		infus_input2:$('#dacperioperatifpra_input2').val(),
		infus_input_jml2:$('#dacperioperatifpra_jmlinput2').val(),
		infus_output2:$('#dacperioperatifpra_output2').val(),
		infus_output_jml2:$('#dacperioperatifpra_jmloutput2').val(),
		infus_input3:$('#dacperioperatifpra_input3').val(),
		infus_input_jml3:$('#dacperioperatifpra_jmlinput3').val(),
		infus_output3:$('#dacperioperatifpra_output3').val(),
		infus_output_jml3:$('#dacperioperatifpra_jmloutput3').val(),
		infus_input4:$('#dacperioperatifpra_input4').val(),
		infus_input_jml4:$('#dacperioperatifpra_jmlinput4').val(),
		infus_output4:$('#dacperioperatifpra_output4').val(),
		infus_output_jml4:$('#dacperioperatifpra_jmloutput4').val(),
		cairan_imbang:$('#dacperioperatifpra_seimbangcairan').val(),
		jaringan:spesi_jar,
		kassa_awal:$('#dacperioperatifpra_kasa1').val(),
		kassa_tmbah:$('#dacperioperatifpra_kasa2').val(),
		kassa_akhir:$('#dacperioperatifpra_kasa3').val(),
		jarum_awal:$('#dacperioperatifpra_jarum1').val(),
		jarum_tmbah:$('#dacperioperatifpra_jarum2').val(),
		jarum_akhir:$('#dacperioperatifpra_jarum3').val(),
		bisturi_awal:$('#dacperioperatifpra_bisturi1').val(),
		bisturi_tmbah:$('#dacperioperatifpra_bisturi2').val(),
		bisturi_akhir:$('#dacperioperatifpra_bisturi3').val(),
		depper_awal:$('#dacperioperatifpra_depper1').val(),
		depper_tmbah:$('#dacperioperatifpra_depper2').val(),
		depper_akhir:$('#dacperioperatifpra_depper3').val()
	};
	apiPOST('Rekammedisirna/saveKeadaanPas3', params,hasil=>{

	});
	// console.log(params);
}

function saveIntraOperasi(){
	if ($('input[name=dacperioperatifpra_bsuhan1]:checked').length > 0) {
		var pendarahan=$('input[name=dacperioperatifpra_bsuhan1]:checked').val();
	}else{
		var pendarahan=0;
	}

	if ($('input[name=dacperioperatifpra_bsuhan3]:checked').length > 0) {
		var intervensi_hasil_darah=$('input[name=dacperioperatifpra_bsuhan3]:checked').val();
	}else{
		var intervensi_hasil_darah=0;
	}

	if ($('input[name=dacperioperatifpra_bsuhan4]:checked').length > 0) {
		var observasi_darah=$('input[name=dacperioperatifpra_bsuhan4]:checked').val();
	}else{
		var observasi_darah=0;
	}

	if ($('input[name=dacperioperatifpra_bsuhan5]:checked').length > 0) {
		var terapeutik_darah=$('input[name=dacperioperatifpra_bsuhan5]:checked').val();
	}else{
		var terapeutik_darah=0;
	}

	if ($('input[name=dacperioperatifpra_bsuhan6]:checked').length > 0) {
		var aspirasi=$('input[name=dacperioperatifpra_bsuhan6]:checked').val();
	}else{
		var aspirasi=0;
	}

	if ($('input[name=dacperioperatifpra_bsuhan7]:checked').length > 0) {
		var terapeutik_hipo=$('input[name=dacperioperatifpra_bsuhan7]:checked').val();
	}else{
		var terapeutik_hipo=0;
	}

	if ($('input[name=dacperioperatifpra_bsuhan8]:checked').length > 0) {
		var intervensi_hasil_aspirasi=$('input[name=dacperioperatifpra_bsuhan8]:checked').val();
	}else{
		var intervensi_hasil_aspirasi=0;
	}

	if ($('input[name=dacperioperatifpra_bsuhan9]:checked').length > 0) {
		var observasi_aspirasi=$('input[name=dacperioperatifpra_bsuhan9]:checked').val();
	}else{
		var observasi_aspirasi=0;
	}

	if ($('input[name=dacperioperatifpra_bsuhan10]:checked').length > 0) {
		var terapeutik_aspirasi=$('input[name=dacperioperatifpra_bsuhan10]:checked').val();
	}else{
		var terapeutik_aspirasi=0;
	}

	if ($('input[name=dacperioperatifpra_bsuhan11]:checked').length > 0) {
		var hipotermia=$('input[name=dacperioperatifpra_bsuhan11]:checked').val();
	}else{
		var hipotermia=0;
	}

	if ($('input[name=dacperioperatifpra_bsuhan13]:checked').length > 0) {
		var intervensi_hasil_hipo=$('input[name=dacperioperatifpra_bsuhan13]:checked').val();
	}else{
		var intervensi_hasil_hipo=0;
	}
	if ($('input[name=dacperioperatifpra_bsuhan14]:checked').length > 0) {
		var observasi_hipo=$('input[name=dacperioperatifpra_bsuhan14]:checked').val();
	}else{
		var observasi_hipo=0;
	}
	if ($('input[name=dacperioperatifpra_bsuhan15]:checked').length > 0) {
		var terapeutik_hipo=$('input[name=dacperioperatifpra_bsuhan15]:checked').val();
	}else{
		var terapeutik_hipo=0;
	}

	var params={
		id_kunjungan 			:$('#idKunjunganermirna').val(),
		pendarahan 				:pendarahan,
		intervensi_darah 		:$('#dacperioperatifpra_bsuhan2').val(),
		intervensi_hasil_darah	:intervensi_hasil_darah,
		observasi_darah 		:observasi_darah,
		terapeutik_darah 		:terapeutik_darah,
		aspirasi 				:aspirasi,
		intervensi_aspirasi 	:$('#dacperioperatifpra_bsuhan7').val(),
		intervensi_hasil_aspirasi:intervensi_hasil_aspirasi,
		observasi_aspirasi 		:observasi_aspirasi,
		terapeutik_aspirasi 	:terapeutik_aspirasi,
		hipotermia 				:hipotermia,
		intervensi_hipo 		:$('#dacperioperatifpra_bsuhan12').val(),
		intervensi_hasil_hipo 	:intervensi_hasil_hipo,
		observasi_hipo 			:observasi_hipo,
		terapeutik_hipo 		:terapeutik_hipo
	};
	apiPOST('Rekammedisirna/saveIntraOperasi', params,hasil=>{

	});
	// console.log(params);
}

function saveTtdPerawat(){
	var params={
		id_kunjungan 	:$('#idKunjunganermirna').val(),
		asisten 		:$('#dacperioperatifpra_apj6Id').val(),
		instrumen 		:$('#dacperioperatifpra_apj7Id').val(),
		sirkuler        :$('#dacperioperatifpra_apj8Id').val(),
		anestesi 		:$('#dacperioperatifpra_apj9Id').val(),
		ttdasisten 		:$('#hasilttdperawatasisten').val(),
		ttdinstrumen 	:$('#hasilttdperawatinstrumen').val(),
		ttdsirkuler     :$('#hasilttdperawatsirkuler').val(),
		ttdanestesi 	:$('#hasilttdperawatanestesi').val()
	};
	apiPOST('Rekammedisirna/saveTtdperawat', params,hasil=>{

	});
	// console.log(params);
}


function saveIntraOperasi(){
	if ($('input[name=dacperioperatifpra_bsuhan1]:checked').length > 0) {
		var pendarahan=$('input[name=dacperioperatifpra_bsuhan1]:checked').val();
	}else{
		var pendarahan=0;
	}

	if ($('input[name=dacperioperatifpra_bsuhan3]:checked').length > 0) {
		var intervensi_hasil_darah=$('input[name=dacperioperatifpra_bsuhan3]:checked').val();
	}else{
		var intervensi_hasil_darah=0;
	}

	if ($('input[name=dacperioperatifpra_bsuhan4]:checked').length > 0) {
		var observasi_darah=$('input[name=dacperioperatifpra_bsuhan4]:checked').val();
	}else{
		var observasi_darah=0;
	}

	if ($('input[name=dacperioperatifpra_bsuhan5]:checked').length > 0) {
		var terapeutik_darah=$('input[name=dacperioperatifpra_bsuhan5]:checked').val();
	}else{
		var terapeutik_darah=0;
	}

	if ($('input[name=dacperioperatifpra_bsuhan6]:checked').length > 0) {
		var aspirasi=$('input[name=dacperioperatifpra_bsuhan6]:checked').val();
	}else{
		var aspirasi=0;
	}

	if ($('input[name=dacperioperatifpra_bsuhan7]:checked').length > 0) {
		var terapeutik_hipo=$('input[name=dacperioperatifpra_bsuhan7]:checked').val();
	}else{
		var terapeutik_hipo=0;
	}

	if ($('input[name=dacperioperatifpra_bsuhan8]:checked').length > 0) {
		var intervensi_hasil_aspirasi=$('input[name=dacperioperatifpra_bsuhan8]:checked').val();
	}else{
		var intervensi_hasil_aspirasi=0;
	}

	if ($('input[name=dacperioperatifpra_bsuhan9]:checked').length > 0) {
		var observasi_aspirasi=$('input[name=dacperioperatifpra_bsuhan9]:checked').val();
	}else{
		var observasi_aspirasi=0;
	}

	if ($('input[name=dacperioperatifpra_bsuhan10]:checked').length > 0) {
		var terapeutik_aspirasi=$('input[name=dacperioperatifpra_bsuhan10]:checked').val();
	}else{
		var terapeutik_aspirasi=0;
	}

	if ($('input[name=dacperioperatifpra_bsuhan11]:checked').length > 0) {
		var hipotermia=$('input[name=dacperioperatifpra_bsuhan11]:checked').val();
	}else{
		var hipotermia=0;
	}

	if ($('input[name=dacperioperatifpra_bsuhan13]:checked').length > 0) {
		var intervensi_hasil_hipo=$('input[name=dacperioperatifpra_bsuhan13]:checked').val();
	}else{
		var intervensi_hasil_hipo=0;
	}
	if ($('input[name=dacperioperatifpra_bsuhan14]:checked').length > 0) {
		var observasi_hipo=$('input[name=dacperioperatifpra_bsuhan14]:checked').val();
	}else{
		var observasi_hipo=0;
	}
	if ($('input[name=dacperioperatifpra_bsuhan15]:checked').length > 0) {
		var terapeutik_hipo=$('input[name=dacperioperatifpra_bsuhan15]:checked').val();
	}else{
		var terapeutik_hipo=0;
	}
	if($('input[name=dacperioperatifpra_sadar]:checked').val()==3){
		sdar=$('#dacperioperatifpra_sadarket').val();
	}else{
		sdar=$('input[name=dacperioperatifpra_sadar]:checked').val();
	};
	if($('input[name=dacperioperatifpra_emosi]:checked').val()==3){
		emo=$('#dacperioperatifpra_emosiket').val();
	}else{
		emo=$('input[name=dacperioperatifpra_emosi]:checked').val();
	};
	if($('input[name=dacperioperatifpra_jenisop]:checked').val()==5){
		jns_ope=$('#dacperioperatifpra_jenisopket').val();
	}else{
		jns_ope=$('input[name=dacperioperatifpra_jenisop]:checked').val();
	};
	if($('input[name=dacperioperatifpra_canul]:checked').val()==6){
		canul=$('#dacperioperatifpra_canulket').val();
	}else{
		canul=$('input[name=dacperioperatifpra_canul]:checked').val();
	};
	if($('input[name=dacperioperatifpra_posisiop]:checked').val()==6){
		ope=$('#dacperioperatifpra_posisiopket').val();
	}else{
		ope=$('input[name=dacperioperatifpra_posisiop]:checked').val();
	};
	if($('input[name=dacperioperatifpra_lengan]:checked').val()==3){
		lngan=$('#dacperioperatifpra_lenganket').val();
	}else{
		lngan=$('input[name=dacperioperatifpra_lengan]:checked').val();
	};
	if($('input[name=dacperioperatifpra_urincat]:checked').val()==2){
		cat=$('input[name=dacperioperatifpra_urinpasang]:checked').val()+','+$('#dacperioperatifpra_petugascatket').val();
	}else{
		cat=$('input[name=dacperioperatifpra_lengan]:checked').val();
	};
	if($('input[name=dacperioperatifpra_diatermiyesno]:checked').val()==2){
		termi=$('input[name=dacperioperatifpra_diatermiyesno]:checked').val()+','+$('input[name=dacperioperatifpra_diatermi]:checked').val();
	}else{
		termi=$('input[name=dacperioperatifpra_lengan]:checked').val();
	};
	if($('input[name=dacperioperatifpra_touryesno]:checked').val()==2){
		torni=$('input[name=dacperioperatifpra_tour]:checked').val()+','+$('#dacperioperatifpra_jamtour1').val()+','+$('#dacperioperatifpra_jamtour2').val();
	}else{
		torni=0;
	};
	if($('input[name=dacperioperatifpra_implant]:checked').val()==2){
		mplan='2,'+$('#dacperioperatifpra_implantjenis').val()+','+$('#dacperioperatifpra_implantlokasi').val();
	}else{
		mplan=$('input[name=dacperioperatifpra_implant]:checked').val();
	};
	if($('input[name=dacperioperatifpra_drain]:checked').val()==2){
		drn=$('#dacperioperatifpra_drainjenis').val()+','+$('#dacperioperatifpra_drainlokasi').val();
	}else{
		drn=$('input[name=dacperioperatifpra_drain]:checked').val();
	};
	if($('input[name=dacperioperatifpra_irigasiyesno]:checked').val()==2){
		if($('input[name=dacperioperatifpra_irigasi]:checked').val()==4){
			lka=$('input[name=dacperioperatifpra_irigasiyesno]:checked').val()+','+$('#dacperioperatifpra_irigasiket').val();
		}else{
			lka=$('input[name=dacperioperatifpra_irigasiyesno]:checked').val()+','+$('input[name=dacperioperatifpra_irigasi]:checked').val();
		}
	}else{
		lka=$('input[name=dacperioperatifpra_irigasiyesno]:checked').val();
	};
	if($('input[name=dacperioperatifpra_tampon]:checked').val()==2){
		tmpon=$('#dacperioperatifpra_tamponlokasi').val()+','+$('#dacperioperatifpra_tamponjumlah').val();
	}else{
		tmpon=$('input[name=dacperioperatifpra_tampon]:checked').val();
	};
	if($('input[name=dacperioperatifpra_antibiotik]:checked').val()==2){
		antibio=$('#dacperioperatifpra_antibiotikjenis').val()+','+$('#dacperioperatifpra_antibiotikdosis').val()+','+$('#dacperioperatifpra_jamantibiotik').val();
	}else{
		antibio=$('input[name=dacperioperatifpra_antibiotik]:checked').val();
	};
	if($('input[name=dacperioperatifpra_spesimenyesno]:checked').val()==2){
		spesi_jar='2,'+$('input[name=dacperioperatifpra_spesimen]:checked').val()+','+$('#dacperioperatifpra_spesimenket').val();
	}else{
		spesi_jar=$('input[name=dacperioperatifpra_spesimenyesno]:checked').val();
	};

	var params={
		id_kunjungan 			:$('#idKunjunganermirna').val(),
		pendarahan 				:pendarahan,
		intervensi_darah 		:$('#dacperioperatifpra_bsuhan2').val(),
		intervensi_hasil_darah	:intervensi_hasil_darah,
		observasi_darah 		:observasi_darah,
		terapeutik_darah 		:terapeutik_darah,
		aspirasi 				:aspirasi,
		intervensi_aspirasi 	:$('#dacperioperatifpra_bsuhan7').val(),
		intervensi_hasil_aspirasi:intervensi_hasil_aspirasi,
		observasi_aspirasi 		:observasi_aspirasi,
		terapeutik_aspirasi 	:terapeutik_aspirasi,
		hipotermia 				:hipotermia,
		intervensi_hipo 		:$('#dacperioperatifpra_bsuhan12').val(),
		intervensi_hasil_hipo 	:intervensi_hasil_hipo,
		observasi_hipo 			:observasi_hipo,
		terapeutik_hipo 		:terapeutik_hipo,
		asisten 		:$('#dacperioperatifpra_apj6Id').val(),
		instrumen 		:$('#dacperioperatifpra_apj7Id').val(),
		sirkuler        :$('#dacperioperatifpra_apj8Id').val(),
		anestesi 		:$('#dacperioperatifpra_apj9Id').val(),
		ttdasisten 		:$('#hasilttdperawatasisten').val(),
		ttdinstrumen 	:$('#hasilttdperawatinstrumen').val(),
		ttdsirkuler     :$('#hasilttdperawatsirkuler').val(),
		ttdanestesi 	:$('#hasilttdperawatanestesi').val(),
		sadar  			:sdar,
		emosi  			:emo,
		tindakan 		:$('input[name=dacperioperatifpra_tindakan]:checked').val(),
		jns_tindakan 	:$('#dacperioperatifpra_tindakanket').val(),
		tipe 			:$('input[name=dacperioperatifpra_tipeop]:checked').val(),
		jenis_bius  	:$('input[name=dacperioperatifpra_bius]:checked').val(),
		jenis_operasi  	:jns_ope,
		canul_intravera :canul,
		operasi  		:ope,
		lengan  		:lngan,
		cateter  		:cat,
		desinfektan     :$('input[name=dacperioperatifpra_desinfektan]:checked').val(),
		insisi    		:$('input[name=dacperioperatifpra_insisijml]:checked').val()+','+$('input[name=dacperioperatifpra_insisijns]:checked').val(),
		diatermi  		:termi,
		normal_elektrode:$('input[name=dacperioperatifpra_netral]:checked').val(),
		torniquet  		:torni,
		implan  		:mplan,
		drain  			:drn,
		luka  			:lka,
		tampon  		:tmpon,
		antibiotik  	:antibio,
		infus_input1  	:$('#dacperioperatifpra_input1').val(),
		infus_input_jml1:$('#dacperioperatifpra_jmlinput1').val(),
		infus_output1 	:$('#dacperioperatifpra_output1').val(),
		infus_output_jml1:$('#dacperioperatifpra_jmloutput1').val(),
		infus_input2 	:$('#dacperioperatifpra_input2').val(),
		infus_input_jml2:$('#dacperioperatifpra_jmlinput2').val(),
		infus_output2:$('#dacperioperatifpra_output2').val(),
		infus_output_jml2:$('#dacperioperatifpra_jmloutput2').val(),
		infus_input3:$('#dacperioperatifpra_input3').val(),
		infus_input_jml3:$('#dacperioperatifpra_jmlinput3').val(),
		infus_output3:$('#dacperioperatifpra_output3').val(),
		infus_output_jml3:$('#dacperioperatifpra_jmloutput3').val(),
		infus_input4:$('#dacperioperatifpra_input4').val(),
		infus_input_jml4:$('#dacperioperatifpra_jmlinput4').val(),
		infus_output4:$('#dacperioperatifpra_output4').val(),
		infus_output_jml4:$('#dacperioperatifpra_jmloutput4').val(),
		cairan_imbang:$('#dacperioperatifpra_seimbangcairan').val(),
		jaringan:spesi_jar,
		kassa_awal:$('#dacperioperatifpra_kasa1').val(),
		kassa_tmbah:$('#dacperioperatifpra_kasa2').val(),
		kassa_akhir:$('#dacperioperatifpra_kasa3').val(),
		jarum_awal:$('#dacperioperatifpra_jarum1').val(),
		jarum_tmbah:$('#dacperioperatifpra_jarum2').val(),
		jarum_akhir:$('#dacperioperatifpra_jarum3').val(),
		bisturi_awal:$('#dacperioperatifpra_bisturi1').val(),
		bisturi_tmbah:$('#dacperioperatifpra_bisturi2').val(),
		bisturi_akhir:$('#dacperioperatifpra_bisturi3').val(),
		depper_awal:$('#dacperioperatifpra_depper1').val(),
		depper_tmbah:$('#dacperioperatifpra_depper2').val(),
		depper_akhir:$('#dacperioperatifpra_depper3').val(),
		tempat:$('input[name=dacperioperatifpra_tempatok]:checked').val(),
		mulai:$('#dacperioperatifpra_atglmulaiop').val(),
		selesai:$('#dacperioperatifpra_atglselesaiop').val()
	};
	apiPOST('Rekammedisirna/saveIntraOperasi', params,hasil=>{

	});
	// console.log(params);
}

function saveDocPascaoperasi(){
	var params={
		id_kunjungan:$('#idKunjunganermirna').val(),
		id:$('#dacperioperatifpra_id3').val(),
		masuk:$('#dacperioperatifpra_cjammasuk').val(),
		keluar:$('#dacperioperatifpra_cjamkeluar').val(),
		id_ruangan:$('input[name=dacperioperatifpra_ckembali]:checked').val(),
		nama_ruangan:$('#dacperioperatifpra_ckembaliket').val(),
	};
	apiPOST('Rekammedisirna/saveDocPascaoperasi', params,hasil=>{

	});
	// console.log(params);
}

function saveKeadaanPas4(){
	if($('input[name=dacperioperatifpra_kulitdatang]:checked').val()==6){
		kulit_dat=$('#dacperioperatifpra_kulitdatangket').val()
	}else{
		kulit_dat=$('input[name=dacperioperatifpra_kulitdatang]:checked').val();
	}
	if($('input[name=dacperioperatifpra_kulitkeluar]:checked').val()==6){
		kulit_luar=$('#dacperioperatifpra_kulitkeluarket').val()
	}else{
		kulit_luar=$('input[name=dacperioperatifpra_kulitkeluar]:checked').val();
	}
	if($('input[name=dacperioperatifpra_perdarahan]:checked').val()==2){
		darah='2,'+$('#dacperioperatifpra_perdarahanjumlah').val()+','+$('#dacperioperatifpra_perdarahanlokasi').val();
	}else{
		darah=$('input[name=dacperioperatifpra_perdarahan]:checked').val();
	}
	if($('input[name=dacperioperatifpra_muntah]:checked').val()==2){
		mntah='2,'+$('#dacperioperatifpra_muntahket').val();
	}else{
		mntah=$('input[name=dacperioperatifpra_muntah]:checked').val();
	}
	if($('input[name=dacperioperatifpra_nyeric]:checked').val()==2){
		nyri=$('#dacperioperatifpra_nyeric2').val();
	}else{
		nyri=0;
	}
	if($('input[name=dacperioperatifpra_jaringan]:checked').val()==2){
		jar=$('input[name=dacperioperatifpra_jaringan]:checked').val()+','+$('#dacperioperatifpra_jaringanket').val();
	}else{
		jar=0;
	}
	
	var params={
		id_kunjungan:$('#idKunjunganermirna').val(),
		kondisi:$('input[name=dacperioperatifpra_cku]:checked').val(),
		gcs_e:$('#dacperioperatifpra_ce').val(),
		gcs_m:$('#dacperioperatifpra_cm').val(),
		gcs_v:$('#dacperioperatifpra_cv').val(),
		sadar:$('#dacperioperatifpra_cku2').val(),
		cahaya_kiri:$('#dacperioperatifpra_creflek1').val(),
		cahaya_kanan:$('#dacperioperatifpra_creflek2').val(),
		pupil_kiri:$('#dacperioperatifpra_cpupil1').val(),
		pupil_kanan:$('#dacperioperatifpra_cpupil2').val(),
		kulit_datang:kulit_dat,
		kulit_keluar:kulit_luar,
		sirkulasi:$('input[name=dacperioperatifpra_sirkulasi]:checked').val(),
		mukosa:$('input[name=dacperioperatifpra_mukosa]:checked').val(),
		posisi:$('input[name=dacperioperatifpra_posisipx]:checked').val(),
		pendarahan:darah,
		muntah:mntah,
		nyeri:nyri,
		jatuh:$('input[name=dacperioperatifpra_jatuhc]:checked').val(),
		jaringan:jar
	};
	apiPOST('Rekammedisirna/saveKeadaanPas4', params,hasil=>{

	});
	// console.log(params);
}

function savePindahPas(){
	var params={
		id_kunjungan 		:$('#idKunjunganermirna').val(),
		aldrete :document.getElementById('dacperioperatifpra_skorc1').innerHTML+','+document.getElementById('dacperioperatifpra_skorc2').innerHTML+','+document.getElementById('dacperioperatifpra_skorc3').innerHTML+','+document.getElementById('dacperioperatifpra_skorc4').innerHTML+','+document.getElementById('dacperioperatifpra_skorc5').innerHTML,
		bromage:document.getElementById('dacperioperatifpra_skorctot2').innerHTML,
		steward:document.getElementById('dacperioperatifpra_bskorc1').innerHTML+','+document.getElementById('dacperioperatifpra_bskorc2').innerHTML+','+document.getElementById('dacperioperatifpra_bskorc3').innerHTML,
	};
	apiPOST('Rekammedisirna/savePindahPas', params,hasil=>{

	});
	// console.log(params);
}

function savePascaOperasi(){
	if(document.getElementById('dacperioperatifpra_csuhan11_1').checked){
		cair=1;
	}else{
		cair=0;
	}
	if(document.getElementById('dacperioperatifpra_csuhan12_1').checked){
		syok=1;
	}else{
		syok=0;
	}
	if(document.getElementById('dacperioperatifpra_csuhan19_1').checked){
		nyeri=1;
	}else{
		nyeri=0;
	}
	if ($('input[name=dacperioperatifpra_csuhan1]:checked').length>0) {
		var shok=$('input[name=dacperioperatifpra_csuhan1]:checked').val();
	}else{
		var shok=0;
	}
	if ($('input[name=dacperioperatifpra_csuhan3]:checked').length>0) {
		var hasil_shok=$('input[name=dacperioperatifpra_csuhan3]:checked').val();
	}else{
		var hasil_shok=0;
	}
	if ($('input[name=dacperioperatifpra_csuhan4]:checked').length>0) {
		var observasi_shok=$('input[name=dacperioperatifpra_csuhan4]:checked').val();
	}else{
		var observasi_shok=0;
	}
	if ($('input[name=dacperioperatifpra_csuhan5]:checked').length>0) {
		var terapeutik_shok=$('input[name=dacperioperatifpra_csuhan5]:checked').val();
	}else{
		var terapeutik_shok=0;
	}
	if ($('input[name=dacperioperatifpra_csuhan6]:checked').length>0) {
		var cairan=$('input[name=dacperioperatifpra_csuhan6]:checked').val();
	}else{
		var cairan=0;
	}
	if ($('input[name=dacperioperatifpra_csuhan8]:checked').length>0) {
		var hasil_cairan=$('input[name=dacperioperatifpra_csuhan8]:checked').val();
	}else{
		var hasil_cairan=0;
	}
	if ($('input[name=dacperioperatifpra_csuhan9]:checked').length>0) {
		var observasi_cairan=$('input[name=dacperioperatifpra_csuhan9]:checked').val();
	}else{
		var observasi_cairan=0;
	}
	if ($('input[name=dacperioperatifpra_csuhan10]:checked').length>0) {
		var terapeutik_cairan=$('input[name=dacperioperatifpra_csuhan10]:checked').val();
	}else{
		var terapeutik_cairan=0;
	}
	if ($('input[name=dacperioperatifpra_csuhan13]:checked').length>0) {
		var nyeri_bukti=$('input[name=dacperioperatifpra_csuhan13]:checked').val();
	}else{
		var nyeri_bukti=0;
	}
	if ($('input[name=dacperioperatifpra_csuhan15]:checked').length>0) {
		var hasil_nyeri=$('input[name=dacperioperatifpra_csuhan15]:checked').val();
	}else{
		var hasil_nyeri=0;
	}
	if ($('input[name=dacperioperatifpra_csuhan16]:checked').length>0) {
		var observasi_nyeri=$('input[name=dacperioperatifpra_csuhan16]:checked').val();
	}else{
		var observasi_nyeri=0;
	}
	if ($('input[name=dacperioperatifpra_csuhan17]:checked').length>0) {
		var terapeutik_nyeri=$('input[name=dacperioperatifpra_csuhan17]:checked').val();
	}else{
		var terapeutik_nyeri=0;
	}
	if ($('input[name=dacperioperatifpra_csuhan18]:checked').length>0) {
		var edukasi_nyeri=$('input[name=dacperioperatifpra_csuhan18]:checked').val();
	}else{
		var edukasi_nyeri=0;
	}
	
	var params={
		id_kunjungan 	:$('#idKunjunganermirna').val(),
		shok 			:shok,
		lama_shok 		:$('#dacperioperatifpra_csuhan2').val(),
		hasil_shok 		:hasil_shok,
		observasi_shok 	:observasi_shok,
		terapeutik_shok :terapeutik_shok,
		cairan 			:cairan,
		lama_cairan 	:$('#dacperioperatifpra_csuhan7').val(),
		hasil_cairan 	:hasil_cairan,
		observasi_cairan:observasi_cairan,
		terapeutik_cairan:terapeutik_cairan,
		kolab_cairan 	:cair,
		nyeri_hub 		:syok,
		nyeri_bukti 	:nyeri_bukti,
		lama_nyeri 		:$('#dacperioperatifpra_csuhan14').val(),
		hasil_nyeri 	:hasil_nyeri,
		observasi_nyeri :observasi_nyeri,
		terapeutik_nyeri:terapeutik_nyeri,
		edukasi_nyeri 	:edukasi_nyeri,
		kolab_nyeri 	:nyeri,
	};
	apiPOST('Rekammedisirna/savePascaOperasi', params,hasil=>{
	});
}

function saveTtddokanestesi(){
	var params={
		id_kunjungan 		:$('#idKunjunganermirna').val(),
		id_dokter 			:$('#dacperioperatifpra_apj10Id').val(),
		id_perawat 			:$('#dacperioperatifpra_apj11Id').val(),
		img_ttddokter 		:$('#hasilttdperawatanestesi2').val(),
		img_perawatanestesi :$('#hasilttdperawatanestesi2').val(),
	};
	apiPOST('Rekammedisirna/saveTtddokanestesi', params,hasil=>{

	});
	// console.log(params);
}


function savePascaOperasitry(){
	if($('input[name=dacperioperatifpra_kulitdatang]:checked').val()==6){
		kulit_dat=$('#dacperioperatifpra_kulitdatangket').val()
	}else{
		kulit_dat=$('input[name=dacperioperatifpra_kulitdatang]:checked').val();
	}
	if($('input[name=dacperioperatifpra_kulitkeluar]:checked').val()==6){
		kulit_luar=$('#dacperioperatifpra_kulitkeluarket').val()
	}else{
		kulit_luar=$('input[name=dacperioperatifpra_kulitkeluar]:checked').val();
	}
	if($('input[name=dacperioperatifpra_perdarahan]:checked').val()==2){
		darah='2,'+$('#dacperioperatifpra_perdarahanjumlah').val()+','+$('#dacperioperatifpra_perdarahanlokasi').val();
	}else{
		darah=$('input[name=dacperioperatifpra_perdarahan]:checked').val();
	}
	if($('input[name=dacperioperatifpra_muntah]:checked').val()==2){
		mntah='2,'+$('#dacperioperatifpra_muntahket').val();
	}else{
		mntah=$('input[name=dacperioperatifpra_muntah]:checked').val();
	}
	if($('input[name=dacperioperatifpra_nyeric]:checked').val()==2){
		nyri=$('#dacperioperatifpra_nyeric2').val();
	}else{
		nyri=0;
	}
	if($('input[name=dacperioperatifpra_jaringan]:checked').val()==2){
		jar=$('input[name=dacperioperatifpra_jaringan]:checked').val()+','+$('#dacperioperatifpra_jaringanket').val();
	}else{
		jar=0;
	}

	if(document.getElementById('dacperioperatifpra_csuhan11_1').checked){
		cair=1;
	}else{
		cair=0;
	}
	if(document.getElementById('dacperioperatifpra_csuhan12_1').checked){
		syok=1;
	}else{
		syok=0;
	}
	if(document.getElementById('dacperioperatifpra_csuhan19_1').checked){
		nyeri=1;
	}else{
		nyeri=0;
	}
	if ($('input[name=dacperioperatifpra_csuhan1]:checked').length>0) {
		var shok=$('input[name=dacperioperatifpra_csuhan1]:checked').val();
	}else{
		var shok=0;
	}
	if ($('input[name=dacperioperatifpra_csuhan3]:checked').length>0) {
		var hasil_shok=$('input[name=dacperioperatifpra_csuhan3]:checked').val();
	}else{
		var hasil_shok=0;
	}
	if ($('input[name=dacperioperatifpra_csuhan4]:checked').length>0) {
		var observasi_shok=$('input[name=dacperioperatifpra_csuhan4]:checked').val();
	}else{
		var observasi_shok=0;
	}
	if ($('input[name=dacperioperatifpra_csuhan5]:checked').length>0) {
		var terapeutik_shok=$('input[name=dacperioperatifpra_csuhan5]:checked').val();
	}else{
		var terapeutik_shok=0;
	}
	if ($('input[name=dacperioperatifpra_csuhan6]:checked').length>0) {
		var cairan=$('input[name=dacperioperatifpra_csuhan6]:checked').val();
	}else{
		var cairan=0;
	}
	if ($('input[name=dacperioperatifpra_csuhan8]:checked').length>0) {
		var hasil_cairan=$('input[name=dacperioperatifpra_csuhan8]:checked').val();
	}else{
		var hasil_cairan=0;
	}
	if ($('input[name=dacperioperatifpra_csuhan9]:checked').length>0) {
		var observasi_cairan=$('input[name=dacperioperatifpra_csuhan9]:checked').val();
	}else{
		var observasi_cairan=0;
	}
	if ($('input[name=dacperioperatifpra_csuhan10]:checked').length>0) {
		var terapeutik_cairan=$('input[name=dacperioperatifpra_csuhan10]:checked').val();
	}else{
		var terapeutik_cairan=0;
	}
	if ($('input[name=dacperioperatifpra_csuhan13]:checked').length>0) {
		var nyeri_bukti=$('input[name=dacperioperatifpra_csuhan13]:checked').val();
	}else{
		var nyeri_bukti=0;
	}
	if ($('input[name=dacperioperatifpra_csuhan15]:checked').length>0) {
		var hasil_nyeri=$('input[name=dacperioperatifpra_csuhan15]:checked').val();
	}else{
		var hasil_nyeri=0;
	}
	if ($('input[name=dacperioperatifpra_csuhan16]:checked').length>0) {
		var observasi_nyeri=$('input[name=dacperioperatifpra_csuhan16]:checked').val();
	}else{
		var observasi_nyeri=0;
	}
	if ($('input[name=dacperioperatifpra_csuhan17]:checked').length>0) {
		var terapeutik_nyeri=$('input[name=dacperioperatifpra_csuhan17]:checked').val();
	}else{
		var terapeutik_nyeri=0;
	}
	if ($('input[name=dacperioperatifpra_csuhan18]:checked').length>0) {
		var edukasi_nyeri=$('input[name=dacperioperatifpra_csuhan18]:checked').val();
	}else{
		var edukasi_nyeri=0;
	}
	
	
	var params={
		id_kunjungan 	:$('#idKunjunganermirna').val(),
		shok 			:shok,
		lama_shok 		:$('#dacperioperatifpra_csuhan2').val(),
		hasil_shok 		:hasil_shok,
		observasi_shok 	:observasi_shok,
		terapeutik_shok :terapeutik_shok,
		cairan 			:cairan,
		lama_cairan 	:$('#dacperioperatifpra_csuhan7').val(),
		hasil_cairan 	:hasil_cairan,
		observasi_cairan:observasi_cairan,
		terapeutik_cairan:terapeutik_cairan,
		kolab_cairan 	:cair,
		nyeri_hub 		:syok,
		nyeri_bukti 	:nyeri_bukti,
		lama_nyeri 		:$('#dacperioperatifpra_csuhan14').val(),
		hasil_nyeri 	:hasil_nyeri,
		observasi_nyeri :observasi_nyeri,
		terapeutik_nyeri:terapeutik_nyeri,
		edukasi_nyeri 	:edukasi_nyeri,
		kolab_nyeri 	:nyeri,
		aldrete 		:document.getElementById('dacperioperatifpra_skorc1').innerHTML+','+document.getElementById('dacperioperatifpra_skorc2').innerHTML+','+document.getElementById('dacperioperatifpra_skorc3').innerHTML+','+document.getElementById('dacperioperatifpra_skorc4').innerHTML+','+document.getElementById('dacperioperatifpra_skorc5').innerHTML,
		bromage  		:document.getElementById('dacperioperatifpra_skorctot2').innerHTML,
		steward 		:document.getElementById('dacperioperatifpra_bskorc1').innerHTML+','+document.getElementById('dacperioperatifpra_bskorc2').innerHTML+','+document.getElementById('dacperioperatifpra_bskorc3').innerHTML,

		id_dokter 			:$('#dacperioperatifpra_apj10Id').val(),
		id_perawat 			:$('#dacperioperatifpra_apj11Id').val(),
		img_ttddokter 		:$('#hasilttdperawatanestesi2').val(),
		img_perawatanestesi :$('#hasilttdperawatanestesi2').val(),

		kondisi  			:$('input[name=dacperioperatifpra_cku]:checked').val(),
		gcs_e  				:$('#dacperioperatifpra_ce').val(),
		gcs_m   			:$('#dacperioperatifpra_cm').val(),
		gcs_v   			:$('#dacperioperatifpra_cv').val(),
		sadar   			:$('#dacperioperatifpra_cku2').val(),
		cahaya_kiri  		:$('#dacperioperatifpra_creflek1').val(),
		cahaya_kanan  		:$('#dacperioperatifpra_creflek2').val(),
		pupil_kiri  		:$('#dacperioperatifpra_cpupil1').val(),
		pupil_kanan  		:$('#dacperioperatifpra_cpupil2').val(),
		kulit_datang  		:kulit_dat,
		kulit_keluar  		:kulit_luar,
		sirkulasi  			:$('input[name=dacperioperatifpra_sirkulasi]:checked').val(),
		mukosa  			:$('input[name=dacperioperatifpra_mukosa]:checked').val(),
		posisi   			:$('input[name=dacperioperatifpra_posisipx]:checked').val(),
		pendarahan  		:darah,
		muntah   			:mntah,
		nyeri  				:nyri,
		jatuh  				:$('input[name=dacperioperatifpra_jatuhc]:checked').val(),
		jaringan  			:jar,
		id 					:$('#dacperioperatifpra_id3').val(),
		masuk 				:$('#dacperioperatifpra_cjammasuk').val(),
		keluar 				:$('#dacperioperatifpra_cjamkeluar').val(),
		id_ruangan  		:$('input[name=dacperioperatifpra_ckembali]:checked').val(),
		nama_ruangan 		:$('#dacperioperatifpra_ckembaliket').val(),
	};
	apiPOST('Rekammedisirna/savePascaOperasi', params,hasil=>{
	});
}

function savePostoperasi(){
	if(document.getElementById('dacperioperatifpra_dokumentasi_10').checked){
		var dok=Array.from(document.querySelectorAll('input[name=dacperioperatifpra_dokumentasi]:checked')).map(c=>c.value);
		dok.pop();
		dok.push($('#dacperioperatifpra_dokumentasiket10').val());
		dokumen=dok.join();
	}else{
		dokumen=Array.from(document.querySelectorAll('input[name=dacperioperatifpra_dokumentasi]:checked')).map(c=>c.value).join();
	} 
	if(document.getElementById('dacperioperatifpra_alat_8').checked){
		var dok=Array.from(document.querySelectorAll('input[name=dacperioperatifpra_alat]:checked')).map(c=>c.value);
		dok.pop();
		dok.push($('#dacperioperatifpra_alatket8').val());
		alt=dok.join();
	}else{
		alt=Array.from(document.querySelectorAll('input[name=dacperioperatifpra_alat]:checked')).map(c=>c.value).join();
	}
	if(document.getElementById('dacperioperatifpra_nyerid_2').checked){
		nyri=$('#dacperioperatifpra_nyerid2').val();
	}else{
		nyri=0;
	}
	if(document.getElementById('dacperioperatifpra_darah_2').checked){
		drah='2,'+$('#dacperioperatifpra_darahjumlah').val()+','+$('#dacperioperatifpra_darahlokasi').val();
	}else{
		drah=$('input[name=dacperioperatifpra_darah]:checked').val();
	}
	
	var params={
		id_kunjungan:$('#idKunjunganermirna').val(),
		dokumentasi:dokumen,
		notif:$('#dacperioperatifpra_kelpx').val()+','+$('#dacperioperatifpra_kelket').val(),
		alat:alt,
		keadaan:$('input[name=dacperioperatifpra_dku]:checked').val(),
		gcs:$('#dacperioperatifpra_de').val()+','+$('#dacperioperatifpra_dm').val()+','+$('#dacperioperatifpra_dv').val(),
		kesadaran:$('#dacperioperatifpra_dku2').val(),
		cahaya_kiri:$('#dacperioperatifpra_dreflek1').val(),
		cahaya_kanan:$('#dacperioperatifpra_dreflek2').val(),
		pupil_kiri:$('#dacperioperatifpra_dpupil1').val(),
		pupil_kanan:$('#dacperioperatifpra_dpupil2').val(),
		tekanan_darah1:$('#dacperioperatifpra_dtensi1').val(),
		tekanan_darah2:$('#dacperioperatifpra_dtensi2').val(),
		nadi:$('#dacperioperatifpra_dn').val(),
		respirasi:$('#dacperioperatifpra_dp').val(),
		suhu:$('#dacperioperatifpra_ds').val(),
		nyeri:nyri,
		jatuh:$('input[name=dacperioperatifpra_jatuhd]:checked').val(),
		darah:drah,
		urine:$('#dacperioperatifpra_urinout').val(),
		score_aldrete:$('#dacperioperatifpra_dskor1').val(),
		score_bromage:$('#dacperioperatifpra_dskor2').val(),
		score_steward:$('#dacperioperatifpra_dskor3').val()
	};
	apiPOST('Rekammedisirna/savePostoperasi', params,hasil=>{

	});
	// console.log(params);
}

function BtnPraOperasi() {
	savePraOperasi();
}

function saveasuhanperoperatif1() {
	saveIntraOperasi();
}

function saveasuhanperoperatif2() {
	savePascaOperasitry();
}

function viewdetail1(id_kunj){
	apiPOST('Rekammedisirna/viewAsuhanperoperatif1', id_kunj,hasil=>{
		// Asuhan Keperawatan Pra Operasi{
			if(hasil['data'][0][0].kolab_ansietas==1){
				$("#dacperioperatifpra_asuhan8_1").prop("checked", true);
			}else{
				$("#dacperioperatifpra_asuhan8_1").prop("checked", false);
			}
			if(hasil['data'][0][0].kolab_ilmu==1){
				$("#dacperioperatifpra_asuhan16_1").prop("checked", true);
			}else{
				$("#dacperioperatifpra_asuhan16_1").prop("checked", false);
			}
			document.getElementById('idKunjunganermirna').value=hasil['data'][0][0].id_kunjungan;
			$("#dacperioperatifpra_asuhan1_"+hasil['data'][0][0].hub_ansietas).prop("checked", true);
			$("#dacperioperatifpra_asuhan2_"+hasil['data'][0][0].bukti_ansietas).prop("checked", true);
			document.getElementById('dacperioperatifpra_asuhan3').value=hasil['data'][0][0].ansietas_intervensi;
			$("#dacperioperatifpra_asuhan4_"+hasil['data'][0][0].hasil_ansietas).prop("checked", true);
			$("#dacperioperatifpra_asuhan5_"+hasil['data'][0][0].observasi_ansietas).prop("checked", true);
			$("#dacperioperatifpra_asuhan6_"+hasil['data'][0][0].terapeutik_ansietas).prop("checked", true);
			$("#dacperioperatifpra_asuhan7_"+hasil['data'][0][0].edukasi_ansietas).prop("checked", true);
			$("#dacperioperatifpra_asuhan9_"+hasil['data'][0][0].hub_pengetahuan).prop("checked", true);
			$("#dacperioperatifpra_asuhan10_"+hasil['data'][0][0].bukti_pengetahuan).prop("checked", true);
			document.getElementById('dacperioperatifpra_asuhan11').value=hasil['data'][0][0].pengetahuan_intervensi;
			$("#dacperioperatifpra_asuhan12_"+hasil['data'][0][0].hasil_pengetahuan).prop("checked", true);
			$("#dacperioperatifpra_asuhan13_"+hasil['data'][0][0].observasi_ilmu).prop("checked", true);
			$("#dacperioperatifpra_asuhan14_"+hasil['data'][0][0].terapeutik_ilmu).prop("checked", true);
			$("#dacperioperatifpra_asuhan15_"+hasil['data'][0][0].edukasi_ilmu).prop("checked", true);
			$("#dacperioperatifpra_asuhan17_"+hasil['data'][0][0].hipotermia).prop("checked", true);
			document.getElementById('dacperioperatifpra_asuhan18').value=hasil['data'][0][0].hipo_intervensi;
			$("#dacperioperatifpra_asuhan19_"+hasil['data'][0][0].hasil_hipo).prop("checked", true);
			$("#dacperioperatifpra_asuhan20_"+hasil['data'][0][0].observasi_hipo).prop("checked", true);
			$("#dacperioperatifpra_asuhan21_"+hasil['data'][0][0].terapeutik_hipo).prop("checked", true);
		// }
		
		// DOKUMENTASI KEPERAWATAN INTRA OPERASI{
			$("#dacperioperatifpra_tempatok_"+hasil['data'][1][0].tempat).prop("checked", true);
			document.getElementById('dacperioperatifpra_atglmulaiop').value=hasil['data'][1][0].mulai;
			document.getElementById('dacperioperatifpra_atglselesaiop').value=hasil['data'][1][0].selesai;
		// }
		
		// KEADAAN PASIEN3{
			if(hasil['data'][2][0].sadar==1 || hasil['data'][2][0].sadar==2){
				$("#dacperioperatifpra_sadar_"+hasil['data'][2][0].sadar).prop("checked", true);
				document.getElementById('dacperioperatifpra_div_sadar_3').style.display='none';
			}else{
				$("#dacperioperatifpra_sadar_3").prop("checked", true);
				document.getElementById('dacperioperatifpra_div_sadar_3').style.display='block';
				document.getElementById('dacperioperatifpra_sadarket').value=hasil['data'][2][0].sadar;
			}
			if(hasil['data'][2][0].emosi==1 || hasil['data'][2][0].emosi==2){
				$("#dacperioperatifpra_emosi_"+hasil['data'][2][0].emosi).prop("checked", true);
				document.getElementById('dacperioperatifpra_div_emosi_3').style.display='none';
			}else{
				$("#dacperioperatifpra_emosi_3").prop("checked", true);
				document.getElementById('dacperioperatifpra_div_emosi_3').style.display='block';
				document.getElementById('dacperioperatifpra_emosiket').value=hasil['data'][2][0].emosi;
			}
			if(hasil['data'][2][0].jenis_operasi<5){
				$("#dacperioperatifpra_jenisop_"+hasil['data'][2][0].jenis_operasi).prop("checked", true);
				document.getElementById('dacperioperatifpra_div_jenisop_5').style.display='none';
			}else{
				$("#dacperioperatifpra_jenisop_5").prop("checked", true);
				document.getElementById('dacperioperatifpra_div_jenisop_5').style.display='block';
				document.getElementById('dacperioperatifpra_jenisopket').value=hasil['data'][2][0].jenis_operasi;
			}
			if(hasil['data'][2][0].canul_intravera<6){
				$("#dacperioperatifpra_canul_"+hasil['data'][2][0].canul_intravera).prop("checked", true);
				document.getElementById('dacperioperatifpra_div_canul_6').style.display='none';
			}else{
				$("#dacperioperatifpra_canul_6").prop("checked", true);
				document.getElementById('dacperioperatifpra_div_canul_6').style.display='block';
				document.getElementById('dacperioperatifpra_canulket').value=hasil['data'][2][0].canul_intravera;
			}
			if(hasil['data'][2][0].operasi<6){
				$("#dacperioperatifpra_posisiop_"+hasil['data'][2][0].operasi).prop("checked", true);
				document.getElementById('dacperioperatifpra_div_posisiop_6').style.display='none';
			}else{
				$("#dacperioperatifpra_posisiop_6").prop("checked", true);
				document.getElementById('dacperioperatifpra_div_posisiop_6').style.display='block';
				document.getElementById('dacperioperatifpra_posisiopket').value=hasil['data'][2][0].operasi;
			}
			if(hasil['data'][2][0].lengan<3){
				$("#dacperioperatifpra_lengan_"+hasil['data'][2][0].lengan).prop("checked", true);
				document.getElementById('dacperioperatifpra_div_lengan_3').style.display='none';
			}else{
				$("#dacperioperatifpra_lengan_3").prop("checked", true);
				document.getElementById('dacperioperatifpra_div_lengan_3').style.display='block';
				document.getElementById('dacperioperatifpra_lenganket').value=hasil['data'][2][0].lengan;
			}
			if(hasil['data'][2][0].cateter==1){
				$("#dacperioperatifpra_urincat_"+hasil['data'][2][0].cateter).prop("checked", true);
				document.getElementById('dacperioperatifpra_div_urincat_2').style.display='none';
			}else{
				var cat = hasil['data'][2][0].cateter.split(',');
				$("#dacperioperatifpra_urincat_2").prop("checked", true);
				document.getElementById('dacperioperatifpra_div_urincat_2').style.display='block';
				$("#dacperioperatifpra_urinpasang_"+cat[0]).prop("checked", true);
				document.getElementById('dacperioperatifpra_petugascatket').value=cat[1];
			}
			if(hasil['data'][2][0].diatermi==1){
				$("#dacperioperatifpra_diatermiyesno_"+hasil['data'][2][0].diatermi).prop("checked", true);
				document.getElementById('dacperioperatifpra_div_diatermiyesno_2').style.display='none';
			}else{
				var diat = hasil['data'][2][0].diatermi.split(',');
				$("#dacperioperatifpra_diatermiyesno_2").prop("checked", true);
				document.getElementById('dacperioperatifpra_div_diatermiyesno_2').style.display='block';
				$("#dacperioperatifpra_diatermi_"+diat[1]).prop("checked", true);
			}
			if(hasil['data'][2][0].torniquet==0){
				$("#dacperioperatifpra_touryesno_1").prop("checked", true);
				document.getElementById('dacperioperatifpra_div_touryesno_2').style.display='none';
			}else{
				var torn = hasil['data'][2][0].torniquet.split(',');
				$("#dacperioperatifpra_touryesno_2").prop("checked", true);
				document.getElementById('dacperioperatifpra_div_touryesno_2').style.display='block';
				$("#dacperioperatifpra_tour_"+torn[0]).prop("checked", true);
				document.getElementById('dacperioperatifpra_jamtour1').value=torn[1];
				document.getElementById('dacperioperatifpra_jamtour2').value=torn[2];
			}
			if(hasil['data'][2][0].implan==1){
				$("#dacperioperatifpra_implant_"+hasil['data'][2][0].implan).prop("checked", true);
				document.getElementById('dacperioperatifpra_div_implant_2').style.display='none';
			}else{
				var mplan = hasil['data'][2][0].implan.split(',');
				$("#dacperioperatifpra_implant_2").prop("checked", true);
				document.getElementById('dacperioperatifpra_div_implant_2').style.display='block';
				document.getElementById('dacperioperatifpra_implantjenis').value=mplan[1];
				document.getElementById('dacperioperatifpra_implantlokasi').value=mplan[2];
			}
			if(hasil['data'][2][0].drain==1){
				$("#dacperioperatifpra_drain_"+hasil['data'][2][0].drain).prop("checked", true);
				document.getElementById('dacperioperatifpra_div_drain_2').style.display='none';
			}else{
				var drn = hasil['data'][2][0].drain.split(',');
				$("#dacperioperatifpra_drain_2").prop("checked", true);
				document.getElementById('dacperioperatifpra_div_drain_2').style.display='block';
				document.getElementById('dacperioperatifpra_drainjenis').value=drn[0];
				document.getElementById('dacperioperatifpra_drainlokasi').value=drn[1];
			}
			if(hasil['data'][2][0].luka==1){
				$("#dacperioperatifpra_irigasiyesno_"+hasil['data'][2][0].luka).prop("checked", true);
				document.getElementById('dacperioperatifpra_div_irigasiyesno_2').style.display='none';
			}else{
				var lka = hasil['data'][2][0].luka.split(',');
				$("#dacperioperatifpra_irigasiyesno_2").prop("checked", true);
				document.getElementById('dacperioperatifpra_div_irigasiyesno_2').style.display='block';
				if(lka[1]<4){
					$("#dacperioperatifpra_irigasi_"+lka[1]).prop("checked", true);
				}else{
					$("#dacperioperatifpra_irigasi_4").prop("checked", true);
					document.getElementById('dacperioperatifpra_div_irigasi_4').style.display='block';
					document.getElementById('dacperioperatifpra_irigasiket').value=lka[1];
				}
			}
			if(hasil['data'][2][0].tampon==1){
				$("#dacperioperatifpra_tampon_"+hasil['data'][2][0].tampon).prop("checked", true);
				document.getElementById('dacperioperatifpra_div_tampon_2').style.display='none';
			}else{
				var tmp = hasil['data'][2][0].tampon.split(',');
				$("#dacperioperatifpra_tampon_2").prop("checked", true);
				document.getElementById('dacperioperatifpra_div_tampon_2').style.display='block';
				document.getElementById('dacperioperatifpra_tamponlokasi').value=drn[0];
				document.getElementById('dacperioperatifpra_tamponjumlah').value=drn[1];
			}
			if(hasil['data'][2][0].antibiotik==1){
				$("#dacperioperatifpra_antibiotik_"+hasil['data'][2][0].antibiotik).prop("checked", true);
				document.getElementById('dacperioperatifpra_div_antibiotik_2').style.display='none';
			}else{
				var antib = hasil['data'][2][0].antibiotik.split(',');
				$("#dacperioperatifpra_antibiotik_2").prop("checked", true);
				document.getElementById('dacperioperatifpra_div_antibiotik_2').style.display='block';
				document.getElementById('dacperioperatifpra_antibiotikjenis').value=antib[0];
				document.getElementById('dacperioperatifpra_antibiotikdosis').value=antib[1];
				document.getElementById('dacperioperatifpra_jamantibiotik').value=antib[2];
			}
			if(hasil['data'][2][0].jaringan==1){
				$("#dacperioperatifpra_spesimenyesno_"+hasil['data'][2][0].jaringan).prop("checked", true);
				document.getElementById('dacperioperatifpra_div_spesimenyesno_2').style.display='none';
			}else{
				$("#dacperioperatifpra_spesimenyesno_2").prop("checked", true);
				document.getElementById('dacperioperatifpra_div_spesimenyesno_2').style.display='block';
				var jar = hasil['data'][2][0].jaringan.split(',');
				$("#dacperioperatifpra_spesimen_"+jar[1]).prop("checked", true);
				document.getElementById('dacperioperatifpra_spesimenket').value=jar[2];
			}
			var ins=hasil['data'][2][0].insisi.split(',');
			
			$("#dacperioperatifpra_tindakan_"+hasil['data'][2][0].tindakan).prop("checked", true);
			document.getElementById('dacperioperatifpra_tindakanket').value=hasil['data'][2][0].jns_tindakan;
			$("#dacperioperatifpra_tipeop_"+hasil['data'][2][0].tipe).prop("checked", true);
			$("#dacperioperatifpra_bius_"+hasil['data'][2][0].jenis_bius).prop("checked", true);
			$("#dacperioperatifpra_desinfektan_"+hasil['data'][2][0].desinfektan).prop("checked", true);
			$("#dacperioperatifpra_insisijml_"+ins[0]).prop("checked", true);
			$("#dacperioperatifpra_insisijns_"+ins[1]).prop("checked", true);
			$("#dacperioperatifpra_netral_"+hasil['data'][2][0].normal_elektrode).prop("checked", true);
			document.getElementById('dacperioperatifpra_input1').value=hasil['data'][2][0].infus_input1;
			document.getElementById('dacperioperatifpra_jmlinput1').value=hasil['data'][2][0].infus_input_jml1;
			document.getElementById('dacperioperatifpra_output1').value=hasil['data'][2][0].infus_output1;
			document.getElementById('dacperioperatifpra_jmloutput1').value=hasil['data'][2][0].infus_output_jml1;
			document.getElementById('dacperioperatifpra_input2').value=hasil['data'][2][0].infus_input2;
			document.getElementById('dacperioperatifpra_jmlinput2').value=hasil['data'][2][0].infus_input_jml2;
			document.getElementById('dacperioperatifpra_output2').value=hasil['data'][2][0].infus_output2;
			document.getElementById('dacperioperatifpra_jmloutput2').value=hasil['data'][2][0].infus_output_jml2;
			document.getElementById('dacperioperatifpra_input3').value=hasil['data'][2][0].infus_input3;
			document.getElementById('dacperioperatifpra_jmlinput3').value=hasil['data'][2][0].infus_input_jml3;
			document.getElementById('dacperioperatifpra_output3').value=hasil['data'][2][0].infus_output3;
			document.getElementById('dacperioperatifpra_jmloutput3').value=hasil['data'][2][0].infus_output_jml3;
			document.getElementById('dacperioperatifpra_input4').value=hasil['data'][2][0].infus_input4;
			document.getElementById('dacperioperatifpra_jmlinput4').value=hasil['data'][2][0].infus_input_jml4;
			document.getElementById('dacperioperatifpra_output4').value=hasil['data'][2][0].infus_output4;
			document.getElementById('dacperioperatifpra_jmloutput4').value=hasil['data'][2][0].infus_output_jml4;
			document.getElementById('dacperioperatifpra_seimbangcairan').value=hasil['data'][2][0].cairan_imbang;
			document.getElementById('dacperioperatifpra_kasa1').value=hasil['data'][2][0].kassa_awal;
			document.getElementById('dacperioperatifpra_kasa2').value=hasil['data'][2][0].kassa_tmbah;
			document.getElementById('dacperioperatifpra_kasa3').value=hasil['data'][2][0].kassa_akhir;
			document.getElementById('dacperioperatifpra_jarum1').value=hasil['data'][2][0].jarum_awal;
			document.getElementById('dacperioperatifpra_jarum2').value=hasil['data'][2][0].jarum_tmbah;
			document.getElementById('dacperioperatifpra_jarum3').value=hasil['data'][2][0].jarum_akhir;
			document.getElementById('dacperioperatifpra_bisturi1').value=hasil['data'][2][0].bisturi_awal;
			document.getElementById('dacperioperatifpra_bisturi2').value=hasil['data'][2][0].bisturi_tmbah;
			document.getElementById('dacperioperatifpra_bisturi3').value=hasil['data'][2][0].bisturi_akhir;
			document.getElementById('dacperioperatifpra_depper1').value=hasil['data'][2][0].depper_awal;
			document.getElementById('dacperioperatifpra_depper2').value=hasil['data'][2][0].depper_tmbah;
			document.getElementById('dacperioperatifpra_depper3').value=hasil['data'][2][0].depper_akhir;
		// }
		
		// Asuhan Keperawatan Intra Operasi{
			$("#dacperioperatifpra_bsuhan1_"+hasil['data'][3][0].pendarahan).prop("checked", true);
			document.getElementById('dacperioperatifpra_bsuhan2').value=hasil['data'][3][0].intervensi_darah;
			$("#dacperioperatifpra_bsuhan3_"+hasil['data'][3][0].intervensi_hasil_darah).prop("checked", true);
			$("#dacperioperatifpra_bsuhan4_"+hasil['data'][3][0].observasi_darah).prop("checked", true);
			$("#dacperioperatifpra_bsuhan5_"+hasil['data'][3][0].terapeutik_darah).prop("checked", true);
			$("#dacperioperatifpra_bsuhan6_"+hasil['data'][3][0].aspirasi).prop("checked", true);
			document.getElementById('dacperioperatifpra_bsuhan7').value=hasil['data'][3][0].intervensi_aspirasi;
			$("#dacperioperatifpra_bsuhan8_"+hasil['data'][3][0].intervensi_hasil_aspirasi).prop("checked", true);
			$("#dacperioperatifpra_bsuhan9_"+hasil['data'][3][0].observasi_aspirasi).prop("checked", true);
			$("#dacperioperatifpra_bsuhan10_"+hasil['data'][3][0].terapeutik_aspirasi).prop("checked", true);
			$("#dacperioperatifpra_bsuhan11_"+hasil['data'][3][0].hipotermia).prop("checked", true);
			document.getElementById('dacperioperatifpra_bsuhan12').value=hasil['data'][3][0].intervensi_hipo;
			$("#dacperioperatifpra_bsuhan13_"+hasil['data'][3][0].intervensi_hasil_hipo).prop("checked", true);
			$("#dacperioperatifpra_bsuhan14_"+hasil['data'][3][0].observasi_hipo).prop("checked", true);
			$("#dacperioperatifpra_bsuhan15_"+hasil['data'][3][0].terapeutik_hipo).prop("checked", true);
		// }

		// TTD PERAWAT{
			$("#dacperioperatifpra_apj6Id option[value='"+hasil['data'][4][0].asisten+"']").attr("selected", true);
			$("#dacperioperatifpra_apj7Id option[value='"+hasil['data'][4][0].instrumen+"']").attr("selected", true);
			$("#dacperioperatifpra_apj8Id option[value='"+hasil['data'][4][0].sirkuler+"']").attr("selected", true);
			$("#dacperioperatifpra_apj9Id option[value='"+hasil['data'][4][0].anestesi+"']").attr("selected", true);
		// }
		
		// Keadaan Pas2{
			if(hasil['data'][5][0].emosi<4){
				$("#dacperioperatifpra_bemosi_"+hasil['data'][5][0].emosi).prop("checked", true);
				document.getElementById('dacperioperatifpra_div_bemosi_4').style.display='none';
			}else{
				$("#dacperioperatifpra_bemosi_4").prop("checked", true);
				document.getElementById('dacperioperatifpra_div_bemosi_4').style.display='block';
				document.getElementById('dacperioperatifpra_bemosiket').value=hasil['data'][5][0].emosi;
			}
			if(hasil['data'][5][0].hamil<2){
				$("#dacperioperatifpra_bhamil_"+hasil['data'][5][0].hamil).prop("checked", true);
				document.getElementById('dacperioperatifpra_div_bhamil_2').style.display='none';
			}else{
				var ham = hasil['data'][5][0].hamil.split(',');
				$("#dacperioperatifpra_bhamil_2").prop("checked", true);
				document.getElementById('dacperioperatifpra_div_bhamil_2').style.display='block';
				document.getElementById('dacperioperatifpra_bhamilket').value=ham[1];
			}
			if(hasil['data'][5][0].haid<2){
				$("#dacperioperatifpra_bhaid_"+hasil['data'][5][0].haid).prop("checked", true);
				document.getElementById('dacperioperatifpra_div_bhaid_2').style.display='none';
			}else{
				var heid = hasil['data'][5][0].haid.split(',');
				$("#dacperioperatifpra_bhaid_2").prop("checked", true);
				document.getElementById('dacperioperatifpra_div_bhaid_2').style.display='block';
				document.getElementById('dacperioperatifpra_bhaidket').value=heid[1];
			}
			if(hasil['data'][5][0].premedikasi==1){
				$("#dacperioperatifpra_bpremedikasi_"+hasil['data'][5][0].premedikasi).prop("checked", true);
				document.getElementById('dacperioperatifpra_div_bpremedikasipilihlist_1').style.display='none';
			}else if(hasil['data'][5][0].premedikasi==2){
				$("#dacperioperatifpra_bpremedikasi_2").prop("checked", true);
				$("#dacperioperatifpra_bpremedikasipilihlist_1").prop("checked", true);
				document.getElementById('dacperioperatifpra_div_bpremedikasi_2').style.display='block'
				document.getElementById('dacperioperatifpra_div_bpremedikasipilihlist_1').style.display='block';
				document.getElementById('dacperioperatifpra_bpremedikasipilihlistket1').value=nama_obat;
				document.getElementById('dacperioperatifpra_bdosis1').value=dosis;
				document.getElementById('dacperioperatifpra_bdosisijam1').value=jam;
			}else{
				$("#dacperioperatifpra_bpremedikasi_2").prop("checked", true);
				$("#dacperioperatifpra_bpremedikasipilihlist_2").prop("checked", true);
				document.getElementById('dacperioperatifpra_div_bpremedikasi_2').style.display='block'
				document.getElementById('dacperioperatifpra_div_bpremedikasipilihlist_2').style.display='block';
				document.getElementById('dacperioperatifpra_bpremedikasipilihlistket2').value=nama_obat;
				document.getElementById('dacperioperatifpra_bdosis2').value=dosis;
				document.getElementById('dacperioperatifpra_bdosisijam2').value=jam;
			}
			if(hasil['data'][5][0].mrsa<2){
				$("#dacperioperatifpra_bskriningmrsa_"+hasil['data'][5][0].mrsa).prop("checked", true);
				document.getElementById('dacperioperatifpra_div_bskriningmrsa_2').style.display='none';
			}else{
				var emeresa = hasil['data'][5][0].mrsa.split(',');
				$("#dacperioperatifpra_bskriningmrsa_2").prop("checked", true);
				document.getElementById('dacperioperatifpra_div_bskriningmrsa_2').style.display='block';
				$("#dacperioperatifpra_bskrininghasil_"+emeresa[1]).prop("checked", true);
			}
			$("#dacperioperatifpra_bvisitdrop_"+hasil['data'][5][0].operasi).prop("checked", true);
			$("#dacperioperatifpra_bvisitdran_"+hasil['data'][5][0].anestesi).prop("checked", true);
		// }
		
		// Keadaan Pas{
			var sekor =hasil['data'][6][0].skor.split(',');
			var sekor_tot=0;
			for(var i=0;i<3;i++){
				sekor_tot=sekor_tot+parseInt(sekor[i]);
			}
			if(hasil['data'][6][0].nyeri==1){
				$("#dacperioperatifpra_nyeria_"+hasil['data'][6][0].nyeri).prop("checked", true);
				document.getElementById('dacperioperatifpra_div_nyeria_2').style.display='none';
			}else{
				var nyr=hasil['data'][6][0].nyeri.split(',');
				$("#dacperioperatifpra_nyeria_2").prop("checked", true);
				document.getElementById('dacperioperatifpra_div_nyeria_2').style.display='block';
				$("#dacperioperatifpra_nyeria2 option[value='"+nyr[1]+"']").attr("selected", true);
			}
			document.getElementById('dacperioperatifpra_akeadaan').value=hasil['data'][6][0].keadaan_umum;
			document.getElementById('dacperioperatifpra_crespirasi').value=hasil['data'][6][0].respirasi;
			document.getElementById('dacperioperatifpra_dnadi').value=hasil['data'][6][0].nadi;
			document.getElementById('dacperioperatifpra_hspo2').value=hasil['data'][6][0].spo2;
			document.getElementById('dacperioperatifpra_epupil1').value=hasil['data'][6][0].pupil_kiri;
			document.getElementById('dacperioperatifpra_ftensi1').value=hasil['data'][6][0].tekanan_darah1;
			document.getElementById('dacperioperatifpra_gsuhu').value=hasil['data'][6][0].suhu;
			document.getElementById('dacperioperatifpra_ireflek1').value=hasil['data'][6][0].cahaya_kiri;
			document.getElementById('dacperioperatifpra_jbb').value=hasil['data'][6][0].bb;
			document.getElementById('dacperioperatifpra_jtb').value=hasil['data'][6][0].tinggi;
			document.getElementById('dacperioperatifpra_kimt').value=hasil['data'][6][0].imt;
			document.getElementById('dacperioperatifpra_epupil2').value=hasil['data'][6][0].pupil_kanan;
			document.getElementById('dacperioperatifpra_ireflek2').value=hasil['data'][6][0].cahaya_kanan;
			document.getElementById('dacperioperatifpra_ftensi2').value=hasil['data'][6][0].tekanan_darah2;
			document.getElementById('dacperioperatifpra_fpalpasi').value=hasil['data'][6][0].palpasi;
			$("#dacrjasesmenmedis_bgcstypeAP option[value='"+hasil['data'][6][0].tipe+"']").attr("selected", true);
			$("#dacperioperatifpra_jatuha_"+hasil['data'][6][0].jatuh).prop("checked", true);
			document.getElementById('eyeOpenAP').value=sekor[0];
			document.getElementById('responMotorikAP').value=sekor[1];
			document.getElementById('responVerbalAP').value=sekor[2];
			document.getElementById('dacrjasesmenmedis_bgcstotAP').value=sekor_tot;
		// }
		
		// Status Pas{
			$("#dacperioperatifpra_cruangcek1_"+hasil['data'][7][0].identifikasi_ruang).prop("checked", true);
			$("#dacperioperatifpra_cokcek1_"+hasil['data'][7][0].identifikasi_terima).prop("checked", true);
			document.getElementById('dacperioperatifpra_cketcek1').value=hasil['data'][7][0].identifikasi_ket;
			$("#dacperioperatifpra_cruangcek2_"+hasil['data'][7][0].operasi_ruang).prop("checked", true);
			$("#dacperioperatifpra_cokcek2_"+hasil['data'][7][0].operasi_terima).prop("checked", true);
			document.getElementById('dacperioperatifpra_cketcek2').value=hasil['data'][7][0].operasi_ket;
			$("#dacperioperatifpra_cruangcek3_"+hasil['data'][7][0].anestesi_ruang).prop("checked", true);
			$("#dacperioperatifpra_cokcek3_"+hasil['data'][7][0].anestesi_terima).prop("checked", true);
			document.getElementById('dacperioperatifpra_cketcek3').value=hasil['data'][7][0].anestesi_ket;
			$("#dacperioperatifpra_cruangcek4_"+hasil['data'][7][0].puasa_ruang).prop("checked", true);
			$("#dacperioperatifpra_cokcek4_"+hasil['data'][7][0].puasa_terima).prop("checked", true);
			document.getElementById('dacperioperatifpra_cketcek4').value=hasil['data'][7][0].puasa_ket;
			$("#dacperioperatifpra_cruangcek5_"+hasil['data'][7][0].hasil_lab_ruang).prop("checked", true);
			$("#dacperioperatifpra_cokcek5_"+hasil['data'][7][0].hasil_lab_terima).prop("checked", true);
			document.getElementById('dacperioperatifpra_cketcek5').value=hasil['data'][7][0].hasil_lab_ket;
			$("#dacperioperatifpra_cruangcek6_"+hasil['data'][7][0].hasil_rad_ruang).prop("checked", true);
			$("#dacperioperatifpra_cokcek6_"+hasil['data'][7][0].hasil_rad_terima).prop("checked", true);
			document.getElementById('dacperioperatifpra_cketcek6').value=hasil['data'][7][0].hasil_rad_ket;
			$("#dacperioperatifpra_cruangcek7_"+hasil['data'][7][0].darah_ruang).prop("checked", true);
			$("#dacperioperatifpra_cokcek7_"+hasil['data'][7][0].darah_terima).prop("checked", true);
			document.getElementById('dacperioperatifpra_cketcek7').value=hasil['data'][7][0].darah_ket;
			$("#dacperioperatifpra_cruangcek8_"+hasil['data'][7][0].protesa_luar_ruang).prop("checked", true);
			$("#dacperioperatifpra_cokcek8_"+hasil['data'][7][0].protesa_luar_terima).prop("checked", true);
			document.getElementById('dacperioperatifpra_cketcek8').value=hasil['data'][7][0].protesa_luar_ket;
			$("#dacperioperatifpra_cruangcek9_"+hasil['data'][7][0].protesa_dalam_ruang).prop("checked", true);
			$("#dacperioperatifpra_cokcek9_"+hasil['data'][7][0].protesa_dalam_terima).prop("checked", true);
			document.getElementById('dacperioperatifpra_cketcek9').value=hasil['data'][7][0].protesa_dalam_ket;
			$("#dacperioperatifpra_cruangcek11_"+hasil['data'][7][0].mandi_sabun_ruang).prop("checked", true);
			$("#dacperioperatifpra_cokcek11_"+hasil['data'][7][0].mandi_sabun_terima).prop("checked", true);
			document.getElementById('dacperioperatifpra_cketcek11').value=hasil['data'][7][0].mandi_sabun_ket;
			$("#dacperioperatifpra_cruangcek12_"+hasil['data'][7][0].cukur_ruang).prop("checked", true);
			$("#dacperioperatifpra_cokcek12_"+hasil['data'][7][0].cukur_terima).prop("checked", true);
			document.getElementById('dacperioperatifpra_cketcek12').value=hasil['data'][7][0].cukur_ket;
			$("#dacperioperatifpra_cruangcek13_"+hasil['data'][7][0].pencernaan_ruang).prop("checked", true);
			$("#dacperioperatifpra_cokcek13_"+hasil['data'][7][0].pencernaan_terima).prop("checked", true);
			document.getElementById('dacperioperatifpra_cketcek13').value=hasil['data'][7][0].pencernaan_ket;
			$("#dacperioperatifpra_cruangcek14_"+hasil['data'][7][0].baju_ruang).prop("checked", true);
			$("#dacperioperatifpra_cokcek14_"+hasil['data'][7][0].baju_terima).prop("checked", true);
			document.getElementById('dacperioperatifpra_cketcek14').value=hasil['data'][7][0].baju_ket;
			$("#dacperioperatifpra_cruangcek15_"+hasil['data'][7][0].kateter_ruang).prop("checked", true);
			$("#dacperioperatifpra_cokcek15_"+hasil['data'][7][0].kateter_terima).prop("checked", true);
			document.getElementById('dacperioperatifpra_cketcek15').value=hasil['data'][7][0].kateter_ket;
			$("#dacperioperatifpra_cruangcek16_"+hasil['data'][7][0].infus_ruang).prop("checked", true);
			$("#dacperioperatifpra_cokcek16_"+hasil['data'][7][0].infus_terima).prop("checked", true);
			document.getElementById('dacperioperatifpra_cketcek16').value=hasil['data'][7][0].infus_ket;
		// }
		// console.log(hasil['data'][0][0].ansietas_intervensi);
	})
}
function viewdetail2(id_kunj){
	apiPOST('Rekammedisirna/viewAsuhanperoperatif2', id_kunj,hasil=>{
		// TTD DOKTER ANESTESI{
			$("#dacperioperatifpra_apj10Id option[value='"+hasil['data'][0][0].id_dokter+"']").attr("selected", true);
			$("#dacperioperatifpra_apj11Id option[value='"+hasil['data'][0][0].id_perawat+"']").attr("selected", true);
		// }
		
		// KEADAAN PASIEN 4{
			if(hasil['data'][1][0].kulit_datang<6){
				$("#dacperioperatifpra_kulitdatang_"+hasil['data'][1][0].kulit_datang).prop("checked", true);
				document.getElementById('dacperioperatifpra_div_kulitdatang_6').style.display='none';
			}else{
				$("#dacperioperatifpra_kulitdatang_6").prop("checked", true);
				document.getElementById('dacperioperatifpra_div_kulitdatang_6').style.display='block';
				document.getElementById('dacperioperatifpra_kulitdatangket').value=hasil['data'][1][0].kulit_datang;
			}
			if(hasil['data'][1][0].kulit_keluar<6){
				$("#dacperioperatifpra_kulitkeluar_"+hasil['data'][1][0].kulit_keluar).prop("checked", true);
				document.getElementById('dacperioperatifpra_div_kulitkeluar_6').style.display='none';
			}else{
				$("#dacperioperatifpra_kulitkeluar_6").prop("checked", true);
				document.getElementById('dacperioperatifpra_div_kulitkeluar_6').style.display='block';
				document.getElementById('dacperioperatifpra_kulitkeluarket').value=hasil['data'][1][0].kulit_keluar;
			}
			if(hasil['data'][1][0].pendarahan<2){
				$("#dacperioperatifpra_perdarahan_"+hasil['data'][1][0].pendarahan).prop("checked", true);
				document.getElementById('dacperioperatifpra_div_perdarahan_2').style.display='none';
			}else{
				$("#dacperioperatifpra_perdarahan_2").prop("checked", true);
				var drah = hasil['data'][1][0].pendarahan.split(',');
				document.getElementById('dacperioperatifpra_div_perdarahan_2').style.display='block';
				document.getElementById('dacperioperatifpra_perdarahanjumlah').value=drah[1];
				document.getElementById('dacperioperatifpra_perdarahanlokasi').value=drah[2];
			}
			if(hasil['data'][1][0].muntah<2){
				$("#dacperioperatifpra_muntah_"+hasil['data'][1][0].muntah).prop("checked", true);
				document.getElementById('dacperioperatifpra_div_muntah_2').style.display='none';
			}else{
				$("#dacperioperatifpra_muntah_2").prop("checked", true);
				var mntah = hasil['data'][1][0].muntah.split(',');
				document.getElementById('dacperioperatifpra_div_muntah_2').style.display='block';
				document.getElementById('dacperioperatifpra_muntahket').value=mntah[1];
			}
			if(hasil['data'][1][0].nyeri==0){
				$("#dacperioperatifpra_nyeric_1").prop("checked", true);
				document.getElementById('dacperioperatifpra_div_nyeric_2').style.display='none';
			}else{
				$("#dacperioperatifpra_nyeric_2").prop("checked", true);
				document.getElementById('dacperioperatifpra_div_nyeric_2').style.display='block';
				$("#dacperioperatifpra_nyeric2 option[value='"+hasil['data'][1][0].nyeri+"']").attr("selected", true);
			}
			if(hasil['data'][1][0].jaringan==0){
				$("#dacperioperatifpra_jaringan_1").prop("checked", true);
				document.getElementById('dacperioperatifpra_div_jaringan_2').style.display='none';
			}else{
				$("#dacperioperatifpra_jaringan_2").prop("checked", true);
				var jar = hasil['data'][1][0].jaringan.split(',');
				document.getElementById('dacperioperatifpra_div_jaringan_2').style.display='block';
				$("#dacperioperatifpra_jaringan2_"+jar[0]).prop("checked", true);
				document.getElementById('dacperioperatifpra_jaringanket').value=jar[1];
			}
			
			$("#dacperioperatifpra_cku_"+hasil['data'][1][0].kondisi).prop("checked", true);
			document.getElementById('dacperioperatifpra_ce').value=hasil['data'][1][0].gcs_e;
			document.getElementById('dacperioperatifpra_cm').value=hasil['data'][1][0].gcs_m;
			document.getElementById('dacperioperatifpra_cv').value=hasil['data'][1][0].gcs_v;
			$("#dacperioperatifpra_cku2 option[value='"+hasil['data'][1][0].sadar+"']").attr("selected", true);
			$("#dacperioperatifpra_creflek1 option[value='"+hasil['data'][1][0].cahaya_kiri+"']").attr("selected", true);
			$("#dacperioperatifpra_creflek2 option[value='"+hasil['data'][1][0].cahaya_kanan+"']").attr("selected", true);
			$("#dacperioperatifpra_cpupil1 option[value='"+hasil['data'][1][0].pupil_kiri+"']").attr("selected", true);
			$("#dacperioperatifpra_cpupil2 option[value='"+hasil['data'][1][0].pupil_kanan+"']").attr("selected", true);
			$("#dacperioperatifpra_sirkulasi_"+hasil['data'][1][0].sirkulasi).prop("checked", true);
			$("#dacperioperatifpra_mukosa_"+hasil['data'][1][0].mukosa).prop("checked", true);
			$("#dacperioperatifpra_posisipx_"+hasil['data'][1][0].posisi).prop("checked", true);
			$("#dacperioperatifpra_jatuhc_"+hasil['data'][1][0].jatuh).prop("checked", true);
		// }
		
		// DOKUMEN PASCA OPERASI{
			document.getElementById('dacperioperatifpra_cjammasuk').value=hasil['data'][2][0].masuk;
			document.getElementById('dacperioperatifpra_cjamkeluar').value=hasil['data'][2][0].keluar;
			$("#dacperioperatifpra_ckembali_"+hasil['data'][2][0].id_ruangan).prop("checked", true);
			document.getElementById('dacperioperatifpra_ckembaliket').value=hasil['data'][2][0].nama_ruangan;
		// }
		
		// Asuhan Keperawatan Pasca Operasi{
			if(hasil['data'][3][0].kolab_cairan==1){
				$("#dacperioperatifpra_csuhan11_1").prop("checked", true);
			}else{
				$("#dacperioperatifpra_csuhan11_1").prop("checked", false);
			}
			if(hasil['data'][3][0].nyeri_hub==1){
				$("#dacperioperatifpra_csuhan12_1").prop("checked", true);
			}else{
				$("#dacperioperatifpra_csuhan12_1").prop("checked", false);
			}
			if(hasil['data'][3][0].kolab_nyeri==1){
				$("#dacperioperatifpra_csuhan19_1").prop("checked", true);
			}else{
				$("#dacperioperatifpra_csuhan19_1").prop("checked", false);
			}
			
			$("#dacperioperatifpra_csuhan1_"+hasil['data'][3][0].shok).prop("checked", true);
			document.getElementById('dacperioperatifpra_csuhan2').value=hasil['data'][3][0].lama_shok;
			$("#dacperioperatifpra_csuhan3_"+hasil['data'][3][0].hasil_shok).prop("checked", true);
			$("#dacperioperatifpra_csuhan4_"+hasil['data'][3][0].observasi_shok).prop("checked", true);
			$("#dacperioperatifpra_csuhan5_"+hasil['data'][3][0].terapeutik_shok).prop("checked", true);
			$("#dacperioperatifpra_csuhan6_"+hasil['data'][3][0].cairan).prop("checked", true);
			document.getElementById('dacperioperatifpra_csuhan7').value=hasil['data'][3][0].lama_cairan;
			$("#dacperioperatifpra_csuhan8_"+hasil['data'][3][0].hasil_cairan).prop("checked", true);
			$("#dacperioperatifpra_csuhan9_"+hasil['data'][3][0].observasi_cairan).prop("checked", true);
			$("#dacperioperatifpra_csuhan10_"+hasil['data'][3][0].terapeutik_cairan).prop("checked", true);
			$("#dacperioperatifpra_csuhan13_"+hasil['data'][3][0].nyeri_bukti).prop("checked", true);
			document.getElementById('dacperioperatifpra_csuhan14').value=hasil['data'][3][0].lama_nyeri;
			$("#dacperioperatifpra_csuhan15_"+hasil['data'][3][0].hasil_nyeri).prop("checked", true);
			$("#dacperioperatifpra_csuhan16_"+hasil['data'][3][0].observasi_nyeri).prop("checked", true);
			$("#dacperioperatifpra_csuhan17_"+hasil['data'][3][0].terapeutik_nyeri).prop("checked", true);
			$("#dacperioperatifpra_csuhan18_"+hasil['data'][3][0].edukasi_nyeri).prop("checked", true);
		// }
		
		 // Pndah Pasien{
		 	var aldre=hasil['data'][4][0].aldrete.split(',');
		 	var aldre_tot=0;
		 	var stew =hasil['data'][4][0].steward.split(',');
		 	var stew_tot=0;
		 	for(var i=0;i<5;i++){
		 		aldre_tot=aldre_tot+parseInt(aldre[i]);
		 		document.getElementById('dacperioperatifpra_skorc'+(i+1)).innerHTML=aldre[i];
		 	}
		 	for(var i=0;i<3;i++){
		 		stew_tot=stew_tot+parseInt(stew[i]);
		 		document.getElementById('dacperioperatifpra_bskorc'+(i+1)).innerHTML=stew[i];
		 	}

		 	document.getElementById('dacperioperatifpra_skorctot').innerHTML=aldre_tot;
		 	document.getElementById('dacperioperatifpra_skorctot2').innerHTML=hasil['data'][4][0].bromage;
		 	document.getElementById('dacperioperatifpra_skorctot3').innerHTML=stew_tot;

		 })
}
function viewdetail3(id_kunj){
	apiPOST('Rekammedisirna/viewPostoperasi', id_kunj,hasil=>{
		var dok=hasil['data'][0].dokumentasi.split(',');
		var max_dok=dok.length;
		var alt=hasil['data'][0].alat.split(',');
		var max_alt=alt.length;
		var notif=hasil['data'][0].notif.split(',');
		var gcsa=hasil['data'][0].gcs.split(',');
		if(hasil['data'][0].dokumentasi.length!==1){
			for(var i=0;i<dok.length;i++){
				$("#dacperioperatifpra_dokumentasi_"+dok[i]).prop("checked", true);
			}
			if(isNaN(dok[max_dok-1]) ){
				document.getElementById('dacperioperatifpra_div_dokumentasi_10').style.display='block';
				document.getElementById('dacperioperatifpra_dokumentasiket10').value=dok[max_dok-1];
				$("#dacperioperatifpra_dokumentasi_10").prop("checked", true);
			}
		}else{
			document.getElementById('dacperioperatifpra_div_dokumentasi_10').style.display='none';
			$("#dacperioperatifpra_dokumentasi_"+hasil['data'][0].dokumentasi).prop("checked", true);
		}
		if(hasil['data'][0].alat.length>1){
			for(var i=0;i<alt.length;i++){
				$("#dacperioperatifpra_alat_"+alt[i]).prop("checked", true);
			}
			if(isNaN(alt[max_alt-1]) ){
				$("#dacperioperatifpra_alat_8").prop("checked", true);
				document.getElementById('dacperioperatifpra_div_alat_8').style.display='block';
				document.getElementById('dacperioperatifpra_alatket8').value=alt[max_alt-1];
			}
		}else{
			document.getElementById('dacperioperatifpra_div_alat_8').style.display='none';
			$("#dacperioperatifpra_alat_"+hasil['data'][0].alat).prop("checked", true);
		}
		if(hasil['data'][0].nyeri==0){
			$("#dacperioperatifpra_nyerid_1").prop("checked", true);
			document.getElementById('dacperioperatifpra_div_nyerid_2').style.display='none';
		}else{
			$("#dacperioperatifpra_nyerid_2").prop("checked", true);
			document.getElementById('dacperioperatifpra_div_nyerid_2').style.display='block';
			$("#dacperioperatifpra_nyerid2 option[value='"+hasil['data'][0].nyeri+"']").attr("selected", true);
		}
		if(hasil['data'][0].darah==1){
			$("#dacperioperatifpra_darah_1").prop("checked", true);
			document.getElementById('dacperioperatifpra_div_darah_2').style.display='none';
		}else{
			var drah=hasil['data'][0].darah.split(',');
			$("#dacperioperatifpra_darah_2").prop("checked", true);
			document.getElementById('dacperioperatifpra_div_darah_2').style.display='block';
			document.getElementById('dacperioperatifpra_darahjumlah').value=drah[1];
			document.getElementById('dacperioperatifpra_darahlokasi').value=drah[2];
		}
		
		document.getElementById('dacperioperatifpra_kelpx').value=notif[0];
		document.getElementById('dacperioperatifpra_kelket').value=notif[1];
		$("#dacperioperatifpra_dku_"+hasil['data'][0].keadaan).prop("checked", true);
		document.getElementById('dacperioperatifpra_de').value=gcsa[0];
		document.getElementById('dacperioperatifpra_dm').value=gcsa[1];
		document.getElementById('dacperioperatifpra_dv').value=gcsa[2];
		$("#dacperioperatifpra_dku2 option[value='"+hasil['data'][0].kesadaran+"']").attr("selected", true);
		$("#dacperioperatifpra_dreflek1 option[value='"+hasil['data'][0].cahaya_kiri+"']").attr("selected", true);
		$("#dacperioperatifpra_dreflek2 option[value='"+hasil['data'][0].cahaya_kanan+"']").attr("selected", true);
		$("#dacperioperatifpra_dpupil1 option[value='"+hasil['data'][0].pupil_kiri+"']").attr("selected", true);
		$("#dacperioperatifpra_dpupil2 option[value='"+hasil['data'][0].pupil_kanan+"']").attr("selected", true);
		document.getElementById('dacperioperatifpra_dtensi1').value=hasil['data'][0].tekanan_darah1;
		document.getElementById('dacperioperatifpra_dtensi2').value=hasil['data'][0].tekanan_darah2;
		document.getElementById('dacperioperatifpra_dn').value=hasil['data'][0].nadi;
		document.getElementById('dacperioperatifpra_dp').value=hasil['data'][0].respirasi;
		document.getElementById('dacperioperatifpra_ds').value=hasil['data'][0].suhu;
		$("#dacperioperatifpra_jatuhd_"+hasil['data'][0].jatuh).prop("checked", true);
		document.getElementById('dacperioperatifpra_urinout').value=hasil['data'][0].urine;
		document.getElementById('dacperioperatifpra_dskor1').value=hasil['data'][0].score_aldrete;
		document.getElementById('dacperioperatifpra_dskor2').value=hasil['data'][0].score_bromage;
		document.getElementById('dacperioperatifpra_dskor3').value=hasil['data'][0].score_steward;
		
	})
}
/*show modal*/
function openmodalasuhanperoperatif(x){
	var modal='#'+x;
	$(modal).modal('show');
}
/*TTD*/
var ttdperawatasisten 	= new WPaintX('wpaintttdperawatasisten');
var ttdperawatinstrumen = new WPaintX('wpaintttdperawatinstrumen');
var ttdperawatsirkuler 	= new WPaintX('wpaintttdperawatsirkuler');
var ttdperawatanestesi 	= new WPaintX('wpaintttdperawatanestesi');
var ttdperawatanestesi2 = new WPaintX('wpaintttdperawatanestesi2');
var ttddokteranestesi 	= new WPaintX('wpaintttddokteranestesi');
function showttdperawatasisten(){
	ttdperawatasisten.show();
}
function showttdperawatinstrumen(){
	ttdperawatinstrumen.show();
};
function showttdperawatsirkuler(){
	ttdperawatsirkuler.show();
};
function showttdperawatanestesi(){
	ttdperawatanestesi.show();
};
function showttdperawatanestesi2(){
	ttdperawatanestesi2.show();
};
function showttddokteranestesi(){
	ttddokteranestesi.show();
};
function takettdasistenperawat() {
	document.getElementById('hasilttdperawatasisten').value=ttdperawatasisten.getData();
	document.getElementById('gambarttd').src=ttdperawatasisten.getData();
	$('#modalttdperawatasisten').modal('hide');
	showttdperawatasisten();
}
function takettdinstrumenperawat() {
	document.getElementById('hasilttdperawatinstrumen').value=ttdperawatinstrumen.getData();
	document.getElementById('gambarttdinstrumen').src=ttdperawatinstrumen.getData();
	$('#modalttdperawatinstrumen').modal('hide');
	showttdperawatinstrumen();
}
function takettdsirkulerperawat() {
	document.getElementById('hasilttdperawatsirkuler').value=ttdperawatsirkuler.getData();
	document.getElementById('gambarttdsirkuler').src=ttdperawatsirkuler.getData();
	$('#modalttdperawatsirkuler').modal('hide');
	showttdperawatsirkuler();
}
function takettdanestesiperawat() {
	document.getElementById('hasilttdperawatanestesi').value=ttdperawatanestesi.getData();
	document.getElementById('gambarttdanestesi').src=ttdperawatanestesi.getData();
	$('#modalttdperawatanestesi').modal('hide');
	showttdperawatanestesi();
}
function takettdanestesiperawat2() {
	document.getElementById('hasilttdperawatanestesi2').value=ttdperawatanestesi2.getData();
	document.getElementById('gambarttdanestesi2').src=ttdperawatanestesi2.getData();
	$('#modalttdperawatanestesi2').modal('hide');
	showttdperawatanestesi2();
}
function takettddokteranestesi() {
	document.getElementById('hasilttddokteranestesi').value=ttddokteranestesi.getData();
	document.getElementById('gambarttddokteranestesi').src=ttddokteranestesi.getData();
	$('#modalttddokteranestesi').modal('hide');
	showttddokteranestesi();
}
</script>