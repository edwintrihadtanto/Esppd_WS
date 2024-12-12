<div class="col-md-12">
	<div id="divsurat" class="card">
		<div class="card "><!-- S (Situation) -->
			<div class="card-header" style="background-color:black;">								
				<h3 class="card-title" style="color:white;">FORM PEMBERIAN INFORMASI TINDAKAN MEDIS</h3>
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
							<div class="col-md-2">
								<label class="col-form-label">Dokter Pelaksana Tindakan</label>
							</div>
							<div class="col-md-4">
								<select id="dokterpelaksana" class="form-control"> </select>
							</div>
							<div class="col-md-2">
								<label>Jam Pemberian Informasi</label>
							</div>
							<div class="col-md-4">
								<input type="datetime-local" id="jam_pemberian" class="form-control">
							</div>
							<div class="col-md-2">
								<label>Dokter DPJP</label>
							</div>
							<div class="col-md-4">
								<select id="dpjppemberiinfotindakan" class="form-control"></select>
							</div>
							<div class="col-md-2">
								<label>Tanggal</label>
							</div>
							<div class="col-md-4">
								<input type="date" id="tgl_pemberian" class="form-control">
							</div>



						</div>
						<div class="form-group row">
							<div class="col-md-2">
								<label class="col-form-label">JENIS INFORMASI</label>
							</div>
							<div class="col-md-9">
								<label class="col-form-label">ISI INFORMASI</label>
							</div>
							<div class="col-md">
								<label class="col-form-label">TANDAI (V)</label>
							</div>

						</div>
						<div class="form-group row">
							<div class="col-md-2">
								<label class="col-form-label">1. Diagnosis (WD & DD)</label>
							</div>
							<div class="col-md-9">
								<textarea class="form-control" id="diagnosis"></textarea>
							</div>
							<div class="col-md">
								<input type="checkbox" name="">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-2">
								<label class="col-form-label">2. Dasar Diagnosis</label>
							</div>
							<div class="col-md-9">
								<textarea class="form-control" id="dasar_diagnosis"></textarea>
							</div>
							<div class="col-md">
								<input type="checkbox" name="">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-2">
								<label class="col-form-label">3. Tindakan Kedokteran</label>
							</div>
							<div class="col-md-9">
								<textarea class="form-control" id="tindakan"></textarea>
							</div>
							<div class="col-md">
								<input type="checkbox" name="">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-2">
								<label class="col-form-label">4. Indikasi Tindakan</label>
							</div>
							<div class="col-md-9">
								<textarea class="form-control" id="indikasi"></textarea>
							</div>
							<div class="col-md">
								<input type="checkbox" name="">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-2">
								<label class="col-form-label">5. Tata Cara</label>
							</div>
							<div class="col-md-9">
								<textarea class="form-control" id="tata_cara"></textarea>
							</div>
							<div class="col-md">
								<input type="checkbox" name="">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-2">
								<label class="col-form-label">6. Tujuan</label>
							</div>
							<div class="col-md-9">
								<textarea class="form-control" id="tujuan"></textarea>
							</div>
							<div class="col-md">
								<input type="checkbox" name="">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-2">
								<label class="col-form-label">7. Risiko</label>
							</div>
							<div class="col-md-9">
								<textarea class="form-control" id="risiko"></textarea>
							</div>
							<div class="col-md">
								<input type="checkbox" name="">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-2">
								<label class="col-form-label">8. Komplikasi</label>
							</div>
							<div class="col-md-9">
								<textarea class="form-control" id="komplikasi"></textarea>
							</div>
							<div class="col-md">
								<input type="checkbox" name="">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-2">
								<label class="col-form-label">9. Prognosis</label>
							</div>
							<div class="col-md-9">
								<textarea class="form-control" id="prognosis"> </textarea>
							</div>
							<div class="col-md">
								<input type="checkbox" name="">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-2">
								<label class="col-form-label">Alternatif & Risiko</label>
							</div>
							<div class="col-md-9">
								<textarea class="form-control" id="alternatif"></textarea>
							</div>
							<div class="col-md">
								<input type="checkbox" name="">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-2">
								<label class="col-form-label" >Hal Yang Dilakukan</label>
							</div>
							<div class="col-md-9">
								<textarea class="form-control" id="hal_lain"></textarea>
							</div>
							<div class="col-md">
								<input type="checkbox" name="">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-2">
								<label class="col-form-label">Lain-lain</label>
							</div>
							<div class="col-md-9">
								<textarea class="form-control" id="lainnya"></textarea>
							</div>
							<div class="col-md">
								<input type="checkbox" name="">
							</div>
						</div>
						<div class="card-body">
						    <div class="row">
						        <div class="col-md-6" align="center">
						        	<label>Dengan ini menyatakan bahwa saya telah menerima informasi dari dokter sebagaimana diatas kemudian saya beri tanda/paraf di kolom kanannya dan telah memahaminya</label>
						          	<label>Pasien</label>
						          	<div style="text-align: center;">
						            	<img style="width:200px;height:200px;border: 2px dashed;background-color: #535b62d1;" id="Gambarttdpasienpemberianinformasitindakan">
						            	<input type="text" class="form-control form-control-sm text-center d-none" id="Hasilpaint_ttdpasienpemberianinformasitindakan" disabled>
						          </div>
						          <button  class="btn btn-warning btn-sm" onclick="ShowModalttdpasienpemberianinformasitindakan();">Klik Tanda Tangan</button><br>
						          <label>Nama &amp; Tanda tangan</label>
						        </div>

						        <div class="col-md-6" align="center">
						        	<label>Dengan ini menyatakan bahwa saya telah menerima informasi dari dokter sebagaimana diatas kemudian saya beri tanda/paraf di kolom kanannya dan telah memahaminya</label>
						          	<label>Perawat Anestesi</label>
					                  <div style="text-align: center;">
					                    <img style="width:200px;height:200px;border: 2px dashed;background-color: #535b62d1;" id="Gambarttdperawatpemberianinformasitindakan">
					                    <input type="text" class="form-control form-control-sm text-center d-none" id="Hasilpaint_ttdperawatpemberianinformasitindakan" disabled>
					                  </div>
				                  <button onclick="ShowModalttdperawatpemberianinformasitindakan()" class="btn btn-warning btn-sm">Klik Tanda Tangan</button><br>
						          <label>Nama &amp; Tanda tangan</label>
						        </div>
						    </div>
						</div>
						<!-- <div class="card"> 
							<div class="row">
								<div class="col-md-6">
									<center><label>Dengan ini menyatakan bahwa saya telah menerima informasi dari dokter sebagaimana diatas kemudian saya beri tanda/paraf di kolom kanannya dan telah memahaminya</label><br><br>
										<label><h3>Pasien</h3></label></center>
										<div id="ttdpasienpemberiinfotindakan"></div>
								</div>
								<div class="col-md-6">
									<center><label>Dengan ini menyatakan bahwa saya telah menerima informasi dari dokter sebagaimana diatas kemudian saya beri tanda/paraf di kolom kanannya dan telah memahaminya</label><br><br>
										<label><h3>DPJP</h3></label></center>
										<div id="ttddpjppemberiinfotindakan"></div>
								</div>
							</div>
						</div> -->
								<div class="form-group row">
									<div class="col-md-3">
										<button onclick="simpanpemberianinfotindakan()" class="btn btn-primary">Simpan</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
