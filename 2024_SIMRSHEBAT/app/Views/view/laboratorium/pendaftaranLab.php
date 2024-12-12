<div class="col-md-12 p-2">
	<div class="card card-outline card-danger">
		<div class="overlay-wrapper" id="loading_pendfLab">
		  <div class="overlay">
			<i class="fas fa-3x fa-sync-alt fa-spin"></i>
		  </div>
		</div>
		<div id="cariLab" class="card-body p-2 darkgrey-custom">
			<div class="row row-custom" >
				<div class="col-sm-auto">
					<div class="form-group">
						<label>Cari No. RM :</label>
						<input type="search" class="form-control form-control-xs" placeholder="Entry RM..." id="norm_lab" onkeypress="caribyrm(event)" autocomplete="off" >
					</div>
				</div>
				<div class="col-sm-auto">
					<div class="form-group">
						<label> Tgl Rencana:</label>
						<input type="date" class="form-control form-control-xs" placeholder="" id="tgl_renc_lab" onkeypress="caribytglrenc(event)" autocomplete="off">
					</div>
				</div>	
				<div class="col-sm-auto">
					<div class="form-group">
						<label> Tgl Lab:</label>
						<input type="date" class="form-control form-control-xs" placeholder="" id="tgl_kunj_lab" onkeypress="caribytglkunj(event)"  autocomplete="off">
					</div>
				</div>
				<div class="col-sm-auto">
					<div class="form-group">
						<button class="btn btn-dark" style="margin-top: 10px;" onclick="Labshow()">Cari</button>
					</div>
				</div>
				<div class="col"></div>
				<div class="col-sm-auto">
					<button class="btn btn-warning" onclick="showModalPasienKunjunganLangsung(kunjunganLangsungPendafLab);">Kunjungan Langsung</button>
				</div>
			</div>
		</div>
		<div id="pendLab0" class="card-body p-2">
			<table
				id="tablePedaftaranLabOrder"
				data-pagination="true"
				data-header-style="headerStyleOrderPendaftaranLab"
				data-row-style="rowStyleOrderPendaftaranLab"
				data-show-jump-to="true">
				<thead>
				  <tr>
				  <th data-formatter="stat_order_lab" >Status</th>
					<th data-field="no_rm">No. RM</th>
					<th data-field="nama">Nama</th>
					<!-- <th data-field="nama_unit">Nama Unit</th> -->
					<th data-formatter="nama_gol_unit">Nama Unit</th>
					<th data-field="nama_penjamin">Nama Penjamin</th>
					<th data-field="tgl_rencana_lab">Tanggal Rencana</th>
					<th data-field="tgl_masuk_lab" >Tanggal Kunjungan</th>
					<th data-formatter="del_order_lab" >Edit</th>
				  </tr>
				</thead>
			</table>
		</div>
		<div id="pendLab1" class="card m-1 collapse">
			<div class="card-body p-2">
				<div class="row">
					<div class="col-sm-3" >
						<div class="row row-style">
							<div class="col-sm-2">
								<label for="">No. RM</label>
							</div>
							<div class="col-sm-auto">:</div>
							<div class="col-sm-auto">							
								<input type="text"  id="no_rm_pendaftaran_lab" class="form-control form-control-xs" disabled><br/>
							</div>
						</div>
						<div class="row row-style">
							<div class="col-sm-2">
								<label>Nama</label>
							</div>
							<div class="col-sm-auto">:</div>
							<div class="col-sm-auto">							
								<input type="text"  id="nama_pendaftaran_lab" class="form-control form-control-xs" disabled><br/>
							</div>
						</div>
						<div class="row row-style">
							<div class="col-sm-2">
								<label for="">Alamat</label>
							</div>
							<div class="col-sm-auto">:</div>
							<div class="col-sm-auto">
								<input type="text"  id="alamat_pendaftaran_lab" class="form-control form-control-xs" disabled><br/>
							</div>
						</div>
						<div class="row row-style">
							<div class="col-sm-2">
								<label for="">Rincian Order</label>
							</div>
							<div class="col-sm-auto">:</div>
							<div class="col-sm-auto" id="RinciorderLab">
								<!-- <textarea  id="produk_pendaftaran_lab" class="" disabled></textarea><br/> -->
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
								<input type="text"  id="tgl_lahir_lab" class="form-control form-control-xs" disabled>
							</div>
						</div>
						<div class="row row-style">
							<div class="col-sm-2">
								<label for="">Tanggal Rencana</label>
							</div>
							<div class="col-sm-auto">:</div>
							<div class="col-sm-auto">							
								<input type="text"  id="tgl_renc_pendaftaran_lab" class="form-control form-control-xs" disabled><br/>
							</div>
						</div>
						<div class="row row-style">
							<div class="col-sm-2">
								<label for="">Tanggal Masuk</label>
							</div>
							<div class="col-sm-auto">:</div>
							<div class="col-sm-auto">							
								<input type="text"  id="tgl_masuk_pendaftaran_lab" class="form-control form-control-xs" disabled><br/>
							</div>
						</div>
						<div class="row row-style">
							<div class="col-sm-2">
								<label> Pilih Penjamin</label>
							</div>
							<div class="col-sm-auto">:</div>
							<div class="col-sm-auto">							
								<select class="form-control form-control-xs" name="listPenjamin" id="listPenjaminLab" ></select><br>
							</div>
						</div>
					</div>
					<div class="col-sm-3" >
						<div class="row row-style">
							<div class="col-sm-3">
								<label for="">Kamar Asal</label>
							</div>
							<div class="col-sm-auto">:</div>
							<div class="col-sm-auto">							
								<input type="text"  id="nama_kamar" class="form-control form-control-xs" disabled><br/>
							</div>
						</div>
						<div class="row row-style">
							<div class="col-sm-3">
								<label for="">Unit Asal</label>								
							</div>
							<div class="col-sm-auto" id="">:</div>
							<div class="col-sm-auto" id="">
								<input type="text"  id="nma_unit_pendaftaran_lab" class="form-control form-control-xs" disabled>
								<input id="nma_unit_lab_id" type="hidden" value=""><br/>
							</div>
						</div>
						<div class="row row-style">
							<div class="col-sm-3">
								<label>Dokter Pengirim</label>								
							</div>
							<div class="col-sm-auto" id="">:</div>
							<div class="col-sm-auto" id="">
								<input class="form-control form-control-xs" name="dokterLab_kirim" id="dokterLab_kirim" ><br>
								<input id="dokterLab_kirim_id" name="dokterLab_kirim" type="hidden" value="">
								<input id="dokterLab_kirim_id_lis" name="dokterLab_kirim" type="hidden" value="">
							</div>
						</div>
						<div class="row row-style">
							<div class="col-sm-3">
								<label>Diagnosa</label>
							</div>
							<div class="col-sm-auto">:</div>
							<div class="col-sm-auto">
								<input type="text"  id="diagLab" class="form-control form-control-xs" disabled>
								<input id="diagLab_id" type="hidden" value="">
							</div>
						</div>
					</div>
					<div class="col-sm-3" id="">
						<div class="row row-style">
							<div class="col-sm-auto" id="">
								<label for="citolab">CITO :</label>
								<input type="checkbox" id="citolab"/>
							</div>
							<div class="col-sm-auto" id="" style="padding-inline-start: 120px;">
								<button class="btn btn-danger" type="button" onclick="closeDetailLab();"><i class="fas fa-times"></i></button>
							</div>							
						</div>
						<div class="row row-style" style="padding-block-start: 50px;">
							<div class="col-sm-3">
								<label>Dokter Pembaca</label>								
							</div>
							<div class="col-sm-auto" id="">:</div>
							<div class="col-sm-auto" id="">
								<select class="form-control form-control-xs" name="dokterLab_baca" id="dokterLab_baca" ></select><br>
							</div>
						</div>
					</div>
				</div>
				<div class="row" >
					<div class="col-sm-4" id="">
						<div class="col-sm-auto collapse" id="orderProdLab">
							<button type="button" class="btn btn-dark" onclick="viewEditProdLab()">+ Tambah</button>
							<button type="button" class="btn btn-dark" onclick="deletProdLab()">- Hapus</button>
						</div>
					</div>
					<div class="col-sm-2" id=""></div>
					<div class="col-sm-2" id="">
						<button type="button" class="btn btn-danger" onclick="DelOrderLab()" id="batal_lab">Batalkan Semua Order</button>
					</div>
					<div class="col-sm-2" style="padding-left:35px">
						<button type="button" class="btn btn-primary" onclick="saveCaraKeluarLab()" id="pasien_lab_selesai">Pasien Selesai</button>
					</div>
					<div class="col-sm-2" id="">
						<button type="button" id="Divid_kunjungan_lab" class="btn btn-primary collapse" onclick="savependflab()">Eksekusi Order</button>
					</div>	
				</div>			
			</div>
			<div id="pendLab2" class="card-body p-2 collapse">
				<div class="row row-style" id=""></div>
				<table
					id="tableViewLabOrder"				
					class="table table-striped table-sm choose"
					data-header-style=""
					data-single-select="true"
					data-row-style=""
					data-show-jump-to="true"
					data-click-to-select="true">
					<thead>
					  <tr>
					  <th data-checkbox="true">#</th>
						<th data-field="no">No.</th>
						<th data-field="nama_produk">Nama Produk</th>
						<th data-field="nama_pegawai">Dokter</th>
						<th data-field="total_harga">Harga</th>
						<th data-formatter="bhp_lab">BHP</th>
					  </tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" data-keyboard="false" data-backdrop="static" id="searchProdLab" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
		<div class="modal-header">
			<h2 class="modal-title" id="">Tambah Produk</h2>
			<button type="button" class="btn-close" data-bs-dismiss="modal" onclick="closeModalPendfLab()" aria-label="Close"><i class="fas fa-times"></i></button>
		</div>
		<div class="modal-body">
			<div class="row">
				<div id="col-sm-4">
					<label>Kode</label>
					<input type="text"  id="kode_lab_produk" onkeypress="caribykodeprodlab(event)" class="form-control form-control-xs" ><br/>
				</div>
				<div id="col-sm-4">
					<label>Nama Produk</label>
					<input type="text"  id="nama_lab_produk" onkeypress="caribynamaprodlab(event)" class="form-control form-control-xs" ><br/>
				</div>
				<div id="col-sm-4" style="padding-top: 10px">
					<button class="btn btn-dark" onclick="viewEditProdLab()"><i class="fa fa-search"></i></button>
				</div>
			</div>
			<div class="row">
				<div class="col" id="">
				<table
				id="tableProdukLab"
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
			<button type="button" class="btn btn-default" data-bs-dismiss="modal" onclick="closeModalPendfLab()">Close</button>
			<button type="button" class="btn btn-default" onclick="saveProdukLab()">Save changes</button>
		</div>
    </div>
  </div>
