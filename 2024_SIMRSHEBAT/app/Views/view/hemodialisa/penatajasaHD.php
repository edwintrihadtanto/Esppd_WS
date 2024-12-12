<?php
$nowday     = date('Y-m-d');
?>
<div class="col-md-12 p-2" id="penatajasaHD_1">
  <div class="card card-outline card-default" style="margin-bottom:0;">
    <div class="overlay-wrapper" id="penatajasaHD_loading">
      <div class="overlay">
        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
      </div>
    </div>
    <div class="card-body p-2 darkgrey-custom">
      <div class="row row-custom">
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Cari No. RM / Nama Pasienx :</label>
            <div class="input-group input-group-sm mb-3">
              <div class="input-group-prepend">
                <button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="height:25px;"></button>
                <ul class="dropdown-menu">
                  <li class="dropdown-item" onclick="show_cri_normpenatajasaHD()">No. RekamMedik</li>
                  <li class="dropdown-item" onclick="show_cri_nmpasienpenatajasaHD()">Nama Pasien</li>
                </ul>
              </div>
              <!-- /btn-group -->
              <input type="number" class="form-control form-control-xs" placeholder="Entry No. RM" id="cri_by_normpenatajasaHD">
              <input type="text" class="form-control form-control-xs" placeholder="Entry Nama Pasien" id="cri_by_nmpasienpenatajasaHD">
            </div>
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label> NIK:</label>
            <input type="search" class="form-control form-control-xs" id="penatajasaHD_search_nik" placeholder="Entry NIK" autocomplete="off">
          </div>
        </div>        
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Jumlh Pasien :</label>
            <select class="form-control form-control-xs" id="penatajasaHD_search_jumlah">
              <option value="5">5 Pasien</option>
              <option value="10">10 Pasien</option>
              <option value="15">15 Pasien</option>
              <option value="20">20 Pasien</option>
              <option value="25">25 Pasien</option>
              <option value="30">30 Pasien</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 p-1">
      <div class="card">
        <div>
          <div class="card-header p-2 darkgrey-custom">
            <div class="row">
              <div class="col-md-10">
                <h6 class="hr6-custom" id="penatajasaHD_titleheader"><i class="fas fa-users"></i> List Pasien Heamodialisa</h6>                
                <div class="btn-group pull-right">
                  <button type="button" class="btn bg-gradient-secondary btn-xs"><i class="fas fa-print"></i> Cetak</button>
                  <button type="button" class="btn bg-gradient-secondary dropdown-toggle dropdown-icon btn-xs" data-toggle="dropdown">
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <div class="dropdown-menu p-1" role="menu">
                    <a class="dropdown-item" href="#" onclick="penatajasaHD_createsep()"><i class="fas fa-print"></i> Cetak SEP HD</a>
                    <div class="dropdown-divider m-0"></div>
                    <a class="dropdown-item" href="#"><i class="fa fa-file"></i> Surat Pernyataan</a>
                    <div class="dropdown-divider m-0"></div>
                    <a class="dropdown-item" href="#"><i class="fa fa-file"></i> Lembar Keluar Masuk</a>
                    <div class="dropdown-divider m-0"></div>
                    <a class="dropdown-item" href="#" onclick="penatajasaHD_createlabelpasien()"><i class="fa fa-user"></i> Label Pasien</a>
                    <div class="dropdown-divider m-0"></div>
                    <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Status Pasien</a>
                    <div class="dropdown-divider m-0"></div>
                    <a class="dropdown-item" href="#" onclick="penatajasaHD_createkartupasien()"><i class="fa fa-credit-card"></i> Kartu Pasien</a>
                    <a class="dropdown-item" href="#" onclick="penatajasaHD_cetakkartukontrol()"><i class="fa fa-credit-card"></i> Kartu Kontrol</a>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form_group">
                  <label>Tgl. Kunjung :</label>
                  <input type="date" id="penatajasaHD_tglkunjungan" class="form-control form-control-xs">
                </div>
              </div>
            </div>
          </div>
          <div class="card-body" id='div_penatajasaHD' style="padding: 0px; max-height: 320px; overflow: auto;">
            <table id="penatajasaHD_tablepasien" class="table table-striped table-sm choose" style="border-collapse: inherit;">
              <thead>
                <tr>
                  <th data-field="no" width="15">#</th>
                  <th data-field="no_rm">No. RM</th>
                  <th data-field="nama">Nama Pasien</th>
                  <th data-field="alamat">Alamat(s)</th>                  
                  <th data-field="jam_masuk">Tgl Kunjungan</th>
                  <th data-field="nama_unit">Unit Asal</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
		  <div id="divdetailpasienHD" class="card m-1 collapse">
			<div class="card-body p-2">
				<div class="row">
					<div class="col-sm-3" >
						<div class="row row-style">
							<div class="col-sm-2">
								<label for="">No. RM</label>
							</div>
							<div class="col-sm-auto">:</div>
							<div class="col-sm-auto">							
							<input type="text"  id="no_rm_pendaftaran_hd" class="form-control form-control-xs" disabled><br/>
							</div>
						</div>
						<div class="row row-style">
							<div class="col-sm-2">
								<label>Nama</label>
							</div>
							<div class="col-sm-auto">:</div>
							<div class="col-sm-auto">							
								<input type="text"  id="nama_pendaftaran_hd" class="form-control form-control-xs" disabled><br/>
							</div>
						</div>
						<div class="row row-style">
							<div class="col-sm-2">
								<label for="">Rincian Order</label>
							</div>
							<div class="col-sm-auto">:</div>
							<div class="col-sm-auto">
								<input type="text"  id="produk_pendaftaran_hd" class="form-control form-control-xs" disabled><br/>
							</div>
						</div>
					</div>
					<div class="col-sm-3" >						
						<div class="row row-style">
							<div class="col-sm-2">
								<label for="">Tanggal Masuk</label>
							</div>
							<div class="col-sm-auto">:</div>
							<div class="col-sm-auto">							
								<input type="text"  id="tgl_masuk_pendaftaran_hd" class="form-control form-control-xs" disabled><br/>
							</div>
						</div>
						<div class="row row-style">
							<div class="col-sm-2">
								<label for="">Unit Asal</label>
							</div>
							<div class="col-sm-auto">:</div>
							<div class="col-sm-auto">							
								<input type="text"  id="nma_unit_pendaftaran_hd" class="form-control form-control-xs" disabled><br/>
							</div>
						</div>
						<div class="row row-style">
							<div class="col-sm-2">
								<label for="">Nama Kamar</label>
							</div>
							<div class="col-sm-auto">:</div>
							<div class="col-sm-auto">							
								<input type="text"  id="nama_kamar_pendaftaran_hd" class="form-control form-control-xs" disabled><br/>
							</div>
						</div>
					</div>
					<div class="col-sm-4" >
						<div class="row row-style">
							<div class="col-sm-3">
								<label> Pilih Dokter</label>								
							</div>
							<div class="col-sm-auto"></div>
							<div class="col-sm-auto">								
								<input type="text"  id="nama_dokter_pendaftaran_hd" class="form-control form-control-xs" disabled><br/>
							</div>
						</div>
						<div class="row row-style">
							<div class="col-sm-3">
								<label> Pilih Penjamin</label>								
							</div>
							<div class="col-sm-auto"></div>
							<div class="col-sm-auto">
								<select class="form-control form-control-xs" name="listPenjHD" id="listPenjHD" readonly>
								</select><br>
							</div>
						</div>
					</div>
					<div class="col-sm-1" id=""></div>
					<div class="col-sm-1" >
						<button class="btn btn-danger" type="button" onclick="closeDetailHD();">
							<i class="fas fa-times"></i>
						</button>
					</div>
				</div>
				<div class="row" id="posting_hd">
					<div class="col-sm-1" id="">
						<button type="button" class="btn btn-dark" onclick="viewAddProdHD()">
						Tambah</button>
					</div>
					<div class="col-sm-1" id="">
						<button type="button" class="btn btn-dark" onclick="deletProdHD()">- Hapus</button><br>
					</div>
					<div class="col-sm-7" id=""></div>
					<div class="col-sm-auto">
						<!-- <button type="button" class="btn btn-primary" id="gen_order_hd" onclick="saveKunjHD()">Generate Order</button> -->
					</div>
					<div>
						<button type="button" class="btn btn-primary" onclick="viewPasienSelesaiHD()">Pasien Selesai</button>
					</div>
				</div>
			</div>
			<div id="divdetailprodHD" class="card-body p-2">
				<div class="row row-style">
					<div class="col" id="">
						<table
							id="OrderProdukHD"				
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
								<th data-formatter="bhp_hd">BHP</th>
							  </tr>
							</thead>
						</table>
					</div>
				</div>				
			</div>			
		  </div>
        </div>
      </div>
    </div>
  </div> <!-- card-outline -->
