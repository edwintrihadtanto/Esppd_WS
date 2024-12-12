<div class="col-md-12 p-2">
<!-- 	<div class="card card-outline card-danger">
		<div class="overlay-wrapper" id="darah_loadingawal">
			<div class="overlay">
				<i class="fas fa-3x fa-sync-alt fa-spin"></i>
			</div>
		</div>  
		<div class="card-body p-2 darkgrey-custom" id='Divsearchdarah'>
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group ">
						<label>Cari No. RM / Nama Pasien :</label>            
						<input type="search" id="normpas_darah" class="form-control form-control" placeholder="Entry RM..." autocomplete="off">
						<button class="btn btn-primary" onclick="loadlistPasdar()">Cari</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-1" id="Divcardlistpasermirna_darah">
		<div class="card">
			<div class="card-header p-0">
				<div class="col-md-12 p-0" id="ermirna_listpas_darah">
					<div class="card-body p-1" style="max-height: 420px; overflow: auto;">
						<div class="row" id="listpasermirna_darah"></div>
					</div>
				</div>
			</div>
		</div>
	</div> -->
	<div class="card-body p-2 darkgrey-custom" id="Divinputpembedahan" >
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
							<div class="col-md-5">
								<input id="dactransfusidarah_id" name="id" type="text" class="form-control" readonly="readonly">
								<input hidden="true" class="form-control" id="dactransfusidarah_dalatlist">
								<input hidden="true" class="form-control" id="dactransfusidarah_aksilist">
								<input hidden="true" class="form-control" id="dactransfusidarah_tindakanIdlist">
				            </div>
						</div>
						<div class="form-group row">
							<div class="col-md-3  text-truncate">
								<label class="col-form-label">Tanggal Transfusi</label>
							</div>
							<div class="col-md-5">
								<div class="input-group date" id="dactransfusidarah_datgl" data-target-input="nearest">
					              <input id="dactransfusidarah_atgl" name="atgl" type="date" class="form-control">
					            </div>
							</div>
						</div>					
					</div>
					<div class="col-md-6">
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Dokter</label>
							</div>
							<div class="col-md-7">
								<select id="dactransfusidarah_apjId" name="apjId" class="form-control"></select>
							</div>
							<div class="col-md-2">
								<button id="dactransfusidarah_btpjdef" class="btn btn-warning" type="button" title="Default PJ">
									&nbsp;&nbsp;<!-- <i class="fas fa-undo"></i> -->&nbsp;&nbsp;
								</button>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label" title="asaldarah">Asal Komponen Darah</label>
							</div>
							<div class="col-md-7">
								<select name="_brhId" id="dactransfusidarah_asaldarah" class="form-control">
									<option value="0">--Pilih--</option>
									<option value="1">PMI</option>
									<option value="2">RS</option>
								</select>
				            </div>
						</div>						
					</div>
				</div>
			</div>
		</div>
		<div class="card "><!-- PENGKAJIAN -->
			<div class="card-header" style="background-color:black;">
				<h3 class="card-title" style="color:white;">PENGKAJIAN</h3>
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
								<label class="col-form-label" title="Riwayat Alergi">Riwayat Alergi</label> 
							</div>
							<div class="col-md-7">
								<div class="row" id="dactransfusidarah_ralergi">
									<div class="col-md-12">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dactransfusidarah_div_ralergi2').style.display='none'" name="dactransfusidarah_ralergi" value="1" type="radio" class="custom-control-input" id="dactransfusidarah_ralergi_1">
												<label class="custom-control-label" for="dactransfusidarah_ralergi_1">Tidak</label>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dactransfusidarah_div_ralergi2').style.display='block'" name="dactransfusidarah_ralergi" value="2" type="radio" class="custom-control-input" id="dactransfusidarah_ralergi_2">
												<label class="custom-control-label" for="dactransfusidarah_ralergi_2">Ya</label>
											</div>
											<div class="row" id="dactransfusidarah_div_ralergi2" style="display: none;">
												<div class="col-md-1"></div>
												<div class="col-md-10">
													<textarea rows="2" name="dactransfusidarah_ralergiket1" id="dactransfusidarah_ralergiket1" style="width: 100%;" class="form-control"></textarea>
												</div>
											</div>										
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label" title="Jenis Darah">Jenis Darah</label>
							</div>
							<div class="col-md-7">
								<select name="cjenisdarah_id" id="dactransfusidarah_cjenisdarahId" class="form-control">
									<option value="0">--Pilih--</option>
									<option value="1">Whole Blood (WB)</option>
									<option value="2">Packed Red Call (PRC)</option>
									<option value="3">PRC Optipress (Jekodeplated)</option>
									<option value="4">Thrombocyte Concentrate (TC)</option>
									<option value="5">Thrombocyte - Apheresis</option>
									<option value="6">Cryoprecipitate (Cryo)</option>
									<option value="7">Fresh Frozen Plasma (FFP)</option>
									<option value="8">Washed Red Cell (WRC)</option>
									<option value="9">Lain-lain</option>
								</select>
								<textarea rows="3" name="dactransfusidarah_cjenisdarahket" id="dactransfusidarah_cjenisdarahket" class="form-control mt-1" style="display:none;"></textarea>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label" title="volume">Volume Darah / Unit</label>
							</div>
							<div class="col-md-7">
								<div class="input-group">
									<input type="number" onfocus="this.select();" class="form-control" id="dactransfusidarah_cvolume"> <span class="input-group-append"> <span class="input-group-text">cc</span>
									</span>
								</div>
							</div>
						</div>	
						<div class="form-group row">
							<div class="col-md-3 text-truncate">
								<label class="col-form-label" title="Identitas Pasien">Identitas Pasien</label>
							</div>
							<div class="col-md-7">
								<select name="pasienid" id="dactransfusidarah_pasienid" class="form-control">
									<option value="0">--Pilih--</option>
									<option value="1">Sesuai</option>
									<option value="2">Tidak Sesuai</option>
								</select>
							</div>
						</div>											
						<div class="form-group row">
							<div class="col-md-3 text-truncate">
								<label class="col-form-label" title="Golongan Darah">Golongan Darah</label>
							</div>
							<div class="col-md-7">
								<select name="golid" id="dactransfusidarah_golid" class="form-control">
									<option value="0">--Pilih--</option>
									<option value="1">Sesuai</option>
									<option value="2">Tidak Sesuai</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3 text-truncate">
								<label class="col-form-label" title="Emergency">Emergency</label>
							</div>
							<div class="col-md-7">
								<select name="emerid" id="dactransfusidarah_emerid" class="form-control">
									<option value="0">--Pilih--</option>
									<option value="1">Tidak</option>
									<option value="2">Ya</option>
								</select>
							</div>
						</div>										
					</div>										
					<div class="col-md-6">
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label" title="asaldarah">Pernah Transfusi Darah /<br>Produk Darah</label> 
							</div>
							<div class="col-md-7">
								<div class="row" id="dactransfusidarah_pernah">
									<div class="col-md-12">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dactransfusidarah_div_pernah2').style.display='none'" name="dactransfusidarah_pernah" value="1" type="radio" class="custom-control-input" id="dactransfusidarah_pernah_1">
												<label class="custom-control-label" for="dactransfusidarah_pernah_1">Tidak</label>
											</div>									
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input onclick="document.getElementById('dactransfusidarah_div_pernah2').style.display='block'" name="dactransfusidarah_pernah" value="2" type="radio" class="custom-control-input" id="dactransfusidarah_pernah_2">
												<label class="custom-control-label" for="dactransfusidarah_pernah_2">Ya</label>
											</div>
											<div class="row" id="dactransfusidarah_div_pernah2" style="display: none;">
												<div class="col-md-1"></div>
												<div class="col-md-10">
													<textarea rows="2" name="dactransfusidarah_pernahket1" id="dactransfusidarah_pernahket1" style="width: 100%;" class="form-control"></textarea>
												</div>*
											</div>										
										</div>
									</div>
								</div>
							</div>
						</div>				
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label" title="asaldarah">Obat Pra Transfusi</label>
							</div>
							<div class="col-md-9">
								<div class="row" id="dactransfusidarah_dalatId">
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dactransfusidarah_dalatId" value="1" type="checkbox" class="custom-control-input" id="dactransfusidarah_dalatId_1"> 
												<label class="custom-control-label" for="dactransfusidarah_dalatId_1">Antipiretik</label>
											</div>
											<div class="row" id="dactransfusidarah_div_dalatId1" style="display: none;">
												<div class="col-md-1"></div>
												<div class="col-md-10">
													<textarea rows="2" name="dactransfusidarah_dalatIdket1" id="dactransfusidarah_dalatIdket1" style="width: 100%;" class="form-control"></textarea>
												</div>*
											</div>		
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dactransfusidarah_dalatId" value="2" type="checkbox" class="custom-control-input" id="dactransfusidarah_dalatId_2"> 
												<label class="custom-control-label" for="dactransfusidarah_dalatId_2">Anti histamine</label>
											</div>
											<div class="row" id="dactransfusidarah_div_dalatId2" style="display: none;">
												<div class="col-md-1"></div>
												<div class="col-md-10">
													<textarea rows="2" name="dactransfusidarah_dalatIdket2" id="dactransfusidarah_dalatIdket2" style="width: 100%;" class="form-control"></textarea>
												</div>*
											</div>		
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dactransfusidarah_dalatId" value="3" type="checkbox" class="custom-control-input" id="dactransfusidarah_dalatId_3"> 
												<label class="custom-control-label" for="dactransfusidarah_dalatId_3">Diuretik</label>
											</div>
											<div class="row" id="dactransfusidarah_div_dalatId3" style="display: none;">
												<div class="col-md-1"></div>
												<div class="col-md-10">
													<textarea rows="2" name="dactransfusidarah_dalatIdket3" id="dactransfusidarah_dalatIdket3" style="width: 100%;" class="form-control"></textarea>
												</div>*
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dactransfusidarah_dalatId" value="4" type="checkbox" class="custom-control-input" id="dactransfusidarah_dalatId_4"> 
												<label class="custom-control-label" for="dactransfusidarah_dalatId_4">Steroid</label>
											</div>	
											<div class="row" id="dactransfusidarah_div_dalatId4" style="display: none;">
												<div class="col-md-1"></div>
												<div class="col-md-10">
													<textarea rows="2" name="dactransfusidarah_dalatIdket4" id="dactransfusidarah_dalatIdket4" style="width: 100%;" class="form-control"></textarea>
												</div>*
											</div>	
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="row custom-control custom-checkbox custom-control-inline">
												<input name="dactransfusidarah_dalatId" value="5" type="checkbox" class="custom-control-input" id="dactransfusidarah_dalatId_5"> 
												<label class="custom-control-label" for="dactransfusidarah_dalatId_5">Lain-lain</label>
											</div>
											<div class="row" id="dactransfusidarah_div_dalatId5" style="display: none;">
												<div class="col-md-1"></div>
												<div class="col-md-10">
													<textarea rows="2" name="dactransfusidarah_dalatIdket5" id="dactransfusidarah_dalatIdket5" style="width: 100%;" class="form-control"></textarea>
												</div>*
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3 text-truncate">
								<label class="col-form-label" title="Non Reaktif">Non Reaktif Terhadap Anti HIV,<br>Anti HCV, HbSAg, Shypilis</label>
							</div>
							<div class="col-md-7">
								<select name="reaktifid" id="dactransfusidarah_reaktifid" class="form-control">
									<option value="0">--Pilih--</option>
									<option value="1">Tidak</option>
									<option value="2">Ya</option>
								</select>
								<input type="text" class="form-control mt-1" style="display:none;" id="dactransfusidarah_reaktifket">
							</div>
						</div>	
					</div>
				</div>
				<div class="row" id="dactransfusidarah_div_pengkajian">
					<div class="col-md-6">
						<div class="form-group row">
							<div class="col-md-3 text-truncate">
								<label class="col-form-label">Tanggal Kadaluarsa</label>
							</div>
							<div class="col-md-7">
								<div class="input-group date" id="dactransfusidarah_datgldetexp1" data-target-input="nearest">
									<input id="dactransfusidarah_atgldetexp1" name="datgldetexp1" type="date" class="form-control">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3 text-truncate">
								<label class="col-form-label">Waktu Mulai Pemberian</label>
							</div>
							<div class="col-md-7">
								<div class="input-group date" id="dactransfusidarah_datgldetmulai1" data-target-input="nearest">
									<input id="dactransfusidarah_atgldetmulai1" name="datgldetmulai1" type="date" class="form-control">
								</div>
							</div>
						</div>	
						<div class="form-group row">
							<div class="col-md-3 text-truncate">
								<label class="col-form-label">Waktu Selesai Pemberian</label>
							</div>
							<div class="col-md-7">
								<div class="input-group date" id="dactransfusidarah_datgldetselesai1" data-target-input="nearest">
									<input id="dactransfusidarah_atgldetselesai1" name="datgldetselesai1" type="date" class="form-control">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3 text-truncate">
								<label class="col-form-label" title="Crossmatch">Crossmatch</label>
							</div>
							<div class="col-md-7">
								<select name="crosid" id="dactransfusidarah_crosid" class="form-control">
									<option value="0">--Pilih--</option>
									<option value="1">Tidak Dilakukan</option>
									<option value="2">Dilakukan</option>
								</select>
							</div>
						</div>												
						<div class="form-group row">
							<div class="col-md-3 text-truncate">
								<label class="col-form-label" title="Hasil Crossmatch">Hasil Crossmatch</label>
							</div>
							<div class="col-md-7">
								<select name="hcrosid" id="dactransfusidarah_hcrosid" class="form-control">
									<option value="0">--Pilih--</option>
									<option value="1">Kompatibel</option>
									<option value="2">Tidak Kompatibel</option>
								</select>
							</div>
						</div>	
						<div class="form-group row">
							<div class="col-md-3 text-truncate">
								<label class="col-form-label" title="Jenis Darah">Jenis Darah</label>
							</div>
							<div class="col-md-7">
								<select name="darahid" id="dactransfusidarah_darahid" class="form-control">
									<option value="0">--Pilih--</option>
									<option value="1">Sesuai</option>
									<option value="2">Tidak Sesuai</option>
								</select>
							</div>
						</div>																			
					</div>
					<div class="col-md-6">
						<div class="form-group row">
							<div class="col-md-3 text-truncate">
								<label class="col-form-label">No. Identifikasi Kantong</label>
							</div>
							<div class="col-md-7">
								<div class="input-group">
									<select name="cobskantongId1" id="dactransfusidarah_cobskantongId1" class="form-control">
										<option value="0">--Pilih--</option>
										<option value="1">Sesuai</option>
										<option value="2">Tidak Sesuai</option>
									</select>
									<span class="input-group-append">
									  <span class="input-group-text">Kantong Ke</span>
									</span>								
									<input type="number" onfocus="this.select();" class="form-control" id="dactransfusidarah_kantongke">
								</div>						
								<input type="text" class="form-control mt-1" style="display:none;" id="dactransfusidarah_cobskantongId1ket" placeholder="No Identifikasi Darah">
							</div>
						</div>				
						<div class="form-group row">
							<div class="col-md-3 text-truncate">
								<label class="col-form-label">Identifikasi Gelang Pasien</label>
							</div>
							<div class="col-md-7">
								<select name="cobsgelangId1" id="dactransfusidarah_cobsgelangId1" class="form-control">
									<option value="0">--Pilih--</option>
									<option value="1">Sesuai</option>
									<option value="2">Tidak Sesuai</option>
								</select>
							</div>
						</div>											
						<div class="form-group row">
							<div class="col-md-3 text-truncate">
								<label class="col-form-label">Keadaan Kantong</label>
							</div>
							<div class="col-md-7">
								<select name="csitkantongId1" id="dactransfusidarah_csitkantongId1" class="form-control">
									<option value="0">--Pilih--</option>
									<option value="1">Baik</option>
									<option value="2">Tidak Baik</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3 text-truncate">
								<label class="col-form-label" title="Temperatur">Temperatur Dalam 24 Jam<br>Sebelum Transfusi</label>
							</div>
							<div class="col-md-7">
								<select name="temp1" id="dactransfusidarah_temp1id" class="form-control">
									<option value="0">--Pilih--</option>
									<option value="1">Febris</option>
									<option value="2">Afebris</option>
									<option value="3">Lain-lain</option>
								</select>
								<input type="text" class="form-control mt-1" style="display:none;" id="dactransfusidarah_temp1ket">
							</div>
						</div>	
						<div class="form-group row">
							<div class="col-md-3 text-truncate">
								<label class="col-form-label" title="Temperatur">Temperatur Dalam 24 Jam<br>Setelah Transfusi</label>
							</div>
							<div class="col-md-7">
								<select name="temp2" id="dactransfusidarah_temp2id" class="form-control">
									<option value="0">--Pilih--</option>
									<option value="1">Febris</option>
									<option value="2">Afebris</option>
									<option value="3">Lain-lain</option>
								</select>
								<input type="text" class="form-control mt-1" style="display:none;" id="dactransfusidarah_temp2ket">
							</div>
						</div>										
					</div>
				</div>			
			</div>
		</div>
		<div class="card "><!-- DIAGNOSA DAN GOLONGAN DARAH -->
			<div class="card-header" style="background-color:black;">
				<h3 class="card-title" style="color:white;">DIAGNOSA DAN GOLONGAN DARAH</h3>
				<div class="card-tools">
				  <button type="button" class="btn btn-tool" data-card-widget="collapse">
					<i class="fas fa-minus"></i>
				  </button>			  
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group row" id="dactransfusidarah_div_formulir" style="">
							<div class="col-md-3">
								<label class="col-form-label" title="No Form Permintaan">No. Formulir Permintaan</label>
							</div>
							<div class="col-md-7">
								<div class="input-group">
									<input type="text" onfocus="this.select();" class="form-control" id="dactransfusidarah_bnoform"> 
								</div>
							</div>
						</div>				
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label" title="Golongan Darah">Golongan Darah</label>
							</div>
							<div class="col-md-7">
								<select name="bgoldarahId" id="dactransfusidarah_bgoldarahId" class="form-control">
									<option value="0">--Pilih--</option>
									<option value="1">A</option>
									<option value="2">B</option>
									<option value="3">O</option>
									<option value="4">AB</option>
									<option value="5">--</option>
								</select>
							</div>
						</div>	
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label" title="Rh">Rhesus</label>
							</div>
							<div class="col-md-7">
								<select name="_brhId" id="dactransfusidarah_brhId" class="form-control">
									<option value="0">--Pilih--</option>
									<option value="1">Positif</option>
									<option value="2">Negatif</option>
								</select>
							</div>
						</div>							
					</div>				
					<div class="col-md-6">
						<div class="form-group row">
							<div class="col-md-3 white-space: pre">
								<label class="col-form-label">Diagnosa Klinis</label>
							</div>
							<div class="col-md-7">
								<textarea rows="3" name="dactransfusidarah_bdiagnosa" id="dactransfusidarah_bdiagnosa" class="form-control"></textarea>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card " id="dactransfusidarah_div_darah" style=""><!-- INSTRUKSI DOKTER -->
			<div class="card-header" style="background-color:black;">
				<h3 class="card-title" style="color:white;">INSTRUKSI DOKTER</h3>
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
								<label class="col-form-label">Urutan &amp; Rencana<br>Jam Pemberian</label>
							</div>
							<div class="col-md-8">
								<textarea rows="4" name="dactransfusidarah_curutan" id="dactransfusidarah_curutan" class="form-control"></textarea>
							</div>
						</div>												
					</div>	
					<div class="col-md-6">
						<div class="form-group row">
							<div class="col-md-3 white-space: pre">
								<label class="col-form-label">Pemeriksaan Untuk Monitoring</label>
							</div>
							<div class="col-md-8">
								<textarea rows="4" name="dactransfusidarah_cpemeriksaan" id="dactransfusidarah_cpemeriksaan" class="form-control"></textarea>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3 white-space: pre">
								<label class="col-form-label">Laporkan Hasil Dengan Segera<br>Bila</label>
							</div>
							<div class="col-md-8">
								<textarea rows="4" name="dactransfusidarah_ckondisi" id="dactransfusidarah_ckondisi" class="form-control"></textarea>
							</div>
						</div>					
					</div>
					<div class="col-md-3 text-truncate">
						<button class="btn btn-sm btn-primary" onclick="savedarah()"><i class="fas fa-save"></i>Simpan</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
