<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->view('/login', 'login');

//API
$routes->post('/API/user/(:any)', 'User::$1');
$routes->post('/API/Rawatjalan/(:any)', 'Rawatjalan::$1');
$routes->post('/API/Rekammedisirna/(:any)', 'Rekammedisirna::$1');
$routes->post('/API/Data_Sosial/(:any)', 'Datasosial::$1');
$routes->post('/API/Gawat_Darurat/(:any)', 'Gawatdarurat::$1');
$routes->post('/API/Kunjungan/(:any)', 'Kunjungan::$1');
$routes->post('/API/Pasien/(:any)', 'Pasien::$1');
$routes->post('/API/Rawat_inap/(:any)', 'Rawatinap::$1');
$routes->post('/API/Bridging/(:any)', 'Bridging::$1');
$routes->post('/API/Rekammedisirja/(:any)', 'Rekammedisirja::$1');
$routes->post('/API/Ermkeperawatanirja/(:any)', 'Ermkeperawatanirja::$1');
$routes->post('/API/Apotek/(:any)', 'Apotek::$1');
$routes->post('/API/Radiologi/(:any)', 'Radiologi::$1');
$routes->post('/API/Transaksi/(:any)', 'Transaksi::$1');
$routes->post('/API/Cetak/(:any)', 'Cetak::$1');
$routes->post('/API/Setup/(:any)', 'Setup::$1');
$routes->post('/API/Setup_RS/(:any)', 'Setup_RS::$1');
$routes->post('/API/Lab/(:any)', 'Lab::$1');
$routes->post('/API/Kasirgeneral/(:any)', 'Kasirgeneral::$1');
$routes->post('/API/List_erm_irna/(:any)', 'List_erm_irna::$1');
$routes->post('/API/Rekammedisigd/(:any)', 'Rekammedisigd::$1');
$routes->post('/API/Heamodialisa/(:any)', 'Heamodialisa::$1');
$routes->post('/API/Keuangan/(:any)', 'Keuangan::$1');
$routes->post('/API/Laporan/(:any)', 'Laporan::$1');
$routes->post('/API/Gudang/(:any)', 'Gudang::$1');
$routes->post('/API/Logistik/(:any)', 'Logistik::$1');
$routes->post('/API/Gizi/(:any)', 'Gizi::$1');
$routes->post('/API/Kamaroperasi/(:any)', 'Kamaroperasi::$1');
$routes->post('/API/Antrian/(:any)', 'Antrian::$1');
$routes->post('/API/Aset/(:any)', 'Aset::$1');
$routes->post('/API/Historykunjungan/(:any)', 'Historykunjungan::$1');
$routes->post('/API/Assesmen_RS/(:any)', 'Assesmen_RS::$1');
$routes->post('/API/Laporan_RL/(:any)', 'Laporan_RL::$1');
$routes->post('/API/Esr/(:any)', 'Esr::$1');
$routes->post('/API/Booking/(:any)', 'Booking::$1');
$routes->post('/API/Setup_Link/(:any)', 'Setup_Link::$1');
$routes->post('/API/Assesmentbos/(:any)', 'Assesmentbos::$1');
$routes->post('/API/RR/(:any)', 'RR::$1');
$routes->post('/API/Ambulance/(:any)', 'Ambulance::$1');
$routes->post('/API/Notif/(:any)', 'Notif::$1');
$routes->post('/API/Eklaim/(:any)', 'Eklaim::$1');
$routes->post('Eklaim/(:any)', 'Eklaim::$1');
$routes->post('/API/Mobilejkn/(:any)', 'Mobilejkn::$1');


//RawatIGD
$routes->view('pendIGD', 'view/rawatigd/pendaftaranIGD');
$routes->view('pentjasaIGD', 'view/rawatigd/penatajasaIGD');
$routes->view('kasirIGD', 'view/rawatigd/kasirIGD');

//RawatJalan
$routes->view('pendRWJ', 'view/rawatjalan/pendaftaranRWJ');
$routes->view('pentjasaRWJ', 'view/rawatjalan/penatajasaRWJ_baru');
$routes->view('kasirRWJ', 'view/rawatjalan/kasirRWJ');
$routes->view('ermRWJ', 'view/rawatjalan/ermRWJ');

//RawatInap
$routes->view('pendRWI', 'view/rawatinap/pendaftaranRWI');
$routes->view('pentjasaRWI', 'view/rawatinap/penatajasaRWI');
$routes->view('kasirRWI', 'view/rawatinap/kasirRWI');
$routes->view('InformasiRWI', 'view/rawatinap/informasiRWI');

