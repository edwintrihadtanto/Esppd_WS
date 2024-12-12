<div class="col-md-12 p-2">
	<div class="card card-outline card-danger">
		<div class="overlay-wrapper" id="loading_pendfRad">
		  <div class="overlay">
			<i class="fas fa-3x fa-sync-alt fa-spin"></i>
		  </div>
		</div>
		<div id="cariRad" class="card-body p-2 darkgrey-custom">
			<div class="row row-custom" >
				<div class="col-sm-auto">
					<div class="form-group">
						<label>Cari No. RM :</label>
						<input type="search" class="form-control form-control-xs" placeholder="Entry RM..." id="norm_rad" onkeypress="caribyrm(event)" autocomplete="off" >
					</div>
				</div>
				<div class="col-sm-auto">
					<div class="form-group">
						<label> Tgl Rencana:</label>
						<input type="date" class="form-control form-control-xs" placeholder="" id="tgl_renc_rad" onkeypress="caribytglrenc(event)" autocomplete="off">
					</div>
				</div>	
				<div class="col-sm-auto">
					<div class="form-group">
						<label> Tgl Rad:</label>
						<input type="date" class="form-control form-control-xs" placeholder="" id="tgl_kunj_rad" onkeypress="caribytglkunj(event)"  autocomplete="off">
					</div>
				</div>
				<div class="col-sm-auto">
					<div class="form-group">
						<button class="btn btn-dark" style="margin-top: 10px;" onclick="loadAwalPendaftaranRad()">Cari</button>
					</div>
				</div>                            
				<div class="col"></div>
				<div class="col-sm-auto">
					<button class="btn btn-warning" onclick="showModalPasienKunjunganLangsung(kunjunganLangsungPendafRad);">Kunjungan Langsung</button>
				</div>
			</div>
		</div>
		<div id="pendRad0" class="card-body p-2">
			<table
				id="tablePedaftaranRadOrder"
				data-pagination="true"
				data-header-style="headerStyleOrderPendaftaranRad"
				data-row-style="rowStyleOrderPendaftaranRad"				
				data-search-on-enter-key="true"
				data-show-jump-to="true">
				<thead>
				  <tr>
				  <th data-formatter="stat_order_rad" >Status</th>	
					<th data-field="no_rm">No. RM</th>
					<th data-field="nama">Nama</th>
					<th data-formatter="nama_gol_unit">Nama Unit</th>
					<th data-field="nama_penjamin">Nama Penjamin</th>
					<th data-field="tgl_rencana_rad">Tanggal Rencana</th>
					<th data-field="tgl_masuk_rad">Tanggal Kunjungan</th>
					<th data-formatter="del_order_rad">Edit</th>
				  </tr>
				</thead>
			</table>
		</div>
		<div id="pendRad1" class="card m-1 collapse">
			<div class="card-body p-2">
				<div class="row">
					<div class="col-sm-3" >
						<div class="row row-style">
							<div class="col-sm-2">
								<label for="">No. RM</label>
							</div>
							<div class="col-sm-auto">:</div>
							<div class="col-sm-auto">							
							<input type="text"  id="no_rm_pendaftaran_rad" class="form-control form-control-xs" disabled><br/>
							</div>
						</div>
						<div class="row row-style">
							<div class="col-sm-2">
								<label>Nama</label>
							</div>
							<div class="col-sm-auto">:</div>
							<div class="col-sm-auto">							
								<input type="text"  id="nama_pendaftaran_rad" class="form-control form-control-xs" disabled><br/>
							</div>
						</div>
						<div class="row row-style">
							<div class="col-sm-2">
								<label for="">Alamat</label>
							</div>
							<div class="col-sm-auto">:</div>
							<div class="col-sm-auto">
								<input type="text"  id="alamat_pendaftaran_rad" class="form-control form-control-xs" disabled><br/>
							</div>
						</div>
						<div class="row row-style">
							<div class="col-sm-2">
								<label for="">No. Telepon</label>
							</div>
							<div class="col-sm-auto">:</div>
							<div class="col-sm-auto">
								<input type="text"  id="telp_pendaftaran_rad" class="form-control form-control-xs" disabled><br/>
							</div>
						</div>
						<div class="row row-style">
							<div class="col-sm-2">
								<label for="">Rincian Order</label>
							</div>
							<div class="col-sm-auto">:</div>
							<div class="col-sm-auto" id="produk_pendaftaran_rad">
								<!-- <input type="text"  id="produk_pendaftaran_rad" class="form-control form-control-xs" disabled><br/> -->
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
								<input type="text"  id="tgl_lahir_rad" class="form-control form-control-xs" disabled>
							</div>
						</div>
						<div class="row row-style">
							<div class="col-sm-2">
								<label for="">Tanggal Rencana</label>
							</div>
							<div class="col-sm-auto">:</div>
							<div class="col-sm-auto">							
								<input type="text"  id="tgl_renc_pendaftaran_rad" class="form-control form-control-xs" disabled><br/>
							</div>
						</div>
						<div class="row row-style">
							<div class="col-sm-2">
								<label for="">Tanggal Masuk</label>
							</div>
							<div class="col-sm-auto">:</div>
							<div class="col-sm-auto">							
								<input type="text"  id="tgl_masuk_pendaftaran_rad" class="form-control form-control-xs" disabled><br/>
							</div>
						</div>
						<div class="row row-style">
							<div class="col-sm-2">
								<label> Pilih Penjamin</label>	
							</div>
							<div class="col-sm-auto">:</div>
							<div class="col-sm-auto">							
								<select class="form-control form-control-xs" name="listPenjRad" id="listPenjRad">
								</select><br>
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
								<input type="text"  id="kamarRad" class="form-control form-control-xs" disabled><br/>
							</div>
						</div>
						<div class="row row-style">
							<div class="col-sm-3">
								<label for="">Unit Asal</label>
							</div>
							<div class="col-sm-auto"></div>
							<div class="col-sm-auto">
								<input type="text"  id="nma_unit_pendaftaran_rad" class="form-control form-control-xs" disabled>
								<input id="id_unit_pendaftaran_rad" type="hidden" value=""><br/>
							</div>
						</div>
						<div class="row row-style">
							<div class="col-sm-3">
								<label>Dokter Pengirim</label>								
							</div>
							<div class="col-sm-auto"></div>
							<div class="col-sm-auto">								
								<input class="form-control form-control-xs" name="dokterRad_kirim" id="dokterRad_kirim" ><br>
								<input id="dokterRad_kirim_id" name="dokterRad_kirim" type="hidden" value="">
							</div>
						</div>
						<div class="row row-style">
							<div class="col-sm-3">
								<label>Diagnosa</label>
							</div>
							<div class="col-sm-auto"></div>
							<div class="col-sm-auto">
								<input type="text"  id="diagRad" class="form-control form-control-xs" disabled>
							</div>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="row row-style">
							<div class="col-sm-auto" >
								<label for="citorad">CITO :</label>
								<input type="checkbox" id="citorad"/>
							</div>
							<div class="col-sm-auto" >
								<button class="btn btn-danger" type="button" onclick="closeDetailRad();">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<div class="row row-style" style="padding-block-start: 50px;">
							<div class="col-sm-3">
								<label>Dokter Radiologi</label>								
							</div>
							<div class="col-sm-auto"></div>
							<div class="col-sm-auto">
								<select class="form-control form-control-xs" name="dokterRad_baca" id="dokterRad_baca" ></select><br>
							</div>
						</div>
					</div>
				</div>
				<div class="row" >
					<div class="col-sm-3" id=""></div>
					<div class="col-sm-3" id=""></div>
					<div class="col-sm-3" id="">
						<button type="button" class="btn btn-danger" onclick="DelOrderRad()" id="batal_rad">Batalkan Semua Order</button>
					</div>
					<div class="col-sm-2" style="padding-left:35px">
						<button type="button" class="btn btn-primary" onclick="saveCaraKeluarRad()" id="pasien_rad_selesai">Pasien Selesai</button>
					</div>
					<div class="col-sm-1 collapse" id="Divid_kunjungan_rad">
						<button type="button" class="btn btn-primary" onclick="generateRad()">Eksekusi Order</button>
					</div>
				</div>
			</div>
			<div id="pendRad2" class="card-body p-2 collapse">
				<div class="row row-style" id="orderProdRad">
					<button type="button" class="btn btn-dark" onclick="viewAddRadProd()">+ Tambah</button>
					<button type="button" class="btn btn-dark" onclick="deletProdRad()">- Hapus</button><br>
				</div>
				<div class="row row-style">
					<div class="col" id="">
						<table
							id="tableDetPendfRad"				
							class="table table-striped table-sm choose"
							data-click-to-select="true"
							data-single-select="true"
							data-search-on-enter-key="true"
							data-show-jump-to="true">
							<thead>
							  <tr>
								<th data-checkbox="true">#</th>
								<th data-field="no">No.</th>
								<th data-field="nama_produk">Nama Produk</th>
								<th data-field="nama_pegawai">Dokter</th>
								<th data-field="total_harga">Harga</th>
								<th data-formatter="bhp_rad">BHP</th>
							  </tr>
							</thead>
						</table>
					</div>
				</div>				
			</div>
		</div>		
	</div>    
