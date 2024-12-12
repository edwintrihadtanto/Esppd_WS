<?php
$nowday     = date('Y-m-d');
$nextday    = date('Y-m-d', strtotime('+1 days', strtotime($nowday)));
?>
<div class="col-md-12 p-0" id="ViewListPasienIrna">
	<div class="card-body p-1" id="DivPendafDetailRWJ"  >
		<div class="nav-tabs-khusus">
			<ul class="nav nav-tabs" role="tablist">
				<li class="nav-item" id="liassesmendokterermirna">
					<a class="nav-link active" data-toggle="pill" id="catatanreviewermirna" href="#catatanermirna" onclick="tampildokumentambahan()">Catatan Rekam medis</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="pill" id="reviewasskepirna"  onclick="viewtandavitalirnakep()" href="#assesKepErmKeperawatanIrna">Assesmen Keperawatan</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="pill" id="reviewassmedirna" onclick="viewtandavitalirna()" href="#erekammedisRWJ">Assesmen Medis</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="linksoap" data-toggle="pill" href="#cpptermirna" onclick="detailsoapiermrina();">SOAP I</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="ewsirna" href="#linkews" data-toggle="pill"  onclick="detailewsermrina();">EWS</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="pill" id="reviewresumeirna" href="#ResumeErmMedisirna" onclick="autocomplateresumeirna()">Resume</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="pill" id="reviewhistoripelayananirna" href="#rwjpendafhistoryrekammedisirna" onclick="tampilhisrmirna()">History Rekam Medis</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="pill" id="link_edukasi_irna" href="#edukasi_irna" onclick="load_edukasiirnautama()" >Edukasi Pasien</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="pill" id="link_penunjangirna" href="#historipenunjangirna"  onclick="tampilkeperawatanpenunjangradiologiirna();" >Histori Penunjang</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="pill" id="link_general_consent" href="#general_consent" onclick="startttd()">General Concent</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="pill" id="linkrencanapemulanganpasien" href="#rencanapemulanganpasien" onclick="onCall_RencanaPemulanganPasien()">Discharge Planning</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="pill" id="linkefek_samping_obat_irna" href="#efek_samping_obat_irna" >Efek Samping Obat</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="pill" id="linkasesmen_pre_anestesi" href="#asesmen_pre_anestesi" onclick="onCall_AssesmenpreAnes()" >Asesmen pre Anestesi</a>
				</li> 
				<li class="nav-item">
					<a class="nav-link" data-toggle="pill" id="linkinformasi_anestesi_sedasi" href="#informasi_anestesi_sedasi" onclick="onCall_InfAnastesiAdesi()" >Informasi Anestesi Sedasi</a>
				</li> 
				<li class="nav-item">
					<a class="nav-link" data-toggle="pill" id="linkdaftarpemberianobat" href="#daftarpemberianobat"  onclick="onCall_PemberianObat()">Daftar Pemberian Obat</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="pill" id="linkdaftarpemberianinfus" href="#daftarpemberianinfus"  onclick="onCall_PemberianInfus()">Daftar Pemberian Infus</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="pill" id="linkpersetujuantindakan" href="#persetujuantindakan" onclick="onCall_PersetujuanTind()">Persetujuan Tindakan</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="pill" id="linkassesmengizi" href="#assesmengizi" onclick="onCall_AssesmenGizi()">Assesmen Gizi</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="pill" id="linkassesmenkonsulirna" href="#Konsultasidpjpirna" >Konsultasi DPJP</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="pill" id="linkGrowhtChart" href="#GrowhtChart" onclick="onCall_GrowthChart()">Growht Chart</a>
				</li>

			</ul>
		</div>
		<div class="tab-content">
			<!-- Growht Chart -->
			<div class="tab-pane p-1 fade" id="GrowhtChart" role="tabpanel">

				<h3>Growth Chart</h3>&nbsp;&nbsp;<button class="btn btn-primary" onclick="$('#ModalInputGrowhtChart').modal('show');">Tambah</button>
				<div class="viewGrowthChart"></div>

			</div>
			<!-- KONSULTASI IRNA -->
			<div class="tab-pane p-1 fade" id="Konsultasidpjpirna" role="tabpanel">
				<h3>KONSULTASI DPJP</h3>
				<div class="card" style="font-size: 14px;">
					<table style="border:1px;">
						
						<tr>
							<td>
								<div class="card" style="padding-left:5px;">
									<p>Kepada Yth  <select id="selectdpjpkonsultasijawabirna" class="form-control" style="width:300px;"></select></p>
									<p>Dengan hormat </p>
									<p>Mohon bantuan Sejawat atas pasien ini untuk :</p>
									<div>1. Konsultasi/pemeriksaan  penunjang/tindakan masalah medik saat ini</div>
									<div>2. Pengambilan alihan kasus ini untuk selanjutnya.</div>
									<div>3. Perawatan bersama untuk selanjutnya</div><br>
									<p>Keterangan  klinik terpenting adalah:</p>
									<textarea class="form-control" id="keterangantanya"></textarea>
									<p>Diagnosis</p>
									<textarea class="form-control" id="diagnosistanya"></textarea>
									<div>
										<h4>Tanda Tangan</h4>
										<img id="ImgTtdTanyaKonsultasiIrna" style="width:250px;height:250px;">
										<input type="hidden" name="HasilTtdTanyaKonsultasiIrna" id="HasilTtdTanyaKonsultasiIrna">
									</div>
									<div id="divaksitanyakonsul"> 
										<button class="btn btn-warning" onclick="ShowModalTtdTanyaKonsultasiIrna()">TTD</button>
										<button class="btn btn-primary" onclick="SimpanKonsultasiDpjpTanyaUpdate()">Simpan</button>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="card" style="padding-left:5px;">
									<center><h3>JAWABAN KONSULTASI</h3></center>
									<p>sesuai permohonan konsultasi, pada pemeriksaan pasien kami dapatkan saat ini :</p>
									<textarea class="form-control" id="keteranganjawab"></textarea>
									<p>Diagnosis</p>
									<textarea class="form-control" id="diagnosisjawab"></textarea>
									<p>Saran tindakan medik/Pengobatan</p>
									<textarea class="form-control" id="saranjawab"></textarea><br>
									<div>
										<div>
											<h4>Tanda Tangan</h4>
											<img id="ImgTtdJawabKonsultasiIrna" style="width:250px;height:250px;">
											<input type="hidden" name="HasilTtdJawabKonsultasiIrna" id="HasilTtdJawabKonsultasiIrna">
										</div>
										<div id="divaksijawabkonsul">							
											<button class="btn btn-warning" onclick="ShowModalTtdJawabKonsultasiIrna()">TTD</button>
											<button class="btn btn-primary" onclick="SimpanKonsultasiDpjpJawabUpdate()">Simpan</button>
										</div>
									</div>
								</div>
								<br>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<!-- CATATATN ERM IRNA -->
			<div class="tab-pane p-1 fade" id="historipenunjangirna" role="tabpanel">
				<h6 class="lead mb-0"><u></u></h6>
				<div class="row">
					<div class="col-md-2" style="padding-top: 2px;">
						<select class="form-control form-control-xs">
							<option value=""> - Record Data - </option>
							<option value="10">10</option>
							<option value="20">20</option>
							<option value="30">30</option>
							<option value="40">40</option>
							<option value="50">50</option>
						</select>
					</div>
					<div class="col-md-12" style="padding-top: 10px;">
						<div id='listhistoripenunjangirna'>

							<!-- akhir div id -->
						</div>
					</div>
					<div class="col-md-12" style="padding-top: 10px;">
						<div id='listhistoripenunjangradirna'>

							<!-- akhir div id -->
						</div>
					</div>

				</div>
			</div>
			<div class="tab-pane p-1 fade active show" id="catatanermirna" role="tabpanel">
				<h6 class="lead mb-0"><u></u></h6>
				<div class="row">
					<div class="col-md-2" style="padding-top: 2px;">
						<select class="form-control form-control-xs">
							<option value=""> - Jumlah Data - </option>
							<option value="10">10</option>
							<option value="20">20</option>
							<option value="30">30</option>
							<option value="40">40</option>
							<option value="50">50</option>
						</select>
					</div>
					<div class="col-md-12" style="padding-top: 10px;">
						<h4>Dokumen Konsultasi Unit</h4>
						<table id="trkonsulirna" class="table">
							
						</table>
						<table class="table table-striped table-md">
							<thead class="thead-dark">
								<tr>
									<th width="50">#</th>
									<th width="20">ACT</th>
									<th>Menu</th>
									<th>Status</th>
									<th>Jumlah Data</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th scope="row">1</th>
									<td><button class="btn btn-primary btn-md" onclick="showassesmenmedisirna()">show</button></td>
									<td>Asesmen RI Medis</td>
									<td id="tableassesmenmedis"></td>
									<td></td>
								</tr>
								<tr>
									<th scope="row">2</th>
									<td><button class="btn btn-primary btn-md" onclick="showassesmenkeperawatanirna()">show</button></td>
									<td>Assesmen Keperawatan</td>
									<td id="tableassesmenkeperawatan"></td>
									<td></td>
								</tr>
								<tr>
									<th scope="row">2</th>
									<td><button class="btn btn-primary btn-md" onclick="showassesmengiziirna()">show</button></td>
									<td>Assesmen Gizi</td>
									<td id="tableassesmengizi"></td>
									<td></td>
								</tr>
								<tr>
									<th scope="row">3</th>
									<td><button class="btn btn-primary btn-md" onclick="document.getElementById('reviewassmedirna').click()">show</button></td>
									<td>Daftar Resep</td>
									<td id="tableresep"></td>
									<td></td>
								</tr>
								<tr>
									<th scope="row">4</th>
									<td><button class="btn btn-primary btn-md" onclick="document.getElementById('linksoap').click()">show</button></td>
									<td>CPPT</td>
									<td id="tableccpt"></td>
									<td></td>
								</tr>
								<tr>
									<th scope="row">5</th>
									<td><button class="btn btn-primary btn-md" onclick="document.getElementById('ewsirna').click()">show</button></td>
									<td>EWS</td>
									<td id="tableews"></td>
									<td></td>
								</tr>
								<tr>
									<th scope="row">6</th>
									<td><button class="btn btn-primary btn-md" onclick="document.getElementById('link_edukasi_irna').click()">show</button></td>
									<td>Edukasi Pasien</td>
									<td id="tableedukasi"></td>
									<td></td>
								</tr>
								<tr>
									<th scope="row">7</th>
									<td><button class="btn btn-primary btn-md" onclick="document.getElementById('reviewassmedirna').click()">show</button></td>
									<td>Asesmen RI Dewasa</td>
									<td id="tableassesmendewasa"></td>
									<td></td>
								</tr>
								<tr>
									<th scope="row">8</th>
									<td><button class="btn btn-primary btn-md" onclick="document.getElementById('reviewassmedirna').click()">show</button></td>
									<td>Diagnosa</td>
									<td id="tablediagnosa"></td>
									<td></td>
								</tr>
								<tr>
									<th scope="row">9</th>
									<td><button class="btn btn-primary btn-md" onclick="showrencanapulangirna()">show</button></td>
									<td>Rencana Pulang Pasien</td>
									<td id="tablerencanapulang"></td>
									<td></td>
								</tr>
								<tr>
									<!-- onclick="document.getElementById('reviewresumeirna').click()" -->
									<th scope="row">10</th>
									<td><button class="btn btn-primary btn-md" onclick="ShowResumeIrna()">show</button></td>
									<td>RESUME</td>
									<td id="tableresume"></td>
									<td></td>
								</tr>

							</tbody>
						</table>

						<h4>Dokumen Tambahan</h4>
						<table id="trdokumentambahan" class="table">
							
						</table>
					</div>                
				</div>
			</div>

			<!-- ASSESMEN GIZI -->
			<div class="tab-pane p-1 fade" id="assesmengizi" role="tabpanel">
				<div class="card card-row p-2">
					<div class="overlay-wrapper" id="loading_assesmengizi">
						<div class="overlay dark">
							<i class="fas fa-3x fa-sync-alt fa-spin"></i>            
						</div>
					</div>
					<div class="viewAssesmenGizi"></div>
				</div>
			</div>

			<!-- PERSETUJUAN TINDAKAN -->
			<div class="tab-pane p-1 fade" id="persetujuantindakan" role="tabpanel">
				<div class="card card-row p-2">
					<div class="overlay-wrapper" id="loading_persetujuantindakan">
						<div class="overlay dark" style="align-items: baseline; padding-top: 96px;">
							<i class="fas fa-3x fa-sync-alt fa-spin"></i>            
						</div>
					</div>
					<div class="viewPersetujuanTind"></div>
				</div>
			</div>

			<!-- DAFTAR PEMBERIAN OBAT -->
			<div class="tab-pane p-1 fade" id="daftarpemberianobat" role="tabpanel">
				<div class="card card-row p-2">
					<div class="overlay-wrapper" id="loading_daftarpemberianobat">
						<div class="overlay dark" style="align-items: baseline; padding-top: 96px;">
							<i class="fas fa-3x fa-sync-alt fa-spin"></i>            
						</div>
					</div>
					<div class="viewPemberianObat"></div>
				</div>
			</div>

			<!-- INFORMASI Pre ANESTESI -->
			<div class="tab-pane p-1 fade" id="asesmen_pre_anestesi" role="tabpanel">
				<div class="card card-row p-2">
					<div class="overlay-wrapper" id="loading_asesmen_pre_anestesi">
						<div class="overlay dark" style="align-items: baseline; padding-top: 96px;">
							<i class="fas fa-3x fa-sync-alt fa-spin"></i>            
						</div>
					</div>
					<div class="viewAsspreAnastesi"></div>
				</div>
				
			</div>

			<!-- INFORMASI ANESTESI SEDASI -->
			<div class="tab-pane p-1 fade" id="informasi_anestesi_sedasi" role="tabpanel">
				<div class="card card-row p-2">
					<div class="overlay-wrapper" id="loading_informasi_anestesi_sedasi">
						<div class="overlay dark" style="align-items: baseline; padding-top: 96px;">
							<i class="fas fa-3x fa-sync-alt fa-spin"></i>            
						</div>
					</div>
					<div class="viewInfAnastesiAdesi"></div>
				</div>
			</div>

			<!-- EFEK SAMPING OBAT -->
			<div class="tab-pane p-1 fade" id="efek_samping_obat_irna">
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
													<input id="dacmeso_atgl" name="dacmeso_atgl" type="DATE" class="form-control" value="<?php echo date('Y-m-d');?>" >					            	
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
													<select class="form-control" id="selectdacmeso_bwanita">
														<option value="1">Hamil</option>
														<option value="2">Menyusui</option>
														<option value="3">Tidak Tahu</option>
													</select>
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
													<select class="form-control" id="selectdacmeso_bsudah">
														<option value="1">Sembuh</option>
														<option value="2">Meninggal</option>
														<option value="3">Belum Sembuh</option>
														<option value="4">Tidak Tahu</option>
													</select>
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
													<select class="form-control" id="selectdacmeso_bkondisi">
														<option value="1">Gangguan Ginjal</option>
														<option value="2">Gangguan Hati</option>
														<option value="3">Alergi</option>
														<option value="4">Kondisi Medis Lainnya</option>
														<option value="5">Faktor Industri, Pertanian, Kimia</option>
														<option value="6">Lain-lain</option>
													</select>
												</div>

												<!--
												<div class="col-md-6">
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
											</div> -->
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
												<input id="dacmeso_ctgl" name="ctgl" type="date" class="form-control" value="<?php echo date('Y-m-d');?>">					            	
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
												<input id="dacmeso_dtgl" name="dtgl" type="date" class="form-control" value="<?php echo date('Y-m-d');?>">					            	
											</div>
										</div>						
										<div class="row" id="dacmeso_csudah">
											<div class="col-md-6">
												<select class="form-control" id="selectdacmeso_csudah">
													<option value="1">Sembuh</option>
													<option value="2">Sembuh dengan gejala sisa</option>
													<option value="3">Meninggal</option>
													<option value="4">Belum Sembuh</option>
													<option value="5">Tidak Tahu</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-3">
										<label class="col-form-label" title="budaya">Riwayat E.S.O yang Dialami</label>
									</div>
									<div class="col-md-8">
										<div class="row" id="divdacmeso_criwayat">
											<div class="col-md-6">
												<div class="form-group">
													<select class="form-control" id="dacmeso_criwayat" > 
														<option value="1">Tidak</option>
														<option value="2">Ya</option>
													</select>
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
														<td class="align-middle" style="padding: 2px;" onclick="dacmesoexsetApgar(1, 1);">
															<div class="row justify-content-center">
																<label class="col-form-label font-weight-bold">1</label>
															</div>
														</td>
														<td class="align-middle" style="padding: 2px;" onclick="dacmesoexsetApgar(1, 0);">
															<div class="row justify-content-center">
																<label class="col-form-label font-weight-bold">0</label>
															</div>
														</td>
														<td class="align-middle" style="padding: 2px;" onclick="dacmesoexsetApgar(1, 0);">
															<div class="row justify-content-center">
																<label class="col-form-label font-weight-bold">0</label>
															</div>
														</td>
														<td class="align-middle" style="padding: 2px;">
															<div class="row justify-content-center">
																<input type="number" class="form-control" id="dacmeso_apgar1" value=0>
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
														<td class="align-middle" style="padding: 2px;" onclick="dacmesoexsetApgar(2, 2);">
															<div class="row justify-content-center">
																<label class="col-form-label font-weight-bold">2</label>
															</div>
														</td>
														<td class="align-middle" style="padding: 2px;" onclick="dacmesoexsetApgar(2, -1);">
															<div class="row justify-content-center">
																<label class="col-form-label font-weight-bold">-1</label>
															</div>
														</td>
														<td class="align-middle" style="padding: 2px;" onclick="dacmesoexsetApgar(2, 0);">
															<div class="row justify-content-center">
																<label class="col-form-label font-weight-bold">0</label>
															</div>
														</td>
														<td class="align-middle" style="padding: 2px;">
															<div class="row justify-content-center">
																<input type="number" class="form-control" id="dacmeso_apgar2" value=0>
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
														<td class="align-middle" style="padding: 2px;" onclick="dacmesoexsetApgar(3, 1);">
															<div class="row justify-content-center">
																<label class="col-form-label font-weight-bold">1</label>
															</div>
														</td>
														<td class="align-middle" style="padding: 2px;" onclick="dacmesoexsetApgar(3, 0);">
															<div class="row justify-content-center">
																<label class="col-form-label font-weight-bold">0</label>
															</div>
														</td>
														<td class="align-middle" style="padding: 2px;" onclick="dacmesoexsetApgar(3, 0);">
															<div class="row justify-content-center">
																<label class="col-form-label font-weight-bold">0</label>
															</div>
														</td>
														<td class="align-middle" style="padding: 2px;">
															<div class="row justify-content-center">
																<input type="number" class="form-control" id="dacmeso_apgar3" value=0>
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
														<td class="align-middle" style="padding: 2px;" onclick="dacmesoexsetApgar(4, 2);">
															<div class="row justify-content-center">
																<label class="col-form-label font-weight-bold">2</label>
															</div>
														</td>
														<td class="align-middle" style="padding: 2px;" onclick="dacmesoexsetApgar(4, -1);">
															<div class="row justify-content-center">
																<label class="col-form-label font-weight-bold">-1</label>
															</div>
														</td>
														<td class="align-middle" style="padding: 2px;" onclick="dacmesoexsetApgar(4, 0);">
															<div class="row justify-content-center">
																<label class="col-form-label font-weight-bold">0</label>
															</div>
														</td>
														<td class="align-middle" style="padding: 2px;">
															<div class="row justify-content-center">
																<input type="number" class="form-control" id="dacmeso_apgar4" value=0>
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
														<td class="align-middle" style="padding: 2px;" onclick="dacmesoexsetApgar(5, -1);">
															<div class="row justify-content-center">
																<label class="col-form-label font-weight-bold">-1</label>
															</div>
														</td>
														<td class="align-middle" style="padding: 2px;" onclick="dacmesoexsetApgar(5, 2);">
															<div class="row justify-content-center">
																<label class="col-form-label font-weight-bold">2</label>
															</div>
														</td>
														<td class="align-middle" style="padding: 2px;" onclick="dacmesoexsetApgar(5, 0);">
															<div class="row justify-content-center">
																<label class="col-form-label font-weight-bold">0</label>
															</div>
														</td>
														<td class="align-middle" style="padding: 2px;">
															<div class="row justify-content-center">
																<input type="number" class="form-control" id="dacmeso_apgar5" value=0>
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
														<td class="align-middle" style="padding: 2px;" onclick="dacmesoexsetApgar(6, -1);">
															<div class="row justify-content-center">
																<label class="col-form-label font-weight-bold">-1</label>
															</div>
														</td>
														<td class="align-middle" style="padding: 2px;" onclick="dacmesoexsetApgar(6, 1);">
															<div class="row justify-content-center">
																<label class="col-form-label font-weight-bold">1</label>
															</div>
														</td>
														<td class="align-middle" style="padding: 2px;" onclick="dacmesoexsetApgar(6, 0);">
															<div class="row justify-content-center">
																<label class="col-form-label font-weight-bold">0</label>
															</div>
														</td>
														<td class="align-middle" style="padding: 2px;">
															<div class="row justify-content-center">
																<input type="number" class="form-control" id="dacmeso_apgar6" value=0>
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
														<td class="align-middle" style="padding: 2px;" onclick="dacmesoexsetApgar(7, 1);">
															<div class="row justify-content-center">
																<label class="col-form-label font-weight-bold">1</label>
															</div>
														</td>
														<td class="align-middle" style="padding: 2px;" onclick="dacmesoexsetApgar(7, 0);">
															<div class="row justify-content-center">
																<label class="col-form-label font-weight-bold">0</label>
															</div>
														</td>
														<td class="align-middle" style="padding: 2px;" onclick="dacmesoexsetApgar(7, 0);">
															<div class="row justify-content-center">
																<label class="col-form-label font-weight-bold">0</label>
															</div>
														</td>
														<td class="align-middle" style="padding: 2px;">
															<div class="row justify-content-center">
																<input type="number" class="form-control" id="dacmeso_apgar7" value=0>
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
														<td class="align-middle" style="padding: 2px;" onclick="dacmesoexsetApgar(8, 1);">
															<div class="row justify-content-center">
																<label class="col-form-label font-weight-bold">1</label>
															</div>
														</td>
														<td class="align-middle" style="padding: 2px;" onclick="dacmesoexsetApgar(8, 0);">
															<div class="row justify-content-center">
																<label class="col-form-label font-weight-bold">0</label>
															</div>
														</td>
														<td class="align-middle" style="padding: 2px;" onclick="dacmesoexsetApgar(8, 0);">
															<div class="row justify-content-center">
																<label class="col-form-label font-weight-bold">0</label>
															</div>
														</td>
														<td class="align-middle" style="padding: 2px;">
															<div class="row justify-content-center">
																<input type="number" class="form-control" id="dacmeso_apgar8" value=0>
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
														<td class="align-middle" style="padding: 2px;" onclick="dacmesoexsetApgar(9, 1);">
															<div class="row justify-content-center">
																<label class="col-form-label font-weight-bold">1</label>
															</div>
														</td>
														<td class="align-middle" style="padding: 2px;" onclick="dacmesoexsetApgar(9, 0);">
															<div class="row justify-content-center">
																<label class="col-form-label font-weight-bold">0</label>
															</div>
														</td>
														<td class="align-middle" style="padding: 2px;" onclick="dacmesoexsetApgar(9, 0);">
															<div class="row justify-content-center">
																<label class="col-form-label font-weight-bold">0</label>
															</div>
														</td>
														<td class="align-middle" style="padding: 2px;">
															<div class="row justify-content-center">
																<input type="number" class="form-control" id="dacmeso_apgar9" value=0>
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
														<td class="align-middle" style="padding: 2px;" onclick="dacmesoexsetApgar(10, 1);">
															<div class="row justify-content-center">
																<label class="col-form-label font-weight-bold">1</label>
															</div>
														</td>
														<td class="align-middle" style="padding: 2px;" onclick="dacmesoexsetApgar(10, 0);">
															<div class="row justify-content-center">
																<label class="col-form-label font-weight-bold">0</label>
															</div>
														</td>
														<td class="align-middle" style="padding: 2px;" onclick="dacmesoexsetApgar(10, 0);">
															<div class="row justify-content-center">
																<label class="col-form-label font-weight-bold">0</label>
															</div>
														</td>
														<td class="align-middle" style="padding: 2px;">
															<div class="row justify-content-center">
																<input type="number" class="form-control" id="dacmeso_apgar10" value=0>
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
										<input type="number" id="dacmeso_apgartot" value=0>

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
										<label class="col-form-label">&lt;= 0   Ragu-Ragu / Doubtful</label>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-12">
										<label class="col-form-label">1 - 4   Cukup Mungkin / Possible</label>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-12">
										<label class="col-form-label">5 - 8   Kemungkinan Terjadi / Probable</label>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-12">
										<label class="col-form-label">&gt;= 9   Kemungkinan Terjadi Sangat Tinggi / Highly Probable</label>
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
											<tbody>
												<tr>
													<td width="250" style="padding: 0;">
														<img id="GambarTtdEfekObatIrna" style="width:250px;height: 250px;" >
														<input type="hidden" class="form-control text-center" id="HasilTtdEfekObatIrna" >
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-12" align="center">
										<button onclick="showModalEfekObatIrna()">TTD</button><br>
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
							<button id="dacmeso_btsave" onclick="save_efek_samping_obat_irna()" type="button" class="btn btn-sm btn-primary"><!-- <i class="fas fa-save"></i> --> Simpan</button>
							<button id="dacmeso_btreset" type="button" class="btn btn-sm btn-warning"><!-- <i class="fas fa-ban"></i> --> Reset</button>
							<button id="dacmeso_btdelete" type="button" class="btn btn-sm btn-danger" style="display:none;"><!-- <i class="fas fa-trash"></i> --> Hapus</button>
							<button id="dacmeso_btprint" type="button" class="btn btn-sm btn-success" style="display:none;"><!-- <i class="fas fa-print"></i> --> Cetak PDF</button>
						</div>
					</div>
				</div>
			</div>

			<!-- EDUKASI IRNA -->
			<div class="tab-pane p-1 fade" id="edukasi_irna" role="tabpanel">
				<div class="card card-row p-2">
					<div class="overlay-wrapper" id="loading_edukasi_irna">
						<div class="overlay dark" style="align-items: baseline; padding-top: 96px;">
							<i class="fas fa-3x fa-sync-alt fa-spin"></i>            
						</div>
					</div>
					<div class="viewEdukasiPasien"></div>
				</div>
			</div>

			<!-- GENERAL CONSENT -->
			<div class="tab-pane p-1 fade" id="general_consent" role="tabpanel">
				<div id="dacconsent_inputdiv" class="rapet">
					<div class="row ">
						<div class="col-md-12">
							<div class="row d-flex justify-content-center">
								<h4><b><label class="col-form-label">PERSETUJUAN UMUM / GENERAL CONSENT RAWAT INAP</label></b></h4>
							</div>
						</div>
					</div>
					<div class="card ">
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">

									<div class="form-group row">
										<div class="col-md-3  text-truncate">
											<label class="col-form-label">Tanggal</label>
										</div>
										<div class="col-md-4">
											<div class="input-group date" id="dacconsent_dtgl" data-target-input="nearest">
												<input id="dacconsent_tgl"  name="dacconsent_tgl" type="date" class="form-control form-control-sm" >

											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group row">
									<div class="col-md-3">
										<label class="col-form-label">Petugas</label>
									</div>
									<div class="col-md-7">
										<input type="text" name="namapetugaspemeperiinfo" id="namapetugaspemeperiinfo" class="form-control form-control-sm" >
									</div>
									<div class="col-md-1">
										<button id="dacconsent_btpjdef" class="btn btn-warning d-none" type="button" title="Default PJ">
											&nbsp;<!-- <i class="fas fa-undo"></i> -->&nbsp;
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<div class="col-lg-12 row">
							<div class="col-md-6">
								<div class="form-group row">
									<div class="col-md-12">
										<label class="col-form-label font-weight-bold">IDENTITAS YANG BERTANDATANGAN</label>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-3">
										<label class="col-form-label" title="Nama">Nama</label>
									</div>
									<div class="col-md-7">
										<input id="dacconsent_nama3" name="nama3" type="text" class="form-control" min="1" maxlength="100" onkeyup="dacconsentex.setnamattd();">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group row">
									<div class="col-md-3">
										<label class="col-form-label" title="Alamat">Alamat</label>
									</div>
									<div class="col-md-7">
										<input id="dacconsent_alamat" name="alamat" type="text" class="form-control" min="1" maxlength="150">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-3">
										<label class="col-form-label" title="Hp/Telephone">Hp / Telephone</label>
									</div>
									<div class="col-md-7">
										<input id="dacconsent_nohp3" name="telepon" type="text" class="form-control" min="1" maxlength="20">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-3">
										<label class="col-form-label">Hubungan dengan Pasien</label>
									</div>
									<div class="col-md-7">
										<select name="hubungan3" id="dacconsent_hubungan3" class="form-control">
											<option value="0">--Pilih--</option>
											<option value="1">Diri Sendiri</option>
											<option value="2">Suami</option>
											<option value="3">Istri</option>
											<option value="4">Anak</option>
											<option value="5">Orang tua</option>
											<option value="6">Keluarga</option>
											<option value="7">Pengantar</option>
										</select>
									</div>
								</div>					
							</div>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<div class="col-lg-12 row">
							<div class="col-md-12">
								<div class="form-group row">
									<div class="col-md-12">
										<label class="col-form-label font-weight-bold">PERSETUJUAN PELEPASAN INFORMASI</label>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group row">
									<div class="col-md-12">
										<label class="col-form-label font-weight-bold" title="Nama">Identitas I</label>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-3">
										<label class="col-form-label" title="Nama">Nama</label>
									</div>
									<div class="col-md-7">
										<input id="dacconsent_nama1" name="nama" type="text" class="form-control" min="1" maxlength="60">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-3">
										<label class="col-form-label" title="Hp/Telephone">Hp / Telephone</label>
									</div>
									<div class="col-md-7">
										<input id="dacconsent_nohp1" name="telephone" type="text" class="form-control" min="1" maxlength="20">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-3">
										<label class="col-form-label">Hubungan dengan Pasien</label>
									</div>
									<div class="col-md-7">
										<select name="hubungan1" id="dacconsent_hubungan1" class="form-control">
											<option value="0">--Pilih--</option>
											<option value="1">Diri Sendiri</option>
											<option value="2">Suami</option>
											<option value="3">Istri</option>
											<option value="4">Anak</option>
											<option value="5">Orang tua</option>
											<option value="6">Keluarga</option>
											<option value="7">Pengantar</option>
										</select>
									</div>
								</div>

							</div>
							<div class="col-md-6">
								<div class="form-group row">
									<div class="col-md-12">
										<label class="col-form-label font-weight-bold" title="Nama">Identitas II</label>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-3">
										<label class="col-form-label" title="Nama">Nama</label>
									</div>
									<div class="col-md-7">
										<input id="dacconsent_nama2" name="nama" type="text" class="form-control" min="1" maxlength="60">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-3">
										<label class="col-form-label" title="Hp/Telephone">Hp / Telephone</label>
									</div>
									<div class="col-md-7">
										<input id="dacconsent_nohp2" name="telepon" type="text" class="form-control" min="1" maxlength="20">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-3">
										<label class="col-form-label">Hubungan dengan Pasien</label>
									</div>
									<div class="col-md-7">
										<select name="hubungan2" id="dacconsent_hubungan2" class="form-control">
											<option value="0">--Pilih--</option>
											<option value="1">Diri Sendiri</option>
											<option value="2">Suami</option>
											<option value="3">Istri</option>
											<option value="4">Anak</option>
											<option value="5">Orang tua</option>
											<option value="6">Keluarga</option>
											<option value="7">Pengantar</option>
										</select>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<div class="col-lg-12 row">
							<div class="col-md-6">
								<div class="form-group row">
									<div class="col-md-12">
										<label class="col-form-label font-weight-bold">PRIVASI PASIEN</label>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-3">
										<label class="col-form-label">Pilih Privasi</label>
									</div>
									<div class="col-md-7">
										<select name="privasi" id="dacconsent_privasi" class="form-control">
											<option value="1">Mengijinkan</option>
											<option value="2">Tidak Mengijinkan</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group row">
									<div class="col-md-3">
										<label class="col-form-label" title="Hp/Telephone">Privasi I</label>
									</div>
									<div class="col-md-7">
										<input id="dacconsent_privasi1" name="telepon" type="text" class="form-control" min="1" maxlength="100">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-3">
										<label class="col-form-label" title="Hp/Telephone">Privasi II</label>
									</div>
									<div class="col-md-7">
										<input id="dacconsent_privasi2" name="telepon" type="text" class="form-control" min="1" maxlength="100">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="col-lg-12 row">
						<div class="col-lg-12 text-center">
							<label class="col-form-label font-weight-bold text-align-center">
								PASIEN DAN/ATAU WALI HUKUM HARUS MEMBACA, MEMAHAMI DAN MENGISI INFORMASI BERIKUT
							</label>
						</div>
						<div class="col-lg-12 text-center">
							<button id="dacconsent_btdiag" class="btn btn-sm btn-success" type="button" title="GENERAL CONSENT" onclick="showmodalgeneralconsent()">
								&nbsp;<!-- <i class="fas fa-book"></i> -->&nbsp; Informasi General Consent &nbsp;
							</button>
							<button id="dacconsent_btdiaghk" class="btn btn-sm btn-danger" type="button" title="GENERAL CONSENT" onclick="showmodalhakkewajiban()">
								&nbsp;<!-- <i class="fas fa-book"></i> -->&nbsp; Hak dan Kewajiban Pasien &nbsp;
							</button>
							<button id="dacconsent_btdiagsatusehat" class="btn btn-sm btn-primary" type="button" title="GENERAL CONSENT" onclick="showmodalsatusehat()">
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<!-- <i class="fas fa-book"></i> -->&nbsp; Platform Satu Sehat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</button>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="row">
						<div class="col-md-12">
							<div class="card-body">
								<div class="col-lg-12 text-center">
									<label class="col-form-label font-weight-bold text-align-center" style="text-decoration: underline;">TTD USER/YG MENJELASKAN</label>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group row">
											<div class="col-md-12" align="center">
												<label class="col-form-label font-weight-bold">Yang Menjelaskan</label>
											</div>
										</div>
										<div class="table-responsive">
											<div class="col-md-12"  id="paint_ttdgeneralconcent"></div>
										</div>
										<div class="form-group row">
											<div class="col-md-12" align="center">
												<label class="col-form-label">Nama &amp; Tanda tangan</label>
											</div>
										</div>
										<div class="form-group row">
											<div align="center" class="col-md-12">
												<button id="dacconsent_btttd1" type="button" class="btn btn-sm btn-danger d-none">
												</button>
											</div>
										</div>
									</div>
									<!-- Pasien -->
									<div class="col-md-6">
										<div class="form-group row">
											<div class="col-md-12" align="center">
												<label class="col-form-label font-weight-bold">Pasien/ Penanggung Jawab Pasien</label>
											</div>
										</div>
										<div class="table-responsive">
											<div class="col-md-12" id="paint_ttdpasiengeneralconcent"></div>

										</div>
										<div class="form-group row">
											<div class="col-md-12" align="center">
												<label class="col-form-label">Nama &amp; Tanda tangan</label>
											</div>
										</div>
										<div class="form-group row">
											<div align="center" class="col-md-12">
												<button id="dacconsent_btclearttd1" type="button" class="btn btn-sm btn-warning"> Reset</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<button id="dacconsent_btsave" type="button" class="btn btn-sm btn-primary" onclick="save_general_concent_irna()"><!-- <i class="fas fa-save"></i> --> Simpan</button>
							<button id="dacconsent_btdelete" type="button" class="btn btn-sm btn-danger" style=""><!-- <i class="fas fa-trash"></i> --> Hapus</button>
							<button id="dacconsent_btprint" type="button" class="btn btn-sm btn-success" style="" onclick="cetakgeneralconcent()"><!-- <i class="fas fa-print"></i> --> Print PDF</button>
							<button id="dacconsent_btprint2" type="button" class="btn btn-sm btn-success" style=""><!-- <i class="fas fa-print"></i> --> Print SatuSehat</button>
						</div>
					</div>
				</div>
			</div>

			<!-- EWS -->
			<div class="tab-pane p-1 fade" id="linkews" role="tabpanel">
				<h6 class="lead mb-0"><u></u></h6>
				<h4>Early Warning System</h4>
				<div class="row">	

					<div class="col-md-12" >
						<div class="card" style="overflow-x: scroll;">
							<div  style="width: auto;" > 
								<table border="2" class="table table-striped table-sm">
									<tr id="listtgl">

									</tr>
									<tr id="listtensi" >

									</tr>
									<tr id="listtensuhu" >

									</tr>
									<tr id="listnadi">

									</tr>
									<tr id="listsaturasi">

									</tr>
									<tr id="listspo">

									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- HISTORY ERM IRNA -->
			<div class="tab-pane p-1 fade" id="rwjpendafhistoryrekammedisirna" role="tabpanel">
				<div class="card card-row p-2">
					<div class="overlay-wrapper" id="loading_rwjpendafhistoryrekammedisirna">
						<div class="overlay dark">
							<i class="fas fa-3x fa-sync-alt fa-spin"></i>            
						</div>
					</div>
					<div class="col-md-2 p-1">
						<select class="form-control form-control-xs">
							<option value=""> - Data diTampilkan - </option>
							<option value="10">10</option>
							<option value="20">20</option>
							<option value="30">30</option>
							<option value="40">40</option>
							<option value="50">50</option>
						</select>
					</div>
					<div class="col-md-12 p-1">
						<div id='listhistorirmkunjunganirna'>
						</div>
					</div>
				</div>
			</div>

			<!-- ASSESSMEN KEPERAWAT IRNA -->
			<div class="tab-pane p-1 fade" id="assesKepErmKeperawatanIrna" role="tabpanel">
				<div class="card card-row p-2">
					<div class="overlay-wrapper" id="assesmentperawatanirna_loading">
						<div class="overlay dark" style="align-items: baseline; padding-top: 96px;">
							<i class="fas fa-3x fa-sync-alt fa-spin"></i>            
						</div>
					</div>
					
					<div class="card">
						<div class="col-md-12">
							<div class="row d-flex justify-content-center">
								<h4><b><label class="col-form-label">ASSESMEN PERAWATAN</label></b></h4>
							</div>
						</div>
					</div>
					<div class="card card-default">
						<div class="card-header" style="background-color:black;">
							<h3 class="card-title" style="color:white;">ANAMNESIS</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<div class="row">
								<div class="col-md-4 p2">
									<label class="form-label">Keluhan Utama</label>
								</div>
								<div class="col-md-8 p2">
									<textarea class="form-control " id="keluhanutamaKeperawatanErmIrna"></textarea>
									<!-- /.form-group -->
								</div>
								<!-- /.col -->
								<div class="col-md-4 p2">
									<label class="form-label">Riwayat Penyakit Sekarang *</label>&nbsp;&nbsp;&nbsp;<label><span class="badge bg-primary rounded-pill" onclick="penyakitsekarangasskepErmIrna()" title="autocomplete">auto</span></label>&nbsp;<label><span class="badge bg-primary rounded-pill" onclick="showmodaltambahpenyakitKeperawatansekarang()" title="tambah icd">Tambah</span></label>
								</div>
								<div class="col-md-8 p2">
									<textarea class="form-control " id="RiwayatPenyakitNowasskepErmIrna"></textarea>
									<div id="DivKeperawatanRiwayatPenyakitSekarang"></div>
									<!-- /.form-group -->
								</div>
								<!-- /.col --> 

							</div>
							<!-- /.row -->
						</div>
						<!-- /.card-body -->
					</div>
					<div class="card card-default">
						<div class="card-header" style="background-color:black;">
							<h3 class="card-title" style="color:white;">RIWAYAT BIOPSIKOSOSIAL, KULTURAL, SPIRITUAL & EKONOMI</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<div class="row">
								<div class="col-md-4" >
									<label class="form-label">Agama :</label>
								</div>
								<div class="col-md-6">
									<select class="form-control form-control-xs"  id="AgamaAssKeperawatanErmIrna">

									</select>
								</div>
								<div class="col-md-4">
									<label class="form-label">Pekerjaan :</label>

								</div>
								<div class="col-md-6">
									<select class="form-control form-control-xs" id="pekerjaanAssKeperawatanErmIrna">

									</select>
								</div>
								<div class="col-md-4">
									<label class="form-label">Tinggal Bersama :</label>
								</div>
								<div class="col-md-6">
									<select class="form-control form-control-xs" id="TinggalBersamaAssKeperawatanErmIrna">
										<option value="1">Suami/Istri</option>
										<option value="2">Orang Tua</option>
										<option value="3">Anak</option>
										<option value="4">Lain-Lain</option>
										<option value="5">Tinggal Sendiri</option>
									</select>
								</div>
								<div class="col-md-4">
									<label class="form-label">Status Mental :</label>
								</div>
								<div class="col-md-6">
									<select class="form-control form-control-xs" id="StatusMentalAssKeperawatanErmIrna">
										<option value="1">Orientasi Baik</option>
										<option value="2">Agitasi</option>
										<option value="3">Menyerang</option>
										<option value="4">Tidak Ada Respon</option>
										<option value="5">Lain-Lain</option>
									</select>
								</div>

								<div class="col-md-4">
									<label class="form-label">Status Psikologis :</label>
								</div>
								<div class="col-md-6">
									<select class="form-control form-control-xs" id="StatusPsikoAssKeperawatanErmIrna">
										<option value="1">Kooperatif</option>
										<option value="2">Disorientasi</option>
										<option value="3">Tenang</option>
										<option value="4">Hiperaktif</option>
										<option value="5">Cemas</option>
										<option value="6">Kecenderungan Bunuh Diri</option>
									</select>
								</div>
								<div class="col-md-4">
									<label class="form-label">Penggunaan Restrain :</label>
								</div>
								<div class="col-md-6">
									<select class="form-control form-control-xs" id="RestrainAssKeperawatanErmIrna" onchange="tampilasalanrestrain()">
										<option value="1">Tidak</option>
										<option value="2">Ya, Alasan</option>
									</select>
									<div style="display: none;" id="DivalasanRestrainAssKeperawatanErmIrna">
										<input type="text"  class="form-control form-control-xs" name="alasanRestrainAssKeperawatanErmIrna" >
									</div>
								</div>
								<div class="col-md-4">
									<label class="form-label">Budaya Yang Dianut :</label>
								</div>
								<div class="col-md-6">
									<select class="form-control form-control-xs" id="BudayaAssKeperawatanErmIrna" onchange="tampilBudayaAnut()">
										<option value="1">Tidak</option>
										<option value="2">Ya</option>
									</select>
									<div style="display: none;" id="DivKetBudayaAssKeperawatanErmIrna">
										<input type="text" class="form-control form-control-xs" name="KetBudayaAssKeperawatanErmIrna">
									</div>
								</div>
							</div>
							<!-- /.row -->
						</div>
						<!-- /.card-body -->
					</div>
					<div class="card card-default">
						<div class="card-header" style="background-color:black;">
							<h3 class="card-title" style="color:white;">TANDA VITAL</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-4">
									<table class="table-sm">
										<tr>
											<td>
												<label>Keadaan Umum</label>
											</td>
											<td>
												<input class="form-control form-control-xs" id="KeadaanUmumAssPerawatErmIrna">
											</td>
										</tr>
										<tr>
											<td>
												<label>Respirasi</label>
											</td>
											<td>
												<div class="input-group">
													<input type="text" class="form-control form-control-xs" id="respirasiAssPerawatErmIrna">
													<div class="input-group-prepend">
														<span>x/Menit</span>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<label>Nadi</label>
											</td>
											<td>
												<div class="input-group">
													<input type="text" class="form-control form-control-xs" id="nadiAssPerawatErmIrna">
													<div class="input-group-prepend">
														<span>x/Menit</span>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<label>SpO2</label>
											</td>
											<td>
												<div class="input-group">
													<input type="text" class="form-control form-control-xs" id="Spo2AssPerawatErmIrna">
													<div class="input-group-prepend">
														<span>%</span>
													</div>
												</div>
											</td>
										</tr>
									</table>
								</div>
								<div class="col-md-4">
									<table>
										<tr>
											<td style="width:100px;">
												<label>Pupil</label>
											</td>
											<td>
												<div  class="input-group">
													<div class="input-group-prepend">
														<span >kiri </span>
													</div>
													<input type="number" class="form-control form-control-xs" id="pupilkiriAssPerawatErmIrna">
													<div class="input-group-prepend">
														<span >kanan </span>
													</div>
													<input type="number" class="form-control form-control-xs" id="pupilkananAssPerawatErmIrna">
													<div class="input-group-prepend">
														<span>mm</span>
													</div>
												</div>

											</td>
										</tr>
										<tr>
											<td>
												<label>Tekanan Darah</label>
											</td>
											<td>
												<div class="input-group">
													<input type="number" class="form-control form-control-xs" id="tekananDarahAssPerawatErmIrna1">&nbsp;/&nbsp;
													<input type="number" class="form-control form-control-xs" id="tekananDarahAssPerawatErmIrna2">
													<div class="input-group-prepend">
														<span>mmHg</span>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												
											</td>
											<td >
												<div class="input-group">
													<input type="text" placeholder="Diisi jika Palpasi" class="form-control form-control-xs" id="palpasiAssPerawatErmIrna" >
													<div class="input-group-prepend">
														<span>Per palpasi</span>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<label>Suhu</label>
											</td>
											<td>
												<div class="input-group">
													<input type="text" class="form-control form-control-xs" id="suhuAssPerawatErmIrna" >
													<div class="input-group-prepend">
														<span >C</span>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<label>Reflek Cahaya</label>
											</td>
											<td>
												<div class="input-group">
													<div class="input-group-prepend">
														<span >kiri</span>
													</div>
													<select class="form-control form-control-xs" id="reflekCahayaKiriAssPerawatErmIrna" >
														<option value="1">-</option>
														<option value="2">+</option>
													</select>
													<div class="input-group-prepend">
														<span >kanan</span>
													</div>
													<select class="form-control form-control-xs" id="reflekCahayaKananAssPerawatErmIrna">
														<option value="1">-</option>
														<option value="2">+</option>
													</select>
												</div>
											</td>
										</tr>
									</table>
								</div>
								<div class="col-md-4">
									<table class="table-sm">
										<tr>
											<td colspan="2">
												<h6>Note (*) Nominal ribuan = gram, satuan / puluhan / ratusan = kg</h6>
											</td>
										</tr>
										<tr>
											<td>
												<label>Berat Badan</label>
											</td>
											<td>
												<div class="input-group">
													<input type="number" id="bbAssPerawatErmIrna" class="form-control form-control-xs">
													<div class="input-group-prepend">
														<span>Kg / Gram</span>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<label>Tinggi Badan</label>
											</td>
											<td>
												<div class="input-group">
													<input type="number" class="form-control form-control-xs" id="tinggiAssPerawatErmIrna" >
													<div class="input-group-prepend">
														<span>cm</span>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<label>IMT</label>
											</td>
											<td>
												<div class="input-group">
													<input type="number" class="form-control form-control-xs" id="imtAssPerawatErmIrna" readonly>
													<div class="input-group-prepend">
														<span>kg/m2</span>
													</div>
												</div>
											</td>
										</tr>
									</table>
								</div>
							</div>
							<div class="row "><br>
								<div class="col-md-12">
									<table class="table table-bordered table-sm">
										<thead>
										</thead>
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
												<td onclick="dacrjasesmenkeperawatanirna_setScore(4, 1)">
													Spontan
												</td>
												<td>
													4
												</td>
												<td rowspan="4">
													<input type="text" name="eyeOpenasskepErmIrna" id="eyeOpenasskepErmIrna" class="form-control" value="4">
												</td>
											</tr>
											<tr >
												<td onclick="dacrjasesmenkeperawatanirna_setScore(3, 1)">
													Terhadap Suara
												</td>
												<td>
													3
												</td>
											</tr>
											<tr>
												<td onclick="dacrjasesmenkeperawatanirna_setScore(2, 1)">
													Terhadap Nyeri
												</td>
												<td>
													2
												</td>
											</tr>
											<tr>
												<td onclick="dacrjasesmenkeperawatanirna_setScore(1, 1)">
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
												<td onclick="dacrjasesmenkeperawatanirna_setScore(6, 2)">
													Turut Perintah
												</td>
												<td>
													6
												</td>
												<td rowspan="6">
													<input type="text" name="ResponMotorikasskepErmIrna" id="ResponMotorikasskepErmIrna" class="form-control" value="6">
												</td>
											</tr>
											<tr>
												<td onclick="dacrjasesmenkeperawatanirna_setScore(5, 2)">
													Melokalisir Nyeri
												</td>
												<td>
													5
												</td>
											</tr>
											<tr>
												<td onclick="dacrjasesmenkeperawatanirna_setScore(4, 2)">
													Fleksi Normal (Menarik anggota gerak yang dirangsang)
												</td>
												<td>
													4
												</td>
											</tr>
											<tr>
												<td onclick="dacrjasesmenkeperawatanirna_setScore(3, 2)">
													Fleksi Abnormal (dekortikasi)
												</td>
												<td>
													3
												</td>
											</tr>
											<tr>
												<td onclick="dacrjasesmenkeperawatanirna_setScore(2, 2)">
													Ekstensi Abnormal (deserebrasi)
												</td>
												<td>
													2
												</td>
											</tr>
											<tr>
												<td onclick="dacrjasesmenkeperawatanirna_setScore(1, 2)">
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
												<td onclick="dacrjasesmenkeperawatanirna_setScore(5, 3)">
													Berorientasi Baik
												</td>
												<td>
													5
												</td>
												<td rowspan="5">
													<input type="text" name="responVerbalasskepErmIrna" id="responVerbalasskepErmIrna" class="form-control" value="5">
												</td>
											</tr>
											<tr>
												<td onclick="dacrjasesmenkeperawatanirna_setScore(4, 3)">
													Berbicara mengacau (bingung)

												</td>
												<td>
													4
												</td>
											</tr>
											<tr>
												<td onclick="dacrjasesmenkeperawatanirna_setScore(3, 3)">
													Kata-Kata tidak teratur
												</td>
												<td>
													3
												</td>
											</tr>
											<tr>
												<td onclick="dacrjasesmenkeperawatanirna_setScore(2, 3)">
													Suara Tidak Jelas
												</td>
												<td>
													2
												</td>
											</tr>
											<tr>
												<td onclick="dacrjasesmenkeperawatanirna_setScore(1, 3)">
													Tidak Ada
												</td>
												<td>
													1
												</td>
											</tr>
											<tr>
												<td colspan="3">
													<select class="form-control" id="tipekesadaranasskepermirna">
														<option value="1">Compos mentis</option>
														<option value="2">Apatis</option>
														<option value="3">Somnolen</option>
														<option value="4">Delirium</option>
														<option value="5">Sopor</option>
														<option value="6">Coma</option>
													</select>
												</td>
												<td>
													<input type="text" class="form-control" name="skorassesmenkeperawatanErmIrna" id="skorassesmenkeperawatanErmIrna" value="15">
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="card card-default">
						<div class="card-header " style="background-color:black;">
							<h3 class="card-title" style="color:white;">PEMERIKSAAN FISIK UMUM</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<table class="table table-bordered table-sm">
										<thead></thead>
										<tbody>
											<tr>
												<td>
													Kepala
												</td>
												<td>
													<input type="radio" name="fisikKepalaasskepErmIrna" onclick="document.getElementById('fisikKepalaasskepErmIrnaKet').style.display='block'" id="fisikKepalaasskepErmIrna2" value="2">Tidak Normal<br>
													<input type="text" class="form-control form-control-xs" name="fisikKepalaasskepErmIrnaKet" id="fisikKepalaasskepErmIrnaKet" style="display:none;">
													<input type="radio" name="fisikKepalaasskepErmIrna" id="fisikKepalaasskepErmIrna1" onclick="document.getElementById('fisikKepalaasskepErmIrnaKet').style.display='none'" checked='true' value="1">Normal
												</td>
												<td>
													Jantung
												</td>
												<td>
													<input type="radio" name="fisikJantungasskepErmIrna" onclick="document.getElementById('fisikJantungasskepErmIrnaKet').style.display='block'" value="2">Tidak Normal<br>
													<input type="text" class="form-control form-control-xs" name="fisikJantungasskepErmIrnaKet" id="fisikJantungasskepErmIrnaKet" style="display:none;">
													<input type="radio" name="fisikJantungasskepErmIrna" onclick="document.getElementById('fisikJantungasskepErmIrnaKet').style.display='none'" checked='true' value="1">Normal
												</td>
											</tr>
											<tr>
												<td>
													Mata
												</td>
												<td>
													<input type="radio" name="fisikMataasskepErmIrna" onclick="document.getElementById('fisikMataasskepErmIrnaKet').style.display='block'" value="2">Tidak Normal<br>
													<input type="text" class="form-control form-control-xs" name="fisikMataasskepErmIrnaKet" id="fisikMataasskepErmIrnaKet" style="display:none;">
													<input type="radio" name="fisikMataasskepErmIrna" onclick="document.getElementById('fisikMataasskepErmIrnaKet').style.display='none'" value="1" checked='true'>Normal
												</td>
												<td>
													Paru
												</td>
												<td>
													<input type="radio" name="fisikParuasskepErmIrna" onclick="document.getElementById('fisikParuasskepErmIrnaKet').style.display='block'" value="2">Tidak Normal<br>
													<input type="text" class="form-control form-control-xs" name="fisikParuasskepErmIrnaKet" id="fisikParuasskepErmIrnaKet" style="display:none;">
													<input type="radio" name="fisikParuasskepErmIrna" onclick="document.getElementById('fisikParuasskepErmIrnaKet').style.display='none'" value="1" checked='true'>Normal
												</td>
											</tr>
											<tr>
												<td>
													THT
												</td>
												<td> 
													<input type="radio" name="fisikThtasskepErmIrna" onclick="document.getElementById('fisikThtasskepErmIrnaKet').style.display='block'" value="2">Tidak Normal<br>
													<input type="text" class="form-control form-control-xs" name="fisikThtasskepErmIrnaKet" id="fisikThtasskepErmIrnaKet" style="display:none;">
													<input type="radio" name="fisikThtasskepErmIrna" onclick="document.getElementById('fisikThtasskepErmIrnaKet').style.display='none'" value="1" checked='true'>Normal
												</td>
												<td>
													Ambomen
												</td>
												<td>
													<input type="radio" name="fisikAbdomenasskepErmIrna" onclick="document.getElementById('fisikAbdomenasskepErmIrnaKet').style.display='block'" value="2">Tidak Normal<br>
													<input type="text" class="form-control form-control-xs" name="fisikAbdomenasskepErmIrnaKet" id="fisikAbdomenasskepErmIrnaKet" style="display:none;">
													<input type="radio" name="fisikAbdomenasskepErmIrna" onclick="document.getElementById('fisikAbdomenasskepErmIrnaKet').style.display='none'" value="1" checked='true'>Normal
												</td>
											</tr>
											<tr>
												<td>
													Leher
												</td>
												<td>
													<input type="radio" name="fisikLeherasskepErmIrna" onclick="document.getElementById('fisikLeherasskepErmIrnaKet').style.display='block'" value="2">Tidak Normal<br>
													<input type="text" class="form-control form-control-xs" name="fisikLeherasskepErmIrnaKet" id="fisikLeherasskepErmIrnaKet" style="display:none;">
													<input type="radio" name="fisikLeherasskepErmIrna" onclick="document.getElementById('fisikLeherasskepErmIrnaKet').style.display='none'" value="1" checked='true'>Normal
												</td>
												<td>
													Genitalia
												</td>
												<td>
													<input type="radio" name="fisikGenitaliaasskepErmIrna" onclick="document.getElementById('fisikGenitaliaasskepErmIrnaKet').style.display='block'" value="2" >Tidak Normal<br>
													<input type="text" class="form-control form-control-xs" name="fisikGenitaliaasskepErmIrnaKet" id="fisikGenitaliaasskepErmIrnaKet" style="display:none;">
													<input type="radio" name="fisikGenitaliaasskepErmIrna" onclick="document.getElementById('fisikGenitaliaasskepErmIrnaKet').style.display='none'" value="1" checked='true'>Normal
												</td>
											</tr>
											<tr>
												<td>
													Mulut
												</td>
												<td>
													<input type="radio" name="fisikMulutasskepErmIrna" onclick="document.getElementById('fisikMulutasskepErmIrnaKet').style.display='block'" value="2">Tidak Normal<br>
													<input type="text" class="form-control form-control-xs" name="fisikMulutasskepErmIrnaKet" id="fisikMulutasskepErmIrnaKet" style="display:none;">
													<input type="radio" name="fisikMulutasskepErmIrna" onclick="document.getElementById('fisikMulutasskepErmIrnaKet').style.display='none'" value="1" checked='true'>Normal
												</td>
												<td>
													Status Localis
												</td>
												<td>
													<textarea class="form-control " id="fisikStatusLocalisasskepErmIrna"></textarea>
												</td>
											</tr>
											<tr>
												<td>
													Thorax
												</td>
												<td colspan="3">
													<input type="radio" name="fisikThoraxasskepErmIrna" onclick="document.getElementById('fisikThoraxasskepErmIrnaKet').style.display='block'" value="2">Tidak Normal<br>
													<input type="text" class="form-control form-control-xs"  name="fisikThoraxasskepErmIrnaKet" id="fisikThoraxasskepErmIrnaKet" style="display:none;"><br>
													<input type="radio" name="fisikThoraxasskepErmIrna" onclick="document.getElementById('fisikThoraxasskepErmIrnaKet').style.display='none'" value="1" checked='true'>Norma
												</td>
											</tr>
										</tbody>
									</table>
									<!-- /.form-group -->
								</div>
								<!-- /.col -->
							</div>
							<!-- /.row -->
						</div>
					</div>
					<div class="card card-default" id="divriwayatmensErmIrna" style="display:none;">
						<div class="card-header" style="background-color:black;">
							<h3 class="card-title" style="color:white;">RIWAYAT MENSTRUASI</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group row">
											<div class="col-md-4">
												<label class="col-form-label"> Riwayat Menstruasi</label>
											</div>
											<div class="col-md-8">
												<div class="row" id="dacrjasesmenneoanak_hmensId">
													<div class="col-md-5">
														<div class="form-group">
															<div class="row custom-control custom-checkbox custom-control-inline">
																<input name="dacrjasesmenneoanak_hmensId" value="1" type="radio" class="custom-control-input" id="dacrjasesmenneoanak_hmensId_1"> <label class="custom-control-label" for="dacrjasesmenneoanak_hmensId_1">Belum/Tidak Menstruasi</label>
															</div>
														</div>
													</div>
													<div class="col-md-5">
														<div class="form-group">
															<div class="row custom-control custom-checkbox custom-control-inline">
																<input name="dacrjasesmenneoanak_hmensId" value="2" type="radio" class="custom-control-input" id="dacrjasesmenneoanak_hmensId_2"> <label class="custom-control-label" for="dacrjasesmenneoanak_hmensId_2">Sudah Menstruasi</label>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-12" id="dacrjasesmenneoanak_div_hmensId2" style="">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group row">
												<div class="col-md-4">
													<!-- <i class="fa fa-angle-right"></i> -->&nbsp;
													<label class="col-form-label" title="Umur Menarche">Umur Menarche</label>
												</div>
												<div class="col-md-0">&nbsp;</div>
												<div class="col-md-4">
													<div class="input-group">
														<input type="number" onfocus="this.select();" class="form-control" id="dacrjasesmenneoanak_hmenarche">
														<span class="input-group-append">
															<span class="input-group-text">Tahun</span>
														</span>
													</div>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-md-4">
													<!-- <i class="fa fa-angle-right"></i> -->&nbsp;
													<label class="col-form-label" title="Siklus Haid">Siklus Haid</label>
												</div>
												<div class="col-md-0">&nbsp;</div>
												<div class="col-md-4">
													<div class="input-group">
														<input type="number" onfocus="this.select();" class="form-control" id="dacrjasesmenneoanak_hsiklushaid">
														<span class="input-group-append">
															<span class="input-group-text">Hari</span>
														</span>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
												<div class="col-md-4">
													<!-- <i class="fa fa-angle-right"></i> -->&nbsp;
													<label class="col-form-label" title="HPHT">HPHT</label>
												</div>
												<div class="col-md-4">
													<div class="input-group date" id="dacrjasesmenneoanak_dhtglhpht" data-target-input="nearest">
														<input id="dacrjasesmenneoanak_htglhpht" name="htglhpht" type="text" class="form-control datetimepicker-input" data-target="#dacrjasesmenneoanak_dhtglhpht" data-toggle="datetimepicker">
														<div class="input-group-append" data-target="#dacrjasesmenneoanak_dhtglhpht" data-toggle="datetimepicker">
															<div class="input-group-text"><!-- <i class="far fa-calendar"></i> --></div>
														</div>
													</div>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-md-4">
													<!-- <i class="fa fa-angle-right"></i> -->&nbsp;
													<label class="col-form-label" title="Perkiraan Menstruasi Berikutnya">Perkiraan Menstruasi Berikutnya</label>

												</div>
												<div class="col-md-4">
													<div class="input-group date" id="dacrjasesmenneoanak_dhtglmens" data-target-input="nearest">
														<input id="dacrjasesmenneoanak_htglmens" name="htglmens" type="text" class="form-control 
														datetimepicker-input" data-target="#dacrjasesmenneoanak_dhtglmens" data-toggle="datetimepicker">
														<div class="input-group-append" data-target="#dacrjasesmenneoanak_dhtglmens" data-toggle="datetimepicker">
															<div class="input-group-text">
																<!-- <i class="far fa-calendar"></i> -->
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
					<div class="card card-default" id="divskringigizianakErmIrna" style="display:none;">
						<div class="card-header" style="background-color:black;">
							<h3 class="card-title" style="color:white;">SKRINING GIZI Anak/Bayi</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<div class="row ">
								<div class="col-md-8">
									<div class="form-group row">
										<div class="col-md-12">
											<!-- <i class="fa fa-angle-right"></i> -->&nbsp; <label class="col-form-label">Apakah pasien tampak kurus :</label>
										</div>
									</div>
									<div class="form-group row" style="padding-bottom: 1px;">
										<div class="col-md-0"> &nbsp;</div>
										<div class="col-md-10">
											<div class="row" id="dacrjasesmenneoanak_egizia">
												<div class="col-md-2">
													<div class="form-group">
														<div class="row custom-control custom-checkbox custom-control-inline">
															<input name="dacrjasesmenneoanak_egizia" value="1" type="radio" class="custom-control-input" id="dacrjasesmenneoanak_egizia_1" onclick="dacrjasesmenneoanakex.sethasilgizi();"> <label class="custom-control-label" for="dacrjasesmenneoanak_egizia_1">Tidak</label>
														</div>
													</div>
												</div>
												<div class="col-md-2">
													<div class="form-group">
														<div class="row custom-control custom-checkbox custom-control-inline">
															<input name="dacrjasesmenneoanak_egizia" value="2" type="radio" class="custom-control-input" id="dacrjasesmenneoanak_egizia_2" onclick="dacrjasesmenneoanakex.sethasilgizi();"> <label class="custom-control-label" for="dacrjasesmenneoanak_egizia_2">Ya</label>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-md-12">
											<!-- <i class="fa fa-angle-right"></i> -->&nbsp; <label class="col-form-label">Apakah ada penurunan berat badan
											dalam satu bulan terakhir?</label>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-md-0"> &nbsp;</div>
										<div class="col-md-11">
											<label class="col-form-label">(Berdasarkan penilaian
												objektif data BB bila ada dan atau penilaian subjektif orang
												tua pasien atau untuk bayi &lt;1 tahun BB tidak naik selama 3
											bulan terakhir)</label>
										</div>
									</div>
									<div class="form-group row" style="padding-bottom: 1px;">
										<div class="col-md-0"> &nbsp;</div>
										<div class="col-md-10">
											<div class="row" id="dacrjasesmenneoanak_egizib">
												<div class="col-md-2">
													<div class="form-group">
														<div class="row custom-control custom-checkbox custom-control-inline">
															<input name="dacrjasesmenneoanak_egizib" value="1" type="radio" class="custom-control-input" id="dacrjasesmenneoanak_egizib_1" onclick="dacrjasesmenneoanakex.sethasilgizi();"> <label class="custom-control-label" for="dacrjasesmenneoanak_egizib_1">Tidak</label>
														</div>
													</div>
												</div>
												<div class="col-md-2">
													<div class="form-group">
														<div class="row custom-control custom-checkbox custom-control-inline">
															<input name="dacrjasesmenneoanak_egizib" value="2" type="radio" class="custom-control-input" id="dacrjasesmenneoanak_egizib_2" onclick="dacrjasesmenneoanakex.sethasilgizi();"> <label class="custom-control-label" for="dacrjasesmenneoanak_egizib_2">Ya</label>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="form-group row">
										<div class="col-md-12">
											<!-- <i class="fa fa-angle-right"></i> -->&nbsp; <label class="col-form-label">Apakah ada salah satu kondisi
											berikut :</label>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-md-0">  </div>
										<div class="col-md-10">
											<label class="col-form-label"> a. Diare = 5x/hari dan
											atau muntah = 3x/hari dalam seminggu terakhir</label>
										</div>
									</div>
									<div class="form-group row" style="padding-bottom: 1px;">
										<div class="col-md-0"> &nbsp;</div>
										<div class="col-md-10">
											<div class="row" id="dacrjasesmenneoanak_egizic1">
												<div class="col-md-2">
													<div class="form-group">
														<div class="row custom-control custom-checkbox custom-control-inline">
															<input name="dacrjasesmenneoanak_egizic1" value="1" type="radio" class="custom-control-input" id="dacrjasesmenneoanak_egizic1_1" onclick="dacrjasesmenneoanakex.sethasilgizi();"> <label class="custom-control-label" for="dacrjasesmenneoanak_egizic1_1">Tidak</label>
														</div>
													</div>
												</div>
												<div class="col-md-2">
													<div class="form-group">
														<div class="row custom-control custom-checkbox custom-control-inline">
															<input name="dacrjasesmenneoanak_egizic1" value="2" type="radio" class="custom-control-input" id="dacrjasesmenneoanak_egizic1_2" onclick="dacrjasesmenneoanakex.sethasilgizi();"> <label class="custom-control-label" for="dacrjasesmenneoanak_egizic1_2">Ya</label>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-md-0">  </div>
										<div class="col-md-10">
											<label class="col-form-label">b. Asupan makan berkurang
											selama seminggu terakhir</label>
										</div>
									</div>
									<div class="form-group row" style="padding-bottom: 1px;">
										<div class="col-md-0"> &nbsp;</div>
										<div class="col-md-10">
											<div class="row" id="dacrjasesmenneoanak_egizic2">
												<div class="col-md-2">
													<div class="form-group">
														<div class="row custom-control custom-checkbox custom-control-inline">
															<input name="dacrjasesmenneoanak_egizic2" value="1" type="radio" class="custom-control-input" id="dacrjasesmenneoanak_egizic2_1" onclick="dacrjasesmenneoanakex.sethasilgizi();"> <label class="custom-control-label" for="dacrjasesmenneoanak_egizic2_1">Tidak</label>
														</div>
													</div>
												</div>
												<div class="col-md-2">
													<div class="form-group">
														<div class="row custom-control custom-checkbox custom-control-inline">
															<input name="dacrjasesmenneoanak_egizic2" value="2" type="radio" class="custom-control-input" id="dacrjasesmenneoanak_egizic2_2" onclick="dacrjasesmenneoanakex.sethasilgizi();"> <label class="custom-control-label" for="dacrjasesmenneoanak_egizic2_2">Ya</label>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-md-12">
											<!-- <i class="fa fa-angle-right"></i> -->&nbsp; <label class="col-form-label">Apakah terdapat penyakit atau keadaan yang menyebabkan pasien berisiko mengalami malnutrisi ?</label>
										</div>
									</div>  
									<div class="form-group row" style="padding-bottom: 1px;">
										<div class="col-md-0"> &nbsp;</div>
										<div class="col-md-10">
											<div class="row" id="dacrjasesmenneoanak_egizid">
												<div class="col-md-2">
													<div class="form-group">
														<div class="row custom-control custom-checkbox custom-control-inline">
															<input name="dacrjasesmenneoanak_egizid" value="1" type="radio" class="custom-control-input" id="dacrjasesmenneoanak_egizid_1" onclick="dacrjasesmenneoanakex.sethasilgizi();"> <label class="custom-control-label" for="dacrjasesmenneoanak_egizid_1">Tidak</label>
														</div>
													</div>
												</div>
												<div class="col-md-2">
													<div class="form-group">
														<div class="row custom-control custom-checkbox custom-control-inline">
															<input name="dacrjasesmenneoanak_egizid" value="2" type="radio" class="custom-control-input" id="dacrjasesmenneoanak_egizid_2" onclick="dacrjasesmenneoanakex.sethasilgizi();"> <label class="custom-control-label" for="dacrjasesmenneoanak_egizid_2">Ya</label>
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
											<b><label class="col-form-label">Total Skor </label></b>
										</div>
										<div class="col-md-5">
											<input type="number" onfocus="this.select();" class="form-control font-weight-bold" name="dacrjasesmenneoanak_egiziskor" id="dacrjasesmenneoanak_egiziskor">
										</div>
									</div>
									<div class="form-group row" style="padding-bottom: 5px;">
										<div class="col-md-12">
											<label class="col-form-label font-italic">* Catatan :
											Skor 0 Risiko Rendah, Skor 1-3 Risiko Sedang, 4-5 Risiko Berat</label>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-md-3">
											<b><label class="col-form-label font-weight-bold">Hasil Skrining </label></b>
										</div>
										<div class="col-md-8">
											<label class="col-form-label font-weight-bold" id="dacrjasesmenneoanak_lgiziskor">RISIKO RENDAH</label>
										</div>
									</div>
								</div>
							</div>
							<div class="row ">
								<div class="col-md-12 row d-flex justify-content-center">
									<label class="col-form-label font-weight-bold">Daftar
									penyakit / keadaan yang berisiko mengakibatkan malnutrisi</label>
								</div>
								<div class="table-responsive">
									<table class="table table-bordered table-condensed" width="100%">
										<tbody>
											<tr class="">
												<td width="40%">
													<div class="row ">
														<div class="col-md-12">
															<div class="form-group row">
																<!-- <i class="fa fa-caret-right"></i> -->&nbsp;&nbsp; (Tersangka)
																penyakit jantung bawaan
															</div>
															<div class="form-group row">
																<!-- <i class="fa fa-caret-right"></i> -->&nbsp;&nbsp; (Tersangka)
																HIV
															</div>
															<div class="form-group row">
																<!-- <i class="fa fa-caret-right"></i> -->&nbsp;&nbsp; (Tersangka)
																kanker
															</div>
															<div class="form-group row">
																<!-- <i class="fa fa-caret-right"></i> -->&nbsp;&nbsp; Penyakit hati
																kronik
															</div>
															<div class="form-group row">
																<!-- <i class="fa fa-caret-right"></i> -->&nbsp;&nbsp; Kelainan
																anatomi daerah mulut yang menyebabkan kesulitan makan
																(misal : bibir sumbing)
															</div>
														</div>
													</div>

												</td>
												<td width="30%" style="padding: 1;">
													<div class="row ">
														<div class="col-md-12">
															<div class="form-group row">
																<!-- <i class="fa fa-caret-right"></i> -->&nbsp;&nbsp; Diare kronik
															</div>
															<div class="form-group row">
																<!-- <i class="fa fa-caret-right"></i> -->&nbsp;&nbsp; TB paru
															</div>
															<div class="form-group row">
																<!-- <i class="fa fa-caret-right"></i> -->&nbsp;&nbsp; Luka bakar
																luas
															</div>
															<div class="form-group row">
																<!-- <i class="fa fa-caret-right"></i> -->&nbsp;&nbsp; Terpasang
																stoma
															</div>
															<div class="form-group row">
																<!-- <i class="fa fa-caret-right"></i> -->&nbsp;&nbsp; Trauma
															</div>
														</div>
													</div>
												</td>
												<td width="30%" style="padding: 1;">
													<div class="row ">
														<div class="col-md-12">
															<div class="form-group row">
																<!-- <i class="fa fa-caret-right"></i> -->&nbsp;&nbsp; Retardasi
																mental
															</div>
															<div class="form-group row">
																<!-- <i class="fa fa-caret-right"></i> -->&nbsp;&nbsp; Keterlambatan
																perkembangan
															</div>
															<div class="form-group row">
																<!-- <i class="fa fa-caret-right"></i> -->&nbsp;&nbsp; Rencana /
																paska pembedahan mayor
															</div>
															<div class="form-group row">
																<!-- <i class="fa fa-caret-right"></i> -->&nbsp;&nbsp; Lain-lain
																sesuai pertimbangan dokter
															</div>
															<div class="form-group row">
																<!-- <i class="fa fa-caret-right"></i> -->&nbsp;&nbsp; Kelainan
																metabolic bawaan
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
					<div class="card card-default" id="divskrininggizidewasaErmIrna">
						<div class="card-header" style="background-color:black;">
							<h3 class="card-title" style="color:white;">SKRINING GIZI</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
									<label class="form-label"> > Apakah ada penurunan berat badan tidak direncanakan dalam 6 bulan terakhir</label>
									<select class="form-control form-control-xs" onclick="ermrwjkeperawatanbbturunkgirna()"  id="ermrwjkeperawatanbbturun">
										<option value="1">Tidak</option>
										<option value="2">Tidak Yakin</option>
									</select>
									<div>
										<select class="form-control form-control-xs" id="ermrwjkeperawatanbbturunkg" style="display:none;">
											<option value="1">1 - 5 Kg (1)</option>
											<option value="2">6 - 10 Kg (2)</option>
											<option value="3">11 - 15 Kg (3)</option>
											<option value="4">> 15 Kg (4)</option>
										</select>
									</div>
									<label class="form-label"> > Apakah asupan makan berkurang karena penurunan nafsu makan/ kesulitan menerima makanan</label>
									<select class="form-control form-control-xs" id="ermrwjkeperawatanpenurunanmakan">
										<option>Tidak</option>
										<option>Ya</option>
									</select>
								</div>
								<div class="col-md-6">
									<label class="form-label">Total Skor</label>
									<input type="text" name="ermrwjkeperawatantotalskor" id="ermrwjkeperawatantotalskor" class="form-control form-control-xs">
									<label>Saran/Tindakan</label>
									<input type="text" class="form-control form-control-xs" name="ermrwjkeperawatansaran" id="ermrwjkeperawatansaran">
									<label class="form-label">Catatan : Skor 0 risiko rendah, Skor 1 risiko sedang, Skor = 2 risiko tinggi konsultasikan ahli gizi atau Bila terdapat kondisi seperti DM, luka bakar, CKD, hiperlipidemia atau kondisi khusus lainnya berdasarkan pertimbangan dokter, maka konsultasikan ke ahli gizi</label>
								</div>
							</div>
						</div><!-- end card body -->
					</div>
					<div class="card card-default">
						<div class="card-header" style="background-color:black;">
							<h3 class="card-title" style="color:white;">STATUS FUNGSIONAL *</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<input type="radio" name="ermrwjkeperawatanfungsional" value="1" checked='true'>&nbsp;<label class="form-label">Mandiri</label>
							<input type="radio" name="ermrwjkeperawatanfungsional" value="2">&nbsp;<label class="form-label">Perlu bantuan</label>
							<input type="radio" name="ermrwjkeperawatanfungsional" value="3">&nbsp;<label class="form-label">Ketergantungan total</label>
						</div>
					</div>
					<div class="card card-default">
						<div class="card-header" style="background-color:black;">
							<h3 class="card-title" style="color:white;">SKRINING RISIKO CEDERA / JATUH (Usia < 13 - > 60 Tahun) menggunakan Up and Go Test (Pasien ini berumur 69 Tahun)</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
									<div>
										<label class="form-label">a. Perhatikan cara berjalan pasien saat akan duduk dikursi, apakah pasien tampak tidak seimbang (sempoyongan/ limbung)</label>
										<input type="radio" name="ermrwjkeperawatankeseimbangan" checked='true' value="1">&nbsp;<label> Tidak</label>&nbsp;&nbsp;<input type="radio" name="ermrwjkeperawatankeseimbangan" value="2">&nbsp;<label> Ya</label> 
									</div>
									<div>
										<label class="form-label">b. Apakah pasien memegang pinggiran kursi atau meja atau benda lain sebagai penopang saat akan duduk</label>
										<input type="radio" name="ermrwjkeperawatanpenopang" value="1" checked="true">&nbsp;<label> Tidak</label>&nbsp;&nbsp;<input type="radio" name="ermrwjkeperawatanpenopang" value="2">&nbsp;<label> Ya</label>
									</div>
								</div>
								<div class="col-md-6">
									<div>
										<label class="form-label">Hasil</label>
										<input type="radio" name="ermrwjkeperawatanhasilskrining" value="1" checked='true'>
										<label class="form-label">Tidak Berisiko</label>&nbsp;
										<input type="radio" name="ermrwjkeperawatanhasilskrining" value="2">
										<label class="form-label">Risiko Rendah</label>&nbsp;
										<input type="radio" name="ermrwjkeperawatanhasilskrining" value="3">
										<label class="form-label">Risiko Tinggi</label>&nbsp;
									</div>
									<div>
										<label class="form-label">Keterangan</label>
										<input class="form-control form-control-xs" type="text" name="ermrwjkeperawatanhasilkesimpulan" id="ermrwjkeperawatanhasilkesimpulan">
									</div>
									<div>               
										<label class="form-label">Catatan : Tidak berisiko (tidak ditemukan a dan b), Risiko rendah (ditemukan a/ b), Risiko tinggi (a dan b ditemukan)</label>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card card-default">
						<div class="card-header" style="background-color:black;">
							<h3 class="card-title" style="color:white;">ASPEK PENGKAJIAN NYERI  (Pasien ini berumur 69 Tahun)</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">         
									<label class="form-label">WONG BAKER FACE SCALE AND NUMERIC PAIN RATING SCALE (Pasien > 6 tahun)</label>
								</div>
								<div class="col-md-2" style="text-align: center;">
									<div >
										<img src="<?= base_url('_assets/nyeri0.png') ?>" style="width: 100px;height: 100px;">
									</div>
									<div >
										<label class="form-label">Tidak Nyeri</label>
									</div>
								</div>
								<div class="col-md-2" style="text-align: center;">
									<div>  
										<img src="<?= base_url('_assets/nyeri2.png') ?>" style="width: 100px;height: 100px;">
									</div>
									<div>
										<label class="form-label">Sedikit Nyeri</label>
									</div>
								</div>
								<div class="col-md-2" style="text-align: center;">
									<div>  
										<img src="<?= base_url('_assets/nyeri4.png') ?>" style="width: 100px;height: 100px;">
									</div>
									<div>
										<label class="form-label">Sedikit Nyeri</label>
									</div>
								</div>
								<div class="col-md-2" style="text-align: center;">
									<div>  
										<img src="<?= base_url('_assets/nyeri6.png') ?>" style="width: 100px;height: 100px;">
									</div>
									<div>
										<label class="form-label">Sedikit Nyeri</label>
									</div>
								</div>
								<div class="col-md-2" style="text-align: center;">
									<div>  
										<img src="<?= base_url('_assets/nyeri8.png') ?>" style="width: 100px;height: 100px;">
									</div>
									<div>
										<label class="form-label">Sedikit Nyeri</label>
									</div>
								</div>
								<div class="col-md-2" style="text-align: center;">
									<div>  
										<img src="<?= base_url('_assets/nyeri10.png') ?>" style="width: 100px;height: 100px;">
									</div>
									<div>
										<label class="form-label">Sedikit Nyeri</label>
									</div>
								</div>
								<div class="col-md-1"></div>
								<div class="col-md-1"><input type="radio" name="keperawatanskorfaceermirna" id="keperawatanskorfaceermirna1" value="0" checked='true'><label>0</label></div>
								<div class="col-md-1"><input type="radio" name="keperawatanskorfaceermirna" id="keperawatanskorfaceermirna2" value="1"><label>1</label></div>
								<div class="col-md-1"><input type="radio" name="keperawatanskorfaceermirna" id="keperawatanskorfaceermirna3" value="2"><label>2</label></div>
								<div class="col-md-1"><input type="radio" name="keperawatanskorfaceermirna" id="keperawatanskorfaceermirna4" value="3"><label>3</label></div>
								<div class="col-md-1"><input type="radio" name="keperawatanskorfaceermirna" id="keperawatanskorfaceermirna5" value="4"><label>4</label></div>
								<div class="col-md-1"><input type="radio" name="keperawatanskorfaceermirna" id="keperawatanskorfaceermirna6" value="5"><label>5</label></div>
								<div class="col-md-1"><input type="radio" name="keperawatanskorfaceermirna" id="keperawatanskorfaceermirna7" value="6"><label>6</label></div>
								<div class="col-md-1"><input type="radio" name="keperawatanskorfaceermirna" id="keperawatanskorfaceermirna8" value="7"><label>7</label></div>
								<div class="col-md-1"><input type="radio" name="keperawatanskorfaceermirna" id="keperawatanskorfaceermirna9" value="8"><label>8</label></div>
								<div class="col-md-1"><input type="radio" name="keperawatanskorfaceermirna" id="keperawatanskorfaceermirna10" value="9"><label>9</label></div>
								<div class="col-md-1"><input type="radio" name="keperawatanskorfaceermirna" id="keperawatanskorfaceermirna11" value="10"><label>10</label></div>
								<div class="col-md-1"></div>



							</div>
						</div>
					</div>
					<div class="card card-default">
						<div class="card-header" style="background-color:black;">
							<h3 class="card-title" style="color:white;">KEBUTUHAN KOMUNIKASI/PENDIDIKAN DAN PENGAJARAN *</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<div class="row">     
								<div class="col-md-2">
									<div>  
										<label class="form-label">Bicara</label>
									</div>
									<div>  
										<label class="form-label">Perlu Penerjemah</label>
									</div>
									<div>  
										<label class="form-label">Bahasa Isyarat</label>
									</div>
								</div>
								<div class="col-md-2">
									<div>                          
										<input type="radio" name="KebKomBicaraasskepErmIrna" onclick="document.getElementById('DivPenjelasasskepErmIrna').style.display='none'" value="1" id="PenerjemahasskepErmIrna1" checked='true'>
										<label>Normal</label>
									</div>
									<div>                          
										<input type="radio" name="PenerjemahasskepErmIrna" id="PenerjemahasskepErmIrna1" value="1" checked='true'>
										<label>Tidak</label>
									</div>
									<div>                          
										<input type="radio" name="IsyaratasskepErmIrna" id="IsyaratasskepErmIrna1" value="1" checked='true'>
										<label>Tidak</label>
									</div>
								</div>
								<div class="col-md-2">
									<div>
										<input type="radio" name="KebKomBicaraasskepErmIrna" onclick="KebKomBicaraasskepErmIrna()" value="2" id="PenerjemahasskepErmIrna2">
										<label>Gangguan bicara, Jelaskan</label>
										<div id="DivPenjelasasskepErmIrna" style="display:none;">
											<input type="text" name="PenjelasasskepErmIrna">
										</div>
									</div>
									<div>
										<input type="radio" name="PenerjemahasskepErmIrna" id="PenerjemahasskepErmIrna2" value="2">
										<label>Ya, Bahasa</label>
									</div>
									<div>
										<input type="radio" name="IsyaratasskepErmIrna" id="IsyaratasskepErmIrna2" value="2">
										<label>Ya</label>
									</div>
								</div>
								<div class="col-md-2">
									<div>
										<label class="form-label">Hambatan Belajar</label>
									</div>
									<div>
										<label class="form-label"> Tingkat Pendidikan</label>
									</div>
								</div>
								<div class="col-md-2">
									<div>
										<input type="radio" name="HamBelajarasskepErmIrna" value="1" checked='true'> 
										<label>Tidak</label>
									</div>
									<div>
										<input type="radio" name="TinPendidikanasskepErmIrna" value="1" checked='true'>
										<label>Tidak</label>
									</div>
									<div>
										<input type="radio" name="TinPendidikanasskepErmIrna" value="2">
										<label>SMP</label>
									</div>
									<div>
										<input type="radio" name="TinPendidikanasskepErmIrna" value="3">
										<label>Perguruan Tinggi</label>
									</div>
								</div>
								<div class="col-md-2">
									<div>
										<input type="radio" name="HamBelajarasskepErmIrna" value="2">
										<label>Ya</label>
									</div>
									<div>
										<input type="radio" name="TinPendidikanasskepErmIrna" value="4">
										<label>SD</label>
									</div>
									<div>
										<input type="radio" name="TinPendidikanasskepErmIrna" value="5">
										<label>SMA</label>
									</div>
									<div>
										<input type="radio" name="TinPendidikanasskepErmIrna" value="6">
										<label>Lain-lain</label>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card card-default">
						<div class="card-header" style="background-color:black;">
							<h3 class="card-title" style="color:white;">DAFTAR DIAGNOSA KEPERAWATAN & INTERVENSI KEPERAWATAN *</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<h5>Intervensi Keperawatan</h5>                      
									<textarea class="form-control" id="intervensiasskepErmIrna"></textarea>
									<div id="DivintervensiasskepErmIrna" style="position:relative;"></div>
								</div> 
								<div class="col-md-12">   
									<h5>Diagnosa Keperawatan</h5>                  
									<textarea class="form-control" id="DiagnosaasskepErmIrna"></textarea>
									<div id="DivDiagnosaasskepErmIrna"></div>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<button class="btn btn-primary btn-sm" onclick="tampilKomunikasiPengajaranKepIrna()"><i class="fa fa-search"></i> Diagnosa Perawat</button>
						</div>
					</div>
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-4" align="center">
									<label>Dokter Penanggung Jawab Pasien</label>
									<div style="text-align: center;">
										<img style="width:200px;height:200px;border: 2px dashed;background-color: #535b62d1;" id="Gambarpaint_ttdassesmenperawatirna">
										<input type="text" class="form-control form-control-sm text-center d-none" id="Hasilpaint_ttdassesmenperawatirna" disabled>
									</div>
									<button  class="btn btn-warning btn-sm" onclick="ShowModalttdassesmenperawatirna();">Klik Tanda Tangan</button><br>
									<label>Nama &amp; Tanda tangan</label>
								</div>
							</div>
						</div>

						<!-- <div class="row">
							<div class="col-sm-4" style="text-align: center;">
								<label>Dokter Penganggung Jawab Pasien</label><br>
								<div class="card" style="border-collapse: !important;" id="paint_ttdassesmenperawatirna"></div>
								<label>Nama & Tanda tangan</label> 
								<div id="paint_assesmen"></div>
							</div>
							<div class="col-1"></div>
						</div> -->
						<div class="card-footer">
							<button class="btn btn-primary btn-sm" onclick="simpanAssesmenKeperawatanErmIrna()"><i class="fa fa-save"></i> Simpan</button>
						</div>
					</div>

				</div>
			</div>

			<!-- RESUME MEDIS IRNA -->
			<div class="tab-pane p-1 fade" id="ResumeErmMedisirna" role="tabpanel">
				<h6 class="lead mb-0"><u></u></h6>
				<div class="card card-default">
					<div class="card-header" style="background-color:black;">
						<h3 class="card-title" style="color:white;"> Input Ringkasan Pasien Pulang</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<div class="row">
							<div class="col-md-2 p2">
								<label class="form-label">Tanggal Masuk</label>
							</div>
							<div class="col-md-4 p2">
								<input type="date" id="TglMasukResumeermirna" class="form-control form-control-xs" value="<?php echo date('Y-m-d');?>">
								<!-- /.form-group -->
							</div>
							<!-- /.col -->
							<div class="col-md-2 p2">
								<label class="form-label">Cara Masuk</label>
							</div>
							<div class="col-md-4 p2">
								<select class="form-control form-control-xs" id="caramasukResumeermirna">
									<option value="1">IGD</option>
								</select>
							</div>
							<div class="col-md-2 p2">
								<label class="form-label">Tanggal Keluar</label>
							</div>
							<div class="col-md-4 p2">
								<input type="date" id="TglKeluarResumeermirna" class="form-control form-control-xs" value="<?php echo date('Y-m-d');?>">
								<!-- /.form-group -->
							</div>
							<div class="col-md-2 p2">
								<label class="form-label">Berat Lahir</label>
							</div>
							<div class="col-md-4 p2">
								<input class="form-control form-control-xs" id="BBResumeermirna">
							</div> 
							<div class="col-md-2 p2">
								<label class="form-label">DPJP Utama</label>
							</div>
							<div class="col-md-4 p2">
								<select class="form-control form-control-xs" id="dpjpResumeermirna">
								</select>
							</div> 
							<div class="col-md-2 p2">
								<label class="form-label">Tanggal</label>
							</div>
							<div class="col-md-4 p2">
								<input class="form-control form-control-xs" id="tglResumeermirna">
							</div>
							<div class="col-md-2 p2">
								<label class="form-label">Perawat</label>
							</div>
							<div class="col-md-4 p2">
								<select class="form-control form-control-xs" id="perawatResumeermirna">
								</select>
							</div>

						</div>
						<!-- /.row -->


					</div>
					<!-- /.card-body -->
				</div>
				<!-- riwayat diagnosa -->
				<div class="card card-default">
					<div class="card-header" style="background-color:black;">
						<h3 class="card-title" style="color:white;"> Riwayat Diagnosa (Diagnose History)</h3>
					</div>
					<!-- tbodylistresumeErmirna-->
					<!-- /.card-header -->
					<div class="row p-2">				
						<div class="col-md-12">
							<div class="card card-default">
								<div class="card-header">
									<h4 class="card-title">Histori Diagnosa</h4>
									<div class="card-tools">
										<button type="button" class="btn btn-tool" data-card-widget="collapse">
											<i class="fas fa-minus"></i>
										</button>
										<button type="button" class="btn btn-tool" data-card-widget="remove">
											<i class="fas fa-times"></i>
										</button>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive-md">
										<table class="table-sm" class="table table-striped table-sm choose" style="border-collapse: inherit;" style="border:solid;">
											<thead>
												<th>
													NO
												</th>
												<th>
													POLI
												</th>
												<th>
													TGL KUNJUNGAN
												</th>
												<th>
													ICD
												</th>
												<th>
													DISKRIPSI
												</th>
											</thead>
											<tbody id="tbodylistresumeermirna">
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /.card-body -->
				</div>
				<div class="card card-default">
					<div class="card-header" style="background-color:black;">
						<h3 class="card-title" style="color:white;"> Pemeriksaan (Examination)</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<div class="row">
							<div class="col-md-2 p2">
								<label class="form-label">Riwayat Kesehatan</label>
							</div>
							<div class="col-md-4 p2">
								<textarea class="form-control" id="RiwayatKesResumeermirna"></textarea>
								<!-- /.form-group -->
							</div>
							<!-- /.col -->
							<div class="col-md-2 p2">
								<label class="form-label">Terapi</label>
							</div>
							<div class="col-md-4 p2">
								<textarea class="form-control " id="TerapiResumeermirna"></textarea>
								<!-- /.form-group -->
							</div>
							<!-- /.col --> 
							<div class="col-md-2 p2">
								<label class="form-label">Pemeriksaan Fisik</label>
							</div>
							<div class="col-md-4 p2">
								<textarea class="form-control " id="PemeriksaanFisikResumeermirna"></textarea>
							</div>
							<div class="col-md-2 p2">
								<label class="form-label">Tindakan</label>
							</div>
							<div class="col-md-4 p2">
								<textarea class="form-control" id="TindakanResumeermirna"></textarea>
							</div>
							<div class="col-md-2 p2">
								<label class="form-label">Pemeriksaan Diagnostik</label>
							</div>
							<div class="col-md-4 p2">
								<textarea class="form-control" id="DiagnostikResumeermirna"></textarea>
							</div>  
							<div class="col-md-2 p2">
								<label class="form-label">Intruksi / Tindak Lanjut</label>
							</div>
							<div class="col-md-4 p2">
								<textarea class="form-control" id="InstruksiResumeermirna"></textarea>
							</div>
							<div class="col-md-2 p2">
								<label class="form-label">Diagnosis</label>
							</div>
							<div class="col-md-4 p2">
								<textarea class="form-control" id="DiagnosisResumeermirna"></textarea>
							</div>
							<div class="col-md-2 p2">
								<label class="form-label">Perkembangan Selama Perawatan</label>
							</div>
							<div class="col-md-4 p2">
								<textarea class="form-control" id="PerkembanganResumeermirna"></textarea>
							</div>
							<div class="col-md-2 p2">
								<label class="form-label">Diagnosa Sekunder</label>
							</div>
							<div class="col-md-4 p2">
								<textarea class="form-control" id="DiagnosisSekunderResumeermirna"></textarea>
							</div>
						</div>
						<!-- /.row -->
					</div>
					<!-- /.card-body -->
				</div>
				<div class="card card-default">
					<div class="card-header" style="background-color:black;">
						<h3 class="card-title" style="color:white;"> Diagnosis & Prosedur Terapi (Diagnose & Therapeutic Procedure)</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<div class="card card-default">
									<div class="card-header">
										<h4 class="card-title">Penyakit</h4>
										<div class="card-tools">
											<button type="button" class="btn btn-tool" data-card-widget="collapse">
												<i class="fas fa-minus"></i>
											</button>
											<button type="button" class="btn btn-tool" data-card-widget="remove">
												<i class="fas fa-times"></i>
											</button>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive-md">
											<table class="table-sm" class="table table-striped table-sm choose" style="border-collapse: inherit;" style="border:solid;">
												<thead>
													<th>
														ICD-10
													</th>
												</thead>
												<tbody id="tbodylisticd10resumeirna">
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<button type="button" class="btn btn-default" onclick="showModalTambahdiagnosaresumeermirna()">Tambah Diagnosa</button><br>
							</div>
							<div class="col-md-6">
								<div class="card card-default">
									<div class="card-header">
										<h4 class="card-title">Tindakan</h4>
										<div class="card-tools">
											<button type="button" class="btn btn-tool" data-card-widget="collapse">
												<i class="fas fa-minus"></i>
											</button>
											<button type="button" class="btn btn-tool" data-card-widget="remove">
												<i class="fas fa-times"></i>
											</button>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive-md">
											<table class="table-sm" class="table table-striped table-sm choose" style="border-collapse: inherit;" style="border:solid;">
												<thead>
													<th>
														ICD 9
													</th>
												</thead>
												<tbody id="tbodylisticd9resumeirna">
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<button type="button" class="btn btn-default" onclick="showModalShowaddicd9resumeirna()">Tambah Procedures</button><br>
							</div>
						</div>
						<!-- /.row -->
					</div>
					<!-- /.card-body -->
				</div>
				<div class="card card-default">
					<div class="card-header" style="background-color:black;">
						<h3 class="card-title" style="color:white;"> Kondisi Pasien (Patient's Status)</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<div class="row">
							<div class="col-md-4">
								<table>
									<tr>
										<td>
											<label>Cara Keluar</label>
										</td>
										<td>
											<select class="form-control form-control-xs"  name="CaraKeluarResumeermirna" id="CaraKeluarResumeermirna"></select>
										</td>
									</tr>
									<tr>
										<td>
											<label>Keadaan Umum</label>
										</td>
										<td>
											<select class="form-control form-control-xs" name="keadaanUmumResumeErmIrna" id="keadaanUmumResumeErmIrna" ></select>
										</td>
									</tr>
									<tr>
										<td>
											<label>Kesadaran</label>  
										</td>
										<td> 
											<input type="text" class="form-control form-control-xs" name="kesadaranResumeermirna" id="kesadaranResumeermirna">
										</td>
									</tr>
									<tr>
										<td>
											<label>Mobilitasi Pulang</label>
										</td>
										<td>
											<input type="text" class="form-control form-control-xs" name="MblplgResumeermirna" id="MblplgResumeermirna">
										</td>
									</tr>
								</table>
							</div>
							<div class="col-md-4">
								<table>
									<tr>
										<td>
											<label>Covid 19</label>
										</td>
										<td>
											<input type="checkbox" name="CovidResumeermirna" id="CovidResumeermirna">
										</td>
									</tr>
									<tr>
										<td>
											<label>Tensi</label>
										</td>
										<td>
											<input type="text" class="form-control form-control-xs" name="tensiResumeermirna" id="tensiResumeermirna">
										</td>
									</tr>
									<tr>
										<td>
											<label>Nadi</label>
										</td>
										<td>
											<input type="text" class="form-control form-control-xs" name="nadiResumeermirna" id="nadiResumeermirna" >
										</td>
									</tr>
									<tr>
										<td>
											<label>Alat Bantu</label>
										</td>
										<td>
											<input type="checkbox" name="alatBntResumeermirna" id="alatBntResumeermirna">
										</td>
									</tr>
								</table>
							</div>
							<div class="col-md-4">
								<table>
									<tr>
										<td>
											<label>Kasus Baru</label>
										</td>
										<td>
											<input type="checkbox"  name="KasusBrResumeermirna" id="KasusBrResumeermirna">
										</td>
									</tr>
									<tr>
										<td>
											<label>Suhu</label>
										</td>
										<td>
											<input type="text" class="form-control form-control-xs" name="SuhuResumeermirna" id="SuhuResumeermirna">
										</td>
									</tr>
									<tr>
										<td>
											<label>Respirasi</label>
										</td>
										<td>
											<input type="text" class="form-control form-control-xs" name="RespirasiResumeermirna" id="RespirasiResumeermirna">
										</td>
									</tr>
									<tr>
										<td>
											<label>Alat Medis Terpasang</label>
										</td>
										<td>
											<input type="text" class="form-control form-control-xs" name="AlatMedisResumeermirna" id="AlatMedisResumeermirna">
										</td>
									</tr>
								</table>
							</div>
						</div>
						<!-- /.row -->
					</div>
					<!-- /.card-body -->
				</div>
				<div class="card card-default">
					<div class="card-header" style="background-color:black;">
						<h3 class="card-title" style="color:white;"> Intruksi / Tindak Lanjut (Instruction / Follow Up / Medical Advice)</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<div class="row">
							<div class="col-md-2">
								<label>Intruksi Tindak Lanjut</label>
							</div >
							<div class="col-md-3">                      
								<select class="form-control form-control-xs" id="selectInstruksiResumeermirna" onchange="selectInstruksiResumeermirna()">
									<option value="1">DIRAWAT</option>
									<option value="2">DIRUJUK</option>
									<option value="3">PULANG</option>
									<option value="4">MENINGGAL</option>
									<option value="5">DEATH ON ARRIVAL</option>
								</select>
							</div>
							<div class="col-md-6">
								<button class="btn btn-primary btn-xs" style="display: none;">Pengantar Rawat Inap</button>
								<button class="btn btn-primary btn-xs" style="display: none;">Rujuk Alih Rawat</button>
								<button class="btn btn-primary btn-xs" style="display: none;">Surat Kontrol</button>
								<button class="btn btn-primary btn-xs" style="display: none;">Program Rujuk Balik</button>
								<button class="btn btn-primary btn-xs" style="display: none;">Surat Kematian</button>
							</div>
						</div>
						<!-- /.row -->
					</div>
					<!-- /.card-body -->
				</div>
				<div class="card card-default">
					<div class="card-header" style="background-color:black;">
						<h3 class="card-title" style="color:white;"> Kegiatan (RL)</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<div class="card card-default">
									<div class="card-header">
										<h4 class="card-title">Data Kegiatan yang dipilih</h4>
										<div class="card-tools">
											<button type="button" class="btn btn-tool" data-card-widget="collapse">
												<i class="fas fa-minus"></i>
											</button>
											<button type="button" class="btn btn-tool" data-card-widget="remove">
												<i class="fas fa-times"></i>
											</button>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive-md">
											<table class="table-sm" class="table table-striped table-sm choose" style="border-collapse: inherit;" style="border:solid;">
												<thead>
													<th>
														Act
													</th>
													<th>
														Data Kegiatan yang dipilih
													</th>
												</thead>
												<tbody id="tbodylistlaboratorium">
												</tbody>
											</table>
										</div>
									</div>
								</div>

							</div>
							<div class="col-md-6">
								<div class="card card-default">
									<div class="card-header">
										<h4 class="card-title">Data Kegiatan</h4>
										<div class="card-tools">
											<button type="button" class="btn btn-tool" data-card-widget="collapse">
												<i class="fas fa-minus"></i>
											</button>
											<button type="button" class="btn btn-tool" data-card-widget="remove">
												<i class="fas fa-times"></i>
											</button>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive-md">
											<table class="table-sm" class="table table-striped table-sm choose" style="border-collapse: inherit;" style="border:solid;">
												<thead>
													<th>
														Act
													</th>
													<th>
														Data Kegiatan
													</th>
												</thead>
												<tbody id="tbodylistlaboratorium">
												</tbody>
											</table>
										</div>
									</div>
								</div>

							</div>
							<div class="col-md-12" >

								<div class="row">
									<div class="table-responsive" style="text-align: center;border: solid;">	
										<center><h4>Tanda Tangan Pasien</h4></center>	
										<img id="ImgTtdPasienResumeIrna" style="width:250px;height: 250px;">
										<input type="hidden" name="HasilTtdPasienResumeIrna" id="HasilTtdPasienResumeIrna">
										<center><button class="btn btn-warning" onclick="ShowModalTtdPasienResumeIrna()">Tanda Tangan </button> </center>
									</div>	
								</div>
								<div class="row">
									<div class="table-responsive" style="text-align: center;border: solid;">	
										<center><h4>Tanda Tangan Perawat</h4></center>	
										<img id="ImgTtdPerawatResumeIrna" style="width:250px;height: 250px;">
										<input type="hidden" name="HasilTtdPerawatResumeIrna" id="HasilTtdPerawatResumeIrna">
										<center><button class="btn btn-warning" onclick="ShowModalTtdPerawatResumeIrna()">Tanda Tangan </button> </center>
									</div>	
								</div>
								<div class="row">
									<div class="table-responsive" style="text-align: center;border: solid;">	
										<center><h4>Tanda Tangan DPJP</h4></center>	
										<img id="ImgTtdResumeIrna" style="width:250px;height: 250px;">
										<input type="hidden" name="HasilTtdDpjpResumeIrna" id="HasilTtdDpjpResumeIrna">
										<center><button class="btn btn-warning" onclick="ShowModalTtdDpjpResumeIrna()">Tanda Tangan </button> </center>
									</div>	
								</div>
							</div>
							<div >
							</div>
							<div class="col-md-12"><br><br>
								<button onclick="simpanResumeIrna()" class="btn btn-primary">Simpan Resume</button>
							</div>

						</div>
						<!-- /.row -->
					</div>
					<!-- /.card-body -->
				</div>
			</div>

			<!-- CPPT / SOAPI -->
			<div class="tab-pane p-1 fade" id="cpptermirna" role="tabpanel">
				<div>
					<button class="btn btn-primary" onclick="erekammedisRWJ_show_ermeresepIrna();">Eresep</button>&nbsp;
					<button class="btn btn-primary" onclick="show_modalPermintaanLabIrna()">Permintaan Laboratorium</button>&nbsp;
					<button class="btn btn-primary" onclick="show_ModalPermintaanRadIrna()">Permintaan Radiologi</button>&nbsp;
					<button class="btn btn-primary" onclick="showModalSoapIrna()">Input CPPT</button>
				</div>
				<div id="detailcpptermirna" style="padding-top:10px;">

				</div>
			</div>

			<!-- ASSESSMEN MEDIS -->
			<div class="tab-pane p-1 fade" id="erekammedisRWJ" role="tabpanel">
				<div class="card card-row p-2">
					<div class="overlay-wrapper" id="erekammedisRWJ_loading">
						<div class="overlay dark" style="align-items: baseline; padding-top: 96px;">
							<i class="fas fa-3x fa-sync-alt fa-spin"></i>            
						</div>
					</div>
					<div class="card">
						<div class="col-md-12">
							<div class="row d-flex justify-content-center">
								<h4><b><label class="col-form-label">ASSESMEN DOKTER</label></b></h4>
							</div>
						</div>
					</div>
					<div class="card card-default"><!-- Riwayat Penyakit -->
						<div class="card-header" style="background-color:black;">
							<h3 class="card-title" style="color:white;">ANAMNESIS</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<div class="row">
								<div class="col-md-4 p2">
									<label class="form-label">Keluhan Utama</label>
								</div>
								<div class="col-md-8 p2">
									<textarea class="form-control " id="keluhanutamaermirna"></textarea>
									<!-- /.form-group -->
								</div>
								<!-- /.col -->
								<div class="col-md-4 p2">
									<label class="form-label">Riwayat Penyakit Sekarang *</label>&nbsp;&nbsp;&nbsp;<label><span class="badge bg-primary rounded-pill" onclick="penyakitsekarang()" title="autocomplete">auto</span></label>&nbsp;<label><span class="badge bg-primary rounded-pill" onclick="showmodaltambahpenyakitsekarang()" title="tambah icd">Tambah</span></label>
								</div>
								<div class="col-md-8 p2">
									<textarea class="form-control " id="RiwayatPenyakitNowermirna"></textarea>
									<div id="DivRiwayatPenyakitSekarang"></div>
									<!-- /.form-group -->
								</div>
								<!-- /.col --> 

								<div class="col-md-12 pt-4" style="border: solid;overflow-y: scroll;padding-top: 2px" >
									<label class="form-label">Riwayat Penyakit dahulu</label>&nbsp;&nbsp;&nbsp;<!-- <label><span class="badge bg-primary rounded-pill" onclick="showmodaltambahpenyakitsekarangtreageigd()" title="tambah icd">Tambah</span></label> -->
									<table   class="table table-striped table-sm">
										<thead>
											<tr>
												<th style="width: 15px">#</th>
												<th style="width: 80px">ICD 10</th>
												<th>Penyakit</th>
												<th style="width: 80px">Tanggal</th>
											</tr>
										</thead>
										<tbody id="bodyhistoripenyakitmedirna"></tbody>
									</table>
								</div>

								<div class="col-md-12 pt-4" style="border: solid;overflow-y: scroll;padding-top: 2px" >
									<label class="form-label">Riwayat Penyakit Keluarga</label>&nbsp;&nbsp;&nbsp;<label><span class="badge bg-primary rounded-pill" onclick="showmodaltambahpenyakitkeltreageigd()" title="tambah icd">Tambah</span></label>
									<table   class="table table-striped table-sm">
										<thead>
											<tr>
												<th style="width: 15px">#</th>
												<th style="width: 80px">ICD 10</th>
												<th>Penyakit</th>
												<th style="width: 80px">Tanggal</th>
											</tr>
										</thead>
										<tbody id="bodyhistoripenyakitkelmedirna"></tbody>
									</table>
								</div>

								<div class="col-md-12 pt-4" style="border: solid;overflow-y: scroll;padding-top: 2px;">
									<label class="form-label">Riwayat Pengobatan/Operasi</label>&nbsp;&nbsp;&nbsp;<label><span class="badge bg-primary rounded-pill" onclick="showmodaltambahpenyakitsekarangtreageigd()" title="tambah icd">Tambah</span></label>
									<table   class="table table-striped table-sm">
										<thead>
											<tr>
												<th style="width: 15px">#</th>
												<th>Penyakit</th>
												<th style="width: 80px">ICD 10</th>
												<th style="width: 80px">Tanggal</th>
											</tr>
										</thead>
										<tbody id="bodyhistoriobattrageigd"></tbody>
									</table>
								</div>
								<div class="col-md-12 pt-4" style="border: solid;overflow-y: scroll;padding-top: 2px;">
									<label class="form-label">Alergi</label>&nbsp;&nbsp;&nbsp;<label><span class="badge bg-primary rounded-pill" onclick="showmodaltambahalergiirna()" title="tambah icd">Tambah</span></label>
									<table   class="table table-striped table-sm">
										<thead>
											<tr>
												<th style="width: 15px">#</th>
												<th>Alergi</th>
											</tr>
										</thead>
										<tbody id="bodyhistorialergimedirna"></tbody>
									</table>
								</div>
							</div>
							<!-- /.row -->
						</div>
						<!-- /.card-body -->
					</div>
					<div class="card card-default"><!-- RIWAYAT SPIRITUAL -->
						<div class="card-header" style="background-color:black;">
							<h3 class="card-title" style="color:white;">RIWAYAT BIOPSIKOSOSIAL, KULTURAL, SPIRITUAL & EKONOMI</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<div class="row">
								<table class="table table-striped">
									<thead>
									</thead>
									<tbody>
										<tr>
											<td scope="row">Agama</td>
											<td>
												<select id="checkAgama" name="checkAgama" class="form-control form-control-xs">
												</select>
											</td>
										</tr>
										<tr>

											<td scope="row">Pekerjaan</td>
											<td>
												<select name="pekerjaanermirna" id="pekerjaanermirna" class="form-control form-control-xs" >
												</select>  
											</td>
										</tr>
										<tr>
											<th scope="row">Tinggal Bersama</th>
											<td><input type="radio" checked='true' name="TinggalBersamaermirna" id="TinggalBersamaermirna1" value="1"> Suami/Istri </td>
											<td><input type="radio" id="TinggalBersamaermirna2" name="TinggalBersamaermirna" value="2"> Orang Tua </td>
											<td><input type="radio" id="TinggalBersamaermirna3" name="TinggalBersamaermirna" value="3"> Anak </td>
											<td><input type="radio" id="TinggalBersamaermirna4" name="TinggalBersamaermirna" value="4"> Lain-Lain </td>
											<td><input type="radio" id="TinggalBersamaermirna5" name="TinggalBersamaermirna" value="5"> Tinggal Sendiri </td>
											<td> </td>
										</tr>
										<tr>
											<th scope="row">Status Mental</th>
											<td><input type="radio" checked='true' id="statusmentalermirna1" name="statusmentalermirna" value="1"> Orientasi Baik </td>
											<td><input type="radio" id="statusmentalermirna2" name="statusmentalermirna" value="2"> Agitasi </td>
											<td><input type="radio" id="statusmentalermirna3" name="statusmentalermirna" value="3"> Menyerang </td>
											<td><input type="radio" id="statusmentalermirna4" name="statusmentalermirna" value="4"> Tidak Ada Respon </td>
											<td><input type="radio" id="statusmentalermirna5" name="statusmentalermirna" value="5"> Lain-Lain </td>
											<td></td>
										</tr>
										<tr>
											<th scope="row">Status Psikologis</th>
											<td>
												<input type="radio" id="statusPsikologisermirna1" checked='true' name="statusPsikologisermirna" value="1"> Kooperatif <br>
												<input type="radio" id="statusPsikologisermirna2" name="statusPsikologisermirna" value="2"> Gelisah 
											</td>
											<td>
												<input type="radio" id="statusPsikologisermirna3" name="statusPsikologisermirna" value="3"> Disorientasi<br>
												<input type="radio" id="statusPsikologisermirna4" name="statusPsikologisermirna" value="4"> Depresi 
											</td>
											<td>
												<input type="radio" id="statusPsikologisermirna5" name="statusPsikologisermirna" value="5"> Tenang<br>
												<input type="radio" id="statusPsikologisermirna6" name="statusPsikologisermirna" value="6"> Marah 
											</td>
											<td>
												<input type="radio" id="statusPsikologisermirna7" name="statusPsikologisermirna" value="7"> Hiperaktif<br>
												<input type="radio" id="statusPsikologisermirna8" name="statusPsikologisermirna" value="8"> Lain-Lain 
											</td>
											<td>
												<input type="radio" id="statusPsikologisermirna9" name="statusPsikologisermirna" value="9"> Cemas 
											</td>
											<td>
												<input type="radio" id="statusPsikologisermirna10" name="statusPsikologisermirna" value="10"> Kecenderungan Bunuh Diri 
											</td>
										</tr>
										<tr>
											<th scope="row">Penggunaan Restrain</th>
											<td><input type="radio" checked='true' name="penggunaanRestrainermirna" value="1" id="penggunaanRestrainermirna1"> Tidak 
											</td>
											<td><input id="penggunaanRestrainermirna2" type="radio" name="penggunaanRestrainermirna" value="2"> Ya, Alasan </td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
										</tr>
										<tr>
											<th scope="row">Budaya Yang Dianut</th>
											<td><input type="text" name="Budayaermirna" id="Budayaermirna" class="form-control form-control-xs"></td>
											<td></td>
											<td> </td>
											<td></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="card card-default"><!-- TANDA VITAL -->
						<div class="card-header" style="background-color:black;"><!-- /.card-header -->
							<h3 class="card-title" style="color:white;">TANDA VITAL</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>                  
						<div class="card-body"><!-- /.card-body -->
							<div class="row">
								<div class="col-md-4">
									<table class="table-sm">
										<tr>
											<td>
												<label>Keadaan Umum</label>
											</td>
											<td>
												<input type="text" name="" class="form-control form-control-xs" id="KeadaanUmumAssMedirna">
											</td>
										</tr>
										<tr>
											<td>
												<label>Respirasi</label>
											</td>
											<td>
												<div class="input-group">
													<input type="text" class="form-control form-control-xs" id="respirasiAssMedirna">
													<div class="input-group-prepend">
														<span>x/Menit</span>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<label>Nadi</label>
											</td>
											<td>
												<div class="input-group">
													<input type="text" class="form-control form-control-xs" id="nadiAssMedirna">
													<div class="input-group-prepend">
														<span>x/Menit</span>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<label>SpO2</label>
											</td>
											<td>
												<div class="input-group">
													<input type="text" class="form-control form-control-xs" id="Spo2AssMedirna">
													<div class="input-group-prepend">
														<span>%</span>
													</div>
												</div>
											</td>
										</tr>
									</table>
								</div>
								<div class="col-md-4">
									<table>
										<tr>
											<td><label>Pupil</label></td>
											<td>
												<div class="input-group" >
													<div class="input-group-prepend">
														<span >kiri </span>
													</div>
													<input type="number" class="form-control form-control-xs" id="pupilkiriAssMedirna">
													<div class="input-group-prepend">
														<span >kanan </span>
													</div>
													<input type="number" class="form-control form-control-xs" id="pupilkananAssMedirna">
													<div class="input-group-prepend">
														<span>mm</span>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<label>Tekanan Darah</label>
											</td>
											<td>
												<div class="input-group">
													<input type="number" class="form-control form-control-xs" id="tekananDarahermirna1"><h3>/</h3>
													<input type="number" class="form-control form-control-xs" id="tekananDarahermirna2">
													<div class="input-group-prepend">
														<span>mmHg</span>
													</div>
												</div>
												<div class="input-group">
													<input type="text" placeholder="Diisi jika Palpasi" class="form-control form-control-xs" id="palpasiermirna" >
													<div class="input-group-prepend">
														<span>Per palpasi</span>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<label>Suhu</label>
											</td>
											<td>
												<div class="input-group">
													<input type="text" class="form-control form-control-xs" id="suhuermirna" >
													<div class="input-group-prepend">
														<span >C</span>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<label>Reflek Cahaya</label>
											</td>
											<td>
												<div class="input-group">
													<div class="input-group-prepend">
														<span >kiri</span>
													</div>
													<select class="form-control form-control-xs" id="reflekCahayaKiriermirna" >
														<option value="1">-</option>
														<option value="2">+</option>
													</select>
													<div class="input-group-prepend">
														<span >kanan</span>
													</div>
													<select class="form-control form-control-xs" id="reflekCahayaKananermirna">
														<option value="1">-</option>
														<option value="2">+</option>
													</select>
												</div>
											</td>
										</tr>
									</table>
								</div>
								<div class="col-md-4">
									<table class="table-sm">
										<tr>
											<td colspan="2">
												<h6>Note (*) Nominal ribuan = gram, satuan / puluhan / ratusan = kg</h6>
											</td>
										</tr>
										<tr>
											<td>
												<label>Berat Badan</label>
											</td>
											<td>
												<div class="input-group">
													<input type="number" id="bbermirna" class="form-control form-control-xs">
													<div class="input-group-prepend">
														<span>Kg / Gram</span>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<label>Tinggi Badan</label>
											</td>
											<td>
												<div class="input-group">
													<input type="number" class="form-control form-control-xs" id="tinggiermirna" onclick="hitungimtmedisirna()">
													<div class="input-group-prepend">
														<span>cm</span>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<label>IMT</label>
											</td>
											<td>
												<div class="input-group">
													<input type="number" class="form-control form-control-xs" id="imtermirna" readonly>
													<div class="input-group-prepend">
														<span>kg/m2</span>
													</div>
												</div>
											</td>
										</tr>
									</table>
								</div>
							</div>
							<div class="row "><br>
								<div class="col-md-12">
									<table class="table table-bordered table-sm">
										<thead>
										</thead>
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
												<td onclick="dacrjasesmenmedisirna_setScore(4, 1)">
													Spontan
												</td>
												<td>
													4
												</td>
												<td rowspan="4">
													<input type="text" name="eyeOpenassmedErmIrna" id="eyeOpenassmedErmIrna" class="form-control" value="4">
												</td>
											</tr>
											<tr >
												<td onclick="dacrjasesmenmedisirna_setScore(3, 1)">
													Terhadap Suara
												</td>
												<td>
													3
												</td>
											</tr>
											<tr>
												<td onclick="dacrjasesmenmedisirna_setScore(2, 1)">
													Terhadap Nyeri
												</td>
												<td>
													2
												</td>
											</tr>
											<tr>
												<td onclick="dacrjasesmenmedisirna_setScore(1, 1)">
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
												<td onclick="dacrjasesmenmedisirna_setScore(6, 2)">
													Turut Perintah
												</td>
												<td>
													6
												</td>
												<td rowspan="6">
													<input type="text" name="ResponMotorikassmedErmIrna" id="ResponMotorikassmedErmIrna" class="form-control" value="6">
												</td>
											</tr>
											<tr>
												<td onclick="dacrjasesmenmedisirna_setScore(5, 2)">
													Melokalisir Nyeri
												</td>
												<td>
													5
												</td>
											</tr>
											<tr>
												<td onclick="dacrjasesmenmedisirna_setScore(4, 2)">
													Fleksi Normal (Menarik anggota gerak yang dirangsang)
												</td>
												<td>
													4
												</td>
											</tr>
											<tr>
												<td onclick="dacrjasesmenmedisirna_setScore(3, 2)">
													Fleksi Abnormal (dekortikasi)
												</td>
												<td>
													3
												</td>
											</tr>
											<tr>
												<td onclick="dacrjasesmenmedisirna_setScore(2, 2)">
													Ekstensi Abnormal (deserebrasi)
												</td>
												<td>
													2
												</td>
											</tr>
											<tr>
												<td onclick="dacrjasesmenmedisirna_setScore(1, 2)">
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
												<td onclick="dacrjasesmenmedisirna_setScore(5, 3)">
													Berorientasi Baik
												</td>
												<td>
													5
												</td>
												<td rowspan="5">
													<input type="text" name="responVerbalassmedErmIrna" id="responVerbalassmedErmIrna" class="form-control" value="5">
												</td>
											</tr>
											<tr>
												<td onclick="dacrjasesmenmedisirna_setScore(4, 3)">
													Berbicara mengacau (bingung)

												</td>
												<td>
													4
												</td>
											</tr>
											<tr>
												<td onclick="dacrjasesmenmedisirna_setScore(3, 3)">
													Kata-Kata tidak teratur
												</td>
												<td>
													3
												</td>
											</tr>
											<tr>
												<td onclick="dacrjasesmenmedisirna_setScore(2, 3)">
													Suara Tidak Jelas
												</td>
												<td>
													2
												</td>
											</tr>
											<tr>
												<td onclick="dacrjasesmenmedisirna_setScore(1, 3)">
													Tidak Ada
												</td>
												<td>
													1
												</td>
											</tr>
											<tr>
												<td colspan="3">
													<select class="form-control" id="tipekesadaranassmedermirna">
														<option value="1">Compos mentis</option>
														<option value="2">Apatis</option>
														<option value="3">Somnolen</option>
														<option value="4">Delirium</option>
														<option value="5">Sopor</option>
														<option value="6">Coma</option>
													</select>
												</td>
												<td>
													<input type="text" class="form-control" name="skorassesmenmedisErmIrna" id="skorassesmenmedisErmIrna" value="15">
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>                  
					</div>
					<div class="card card-default"><!-- PEMERIKSAAN FISIK -->
						<div class="card-header " style="background-color:black;">
							<h3 class="card-title" style="color:white;">PEMERIKSAAN FISIK UMUM</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div><!-- /.card-header -->                
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<table class="table table-bordered table-sm">
										<thead></thead>
										<tbody>
											<tr>
												<td>
													Kepala
												</td>
												<td>
													<input type="radio" id="fisikKepalaermirna1" name="fisikKepalaermirna" onclick="document.getElementById('fisikKepalaermirnaKet').style.display='block'" value="2">Tidak Normal<br>
													<input type="text"  class="form-control form-control-xs" name="fisikKepalaermirnaKet" id="fisikKepalaermirnaKet" style="display:none;">
													<input type="radio" id="fisikKepalaermirna2" name="fisikKepalaermirna" onclick="document.getElementById('fisikKepalaermirnaKet').style.display='none'"  checked="true" value="1">Normal
												</td>
												<td>
													Jantung
												</td>
												<td>
													<input type="radio" id="fisikJantungermirna1" name="fisikJantungermirna" onclick="document.getElementById('fisikJantungermirnaKet').style.display='block'" value="2">Tidak Normal<br>
													<input type="text"  class="form-control form-control-xs" name="fisikJantungermirnaKet" id="fisikJantungermirnaKet" style="display:none;">
													<input type="radio" id="fisikJantungermirna2" name="fisikJantungermirna" onclick="document.getElementById('fisikJantungermirnaKet').style.display='none'" checked='true' value="1">Normal
												</td>
											</tr>
											<tr>
												<td>
													Mata
												</td>
												<td>
													<input type="radio" id="fisikMataermirna1" name="fisikMataermirna" onclick="document.getElementById('fisikMataermirnaKet').style.display='block'" value="2">Tidak Normal<br>
													<input type="text"  class="form-control form-control-xs" name="fisikMataermirnaKet" id="fisikMataermirnaKet" style="display:none;">
													<input type="radio" id="fisikMataermirna2" name="fisikMataermirna" onclick="document.getElementById('fisikMataermirnaKet').style.display='none'" value="1" checked='true'>Normal
												</td>
												<td>
													Paru
												</td>
												<td>
													<input type="radio" id="fisikParuermirna1" name="fisikParuermirna" onclick="document.getElementById('fisikParuermirnaKet').style.display='block'" value="2">Tidak Normal<br>
													<input type="text"  class="form-control form-control-xs" name="fisikParuermirnaKet" id="fisikParuermirnaKet" style="display:none;"> 
													<input type="radio" id="fisikParuermirna2" name="fisikParuermirna" onclick="document.getElementById('fisikParuermirnaKet').style.display='none'" value="1" checked='true'>Normal
												</td>
											</tr>
											<tr>
												<td>
													THT
												</td>
												<td>
													<input type="radio" id="fisikThtermirna1" name="fisikThtermirna" onclick="document.getElementById('fisikThtermirnaKet').style.display='block'" value="2">Tidak Normal<br>
													<input type="text" class="form-control form-control-xs" name="fisikThtermirnaKet" id="fisikThtermirnaKet" style="display:none;">
													<input type="radio"  id="fisikThtermirna2" name="fisikThtermirna" onclick="document.getElementById('fisikThtermirnaKet').style.display='none'" value="1" checked='true'>Normal
												</td>
												<td>
													Ambomen
												</td>
												<td>
													<input type="radio" id="fisikAbdomenermirna1" name="fisikAbdomenermirna" onclick="document.getElementById('fisikAbdomenermirnaKet').style.display='block'" value="2">Tidak Normal<br>
													<input type="text"  class="form-control form-control-xs" name="fisikAbdomenermirnaKet" id="fisikAbdomenermirnaKet" style="display:none;">
													<input type="radio" id="fisikAbdomenermirna2" name="fisikAbdomenermirna" onclick="document.getElementById('fisikAbdomenermirnaKet').style.display='none'" value="1" checked='true'>Normal
												</td>
											</tr>
											<tr>
												<td>
													Leher
												</td>
												<td>
													<input type="radio" id="fisikLeherermirna1" name="fisikLeherermirna" onclick="document.getElementById('fisikLeherermirnaKet').style.display='block'" value="2">Tidak Normal<br>
													<input type="text"  class="form-control form-control-xs" name="fisikLeherermirnaKet" id="fisikLeherermirnaKet" style="display:none;">
													<input type="radio" id="fisikLeherermirna2" name="fisikLeherermirna" onclick="document.getElementById('fisikLeherermirnaKet').style.display='none'" value="1" checked='true'>Normal
												</td>
												<td>
													Genitalia
												</td>
												<td>
													<input type="radio" id="fisikGenitaliaermirna1" name="fisikGenitaliaermirna" onclick="document.getElementById('fisikGenitaliaermirnaKet').style.display='block'" value="2" >Tidak Normal<br>
													<input type="text" class="form-control form-control-xs" name="fisikGenitaliaermirnaKet" id="fisikGenitaliaermirnaKet" style="display:none;">
													<input type="radio" id="fisikGenitaliaermirna2" name="fisikGenitaliaermirna" onclick="document.getElementById('fisikGenitaliaermirnaKet').style.display='none'" value="1" checked='true'>Normal
												</td>
											</tr>
											<tr>
												<td>
													Mulut
												</td>
												<td>
													<input type="radio" id="fisikMulutermirna1" name="fisikMulutermirna" onclick="document.getElementById('fisikMulutermirnaKet').style.display='block'" value="2">Tidak Normal<br>
													<input type="text" class="form-control form-control-xs" name="fisikMulutermirnaKet" id="fisikMulutermirnaKet" style="display:none;">
													<input type="radio" id="fisikMulutermirna2" name="fisikMulutermirna" onclick="document.getElementById('fisikMulutermirnaKet').style.display='none'" value="1" checked='true'>Normal
												</td>
												<td>
													Status Localis
												</td>
												<td>
													<textarea class="form-control" id="fisikStatusLocalisermirna"></textarea>
												</td>
											</tr>
											<tr>
												<td>
													Thorax
												</td>
												<td colspan="3">
													<input type="radio" id="fisikThoraxermirna1" name="fisikThoraxermirna" onclick="document.getElementById('fisikThoraxermirnaKet').style.display='block'" value="2">Tidak Normal<br>
													<input type="text" class="form-control form-control-xs"  name="fisikThoraxermirnaKet" id="fisikThoraxermirnaKet" style="display:none;"><br>
													<input type="radio" id="fisikThoraxermirna2" name="fisikThoraxermirna" onclick="document.getElementById('fisikThoraxermirnaKet').style.display='none'" value="1" checked='true'>Normal
												</td>
											</tr>
										</tbody>
									</table>                        
								</div><!-- /.col -->                      
							</div><!-- /.row -->                    
						</div><!-- /.card-body -->                  
					</div>
					<div class="card card-default"><!-- PEMERIKSAAN PENUNJANG -->
						<div class="card-header" style="background-color:black;">
							<h3 class="card-title" style="color:white;">PEMERIKSAAN PENUNJANG</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<div class="row p-2">
								<div class="col-md-6">
									<div class="card card-default">
										<div class="card-header">
											<h4 class="card-title">Permintaan Laboratorium</h4>
											<div class="card-tools">
												<button type="button" class="btn btn-tool" data-card-widget="collapse">
													<i class="fas fa-minus"></i>
												</button>
												<button type="button" class="btn btn-tool" data-card-widget="remove">
													<i class="fas fa-times"></i>
												</button>
											</div>
										</div>
										<div class="card-body">
											<div class="table-responsive-md">
												<table class="table-sm" class="table table-striped table-sm choose" style="border-collapse: inherit;" style="border:solid;">
													<thead>
														<th>
															NO
														</th>
														<th>
															Jenis Pemeriksaan
														</th>
													</thead>
													<tbody id="tbodylistlaboratorium">
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<button type="button" class="btn btn-default d-none" onclick="show_modalPermintaanLabIrja()">Tambah Permintaan Lab</button><br>
									<label class="form-label">> EKG </label>
									<textarea class="form-control "></textarea>
								</div>
								<div class="col-md-6">
									<div class="card card-default">
										<div class="card-header">
											<h4 class="card-title">Permintaan Laboratorium</h4>
											<div class="card-tools">
												<button type="button" class="btn btn-tool" data-card-widget="collapse">
													<i class="fas fa-minus"></i>
												</button>
												<button type="button" class="btn btn-tool" data-card-widget="remove">
													<i class="fas fa-times"></i>
												</button>
											</div>
										</div>
										<div class="card-body">
											<div class="table-responsive-md">
												<table class="table-sm">
													<thead>
														<th>
															ACT
														</th>
														<th>
															Id
														</th>
														<th>
															Validasi
														</th>
														<th>
															Tanggal
														</th>
														<th>
															Dokter Pengirim
														</th>
														<th>
															Dokter PJ
														</th>
													</thead>
													<tbody>
														<td>
														</td>
														<td>
														</td>
														<td>
														</td>
														<td>
														</td>
														<td>
														</td>
														<td>
														</td>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<button type="button" class="btn btn-default d-none" onclick="show_modalPermintaancheckboxlogiIrja()">Tambah checkboxlogi</button><br>
									<label class="form-label">> Lain-lain</label>
									<textarea class="form-control"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="card card-default"><!-- ASSESMEN -->
						<div class="card-header" style="background-color:black;">
							<h3 class="card-title" style="color:white;">ASSESMEN *</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<div class="row">  
								<div class="col-md-12">                      
									Diagnosa Medis
									<textarea class="form-control" id="Assesmenermirna"></textarea>
									<div id="divAssesmenermirna"></div>
								</div>   
								<div class="col-md-12" >                
									Diagnosa Fungsi
									<textarea class="form-control" id="dacrjrehabmedis_fdiagnosafungsi"></textarea>
								</div>                 
							</div>
						</div>
					</div>
					<div class="card card-default"><!-- STATUS LOCALIS -->
						<div class="card-header" style="background-color:black;">
							<h3 class="card-title" style="color:white;">STATUS LOCALIS *</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<div class="card-body" id="paint_assesmen_medis">

						</div>
					</div>
					<div class="card card-default"><!-- PLANNING -->
						<div class="card-header" style="background-color:black;">
							<h3 class="card-title" style="color:white;">PLANNING</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<textarea class="form-control" id="planningermirna"></textarea>
						</div>              
					</div>
					<div class="card card-default"><!-- TINDAKAN -->
						<div class="card-header" style="background-color:black;">
							<h3 class="card-title" style="color:white;">TINDAKAN</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<textarea class="form-control" id="tindakanermirna"></textarea>
						</div>
					</div>
					<div class="card card-default"><!-- Pasien Kompleks -->
						<div class="card-body">
							<label class="form-label"> Pasien Kompleks </label>
							<center>
								Ya<input type="radio" class="form-group" id="pasienKompleksermirna1" name="pasienKompleksermirna" value="2">&nbsp;Tidak<input id="pasienKompleksermirna2" type="radio" class="form-group" name="pasienKompleksermirna" value="1" checked='true'>
							</center>
						</div>
					</div>
					<div class="card"><!-- TTD Dokter -->
						<!-- <div class="col-sm-4" style="text-align: center;">
							<label>Dokter Penganggung Jawab Pasien</label><br>
							<div class="card" style="border-collapse: !important;" id="paint_ttdassesmenmedisirna"></div>
							<label>Nama & Tanda tangan</label> 
						</div> -->

						<div class="card-body">
							<div class="row">
								<div class="col-md-4" align="center">
									<label>Dokter Penanggung Jawab Pasien</label>
									<div style="text-align: center;">
										<img style="width:200px;height:200px;border: 2px dashed;background-color: #535b62d1;" id="Gambarpaint_ttdassesmenmedisirna">
										<input type="text" class="form-control form-control-sm text-center d-none" id="Hasilpaint_ttdassesmenmedisirna" disabled>
									</div>
									<button  class="btn btn-warning btn-sm" onclick="ShowModalttdassesmenmedisirna();">Klik Tanda Tangan</button><br>
									<label>Nama &amp; Tanda tangan</label>
								</div>
							</div>
						</div>

						<div class="card-footer">
							<button type="button" class="btn btn-primary btn-sm " type="submit" onclick="simpanAssesmenMedisIrna();"> <i class="fas fa-save"></i> Simpan Assesmen</button>
						</div>
					</div>
				</div>
			</div>

			<!-- PASIEN PULANG NEW -->
			<div class="tab-pane p-1 fade" id="rencanapemulanganpasien" role="tabpanel">
				<div class="card card-row p-2">
					<div class="overlay-wrapper" id="loading_RencanaPemulanganPasien">
						<div class="overlay dark">
							<i class="fas fa-3x fa-sync-alt fa-spin"></i>            
						</div>
					</div>
					<div class="viewRencanaPemulanganPasien"></div>
				</div>
			</div>
			<!-- PEMBERIAN INFUS -->
			<div class="tab-pane p-1 fade" id="daftarpemberianinfus" role="tabpanel">
				<div class="card card-row p-2">
					<div class="overlay-wrapper" id="loading_DaftarPemberianInfus">
						<div class="overlay dark">
							<i class="fas fa-3x fa-sync-alt fa-spin"></i>            
						</div>
					</div>
					<div class="viewPemberianInfusIrna"></div>
				</div>
			</div>

		</div>
	</div>
</div>
<div class="modal fade"  id="ModalInputGrowhtChart" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4>Catatan Perkembangan Pasien Terintegrasi
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group row">
								<div class="col-sm-3">
									<label>Berat Badan</label>  
								</div>
								<div class="col-sm-auto">
									<label>:</label>  
								</div>
								<div class="col-sm-4">  
									<input type="text" class="form-control form-control-xs" name="cpptbbermirna" id="cpptbbermirna" >
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group row">
								<div class="col-sm-3">
									<label>Tinggi Badan</label>  
								</div>
								<div class="col-sm-auto">
									<label>:</label>  
								</div>
								<div class="col-sm-4">  
									<input type="text" class="form-control form-control-xs" name="cppttbermirna" id="cppttbermirna" >
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group row">
								<div class="col-sm-3">
									<label>Lingkar Kepala</label>  
								</div>
								<div class="col-sm-auto">
									<label>:</label>  
								</div>
								<div class="col-sm-4">  
									<input type="text" class="form-control form-control-xs" name="cpptlkermirna" id="cpptlkermirna" >
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group row">
								<div class="col-sm-3">
									<label>Lingkar Lengan</label>  
								</div>
								<div class="col-sm-auto">
									<label>:</label>  
								</div>
								<div class="col-sm-4">  
									<input type="text" class="form-control form-control-xs" name="cpptllermirna" id="cpptllermirna" >
								</div>
							</div>
						</div>

					</div>


				</div>
				<div class="modal-footer">
					<button id="btnsaveGrowhtChart" onclick="saveGrowhtChart();" class="btn btn-primary sm" style="padding-top:10px;">Simpan Growth Chart</button> <button id="btnupdateGrowhtChart" onclick="saveUpdateGrowhtChart();" style="display:none;" class="btn btn-primary sm" style="padding-top:10px;">Update Growth Chart</button>			<button onclick="$('#ModalInputGrowhtChart').modal('hide');" class="btn btn-primary sm" style="padding-top:10px;">Close</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade"  id="ModalInputSoapErmIrna" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4>Catatan Perkembangan Pasien Terintegrasi
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group row">
									<div class="col-sm-3">
										<label>Tekanan Darah</label>  
									</div>
									<div class="col-sm-auto">
										<label>:</label>  
									</div>
									<div class="col-sm-2">  
										<input type="hidden" name="idsoapirna" id="idsoapirna">
										<input type="text" class="form-control form-control-xs" name="cppttekanandarahermirna" id="cppttekanandarahermirna" >
									</div>
									<div class="col-sm-2">  
										<input type="text" class="form-control form-control-xs" name="cppttekanandarah2ermirna" id="cppttekanandarah2ermirna" >
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-3">
										<label>Suhu</label>
									</div>
									<div class="col-sm-auto">
										<label>:</label>  
									</div>
									<div class="col-md-4">
										<input type="text" class="form-control form-control-xs" name="cpptsuhuermirna" id="cpptsuhuermirna">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group row">
									<div class="col-sm-3">
										<label>Nadi</label>  
									</div>
									<div class="col-sm-auto">
										<label>:</label>  
									</div>
									<div class="col-sm-4">  
										<input type="text" class="form-control form-control-xs" name="cpptnadiermirna" id="cpptnadiermirna" >
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-3">
										<label>RR</label>
									</div>
									<div class="col-sm-auto">
										<label>:</label>  
									</div>
									<div class="col-md-4">
										<input type="text" class="form-control form-control-xs" name="cpptsaturasiermirna" id="cpptsaturasiermirna">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group row">
									<div class="col-sm-3">
										<label>SpO2</label>  
									</div>
									<div class="col-sm-auto">
										<label>:</label>  
									</div>
									<div class="col-sm-4">  
										<input type="text" class="form-control form-control-xs" name="cpptSpo2ermirna" id="cpptSpo2ermirna" >
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group row">
									<div class="col-sm-3">
										<label>GCS</label>  
									</div>
									<div class="col-sm-auto">
										<label>:</label>  
									</div>
									<div class="col-sm-4">  
										<input type="text" class="form-control form-control-xs" name="gcsermirna" id="gcsermirna" >
									</div>
								</div>
							</div>
						</div>
						<table width="100%" cellspacing="0" cellpadding="0">
							<tr style="border:2px solid black; margin: 5px;">
								<td>
									<div class="row p-1">
										<div class="col-sm-4" >
											<h4>SUBJEK</h4>
										</div>
										<div class="col-sm-8">
											<button type="button" class="btn bg-gradient-secondary btn-xs" type="submit" onclick="show_cri_subjek_irna()"> <i class="fa fa-plus-square"></i>Tambah</button>&nbsp;<button type="button" class="btn bg-gradient-secondary btn-xs" type="button" onclick="document.getElementById('subjekermirna').value='' "> <i class="fa fa-times"></i> Clear</button>
											<textarea class="form-control" id="subjekermirna" style="height:50px; width: 100%;" ></textarea>
										</div>
									</div>
								</td>                    
							</tr>
							<tr style="border:2px solid black; margin: 5px;">
								<td>
									<div class="row p-1">
										<div class="col-sm-4" >
											<h4>OBJEK</h4>
										</div>
										<div class="col-sm-8">
											<button type="button" class="btn bg-gradient-secondary btn-xs" type="button" onclick="document.getElementById('objekermirna').value='' "> <i class="fa fa-times"></i> Clear</button>
											<textarea class="form-control" id="objekermirna" style="height:50px; width: 100%;" ></textarea>
										</div>
									</div>
								</td>
							</tr>
							<tr style="border:2px solid black; margin: 5px;">
								<td>
									<div class="row p-1">
										<div class="col-sm-4" >
											<h4>ASESMEN (diagnosa)</h4>
										</div>
										<div class="col-sm-8">
											<button type="button" class="btn bg-gradient-secondary btn-xs" type="button" onclick="TambahdiagnosaCpptermirna()"> <i class="fa fa-plus-square"></i> Tambah</button>&nbsp;<button type="button" class="btn bg-gradient-secondary btn-xs" type="button" onclick="document.getElementById('assesmenirja').value='' "> <i class="fa fa-times"></i> Clear</button>
											<textarea class="form-control" id="caridiagnosacpptmedisirna" style="height:50px; width: 100%;" ></textarea>
											<div id="divcaridiagnosacpptmedisirna"></div>
										</div>
									</div>
								</td>
							</tr>
							<tr style="border:2px solid black; margin: 5px;">
								<td>
									<div class="row p-1">
										<div class="col-sm-4" >
											<h4>PLANNING</h4>
										</div>
										<div class="col-sm-8">
											<button type="button" class="btn bg-gradient-secondary btn-xs" type="submit" onclick="show_intervensiirna()">  Intervensi</button>
											<button type="button" class="btn bg-gradient-secondary btn-xs" type="submit" onclick="show_daftarintervensi()">  Daftar Intervensi</button>&nbsp;<button type="button" class="btn bg-gradient-secondary btn-xs" type="button" onclick="document.getElementById('intervensiermirna').value='' "> <i class="fa fa-times"></i> Clear</button>
											<textarea class="form-control" style="height:50px; width: 100%;" id="intervensiermirna"></textarea>
										</div>
									</div>
								</td> 
							</tr>
							<tr style="border:2px solid black; margin: 5px;">
								<td>
									<div class="row p-1">
										<div class="col-sm-4" >
											<h4>INSTRUKSI</h4>
										</div>
										<div class="col-sm-8">
											<button type="button" class="btn bg-gradient-secondary btn-xs" type="button" onclick="document.getElementById('instruksiermirna').value='' "> <i class="fa fa-times"></i> Clear</button>
											<textarea class="form-control" style="height:50px; width: 100%;" id="instruksiermirna"></textarea>
										</div>
									</div>
								</td> 
							</tr>
							<tr style="border:2px solid black; margin: 5px;">
								<td>
									<div class="row p-1">
										<div class="col-sm-4" >
											<h4>TINDAKAN</h4>
										</div>
										<div class="col-sm-8">
											<button type="button" class="btn bg-gradient-secondary btn-xs" type="button" onclick="document.getElementById('cppttindakanermirna').value='' "> <i class="fa fa-times"></i> Clear</button>
											<textarea class="form-control" style="height:50px; width: 100%;" id="cppttindakanermirna"></textarea>
										</div>
									</div>
								</td> 
							</tr>
						</table>

					</div>
					<div class="modal-footer">
						<button id="btnsavesoapirna" onclick="saveSoapirna();" class="btn btn-primary sm" style="padding-top:10px;">Simpan SOAP I</button> <button id="btnupdatesoapirna" onclick="saveUpdateSoapirna();" style="display:none;" class="btn btn-primary sm" style="padding-top:10px;">Update SOAP I</button>			<button onclick="$('#ModalInputSoapErmIrna').modal('hide');" class="btn btn-primary sm" style="padding-top:10px;">Close</button>
					</div>
				</div>
			</div>
		</div>
		<!-- modal permintaan lab -->
		<div class="modal fade" id="ModalPermintaanLabIrna">
			<div class="modal-dialog modal-xl">
				<div class="modal-content">
					<div class="modal-header p-2">
						<h5>Permintaan Laboratorium</h5>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Tanggal Laboratorium</label>
							<input type="date" name="tglOrderLab" value="<?php echo date('Y-m-d');?>" id="tglOrderLab" class="form-control form-control-xs">
						</div>	
						<div class="form-group">
							<label>Cari Jenis Laboratorium</label>
							<input type="input" name="cariorderlabermirna" id="cariorderlabermirna" class="form-control form-control-xs">
						</div>

						<div class="row" style="overflow-y: scroll;">
							<div class="col-md-6 p-1">
								<div class="card">
									<div class="card-header p-2">
										<label>Pilih Produk Laboratorium</label>
									</div>
									<div class="card-body p-1" style="height: 400px;  overflow-y: scroll;">
										<div class="row">
											<div class="col-md-12 p-1">
												<div id="lacrequestlabemrdiag_grouptestirna" class="row"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6 p-1">
								<div class="card">
									<div class="card-header p-2">
										<label>Request Produk Laboratorium</label>
									</div>
									<div class="card-body p-1" style="height: 400px;  overflow-y: scroll;">
										<div class="row">
											<div class="col-md-12 p-1">
												<div id="lacrequestlabemrdiag_grouptest_requestirna" class="row"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary btn-sm" id="buttonOrderLab" onclick="inputpermohonanlaboratoriumirna()"><i class="fa fa-save"></i> Simpan Order</button>&nbsp;
						<button class="btn btn-outline-danger btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
					</div>
				</div>
			</div>
		</div>
		<!-- end modal permintaan lab -->

		<!-- modal permintaan Radiologi -->
		<div class="modal fade" id="ModalPermintaanRadIrna">
			<div class="modal-dialog modal-xl">
				<div class="modal-content">
					<div class="modal-header p-2"><h5>Permintaan Radiologi</h5></div>
					<div class="modal-body">
						<div class="form-group">
							<label>Tanggal Radiologi</label>
							<input type="date" name="tglOrderRad" id="tglOrderRad" class="form-control form-control-xs" value="<?php echo date('Y-m-d');?>" >
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="card">
									<div class="card-header p-2">
										<label class="col-form-label font-weight-bold">X-RAY</label>
									</div>
									<div class="card-body p-1" style="height: 250px;  overflow-y: scroll;">
										<div class="row">
											<div class="col-md-12">
												<div class="row" id="paccheckboxlogireqemrdiag_grouptestirna">

												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card">
									<div class="card-header p-2">
										<label class="col-form-label font-weight-bold">ULTRASONOGRAFI (USG)</label>
									</div>
									<div class="card-body p-1" style="height: 250px;  overflow-y: scroll;">
										<div class="row">
											<div class="col-md-12">
												<div class="row" id="paccheckboxlogireqemrdiag_grouptestirna_2">

												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card">
									<div class="card-header p-2">
										<label class="col-form-label font-weight-bold">CT SCAN</label>
									</div>
									<div class="card-body p-1" style="height: 250px;  overflow-y: scroll;">
										<div class="row">
											<div class="col-md-12">
												<div class="row" id="paccheckboxlogireqemrdiag_grouptestirna_11"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary btn-sm" id="buttonOrderRad" onclick="inputpermohonanRadiologiirna()"><i class="fa fa-save"></i> Simpan Order </button>&nbsp;
						<button class="btn btn-outline-danger btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end modal permintaan checkboxlogi -->
	<!-- alergi -->
	<div class="modal fade"  id="ModalTambahalergiirna" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header"></div>
				<div class="modal-body">
					<input class="form-control form-control-xs" type="text" name="" id="Modalinputalergiirna" class="form-control">
				</div>
				<div class="modal-footer">
					<button onclick="savetambahalergiSekarangirna()">Simpan</button>
					<button onclick="$('#ModalTambahalergiirna').modal('hide')">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- icd 10 update 21/12/2023 -->
	<div class="modal " id="ModalShowaddmrpenyakitmedermirna">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="form-group">
					<h3>Status Diagnosa</h3>
					<select class="form-control form-control-xs" id="statusdiagnosairna">
						<option value=0>Awal</option>
						<option value=1>Utama</option>
						<option value=2>Sekunder</option>
						<option value=3>Komplikasi</option>
					</select>
				</div>
				<div class="form-group">
					<h3>Tambah Diagnosa ICD 10</h3>
					<input class="form-control form-control-xs" id="textTambahdiagnosaresumemedErmirja">
					<div id="DivTambahdiagnosaresumemedErmirja"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- icd 9 -->
	<div class="modal fade" id="ModalShowaddicd9medermirja">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					Tambah Tindakan icd 9
				</div>
				<div class="modal-body">
					<input type="hidden" name="kunjunganaddicd9irja" id="kunjunganaddicd9irja">
					<input type="hidden" name="unitaddicd9irja" id="unitaddicd9irja">
					<input class="form-control form-control-xs" id="textTambahicd9resumemedErmirja">
					<div id="DivTambahicd9resumemedErmirja"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- end modal update 21/12/2023 -->
	<!-- modal general consent -->
	<div class="modal fade" id="dacconsent_diag" >
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title font-weight-bold">PERSETUJUAN UMUM / GENERAL CONSENT RAWAT INAP</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">x</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row ">
						<div class="col-md-12">
							<div class="card rapet">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-12">
											<label class="col-form-label font-weight-bold">
												&nbsp;&nbsp;A. PERSETUJUAN UNTUK PERAWATAN DAN PENGOBATAN
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-0"><label class="col-form-label">  </label></div>
										<div class="col-md-0"><label class="col-form-label">1.&nbsp;</label></div>
										<div class="col-md-11">
											<label class="col-form-label">
												Saya menyetujui untuk perawatan di Rumah Sakit  sebagai pasien rawat inap.
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-0"><label class="col-form-label">  </label></div>
										<div class="col-md-0"><label class="col-form-label">2.&nbsp;</label></div>
										<div class="col-md-11">
											<label class="col-form-label">
												Saya mengetahui bahwa pasien/saya memiliki kondisi yang membutuhkan perawatan medis, 
												pasien/saya mengizinkan dokter dan profesional tenaga kesehatan lainnya untuk melakukan prosedur diagnostik dan untuk 
												memberikan pengobatan medis seperti yang dilakukan dalam profesional mereka. Prosedur diagnostik dan perawatan medis 
												termasuk terapi tidak terbatas pada EKG, X-RAY, tes darah, terapi fisik, pemberian obat suntik dan cairan infus.
												Persetujuan yang saya berikan tidak termasuk persetujuan untuk prosedur/ tindakan invasive (misalnya, operasi) 
												atau tindakan yang mempunyai resiko tinggi.
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-0"><label class="col-form-label">  </label></div>
										<div class="col-md-0"><label class="col-form-label">3.&nbsp;</label></div>
										<div class="col-md-11">
											<label class="col-form-label">
												Saya sadar bahwa praktek kedokteran dan bedah bukan ilmu pasti dan saya mengakui tidak 
												ada jaminan atas hasil apapun terhadap perawatan prosedur atau pemeriksaan apapun yang dilakukan kepada pasien/saya.
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-0"><label class="col-form-label">  </label></div>
										<div class="col-md-0"><label class="col-form-label">4.&nbsp;</label></div>
										<div class="col-md-11">
											<label class="col-form-label">
												Saya mengerti dan memahami bahwa :
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-0"><label class="col-form-label">   &nbsp;&nbsp;</label></div>
										<div class="col-md-0"><label class="col-form-label">a.&nbsp;</label></div>
										<div class="col-md-11">
											<label class="col-form-label">
												Saya memiliki hak untuk mengajukan pertanyaan tentang pengobatan yang diusulkan 
												( termasuk identitas setiap orang yang memberikan atau mengamati pengobatan ) setiap saat.
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-0"><label class="col-form-label">   &nbsp;&nbsp;</label></div>
										<div class="col-md-0"><label class="col-form-label">b.&nbsp;</label></div>
										<div class="col-md-11">
											<label class="col-form-label">
												Saya mengerti dan memahami bahwa saya memiliki hak untuk persetujuan atau menolak persetujuan untuk 
												setiap prosedur / tindakan invasif (misalnya operasi) atau tindakan yang mempunyai resiko tinggi
												Jika saya memutuskan untuk menghentikan perawatan medis untuk diri saya sendiri. Saya memahami dan 
												menyadari bahwa Rumah Sakit  atau dokter <br>tidak bertanggungjawab atas hasil yang merugikan saya.
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<label class="col-form-label font-weight-bold">
												&nbsp;&nbsp;B. HASIL YANG TIDAK DIHARAPKAN
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-0"><label class="col-form-label">  </label></div>
										<div class="col-md-11">
											<label class="col-form-label">
												Saya sadar bahwa praktek kedokteran dan bedah bukanlah ilmu pasti dan saya mengakui bahwa tidak ada jaminan atas hasil 
												apapun terhadap perawatan, prosedur atau pemeriksaan apapun yang dilakukan kepada saya.
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<label class="col-form-label font-weight-bold">
												&nbsp;&nbsp;C. PERSETUJUAN PELEPASAN INFORMASI
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-0"><label class="col-form-label">  </label></div>
										<div class="col-md-11">
											<label class="col-form-label">
												Saya memahami informasi yang ada didalam diri saya, termasuk diagnosis, hasil laboratorium dan hasil tes diagnostik yang 
												akan digunakan untuk perawatan medis, Rumah Sakit  akan menjamin kerahasiaannya. 
												<br>Saya memberi wewenang kepada RS untuk memberikan informasi tentang tentang diagnosis, hasil pelayanan dan pengobatan bila 
												diperlukan untuk memproses klaim asuransi / perusahaan dan atau lembaga pemerintah.Sesuai kewajiban simpan rahasia kedokteran 
												dan mengacu pada peraturan menteri kesehatan refublik indonesia no. 36/MENKES/III/2008, Saya memberi wewenang kepada Rumah Sakit  
												untuk memberikan informasi tentang diagnosis, hasil pelayanan dan pengobatan saya kepada anggota keluarga saya dan kepada:
											</label>

											<br><label class="col-form-label" id="dacconsent_lnama1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; : &nbsp;bunga</label>
											<br><label class="col-form-label" id="dacconsent_lnohp1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Telp &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;081290001484</label>
											<br><label class="col-form-label" id="dacconsent_lhub1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hubungan dengan Pasien &nbsp; : &nbsp;Pengantar</label>
											<br>
											<br><label class="col-form-label" id="dacconsent_lnama2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; : &nbsp;-</label>
											<br><label class="col-form-label" id="dacconsent_lnohp2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Telp &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;-</label>
											<br><label class="col-form-label" id="dacconsent_lhub2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hubungan dengan Pasien &nbsp; : &nbsp;--Pilih--</label>
											<br><label class="col-form-label">Saya menyatakan bahwa pernyataan diatas dibuat dengan penuh kesadaran dan tanpa paksaan. </label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<label class="col-form-label font-weight-bold">
												&nbsp;&nbsp;D. PRIVASI
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-0"><label class="col-form-label">  </label></div>
										<div class="col-md-11">
											<label class="col-form-label">
												Saya megijinkan Rumah Sakit memberikan akses bagi : keluarga dan handai taulan serta 
												orang-orang yang akan menjenguk atau menemui saya.
												<br>Sebutkan nama/profesi bila ada permintaan :
											</label>
											<br><label class="col-form-label" id="dacconsent_lkerja1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. &nbsp;-</label>
											<br><label class="col-form-label" id="dacconsent_lkerja2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. &nbsp;-</label>

										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<label class="col-form-label font-weight-bold">
												&nbsp;&nbsp;E. INFORMASI BIAYA
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-0"><label class="col-form-label">  </label></div>
										<div class="col-md-11">
											<label class="col-form-label">
												Pihak Pembayar :
												<br>Pribadi  &nbsp;&nbsp;&nbsp; &nbsp;: Saya berkewajiban untuk membayar biaya perawatan yang telah diberikan oleh Rumah  Sakit  
												<br>Jaminan  : Saya akan tunduk pada ketentuan yang ditetapkan oleh badan penjamin/asuransi yang akan membiayai perawatan saya.
												<br>Saya memahami tentang informasi biaya pengobatan atau biaya tindakan yang dijelaskan oleh petugas Rumah Sakit.
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<label class="col-form-label font-weight-bold">
												&nbsp;&nbsp;F. HAK DAN KEWAJIBAN PASIEN
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-0"><label class="col-form-label">  </label></div>
										<div class="col-md-11">
											<label class="col-form-label">
												Saya memiliki hak untuk mengambil bagian dalam keputusan mengenai penyakit saya dan dalam hal perawatan medis dan 
												rencana pengobatan. Saya telah mendapat informasi tentang â€œHak dan kewajiban pasienâ€ di Rumah Sakit  
												melalui Leaflet dan banner yang disediakan oleh petugas. 
												<br>Saya memiliki hak untuk mendapatkan pelayanan kerohanian sesuai agama dan kepercayaan yang saya anut.
												<br>Saya/pasien memahami bahwa Rumah Sakit  tidak bertanggungjawab atas kehilangan barang-barang pribadi dan 
												barang berharga yang dibawa ke Rumah Sakit.
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<label class="col-form-label font-weight-bold">
												&nbsp;&nbsp;G. PESERTA DIDIK / PELATIH
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-0"><label class="col-form-label">  </label></div>
										<div class="col-md-11">
											<label class="col-form-label">
												Ikut berpartisipasi dalam asuhan pasien sebagai bagian dari pendidikan / pelatihan mereka 
												dengan pengawasan atau supervisi staf yang kompeten.
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<label class="col-form-label font-weight-bold">
												&nbsp;&nbsp;H. INFORMASI RAWAT INAP
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-0"><label class="col-form-label">  </label></div>
										<div class="col-md-11">
											<label class="col-form-label">
												Saya tidak diperkenankan untuk membawa barang-barang berharga keruang rawat inap, jika ada anggota keluarga atau 
												teman harus diminta untuk membawa pulang uang atau perhiasan. Bila tidak ada anggota keluarga, RS sakit menyediakan 
												tempat penitipan barang milik pasien ditempat resmi yang telah disediakan RS. Saya telah menerima informasi tentang 
												peraturan yang diberlakukan oleh Rumah Sakit dan saya beserta keluarga bersedia untuk mematuhinya, termasuk akan 
												mematuhi jam berkunjung pasien sesuai dengan aturan di rumah sakit.
												<br>Anggota keluarga pasien/saya yang menunggu pasien (sebanyak 1 orang) bersedia untuk selalu memakai tanda pengenal 
												khusus yang diberikan oleh Rumah Sakit , dan demi keamanan  seluruh pasien setiap keluarga dan siapapun yang 
												akan megunjungi pasien/saya diluar jam berkunjung bersedia untuk diminta/diperiksa identitasnya dan memakai identitias 
												yang diberikan oleh Rumah Sakit.
											</label>
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

	<div class="modal fade" id="dacconsent_diaghk" >
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title font-weight-bold">HAK DAN KEWAJIBAN PASIEN</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">x</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row ">
						<div class="col-md-12">
							<div class="card rapet">
								<div class="col-md-12">
									<div class="row" style="padding-top: 10px;">
										<div class="col-md-12">
											<label class="col-form-label font-weight-bold">
												&nbsp;&nbsp;Hak-hak Pasien
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<label class="col-form-label">
												&nbsp;&nbsp;yang dimaksud adalah hak pasien sebagaimana yang diatur di dalam PMK Nomor 4 Tahun 2018 Pasal 17 tentang Rumah Sakit, yaitu :
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-0"><label class="col-form-label">  </label></div>
										<div class="col-md-0"><label class="col-form-label">1.&nbsp;</label></div>
										<div class="col-md-11">
											<label class="col-form-label">
												Memperoleh informasi mengenai tata tertib dan peraturan yang berlaku di Rumah Sakit;
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-0"><label class="col-form-label">  </label></div>
										<div class="col-md-0"><label class="col-form-label">2.&nbsp;</label></div>
										<div class="col-md-11">
											<label class="col-form-label">
												Memperoleh informasi tentang hak dan kewajiban pasien;
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-0"><label class="col-form-label">  </label></div>
										<div class="col-md-0"><label class="col-form-label">3.&nbsp;</label></div>
										<div class="col-md-11">
											<label class="col-form-label">
												Memperoleh layanan yang manusiawi, adil, jujur dan tanpa diskriminasi;
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-0"><label class="col-form-label">  </label></div>
										<div class="col-md-0"><label class="col-form-label">4.&nbsp;</label></div>
										<div class="col-md-11">
											<label class="col-form-label">
												Memperoleh layanan kesehatan yang bermutu sesuai dengan kebutuhan medis, standar profesi dan standar prosedur operasional (SOP);
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-0"><label class="col-form-label">  </label></div>
										<div class="col-md-0"><label class="col-form-label">5.&nbsp;</label></div>
										<div class="col-md-11">
											<label class="col-form-label">
												Memperoleh layanan yang efektif dan efektif dan efisien sehingga pasien terhindar dari kerugian fisik dan materi;
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-0"><label class="col-form-label">  </label></div>
										<div class="col-md-0"><label class="col-form-label">6.&nbsp;</label></div>
										<div class="col-md-11">
											<label class="col-form-label">
												Mengajukan pengaduan atas kualitas pelayanan yang didapatkan;
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-0"><label class="col-form-label">  </label></div>
										<div class="col-md-0"><label class="col-form-label">7.&nbsp;</label></div>
										<div class="col-md-11">
											<label class="col-form-label">
												Memilih dokter dan kelas perawatan sesuai dengan keinginannya dan peraturan yang berlaku di Rumah Sakit;
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-0"><label class="col-form-label">  </label></div>
										<div class="col-md-0"><label class="col-form-label">8.&nbsp;</label></div>
										<div class="col-md-11">
											<label class="col-form-label">
												Meminta konsultasi tentang penyakit yang dideritanya kepada dokter lain yang mempunyai Surat Izin Praktik (SIP) 
												baik didalam maupun diluar Rumah Sakit;
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-0"><label class="col-form-label">  </label></div>
										<div class="col-md-0"><label class="col-form-label">9.&nbsp;</label></div>
										<div class="col-md-11">
											<label class="col-form-label">
												Mendapatkan privasi dan kerahasiaan penyakit yang diderita termasuk data-data medisnya (isi rekam medis);
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-0"><label class="col-form-label">  </label></div>
										<div class="col-md-0"><label class="col-form-label">10.&nbsp;</label></div>
										<div class="col-md-11">
											<label class="col-form-label">
												Mendapat informasi yang meliputi diagnosis dan tata cara tindakan medis, tujuan tindakan medis, alternatif tindakan, 
												risiko dan komplikasi yang mungkin terjadi, dan prognosis terhadap tindakan yang dilakukan serta perkiraan biaya 
												pengobatan;
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-0"><label class="col-form-label">  </label></div>
										<div class="col-md-0"><label class="col-form-label">11.&nbsp;</label></div>
										<div class="col-md-11">
											<label class="col-form-label">
												Memberikan persetujuan atau menolak atas ndakan yang akan dilakukan oleh Tenaga Kesehatan terhadap
												penyakit yang dideritanya;
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-0"><label class="col-form-label">  </label></div>
										<div class="col-md-0"><label class="col-form-label">12.&nbsp;</label></div>
										<div class="col-md-11">
											<label class="col-form-label">
												Didampingi keluarganya dalam keadaan kritis;
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-0"><label class="col-form-label">  </label></div>
										<div class="col-md-0"><label class="col-form-label">13.&nbsp;</label></div>
										<div class="col-md-11">
											<label class="col-form-label">
												Menjalankan ibadah sesuai agama dan kepercayaan yang dianutnya selama hal itu tidak mengganggu pasien lainnya;
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-0"><label class="col-form-label">  </label></div>
										<div class="col-md-0"><label class="col-form-label">14.&nbsp;</label></div>
										<div class="col-md-11">
											<label class="col-form-label">
												Memperoleh keamanan dan keselamatan dirinya selama perawatan di Rumah Sakit;
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-0"><label class="col-form-label">  </label></div>
										<div class="col-md-0"><label class="col-form-label">15.&nbsp;</label></div>
										<div class="col-md-11">
											<label class="col-form-label">
												Mengajukan usul, saran, perbaikan atas perlakuan Rumah Sakit terhadap dirinya;
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-0"><label class="col-form-label">  </label></div>
										<div class="col-md-0"><label class="col-form-label">16.&nbsp;</label></div>
										<div class="col-md-11">
											<label class="col-form-label">
												Menolak pelayanan bimbingan rohani yang tidak sesuai dengan agama dan kepercayaan yang dianutnya;
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-0"><label class="col-form-label">  </label></div>
										<div class="col-md-0"><label class="col-form-label">17.&nbsp;</label></div>
										<div class="col-md-11">
											<label class="col-form-label">
												Menggugat dan/atau menuntut Rumah Sakit apabila Rumah Sakit diduga memberikan pelayanan yang tidak sesuai dengan standar baik 
												secara perdata ataupun pidana;
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-0"><label class="col-form-label">  </label></div>
										<div class="col-md-0"><label class="col-form-label">18.&nbsp;</label></div>
										<div class="col-md-11">
											<label class="col-form-label">
												Mengeluhkan pelayanan Rumah Sakit yang tidak sesuai dengan standar pelayanan melalui media cetak dan elektronik sesuai dengan 
												ketentuan peraturan perundang-undangan.
											</label>
										</div>
									</div>

									<div class="row" style="padding-top: 10px;">
										<div class="col-md-12">
											<label class="col-form-label font-weight-bold">
												&nbsp;&nbsp;Kewajiban Pasien
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<label class="col-form-label">
												&nbsp;&nbsp;yang dimaksud adalah kewajiban pasien sebagaimana yang diatur di dalam PMK Nomor 4 Tahun 2018 Pasal 26 tentang Rumah Sakit, yaitu :
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-0"><label class="col-form-label">  </label></div>
										<div class="col-md-0"><label class="col-form-label">1.&nbsp;</label></div>
										<div class="col-md-11">
											<label class="col-form-label">
												Mematuhi peraturan yang berlaku di Rumah Sakit;
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-0"><label class="col-form-label">  </label></div>
										<div class="col-md-0"><label class="col-form-label">2.&nbsp;</label></div>
										<div class="col-md-11">
											<label class="col-form-label">
												Menggunakan fasilitas Rumah Sakit secara bertanggung jawab;
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-0"><label class="col-form-label">  </label></div>
										<div class="col-md-0"><label class="col-form-label">3.&nbsp;</label></div>
										<div class="col-md-11">
											<label class="col-form-label">
												Menghormati hak pasien lain, pengunjung dan hak Tenaga Kesehatan serta petugas lainnya yang bekerja di rumah sakit;
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-0"><label class="col-form-label">  </label></div>
										<div class="col-md-0"><label class="col-form-label">4.&nbsp;</label></div>
										<div class="col-md-11">
											<label class="col-form-label">
												Memberikan informasi yang jujur, lengkap dan akurat sesuai kemampuan dan pengetahuannya tentang masalah kesehatannya;
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-0"><label class="col-form-label">  </label></div>
										<div class="col-md-0"><label class="col-form-label">5.&nbsp;</label></div>
										<div class="col-md-11">
											<label class="col-form-label">
												Memberikan informasi mengenai kemampuan finansial dan jaminan kesehatan yang dimilikinya;
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-0"><label class="col-form-label">  </label></div>
										<div class="col-md-0"><label class="col-form-label">6.&nbsp;</label></div>
										<div class="col-md-11">
											<label class="col-form-label">
												Mematuhi rencana terapi yang direkomendasikan oleh Tenaga Kesehatan di Rumah Sakit dan disetujui oleh Pasien yang bersangkutan setelah
												mendapatkan penjelasan sesuai ketentuan peraturan perundang-undangan;
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-0"><label class="col-form-label">  </label></div>
										<div class="col-md-0"><label class="col-form-label">7.&nbsp;</label></div>
										<div class="col-md-11">
											<label class="col-form-label">
												Menerima segala konsekuensi atas keputusan pribadinya untuk menolak rencana terapi yang direkomendasikan oleh Tenaga Kesehatan dan
												atau tidak mematuhi petunjuk yang diberikan oleh Tenaga Kesehatan dalam rangka penyembuhan penyakit atau masalah kesehatannya;
											</label>
										</div>
									</div>
									<div class="row" style="padding-bottom: 10px;">
										<div class="col-md-0"><label class="col-form-label">  </label></div>
										<div class="col-md-0"><label class="col-form-label">8.&nbsp;</label></div>
										<div class="col-md-11">
											<label class="col-form-label">
												Memberikan imbalan jasa atas pelayanan yang diterima.
											</label>
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

	<div class="modal fade" id="dacconsent_diagsatusehat" >
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title font-weight-bold">PERSETUJUAN PEMROSESAN DATA MELALUI PLATFORM SATU SEHAT</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">x</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row ">
						<div class="col-md-12">
							<div class="card rapet">
								<div class="col-md-12">
									<div class="row" style="padding-top: 10px;">
										<div class="col-md-12">
											<label class="col-form-label font-weight-bold">
												&nbsp;&nbsp;Informasi Tentang Satusehat Dan Pemrosesan Data
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<label class="col-form-label">
												&nbsp;&nbsp;Sebelum meminta persetujuan, kami terlebih dahulu menerangkan beberapa hal berikut :
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-0"><label class="col-form-label">  </label></div>
										<div class="col-md-0"><label class="col-form-label">1.&nbsp;</label></div>
										<div class="col-md-11">
											<label class="col-form-label">
												Berdasarkan Pasal 28 Peraturan Menteri Kesehatan Nomor 24 Tahun 2022 tentang Rekam Medis, fasilitas pelayanan
												kesehatan wajib membuka akses dan mengirim data rekam medis kepada Kementerian Kesehatan melalui Platform
												SATUSEHAT.
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-0"><label class="col-form-label">  </label></div>
										<div class="col-md-0"><label class="col-form-label">2.&nbsp;</label></div>
										<div class="col-md-11">
											<label class="col-form-label">
												SATUSEHAT adalah sistem yang dikelola Kementerian Kesehatan yang mengintegrasikan data, analisis, dan pelayanan
												kesehatan dari berbagai sistem elektronik kesehatan di Indonesia, termasuk data rekam medis yang dibuat oleh fasilitas
												pelayanan kesehatan. Data ini akan disimpan dan dikelola oleh Kementerian Kesehatan untuk tujuan: 1) kepentingan
												pasien; 2) pelayanan kesehatan dan rujukan pasien; 2) surveilans kesehatan; dan 3) analisis kebijakan. Data yang
												diproses adalah data rekam medis yang bersifat spesifik berisikan identitas pasien, pemeriksaan, pengobatan, tindakan,
												dan pelayanan lain yang telah diberikan kepada Pasien. Data ini dibutuhkan dalam rangka menghadirkan pelayanan
												kesehatan berkelanjutan.
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-0"><label class="col-form-label">  </label></div>
										<div class="col-md-0"><label class="col-form-label">3.&nbsp;</label></div>
										<div class="col-md-11">
											<label class="col-form-label">
												Untuk kebutuhan pelayanan kesehatan pasien, fasilitas pelayanan kesehatan yang disetujui oleh pasien untuk membuka
												data rekam medis pasien, dapat membuka riwayat rekam medis pasien sebelumnya dan seterusnya (paling singkat 25
												tahun) atau sepanjang masih diperlukan untuk mencapai tujuan pemrosesan data, kecuali pasien menarik persetujuan
												akses.
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-0"><label class="col-form-label">  </label></div>
										<div class="col-md-0"><label class="col-form-label">4.&nbsp;</label></div>
										<div class="col-md-11">
											<label class="col-form-label">
												Pasien berhak untuk: 1) melengkapi, memperbaharui, dan/atau memperbaiki kesalahan dan/atau ketidak akuratan
												secara terbatas sesuai ketentuan peraturan perundang-undangan; 2) mengakses data miliknya; 3) menarik persetujuan
												akses fasilitas pelayanan kesehatan; 4) mengakhiri pengiriman data ke Kementerian Kesehatan; dan 5) meminta
												penghapusan data di Kementerian Kesehatan; dan 6) mendapatkan/menggunakan data miliknya.
											</label>
										</div>
									</div>

									<div class="row" style="padding-top: 10px;">
										<div class="col-md-12">
											<label class="col-form-label font-weight-bold">
												&nbsp;&nbsp;Persetujuan Pemberian Data
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<label class="col-form-label">
												&nbsp;&nbsp;Saya yang bertanda tangan/bertindak atas nama di bawah ini :
											</label>
										</div>
									</div>
									<div class="row rapet">
										<div class="col-md-10">
											<div class="form-group row">
												<div class="col-md-3">
													<label class="col-form-label"> &nbsp;&nbsp;&nbsp;Nama</label>
												</div>
												<div class="col-md-9">
													<label class="col-form-label" id="dacconsent_lssnama2"></label>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-md-3">
													<label class="col-form-label"> &nbsp;&nbsp;&nbsp;NIK</label>
												</div>
												<div class="col-md-9">
													<label class="col-form-label" id="dacconsent_lssnik2"></label>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-md-3">
													<label class="col-form-label"> &nbsp;&nbsp;&nbsp;Alamat</label>
												</div>
												<div class="col-md-9">
													<label class="col-form-label" id="dacconsent_lssalamat2"></label>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-md-3">
													<label class="col-form-label"> &nbsp;&nbsp;&nbsp;Telp</label>
												</div>
												<div class="col-md-9">
													<label class="col-form-label" id="dacconsent_lsstelp2"></label>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-md-3">
													<label class="col-form-label"> &nbsp;&nbsp;&nbsp;Hubungan dengan Pasien</label>
												</div>
												<div class="col-md-9">
													<label class="col-form-label" id="dacconsent_lsshub2"></label>
												</div>
											</div>
										</div>
									</div>
									<div class="row" style="padding-top: 10px;">
										<div class="col-md-12">
											<label class="col-form-label">
												&nbsp;&nbsp;Dengan ini menyatakan bahwa saya :
											</label>
										</div>
									</div>
									<div class="row" style="padding-top: 10px;">
										<div class="col-md-12">
											&nbsp;&nbsp;&nbsp;
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="${ccm+'_tipe1'}" name="dacconsentris7" value="1" checked="checked">
												<label class="custom-control-label font-weight-bold" for="${ccm+'_tipe1'}">Menyetujui&nbsp; </label>
												<label class="col-form-label font-italic" for="${ccm+'_tipe1'}">
													â€œ(Fasilitas Pelayanan Kesehatan pemberi layanan)â€&nbsp;
												</label>
												<label class="col-form-label" for="${ccm+'_tipe1'}">
													untuk menerima dan membuka data Pasien dari Fasilitas Pelayanan Kesehatan lainnya melalui SATUSEHAT.
												</label>
											</div>
										</div>
									</div>
									<div class="row" style="padding-top: 4px;">
										<div class="col-md-12">
											&nbsp;&nbsp;&nbsp;
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="${ccm+'_tipe2'}" name="dacconsentris7" value="2">
												<label class="custom-control-label font-weight-bold" for="${ccm+'_tipe2'}">Tidak Menyetujui&nbsp; </label>
												<label class="col-form-label font-italic" for="${ccm+'_tipe2'}">
													â€œ(Fasilitas Pelayanan Kesehatan pemberi layanan)â€&nbsp;
												</label>
												<label class="col-form-label" for="${ccm+'_tipe2'}">
													untuk menerima dan membuka data Pasien dari Fasilitas Pelayanan Kesehatan lainnya melalui SATUSEHAT.
												</label>
											</div>
										</div>
									</div>
									<div class="row" style="padding-top: 10px;">
										<div class="col-md-12">
											<label class="col-form-label">
												&nbsp;&nbsp;Demikian persetujuan tertulis saya buat dengan keadaan sadar tanpa tekanan dan paksaan dari siapapun untuk
												dipergunakan sebagaimana mestinya.
											</label>
										</div>
									</div>
									<br>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> 
	<!-- end modal general consent -->
	<!-- icd 9 -->
	<div class="modal fade" id="ModalShowaddicd9resumeirna">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					Tambah Tindakan icd 9
				</div>
				<div class="modal-body">
					<input class="form-control form-control-xs" id="textTambahicd9resumeirna">
					<div id="DivTambahicd9resumeirna"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- end icd 9 -->
	<!-- modal icd10 -->
	<div class="modal fade" id="ModalTambahdiagnosaresumeermirna">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					Tambah Diagnosa
				</div>
				<div class="modal-body">
					<input class="form-control form-control-xs" id="textTambahdiagnosaresumeermirna">
					<div id="DivTambahdiagnosaresumeermirna"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- end modal -->
	<!-- subjek -->
	<div class="modal fade " id="ModalCariSubjekirna" role="dialog">
		<div class="modal-dialog modal-lg">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">SUBJEK</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<table style="width:100%;" >
						<tr>
							<td>
								<div class="col-md-6">
									<input type="checkbox" name="cek_subjekirna" value="-">-
								</div>
							</td>
							<td>
								<div class="col-md-6">    
									<input type="checkbox" name="cek_subjekirna" value="">
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="col-md-6">
									<input type="checkbox" name="cek_subjekirna" value="Tak ada Keluhan">Tak ada Keluhan

								</div>
							</td>
							<td>
								<div class="col-md-6">    
									<input type="checkbox" name="cek_subjekirna" value="Mual">Mual
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="col-md-6">
									<input type="checkbox" name="cek_subjekirna" value="">
								</div>
							</td>
							<td>
								<div class="col-md-6">    
									<input type="checkbox" name="cek_subjekirna" value="Pusing">Pusing
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="col-md-6">
									<input type="checkbox" name="cek_subjekirna" value="Demam">Demam
								</div>
							</td>
							<td>
								<div class="col-md-6">    
									<input type="checkbox" name="cek_subjekirna" value="Batuk">Batuk
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="col-md-6">
									<input type="checkbox" name="cek_subjek" value="Lemas">Lemas
								</div>
							</td>
							<td>
								<div class="col-md-6">    
									<input type="checkbox" name="" value="Bab cair : Kali">Bab cair : Kali

								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="col-md-6">
									<input type="checkbox" name="cek_subjekirna" value="Tidak bisa menahan BAB">Tidak bisa menahan BAB
								</div>
							</td>
							<td>
								<div class="col-md-6">    
									<input type="checkbox" name="cek_subjekirna" value="Sesak">Sesak
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="col-md-6">
									<input type="checkbox" name="cek_subjekirna" value="Gelisah">Gelisah
								</div>
							</td>
							<td>
								<div class="col-md-6">    
									<input type="checkbox" name="cek_subjekirna" value="Cemas">Cemas

								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="col-md-6">
									<input type="checkbox" name="cek_subjekirna" value="Khawatir">Khawatir
								</div>
							</td>
							<td>
								<div class="col-md-6">    
									<input type="checkbox" name="cek_subjekirna" value="Gatal">Gatal
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="col-md-6">
									<input type="checkbox" name="cek_subjekirna" value="Kedinginan">Kedinginan
								</div>
							</td>
							<td>
								<div class="col-md-6">    
									<input type="checkbox" name="cek_subjekirna" value="Perineum terasa tertekan">Perineum terasa tertekan

								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="col-md-6">
									<input type="checkbox" name="cek_subjekirna" value="Merasa lapar terus menerus">Merasa lapar terus menerus

								</div>
							</td>
							<td>
								<div class="col-md-6">    
									<input type="checkbox" name="cek_subjekirna" value="Merasa haus terus menerus">Merasa haus terus menerus

								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="col-md-6">
									<input type="checkbox" name="cek_subjekirna" value="Merasa ingin berkemih namun tidak keluar">Merasa ingin berkemih namun tidak keluar

								</div>
							</td>
							<td>
								<div class="col-md-6">    
									<input type="checkbox" name="cek_subjekirna" value="Berkemih tidak lancar/ menetes sedikit-sedikit">Berkemih tidak lancar/ menetes sedikit-sedikit

								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="col-md-6">
									<input type="checkbox" name="cek_subjekirna" value="Sering Buang air kecil">Sering Buang air kecil

								</div>
							</td>
							<td>
								<div class="col-md-6">    
									<input type="checkbox" name="cek_subjekirna" value="Sering ngompol">Sering ngompol

								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="col-md-6">
									<input type="checkbox" name="cek_subjekirna" value="Sulit menggerakan ekstemitas pada">Sulit menggerakan ekstemitas pada

								</div>
							</td>
							<td>
								<div class="col-md-6">    
									<input type="checkbox" name="cek_subjekirna" value="Bengkak pada">Bengkak pada

								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="col-md-6">
									<input type="checkbox" name="cek_subjekirna" value="Sulit Tidur">Sulit Tidur

								</div>
							</td>
							<td>
								<div class="col-md-6">    
									<input type="checkbox" name="cek_subjekirna" value="Pandangan Kabur">Pandangan Kabur

								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="col-md-6">
									<input type="checkbox" name="cek_subjekirna" value="Sulit Menelan">Sulit Menelan

								</div>
							</td>
							<td>
								<div class="col-md-6">    
									<input type="checkbox" name="cek_subjekirna" value="Merasa Sedih">Merasa Sedih

								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="col-md-6">
									<input type="checkbox" name="cek_subjekirna" value="Merasa Kehilangan">Merasa Kehilangan

								</div>
							</td>
							<td>
								<div class="col-md-6">    
									<input type="checkbox" name="cek_subjekirna" value="Tidak Nyaman">Tidak Nyaman

								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="col-md-6">
									<input type="checkbox" name="cek_subjekirna" value="Nyeri pada daerah">Nyeri pada daerah

								</div>
							</td>
							<td>
								<div class="col-md-6">    
									<input type="checkbox" name="cek_subjekirna" value="Nafsu makan menurun">Nafsu makan menurun

								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="col-md-6">
									<input type="checkbox" name="cek_subjekirna" value="Kembung">Kembung
								</div>
							</td>
							<td>
								<div class="col-md-6">    
									<input type="checkbox" name="cek_subjek_dinamis" >
									<input type="text" name="cek_subjek_dinamis_input" id="cek_subjek_dinamis_input">
								</div>
							</td>
						</tr>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" id="btn" onclick="inputdatasubjekirna()" >Input Subjek</button><button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- status keluar -->
	<div class="modal" id="ModalInputStatusKeluarIrna" data-bs-backdrop="static">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">

				</div>
				<div class="modal-body">
					<div>
						<h2>Input status pulang pasien rawat jalan</h2>
						<label class="form-label">Status Pulang</label>
						<select class="form-control" id="statusPulangassesmenermirna" onclick="pilihfasilitaskesehatanermirja()">
							<option value="01">Pulang</option>
							<option value="02">MRS</option>
							<option value="03">Dirujuk ke RS Lebih Tinggi</option>
							<option value="04">Pindah RS Lain</option>
							<option value="07">Meninggal di Poliklinik / IRNA</option>
							<option value="08">Datang Langsung Mati</option>
							<option value="09">Meninggal di Kamar Operasi</option>
							<option value="10">Melarikan diri</option>
							<option value="11">Konsultasi ke Poli Lain</option>
							<option value="12">Permintaan Sendiri (APS)</option>
						</select>
						<div id="fasilitas_kesehatanermirja" style="display:none;">
							<label class="form-label">Fasilitas Kesehatan</label>
							<select id=tujuanrujukanermirna class="form-control" onchange="rujukanpasien()">
								<option value="1">Puskesmas</option>
								<option value="2">Rumah Sakit Pemerintah</option>
								<option value="3">Rumah Sakit Swasta</option>
								<option value="4">Dokter Praktek</option>
								<option value="5">Bidan/Rumah Bersalin</option>
								<option value="6">Klinik</option>
								<option value="7">Fasilitas Kesehatan lain</option>
							</select> 
							<label class="form-label">Tujuan</label>
							<select id="rujukanpasienermirna" name="rujukanpasienirna" class="form-control">
							</select>
						</div>
					</div>
				</div>
				<div class="modal-footer"> 
					<center><button style="width: 100PX;height:40PX;"    onclick="insertStatusPulangermirna()" class="form-control btn btn-primary" id="btnsimpanstatuskeluar">Simpan</button></center>
				</div>
			</div>
		</div>
	</div>
	<!-- end status keluar -->
	<!-- modal pemberian obat high -->

	<!-- end pemberian obat high-->
	<!-- modal pemberian obat -->

	<!-- end modal high alert -->
	<!-- diagnosa -->
	<div class="modal fade" id="ModalTambahdiagnosaCpptErmirna">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					Tambah Diagnosa
				</div>
				<div class="modal-body">
					<input class="form-control form-control-xs" id="textTambahdiagnosaCpptErmirna">
					<div id="DivTambahdiagnosaCpptErmirna"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- intervensi -->
	<!-- modal diagnosa perawat -->
	<div class="modal fade" id="Modaldiagnsoaperawatirna">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">        
					<h4>Diagnosa Perawat</h4>
				</div>
				<div class="modal-body">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Aksi</th>
								<th scope="col">Kode</th>
								<th scope="col">Diskripsi</th>
							</tr>
						</thead>
						<tbody id="tbodydiagnosaperawatirna">

						</tbody>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- end modal diagnosa perawat -->
	<div class="modal fade" id="ModalIntervensiKeperawatanirna" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
				</div>
				<div class="modal-body">

					<table>
						<tr>
							<td class="col-md-6">
								<input type="checkbox" name="intervensikeperawatanirna" value="Edukasi Pengukuran Nadi Radialis ( I. 12412 )">Edukasi Pengukuran Nadi Radialis ( I. 12412 )
							</td>
							<td class="col-md-6">
								<input type="checkbox" name="intervensikeperawatanirna" value="Edukasi Rehabilitasi Jantung ( I. 12446 )">Edukasi Rehabilitasi Jantung ( I. 12446 )
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="intervensikeperawatanirna">Edukasi Proses Penyakit ( I. 12444 )
							</td>
							<td>
								<input type="checkbox" name="intervensikeperawatanirna">Edukasi Nutrisi ( I. 12395 ) hal 72
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="intervensikeperawatanirna" value="Edukasi Diet ( I.12369 )">Edukasi Diet ( I.12369 )
							</td>
							<td>
								<input type="checkbox" name="intervensikeperawatanirna" value="Manajemen Diare (L. 03101)">Manajemen Diare (L. 03101)
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="intervensikeperawatanirna" value="Perawatan Bayi ( I. 10338 )">Perawatan Bayi ( I. 10338 )
							</td>
							<td>
								<input type="checkbox" name="intervensikeperawatanirna" value="Konseling nutrisi ( I. 03094 )">Konseling nutrisi ( I. 03094 )
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="intervensikeperawatanirna" value="Manajemen Cairan (I.03098)">Manajemen Cairan (I.03098)

							</td>
							<td>
								<input type="checkbox" name="intervensikeperawatanirna" value="Manajemen Elektrolit (I. 03102)">Manajemen Elektrolit (I. 03102)

							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="intervensikeperawatanirna" value="Edukasi Dehidrasi ( I. 12367 )">Edukasi Dehidrasi ( I. 12367 )

							</td>
							<td>
								<input type="checkbox" name="intervensikeperawatanirna" value="Dukungan Perawatan diri BAB/BAK ( I. 11349 )">Dukungan Perawatan diri BAB/BAK ( I. 11349 )

							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="intervensikeperawatanirna" value="Manajemen Konstipasi ( I. 04155 )">Manajemen Konstipasi ( I. 04155 )

							</td>
							<td>
								<input type="checkbox" name="intervensikeperawatanirna" value="Edukasi Irigasi Kandung Kemih ( I. 12375 )">Edukasi Irigasi Kandung Kemih ( I. 12375 )

							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="intervensikeperawatanirna" value="Pencegahan Konstipasi (I. 04160)">Pencegahan Konstipasi (I. 04160)

							</td>
							<td>
								<input type="checkbox" name="intervensikeperawatanirna" value="">Edukasi latihan fisik ( I. 12389 )

							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="intervensikeperawatanirna" value="Edukasi aktivitas/ istirahat ( I.12362 )">Edukasi aktivitas/ istirahat ( I.12362 )

							</td>
							<td>
								<input type="checkbox" name="intervensikeperawatanirna"value ="Edukasi Persalinan (I. 12437)">Edukasi Persalinan (I. 12437)

							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="intervensikeperawatanirna" value="Manajemen kehamilan tidak dikehendaki ( I. 107216 )">Manajemen kehamilan tidak dikehendaki ( I. 107216 )

							</td>
							<td>
								<input type="checkbox" name="intervensikeperawatanirna" value="Edukasi Manajemen Nyeri ( I. 12391 )">Edukasi Manajemen Nyeri ( I. 12391 )

							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="intervensikeperawatanirna" value="Terapi Relaksasi ( I. 093226 )">Terapi Relaksasi ( I. 093226 )

							</td>
							<td> 
								<input type="checkbox" name="intervensikeperawatanirna" value="Edukasi Stimulasi Bayi/Anak ( I. 12448 )">Edukasi Stimulasi Bayi/Anak ( I. 12448 )

							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="intervensikeperawatanirna" value="Promosi Perkembangan Anak ( I. 10340 )">Promosi Perkembangan Anak ( I. 10340 )

							</td>
							<td>
								<input type="checkbox" name="intervensikeperawatanirna" value="Promosi Perkembangan Remaja ( I. 10341 )">Promosi Perkembangan Remaja ( I. 10341 )

							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="intervensikeperawatanirna" value="Edukasi Berat Badan Efektif ( I. 12365 )">Edukasi Berat Badan Efektif ( I. 12365 )

							</td>
							<td>
								<input type="checkbox" name="intervensikeperawatanirna" value="Edukasi Kesehatan (I. 12383)">Edukasi Kesehatan (I. 12383)

							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="intervensikeperawatanirna" value="Edukasi Termoregulasi (I. 12457)">Edukasi Termoregulasi (I. 12457)

							</td>
							<td>
								<input type="checkbox" name="intervensikeperawatanirna" value="Edukasi Cairan ( I. 12455 )">Edukasi Cairan ( I. 12455 )

							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="intervensikeperawatanirna" value="Edukasi Reaksi Alergi (I. 12445)">Edukasi Reaksi Alergi (I. 12445)

							</td>
							<td>
								<input type="checkbox" name="intervensikeperawatanirna" value="Edukasi Perawatan Kulit ( I. 12426 )">Edukasi Perawatan Kulit ( I. 12426 )

							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="intervensikeperawatanirna" value="Pencegahan Infeksi (I. 14539)">Pencegahan Infeksi (I. 14539)

							</td>
							<td>
								<input type="checkbox" name="intervensikeperawatanirna" value="Edukasi Keselamatan Lingkungan ( I. 12384 )">Edukasi Keselamatan Lingkungan ( I. 12384 )

							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="intervensikeperawatanirna" value="Intervensi Lain">Intervensi Lain

							</td>
							<td>
								<input type="checkbox" name="intervensikeperawatanirna" value="Manajemen Jalan Nafas ( I.01012)">Manajemen Jalan Nafas ( I.01012)

							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="intervensikeperawatanirna" value="Latihan Batuk Efektif ( I.01006)">Latihan Batuk Efektif ( I.01006)

							</td>
							<td>
								<input type="checkbox" name="intervensikeperawatanirna" value="Manajemen Sensasi Perifer (I.06195)">Manajemen Sensasi Perifer (I.06195)

							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="intervensikeperawatanirna" value="Perawatan Luka (I. 14564)">Perawatan Luka (I. 14564)

							</td>
							<td>
								<input type="checkbox" name="intervensikeperawatanirna" value="Manajemen Sensasi Perifer (I.06195)">Manajemen Sensasi Perifer (I.06195)

							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="intervensikeperawatanirna" value="Manajemen Hipervolemia (I. 03114)">Manajemen Hipervolemia (I. 03114)

							</td>
							<td>
								<input type="checkbox" name="intervensikeperawatanirna" value="Manajemen Prilaku (I.12463)">Manajemen Prilaku (I.12463)

							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="intervensikeperawatanirna" value="Edukasi Pencegahan Jatuh ( I.12407)">Edukasi Pencegahan Jatuh ( I.12407)

							</td>
							<td>
								<input type="checkbox" name="intervensikeperawatanirna" value="Pemantauan Respirasi ( I.01014)">Pemantauan Respirasi ( I.01014)

							</td>
						</tr>

					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn-primary" id="buttonintervensiirna" onclick="inputdataintervensiirna()">
						Masukkan ->
					</button>
				</div>
			</div>
		</div>
	</div>
	<!-- pengantar serahterima -->
	<div class="modal fade" id="ModalSerahTerimaPasienIrna" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h2>SERAH TERIMA PASIEN RAWAT INAP</h2>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6"><h4>Kondisi_masuk</h4></div>
						<div class="col-md-12" ><textarea style="height: 100px;" id="kondisi_masuk" class="form-control "></textarea></div>
						<div class="col-md-6"><h4>Indikasi_masuk</h4></div>
						<div class="col-md-12"><textarea id="indikasi_masuk" class="form-control "></textarea></div>
						<div class="col-md-6"><h4>Nyeri</h4></div>
						<div class="col-md-12"><textarea id="nyeri" class="form-control "></textarea></div>
						<div class="col-md-2"><h4>Resiko_jatuh</h4></div>
						<div class="col-md-12"><input type="text" id="resiko_jatuh" class="form-control form-control-xs"></div>
						<div class="col-md-2"><h4>Terapi</h4></div>
						<div class="col-md-12"><textarea id="terapi" class="form-control "></textarea> </div>
						<div class="col-md-6"><h4>Dokter dpjp</h4></div>
						<div class="col-md-12"><input type="text" id="dokter_dpjp" class="form-control form-control-xs"></div>
						<div class="col-md-6"><h4>Dpjp konsul</h4></div>
						<div class="col-md-12"><input type="text" id="dpjpkonsul" class="form-control form-control-xs"></div>
						<div class="col-md-6"><h4>Perawat serah</h4></div>
						<div class="col-md-12"><input type="text" id="perawat_serah" class="form-control form-control-xs"></div>
						<div class="col-md-6"><h4>Terhubung dpjp</h4></div>
						<div class="col-md-12"><input type="text" id="terhubung_dpjp" class="form-control form-control-xs"></div>
						<div class="col-md-6"><h4>Jam terhubung</h4></div>
						<div class="col-md-12"><input type="text" id="jam_terhubung" class="form-control form-control-xs"></div>
						<div class="col-md-6"><h4>Advis dpjp</h4></div>
						<div class="col-md-12"><input type="text" id="advis_dpjp" class="form-control form-control-xs"></div>
						<div class="col-md-6"><h4>Keterangan advis</h4></div>
						<div class="col-md-12"><input type="text" id="keterangan_advis" class="form-control form-control-xs"></div>
						<div class="col-md-6"><h4>Rencana terapi dibuat</h4></div>
						<div class="col-md-12"><textarea id="rencana_terapi" class="form-control"></textarea></div>
						<div class="col-md-6"><h4>Rencana tindakan </h4></div>
						<div class="col-md-12"><textarea id="rencana_tindakan" class="form-control "></textarea></div>
						<div class="col-md-6"><h4>Diperhatikan</h4> </div>
						<div class="col-md-12"><textarea  id="diperhatikan" class="form-control "></textarea></div>
						<div class="col-md-6"><h4>Dokter pemberi </h4></div>
						<div class="col-md-12"><input type="text" id="dokter_pemberi" class="form-control form-control-xs"></div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- end serahterima -->
	<!-- pengantar rawat inap -->
	<div class="modal fade" id="ModalPengantarawatinap" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					PENGANTAR RAWAT INAP
				</div>
				<div class="modal-body">



					<div class="row">
						<div class="col-md-2">tgl_masuk_nginap</div>
						<div class="col-md-10"><input  id="tgl_masuk_nginap" class="form-control form-control-xs"></div>
						<div class="col-md-2">keterangan</div>
						<div class="col-md-10"><textarea  id="keterangan" class="form-control "></textarea></div>
						<div class="col-md-2">Keluhan</div>
						<div class="col-md-10"><textarea  id="keluhan" class="form-control "></textarea></div>
						<div class="col-md-2">rikjang</div>
						<div class="col-md-10"><textarea  id="rikjang" class="form-control "></textarea></div>
						<div class="col-md-2">diagnosa</div>
						<div class="col-md-10"><textarea  id="diagnosa" class="form-control "></textarea></div>
						<div class="col-md-2">tindakan_pembedahan</div>
						<div class="col-md-10"><textarea type="text" id="tindakan_pembedahan" class="form-control "></textarea></div>
						<div class="col-md-2">terapi</div>
						<div class="col-md-10"><textarea type="text" id="terapi" class="form-control "></textarea></div>
						<div class="col-md-2">dokter_pengirim</div>
						<div class="col-md-10"><input type="text" id="dokter_pengirim" class="form-control form-control-xs"></div>
						<div class="col-md-2">dokterdpjp</div>
						<div class="col-md-10"><input type="text" id="dokter_dpjp" class="form-control form-control-xs"></div>
						<div class="col-md-2">status_emergency</div>
						<div class="col-md-10"><input type="text" id="status_emergency" class="form-control form-control-xs"></div>
						<div class="col-md-2">ruangan</div>
						<div class="col-md-10"><input type="text" id="ruangan" class="form-control form-control-xs"></div>
						<div class="col-md-2">intruksi_dpjp</div>
						<div class="col-md-10"><textarea type="text" id="intruksi_dpjp" class="form-control"></textarea></div>
						<div class="col-md-2">tanggal dibuat</div>
						<div class="col-md-10"><input type="text" id="tgl_buat" class="form-control form-control-xs"></div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- ttdresume -->
	<div class="modal fade"  id="ModalTtdTanyaKonsultasiIrna" role="dialog">
		<div class="modal-dialog" style="width: 408px;">
			<div class="modal-content">
				<div class="modal-body">
					<div id="paint_ttdTanyaKonsultasiIrna"></div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-sm btn-primary" class="btn btn-sm btn-primary" onclick="takeTtdTanyaKonsultasiIrna()">Simpan</button>
					<button class="btn btn-sm btn-outline-danger" onclick="$('#ModalTtdTanyaKonsultasiIrna').modal('hide')">Close</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade"  id="ModalTtdResumeIrna" role="dialog">
		<div class="modal-dialog" style="width:408px;">
			<div class="modal-content">
				<div class="modal-body">
					<div id="paint_ttdresumeirna"></div>
				</div>
				<div class="modal-footer">
					<button onclick="takeTtdDpjpResumeIrna()">Simpan</button>
					<button onclick="$('#ModalTtdResumeIrna').modal('hide')">Close</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade"  id="ModalTtdPasienResumeIrna" role="dialog">
		<div class="modal-dialog" style="width:408px;">
			<div class="modal-content">
				<div class="modal-body">
					<div id="paint_ttdpasienresumeirna"></div>
				</div>
				<div class="modal-footer">
					<button onclick="takeTtdPasienResumeIrna()">Simpan</button>
					<button onclick="$('#ModalTtdPasienResumeIrna').modal('hide')">Close</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade"  id="ModalTtdPerawatResumeIrna" role="dialog">
		<div class="modal-dialog" style="width:408px;">
			<div class="modal-content">
				<div class="modal-body">
					<div id="paint_ttdperawatresumeirna"></div>
				</div>
				<div class="modal-footer">
					<button onclick="takeTtdPerawatResumeIrna()">Simpan</button>
					<button onclick="$('#ModalTtdPerawatResumeIrna').modal('hide')">Close</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade"  id="ModalTtdJawabKonsultasiIrna" role="dialog">
		<div class="modal-dialog" style="width: 408px;">
			<div class="modal-content">
				<div class="modal-body">
					<div id="paint_ttdJawabKonsultasiIrna"></div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-sm btn-primary" onclick="takeTtdJawabKonsultasiIrna()">Simpan</button>
					<button class="btn btn-sm btn-outline-danger" onclick="$('#ModalTtdJawabKonsultasiIrna').modal('hide')">Close</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade"  id="ModalTtdEfekObatIrna" role="dialog">
		<div class="modal-dialog" style="width:408px;">
			<div class="modal-content">
				<div class="modal-body">
					<div id="paint_ttdEfekObatIrna"></div>
				</div>
				<div class="modal-footer">
					<button onclick="takeTtdEfekObatIrna();">Simpan</button>
					<button onclick="$('#ModalTtdEfekObatIrna').modal('hide');">Close</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade"  id="Modalpaint_ttdassesmenperawatirna" role="dialog">
		<div class="modal-dialog" style="width: 408px;">
			<div class="modal-content">
				<div class="modal-body">
					<div id="paint_ttdassesmenperawatirna"></div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-sm btn-primary" onclick="takepaint_ttdassesmenperawatirna()"><i class="fa fa-save"></i> Simpan</button>
					<button class="btn btn-sm btn-outline-danger" onclick="$('#Modalpaint_ttdassesmenperawatirna').modal('hide')"><i class="fa fa-times"></i> Batal</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade"  id="Modalpaint_ttdassesmenmedisirna" role="dialog">
		<div class="modal-dialog" style="width: 408px;">
			<div class="modal-content">
				<div class="modal-body">
					<div id="paint_ttdassesmenmedisirna"></div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-sm btn-primary" onclick="takepaint_ttdassesmenmedisirna()"><i class="fa fa-save"></i> Simpan</button>
					<button class="btn btn-sm btn-outline-danger" onclick="$('#Modalpaint_ttdassesmenmedisirna').modal('hide')"><i class="fa fa-times"></i> Batal</button>
				</div>
			</div>
		</div>
	</div>
	<!-- icd 10 update 21/12/2023 -->
	<!-- end pengantar irna -->
	<!-- eresep -->
	<div class="mod_inputpembedahan"></div>
	<div class="rekammedisIrna_eresepIrna_content"></div>
	<div class="rekammedisIrna_eresepIrna_preview"></div>
	<!-- <div class="viewlistpasienermirna"></div> -->

	<script type="text/javascript">
		var templateListIrna = document.getElementById("ViewListPasienIrna").innerHTML;
		var tgllahir;
		var alamatpasien;
		var penyakitPendaftaranErmIrja;
		var jamupdatesoap;
		var nowday      = "<?php echo $nowday; ?>";
		var data = {
			norms:'',
			namas:'',
			units:'',
			id_units:'',
			id_kunjungans:''
		};
		var jeniskelaminERMIRNA = '';
		
		$(document).ready(function() {
			var icd=localStorage.getItem("opslistpenyakit");
			if ( icd =="" || icd ==undefined || icd== null) {
				icdlocalstrorage();
			}
			var data =document.getElementById('profilepasienirna').value;
			if (data =='') {
				var url 	= "";
				var view 	= 'viewlistpasienermirna';
				onCall_listpasien(view, url);
			}else{
				var id_kunjungan=document.getElementById('transaksiermirna').value;
				setTimeout(refresh_listpasienermirna, 1000); 
				detailicd9resume(id_kunjungan);
				detailicd10resumeirna(id_kunjungan);
				pegawai();
				perawat();
				var localis;
				historipenyakitermirna();
				historialergiirna();
				tampilpekerjaanperermirna();
				tampilagamaperermirna();
				document.getElementById('dpjpResumeermirna').value=user.id_pegawai;
			}
		})

		function refreshlocalstrorage() {
			localStorage.clear();
			icdlocalstrorage();
		}

		function icdlocalstrorage(){
			apiPOST('Rekammedisirna/icdjsonlocalstorage', null,hasil=>{
				var kode=hasil['data'];
				localStorage.clear();
				localStorage.setItem("opslistpenyakit", JSON.stringify(kode));
			});
		}

		function icd10sekarangtreage(){
			document.getElementById('divcaridiagnosacpptmedisirna').innerHTML='';
			var kode  =document.getElementById('caridiagnosacpptmedisirna').value;
			var id    =kode.toUpperCase();
			var list  =localStorage.getItem("opslistpenyakit");
			var listOptPenyakit = JSON.parse(localStorage.getItem("opslistpenyakit"));
			if (id.substring(1, 2) ==1 ||  id.substring(1, 2) ==2 ||  id.substring(1, 2) ==3 || id.substring(1, 2) ==4 || id.substring(1, 2) ==5 || id.substring(1, 2) ==6 || id.substring(1, 2) ==7 || id.substring(1, 2) ==8 ||  id.substring(1, 2) ==9 ||  id.substring(1, 2) ==0) { 
				let jumlahOpsi1 = 10;
				let i = 0;
				do {
					if (listOptPenyakit[i].kd_penyakit.includes(id)) {
						document.getElementById('tampilarrayicd10').innerHTML +='<label style="background-color: #fefbd8;" value='+listOptPenyakit[i].kd_penyakit+' class="form-control" onclick="inputassesmenicd(`'+listOptPenyakit[i].kd_penyakit+'`,`'+listOptPenyakit[i].penyakit+'`)">'+listOptPenyakit[i].kd_penyakit+'|'+listOptPenyakit[i].penyakit+'</label>';
						jumlahOpsi1--;
					}
					i++;
				}
				while (i < listOptPenyakit.length && jumlahOpsi1 > 0);

			}else{
				let jumlahOpsi2 = 10;
				let j = 0;
				do {
					if (listOptPenyakit[j].penyakit.includes(id)) {
						document.getElementById('tampilarrayicd10').innerHTML +='<label style="background-color: #fefbd8;" value='+listOptPenyakit[j].kd_penyakit+' class="form-control" onclick="inputassesmenicd(`'+listOptPenyakit[j].kd_penyakit+'`,`'+listOptPenyakit[j].penyakit+'`)">'+listOptPenyakit[j].kd_penyakit+'|'+listOptPenyakit[j].penyakit+'</label>';
						jumlahOpsi2--;
					}
					j++;
				}
				while (j < listOptPenyakit.length && jumlahOpsi2 > 0);
			}
		}

		function startttd() {
			showttdpasiengeneralconcent();
			showttdgeneralconcent();
		}

		function showdataListPasienIrna(no_rm, id_kunjungan, id_pegawai){
			var localis;
			setTimeout(refresh_listpasienermirna, 1000); 
			detailicd9resume(id_kunjungan);
			detailicd10resumeirna(id_kunjungan);
			pegawai();
			// LabKimiaKlinisIrna();
			// RadXRirna();
			// RadCTScanirna();
			// RadULirna();
			//tampilpenunjangirna(no_rm);
			historipenyakitermirna();
			historialergiirna();
			//historipenyakitkeluarga();
			tampilpekerjaanperermirna();
			tampilagamaperermirna();
			document.getElementById('dpjpResumeermirna').value=id_pegawai;
			document.getElementById("ViewListPasienIrna").innerHTML = templateListIrna;
			// showttdresumeirna();
			// showttdperawatresumeirna();
			// showttdpasienresumeirna();
		}

		function showjawabkonsulirna(id_kunjungan,id_transaksi) {
			document.getElementById('linkassesmenkonsulirna').click();
			var param ={id_transaksi:id_transaksi,
			id_kunjungan:id_kunjungan,
			id_pegawai:user.id_pegawai,};
			apiPOST('Rekammedisirna/showjawabkonsulirna', param,hasil=>{
				document.getElementById('selectdpjpkonsultasijawabirna').value=hasil['data']['dpjp_konsul'];
				document.getElementById('keterangantanya').value=hasil['data']['keterangan_tanya'];
				document.getElementById('diagnosistanya').value=hasil['data']['diagnosis_tanya'];
				document.getElementById('ImgTtdTanyaKonsultasiIrna').src=hasil['data']['ttd_dpjp'];
				document.getElementById('divaksitanyakonsul').style.display='none';
				document.getElementById('divaksijawabkonsul').style.display='block';

			});
		}

		function showassesmenmedisirna() {
			var id_kunjungan=document.getElementById('idKunjunganermirna').value;
			var id_transaksi=document.getElementById("transaksiermirna").value;
		//document.getElementById('reviewassmedirna').click();
			assesmenirnadokterhistoriupdate(id_kunjungan,id_transaksi);
		}
		function showassesmenkeperawatanirna() {
			var id_kunjungan=document.getElementById('idKunjunganermirna').value;
			var id_transaksi=document.getElementById("transaksiermirna").value;
		//document.getElementById('reviewassmedirna').click();
			updateasskepirna(id_kunjungan,id_transaksi,null);
		}
		function showassesmengiziirna() {
			var id_kunjungan=document.getElementById('idKunjunganermirna').value;
			document.getElementById('linkassesmengizi').click();
			updateassgiziirna(id_kunjungan,null);
		}
		function showrencanapulangirna() {
			document.getElementById('reviewrencanapulangirna').click();
			var param ={id_transaksi:document.getElementById("transaksiermirna").value,};
			apiPOST('Rekammedisirna/detailrencanapulangirna', param,hasil=>{
				if (hasil['code']==200) {
					var a=hasil['data'];
					for (var i = 0; i < a.length; i++) {

						document.getElementById("vdacriplanning_atgl").value=a[i].tgl_masuk;
						document.getElementById("vdacriplanning_aalasan").value=a[i].alasan_mrs;
						document.getElementById("vdacriplanning_adiagnosa").value=a[i].diagnosa;
						document.getElementById("vdacriplanning_apx").value=a[i].px_wali;
						document.getElementById("vdacriplanning_apjId").value=a[i].ppja;
						document.getElementById("vdacriplanning_atglpulang").value=a[i].tgl_keluar;
						document.getElementById("vdacriplanning_apendamping").value=a[i].pendamping;
						document.getElementById("vdacriplanning_ahubungan").value=a[i].hubungan;



/*		vdacriplanning_b1_1Id :document.querySelector('input[name=vdacriplanning_b1_1Id]:checked').value,
		vdacriplanning_b1_2Id :document.querySelector('input[name=vdacriplanning_b1_2Id]:checked').value,
		vdacriplanning_b1cId  :document.querySelector('input[name=vdacriplanning_b1cId]:checked').value,
		vdacriplanning_b2Id   :document.querySelector('input[name=vdacriplanning_b2Id]:checked').value,
		vdacriplanning_b3Id   :document.querySelector('input[name=vdacriplanning_b3Id]:checked').value,
		vdacriplanning_b4Id   :document.querySelector('input[name=vdacriplanning_b4Id]:checked').value,
		vdacriplanning_b5Id   :document.querySelector('input[name=vdacriplanning_b5Id]:checked').value,
		vdacriplanning_b6Id   :document.querySelector('input[name=vdacriplanning_b6Id]:checked').value,
		vdacriplanning_b7Id   :document.querySelector('input[name=vdacriplanning_b7Id]:checked').value,
		vdacriplanning_b8Id   :document.querySelector('input[name=vdacriplanning_b8Id]:checked').value,
		vdacriplanning_b9Id   :document.querySelector('input[name=vdacriplanning_b9Id]:checked').value,
		vdacriplanning_b10Id  :document.querySelector('input[name=vdacriplanning_b10Id]:checked').value,
		vdacriplanning_b11Id  :document.querySelector('input[name=vdacriplanning_b11Id]:checked').value,
		vdacriplanning_b12Id  :document.querySelector('input[name=vdacriplanning_b12Id]:checked').value,*/
/*		document.getElementById("vdacriplanning_b6ket").value=a[i].;
		document.getElementById("vdacriplanning_b7ket").value=a[i].;
		document.getElementById("vdacriplanning_b8ket").value=a[i].;
		document.getElementById("vdacriplanning_b9ket").value=a[i].;
		document.getElementById("vdacriplanning_b10Idket").value=a[i].;
		document.getElementById("vdacriplanning_b11ket").value=a[i].;
		document.getElementById("vdacriplanning_b12ket").value=a[i].;*/
/*		
		document.getElementById("vdacriplanning_cdokter1Id").value=a[i].;
		document.getElementById("vdacriplanning_tglcatat").value=a[i].;*/

						document.getElementById("vdacriplanning_cpoli").value=a[i].id_unit;
						document.getElementById("vdacriplanning_ctglkontrol").value=a[i].tgl_kontrol;
						if (a[i].pengaruh_keluarga=='1') {
							document.getElementById("vdacriplanning_b1_1Id_1").checked='true';
						} else {
							document.getElementById("vdacriplanning_b1_1Id_2").checked='true';
						}
						if (a[i].pengaruh_pekerjaan=='1') {
							document.getElementById("vdacriplanning_b1_2Id_1").checked='true';
						} else {
							document.getElementById("vdacriplanning_b1_2Id_2").checked='true';
						}
						if (a[i].pengaruh_keuangan=='1') {
							document.getElementById("vdacriplanning_b1cId_1").checked='true';
						} else {
							document.getElementById("vdacriplanning_b1cId_2").checked='true';
						}
						if (a[i].antisipasi=='1') {
							document.getElementById("vdacriplanning_b2Id_1").checked='true';
						} else {
							document.getElementById("vdacriplanning_b2Id_2").checked='true';
						}
						switch (a[i].dokumen){
						case '1':
							document.getElementById("vdacriplanning_cdokumenId_1").checked='true';
							break;
						case '2':
							document.getElementById("vdacriplanning_cdokumenId_2").checked='true';
							break;
						case '3':
							document.getElementById("vdacriplanning_cdokumenId_3").checked='true';
							break;
						case '4':
							document.getElementById("vdacriplanning_cdokumenId_4").checked='true';
							break;
						}
						switch(a[i].bantuan){
						case '1':
							document.getElementById("vdacriplanning_b3Id_1").checked='true';
							break;
						case '2':
							document.getElementById("vdacriplanning_b3Id_2").checked='true';
							break;
						case '3':
							document.getElementById("vdacriplanning_b3Id_3").checked='true';
							break;
						case '4':
							document.getElementById("vdacriplanning_b3Id_4").checked='true';
							break;
						case '5':
							document.getElementById("vdacriplanning_b3Id_5").checked='true';
							break;
						case '6':
							document.getElementById("vdacriplanning_b3Id_6").checked='true';
							break;
						case '7':
							document.getElementById("vdacriplanning_b3Id_7").checked='true';
							break;
						case '8':
							document.getElementById("vdacriplanning_b3Id_8").checked='true';
							break;
						case '9':
							document.getElementById("vdacriplanning_b3Id9").checked='true';
							break;
						case '10':
							document.getElementById("vdacriplanning_b3Id_10").checked='true';
							break;

						}
						if (a[i].helper=='1') {
							document.getElementById("vdacriplanning_b4Id_1").checked='true';
						} else {
							document.getElementById("vdacriplanning_b4Id_2").checked='true';
						}

						if (a[i].sendiri=='1') {
							document.getElementById("vdacriplanning_b5Id_1").checked='true';
						} else {
							document.getElementById("vdacriplanning_b5Id_2").checked='true';
						}
						if (a[i].alat_medis=='1') {
							document.getElementById("vdacriplanning_b6Id_1").checked='true';
						} else {
							document.getElementById("vdacriplanning_b6Id_2").checked='true';
						}
						if (a[i].alat_jln=='1') {
							document.getElementById("vdacriplanning_b7Id_1").checked='true';
						} else {
							document.getElementById("vdacriplanning_b7Id_2").checked='true';
						}
						if (a[i].rawat_khusus=='1') {
							document.getElementById("vdacriplanning_b8Id_1").checked='true';
						} else {
							document.getElementById("vdacriplanning_b8Id_2").checked='true';
						}
						if (a[i].kesulitan=='1') {
							document.getElementById("vdacriplanning_b9Id_1").checked='true';
						} else {
							document.getElementById("vdacriplanning_b9Id_2").checked='true';
						}
						if (a[i].nyeri=='1') {
							document.getElementById("vdacriplanning_b10Id_1").checked='true';
						} else {
							document.getElementById("vdacriplanning_b10Id_2").checked='true';
						}
						if (a[i].edukasi=='1') {
							document.getElementById("vdacriplanning_b11Id_1").checked='true';
						} else {
							document.getElementById("vdacriplanning_b11Id_2").checked='true';
						}
						if (a[i].keterampilan=='1') {
							document.getElementById("vdacriplanning_b12Id_1").checked='true';
						} else {
							document.getElementById("vdacriplanning_b12Id_2").checked='true';
						}
						document.getElementById("vdacriplanning_b3Idket10").value=a[i].bantuanlain;
						document.getElementById("vdacriplanning_catat").value=a[i].catatan;
						document.getElementById("reviewrencanapulangirna").click();

					}
				} else {
					alert('Pasien Tidak Ditemukan');
				}
			});


}
function tampilKomunikasiPengajaranKepIrna() {
	$('#Modaldiagnsoaperawatirna').modal('show');

	var param ={id:document.getElementById("DiagnosaasskepErmIrna").value,};
	apiPOST('Kunjungan/diagnosaperawat', param,hasil=>{
		var a=hasil['kode'];
		var unit='';
		for (var i = 0; i < a.length; i++) {
			unit+='<tr>';
			unit+='<td scope="row">1</td>';
			unit+='<td><button id="idbtndiagnosairna'+a[i]['kd_perawat']+'" onclick="detaildiagnosaperawatirna(`'+a[i]['kd_perawat']+'`)"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>&nbsp;<button  onclick="hiddendetaildiagnosaperawatirna(`'+a[i]['kd_perawat']+'`)"><i class="fa fa-times-circle" aria-hidden="true" id="idbtnhiddendiagnosairna'+a[i]['kd_perawat']+'"></i></button></td>';
			unit+='<td>'+a[i]['kd_perawat']+'</td>';
			unit+='<td>'+a[i]['uraian']+'</td>';
			unit+='</tr>';

			unit+='<tr >';
			unit+='<td colspan="4">';
			unit+='<div class="card" id="divtrkomunikasipengajarankepirna'+a[i]['kd_perawat']+'" >';
			unit+='</div>';
			unit+='</td>';
			unit+='</tr>';

		}
		document.getElementById('tbodydiagnosaperawatirna').innerHTML=unit;

	});
}

function tampildokumentambahan() {
	cekassesmengizi()
	cekedukasi();
	cekcppt();
	cekresume();
	cekrencanapulang();
	document.getElementById('trdokumentambahan').innerHTML='';
	var param ={id_transaksi:document.getElementById("transaksiermirna").value,
	id_kunjungan:document.getElementById("idKunjunganermirna").value,
	id_pegawai:user.id_pegawai,};
	apiPOST('Rekammedisirna/dokumenPasien', param,hasil=>{
		var a=hasil['data'];
		var b=hasil['jawabkonsul'];
		var c=hasil['datainti']
		var unit='';
		var jawab='';
		var no = 0;

		for (var i = 0; i < a.length; i++) {
			var no = no + 1;
			unit+='<tr>'; 
			unit+='<th width="50">'+no+'</th>';
			unit+='<td width="20"><button class="btn btn-primary btn-md" onclick="showdokumen('+a[i]['id_dokumen']+',`'+a[i]['id_kunjungan']+'`,`'+a[i]['id_transaksi']+'`,`'+a[i]['urut']+'`);">show</button></td>';
			unit+='<td>'+a[i]['nama_dokumen']+'</td>';
			unit+='<td></td>';
			unit+='<td><div id="idstatusdok'+a[i]['id_dokumen']+''+a[i]['id_kunjungan']+'"> </div></td>';
			unit+='</tr>';
			cekkelengkapan(a[i]['id_dokumen'],a[i]['id_kunjungan'],a[i]['id_transaksi']);
			
		}

		for (var j = 0; j < b.length; j++) {
			jawab+='<tr>'; 
			jawab+='<th width="50">*</th>';
			jawab+='<td width="20"><button class="btn btn-warning btn-md" onclick="showjawabkonsulirna(`'+b[j]['id_kunjungan']+'`,`'+b[j]['id_transaksi']+'`);">show</button></td>';
			jawab+='<td>Konsultasi Unit</td>';
			jawab+='<td></td>';
			jawab+='<td></td>';
			jawab+='</tr>';
			
		}
		document.getElementById('trkonsulirna').innerHTML=jawab;
		document.getElementById('trdokumentambahan').innerHTML=unit;

	});

}
function cekresume() {
	param={
		id_transaksi:document.getElementById('transaksiermirna').value,
	}
	apiPOST('Rekammedisirna/cekresume', param, hasil => {
		document.getElementById('tableresume').innerHTML=hasil['data'];
	});
}
function cekrencanapulang() {
	param={
		id_transaksi:document.getElementById('transaksiermirna').value,
	}
	apiPOST('Rekammedisirna/cekrencanapulangirna', param, hasil => {
		document.getElementById('tablerencanapulang').innerHTML=hasil['data'];
	});
}
function cekcppt() {
	param={
		id_transaksi:document.getElementById('transaksiermirna').value,
	}
	apiPOST('Rekammedisirna/cekcppt', param, hasil => {
		document.getElementById('tableccpt').innerHTML=hasil['data'];
	});
}
//cekedukasi
function cekedukasi() {
	param={
		id_transaksi:document.getElementById('transaksiermirna').value,
	}
	apiPOST('Rekammedisirna/cekedukasi', param, hasil => {
		document.getElementById('tableedukasi').innerHTML=hasil['data'];
	});
}
function cekassesmengizi() {
	param={
		id_kunjungan:document.getElementById('idKunjunganermirna').value,
	}
	apiPOST('Rekammedisirna/cekassesmengizi', param, hasil => {
		document.getElementById('tableassesmengizi').innerHTML=hasil['data'];
	});
}
function cekkelengkapan($dok,$id_kunjungan=null,$id_transaksi=null) {


	if ($id_kunjungan==null) {
		var $kunjungan=0;
	} else {
		var $kunjungan=$id_kunjungan;
	}
	var param = {
		id_dokumen: $dok,
		id_kunjungan:$kunjungan,
		id_transaksi:$id_transaksi
	};
	apiPOST('Rekammedisirna/kelengkapan', param, hasil => {
		document.getElementById('idstatusdok'+$dok+$id_kunjungan).innerHTML=hasil['data'];
	});
}

  //tampil radiologi
function tampilkeperawatanpenunjangradiologiirna(){

	var barisrmhis = ''; 
	var param = {
		norm: document.getElementById('rmermirna').value,
	};
	apiPOST('Rekammedisirna/datapenunjangradiologipasienirna', param, hasil => {
		if (hasil['code']=="00") {
			var a = hasil['data'];
			for (var i = 0; i < a.length; i++) {
				var tgl = a[i].tgl_rencana_rad.substr(8, 2);
				var bln = a[i].tgl_rencana_rad.substr(5, 2);
				var thn = a[i].tgl_rencana_rad.substr(0, 4);
				tgl_rencana = tgl + '/' + bln + '/' + thn;
				barisrmhis += '<div class="card card-secondary collapsed-card">';
				barisrmhis += '<div class="card-header">';
				barisrmhis += '<span style="font-size: 12px;" class="card-title">Radiologi '+ tgl_rencana +' - '+ a[i]['pengirim']+' '+a[i]['id_kunjungan']+' </span>';
				barisrmhis += '<div class="card-tools">';
				barisrmhis += '<button type="button"  class="btn btn-tool" data-card-widget="collapse" fdprocessedid="smpdqi"><i class="fas fa-plus"></i>';
				barisrmhis += '</button>';
				barisrmhis += '</div>';
				barisrmhis += '</div>';
				barisrmhis += '<div class="card-body">';
				barisrmhis += '<div class="row">';
				barisrmhis += '<div class="col-md-12">';
				barisrmhis += '<p>'+a[i]['hasil_pembacaan']+'</p>';
				barisrmhis += '</div>';
				barisrmhis += '</div>';
				barisrmhis += '</div>';
				barisrmhis += '</div>';
			}
			document.getElementById('listhistoripenunjangradirna').innerHTML = barisrmhis;
		}
	})
}
//tampil penunjang
function tampilpenunjangirna(rm){

	var barisrmhis = ''; 
	var param = {
		norm: rm,
	};
	apiPOST('Rekammedisirna/datapenunjangpasienirna', param, hasil => {
		var a = hasil['data'];
		if (hasil['code'] == 'XX'){
			toastr.error("Data Penunjang Tidak Ditemukan!!");
		}else{
			for (var i = 0; i < a.length; i++) {
				var tgl = a[i].tgl_rencana_lab.substr(8, 2);
				var bln = a[i].tgl_rencana_lab.substr(5, 2);
				var thn = a[i].tgl_rencana_lab.substr(0, 4);
				tgl_rencana_lab = tgl + '/' + bln + '/' + thn;
				barisrmhis += '<div class="card card-secondary collapsed-card">';
				barisrmhis += '<div class="card-header">';
				barisrmhis += '<span style="font-size: 12px;" class="card-title">Labotarium PK '+ tgl_rencana_lab +' - '+ a[i]['pengirim']+' '+a[i]['id_kunjungan_lab']+' </span>';
				barisrmhis += '<div class="card-tools">';
				barisrmhis += '<button type="button"  class="btn btn-tool" data-card-widget="collapse" fdprocessedid="smpdqi"><i class="fas fa-plus"></i>';
				barisrmhis += '</button>';
				barisrmhis += '</div>';
				barisrmhis += '</div>';
				barisrmhis += '<div class="card-body">';
				barisrmhis += '<div class="row">';
				barisrmhis += '<div class="col-md-12">';
				barisrmhis += '<table   class="table table-striped table-sm">';
				barisrmhis += '<thead>';
				barisrmhis += '<tr>';
				barisrmhis += '<th style="width: 15px">#</th>';
				barisrmhis += '<th style="width: 80px"><h3>PEMERIKSAAN</h3></th>';
				barisrmhis += '<th><h3>HASIL</h3></th>';
				barisrmhis += '<th><h3>ACUAN</h3></th>';
				barisrmhis += '</tr>';
				barisrmhis += '</thead>';
				barisrmhis += '<tbody id="bodypenunjanglabirna'+a[i]['id_kunjungan_lab']+'"></tbody>';
				barisrmhis += '</table>';
				barisrmhis += '</div>';
				barisrmhis += '</div>';
				barisrmhis += '</div>';
				barisrmhis += '</div>';
				detaillabermirna(a[i]['id_kunjungan_lab']);
	      // eresep(a[i]['id_kunjungan'],a[i].tgl_masuk,a[i].tgl_masuk);
	      // obatditerima(a[i]['id_kunjungan']);
	      // detailmrpenyakitmedermirja(a[i]['id_kunjungan']);
	      // detailicd9medermirja(a[i]['id_kunjungan']);

			}
		}
		document.getElementById('listhistoripenunjangirna').innerHTML = barisrmhis;
	})
}
function showdokumen(id,id_kunjungan,id_transaksi,urut) {
	switch (id){
	case 26:
		showmodalpengantarrawatinap(id_transaksi);
		break;
	case 22:
		showmodalserahterimarawatinap(id_kunjungan,id_transaksi);
		break;
	case 13:
		showmodalinputpembedahaninap(id_kunjungan,id_transaksi);
		break;
	case 15:
		showmodalinstruksipembedahaninap(id_kunjungan,id_transaksi);
		break;
	case 24:
		showmodalgeneralconcentinap(id_kunjungan,id_transaksi);
		break;
	case 3:
		showpersetujuantindakaninap(id_kunjungan,id_transaksi);
		break;
	case 23:
		showInformasiSedasi(id_kunjungan,id_transaksi);
		break;
	case 25:
		showEfekObatIrna(id_kunjungan,id_transaksi);
		break;
	case 21:
		showAssesmenGizi(id_kunjungan,id_transaksi);
		break;
	case 29:
		showKonsultasiIrna(id_kunjungan,id_transaksi,urut);
		break;


	}
}
function showKonsultasiIrna(id_kunjungan,id_transaksi,urut) {
	document.getElementById('linkassesmenkonsulirna').click();
	var param ={id_transaksi:id_transaksi,
	id_kunjungan:id_kunjungan,
	id_pegawai:user.id_pegawai,
	urut:urut,};
	apiPOST('Rekammedisirna/showkonsulirna', param,hasil=>{
		document.getElementById('selectdpjpkonsultasijawabirna').value=hasil['data']['dpjp_konsul'];
		document.getElementById('keterangantanya').value  	=hasil['data']['keterangan_tanya'];
		document.getElementById('diagnosistanya').value   	=hasil['data']['diagnosis_tanya'];
		document.getElementById('ImgTtdTanyaKonsultasiIrna').src=hasil['data']['ttd_dpjp'];
		document.getElementById('keteranganjawab').value 	=hasil['data']['keterangan_jawab'];
		document.getElementById('diagnosisjawab').value 	=hasil['data']['diagnosis_jawab'];
		document.getElementById('saranjawab').value     	=hasil['data']['saran'];
		document.getElementById('ImgTtdJawabKonsultasiIrna').src=hasil['data']['ttd_dpjp_jawab'];
		document.getElementById('divaksitanyakonsul').style.display='block';
		document.getElementById('divaksijawabkonsul').style.display='block';

	});
}

function showAssesmenGizi(id_kunjungan,id_transaksi) {
	document.getElementById('linkassesmengizi').click();
	var param={id_kunjungan:id_kunjungan,id_transaksi:id_transaksi,}
	apiPOST('Rekammedisirna/showAssesmenGizi', param,hasil=>{
		var a=hasil['data'];
		for (var i = 0; i < a.length; i++) {
	/*		if ($('input[name=assesmenGizikondisiKhusus]:checked').val() == 2) {
				kondisikususket = $('#assesmenGizikondisiKhususket').val();
				kondisikusus = $('input[name=assesmenGizikondisiKhusus]:checked').val();
			} else {
				kondisikusus = $('input[name=assesmenGizikondisiKhusus]:checked').val();
				kondisikususket = document.getElementById('assesmenGizikondisiKhususket').value = "";
			}
			if ($('input[name=assesmenGizipantangan]:checked').val() == 2) {
				pantangan = $('#assesmenGizipantanganket').val();
			} else {
				pantangan = $('input[name=assesmenGizipantangan]:checked').val();
			}
			if ($('input[name=dacriasesmengizi_dkonselinglanjutan]:checked').val() == 2) {
				konsullanjut = $('#tglkonselingassesmenGizi').val();
			} else {
				konsullanjut = $('input[name=dacriasesmengizi_dkonselinglanjutan]:checked').val();
			}
			if ($('input[name=dacriasesmengizi_dkonselingmateri]:checked').val() == 2) {
				konsulmateri = $('#tglkonselingmateriassesmengizi').val();
			} else {
				konsulmateri = $('input[name=dacriasesmengizi_dkonselingmateri]:checked').val();
			}*/

			switch (a[i]['skrining_ahli_gizi']){
			case '1':
				document.getElementById('assesmenGiziskorskrining1').checked='true';
				break;
			case '2':
				document.getElementById('assesmenGiziskorskrining2').checked='true';
				break;
			case '3':
				document.getElementById('assesmenGiziskorskrining2').checked='true';
				break;

			}
			if (a[i]['kondisi_khusus']== 2 || a[i]['kondisi_khusus']== '2') {
				switch(a[i]['kondisi_khusus']){
				case '1':
					document.getElementById('divdacriasesmengizi_div_bkondisikhususId').style.display='none';
					document.getElementById('assesmenGizikondisiKhusus1').checked='true';
					break;
				case '2':
					document.getElementById('divdacriasesmengizi_div_bkondisikhususId').style.display='block';
					document.getElementById('assesmenGizikondisiKhusus2').checked='true';
					break;
				}
				document.getElementById('kondisi_khusus_ket').value =a[i]['kondisi_khusus_ket'];
			}


			document.getElementById('assesmenGiziketAlergi').value             =a[i]['alergi'];
			
			if (a[i]['diet_awal']=='1') {
				document.getElementById('assesmenGizidietawal1').checked='true';
			} else {
				document.getElementById('assesmenGizidietawal1').checked='true';
			}
			if (a[i]['diet_awal']=='1') {
				document.getElementById('assesmenGizidietawal1').checked='true';
			} else {
				document.getElementById('assesmenGizidietawal1').checked='true';
			}


			if (a[i]['tindak_lanjut']=='1') {
				document.getElementById('assesmenGizitindaklajut2').checked='true';
				if (a[i]['pantangan']== 2 || a[i]['pantangan']== '2') {
					switch(a[i]['pantangan']){
					case '1':
						document.getElementById('assesmenGizipantangandiv').style.display='none'
						document.getElementById('assesmenGizipantangan1').checked='true';
						break;
					case '2':
						document.getElementById('assesmenGizipantangandiv').style.display='block'
						document.getElementById('assesmenGizipantangan2').checked='true';
						break;
					}
					document.getElementById('kondisi_khusus_ket').value =a[i]['kondisi_khusus_ket'];
				}
				document.getElementById('makananutama').value   =a[i]['makanan_utama'];
				document.getElementById('selingan').value       =a[i]['selingan'];
				document.getElementById('asupan').value         =a[i]['asupan'];
				document.getElementById('rwytpersonal').value   =a[i]['riwayat_personal'];
				document.getElementById('diagmasalah').value    =a[i]['diagnosa_gizi'];
				document.getElementById('konseling').value      =a[i]['konseling_gizi'];
				document.getElementById('asupanmakanan').value  =a[i]['asupan_makanan'];
				document.getElementById('kebutuhangizi').value  =a[i]['kebutuhan_gizi'];
				document.getElementById('jenisdiet').value      =a[i]['jenis_diet'];
				document.getElementById('caraberi').value       =a[i]['cara_beri'];
				document.getElementById('bentuk').value         =a[i]['bentuk'];
				document.getElementById('evaluasi').value       =a[i]['evaluasi'];
				document.getElementById('konsullanjut').value   =a[i]['konsul_lanjut'];
				document.getElementById('konsulmateri').value   =a[i]['konsul_materi'];
			}else{
				document.getElementById('assesmenGizitindaklajut1').checked='true';
			}
			
			document.getElementById('GambarTtdAssesmenGiziIrna').src =a[i]['ttd'];
			document.getElementById('HasilTtdAssesmenGiziIrna').value=a[i]['ttd'];
		}
	})
}

function showEfekObatIrna(id_kunjungan,id_transaksi) {
	document.getElementById('linkefek_samping_obat_irna').click();
	var param={id_kunjungan:id_kunjungan,id_transaksi:id_transaksi,}
	apiPOST('Rekammedisirna/showEfekPemberianObat', param,hasil=>{
		var a=hasil['data'];
		for (var i = 0; i < a.length; i++) {
			document.getElementById('dacmeso_atgl').value=a[i]['id_penyakit'];
			document.getElementById('selectdacmeso_bwanita').value=a[i]['kondisi_pasien'];
			document.getElementById('dacmeso_bkeluhan').value=a[i]['kondisi_pasien'];
			document.getElementById('selectdacmeso_bsudah').value=a[i]['akhir'];
			document.getElementById('selectdacmeso_bkondisi').value=a[i]['penyerta'];
			document.getElementById('dacmeso_cmanifestasi').value=a[i]['eso_terjadi'];
			document.getElementById('dacmeso_ctgl').value=a[i]['tgl_terjadi'];
			document.getElementById('dacmeso_dtgl').value=a[i]['tgl_sesudah_eso'];
			document.getElementById('selectdacmeso_csudah').value=a[i]['sesudah_eso'];
			document.getElementById('dacmeso_criwayat').value=a[i]['riwayat_eso'];
			document.getElementById('dacmeso_apgartot').value=a[i]['skor'];
			document.getElementById('dacmeso_apgar1').value=a[i]['dacmeso_apgar1'];
			document.getElementById('dacmeso_apgar2').value=a[i]['dacmeso_apgar2'];
			document.getElementById('dacmeso_apgar3').value=a[i]['dacmeso_apgar3'];
			document.getElementById('dacmeso_apgar4').value=a[i]['dacmeso_apgar4'];
			document.getElementById('dacmeso_apgar5').value=a[i]['dacmeso_apgar5'];
			document.getElementById('dacmeso_apgar6').value=a[i]['dacmeso_apgar6'];
			document.getElementById('dacmeso_apgar7').value=a[i]['dacmeso_apgar7'];
			document.getElementById('dacmeso_apgar8').value=a[i]['dacmeso_apgar8'];
			document.getElementById('dacmeso_apgar9').value=a[i]['dacmeso_apgar9'];
			document.getElementById('dacmeso_apgar10').value=a[i]['dacmeso_apgar10'];
			document.getElementById('GambarTtdEfekObatIrna').src=a[i]['ttd'];
		}
	})
}
function showInformasiSedasi(id_kunjungan,id_transaksi) {
	document.getElementById('linkinformasi_anestesi_sedasi').click();
	var param={id_kunjungan:id_kunjungan,id_transaksi:id_transaksi,}
	apiPOST('Rekammedisirna/showInformasiSedasi', param,hasil=>{
		var a=hasil['data'];
		for (var i = 0; i < a.length; i++) {
			document.getElementById('dacinformasisedasi_diagnosa').value=a[i]['id_penyakit'];
			document.getElementById('dacinformasisedasi_atgl').value=a[i]['tgl_input'];
			document.getElementById('dacinformasisedasi_tujuan').value=a[i]['tujuan'];
			document.getElementById('dacinformasisedasi_prognosis').value=a[i]['prognosis'];
			document.getElementById('dacinformasisedasi_risiko').value=a[i]['resiko'];
			document.getElementById('dacinformasisedasi_indikasi').value=a[i]['indikasi'];
			document.getElementById('dacinformasisedasi_dasar').value=a[i]['dasar_diag'];
			switch(a[i]['tata_cara']){
			case "1":
				document.getElementById('dacinformasisedasi_tatacaralist_1').checked='true';
				break;
			case "2":
				document.getElementById('dacinformasisedasi_tatacaralist_2').checked='true';
				break;
			case "3":
				document.getElementById('dacinformasisedasi_tatacaralist_3').checked='true';
				break;
			case "4":
				document.getElementById('dacinformasisedasi_tatacaralist_4').checked='true';
				break;
			}
			switch(a[i]['alternatif']){
			case "1":
				document.getElementById('dacinformasisedasi_alternatiflist_1').checked='true';
				break;
			case "2":
				document.getElementById('dacinformasisedasi_alternatiflist_2').checked='true';
				break;
			case "3":
				document.getElementById('dacinformasisedasi_alternatiflist_3').checked='true';
				break;
			case "4":
				document.getElementById('dacinformasisedasi_alternatiflist_4').checked='true';
				break;
			case "5":
				document.getElementById('dacinformasisedasi_alternatiflist_5').checked='true';
				break;
			case "6":
				document.getElementById('dacinformasisedasi_alternatiflist_6').checked='true';
				break;
			}
			switch(a[i]['tindakan']){
			case "1":
				document.getElementById('dacinformasisedasi_tindakanId_1').checked='true';
				break;
			case "2":
				document.getElementById('dacinformasisedasi_tindakanId_2').checked='true';
				break;
			case "3":
				document.getElementById('dacinformasisedasi_tindakanId_3').checked='true';
				break;
			case "4":
				document.getElementById('dacinformasisedasi_tindakanId_4').checked='true';
				break;
			}
			switch(a[i]['komplikasi']){
			case "1":
				document.getElementById('dacinformasisedasi_komplikasiId_1').checked='true';
				break;
			case "2":
				document.getElementById('dacinformasisedasi_komplikasiId_2').checked='true';
				break;
			case "3":
				document.getElementById('dacinformasisedasi_komplikasiId_3').checked='true';
				break;
			case "4":
				document.getElementById('dacinformasisedasi_komplikasiId_4').checked='true';
				break;
			}
			switch(a[i]['hal_penting']){
			case "1":
				document.getElementById('dacinformasisedasi_penyelamatanlist_1').checked='true';
				break;
			case "2":
				document.getElementById('dacinformasisedasi_penyelamatanlist_2').checked='true';
				break;
			case "3":
				document.getElementById('dacinformasisedasi_penyelamatanlist_3').checked='true';
				break;
			}
		}
	});
}

function showpersetujuantindakaninap(id_kunjungan,id_transaksi) {
	document.getElementById('linkpersetujuantindakan').click();
	var param={id_kunjungan:id_kunjungan,id_transaksi:id_transaksi,}
	apiPOST('Rekammedisirna/showpersetujuantindakaninap', param,hasil=>{
		var a=hasil['data'];
		for (var i = 0; i < a.length; i++) {
			document.getElementById('dacpersetujuantindakan_atgl').value=a[i]['tgl_tindakan'];
			document.getElementById('dacpersetujuantindakan_apjId').value=a[i]['perawat'];
			document.getElementById('dacpersetujuantindakan_bnama').value=a[i]['nama'];
			document.getElementById('dacpersetujuantindakan_hubId').value=a[i]['hub'];
			document.getElementById('dacpersetujuantindakan_bumur').value=a[i]['umur'];
			document.getElementById('dacpersetujuantindakan_balamat').value=a[i]['alamat'];
			document.getElementById('dacpersetujuantindakan_btelp').value=a[i]['telp'];
			document.getElementById('dacpersetujuantindakan_bnoktp').value=a[i]['ktp'];
			document.getElementById('dacpersetujuantindakan_saksi').value=a[i]['saksi'];
			document.getElementById('dacpersetujuantindakan_jenis1').value=a[i]['format'];
			document.getElementById('dacpersetujuantindakan_jenis2').value=a[i]['tindakan'];
			document.getElementById('dacpersetujuantindakan_jenis2ket').value=a[i]['tindakan_ket'];
			document.getElementById('dacpersetujuantindakan_aalasan').value=a[i]['alasan_tindakan'];
		}
	});
}

function showmodalgeneralconcentinap(id_kunjungan,id_transaksi) {
	document.getElementById('link_general_consent').click();
	var param={id_kunjungan:id_kunjungan,id_transaksi:id_transaksi,}
	apiPOST('Rekammedisirna/showmodalgeneralconcentinap', param,hasil=>{
		var a=hasil['data'];
		for (var i = 0; i < a.length; i++) {

			document.getElementById('dacconsent_tgl').value=a[i]['tgl_input'];
			document.getElementById('dacconsent_nama3').value=a[i]['nama_ttd'];
			document.getElementById('dacconsent_alamat').value=a[i]['alamat_ttd'];
			document.getElementById('dacconsent_nohp3').value=a[i]['tlp_ttd'];
			document.getElementById('dacconsent_hubungan3').value=a[i]['hubungan_pasien'];

			document.getElementById('dacconsent_nama1').value=a[i]['lepas_info_nama1'];
			document.getElementById('dacconsent_nohp1').value=a[i]['lepas_info_tlfn1'];
			document.getElementById('dacconsent_hubungan1').value=a[i]['lepas_info_hub1'];

			document.getElementById('dacconsent_nama2').value=a[i]['lepas_info_nama2'];
			document.getElementById('dacconsent_nohp2').value=a[i]['lepas_info_tlfn2'];
			document.getElementById('dacconsent_hubungan2').value=a[i]['lepas_info_hub2'];

			document.getElementById('dacconsent_privasi').value=a[i]['pilihan_privasi'];
			document.getElementById('dacconsent_privasi1').value=a[i]['privasi1'];
			document.getElementById('dacconsent_privasi2').value=a[i]['privasi2'];
		}
	});
}

function showmodalinstruksipembedahaninap() {
	$('.mod_inputpembedahan').load('Kamaroperasi/modInstruksiPembedahan');
	var param={id_kunjungan:id_kunjungan,id_transaksi:id_transaksi,}
	apiPOST('Rekammedisirna/showinstruksipembedahan', param,hasil=>{
		var a=hasil['data'];
		for (var i = 0; i < a.length; i++) {
		}
	});
}
function showmodalinputpembedahaninap(id_kunjungan,id_transaksi) {
	$('.mod_inputpembedahan').load('Kamaroperasi/modInputPembedahan');
	var param={id_kunjungan:id_kunjungan,id_transaksi:id_transaksi,}
	apiPOST('Rekammedisirna/showinputpembedahan', param,hasil=>{
		var a=hasil['data'];
		for (var i = 0; i < a.length; i++) {
			//id_kunjungan
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
			switch(a[i]['penyakit']){
			case "DM":
				document.getElementById('qacbedahemr_penyakitsaatini1').checked='true';
				break;
			case "HIpertensi":
				document.getElementById('qacbedahemr_penyakitsaatini2').checked='true';
				break;
			case "GGK":
				document.getElementById('qacbedahemr_penyakitsaatini3').checked='true';
				break;
			case "NA":
				document.getElementById('qacbedahemr_penyakitsaatini4').checked='true';
				break;
			case "sepsis":
				document.getElementById('qacbedahemr_penyakitsaatini5').checked='true';
				break;

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
			document.getElementById('qacbedahemr_dwaktupencukuran').value= a[i]['waktu_cukur'];
			document.getElementById('qacbedahemr_mandisebelumop').value= a[i]['bowel'];

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
			}

			switch(a[i]['infeksi']){
			case "Kulit":
				document.getElementById('qacbedahemr_penyakitinfeksi1').checked='true';
				break;
			case "Mata":
				document.getElementById('qacbedahemr_penyakitinfeksi2').checked='true';
				break;
			case "Paru":
				document.getElementById('qacbedahemr_penyakitinfeksi3').checked='true';
				break;
			case "Mulut/Gigi":
				document.getElementById('qacbedahemr_penyakitinfeksi4').checked='true';
				break;
			case "THT":
				document.getElementById('qacbedahemr_penyakitinfeksi5').checked='true';
				break;
			case "G1 tract":
				document.getElementById('qacbedahemr_penyakitinfeksi6').checked='true';
				break;

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
				document.getElementById('qacbedahemr_multiprosedure_1').checked='true';
			}
			document.getElementById('qacbedahemr_asascore').value= a[i]['asa'];
			document.getElementById('qacbedahemr_klasifikasiluka').value= a[i]['luka'];
			document.getElementById('qacbedahemr_sirkulasiudaraok').value= a[i]['sirkulasi'];

			if (a[i]['tekanan']=="true" || a[i]['tekanan']==true) {
				document.getElementById('qacbedahemr_tekananudara1').checked='true';
			} else {
				document.getElementById('qacbedahemr_tekananudara1').checked='true';
			}
//suhu
			document.getElementById('qacbedahemr_jumlahstaf').value= a[i]['staff'];
			document.getElementById('qacbedahemr_aircountok').value= a[i]['air_count'];

			if (a[i]['jamur']=="1" || a[i]['jamur']==1) {
				document.getElementById('qacbedahemr_jamurac_1').checked='true';
			} else {
				document.getElementById('qacbedahemr_jamurac_1').checked='true';
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
				document.getElementById('qacbedahemr_sterilisasi_1').checked='true';
			}

			switch(a[i]['desinfeksi']){
			case "1":
				document.getElementById('qacbedahemr_disinfeksikulit1').checked='true';
				break;
			case "2":
				document.getElementById('qacbedahemr_disinfeksikulit2').checked='true';
				break;
			case "4":
				document.getElementById('qacbedahemr_disinfeksikulit3').checked='true';
				break;

			}

			switch(a[i]['alat']){
			case "1":
				document.getElementById('qacbedahemr_indikatorinstrumen1').checked='true';
				break;
			case "2":
				document.getElementById('qacbedahemr_indikatorinstrumen2').checked='true';
				break;
			case "4":
				document.getElementById('qacbedahemr_indikatorinstrumen3').checked='true';
				break;

			}

			if (a[i]['antibiotik']=="1" || a[i]['antibiotik']==1) {
				document.getElementById('qacbedahemr_antibiotiktambahan_1').checked='true';
			} else {
				document.getElementById('qacbedahemr_antibiotiktambahan_2').checked='true';
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
			if (a[i]['patologi']=="1" || a[i]['patologi']==1) {
				document.getElementById('qacbedahemr_jarpart_1').checked='true';
			} else {
				document.getElementById('qacbedahemr_jarpart_2').checked='true';
			}
			if (a[i]['komplikasi']=="1" || a[i]['komplikasi']==1) {
				document.getElementById('qacbedahemr_komplikasi_1').checked='true';
			} else {
				document.getElementById('qacbedahemr_komplikasi_2').checked='true';
			}
			if (a[i]['implant']=="1" || a[i]['implant']==1) {
				document.getElementById('qacbedahemr_implat_1').checked='true';
			} else {
				document.getElementById('qacbedahemr_implat_1').checked='true';
			}

			document.getElementById('qacbedahemr_jeniimplat').value=a[i]['jns_implant'];
			document.getElementById('urai_bedah').value=a[i]['uraian'];
			document.getElementById('qacbedahemr_suhuruang').value= a[i]['suhuruang'];

		}
	});
}
function showmodalserahterimarawatinap(id_kunjungan,id_transaksi){
	$('#ModalSerahTerimaPasienIrna').modal('show');
	var param={id_kunjungan:id_kunjungan,id_transaksi:id_transaksi,}
	apiPOST('Rekammedisirna/serahterimairna', param,hasil=>{
		var a=hasil['data'];
		for (var i = 0; i < a.length; i++) {

			document.getElementById('kondisi_masuk').value 	=a[i]['kondisi_masuk'];
			document.getElementById('indikasi_masuk').value 		=a[i]['indikasi_masuk'];
			document.getElementById('nyeri').value=a[i]['nyeri'];
			document.getElementById('resiko_jatuh').value=a[i]['resiko_jatuh'];
			document.getElementById('terapi').value=a[i]['terapi'];
			document.getElementById('dokter_dpjp').value=a[i]['dokter_dpjp'];
			document.getElementById('dpjpkonsul').value=a[i]['dpjpkonsul'];
			document.getElementById('perawat_serah').value=a[i]['perawat_serah'];
			document.getElementById('terhubung_dpjp').value=a[i]['terhubung_dpjp'];
			document.getElementById('jam_terhubung').value=a[i]['jam_terhubung'];
			document.getElementById('advis_dpjp').value=a[i]['advis_dpjp'];
			document.getElementById('keterangan_advis').value=a[i]['keterangan_advis'];
			document.getElementById('rencana_terapi').value=a[i]['rencana_terapi'];
			document.getElementById('rencana_tindakan').value=a[i]['rencana_tindakan'];
			document.getElementById('diperhatikan').value=a[i]['diperhatikan'];
			document.getElementById('dokter_pemberi').value=a[i]['dokter_pemberi'];


		}
	});
}
function showmodalpengantarrawatinap(id_transaksi){
	$('#ModalPengantarawatinap').modal('show');
	var param={id:id_transaksi,}
	apiPOST('Rekammedisirna/pengantarrawatinap', param,hasil=>{
		var a=hasil['data'];
		for (var i = 0; i < a.length; i++) {
			document.getElementById('tgl_masuk_nginap').value 	=a[i]['tgl_masuk_nginap'];
			document.getElementById('keterangan').value 		=a[i]['keterangan'];
			document.getElementById('keluhan').value=a[i]['keluhan'];
			document.getElementById('rikjang').value=a[i]['rikjang'];
			document.getElementById('diagnosa').value=a[i]['diagnosa'];
			document.getElementById('tindakan_pembedahan').value=a[i]['tindakan_pembedahan'];
			document.getElementById('terapi').value=a[i]['terapi'];
			document.getElementById('dokter_pengirim').value=a[i]['dokter_pengirim'];
			document.getElementById('dokter_dpjp').value=a[i]['dokter_dpjp'];
			document.getElementById('status_emergency').value=a[i]['stat_emergency'];
			document.getElementById('ruangan').value=a[i]['ruangan'];
			document.getElementById('intruksi_dpjp').value=a[i]['intruksi_dpjp'];
			document.getElementById('tgl_buat').value=a[i]['tgl_buat'];

		}
	});
}

function hiddendetaildiagnosaperawatirna(id) {
	document.getElementById('divtrkomunikasipengajarankep'+id+'').style.display='none';
	document.getElementById('idbtndiagnosa'+id+'').style.display='block';
	document.getElementById('idbtnhiddendiagnosa'+id+'').style.display='none';
}

function detaillabermirna(id_kunj) {
	var param={id_kunjungan:id_kunj,};
	apiPOST('Rekammedisirna/detaillaboratorium',param,hasil=>{
		var barisrmhis='';
		var a = hasil['data'];
		if (hasil['code']=="200") { 
			for (var i = 0; i < a.length; i++) {
        //barisrmhis += '<div>'+a[i].nama_obat+''+a[i].jumlah+''+a[i].kd_satuan+'</div>';
				barisrmhis += '<tr>';
				barisrmhis += '<th style="width: 15px">#</th>';
				barisrmhis += '<th >'+a[i].nama_indikator_hasil+'</th>';
				barisrmhis += '<th style="width: 120px">'+a[i].hasil+'</th>';
				barisrmhis += '<th style="width: 120px">'+a[i].nilai_hasil_normal+'</th>';
				barisrmhis += '</tr>';

			}
			document.getElementById('bodypenunjanglabirna'+id_kunj).innerHTML=barisrmhis;
		}
	})
}

function detaildiagnosaperawatirna(id) {
	document.getElementById('divtrkomunikasipengajarankepirna'+id+'').style.display='block';
	document.getElementById('idbtnhiddendiagnosairna'+id+'').style.display='block';
	document.getElementById('idbtndiagnosairna'+id+'').style.display='none';
	var param ={id:id,};
	apiPOST('Kunjungan/detaildiagnosaperawat', param,hasil=>{
		var a=hasil['kode'];
		var unit='';
		unit+='<table >';
		for (var i = 0; i < a.length; i++) {
			unit+='<tr>';
			unit+='<td>#</td>';
			if (a[i]['jenis']==2) {
				unit+='<td><input type="checkbox"  name="dxperawatirna" value="'+a[i]['kd_produk']+'"></td>';
				unit+='<td>'+a[i]['kd_diagnosa_perawat']+'</td>';
				unit+='<td>'+a[i]['uraian']+'</td>';
			} else{
				unit+='<td><strong>'+a[i]['kd_diagnosa_perawat']+'</strong></td>';
				unit+='<td colspan="2"><strong>'+a[i]['uraian']+'</strong></td>';
			}

			unit+='</tr>';

		}
		unit+='</table>';
		unit+='<div><button class="btn btn-primary" type="button" id="btnadddiagperawatirna" onclick="inputdiagnosaperawatirna()">Simpan</button></div>'
		document.getElementById('divtrkomunikasipengajarankepirna'+id+'').innerHTML=unit;
	});
}

function inputdiagnosaperawatirna() 
{
	const btn = document.querySelector('#btnadddiagperawatirna');
	btn.addEventListener('click', (event) => {
		let checkboxes = document.querySelectorAll('input[name="dxperawatirna"]:checked');
		let values = [];
		checkboxes.forEach((checkbox) => {
			values.push(checkbox.value);
		});
		$('#Modaldiagnsoaperawatirna').modal("hide");
		var dataarray=values;
		var param={
			id_kunjungan  	:document.getElementById('idKunjunganermirna').value,
			user            :user.kd_user,
			order_produk    :dataarray,};
			apiPOST('Rekammedisirja/adddiagperawat',param,hasil=>{
				tampilinputdiagnosaperawatirna();
				if (hasil['pesan']=='Berhasil') {
					checkboxes=''; 
					values=[];
				} else {
					checkboxes=''; 
					values=[];
				}
			})
		}); 
}
function tampilinputdiagnosaperawatirna() {
	var param = 
	{
		id_kunjungan  	:document.getElementById('idKunjunganermirna').value,
	};
	apiPOST('Rekammedisirja/ReviewDiagnosaPerawat', param, hasil =>{
		var u='';
		var b=hasil['data'];
		for (var i = 0; i < b.length; i++) {
			u+=b[i].kd_diagnosa_perawat+'|'+b[i].uraian+',';
		}
		document.getElementById('DiagnosaasskepErmIrna').value=u;

	});
}
function pegawai() {
	apiPOST('user/dokter', null,hasil=>{
		var a=hasil['data'];
		var pegawai='';
		for (var i = 0; i < a.length; i++) {
			pegawai+='<option value="'+a[i]['kd_dokter']+'">'+a[i]['nama']+'</option>';
		}
		document.getElementById('dpjpResumeermirna').innerHTML=pegawai;
		document.getElementById('selectdpjpkonsultasijawabirna').innerHTML=pegawai;
	});
}
function perawat() {
	apiPOST('user/perawat', null,hasil=>{
		var a=hasil['data'];
		var pegawai='';
		for (var i = 0; i < a.length; i++) {
			pegawai+='<option value="'+a[i]['kd_dokter']+'">'+a[i]['nama']+'</option>';
		}
		document.getElementById('perawatResumeermirna').innerHTML=pegawai;

	});
}
function tampilpekerjaanperermirna() {
	apiPOST('Data_Sosial/pekerjaan', null,hasil=>{
		var pekerjaan='';
		var a=hasil['data'];
		pekerjaan = ""
		for (var i = 0; i < a.length; i++) {
			pekerjaan+='<option value="'+a[i]['kd_pekerjaan']+'">'+a[i]['pekerjaan']+'</option>';
		}
		
		document.getElementById('pekerjaanAssKeperawatanErmIrna').innerHTML=pekerjaan;
		document.getElementById('pekerjaanermirna').innerHTML=pekerjaan;
	});
}
function tampilagamaperermirna() {
	apiPOST('Data_Sosial/agama', null,hasil=>{
		var agama='';
		var a=hasil['data'];
		agama = ""
		for (var i = 0; i < a.length; i++) {
			agama+='<option value="'+a[i]['kd_agama']+'">'+a[i]['agama']+'</option>';
		}
		document.getElementById('AgamaAssKeperawatanErmIrna').innerHTML=agama;
		document.getElementById('checkAgama').innerHTML=agama;
	});
}
function TambahdiagnosaCpptermirna(){
	$('#ModalTambahdiagnosaCpptErmirna').modal("show");
}
function show_cri_subjek_irna(){
	$('#ModalCariSubjekirna').modal("show");
}
function inputdatasubjekirna() {
	var cekdinamis = document.getElementById('cek_subjek_dinamis_input').value;
	const btn = document.querySelector('#btn');
	btn.addEventListener('click', (event) => {
		let checkboxes1 = document.querySelectorAll('input[name="cek_subjekirna"]:checked');
		let values = [];
		checkboxes1.forEach((checkbox) => {
			values.push(checkbox.value);
		});
		$('#ModalCariSubjekirna').modal("hide");
		if (cekdinamis=='') {
			dataarray=values;
		} else {
			dataarray=values +','+ cekdinamis;
		}

		document.getElementById('subjekermirna').value=dataarray;
	});  
}
function tampilhisrmirna(){
	document.getElementById("loading_rwjpendafhistoryrekammedisirna").style.display = 'block';
	var param = {
		norm:document.getElementById('rmermirna').value,
	};
	apiPOST('Rekammedisirja/datakunjunganhistorirm', param, hasil => {
		var a = hasil['data'];
		$('#listhistorirmkunjunganirna').html('');
		document.getElementById("loading_rwjpendafhistoryrekammedisirna").style.display = 'none';
		for (var i = 0; i < a.length; i++) {
			var tgl = a[i].tgl_masuk.substr(8, 2);
			var bln = a[i].tgl_masuk.substr(5, 2);
			var thn = a[i].tgl_masuk.substr(0, 4);
			tglmasuk = tgl + '/' + bln + '/' + thn;

			var barisrmhis = ''; 
			barisrmhis += '<div class="card card-secondary collapsed-card" style="box-shadow: 0px 0px 0px 3px #000000, 0px 0px 9px 4px #760000;">';
			barisrmhis += '<div class="card-header">';
			barisrmhis += '<span style="font-size: 15px;" class="card-title">Kunjungan '+ tglmasuk +' - '+ a[i]['nama_unit']+' '+a[i]['id_kunjungan']+' </span>';
			barisrmhis += '<div class="card-tools">';
			barisrmhis += '<button type="button" class="btn btn-tool" data-card-widget="collapse" fdprocessedid="smpdqi"><i class="fas fa-plus"></i>';
			barisrmhis += '</button>';
			barisrmhis += '</div>';
			barisrmhis += '</div>';

			barisrmhis += '<div class="card-body">';
			barisrmhis += '<div class="row">';
			barisrmhis += '<div class="card-header p-1">';
			barisrmhis += '<button type="button" class="btn btn-info btn-sm" onclick="assesmendokterhistoriermirna(`'+a[i]['id_kunjungan']+'`,`'+a[i]['id_unit']+'`)"> <i class="fas fa-book-medical"></i> Assesmen Dokter</button> ';
			barisrmhis += '<button type="button" class="btn btn-info btn-sm" onclick="assesmenperawathistoriermirna(`'+a[i]['id_kunjungan']+'`,`'+a[i]['id_unit']+'`)"> <i class="fas fa-book-medical"></i> Assesmen Perawat</button> ';
			barisrmhis += '<button type="button" class="btn btn-info btn-sm" onclick="penunjangmedishistori(event)"> <i class="fas fa-book-medical"></i> Penunjang Medis</button> ';
			barisrmhis += '<button type="button" class="btn btn-info btn-sm" onclick="resumeirna(`'+a[i]['id_kunjungan']+'`,`'+a[i]['id_unit']+'`)"> <i class="fas fa-book-medical"></i> Resume </button> ';  
			barisrmhis += '</div>';

			barisrmhis += '<div class="col-md-12" style="padding-top: 10px;">';  
			barisrmhis += '<div class="info-box mb-0" id="idpanelhistorirm'+a[i]['id_kunjungan']+'">';  
			barisrmhis += 'Silahkan Pilih Button Diatas';
			barisrmhis += '</div>';
			barisrmhis += '</div>';
			barisrmhis += '<div class="col-md-12" style="padding-top: 10px;">';
			barisrmhis += '<div class="info-box mb-0" id="idpanelhistorirmperawat'+a[i]['id_kunjungan']+'">';
			barisrmhis += '</div>';
			barisrmhis += '</div>';

			barisrmhis += '<div class="col-md-12" style="padding-top: 10px;">';
			barisrmhis += '<div class="col-md-12" id="detailsoapimedermirna'+a[i]['id_kunjungan']+'">'; 
			barisrmhis += '</div>';

			barisrmhis += '<h4>Eresep </h4>';
			barisrmhis += '<div class="col-md-12" id="eresephistoriirna'+a[i]['id_kunjungan']+'">'; 
			barisrmhis += '</div>';

			barisrmhis += '<h4>Obat diterima</h4>';
			barisrmhis += '<div class="col-md-12" id="detailobatditerimairja'+a[i]['id_kunjungan']+'">'; 
			barisrmhis += '</div>';

			barisrmhis += '<h4>Penyakit &nbsp;<i class="fas fa-plus" onclick="addmrpenyakitmedermirna()"></i></h4>';
			barisrmhis += '<div class="col-md-12" id="detailmrpenyakitirna'+a[i]['id_transaksi']+'">'; 
			barisrmhis += '</div>';

			barisrmhis += '<h4>Tindakan (ICD-9) &nbsp;<i class="fas fa-plus" onclick="addicd9medermirna(`'+a[i]['id_kunjungan']+'`,`'+a[i]['id_unit']+'`)"></i></h4>';
			barisrmhis += '<div class="col-md-12" id="detailicd9medirja'+a[i]['id_kunjungan']+'">'; 
			barisrmhis += '</div>';

			barisrmhis += '<h4>Status Pulang &nbsp;<i class="fas fa-plus" onclick="tampilmodalstatuspulang(`'+a[i]['id_kunjungan']+'`,`'+a[i]['id_unit']+'`)"></i></h4>';
			barisrmhis += '<div class="col-md-12" id="detailicd9medirja'+a[i]['id_kunjungan']+'">';
			barisrmhis += '</div>';
			barisrmhis += '</div>';
						barisrmhis += '</div>'; //end row
					barisrmhis += '</div>'; //end card-body

				barisrmhis += '</div>'; //end collapsed-card

				detailsoapiirna(a[i]['id_kunjungan']);
				detailmrpenyakitirna(a[i]['id_transaksi']);
				eresepirna(a[i]['id_kunjungan'],a[i].tgl_masuk,a[i].tgl_masuk);
				detailicd9medermirna(a[i]['id_kunjungan']);
				obatditerima(a[i]['id_kunjungan']);
			/*detailsoapi(a[i]['id_kunjungan']);
		      eresep(a[i]['id_kunjungan'],a[i].tgl_masuk,a[i].tgl_masuk);
		      obatditerima(a[i]['id_kunjungan']);
		      detailmrpenyakitmedermirja(a[i]['id_kunjungan']);
		      detailicd9medermirja(a[i]['id_kunjungan']);*/

				$('#listhistorirmkunjunganirna').append(barisrmhis);
			}

		//document.getElementById('listhistorirmkunjunganirna').innerHTML = barisrmhis;
		})
}
function tampilmodalstatuspulang() {
	$('#ModalInputStatusKeluarIrna').modal('show');
}
function insertStatusPulangermirna() {
	var param ={
		id_kunjungan  : $('#idKunjunganermirna').val(),
		statuspulang  : $('#statusPulangassesmenermirna').val(),
		rujukan       : $('#rujukanpasienermirna').val(),
	};
	apiPOST('Rekammedisirna/statuspulangirna', param, hasil => {
		if (hasil['pesan']=='Berhasil') {
			$('#ModalInputStatusKeluarIrja').modal('hide');
			alert('Berhasil');
		}else{
			alert(hasil['pesan']); 
		}
	})
}
function pilihfasilitaskesehatanermirja() {
	var fkt=document.getElementById('statusPulangassesmenermirna').value;
	if (fkt=='03'||fkt=='04'||fkt=='11') {
		document.getElementById('fasilitas_kesehatanermirja').style.display='block';
	} else {
		document.getElementById('fasilitas_kesehatanermirja').style.display='none';
	}
}
function rujukanpasien() {
	var rujukan='';
	var param={res:document.getElementById('tujuanrujukanermirna').value,};
	apiPOST('Kunjungan/carakeluarpasienirja', param, hasil =>{
		var a=hasil['data'];
		for (var i = 0; i < a.length; i++) {
			rujukan+='<option value='+a[i].kd_rujukan+'>'+a[i].rujukan+'</option>';
		}
		document.getElementById('rujukanpasienermrwj').innerHTML=rujukan;
	});

}
//update 21/12/2023
$(document).on('keyup', '#textTambahdiagnosaresumemedErmirja', function(e) {
	if($(this).val() !== '')
	{
		var charCode = e.which || e.keyCode;
		if(charCode == 40)
		{
    //alert('coba');
			penyakittambahresumemedermirja();
		} 
		else if(charCode == 38)
		{
    //alert('coba');
			penyakittambahresumemedermirja();
		}
		else    (charCode == 13)
		{
    //alert('coba');
			penyakittambahresumemedermirja();
		}
	}else{
		document.getElementById("DivTambahdiagnosaresumemedErmirja").innerHTML="";
	}
})

function penyakittambahresumemedermirja() {
	var param ={id:document.getElementById("textTambahdiagnosaresumemedErmirja").value,};
	apiPOST('Kunjungan/icd', param,hasil=>{
		var a=hasil['icd'];
		var unit='';
		for (var i = 0; i < a.length; i++) {
			unit+='<button class="btn btn-primary"  onclick="pilihPenyakittambahresumemedermirja(`'+a[i]['id_penyakit']+'|'+a[i]['penyakit']+'`)">'+a[i]['penyakit']+'</button><br>';
		}
		document.getElementById('DivTambahdiagnosaresumemedErmirja').innerHTML=unit;
	});
}
function pilihPenyakittambahresumemedermirja(kode) {
	var res = kode.split('|');
	var icd = res[0];
	var id_transaksi  	=document.getElementById('transaksiermirna').value;
	var kunjungan=document.getElementById('idKunjunganermirna').value;
	document.getElementById("DivTambahdiagnosaresumemedErmirja").innerHTML="";
	var param={
		rm     :document.getElementById('rmermirna').value,
		unit   :document.getElementById('idunitermirna').value,
		id_transaksi : id_transaksi,
		id_kunjungan :kunjungan,
		kode   :icd,
		stat   :document.getElementById('statusdiagnosairna').value,
	};
	apiPOST('Rekammedisirja/addmrpenyakitirja',param,hasil=>{
		$('#ModalShowaddmrpenyakitmedermirna').modal('hide');
		detailmrpenyakitirna(kunjungan);
	});

}
function addmrpenyakitmedermirna() {
	$('#ModalShowaddmrpenyakitmedermirna').modal('show')
}
function addicd9medermirna(kunjungan,unit) {
	$('#ModalShowaddicd9medermirja').modal('show');
	document.getElementById('kunjunganaddicd9irja').value=kunjungan;
	document.getElementById('unitaddicd9irja').value=unit;
}
function addicd9medermirja() {
	$('#ModalShowaddmrpenyakitmedermirna').modal('show')
}
function obatditerima(id_kunj) {
	var param={id_kunjungan:id_kunj,};
	apiPOST('Rekammedisirja/obatditerimairja',param,hasil=>{
		var barisrmhis='';
		var a = hasil['data'];
		if (hasil['code']=="200") { 
			for (var i = 0; i < a.length; i++) {
				barisrmhis += '<div>'+a[i].nama_obat+''+a[i].jumlah+''+a[i].kd_satuan+'</div>';

			}
			document.getElementById('detailobatditerimairja'+id_kunj).innerHTML=barisrmhis;
		}
	})
}

function detailicd9medermirna(kunjungan){
	var param = {
		kunjungan: kunjungan
	};
	var baris = ''; 
	apiPOST('Rekammedisirna/datamricd9irja', param, hasil => {
		if (hasil['code']=="200") {            
			var x = hasil['data'];
			for (var u = 0; u < x.length; u++) {
				baris += '<div>'+x[u]['kd_icd9']+'|'+x[u]['deskripsi']+'('+x[u]['status']+')&nbsp;<i class="fas fa-times-circle" onclick="deletetindakanmedermirja(`'+x[u]['kd_icd9']+'`)"></i></div>';
			}
			document.getElementById('detailicd9medirja'+kunjungan).innerHTML = baris;
		}
	})
}
/*end update 21/12/2023*/
function eresepirna(id_kunj,tgl_kunj,tglorder) {
	var param={id_kunj:id_kunj,
	tgl_kunj:tgl_kunj,
	tglorder:tglorder,};
	apiPOST('Apotek/getData_historiOrderEresep',param,hasil=>{
		var barisrmhis='';
		var a = hasil['data'];
		for (var i = 0; i < a.length; i++) {
			barisrmhis += '<div>'+a[i].nama_obat+''+a[i].jumlah+''+a[i].kd_satuan+'</div>';
			id_kunj    =a[i].id_kunjungan;
		}
		document.getElementById('eresephistoriirna'+id_kunj).innerHTML=barisrmhis;
	})
}
function detailsoapiirna(idkunjungan){
	var paramsoapi = {
		idkunjungan: idkunjungan
	};
	var barisrmhisd = ''; 
	apiPOST('Rekammedisirja/datakunjunganhistorirmsoapi', paramsoapi, hasil => {
		var x = hasil['data'];
		if (hasil['code']=="200") {            
			for (var u = 0; u < x.length; u++) {
				spo2=x[u]['spo2'];
				saturasi=x[u]['saturasi'];
				nadi=x[u]['nadi'];
				tdarah=x[u]['tekanan_darah'];
				suhu=x[u]['suhu'];
				i   =x[u]['instruksi'];
				s   =x[u]['subjek'];
				o   =x[u]['objek'];
				a   =x[u]['assesmen'];
				p   =x[u]['planning'];
				barisrmhisd += '<div class="card" ><h4>SOAP I</h4>';
				barisrmhisd += '<h4>'+x[u].nama_pegawai+'</h4>';
				barisrmhisd += '<table class="table table-striped table-sm" cellspacing="0" cellpadding="0" border="0">';
				barisrmhisd += '<tr>'
				barisrmhisd += '<td style="width: 5px;">S</td>';
				barisrmhisd += '<td style="width: 5px;">:</td>';
				barisrmhisd += '<td style="width:auto;"><textarea class="form-control">' + x[u]['subjek']+ '</textarea></td>';
				barisrmhisd += '</tr>';
				barisrmhisd += '<tr>';
				barisrmhisd += '<td>O</td>';
				barisrmhisd += '<td>:</td>';
				barisrmhisd += '<td><textarea class="form-control">' + x[u]['objek']+ '</textarea></td>';
				barisrmhisd += '</tr>';
				barisrmhisd += '<tr>';
				barisrmhisd += '<td>A</td>';
				barisrmhisd += '<td>:</td>';
				barisrmhisd += '<td><textarea class="form-control">' + x[u]['assesmen']+ '</textarea></td>';
				barisrmhisd += '</tr>';
				barisrmhisd += '<tr>';
				barisrmhisd += '<td>P</td>';
				barisrmhisd += '<td>:</td>';
				barisrmhisd += '<td><textarea class="form-control">' + x[u]['planning']+ '</textarea></td>';
				barisrmhisd += '</tr>';
				barisrmhisd += '<tr>';
				barisrmhisd += '<td>I</td>';
				barisrmhisd += '<td>:</td>';
				barisrmhisd += '<td><textarea class="form-control">' + x[u]['instruksi']+ '</textarea></td>';
				barisrmhisd += '</tr>';
				barisrmhisd += '<tr>';
				barisrmhisd += '<td>Suhu</td>';
				barisrmhisd += '<td>:</td>';
				barisrmhisd += '<td>' + x[u]['suhu']+ '</td>';
				barisrmhisd += '</tr>';
				barisrmhisd += '<tr>';
				barisrmhisd += '<td >Tekanan Darah</td>';
				barisrmhisd += '<td>:</td>';
				barisrmhisd += '<td>' + x[u]['tekanan_darah']+ '</td>';
				barisrmhisd += '</tr>';
				barisrmhisd += '<tr>';
				barisrmhisd += '<td>Nadi</td>';
				barisrmhisd += '<td>:</td>';
				barisrmhisd += '<td>' + x[u]['nadi']+ '</td>';
				barisrmhisd += '</tr>';
				barisrmhisd += '<tr>';
				barisrmhisd += '<td>Saturasi</td>';
				barisrmhisd += '<td>:</td>';
				barisrmhisd += '<td>' + x[u]['saturasi']+ '</td>';
				barisrmhisd += '</tr>';
				barisrmhisd += '<tr>';
				barisrmhisd += '<td>SpO2</td>';
				barisrmhisd += '<td>:</td>';
				barisrmhisd += '<td>' + x[u]['spo2']+ '</td>';
				barisrmhisd += '</tr>';
				barisrmhisd += '</table><br>';
				barisrmhisd += '<button class="btn btn-primary" onclick="copysoapiermirna(`'+spo2+'`,`'+saturasi+'`,`'+nadi+'`,`'+tdarah+'`,`'+suhu+'`,`'+s+'`,`'+o+'`,`'+a+'`,`'+p+'`,`'+i+'`)">Copy SOAP I</button></div>';
				idkunjungan = x[u]['id_kunjungan'];
			}
			document.getElementById('detailsoapimedermirna'+idkunjungan+'').innerHTML = barisrmhisd;
		}
	})
}
function hitungimtperawatirna() {
	var imt='';
	var num='';
	var a=document.getElementById('tinggiAssPerawatErmIrna').value;
	var b=document.getElementById('bbAssPerawatErmIrna').value;
	var num=a/100;
	imt=b/(num*num);
	document.getElementById('imtAssPerawatErmIrna').value=imt;
}
$(document).on('keyup', '#tinggiAssPerawatErmIrna', function(e) {

	var charCode = e.which || e.keyCode;
	if(charCode == 40)
	{
		hitungimtperawatirna();
	} 
	else if(charCode == 38)
	{
		hitungimtperawatirna();
	}
	else    (charCode == 13)
	{
		hitungimtperawatirna();
	}

})
function hitungimtmedisirna() {
	var imt='';
	var num='';
	var a=document.getElementById('tinggiermirna').value;
	var b=document.getElementById('bbermirna').value;
	var num=a/100;
	imt=b/(num*num);
	document.getElementById('imtermirna').value=imt;
}
$(document).on('keyup', '#tinggiermirna', function(e) {

	var charCode = e.which || e.keyCode;
	if(charCode == 40)
	{
		hitungimtmedisirna();
	} 
	else if(charCode == 38)
	{
		hitungimtmedisirna();
	}
	else    (charCode == 13)
	{
		hitungimtmedisirna();
	}

})
function detailmrpenyakitirna(transaksi){
	var param = {
		transaksi: transaksi
	};

	apiPOST('Rekammedisirna/datamrpenyakitirna', param, hasil => {
		var x = hasil['data'];
		if (hasil['code']=="200") {

			$('#detailmrpenyakitirna'+transaksi).html('');
			for (var u = 0; u < x.length; u++) {
				var barisrmhisd = ''; 
				id          =x[u]['id_penyakit'];
				penyakit    =x[u]['penyakit'];
				barisrmhisd += '<div>'+id+'|'+penyakit+'<i class="fas fa-edit"></i><i class="fas fa-trash-o"></i></div>';

				$('#detailmrpenyakitirna'+transaksi).append(barisrmhisd);
			}

		}
	})
}
function show_modalPermintaanLabIrna() {
	$('#ModalPermintaanLabIrna').modal('show');
}
function show_ModalPermintaanRadIrna() {
	$('#ModalPermintaanRadIrna').modal("show");
}
function showmodalgeneralconsent() {
	$('#dacconsent_diag').modal("show");
}
function showmodalhakkewajiban() {
	$('#dacconsent_diaghk').modal("show");
}
function showmodalsatusehat() {
	$('#dacconsent_diagsatusehat').modal("show");
}
function ermrwjkeperawatanbbturunkgirna() {
	var a=document.getElementById('ermrwjkeperawatanbbturun').value;
	if (a=="2") {
		document.getElementById('ermrwjkeperawatanbbturunkg').style.display='block';
	} else {
		document.getElementById('ermrwjkeperawatanbbturunkg').style.display='none';
	}
}
function historipenyakitermirna() {
	var a='';
	var param = 
	{
		no_rm : $("#rmermirna").val(),};
		apiPOST('Kunjungan/historipenyakit', param, hasil =>{
			var b=hasil['history'];
			for (var i = 0; i < b.length; i++) {
				var no = i+1;
				a+='<tr>';
				a+='<td>' + no + '</td>';
				a+='<td>'+b[i].id_penyakit+'</td>';
				a+='<td>'+b[i].penyakit+'</td>';
				a+='<td>'+b[i].tgl_kunjungan+'</td>';
				a+='</tr>';
			}
			document.getElementById('bodyhistoripenyakitmedirna').innerHTML=a;
/*        document.getElementById('bodyhistoripenyakittreageigd2').innerHTML=a;
document.getElementById('bodyhistoripenyakittreageigd3').innerHTML=a;*/

		});
	}
	function historipenyakitkeluarga() {
		var a='';
		var param = {
			no_rm : $("#rmermirna").val(),};
			apiPOST('Kunjungan/historipenyakitkeluarga', param, hasil =>{
				var b=hasil['history'];
				for (var i = 0; i < b.length; i++) {
					var no = i+1;
					a+='<tr>';
					a+='<td>' + no+ '</td>';
					a+='<td>' + b[i].id_penyakit+ '</td>';
					a+='<td>'+b[i].penyakit+'</td>';
					a+='</tr>';
				}
				document.getElementById('bodyhistoripenyakitkelmedirna').innerHTML=a;
	/*          document.getElementById('bodyhistoripenyakitkeltreageigd2').innerHTML=a;
	document.getElementById('bodyhistoripenyakitkeltreageigd3').innerHTML=a;*/

			});
		}
		function historialergiirna() {
			var a='';
			var param = {
				no_rm : $("#rmermirna").val(),};
				apiPOST('Kunjungan/historialergi', param, hasil =>{
					var b=hasil['history'];
					for (var i = 0; i < b.length; i++) {
						var no = i+1;
						a+='<tr>';
						a+='<td>' + no + '</td>';
						a+='<td>'+b[i].alergi+'</td>';
						a+='</tr>';
					}
					document.getElementById('bodyhistorialergimedirna').innerHTML=a;
/*      document.getElementById('bodyhistorialergitrageigd2').innerHTML=a;
document.getElementById('bodyhistorialergitrageigd3').innerHTML=a;*/

				});
			}
			function showmodaltambahalergiirna() {
				$('#ModalTambahalergiirna').modal('show');
			}
			function savetambahalergiSekarangirna(argument) {
				var param={
					no_rm   :document.getElementById("rmermirna").value,
					id_user :user.id_pegawai,
					alergi  :$('#Modalinputalergiirna').val(),
				};
				apiPOST('Kunjungan/tambahalergi',param,hasil=>{
				})
			}
			function saveGrowhtChart() {
				var param={
					no_rm   		:document.getElementById("rmermirna").value,
					id_pegawai 		:user.id_pegawai,
					id_unit  		:document.getElementById('idunitermirna').value,
					id_transaksi  	:document.getElementById('transaksiermirna').value,
					id_kunjungan  	:document.getElementById('idKunjunganermirna').value,
					bb 				:document.getElementById('cpptbbermirna').value,
					tb 				:document.getElementById('cppttbermirna').value,
					lk 				:document.getElementById('cpptlkermirna').value,
					ll 				:document.getElementById('cpptllermirna').value,
				};
				apiPOST('Rekammedisirna/saveGrowhtChart',param,hasil=>{
				})
			}
			function SimpanKonsultasiDpjpTanyaUpdate() {
				var param={
					no_rm   		:document.getElementById("rmermirna").value,
					id_user 		:user.id_pegawai,
					id_unit  		:document.getElementById('idunitermirna').value,
					id_transaksi  	:document.getElementById('transaksiermirna').value,
					id_kunjungan  	:document.getElementById('idKunjunganermirna').value,
					keterangantanya :document.getElementById("keterangantanya").value,
					diagnosistanya  :document.getElementById("diagnosistanya").value,
					HasilTtdTanyaKonsultasiIrna:document.getElementById("HasilTtdTanyaKonsultasiIrna").value,
					ttd_dpjp_jawab  :document.getElementById('selectdpjpkonsultasijawabirna').value,
				};
				apiPOST('Rekammedisirna/simpankonsultasidpjptanyairna',param,hasil=>{
				})
			}
			function SimpanKonsultasiDpjpJawabUpdate() {
				var param={
					no_rm   		:document.getElementById("rmermirna").value,
					id_user 		:user.id_pegawai,
					id_transaksi 	:document.getElementById('transaksiermirna').value,
					id_unit  		:document.getElementById('idunitermirna').value,
					id_kunjungan 	:document.getElementById('idKunjunganermirna').value,
					keteranganjawab :document.getElementById("keteranganjawab").value,
					diagnosisjawab  :document.getElementById("diagnosisjawab").value,
					saranjawab  	:document.getElementById("saranjawab").value,
					HasilTtdJawabKonsultasiIrna:document.getElementById("HasilTtdJawabKonsultasiIrna").value,
				};
				apiPOST('Rekammedisirna/simpankonsultasidpjpjawabirna',param,hasil=>{
				})
			}
//dacrjasesmenmedisirna_setScore
			function dacrjasesmenmedisirna_setScore(a,b) {
				var data=a;
				var nilai=b;
				if (nilai==1) {
					switch (a){
					case 1:
						document.getElementById('eyeOpenassmedErmIrna').value=1;
						hitunggcsmedirna();
						break;
					case 2:
						document.getElementById('eyeOpenassmedErmIrna').value=2;
						hitunggcsmedirna();
						break;
					case 3:
						document.getElementById('eyeOpenassmedErmIrna').value=3;
						hitunggcsmedirna();
						break;
					case 4:
						document.getElementById('eyeOpenassmedErmIrna').value=4;
						hitunggcsmedirna();
						break;

					}		

				}else if(nilai==2){
//alert(a);
					switch (a){
					case 1:
						document.getElementById('ResponMotorikassmedErmIrna').value=1;
						hitunggcsmedirna();
						break;
					case 2:
						document.getElementById('ResponMotorikassmedErmIrna').value=2;
						hitunggcsmedirna();
						break;
					case 3:
						document.getElementById('ResponMotorikassmedErmIrna').value=3;
						hitunggcsmedirna();
						break;
					case 4:
						document.getElementById('ResponMotorikassmedErmIrna').value=4;
						hitunggcsmedirna();
						break;
					case 5:
						document.getElementById('ResponMotorikassmedErmIrna').value=5;
						hitunggcsmedirna();
						break;

					}
				}else{
					switch (a){
					case 1:
						document.getElementById('responVerbalassmedErmIrna').value=1;
						hitunggcsmedirna();
						break;
					case 2:
						document.getElementById('responVerbalassmedErmIrna').value=2;
						hitunggcsmedirna();
						break;
					case 3:
						document.getElementById('responVerbalassmedErmIrna').value=3;
						hitunggcsmedirna();
						break;
					case 4:
						document.getElementById('responVerbalassmedErmIrna').value=4;
						hitunggcsmedirna();
						break;
					case 5:
						document.getElementById('responVerbalassmedErmIrna').value=5;
						hitunggcsmedirna();
						break;
					case 6:
						document.getElementById('responVerbalassmedErmIrna').value=6;
						hitunggcsmedirna();
						break;
					}

				}
			}
			function hitunggcsmedirna() {
				var a=document.getElementById('eyeOpenassmedErmIrna').value;
				var b=document.getElementById('ResponMotorikassmedErmIrna').value;
				var c=document.getElementById('responVerbalassmedErmIrna').value;
				d=parseInt(a)+parseInt(b)+parseInt(c);
				document.getElementById('skorassesmenmedisErmIrna').value=d;
			}
			function dacrjasesmenkeperawatanirna_setScore(a,b) {
				var data=a;
				var nilai=b;
				if (nilai==1) {
					switch (a){
					case 1:
						document.getElementById('eyeOpenasskepErmIrna').value=1;
						hitunggcsirna();
						break;
					case 2:
						document.getElementById('eyeOpenasskepErmIrna').value=2;
						hitunggcsirna();
						break;
					case 3:
						document.getElementById('eyeOpenasskepErmIrna').value=3;
						hitunggcsirna();
						break;
					case 4:
						document.getElementById('eyeOpenasskepErmIrna').value=4;
						hitunggcsirna();
						break;

					}		

				}else if(nilai==2){
//alert(a);
					switch (a){
					case 1:
						document.getElementById('ResponMotorikasskepErmIrna').value=1;
						hitunggcsirna();
						break;
					case 2:
						document.getElementById('ResponMotorikasskepErmIrna').value=2;
						hitunggcsirna();
						break;
					case 3:
						document.getElementById('ResponMotorikasskepErmIrna').value=3;
						hitunggcsirna();
						break;
					case 4:
						document.getElementById('ResponMotorikasskepErmIrna').value=4;
						hitunggcsirna();
						break;
					case 5:
						document.getElementById('ResponMotorikasskepErmIrna').value=5;
						hitunggcsirna();
						break;
					case 6:
						document.getElementById('ResponMotorikasskepErmIrna').value=6;
						hitunggcsirna();
						break;

					}
				}else{
					switch (a){
					case 1:
						document.getElementById('responVerbalasskepErmIrna').value=1;
						hitunggcsirna();
						break;
					case 2:
						document.getElementById('responVerbalasskepErmIrna').value=2;
						hitunggcsirna();
						break;
					case 3:
						document.getElementById('responVerbalasskepErmIrna').value=3;
						hitunggcsirna();
						break;
					case 4:
						document.getElementById('responVerbalasskepErmIrna').value=4;
						hitunggcsirna();
						break;
					case 5:
						document.getElementById('responVerbalasskepErmIrna').value=5;
						hitunggcsirna();
						break;

					}

				}
			}
			function hitunggcsirna() {
				var a=document.getElementById('eyeOpenasskepErmIrna').value;
				var b=document.getElementById('ResponMotorikasskepErmIrna').value;
				var c=document.getElementById('responVerbalasskepErmIrna').value;
				d=parseInt(a)+parseInt(b)+parseInt(c);
				document.getElementById('skorassesmenkeperawatanErmIrna').value=d;
			}
			function RadXRirna() {
				var a='';
				var param = {kode : 'XR',};
				apiPOST('Lab/produkRad', param, hasil =>{
					var b=hasil['produk'];
					for (var i = 0; i < b.length; i++) {
						a+='<div class="col-md-6">';
						a+='<div class="form-group">';
						a+='<div class="custom-control custom-checkbox ">';
						a+='<input name="lacrequestrademrdiag_test" value="'+b[i].id_produk+'" type="checkbox"  id="lacrequestlabemrdiag_test_'+b[i].id_produk+'" >';
						a+='<label class="form-label" for="lacrequestlabemrdiag_test_'+b[i].id_produk+'" id="lacrequestlabemrdiag_labeltest_'+b[i].id_produk+'">'+b[i].nama_produk+'</label>';
						a+='</div>';
						a+='</div>';
						a+='</div>';
					}
					document.getElementById('paccheckboxlogireqemrdiag_grouptestirna').innerHTML=a;

				});
			}
			function RadULirna() {
				var a='';
				var param = {kode : 'UR',};
				apiPOST('Lab/produkRad', param, hasil =>{
					var b=hasil['produk'];
					for (var i = 0; i < b.length; i++) {
						a+='<div class="col-md-6">';
						a+='<div class="form-group">';
						a+='<div class="custom-control custom-checkbox ">';
						a+='<input name="lacrequestrademrdiag_test" value="'+b[i].id_produk+'" type="checkbox"  id="lacrequestlabemrdiag_test_'+b[i].id_produk+'" >';
						a+='<label class="form-label" for="lacrequestlabemrdiag_test_'+b[i].id_produk+'" id="lacrequestlabemrdiag_labeltest_'+b[i].id_produk+'">'+b[i].nama_produk+'</label>';
						a+='</div>';
						a+='</div>';
						a+='</div>';
					}
					document.getElementById('paccheckboxlogireqemrdiag_grouptestirna_2').innerHTML=a;

				});
			}
			function RadCTScanirna() {
				var a='';
				var param = {kode : 'CT',};
				apiPOST('Lab/produkRad', param, hasil =>{
					var b=hasil['produk'];
					for (var i = 0; i < b.length; i++) {
						a+='<div class="col-md-6">';
						a+='<div class="form-group">';
						a+='<div class="custom-control custom-checkbox ">';
						a+='<input name="lacrequestrademrdiag_test" value="'+b[i].id_produk+'" type="checkbox"  id="lacrequestlabemrdiag_test_'+b[i].id_produk+'" >';
						a+='<label class="form-label" for="lacrequestlabemrdiag_test_'+b[i].id_produk+'" id="lacrequestlabemrdiag_labeltest_'+b[i].id_produk+'">'+b[i].nama_produk+'</label>';
						a+='</div>';
						a+='</div>';
						a+='</div>';
					}
					document.getElementById('paccheckboxlogireqemrdiag_grouptestirna_11').innerHTML=a;

				});
			}
			function LabKimiaKlinisIrna() {
				var a='';
				apiPOST('Lab/produk', null, hasil =>{
					var b=hasil['produk'];
					for (var i = 0; i < b.length; i++) {
						a+='<div class="col-md-6">';
						a+='<div class="form-group">';
						a+='<div class="custom-control custom-checkbox ">';
						a+='<input name="lacrequestlabemrdiag_test" value="'+b[i].id_produk+'" type="checkbox"  id="lacrequestlabemrdiag_test_'+b[i].id_produk+'"  onclick="tambahproduklabermirna(`'+b[i].id_produk+'`,`'+b[i].nama_produk+'`)">';
						a+='<label class="form-label" for="lacrequestlabemrdiag_test_'+b[i].id_produk+'" id="lacrequestlabemrdiag_labeltest_'+b[i].id_produk+'">'+b[i].nama_produk+'</label>';
						a+='</div>';
						a+='</div>';
						a+='</div>';
					}
					document.getElementById('lacrequestlabemrdiag_grouptestirna').innerHTML=a;
				});
			}
			
			$(document).on('keyup', '#cariorderlabermirna', function(e) {
				if($(this).val() !== '')
				{
					var charCode = e.which || e.keyCode;
					if(charCode == 40)
					{
						cariorderlabermirna();
					} 
					else if(charCode == 38)
					{
						cariorderlabermirna();
					}
					else    (charCode == 13)
					{
						cariorderlabermirna();
					}
				}else{
					document.getElementById("DivPenyakitFam").innerHTML="";
				}
			})
			function cariorderlabermirna() {
				var a='';
				var param={produk:document.getElementById('cariorderlabermirna').value,};
				apiPOST('Lab/produklabby', param, hasil =>{
					var b=hasil['produk'];
					for (var i = 0; i < b.length; i++) {
						a+='<div class="col-md-6">';
						a+='<div class="form-group">';
						a+='<div class="custom-control custom-checkbox ">';
						a+='<input name="lacrequestlabemrdiag_test" value="'+b[i].id_produk+'" type="checkbox"  id="lacrequestlabemrdiag_test_'+b[i].id_produk+'" onclick="tambahproduklabermirna(`'+b[i].id_produk+'`,`'+b[i].nama_produk+'`)" >';
						a+='<label class="form-label" for="lacrequestlabemrdiag_test_'+b[i].id_produk+'" id="lacrequestlabemrdiag_labeltest_'+b[i].id_produk+'">'+b[i].nama_produk+'</label>';
						a+='</div>';
						a+='</div>';
						a+='</div>';
					}
					document.getElementById('lacrequestlabemrdiag_grouptestirna').innerHTML=a;

				});
			}
			

			function inputpermohonanlaboratoriumirna() {
				const btn = document.querySelector('#buttonOrderLab');
				btn.addEventListener('click', (event) => {
					let checkboxes = document.querySelectorAll('input[name="lacrequestlabemrdiag_request"]:checked');
					let values = [];
					checkboxes.forEach((checkbox) => {
						values.push(checkbox.value);
					});
					$('#ModalPermintaanLabIrna').modal("hide");
					var dataarray=values;
					var param={
						id_kunjungan    :$('#idKunjunganermirna').val(),
						user            :user.id_user,
						tgl_rencana_lab :$('#tglOrderLab').val(),
						order_produk    :dataarray,};
						apiPOST('Lab/addOrder',param,hasil=>{
							if (hasil['pesan']=='Berhasil') {
								checkboxes=''; 
								values=[];
								document.getElementById('lacrequestlabemrdiag_grouptest_request').innerHTML='';
								LabKimiaKlinis();
							} else {
								checkboxes=''; 
								values=[];
							}
						})
					}); 

			}
			function inputpermohonanRadiologiirna() {
				const btn = document.querySelector('#buttonOrderRad');
				btn.addEventListener('click', (event) => {
					let checkboxes = document.querySelectorAll('input[name="lacrequestrademrdiag_test"]:checked');
					let values = [];
					checkboxes.forEach((checkbox) => {
						values.push(checkbox.value);
					});
					$('#ModalPermintaancheckboxlogiIrja').modal("hide");
					var dataarray=values;
					var param={
						id_kunjungan    :$('#idKunjunganermirna').val(),
						user            :user.id_pegawai,
						tgl_rencana_rad :$('#tglOrderRad').val(),
						order_produk    :dataarray,};
						apiPOST('Radiologi/addOrderRad',param,hasil=>{
							if (hasil['pesan']=='Berhasil') {
								checkboxes=''; 
								values=[];
							} else {
								checkboxes=''; 
								values=[];
							}
						})
					});  
			}
			function tambahproduklabermirna(id_produk,nama) {
				var a='';
				if (id_produk!='') {  
					a+='<div class="col-md-6">';
					a+='<div class="form-group">';
					a+='<div class="custom-control custom-checkbox ">';
					a+='<input name="lacrequestlabemrdiag_request" value="'+id_produk+'" type="checkbox"  id="lacrequestlabemrdiag_test_'+id_produk+'" checked >';
					a+='<label class="form-label" for="lacrequestlabemrdiag_request_'+id_produk+'" id="lacrequestlabemrdiag_labelrequest_'+id_produk+'">'+nama+'</label>';
					a+='</div>';
					a+='</div>';
					a+='</div>';
				} 
				$('#lacrequestlabemrdiag_grouptest_requestirna').append(a);
			}
/*function erekammedisRWJ_show_ermeresepIrna(){  
	var ermjson_data = {
		'id_kunjOrdEresep' : $('#idKunjunganermirna').val(),
		'tgl_kunjOrdEresep': nowday,
		'nowdayOrdEresep'  : nowday,
		'no_rmOrdEresep'   : $('#rmermirna').val(),
		'namaOrdEresep'    : $('#namaermirna').val().replace(/ /g, '%20'),
		'alamatOrdEresep'  : '',
		'umurOrdEresep'    : '',
		'alamatOrdEresep'  : alamatpasien.replace(/ /g, '%20'),
		'umurOrdEresep'    : tgllahir.replace(/ /g, '%20'),
		'penjaminOrdEresep': '',
		'sepOrdEresep'     : '',
		'telpOrdEresep'    : '',
		'idunitOrdEresep'  : $('#idunitermirna').val(),
		'unitOrdEresep'    : $('#unitermirna').val().replace(/ /g, '%20'),
		'eresepRWJOrdEresep': 'ERM_IRNA',
		'rekammedis'		: 'rekammedisIrna_eresepIrna_content',
		'rekammedis_prev'  : 'rekammedisIrna_eresepIrna_preview'
	};

	var ERMmyJSON = JSON.stringify(ermjson_data);
	$('.rekammedisIrna_eresepIrna_content').load('Apotek/erm_eresepGabung?data='+ERMmyJSON); // KE TAMPILAN ERESEP ERM
}*/

			function erekammedisRWJ_show_ermeresepIrna(){  
				var eresepIdKunj 	= $('#idKunjunganermirna').val();
				var eresepNorm 		= $('#rmermirna').val();
				var eresepNmPasien 	= $('#namaermirna').val();
				var eresepAlamat 	= alamatpasien;
				var eresepTglLahir  = tgllahir;
				var eresepIdUnit  	= $('#idunitermirna').val();
				var eresepNmUnit    = $('#unitermirna').val();

				if (eresepIdKunj == ''){
					toastr.error('Id Kunjungan Tidak Diketahui!!');
					return;
				}else if (eresepNorm == ''){
					toastr.error('No RM Tidak Diketahui!!');
					return;
				}else if ((eresepNmPasien == '')||(eresepNmPasien == undefined)){
					toastr.error('Nama Pasien Tidak Diketahui!!');
					return;
				}else if ((eresepAlamat == '')||(eresepAlamat == undefined)){
					toastr.error('Alamat Tidak Diketahui!!');
					return;
				}else if (eresepTglLahir == ''){
					toastr.error('Tgl Lahir Pasien Tidak Diketahui!!');
					return;
				}else if ((eresepIdUnit == '')||(eresepNmUnit == '')||(eresepNmUnit == undefined)){
					toastr.error('Unit Tidak Diketahui!!');
					return;
				}

				var ermjson_data = {
					'id_kunjOrdEresep' 	: eresepIdKunj,
					'tgl_kunjOrdEresep'	: nowday,
					'nowdayOrdEresep'  	: nowday,
					'no_rmOrdEresep'   	: eresepNorm,
					'namaOrdEresep'    	: eresepNmPasien.replace(/ /g, '%20'),
					'alamatOrdEresep'  	: '',
					'umurOrdEresep'    	: '',
					'alamatOrdEresep'  	: eresepAlamat.replace(/ /g, '%20'),
					'umurOrdEresep'    	: tgllahir.replace(/ /g, '%20'),
					'penjaminOrdEresep'	: '',
					'sepOrdEresep'     	: '',
					'telpOrdEresep'    	: '',
					'idunitOrdEresep'  	: eresepIdUnit,
					'unitOrdEresep'    	: eresepNmUnit.replace(/ /g, '%20'),
					'eresepRWJOrdEresep': 'ERM_IRNA',
					'rekammedis'		: 'rekammedisIrna_eresepIrna_content',
					'rekammedis_prev'  	: 'rekammedisIrna_eresepIrna_preview'
				};

				var ERMmyJSON = JSON.stringify(ermjson_data);
	$('.rekammedisIrna_eresepIrna_content').load('Apotek/erm_eresepGabung?data='+ERMmyJSON); // KE TAMPILAN ERESEP ERM
}

function refresh_listpasienermirna() {
	$('#listpasienermirna_loadingawal').hide();
}
function showModalSoapIrna() {
	$('#ModalInputSoapErmIrna').modal('show');
}

function viewtandavitalirna(){
	document.getElementById("erekammedisRWJ_loading").style.display = 'block';
	var param = {
		id_transaksi: document.getElementById('transaksiermirna').value,
	};

	apiPOST('Rekammedisirna/viewtandavital', param, hasil => {
		document.getElementById("erekammedisRWJ_loading").style.display = 'none';
		var x = hasil['data']; 
		//assesmen dokter
		document.getElementById('KeadaanUmumAssMedirna').value = x.keadaan_umum;
		document.getElementById('respirasiAssMedirna').value = x.respirasi;
		document.getElementById('nadiAssMedirna').value = x.nadi;
		document.getElementById('Spo2AssMedirna').value = x.spo2;
		document.getElementById('pupilkiriAssMedirna').value = x.pupil_kiri;
		document.getElementById('pupilkananAssMedirna').value = x.pupil_kanan;
		document.getElementById('tekananDarahermirna1').value = x.tekanan_darah1;
		document.getElementById('tekananDarahermirna2').value = x.tekanan_darah2;
		document.getElementById('palpasiermirna').value = x.palpasi;
		document.getElementById('suhuermirna').value = x.suhu;
		document.getElementById('bbermirna').value = x.bb;
		document.getElementById('tinggiermirna').value = x.tinggi_badan;
		document.getElementById('imtermirna').value = x.imt;
		document.getElementById('reflekCahayaKiriermirna').value=x.reflek_cahaya_kiri;
		document.getElementById('reflekCahayaKananermirna').value=x.reflek_cahaya_kanan;
	})
}
function viewtandavitalirnakep() {
	document.getElementById("assesmentperawatanirna_loading").style.display = 'block';
	var param = {
		id_transaksi: document.getElementById('transaksiermirna').value,
	};

	apiPOST('Rekammedisirna/viewtandavital', param, hasil => {
		document.getElementById("assesmentperawatanirna_loading").style.display = 'none';
		var x = hasil['data']; 
		//assesmen dokter
		document.getElementById('KeadaanUmumAssPerawatErmIrna').value = x.keadaan_umum;
		document.getElementById('respirasiAssPerawatErmIrna').value = x.respirasi;
		document.getElementById('nadiAssPerawatErmIrna').value = x.nadi;
		document.getElementById('Spo2AssPerawatErmIrna').value = x.spo2;
		document.getElementById('pupilkiriAssPerawatErmIrna').value = x.pupil_kiri;
		document.getElementById('pupilkananAssPerawatErmIrna').value = x.pupil_kanan;
		document.getElementById('tekananDarahAssPerawatErmIrna1').value = x.tekanan_darah1;
		document.getElementById('tekananDarahAssPerawatErmIrna2').value = x.tekanan_darah2;
		document.getElementById('palpasiAssPerawatErmIrna').value = x.palpasi;
		document.getElementById('suhuAssPerawatErmIrna').value = x.suhu;
		document.getElementById('bbAssPerawatErmIrna').value = x.bb;
		document.getElementById('tinggiAssPerawatErmIrna').value = x.tinggi_badan;
		document.getElementById('reflekCahayaKiriAssPerawatErmIrna').value = x.reflek_cahaya_kiri;
		document.getElementById('reflekCahayaKananAssPerawatErmIrna').value = x.reflek_cahaya_kanan;
		document.getElementById('imtAssPerawatErmIrna').value =x.imt;
		
	})
}
function detailewsermrina(){
	var paramsoapi = {
		id_transaksi: document.getElementById('transaksiermirna').value,
	};
	var baristensi = '';
	var barissuhu = '';
	var barisnadi = '';
	var barissaturasi = '';
	var barisspo = '';
	var baristgl = '';
	apiPOST('Rekammedisirna/dataewsirna', paramsoapi, hasil => {

		baristgl      +='<td style="width:10px;">Tanggal</td>';
		baristensi    +='<td style="width:10px;">Tensi</td>';
		barissuhu     +='<td style="width:10px;">Suhu</td>';
		barisnadi     +='<td style="width:10px;">Nadi</td>';
		barissaturasi +='<td style="width:10px;">Saturasi</td>';
		barisspo      +='<td style="width:10px;">SpO2</td>';

		var x = hasil['data'];

		if (hasil['code']=="200") {            
			for (var u = 0; u < x.length; u++) {
				if (x[u].suhu >= '40' || x[u].suhu >= 40) {
					warna='background-color:red';
				} else{
					warna='';
				}
				baristgl     +='<td style="width:10px;">'+x[u].tgl_input+'</td>';
				baristensi    +='<td style="width:10px;">'+x[u].tekanan_darah1+'/'+x[u].tekanan_darah2+'</td>';
				barissuhu     +='<td style="width:10px;'+warna+';">'+x[u].suhu+'</td>';
				barisnadi     +='<td style="width:10px;">'+x[u].nadi+'</td>';
				barissaturasi +='<td style="width:10px;">'+x[u].saturasi+'</td>';
				barisspo      +='<td style="width:10px;">'+x[u].spo2+'</td>';
			}

			document.getElementById('listtgl').innerHTML = baristgl;
			document.getElementById('listtensi').innerHTML = baristensi;
			document.getElementById('listtensuhu').innerHTML = barissuhu;
			document.getElementById('listnadi').innerHTML = barisnadi;
			document.getElementById('listsaturasi').innerHTML = barissaturasi;
			document.getElementById('listspo').innerHTML = barisspo;
		}
	})
}
function detailsoapiermrina(){
	var paramsoapi = {
		norm: document.getElementById('rmermirna').value,
		id_transaksi:document.getElementById('transaksiermirna').value,
	};
	var barisrmhisd = ''; 
	apiPOST('Rekammedisirna/datakunjunganhistorirmsoapiirna', paramsoapi, hasil => {
		var x = hasil['data'];
		if (hasil['code']=="200") {            
			for (var u = 0; u < x.length; u++) {
				spo2=x[u]['nafas'];
				saturasi=x[u]['saturasi'];
				nadi    =x[u]['nadi'];
				tdarah  =x[u]['tekanan_darah'];
				suhu  	=x[u]['suhu'];
				i   		=x[u]['instruksi'];
				s   		=x[u]['subject'];
				o   		=x[u]['object'];
				a   		=x[u]['assusment'];
				p   		=x[u]['planing'];
				id   		=x[u]['id'];
				barisrmhisd += '<div class="card" style="padding-left:10px"><h2>SOAP I</h2>';
				barisrmhisd += '<div ><p><strong><label style="font-size: 24px;">PPA '+x[u].full_name+', Jam Pelayanan '+x[u].jam_soap+' WIB</label"></strong></p><p style="font-size:20px;" >Tekanan darah : '+ x[u]['t_darah']+ '/' +x[u]['t_darah_bawah']+ ' nadi : '+nadi+' suhu : '+suhu+' nafas : '+spo2+' saturasi : '+saturasi+'</p><p style="font-size: 20px;"><strong><label > S :</strong>'+s+'</p><p style="font-size: 20px;"><strong><label> O :</strong>'+o+'</p><p style="font-size: 20px;"><strong><label > A :</strong>'+a+'</p><p style="font-size: 20px;"><strong><label> P  :</strong>'+p+'</p><p style="font-size: 20px;"><strong><label"> I :</strong>'+i+'</p>';
				barisrmhisd += '<button class="btn btn-primary" onclick="copysoapiermirna(`'+spo2+'`,`'+saturasi+'`,`'+nadi+'`,`'+tdarah+'`,`'+suhu+'`,`'+s+'`,`'+o+'`,`'+a+'`,`'+p+'`,`'+i+'`)">Copy SOAP I</button>&nbsp;<button class="btn btn-primary" onclick="updatesoapiermirna(`'+spo2+'`,`'+saturasi+'`,`'+nadi+'`,`'+tdarah+'`,`'+suhu+'`,`'+s+'`,`'+o+'`,`'+a+'`,`'+p+'`,`'+i+'`,`'+x[u].jam_soap+'`)">Update SOAP I</button> </div><br></div><br>';

				idkunjungan = x[u]['id_kunjungan'];
			}
			document.getElementById('detailcpptermirna').innerHTML = barisrmhisd;
		}
	})
}
function copysoapiermirna(spo2=null,saturasi=null,nadi=null,darah=null,suhu=null,s=null,o=null,a=null,p=null,i=null) {

	document.getElementById('subjekermirna').value   =s;
	document.getElementById('caridiagnosacpptmedisirna').value =a;
	document.getElementById('objekermirna').value    =o;
	document.getElementById('cpptSpo2ermirna').value=spo2;
	document.getElementById('cpptsaturasiermirna').value=saturasi;
	document.getElementById('cpptnadiermirna').value=nadi;
	document.getElementById('cpptsuhuermirna').value=suhu;
	document.getElementById('cppttekanandarahermirna').value=darah;
	document.getElementById('intervensiermirna').value =p;
	document.getElementById('instruksiermirna').value =i;
	$('#ModalInputSoapErmIrna').modal('show');
	document.getElementById('btnsavesoapirna').style.display='block';
	document.getElementById('btnupdatesoapirna').style.display='hide';
}
function updatesoapiermirna(spo2,saturasi,nadi,darah,suhu,s,o,a,p,i,jam) {

	//document.getElementById('idsoapirna').value   =id; 
	var jamupdatesoap=jam;
	document.getElementById('subjekermirna').value   =s;
	document.getElementById('caridiagnosacpptmedisirna').value =a;
	document.getElementById('objekermirna').value    =o;
	document.getElementById('cpptSpo2ermirna').value=spo2;
	document.getElementById('cpptsaturasiermirna').value=saturasi;
	document.getElementById('cpptnadiermirna').value=nadi;
	document.getElementById('cpptsuhuermirna').value=suhu;
	document.getElementById('cppttekanandarahermirna').value=darah;
	document.getElementById('intervensiermirna').value =p;
	document.getElementById('instruksiermirna').value =i;
	$('#ModalInputSoapErmIrna').modal('show');
	document.getElementById('btnsavesoapirna').style.display='hide';
	document.getElementById('btnupdatesoapirna').style.display='block';
}
$(document).on('keyup', '#textTambahdiagnosaresumeermirna', function(e) {
	if($(this).val() !== '')
	{
		var charCode = e.which || e.keyCode;
		if(charCode == 40)
		{
			penyakittambahirnamedis();
		} 
		else if(charCode == 38)
		{
			penyakittambahirnamedis();
		}
		else    (charCode == 13)
		{
			penyakittambahirnamedis();
		}
	}else{
		document.getElementById("DivTambahdiagnosaresumeermirna").innerHTML="";
	}
})
function penyakittambahirnamedis() {
	var param ={id:document.getElementById("textTambahdiagnosaresumeermirna").value,};
	apiPOST('Kunjungan/icd', param,hasil=>{
		var a=hasil['icd'];
		var unit='';
		for (var i = 0; i < a.length; i++) {
			unit+='<button class="btn btn-primary"  onclick="pilihPenyakittambahresumeirna(`'+a[i]['id_penyakit']+'|'+a[i]['penyakit']+'`)">'+a[i]['penyakit']+'</button><br>';
		}
		document.getElementById('DivTambahdiagnosaresumeermirna').innerHTML=unit;
	});
}
function pilihPenyakittambahresumeirna(kode) {
	var res = kode.split('|');
	var icd = res[0];
	var kunjungan =document.getElementById('idKunjunganermirna').value;
	var a=document.getElementById("textTambahdiagnosaresumeermirna").value;
	var param={
		rm     :document.getElementById('rmermirna').value,
		unit   :document.getElementById('idunitermirna').value,
		id_kunjungan :document.getElementById('idKunjunganermirna').value,
		kode   :icd,
		stat   :2,
	};
	apiPOST('Rekammedisirja/addmrpenyakitirja',param,hasil=>{
		$('#ModalTambahdiagnosaresumeermirna').modal('hide');

		detailicd10resumeirna(kunjungan);
	});
}
function autocomplateresumeirna() {
	//caramasuk();
	keadaanumum();
	carakeluar();
	pegawai();
	perawat();
	var date = new Date();
	var day = date.getDate();
	var month = date.getMonth() + 1;
	var year = date.getFullYear();

	if (month < 10) month = "0" + month;
	if (day < 10) day = "0" + day;

	var tgl       = year + "-" + month + "-" + day;  
	var kunjungan =document.getElementById('idKunjunganermirna').value;
	var rm        =document.getElementById('rmermirna').value;
	var unit      =document.getElementById('idunitermirna').value;
	var param={
		id_kunjungan:document.getElementById('idKunjunganermirna').value,
		transaksi:document.getElementById('transaksiermirna').value,

	};
	apiPOST('Rekammedisirna/cekresumeirna',param,hasil=>{
		if (hasil['code']==201) {
			detailsoapiakhir(kunjungan);
			ReviewAssesmenErmIrjaakhir(rm,unit);
		}
	});
}
/*    eresepakhir(kunjungan,tgl,tgl);
    detailmrpenyakitmedermirjaakhir(kunjungan);
    detailicd9medermirjaakhir(kunjungan);*/
function detailsoapiakhir(idkunjungan){
	var paramsoapi = {
		idkunjungan: idkunjungan,
		user       : user.kd_user,
		id_transaksi:document.getElementById('transaksiermirna').value,
	};
	var barisrmhisd = ''; 
	apiPOST('Rekammedisirna/datakunjunganhistorirmsoapiresume', paramsoapi, hasil => {
		if (hasil['code']=="200") {            
			var x = hasil['data'];
			spo2=x['spo2'];
			document.getElementById('RespirasiResumeermirna').value=x['saturasi'];
			document.getElementById('nadiResumeermirna').value=x['nadi'];
			document.getElementById('tensiResumeermirna').value=x['tekanan_darah'];
			document.getElementById('SuhuResumeermirna').value=x['suhu'];
			document.getElementById('InstruksiResumeermirna').value   =x['instruksi'];
			s   =x['subjek'];
			o   =x['objek'];
			document.getElementById('DiagnosisResumeermirna').value=x['assesmen'];
			document.getElementById('InstruksiResumeErmIrna').value   =x['planning'];
		}
	})
}
function ReviewAssesmenErmIrjaakhir(rm,unit){
	document.getElementById('TerapiResumeermirna').value='';
	var a='';
	var param = 
	{
		rm : rm,
		unit :unit,
		id_kunjungan:document.getElementById('idKunjunganermirna').value,
		id_transaksi:document.getElementById('transaksiermirna').value,
	};
	apiPOST('Rekammedisirna/ReviewResumeIrna', param, hasil =>{
		var d='';
		//var b=hasil['data1'];
		//var c=hasil['data2'];
		var obat=hasil['obat'];
		if (hasil['code']==200 || hasil['code']=='200') {
			// document.getElementById("PemeriksaanFisikResumeermirna").value=b['kepala']+','+b['mata']+','+b['tht']+','+b['leher']+','+b['mulut']+','+b['thoraks']+','+b['jantung']+','+b['paru']+','+b['abdomen']+','+b['genitalia'];
			// document.getElementById('CaraKeluarResumeermirna').value=c['cara_masuk']+' '+c['rujukan'];
			for (var i = 0; i < obat.length; i++) {
				d+=obat[i]['nama_obat']+' '+obat[i]['jml_out']+', ';
			}
			document.getElementById('TerapiResumeermirna').value=d;
		}

	});
}
/*function listpasienermirna(){  
	var listParam = [
		'searchPxERMrwj', 'RWJERM_nm_pasiencari'
		];
	var param = {
		user    : user['id_user'],
		norm    : document.getElementById('searchPxRmlistermirna').value,
		tgl     : document.getElementById('tglcariirna').value
	};
	apiPOST("Rekammedisirna/listpasien", param, hasil => {   
		$('#listpasienermirna').html('');
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

				$('#listpasienermirna').append(Baris);
				//document.getElementById('searchPxRmlistermirna').value = '';
				//document.getElementById('RWJERMnmlistermirna').value = '';
			}else{
				var Baris = "";
				var a = hasil['data'];
				for (var i = 0; i < a.length; i++) {
					var tglkunj   = a[i].tgl_masuk;
					var transaksi = a[i].id_transaksi;
					var norm      = a[i].no_rm;
					var nama      = a[i].nama.replace(/'/g, '');
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
					var id_pegawai = a[i].id_pegawai;
					var jam_masuk = a[i].jam_masuk.substring(0, 16);
					if (nama.length > 18){
						namax  = nama.substring(0, 18)+'...';
					}else{
						namax  = nama;
					}

					if (alamat.length > 30){
						alamatx = alamat.substring(0, 30)+'...';
					}else{
						alamatx = alamat;
					}

					Baris += '<div class="col-sm-3">';
					if (soap>''){
						Baris += '<div class="small-box btn-info" style="border: solid 2px darkblue;">';
					}else{
						Baris += '<div class="small-box btn-secondary-default" style="border: solid 2px #a8d4da; margin-bottom: 5px !important;">';
					}


					Baris += '<div class="inner p-1">';
					Baris += '<h6><strong>'+norm+'</strong> / '+ namax +'</h6>';
					Baris += '<p class="p-0 mb-1" style="font-size:12px;">'+alamatx+'</p>';
					Baris += '<p class="p-0" style="font-size:12px;"><strong><i>'+unit+'</i></strong></p>';
					Baris += '<p class="p-0 mb-1" style="font-size:14px; text-align: center;"><i class="fa fa-clock"></i> '+jam_masuk+'</p>';
					Baris += '</div>';
					Baris += '<div class="icon">';
					Baris += '<i class="fa fa-user"></i>';
					Baris += '</div>';
					Baris += '<a href="#" class="small-box-footer" style="background-color: #a8d4da; color: black;" onclick="tampilPasienermirna('+"'"+norm+"','"+unit+"','"+kunjungan+"','"+id_unit+"','"+nama+"','"+transaksi+"','"+tgl_lahir+"','"+alamat+"','"+id_pegawai+"'"+')" style="cursor:pointer;">Klik Disini <i class="fas fa-arrow-circle-right"></i></a>';
					Baris += '</div>';
					Baris += '</div>';
				}
				$('#listpasienermirna').append(Baris);
			}       
		}
	});  
};*/

/*function searchpxirnaby(){
	if (document.getElementById('searchPxRmlistermirna').value == ''){
		var norm = '000';
	}else{
		var norm = document.getElementById('searchPxRmlistermirna').value;
	}

	var listParam = [
		'searchPxERMrwj', 'RWJERM_nm_pasiencari'
		];
	var param = {
		user    : user['id_user'],
		norm    : norm,
		tgl     : document.getElementById('tglcariirna').value
	};
	apiPOST("Rekammedisirna/listpasienby", param, hasil => {   
		$('#listpasienermirna').html('');
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

				$('#listpasienermirna').append(Baris);
				//document.getElementById('searchPxRmlistermirna').value = '';
				//document.getElementById('RWJERMnmlistermirna').value = '';
			}else{
				var Baris = "";
				var a = hasil['data'];
				for (var i = 0; i < a.length; i++) {
					var tglkunj   = a[i].tgl_masuk;
					var transaksi = a[i].id_transaksi;
					var norm      = a[i].no_rm;
					var nama      = a[i].nama.replace(/'/g, '');
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
					var id_pegawai = a[i].id_pegawai;
					var jam_masuk = a[i].jam_masuk.substring(0, 16);
					if (nama.length > 18){
						namax  = nama.substring(0, 18)+'...';
					}else{
						namax  = nama;
					}

					if (alamat.length > 30){
						alamatx = alamat.substring(0, 30)+'...';
					}else{
						alamatx = alamat;
					}

					Baris += '<div class="col-sm-3">';
					if (soap>''){
						Baris += '<div class="small-box btn-info" style="border: solid 2px darkblue;">';
					}else{
						Baris += '<div class="small-box btn-secondary-default" style="border: solid 2px #a8d4da; margin-bottom: 5px !important;">';
					}


					Baris += '<div class="inner p-1">';
					Baris += '<h6><strong>'+norm+'</strong> / '+ namax +'</h6>';
					Baris += '<p class="p-0 mb-1" style="font-size:12px;">'+alamatx+'</p>';
					Baris += '<p class="p-0" style="font-size:12px;"><strong><i>'+unit+'</i></strong></p>';
					Baris += '<p class="p-0 mb-1" style="font-size:14px; text-align: center;"><i class="fa fa-clock"></i> '+jam_masuk+'</p>';					
					Baris += '</div>';
					Baris += '<div class="icon">';
					Baris += '<i class="fa fa-user"></i>';
					Baris += '</div>';
					Baris += '<a href="#" class="small-box-footer" style="background-color: #a8d4da; color: black;" onclick="tampilPasienermirna('+"'"+norm+"','"+unit+"','"+kunjungan+"','"+id_unit+"','"+nama+"','"+transaksi+"','"+tgl_lahir+"','"+alamat+"','"+id_pegawai+"'"+')" style="cursor:pointer;">Klik Disini <i class="fas fa-arrow-circle-right"></i></a>';
					Baris += '</div>';
					Baris += '</div>';
				}
				$('#listpasienermirna').append(Baris);
			}       
		}
	});  
};
*/

/*$(document).on('keyup', '#searchPxRmlistermirna', function(e) {
	if($(this).val() !== '')
	{
		var charCode = e.which || e.keyCode;
		if(charCode == 40)
		{
			searchpxirnaby();
		} 
		else if(charCode == 38)
		{
			searchpxirnaby();
		}
		else    (charCode == 13)
		{
			searchpxirnaby();
		}
	}else{
		document.getElementById("DivPenyakitFam").innerHTML="";
	}
})*/
/*
function listpasienermirna(){  
    //setTimeout($('#listpasienermirna_loadingawal').hide(),1000);
    getUnitRI();
	var listParam = [
		'searchPxERMrwj', 'RWJERM_nm_pasiencari'
		];
	var param = {
		user    	: user['id_user'],
		pegawai    	: user['id_pegawai'],
		norm    	: document.getElementById('cri_by_norm_listermirna').value,
        nmapasien 	: document.getElementById('cri_by_nmpasien_listermirna').value,
        unit 		: document.getElementById('cri_by_unit_listermirna').value,
		tgl     	: document.getElementById('tglcariirna').value
	};
	$("#listpasienermirna_loadingawal").show();
	apiPOST("Rekammedisirna/listpasien", param, hasil => {
		$("#listpasienermirna_loadingawal").hide();
		$('#listpasienermirna').html('');
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

				$('#listpasienermirna').append(Baris);
                //document.getElementById('searchPxRmlistermirna').value = '';
                //document.getElementById('RWJERMnmlistermirna').value = '';
			}else{
				var Baris = "";
				var a = hasil['data'];
				for (var i = 0; i < a.length; i++) {
					var tglkunj   = a[i].tgl_masuk;
					var transaksi = a[i].id_transaksi;
					var no_rm     = a[i].no_rm;
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
					var id_pegawai = a[i].id_pegawai;
					var nama_kamar = a[i].nama_kamar;
					var jam_masuk = a[i].jam_masuk.substring(0, 16);
					var jnskelamin = a[i].jk;
					var nama_dokter = a[i].nama_dokter;

					if (nama.length > 18){
						namax  = nama.substring(0, 18)+'...';
					}else{
						namax  = nama;
					}

					if (alamat.length > 30){
						alamatx = alamat.substring(0, 30)+'...';
					}else{
						alamatx = alamat;
					}

					Baris += '<div class="col-sm-3">';
					if (soap>''){
						Baris += '<div class="small-box btn-info" style="border: solid 2px darkblue;">';
					}else{
						Baris += '<div class="small-box btn-secondary-default" style="border: solid 2px #a8d4da; margin-bottom: 5px !important;">';
					}


					Baris += '<div class="inner p-1">';
					Baris += '<h6><strong>'+no_rm+'</strong> / '+ namax +'</h6>';
					Baris += '<p class="p-0 mb-1" style="font-size:12px;">'+alamatx+'</p>';
					Baris += '<p class="p-0" style="font-size:12px;"><strong><i>'+unit+'&nbsp('+nama_kamar+')</i></strong></p>';
					Baris += '<p class="p-0 mb-1" style="font-size:14px; text-align: center;"><i class="fa fa-clock"></i> '+jam_masuk+'</p>';
					Baris += '</div>';
					Baris += '<div class="icon">';
					Baris += '<i class="fa fa-user"></i>';
					Baris += '</div>';
					Baris += '<a href="#" class="small-box-footer" style="background-color: #a8d4da; color: black;" onclick="tampilPasienermirna('+"'"+no_rm+"','"+unit+"','"+kunjungan+"','"+id_unit+"','"+nama+"','"+transaksi+"','"+tgl_lahir+"','"+alamat+"','"+id_pegawai+"','"+jnskelamin+"','"+nama_kamar+"','"+penjamin+"','"+jam_masuk+"','"+nama_dokter+"'"+')" style="cursor:pointer;">Klik Disini <i class="fas fa-arrow-circle-right"></i></a>';
					Baris += '</div>';
					Baris += '</div>';
				}
				$('#listpasienermirna').append(Baris);
			}       
		}
	});  
};
*/
function assesmendokterhistoriermirna(idkunjunganhistori,idunit){
	var assmedhis = '';
	var param = {
		id    : idkunjunganhistori,
		idunit: idunit,
	};
	apiPOST('Rekammedisirja/datakunjunganrmmedisdetail', param, hasil => {
		var a = hasil['data'];
		for (var i = 0; i < a.length; i++) {
			assmedhis += '<div class="row col-md-12">';

			assmedhis += '<div class="row">';
			assmedhis += '<div><u>ASSESMENT MEDIS</u></div>';
			assmedhis += '</div>';
			assmedhis += '<div class="row">';
			assmedhis += '<div class="col-md-4 p2">'
			assmedhis += '<label class="form-label">Keluhan Utama</label>';
			assmedhis += '</div>';
			assmedhis += '<div class="col-md-8 p2">';
			assmedhis += '<textarea class="form-control " id="keluhanutamaErmIrjaHis" readonly>'+a[i]['keluhan_utama']+'</textarea>';
			assmedhis += '</div>';

			assmedhis += '<div class="col-md-12 p4">';
			assmedhis += '<hr>';
			assmedhis += '</div>';

			assmedhis += '<div class="col-md-12 p2">';
			assmedhis += '<label class="form-label"><u>BIOPSIKOSOSIAL, KULTURAL, SPIRITUAL</u></label>';
			assmedhis += '</div>';

			assmedhis += '<div class="col-md-4 p2">';
			assmedhis += '<label class="form-label">Status Mental</label>';
			assmedhis += '</div>';
			assmedhis += '<div class="col-md-8 p2">';
			if (a[i]['status_mental']='1') {
				assmedhis += '<textarea class="form-control" id="statusmentalErmIrjahis" readonly>Orientasi Baik</textarea>';
			} else if(a[i]['status_mental']='2') {
				assmedhis += '<textarea class="form-control" id="statusmentalErmIrjahis" readonly>Agitasi</textarea>';
			} else if(a[i]['status_mental']=='3'){
				assmedhis += '<textarea class="form-control" id="statusmentalErmIrjahis" readonly>Menyerang</textarea>';
			} else if(a[i]['status_mental']=='4'){
				assmedhis += '<textarea class="form-control" id="statusmentalErmIrjahis" readonly>Tidak Ada Respon</textarea>';
			} else {
				assmedhis += '<textarea class="form-control" id="statusmentalErmIrjahis" readonly>LAin</textarea>';
			}

			assmedhis += '</div>';
			assmedhis += '<div class="col-md-4 p2">';
			assmedhis += '<label class="form-label">Status Psikolog</label>';
			assmedhis += '</div>';
			assmedhis += '<div class="col-md-8 p2">';
			switch(a[i]['status_psikologi']) {
			case '1':
				assmedhis += '<textarea class="form-control" id="statuspsikoErmIrjahis" readonly>Kooperatif</textarea>';
				break;
			case '2':
				assmedhis += '<textarea class="form-control" id="statuspsikoErmIrjahis" readonly>Disorientasi</textarea>';
				break;
			case '3':
				assmedhis += '<textarea class="form-control" id="statuspsikoErmIrjahis" readonly>Tenang</textarea>';
				break;
			case '4':
				assmedhis += '<textarea class="form-control" id="statuspsikoErmIrjahis" readonly>Hiperaktif</textarea>';
				break;
			case '5':
				assmedhis += '<textarea class="form-control" id="statuspsikoErmIrjahis" readonly>Cemas</textarea>';
				break;
			case '6':
				assmedhis += '<textarea class="form-control" id="statuspsikoErmIrjahis" readonly>Kecenderungan Bunuh Diri</textarea>';
				break;
			case '7':
				assmedhis += '<textarea class="form-control" id="statuspsikoErmIrjahis" readonly>Gelisah</textarea>';
				break;
			case '8':
				assmedhis += '<textarea class="form-control" id="statuspsikoErmIrjahis" readonly>Depresi</textarea>';
				break;
			case '9':
				assmedhis += '<textarea class="form-control" id="statuspsikoErmIrjahis" readonly>Marah</textarea>';
				break;
			case '10':
				assmedhis += '<textarea class="form-control" id="statuspsikoErmIrjahis" readonly> Lain-Lain</textarea>';
				break;
			default:
    // code block
			}
			assmedhis += '</div>';
			assmedhis += '<div class="col-md-4 p2">';
			assmedhis += '<label class="form-label">Penggunaan restrain</label>';
			assmedhis += '</div>';
			assmedhis += '<div class="col-md-8 p2">';
			if (a[i]['pengguna_restrain']=='1') {
				assmedhis += '<textarea class="form-control" id="restrainErmIrjahis" readonly>Tidak</textarea>';
			} else {
				assmedhis += '<textarea class="form-control" id="restrainErmIrjahis" readonly>Ya</textarea>';
			}

			assmedhis += '</div>';
			assmedhis += '<div class="col-md-4 p2">';
			assmedhis += '<label class="form-label">Budaya</label>';
			assmedhis += '</div>';
			assmedhis += '<div class="col-md-8 p2">';
			assmedhis += '<textarea class="form-control" id="AgamaErmIrjahis" readonly>'+a[i]['budaya']+'</textarea>';
			assmedhis += '</div>';

			assmedhis += '<div class="col-md-12 p4">';
			assmedhis += '<hr>';
			assmedhis += '</div>';

			assmedhis += '<div class="col-md-12 p2">';
			assmedhis += '<label class="form-label"><u>TANDA VITAL</u></label>';
			assmedhis += '</div>';
			assmedhis += '<div class="col-md-2 p2">';
			assmedhis += '<label class="form-label">Keadaan Umum</label>';
			assmedhis += '</div>';
			assmedhis += '<div class="col-md-4 p2">';
			assmedhis += '<input type="text" class="form-control" id="keadaanumumErmIrjahis" value="'+a[i]['keadaan_umum']+'" readonly>';
			assmedhis += '</div>';
			assmedhis += '<div class="col-md-2 p2">';
			assmedhis += '<label class="form-label">Respirasi</label>';
			assmedhis += '</div>';
			assmedhis += '<div class="col-md-2 p2">';
			assmedhis += '<input type="text" class="form-control" id="respirasirmIrjahis" value="'+a[i]['respirasi']+'" readonly>';
			assmedhis += '</div>';
			assmedhis += '<div class="input-group-prepend"><span>x/Menit</span></div>';

			assmedhis += '<div class="col-md-2 p2">';
			assmedhis += '<label class="form-label">Nadi</label>';
			assmedhis += '</div>';
			assmedhis += '<div class="col-md-2 p2">';
			assmedhis += '<input type="text" class="form-control" id="nadirmIrjahis" value="'+a[i]['nadi']+'" readonly>';
			assmedhis += '</div>';
			assmedhis += '<div class="input-group-prepend col-md-2 p2"><span>x/Menit</span></div>';
			assmedhis += '<div class="col-md-2 p2">';
			assmedhis += '<label class="form-label">SpO2</label>';
			assmedhis += '</div>';
			assmedhis += '<div class="col-md-2 p2">';
			assmedhis += '<input type="text" class="form-control" id="spo2mIrjahis" value="'+a[i]['spo2']+'" readonly>';
			assmedhis += '</div>';
			assmedhis += '<div class="input-group-prepend"><span>x/Menit</span></div>';



			assmedhis += '<div class="col-md-2 p2">';
			assmedhis += '<label class="form-label">Pupil Kanan&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>';
			assmedhis += '</div>';
			assmedhis += '<div class="col-md-2 p2">';
			assmedhis += '<input type="text" class="form-control" id="pupilkirirmIrjahis" value="'+a[i]['pupil_kanan']+'" readonly>';
			assmedhis += '</div>';
			assmedhis += '<div class="input-group-prepend col-md-2 p2"><span>mm</span></div>';
			assmedhis += '<div class="col-md-2 p2">';
			assmedhis += '<label class="form-label">Pupil Kiri&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>';
			assmedhis += '</div>';
			assmedhis += '<div class="col-md-2 p2">';
			assmedhis += '<input type="text" class="form-control" id="pupilkirirmIrjahis" value="'+a[i]['pupil_kiri']+'" readonly>';
			assmedhis += '</div>';
			assmedhis += '<div class="input-group-prepend col-md-2 p2"><span>mm</span></div>';

			assmedhis += '<div class="col-md-2 p2">';
			assmedhis += '<label class="form-label">Tekanan Darah</label>';
			assmedhis += '</div>';
			assmedhis += '<div class="col-md-2">';
			assmedhis += '<input type="text" class="form-control" id="tekanandarahrmIrjahis" value="'+a[i]['tekanan_darah1']+'/'+a[i]['tekanan_darah2']+' " placeholder=" / " readonly>';
			assmedhis += '</div>';
			assmedhis += '<div class="input-group-prepend col-md-2"><span>mm/Hg</span></div>';

			assmedhis += '<div class="col-md-2 p2">';
			assmedhis += '<label class="form-label">Perpalpasi</label>';
			assmedhis += '</div>';
			assmedhis += '<div class="col-md-2">';
			assmedhis += '<input type="text" class="form-control" id="perpalpasirmIrjahis" value="'+a[i]['palpasi']+'" placeholder="" readonly>';
			assmedhis += '</div>';
			assmedhis += '<div class="input-group-prepend col-md-2"><span>perpalpasi</span></div>';

			assmedhis += '<div class="col-md-2 p2">';
			assmedhis += '<label class="form-label">Suhu</label>';
			assmedhis += '</div>';
			assmedhis += '<div class="col-md-2">';
			assmedhis += '<input type="text" class="form-control" id="suhurmIrjahis" value="'+a[i]['suhu']+'" placeholder="" readonly>';
			assmedhis += '</div>';
			assmedhis += '<div class="input-group-prepend col-md-2"><span>C</span></div>';

			assmedhis += '<div class="col-md-2 p2">';
			assmedhis += '<label class="form-label">Imt</label>';
			assmedhis += '</div>';
			assmedhis += '<div class="col-md-2">';
			assmedhis += '<input type="text" class="form-control" id="imtrmIrjahis" value="'+a[i]['imt']+'" placeholder="" readonly>';
			assmedhis += '</div>';
			assmedhis += '<div class="input-group-prepend col-md-2"><span>x/menit</span></div>';

			assmedhis += '<div class="col-md-2 p2">';
			assmedhis += '<label class="form-label">Berat Badan</label>';
			assmedhis += '</div>';
			assmedhis += '<div class="col-md-2 p2">';
			assmedhis += '<input type="text" class="form-control" id="beratbadanrmIrjahis" value="'+a[i]['bb']+'" readonly>';
			assmedhis += '</div>';
			assmedhis += '<div class="input-group-prepend col-md-2 p2"><span>kg</span></div>';
			assmedhis += '<div class="col-md-2 p2">';
			assmedhis += '<label class="form-label">Tinggi Badan</label>';
			assmedhis += '</div>';
			assmedhis += '<div class="col-md-2 p2">';
			assmedhis += '<input type="text" class="form-control" id="tinggibadanrmIrjahis" value="'+a[i]['tinggi_badan']+'" readonly>';
			assmedhis += '</div>';
			assmedhis += '<div class="input-group-prepend col-md-2"><span>cm</span></div>';
			assmedhis += '<div class="col-md-2 p2">';
			assmedhis += '<label class="form-label">Reflek Cahaya Kanan</label>';
			assmedhis += '</div>';
			assmedhis += '<div class="col-md-2 p2">';
			assmedhis += '<input type="text" class="form-control" id="reflekcahayakirirmIrjahis" value="'+a[i]['reflek_cahaya_kanan']+'" readonly>';
			assmedhis += '</div>';
			assmedhis += '<div class="input-group-prepend col-md-2 p2"><span></span></div>';
			assmedhis += '<div class="col-md-2 p2">';
			assmedhis += '<label class="form-label">Reflek Cahaya Kiri</label>';
			assmedhis += '</div>';
			assmedhis += '<div class="col-md-2 p2">';
			assmedhis += '<input type="text" class="form-control" id="reflekcahayakirirmIrjahis" value="'+a[i]['reflek_cahaya_kiri']+'" readonly>';
			assmedhis += '</div>';
			assmedhis += '<div class="input-group-prepend col-md-2 p2"><span></span></div>';
			assmedhis += '<div class="col-md-12 p4">';
			assmedhis += '<hr>';
			assmedhis += '</div>';

			assmedhis += '<div class="col-md-12 p2">';
			assmedhis += '<label class="form-label"><u>GLASGOW COMA SCALE ( GCS )</u></label>';
			assmedhis += '</div>';

			assmedhis += '<div class="info-box mb-0" >'; 
			assmedhis += '<table class="table table-striped table-sm" cellspacing="0" cellpadding="0" border="0">';
			assmedhis += '<thead>';
			assmedhis += '<tr style="background-color: #6c757d;color:white">';
			assmedhis += '<td>Kategori</td>';
			assmedhis += '<td>Hasil</td>';
			assmedhis += '<td>Skor</td>';
			assmedhis += '</tr>';
			assmedhis += '</thead>';
			assmedhis += '<tbody>';
			assmedhis +=  '<tr>';
			assmedhis +=  '<td>Respon Buka Mata (Eye Opening : E)</td>';
			assmedhis += '<td>Spontan</td>';
			assmedhis +=  '<td>'+a[i]['respon_e']+'</td>';
			assmedhis +=  '</tr>';
			assmedhis +=  '<tr>';
			assmedhis +=  '<td> Respon Motorik Terbaik (M) </td>';
			assmedhis += '<td> Turut Perintah </td>';
			assmedhis +=  '<td>'+a[i]['respon_m']+'</td>';
			assmedhis +=  '</tr>';
			assmedhis +=  '<tr>';
			assmedhis +=  '<td>  Respon Verbal (V) </td>';
			assmedhis += '<td>  Berorientasi Baik  </td>';
			assmedhis +=  '<td>'+a[i]['respon_v']+'</td>';
			assmedhis +=  '</tr>';
			assmedhis +=  '</tbody>';
			assmedhis +=  '</table>';
			assmedhis +=  '</div>';

			assmedhis += '<div class="col-md-12 p4">';
			assmedhis += '<hr>';
			assmedhis += '</div>';

			assmedhis += '<div class="col-md-12 p4">';
			assmedhis += '<label class="form-label"><u>PEMERIKSAAN FISIK UMUM</u></label>';
			assmedhis += '</div>';

			assmedhis += '<div class="col-md-2 p2">';
			assmedhis += '<label class="form-label">Kepala</label>';
			assmedhis += '</div>';
			assmedhis += '<div class="col-md-4 p2">';
			if (a[i]['kepala']=='1') {
				assmedhis += '<input type="text" class="form-control" id="kepalaErmIrjahis" value="Normal" readonly>';
			} else {
				assmedhis += '<input type="text" class="form-control" id="kepalaErmIrjahis" value="'+a[i]['kepala']+'" readonly>';
			}

			assmedhis += '</div>';
			assmedhis += '<div class="col-md-2 p2">';
			assmedhis += '<label class="form-label">Mata</label>';
			assmedhis += '</div>';
			assmedhis += '<div class="col-md-4 p2">';
			if (a[i]['mata']=='1') {
				assmedhis += '<input type="text" class="form-control" id="matarmIrjahis" value="Normal" readonly>';
			} else {
				assmedhis += '<input type="text" class="form-control" id="matarmIrjahis" value="'+a[i]['mata']+'" readonly>';
			}

			assmedhis += '</div>';


			assmedhis += '<div class="col-md-2 p2">';
			assmedhis += '<label class="form-label">Tht</label>';
			assmedhis += '</div>';
			assmedhis += '<div class="col-md-4 p2">';
			if (a[i]['tht']=='1') {
				assmedhis += '<input type="text" class="form-control" id="thtErmIrjahis" value="Normal" readonly>';
			} else {
				assmedhis += '<input type="text" class="form-control" id="thtErmIrjahis" value="'+a[i]['tht']+'" readonly>';
			}

			assmedhis += '</div>';
			assmedhis += '<div class="col-md-2 p2">';
			assmedhis += '<label class="form-label">Leher</label>';
			assmedhis += '</div>';
			assmedhis += '<div class="col-md-4 p2">';
			if (a[i]['leher']=='1') {
				assmedhis += '<input type="text" class="form-control" id="leherrmIrjahis" value="Normal" readonly>';
			} else {
				assmedhis += '<input type="text" class="form-control" id="leherrmIrjahis" value="'+a[i]['leher']+'" readonly>';
			}

			assmedhis += '</div>';


			assmedhis += '<div class="col-md-2 p2">';
			assmedhis += '<label class="form-label">Mulut</label>';
			assmedhis += '</div>';
			assmedhis += '<div class="col-md-4 p2">';
			if (a[i]['mulut']=='1') {
				assmedhis += '<input type="text" class="form-control" id="mulutrmIrjahis" value="Normal" readonly>';
			} else {
				assmedhis += '<input type="text" class="form-control" id="mulutrmIrjahis" value="'+a[i]['mulut_ket']+'" readonly>';
			}
			assmedhis += '</div>';
			assmedhis += '<div class="col-md-2 p2">';
			assmedhis += '<label class="form-label">Thorax</label>';
			assmedhis += '</div>';
			assmedhis += '<div class="col-md-4 p2">';
			if (a[i]['thoraks']=='1') {
				assmedhis += '<input type="text" class="form-control" id="thoraxrmIrjahis" value="Normal" readonly>';
			} else {
				assmedhis += '<input type="text" class="form-control" id="thoraxrmIrjahis" value="'+a[i]['thoraks_ket']+'" readonly>';
			}
			assmedhis += '</div>';

			assmedhis += '<div class="col-md-2 p2">';
			assmedhis += '<label class="form-label">Jantung</label>';
			assmedhis += '</div>';
			assmedhis += '<div class="col-md-4 p2">';
			if (a[i]['jantung']=='1') {
				assmedhis += '<input type="text" class="form-control" id="jantungrmIrjahis" value="Normal" readonly>';
			} else {
				assmedhis += '<input type="text" class="form-control" id="jantungrmIrjahis" value="'+a[i]['jantung_ket']+'" readonly>';
			}
			assmedhis += '</div>';
			assmedhis += '<div class="col-md-2 p2">';
			assmedhis += '<label class="form-label">Paru</label>';
			assmedhis += '</div>';
			assmedhis += '<div class="col-md-4 p2">';
			if (a[i]['paru']=='1') {
				assmedhis += '<input type="text" class="form-control" id="parurmrjahis" value="Normal" readonly>';
			} else {
				assmedhis += '<input type="text" class="form-control" id="parurmrjahis" value="'+a[i]['paru_ket']+'" readonly>';
			}
			assmedhis += '</div>';

			assmedhis += '<div class="col-md-2 p2">';
			assmedhis += '<label class="form-label">Ambomen</label>';
			assmedhis += '</div>';
			assmedhis += '<div class="col-md-4 p2">';
			if (a[i]['abdomen']=='1') {
				assmedhis += '<input type="text" class="form-control" id="ambomenErmIrjahis" value="Normal" readonly>';
			} else {
				assmedhis += '<input type="text" class="form-control" id="ambomenErmIrjahis" value="'+a[i]['abdomen_ket']+'" readonly>';
			}
			assmedhis += '</div>';
			assmedhis += '<div class="col-md-2 p2">';
			assmedhis += '<label class="form-label">Genitalia</label>';
			assmedhis += '</div>';
			assmedhis += '<div class="col-md-4 p2">';
			if (a[i]['genitalia']=='1') {
				assmedhis += '<input type="text" class="form-control" id="genitaliarmIrjahis" value="Normal" readonly>';
			} else {
				assmedhis += '<input type="text" class="form-control" id="genitaliarmIrjahis" value="'+a[i]['genitalia']+'" readonly>';
			}

			assmedhis += '</div>';

			assmedhis += '<div class="col-md-2 p2">';
			assmedhis += '<label class="form-label"> Status Localis </label>';
			assmedhis += '</div>';
			assmedhis += '<div class="col-md-4 p2">';
			assmedhis += '<input type="text" class="form-control" id="localisrmIrjahis" value="'+a[i]['status_lokalis']+'" readonly>';
			assmedhis += '</div>';

			assmedhis += '<div class="col-md-12 p4">';
			assmedhis += '<hr>';
			assmedhis += '</div>';

			assmedhis += '<div class="col-md-2 p6">'
			assmedhis += '<label class="form-label">ASSESMEN</label>';
			assmedhis += '</div>';
			assmedhis += '<div class="col-md-10 p2">';
			assmedhis += '<textarea class="form-control " id="assesmedErmIrjaHis" readonly>'+a[i]['assesmen_medis']+'</textarea>';
			assmedhis += '</div>';

			assmedhis += '<div class="col-md-2 p2">'
			assmedhis += '<label class="form-label">PLANING</label>';
			assmedhis += '</div>';
			assmedhis += '<div class="col-md-10 p2">';
			assmedhis += '<textarea class="form-control " id="planingmedErmIrjaHis" readonly>'+a[i]['planning_medis']+'</textarea>';
			assmedhis += '</div>';

			assmedhis += '<div class="col-md-2 p2">'
			assmedhis += '<label class="form-label">TINDAKAN</label>';
			assmedhis += '</div>';
			assmedhis += '<div class="col-md-10 p2">';
			assmedhis += '<textarea class="form-control " id="tindakanmedErmIrjaHis" readonly>'+a[i]['tindakan_medis']+'</textarea>';
			assmedhis += '</div>';

			assmedhis += '<div class="col-md-2 p2">'
			assmedhis += '<label class="form-label">PASIEN KOMPLEKS</label>';
			assmedhis += '</div>';
			assmedhis += '<div class="col-md-10 p2">';
			switch(a[i]['tipe_kesadaran']) {
			case '1':
				assmedhis += '<textarea class="form-control " id="kompleksmedErmIrjaHis" readonly>Compos Metis</textarea>';
				break;
			case '2':
				assmedhis += '<textarea class="form-control " id="kompleksmedErmIrjaHis" readonly>Apatis</textarea>';
				break;
			case '3':
				assmedhis += '<textarea class="form-control " id="kompleksmedErmIrjaHis" readonly>Somnolen</textarea>';
				break;
			case '4':
				assmedhis += '<textarea class="form-control " id="kompleksmedErmIrjaHis" readonly>Delirium</textarea>';
				break;
			case '5':
				assmedhis += '<textarea class="form-control " id="kompleksmedErmIrjaHis" readonly>Sopor</textarea>';
				break;
			case '6':
				assmedhis += '<textarea class="form-control " id="kompleksmedErmIrjaHis" readonly>Coma</textarea>';
				break;
			default:

			}

			assmedhis += '</div>';
			assmedhis += '<div><button class="btn-primary" onclick="assesmenirnadokterhistoriupdate('+idkunjunganhistori+');">Update</button></div>';
			assmedhis += '</div>';
			assmedhis += '</div>';

		}


		document.getElementById("idpanelhistorirm"+idkunjunganhistori+"").innerHTML = assmedhis;
	})
}
function resumeirna(idkunjungan,idunit){
	var param = {
		id_kunjungan    : idkunjungan,
		id_transaksi    : $('#transaksiermirna').val(),
		id_unit         : idunit,
		nama            : $('#namaermirna').val(),
		rm              : $('#rmermirna').val(),
	};
	newTabPOST('API/Laporan/Resume',param);
	return;
}
function ShowResumeIrna() {
	var param = {
		id_kunjungan  : $('#idKunjunganermirna').val(),
		id_transaksi  : $('#transaksiermirna').val()
	};
	apiPOST('Rekammedisirna/detailresumeirna', param, hasil => {
		var a = hasil['data'];
		if (hasil['code']==200) {
			document.getElementById('reviewresumeirna').click();
			document.getElementById('TglMasukResumeermirna').value  	=hasil['data']['tgl_masuk'];
			document.getElementById('caramasukResumeermirna').value   	=hasil['data']['cara_masuk'];
			document.getElementById('TglKeluarResumeermirna').value  	=hasil['data']['tgl_keluar'];
			document.getElementById('BBResumeermirna').value  			=hasil['data']['berat_lahir'];
			document.getElementById('dpjpResumeermirna').value  		=hasil['data']['dpjp'];
			document.getElementById('tglResumeermirna').value  			=hasil['data']['tgl'];
			document.getElementById('RiwayatKesResumeermirna').value  	=hasil['data']['riwayat_kesehatan'];
			document.getElementById('TerapiResumeermirna').value  		=hasil['data']['terapi'];
			document.getElementById('PemeriksaanFisikResumeermirna').value=hasil['data']['pemeriksaan_fisik'];
			document.getElementById('TindakanResumeermirna').value  	=hasil['data']['tindakan'];
			document.getElementById('DiagnostikResumeermirna').value 	=hasil['data']['pemeriksaan_diagnostik'];
			document.getElementById('InstruksiResumeermirna').value 	=hasil['data']['instruksi'];
			document.getElementById('DiagnosisResumeermirna').value   	=hasil['data']['diagnosis'];
			document.getElementById('PerkembanganResumeermirna').value  =hasil['data']['perkembangan_perawatan'];
			document.getElementById('CaraKeluarResumeermirna').value 	=hasil['data']['cara_keluar'];
			document.getElementById('keadaanUmumResumeermirna').value  	=hasil['data']['keadaan_umum'];
			document.getElementById('kesadaranResumeermirna').value  	=hasil['data']['kesadaran'];
			document.getElementById('MblplgResumeermirna').value  		=hasil['data']['mobilitasi_plg'];
			document.getElementById('tensiResumeermirna').value  		=hasil['data']['tensi'];
			document.getElementById('nadiResumeermirna').value  		=hasil['data']['nadi'];
			document.getElementById('SuhuResumeermirna').value 			=hasil['data']['suhu'];
			document.getElementById('RespirasiResumeermirna').value 	=hasil['data']['respirasi'];
			document.getElementById('AlatMedisResumeermirna').value 	=hasil['data']['alat_medis_terpasang'];
			document.getElementById('selectInstruksiResumeermirna').value=hasil['data']['instruksi_lanjutan'];
			document.getElementById('ImgTtdResumeIrna').src  			=hasil['data']['ttd'];
			if (hasil['data']['covid']=='ya') {
				document.getElementById('CovidResumeermirna').checked=true;
			}
			if (hasil['data']['alat_bantu']=='ya') {
				document.getElementById('alatBntResumeermirna').checked=true;
			}
			if (hasil['data']['kasus_baru']=='ya') {
				document.getElementById('KasusBrResumeermirna').checked=true;
			}

		} else {
			document.getElementById('reviewresumeirna').click();
			alert('Resume Kosong');
		}
	})
}
function assesmenperawathistoriermirna(idkunjunganhistori,idunit){
	var url = "<?php echo base_url(); ?>";

	var asskephis = '';
	var param = {
		id: idkunjunganhistori,
		idunit:idunit
	};
	apiPOST('Rekammedisirna/datakunjunganrmkeperdetail', param, hasil => {
		var a = hasil['data'];
		for (var i = 0; i < a.length; i++) {
			asskephis += '<div class="row col-md-12">';

			asskephis += '<div class="row">';
			asskephis += '<div><u>ASSESMENT KEPERAWATAN</u></div>';
			asskephis += '</div>';
			asskephis += '<div class="row">';
			asskephis += '<div class="col-md-4 p2">'
			asskephis += '<label class="form-label">Keluhan Utama</label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-8 p2">';
			asskephis += '<textarea class="form-control " id="kepkeluhanutamaErmIrjaHis" readonly>'+a[i]['keluhan_utama']+'</textarea>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-4 p2">';
			asskephis += '<label class="form-label">Riwayat Penyakit Sekarang *</label>&nbsp;&nbsp;&nbsp;<label>';
			asskephis += '</div>';

			asskephis += '<div class="col-md-8 p2">';
			asskephis += '<textarea class="form-control " id="kepRiwayatPenyakitNowErmIrjahis" readonly>'+a[i]['penyakit_sekarang']+'</textarea>';
			asskephis += '</div>'; 

			asskephis += '<div class="col-md-12 p4">';
			asskephis += '<hr>';
			asskephis += '</div>';

			asskephis += '<div class="col-md-12 p2">';
			asskephis += '<label class="form-label"><u>BIOPSIKOSOSIAL, KULTURAL, SPIRITUAL</u></label>';
			asskephis += '</div>';

			asskephis += '<div class="col-md-4 p2">';
			asskephis += '<label class="form-label">Status Mental</label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-8 p2">';
			if (a[i]['status_mental']='1') {
				asskephis += '<textarea class="form-control" id="kepstatusmentalErmIrjahis" readonly>Orientasi Baik</textarea>';
			} else if(a[i]['status_mental']='2') {
				asskephis += '<textarea class="form-control" id="kepstatusmentalErmIrjahis" readonly>Agitasi</textarea>';
			} else if(a[i]['status_mental']=='3'){
				asskephis += '<textarea class="form-control" id="kepstatusmentalErmIrjahis" readonly>Menyerang</textarea>';
			} else if(a[i]['status_mental']=='4'){
				asskephis += '<textarea class="form-control" id="kepstatusmentalErmIrjahis" readonly>Tidak Ada Respon</textarea>';
			} else {
				asskephis += '<textarea class="form-control" id="kepstatusmentalErmIrjahis" readonly>LAin</textarea>';
			}
			asskephis += '</div>';
			asskephis += '<div class="col-md-4 p2">';
			asskephis += '<label class="form-label">Status Psikolog</label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-8 p2">';
			switch(a[i]['status_psikologi']) {
			case '1':
				asskephis += '<textarea class="form-control" id="statuspsikoErmIrjahis" readonly>Kooperatif</textarea>';
				break;
			case '2':
				asskephis += '<textarea class="form-control" id="statuspsikoErmIrjahis" readonly>Disorientasi</textarea>';
				break;
			case '3':
				asskephis += '<textarea class="form-control" id="statuspsikoErmIrjahis" readonly>Tenang</textarea>';
				break;
			case '4':
				asskephis += '<textarea class="form-control" id="statuspsikoErmIrjahis" readonly>Hiperaktif</textarea>';
				break;
			case '5':
				asskephis += '<textarea class="form-control" id="statuspsikoErmIrjahis" readonly>Cemas</textarea>';
				break;
			case '6':
				asskephis += '<textarea class="form-control" id="statuspsikoErmIrjahis" readonly>Kecenderungan Bunuh Diri</textarea>';
				break;
			case '7':
				asskephis += '<textarea class="form-control" id="statuspsikoErmIrjahis" readonly>Gelisah</textarea>';
				break;
			case '8':
				asskephis += '<textarea class="form-control" id="statuspsikoErmIrjahis" readonly>Depresi</textarea>';
				break;
			case '9':
				asskephis += '<textarea class="form-control" id="statuspsikoErmIrjahis" readonly>Marah</textarea>';
				break;
			case '10':
				asskephis += '<textarea class="form-control" id="statuspsikoErmIrjahis" readonly> Lain-Lain</textarea>';
				break;
			default:
    // code block
			}


			asskephis += '</div>';
			asskephis += '<div class="col-md-4 p2">';
			asskephis += '<label class="form-label">Penggunaan restrain</label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-8 p2">';
			if (a[i]['pengguna_restrain']=='1') {
				asskephis += '<textarea class="form-control" id="restrainErmIrjahis" readonly>Tidak</textarea>';
			} else {
				asskephis += '<textarea class="form-control" id="restrainErmIrjahis" readonly>Ya</textarea>';
			}
			asskephis += '</div>';
			asskephis += '<div class="col-md-4 p2">';
			asskephis += '<label class="form-label">Budaya</label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-8 p2">';
			asskephis += '<textarea class="form-control" id="kepAgamaErmIrjahis" readonly>'+a[i]['budaya']+'</textarea>';
			asskephis += '</div>';

			asskephis += '<div class="col-md-12 p4">';
			asskephis += '<hr>';
			asskephis += '</div>';

			asskephis += '<div class="col-md-12 p2">';
			asskephis += '<label class="form-label"><u>TANDA VITAL</u></label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-2 p2">';
			asskephis += '<label class="form-label">Keadaan Umum</label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-4 p2">';
			asskephis += '<input type="text" class="form-control" id="kepkeadaanumumErmIrjahis" value="'+a[i]['keadaan_umum']+'" readonly>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-2 p2">';
			asskephis += '<label class="form-label">Respirasi</label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-2 p2">';
			asskephis += '<input type="text" class="form-control" id="keprespirasirmIrjahis" value="'+a[i]['respirasi']+'" readonly>';
			asskephis += '</div>';
			asskephis += '<div class="input-group-prepend"><span>x/Menit</span></div>';

			asskephis += '<div class="col-md-2 p2">';
			asskephis += '<label class="form-label">Nadi</label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-2 p2">';
			asskephis += '<input type="text" class="form-control" id="kepnadirmIrjahis" value="'+a[i]['nadi']+'" readonly>';
			asskephis += '</div>';
			asskephis += '<div class="input-group-prepend col-md-2 p2"><span>x/Menit</span></div>';
			asskephis += '<div class="col-md-2 p2">';
			asskephis += '<label class="form-label">SpO2</label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-2 p2">';
			asskephis += '<input type="text" class="form-control" id="kepspo2mIrjahis" value="'+a[i]['spo2']+'" readonly>';
			asskephis += '</div>';
			asskephis += '<div class="input-group-prepend"><span>x/Menit</span></div>';

			asskephis += '<div class="col-md-2 p2">';
			asskephis += '<label class="form-label">Pupil</label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-3 p2">';
			asskephis += '<input type="text" class="form-control" id="keppupilkirirmIrjahis" value="kanan='+a[i]['pupil_kanan']+'||kiri='+a[i]['pupil_kiri']+'" readonly>';
			asskephis += '</div>';
			asskephis += '<div class="input-group-prepend col-md-1 p2"><span>mm</span></div>';


			asskephis += '<div class="col-md-2 p2">';
			asskephis += '<label class="form-label">Tekanan Darah</label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-2">';
			asskephis += '<input type="text" class="form-control" id="keptekanandarahrmIrjahis" value="'+a[i]['tekanan_darah1']+'/'+a[i]['tekanan_darah2']+'" readonly>';
			asskephis += '</div>';
			asskephis += '<div class="input-group-prepend col-md-2"><span>mm/Hg</span></div>';

			asskephis += '<div class="col-md-2 p2">';
			asskephis += '<label class="form-label">Perpalpasi</label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-2">';
			asskephis += '<input type="text" class="form-control" id="kepperpalpasirmIrjahis" value="'+a[i]['palpasi']+'" placeholder="" readonly>';
			asskephis += '</div>';
			asskephis += '<div class="input-group-prepend col-md-2"><span>perpalpasi</span></div>';

			asskephis += '<div class="col-md-2 p2">';
			asskephis += '<label class="form-label">Suhu</label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-2">';
			asskephis += '<input type="text" class="form-control" id="kepsuhurmIrjahis" placeholder="" value="'+a[i]['suhu']+'" readonly>';
			asskephis += '</div>';
			asskephis += '<div class="input-group-prepend col-md-2"><span>C</span></div>';

			asskephis += '<div class="col-md-2 p2">';
			asskephis += '<label class="form-label">Imt</label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-2">';
			asskephis += '<input type="text" class="form-control" id="kepimtrmIrjahis" placeholder="" value="'+a[i]['imt']+'" readonly>';
			asskephis += '</div>';
			asskephis += '<div class="input-group-prepend col-md-2"><span>x/menit</span></div>';

			asskephis += '<div class="col-md-2 p2">';
			asskephis += '<label class="form-label">Reflek Cahaya</label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-4 p2">';
			asskephis += '<input type="text" class="form-control" id="kepreflekcahayakirirmIrjahis" value="kanan:'+a[i]['reflek_cahaya_kanan']+'||kiri:'+a[i]['reflek_cahaya_kiri']+'" readonly>';
			asskephis += '</div>';



			asskephis += '<div class="col-md-2 p2">';
			asskephis += '<label class="form-label">Berat Badan</label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-2 p2">';
			asskephis += '<input type="text" class="form-control" id="kepberatbadanrmIrjahis" value="'+a[i]['bb']+'" readonly>';
			asskephis += '</div>';
			asskephis += '<div class="input-group-prepend col-md-2 p2"><span>kg</span></div>';
			asskephis += '<div class="col-md-2 p2">';
			asskephis += '<label class="form-label">Tinggi Badan</label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-2 p2">';
			asskephis += '<input type="text" class="form-control" id="keptinggibadanrmIrjahis" value="'+a[i]['tinggi_badan']+'" readonly>';
			asskephis += '</div>';
			asskephis += '<div class="input-group-prepend col-md-2"><span>cm</span></div>';

			asskephis += '<div class="col-md-12 p4">';
			asskephis += '<hr>';
			asskephis += '</div>';

			asskephis += '<div class="col-md-12 p2">';
			asskephis += '<label class="form-label"><u>GLASGOW COMA SCALE ( GCS )</u></label>';
			asskephis += '</div>';

			asskephis += '<div class="info-box mb-0" >'; 
			asskephis += '<table class="table table-striped table-sm" cellspacing="0" cellpadding="0" border="0">';
			asskephis += '<thead>';
			asskephis += '<tr style="background-color: #6c757d;color:white">';
			asskephis += '<td>Kategori</td>';
			asskephis += '<td>Hasil</td>';
			asskephis += '<td>Skor</td>';
			asskephis += '</tr>';
			asskephis += '</thead>';
			asskephis += '<tbody>';
			asskephis +=  '<tr>';
			asskephis +=  '<td>Respon Buka Mata (Eye Opening : E)</td>';
			asskephis += '<td>Spontan</td>';
			asskephis +=  '<td>'+a[i]['respon_e']+'</td>';
			asskephis +=  '</tr>';
			asskephis +=  '<tr>';
			asskephis +=  '<td> Respon Motorik Terbaik (M) </td>';
			asskephis += '<td> Turut Perintah </td>';
			asskephis +=  '<td>'+a[i]['respon_m']+'</td>';
			asskephis +=  '</tr>';
			asskephis +=  '<tr>';
			asskephis +=  '<td>  Respon Verbal (V) </td>';
			asskephis += '<td>  Berorientasi Baik  </td>';
			asskephis +=  '<td>'+a[i]['respon_v']+'</td>';
			asskephis +=  '</tr>';
			asskephis +=  '</tbody>';
			asskephis +=  '</table>';
			asskephis +=  '</div>';

			asskephis += '<div class="col-md-12 p4">';
			asskephis += '<hr>';
			asskephis += '</div>';

			asskephis += '<div class="col-md-12 p4">';
			asskephis += '<label class="form-label"><u>PEMERIKSAAN FISIK UMUM</u></label>';
			asskephis += '</div>';

			asskephis += '<div class="col-md-2 p2">';
			asskephis += '<label class="form-label">Kepala</label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-4 p2">';
			if (a[i]['kepala']=='1') {
				asskephis += '<input type="text" class="form-control" id="kepalaErmIrjahis" value="Normal" readonly>';
			} else {
				asskephis += '<input type="text" class="form-control" id="kepalaErmIrjahis" value="'+a[i]['kepala']+'" readonly>';
			}

			asskephis += '</div>';
			asskephis += '<div class="col-md-2 p2">';
			asskephis += '<label class="form-label">Mata</label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-4 p2">';
			if (a[i]['mata']=='1') {
				asskephis += '<input type="text" class="form-control" id="matarmIrjahis" value="Normal" readonly>';
			} else {
				asskephis += '<input type="text" class="form-control" id="matarmIrjahis" value="'+a[i]['mata']+'" readonly>';
			}

			asskephis += '</div>';


			asskephis += '<div class="col-md-2 p2">';
			asskephis += '<label class="form-label">Tht</label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-4 p2">';
			if (a[i]['tht']=='1') {
				asskephis += '<input type="text" class="form-control" id="thtErmIrjahis" value="Normal" readonly>';
			} else {
				asskephis += '<input type="text" class="form-control" id="thtErmIrjahis" value="'+a[i]['tht']+'" readonly>';
			}

			asskephis += '</div>';
			asskephis += '<div class="col-md-2 p2">';
			asskephis += '<label class="form-label">Leher</label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-4 p2">';
			if (a[i]['leher']=='1') {
				asskephis += '<input type="text" class="form-control" id="leherrmIrjahis" value="Normal" readonly>';
			} else {
				asskephis += '<input type="text" class="form-control" id="leherrmIrjahis" value="'+a[i]['leher']+'" readonly>';
			}

			asskephis += '</div>';


			asskephis += '<div class="col-md-2 p2">';
			asskephis += '<label class="form-label">Mulut</label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-4 p2">';
			if (a[i]['mulut']=='1') {
				asskephis += '<input type="text" class="form-control" id="mulutrmIrjahis" value="Normal" readonly>';
			} else {
				asskephis += '<input type="text" class="form-control" id="mulutrmIrjahis" value="'+a[i]['mulut_ket']+'" readonly>';
			}
			asskephis += '</div>';
			asskephis += '<div class="col-md-2 p2">';
			asskephis += '<label class="form-label">Thorax</label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-4 p2">';
			if (a[i]['thoraks']=='1') {
				asskephis += '<input type="text" class="form-control" id="thoraxrmIrjahis" value="Normal" readonly>';
			} else {
				asskephis += '<input type="text" class="form-control" id="thoraxrmIrjahis" value="'+a[i]['thoraks_ket']+'" readonly>';
			}
			asskephis += '</div>';

			asskephis += '<div class="col-md-2 p2">';
			asskephis += '<label class="form-label">Jantung</label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-4 p2">';
			if (a[i]['jantung']=='1') {
				asskephis += '<input type="text" class="form-control" id="jantungrmIrjahis" value="Normal" readonly>';
			} else {
				asskephis += '<input type="text" class="form-control" id="jantungrmIrjahis" value="'+a[i]['jantung_ket']+'" readonly>';
			}
			asskephis += '</div>';
			asskephis += '<div class="col-md-2 p2">';
			asskephis += '<label class="form-label">Paru</label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-4 p2">';
			if (a[i]['paru']=='1') {
				asskephis += '<input type="text" class="form-control" id="parurmrjahis" value="Normal" readonly>';
			} else {
				asskephis += '<input type="text" class="form-control" id="parurmrjahis" value="'+a[i]['paru_ket']+'" readonly>';
			}
			asskephis += '</div>';

			asskephis += '<div class="col-md-2 p2">';
			asskephis += '<label class="form-label">Ambomen</label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-4 p2">';
			if (a[i]['abdomen']=='1') {
				asskephis += '<input type="text" class="form-control" id="ambomenErmIrjahis" value="Normal" readonly>';
			} else {
				asskephis += '<input type="text" class="form-control" id="ambomenErmIrjahis" value="'+a[i]['abdomen_ket']+'" readonly>';
			}
			asskephis += '</div>';
			asskephis += '<div class="col-md-2 p2">';
			asskephis += '<label class="form-label">Genitalia</label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-4 p2">';
			if (a[i]['genitalia']=='1') {
				asskephis += '<input type="text" class="form-control" id="genitaliarmIrjahis" value="Normal" readonly>';
			} else {
				asskephis += '<input type="text" class="form-control" id="genitaliarmIrjahis" value="'+a[i]['genitalia']+'" readonly>';
			}

			asskephis += '</div>';
			asskephis += '<div class="col-md-2 p2">';
			asskephis += '<label class="form-label"> Status Localis </label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-4 p2">';
			asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="'+a[i]['status_lokalis']+'" >';
			asskephis += '</div>';

			asskephis += '<div class="col-md-12 p4">';
			asskephis += '<hr>';
			asskephis += '<label class="form-label"><u>RIWAYAT MENSTRUASI</u></label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-2 p2">';
			asskephis += '<label class="form-label"> Riwayat Menstruasi </label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-4 p2">';
//Belum/Tidak Menstruasi
			if (a[i]['rwytmenstruasi']=='1') {
				asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="Belum/Tidak Menstruasi" >';
			} else {
				asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="Sudah Menstruasi" >';
			}
			asskephis += '</div>';
			asskephis += '<div class="col-md-2 p2">';
			asskephis += '<label class="form-label"> Umur Menarche </label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-4 p2">';
			asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="'+a[i]['umurenarche']+'" >';
			asskephis += '</div>';
			asskephis += '<div class="col-md-2 p2">';
			asskephis += '<label class="form-label"> Lamanya Haid </label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-4 p2">';
			asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="'+a[i]['hlamahaid']+'" >';
			asskephis += '</div>';
			asskephis += '<div class="col-md-2 p2">';
			asskephis += '<label class="form-label"> Kawin Ke 1 Usia </label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-4 p2">';
			asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="'+a[i]['hkawin']+'" >';
			asskephis += '</div>';
			asskephis += '<div class="col-md-2 p2">';
			asskephis += '<label class="form-label"> Jumlah Darah Haid </label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-4 p2">';
			asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="'+a[i]['jmldarahhaid']+'" >';
			asskephis += '</div>';
			asskephis += '<div class="col-md-2 p2">';
			asskephis += '<label class="form-label"> Dismenore </label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-4 p2">';
			asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="'+a[i]['hdesminore']+'" >';
			asskephis += '</div>';
			asskephis += '<div class="col-md-2 p2">';
			asskephis += '<label class="form-label"> Usia Suami 1 </label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-4 p2">';
			asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="'+a[i]['husiasuami1']+'" >';
			asskephis += '</div>';
			asskephis += '<div class="col-md-2 p2">';
			asskephis += '<label class="form-label"> Siklus Haid </label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-4 p2">';
			asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="'+a[i]['hsiklushaid']+'" >';
			asskephis += '</div>';
			asskephis += '<div class="col-md-2 p2">';
			asskephis += '<label class="form-label"> Riwayat Perkawinan </label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-4 p2">';
			asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="'+a[i]['hkawin']+'" >';
			asskephis += '</div>';
			asskephis += '<div class="col-md-2 p2">';
			asskephis += '<label class="form-label"> Kawin Ke 2 Usia </label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-4 p2">';
			asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="'+a[i]['hkawin2usia']+'" >';
			asskephis += '</div>';
			asskephis += '<div class="col-md-2 p2">';
			asskephis += '<label class="form-label"> Riwayat Obstetrik </label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-4 p2">';
			asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="'+a[i]['hobstetrika']+'" >';
			asskephis += '</div>';
			asskephis += '<div class="col-md-2 p2">';
			asskephis += '<label class="form-label"> HPHT </label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-4 p2">';
			asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="'+a[i]['htglhpht']+'" >';
			asskephis += '</div>';
			asskephis += '<div class="col-md-2 p2">';
			asskephis += '<label class="form-label"> Taksiran Persalinan </label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-4 p2">';
			asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="'+a[i]['htglsalin']+'" >';
			asskephis += '</div>';
			asskephis += '<div class="col-md-12 p4">';
			asskephis += '<hr>';
			asskephis += '<label class="form-label"><u>RIWAYAT HAMIL INI</u></label>';
			asskephis += '</div>'

			asskephis += '<div class="col-md-2 p2">';
			asskephis += '<label class="form-label"> Riwayat Obstetrik </label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-4 p2">';
			asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="'+a[i]['status_lokalis']+'" >';
			asskephis += '</div>';
			asskephis += '<div class="col-md-2 p2">';
			asskephis += '<label class="form-label">  TM I </label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-4 p2">';
			switch (a[i]['hhamiltm1list']){
			case '1':
				asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="Mual" >';
				break;
			case '2':
				asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="Muntah" >';
				break;
			case '3':
				asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="Pendarahan" >';
				break;
			case '4':
				asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="Lain-lain" >';
				break;
			case '5':
				asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="Tidak Ada Keluhan" >';
				break;
			default:
				asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="" >';
			}

			asskephis += '</div>';
			asskephis += '<div class="col-md-2 p2">';
			asskephis += '<label class="form-label"> TM II - III </label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-4 p2">';
			switch(a[i]['hhamiltm2list']){
			case '1':
				asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="Pusing" >';
				break;
			case '2':
				asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="Sakit Kepala" >';
				break;
			case '3':
				asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="Pendarahan" >';
				break;
			case '4':
				asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="Lain-lain" >';
				break;
			case '5':
				asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="Tidak ada keluhan" >';
				break;
			default:
				asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="" >';
			}

			asskephis += '</div>';
			asskephis += '<div class="col-md-2 p2">';
			asskephis += '<label class="form-label"> RIWAYAT GINEKOLOGI </label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-4 p2">';
			switch(a[i]['riwayatkbkomplikasilist']){
			case '1':
				asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="Infertilitas" >';
				break;
			case '2':
				asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="Polip servix" >';
				break;
			case '3':
				asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="Tidak ada" >';
				break;
			case '4':
				asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="Cervisitis kronis" >';
				break;
			case '5':
				asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="Kanker Kandungan" >';
				break;
			case '6':
				asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="PMS" >';
				break;
			case '7':
				asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="Operasi Kandungan" >';
				break;
			case '8':
				asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="Endometriosis" >';
				break;
			case '9':
				asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="Myoma" >';
				break;
			case '10':
				asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="Kista" >';
				break;
			case '11':
				asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="Lain-lain" >';
				break;
			default:
				asskephis += '<input type="text" class="form-control" id="keplocalisrmIrjahis" value="" >';

			}

			asskephis += '</div>';



			asskephis += '<div class="col-md-12 p4">';
			asskephis += '<hr>';
			asskephis += '<label class="form-label"><u>SKRINING GIZI</u></label>';
			asskephis += '</div>';

			asskephis +='<div class="col-md-6">';
			asskephis +='<label class="form-label"> &gt; Apakah ada penurunan berat badan tidak direncanakan dalam 6 bulan terakhir;</label>';
			if (a[i]['skrining_gizi']=="1") {
				asskephis +='<input type="text" class="form-control form-control-xs" name="kepermrwjkeperawatansaranhis" id="kepermrwjkeperawatansaranhis" value="Tidak" readonly>';
			} else {
				asskephis +='<input type="text" class="form-control form-control-xs" name="kepermrwjkeperawatansaranhis" id="kepermrwjkeperawatansaranhis" value="Iya" readonly>';
			}
			asskephis +='<div>';
			asskephis +='</div>';
			asskephis +='<label class="form-label"> &gt; Apakah asupan makan berkurang karena penurunan nafsu makan/ kesulitan menerima makanan</label>';
			asskephis +='<input type="text" class="form-control form-control-xs" name="kepnafsumakanhis" id="kepnafsumakanhis" value="'+a[i]['asupan_makan']+'" readonly>';
			asskephis +='</div>';
			asskephis +='<div class="col-md-6">'
			asskephis +='<label class="form-label">Total Skor</label>';
			asskephis +='<input type="text" name="kepermrwjkeperawatantotalskorhis" id="kepermrwjkeperawatantotalskorhis" class="form-control form-control-xs" value="'+a[i]['skor_gizi']+'" readonly>';
			asskephis +='<label>Saran/Tindakan</label>';
			asskephis +='<input type="text" class="form-control form-control-xs" name="kepermrwjkeperawatansaranhis" id="kepermrwjkeperawatansaranhis" value="'+a[i]['saran_tindakan_gizi']+'" readonly>';
			asskephis +='<label class="form-label">Catatan : Skor 0 risiko rendah, Skor 1 risiko sedang, Skor = 2 risiko tinggi konsultasikan ahli gizi atau Bila terdapat kondisi seperti DM, luka bakar, CKD, hiperlipidemia atau kondisi khusus lainnya berdasarkan pertimbangan dokter, maka konsultasikan ke ahli gizi</label>';
			asskephis +='</div>';

			asskephis += '<div class="col-md-12 p4">';
			asskephis += '<hr>';
			asskephis += '<label class="form-label"><u>STATUS FUNGSIONAL</u></label>';
			asskephis += '</div>';  
			asskephis += '<div class="col-md-12 p2">';
			switch (a[i]['status_fungsional']){
			case '1':
				asskephis += '<textarea class="form-control " id="kepstatusfungsionalrmhis" readonly="">Mandiri</textarea>';
				break;
			case '2':
				asskephis += '<textarea class="form-control " id="kepstatusfungsionalrmhis" readonly="">Perlu bantuan</textarea>';
				break;
			case '3':
				asskephis += '<textarea class="form-control " id="kepstatusfungsionalrmhis" readonly="">Ketergantungan total</textarea>';
				break;
			default:
			}
			asskephis += '</div>';
			asskephis += '<div class="col-md-12 p4">';
			asskephis += '<hr>';
			asskephis += '<label class="form-label"><u>SKRINING RISIKO CEDERA/ JATUH (Usia <13 - >60 Tahun) menggunakan Up and Go Test (Pasien ini berumur 69 Tahun) *</u></label>';
			asskephis += '</div>';

			if (a[i]['cara_berjalan']=='1') {
				asskephis += '<div class="col-md-12 p2"><textarea class="form-control " id="kepresikojatuhrmhis"  readonly="">Pasien tidak sempoyongan/ limbung</textarea></div>';
			} else {
				asskephis += '<div class="col-md-12 p2"><textarea class="form-control " id="kepresikojatuhrmhis"  readonly="">Pasien sempoyongan/ limbung</textarea></div>';
			}

			if (a[i]['cara_pegang']=='1') {
				asskephis += '<div class="col-md-12 p2"><textarea class="form-control " id="kepresikojatuhrmhis"  readonly="">Pasien tidak perlu penopang saat akan duduk</textarea></div>';
			} else {
				asskephis += '<div class="col-md-12 p2"><textarea class="form-control " id="kepresikojatuhrmhis"  readonly="">Pasien penopang saat akan duduk</textarea></div>';
			}

			if (a[i]['resiko_jatuh']=='1') {
				asskephis += '<div class="col-md-12 p2"><textarea class="form-control " id="kepresikojatuhrmhis"  readonly="">Tidak Berisiko Jatuh</textarea></div>';
			} else if(a[i]['resiko_jatuh']=='2'){
				asskephis += '<div class="col-md-12 p2"><textarea class="form-control " id="kepresikojatuhrmhis"  readonly="">Risiko Jatuh Rendah</textarea></div>';
			}else{
				asskephis += '<div class="col-md-12 p2"><textarea class="form-control " id="kepresikojatuhrmhis"  readonly="">Risiko Jatuh Tinggi</textarea></div>';
			}
			asskephis += '<div class="col-md-12 p4">';
			asskephis += '<hr>';
			asskephis += '<label class="form-label"><u>Saran tindakan</u></label>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-12 p2"><textarea class="form-control " id="kepketresikojatuhrmhis" readonly="">'+a[i]['ket_resiko_jatuh']+'</textarea></div>';


			asskephis += '<div class="col-md-12 p4">';
			asskephis += '<hr>';
			asskephis += '<label class="form-label"><u>ASPEK PENGKAJIAN NYERI</u></label>';
			asskephis += '</div>';  


			asskephis += '<div class="col-md-2" style="text-align: center;">';
			asskephis += '<div>';
			asskephis += '<img src="'+url+'/_assets/nyeri0.png" style="width: 50px;height: 50px;">';
			asskephis += '</div>';
			asskephis += '<div>';
			asskephis += '<label class="form-label">Tidak Nyeri</label>';
			asskephis += '</div>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-2" style="text-align: center;">';
			asskephis += '<div>';  
			asskephis += '<img src="'+url+'/_assets/nyeri2.png" style="width: 50px;height: 50px;">';
			asskephis += '</div>';
			asskephis += '<div>';
			asskephis += '<label class="form-label">Sedikit Nyeri</label>';
			asskephis += '</div>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-2" style="text-align: center;">';
			asskephis += '<div>';  
			asskephis += '<img src="'+url+'/_assets/nyeri4.png" style="width: 50px;height: 50px;">';
			asskephis += '</div>';
			asskephis += '<div>';
			asskephis += '<label class="form-label">Sedikit Nyeri</label>';
			asskephis += '</div>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-2" style="text-align: center;">';
			asskephis += '<div>';  
			asskephis += '<img src="'+url+'/_assets/nyeri6.png" style="width: 50px;height: 50px;">';
			asskephis += '</div>';
			asskephis += '<div>';
			asskephis += '<label class="form-label">Sedikit Nyeri</label>';
			asskephis += '</div>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-2" style="text-align: center;">';
			asskephis += '<div>'; 
			asskephis += '<img src="'+url+'/_assets/nyeri8.png" style="width: 50px;height: 50px;">';
			asskephis += '</div>';
			asskephis += '<div>';
			asskephis += '<label class="form-label">Sedikit Nyeri</label>';
			asskephis += '</div>';
			asskephis += '</div>';
			asskephis += '<div class="col-md-2" style="text-align: center;">';
			asskephis += '<div>';  
			asskephis += '<img src="'+url+'/_assets/nyeri10.png" style="width: 50px;height: 50px;">';
			asskephis += '</div>';
			asskephis += '<div>';
			asskephis += '<label class="form-label">Sedikit Nyeri</label>';
			asskephis += '</div>';
			asskephis += '</div>';
			if (a[i]['skorface']=='0') {

				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="0" checked="true"><label>0</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="1" ><label>1</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="2" ><label>2</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="3" ><label>3</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="4" ><label>4</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="5" ><label>5</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="6" ><label>6</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="7" ><label>7</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="8" ><label>8</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="9" ><label>9</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="10" ><label>10</label></div>';

			}
			if (a[i]['skorface']=='1') {

				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="0" ><label>0</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" checked="true" name="ermrwjkeperawatanskorfacehis" value="1"><label>1</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="2" ><label>2</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="3" ><label>3</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="4" ><label>4</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="5" ><label>5</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="6" ><label>6</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="7" ><label>7</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="8" ><label>8</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="9" ><label>9</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="10" ><label>10</label></div>';
			}
			if (a[i]['skorface']=='2') {

				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="0" ><label>0</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="1" ><label>1</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" checked="true" name="ermrwjkeperawatanskorfacehis" value="2"><label>2</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="3" ><label>3</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="4" ><label>4</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="5" ><label>5</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="6" ><label>6</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="7" ><label>7</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="8" ><label>8</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="9" ><label>9</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="10" ><label>10</label></div>';

			}
			if (a[i]['skorface']=='3') {

				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="0" ><label>0</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="1" ><label>1</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="2" ><label>2</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" checked="true" name="ermrwjkeperawatanskorfacehis" value="3"><label>3</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="4" ><label>4</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="5" ><label>5</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="6" ><label>6</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="7" ><label>7</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="8" ><label>8</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="9" ><label>9</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="10" ><label>10</label></div>';
			}
			if (a[i]['skorface']=='4') {

				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="0" ><label>0</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="1" ><label>1</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="2" ><label>2</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="3" ><label>3</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" checked="true" name="ermrwjkeperawatanskorfacehis" value="4"><label>4</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="5" ><label>5</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="6" ><label>6</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="7" ><label>7</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="8" ><label>8</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="9" ><label>9</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="10" ><label>10</label></div>';
			}
			if (a[i]['skorface']=='5') {

				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="0" ><label>0</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="1" ><label>1</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="2" ><label>2</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="3" ><label>3</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="4" ><label>4</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" checked="true" name="ermrwjkeperawatanskorfacehis" value="5"><label>5</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="6" ><label>6</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="7" ><label>7</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="8" ><label>8</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="9" ><label>9</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="10" ><label>10</label></div>';
			}
			if (a[i]['skorface']=='6') {

				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="0" ><label>0</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="1" ><label>1</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="2" ><label>2</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="3" ><label>3</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="4" ><label>4</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="5" ><label>5</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" checked="true" name="ermrwjkeperawatanskorfacehis" value="6"><label>6</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="7" ><label>7</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="8" ><label>8</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="9" ><label>9</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="10" ><label>10</label></div>';
			}
			if (a[i]['skorface']=='7') {

				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="0" ><label>0</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="1" ><label>1</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="2" ><label>2</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="3" ><label>3</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="4" ><label>4</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="5" ><label>5</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="6" ><label>6</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" checked="true" name="ermrwjkeperawatanskorfacehis" value="7"><label>7</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="8" ><label>8</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="9" ><label>9</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="10" ><label>10</label></div>';
			}
			if (a[i]['skorface']=='8') {

				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="0" ><label>0</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="1" ><label>1</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="2" ><label>2</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="3" ><label>3</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="4" ><label>4</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="5" ><label>5</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="6" ><label>6</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="7" ><label>7</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" checked="true" name="ermrwjkeperawatanskorfacehis" value="8"><label>8</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="9" ><label>9</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="10" ><label>10</label></div>';
			}
			if (a[i]['skorface']=='9') {

				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="0" ><label>0</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="1" ><label>1</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="2" ><label>2</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="3" ><label>3</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="4" ><label>4</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="5" ><label>5</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="6" ><label>6</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="7" ><label>7</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="8" ><label>8</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" checked="true" name="ermrwjkeperawatanskorfacehis" value="9"><label>9</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="10" ><label>10</label></div>';
			}
			if (a[i]['skorface']=='10') {

				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="0" ><label>0</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="1" ><label>1</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="2" ><label>2</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="3" ><label>3</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="4" ><label>4</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="5" ><label>5</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="6" ><label>6</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="7" ><label>7</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="8" ><label>8</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" name="ermrwjkeperawatanskorfacehis" value="9" ><label>9</label></div>';
				asskephis += '<div class="col-md-1"><input type="radio" checked="true" name="ermrwjkeperawatanskorfacehis" value="10"><label>10</label></div>';
			}
			asskephis += '<div class="col-md-1"></div>';

			asskephis += '<div class="col-md-12 p4">';
			asskephis += '<hr>';
			asskephis += '<label class="form-label"><u>DAFTAR DIAGNOSA KEPERAWATAN & INTERVENSI KEPERAWATAN *</u></label>';
			asskephis += '</div>';

			asskephis +='<div class="col-md-12">';
			asskephis +='<h5>Intervensi Keperawatan</h5>';                      
			asskephis +='<textarea class="form-control" id="intervensiErmKeperawatanIrjahis" readonly>'+a[i]['intervensi_kep']+'</textarea>';
			asskephis +='</div>'; 
			asskephis +='<div class="col-md-12">';   
			asskephis +='<h5>Diagnosa Keperawatan</h5>';                  
			asskephis +='<textarea class="form-control" id="DiagnosaErmKeperawatanIrjahis" readonly>'+a[i]['diagnosa_kep']+'</textarea>';
			asskephis +='</div>';
			asskephis +='<div><button class="btn btn-primary" onclick="updateasskepirna(`'+a[i]['id_kunjungan']+'`,`'+a[i]['id_transaksi']+'`,`'+a[i]['id_unit']+'`)">Update</button></div>';
			asskephis += '</div>';
			asskephis += '</div>';
		}  
		document.getElementById("idpanelhistorirmperawat"+idkunjunganhistori+"").innerHTML = asskephis;
	})}
function updateassgiziirna(idkunjunganhistori,idunit) {
	var param = {
		id_kunjungan: idkunjunganhistori,
		idunit:idunit,
	};
	/**/
	apiPOST('Rekammedisirna/dataassesmengiziirna', param, hasil => {
		var a = hasil['data'];
		for (var i = 0; i < a.length; i++) {
		}
		document.getElementById('linkassesmengizi').click();
	});
}
function updateasskepirna(idkunjunganhistori,id_transaksi,idunit) {
	document.getElementById("assesmentperawatanirna_loading").style.display = 'block';
	var param = {
		id: idkunjunganhistori,
		idunit:idunit,
		id_transaksi:id_transaksi,
	};

	apiPOST('Rekammedisirna/datakunjunganrmkeperdetail', param, hasil => {
		document.getElementById("assesmentperawatanirna_loading").style.display = 'none';
		var a = hasil['data'];
		for (var i = 0; i < a.length; i++) {

			$('#reviewasskepirna').click();
			document.getElementById('intervensiasskepErmIrna').value  =a[i]['intervensi_kep'];
			document.getElementById('DiagnosaasskepErmIrna').value    =a[i]['diagnosa_kep'];
			document.getElementById('fisikStatusLocalisasskepErmIrna').value =a[i]['status_lokalis'];
			document.getElementById('keluhanutamaKeperawatanErmIrna').value =a[i]['keluhan_utama'];
			document.getElementById('RiwayatPenyakitNowasskepErmIrna').value=a[i]['penyakit_sekarang'];
			document.getElementById('RestrainAssKeperawatanErmIrna').value  =a[i]['pengguna_restrain'];
			if (a[i]['alasan_restrain']>'') {

				document.getElementById('alasanRestrainAssKeperawatanErmIrna').value=a[i]['alasan_restrain'];
			} 
			document.getElementById('BudayaAssKeperawatanErmIrna').value    =a[i]['budaya'];
			//document.getElementById('KetBudayaAssKeperawatanErmIrna').value =a[i]['budaya_ket'];
			document.getElementById('TinggalBersamaAssKeperawatanErmIrna').value=a[i][''];
			document.getElementById('StatusMentalAssKeperawatanErmIrna').value=a[i]['status_mental'];
			document.getElementById('StatusPsikoAssKeperawatanErmIrna').value=a[i]['status_psikologi'];
			/*tanda vital*/
			document.getElementById('KeadaanUmumAssPerawatErmIrna').value = a[i]['keadaan_umum'];
			document.getElementById('respirasiAssPerawatErmIrna').value = a[i]['respirasi'];
			document.getElementById('nadiAssPerawatErmIrna').value = a[i]['nadi'];
			document.getElementById('Spo2AssPerawatErmIrna').value = a[i]['spo2'];
			document.getElementById('pupilkiriAssPerawatErmIrna').value = a[i]['pupil_kiri'];
			document.getElementById('pupilkananAssPerawatErmIrna').value = a[i]['pupil_kanan'];
			document.getElementById('tekananDarahAssPerawatErmIrna1').value = a[i]['tekanan_darah1'];
			document.getElementById('tekananDarahAssPerawatErmIrna2').value = a[i]['tekanan_darah2'];
			document.getElementById('palpasiAssPerawatErmIrna').value = a[i]['palpasi'];
			document.getElementById('suhuAssPerawatErmIrna').value = a[i]['suhu'];
			document.getElementById('bbAssPerawatErmIrna').value = a[i]['bb'];
			document.getElementById('tinggiAssPerawatErmIrna').value = a[i]['tinggi_badan'];
			document.getElementById('reflekCahayaKiriAssPerawatErmIrna').value = a[i]['reflek_cahaya_kiri'];
			document.getElementById('reflekCahayaKananAssPerawatErmIrna').value = a[i]['reflek_cahaya_kanan'];
			document.getElementById('imtAssPerawatErmIrna').value =a[i]['imt'];

			var imgttdDokter = document.getElementById('Gambarpaint_ttdassesmenperawatirna'); 
			imgttdDokter.src = a[i]['ttd'];

			if (a[i]['status_fungsional']=='1') {
				document.getElementById('ermrwjkeperawatanfungsional1').checked='true';
			} else if (a[i]['status_fungsional']=='2') {
				document.getElementById('ermrwjkeperawatanfungsional2').checked='true';
			}else{
				document.getElementById('ermrwjkeperawatanfungsional3').checked='true';
			}

			if (a[i]['cara_berjalan']=='1') {
				document.getElementById('ermrwjkeperawatankeseimbangan1').checked='true';
			} else {
				document.getElementById('ermrwjkeperawatankeseimbangan2').checked='true'; 
			}

			if (a[i]['cara_pegang']=='1') {
				document.getElementById('ermrwjkeperawatanpenopang1').checked='true';
			} else {
				document.getElementById('ermrwjkeperawatanpenopang2').checked='true';
			}

			if (a[i]['resiko_jatuh']=='1') {
				document.getElementById('ermrwjkeperawatanhasilskrining1').checked='true';
			} else if (a[i]['resiko_jatuh']=='2'){
				document.getElementById('ermrwjkeperawatanhasilskrining2').checked='true';
			}else{
				document.getElementById('ermrwjkeperawatanhasilskrining3').checked='true';
			}

			if (a[i]['bicara']=='1') {
				document.getElementById('KebKomBicaraasskepErmIrna1').checked='true';
			} else {
				document.getElementById('KebKomBicaraasskepErmIrna2').checked='true';
			}

			if (a[i]['penerjemah']=='1') {
				document.getElementById('PenerjemahasskepErmIrna1').checked='true';
			} else {
				document.getElementById('PenerjemahasskepErmIrna2').checked='true';
			}
			if (a[i]['bhs_isyarat']=='1') {
				document.getElementById('IsyaratasskepErmIrna1').checked='true';
			} else {
				document.getElementById('IsyaratasskepErmIrna2').checked='true';
			}
			if (a[i]['hambatan']=='1') {
				document.getElementById('HamBelajarasskepErmIrna1').checked='true';
			} else {
				document.getElementById('HamBelajarasskepErmIrna2').checked='true';
			}


			switch (a[i]['skorface']){
			case '0':
				document.getElementById('keperawatanskorfaceermirna').checked='true';
				break;
			case '1':
				document.getElementById('keperawatanskorfaceermirna1').checked='true';
				break;
			case '2':
				document.getElementById('keperawatanskorfaceermirna2').checked='true';
				break;
			case '3':
				document.getElementById('keperawatanskorfaceermirna3').checked='true';
				break;
			case '4':
				document.getElementById('keperawatanskorfaceermirna4').checked='true';
				break;
			case '5':
				document.getElementById('keperawatanskorfaceermirna5').checked='true';
				break;
			case '6':
				document.getElementById('keperawatanskorfaceermirna6').checked='true';
				break;
			case '7':
				document.getElementById('keperawatanskorfaceermirna7').checked='true';
				break;
			case '8':
				document.getElementById('keperawatanskorfaceermirna8').checked='true';
				break;
			case '9':
				document.getElementById('keperawatanskorfaceermirna9').checked='true';
				break;
			case '10':
				document.getElementById('keperawatanskorfaceermirna10').checked='true';
				break;
			default:
			}

			document.getElementById('fisikKepalaermirnaKet').value=a[i]['kepala_ket'];
			switch (a[i]['kepala']){
			case "1":
				document.getElementById('fisikKepalaermirna1').checked='true';
				break;
			case "2":
				document.getElementById('fisikKepalaermirna2').checked='true';
				break;
			}

			document.getElementById('fisikJantungermirnaKet').value=a[i]['jantung_ket'];
			switch (a[i]['jantung']){
			case "1":
				document.getElementById('fisikJantungermirna1').checked='true';
				break;
			case "2":
				document.getElementById('fisikJantungermirna2').checked='true';
				break; 
			}

			switch (a[i]['mata']){
			case "1":
				document.getElementById('fisikMataermirna1').checked='true';
				break;
			case "2":
				document.getElementById('fisikMataermirna2').checked='true';
				break; 
			}
			document.getElementById('fisikMataermirnaKet').value=a[i]['mata_ket'];

			document.getElementById('fisikParuermirnaKet').value=a[i]['paru_ket'];
			switch (a[i]['paru']){
			case "1":
				document.getElementById('fisikParuermirna1').checked='true';
				break;
			case "2":
				document.getElementById('fisikParuermirna2').checked='true';
				break; 
			}

			document.getElementById('fisikThtermirnaKet').value=a[i]['tht_ket'];
			switch (a[i]['tht']){
			case "1":
				document.getElementById('fisikThtermirna1').checked='true';
				break;
			case "2":
				document.getElementById('fisikThtermirna2').checked='true';
				break; 
			}

			document.getElementById('fisikAbdomenermirnaKet').value=a[i]['abdomen_ket']; 
			switch (a[i]['abdomen']){
			case "1":
				document.getElementById('fisikAbdomenermirna1').checked='true';
				break;
			case "2":
				document.getElementById('fisikAbdomenermirna2').checked='true';
				break; 
			}   

			document.getElementById('fisikLeherermirnaKet').value=a[i]['leher_ket'];
			switch (a[i]['leher']){
			case "1":
				document.getElementById('fisikLeherermirna1').checked='true';
				break;
			case "2":
				document.getElementById('fisikLeherermirna2').checked='true';
				break; 
			}

			document.getElementById('fisikGenitaliaermirnaKet').value=a[i]['genitalia_ket'];
			switch (a[i]['genitalia']){
			case "1":
				document.getElementById('fisikGenitaliaermirna1').checked='true';
				break;
			case "2":
				document.getElementById('fisikGenitaliaermirna2').checked='true';
				break; 
			}

			document.getElementById('fisikMulutermirnaKet').value=a[i]['mulut_ket'];
			switch (a[i]['mulut']){
			case "1":
				document.getElementById('fisikMulutermirna1').checked='true';
				break;
			case "2":
				document.getElementById('fisikMulutermirna2').checked='true';
				break; 
			}

			document.getElementById('fisikThoraxermirnaKet').value=a[i]['thoraks_ket'];
			switch (a[i]['thoraks']){
			case "1":
				document.getElementById('fisikThoraxermirna1').checked='true';
				break;
			case "2":
				document.getElementById('fisikThoraxermirna2').checked='true';
				break; 
			}

		}
	})
}
function assesmenirnadokterhistoriupdate(idkunjunganhistori,id_transaksi) {
	document.getElementById('reviewassmedirna').click();
	document.getElementById("erekammedisRWJ_loading").style.display = 'block';
	var param = {
		id: idkunjunganhistori,id_transaksi:id_transaksi,
	};
	apiPOST('Rekammedisirja/datakunjunganrmmedisdetail', param, hasil => {
		document.getElementById("erekammedisRWJ_loading").style.display = 'none';
    //$('#idunitErmIrja').val()=a[i]['keluhan_utama'];
		var a = hasil['data'];
		for (var i = 0; i < a.length; i++) {
    //$('#idKunjunganErmIrja').val()=idkunjunganhistori;
			document.getElementById('keluhanutamaermirna').value=a[i]['keluhan_utama'];
			document.getElementById('RiwayatPenyakitNowermirna').value=a[i]['penyakit_sekarang'];
			switch (a[i]['tinggal']){
			case "1":
				document.getElementById('TinggalBersamaermirna1').checked='true';
				break;
			case "2":
				document.getElementById('TinggalBersamaermirna2').checked='true';
				break;
			case "3":
				document.getElementById('TinggalBersamaermirna3').checked='true';
				break;
			case "4":
				document.getElementById('TinggalBersamaermirna4').checked='true';
				break;
			case "5":
				document.getElementById('TinggalBersamaermirna5').checked='true';
				break;
			}

			switch (a[i]['status_mental']){
			case "1":
				document.getElementById('statusmentalermirna1').checked='true';
				break;
			case "2":
				document.getElementById('statusmentalermirna2').checked='true';
				break;
			case "3":
				document.getElementById('statusmentalermirna3').checked='true';
				break;
			case "4":
				document.getElementById('statusmentalermirna4').checked='true';
				break;
			case "5":
				document.getElementById('statusmentalermirna5').checked='true';
				break;

			}

    //
			switch (a[i]['status_psikologi']){
			case "1":
				document.getElementById('statusPsikologisermirna1').checked='true';
				break;
			case "2":
				document.getElementById('statusPsikologisermirna2').checked='true';
				break;
			case "3":
				document.getElementById('statusPsikologisermirna3').checked='true';
				break;
			case "4":
				document.getElementById('statusPsikologisermirna4').checked='true';
				break;
			case "5":
				document.getElementById('statusPsikologisermirna5').checked='true';
				break;
			case "6":
				document.getElementById('statusPsikologisermirna6').checked='true';
				break;
			case "7":
				document.getElementById('statusPsikologisermirna7').checked='true';
				break;
			case "8":
				document.getElementById('statusPsikologisermirna8').checked='true';
				break;
			case "9":
				document.getElementById('statusPsikologisermirna9').checked='true';
				break;
			case "10":
				document.getElementById('statusPsikologisermirna10').checked='true';
				break;
			}

			switch (a[i]['pengguna_restrain']){
			case "1":
				document.getElementById('penggunaanRestrainermirna1').checked='true';
				break;
			case "2":
				document.getElementById('penggunaanRestrainermirna2').checked='true';
				break;
			}

			document.getElementById('Budayaermirna').value        =a[i]['budaya'];
			document.getElementById('KeadaanUmumAssMedirna').value=a[i]['keadaan_umum'];
			document.getElementById('respirasiAssMedirna').value=a[i]['respirasi'];
			document.getElementById('nadiAssMedirna').value=a[i]['nadi'];
			document.getElementById('Spo2AssMedirna').value=a[i]['spo2'];
			document.getElementById('pupilkiriAssMedirna').value=a[i]['pupil_kiri'];
			document.getElementById('pupilkananAssMedirna').value=a[i]['pupil_kanan'];;
			document.getElementById('tekananDarahermirna1').value=a[i]['tekanan_darah1']; 
			document.getElementById('tekananDarahermirna1').value=a[i]['tekanan_darah2'];; 
			document.getElementById('palpasiermirna').value=a[i]['palpasi'];
			document.getElementById('suhuermirna').value=a[i]['suhu'];
			document.getElementById('reflekCahayaKiriermirna').value= a[i]['reflek_cahaya_kiri'];;
			document.getElementById('reflekCahayaKananermirna').value= a[i]['reflek_cahaya_kanan'];
			document.getElementById('bbermirna').value=a[i]['bb'];
			document.getElementById('tinggiermirna').value=a[i]['tinggi_badan'];
			document.getElementById('imtermirna').value=a[i]['imt'];
			document.getElementById('tipekesadaranassmedermirna').value=a[i]['skor_kesadaran'];
			document.getElementById('Assesmenermirna').value=a[i]['assesmen_medis'];
			document.getElementById('tindakanermirna').value=a[i]['tindakan_medis'];
			document.getElementById('planningermirna').value=a[i]['planning_medis'];
			document.getElementById('fisikStatusLocalisermirna').value=a[i]['status_lokalis'];

			var imgttdDokterMedis = document.getElementById('Gambarpaint_ttdassesmenmedisirna'); 
			imgttdDokterMedis.src = a[i]['ttd'];

			switch (a[i]['pasien_kompleks']){
			case "1":
				document.getElementById('pasienKompleksermirna1').checked='true';
				break;
			case "2":
				document.getElementById('pasienKompleksermirna2').checked='true';
				break;
			}

			document.getElementById('fisikKepalaermirnaKet').value=a[i]['kepala_ket'];
			switch (a[i]['kepala']){
			case "1":
				document.getElementById('fisikKepalaermirna1').checked='true';
				break;
			case "2":
				document.getElementById('fisikKepalaermirna2').checked='true';
				break;
			}

			document.getElementById('fisikJantungermirnaKet').value=a[i]['jantung_ket'];
			switch (a[i]['jantung']){
			case "1":
				document.getElementById('fisikJantungermirna1').checked='true';
				break;
			case "2":
				document.getElementById('fisikJantungermirna2').checked='true';
				break; 
			}

			switch (a[i]['mata']){
			case "1":
				document.getElementById('fisikMataermirna1').checked='true';
				break;
			case "2":
				document.getElementById('fisikMataermirna2').checked='true';
				break; 
			}
			document.getElementById('fisikMataermirnaKet').value=a[i]['mata_ket'];

			document.getElementById('fisikParuermirnaKet').value=a[i]['paru_ket'];
			switch (a[i]['paru']){
			case "1":
				document.getElementById('fisikParuermirna1').checked='true';
				break;
			case "2":
				document.getElementById('fisikParuermirna2').checked='true';
				break; 
			}

			document.getElementById('fisikThtermirnaKet').value=a[i]['tht_ket'];
			switch (a[i]['tht']){
			case "1":
				document.getElementById('fisikThtermirna1').checked='true';
				break;
			case "2":
				document.getElementById('fisikThtermirna1').checked='true';
				break; 
			}

			document.getElementById('fisikAbdomenermirnaKet').value=a[i]['abdomen_ket']; 
			switch (a[i]['abdomen']){
			case "1":
				document.getElementById('fisikAbdomenermirna1').checked='true';
				break;
			case "2":
				document.getElementById('fisikAbdomenermirna2').checked='true';
				break; 
			}   

			document.getElementById('fisikLeherermirnaKet').value=a[i]['leher_ket'];
			switch (a[i]['leher']){
			case "1":
				document.getElementById('fisikLeherermirna1').checked='true';
				break;
			case "2":
				document.getElementById('fisikLeherermirna2').checked='true';
				break; 
			}

			document.getElementById('fisikGenitaliaermirnaKet').value=a[i]['genitalia_ket'];
			switch (a[i]['genitalia']){
			case "1":
				document.getElementById('fisikGenitaliaermirna1').checked='true';
				break;
			case "2":
				document.getElementById('fisikGenitaliaermirna2').checked='true';
				break; 
			}

			document.getElementById('fisikMulutermirnaKet').value=a[i]['mulut_ket'];
			switch (a[i]['mulut']){
			case "1":
				document.getElementById('fisikMulutermirna1').checked='true';
				break;
			case "2":
				document.getElementById('fisikMulutermirna2').checked='true';
				break; 
			}

			document.getElementById('fisikThoraxermirnaKet').value=a[i]['thoraks_ket'];
			switch (a[i]['thoraks']){
			case "1":
				document.getElementById('fisikThoraxermirna1').checked='true';
				break;
			case "2":
				document.getElementById('fisikThoraxermirna2').checked='true';
				break; 
			}
/*    $('#dacrjasesmengigmedis_glidahket').val()=a[i][''];
    $('#dacrjasesmengigmedis_gmukosapipi').val()=a[i][''];
    document.querySelector('input[name=dacrjasesmengigmedis_goklusiId]:checked').value,
    document.querySelector('input[name=dacrjasesmengigmedis_gtorus1Id]:checked').value,
    document.querySelector('input[name=dacrjasesmengigmedis_gtorus2Id]:checked').value,
    document.querySelector('input[name=dacrjasesmengigmedis_gpalatumId]:checked').value,
    document.querySelector('input[name=dacrjasesmengigmedis_gdiastemaId]:checked').value,
    $('#dacrjasesmengigmedis_gdiastemaket').val()=a[i][''];
    $('#dacrjasesmengigmedis_ganomaliId').val()=a[i][''];
    $('#dacrjasesmengigmedis_ganomaliket').val()=a[i][''];
    document.querySelector('input[name=dacrjasesmengigmedis_gfrenulum1Id]:checked').value,
    document.querySelector('input[name=dacrjasesmengigmedis_gfrenulum2Id]:checked').value,
    document.querySelector('input[name=dacrjasesmengigmedis_gohisId]:checked').value,
    $('#dacrjasesmengigmedis_gtemuanlain').val(),*/
      //mata
/*    $('#dacrjasesmenmatmedis_mod').val()=a[i][''];
    $('#dacrjasesmenmatmedis_mos').val()=a[i][''];
    $('#dacrjasesmenmatmedis_madisi').val()=a[i][''];
    $('#dacrjasesmenmatmedis_mavod').val()=a[i][''];
    $('#dacrjasesmenmatmedis_mavos').val()=a[i][''];
    document.querySelector('input[name=dacrjasesmenmatmedis_mishiharaId]:checked').value,
    $('#dacrjasesmenmatmedis_mschimer1').val()=a[i][''];
    $('#dacrjasesmenmatmedis_mschimer2').val()=a[i][''];
      //obgyn
    document.querySelector('input[name=dacrjasesmenmtmedis_obgId]:checked').value,
    $('#dacrjasesmenmtmedis_otfu').val()=a[i][''];
    $('#dacrjasesmenmtmedis_olila').val()=a[i][''];
    $('#dacrjasesmenmtmedis_ohis').val()=a[i][''];
    $('#dacrjasesmenmtmedis_ohislama').val()=a[i][''];
    $('#dacrjasesmenmtmedis_odjj').val()=a[i][''];
    $('#dacrjasesmenmtmedis_ovulva').val()=a[i][''];
    $('#dacrjasesmenmtmedis_oportio').val()=a[i][''];
    $('#dacrjasesmenmtmedis_ocorpus').val()=a[i][''];
    $('#dacrjasesmenmtmedis_oparametrium').val()=a[i][''];
    $('#dacrjasesmenmtmedis_ocavum').val()=a[i][''];
    $('#dacrjasesmenmtmedis_ovulvadalam').val()=a[i][''];
    $('#dacrjasesmenmtmedis_oportiodalam').val()=a[i][''];
    $('#dacrjasesmenmtmedis_opembukaan').val()=a[i][''];
    $('#dacrjasesmenmtmedis_ohodge').val()=a[i][''];
    $('#dacrjasesmenmtmedis_opresentasi').val()=a[i][''];
    $('#dacrjasesmenmtmedis_oketuban').val()=a[i][''];
      //hd
    document.querySelectorAll('input[name="dacrjasesmenmedishd_kolaborasihdlist_1"]:checked'),
    document.querySelectorAll('input[name="dacrjasesmenmedishd_kolaborasihdlist_2"]:checked'),
    document.querySelectorAll('input[name="dacrjasesmenmedishd_kolaborasihdlist_3"]:checked'),
    document.querySelectorAll('input[name="dacrjasesmenmedishd_kolaborasihdlist_4"]:checked'),
    document.querySelectorAll('input[name="dacrjasesmenmedishd_kolaborasihdlist_5"]:checked'),
    document.querySelectorAll('input[name="dacrjasesmenmedishd_kolaborasihdlist_6"]:checked'),
    document.querySelectorAll('input[name="dacrjasesmenmedishd_kolaborasihdlist_7"]:checked'),
    document.querySelectorAll('input[name="dacrjasesmenmedishd_kolaborasihdlist_8"]:checked'),
    document.querySelectorAll('input[name="dacrjasesmenmedishd_kolaborasihdlist_9"]:checked'),
    $('#dacrjasesmenmedishd_kolaborasihdlain').val(),
    document.querySelector('input[name=dacrjasesmenmedishd_resephd]:checked').value
    document.querySelector('input[name=dacrjasesmenmedishd_dialisat]:checked').value,
    document.querySelector('input[name=dacrjasesmenmedishd_pprofilinglist]:checked').value,
    document.querySelector('input[name=dacrjasesmenmedishd_heparinisasilist]:checked').value,
    $('#dacrjasesmenmedishd_ufg').val()=a[i][''];
    $('#dacrjasesmenmedishd_qb').val()=a[i][''];
    $('#dacrjasesmenmedishd_qd').val()=a[i][''];
    $('#dacrjasesmenmedishd_ureumpre').val()=a[i][''];
    $('#dacrjasesmenmedishd_ureumpost').val()=a[i][''];
    $('#dacrjasesmenmedishd_frekuensi').val()=a[i][''];
    $('#dacrjasesmenmedishd_urasihd').val()=a[i][''];
    $('#dacrjasesmenmedishd_urasihdmenit').val()=a[i][''];
    $('#dacrjasesmenmedishd_ufr').val()=a[i][''];
    $('#dacrjasesmenmedishd_urr').val()=a[i][''];
    $('#dacrjasesmenmedishd_obatin').val()=a[i][''];
    $('#EvaluasiErmIrja').val()=a[i][''];*/
		}
	})
}
function saveSoapirna() {
	var param={
		subjek        : $('#subjekermirna').val(), 
		objek         : $('#objekermirna').val(),
		assesmen      : $('#caridiagnosacpptmedisirna').val(),
		planning      : $('#intervensiermirna').val(),
		instruksi     : $('#instruksiermirna').val(),
		id_pegawai    : user.kd_user,
		rm            : $('#rmermirna').val(),
		unit          : $('#idunitermirna').val(),
		id_kunjungan  : $('#idKunjunganermirna').val(),
		saturasi      : $('#cpptsaturasiermirna').val(),
		nadi          : $('#cpptnadiermirna').val(),
		suhu          : $('#cpptsuhuermirna').val(),
		tekanandarah  : $('#cppttekanandarahermirna').val(),
		tekanandarah2 : $('#cppttekanandarah2ermirna').val(),
		Spo2          : $('#cpptSpo2ermirna').val(), 
		tindakan      : $('#cppttindakanermirna').val(),
		id_transaksi  : $('#transaksiermirna').val(),
		urut_masuk    : $('#urut_masukermirna').val(),
		tgl_masuk     : $('#tgl_masukermirna').val(),
		gcs           : $('#gcsermirna').val()
	};
	apiPOST('Rekammedisirna/addeErmirna', param, hasil => {
		if (hasil['pesan']=='Berhasil') {
      //alert(hasil['pesan']); 
      //tampilstatuskeluarassesmenmesiirja();
			//$('#Modalinputtindakanermirja').modal('show');
			$('#ModalInputSoapErmIrna').modal('hide');
		}else{
			alert(hasil['data']); 
		}
	})
}

function load_edukasiirnautama() {
	onCall_EdukasiPasien();
	document.getElementById("loading_edukasi_irna").style.display = 'block';
	var param = {
		norm          	: $('#rmermirna').val(),
		id_kunjungan  	: $('#idKunjunganermirna').val(),
		id_transaksi  	: $('#transaksiermirna').val(),
	};

	apiPOST('Rekammedisirna/load_edukasiirnautama', param, hasil => {
		document.getElementById("loading_edukasi_irna").style.display = 'none';
		if (hasil['data'] != null){
			if (hasil['code'] == '200'){
				
				var Data  			= hasil['data'];
				var DetailEdukasi  	= hasil['detail'];
				var dok 			= Data[0].hambatan.split(',');
				console.log(dok.length);
				//if(dok.length !== 1){
				for(var i=0; i<dok.length; i++){
					$("#edukasipasien_bedukasi_"+dok[i]).prop("checked", true);
					$("#edukasipasien_bedukasi_1").prop("checked", false);
				}
				// }else{
				// 	$("input[name='edukasipasien_bedukasi']").prop('checked', false);
				// 	$("#edukasipasien_bedukasi_1").prop("checked", true);
				// }

				$("input[name='edukasipasien_bbahasa'][value='"+Data[0].bahasa+"']").prop('checked', true);
				$("input[name='edukasipasien_bpenerjemah'][value='"+Data[0].penerjemah+"']").prop('checked', true);
				$("input[name='edukasipasien_bkemampuan'][value='"+Data[0].baca+"']").prop('checked', true);
				$("input[name='edukasipasien_bterima'][value='"+Data[0].diterima+"']").prop('checked', true);

				document.getElementById("edukasipasien_bbahasaket").value 		= Data[0].bahasa_lain;
				document.getElementById("edukasipasien_bedukasiket11").value 	= Data[0].hambatan_lain;
				document.getElementById("edukasipasien_bkeyakinan").value 		= Data[0].keyakinan;
				document.getElementById("edukasipasien_bnilai").value 			= Data[0].nilai;
				document.getElementById("edukasipasien_calat").value 			= Data[0].penggunaan_alat;
				document.getElementById("edukasipasien_cplan").value 			= Data[0].planning;
				document.getElementById("edukasipasien_cdiag").value 			= Data[0].diagnosa_medis;

				document.getElementById("edukasipasien_dprogram_1").checked  	= Data[0].kondisi_medis;
				document.getElementById("edukasipasien_dprogram_2").checked		= Data[0].rencana_pengobatan;
				document.getElementById("edukasipasien_dprogram_3").checked		= Data[0].hasil_pengobatan;
				document.getElementById("edukasipasien_dprogram_4").checked		= Data[0].instruksi_perawatan;
				document.getElementById("edukasipasien_dprogram_5").checked		= Data[0].perubahan_kondisi;
				document.getElementById("edukasipasien_dprogram_6").checked		= Data[0].hak_dan_kewajiban;
				document.getElementById("edukasipasien_dprogram_7").checked		= Data[0].teknik;
				document.getElementById("edukasipasien_dprogram_8").checked		= Data[0].identifikasi;
				document.getElementById("edukasipasien_dprogram_9").checked		= Data[0].risiko_jatuh;
				document.getElementById("edukasipasien_dprogram_10").checked  	= Data[0].manajemen_nyeri;
				document.getElementById("edukasipasien_dprogram_11").checked	= Data[0].pasien_terminal;
				document.getElementById("edukasipasien_dprogram_12").checked	= Data[0].penggunaan_alat_medis;
				document.getElementById("edukasipasien_dprogram_13").checked	= Data[0].diet;
				document.getElementById("edukasipasien_dprogram_14").checked	= Data[0].pengelolaan_makanan;
				document.getElementById("edukasipasien_dprogram_15").checked	= Data[0].penggunaan_obat;
				document.getElementById("edukasipasien_dprogram_16").checked	= Data[0].potensi_efek;
				document.getElementById("edukasipasien_dprogram_17").checked	= Data[0].potensi_interaksi;
				document.getElementById("edukasipasien_dprogram_18").checked	= Data[0].teknik_rehabilitasi;
				document.getElementById("edukasipasien_dprogram_19").checked  	= Data[0].edukasi_lain_satu;
				document.getElementById("edukasipasien_dprogram_20").checked	= Data[0].edukasi_lain_dua;
				document.getElementById("edukasipasien_dprogram_21").checked	= Data[0].edukasi_lain_tiga;

				document.getElementById("edukasipasien_dprogramket19").value 	= Data[0].edukasi_lainket_satu;
				document.getElementById("edukasipasien_dprogramket20").value	= Data[0].edukasi_lainket_dua;
				document.getElementById("edukasipasien_dprogramket21").value	= Data[0].edukasi_lainket_tiga;

				edukasipasien_dprogram_19();
				edukasipasien_dprogram_20();
				edukasipasien_dprogram_21();
				edukasipasien_bbahasa_4();
				edukasipasien_bedukasi_11();
				load_detailedukasi_irna();

			}else{
				toastr.error("Edukasi Masih Kosong!!");
				load_detailedukasi_irna();	
			}

		}else{
			toastr.error("Edukasi Kosong!!");
		}
	})
}


function cetakgeneralconcent(){

	var param = {
		norm      : $('#rmermirna').val(),
		id_kunjungan:$('#idKunjunganermirna').val(),
	};
	newTabPOST('API/Laporan/cetakgeneralconcent',param);
	return;
}
function save_general_concent_irna() {
	var param={
		id_kunjungan:$('#idKunjunganermirna').val(),
		id_transaksi:$('#transaksiermirna').val(),
		rm            : $('#rmermirna').val(),
		dacconsent_tgl 	:$('#dacconsent_tgl').val(),
		dacconsent_nama3 	:$('#dacconsent_nama3').val(),
		dacconsent_alamat 	:$('#dacconsent_alamat').val(),
		dacconsent_nohp3 	:$('#dacconsent_nohp3').val(),
		dacconsent_hubungan3 	:$('#dacconsent_hubungan3').val(),

		dacconsent_nama1 	:$('#dacconsent_nama1').val(),
		dacconsent_nohp1 	:$('#dacconsent_nohp1').val(),
		dacconsent_hubungan1 	:$('#dacconsent_hubungan1').val(),

		dacconsent_nama2 	:$('#dacconsent_nama2').val(),
		dacconsent_nohp2 	:$('#dacconsent_nohp2').val(),
		dacconsent_hubungan2:$('#dacconsent_hubungan2').val(),

		dacconsent_privasi 	:$('#dacconsent_privasi').val(),
		dacconsent_privasi1 :$('#dacconsent_privasi1').val(),
		dacconsent_privasi2 :$('#dacconsent_privasi2').val(),
		ttdpenjelas:ttdgeneralconcent.getData(),
		ttdpasien:ttdgeneralpasienconcent.getData(),
		id_user : user.id_pegawai
	};
	apiPOST('Rekammedisirna/savegeneralconcent', param, hasil => {

	})
}
function saveUpdateSoapirna() {
	var param={
		id            : jamupdatesoap,
		subjek        : $('#subjekermirna').val(), 
		objek         : $('#objekermirna').val(),
		assesmen      : $('#caridiagnosacpptmedisirna').val(),
		planning      : $('#intervensiermirna').val(),
		instruksi     : $('#instruksiermirna').val(),
		id_pegawai    : user.id_pegawai,
		rm            : $('#rmermirna').val(),
		unit          : $('#idunitermirna').val(),
		id_kunjungan  : $('#idKunjunganermirna').val(),
		saturasi      : $('#cpptsaturasiermirna').val(),
		nadi          : $('#cpptnadiermirna').val(),
		suhu          : $('#cpptsuhuermirna').val(),
		tekanandarah  : $('#cppttekanandarahermirna').val(),
		tekanandarah2 : $('#cppttekanandarah2ermirna').val(),
		Spo2          : $('#cpptSpo2ermirna').val(), 
		tindakan      : $('#cppttindakanermirna').val(),
	};
	apiPOST('Rekammedisirna/updatesoapirna', param, hasil => {
		if (hasil['pesan']=='Berhasil') {
      //alert(hasil['pesan']); 
      //tampilstatuskeluarassesmenmesiirja();
			//$('#Modalinputtindakanermirja').modal('show');
			$('#ModalInputSoapErmIrna').modal('hide');
		}else{
			alert(hasil['data']); 
		}
	})
}

function simpanResumeIrna() {
	if (document.getElementById("CovidResumeermirna").checked == true) {
		covid='ya';
	} else {
		covid='tidak';
	}
	if (document.getElementById("alatBntResumeermirna").checked == true) {
		alat='ya';
	} else {
		alat='tidak';
	}
	if (document.getElementById("KasusBrResumeermirna").checked == true) {
		kasus='ya';
	} else {
		kasus='tidak';
	}
	param={
		id_kunjungan        :$('#idKunjunganermirna').val(),
		tgl_masuk           :$('#TglMasukResumeermirna').val(),
		tgl_keluar          :$('#TglKeluarResumeermirna').val(),
		dpjp                :$('#dpjpResumeermirna').val(),
		cara_masuk          :$('#caramasukResumeermirna').val(),
		berat_lahir         :$('#BBResumeermirna').val(),
		tgl                 :$('#tglResumeermirna').val(),
		riwayat_kesehatan   :$('#RiwayatKesResumeermirna').val(),
		pemeriksaan_fisik   :$('#PemeriksaanFisikResumeermirna').val(),
		pemeriksaan_diagnostik:$('#DiagnostikResumeermirna').val(),
		terapi              :$('#TerapiResumeermirna').val(),
		tindakan            :$('#TindakanResumeermirna').val(),
		instruksi           :$('#InstruksiResumeermirna').val(),
		diagnosis           :$('#DiagnosisResumeermirna').val(),
		diagnosissekunder   :$('#DiagnosisSekunderResumeermirna').val(),
		perkembangan_perawatan:$('#PerkembanganResumeermirna').val(),
		cara_keluar         :$('#CaraKeluarResumeermirna').val(),
		keadaan_umum        :$('#keadaanUmumResumeErmIrna').val(),
		kesadaran           :$('#kesadaranResumeermirna').val(),
		mobilitasi_plg      :$('#MblplgResumeermirna').val(),
		covid               :covid,
		tensi               :$('#tensiResumeermirna').val(),
		nadi                :$('#nadiResumeermirna').val(),
		alat_bantu          :alat,
		kasus_baru          :kasus, 
		suhu                :$('#SuhuResumeermirna').val(),
		respirasi           :$('#RespirasiResumeermirna').val(),
		alat_medis_terpasang:$('#AlatMedisResumeermirna').val(),
		kegiatan            :'0',
		instruksi_lanjutan  :$('#selectInstruksiResumeermirna').val(),
		transaksi 			:$('#transaksiermirna').val(),
		ttd 				:$('#HasilTtdDpjpResumeIrna').val(),
		ttdperawat 			:$('#HasilTtdPerawatResumeIrna').val(),
		ttdpasien  			:$('#HasilTtdPasienResumeIrna').val(),
		perawat 			:$('#perawatResumeermirna').val()
	};
	apiPOST('Rekammedisirna/saveResumeErmIrna',param,hasil=>{

	})

}
function simpanAssesmenMedisIrna() {
	var param={
		id_unit                     :$('#idunitermirna').val(),
		id_kunjungan                :$('#idKunjunganermirna').val(),
		keluhanutamaErmirna        :$('#keluhanutamaermirna').val(),
		RPenyakitNowErmirna  :$('#RiwayatPenyakitNowermirna').val(),

		TinggalBersamaErmirna      :document.querySelector('input[name=TinggalBersamaermirna]:checked').value,
		statusmentalErmirna        :document.querySelector('input[name=statusmentalermirna]:checked').value,
		statusPsikologis            :document.querySelector('input[name=statusPsikologisermirna]:checked').value,
		penggunaanRestrainErmirna  :document.querySelector('input[name=penggunaanRestrainermirna]:checked').value,
		BudayaErmirna              :$('#Budayaermirna').val(), 
		KeadaanUmumAssMedirna       :$('#KeadaanUmumAssMedirna').val(),
		respirasiAssMedirna         :$('#respirasiAssMedirna').val(),
		nadiAssMedirna              :$('#nadiAssMedirna').val(),
		Spo2AssMedirna              :$('#Spo2AssMedirna').val(),
		pupilAssMedirnaKiri         :$('#pupilkiriAssMedirna').val(),
		pupilAssMedirnaKanan        :$('#pupilkananAssMedirna').val(),
		tDarahErmirna1              :$('#tekananDarahermirna1').val(),
		tDarahErmirna2				:$('#tekananDarahermirna2').val(), 
		palpasiErmirna             :$('#palpasiermirna').val(),
		suhuErmirna                :$('#suhuermirna').val(),
		reflekCahayaKiriErmirna1    :$('#reflekCahayaKiriermirna').val(),
		reflekCahayaKiriErmirna2	:$('#reflekCahayaKananermirna').val(),
		bbErmirna                  :$('#bbermirna').val(),
		tinggiErmirna              :$('#tinggiermirna').val(),
		imtErmirna                 :$('#imtermirna').val(),
		dacrjasesmenmedis_bgcstot   :$('#tipekesadaranassmedermirna').val(),
		skorassesmenmedisErmIrna    :$('#skorassesmenmedisErmIrna').val(), 
		AssesmenErmirna            :$('#Assesmenermirna').val(),
		tindakanErmirna            :$('#tindakanermirna').val(),
		planningErmirna            :$('#planningermirna').val(),
		fisikStatusLocalisErmirna  :$('#fisikStatusLocalisermirna').val(),
		pasienKompleksErmirna      :document.querySelector('input[name=pasienKompleksermirna]:checked').value,
		fisikKepalaErmirna         :document.querySelector('input[name=fisikKepalaermirna]:checked').value,
		fisikKepalaErmirnaKet       :$('#fisikKepalaermirnaKet').val(),
		fisikJantungErmirna        :document.querySelector('input[name=fisikJantungermirna]:checked').value,
		fisikJantungErmirnaKet      :$('#fisikJantungermirnaKet').val(),
		fisikMataErmirna           :document.querySelector('input[name=fisikMataermirna]:checked').value,
		fisikMataErmirnaKet         :$('#fisikMataermirnaKet').val(),
		fisikParuErmirna           :document.querySelector('input[name=fisikParuermirna]:checked').value,
		fisikParuErmirnaKet         :$('#fisikParuermirnaKet').val(),
		fisikThtErmirna            :document.querySelector('input[name=fisikThtermirna]:checked').value,
		fisikThtErmirnaKet          :$('#fisikThtermirnaKet').val(),
		fisikAbdomenErmirna        :document.querySelector('input[name=fisikAbdomenermirna]:checked').value,
		fisikAbdomenErmirnaKet      :$('#fisikAbdomenermirnaKet').val(),                           
		fisikLeherErmirna          :document.querySelector('input[name=fisikLeherermirna]:checked').value,
		fisikLeherErmirnaKet        :$('#fisikLeherermirnaKet').val(),
		fisikGenitaliaErmirna      :document.querySelector('input[name=fisikGenitaliaermirna]:checked').value,
		fisikGenitaliaErmirnaKet    :$('#fisikGenitaliaermirnaKet').val(),
		fisikMulutErmirna          :document.querySelector('input[name=fisikMulutermirna]:checked').value,
		fisikMulutErmirnaKet        :$('#fisikMulutermirnaKet').val(),
		fisikThoraxErmirna         :document.querySelector('input[name=fisikThoraxermirna]:checked').value,
		fisikThoraxErmirnaKet       :$('#fisikThoraxermirnaKet').val(),
      //gigi
		// dacrjasesmengigmedis_glidahket   :$('#dacrjasesmengigmedis_glidahket').val(),
		// dacrjasesmengigmedis_gmukosapipi :$('#dacrjasesmengigmedis_gmukosapipi').val(),
		// dacrjasesmengigmedis_goklusiId   :document.querySelector('input[name=dacrjasesmengigmedis_goklusiId]:checked').value,
		// dacrjasesmengigmedis_gtorus1Id   :document.querySelector('input[name=dacrjasesmengigmedis_gtorus1Id]:checked').value,
		// dacrjasesmengigmedis_gtorus2Id   :document.querySelector('input[name=dacrjasesmengigmedis_gtorus2Id]:checked').value,
		// dacrjasesmengigmedis_gpalatumId  :document.querySelector('input[name=dacrjasesmengigmedis_gpalatumId]:checked').value,
		// dacrjasesmengigmedis_gdiastemaId :document.querySelector('input[name=dacrjasesmengigmedis_gdiastemaId]:checked').value,
		// dacrjasesmengigmedis_gdiastemaket:$('#dacrjasesmengigmedis_gdiastemaket').val(),
		// dacrjasesmengigmedis_ganomaliId  :$('#dacrjasesmengigmedis_ganomaliId').val(),
		// dacrjasesmengigmedis_ganomaliket :$('#dacrjasesmengigmedis_ganomaliket').val(),
		// dacrjasesmengigmedis_gfrenulum1Id:document.querySelector('input[name=dacrjasesmengigmedis_gfrenulum1Id]:checked').value,
		// dacrjasesmengigmedis_gfrenulum2Id:document.querySelector('input[name=dacrjasesmengigmedis_gfrenulum2Id]:checked').value,
		// dacrjasesmengigmedis_gohisId     :document.querySelector('input[name=dacrjasesmengigmedis_gohisId]:checked').value,
		// dacrjasesmengigmedis_gtemuanlain :$('#dacrjasesmengigmedis_gtemuanlain').val(),
      //mata
		// dacrjasesmenmatmedis_mod    :$('#dacrjasesmenmatmedis_mod').val(),
		// dacrjasesmenmatmedis_mos    :$('#dacrjasesmenmatmedis_mos').val(),
		// dacrjasesmenmatmedis_madisi :$('#dacrjasesmenmatmedis_madisi').val(),
		// dacrjasesmenmatmedis_mavod  :$('#dacrjasesmenmatmedis_mavod').val(),
		// dacrjasesmenmatmedis_mavos  :$('#dacrjasesmenmatmedis_mavos').val(),
		// dacrjasesmenmatmedis_mishiharaId  :document.querySelector('input[name=dacrjasesmenmatmedis_mishiharaId]:checked').value,
		// dacrjasesmenmatmedis_mschimer1    :$('#dacrjasesmenmatmedis_mschimer1').val(),
		// dacrjasesmenmatmedis_mschimer2    :$('#dacrjasesmenmatmedis_mschimer2').val(),
      //obgyn
		// dacrjasesmenmtmedis_obgId :document.querySelector('input[name=dacrjasesmenmtmedis_obgId]:checked').value,
		// dacrjasesmenmtmedis_otfu  :$('#dacrjasesmenmtmedis_otfu').val(),
		// dacrjasesmenmtmedis_olila :$('#dacrjasesmenmtmedis_olila').val(),
		// dacrjasesmenmtmedis_ohis  :$('#dacrjasesmenmtmedis_ohis').val(),
		// dacrjasesmenmtmedis_ohislama :$('#dacrjasesmenmtmedis_ohislama').val(),
		// dacrjasesmenmtmedis_odjj  :$('#dacrjasesmenmtmedis_odjj').val(),
		// dacrjasesmenmtmedis_ovulva :$('#dacrjasesmenmtmedis_ovulva').val(),
		// dacrjasesmenmtmedis_oportio:$('#dacrjasesmenmtmedis_oportio').val(),
		// dacrjasesmenmtmedis_ocorpus:$('#dacrjasesmenmtmedis_ocorpus').val(),
		// dacrjasesmenmtmedis_oparametrium:$('#dacrjasesmenmtmedis_oparametrium').val(),
		// dacrjasesmenmtmedis_ocavum      :$('#dacrjasesmenmtmedis_ocavum').val(),
		// dacrjasesmenmtmedis_ovulvadalam :$('#dacrjasesmenmtmedis_ovulvadalam').val(),
		// dacrjasesmenmtmedis_oportiodalam:$('#dacrjasesmenmtmedis_oportiodalam').val(),
		// dacrjasesmenmtmedis_opembukaan  :$('#dacrjasesmenmtmedis_opembukaan').val(),
		// dacrjasesmenmtmedis_ohodge      :$('#dacrjasesmenmtmedis_ohodge').val(),
		// dacrjasesmenmtmedis_opresentasi :$('#dacrjasesmenmtmedis_opresentasi').val(),
		// dacrjasesmenmtmedis_oketuban    :$('#dacrjasesmenmtmedis_oketuban').val(),
      //hd
		// dacrjasesmenmedishd_kolaborasihdlist_1 :document.querySelectorAll('input[name="dacrjasesmenmedishd_kolaborasihdlist_1"]:checked'),
		// dacrjasesmenmedishd_kolaborasihdlist_2 :document.querySelectorAll('input[name="dacrjasesmenmedishd_kolaborasihdlist_2"]:checked'),
		// dacrjasesmenmedishd_kolaborasihdlist_3 :document.querySelectorAll('input[name="dacrjasesmenmedishd_kolaborasihdlist_3"]:checked'),
		// dacrjasesmenmedishd_kolaborasihdlist_4 :document.querySelectorAll('input[name="dacrjasesmenmedishd_kolaborasihdlist_4"]:checked'),
		// dacrjasesmenmedishd_kolaborasihdlist_5 :document.querySelectorAll('input[name="dacrjasesmenmedishd_kolaborasihdlist_5"]:checked'),
		// dacrjasesmenmedishd_kolaborasihdlist_6 :document.querySelectorAll('input[name="dacrjasesmenmedishd_kolaborasihdlist_6"]:checked'),
		// dacrjasesmenmedishd_kolaborasihdlist_7 :document.querySelectorAll('input[name="dacrjasesmenmedishd_kolaborasihdlist_7"]:checked'),
		// dacrjasesmenmedishd_kolaborasihdlist_8 :document.querySelectorAll('input[name="dacrjasesmenmedishd_kolaborasihdlist_8"]:checked'),
		// dacrjasesmenmedishd_kolaborasihdlist_9 :document.querySelectorAll('input[name="dacrjasesmenmedishd_kolaborasihdlist_9"]:checked'),
		// dacrjasesmenmedishd_kolaborasihdlain   :$('#dacrjasesmenmedishd_kolaborasihdlain').val(),
		// dacrjasesmenmedishd_resephd        :document.querySelector('input[name=dacrjasesmenmedishd_resephd]:checked').value,
		// dacrjasesmenmedishd_dialisat       :document.querySelector('input[name=dacrjasesmenmedishd_dialisat]:checked').value,
		// dacrjasesmenmedishd_pprofilinglist :document.querySelector('input[name=dacrjasesmenmedishd_pprofilinglist]:checked').value,
		// dacrjasesmenmedishd_heparinisasilist :document.querySelector('input[name=dacrjasesmenmedishd_heparinisasilist]:checked').value,
		// dacrjasesmenmedishd_ufg         :$('#dacrjasesmenmedishd_ufg').val(),
		// dacrjasesmenmedishd_qb          :$('#dacrjasesmenmedishd_qb').val(),
		// dacrjasesmenmedishd_qd          :$('#dacrjasesmenmedishd_qd').val(),
		// dacrjasesmenmedishd_ureumpre    :$('#dacrjasesmenmedishd_ureumpre').val(),
		// dacrjasesmenmedishd_ureumpost   :$('#dacrjasesmenmedishd_ureumpost').val(),
		// dacrjasesmenmedishd_frekuensi   :$('#dacrjasesmenmedishd_frekuensi').val(),
		// dacrjasesmenmedishd_urasihd     :$('#dacrjasesmenmedishd_urasihd').val(),
		// dacrjasesmenmedishd_urasihdmenit:$('#dacrjasesmenmedishd_urasihdmenit').val(),
		// dacrjasesmenmedishd_ufr         :$('#dacrjasesmenmedishd_ufr').val(),
		// dacrjasesmenmedishd_urr         :$('#dacrjasesmenmedishd_urr').val(),
		// dacrjasesmenmedishd_obatin      :$('#dacrjasesmenmedishd_obatin').val(),
		// EvaluasiErmirna                	:$('#Evaluasiermirna').val(),
		id_user 						: user.id_pegawai,
		eyeOpen 						: document.getElementById('eyeOpenassmedErmIrna').value,
		ResponMotorik 					: document.getElementById('ResponMotorikassmedErmIrna').value,
		responVerbal 					: document.getElementById('responVerbalassmedErmIrna').value,
		norm 							: document.getElementById('rmermirna').value,
		transaksi 					    : document.getElementById('transaksiermirna').value,
		ttd 							: ttdassesmenmedisirna.getData(),


	};
	apiPOST("Rekammedisirna/saveAssesmenDokterIrna",param,hasil=>{
		document.getElementById('linksoap').click();
		document.getElementById('cppttekanandarahermirna').value=document.getElementById('tekananDarahermirna1').value+'/'+document.getElementById('tekananDarahermirna2').value;
		document.getElementById('cpptsuhuermirna').value=document.getElementById('suhuermirna').value;
		document.getElementById('cpptnadiermirna').value=document.getElementById('nadiAssermirnaa').value;
		document.getElementById('cpptsaturasiermirna').value=document.getElementById('respirasiAssMedIrja').value;
		document.getElementById('Spo2AssMedIrja').value=document.getElementById('cpptSpo2ermirna').value;
		document.getElementById('subjekirja').value=document.getElementById('keluhanutamaermirna').value;
		document.getElementById('assesmenirja').value=document.getElementById('RiwayatPenyakitNowermirna').value;
		document.getElementById('intervensiirja').value=document.getElementById('planningermirna').value;

	});
}
/*icd 9*/
$(document).on('keyup', '#textTambahicd9resumeirna', function(e) {
	if($(this).val() !== '')
	{
		var charCode = e.which || e.keyCode;
		if(charCode == 40)
		{
			icd9tambahresumeirna();
		} 
		else if(charCode == 38)
		{
			icd9tambahresumeirna();
		}
		else    (charCode == 13)
		{
			icd9tambahresumeirna();
		}
	}else{
		document.getElementById("DivTambahicd9resumeirna").innerHTML="";
	}
})
/*icd 9*/
function icd9tambahresumeirna() {
	var param ={id:document.getElementById("textTambahicd9resumeirna").value,};
	apiPOST('Kunjungan/icd9', param,hasil=>{
		var a=hasil['icd'];
		var unit='';
		for (var i = 0; i < a.length; i++) {
			unit+='<button class="btn btn-primary"  onclick="pilihicd9tambahresumeirna(`'+a[i]['kd_icd9']+'|'+a[i]['deskripsi']+'`)">'+a[i]['deskripsi']+'</button><br>';
		}
		document.getElementById('DivTambahicd9resumeirna').innerHTML=unit;
	});
}
/*icd 9*/
function pilihicd9tambahresumeirna(kode) {
	var res = kode.split('|');
	var icd = res[0];
	var kunjungan=document.getElementById('idKunjunganermirna').value;
	document.getElementById("DivTambahicd9resumeirna").innerHTML="";
	var param={
		rm     :document.getElementById('rmermirna').value,
		unit   :document.getElementById('idunitermirna').value,
		id_kunjungan :kunjungan,
		kode   :icd,
		stat   :2,
	};
	apiPOST('Rekammedisirja/addmricd9irja',param,hasil=>{
		$('#ModalShowaddicd9medermirja').modal('hide');
		detailicd9resume(kunjungan);
	});

}
function detailicd10resumeirna(kunjungan){
	var param = {
		kunjungan: kunjungan
	};
	var baris = ''; 
	apiPOST('Rekammedisirna/datamrpenyakitirja', param, hasil => {
		var x = hasil['data'];
		if (hasil['code']=="200") {            
			for (var u = 0; u < x.length; u++) {
				baris+='<tr><td>'+x[u]['id_penyakit']+'|'+x[u]['penyakit']+'('+x[u]['status']+')</td></tr>';
			}
			document.getElementById('tbodylisticd10resumeirna').innerHTML = baris;
		}
	})
}
function detailicd9resume(kunjungan){
	var param = {
		kunjungan: kunjungan
	};
	var baris = ''; 
	apiPOST('Rekammedisirna/datamricd9irja', param, hasil => {
		var x = hasil['data'];
		if (hasil['code']=="200") {            
			for (var u = 0; u < x.length; u++) {
				baris+='<tr><td>'+x[u]['kd_icd9']+'|'+x[u]['deskripsi']+'('+x[u]['status']+')</td></tr>';
			}
			document.getElementById('tbodylisticd9resumeirna').innerHTML = baris;
		}
	})
}
/*icd 10*/
$(document).on('keyup', '#RiwayatPenyakitNowermirna', function(e) {
	if($(this).val() !== '')
	{
		var charCode = e.which || e.keyCode;
		if(charCode == 40)
		{
			icd10sekarangtreage(1);
		} 
		else if(charCode == 38)
		{
			icd10sekarangtreage(1);
		}
		else    (charCode == 13)
		{
			icd10sekarangtreage(1);
		}
	}else{

		document.getElementById("DivRiwayatPenyakitSekarang").innerHTML="";
	}
})
$(document).on('keyup', '#Assesmenermirna', function(e) {
	if($(this).val() !== '')
	{
		var charCode = e.which || e.keyCode;
		if(charCode == 40)
		{
			icd10sekarangtreage(2);
		} 
		else if(charCode == 38)
		{
			icd10sekarangtreage(2);
		}
		else    (charCode == 13)
		{
			icd10sekarangtreage(2);
		}
	}else{

		document.getElementById("divAssesmenermirna").innerHTML="";
	}
})
$(document).on('keyup', '#caridiagnosacpptmedisirna', function(e) {
	if($(this).val() !== '')
	{
		var charCode = e.which || e.keyCode;
		if(charCode == 40)
		{
			icd10sekarangtreage(3);
		} 
		else if(charCode == 38)
		{
			icd10sekarangtreage(3);
		}
		else    (charCode == 13)
		{
			icd10sekarangtreage(3);
		}
	}else{

		document.getElementById("divcaridiagnosacpptmedisirna").innerHTML="";
	}
})
$(document).on('keyup', '#textTambahdiagnosaCpptErmirna', function(e) {
	if($(this).val() !== '')
	{
		var charCode = e.which || e.keyCode;
		if(charCode == 40)
		{
			icd10sekarangtreage(4);
		} 
		else if(charCode == 38)
		{
			icd10sekarangtreage(4);
		}
		else    (charCode == 13)
		{
			icd10sekarangtreage(4);
		}
	}else{

		document.getElementById("DivTambahdiagnosaCpptErmirna").innerHTML="";
	}
})
$(document).on('keyup', '#RiwayatPenyakitNowasskepErmIrna', function(e) {
	if($(this).val() !== '')
	{
		var charCode = e.which || e.keyCode;
		if(charCode == 40)
		{
			icd10sekarangtreage(5);
		} 
		else if(charCode == 38)
		{
			icd10sekarangtreage(5);
		}
		else    (charCode == 13)
		{
			icd10sekarangtreage(5);
		}
	}else{

		document.getElementById("DivKeperawatanRiwayatPenyakitSekarang").innerHTML="";
	}
})
function icd10sekarangtreage_old(nilai) {
	switch(nilai){
	case 1:	
		var param ={id:document.getElementById("RiwayatPenyakitNowermirna").value,};
		break;
	case 2:
		var param ={id:document.getElementById("Assesmenermirna").value,};
		break;
	case 3:
		var param ={id:document.getElementById("caridiagnosacpptmedisirna").value,};
		break;
	case 4:
		var param ={id:document.getElementById("textTambahdiagnosaCpptErmirna").value,};
		break;
	case 5:
		var param ={id:document.getElementById("RiwayatPenyakitNowasskepErmIrna").value,};
		break;
	}
	apiPOST('Kunjungan/icd', param,hasil=>{
		var a=hasil['icd'];
		var unit='';
		for (var i = 0; i < a.length; i++) {
			unit+='<button class="btn btn-primary" onclick="pilihicd10sekarangirna(`'+a[i]['penyakit']+'`,'+nilai+',`'+a[i]['id_penyakit']+'`)">'+a[i]['penyakit']+'</button><br>';
		}
		switch(nilai){
		case 1:
			document.getElementById('DivRiwayatPenyakitSekarang').innerHTML=unit;
			break;
		case 2:
			document.getElementById('divAssesmenermirna').innerHTML=unit;
			break;
		case 3:
			document.getElementById('divcaridiagnosacpptmedisirna').innerHTML=unit;
			break;
		case 4:
			document.getElementById('DivTambahdiagnosaCpptErmirna').innerHTML=unit;
			break;
		case 5:
			document.getElementById('DivKeperawatanRiwayatPenyakitSekarang').innerHTML=unit;
			break;
		}
	});
}
function pilihicd10sekarangirna(kode,nilai,icd) {
	switch(nilai){
	case 1:
		document.getElementById("RiwayatPenyakitNowermirna").value=kode;
		document.getElementById("DivRiwayatPenyakitSekarang").innerHTML="";
		break;
	case 2:
		document.getElementById("Assesmenermirna").value=kode;
		document.getElementById("divAssesmenermirna").innerHTML="";
		break;
	case 3:
		document.getElementById("caridiagnosacpptmedisirna").value=kode;
		document.getElementById("divcaridiagnosacpptmedisirna").innerHTML="";
		break;
	case 4:
		document.getElementById("caridiagnosacpptmedisirna").value=document.getElementById("caridiagnosacpptmedisirna").value+'+'+kode;
		document.getElementById("DivTambahdiagnosaCpptErmirna").innerHTML="";
		$('#ModalTambahdiagnosaCpptErmirna').modal('hide');
		//addpenyakittreageigd(icd);
		break;
	case 5:
		document.getElementById("RiwayatPenyakitNowasskepErmIrna").value=kode;
		document.getElementById("DivKeperawatanRiwayatPenyakitSekarang").innerHTML="";
		break;
	}
}
$(document).on('keyup', '#intervensiasskepErmIrna', function(e) {
	if($(this).val() !== '')
	{
		var charCode = e.which || e.keyCode;
		if(charCode == 40)
		{
			DiagnosaKeperawatanirna();
		} 
		else if(charCode == 38)
		{
			DiagnosaKeperawatanirna();
		}
		else    (charCode == 13)
		{
			DiagnosaKeperawatanirna();
		}
	}else{
		document.getElementById("DivintervensiasskepErmIrna").innerHTML="";
	}
})
function DiagnosaKeperawatanirna() {
	var param ={id:document.getElementById("intervensiasskepErmIrna").value,};
	apiPOST('Kunjungan/IntervensiKeperawatan', param,hasil=>{
		var a=hasil['kode'];
		var unit='';
		for (var i = 0; i < a.length; i++) {
			unit+='<button class="btn btn-primary" onclick="pilihIntervensiKepirna(`'+a[i]['uraian']+'`)">'+a[i]['kode_produk']+'|'+a[i]['uraian']+'</button><br>';
		}
		document.getElementById('DivintervensiasskepErmIrna').innerHTML=unit;
	});
}
function pilihIntervensiKepirna(kode) {

	document.getElementById("intervensiasskepErmIrna").value=kode;
	document.getElementById("DivintervensiasskepErmIrna").innerHTML="";
}
$(document).on('keyup', '#DiagnosaasskepErmIrna', function(e) {
	if($(this).val() !== '')
	{
		var charCode = e.which || e.keyCode;
		if(charCode == 40)
		{
			KomunikasiPengajaranKep();
		} 
		else if(charCode == 38)
		{
			KomunikasiPengajaranKep();
		}
		else    (charCode == 13)
		{
			KomunikasiPengajaranKep();
		}
	}else{
		document.getElementById("DivDiagnosaasskepErmIrna").innerHTML="";
	}
})
function KomunikasiPengajaranKep() {
	var param ={id:document.getElementById("DiagnosaasskepErmIrna").value,};
	apiPOST('Kunjungan/KomunikasiKeperawatan', param,hasil=>{
		var a=hasil['kode'];
		var unit='';
		for (var i = 0; i < a.length; i++) {
			unit+='<button class="btn btn-primary" onclick="pilihKomunikasiPengajaranKep(`'+a[i]['uraian']+'`)">'+a[i]['kode_produk']+'|'+a[i]['uraian']+'</button><br>';
		}
		document.getElementById('DivDiagnosaasskepErmIrna').innerHTML=unit;
	});
}
function pilihKomunikasiPengajaranKep(kode) {

	document.getElementById("DiagnosaasskepErmIrna").value=kode;
	document.getElementById("DivDiagnosaasskepErmIrna").innerHTML="";
}
function show_intervensiirna(){
	$('#ModalIntervensiKeperawatanirna').modal("show");
}
function showModalTambahdiagnosaresumeermirna() {
	$('#ModalTambahdiagnosaresumeermirna').modal("show");
}
function showModalShowaddicd9resumeirna() {
	$('#ModalShowaddicd9resumeirna').modal("show");
}
function inputdataintervensiirna() {
	const btn = document.querySelector('#buttonintervensiirna');
	btn.addEventListener('click', (event) => {
		let checkboxes = document.querySelectorAll('input[name="intervensikeperawatanirna"]:checked');
		let values = [];
		checkboxes.forEach((checkbox) => {
			values.push(checkbox.value);
		});
		$('#ModalIntervensiKeperawatanirna').modal("hide");
		document.getElementById('intervensiermirna').value=values;
	});  
}

function simpanAssesmenKeperawatanErmIrna() {
	var param={
      id_kunjungan          :$('#idKunjunganermirna').val(),//ok
      keluhanutama          :$('#keluhanutamaKeperawatanErmIrna').val(),
      RiwayatPenyakitNow    :$('#RiwayatPenyakitNowasskepErmIrna').val(),
      Restrain              :$('#RestrainAssKeperawatanErmIrna').val(),
      alasanRestrain        :$('#alasanRestrainAssKeperawatanErmIrna').val(),
      Budaya                :$('#BudayaAssKeperawatanErmIrna').val(),
      KetBudaya             :$('#KetBudayaAssKeperawatanErmIrna').val(),
      TinggalBersama        :$('#TinggalBersamaAssKeperawatanErmIrna').val(),
      statusmental          :$('#StatusMentalAssKeperawatanErmIrna').val(),
      statusPsikologis      :$('#StatusPsikoAssKeperawatanErmIrna').val(),
      //tanda vital
      KeadaanUmum           :$('#KeadaanUmumAssPerawatErmIrna').val(),
      respirasi             :$('#respirasiAssPerawatErmIrna').val(),
      nadi                  :$('#nadiAssPerawatErmIrna').val(),
      Spo2                  :$('#Spo2AssPerawatErmIrna').val(),
      pupil_kiri            :$('#pupilkiriAssPerawatErmIrna').val(),
      pupil_kanan			:$('#pupilkananAssPerawatErmIrna').val(),
      tekanan_darah1        :$('#tekananDarahAssPerawatErmIrna1').val(),
      tekanan_darah2 		:$('#tekananDarahAssPerawatErmIrna2').val(), 
      palpasi               :$('#palpasiAssPerawatErmIrna').val(),
      suhu                  :$('#suhuAssPerawatErmIrna').val(),
      reflekCahayaKiri      :$('#reflekCahayaKiriAssPerawatErmIrna').val(),
      reflekCahayaKanan     :$('#reflekCahayaKananAssPerawatErmIrna').val(),
      bb                    :$('#bbAssPerawatErmIrna').val(),
      tinggi                :$('#tinggiAssPerawatErmIrna').val(),
      imt                   :$('#imtAssPerawatErmIrna').val(),
      skor                  :$('#skorassesmenkeperawatanErmIrna').val(),
      //end tanda vital
      tipekesadaranasskepermirna:$('#tipekesadaranasskepermirna').val(),
      intervensi            :$('#intervensiasskepErmIrna').val(),
      diagnosaKeperawatan   :$('#DiagnosaasskepErmIrna').val(),
      fisikStatusLocalis    :$('#fisikStatusLocalisasskepErmIrna').val(),
      bbturun               :document.getElementById('ermrwjkeperawatanbbturun').value,
      bbturunkg             :document.getElementById('ermrwjkeperawatanbbturunkg').value,
      penurunanmakan        :document.getElementById('ermrwjkeperawatanpenurunanmakan').value,
      totalskor             :document.getElementById('ermrwjkeperawatantotalskor').value,
      saran                 :document.getElementById('ermrwjkeperawatansaran').value,
      fungsional      			:document.querySelector('input[name=ermrwjkeperawatanfungsional]:checked').value,
      keseimbangan    			:document.querySelector('input[name=ermrwjkeperawatankeseimbangan]:checked').value,
      penopang        			:document.querySelector('input[name=ermrwjkeperawatanpenopang]:checked').value,
      hasilskrining   			:document.querySelector('input[name=ermrwjkeperawatanhasilskrining]:checked').value,
      hasilkesimpulan 			:document.getElementById('ermrwjkeperawatanhasilkesimpulan').value,
      skorface        			:document.querySelector('input[name=keperawatanskorfaceermirna]:checked').value,
      fisikKepala        		:document.querySelector('input[name=fisikKepalaasskepErmIrna]:checked').value,
      fisikKepalaKet       	:$('#fisikKepalaasskepErmIrnaKet').val(),
      fisikJantung        	:document.querySelector('input[name=fisikJantungasskepErmIrna]:checked').value,
      fisikJantungKet      	:$('#fisikJantungasskepErmIrnaKet').val(),
      fisikMata            	:document.querySelector('input[name=fisikMataasskepErmIrna]:checked').value,
      fisikMataKet         	:$('#fisikMataasskepErmIrnaKet').val(),
      fisikParu           	:document.querySelector('input[name=fisikParuasskepErmIrna]:checked').value,
      fisikParuKet         	:$('#fisikParuasskepErmIrnaKet').val(),
      fisikTht            	:document.querySelector('input[name=fisikThtasskepErmIrna]:checked').value,
      fisikThtKet          	:$('#fisikThtasskepErmIrnaKet').val(),
      fisikAbdomen       		:document.querySelector('input[name=fisikAbdomenasskepErmIrna]:checked').value,
      fisikAbdomenKet      	:$('#fisikAbdomenasskepErmIrnaKet').val(),                           
      fisikLeher          	:document.querySelector('input[name=fisikLeherasskepErmIrna]:checked').value,
      fisikLeherKet        	:$('#fisikLeherasskepErmIrnaKet').val(),
      fisikGenitalia      	:document.querySelector('input[name=fisikGenitaliaasskepErmIrna]:checked').value,
      fisikGenitaliaKet    	:$('#fisikGenitaliaasskepErmIrnaKet').val(),
      fisikMulut          	:document.querySelector('input[name=fisikMulutasskepErmIrna]:checked').value,
      fisikMulutKet        	:$('#fisikMulutasskepErmIrnaKet').val(),
      fisikThorax         	:document.querySelector('input[name=fisikThoraxasskepErmIrna]:checked').value,
      fisikThoraxKet       	:$('#fisikThoraxasskepErmIrnaKet').val(),
      id_user :user.id_pegawai,
      norm 					: document.getElementById('rmermirna').value,
      transaksi  			: document.getElementById('transaksiermirna').value,
      ttd 					: ttdassesmenperawatirna.getData(),
  };
  apiPOST('Rekammedisirna/saveAssesmenKeperawatanIrna',param,hasil=>{

  })
}
function aktifPaintCOncent(){
	localis = new Paint('dacconsent_ttdid2');
}

function vsearchPoli(){
	
}

function dacmesoexsetApgar(col, nilai) {
	document.getElementById("dacmeso_apgar"+col).value=nilai;
	let a =document.getElementById("dacmeso_apgar1").value;
	let b =document.getElementById("dacmeso_apgar2").value;
	let c =document.getElementById("dacmeso_apgar3").value;
	let d =document.getElementById("dacmeso_apgar4").value;
	let e =document.getElementById("dacmeso_apgar5").value;
	let f =document.getElementById("dacmeso_apgar6").value;
	let g =document.getElementById("dacmeso_apgar7").value;
	let h =document.getElementById("dacmeso_apgar8").value;
	let i =document.getElementById("dacmeso_apgar9").value;
	let j =document.getElementById("dacmeso_apgar10").value;
	let total=parseInt(a)+parseInt(b)+parseInt(c)+parseInt(d)+parseInt(e)+parseInt(f)+parseInt(g)+parseInt(h)+parseInt(i)+parseInt(j);
	document.getElementById('dacmeso_apgartot').value=total;
}

function save_efek_samping_obat_irna() {
	var param={
		id_kunjungan 			:$('#idKunjunganermirna').val(),
		id_transaksi            :$('#transaksiermirna').val(),
		dacmeso_atgl    		:$('#dacmeso_atgl').val(),
		dacmeso_apjId 			:user.id_user,
		selectdacmeso_bwanita 	:$('#selectdacmeso_bwanita').val(),
		dacmeso_bkeluhan 		:$('#dacmeso_bkeluhan').val(),
		selectdacmeso_bsudah 	:$('#selectdacmeso_bsudah').val(),
		selectdacmeso_bkondisi 	:$('#selectdacmeso_bkondisi').val(),
		dacmeso_cmanifestasi 	:$('#dacmeso_cmanifestasi').val(),
		dacmeso_ctgl 			:$('#dacmeso_ctgl').val(),
		dacmeso_dtgl 			:$('#dacmeso_dtgl').val(),
		selectdacmeso_csudah 	:$('#selectdacmeso_csudah').val(),
		dacmeso_criwayat 		:$('#dacmeso_criwayat').val(),
		dacmeso_apgartot 		:$('#dacmeso_apgartot').val(),
		dacmeso_apgar1 			:$('#dacmeso_apgar1').val(),
		dacmeso_apgar2 			:$('#dacmeso_apgar2').val(),
		dacmeso_apgar3 			:$('#dacmeso_apgar3').val(),
		dacmeso_apgar4 			:$('#dacmeso_apgar4').val(),
		dacmeso_apgar5 			:$('#dacmeso_apgar5').val(),
		dacmeso_apgar6 			:$('#dacmeso_apgar6').val(),
		dacmeso_apgar7 			:$('#dacmeso_apgar7').val(),
		dacmeso_apgar8 			:$('#dacmeso_apgar8').val(),
		dacmeso_apgar9 			:$('#dacmeso_apgar9').val(),
		dacmeso_apgar10 		:$('#dacmeso_apgar10').val(),
		ttd 					:$('#HasilTtdEfekObatIrna').val()
	}
	apiPOST('Rekammedisirna/save_efek_samping_obat_irna', param,hasil=>{
	});
}
function unitkonsulermirja() {
    //rwjpendafpoliklinik
	apiPOST('Rawatjalan/unit', null,hasil=>{
		var a=hasil['data'];
		var unit='';
		for (var i = 0; i < a.length; i++) {
			unit+='<option value="'+a[i]['id_unit']+'">'+a[i]['nama_unit']+'</option>';
		}
		document.getElementById('vdacriplanning_cpoli').innerHTML=unit;
	});
}

function ttdpersetujuantindakan() {
	showttdpersetujuantindakanirnadokter();
	showttdpersetujuantindakanirnaperawat();
	showttdpersetujuantindakanirnapembuat();
	showttdpersetujuantindakanirnasaksi();
}
var ttdresumeirna 			= new WPaintX('paint_ttdresumeirna');
var ttdpasienresumeirna 	= new WPaintX('paint_ttdpasienresumeirna');
var ttdgeneralconcent 		= new WPaintX('paint_ttdgeneralconcent');
var ttdgeneralpasienconcent = new WPaintX('paint_ttdpasiengeneralconcent');
var ttdassesmenmedisirna 	= new WPaintX('paint_ttdassesmenmedisirna');
var ttdassesmenperawatirna 	= new WPaintX('paint_ttdassesmenperawatirna');
var ttdEfekObatIrna         = new WPaintX('paint_ttdEfekObatIrna'); 
var ttdTanyaKonsultasiIrna  = new WPaintX('paint_ttdTanyaKonsultasiIrna'); 
var ttdJawabKonsultasiIrna  = new WPaintX('paint_ttdJawabKonsultasiIrna'); 
var ttdtindakananasthesi 	= new WPaintX('paint_ttdtindakananasthesi');
var ttdperawatresumeirna    = new WPaintX('paint_ttdperawatresumeirna');

function showttdTanyaKonsultasiIrna(){
	ttdTanyaKonsultasiIrna.show();
}
function showttdJawabKonsultasiIrna(){
	ttdJawabKonsultasiIrna.show();
}
function showttdresumeirna(){
	ttdresumeirna.show();
}
function showttdpasienresumeirna(){
	ttdpasienresumeirna.show();
}
function showttdperawatresumeirna(){
	ttdperawatresumeirna.show();
}
function showttdgeneralconcent(){
	ttdgeneralconcent.show();
}
function showttdpasiengeneralconcent(){
	ttdgeneralpasienconcent.show();
}
function showttdtindakananasthesi(){
	ttdtindakananasthesi.show();
}
function showttdEfekObatIrna(){
	ttdEfekObatIrna.show();
}
function showttdassesmenmedisirna(){
	ttdassesmenmedisirna.show();
}
function showttdassesmenperawatirna(){
	ttdassesmenperawatirna.show();
}

function takepaint_ttdassesmenperawatirna() {
	document.getElementById('Gambarpaint_ttdassesmenperawatirna').src = ttdassesmenperawatirna.getData();
	document.getElementById('Hasilpaint_ttdassesmenperawatirna').value = ttdassesmenperawatirna.getData();
	$('#Modalpaint_ttdassesmenperawatirna').modal('hide');
}

function ShowModalttdassesmenperawatirna() {
	showttdassesmenperawatirna();
	$('#Modalpaint_ttdassesmenperawatirna').modal('show');
}


function takepaint_ttdassesmenmedisirna() {
	document.getElementById('Gambarpaint_ttdassesmenmedisirna').src = ttdassesmenmedisirna.getData();
	document.getElementById('Hasilpaint_ttdassesmenmedisirna').value = ttdassesmenmedisirna.getData();
	$('#Modalpaint_ttdassesmenmedisirna').modal('hide');
}

function ShowModalttdassesmenmedisirna() {
	showttdassesmenmedisirna();
	$('#Modalpaint_ttdassesmenmedisirna').modal('show');
}


function ShowModalTtdDpjpResumeIrna() {
	showttdresumeirna();
	$('#ModalTtdResumeIrna').modal('show');
}
function ShowModalTtdPerawatResumeIrna() {
	showttdperawatresumeirna();
	$('#ModalTtdPerawatResumeIrna').modal('show');
}
function ShowModalTtdPasienResumeIrna() {
	showttdpasienresumeirna();
	$('#ModalTtdPasienResumeIrna').modal('show');
}

function ShowModalTtdTanyaKonsultasiIrna() {
	showttdTanyaKonsultasiIrna();
	$('#ModalTtdTanyaKonsultasiIrna').modal('show');
}
function ShowModalTtdJawabKonsultasiIrna() {
	showttdJawabKonsultasiIrna();
	$('#ModalTtdJawabKonsultasiIrna').modal('show');
}

function showModalEfekObatIrna() {
	showttdEfekObatIrna();
	$('#ModalTtdEfekObatIrna').modal('show');
}
function takeTtdDpjpResumeIrna() {
	document.getElementById('ImgTtdResumeIrna').src=ttdresumeirna.getData();
	document.getElementById('HasilTtdDpjpResumeIrna').value=ttdresumeirna.getData();
	$('#ModalTtdResumeIrna').modal('hide');

}
function takeTtdPasienResumeIrna() {
	document.getElementById('ImgTtdPasienResumeIrna').src=ttdpasienresumeirna.getData();
	document.getElementById('HasilTtdPasienResumeIrna').value=ttdpasienresumeirna.getData();
	$('#ModalTtdPasienResumeIrna').modal('hide');

}
function takeTtdPerawatResumeIrna() {
	document.getElementById('ImgTtdPerawatResumeIrna').src=ttdperawatresumeirna.getData();
	document.getElementById('HasilTtdPerawatResumeIrna').value=ttdperawatresumeirna.getData();
	$('#ModalTtdPerawatResumeIrna').modal('hide');

}
function takeTtdTanyaKonsultasiIrna() {
	document.getElementById('ImgTtdTanyaKonsultasiIrna').src=ttdTanyaKonsultasiIrna.getData();
	document.getElementById('HasilTtdTanyaKonsultasiIrna').value=ttdTanyaKonsultasiIrna.getData();
	$('#ModalTtdTanyaKonsultasiIrna').modal('hide');

}
function takeTtdJawabKonsultasiIrna() {
	document.getElementById('ImgTtdJawabKonsultasiIrna').src=ttdJawabKonsultasiIrna.getData();
	document.getElementById('HasilTtdJawabKonsultasiIrna').value=ttdJawabKonsultasiIrna.getData();
	$('#ModalTtdJawabKonsultasiIrna').modal('hide');

}
function takeTtdEfekObatIrna() {
	document.getElementById('GambarTtdEfekObatIrna').src=ttdEfekObatIrna.getData();
	document.getElementById('HasilTtdEfekObatIrna').value=ttdEfekObatIrna.getData();
	$('#ModalTtdEfekObatIrna').modal('hide');
}

function onCall_EdukasiPasien(){
	var param = {
		view 			: 'viewEdukasiPasien',
		rm          	: $('#rmermirna').val(),
		unit        	: $('#idunitermirna').val(),
		id_kunjungan  	: $('#idKunjunganermirna').val(),
		id_transaksi  	: $('#transaksiermirna').val(),
	}
	
	var data = JSON.stringify(param);
	$('.viewEdukasiPasien').load('Rekammedisirna/viewEdukasiPasien?data='+data);
}

function onCall_AssesmenGizi(){
	var param = {
		view 			: 'viewAssesmenGizi',
		rm          	: $('#rmermirna').val(),
		unit        	: $('#idunitermirna').val(),
		id_kunjungan  	: $('#idKunjunganermirna').val(),
		id_transaksi  	: $('#transaksiermirna').val(),
	}
	
	var data = JSON.stringify(param);
	$('.viewAssesmenGizi').load('Rekammedisirna/viewAssesmenGizi?data='+data);
}

function onCall_InfAnastesiAdesi(){
	var param = {
		view 			: 'viewInfAnastesiAdesi',
		rm          	: $('#rmermirna').val(),
		unit        	: $('#idunitermirna').val(),
		id_kunjungan  	: $('#idKunjunganermirna').val(),
		id_transaksi  	: $('#transaksiermirna').val(),
	}
	
	var data = JSON.stringify(param);
	$('.viewInfAnastesiAdesi').load('Rekammedisirna/viewInfAnastesiAdesi?data='+data);
}

function onCall_GrowthChart(){
	var param = {
		view 			: 'viewGrowthChart',
		rm          	: $('#rmermirna').val(),
		unit        	: $('#idunitermirna').val(),
		id_kunjungan  	: $('#idKunjunganermirna').val(),
		id_transaksi  	: $('#transaksiermirna').val(),
	}
	
	var data = JSON.stringify(param);
	$('.viewGrowthChart').load('Rekammedisirna/viewGrowthChart?data='+data);
}

function selesai(id){
	done = document.querySelector('#'+id);
	done.classList.add('selesai');
}

function belumselesai(id){
	done = document.querySelector('#'+id);
	done.classList.remove('selesai');
}

function onCall_RencanaPemulanganPasien(){
	var param = {
		view 			: 'viewRencanaPemulanganPasien',
		rm          	: $('#rmermirna').val(),
		unit        	: $('#idunitermirna').val(),
		id_kunjungan  	: $('#idKunjunganermirna').val(),
		id_transaksi  	: $('#transaksiermirna').val(),
	}
	
	var data = JSON.stringify(param);
	$('.viewRencanaPemulanganPasien').load('Rekammedisirna/viewRencanaPemulanganPasien?data='+data);
}
function onCall_PemberianInfus(){
	var param = {
		view 			: 'viewPemberianInfusIrna',
		rm          	: $('#rmermirna').val(),
		unit        	: $('#idunitermirna').val(),
		id_kunjungan  	: $('#idKunjunganermirna').val(),
		id_transaksi  	: $('#transaksiermirna').val(),
	}
	
	var data = JSON.stringify(param);
	$('.viewPemberianInfusIrna').load('Rekammedisirna/viewPemberianInfusIrna?data='+data);
}
function onCall_PersetujuanTind(){
	var param = {
		view 			: 'viewPersetujuanTind',
		namapasien      : $('#namaermirna').val().replace(/ /g, '%20'),
		rm          	: $('#rmermirna').val(),
		unit        	: $('#idunitermirna').val(),
		id_kunjungan  	: $('#idKunjunganermirna').val(),
		id_transaksi  	: $('#transaksiermirna').val(),
		jeniskelamin 	: jeniskelaminERMIRNA
	}
	
	var data = JSON.stringify(param);
	$('.viewPersetujuanTind').load('Rekammedisirna/viewPersetujuanTind?data='+data);
}
function onCall_PemberianObat(){
	var param = {
		view 			: 'viewPemberianObat',
		rm          	: $('#rmermirna').val(),
		unit        	: $('#idunitermirna').val(),
		id_kunjungan  	: $('#idKunjunganermirna').val(),
		id_transaksi  	: $('#transaksiermirna').val(),
	}
	
	var data = JSON.stringify(param);
	$('.viewPemberianObat').load('Rekammedisirna/viewPemberianObat?data='+data);
}

function onCall_AssesmenpreAnes(){
	var param = {
		view 			: 'viewAsspreAnastesi1',
		rm          	: $('#rmermirna').val(),
		unit        	: $('#idunitermirna').val(),
		id_kunjungan  	: $('#idKunjunganermirna').val(),
		id_transaksi  	: $('#transaksiermirna').val(),
	}
	
	var data = JSON.stringify(param);
	$('.viewAsspreAnastesi').load('Rekammedisirna/viewAsspreAnastesi?data='+data);
}
function caramasuk() {
	apiPOST('Kunjungan/caramasuk', null,hasil=>{
		var a=hasil['data'];
		var pegawai='';
		for (var i = 0; i < a.length; i++) {
			pegawai+='<option value="'+a[i]['kd_cara_masuk']+'">'+a[i]['cara_masuk']+'</option>';
		}
		document.getElementById('caramasukResumeermirna').innerHTML=pegawai;

	});
}

function carakeluar() {
	apiPOST('Kunjungan/carakeluar', null,hasil=>{
		var a=hasil['data'];
		var pegawai='';
		for (var i = 0; i < a.length; i++) {
			pegawai+='<option value="'+a[i]['kd_cara_keluar']+'">'+a[i]['cara_keluar']+'</option>';
		}
		document.getElementById('CaraKeluarResumeermirna').innerHTML=pegawai;

	});
}
function keadaanumum() {
	apiPOST('Kunjungan/keadaanumum', null,hasil=>{
		var a=hasil['data'];
		var pegawai='';
		for (var i = 0; i < a.length; i++) {
			pegawai+='<option value="'+a[i]['kd_status_pulang']+'">'+a[i]['status_pulang']+'</option>';
		}
		document.getElementById('keadaanUmumResumeErmIrna').innerHTML=pegawai;

	});
}

</script>