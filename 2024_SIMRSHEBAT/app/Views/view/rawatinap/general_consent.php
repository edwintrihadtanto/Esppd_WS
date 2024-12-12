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
				<button id="dacconsent_btdiag" class="btn btn-sm btn-success" type="button" title="GENERAL CONSENT">
					&nbsp;<!-- <i class="fas fa-book"></i> -->&nbsp; Informasi General Consent &nbsp;
				</button>
				<button id="dacconsent_btdiaghk" class="btn btn-sm btn-danger" type="button" title="GENERAL CONSENT">
					&nbsp;<!-- <i class="fas fa-book"></i> -->&nbsp; Hak dan Kewajiban Pasien &nbsp;
				</button>
				<button id="dacconsent_btdiagsatusehat" class="btn btn-sm btn-primary" type="button" title="GENERAL CONSENT">
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
							
						<div class="table-responsive" align="center">
	        					<table class="table table-condensed d-none" style="width:250px; height: 120px;">
	        						<tbody><tr>
							      		<td width="30%" style="padding:0;">
							      	<!-- 		 <div class="col-md-12  wrapper" style="width:260px; height: 120px;">
										 		<canvas th:id="${ccm+'_ttd2'}" width="250"  height=120 style="position: absolute;"></canvas>
										 	</div> -->
										 	 <div id="dacconsent_ttdid2" class="sigPad border border-dark" style="width:250px;">
										          <a id="dacconsent_resetttd2" class="clearButton btn btn-primary " href="#clear" hidden="true" style="display: block;">Reset</a>
										          <div class="sig sigWrapper border border-dark current" style="height: auto; display: block;">
										            <canvas id="dacconsent_ttd2" class="pad" width="240" height="120"></canvas>
										            <input id="dacconsent_codesig2" type="hidden" name="output-3" class="output" value="">
										          </div>
									        </div>
							      		</td>
								      </tr>
	        					</tbody></table>
		        			</div>
		        			
		        			<div class="form-group row" id="dacconsent_divqrcode">
								<div class="col-md-12" align="center">
									<img id="dacconsent_qrcode" src="/emr/div/emr/dacconsent_ttd?id=264237&amp;idx=1">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-12" align="center">
									<table>
										<tbody><tr>
											<td width="50%" style="padding: 0;"><input type="text" class="form-control text-center" id="dacconsent_zpjttd" readonly="readonly"></td>
										</tr>
									</tbody></table>
								</div>
							</div>

							<!-- <div class="form-group row">
								<div class="col-md-12" align="center">
									<table>
										<tr>
											<td width="50%" style="padding: 0;"><input type="text"
												class="form-control text-center" th:id="${ccm+'_zpjttd'}"
												readonly="readonly"></td>
										</tr>
									</table>
								</div>
							</div> -->

							<!-- <div class="form-group row">
								 <div align="center" class="col-md-12">
								 	<button th:id="${ccm+'_btclearttd2'}" type="button" class="btn btn-sm btn-warning"><i class="fas fa-ban"></i> Reset</button>
								 </div>
							</div> -->
							<div class="form-group row">
								<div class="col-md-12" align="center">
									<label class="col-form-label">Nama &amp; Tanda tangan</label>
								</div>
							</div>
							<div class="form-group row">
								<div align="center" class="col-md-12">
									<button id="dacconsent_btttd1" type="button" class="btn btn-sm btn-danger d-none">
										<!-- <i class="fas fa-signature"></i> --> Validasi
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
							<div class="form-group row">
								<div class="card">
									<div class="row">
										
									 </div>
								 </div>
								 <div class="table-responsive" align="center">
		        					<table class="table  table-condensed" style="width:250px; height: 120px;">
		        						<tbody><tr>
								      		<td width="30%" style="padding:0;">
								      			 <!-- <div class="col-md-12  wrapper" style="width:260px; height: 120px;">
											 		<canvas th:id="${ccm+'_ttd1'}" width="250"  height=120 style="position: absolute;"></canvas>
												 </div> -->
												  
										        </div>
								      		</td>
									      </tr>
		        					</tbody></table>
			        			 </div>
							</div>
							<div class="form-group row">
		        			 	<div class="col-md-12" align="center">
		        			 		<table>
		        			 			<tbody><tr>
								      		<td width="50%" style="padding:0;">
								      			 <input type="text" class="form-control text-center" id="dacconsent_zpjttd2" readonly="readonly">
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
								 	<button id="dacconsent_btclearttd1" type="button" class="btn btn-sm btn-warning"> Reset</button>
								 </div>
							</div>
						</div>
					</div>
      			</div>
		    </div>
	    </div>
		<div class="card-footer">
			<button id="dacconsent_btsave" type="button" class="btn btn-sm btn-primary"><!-- <i class="fas fa-save"></i> --> Simpan</button>
			<button id="dacconsent_btdelete" type="button" class="btn btn-sm btn-danger" style=""><!-- <i class="fas fa-trash"></i> --> Hapus</button>
			<button id="dacconsent_btprint" type="button" class="btn btn-sm btn-success" style=""><!-- <i class="fas fa-print"></i> --> Print PDF</button>
			<button id="dacconsent_btprint2" type="button" class="btn btn-sm btn-success" style=""><!-- <i class="fas fa-print"></i> --> Print SatuSehat</button>
		</div>
	</div>
</div>