</div>

<div class="modal fade" data-keyboard="false" data-backdrop="static" id="searchRadProd" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
		<div class="modal-header">
			<h2 class="modal-title" id="">Tambah Produk</h2>
			<button type="button" class="btn-close" data-bs-dismiss="modal" onclick="closeModalPendfRad()" aria-label="Close"><i class="fas fa-times"></i></button>
		</div>
		<div class="modal-body">
			<div class="row">
				<div id="col-sm-4">
					<label>Kode</label>
					<input type="text"  id="kode_rad_produk" onkeypress="caribykodeprodrad(event)" class="form-control form-control-xs" ><br/>
				</div>
				<div id="col-sm-4">
					<label>Nama Produk</label>
					<input type="text"  id="nama_rad_produk" onkeypress="caribynamaprodrad(event)" class="form-control form-control-xs" ><br/>
				</div>
				<div id="col-sm-4" style="padding-top: 10px">
					<button class="btn btn-dark" onclick="viewAddRadProd()"><i class="fa fa-search"></i></button>
				</div>
			</div>
			<div class="row">
				<div class="col" id="">
					<table
				id="tableRadProduk"
				class="table table-striped table-sm choose"
				data-pagination="true"
				data-click-to-select="true"
				data-single-select="true"
				data-search-on-enter-key="true"
				data-show-jump-to="true">
				<thead>
				  <tr>
					<th data-checkbox="true">#</th>
					<th data-field="no">No.</th>
					<th data-field="nama_produk">Nama</th>
					<th data-field="nama_unit">Nama Unit</th>
					<th data-field="harga">Harga</th>
				  </tr>
				</thead>
				<tbody id="">
				</tbody>
				</table>
				</div>			
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-bs-dismiss="modal" onclick="closeModalPendfRad()">Close</button>
			<button type="button" class="btn btn-default" onclick="saveProdukRad()">Save changes</button>
		</div>
    </div>
  </div>