$routes->view('general_consent', 'view/rawatinap/general_consent');

$routes->view('GantiShiftRWI', 'view/rawatinap/gantiShift');


//Radiologi
$routes->view('pendRad', 'view/radiologi/pendaftaranRad');
$routes->view('hasilRad', 'view/radiologi/hasilRad');

//Laboratorium
$routes->view('pendLab', 'view/laboratorium/pendaftaranLab');
$routes->view('hasilLab', 'view/laboratorium/hasilLab');

//Heamodialisa
$routes->view('pendHD', 'view/hemodialisa/pendaftaranHD');
$routes->view('pentjasaHD', 'view/hemodialisa/penatajasaHD');

//APOTEK
$routes->view('eresepRjRiIGD', 'view/apotek/eresepRjRiIGD');
//$routes->view('eresepRWJ', 'view/apotek/eresepRWJ');
$routes->view('listeresepRjRiIGD', 'view/apotek/listeresepRjRiIGD');
$routes->view('resepRWJ', 'view/apotek/resepRWJ');
$routes->view('resepRWI', 'view/apotek/resepRWI');
//$routes->view('eresepRWI', 'view/apotek/eresepRWI');
$routes->view('returresepRWJ', 'view/apotek/returresepRWJIGD');
$routes->view('returresepRWI', 'view/apotek/returresepRWI');
$routes->view('rwytpemberianobat', 'view/apotek/rwytpemberianobat');

//GUDANG
$routes->view('gudangFarmasiPenerimaan', 'view/gudang/gudang_penerimaanbarang');
$routes->view('gudangFarmasiPengeluaran', 'view/gudang/gudang_pengeluaran_unit');
$routes->view('gudangFarmasiReturPenerimaan', 'view/gudang/gudang_retur_penerimaan');
$routes->view('gudangFarmasiInfoStok', 'view/gudang/gudang_informasi_stok');
$routes->view('gudangFarmasiStokOpname', 'view/gudang/gudang_stok_opname');
$routes->view('gudangFarmasiPermintaanUnit', 'view/gudang/gudang_permintaanunit');

//ERM
$routes->view('asuhanperioperatif', 'view/rekammedis_irna/Asuhan_Perioperatif');
$routes->view('dischangeirna', 'view/rekammedis_irna/Dischange_RI_Plan');
$routes->view('serahterima', 'view/rekammedis_irna/Serah_terima');
$routes->view('serahterimaigd', 'view/rekammedis_igd/Serah_terima_igd');
$routes->view('serahterimairja', 'view/rekammedis/Serah_terima_irja');
$routes->view('terimapasien', 'view/rekammedis_irna/terima_pasien');
$routes->view('listpasienermirna', 'view/rekammedis_irna/List_Pasien_Irna');

$routes->view('efeksampingobatirna', 'view/rekammedis_irna/Efek_Samping_Obat');
$routes->view('erekammedisRWJ', 'view/rekammedis/rekammedisRWJ');
$routes->view('erekamkeperawatanRWJ', 'view/rekammedis/rekamkeperawatanRWJ');
$routes->view('assesmenkeperawatanigd', 'view/rekammedis_igd/assesmen_keperawatan_igd');
$routes->view('assesmenmedisigd', 'view/rekammedis_igd/assesmen_medis_igd');
$routes->view('erekamhistory', 'view/rekammedis/erekamhistory');
$routes->view('suratlahir', 'view/rekammedis_irna/surat_kelahiran');
$routes->view('pemberianinfotindakanmedis', 'view/rekammedis_irna/pemberian_informasi_tindakan_medis');
$routes->view('suratkematian', 'view/rekammedis_irna/surat_kematian');
$routes->view('suratsehat', 'view/rekammedis_irna/surat_sehat');
$routes->view('suratsakit', 'view/rekammedis_irna/surat_sakit');
$routes->view('assesmenAnak', 'view/rekammedis_irna/AssesmenAnak');
$routes->view('assesmenGizi', 'view/rekammedis_irna/AssesmenGizi');
$routes->view('RencanaPembedahan', 'view/rekammedis/rencanaPembedahan');
$routes->view('assesmentObgyn', 'view/rekammedis_irna/assesmentObgyn');
$routes->view('assesmentNeonatus', 'view/rekammedis_irna/assesmentNeonatus');
$routes->view('obsevasiirna', 'view/rekammedis_irna/Observasi');