</div> <!-- penatajasaHD_1 -->

<div class="modal fade" data-keyboard="false" data-backdrop="static" id="searchProdHD" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
		<div class="modal-header">
			<h2 class="modal-title" id="">Tambah Produk</h2>
			<button type="button" class="btn-close" data-bs-dismiss="modal" onclick="closeModalPendfHD()" aria-label="Close"><i class="fas fa-times"></i></button>
		</div>
		<div class="modal-body">
			<div class="row">
				<div id="col-sm-4">
					<label>Kode</label>
					<input type="text"  id="kode_hd_produk" onkeypress="caribykodeprodhd(event)" class="form-control form-control-xs" ><br/>
				</div>
				<div id="col-sm-4">
					<label>Nama Produk</label>
					<input type="text"  id="nama_hd_produk" onkeypress="caribynamaprodhd(event)" class="form-control form-control-xs" ><br/>
				</div>
				<div id="col-sm-4" style="padding-top: 10px">
					<button class="btn btn-dark" onclick="viewAddProdHD()"><i class="fa fa-search"></i></button>
				</div>
			</div>
			<div class="row">
				<div class="col" id="">
					<table
				id="tableProdukHD"
				class="table table-striped table-sm choose"
				data-click-to-select="true"
				data-single-select="true"
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
				<tbody id="">
				</tbody>
				</table>
				</div>			
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-bs-dismiss="modal" onclick="closeModalPendfHD()">Close</button>
			<button type="button" class="btn btn-default" onclick="saveProdukHD()">Save changes</button>
		</div>
    </div>
  </div>
