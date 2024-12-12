<!DOCTYPE html>
<?php
    date_default_timezone_set("Asia/Jakarta");
    $nowday     = date('Y-m-d');
    //$nextday    = date('Y-m-d', strtotime('+1 days', strtotime($nowday))); 
    $nextday    = $nowday; 
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php echo SITE_NAME; ?></title>
    <link rel="icon" href="<?= base_url('_assets/dist/img/icon.png'); ?>">
    <!-- Tell the browser to be responsive to screen width -->

    <link rel="stylesheet" href="<?= base_url('_assets/plugins/fontawesome-free/css/all.min.css'); ?>">

    <link rel="stylesheet" href="<?= base_url('_assets/dist/css/adminlte.min.css'); ?>">

    <link rel="stylesheet" href="<?= base_url('_assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('_assets/_layout/asset.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('_assets/plugins/select2/css/select2.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('_assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('_assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css'); ?>">

    <link rel="stylesheet" href="<?= base_url('_assets/plugins/toastr/toastr.min.css'); ?>">

    <link rel="stylesheet" href="<?= base_url('_assets/css/intro/introjs.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('_assets/plugins/daterangepicker/daterangepicker.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('_assets/plugins/chart.js/Chart.min.css'); ?>">
    <!-- wPaint -->
    <link rel="Stylesheet" type="text/css" href="<?= base_url('_assets/wPaint/lib/wColorPicker.min.css'); ?>" />
    <link rel="Stylesheet" type="text/css" href="<?= base_url('_assets/wPaint/wPaint.min.css'); ?>" />

    <!-- leaflet -->
    <!-- 
    <link rel="stylesheet" href="_assets/plugins/leaflet/leaflet.css');">
    <link rel="stylesheet" href="_assets/plugins/leaflet/leaflet.contextmenu.css');">
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <link rel="stylesheet" href="_assets/plugins/leaflet/leafletrouting/dist/leaflet-routing-machine.css');"> -->

</head>
<!-- <body class="hold-transition sidebar-mini sidebar-collapse text-sm layout-fixed accent-danger" style="background-color: #d5ecef;"> -->
<!-- <body class="hold-transition layout-top-nav accent-danger" style="background-color: #d5ecef;"> -->
<!-- <body class="hold-transition sidebar-collapse layout-top-nav accent-danger" style="background-color: #d5ecef;"> -->
<!-- <body class="hold-transition sidebar-mini sidebar-collapse layout-fixed" data-panel-auto-height-mode="height"> -->
<!-- <body class="hold-transition sidebar-mini sidebar-collapse layout-footer-fixed" data-panel-auto-height-mode="height"> -->

