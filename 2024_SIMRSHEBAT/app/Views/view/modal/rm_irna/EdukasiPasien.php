<?php
  $data 			= json_decode($_GET['data']);

  $rm 				= str_replace('"','', json_encode($data->rm));
  $unit     		= str_replace('"','', json_encode($data->unit));
  $id_kunjungan     = str_replace('"','', json_encode($data->id_kunjungan));
  $id_transaksi     = str_replace('"','', json_encode($data->id_transaksi));

?>
<div class="col-md-12">
	<div class="card"><!-- ASESMEN KEMAMPUAN DAN KEMAUAN EDUKASI -->
		<div class="card-header" style="background-color:black;">
			<h3 class="card-title" style="color:white;">ASESMEN KEMAMPUAN DAN KEMAUAN EDUKASI</h3>
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
							<label class="col-form-label font-weight-bold">Tanggal</label>
						</div>
						<div class="col-md-4">
							<div class="input-group date" data-target-input="nearest">
								<input id="edukasipasien_datgl" name="edukasipasien_datgl" type="date" class="form-control form-control-sm datetimepicker-input" value="<?php echo date('Y-m-d');?>">
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-3">
							<label class="col-form-label font-weight-bold">Bahasa yang Digunakan</label>
						</div>
						<div class="col-md-9">
							<div class="row" id="edukasipasien_bbahasa">
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="edukasipasien_bbahasa" value="1" type="radio" class="custom-control-input" id="edukasipasien_bbahasa_1" onclick="edukasipasien_bbahasa_4()" checked>
											<label class="custom-control-label" for="edukasipasien_bbahasa_1">Indonesia</label>
										</div>
									</div>										
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="edukasipasien_bbahasa" value="2" type="radio" class="custom-control-input" id="edukasipasien_bbahasa_2" onclick="edukasipasien_bbahasa_4()">
											<label class="custom-control-label" for="edukasipasien_bbahasa_2">Inggris</label>
										</div>
									</div>									
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="edukasipasien_bbahasa" value="3" type="radio" class="custom-control-input" id="edukasipasien_bbahasa_3" onclick="edukasipasien_bbahasa_4()">
											<label class="custom-control-label" for="edukasipasien_bbahasa_3">Daerah</label>
										</div>
									</div>										
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="edukasipasien_bbahasa" value="4" type="radio" class="custom-control-input" id="edukasipasien_bbahasa_4" onclick="edukasipasien_bbahasa_4()">
											<label class="custom-control-label" for="edukasipasien_bbahasa_4">Lain-lain</label>
											<input type="text" name="edukasipasien_bbahasaket" id="edukasipasien_bbahasaket" class="form-control form-control-sm" style="display: none;" placeholder="Bahasa Lainnya">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-3">
							<label class="col-form-label font-weight-bold">Kebutuhan Penerjemah</label>
						</div>
						<div class="col-md-9">
							<div class="row" id="edukasipasien_bpenerjemah">
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="edukasipasien_bpenerjemah" value="1" type="radio" class="custom-control-input" id="edukasipasien_bpenerjemah_1" checked>
											<label class="custom-control-label" for="edukasipasien_bpenerjemah_1">Tidak</label>
										</div>
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="edukasipasien_bpenerjemah" value="2" type="radio" class="custom-control-input" id="edukasipasien_bpenerjemah_2">
											<label class="custom-control-label" for="edukasipasien_bpenerjemah_2">Ya</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-3">
							<label class="col-form-label font-weight-bold">Kemampuan Baca &amp; Tulis</label>
						</div>
						<div class="col-md-9">
							<div class="row" id="edukasipasien_bkemampuan">
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="edukasipasien_bkemampuan" value="1" type="radio" class="custom-control-input" id="edukasipasien_bkemampuan_1" checked>
											<label class="custom-control-label" for="edukasipasien_bkemampuan_1">Baik</label>
										</div>
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="edukasipasien_bkemampuan" value="2" type="radio" class="custom-control-input" id="edukasipasien_bkemampuan_2">
											<label class="custom-control-label" for="edukasipasien_bkemampuan_2">Kurang</label>
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
							<label class="col-form-label font-weight-bold">Keyakinan &amp; Nilai yang Dianut</label>
						</div>
						<div class="col-md-9">
							<div class="row">
								<div class="col-md-5">
									<input id="edukasipasien_bkeyakinan" name="edukasipasien_bkeyakinan" type="text" class="form-control form-control-sm" maxlength="150" placeholder="Keyakinan">
								</div>
								<div class="col-md-5">
									<input id="edukasipasien_bnilai" name="edukasipasien_bnilai" type="text" class="form-control form-control-sm" maxlength="150" placeholder="Nilai">
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-3">
							<label class="col-form-label font-weight-bold">Hambatan Edukasi</label>
						</div>
						<div class="col-md-9">
							<div class="row" id="edukasipasien_bedukasi">
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="edukasipasien_bedukasi" value="1" type="checkbox" class="custom-control-input" id="edukasipasien_bedukasi_1" checked>
											<label class="custom-control-label" for="edukasipasien_bedukasi_1">Tidak Ada</label>
										</div>
									</div>										
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="edukasipasien_bedukasi" value="2" type="checkbox" class="custom-control-input" id="edukasipasien_bedukasi_2">
											<label class="custom-control-label" for="edukasipasien_bedukasi_2">Emosional</label>
										</div>
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="edukasipasien_bedukasi" value="3" type="checkbox" class="custom-control-input" id="edukasipasien_bedukasi_3">
											<label class="custom-control-label" for="edukasipasien_bedukasi_3">Fisik Lemah</label>
										</div>
									</div>									
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="edukasipasien_bedukasi" value="4" type="checkbox" class="custom-control-input" id="edukasipasien_bedukasi_4">
											<label class="custom-control-label" for="edukasipasien_bedukasi_4">Motivasi</label>
										</div>
									</div>										
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="edukasipasien_bedukasi" value="5" type="checkbox" class="custom-control-input" id="edukasipasien_bedukasi_5">
											<label class="custom-control-label" for="edukasipasien_bedukasi_5">Gangguan Mata</label>
										</div>
									</div>										
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="edukasipasien_bedukasi" value="6" type="checkbox" class="custom-control-input" id="edukasipasien_bedukasi_6">
											<label class="custom-control-label" for="edukasipasien_bedukasi_6">Gangguan Telinga</label>
										</div>
									</div>										
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="edukasipasien_bedukasi" value="7" type="checkbox" class="custom-control-input" id="edukasipasien_bedukasi_7">
											<label class="custom-control-label" for="edukasipasien_bedukasi_7">Gangguan Bicara</label>
										</div>
									</div>										
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="edukasipasien_bedukasi" value="8" type="checkbox" class="custom-control-input" id="edukasipasien_bedukasi_8">
											<label class="custom-control-label" for="edukasipasien_bedukasi_8">Hambatan Kognitif</label>
										</div>
									</div>										
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="edukasipasien_bedukasi" value="9" type="checkbox" class="custom-control-input" id="edukasipasien_bedukasi_9">
											<label class="custom-control-label" for="edukasipasien_bedukasi_9">Hambatan Bahasa</label>
										</div>
									</div>										
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="edukasipasien_bedukasi" value="10" type="checkbox" class="custom-control-input" id="edukasipasien_bedukasi_10">
											<label class="custom-control-label" for="edukasipasien_bedukasi_10">Hambatan Budaya</label>
										</div>
									</div>										
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="edukasipasien_bedukasi" value="11" type="checkbox" class="custom-control-input" id="edukasipasien_bedukasi_11" onclick="edukasipasien_bedukasi_11()">
											<label class="custom-control-label" for="edukasipasien_bedukasi_11">Lain-lain</label>
											<input type="text" name="edukasipasien_bedukasiket11" id="edukasipasien_bedukasiket11" class="form-control form-control-sm" style="display: none;" placeholder="Hambatan Edukasi Lainnya">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-3">
							<label class="col-form-label font-weight-bold">Kesediaan Menerima Edukasi</label>
						</div>
						<div class="col-md-9">
							<div class="row" id="edukasipasien_bterima">
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="edukasipasien_bterima" value="1" type="radio" class="custom-control-input" id="edukasipasien_bterima_1" checked>
											<label class="custom-control-label" for="edukasipasien_bterima_1">Bersedia</label>
										</div>
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="edukasipasien_bterima" value="2" type="radio" class="custom-control-input" id="edukasipasien_bterima_2">
											<label class="custom-control-label" for="edukasipasien_bterima_2">Tidak Bersedia</label>
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
	<div class="card "><!-- ASESMEN KEBUTUHAN EDUKASI -->
		<div class="card-header" style="background-color:black;">
			<h3 class="card-title" style="color:white;">ASESMEN KEBUTUHAN EDUKASI</h3>
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
						<div class="col-md-3 white-space: pre">
							<label class="col-form-label font-weight-bold">Diagnosa Medis</label>
							<label class="col-form-label-sm font-italic">(Diisi Sesuai Diagnosa Dokter)</label>
						</div>
						<div class="col-md-8">
							<textarea rows="5" name="edukasipasien_cdiag" id="edukasipasien_cdiag" class="form-control"></textarea>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group row">
						<div class="col-md-3 white-space: pre">
							<label class="col-form-label font-weight-bold">Planning</label>
							<label class="col-form-label-sm font-italic">(Diisi Sesuai Advis Dokter)</label>
						</div>
						<div class="col-md-8">
							<textarea rows="5" name="edukasipasien_cplan" id="edukasipasien_cplan" class="form-control"></textarea>
						</div>						
					</div>			
					<div class="form-group row">
						<div class="col-md-3">
							<label class="col-form-label">Penggunaan Alat Medis</label>
						</div>
						<div class="col-md-8">
							<input id="edukasipasien_calat" name="edukasipasien_calat" type="text" class="form-control" maxlength="150">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="card "><!-- PROGRAM EDUKASI & BIDANG DISIPLIN -->
		<div class="card-header" style="background-color:black;">
			<h3 class="card-title" style="color:white;">PROGRAM EDUKASI &amp; BIDANG DISIPLIN</h3>
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
							<input hidden="true" class="form-control" id="edukasipasien_dprogramId">
							<div class="row" id="edukasipasien_dprogram">
								<div class="col-md-12">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="edukasipasien_dprogram" value="true" type="checkbox" class="custom-control-input" id="edukasipasien_dprogram_1">
											<label class="custom-control-label" for="edukasipasien_dprogram_1">1. Kondisi medis dan diagnosis</label>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="edukasipasien_dprogram" value="true" type="checkbox" class="custom-control-input" id="edukasipasien_dprogram_2">
											<label class="custom-control-label" for="edukasipasien_dprogram_2">2. Rencana pengobatan dan perawatan</label>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="edukasipasien_dprogram" value="true" type="checkbox" class="custom-control-input" id="edukasipasien_dprogram_3">
											<label class="custom-control-label" for="edukasipasien_dprogram_3">3. Hasil pengobatan/ asuhan yang diharapkan dan yang tidak diharapkan</label>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="edukasipasien_dprogram" value="true" type="checkbox" class="custom-control-input" id="edukasipasien_dprogram_4">
											<label class="custom-control-label" for="edukasipasien_dprogram_4">4. Instruksi perawatan lanjutan di rumah/ perawatan lanjutan setelah pasien pulang</label>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="edukasipasien_dprogram" value="true" type="checkbox" class="custom-control-input" id="edukasipasien_dprogram_5">
											<label class="custom-control-label" for="edukasipasien_dprogram_5">5. Perubahan kondisi pasien</label>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="edukasipasien_dprogram" value="true" type="checkbox" class="custom-control-input" id="edukasipasien_dprogram_6">
											<label class="custom-control-label" for="edukasipasien_dprogram_6">6. Hak dan Kewajiban Pasien</label>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="edukasipasien_dprogram" value="true" type="checkbox" class="custom-control-input" id="edukasipasien_dprogram_7">
											<label class="custom-control-label" for="edukasipasien_dprogram_7">7. Teknik cuci tangan</label>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="edukasipasien_dprogram" value="true" type="checkbox" class="custom-control-input" id="edukasipasien_dprogram_8">
											<label class="custom-control-label" for="edukasipasien_dprogram_8">8. Identifikasi pasien</label>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="edukasipasien_dprogram" value="true" type="checkbox" class="custom-control-input" id="edukasipasien_dprogram_9">
											<label class="custom-control-label" for="edukasipasien_dprogram_9">9. Risiko jatuh</label>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="edukasipasien_dprogram" value="true" type="checkbox" class="custom-control-input" id="edukasipasien_dprogram_10">
											<label class="custom-control-label" for="edukasipasien_dprogram_10">10. Manajemen nyeri</label>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="edukasipasien_dprogram" value="true" type="checkbox" class="custom-control-input" id="edukasipasien_dprogram_11">
											<label class="custom-control-label" for="edukasipasien_dprogram_11">11. Pasien terminal</label>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="edukasipasien_dprogram" value="true" type="checkbox" class="custom-control-input" id="edukasipasien_dprogram_12">
											<label class="custom-control-label" for="edukasipasien_dprogram_12">12. Penggunaan alat medis</label>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="edukasipasien_dprogram" value="true" type="checkbox" class="custom-control-input" id="edukasipasien_dprogram_13">
											<label class="custom-control-label" for="edukasipasien_dprogram_13">13. Diet &amp; nutrisi</label>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="edukasipasien_dprogram" value="true" type="checkbox" class="custom-control-input" id="edukasipasien_dprogram_14">
											<label class="custom-control-label" for="edukasipasien_dprogram_14">14. Pengelolaan makanan yang dibawa dari luar RS</label>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="edukasipasien_dprogram" value="true" type="checkbox" class="custom-control-input" id="edukasipasien_dprogram_15">
											<label class="custom-control-label" for="edukasipasien_dprogram_15">15. Penggunaan obat secara efektif dan aman</label>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="edukasipasien_dprogram" value="true" type="checkbox" class="custom-control-input" id="edukasipasien_dprogram_16">
											<label class="custom-control-label" for="edukasipasien_dprogram_16">16. Potensi efek samping obat</label>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="edukasipasien_dprogram" value="true" type="checkbox" class="custom-control-input" id="edukasipasien_dprogram_17">
											<label class="custom-control-label" for="edukasipasien_dprogram_17">17. Potensi interaksi obat (antar obat/ makanan)</label>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="edukasipasien_dprogram" value="true" type="checkbox" class="custom-control-input" id="edukasipasien_dprogram_18">
											<label class="custom-control-label" for="edukasipasien_dprogram_18">18. Teknik rehabilitasi</label>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="edukasipasien_dprogram" value="true" type="checkbox" class="custom-control-input" id="edukasipasien_dprogram_19" onclick="edukasipasien_dprogram_19()">
											<label class="custom-control-label" for="edukasipasien_dprogram_19">19. Edukasi lainnya 1 :</label>
										</div>
										<div class="col-md-11">
											<input type="text" name="edukasipasien_dprogramket19" id="edukasipasien_dprogramket19" style="display: none;" class="form-control form-control-sm">
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="edukasipasien_dprogram" value="true" type="checkbox" class="custom-control-input" id="edukasipasien_dprogram_20" onclick="edukasipasien_dprogram_20()">
											<label class="custom-control-label" for="edukasipasien_dprogram_20">20. Edukasi lainnya 2 :</label>
										</div>
										<div class="col-md-11">
											<input type="text" name="edukasipasien_dprogramket20" id="edukasipasien_dprogramket20" style="display: none;" class="form-control form-control-sm">
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="edukasipasien_dprogram" value="true" type="checkbox" class="custom-control-input" id="edukasipasien_dprogram_21" onclick="edukasipasien_dprogram_21()">
											<label class="custom-control-label" for="edukasipasien_dprogram_21">21. Edukasi lainnya 3 :</label>
										</div>
										<div class="col-md-11" >
											<input type="text" name="edukasipasien_dprogramket21" id="edukasipasien_dprogramket21" style="display: none;" class="form-control form-control-sm">
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
							<div class="row" id="edukasipasien_dprogrampj">
								<div class="col-md-12">
									<div class="form-group">
										<div class="row">
											<label class="form-check-label" for="edukasipasien_dprogram_1">Dokter</label>
										</div>
									</div>									
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<div class="row">
											<label class="form-check-label" for="edukasipasien_dprogram_2">Dokter</label>
										</div>
									</div>								
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<div class="row">
											<label class="form-check-label" for="edukasipasien_dprogram_3">Dokter</label>
										</div>
									</div>									
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<div class="row">
											<label class="form-check-label" for="edukasipasien_dprogram_4">Dokter dan Keperawatan</label>
										</div>
									</div>									
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<div class="row">
											<label class="form-check-label" for="edukasipasien_dprogram_5">Dokter</label>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<div class="row">
											<label class="form-check-label" for="edukasipasien_dprogram_6">Keperawatan</label>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<div class="row">
											<label class="form-check-label" for="edukasipasien_dprogram_7">Keperawatan</label>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<div class="row">
											<label class="form-check-label" for="edukasipasien_dprogram_8">Keperawatan</label>
										</div>
									</div>	
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<div class="row">
											<label class="form-check-label" for="edukasipasien_dprogram_9">Keperawatan</label>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<div class="row">
											<label class="form-check-label" for="edukasipasien_dprogram_10">Keperawatan</label>
										</div>
									</div>	
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<div class="row">
											<label class="form-check-label" for="edukasipasien_dprogram_11">Keperawatan</label>
										</div>
									</div>	
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<div class="row">
											<label class="form-check-label" for="edukasipasien_dprogram_12">Keperawatan</label>
										</div>
									</div>	
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<div class="row">
											<label class="form-check-label" for="edukasipasien_dprogram_13">Tenaga Gizi</label>
										</div>
									</div>	
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<div class="row">
											<label class="form-check-label" for="edukasipasien_dprogram_14">Tenaga Gizi</label>
										</div>
									</div>	
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<div class="row">
											<label class="form-check-label" for="edukasipasien_dprogram_15">Apoteker</label>
										</div>
									</div>	
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<div class="row">
											<label class="form-check-label" for="edukasipasien_dprogram_16">Apoteker</label>
										</div>
									</div>	
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<div class="row">
											<label class="form-check-label" for="edukasipasien_dprogram_17">Apoteker</label>
										</div>
									</div>	
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<div class="row">
											<label class="form-check-label" for="edukasipasien_dprogram_18">Rehabilitasi medis</label>
										</div>
									</div>	
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<div class="row">
											<label class="form-check-label" for="edukasipasien_dprogram_19">Lain-lain</label>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<div class="row">
											<label class="form-check-label" for="edukasipasien_dprogram_20">Lain-lain</label>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<div class="row">
											<label class="form-check-label" for="edukasipasien_dprogram_21">Lain-lain</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<div class="card-footer">
			<button onclick="modal_show_plusedukasipasien()" class="btn-info btn btn-sm"><i class="fa fa-plus"></i> Tambah Edukasi</button>
			<button onclick="saveedukasiirnautama()" class="btn-success btn btn-sm float-right"><i class="fa fa-save"></i> Simpan Edukasi</button>
		</div>
	</div>
	<div class="card"><!-- Bidang Disiplin -->
		<div class="card-header" style="background-color:black;">
			<h3 class="card-title" style="color:white;">BIDANG DISIPLIN</h3>
			<div class="card-tools">
				<button type="button" class="btn btn-tool">
					<i class="fa fa-sync-alt" title="Reload" onclick="load_detailedukasi_irna()"></i>
				</button>
				<button type="button" class="btn btn-tool" data-card-widget="collapse">
					<i class="fas fa-minus"></i>
				</button>
			</div>
		</div>
		<div class="overlay-wrapper" id="loading_edukasibidangdisiplin_irna">
			<div class="overlay dark">
				<i class="fas fa-3x fa-sync-alt fa-spin"></i>
			</div>
		</div>
		<div class="card-body p-1" style="overflow-x: overlay;">
			<table border="0" cellpadding="0" id="tabel_bidangdisiplin" cellspacing="0" class="table table-sm table-bordered table-colored" style="width: 300vh;">
	            <thead>
					<tr style="font-size: 14px;">
						<th rowspan="2" class="pl-0" width="40" style="vertical-align:middle; text-align: center;">Act</th>
						<!-- <th rowspan="2" width="80" style="vertical-align:middle;">ID</th> -->
						<th rowspan="2" width="90" style="vertical-align:middle;  text-align: center;">Bidang Edukasi</th>
						<th rowspan="2" width="150" style="vertical-align:middle;  text-align: center;">Topik Edukasi</th>
						<th rowspan="2" width="100" style="vertical-align:middle;  text-align: center;">Edukator</th>
						<th colspan="2" style="text-align:center; text-align: center;">Sasaran</th>
						<th rowspan="2" width="80" style="vertical-align:middle; text-align: center;">Tanggal</th>
						<th rowspan="2" width="80" style="vertical-align:middle; text-align: center;">Waktu (Menit)</th>
						<th rowspan="2" width="200" style="vertical-align:middle; text-align: center;">Respon Verifikasi</th>
						<th rowspan="2" width="80" style="vertical-align:middle; text-align: center;">Evaluasi</th>
						<th rowspan="2" width="80" style="vertical-align:middle; text-align: center;">Tanggal Re- Edukasi</th>
					</tr>
	              	<tr style="font-size: 14px;">
						<th style="vertical-align:middle; text-align: center;" width="100">Nama</th>
						<th style="vertical-align:middle; text-align: center;" width="100">Hubungan Dgn Pasien</th>
					</tr>
	            </thead>
            	<tbody></tbody>
            </table> 
		</div>
		<div class="card-footer">
			
		</div>
	</div>
