<div class="card-body p-2 darkgrey-custom" id="divassesmenAnes">
    <div id="div2assesmenAnes" class="rapet">
        <div class="card"><!-- TITLE -->
            <div class="col-md-12">
                <div class="row d-flex justify-content-center">
                    <h4><b><label class="col-form-label">Assesmen Pre Anestesi</label></b></h4>
                </div>
            </div>
        </div>
        <div class="card ">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="col-form-label">ID</label>
                            </div>
                            <div class="col-md-2">
                                <input id="dacriassesmenanes_id" name="id" type="text" class="form-control" readonly="readonly">
                            </div>
                            <div class="col-md-6">
                                <b><i><label class="col-form-label">Note : Yang Bertanda Bintang (*) wajib di isi !! </label></i></b>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4  text-truncate">
                                <label class="col-form-label">Tanggal (Tiba Di Ruangan)</label>
                            </div>
                            <div class="col-md-5">
                                <input type="date" id="dacriassesmenanes_datgl" class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="col-form-label">PPJA / BPJA</label>
                            </div>
                            <div class="col-md-7">
                                <select id="dacriassesmenanes_apjId" name="apjId" class="form-control form-control-sm">
                                </select>
                            </div>
                            <div class="col-md-1">
                                <button id="dacriassesmenanes_btpjdef" class="btn btn-sm btn-primary d-none" type="button" title="Default PJ">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
        <div class="card card-default">
            <div class="card-header" style="background-color:black;">
                <h3 class="card-title" style="color:white;">Riwayat Kesehatan</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <div class="form-group row" style="padding-bottom: 3px; padding-top: 3px; border-bottom-style: solid; border-bottom-width: thin;">
                            <div class="col-md-12">
                                <div class="form-group row">
									<div class="col-md-6"><!-- KIRI -->
										<div class="row"><label>Riwayat</label></div>
										<div class="row">
											<div class="col-md-1"></div>
											<div class="col-md-2">Riwayat Operasi</div>
											<div class="col-md-3">
												<div class="form-group">
													<div class="row custom-control custom-checkbox custom-control-inline">
														<input name="dacriasesmenanes_op" value="1" type="radio" class="custom-control-input" id="dacriasesmenanes_op_1" onclick="document.getElementById('dacriasesmenanes_histop').style.display='none'"> <label class="custom-control-label" for="dacriasesmenanes_op_1">Tidak</label>
													</div>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<div class="row custom-control custom-checkbox custom-control-inline" >
														<input name="dacriasesmenanes_op" value="2" type="radio" class="custom-control-input" id="dacriasesmenanes_op_2" onclick="document.getElementById('dacriasesmenanes_histop').style.display='block'"> <label class="custom-control-label" for="dacriasesmenanes_op_2">Ya</label>
													</div>
												</div>
											</div>
										</div>
										<div class="row" name="dacriasesmenanes_histop" id="dacriasesmenanes_histop" style="width: 100%;display: none;" class="form-control">
											<div class="col-md-12">
												<div class="row">
													<div class="col-md-6" style="padding-left: 100px;"><label>1. Jenis Operasi</label></div>
													<div class="col-md-6"><input class="form-control" type="text" id="dacriasesmenanes_hist_1"></div>
												</div>
												<div class="row">
													<div class="col-md-6" style="padding-left: 100px;"><label>2. Komplikasi</label></div>
													<div class="col-md-6"><input class="form-control" type="text" id="dacriasesmenanes_hist_2"></div>
												</div>												
											</div>											
										</div>
										<div class="row">
											<div class="col-md-1"></div>
											<div class="col-md-2">Riwayat Anestesi</div>
											<div class="col-md-3">
												<div class="form-group">
													<div class="row custom-control custom-checkbox custom-control-inline">
														<input name="dacriasesmenanes_an" value="1" type="radio" class="custom-control-input" id="dacriasesmenanes_an_1" onclick="document.getElementById('dacriasesmenanes_histan').style.display='none'"> <label class="custom-control-label" for="dacriasesmenanes_an_1">Tidak</label>
													</div>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<div class="row custom-control custom-checkbox custom-control-inline" >
														<input name="dacriasesmenanes_an" value="2" type="radio" class="custom-control-input" id="dacriasesmenanes_an_2" onclick="document.getElementById('dacriasesmenanes_histan').style.display='block'"> <label class="custom-control-label" for="dacriasesmenanes_an_2">Ya</label>
													</div>
												</div>
											</div>
										</div>
										<div class="row" name="dacriasesmenanes_histan" id="dacriasesmenanes_histan" style="width: 100%;display: none;" class="form-control">
											<div class="col-md-12">
												<div class="row">
													<div class="col-md-6" style="padding-left: 100px;"><label>1. Jenis Anestesi</label></div>
													<div class="col-md-6"><input class="form-control" type="text" id="dacriasesmenanes_histan_1"></div>
												</div>
												<div class="row">
													<div class="col-md-6" style="padding-left: 100px;"	><label>2. Komplikasi</label></div>
													<div class="col-md-6"><input class="form-control" type="text" id="dacriasesmenanes_histan_2"></div>
												</div>												
											</div>
										</div>
									</div>
									<div class="col-md-6"><!-- KANAN -->
										<div class="row">
											<div class="col-md-4">Kebiasaan Pasien</div>
											<div class="col-md-4">
												<div class="row">
													<div class="form-group">
														<div class="row custom-control custom-checkbox custom-control-inline" >
															<input name="dacriasesmenanes_habit" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenanes_habit_1"><label class="custom-control-label" for="dacriasesmenanes_habit_1">Merokok</label>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-10">
														<input type="text" name="dacriasesmenanes_habit_ext" placeholder="...btg/hari" id="dacriasesmenanes_habit_ext1" style="width: 100%;display: none;" class="form-control">
													</div>
												</div>
												<div class="row">
													<div class="form-group">
														<div class="row custom-control custom-checkbox custom-control-inline" >
															<input name="dacriasesmenanes_habit" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenanes_habit_3"><label class="custom-control-label" for="dacriasesmenanes_habit_3">Kopi/Teh/Soda</label>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="row">
													<div class="form-group">
														<div class="row custom-control custom-checkbox custom-control-inline" >
															<input name="dacriasesmenanes_habit" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenanes_habit_2"> <label class="custom-control-label" for="dacriasesmenanes_habit_2">Alkohol</label>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-10">
														<input type="text" name="dacriasesmenanes_habit_ext" placeholder="...btl/hari" id="dacriasesmenanes_habit_ext2" style="width: 100%;display: none;" class="form-control">
													</div>
												</div>
												<div class="row">
													<div class="form-group">
														<div class="row custom-control custom-checkbox custom-control-inline" >
															<input name="dacriasesmenanes_habit" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenanes_habit_4" > <label class="custom-control-label" for="dacriasesmenanes_habit_4">Olahraga rutin</label>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-4">Penyulit Anestesi</div>
											<div class="col-md-4">
												<div class="row">
													<div class="form-group">
														<div class="row custom-control custom-checkbox custom-control-inline">
															<input name="dacriasesmenanes_sulan" value="1" type="radio" class="custom-control-input" id="dacriasesmenanes_sulan_1" onclick="document.getElementById('dacriasesmenanes_sulan_ext').style.display='none'"> <label class="custom-control-label" for="dacriasesmenanes_sulan_1">Tidak</label>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="row">													
													<div class="form-group">
														<div class="row custom-control custom-checkbox custom-control-inline">
															<input name="dacriasesmenanes_sulan" value="1" type="radio" class="custom-control-input" id="dacriasesmenanes_sulan_2" onclick="document.getElementById('dacriasesmenanes_sulan_ext').style.display='block'"> <label class="custom-control-label" for="dacriasesmenanes_sulan_2">Ya</label>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-4"></div>
											<div class="col-md-4"></div>
											<div class="col-md-4">
												<div class="row">													
													<div class="col-md-10">
														<input type="text" name="dacriasesmenanes_sulan_ext" id="dacriasesmenanes_sulan_ext" style="width: 100%;display: none;" class="form-control">
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-4">Puasa</div>
											<div class="col-md-4">
												<div class="row">													
													<div class="form-group">
														<div class="row custom-control custom-checkbox custom-control-inline">
															<input name="dacriasesmenanes_pu" value="1" type="radio" class="custom-control-input" id="dacriasesmenanes_pu_1" onclick="document.getElementById('dacriasesmenanes_pu_ext').style.display='none'"> <label class="custom-control-label" for="dacriasesmenanes_pu_1">Tidak</label>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="row">													
													<div class="form-group">
														<div class="row custom-control custom-checkbox custom-control-inline">
															<input name="dacriasesmenanes_pu" value="1" type="radio" class="custom-control-input" id="dacriasesmenanes_pu_2" onclick="document.getElementById('dacriasesmenanes_pu_ext').style.display='inline-flex'"> <label class="custom-control-label" for="dacriasesmenanes_pu_2">Ya</label>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" id="dacriasesmenanes_pu_ext" style="display: none;">
											<div class="col-md-1"><label>Lama</label></div>
											<div class="col-md-2">												
												<input type="number" name="dacriasesmenanes_pu" id="dacriasesmenanes_pu_ext_1" class="form-control">
											</div>
											<div class="col-md-1"><span>jam</span></div>
											<div class="col-md-1"><label>Makan Terakhir</label></div>
											<div class="col-md-2">
												<input type="number" name="dacriasesmenanes_pu" id="dacriasesmenanes_pu_ext_2" class="form-control">
											</div>
											<div class="col-md-1"><span>jam</span></div>
											<div class="col-md-1"><label>Minum Terakhir</label></div>
											<div class="col-md-2">
												<input type="number" name="dacriasesmenanes_pu" id="dacriasesmenanes_pu_ext_3" class="form-control">
											</div>
											<div class="col-md-1"><span>jam</span></div>
										</div>
									</div>
								</div>
							</div> 
						</div>
					</div>
				</div>				
			</div>
			<!-- /.row -->
		</div>
		<!-- /.card-body -->
	</div>	
	<div class="card card-default">
		<div class="card-header " style="background-color:black;">
			<h3 class="card-title" style="color:white;">PEMERIKSAAN FISIK (Tanda Vital)</h3>
			<div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse">
					<i class="fas fa-minus"></i>
				</button>
			</div>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<div class="row ">
				<div class="col-md-4">
					<div class="form-group row">
						<div class="col-md-3">
							<label class="col-form-label" title="Keadaan Umum">Keadaan
							Umum</label>
						</div>
						<div class="col-md-8">
							<div class="input-group input-group-sm">
								<select name="akeadaan" id="dacriassesmenanes_akeadaan" class="form-control form-control-sm">
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
							<div class="input-group input-group-sm">
								<input type="number" onfocus="this.select();" class="form-control form-control-sm" id="dacriassesmenanes_crespirasi"> <span class="input-group-append"> <span class="input-group-text">x/Menit</span>
							</span>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-3">
							<label class="col-form-label" title="Nadi">Nadi</label>
						</div>
						<div class="col-md-8">
							<div class="input-group input-group-sm">
								<input type="number" onfocus="this.select();" class="form-control form-control-sm" id="dacriassesmenanes_dnadi"> <span class="input-group-append"> <span class="input-group-text">x/Menit</span>
							</span>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-3">
							<label class="col-form-label" title="Spo2">SpO2</label>
						</div>
						<div class="col-md-8">
							<div class="input-group input-group-sm">
								<input type="number" onfocus="this.select();" class="form-control form-control-sm" id="dacriassesmenanes_hspo2"> <span class="input-group-append"> <span class="input-group-text">%</span>
							</span>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-3">
							<label class="col-form-label" title="Reflek Cahaya">Reflek
							Cahaya</label>
						</div>
						<div class="col-md-8">
							<div class="input-group input-group-sm">
								<span class="input-group-prepend"> <span class="input-group-text">Kiri</span></span> 
							<select name="ireflek1" id="dacriassesmenanes_ireflek1" class="form-control form-control-sm">
								<option value="1">+</option>
								<option value="2">-</option>
							</select> - <span class="input-group-prepend"> <span class="input-group-text">Kanan</span></span> 
							<select name="ireflek1" id="dacriassesmenanes_ireflek2" class="form-control form-control-sm">
								<option value="1">+</option>
								<option value="2">-</option>
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
						<div class="col-md-3">
							<div class="input-group input-group-sm">
								<span class="input-group-prepend"> <span class="input-group-text">Kiri</span>
							</span> <select name="epupil1" id="dacriassesmenanes_epupil1" class="form-control form-control-sm">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
							</div>
						</div>
						<div class="col-md-5">
							<div class="input-group input-group-sm">
								<span class="input-group-prepend"> <span class="input-group-text">Kanan</span>
							</span> <select name="epupil2" id="dacriassesmenanes_epupil2" class="form-control form-control-sm">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select> <span class="input-group-append"> <span class="input-group-text">mm</span></span>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-3">
							<label class="col-form-label" title="Tensi">Tekanan
							Darah</label>
						</div>
						<div class="col-md-9">
							<div class="row" id="dacriassesmenanes_gtdId">
								<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriassesmenanes_gtdId" value="1" type="radio" class="custom-control-input" id="dacriassesmenanes_gtdId_1" onclick="document.getElementById('dacriassesmenanes_div_gtdId2').style.display='none'"> <label class="custom-control-label" for="dacriassesmenanes_gtdId_1">Tidak Dilakukan</label>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriassesmenanes_gtdId" value="2" type="radio" class="custom-control-input" id="dacriassesmenanes_gtdId_2" onclick="document.getElementById('dacriassesmenanes_div_gtdId2').style.display='block'"> <label class="custom-control-label" for="dacriassesmenanes_gtdId_2">Dilakukan</label>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row" id="dacriassesmenanes_div_gtdId2" style="display: none;">
								<div class="col-md-3"></div>
								<div class="col-md-8" style="padding-bottom: 3px;">
									<div class="input-group input-group-sm">
										<input type="number" onfocus="this.select();" class="form-control form-control-sm" id="dacriassesmenanes_ftensi1"> <label class="col-form-label">/</label> <input type="number" onfocus="this.select();" class="form-control" id="dacriassesmenanes_ftensi2"> <span class="input-group-append"> <span class="input-group-text">mmHg</span>
									</span>
									</div>
								</div>
								<div class="col-md-3">
									<label class="col-form-label" title="Tensi"></label>
								</div>
								<div class="col-md-8">
									<div class="input-group input-group-sm">
										<input type="text" id="dacriassesmenanes_fpalpasi" class="form-control form-control-sm" placeholder="Diisi jika Palpasi">
										<span class="input-group-append"> <span class="input-group-text">Per palpasi</span>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-3">
							<label class="col-form-label" title="Suhu">Suhu</label>
						</div>
						<div class="col-md-8">
							<div class="input-group input-group-sm">
								<input type="number" onfocus="this.select();" class="form-control form-control-sm" id="dacriassesmenanes_gsuhu"> <span class="input-group-append"> <span class="input-group-text">°C</span>
							</span>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-3">
							<label class="col-form-label" title="Lingkar Kepala">Lingkar
							Kepala</label>
						</div>
						<div class="col-md-8">
							<div class="input-group input-group-sm">
								<input type="number" onfocus="this.select();" class="form-control form-control-sm" id="dacriassesmenanes_klingkarkepala">
								<span class="input-group-append"> <span class="input-group-text">Cm</span>
							</span>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-3">
							<label class="col-form-label" title="Lingkar Lengan">Lingkar
							Lengan</label>
						</div>
						<div class="col-md-8">
							<div class="input-group input-group-sm">
								<input type="number" onfocus="this.select();" class="form-control form-control-sm" id="dacriassesmenanes_klingkarlengan">
								<span class="input-group-append"> <span class="input-group-text">Cm</span>
							</span>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-3">
							<label class="col-form-label" title="Lingkar Perut">Lingkar
							Perut</label>
						</div>
						<div class="col-md-8">
							<div class="input-group input-group-sm">
								<input type="number" onfocus="this.select();" class="form-control form-control-sm" id="dacriassesmenanes_klingkarperut">
								<span class="input-group-append"> <span class="input-group-text">Cm</span>
							</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group row">
						<div class="col-md-12">
							<label class="col-form-label text-danger font-weight-bold font-italic" title="Berat Badan">Note (*) Nominal ribuan = gram, satuan / puluhan / ratusan = kg</label>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-3">
							<label class="col-form-label" title="Berat Badan">Berat
							Badan</label> <span class="text-danger">*</span>
						</div>
						<div class="col-md-8">
							<div class="input-group input-group-sm">
								<input type="number" onfocus="this.select();" class="form-control form-control-sm" id="dacriassesmenanes_jbb"> <span class="input-group-append">
									<span class="input-group-text" id="dacriassesmenanes_divbb">Kg</span>
								</span>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-3">
							<label class="col-form-label" title="Tinggi Badan">Tinggi
							Badan</label>
						</div>
						<div class="col-md-8">
							<div class="input-group input-group-sm">
								<input type="number" onfocus="this.select();" class="form-control form-control-sm" id="dacriassesmenanes_jtb" onchange="hitungimtassanak()" onkeyup="hitungimtassanak()"> <span class="input-group-append"> <span class="input-group-text">Cm</span>
							</span>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-3">
							<label class="col-form-label" title="Tinggi Badan">IMT</label>
						</div>
						<div class="col-md-8">
							<input type="number" onfocus="this.select();" class="form-control form-control-sm" id="dacriassesmenanes_kimt" readonly>
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
							  <select class="form-control" name="dacriassesmenanes_bgcstypeAP" id="dacriassesmenanes_bgcstypeAP">
								<option value="1">Compos mentis</option>
								<option value="2">Apatis</option>
								<option value="3">Somnolen</option>
								<option value="4">Delirium</option>
								<option value="5">Sopor</option>
								<option value="6">Coma</option>
							  </select>
							</td>
							<td>
							  <input type="text" class="form-control" name="dacriassesmenanes_bgcstotAP" id="dacriassesmenanes_bgcstotAP" value="15">
							</td>
						</tr>
					  </tbody>
					</table>
				</div>
			</div>
			<div class="row"><label>Status Cardiopulmonal</label></div>	
			<div class="row">
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-4"><label>1. Jantung</label></div>
						<div class="col-md-4">
							<div class="row custom-control custom-checkbox custom-control-inline">
								<input name="dacriasesmenanes_jt" value="1" type="radio" class="custom-control-input" id="dacriasesmenanes_jt_1" onclick="document.getElementById('').style.display='none'"> <label class="custom-control-label" for="dacriasesmenanes_jt_1">Normal</label>
							</div>
						</div>
						<div class="col-md-4">
							<div class="row custom-control custom-checkbox custom-control-inline">
								<input name="dacriasesmenanes_jt" value="2" type="radio" class="custom-control-input" id="dacriasesmenanes_jt_2" onclick="document.getElementById('dacriasesmenanes_jt_ext').style.display='block'"> <label class="custom-control-label" for="dacriasesmenanes_jt_2">Tidak Normal</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8"></div>
						<div class="col-md-4"><input class="form-control" type="text" id="dacriasesmenanes_jt_ext" style="width: 100%;display: none;" class="form-control"></div>						
					</div>
				</div>
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-4"><label>2. Paru</label></div>
						<div class="col-md-4">
							<div class="row custom-control custom-checkbox custom-control-inline">
								<input name="dacriasesmenanes_pr" value="1" type="radio" class="custom-control-input" id="dacriasesmenanes_pr_1" onclick="document.getElementById('').style.display='none'"> <label class="custom-control-label" for="dacriasesmenanes_pr_1">Normal</label>
							</div>
						</div>
						<div class="col-md-4">
							<div class="row custom-control custom-checkbox custom-control-inline">
								<input name="dacriasesmenanes_pr" value="2" type="radio" class="custom-control-input" id="dacriasesmenanes_pr_2" onclick="document.getElementById('dacriasesmenanes_pr_ext').style.display='block'"> <label class="custom-control-label" for="dacriasesmenanes_pr_2">Tidak Normal</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8"></div>
						<div class="col-md-4"><input class="form-control" type="text" id="dacriasesmenanes_pr_ext" style="width: 100%;display: none;" class="form-control"></div>						
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="card card-default">
		<div class="card-header " style="background-color:black;">
			<h3 class="card-title" style="color:white;">PEMERIKSAAN PENUNJANG</h3>
			<div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse">
					<i class="fas fa-minus"></i>
				</button>
			</div>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<div class="row ">
				<div class="col-md-6">
					<div class="row"><button class="btn btn-primary" onclick="show_modalPermintaanLabIrna1()">Permintaan Laboratorium</button>&nbsp;</div>
					<div class="row">
						<div class="col-md-6"><label>EKG</label></div>
						<div class="col-md-6">
							<div class="col-md-auto">
								<input class="form-control" type="text" id="dacriasesmenanes_ekg">
							</div>
						</div>						
					</div>					
				</div>
				<div class="col-md-6">
					<div class="row"><button class="btn btn-primary" onclick="show_modalPermintaanRadIrna1()">Permintaan Radiologi</button>&nbsp;</div>					
					<div class="row">
						<div class="col-md-6"><label>Lain-lain</label></div>
						<div class="col-md-6"><div class="col-md-auto">
							<input class="form-control" type="text" id="dacriasesmenanes_ext"></div>						
						</div>
					</div>					
				</div>
			</div>
		</div>
	</div>	
	<div class="card card-default">
		<div class="card-header " style="background-color:black;">
			<h3 class="card-title" style="color:white;">Kesimpulan</h3>
			<div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse">
					<i class="fas fa-minus"></i>
				</button>
			</div>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<div class="row ">
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-4"><label>Diagnosa Klinis</label></div>
						<div class="col-md-8">
							<textarea id="dacriasesmenanes_dk" style="height: 100px;"></textarea>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4"><label>Catatan</label></div>
						<div class="col-md-8">
							<textarea id="dacriasesmenanes_cat" style="height: 100px;"></textarea>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="row"><!-- ASA -->
						<div class="col-md-4"><label>ASA</label></div>
						<div class="col-md-4">						
							<div class="form-group">
								<div class="row custom-control custom-checkbox custom-control-inline">
									<input name="dacriasesmenanes_asa" value="1" type="radio" class="custom-control-input" id="dacriasesmenanes_asa_1"> <label class="custom-control-label" for="dacriasesmenanes_asa_1">1</label>
								</div>
							</div>							
							<div class="form-group">
								<div class="row custom-control custom-checkbox custom-control-inline">
									<input name="dacriasesmenanes_asa" value="3" type="radio" class="custom-control-input" id="dacriasesmenanes_asa_3"> <label class="custom-control-label" for="dacriasesmenanes_asa_3">3</label>
								</div>
							</div>							
							<div class="form-group">
								<div class="row custom-control custom-checkbox custom-control-inline">
									<input name="dacriasesmenanes_asa" value="5" type="radio" class="custom-control-input" id="dacriasesmenanes_asa_5"> <label class="custom-control-label" for="dacriasesmenanes_asa_5">5</label>
								</div>
							</div>						
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<div class="row custom-control custom-checkbox custom-control-inline">
									<input name="dacriasesmenanes_asa" value="2" type="radio" class="custom-control-input" id="dacriasesmenanes_asa_2"> <label class="custom-control-label" for="dacriasesmenanes_asa_2">2</label>
								</div>
							</div>
							<div class="form-group">
								<div class="row custom-control custom-checkbox custom-control-inline">
									<input name="dacriasesmenanes_asa" value="4" type="radio" class="custom-control-input" id="dacriasesmenanes_asa_4"> <label class="custom-control-label" for="dacriasesmenanes_asa_4">4</label>
								</div>
							</div>
							<div class="form-group">
								<div class="row custom-control custom-checkbox custom-control-inline">
									<input name="dacriasesmenanes_asa" value="6" type="checkbox" class="custom-control-input" id="dacriasesmenanes_asa_6"> <label class="custom-control-label" for="dacriasesmenanes_asa_6">Emergency</label>
								</div>
							</div>
						</div>
					</div>
					<div class="row"><!-- Rencana Tindakan -->
						<div class="col-md-4"><label>Rencana Tindakan</label></div>
						<div class="col-md-4">
							<div class="form-group">
								<div class="row custom-control custom-checkbox custom-control-inline">
									<input name="dacriasesmenanes_tind" value="1" type="radio" class="custom-control-input" id="dacriasesmenanes_tind_1" onclick="document.getElementById('divdacriasesmenanes_tind_ext').style.display='none'"> <label class="custom-control-label" for="dacriasesmenanes_tind_1">GA</label>
								</div>
							</div>
							<div class="form-group">
								<div class="row custom-control custom-checkbox custom-control-inline">
									<input name="dacriasesmenanes_tind" value="3" type="radio" class="custom-control-input" id="dacriasesmenanes_tind_3" onclick="document.getElementById('divdacriasesmenanes_tind_ext').style.display='none'"> <label class="custom-control-label" for="dacriasesmenanes_tind_3">Sedasi IV</label>
								</div>
							</div>
							<div class="form-group">
								<div class="row custom-control custom-checkbox custom-control-inline">
									<input name="dacriasesmenanes_tind" value="5" type="radio" class="custom-control-input" id="dacriasesmenanes_tind_5" onclick="document.getElementById('divdacriasesmenanes_tind_ext').style.display='none'"> <label class="custom-control-label" for="dacriasesmenanes_tind_5">MAC</label>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<div class="row custom-control custom-checkbox custom-control-inline">
									<input name="dacriasesmenanes_tind" value="2" type="radio" class="custom-control-input" id="dacriasesmenanes_tind_2" onclick="document.getElementById('divdacriasesmenanes_tind_ext').style.display='none'"> <label class="custom-control-label" for="dacriasesmenanes_tind_2">Regional</label>
								</div>
							</div>
							<div class="form-group">
								<div class="row custom-control custom-checkbox custom-control-inline">
									<input name="dacriasesmenanes_tind" value="4" type="radio" class="custom-control-input" id="dacriasesmenanes_tind_4" onclick="document.getElementById('divdacriasesmenanes_tind_ext').style.display='none'"> <label class="custom-control-label" for="dacriasesmenanes_tind_4">TIVA</label>
								</div>
							</div>
							<div class="form-group">
								<div class="row custom-control custom-checkbox custom-control-inline">
									<input name="dacriasesmenanes_tind" value="6" type="radio" class="custom-control-input" id="dacriasesmenanes_tind_6" onclick="document.getElementById('divdacriasesmenanes_tind_ext').style.display='block'"> <label class="custom-control-label" for="dacriasesmenanes_tind_6">Lain-lain</label>
								</div>
							</div>
							<div id="divdacriasesmenanes_tind_ext" style="width: 100%;display: none;">
								<input type="text" id="dacriasesmenanes_tind_ext" class="form-control">
							</div>
						</div>
					</div>
					<div class="row"><!-- Edukasi Pasien -->
						<div class="col-md-4"><label>Edukasi Pasien</label></div>
						<div class="col-md-4">
							<div class="form-group">
								<div class="row custom-control custom-checkbox custom-control-inline">
									<input name="dacriasesmenanes_edu" value="1" type="radio" class="custom-control-input" id="dacriasesmenanes_edu_1"><label class="custom-control-label" for="dacriasesmenanes_edu_1">Sudah</label>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<div class="row custom-control custom-checkbox custom-control-inline">
									<input name="dacriasesmenanes_edu" value="2" type="radio" class="custom-control-input" id="dacriasesmenanes_edu_2"><label class="custom-control-label" for="dacriasesmenanes_edu_2">Belum</label>
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
				<div class="col-md-6">
					<div class="form-group row">
						<div class="col-md-12" align="center">
							<label class="col-form-label">Perawat Penanggung Jawab
							</label>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-12 " align="center">
							<div class="col-md-6">
								<input type="date" id="tglttdppjassanak" class="form-control form-control-sm">
							</div>
						</div>
					</div>
					<div class="table-responsive" align="center">
						<div class="col-md-6" align="center">
							<input type="text" class="form-control form-control-sm text-center" id="dacinfoassanak_zpjttd1">
						</div>
						<div class="col-md-12" align="center">
							<label class="col-form-label">Nama &amp; Tanda tangan</label>
						</div>
						<div align="center" class="col-md-12">
							<button id="dacinfoassanak_btclearttd1" type="button" class="btn btn-sm btn-warning d-none"> Reset</button>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<button type="button" class="btn btn-sm btn-primary btnsave" onclick="saveassesmenAnesRI();" id="btnsave_assanak"><i class="fas fa-save"></i> SIMPAN</button>
			</div>
		</div>
	</div>	
