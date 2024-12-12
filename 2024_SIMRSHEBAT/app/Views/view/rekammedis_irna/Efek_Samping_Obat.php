<div class="col-md-12">
	<div class="card"><!-- JUDUL -->
		<div class="card-body">
			<div class="row ">
				<div class="col-md-12">
					<div class="row d-flex justify-content-center">
						<h4><label class="col-form-label font-weight-bold">FORMULIR PELAPORAN EFEK SAMPING OBAT</label></h4>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="card"><!-- DATA PASIEN -->		
		<div class="card-body">
			<div class="row">
				<div class="col-md-6">

					<div class="form-group row">
						<div class="col-md-3  text-truncate">
							<label class="col-form-label">Tanggal</label>
						</div>
						<div class="col-md-4">
							<div class="col-md-12">
								<div class="input-group date" id="dacmeso_datgl" data-target-input="nearest">
					            	<input id="dacmeso_atgl" name="atgl" type="DATE" class="form-control datetimepicker-input" >					            	
					            </div>
					    	</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-3">
							<label class="col-form-label">Apoteker</label>
						</div>
						<div class="col-md-8 row">
							<div class="col-md-9">
								<select id="dacmeso_apjId" name="apjId" class="form-control"></select>
							</div>

			            </div>
					</div>
					<div class="form-group row">
						<div class="col-md-3">
							<label class="col-form-label">Kondisi Pasien </label>
						</div>
						<div class="col-md-8">
				            <div class="row" id="dacmeso_bwanita">
				            	<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacmeso_bwanita" value="1" type="radio" class="custom-control-input" id="dacmeso_bwanita_1">
											<label class="custom-control-label" for="dacmeso_bwanita_1">Hamil</label>
										</div>
									</div>
								</div>
				            	<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacmeso_bwanita" value="2" type="radio" class="custom-control-input" id="dacmeso_bwanita_2">
											<label class="custom-control-label" for="dacmeso_bwanita_2">Menyusui</label>
										</div>
									</div>
								</div>
				            	<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacmeso_bwanita" value="3" type="radio" class="custom-control-input" id="dacmeso_bwanita_3">
											<label class="custom-control-label" for="dacmeso_bwanita_3">Tidak Tahu</label>
										</div>
									</div>
								</div>
				            </div>
						</div>
					</div>
					<div class="form-group row">
	        			<div class="col-md-3">
	        				<label class="col-form-label">Penyakit Utama</label>
	        			</div>
	        			<div class="col-md-8">
	        				<div class="col-md-12">
		        				<textarea rows="3" name="dacmeso_bkeluhan" id="dacmeso_bkeluhan" style="width:100%;" class="form-control"></textarea>
							</div>
	        			</div>
	        		</div>
				</div>
				<div class="col-md-6">
					<div class="form-group row">
						<div class="col-md-3">
							<label class="col-form-label">Kesudahan Penyakit Utama</label>
						</div>
						<div class="col-md-8">
				            <div class="row" id="dacmeso_bsudah">
				            	<div class="col-md-6">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacmeso_bsudah" value="1" type="radio" class="custom-control-input" id="dacmeso_bsudah_1">
											<label class="custom-control-label" for="dacmeso_bsudah_1">Sembuh</label>
										</div>
									</div>
								</div>
				            	<div class="col-md-6">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacmeso_bsudah" value="2" type="radio" class="custom-control-input" id="dacmeso_bsudah_2">
											<label class="custom-control-label" for="dacmeso_bsudah_2">Meninggal</label>
										</div>
									</div>
								</div>
				            	<div class="col-md-6">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacmeso_bsudah" value="3" type="radio" class="custom-control-input" id="dacmeso_bsudah_3">
											<label class="custom-control-label" for="dacmeso_bsudah_3">Belum Sembuh</label>
										</div>
									</div>
								</div>
				            	<div class="col-md-6">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacmeso_bsudah" value="4" type="radio" class="custom-control-input" id="dacmeso_bsudah_4">
											<label class="custom-control-label" for="dacmeso_bsudah_4">Tidak Tahu</label>
										</div>
									</div>
								</div>
				            </div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-3">
							<label class="col-form-label">Penyakit / Kondisi Lain yang Menyertai </label>
						</div>
						<div class="col-md-8">
				            <div class="row" id="dacmeso_bkondisi">
				            	<div class="col-md-6">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacmeso_bkondisi" value="1" type="checkbox" class="custom-control-input" id="dacmeso_bkondisi_1">
											<label class="custom-control-label" for="dacmeso_bkondisi_1">Gangguan Ginjal</label>
										</div>										
									</div>
								</div>
				            	<div class="col-md-6">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacmeso_bkondisi" value="2" type="checkbox" class="custom-control-input" id="dacmeso_bkondisi_2">
											<label class="custom-control-label" for="dacmeso_bkondisi_2">Gangguan Hati</label>
										</div>										
									</div>
								</div>
				            	<div class="col-md-6">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacmeso_bkondisi" value="3" type="checkbox" class="custom-control-input" id="dacmeso_bkondisi_3">
											<label class="custom-control-label" for="dacmeso_bkondisi_3">Alergi</label>
										</div>										
									</div>
								</div>
				            	<div class="col-md-6">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacmeso_bkondisi" value="4" type="checkbox" class="custom-control-input" id="dacmeso_bkondisi_4">
											<label class="custom-control-label" for="dacmeso_bkondisi_4">Kondisi Medis Lainnya</label>
										</div>										
									</div>
								</div>
				            	<div class="col-md-6">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacmeso_bkondisi" value="5" type="checkbox" class="custom-control-input" id="dacmeso_bkondisi_5">
											<label class="custom-control-label" for="dacmeso_bkondisi_5">Faktor Industri, Pertanian, Kimia</label>
										</div>										
									</div>
								</div>
				            	<div class="col-md-6"><!-- ???? -->
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input onchange="document.getElementById('dacmeso_div_bkondisi6').style.display='block'" name="dacmeso_bkondisi" value="6" type="checkbox" class="custom-control-input" id="dacmeso_bkondisi_6">
											<label class="custom-control-label" for="dacmeso_bkondisi_6">Lain-lain</label>
										</div>
										<div class="row" id="dacmeso_div_bkondisi6" style="display:none;">
											<div class="col-md-1">
												<label class="col-form-label"></label>
											</div>
											<div class="col-md-11">
												<input type="text" name="dacmeso_bkondisiket6" id="dacmeso_bkondisiket6" style="width:100%;" class="form-control">
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
	<div class="card">
		<div class="card-body">
			<div class="row">
	         	<div class="col-md-6">
	         		<div class="form-group row">
	        			<div class="col-md-3">
	        				<label class="col-form-label">Bentuk / Manifestasi E.S.O yang Terjadi</label>
	        			</div>
	        			<div class="col-md-8">
	        				<div class="col-md-12">
		        				<textarea rows="3" name="dacmeso_cmanifestasi" id="dacmeso_cmanifestasi" style="width:100%;" class="form-control"></textarea>
							</div>
	        			</div>
	        		</div>
	        		<div class="form-group row">
	        			<div class="col-md-3">
	        				<label class="col-form-label">Saat / Tanggal Mulai Terjadi</label>
	        			</div>
	        			<div class="col-md-4">
							<div class="col-md-12">
								<div class="input-group date" id="dacmeso_dctgl" data-target-input="nearest">
					            	<input id="dacmeso_ctgl" name="ctgl" type="date" class="form-control datetimepicker-input">					            	
					            </div>
					    	</div>
						</div>
	        		</div>
	         	</div>
	         	<div class="col-md-6">
					<div class="form-group row">
						<div class="col-md-3">
							<label class="col-form-label">Kesudahan E.S.O</label>
						</div>
						<div class="col-md-8">
							<div class="col-md-6">
								<div class="input-group date mb-1" id="dacmeso_ddtgl" data-target-input="nearest">
					            	<input id="dacmeso_dtgl" name="dtgl" type="date" class="form-control datetimepicker-input">					            	
					            </div>
				            </div>						
				            <div class="row" id="dacmeso_csudah">
				            	<div class="col-md-6">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacmeso_csudah" value="1" type="radio" class="custom-control-input" id="dacmeso_csudah_1">
											<label class="custom-control-label" for="dacmeso_csudah_1">Sembuh</label>
										</div>
									</div>
								</div>
				            	<div class="col-md-6">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacmeso_csudah" value="2" type="radio" class="custom-control-input" id="dacmeso_csudah_2">
											<label class="custom-control-label" for="dacmeso_csudah_2">Meninggal</label>
										</div>
									</div>
								</div>
				            	<div class="col-md-6">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacmeso_csudah" value="3" type="radio" class="custom-control-input" id="dacmeso_csudah_3">
											<label class="custom-control-label" for="dacmeso_csudah_3">Sembuh dengan gejala sisa</label>
										</div>
									</div>
								</div>
				            	<div class="col-md-6">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacmeso_csudah" value="4" type="radio" class="custom-control-input" id="dacmeso_csudah_4">
											<label class="custom-control-label" for="dacmeso_csudah_4">Belum Sembuh</label>
										</div>
									</div>
								</div>
				            	<div class="col-md-6">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacmeso_csudah" value="5" type="radio" class="custom-control-input" id="dacmeso_csudah_5">
											<label class="custom-control-label" for="dacmeso_csudah_5">Tidak Tahu</label>
										</div>
									</div>
								</div>
				            </div>
						</div>
					</div>
					<div class="form-group row">
						 <div class="col-md-3">
							<label class="col-form-label" title="budaya">Riwayat E.S.O yang Dialami</label>
						</div>
			            <div class="col-md-8">
				            <div class="row" id="dacmeso_criwayat">
				            	<div class="col-md-6">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input onclick="document.getElementById('dacmeso_div_criwayat').style.display='none'" name="dacmeso_criwayat" value="1" type="radio" class="custom-control-input" id="dacmeso_criwayat_1">
											<label class="custom-control-label" for="dacmeso_criwayat_1">Tidak</label>
										</div>										
									</div>
								</div>
				            	<div class="col-md-6">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input onclick="document.getElementById('dacmeso_div_criwayat').style.display='block'" name="dacmeso_criwayat" value="2" type="radio" class="custom-control-input" id="dacmeso_criwayat_2">
											<label class="custom-control-label" for="dacmeso_criwayat_2">Ya</label>
										</div>
										<div class="row" id="dacmeso_div_criwayat" style="display:none;">
											<div class="col-md-1">
											</div>
											<div class="col-md-11">
						            			<input type="text" name="dacmeso_criwayatket" id="dacmeso_criwayatket" style="width:100%;" class="form-control">
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
	<div class="card">
		<div class="card-body">
			<div class="row ">
				<div class="col-md-12">
					<div class="form-group row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-bordered table-condensed">
									<tbody>
									<tr>
										<td colspan="7" style="padding: 2px;">
											<div class="row d-flex justify-content-center">
												<label style="font-size: 13px;" class="col-form-label font-weight-bold">ALGORITMA NARANJO</label>
											</div>
										</td>
									</tr>
									<tr>
										<td rowspan="2" width="5%" class="align-middle">
											<div class="row d-flex justify-content-center">
												<label class="col-form-label font-weight-bold">No.</label>
											</div>
										</td>
										<td rowspan="2" width="63%" class="align-middle">
											<div class="row d-flex justify-content-center">
												<label class="col-form-label font-weight-bold">Pertanyaan / Questions</label>
											</div>
										</td>
										<td colspan="3" width="24%" class="align-middle" style="padding: 2px;">
											<div class="row d-flex justify-content-center">
												<label class="col-form-label font-weight-bold">Scale</label>
											</div>
										</td>
										<td rowspan="2" width="8%" class="align-middle">
											<div class="row d-flex justify-content-center">
												<label class="col-form-label font-weight-bold">Hasil</label>
											</div>
										</td>
									</tr>
									<tr>
										<td width="8%" class="align-middle" style="padding: 2px;">
											<div class="row d-flex justify-content-center">
												<label class="col-form-label font-weight-bold">Ya / Yes</label>
											</div>
										</td>
										<td width="8%" class="align-middle" style="padding: 2px;">
											<div class="row d-flex justify-content-center">
												<label class="col-form-label font-weight-bold">Tidak / No</label>
											</div>
										</td>
										<td width="8%" class="align-middle" style="padding: 0px; margin: 0px;">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold">Tidak Diketahui</label>
												<label class="col-form-label font-weight-bold">/ Unknown</label>
											</div>
										</td>
									</tr>
									<tr>
										<td class="align-middle" style="padding: 2px;">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold">1</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;">
											<div class="row ml-1">
												<label class="col-form-label font-weight-bold">
													Apakah ada laporan efek samping obat yang serupa?&nbsp;
												</label>
												<label class="col-form-label font-italic">
													(Are there previous conclusive reports on this reaction?)
												</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;" onclick="dacmesoex.setApgar(1, 1);">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold">1</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;" onclick="dacmesoex.setApgar(1, 0);">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold">0</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;" onclick="dacmesoex.setApgar(1, 0);">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold">0</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold" id="dacmeso_apgar1">0</label>
											</div>
										</td>
									</tr>
									<tr>
										<td class="align-middle" style="padding: 2px;">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold">2</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;">
											<div class="row ml-1">
												<label class="col-form-label font-weight-bold">
													Apakah efek samping obat terjadi setelah pemberian obat yang dicurigai?&nbsp;
												</label>
												<label class="col-form-label font-italic">
													(Did the ADR appear after the suspected drug was administered?)
												</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;" onclick="dacmesoex.setApgar(2, 2);">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold">2</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;" onclick="dacmesoex.setApgar(2, -1);">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold">-1</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;" onclick="dacmesoex.setApgar(2, 0);">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold">0</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold" id="dacmeso_apgar2">0</label>
											</div>
										</td>
									</tr>
									<tr>
										<td class="align-middle" style="padding: 2px;">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold">3</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;">
											<div class="row ml-1">
												<label class="col-form-label font-weight-bold">
													Apakah efek samping obat membaik setelah obat dihentikan atau obat antagonis khusus diberikan?&nbsp;
												</label>
												<label class="col-form-label font-italic">
													(Did the ADR improve when the drug was discontinued or a specific antagonist was administered?)
												</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;" onclick="dacmesoex.setApgar(3, 1);">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold">1</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;" onclick="dacmesoex.setApgar(3, 0);">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold">0</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;" onclick="dacmesoex.setApgar(3, 0);">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold">0</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold" id="dacmeso_apgar3">0</label>
											</div>
										</td>
									</tr>
									<tr>
										<td class="align-middle" style="padding: 2px;">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold">4</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;">
											<div class="row ml-1">
												<label class="col-form-label font-weight-bold">
													Apakah Efek Samping Obat terjadi berulang setelah obat diberikan kembali?&nbsp;
												</label>
												<label class="col-form-label font-italic">
													(Did the ADR recure when the drug was readministered?)
												</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;" onclick="dacmesoex.setApgar(4, 2);">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold">2</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;" onclick="dacmesoex.setApgar(4, -1);">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold">-1</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;" onclick="dacmesoex.setApgar(4, 0);">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold">0</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold" id="dacmeso_apgar4">0</label>
											</div>
										</td>
									</tr>
									<tr>
										<td class="align-middle" style="padding: 2px;">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold">5</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;">
											<div class="row ml-1">
												<label class="col-form-label font-weight-bold">
													Apakah ada alternative penyebab yang dapat menjelaskan kemungkinan terjadinya efek samping obat?&nbsp;
												</label>
												<label class="col-form-label font-italic">
													(Are there alternative causes that could on their own have caused the reaction?)
												</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;" onclick="dacmesoex.setApgar(5, -1);">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold">-1</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;" onclick="dacmesoex.setApgar(5, 2);">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold">2</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;" onclick="dacmesoex.setApgar(5, 0);">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold">0</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold" id="dacmeso_apgar5">0</label>
											</div>
										</td>
									</tr>
									<tr>
										<td class="align-middle" style="padding: 2px;">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold">6</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;">
											<div class="row ml-1">
												<label class="col-form-label font-weight-bold">
													Apakah efek samping obat muncul kembali ketika plasebo diberikan?&nbsp;
												</label>
												<label class="col-form-label font-italic">
													(Did the ADR reappear when a placebo was given?)
												</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;" onclick="dacmesoex.setApgar(6, -1);">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold">-1</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;" onclick="dacmesoex.setApgar(6, 1);">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold">1</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;" onclick="dacmesoex.setApgar(6, 0);">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold">0</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold" id="dacmeso_apgar6">0</label>
											</div>
										</td>
									</tr>
									<tr>
										<td class="align-middle" style="padding: 2px;">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold">7</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;">
											<div class="row ml-1">
												<label class="col-form-label font-weight-bold">
													Apakah obat yang dicurigai terdeteksi di dalam darah atau cairan tubuh lainnya dengan konsentrasi yang toksik?&nbsp;
												</label>
												<label class="col-form-label font-italic">
													(Was the drug detected in the blood (or other fluids) in concentrations known to be toxic?)
												</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;" onclick="dacmesoex.setApgar(7, 1);">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold">1</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;" onclick="dacmesoex.setApgar(7, 0);">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold">0</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;" onclick="dacmesoex.setApgar(7, 0);">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold">0</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold" id="dacmeso_apgar7">0</label>
											</div>
										</td>
									</tr>
									<tr>
										<td class="align-middle" style="padding: 2px;">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold">8</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;">
											<div class="row ml-1">
												<label class="col-form-label font-weight-bold">
													Apakah efek samping obat bertambah parah ketika dosis obat ditingkatkan atau bertambah ringan ketika obat diturunkan dosisnya?&nbsp;
												</label>
												<label class="col-form-label font-italic">
													(Was the ADR more severe when the dose was increased or less severe when the dose was decreased?)
												</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;" onclick="dacmesoex.setApgar(8, 1);">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold">1</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;" onclick="dacmesoex.setApgar(8, 0);">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold">0</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;" onclick="dacmesoex.setApgar(8, 0);">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold">0</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold" id="dacmeso_apgar8">0</label>
											</div>
										</td>
									</tr>
									<tr>
										<td class="align-middle" style="padding: 2px;">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold">9</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;">
											<div class="row ml-1">
												<label class="col-form-label font-weight-bold">
													Apakah pasien pernah mengalami efek samping obat yang sama atau dengan obat yang mirip sebelumnya?&nbsp;
												</label>
												<label class="col-form-label font-italic">
													(Did the patient have a similar ADR to the same or similar drugs in any previous exposure?)
												</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;" onclick="dacmesoex.setApgar(9, 1);">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold">1</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;" onclick="dacmesoex.setApgar(9, 0);">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold">0</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;" onclick="dacmesoex.setApgar(9, 0);">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold">0</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold" id="dacmeso_apgar9">0</label>
											</div>
										</td>
									</tr>
									<tr>
										<td class="align-middle" style="padding: 2px;">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold">10</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;">
											<div class="row ml-1">
												<label class="col-form-label font-weight-bold">
													Apakah efek samping obat dapat dikonfirmasi dengan bukti yang obyektif?&nbsp;
												</label>
												<label class="col-form-label font-italic">
													(Was the ADR confirmedby objective evidence?)
												</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;" onclick="dacmesoex.setApgar(10, 1);">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold">1</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;" onclick="dacmesoex.setApgar(10, 0);">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold">0</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;" onclick="dacmesoex.setApgar(10, 0);">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold">0</label>
											</div>
										</td>
										<td class="align-middle" style="padding: 2px;">
											<div class="row justify-content-center">
												<label class="col-form-label font-weight-bold" id="dacmeso_apgar10">0</label>
											</div>
										</td>
									</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group row">
						<div class="col-md-12">
							<label class="col-form-label font-weight-bold">NARANJO PROBABILITY SCALE</label>
							<label class="col-form-label font-weight-bold">&nbsp;:&nbsp;</label>
							<label class="col-form-label font-weight-bold" id="dacmeso_apgartot">0</label>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-12">
							<label class="col-form-label font-weight-bold" id="dacmeso_apgarlabel">Ragu-Ragu / Doubtful</label>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group row">
						<div class="col-md-12">
							<label class="col-form-label">&lt;= 0   Ragu-Ragu / Doubtful</label>
			            </div>
					</div>
					<div class="form-group row">
						<div class="col-md-12">
							<label class="col-form-label">1 - 4   Cukup Mungkin / Possible</label>
			            </div>
					</div>
					<div class="form-group row">
						<div class="col-md-12">
							<label class="col-form-label">5 - 8   Kemungkinan Terjadi / Probable</label>
			            </div>
					</div>
					<div class="form-group row">
						<div class="col-md-12">
							<label class="col-form-label">&gt;= 9   Kemungkinan Terjadi Sangat Tinggi / Highly Probable</label>
			            </div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group row">
						 <div class="col-md-12" align="center">
						 	<label class="col-form-label">Apoteker</label>
						 </div>
					</div>				
					<div class="form-group row d-none" id="dacmeso_divqrcode">
        			 	<div class="col-md-12" align="center">
        			 		<img id="dacmeso_qrcode">
        			 	</div>
        			</div>						
					<div class="form-group row">
						<div class="col-md-12" align="center">
							<table>
								<tbody><tr>
									<td width="40%" style="padding: 0;"><input type="text" class="form-control text-center" id="dacmeso_zpjttd1" readonly="readonly"></td>
								</tr>
							</tbody></table>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-12" align="center">
							<label class="col-form-label">Nama &amp; Tanda tangan</label>
						</div>
					</div>	        			
					<div class="form-group row d-none">
						<div class="table-responsive" align="center">
	       					<!-- <table class="table table-condensed" style="width:250px; height: 120px;" >
	       						<tr>
						      		<td width="30%" style="padding:0;"> -->
									 	<div id="dacmeso_ttdid1" class="sigPad border border-dark" style="width:250px;">
									          <a id="dacmeso_resetttd1" class="clearButton btn btn-primary " href="#clear" hidden="true" style="display: block;">Reset</a>
									          <div class="sig sigWrapper border border-dark current" style="height: auto; display: block;">
									            <canvas id="dacmeso_ttd1" class="pad" width="240" height="120"></canvas>
									            <input id="dacmeso_codesig1" type="hidden" name="output-3" class="output" value="">
									          </div>
								        </div>
						      		<!-- </td>
								</tr>
	       					</table> -->
	        			</div>
        			</div>
					<div class="form-group row d-none">
        			 	<div class="col-md-12" align="center">
        			 		<table>
        			 			<tbody><tr>
						      		<td width="40%" style="padding:0;">
						      			 <input type="text" class="form-control text-center" id="dacmeso_zpjttd1" readonly="readonly">
						      		</td>
					      		</tr>
        			 		</tbody></table>
        			 	</div>
        			</div>
					<div class="form-group row d-none">
						 <div class="col-md-12" align="center">
						 	<label class="col-form-label">Nama &amp; Tanda tangan</label>
						 </div>
					</div>
					<div class="form-group row">
						 <div align="center" class="col-md-12">
						 	<button id="dacmeso_btttd1" type="button" class="btn btn-sm btn-danger d-none"><!-- <i class="fas fa-signature"></i> --> Validasi</button>
						 </div>
					</div>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<button id="dacmeso_btsave" type="button" class="btn btn-sm btn-primary"><!-- <i class="fas fa-save"></i> --> Simpan</button>
			<button id="dacmeso_btreset" type="button" class="btn btn-sm btn-warning"><!-- <i class="fas fa-ban"></i> --> Reset</button>
			<button id="dacmeso_btdelete" type="button" class="btn btn-sm btn-danger" style="display:none;"><!-- <i class="fas fa-trash"></i> --> Hapus</button>
			<button id="dacmeso_btprint" type="button" class="btn btn-sm btn-success" style="display:none;"><!-- <i class="fas fa-print"></i> --> Cetak PDF</button>
		</div>
	</div>
</div>
