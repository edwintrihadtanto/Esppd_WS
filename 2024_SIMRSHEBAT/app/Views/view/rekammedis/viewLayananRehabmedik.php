<?php
$data             = json_decode($_GET['data']);
$rm               = str_replace('"', '', json_encode($data->rm));
$unit             = str_replace('"', '', json_encode($data->unit));
$id_kunjungan     = str_replace('"', '', json_encode($data->id_kunjungan));
$id_transaksi     = str_replace('"', '', json_encode($data->id_transaksi));
?>

<div class="row ">
	<div class="col-md-12">
		<div class="row d-flex justify-content-center">
			<h4><b><label class="col-form-label" id="dacrjrehabmedis_title"> LAYANAN KEDOKTERAN FISIK DAN REHABILITASI MEDIS</label></b></h4>
		</div>
	</div>
</div>
<div class="card " data-select2-id="29"><!-- FIRST -->
	<div class="card-header" style="background-color:black;">
      <h3 class="card-title" style="color:white;"></h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>       
      </div>
    </div>
	<div class="card-body" data-select2-id="28">
		<div class="row" data-select2-id="27">
			<div class="col-md-6">
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">ID</label>
					</div>
					<div class="col-md-2">
						<input id="dacrjrehabmedis_id" name="dacrjrehabmedis_id" type="text" class="form-control" readonly="readonly" fdprocessedid="2ei19">
						<input id="dacrjrehabmedis_idtransaksi" name="dacrjrehabmedis_idtransaksi" type="hidden" class="form-control" readonly="readonly" fdprocessedid="2ei19">
						<input id="dacrjrehabmedis_idkunjungan" name="dacrjrehabmedis_idkunjungan" type="hidden" class="form-control" readonly="readonly" fdprocessedid="2ei19">
					</div>
					<div class="col-md-6">
						<b><i><label class="col-form-label">Note : Yang bertanda Bintang (*) wajib di isi ! </label></i></b>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3  text-truncate">
						<label class="col-form-label">Tanggal Masuk Pelayanan</label>
					</div>
					<div class="col-md-4">
						<div class="input-group date" id="dacrjrehabmedis_datgl" data-target-input="nearest">
							<input id="dacrjrehabmedis_atgl" name="atgl" type="text" class="form-control datetimepicker-input" data-target="#dacrjrehabmedis_datgl" data-toggle="datetimepicker" fdprocessedid="cmon3o" readonly>							
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">				
				<div class="form-group row" id="dacrjrehabmedis_divpj2">
					<div class="col-md-3">
						<label class="col-form-label">Dokter</label>
					</div>
					<div class="col-md-7">
						<input id="iddokterrehabmedik" name="iddokterrehabmedik" type="text" class="form-control" readonly="readonly" fdprocessedid="2ei19" value=''>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="card "><!-- IDENTITAS PASIEN -->
	<div class="card-header" style="background-color:black;">
      <h3 class="card-title" style="color:white;">IDENTITAS PASIEN</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>       
      </div>
    </div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Nama Pasien</label>
					</div>
					<div class="col-md-7">
						<input id="lnamapasienrehabmedik" name="lnamapasienrehabmedik" type="text" class="form-control" readonly="readonly" fdprocessedid="2ei19" value=''>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Nomor RM / Gender</label>
					</div>
					<div class="col-md-7">
						<input id="rmkelaminrehabmedik" name="rmkelaminrehabmedik" type="text" class="form-control" readonly="readonly" fdprocessedid="2ei19" value=''>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Tanggal Lahir</label>
					</div>
					<div class="col-md-7">
						<input id="rmtglahirrehabmedik" name="rmtglahirrehabmedik" type="text" class="form-control" readonly="readonly" fdprocessedid="2ei19" value=''>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Telp / HP</label>
					</div>
					<div class="col-md-7">
						<input id="rmteleponrehabmedik" name="rmteleponrehabmedik" type="text" class="form-control" readonly="readonly" fdprocessedid="2ei19" value=''>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Hubungan dengan penanggung jawab</label>
					</div>
					<div class="col-md-7">
						<div class="input-group">
							<input id="rmhubunganpenangungjawabrehabmedik" name="rmhubunganpenangungjawabrehabmedik" type="text" class="form-control" readonly="readonly" fdprocessedid="2ei19" value=''>
						</div>
					</div>
				</div>
				<div class="form-group row" id="dacrjrehabmedis_div_bhubket" style="display:none;">
					<div class="col-md-3">
					</div>
					<div class="col-md-7">
						<input type="text" class="form-control" id="dacrjrehabmedis_bhubket" maxlength="100">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="card"><!-- LEMBAR PENGISIAN -->
	<div class="card-header" style="background-color:black;">
      <h3 class="card-title" style="color:white;">LEMBAR PENGISIAN</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>       
      </div>
    </div>	
	<div class="card-body">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group row">
					<div class="col-md-12">
						<label class="col-form-label font-weight-bold">Anamnesa *</label>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-12">
						<textarea rows="4" name="dacrjrehabmedis_canamnesa" id="dacrjrehabmedis_canamnesa" style="width:100%;" class="form-control"></textarea>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group row">
					<div class="col-md-12">
						<label class="col-form-label font-weight-bold">Pemeriksaan Fisik dan Uji Fungsi *</label>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-12">
						<textarea rows="4" name="dacrjrehabmedis_cfisik" id="dacrjrehabmedis_cfisik" style="width:100%;" class="form-control"></textarea>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="card"><!-- DIAGNOSIS -->
	<div class="card-header" style="background-color:black;">
      <h3 class="card-title" style="color:white;">DIAGNOSIS</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>       
      </div>
    </div>
	<div class="card-body">
		<div class="row ">
			<div class="col-md-12">
				<div class="form-group row">
					<div id="dacrjrehabmedis_pG4" class="col-md-12">
						<!-- <i class="fa fa-angle-right"></i> -->&nbsp; <label class="col-form-label" title="Diagnosa Klinis">Diagnosis Medis</label>
						<span class="badge bg-primary rounded-pill" onclick="showmodaltambahpenyakitsekarang_rehab()" title="tambah icd">Tambah</span>
						<table 
						id="terpaidiagnosismedis"
						class="table table-striped table-sm choose"
						data-pagination="true"			
						data-search-on-enter-key="true"
						data-show-jump-to="true">
							<thead>
								<tr>
									<th data-field="no">#</th>
									<th data-field="penyakit">Description</th>
									<th data-field="id_penyakit">Kode</th>
									<th data-formatter="del_icd_rehab">Hapus</th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>
				</div>
			</div>			
		</div>
	</div>
