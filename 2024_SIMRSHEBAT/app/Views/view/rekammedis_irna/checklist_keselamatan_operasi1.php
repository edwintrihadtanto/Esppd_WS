<div class="col-md-12 p-2">
	<div class="card card-outline card-danger">
		<div class="overlay-wrapper" id="checklistkeselamatanoperasi_loadingawal">
			<div class="overlay">
				<i class="fas fa-3x fa-sync-alt fa-spin"></i>
			</div>
		</div>  
		<div class="card-body p-2 darkgrey-custom" id='Divsearchchecklistkeselamatanoperasi'>
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group ">
						<label>Cari No. RM / Nama Pasien :</label>            
						<input type="search" id="normpas_preoperasi" class="form-control form-control" placeholder="Entry RM..." autocomplete="off">
						<button class="btn btn-primary" onclick="loadlistPas()">Cari</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-1" id="Divcardlistchecklistkeselamatanoperasi">
		<div class="card">
			<div class="card-header p-0">
				<div class="col-md-12 p-0" id="ermirna_listpas_operasi">
					<div class="card-body p-1" style="max-height: 420px; overflow: auto;">
						<div class="row" id="listpasienchecklistkeselamatanoperasi"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="card-body p-2 darkgrey-custom" id="Divinputpembedahan">
		<div class="card"><!-- DATA PASIEN -->
			<div class="card-header" style="background-color:black;">
				<h3 class="card-title" style="color:white;">KONDISI PASIEN</h3>
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
								<input id="dacricheckok_id" name="id" type="text" class="form-control" readonly="readonly">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3  text-truncate">
								<label class="col-form-label">Tanggal</label>
							</div>
							<div class="col-md-5">
								<div class="input-group date" id="dacricheckok_datgl" data-target-input="nearest">
									<input id="dacricheckok_atgl" name="atgl" type="date" class="form-control">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Operator</label>
							</div>
							<div class="col-md-7">
								<select id="dacricheckok_apj1Id" name="apj1Id" class="form-control"></select>
							</div>
							<div class="col-md-2">
								<button id="dacricheckok_btpjdef1" class="btn btn-warning" type="button" title="Default PJ">
									&nbsp;&nbsp;<i class="fas fa-undo"></i>&nbsp;&nbsp;
								</button>
							</div>
						</div>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-md-12">
						<div class="form-group row">
							<div class="col-md-6">
								<div class="card h-100">
									<div class="row p-2 card-header">
										<label class="col-form-label font-weight-bold">Prosedur Operasi/Tindakan Kedokteran</label>
									</div>
									<div class="card-body col-md-12">
										<div class="row ">
											<textarea rows="5" name="dacricheckok_bprosedurop" id="dacricheckok_bprosedurop" style="width: 100%;" class="form-control"></textarea>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="card h-100">
									<div class="row p-2 card-header">
										<label class="col-form-label font-weight-bold">Lokasi Operasi</label>
									</div>
									<div class="card-body col-md-12">
										<div class="row ">
											<textarea rows="5" name="dacricheckok_blokasiop" id="dacricheckok_blokasiop" style="width: 100%;" class="form-control"></textarea>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-md-12">
						<div class="form-group row">
							<div class="col-md-12">
								<label class="col-form-label font-weight-bold">&nbsp;a. Konfirmasi / Verifikasi</label>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
							<div class="col-md-11">
								<div class="row" id="dacricheckok_bkonfirmasilist">
									<div class="col-md-3">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline" id="dacricheckok_bkonfirmasilistdiv_1">
												<input name="dacricheckok_bkonfirmasilist" value="1" type="checkbox" class="custom-control-input" id="dacricheckok_bkonfirmasilist_1"> <label class="custom-control-label" for="dacricheckok_bkonfirmasilist_1">Identifikasi dan gelang pasien</label>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline" id="dacricheckok_bkonfirmasilistdiv_2">
												<input name="dacricheckok_bkonfirmasilist" value="2" type="checkbox" class="custom-control-input" id="dacricheckok_bkonfirmasilist_2"> <label class="custom-control-label" for="dacricheckok_bkonfirmasilist_2">Informed consent</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-12">
								<label class="col-form-label font-weight-bold">&nbsp;b. Tanda Daerah Operasi</label>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
							<div class="col-md-11">
								<div class="row" id="dacricheckok_btandaopId">
									<div class="col-md-3">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacricheckok_btandaopId" value="1" type="radio" class="custom-control-input" id="dacricheckok_btandaopId_1"> <label class="custom-control-label" for="dacricheckok_btandaopId_1">Ada</label>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacricheckok_btandaopId" value="2" type="radio" class="custom-control-input" id="dacricheckok_btandaopId_2"> <label class="custom-control-label" for="dacricheckok_btandaopId_2">Tidak dapat diterapkan</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-12">
								<label class="col-form-label font-weight-bold">&nbsp;c. Periksa Kelengkapan Anestesi</label>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
							<div class="col-md-11">
								<div class="row" id="dacricheckok_bperiksalist">
									<div class="col-md-3">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline" id="dacricheckok_bperiksalistdiv_1">
												<input name="dacricheckok_bperiksalist" value="1" type="checkbox" class="custom-control-input" id="dacricheckok_bperiksalist_1"> <label class="custom-control-label" for="dacricheckok_bperiksalist_1">IV line, obat-obatan, dll</label>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline" id="dacricheckok_bperiksalistdiv_2">
												<input name="dacricheckok_bperiksalist" value="2" type="checkbox" class="custom-control-input" id="dacricheckok_bperiksalist_2"> <label class="custom-control-label" for="dacricheckok_bperiksalist_2">Pengecekan mesin anestesi</label>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline" id="dacricheckok_bperiksalistdiv_3">
												<input name="dacricheckok_bperiksalist" value="3" type="checkbox" class="custom-control-input" id="dacricheckok_bperiksalist_3"> <label class="custom-control-label" for="dacricheckok_bperiksalist_3">Pengecekan alat kesterilan instrumen</label>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline" id="dacricheckok_bperiksalistdiv_4">
												<input name="dacricheckok_bperiksalist" value="4" type="checkbox" class="custom-control-input" id="dacricheckok_bperiksalist_4"> <label class="custom-control-label" for="dacricheckok_bperiksalist_4">Pengecekan pulse oximeter (berfungsi dengan baik)</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-12">
								<label class="col-form-label font-weight-bold">&nbsp;d. Riwayat Asma / Resiko Aspirasi / Kesulitan Jalan Nafas</label>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
							<div class="col-md-11">
								<div class="row" id="dacricheckok_basmaId">
									<div class="col-md-3">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacricheckok_div_basmaId1').style.display='none'" name="dacricheckok_basmaId" value="1" type="radio" class="custom-control-input" id="dacricheckok_basmaId_2"> <label class="custom-control-label" for="dacricheckok_basmaId_2">Tidak ada</label>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacricheckok_div_basmaId1').style.display='block'" name="dacricheckok_basmaId" value="2" type="radio" class="custom-control-input" id="dacricheckok_basmaId_1"> <label class="custom-control-label" for="dacricheckok_basmaId_1">Ada, Keterangan</label>
											</div>
										</div>
										<div class="row" id="dacricheckok_div_basmaId1" style="display: none;">
											<div class="col-md-1"></div>
											<div class="col-md-10">
												<textarea rows="3" name="dacricheckok_basmaket" id="dacricheckok_basmaket" style="width: 100%;" class="form-control"></textarea>
											</div>
										</div>	
									</div>
								</div>
							</div>
						</div> 
						<div class="row mb-2">
							<div class="col-md-7">
								<div class="form-group row">
									<div class="col-md-12">
										<label class="col-form-label font-weight-bold">&nbsp;e. Riwayat Alergi</label>
									</div>
								</div>
								<div class="row">

								</div>
							</div>
							<div class="col-md-5">
								<div class="form-group row">
									<div class="col-md-12">
										<label class="col-form-label font-weight-bold">&nbsp;f. Resiko kehilangan darah &gt; 500 ml (atau 7 ml/kgBB pada anak)</label>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
									<div class="col-md-11">
										<div class="row" id="dacricheckok_bresikodarahId">
											<div class="col-md-3">
												<div class="form-group">
													<div class="row custom-control custom-checkbox custom-control-inline">
														<input name="dacricheckok_bresikodarahId" value="1" type="radio" class="custom-control-input" id="dacricheckok_bresikodarahId_1"> <label class="custom-control-label" for="dacricheckok_bresikodarahId_1">Tidak Ada</label>
													</div>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<div class="row custom-control custom-checkbox custom-control-inline">
														<input name="dacricheckok_bresikodarahId" value="2" type="radio" class="custom-control-input" id="dacricheckok_bresikodarahId_2"> <label class="custom-control-label" for="dacricheckok_bresikodarahId_2">Ada</label>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>	
								<div class="form-group row">
									<div class="col-md-12">
										<label class="col-form-label font-weight-bold">&nbsp;g. Terpasang dua akses intravena/akses sentral dan rencana terapi cairan ?</label>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
									<div class="col-md-11">
										<div class="row" id="dacricheckok_bterpasangId">
											<div class="col-md-3">
												<div class="form-group">
													<div class="row custom-control custom-checkbox custom-control-inline">
														<input name="dacricheckok_bterpasangId" value="1" type="radio" class="custom-control-input" id="dacricheckok_bterpasangId_1"> <label class="custom-control-label" for="dacricheckok_bterpasangId_1">Tidak</label>
													</div>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<div class="row custom-control custom-checkbox custom-control-inline">
														<input name="dacricheckok_bterpasangId" value="2" type="radio" class="custom-control-input" id="dacricheckok_bterpasangId_2"> <label class="custom-control-label" for="dacricheckok_bterpasangId_2">Ya</label>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>	
								<div class="form-group row">
									<div class="col-md-12">
										<label class="col-form-label font-weight-bold">&nbsp;h. Peralatan khusus yang diperlukan ( Implant, dll )</label>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
									<div class="col-md-11">
										<div class="row" id="dacricheckok_bperalatanId">
											<div class="col-md-3">
												<div class="form-group">
													<div class="row custom-control custom-checkbox custom-control-inline">
														<input onclick="document.getElementById('dacricheckok_div_bperalatanId1').style.display='none'" name="dacricheckok_bperalatanId" value="2" type="radio" class="custom-control-input" id="dacricheckok_bperalatanId_2"> <label class="custom-control-label" for="dacricheckok_bperalatanId_2">Tidak ada</label>
													</div>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<div class="row custom-control custom-checkbox custom-control-inline">
														<input onclick="document.getElementById('dacricheckok_div_bperalatanId1').style.display='block'" name="dacricheckok_bperalatanId" value="1" type="radio" class="custom-control-input" id="dacricheckok_bperalatanId_1"> <label class="custom-control-label" for="dacricheckok_bperalatanId_1">Ada, Keterangan</label>
													</div>
												</div>
												<div class="row" id="dacricheckok_div_bperalatanId1" style="display: none;">
													<div class="col-md-1"></div>
													<div class="col-md-10">
														<textarea rows="3" name="dacricheckok_bperalatanket" id="dacricheckok_bperalatanket" style="width: 100%;" class="form-control"></textarea>
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
								<label class="col-form-label font-weight-bold">&nbsp;i. Dokumen Hasil Penunjang</label>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
							<div class="col-md-11">
								<div class="row" id="dacricheckok_bdokumenlist">
									<div class="col-md-3">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline" id="dacricheckok_bdokumenlistdiv_1">
												<input name="dacricheckok_bdokumenlist" value="Laboratorium" type="checkbox" class="custom-control-input" id="dacricheckok_bdokumenlist_1"> <label class="custom-control-label" for="dacricheckok_bdokumenlist_1">Laboratorium</label>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline" id="dacricheckok_bdokumenlistdiv_2">
												<input name="dacricheckok_bdokumenlist" value="Radiologi" type="checkbox" class="custom-control-input" id="dacricheckok_bdokumenlist_2"> <label class="custom-control-label" for="dacricheckok_bdokumenlist_2">Radiologi</label>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline" id="dacricheckok_bdokumenlistdiv_3">
												<input name="dacricheckok_bdokumenlist" value="3" type="checkbox" class="custom-control-input" id="dacricheckok_bdokumenlist_3"> <label class="custom-control-label" for="dacricheckok_bdokumenlist_3">Lain-lain</label>
											</div>
										</div>
										<div class="row" id="dacricheckok_div_bdokumenlist3" style="display: none;">
											<div class="col-md-1"></div>
											<div class="col-md-10">
												<textarea rows="2" name="dacricheckok_bdokumenlistket3" id="dacricheckok_bdokumenlistket3" style="width: 100%;" class="form-control"></textarea>
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
		<div class="card"><!-- KONDISI PASIEN -->
			<div class="card-header" style="background-color:black;">
				<h3 class="card-title" style="color:white;">KONDISI PASIEN</h3>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse">
						<i class="fas fa-minus"></i>
					</button>			  
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group row">
							<div class="col-md-12">
								<label class="col-form-label font-weight-bold">&nbsp;a. Kelengkapan Tim Operasi</label>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
							<div class="col-md-11">
								<div class="row" id="dacricheckok_ckelengkapanId">
									<div class="col-md-8">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacricheckok_ckelengkapanId" value="1" type="radio" class="custom-control-input" id="dacricheckok_ckelengkapanId_1"> <label class="custom-control-label" for="dacricheckok_ckelengkapanId_1">Lengkap</label>
											</div>
										</div>
									</div>
									<div class="col-md-8">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacricheckok_ckelengkapanId" value="2" type="radio" class="custom-control-input" id="dacricheckok_ckelengkapanId_2"> <label class="custom-control-label" for="dacricheckok_ckelengkapanId_2">Tidak Lengkap</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-12">
								<label class="col-form-label font-weight-bold">&nbsp;b. Membaca Secara Verbal</label>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
							<div class="col-md-11">
								<div class="row" id="dacricheckok_cmembacalist">
									<div class="col-md-8">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline" id="dacricheckok_cmembacalistdiv_1">
												<input name="dacricheckok_cmembacalist" value="1" type="checkbox" class="custom-control-input" id="dacricheckok_cmembacalist_1"> <label class="custom-control-label" for="dacricheckok_cmembacalist_1">Tanggal Operasi</label>
											</div>
										</div>
										<div class="row mb-1" id="dacricheckok_div_cmembacalist1" style="">
											<div class="col-md-6">
												<div class="input-group date" id="dacricheckok_dcmembacalistket1" >
													<input id="dacricheckok_cmembacalistket1" name="cmembacalistket1" type="date" class="form-control">
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-8">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline" id="dacricheckok_cmembacalistdiv_2">
												<input name="dacricheckok_cmembacalist" value="2" type="checkbox" class="custom-control-input" id="dacricheckok_cmembacalist_2"> <label class="custom-control-label" for="dacricheckok_cmembacalist_2">Nama dan Peran Tim Operasi</label>
											</div>
										</div>

										<div class="row mb-1" id="dacricheckok_div_cmembacalist2" style="">
											<div class="col-md-12">
												<textarea rows="4" name="dacricheckok_cmembacalistket2" id="dacricheckok_cmembacalistket2" style="width: 100%;" class="form-control"></textarea>
											</div>
										</div>
									</div>
									<div class="col-md-8">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline" id="dacricheckok_cmembacalistdiv_3">
												<input name="dacricheckok_cmembacalist" value="3" type="checkbox" class="custom-control-input" id="dacricheckok_cmembacalist_3"> <label class="custom-control-label" for="dacricheckok_cmembacalist_3">Identifikasi Pasien</label>
											</div>
										</div>
										<div class="row mb-1" id="dacricheckok_div_cmembacalist3" style="">
											<div class="col-md-12">
												<textarea rows="3" name="dacricheckok_cmembacalistket3" id="dacricheckok_cmembacalistket3" style="width: 100%;" class="form-control"></textarea>
											</div>
										</div>		
									</div>
									<div class="col-md-8">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline" id="dacricheckok_cmembacalistdiv_4">
												<input name="dacricheckok_cmembacalist" value="4" type="checkbox" class="custom-control-input" id="dacricheckok_cmembacalist_4"> <label class="custom-control-label" for="dacricheckok_cmembacalist_4">Prosedur Operasi</label>
											</div>
										</div>
										<div class="row mb-1" id="dacricheckok_div_cmembacalist4" style="">
											<div class="col-md-12">
												<textarea rows="4" name="dacricheckok_cmembacalistket4" id="dacricheckok_cmembacalistket4" style="width: 100%;" class="form-control"></textarea>
											</div>
										</div>	
									</div>
									<div class="col-md-8">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline" id="dacricheckok_cmembacalistdiv_5">
												<input name="dacricheckok_cmembacalist" value="5" type="checkbox" class="custom-control-input" id="dacricheckok_cmembacalist_5"> <label class="custom-control-label" for="dacricheckok_cmembacalist_5">Lokasi Operasi</label>
											</div>
										</div>
										<div class="row mb-1" id="dacricheckok_div_cmembacalist5" style="">
											<div class="col-md-12">
												<textarea rows="4" name="dacricheckok_cmembacalistket5" id="dacricheckok_cmembacalistket5" style="width: 100%;" class="form-control"></textarea>
											</div>
										</div>	
									</div>
									<div class="col-md-8">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline" id="dacricheckok_cmembacalistdiv_6">
												<input name="dacricheckok_cmembacalist" value="6" type="checkbox" class="custom-control-input" id="dacricheckok_cmembacalist_6"> <label class="custom-control-label" for="dacricheckok_cmembacalist_6">Informed Consent</label>
											</div>
										</div>
										<div class="row mb-1" id="dacricheckok_div_cmembacalist6" style="">
											<div class="col-md-12">
												<textarea rows="4" name="dacricheckok_cmembacalistket6" id="dacricheckok_cmembacalistket6" style="width: 100%;" class="form-control"></textarea>
											</div>
										</div>										
									</div>
								</div>
							</div>
						</div>		
					</div>
					<div class="col-md-6">
						<div class="form-group row">
							<div class="col-md-12">
								<label class="col-form-label font-weight-bold">&nbsp;c. Apakah antibiotik profilaksis sudah diberikan 30 menit sebelumnya ?</label>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
							<div class="col-md-11">
								<div class="row" id="dacricheckok_cantibiotikId">
									<div class="col-md-12">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacricheckok_div_cantibiotikId1').style.display='none'" name="dacricheckok_cantibiotikId" value="2" type="radio" class="custom-control-input" id="dacricheckok_cantibiotikId_2"> <label class="custom-control-label" for="dacricheckok_cantibiotikId_2">Belum</label>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dacricheckok_div_cantibiotikId1').style.display='block'" name="dacricheckok_cantibiotikId" value="1" type="radio" class="custom-control-input" id="dacricheckok_cantibiotikId_1"> <label class="custom-control-label" for="dacricheckok_cantibiotikId_1">Sudah</label>
											</div>
										</div>
										<div id="dacricheckok_div_cantibiotikId1" class="row mb-1" style="display:none">
											<div class="col-md-4  text-truncate">
												<input type="text" onfocus="this.select();" class="form-control" id="dacricheckok_cantibiotik">
											</div>
											<div class="col-md-3  text-truncate">
												<div class="input-group">
													<span class="input-group-prepend">
														<span class="input-group-text">Dosis</span>
													</span>
													<input type="text" onfocus="this.select();" class="form-control" id="dacricheckok_cdosis">
												</div>
											</div>
											<div class="col-md-3">
												<div class="input-group">
													<div class="input-group date" id="dacricheckok_dcdosisjam" data-target-input="nearest">
														<span class="input-group-prepend">
															<span class="input-group-text">Jam</span>
														</span>
														<input id="dacricheckok_cdosisjam" name="cdosisjam" type="time" class="form-control">
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
								<label class="col-form-label font-weight-bold">&nbsp;d. Antisipasi Kejadian Kritis</label>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
							<div class="col-md-11">
								<div class="row" id="dacricheckok_cantisipasilist">
									<div class="col-md-12">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline" id="dacricheckok_cantisipasilistdiv_1">
												<input name="dacricheckok_cantisipasilist" value="1" type="checkbox" class="custom-control-input" id="dacricheckok_cantisipasilist_1"> <label class="custom-control-label" for="dacricheckok_cantisipasilist_1">Review Dokter Bedah</label>
											</div>
										</div>
										<div class="mb-1" id="dacricheckok_div_cantisipasilist1" style="">
											<div class="row">
												<div class="col-md-6 font-italic">
													Langkah apa yang akan dilakukan bila kondisi kritis atau kejadian yang tidak diharapkan, lamanya operasi, antisipasi kehilangan darah ?
												</div>
											</div>
											<div>
												<div class="col-md-10">
													<textarea rows="4" name="dacricheckok_cantisipasilistket1" id="dacricheckok_cantisipasilistket1" style="width: 100%;" class="form-control"></textarea>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline" id="dacricheckok_cantisipasilistdiv_2">
												<input name="dacricheckok_cantisipasilist" value="2" type="checkbox" class="custom-control-input" id="dacricheckok_cantisipasilist_2"> <label class="custom-control-label" for="dacricheckok_cantisipasilist_2">Review Tim Anestesi</label>
											</div>
										</div>
										<div class="mb-1" id="dacricheckok_div_cantisipasilist2" style="">
											<div class="row">
												<div class="col-md-6 font-italic">
													Apakah ada hal khusus yang perlu diperhatikan pada pasien? Jika diperlukan CVC, kapan akan dipasang?  
												</div>
											</div>
											<div>
												<div class="col-md-10">
													<textarea rows="4" name="dacricheckok_cantisipasilistket2" id="dacricheckok_cantisipasilistket2" style="width: 100%;" class="form-control"></textarea>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline" id="dacricheckok_cantisipasilistdiv_3">
												<input name="dacricheckok_cantisipasilist" value="3" type="checkbox" class="custom-control-input" id="dacricheckok_cantisipasilist_3"> <label class="custom-control-label" for="dacricheckok_cantisipasilist_3">Review Tim Perawat</label>
											</div>
										</div>
										<div class="mb-1" id="dacricheckok_div_cantisipasilist3" style="">
											<div class="row">
												<div class="col-md-6 font-italic">
													Apakah peralatan sudah steril, adakah alat-alat yang perlu diperhatikan khusus atau dalam masalah? 
												</div>
											</div>
											<div>
												<div class="col-md-10">
													<textarea rows="4" name="dacricheckok_cantisipasilistket3" id="dacricheckok_cantisipasilistket3" style="width: 100%;" class="form-control"></textarea>
												</div>
											</div>
										</div>									
									</div>
								</div>
							</div>
						</div>						
					</div>
					<div class="col-md-2">
						<div class="form-group row">
							<div class="col-md-12">
								<label class="col-form-label font-weight-bold">&nbsp;e. Apakah foto Rontgen/CT-scan dan MRI</label>
								<label class="col-form-label font-weight-bold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;telah ditayangkan?</label>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
							<div class="col-md-11">
								<div class="row" id="dacricheckok_div_ctayangId">
									<div class="col-md-12">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacricheckok_ctayangId" value="1" type="radio" class="custom-control-input" id="dacricheckok_ctayangId_1"> <label class="custom-control-label" for="dacricheckok_ctayangId_1">Sudah</label>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dacricheckok_ctayangId" value="2" type="radio" class="custom-control-input" id="dacricheckok_ctayangId_2"> <label class="custom-control-label" for="dacricheckok_ctayangId_2">Belum</label>
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
		<div class="card"><!-- Tindakan PASIEN -->
			<div class="card-header" style="background-color:black;">
				<h3 class="card-title" style="color:white;">KONDISI PASIEN</h3>
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
								<label class="col-form-label font-weight-bold">&nbsp;a. Prosedur Yang Dilakukan</label>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
							<div class="col-md-11">
								<div class="row" id="dacricheckok_dsignoutlist">
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline" id="dacricheckok_dsignoutlistdiv_1">
												<input name="dacricheckok_dsignoutlist" value="1" type="checkbox" class="custom-control-input" id="dacricheckok_dsignoutlist_1"> <label class="custom-control-label" for="dacricheckok_dsignoutlist_1">Membacakan secara verbal prosedur tindakan yang telah dilakukan dan dicatat</label>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline" id="dacricheckok_dsignoutlistdiv_2">
												<input name="dacricheckok_dsignoutlist" value="2" type="checkbox" class="custom-control-input" id="dacricheckok_dsignoutlist_2"> <label class="custom-control-label" for="dacricheckok_dsignoutlist_2">Membacakan jumlah kassa dan jarum</label>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline" id="dacricheckok_dsignoutlistdiv_3">
												<input name="dacricheckok_dsignoutlist" value="3" type="checkbox" class="custom-control-input" id="dacricheckok_dsignoutlist_3"> <label class="custom-control-label" for="dacricheckok_dsignoutlist_3">Memastikan kelengkapan instrument</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group row">
								<div class="col-md-12">
									<label class="col-form-label font-weight-bold">&nbsp;b. Adakah masalah dengan peralatan selama operasi?</label>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
								<div class="col-md-11">
									<div class="row" id="dacricheckok_dmasalahId">
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input onclick="document.getElementById('dacricheckok_div_dmasalahId2').style.display='none'" name="dacricheckok_dmasalahId" value="1" type="radio" class="custom-control-input" id="dacricheckok_dmasalahId_1"> <label class="custom-control-label" for="dacricheckok_dmasalahId_1">Tidak</label>
												</div>
											</div>
											
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input onclick="document.getElementById('dacricheckok_div_dmasalahId2').style.display='block'" name="dacricheckok_dmasalahId" value="2" type="radio" class="custom-control-input" id="dacricheckok_dmasalahId_2"> <label class="custom-control-label" for="dacricheckok_dmasalahId_2">Ya, yaitu</label>
												</div>
											</div>
											<div class="row" id="dacricheckok_div_dmasalahId2" style="display: none;">
												<div class="col-md-1"></div>
												<div class="col-md-10">
													<textarea rows="2" name="dacricheckok_dmasalahket" id="dacricheckok_dmasalahket" style="width: 100%;" class="form-control"></textarea>
												</div>
											</div>	
										</div>
									</div>
								</div>
							</div> 
						</div>  
						<div class="col-md-12">
							<div class="form-group row">
								<div class="col-md-12">
									<label class="col-form-label font-weight-bold">&nbsp;c. Penanganan Jaringan / Spesimen</label>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
								<div class="col-md-11">
									<div class="row" id="dacricheckok_dpenangananId">
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input name="dacricheckok_dpenangananId" value="1" type="radio" class="custom-control-input" id="dacricheckok_dpenangananId_1"> <label class="custom-control-label" for="dacricheckok_dpenangananId_1">Memberi label identitas (termasuk nama pasien dan asal jaringan spesimen)</label>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input name="dacricheckok_dpenangananId" value="2" type="radio" class="custom-control-input" id="dacricheckok_dpenangananId_2"> <label class="custom-control-label" for="dacricheckok_dpenangananId_2">Tidak ada jaringan</label>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div> 
							<div class="form-group row">
								<div class="col-md-12">
									<label class="col-form-label font-weight-bold">&nbsp;d. Pemasangan Implant</label>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
								<div class="col-md-11">
									<div class="row" id="dacricheckok_dimplantId">
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input name="dacricheckok_dimplantId" value="1" type="radio" class="custom-control-input" id="dacricheckok_dimplantId_1"> <label class="custom-control-label" for="dacricheckok_dimplantId_1">Tidak Ada</label>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input name="dacricheckok_dimplantId" value="2" type="radio" class="custom-control-input" id="dacricheckok_dimplantId_2"> <label class="custom-control-label" for="dacricheckok_dimplantId_2">Ada</label>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>	
							<div class="form-group row">
								<div class="col-md-12">
									<label class="col-form-label font-weight-bold">&nbsp;e. Operator/dokter bedah, dokter anestesi, dan perawat melakukan review masalah utama dan apa yang harus diperhatikan untuk penyembuhan dan manajemen pasien selanjutnya</label>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
								<div class="col-md-11">
									<div class="row" id="dacricheckok_dreviewId">
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input name="dacricheckok_dreviewId" value="1" type="radio" class="custom-control-input" id="dacricheckok_dreviewId_1"> <label class="custom-control-label" for="dacricheckok_dreviewId_1">Sudah</label>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<div class="row custom-control custom-checkbox custom-control-inline">
													<input name="dacricheckok_dreviewId" value="2" type="radio" class="custom-control-input" id="dacricheckok_dreviewId_2"> <label class="custom-control-label" for="dacricheckok_dreviewId_2">Belum</label>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>	
							<div class="form-group row">
								<div class="col-md-12">
									<label class="col-form-label font-weight-bold">&nbsp;f. Hal - Hal yang Harus Diperhatikan</label>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
								<div class="col-md-11">
									<div class="row" id="dacricheckok_dreviewId">
										<div class="col-md-12">
											<div class="form-group">
												<div>
													<textarea rows="5" name="dacricheckok_dperhatikan" id="dacricheckok_dperhatikan" style="width: 100%;" class="form-control"></textarea>
												</div>
											</div>
											<div class="form-group">
												<div>
													<button class="btn btn-sm btn-primary" onclick="saveCheckoperasi()"><i class="fas fa-save"></i>Simpan</button>
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
<script>

