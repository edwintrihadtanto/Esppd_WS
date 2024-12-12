<div class="col-md-12">

	<div id="divserahterima" >		
		<div class="card "><!-- S (Situation) -->
			<div class="card-header" style="background-color:black;">								
				<h3 class="card-title" style="color:white;">S (Situation)</h3>
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
								<label class="col-form-label" title="ID">ID</label>
							</div>
							<div class="col-md-8">
								<label class="col-form-label" id="dactindakanhd_id">154388</label>
							</div>							
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Perawat</label>
							</div>
							<div class="col-md-8">
								<div class="input-group">
									<select id="dactindakanhd_bparaf" name="paraf" class="form-control select2-hidden-accessible" data-select2-id="dactindakanhd_bparaf" tabindex="-1" aria-hidden="true" disabled="disabled"><option value="1" selected="" data-select2-id="4">UMUM</option><option value="22" selected="" data-select2-id="7">HERIDA ISNANINGSIH</option></select><span class="select2 select2-container select2-container--bootstrap4 select2-container--disabled" dir="ltr" data-select2-id="3"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-labelledby="select2-dactindakanhd_bparaf-container"><span class="select2-selection__rendered" id="select2-dactindakanhd_bparaf-container" role="textbox" aria-readonly="true" title="HERIDA ISNANINGSIH"><span class="select2-selection__clear" data-select2-id="9">×</span>HERIDA ISNANINGSIH</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
								</div>
							</div>
							<div class="col-md-1">
								<button id="dactindakanhd_btpjdef" class="btn btn-warning d-none" type="button" title="Default PJ">
									&nbsp;<svg class="svg-inline--fa fa-undo fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="undo" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M212.333 224.333H12c-6.627 0-12-5.373-12-12V12C0 5.373 5.373 0 12 0h48c6.627 0 12 5.373 12 12v78.112C117.773 39.279 184.26 7.47 258.175 8.007c136.906.994 246.448 111.623 246.157 248.532C504.041 393.258 393.12 504 256.333 504c-64.089 0-122.496-24.313-166.51-64.215-5.099-4.622-5.334-12.554-.467-17.42l33.967-33.967c4.474-4.474 11.662-4.717 16.401-.525C170.76 415.336 211.58 432 256.333 432c97.268 0 176-78.716 176-176 0-97.267-78.716-176-176-176-58.496 0-110.28 28.476-142.274 72.333h98.274c6.627 0 12 5.373 12 12v48c0 6.627-5.373 12-12 12z"></path></svg><!-- <i class="fas fa-undo"></i> -->&nbsp;
								</button>
							</div>					            
						</div>							
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Tanggal &amp; Jam</label>
							</div>
							<div class="col-md-8">
								<div class="input-group date" id="dactindakanhd_datgl" data-target-input="nearest">
									<input id="dactindakanhd_atgl" name="atgl" type="text" class="form-control 
									datetimepicker-input" data-target="#dactindakanhd_datgl" data-toggle="datetimepicker" onkeydown="return false">
									<div class="input-group-append" data-target="#dactindakanhd_datgl" data-toggle="datetimepicker">
										<div class="input-group-text"><svg class="svg-inline--fa fa-calendar fa-w-14" aria-hidden="true" focusable="false" data-prefix="far" data-icon="calendar" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M400 64h-48V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H160V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zm-6 400H54c-3.3 0-6-2.7-6-6V160h352v298c0 3.3-2.7 6-6 6z"></path></svg><!-- <i class="far fa-calendar"></i> --></div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Observasi</label>
							</div>
							<div class="col-md-8">
								<div class="input-group">
									<select name="observasi" id="dactindakanhd_observasi" class="form-control" disabled="disabled">
										<option value="1" disabled="">PRE-HD</option>
										<option value="2">INTRA HEMODIALISIS</option>
										<option value="3">POST-HD</option>
									</select>
								</div>
							</div>
						</div>							
						<div class="form-group row" id="dactindakanhd_divhd1">
							<div class="col-md-3">
								<label class="col-form-label">Quick Of Blood</label>
							</div>
							<div class="col-md-8">
								<div class="input-group">
									<input type="number" class="form-control" id="dactindakanhd_bqb">
									<span class="input-group-append ">
										<span class="input-group-text">ml/mnt</span>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group row" id="dactindakanhd_divhd2">
							<div class="col-md-3">
								<label class="col-form-label">Ultra Filtration Rate</label>
							</div>
							<div class="col-md-8">
								<div class="input-group">
									<input type="number" class="form-control" id="dactindakanhd_bufr">
									<span class="input-group-append ">
										<span class="input-group-text">ml</span>
									</span>										
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Tensi Darah</label>
							</div>
							<div class="col-md-8">
								<div class="input-group">
									<input type="number" onfocus="this.select();" class="form-control" id="dactindakanhd_btensi" onkeyup="dactindakanhdex.onChangeMap();">
									<label class="col-form-label">/</label>
									<input type="number" onfocus="this.select();" class="form-control" id="dactindakanhd_btensi1" onkeyup="dactindakanhdex.onChangeMap();">
									<span class="input-group-append ">
										<span class="input-group-text">mmHg</span>
									</span>										
								</div>
							</div>					       					            
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Heart Rate</label>
							</div>
							<div class="col-md-8">
								<div class="input-group">
									<input type="number" class="form-control" id="dactindakanhd_bhr">
									<span class="input-group-append ">
										<span class="input-group-text">x/Menit</span>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Suhu</label>
							</div>
							<div class="col-md-8">
								<div class="input-group">
									<input type="number" class="form-control" id="dactindakanhd_bsuhu">
									<span class="input-group-append">
										<span class="input-group-text">°C</span>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">RR</label>
							</div>
							<div class="col-md-8">
								<div class="input-group">
									<input type="number" class="form-control" id="dactindakanhd_brr">
									<span class="input-group-append ">
										<span class="input-group-text">x/Menit</span>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">MAP</label>
							</div>
							<div class="col-md-8">
								<div class="input-group">
									<input type="number" onfocus="this.select();" class="form-control" id="dactindakanhd_bmap">
								</div>
							</div>
						</div>
						<div class="form-group row" id="dactindakanhd_divhd3">
							<div class="col-md-3">
								<label class="col-form-label">TMP</label>
							</div>
							<div class="col-md-8">
								<div class="input-group">
									<input type="number" class="form-control" id="dactindakanhd_btmp">
								</div>
							</div>
						</div>
						<div class="form-group row" id="dactindakanhd_divhd4">
							<div class="col-md-3">
								<label class="col-form-label">VP</label>
							</div>
							<div class="col-md-8">
								<div class="input-group">
									<input type="number" class="form-control" id="dactindakanhd_bvp">
								</div>
							</div>
						</div>
						<div class="form-group row" id="dactindakanhd_divhd5">
							<div class="col-md-3">
								<label class="col-form-label">AP</label>
							</div>
							<div class="col-md-8">
								<div class="input-group">
									<input type="number" class="form-control" id="dactindakanhd_bap">
								</div>
							</div>
						</div>														
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Skala Nyeri</label>
							</div>
							<div class="col-md-8">
								<input type="number" class="form-control" id="dactindakanhd_bnyeri">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">GCS</label>
							</div>
							<div class="col-md-8">
								<div class="input-group">
									<input type="number" class="form-control" id="dactindakanhd_bgcs">
								</div>
							</div>
						</div>
						<div class="form-group row" id="dactindakanhd_divhd6">
							<div class="col-md-3">
								<label class="col-form-label">Target UFG</label>
							</div>
							<div class="col-md-8">
								<div class="input-group">
									<input type="number" class="form-control" id="dactindakanhd_targetufg">
								</div>
							</div>
						</div>							
					</div>
					<div class="col-md-6">
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label font-weight-bold">INTAKE</label>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">NaCL 0.9%</label>
							</div>
							<div class="col-md-8">
								<div class="input-group">
									<input type="number" class="form-control" id="dactindakanhd_bnacl">
									<span class="input-group-append">
										<span class="input-group-text">cc</span>
									</span>
								</div>
							</div>
						</div>	
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Dektros 40%</label>
							</div>
							<div class="col-md-8">
								<div class="input-group">
									<input type="number" class="form-control" id="dactindakanhd_bdektros">
									<span class="input-group-append">
										<span class="input-group-text">cc</span>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Makan Minum</label>
							</div>
							<div class="col-md-8">
								<div class="input-group">
									<input type="number" class="form-control" id="dactindakanhd_bmakanminum">
									<span class="input-group-append">
										<span class="input-group-text">cc</span>
									</span>										
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Lain-lain</label>
							</div>
							<div class="col-md-8">
								<div class="input-group">
									<textarea class="form-control" id="dactindakanhd_bket" rows="2" cols="5"></textarea>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Jml CC</label>
							</div>
							<div class="col-md-8">
								<div class="input-group">
									<input type="number" class="form-control" id="dactindakanhd_bketisi">
									<span class="input-group-append">
										<span class="input-group-text">cc</span>
									</span>										
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label font-weight-bold">OUT PUT</label>
							</div>
						</div>				
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">UF Volume</label>
							</div>
							<div class="col-md-8">
								<div class="input-group">
									<input type="number" class="form-control" id="dactindakanhd_bvolume">
									<span class="input-group-append">
										<span class="input-group-text">cc</span>
									</span>										
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Keterangan</label>
							</div>
							<div class="col-md-8">
								<div class="input-group">
									<textarea class="form-control" id="dactindakanhd_bket1" rows="3" cols="10"></textarea>
								</div>
							</div>
						</div>
						<div class="form-group row" id="dactindakanhd_div_post" style="display:none;">
							<div class="col-md-3">
								<label class="col-form-label font-weight-bold">POST HD</label>
							</div>
						</div>								
						<div class="form-group row" id="dactindakanhd_div_ufg" style="display:none;">
							<div class="col-md-3">
								<label class="col-form-label">UFG</label>
							</div>
							<div class="col-md-8">
								<div class="input-group">
									<input type="number" class="form-control" id="dactindakanhd_ufg">
									<span class="input-group-append ">
										<span class="input-group-text">ml</span>
									</span>										
								</div>
							</div>
						</div>
						<div class="form-group row" id="dactindakanhd_div_ktv" style="display:none;">
							<div class="col-md-3">
								<label class="col-form-label">Kt/v</label>
							</div>
							<div class="col-md-8">
								<div class="input-group">
									<input type="number" class="form-control" id="dactindakanhd_ktv">
								</div>
							</div>
						</div>
						<div class="form-group row" id="dactindakanhd_div_clear" style="display:none;">
							<div class="col-md-3">
								<label class="col-form-label">Clear</label>
							</div>
							<div class="col-md-8">
								<div class="input-group">
									<input type="number" class="form-control" id="dactindakanhd_clear">
								</div>
							</div>
						</div>																					
						<div class="form-group row">
							<div class="col-md-3"></div>
							<div class="col-md-8">																																																									
								<div class="form-group row">
									<div class="col-md-12" align="center">
										<label class="col-form-label">Perawat Penanggung Jawab Pasien</label>
									</div>
								</div>										
								<div class="form-group row" id="dactindakanhd_divqrcode">
									<div class="col-md-12" align="center">
										<img id="dactindakanhd_qrcode" src="/emr/div/emr/dactindakanhd_ttd?id=154388&amp;idx=1">
									</div>
								</div>										
								<div class="form-group row">
									<div class="col-md-12" align="center">											
										<table>
											<tbody><tr>
												<td width="48%" style="padding: 0;"><input type="text" class="form-control text-center" id="dactindakanhd_zpjttd" readonly="readonly">
												</td>
											</tr>
										</tbody></table>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-12" align="center">
										<label class="col-form-label font-italic">Nama &amp; Tanda tangan</label>
									</div>
								</div>				
								<div class="form-group row">
									<div class="col-md-12" align="center">
										<button id="dactindakanhd_btttd1" type="button" class="btn btn-sm btn-danger d-none"><svg class="svg-inline--fa fa-signature fa-w-20" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="signature" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg=""><path fill="currentColor" d="M623.2 192c-51.8 3.5-125.7 54.7-163.1 71.5-29.1 13.1-54.2 24.4-76.1 24.4-22.6 0-26-16.2-21.3-51.9 1.1-8 11.7-79.2-42.7-76.1-25.1 1.5-64.3 24.8-169.5 126L192 182.2c30.4-75.9-53.2-151.5-129.7-102.8L7.4 116.3C0 121-2.2 130.9 2.5 138.4l17.2 27c4.7 7.5 14.6 9.7 22.1 4.9l58-38.9c18.4-11.7 40.7 7.2 32.7 27.1L34.3 404.1C27.5 421 37 448 64 448c8.3 0 16.5-3.2 22.6-9.4 42.2-42.2 154.7-150.7 211.2-195.8-2.2 28.5-2.1 58.9 20.6 83.8 15.3 16.8 37.3 25.3 65.5 25.3 35.6 0 68-14.6 102.3-30 33-14.8 99-62.6 138.4-65.8 8.5-.7 15.2-7.3 15.2-15.8v-32.1c.2-9.1-7.5-16.8-16.6-16.2z"></path></svg><!-- <i class="fas fa-signature"></i> --> Validasi</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card"><!-- serah terima -->
			<div class="card-header" style="background-color:black;">
				<h3 class="card-title" style="color:white;">SERAH TERIMA PASIEN ANTAR RUANGAN</h3>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse">
						<i class="fas fa-minus"></i>
					</button>			  
				</div>
			</div>
			<div class="card-body" data-select2-id="27">
				<div class="row" data-select2-id="26">
					<div class="col-md-6" data-select2-id="25">
						<div class="form-group row" data-select2-id="24">
							<div class="col-md-3">
								<label class="col-form-label">Perawat Yg Menyerahkan</label>
							</div>
							<div class="col-md-7" data-select2-id="23">
								<select id="dactranspasien_apj1Id" name="apj1Id" class="form-control form-control-sm"  >
								</select>
							</div>
						</div>
						<div class="form-group row" data-select2-id="37">
							<div class="col-md-3">
								<label class="col-form-label">Dokter Yg Menyerahkan</label>
							</div>
							<div class="col-md-7" >
								<select class="form-control form-control-sm" id="dactranspasien_dok1Id" name="dok1Id"  ></select>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Perawat Yg Menerima</label>
							</div>
							<div class="col-md-7">
								<select id="dactranspasien_apj2Id" name="apj2Id" class="form-control form-control-sm" ></select>
							</div>

						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Dokter Yg Menerima</label>
							</div>
							<div class="col-md-7">
								<select id="dactranspasien_dok2Id" name="dok2Id" class="form-control form-control-sm" ></select>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>		
		<div class="card"><!-- B (Background) -->			
			<div class="card-header" style="background-color:black;">				
				<h3 class="card-title" style="color:white;">B (Background)</h3>
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
								<label class="col-form-label">Keluhan Saat Masuk</label>
							</div>
							<div class="col-md-8">
								<textarea rows="4" name="dactranspasien_bkeluhan" id="dactranspasien_bkeluhan" style="width:100%;" class="form-control"></textarea>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Indikasi Masuk Ranap</label>
							</div>
							<div class="col-md-8">
								<textarea rows="4" name="dactranspasien_bindikasi" id="dactranspasien_bindikasi" style="width:100%;" class="form-control"></textarea>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card"><!-- A (Assesment) -->
			<div class="card-header" style="background-color:black;">				
				<h3 class="card-title" style="color:white;">A (Assesment)</h3>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse">
						<i class="fas fa-minus"></i>
					</button>			  
				</div>				
			</div>
			<div class="card-body">
				<div class="row ">
					<div class="col-md-4">
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label" title="Keadaan Umum">Keadaan Umum</label>
							</div>
							<div class="col-md-8">
								<div class="input-group">
									<select name="akeadaan" id="dactranspasien_akeadaan" class="form-control">
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
								<div class="input-group">
									<input type="number" onfocus="this.select();" class="form-control" id="dactranspasien_crespirasi">
									<span class="input-group-append">
										<span class="input-group-text">x/Menit</span>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label" title="Nadi">Nadi</label>
							</div>
							<div class="col-md-8">
								<div class="input-group">
									<input type="number" onfocus="this.select();" class="form-control" id="dactranspasien_dnadi">
									<span class="input-group-append">
										<span class="input-group-text">x/Menit</span>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label" title="Nadi">Penggunaan O2</label>
							</div>
							<div class="col-md-4">
								<div class="input-group">
									<input type="number" onfocus="this.select();" class="form-control" id="dactranspasien_po2">
									<span class="input-group-append">
										<span class="input-group-text">lt/Menit</span>
									</span>
								</div>
							</div>
							<div class="col-md-4">
								<div class="input-group">
									<span class="input-group-prepend">
										<span class="input-group-text">Via</span>
									</span>
									<input type="text" class="form-control" id="dactranspasien_po2via">
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
								<div class="input-group">
									<span class="input-group-prepend">
										<span class="input-group-text">Kiri</span>
									</span>
									<select name="epupil1" id="dactranspasien_epupil1" class="form-control">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
									</select>
								</div>
							</div>
							<div class="col-md-5">
								<div class="input-group">
									<span class="input-group-prepend">
										<span class="input-group-text">Kanan</span>
									</span>
									<select name="epupil2" id="dactranspasien_epupil2" class="form-control">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
									</select>
									<span class="input-group-append">
										<span class="input-group-text">mm</span>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label" title="Tensi">Tekanan Darah</label>
							</div>
							<div class="col-md-8">
								<div class="input-group">
									<input type="number" onfocus="this.select();" class="form-control" id="dactranspasien_ftensi1">
									<label class="col-form-label">/</label>
									<input type="number" onfocus="this.select();" class="form-control" id="dactranspasien_ftensi2">
									<span class="input-group-append">
										<span class="input-group-text">mmHg</span>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label" title="Tensi"></label>
							</div>
							<div class="col-md-8">
								<div class="input-group">
									<input type="text" id="dactranspasien_fpalpasi" class="form-control" placeholder="Diisi jika Palpasi">
									<span class="input-group-append">
										<span class="input-group-text">Per palpasi</span>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label" title="Suhu">Suhu</label>
							</div>
							<div class="col-md-8">
								<div class="input-group">
									<input type="number" onfocus="this.select();" class="form-control" id="dactranspasien_gsuhu">
									<span class="input-group-append">
										<span class="input-group-text">°C</span>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label" title="Spo2">SpO2</label>
							</div>
							<div class="col-md-8">
								<div class="input-group">
									<input type="number" onfocus="this.select();" class="form-control" id="dactranspasien_hspo2">
									<span class="input-group-append">
										<span class="input-group-text">%</span>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label" title="Reflek Cahaya">Reflek Cahaya</label>
							</div>
							<div class="col-md-8">
								<div class="input-group">
									<span class="input-group-prepend">
										<span class="input-group-text">Kiri</span>
									</span>
									<select name="ireflek1" id="dactranspasien_ireflek1" class="form-control">
										<option value="1">+</option>
										<option value="2">-</option>
									</select>
									-
									<span class="input-group-prepend">
										<span class="input-group-text">Kanan</span>
									</span>
									<select name="ireflek1" id="dactranspasien_ireflek2" class="form-control">
										<option value="1">+</option>
										<option value="2">-</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-12">
								<label class="col-form-label text-danger font-weight-bold font-italic" title="Berat Badan">Note (*) Nominal ribuan = gram, satuan / puluhan / ratusan = kg</label>
							</div>
						</div>						
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label" title="Berat Badan">Berat Badan</label> <span class="text-danger">*</span>
							</div>
							<div class="col-md-8">
								<div class="input-group">
									<input type="number" onfocus="this.select();" class="form-control" id="dactranspasien_jbb">
									<span class="input-group-append">
										<span class="input-group-text">Kg / Gram</span>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label" title="Tinggi Badan">Tinggi Badan</label>
							</div>
							<div class="col-md-8">
								<div class="input-group">
									<input type="number" onfocus="this.select();" class="form-control" id="dactranspasien_jtb">
									<span class="input-group-append">
										<span class="input-group-text">Cm</span>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row ">
					<div class="col-md-12">
						<div class="form-group row">
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="table table-bordered table-condensed" width="100%">
										<tbody>
											<tr>
												<td colspan="4" width="30%" style="padding:0;"><div class="row d-flex justify-content-center">
													<label class="col-form-label font-weight-bold">Glasgow Coma Scale ( GCS )</label>
												</div></td>
											</tr>
											<tr>
												<td colspan="2" width="30%" style="padding:0;">
													<div class="row d-flex justify-content-center">
														<label class="col-form-label">Kategori</label>
													</div>
												</td>
												<td width="20%" style="padding:0;">
													<div class="row d-flex justify-content-center">
														<label class="col-form-label">Skor</label>
													</div>
												</td>
												<td width="20%" style="padding:0;">
													<div class="row d-flex justify-content-center">
														<label class="col-form-label">Hasil Skor</label>
													</div>
												</td>
											</tr>
											<tr>
												<td width="20%" style="padding:0;">
													<div class="row d-flex justify-content-center">
														<label class="col-form-label">Respon Buka Mata (Eye Opening : E)</label>
													</div>
												</td>
												<td width="30%" style="padding:0;">
													<table class="table-bordered table-condensed table-hover" width="100%">
														<tbody><tr onclick="dactranspasienex_setScore(4, 1);">
															<td width="100%" style="padding:0;">
																<label class="col-form-label">&nbsp;Spontan</label>
															</td>									
														</tr>

														<tr onclick="dactranspasienex_setScore(3, 1);">
															<td style="padding:0;">
																<label class="col-form-label">&nbsp;Terhadap Suara</label>
															</td>
														</tr>
														<tr onclick="dactranspasienex_setScore(2, 1);">
															<td style="padding:0;">
																<label class="col-form-label">&nbsp;Terhadap Nyeri</label>
															</td>
														</tr>
														<tr onclick="dactranspasienex_setScore(1, 1);">
															<td style="padding:0;">
																<label class="col-form-label">&nbsp;Tidak ada</label>
															</td>
														</tr>
													</tbody></table>
												</td>
												<td width="20%" style="padding:0;">
													<table class="table-bordered table-condensed table-hover" width="100%">
														<tbody><tr onclick="dactranspasienex_setScore(4, 1);">
															<td align="center" style="padding:0;">
																<label class="col-form-label">4</label>
															</td>
														</tr>
														<tr onclick="dactranspasienex_setScore(3, 1);">
															<td align="center" style="padding:0;">
																<label class="col-form-label">3</label>
															</td>
														</tr>
														<tr onclick="dactranspasienex_setScore(2, 1);">
															<td align="center" style="padding:0;">
																<label class="col-form-label">2</label>
															</td>
														</tr>
														<tr onclick="dactranspasienex_setScore(1, 1);">
															<td align="center" style="padding:0;">
																<label class="col-form-label">1</label>
															</td>
														</tr>
													</tbody></table>
												</td>
												<td width="20%">
													<table class="table-bordered table-condensed" width="100%">
														<tbody><tr height="100%" align="center">
															<td align="center" width="100%" style="padding:0;">
																<h3><label class="col-form-label" id="dactranspasien_bgcsa">0</label></h3>
															</td>
														</tr>
													</tbody></table>
												</td>
											</tr>
											<tr>
												<td width="30%" style="padding:0;">
													<div class="row d-flex justify-content-center">
														<label class="col-form-label">Respon Motorik Terbaik (M)</label>
													</div>
												</td>
												<td width="30%" style="padding:0;">
													<table class="table-bordered table-condensed table-hover" width="100%">
														<tbody><tr onclick="dactranspasienex_setScore(6, 2);">
															<td width="100%" style="padding:0;">
																<label class="col-form-label">&nbsp;Turut Perintah</label>
															</td>
														</tr>
														<tr onclick="dactranspasienex_setScore(5, 2);">
															<td style="padding:0;">
																<label class="col-form-label">&nbsp;Melokalisir Nyeri</label>
															</td>
														</tr>
														<tr onclick="dactranspasienex_setScore(4, 2);">
															<td style="padding:0;">
																<label class="col-form-label">&nbsp;Fleksi Normal (Menarik anggota gerak yang dirangsang)</label>
															</td>
														</tr>
														<tr onclick="dactranspasienex_setScore(3, 2);">
															<td style="padding:0;">
																<label class="col-form-label">&nbsp;Fleksi Abnormal (dekortikasi)</label>
															</td>
														</tr>
														<tr onclick="dactranspasienex_setScore(2, 2);">
															<td style="padding:0;">
																<label class="col-form-label">&nbsp;Ekstensi Abnormal (deserebrasi)</label>
															</td>
														</tr>
														<tr onclick="dactranspasienex_setScore(1, 2);">
															<td style="padding:0;">
																<label class="col-form-label">&nbsp;Tanpa Ada (Flasid)</label>
															</td>
														</tr>
													</tbody></table>
												</td>
												<td width="20%" style="padding:0;">
													<table class="table-bordered table-condensed table-hover" width="100%">
														<tbody><tr onclick="dactranspasienex_setScore(6, 2);">
															<td align="center" style="padding:0;">
																<label class="col-form-label">6</label>
															</td>
														</tr>
														<tr onclick="dactranspasienex_setScore(5, 2);">
															<td align="center" style="padding:0;">
																<label class="col-form-label">5</label>
															</td>
														</tr>
														<tr onclick="dactranspasienex_setScore(4, 2);">
															<td style="padding:0;" align="center">
																<label class="col-form-label">4</label>
															</td>
														</tr>
														<tr onclick="dactranspasienex_setScore(3, 2);">
															<td style="padding:0;" align="center">
																<label class="col-form-label">3</label>
															</td>
														</tr>
														<tr onclick="dactranspasienex_setScore(2, 2);">
															<td style="padding:0;" align="center">
																<label class="col-form-label">2</label>
															</td>
														</tr>
														<tr onclick="dactranspasienex_setScore(1, 2);">
															<td style="padding:0;" align="center">
																<label class="col-form-label">1</label>
															</td>
														</tr>
													</tbody></table>
												</td>
												<td width="20%">
													<table class="table-bordered table-condensed" width="100%">
														<tbody><tr height="100%">
															<td style="padding:0;" align="center">
																<h3><label class="col-form-label" id="dactranspasien_bgcsb">0</label></h3>
															</td>
														</tr>
													</tbody></table>
												</td>
											</tr>
											<tr>
												<td style="padding:0;" width="30%">
													<div class="row d-flex justify-content-center">
														<label class="col-form-label">Respon Verbal (V)</label>
													</div>
												</td>
												<td style="padding:0;" width="30%">
													<table class="table-bordered table-condensed table-hover" width="100%">
														<tbody><tr onclick="dactranspasienex_setScore(5, 3);">
															<td style="padding:0;">
																<label class="col-form-label">&nbsp;Berorientasi Baik</label>
															</td>
														</tr>
														<tr onclick="dactranspasienex_setScore(4, 3);">
															<td style="padding:0;">
																<label class="col-form-label">&nbsp;Berbicara mengacau (bingung)</label>
															</td>
														</tr>
														<tr onclick="dactranspasienex_setScore(3, 3);">
															<td style="padding:0;">
																<label class="col-form-label">&nbsp;Kata-Kata tidak teratur</label>
															</td>
														</tr>
														<tr onclick="dactranspasienex_setScore(2, 3);">
															<td style="padding:0;">
																<label class="col-form-label">&nbsp;Suara Tidak Jelas</label>
															</td>
														</tr>
														<tr onclick="dactranspasienex_setScore(1, 3);">
															<td style="padding:0;">
																<label class="col-form-label">&nbsp;Tanpa Ada</label>
															</td>
														</tr>
													</tbody></table>
												</td>
												<td style="padding:0;" width="20%">
													<table class="table-bordered table-condensed table-hover" width="100%">
														<tbody><tr onclick="dactranspasienex_setScore(5, 3);">
															<td style="padding:0;" align="center">
																<label class="col-form-label">5</label>
															</td>
														</tr>
														<tr onclick="dactranspasienex_setScore(4, 3);">
															<td style="padding:0;" align="center">
																<label class="col-form-label">4</label>
															</td>
														</tr>
														<tr onclick="dactranspasienex_setScore(3, 3);">
															<td style="padding:0;" align="center">
																<label class="col-form-label">3</label>
															</td>
														</tr>
														<tr onclick="dactranspasienex_setScore(2, 3);">
															<td style="padding:0;" align="center">
																<label class="col-form-label">2</label>
															</td>
														</tr>
														<tr onclick="dactranspasienex_setScore(1, 3);">
															<td style="padding:0;" align="center">
																<label class="col-form-label">1</label>
															</td>
														</tr>
													</tbody></table>
												</td>
												<td width="20%">
													<table class="table-bordered table-condensed" width="100%">
														<tbody><tr height="100%">
															<td style="padding:0;" align="center">
																<h3><label class="col-form-label" id="dactranspasien_bgcsc">0</label></h3>
															</td>
														</tr>
													</tbody></table>
												</td>
											</tr>
											<tr>
												<td colspan="3">
													<div class="form-group row">
														<div class="col-md-3">
															<label class="col-form-label" title="Kesadaran">Kesadaran</label>
														</div>
														<div class="col-md-6">
															<div class="input-group">
																<select name="asadar" id="dactranspasien_asadar" class="form-control">
																	<option value="1">Compos Mentis</option>
																	<option value="2">Apatis</option>
																	<option value="3">Somnolen</option>
																	<option value="4">Delirium</option>
																	<option value="5">Sopor</option>
																	<option value="6">Coma</option>
																</select>
															</div>
														</div>
													</div>
												</td>
												<td>
													<table class="table-bordered table-condensed" width="100%">
														<tbody><tr height="100%">
															<td style="padding:0;" align="center">
																<h3><label class="col-form-label" id="dactranspasien_bgcstot">0</label></h3>
															</td>
														</tr>
													</tbody></table>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Nyeri</label>
							</div>
							<div class="col-md-3" id="dactranspasien_cnyeriId">
								<div class="custom-control custom-checkbox custom-control-inline">
									<input name="dactranspasien_cnyeriId" value="1" type="radio" class="custom-control-input" id="dactranspasien_cnyeriId_1">
									<label class="custom-control-label" for="dactranspasien_cnyeriId_1">Tidak</label>
								</div>
								<div class="custom-control custom-checkbox custom-control-inline">
									<input name="dactranspasien_cnyeriId" value="2" type="radio" class="custom-control-input" id="dactranspasien_cnyeriId_2" checked>
									<label class="custom-control-label" for="dactranspasien_cnyeriId_2">Ya</label>
								</div>
							</div>
							<div class="col-md-2">
								<label class="col-form-label" id="dactranspasien_lnyeri">Skala Nyeri</label>
							</div>
							<div class="col-md-3">
								<select name="asadar" id="dactranspasien_nyeri" class="form-control">
									<option value="0">0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Risiko Jatuh</label>
							</div>
							<div class="col-md-9" id="dactranspasien_dcederahasilId">
								<div class="custom-control custom-checkbox custom-control-inline">
									<input name="dactranspasien_dcederahasilId" value="1" type="radio" class="custom-control-input" id="dactranspasien_dcederahasilId_1">
									<label class="custom-control-label" for="dactranspasien_dcederahasilId_1">Tidak Berisiko</label>
								</div>
								<div class="custom-control custom-checkbox custom-control-inline">
									<input name="dactranspasien_dcederahasilId" value="2" type="radio" class="custom-control-input" id="dactranspasien_dcederahasilId_2">
									<label class="custom-control-label" for="dactranspasien_dcederahasilId_2" checked>Risiko Rendah</label>
								</div>
								<div class="custom-control custom-checkbox custom-control-inline">
									<input name="dactranspasien_dcederahasilId" value="3" type="radio" class="custom-control-input" id="dactranspasien_dcederahasilId_3">
									<label class="custom-control-label" for="dactranspasien_dcederahasilId_3">Risiko Tinggi</label>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Terapi / Tindakan Medis Yang Sudah Diberikan</label>
							</div>
							<div class="col-md-8">
								<textarea rows="4" name="dactranspasien_cterapi" id="dactranspasien_cterapi" style="width:100%;" class="form-control"></textarea>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group row">
							<div class="col-md-12">
								<label class="col-form-label">Pemeriksaan Penunjang yang Sudah Dilakukan :</label>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">1. Laboratorium</label>
							</div>
							<div class="col-md-6" id="dactranspasien_plab">
								<div class="custom-control custom-checkbox custom-control-inline">
									<input onclick="document.getElementById('dactranspasien_div_plab').style.display='none'" name="dactranspasien_plab" value="0" type="radio" class="custom-control-input" id="dactranspasien_plab_1" checked>
									<label class="custom-control-label" for="dactranspasien_plab_1">Tidak</label>
								</div>
								<div class="custom-control custom-checkbox custom-control-inline">
									<input onclick="document.getElementById('dactranspasien_div_plab').style.display='block'" name="dactranspasien_plab" value="1" type="radio" class="custom-control-input" id="dactranspasien_plab_2">
									<label class="custom-control-label" for="dactranspasien_plab_2">Ya</label>
								</div>
							</div>
						</div>
						<div class="form-group row" id="dactranspasien_div_plab" style="display: none;">
							<div class="col-md-3"></div>
							<div class="col-md-3">
								<label class="col-form-label">DPJP Sudah Terinfo</label>
							</div>
							<div class="col-md-6" id="dactranspasien_plabterinfo">
								<div class="custom-control custom-checkbox custom-control-inline">
									<input name="dactranspasien_plabterinfo" value="1" type="radio" class="custom-control-input" id="dactranspasien_plabterinfo_1">
									<label class="custom-control-label" for="dactranspasien_plabterinfo_1">Tidak</label>
								</div>
								<div class="custom-control custom-checkbox custom-control-inline">
									<input name="dactranspasien_plabterinfo" value="2" type="radio" class="custom-control-input" id="dactranspasien_plabterinfo_2">
									<label class="custom-control-label" for="dactranspasien_plabterinfo_2">Ya</label>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">2. Radiologi</label>
							</div>
							<div class="col-md-6" id="dactranspasien_prad">
								<div class="custom-control custom-checkbox custom-control-inline">
									<input onclick="document.getElementById('dactranspasien_div_prad').style.display='none'" name="dactranspasien_prad" value="0" type="radio" class="custom-control-input" id="dactranspasien_prad_1" checked>
									<label class="custom-control-label" for="dactranspasien_prad_1">Tidak</label>
								</div>
								<div class="custom-control custom-checkbox custom-control-inline">
									<input onclick="document.getElementById('dactranspasien_div_prad').style.display='block'" name="dactranspasien_prad" value="1" type="radio" class="custom-control-input" id="dactranspasien_prad_2">
									<label class="custom-control-label" for="dactranspasien_prad_2">Ya</label>
								</div>
							</div>
						</div>
						<div class="form-group row" id="dactranspasien_div_prad" style="display: none;">
							<div class="col-md-3"></div>
							<div class="col-md-3">
								<label class="col-form-label">DPJP Sudah Terinfo</label>
							</div>
							<div class="col-md-6" id="dactranspasien_pradterinfo">
								<div class="custom-control custom-checkbox custom-control-inline">
									<input name="dactranspasien_pradterinfo" value="1" type="radio" class="custom-control-input" id="dactranspasien_pradterinfo_1">
									<label class="custom-control-label" for="dactranspasien_pradterinfo_1">Tidak</label>
								</div>
								<div class="custom-control custom-checkbox custom-control-inline">
									<input name="dactranspasien_pradterinfo" value="2" type="radio" class="custom-control-input" id="dactranspasien_pradterinfo_2">
									<label class="custom-control-label" for="dactranspasien_pradterinfo_2">Ya</label>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">3. EKG</label>
							</div>
							<div class="col-md-6" id="dactranspasien_pekg">
								<div class="custom-control custom-checkbox custom-control-inline">
									<input onclick="document.getElementById('dactranspasien_div_pekg').style.display='none'" name="dactranspasien_pekg" value="0" type="radio" class="custom-control-input" id="dactranspasien_pekg_1" checked>
									<label class="custom-control-label" for="dactranspasien_pekg_1">Tidak</label>
								</div>
								<div class="custom-control custom-checkbox custom-control-inline">
									<input onclick="document.getElementById('dactranspasien_div_pekg').style.display='block'" name="dactranspasien_pekg" value="1" type="radio" class="custom-control-input" id="dactranspasien_pekg_2">
									<label class="custom-control-label" for="dactranspasien_pekg_2">Ya</label>
								</div>
							</div>
						</div>
						<div class="form-group row" id="dactranspasien_div_pekg" style="display: none;">
							<div class="col-md-3"></div>
							<div class="col-md-3">
								<label class="col-form-label">DPJP Sudah Terinfo</label>
							</div>
							<div class="col-md-6" id="dactranspasien_pekgterinfo">
								<div class="custom-control custom-checkbox custom-control-inline">
									<input name="dactranspasien_pekgterinfo" value="1" type="radio" class="custom-control-input" id="dactranspasien_pekgterinfo_1">
									<label class="custom-control-label" for="dactranspasien_pekgterinfo_1">Tidak</label>
								</div>
								<div class="custom-control custom-checkbox custom-control-inline">
									<input name="dactranspasien_pekgterinfo" value="2" type="radio" class="custom-control-input" id="dactranspasien_pekgterinfo_2">
									<label class="custom-control-label" for="dactranspasien_pekgterinfo_2">Ya</label>
								</div>
							</div>
							<div class="col-md-3"></div>
							<div class="col-md-8 d-none">
								<textarea rows="2" name="dactranspasien_cpenunjangekg" id="dactranspasien_cpenunjangekg" style="width:100%;" class="form-control"></textarea>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">4. Lainnya</label>
							</div>
							<div class="col-md-6" id="dactranspasien_plain">
								<div class="custom-control custom-checkbox custom-control-inline">
									<input onclick="document.getElementById('dactranspasien_div_plain').style.display='none'" name="dactranspasien_plain" value="1" type="radio" class="custom-control-input" id="dactranspasien_plain_1" checked>
									<label class="custom-control-label" for="dactranspasien_plain_1">Tidak</label>
								</div>
								<div class="custom-control custom-checkbox custom-control-inline">
									<input onclick="document.getElementById('dactranspasien_div_plain').style.display='block'" name="dactranspasien_plain" value="2" type="radio" class="custom-control-input" id="dactranspasien_plain_2">
									<label class="custom-control-label" for="dactranspasien_plain_2">Ya</label>
								</div>
							</div>
						</div>
						<div class="form-group row" id="dactranspasien_div_plain" style="display: none;">
							<div class="col-md-3"></div>
							<div class="col-md-8">
								<textarea rows="2" name="dactranspasien_cpenunjanglain" id="dactranspasien_cpenunjanglain" style="width:100%;" class="form-control"></textarea>
							</div>
							<div class="col-md-3"></div>
							<div class="col-md-3">
								<label class="col-form-label">DPJP Sudah Terinfo</label>
							</div>
							<div class="col-md-6" id="dactranspasien_plainterinfo">
								<div class="custom-control custom-checkbox custom-control-inline">
									<input name="dactranspasien_plainterinfo" value="1" type="radio" class="custom-control-input" id="dactranspasien_plainterinfo_1">
									<label class="custom-control-label" for="dactranspasien_plainterinfo_1">Tidak</label>
								</div>
								<div class="custom-control custom-checkbox custom-control-inline">
									<input name="dactranspasien_plainterinfo" value="2" type="radio" class="custom-control-input" id="dactranspasien_plainterinfo_2">
									<label class="custom-control-label" for="dactranspasien_plainterinfo_2">Ya</label>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card "><!-- R (Recommendation) -->		
			<div class="card-header" style="background-color:black;">				
				<h3 class="card-title" style="color:white;">R (Recommendation)</h3>
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
								<label class="col-form-label">Konsul DPJP</label>
							</div>
							<div class="col-md-7">
								<select id="dactranspasien_ddokkon" name="ddokkon" class="form-control form-control-sm"></select>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">DPJP Sudah Terhubung</label>
							</div>
							<div class="row col-md-6" id="dactranspasien_dsambung">
								<div class="custom-control custom-checkbox custom-control-inline">
									<input onclick="document.getElementById('dactranspasien_div_dsambung1').style.display='none'" name="dactranspasien_dsambung" value="1" type="radio" class="custom-control-input" id="dactranspasien_dsambung_1" checked>
									<label class="custom-control-label" for="dactranspasien_dsambung_1">Tidak</label>
								</div>
								<div class="custom-control custom-checkbox custom-control-inline">
									<input onclick="document.getElementById('dactranspasien_div_dsambung1').style.display='block'" name="dactranspasien_dsambung" value="2" type="radio" class="custom-control-input" id="dactranspasien_dsambung_2">
									<label class="custom-control-label" for="dactranspasien_dsambung_2">Ya</label>
								</div>
							</div>
							<div class="col-md-2" id="dactranspasien_div_dsambung1" style="display:none;">
								<div class="input-group date" id="dactranspasien_djamsambung" data-target-input="nearest">
									<input id="dactranspasien_jamsambung" name="jamsambung" type="time" class="form-control form-control-sm" >
								</div>
							</div>
						</div>
						<div class="form-group row" id="dactranspasien_div_dsambung2" style="">
							<div class="col-md-3">
								<label class="col-form-label">&nbsp;</label>
							</div>
							<div class="row col-md-6" id="dactranspasien_dsambungpilih">
								<div class="custom-control custom-checkbox custom-control-inline">
									<input onclick="document.getElementById('dactranspasien_div_dsambungpilih').style.display='none'" name="dactranspasien_dsambungpilih" value="1" type="radio" class="custom-control-input" id="dactranspasien_dsambungpilih_1" checked>
									<label class="custom-control-label" for="dactranspasien_dsambungpilih_1">Telepon</label>
								</div>
								<div class="custom-control custom-checkbox custom-control-inline">
									<input onclick="document.getElementById('dactranspasien_div_dsambungpilih').style.display='none'" name="dactranspasien_dsambungpilih" value="2" type="radio" class="custom-control-input" id="dactranspasien_dsambungpilih_2">
									<label class="custom-control-label" for="dactranspasien_dsambungpilih_2">Whats App</label>
								</div>
								<div class="custom-control custom-checkbox custom-control-inline">
									<input onclick="document.getElementById('dactranspasien_div_dsambungpilih').style.display='block'" name="dactranspasien_dsambungpilih" value="3" type="radio" class="custom-control-input" id="dactranspasien_dsambungpilih_3">
									<label class="custom-control-label" for="dactranspasien_dsambungpilih_3">Lain-lain</label>
								</div>
							</div>
						</div>
						<div class="form-group row" id="dactranspasien_div_dsambungpilih" style="display:none;">
							<div class="col-md-3">
								<label class="col-form-label">&nbsp;</label>
							</div>
							<div class="col-md-8">
								<input type="text" class="form-control" id="dactranspasien_dsambungpilihket" maxlength="100">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Advis dari DPJP</label>
							</div>
							<div class="row col-md-6" id="dactranspasien_dadvis">
								<div class="custom-control custom-checkbox custom-control-inline">
									<input onclick="document.getElementById('dactranspasien_div_dadvis2').style.display='block'" name="dactranspasien_dadvis" value="0" type="radio" class="custom-control-input" id="dactranspasien_dadvis_1">
									<label class="custom-control-label" for="dactranspasien_dadvis_1">Sudah Ada</label>
								</div>
								<div class="custom-control custom-checkbox custom-control-inline">
									<input onclick="document.getElementById('dactranspasien_div_dadvis2').style.display='none'" name="dactranspasien_dadvis" value="1" type="radio" class="custom-control-input" id="dactranspasien_dadvis_2" checked>
									<label class="custom-control-label" for="dactranspasien_dadvis_2">Belum Ada</label>
								</div>
							</div>
							<div class="col-md-2" id="dactranspasien_div_dadvis1" style="display:none;">
								<div class="input-group date" id="dactranspasien_djamadvis" data-target-input="nearest">
									<input id="dactranspasien_jamadvis" name="jamadvis" type="time" class="form-control" >
									<div class="input-group-append" data-target="#dactranspasien_djamadvis" data-toggle="datetimepicker">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row" id="dactranspasien_div_dadvis2">
							<div class="col-md-3">
								<label class="col-form-label">&nbsp;</label>
							</div>
							<div class="col-md-8">
								<input type="text" class="form-control" id="dactranspasien_ketadvis" maxlength="100">
							 <!-- <textarea rows="2" th:name="${ccm+'_ketadvis'}" th:id="${ccm+'_ketadvis'}" 
							 	style="width:100%;" class="form-control"></textarea> -->
							 </div>
							</div>
							<div class="form-group row">
								<div class="col-md-3">
									<label class="col-form-label">Rencana Terapi</label>
								</div>
								<div class="col-md-8">
									<textarea rows="4" name="dactranspasien_drencanaterapi" id="dactranspasien_drencanaterapi" style="width:100%;" class="form-control"></textarea>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group row">
								<div class="col-md-3">
									<label class="col-form-label">Rencana Tindakan</label>
								</div>
								<div class="col-md-8">
									<textarea rows="4" name="dactranspasien_drencanatindakan" id="dactranspasien_drencanatindakan" style="width:100%;" class="form-control"></textarea>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-3">
									<label class="col-form-label">Hal-Hal Yang Diperhatikan</label>
								</div>
								<div class="col-md-8">
									<textarea rows="4" name="dactranspasien_dhal" id="dactranspasien_dhal" style="width:100%;" class="form-control"></textarea>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-3"></div>
								<div class="col-md-3"></div>
								<div class="col-md-3"></div>
								<div class="col-md-3" style="padding-block-start: 50px;">
									<button type="submit" class="btn btn-primary btn-lg me-md-2" id="" onclick="saveSerTerPas()" ><i class="fas fa-save"></i> Save</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">

		$(document).ready(function() {
			// var nowday = "<?php echo date('Y-m-d') ?>";
			// var data =document.getElementById('profilepasienirna').value;
			// if (data=='') {
			// 	$('#modallistpasienirna').modal('show');
			// }else{
			// 	var no_rm=	    document.getElementById('rmermirna').value ;
			// 	var nama = document.getElementById('namaermirna').value;
			// 	var unit = document.getElementById('unitermirna').value;
			// 	var id_kunjungan = document.getElementById('idKunjunganermirna').value;
			// 	var id_unit      = document.getElementById('idunitermirna').value;
			// 	var transaksi    = document.getElementById('transaksiermirna').value;
			// 	var alamat       = document.getElementById('alamatermirna').value;
			// 	var id_kunjungan = document.getElementById('profilepasienirna').value;
			// 	tampil_dok_all();
			// 	tampil_ruanganlama(id_kunjungan);			
			// 	tampil_spesial();
			// 	tampil_dok_awal(id_unit);
			// 	tampil_rawat_awal(id_unit);
			// 	viewtandavitalserahterima(no_rm,unit,id_kunjungan,id_unit,nama,transaksi);
			// }
			// document.getElementById('dactranspasien_atgl').value=nowday;


		})
		function tampilPasienermirna(no_rm,unit,id_kunjungan,id_unit,nama,transaksi,tgl_lahir,alamat,id_pegawai) {
			$('#modallistpasienirna').modal('hide');
			$('.tab-empty').hide();

			showDetailDataPasienIrna();
			document.getElementById('rmermirna').value          =no_rm;
			document.getElementById('namaermirna').value        =nama;
			document.getElementById('unitermirna').value        =unit;
			document.getElementById('idKunjunganermirna').value =id_kunjungan;
			document.getElementById('idunitermirna').value      =id_unit;
			document.getElementById('transaksiermirna').value   =transaksi;
			document.getElementById('alamatermirna').value      =alamat;
			document.getElementById('profilepasienirna').value  =id_kunjungan;
			data.namas    =nama;
			data.norms    =no_rm;
			data.units    =unit;
			data.id_units =id_unit;
			data.id_kunjungans=id_kunjungan;
			alamatpasien  =alamat;
			tgllahir      =tgl_lahir;
			tampil_dok_all();
			tampil_ruanganlama(id_kunjungan);			
			tampil_spesial();
			tampil_dok_awal(id_unit);
			tampil_rawat_awal(id_unit);
			viewtandavitalserahterima(no_rm,unit,id_kunjungan,id_unit,nama,transaksi);

		}
		function refresh_listserahterimapasien() {
			$('#listserahterimapasien_loadingawal').hide();
		}
		function listpasienermirna(){  
			var listParam = [
				'searchPxRmserahterimapasien'
				];
			var param = {
				user    : user['id_user'],
				norm    : document.getElementById('searchPxRmserahterimapasien').value,
	//nmpasien: document.getElementById('RWJERMnmlistermirna').value
			};
			apiPOST("Rekammedisirna/listpasien", param, hasil => {   
				$('#listserahterimapasien').html('');
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

						$('#listserahterimapasien').append(Baris);
						document.getElementById('searchPxRmserahterimapasien').value = '';
					}else{
						var Baris = "";
						var a = hasil['data'];
						for (var i = 0; i < a.length; i++) {
							var tglkunj   = a[i].tgl_masuk;
							var transaksi   = a[i].id_transaksi;
							var norm      = a[i].no_rm;
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

							Baris += '<div class="col-lg-3 col-6">';
							if (soap>''){
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
							Baris += '<a href="#" class="small-box-footer" style="background-color: darkgreen;" onclick="tampilserahterimaermirna('+"'"+norm+"','"+unit+"','"+kunjungan+"','"+id_unit+"','"+nama+"','"+transaksi+"','"+tgl_lahir+"','"+alamat+"'"+')">Klik Detail <i class="fas fa-arrow-circle-right"></i></a>';
							Baris += '</div>';
							Baris += '</div>';
						}
						$('#listserahterimapasien').append(Baris);
					}       
				}
			});  
		};
		function tampilserahterimaermirna(norm,unit,id_kunjungan,id_unit,nama,transaksi,tgl_lahir,alamat) {
			document.getElementById('divserahterima').style.display='block';
		//document.getElementById('infopasienirna').style.display='block';
			document.getElementById('Divcardlistserahterimapasien').style.display='none';
			document.getElementById('listserahterimapasien').style.display='none';
			document.getElementById('dactranspasien_id').value      	=norm;
			document.getElementById('dactranspasien_mt').value          =transaksi;
			document.getElementById('dackunjunganpasien_mt').value      =id_kunjungan;
			tampil_ruanganlama(id_kunjungan);			
			tampil_spesial();
			tampil_dok_awal(id_unit);
			tampil_rawat_awal(id_unit);
			viewtandavitalserahterima(norm,unit,id_kunjungan,id_unit,nama,transaksi);

		}

		function tampil_spskamar() {
			apiPOST('Data_Sosial/spesialisasikamar', null, hasil => {
				var sps = "<option value=''> Pilih Spesialisasi </option>";
				var a = hasil['data'];
				for (var i = 0; i < a.length; i++) {
					sps += '<option value="' + a[i]['id_spesialisasi_kamar'] + '">' + a[i]['nama_spesialisasi_kamar'] + '</option>';
				}
				document.getElementById('rwi_sps_kam').innerHTML = sps;
			});
		}
		function tampil_ruanganlama(id_kunjungan){
			apiPOST('Rekammedisirna/Ruangan', id_kunjungan, hasil => {
				var ruang = "";
				var a = hasil['data'];
				for (var i = 0; i < a.length; i++) {
					ruang += '<option value="' + a[i]['id_unit'] + '">' + a[i]['nama_kamar'] + '</option>';
				}
				document.getElementById('dactranspasien_aruang1').innerHTML = ruang;
			})
		}
		function tampil_spesial(){
			apiPOST('Setup/getSpesialisasi', null, hasil => {
				var ruang = "<option value=''> - Silahkan Pilih -</option>";
				var a = hasil['data'];
				for (var i = 0; i < a.length; i++) {
					ruang += '<option value="' + a[i]['id_spesialisasi_kamar'] + '">' + a[i]['nama_spesialisasi_kamar'] + '</option>';
				}
				document.getElementById('serahterima_sps_kam').innerHTML = ruang;
			})
		}
		function tampil_serahterimarwiunit() {
			var param = {
				id: $("#serahterima_sps_kam").val(),

			};
			apiPOST('Data_Sosial/unitsps', param, hasil => {
				var unit = "<option value=''> *Pilih </option>";
				var a = hasil['data'];
				for (var i = 0; i < a.length; i++) {
					unit += '<option value="' + a[i]['id_unit'] + '">' + a[i]['nama_unit'] + '</option>';
				}
				document.getElementById('rwiserahterimakd_unit').innerHTML = unit;
			});
		}
		function tampil_rwiserahterimaruang() {
			var param = {
				id: $("#rwiserahterimakd_unit").val(),
				id2: $("#serahterima_sps_kam").val(),
			};
			apiPOST('Data_Sosial/ruangsps', param, hasil => {
				var ruang = "<option value=''> *Pilih </option>";
				var a = hasil['data'];
				for (var i = 0; i < a.length; i++) {
					ruang += '<option value="' + a[i]['id_ruang'] + '">' + a[i]['nama_ruang'] + '</option>';
				}
				document.getElementById('rwiserahterimatr_ruang').innerHTML = ruang;
				tampil_dok_akhir($("#rwiserahterimakd_unit").val());
				tampil_rawat_akhir($("#rwiserahterimakd_unit").val());
			});
		}
		function tampil_rwiserahterimakamar() {
			var param = {
				id: $("#rwiserahterimatr_ruang").val(),
				id_unit: $("#rwiserahterimakd_unit").val(),
			};
			apiPOST('Data_Sosial/kamarsps', param, hasil => {
				var kamar = "<option value=''> *Pilih </option>";
				var a = hasil['data'];
				for (var i = 0; i < a.length; i++) {
					kamar += '<option value="' + a[i]['id_kamar'] + '">' + a[i]['nama_kamar'] + '  ( ' + a[i]['sisa'] + ' )</option>';
				}
				document.getElementById('serahterimaid_kamar').innerHTML = kamar;
			});
		}
		$('#serahterimaid_kamar').on('change', function() {
			var id_kamar = ($(this).find(":selected").val());
			var param = {
				id: id_kamar,
			};
			apiPOST('Rawat_inap/cekketersediaankamar', param, hasil => {
				var ruang = "";
				var a = hasil['data'];
				for (var i = 0; i < a.length; i++) {
					if (a[i]['sisa'] <= 0) {
						tampil_rwipendfkamar();
						alert('Kamar Penuh' + a[i]['sisa']);
					}
				}
  // document.getElementById('rwipendftr_ruang').innerHTML = ruang;
			});
		});

		function tampil_rawat_awal(param){
			apiPOST('Rekammedisirna/searchPerawat', param, hasil => {
				var sus = "<option value=''> - Silahkan Pilih -</option>";
				var a = hasil['data'];
				for (var i = 0; i < a.length; i++) {
					sus += '<option value="' + a[i]['id_pegawai'] + '">' + a[i]['nama_pegawai'] + '</option>';
				}
				document.getElementById('dactranspasien_apj1Id').innerHTML = sus;
			})
		}
		function tampil_rawat_akhir(param){
			apiPOST('Rekammedisirna/searchPerawat', param, hasil => {
				var sus = "<option value=''> - Silahkan Pilih -</option>";
				var a = hasil['data'];
				for (var i = 0; i < a.length; i++) {
					sus += '<option value="' + a[i]['id_pegawai'] + '">' + a[i]['nama_pegawai'] + '</option>';
				}
				document.getElementById('dactranspasien_apj2Id').innerHTML = sus;
			})
		}
		function tampil_dok_awal(param){
			apiPOST('Rekammedisirna/searchDokter', param, hasil => {
				var dok = "<option value=''> - Silahkan Pilih -</option>";
				var a = hasil['data'];
				for (var i = 0; i < a.length; i++) {
					dok += '<option value="' + a[i]['id_pegawai'] + '">' + a[i]['nama_pegawai'] + '</option>';
				}
				document.getElementById('dactranspasien_dok1Id').innerHTML = dok;
			})
		}
		function tampil_dok_akhir(param){
			apiPOST('Rekammedisirna/searchDokter', param, hasil => {
				var dok = "<option value=''> - Silahkan Pilih -</option>";
				var a = hasil['data'];
				for (var i = 0; i < a.length; i++) {
					dok += '<option value="' + a[i]['id_pegawai'] + '">' + a[i]['nama_pegawai'] + '</option>';
				}
				document.getElementById('dactranspasien_dok2Id').innerHTML = dok;
			})
		}
		function tampil_dok_all(){
			apiPOST('Setup/getDokter', null, hasil => {
				var dok = "<option value=''> - Silahkan Pilih -</option>";
				var a = hasil['data'];
				for (var i = 0; i < a.length; i++) {
					dok += '<option value="' + a[i]['id_pegawai'] + '">' + a[i]['nama_pegawai'] + '</option>';
				}
				document.getElementById('dactranspasien_ddokkon').innerHTML = dok;
			})
		}

		function dactranspasienex_setScore(a, b){
			switch(b){
			case 1:
				document.getElementById('dactranspasien_bgcsa').innerHTML=a;
				break;
			case 2:
				document.getElementById('dactranspasien_bgcsb').innerHTML=a;
				break;
			case 3:
				document.getElementById('dactranspasien_bgcsc').innerHTML=a;
				break;
			default:
			}
			hitungserahtrima();
		}
		function hitungserahtrima() {
			var a=document.getElementById('dactranspasien_bgcsa').innerHTML;
			var b=document.getElementById('dactranspasien_bgcsb').innerHTML;
			var c=document.getElementById('dactranspasien_bgcsc').innerHTML;

			total=parseInt(a) + parseInt(b) + parseInt(c);
			document.getElementById('dactranspasien_bgcstot').innerHTML=total;
		}


	</script>