</div>
<div class="card"><!-- PEMERIKSAAN PENUNJANG -->
	<div class="card-header" style="background-color:black;">
      <h3 class="card-title" style="color:white;">PEMERIKSAAN PENUNJANG</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>       
      </div>
    </div>		
	<div class="card-body">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group row">
					<div id="dacrjrehabmedis_pG2" class="col-12">
						<!-- <i class="fa fa-angle-right"></i> -->&nbsp; <label class="col-form-label" title="Diagnosa Klinis">Laboratorium</label><br>
						<button class="btn btn-primary" title="Input Order Laboratorium" onclick="show_modalPermintaanLabIrja()">Permintaan Laboratorium</button>

					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group row">
					<div id="dacrjrehabmedis_pG3" class="col-12">
						<!-- <i class="fa fa-angle-right"></i> -->&nbsp; <label class="col-form-label" title="Diagnosa Klinis">Radiologi</label><br>
						<button class="btn btn-primary" title="Input Order Radiologi" onclick="show_modalPermintaancheckboxlogiIrja()">Permintaan Radiologi</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="card"><!-- PROSEDUR TERAPI -->
	<div class="card-header" style="background-color:black;">
      <h3 class="card-title" style="color:white;">PROSEDUR TERAPI</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>       
      </div>
    </div>	
	<div class="col-lg-12 row">
		<div class="col-lg-6">
			<div id="dacrjrehabmedis_p5" class="card-body">
				<label class="col-form-label font-weight-bold">PROSEDUR TERAPI</label>
				<span class="badge bg-primary rounded-pill" onclick="showmodaltambahterapi_rehab()" title="tambah prosedur">Tambah</span>
				<table 
				class="table table-striped table-sm"
				id="tableProsedrterapi"
				data-pagination="true"		
				data-search-on-enter-key="true"
				data-show-jump-to="true">
					<thead>
						<tr>
							<th data-field="id_terapi">#</th>
							<th data-field="deskripsi">Description</th>
							<th data-field="kode">Kode</th>
							<th data-formatter="del_terapi">Hapus</th>
						</tr>
					</thead>
					<tbody id="terpaidiagnosismedis"></tbody>
				</table>
			</div>
		</div>
		<div class="col-lg-6 mt-2">
			<div class="form-group row">
				<div class="col-md-12">
					<!-- <i class="fa fa-angle-right"></i> -->&nbsp; <label class="col-form-label" title="Anjuran">Anjuran</label>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-md-12">
					<textarea rows="3" name="dacrjrehabmedis_eanjuran" id="dacrjrehabmedis_eanjuran" style="width: 100%;" class="form-control"></textarea>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-md-12">
					<!-- <i class="fa fa-angle-right"></i> -->&nbsp; <label class="col-form-label" title="Evaluasi">Evaluasi</label>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-md-12">
					<textarea rows="3" name="dacrjrehabmedis_eevaluasi" id="dacrjrehabmedis_eevaluasi" style="width: 100%;" class="form-control"></textarea>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-md-4">
					<label class="col-form-label font-weight-bold" title="suspek">Suspek Penyakit Akibat Kerja2</label>
				</div>
				<div class="col-md-6">
					<div class="row" id="Adacrjrehabmedis_esuspekIdxxx">
						<div class="col-md-4">
							<div class="form-group">
								<div class="row custom-control custom-checkbox custom-control-inline">
									<input name="Adacrjrehabmedis_esuspek" value="1" type="radio" class="custom-control-input" id="Adacrjrehabmedis_esuspek_1" onclick="document.getElementById('Adacrjrehabmedis_div_esuspekId2').style.display='none'" checked>
									<label class="custom-control-label" for="Adacrjrehabmedis_esuspek_1">Tidak</label>
								</div>
							</div>

						</div>
						<div class="col-md-4">
							<div class="form-group">
								<div class="row custom-control custom-checkbox custom-control-inline">
									<input name="Adacrjrehabmedis_esuspek" value="2" type="radio" class="custom-control-input" id="Adacrjrehabmedis_esuspek_2" onclick="document.getElementById('Adacrjrehabmedis_div_esuspekId2').style.display='block'">
									<label class="custom-control-label" for="Adacrjrehabmedis_esuspek_2">Ya</label>
								</div>
							</div>

							<div class="row" id="Adacrjrehabmedis_div_esuspekId2" style="display: none;">
								<div class="col-md-1"></div>
								<div class="col-md-10">
									<textarea rows="2" name="Adacrjrehabmedis_esuspekket" id="Adacrjrehabmedis_esuspekket" style="width: 100%;" class="form-control"></textarea>
								</div>*
							</div>

						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="card"><!-- ASSESMEN (diagnosa) -->
	<div class="card-header" style="background-color:black;">
      <h3 class="card-title" style="color:white;">ASSESMEN (diagnosa)</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>       
      </div>
    </div>	
	<div class="card-body">
		<div class="row ">
			<div class="col-md-6">
				<div class="form-group row">
					<div class="col-md-12">
						<!-- <i class="fa fa-angle-right"></i> -->&nbsp; <label class="col-form-label" title="Diagnosa Medis">Diagnosa Medis *</label>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-12">
						<textarea rows="4" name="dacrjrehabmedis_fdiagnosamedis" id="dacrjrehabmedis_fdiagnosamedis" style="width: 100%;" class="form-control "></textarea>
					</div>
				</div>
			</div>
			<!-- <div class="col-md-6">
				<div class="form-group row">
					<div class="col-md-12">
						 <i class="fa fa-angle-right"></i> &nbsp; <label class="col-form-label" title="Diagnosa Fungsi">Diagnosa Fungsi </label>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-12">
						<textarea rows="4" name="dacrjrehabmedis_fdiagnosafungsi" id="dacrjrehabmedis_fdiagnosafungsi" style="width: 100%;" class="form-control "></textarea>
					</div>
				</div>
			</div> -->
		</div>
	</div>