//Setup
$routes->view('SetupUnit', 'view/setup/unit');
$routes->view('SetupMappingSigna', 'view/setup/mappingsigna');
$routes->view('SetupProduk', 'view/setup/produk');
$routes->view('SetupTarifProduk', 'view/setup/tarifproduk');
$routes->view('SetupProdukUnit', 'view/setup/produkunit');
$routes->view('SetupMasterObat', 'view/setup/masterobat');
$routes->view('SetupTarifProdukComponent', 'view/setup/tarifprodukcomponent');
$routes->view('SetupTarifObat', 'view/setup/tarifobat');
$routes->view('SetupDokterUnit', 'view/setup/dokterklinik');
$routes->view('SetupSpesialisasiKamar', 'view/setup/setupspesialisasikamar');
$routes->view('SetupTemplateResep', 'view/setup/setuptemplateresep');
$routes->view('SetupUserModFar', 'view/setup/usermodfar');
$routes->view('SetupTarifObatCust', 'view/setup/tarifobatcust');
$routes->view('SetupIndikatorHasil', 'view/setup/indikatorhasil');
$routes->view('SetupMapProdukIndikatorLIS', 'view/setup/mappingindilis');
$routes->view('SetupMapProdukIndikatorHasil', 'view/setup/mappingindikator');
$routes->view('SetupMappingUnitDepo', 'view/setup/setupmappingunitdepo');
$routes->view('supplierLogistik', 'view/setup/supplierLogistik');
$routes->view('setupBarangLogistik', 'view/setup/setupBarangLogistik');
$routes->view('setupCoa', 'view/setup/setupCoa');
$routes->view('setupJenisAnestesiOK', 'view/setup/setupJenisAnestesiOK');
$routes->view('setupKlasifikasiBedahOK', 'view/setup/setupKlasifikasiBedahOK');
$routes->view('setupKamarBedahOK', 'view/setup/setupKamarBedahOK');
$routes->view('setupJenisMakananOK', 'view/setup/setupJenisMakananGizi');
$routes->view('setupjenisDietGizi', 'view/setup/setupjenisdietGizi');
$routes->view('setupPasien', 'view/setup/pasien');
$routes->view('Setupbedkamar', 'view/setup/kamarbed');
$routes->view('SetupCopytarif', 'view/setup/copytarif');
// $routes->view('SetupCopytarif', 'view/setup/copytarif');
$routes->view('jadwalDokter', 'view/setup/jadwalDokter');
$routes->view('setupacc', 'view/setup/accgudang');
$routes->view('setupbhpproduk', 'view/setup/setupbhpproduk');
$routes->view('setupsopirAmbulance', 'view/setup/setupSopirAmbulance');
$routes->view('setupjenisAmbulance', 'view/setup/setupJenisAmbulance');
$routes->view('Setupcopytarifnew', 'view/setup/copytarifnew');



//modal
// $routes->view('mod_RWIkasir', 'view/modal/mod_RWIkasir');
// $routes->view('mod_RWJkasir', 'view/modal/mod_RWJkasir');
// $routes->view('mod_RWJBayarkasir', 'view/modal/mod_RWJBayarkasir');
// $routes->view('mod_IGDkasir', 'view/modal/mod_IGDkasir');
// $routes->view('mod_IGDBayarkasir', 'view/modal/mod_IGDBayarkasir');
// $routes->view('mod_RWIPenatajasa', 'view/modal/mod_RWIPenatajasa');
// $routes->view('mod_RWJPenatajasa', 'view/modal/mod_RWJPenatajasa');
// $routes->view('mod_IGDPenatajasa', 'view/modal/mod_IGDPenatajasa');
// $routes->view('mod_PembayaranRWIkasir', 'view/modal/mod_PembayaranRWIkasir');
// $routes->view('mod_lookup', 'view/modal/mod_lookup');
// $routes->view('mod_lookup', 'view/modal/mod_deposit');

//Booking
$routes->view('bookingPendaftaran', 'view/booking/bookingPendaftaran');


$routes->post('/tes', 'Home::tes');

