<div class="col-md-12 p-2">
    <div class="card card-outline card-danger">
		<div class="overlay-wrapper" id="loading_hasilRad">
			<div class="overlay">
			<i class="fas fa-3x fa-sync-alt fa-spin"></i>
			</div>
		</div>
		<div id="carihasilRad" class="card-body p-2 darkgrey-custom">
			<div class="row row-custom" >
				<div class="col-sm-auto">
					<div class="form-group">
						<label>Cari No. RM :</label>
						<input type="search" class="form-control form-control-xs" placeholder="Entry RM..." id="norm_hasil_rad" onkeypress="carihasilbyrm(event)" autocomplete="off" >
					</div>
				</div>
				<div class="col-sm-auto">
					<div class="form-group">
						<label> Tgl Rencana:</label>
						<input type="date" class="form-control form-control-xs" placeholder="" id="tgl_renc_hasil_rad" onkeypress="carihasilbytglrenc(event)" autocomplete="off">
					</div>
				</div>	
				<div class="col-sm-auto">
					<div class="form-group">
						<label> Tgl Rad:</label>
						<input type="date" class="form-control form-control-xs" placeholder="" id="tgl_kunj_hasil_rad" onkeypress="carihasilbytglkunj(event)"  autocomplete="off">
					</div>
				</div>
				<div class="col-sm-auto">
					<div class="form-group">
						<button class="btn btn-dark" style="margin-top: 10px;" onclick="loadAwalhasilRad()">Cari</button>
					</div>
				</div>
			</div>
		</div>
		<div id="hasilRad0" class="card-body p-2">
			<table
				id="tablehasilRadOrder"
				data-pagination="true"
				data-header-style="headerStyleOrderHasilRad"
				data-row-style="rowStyleOrderHasilRad"				
				data-search-on-enter-key="true"
				data-show-jump-to="true">
				<thead>
				  <tr>
					<th data-field="no_rm">No. RM</th>
					<th data-field="nama">Nama</th>
					<th data-field="tgl_rencana_rad">Tanggal Rencana</th>
					<th data-field="tgl_masuk">Tanggal Kunjungan</th>
				  </tr>
				</thead>
			</table>
		</div>
		<div id="hasilRad1" class="card m-1 collapse">
			<div class="card-body p-2">
				<div class="row">
					<div class="col-sm-3" >
						<div class="row row-style">
							<div class="col-sm-2">
								<label for="">No. RM</label>
							</div>
							<div class="col-sm-auto">:</div>
							<div class="col-sm-auto">							
							<input type="text"  id="no_rm_hasil_rad" class="form-control form-control-xs" disabled><br/>
							</div>
						</div>
						<div class="row row-style">
							<div class="col-sm-2">
								<label>Nama</label>
							</div>
							<div class="col-sm-auto">:</div>
							<div class="col-sm-auto">							
								<input type="text"  id="nama_hasil_rad" class="form-control form-control-xs" disabled><br/>
							</div>
						</div>
						<div class="row row-style">
							<div class="col-sm-2">
								<label for="">Alamat</label>
							</div>
							<div class="col-sm-auto">:</div>
							<div class="col-sm-auto">
								<input type="text"  id="alamat_hasil_rad" class="form-control form-control-xs" disabled><br/>
							</div>
						</div>
						<div class="row row-style">
							<div class="col-sm-2">
								<label for="">Rincian Order</label>
							</div>
							<div class="col-sm-auto">:</div>
							<div class="col-sm-auto" id="produk_hasil_rad">
								<!-- <input type="text"  id="produk_hasil_rad" class="form-control form-control-xs" disabled><br/> -->
							</div>
						</div>
					</div>
					<div class="col-sm-3" >
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
								<select class="form-control form-control-xs" name="listPenjhslRad" id="listPenjhslRad" readonly>
								</select>
							</div>
						</div>
						<div class="row row-style">
							<div class="col-sm-2">
								<label>Diagnosa</label>	
							</div>
							<div class="col-sm-auto">:</div>
							<div class="col-sm-auto">							
								<input type="text"  id="diagnosa_hsl_rad" class="form-control form-control-xs" disabled><br/>
							</div>
						</div>
					</div>
					<div class="col-sm-4" >
						<div class="row row-style">
							<div class="col-sm-3">
								<label>Dokter Pembaca</label>								
							</div>
							<div class="col-sm-auto"></div>
							<div class="col-sm-auto">
								<select class="form-control form-control-xs" name="dokterhslRad_baca" id="dokterhslRad_baca" readonly></select><br>
							</div>
						</div>
						<div class="row row-style">
							<div class="col-sm-3">
								<label>Dokter Pengirim</label>
							</div>
							<div class="col-sm-auto"></div>
							<div class="col-sm-auto">								
								<!-- <select class="form-control form-control-xs" name="dokterhslRad_kirim" id="dokterhslRad_kirim" readonly></select> -->
								<input type="text"  id="dokterhslRad_kirim" class="form-control form-control-xs" disabled><br/>
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
								<label> Kamar</label>
							</div>
							<div class="col-sm-auto"></div>
							<div class="col-sm-auto">
								<input type="text"  id="kamarhslRad" class="form-control form-control-xs" disabled>
							</div>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="row row-style">
							<div class="col-sm-auto" >
								<label for="citorad">CITO :</label>
								<input type="checkbox" id="citohslrad" disabled/>
							</div>
							<div class="col-sm-auto" style="margin-inline-start: 25px;">
								<button class="btn btn-danger" type="button" onclick="closeHasilRad();">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<div class="row row-style" style="margin-block-start: 27px;"></div>
					</div>
				</div>
				<div class="row" >
					<div class="col-sm-auto" id="">
						<label for="">Hasil Radiologi : </label>
					</div>
					<div class="col-sm-6" id="">
						<textarea rows="5" cols="75" name="" id="inp_hsl_Rad"></textarea>
					</div>
					<div class="col-sm-3" id="divSavehasilRad">
						<button id="SavehasilRad" type="button" class="btn btn-primary" onclick="saveHasilRad()">Save</button>
						<button id="printhasilrad" type="button" class="btn btn-primary collapse" onclick="printhasilRad()">Print</button>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>