</div>
<div class="card"><!-- PERMINTAAN TERAPI &amp; INPUT PROGRAM -->
	<div class="card-header" style="background-color:black;">
      <h3 class="card-title" style="color:white;">PERMINTAAN TERAPI &amp; INPUT PROGRAM</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>       
      </div>
    </div>		
	<div class="card-body">		
		<div class="row">
			<div class="col-md-6">
				<label>Permintaan E-Resep</label><br>
				<button class="btn btn-sm btn-primary" title="Input Resep" onclick="erekammedisRWJ_show_ermeresepRWJ();">Eresep</button>
			</div>
			<div class="col-md-6">
				<div class="form-group row">
					<div id="dacrjrehabmedis_pG1" class="col-md-12">
						<label class="col-form-label font-weight-bold">DAFTAR PERMINTAAN TERAPI</label>
						<textarea rows="4" name="" id="" style="width:100%;" class="form-control"></textarea>
					</div>
					<!-- <div class="form-group row">
						<div class="col-md-12">
						<textarea rows="9" name="dacrjrehabmedis_fdiagnosafungsi" id="dacrjrehabmedis_fdiagnosafungsi" style="width: 100%;" class="form-control "></textarea>
						</div>
					</div> -->
				</div>
			</div>
		</div>
	</div>