</div>

<div class="modal fade"  id="ModalInputBidangDisiplin" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Input Bidang Disiplin &amp; Topik Edukasi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i class="fa fa-times"></i>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class="card-body p-1">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group row">
										<label for="edukasipasien_tgledukasi" class="col-sm-4">Tgl. Edukasi</label>
										<div class="input-group col-sm-8">
											<div class="input-group date">
												<input id="edukasipasien_tgledukasi" type="date" class="form-control form-control-sm">
											</div>
										</div>
									</div>
									<div class="form-group row">
					                  <label for="edukasipasien_rawatId" class="col-sm-4">Jenis Rawat</label>
					                  <div class="input-group col-sm-8">
					                    <select id="edukasipasien_rawatId" class="form-control form-control-sm" onchange="pilihjenisrawatedukasiirna()">
											<option value="0">-- Pilih --</option>
											<option value="1">UMUM</option>
											<option value="2">RAWAT JALAN</option>
											<option value="3">RAWAT INAP</option>
											<option value="4">IGD</option>
										</select>
					                  </div>
					                </div>
									<div class="form-group row">
										<label for="edukasipasien_jenisId" class="col-md-4">Jenis Petugas</label>
										<div class="input-group col-md-8">
											<select id="edukasipasien_jenisId" class="form-control form-control-sm" onchange="pilihmateriedukasiirna()">
												<option value="0">-- Pilih --</option>
												<option value="1">Ahli Gizi</option>
												<option value="2">Perawat</option>
												<option value="3">Bidan</option>
												<option value="4">Dokter</option>
												<option value="5">Tenaga Kesehatan Lainnya</option>
												<option value="6">Apoteker</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label for="edukasipasien_petugas" class="col-md-4">Perawat / Petugas</label>
										<div class="input-group col-md-8">
											<select id="edukasipasien_petugas" class="form-control form-control-sm"></select>
										</div>
									</div>
									<!-- 
									<div class="form-group row d-none" id="edukasipasien_divselect1">
										<div class="col-md-4">
											<label class="col-form-label">Topik Edukasi</label>
										</div>
										<div class="col-md-7">
											<div class="input-group">
												<select name="media" id="edukasipasien_select1" class="form-control form-control-sm">
													<option value="0">--Pilih--</option>
													<option value="1">Hak dan Kewajiban Pasien</option>
													<option value="2">Teknik cuci tangan</option>
													<option value="3">Identifikasi pasien</option>
													<option value="4">Risiko jatuh</option>
													<option value="5">Manajemen nyeri</option>
													<option value="6">Pasien terminal</option>
													<option value="7">Perawatan lanjutan setelah pasien pulang</option>
													<option value="8">Penggunaan alat medis</option>
													<option value="9">Lain-lain</option>
													<option value="10">Orientasi ruangan</option>
													<option value="11">Perawatan metode kangguru</option>
													<option value="12">Inisiasi menyusu dini</option>
													<option value="13">Asi eksklusif</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group row d-none" id="edukasipasien_divselect2">
										<div class="col-md-4">
											<label class="col-form-label">Topik Edukasi</label>
										</div>
										<div class="col-md-7">
											<div class="input-group">
												<select name="media" id="edukasipasien_select2" class="form-control form-control-sm">
													<option value="0">--Pilih--</option>
													<option value="1">Diet dan Nutrisi</option>
													<option value="2">Pengelolaan Makanan yang dibawa dari luar RS</option>
													<option value="3">Lain-lain</option>
													<option value="4">Penyimpanan Makanan</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group row d-none" id="edukasipasien_divselect3">
										<div class="col-md-4">
											<label class="col-form-label">Topik Edukasi</label>
										</div>
										<div class="col-md-7">
											<div class="input-group">
												<select name="media" id="edukasipasien_select3" class="form-control form-control-sm">
													<option value="0">--Pilih--</option>
													<option value="1">Penggunaan obat secara efektif dan aman</option>
													<option value="2">Potensi efek samping obat</option>
													<option value="3">Potensi interaksi obat (antar obat / makanan)</option>
													<option value="4">Lain-lain</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group row d-none" id="edukasipasien_divselect4">
										<div class="col-md-4">
											<label class="col-form-label">Topik Edukasi</label>
										</div>
										<div class="col-md-7">
											<div class="input-group">
												<select name="media" id="edukasipasien_select4" class="form-control form-control-sm">
													<option value="0">--Pilih--</option>
													<option value="1">Teknik rehabilitasi</option>
													<option value="2">Lain-lain</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group row d-none" id="edukasipasien_divselect5">
										<div class="col-md-4">
											<label class="col-form-label">Topik Edukasi</label>
										</div>
										<div class="col-md-7">
											<div class="input-group">
												<select name="media" id="edukasipasien_select5" class="form-control form-control-sm">
													<option value="0">--Pilih--</option>
													<option value="1">Kondisi medis dan diagnosis</option>
													<option value="2">Rencana pengobatan dan perawatan</option>
													<option value="3">Hasil pengobatan/ asuhan yang diharapkan dan yang tidak diharapkan</option>
													<option value="4">Instruksi perawatan lanjutan di rumah</option>
													<option value="5">Perubahan kondisi pasien</option>
													<option value="6">Lain-lain</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group row d-none" id="edukasipasien_divket">
										<div class="col-md-4">
											<label class="col-form-label">Keterangan</label>
										</div>
										<div class="col-md-7">
											<input id="edukasipasien_ket" name="ket" type="text" class="form-control form-control-sm" maxlength="100">
										</div>
									</div>
									<div class="form-group row d-none" id="edukasipasien_divpj1">
										<div class="col-md-4 text-truncate">
											<label class="col-form-label">Dokter</label>
										</div>
										<div class="col-md-7">
											<select id="edukasipasien_apj1Id" name="apj1Id" class="form-control select2-hidden-accessible" data-select2-id="edukasipasien_apj1Id" tabindex="-1" aria-hidden="true">
												<option value="11" selected="" data-select2-id="3">dr. I WAYAN MERTHA, Sp.PD, KGH</option>
											</select>

										</div>
										<div class="col-md-1">
											<button id="edukasipasien_btpjdef1" class="btn btn-warning" type="button" title="Default PJ"><i class="fas fa-undo"></i></button>
										</div>
									</div> -->
								</div>
								<div class="col-md-6">
									<div class="form-group row">
										<label for="edukasipasien_nama" class="col-sm-4">Nama / Keluarga Pasien</label>
										<div class="input-group col-sm-8">
											<div class="input-group date">
												<input id="edukasipasien_nama" type="text" class="form-control form-control-sm" maxlength="100" required>
											</div>
										</div>
									</div>
									<div class="form-group row">
										<label for="edukasipasien_hub" class="col-sm-4">Hubungan Dengan Pasien</label>
										<div class="input-group col-sm-8">
											<div class="input-group date">
												<input id="edukasipasien_hub" type="text" class="form-control form-control-sm" maxlength="100" required>
											</div>
										</div>
									</div>
									<div class="form-group row">
										<label for="edukasipasien_waktu" class="col-sm-4">Durasi Waktu</label>
										<div class="input-group input-group-sm col-sm-8">
											<input type="number" class="form-control" id="edukasipasien_waktu" required>
											<span class="input-group-append">
												<button type="button" class="btn btn-info btn-flat">Menit</button>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<hr width="100%">
						<!-- TOPIK EDUKASI PETUGAS PERAWAT dan BIDAN -->
						<div class="card" id="edukasipasien_divtopik1" style="display:none;">
							<div class="card-body p-1">
								<p class="lead mb-0">Topik Edukasi <i class="fa fa-eraser" title="Clear" onclick="edukasipasien_divtopik1()"></i> </p>
								<div class="row p-2">
									<div class="col-md-4">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input custom-control-input-info custom-control-input-outline" type="checkbox" id="edukasipasien_topiklist1_1" name="edukasipasien_perawat" value="1">
											<label for="edukasipasien_topiklist1_1" class="custom-control-label">Hak dan Kewajiban Pasien</label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input custom-control-input-info custom-control-input-outline" type="checkbox" id="edukasipasien_topiklist1_2" name="edukasipasien_perawat" value="2">
											<label for="edukasipasien_topiklist1_2" class="custom-control-label">Teknik Cuci Tangan</label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input custom-control-input-info custom-control-input-outline" type="checkbox" id="edukasipasien_topiklist1_3" name="edukasipasien_perawat" value="3">
											<label for="edukasipasien_topiklist1_3" class="custom-control-label">Identifikasi Pasien</label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input custom-control-input-info custom-control-input-outline" type="checkbox" id="edukasipasien_topiklist1_4" name="edukasipasien_perawat" value="4">
											<label for="edukasipasien_topiklist1_4" class="custom-control-label">Risiko Jatuh</label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input custom-control-input-info custom-control-input-outline" type="checkbox" id="edukasipasien_topiklist1_5" name="edukasipasien_perawat" value="5">
											<label for="edukasipasien_topiklist1_5" class="custom-control-label">Manajemen Nyeri</label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input custom-control-input-info custom-control-input-outline" type="checkbox" id="edukasipasien_topiklist1_6" name="edukasipasien_perawat" value="6">
											<label for="edukasipasien_topiklist1_6" class="custom-control-label">Pasien Terminal</label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input custom-control-input-info custom-control-input-outline" type="checkbox" id="edukasipasien_topiklist1_7" onclick="edukasipasien_topiklist1_7()" name="edukasipasien_perawat" value="7">
											<label for="edukasipasien_topiklist1_7" class="custom-control-label">Perawatan Lanjutan setelah Pasien Pulang</label>
										</div>
										<div id="edukasipasien_topiklist1_7_ket" style="display: none;">
											<textarea id="edukasipasien_topiklist1_7_ket_1" style="width: 100%;" class="form-control form-control-sm"></textarea>
										</div>	
									</div>
									<div class="col-md-4">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input custom-control-input-info custom-control-input-outline" type="checkbox" id="edukasipasien_topiklist1_8" onclick="edukasipasien_topiklist1_8()" name="edukasipasien_perawat" value="8">
											<label for="edukasipasien_topiklist1_8" class="custom-control-label">Penggunaan Alat Medis</label>
										</div>
										<div id="edukasipasien_topiklist1_8_ket" style="display: none;">
											<textarea id="edukasipasien_topiklist1_8_ket_2" style="width: 100%;" class="form-control form-control-sm"></textarea>
										</div>	
									</div>
									<div class="col-md-4">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input custom-control-input-info custom-control-input-outline" type="checkbox" id="edukasipasien_topiklist1_9" name="edukasipasien_perawat" value="9">
											<label for="edukasipasien_topiklist1_9" class="custom-control-label">Orientasi Ruangan</label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input custom-control-input-info custom-control-input-outline" type="checkbox" id="edukasipasien_topiklist1_10" name="edukasipasien_perawat" value="10">
											<label for="edukasipasien_topiklist1_10" class="custom-control-label">Perawatan Metode Kangguru</label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input custom-control-input-info custom-control-input-outline" type="checkbox" id="edukasipasien_topiklist1_11" name="edukasipasien_perawat" value="11">
											<label for="edukasipasien_topiklist1_11" class="custom-control-label">Inisiasi Menyusu Dini</label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input custom-control-input-info custom-control-input-outline" type="checkbox" id="edukasipasien_topiklist1_12" name="edukasipasien_perawat" value="12">
											<label for="edukasipasien_topiklist1_12" class="custom-control-label">Asi Eksklusif</label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input custom-control-input-info custom-control-input-outline" type="checkbox" id="edukasipasien_topiklist1_13" onclick="edukasipasien_topiklist1_13()" name="edukasipasien_perawat" value="13">
											<label for="edukasipasien_topiklist1_13" class="custom-control-label">Lain - lain</label>
										</div>
										<div id="edukasipasien_topiklist1_13_ket" style="display: none;">
											<textarea id="edukasipasien_topiklist1_13_ket_3" style="width: 100%;" class="form-control form-control-sm"></textarea>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- TOPIK EDUKASI PETUGAS AHLI GIZI -->
						<div class="card" id="edukasipasien_divtopik2" style="display:none;">
							<div class="card-body p-1">
								<p class="lead mb-0">Topik Edukasi <i class="fa fa-eraser" title="Clear" onclick="edukasipasien_divtopik2()"></i></p>
								<div class="row p-2">
									<div class="col-md-6">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input custom-control-input-info custom-control-input-outline" type="checkbox" id="edukasipasien_topiklist2_1" onclick="edukasipasien_topiklist2_1()" name="edukasipasien_ahligizi" value="1">
											<label for="edukasipasien_topiklist2_1" class="custom-control-label">Diet dan Nutrisi</label>
										</div>
										<div id="edukasipasien_topiklist21" style="display: none;">
											<textarea id="edukasipasien_topiklist2_ket_1" style="width: 100%;" class="form-control form-control-sm"></textarea>
										</div>
									</div>
									<div class="col-md-6">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input custom-control-input-info custom-control-input-outline" type="checkbox" id="edukasipasien_topiklist2_2" name="edukasipasien_ahligizi" value="2">
											<label for="edukasipasien_topiklist2_2" class="custom-control-label">Pengelolaan Makanan yang dibawa dari luar RS</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input custom-control-input-info custom-control-input-outline" type="checkbox" id="edukasipasien_topiklist2_3" name="edukasipasien_ahligizi" value="3">
											<label for="edukasipasien_topiklist2_3" class="custom-control-label">Penyimpanan Makanan</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input custom-control-input-info custom-control-input-outline" type="checkbox" id="edukasipasien_topiklist2_4" onclick="edukasipasien_topiklist2_4()" name="edukasipasien_ahligizi" value="4">
											<label for="edukasipasien_topiklist2_4" class="custom-control-label">Lain-lain</label>
										</div>
										<div id="edukasipasien_topiklist24" style="display: none;">
											<textarea id="edukasipasien_topiklist2_ket_2" style="width: 100%;" class="form-control form-control-sm"></textarea>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<!-- MATERI -->
						<div class="card" id="edukasipasien_divmateri_1" style="display:none;">
							<div class="card-body p-1">
								<p class="lead mb-0">Materi Edukasi</p>
								<div class="row p-2">
									<div class="col-md-10">
										<button id="edukasipasien_btmateri3" type="button" class="btn btn-sm btn-info"><i class="fa fa-book"></i> Edukasi Orientasi Ruangan </button>
									</div>
								</div>
							</div>
						</div>

						<div class="card" id="edukasipasien_divmateri_2" style="display:none;">
							<div class="card-body p-1">
								<p class="lead mb-0">Materi Edukasi</p>
								<div class="row p-2">
									<div class="col-md-10">
										<button id="edukasipasien_btmateri3" type="button" class="btn btn-sm btn-info"><i class="fa fa-book"></i> Edukasi Tanda Bahaya Pada Persalinan </button>
									</div>
								</div>
							</div>
						</div>

						<div class="card" id="edukasipasien_divmateri_3" style="display:none;">
							<div class="card-body p-1">
								<p class="lead mb-0">Materi Edukasi</p>
								<div class="row p-2">
									<div class="col-md-10">
										<button id="edukasipasien_btmateri1" type="button" class="btn btn-sm btn-info"><i class="fa fa-book"></i> Edukasi Penyimpanan Makanan</button>
									</div>
								</div>
							</div>
						</div>
						<!-- END MATERI -->

						<!-- TOPIK EDUKASI APOTEK -->
						<div class="card" id="edukasipasien_divtopik3" style="display:none;">
							<div class="card-body p-1">
								<p class="lead mb-0">Topik Edukasi <i class="fa fa-eraser" title="Clear" onclick="edukasipasien_divtopik3()"></i></p>
								<div class="row p-2">
									<div class="col-md-6">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input custom-control-input-info custom-control-input-outline" type="checkbox" id="edukasipasien_topiklist3_1" name="edukasipasien_apotek" value="1" >
											<label for="edukasipasien_topiklist3_1" class="custom-control-label">Penggunaan Obat Secara Efektif dan Aman</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input custom-control-input-info custom-control-input-outline" type="checkbox" id="edukasipasien_topiklist3_2" name="edukasipasien_apotek" value="2" >
											<label for="edukasipasien_topiklist3_2" class="custom-control-label">Potensi Efek Samping Obat</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input custom-control-input-info custom-control-input-outline" type="checkbox" id="edukasipasien_topiklist3_3" name="edukasipasien_apotek" value="3" >
											<label for="edukasipasien_topiklist3_3" class="custom-control-label">Potensi Interaksi Obat ( Antar Obat / Makanan)</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input custom-control-input-info custom-control-input-outline" type="checkbox" id="edukasipasien_topiklist3_4" onclick="edukasipasien_topiklist3_4()" name="edukasipasien_apotek" value="4" >
											<label for="edukasipasien_topiklist3_4" class="custom-control-label">Lain-lain</label>
										</div>
										<div id="edukasipasien_topiklist34" style="display: none;">
											<textarea id="edukasipasien_topiklist3_ket_1" style="width: 100%;" class="form-control form-control-sm"></textarea>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<!-- TOPIK EDUKASI TENAGA KESEHATAN LAIN -->
						<div class="card" id="edukasipasien_divtopik4" style="display:none;">
							<div class="card-body p-1">
								<p class="lead mb-0">Topik Edukasi <i class="fa fa-eraser" title="Clear" onclick="edukasipasien_divtopik4()"></i></p>
								<div class="row p-2">
									<div class="col-md-6">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input custom-control-input-info custom-control-input-outline" type="checkbox" id="edukasipasien_topiklist4_1" onclick="edukasipasien_topiklist4_1()" name="edukasipasien_tenkes" value="1">
											<label for="edukasipasien_topiklist4_1" class="custom-control-label">Teknik Rehabilitasi</label>
										</div>
										<div id="edukasipasien_topiklist41" style="display: none;">
											<textarea id="edukasipasien_topiklist4_ket_1" style="width: 100%;" class="form-control form-control-sm"></textarea>
										</div>
									</div>
									<div class="col-md-6">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input custom-control-input-info custom-control-input-outline" type="checkbox" id="edukasipasien_topiklist4_2" onclick="edukasipasien_topiklist4_2()" name="edukasipasien_tenkes" value="2">
											<label for="edukasipasien_topiklist4_2" class="custom-control-label">Lain-lain</label>
										</div>
										<div id="edukasipasien_topiklist42" style="display: none;">
											<textarea id="edukasipasien_topiklist4_ket_2" style="width: 100%;" class="form-control form-control-sm"></textarea>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- TOPIK EDUKASI DOKTER -->
						<div class="card" id="edukasipasien_divtopik5" style="display:none;">
							<div class="card-body p-1">
								<p class="lead mb-0">Topik Edukasi <i class="fa fa-eraser" title="Clear" onclick="edukasipasien_divtopik5()"></i></p>
								<div class="row p-2">
									<div class="col-md-6">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input custom-control-input-info custom-control-input-outline" type="checkbox" id="edukasipasien_topiklist5_1" name="edukasipasien_dokter" value="1">
											<label for="edukasipasien_topiklist5_1" class="custom-control-label">Kondisi Medis dan Diagnosis</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input custom-control-input-info custom-control-input-outline" type="checkbox" id="edukasipasien_topiklist5_2" name="edukasipasien_dokter" value="2">
											<label for="edukasipasien_topiklist5_2" class="custom-control-label">Rencana Pengobatan dan Perawatan</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input custom-control-input-info custom-control-input-outline" type="checkbox" id="edukasipasien_topiklist5_3" name="edukasipasien_dokter" value="3">
											<label for="edukasipasien_topiklist5_3" class="custom-control-label">Hasil Pengobatan / Asuhan yang di harapkan dan yang tidak di harapkan</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input custom-control-input-info custom-control-input-outline" type="checkbox" id="edukasipasien_topiklist5_4" onclick="edukasipasien_topiklist5_4()" name="edukasipasien_dokter" value="4">
											<label for="edukasipasien_topiklist5_4" class="custom-control-label">Instruksi Perawatan Lanjutan di Rumah</label>
										</div>
										<div id="edukasipasien_topiklist54" style="display: none;">
											<textarea id="edukasipasien_topiklist5_ket_1" style="width: 100%;" class="form-control form-control-sm"></textarea>
										</div>
									</div>
									<div class="col-md-6">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input custom-control-input-info custom-control-input-outline" type="checkbox" id="edukasipasien_topiklist5_5" onclick="edukasipasien_topiklist5_5()" name="edukasipasien_dokter" value="5">
											<label for="edukasipasien_topiklist5_5" class="custom-control-label">Perubahan Kondisi Pasien</label>
										</div>
										<div id="edukasipasien_topiklist55" style="display: none;">
											<textarea id="edukasipasien_topiklist5_ket_2" style="width: 100%;" class="form-control form-control-sm"></textarea>
										</div>
									</div>
									<div class="col-md-6">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input custom-control-input-info custom-control-input-outline" type="checkbox" id="edukasipasien_topiklist5_6" onclick="edukasipasien_topiklist5_6()" name="edukasipasien_dokter" value="6">
											<label for="edukasipasien_topiklist5_6" class="custom-control-label">Lain - lain</label>
										</div>
										<div id="edukasipasien_topiklist56" style="display: none;">
											<textarea id="edukasipasien_topiklist5_ket_3" style="width: 100%;" class="form-control form-control-sm"></textarea>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- BELUM DIKETAHUI -->
						<div class="card" id="edukasipasien_divtopik6" style="display:none;">
							<div class="card-body p-1">
								<p class="lead mb-0">Topik Edukasi</p>
								<div class="row p-2">
									<div class="col-md-6">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input custom-control-input-info custom-control-input-outline" type="checkbox" id="edukasipasien_topiklist6_1" >
											<label for="edukasipasien_topiklist6_1" class="custom-control-label">Waktu Kontrol</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input custom-control-input-info custom-control-input-outline" type="checkbox" id="edukasipasien_topiklist6_2" >
											<label for="edukasipasien_topiklist6_2" class="custom-control-label">Risiko Jatuh</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input custom-control-input-info custom-control-input-outline" type="checkbox" id="edukasipasien_topiklist6_3" >
											<label for="edukasipasien_topiklist6_3" class="custom-control-label">Manajemen Nyeri</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input custom-control-input-info custom-control-input-outline" type="checkbox" id="edukasipasien_topiklist6_4" >
											<label for="edukasipasien_topiklist6_4" class="custom-control-label">Perawatan Luka</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input custom-control-input-info custom-control-input-outline" type="checkbox" id="edukasipasien_topiklist6_5" >
											<label for="edukasipasien_topiklist6_5" class="custom-control-label">Tanda Bahaya Kehamilan</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input custom-control-input-info custom-control-input-outline" type="checkbox" id="edukasipasien_topiklist6_6" >
											<label for="edukasipasien_topiklist6_6" class="custom-control-label">Tanda Bahaya Persalinan</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input custom-control-input-info custom-control-input-outline" type="checkbox" id="edukasipasien_topiklist6_7" >
											<label for="edukasipasien_topiklist6_7" class="custom-control-label">Lain-lain</label>
										</div>
										<div id="edukasipasien_topiklist67" style="display: none;">
											<textarea id="edukasipasien_topiklist6_ket_1" style="width: 100%;" class="form-control form-control-sm"></textarea>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Metode Edukasi -->
						<div class="card" id="metodeedukasipasien" style="display: none;">
							<div class="card-body p-1">
								<p class="lead mb-0">Metode Edukasi <i class="fa fa-eraser" title="Clear" onclick="metodeedukasipasien()"></i></p>
								<div class="row p-2">
									<div class="col-md-6">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input custom-control-input-info custom-control-input-outline" type="radio" name="metodeedukasipasien" id="metodeedukasipasien_1" value="1">
											<label for="metodeedukasipasien_1" class="custom-control-label">Ceramah &amp; Tanya Jawab</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input custom-control-input-info custom-control-input-outline" type="radio" name="metodeedukasipasien" id="metodeedukasipasien_2" value="2">
											<label for="metodeedukasipasien_2" class="custom-control-label">Diskusi</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input custom-control-input-info custom-control-input-outline" type="radio" name="metodeedukasipasien" id="metodeedukasipasien_3" value="3">
											<label for="metodeedukasipasien_3" class="custom-control-label">Demonstrasi / Peragaan</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input custom-control-input-info custom-control-input-outline" type="radio" name="metodeedukasipasien" id="metodeedukasipasien_4" value="4">
											<label for="metodeedukasipasien_4" class="custom-control-label">Audiovisual</label>
										</div>
									</div>
								</div>
							</div>
					
							<div class="card-body p-1">
								<p class="lead mb-0">Media Edukasi <i class="fa fa-eraser" title="Clear" onclick="mediaedukasipasien()"></i></p>
								<div class="row p-2">
									<div class="col-md-6">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input custom-control-input-info custom-control-input-outline" type="radio" name="mediaedukasipasien" id="mediaedukasipasien_1" value="1">
											<label for="mediaedukasipasien_1" class="custom-control-label">Leaflet</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input custom-control-input-info custom-control-input-outline" type="radio" name="mediaedukasipasien" id="mediaedukasipasien_2" value="2">
											<label for="mediaedukasipasien_2" class="custom-control-label">Video</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input custom-control-input-info custom-control-input-outline" type="radio" name="mediaedukasipasien" id="mediaedukasipasien_3" value="3">
											<label for="mediaedukasipasien_3" class="custom-control-label">Lembar Balik</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input custom-control-input-info custom-control-input-outline" type="radio" name="mediaedukasipasien" id="mediaedukasipasien_4" value="4">
											<label for="mediaedukasipasien_4" class="custom-control-label">Poster</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input custom-control-input-info custom-control-input-outline" type="radio" name="mediaedukasipasien" id="mediaedukasipasien_5" value="5">
											<label for="mediaedukasipasien_5" class="custom-control-label">Lisan</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input custom-control-input-info custom-control-input-outline" type="radio" name="mediaedukasipasien" id="mediaedukasipasien_6" value="6">
											<label for="mediaedukasipasien_6" class="custom-control-label">Media Elektronik</label>
										</div>
									</div>
								</div>
							</div>
					
							<div class="card-body p-1">
								<p class="lead mb-0">Respon Verifikasi</p>
								<div class="row p-2">
									<div class="col-md-6">
										<div class="custom-control custom-checkbox">
											<input name="responveredukasipasien" class="custom-control-input custom-control-input-info custom-control-input-outline" type="radio" id="responver_edukasipasien_1" value="1">
											<label for="responver_edukasipasien_1" class="custom-control-label">Tidak respon sama sekali (tidak ada antusiasme dan keinginan belajar)</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="custom-control custom-checkbox">
											<input name="responveredukasipasien" class="custom-control-input custom-control-input-info custom-control-input-outline" type="radio" id="responver_edukasipasien_2" value="2">
											<label for="responver_edukasipasien_2" class="custom-control-label">Tidak paham (ingin belajar tapi sulit mengerti)</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="custom-control custom-checkbox">
											<input name="responveredukasipasien" class="custom-control-input custom-control-input-info custom-control-input-outline" type="radio" id="responver_edukasipasien_3" value="3">
											<label for="responver_edukasipasien_3" class="custom-control-label">Paham hal yang diajarkan, tapi tidak bisa menjelaskan sendiri</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="custom-control custom-checkbox">
											<input name="responveredukasipasien" class="custom-control-input custom-control-input-info custom-control-input-outline" type="radio" id="responver_edukasipasien_4" value="4">
											<label for="responver_edukasipasien_4" class="custom-control-label">Dapat menjelaskan apa yang diajarkan, tapi harus dibantu edukator</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="custom-control custom-checkbox">
											<input name="responveredukasipasien" class="custom-control-input custom-control-input-info custom-control-input-outline" type="radio" id="responver_edukasipasien_5" value="5">
											<label for="responver_edukasipasien_5" class="custom-control-label">Dapat menjelaskan apa yang telah diajarkan tanpa dibantu</label>
										</div>
									</div>
								</div>
							</div>
					
							<div class="card-body p-1">
								<p class="lead mb-0">Evaluasi</p>
								<div class="row p-2">
									<div class="col-md-6">
										<div class="custom-control custom-checkbox">
											<input name="evalaasi_edukasipasien" class="custom-control-input custom-control-input-info custom-control-input-outline" type="radio" id="evalaasi_edukasipasien_1" checked="true" onclick="evalaasi_edukasipasien_2()" value="1">
											<label for="evalaasi_edukasipasien_1" class="custom-control-label">Sudah Paham / Mengerti</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="custom-control custom-checkbox">
											<input name="evalaasi_edukasipasien" class="custom-control-input custom-control-input-info custom-control-input-outline" type="radio" id="evalaasi_edukasipasien_2" onclick="evalaasi_edukasipasien_2()" value="2">
											<label for="evalaasi_edukasipasien_2" class="custom-control-label">Re - Edukasi</label>
										</div>
										<div id="evalaasi_edukasipasien_2_1">
											<div id="evalaasi_edukasipasien_2_1" class="input-group date" data-target-input="nearest">
												<input id="evalaasi_edukasipasien_2_tgl_re" name="evalaasi_edukasipasien_2_tgl_re" type="date" class="form-control datetimepicker-input" value="<?php echo date('Y-m-d');?>" disabled>
											</div>
										</div>
									</div>
								</div>
							</div>	
						</div>

						<!-- TTD -->
						<div class="card" id="edukasipasien_ttdpasien" style="display: none;">
							<div class="card-body p-1">
								<!-- <div class="row ">
									<div class="col-md-6">
										<div class="form-group row">
											<div class="col-md-12" align="center">
												<label class="col-form-label">Pihak Keluarga / Pasien</label>
											</div>
										</div>
										<div class="table-responsive" align="center">
											<table class="table table-condensed" style="width:250px; height: 120px;">
												<tbody>
													<tr>
														<td width="30%" style="padding:0;">
															<div id="edukasipasien_ttdid1" class="sigPad border border-dark" style="width:250px;">
																<a id="edukasipasien_resetttd1" class="clearButton btn btn-primary " href="#clear" hidden="true" style="display: block;">Reset</a>
																<div class="sig sigWrapper border border-dark current" style="height: auto; display: block;">
																	<canvas id="edukasipasien_ttd1" class="pad" width="240" height="120"></canvas>
																	<input id="edukasipasien_codesig1" type="hidden" name="output-3" class="output" value="">
																</div>
															</div>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
										<div class="form-group row">
											<div class="col-md-12" align="center">
												<table>
													<tbody><tr>
														<td width="50%" style="padding:0;">
															<input type="text" class="form-control text-center" id="edukasipasien_zpjttd1" readonly="readonly">
														</td>
													</tr>
												</tbody></table>
											</div>
										</div>
										<div class="form-group row">
											<div class="col-md-12" align="center">
												<label class="col-form-label">Nama &amp; Tanda tangan</label>
											</div>
										</div>
										<div class="form-group row">
											<div align="center" class="col-md-12">
												<button id="edukasipasien_btclearttd1" type="button" class="btn btn-sm btn-warning">Reset</button>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<div class="col-md-12" align="center">
												<label class="col-form-label">Petugas Edukasi</label>
											</div>
										</div>
										<div class="form-group row d-none" id="edukasipasien_divqrcode">
											<div class="col-md-12" align="center">
												<img id="edukasipasien_qrcode">
											</div>
										</div>											
										<div class="table-responsive" align="center">
											<table class="table table-condensed d-none" style="width:250px; height: 120px;">
												<tbody>
													<tr>
														<td width="30%" style="padding:0;">
															<div id="edukasipasien_ttdid2" class="sigPad border border-dark" style="width:250px;">
																<a id="edukasipasien_resetttd2" class="clearButton btn btn-primary " href="#clear" hidden="true" style="display: block;">Reset</a>
																<div class="sig sigWrapper border border-dark current" style="height: auto; display: block;">
																	<canvas id="edukasipasien_ttd2" class="pad" width="240" height="120"></canvas>
																	<input id="edukasipasien_codesig2" type="hidden" name="output-3" class="output" value="">
																</div>
															</div>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
										<div class="form-group row">
											<div class="col-md-12" align="center">
												<table>
													<tbody>
														<tr>
															<td width="50%" style="padding:0;">
																<input type="text" class="form-control text-center" id="edukasipasien_zpjttd2" readonly="readonly">
															</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<div class="form-group row">
											<div class="col-md-12" align="center">
												<label class="col-form-label">Nama &amp; Tanda tangan</label>
											</div>
										</div>
										<div class="form-group row">
											<div align="center" class="col-md-12">
												<button id="edukasipasien_btttd1" type="button" class="btn btn-sm btn-danger d-none">Validasi</button>
											</div>
										</div>
									</div>		
								</div> -->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group row">
											<div class="col-md-12" align="center">
												<label class="col-form-label">Pihak Keluarga / Pasien</label>
											</div>
										</div>

										<div class="card ml-5 mr-5 mt-2" align="center">
											<div class="col-md-12" id="paint_ttdedukasipasien_pasien"></div>
										</div>

										<div class="col-md-12" align="center">
											<label class="col-form-label">Nama &amp; Tanda tangan</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<div class="col-md-12" align="center">
												<label class="col-form-label">Petugas</label>
											</div>

											<div class="card ml-5 mr-5 mt-2" align="center">
												<div class="col-md-12" id="paint_ttdedukasipasien_petugas"></div>
											</div>

											<div class="col-md-12" align="center">
												<label class="col-form-label">Nama &amp; Tanda tangan</label>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card-footer">
								<button id="edukasipasien_btnsave" onclick="save_detail_edukasi_irna()" type="button" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Simpan Edukasi</button>
								<button id="edukasipasien_btresetdiag" type="button" class="btn btn-sm btn-danger" onclick="dismiss_modaledukasipasien();"><i class="fa fa-times"></i> Batal</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