</div>

<div class="modal fade" data-keyboard="false" data-backdrop="static" id="pilihKeluarHD" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
		<div class="modal-header">
			<h2 class="modal-title" id="">Tindakan Selesai</h2>
			<button type="button" class="btn-close" data-bs-dismiss="modal" onclick="closeModalPendfHD()" aria-label="Close"><i class="fas fa-times"></i></button>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-sm-4" id="">
					<label>Tanggal Keluar</label>					
				</div>
				<div class="col-sm-auto" id=""></div>
				<div class="col-sm-4" id="">
					<input type="date" id="tglkeluar_hd" class="form-control form-control-xs"><br/>
				</div>				
			</div>
			<div class="row" id="">
				<div class="col-sm-4" id="">
					<label>Cara Keluar</label>					
				</div>
				<div class="col-sm-auto" id=""></div>
				<div class="col-sm-4" id="">
					<select name="" id="cara_keluar_hd"></select><br/>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-bs-dismiss="modal" onclick="closeModalPendfHD()">Close</button>
			<button type="button" class="btn btn-default" onclick="saveCaraKeluarHD()">Save changes</button>
		</div>
    </div>
  </div>
</div>

<script type="text/javascript">
  var nowday = "<?php echo $nowday; ?>";
  var tablePendaftaranHDOrder = $('#penatajasaHD_tablepasien');
  var tableOrderProdukHD = $('#OrderProdukHD');
  var tableProdukHD = $('#tableProdukHD');
  var id_kunjungan_hd;
  var id_kunjungan;
  var id_transaksi_hd;
  var id_pegawai_hd;
  var dis_hd;
  show_cri_normpenatajasaHD();
  penatajasaHD_tablepasien();
  
  tablePendaftaranHDOrder.bootstrapTable({
	  onDblClickRow: function (row, $element, field) {
		$('#penatajasaHD_loading').show();
		$('#divdetailpasienHD').show();
		$('#divdetailprodHD').show();
		$('#div_penatajasaHD').hide();
		var tgl = new Date(row['jam_masuk']).toISOString().slice(0, 10);
		
		document.getElementById('no_rm_pendaftaran_hd').value = row['no_rm'];
		document.getElementById('nama_pendaftaran_hd').value = row['nama'];		
		document.getElementById('produk_pendaftaran_hd').value = '-';		
		document.getElementById('nama_dokter_pendaftaran_hd').value = row['nama_pegawai'];
		document.getElementById('tgl_masuk_pendaftaran_hd').value = tgl;		
		id_kunjungan_hd=row['id_baru'];
		id_kunjungan=row['id_lama'];
		id_transaksi_hd=row['id_transaksi'];
		id_pegawai_hd=row['id_pembaca'];
		
		if(row['tgl_keluar']!==null){
			$('#posting_hd').hide();
			dis_hd='disabled';
		}else{
			$('#posting_hd').show();
			dis_hd='';
		}

		// if(row['id_baru']==null){
		// 	$('#gen_order_hd').show();	
		// }else{
		// 	$('#gen_order_hd').hide();	
		// }
		
		if(row['nama_kamar']==null){
			document.getElementById('nama_kamar_pendaftaran_hd').value = '-';
		}else{
			document.getElementById('nama_kamar_pendaftaran_hd').value = row['nama_kamar'];
		}
		
		if(row['nama_unit']==null){
			document.getElementById('nma_unit_pendaftaran_hd').value = '-';
		}else{
			document.getElementById('nma_unit_pendaftaran_hd').value = row['nama_unit'];
		}
		
		apiPOST('Heamodialisa/penjamin', row['no_rm'],hasil=>{
				var penjm = hasil['data'];
				var penjamin = '';
								
				if (hasil !==null){				
					for (var i = 0; i < hasil['data'].length; i++) {
					  // if (penjm.nama_penjamin="UMUM"){ 
						 //  penjm = hasil['data'][i];
						 //  penjamin +='<option value="'+penjm.id_penjamin+'" selected>'+penjm.nama_penjamin+'</option>';
						 //  document.getElementById('listPenjHD').innerHTML= penjamin;
					  // }else{
						  penjm = hasil['data'][i];						 
						  penjamin +='<option value="'+penjm.id_penjamin+'">'+penjm.nama_penjamin+'</option>';
						  document.getElementById('listPenjHD').innerHTML= penjamin;
					  // }											  
					}				
				}			
			}).then(penatajasaHD_refreshawal());
		
		refreshDetilTableProdHD();
	  }
  });
  tableOrderProdukHD.bootstrapTable({});
  tableProdukHD.bootstrapTable({});
  
	$(document).ready(function() {
		notifHd();
	})

	$("#cri_by_normpenatajasaHD").keydown(function(event) {
		switch (event.which) {
		  case 13:
			$('#penatajasaHD_loading').show();
			penatajasaHD_tablepasien();
			break;
		}
	});

	$("#cri_by_nmpasienpenatajasaHD").keydown(function(event) {
		switch (event.which) {
		  case 13:
			$('#penatajasaHD_loading').show();
			penatajasaHD_tablepasien();
			break;
		}
	});

	$("#penatajasaHD_search_nik").keydown(function(event) {
		switch (event.which) {
		  case 13:
			$('#penatajasaHD_loading').show();
			penatajasaHD_tablepasien();
			break;
		}
	});

	$("#penatajasaHD_search_jumlah").change(function(event) {
		$('#penatajasaHD_loading').show();
		penatajasaHD_tablepasien();
	});

	$("#penatajasaHD_tglkunjungan").keydown(function(event) {
		switch (event.which) {
		  case 13:
			$('#penatajasaHD_loading').show();
			penatajasaHD_tablepasien();
			break;
		}
	});

	function show_cri_normpenatajasaHD() {
		$('#cri_by_normpenatajasaHD').show();
		$('#cri_by_nmpasienpenatajasaHD').hide();
		$("#cri_by_normpenatajasaHD").trigger('focus');
		document.getElementById('penatajasaHD_tglkunjungan').value = nowday;
		document.getElementById('cri_by_nmpasienpenatajasaHD').value = '';
	}

	function show_cri_nmpasienpenatajasaHD() {
		$('#cri_by_normpenatajasaHD').hide();
		$('#cri_by_nmpasienpenatajasaHD').show();
		$("#cri_by_nmpasienpenatajasaHD").trigger('focus');
		document.getElementById('cri_by_normpenatajasaHD').value = '';
	}
 
	function penatajasaHD_tablepasien() {
		var normxHD = document.getElementById('cri_by_normpenatajasaHD').value;
		document.getElementById('cri_by_normpenatajasaHD').value = normOtomatis(normxHD);    
		var param = {
		  norm: normOtomatis(normxHD),
		  nmpasien: document.getElementById('cri_by_nmpasienpenatajasaHD').value,
		  nik: document.getElementById('penatajasaHD_search_nik').value,
		  jml: document.getElementById('penatajasaHD_search_jumlah').value,
		  tglkunj: document.getElementById('penatajasaHD_tglkunjungan').value
		};

		apiPOST("Heamodialisa/penatajasaHD_detailpasien", param, hasil => {      
			$('#penatajasaHD_tablepasien').bootstrapTable('removeAll');
		  if (hasil['data'] !== null) {
					tablePendaftaranHDOrder.bootstrapTable('append', hasil['data']);
		  }
		}).then(penatajasaHD_refreshawal());
	}

	function penatajasaHD_createsep() {
		var param = {
		  norm: '12345',
		  nm_pasien: 'Edwin'
		};
		newTabPOST('API/Cetak/createseprajal', param);
		return;
	}

	function penatajasaHD_createlabelpasien() {
		var param = {
		  norm: normOtomatis('12345'),
		  nm_pasien: 'Edwin'
		};
		newTabPOST('API/Cetak/createlabelpasien', param);
		return;
	}

	function penatajasaHD_createkartupasien() {
		var param = {
		  norm: normOtomatis('12345'),
		  nm_pasien: 'Edwin'
		};
		newTabPOST('API/Cetak/cetakkartupasien', param);
		return;
	}
  
	function refreshDetilTableProdHD(){ 
		$('#OrderProdukHD').bootstrapTable('removeAll');
		
		var param={
			id_kunjungan: id_kunjungan_hd
		};
		
		apiPOST("Heamodialisa/viewOrderProdHD", param, hasil => {
        if(hasil['data'] !== null){
            tableOrderProdukHD.bootstrapTable('append', hasil['data']);
        }else{

        }
    });
	}
  
	function viewAddProdHD(){ 
		$('#searchProdHD').modal("show");
		$('#tableProdukHD').bootstrapTable('removeAll');
		
		/* */var param={
			kd_produk: $("#kode_hd_produk").val(),
			nama_produk: $("#nama_hd_produk").val(),
			id_penjamin: $("#listPenjHD").val(),
		}; 
		
		var a='';
		apiPOST('Heamodialisa/ProdHD', param,hasil=>{		
			if (hasil !==null){
				var b=hasil['data'];				
				tableProdukHD.bootstrapTable('append', hasil['data']);
			}  
		  });
		document.getElementById('kode_hd_produk').value = '';
		document.getElementById('nama_hd_produk').value = '';
	}
	
	function viewPasienSelesaiHD(){
		$('#pilihKeluarHD').modal("show");
		document.getElementById('tglkeluar_hd').value = nowday;
		listCaraKeluarHD();
	}
	
	function deletProdHD(){ 
		var value_check = tableOrderProdukHD.bootstrapTable('getSelections');
		
		var param = { 
		id_kunjungan: id_kunjungan_hd,	
		id_produk: value_check[0].id_produk,
		tgl_input: value_check[0].tgl_input,
		status_kunjungan: "1"		
		}
		
		apiPOST("Heamodialisa/delDetilProd", param, hasil => {
			if(hasil !== null){				
				refreshDetilTableProdHD()
			}
		})		
	}
	
	function closeDetailHD(){
		$('#divdetailpasienHD').hide();
		$('#div_penatajasaHD').show();
		$('#divdetailprodHD').hide();
		penatajasaHD_tablepasien();
	}
	
	function closeModalPendfHD(){
		$('#searchProdHD').modal("hide");	
		$('#pilihKeluarHD').modal("hide");
		refreshDetilTableProdHD();
	}

	function penatajasaHD_cetakkartukontrol() {
		var param = {
		  norm: normOtomatis('12345'),
		  nm_pasien: 'Edwin'
		};
		newTabPOST('API/Cetak/cetakkartukontrol', param);
		return;
	}

	function saveKunjHD(){
		var param={
			id_kunjungan:id_kunjungan,
			id_pegawai: id_pegawai_hd,
			id_transaksi:id_transaksi_hd
		}
			// console.log(param);
		apiPOST("Heamodialisa/SaveKunjHD", param, hasil => {
			if(hasil!==null){
				refreshDetilTableProdHD();
			}			
		})
	}

	function saveProdukHD(){ 
		var table = $("#tableProdukHD");
		var value_check = table.bootstrapTable('getSelections');
		
		var param = { 
		id_unit: "7001",
		id_transaksi: id_transaksi_hd,
		id_pegawai: id_pegawai_hd,
		id_penjamin: $("#listPenjHD").val(),
		id_kunjungan: id_kunjungan_hd,	
		id_produk: value_check[0].id_produk,
		status_kunjungan: "1"		
		}		

		apiPOST("Heamodialisa/saveProdHD", param, hasil => {
        if(hasil !== null){				
		refreshDetilTableProdHD();
        }
    })
	}
	
	function listCaraKeluarHD(){		
		apiPOST("Heamodialisa/viewCaraKeluar", null, hasil => {
			var a=hasil['data'];
			var isi=''
            if(hasil !== null){				
				for (var i = 0; i < hasil['data'].length; i++) {
						a = hasil['data'][i];						 
						isi +='<option value="'+a.id_cara_keluar+'">'+a.cara_keluar+'</option>';
						document.getElementById('cara_keluar_hd').innerHTML= isi;
					}
            }
        })
	}
	
	function saveCaraKeluarHD(){
		var param = { 
		id_kunjungan: id_kunjungan_hd,
		id_cara_keluar: $('#cara_keluar_hd').val()
		}
		apiPOST("Heamodialisa/savePasienKeluar", param, hasil => {
            closeModalPendfHD();
			$('#posting_hd').hide();
			$('#detailprodHD').hide();
        })
	}
	
	function caribykodeprodhd(e){
		if (e.keyCode == 13) {
			var param={
			kd_produk: $("#kode_rad_produk").val(),
			};			
			viewAddProdHD();
		}
	}
	
	function caribynamaprodhd(e){
		if (e.keyCode == 13) {
			var param={
			nama_produk: $("#nama_rad_produk").val(),
			};			
			viewAddProdHD();
		}
	}

	function bhp_hd(value,row,index){	
		var buton= "<button type='button' class='btn btn-xs btn-outline-danger' onclick='mod_bhp_hd("+row.id_detail_kunjungan+")'"+dis_hd+"><i class='fa fa-plus'></i></button>";
		return buton;
	}
	
	function mod_bhp_hd(det_kunj){		
		showModalBHPProduk(det_kunj, 7001);
	}
	
	function notifHd(){
		apiPOST('Heamodialisa/getNotifhd', param,hasil=>{
			if (hasil !==null){
				b = hasil['data'];
				nomor= hasil['id'];
				var tek=''
				document.getElementById('notif_bagde').innerHTML = b[0].count;
				tek += '<span class="dropdown-item dropdown-header">'+b[0].count+' Pemberitahuan HD</span>';
				for(var i=0;i<b[0].count;i++){
					tek += '<div class="dropdown-item p-1" onclick="onloadPanel(this, '+"'"+nomor+"'"+')">';
					tek += '<div class="media">';
					tek += '<div class="img-notif mt-2">'+b[i].nomor+'</div>'
					tek += '<div class="media-body p-1">';
					tek += '<a href="#"><b>Penerimaan Order HD</b></a>';
					tek += '<h3 class="dropdown-item-title">Order HD Belum Selesai</h3>';
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
		setTimeout(refresh_notif_hd, 300000);
	}
	
	function refresh_notif_hd(){
		if($('#tab-pentjasaHD').hasClass('active')){
			notifHd();
			console.log('ada');
		}else{
			console.log('0');
		}
	}
  
  function penatajasaHD_refreshawal() {
    $('#penatajasaHD_loading').hide();
  }
  setTimeout(penatajasaHD_refreshawal, 1000);
</script>