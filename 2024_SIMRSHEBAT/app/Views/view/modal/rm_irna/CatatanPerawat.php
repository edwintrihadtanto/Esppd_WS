<?php
$data 				= json_decode($_GET['data']);
$rm 				= str_replace('"','', json_encode($data->rm));
$id_kunjungan     	= str_replace('"','', json_encode($data->id_kunjungan));
$id_transaksi     	= str_replace('"','', json_encode($data->id_transaksi));
?>

<div class="card-body p-2 darkgrey-custom" id="divassesmenAnes">
    <div id="div2assesmenAnes" class="rapet">
        <div class="card"><!-- TITLE -->
            <div class="col-md-12">
                <div class="row d-flex justify-content-center">
                    <h4><b><label class="col-form-label">Catatan Perawat</label></b></h4>
                </div>
            </div>
			<div class="card-header" style="background-color:black;">
				<h3 class="card-title" style="color:white;">Catatan Perawat</h3>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse">
						<i class="fas fa-minus"></i>
					</button>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
                    <div class="col-md-12">
						<button type="button" class="btn btn-info" onclick="ShowModalCatatanPerawat()"><i class="fas fa-plus"></i>Tambah Catatan Perawat</button>
						<table style="text-align: center;" width="100%"
						id="tableCatatanPerawat"
						data-pagination="true"
						data-search="true"
						data-search-on-enter-key="true"
						data-show-jump-to="true">
							<thead>
								<tr>
									<th data-field="no">#</th>
									<th data-formatter="edit_cat_prawat">ACT</th>
									<th data-field="id_kunjungan">ID</th>
									<th data-field="tgl_input">Tanggal</th>
									<th data-field="jam_input">Jam</th>
									<th data-field="nama_pegawai">Perawat</th>
									<th data-formatter="isicatatan">Catatan</th>
								</tr>
							</thead>
							<tbody>							
							</tbody>
						</table>
					</div>
				</div>	
			</div>
        </div>
	</div>	
</div>