</div>
<div class="card"><!-- TTD -->
	<div class="card-header" style="background-color:black;">
      <h3 class="card-title" style="color:white;"></h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>       
      </div>
    </div>
	<div class="card-body">
		<div class="row ">
			<div class="col-md-6">
				<div class="table-responsive" style="text-align: center;border: solid;">
					<center>
						<h4>Tanda Tangan Pegawai</h4>
					</center>
					<img id="ImgTLAyananRehabPegawai" style="width:250px;height: 250px;">
					<input type="hidden" name="HasilTtdPegawai" id="HasilTtdPegawai">
					<center><button class="btn btn-warning" onclick="ShowModalLayananRehabMedikPegawai()">Tanda Tangan </button> </center>

					<div class="modal fade" id="ModalTtdLayananRehabPegawai" role="dialog">
						<div class="modal-dialog" style="width: 408px;">
							<div class="modal-content">
								<div class="modal-header"></div>
								<div class="modal-body">
									<div id="paint_ttdPegRehab"></div>
								</div>
								<div class="modal-footer">
									<button onclick="takeTtdLayananRehabPegawai()">Simpan Tanda Tangan</button>
									<button onclick="$('#ModalTtdLayananRehabPegawai').modal('hide')">Close</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="table-responsive" style="text-align: center;border: solid;">
					<center>
						<h4>Tanda Tangan Pasien</h4>
					</center>
					<img id="ImgTLAyananRehabPasien" style="width:250px;height: 250px;">
					<input type="hidden" name="HasilTtdPasien" id="HasilTtdPasien">
					<center><button class="btn btn-warning" onclick="ShowModalLayananRehabMedikPasien()">Tanda Tangan </button> </center>
					<div class="modal fade" id="ModalTtdLayananRehabPasien" role="dialog">
						<div class="modal-dialog" style="width: 408px;">
							<div class="modal-content">
								<div class="modal-header"></div>
								<div class="modal-body">
									<div id="paint_ttdPasienRehab"></div>
								</div>
								<div class="modal-footer">
									<button onclick="takeTtdLayananRehabPasien()">Simpan Tanda Tangan</button>
									<button onclick="$('#ModalTtdLayananRehabPasien').modal('hide')">Close</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="card-footer">
		<div class="float-left">
			<button onclick="save_layanan_prosedur_rehabmedis()" id="dacrjrehabmedis_btsave" type="button" class="btn btn-sm btn-primary" fdprocessedid="3gvwuh">
				<!-- <i class="fas fa-save"></i> --> Simpan
			</button>
			<button id="dacrjrehabmedis_btreset" type="button" class="btn btn-sm btn-warning" fdprocessedid="mjr6qb">
				<!-- <i class="fas fa-ban"></i> --> Cetak
			</button>
			<button id="dacrjrehabmedis_btdelete" type="button" class="btn btn-sm btn-danger" style="display: none;">
				<!-- <i class="fas fa-trash"></i> --> Hapus
			</button>
			<button id="dacrjrehabmedis_btprintdiag" type="button" class="btn btn-sm btn-success" fdprocessedid="fs2z4" style="display: none;">
				<!-- <i class="fas fa-print"></i> --> Print PDF
			</button>
		</div>
		<div class="float-right">
			<button id="dacrjrehabmedis_btujif" type="button" class="btn btn-sm btn-success" style="display: none;">
				<!-- <i class="fas fa-print"></i> --> Tindakan Uji Fungsi
			</button>
		</div>
	</div>
