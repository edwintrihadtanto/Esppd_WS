<div class="col-md-12">
	<div class="overlay-wrapper" id="kelahiransurat_loadingawal">
		<div class="overlay">
			<i class="fas fa-3x fa-sync-alt fa-spin"></i>
		</div>
	</div>
	<div id="divsurat" class="card">
		<div class="card ">
			<div class="card-header" style="background-color:black;">								
				<h3 class="card-title" style="color:white;">Surat Kelahiran</h3>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse">
						<i class="fas fa-minus"></i>
					</button>			  
				</div>				
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-lg-12 row">
						<div class="col-md-6">
							<div class="form-group row">
								<div class="col-md-3">
									<label class="col-form-label" title="ID">ID</label>
								</div>
								<div class="col-md-5">
									<input id="wackelahiranemr_id" name="id" type="hidden" value="0">
									<label id="wackelahiranemr_lid" class="col-form-label">-</label>
								</div>
							</div>
							<div class="form-group row d-none">
								<div class="col-md-3">
									<label class="col-form-label" title="Tanggal Kunjungan">Tanggal Kunjungan</label>
								</div>
								<div class="col-md-7">
									<label id="wackelahiranemr_tgl_kunjungan" class="col-form-label">-</label>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-3">
									<label class="col-form-label">Tanggal Kelahiran</label>
								</div>
								<div class="col-md-6">
									<div class="input-group date" id="wackelahiranemr_dtgl" data-target-input="nearest">
										<input id="wackelahiranemr_tgl" name="tgl" type="datetime-local" class="form-control">

									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-3">
									<label class="col-form-label" title="Ayah">Ayah</label>
								</div>
								<div class="col-md-6">
									<input id="wackelahiranemr_ayah" name="ayah" type="text" class="form-control" maxlength="150">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-3">
									<label class="col-form-label">Tanggal Lahir Ayah</label>
								</div>
								<div class="col-md-6">
									<div class="input-group date" id="wackelahiranemr_datgl" data-target-input="nearest">
										<input id="wackelahiranemr_ayahtgllhr" name="ayahtgllhr" type="date" class="form-control">

									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-3">
									<label class="col-form-label" title="No KTP Ayah">No KTP Ayah</label>
								</div>
								<div class="col-md-6">
									<input id="wackelahiranemr_ayahnoiden" name="ayahnoiden" type="text" class="form-control" maxlength="45">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-3">
									<label class="col-form-label" title="Pekerjaan Ayah">Pekerjaan Ayah</label>
								</div>
								<div class="col-md-6">
									<select name="ayahpekerjaan_id" id="wackelahiranemr_ayahpekerjaan_id" class="form-control">
										<option value="0">--Pilih--</option>

									</select>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-3">
									<label class="col-form-label" title="Agama ayah">Agama Ayah</label>
								</div>
								<div class="col-md-8">
									<select id="wackelahiranemr_ayahagama_id" class="form-control">
									</select>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-3">
									<label class="col-form-label" title="RM Bayi">RM Bayi</label>
								</div>
								<div class="col-md-8">
									<input type="text" class="form-control" id="rmbayi" name="rmbayi">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-3">
									<label class="col-form-label" title="Jenis Kelamin">Jenis Kelamin</label>
								</div>   	
								<div class="col-md-6">
									<select name="gender_id" id="wackelahiranemr_gender_id" class="form-control">
										<option value="0">--Pilih--</option>
										<option value="1">LAKI-LAKI</option>
										<option value="2">PEREMPUAN</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-3">
									<label class="col-form-label">Berat Badan</label>
								</div>
								<div class="col-md-4">
									<div class="input-group">
										<input type="number" name="bb" id="wackelahiranemr_bb" maxlength="30" class="form-control">
										<div class="input-group-append">
											<div class="input-group-text">Gram</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-3">
									<label class="col-form-label">Panjang Badan</label>
								</div>
								<div class="col-md-4">
									<div class="input-group">
										<input type="number" name="pb" id="wackelahiranemr_pb" maxlength="30" class="form-control">
										<div class="input-group-append">
											<div class="input-group-text">Cm</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-3">
									<label class="col-form-label">Jumlah kelahiran</label>
								</div>
								<div class="col-md-4">
									<div class="input-group">
										<input type="number" name="wackelahiranemr_jumkelahiran" id="wackelahiranemr_jumkelahiran" maxlength="30" class="form-control">
										<div class="input-group-append">
											<div class="input-group-text">Anak</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-3">
									<label class="col-form-label">Anak Ke</label>
								</div>
								<div class="col-md-4">
									<div class="input-group">
										<input type="number" name="wackelahiranemr_anakke" id="wackelahiranemr_anakke" maxlength="30" class="form-control">
										<div class="input-group-append">
											<div class="input-group-text">Anak</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row">	
								<div class="col-md-3">
									<label class="col-form-label">Umur Kehamilan</label>
								</div>
								<div class="col-md-4">
									<div class="input-group">
										<input type="number" name="umurkehamilan" id="wackelahiranemr_umurkehamilan" maxlength="30" class="form-control">
										<div class="input-group-append">
											<div class="input-group-text">Minggu</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-3">
									<label class="col-form-label" title="G+P+A">G + P + A</label>
								</div>
								<div class="col-md-1">
									<input id="wackelahiranemr_g" name="g" class="form-control" type="number">
								</div>
								<div class="col-md-0"><label class="col-form-label">&nbsp;+&nbsp;</label></div>
								<div class="col-md-1">
									<input id="wackelahiranemr_p" name="p" class="form-control" type="number">
								</div>
								<div class="col-md-0"><label class="col-form-label">&nbsp;+&nbsp;</label></div>
								<div class="col-md-1">
									<input id="wackelahiranemr_a" name="a" class="form-control" type="number">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-3">
									<label class="col-form-label" title="Jenis Kelahiran">Jenis Kelahiran</label>
								</div>
								<div class="col-md-4">
									<select name="jeniskelahiran_id" id="wackelahiranemr_jeniskelahiran_id" class="form-control">
										<option value="0">--Pilih--</option>
										<option value="1">TUNGGAL</option>
										<option value="2">KEMBAR</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-3">
									<label class="col-form-label" title="Jenis Persalinan">Jenis Persalinan</label>
								</div>
								<div class="col-md-4">
									<select name="jenispersalinan_id" id="wackelahiranemr_jenispersalinan_id" class="form-control">
										<option value="0">--Pilih--</option>
										<option value="1">SPONTAN</option>
										<option value="2">SECTIO CAESARIA</option>
										<option value="3">EKSTRAKSI VACUM</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-6" >
							<div class="form-group row">
								<div class="col-md-3">
									<label class="col-form-label" title="No RM Ibu">No RM Ibu</label>
								</div>
								<div class="col-md-7">
									<input id="wackelahiranemr_norm_ibu" class="form-control">
								</div>
							</div>
							<div class="form-group row ">
								<div class="col-md-3">
									<label class="col-form-label" title="Nama RM Ibu">Nama RM Ibu</label>
								</div>
								<div class="col-md-7">
									<input id="wackelahiranemr_nama_rm_ibu" class="form-control">
								</div>
							</div>
							<div class="form-group row ">
								<div class="col-md-3">
									<label class="col-form-label" title="Asuransi">Asuransi</label>
								</div>
								<div class="col-md-7">
									<input id="wackelahiranemr_asuransi" class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-3">
									<label class="col-form-label">Dokter Obgyn</label>
								</div>
								<div class="col-md-8">
									<select id="wackelahiranemr_drobgyn_id" name="drobgyn" class="form-control"></select>
								</div>

							</div>
							<div class="form-group row">
								<div class="col-md-3">
									<label class="col-form-label">Dokter Anak</label>
								</div>
								<div class="col-md-8">
									<select id="wackelahiranemr_dranak_id" name="dranak" class="form-control"></select>
								</div>

							</div>
							<div class="form-group row">
								<div class="col-md-3">
									<label class="col-form-label">Perawat</label>
								</div>
								<div class="col-md-8">
									<select id="wackelahiranemr_perawat_id" name="kar" class="form-control"></select>
								</div>
							</div>
							<div class="form-group row" data-select2-id="24">
								<div class="col-md-3">
									<label class="col-form-label"></label>
								</div>
								<div class="col-md-8">
									<select id="wackelahiranemr_rs_id" name="rs" class="form-control select2-hidden-accessible" data-select2-id="wackelahiranemr_rs_id" tabindex="-1" aria-hidden="true"><option value="1" selected="" data-select2-id="7">RSU Darmayu</option></select>
								</div>

							</div>
							<div class="form-group row">
								<div class="col-md-3">
									<label class="col-form-label" title="Nama Bayi">Nama Bayi</label>
								</div>
								<div class="col-md-7">
									<input id="wackelahiranemr_namaby" name="namaby" type="text" class="form-control" maxlength="150">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-3">
									<label class="col-form-label" title="Hepatitis">Imunisasi</label>
								</div>
								<div class="col-md-2">
									<div class="form-group custom-control custom-checkbox ">
										<input name="hepatitis" id="wackelahiranemr_hepatitis" type="checkbox" class="custom-control-input">
										<label class="custom-control-label" for="wackelahiranemr_hepatitis">Hepatitis</label>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group custom-control custom-checkbox ">
										<input name="vitk" id="wackelahiranemr_vitk" type="checkbox" class="custom-control-input">
										<label class="custom-control-label" for="wackelahiranemr_vitk">Vit K</label>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-3">
									<label class="col-form-label" title="Imd">Inisiasi Menyusui Dini</label>
								</div>
								<div class="col-md-4">
									<div class="form-group custom-control custom-checkbox ">
										<input name="imd" id="wackelahiranemr_imd" type="checkbox" class="custom-control-input">
										<label class="custom-control-label" for="wackelahiranemr_imd">IMD</label>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-3">
									<label class="col-form-label" title="Keterangan">Keterangan</label>
								</div>
								<div class="col-md-8">
									<textarea class="form-control" rows="3" id="wackelahiranemr_ket" name="ket"></textarea>
								</div>
							</div>
							<div class="col-lg-12 row">
								<div class="col-md-3"> </div>
								<div class="col-md-8">
									<div class="form-group row">
										<div class="col-md-12" align="center">
											<label class="col-form-label">Dokter Penanggung Jawab Pasien</label>
										</div>
									</div>


									<div class="form-group row">
										<div class="col-md-12" align="center">
											<div id="divHasilTtdKelahiranIrna" class="sigPad border border-dark" style="width: 240px;">
												<div class="sig sigWrapper border border-dark current" style="height: auto; display: block;">
													<img id="ImgTtdKelahiranIrna" style="width:250px;height:250px;">
												</div>
												<input type="hidden" name="HasilTtdKelahiranIrna" id="HasilTtdKelahiranIrna">
												<div><button class="btn btn-primary" onclick="showModalKelahiran()">TTD</button> 
												</div>
											</div>
										</div>
									</div>
									
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12"><button class="btn btn-warning" onclick="cetaksuratkelahiran()">Cetak</button>&nbsp;&nbsp;&nbsp;<button class="btn btn-primary" onclick="simpansuratkelahiranirna()">Simpan</button></div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="ModalTtdKelahiranIrna" role="dialog">
	<div class="modal-dialog" style="width: 408px;">
		<div class="modal-content">
			<div class="modal-header"></div>
			<div class="modal-body">
				<div id="paint_ttdKelahiranIrna"></div>
			</div>
			<div class="modal-footer">
				<button onclick="takeTtdKelahiranIrna()" class="btn btn-primary">Simpan Tanda Tangan</button>
				<button onclick="$('#ModalTtdKelahiranIrna').modal('hide')" class="btn btn-warning">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- <div class="viewsuratlahir"></div> -->
