<?php

//var_dump($data);
//foreach ($data as $row) {
// echo $row['noSep'];
//}
foreach ($data as $row)
	// var_dump($data);
	// //echo $row['response']['sep']['noSep'];
	// exit();
	if ($row['metaData']['code'] <> '200') {
		$x = '';
		echo "
		<div class='content modal fade' id='modalsepinap' style='margin-left: 180px;'>
	<div class='container-fluid'>
		<div class='row' style='margin-top:-40px'>
			<div class='col-md-10' style='margin-top: 20px;margin-bottom: 0px;'>
				<div class='modal-dialog modal-lg'>
					<div class='modal-content'>
						<div class='modal-body'>
							<div class='row'>
								<div class='col-md-12' style='margin-top: 0px;margin-bottom: 0px;'>
									<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
										<span aria-hidden='true'>×</span>
									</button>

									<div class='card card-outline card-danger col-md-12'>
										<div class='overlay-wrapper' id='modalsepload'>
											<div class='overlay'>
												<i class='fas fa-3x fa-sync-alt fa-spin'></i>
											</div>
										</div>
										<div style='max-height: 12rem; overflow: auto;'>
											BPJS Response : " . $row['metaData']['code'] . " - " .
			$row['metaData']['message'] . "
											Silahkan ulangi lagi dengan benar
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
</div>
";
	} else {


		// var_dump($data);
		// exit;

?>
	<div class="content modal fade" id="modalsepinap" style="margin-left: 180px;">

		<div class="container-fluid ">
			<div class="row" style="margin-top:-40px">
				<!-- content kanan -->
				<div class="col-md-10" style="margin-top: 20px;margin-bottom: 0px;">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-body">
								<!-- detail transaksi -->
								<div class="row">
									<div class="col-md-12" style="margin-top: 0px;margin-bottom: 0px;">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>

										<div class="card card-outline card-danger col-md-12">
											<div class="overlay-wrapper" id="modalsepload">
												<div class="overlay">
													<i class="fas fa-3x fa-sync-alt fa-spin"></i>
												</div>
											</div>
											<div style="max-height: 12rem; overflow: auto;">
												<!-- <table class="table table-bordered table-hover table-sm" id='tablehistory_lokup_produk'>
                        <thead>
                          <tr>
                            <th style="width:10px;">No Asuransi </th>
                            <th style="width:25px;">Nama</th>
                            <th style="width:25px;">Hak kelas</th>
                            <th style="width:25px;">Jenis Peserta</th>
                            <th style="width:25px;">DPJP</th>
                            <th style="width:25px;">Pelayanan</th>
                            <th style="width:25px;">Poli</th>
                            <th style="width:25px;">No SEP Rajal</th>
                            <th style="width:25px;">Tgl Sep Rajal</th>
                          </tr>
                        </thead>
                        <tbody id='listlookup_produk'>
                        <td><?php  //echo $row['peserta']['noKartu']; 
							?></td>
                        <td><?php  //echo $row['peserta']['nama']; 
							?></td>
                        <td><?php  //echo //$row['peserta']['hakKelas']; 
							?></td>
                        <td><?php  //echo //$row['peserta']['jnsPeserta']; 
							?></td>
                        <td><?php  //echo //$row['dpjp']['nmDPJP']; 
							?></td>
                        <td><?php  //echo //$row['jnsPelayanan']; 
							?></td>
                        <td><?php  //echo //$row['poli']; 
							?></td>
                          <td><?php  //echo //$row['noSep']; 
								?></td>
                          <td><?php  //echo //$row['tglSep']; 
								?></td>


                        </tbody>
                      </table> -->
												<?php
					echo "<button class='btn-primary pull-right' onclick=CetakSepIrna('" . $row['response']['sep']['noSep'] . "')><i class='fas fa-print'></i></button>";
												$x = $row['response']['sep']['noSep'];
												$html = '
                    <table>
                        <tr>
                          <td><img src="' . base_url('_assets/dist/img/bpjs.jpg') . '" height="30"></td>
                         <td>&nbsp;&nbsp;&nbsp;</td>
                          <td align="center">SURAT ELEGIBILITAS PESERTA<br>RSU DARMAYU</td>
                        </tr>
                      </table>
                      <table background="white" cellspacing="0" border="0" style="font-color:#000000;font-size: 9px;font-family:  Calibri; margin: 0px 10px;line-height:90%;letter-spacing: 1px;font-stretch: condensed;">
				<tr style="height: 5px;">
					<td width="100">No. SEP</td>
					<td width="6">:</td>
					<td width="300" style="font-size:12px;"><b>' .  $row['response']['sep']['noSep'] . '</b></td>
					<td width="26">&nbsp;</td>
					<td width="100">No. Mr</td>
					<td width="8">:</td>
					<td width="100">' . $row['response']['sep']['peserta']['noMr'] . '</td>
				</tr>
				<tr>
					<td width="100">Tgl. SEP</td>
					<td width="6">:</td>
					<td>' . $row['response']['sep']['tglSep'] . '</td>
					<td width="26"></td>
					<td></td>
					<td width="8"></td>
					<td></td>
				</tr>
				<tr>
					<td width="100">No. Kartu</td>
					<td width="6">:</td>
					<td style="font-size:12px;"><b>' . $row['response']['sep']['peserta']['noKartu'] . '</b></td>
					<td width="26">&nbsp;</td>
					<td>Peserta</td>
					<td width="8">:</td>
					<td rowspan="2" valign="top">' . $row['response']['sep']['peserta']['jnsPeserta'] . '</td>
				</tr>
				<tr>
					<td width="100">Nama Peserta</td>
					<td width="6">:</td>
					<td>' . $row['response']['sep']['peserta']['nama'] . '</td>
				</tr>
				<tr>
					<td width="100">Tgl. Lahir</td>
					<td width="6">:</td>
					<td>' .  $row['response']['sep']['peserta']['tglLahir'] . ' Kelamin : ' .  $row['response']['sep']['peserta']['kelamin'] . '</td>
					<td width="26"></td>
					<td>COB</td>
					<td width="8">:</td>
					<td></td>
				</tr>
				<tr>
					<td width="100">No Telepon</td>
					<td width="6">:</td>
					<td>-</td>
					<td width="26">&nbsp;</td>
					<td>Jns. Rawat</td>
					<td width="8">:</td>
					<td>' .  $row['response']["sep"]['jnsPelayanan'] . '</td>
					
				</tr>
				<tr>
					<td width="100">Poli Tujuan</td>
					<td width="6">:</td>
					<td>' .  $row['response']['sep']['poli'] . '</td>
					<td width="26">&nbsp;</td>
					<td>Kls. Rawat</td>
					<td width="8">:</td>
					<td>' . $row['response']['sep']['peserta']['hakKelas'] . '</td>
				</tr>
				<tr>
					<td width="100">Asal Faskes Tk. 1</td>
					<td width="6">:</td>
					<td></td>
					<td width="26">&nbsp;</td>
					<td>Operator</td>
					<td width="8">:</td>
					<td>Admisi</td>
				</tr>
				<tr>
					<td width="100">Diagnosa Awal</td>
					<td width="6">:</td>
					<td>' . substr($row["response"]["sep"]["diagnosa"], 0, 50) . '</td>
					<td width="26">&nbsp;</td>
					<td></td>
					<td width="8"></td>
					<td></td>
					
				</tr>
				<tr>
					<td width="100">Catatan</td>
					<td width="6">:</td>
					<td>' . $row["response"]["sep"]["catatan"] . '</td>
					<td width="26">&nbsp;</td>
					<td align="center"></td>
					<td colspan="2"  align="center"></td>					
				</tr>
				<tr>
					<td width="100">Kode Panggilan</td>
					<td width="6">:</td>
					<td style="font-size:12px;"><b></b></td>
					<td width="26">&nbsp;</td>
					<td align="center"></td>
					<td colspan="2"  align="center">Pasien / Keluarga Pasien</td>					
				</tr>
				 <tr>
					<td colspan="3";><font style="font-weight:bold;font-size: 7px;font-family: Arial;"><i>*Saya Menyetujui BPJS Kesehatan menggunakan informasi Medis Pasien jika diperlukan</i></td>
					<td width="26"></td>
					<td>&nbsp;</td>
					<td width="8"></td>
					<td>&nbsp;</td>
				</tr>
				<tr>
				   <td colspan="3";><font style="font-weight:bold;font-size: 7px;font-family:Arial;"><i>*SEP bukan sebagai bukti penjamin peserta</td>
				   <td></td>
				  <td>&nbsp;</td>
				   <td></td>
				   <td>&nbsp;</td>
				</tr>
				<tr>
				  <td colspan="3";>&nbsp;</td>
				  <td></td>
				  <td>&nbsp;</td>
				  <td></td>
				  <td>&nbsp;</td>
				</tr>
				<tr>
					<td colspan="3";>Cetakan Ke 1 : ' . gmdate("d-M-Y H:i:s", time() + 60 * 61 * 7) . '</td>
					<td width="26"></td>
					<td  align="left" width="100"></td>
					<td colspan="2" align="center"><hr width="100"></td>
				</tr> 
				</table>';
												echo "$html";
												?>

											</div>
											<div>

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
	</div>
<?php
	}
?>
<!-- //menu kiri -->


<script type="text/javascript">
	$(document).ready(function() {

	});

	$("#modalsepinap").modal({
		backdrop: "static"
	});
	$('#modalsepinap').on('shown.bs.modal', function() {

	})


	function refresh_pendft_rwi_sep() {
		$('#modalsepload').hide();
		var coderes = "<?php echo $row['metaData']['code'] ?>";
		//console.log(coderes);
		if (coderes == 200 || coderes == '200') {
			var sep = "<?php echo $x ?>";
			// document.getElementById('no_sjp').innerHTML = sep;
			document.getElementById('no_sjp').value = sep;
			//console.log('ini'+sep);
		}
	}
	setTimeout(refresh_pendft_rwi_sep, 1000);
</script>