<body class="hold-transition layout-navbar-fixed layout-sm-footer-fixed layout-fixed sidebar-collapse sidebar-mini">

    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center navbar-dark">
            <img class="animation__shake" src="<?= base_url('_assets/dist/img/simrs.png') ?>" alt="Logo SIM-RS" height="150" width="150">
        </div>

        <!-- <nav class="main-header navbar navbar-expand-md navbar-light"> -->
        <nav class="main-header navbar navbar-expand navbar-light p-0" style="height: 89px;">
            <!-- <div class="container"> -->
            <?= $this->include('_layout/nav_bar') ?>
            <!-- </div>     -->
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="sidebarx main-sidebar sidebar-light-success elevation-4 panggilan">
            <?= $this->include('_layout/sidebar') ?>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <!-- <div class="content-wrapper" style="background-color: #d5ecef;"> -->
        <div class="content-wrapper iframe-mode" data-widget="iframe" data-loading-screen="750" style="margin-top: 90px;">
            <div class="nav navbar navbar-expand navbar-light border-bottom p-0" id="welcome_tabsimrs">
                <div class="nav-item dropdown" style="border: 1px solid black; display: contents;">
                    <a class="nav-link bg-danger dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Tutup</a>
                    <div class="dropdown-menu mt-0">
                        <a class="dropdown-item" href="#" data-widget="iframe-close" data-type="all" style="font-size: 12px;" onclick="tutupdetailpasien()">Tutup Semua</a>
                        <a class="dropdown-item" href="#" data-widget="iframe-close" data-type="all-other" style="font-size: 12px;">Tutup Semua Yang Tidak Aktif</a>
                    </div>
                </div>
                <a class="nav-link bg-light" href="#" data-widget="iframe-scrollleft"><i class="fas fa-angle-double-left"></i></a>
                <ul class="navbar-nav overflow-hidden nm_judul_panel" role="tablist">
                    <input type="text" id="nama_tabpanel" value="0" class="d-none" readonly>
                </ul>
                <a class="nav-link bg-light" href="#" data-widget="iframe-scrollright"><i class="fas fa-angle-double-right"></i></a>
                <a class="nav-link bg-light" href="#" data-widget="iframe-fullscreen" style="display: none;"><i class="fas fa-expand"></i></a>
                <input type="hidden" name="profilepasienirna" id="profilepasienirna">
                <div class="viewListPasienWelcome"></div>
                <div id="nmtabpanellistpasien"></div>
            </div>
            <div id="infopasienirnax" style="display: none; width: 100%;"></div>  <!-- top:10mm; position: sticky; -->
            <div class="isi_judul_panel">
                <!-- tab-content  -->
                <div class="tab-empty" style="flex-direction: column; text-align: center;">
                    <img src="<?= base_url('_assets/dist/img/simrs.png') ?>" height="250" width="250">
                    <h4 class="display-4">"Kepuasanmu adalah Senyumku"</h4>
                </div>
                <div class="tab-loading">
                    <div>
                        <h2 class="display-4">Loading!! <i class="fa fa-sync fa-spin"></i></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="Allmodal_laporan"></div>
        <!-- END KONTEN WRAPPER -->

        <footer class="main-footer p-2">
            <div class="float-right d-none d-sm-block">
                <b>
                    <label id="module_far"></label> || <label id="module_far_milik"></label> ||
                    <?php echo longdate_indo(date('Y-m-d')); ?>
                </b>
                <b>v1.0</b>
            </div>
            Copyright &copy; <?php echo date('Y') ?> <a href="#" style="color: darkblue;">SIMRS HEBAT</a>. All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="report control-sidebar control-sidebar-light" id="welcome_lapsimrs">
        </aside>

    </div>

    <!-- jQuery -->
    <script src="<?= base_url('_assets/jquery-3.6.1.js'); ?>"></script>

    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url('_assets/plugins/jquery-ui/jquery-ui.js'); ?>"></script>
    <script src="<?= base_url('_assets/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>


    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script src="<?= base_url('_assets/ext-all.js'); ?>"></script>

    <script type="text/javascript" src="<?php echo 'js/api.js' . "?v=" . time(); ?>"></script>
    <script type="text/javascript" src="<?php echo 'js/painterro-1.2.82.min.js' . "?v=" . time(); ?>"></script>

    <!-- wPaint -->
    <script type="text/javascript" src="<?= base_url('_assets/wPaint/lib/wColorPicker.min.js') . "?v=" . time(); ?>"></script>
    <script type="text/javascript" src="<?= base_url('_assets/wPaint/wPaint.min.js') . "?v=" . time(); ?>"></script>
    <script type="text/javascript" src="<?= base_url('_assets/wPaint/plugins/main/wPaint.menu.main.min.js') . "?v=" . time(); ?>"></script>
    <script type="text/javascript" src="<?= base_url('_assets/wPaint/plugins/text/wPaint.menu.text.min.js') . "?v=" . time(); ?>"></script>
    <script type="text/javascript" src="<?= base_url('_assets/wPaint/plugins/shapes/wPaint.menu.main.shapes.min.js') . "?v=" . time(); ?>"></script>
    <script type="text/javascript" src="<?= base_url('_assets/wPaint/plugins/file/wPaint.menu.main.file.min.js') . "?v=" . time(); ?>"></script>

    <!-- Bootstrap Table -->
    <link href="<?= base_url('_assets/bootstrap-table-master/dist/bootstrap-table.min.css'); ?>" rel="stylesheet">
    <script src="<?= base_url('_assets/bootstrap-table-master/dist/bootstrap-table.min.js'); ?>"></script>
    <link rel="stylesheet" href="<?= base_url('_assets/bootstrap-table-master/dist/extensions/sticky-header/bootstrap-table-sticky-header.css'); ?>">
    <script src="<?= base_url('_assets/bootstrap-table-master/dist/extensions/sticky-header/bootstrap-table-sticky-header.js'); ?>"></script>

    <!-- Bootstrap 4 -->
    <script src="<?= base_url('_assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <!-- overlayScrollbars -->
    <script src="<?= base_url('_assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('_assets/dist/js/adminlte.js'); ?>"></script>
    <!-- CSS Private -->

    <script src="<?= base_url('_assets/dist/js/customize.js'); ?>"></script>

    <!-- Datatables -->
    <script src="<?= base_url('_assets/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('_assets/plugins/datatables-responsive/js/dataTables.responsive.min.js'); ?>"></script>
    <script src="<?= base_url('_assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('_assets/plugins/select2/js/select2.full.min.js') ?>"></script>

    <script src="<?= base_url('_assets/plugins/toastr/toastr.min.js') ?>"></script>
    <script src="<?= base_url('_assets/plugins/sweetalert2/sweetalert2.min.js'); ?>"></script>
    <!-- intro js -->
    <script src="<?= base_url('_assets/css/intro/intro.min.js') ?>"></script>
    <script src="<?= base_url('_assets/plugins/daterangepicker/daterangepicker.js') ?>"></script>
    <script src="<?= base_url('_assets/plugins/inputmask/jquery.inputmask.min.js') ?>"></script>
    <!-- chartjs -->
    <script src="<?= base_url('_assets/plugins/chart.js/Chart.min.js') ?>"></script>
    <script src="<?= base_url('_assets/plugins/chart.js/Chart.js') ?>"></script>

    <!-- leaflet -->
    <!-- <script src="_assets/plugins/leaflet/leaflet.js"></script>
    <script src="_assets/plugins/leaflet/leaflet.contextmenu.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script src="_assets/plugins/leaflet/leafletrouting/dist/leaflet-routing-machine.js"></script> -->

    <!-- audio -->
    <!-- <audio id="audio_link_bold" src="_assets/dist/audio/notif_pesan.mp3"></audio> -->

    <div class="modal" id="modalPasienKunjunganLangsung" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Kunjungan Langsung</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" id="modalPasienKunjunganLangsung0" name="isiModalPasienKunjunganLangsung">
                        <div class="col">
                            <center><i class="fas fa-3x fa-sync-alt fa-spin"></i></center>
                        </div>
                    </div>
                    <div class="row" id="modalPasienKunjunganLangsung1" name="isiModalPasienKunjunganLangsung">
                        <div class="col">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="labelCariNoRMNIKKunjunganLangsung">No. RM / NIK</span>
                                <input name="inputPasienKunjunganLangsung" type="text" autocomplete="off" id="cariNoRMNIKKunjunganLangsung" class="form-control" placeholder="No. RM / NIK" aria-label="Username" aria-describedby="labelCariNoRMNIKKunjunganLangsung">
                            </div>
                        </div>
                    </div>
                    <div class="row" id="modalPasienKunjunganLangsung2" name="isiModalPasienKunjunganLangsung">
                        <div class="col">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="labelNamaPasienKunjunganLangsung">Nama</span>
                                <input name="inputPasienKunjunganLangsung" type="text" autocomplete="off" id="namaPasienKunjunganLangsung" class="form-control" placeholder="Nama Pasien" aria-describedby="labelNamaPasienKunjunganLangsung">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="labelTglLahirPasienKunjunganLangsung">Tanggal Lahir</span>
                                <input name="inputPasienKunjunganLangsung" type="date" autocomplete="off" id="tglLahirPasienKunjunganLangsung" class="form-control" placeholder="Alamat Pasien" aria-describedby="labelTglLahirPasienKunjunganLangsung">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="labelAlamatPasienKunjunganLangsung">Alamat</span>
                                <input name="inputPasienKunjunganLangsung" type="text" autocomplete="off" id="alamatPasienKunjunganLangsung" class="form-control" placeholder="Alamat Pasien" aria-describedby="labelAlamatPasienKunjunganLangsung">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="labelNIKPasienKunjunganLangsung">NIK</span>
                                <input name="inputPasienKunjunganLangsung" type="number" autocomplete="off" id="NIKPasienKunjunganLangsung" class="form-control" placeholder="NIK Pasien" aria-describedby="labelNIKPasienKunjunganLangsung">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="labelTeleponPasienKunjunganLangsung">No. Telepon</span>
                                <input name="inputPasienKunjunganLangsung" type="number" autocomplete="off" id="teleponPasienKunjunganLangsung" class="form-control" placeholder="No. Telepon Pasien" aria-describedby="labelTeleponPasienKunjunganLangsung">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="labelJKPasienKunjunganLangsung">Jenis Kelamin</span>
                                <select size="1" class="form-control" id="jkPasienKunjunganLangsung">
                                    <option value=1>Laki-Laki</option>
                                    <option value=0>Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-success" onclick="OKModalPasienKunjunganLangsung();">Selanjutnya</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modalStockUnit" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Stock Unit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row" id="loadingStockUnit">
                        <div class="col">
                            <center><i class="fas fa-3x fa-sync-alt fa-spin"></i></center>
                        </div>
                    </div>

                    <div class="row justify-content-md-center">
                        <table id="tableStockUnit" data-toggle="table">
                            <thead>
                                <tr>
                                    <th data-field="nama_obat" data-sortable="true"> Nama Barang </th>
                                    <th data-field="stok_unit" data-sortable="true"> Jumlah </th>
                                    <th data-field="kd_satuan" data-sortable="true"> Satuan </th>
                                    <th data-field="exp" data-sortable="true" data-sorter="compareTgl"> Expired </th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modalBHPProduk" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">BHP Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row" id="loadingBHPProdukModalBHPProduk">
                        <div class="col">
                            <center><i class="fas fa-3x fa-sync-alt fa-spin"></i></center>
                        </div>
                    </div>

                    <div id="inputBHPProdukModalBHPProduk">
                        <div class="row">
                            <div class="col">
                                <h5 id="namaProdukModalBHPProduk"></h5>
                            </div>
                        </div>

                        <div class="row align-items-end">
                            <div class="col">
                                <label>Nama BHP:</label>
                                <input type="text" id="namaBHPModalBHPProduk" class="form-control form-control-xs" autocomplete="off">
                            </div>
                            <div class="col">
                                <label>Jumlah: <i id="maxJumlahBHPModalBHPProduk"></i></label>
                                <input type="number" id="jumlahBHPModalBHPProduk" class="form-control form-control-xs">
                            </div>
                            <div class="col">
                                <input type="text" id="satuanBHPModalBHPProduk" class="form-control form-control-xs" disabled>
                            </div>
                            <div class="col-auto" id="aksiTambahBHPModalBHPProduk">
                                <button class="btn btn-success" id="aksiTambahBHPModalBHPProduk" onclick="aksiTambahBHPModalBHPProduk();"><i class="fas fa-plus"></i></button>
                            </div>
                            <div class="col-auto" id="aksiEditBHPModalBHPProduk">
                                <button class="btn btn-primary" onclick="aksiSimpanBHPModalBHPProduk();"><i class="fas fa-save"></i></button>
                                <button class="btn btn-danger" onclick="aksihapusBHPModalBHPProduk();"><i class="fas fa-minus"></i></button>
                            </div>
                        </div>

                        <div class="row m-2 justify-content-md-center">
                            <table id="tableBHPProduk" data-single-select="true" data-click-to-select="true" data-toggle="table">
                                <thead>
                                    <tr>
                                        <th data-field="state" data-checkbox="true"></th>
                                        <th data-field="nama_obat" data-sortable="true">Nama BHP</th>
                                        <th data-field="jumlah" data-sortable="true">Jumlah </th>
                                        <th data-field="kd_satuan" data-sortable="true">Satuan </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-auto">
                            <button type="button" id="tombolFinalModalBHPProduk" onclick="aksiPostingBHPModalBHPProduk();" class="btn">Selesai</button>
                        </div>
                        <div class="col"></div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modalSuratSehat" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Surat Sehat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="inputmodalSuratSehat">
                        <div class="row" id="">
                            <div class="col-sm-6" id="">
                                <div class="" id="">
                                    <label>Nama</label>
                                    <input type="text" id="namaSuratSehat" class="form-control form-control-xs"><br>
                                </div>
                                <div class="" id="">
                                    <label>Tanggal</label>
                                    <input type="date" id="tglSuratSehat" class="form-control form-control-xs"><br>
                                </div>
                                <div class="" id="">
                                    <label>Pekerjaan</label>
                                    <input type="text" id="kerjaSuratSehat" class="form-control form-control-xs"><br>
                                </div>
                            </div>
                            <div class="col-sm-6" id="">
                                <div class="" id="">
                                    <label>Jenis Kelamin</label>
                                    <div class="row" id="check_jkSuratSehat">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <div class="row custom-control custom-checkbox custom-control-inline">
                                                    <input name="check_jkSuratSehat" value="0" type="radio" class="custom-control-input" id="check_jk1SuratSehat">
                                                    <label class="custom-control-label" for="check_jk1SuratSehat">Pria</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <div class="row custom-control custom-checkbox custom-control-inline">
                                                    <input name="check_jkSuratSehat" value="1" type="radio" class="custom-control-input" id="check_jk2SuratSehat">
                                                    <label class="custom-control-label" for="check_jk2SuratSehat">Wanita</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="" id="">
                                    <label>Alamat</label>
                                    <input type="text" id="alamatSuratSehat" class="form-control form-control-xs"><br>
                                </div>
                                <div class="" id="">
                                    <label>Tujuan</label>
                                    <input type="text" id="tujuanSuratSehat" class="form-control form-control-xs"><br>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="">
                            <div class="col-sm-6" id="">
                                <div class="" id="">
                                    <label>Berat Badan</label>
                                    <input type="text" id="beratSuratSehat" class="form-control form-control-xs"><br>
                                </div>
                                <div class="" id="">
                                    <label>Tinggi Badan</label>
                                    <input type="text" id="tinggiSuratSehat" class="form-control form-control-xs"><br>
                                </div>
                                <div class="" id="">
                                    <label>Tensi</label>
                                    <input type="text" id="tensiSuratSehat" class="form-control form-control-xs"><br>
                                </div>
                            </div>
                            <div class="col-sm-6" id="">
                                <div class="" id="">
                                    <label>Gol. Darah</label>
                                    <div class="form_group">
                                        <select name="goldarSuratSehat" id="goldarSuratSehat" class="form-control form-control-xs">
                                            <option value="0">--Tidak Tahu--</option>
                                            <option value="1">A+</option>
                                            <option value="2">B+</option>
                                            <option value="3">O+</option>
                                            <option value="4">AB+</option>
                                        </select><br>
                                    </div>
                                </div>
                                <div class="" id="">
                                    <label>Buta Warna</label>
                                    <div class="row" id="check_bwSuratSehat">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <div class="row custom-control custom-checkbox custom-control-inline">
                                                    <input name="check_bwSuratSehat" value="Tidak" type="radio" class="custom-control-input" id="check_bw1SuratSehat">
                                                    <label class="custom-control-label" for="check_bw1SuratSehat">Tidak</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <div class="row custom-control custom-checkbox custom-control-inline">
                                                    <input name="check_bwSuratSehat" value="Ya" type="radio" class="custom-control-input" id="check_bw2SuratSehat">
                                                    <label class="custom-control-label" for="check_bw2SuratSehat">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="" id="">
                                    <label>DPJP</label>
                                    <input type="text" id="dpjpSuratSehat" class="form-control form-control-xs"><br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-auto">
                            <button type="button" id="" onclick="aksisimpanSuratSehat()" class="btn">Selesai</button>
                        </div>
                        <div class="col"></div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modalSuratLahir" tabindex="-1">
        <div class="modal-dialog modal-lg" style="width:90%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Surat Lahir</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-header" style="background-color:gray;">
                        <h3 class="card-title" style="color:white;">DATA ORANG TUA</h3>
                    </div>
                    <div class="card-body">
                        <div class="row" id="">
                            <div class="col-sm-6" id="">
                                <div class="" id="">
                                    <label>Nama Ibu</label>
                                    <input type="text" id="namaSuratLahir" class="form-control form-control-sm"><br>
                                </div>
                                <div class="" id="">
                                    <label>Umur Ibu</label>
                                    <input type="text" id="umurSuratLahir" class="form-control form-control-sm"><br>
                                </div>
                                <div class="" id="">
                                    <label>Pekerjaan Ibu</label>
                                    <input type="text" id="kerjaSuratLahir" class="form-control form-control-sm"><br>
                                </div>
                                <div class="" id="">
                                    <label>Alamat</label>
                                    <input type="text" id="alamatSuratLahir" class="form-control form-control-sm"><br>
                                </div>
                            </div>
                            <div class="col-sm-6" id="">
                                <div class="" id="">
                                    <label>Nama Suami</label>
                                    <input type="text" id="namaSuamiSuratLahir" class="form-control form-control-sm"><br>
                                </div>
                                <div class="" id="">
                                    <label>Umur Suami</label>
                                    <input type="text" id="umurSuamiSuratLahir" class="form-control form-control-sm"><br>
                                </div>
                                <div class="" id="">
                                    <label>Pekerjaan Suami</label>
                                    <input type="text" id="kerjaSuamiSuratLahir" class="form-control form-control-sm"><br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-header" style="background-color:gray;">
                        <h3 class="card-title" style="color:white;">DATA BAYI</h3>
                    </div>
                    <div class="card-body">
                        <div class="row" id="">
                            <div class="col-sm-6" id="">
                                <div class="" id="">
                                    <label>Tanggal</label>
                                    <input type="date" id="tglSuratLahir" class="form-control form-control-sm"><br>
                                </div>
                                <div class="" id="">
                                    <label>Jam</label>
                                    <input type="time" id="jamSuratLahir" class="form-control form-control-sm"><br>
                                </div>
                                <div class="" id="">
                                    <label>Jenis Kelamin</label>
                                    <div class="row" id="genderSuratLahir">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <div class="row custom-control custom-checkbox custom-control-inline">
                                                    <input name="genderSuratLahir" value="0" type="radio" class="custom-control-input" id="genderSuratLahir1">
                                                    <label class="custom-control-label" for="genderSuratLahir1">Laki-laki</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <div class="row custom-control custom-checkbox custom-control-inline">
                                                    <input name="genderSuratLahir" value="1" type="radio" class="custom-control-input" id="genderSuratLahir2">
                                                    <label class="custom-control-label" for="genderSuratLahir2">Perempuan</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div><br>
                                </div>
                                <div class="" id="">
                                    <label>Nama Bayi</label>
                                    <input type="text" id="namabayiSuratLahir" class="form-control form-control-sm"><br>
                                </div>
                            </div>
                            <div class="col-sm-6" id="">
                                <div class="" id="">
                                    <label>Berat Badan</label>
                                    <input type="text" id="beratSuratLahir" class="form-control form-control-sm"><br>
                                </div>
                                <div class="" id="">
                                    <label>Panjang Badan</label>
                                    <input type="text" id="panjangSuratLahir" class="form-control form-control-sm"><br>
                                </div>
                                <div class="" id="">
                                    <label>Tempat</label>
                                    <input type="text" id="tempatSuratLahir" class="form-control form-control-sm"><br>
                                </div>
                                <div class="" id="">
                                    <label>Anak ke-</label>
                                    <input type="text" id="anakSuratLahir" class="form-control form-control-sm"><br>
                                </div>
                            </div>
                            <div class="col-sm-6" id="">
                                <label>DPJP</label>
                                <input type="text" id="dpjpSuratLahir" class="form-control form-control-sm"><br>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modalSuratMati" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="width:90%;">
                <div class="modal-header">
                    <h5 class="modal-title">Surat Kematian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row" id="">
                            <div class="col-sm-6" id="">
                                <div class="" id="">
                                    <label>Nama</label>
                                    <input type="text" id="namaSuratMati" class="form-control form-control-sm"><br>
                                </div>
                                <div class="" id="">
                                    <label>Tempat/Tanggal Lahir</label>
                                    <input type="date" id="tgllahirSuratMati" class="form-control form-control-sm"><br>
                                </div>
                            </div>
                            <div class="col-sm-6" id="">
                                <div class="" id="">
                                    <label>Umur</label>
                                    <input type="text" id="umurSuratMati" class="form-control form-control-sm"><br>
                                </div>
                                <div class="" id="">
                                    <label>Jenis Kelamin</label>
                                    <div class="row" id="genderSuratMati">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <div class="row custom-control custom-checkbox custom-control-inline">
                                                    <input name="genderSuratMati" value="0" type="radio" class="custom-control-input" id="genderSuratMati1">
                                                    <label class="custom-control-label" for="genderSuratMati1">Laki-laki</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <div class="row custom-control custom-checkbox custom-control-inline">
                                                    <input name="genderSuratMati" value="1" type="radio" class="custom-control-input" id="genderSuratMati2">
                                                    <label class="custom-control-label" for="genderSuratMati2">Perempuan</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div><br>
                                </div>
                                <div class="" id="">
                                    <label>Alamat</label>
                                    <input type="text" id="alamatSuratMati" class="form-control form-control-sm"><br>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="">
                            <div class="col-sm-6" id="">
                                <div class="" id="">
                                    <label>Tanggal</label>
                                    <input type="date" id="tglSuratMati" class="form-control form-control-sm"><br>
                                </div>
                                <div class="" id="">
                                    <label>Jam</label>
                                    <input type="time" id="jamSuratMati" class="form-control form-control-sm"><br>
                                </div>
                            </div>
                            <div class="col-sm-6" id="">
                                <div class="" id="">
                                    <label>Penyebab</label>
                                    <input type="text" id="sebabSuratMati" class="form-control form-control-sm"><br>
                                </div>
                                <div class="" id="">
                                    <label>DPJP</label>
                                    <input type="text" id="dpjpSuratMati" class="form-control form-control-sm"><br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-auto">
                            <button type="button" id="" onclick="aksisimpanSuratMati()" class="btn">Selesai</button>
                        </div>
                        <div class="col"></div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var nowday      = "<?php echo $nowday; ?>";
        var nextday     = "<?php echo $nextday; ?>";
        
        var tgllahir;
        var alamatpasien;
        var penyakitPendaftaranErmIrja;
        var data = {
            norms: '',
            namas: '',
            units: '',
            id_units: '',
            id_kunjungans: ''
        };
        var modalPasienKunjunganLangsung;
        var fungsiModalPasienKunjunganLangsung = function(new_kd_pasien) {};
        var faseModalPasienKunjunganLangsung = 0;
        var listStockBHPModalBHPProduk = [];
        var namaBHPModalBHPProduk = new AutoComplete("namaBHPModalBHPProduk");
        var jumlahBHPModalBHPProduk = document.getElementById('jumlahBHPModalBHPProduk');
        var satuanBHPModalBHPProduk = document.getElementById('satuanBHPModalBHPProduk');
        var id_dkModalBHPProduk = '';
        var id_unitModalBHPProduk = '';
        var bisaDifinalModalBHPProduk = false;

        namaBHPModalBHPProduk.onPilih(() => {
            var kd_obat = namaBHPModalBHPProduk.getValue();
            listStockBHPModalBHPProduk.forEach((element) => {
                if (element['kd_obat'] == kd_obat) {
                    jumlahBHPModalBHPProduk.value = 0;
                    jumlahBHPModalBHPProduk.max = element['stok_unit'];
                    satuanBHPModalBHPProduk.value = element['kd_satuan'];
                    document.getElementById('maxJumlahBHPModalBHPProduk').innerHTML = '(Max: ' + element['stok_unit'] + ')';
                }
            });
        });

        $('#tableBHPProduk').on('check.bs.table', function(elem, row) {
            if (bisaDifinalModalBHPProduk) {
                namaBHPModalBHPProduk.setValue(row['nama_obat']);
                document.getElementById('namaBHPModalBHPProduk').disabled = true;
                listStockBHPModalBHPProduk.forEach((element) => {
                    if (element['kd_obat'] == row['kd_obat']) {
                        jumlahBHPModalBHPProduk.value = row['jumlah'];
                        jumlahBHPModalBHPProduk.max = element['stok_unit'];
                        satuanBHPModalBHPProduk.value = element['kd_satuan'];
                        document.getElementById('maxJumlahBHPModalBHPProduk').innerHTML = '(Max: ' + element['stok_unit'] + ')';
                    }
                });

                document.getElementById('aksiEditBHPModalBHPProduk').style.display = 'block';
                document.getElementById('aksiTambahBHPModalBHPProduk').style.display = 'none';
            }
        });

        $('#tableBHPProduk').on('uncheck.bs.table', function(elem, row) {
            if (bisaDifinalModalBHPProduk) {
                document.getElementById('maxJumlahBHPModalBHPProduk').innerHTML = '';
                document.getElementById('jumlahBHPModalBHPProduk').value = '';
                document.getElementById('satuanBHPModalBHPProduk').value = '';
                namaBHPModalBHPProduk.reset();
                document.getElementById('namaBHPModalBHPProduk').disabled = false;
                document.getElementById('aksiEditBHPModalBHPProduk').style.display = 'none';
                document.getElementById('aksiTambahBHPModalBHPProduk').style.display = 'block';
            }
        });

        $(document).ready(function(e) {
            var login = false;
            if (localStorage['data_user'] !== null) {
                if (localStorage['timeout'] > Date.now()) {
                    login = true;
                }
            }

            modalPasienKunjunganLangsung = document.getElementById('modalPasienKunjunganLangsung');

            if (login) {
                user = JSON.parse(localStorage['data_user']);
                getTrustee();
                module_name();
                // getLaporan();
            } else {
                localStorage['data_user'] = null;
                localStorage['timeout'] = null;
                window.location.href = "login";
            }

        });

        function logout() {
            localStorage['data_user'] = null;
            localStorage['timeout'] = null;
            window.location.href = "login";
        }

        function playNotifSound(){
            var audio = new Audio('_assets/suara.mp3');
            audio.play();
        }

        function showModalPasienKunjunganLangsung(fungsiSelanjutnya) {
            kd_pasien = '';
            fungsiModalPasienKunjunganLangsung = fungsiSelanjutnya;
            $('#modalPasienKunjunganLangsung').modal('show');
            document.getElementsByName('inputPasienKunjunganLangsung').forEach((inputan) => {
                inputan.value = '';
            });
            gantiFaseModalPasienKunjunganLangsung(1);
        }

        function showModalStockUnit(id_unit) {
            var loadingStockUnit = document.getElementById('loadingStockUnit');
            var tableStockUnit = document.getElementById('tableStockUnit');
            $('#tableStockUnit').bootstrapTable('removeAll');
            var param = {
                id_unit: id_unit
            };
            loadingStockUnit.style.display = 'block';
            tableStockUnit.style.display = 'none';
            $('#modalStockUnit').modal('show');
            apiPOST("Gudang/stockUnit", param, hasil => {
                if (hasil != null) {
                    var listData = hasil['data'];
                    listData.forEach((element) => {
                        $('#tableStockUnit').bootstrapTable('append', element);
                    });
                }
                loadingStockUnit.style.display = 'none';
                tableStockUnit.style.display = 'block';
            });
        }

        function showModalBHPProduk(id_dk, id_unit) {
            id_dkModalBHPProduk = '';
            id_unitModalBHPProduk = '';
            bisaDifinalModalBHPProduk = false;
            var tombolFinalModalBHPProduk = document.getElementById('tombolFinalModalBHPProduk');
            document.getElementById('namaProdukModalBHPProduk').innerHTML = '';
            document.getElementById('maxJumlahBHPModalBHPProduk').innerHTML = '';
            document.getElementById('jumlahBHPModalBHPProduk').value = '';
            document.getElementById('satuanBHPModalBHPProduk').value = '';
            document.getElementById('namaBHPModalBHPProduk').disabled = true;
            jumlahBHPModalBHPProduk.disabled = true;
            namaBHPModalBHPProduk.reset();
            var loadingBHPProdukModalBHPProduk = document.getElementById('loadingBHPProdukModalBHPProduk');
            var inputBHPProdukModalBHPProduk = document.getElementById('inputBHPProdukModalBHPProduk');
            $('#tableBHPProduk').bootstrapTable('removeAll');
            loadingBHPProdukModalBHPProduk.style.display = 'block';
            inputBHPProdukModalBHPProduk.style.display = 'none';
            var param = {
                id_dk: id_dk,
                id_unit: id_unit
            };
            tombolFinalModalBHPProduk.classList.remove('btn-success');
            tombolFinalModalBHPProduk.classList.add('btn-secondary');
            document.getElementById('aksiTambahBHPModalBHPProduk').style.display = 'none';
            $('#modalBHPProduk').modal('show');
            apiPOST("Kunjungan/modalBHPProduk", param, hasil => {
                if (hasil != null) {
                    var mapData = hasil['data'];
                    listStockBHPModalBHPProduk = mapData['listStockBHP'];
                    namaBHPModalBHPProduk.resetData();
                    listStockBHPModalBHPProduk.forEach(baru => {
                        namaBHPModalBHPProduk.addData(baru['kd_obat'], baru['nama_obat']);
                    });
                    document.getElementById('namaProdukModalBHPProduk').innerHTML = mapData['nama_produk'];
                    id_dkModalBHPProduk = id_dk;
                    id_unitModalBHPProduk = id_unit;
                    var listBHP = mapData['listBHP'];
                    listBHP.forEach((element) => {
                        $('#tableBHPProduk').bootstrapTable('append', element);
                    });
                    bisaDifinalModalBHPProduk = (mapData['flag_bhp'] == 'f' || listBHP.length == 0);
                }
                if (bisaDifinalModalBHPProduk) {
                    tombolFinalModalBHPProduk.classList.remove('btn-secondary');
                    tombolFinalModalBHPProduk.classList.add('btn-success');
                    document.getElementById('aksiTambahBHPModalBHPProduk').style.display = 'block';
                    document.getElementById('namaBHPModalBHPProduk').disabled = false;
                    jumlahBHPModalBHPProduk.disabled = false;
                }
                document.getElementById('aksiEditBHPModalBHPProduk').style.display = 'none';
                loadingBHPProdukModalBHPProduk.style.display = 'none';
                inputBHPProdukModalBHPProduk.style.display = 'block';
            });
        }

        function aksiTambahBHPModalBHPProduk() {
            if ((jumlahBHPModalBHPProduk.max - jumlahBHPModalBHPProduk.value) < 0) {
                alert('Jumlah stock tidak cukup');
            } else {
                var param = {
                    id_dk: id_dkModalBHPProduk,
                    id_obat: namaBHPModalBHPProduk.getValue(),
                    jumlah: jumlahBHPModalBHPProduk.value
                };
                apiPOST("Kunjungan/tambahPenggunaanBHP", param, hasil => {
                    showModalBHPProduk(id_dkModalBHPProduk, id_unitModalBHPProduk);
                });
            }
        }

        function aksiSimpanBHPModalBHPProduk() {
            if ((jumlahBHPModalBHPProduk.max - jumlahBHPModalBHPProduk.value) < 0) {
                alert('Jumlah stock tidak cukup');
            } else {
                var param = {
                    id_dk: id_dkModalBHPProduk,
                    id_obat: namaBHPModalBHPProduk.getValue(),
                    jumlah: jumlahBHPModalBHPProduk.value
                };
                apiPOST("Kunjungan/simpanPenggunaanBHP", param, hasil => {
                    showModalBHPProduk(id_dkModalBHPProduk, id_unitModalBHPProduk);
                });
            }
        }

        function aksiPostingBHPModalBHPProduk() {
            var param = {
                id_dk: id_dkModalBHPProduk
            };
            apiPOST("Kunjungan/postingPenggunaanBHP", param, hasil => {
                showModalBHPProduk(id_dkModalBHPProduk, id_unitModalBHPProduk);
            });
        }

        function aksihapusBHPModalBHPProduk() {
            var param = {
                id_dk: id_dkModalBHPProduk,
                id_obat: namaBHPModalBHPProduk.getValue()
            };
            apiPOST("Kunjungan/hapusPenggunaanBHP", param, hasil => {
                showModalBHPProduk(id_dkModalBHPProduk, id_unitModalBHPProduk);
            });
        }

        document.getElementById('cariNoRMNIKKunjunganLangsung').addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                OKModalPasienKunjunganLangsung();
            }
        });

        function compareTgl(tglA, tglB) {
            var dPartA = tglA.split('-');
            var dPartB = tglB.split('-');
            var waktuA = new Date(dPartA[1] + '/' + dPartA[0] + '/' + dPartA[2]).getTime();
            var waktuB = new Date(dPartB[1] + '/' + dPartB[0] + '/' + dPartB[2]).getTime();

            if (waktuA < waktuB) {
                return 1;
            } else if (waktuA > waktuB) {
                return -1;
            } else {
                return 0;
            }
        }

        function gantiFaseModalPasienKunjunganLangsung(fase_baru) {
            faseModalPasienKunjunganLangsung = fase_baru;
            var listIsiModalPasienKunjunganLangsung = document.getElementsByName('isiModalPasienKunjunganLangsung');
            listIsiModalPasienKunjunganLangsung.forEach((isi) => {
                isi.style.display = 'none';
            });
            document.getElementById('modalPasienKunjunganLangsung' + fase_baru).style.display = 'block';
        }

        function OKModalPasienKunjunganLangsung() {
            var last_fase = faseModalPasienKunjunganLangsung;
            gantiFaseModalPasienKunjunganLangsung(0);
            if (last_fase == 1) {
                var param = {
                    key: document.getElementById('cariNoRMNIKKunjunganLangsung').value
                };
                apiPOST("Pasien/cariPasienKunjunganLangsung", param, hasil => {
                    if (hasil != null) {
                        if (hasil['data'] == '') {
                            gantiFaseModalPasienKunjunganLangsung(2);
                        } else {
                            $('#modalPasienKunjunganLangsung').modal('hide');
                            fungsiModalPasienKunjunganLangsung(hasil['data']);
                        }
                    }
                });
            } else if (last_fase == 2) {
                var lanjut = true;
                var listIsiModalPasienKunjunganLangsung = document.getElementsByName('inputPasienKunjunganLangsung');
                listIsiModalPasienKunjunganLangsung.forEach((isi) => {
                    if (isi.id != 'cariNoRMNIKKunjunganLangsung' && lanjut) {
                        if (isi.value == '') {
                            gantiFaseModalPasienKunjunganLangsung(2);
                            isi.focus();
                            lanjut = false;
                        }
                    }
                });
                if (lanjut) {
                    if (document.getElementById('jkPasienKunjunganLangsung').value == 1) {
                        jenis = true
                    } else {
                        jenis = false
                    }
                    var param = {
                        nama: document.getElementById('namaPasienKunjunganLangsung').value,
                        alamat: document.getElementById('alamatPasienKunjunganLangsung').value,
                        tgl_lahir: document.getElementById('tglLahirPasienKunjunganLangsung').value,
                        telepon: document.getElementById('teleponPasienKunjunganLangsung').value,
                        nik: document.getElementById('NIKPasienKunjunganLangsung').value,
                        jenis_kelamin: jenis
                    };
                    apiPOST("Pasien/addPasienKunjunganLangsung", param, hasil => {
                        if (hasil != null) {
                            $('#modalPasienKunjunganLangsung').modal('hide');
                            fungsiModalPasienKunjunganLangsung(hasil['data']);
                        }
                    });
                }
            }
        }

        function swal_center(msg, status) {
            Swal.fire({
                position: 'center',
                icon: status,
                title: msg,
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            })
        }

        function toast(msg, status) {
            Toast.fire({
                icon: status,
                title: msg
            })
        }

        function sukses(msg, status) {
            Swal.fire({
                imageUrl: '<?= base_url('_assets/dist/img/simrs.png') ?>',
                imageWidth: 200,
                imageHeight: 200,
                position: 'center',
                width: 500,
                icon: status,
                title: msg,
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true
            })
        }
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        function getTrustee() {
            var param = {
                user: user['kd_user']
            };

            apiPOST("user/getTrustee", param, hasil => {
                if (hasil !== null) {
                    var listTrustee = hasil['list'];
                    var lastParent = '';
                    var sideBar = document.getElementById('sidebar');
                    sideBar.innerHTML = '';
                    var temp_li = document.createElement('li');
                    var temp_ul = document.createElement('ul');
                    for (var i = 0; i < listTrustee.length; i++) {
                        var modul = listTrustee[i];
                        if (lastParent != modul['id_parent_modul']) {
                            if (lastParent != '') {
                                temp_li.appendChild(temp_ul);
                                sideBar.appendChild(temp_li);
                                temp_li = document.createElement('li');
                                temp_ul = document.createElement('ul');
                            }
                            lastParent = modul['id_parent_modul'];
                            temp_li.classList.add('nav-item');
                            temp_ul.classList.add('nav');
                            temp_ul.classList.add('nav-treeview');

                            temp_li.innerHTML = '<a href="#" class="nav-link"><i class="' + modul['class_parent'] + '"></i><p>' + modul['deskripsi'] + '<i class="fas fa-angle-left right"></i></p></a>';
                        }

                        var new_li = document.createElement('li');
                        new_li.classList.add('nav-item');
                        new_li.innerHTML = '<a href="' + modul['url'] + '" class="nav-link"  id="' + modul['id_modul'] + '"><i class="' + modul['class'] + '"></i><p>' + modul['nama_modul'] + '</p></a>';
                        temp_ul.appendChild(new_li);
                    }

                }
                temp_li.appendChild(temp_ul);
                sideBar.appendChild(temp_li);
            });
        };

        function getLaporan() {
            var param = {
                user: user['kd_user']
            };
            var tempatLaporan = document.getElementById('tempatLaporan');
            tempatLaporan.innerHTML = '';
            apiPOST("user/getLaporan", param, hasil => {
                if (hasil !== null) {
                    var listLaporan = hasil['list'];
                    for (var i = 0; i < listLaporan.length; i++) {
                        var laporan = listLaporan[i];
                        var tempDiv = document.createElement('div');
                        tempDiv.innerHTML = '<div class="p-1"><button class="btn btn-sm btn-outline-success" onclick="showModalLaporan(' + "'" + laporan['url'] + "'" + ')" style="width:100%; text-align:left;"><i class="fas fa-file"></i> ' + laporan['nama_modul'] + '</button></div>';
                        tempatLaporan.append(tempDiv);
                    }
                }
            });
        }

        const pertanyaan = Swal.mixin({
            buttonsStyling: true
        })

        function module_name() {
            $('#module_far').html(user['nama_unit']);
            $('#module_far_milik').html(user['milik']);
            $('#module_username').html(user['nama']);
        }

        function showmodalSuratSehat() {
            $("#modalSuratSehat").modal("show");

        }

        function showmodalSuratLahir() {
            $("#modalSuratLahir").modal("show");

        }

        function showmodalSuratMati() {
            $("#modalSuratMati").modal("show");

        }

        // function tampilPasienermirna(no_rm,unit,id_kunjungan,id_unit,nama,transaksi,tgl_lahir,alamat,id_pegawai,jnskelamin,nama_kamar,penjamin,jam_masuk, nama_dokter) {
        //     $('#modallistpasienirna').modal('hide');
        //     $('.tab-empty').hide();
            
        //     showDetailDataPasienIrna(no_rm,unit,id_kunjungan,id_unit,nama,transaksi,tgl_lahir,alamat,id_pegawai,jnskelamin,nama_kamar,penjamin,jam_masuk, nama_dokter);
        //     document.getElementById('rmermirna').value          =no_rm;
        //     document.getElementById('namaermirna').value        =nama;
        //     document.getElementById('unitermirna').value        =unit;
        //     document.getElementById('idKunjunganermirna').value =id_kunjungan;
        //     document.getElementById('idunitermirna').value      =id_unit;
        //     document.getElementById('transaksiermirna').value   =transaksi;
        //     document.getElementById('alamatermirna').value      =alamat;
        //     document.getElementById('profilepasienirna').value  =id_kunjungan;
        //     data.namas    =nama;
        //     data.norms    =no_rm;
        //     data.units    =unit;
        //     data.id_units =id_unit;
        //     data.id_kunjungans=id_kunjungan;
        //     alamatpasien  =alamat;
        //     tgllahir      =tgl_lahir;
        // }

        /*function searchpxirnaby() {
            //setTimeout($('#listpasienermirna_loadingawal').hide(),1000);
            // if (document.getElementById('searchPxRmlistermirna').value == '') {
            //     var norm = '000';
            // } else {
            //     var norm = document.getElementById('searchPxRmlistermirna').value;
            // }

            var listParam = [
                'cri_by_nmpasien_listermirna', 'cri_by_norm_listermirna'
            ];

            var param = {
                user        : user['id_user'],
                pegawai     : user['id_pegawai'],
                norm        : document.getElementById('cri_by_norm_listermirna').value,
                nmapasien   : document.getElementById('cri_by_nmpasien_listermirna').value,
                unit        : document.getElementById('cri_by_unit_listermirna').value,
                tgl         : document.getElementById('tglcariirna').value
            };
            $("#listpasienermirna_loadingawal").show();
            apiPOST("Rekammedisirna/listpasienby", param, hasil => {

                $("#listpasienermirna_loadingawal").hide();
                $('#listpasienermirna').html('');
                if (hasil['data'] !== null) {
                    if (hasil['code'] == 'XX') {
                        toastr.error("Data tidak ditemukan");
                        var Baris = "";
                        Baris += '<div class="col-sm-12">';
                        Baris += '<div class="small-box bg-danger">';
                        Baris += '<div class="inner p-1" style="text-align:center;">';
                        Baris += '<h6><i class="fa fa-times"></i> Data Tidak Ditemukan</h6>';
                        Baris += '</div>';
                        Baris += '</div>';
                        Baris += '</div>';

                        $('#listpasienermirna').append(Baris);
                        //document.getElementById('searchPxRmlistermirna').value = '';
                        //document.getElementById('RWJERMnmlistermirna').value = '';
                    } else {
                        var Baris = "";
                        var a = hasil['data'];
                        for (var i = 0; i < a.length; i++) {
                            var tglkunj = a[i].tgl_masuk;
                            var transaksi = a[i].id_transaksi;
                            var norm = a[i].no_rm;
                            var nama = a[i].nama;
                            var alamat = a[i].alamat;
                            var umur = a[i].tgl_lahir;
                            var penjamin = a[i].nama_penjamin;
                            var sep = a[i].no_sjp;
                            var telp = a[i].telepon;
                            var unit = a[i].nama_unit;
                            var kunjungan = a[i].id_kunjungan;
                            var id_unit = a[i].id_unit;
                            var nama_unit = a[i].nama_unit;
                            var soap = a[i].soap;
                            var tgl_lahir = a[i].tgl_lahir;
                            var id_pegawai = a[i].id_pegawai;
                            var nama_kamar = a[i].nama_kamar;
                            var jam_masuk = a[i].jam_masuk.substring(0, 16);
                            var jnskelamin = a[i].jenis_kelamin;
                            var nama_dokter = a[i].nama_dokter;

                            if (nama.length > 18) {
                                namax = nama.substring(0, 18) + '...';
                            } else {
                                namax = nama;
                            }

                            if (alamat.length > 0) {
                                if (alamat.length > 30) {
                                    alamatx = alamat.substring(0, 30) + '...';
                                } else {
                                    alamatx = alamat;
                                }
                            }else{
                                alamatx = '---';
                            }

                            Baris += '<div class="col-sm-3">';
                            if (soap > '') {
                                Baris += '<div class="small-box btn-info" style="border: solid 2px darkblue;">';
                            } else {
                                Baris += '<div class="small-box btn-secondary-default" style="border: solid 2px #a8d4da; margin-bottom: 5px !important;">';
                            }


                            Baris += '<div class="inner p-1">';
                            Baris += '<h6><strong>' + norm + '</strong> / ' + namax + '</h6>';
                            Baris += '<p class="p-0 mb-1" style="font-size:12px;">' + alamatx + '</p>';
                            Baris += '<p class="p-0" style="font-size:12px;"><strong><i>' + unit + '&nbsp;(' + nama_kamar + ')</i></strong></p>';
                            Baris += '<p class="p-0 mb-1" style="font-size:14px; text-align: center;"><i class="fa fa-clock"></i> ' + jam_masuk + '</p>';
                            Baris += '</div>';
                            Baris += '<div class="icon">';
                            Baris += '<i class="fa fa-user"></i>';
                            Baris += '</div>';
                            Baris += '<a href="#" class="small-box-footer" style="background-color: #a8d4da; color: black;" onclick="tampilPasienermirna(' + "'" + norm + "','" + unit + "','" + kunjungan + "','" + id_unit + "','" + nama + "','" + transaksi + "','" + tgl_lahir + "','" + alamat + "','" + id_pegawai+ "','" + jnskelamin+ "','" + nama_kamar+ "','" + penjamin+ "','" + jam_masuk+ "','" + nama_dokter + "'" + ')" style="cursor:pointer;">Klik DisiniX <i class="fas fa-arrow-circle-right"></i></a>';
                            Baris += '</div>';
                            Baris += '</div>';
                        }
                        $('#listpasienermirna').append(Baris);
                    }
                }
            });
        };

        function listpasienermirna() {
            //setTimeout($('#listpasienermirna_loadingawal').hide(),1000);
            var listParam = [
                'cri_by_nmpasien_listermirna', 'cri_by_norm_listermirna'
            ];
            var param = {
                user        : user['id_user'],
                pegawai     : user['id_pegawai'],
                norm        : document.getElementById('cri_by_norm_listermirna').value,
                nmapasien   : document.getElementById('cri_by_nmpasien_listermirna').value,
                unit        : document.getElementById('cri_by_unit_listermirna').value,
                tgl         : document.getElementById('tglcariirna').value
            };
            $("#listpasienermirna_loadingawal").show();
            apiPOST("Rekammedisirna/listpasien", param, hasil => {
                $("#listpasienermirna_loadingawal").hide();
                $('#listpasienermirna').html('');
                if (hasil['data'] !== null) {
                    if (hasil['code'] == 'XX') {
                        toastr.error("Data tidak ditemukan");
                        var Baris = "";
                        Baris += '<div class="col-sm-12">';
                        Baris += '<div class="small-box bg-danger">';
                        Baris += '<div class="inner p-1" style="text-align:center;">';
                        Baris += '<h6><i class="fa fa-times"></i> Data Tidak Ditemukan</h6>';
                        Baris += '</div>';
                        Baris += '</div>';
                        Baris += '</div>';

                        $('#listpasienermirna').append(Baris);
                        //document.getElementById('searchPxRmlistermirna').value = '';
                        //document.getElementById('RWJERMnmlistermirna').value = '';
                    } else {
                        var Baris = "";
                        var a = hasil['data'];
                        for (var i = 0; i < a.length; i++) {
                            var tglkunj = a[i].tgl_masuk;
                            var transaksi = a[i].id_transaksi;
                            var norm = a[i].no_rm;
                            var nama = a[i].nama;
                            var alamat = a[i].alamat;
                            var umur = a[i].tgl_lahir;
                            var penjamin = a[i].nama_penjamin;
                            var sep = a[i].no_sjp;
                            var telp = a[i].telepon;
                            var unit = a[i].nama_unit;
                            var kunjungan = a[i].id_kunjungan;
                            var id_unit = a[i].id_unit;
                            var nama_unit = a[i].nama_unit;
                            var soap = a[i].soap;
                            var tgl_lahir = a[i].tgl_lahir;
                            var id_pegawai = a[i].id_pegawai;
                            var nama_kamar = a[i].nama_kamar;
                            var jam_masuk = a[i].jam_masuk.substring(0, 16);
                            var jnskelamin = a[i].jk;
                            var nama_dokter = a[i].nama_dokter;

                            if (nama.length > 18) {
                                namax = nama.substring(0, 18) + '...';
                            } else {
                                namax = nama;
                            }

                            if (alamat.length > 0) {
                                if (alamat.length > 30) {
                                    alamatx = alamat.substring(0, 30) + '...';
                                } else {
                                    alamatx = alamat;
                                }
                            }else{
                                alamatx = '---';
                            }

                            Baris += '<div class="col-sm-3">';
                            if (soap > '') {
                                Baris += '<div class="small-box btn-info" style="border: solid 2px darkblue;">';
                            } else {
                                Baris += '<div class="small-box btn-secondary-default" style="border: solid 2px #a8d4da; margin-bottom: 5px !important;">';
                            }


                            Baris += '<div class="inner p-1">';
                            Baris += '<h6><strong>' + norm + '</strong> / ' + namax + '</h6>';
                            Baris += '<p class="p-0 mb-1" style="font-size:12px;">' + alamatx + '</p>';
                            Baris += '<p class="p-0" style="font-size:12px;"><strong><i>' + unit + '&nbsp(' + nama_kamar + ')</i></strong></p>';
                            Baris += '<p class="p-0 mb-1" style="font-size:14px; text-align: center;"><i class="fa fa-clock"></i> ' + jam_masuk + '</p>';
                            Baris += '</div>';
                            Baris += '<div class="icon">';
                            Baris += '<i class="fa fa-user"></i>';
                            Baris += '</div>';
                            Baris += '<a href="#" class="small-box-footer" style="background-color: #a8d4da; color: black;" onclick="tampilPasienermirna(' + "'" + norm + "','" + unit + "','" + kunjungan + "','" + id_unit + "','" + nama + "','" + transaksi + "','" + tgl_lahir + "','" + alamat + "','" + id_pegawai+ "','" + jnskelamin+ "','" + nama_kamar+ "','" + penjamin+ "','" + jam_masuk+ "','" + nama_dokter + "'" + ')" style="cursor:pointer;">Klik Disini <i class="fas fa-arrow-circle-right"></i></a>';
                            Baris += '</div>';
                            Baris += '</div>';
                        }
                        $('#listpasienermirna').append(Baris);
                    }
                }
            });
        };*/

        function aksisimpanSuratSehat() {
            $("#modalSuratSehat").modal("hide");
            if ($('input[name=check_jkSuratSehat]:checked').val() == 0) {
                jk = 'Pria';
            } else {
                jk = 'Wanita';
            }
            var param = {
                nama: $('#namaSuratSehat').val(),
                tanggal: $('#tglSuratSehat').val(),
                jenis_kelamin: jk,
                alamat: $('#alamatSuratSehat').val(),
                pekerjaan: $('#kerjaSuratSehat').val(),
                tujuan: $('#tujuanSuratSehat').val(),
                berat_bd: $('#beratSuratSehat').val(),
                tinggi_bd: $('#tinggiSuratSehat').val(),
                tensi: $('#tensiSuratSehat').val(),
                gol_dar: $('#goldarSuratSehat').val(),
                buta: $('input[name=check_jkSuratSehat]:checked').val(),
                dpjp: $('#dpjpSuratSehat').val()
            }
            console.log(param);
        }

        function aksisimpanSuratLahir() {
            $("#modalSuratLahir").modal("hide");

            var param = {
                nama_ibu: $('#namaSuratLahir').val(),
                umur_ibu: $('#umurSuratLahir').val(),
                kerja_ibu: $('#kerjaSuratLahir').val(),
                nama_ayah: $('#namaSuamiSuratLahir').val(),
                umur_ayah: $('#umurSuamiSuratLahir').val(),
                kerja_ayah: $('#kerjaSuamiSuratLahir').val(),
                alamat: $('#alamatSuratLahir').val(),
                tanggal: $('#tglSuratLahir').val(),
                jam: $('#jamSuratLahir').val(),
                jenis_kelamin: jk,
                berat_bd: $('#beratSuratLahir').val(),
                panjang_bd: $('#panjangSuratLahir').val(),
                tempat_lahir: $('#tempatSuratLahir').val(),
                nama_anak: $('#namabayiSuratLahir').val(),
                anak_ke: $('#anakSuratLahir').val(),
                dpjp: $('#dpjpSuratLahir').val()
            }
            console.log(param);
        }

        function aksisimpanSuratMati() {
            $("#modalSuratMati").modal("hide");
            if ($('input[name=genderSuratMati]:checked').val() == 0) {
                jk = 'Laki-laki';
            } else {
                jk = 'Perempuan';
            }
            var param = {
                nama: $('#namaSuratMati').val(),
                tgl_lahir: $('#tgllahirSuratMati').val(),
                umur: $('#umurSuratMati').val(),
                jenis_kelamin: jk,
                alamat: $('#alamatSuratMati').val(),
                tgl_mati: $('#tglSuratMati').val(),
                jam: $('#jamSuratMati').val(),
                sebab: $('#sebabSuratMati').val(),
                dpjp: $('#dpjpSuratMati').val()
            }
            console.log(param);
        }
        //no_rm,unit,id_kunjungan,id_unit,nama,transaksi,tgl_lahir,alamat,jnskelamin,nama_kamar,jam_masuk,umur,urut_masuk,tgl_inap
        function showDetailDataPasienIrna(no_rm,unit,id_kunjungan,id_unit,nama,transaksi,tgl_lahir,alamat,jnskelamin,nama_kamar,jam_masuk, umur, urut_masuk,tgl_inap,penjamin) {
            var html = '';

            // html += '<div class="info-box p-0 mb-0" style="background-color: whitesmoke;">';
            html += "<table border='0' cellpadding='0' cellspacing='0' width='100%'>";
            html += "<tr>";
            html += "<td align='left' style='padding:2mm;' width='80%'>";
                html += "<table cellspacing='0'>";
                    html += "<tr>";
                        if ((jnskelamin == 'Laki-laki')||(jnskelamin == 't')){
                            html += '<td align="center"><img src="<?= base_url('_assets/dist/img/iconL.png') ?>" height="50" width="50" style="border:1px solid black; border-radius: 50%;"></td>';
                            var jeke = "Laki-laki";
                        }else if ((jnskelamin == 'Perempuan')||(jnskelamin == 'f')){
                            html += '<td align="center"><img src="<?= base_url('_assets/dist/img/iconP.png') ?>" height="50" width="50" style="border:1px solid black; border-radius: 50%;"></td>';
                            var jeke = "Perempuan";
                        }else{
                            html += '<td align="center"><img src="<?= base_url('_assets/dist/img/icontaktau.png') ?>" height="50" width="50" </td>';
                            var jeke = "--";
                        }
                        // html += "<td align='left'><p class='mb-0' style='font-size: 20px; font-weight: 800;  color: black;'>"+nama+"</p>";
                        // html += "<p class='mb-0' style='font-size: 15px; color: black;'>"+no_rm+" / "+transaksi+" / "+id_kunjungan+" / "+penjamin+" / "+unit+" <i>("+nama_kamar+")</i><br></p>";
                        // html += "<p class='mb-0' style='font-size: 15px; color: black;'>"+umur+" / "+jnskelamin+" / "+jam_masuk+"<br></p>";
                        // html += "<p class='mb-0' style='font-size: 15px; color: black;'>"+alamat+"<br></p>";
                        // html += "<p class='mb-0' style='font-size: 15px; color: black;'>"+urut_masuk+"<br></p>";

                        html += "<td align='left'><p class='mb-0' style='font-size: 15px; font-weight: 400;  color: black;'>"+no_rm+" / "+nama+" / "+transaksi+" / "+id_kunjungan+" / "+penjamin+" / "+unit+" <i>("+nama_kamar+")</i></p>";                          
                        html += "<p class='mb-0' style='font-size: 15px; color: black;'>"+umur+" / "+jnskelamin+" / "+jam_masuk+" / "+alamat+"<br></p>";  

                        html += "</td>";
                    html += "</tr>";
                html += "</table>";
            html += "</td>";
            // html += '<td align="center"><button type="button" class="btn btn-info p-4" onclick="showcaripasien()" style="display: inline-grid; font-size: 20px;"><i class="fa fa-search"></i> Cari Kunjungan Pasien</button></td>';
            html += "</tr>";
            html += "</table>";
           
            html += '<input type="hidden" class="form-control form-control-xs" id="rmermirna" disabled>';
            html += '<input type="hidden" class="form-control form-control-xs" id="namaermirna" disabled>';
            html += '<input type="hidden" class="form-control form-control-xs" id="unitermirna" disabled>'
            html += '<input type="hidden" class="form-control form-control-xs" id="alamatermirna" disabled>';
            html += '<input type="hidden" class="form-control form-control-xs" id="idKunjunganermirna" disabled>';
            html += '<input type="hidden" class="form-control form-control-xs" id="idunitermirna" disabled>';
            html += '<input type="hidden" class="form-control form-control-xs" id="transaksiermirna" disabled>';
            html += '<input type="hidden" class="form-control form-control-xs" id="tgl_lahirermirna" disabled>';
            html += '<input type="hidden" class="form-control form-control-xs" id="tgl_masukermirna" disabled>';
            html += '<input type="hidden" class="form-control form-control-xs" id="urut_masukermirna" disabled>';
            

            // html += '</div>';

            $('#infopasienirna').html(html);
            document.getElementById('infopasienirna').style.display = 'block';
        }

        function hideDetailDataPasienIrna() {
            $('#infopasienirna').html('');
        }
        
        function showcaripasien() {
            // $('#modallistpasienirna').modal('show');
            // document.getElementById('bodyhistoripemberianobat').innerHTML="";
            var v = document.getElementById('nama_tabpanel').value;
            if ((v == 'undefined')||(v == '0')){
                var url  = '';
                var view = 'viewListPasienWelcome';
            }else{
                var view = v;
            }
            
            console.log("welcome : "+view);
            onCall_listpasien(view, url);
        }

        function tutupdetailpasien() {
            document.getElementById('infopasienirna').style.display = 'none';
            batalubah();

            $("#nmtabpanellistpasien").html('');
            $('#nama_tabpanel').val(0);
            document.getElementById('rmermirna').value          = '';
            document.getElementById('namaermirna').value        = '';
            document.getElementById('unitermirna').value        = '';
            document.getElementById('idKunjunganermirna').value = '';
            document.getElementById('idunitermirna').value      = '';
            document.getElementById('transaksiermirna').value   = '';
            document.getElementById('alamatermirna').value      = '';
            document.getElementById('profilepasienirna').value  = '';
        }

        function bukadetailpasien() {
            document.getElementById('infopasienirna').style.display = 'block';
            ubah();
        }

        function tutupmodallistpasienirna() {
            $('#modallistpasienirna').modal('hide');
            /*  $('.modal-backdrop').hide();
              document.getElementById('infopasienirna').style.display = 'none';*/
        }

        // count_OrderResep();
        setInterval(count_OrderResep, 3600000); // 1 jam
        function count_OrderResep() {
            var param = {
                idfar : user['id_far']
            }
            apiPOST('Apotek/countorderresep', param,hasil=>{
              var a = hasil['data'];
              var nomor = hasil['id'];
              var list = '';

              for (var i = 0; i < a.length; i++) {
                
                /*list += '<div class="dropdown-item p-1">';
                    list += '<div class="media">';
                    list += '<div class="img-notif mt-2">'+a[i]['count']+'</div>'
                        list += '<div class="media-body p-1">';
                            list += '<h3 class="dropdown-item-title">Order Resep';
                            list += '<span class="float-right text-sm text-danger"><i class="far fa-bell"></i></span>';
                            list += '</h3>';
                            //list += "<button class='btn btn-sm btn-primary' onclick='onloadPanel(this, '+"'"+nomor+"'"+')'>Klik Disini</button>";
                            //list += "<button type='button' class='btn btn-xs btn-danger' onclick='onloadPanel(this, '+"'"+nomor+"'"+')' id='onload_panel" + nomor + "' style='width:100%'><i class='fa fa-times'></i></button>";
                            list += '<a href="listeresepRjRiIGD"><b>Penerimaan Order Resep</b></a>';
                            list += '<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>'+a[i]['tglorder']+' '+a[i]['waktu_order']+'</p>';
                        list += '</div>';
                    list += '</div>';
                list += '</div>';*/

                list += '<div class="dropdown-item p-1" onclick="onloadPanel(this, '+"'"+nomor+"'"+')">';
                    list += '<div class="media">';
                        list += '<div class="img-notif mt-2">'+a[i]['count']+'</div>'
                        list += '<div class="media-body p-1">';
                            list += '<a href="#"><b>Penerimaan Order Resep</b></a>';
                            list += '<h3 class="dropdown-item-title">Order Resep Belum Dilayani</h3>';
                            list += '<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>Dari Tgl. '+a[i]['min']+' - '+a[i]['max']+'</p>';
                        list += '</div>';
                    list += '</div>';
                list += '</div>';
                list += '<div class="dropdown-divider"></div>';
              }

              if ((hasil['data'][0].count) > 0){
                document.getElementById('notif_bagde').innerHTML = a.length;
                document.getElementById('notif_bagde').classList.add('animation__wobble');
                list += '<span class="dropdown-item dropdown-header">'+a.length+' Pemberitahuan</span>';
                document.getElementById('notif_orderresep').innerHTML = list;
                // playNotifSound();
              }
              
            });
        }

        function onloadPanel(data, id){
            document.getElementById(id).click();
        }

        //Notifikasi_Link_Bold()

        function Notifikasi_Link_Bold() {
            var audio = document.getElementById("audio_link_bold");
            var param = {
                id_user: user['kd_user']
            };
            apiPOST("Notif/cekAkses", param, hasil => {
                if (hasil['kode'] == 'X') {
                    $(document).ready(function() {
                        setInterval(function() {
                            apiPOST("Notif/getNotif", null, hasil => {
                                var kode = hasil['kode'];
                                if (kode == 'x') {
                                    var a = hasil['data'];
                                    for (var i = 0; i < a.length; i++) {
                                        isi_notif = a[i]['isi_notif'];
                                        toastr.info(isi_notif)
                                        audio.play()
                                        var param = {
                                            id_notif: a[i]['id_notif']
                                        }
                                        apiPOST("Notif/updateNotif", param, hasil => {});
                                    }
                                } else {}
                            });
                        }, 5000);
                    });
                } else {}
            })
        }

        function ubah(){
          done = document.querySelector('#welcome_tabsimrs');
          // done.classList.add('marginTopIrna');

          lap = document.querySelector('#welcome_lapsimrs');
          // lap.classList.add('marginTopLaporan');
        }

        function batalubah(){
          done = document.querySelector('#welcome_tabsimrs');
          // done.classList.remove('marginTopIrna');

          lap = document.querySelector('#welcome_lapsimrs');
          // lap.classList.remove('marginTopLaporan');
        }

        function getname(uniqueName){
            // console.log(uniqueName);
            $('#nama_tabpanel').val(uniqueName);
            myFunction(uniqueName);  
        }

        function myFunction(uniqueName) {
            var html = "";
                html += "<div class='"+uniqueName+"'></div>";
            
            $("#nmtabpanellistpasien").html(html);
            $('#nama_tabpanel').val(uniqueName);
            return ;
        }
        
    </script>
</body>

</html>