<div class="col-md-12">
	<div id="divsurat" class="card">
		<div class="card "><!-- S (Situation) -->

			<div class="overlay-wrapper" id="loading_surat_sakit">
				<div class="overlay">
					<i class="fas fa-3x fa-sync-alt fa-spin"></i>
				</div>
			</div>

			<div class="card-header" style="background-color:black;">
				<h3 class="card-title" style="color:white;">FORM SURAT SAKIT</h3>
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
								<label class="col-form-label">Alasan Sakit</label>
							</div>
							<div class="col-md-8">
								<input type="text" name="alasansuketsakit" id="alasansuketsakit" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Hari</label>
							</div>
							<div class="col-md-8">
								<input type="text" name="harisuketsakit" id="harisuketsakit" class="form-control">
							</div>
						</div>

						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Tanggal Istirahat</label>
							</div>
							<div class="col-md-8">
								<input style="width:30%" type="date" name="tglmulaisuketsakit" id="tglmulaisuketsakit">S/D<input style="width:30%" type="date" name="tglakhirsuketsakit" id="tglakhirsuketsakit">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Diagnosa</label>
							</div>
							<div class="col-md-8">
								<textarea rows="3" name="diagsuketsakit" id="diagsuketsakit" style="width:100%;" class="form-control"></textarea>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Keterangan</label>
							</div>
							<div class="col-md-8">
								<textarea rows="3" name="ketsuketsakit" id="ketsuketsakit" style="width:100%;" class="form-control"></textarea>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Tanggal Surat</label>
							</div>
							<div class="col-md-8">
								<input style="width:30%" type="date" name="tglsuketsakit" id="tglsuketsakit" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="col-form-label">Dokter</label>
							</div>
							<div class="col-md-8">
								<textarea rows="3" name="doktersuketsakit" id="doktersuketsakit" style="width:100%;" class="form-control"></textarea>
							</div>
						</div>
						<div class="table-responsive" style="text-align: center;border: solid;">
							<center>
								<h4>Tanda Tangan DPJP</h4>
							</center>
							<img id="ImgTtdSuratsakit" style="width:250px;height: 250px;">
							<input type="hidden" name="HasilTtdDpjpSuratsakit" id="HasilTtdDpjpSuratsakit">
							<center><button class="btn btn-warning" onclick="ShowModalTtdDpjpSuratsakit()">Tanda Tangan </button> </center>
						</div>
						<!-- <div class="form-group row">
							<div class="col-md-12">
								<h2>Tanda tangan dokter</h2>
								<div id="ttddpjpsuketsakit" ></div>
							</div>
						</div> -->
						<!-- ttdresume -->
						<div class="modal fade" id="ModalTtdSuratsakit" role="dialog">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header"></div>
									<div class="modal-body">
										<div id="paint_ttdSuratsakit"></div>
									</div>
									<div class="modal-footer">
										<button onclick="takeTtdDpjpSuratsakit()">Simpan Tanda Tangan</button>
										<button onclick="$('#ModalTtdSuratsakit').modal('hide')">Close</button>
									</div>
								</div>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-md-6">
								<button onclick="cetaksuketsakit()" class="btn btn-primary">Cetak</button> | 
								<button onclick="simpansuketsakit()" class="btn btn-primary">Simpan </button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var ttdSuratsakit = new WPaintX('paint_ttdSuratsakit');
	$(document).ready(function() {
		showttdSuratsakit();
		var data =document.getElementById('profilepasienirna').value;
		if (data=='') {
			var url  = '';
            var view = 'viewsuratsakit';
            onCall_listpasien(view, url);
		}else{
			var transaksi = document.getElementById('transaksiermirna').value;
			ceksuratsakit(transaksi);
		}
		//setTimeout(refresh_listpasermirna_instruksi, 1000); 
	});

	function showDataSuratSakit(transaksi){
		ceksuratsakit(transaksi);
	}

	function simpansuketsakit() {
		$('#loading_surat_sakit').show();
		var param = {
			transaksi: document.getElementById('transaksiermirna').value,
			norm: document.getElementById('rmermirna').value,
			alasan: document.getElementById('alasansuketsakit').value,
			hari: document.getElementById('harisuketsakit').value,
			tgl_mulai: document.getElementById('tglmulaisuketsakit').value,
			tgl_akhir: document.getElementById('tglakhirsuketsakit').value,
			diagnosa: document.getElementById('diagsuketsakit').value,
			keterangan: document.getElementById('ketsuketsakit').value,
			tgl_surat: document.getElementById('tglsuketsakit').value,
			dokter: document.getElementById('doktersuketsakit').value,
			ttddokter: ttdSuratsakit.getData(),
			id_user: user.id_user,

		};
		apiPOST('Rekammedisirna/suratsakit', param, hasil => {
			if (hasil['status'] == "sukses") {
				$('#loading_surat_sakit').hide();
				//cetaksuratsehat();
			} else {
				$('#loading_surat_sakit').hide();
			}

		});
	}

	function ceksuratsakit(transaksi) {

		document.getElementById('alasansuketsakit').value = "";
		document.getElementById('harisuketsakit').value = "";
		document.getElementById('tglmulaisuketsakit').value = "";
		document.getElementById('tglakhirsuketsakit').value = "";
		document.getElementById('diagsuketsakit').value = "";
		document.getElementById('ketsuketsakit').value = "";

		document.getElementById('tglsuketsakit').value = "";
		document.getElementById('doktersuketsakit').value = "";

		var param = {
			transaksi: transaksi,
		};
		$('#loading_surat_sakit').show();
		apiPOST('Rekammedisirna/ceksuratsakit', param, hasil => {
			$('#loading_surat_sakit').hide();
			if (hasil['data'] != null){

				var x = hasil['data'];
				var tglmulai = x.tgl_mulai;
				var tgl_mulai = tglmulai.substr(0, 10);

				var tglakhir = x.tgl_mulai;
				var tgl_akhir = tglakhir.substr(0, 10);

				var tglsurat = x.tgl_mulai;
				var tgl_surat = tglsurat.substr(0, 10);
				var ttdnya = x.ttddokter;
				document.getElementById('alasansuketsakit').value = x.alasan;
				document.getElementById('harisuketsakit').value = x.hari;
				document.getElementById('tglmulaisuketsakit').value = tgl_mulai;
				document.getElementById('tglakhirsuketsakit').value = tgl_akhir;
				document.getElementById('diagsuketsakit').value = x.diagnosa;
				document.getElementById('ketsuketsakit').value = x.keterangan;

				document.getElementById('tglsuketsakit').value = tgl_surat;
				document.getElementById('doktersuketsakit').value = x.dokter;

				// var ttdnya = new WPaintX('paint_ttdSuratsakit');
				// var ttdSuratsakit = new WPaintX('paint_ttdSuratsakit');

				var img = document.getElementById('ImgTtdSuratsakit');
				img.src = ttdnya;

				//document.getElementById('ImgTtdSuratsakit').src = ttdnya.getData();

			}else{
				toastr.error("Belum ada Surat Sakit");
			}

		})
	}

	function cetaksuketsakit(transaksi) {
		var param = {
			id_transaksi: document.getElementById('transaksiermirna').value,
		};
		newTabPOST('API/Laporan/cetak_suratsakit', param);
		return;
	}

	function viewtandavitalmedisirja() {
		var param = {
			id_kunjungan: document.getElementById('idKunjunganermirna').value,
		};

		apiPOST('Rekammedisirna/viewtandavitalirja', param, hasil => {
			var x = hasil['data'];

			document.getElementById('tek_darah').value = x.tekanan_darah1 + '/' + x.tekanan_darah2;
			document.getElementById('berat_badan').value = x.bb;
			document.getElementById('tinggi_badan').value = x.tinggi_badan;

		})
	}

	function ShowModalTtdDpjpSuratsakit() {
		showttdSuratsakit();
		$('#ModalTtdSuratsakit').modal('show');
	}

	function showttdSuratsakit() {
		ttdSuratsakit.show();
	}

	function takeTtdDpjpSuratsakit() {
		document.getElementById('ImgTtdSuratsakit').src = ttdSuratsakit.getData();
		document.getElementById('HasilTtdDpjpSuratsakit').value = ttdSuratsakit.getData();
		$('#ModalTtdSuratsakit').modal('hide');

	}
</script>