$routes->get('/Gawatdarurat/(:any)', 'Gawatdarurat::$1');
$routes->get('/Rawatjalan/(:any)', 'Rawatjalan::$1');
$routes->get('/Transaksi/(:any)', 'Transaksi::$1');
$routes->get('/Bridging/(:any)', 'Bridging::$1');
$routes->get('/Rawatinap/(:any)', 'Rawatinap::$1');
$routes->get('/Apotek/(:any)', 'Apotek::$1');
$routes->get('/Laporan/(:any)', 'Laporan::view/$1');
$routes->get('/Cetak/(:any)', 'Cetak::$1');
$routes->get('/Kasirgeneral/(:any)', 'Kasirgeneral::$1');
$routes->get('/Keuangan/(:any)', 'Keuangan::$1');
$routes->get('/Gudang/(:any)', 'Gudang::$1');
$routes->get('/Logistik/(:any)', 'Logistik::$1');
$routes->get('/Gizi/(:any)', 'Gizi::$1');
$routes->get('/Kamaroperasi/(:any)', 'Kamaroperasi::$1');
$routes->get('/Antrian/(:any)', 'Antrian::$1');
$routes->get('/Aset/(:any)', 'Aset::$1');
$routes->get('/Historykunjungan/(:any)', 'Historykunjungan::$1');
$routes->get('/Assesmen_RS/(:any)', 'Assesmen_RS::$1');
$routes->get('/Setup/(:any)', 'Setup::$1');
$routes->get('/Laporan_RL/(:any)', 'Laporan_RL::$1');
$routes->get('/Esr/(:any)', 'Esr::$1');
$routes->get('/Booking/(:any)', 'Booking::$1');
$routes->get('/Setup_Link/(:any)', 'Setup_Link::$1');
$routes->get('/Ermirja/(:any)', 'Rekammedisirja::$1');
$routes->get('/Ermigd/(:any)', 'Rekammedisigd::$1');
$routes->get('/RR/(:any)', 'RR::$1');
$routes->get('/Ambulance/(:any)', 'Ambulance::$1');
$routes->get('/Rekammedisirna/(:any)', 'Rekammedisirna::$1');
$routes->get('/Rekammedisirja/(:any)', 'Rekammedisirja::$1');
$routes->get('/Eklaim/(:any)', 'Eklaim::$1');
$routes->get('/User/(:any)', 'User::$1');
$routes->get('/API/Mobilejkn/(:any)', 'Mobilejkn::$1');

//kasir general
$routes->view('KasirGeneral', 'view/kasirgeneral/kasir');
$routes->view('TutupshiftKasir', 'view/kasirgeneral/tutupshift');
$routes->view('DaftarJurnal', 'view/keuangan/daftarjurnal');

//kasir keuangan
$routes->view('keuanganJurnalUmum', 'view/keuangan/keuanganJurnalUmum');
$routes->view('keuanganAP', 'view/keuangan/keuanganAP');
$routes->view('keuanganAR', 'view/keuangan/keuanganAR');
$routes->view('keuanganTutupBulan', 'view/keuangan/keuanganTutupBulan');
$routes->view('keuanganTutupTahun', 'view/keuangan/keuanganTutupTahun');
$routes->view('keuanganKasBank', 'view/keuangan/keuanganKasBank');
$routes->view('keuanganLabaRugi', 'view/keuangan/keuanganLabaRugi');
$routes->view('keuanganNeraca', 'view/keuangan/keuanganNeraca');
$routes->view('keuanganBukuBesar', 'view/keuangan/keuanganBukuBesar');
$routes->view('keuanganAkseskeu', 'view/keuangan/keuanganAkseskeu');
$routes->view('Eklaim', 'view/eklaim/bpjs');

//Gizi
$routes->view('penerimaanGizi', 'view/gizi/penerimaanGizi');
$routes->view('permintaanGizi', 'view/gizi/permintaanGizi');