</div>

<div class="modal fade"  data-backdrop="static" id="searchPasienLab" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h2 class="modal-title" id="">Klinik Laboratori</h2>
				<button type="button" class="btn-close" data-bs-dismiss="modal" onclick="closeModalPendfLangsung()" aria-label="Close"><i class="fas fa-times"></i></button>
			</div>
			<div class="modal-body">
				<div class="row row-style">
					<div class="col-sm-2">
						<label>Dokter Laboratori</label>								
					</div>
					<div class="col-sm-auto">:</div>
					<div class="col-sm-2">
						<select class="form-control form-control-xs" name="dokterLab2" id="dokterLab2" ></select><br>
					</div>
					<div class="col-sm-2">
						<label>Dokter Pengirim</label>								
					</div>
					<div class="col-sm-auto">:</div>
					<div class="col-sm-2">
						<input type="text"  id="dokterLab3" class="form-control form-control-xs"><br/>
					</div>	
					<div class="col-sm-2">
						<div class="btn-group pull-right">
		          <button type="button" class="btn bg-gradient-secondary btn-xs"><i class="fas fa-print"></i> Cetak</button>
		          <button type="button" class="btn bg-gradient-secondary dropdown-toggle dropdown-icon btn-xs" data-toggle="dropdown">
		            <span class="sr-only">Toggle Dropdown</span>
		          </button>
		          <div class="dropdown-menu p-1" role="menu">
		            <!-- <a class="dropdown-item" href="#"><i class="fa fa-file"></i> Surat Pernyataan</a> -->
		            <!-- <div class="dropdown-divider m-0"></div> -->
		            <a class="dropdown-item" href="#" onclick="Lab_printlabel()"><i class="fa fa-user"></i> Label Pasien</a>
		            <!-- <div class="dropdown-divider m-0"></div>
		            <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Status Pasien</a> -->
		            <div class="dropdown-divider m-0"></div>
		            <a class="dropdown-item" href="#" onclick="Lab_printkartu()"><i class="fa fa-credit-card"></i> Kartu Pasien</a>
		            <!-- <a class="dropdown-item" href="#" onclick=""><i class="fa fa-code"></i> Gelang Pasien</a> -->
		            <br>
		          </div>
		        </div>
					</div>
				</div>
				<div class="row row-style">
					<div class="col-sm-2">
						<label>Diagnosa</label>								
					</div>
					<div class="col-sm-auto">:</div>
					<div class="col-sm-2">
						<select class="diagnosaLab form-control form-control-xs" id="diagnosaLab"><br/>
						</select><br/>
					</div>					
					<div class="col-sm-2">							
						<label for="citolab2">CITO</label>						
					</div>
					<div class="col-sm-auto">:</div>
					<div class="col-sm-2">	
						<input type="checkbox" id="citolab2" checked="unchecked"/>
					</div>
				</div>
				<div class="row row-style" >
					<div class="col" >
						<div class="row">
							<div id="col-sm-4">
								<label>Kode</label>
								<input type="text"  id="kode_lab_produk_lngs" onkeypress="caribykodeprodlablngsung(event)" class="form-control form-control-xs" ><br>
							</div>
							<div id="col-sm-4" style="padding-left:5px">
								<label>Nama Produk</label>
								<input type="text"  id="nama_lab_produk_lngs" onkeypress="caribynamaprodlablngsung(event)" class="form-control form-control-xs" ><br>
							</div>
							<div id="col-sm-2" style="padding-top: 15px; padding-left:10px">
								<button class="btn btn-dark btn-sm" onclick="viewEditProdLablngsung()"><i class="fa fa-search"></i></button>
							</div>
							<div id="col-sm-1"></div>
							<div id="col-sm-1" style="padding-top: 10px;padding-left:50px">
								<button type="button" class="btn btn-primary btn-sm" onclick="addProdLabLangsung()"><i class="fa fa-plus" aria-hidden="true"></i>Add</button>
							</div>
						</div>					
						<div class="row" style="height: 400px;  overflow-y: scroll;">
							<div class="col table-responsive" id="">
								<table
								id="tableListProdukLab"
								class="table table-striped table-sm choose"
								data-pagination="true"
								data-click-to-select="true">
									<thead>
									  <tr>
										<th data-checkbox="true">#</th>
										<th data-field="no">No.</th>
										<th data-field="nama_produk">Nama</th>
										<th data-field="harga">Harga</th>
									  </tr>
									</thead>
									<tbody id="">										
									</tbody>
								</table>
							</div>							
						</div>					
					</div>
					<div class="col" id="">
						<div class="row" id="">
							<div class="col" id="">
								<br><h5>Order List Produk</h5>
							</div>	
							<div class="col" id="" style="padding-top: 10px">
								<button type="button" class="btn btn-danger btn-sm" onclick="delProdLabLangsung()" style="float: right"><i class="fa fa-trash" aria-hidden="true"></i>Hapus</button>
							</div>						
						</div>
						<div class="row" id="">
							<div class="col" id="">
								<table
								id="selectedProdLab"
								class="table table-striped table-sm choose"
								data-click-to-select="true"
								data-search-on-enter-key="true"
								data-show-jump-to="true">
									<thead>
									  <tr>
										<th data-checkbox="true">#</th>
										<th data-field="no">No.</th>
										<th data-field="nama_produk">Nama</th>
										<th data-field="harga">Harga</th>
									  </tr>
									</thead>
									<tbody id=""></tbody>
								</table>
							</div>							
						</div>						
					</div>
				</div>
				<div class="row row-style" id=""></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-bs-dismiss="modal" onclick="closeModalPendfLangsung()">Close</button>
				<button type="button" class="btn btn-default" onclick="cekKunjLngsng()">Save changes</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" data-keyboard="false" data-backdrop="static" id="pilihKeluarLab" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
		<div class="modal-header">
			<h2 class="modal-title" id="">Tindakan Selesai</h2>
			<button type="button" class="btn-close" data-bs-dismiss="modal" onclick="closeModalPendfLangsung()" aria-label="Close"><i class="fas fa-times"></i></button>
		</div>
		<div class="modal-body">
			<div class="row" id="">
				<div class="col-sm-4" id="">
					<label>Cara Keluar</label>					
				</div>
				<div class="col-sm-auto" id=""></div>
				<div class="col-sm-4" id="">
					<select class="form-control form-control-xs" name="" id="cara_keluar_lab"></select><br>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-bs-dismiss="modal" onclick="closeModalPendfLangsung()">Close</button>
			<button type="button" class="btn btn-default" onclick="saveCaraKeluarLab()">Save changes</button>
		</div>
    </div>
  </div>
