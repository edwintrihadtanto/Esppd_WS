<?php
$nowday     = date('Y-m-d');
$nextday    = date('Y-m-d', strtotime('+1 days', strtotime($nowday)));
?>
<div class="col-md-12 p-2">

	<div class="card card-outline card-danger">
		<div class="overlay-wrapper" id="listpasienermirna_loadingawal">
			<div class="overlay">
				<i class="fas fa-3x fa-sync-alt fa-spin"></i>
			</div>
		</div>  
		<div class="card-body p-2 darkgrey-custom" id='DivListPasienErmIrna'>
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group ">
							<label>Cari No. RM / Nama Pasien :</label>            
						<input type="search" id="searchPxRmlistermirna" class="form-control form-control" placeholder="Entry RM..." autocomplete="off">

					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Tanggal Masuk</label>
						<input type="date" name="tglcariirna" id="tglcariirna" class="form-control form-control " value="<?php echo date('Y-m-d') ;?>">
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-1">
		<div class="card">
			<div class="card-header p-0" id="Divcardlistpasienermirna">
				<div class="col-md-12 p-0" id="ermirna_listpasien2">
					<div class="card-body p-1" style="max-height: 420px; overflow: auto;">
						<div class="row" id="listpasienermirna">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="card ">
		<div class="card-header">
			<svg class="svg-inline--fa fa-user fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path></svg><!-- <i class="fas fa-user"></i> -->&nbsp;
			<label class="col-form-label font-weight-bold">ANTROPOMETRI &amp; KLINIS / FISIK</label>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group row">
						<div class="col-md-3">
							<label class="col-form-label" title="Tensi">Tekanan Darah</label>
						</div>
						<div class="col-md-5">
							<div class="input-group">
								<input type="number" onfocus="this.select();" class="form-control" id="dacriasesmengizi_ftensi1">
								<label class="col-form-label">/</label>
								<input type="number" onfocus="this.select();" class="form-control" id="dacriasesmengizi_ftensi2">
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
							<div class="input-group">
								<input type="number" onfocus="this.select();" class="form-control" id="dacriasesmengizi_jbb" onkeyup="dacriasesmengiziex.onChangeIMT();">
								<span class="input-group-append">
				                  <span class="input-group-text" id="dacriasesmengizi_divbb">Kg</span>
				                </span>
							</div>
			            </div>
			        </div>
					<div class="form-group row">
			            <div class="col-md-3">
							<label class="col-form-label">Tinggi Badan</label>
						</div>
						<div class="col-md-5">
							<div class="input-group">
								<input type="number" onfocus="this.select();" class="form-control" id="dacriasesmengizi_jtb" onkeyup="dacriasesmengiziex.onChangeIMT();">
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
							<input type="number" onfocus="this.select();" class="form-control" id="dacriasesmengizi_kimt">
			            </div>
					</div>
					<div class="form-group row">
			            <div class="col-md-3">
							<label class="col-form-label">Kategori IMT</label>
						</div>
						<div class="col-md-5">
							<label class="col-form-label font-weight-bold" id="dacriasesmengizi_hasilimt">Normal</label>
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
							<textarea rows="4" name="dacriasesmengizi_ediagnosa" id="dacriasesmengizi_ediagnosa" style="width:100%;" class="form-control "></textarea>
			            </div>
					</div>
					<div class="form-group row" style="padding-top: 4px;">
						<div class="col-md-3">
							<label class="col-form-label" title="Klinis / Fisik">Klinis / Fisik</label>
						</div>
						<div class="col-md-9">
				            <div class="row" id="dacriasesmengizi_cklinis">
				            	<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriasesmengizi_cklinis" value="1" type="checkbox" class="custom-control-input" id="dacriasesmengizi_cklinis_1">
											<label class="custom-control-label" for="dacriasesmengizi_cklinis_1">Mual</label>
										</div>
									</div>
								</div>
				            	<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriasesmengizi_cklinis" value="2" type="checkbox" class="custom-control-input" id="dacriasesmengizi_cklinis_2">
											<label class="custom-control-label" for="dacriasesmengizi_cklinis_2">Muntah</label>
										</div>
									</div>
								</div>
				            	<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriasesmengizi_cklinis" value="3" type="checkbox" class="custom-control-input" id="dacriasesmengizi_cklinis_3">
											<label class="custom-control-label" for="dacriasesmengizi_cklinis_3">Diare</label>
										</div>
									</div>
								</div>
				            	<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriasesmengizi_cklinis" value="4" type="checkbox" class="custom-control-input" id="dacriasesmengizi_cklinis_4">
											<label class="custom-control-label" for="dacriasesmengizi_cklinis_4">Konstipasi</label>
										</div>
									</div>
								</div>
				            	<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriasesmengizi_cklinis" value="5" type="checkbox" class="custom-control-input" id="dacriasesmengizi_cklinis_5">
											<label class="custom-control-label" for="dacriasesmengizi_cklinis_5">Kembung</label>
										</div>
									</div>
								</div>
				            	<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriasesmengizi_cklinis" value="6" type="checkbox" class="custom-control-input" id="dacriasesmengizi_cklinis_6">
											<label class="custom-control-label" for="dacriasesmengizi_cklinis_6">Edema</label>
										</div>
									</div>
								</div>
				            	<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriasesmengizi_cklinis" value="7" type="checkbox" class="custom-control-input" id="dacriasesmengizi_cklinis_7">
											<label class="custom-control-label" for="dacriasesmengizi_cklinis_7">Ascites</label>
										</div>
									</div>
								</div>
				            	<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriasesmengizi_cklinis" value="8" type="checkbox" class="custom-control-input" id="dacriasesmengizi_cklinis_8">
											<label class="custom-control-label" for="dacriasesmengizi_cklinis_8">Gangguan Menelan</label>
										</div>
									</div>
								</div>
				            	<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriasesmengizi_cklinis" value="9" type="checkbox" class="custom-control-input" id="dacriasesmengizi_cklinis_9">
											<label class="custom-control-label" for="dacriasesmengizi_cklinis_9">Gangguan Mengunyah</label>
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
	<div class="card ">
		<div class="card-header">
			<svg class="svg-inline--fa fa-check fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path></svg><!-- <i class="fas fa-check"></i> -->&nbsp;
			<label class="col-form-label font-weight-bold">ASESMEN / PEGKAJIAN</label>
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
							<label class="col-form-label font-italic">  * ( Sesuai Skor Skrining Gizi Pada Form Asesmen 
								Yang Dilakukan Oleh Petugas Perawat Rawat Inap )</label>
						</div>
					</div>	
					<div class="form-group row" id="dacriasesmengizi_div_brisikoId1" style="display: none;">
						<div class="col-md-0">&nbsp;&nbsp;&nbsp;&nbsp;</div>
						<div class="col-md-11">
				            <div class="row" id="dacriasesmengizi_brisikoId1">
				            	<div class="col-md-4">
				            		<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriasesmengizi_brisikoId1" value="1" type="radio" class="custom-control-input" id="dacriasesmengizi_brisikoId1_1">
											<label class="custom-control-label" for="dacriasesmengizi_brisikoId1_1">Nilai Skor &lt; 2</label>
										</div>
									</div>
								</div>
				            	<div class="col-md-4">
				            		<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriasesmengizi_brisikoId1" value="2" type="radio" class="custom-control-input" id="dacriasesmengizi_brisikoId1_2">
											<label class="custom-control-label" for="dacriasesmengizi_brisikoId1_2">Nilai Skor ≥ 2</label>
										</div>
									</div>
								</div>
				            </div>
						</div>
					</div>
					<div class="form-group row" id="dacriasesmengizi_div_brisikoId2" style="display:none;">
						<div class="col-md-0">&nbsp;&nbsp;&nbsp;&nbsp;</div>
						<div class="col-md-11">
				            <div class="row" id="dacriasesmengizi_brisikoId2">
				            	<div class="col-md-4">
				            		<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriasesmengizi_brisikoId2" value="1" type="radio" class="custom-control-input" id="dacriasesmengizi_brisikoId2_1">
											<label class="custom-control-label" for="dacriasesmengizi_brisikoId2_1">Ringan (Nilai Skor 0)</label>
										</div>
									</div>
								</div>
				            	<div class="col-md-4">
				            		<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriasesmengizi_brisikoId2" value="2" type="radio" class="custom-control-input" id="dacriasesmengizi_brisikoId2_2">
											<label class="custom-control-label" for="dacriasesmengizi_brisikoId2_2">Sedang (Nilai Skor 1-3)</label>
										</div>
									</div>
								</div>
				            	<div class="col-md-4">
				            		<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriasesmengizi_brisikoId2" value="3" type="radio" class="custom-control-input" id="dacriasesmengizi_brisikoId2_3">
											<label class="custom-control-label" for="dacriasesmengizi_brisikoId2_3">Tinggi (Nilai Skor 4-5)</label>
										</div>
									</div>
								</div>
				            </div>
						</div>
					</div>
					<div class="form-group row" id="dacriasesmengizi_div_brisikoId3" style="">
						<div class="col-md-0">&nbsp;&nbsp;&nbsp;&nbsp;</div>
						<div class="col-md-11">
				            <div class="row" id="dacriasesmengizi_brisikoId3">
				            	<div class="col-md-4">
				            		<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriasesmengizi_brisikoId3" value="1" type="radio" class="custom-control-input" id="dacriasesmengizi_brisikoId3_1">
											<label class="custom-control-label" for="dacriasesmengizi_brisikoId3_1">Ringan (Nilai Skor 0)</label>
										</div>
									</div>
								</div>
				            	<div class="col-md-4">
				            		<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriasesmengizi_brisikoId3" value="2" type="radio" class="custom-control-input" id="dacriasesmengizi_brisikoId3_2">
											<label class="custom-control-label" for="dacriasesmengizi_brisikoId3_2">Sedang (Nilai Skor 1)</label>
										</div>
									</div>
								</div>
				            	<div class="col-md-4">
				            		<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriasesmengizi_brisikoId3" value="3" type="radio" class="custom-control-input" id="dacriasesmengizi_brisikoId3_3">
											<label class="custom-control-label" for="dacriasesmengizi_brisikoId3_3">Tinggi (Nilai Skor ≥ 2)</label>
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
					<div class="form-group row" id="dacriasesmengizi_div_bverifikasiId1" style="display: none;">
						<div class="col-md-0">&nbsp;&nbsp;&nbsp;&nbsp;</div>
						<div class="col-md-11">
				            <div class="row" id="dacriasesmengizi_bverifikasiId1">
				            	<div class="col-md-4">
				            		<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriasesmengizi_bverifikasiId1" value="1" type="radio" class="custom-control-input" id="dacriasesmengizi_bverifikasiId1_1">
											<label class="custom-control-label" for="dacriasesmengizi_bverifikasiId1_1">Nilai Skor &lt; 2</label>
										</div>
									</div>
								</div>
				            	<div class="col-md-4">
				            		<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriasesmengizi_bverifikasiId1" value="2" type="radio" class="custom-control-input" id="dacriasesmengizi_bverifikasiId1_2">
											<label class="custom-control-label" for="dacriasesmengizi_bverifikasiId1_2">Nilai Skor ≥ 2</label>
										</div>
									</div>
								</div>
				            </div>
						</div>
					</div>
					<div class="form-group row" id="dacriasesmengizi_div_bverifikasiId2" style="display:none;">
						<div class="col-md-0">&nbsp;&nbsp;&nbsp;&nbsp;</div>
						<div class="col-md-11">
				            <div class="row" id="dacriasesmengizi_bverifikasiId2">
				            	<div class="col-md-4">
				            		<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriasesmengizi_bverifikasiId2" value="1" type="radio" class="custom-control-input" id="dacriasesmengizi_bverifikasiId2_1">
											<label class="custom-control-label" for="dacriasesmengizi_bverifikasiId2_1">Ringan (Nilai Skor 0)</label>
										</div>
									</div>
								</div>
				            	<div class="col-md-4">
				            		<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriasesmengizi_bverifikasiId2" value="2" type="radio" class="custom-control-input" id="dacriasesmengizi_bverifikasiId2_2">
											<label class="custom-control-label" for="dacriasesmengizi_bverifikasiId2_2">Sedang (Nilai Skor 1-3)</label>
										</div>
									</div>
								</div>
				            	<div class="col-md-4">
				            		<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriasesmengizi_bverifikasiId2" value="3" type="radio" class="custom-control-input" id="dacriasesmengizi_bverifikasiId2_3">
											<label class="custom-control-label" for="dacriasesmengizi_bverifikasiId2_3">Tinggi (Nilai Skor 4-5)</label>
										</div>
									</div>
								</div>
				            </div>
						</div>
					</div>
					<div class="form-group row" id="dacriasesmengizi_div_bverifikasiId3" style="">
						<div class="col-md-0">&nbsp;&nbsp;&nbsp;&nbsp;</div>
						<div class="col-md-11">
				            <div class="row" id="dacriasesmengizi_bverifikasiId3">
				            	<div class="col-md-4">
				            		<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriasesmengizi_bverifikasiId3" value="1" type="radio" class="custom-control-input" id="dacriasesmengizi_bverifikasiId3_1">
											<label class="custom-control-label" for="dacriasesmengizi_bverifikasiId3_1">Ringan (Nilai Skor 0)</label>
										</div>
									</div>
								</div>
				            	<div class="col-md-4">
				            		<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriasesmengizi_bverifikasiId3" value="2" type="radio" class="custom-control-input" id="dacriasesmengizi_bverifikasiId3_2">
											<label class="custom-control-label" for="dacriasesmengizi_bverifikasiId3_2">Sedang (Nilai Skor 1)</label>
										</div>
									</div>
								</div>
				            	<div class="col-md-4">
				            		<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriasesmengizi_bverifikasiId3" value="3" type="radio" class="custom-control-input" id="dacriasesmengizi_bverifikasiId3_3">
											<label class="custom-control-label" for="dacriasesmengizi_bverifikasiId3_3">Tinggi (Nilai Skor ≥ 2)</label>
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
				            <div class="row" id="dacriasesmengizi_bkondisikhususId">
				            	<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriasesmengizi_bkondisikhususId" value="1" type="radio" class="custom-control-input" id="dacriasesmengizi_bkondisikhususId_1">
											<label class="custom-control-label" for="dacriasesmengizi_bkondisikhususId_1">Tidak</label>
										</div>
									</div>
								</div>
				            	<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriasesmengizi_bkondisikhususId" value="2" type="radio" class="custom-control-input" id="dacriasesmengizi_bkondisikhususId_2">
											<label class="custom-control-label" for="dacriasesmengizi_bkondisikhususId_2">Ya</label>
										</div>
									</div>
								</div>
				            </div>
						</div>
						<div class="col-md-12 row" id="dacriasesmengizi_div_bkondisikhususId" style="display:none;">
							<div class="col-md-4"> </div>
							<div class="col-md-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
							<div class="col-md-5">
								<div class="input-group">
					                <span class="input-group-prepend">
					                	<span class="input-group-text">Sebutkan : </span>
					                </span>
									<input type="text" class="form-control" id="dacriasesmengizi_bkondisikhususlain">
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
<!-- 						<div class="col-md-0 d-none">&nbsp;&nbsp;</div> -->
<!-- 						<div class="col-md-11 row d-none"> -->
<!-- 							<div th:id="${ccm+'_pG1'}" class="col-md-12"> -->
<!-- 								<table th:id="${cur.act+'G1'}"></table> -->
<!-- 								<div th:id="${cur.act+'GP1'}"></div> -->
<!-- 							</div> -->
<!-- 						</div> -->
						<div class="col-md-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
						<div class="col-md-11">
							<label class="col-form-label" id="dacriasesmengizi_labelalergi">Tidak Ada</label>
						</div>
					</div>
					<div class="form-group row" id="dacriasesmengizi_div_diet5a" style="">
						<div class="col-md-12">
							<label class="col-form-label font-weight-bold">5. Preskripsi Diet Awal :</label>
						</div>
					</div>	
					<div class="form-group row" id="dacriasesmengizi_div_diet5b" style="">
						<div class="col-md-0">&nbsp;&nbsp;&nbsp;&nbsp;</div>
						<div class="col-md-11">
				            <div class="row" id="dacriasesmengizi_bdietId">
				            	<div class="col-md-4">
				            		<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriasesmengizi_bdietId" value="1" type="radio" class="custom-control-input" id="dacriasesmengizi_bdietId_1">
											<label class="custom-control-label" for="dacriasesmengizi_bdietId_1">Makanan Umum</label>
										</div>
									</div>
								</div>
				            	<div class="col-md-4">
				            		<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriasesmengizi_bdietId" value="2" type="radio" class="custom-control-input" id="dacriasesmengizi_bdietId_2">
											<label class="custom-control-label" for="dacriasesmengizi_bdietId_2">Makanan Khusus</label>
										</div>
									</div>
								</div>
				            </div>
						</div>
					</div>
					<div class="form-group row" style="padding-top:6px;">
						<div class="col-md-12">
							<label class="col-form-label font-weight-bold" id="dacriasesmengizi_label6">6. Tindak Lanjut : </label>
						</div>
					</div>	
					<div class="form-group row">
						<div class="col-md-0">&nbsp;&nbsp;&nbsp;&nbsp;</div>
						<div class="col-md-11">
				            <div class="row" id="dacriasesmengizi_btndklanjutId">
				            	<div class="col-md-4">
				            		<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriasesmengizi_btndklanjutId" value="1" type="radio" class="custom-control-input" id="dacriasesmengizi_btndklanjutId_1">
											<label class="custom-control-label" for="dacriasesmengizi_btndklanjutId_1">Perlu Asuhan Gizi</label>
										</div>
									</div>
								</div>
				            	<div class="col-md-4">
				            		<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriasesmengizi_btndklanjutId" value="2" type="radio" class="custom-control-input" id="dacriasesmengizi_btndklanjutId_2">
											<label class="custom-control-label" for="dacriasesmengizi_btndklanjutId_2">Belum Perlu Asuhan Gizi</label>
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