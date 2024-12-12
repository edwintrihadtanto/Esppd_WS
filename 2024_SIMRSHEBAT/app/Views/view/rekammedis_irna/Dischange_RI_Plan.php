<?php
$nowday     = date('Y-m-d');
?>
<div class="col-md-12">
  <div id="cariPas" class="card-body p-2 darkgrey-custom">
	<div class="row row-custom" >
		<div class="col-sm-auto">
			<div class="form-group">
				<label>Cari No. RM :</label>
				<input type="search" class="form-control form-control-xs" placeholder="Entry RM..." id="norm_pas" onkeypress="cariPasPlgbyrm(event)" autocomplete="off" >
			</div>
		</div>
		<div class="col-sm-auto">
			<div class="form-group">
				<label> Nama Pasien:</label>
				<input type="text" class="form-control form-control-xs" placeholder="Nama Pasien..." id="nama_pas" onkeypress="cariPasPlgbynama(event)" autocomplete="off">
			</div>
		</div>				
		<!-- <div class="col-sm-auto">
			<div class="form-group">
			<button class="btn btn-dark" style="margin-top: 10px;" onclick="searchPasPlg()">Cari</button>
			</div>
		</div>	 -->			
	</div>	
  </div>
  <div class="card-body p-2" id="tablePasPlg">
	<div class="card">
		<div class="card-header p-0">
			<div class="col-md-12 p-0" id="ermirna_listpas_operasi">
				<div class="card-body p-1" style="max-height: 420px; overflow: auto;">
					<div class="row" id="listpasermirna_plg"></div>
				</div>
			</div>
		</div>
	</div>
	  <!-- <div class="row row-custom" >
		  <div class="col-md-12">
		  <table
		  id="tablePasienRawIna"
		  class="table table-striped table-sm choose"		
		  data-show-jump-to="true">
		  <thead>
		  <tr>
		  <th data-field="no">No</th>
		  <th data-field="no_rm">No. RM</th>
		  <th data-field="nama">Nama</th>
		  <th data-field="alamat">Alamat</th>
		  <th data-field="tgl_transaksi">Tanggal Masuk</th>
		  <th data-field="nama_pegawai">Dokter</th>
		  </tr>
		  </thead>
		  </table>
		  </div>		
	  </div> -->
  </div>
  <div class="card" id="bodyPulangPasien">	
	<div class="card-body"><!-- JUDUL -->
		<div class="row ">
			<div class="col-md-11">
				<div class="row d-flex justify-content-center">
					<h4><b><label class="col-form-label">RENCANA PEMULANGAN PASIEN </label>
						<label class="col-form-label font-italic">(DISCHARGE PLANNING)</label></b></h4>
				</div>
			</div>
			<div class="col-sm-1" >
				<button class="btn btn-danger" type="button" onclick="closedetPasPlg()">
					<i class="fas fa-times"></i>
				</button>
			</div>
		</div>
	</div>
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
						<div class="col-md-4">
							<input id="dacriplanning_id" name="id" type="text" class="form-control" readonly="readonly">
							<!-- <input hidden="true" class="form-control" id="dacriplanning_b3list">
								<input hidden="true" class="form-control" id="dacriplanning_b6ketlist">
								<input hidden="true" class="form-control" id="dacriplanning_b7ketlist">
								<input hidden="true" class="form-control" id="dacriplanning_b8ketlist">
								<input hidden="true" class="form-control" id="dacriplanning_b9ketlist">
								<input hidden="true" class="form-control" id="dacriplanning_b11ketlist">
								<input hidden="true" class="form-control" id="dacriplanning_b12ketlist">
							<input hidden="true" class="form-control" id="dacriplanning_cdokumenlist"> -->
						</div>
						<div class="col-md-3"></div>
					</div>
					<div class="form-group row">
						<div class="col-md-3  text-truncate">
							<label class="col-form-label">Masuk RS (Tanggal)</label>
						</div>
						<div class="col-md-4">
							<div class="input-group date" id="dacriplanning_datgl" data-target-input="nearest">
							  <input id="dacriplanning_atgl" name="atgl" type="date" class="form-control datetimepicker-input" data-target="#dacriplanning_datgl" data-toggle="datetimepicker">
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-3  text-truncate">
							<label class="col-form-label">Alasan Masuk RS</label>
						</div>
						<div class="col-md-7">
							<textarea rows="2" name="dacriplanning_aalasan" id="dacriplanning_aalasan" style="width: 100%;" class="form-control"></textarea>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-3  text-truncate">
							<label class="col-form-label">Diagnosa Klinis</label>
						</div>
						<div class="col-md-7">
							<textarea rows="2" name="dacriplanning_adiagnosa" id="dacriplanning_adiagnosa" style="width: 100%;" class="form-control"></textarea>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group row">
						<div class="col-md-3">
							<label class="col-form-label">Pihak Keluarga / Pasien</label>
						</div>
						<div class="col-md-6">
							<input id="dacriplanning_apx" name="apx" type="text" class="form-control" maxlength="100" onkeyup="">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-3">
							<label class="col-form-label">PPJA / BPJA</label>
						</div>
						<div class="col-md-6">
							<select id="dacriplanning_apjId" name="apjId" class="form-control" tabindex="-1" aria-hidden="true">
								<option value="1">UMUM</option>
							</select>
						</div>
						<div class="col-md-1">

						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-3  text-truncate">
							<label class="col-form-label">Rencana Pulang (Tanggal)</label>
						</div>
						<div class="col-md-4">
							<div class="input-group date" id="dacriplanning_datglpulang" >
							  <input id="dacriplanning_atglpulang" name="atglpulang" type="date" class="form-control form-control">
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-3  text-truncate">
							<label class="col-form-label">Pendamping Saat Pulang</label>
						</div>
						<div class="col-md-6">
							<input type="text" name="dacriplanning_apendamping" id="dacriplanning_apendamping" class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-3  text-truncate">
							<label class="col-form-label">Hubungan dengan Pasien</label>
						</div>
						<div class="col-md-6">
							<input type="text" name="dacriplanning_ahubungan" id="dacriplanning_ahubungan" class="form-control">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="card"><!-- FORM PASCA INAP -->
		<div class="card-header" style="background-color:black;">
			<h3 class="card-title" style="color:white;">FORM PASCA INAP</h3>
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
							<label class="col-form-label font-weight-bold">1. Pengaruh rawat inap terhadap </label>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-3"> &nbsp;&nbsp;&nbsp;&nbsp;Pasien dan keluarga pasien</div>
						<div class="col-md-0">       </div>
						<div class="col-md-8">
							<div class="row" id="dacriplanning_b1aId">
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b1aId" value="Tidak" type="radio" class="custom-control-input" id="dacriplanning_b1aId_1">
											<label class="custom-control-label" for="dacriplanning_b1aId_1">Tidak</label>
										</div>
										
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b1aId" value="2" type="radio" class="custom-control-input" id="dacriplanning_b1aId_2">
											<label class="custom-control-label" for="dacriplanning_b1aId_2">Ya</label>
										</div>
										<div class="row" id="dacriplanning_div_b1aId2" style="display: none;">
											<div class="col-md-1"></div>
											<div class="col-md-10">
												<textarea rows="2" name="dacriplanning_b1aIdket" id="dacriplanning_b1aIdket" style="width: 100%;" class="form-control"></textarea>
											</div>*
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-3"> &nbsp;&nbsp;&nbsp;&nbsp;Pekerjaan / sekolah</div>
						<div class="col-md-0">       </div>
						<div class="col-md-8">
							<div class="row" id="dacriplanning_b1bId">
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b1bId" value="Tidak" type="radio" class="custom-control-input" id="dacriplanning_b1bId_1">
											<label class="custom-control-label" for="dacriplanning_b1bId_1">Tidak</label>
										</div>										
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b1bId" value="2" type="radio" class="custom-control-input" id="dacriplanning_b1bId_2">
											<label class="custom-control-label" for="dacriplanning_b1bId_2">Ya</label>
										</div>
										<div class="row" id="dacriplanning_div_b1bId2" style="display: none;">
											<div class="col-md-1"></div>
											<div class="col-md-10">
												<textarea rows="2" name="dacriplanning_b1bIdket" id="dacriplanning_b1bIdket" style="width: 100%;" class="form-control"></textarea>
											</div>*
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-3"> &nbsp;&nbsp;&nbsp;&nbsp;Keuangan</div>
						<div class="col-md-0">       </div>
						<div class="col-md-8">
							<div class="row" id="dacriplanning_b1cId">
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b1cId" value="Tidak" type="radio" class="custom-control-input" id="dacriplanning_b1cId_1">
											<label class="custom-control-label" for="dacriplanning_b1cId_1">Tidak</label>
										</div>
										
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b1cId" value="2" type="radio" class="custom-control-input" id="dacriplanning_b1cId_2">
											<label class="custom-control-label" for="dacriplanning_b1cId_2">Ya</label>
										</div>
										<div class="row" id="dacriplanning_div_b1cId2" style="display: none;">
											<div class="col-md-1"></div>
											<div class="col-md-10">
												<textarea rows="2" name="dacriplanning_b1cIdket" id="dacriplanning_b1cIdket" style="width: 100%;" class="form-control"></textarea>
											</div>*
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-12">
							<label class="col-form-label font-weight-bold">2. Antisipasi terhadap masalah saat pulang</label>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
						<div class="col-md-8">
							<div class="row" id="dacriplanning_b2Id">
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b2Id" value="Tidak" type="radio" class="custom-control-input" id="dacriplanning_b2Id_1">
											<label class="custom-control-label" for="dacriplanning_b2Id_1">Tidak</label>
										</div>										
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b2Id" value="2" type="radio" class="custom-control-input" id="dacriplanning_b2Id_2">
											<label class="custom-control-label" for="dacriplanning_b2Id_2">Ya</label>
										</div>
										<div class="row" id="dacriplanning_div_b2Id2" style="display: none;">
											<div class="col-md-1"></div>
											<div class="col-md-10">
												<textarea rows="2" name="dacriplanning_b2Idket" id="dacriplanning_b2Idket" style="width: 100%;" class="form-control"></textarea>
											</div>*
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-12">
							<label class="col-form-label font-weight-bold">3. Bantuan diperlukan dalam hal</label>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
						<div class="col-md-10">
							<div class="row" id="dacriplanning_b3Id">
								<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b3Id" value="Menyiapkan Makanan" type="checkbox" class="custom-control-input" id="dacriplanning_b3Id_1"> 
											<label class="custom-control-label" for="dacriplanning_b3Id_1">Menyiapkan Makanan</label>
										</div>										
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b3Id" value="Mandi" type="checkbox" class="custom-control-input" id="dacriplanning_b3Id_2"> 
											<label class="custom-control-label" for="dacriplanning_b3Id_2">Mandi</label>
										</div>										
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b3Id" value="Makan" type="checkbox" class="custom-control-input" id="dacriplanning_b3Id_3"> 
											<label class="custom-control-label" for="dacriplanning_b3Id_3">Makan</label>
										</div>										
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b3Id" value="Berpakaian" type="checkbox" class="custom-control-input" id="dacriplanning_b3Id_4"> 
											<label class="custom-control-label" for="dacriplanning_b3Id_4">Berpakaian</label>
										</div>										
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b3Id" value="Diet" type="checkbox" class="custom-control-input" id="dacriplanning_b3Id_5"> 
											<label class="custom-control-label" for="dacriplanning_b3Id_5">Diet</label>
										</div>										
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b3Id" value="Transportasi" type="checkbox" class="custom-control-input" id="dacriplanning_b3Id_6"> 
											<label class="custom-control-label" for="dacriplanning_b3Id_6">Transportasi</label>
										</div>										
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b3Id" value="Menyiapkan Obat" type="checkbox" class="custom-control-input" id="dacriplanning_b3Id_7"> 
											<label class="custom-control-label" for="dacriplanning_b3Id_7">Menyiapkan Obat</label>
										</div>										
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b3Id" value="Edukasi Kesehatan" type="checkbox" class="custom-control-input" id="dacriplanning_b3Id_8"> 
											<label class="custom-control-label" for="dacriplanning_b3Id_8">Edukasi Kesehatan</label>
										</div>										
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b3Id" value="Minum Obat" type="checkbox" class="custom-control-input" id="dacriplanning_b3Id_9"> 
											<label class="custom-control-label" for="dacriplanning_b3Id_9">Minum Obat</label>
										</div>										
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b3Id" value="10" type="checkbox" class="custom-control-input" id="dacriplanning_b3Id_10"> 
											<label class="custom-control-label" for="dacriplanning_b3Id_10">Lain-lain</label>
										</div>
										<div class="row" id="dacriplanning_div_b3Id10" style="display: none;">
											<div class="col-md-1"></div>
											<div class="col-md-10">
												<textarea rows="2" name="dacriplanning_b3Idket10" id="dacriplanning_b3Idket10" style="width: 100%;" class="form-control"></textarea>
											</div>*
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-12">
							<label class="col-form-label font-weight-bold">4. Adakah yg membantu keperluan di atas</label>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
						<div class="col-md-8">
							<div class="row" id="dacriplanning_b4Id">
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b4Id" value="Tidak" type="radio" class="custom-control-input" id="dacriplanning_b4Id_1">
											<label class="custom-control-label" for="dacriplanning_b4Id_1">Tidak</label>
										</div>										
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b4Id" value="2" type="radio" class="custom-control-input" id="dacriplanning_b4Id_2">
											<label class="custom-control-label" for="dacriplanning_b4Id_2">Ya</label>
										</div>
										<div class="row" id="dacriplanning_div_b4Id2" style="display: none;">
											<div class="col-md-1"></div>
											<div class="col-md-10">
												<textarea rows="2" name="dacriplanning_b4Idket" id="dacriplanning_b4Idket" style="width: 100%;" class="form-control"></textarea>
											</div>*
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-12">
							<label class="col-form-label font-weight-bold">5. Apakah pasien tinggal sendiri setelah keluar dari rumah sakit ?</label>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
						<div class="col-md-8">
							<div class="row" id="dacriplanning_b5Id">
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b5Id" value="Tidak" type="radio" class="custom-control-input" id="dacriplanning_b5Id_1">
											<label class="custom-control-label" for="dacriplanning_b5Id_1">Tidak</label>
										</div>										
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b5Id" value="2" type="radio" class="custom-control-input" id="dacriplanning_b5Id_2">
											<label class="custom-control-label" for="dacriplanning_b5Id_2">Ya</label>
										</div>
										<div class="row" id="dacriplanning_div_b5Id2" style="display: none;">
											<div class="col-md-1"></div>
											<div class="col-md-10">
												<textarea rows="2" name="dacriplanning_b5Idket" id="dacriplanning_b5Idket" style="width: 100%;" class="form-control"></textarea>
											</div>*
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-12">
							<label class="col-form-label font-weight-bold">6. Apakah pasien menggunakan peralatan medis di rumah setelah keluar rumah sakit ?</label>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
						<div class="col-md-8">
							<div class="row" id="dacriplanning_b6Id">
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b6Id" value="Tidak" type="radio" class="custom-control-input" id="dacriplanning_b6Id_1">
											<label class="custom-control-label" for="dacriplanning_b6Id_1">Tidak</label>
										</div>
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b6Id" value="2" type="radio" class="custom-control-input" id="dacriplanning_b6Id_2">
											<label class="custom-control-label" for="dacriplanning_b6Id_2">Ya</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row" id="dacriplanning_div_b6Id2" style="display: none;">
						<div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
						<div class="col-md-10">
							<div class="row" id="dacriplanning_b6ket">
								<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b6ket" value="Cateter" type="checkbox" class="custom-control-input" id="dacriplanning_b6ket_1"> 
											<label class="custom-control-label" for="dacriplanning_b6ket_1">Cateter</label>
										</div>
										
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b6ket" value="NGT" type="checkbox" class="custom-control-input" id="dacriplanning_b6ket_2"> 
											<label class="custom-control-label" for="dacriplanning_b6ket_2">NGT</label>
										</div>										
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b6ket" value="Double Lumen" type="checkbox" class="custom-control-input" id="dacriplanning_b6ket_3"> 
											<label class="custom-control-label" for="dacriplanning_b6ket_3">Double Lumen</label>
										</div>										
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b6ket" value="Oksigen" type="checkbox" class="custom-control-input" id="dacriplanning_b6ket_4"> 
											<label class="custom-control-label" for="dacriplanning_b6ket_4">Oksigen</label>
										</div>										
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b6ket" value="5" type="checkbox" class="custom-control-input" id="dacriplanning_b6ket_5"> 
											<label class="custom-control-label" for="dacriplanning_b6ket_5">Lain-lain</label>
										</div>
										<div class="row" id="dacriplanning_div_b6ket5" style="display: none;">
											<div class="col-md-1"></div>
											<div class="col-md-10">
												<textarea rows="2" name="dacriplanning_b6ketket5" id="dacriplanning_b6ketket5" style="width: 100%;" class="form-control"></textarea>
											</div>*
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
							<label class="col-form-label font-weight-bold">7. Apakah pasien memerlukan alat bantu setelah keluar dari rumah sakit ?</label>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
						<div class="col-md-8">
							<div class="row" id="dacriplanning_b7Id">
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b7Id" value="Tidak" type="radio" class="custom-control-input" id="dacriplanning_b7Id_1">
											<label class="custom-control-label" for="dacriplanning_b7Id_1">Tidak</label>
										</div>
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b7Id" value="2" type="radio" class="custom-control-input" id="dacriplanning_b7Id_2">
											<label class="custom-control-label" for="dacriplanning_b7Id_2">Ya</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row" id="dacriplanning_div_b7Id2" style="display: none;">
						<div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
						<div class="col-md-10">
							<div class="row" id="dacriplanning_b7ket">
								<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b7ket" value="Tongkat" type="radio" class="custom-control-input" id="dacriplanning_b7ket_1"> 
											<label class="custom-control-label" for="dacriplanning_b7ket_1">Tongkat</label>
										</div>										
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b7ket" value="Kursi Roda" type="radio" class="custom-control-input" id="dacriplanning_b7ket_2"> 
											<label class="custom-control-label" for="dacriplanning_b7ket_2">Kursi Roda</label>
										</div>										
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b7ket" value="Walker" type="radio" class="custom-control-input" id="dacriplanning_b7ket_3"> 
											<label class="custom-control-label" for="dacriplanning_b7ket_3">Walker</label>
										</div>										
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b7ket" value="4" type="radio" class="custom-control-input" id="dacriplanning_b7ket_4"> 
											<label class="custom-control-label" for="dacriplanning_b7ket_4">Lain-lain</label>
										</div>
										<div class="row" id="dacriplanning_div_b7ket4" style="display: none;">
											<div class="col-md-1"></div>
											<div class="col-md-10">
												<textarea rows="2" name="dacriplanning_b7ketket4" id="dacriplanning_b7ketket4" style="width: 100%;" class="form-control"></textarea>
											</div>*
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-12">
							<label class="col-form-label font-weight-bold">8. Jelaskan Apakah memerlukan bantuan / perawatan khusus di rumah setelah keluar dari rumah sakit ?</label>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
						<div class="col-md-8">
							<div class="row" id="dacriplanning_b8Id">
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b8Id" value="Tidak" type="radio" class="custom-control-input" id="dacriplanning_b8Id_1">
											<label class="custom-control-label" for="dacriplanning_b8Id_1">Tidak</label>
										</div>
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b8Id" value="2" type="radio" class="custom-control-input" id="dacriplanning_b8Id_2">
											<label class="custom-control-label" for="dacriplanning_b8Id_2">Ya</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row" id="dacriplanning_div_b8Id2" style="display: none;">
						<div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
						<div class="col-md-10">
							<div class="row" id="dacriplanning_b8ket">
								<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b8ket" value="Home Care" type="radio" class="custom-control-input" id="dacriplanning_b8ket_1"> 
											<label class="custom-control-label" for="dacriplanning_b8ket_1">Home Care</label>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b8ket" value="Home Visit" type="radio" class="custom-control-input" id="dacriplanning_b8ket_2"> 
											<label class="custom-control-label" for="dacriplanning_b8ket_2">Home Visit</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-12">
							<label class="col-form-label font-weight-bold">9. Apakah pasien bermasalah dalam memenuhi kebutuhan pribadinya setelah keluar dari rumah sakit ?</label>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
						<div class="col-md-8">
							<div class="row" id="dacriplanning_b9Id">
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b9Id" value="Tidak" type="radio" class="custom-control-input" id="dacriplanning_b9Id_1">
											<label class="custom-control-label" for="dacriplanning_b9Id_1">Tidak</label>
										</div>
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b9Id" value="2" type="radio" class="custom-control-input" id="dacriplanning_b9Id_2">
											<label class="custom-control-label" for="dacriplanning_b9Id_2">Ya</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row" id="dacriplanning_div_b9Id2" style="display: none;">
						<div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
						<div class="col-md-10">
							<div class="row" id="dacriplanning_b9ket">
								<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b9ket" value="Makan" type="checkbox" class="custom-control-input" id="dacriplanning_b9ket_1"> 
											<label class="custom-control-label" for="dacriplanning_b9ket_1">Makan</label>
										</div>										
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b9ket" value="Minum" type="checkbox" class="custom-control-input" id="dacriplanning_b9ket_2"> 
											<label class="custom-control-label" for="dacriplanning_b9ket_2">Minum</label>
										</div>										
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b9ket" value="BAB / BAK" type="checkbox" class="custom-control-input" id="dacriplanning_b9ket_3"> 
											<label class="custom-control-label" for="dacriplanning_b9ket_3">BAB / BAK</label>
										</div>										
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b9ket" value="4" type="checkbox" class="custom-control-input" id="dacriplanning_b9ket_4"> 
											<label class="custom-control-label" for="dacriplanning_b9ket_4">Lain-lain</label>
										</div>
										<div class="row" id="dacriplanning_div_b9ket4" style="display: none;">
											<div class="col-md-1"></div>
											<div class="col-md-10">
												<textarea rows="2" name="dacriplanning_b9ketket4" id="dacriplanning_b9ketket4" style="width: 100%;" class="form-control"></textarea>
											</div>*
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-12">
							<label class="col-form-label font-weight-bold">10. Apakah pasien memiliki nyeri kronis dan kelelahan setelah keluar dari rumah sakit ?</label>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
						<div class="col-md-8">
							<div class="row" id="dacriplanning_b10Id">
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b10Id" value="Tidak" type="radio" class="custom-control-input" id="dacriplanning_b10Id_1">
											<label class="custom-control-label" for="dacriplanning_b10Id_1">Tidak</label>
										</div>										
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b10Id" value="2" type="radio" class="custom-control-input" id="dacriplanning_b10Id_2">
											<label class="custom-control-label" for="dacriplanning_b10Id_2">Ya</label>
										</div>
										<div class="row" id="dacriplanning_div_b10Id2" style="display: none;">
											<div class="col-md-1"></div>
											<div class="col-md-10">
												<textarea rows="2" name="dacriplanning_b10Idket" id="dacriplanning_b10Idket" style="width: 100%;" class="form-control"></textarea>
											</div>*
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-12">
							<label class="col-form-label font-weight-bold">11. Apakah pasien dan keluarga memerlukan edukasi kesehatan setelah keluar dari rumah sakit ?</label>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
						<div class="col-md-8">
							<div class="row" id="dacriplanning_b11Id">
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b11Id" value="Tidak" type="radio" class="custom-control-input" id="dacriplanning_b11Id_1">
											<label class="custom-control-label" for="dacriplanning_b11Id_1">Tidak</label>
										</div>
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b11Id" value="2" type="radio" class="custom-control-input" id="dacriplanning_b11Id_2">
											<label class="custom-control-label" for="dacriplanning_b11Id_2">Ya</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row" id="dacriplanning_div_b11Id2" style="display: none;">
						<div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
						<div class="col-md-10">
							<div class="row" id="dacriplanning_b11ket">
								<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b11ket" value="Obat" type="checkbox" class="custom-control-input" id="dacriplanning_b11ket_1"> 
											<label class="custom-control-label" for="dacriplanning_b11ket_1">Obat - Obatan</label>
										</div>										
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b11ket" value="Efek Samping Obat" type="checkbox" class="custom-control-input" id="dacriplanning_b11ket_2"> 
											<label class="custom-control-label" for="dacriplanning_b11ket_2">Efek Samping Obat</label>
										</div>										
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b11ket" value="Nyeri" type="checkbox" class="custom-control-input" id="dacriplanning_b11ket_3"> 
											<label class="custom-control-label" for="dacriplanning_b11ket_3">Nyeri</label>
										</div>										
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b11ket" value="DIIT" type="checkbox" class="custom-control-input" id="dacriplanning_b11ket_4"> 
											<label class="custom-control-label" for="dacriplanning_b11ket_4">DIIT</label>
										</div>										
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b11ket" value="Mencari Pertolongan" type="checkbox" class="custom-control-input" id="dacriplanning_b11ket_5"> 
											<label class="custom-control-label" for="dacriplanning_b11ket_5">Mencari Pertolongan</label>
										</div>										
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b11ket" value="Follow Up" type="checkbox" class="custom-control-input" id="dacriplanning_b11ket_6"> 
											<label class="custom-control-label" for="dacriplanning_b11ket_6">Follow Up</label>
										</div>										
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b11ket" value="7" type="checkbox" class="custom-control-input" id="dacriplanning_b11ket_7"> 
											<label class="custom-control-label" for="dacriplanning_b11ket_7">Lain-lain</label>
										</div>
										<div class="row" id="dacriplanning_div_b11ket7" style="display: none;">
											<div class="col-md-1"></div>
											<div class="col-md-10">
												<textarea rows="2" name="dacriplanning_b11ketket7" id="dacriplanning_b11ketket7" style="width: 100%;" class="form-control"></textarea>
											</div>*
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-12">
							<label class="col-form-label font-weight-bold">12. Apakah pasien dan keluarga memerlukan keterampilan khusus setelah keluar dari rumah sakit ?</label>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
						<div class="col-md-8">
							<div class="row" id="dacriplanning_b12Id">
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b12Id" value="Tidak" type="radio" class="custom-control-input" id="dacriplanning_b12Id_1">
											<label class="custom-control-label" for="dacriplanning_b12Id_1">Tidak</label>
										</div>
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b12Id" value="2" type="radio" class="custom-control-input" id="dacriplanning_b12Id_2">
											<label class="custom-control-label" for="dacriplanning_b12Id_2">Ya</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row" id="dacriplanning_div_b12Id2" style="display: none;">
						<div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
						<div class="col-md-10">
							<div class="row" id="dacriplanning_b12ket">
								<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b12ket" value="Perawatan Luka" type="checkbox" class="custom-control-input" id="dacriplanning_b12ket_1"> 
											<label class="custom-control-label" for="dacriplanning_b12ket_1">Perawatan Luka</label>
										</div>										
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b12ket" value="Injeksi" type="checkbox" class="custom-control-input" id="dacriplanning_b12ket_2"> 
											<label class="custom-control-label" for="dacriplanning_b12ket_2">Injeksi</label>
										</div>										
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b12ket" value="Perawatan Bayi" type="checkbox" class="custom-control-input" id="dacriplanning_b12ket_3"> 
											<label class="custom-control-label" for="dacriplanning_b12ket_3">Perawatan Bayi</label>
										</div>									
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_b12ket" value="4" type="checkbox" class="custom-control-input" id="dacriplanning_b12ket_4"> 
											<label class="custom-control-label" for="dacriplanning_b12ket_4">Lain-lain</label>
										</div>
										<div class="row" id="dacriplanning_div_b12ket4" style="display: none;">
											<div class="col-md-1"></div>
											<div class="col-md-10">
												<textarea rows="2" name="dacriplanning_b12ketket4" id="dacriplanning_b12ketket4" style="width: 100%;" class="form-control"></textarea>
											</div>*
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
	<div class="card"><!-- RUJUKAN KONTROL -->
		<div class="card-header" style="background-color:black;">
			<h3 class="card-title" style="color:white;">RUJUKAN KONTROL</h3>
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
						<div class="col-md-3  text-truncate">
							<label class="col-form-label">Tanggal Kontrol</label>
						</div>
						<div class="col-md-4">
							<div class="input-group date" id="dacriplanning_dctglkontrol" data-target-input="nearest">
							  <input id="dacriplanning_ctglkontrol" name="ctglkontrol" type="date" class="form-control">							  
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-3  text-truncate">
							<label class="col-form-label">Tempat (Poliklinik)</label>
						</div>
						<div class="col-md-4">
							<select name="cpoli" id="dacriplanning_cpoli" class="form-control"
							onchange="searchDokterPoli()">
								<!-- <option value="0">--Pilih--</option>
									<option value="1">RJ UMUM</option>
									<option value="2">KIA</option>
									<option value="3">OBGYN IBU HAMIL</option>
									<option value="4">RJ KES ANAK</option>
									<option value="5">IMUNISASI</option>
									<option value="6">KB</option>
									<option value="7">OBGYN LAINNYA</option>
									<option value="8">FISIOTHERAPI</option>
									<option value="9">RJ BEDAH</option>
									<option value="10">RJ ORTHOPEDI</option>
									<option value="11">RJP DALAM</option>
									<option value="12">LABORATORIUM</option>
									<option value="13">RADIOLOGI</option>
									<option value="23">RJ MATA</option>
									<option value="24">RJ GIGI &amp;amp MULUT</option>
									<option value="28">DAY CARE</option>
									<option value="30">RJ THT</option>
									<option value="37">KONSULTASI GIZI</option>
									<option value="38">RJ PARU</option>
									<option value="40">RJ UROLOGI</option>
									<option value="42">RJ KULIT DAN KELAMIN</option>
									<option value="44">RJ SARAF</option>
									<option value="45">RJ HEMATOLOGI</option>
									<option value="46">RJ JANTUNG</option>
									<option value="47">VCT</option>
									<option value="48">RJ GIGI ENDODONSI</option>
									<option value="52">VAKSINASI</option>
									<option value="53">ISOLASI COVID</option>
									<option value="55">POLI TUMBUH KEMBANG &amp; PEDIATRIK SOSIAL</option>
									<option value="57">RJ NEUROLOGY</option>
									<option value="58">RJ BEDAH PLASTIK</option>
									<option value="60">HEMODIALISA</option>
									<option value="61">RJ KEJIWAAN</option>
								<option value="62">RJ BEDAH SARAF</option> -->
							</select>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-3  text-truncate">
							<label class="col-form-label">Dokter</label>
						</div>
						<div class="col-md-6">
							<select id="dacriplanning_cdokter1Id" name="cdokter1Id" class="form-control"><option value="11" selected="" data-select2-id="15">dr. I WAYAN MERTHA, Sp.PD, KGH</option></select>
						</div>
						<div class="col-md-auto">
							<button id="dacriplanning_btpj1def" class="btn btn-warning" type="button" title="Default Dokter" onclick="resetDokter()">
								&nbsp;&nbsp;<i class="fas fa-undo"></i>&nbsp;&nbsp;
							</button>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group row">
						<div class="col-md-12 text-truncate">
							<label class="col-form-label">Dokumen &amp; Hasil pemeriksaan yang disertakan</label>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-0"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
						<div class="col-md-8">
							<div class="row" id="dacriplanning_cdokumenId">
								<div class="col-md-12">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_cdokumenId" value="1" type="checkbox" class="custom-control-input" id="dacriplanning_cdokumenId_1"> 
											<label class="custom-control-label" for="dacriplanning_cdokumenId_1">Laboratorium</label>
										</div>
										
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_cdokumenId" value="2" type="checkbox" class="custom-control-input" id="dacriplanning_cdokumenId_2"> 
											<label class="custom-control-label" for="dacriplanning_cdokumenId_2">Radiologi</label>
										</div>
										
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<div class="row custom-control custom-checkbox custom-control-inline">
											<input name="dacriplanning_cdokumenId" value="3" type="checkbox" class="custom-control-input" id="dacriplanning_cdokumenId_3"> 
											<label class="custom-control-label" for="dacriplanning_cdokumenId_3">Lain-lain</label>
										</div>
										<div class="row" id="dacriplanning_div_cdokumenId3" style="display: none;">
											<div class="col-md-1"></div>
											<div class="col-md-10">
												<textarea rows="2" name="dacriplanning_cdokumenIdket3" id="dacriplanning_cdokumenIdket3" style="width: 100%;" class="form-control"></textarea>
											</div>*
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
	<div class="card"><!-- SAKSI -->		
		<div class="card-body">
			<div class="form group row">
				<div class="col-md-6">
					<div class="form group row">
						<div class="col-md-3">
							<label>Tanggal </label>
						</div>
						<div class="col-md-6">
							<div class="input-group date" id="dacriplanning_tglcatat1" data-target-input="nearest">
								<input id="dacriplanning_tglcatat" name="tglcatat" type="date" class="form-control" data-target="#dacriplanning_tglcatat1">
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-3">
							<label>Catatan</label>
						</div>
						<div class="col-md-6">
							<textarea rows="5" name="dacriplanning_catat" id="dacriplanning_catat" class="form-control"></textarea>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-3">
							<label>Nama TTD PPA</label>
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="dacriplanning_zpjttd3" readonly="readonly">
						</div>						
					</div>					
				</div>
				<div class="col-md-6">					
					<div class="form group row">
						<div class="col-md-3"></div>
						<div class="col-md-6"></div>
						<div class="d-grid gap-2 d-md-flex justify-content-md-end" style="padding-block-start: 200px;">
							<button type="submit" class="btn btn-primary btn-lg me-md-2" id="" onclick="savePlanPasPlg()" ><i class="fas fa-save"></i> Save</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
  </div>	