$(document).ready(function() {
	searchPegawaiCheck();
});
$('#dacricheckok_bdokumenlist_3').on('change', function() {
	if(document.getElementById('dacricheckok_bdokumenlist_3').checked){
		$("#dacricheckok_div_bdokumenlist3").show();
	}else{
		$("#dacricheckok_div_bdokumenlist3").hide();
	}
});

function searchPegawaiCheck(){
	document.getElementById('dacricheckok_apj1Id').innerHTML='';
	
	apiPOST('Rawatjalan/pegawai', null,hasil=>{
		var a=hasil['data'];
		var pegawai='';
		for (var i = 0; i < a.length; i++) {
		pegawai+='<option value="'+a[i]['id_pegawai']+'">'+a[i]['nama_pegawai']+'</option>';
		}
		document.getElementById('dacricheckok_apj1Id').innerHTML=pegawai;
	})
}

function saveCheckoperasi(){
	if($('input[name=dacricheckok_basmaId]:checked').val()==2){
		napas=$('#dacricheckok_basmaket').val()
	}else{
		napas=$('input[name=dacricheckok_basmaId]:checked').val();
	}
	if($('input[name=dacricheckok_bperalatanId]:checked').val()==2){
		alat=$('#dacricheckok_bperalatanket').val()
	}else{
		alat=$('input[name=dacricheckok_bperalatanId]:checked').val();
	}
	if($('input[name=dacricheckok_cantibiotikId]:checked').val()==1){
		anti=$('#dacricheckok_cantibiotik').val()+','+$('#dacricheckok_cdosis').val()+','+$('#dacricheckok_cdosisjam').val();
	}else{
		anti=$('input[name=dacricheckok_cantibiotikId]:checked').val();
	}
	if($('input[name=dacricheckok_dmasalahId]:checked').val()==2){
		eror=$('#dacricheckok_dmasalahket').val();
	}else{
		eror=$('input[name=dacricheckok_dmasalahId]:checked').val();
	}
	if(document.getElementById('dacricheckok_bdokumenlist_3').checked){
		var dok=Array.from(document.querySelectorAll('input[name=dacricheckok_bdokumenlist]:checked')).map(c=>c.value);
		dok.pop();
		dok.push($('#dacricheckok_bdokumenlistket3').val());
		doc=dok.join();
	}else{
		doc=Array.from(document.querySelectorAll('input[name=dacricheckok_bdokumenlist]:checked')).map(c=>c.value).join();
	} 
	var dok=Array.from(document.querySelectorAll('input[name=dacricheckok_bkonfirmasilist]:checked')).map(c=>c.value);
	var lngkap=Array.from(document.querySelectorAll('input[name=dacricheckok_bperiksalist]:checked')).map(c=>c.value);
	var pro=Array.from(document.querySelectorAll('input[name=dacricheckok_dsignoutlist]:checked')).map(c=>c.value);
	verif=dok.join();
	anestesi=lngkap.join();
	proses=pro.join();
		
	var data_param={
		id:$('#dacricheckok_id').val(),
		tanggal:$('#dacricheckok_atgl').val(),
		operator:$('#dacricheckok_apj1Id').val(),
		tindakan:$('#dacricheckok_bprosedurop').val(),
		lokasi:$('#dacricheckok_blokasiop').val(),
		verify:verif,
		tanda:$('input[name=dacricheckok_btandaopId]:checked').val(),
		lengkap:anestesi,
		asma:napas,
		alergi:'???',
		resiko_darah:$('input[name=dacricheckok_bresikodarahId]:checked').val(),
		intravena:$('input[name=dacricheckok_bterpasangId]:checked').val(),
		alat_khusus:alat,
		dokumen:doc
	}
	
	var konpas_param={
		tim_ope:$('input[name=dacricheckok_ckelengkapanId]:checked').val(),
		tanggal:$('#dacricheckok_cmembacalist_1').val(),
		nama:$('#dacricheckok_cmembacalistket2').val(),
		identitas:$('#dacricheckok_cmembacalistket3').val(),
		prosedur_ope:$('#dacricheckok_cmembacalistket4').val(),
		lokasi:$('#dacricheckok_cmembacalistket5').val(),
		konsen:$('#dacricheckok_cmembacalistket6').val(),
		antibiotik:anti,
		review_bedah:$('#dacricheckok_cantisipasilistket1').val(),
		review_anestesi:$('#dacricheckok_cantisipasilistket2').val(),
		review_rawat:$('#dacricheckok_cantisipasilistket3').val(),
		foto:$('input[name=dacricheckok_ctayangId]:checked').val()
	}
	
	var tind_param={
		prosedur:proses,
		eror_alat:eror,
		jaringan:$('input[name=dacricheckok_dpenangananId]:checked').val(),
		implant:$('input[name=dacricheckok_dimplantId]:checked').val(),
		review:$('input[name=dacricheckok_dreviewId]:checked').val(),
		next_point:$('#dacricheckok_dperhatikan').val()
	}
	
	console.log(tind_param);
}
</script>