</div>

<div class="modal fade"  id="Modalpaint_ttdpasienpemberianinformasitindakan" role="dialog">
  <div class="modal-dialog" style="width: 408px;">
    <div class="modal-content">
      <div class="modal-body">
        <div id="paint_ttdpasienpemberianinformasitindakan"></div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-sm btn-primary" onclick="takepaint_ttdpasienpemberianinformasitindakan()"><i class="fa fa-save"></i> Simpan</button>
        <button class="btn btn-sm btn-outline-danger" onclick="$('#Modalpaint_ttdpasienpemberianinformasitindakan').modal('hide')"><i class="fa fa-times"></i> Batal</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade"  id="Modalpaint_ttdperawatpemberianinformasitindakan" role="dialog">
  <div class="modal-dialog" style="width: 408px;">
    <div class="modal-content">
      <div class="modal-body">
        <div id="paint_ttdperawatpemberianinformasitindakan"></div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-sm btn-primary" onclick="takepaint_ttdperawatpemberianinformasitindakan()"><i class="fa fa-save"></i> Simpan</button>
        <button class="btn btn-sm btn-outline-danger" onclick="$('#Modalpaint_ttdperawatpemberianinformasitindakan').modal('hide')"><i class="fa fa-times"></i> Batal</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
	var ttdpaint_ttdpasienpemberianinformasitindakan   = new WPaintX('paint_ttdpasienpemberianinformasitindakan');
	var ttdpaint_ttdperawatpemberianinformasitindakan   = new WPaintX('paint_ttdperawatpemberianinformasitindakan');

	$(document).ready(function() {
		// ttddpjp.show();
		// ttdpasien.show();
		var data =document.getElementById('profilepasienirna').value;
		if (data=='') {
			var url  = '';
	        var view = 'viewpemberianinfotindakanmedis';
	        onCall_listpasien(view, url);
		}

		// tampilagama();
		getDokterbedah();

		//setTimeout(refresh_listpasermirna_instruksi, 1000); 
	});
	// var ttddpjp			= new WPaintX('ttddpjppemberiinfotindakan');
	// var ttdpasien 		= new WPaintX('ttdpasienpemberiinfotindakan');

	function takepaint_ttdpasienpemberianinformasitindakan() {
	  document.getElementById('Gambarttdpasienpemberianinformasitindakan').src = ttdpaint_ttdpasienpemberianinformasitindakan.getData();
	  document.getElementById('Hasilpaint_ttdpasienpemberianinformasitindakan').value = ttdpaint_ttdpasienpemberianinformasitindakan.getData();
	  $('#Modalpaint_ttdpasienpemberianinformasitindakan').modal('hide');
	}

	function ShowModalttdpasienpemberianinformasitindakan() {
	  showttdpasienpemberianinformasitindakan();
	  $('#Modalpaint_ttdpasienpemberianinformasitindakan').modal('show');
	}

	function showttdpasienpemberianinformasitindakan(){
	  ttdpaint_ttdpasienpemberianinformasitindakan.show();
	}

	function takepaint_ttdperawatpemberianinformasitindakan() {
	  document.getElementById('Gambarttdperawatpemberianinformasitindakan').src = ttdpaint_ttdperawatpemberianinformasitindakan.getData();
	  document.getElementById('Hasilpaint_ttdperawatpemberianinformasitindakan').value = ttdpaint_ttdperawatpemberianinformasitindakan.getData();
	  $('#Modalpaint_ttdperawatpemberianinformasitindakan').modal('hide');
	}

	function ShowModalttdperawatpemberianinformasitindakan() {
	  showttdperawatpemberianinformasitindakan();
	  $('#Modalpaint_ttdperawatpemberianinformasitindakan').modal('show');
	}

	function showttdperawatpemberianinformasitindakan(){
	  ttdpaint_ttdperawatpemberianinformasitindakan.show();
	}

	function tampilagama() {
		apiPOST('Data_Sosial/agama', null,hasil=>{
			var agama='';
			var a=hasil['data'];
			agama = ""
			for (var i = 0; i < a.length; i++) {
				agama+='<option value="'+a[i]['kd_agama']+'">'+a[i]['agama']+'</option>';
			}
			document.getElementById('agamaayah').innerHTML=agama;
			document.getElementById('agamaibu').innerHTML=agama;
		});
	}
	function getDokterbedah(){
		apiPOST('Rekammedisirna/searchDokter', null, hasil => {
			a=hasil['data'];	
			var b='';

			if (hasil !==null){	
				for (var i = 0; i < a.length; i++) {
					z = hasil['data'][i];
					b+='<option value="'+z.id_pegawai+'">'+z.nama_pegawai+'</option>';
				}
				document.getElementById('dokterpelaksana').innerHTML=b;
				document.getElementById('dpjppemberiinfotindakan').innerHTML=b;
			} 
		});
	}
	function simpanpemberianinfotindakan() {
		var param={
			norm            	: document.getElementById('rmermirna').value,
			transaksi       	: document.getElementById('transaksiermirna').value,
			kunjungan    		: document.getElementById('idKunjunganermirna').value,
			user            	: user.nama_pegawai,
			id_user         	: user.id_user,
			tgl_pemberian		: document.getElementById('tgl_pemberian').value,
			jam_pemberian		: document.getElementById('jam_pemberian').value,
			id_dpjp				: document.getElementById('dpjppemberiinfotindakan').value,
			diagnosis 			: document.getElementById('diagnosis').value,
			dasar_diagnosis 	: document.getElementById('dasar_diagnosis').value,
			tindakan 			: document.getElementById('tindakan').value,
			indikasi 			: document.getElementById('indikasi').value,
			tata_cara 			: document.getElementById('tata_cara').value,
			tujuan 				: document.getElementById('tujuan').value,
			risiko 				: document.getElementById('risiko').value,
			komplikasi 			: document.getElementById('komplikasi').value,
			prognosis 			: document.getElementById('prognosis').value,
			alternatif 			: document.getElementById('alternatif').value,
			hal_lain 			: document.getElementById('hal_lain').value,
			lainnya 			: document.getElementById('lainnya').value,
			ttdpasien 			: ttdpaint_ttdpasienpemberianinformasitindakan.getData(),
			ttddpjp 			: ttdpaint_ttdperawatpemberianinformasitindakan.getData(),
			dokter_pelaksana 	: document.getElementById('dokterpelaksana').value,
			pemberi_info 		: user.id_user,


		};
		apiPOST('Rekammedisirna/pemberiinfotindakan', param,hasil=>{
			if (hasil['status']=="sukses") {
				cetaksuratkelahiran();
			} 

		});
	}
	function cetaksuratkelahiran(){
		var norm=document.getElementById('rmermirna').value;
		var param = {
			norm      	: norm,
			user 		: user.nama_pegawai,
			umur 		: tgllahir,
			time 		: document.getElementById('timepxlahir').value,
			panjang 	: document.getElementById('panjangpxlahir').value,
			berat 		: document.getElementById('beratpxlahir').value,
		};
		newTabPOST('API/Laporan/LaporanSuratKelahiran',param);
		return;
	}
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


	}
</script>