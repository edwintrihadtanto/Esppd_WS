				<?php
				$data 						= json_decode($_GET['data']);
				$rm 							= str_replace('"','', json_encode($data->rm));
				$unit     				= str_replace('"','', json_encode($data->unit));
				$id_kunjungan     = str_replace('"','', json_encode($data->id_kunjungan));
				$id_transaksi     = str_replace('"','', json_encode($data->id_transaksi));
				?>
				<div class="card">
					<div class="card-header border-0">
						<div class="d-flex justify-content-between">
			
							<a href="javascript:void(0);">View Report</a>
						</div>
					</div>
					<div class="card-body">

						<div class="position-relative mb-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
						<canvas id="visitors-chart" height="200" width="316" style="display: block; width: 316px; height: 200px;" class="chartjs-render-monitor"></canvas>
					</div>
					<div class="d-flex flex-row justify-content-end">
						<span class="mr-2">
							<i class="fas fa-square text-primary"></i> Berat Badan
						</span>
						<span>
							<i class="fas fa-square text-gray"></i> Tinggi Badan
						</span>
						<span>
							<i class="fas fa-square text-green"></i> Lingkar Kepala
						</span>
						<span>
							<i class="fas fa-square text-yellow"></i> Lingkar Lengan
						</span>
					</div>
				</div>
			</div>
			<script type="text/javascript">

				var ticksStyle = {
					fontColor: '#495057',
					fontStyle: 'bold'
				}
				var arrBB=[];
				var arrTinggi=[];
				var arrUmur=[];

				var mode = 'index'
				var intersect = true

				var $visitorsChart = $('#visitors-chart');
				showchart();
        // eslint-disable-next-line no-unused-vars
					function showchart() {
						arrTinggi=[];
						arrLk=[];
						arrLl=[];
						arrBB   =[];
						arrUmur =[];
						param={no_rm		:document.getElementById("rmermirna").value,};
						apiPOST('Rekammedisirna/growthchart', param,hasil=>{
							var arrData=hasil['data'];
							arrData.forEach((data)=>{
								arrBB.push(data['bb']);
								arrTinggi.push(data['tb']);
								arrLk.push(data['lk']);
								arrLl.push(data['ll']);
								arrUmur.push(data['umur']);

							});
								var visitorsChart = new Chart($visitorsChart, {
					data: {
						labels: arrUmur,
						datasets: [{
							type: 'line',
							data: arrTinggi,
							backgroundColor: 'transparent',
							borderColor: '#007bff',
							pointBorderColor: '#007bff',
							pointBackgroundColor: '#007bff',
							fill: false
        // pointHoverBackgroundColor: '#007bff',
        // pointHoverBorderColor    : '#007bff'
						},
						{
							type: 'line',
							data: arrBB,
							backgroundColor: 'tansparent',
							borderColor: '#ced4da',
							pointBorderColor: '#ced4da',
							pointBackgroundColor: '#ced4da',
							fill: false
        // pointHoverBackgroundColor: '#ced4da',
        // pointHoverBorderColor    : '#ced4da'
						},
						{
							type: 'line',
							data: arrLk,
							backgroundColor: 'tansparent',
							borderColor: '#21BC2E',
							pointBorderColor: '#21BC2E',
							pointBackgroundColor: '#21BC2E',
							fill: false
        // pointHoverBackgroundColor: '#ced4da',
        // pointHoverBorderColor    : '#ced4da'
						},
						{
							type: 'line',
							data: arrLl,
							backgroundColor: 'tansparent',
							borderColor: '#E9F615',
							pointBorderColor: '#E9F615',
							pointBackgroundColor: '#E9F615',
							fill: false
        // pointHoverBackgroundColor: '#ced4da',
        // pointHoverBorderColor    : '#ced4da'
						}]
					},
					options: {
						maintainAspectRatio: false,
						tooltips: {
							mode: mode,
							intersect: intersect
						},
						hover: {
							mode: mode,
							intersect: intersect
						},
						legend: {
							display: false
						},
						scales: {
							yAxes: [{
        // display: false,
								gridLines: {
									display: true,
									lineWidth: '4px',
									color: 'rgba(0, 0, 0, .2)',
									zeroLineColor: 'transparent'
								},
								ticks: $.extend({
									beginAtZero: true,
									suggestedMax: 200
								}, ticksStyle)
							}],
							xAxes: [{
								display: true,
								gridLines: {
									display: false
								},
								ticks: ticksStyle
							}]
						}
					}
				})
						});


					}
			
			</script>