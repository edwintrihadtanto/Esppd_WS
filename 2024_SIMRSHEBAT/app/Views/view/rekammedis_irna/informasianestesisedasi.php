<div class="card card-outline card-danger">
  
	<div class="card-body p-2 darkgrey-custom" id='Divsearchinfoanes'>
		<div class="row">
			<div class="col-sm-4">
				<div class="form-group ">
					<label>Cari No. RM / Nama Pasien :</label>            
					<input type="search" id="normpas_infoanes" class="form-control form-control" placeholder="Entry RM..." autocomplete="off">
					<button class="btn btn-primary" onclick="loadlistPas()">Cari</button>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="card-body p-2 darkgrey-custom" id="DivPreoperasi">
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
					<div class="col-md-6">
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">ID</label>
							</div>
							<div class="col-md-4">
								<input id="dacinformasisedasi_id" name="id" type="text" class="form-control" readonly="readonly">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3  text-truncate">
								<label class="col-form-label">Tanggal</label>
							</div>
							<div class="col-md-4">
								<div class="input-group date" id="dacinformasisedasi_datgl">
								  <input id="dacinformasisedasi_atgl" name="atgl" type="date" class="form-control">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Dokter Pelaksana Tindakan</label>
							</div>
							<div class="col-md-7">
								<select id="dacinformasisedasi_apj1Id" name="apj1Id" class="form-control" ></select>
							</div>
							<div class="col-md-2">
								<button id="dacinformasisedasi_btpj1def" class="btn btn-warning" type="button" title="Default PJ">
									&nbsp;<i class="fas fa-undo"></i>&nbsp;
								</button>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Pemberi Informasi</label>
							</div>
							<div class="col-md-7">
								<select id="dacinformasisedasi_apj2Id" name="apj2Id" class="form-control"></select>
							</div>
							<div class="col-md-2">
								<button id="dacinformasisedasi_btpj2def" class="btn btn-warning" type="button" title="Default PJ">
									&nbsp;<i class="fas fa-undo"></i>&nbsp;
								</button>
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
								<b><label class="col-form-label">TANDAI ( ✓ )</label></b>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">1. Diagnosis (WD &amp; DD)</label>
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
										<div class="row" id="dacinformasisedasi_tindakanId">
											<div class="col-md-6">
												<div class="form-group">
													<div class="row custom-control custom-checkbox custom-control-inline">
														<input name="dacinformasisedasi_tindakanId" value="1" type="radio" class="custom-control-input" id="dacinformasisedasi_tindakanId_1"> <label class="custom-control-label" for="dacinformasisedasi_tindakanId_1">Sedasi Ringan / Sedang / Dalam</label>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<div class="row custom-control custom-checkbox custom-control-inline">
														<input name="dacinformasisedasi_tindakanId" value="2" type="radio" class="custom-control-input" id="dacinformasisedasi_tindakanId_2"> <label class="custom-control-label" for="dacinformasisedasi_tindakanId_2">Umum (Total) </label>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<div class="row custom-control custom-checkbox custom-control-inline">
														<input name="dacinformasisedasi_tindakanId" value="3" type="radio" class="custom-control-input" id="dacinformasisedasi_tindakanId_3"> <label class="custom-control-label" for="dacinformasisedasi_tindakanId_3">Regional (Spinal/Epidural)</label>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<div class="row custom-control custom-checkbox custom-control-inline">
														<input name="dacinformasisedasi_tindakanId" value="4" type="radio" class="custom-control-input" id="dacinformasisedasi_tindakanId_4"> <label class="custom-control-label" for="dacinformasisedasi_tindakanId_4">Blok perifer</label>
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
								<b><label class="col-form-label">TANDAI ( ✓ )</label></b>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">7. Risiko</label>
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
										<div class="row" id="dacinformasisedasi_komplikasiId">
											<div class="col-md-6">
												<div class="form-group">
													<div class="row custom-control custom-checkbox custom-control-inline">
														<input name="dacinformasisedasi_komplikasiId" value="1" type="radio" class="custom-control-input" id="dacinformasisedasi_komplikasiId_1"> <label class="custom-control-label" for="dacinformasisedasi_komplikasiId_1">Sedasi Ringan / Sedang / Dalam</label>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<div class="row custom-control custom-checkbox custom-control-inline">
														<input name="dacinformasisedasi_komplikasiId" value="2" type="radio" class="custom-control-input" id="dacinformasisedasi_komplikasiId_2"> <label class="custom-control-label" for="dacinformasisedasi_komplikasiId_2">Umum (Total) </label>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<div class="row custom-control custom-checkbox custom-control-inline">
														<input name="dacinformasisedasi_komplikasiId" value="3" type="radio" class="custom-control-input" id="dacinformasisedasi_komplikasiId_3"> <label class="custom-control-label" for="dacinformasisedasi_komplikasiId_3">Regional (Spinal/Epidural)</label>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<div class="row custom-control custom-checkbox custom-control-inline">
														<input name="dacinformasisedasi_komplikasiId" value="4" type="radio" class="custom-control-input" id="dacinformasisedasi_komplikasiId_4"> <label class="custom-control-label" for="dacinformasisedasi_komplikasiId_4">Blok perifer</label>
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
										<div class="row" id="dacinformasisedasi_alternatiflist">
											<div class="col-md-6">
												<div class="form-group">
													<div class="row custom-control custom-checkbox custom-control-inline" id="dacinformasisedasi_alternatiflistdiv_1">
														<input name="dacinformasisedasi_alternatiflist" value="1" type="checkbox" class="custom-control-input" id="dacinformasisedasi_alternatiflist_1"> <label class="custom-control-label" for="dacinformasisedasi_alternatiflist_1">Lokal</label>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<div class="row custom-control custom-checkbox custom-control-inline" id="dacinformasisedasi_alternatiflistdiv_2">
														<input name="dacinformasisedasi_alternatiflist" value="2" type="checkbox" class="custom-control-input" id="dacinformasisedasi_alternatiflist_2"> <label class="custom-control-label" for="dacinformasisedasi_alternatiflist_2">Sedasi sedang/dalam</label>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<div class="row custom-control custom-checkbox custom-control-inline" id="dacinformasisedasi_alternatiflistdiv_3">
														<input name="dacinformasisedasi_alternatiflist" value="3" type="checkbox" class="custom-control-input" id="dacinformasisedasi_alternatiflist_3"> <label class="custom-control-label" for="dacinformasisedasi_alternatiflist_3">Umum (total)</label>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<div class="row custom-control custom-checkbox custom-control-inline" id="dacinformasisedasi_alternatiflistdiv_4">
														<input name="dacinformasisedasi_alternatiflist" value="4" type="checkbox" class="custom-control-input" id="dacinformasisedasi_alternatiflist_4"> <label class="custom-control-label" for="dacinformasisedasi_alternatiflist_4">Regional</label>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<div class="row custom-control custom-checkbox custom-control-inline" id="dacinformasisedasi_alternatiflistdiv_5">
														<input name="dacinformasisedasi_alternatiflist" value="5" type="checkbox" class="custom-control-input" id="dacinformasisedasi_alternatiflist_5"> <label class="custom-control-label" for="dacinformasisedasi_alternatiflist_5">Blok perifer</label>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<div class="row custom-control custom-checkbox custom-control-inline" id="dacinformasisedasi_alternatiflistdiv_6">
														<input name="dacinformasisedasi_alternatiflist" value="6" type="checkbox" class="custom-control-input" id="dacinformasisedasi_alternatiflist_6"> <label class="custom-control-label" for="dacinformasisedasi_alternatiflist_6">Tidak ada</label>
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
										<div class="row" id="dacinformasisedasi_penyelamatanlist">
											<div class="col-md-6">
												<div class="form-group">
													<div class="row custom-control custom-checkbox custom-control-inline" id="dacinformasisedasi_penyelamatanlistdiv_1">
														<input name="dacinformasisedasi_penyelamatanlist" value="1" type="checkbox" class="custom-control-input" id="dacinformasisedasi_penyelamatanlist_1"> <label class="custom-control-label" for="dacinformasisedasi_penyelamatanlist_1">Resusitasi jika perlu</label>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<div class="row custom-control custom-checkbox custom-control-inline" id="dacinformasisedasi_penyelamatanlistdiv_2">
														<input name="dacinformasisedasi_penyelamatanlist" value="2" type="checkbox" class="custom-control-input" id="dacinformasisedasi_penyelamatanlist_2"> <label class="custom-control-label" for="dacinformasisedasi_penyelamatanlist_2">Transfusi jika perlu</label>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<div class="row custom-control custom-checkbox custom-control-inline" id="dacinformasisedasi_penyelamatanlistdiv_3">
														<input name="dacinformasisedasi_penyelamatanlist" value="3" type="checkbox" class="custom-control-input" id="dacinformasisedasi_penyelamatanlist_3"> <label class="custom-control-label" for="dacinformasisedasi_penyelamatanlist_3">Post op ICU/HCU jika perlu</label>
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
					<div class="col-md-5">
						<div class="form-group row">
							 <div class="col-md-12" align="center">
								<label class="col-form-label">Dengan ini menyatakan bahwa saya telah menerima informasi dari 
									dokter sebagaimana di atas kemudian  saya beri tanda/paraf di kolom kanannya, dan telah memahaminya
								</label>
							 </div>
						</div>
						<div class="form-group row">
							 <div class="col-md-12" align="center">
								<label class="col-form-label">Pihak Keluarga / Pasien</label>
							 </div>
						</div>
						<div class="table-responsive" align="center">
							<table class="table  table-condensed" style="width:250px; height: 120px;">
								<tbody><tr>
									<td width="30%" style="padding:0;">
										 <div id="dacinformasisedasi_ttdid1"  style="width:250px;">
										</div>
									</td>
								</tr>
							</tbody></table>
							<div class="col-md-12" align="center">
								<table>
									<tbody><tr>
										<td width="50%" style="padding:0;">
											 <input type="text" class="form-control text-center" id="dacinformasisedasi_zpjttd1">
										</td>
									</tr>
								</tbody></table>
							</div>
							<div class="col-md-12" align="center">
								<label class="col-form-label">Nama &amp; Tanda tangan</label>
							</div>
							<div align="center" class="col-md-12">
								<button id="dacinformasisedasi_btclearttd1" type="button" class="btn btn-sm btn-warning d-none"><!-- <i class="fas fa-ban"></i> --> Reset</button>
							</div>
						</div>
					</div>
					<div class="col-md-2"> </div>
					<div class="col-md-5">
						<div class="form-group row">
							 <div class="col-md-12" align="center">
								<label class="col-form-label">Dengan ini menyatakan bahwa saya telah menerangkan hal-hal 
									di atas secara benar dan jelas dan memberikan kesempatan untuk bertanya dan/atau berdiskusi
								</label>
							 </div>
						</div>
						<div class="form-group row">
							 <div class="col-md-12" align="center">
								<label class="col-form-label">DPJP</label>
							 </div>
						</div>
						<div class="form-group row d-none" id="dacinformasisedasi_divqrcode">
							<div class="col-md-12" align="center">
								<img id="dacinformasisedasi_qrcode">
							</div>
						</div>					
						<div class="table-responsive" align="center">
							<table class="table  table-condensed" style="width:250px; height: 120px;">
								<tbody><tr>
									<td width="30%" style="padding:0;">
										<!-- <div class="col-md-12  wrapper" style="width:260px; height: 120px;">
											<canvas th:id="${ccm+'_ttd2'}" width="250"  height=120 style="position: absolute;"></canvas>
										</div> -->
										<div id="dacinformasisedasi_ttdid2"  style="width:250px;">
						
										</div>
									</td>
								</tr>
							</tbody></table>
							<div class="col-md-12" align="center">
								<table>
									<tbody><tr>
										<td width="50%" style="padding:0;">
											 <input type="text" class="form-control text-center" id="dacinformasisedasi_zpjttd2" readonly="readonly">
										</td>
									</tr>
								</tbody></table>
							</div>
							<div class="col-md-12" align="center">
								<label class="col-form-label">Nama &amp; Tanda tangan</label>
							</div>
							<div align="center" class="col-md-12">
								<button id="dacinformasisedasi_btttd1" type="button" class="btn btn-sm btn-danger d-none"><!-- <i class="fas fa-signature"></i> --> Validasi</button>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group row">
							 <div class="col-md-12">
								<label class="col-form-label font-italic">* Bila pasien tidak kompeten atau tidak mau menerima informasi, maka 
									penerima informasi adalah wali atau keluarga terdekat 
								</label>
							 </div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<button onclick="SaveinfoAnes()" id="dacinformasisedasi_btsave" type="button" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Simpan</button>
				<!-- <button th:id="${ccm+'_btreset'}" type="button" class="btn btn-sm btn-warning"><i class="fas fa-ban"></i> Reset</button> -->
				<button id="dacinformasisedasi_btdelete" type="button" class="btn btn-sm btn-danger" style="display:none;"><!-- <i class="fas fa-trash"></i> --> Hapus</button>
				<button id="dacinformasisedasi_btprint" type="button" class="btn btn-sm btn-success" style="display:none;"><!-- <i class="fas fa-print"></i> --> Cetak PDF</button>
				<button id="dacinformasisedasi_btpantau" type="button" class="btn btn-sm btn-success" style="display:none;"><!-- <i class="fas fa-bars"></i> --> Pemantauan Restraint</button>
			</div>
		</div>
	</div>
