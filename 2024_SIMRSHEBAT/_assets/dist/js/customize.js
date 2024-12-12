$(document).on('select2:open', () => {
	document.querySelector('.select2-search__field').focus();
});
var $sidebar = $('.control-sidebar')
var $container = $('<div />', {
			class: 'p-2 control-sidebar-content'
		})

var user = JSON.parse(localStorage['data_user']);
var id_user = user['id_user'];
var param = {
	iduser: id_user,
};
apiPOST('Laporan/ceklaporan', param, hasil => {
	var adakah = hasil['data'];
	if (adakah == 't' || adakah == true) {
		// alert('punya');
		
		$sidebar.append($container)
		var $dark_mode_container = '<button role="button" id="theme_toggle"></button>';
		$container.append($dark_mode_container);
		$('#theme_toggle').on('click', function () {
			if ($('body').hasClass('dark-mode')) {
				toast("Mode Terang Aktif", "success");
				$(this).addClass('darkcss');
				$(this).removeClass('lightcss');
				$('body').toggleClass('dark-mode');
				$('.sidebarx').removeClass('sidebar-dark-success');
				$('.sidebarx').addClass('sidebar-light-success');
				$('.report').removeClass('control-sidebar-dark');
				$('.report').addClass('control-sidebar-light');
				localStorage.setItem("mode", "light-theme");
			} else {
				toast("Mode Gelap Aktif", "success");
				$(this).addClass('lightcss');
				$(this).removeClass('darkcss');
				$('body').addClass('dark-mode');
				$('.sidebarx').addClass('sidebar-dark-success');
				$('.sidebarx').removeClass('sidebar-light-success');
				$('.report').removeClass('control-sidebar-light');
				$('.report').addClass('control-sidebar-dark');
				localStorage.setItem("mode", "dark-theme");
			}
			//$('[data-widget="pushmenu"]').PushMenu('collapse');
			//$('.report').PushMenu('autoCollapseSize');
			$('#toggle-button').ControlSidebar('toggle')
		})
		if (!localStorage.getItem("mode")) {
			if (window.matchMedia("(prefers-color-scheme: dark)").matches) {
				localStorage.setItem("mode", "dark-theme");
			} else {
				localStorage.setItem("mode", "light-theme");
			}
		}

		if (localStorage.getItem("mode") == "dark-theme") {
			$('#theme_toggle').addClass('lightcss');
			$('#theme_toggle').removeClass('darkcss');
			$('body').addClass('dark-mode');
			$('.sidebarx').addClass('sidebar-dark-success');
			$('.sidebarx').removeClass('sidebar-light-success');
			$('.report').removeClass('control-sidebar-light');
			$('.report').addClass('control-sidebar-dark');
			document.getElementById("theme_toggle").checked = true;
		} else {
			$('#theme_toggle').addClass('darkcss');
			$('#theme_toggle').removeClass('lightcss');
			$('body').removeClass('dark-mode');
			$('.sidebarx').removeClass('sidebar-dark-success');
			$('.sidebarx').addClass('sidebar-light-success');
			$('.report').removeClass('control-sidebar-dark');
			$('.report').addClass('control-sidebar-light');
			document.getElementById("theme_toggle").checked = false;
		};

		$container.append(
			'<h6 style="text-align: center;">Daftar Laporan</h6><hr class="mb-2" style="background-color:white;" />'
		)
		var html = '';
		html += '<div id="tempatLaporan">';
		// html += '<div class="p-1">';
		// html += '<button class="btn btn-sm btn-outline-warning" onclick="IGDlap_pendapatan()" style="width:100%; text-align:left;"><i class="fas fa-file"></i> Lap. Penerimaan Pasien</button>';
		// html += '</div>';
		// html += '<div class="p-1">';
		// html += '<button class="btn btn-sm btn-outline-success" onclick="lap_pendapatan_componen()" style="width:100%; text-align:left;"><i class="fas fa-file"></i> Lap. Penerimaan Per Component</button>';
		// html += '</div>';
		// html += '<div class="p-1">';
		// html += '<button class="btn btn-sm btn-outline-warning" onclick="lap_jasa_dokter()" style="width:100%; text-align:left;"><i class="fas fa-file"></i> Lap. Jasa Dokter</button>';
		// html += '</div>';
		// html += '<div class="p-1">';
		// html += '<button class="btn btn-sm btn-outline-success" onclick="IGDlap_kunj()" style="width:100%; text-align:left;"><i class="fas fa-file"></i> Lap. Kunjungan Igd</button>';
		// html += '</div>';
		// html += '<div class="p-1">';
		// html += '<button class="btn btn-sm btn-outline-warning" onclick="RAJALlap_kunj()" style="width:100%; text-align:left;"><i class="fas fa-file"></i> Lap. Kunjungan Rawat Jalan</button>';
		// html += '</div>';
		// html += '<div class="p-1">';
		// html += '<button class="btn btn-sm btn-outline-success" onclick="RANAPlap_kunj()" style="width:100%; text-align:left;"><i class="fas fa-file"></i> Lap. Kunjungan Rawat Inap</button>';
		// html += '</div>';
		// html += '<div class="p-1">';
		// html += '<button class="btn btn-sm btn-outline-warning" onclick="IGDlap_sumpasien()" style="width:100%; text-align:left;"><i class="fas fa-file"></i> Lap. Summary Pasien</button>';
		// html += '</div>';
		// html += '<div class="p-1">';
		// html += '<button class="btn btn-sm btn-outline-success" onclick="IGDlap_penpasien()" style="width:100%; text-align:left;"><i class="fas fa-file"></i> Lap. Pendapatan</button>';
		// html += '</div>';
		// html += '<div class="p-1">';
		// html += '<button class="btn btn-sm btn-outline-warning" onclick="APTlap_stokexp()" style="width:100%; text-align:left;"><i class="fas fa-file"></i> Lap. Kersediaan Stok Obat</button>';
		// html += '</div>';
		// html += '<div class="p-1">';
		// html += '<button class="btn btn-sm btn-outline-success" onclick="APTlap_stokobatperunit()" style="width:100%; text-align:left;"><i class="fas fa-file"></i> Lap. Stok Obat Per Depo</button>';
		// html += '</div>';
		// html += '<div class="p-1">';
		// html += '<button class="btn btn-sm btn-outline-warning" onclick="APTlap_penjualanobatperunit()" style="width:100%; text-align:left;"><i class="fas fa-file"></i> Lap. Penj. Resep Obat Per Unit</button>';
		// html += '</div></div>';
		html += '</div>';
		$container.append(html);

	} else {
		$sidebar.append($container)
		var $dark_mode_container = '<button role="button" id="theme_toggle"></button>';
		$container.append($dark_mode_container);
		$('#theme_toggle').on('click', function () {
			if ($('body').hasClass('dark-mode')) {
				toast("Mode Terang Aktif", "success");
				$(this).addClass('darkcss');
				$(this).removeClass('lightcss');
				$('body').toggleClass('dark-mode');
				$('.sidebarx').removeClass('sidebar-dark-success');
				$('.sidebarx').addClass('sidebar-light-success');
				$('.report').removeClass('control-sidebar-dark');
				$('.report').addClass('control-sidebar-light');
				localStorage.setItem("mode", "light-theme");
			} else {
				toast("Mode Gelap Aktif", "success");
				$(this).addClass('lightcss');
				$(this).removeClass('darkcss');
				$('body').addClass('dark-mode');
				$('.sidebarx').addClass('sidebar-dark-success');
				$('.sidebarx').removeClass('sidebar-light-success');
				$('.report').removeClass('control-sidebar-light');
				$('.report').addClass('control-sidebar-dark');
				localStorage.setItem("mode", "dark-theme");
			}
			//$('[data-widget="pushmenu"]').PushMenu('collapse');
			//$('.report').PushMenu('autoCollapseSize');
			$('#toggle-button').ControlSidebar('toggle')
		})
		if (!localStorage.getItem("mode")) {
			if (window.matchMedia("(prefers-color-scheme: dark)").matches) {
				localStorage.setItem("mode", "dark-theme");
			} else {
				localStorage.setItem("mode", "light-theme");
			}
		}

		if (localStorage.getItem("mode") == "dark-theme") {
			$('#theme_toggle').addClass('lightcss');
			$('#theme_toggle').removeClass('darkcss');
			$('body').addClass('dark-mode');
			$('.sidebarx').addClass('sidebar-dark-success');
			$('.sidebarx').removeClass('sidebar-light-success');
			$('.report').removeClass('control-sidebar-light');
			$('.report').addClass('control-sidebar-dark');
			document.getElementById("theme_toggle").checked = true;
		} else {
			$('#theme_toggle').addClass('darkcss');
			$('#theme_toggle').removeClass('lightcss');
			$('body').removeClass('dark-mode');
			$('.sidebarx').removeClass('sidebar-dark-success');
			$('.sidebarx').addClass('sidebar-light-success');
			$('.report').removeClass('control-sidebar-dark');
			$('.report').addClass('control-sidebar-light');
			document.getElementById("theme_toggle").checked = false;
		};

		$container.append(
			'<h6 style="text-align: center;">Daftar Laporan</h6><hr class="mb-2" style="background-color:white;" />'
		)
		var html = '';
		html += '<div id="tempatLaporan">';
		html += '</div>';
		$container.append(html);
		// alert('tidak punya');
	}
        getLaporan();
})



