<div class="col-md-12 p-2">
    <div class="card card-outline card-danger">
		<div class="overlay-wrapper" id="loading_hasilLab">
			<div class="overlay">
			<i class="fas fa-3x fa-sync-alt fa-spin"></i>
			</div>
		</div>
		<div id="carihasilLab" class="card-body p-2 darkgrey-custom">
			<div class="row row-custom" >
				<div class="col-sm-auto">
					<div class="form-group">
						<label>Cari No. RM :</label>
						<input type="search" class="form-control form-control-xs" placeholder="Entry RM..." id="norm_hasil_lab" onkeypress="carihasilbyrm(event)" autocomplete="off" >
					</div>
				</div>
				<div class="col-sm-auto">
					<div class="form-group">
						<label> Tgl Rencana:</label>
						<input type="date" class="form-control form-control-xs" placeholder="" id="tgl_renc_hasil_lab" onkeypress="carihasilbytglrenc(event)" autocomplete="off">
					</div>
				</div>	
				<div class="col-sm-auto">
					<div class="form-group">
						<label> Tgl Lab:</label>
						<input type="date" class="form-control form-control-xs" placeholder="" id="tgl_kunj_hasil_lab" onkeypress="carihasilbytglkunj(event)"  autocomplete="off">
					</div>
				</div>
				<div class="col-sm-auto">
					<div class="form-group">
						<button class="btn btn-dark" style="margin-top: 10px;" onclick="loadAwalhasilLab()">Cari</button>
					</div>
				</div>
			</div>
		</div>
		<div id="hasilLab0" class="card-body p-2">
			<table
				id="tablehasilLabOrder"
				data-pagination="true"
				data-header-style="headerStyleOrderhasilLab"
				data-row-style="rowStyleOrderhasilLab"				
				data-search-on-enter-key="true"
				data-show-jump-to="true">
				<thead>
				  <tr>
					<th data-field="no_rm">No. RM</th>
					<th data-field="nama">Nama</th>
					<!-- <th data-field="nama">Nama Unit</th> -->
					<th data-formatter="nama_gol_unit_hsl">Nama Unit</th>
					<th data-field="nama_penjamin">Nama Penjamin</th>
					<th data-field="tgl_rencana_lab">Tanggal Rencana</th>
					<th data-field="tgl_masuk">Tanggal Kunjungan</th>
				  </tr>
				</thead>
			</table>
		</div>
		<div id="hasilLab1" class="card m-1 collapse">
			<div class="card-body p-2">
				<div class="row">
					<div class="col-sm-3" >
						<div class="row row-style">
							<div class="col-sm-2">
								<label for="">No. RM</label>
							</div>
							<div class="col-sm-auto">:</div>
							<div class="col-sm-auto">							
							<input type="text"  id="no_rm_hasil_lab" class="form-control form-control-xs" disabled><br/>
							</div>
						</div>
						<div class="row row-style">
							<div class="col-sm-2">
								<label>Nama</label>
							</div>
							<div class="col-sm-auto">:</div>
							<div class="col-sm-auto">							
								<input type="text"  id="nama_hasil_lab" class="form-control form-control-xs" disabled><br/>
							</div>
						</div>
						<div class="row row-style">
							<div class="col-sm-2">
								<label for="">Alamat</label>
							</div>
							<div class="col-sm-auto">:</div>
							<div class="col-sm-auto">
								<input type="text"  id="alamat_hasil_lab" class="form-control form-control-xs" disabled><br/>
							</div>
						</div>
						<div class="row row-style">
							<div class="col-sm-2">
								<label for="">Rincian Order</label>
							</div>
							<div class="col-sm-auto">:</div>
							<div class="col-sm-auto" id="produk_hasil_lab">
								<!-- <input type="text"  id="produk_hasil_lab" class="form-control form-control-xs" disabled><br/> -->
							</div>
						</div>
					</div>
					<div class="col-sm-3" >
						<div class="row row-style">
							<div class="col-sm-2">
								<label>Tanggal Lahir</label>
							</div>
							<div class="col-sm-auto">:</div>
							<div class="col-sm-auto">
								<input type="text"  id="tgl_lahir_hsl_lab" class="form-control form-control-xs" disabled>
							</div>
						</div>
						<div class="row row-style">
							<div class="col-sm-2">
								<label for="">Tanggal Rencana</label>
							</div>
							<div class="col-sm-auto">:</div>
							<div class="col-sm-auto">							
								<input type="text"  id="tgl_renc_hsl_rad" class="form-control form-control-xs" disabled><br/>
							</div>
						</div>
						<div class="row row-style">
							<div class="col-sm-2">
								<label for="">Tanggal Masuk</label>
							</div>
							<div class="col-sm-auto">:</div>
							<div class="col-sm-auto">							
								<input type="text"  id="tgl_masuk_hsl_rad" class="form-control form-control-xs" disabled><br/>
							</div>
						</div>
						<div class="row row-style">
							<div class="col-sm-2">
								<label> Pilih Penjamin</label>	
							</div>
							<div class="col-sm-auto">:</div>
							<div class="col-sm-auto">							
								<select class="form-control form-control-xs" name="listPenjhslLab" id="listPenjhslLab" readonly>
								</select>
							</div>
						</div>
					</div>
					<div class="col-sm-4" >
						<div class="row row-style">
							<div class="col-sm-3">
								<label> Kamar</label>
							</div>
							<div class="col-sm-auto"></div>
							<div class="col-sm-auto">
								<input type="text"  id="kamarhslRad" class="form-control form-control-xs" disabled><br/>
							</div>
						</div>
						<div class="row row-style">
							<div class="col-sm-3">
								<label for="">Unit Asal</label>
							</div>
							<div class="col-sm-auto"></div>
							<div class="col-sm-auto">
								<input type="text"  id="nma_unit_hsl_rad" class="form-control form-control-xs" disabled><br/>
							</div>
						</div>
						<div class="row row-style">
							<div class="col-sm-3">
								<label>Dokter Pembaca</label>								
							</div>
							<div class="col-sm-auto"></div>
							<div class="col-sm-auto">
								<select class="form-control form-control-xs" name="dokterhslLab_baca" id="dokterhslLab_baca" readonly></select><br>
							</div>
						</div>
						<div class="row row-style">
							<div class="col-sm-3">
								<label>Dokter Pengirim</label>
							</div>
							<div class="col-sm-auto"></div>
							<div class="col-sm-auto">								
								<select class="form-control form-control-xs" name="dokterhslLab_kirim" id="dokterhslLab_kirim" readonly></select><br/>
							</div>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="row row-style">
							<div class="col-sm-auto" ></div>
							<div class="col-sm-auto" style="margin-inline-start: 25px;">
								<button class="btn btn-danger" type="button" onclick="closehasilLab();">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<div class="row row-style" style="margin-block-start: 27px;"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6" >
						<div class="col-sm-auto" id="">
							<label for="">Catatan Dokter : </label>
						</div>
						<div class="row row-style">
							<textarea rows="5" cols="75" name="" id="catat_hasil_lab" style="margin-left: 15px;"></textarea><br>
						</div>
					</div>
				</div>
				<div class="row" style="margin-block-start: 10px;"></div>
				<div class="row" >
					<div class="col-sm-12" id="">
						<div class="row" >
							<label for="" style="padding-left: 10px;">Hasil Laboratorium : </label>
						</div>
						<div class="row" >
							<div class="col-sm-12" id="">
								<table
									id="tableInphasilLab"
									class="table table-striped table-sm choose"
									data-header-style=""
									data-row-style="">
									<thead>
									  <tr>
										<th data-field="no">No.</th>
										<th data-field="nama_produk">Nama Produk</th>
										<!-- <th data-formatter="nama_indikator_hasil">Nama Indikator</th> -->
										<th data-field="nama_indikator_hasil">Nama Indikator</th>
										<!-- <th data-formatter="satuan_indikator_hasil">Indikator</th> -->
										<th data-field="satuan_indikator_hasil">Indikator</th>
										<th data-field="hasil" data-formatter="nameFormatter">Hasil</th>
										<th data-formatter="nilnor">Normal</th>
										<!-- <th data-field="nilai_hasil_normal">Normal</th> -->
										<th data-formatter="chekhasillab">Abnormal</th>
									  </tr>
									</thead>
								</table>
							</div>
						</div>
						<div class="col-sm-3" id="divSavehasilLab">
							<button id="SavehasilLab" type="button" class="btn btn-primary" onclick="savehasilLab()">Save</button>
							<button id="printhasillab" type="button" class="btn btn-primary collapse" onclick="printhasilLab()">Print</button>
							<button id="edithasillab" type="button" class="btn btn-warning collapse" onclick="edithasilLab()">Edit</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>

