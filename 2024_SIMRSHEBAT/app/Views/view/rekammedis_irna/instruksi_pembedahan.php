<div class="col-md-12 p-2">
<!--  	<div class="card card-outline card-danger">
		<div class="overlay-wrapper" id="insbed_loadingawal">
			<div class="overlay">
				<i class="fas fa-3x fa-sync-alt fa-spin"></i>
			</div>
		</div>  
		<div class="card-body p-2 darkgrey-custom" id='Divsearchinsbed'>
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group ">
						<label>Cari No. RM / Nama Pasien :</label>            
						<input type="search" id="normpas_insbed" class="form-control form-control" placeholder="Entry RM..." autocomplete="off">
						<button class="btn btn-primary" onclick="loadlistPasins()">Cari</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 p-1" id="Divcardlistpasermirna_instruksi">
		<div class="card">
			<div class="card-header p-0">
				<div class="col-md-12 p-0" id="ermirna_listpas_instruksi">
					<div class="card-body p-1" style="max-height: 420px; overflow: auto;">
						<div class="row" id="listpasermirna_instruksi"></div>
					</div>
				</div>
			</div>
		</div>
	</div>  -->
	<div class="overlay-wrapper" id="instruksipembedahan_loadingawal">
		<div class="overlay">
			<i class="fas fa-3x fa-sync-alt fa-spin"></i>
		</div>
	</div>
	<div class="card-body p-2 darkgrey-custom" id="Divinstruksipembedahan" >



		<div class="card"><!-- DATA PASIEN -->
			<div class="card-header" style="background-color:black;">
				<h3 class="card-title" style="color:white;">KONDISI PASIEN</h3>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse">
						<i class="fas fa-minus"></i>
					</button>			  
				</div>
			</div>
			<div class="card-body">
				<div class="col-lg-12 row">
					<div class="col-md-6">
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label" title="ID">ID</label>
							</div>
							<div class="col-md-5">
								<input id="qacintruksibedahemr_id" name="id" type="hidden" value="0">
								<label id="qacintruksibedahemr_lid" class="col-form-label">-</label>
								<input id="qacintruksibedahemr_idkun" name="idkunl" type="hidden" value="">
								<input id="qacintruksibedahemr_isi" name="isi" type="hidden" value="">
							</div>
						</div>
						<div class="form-group row d-none">
							<div class="col-md-3">
								<label class="col-form-label">ID Kunjungan</label>
							</div>
							<div class="col-md-1">

							</div>
							<div class="col-md-1">
								<label id="qacintruksibedahemr_lidkun" class="col-form-label">-</label>
								<input id="qacintruksibedahemr_kun_id" name="id" type="hidden" value="0">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Tanggal</label>
							</div>
							<div class="col-md-4">
								<div class="input-group date" id="qacintruksibedahemr_dtgl" data-target-input="nearest">
									<input id="qacintruksibedahemr_tgl" name="tgl" type="date" class="form-control datetimepicker-input" data-target="#qacintruksibedahemr_dtgl" data-toggle="datetimepicker" onkeydown="return false">

								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Dokter</label>
							</div>
							<div class="col-md-7">
								<select id="qacintruksibedahemr_dok1Id" name="dok1Id" class="form-control" ></select>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Diagnosa Pasca Bedah</label>
							</div>
							<div class="col-md-5">
								<div class="form_group">
							<!-- 		<select class="diagnosa_insbedah form-control form-control-xs" id="diagnosa_insbedah">
							</select> -->
							<input id="diagnosa_insbedah" name="diagnosa_insbedah" type="text" >
						</div>
							<!--<button type="button" class="btn btn-sm btn-primary btn-block" id="qacintruksibedahemr_bticd" title="Diagnosis ICD">
								 <i class="far fa-file"></i> 
								</button>-->
							</div>
							<div class="col-md-4">
								<label id="qacintruksibedahemr_licd" class="col-form-label">NON ICD</label>
								<input id="qacintruksibedahemr_icd" name="icd" type="hidden" value="0">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-5">
								<label class="col-form-label">1.&nbsp;&nbsp;Pemeriksaan Berkala</label>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label" title="Tensi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tensi Setiap</label>
							</div>
							<div class="col-md-4">
								<div class="input-group">
									<input type="number" class="form-control" id="qacintruksibedahemr_tensi">
									<span class="input-group-append">
										<span class="input-group-text"> &nbsp;Menit &nbsp; </span>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label" title="Nadi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nadi Setiap</label>
							</div>
							<div class="col-md-4">
								<div class="input-group">
									<input type="number" class="form-control" id="qacintruksibedahemr_nadi">
									<span class="input-group-append">
										<span class="input-group-text"> &nbsp;Menit &nbsp; </span>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label" title="Suhu">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Suhu Setiap</label>
							</div>
							<div class="col-md-4">
								<div class="input-group">
									<input type="number" class="form-control" id="qacintruksibedahemr_suhu">
									<span class="input-group-append">
										<span class="input-group-text"> &nbsp;Menit &nbsp; </span>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label" title="Pernafasan">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pernafasan Setiap</label>
							</div>
							<div class="col-md-4">
								<div class="input-group">
									<input type="number" class="form-control" id="qacintruksibedahemr_nafas">
									<span class="input-group-append">
										<span class="input-group-text"> &nbsp;Menit &nbsp; </span>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">2.&nbsp;&nbsp;Boleh Minum</label>
							</div>
							<div class="col-md-8">
								<textarea class="form-control" rows="3" id="qacintruksibedahemr_minum" name="ket"></textarea>
								<!-- 	<input type="text" name="minum" th:id="${ccm+'_minum'}" maxlength="30" class="form-control"/> -->
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label" title="Keterangan">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Boleh Makan</label>
							</div>
							<div class="col-md-8">
								<textarea class="form-control" rows="3" id="qacintruksibedahemr_makan" name="ket"></textarea>
								<!-- 	<input type="text" name="makan" th:id="${ccm+'_makan'}" maxlength="30" class="form-control"/> -->
							</div>
						</div>
					</div>
					<!-- TENGAH --> 
					<div class="col-md-6">
						<div class="form-group row d-none">
							<div class="col-md-3">
								<label class="col-form-label" title="No RM Ibu">No RM</label>
							</div>
							<div class="col-md-7">
								<label id="qacintruksibedahemr_norm" class="col-form-label">-</label>
							</div>
						</div>
						<div class="form-group row d-none">
							<div class="col-md-3">
								<label class="col-form-label" title="Nama RM">Nama RM</label>
							</div>
							<div class="col-md-7">
								<label id="qacintruksibedahemr_nama" class="col-form-label">-</label>
							</div>
						</div>
					<!-- <div class="form-group row">
						<div class="col-md-3">
							<label class="col-form-label" title="No Asuransi">No Asuransi</label>
						</div>
						<div class="col-md-7">
							<label th:id="${ccm+'_noasuransi'}" class="col-form-label" >-</label>
						</div>
					</div> -->
					<div class="form-group row d-none">
						<div class="col-md-3">
							<label class="col-form-label" title="Jenis Kelamin">Jenis Kelamin</label>
						</div>
						<div class="col-md-7">
							<label id="qacintruksibedahemr_gender" class="col-form-label">-</label>
						</div>
					</div>
					<div class="form-group row d-none">
						<div class="col-md-3">
							<label class="col-form-label" title="Tanggal Lahir">Tanggal Lahir</label>
						</div>
						<div class="col-md-7">
							<label id="qacintruksibedahemr_tgl_kunjungan" class="col-form-label">-</label>
						</div>
					</div>
					<!-- <div class="form-group row">
						<div class="col-md-3">
							<label class="col-form-label" title="Penanggung">Penanggung</label>
						</div>
						<div class="col-md-7">
							<label th:id="${ccm+'_penanggung'}" class="col-form-label" >-</label>
						</div>
					</div> -->
					<div class="form-group row">
						<div class="col-md-3">
							<label class="col-form-label">3.&nbsp;&nbsp;Infus</label>&nbsp;&nbsp;<label><span class="badge bg-primary rounded-pill" onclick="showmodaltambahpenyakitkelassmedermrwj()" title="tambah icd">Tambah</span></label>
						</div>

						<div class="col-md-9" style="border: solid;overflow-y: scroll;" >
							&nbsp;&nbsp;&nbsp;
							<table   class="table table-striped table-sm">
								<thead>
									<tr>
										<th style="width: 15px">#</th>
										<th style="width: 80px">ICD 10</th>
										<th>Penyakit</th>
									</tr>
								</thead>
								<tbody id="bodyhistoripenyakitkelassmedermrwj"></tbody>
							</table>
						</div>

					</div>
					<div class="form-group row">
						<div class="col-md-3">
							<label class="col-form-label" title="Keterangan">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Infus Dihentikan Setelah</label>
						</div>
						<div class="col-md-9">
							<!-- <textarea class="form-control" rows="2" th:id="${ccm+'_makan'}" name="ket"></textarea> -->
							<input type="text" name="makan" id="qacintruksibedahemr_infus2" maxlength="30" class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-3">
							<label class="col-form-label">4.&nbsp;&nbsp;Obat - Obat</label>
						</div>
						<div class="col-md-9">
							<textarea class="form-control" rows="3" id="qacintruksibedahemr_obat" name="ket"></textarea>
							<!-- <input type="text" name="minum" th:id="${ccm+'_obat'}" maxlength="30" class="form-control"/> -->
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-3">
							<label class="col-form-label">5.&nbsp;&nbsp;Intruksi Khusus</label>
						</div>
						<div class="col-md-9">
							<textarea class="form-control" rows="3" id="qacintruksibedahemr_intruksi" name="ket"></textarea>
							<!-- <input type="text" name="minum" th:id="${ccm+'_intruksi'}" maxlength="30" class="form-control"/> -->
						</div>
					</div>
					<div class="col-lg-12 row">
						<div class="col-md-3"> </div>
						<div class="col-md-9">
							<div class="form-group row">
								<div class="col-md-12" align="center">
									<label class="col-form-label">Dokter Penanggung Jawab Pasien</label>
								</div>
							</div>
							<div class="form-group row d-none" id="qacintruksibedahemr_divqrcode">
								<div class="col-md-12" align="center">
									<img id="qacintruksibedahemr_qrcode">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-12" align="center">
									<table>
										<tbody><tr>
											<td width="50%" style="padding:0;">
												<input type="text" class="form-control text-center" id="qacintruksibedahemr_zpjttd1" readonly="readonly">
											</td>
										</tr>
									</tbody></table>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-12" align="center">
									<label class="col-form-label">Nama &amp; Tanda Tangan</label>
								</div>
							</div>
							<div class="form-group row">
								<div align="center" class="col-md-12">
									<button id="qacintruksibedahemr_btttd1" type="button" class="btn btn-sm btn-danger "><!-- <i class="fas fa-signature"></i> --> Validasi</button>
									<button onclick="saveintruksibedah()" id="qacintruksibedahemr_btsave" type="button" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Simpan</button>
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
<!-- <div class="viewinstruksipembedahan"></div> -->
<script>
	$(document).ready(function() {
		var data =document.getElementById('profilepasienirna').value;
		console.log(data);
		if (data=='') {
			var url  = '';
			var view = 'viewinstruksipembedahan';
			onCall_listpasien(view, url);
		}else{
			showInstruksiPembedahan();
		} 
		pegawai_instruksi();
		$(".diagnosa_insbedah").select2({
			placeholder: "Ketikan Kode Diagnosa",
			allowClear: true
		});
		setTimeout(refresh_listpasermirna_instruksi, 1000); 
	});

	$(document).on('keyup', '.select2-search__field', function(ev) {
		var self = $(this);
		if (self.val().length > 1) {
			tampil_diagnosa_ins(self.val());
		}
	});

	function loadlistPasins(){
		var param = {
			user    : user['id_user'],
			norm    : document.getElementById('normpas_insbed').value
		};
		apiPOST("Rekammedisirna/listpasien", param, hasil => { 
			$('#listpasermirna_instruksi').html('');
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

					$('#listpasermirna_instruksi').append(Baris);
					document.getElementById('normpas_insbed').value = '';
				}else{
					var Baris = "";
					var a = hasil['data'];
					for (var i = 0; i < a.length; i++) {
					// var tglkunj   = a[i].tgl_masuk;
						var transaksi   = a[i].id_transaksi;
						var norm      = a[i].no_rm;
						var nama      = a[i].nama;
						var alamat    = a[i].alamat;
						var penjamin  = a[i].nama_penjamin;
						var sep       = a[i].no_sjp;
						var telp      = a[i].telepon;
						var kunjungan = a[i].id_kunjungan;
						var id_unit   = a[i].id_unit;
						var nama_unit = a[i].nama_unit;
						var soap      = a[i].soap;
						var tgl_lahir = a[i].age;

						id_kunjungan_priope = kunjungan;

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
						Baris += '<a href="#" class="small-box-footer" style="background-color: darkgreen;" onclick="viewInstruk('+"'"+norm+"','"+nama_unit+"','"+kunjungan+"','"+id_unit+"','"+nama+"','"+transaksi+"','"+tgl_lahir+"','"+alamat+"'"+')">Klik Detail <i class="fas fa-arrow-circle-right"></i></a>';
						Baris += '</div>';
						Baris += '</div>';
					}
				// console.log(Baris);
					$('#listpasermirna_instruksi').append(Baris);
				}       
			}
		}); 
	}

	function viewInstruk(norm,nama_unit,kunjungan,id_unit,nam,transaksi,tgl_lahir,alamat){
		$('#Divcardlistpasermirna_instruksi').hide();
		$('#Divinstruksipembedahan').show();	
	}

	function refresh_listpasermirna_instruksi() {
		$('#insbed_loadingawal').hide();
	}

	function tampil_diagnosa_ins(kode){
		var param = {
			id: kode
		};
		apiPOST('Data_Sosial/diagnosabyname', param, hasil => {
			var penjamin = '';
			var a = hasil['data'];
			for (var i = 0; i < a.length; i++) {
				penjamin += '<option value="' + a[i]['id_penyakit'] + '">' + a[i]['id_penyakit'] + ' | ' + a[i]['penyakit'] + '</option>';
			}
			document.getElementById('diagnosa_insbedah').innerHTML = penjamin;
		});
	}
	function refresh_listpasienerminstruksipembedahan() {
		$('#insbed_loadingawal').hide();
	}
	function listpasermirna_instruksi(){  
		var listParam = [
			'normpas_insbed', 
			];
		var param = {
			user    : user['id_user'],
			norm    : document.getElementById('normpas_insbed').value,
		//nmpasien: document.getElementById('RWJERMnmlistermirna').value
		};
		apiPOST("Rekammedisirna/listpasien", param, hasil => {   
			$('#listpasermirna_instruksi').html('');
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

					$('#listpasermirna_instruksi').append(Baris);
					document.getElementById('normpas_insbed').value = '';
				}else{
					var Baris = "";
					var a = hasil['data'];
					for (var i = 0; i < a.length; i++) {
						var tglkunj   = a[i].tgl_masuk;
						var transaksi = a[i].id_transaksi;
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
						var id_pegawai = a[i].id_pegawai;
						if (nama.length > 18){
							namax  = nama.substring(0, 18)+'...';
						}else{
							namax  = nama;
						}

						if (alamat.length > 30){
							alamatx = alamat.substring(0, 30)+'...';
						}else{
							alamatx = alamat;
						}

						Baris += '<div class="col-sm-3">';
						if (soap>''){
							Baris += '<div class="small-box btn-info" style="border: solid 2px darkblue;">';
						}else{
							Baris += '<div class="small-box btn-secondary-default" style="border: solid 2px #a8d4da; margin-bottom: 5px !important;">';
						}
						Baris += '<div class="inner p-1">';
						Baris += '<h6><strong>'+norm+'</strong> / '+ namax +'</h6>';
						Baris += '<p class="p-0 mb-1" style="font-size:12px;">'+alamatx+'</p>';
						Baris += '<p class="p-0" style="font-size:12px;"><strong><i>'+unit+'</i></strong></p>';
						Baris += '</div>';
						Baris += '<div class="icon">';
						Baris += '<i class="fa fa-user"></i>';
						Baris += '</div>';
						Baris += '<a href="#" class="small-box-footer" style="background-color: #a8d4da; color: black;" onclick="tampilPasienerminstruksipembedahan('+"'"+norm+"','"+unit+"','"+kunjungan+"','"+id_unit+"','"+nama+"','"+transaksi+"','"+tgl_lahir+"','"+alamat+"','"+id_pegawai+"'"+')" style="cursor:pointer;">Klik Disini <i class="fas fa-arrow-circle-right"></i></a>';
						Baris += '</div>';
						Baris += '</div>';
					}
					$('#listpasermirna_instruksi').append(Baris);
				}       
			}
		});  
	};

	$(document).on('keyup', '.select2-search__field', function(ev) {
		var self = $(this);
		if (self.val().length > 1) {
			tampil_diagnosa_ins(self.val());
		}
	});
	function tampilPasienerminstruksipembedahan(norm,unit,id_kunjugan,id_unit,nama,transaksi,tgl_lahir,alamat) {
		document.getElementById('Divsearchinsbed').style.display='none';
		document.getElementById('Divcardlistpasermirna_instruksi').style.display='none';
		document.getElementById('Divinputpembedahan').style.display='block';
		document.getElementById('qacintruksibedahemr_id').value=norm;
		document.getElementById('qacintruksibedahemr_idkun').value=id_kunjugan;
/*										<input id="qacintruksibedahemr_id" name="id" type="hidden" value="0">
								<label id="qacintruksibedahemr_lid" class="col-form-label">-</label>
								<input id="qacintruksibedahemr_idkunl" name="idkunl" type="hidden" value="">
								<input id="qacintruksibedahemr_isi" name="isi" type="hidden" value="">*/
	}
	function tampil_diagnosa_ins(kode){
		var param = {
			id: kode
		};
		apiPOST('Data_Sosial/diagnosabyname', param, hasil => {
			var penjamin = '';
			var a = hasil['data'];
			for (var i = 0; i < a.length; i++) {
				penjamin += '<option value="' + a[i]['id_penyakit'] + '">' + a[i]['id_penyakit'] + ' | ' + a[i]['penyakit'] + '</option>';
			}
			document.getElementById('diagnosa_insbedah').innerHTML = penjamin;
		});
	}

	function pegawai_instruksi() {
		apiPOST('Rawatjalan/pegawai', null,hasil=>{
			var a=hasil['data'];
			var pegawai='';
			for (var i = 0; i < a.length; i++) {
				pegawai+='<option value="'+a[i]['id_pegawai']+'">'+a[i]['nama_pegawai']+'</option>';
			}
			document.getElementById('qacintruksibedahemr_dok1Id').innerHTML=pegawai;
		});
	}

	function saveintruksibedah(){
		var param={
		// id:
			transaksi   :$('#transaksiermirna').val(),
			id_kunjungan:$('#idKunjunganermirna').val(),
			tgl_masuk 	:$('#qacintruksibedahemr_tgl').val(),
			dokter 		:$('#qacintruksibedahemr_dok1Id').val(),
			diagnosa 	:$('#diagnosa_insbedah').val(),
			tensi 		:$('#qacintruksibedahemr_tensi').val(),
			nadi 		:$('#qacintruksibedahemr_nadi').val(),
			suhu 		:$('#qacintruksibedahemr_suhu').val(),
			napas 		:$('#qacintruksibedahemr_nafas').val(),
			minum 		:$('#qacintruksibedahemr_minum').val(),
			makan 		:$('#qacintruksibedahemr_makan').val(),
			stop_infus 	:$('#qacintruksibedahemr_infus2').val(),
			obat 		:$('#qacintruksibedahemr_obat').val(),
			khusus 		:$('#qacintruksibedahemr_intruksi').val(),
			dpjp 		:$('#qacintruksibedahemr_dok1Id').val(),
		};

		apiPOST('Rekammedisirna/intruksipembedahan', param, hasil => {
			if (hasil['pesan']=='Berhasil') {
				alert(hasil['pesan']); 
			}else{
				alert(hasil['data']); 
			}
		});
	}
	function showInstruksiPembedahan(){
		document.getElementById("instruksipembedahan_loadingawal").style.display = 'block';
		var param = {
			id_transaksi   	: $('#transaksiermirna').val(),
			id_kunjungan 	: $('#idKunjunganermirna').val(),
			iduser          : user.id_user
		}
		
		apiPOST('Rekammedisirna/showinstruksipembedahan', param,hasil=>{
			document.getElementById("instruksipembedahan_loadingawal").style.display = 'none';
			if (hasil['data'].length == 0){
				toastr.error("Belum Ada Instruksi Pembedahan!");
			}else{
				toastr.info("Data Instruksi Pembedahan di Temukan");
			}
		});
	}
</script>