<script>
var nowday      = "<?php echo date('Y-m-d'); ?>";
var tablehasilRadOrder = $('#tablehasilRadOrder');
var produkRad;
var id_kunjungan_rad;
var user= JSON.parse(localStorage['data_user']);
var id_user=user['id_pegawai'];

	tablehasilRadOrder.bootstrapTable({
		onDblClickRow: function (row, $element, field) {
			// console.log(id_user);
			apiPOST('Radiologi/Verifikator', row['no_rm'],hasil=>{
				document.getElementById('dokterhslRad_baca').innerHTML='<option value="'+hasil['data'][0].pembaca+'">'+hasil['data'][0].nama_pembaca+'</option>';
				
				if(hasil['data'][0].pengirim > ""){
					if(!isNaN(hasil['data'][0].pengirim)){
						apiPOST('Radiologi/pegawai', hasil['data'][0].pengirim,hasil=>{
							document.getElementById('dokterhslRad_kirim').value=hasil['data'][0].nama_pegawai;
						})
						// console.log('nomor');
					}else{
						document.getElementById('dokterhslRad_kirim').value=hasil['data'][0].pengirim;
						// console.log(hasil['data']);
						// console.log('uruf');
					}
				}else{
					document.getElementById('dokterhslRad_kirim').value='-';
					$("#dokterhslRad_kirim").prop('disabled',true);
				}
				if(id_user==155 || id_user==hasil['data'][0].pembaca){/*  */
					$('#loading_hasilRad').show();
					$("#hasilRad0").hide();			
					$("#hasilRad1").show();
					setTimeout(refresh_hasil_rad, 1500); 
					if(hasil['data'][0].hasil_pembacaan!==null){
						$("#printhasilrad").show();
						document.getElementById('inp_hsl_Rad').value = hasil['data'][0].hasil_pembacaan;
					}
					console.log('yes login');
				}else{
					if(hasil['data'][0].hasil_pembacaan==null){
						pertanyaan.fire({
							title:'Peringatan',
							html:'<p>Hasil Belum Diisi</p><p>Dokter Pembaca saat ini : <b>'+hasil['data'][0].nama_pembaca+'</b></p>',
							icon:'warning',
							showCancelButton:false,
							reverseButtons:false,
							allowOutsideClick:false,
						}).then((result)=>{
							if(result.isConfirmed){}else if(result.dismiss===Swal.DissmissReason.cancel){}
						})
						console.log('lom d bca');
					}else{
						$('#loading_hasilRad').show();
						$("#hasilRad0").hide();			
						$("#hasilRad1").show();
						$("#SavehasilRad").hide();
						$("#printhasilrad").show();
						setTimeout(refresh_hasil_rad, 1500); 
						document.getElementById('inp_hsl_Rad').value=hasil['data'][0].hasil_pembacaan;
						$("#inp_hsl_Rad").prop('disabled',true);
						console.log('No Edit');
					}
				}
			}); 
			
			document.getElementById('no_rm_hasil_rad').value = row['no_rm'];
			document.getElementById('nama_hasil_rad').value = row['nama'];
			document.getElementById('alamat_hasil_rad').value = row['alamat'];
			document.getElementById('produk_hasil_rad').innerHTML='';
			id_kunjungan_rad=row['id_kunjungan'];
			
			if(row['order_produk']!==null){
				produkRad=row['order_produk'];
				listProdhasilRad();
			}else{
				baris = '<label>Tidak Ada Produk yang Dipesan</label><br>';
				$('#produk_hasil_rad').append(baris);
			}
			if(row['nama_kamar']==null){
				document.getElementById('kamarhslRad').value = '-';
			}else{
				document.getElementById('kamarhslRad').value = row['nama_kamar'];
			}
			if(row['kunj_lama']==null){		
				document.getElementById('tgl_renc_hsl_rad').value = '-';
				document.getElementById('nma_unit_hsl_rad').value = '-';
				document.getElementById('tgl_masuk_hsl_rad').value = nowday;
				apiPOST('Radiologi/viewDiagnosa', row['id_kunjungan'],hasil=>{
					document.getElementById('diagnosa_hsl_rad').value = hasil['data'].penyakit;
				})
			}else{
				document.getElementById('tgl_masuk_hsl_rad').value = row['tgl_masuk'];
				document.getElementById('tgl_renc_hsl_rad').value = row['tgl_rencana_rad'];
				document.getElementById('nma_unit_hsl_rad').value = row['nama_unit'];
				apiPOST('Radiologi/viewDiagnosa', row['kunj_lama'],hasil=>{
					document.getElementById('diagnosa_hsl_rad').value = hasil['data'].penyakit;
				})
			}
			
			apiPOST('Radiologi/listPenjamnRad', row['no_rm'],hasil=>{
				var penjm = hasil['data'];
				var penjamin = '';

				if (penjm >0){				
					for (var i = 0; i < hasil['data'].length; i++) {					 
					  if (penjm.nama_penjamin="UMUM"){ 
						  penjm = hasil['data'][i];
						  penjamin +='<option value="'+penjm.id_penjamin+'" selected>'+penjm.nama_penjamin+'</option>';
						  document.getElementById('listPenjhslRad').innerHTML= penjamin;
					  }else{
						  penjm = hasil['data'][i];						 
						  penjamin +='<option value="'+penjm.id_penjamin+'">'+penjm.nama_penjamin+'</option>';
						  document.getElementById('listPenjhslRad').innerHTML= penjamin;
					  }											  
					}				
				}else{
					penjamin +='<option value="1">UMUM</option>';
					document.getElementById('listPenjhslRad').innerHTML= penjamin;
				}			
			});
		}
	});
	
	$(document).ready(function() {
	  setTimeout(refresh_hasil_rad, 1000); 
	  document.getElementById('tgl_kunj_hasil_rad').value = nowday;
	  // document.getElementById('tgl_kunj_hasil_rad').value = nowday;
	  // console.log(user);
	})
	
	function headerStyleOrderHasilRad(column){
        return {
            css: {
                background: 'rgb(40 159 32 / 39%)',
                color: 'black',
                border: '2px solid black'
            }
        };
    }
    
    function rowStyleOrderHasilRad(row, index){
        return {
            css: {
                background: 'white',
                border: '2px solid black'
            }
        };
    }
	
	function carihasilbyrm(e){
		if (e.keyCode == 13) {
			var param={
			norm: $("#norm_hasil_rad").val(),
		};			
			loadAwalhasilRad();
		}
	}
	
	function carihasilbytglrenc(e){
		if (e.keyCode == 13) {
			var param={
			tgl_renc: $("#tgl_renc_rad").val(),
		};			
			loadAwalhasilRad();
		}
	}
	
	function carihasilbytglkunj(e){
		if (e.keyCode == 13) {
			var param={
			tgl_kunj: $("#tgl_kunj_rad").val(),
		};			
			loadAwalhasilRad();
		}
	}
	
	function loadAwalhasilRad(){
		$('#hasilRad1').hide();
		$('#hasilRad0').show();
		$('#loading_hasilRad').show();
		
		$('#tablehasilRadOrder').bootstrapTable('removeAll');
		
        var param={
			norm: $("#norm_hasil_rad").val(),
			tgl_renc: $("#tgl_renc_hasil_rad").val(),
			tgl_kunj: $("#tgl_kunj_hasil_rad").val(),
		};
		var b;
        apiPOST("Radiologi/getHasilRad", param, hasil => {
            if(hasil !== null){
				b = hasil['data']
				// listDaftrRad.push(b);
                tablehasilRadOrder.bootstrapTable('append', hasil['data']);
            }
        }).then(refresh_hasil_rad());

		/* console.log(listDaftrRad); */
    }
	
	function listProdhasilRad(){
		
		apiPOST('Radiologi/getListProdukRad', produkRad,hasil=>{
			var b = hasil['data'];
			var nama_prod = '';
			if (hasil !==null){				
			// document.getElementById('produk_hasil_rad').value	= '';
			// var x = document.getElementById('produk_hasil_rad').innerHTML;
				for (var i = 0; i < b.length; i++) {
					nama_prod = hasil['data'][i].nama_produk;						
					// document.getElementById('produk_hasil_rad').value += nama_prod+'\n';
					baris = '<label><u>'+nama_prod+'</u></label><br>';
					$('#produk_hasil_rad').append(baris);
				}										
			}
		});
	}

	function closeHasilRad(){
		var param={
			norm: $("#no_rm_hasil_rad").val(),
			tgl_renc: $("#tgl_renc_hasil_rad").val(),
		};
		loadAwalhasilRad();
	}
	
	function closeHasilRad(){
		$('#popupblmbca').modal("hide");
		loadAwalhasilRad();
	}
	
	function saveHasilRad(){
		var param={
			hasil_pembacaan: $("#inp_hsl_Rad").val(),
			id_kunjungan_rad:id_kunjungan_rad
		};
		$('#printhasilrad').show();
		
		apiPOST('Radiologi/saveHslRad', param,hasil=>{
			
		});
	}
	
	function printhasilRad(){
		var param={
			order_produk:produkRad,
			id_kunjungan_rad:id_kunjungan_rad,
			dokter_pengirim:$('#dokterhslRad_kirim').val()
		}
		newTabPOST('API/Radiologi/cetakhasil', param);
		return;
	}
	
	function refresh_hasil_rad() {
		$('#loading_hasilRad').hide();
	}
	
	setTimeout(refresh_hasil_rad, 1000);
</script>