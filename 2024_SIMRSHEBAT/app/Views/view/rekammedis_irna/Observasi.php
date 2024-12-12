<div class="col-md-12">
<!-- 	<div class="overlay-wrapper" id="inputobsevasiirna_loadingawal">
		<div class="overlay">
			<i class="fas fa-3x fa-sync-alt fa-spin"></i>
		</div>
	</div> -->
	<div id="divobservasiirna" >
		<div><button class="btn btn-primary" onclick="showmodalobservasiirna();">Tambah Data</button>  </div>
		<div class="card">
			<div class="card-body">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">JAM</th>
							<th scope="col">TENSI</th>
							<th scope="col">NADI</th>
							<th scope="col">RR</th>
							<th scope="col">SUHU</th>
							<th scope="col">GCS</th>
							<th scope="col">OBJEKTIF</th>
							<th scope="col">TERAPI</th>
							<th scope="col">PPA</th>
							<th scope="col">ACT</th>
						</tr>
					</thead>
					<tbody id="tbodyobservasi">

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="ModalTindakanObservasi" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row mb-3"  >
					<div id="DivTglSoapi" style="display:none;">
						<label>Tanggal SOAP I</label>
						<input type="text" class="form-control" id="tglSoapiObservasi" name="tglSoapiObservasi" readonly style="width: 113px;">
						<input type="hidden" name="form-control" id="urutmasukkunjObservasi">
						<input type="hidden" name="jamsoapObservasi" id="jamsoapObservasi">
					</div>
					<!-- nadi/saturasi -->

					<div class="row mb-3">
						<label for="Email" class="col-md-3 col-lg-2 col-form-label">Tekanan Darah</label>
						<div class="col-md-2 col-lg-2" >
							<input  type="text" class="form-control form-control-sm" name="soapt_darahObservasi"  id="soapt_darahObservasi" value="0" onkeypress="soapt_darah(event)" onchange="soapt_darahchange()">
							<div id="DivTekananDarah" style="position:absolute;"></div>
						</div>
						<label for="Email" class="col-md-2 col-lg-1 col-form-label">Suhu</label>
						<div class="col-md-2 col-lg-2">
							<input  type="text" class="form-control form-control-sm" name="soapsuhuObservasi"  id="soapsuhuObservasi" value="0" onkeypress="soapsuhu(event)" onchange="soapsuhuchange()">
						</div>
						<label for="Email" class="col-md-2 col-lg-1 col-form-label">Nadi</label>
						<div class="col-md-2 col-lg-2">
							<input type="text" class="form-control form-control-sm" name="soapnadiObservasi"  id="soapnadiObservasi" value="0" onkeypress="soapnadi(event)" onchange="soapnadichange()"> 
						</div>
					</div>

					<div class="row mb-3">
						<label for="Email" class="col-md-3 col-lg-2 col-form-label">Nafas</label>
						<div class="col-md-2 col-lg-2">
							<input  type="text" class="form-control form-control-sm" name="soapnafasObservasi"  id="soapnafasObservasi" value="0" onkeypress="soapnafas(event)" onchange="soapnafaschange()">
						</div>
						<label for="Email" class="col-md-2 col-lg-1 col-form-label" style="width:80px;">Saturasi</label>
						<div class="col-md-2 col-lg-2">
							<input  type="text" class="form-control form-control-sm" name="soapsaturasiObservasi"  id="soapsaturasiObservasi" value="0" onkeypress="soapsaturasi(event)" onchange="soapsaturasichange()">
						</div>
						<label for="Email" class="col-md-2 col-lg-1 col-form-label" style="width:80px;">GCS</label>
						<div class="col-md-2 col-lg-2">
							<input  type="text" class="form-control form-control-sm" name="soapgcsObservasi"  id="soapgcsObservasi" value="0" >
						</div>
					</div>

					<div>
						<label class="form-label">Object</label>&nbsp;&nbsp;&nbsp;<label><span class="badge bg-danger rounded-pill" onclick="objektifObservasi()" title="delete">Delete</span></label>
						<textarea type="text" class="form-control" id="objektifObservasi" name="objektifObservasi" ></textarea>
					</div>

					<div>
						<label class="form-label">Tindakan</label> &nbsp;&nbsp;&nbsp;<label><span class="badge bg-primary rounded-pill" onclick="insertObjektif()" title="tambah icd">Tambah</span></label>&nbsp;<label><span class="badge bg-danger rounded-pill" onclick="deleteTindakanObservasi()" title="delete">Delete</span></label>
						<textarea type="text" class="form-control" id="TindakanObservasi" name="TindakanObservasi" ></textarea>
						<div id="divinputTindakanObservasi" ></div>
					</div>
				</div>
			</div>
			<div class="modal-footer"> 
				<div >
					<button type="button" class="btn btn-primary" id="buttonSimpanObservasi" onclick="myFunctionSimpanSoapiObservasi()">Simpan</button><button type="button" class="btn btn-primary" id="buttonRevisiObservasi" onclick="revisiSoapObservasi()" style="display:none;">Revisi</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end modal layanan -->