</div>

<div class="modal fade" data-keyboard="false" data-backdrop="static" id="searchPasienRad" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h2 class="modal-title" id="">Klinik Radiologi</h2>
				<button type="button" class="btn-close" data-bs-dismiss="modal" onclick="closeModalPendfRadLangsung()" aria-label="Close"><i class="fas fa-times"></i></button>
			</div>
			<div class="modal-body">
				
				<div class="row row-style">
					<div class="col-sm-3">
						<label>Dokter Radiologi</label>								
					</div>
					<div class="col-sm-auto">:</div>
					<div class="col-sm-auto">
						<select class="form-control form-control-xs" name="dokterRad2" id="dokterRad2" readonly></select><br>
					</div>
				</div>
				<div class="row row-style">
					<div class="col-sm-3">
						<label>Dokter Pengirim</label>								
					</div>
					<div class="col-sm-auto">:</div>
					<div class="col-sm-auto">
						<!-- <select class="form-control form-control-xs" name="dokterRad3" id="dokterRad3" readonly></select><br> -->
						<input type="text"  id="dokterRad3" class="form-control form-control-xs"><br/>
					</div>
				</div>
				<div class="row row-style">
					<div class="col-sm-3">
						<label>Diagnosa</label>								
					</div>
					<div class="col-sm-auto">:</div>
					<div class="col-sm-auto">
						<!-- <input type="text"  id="diagnosaRad" class="diagnosaRad form-control form-control-xs"> -->
						<select class="diagnosaRad form-control form-control-xs" id="diagnosaRad">
						</select><br/>
					</div>
				</div>
				<div class="row row-style">
					<div class="col-sm-3">						
						<label for="citorad2">CITO</label>		
					</div>
					<div class="col-sm-auto">:</div>
					<div class="col-sm-auto">
						<input type="checkbox" id="citorad2" checked="unchecked"/>
					</div>					
					<div class="col-sm-6">
						<div class="btn-group pull-right">
		          <button type="button" class="btn bg-gradient-secondary btn-xs"><i class="fas fa-print"></i> Cetak</button>
		          <button type="button" class="btn bg-gradient-secondary dropdown-toggle dropdown-icon btn-xs" data-toggle="dropdown">
		            <span class="sr-only">Toggle Dropdown</span>
		          </button>
		          <div class="dropdown-menu p-1" role="menu">
		            <!-- <a class="dropdown-item" href="#"><i class="fa fa-file"></i> Surat Pernyataan</a> -->
		            <!-- <div class="dropdown-divider m-0"></div> -->
		            <a class="dropdown-item" href="#" onclick="Rad_printlabel()"><i class="fa fa-user"></i> Label Pasien</a>
		            <!-- <div class="dropdown-divider m-0"></div>
		            <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Status Pasien</a> -->
		            <div class="dropdown-divider m-0"></div>
		            <a class="dropdown-item" href="#" onclick="Rad_printkartu()"><i class="fa fa-credit-card"></i> Kartu Pasien</a>
		            <!-- <a class="dropdown-item" href="#" onclick=""><i class="fa fa-code"></i> Gelang Pasien</a> -->
		          </div>
		        </div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-bs-dismiss="modal" onclick="closeModalPendfRadLangsung()">Close</button>
				<button type="button" class="btn btn-default" onclick="saveKunjunganLangsungRad()">Save changes</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" data-keyboard="false" data-backdrop="static" id="pilihKeluarRad" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
		<div class="modal-header">
			<h2 class="modal-title" id="">Tindakan Selesai</h2>
			<button type="button" class="btn-close" data-bs-dismiss="modal" onclick="closeModalPendfRad()" aria-label="Close"><i class="fas fa-times"></i></button>
		</div>
		<div class="modal-body">
			<div class="row" id="">
				<div class="col-sm-4" id="">
					<label>Cara Keluar</label>					
				</div>
				<div class="col-sm-auto" id=""></div>
				<div class="col-sm-4" id="">
					<select class="form-control form-control-xs" name="" id="cara_keluar_rad"></select><br/>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-bs-dismiss="modal" onclick="closeModalPendfRad()">Close</button>
			<button type="button" class="btn btn-default" onclick="saveCaraKeluarRad()">Save changes</button>
		</div>
    </div>
  </div>
</div>