</div>

<script>
	var nowday      = "<?php echo date('Y-m-d'); ?>";
	var listProdDaftrLab=[];
	var tablePendaftaranLabOrder = $('#tablePedaftaranLabOrder');
	var tableViewLabOrder = $('#tableViewLabOrder');
	var tableListProdukLab = $('#tableListProdukLab');
	var tableselectedProdLab = $('#selectedProdLab');
	var tableProdukLab = $('#tableProdukLab');
	var id_kunjungan_lab_datang;
	var id_kunjungan_lab;
	var id_transaksi_lab;
	var id_dokter_baca_lis;
	var id_dokter_kirim_lis;
	var id_kamar_lis='';
	var urut;
	var tempListProdLab=[];
	var pasien=[];
	var dis='';


    tablePendaftaranLabOrder.bootstrapTable({
       onDblClickRow: function (row, $element, field) {
			var baris;
			var parampenj={
				no_rm : row['no_rm'],
				id_transaksi: row['id_transaksi']
			}
			
			$("#pendLab0").hide();			
			$("#pendLab1").show();
			$("#pendLab2").show();
			document.getElementById('no_rm_pendaftaran_lab').value = row['no_rm'];
			document.getElementById('nama_pendaftaran_lab').value = row['nama'];
			document.getElementById('tgl_renc_pendaftaran_lab').value = row['tgl_rencana_lab'];
			document.getElementById('nma_unit_pendaftaran_lab').value = row['nama_unit'];	
			document.getElementById('nma_unit_lab_id').value = row['id_unit'];	
			document.getElementById('alamat_pendaftaran_lab').value = row['alamat'];	
			document.getElementById('tgl_lahir_lab').value = row['tgl_lahir'];
			document.getElementById('dokterLab_kirim_id_lis').value = row['lama_lis'];
			id_kunjungan_lab_datang = row['id_baru'];
			id_kunjungan_lab= row['id_lama'];
			id_transaksi_lab= row['id_transaksi'];
			id_dokter_kirim_lis= row['lama_lis'];
			id_dokter_baca_lis=row['baru_lis'];
			urut=row['urut_masuk']
			
			listDokterLab();
			loadDetailLab();
			
			/* if(row['id_lama']==null){
				$("#batal_lab").hide();
			} */
			if(row['nama_kamar']==null){
				document.getElementById('nama_kamar').value = '-';
				document.getElementById('tgl_masuk_pendaftaran_lab').value = '-';
				apiPOST("Lab/CariLisKamar", $('#nma_unit_lab_id').val(), hasil => {
					id_kamar_lis=hasil['data'][0].id_lis_kamar;
				})
			}else{
				document.getElementById('nama_kamar').value = row['nama_kamar'];
				document.getElementById('tgl_masuk_pendaftaran_lab').value = row['tgl_masuk_lab'];
				id_kamar_lis=row['id_lis_kamar'];
			}
			if(row['id_baru']==null && row['tgl_keluar']==null){
				$("#Divid_kunjungan_lab").show();
				$("#pasien_lab_selesai").show();
				$("#orderProdLab").hide();
				$("#dokterLab_baca").prop("disabled", false);
				$("#citolab").prop("disabled", false);
				$("#listPenjaminLab").prop("disabled", false);
				$("#dokterLab_kirim").prop("disabled", false);
				document.getElementById('tgl_masuk_pendaftaran_lab').value = '-';
				dis='';
			}else if(row['id_baru']!==null && row['tgl_keluar']==null){
				$("#Divid_kunjungan_lab").hide();
				$("#pasien_lab_selesai").show();
				$("#orderProdLab").show();
				$("#citolab").prop("disabled", false);
				$("#dokterLab_kirim").prop("disabled", false);
				$("#dokterLab_baca").prop("disabled", true);
				$("#listPenjaminLab").prop("disabled", true);
				document.getElementById('tgl_masuk_pendaftaran_lab').value = row['tgl_masuk_lab'];
				dis='';
			}else{
				$("#Divid_kunjungan_lab").hide();
				$("#pasien_lab_selesai").hide();
				$("#orderProdLab").hide();
				$("#dokterLab_baca").prop("disabled", true);
				$("#citolab").prop("disabled", true);
				$("#listPenjaminLab").prop("disabled", true);
				$("#dokterLab_kirim").prop("disabled", true);
				document.getElementById('tgl_masuk_pendaftaran_lab').value = row['tgl_masuk_lab'];
				dis='disabled';
			}
			if(row['id_pengirim']==null){
				apiPOST('Lab/cekhasilLngsung', row['id_baru'],hasil=>{
					document.getElementById('dokterLab_kirim').value=hasil['data'].pengirim;
				});
				apiPOST('Radiologi/viewDiagnosa', row['id_baru'],hasil=>{
					if(hasil['data']!==null){
						document.getElementById('diagLab').value = hasil['data'].penyakit;
						document.getElementById('diagLab_id').value = hasil['data'].id_penyakit;
					}else{
						document.getElementById('diagLab').value = '-';
						document.getElementById('diagLab_id').value = 0;
					}
				})
			}else{
				apiPOST('Radiologi/pegawai', row['id_pengirim'],hasil=>{
					document.getElementById('dokterLab_kirim').value=hasil['data'][0].nama_pegawai;
					document.getElementById('dokterLab_kirim_id').value=hasil['data'][0].id_pegawai;
				});
				apiPOST('Radiologi/viewDiagnosa', row['id_lama'],hasil=>{
					if(hasil['data']!==null){
						document.getElementById('diagLab').value = hasil['data'].penyakit;
						document.getElementById('diagLab_id').value = hasil['data'].id_penyakit;
					}else{
						document.getElementById('diagLab').value = '-';
						document.getElementById('diagLab_id').value = 0;
					}
				})
			}
			if(row['order_produk']!==null){
				apiPOST('Lab/getListProdukLab', row['order_produk'],hasil=>{
					document.getElementById('RinciorderLab').innerHTML	= '';
					var b = hasil['data'];
					var nama_prod = '';
					baris='';
					listProdDaftrLab.push(b);
					
					if (hasil !==null){
						document.getElementById('RinciorderLab').innerHTML='';
						for (var i = 0; i < b.length; i++) {
							nama_prod = hasil['data'][i].nama_produk;						
							// document.getElementById('produk_pendaftaran_lab').value += nama_prod+'\n';
							baris = '<label><u>'+nama_prod+'</u></label><br>';
							$('#RinciorderLab').append(baris);
						}						
					}
				});
			}else{
				baris='';
				document.getElementById('RinciorderLab').innerHTML='';
				baris = '<label><u>Masih Belum Order Produk</u></label><br>';
				$('#RinciorderLab').append(baris);
			}
			
			apiPOST('Lab/listPenjamnLab', parampenj,hasil=>{
				var penjm = hasil['data'];
				var penjamin = '';
								
				if (hasil !==null){				
					for (var i = 0; i < hasil['data'].length; i++) {					 
					  if (penjm.nama_penjamin=row['nama_penjamin']){ 
						  penjm = hasil['data'][i];
						  penjamin +='<option value="'+penjm.id_penjamin+'" selected>'+penjm.nama_penjamin+'</option>';
						  document.getElementById('listPenjaminLab').innerHTML= penjamin;
					  }else{
						  penjm = hasil['data'][i];						 
						  penjamin +='<option value="'+penjm.id_penjamin+'">'+penjm.nama_penjamin+'</option>';
						  document.getElementById('listPenjaminLab').innerHTML= penjamin;
					  }				
					}	
				}		
			});		
			
      },       
    });	
    
    tableViewLabOrder.bootstrapTable({});
	tableListProdukLab.bootstrapTable({});
	tableselectedProdLab.bootstrapTable({});
	tableProdukLab.bootstrapTable({});
	
	$(document).ready(function() {
	  setTimeout(refresh_pendft_lab, 1000); 
	  document.getElementById('tgl_renc_lab').value = nowday;
	  // document.getElementById('tgl_kunj_lab').value = nowday;

	  notifLab();
	  
	  $("#diagnosaLab").select2({
			placeholder: "Ketikan Kode Diagnosa",
			allowClear: true,
			dropdownParent: $('#searchPasienLab')
		});
	})
	
	$(document).on('keyup', '.select2-search__field', function(ev) {
		var self = $(this);
		if (self.val().length > 1) {
			tampil_diagnosa_lab(self.val());
		}
	});
	
	function tampil_diagnosa_lab(kode) {
		var param = {
			id: kode
		};
		apiPOST('Data_Sosial/diagnosabyname', param, hasil => {
			var penjamin = '';
			var a = hasil['data'];
			for (var i = 0; i < a.length; i++) {
				penjamin += '<option value="' + a[i]['id_penyakit'] + '">' + a[i]['id_penyakit'] + ' | ' + a[i]['penyakit'] + '</option>';
			}
			document.getElementById('diagnosaLab').innerHTML = penjamin;
		});
	}
	
	function headerStyleOrderPendaftaranLab(column){
        return {
            css: {
                background: 'rgb(40 159 32 / 39%)',
                color: 'black',
                border: '2px solid black'
            }
        };
    }
    
    function rowStyleOrderPendaftaranLab(row, index){
        return {
            css: {
                background: 'white',
                border: '2px solid black'
            }
        };
    }
	
	function del_order_lab(value,row){	
		var buton= "<button type='button' class='btn btn-xs btn-outline-danger' onclick='delListOrderLab("+row.id_transaksi+","+row.id_lama+","+row.urut_masuk+")'><i class='fa fa-trash'></i></button>";
		return buton;
	}

	function stat_order_lab(value,row){
		var status='';
		if(row.tgl_keluar==null){
			status= '<img src="http://localhost/DartoMakanYuyu/cross_ci3/_assets/dist/img/cancel.png" width="20px" height="20px" title="Belum Dilayani">';
		}else{
			status= '<img src="http://localhost/DartoMakanYuyu/cross_ci3/_assets/dist/img/checklist.png" width="20px" height="20px" title="Sudah Dilayani">';
		}	
		return status;
	}
	
	function bhp_lab(value,row,index){	
		var buton= "<button type='button' class='btn btn-xs btn-outline-danger' onclick='mod_bhp_lab("+row.id_detail_kunjungan+")' "+dis+"><i class='fa fa-plus'></i></button>";
		return buton;
	}
	
	function mod_bhp_lab(det_kunj){		
		showModalBHPProduk(det_kunj, 7001);
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
	
	function nama_pegawai(value,row){
		return $('#dokterLab_baca').text();
	}
	
  function Labshow(){		
		$('#pendLab1').hide();
		$('#pendLab2').hide();
		$('#pendLab0').show();
		$("#batal_lab").show();
		$('#loading_pendfLab').show();
		
		$('#tablePedaftaranLabOrder').bootstrapTable('removeAll');
		listProdDaftrLab=[];
		id_kunjungan_lab_datang='';
		id_kunjungan_lab='';
		id_transaksi_lab='';
		document.getElementById('dokterLab_kirim').value='';
		
		var param={
			norm: $("#norm_lab").val(),
			tgl_renc: $("#tgl_renc_lab").val(),
			tgl_kunj: $("#tgl_kunj_lab").val(),
		};
		var b;
        apiPOST('Lab/lookUpOrder', param,hasil=>{
			if (hasil !==null){
				b = hasil['data']
				listProdDaftrLab.push(b);
				tablePendaftaranLabOrder.bootstrapTable('append', hasil['data']);
			}
		}).then(refresh_pendft_lab());
		/* console.log(listProdDaftrLab); */
  }

  function notifLab(){
		apiPOST('Lab/getNotiflab', param,hasil=>{
			if (hasil !==null){
				b = hasil['data'];
				nomor= hasil['id'];
				var tek=''
				document.getElementById('notif_bagde').innerHTML = b[0].count;
				tek += '<span class="dropdown-item dropdown-header">'+b[0].count+' Pemberitahuan Lab</span>';
				for(var i=0;i<b[0].count;i++){
					tek += '<div class="dropdown-item p-1" onclick="onloadPanel(this, '+"'"+nomor+"'"+')">';
					tek += '<div class="media">';
					tek += '<div class="img-notif mt-2">'+b[i].nomor+'</div>'
					tek += '<div class="media-body p-1">';
					tek += '<a href="#"><b>Penerimaan Order Lab</b></a>';
					tek += '<h3 class="dropdown-item-title">Order Lab Belum Dilayani</h3>';
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
		setTimeout(refresh_notif_lab, 300000);
	}    
    
  function viewOrderPendaftaranLab(data){
      /*         
      var pendLab1 = document.getElementById('pendLab1');
      pendLab1.innerHTML = '';
      
      var dataSosialPendaftaranLab = document.createElement('div');
      
      pendLab1.appendChild(dataSosialPendaftaranLab);
      
      var labelOrderPendaftaranLab = document.createElement('h4');
      labelOrderPendaftaranLab.innerHTML = 'Pemeriksaan :';
      pendLab1.appendChild(labelOrderPendaftaranLab);
              
      var isiOrderPendaftaranLab = document.createElement('div');
      isiOrderPendaftaranLab.classList.add("container-fluid");
      isiOrderPendaftaranLab.classList.add("p-2");
      isiOrderPendaftaranLab.classList.add("border");
      isiOrderPendaftaranLab.classList.add("rounded");
      isiOrderPendaftaranLab.style.background = 'white';
      isiOrderPendaftaranLab.innerHTML = data['isi'];
      pendLab1.appendChild(isiOrderPendaftaranLab); */
  }	
	
	function listDokterLab(){
	  var a ='';
	  apiPOST('Lab/dokterLab', null,hasil=>{
		a = hasil['data'];		
		var b='';
		
		if (hasil !==null){	
			for (var i = 0; i < a.length; i++) {
			  a = hasil['data'][i];
			  b+='<option value="'+a.id_pegawai+'">'+a.nama_pegawai+'</option>';
			}
			document.getElementById('dokterLab_baca').innerHTML=b;
			document.getElementById('dokterLab2').innerHTML=b;
		} 
	  });	  
	}

	function savependflab(){
		if($('#citolab').prop("checked")){	citos=1;	}else{	citos=0;	}
		if($("#nma_unit_lab_id").val().charAt(0)==2){kelas=$("#nma_unit_lab_id").val();}else{kelas='6001';}
		/* if(id_kunjungan_lab_datang!==null){
			return;
		} */
		
		var param = { 
		id_unit: kelas,
		id_transaksi: id_transaksi_lab,
		id_pegawai: $("#dokterLab_baca").val(),
		id_pengirim: $("#dokterLab_kirim").val(),
		id_penjamin: $("#listPenjaminLab").val(),
		tgl_rencana_lab: $("#tgl_renc_pendaftaran_lab").val(),
		id_kunjungan: id_kunjungan_lab,
		id_kunjungan_lab: id_kunjungan_lab_datang,
		id_produk: listProdDaftrLab[1],
		cito: citos,
		urut:urut,
		status_kunjungan: "1"		
		}
		
		apiPOST('Lab/saveKunjunganLab',param,hasil=>{
			id_kunjungan_lab_datang = hasil['data'];
			loadDetailLab()	;
			$("#pendLab2").show();
			$("#Divid_kunjungan_lab").hide();
			$("#pasien_lab_selesai").show();
			$("#orderProdLab").show();
			$("#tgl_masuk_pendaftaran_lab").val()=nowday;
			$("#dokterLab_baca").prop("disabled", true);
			$("#citolab").prop("disabled", true);
		}); 		
		// console.log(param); 
	}
	
	function loadDetailLab(){
		$('#tableViewLabOrder').bootstrapTable('removeAll');
		if(id_kunjungan_lab_datang!==null){
			var param2 = {id_kunjungan_lab: id_kunjungan_lab_datang}
			
			apiPOST('Lab/viewDetail',param2,hasil=>{
			if (hasil !==null){
				tableViewLabOrder.bootstrapTable('append', hasil['data']);
			}
			});	
		}		
	}
	
	function kunjunganLangsungPendafLab(new_pasien){
		$("#searchPasienLab").modal("show");
		pasien=[];
		listDokterLab();
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
			id_penjamin:'1'
			/* nik_penanggung: */
		};	
		pasien.push(pasien_baru);
		tempListProdLab=[];
		viewEditProdLablngsung();
		refershSelectedProdLab();
	}
	
	function viewEditProdLab(){
		$('#searchProdLab').modal("show");
		tableProdukLab.bootstrapTable('removeAll');
		var penj;
		
		if($("#listPenjaminLab").val()==null){ penj='1';}else{ penj=$("#listPenjaminLab").val();}
		if($("#nma_unit_lab_id").val().charAt(0)==2){kelas=$("#nma_unit_lab_id").val();}else{kelas='6001';}
		
		/* */var param={
			produk: $("#kode_lab_produk").val(),
			nama_produk: $("#nama_lab_produk").val(),
			id_penjamin: penj,
			id_unit:kelas
		}; 
		
		apiPOST('Lab/produkLab', param,hasil=>{		
			if (hasil !==null){
				var b=hasil['data'];				
				tableProdukLab.bootstrapTable('append', hasil['data']);
			}  
		  });
		document.getElementById('kode_lab_produk').value = '';
		document.getElementById('nama_lab_produk').value = '';
	}
	
	function viewEditProdLablngsung(){
		tableListProdukLab.bootstrapTable('removeAll');
		var penj;
		
		if($("#listPenjaminLab").val()==null){
			penj='1';
		}else{
			penj=$("#listPenjaminLab").val();
		}
		if($("#nma_unit_lab_id").val().charAt(0)==2){kelas=$("#nma_unit_lab_id").val();}else{kelas='6001';}
		
		/* */var param={
			produk: $("#kode_lab_produk_lngs").val(),
			nama_produk: $("#nama_lab_produk_lngs").val(),
			id_penjamin: penj,
			id_unit:kelas
		}; 
		
		apiPOST('Lab/produkLab', param,hasil=>{		
			if (hasil !==null){			
				tableListProdukLab.bootstrapTable('append', hasil['data']);
			}  
		  });
		document.getElementById('kode_lab_produk_lngs').value = '';
		document.getElementById('nama_lab_produk_lngs').value = '';
	}
	
	function delListOrderLab(id_trans,id_kunj,urut){
		var param = { 
			id_transaksi:id_trans,
			id_kunjungan:id_kunj,
			urut_masuk:urut
		}
		console.log(param);
		pertanyaan.fire({
			title: 'Proses Hapus Order',
			html: '<span>Apakah Anda ingin Menghapus Order Ini ?</span><p><i>Data tidak dapat dikembalikan lagi !!</i></p>',
			icon: 'question',
			showCancelButton:true,
			reverseButtons:false,
			allowOutsideClick:false,
		}).then((result)=>{
			if(result.isConfirmed){
				apiPOST("Lab/dellistorder", param, hasil => {		      
						Labshow();		      
		    });
			}
		})		
	}
	
	function saveProdukLab(){
		var value_check = tableProdukLab.bootstrapTable('getSelections');
		if($("#nma_unit_lab_id").val().charAt(0)==2){kelas=$("#nma_unit_lab_id").val();}else{kelas='6001';}
		
		var param = { 
		id_unit: kelas,
		id_transaksi: id_transaksi_lab,
		id_pegawai: $("#dokterLab_baca").val(),
		id_penjamin: $("#listPenjaminLab").val(),
		tgl_rencana_lab: $("#tgl_rencana_lab").val(),
		id_kunjungan_lab: id_kunjungan_lab_datang,	
		id_produk: value_check[0].id_produk,
		status_kunjungan: "1"		
		}		
			 
		apiPOST("Lab/saveProdLab", param, hasil => {
            if(hasil !== null){				
				loadDetailLab();
            }
        })		
		/* console.log(value_check); 
		console.log(param); */
	}
	
	function deletProdLab(){
		var value_check = tableViewLabOrder.bootstrapTable('getSelections');
		
		var param = { 

		id_kunjungan_lab: id_kunjungan_lab_datang,	
		id_produk: value_check[0].id_produk,
		tgl_input: value_check[0].tgl_input,
		status_kunjungan: "1"		
		}
		
		apiPOST("Lab/delDetilProd", param, hasil => {
            if(hasil !== null){				
				loadDetailLab()
            }
        });
		// console.log(value_check[0]);
	}
	
	function addProdLabLangsung(){
		var table = $("#tableListProdukLab");
		var value_check = table.bootstrapTable('getSelections');
		/*if(tempListProdLab<=''){
			tempListProdLab.push(value_check);
		} else{
			tempListProdLab.push(value_check);
		}		 */			
		tempListProdLab.push(value_check);
		table.bootstrapTable('uncheckAll');
		refershSelectedProdLab();
		/* console.log(JSON.stringify(value_check)); */
	}
	
	function delProdLabLangsung(){
		var table = $("#selectedProdLab");
		var value_check = table.bootstrapTable('getSelections');
		/**/ table.bootstrapTable('remove', {
			field: 'nama_produk',
			values: value_check[0].nama_produk
		 });
		tempListProdLab=[];
		tableselectedProdLab.bootstrapTable('checkAll');
		var newer_data=table.bootstrapTable('getData');
		tempListProdLab.push(newer_data);
		tableselectedProdLab.bootstrapTable('uncheckAll');
		/* console.log(newer_data); */
	}
	
	function refershSelectedProdLab(){
		$('#selectedProdLab').bootstrapTable('removeAll');
		for(i=0;i<tempListProdLab.length;i++){
			tableselectedProdLab.bootstrapTable('append', tempListProdLab[i]);
			tableselectedProdLab.bootstrapTable('uncheckAll');
		}		
	}
	
	function cekKunjLngsng(){
		apiPOST("Lab/cektransLngsung", pasien[0].no_rm, hasil => {
			if(hasil.data==null){
				pertanyaan.fire({
					title: 'Proses Daftar Langsung',
					html: '<span>Transaksi Sudah Ada, Apakah Buat Ulang ?</span>',
					icon: 'question',
					showCancelButton:true,
					reverseButtons:false,
					allowOutsideClick:false,
				}).then((result)=>{
					if(result.isConfirmed){
						savekunjunganLabLangsung()
					}else if(result.dismiss===Swal.DissmissReason.cancel){}
				})
			}else{
				savekunjunganLabLangsung()
			}
			
		})
	}
	
	function savekunjunganLabLangsung(){
		if($('#citolab2').prop("checked")){	citos=1;	}else{	citos=0;	}
		tableselectedProdLab.bootstrapTable('checkAll');
		var newer_data=tableselectedProdLab.bootstrapTable('getData');
		var param={
			nik: 		pasien[0].nik,
			nama: 		pasien[0].nama,
			hubungan: 	'pasien',
			no_hp: 		pasien[0].no_hp,
			alamat: 	pasien[0].alamat,
			id_user: 	user.id_user,
			no_rm: 		pasien[0].no_rm,		
			id_pegawai: $("#dokterLab2").val(),						
			produk: 	newer_data,
			tgl_kunj:	nowday,
			id_penjamin:'1',	
			diagnosa:$("#diagnosaLab").val(),
			cito:citos
			/* id_produk: newer_data
			nik_penanggung: */
		};
		// console.log(param);
		
		apiPOST("Lab/saveKunjunganLabLangsung", param, hasil => {
            if(hasil !== null){
				closeModalPendfLangsung();
				$('#loading_pendfLab').show();
				$('#pasien_lab_selesai').show();
				$('#batal_lab').show();
				$("#pendLab0").hide();			
				$("#pendLab1").show();
				$("#pendLab2").show();
				$("#Divid_kunjungan_lab").hide();
				setTimeout(refresh_pendft_lab, 1000);
				
				id_kunjungan_lab_datang = hasil['data'][0].id_kunjungan;
				id_transaksi_lab = hasil['data'][0].id_transaksi;
				document.getElementById('no_rm_pendaftaran_lab').value = hasil['data'][0].no_rm;
				document.getElementById('nama_pendaftaran_lab').value = hasil['data'][0].nama;
				document.getElementById('alamat_pendaftaran_lab').value = hasil['data'][0].alamat;
				document.getElementById('citolab').checked = $('#citolab2').prop("checked");
				
				document.getElementById('dokterLab_baca').innerHTML='<option value="'+hasil['data'][0].id_pegawai+'">'+hasil['data'][0].nama_pegawai+'</option>';
				$("#dokterLab_baca").prop("disabled", true);	
				loadDetailLab();	
				apiPOST('Radiologi/viewDiagnosa', hasil['data'][0].id_kunjungan,hasil=>{
					document.getElementById('diagLab').value = hasil['data'].penyakit;
					document.getElementById('diagLab_id').value = hasil['data'].id_penyakit;
				})
            }
        });
		
		document.getElementById('listPenjaminLab').innerHTML='<option value="'+1+'">UMUM</option>';
		$('#dokterLab_kirim').prop('disabled', false);
		document.getElementById('dokterLab_kirim').value = $("#dokterLab3").val();
		document.getElementById('tgl_renc_pendaftaran_lab').value = '-';
		document.getElementById('tgl_masuk_pendaftaran_lab').value = nowday;
		document.getElementById('nma_unit_pendaftaran_lab').value = '-';
		document.getElementById('nma_unit_lab_id').value = '6001';
		document.getElementById('nama_kamar').value = '-';	
		document.getElementById('produk_pendaftaran_lab').value ='-';
	}
	
	function caribykodeprodlab(e){
		if (e.keyCode == 13) {
			var param={
			kd_produk: $("#kode_lab_produk").val(),
			};			
			viewEditProdLab();
		}
	}
	
	function caribynamaprodlab(e){
		if (e.keyCode == 13) {
			var param={
			nama_produk: $("#nama_lab_produk").val(),
			};			
			viewEditProdLab();
		}
	}
	
	function caribykodeprodlablngsung(e){
		if (e.keyCode == 13) {
			var param={
			kd_produk: $("#kode_lab_produk_lngs").val(),
			};			
			viewEditProdLablngsung();
		}
	}
	
	function caribynamaprodlablngsung(e){
		if (e.keyCode == 13) {
			var param={
			nama_produk: $("#nama_lab_produk_lngs").val(),
			};			
			viewEditProdLablngsung();
		}
	}
	
	function caribyrm(e){
		if (e.keyCode == 13) {
			var param={
			norm: $("#norm_lab").val(),
			tgl_renc: $("#tgl_renc_lab").val(),
			tgl_kunj: $("#tgl_kunj_lab").val(),
		};		
			Labshow();
		}
	}
	
	function caribytglrenc(e){
		if (e.keyCode == 13) {
			var param={
			norm: $("#norm_lab").val(),
			tgl_renc: $("#tgl_renc_lab").val(),
			tgl_kunj: $("#tgl_kunj_lab").val(),
		};			
			Labshow();
		}
	}
	
	function caribytglkunj(e){
		if (e.keyCode == 13) {
			var param={
			norm: $("#norm_lab").val(),
			tgl_renc: $("#tgl_renc_lab").val(),
			tgl_kunj: $("#tgl_kunj_lab").val(),
		};			
			Labshow();
		}
	}
	
	function closeDetailLab(){
		Labshow();
	}
	
	function closeModalPendfLangsung(){
		$("#searchPasienLab").modal("hide");
		$("#pilihKeluarLab").modal("hide");
		$("#searchProdLab").modal("hide");
		$("#orderProdLab").show();
	}
	
	function closeModalPendfLab(){
		$('#searchProdLab').modal("hide");	
		$('#pilihKeluarLab').modal("hide");
		loadDetailLab();
	}
	
	function TableDelActions (value, row, index) {
     return [
      '<button type="button" class="btn btn-danger btn-sm" onclick="delProdLab()"><i class="fa fa-trash" aria-hidden="true"></i>Hapus</button>'
     ].join('');
	}
	
	function TableAddActions (value, row, index) {
     return [
      '<button type="button" class="btn btn-primary btn-sm" onclick="addProdLab()"><i class="fa fa-plus" aria-hidden="true"></i>Add</button>'
     ].join('');
	}
	
	function viewPasienSelesaiLab(){
		$('#pilihKeluarLab').modal("show");
		$('#orderProdLab').hide();
		listCaraKeluarLab();
	}
	
	function listCaraKeluarLab(){
		apiPOST("Lab/viewCaraKeluar", null, hasil => {
			var a=hasil['data'];
			var isi=''
            if(hasil !== null){				
				for (var i = 0; i < hasil['data'].length; i++) {
						a = hasil['data'][i];						 
						isi +='<option value="'+a.id_cara_keluar+'">'+a.cara_keluar+'</option>';
						document.getElementById('cara_keluar_lab').innerHTML= isi;
					}
            }
        })
	}
	
	function saveCaraKeluarLab(){
		if($('#citolab').prop("checked")){	citos=1;	}else{	citos=0;	}
		if($('#nma_unit_lab_id').val()==''){
			gol= 0;
		}else if($('#nma_unit_lab_id').val().charAt(0)==1){
			gol= 1;		
		}else if($('#nma_unit_lab_id').val().charAt(0)==2){
			gol= 2;
		}else{
			gol= 3;
		}
		
		tableViewLabOrder.bootstrapTable('checkAll');
		var newer_data=tableViewLabOrder.bootstrapTable('getSelections');
		tableViewLabOrder.bootstrapTable('uncheckAll');
		$('#loading_pendfLab').show();
		
		var token='';
		var input=[];
		var data_pasien;
		var data_pemeriksaan;
		var data_order={
			status_pasien	:$('#listPenjaminLab').val(),
			ruang			:id_kamar_lis,
			dokter_pengirim	:id_dokter_kirim_lis,
			dokter_pk		:id_dokter_baca_lis,
			bahasa			:'id',
			diagnosa		:$('#diagLab').val(),
			cito			:citos,
			golongan		:gol,
		}
		var param = { 
			id_kunjungan	: id_kunjungan_lab_datang,
			id_cara_keluar	: '1',
			id_produk		: newer_data,
			pengirim		:$("#dokterLab_kirim").val()
		}
		var b={ id:$('#no_rm_pendaftaran_lab').val()}
		
		apiPOST("Pasien/caripasienbyrm", b, hasil => {	
			var a=hasil['data'];
			if(a[0].jenis_kelamin){jk="Tn."; j_k=1}else{jk="Ny."; j_k=0;}
			var today=new Date();
			var lah=new Date(a[0].tgl_lahir);
			var age = Math.floor((today-lah) / (365.25 * 24 * 60 * 60 * 1000));
			var nmb = Number($('#no_rm_pendaftaran_lab').val()).toString();
			data_pasien={
				no_rekam		:$('#no_rm_pendaftaran_lab').val(),
				no_ref			:a[0].nik,
				no_bpjs			:1,
				sebutan			:jk,
				nama				:$('#nama_pendaftaran_lab').val(),
				jns_kelamin	:j_k,
				tgl_lahir		:a[0].tgl_lahir,
				umur				:age,
				alamat			:a[0].alamat,
				telp				:a[0].telepon
			}
			input.push({data_pasien});
			input.push({data_order});
	
			apiPOST("Lab/cekLISprod", id_kunjungan_lab_datang, hasil => {
				data_pemeriksaan=hasil['data'];
				input.push({data_pemeriksaan});
				console.log(data_pemeriksaan);
				apiPOST("Lab/Connect", null, hasil => {
					token= hasil; 
					input.push({token});
					
					apiPOST("Lab/Orderclient", input, hasil => {
						param2={
							id_kunjungan:id_kunjungan_lab_datang,
							no_lab:hasil['data'][0],
							id:hasil['data'][1],
						}
						
						apiPOST("Lab/saveLis", param2, hasil => {
							$('#loading_pendfLab').hide();
						})
					})
				}); 
			});
		});		
		
		var ids = $.map(newer_data, function (item) {return item.id_produk;});
		var ids_str= '(\u0027'+ids.join("\u0027, \u0027")+'\u0027)'; 
			
		if(newer_data[0]==null){
			refresh_pendft_lab();
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
			refresh_pendft_lab();
			apiPOST("Lab/savePasienKeluar", param, hasil => {
				closeModalPendfLangsung();
				$('#pasien_lab_selesai').hide();
				$('#orderProdLab').hide();
				loadDetailLab();
				$('#loading_pendfLab').hide();
				apiPOST('Lab/getListProdukLab', ids_str,hasil=>{
					document.getElementById('RinciorderLab').innerHTML	= '';
					var b = hasil['data'];
					var nama_prod = '';
					
					if (hasil !==null){				
						var x = document.getElementById('RinciorderLab').innerHTML;
						for (var i = 0; i < b.length; i++) {
							nama_prod = hasil['data'][i].nama_produk;						
							// document.getElementById('produk_pendaftaran_lab').value += nama_prod+'\n';
							baris = '<label><u>'+nama_prod+'</u></label><br>';
							$('#RinciorderLab').append(baris);
						}										
					}
				});
			}) 
		}
	}
	
	function DelOrderLab(){
		var param={
			id_kunjungan_lab:id_kunjungan_lab_datang,
			id_transaksi:id_transaksi_lab
		}
		
		if(id_kunjungan_lab==null){			
			apiPOST("Lab/deleteorderlngsung", param, hasil => {
				$('#citolab').prop( "disabled", false );
				$("#pasien_lab_selesai").show();
				$("#orderProdLab").show();
				$("#Divid_kunjungan_lab").hide();
				$('#tableViewLabOrder').bootstrapTable('removeAll');
			})
		}else{
			apiPOST("Lab/deleteorder", param, hasil => {
				$("#Divid_kunjungan_lab").show();
				$("#pasien_lab_selesai").hide();
				$("#orderProdLab").hide();
				$("#pendLab2").hide();
				$("#dokterLab_baca").prop("disabled", false);
				$('#citolab').prop( "disabled", true );
			})
		}
	}

	function Lab_printlabel(){    
    var param = {
      norm      : pasien[0].no_rm,      
      modul     : 'Laboratorium',
      nma_pegawai:$("#dokterLab2").text()
    };
    // console.log(param);
    newTabPOST('API/Radiologi/printlabel',param);      
    return;    
  }

	function Lab_printkartu(){
		var param = {
		  norm      : pasien[0].no_rm,      
		  modul     : 'Laboratorium'      
		};
		// console.log(param);
		newTabPOST('API/Radiologi/cetakkartupasien',param);      
		return; 
	}
	
	function refresh_pendft_lab() {
    $('#loading_pendfLab').hide();
	}

	function refresh_notif_lab(){
		if($('#tab-pendLab').hasClass('active')){
			notifLab();
			console.log('ada');
		}else{
			console.log('0');
		}
	}
	setTimeout(refresh_pendft_lab, 1000);
</script>

