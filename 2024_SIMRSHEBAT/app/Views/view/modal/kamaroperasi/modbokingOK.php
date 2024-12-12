<?php
$data = json_decode($_GET['data']);
$no_rm  = str_replace('"', '', json_encode($data->no_rm));
$id_kunjungan  = str_replace('"', '', json_encode($data->id_kunjungan));
$id_transaksi  = str_replace('"', '', json_encode($data->id_transaksi));
$namapasien  = str_replace('"', '', json_encode($data->namapasien));
$alamat  = str_replace('"', '', json_encode($data->alamat));
$umur  = str_replace('"', '', json_encode($data->umur));
$jenkel  = str_replace('"', '', json_encode($data->jenkel));
$id_dokter  = str_replace('"', '', json_encode($data->id_dokter));
$dokter  = str_replace('"', '', json_encode($data->dokter));
$penjamin  = str_replace('"', '', json_encode($data->penjamin));
$id_unit  = str_replace('"', '', json_encode($data->id_unit));
$unit  = str_replace('"', '', json_encode($data->unit));
$id_boking  = str_replace('"', '', json_encode($data->id_boking));
$id_penjamin  = str_replace('"', '', json_encode($data->id_penjamin));
$tindakan  = str_replace('"', '', json_encode($data->tindakan));
$keterangan  = str_replace('"', '', json_encode($data->keterangan));
$id_jenis_bedah  = str_replace('"', '', json_encode($data->id_jenis_bedah));
$id_kamar  = str_replace('"', '', json_encode($data->id_kamar));
$status_boking  = str_replace('"', '', json_encode($data->status_boking));
$id_klasifikasi_bedah  = str_replace('"', '', json_encode($data->id_klasifikasi_bedah));
$pjpasien  = str_replace('"', '', json_encode($data->pjpasien));
$nopjpasien  = str_replace('"', '', json_encode($data->nopjpasien));
$tgl_boking  = str_replace('"', '', json_encode($data->tgl_boking));
?>
<section class="content" id="modListBokingOK">
    <div class="container-fluid h-100">

        <!-- <div class="overlay-wrapper" id="loadingbokingKamarOK1">
                    <div class="overlay dark">
                        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                    </div>
                </div> -->
        <div class="row">
            <div class="col-md-4 col-sm-6 col-12 p-1">
                <div class="info-box mb-0">
                    <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="100">No. RM</td>
                            <td>:</td>
                            <td><input type="text" name="no_rm" class="form-control form-control-xs" id="modListOKnorm" readonly></td>
                        </tr>
                        <tr>
                            <td>Nama Pasien</td>
                            <td>:</td>
                            <td><input type="text" class="form-control form-control-xs" id="modListOKnama" readonly></td>
                        </tr>
                        <tr>
                            <td>Usia</td>
                            <td>:</td>
                            <td><input type="text" class="form-control form-control-xs" id="modJadwalOKUsia" readonly></td>
                        </tr>
                        <tr>
                            <td width="100">Dokter</td>
                            <td>:</td>
                            <td><input type="text" class="form-control form-control-xs" id="modListOKdokter" readonly>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-12 p-1">
                <div class="info-box mb-0">
                    <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="100">Alamat</td>
                            <td>:</td>
                            <td>
                                <input type="text" class="form-control form-control-xs" id="modListOKalamat" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td width="100">Jenis Kelamin</td>
                            <td>:</td>
                            <td>
                                <input type="text" class="form-control form-control-xs" id="modListOKjenkel" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td width="100">Penjamin</td>
                            <td>:</td>
                            <td>
                                <select onchange="gantiListPenjaminOK();" class="form-control form-control-xs" id="modListOKpenjamin"></select>
                            </td>
                        </tr>
                        <tr>
                            <td>No. SEP</td>
                            <td>:</td>
                            <td><input type="text" class="form-control form-control-xs" id="modListOKsep" readonly></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class=" col-md-4 col-sm-6 col-12 p-1">
                <div class="info-box mb-0">
                    <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="100">Unit</td>
                            <td>:</td>
                            <td><input type="text" class="form-control form-control-xs" id="modListOKunit" readonly></td>
                        </tr>
                        <tr>
                            <td>PJ Pasien</td>
                            <td>:</td>
                            <td>
                                <input type="text" class="form-control form-control-xs" id="pjPasienOK" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>No. Hp</td>
                            <td>:</td>
                            <td>
                                <input type="text" class="form-control form-control-xs" id="NoPJpasienOK" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>Id Kunjungan</td>
                            <td>:</td>
                            <td>
                                <input type="text" class="form-control form-control-xs" id="modListOKidkunj" readonly>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="card card-row mt-2">
            <!-- <div class="overlay-wrapper" id="loading2bokingKamarOK">
                        <div class="overlay">
                            <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                        </div>
                    </div> -->
            <div class="card-header p-1 darkgrey-custom">
                <button type="button" class="btn bg-gradient-secondary btn-xs" id="tombolUpdateBokingOK" onclick="updateBokingOK()"><i class="fa fa-save"></i> Simpan</button>
                <button type="button" class="btn btn-xs bg-danger" id="modlistTombolSimpanBedah" onclick="simpanupdatePembedahanOK()"><i class="fa fa-save"></i> Simpan
                </button>
                <button type="button" class="btn btn-xs bg-secondary" id="modlistTombolPrintbedah" onclick="printBedahOK()"><i class="fa fa-print"></i> Print pdf
                </button>
                <button type="button" id="tombolRefresdataBokingkamarOK" class="btn btn-info btn-xs" onclick="btnResetBokingOK()"><i class="fas fa-sync-alt fa-spin"></i> Reset</button>
                <button type="button" id="tombolRefreshPembedahanOK" class="btn btn-info btn-xs" onclick="btnResetBedahOK()"><i class="fas fa-sync-alt fa-spin"></i> Refres Data</button>
                <button type="button" class="btn btn-outline-danger btn-xs" onclick="kembaliKeawalListbokingOK()"><i class="fa fa-arrow-left"></i> Kembali</button>
            </div>
            <div class="modal-body p-1">
                <div class="card-body p-0">
                    <ul class="nav nav-tabs" id="DataPembedahanOK-content-above-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" onclick="tabBookingKamar2();" href="#bookingKamar2" role="tab" aria-selected="true">Booking Kamar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" onclick="tabInputPembedahan2();" href="#inputPembedahan2" role="tab" aria-selected="true">Input Pembedahan</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="DataPembedahanOK-content-above-tabContent">
                        <div class="tab-pane p-0 fade active show" id="bookingKamar2" role="tabpanel">
                            <div class="col-sm-12 p-1" style="max-height: 238px; overflow-x: hidden;">
                                <div class="row mt-1">
                                    <div class="input-group col-sm-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text form-control-xs">Tgl Boking</span>
                                        </div>
                                        <input type="datetime-local" class="form-control form-control-xs" id="modListOKtglBedah">
                                    </div>
                                    <div class="input-group col-sm-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text form-control-xs">Id Boking</span>
                                        </div>
                                        <input class="form-control form-control-xs" id="modListOKidboking" readonly>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="input-group col-sm-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text form-control-xs">Klasifikasi Bedah</span>
                                        </div>
                                        <select class="form-control form-control-xs" id="modListOKklasbedah"></select>
                                    </div>
                                    <div class="input-group col-sm-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text form-control-xs">Jenis Bedah</span>
                                        </div>
                                        <select class="form-control form-control-xs" id="modListOKjenisbedah"></select>
                                    </div>
                                    <div class="input-group col-sm-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text form-control-xs">Kamar Operasi</span>
                                        </div>
                                        <select id="modListOKkamaroprasi" class="form-control form-control-xs">
                                            <option value="">--Pilihan--</option>
                                        </select>
                                    </div>
                                    <div class="input-group col-sm-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text form-control-xs">Status</span>
                                        </div>
                                        <select class="form-control form-control-xs" id="modListOKstatusboking">
                                            <option value="">--Pilihan--</option>
                                            <option value="0">Menunggu</option>
                                            <option value="1">Proses</option>
                                            <option value="2">Selesai</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-sm-6">
                                        <label for="modListOKtindakan">Tindakan/Prosedure</label>
                                        <textarea class="form-control" id="modListOKtindakan"></textarea>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="modListOKket">Keterangan</label>
                                        <textarea class="form-control" id="modListOKket"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane p-0 fade" id="inputPembedahan2" role="tabpanel">
                            <div class="row mt-1">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class="col-form-label">ID </label>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="text" id="modidBedahListOK" class="form-control form-control-xs" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class="col-form-label">Dokter Operator </label>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <select name="dokteroperator" id="modListDOkteroperator" class="form-control form-control-xs">
                                                    <option value="0">UMUM</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col"><button class="btn bg-warning btn-xs" title="Default PJ"><i class="fas fa-undo-alt"></i></button></div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class="col-form-label">Dokter Anestesi </label>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <select name="dokteranestesi" id="modListDokteranestesi" class="form-control form-control-xs select2">
                                                    <option value="0">UMUM</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col"><button class="btn bg-warning btn-xs" title="Default PJ"><i class="fas fa-undo-alt"></i></button></div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class="col-form-label">Perawat Asisten </label>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <select name="perawatasisten1" id="modListPerawatasisten" class="form-control form-control-xs">
                                                    <option value="0">UMUM</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col"><button class="btn bg-warning btn-xs" title="Default PJ"><i class="fas fa-undo-alt"></i></button></div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class="col-form-label">Perawat Instrument</label>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <select name="perawatinstrumenok" id="modListPerawatinstrumen" class="form-control form-control-xs">
                                                    <option value="0">UMUM</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col"><button class="btn bg-warning btn-xs" title="Default PJ"><i class="fas fa-undo-alt"></i></button></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class="col-form-label">Perawat Omloop </label>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <select name="perawatomloop" id="modListPerawatomlop" class="form-control form-control-xs">
                                                    <option value="0">UMUM</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col"><button class="btn bg-warning btn-xs" title="Default PJ"><i class="fas fa-undo-alt"></i></button></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class="col-form-label">Penata Anestesi </label>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <select name="penataanestesi" id="modListPenataanestesi" class="form-control form-control-xs">
                                                    <option value="0">UMUM</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col"><button class="btn bg-warning btn-xs" title="Default PJ"><i class="fas fa-undo-alt"></i></button></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class="col-form-label">Tanggal Pembedahan</label>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input class="form-control form-control-xs" type="datetime-local" id="modListTglawal">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <label class="col-form-label">Sampai</label>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input class="form-control form-control-xs" type="datetime-local" id="modListTglahir">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class="col-form-label">Jenis Anestesi</label>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <select class="form-control form-control-xs" id="modListJenisanestesi">
                                                    <option value="0">--Pilih--</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class="col-form-label">ICD 10 Pra Bedah
                                            </label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <textarea class="form-control" id="modListIcdprabedah"></textarea>
                                                <div id="modListDivIcdPrabedah"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class="col-form-label">Diagnosis Klinis Pra Bedah
                                            </label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea name="" class="form-control" id="modListdiagPrabedah"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class="col-form-label">Tindakan Medis
                                            </label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea name="" class="form-control" id="modListTindakanMedis"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class="col-form-label">Kegiatan RL Pembedahan</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <button type="btn" id="modListAddRLok" onclick="modListAddRLok();" class="btn btn-xs bg-info" title="Tambah RL"><i class="fas fa-plus"></i> Tambah</button>
                                                <textarea class="form-control" id="modListKegiatanRLbedahOK"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header" style="background-color:black;">
                                            <h3 class="card-title" style="color:white;">Input Tindakan</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="col-sm-12 p-1" style="max-height: 238px; overflow-x: hidden;">
                                                <div class="row mt-1">
                                                    <div class="input-group col-sm-4">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text form-control-xs">Kode/Nama Produk</span>
                                                        </div>
                                                        <input type="text" class="form-control form-control-xs" id="modListbokingOKnourut" disabled hidden>
                                                        <input type="text" class="form-control form-control-xs" id="modListbokingOKidprd" disabled hidden>
                                                        <!-- <input type="text" class="form-control form-control-xs" id="modListbokingOKidtarif" disabled>
                                                        <input type="text" class="form-control form-control-xs" id="modListbokingOKharga" disabled> -->
                                                        <input type="text" id="modListnamaProdukTindakanOK" class="form-control form-control-xs" placeholder="Masukan Kode Atau Nama">
                                                    </div>
                                                    <div class="input-group col-sm-2">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text form-control-xs">Banyak</span>
                                                        </div>
                                                        <input type="number" id="modListbokingQtyOK" class="form-control form-control-xs">
                                                    </div>
                                                    <div class="input-group col-sm-4">
                                                        <button type="button" class="btn btn-primary btn-xs" id="modListbokingOkcekproduk"><i class="fa fa-check"></i></button>&nbsp;
                                                        <button type="button" onclick="addnewProdukTindakanOK();" id="modListtombolSimpanTindakanOK" class="btn btn-xs bg-info"><i class="fas fa-file"></i> Simpan</button>&nbsp;
                                                        <button type="button" onclick="tambahInputProdukbaruOK();" id="modListtombolTambahprodukbaruOK" class="btn btn-xs bg-secondary"><i class="fas fa-plus"></i> Tambah Produk</button>
                                                    </div>
                                                </div>
                                                <div class="row" id="DivrowTableinputprodukbaruOK">
                                                    <div class="col">
                                                        <table id="modListbokingOKtableproduk" class="table table-striped table-sm choose">
                                                            <thead>
                                                                <tr>
                                                                    <th width="20">No</th>
                                                                    <th width="60">Act</th>
                                                                    <th width="60">ID</th>
                                                                    <th>Nama Produk</th>
                                                                    <th width="100">Banyak</th>
                                                                    <th width="100">Harga</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody></tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="row" id="DivrowTableListinputProduklamaOK">
                                                    <div class="col">
                                                        <table id="modListbokingOKtableprodukLama" class="table table-striped table-sm choose">
                                                            <thead>
                                                                <tr>
                                                                    <th width="20">No</th>
                                                                    <th width="30">Act</th>
                                                                    <th width="60">ID</th>
                                                                    <th>Nama Produk</th>
                                                                    <th width="100">Banyak</th>
                                                                    <th width="100">Harga</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody></tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer p-1">
                                            <div class="input-group" style="justify-content: right; font-weight: bold;">
                                                <h4 hidden>Rp.&nbsp;</h4>
                                                <h4 id="hargaTotalListProdukOK" name="hargaTotalListProdukOK" hidden></h4>
                                            </div>
                                        </div>
                                        <input type="text" value="0" id="ListHargaProdukOK" disabled hidden>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header" style="background-color:black;">
                                            <h3 class="card-title" style="color:white;">Uraian Pembedahan</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body" style="max-height: 500px; overflow: auto;">
                                            <div class="info-box">
                                                <div class="col-md-8">
                                                    <textarea id="modListisiPedomanOK" class="form-control"></textarea>
                                                </div>
                                                <div class="col-md-1"></div>
                                                <div class="col-md-3">
                                                    <h6 class="text-center weight-bold">Dokter Penanggungjawab</h6>
                                                    <input type="text" class="form-control form-control-xs text-center" id="modListDokterPj" disabled>
                                                    <h6 class="text-center">Nama & Tanda Tangan</h6>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-xs bg-info" onclick="TambahPedomanOK2();"><i class="fa fa-edit"></i> Pedoman</button>
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
</section>
<div class="content modal fade" id="modalTambahprodukBaruOK">
    <div class="container-fluid ">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="overflow: auto;">
                <div class="modal-body p-1">
                    <div class="row">
                        <div class="col-sm-11 input-group">
                            <h4>Data Produk OK</h4>
                        </div>
                        <div class="col-sm-1">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    </div>
                    <div class="p-1">
                        <table id="tableModtambahprodukbaruOK" class="table table-striped table-sm choose tableData">
                            <thead>
                                <tr>
                                    <th width="40px">No</th>
                                    <th width="40px">ID</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
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
<script src="<?= base_url('_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js') ?>"></script>
<script>
    var no_rm = '<?php echo $no_rm; ?>';
    var nama = '<?php echo $namapasien; ?>';
    var alamat = '<?php echo $alamat; ?>';
    var umur = '<?php echo $umur; ?>';
    var jenkel = '<?php echo $jenkel; ?>';
    var dokter = '<?php echo $dokter; ?>';
    var penjamin = '<?php echo $penjamin; ?>';
    var unit = '<?php echo $unit; ?>';
    var id_boking = '<?php echo $id_boking; ?>';
    var id_penjamin = '<?php echo $id_penjamin; ?>';
    var tindakan = '<?php echo $tindakan; ?>';
    var keterangan = '<?php echo $keterangan; ?>';
    var id_jenis_bedah = '<?php echo $id_jenis_bedah; ?>';
    var id_kamar = '<?php echo $id_kamar; ?>';
    var status_boking = '<?php echo $status_boking; ?>';
    var nosjp = [];
    var paramIdPenjaminnosjp = ['id_penjamin', 'no_sjp', 'no_sjp'];
    var id_transaksi = "<?php echo $id_transaksi; ?>";
    var id_kunjungan = "<?php echo $id_kunjungan; ?>";
    var id_unit = "<?php echo $id_unit; ?>";
    var id_dokter = "<?php echo $id_dokter; ?>";
    var id_klasifikasi_bedah = "<?php echo $id_klasifikasi_bedah; ?>";
    var pjpasien = "<?php echo $pjpasien; ?>";
    var nopjpasien = "<?php echo $nopjpasien; ?>";
    var tgl_boking = "<?php echo $tgl_boking; ?>";

    document.getElementById('modListOKnorm').value = no_rm;
    document.getElementById('modListOKnama').value = nama;
    document.getElementById('modListOKalamat').value = alamat;
    document.getElementById('modJadwalOKUsia').value = umur;
    document.getElementById('modListOKdokter').value = dokter;
    // document.getElementById('modListOKnokartu').value = nokartu;
    document.getElementById('modListOKidkunj').value = id_kunjungan;
    document.getElementById('modListOKunit').value = unit;
    document.getElementById('modListOKidboking').value = id_boking;
    document.getElementById('modListOKtindakan').value = tindakan;
    document.getElementById('modListOKket').value = keterangan;
    document.getElementById('modListOKstatusboking').value = status_boking;
    document.getElementById('pjPasienOK').value = pjpasien;
    document.getElementById('NoPJpasienOK').value = nopjpasien;
    document.getElementById('modListOKtglBedah').value = tgl_boking;
    document.getElementById('modListDokterPj').value = dokter;

    // document.getElementById('modListOKkamaroprasi').value = id_kamar;

    if (jenkel == 't') {
        document.getElementById('modListOKjenkel').value = 'Laki-laki';
    } else {
        document.getElementById('modListOKjenkel').value = 'Perempuan';
    }

    document.getElementById('modlistTombolSimpanBedah').style.display = 'none';
    document.getElementById('modlistTombolPrintbedah').style.display = 'none';
    document.getElementById('tombolRefreshPembedahanOK').style.display = 'none';

    modPenataJasaOKaddProduk();
    getListProdukOK();
    getListPenjaminOK();

    function getListPenjaminOK() {
        var param = {
            id_transaksi: id_transaksi
        }
        apiPOST('Kamaroperasi/getpenjaminOK', param, hasil => {
            var data = hasil['data'];
            if (hasil !== null) {
                nosjp = hasil['data'];
                var opsi = document.getElementById('modListOKpenjamin');
                nosjp.forEach(baru => {
                    var option = document.createElement('option');
                    option.value = baru['id_penjamin'];
                    option.innerHTML = baru['nama_penjamin'];
                    opsi.appendChild(option);
                });
                if (nosjp.length > 1) {
                    var penjamin = document.getElementById("modListOKpenjamin");
                    penjamin.focus();
                    toastr.info("Penjamin Pasien Lebih dari 1!!");
                }
            }
            gantiListPenjaminOK();
        });
    }

    function gantiListPenjaminOK() {
        optionChildByParent(nosjp, 'modListOKpenjamin', 'modListOKsep', paramIdPenjaminnosjp);
    }

    kamarOK2();

    function kamarOK2() {
        apiPOST('Kamaroperasi/kamarOK', null, hasil => {
            var data = hasil['data'];
            var opsi = document.getElementById('modListOKkamaroprasi');
            data.forEach(baru => {
                var option = document.createElement('option');
                option.value = baru['id_kamar_ok'];
                option.innerHTML = baru['nama_kamar_ok'];
                opsi.appendChild(option);
            });
            document.getElementById('modListOKkamaroprasi').value = id_kamar;
        });
    }

    $(document).on('keyup', '#modListIcdprabedah', function(e) {
        console.log($(this).val())
        if ($(this).val() !== '') {
            icdPrabedah();
        } else {
            document.getElementById('modListDivIcdPrabedah').innerHTML = "";
        }
    });

    function icdPrabedah() {
        var param = {
            id: document.getElementById("modListIcdprabedah").value,
        };
        apiPOST('Kunjungan/icd', param, hasil => {
            var a = hasil['icd'];
            var b = '';
            for (var i = 0; i < a.length; i++) {
                b += '<button class="btn btn-primary" onclick="pilihIcdOK(`' + a[i]['penyakit'] + '`)">' + a[i]['penyakit'] + '</button>';
            }
            document.getElementById('modListDivIcdPrabedah').innerHTML = b;
        });
    }

    function pilihIcdOK(kode) {
        document.getElementById("modListIcdprabedah").value = kode;
        document.getElementById('modListDivIcdPrabedah').innerHTML = "";
    }

    jenisBedahListOK();

    function jenisBedahListOK() {
        apiPOST('Kamaroperasi/jenisbedah', null, hasil => {
            var data = hasil['data'];
            var opsi = document.getElementById('modListOKjenisbedah');
            data.forEach(baru => {
                var option = document.createElement('option');
                option.value = baru['id_jenis_bedah'];
                option.innerHTML = baru['jenis_bedah'];
                opsi.appendChild(option);
            });
            document.getElementById('modListOKjenisbedah').value = id_jenis_bedah;
        });
    }

    klasifikasiListOK();

    function klasifikasiListOK() {
        apiPOST('Kamaroperasi/klasifikasibedah', null, hasil => {
            var data = hasil['data'];
            var opsi = document.getElementById('modListOKklasbedah');
            data.forEach(baru => {
                var option = document.createElement('option');
                option.value = baru['id_klasifikasi_bedah'];
                option.innerHTML = baru['klasifikasi_bedah'];
                opsi.appendChild(option);
            });
            document.getElementById('modListOKklasbedah').value = id_klasifikasi_bedah;
        });
    }


    function tabBookingKamar2() {
        $('#tombolUpdateBokingOK').show();
        $('#tombolRefresdataBokingkamarOK').show();
        $('#modlistTombolSimpanBedah').hide();
        $('#modlistTombolPrintbedah').hide();
        $('#tombolRefreshPembedahanOK').hide();
    }

    function tabInputPembedahan2() {
        $('#tombolUpdateBokingOK').hide();
        $('#tombolRefresdataBokingkamarOK').hide();
        $('#modlistTombolSimpanBedah').show();
        $('#modlistTombolPrintbedah').show();
        $('#tombolRefreshPembedahanOK').show();
    }

    jenisAnestesi1();

    function jenisAnestesi1() {
        apiPOST('Kamaroperasi/jenisanestesi', null, hasil => {
            var data = hasil['data'];
            var opsi = document.getElementById('modListJenisanestesi');
            data.forEach(baru => {
                var option = document.createElement('option');
                option.value = baru['id_jenis_anestesi'];
                option.innerHTML = baru['jenis_anestesi'];
                opsi.appendChild(option);
            });
        });
    }

    getDatadokter();

    function getDatadokter() {
        var param = {
            id_kunjungan: id_kunjungan,
            // id_bedah: document.getElementById('modidBedahListOK').value,
        }
        apiPOST('Kamaroperasi/getDatadokter', param, hasil => {
            if (hasil['code'] == "00") {
                var a = hasil['data'];
                // console.log(a)
                if (a !== null || a !== '') {
                    for (var i = 0; i < a.length; i++) {
                        document.getElementById('modListDOkteroperator').value = a[i]['dokter_operator'];
                        document.getElementById('modListDokteranestesi').value = a[i]['dokter_anestesi'];
                        document.getElementById('modListPerawatasisten').value = a[i]['perawat_asiten'];
                        document.getElementById('modListPerawatinstrumen').value = a[i]['perawat_instrumen'];
                        document.getElementById('modListPerawatomlop').value = a[i]['perawat_omlop'];
                        document.getElementById('modListPenataanestesi').value = a[i]['penata_anestesi'];
                    }
                } else {
                    document.getElementById('modListDOkteroperator').value = 0;
                    document.getElementById('modListDokteranestesi').value = 0;
                    document.getElementById('modListPerawatasisten').value = 0;
                    document.getElementById('modListPerawatinstrumen').value = 0;
                    document.getElementById('modListPerawatomlop').value = 0;
                    document.getElementById('modListPenataanestesi').value = 0;
                }
            }
        })
    }

    dokterOperator2();

    function dokterOperator2() {
        apiPOST('Kamaroperasi/dokterOperator', null, hasil => {
            var data = hasil['data'];
            var opsi = document.getElementById('modListDOkteroperator');
            data.forEach(baru => {
                var option = document.createElement('option');
                option.value = baru['id_pegawai'];
                option.innerHTML = baru['nama_pegawai'];
                opsi.appendChild(option);
            });
        });
    }

    dokterAnestesi2();

    function dokterAnestesi2() {
        apiPOST('Kamaroperasi/dokterAnestesi', null, hasil => {
            var data = hasil['data'];
            var opsi = document.getElementById('modListDokteranestesi');
            data.forEach(baru => {
                var option = document.createElement('option');
                option.value = baru['id_pegawai'];
                option.innerHTML = baru['nama_pegawai'];
                opsi.appendChild(option);
            });
        });
    }

    perawatAsisten2();

    function perawatAsisten2() {
        apiPOST('Kamaroperasi/perawatAsisten', null, hasil => {
            var data = hasil['data'];
            var opsi = document.getElementById('modListPerawatasisten');
            data.forEach(baru => {
                var option = document.createElement('option');
                option.value = baru['id_pegawai'];
                option.innerHTML = baru['nama_pegawai'];
                opsi.appendChild(option);
            });
        });
    }

    perawatInstrumenOK2();

    function perawatInstrumenOK2() {
        apiPOST('Kamaroperasi/perawatInstrumen', null, hasil => {
            var data = hasil['data'];
            var opsi = document.getElementById('modListPerawatinstrumen');
            data.forEach(baru => {
                var option = document.createElement('option');
                option.value = baru['id_pegawai'];
                option.innerHTML = baru['nama_pegawai'];
                opsi.appendChild(option);
            });
        });
    }

    perawatOmloop2();

    function perawatOmloop2() {
        apiPOST('Kamaroperasi/perawatOmloop', null, hasil => {
            var data = hasil['data'];
            var opsi = document.getElementById('modListPerawatomlop');
            data.forEach(baru => {
                var option = document.createElement('option');
                option.value = baru['id_pegawai'];
                option.innerHTML = baru['nama_pegawai'];
                opsi.appendChild(option);
            });
        });
    }

    penataAnestesi2();

    function penataAnestesi2() {
        apiPOST('Kamaroperasi/penataAnestesi', null, hasil => {
            var data = hasil['data'];
            var opsi = document.getElementById('modListPenataanestesi');
            data.forEach(baru => {
                var option = document.createElement('option');
                option.value = baru['id_pegawai'];
                option.innerHTML = baru['nama_pegawai'];
                opsi.appendChild(option);
            });
        });
    }

    listPembedahanOK();

    function listPembedahanOK() {
        var param = {
            id_kunjungan: id_kunjungan
        }
        apiPOST('Kamaroperasi/getListpembedahan', param, hasil => {
            if (hasil['code'] == 'XX') {
                toastr.error('Belum Input Pembedahan!!');
                var now = new Date();
                now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
                document.getElementById('modListTglawal').value = now.toISOString().slice(0, 16);
                document.getElementById('modListTglahir').value = now.toISOString().slice(0, 16);
                document.getElementById('modListDOkteroperator').value = id_dokter;
            } else {
                var a = hasil['data'];
                for (var i = 0; i < a.length; i++) {
                    var idBedah = a[i]['id_bedah'];
                    var dokter_operator = a[i]['dokter_operator'];
                    var dokter_anestesi = a[i]['dokter_anestesi'];
                    var perawat_asiten = a[i]['perawat_asiten'];
                    var perawat_instrumen = a[i]['perawat_instrumen'];
                    var perawat_omlop = a[i]['perawat_omlop'];
                    var penata_anestesi = a[i]['penata_anestesi'];
                    var tglAwal = a[i]['tgl_awal_bedah'];
                    var tglAhir = a[i]['tgl_ahir_bedah'];
                    var rlBedah = a[i]['rl_pembedahan'];
                    var idJenisAnestesi = a[i]['id_jenis_anestesi'];
                    var rlPembedahan = a[i]['rl_pembedahan'];
                    var icdPrabedah = a[i]['icd_pra_bedah'];
                    var diagPrabedah = a[i]['diagnosis_pra_bedah'];
                    var tindakanMedis = a[i]['tindakan_medis'];

                    document.getElementById('modListDOkteroperator').value = dokter_operator;
                    document.getElementById('modListDokteranestesi').value = dokter_anestesi;
                    document.getElementById('modListPerawatasisten').value = perawat_asiten;
                    document.getElementById('modListPerawatinstrumen').value = perawat_instrumen;
                    document.getElementById('modListPerawatomlop').value = perawat_omlop;
                    document.getElementById('modListPenataanestesi').value = penata_anestesi;
                    document.getElementById('modListTglawal').value = tglAwal;
                    document.getElementById('modListTglahir').value = tglAhir;
                    document.getElementById('modListJenisanestesi').value = idJenisAnestesi;
                    document.getElementById('modListIcdprabedah').value = icdPrabedah;
                    document.getElementById('modListdiagPrabedah').value = diagPrabedah;
                    document.getElementById('modListTindakanMedis').value = tindakanMedis;
                    document.getElementById('modListKegiatanRLbedahOK').value = rlBedah;
                    document.getElementById('modidBedahListOK').value = idBedah;
                    // getDatadokter(idBedah);
                }
            }
        });
    }

    function updateBokingOK() {
        var param = {
            id_boking: id_boking,
            id_kunjungan: id_kunjungan,
            id_unit: id_unit,
            id_pegawai: id_dokter,
            tglboking: document.getElementById('modListOKtglBedah').value,
            klasifikasi: document.getElementById('modListOKklasbedah').value,
            jenis_bedah: document.getElementById('modListOKjenisbedah').value,
            kamar: document.getElementById('modListOKkamaroprasi').value,
            statusboking: document.getElementById('modListOKstatusboking').value,
            tindakan: document.getElementById('modListOKtindakan').value,
            ket: document.getElementById('modListOKket').value,
        }
        // console.log(param)
        apiPOST('Kamaroperasi/simpanBookingOK', param, hasil => {})
    }

    function simpanupdatePembedahanOK() {
        var param = {
            id_bedah: document.getElementById('modidBedahListOK').value,
            id_kunjungan: id_kunjungan,
            dokterOperator: document.getElementById('modListDOkteroperator').value,
            dokterAnestesi: document.getElementById('modListDokteranestesi').value,
            perawatAsisten: document.getElementById('modListPerawatasisten').value,
            perawatInstrumen: document.getElementById('modListPerawatinstrumen').value,
            perawatOmloop: document.getElementById('modListPerawatomlop').value,
            penataAnestesi: document.getElementById('modListPenataanestesi').value,
            tglBedahAwal: document.getElementById('modListTglawal').value,
            tglBedahAhir: document.getElementById('modListTglahir').value,
            jenisAnestesi: document.getElementById('modListJenisanestesi').value,
            rlBedah: $('#modListKegiatanRLbedahOK').val(),
            icdPrabedah: $('#modListIcdprabedah').val(),
            diagPrabedah: $('#modListdiagPrabedah').val(),
            tindakanOK: $('#modListTindakanMedis').val(),

        }
        // console.log(param);
        apiPOST('Kamaroperasi/simpanPembedahanOK', param, hasil => {
            if (hasil !== null) {
                var a = hasil['data'];
                for (i = 0; i < a.length; i++) {
                    document.getElementById('modidBedahListOK').value = a[i].id_bedah;
                }
            } else {
                document.getElementById('modidBedahListOK').value = '';
            }
        })
    }
    document.getElementById('DivrowTableinputprodukbaruOK').style.display = 'none';

    function tambahInputProdukbaruOK() {
        $("#modalTambahprodukBaruOK").modal({
            backdrop: "static"
        });
        $('#modalTambahprodukBaruOK').on('shown.bs.modal', function() {});
        var param = {
            id_penjamin: id_penjamin
        }
        apiPOST('Kamaroperasi/getOkproduk', param, hasil => {
            if (hasil !== null) {
                $('#tableModtambahprodukbaruOK tbody').html('')
                var a = hasil['data'];
                var Baris = '';
                var no = 1;
                for (var i = 0; i < a.length; i++) {
                    // var kodeProdukOK1 = [a[i]['id_produk'], a[i]['harga'], a[i]['id_tarif'], a[i]['id_jenis_produk']]
                    var kodeProdukOK = a[i].id_produk;
                    var nmBarangOK = a[i].nama_produk + '||' + a[i].kd_produk;
                    var harga = a[i].harga;
                    var idTarifOK = a[i].id_tarif;
                    Baris += '<tr onclick="tambahProdukbaruOKkeform(' + "'" + kodeProdukOK + "','" + nmBarangOK + "','" + harga + "','" + idTarifOK + "'" + ');">';
                    Baris += '<td>' + no++ + '</td>';
                    Baris += '<td>' + kodeProdukOK + '</td>';
                    Baris += '<td>' + nmBarangOK + '</td>';
                    Baris += '<td>' + harga + '</td>';
                    Baris += '</tr>';
                }
                $('#tableModtambahprodukbaruOK tbody').append(Baris);
                $('.tableData').dataTable({
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "bDestroy": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            }
        })
    }

    function tambahProdukbaruOKkeform(kodeProdukOK, nmBarangOK, harga, idTarifOK) {
        // document.getElementById('modListbokingOKidprd').value = kodeProdukOK;
        // document.getElementById('modListbokingOKharga').value = harga;
        // document.getElementById('modListbokingOKidtarif').value = idTarifOK;
        // document.getElementById('modListnamaProdukTindakanOK').value = nmBarangOK;
        var qty = 1;
        tampilkanListinputProdukOK(kodeProdukOK, nmBarangOK, qty, harga, idTarifOK);
        document.getElementById('DivrowTableinputprodukbaruOK').style.display = 'block';
        kosongInputListProdukOK();
        $('#modalTambahprodukBaruOK').modal('hide');
        $('.modal-backdrop').hide();
        sessionStorage.clear();
    }

    function modPenataJasaOKaddProduk() {
        var param = {
            // id_unit: id_unit,
            id_penjamin: id_penjamin
        };

        produkOK = new AutoComplete("modListnamaProdukTindakanOK");
        apiPOST('Kamaroperasi/getOkproduk', param, hasil => {
            if (hasil !== null) {
                var list = hasil['data'];
                list.forEach(baru => {
                    produkOK.addData([baru['id_produk'], baru['harga'], baru['id_tarif'], baru['id_jenis_produk']], baru['nama_produk'] + '||' + baru['kd_produk']);
                });
            }
        });
    }

    function getListProdukOK() {
        $("#modListnamaProdukTindakanOK").on("keyup", function(event) {

            if (event.keyCode == 13) {
                $("#modListbokingQtyOK").trigger('focus');
                $("#modListbokingQtyOK").val(1);
            }
        });
        $("#modListbokingQtyOK").on("keyup", function(event) {
            if (event.keyCode == 13) {
                var kodeProdukOK = produkOK.getValue()[0];
                var harga = produkOK.getValue()[1];
                var idTarifOK = produkOK.getValue()[2];
                // var idJenisProdOK = produkOK.getValue()[3];
                // var idJenisComp = produkOK.getValue()[3];
                var nmBarangOK = document.getElementById("modListnamaProdukTindakanOK").value;
                var cekqty = document.getElementById("modListbokingQtyOK").value;
                if (cekqty != '') {
                    var qty = cekqty;
                } else {
                    var qty = '0';
                }
                if (kodeProdukOK != null) {
                    if ((qty != '0') || (qty != '')) {
                        document.getElementById('DivrowTableinputprodukbaruOK').style.display = 'block';
                        tampilkanListinputProdukOK(kodeProdukOK, nmBarangOK, qty, harga, idTarifOK);
                        kosongInputListProdukOK();
                    } else {
                        toastr.error("Inputan Masih Kosong!!");
                    }
                } else {
                    toastr.error("Nama Produk tidak ditemukan!!");
                    kosongInputListProdukOK();
                }
                // console.log(idTarifOK)
            }
        });

        $("#modListbokingOkcekproduk").click(function(event) {
            var kodeProdukOK = produkOK.getValue()[0];
            var harga = produkOK.getValue()[1];
            var idTarifOK = produkOK.getValue()[2];
            var nmBarangOK = document.getElementById("modListnamaProdukTindakanOK").value;
            var cekqty = document.getElementById("modListbokingQtyOK").value;
            if (cekqty != '') {
                var qty = cekqty;
            } else {
                var qty = '0';
            }
            if (kodeProdukOK != null) {
                if ((qty != '0') || (qty != '')) {
                    document.getElementById('DivrowTableinputprodukbaruOK').style.display = 'block';
                    tampilkanListinputProdukOK(kodeProdukOK, nmBarangOK, qty, harga, idTarifOK);
                    kosongInputListProdukOK();
                } else {
                    toastr.error("Inputan Masih Kosong!!");
                }
            } else {
                toastr.error("Nama Produk tidak ditemukan!!");
                kosongInputListProdukOK();
            }
        });
    }

    // $("#tombolTambahBaruProdukOK").click(function(event) {
    //     kosongInputListProdukOK();
    // });

    function tampilkanListinputProdukOK(kodeProdukOK, nmBarangOK, qty, harga, idTarifOK) {
        var nomor = $('#modListbokingOKtableproduk tbody tr').length + 1;
        var Baris = '';
        Baris += "<tr>";
        Baris += "<td class='pl-0'>";
        Baris += "<input style='text-align:center;' type='text' class='form-control form-control-xs' name='penataJasaOKnourut[]' value='" + nomor + "' disabled>";
        Baris += "</td>";
        Baris += "<td style='display: flex;'><button type='button' class='btn btn-xs btn-danger' onclick='hapusListProdukOK(this, " + nomor + ")' id='hapusListProdukOK" + nomor + "' style='width:100%'><i class='fa fa-times'></i></button><button type='button' class='btn btn-xs btn-outline-warning' onclick='editListProdukOK(this, " + nomor + ")' id='editListProdukOK" + nomor + "' style='width:100%'><i class='fa fa-edit'></i></button></td>";
        Baris += "<td>";
        Baris += "<input type='text' class='form-control form-control-xs' name='modPenataJasaOKkodeProduk[]' value='" + kodeProdukOK + "' disabled>";
        Baris += "</td>";
        Baris += "<td>";
        Baris += "<input type='text' class='form-control form-control-xs' name='modPenataJasaOKnamaProduk[]' value='" + nmBarangOK + "' disabled>";
        Baris += "</td>";
        Baris += "<td>";
        Baris += "<input type='text' class='form-control form-control-xs' name='modPenataJasaOKQty[]' value='" + qty + "' disabled>";
        Baris += "</td>";
        Baris += "<td>";
        Baris += "<input type='text' class='form-control form-control-xs' name='hargaSatuanProdukOK[]' value='" + format_ribuan(parseInt(harga)) + "' disabled>";
        Baris += "</td>";
        Baris += "<td class='pl-0'>";
        Baris += "<input style='text-align:center;' type='text' class='form-control form-control-xs' name='idTarifprodukOK[]' value='" + idTarifOK + "' disabled hidden>";
        Baris += "</td>";
        Baris += "<td style='display:none;'>";
        Baris += "</td>";
        Baris += "</tr>";

        var getKodeBrg = document.getElementsByName('modPenataJasaOKkodeProduk[]');
        var jmlProdukOK = $('#modListbokingOKtableproduk tbody tr').length;
        let total = 0;
        const data = [];

        for (var i = 0, iLen = jmlProdukOK; i < iLen; i++) {
            var datax = {};
            datax.kodeProdukOK = getKodeBrg[i].value;
            data.push(datax);
        }

        const cekKodeprdOK = data.map(el => el.kodeProdukOK);
        const statusKodePrdOK = cekKodeprdOK.includes(kodeProdukOK);

        if (statusKodePrdOK == false) {
            $('#modListbokingOKtableproduk tbody').append(Baris);

            document.getElementById("hargaTotalListProdukOK").innerHTML = format_ribuan(total);

            var totalx = document.getElementById("ListHargaProdukOK").value;
            total = parseInt(totalx) + (parseInt(qty) * parseInt(harga));
            document.getElementById("ListHargaProdukOK").value = total;
            document.getElementById("hargaTotalListProdukOK").innerHTML = format_ribuan(total);

        } else {
            var urut = document.getElementById("modListbokingOKnourut").value;
            if (urut != '') {
                $('#modListbokingOKtableproduk tbody').append(Baris);

                var totalx = document.getElementById("ListHargaProdukOK").value;
                total = parseInt(totalx) + (parseInt(qty) * parseInt(harga));
                document.getElementById("ListHargaProdukOK").value = total;
                document.getElementById("hargaTotalListProdukOK").innerHTML = format_ribuan(total);

                var hapusrow = document.getElementById("hapusListProdukOK" + urut);
                hapusrow.click();
            } else {
                toastr.error("Produk Sudah Diinputkan!!");
            }
        }
    }

    // function tampilkanListProdukLamaOK(kodeProdukOKold, nmBarangOKold, qtyold, hargaold, idTarifOKold) {
    //     var nomor = $('#modListbokingOKtableprodukLama tbody tr').length + 1;

    // }

    function kosongInputListProdukOK() {
        document.getElementById("modListnamaProdukTindakanOK").disabled = false;
        $("#modListnamaProdukTindakanOK").trigger('focus');
        document.getElementById("modListbokingOKnourut").value = '';
        document.getElementById("modListnamaProdukTindakanOK").value = '';
        document.getElementById("modListbokingQtyOK").value = '';
        // document.getElementById("ListHargaProdukOK").value = '';
    }

    function editListProdukOK(btn, nomor) {

        var kodeProdukOK = document.getElementById("modListbokingOKtableproduk").rows[nomor].cells[2].firstChild.value;
        var nmBarangOK = document.getElementById("modListbokingOKtableproduk").rows[nomor].cells[3].firstChild.value;
        var qty = document.getElementById("modListbokingOKtableproduk").rows[nomor].cells[4].firstChild.value;

        $("#modListbokingQtyOK").trigger('focus');

        produkOK.setValue(nmBarangOK);
        document.getElementById("modListbokingOKnourut").value = nomor;
        document.getElementById("modListnamaProdukTindakanOK").disabled = true;
        document.getElementById("modListbokingQtyOK").value = qty;
    }

    function hapusListProdukOK(btn, nomor) {
        document.getElementById("modListbokingOKnourut").value = '';
        var row = btn.parentNode.parentNode;

        let total = 0;
        var qty = document.getElementById("modListbokingOKtableproduk").rows[nomor].cells[4].firstChild.value;
        var harga = document.getElementById("modListbokingOKtableproduk").rows[nomor].cells[5].firstChild.value;
        var totalx = document.getElementById("ListHargaProdukOK").value;
        total = parseInt(totalx) - (parseInt(qty) * parseInt(harga));
        document.getElementById("ListHargaProdukOK").value = total;
        document.getElementById("hargaTotalListProdukOK").innerHTML = format_ribuan(total);

        row.parentNode.removeChild(row);
        var no = 1;
        $('#modListbokingOKtableproduk tbody tr').each(function() {
            $(this).find('td:nth-child(1)').html("<input style='text-align:center;' type='text' class='form-control form-control-xs' name='penataJasaOKnourut[]' value='" + no + "' disabled>");
            $(this).find('td:nth-child(2)').html("<button type='button' class='btn btn-xs btn-danger' onclick='hapusListProdukOK(this, " + no + ")' id='hapusListProdukOK" + no + "' style='width:100%'><i class='fa fa-times'></i></button><button type='button' class='btn btn-xs btn-outline-warning' onclick='editListProdukOK(this, " + no + ")' id='editListProdukOK" + no + "' style='width:100%'><i class='fa fa-edit'></i></button>");
            no++;
        });
    }

    function paramsPenataJasaOK() {
        var id_tarif = document.getElementsByName('idTarifprodukOK[]');
        var getKDprd = document.getElementsByName('modPenataJasaOKkodeProduk[]');
        var get_Qty = document.getElementsByName('modPenataJasaOKQty[]');
        var getHargaSatuan = document.getElementsByName('hargaSatuanProdukOK[]');
        var geturut = document.getElementsByName('penataJasaOKnourut[]');
        var count = $('#modListbokingOKtableproduk tbody tr').length;

        var params = {};
        params.data = [];
        for (var i = 0, iLen = count; i < iLen; i++) {
            var x = {};
            x.id_tarif = id_tarif[i].value;
            x.kd_prd = getKDprd[i].value;
            x.qty = get_Qty[i].value;
            x.hrg_beli = getHargaSatuan[i].value;
            if (typeof(geturut[i].value) !== 'undefined') {
                x.urut = geturut[i].value;
            } else {
                x.urut = "";
            }

            console.log(params.data);
            params.data.push(x);
        }
        return params.data;
    }

    function addnewProdukTindakanOK() {
        pertanyaan.fire({
            title: 'Simpan Data Produk',
            html: '<span>Entry Data Produk Sudah Benar? Produk Akan Disimpan!!</span>',
            icon: 'question',
            showCancelButton: true,
            reverseButtons: false,
            allowOutsideClick: false
        }).then((result) => {
            if (result.isConfirmed) {
                var param = {
                    id_transaksi: id_transaksi,
                    id_kunjungan: id_kunjungan,
                    data: paramsPenataJasaOK(),
                    count: paramsPenataJasaOK().length,
                };
                apiPOST('Kamaroperasi/penatajasaOK_simpanProduk', param, hasil => {
                    if (hasil['data'] !== '') {
                        document.getElementById('DivrowTableinputprodukbaruOK').style.display = 'none';
                        getProdukLamaOK();
                    }
                });
                // sessionStorage.clear();
            } else if (result.dismiss === Swal.DismissReason.cancel) {

            }
        });
    }

    function tampilkanListProdukLamaOK(id_detail_kunjungan, kodeProdukOKold, nmBarangOKold, qtyold, hargaold, idTarifOKold) {
        var Baris = '';
        var Nomor = $('#modListbokingOKtableprodukLama tbody tr').length + 1;
        Baris += "<tr>";
        Baris += "<td class='pl-0'>";
        Baris += "<input type='text' class='form-control form-control-xs' value='" + Nomor + "' disabled>";
        Baris += "</td>";
        Baris += "<td style='display: flex;'><button type='button' class='btn btn-xs btn-outline-danger' id='hapusListprodLamaOK" + Nomor + "'><i class='fa fa-trash'></i></button></td>";
        Baris += "<td>";
        Baris += "<input type='text' class='form-control form-control-xs' name='modPenataJasaOKkodeProduk[]' value='" + kodeProdukOKold + "' disabled>";
        Baris += "</td>";
        Baris += "<td>";
        Baris += "<input type='text' class='form-control form-control-xs' name='modPenataJasaOKnamaProduk[]' value='" + nmBarangOKold + "' disabled>";
        Baris += "</td>";
        Baris += "<td>";
        Baris += "<input type='text' class='form-control form-control-xs' name='modPenataJasaOKQty[]' value='" + qtyold + "' disabled>";
        Baris += "</td>";
        Baris += "<td>";
        Baris += "<input type='text' class='form-control form-control-xs' name='hargaSatuanProdukOK[]' value='" + format_ribuan(parseInt(hargaold)) + "' disabled>";
        Baris += "</td>";
        Baris += "<td class='pl-0'>";
        Baris += "<input style='text-align:center;' type='text' class='form-control form-control-xs' name='idTarifprodukOK[]' value='" + idTarifOKold + "' disabled hidden>";
        Baris += "</td>";
        Baris += "<td style='display:none;'>";
        Baris += "</td>";
        Baris += "</tr>";
        $('#modListbokingOKtableprodukLama tbody').append(Baris);

        $("#hapusListprodLamaOK" + Nomor).click(function(event) {
            hapusListprodLamaOK(id_detail_kunjungan, nmBarangOKold);
        });
    }

    getProdukLamaOK();

    function getProdukLamaOK() {
        $('#modListbokingOKtableprodukLama tbody').html('');
        var param = {
            id_kunj: id_kunjungan,
        }
        apiPOST('Kamaroperasi/getListprodukPasienOK', param, hasil => {

            if (hasil['data'] !== '') {
                var a = hasil['data'];
                for (var i = 0; i < a.length; i++) {
                    var id_detail_kunjungan = a[i].id_detail_kunjungan;
                    var kodeProdukOKold = a[i].id_produk;
                    var nmBarangOKold = a[i].nama_produk + '||' + a[i].kd_produk;
                    var qtyold = a[i].qty;
                    var hargaold = a[i].harga;
                    var idTarifOKold = a[i].id_tarif;
                    tampilkanListProdukLamaOK(id_detail_kunjungan, kodeProdukOKold, nmBarangOKold, qtyold, hargaold, idTarifOKold)
                }
            } else {
                var Baris = "";
                Baris += "<tr>";
                Baris += "<td colspan='6'>Data tidak ditemukan!!</td>";
                Baris += "</tr>";
                $('#modListbokingOKtableprodukLama tbody').append(Baris);
            }

        });
    }

    function hapusListprodLamaOK(id_detail_kunjungan, nmBarangOKold) {
        pertanyaan.fire({
            title: 'Hapus Data Produk',
            html: '<span>Benarkah Produk ' + nmBarangOKold + ', di Hapus ?</span>',
            icon: 'question',
            showCancelButton: true,
            reverseButtons: false,
            allowOutsideClick: false
        }).then((result) => {
            if (result.isConfirmed) {
                var param = {
                    id_detail_kunjungan: id_detail_kunjungan,
                    id_trans: id_transaksi
                };
                apiPOST('Kamaroperasi/penataJasaOK_deleteProduk', param, hasil => {
                    if (hasil['code'] == '200') {
                        $('#modListbokingOKtableprodukLama tbody').html('');
                        getProdukLamaOK();
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {

            }
        })
    }

    function kembaliKeawalListbokingOK() {
        var idbooking = document.getElementById("modListOKidboking").value;
        if (idbooking == '') {
            pertanyaan.fire({
                title: 'Kembali ke menu awal',
                html: '<span>Data Pmbedahan Belum diSimpan, Data yang sudah dientry akan hilang, tetap kembali ?</span>',
                icon: 'question',
                showCancelButton: true,
                reverseButtons: false,
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    keluarKeListbokingOK();
                } else if (result.dismiss === Swal.DismissReason.cancel) {

                }
            })
        } else {
            keluarKeListbokingOK();
        }
    }

    function keluarKeListbokingOK() {
        $('#list1jadwalOKpasien').show();
        $('#list2jadwalOKpasien').show();
        $('#modListBokingOK').hide();
        listbookingKamarOK();
    }

    function btnResetBokingOK() {
        document.getElementById('modListOKklasbedah').value = '';
        document.getElementById('modListOKjenisbedah').value = '';
        document.getElementById('modListOKkamaroprasi').value = '';
        document.getElementById('modListOKstatusboking').value = '';
        document.getElementById('modListOKtindakan').value = '';
        document.getElementById('modListOKket').value = '';
    }

    function btnResetBedahOK() {
        listPembedahanOK();
        getProdukLamaOK();
    }
</script>