<div class="modal fade" data-keyboard="false" data-backdrop="static" id="Modaladdcatatanperawat" role="dialog" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h2 class="modal-title" id="">Tambah Catatan</h2>
				<button type="button" class="btn-close" data-bs-dismiss="modal" onclick="$('#Modaladdcatatanperawat').modal('hide');" aria-label="Close"><i class="fas fa-times"></i></button>
			</div>
			  <div class="modal-body">
				<div class="col-md-12">				
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-3">
							<div class="row "><label class="col-form-label">No RM</label></div><br>
							<div class="row "><label class="col-form-label">Perawat/Bidan</label></div><br>
							<div class="row "><label class="col-form-label">Tanggal</label></div><br>
							<div class="row "><label class="col-form-label">Jam</label></div><br>
							<div class="row "><label class="col-form-label">Catatan</label></div>
						</div>
						<div class="col-md-8">
							<div class="row"><label class="col-form-label"><?php echo $rm; ?></label></div><br>
							<div class="row">
								<select class="form-control form-control-xs" name="perawatcatat" id="perawatcatat"></select>
							</div><br>
							<div class="row"><input type="date" id="tglcatatperawat" class="form-control form-control-sm" value="<?php echo date('Y-m-d');?>"></div><br>
							<div class="row"><input type="time" id="jamcatatperawat" class="form-control form-control-sm" value="<?php echo date('H:i',strtotime('7 hour'));?>"></div><br>
							<div class="row">
								<textarea name="catatperawat" id="catatcatatperawat" style="width: 100%;" onkeydown="if(event.keyCode===9){var v=this.value,s=this.selectionStart,e=this.selectionEnd;this.value=v.substring(0, s)+'\t'+v.substring(e);this.selectionStart=this.selectionEnd=s+1;return false;}"></textarea>
							</div>
						</div>
					</div>
				</div>
			  </div>
			<div class="modal-footer">
				<button class="btn btn-sm btn-primary" id="save_cat_perawat" onclick="savecatatperawat()">Simpan</button>
				<button class="btn btn-sm btn-primary collapse" id="edit_cat_perawat" onclick="saveeditcatatperawat()">Ubah</button>
				<button class="btn btn-sm btn-outline-danger" onclick="$('#Modaladdcatatanperawat').modal('hide');">Batal</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

	var no_rm   		= "<?php echo $rm; ?>";	
	var id_kunjungan   	= "<?php echo $id_kunjungan; ?>";
	var id_transaksi   	= "<?php echo $id_transaksi; ?>";
	var tableCatatanPerawat = $('#tableCatatanPerawat');
	var val_cat;
	var val_tgl;
	var val_jam;
	var val_kunj;
	var val_trans;
	var val_perwat
	
	tableCatatanPerawat.bootstrapTable({})
	$(document).ready(function() {
		document.getElementById('loading_catatanperawat').style.display = 'none';
		pegawai();
		viewtablecatatanperawat();
	})
	
	function ShowModalCatatanPerawat(){
		$('#Modaladdcatatanperawat').modal('show');
	}
	
	function pegawai() {
	  apiPOST('Rawatjalan/perawat', null,hasil=>{
		var a=hasil['data'];
		var pegawai='';
		for (var i = 0; i < a.length; i++) {
		  pegawai+='<option value="'+a[i]['id_pegawai']+'">'+a[i]['nama_pegawai']+'</option>';
		}
		document.getElementById('perawatcatat').innerHTML=pegawai;
	  });
	}
	
	function edit_cat_prawat(value,row){
		val_cat=row.catatan;
		val_jam=row.jam_input;
		val_tgl=row.tgl_input;
		var buton= "<button type='button' class='btn btn-xs btn-warning' onclick='edit_catatan("+ row.perawat+","+row.id_transaksi+","+row.id_kunjungan+")'><i class='fas fa-edit'></i></button><button type='button' class='btn btn-xs btn-danger' onclick='del_catatan("+row.id_transaksi+","+row.id_kunjungan+")'><i class='fas fa-trash'></i></button>";
		return buton;
	}
	
	function isicatatan(value,row){
		var replaced = row.catatan.replaceAll('%0A', '<br>').replaceAll('%20', ' ');
		return replaced;
	}
	
	function savecatatperawat(){
		var param={
			id_transaksi:id_transaksi,
			id_kunjungan:id_kunjungan,
			no_rm:no_rm,
			perawat:$('#perawatcatat').val(),
			tgl_input:$('#tglcatatperawat').val(),
			jam_input:$('#jamcatatperawat').val(),
			catatan:$('#catatcatatperawat').val()
		}
		apiPOST('Rekammedisirna/savecatatnperawat', param,hasil=>{
			$('#Modaladdcatatanperawat').modal('hide');
			document.getElementById('catatcatatperawat').value='';
		})
	}
	
	function viewtablecatatanperawat(){
		var param={
			id_kunjungan:id_kunjungan,
			no_rm:no_rm
		}
		tableCatatanPerawat.bootstrapTable('removeAll');
		apiPOST('Rekammedisirna/showCatatanKeperawatan', param,hasil=>{
			if (hasil !==null){
				b = hasil['data'];
				tableCatatanPerawat.bootstrapTable('append', hasil['data']);
			}
		});
	}
	
	function edit_catatan(perawat,trans,kunj){
		$('#Modaladdcatatanperawat').modal('show');
		$('#save_cat_perawat').hide();
		$('#edit_cat_perawat').show();
		
		var replaced = val_cat.replaceAll('%0A', '\n').replaceAll('%20', ' ');
		val_kunj=kunj;
		val_trans=trans;
		val_perwat=perawat;
		document.getElementById('catatcatatperawat').value=replaced;
		document.getElementById('tglcatatperawat').value=val_tgl;
		document.getElementById('jamcatatperawat').value=val_jam;
		
		apiPOST('Rawatjalan/perawat', null,hasil=>{
			var a=hasil['data'];
			var pegawai='';
			for (var i = 0; i < a.length; i++) {
				if(a[i]['id_pegawai']==perawat){
					pegawai+='<option value="'+a[i]['id_pegawai']+'" selected>'+a[i]['nama_pegawai']+'</option>';
				}else{
					pegawai+='<option value="'+a[i]['id_pegawai']+'">'+a[i]['nama_pegawai']+'</option>';
				}
			}
			document.getElementById('perawatcatat').innerHTML=pegawai;
		});
	}
	
	function saveeditcatatperawat(){
		var param={
			id_transaksi:val_trans,
			id_kunjungan:val_kunj,
			no_rm:no_rm,
			perawat_b:$('#perawatcatat').val(),
			tgl_input_b:$('#tglcatatperawat').val(),
			jam_input_b:$('#jamcatatperawat').val(),
			catatan_b:$('#catatcatatperawat').val(),
			perawat_l:val_perwat,
			tgl_input_l:val_tgl,
			jam_input_l:val_jam,
			catatan_l:val_cat
		}
		
		apiPOST('Rekammedisirna/updatecatatperawat', param,hasil=>{
			$('#Modaladdcatatanperawat').modal('hide');
			$('#save_cat_perawat').show();
			$('#edit_cat_perawat').hide();
			viewtablecatatanperawat();
		})
	}
	
	function del_catatan(trans,kunj){
		var param={
			id_transaksi:trans,
			id_kunjungan:kunj,
			tgl_input:val_tgl,
			jam_input:val_jam
		}
		
		pertanyaan.fire({
			title: 'Proses Hapus Catatan',
			html: '<span>Apakah Anda ingin Menghapus Catatan Ini ?</span><p><i>Data tidak dapat dikembalikan lagi !!</i></p>',
			icon: 'question',
			showCancelButton:true,
			reverseButtons:false,
			allowOutsideClick:false,
		}).then((result)=>{
			if(result.isConfirmed){
				apiPOST("Rekammedisirna/delcatatanperawat", param, hasil => {		      
					viewtablecatatanperawat();
				});
			}
		})	
	}

</script>