var listperawat 	= [];

var ttdedukasipasien_pasien 		= new WPaintX('paint_ttdedukasipasien_pasien');
var ttdedukasipasien_petugas 		= new WPaintX('paint_ttdedukasipasien_petugas');

ttdedukasipasien_pasien.show();
ttdedukasipasien_petugas.show();
document.getElementById('edukasipasien_tgledukasi').value  = nowday;
var edukasipasien_tgledukasi   = "edukasipasien_tgledukasi";
max_date(edukasipasien_tgledukasi);

var getmetodeedukasi 	= document.querySelectorAll('input[name=\"metodeedukasipasien\"]');
var getmediaedukasi 	= document.querySelectorAll('input[name=\"mediaedukasipasien\"]');
var getresponedukasi 	= document.querySelectorAll('input[name=\"responveredukasipasien\"]');

var metode 	= 0;
var media 	= 0;
var respon 	= 0;

getmetodeedukasi.forEach(function(radio) {
  radio.addEventListener('change', function() {
    metode = document.querySelector('input[name="metodeedukasipasien"]:checked').value;
    console.log(metode);
  })
});

getmediaedukasi.forEach(function(radio) {
  radio.addEventListener('change', function() {
    media = document.querySelector('input[name="mediaedukasipasien"]:checked').value;
    console.log(media);
  })
});