function showModalLaporan(alamat) {
	$('#toggle-button').ControlSidebar('toggle');
	$('.Allmodal_laporan').load(alamat);
}

function lap_pendapatan_componen() {
	$('#toggle-button').ControlSidebar('toggle');
	$('.Allmodal_laporan').load('Laporan/lap_penerimaan_percomponen');
}

function lap_jasa_dokter() {
	$('#toggle-button').ControlSidebar('toggle');
	$('.Allmodal_laporan').load('Laporan/lap_jasa_dokter');
}

function IGDlap_penpasien() {
	$('#toggle-button').ControlSidebar('toggle');
	$('.Allmodal_laporan').load('Laporan/IGDlap_penpasien');
}

function IGDlap_kunj() {
	$('#toggle-button').ControlSidebar('toggle');
	$('.Allmodal_laporan').load('Laporan/IGDlap_kunj');
}
function RAJALlap_kunj() {
	$('#toggle-button').ControlSidebar('toggle');
	$('.Allmodal_laporan').load('Laporan/RAJALlap_kunj');
}
function RANAPlap_kunj() {
	$('#toggle-button').ControlSidebar('toggle');
	$('.Allmodal_laporan').load('Laporan/RANAPlap_kunj');
}

function IGDlap_sumpasien() {
	$('#toggle-button').ControlSidebar('toggle');
	$('.Allmodal_laporan').load('Laporan/IGDlap_sumpasien');
}

function IGDlap_pendapatan() {
	$('#toggle-button').ControlSidebar('toggle');
	$('.Allmodal_laporan').load('Laporan/IGDlap_pendapatan');
}

function APTlap_stokexp() {
	$('#toggle-button').ControlSidebar('toggle');
	$('.Allmodal_laporan').load('Laporan/APTlap_stokexp');
}

function APTlap_stokobatperunit() {
	$('#toggle-button').ControlSidebar('toggle');
	$('.Allmodal_laporan').load('Laporan/APTlap_stok_obat');
}

function APTlap_penjualanobatperunit() {
	$('#toggle-button').ControlSidebar('toggle');
	$('.Allmodal_laporan').load('Laporan/APTlap_penj_resepobat');
}

function APTlap_kartu_stokdet() {
	$('#toggle-button').ControlSidebar('toggle');
	$('.Allmodal_laporan').load('Laporan/APTlap_kartu_stokdet');
}