<script>
var nowday      = "<?php echo date('Y-m-d'); ?>";
var tablehasilLabOrder = $('#tablehasilLabOrder');
var tableInphasilLab = $('#tableInphasilLab');
var produkLab;
var pjg;
var id_indikator_hsl=[];
var nilnorm=[];
var id_kunjungan_lab;
var no_lab_lis;
var hasilclient;
var edithasil_lab;
var user= JSON.parse(localStorage['data_user']);
var id_user=user.id_pegawai;
var replaced='';

	
	tablehasilLabOrder.bootstrapTable({
		onDblClickRow: function (row, $element, field) {
			var parampenj={
				no_rm : row['no_rm'],
				id_transaksi: row['id_transaksi']
			}
			// $('#loading_hasilLab').show();
			$("#hasilLab0").hide();			
			$("#hasilLab1").show();
						
			document.getElementById('no_rm_hasil_lab').value = row['no_rm'];
			document.getElementById('nama_hasil_lab').value = row['nama'];
			document.getElementById('produk_hasil_lab').innerHTML='';
			document.getElementById('tgl_masuk_hsl_rad').value=row['tgl_masuk'];
			document.getElementById('alamat_hasil_lab').value=row['alamat'];
			document.getElementById('tgl_lahir_hsl_lab').value=row['tgl_lahir'];			
			document.getElementById('dokterhslLab_baca').innerHTML='<option value="'+row['dok_baru']+'">'+row['nama_baru']+'</option>';
			id_kunjungan_lab=row['kunj_baru'];
			no_lab_lis=row['no_lab_lis'];
			produkLab=row['order_produk'];
			
			listPeriksaLab();
			if(row['catatan']!=null){
				replaced = row['catatan'].replaceAll('&#10;', '\n').replaceAll('&#13;', '\r');
			}
			
			// replaced= row['catatan'];
			document.getElementById('catat_hasil_lab').value=replaced;
			
			if(row['kunj_lama']==null){
				document.getElementById('nma_unit_hsl_rad').value='-';
				document.getElementById('kamarhslRad').value='-';
				document.getElementById('dokterhslLab_kirim').innerHTML='<option value="0">-</option>';document.getElementById('tgl_renc_hsl_rad').value='-';
			}else{
				document.getElementById('nma_unit_hsl_rad').value=row['nama_unit'];
				document.getElementById('kamarhslRad').value=row['nama_kamar'];
				document.getElementById('dokterhslLab_kirim').innerHTML='<option value="'+row['dok_lama']+'">'+row['nama_lama']+'</option>';
				document.getElementById('tgl_renc_hsl_rad').value=row['tgl_rencana_lab'];
			}
			
			apiPOST('Lab/listPenjamnLab', parampenj,hasil=>{
				var penjm = hasil['data'];
				var penjamin = '';
								
				if (hasil !==null){				
					for (var i = 0; i < hasil['data'].length; i++) {					 
					  if (penjm.nama_penjamin="UMUM"){ 
						  penjm = hasil['data'][i];
						  penjamin +='<option value="'+penjm.id_penjamin+'" selected>'+penjm.nama_penjamin+'</option>';
						  document.getElementById('listPenjhslLab').innerHTML= penjamin;
					  }else{
						  penjm = hasil['data'][i];						 
						  penjamin +='<option value="'+penjm.id_penjamin+'">'+penjm.nama_penjamin+'</option>';
						  document.getElementById('listPenjhslLab').innerHTML= penjamin;
					  }				
					}	
				}		
			});
			
 			apiPOST("Lab/Connect", null, hasil => { 				
				var param2={
					token: hasil['data'],
					no_lab:no_lab_lis //-20240110059-20240110369-20240310058
				}
				apiPOST("Lab/getHasilclient", param2, hasil => {
				 	if(hasil['data']==null){
				 		// console.log('hsl lom d save k db');
				 		setTimeout(refresh_hasil_lab, 1500);
				 		pertanyaan.fire({
				 			title:'Peringatan',
				 			html:'<p>Hasil Masih Di Verifikasi</p>',
				 			icon:'error',
				 			showCancelButton:false,
				 			reverseButtons:false,
				 			allowOutsideClick:false,
				 		}).then((result)=>{
				 			if(result.isConfirmed){/*closehasilLab()*/}else if(result.dismiss===Swal.DissmissReason.cancel){}
						})
				 	}else{
				 		var str='';
				 		hasilclient=hasil['data']['pemeriksaan'];
				 		hasilcatatlaboran=hasil['data']['order']['catatan']['analis'];
				 		hasilcatatdokter=hasil['data']['order']['catatan']['pk'];
				 		hasilcatatkritis=hasil['data']['order']['catatan']['kritis'];
				 		hasilcatat="Analis : "+hasilcatatlaboran+"&#13;&#10;Dokter : "+hasilcatatdokter+"&#13;&#10;Kritis : "+hasilcatatkritis
				 		produkLab2='';
				 		setTimeout(refresh_hasil_lab, 1500);
				 		// console.log('tuh ada');
						
				 		apiPOST('Lab/getProdhasil', id_kunjungan_lab,hasil=>{
				 			var b = hasil['data'];
				 			pjg = b.length;
				 			for(i=0;i<hasil['data'].length;i++){
				 				str+="'"+hasil['data'][i].id_produk+"',";
				 			}
				 			str=str.slice(0, -1);
				 			produkLab2= '('+str+')';
					
				 			var param={
				 				order_produk:produkLab2,
				 				id_kunjungan_lab:id_kunjungan_lab
				 			}
							
				 			apiPOST('Lab/getHasilProdLab', param,hasil=>{
				 				tableInphasilLab.bootstrapTable('removeAll');
				 				id_indikator_hsl=[];
				 				nilnorm=[];
				 				var a=hasil['data'][0].hasil;
				 				var data=hasil['data'];
				 				if(a!==null && a!== undefined){
								tableInphasilLab.bootstrapTable('append', hasil['data']);
									
				 					$("#divSavehasilLab").show();
				 					for(i=1;i<=hasil['data'].length;i++){
				 						$('#inputcheck'+[i]).prop( "disabled", true );
				 						if(hasil['data'][i-1].abnormal=='t'){
				 							$('#inputcheck'+[i]).prop( "checked", true );
				 						}else{
				 							$('#inputcheck'+[i]).prop( "checked", false );
				 						}
				 					}
				 				}else{
				 					console.log('ini nge-save');
				 					pertanyaan.fire({
				 						title:'Peringatan',
				 						html:'<p>Hasil LIS Belum di Simpan</p><p>Apakah Anda Ingin Menyimpan ?</p>',
				 						icon:'info',
				 						showCancelButton:false,
				 						reverseButtons:false,
				 						allowOutsideClick:false,
				 					}).then((result)=>{
				 						if(result.isConfirmed){
				 							// closehasilLab();
				 							var param2={
				 								id_kunjungan_lab:row['kunj_baru'],
				 								pemeriksaan:hasilclient,
				 								user:id_user,
				 								catatan:hasilcatat
				 							}
				 							apiPOST('Lab/saveHasilLISLab', param2,hasil=>{
												apiPOST('Lab/getHasilProdLab', param,hasil=>{
													$("#SavehasilLab").hide();
												
									 				tableInphasilLab.bootstrapTable('removeAll');
									 				id_indikator_hsl=[];
									 				nilnorm=[];									 				
									 				var data2=hasil['data'];
													tableInphasilLab.bootstrapTable('append', hasil['data']);
													for(i=1;i<=hasil['data'].length;i++){
														$('#inputcheck'+[i]).prop( "disabled", true );
														if(hasil['data'][i-1].abnormal=='t'){
															$('#inputcheck'+[i]).prop( "checked", true );
														}else{
															$('#inputcheck'+[i]).prop( "checked", false );
														}
													}
												})
				 							})
				 						}else if(result.dismiss===Swal.DissmissReason.cancel){}
				 					})
				 				}
				 			})
				 		})
				 	}
				 })
			})
		}
	});
	
	tableInphasilLab.bootstrapTable({});
	
	$(document).ready(function() {
	  setTimeout(refresh_hasil_lab, 1000); 
	  document.getElementById('tgl_kunj_hasil_lab').value = nowday;
	  // document.getElementById('tgl_kunj_hasil_lab').value = nowday;
	})
	
	function headerStyleOrderhasilLab(column){
        return {
            css: {
                background: 'rgb(40 159 32 / 39%)',
                color: 'black',
                border: '2px solid black'
            }
        };
    }
    
    function rowStyleOrderhasilLab(row, index){
        return {
            css: {
                background: 'white',
                border: '2px solid black'
            }
        };
    }
	
	function nameFormatter(value,row) {
		if(row.hasil!==null && row.hasil !== undefined){
			$('#printhasillab').show();
			$('#edithasillab').show();
			// console.log('sudah d isi');
			if(row.hasil!=null){
				replaced = row.hasil.replaceAll('&lt;', '<').replaceAll('&gt;', '>');
			}
			return '' + replaced + '';		
		}
		return '<input type="text" name="inputhasil" id="input' +row.no+ '"/>'
	}
	
	function chekhasillab(value,row) {
		return '<input type="checkbox" name="inputcheckhasil" id="inputcheck' +row.no+ '"/>'
	}
	
	function nilnor(value,row) {
		if(row.nilai_hasil_normal!==null && row.nilai_hasil_normal !== undefined){
			return '' + row.nilai_hasil_normal + '';		
		}
		return '' + hasilclient[row.no-1].nilnor + ''
	}
	
	function nama_gol_unit_hsl(value,row){
		if(row.id_unit==null){
			return 'Umum';
		}else if(row.id_unit.charAt(0)==1){
			return 'Rawat Jalan';		
		}else if(row.id_unit.charAt(0)==2){
			return 'Rawat Inap';
		}else{
			return 'IGD Umum';
		}
	}
	
	function carihasilbyrm(e){
		if (e.keyCode == 13) {
			var param={
			norm: $("#norm_hasil_lab").val(),
		};			
			loadAwalhasilLab();
		}
	}
	
	function carihasilbytglrenc(e){
		if (e.keyCode == 13) {
			var param={
			tgl_renc: $("#tgl_renc_hasil_lab").val(),
		};			
			loadAwalhasilLab();
		}
	}
	
	function carihasilbytglkunj(e){
		if (e.keyCode == 13) {
			var param={
			tgl_kunj: $("#tgl_kunj_hasil_lab").val(),
		};			
			loadAwalhasilLab();
		}
	}
	
	function loadAwalhasilLab(){
		$('#hasilLab1').hide();
		$('#hasilLab0').show();
		$('#loading_hasilLab').show();
		$('#printhasillab').hide();
		$('#edithasillab').hide();
		
		$('#tablehasilLabOrder').bootstrapTable('removeAll');
		document.getElementById('catat_hasil_lab').value='';
		
        var param={
			norm: $("#norm_hasil_lab").val(),
			tgl_renc: $("#tgl_renc_hasil_lab").val(),
			tgl_kunj: $("#tgl_kunj_hasil_lab").val(),
		};
		var b;
        apiPOST("Lab/getHasilLab", param, hasil => {
            if(hasil !== null){
				b = hasil['data']
				// listDaftrRad.push(b);
                tablehasilLabOrder.bootstrapTable('append', hasil['data']);
            }
        }).then(refresh_hasil_lab());

		// console.log(param);
    }
	
	function listProdhasilLab(){
		apiPOST('Lab/getListprodukLab', produkLab,hasil=>{
			var nama_prod = '';
			if (hasil !==null){				
				for (var i = 0; i < pjg; i++) {
					nama_prod = hasil['data'][i].nama_produk;						
					baris = '<label><u>'+nama_prod+'</u></label><br>';
					$('#produk_hasil_lab').append(baris);
				}
			}
		});
	}
	
	function listPeriksaLab(){
		var str='';
		produkLab='';
		
		apiPOST('Lab/getProdhasil', id_kunjungan_lab,hasil=>{
			var b = hasil['data'];
			pjg = b.length;
			for(i=0;i<hasil['data'].length;i++){
				str+="'"+hasil['data'][i].id_produk+"',";
			}
			str=str.slice(0, -1);
			produkLab= '('+str+')';
			
			var param={
				order_produk:produkLab,
				id_kunjungan_lab:id_kunjungan_lab
			}
			
			apiPOST('Lab/getHasilProdLab', param,hasil=>{
				tableInphasilLab.bootstrapTable('removeAll');
				id_indikator_hsl=[];
				nilnorm=[];
				var a=hasil['data'][0].hasil;
				var data=hasil['data'];
				tableInphasilLab.bootstrapTable('append', hasil['data']);
				
				for(i=0;i<hasil['data'].length;i++){
					id_indikator_hsl.push(hasil['data'][i].id_indikator_hasil);
					nilnorm.push(hasil['data'][i].nilai_hasil_normal);
				}

				if(a!==null && a!== undefined){
					$("#SavehasilLab").hide();
					$("#printhasillab").show();
					$("#edithasillab").show();
					for(i=1;i<=hasil['data'].length;i++){
						$('#inputcheck'+[i]).prop( "disabled", true );
						if(hasil['data'][i-1].abnormal=='t'){
							$('#inputcheck'+[i]).prop( "checked", true );
						}else{
							$('#inputcheck'+[i]).prop( "checked", false );
						}
					}
					// console.log('udah isi');
				}else{
					// console.log('kosong');
					$("#SavehasilLab").show();
					$("#printhasillab").hide();
					$("#edithasillab").hide();
					for(i=1;i<=hasil['data'].length;i++){
						$('#inputcheck'+[i]).prop( "disabled", false );
					}
					/* apiPOST('Lab/Verifikator', id_user,hasil=>{
						if((hasil['data'][0]!==null && hasil['data'][0]!== undefined) || id_user==155){
							$("#SavehasilLab").show();
							$("#printhasillab").show();
							$("#edithasillab").show();
							for(i=1;i<=hasil['data'].length;i++){
								$('#inputcheck'+[i]).prop( "disabled", false );
							}
						}else{
							pertanyaan.fire({
								title:'Akses Ditolak',
								html:'<p>Hasil Belum Diisi</p>',
								icon:'error',
								showCancelButton:false,
								reverseButtons:false,
								allowOutsideClick:false,
							}).then((result)=>{
								if(result.isConfirmed){closehasilLab()}else if(result.dismiss===Swal.DissmissReason.cancel){}
							})	
						}
					}) */
				}
			})
		listProdhasilLab();
		});
	}

	function closehasilLab(){
		var param={
			norm: $("#no_rm_hasil_lab").val(),
			tgl_renc: $("#tgl_renc_hasil_lab").val(),
		};
		loadAwalhasilLab();
	}
	
	function closehasilLab(){
		$('#popupblmbca').modal("hide");
		loadAwalhasilLab();
	}
	
	function savehasilLab(){
		var str=[];
		var chk=[];
		pjg=tableInphasilLab.bootstrapTable('getData').length;
		for(i=1;i<=pjg;i++){
			if($('#inputcheck'+[i]).is(":checked")){
				cek=1;
			}else{
				cek=0;
			}
			str.push($('#input'+[i]).val());
			chk.push(cek);
		}
		
		var param={
			hasil_pembacaan: str,
			id_kunjungan_lab:id_kunjungan_lab,
			id_indikator_hasil:id_indikator_hsl,
			nilai_hasil_normal:nilnorm,
			user:id_user,
			catatan:$("#catat_hasil_lab").val(),
			check:chk
		};
		
		apiPOST('Lab/saveHasilLab', param,hasil=>{
			for(i=1;i<=pjg;i++){	
			$('#input'+[i]).prop( "disabled", true );
			$('#inputcheck'+[i]).prop( "disabled", true );
			$('#printhasillab').show();
			$('#edithasillab').show();
			$('#SavehasilLab').hide();
			}
		});
		// console.log(param);
	}
	
	function edithasilLab(){
		pjg=tableInphasilLab.bootstrapTable('getData').length;
		for(i=1;i<=pjg;i++){
			tableInphasilLab.bootstrapTable('updateCell', {
			  index: i-1,
			  field: 'hasil',
			  value: '<input type="text" name="inputhasil" id="input' +i+ '"/>'
			})
		}
		$('#printhasillab').hide();
		$('#edithasillab').hide();
		$('#SavehasilLab').show();
	}
	
	function printhasilLab(){
		var param={
			order_produk:produkLab,
			id_kunjungan_lab:id_kunjungan_lab,
			dokter_pengirim:$('#dokterhslLab_kirim option:selected').text(),
			table:tableInphasilLab.bootstrapTable('getData'),
			user:id_user
		}
		newTabPOST('API/Lab/cetakhasil', param);
		// return;
		// console.log(param);
	}
	
	function refresh_hasil_lab() {
		$('#loading_hasilLab').hide();
	}
	
	setTimeout(refresh_hasil_lab, 1000);
</script>