getresponedukasi.forEach(function(radio) {
  radio.addEventListener('change', function() {
    respon = document.querySelector('input[name="responveredukasipasien"]:checked').value;
    console.log(respon);
  })
});

function edukasipasien_dprogram_19() {
	const edukasipasien_dprogram_19 = document.getElementById("edukasipasien_dprogram_19").checked;
	if (edukasipasien_dprogram_19 == false){
		document.getElementById("edukasipasien_dprogramket19").style.display     	= "none";
		document.getElementById("edukasipasien_dprogramket19").value 				= "";
	}else{
		document.getElementById("edukasipasien_dprogramket19").style.display    	= "block";
	}
}

function edukasipasien_dprogram_20() {
	const edukasipasien_dprogram_20 = document.getElementById("edukasipasien_dprogram_20").checked;
	if (edukasipasien_dprogram_20 == false){
		document.getElementById("edukasipasien_dprogramket20").style.display     	= "none";
		document.getElementById("edukasipasien_dprogramket20").value 				= "";
	}else{
		document.getElementById("edukasipasien_dprogramket20").style.display    	= "block";
	}
}

function edukasipasien_dprogram_21() {
	const edukasipasien_dprogram_21 = document.getElementById("edukasipasien_dprogram_21").checked;
	if (edukasipasien_dprogram_21 == false){
		document.getElementById("edukasipasien_dprogramket21").style.display     	= "none";
		document.getElementById("edukasipasien_dprogramket21").value 				= "";
	}else{
		document.getElementById("edukasipasien_dprogramket21").style.display    	= "block";
	}
}