</div>

<div class="modal " id="ModalShowaddmrpenyakitmedermirja_rehab">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        Tambah Diagnosa ICD 10
      </div>
      <div class="modal-body">
        <div class="form-group">           
          <label>ICD 10</label>
          <!-- <input class="form-control form-control-xs" id="textTambahdiagnosaresumemedErmirja_rehab">
          <div id="DivTambahdiagnosaresumemedErmirja_rehab"></div> -->
          <select class="diagnosaRehab form-control form-control-xs" id="diagnosaRehab"></select>        
      	</div>
      </div>
  	  <div class="modal-footer">
		<div class="form-group">
          <button class="btn btn-primary" onclick="pilihPenyakittambahresumemedermirja()">Simpan</button>
        </div>
	  </div>
	</div>
  </div>
</div>

<div class="modal " id="ModalShowaddterapiermirja_rehab">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        Tambah Prosedur Terapi
      </div>
      <div class="modal-body">
        <div class="form-group">           
          <label>Prosedur Terapi</label>          
          <select class="form-control form-control-xs" id="pros_terapi"></select>        
      	</div>
      </div>
  	  <div class="modal-footer">
		<div class="form-group">
          <button class="btn btn-primary" onclick="save_prosedur_terapi_rehab()">Simpan</button>
        </div>
	  </div>
	</div>
  </div>
</div>