</div>

<script>
var nowday = "<?php echo $nowday; ?>";
var tablePasienRawIna = $('#tablePasienRawIna');
var id_pegawai;
var nama_pegawai;
var pengaruhs='';
var pengaruh_kel='',pengaruh_kerja='',pengaruh_uang='';

tablePasienRawIna.bootstrapTable({
	onDblClickRow: function (row, $element, field) {
		$('#bodyPulangPasien').show();
		$('#cariPas').hide();
		$('#tablePasienRawIna').hide();
		document.getElementById('dacriplanning_id').value = row['no_rm'];
		document.getElementById('dacriplanning_atgl').value = row['tgl_transaksi'];
		document.getElementById('dacriplanning_zpjttd3').value = row['nama_pegawai'];
		id_pegawai = row['id_pegawai'];
		nama_pegawai = row['nama_pegawai'];
		searchPoli();
	}
});

document.getElementById('dacriplanning_atglpulang').value = nowday;
document.getElementById('dacriplanning_tglcatat').value = nowday;
$('#bodyPulangPasien').hide();
$('#bodyPulangPasien').hide();
$(document).ready(function() {
	searchPasPlg();
	searchPoli();
});

$('#dacriplanning_b1aId_1').on('change', function() {
	$("#dacriplanning_div_b1aId2").hide();
});
$('#dacriplanning_b1aId_2').on('change', function() {
	$("#dacriplanning_div_b1aId2").show();
});
$('#dacriplanning_b1bId_1').on('change', function() {
	$("#dacriplanning_div_b1bId2").hide();
});
$('#dacriplanning_b1bId_2').on('change', function() {
	$("#dacriplanning_div_b1bId2").show();
});
$('#dacriplanning_b1cId_1').on('change', function() {
	$("#dacriplanning_div_b1cId2").hide();
});
$('#dacriplanning_b1cId_2').on('change', function() {
	$("#dacriplanning_div_b1cId2").show();
});
$('#dacriplanning_b2Id_1').on('change', function() {
	$("#dacriplanning_div_b2Id2").hide();
});
$('#dacriplanning_b2Id_2').on('change', function() {
	$("#dacriplanning_div_b2Id2").show();
});
$('#dacriplanning_b3Id_10').on('change', function() {
	if(document.getElementById('dacriplanning_b3Id_10').checked){
		$("#dacriplanning_div_b3Id10").show();
	}else{
		$("#dacriplanning_div_b3Id10").hide();
	}	
});
$('#dacriplanning_b4Id_1').on('change', function() {
	$("#dacriplanning_div_b4Id2").hide();
});
$('#dacriplanning_b4Id_2').on('change', function() {
	$("#dacriplanning_div_b4Id2").show();
});
$('#dacriplanning_b5Id_1').on('change', function() {
	$("#dacriplanning_div_b5Id2").hide();
});
$('#dacriplanning_b5Id_2').on('change', function() {
	$("#dacriplanning_div_b5Id2").show();
});
$('#dacriplanning_b6Id_1').on('change', function() {
	$("#dacriplanning_div_b6Id2").hide();
});
$('#dacriplanning_b6Id_2').on('change', function() {
	$("#dacriplanning_div_b6Id2").show();
}); 
$('#dacriplanning_b6ket_5').on('change', function() {	
	if(document.getElementById('dacriplanning_b6ket_5').checked){
		$("#dacriplanning_div_b6ket5").show();
	}else{
		$("#dacriplanning_div_b6ket5").hide();
	}
}); 
$('#dacriplanning_b7Id_1').on('change', function() {
	$("#dacriplanning_div_b7Id2").hide();
});
$('#dacriplanning_b7Id_2').on('change', function() {
	$("#dacriplanning_div_b7Id2").show();
}); 
$('#dacriplanning_b7ket_1').on('change', function() {	
	$("#dacriplanning_div_b7ket4").hide();
}); 
$('#dacriplanning_b7ket_2').on('change', function() {	
	$("#dacriplanning_div_b7ket4").hide();
}); 
$('#dacriplanning_b7ket_3').on('change', function() {	
	$("#dacriplanning_div_b7ket4").hide();
}); 
$('#dacriplanning_b7ket_4').on('change', function() {	
	$("#dacriplanning_div_b7ket4").show();
}); 
$('#dacriplanning_b8Id_1').on('change', function() {
	$("#dacriplanning_div_b8Id2").hide();
});
$('#dacriplanning_b8Id_2').on('change', function() {
	$("#dacriplanning_div_b8Id2").show();
});
$('#dacriplanning_b9Id_1').on('change', function() {
	$("#dacriplanning_div_b9Id2").hide();
});
$('#dacriplanning_b9Id_2').on('change', function() {
	$("#dacriplanning_div_b9Id2").show();
});
$('#dacriplanning_b9ket_4').on('change', function() {	
	if(document.getElementById('dacriplanning_b9ket_4').checked){
		$("#dacriplanning_div_b9ket4").show();
	}else{
		$("#dacriplanning_div_b9ket4").hide();
	}
}); 
$('#dacriplanning_b10Id_1').on('change', function() {
	$("#dacriplanning_div_b10Id2").hide();
});
$('#dacriplanning_b10Id_2').on('change', function() {
	$("#dacriplanning_div_b10Id2").show();
});
$('#dacriplanning_b11Id_1').on('change', function() {
	$("#dacriplanning_div_b11Id2").hide();
});
$('#dacriplanning_b11Id_2').on('change', function() {
	$("#dacriplanning_div_b11Id2").show();
});
$('#dacriplanning_b11ket_7').on('change', function() {	
	if(document.getElementById('dacriplanning_b11ket_7').checked){
		$("#dacriplanning_div_b11ket7").show();
	}else{
		$("#dacriplanning_div_b11ket7").hide();
	}
}); 
$('#dacriplanning_b12Id_1').on('change', function() {
	$("#dacriplanning_div_b12Id2").hide();
});
$('#dacriplanning_b12Id_2').on('change', function() {
	$("#dacriplanning_div_b12Id2").show();
});
$('#dacriplanning_b12ket_4').on('change', function() {	
	if(document.getElementById('dacriplanning_b12ket_4').checked){
		$("#dacriplanning_div_b12ket4").show();
	}else{
		$("#dacriplanning_div_b12ket4").hide();
	}
}); 
$('#dacriplanning_cdokumenId_3').on('change', function() {	
	if(document.getElementById('dacriplanning_cdokumenId_3').checked){
		$("#dacriplanning_div_cdokumenId3").show();
	}else{
		$("#dacriplanning_div_cdokumenId3").hide();
	}
}); 

	function searchPasPlg(){
		$('#tablePasienRawIna').bootstrapTable('removeAll');
		document.getElementById('listpasermirna_plg').innerHTML='';
		
		var param ={
			norm:$('#norm_pas').val(),
			nmpasien: $('#nama_pas').val()
		}
		apiPOST('Rekammedisirna/searchPasien', param,hasil=>{		
			if (hasil !==null){
				// tablePasienRawIna.bootstrapTable('append', hasil['data']);
				var Baris = "";
				var a = hasil['data'];
				for (var i = 0; i < a.length; i++) {
					// var tglkunj   = a[i].tgl_masuk;
					var transaksi   = a[i].id_transaksi;
					var norm      = a[i].no_rm;
					var nama      = a[i].nama;
					var alamat    = a[i].alamat;
					var penjamin  = a[i].nama_penjamin;
					var kunjungan = a[i].id_kunjungan;
					var id_unit   = a[i].id_unit;
					var nama_unit = a[i].nama_unit;
					var tgl_keluar = a[i].tgl_keluar;
					var tgl_transaksi = a[i].tgl_transaksi;
					var id_pegawai     = a[i].id_pegawai;
					var nama_pegawai   = a[i].nama_pegawai;
					
					id_kunjungan_priope = kunjungan;

					Baris += '<div class="col-lg-3 col-6">';
					if (tgl_keluar>''){
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
					Baris += '<a href="#" class="small-box-footer" style="background-color: darkgreen;" onclick="viewFormPasplg('+"'"+norm+"','"+tgl_transaksi+"'"+')">Klik Detail <i class="fas fa-arrow-circle-right"></i></a>';
					Baris += '</div>';
					Baris += '</div>';
				}
				// console.log(Baris);
				$('#listpasermirna_plg').append(Baris);
			}
		  });		
	}
	
	function viewFormPasplg(norm,tgl_transaksi){
		$('#cariPas').hide();
		$('#tablePasPlg').hide();
		$('#bodyPulangPasien').show();
		
		document.getElementById('dacriplanning_id').value = norm;
		document.getElementById('dacriplanning_atgl').value = tgl_transaksi;
		document.getElementById('dacriplanning_zpjttd3').value = nama_pegawai;
		// console.log(nama_pegawai);
		// id_pegawai = row['id_pegawai'];
		// nama_pegawai = row['nama_pegawai'];
	}
	
	function cariPasPlgbyrm(e){
		if (e.keyCode == 13) {
			var param={
			norm: $("#norm_pas").val(),
			nmpasien: $("#nama_pas").val()			
		};		
			searchPasPlg();
		}
	}
	
	function cariPasPlgbynama(e){
		if (e.keyCode == 13) {
			var param={
			norm: $("#norm_pas").val(),
			nmpasien: $("#nama_pas").val()			
		};		
			searchPasPlg();
		}
	}

	function closedetPasPlg(){
		$('#bodyPulangPasien').hide();
		$('#cariPas').show();
		$('#tablePasPlg').show();
		// $('#tablePasienRawIna').bootstrapTable('removeAll');
	}
	
	function searchPoli(){
		apiPOST('Rekammedisirna/searchPoli', null,hasil=>{
			var poli='';
			var a=hasil['data'];
			for (var i = 0; i < a.length; i++) {
			  poli+='<option value="'+a[i]['id_unit']+'">'+a[i]['nama_unit']+'</option>';
			}
			document.getElementById('dacriplanning_cpoli').innerHTML=poli;
		});
	}
	
	function searchDokterPoli(){
		var selectpoli=$('#dacriplanning_cpoli').val();
		apiPOST('Rekammedisirna/searchDokter', selectpoli,hasil=>{
			var dokter='';
			var a=hasil['data'];
			for (var i = 0; i < a.length; i++) {
			  dokter+='<option value="'+a[i]['id_pegawai']+'">'+a[i]['nama_pegawai']+'</option>';
			}
			document.getElementById('dacriplanning_cdokter1Id').innerHTML=dokter;
		});
	}
	
	function resetDokter(){
		var dokter='';
		searchPoli();
		dokter+='<option value="'+id_pegawai+'">'+nama_pegawai+'</option>';
		document.getElementById('dacriplanning_cdokter1Id').innerHTML=dokter;
	}
	
	function savePlanPasPlg(){
		pengaruhs = pengaruh_kel.concat(",",pengaruh_kerja,",",pengaruh_uang);
		var bants='',alat_meds='',sulit='',edu='',trampil='';
		if(document.getElementById('dacriplanning_b3Id_10').checked){
			var bant=Array.from(document.querySelectorAll('input[name=dacriplanning_b3Id]:checked')).map(c=>c.value);
			bant.pop();
			bant.push($('#dacriplanning_b3Idket10').val());
			bants=bant.join();
		}else{
			bants=Array.from(document.querySelectorAll('input[name=dacriplanning_b3Id]:checked')).map(c=>c.value).join();
		} 
		if($('input[name=dacriplanning_b6Id]:checked').val()==2){
			alat_meds=Array.from(document.querySelectorAll('input[name=dacriplanning_b6ket]:checked')).map(c=>c.value);
			if(document.getElementById('dacriplanning_b6ket_5').checked){
				alat_meds.pop();
				alat_meds.push($('#dacriplanning_b6ketket5').val());
				alat_medis=alat_meds.join();
			}else{
			alat_medis=Array.from(document.querySelectorAll('input[name=dacriplanning_b6ket]:checked')).map(c=>c.value).join();
			}
		}else{
			alat_medis=$('input[name=dacriplanning_b6Id]:checked').val();
		}
		if($('input[name=dacriplanning_b9Id]:checked').val()==2){
			sulit=Array.from(document.querySelectorAll('input[name=dacriplanning_b9ket]:checked')).map(c=>c.value);
			if(document.getElementById('dacriplanning_b9ket_4').checked){
				sulit.pop();
				sulit.push($('#dacriplanning_b9ketket4').val());
				kesulitan=sulit.join();
			}else{
				kesulitan=Array.from(document.querySelectorAll('input[name=dacriplanning_b9ket]:checked')).map(c=>c.value).join();
			}
		}else{
			kesulitan=$('input[name=dacriplanning_b9Id]:checked').val();
		}
		if($('input[name=dacriplanning_b11Id]:checked').val()==2){
			edu=Array.from(document.querySelectorAll('input[name=dacriplanning_b11ket]:checked')).map(c=>c.value);
			if(document.getElementById('dacriplanning_b11ket_7').checked){
				edu.pop();
				edu.push($('#dacriplanning_b11ketket7').val());
				edukasi=edu.join();
			}else{
				edukasi=Array.from(document.querySelectorAll('input[name=dacriplanning_b11ket]:checked')).map(c=>c.value).join();
			}
		}else{
			edukasi=$('input[name=dacriplanning_b11Id]:checked').val();
		}
		if($('input[name=dacriplanning_b12Id]:checked').val()==2){
			trampil=Array.from(document.querySelectorAll('input[name=dacriplanning_b12ket]:checked')).map(c=>c.value);
			if(document.getElementById('dacriplanning_b12ket_4').checked){
				trampil.pop();
				trampil.push($('#dacriplanning_b12ketket4').val());
				keterampilan=trampil.join();
			}else{
				keterampilan=Array.from(document.querySelectorAll('input[name=dacriplanning_b12ket]:checked')).map(c=>c.value);
			}
		}else{
			keterampilan=$('input[name=dacriplanning_b12Id]:checked').val();
		}
		if(document.getElementById('dacriplanning_cdokumenId_3').checked){
			var dok=Array.from(document.querySelectorAll('input[name=dacriplanning_cdokumenId]:checked')).map(c=>c.value);
			dok.pop();
			dok.push($('#dacriplanning_cdokumenIdket3').val());
			dokumen=dok.join();
		}else{
			dokumen=Array.from(document.querySelectorAll('input[name=dacriplanning_cdokumenId]:checked')).map(c=>c.value).join();
		} 
		var param = {
			id:$('#dacriplanning_id').val(),
			tgl_masuk:$('#dacriplanning_atgl').val(),
			alasan:$('#dacriplanning_aalasan').val(),
			diagnosa:$('#dacriplanning_adiagnosa').val(),
			pihak:$('#dacriplanning_apx').val(),
			penj:$('#dacriplanning_apjId').val(),
			plg:$('#dacriplanning_atglpulang').val(),
			pendamping:$('#dacriplanning_apendamping').val(),
			hubungan:$('#dacriplanning_ahubungan').val(),
			pengaruh: pengaruhs,
			antisipasi:$('input[name=dacriplanning_b2Id]:checked').val(),
			bantuan: bants,
			helper:$('input[name=dacriplanning_b4Id]:checked').val(),
			sendiri:$('input[name=dacriplanning_b5Id]:checked').val(),
			alat_medis:alat_medis,
			alat_jln:$('input[name=dacriplanning_b7Id]:checked').val(),
			rawat_khusus:$('input[name=dacriplanning_b8Id]:checked').val(),
			kesulitan:kesulitan,
			nyeri:$('input[name=dacriplanning_b10Id]:checked').val(),
			edukasi:edukasi,
			keterampilan:keterampilan,
			tgl_kontrol:$('#dacriplanning_ctglkontrol').val(),
			poli:$('#dacriplanning_cpoli').val(),
			dokter:$('#dacriplanning_cdokter1Id').val(),
			dokumen:dokumen,
			ttd: id_pegawai,
			catatan:$('#dacriplanning_catat').val()
			
		}
		if($('input[name=dacriplanning_b1aId]:checked').val()==2){
			pengaruh_kel=$('#dacriplanning_b1aIdket').val();
		}else{
			pengaruh_kel=$('input[name=dacriplanning_b1aId]:checked').val();
		}
		if($('input[name=dacriplanning_b1bId]:checked').val()==2){
			pengaruh_kerja =$('#dacriplanning_b1bIdket').val();
		}else{
			pengaruh_kerja=$('input[name=dacriplanning_b1bId]:checked').val();
		}
		if($('input[name=dacriplanning_b1cId]:checked').val()==2){
			pengaruh_uang =$('#dacriplanning_b1cIdket').val();
		}else{
			pengaruh_uang=$('input[name=dacriplanning_b1cId]:checked').val();
		}
		if($('input[name=dacriplanning_b2Id]:checked').val()==2){
			param.antisipasi =$('#dacriplanning_b2Idket').val();
		}		
		if($('input[name=dacriplanning_b4Id]:checked').val()==2){
			param.helper =$('#dacriplanning_b4Idket').val();
		}
		if($('input[name=dacriplanning_b5Id]:checked').val()==2){
			param.sendiri =$('#dacriplanning_b5Idket').val();
		}		
		if($('input[name=dacriplanning_b7Id]:checked').val()==2){
			param.alat_jln=$('input[name=dacriplanning_b7ket]:checked').val();
			if($('input[name=dacriplanning_b7ket]:checked').val()==4){
				param.alat_jln=$('#dacriplanning_b7ketket4').val(); /**/			
			}
		}
		if($('input[name=dacriplanning_b8Id]:checked').val()==2){
			param.rawat_khusus=$('input[name=dacriplanning_b8ket]:checked').val();			
		}		
		if($('input[name=dacriplanning_b10Id]:checked').val()==2){
			param.nyeri =$('#dacriplanning_b10Idket').val();
		}		
		
		apiPOST("Rekammedisirna/savePasienPulang", param, hasil => {
            closedetPasPlg();			
        })
	}

</script>