function edukasipasien_bbahasa_4() {
	const edukasipasien_bbahasa_4 = document.getElementById("edukasipasien_bbahasa_4").checked;
	if (edukasipasien_bbahasa_4 == false){
		document.getElementById("edukasipasien_bbahasaket").style.display     	= "none";
		document.getElementById("edukasipasien_bbahasaket").value 				= "";
	}else{
		document.getElementById("edukasipasien_bbahasaket").style.display    	= "block";
	}
}

function edukasipasien_bedukasi_11() {
	const edukasipasien_bedukasi_11 = document.getElementById("edukasipasien_bedukasi_11").checked;
	if (edukasipasien_bedukasi_11 == false){
		document.getElementById("edukasipasien_bedukasiket11").style.display     	= "none";
		document.getElementById("edukasipasien_bedukasiket11").value 				= "";
	}else{
		document.getElementById("edukasipasien_bedukasiket11").style.display    	= "block";
	}
}

function modal_show_plusedukasipasien() {
	$('#ModalInputBidangDisiplin').modal('show');
	document.getElementById('edukasipasien_rawatId').value = 0;
	pilihjenisrawatedukasiirna();
	// $("#ModalInputBidangDisiplin").modal({backdrop: "static"});
    // $('#ModalInputBidangDisiplin').on('shown.bs.modal', function () {

    // });
	apiPOST('Setup/getuserPerawatPegawai', param, hasil => {
		var data = hasil['data'];
		if(hasil !== null){
		    listperawat = hasil['data'];
		    var opsi = document.getElementById('edukasipasien_petugas');
		    listperawat.forEach(baru => {
		        var option = document.createElement('option');
		        option.value = baru['id_pegawai'];
		        option.innerHTML = baru['nama_pegawai'];
		        opsi.appendChild(option);
		    });
		}
		document.getElementById('edukasipasien_petugas').value = user.id_pegawai;
	});
}
/*------ JENIS PETUGAS AHLI GIZI ---------*/
function edukasipasien_divtopik2() {
	document.getElementById("edukasipasien_topiklist2_1").checked 	= false;
	document.getElementById("edukasipasien_topiklist2_2").checked 	= false;
	document.getElementById("edukasipasien_topiklist2_3").checked 	= false;
	document.getElementById("edukasipasien_topiklist2_4").checked 	= false;

	edukasipasien_topiklist2_1();
	edukasipasien_topiklist2_4();
}

function edukasipasien_topiklist2_1() {
	const edukasipasien_topiklist2_1 = document.getElementById("edukasipasien_topiklist2_1").checked;
	if (edukasipasien_topiklist2_1 == false){
		document.getElementById("edukasipasien_topiklist21").style.display     	= "none";
		document.getElementById("edukasipasien_topiklist2_ket_1").value 		= "";
	}else{
		document.getElementById("edukasipasien_topiklist21").style.display    	= "block";
	}
}

function edukasipasien_topiklist2_4() {
	const edukasipasien_topiklist2_4 = document.getElementById("edukasipasien_topiklist2_4").checked;
	if (edukasipasien_topiklist2_4 == false){
		document.getElementById("edukasipasien_topiklist24").style.display     	= "none";
		document.getElementById("edukasipasien_topiklist2_ket_2").value 		= "";
	}else{
		document.getElementById("edukasipasien_topiklist24").style.display    	= "block";
	}
}
/*------ END JENIS PETUGAS AHLI GIZI ---------*/

/*------ JENIS PETUGAS PERAWAT DAN BIDAN ---------*/
function edukasipasien_divtopik1() {
	document.getElementById("edukasipasien_topiklist1_1").checked 	= false;
	document.getElementById("edukasipasien_topiklist1_2").checked 	= false;
	document.getElementById("edukasipasien_topiklist1_3").checked 	= false;
	document.getElementById("edukasipasien_topiklist1_4").checked 	= false;
	document.getElementById("edukasipasien_topiklist1_5").checked 	= false;
	document.getElementById("edukasipasien_topiklist1_6").checked 	= false;
	document.getElementById("edukasipasien_topiklist1_7").checked 	= false;
	document.getElementById("edukasipasien_topiklist1_8").checked  	= false;
	document.getElementById("edukasipasien_topiklist1_9").checked 	= false;
	document.getElementById("edukasipasien_topiklist1_10").checked 	= false;
	document.getElementById("edukasipasien_topiklist1_11").checked 	= false;
	document.getElementById("edukasipasien_topiklist1_12").checked 	= false;
	document.getElementById("edukasipasien_topiklist1_13").checked  = false;

	edukasipasien_topiklist1_7();
	edukasipasien_topiklist1_8();
	edukasipasien_topiklist1_13();
}

function edukasipasien_topiklist1_7() {
	const edukasipasien_topiklist1_7 = document.getElementById("edukasipasien_topiklist1_7").checked;
	if (edukasipasien_topiklist1_7 == false){
		document.getElementById("edukasipasien_topiklist1_7_ket").style.display     	= "none";
		document.getElementById("edukasipasien_topiklist1_7_ket_1").value 				= "";
	}else{
		document.getElementById("edukasipasien_topiklist1_7_ket").style.display    		= "block";
	}
}

function edukasipasien_topiklist1_8() {
	const edukasipasien_topiklist1_8 = document.getElementById("edukasipasien_topiklist1_8").checked;
	if (edukasipasien_topiklist1_8 == false){
		document.getElementById("edukasipasien_topiklist1_8_ket").style.display     	= "none";
		document.getElementById("edukasipasien_topiklist1_8_ket_2").value 				= "";
	}else{
		document.getElementById("edukasipasien_topiklist1_8_ket").style.display    		= "block";
	}
}

function edukasipasien_topiklist1_13() {
	const edukasipasien_topiklist1_13 = document.getElementById("edukasipasien_topiklist1_13").checked;
	if (edukasipasien_topiklist1_13 == false){
		document.getElementById("edukasipasien_topiklist1_13_ket").style.display     	= "none";
		document.getElementById("edukasipasien_topiklist1_13_ket_3").value 				= "";
	}else{
		document.getElementById("edukasipasien_topiklist1_13_ket").style.display    	= "block";
	}
}
/*------ END JENIS PETUGAS PERAWAT DAN BIDAN ---------*/

/*------ JENIS PETUGAS APOTEK ---------*/
function edukasipasien_divtopik3() {
	document.getElementById("edukasipasien_topiklist3_1").checked 	= false;
	document.getElementById("edukasipasien_topiklist3_2").checked 	= false;
	document.getElementById("edukasipasien_topiklist3_3").checked 	= false;
	document.getElementById("edukasipasien_topiklist3_4").checked 	= false;

	edukasipasien_topiklist3_4();
}

function edukasipasien_topiklist3_4() {
	const edukasipasien_topiklist3_4 = document.getElementById("edukasipasien_topiklist3_4").checked;
	if (edukasipasien_topiklist3_4 == false){
		document.getElementById("edukasipasien_topiklist34").style.display     	= "none";
		document.getElementById("edukasipasien_topiklist3_ket_1").value 		= "";
	}else{
		document.getElementById("edukasipasien_topiklist34").style.display     	= "block";
	}
}
/*------ END JENIS PETUGAS APOTEK ---------*/

/*------ JENIS PETUGAS TENAGA KESEHATAN LAINX ---------*/
function edukasipasien_divtopik4() {
	document.getElementById("edukasipasien_topiklist4_1").checked 	= false;
	document.getElementById("edukasipasien_topiklist4_2").checked 	= false;

	edukasipasien_topiklist4_1();
	edukasipasien_topiklist4_2();
}

function edukasipasien_topiklist4_1() {
	const edukasipasien_topiklist4_1 = document.getElementById("edukasipasien_topiklist4_1").checked;
	if (edukasipasien_topiklist4_1 == false){
		document.getElementById("edukasipasien_topiklist41").style.display     	= "none";
		document.getElementById("edukasipasien_topiklist4_ket_1").value 		= "";
	}else{
		document.getElementById("edukasipasien_topiklist41").style.display     	= "block";
	}
}

function edukasipasien_topiklist4_2() {
	const edukasipasien_topiklist4_2 = document.getElementById("edukasipasien_topiklist4_2").checked;
	if (edukasipasien_topiklist4_2 == false){
		document.getElementById("edukasipasien_topiklist42").style.display     	= "none";
		document.getElementById("edukasipasien_topiklist4_ket_2").value 		= "";
	}else{
		document.getElementById("edukasipasien_topiklist42").style.display     	= "block";
	}
}
/*------ END JENIS PETUGAS TENAGA KESEHATAN LAINX ---------*/

/*------ JENIS PETUGAS DOKTER ---------*/
function edukasipasien_divtopik5() {
	document.getElementById("edukasipasien_topiklist5_1").checked 	= false;
	document.getElementById("edukasipasien_topiklist5_2").checked 	= false;
	document.getElementById("edukasipasien_topiklist5_3").checked 	= false;
	document.getElementById("edukasipasien_topiklist5_4").checked 	= false;
	document.getElementById("edukasipasien_topiklist5_5").checked 	= false;
	document.getElementById("edukasipasien_topiklist5_6").checked 	= false;

	edukasipasien_topiklist5_4();
	edukasipasien_topiklist5_5();
	edukasipasien_topiklist5_6();
}

function edukasipasien_topiklist5_4() {
	const edukasipasien_topiklist5_4 = document.getElementById("edukasipasien_topiklist5_4").checked;
	if (edukasipasien_topiklist5_4 == false){
		document.getElementById("edukasipasien_topiklist54").style.display     	= "none";
		document.getElementById("edukasipasien_topiklist5_ket_1").value 		= "";
	}else{
		document.getElementById("edukasipasien_topiklist54").style.display     	= "block";
	}
}

function edukasipasien_topiklist5_5() {
	const edukasipasien_topiklist5_5 = document.getElementById("edukasipasien_topiklist5_5").checked;
	if (edukasipasien_topiklist5_5 == false){
		document.getElementById("edukasipasien_topiklist55").style.display     = "none";
		document.getElementById("edukasipasien_topiklist5_ket_2").value 		= "";
	}else{
		document.getElementById("edukasipasien_topiklist55").style.display     = "block";
	}
}

function edukasipasien_topiklist5_6() {
	const edukasipasien_topiklist5_6 = document.getElementById("edukasipasien_topiklist5_6").checked;
	if (edukasipasien_topiklist5_6 == false){
		document.getElementById("edukasipasien_topiklist56").style.display     = "none";
		document.getElementById("edukasipasien_topiklist5_ket_3").value 		= "";
	}else{
		document.getElementById("edukasipasien_topiklist56").style.display     = "block";
	}
}
/*------ END JENIS PETUGAS DOKTER ---------*/

/*------ METODE EDUKASI ---------*/
function metodeedukasipasien() {
	document.getElementById("metodeedukasipasien_1").checked 	= false;
	document.getElementById("metodeedukasipasien_2").checked 	= false;
	document.getElementById("metodeedukasipasien_3").checked 	= false;
	document.getElementById("metodeedukasipasien_4").checked 	= false;
	metode = 0;
}

function mediaedukasipasien() {
	document.getElementById("mediaedukasipasien_1").checked 	= false;
	document.getElementById("mediaedukasipasien_2").checked 	= false;
	document.getElementById("mediaedukasipasien_3").checked 	= false;
	document.getElementById("mediaedukasipasien_4").checked 	= false;
	document.getElementById("mediaedukasipasien_5").checked 	= false;
	document.getElementById("mediaedukasipasien_6").checked 	= false;
	media 	= 0;
}