<script type="text/javascript">
	document.getElementById('loading_LayananRehabMedik').style.display = 'block';
	var ttdLayananRehabPegawai = new WPaintX('paint_ttdPegRehab');
	var ttdLayananRehabPasien = new WPaintX('paint_ttdPasienRehab');
	var no_rm = "<?php echo $rm; ?>";
	var id_unit = "<?php echo $unit; ?>";
	var id_kunjungan = "<?php echo $id_kunjungan; ?>";
	var id_transaksi = "<?php echo $id_transaksi; ?>";
	var tableterpaidiagnosismedis = $('#terpaidiagnosismedis');
	var tabletableProsedrterapi = $('#tableProsedrterapi');
	var id_penyakit_tabel;
	var id_terapi;

	tableterpaidiagnosismedis.bootstrapTable({});
	tabletableProsedrterapi.bootstrapTable({});

	$(document).ready(function() {
		historipenyakit_rehab(no_rm);
		view_table_terapi();
		$("#diagnosaRehab").select2({
			placeholder: "Ketikan Kode Diagnosa",
			allowClear: true,
			dropdownParent: $('#ModalShowaddmrpenyakitmedermirja_rehab')
		});
	})

	$(document).on('keyup', '.select2-search__field', function(ev) {
		var self = $(this);
		if (self.val().length > 1) {
			tampil_diagnosa_rehab(self.val());
		}
	});
	
	function tampil_diagnosa_rehab(kode) {
		var param = {
			id: kode
		};
		apiPOST('Data_Sosial/diagnosabyname', param, hasil => {
			var penjamin = '';
			var a = hasil['data'];
			for (var i = 0; i < a.length; i++) {
				penjamin += '<option value="' + a[i]['id_penyakit'] + '">' + a[i]['id_penyakit'] + ' | ' + a[i]['penyakit'] + '</option>';
			}
			document.getElementById('diagnosaRehab').innerHTML = penjamin;
		});
	}

	function del_icd_rehab(value,row){	
		var buton= "<button type='button' class='btn btn-xs btn-outline-danger' onclick='deletediag_rehab("+row.id_kunjungan+")'><i class='fa fa-trash'></i></button>";
		id_penyakit_tabel=row.id_penyakit;
		return buton;
	}
	
	function del_terapi(value,row){	
		var buton= "<button type='button' class='btn btn-xs btn-outline-danger' onclick='deleteterapi_rehab("+row.id_kunjungan+")'><i class='fa fa-trash'></i></button>";
		id_terapi=row.id_terapi;
		return buton;
	}

	function ShowModalLayananRehabMedikPegawai() {
		showttLayananRehabMedikPegawai();
		$('#ModalTtdLayananRehabPegawai').modal('show');
	}

	function showttLayananRehabMedikPegawai() {
		ttdLayananRehabPegawai.show();
	}

	function takeTtdLayananRehabPegawai() {
		document.getElementById('ImgTLAyananRehabPegawai').src = ttdLayananRehabPegawai.getData();
		document.getElementById('HasilTtdPegawai').value = ttdLayananRehabPegawai.getData();
		$('#ModalTtdLayananRehabPegawai').modal('hide');
	}

	function ShowModalLayananRehabMedikPasien() {
		showttLayananRehabMedikPasien();
		$('#ModalTtdLayananRehabPasien').modal('show');
	}

	function showttLayananRehabMedikPasien(){
		ttdLayananRehabPasien.show();
	}

	function showmodaltambahpenyakitsekarang_rehab() {
	  $("#ModalShowaddmrpenyakitmedermirja_rehab").modal("show");
	  document.getElementById("diagnosaRehab").value="";
	}
	
	function showmodaltambahterapi_rehab() {
		$("#ModalShowaddterapiermirja_rehab").modal("show");
		document.getElementById("pros_terapi").value="";
		apiPOST('Rekammedisirja/view_prosedur_terapi', null, hasil => {
			var a=hasil['data'];
			var isi='';
			for (var i = 0; i < a.length; i++) {
			  isi+='<option value="'+a[i]['id_terapi']+'">'+a[i]['kode']+'|| '+a[i]['deskripsi']+'</option>';
			}
			document.getElementById('pros_terapi').innerHTML=isi;
		})
	}

	function takeTtdLayananRehabPasien() {
		document.getElementById('ImgTLAyananRehabPasien').src = ttdLayananRehabPasien.getData();
		document.getElementById('HasilTtdPasien').value = ttdLayananRehabPasien.getData();
		$('#ModalTtdLayananRehabPasien').modal('hide');
	}

	param = {
		id_kunjungan: id_kunjungan,
		id_transaksi: id_transaksi
	};
	apiPOST('Rekammedisirja/datalayananrehabmedik', param, hasil => {
		if (hasil !== null) {
			var a = hasil['data'];
			var img = document.getElementById('ImgTLAyananRehabPegawai');
			var img2 = document.getElementById('ImgTLAyananRehabPasien');
			
			for (var i = 0; i < a.length; i++) {
				document.getElementById('dacrjrehabmedis_id').value = a[i].no_rm;
				document.getElementById('dacrjrehabmedis_atgl').value = a[i].tgl_masuk;
				document.getElementById('iddokterrehabmedik').value = a[i].nama_pegawai;
				document.getElementById('lnamapasienrehabmedik').value = a[i].nama;
				var rmkelaminrehabmedik = a[i].no_rm + ' / ' + a[i].kelamin;
				document.getElementById('rmkelaminrehabmedik').value = rmkelaminrehabmedik;
				document.getElementById('rmtglahirrehabmedik').value = a[i].tgl_lahir;
				document.getElementById('rmteleponrehabmedik').value = a[i].telepon;
				document.getElementById('dacrjrehabmedis_idtransaksi').value = a[i].id_transaksi;
				document.getElementById('dacrjrehabmedis_idkunjungan').value = a[i].id_kunjungan;
				document.getElementById('dacrjrehabmedis_canamnesa').value = a[i].anamnesa;
				document.getElementById('dacrjrehabmedis_cfisik').value = a[i].fisik_ujifungsi;
				document.getElementById('dacrjrehabmedis_eanjuran').value = a[i].anjuran;
				document.getElementById('dacrjrehabmedis_eevaluasi').value = a[i].evaluasi;
				document.getElementById('Adacrjrehabmedis_esuspekket').value = a[i].suspek_penyakitkerja_ket;
				document.getElementById('dacrjrehabmedis_fdiagnosamedis').value = a[i].ases_diagnosa_medis;
				// document.getElementById('dacrjrehabmedis_fdiagnosafungsi').value = a[i].ases_diagnosa_fungsi;

				if (a[i].suspek_penyakitkerja == '1') {
					$('#Adacrjrehabmedis_esuspek_1').prop('checked', true);
				} else {
					$('#Adacrjrehabmedis_esuspek_2').prop('checked', true);
					$('#Adacrjrehabmedis_div_esuspekId2').show();
					document.getElementById('Adacrjrehabmedis_esuspekket').value = a[i].suspek_penyakitkerja_ket;
				}				
				img.src = a[i].ttdpegawai;
				img2.src = a[i].ttdpasien;

				var img = document.getElementById('ImgTLAyananRehabPegawai');
					img.src = a[i].ttdpegawai;

				var img2 = document.getElementById('ImgTLAyananRehabPasien');
					img2.src = a[i].ttdpasien;
			}
			document.getElementById('loading_LayananRehabMedik').style.display = 'none';
		} else {
			tampildataPasienrehabrajal(id_kunjungan);

			function tampildataPasienrehabrajal(id_kunjungan) {
				document.getElementById('loading_LayananRehabMedik').style.display = 'block';

				apiPOST('Rekammedisirja/tampildataPasienrehabrajal', param, hasil => {
					if (hasil['status'] == 'sukses') {
						var a = hasil['data'];
						for (var i = 0; i < a.length; i++) {
							document.getElementById('dacrjrehabmedis_id').value = a[i].no_rm;
							document.getElementById('dacrjrehabmedis_atgl').value = a[i].tgl_masuk;
							document.getElementById('iddokterrehabmedik').value = a[i].nama_pegawai;
							document.getElementById('lnamapasienrehabmedik').value = a[i].nama;
							var rmkelaminrehabmedik = a[i].no_rm + ' / ' + a[i].kelamin;
							document.getElementById('rmkelaminrehabmedik').value = rmkelaminrehabmedik;
							document.getElementById('rmtglahirrehabmedik').value = a[i].tgl_lahir;
							document.getElementById('rmteleponrehabmedik').value = a[i].telepon;
							document.getElementById('dacrjrehabmedis_idtransaksi').value = a[i].id_transaksi;
							document.getElementById('dacrjrehabmedis_idkunjungan').value = a[i].id_kunjungan;	
						}
						document.getElementById('loading_LayananRehabMedik').style.display = 'none';
					} else {
						document.getElementById('loading_LayananRehabMedik').style.display = 'none';
					}
				});
			}
		}
	});

	function save_layanan_prosedur_rehabmedis() {
		document.getElementById('loading_LayananRehabMedik').style.display = 'block';
		var param = {
			idkunjungan: $('#dacrjrehabmedis_idkunjungan').val(),
			idtransaksi: $('#dacrjrehabmedis_idtransaksi').val(),
			norm: $('#dacrjrehabmedis_id').val(),
			anamnesa: $('#dacrjrehabmedis_canamnesa').val(),
			fisikujifungsi: $('#dacrjrehabmedis_cfisik').val(),
			anjuran: $('#dacrjrehabmedis_eanjuran').val(),
			evaluasi: $('#dacrjrehabmedis_eevaluasi').val(),
			ases_diagnosa_medis: $('#dacrjrehabmedis_fdiagnosamedis').val(),
			// ases_diagnosa_fungsi: $('#dacrjrehabmedis_fdiagnosafungsi').val(),
			ttdpasien: ttdLayananRehabPasien.getData(),
			ttdpegawai: ttdLayananRehabPegawai.getData(),
			suspek_penyakitkerja: document.querySelector('input[name=Adacrjrehabmedis_esuspek]:checked').value,
			suspek_penyakitkerja_ket: $('#Adacrjrehabmedis_esuspekket').val(),
		}
		apiPOST('Rekammedisirja/save_layanan_rehabmedik', param, hasil => {
			document.getElementById('loading_LayananRehabMedik').style.display = 'none';
		});
	}
	
	function save_prosedur_terapi_rehab(){
		var param ={
			id_transaksi:$('#dacrjrehabmedis_idtransaksi').val(),
			id_kunjungan:$('#dacrjrehabmedis_idkunjungan').val(),
			id_terapi:$('#pros_terapi').val()
		}
		
		apiPOST('Rekammedisirja/save_pros_terapi', param, hasil => {
			view_table_terapi();
			$("#ModalShowaddterapiermirja_rehab").modal("hide");
		})
	}

	function historipenyakit_rehab(rm) {
		$('#terpaidiagnosismedis').bootstrapTable('removeAll');	
	    var param = {
		no_rm : rm};
		apiPOST('Kunjungan/historipenyakitkeluarga', param, hasil =>{	
			tableterpaidiagnosismedis.bootstrapTable('append', hasil['history']);			
		});
    }
	
	function view_table_terapi(){
		$('#tableProsedrterapi').bootstrapTable('removeAll');	
	    var param = {
		id_transaksi : id_transaksi};
		apiPOST('Rekammedisirja/view_terapi_pasien', param, hasil =>{	
			tabletableProsedrterapi.bootstrapTable('append', hasil['data']);			
		});
	}

    function pilihPenyakittambahresumemedermirja() {
	  var kode =document.getElementById('textTambahdiagnosaresumemedErmirja').value;
	  var res = kode.split('|');
	  var icd = $("#diagnosaRehab").val();
	  var kunjungan=document.getElementById('idkunjunganaddicd10').value;
	  var param={
	    rm     			: 	no_rm,
	    unit   			: 	id_unit,
	    id_kunjungan 	: 	id_kunjungan,
	    kode   			: 	icd,
	    stat   			:   document.getElementById('statusdiagnosa').value,
	    id_transaksi 	: 	id_transaksi,
	  };
	  apiPOST('Rekammedisirja/addmrpenyakitirja',param,hasil=>{
	    $('#ModalShowaddmrpenyakitmedermirja_rehab').modal('hide');
	    historipenyakit_rehab(no_rm);
	  });
	}
	
	function deletediag_rehab(kunj){
		var param={
			id_kunjungan : kunj,
			kode:id_penyakit_tabel,			
		}

		pertanyaan.fire({
			title: 'Proses Hapus Penyakit',
			html: '<span>Apakah Anda ingin Menghapus Penyakit ?</span><p><i>Data tidak dapat dikembalikan lagi !!</i></p>',
			icon: 'question',
			showCancelButton:true,
			reverseButtons:false,
			allowOutsideClick:false,
		}).then((result)=>{
			if(result.isConfirmed){			
				apiPOST('Rekammedisirja/deletemrpenyakitirja', param, hasil => {
					historipenyakit_rehab(no_rm);
				});
			}
		})	
	}
	
	function deleteterapi_rehab(kunj){
		var param={
			id_kunjungan : kunj,
			id_terapi:id_terapi
		}

		pertanyaan.fire({
			title: 'Proses Hapus Terapi',
			html: '<span>Apakah Anda ingin Menghapus Terapi ?</span><p><i>Data tidak dapat dikembalikan lagi !!</i></p>',
			icon: 'question',
			showCancelButton:true,
			reverseButtons:false,
			allowOutsideClick:false,
		}).then((result)=>{
			if(result.isConfirmed){			
				apiPOST('Rekammedisirja/deleteterapiirja', param, hasil => {
					view_table_terapi();
				});
			}
		})	
	}
</script>