</div>
<script>
$(document).ready(function() {
	pegawai_info();
	showttdpasiensedasi();
	showttdpasiensedasi2();
});
function pegawai_info() {
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
var ttdpasiensedasi 			= new WPaintX('dacinformasisedasi_ttdid1');
var ttdpasiensedasi2 			= new WPaintX('dacinformasisedasi_ttdid2');

function showttdpasiensedasi(){
	ttdpasiensedasi.show();
}
function showttdpasiensedasi2(){
	ttdpasiensedasi2.show();
}
function SaveinfoAnes(){
	var tata=Array.from(document.querySelectorAll('input[name=dacinformasisedasi_tatacaralist]:checked')).map(c=>c.value);
		cara=tata.join();
	var natif=Array.from(document.querySelectorAll('input[name=dacinformasisedasi_tatacaralist]:checked')).map(c=>c.value);
		alt=natif.join();
	var poin=Array.from(document.querySelectorAll('input[name=dacinformasisedasi_tatacaralist]:checked')).map(c=>c.value);
		next=poin.join();
	
	var data_param={
		id:$('#dacinformasisedasi_id').val(),
		tgl:$('#dacinformasisedasi_atgl').val(),
		dokter:$('#dacinformasisedasi_apj1Id').val(),
		informan:$('#dacinformasisedasi_apj2Id').val(),
	}
	
	var info_param={
		diagnosis:$('#dacinformasisedasi_diagnosa').val(),
		diagnosis_c:$('#dacinformasisedasi_c1').is(':checked'),
		dasar_diag:$('#dacinformasisedasi_dasar').val(),
		dasar_diag_c:$('#dacinformasisedasi_c2').is(':checked'),
		tindakan:$('input[name=dacinformasisedasi_tindakanId]:checked').val(),
		tindakan_c:$('#dacinformasisedasi_c3').is(':checked'),
		indikasi:$('#dacinformasisedasi_indikasi').val(),
		indikasi_c:$('#dacinformasisedasi_c4').is(':checked'),
		tata_cara:cara,
		tata_cara_c:$('#dacinformasisedasi_c5').is(':checked'),
		tujuan:$('#dacinformasisedasi_tujuan').val(),
		tujuan_c:$('#dacinformasisedasi_c6').is(':checked'),
		resiko:$('#dacinformasisedasi_risiko').val(),
		resiko_c:$('#dacinformasisedasi_c7').is(':checked'),
		komplikasi:$('input[name=dacinformasisedasi_komplikasiId]:checked').val(),
		komplikasi_c:$('#dacinformasisedasi_c8').is(':checked'),
		prognosis:$('#dacinformasisedasi_prognosis').val(),
		prognosis_c:$('#dacinformasisedasi_c9').is(':checked'),
		alternatif:alt,
		alternatif_c:$('#dacinformasisedasi_c10').is(':checked'),
		next_point:next,
		next_point_c:$('#dacinformasisedasi_c11').is(':checked'),
	}
	
	var ttd_param={
		
	}
	console.log(info_param);
	console.log(data_param);
}
</script>