function evalaasi_edukasipasien_2() {
	const evalaasi_edukasipasien_2 = document.getElementById("evalaasi_edukasipasien_2").checked;
	if (evalaasi_edukasipasien_2 == false){
		document.getElementById("evalaasi_edukasipasien_2_tgl_re").disabled     = true;
	}else{
		document.getElementById("evalaasi_edukasipasien_2_tgl_re").disabled     = false;
	}
}
/*------ END METODE EDUKASI ---------*/

function saveedukasiirnautama() {
	let checkboxes = document.querySelectorAll("input[name='edukasipasien_bedukasi']:checked");
	
	let values = [];
	checkboxes.forEach((checkbox) => {
		values.push(checkbox.value);
	});

	var arrayHambatan = JSON.stringify(values);
	
	const edukasipasien_dprogram_1 = document.getElementById("edukasipasien_dprogram_1").checked;
	const edukasipasien_dprogram_2 = document.getElementById("edukasipasien_dprogram_2").checked;
	const edukasipasien_dprogram_3 = document.getElementById("edukasipasien_dprogram_3").checked;
	const edukasipasien_dprogram_4 = document.getElementById("edukasipasien_dprogram_4").checked;
	const edukasipasien_dprogram_5 = document.getElementById("edukasipasien_dprogram_5").checked;
	const edukasipasien_dprogram_6 = document.getElementById("edukasipasien_dprogram_6").checked;
	const edukasipasien_dprogram_7 = document.getElementById("edukasipasien_dprogram_7").checked;
	const edukasipasien_dprogram_8 = document.getElementById("edukasipasien_dprogram_8").checked;
	const edukasipasien_dprogram_9 = document.getElementById("edukasipasien_dprogram_9").checked;
	const edukasipasien_dprogram_10 = document.getElementById("edukasipasien_dprogram_10").checked;
	const edukasipasien_dprogram_11 = document.getElementById("edukasipasien_dprogram_11").checked;
	const edukasipasien_dprogram_12 = document.getElementById("edukasipasien_dprogram_12").checked;
	const edukasipasien_dprogram_13 = document.getElementById("edukasipasien_dprogram_13").checked;
	const edukasipasien_dprogram_14 = document.getElementById("edukasipasien_dprogram_14").checked;
	const edukasipasien_dprogram_15 = document.getElementById("edukasipasien_dprogram_15").checked;
	const edukasipasien_dprogram_16 = document.getElementById("edukasipasien_dprogram_16").checked;
	const edukasipasien_dprogram_17 = document.getElementById("edukasipasien_dprogram_17").checked;
	const edukasipasien_dprogram_18 = document.getElementById("edukasipasien_dprogram_18").checked;
	const edukasipasien_dprogram_19 = document.getElementById("edukasipasien_dprogram_19").checked;
	const edukasipasien_dprogram_20 = document.getElementById("edukasipasien_dprogram_20").checked;
	const edukasipasien_dprogram_21 = document.getElementById("edukasipasien_dprogram_21").checked;

	if (edukasipasien_dprogram_1 == false){
		var program_1 = '';
	}else{
		var program_1 = 'true';
	}

	if (edukasipasien_dprogram_2 == false){
		var program_2 = '';
	}else{
		var program_2 = 'true';
	}

	if (edukasipasien_dprogram_3 == false){
		var program_3 = '';
	}else{
		var program_3 = 'true';
	}

	if (edukasipasien_dprogram_4 == false){
		var program_4 = '';
	}else{
		var program_4 = 'true';
	}

	if (edukasipasien_dprogram_5 == false){
		var program_5 = '';
	}else{
		var program_5 = 'true';
	}

	if (edukasipasien_dprogram_6 == false){
		var program_6 = '';
	}else{
		var program_6 = 'true';
	}

	if (edukasipasien_dprogram_7 == false){
		var program_7 = '';
	}else{
		var program_7 = 'true';
	}

	if (edukasipasien_dprogram_8 == false){
		var program_8 = '';
	}else{
		var program_8 = 'true';
	}

	if (edukasipasien_dprogram_9 == false){
		var program_9 = '';
	}else{
		var program_9 = 'true';
	}

	if (edukasipasien_dprogram_10 == false){
		var program_10 = '';
	}else{
		var program_10 = 'true';
	}

	if (edukasipasien_dprogram_11 == false){
		var program_11 = '';
	}else{
		var program_11 = 'true';
	}

	if (edukasipasien_dprogram_12 == false){
		var program_12 = '';
	}else{
		var program_12 = 'true';
	}

	if (edukasipasien_dprogram_13 == false){
		var program_13 = '';
	}else{
		var program_13 = 'true';
	}

	if (edukasipasien_dprogram_14 == false){
		var program_14 = '';
	}else{
		var program_14 = 'true';
	}

	if (edukasipasien_dprogram_15 == false){
		var program_15 = '';
	}else{
		var program_15 = 'true';
	}

	if (edukasipasien_dprogram_16 == false){
		var program_16 = '';
	}else{
		var program_16 = 'true';
	}

	if (edukasipasien_dprogram_17 == false){
		var program_17 = '';
	}else{
		var program_17 = 'true';
	}

	if (edukasipasien_dprogram_18 == false){
		var program_18 = '';
	}else{
		var program_18 = 'true';
	}

	if (edukasipasien_dprogram_19 == false){
		var program_19 = '';
	}else{
		var program_19 = 'true';
	}

	if (edukasipasien_dprogram_20 == false){
		var program_20 = '';
	}else{
		var program_20 = 'true';
	}

	if (edukasipasien_dprogram_21 == false){
		var program_21 = '';
	}else{
		var program_21 = 'true';
	}

	var edukasipasien_keyakinan = $('#edukasipasien_bkeyakinan').val();
	var edukasipasien_nilai 	= $('#edukasipasien_bnilai').val();
	var edukasipasien_alat 		= $('#edukasipasien_calat').val()
	var edukasipasien_plan 		= $('#edukasipasien_cplan').val()
	var edukasipasien_diag 		= $('#edukasipasien_cdiag').val()
	
	if ((edukasipasien_keyakinan == '')||(edukasipasien_nilai == '')||(edukasipasien_alat == '')||(edukasipasien_plan == '')||(edukasipasien_diag == '')){
		toastr.warning("Data tidak lengkap.");
		return;
	}

	var param = {
		alat  					: edukasipasien_alat,
		planning 				: edukasipasien_plan,
		diagnosa 				: edukasipasien_diag,
		diterima 				: document.querySelector('input[name=edukasipasien_bterima]:checked').value,
		hambatan 				: arrayHambatan,
		hambatan_lain 			: $('#edukasipasien_bedukasiket11').val(),
		keyakinan 				: edukasipasien_keyakinan,
		nilai  					: edukasipasien_nilai,
		kemampuan 				: document.querySelector('input[name=edukasipasien_bkemampuan]:checked').value,
		penerjemah 				: document.querySelector('input[name=edukasipasien_bpenerjemah]:checked').value,
		bahasa 					: document.querySelector('input[name=edukasipasien_bbahasa]:checked').value,
		bahasa_lain 			: $('#edukasipasien_bbahasaket').val(),
		tanggal 				: $('#edukasipasien_datgl').val(),
		id_pegawai  			: user.id_pegawai,
		rm          			: no_rm,
		unit        			: id_unit,
		id_kunjungan  			: id_kunjungan,
		id_transaksi  			: id_transaksi,
		kondisi_medis			: program_1,
		rencana_pengobatan		: program_2,
		hasil_pengobatan 		: program_3,
		instruksi_perawatan		: program_4,
		perubahan_kondisi		: program_5,
		hak_dan_kewajiban		: program_6,
		teknik 					: program_7,
		identifikasi  			: program_8,
		risiko_jatuh  			: program_9,
		manajemen_nyeri  		: program_10,
		pasien_terminal			: program_11,
		penggunaan_alat_medis 	: program_12,
		diet 					: program_13,
		pengelolaan_makanan 	: program_14,
		penggunaan_obat  		: program_15,
		potensi_efek  			: program_16,
		potensi_interaksi 		: program_17,
		teknik_rehabilitasi 	: program_18,
		edukasi_lain_satu     	: program_19,
		edukasi_lainket_satu    : $('#edukasipasien_dprogramket19').val(),
		edukasi_lain_dua  		: program_20,
		edukasi_lainket_dua     : $('#edukasipasien_dprogramket20').val(),
		edukasi_lain_tiga  		: program_21,
		edukasi_lainket_tiga    : $('#edukasipasien_dprogramket21').val(),
	};

	apiPOST('Rekammedisirna/saveedukasiutama', param, hasil => { })
}

function pilihjenisrawatedukasiirna() {
	document.getElementById('edukasipasien_jenisId').value 				= '0';
	document.getElementById('edukasipasien_divtopik1').style.display 	= 'none';
	document.getElementById('edukasipasien_divtopik2').style.display 	= 'none';
	document.getElementById('edukasipasien_divmateri_1').style.display	= 'none';
	document.getElementById('edukasipasien_divmateri_2').style.display	= 'none';
	document.getElementById('edukasipasien_divmateri_3').style.display 	= 'none';
	document.getElementById('edukasipasien_divtopik3').style.display 	= 'none';
	document.getElementById('edukasipasien_divtopik4').style.display 	= 'none';
	document.getElementById('edukasipasien_divtopik5').style.display 	= 'none';
	document.getElementById('metodeedukasipasien').style.display 				= 'none';
	document.getElementById('edukasipasien_ttdpasien').style.display 	= 'none';
}

function pilihmateriedukasiirna() {
	var pilihjenisrawat = document.getElementById('edukasipasien_rawatId').value;
	if (pilihjenisrawat == '0'){
		toastr.error("Jenis Rawat Belum Dipilih!");
		return;
	}

	var pilihjenispetugas = document.getElementById('edukasipasien_jenisId').value;
	switch (pilihjenispetugas){
		case "0":
			document.getElementById('edukasipasien_divtopik1').style.display 	= 'none';
			document.getElementById('edukasipasien_divtopik2').style.display 	= 'none';
			document.getElementById('edukasipasien_divmateri_1').style.display	= 'none';
			document.getElementById('edukasipasien_divmateri_2').style.display	= 'none';
			document.getElementById('edukasipasien_divmateri_3').style.display 	= 'none';
			document.getElementById('edukasipasien_divtopik3').style.display 	= 'none';
			document.getElementById('edukasipasien_divtopik4').style.display 	= 'none';
			document.getElementById('edukasipasien_divtopik5').style.display 	= 'none';
			document.getElementById('metodeedukasipasien').style.display 		= 'none';
			document.getElementById('edukasipasien_ttdpasien').style.display 	= 'none';
			break;
		case "1":
			document.getElementById('edukasipasien_divtopik1').style.display	= 'none';
			document.getElementById('edukasipasien_divtopik2').style.display	= 'block';
			document.getElementById('edukasipasien_divmateri_1').style.display	= 'none';
			document.getElementById('edukasipasien_divmateri_2').style.display	= 'none';
			document.getElementById('edukasipasien_divmateri_3').style.display	= 'block';
			document.getElementById('edukasipasien_divtopik3').style.display	= 'none';
			document.getElementById('edukasipasien_divtopik4').style.display	= 'none';
			document.getElementById('edukasipasien_divtopik5').style.display	= 'none';
			
			document.getElementById('metodeedukasipasien').style.display 		= 'block';
			document.getElementById('edukasipasien_ttdpasien').style.display 	= 'block';
			break;
		case "2":
			document.getElementById('edukasipasien_divtopik1').style.display	= 'block';
			document.getElementById('edukasipasien_divtopik2').style.display	= 'none';
			document.getElementById('edukasipasien_divmateri_1').style.display	= 'block';
			document.getElementById('edukasipasien_divmateri_2').style.display	= 'none';
			document.getElementById('edukasipasien_divmateri_3').style.display	= 'none';
			document.getElementById('edukasipasien_divtopik3').style.display	= 'none';
			document.getElementById('edukasipasien_divtopik4').style.display	= 'none';
			document.getElementById('edukasipasien_divtopik5').style.display	= 'none';
			
			document.getElementById('metodeedukasipasien').style.display 		= 'block';
			document.getElementById('edukasipasien_ttdpasien').style.display 	= 'block';
			break;
		case "3":
			document.getElementById('edukasipasien_divtopik1').style.display	= 'block';
			document.getElementById('edukasipasien_divtopik2').style.display	= 'none';
			document.getElementById('edukasipasien_divmateri_1').style.display	= 'none';
			document.getElementById('edukasipasien_divmateri_2').style.display	= 'block';
			document.getElementById('edukasipasien_divmateri_3').style.display	= 'none';
			document.getElementById('edukasipasien_divtopik3').style.display	= 'none';
			document.getElementById('edukasipasien_divtopik4').style.display	= 'none';
			document.getElementById('edukasipasien_divtopik5').style.display	= 'none';

			document.getElementById('metodeedukasipasien').style.display 		= 'block';
			document.getElementById('edukasipasien_ttdpasien').style.display 	= 'block';
			break;
		case "4":
			document.getElementById('edukasipasien_divtopik1').style.display	= 'none';
			document.getElementById('edukasipasien_divtopik2').style.display	= 'none';
			document.getElementById('edukasipasien_divmateri_1').style.display	= 'none';
			document.getElementById('edukasipasien_divmateri_2').style.display	= 'none';
			document.getElementById('edukasipasien_divmateri_3').style.display	= 'none';
			document.getElementById('edukasipasien_divtopik3').style.display	= 'none';
			document.getElementById('edukasipasien_divtopik4').style.display	= 'none';
			document.getElementById('edukasipasien_divtopik5').style.display	= 'block';

			document.getElementById('metodeedukasipasien').style.display 		= 'block';
			document.getElementById('edukasipasien_ttdpasien').style.display 	= 'block';
			break;
		case "5":
			document.getElementById('edukasipasien_divtopik1').style.display	= 'none';
			document.getElementById('edukasipasien_divtopik2').style.display	= 'none';
			document.getElementById('edukasipasien_divmateri_1').style.display	= 'none';
			document.getElementById('edukasipasien_divmateri_2').style.display	= 'none';
			document.getElementById('edukasipasien_divmateri_3').style.display	= 'none';
			document.getElementById('edukasipasien_divtopik3').style.display	= 'none';
			document.getElementById('edukasipasien_divtopik4').style.display	= 'block';
			document.getElementById('edukasipasien_divtopik5').style.display	= 'none';

			document.getElementById('metodeedukasipasien').style.display 		= 'block';
			document.getElementById('edukasipasien_ttdpasien').style.display 	= 'block';
			break;
		case "6":
			document.getElementById('edukasipasien_divtopik1').style.display	= 'none';
			document.getElementById('edukasipasien_divtopik2').style.display	= 'none';
			document.getElementById('edukasipasien_divmateri_1').style.display	= 'none';
			document.getElementById('edukasipasien_divmateri_2').style.display	= 'none';
			document.getElementById('edukasipasien_divmateri_3').style.display	= 'none';
			document.getElementById('edukasipasien_divtopik3').style.display	= 'block';
			document.getElementById('edukasipasien_divtopik4').style.display	= 'none';
			document.getElementById('edukasipasien_divtopik5').style.display	= 'none';

			document.getElementById('metodeedukasipasien').style.display 		= 'block';
			document.getElementById('edukasipasien_ttdpasien').style.display 	= 'block';
			break;
	}
}