<script>
	var nowday      = "<?php echo date('Y-m-d'); ?>";
	var listDaftrRad=[];
	var listRadProd=[];
	var tablePendaftaranRadOrder = $('#tablePedaftaranRadOrder');
	var tableRadioProduk = $('#tableRadProduk');	
	var tableDetPendRad = $('#tableDetPendfRad');
	var id_kunjungan_rad_datang;
	var id_kunjungan;
	var id_transaksi_rad;
	var produkRad;
	var norm;
	var urut;
	// var id_pengirim;
	var citos;
	var dis_rad;
	
	// var id_pegawai;
	var cariDetilPasienRad=false;
	var cariListDokterRad=false;

  tablePendaftaranRadOrder.bootstrapTable({
		onDblClickRow: function (row, $element, field) {
			var parampenjrad={
				no_rm : row['no_rm'],
				id_transaksi: row['id_transaksi']
			}
			$('#loading_pendfRad').show();
			$("#pendRad0").hide();			
			$("#pendRad1").show();
			
			cariDetilPasienRad=true;
			cekListDokterRad();
			listDokterRad();
			
			document.getElementById('no_rm_pendaftaran_rad').value = row['no_rm'];
			document.getElementById('nama_pendaftaran_rad').value = row['nama'];
			document.getElementById('alamat_pendaftaran_rad').value = row['alamat'];
			document.getElementById('tgl_lahir_rad').value = row['tgl_lahir'];
			document.getElementById('telp_pendaftaran_rad').value = row['telepon'];
			document.getElementById('id_unit_pendaftaran_rad').value = row['id_unit'];
			id_kunjungan_rad_datang = row['id_kunjungan_rad'];
			id_kunjungan = row['id_lama'];
			id_transaksi_rad = row['id_transaksi'];
			produkRad = row['order_produk'];
			norm = row['no_rm'];
			urut = row['urut_masuk'];

			if(row['id_lama']==null){
				// $("#batal_rad").hide();
				document.getElementById('tgl_renc_pendaftaran_rad').value = '-';
				document.getElementById('nma_unit_pendaftaran_rad').value = '-';
				apiPOST('Radiologi/viewDiagnosa', row['id_kunjungan_rad'],hasil=>{
					document.getElementById('diagRad').value = hasil['data'].penyakit;
				})
			}else{
				// $("#batal_rad").show();
				document.getElementById('tgl_renc_pendaftaran_rad').value = row['tgl_rencana_rad'];
				document.getElementById('nma_unit_pendaftaran_rad').value = row['nama_unit'];
				apiPOST('Radiologi/viewDiagnosa', row['id_lama'],hasil=>{
					document.getElementById('diagRad').value = hasil['data'].penyakit;
				})
			}
			if(row['nama_kamar']==null){
				document.getElementById('kamarRad').value = '-';
			}else{
				document.getElementById('kamarRad').value = row['nama_kamar'];
			}
			if(row['tgl_masuk_rad']==null){
				$("#Divid_kunjungan_rad").show();
				$("#pendRad2").hide();
				$("#listPenjRad").prop("disabled", false);	
				document.getElementById('tgl_masuk_pendaftaran_rad').value = '-';
			}else{
				$("#Divid_kunjungan_rad").hide();
				$("#pendRad2").show();
				$("#orderProdRad").show();
				$("#citorad").prop("disabled", true);
				$("#dokterRad_baca").prop("disabled", true);	
				$("#listPenjRad").prop("disabled", true);	
				document.getElementById('tgl_masuk_pendaftaran_rad').value = row['tgl_masuk_rad'];

				refreshDetilTableProdRad();
			}
			if(row['id_cara_keluar']!==null){
				$("#orderProdRad").hide();
				$("#pasien_rad_selesai").hide();
				dis_rad='disabled';
			}else{
				$("#orderProdRad").show();
				$("#pasien_rad_selesai").show();
				dis_rad='';
			}
			if(row['id_pengirim']==null){
				// document.getElementById('dokterRad_kirim').innerHTML='<option value="'+0+'">-</option>';
				apiPOST('Radiologi/cekhasilLngsung', row['id_kunjungan_rad'],hasil=>{
					document.getElementById('dokterRad_kirim').value=hasil['data'].pengirim;
				});
			}else{
				apiPOST('Radiologi/pegawai', row['id_pengirim'],hasil=>{
					document.getElementById('dokterRad_kirim').value=hasil['data'][0].nama_pegawai;
					document.getElementById('dokterRad_kirim_id').value=hasil['data'][0].id_pegawai;
				});
				$("#dokterRad_kirim").prop("disabled", true);
			}
			if(row['order_produk']!==null){
				listProdRad(row['order_produk']);
			}else{
				document.getElementById('produk_pendaftaran_rad').innerHTML = '';
				baris = '<label><u>Belum Order Produk</u></label><br>';
				$('#produk_pendaftaran_rad').append(baris);
			}
			
			apiPOST('Radiologi/listPenjamnRad', parampenjrad,hasil=>{
				var penjm = hasil['data'];
				var penjamin = '';

				if (hasil !==null){				
					for (var i = 0; i < hasil['data'].length; i++) {					 
					  if (penjm.nama_penjamin=row['nama_penjamin']){ 
						  penjm = hasil['data'][i];
						  penjamin +='<option value="'+penjm.id_penjamin+'" selected>'+penjm.nama_penjamin+'</option>';
						  document.getElementById('listPenjRad').innerHTML= penjamin;
					  }else{
						  penjm = hasil['data'][i];						 
						  penjamin +='<option value="'+penjm.id_penjamin+'">'+penjm.nama_penjamin+'</option>';
						  document.getElementById('listPenjRad').innerHTML= penjamin;
					  }											  
					}				
				}else{
					penjamin +='<option value="1">UMUM</option>';
					document.getElementById('listPenjRad').innerHTML= penjamin;
				}			
			});
			/* console.log(penjm); */
		}
    });
	
	tableRadioProduk.bootstrapTable({});
	tableDetPendRad.bootstrapTable({});
	
	$(document).ready(function() {
		setTimeout(refresh_pendft_rad, 1000); 
		document.getElementById('tgl_renc_rad').value = nowday;
		// document.getElementById('tgl_kunj_rad').value = nowday;

		notifRad();
	  
		$("#diagnosaRad").select2({
			placeholder: "Ketikan Kode Diagnosa",
			allowClear: true,
			dropdownParent: $('#searchPasienRad')
		});
	})
	
	$(document).on('keyup', '.select2-search__field', function(ev) {
		var self = $(this);
		if (self.val().length > 1) {
			tampil_diagnosa_rad(self.val());
		}
	});
	
	function tampil_diagnosa_rad(kode) {
		var param = {
			id: kode
		};
		apiPOST('Data_Sosial/diagnosabyname', param, hasil => {
			var penjamin = '';
			var a = hasil['data'];
			for (var i = 0; i < a.length; i++) {
				penjamin += '<option value="' + a[i]['id_penyakit'] + '">' + a[i]['id_penyakit'] + ' | ' + a[i]['penyakit'] + '</option>';
			}
			document.getElementById('diagnosaRad').innerHTML = penjamin;
		});
	}

	function nama_gol_unit(value,row){
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
    
	function headerStyleOrderPendaftaranRad(column){
	  return {
		  css: {
			  background: 'rgb(40 159 32 / 39%)',
			  color: 'black',
			  border: '2px solid black'
		  }
	  };
	}
  
	function rowStyleOrderPendaftaranRad(row, index){
	  return {
		  css: {
			  background: 'white',
			  border: '2px solid black'
		  }
	  };
	}

	function stat_order_rad(value,row){
		var status='';
		if(row.id_cara_keluar==null){
			status= '<img src="http://localhost/DartoMakanYuyu/cross_ci3/_assets/dist/img/cancel.png" width="20px" height="20px" title="Belum Dilayani">';
		}else{
			status= '<img src="http://localhost/DartoMakanYuyu/cross_ci3/_assets/dist/img/checklist.png" width="20px" height="20px" title="Sudah Dilayani">';
		}	
		return status;
	}

	function bhp_rad(value,row,index){	
		var buton= "<button type='button' class='btn btn-xs btn-outline-danger' onclick='mod_bhp_rad("+row.id_detail_kunjungan+")' "+dis_rad+"><i class='fa fa-plus'></i></button>";
		return buton;
	}

	function mod_bhp_rad(det_kunj){		
		showModalBHPProduk(det_kunj, 5001);
	}
	
	function del_order_rad(value,row){	
		var buton= "<button type='button' class='btn btn-xs btn-outline-danger' onclick='delListOrderRad("+row.id_transaksi+","+row.id_lama+","+row.urut_masuk+")'><i class='fa fa-trash'></i></button>";
		return buton;
	}
  
	function loadAwalPendaftaranRad(){
		$('#pendRad1').hide();
		$('#pendRad2').hide();
		$('#pendRad0').show();
		// $("#batal_rad").show();
		$('#loading_pendfRad').show();
		$('#citorad').prop( "disabled", false );
		$('#citorad2').prop( "disabled", false );
		document.getElementById('dokterRad_kirim').value='';
		id_kunjungan='';
		id_kunjungan_rad_datang='';
		id_transaksi_rad='';
		
		$('#tablePedaftaranRadOrder').bootstrapTable('removeAll');
		listDaftrRad=[];
		listRadProd=[];
		
        var param={
			norm: $("#norm_rad").val(),
			tgl_renc: $("#tgl_renc_rad").val(),
			tgl_kunj: $("#tgl_kunj_rad").val(),
		};
		var b;
        apiPOST("Radiologi/getOrderRad", param, hasil => {
            if(hasil !== null){
							b = hasil['data']
							listDaftrRad.push(b);
              tablePendaftaranRadOrder.bootstrapTable('append', hasil['data']);
            }
        }).then(refresh_pendft_rad());

		/* console.log(listDaftrRad); */
  }
    
	function viewOrderPendaftaranRad(data){
              
    var pendRad1 = document.getElementById('pendRad1');
    pendRad1.innerHTML = '';
    
    var dataSosialPendaftaranRad = document.createElement('div');
    
    pendRad1.appendChild(dataSosialPendaftaranRad);
    
    var labelOrderPendaftaranRad = document.createElement('h4');
    labelOrderPendaftaranRad.innerHTML = 'Pemeriksaan :';
    pendRad1.appendChild(labelOrderPendaftaranRad);
            
    var isiOrderPendaftaranRad = document.createElement('div');
    isiOrderPendaftaranRad.classList.add("container-fluid");
    isiOrderPendaftaranRad.classList.add("p-2");
    isiOrderPendaftaranRad.classList.add("border");
    isiOrderPendaftaranRad.classList.add("rounded");
    isiOrderPendaftaranRad.style.background = 'white';
    isiOrderPendaftaranRad.innerHTML = data['isi'];
    pendRad1.appendChild(isiOrderPendaftaranRad);
	}
	
	function listDokterRad(){
	  var a ='';
	  apiPOST('Radiologi/dokterRad', null,hasil=>{
		a = hasil['data'];		
		var b='';
		
		if (hasil !==null){	
			for (var i = 0; i < a.length; i++) {
			  a = hasil['data'][i];
			  b+='<option value="'+a.id_pegawai+'">'+a.nama_pegawai+'</option>';
			}
			document.getElementById('dokterRad_baca').innerHTML=b;
			document.getElementById('dokterRad2').innerHTML=b;
			cariListDokterRad=true;
			cekListDokterRad();
		} 
	  });	  
	}
	
	function listProdRad(param){
		document.getElementById('produk_pendaftaran_rad').innerHTML='';
		
		apiPOST('Radiologi/getListProdukRad', param,hasil=>{
			var b = hasil['data'];
			listRadProd.push(b);
			var nama_prod = '';
			if (hasil !==null){				
			// document.getElementById('produk_pendaftaran_rad').value	= '';
			var x = document.getElementById('produk_pendaftaran_rad').innerHTML;
				for (var i = 0; i < b.length; i++) {
					nama_prod = hasil['data'][i].nama_produk;						
					// document.getElementById('produk_pendaftaran_rad').value += nama_prod+'\n';
					baris = '<label><u>'+nama_prod+'</u></label><br>';
					$('#produk_pendaftaran_rad').append(baris);
				}										
			}
		});
	}
	
	function viewAddRadProd(){
		if($("#id_unit_pendaftaran_rad").val().charAt(0)==2){kelas=$("#id_unit_pendaftaran_rad").val();}else{kelas='5001';}
		$('#searchRadProd').modal("show");
		$('#tableRadProduk').bootstrapTable('removeAll');
		
		/* */var param={
			kd_produk: $("#kode_rad_produk").val(),
			nama_produk: $("#nama_rad_produk").val(),
			id_penjamin: $("#listPenjRad").val(),
			id_unit: kelas
		}; 
		
		var a='';
		apiPOST('Radiologi/RadProd', param,hasil=>{		
			if (hasil !==null){
				var b=hasil['data'];				
				tableRadioProduk.bootstrapTable('append', hasil['data']);
			}  
		  });
		document.getElementById('kode_rad_produk').value = '';
		document.getElementById('nama_rad_produk').value = '';
	}
	
	function closeModalPendfRad(){
		$('#searchRadProd').modal("hide");	
		$('#pilihKeluarRad').modal("hide");
		refreshDetilTableProdRad();
	}
	
	function closeModalPendfRadLangsung(){
		$('#searchPasienRad').modal("hide");	
	}
	
	function generateRad(){
		savependfRad();
		setTimeout(savegenerateRad,3000);
	}
	
	function savependfRad(){
		if($("#id_unit_pendaftaran_rad").val().charAt(0)==2){kelas=$("#id_unit_pendaftaran_rad").val();}else{kelas='5001';}
		if($('#citorad').prop("checked")){	citos=1;	}else{	citos=0;	}
		
		var param = { 
		norm: norm,
		id_unit: kelas,
		id_transaksi: id_transaksi_rad,
		id_pegawai: $("#dokterRad_baca").val(),
		id_pengirim: $("#dokterRad_kirim_id").val(),
		tgl_rencana_rad: $("#tgl_renc_pendaftaran_rad").val(),
		id_kunjungan_rad: id_kunjungan_rad_datang,		
		id_kunjungan: id_kunjungan,
		cito: citos,
		urut:urut,
		status_kunjungan: "1"		
		}

		apiPOST('Radiologi/saveKunjunganRad',param,hasil=>{
			id_kunjungan_rad_datang = hasil['data'];	
		}); 
		
		$('#citorad').prop( "disabled", true );
		$("#Divid_kunjungan_rad").hide();
		$("#pasien_rad_selesai").show();
		$("#pendRad2").show();
	}
	
	function savegenerateRad(){
		if($("#id_unit_pendaftaran_rad").val().charAt(0)==2){kelas=$("#id_unit_pendaftaran_rad").val();}else{kelas='5001';}

		var param={
			id_unit: kelas,
			id_transaksi: id_transaksi_rad,
			id_pegawai: $("#dokterRad_baca").val(),
			id_penjamin: $("#listPenjRad").val(),
			tgl_rencana_rad: $("#tgl_renc_pendaftaran_rad").val(),
			id_kunjungan_rad: id_kunjungan_rad_datang,	
			id_produk: listRadProd[0][0].id_produk,
			cito:citos,
			status_kunjungan: "1"	
		}
		
		apiPOST('Radiologi/saveProdRad',param,hasil=>{
			if(hasil !== null){				
				refreshDetilTableProdRad();
				$("#Divid_kunjungan_rad").hide();
				$("#pasien_rad_selesai").show();
				$("#orderProdRad").show();
            }
		}); 
	}
	
	function saveProdukRad(){
		if($("#id_unit_pendaftaran_rad").val().charAt(0)==2){kelas=$("#id_unit_pendaftaran_rad").val();}else{kelas='5001';}
		var table = $("#tableRadProduk");
		var value_check = table.bootstrapTable('getSelections');
		
		var param = { 
		id_unit: kelas,
		id_transaksi: id_transaksi_rad,
		id_pegawai: $("#dokterRad_baca").val(),
		id_penjamin: $("#listPenjRad").val(),
		tgl_rencana_rad: $("#tgl_renc_pendaftaran_rad").val(),
		id_kunjungan_rad: id_kunjungan_rad_datang,	
		id_produk: value_check[0].id_produk,
		cito:citos,
		status_kunjungan: "1"		
		}		
			 
		apiPOST("Radiologi/saveProdRad", param, hasil => {
            if(hasil !== null){				
				refreshDetilTableProdRad();
				$("#Divid_kunjungan_rad").hide();
				$("#pasien_rad_selesai").show();
				$("#orderProdRad").show();
            }
        })		
		/* console.log(value_check); 
		console.log(param); */
	}
	
	function deletProdRad(){
		var value_check = tableDetPendRad.bootstrapTable('getSelections');		
		
		var param = { 
			id_kunjungan_rad: id_kunjungan_rad_datang,	
			id_produk: value_check[0].id_produk,
			tgl_input: value_check[0].tgl_input,
			status_kunjungan: "1"		
		}
		
		apiPOST("Radiologi/delDetilProd", param, hasil => {
            if(hasil !== null){				
				refreshDetilTableProdRad()
            }
        })		
	}
	
	function closeDetailRad(){
		var param={
			norm: $("#no_rm_pendaftaran_rad").val(),
			tgl_renc: $("#tgl_renc_pendaftaran_rad").val(),
		};
		loadAwalPendaftaranRad();
	}
	
	function caribyrm(e){
		if (e.keyCode == 13) {
			var param={
			norm: $("#norm_rad").val(),
		};			
			loadAwalPendaftaranRad();
		}
	}
	
	function caribytglrenc(e){
		if (e.keyCode == 13) {
			var param={
			tgl_renc: $("#tgl_renc_rad").val(),
		};			
			loadAwalPendaftaranRad();
		}
	}
	
	function caribytglkunj(e){
		if (e.keyCode == 13) {
			var param={
			tgl_kunj: $("#tgl_kunj_rad").val(),
		};			
			loadAwalPendaftaranRad();
		}
	}
	
	function refreshDetilTableProdRad(){
		$('#tableDetPendfRad').bootstrapTable('removeAll');
		
		var param={
			id_kunjungan_rad: id_kunjungan_rad_datang
		};
		
		apiPOST("Radiologi/viewDetProdRad", param, hasil => {
            if(hasil !== null){
                tableDetPendRad.bootstrapTable('append', hasil['data']);
            }
        });
	}
	
	function caribykodeprodrad(e){
		if (e.keyCode == 13) {
			var param={
			kd_produk: $("#kode_rad_produk").val(),
			};			
			viewAddRadProd();
		}
	}
	
	function caribynamaprodrad(e){
		if (e.keyCode == 13) {
			var param={
			nama_produk: $("#nama_rad_produk").val(),
			};			
			viewAddRadProd();
		}
	}

	function kunjunganLangsungPendafRad(new_pasien){		
		$("#searchPasienRad").modal("show");
		listDokterRad();
		var id_pegawai='';					
		var pasien_baru={
			nik: 		new_pasien.nik,
			nama: 		new_pasien.nama,
			hubungan: 	'pasien',
			no_hp: 		new_pasien.telepon,
			alamat: 	new_pasien.alamat,
			id_user: 	user.id_user,
			no_rm: 		new_pasien.no_rm,
			tgl_lahir:new_pasien.tgl_lahir,
			telepon:  new_pasien.telepon,			
			id_penjamin:'1'
			/* nik_penanggung: */
		};	
		listDaftrRad.push(pasien_baru);	
	}
	
	function saveKunjunganLangsungRad(){
		if($('#citorad2').prop("checked")){	citos=1;	}else{	citos=0;	}
		var param={
			nik: 		listDaftrRad[0].nik,
			nama: 		listDaftrRad[0].nama,
			hubungan: 	'pasien',
			no_hp: 		listDaftrRad[0].no_hp,
			alamat: 	listDaftrRad[0].alamat,
			id_user: 	user.id_user,
			no_rm: 		listDaftrRad[0].no_rm,		
			id_pegawai: $("#dokterRad2").val(),
			tgl_rencana_rad:nowday,
			cito:		citos,
			diagnosa:	$("#diagnosaRad").val(),
			id_penjamin:'1'
			/* nik_penanggung: */
		};				
		// console.log(listDaftrRad[0]);

		apiPOST("Radiologi/addOrderRadLangsung", param, hasil => {
      if(hasil !== null){				
        closeModalPendfRadLangsung();
				$('#loading_pendfRad').show();
				// $("#batal_rad").hide();			
				$("#pendRad0").hide();			
				$("#pendRad1").show();
				$("#pendRad2").show();
				$("#id_kunjungan_rad").hide();
				$("#pasien_rad_selesai").show();
				$("#orderProdRad").show();
				$('#citorad').prop( "disabled", true );
				$('#dokterRad_kirim').prop( "disabled", false );
				// document.getElementById('').prop('disabled', false);
				
				cariDetilPasienRad=true;
				cekListDokterRad();
				
				document.getElementById('no_rm_pendaftaran_rad').value = listDaftrRad[0].no_rm;
				document.getElementById('nama_pendaftaran_rad').value = listDaftrRad[0].nama;
				document.getElementById('alamat_pendaftaran_rad').value = listDaftrRad[0].alamat;
				document.getElementById('tgl_renc_pendaftaran_rad').value = '-';
				document.getElementById('tgl_lahir_rad').value = listDaftrRad[0].tgl_lahir;
				document.getElementById('telp_pendaftaran_rad').value = listDaftrRad[0].telepon;
				document.getElementById('tgl_masuk_pendaftaran_rad').value = nowday;
				document.getElementById('nma_unit_pendaftaran_rad').value = '-';	
				document.getElementById('kamarRad').value = '-';	
				document.getElementById('dokterRad_kirim').value = 	$("#dokterRad3").val();
				document.getElementById('produk_pendaftaran_rad').innerHTML ='-';
				document.getElementById('citorad').checked = $('#citorad2').prop("checked");
				document.getElementById('listPenjRad').innerHTML='<option value="1" selected>UMUM</option>';
				document.getElementById('dokterRad_baca').innerHTML='<option value="'+hasil['data'][0].id_pegawai+'">'+hasil['data'][0].nama_pegawai+'</option>';
				id_kunjungan_rad_datang=hasil['data'][0].id_kunjungan;
				id_transaksi_rad=hasil['data'][0].id_transaksi;
				
				apiPOST('Radiologi/viewDiagnosa', hasil['data'][0].id_kunjungan,hasil=>{
					document.getElementById('diagRad').value = hasil['data'].penyakit;
				})
				
				refreshDetilTableProdRad();		
        }			
    }) 
	}
	
	function viewPasienSelesaiRad(){
		$('#pilihKeluarRad').modal("show");		
		listCaraKeluarHD();
	}
	
	function listCaraKeluarHD(){		
		apiPOST("Radiologi/viewCaraKeluar", null, hasil => {
			var a=hasil['data'];
			var isi=''
            if(hasil !== null){				
				for (var i = 0; i < hasil['data'].length; i++) {
						a = hasil['data'][i];						 
						isi +='<option value="'+a.id_cara_keluar+'">'+a.cara_keluar+'</option>';
						document.getElementById('cara_keluar_rad').innerHTML= isi;
					}
            }
        })
	}
	
	function saveCaraKeluarRad(){
		tableDetPendRad.bootstrapTable('checkAll');
		var newer_data=tableDetPendRad.bootstrapTable('getData');
		tableDetPendRad.bootstrapTable('uncheckAll');
		
		var param = { 
		id_kunjungan: id_kunjungan_rad_datang,
		id_cara_keluar: '1',
		id_produk: newer_data,
		pengirim:$("#dokterRad_kirim").val()
		}
		var ids = $.map(newer_data, function (item) {return item.id_produk;});
		var ids_str= '(\u0027'+ids.join("\u0027, \u0027")+'\u0027)'; 
		
		if(newer_data[0]==null){
			refresh_pendft_rad();
			pertanyaan.fire({
				title:'Peringatan',
				html:'<p>Produk Belum Diisi</p>',
				icon:'warning',
				showCancelButton:false,
				reverseButtons:false,
				allowOutsideClick:false,
			}).then((result)=>{
				if(result.isConfirmed){}else if(result.dismiss===Swal.DissmissReason.cancel){}
			})
		}else{
			refresh_pendft_rad();
			apiPOST("Radiologi/savePasienKeluar", param, hasil => {
            if(hasil['status']=='sukses'){
				closeModalPendfRad();
				$('#orderProdRad').hide();
				$('#pasien_rad_selesai').hide();
				setTimeout(listProdRad(ids_str),2000);
			}
        });
		}		
		// console.log(newer_data);
	}
	
	function DelOrderRad(){
		var param={
			id_kunjungan_rad:id_kunjungan_rad_datang,
			id_transaksi:id_transaksi_rad
		}
		if(id_kunjungan==null){
			console.log('bru');
			apiPOST("Radiologi/deleteorderlngsung", param, hasil => {
				$('#citorad').prop( "disabled", false );
				$("#pasien_rad_selesai").hide();
				$("#orderProdRad").show();
				$('#tableDetPendfRad').bootstrapTable('removeAll');
			})
		}else{
			console.log('lama');
			apiPOST("Radiologi/deleteorder", param, hasil => {
				$('#citorad').prop( "disabled", false );
				$("#Divid_kunjungan_rad").show();
				$("#pasien_rad_selesai").hide();
				$("#pendRad2").hide();
			})
		}
	}
	
	function delListOrderRad(id_trans,id_kunj,urut){
		var param = { 
			id_transaksi:id_trans,
			id_kunjungan:id_kunj,
			urut_masuk:urut
		}
		// console.log(param);
		pertanyaan.fire({
			title: 'Proses Hapus Order',
			html: '<span>Apakah Anda ingin Menghapus Order Ini ?</span><p><i>Data tidak dapat dikembalikan lagi !!</i></p>',
			icon: 'question',
			showCancelButton:true,
			reverseButtons:false,
			allowOutsideClick:false,
		}).then((result)=>{
			if(result.isConfirmed){
				apiPOST("Radiologi/dellistorder", param, hasil => {		      
					loadAwalPendaftaranRad();
		    });
			}
		})		
	}

	function Rad_printlabel(){    
    var param = {
      norm      : listDaftrRad[0].no_rm,      
      modul     : 'Radiologi',
      nma_pegawai:$("#dokterRad2").text()
    };
    // console.log(param);
    newTabPOST('API/Radiologi/printlabel',param);      
    return;    
  }

	function Rad_printkartu(){
		var param = {
		  norm      : listDaftrRad[0].no_rm,      
		  modul     : 'Radiologi'      
		};
		// console.log(param);
		newTabPOST('API/Radiologi/cetakkartupasien',param);      
		return; 
	}

	function notifRad(){
		apiPOST('Radiologi/getNotifrad', param,hasil=>{
			if (hasil !==null){
				b = hasil['data'];
				nomor= hasil['id'];
				var tek=''
				document.getElementById('notif_bagde').innerHTML = b[0].count;
				tek += '<span class="dropdown-item dropdown-header">'+b[0].count+' Pemberitahuan Rad</span>';
				for(var i=0;i<b[0].count;i++){
					tek += '<div class="dropdown-item p-1" onclick="onloadPanel(this, '+"'"+nomor+"'"+')">';
					tek += '<div class="media">';
					tek += '<div class="img-notif mt-2">'+b[i].nomor+'</div>'
					tek += '<div class="media-body p-1">';
					tek += '<a href="#"><b>Penerimaan Order Rad</b></a>';
					tek += '<h3 class="dropdown-item-title">Order Rad Belum Dilayani</h3>';
					tek += '<p class="text-sm text-muted">Dari Pasien '+b[i].no_rm+' di tgl '+b[i].tgl_masuk+'</p>';
					tek += '</div>';
					tek += '</div>';
					tek += '</div>';
					tek += '<div class="dropdown-divider"></div>';
				}
			document.getElementById('notif_info').innerHTML = tek;			
			}else{
				console.log('nihil');
			}
		})
		setTimeout(refresh_notif_rad, 300000);
	}
	
	function refresh_pendft_rad() {
    $('#loading_pendfRad').hide();
	}

	function refresh_notif_rad(){
		if($('#tab-pendRad').hasClass('active')){
			notifRad();
			console.log('ada');
		}else{
			console.log('0');
		}
	}
	
	function cekListDokterRad(){
		if(cariListDokterRad&&cariDetilPasienRad){
			$('#loading_pendfRad').hide();
		}	
	}
	
	setTimeout(refresh_pendft_rad, 1000);
</script>