</div>

<!-- modal permintaan lab -->
<div class="modal fade" id="ModalPermintaanLabIrna1">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header p-2">
				<h5>Permintaan Laboratorium</h5>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Tanggal Laboratorium</label>
					<input type="date" name="tglOrderLab" value="<?php echo date('Y-m-d');?>" id="apatglOrderLab" class="form-control form-control-xs">
				</div>	
				<div class="form-group">
					<label>Cari Jenis Laboratorium</label>
					<input type="input" name="cariorderlabermirna" id="apacariorderlabermirna" class="form-control form-control-xs">
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
										<div id="alacrequestlabemrdiag_grouptestirna" class="row"></div>
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
										<div id="alacrequestlabemrdiag_grouptest_requestirna" class="row"></div>
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
<div class="modal fade" id="ModalPermintaanRadIrna1">
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
										<div class="row" id="apaccheckboxlogireqemrdiag_grouptestirna">

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
										<div class="row" id="apaccheckboxlogireqemrdiag_grouptestirna_2">

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
										<div class="row" id="apaccheckboxlogireqemrdiag_grouptestirna_3"></div>
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
<!-- end modal permintaan Radiologi -->
<script type="text/javascript">
	$(document).ready(function() {

	})

    $('#dacriasesmenanes_habit_1').on('change', function() {
		if(document.getElementById('dacriasesmenanes_habit_1').checked){
			$("#dacriasesmenanes_habit_ext1").show();
		}else{
			$("#dacriasesmenanes_habit_ext1").hide();
		}
	});

	$('#dacriasesmenanes_habit_2').on('change', function() {
		if(document.getElementById('dacriasesmenanes_habit_2').checked){
			$("#dacriasesmenanes_habit_ext2").show();
		}else{
			$("#dacriasesmenanes_habit_ext2").hide();
		}
	});

	function show_modalPermintaanLabIrna1() {
		$('#ModalPermintaanLabIrna1').modal("show");
		LabKimiaKlinisIrna();		
	}
	function show_modalPermintaanRadIrna1() {
		$('#ModalPermintaanRadIrna1').modal("show");
		RadXRirna1();
		RadULirna1();
		RadCTScanirna1();		
	}

	function LabKimiaKlinisIrna() {
		var a='';
		apiPOST('Lab/produk', null, hasil =>{
			var b=hasil['produk'];
			for (var i = 0; i < b.length; i++) {
				a+='<div class="col-md-6">';
				a+='<div class="form-group">';
				a+='<div class="custom-control custom-checkbox ">';
				a+='<input name="lacrequestlabemrdiag_test" value="'+b[i].id_produk+'" type="checkbox"  id="alacrequestlabemrdiag_test_'+b[i].id_produk+'"  onclick="tambahproduklabermirna1(`'+b[i].id_produk+'`,`'+b[i].nama_produk+'`)">';
				a+='<label class="form-label" for="alacrequestlabemrdiag_test_'+b[i].id_produk+'" id="alacrequestlabemrdiag_labeltest_'+b[i].id_produk+'">'+b[i].nama_produk+'</label>';
				a+='</div>';
				a+='</div>';
				a+='</div>';
			}
			document.getElementById('alacrequestlabemrdiag_grouptestirna').innerHTML=a;
		});
	}
	function tambahproduklabermirna1(id_produk,nama) {
		var a='';
		if (id_produk!='') {  
			a+='<div class="col-md-6">';
			a+='<div class="form-group">';
			a+='<div class="custom-control custom-checkbox ">';
			a+='<input name="alacrequestlabemrdiag_request" value="'+id_produk+'" type="checkbox"  id="alacrequestlabemrdiag_test_'+id_produk+'" checked >';
			a+='<label class="form-label" for="alacrequestlabemrdiag_request_'+id_produk+'" id="alacrequestlabemrdiag_labelrequest_'+id_produk+'">'+nama+'</label>';
			a+='</div>';
			a+='</div>';
			a+='</div>';
		} 
		$('#alacrequestlabemrdiag_grouptest_requestirna').append(a);
	}

	function RadXRirna1() {
		var a='';
		var param = {kode : 'XR',};
		apiPOST('Lab/produkRad', param, hasil =>{
			var b=hasil['produk'];
			for (var i = 0; i < b.length; i++) {
				a+='<div class="col-md-6">';
				a+='<div class="form-group">';
				a+='<div class="custom-control custom-checkbox ">';
				a+='<input name="lacrequestrademrdiag_test" value="'+b[i].id_produk+'" type="checkbox"  id="alacrequestlabemrdiag_test_'+b[i].id_produk+'" >';
				a+='<label class="form-label" for="alacrequestlabemrdiag_test_'+b[i].id_produk+'" id="alacrequestlabemrdiag_labeltest_'+b[i].id_produk+'">'+b[i].nama_produk+'</label>';
				a+='</div>';
				a+='</div>';
				a+='</div>';
			}
			document.getElementById('apaccheckboxlogireqemrdiag_grouptestirna').innerHTML=a;

		});
	}
	function RadULirna1() {
		var a='';
		var param = {kode : 'UR',};
		apiPOST('Lab/produkRad', param, hasil =>{
			var b=hasil['produk'];
			for (var i = 0; i < b.length; i++) {
				a+='<div class="col-md-6">';
				a+='<div class="form-group">';
				a+='<div class="custom-control custom-checkbox ">';
				a+='<input name="lacrequestrademrdiag_test" value="'+b[i].id_produk+'" type="checkbox"  id="alacrequestlabemrdiag_test_'+b[i].id_produk+'" >';
				a+='<label class="form-label" for="alacrequestlabemrdiag_test_'+b[i].id_produk+'" id="alacrequestlabemrdiag_labeltest_'+b[i].id_produk+'">'+b[i].nama_produk+'</label>';
				a+='</div>';
				a+='</div>';
				a+='</div>';
			}
			document.getElementById('apaccheckboxlogireqemrdiag_grouptestirna_2').innerHTML=a;

		});
	}
	function RadCTScanirna1() {
		var a='';
		var param = {kode : 'CT',};
		apiPOST('Lab/produkRad', param, hasil =>{
			var b=hasil['produk'];
			for (var i = 0; i < b.length; i++) {
				a+='<div class="col-md-6">';
				a+='<div class="form-group">';
				a+='<div class="custom-control custom-checkbox ">';
				a+='<input name="lacrequestrademrdiag_test" value="'+b[i].id_produk+'" type="checkbox"  id="alacrequestlabemrdiag_test_'+b[i].id_produk+'" >';
				a+='<label class="form-label" for="alacrequestlabemrdiag_test_'+b[i].id_produk+'" id="alacrequestlabemrdiag_labeltest_'+b[i].id_produk+'">'+b[i].nama_produk+'</label>';
				a+='</div>';
				a+='</div>';
				a+='</div>';
			}
			document.getElementById('apaccheckboxlogireqemrdiag_grouptestirna_3').innerHTML=a;

		});
	}
</script>