function save_detail_edukasi_irna() {
	var pilihjenispetugas 	= document.getElementById('edukasipasien_jenisId').value;
	var pilihjenisrawat 	= document.getElementById('edukasipasien_rawatId').value;
	if (metode == 0){
		toastr.error("Metode Edukasi Belum Diisi!");
		return;
	}else{
		metode = document.querySelector('input[name="metodeedukasipasien"]:checked').value;
	}

	if (media == 0){
		toastr.error("Media Edukasi Belum Diisi!");
		return;
	}else{
		media = document.querySelector('input[name="mediaedukasipasien"]:checked').value;
	}

	if (respon == 0){
		toastr.error("Respon Verifikasi Belum Diisi!");
		return;
	}else{
		respon = document.querySelector('input[name="responveredukasipasien"]:checked').value;
	}

	switch (pilihjenispetugas){
		// Ahli Gizi
		case "1":
			let detailtopikAhliGizi_cekbox = document.querySelectorAll("input[name='edukasipasien_ahligizi']:checked");
			let detailtopikAhliGizi_values = [];
			detailtopikAhliGizi_cekbox.forEach((detailtopikAhliGizi_cekbox) => {
				detailtopikAhliGizi_values.push(detailtopikAhliGizi_cekbox.value);
			});

			var detailtopikAhliGizi = JSON.stringify(detailtopikAhliGizi_values);
			
			var param = {
				id_pegawai    	: $('#edukasipasien_petugas').val(),
				id_user    		: user.id_pegawai,
				norm          	: no_rm,
				unit        	: id_unit,
				id_kunjungan  	: id_kunjungan,
				id_transaksi  	: id_transaksi,
				jenispetugas	: pilihjenispetugas,
				jenisrawat		: pilihjenisrawat,
				nama    		: $('#edukasipasien_nama').val(),
				hub     		: $('#edukasipasien_hub').val(),
				tgl     		: $('#edukasipasien_tgledukasi').val(),
				waktu   		: $('#edukasipasien_waktu').val(),
				metode  		: metode,
				media   		: media,
				respon  		: respon,
				evaluasi		: document.querySelector('input[name=evalaasi_edukasipasien]:checked').value,
				tgl_reevaluasi 	: $('#evalaasi_edukasipasien_2_tgl_re').val(),
				topik  			: detailtopikAhliGizi,
				ket_ahligizi1 	: $('#edukasipasien_topiklist2_ket_1').val(),
				ket_ahligizi2 	: $('#edukasipasien_topiklist2_ket_2').val(),
			}
			break;
		// Perawat
		case "2":
			let detailtopikPerawat_cekbox = document.querySelectorAll("input[name='edukasipasien_perawat']:checked");
			let detailtopikPerawat_values = [];
			detailtopikPerawat_cekbox.forEach((detailtopikPerawat_cekbox) => {
				detailtopikPerawat_values.push(detailtopikPerawat_cekbox.value);
			});

			var detailtopikPerawat = JSON.stringify(detailtopikPerawat_values);

			var param = {
				id_pegawai    	: $('#edukasipasien_petugas').val(),
				id_user    		: user.id_pegawai,
				norm          	: no_rm,
				unit        	: id_unit,
				id_kunjungan  	: id_kunjungan,
				id_transaksi  	: id_transaksi,
				jenispetugas	: pilihjenispetugas,
				jenisrawat		: pilihjenisrawat,
				nama    		: $('#edukasipasien_nama').val(),
				hub     		: $('#edukasipasien_hub').val(),
				tgl     		: $('#edukasipasien_tgledukasi').val(),
				waktu   		: $('#edukasipasien_waktu').val(),
				metode  		: metode,
				media   		: media,
				respon  		: respon,
				evaluasi		: document.querySelector('input[name=evalaasi_edukasipasien]:checked').value,
				tgl_reevaluasi 	: $('#evalaasi_edukasipasien_2_tgl_re').val(),
				topik  			: detailtopikPerawat,
				ket_perawat1 	: $('#edukasipasien_topiklist1_7_ket_1').val(),
				ket_perawat2 	: $('#edukasipasien_topiklist1_8_ket_2').val(),
				ket_perawat3 	: $('#edukasipasien_topiklist1_13_ket_3').val(),
			}
			break;
		// Bidan
		case "3":
			let detailtopikBidan_cekbox = document.querySelectorAll("input[name='edukasipasien_perawat']:checked");
			let detailtopikBidan_values = [];
			detailtopikBidan_cekbox.forEach((detailtopikBidan_cekbox) => {
				detailtopikBidan_values.push(detailtopikBidan_cekbox.value);
			});

			var detailtopikBidan = JSON.stringify(detailtopikBidan_values);

			var param = {
				id_pegawai    	: $('#edukasipasien_petugas').val(),
				id_user    		: user.id_pegawai,
				norm          	: no_rm,
				unit        	: id_unit,
				id_kunjungan  	: id_kunjungan,
				id_transaksi  	: id_transaksi,
				jenispetugas	: pilihjenispetugas,
				jenisrawat		: pilihjenisrawat,
				nama    		: $('#edukasipasien_nama').val(),
				hub     		: $('#edukasipasien_hub').val(),
				tgl     		: $('#edukasipasien_tgledukasi').val(),
				waktu   		: $('#edukasipasien_waktu').val(),
				metode  		: metode,
				media   		: media,
				respon  		: respon,
				evaluasi		: document.querySelector('input[name=evalaasi_edukasipasien]:checked').value,
				tgl_reevaluasi 	: $('#evalaasi_edukasipasien_2_tgl_re').val(),
				topik  			: detailtopikBidan,
				ket_perawat1 	: $('#edukasipasien_topiklist1_7_ket_1').val(),
				ket_perawat2 	: $('#edukasipasien_topiklist1_8_ket_2').val(),
				ket_perawat3 	: $('#edukasipasien_topiklist1_13_ket_3').val(),
			}
			break;
		// Dokter
		case "4":
			let detailtopikDokter_cekbox = document.querySelectorAll("input[name='edukasipasien_dokter']:checked");
			let detailtopikDokter_values = [];
			detailtopikDokter_cekbox.forEach((detailtopikDokter_cekbox) => {
				detailtopikDokter_values.push(detailtopikDokter_cekbox.value);
			});

			var detailtopikDokter = JSON.stringify(detailtopikDokter_values);

			var param = {
				id_pegawai    	: $('#edukasipasien_petugas').val(),
				id_user    		: user.id_pegawai,
				norm          	: no_rm,
				unit        	: id_unit,
				id_kunjungan  	: id_kunjungan,
				id_transaksi  	: id_transaksi,
				jenispetugas	: pilihjenispetugas,
				jenisrawat		: pilihjenisrawat,
				nama    		: $('#edukasipasien_nama').val(),
				hub     		: $('#edukasipasien_hub').val(),
				tgl     		: $('#edukasipasien_tgledukasi').val(),
				waktu   		: $('#edukasipasien_waktu').val(),
				metode  		: metode,
				media   		: media,
				respon  		: respon,
				evaluasi		: document.querySelector('input[name=evalaasi_edukasipasien]:checked').value,
				tgl_reevaluasi 	: $('#evalaasi_edukasipasien_2_tgl_re').val(),
				topik  			: detailtopikDokter,
				ket_dokter1 	: $('#edukasipasien_topiklist5_ket_1').val(),
				ket_dokter2 	: $('#edukasipasien_topiklist5_ket_2').val(),
				ket_dokter3 	: $('#edukasipasien_topiklist5_ket_3').val(),
			}
			break;
		// Tenaga Kesehatan Lainnya
		case "5":
			let detailtopikTenKes_cekbox = document.querySelectorAll("input[name='edukasipasien_tenkes']:checked");
			let detailtopikTenKes_values = [];
			detailtopikTenKes_cekbox.forEach((detailtopikTenKes_cekbox) => {
				detailtopikTenKes_values.push(detailtopikTenKes_cekbox.value);
			});

			var detailtopikTenKes = JSON.stringify(detailtopikTenKes_values);

			var param = {
				id_pegawai    	: $('#edukasipasien_petugas').val(),
				id_user    		: user.id_pegawai,
				norm          	: no_rm,
				unit        	: id_unit,
				id_kunjungan  	: id_kunjungan,
				id_transaksi  	: id_transaksi,
				jenispetugas	: pilihjenispetugas,
				jenisrawat		: pilihjenisrawat,
				nama    		: $('#edukasipasien_nama').val(),
				hub     		: $('#edukasipasien_hub').val(),
				tgl     		: $('#edukasipasien_tgledukasi').val(),
				waktu   		: $('#edukasipasien_waktu').val(),
				metode  		: metode,
				media   		: media,
				respon  		: respon,
				evaluasi		: document.querySelector('input[name=evalaasi_edukasipasien]:checked').value,
				tgl_reevaluasi 	: $('#evalaasi_edukasipasien_2_tgl_re').val(),
				topik  			: detailtopikTenKes,
				ket_tenagakes1 	: $('#edukasipasien_topiklist4_ket_1').val(),
				ket_tenagakes2 	: $('#edukasipasien_topiklist4_ket_2').val(),
			}
			break;
		// Apoteker
		case "6":
			let detailtopikApotek_cekbox = document.querySelectorAll("input[name='edukasipasien_apotek']:checked");
			let detailtopikApotek_values = [];
			detailtopikApotek_cekbox.forEach((detailtopikApotek_cekbox) => {
				detailtopikApotek_values.push(detailtopikApotek_cekbox.value);
			});

			var detailtopikApotek = JSON.stringify(detailtopikApotek_values);

			var param = {
				id_pegawai    	: $('#edukasipasien_petugas').val(),
				id_user    		: user.id_pegawai,
				norm          	: no_rm,
				unit        	: id_unit,
				id_kunjungan  	: id_kunjungan,
				id_transaksi  	: id_transaksi,
				jenispetugas	: pilihjenispetugas,
				jenisrawat		: pilihjenisrawat,
				nama    		: $('#edukasipasien_nama').val(),
				hub     		: $('#edukasipasien_hub').val(),
				tgl     		: $('#edukasipasien_tgledukasi').val(),
				waktu   		: $('#edukasipasien_waktu').val(),
				metode  		: metode,
				media   		: media,
				respon  		: respon,
				evaluasi		: document.querySelector('input[name=evalaasi_edukasipasien]:checked').value,
				tgl_reevaluasi 	: $('#evalaasi_edukasipasien_2_tgl_re').val(),
				topik  			: detailtopikApotek,
				ket_apoteker1 	: $('#edukasipasien_topiklist3_ket_1').val()
			}
			break;
	}

	apiPOST('Rekammedisirna/saveedukasiirna', param, hasil => {
		if (hasil['data'] != null){
			if (hasil['code'] == 200){
				toastr.info(hasil['pesan']);
				dismiss_modaledukasipasien();
			}
		}
		load_detailedukasi_irna();
		dismiss_modaledukasipasien();
	})

}

