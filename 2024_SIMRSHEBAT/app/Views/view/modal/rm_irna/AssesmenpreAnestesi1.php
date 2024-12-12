<?php
$data 						= json_decode($_GET['data']);
$rm 							= str_replace('"','', json_encode($data->rm));
$unit     				= str_replace('"','', json_encode($data->unit));
$id_kunjungan     = str_replace('"','', json_encode($data->id_kunjungan));
$id_transaksi     = str_replace('"','', json_encode($data->id_transaksi));
?>

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
                            <div class="col-md-5">
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
                                <input type="date" id="dacriassesmenanes_datgl" class="form-control form-control-sm" value="<?php echo date('Y-m-d');?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="col-form-label">PPJA / BPJA</label>
                            </div>
                            <div class="col-md-7">
                                <select id="dacriassesmenanes_apjId" name="apjId" class="form-control form-control-sm" onchange="ttdDok()">
                                </select>
                            </div>
                            <div class="col-md-1">
                                <button id="dacriassesmenanes_btpjdef" class="btn btn-sm btn-primary d-none" type="button" title="Default PJ">
                                </button>
                            </div>
                        </div>
						<div class="form-group row">
							<div class="col-md-4">
                                <label class="col-form-label">Jenis Operasi</label>
                            </div>
                            <div class="col-md-7">
                                <textarea id="dacriassesmenanes_apjJnsOp" style="height: 75px; width: 100%;"></textarea>
                            </div>
							<div class="col-md-1"></div>
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
															<input name="dacriasesmenanes_sulan" value="2" type="radio" class="custom-control-input" id="dacriasesmenanes_sulan_2" onclick="document.getElementById('dacriasesmenanes_sulan_ext').style.display='block'"> <label class="custom-control-label" for="dacriasesmenanes_sulan_2">Ya</label>
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
															<input name="dacriasesmenanes_pu" value="2" type="radio" class="custom-control-input" id="dacriasesmenanes_pu_2" onclick="document.getElementById('dacriasesmenanes_pu_ext').style.display='inline-flex'"> <label class="custom-control-label" for="dacriasesmenanes_pu_2">Ya</label>
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
								<!-- <select name="akeadaan" id="dacriassesmenanes_akeadaan" class="form-control form-control-sm">
									<option value="1">Baik</option>
									<option value="2">Sedang</option>
									<option value="3">Berat</option>
								</select> -->
								<input type="text" id="dacriassesmenanes_akeadaan">
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
										<input type="number" onfocus="this.select();" class="form-control form-control-sm" id="dacriassesmenanes_ftensi1">
										<label class="col-form-label">/</label> 
										<input type="number" onfocus="this.select();" class="form-control" id="dacriassesmenanes_ftensi2"> 
										<span class="input-group-append"> <span class="input-group-text">mmHg</span>
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
							<td onclick="dacrjasesmenpreanes_setScore(4, 1)">
							   Spontan
							</td>
							<td>
							  4
							</td>
							<td rowspan="4">
							  <input type="text" name="eyeOpenAP" id="eyeOpenAP_preanes" class="form-control" value="4">
							</td>
						</tr>
						<tr >
							<td onclick="dacrjasesmenpreanes_setScore(3, 1)">
							   Terhadap Suara
							</td>
							<td>
							  3
							</td>
						</tr>
						<tr>
							<td onclick="dacrjasesmenpreanes_setScore(2, 1)">
							  Terhadap Nyeri
							</td>
							<td>
							  2
							</td>
						</tr>
						<tr>
							<td onclick="dacrjasesmenpreanes_setScore(1, 1)">
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
							<td onclick="dacrjasesmenpreanes_setScore(6, 2)">
							   Turut Perintah
							</td>
							<td>
							  6
							</td>
							<td rowspan="6">
							  <input type="text" name="ResponMotorikAP" id="responMotorikA_preanesP" class="form-control" value="6">
							</td>
						</tr>
						<tr>
							<td onclick="dacrjasesmenpreanes_setScore(5, 2)">
							   Melokalisir Nyeri
							</td>
							<td>
							  5
							</td>
						</tr>
						<tr>
							<td onclick="dacrjasesmenpreanes_setScore(4, 2)">
							   Fleksi Normal (Menarik anggota gerak yang dirangsang)
							</td>
							<td>
							  4
							</td>
						</tr>
						<tr>
							<td onclick="dacrjasesmenpreanes_setScore(3, 2)">
							   Fleksi Abnormal (dekortikasi)
							</td>
							<td>
							  3
							</td>
						</tr>
						<tr>
							<td onclick="dacrjasesmenpreanes_setScore(2, 2)">
							   Ekstensi Abnormal (deserebrasi)
							</td>
							<td>
							  2
							</td>
						</tr>
						<tr>
							<td onclick="dacrjasesmenpreanes_setScore(1, 2)">
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
							<td onclick="dacrjasesmenpreanes_setScore(5, 3)">
							   Berorientasi Baik
							</td>
							<td>
							  5
							</td>
							<td rowspan="5">
							  <input type="text" name="responVerbalAPA" id="responVerbalAPA" class="form-control" value="5">
							</td>
						</tr>
						<tr>
							<td onclick="dacrjasesmenpreanes_setScore(4, 3)">
								Berbicara mengacau (bingung)
							</td>
							<td>
							  4
							</td>
						</tr>
						<tr>
							<td onclick="dacrjasesmenpreanes_setScore(3, 3)">
							  Kata-Kata tidak teratur
							</td>
							<td>
							  3
							</td>
						</tr>
						<tr>
							<td onclick="dacrjasesmenpreanes_setScore(2, 3)">
							   Suara Tidak Jelas
							</td>
							<td>
							  2
							</td>
						</tr>
						<tr>
							<td onclick="dacrjasesmenpreanes_setScore(1, 3)">
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
								<input name="dacriasesmenanes_jt" value="1" type="radio" class="custom-control-input" id="dacriasesmenanes_jt_1" onclick="document.getElementById('dacriasesmenanes_jt_ext').style.display='none'"> <label class="custom-control-label" for="dacriasesmenanes_jt_1">Normal</label>
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
								<input name="dacriasesmenanes_pr" value="1" type="radio" class="custom-control-input" id="dacriasesmenanes_pr_1" onclick="document.getElementById('dacriasesmenanes_pr_ext').style.display='none'"> <label class="custom-control-label" for="dacriasesmenanes_pr_1">Normal</label>
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
							<textarea id="dacriasesmenanes_dk" style="height: 100px; width: 75%;"></textarea>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4"><label>Catatan</label></div>
						<div class="col-md-8">
							<textarea id="dacriasesmenanes_cat" style="height: 100px;width: 75%;"></textarea>
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
									<input type="checkbox" class="custom-control-input" id="dacriasesmenanes_asa_6"> <label class="custom-control-label" for="dacriasesmenanes_asa_6">Emergency</label>
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
				<div class="col-md-12">
					<div class="col-md-12 " align="center">
						<div class="col-md-6">
							<input type="date" id="tglttdppjassanak" class="form-control form-control-sm" value="<?php echo date('Y-m-d');?>">
						</div>							
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group row">
						<div class="col-md-12" align="center">
							<label class="col-form-label">Pasien
							</label>
						</div>
					</div>
					<div class="table-responsive" align="center">
						<div class="col-md-6" align="center">
							<img style="width:250px;height:250px;border: 2px dashed;background-color: #535b62d1;" id="GambarTtdPasien_Pre_Anastesi">
                			<input type="text" class="form-control form-control-sm text-center d-none" id="HasilTtdPasien_Pre_Anastesi" disabled>
							<br>
							<input type="text" class="form-control form-control-sm text-center" id="dacinfoassanak_zpjttd1">
							<label class="col-form-label">Nama &amp; Tanda tangan</label><br>
							<button onclick="ShowModalTtdPreAnes_pasien()" class="btn btn-warning btn-sm">Klik Tanda Tangan</button>
						</div>
						<div align="center" class="col-md-12">
							<button id="dacinfoassanak_btclearttd1" type="button" class="btn btn-sm btn-warning d-none"> Reset</button>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group row">
						<div class="col-md-12" align="center">
							<label class="col-form-label">Dokter
							</label>
						</div>
					</div>
					<div class="table-responsive" align="center">
						<div class="col-md-6" align="center">
							<img style="width:250px;height:250px;border: 2px dashed;background-color: #535b62d1;" id="GambarTtdDokter_Pre_Anastesi">
                			<input type="text" class="form-control form-control-sm text-center d-none" id="HasilTtdDokter_Pre_Anastesi" disabled>
							<br>
							<input type="text" class="form-control form-control-sm text-center" id="dacinfoassanak_zpjttd2">
							<label class="col-form-label">Nama &amp; Tanda tangan</label><br>
							<button onclick="ShowModalTtdPreAnes_dokter()" class="btn btn-warning btn-sm">Klik Tanda Tangan</button>
						</div>
						<div align="center" class="col-md-12">
							<button id="dacinfoassanak_btclearttd2" type="button" class="btn btn-sm btn-warning d-none"> Reset</button>
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

