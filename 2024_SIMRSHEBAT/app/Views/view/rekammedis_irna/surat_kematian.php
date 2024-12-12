<div class="col-md-12">
	<div id="divsurat" class="card">
		<div class="card "><!-- S (Situation) -->
			<div class="card-header" style="background-color:black;">								
				<h3 class="card-title" style="color:white;">Surat Kematian</h3>
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
								<label class="col-form-label">Tanggal Mati</label>
							</div>
							<div class="col-md-8">
								<input type="datetime-local" rows="3" name="tglpxmd" id="tglpxmd"  class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Riwayat Penyakit</label>
							</div>
							<div class="col-md-8">
								<textarea rows="3" name="riwayatpxmd" id="riwayatpxmd" style="width:100%;" class="form-control"></textarea>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Sebab Kematian</label>
							</div>
							<div class="col-md-8">
								<textarea rows="3" name="sebabpxmd" id="sebabpxmd" style="width:100%;" class="form-control"></textarea>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Umur Sekarang</label>
							</div>
							<div class="col-md-8">
								<textarea rows="3" name="umurpxmd" id="umurpxmd" style="width:100%;" class="form-control"></textarea>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<button onclick="simpansuratkematian()" class="btn btn-primary">Simpan</button>
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
		document.getElementById('umurpxmd').value = tgllahir;
		var data =document.getElementById('profilepasienirna').value;
		
		if (data == '') {
			var url 	= "";
			var view 	= 'viewsuratkematian';
			onCall_listpasien(view, url);
		}else{
			showSuratKematian();
		} 
	});

	function simpansuratkematian() {
		var param={
			norm            : document.getElementById('rmermirna').value,
			umur            : tgllahir,
			transaksi       : document.getElementById('transaksiermirna').value,
			id_kunjungan    : document.getElementById('idKunjunganermirna').value,
			user            : user.nama_pegawai,
			id_user         : user.id_user,
			time            : document.getElementById('tglpxmd').value,
			sebab           : document.getElementById('sebabpxmd').value,
			nama            : document.getElementById('namaermirna').value,
			alamat          : document.getElementById('alamatermirna').value,
			riwayatpenyakit : document.getElementById('riwayatpxmd').value,

		};
		apiPOST('Rekammedisirna/suratkematian', param,hasil=>{
			if (hasil['status']=="sukses") {
				cetaksuratkematian();
			} 

		});
	}
	
	function cetaksuratkematian(){
		var norm=document.getElementById('rmermirna').value;
		var param = {
			user 		: user.nama_pegawai,
			norm      	: norm,
			umur 	    : tgllahir,
			sebab 	    : document.getElementById('sebabpxmd').value,
			time 	: document.getElementById('tglpxmd').value,

		};
		newTabPOST('API/Laporan/LaporanKematian',param);
		return;
	}

	function showSuratKematian(){

	}
</script>