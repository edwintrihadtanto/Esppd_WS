<div class="col-md-12">

	<div id="divserahterima" >		
		<div class="card "><!-- S (Situation) -->
			<div class="card-header" style="background-color:black;">								
				<h3 class="card-title" style="color:white;">S (Situation)</h3>
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
								<input id="dactranspasien_id" name="id" type="text" class="form-control" readonly="readonly">
								<input id="dactranspasien_mt" name="dactranspasien_mt" type="hidden" >
								<input id="dackunjunganpasien_mt" name="dackunjunganpasien_mt" type="hidden" >
							</div>
							<div class="col-md-3 d-none">
								<button id="dactranspasien_btload" class="btn btn-warning" type="button" title="Default PJ">&nbsp;&nbsp;<!-- <i class="fas fa-undo"></i> -->&nbsp;&nbsp;
								</button>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Diagnosa Medis</label>
							</div>
							<div class="col-md-8">
								<textarea rows="3" name="dactranspasien_adiag" id="dactranspasien_adiag" style="width:100%;" class="form-control"></textarea>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Level</label>
							</div>
							<div class="col-md-6">
								<select name="level" id="dactranspasien_level" class="form-control">
									<option value="0">Level 0</option>
									<option value="1">Level 1</option>
									<option value="2">Level 2</option>
									<option value="3">Level 3</option>
								</select>
							</div>
						</div>				
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Asal Ruangan</label>
							</div>
							<div class="col-md-6">
								<select name="aruang1" id="dactranspasien_aruang1" class="form-control form-control-sm">
								</select>
								<input type="text" class="form-control mt-1" style="display:none;" id="dactranspasien_aruanglain1">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label for="exempel">Spesialisasi Pasien :</label>
								<select class="form-control form-control-xs select2 " id="serahterima_sps_kam" name="rwi_sps_kam" style="width: 100%;" onchange="tampil_serahterimarwiunit();" onkeypress="serahterimaspesialisasi(event)">
								</select>
							</div>
							<div class="col-md-3">
								<label for="exempel">Kelas Unit :</label>
								<select class="form-control form-control-xs select2 " id="rwiserahterimakd_unit" name="rwipendafkd_unit" style="width: 100%;" onchange="tampil_rwiserahterimaruang(event)">
								</select>
							</div>
							<div class="col-md-3">
								<label for="exempel">Ruang :</label>
								<select class="form-control form-control-xs select2 " id="rwiserahterimatr_ruang" name="rwipendftr_ruang" style="width: 100%;" onchange="tampil_rwiserahterimakamar(event)">
								</select>
							</div>
							<div class="col-md-3">
								<label for="exempel">Tempat Tidur :</label>
								<select class="form-control form-control-xs select2 " name="id_kamar" id="serahterimaid_kamar" style="width: 100%;">
								</select>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Tanggal Pindah</label>
							</div>
							<div class="col-md-3">
								<div class="input-group date" id="dactranspasien_datgl" data-target-input="nearest">
									<input id="dactranspasien_atgl" name="atgl" type="date" class="form-control">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card"><!-- serah terima -->
			<div class="card-header" style="background-color:black;">
				<h3 class="card-title" style="color:white;">SERAH TERIMA PASIEN ANTAR RUANGAN</h3>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse">
						<i class="fas fa-minus"></i>
					</button>			  
				</div>
			</div>
			<div class="card-body" data-select2-id="27">
				<div class="row" data-select2-id="26">
					<div class="col-md-6" data-select2-id="25">
						<div class="form-group row" data-select2-id="24">
							<div class="col-md-3">
								<label class="col-form-label">Perawat Yg Menyerahkan</label>
							</div>
							<div class="col-md-7" data-select2-id="23">
								<select id="dactranspasien_apj1Id" name="apj1Id" class="form-control form-control-sm"  >
								</select>
							</div>
						</div>
						<div class="form-group row" data-select2-id="37">
							<div class="col-md-3">
								<label class="col-form-label">Dokter Yg Menyerahkan</label>
							</div>
							<div class="col-md-7" >
								<select class="form-control form-control-sm" id="dactranspasien_dok1Id" name="dok1Id"  ></select>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Perawat Yg Menerima</label>
							</div>
							<div class="col-md-7">
								<select id="dactranspasien_apj2Id" name="apj2Id" class="form-control form-control-sm" ></select>
							</div>

						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Dokter Yg Menerima</label>
							</div>
							<div class="col-md-7">
								<select id="dactranspasien_dok2Id" name="dok2Id" class="form-control form-control-sm" ></select>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>		
		<div class="card"><!-- B (Background) -->			
			<div class="card-header" style="background-color:black;">				
				<h3 class="card-title" style="color:white;">B (Background)</h3>
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
								<label class="col-form-label">Keluhan Saat Masuk</label>
							</div>
							<div class="col-md-8">
								<textarea rows="4" name="dactranspasien_bkeluhan" id="dactranspasien_bkeluhan" style="width:100%;" class="form-control"></textarea>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Indikasi Masuk Ranap</label>
							</div>
							<div class="col-md-8">
								<textarea rows="4" name="dactranspasien_bindikasi" id="dactranspasien_bindikasi" style="width:100%;" class="form-control"></textarea>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card"><!-- A (Assesment) -->
			<div class="card-header" style="background-color:black;">				
				<h3 class="card-title" style="color:white;">A (Assesment)</h3>
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
									<select name="akeadaan" id="dactranspasien_akeadaan" class="form-control">
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
									<input type="number" onfocus="this.select();" class="form-control" id="dactranspasien_crespirasi">
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
									<input type="number" onfocus="this.select();" class="form-control" id="dactranspasien_dnadi">
									<span class="input-group-append">
										<span class="input-group-text">x/Menit</span>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label" title="Nadi">Penggunaan O2</label>
							</div>
							<div class="col-md-4">
								<div class="input-group">
									<input type="number" onfocus="this.select();" class="form-control" id="dactranspasien_po2">
									<span class="input-group-append">
										<span class="input-group-text">lt/Menit</span>
									</span>
								</div>
							</div>
							<div class="col-md-4">
								<div class="input-group">
									<span class="input-group-prepend">
										<span class="input-group-text">Via</span>
									</span>
									<input type="text" class="form-control" id="dactranspasien_po2via">
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
								<div class="input-group">
									<span class="input-group-prepend">
										<span class="input-group-text">Kiri</span>
									</span>
									<select name="epupil1" id="dactranspasien_epupil1" class="form-control">
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
									<select name="epupil2" id="dactranspasien_epupil2" class="form-control">
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
								<label class="col-form-label" title="Tensi">Tekanan Darah</label>
							</div>
							<div class="col-md-8">
								<div class="input-group">
									<input type="number" onfocus="this.select();" class="form-control" id="dactranspasien_ftensi1">
									<label class="col-form-label">/</label>
									<input type="number" onfocus="this.select();" class="form-control" id="dactranspasien_ftensi2">
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
									<input type="text" id="dactranspasien_fpalpasi" class="form-control" placeholder="Diisi jika Palpasi">
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
									<input type="number" onfocus="this.select();" class="form-control" id="dactranspasien_gsuhu">
									<span class="input-group-append">
										<span class="input-group-text">°C</span>
									</span>
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
									<input type="number" onfocus="this.select();" class="form-control" id="dactranspasien_hspo2">
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
									<select name="ireflek1" id="dactranspasien_ireflek1" class="form-control">
										<option value="1">+</option>
										<option value="2">-</option>
									</select>
									-
									<span class="input-group-prepend">
										<span class="input-group-text">Kanan</span>
									</span>
									<select name="ireflek1" id="dactranspasien_ireflek2" class="form-control">
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
									<input type="number" onfocus="this.select();" class="form-control" id="dactranspasien_jbb">
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
									<input type="number" onfocus="this.select();" class="form-control" id="dactranspasien_jtb">
									<span class="input-group-append">
										<span class="input-group-text">Cm</span>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row ">
					<div class="col-md-12">
						<div class="form-group row">
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="table table-bordered table-condensed" width="100%">
										<tbody>
											<tr>
												<td colspan="4" width="30%" style="padding:0;"><div class="row d-flex justify-content-center">
													<label class="col-form-label font-weight-bold">Glasgow Coma Scale ( GCS )</label>
												</div></td>
											</tr>
											<tr>
												<td colspan="2" width="30%" style="padding:0;">
													<div class="row d-flex justify-content-center">
														<label class="col-form-label">Kategori</label>
													</div>
												</td>
												<td width="20%" style="padding:0;">
													<div class="row d-flex justify-content-center">
														<label class="col-form-label">Skor</label>
													</div>
												</td>
												<td width="20%" style="padding:0;">
													<div class="row d-flex justify-content-center">
														<label class="col-form-label">Hasil Skor</label>
													</div>
												</td>
											</tr>
											<tr>
												<td width="20%" style="padding:0;">
													<div class="row d-flex justify-content-center">
														<label class="col-form-label">Respon Buka Mata (Eye Opening : E)</label>
													</div>
												</td>
												<td width="30%" style="padding:0;">
													<table class="table-bordered table-condensed table-hover" width="100%">
														<tbody><tr onclick="dactranspasienex_setScore(4, 1);">
															<td width="100%" style="padding:0;">
																<label class="col-form-label">&nbsp;Spontan</label>
															</td>									
														</tr>

														<tr onclick="dactranspasienex_setScore(3, 1);">
															<td style="padding:0;">
																<label class="col-form-label">&nbsp;Terhadap Suara</label>
															</td>
														</tr>
														<tr onclick="dactranspasienex_setScore(2, 1);">
															<td style="padding:0;">
																<label class="col-form-label">&nbsp;Terhadap Nyeri</label>
															</td>
														</tr>
														<tr onclick="dactranspasienex_setScore(1, 1);">
															<td style="padding:0;">
																<label class="col-form-label">&nbsp;Tidak ada</label>
															</td>
														</tr>
													</tbody></table>
												</td>
												<td width="20%" style="padding:0;">
													<table class="table-bordered table-condensed table-hover" width="100%">
														<tbody><tr onclick="dactranspasienex_setScore(4, 1);">
															<td align="center" style="padding:0;">
																<label class="col-form-label">4</label>
															</td>
														</tr>
														<tr onclick="dactranspasienex_setScore(3, 1);">
															<td align="center" style="padding:0;">
																<label class="col-form-label">3</label>
															</td>
														</tr>
														<tr onclick="dactranspasienex_setScore(2, 1);">
															<td align="center" style="padding:0;">
																<label class="col-form-label">2</label>
															</td>
														</tr>
														<tr onclick="dactranspasienex_setScore(1, 1);">
															<td align="center" style="padding:0;">
																<label class="col-form-label">1</label>
															</td>
														</tr>
													</tbody></table>
												</td>
												<td width="20%">
													<table class="table-bordered table-condensed" width="100%">
														<tbody><tr height="100%" align="center">
															<td align="center" width="100%" style="padding:0;">
																<h3><label class="col-form-label" id="dactranspasien_bgcsa">0</label></h3>
															</td>
														</tr>
													</tbody></table>
												</td>
											</tr>
											<tr>
												<td width="30%" style="padding:0;">
													<div class="row d-flex justify-content-center">
														<label class="col-form-label">Respon Motorik Terbaik (M)</label>
													</div>
												</td>
												<td width="30%" style="padding:0;">
													<table class="table-bordered table-condensed table-hover" width="100%">
														<tbody><tr onclick="dactranspasienex_setScore(6, 2);">
															<td width="100%" style="padding:0;">
																<label class="col-form-label">&nbsp;Turut Perintah</label>
															</td>
														</tr>
														<tr onclick="dactranspasienex_setScore(5, 2);">
															<td style="padding:0;">
																<label class="col-form-label">&nbsp;Melokalisir Nyeri</label>
															</td>
														</tr>
														<tr onclick="dactranspasienex_setScore(4, 2);">
															<td style="padding:0;">
																<label class="col-form-label">&nbsp;Fleksi Normal (Menarik anggota gerak yang dirangsang)</label>
															</td>
														</tr>
														<tr onclick="dactranspasienex_setScore(3, 2);">
															<td style="padding:0;">
																<label class="col-form-label">&nbsp;Fleksi Abnormal (dekortikasi)</label>
															</td>
														</tr>
														<tr onclick="dactranspasienex_setScore(2, 2);">
															<td style="padding:0;">
																<label class="col-form-label">&nbsp;Ekstensi Abnormal (deserebrasi)</label>
															</td>
														</tr>
														<tr onclick="dactranspasienex_setScore(1, 2);">
															<td style="padding:0;">
																<label class="col-form-label">&nbsp;Tanpa Ada (Flasid)</label>
															</td>
														</tr>
													</tbody></table>
												</td>
												<td width="20%" style="padding:0;">
													<table class="table-bordered table-condensed table-hover" width="100%">
														<tbody><tr onclick="dactranspasienex_setScore(6, 2);">
															<td align="center" style="padding:0;">
																<label class="col-form-label">6</label>
															</td>
														</tr>
														<tr onclick="dactranspasienex_setScore(5, 2);">
															<td align="center" style="padding:0;">
																<label class="col-form-label">5</label>
															</td>
														</tr>
														<tr onclick="dactranspasienex_setScore(4, 2);">
															<td style="padding:0;" align="center">
																<label class="col-form-label">4</label>
															</td>
														</tr>
														<tr onclick="dactranspasienex_setScore(3, 2);">
															<td style="padding:0;" align="center">
																<label class="col-form-label">3</label>
															</td>
														</tr>
														<tr onclick="dactranspasienex_setScore(2, 2);">
															<td style="padding:0;" align="center">
																<label class="col-form-label">2</label>
															</td>
														</tr>
														<tr onclick="dactranspasienex_setScore(1, 2);">
															<td style="padding:0;" align="center">
																<label class="col-form-label">1</label>
															</td>
														</tr>
													</tbody></table>
												</td>
												<td width="20%">
													<table class="table-bordered table-condensed" width="100%">
														<tbody><tr height="100%">
															<td style="padding:0;" align="center">
																<h3><label class="col-form-label" id="dactranspasien_bgcsb">0</label></h3>
															</td>
														</tr>
													</tbody></table>
												</td>
											</tr>
											<tr>
												<td style="padding:0;" width="30%">
													<div class="row d-flex justify-content-center">
														<label class="col-form-label">Respon Verbal (V)</label>
													</div>
												</td>
												<td style="padding:0;" width="30%">
													<table class="table-bordered table-condensed table-hover" width="100%">
														<tbody><tr onclick="dactranspasienex_setScore(5, 3);">
															<td style="padding:0;">
																<label class="col-form-label">&nbsp;Berorientasi Baik</label>
															</td>
														</tr>
														<tr onclick="dactranspasienex_setScore(4, 3);">
															<td style="padding:0;">
																<label class="col-form-label">&nbsp;Berbicara mengacau (bingung)</label>
															</td>
														</tr>
														<tr onclick="dactranspasienex_setScore(3, 3);">
															<td style="padding:0;">
																<label class="col-form-label">&nbsp;Kata-Kata tidak teratur</label>
															</td>
														</tr>
														<tr onclick="dactranspasienex_setScore(2, 3);">
															<td style="padding:0;">
																<label class="col-form-label">&nbsp;Suara Tidak Jelas</label>
															</td>
														</tr>
														<tr onclick="dactranspasienex_setScore(1, 3);">
															<td style="padding:0;">
																<label class="col-form-label">&nbsp;Tanpa Ada</label>
															</td>
														</tr>
													</tbody></table>
												</td>
												<td style="padding:0;" width="20%">
													<table class="table-bordered table-condensed table-hover" width="100%">
														<tbody><tr onclick="dactranspasienex_setScore(5, 3);">
															<td style="padding:0;" align="center">
																<label class="col-form-label">5</label>
															</td>
														</tr>
														<tr onclick="dactranspasienex_setScore(4, 3);">
															<td style="padding:0;" align="center">
																<label class="col-form-label">4</label>
															</td>
														</tr>
														<tr onclick="dactranspasienex_setScore(3, 3);">
															<td style="padding:0;" align="center">
																<label class="col-form-label">3</label>
															</td>
														</tr>
														<tr onclick="dactranspasienex_setScore(2, 3);">
															<td style="padding:0;" align="center">
																<label class="col-form-label">2</label>
															</td>
														</tr>
														<tr onclick="dactranspasienex_setScore(1, 3);">
															<td style="padding:0;" align="center">
																<label class="col-form-label">1</label>
															</td>
														</tr>
													</tbody></table>
												</td>
												<td width="20%">
													<table class="table-bordered table-condensed" width="100%">
														<tbody><tr height="100%">
															<td style="padding:0;" align="center">
																<h3><label class="col-form-label" id="dactranspasien_bgcsc">0</label></h3>
															</td>
														</tr>
													</tbody></table>
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
																<select name="asadar" id="dactranspasien_asadar" class="form-control">
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
													<table class="table-bordered table-condensed" width="100%">
														<tbody><tr height="100%">
															<td style="padding:0;" align="center">
																<h3><label class="col-form-label" id="dactranspasien_bgcstot">0</label></h3>
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
					<div class="col-md-6">
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Nyeri</label>
							</div>
							<div class="col-md-3" id="dactranspasien_cnyeriId">
								<div class="custom-control custom-checkbox custom-control-inline">
									<input name="dactranspasien_cnyeriId" value="1" type="radio" class="custom-control-input" id="dactranspasien_cnyeriId_1">
									<label class="custom-control-label" for="dactranspasien_cnyeriId_1">Tidak</label>
								</div>
								<div class="custom-control custom-checkbox custom-control-inline">
									<input name="dactranspasien_cnyeriId" value="2" type="radio" class="custom-control-input" id="dactranspasien_cnyeriId_2" checked>
									<label class="custom-control-label" for="dactranspasien_cnyeriId_2">Ya</label>
								</div>
							</div>
							<div class="col-md-2">
								<label class="col-form-label" id="dactranspasien_lnyeri">Skala Nyeri</label>
							</div>
							<div class="col-md-3">
								<select name="asadar" id="dactranspasien_nyeri" class="form-control">
									<option value="0">0</option>
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
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Risiko Jatuh</label>
							</div>
							<div class="col-md-9" id="dactranspasien_dcederahasilId">
								<div class="custom-control custom-checkbox custom-control-inline">
									<input name="dactranspasien_dcederahasilId" value="1" type="radio" class="custom-control-input" id="dactranspasien_dcederahasilId_1">
									<label class="custom-control-label" for="dactranspasien_dcederahasilId_1">Tidak Berisiko</label>
								</div>
								<div class="custom-control custom-checkbox custom-control-inline">
									<input name="dactranspasien_dcederahasilId" value="2" type="radio" class="custom-control-input" id="dactranspasien_dcederahasilId_2">
									<label class="custom-control-label" for="dactranspasien_dcederahasilId_2" checked>Risiko Rendah</label>
								</div>
								<div class="custom-control custom-checkbox custom-control-inline">
									<input name="dactranspasien_dcederahasilId" value="3" type="radio" class="custom-control-input" id="dactranspasien_dcederahasilId_3">
									<label class="custom-control-label" for="dactranspasien_dcederahasilId_3">Risiko Tinggi</label>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Terapi / Tindakan Medis Yang Sudah Diberikan</label>
							</div>
							<div class="col-md-8">
								<textarea rows="4" name="dactranspasien_cterapi" id="dactranspasien_cterapi" style="width:100%;" class="form-control"></textarea>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group row">
							<div class="col-md-12">
								<label class="col-form-label">Pemeriksaan Penunjang yang Sudah Dilakukan :</label>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">1. Laboratorium</label>
							</div>
							<div class="col-md-6" id="dactranspasien_plab">
								<div class="custom-control custom-checkbox custom-control-inline">
									<input onclick="document.getElementById('dactranspasien_div_plab').style.display='none'" name="dactranspasien_plab" value="0" type="radio" class="custom-control-input" id="dactranspasien_plab_1" checked>
									<label class="custom-control-label" for="dactranspasien_plab_1">Tidak</label>
								</div>
								<div class="custom-control custom-checkbox custom-control-inline">
									<input onclick="document.getElementById('dactranspasien_div_plab').style.display='block'" name="dactranspasien_plab" value="1" type="radio" class="custom-control-input" id="dactranspasien_plab_2">
									<label class="custom-control-label" for="dactranspasien_plab_2">Ya</label>
								</div>
							</div>
						</div>
						<div class="form-group row" id="dactranspasien_div_plab" style="display: none;">
							<div class="col-md-3"></div>
							<div class="col-md-3">
								<label class="col-form-label">DPJP Sudah Terinfo</label>
							</div>
							<div class="col-md-6" id="dactranspasien_plabterinfo">
								<div class="custom-control custom-checkbox custom-control-inline">
									<input name="dactranspasien_plabterinfo" value="1" type="radio" class="custom-control-input" id="dactranspasien_plabterinfo_1">
									<label class="custom-control-label" for="dactranspasien_plabterinfo_1">Tidak</label>
								</div>
								<div class="custom-control custom-checkbox custom-control-inline">
									<input name="dactranspasien_plabterinfo" value="2" type="radio" class="custom-control-input" id="dactranspasien_plabterinfo_2">
									<label class="custom-control-label" for="dactranspasien_plabterinfo_2">Ya</label>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">2. Radiologi</label>
							</div>
							<div class="col-md-6" id="dactranspasien_prad">
								<div class="custom-control custom-checkbox custom-control-inline">
									<input onclick="document.getElementById('dactranspasien_div_prad').style.display='none'" name="dactranspasien_prad" value="0" type="radio" class="custom-control-input" id="dactranspasien_prad_1" checked>
									<label class="custom-control-label" for="dactranspasien_prad_1">Tidak</label>
								</div>
								<div class="custom-control custom-checkbox custom-control-inline">
									<input onclick="document.getElementById('dactranspasien_div_prad').style.display='block'" name="dactranspasien_prad" value="1" type="radio" class="custom-control-input" id="dactranspasien_prad_2">
									<label class="custom-control-label" for="dactranspasien_prad_2">Ya</label>
								</div>
							</div>
						</div>
						<div class="form-group row" id="dactranspasien_div_prad" style="display: none;">
							<div class="col-md-3"></div>
							<div class="col-md-3">
								<label class="col-form-label">DPJP Sudah Terinfo</label>
							</div>
							<div class="col-md-6" id="dactranspasien_pradterinfo">
								<div class="custom-control custom-checkbox custom-control-inline">
									<input name="dactranspasien_pradterinfo" value="1" type="radio" class="custom-control-input" id="dactranspasien_pradterinfo_1">
									<label class="custom-control-label" for="dactranspasien_pradterinfo_1">Tidak</label>
								</div>
								<div class="custom-control custom-checkbox custom-control-inline">
									<input name="dactranspasien_pradterinfo" value="2" type="radio" class="custom-control-input" id="dactranspasien_pradterinfo_2">
									<label class="custom-control-label" for="dactranspasien_pradterinfo_2">Ya</label>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">3. EKG</label>
							</div>
							<div class="col-md-6" id="dactranspasien_pekg">
								<div class="custom-control custom-checkbox custom-control-inline">
									<input onclick="document.getElementById('dactranspasien_div_pekg').style.display='none'" name="dactranspasien_pekg" value="0" type="radio" class="custom-control-input" id="dactranspasien_pekg_1" checked>
									<label class="custom-control-label" for="dactranspasien_pekg_1">Tidak</label>
								</div>
								<div class="custom-control custom-checkbox custom-control-inline">
									<input onclick="document.getElementById('dactranspasien_div_pekg').style.display='block'" name="dactranspasien_pekg" value="1" type="radio" class="custom-control-input" id="dactranspasien_pekg_2">
									<label class="custom-control-label" for="dactranspasien_pekg_2">Ya</label>
								</div>
							</div>
						</div>
						<div class="form-group row" id="dactranspasien_div_pekg" style="display: none;">
							<div class="col-md-3"></div>
							<div class="col-md-3">
								<label class="col-form-label">DPJP Sudah Terinfo</label>
							</div>
							<div class="col-md-6" id="dactranspasien_pekgterinfo">
								<div class="custom-control custom-checkbox custom-control-inline">
									<input name="dactranspasien_pekgterinfo" value="1" type="radio" class="custom-control-input" id="dactranspasien_pekgterinfo_1">
									<label class="custom-control-label" for="dactranspasien_pekgterinfo_1">Tidak</label>
								</div>
								<div class="custom-control custom-checkbox custom-control-inline">
									<input name="dactranspasien_pekgterinfo" value="2" type="radio" class="custom-control-input" id="dactranspasien_pekgterinfo_2">
									<label class="custom-control-label" for="dactranspasien_pekgterinfo_2">Ya</label>
								</div>
							</div>
							<div class="col-md-3"></div>
							<div class="col-md-8 d-none">
								<textarea rows="2" name="dactranspasien_cpenunjangekg" id="dactranspasien_cpenunjangekg" style="width:100%;" class="form-control"></textarea>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">4. Lainnya</label>
							</div>
							<div class="col-md-6" id="dactranspasien_plain">
								<div class="custom-control custom-checkbox custom-control-inline">
									<input onclick="document.getElementById('dactranspasien_div_plain').style.display='none'" name="dactranspasien_plain" value="1" type="radio" class="custom-control-input" id="dactranspasien_plain_1" checked>
									<label class="custom-control-label" for="dactranspasien_plain_1">Tidak</label>
								</div>
								<div class="custom-control custom-checkbox custom-control-inline">
									<input onclick="document.getElementById('dactranspasien_div_plain').style.display='block'" name="dactranspasien_plain" value="2" type="radio" class="custom-control-input" id="dactranspasien_plain_2">
									<label class="custom-control-label" for="dactranspasien_plain_2">Ya</label>
								</div>
							</div>
						</div>
						<div class="form-group row" id="dactranspasien_div_plain" style="display: none;">
							<div class="col-md-3"></div>
							<div class="col-md-8">
								<textarea rows="2" name="dactranspasien_cpenunjanglain" id="dactranspasien_cpenunjanglain" style="width:100%;" class="form-control"></textarea>
							</div>
							<div class="col-md-3"></div>
							<div class="col-md-3">
								<label class="col-form-label">DPJP Sudah Terinfo</label>
							</div>
							<div class="col-md-6" id="dactranspasien_plainterinfo">
								<div class="custom-control custom-checkbox custom-control-inline">
									<input name="dactranspasien_plainterinfo" value="1" type="radio" class="custom-control-input" id="dactranspasien_plainterinfo_1">
									<label class="custom-control-label" for="dactranspasien_plainterinfo_1">Tidak</label>
								</div>
								<div class="custom-control custom-checkbox custom-control-inline">
									<input name="dactranspasien_plainterinfo" value="2" type="radio" class="custom-control-input" id="dactranspasien_plainterinfo_2">
									<label class="custom-control-label" for="dactranspasien_plainterinfo_2">Ya</label>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card "><!-- R (Recommendation) -->		
			<div class="card-header" style="background-color:black;">				
				<h3 class="card-title" style="color:white;">R (Recommendation)</h3>
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
								<label class="col-form-label">Konsul DPJP</label>
							</div>
							<div class="col-md-7">
								<select id="dactranspasien_ddokkon" name="ddokkon" class="form-control form-control-sm"></select>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">DPJP Sudah Terhubung</label>
							</div>
							<div class="row col-md-6" id="dactranspasien_dsambung">
								<div class="custom-control custom-checkbox custom-control-inline">
									<input onclick="document.getElementById('dactranspasien_div_dsambung1').style.display='none'" name="dactranspasien_dsambung" value="1" type="radio" class="custom-control-input" id="dactranspasien_dsambung_1" checked>
									<label class="custom-control-label" for="dactranspasien_dsambung_1">Tidak</label>
								</div>
								<div class="custom-control custom-checkbox custom-control-inline">
									<input onclick="document.getElementById('dactranspasien_div_dsambung1').style.display='block'" name="dactranspasien_dsambung" value="2" type="radio" class="custom-control-input" id="dactranspasien_dsambung_2">
									<label class="custom-control-label" for="dactranspasien_dsambung_2">Ya</label>
								</div>
							</div>
							<div class="col-md-2" id="dactranspasien_div_dsambung1" style="display:none;">
								<div class="input-group date" id="dactranspasien_djamsambung" data-target-input="nearest">
									<input id="dactranspasien_jamsambung" name="jamsambung" type="time" class="form-control form-control-sm" >
								</div>
							</div>
						</div>
						<div class="form-group row" id="dactranspasien_div_dsambung2" style="">
							<div class="col-md-3">
								<label class="col-form-label">&nbsp;</label>
							</div>
							<div class="row col-md-6" id="dactranspasien_dsambungpilih">
								<div class="custom-control custom-checkbox custom-control-inline">
									<input onclick="document.getElementById('dactranspasien_div_dsambungpilih').style.display='none'" name="dactranspasien_dsambungpilih" value="1" type="radio" class="custom-control-input" id="dactranspasien_dsambungpilih_1" checked>
									<label class="custom-control-label" for="dactranspasien_dsambungpilih_1">Telepon</label>
								</div>
								<div class="custom-control custom-checkbox custom-control-inline">
									<input onclick="document.getElementById('dactranspasien_div_dsambungpilih').style.display='none'" name="dactranspasien_dsambungpilih" value="2" type="radio" class="custom-control-input" id="dactranspasien_dsambungpilih_2">
									<label class="custom-control-label" for="dactranspasien_dsambungpilih_2">Whats App</label>
								</div>
								<div class="custom-control custom-checkbox custom-control-inline">
									<input onclick="document.getElementById('dactranspasien_div_dsambungpilih').style.display='block'" name="dactranspasien_dsambungpilih" value="3" type="radio" class="custom-control-input" id="dactranspasien_dsambungpilih_3">
									<label class="custom-control-label" for="dactranspasien_dsambungpilih_3">Lain-lain</label>
								</div>
							</div>
						</div>
						<div class="form-group row" id="dactranspasien_div_dsambungpilih" style="display:none;">
							<div class="col-md-3">
								<label class="col-form-label">&nbsp;</label>
							</div>
							<div class="col-md-8">
								<input type="text" class="form-control" id="dactranspasien_dsambungpilihket" maxlength="100">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Advis dari DPJP</label>
							</div>
							<div class="row col-md-6" id="dactranspasien_dadvis">
								<div class="custom-control custom-checkbox custom-control-inline">
									<input onclick="document.getElementById('dactranspasien_div_dadvis2').style.display='block'" name="dactranspasien_dadvis" value="0" type="radio" class="custom-control-input" id="dactranspasien_dadvis_1">
									<label class="custom-control-label" for="dactranspasien_dadvis_1">Sudah Ada</label>
								</div>
								<div class="custom-control custom-checkbox custom-control-inline">
									<input onclick="document.getElementById('dactranspasien_div_dadvis2').style.display='none'" name="dactranspasien_dadvis" value="1" type="radio" class="custom-control-input" id="dactranspasien_dadvis_2" checked>
									<label class="custom-control-label" for="dactranspasien_dadvis_2">Belum Ada</label>
								</div>
							</div>
							<div class="col-md-2" id="dactranspasien_div_dadvis1" style="display:none;">
								<div class="input-group date" id="dactranspasien_djamadvis" data-target-input="nearest">
									<input id="dactranspasien_jamadvis" name="jamadvis" type="time" class="form-control" >
									<div class="input-group-append" data-target="#dactranspasien_djamadvis" data-toggle="datetimepicker">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row" id="dactranspasien_div_dadvis2">
							<div class="col-md-3">
								<label class="col-form-label">&nbsp;</label>
							</div>
							<div class="col-md-8">
								<input type="text" class="form-control" id="dactranspasien_ketadvis" maxlength="100">
							 <!-- <textarea rows="2" th:name="${ccm+'_ketadvis'}" th:id="${ccm+'_ketadvis'}" 
							 	style="width:100%;" class="form-control"></textarea> -->
							 </div>
							</div>
							<div class="form-group row">
								<div class="col-md-3">
									<label class="col-form-label">Rencana Terapi</label>
								</div>
								<div class="col-md-8">
									<textarea rows="4" name="dactranspasien_drencanaterapi" id="dactranspasien_drencanaterapi" style="width:100%;" class="form-control"></textarea>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group row">
								<div class="col-md-3">
									<label class="col-form-label">Rencana Tindakan</label>
								</div>
								<div class="col-md-8">
									<textarea rows="4" name="dactranspasien_drencanatindakan" id="dactranspasien_drencanatindakan" style="width:100%;" class="form-control"></textarea>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-3">
									<label class="col-form-label">Hal-Hal Yang Diperhatikan</label>
								</div>
								<div class="col-md-8">
									<textarea rows="4" name="dactranspasien_dhal" id="dactranspasien_dhal" style="width:100%;" class="form-control"></textarea>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-3"></div>
								<div class="col-md-3"></div>
								<div class="col-md-3"></div>
								<div class="col-md-3" style="padding-block-start: 50px;">
									<button type="submit" class="btn btn-primary btn-lg me-md-2" id="" onclick="saveSerTerPas()" ><i class="fas fa-save"></i> Save</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">

		$(document).ready(function() {
			var nowday       = "<?php echo date('Y-m-d') ?>";
			var no_rm 		 =	document.getElementById('rmermirna').value ;
			var nama 		 = document.getElementById('namaermirna').value;
			var unit 		 = document.getElementById('unitermirna').value;
			var id_kunjungan = document.getElementById('idKunjunganermirna').value;
			var id_unit      = document.getElementById('idunitermirna').value;
			var transaksi    = document.getElementById('transaksiermirna').value;
			var alamat       = document.getElementById('alamatermirna').value;
			var id_kunjungan = document.getElementById('profilepasienirna').value;
			tampil_dok_all();
			tampil_ruanganlama(id_kunjungan);			
			tampil_spesial();
			tampil_dok_awal(id_unit);
			tampil_rawat_awal(id_unit);
			viewtandavitalserahterima(no_rm,unit,id_kunjungan,id_unit,nama,transaksi);
			document.getElementById('dactranspasien_atgl').value=nowday;


		})
		function tampilPasienermirna(no_rm,unit,id_kunjungan,id_unit,nama,transaksi,tgl_lahir,alamat,id_pegawai) {
			$('#modallistpasienirna').modal('hide');
			$('.tab-empty').hide();

			showDetailDataPasienIrna();
			document.getElementById('rmermirna').value          =no_rm;
			document.getElementById('namaermirna').value        =nama;
			document.getElementById('unitermirna').value        =unit;
			document.getElementById('idKunjunganermirna').value =id_kunjungan;
			document.getElementById('idunitermirna').value      =id_unit;
			document.getElementById('transaksiermirna').value   =transaksi;
			document.getElementById('alamatermirna').value      =alamat;
			document.getElementById('profilepasienirna').value  =id_kunjungan;
			data.namas    =nama;
			data.norms    =no_rm;
			data.units    =unit;
			data.id_units =id_unit;
			data.id_kunjungans=id_kunjungan;
			alamatpasien  =alamat;
			tgllahir      =tgl_lahir;
			tampil_dok_all();
			tampil_ruanganlama(id_kunjungan);			
			tampil_spesial();
			tampil_dok_awal(id_unit);
			tampil_rawat_awal(id_unit);
			viewtandavitalserahterima(no_rm,unit,id_kunjungan,id_unit,nama,transaksi);

		}
		function refresh_listserahterimapasien() {
			$('#listserahterimapasien_loadingawal').hide();
		}
		function listpasienermirna(){  
			var listParam = [
				'searchPxRmserahterimapasien'
				];
			var param = {
				user    : user['id_user'],
				norm    : document.getElementById('searchPxRmserahterimapasien').value,
	//nmpasien: document.getElementById('RWJERMnmlistermirna').value
			};
			apiPOST("Rekammedisirna/listpasien", param, hasil => {   
				$('#listserahterimapasien').html('');
				if (hasil['data'] !== null) {
					if (hasil['code'] == 'XX') {
						toastr.error("Data tidak ditemukan");
						var Baris = "";
						Baris += '<div class="col-sm-12">';
						Baris += '<div class="small-box bg-danger">';
						Baris += '<div class="inner p-1" style="text-align:center;">';
						Baris += '<h6><i class="fa fa-times"></i> Data Tidak Ditemukan</h6>';
						Baris += '</div>';
						Baris += '</div>';
						Baris += '</div>';

						$('#listserahterimapasien').append(Baris);
						document.getElementById('searchPxRmserahterimapasien').value = '';
					}else{
						var Baris = "";
						var a = hasil['data'];
						for (var i = 0; i < a.length; i++) {
							var tglkunj   = a[i].tgl_masuk;
							var transaksi   = a[i].id_transaksi;
							var norm      = a[i].no_rm;
							var nama      = a[i].nama;
							var alamat    = a[i].alamat;
							var umur      = a[i].tgl_lahir;
							var penjamin  = a[i].nama_penjamin;
							var sep       = a[i].no_sjp;
							var telp      = a[i].telepon;
							var unit      = a[i].nama_unit;
							var kunjungan = a[i].id_kunjungan;
							var id_unit   = a[i].id_unit;
							var nama_unit = a[i].nama_unit;
							var soap      = a[i].soap;
							var tgl_lahir = a[i].tgl_lahir;

							Baris += '<div class="col-lg-3 col-6">';
							if (soap>''){
								Baris += '<div class="small-box btn-info" style="border: solid 2px darkblue;">';
							}else{
								Baris += '<div class="small-box btn-secondary-default" style="border: solid 2px darkred;">';
							}
							Baris += '<div class="inner p-1">';
							Baris += '<h6><strong>'+norm+'</strong> / '+ nama +'</h6>';
							Baris += '<p class="p-0 mb-1">'+alamat+'</p>';
							Baris += '<p class="p-0"><strong><i>'+nama_unit+'</i></strong></p>';
							Baris += '</div>';
							Baris += '<div class="icon">';
							Baris += '<i class="fa fa-user"></i>';
							Baris += '</div>';
							Baris += '<a href="#" class="small-box-footer" style="background-color: darkgreen;" onclick="tampilserahterimaermirna('+"'"+norm+"','"+unit+"','"+kunjungan+"','"+id_unit+"','"+nama+"','"+transaksi+"','"+tgl_lahir+"','"+alamat+"'"+')">Klik Detail <i class="fas fa-arrow-circle-right"></i></a>';
							Baris += '</div>';
							Baris += '</div>';
						}
						$('#listserahterimapasien').append(Baris);
					}       
				}
			});  
		};
		function tampilserahterimaermirna(norm,unit,id_kunjungan,id_unit,nama,transaksi,tgl_lahir,alamat) {
			document.getElementById('divserahterima').style.display='block';
		//document.getElementById('infopasienirna').style.display='block';
			document.getElementById('Divcardlistserahterimapasien').style.display='none';
			document.getElementById('listserahterimapasien').style.display='none';
			document.getElementById('dactranspasien_id').value      	=norm;
			document.getElementById('dactranspasien_mt').value          =transaksi;
			document.getElementById('dackunjunganpasien_mt').value      =id_kunjungan;
			tampil_ruanganlama(id_kunjungan);			
			tampil_spesial();
			tampil_dok_awal(id_unit);
			tampil_rawat_awal(id_unit);
			viewtandavitalserahterima(norm,unit,id_kunjungan,id_unit,nama,transaksi);
/*			document.getElementById('namaermirna').value    	=nama;
		document.getElementById('unitermirna').value     	=unit;
		document.getElementById('idKunjunganermirna').value=id_kunjungan;
		document.getElementById('idunitermirna').value  	=id_unit;
		tampil_spskamar(unit);			
		aktifPaintCOncent();
		LabKimiaKlinisIrna();
		RadXRirna();
		RadCTScanirna();
		RadULirna();
		historipenyakitermirna();
		historialergiirna();
		historipenyakitkeluarga();*/
		}

		function tampil_spskamar() {
			apiPOST('Data_Sosial/spesialisasikamar', null, hasil => {
				var sps = "<option value=''> Pilih Spesialisasi </option>";
				var a = hasil['data'];
				for (var i = 0; i < a.length; i++) {
					sps += '<option value="' + a[i]['id_spesialisasi_kamar'] + '">' + a[i]['nama_spesialisasi_kamar'] + '</option>';
				}
				document.getElementById('rwi_sps_kam').innerHTML = sps;
			});
		}
		function tampil_ruanganlama(id_kunjungan){
			apiPOST('Rekammedisirna/Ruangan', id_kunjungan, hasil => {
				var ruang = "";
				var a = hasil['data'];
				for (var i = 0; i < a.length; i++) {
					ruang += '<option value="' + a[i]['id_unit'] + '">' + a[i]['nama_kamar'] + '</option>';
				}
				document.getElementById('dactranspasien_aruang1').innerHTML = ruang;
			})
		}
		function tampil_spesial(){
			apiPOST('Setup/getSpesialisasi', null, hasil => {
				var ruang = "<option value=''> - Silahkan Pilih -</option>";
				var a = hasil['data'];
				for (var i = 0; i < a.length; i++) {
					ruang += '<option value="' + a[i]['id_spesialisasi_kamar'] + '">' + a[i]['nama_spesialisasi_kamar'] + '</option>';
				}
				document.getElementById('serahterima_sps_kam').innerHTML = ruang;
			})
		}
		function tampil_serahterimarwiunit() {
			var param = {
				id: $("#serahterima_sps_kam").val(),

			};
			apiPOST('Data_Sosial/unitsps', param, hasil => {
				var unit = "<option value=''> *Pilih </option>";
				var a = hasil['data'];
				for (var i = 0; i < a.length; i++) {
					unit += '<option value="' + a[i]['id_unit'] + '">' + a[i]['nama_unit'] + '</option>';
				}
				document.getElementById('rwiserahterimakd_unit').innerHTML = unit;
			});
		}
		function tampil_rwiserahterimaruang() {
			var param = {
				id: $("#rwiserahterimakd_unit").val(),
				id2: $("#serahterima_sps_kam").val(),
			};
			apiPOST('Data_Sosial/ruangsps', param, hasil => {
				var ruang = "<option value=''> *Pilih </option>";
				var a = hasil['data'];
				for (var i = 0; i < a.length; i++) {
					ruang += '<option value="' + a[i]['id_ruang'] + '">' + a[i]['nama_ruang'] + '</option>';
				}
				document.getElementById('rwiserahterimatr_ruang').innerHTML = ruang;
				tampil_dok_akhir($("#rwiserahterimakd_unit").val());
				tampil_rawat_akhir($("#rwiserahterimakd_unit").val());
			});
		}
		function tampil_rwiserahterimakamar() {
			var param = {
				id: $("#rwiserahterimatr_ruang").val(),
				id_unit: $("#rwiserahterimakd_unit").val(),
			};
			apiPOST('Data_Sosial/kamarsps', param, hasil => {
				var kamar = "<option value=''> *Pilih </option>";
				var a = hasil['data'];
				for (var i = 0; i < a.length; i++) {
					kamar += '<option value="' + a[i]['id_kamar'] + '">' + a[i]['nama_kamar'] + '  ( ' + a[i]['sisa'] + ' )</option>';
				}
				document.getElementById('serahterimaid_kamar').innerHTML = kamar;
			});
		}
		$('#serahterimaid_kamar').on('change', function() {
			var id_kamar = ($(this).find(":selected").val());
			var param = {
				id: id_kamar,
			};
			apiPOST('Rawat_inap/cekketersediaankamar', param, hasil => {
				var ruang = "";
				var a = hasil['data'];
				for (var i = 0; i < a.length; i++) {
					if (a[i]['sisa'] <= 0) {
						tampil_rwipendfkamar();
						alert('Kamar Penuh' + a[i]['sisa']);
					}
				}
  // document.getElementById('rwipendftr_ruang').innerHTML = ruang;
			});
		});

		function tampil_rawat_awal(param){
			apiPOST('Rekammedisirna/searchPerawat', param, hasil => {
				var sus = "<option value=''> - Silahkan Pilih -</option>";
				var a = hasil['data'];
				for (var i = 0; i < a.length; i++) {
					sus += '<option value="' + a[i]['id_pegawai'] + '">' + a[i]['nama_pegawai'] + '</option>';
				}
				document.getElementById('dactranspasien_apj1Id').innerHTML = sus;
			})
		}
		function tampil_rawat_akhir(param){
			apiPOST('Rekammedisirna/searchPerawat', param, hasil => {
				var sus = "<option value=''> - Silahkan Pilih -</option>";
				var a = hasil['data'];
				for (var i = 0; i < a.length; i++) {
					sus += '<option value="' + a[i]['id_pegawai'] + '">' + a[i]['nama_pegawai'] + '</option>';
				}
				document.getElementById('dactranspasien_apj2Id').innerHTML = sus;
			})
		}
		function tampil_dok_awal(param){
			apiPOST('Rekammedisirna/searchDokter', param, hasil => {
				var dok = "<option value=''> - Silahkan Pilih -</option>";
				var a = hasil['data'];
				for (var i = 0; i < a.length; i++) {
					dok += '<option value="' + a[i]['id_pegawai'] + '">' + a[i]['nama_pegawai'] + '</option>';
				}
				document.getElementById('dactranspasien_dok1Id').innerHTML = dok;
			})
		}
		function tampil_dok_akhir(param){
			apiPOST('Rekammedisirna/searchDokter', param, hasil => {
				var dok = "<option value=''> - Silahkan Pilih -</option>";
				var a = hasil['data'];
				for (var i = 0; i < a.length; i++) {
					dok += '<option value="' + a[i]['id_pegawai'] + '">' + a[i]['nama_pegawai'] + '</option>';
				}
				document.getElementById('dactranspasien_dok2Id').innerHTML = dok;
			})
		}
		function tampil_dok_all(){
			apiPOST('Setup/getDokter', null, hasil => {
				var dok = "<option value=''> - Silahkan Pilih -</option>";
				var a = hasil['data'];
				for (var i = 0; i < a.length; i++) {
					dok += '<option value="' + a[i]['id_pegawai'] + '">' + a[i]['nama_pegawai'] + '</option>';
				}
				document.getElementById('dactranspasien_ddokkon').innerHTML = dok;
			})
		}

		function dactranspasienex_setScore(a, b){
			switch(b){
			case 1:
				document.getElementById('dactranspasien_bgcsa').innerHTML=a;
				break;
			case 2:
				document.getElementById('dactranspasien_bgcsb').innerHTML=a;
				break;
			case 3:
				document.getElementById('dactranspasien_bgcsc').innerHTML=a;
				break;
			default:
			}
			hitungserahtrima();
		}
		function hitungserahtrima() {
			var a=document.getElementById('dactranspasien_bgcsa').innerHTML;
			var b=document.getElementById('dactranspasien_bgcsb').innerHTML;
			var c=document.getElementById('dactranspasien_bgcsc').innerHTML;

			total=parseInt(a) + parseInt(b) + parseInt(c);
			document.getElementById('dactranspasien_bgcstot').innerHTML=total;
		}

		function saveSerTerPas(){
			if($('input[name=dactranspasien_plab]:checked').val()=='1'){
				labo=$('input[name=dactranspasien_plabterinfo]:checked').val();
			}else{labo=$('input[name=dactranspasien_plab]:checked').val();}
			if($('input[name=dactranspasien_prad]:checked').val()=='1'){
				radio=$('input[name=dactranspasien_pradterinfo]:checked').val();
			}else{radio=$('input[name=dactranspasien_prad]:checked').val()}
			if($('input[name=dactranspasien_pekg]:checked').val()=='1'){
				ekg=$('input[name=dactranspasien_pekgterinfo]:checked').val();
			}else{ekg=$('input[name=dactranspasien_pekg]:checked').val()}
			if($('input[name=dactranspasien_plain]:checked').val()=='1'){
				lain=$('input[name=dactranspasien_plainterinfo]:checked').val();
			}else{lain=$('input[name=dactranspasien_plain]:checked').val()}
			if($('input[name=dactranspasien_dsambung]:checked').val()=='1'){
				hub=$('#dactranspasien_jamsambung').val();
			}else{hub=$('input[name=dactranspasien_dsambung]:checked').val()}
			if($('input[name=dactranspasien_dsambungpilih]:checked').val()=='1'){
				via=$('#dactranspasien_dsambungpilihket').val();
			}else{via=$('input[name=dactranspasien_dsambungpilih]:checked').val()}
			if($('input[name=dactranspasien_dadvis]:checked').val()=='1'){
				adv=$('#dactranspasien_ketadvis').val();
			}else{adv=$('input[name=dactranspasien_dadvis]:checked').val()}
			var param = {
				unittujuan 	:$('#rwiserahterimakd_unit').val(),
				norm 		:$('#rmermirna').val(),
				transaksi 	:$('#transaksiermirna').val(),
				kunjungan 	:$('#idKunjunganermirna').val(),
				diagnosa 	:$('#dactranspasien_adiag').val(),
				level 		:$('#dactranspasien_level').val(),
				asal 		:$('#dactranspasien_aruang1').val(),
				id_kamar 	:$('#serahterimaid_kamar').val(),
				tgl_pindah 	:$('#dactranspasien_atgl').val(),
				rawat_serah :$('#dactranspasien_apj1Id').val(),
				dok_serah 	:$('#dactranspasien_dok1Id').val(),
				rawat_terima:$('#dactranspasien_apj2Id').val(),
				dok_terima 	:$('#dactranspasien_dok2Id').val(),
				keluhan 	:$('#dactranspasien_bkeluhan').val(),
				indikasi 	:$('#dactranspasien_bindikasi').val(),
				konsul 		:$('#dactranspasien_ddokkon').val(),
				hub_dpjb 	:hub,
				hub_via 	:via,
				advis:adv,
				dpjpterkonfim:$('input[name=dactranspasien_dsambung]:checked').val(),
				respon_advis:$('input[name=dactranspasien_dadvis]:checked').val(),
				terapi:$('#dactranspasien_drencanaterapi').val(),
				tindakan:$('#dactranspasien_drencanatindakan').val(),
				perhatikan:$('#dactranspasien_dhal').val(),
				keadaan:$('#dactranspasien_akeadaan').val(),
				respirasi:$('#dactranspasien_crespirasi').val(),
				nadi:$('#dactranspasien_dnadi').val(),
				spo2:$('#dactranspasien_hspo2').val(),
				pupil_kiri:$('#dactranspasien_epupil1').val(),
				tensi1:$('#dactranspasien_ftensi1').val(),
				suhu:$('#dactranspasien_gsuhu').val(),
				cahaya_kiri:$('#dactranspasien_ireflek1').val(),
				berat:$('#dactranspasien_jbb').val(),
				tinggi:$('#dactranspasien_jtb').val(),

				skor_sadar:document.getElementById('dactranspasien_bgcstot').innerHTML,
				tipe_sadar:$('#dactranspasien_asadar').val(),
				pupil_kanan:$('#dactranspasien_epupil2').val(),
				cahaya_kanan:$('#dactranspasien_ireflek2').val(),
				tensi2:$('#dactranspasien_ftensi2').val(),
				palpasi:$('#dactranspasien_fpalpasi').val(),

				o2:$('#dactranspasien_po2').val(),
				o2_via:$('#dactranspasien_po2via').val(),
				nyeri:$('input[name=dactranspasien_cnyeriId]:checked').val(),
				skala_nyeri:$('#dactranspasien_nyeri').val(),
				jatuh:$('input[name=dactranspasien_dcederahasilId]:checked').val(),
				tindakan:$('#dactranspasien_cterapi').val(),
				lab:labo,
				rad:radio,
				ekg:ekg,
				lainnya:lain,
				unit:$('#dactranspasien_cpenunjanglain').val(),
			}
			apiPOST('List_erm_irna/saveserahterima', param, hasil => {
			})
		}

		function viewtandavitalserahterima(norm,unit,id_kunjungan,id_unit,nama,transaksi) {
			var param = {
				norm: norm,
			};

			apiPOST('Rekammedisirna/viewtandavital', param, hasil => {
				var x = hasil['data']; 

				document.getElementById('dactranspasien_akeadaan').value = x.keadaan_umum;
				document.getElementById('dactranspasien_crespirasi').value = x.respirasi;
				document.getElementById('dactranspasien_dnadi').value = x.nadi;
				document.getElementById('dactranspasien_hspo2').value = x.spo2;
				document.getElementById('dactranspasien_epupil1').value = x.pupil_kiri;
				document.getElementById('dactranspasien_epupil2').value = x.pupil_kanan;
				document.getElementById('dactranspasien_ftensi1').value = x.tekanan_darah1;
				document.getElementById('dactranspasien_ftensi2').value = x.tekanan_darah2;
				document.getElementById('dactranspasien_fpalpasi').value = x.palpasi;
				document.getElementById('dactranspasien_gsuhu').value = x.suhu;
				document.getElementById('dactranspasien_jbb').value = x.bb;
				document.getElementById('dactranspasien_jtb').value = x.tinggi_badan;

			})
		}
	</script>