//OK
$routes->view('inputJadwalOK', 'view/kamaroperasi/inputJadwalOperasi');
$routes->view('jadwalOK', 'view/kamaroperasi/jadwalOK');
$routes->view('penatajasaOK', 'view/kamaroperasi/penataJasaOK');
$routes->view('inputpembedahan', 'view/rekammedis_irna/input_pembedahan');
$routes->view('checklistkeselamatanop', 'view/rekammedis_irna/checklist_keselamatan_operasi');
$routes->view('instruksipembedahan', 'view/rekammedis_irna/instruksi_pembedahan');
$routes->view('informasianestesi', 'view/rekammedis_irna/informasianestesisedasi');
$routes->view('penatajasaRR', 'view/rr/penatajasaRR');
// ESR
$routes->view('grafikKunjungan', 'view/esr/grafikKunjungan');
$routes->view('penyakitTerbanyak', 'view/esr/penyakitTerbanyak');
$routes->view('periksaperPoli', 'view/esr/periksaperPoli');
$routes->view('pendapatanRs', 'view/esr/pendapatan');
$routes->view('kinerjaperDoktersps', 'view/esr/kinerjaperdokterspesialis');
$routes->view('pasienbarudanLama', 'view/esr/pasienbarudanLama');
$routes->view('pasienbarudanlamaperdokter', 'view/esr/pasienbarudanlamaperdokter');
$routes->view('kunjunganbarudanLama', 'view/esr/kunjunganbarudanLama');
$routes->view('esrlabaRugi', 'view/esr/labarugi');
$routes->view('esrDemografiKunjungan', 'view/esr/esrDemografiKunjungan');
$routes->view('esrRujukanpertahun', 'view/esr/esrRujukanpertahun');
$routes->view('esrExpiredobat', 'view/esr/esrExpiredobat');
$routes->view('esrFastmovingobat', 'view/esr/esrFastmovingobat');
$routes->view('esrRujukanperdokter', 'view/esr/esrRujukanperdokter');

//Logistik
$routes->view('pembelianLogistik', 'view/logistik/pembelianLogistik');
$routes->view('permintaanLogistik', 'view/logistik/permintaanLogistik');
$routes->view('pengirimanLogistik', 'view/logistik/pengirimanLogistik');
$routes->view('pemakaianBarang', 'view/logistik/pemakaianBarang');
$routes->view('returnLogistik', 'view/logistik/returnLogistik');
$routes->view('transferAset', 'view/logistik/transferAset');
$routes->view('penerimaanAset', 'view/logistik/penerimaanAset');
$routes->view('jualAset', 'view/logistik/jualAset');
$routes->view('stokLogistik', 'view/logistik/stokLogistik');

//Webservice yang diakses BPJS
$routes->get('AntrianDarmayu/Token', 'Antrianonline::token');
$routes->post('AntrianDarmayu/StatusAntrean', 'Antrianonline::statusAntrean');
$routes->post('AntrianDarmayu/AmbilAntrean', 'Antrianonline::ambilAntrean');
$routes->post('AntrianDarmayu/SisaAntrean', 'Antrianonline::sisaAntrean');
$routes->post('AntrianDarmayu/BatalAntrean', 'Antrianonline::batalAntrean');
$routes->post('AntrianDarmayu/CheckIn', 'Antrianonline::checkin');
$routes->post('AntrianDarmayu/PasienBaru', 'Antrianonline::pasienBaru');
$routes->post('AntrianDarmayu/JadwalOperasiRS', 'Antrianonline::jadwalOperasiRS');
$routes->post('AntrianDarmayu/JadwalOperasiPasien', 'Antrianonline::jadwalOperasiPasien');
$routes->post('AntrianDarmayu/AmbilAntreanFarmasi', 'Antrianonline::ambilAntreanFarmasi');
$routes->post('AntrianDarmayu/StatusAntreanFarmasi', 'Antrianonline::statusAntreanFarmasi');
$routes->post('AntrianDarmayu/tes', 'Antrianonline::tes');

//Antrian
$routes->view('antrianPoli', 'view/antrian/antrianPoli');
$routes->view('antrianLoket', 'view/antrian/antrianLoket');
$routes->view('antrianDisplay', 'view/antrian/antrianDisplay');

// RL
$routes->view('laporanRL1', 'view/laporanrl/laporanRL1');
$routes->view('laporanRL2', 'view/laporanrl/laporanRL2');
$routes->view('laporanRL3', 'view/laporanrl/laporanRL3');
$routes->view('laporanRL4', 'view/laporanrl/laporanRL4');
$routes->view('laporanRL5', 'view/laporanrl/laporanRL5');

//AMBULANCE
$routes->view('permintaanAmbulance', 'view/ambulance/permintaanAmbulance');
$routes->view('penatajasaAmbulance', 'view/ambulance/penatajasaAmbulance');
//video
$routes->get('video', 'Video::index');

//Kunjungan
$routes->view('kunjunganpasien', 'view/kunjungan/kunjunganpasien');
$routes->view('septransaksi', 'view/kunjungan/septransaksi');


$routes->post('/API/Bridging_UAT/(:any)', 'Bridging_UAT::$1');
$routes->get('/Bridging_UAT/(:any)', 'Bridging_UAT::$1');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
