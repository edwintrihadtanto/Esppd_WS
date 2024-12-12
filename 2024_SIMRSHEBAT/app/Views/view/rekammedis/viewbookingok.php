<?php
$data             = json_decode($_GET['data']);
$rm               = str_replace('"', '', json_encode($data->rm));
$unit             = str_replace('"', '', json_encode($data->unit));
$id_kunjungan     = str_replace('"', '', json_encode($data->id_kunjungan));
$id_transaksi     = str_replace('"', '', json_encode($data->id_transaksi));
$namapasien       = str_replace('"', '', json_encode($data->namapasien));

?>

<div class="row ">
	<div class="col-md-12">
		<div class="row d-flex justify-content-center">
			<h4><b><label class="col-form-label" id="dacrjrehabmedis_title"> Antrian Operasi </label></b></h4>
		</div>
	</div>
</div>


<div class="card ">

	<div class="card-header">
		<!-- <i class="fas fa-user"></i> -->&nbsp;
		<label class="col-form-label font-weight-bold"></label>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Nama Pasien</label>
					</div>
					<div class="col-md-7">
						<input id="bookingokidtransaksi" name="bookingokidtransaksi" type="text" class="form-control" readonly="readonly" value="<?php echo $id_transaksi;?>">
						<input id="bookingokidkunjungan" name="bookingokidkunjungan" type="text" class="form-control" readonly="readonly" value="<?php echo $id_kunjungan;?>">
						<input id="bookingokidunit" name="bookingokidunit" type="hidden" class="form-control" readonly="readonly" value="<?php echo $unit;?>">

						<input id="namapasienrehabmedik" name="namapasienrehabmedik" type="text" class="form-control" readonly="readonly" value='<?php echo $namapasien;?>'>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Nomor RM</label>
					</div>
					<div class="col-md-7">
						<input id="bookingokrmpasien" name="bookingokrmpasien" type="text" class="form-control" readonly="readonly"  value='<?php echo $rm;?>'>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Tanggal Operasi</label>
					</div>
					<div class="col-md-7">
						<input id="bookingoktgloperasi" name="bookingoktgloperasi" type="date" class="form-control" >
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Jenis Operasi</label>
					</div>
					<div class="col-md-7">
						<textarea id="bookingokjenisoperasi" name="bookingokjenisoperasi" class="form-control"></textarea>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

<div class="card-footer">
	<div class="float-left">
		<button onclick="save_booking_operasi()" id="dacrjbookingoperasi_btsave" type="button" class="btn btn-sm btn-primary" fdprocessedid="3gvwuh">
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
</div>
</div>

<script type="text/javascript">
	function save_booking_operasi() {
		document.getElementById('loading_LayananRehabMedik').style.display = 'block';
		var param = {
			idkunjungan: $('#bookingokidkunjungan').val(),
			idtransaksi: $('#bookingokidtransaksi').val(),
			norm       : $('#bookingokrmpasien').val(),
			jenisop    : $('#bookingokjenisoperasi').val(),
			tglop      : $('#bookingoktgloperasi').val(),
			idunit     : $('#bookingokidunit').val(),


		}
		apiPOST('Rekammedisirja/save_booking_operasi', param, hasil => {
			document.getElementById('loading_LayananRehabMedik').style.display = 'none';

		});
	}
</script>