<script type="text/javascript">
	$(document).ready(function() {
		var nowday = "<?php echo date('Y-m-d') ?>";
		var data = document.getElementById('profilepasienirna').value;
		if (data=='') {			
			var url 	= '';
			var view 	= 'viewobsevasiirna';
			onCall_listpasien(view, url);
		}else{
			tampilobservasiirna();
		}
		
		//document.getElementById('dactranspasien_atgl').value=nowday;

	});
	function showmodalobservasiirna() {
		//var rm   = document.getElementById("rmermirna").value;
		//var tgl  = document.getElementById("tglmasukpasien").value;
		//var unit = document.getElementById("unitermirna").value;
		$('#ModalTindakanObservasi').modal('show');
		// $.ajax({
		// 	url:"<?php echo base_url('erm/ShowObservasi');?>",
		// 	data:{rm:rm,tgl:tgl,unit:unit,},
		// 	type:'post',
		// 	cache : false,
		// 	dataType:'JSON',
		// 	success:function(r){
		// 		if (r.response.code==200) {
		// 			var  updatesoap=r.response.soapupdate;
		// 			for (var i = 0; i < updatesoap.length; i++) {
		// 				document.getElementById('soapnadiObservasi').value     =updatesoap[i].nadi;
		// 				document.getElementById('soapnafasObservasi').value    =updatesoap[i].nafas;
		// 				document.getElementById('soapsaturasiObservasi').value =updatesoap[i].saturasi;
		// 				document.getElementById('soapsuhuObservasi').value     =updatesoap[i].suhu;
		// 				document.getElementById('soapt_darahObservasi').value  =updatesoap[i].tensi;
		// 				document.getElementById('soapgcsObservasi').value      =updatesoap[i].gcs;
		// 				document.getElementById('objektifObservasi').value     =updatesoap[i].objektif;
		// 				document.getElementById('TindakanObservasi').value     =updatesoap[i].terapi;
		// 			} 
		// 		}else{
		// 			showassemendokter();
		// 		}
		// 	},
		// })
	}

	function myFunctionSimpanSoapiObservasi() {
		var param = {
			id_transaksi   	: $('#transaksiermirna').val(),
			id_kunjungan 	: $('#idKunjunganermirna').val(),
			currentDate : new Date().toJSON().slice(0, 10),
			tglmasuk  : new Date().toJSON().slice(0, 10),
			rm        : document.getElementById("rmermirna").value,
			unit      : document.getElementById("idunitermirna").value,
			o         : document.getElementById("objektifObservasi").value,
			a         : document.getElementById("TindakanObservasi").value,
			t_darah   : document.getElementById("soapt_darahObservasi").value,
			suhu      : document.getElementById("soapsuhuObservasi").value,
			nadi      : document.getElementById("soapnadiObservasi").value,
			nafas     : document.getElementById("soapnafasObservasi").value,
			saturasi  : document.getElementById("soapsaturasiObservasi").value,
			gcs       : document.getElementById("soapgcsObservasi").value,
			id_user   : user.kd_user,
			jenis_user: user.id_jenis_pegawai
		}
		if (document.getElementById("objektifObservasi").value==''|| document.getElementById("TindakanObservasi").value=='' ) {
			alert('Inputan SOAPI kurang lengkap');
		} else {
			//document.getElementById("buttonSimpanObservasi").style.display = "none";
			apiPOST('Rekammedisirna/save_soapObservasi', param,hasil=>{
				if (data="berhasil") {
					//setTimeout(function() { $('#largeModalSuccesSimpan').modal('hide'); }, 1000);
					$('#ModalTindakanObservasi').modal('hide');
					tampilobservasiirnalast();
					//showobservasi();
				} else {
					//$('#largeModalGagalSimpan').modal('show');
					setTimeout(function() { $('#largeModalGagalSimpan').modal('hide'); }, 1000);
				}

			});
		}

	}

	function tampilobservasiirnalast() {
		//$('#ModalTindakanObservasi').modal('show');
		var param={
			id_transaksi   	: $('#transaksiermirna').val(),
			id_kunjungan 	: $('#idKunjunganermirna').val(),
		}
		apiPOST('Rekammedisirna/tampilobservasiirnalast',param,hasil=>{
			var html = '';
			var observasi=hasil['data'];
			if (hasil['code']==200) {
			for (var i = 0; i < observasi.length; i++) {
				html +='<tr>';
				html +='<th scope="row">'+observasi[i].jam+'</th>';
				html +='<td>'+observasi[i].tensi+'</td>';
				html +='<td>'+observasi[i].nadi+'</td>';
				html +='<td>'+observasi[i].saturasi+'</td>';
				html +='<td>'+observasi[i].suhu+'</td>';
				html +='<td>'+observasi[i].gcs+'</td>';
				html +='<td>'+observasi[i].objektif+'</td>';
				html +='<td>'+observasi[i].terapi+'</td>';
				html +='<td>'+observasi[i].full_name+'</td>';
				html +='<td><i class="glyphicon glyphicon-edit" title="Update" onclick="updateobservasi(`'+observasi[i].urut+'`,`'+observasi[i].kd_pasien+'`,`'+observasi[i].tgl_masuk+'`,`'+observasi[i].kd_unit+'`)"></i>&nbsp&nbsp<i class="glyphicon glyphicon-remove" title="Delete" onclick="hapusobservasi(`'+observasi[i].urut+'`,`'+observasi[i].kd_pasien+'`,`'+observasi[i].tgl_masuk+'`,`'+observasi[i].kd_unit+'`)"></i></td>';
				html +='</tr>';
			}
			}
			$('#tbodyobservasi').append(html);
		})
	}

	function tampilobservasiirna() {
		//$('#ModalTindakanObservasi').modal('show');
		$('#tbodyobservasi').innerHTML='';
		var param={
			id_transaksi   	: $('#transaksiermirna').val(),
			id_kunjungan 	: $('#idKunjunganermirna').val(),
		}
		apiPOST('Rekammedisirna/tampilobservasiirna',param,hasil=>{
			var html = '';
			var observasi=hasil['data'];
			if (hasil['code']==200) {
			for (var i = 0; i < observasi.length; i++) {
				html +='<tr>';
				html +='<th scope="row">'+observasi[i].jam+'</th>';
				html +='<td>'+observasi[i].tensi+'</td>';
				html +='<td>'+observasi[i].nadi+'</td>';
				html +='<td>'+observasi[i].saturasi+'</td>';
				html +='<td>'+observasi[i].suhu+'</td>';
				html +='<td>'+observasi[i].gcs+'</td>';
				html +='<td>'+observasi[i].objektif+'</td>';
				html +='<td>'+observasi[i].terapi+'</td>';
				html +='<td>'+observasi[i].full_name+'</td>';
				html +='<td><i class="glyphicon glyphicon-edit" title="Update" onclick="updateobservasi(`'+observasi[i].urut+'`,`'+observasi[i].kd_pasien+'`,`'+observasi[i].tgl_masuk+'`,`'+observasi[i].kd_unit+'`)"></i>&nbsp&nbsp<i class="glyphicon glyphicon-remove" title="Delete" onclick="hapusobservasi(`'+observasi[i].urut+'`,`'+observasi[i].kd_pasien+'`,`'+observasi[i].tgl_masuk+'`,`'+observasi[i].kd_unit+'`)"></i></td>';
				html +='</tr>';
			}
			}
			$('#tbodyobservasi').append(html);
		})
	}
	function showObservasiIrna(){
		document.getElementById("inputobsevasiirna_loadingawal").style.display = 'none';
		var no_rm        = document.getElementById('rmermirna').value ;
		var nama         = document.getElementById('namaermirna').value;
		var unit         = document.getElementById('unitermirna').value;
		var id_kunjungan = document.getElementById('idKunjunganermirna').value;
		var id_unit      = document.getElementById('idunitermirna').value;
		var transaksi    = document.getElementById('transaksiermirna').value;
		var alamat       = document.getElementById('alamatermirna').value;
		var id_kunjungan = document.getElementById('profilepasienirna').value;

		//viewtandavitalserahterima(no_rm,unit,id_kunjungan,id_unit,nama,transaksi);
		var param = {
			id_transaksi   	: $('#transaksiermirna').val(),
			id_kunjungan 	: $('#idKunjunganermirna').val(),
			id_user       : user.id_pegawai
		}

		apiPOST('Rekammedisirna/showobservasiirna', param,hasil=>{
			document.getElementById("inputobsevasiirna_loadingawal").style.display = 'none';
			if (hasil['data'].length == 0){
				toastr.error("Belum Ada Inputan Serah Terima!");
			}else{
				toastr.info("Data Serah Terima di Temukan");
			}
		});
	}
</script>