$('#dactransfusidarah_cjenisdarahId').on('change', function() {
	if($('#dactransfusidarah_cjenisdarahId').val()==9){
		$('#dactransfusidarah_cjenisdarahket').show();
	}else{
		$('#dactransfusidarah_cjenisdarahket').hide();
	};
});
$('input[name=dactransfusidarah_dalatId]').on('change', function() {
	for(var i=1;i<6;i++){
		if(document.getElementById('dactransfusidarah_dalatId_'+i).checked){
			$('#dactransfusidarah_div_dalatId'+i).show();
		}else{
			document.getElementById('dactransfusidarah_dalatIdket'+i).value='';
			$('#dactransfusidarah_div_dalatId'+i).hide();	
		}
	} 
});
$('#dactransfusidarah_reaktifid').on('change', function() {
	if($('#dactransfusidarah_reaktifid').val()==2){
		$('#dactransfusidarah_reaktifket').show();
	}else{
		$('#dactransfusidarah_reaktifket').hide();
	};
});
$('#dactransfusidarah_cobskantongId1').on('change', function() {
	if($('#dactransfusidarah_cobskantongId1').val()==2){
		$('#dactransfusidarah_cobskantongId1ket').show();
	}else{
		$('#dactransfusidarah_cobskantongId1ket').hide();
	};
});
$('#dactransfusidarah_temp1id').on('change', function() {
	if($('#dactransfusidarah_temp1id').val()==3){
		$('#dactransfusidarah_temp1ket').show();
	}else{
		$('#dactransfusidarah_temp1ket').hide();
	};
});
$('#dactransfusidarah_temp2id').on('change', function() {
	if($('#dactransfusidarah_temp2id').val()==3){
		$('#dactransfusidarah_temp2ket').show();
	}else{
		$('#dactransfusidarah_temp2ket').hide();
	};
});
$('#dactransfusidarah_cobskantongId1').on('change', function() {
	if($('#dactransfusidarah_cobskantongId1').val()==2){
		$('#dactransfusidarah_cobskantongId1ket').show();
	}else{
		$('#dactransfusidarah_cobskantongId1ket').hide();
	};
});
$(document).ready(function() {
	pegawai_dar();
});