<div class="modal fade"  id="ModalTtdPasienPreAnastesi" role="dialog">
    <div class="modal-dialog" style="width: 408px;">
      <div class="modal-content">
          <div class="modal-body">
            <div id="paint_ttdpasienpreanesirna"></div>
          </div>
        <div class="modal-footer">
            <button class="btn btn-sm btn-primary" onclick="takeTtd_Pre_Anes_Pasien();">Simpan</button>
            <button class="btn btn-sm btn-outline-danger" onclick="$('#ModalTtdPasienPreAnastesi').modal('hide');">Batal</button>
        </div>
    </div>
  </div>
</div>

<div class="modal fade"  id="ModalTtdDokterPreAnastesi" role="dialog">
    <div class="modal-dialog" style="width: 408px;">
      <div class="modal-content">
          <div class="modal-body">
            <div id="paint_ttddokterpreanesirna"></div>
          </div>
        <div class="modal-footer">
            <button class="btn btn-sm btn-primary" onclick="takeTtd_Pre_Anes_Dokter();">Simpan</button>
            <button class="btn btn-sm btn-outline-danger" onclick="$('#ModalTtdDokterPreAnastesi').modal('hide');">Batal</button>
        </div>
    </div>
  </div>
</div>

<script type="text/javascript">

	var no_rm   		= "<?php echo $rm; ?>";
	var id_unit   		= "<?php echo $unit; ?>";
	var id_kunjungan   	= "<?php echo $id_kunjungan; ?>";
	var id_transaksi   	= "<?php echo $id_transaksi; ?>";
	var ttdpasienpreanesirna    = new WPaintX('paint_ttdpasienpreanesirna');
	var ttddokterpreanesirna    = new WPaintX('paint_ttddokterpreanesirna');
	
	$(document).ready(function() {
		document.getElementById('loading_asesmen_pre_anestesi').style.display = 'none';
		document.getElementById('dacriassesmenanes_id').value = no_rm;
		showttdpasienpreanesirna();
		pegawai();
		tanda_vital_preanes();
		isi_pre_anestesi();
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

	function ttdDok(){
		d = $('#dacriassesmenanes_apjId').text();
   		document.getElementById('dacinfoassanak_zpjttd2').value=d;
	}

	function showttdpasienpreanesirna(){
	  ttdpasienpreanesirna.show();
	}
	function showttddokterpreanesirna(){
	  ttddokterpreanesirna.show();
	}
	function ShowModalTtdPreAnes_pasien() {
	  showttdpasienpreanesirna();
	  $('#ModalTtdPasienPreAnastesi').modal('show');
	}
	function ShowModalTtdPreAnes_dokter() {
	  showttddokterpreanesirna();
	  $('#ModalTtdDokterPreAnastesi').modal('show');
	}
	function takeTtd_Pre_Anes_Pasien() {
	  document.getElementById('GambarTtdPasien_Pre_Anastesi').src = ttdpasienpreanesirna.getData();
	  document.getElementById('HasilTtdPasien_Pre_Anastesi').value = ttdpasienpreanesirna.getData();
	  $('#ModalTtdPasienPreAnastesi').modal('hide');
	}
	function takeTtd_Pre_Anes_Dokter() {
	  document.getElementById('GambarTtdDokter_Pre_Anastesi').src = ttddokterpreanesirna.getData();
	  document.getElementById('HasilTtdDokter_Pre_Anastesi').value = ttddokterpreanesirna.getData();
	  $('#ModalTtdDokterPreAnastesi').modal('hide');
	}
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
	
	function pegawai() {
	  apiPOST('Rawatjalan/pegawai', null,hasil=>{
		var a=hasil['data'];
		var pegawai='';
		for (var i = 0; i < a.length; i++) {
		  pegawai+='<option value="'+a[i]['id_pegawai']+'">'+a[i]['nama_pegawai']+'</option>';
		}
		document.getElementById('dacriassesmenanes_apjId').innerHTML=pegawai;
	  });
	}
	function tanda_vital_preanes(){
		param={id_kunjungan:id_kunjungan}
		apiPOST('Rekammedisirna/viewtandavital', param, hasil=>{
			if(hasil['data'].tekanan_darah1 !== null){
				$('#dacriassesmenanes_gtdId_2').prop('checked', true);
				document.getElementById('dacriassesmenanes_div_gtdId2').style.display='block';
				document.getElementById('dacriassesmenanes_ftensi2').value=hasil['data'].tekanan_darah2;
				document.getElementById('dacriassesmenanes_ftensi1').value=hasil['data'].tekanan_darah1;
			}else{
				document.getElementById('dacriassesmenanes_div_gtdId2').style.display='none';			
				document.getElementById('dacriassesmenanes_ftensi2').value='-';
				document.getElementById('dacriassesmenanes_ftensi1').value='-';
			}
			
			document.getElementById('dacriassesmenanes_akeadaan').value=hasil['data'].keadaan_umum;			
			document.getElementById('dacriassesmenanes_crespirasi').value=hasil['data'].respirasi;			
			document.getElementById('dacriassesmenanes_dnadi').value=hasil['data'].nadi;			
			document.getElementById('dacriassesmenanes_hspo2').value=hasil['data'].spo2;			
			// $('#dacriassesmenanes_ireflek1').val()=hasil['data'].reflek_cahaya_kiri;
			// $('#dacriassesmenanes_ireflek2').val()=hasil['data'].reflek_cahaya_kanan;
			document.getElementById('dacriassesmenanes_ireflek1').value=hasil['data'].reflek_cahaya_kiri;			
			document.getElementById('dacriassesmenanes_ireflek2').value=hasil['data'].reflek_cahaya_kanan;			
			document.getElementById('dacriassesmenanes_epupil1').value=hasil['data'].pupil_kiri;			
			document.getElementById('dacriassesmenanes_epupil2').value=hasil['data'].pupil_kanan;			
			document.getElementById('dacriassesmenanes_gsuhu').value=hasil['data'].suhu;			
			document.getElementById('dacriassesmenanes_jbb').value=hasil['data'].bb;
			document.getElementById('dacriassesmenanes_jtb').value=hasil['data'].tinggi_badan;
			document.getElementById('dacriassesmenanes_kimt').value=hasil['data'].tinggi_badan;
			document.getElementById('eyeOpenAP_preanes').value=hasil['data'].respon_e;
			document.getElementById('responMotorikA_preanesP').value=hasil['data'].respon_m;
			document.getElementById('responVerbalAPA').value=hasil['data'].respon_v;
			document.getElementById('dacriassesmenanes_bgcstotAP').value=hasil['data'].skor_kesadaran;			
		})
	}
	function isi_pre_anestesi(){
		apiPOST('Rekammedisirna/viewisipreanies', id_kunjungan, hasil=>{
			var hab=hasil['data'].habit.split(',');
			if(hasil['data'].r_operasi==1){
				$("#dacriasesmenanes_op_1").prop('checked', true);
				$("#dacriasesmenanes_op_2").prop('checked', false);
				document.getElementById('dacriasesmenanes_histop').style.display='none';				
			}else{
				$("#dacriasesmenanes_op_1").prop('checked', false);
				$("#dacriasesmenanes_op_2").prop('checked', true);
				document.getElementById('dacriasesmenanes_histop').style.display='block';
			}
			if(hasil['data'].r_anestesi==1){
				$("#dacriasesmenanes_an_1").prop('checked', true);
				$("#dacriasesmenanes_an_2").prop('checked', false);
				document.getElementById('dacriasesmenanes_histan').style.display='none';				
			}else{
				$("#dacriasesmenanes_an_1").prop('checked', false);
				$("#dacriasesmenanes_an_2").prop('checked', true);
				document.getElementById('dacriasesmenanes_histan').style.display='block';
			}
			if(hasil['data'].sulit==1){
				$("#dacriasesmenanes_sulan_1").prop('checked', true);
				$("#dacriasesmenanes_sulan_2").prop('checked', false);
				document.getElementById('dacriasesmenanes_sulan_ext').style.display='none';				
			}else{
				$("#dacriasesmenanes_sulan_1").prop('checked', false);
				$("#dacriasesmenanes_sulan_2").prop('checked', true);
				document.getElementById('dacriasesmenanes_sulan_ext').style.display='block';
			}
			if(hasil['data'].puasa==1){
				$("#dacriasesmenanes_pu_1").prop('checked', true);
				$("#dacriasesmenanes_pu_2").prop('checked', false);
				document.getElementById('dacriasesmenanes_pu_ext').style.display='none';				
			}else{
				$("#dacriasesmenanes_pu_1").prop('checked', false);
				$("#dacriasesmenanes_pu_2").prop('checked', true);
				document.getElementById('dacriasesmenanes_pu_ext').style.display='inline-flex';
			}
			if(hasil['data'].jantung==1){
				$("#dacriasesmenanes_jt_1").prop('checked', true);
				$("#dacriasesmenanes_jt_2").prop('checked', false);
				document.getElementById('dacriasesmenanes_jt_ext').style.display='none';				
			}else{
				$("#dacriasesmenanes_jt_1").prop('checked', false);
				$("#dacriasesmenanes_jt_2").prop('checked', true);
				document.getElementById('dacriasesmenanes_jt_ext').style.display='block';
			}
			if(hasil['data'].paru==1){
				$("#dacriasesmenanes_pr_1").prop('checked', true);
				$("#dacriasesmenanes_pr_2").prop('checked', false);
				document.getElementById('dacriasesmenanes_pr_ext').style.display='none';				
			}else{
				$("#dacriasesmenanes_pr_1").prop('checked', false);
				$("#dacriasesmenanes_pr_2").prop('checked', true);
				document.getElementById('dacriasesmenanes_pr_ext').style.display='block';
			}
			if(hasil['data'].asa_emergency==1){
				$("#dacriasesmenanes_asa_6").prop('checked', true);
			}else{
				$("#dacriasesmenanes_asa_6").prop('checked', false);
			}
			if(hasil['data'].renc_tind==6){
				$("#dacriasesmenanes_tind_6").prop('checked', true);
				document.getElementById('divdacriasesmenanes_tind_ext').style.display='block'
			}else{
				$("#dacriasesmenanes_tind_6").prop('checked', false);
				$("[name=dacriasesmenanes_tind]").val([hasil['data'].renc_tind]);
			}
			for(var i=0;i<hasil['data'].habit.length;i++){
				$("#dacriasesmenanes_habit_"+hab[i]).prop("checked", true);
				if($("#dacriasesmenanes_habit_2").is(":checked")){
					$("#dacriasesmenanes_habit_ext2").show();
				}else{
					$("#dacriasesmenanes_habit_ext2").hide();
				}
				if($("#dacriasesmenanes_habit_1").is(":checked")){
					$("#dacriasesmenanes_habit_ext1").show();
				}else{
					$("#dacriasesmenanes_habit_ext1").hide();
				}
			}
			$("[name=dacriasesmenanes_asa]").val([hasil['data'].asa]);
			$("[name=dacriasesmenanes_edu]").val([hasil['data'].edukasi]);
			
			document.getElementById('dacriassesmenanes_apjId').value=hasil['data'].dokter;
			document.getElementById('dacriassesmenanes_apjJnsOp').value=hasil['data'].jenis_operasi;
			document.getElementById('dacriasesmenanes_hist_1').value=hasil['data'].r_jns_operasi;
			document.getElementById('dacriasesmenanes_hist_2').value=hasil['data'].r_komplikasi_operasi;
			document.getElementById('dacriasesmenanes_histan_1').value=hasil['data'].r_jns_anestesi;
			document.getElementById('dacriasesmenanes_histan_2').value=hasil['data'].r_komplikasi_anestesi;
			// document.getElementById().value=hasil['data'].habit;
			document.getElementById('dacriasesmenanes_habit_ext1').value=hasil['data'].rokok;
			document.getElementById('dacriasesmenanes_habit_ext2').value=hasil['data'].alkohol;
			document.getElementById('dacriasesmenanes_sulan_ext').value=hasil['data'].sulit_ext;
			document.getElementById('dacriasesmenanes_pu_ext_1').value=hasil['data'].puasa_lama;
			document.getElementById('dacriasesmenanes_pu_ext_2').value=hasil['data'].puasa_makan;
			document.getElementById('dacriasesmenanes_pu_ext_3').value=hasil['data'].puasa_minum;
			document.getElementById('dacriasesmenanes_jt_ext').value=hasil['data'].jantung_ext;
			document.getElementById('dacriasesmenanes_pr_ext').value=hasil['data'].paru_ext;
			document.getElementById('dacriasesmenanes_ekg').value=hasil['data'].ekg;
			document.getElementById('dacriasesmenanes_ext').value=hasil['data'].lain;
			document.getElementById('dacriasesmenanes_dk').value=hasil['data'].diagnosa;
			document.getElementById('dacriasesmenanes_cat').value=hasil['data'].catatan;
			document.getElementById('dacriasesmenanes_tind_ext').value=hasil['data'].renc_lain;
			document.getElementById('dacriassesmenanes_klingkarkepala').value=hasil['data'].lingkar_kepala;
			document.getElementById('dacriassesmenanes_klingkarlengan').value=hasil['data'].lingkar_lengan;
			document.getElementById('dacriassesmenanes_klingkarperut').value=hasil['data'].lingkar_perut;
		})
	}

	function dacrjasesmenpreanes_setScore(a,b) {
		var data=a;
		var nilai=b;
		if (nilai==1) {
			switch (a){
			case 1:
				document.getElementById('eyeOpenAP_preanes').value=1;
				hitunggcspreanes();
				break;
			case 2:
				document.getElementById('eyeOpenAP_preanes').value=2;
				hitunggcspreanes();
				break;
			case 3:
				document.getElementById('eyeOpenAP_preanes').value=3;
				hitunggcspreanes();
				break;
			case 4:
				document.getElementById('eyeOpenAP_preanes').value=4;
				hitunggcspreanes();
				break;
			}		
		}else if(nilai==2){
			switch (a){
			case 1:
				document.getElementById('responMotorikA_preanesP').value=1;
				hitunggcspreanes();
				break;
			case 2:
				document.getElementById('responMotorikA_preanesP').value=2;
				hitunggcspreanes();
				break;
			case 3:
				document.getElementById('responMotorikA_preanesP').value=3;
				hitunggcspreanes();
				break;
			case 4:
				document.getElementById('responMotorikA_preanesP').value=4;
				hitunggcspreanes();
				break;
			case 5:
				document.getElementById('responMotorikA_preanesP').value=5;
				hitunggcspreanes();
				break;
			case 6:
				document.getElementById('responMotorikA_preanesP').value=6;
				hitunggcspreanes();
				break;

			}
		}else{
			switch (a){
			case 1:
				document.getElementById('responVerbalAPA').value=1;
				hitunggcspreanes();
				break;
			case 2:
				document.getElementById('responVerbalAPA').value=2;
				hitunggcspreanes();
				break;
			case 3:
				document.getElementById('responVerbalAPA').value=3;
				hitunggcspreanes();
				break;
			case 4:
				document.getElementById('responVerbalAPA').value=4;
				hitunggcspreanes();
				break;
			case 5:
				document.getElementById('responVerbalAPA').value=5;
				hitunggcspreanes();
				break;

			}
		}
	}
	function hitunggcspreanes() {
		var a=document.getElementById('eyeOpenAP_preanes').value;
		var b=document.getElementById('responMotorikA_preanesP').value;
		var c=document.getElementById('responVerbalAPA').value;
		d=parseInt(a)+parseInt(b)+parseInt(c);
		document.getElementById('dacriassesmenanes_bgcstotAP').value=d;
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
	
	function saveassesmenAnesRI(){
		if($('#dacriasesmenanes_asa_6').is(':checked')){
			asa_em='1';
		}else{
			asa_em='0';
		}
		
		var param={
			id_kunjungan :$('#dacriassesmenanes_id').val(),
			id_transaksi :id_transaksi,
			tgl:$('#dacriassesmenanes_datgl').val(),
			PPJA:$('#dacriassesmenanes_apjId').val(),
			jns_op:$('#dacriassesmenanes_apjJnsOp').val(),
			operasi:document.querySelector('input[name=dacriasesmenanes_op]:checked').value,
			operasi_jns:$('#dacriasesmenanes_hist_1').val(),
			operasi_komp:$('#dacriasesmenanes_hist_2').val(),
			anestesi:document.querySelector('input[name=dacriasesmenanes_an]:checked').value,
			anestesi_jns:$('#dacriasesmenanes_histan_1').val(),
			anestesi_komp:$('#dacriasesmenanes_histan_2').val(),
			habit:Array.from(document.querySelectorAll('input[name=dacriasesmenanes_habit]:checked')).map(c=>c.value).join(),
			rokok:$('#dacriasesmenanes_habit_ext1').val(),
			alkohol:$('#dacriasesmenanes_habit_ext2').val(),
			sulit:document.querySelector('input[name=dacriasesmenanes_sulan]:checked').value,
			sulit_anes:$('#dacriasesmenanes_sulan_ext').val(),
			puasa:document.querySelector('input[name=dacriasesmenanes_pu]:checked').value,
			lama:$('#dacriasesmenanes_pu_ext_1').val(),
			makan:$('#dacriasesmenanes_pu_ext_2').val(),
			minum:$('#dacriasesmenanes_pu_ext_3').val(),
			ekg:$('#dacriasesmenanes_ekg').val(),
			lain:$('#dacriasesmenanes_ext').val(),
			jantung:document.querySelector('input[name=dacriasesmenanes_jt]:checked').value,
			jantung_ext:$('#dacriasesmenanes_jt_ext').val(),
			paru:document.querySelector('input[name=dacriasesmenanes_pr]:checked').value,
			paru_ext:$('#dacriasesmenanes_pr_ext').val(),
			diagnos:$('#dacriasesmenanes_dk').val(),
			catatan:$('#dacriasesmenanes_cat').val(),
			asa:document.querySelector('input[name=dacriasesmenanes_asa]:checked').value,
			asa_e:asa_em,
			tind:document.querySelector('input[name=dacriasesmenanes_tind]:checked').value,
			tind_ext:$('#dacriasesmenanes_tind_ext').val(),
			edukasi:document.querySelector('input[name=dacriasesmenanes_edu]:checked').value,
			ttd_pasien:$('#HasilTtdPasien_Pre_Anastesi').val(),
			ttd_dokter:$('#HasilTtdDokter_Pre_Anastesi').val(),
			lingkarkepala:$('#dacriassesmenanes_klingkarkepala').val(),
			lingkarlengan:$('#dacriassesmenanes_klingkarlengan').val(),
			lingkarperut:$('#dacriassesmenanes_klingkarperut').val()
		}
		
		var param_tandavital={
			id_kunjungan :$('#dacriassesmenanes_id').val(),
			keadaan_umum:$('#dacriassesmenanes_akeadaan').val(),
			respirasi:$('#dacriassesmenanes_crespirasi').val(),
			nadi:$('#dacriassesmenanes_dnadi').val(),
			spo2:$('#dacriassesmenanes_hspo2').val(),
			reflek_cahaya_kiri:$('#dacriassesmenanes_ireflek1').val(),
			reflek_cahaya_kanan:$('#dacriassesmenanes_ireflek2').val(),
			pupil_kiri:$('#dacriassesmenanes_epupil1').val(),
			pupil_kanan:$('#dacriassesmenanes_epupil2').val(),
			tensi0:document.querySelector('input[name=dacriassesmenanes_gtdId]:checked').value,
			tekanan_darah1:$('#dacriassesmenanes_ftensi1').val(),
			tekanan_darah2:$('#dacriassesmenanes_ftensi2').val(),
			palpasi:$('#dacriassesmenanes_fpalpasi').val(),
			suhu:$('#dacriassesmenanes_gsuhu').val(),			
			bb:$('#dacriassesmenanes_jbb').val(),
			tinggi_badan:$('#dacriassesmenanes_jtb').val(),
			imt:$('#dacriassesmenanes_kimt').val(),		
			tipe_kesadaran:$('#dacriassesmenanes_bgcstypeAP').val(),
			skor_kesadaran:$('#dacriassesmenanes_bgcstotAP').val()				
		}
		
		apiPOST('Rekammedisirna/savepreanes', param, hasil=>{
			
		})
		apiPOST('Rekammedisirna/saveVitalPasien', param_tandavital, hasil=>{
			
		})
	}
</script>