function load_detailedukasi_irna() {
	document.getElementById("loading_edukasibidangdisiplin_irna").style.display = 'block';
	var param = {
		norm          	: no_rm,
		id_kunjungan  	: id_kunjungan,
		id_transaksi  	: id_transaksi,
	};
	
	apiPOST('Rekammedisirna/load_edukasiirnautama', param, hasil => {
		document.getElementById("loading_edukasibidangdisiplin_irna").style.display = 'none';
		if (hasil['data'] != null){
			var DetailEdukasi  	= hasil['detail'];
			$('#tabel_bidangdisiplin tbody').html('');
			if (DetailEdukasi.length > 0){
				for (var d = 0; d < DetailEdukasi.length; d++) {
					var date_created 		= DetailEdukasi[d].date_created;
					var id_edukasi 			= DetailEdukasi[d].id_edukasi;
					var jenis_rawat 		= DetailEdukasi[d].jenis_rawat;
					var jenis_petugas 		= DetailEdukasi[d].jenis_petugas;
					var id_pegawai 			= DetailEdukasi[d].id_pegawai;
					var nama_pegawai		= DetailEdukasi[d].nama_pegawai;
					var id_transaksi 		= DetailEdukasi[d].id_transaksi;
					var norm 				= DetailEdukasi[d].norm;
					var tgl_edukasi 		= DetailEdukasi[d].tgl_edukasi;
					var nama 				= DetailEdukasi[d].nama;
					var hub_dg_pasien 		= DetailEdukasi[d].hub_dg_pasien;
					var waktu 				= DetailEdukasi[d].waktu;
					var metode 				= DetailEdukasi[d].metode;
					var media 				= DetailEdukasi[d].media;
					var respon_verifikasi 	= DetailEdukasi[d].respon_verifikasi;
					var evaluasi 			= DetailEdukasi[d].evaluasi;
					var tgl_reevaluasi 		= DetailEdukasi[d].tgl_reevaluasi;
					var topik_edukasi 		= DetailEdukasi[d].topik_edukasi;
					var ket_ahligizi1 		= DetailEdukasi[d].ket_ahligizi1;
					var ket_ahligizi2 		= DetailEdukasi[d].ket_ahligizi2;
					var ket_perawat1 		= DetailEdukasi[d].ket_perawat1;
					var ket_perawat2 		= DetailEdukasi[d].ket_perawat2;
					var ket_perawat3 		= DetailEdukasi[d].ket_perawat3;
					var ket_dokter1 		= DetailEdukasi[d].ket_dokter1;
					var ket_dokter2 		= DetailEdukasi[d].ket_dokter2;
					var ket_dokter3 		= DetailEdukasi[d].ket_dokter3;
					var ket_tenagakes1 		= DetailEdukasi[d].ket_tenagakes1;
					var ket_tenagakes2 		= DetailEdukasi[d].ket_tenagakes2;
					var ket_apoteker1 		= DetailEdukasi[d].ket_apoteker1;

					show_bidangdisiplin(date_created, id_edukasi, jenis_rawat, jenis_petugas, id_pegawai, nama_pegawai, id_transaksi, norm, tgl_edukasi, nama, hub_dg_pasien, waktu, metode, media, respon_verifikasi, evaluasi, tgl_reevaluasi, topik_edukasi, ket_ahligizi1, ket_ahligizi2, ket_perawat1, ket_perawat2, ket_perawat3, ket_dokter1, ket_dokter2, ket_dokter3, ket_tenagakes1, ket_tenagakes2, ket_apoteker1);
				}
			}else{
				var tabel = '';
					tabel += '<tr style="font-weight:bold;">';
						tabel += '<td align="center" colspan="11"><h5>Belum Ada Data</h5></td>';
					tabel += '</tr>';
				
				$('#tabel_bidangdisiplin').append(tabel);
			}
	    }else{
	     	toastr.error("Edukasi Kosong!!");
	    }
	})
}

function show_bidangdisiplin(date_created, id_edukasi, jenis_rawat, jenis_petugas, id_pegawai, nama_pegawai, id_transaksi, norm, tgl_edukasi, nama, hub_dg_pasien, waktu, metode, media, respon_verifikasi, evaluasi, tgl_reevaluasi, topik_edukasi, ket_ahligizi1, ket_ahligizi2, ket_perawat1, ket_perawat2, ket_perawat3, ket_dokter1, ket_dokter2, ket_dokter3, ket_tenagakes1, ket_tenagakes2, ket_apoteker1){
	
	var satu 		= '';
	var dua 		= '';
	var tiga 		= '';
	var empat 		= '';
	var lima 		= '';
	var enam 		= '';
	var tujuh 		= '';
	var delapan 	= '';
	var sembilan 	= '';
	var puluh 		= '';
	var sebelas 	= '';
	var duablas 	= '';
	var tgablas 	= '';

  	var tabel = '';
		tabel += '<tr style="font-weight:bold;">';
		tabel += '<td style="vertical-align: middle;"><button type="button" class="btn btn-xs btn-danger" onclick="hapus_edukasipasien('+"'"+id_edukasi+"','"+id_transaksi+"','"+norm+"'"+')" style="width:100%"><i class="fa fa-times"></i></button></td>';
		if (metode == 1){
			tabel += '<td style="vertical-align: middle;">Ceramah & Tanya Jawab</td>';
		}else if (metode == 2){
			tabel += '<td style="vertical-align: middle;">Diskusi</td>';
		}else if (metode == 3){
			tabel += '<td style="vertical-align: middle;">Demonstrasi / Peragaan</td>';
		}else if (metode == 4){
			tabel += '<td style="vertical-align: middle;">Audiovisual</td>';
		}else{
			tabel += '<td style="vertical-align: middle;">Tidak diketahui</td>';
		}

		var dta = topik_edukasi.split(',');
		if (jenis_petugas == 1){ //AHLI GIZI
			for(var i=0; i<dta.length; i++){
				if (dta[i] == 1){
					satu 	= '<i class="fas fa-check"></i> Diet dan Nutrisi : '+ket_ahligizi1+'<br>';
				}
				if (dta[i] == 2){
					dua 	= '<i class="fas fa-check"></i> Pengelolaan Makanan yang dibawa dari luar RS <br>';
				}
				if (dta[i] == 3){
					tiga 	= '<i class="fas fa-check"></i> Penyimpanan Makanan <br>';
				}
				if (dta[i] == 4){
					empat 	= '<i class="fas fa-check"></i> '+ket_ahligizi2;
				}
			}
		}else if (jenis_petugas == 2){ //PERAWAT

			for(var i=0; i<dta.length; i++){

				if (dta[i] == 1){
					satu 	= '<i class="fas fa-check"></i> Hak dan Kewajiban Pasien <br>';
				}
				if (dta[i] == 2){
					dua 	= '<i class="fas fa-check"></i> Teknik Cuci Tangan <br>';
				}
				if (dta[i] == 3){
					tiga 	= '<i class="fas fa-check"></i> Identifikasi Pasien <br>';
				}
				if (dta[i] == 4){
					empat 	= '<i class="fas fa-check"></i> Risiko Jatuh <br>';
				}
				if (dta[i] == 5){
					lima 	= '<i class="fas fa-check"></i> Manajemen Nyeri <br>';
				}
				if (dta[i] == 6){
					enam 	= '<i class="fas fa-check"></i> Pasien Terminal <br>';
				}
				if (dta[i] == 7){
					tujuh 	= '<i class="fas fa-check"></i> Perawatan Lanjutan setelah Pasien Pulang : '+ket_perawat1+'<br>';
				}
				if (dta[i] == 8){
					delapan = '<i class="fas fa-check"></i> Penggunaan Alat Medis : '+ket_perawat2+'<br>';
				}
				if (dta[i] == 9){
					sembilan = '<i class="fas fa-check"></i> Orientasi Ruangan <br>';
				}
				if (dta[i] == 10){
					puluh 	= '<i class="fas fa-check"></i> Perawatan Metode Kangguru <br>';
				}
				if (dta[i] == 11){
					sebelas = '<i class="fas fa-check"></i> Inisiasi Menyusu Dini<br>';
				}
				if (dta[i] == 12){
					duablas = '<i class="fas fa-check"></i> Asi Eksklusif<br>';
				}
				if (dta[i] == 13){
					tgablas = '<i class="fas fa-check"></i> '+ket_perawat3;
				}
			}
		}else if (jenis_petugas == 3){ //BIDAN
			for(var i=0; i<dta.length; i++){
				if (dta[i] == 1){
					satu 	= '<i class="fas fa-check"></i> Hak dan Kewajiban Pasien <br>';
				}
				if (dta[i] == 2){
					dua 	= '<i class="fas fa-check"></i> Teknik Cuci Tangan <br>';
				}
				if (dta[i] == 3){
					tiga 	= '<i class="fas fa-check"></i> Identifikasi Pasien <br>';
				}
				if (dta[i] == 4){
					empat 	= '<i class="fas fa-check"></i> Risiko Jatuh <br>';
				}
				if (dta[i] == 5){
					lima 	= '<i class="fas fa-check"></i> Manajemen Nyeri <br>';
				}
				if (dta[i] == 6){
					enam 	= '<i class="fas fa-check"></i> Pasien Terminal <br>';
				}
				if (dta[i] == 7){
					tujuh 	= '<i class="fas fa-check"></i> Perawatan Lanjutan setelah Pasien Pulang : '+ket_perawat1+'<br>';
				}
				if (dta[i] == 8){
					delapan = '<i class="fas fa-check"></i> Penggunaan Alat Medis : '+ket_perawat2+'<br>';
				}
				if (dta[i] == 9){
					sembilan = '<i class="fas fa-check"></i> Orientasi Ruangan <br>';
				}
				if (dta[i] == 10){
					puluh 	= '<i class="fas fa-check"></i> Perawatan Metode Kangguru <br>';
				}
				if (dta[i] == 11){
					sebelas = '<i class="fas fa-check"></i> Inisiasi Menyusu Dini<br>';
				}
				if (dta[i] == 12){
					duablas = '<i class="fas fa-check"></i> Asi Eksklusif<br>';
				}
				if (dta[i] == 13){
					tgablas = '<i class="fas fa-check"></i> '+ket_perawat3;
				}
			}
		}else if (jenis_petugas == 4){ //DOKTER
			for(var i=0; i<dta.length; i++){
				if (dta[i] == 1){
					satu 	= '<i class="fas fa-check"></i> Kondisi Medis dan Diagnosis <br>';
				}
				if (dta[i] == 2){
					dua 	= '<i class="fas fa-check"></i> Rencana Pengobatan dan Perawatan <br>';
				}
				if (dta[i] == 3){
					tiga 	= '<i class="fas fa-check"></i> Hasil Pengobatan / Asuhan yang di harapkan dan yang tidak di harapkan <br>';
				}
				if (dta[i] == 4){
					empat 	= '<i class="fas fa-check"></i> Instruksi Perawatan Lanjutan di Rumah : '+ket_dokter1+' <br>';
				}
				if (dta[i] == 5){
					lima 	= '<i class="fas fa-check"></i> Perubahan Kondisi Pasien : '+ket_dokter2+' <br>';
				}
				if (dta[i] == 6){
					enam 	= '<i class="fas fa-check"></i> '+ket_dokter3;
				}
			}
		}else if (jenis_petugas == 5){ //TEN KES
			for(var i=0; i<dta.length; i++){
				if (dta[i] == 1){
					satu 	= '<i class="fas fa-check"></i> Teknik Rehabilitasi : '+ket_tenagakes1+' <br>';
				}
				if (dta[i] == 2){
					dua 	= '<i class="fas fa-check"></i> '+ket_tenagakes2;
				}
			}
		}else if (jenis_petugas == 6){ //APOTEKER
			for(var i=0; i<dta.length; i++){
				if (dta[i] == 1){
					satu 	= '<i class="fas fa-check"></i> Penggunaan Obat Secara Efektif dan Aman <br>';
				}
				if (dta[i] == 2){
					dua 	= '<i class="fas fa-check"></i> Potensi Efek Samping Obat <br>';
				}
				if (dta[i] == 3){
					tiga 	= '<i class="fas fa-check"></i> Potensi Interaksi Obat ( Antar Obat / Makanan) <br>';
				}
				if (dta[i] == 4){
					empat 	= '<i class="fas fa-check"></i> '+ket_apoteker1;
				}
			}
		}

		tabel += '<td align="left p-1">'+satu+dua+tiga+empat+lima+enam+tujuh+delapan+sembilan+puluh+sebelas+duablas+tgablas+'</td>';
		tabel += '<td align="center">'+nama_pegawai+'</td>';
		tabel += '<td align="center">'+nama.toUpperCase()+'</td>';
		tabel += '<td align="center">'+hub_dg_pasien.toUpperCase()+'</td>';
		tabel += '<td align="center">'+tgl_edukasi+'</td>';
		tabel += '<td align="center">'+waktu+' /menit</td>';
			
		if (respon_verifikasi == 1){
			tabel += '<td align="center">Tidak respon sama sekali (tidak ada antusiasme dan keinginan belajar)</td>';
		}else if (respon_verifikasi == 2){
			tabel += '<td align="center">Tidak paham (ingin belajar tapi sulit mengerti)</td>';
		}else if (respon_verifikasi == 3){
			tabel += '<td align="center">Paham hal yang diajarkan, tapi tidak bisa menjelaskan sendiri</td>';
		}else if (respon_verifikasi == 4){
			tabel += '<td align="center">Dapat menjelaskan apa yang diajarkan, tapi harus dibantu edukator</td>';
		}else if (respon_verifikasi == 5){
			tabel += '<td align="center">Dapat menjelaskan apa yang telah diajarkan tanpa dibantu</td>';
		}else{
			tabel += '<td align="center">Tidak diketahui</td>';
		}

		if (evaluasi == 1){
			tabel += '<td align="center">Sudah Paham</td>';
		}else{
			tabel += '<td align="center">Re-Edukasi</td>';
		}

		if (evaluasi != 1){
			tabel += '<td align="center">'+tgl_reevaluasi+'</td>';
		}else{
			tabel += '<td align="center">-</td>';
		}
		tabel += '</tr>';
	
	$('#tabel_bidangdisiplin').append(tabel);
}

function dismiss_modaledukasipasien() {
	$('#ModalInputBidangDisiplin').modal('hide');
  	$('.modal-backdrop').hide();
}

function hapus_edukasipasien(id_edukasi, id_transaksi, norm) {
	if (id_edukasi != ''){
	    pertanyaan.fire({
	      title             : 'Hapus Edukasi Pasien',
	      html              : '<span>Data yang sudah dientry akan hilang, tetap hapus ?</span>',
	      icon              : 'question',
	      showCancelButton  : true,
	      reverseButtons    : false,
	      allowOutsideClick : false
	    }).then((result) => {
	      if (result.isConfirmed) {
			var param = {
				id_edukasi  	: id_edukasi,
				id_transaksi  	: id_transaksi,
				norm          	: norm
			};
			apiPOST('Rekammedisirna/hapus_detailedukasiirnautama', param, hasil => {
				document.getElementById("loading_edukasibidangdisiplin_irna").style.display = 'none';
				if (hasil['data'] != null){
					if (hasil['code'] == 200){
						toastr.info(hasil['pesan']);
					}
			    }
			    load_detailedukasi_irna();
			})
	      }else if(result.dismiss === Swal.DismissReason.cancel){
	        
	      }
	    })
	}else{
		toastr.error("Edukasi tidak diketahui, Reload Kembali!!");
	}
}
</script>