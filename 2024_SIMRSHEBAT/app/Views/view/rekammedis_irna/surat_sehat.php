<div class="col-md-12">
	<div id="divsurat" class="card">
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
					<div class="col-md-12">
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Tekanan Darah</label>
							</div>
							<div class="col-md-8">
								<textarea rows="3" name="tek_darah" id="tek_darah" style="width:100%;" class="form-control"></textarea>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Berat Badan</label>
							</div>
							<div class="col-md-8">
								<textarea rows="3" name="berat_badan" id="berat_badan" style="width:100%;" class="form-control"></textarea>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Tinggi</label>
							</div>
							<div class="col-md-8">
								<textarea rows="3" name="tinggi_badan" id="tinggi_badan" style="width:100%;" class="form-control"></textarea>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Gol Darah</label>
							</div>
							<div class="col-md-8">
								<textarea rows="3" name="gol_darah" id="gol_darah" style="width:100%;" class="form-control"></textarea>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Buta Warna</label>
							</div>
							<div class="col-md-8">
								<textarea rows="3" name="buta_warna" id="buta_warna" style="width:100%;" class="form-control"></textarea>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Keperluan</label>
							</div>
							<div class="col-md-8">
								<textarea rows="3" name="keperluan" id="keperluan" style="width:100%;" class="form-control"></textarea>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<button onclick="cetaksuratsehat()" class="btn btn-primary">Cetak</button>
							</div>
							<div class="col-md-3">
								<button onclick="simpansuratsehat()" class="btn btn-primary">Simpan </button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var data_pasien = {
		no_rm:'',
		kd_kelurahan:'',
		kd_pendidikan:'',
		kd_pekerjaan:'',
		kd_perusahaan:'',
		kd_agama:'',
		nama:'',
		tgl_lahir:'',
		umur:'',

	};
	$(document).ready(function() {
		var data =document.getElementById('profilepasienirna').value;
		if (data=='') {
			var url  = '';
			var view = 'viewsuratsehat';
			onCall_listpasien(view, url);
		}else{
			showsuratkesehatan();
		} 

	//setTimeout(refresh_listpasermirna_instruksi, 1000); 
	});
	function simpansuratsehat() {
		var param={
			transaksi  :document.getElementById('transaksiermirna').value,
			norm       :document.getElementById('rmermirna').value,
			keperluan  :document.getElementById('keperluan').value,
			tek_darah  :document.getElementById('tek_darah').value,
			berat_badan:document.getElementById('berat_badan').value,
			tinggi_badan:document.getElementById('tinggi_badan').value,
			gol_darah  :document.getElementById('gol_darah').value,
			buta_warna :document.getElementById('buta_warna').value,
		    id_user    :user.id_user,

		};
		apiPOST('Rekammedisirna/suratsehat', param,hasil=>{
			if (hasil['status']=="sukses") {
				cetaksuratsehat();
			} 

		});
	}
	function cetaksuratsehat(){
		var norm=document.getElementById('rmermirna').value;
		var param = {
			norm      : norm,
			umur      : data_pasien['tgl_lahir'],
			id_transaksi  :document.getElementById('transaksiermirna').value,
		};
		newTabPOST('API/Laporan/LaporanSuratSehat',param);
		return;
	}

	/*function tampilPasienermirna(no_rm,unit,id_kunjungan,id_unit,nama,transaksi,tgl_lahir,alamat,id_pegawai) {
		$('#modallistpasienirna').modal('hide');
		$('.tab-empty').hide();
		ceksuratsehat(transaksi);
		showDetailDataPasienIrna();
		document.getElementById('rmermirna').value          =no_rm;
		document.getElementById('namaermirna').value        =nama;
		document.getElementById('unitermirna').value        =unit;
		document.getElementById('idKunjunganermirna').value =id_kunjungan;
		document.getElementById('idunitermirna').value      =id_unit;
		document.getElementById('transaksiermirna').value   =transaksi;
		document.getElementById('alamatermirna').value      =alamat;
		document.getElementById('profilepasienirna').value  =id_kunjungan;

		data_pasien['nama']    	=nama;
		data_pasien['no_rm']    =no_rm;
		data_pasien['unit']    	=unit;
		data_pasien['id_unit'] 	=id_unit;
		data_pasien['id_kunjungan'] =id_kunjungan;
		data_pasien['alamat']  		=alamat;
		data_pasien['tgl_lahir']   	=tgl_lahir;
	}*/
	function ceksuratsehat(transaksi){
		var param = {
			transaksi: transaksi,
		};

		apiPOST('Rekammedisirna/ceksuratsehat', param, hasil => {
			var x = hasil['data']; 
			document.getElementById('keperluan').value=x.keperluan;
			document.getElementById('tek_darah').value=x.tekanan_darah;
			document.getElementById('berat_badan').value=x.berat_b;
			document.getElementById('tinggi_badan').value=x.t_badan;
			document.getElementById('gol_darah').value=x.gol_darah;
			document.getElementById('buta_warna').value=x.buta_warna;

		})
	}
	function viewtandavitalmedisirja() {
		var param = {
			id_kunjungan: document.getElementById('idKunjunganermirna').value,
		};

		apiPOST('Rekammedisirna/viewtandavitalirja', param, hasil => {
			var x = hasil['data']; 

			document.getElementById('tek_darah').value  = x.tekanan_darah1+'/'+x.tekanan_darah2;
			document.getElementById('berat_badan').value          = x.bb;
			document.getElementById('tinggi_badan').value      = x.tinggi_badan;

		})
	}

	function showsuratkesehatan(no_rm,unit,id_kunjungan,id_unit,nama,transaksi,tgl_lahir,alamat,id_pegawai,jnskelamin,nama_kamar,penjamin,jam_masuk, nama_dokter){
		
		data_pasien['nama']    		=nama;
		data_pasien['no_rm']    	=no_rm;
		data_pasien['unit']    		=unit;
		data_pasien['id_unit'] 		=id_unit;
		data_pasien['id_kunjungan'] =id_kunjungan;
		data_pasien['alamat']  		=alamat;
		data_pasien['tgl_lahir']   	=tgl_lahir;

		viewtandavitalmedisirja();
	}

</script>