function pegawai_dar() {
	apiPOST('Rawatjalan/pegawai', null,hasil=>{
	  var a=hasil['data'];
	  var pegawai='';
	  for (var i = 0; i < a.length; i++) {
		pegawai+='<option value="'+a[i]['id_pegawai']+'">'+a[i]['nama_pegawai']+'</option>';
	  }
	  document.getElementById('dactransfusidarah_apjId').innerHTML=pegawai;
	});
}

function savedarah(){
	if($('input[name=dactransfusidarah_pernah]:checked').val()==2){
		trans=$('#dactransfusidarah_pernahket1').val();
	}else{
		trans=$('input[name=dactransfusidarah_pernah]:checked').val();
	};
	if($('#dactransfusidarah_cjenisdarahId').val()==9){
		jns=$('#dactransfusidarah_cjenisdarahket').val();
	}else{
		jns=$('#dactransfusidarah_cjenisdarahId').val();
	};
	if($('#dactransfusidarah_reaktifid').val()==2){
		reaktif=$('#dactransfusidarah_reaktifket').val();
	}else{
		reaktif=$('#dactransfusidarah_reaktifid').val();
	};
	if($('#dactransfusidarah_cobskantongId1').val()==2){
		kntong=$('#dactransfusidarah_cobskantongId1ket').val();
	}else{
		kntong=$('#dactransfusidarah_cobskantongId1').val();
	};
	if($('#dactransfusidarah_temp1id').val()==3){
		suhu_awal=$('#dactransfusidarah_temp1ket').val();
	}else{
		suhu_awal=$('#dactransfusidarah_temp1id').val();
	};
	if($('#dactransfusidarah_temp2id').val()==3){
		suhu_akhir=$('#dactransfusidarah_temp2ket').val();
	}else{
		suhu_akhir=$('#dactransfusidarah_temp2id').val();
	};
	var ket_oba=[];
	var oba=[];
	for(var i=1;i<6;i++){
		if(document.getElementById('dactransfusidarah_dalatId_'+i).checked){	
			oba.push($('#dactransfusidarah_dalatId_'+i).val());
		}else{
			oba.push('');
		}
	}
		bat=oba.join();
	for(var i=1;i<6;i++){
		ket_oba.push($('#dactransfusidarah_dalatIdket'+i).val());
	}
		ket=ket_oba.join();
	
	var datapas_param={
		id:$('#dactransfusidarah_id').val(),
		tgl_trans:$('#dactransfusidarah_atgl').val(),
		dokter:$('#dactransfusidarah_apjId').val(),
		komp_dar:$('#dactransfusidarah_asaldarah').val()
	}
	var kaji_param={
		history_alergi:$('input[name=dactransfusidarah_ralergi]:checked').val(),
		jns_dar:jns,
		vol_dar:$('#dactransfusidarah_cvolume').val(),
		pas:$('#dactransfusidarah_pasienid').val(),
		sesuai_gol_dar:$('#dactransfusidarah_golid').val(),
		emergency:$('#dactransfusidarah_emerid').val(),
		pernah_trans_dar:trans,
		obat:bat,
		obat_ket:ket,
		non_reaktif:reaktif,
		tgl_exp:$('#dactransfusidarah_atgldetexp1').val(),
		pemberian_awal:$('#dactransfusidarah_atgldetmulai1').val(),
		pemberian_akhir:$('#dactransfusidarah_atgldetselesai1').val(),
		crossmatch:$('#dactransfusidarah_crosid').val(),
		hasil_cross:$('#dactransfusidarah_hcrosid').val(),
		sesuai_dar:$('#dactransfusidarah_darahid').val(),
		sesuai_kantong:kntong,
		no_kantong:$('#dactransfusidarah_kantongke').val(),
		gelang:$('#dactransfusidarah_cobsgelangId1').val(),
		keadaan_kantong:$('#dactransfusidarah_csitkantongId1').val(),
		temp_awal:suhu_awal,
		temp_akhir:suhu_akhir
	}
	var diag_param={
		no_form:$('#dactransfusidarah_bnoform').val(),
		gol_dar:$('#dactransfusidarah_bgoldarahId').val(),
		rh:$('#dactransfusidarah_brhId').val(),
		diagnos:$('#dactransfusidarah_bdiagnosa').val()
	}
	var ins_dok_param={
		renc:$('#dactransfusidarah_curutan').val(),
		monitor:$('#dactransfusidarah_cpemeriksaan').val(),
		laporan:$('#dactransfusidarah_ckondisi').val()
	}
	// console.log(datapas_param);
	console.log(kaji_param);
	// console.log(diag_param);
	// console.log(ins_dok_param);
}
</script>