<script type="text/javascript">
	$(document).ready(function() {
		var data =document.getElementById('profilepasienirna').value;
		if (data=='') {
			var url  = '';
			var view = 'viewsuratlahir';
			onCall_listpasien(view, url);
		}else{
			showInputSuratKelahiran();
		} 
		getDokterbedah();
		getPerawatbedah();
		//getrmibu();
		tampilagamapendfirja();
		tampil_pendfrwjpekerjaan();

	});
	function getPerawatbedah(){

		apiPOST('Rekammedisirna/searchPerawat', null, hasil => {
			a=hasil['data'];
			var b='';
			b += '<option value="0">--pilih--</option>';
			if (hasil !==null){	
				for (var i = 0; i < a.length; i++) {
					z = hasil['data'][i];
					b+='<option value="'+z.id_pegawai+'">'+z.nama_pegawai+'</option>';
				}
				document.getElementById('wackelahiranemr_perawat_id').innerHTML=b;
			} 
		});
	}

	function getDokterbedah(){
		apiPOST('Rekammedisirna/searchDokter', null, hasil => {
			a=hasil['data'];	
			var b='';
			b += '<option value="0">--pilih--</option>';
			if (hasil !==null){	
				for (var i = 0; i < a.length; i++) {
					z = hasil['data'][i];
					b+='<option value="'+z.id_pegawai+'">'+z.nama_pegawai+'</option>';
				}
				document.getElementById('wackelahiranemr_drobgyn_id').innerHTML=b;
				document.getElementById('wackelahiranemr_dranak_id').innerHTML=b;
			} 
		});
	}

	function cetaksuratkelahiran(){
		var norm=document.getElementById('rmermirna').value;
		var param = {
			norm      : norm,
		};
		newTabPOST('API/Laporan/LaporanSuratKelahiran',param);
		return;
	}
	function showInputSuratKelahiran(){
		document.getElementById("kelahiransurat_loadingawal").style.display = 'block';
		var param = {
			id_transaksi   	: $('#transaksiermirna').val(),
			id_kunjungan 	: $('#idKunjunganermirna').val(),
			iduser          : user.id_user
		}
		
		apiPOST('Rekammedisirna/showsuratkelahiran', param,hasil=>{
			document.getElementById("kelahiransurat_loadingawal").style.display = 'none';
			if (hasil['data'].length == 0){
				toastr.error("Belum Ada Surat Kelahiran!");
			}else{
				toastr.info("Data Surat Kelahiran di Temukan");
			}
		});
	}
	function simpansuratkelahiranirna() {

		if(document.getElementById('wackelahiranemr_hepatitis').checked==true){
			var hepatitis='true';				
		}else{
			var hepatitis='false';	
		}
		if(document.getElementById('wackelahiranemr_vitk').checked==true){
			var vitk='true';				
		}else{
			var vitk='false';	
		}
		if(document.getElementById('wackelahiranemr_imd').checked==true){
			var imd='true';				
		}else{
			var imd='false';	
		}
		var param={
			norm            : document.getElementById('rmermirna').value,
			umur            : tgllahir,
			transaksi       : document.getElementById('transaksiermirna').value,
			id_kunjungan    : document.getElementById('idKunjunganermirna').value,
			user            : user.nama_pegawai,
			id_user         : user.id_user,
			
			tgl_masuk     	: document.getElementById('wackelahiranemr_tgl_kunjungan').value,
			tgl_lahir     	: document.getElementById('wackelahiranemr_tgl').value,
			ayah          	: document.getElementById('wackelahiranemr_ayah').value,
			tgllahirayah  	: document.getElementById('wackelahiranemr_ayahtgllhr').value,
			ktpayah       	: document.getElementById('wackelahiranemr_ayahnoiden').value,
			pekerjaanayah 	: document.getElementById('wackelahiranemr_ayahpekerjaan_id').value,
			agamaayah 	    : document.getElementById('wackelahiranemr_ayahagama_id').value,
			gender 			: document.getElementById('wackelahiranemr_gender_id').value,
			bb 				: document.getElementById('wackelahiranemr_bb').value,
			pb 				: document.getElementById('wackelahiranemr_pb').value,
			umurlahir		: document.getElementById('wackelahiranemr_umurkehamilan').value,
			g 				: document.getElementById('wackelahiranemr_g').value,
			p 				: document.getElementById('wackelahiranemr_p').value,
			a 				: document.getElementById('wackelahiranemr_a').value,
			jenislahir 		: document.getElementById('wackelahiranemr_jeniskelahiran_id').value,
			jenisperasalinan: document.getElementById('wackelahiranemr_jenispersalinan_id').value,
			rmibu 			: document.getElementById('wackelahiranemr_norm_ibu').value,
			namaibu 		: document.getElementById('wackelahiranemr_nama_rm_ibu').value,
			asuransi 		: document.getElementById('wackelahiranemr_asuransi').value,
			dr_obg			: document.getElementById('wackelahiranemr_drobgyn_id').value,
			dr_anak 		: document.getElementById('wackelahiranemr_dranak_id').value,
			perawat 		: document.getElementById('wackelahiranemr_perawat_id').value,
			nama_by 		: document.getElementById('wackelahiranemr_namaby').value,
			vaksinhepatitis : hepatitis,
			vitk 			: vitk,
			imd 			: imd,
			ket 			: document.getElementById('wackelahiranemr_ket').value,
			ttd 			: document.getElementById('HasilTtdKelahiranIrna').value,
			jumlahkelahiran : document.getElementById('wackelahiranemr_jumkelahiran').value,
			urutanak        : document.getElementById('wackelahiranemr_anakke').value,


		};
		apiPOST('Rekammedisirna/suratkelahiran', param,hasil=>{
			if (hasil['status']=="sukses") {
				cetaksuratkematian();
			} 

		});
	}
	var ttdKelahiranIrna      = new WPaintX('paint_ttdKelahiranIrna');
	function showModalKelahiran() {
		showttdKelahiranIrna();
		$('#ModalTtdKelahiranIrna').modal('show');
	}
	function showttdKelahiranIrna(){
		ttdKelahiranIrna.show();
	}
	function takeTtdKelahiranIrna() {
		document.getElementById('ImgTtdKelahiranIrna').src=ttdKelahiranIrna.getData();
		document.getElementById('HasilTtdKelahiranIrna').value=ttdKelahiranIrna.getData();
		$('#ModalTtdKelahiranIrna').modal('hide');
	}
	  function tampilagamapendfirja() {
    apiPOST('Data_Sosial/agama', null,hasil=>{
      var agama='';
      var a=hasil['data'];
      agama = ""
      for (var i = 0; i < a.length; i++) {
        agama+='<option value="'+a[i]['kd_agama']+'">'+a[i]['agama']+'</option>';
      }
      document.getElementById('wackelahiranemr_ayahagama_id').innerHTML=agama;
    });
  }
  function tampil_pendfrwjpekerjaan() {
  apiPOST('Data_Sosial/pekerjaan', null,hasil=>{
    var pekerjaan='';
    var a=hasil['data'];
    pekerjaan = ""
    for (var i = 0; i < a.length; i++) {
      pekerjaan+='<option value="'+a[i]['kd_pekerjaan']+'">'+a[i]['pekerjaan']+'</option>';
    }
    document.getElementById('wackelahiranemr_ayahpekerjaan_id').innerHTML=pekerjaan;

  });
}
</script>