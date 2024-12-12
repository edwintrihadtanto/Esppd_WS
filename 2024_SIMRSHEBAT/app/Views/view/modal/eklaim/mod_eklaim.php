<?php
date_default_timezone_set('Asia/Jakarta');
foreach ($data as $row);
// var_dump($data);
// exit();
if ($row['datacbg'] == null) {
    $datacbg = '';
} else {
    $datacbg = $row['datacbg'];
}
if ($row['tarifcbg'] == null) {
    $rowtarifcbg = 0;
} else {
    $rowtarifcbg = $row['tarifcbg'];
}

if ($row['tgl_keluar'] == null || $row['tgl_keluar'] == '') {
    $tglplg = date("Y-m-d H:i:s");
    //echo"a";
} else {
    $tglplg = $row['jam_keluar'];
    //echo"b";
}


//var_dump($data);
?>
<style>
    .disabledbutton {
        pointer-events: none;
        opacity: 0.4;
    }
</style>
<div class="content modal fade" id="modal_eklaim">
    <div class="container-fluid ">
        <div class="row" style="margin-top:-40px">
            <!-- content kanan -->
            <div class="col-md-12" style="margin-top: 20px;margin-bottom: 0px;">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="overlay-wrapper" id="loading_modal_eklaim">
                                <div class="overlay">
                                    <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                                </div>
                            </div>
                            <form method="POST" id="form-inadrg">
                                <!-- detail transaksi -->
                                <div class="row">
                                    <div class="col-md-12" id="div_areatopbutton" style="margin-top: 0px;margin-bottom: 0px;">
                                        <div class="col-md-12 justify-content-between">
                                            <table class="table table-striped table-sm" border="0" style="margin:0px;size:100%">
                                                <tr>
                                                    <td>No.Transaksi</td>
                                                    <td> : </td>
                                                    <td><input type="text" id="id_transaksi" name="id_transaksi" value="<?php echo $row['id_transaksi'] ?>" class="form-control form-control-xs" readonly>
                                                        <button type="button" class="btn bg-gradient-info btn-sm" onclick="cetakbillkasir();" style="text-align: start;"><i class="fa fa-print"></i> Lihat Billing</button>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>Tgl. Masuk</td>
                                                    <td> : </td>
                                                    <td><input type="text" id="hidden_tgl_masuk" name="hidden_tgl_masuk" value="<?php echo substr($row['tgl_transaksi'], 0, 19); ?>" class="form-control form-control-xs" readonly></td>

                                                </tr>
                                                <tr>
                                                    <td>Tgl. Pulang</td>
                                                    <td> : </td>
                                                    <td><input type="text" id="tgl_keluar" name="tgl_keluar" value="<?php echo $tglplg; ?>" class="form-control form-control-xs" readonly></td>

                                                </tr>
                                                <tr>
                                                    <td>Kode. RM</td>
                                                    <td> : </td>
                                                    <td><?php echo $row['norm'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Nama</td>
                                                    <td> : </td>
                                                    <td><?php echo $row['nama'] ?>
                                                        <input type="hidden" id="valnamapas" name="valnamapas" value="<?php echo $row['nama'] ?>" class="form-control form-control-xs" readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Nokartu</td>
                                                    <td> : </td>
                                                    <td>
                                                        <input type="text" id="no_kartu" name="no_kartu" value="<?php echo $row['no_kartu'] ?>" onkeypress="carivklaimdata()" class="form-control form-control-xs">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Sep</td>
                                                    <td> : </td>
                                                    <td>
                                                        <input type="text" id="sep" name="sep" value="<?php echo $row['no_sjp'] ?>" class="form-control form-control-xs">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Nik</td>
                                                    <td> : </td>
                                                    <td>
                                                        <input type="text" id="nik" name="nik" value="<?php echo $row['nik'] ?>" class="form-control form-control-xs">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Hak Kelas</td>
                                                    <td> : </td>
                                                    <td>
                                                        <select id="hak_kelas" name="hak_kelas" class="form-control form-control-xs">
                                                            <option value="">-Pilih-</option>
                                                            <option value="Kelas 1">Kelas 1</option>
                                                            <option value="Kelas 2">Kelas 2</option>
                                                            <option value="Kelas 3">Kelas 3</option>
                                                        </select>
                                                        <!-- <input type="hidden" id="hak_kelas" name="hak_kelas" value="Kelas 3"> -->

                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Pelayanan</td>
                                                    <td> : </td>
                                                    <td>
                                                        <input type="text" id="kd_unit" name="kd_unit" class="form-control form-control-xs" readonly>
                                                    </td>
                                                </tr>
                                                <div id='ranap' style="display:none">
                                                    <tr>
                                                        <td>Naik Kelas</td>
                                                        <td> : </td>
                                                        <td>
                                                            <select class="form-control form-control-xs" name="upgrade_class_ind" id='upgrade_class_ind' onchange="cekvaluenaikelas()">
                                                                <option value='1'>Ya</option>
                                                                <option value='0'>Tidak</option>
                                                            </select>


                                                            <div id='naik_ke_kelas' style="display:none">
                                                                <select class="form-control form-control-xs" name="upgrade_class_class" id='upgrade_class_class'>
                                                                    <option value=''>Sesuai Kelas</option>
                                                                    <option value='kelas_1'>Kelas 1</option>
                                                                    <option value='kelas_2'>Kelas 2</option>
                                                                    <option value='vip'>vip</option>



                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <div>


                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <h3>Tarif Rumah Sakit</h3>
                                        <table class="table table-hover" style="background-color: #ccc;">
                                            <tbody>
                                                <tr>
                                                    <td>Total Biaya</td>
                                                    <td>
                                                        <input type="text" class="form-control text-right" id="totalbiaya" name="totalbiaya" readonly="readonly">
                                                    </td>
                                                </tr>


                                                <!-- <tr>
                                                    <td>Pembayaran bpjs</td>
                                                    <td>
                                                        <input type="text" class="form-control text-right" name="pembayaran" readonly="readonly" value="">
                                                    </td>
                                                </tr> -->

                                            </tbody>
                                        </table>
                                        <h3>Grouping Tarif BPJS</h3>
                                        <table class="table table-hover" style="background-color: #ccc;">
                                            <tbody>
                                                <tr>
                                                    <td>Code Base Group</td>
                                                    <td>
                                                        <span id="cbg_code"><?= ($datacbg <> "") ? json_decode($datacbg)->response->cbg->code : "" ?></span>
                                                        -
                                                        <span id="cbg_desc"><?= ($datacbg <> "") ? json_decode($datacbg)->response->cbg->description : "" ?></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Dibayar BPJS</td>
                                                    <td class="text-right">
                                                        <span class="total_claim"><?php echo number_format($rowtarifcbg, 0, ",", ".") ?></span>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Selisih</td>
                                                    <td>
                                                        <input type="text" class="form-control text-right" id="selisih" name="selisih" readonly="readonly" value="">
                                                    </td>
                                                </tr>



                                            </tbody>
                                        </table>

                                        <h3>Detail Rincian</h3>
                                        <table class="table table-hover" style="background-color: #ccc;">
                                            <tbody>
                                                <tr>
                                                    <td>prosedur_non_bedah</td>
                                                    <td>
                                                        <input type="text" id="tarif" name="tarif[1]">

                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>prosedur_bedah</td>
                                                    <td>
                                                        <input type="text" id="tarif" name="tarif[2]" value="">

                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>konsultasi</td>
                                                    <td>
                                                        <input type="text" id="tarif" name="tarif[3]" value="">

                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>tenaga_ahli</td>
                                                    <td>
                                                        <input type="text" id="tarif" name="tarif[4]" value="">

                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>keperawatan</td>
                                                    <td>
                                                        <input type="text" id="tarif" name="tarif[5]" value="">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>penunjang</td>
                                                    <td>
                                                        <input type="text" id="tarif" name="tarif[6]" value="">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>radiologi</td>
                                                    <td>
                                                        <input type="text" id="tarif" name="tarif[7]" value="">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>laboratorium</td>
                                                    <td>
                                                        <input type="text" id="tarif" name="tarif[8]" value="">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>pelayanan_darah</td>
                                                    <td>
                                                        <input type="text" id="tarif" name="tarif[9]" value="">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>rehabilitasi</td>
                                                    <td>
                                                        <input type="text" id="tarif" name="tarif[10]" value="">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>kamar</td>
                                                    <td>
                                                        <input type="text" id="tarif" name="tarif[11]" value="">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>rawat_intensif</td>
                                                    <td>
                                                        <input type="text" id="tarif" name="tarif[12]" value="">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>obat</td>
                                                    <td>
                                                        <input type="text" id="tarif" name="tarif[13]" value="">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>obat_kronis</td>
                                                    <td>
                                                        <input type="text" id="tarif" name="tarif[14]" value="">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>obat_kemoterapi</td>
                                                    <td>
                                                        <input type="text" id="tarif" name="tarif[15]" value="">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>alkes</td>
                                                    <td>
                                                        <input type="text" id="tarif" name="tarif[16]" value="">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>bmhp</td>
                                                    <td>
                                                        <input type="text" id="tarif" name="tarif[17]" value="">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>sewa_alat</td>
                                                    <td>
                                                        <input type="text" id="tarif" name="tarif[18]" value="">
                                                    </td>
                                                </tr>




                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="col-sm-7">
                                        <span class="badge bg-primary rounded-pill">Referensi diagnosa/tindakan</span>
                                        <table id="tablereferensidiagnosa" class="table table-striped table-sm choose" style="border-collapse: inherit;">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Tgl</th>
                                                    <th>Diagnosa</th>
                                                    <th>Status</th>
                                                    <th>Unit</th>

                                                </tr>
                                            </thead>
                                            <tbody id='listtablereferensidiagnosa'>

                                            </tbody>
                                        </table>

                                        <table id="tablereferensitindakan" class="table table-striped table-sm choose" style="border-collapse: inherit;">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Tgl</th>
                                                    <th>Tindakan</th>
                                                    <th>Unit</th>

                                                </tr>
                                            </thead>
                                            <tbody id='listtablereferensitindakan'>

                                            </tbody>
                                        </table>
                                        <h3>INA DRG</h3>
                                        <table class="table table-hover" style="background-color: #ccc;">
                                            <thead>
                                                <tr>
                                                    <th>Diagnosa Utama</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control ui-widget icd10_class ui-autocomplete-input" id="diagutama" name="diagutama" placeholder="Diagnosa Utama" value="<?php if (isset($mrdu_icd10)) {
                                                                                                                                                                                                                    echo $mrdu_icd10 . " - " . $mrconso_str;
                                                                                                                                                                                                                } ?>">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <br />
                                        <table class="table table-hover" style="background-color: #ccc;">
                                            <thead>
                                                <tr>
                                                    <th>Diagnosa Sekunder</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control ui-widget icd10_class ui-autocomplete-input" id="diagsekunder" name="diagsekunder[]" placeholder="Diagnosa Sekunder" value="<?php if (isset($diagsekunder[0]['mrds_icd10'])) {
                                                                                                                                                                                                                                echo $diagsekunder[0]['mrds_icd10'] . " - " . $diagsekunder[0]['mrconso_str'];
                                                                                                                                                                                                                            } ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control ui-widget icd10_class ui-autocomplete-input" id="diagsekunder" name="diagsekunder[]" placeholder="Diagnosa Sekunder" value="<?php if (isset($diagsekunder[1]['mrds_icd10'])) {
                                                                                                                                                                                                                                echo $diagsekunder[1]['mrds_icd10'] . " - " . $diagsekunder[1]['mrconso_str'];
                                                                                                                                                                                                                            } ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control ui-widget icd10_class ui-autocomplete-input" id="diagsekunder" name="diagsekunder[]" placeholder="Diagnosa Sekunder" value="<?php if (isset($diagsekunder[2]['mrds_icd10'])) {
                                                                                                                                                                                                                                echo $diagsekunder[2]['mrds_icd10'] . " - " . $diagsekunder[2]['mrconso_str'];
                                                                                                                                                                                                                            } ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control ui-widget icd10_class ui-autocomplete-input" id="diagsekunder" name="diagsekunder[]" placeholder="Diagnosa Sekunder" value="<?php if (isset($diagsekunder[3]['mrds_icd10'])) {
                                                                                                                                                                                                                                echo $diagsekunder[3]['mrds_icd10'] . " - " . $diagsekunder[3]['mrconso_str'];
                                                                                                                                                                                                                            } ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control ui-widget icd10_class ui-autocomplete-input" id="diagsekunder" name="diagsekunder[]" placeholder="Diagnosa Sekunder" value="<?php if (isset($diagsekunder[4]['mrds_icd10'])) {
                                                                                                                                                                                                                                echo $diagsekunder[4]['mrds_icd10'] . " - " . $diagsekunder[4]['mrconso_str'];
                                                                                                                                                                                                                            } ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control ui-widget icd10_class ui-autocomplete-input" id="diagsekunder" name="diagsekunder[]" placeholder="Diagnosa Sekunder" value="<?php if (isset($diagsekunder[5]['mrds_icd10'])) {
                                                                                                                                                                                                                                echo $diagsekunder[5]['mrds_icd10'] . " - " . $diagsekunder[5]['mrconso_str'];
                                                                                                                                                                                                                            } ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control ui-widget icd10_class ui-autocomplete-input" id="diagsekunder" name="diagsekunder[]" placeholder="Diagnosa Sekunder" value="<?php if (isset($diagsekunder[6]['mrds_icd10'])) {
                                                                                                                                                                                                                                echo $diagsekunder[6]['mrds_icd10'] . " - " . $diagsekunder[6]['mrconso_str'];
                                                                                                                                                                                                                            } ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control ui-widget icd10_class ui-autocomplete-input" id="diagsekunder" name="diagsekunder[]" placeholder="Diagnosa Sekunder" value="<?php if (isset($diagsekunder[7]['mrds_icd10'])) {
                                                                                                                                                                                                                                echo $diagsekunder[7]['mrds_icd10'] . " - " . $diagsekunder[7]['mrconso_str'];
                                                                                                                                                                                                                            } ?>">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <br />
                                        <table class="table table-hover" style="background-color: #ccc;">
                                            <thead>
                                                <tr>
                                                    <th>Tindakan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control ui-widget icd9_class ui-autocomplete-input" id="tindakanlain" name="tindakanlain[]" placeholder="Tindakan" value="<?php if (isset($tindakanlain[0]['mrtl_icd9'])) {
                                                                                                                                                                                                                        echo $tindakanlain[0]['mrtl_icd9'] . " - " . $tindakanlain[0]['mrconso_str'];
                                                                                                                                                                                                                    } ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control ui-widget icd9_class ui-autocomplete-input" id="tindakanlain" name="tindakanlain[]" placeholder="Tindakan" value="<?php if (isset($tindakanlain[1]['mrtl_icd9'])) {
                                                                                                                                                                                                                        echo $tindakanlain[1]['mrtl_icd9'] . " - " . $tindakanlain[1]['mrconso_str'];
                                                                                                                                                                                                                    } ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control ui-widget icd9_class ui-autocomplete-input" id="tindakanlain" name="tindakanlain[]" placeholder="Tindakan" value="<?php if (isset($tindakanlain[2]['mrtl_icd9'])) {
                                                                                                                                                                                                                        echo $tindakanlain[2]['mrtl_icd9'] . " - " . $tindakanlain[2]['mrconso_str'];
                                                                                                                                                                                                                    } ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control ui-widget icd9_class ui-autocomplete-input" id="tindakanlain" name="tindakanlain[]" placeholder="Tindakan" value="<?php if (isset($tindakanlain[3]['mrtl_icd9'])) {
                                                                                                                                                                                                                        echo $tindakanlain[3]['mrtl_icd9'] . " - " . $tindakanlain[3]['mrconso_str'];
                                                                                                                                                                                                                    } ?>">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="text-right">
                                            <input type="hidden" id="hidden_no_sep" name="hidden_no_sep" value="<?= $row['no_sjp']; ?>">
                                            <input type="hidden" id="no_sep" name="no_sep" value="<?= $row['no_sjp']; ?>">
                                            <input type="hidden" id="kd_pasien" name="kd_pasien" value="<?= $row['norm']; ?>">
                                            <input type="hidden" id="urut_masuk" name="urut_masuk" value="">

                                            <input type="hidden" id="penunjangdiagnostikLab" name="penunjangdiagnostikLab[]" value="">
                                            <input type="hidden" id="pd_hasilLab" name="pd_hasilLab[]" value="">
                                            <input type="hidden" id="penunjangdiagnostikRad" name="penunjangdiagnostikRad[]" value="">
                                            <input type="hidden" id="pd_hasilRad" name="pd_hasilRad[]" value="">
                                            <input type="hidden" id="penunjangdiagnostikLain" name="penunjangdiagnostikLain[]" value="">
                                            <input type="hidden" id="pd_hasilLain" name="pd_hasilLain[]" value="">
                                            <input type="hidden" id="laporanoperasi" name="laporanoperasi[]" value="">
                                            <input type="hidden" id="lo_uraian" name="lo_uraian[]" value="">
                                            <input type="hidden" id="tindakanlain" name="tindakanlain[]" value="">
                                            <input type="hidden" id="tl_tindakanlain" name="tl_tindakanlain[]" value="">
                                            <!-- <input type="hidden" id="hak_kelas" name="hak_kelas" value="Kelas 3"> -->
                                            <input type="hidden" id="tgl_lahir" name="tgl_lahir" value="<?= date("d-m-Y", strtotime($row['tgl_lahir'])); ?>">
                                            <input type="hidden" id="nama" name="nama" value="<?= $row['nama']; ?>">
                                            <!-- <input type="hidden" id="no_kartu" name="no_kartu" value=""> -->
                                            <input type="hidden" id="jenis_kelamin" name="jenis_kelamin" value="<?= $row['jenis_kelamin']; ?>">
                                            <!-- <input type="hidden" id="tgl_masuk" name="tgl_masuk" value="<?php echo substr($row['tgl_transaksi'], 0, 10); ?>"> -->
                                            <input type="hidden" id="tgl_masuk" name="tgl_masuk" value="<?php echo $row['tgl_transaksi']; ?>">

                                            <input type="hidden" id="kantong_darah" name="kantong_darah" value="0">
                                            <input type="hidden" id="carapulang" name="carapulang" value="1">
                                            <input type="hidden" id="bblahir" name="bblahir" value="0">
                                            <input type="hidden" id="koinsiden" name="koinsiden" value="0">
                                            <input type="hidden" id="covidsep" name="covidsep" value="">
                                            <input type="hidden" id="dokter" name="dokter" value="tes nama dokter">
                                            <input type="hidden" id="caramasuk" name="caramasuk" value="other">
                                            <input type="hidden" id="sistole" name="sistole" value="120">
                                            <input type="hidden" id="diastole" name="diastole" value="80">
                                            <!-- <input type="hidden" id="upgrade_class_ind" name="upgrade_class_ind" value="0"> -->
                                            <!-- <input type="hidden" id="upgrade_class_class" name="upgrade_class_class" value=""> -->
                                            <input type="hidden" id="upgrade_class_los" name="upgrade_class_los" value="0">
                                            <input type="hidden" id="upgrade_class_payor" name="upgrade_class_payor" value="0">
                                            <input type="hidden" id="tarif_poli_eks" name="tarif_poli_eks" value="0">
                                            <input type="hidden" id="nomor_sitb" name="nomor_sitb" value="">
                                            <input type="hidden" id="add_payment_pct" name="add_payment_pct" value="0">
                                            <input type="hidden" id="icu_los" name="icu_los" value="0">
                                            <input type="hidden" id="dializer" name="dializer" value="0">
                                            <input type="hidden" id="use_ind" name="use_ind" value="0">
                                            <input type="hidden" id="intubasi" name="intubasi" value="">
                                            <input type="hidden" id="extubasi" name="extubasi" value="">
                                            <input type="hidden" id="hidden_total_biaya" name="hidden_total_biaya" value="">
                                            <button type="button" class="btn btn-primary" id="simpanKlaim"> <i class="glyphicon glyphicon-save"></i> Kirim ke-EKlaim</button>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-danger btn-sm" onclick="keluarmodal_eklaim();"><i class="fa fa-reply"></i> Kembali</button>
                                    </div>

                                </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
</form>


<!-- //menu kiri -->


<script type="text/javascript">
    $(document).ready(function() {
        $('#loading_Klaim').hide();
        $('#loading_modal_eklaim').hide();
        rincianpasien();
        detailkunjunganeklaimunit();
        rincianbiayaeklaim();
        detailreferensidiagnosa();
        detailreferensitindakan();
        bridgingvklaimdatapasien();
        bridgingvklaimcarisep();

        $(".icd9_class").autocomplete({
            appendTo: '#modal_eklaim',
            minLength: 2,
            source: 'Eklaim/getProcedure/?',
            search: function() {
                $(this).addClass('working');
            },
            open: function() {
                $(this).removeClass('working');
            }
        });
        $(".icd10_class").autocomplete({
            appendTo: '#modal_eklaim',
            minLength: 2,
            source: 'Eklaim/getDiagnose/?',
            search: function() {
                $(this).addClass('working');
            },
            open: function() {
                $(this).removeClass('working');
            }
        });


    });

    $('#upgrade_class_ind').on('change', function(e) {
        var optionSelected = $("option:selected", this);
        var valueSelected = this.value;
        //alert(valueSelected);
        if (valueSelected == '0') {
            document.getElementById("naik_ke_kelas").style.display = "none";

        } else {
            document.getElementById("naik_ke_kelas").style.display = "block";
        }

        //var optionSelected = $("option:selected", this);
        //var valueSelected = this.value;
        //alert(valueSelected);
    });

    function cetakbillkasir() {
        var idtrans = $("#id_transaksi").val();
        var user = JSON.parse(localStorage['data_user']);
        var namauser = user['nama'];
        // alert(idtrans);
        // exit();
        var param = {
            idtransaksi: idtrans,
            namausernya: namauser
        };
        newTabPOST('API/Kasirgeneral/cetakbill', param);
        return;
    }

    function carivklaimdata() {
        bridgingvklaimdatapasien();
    }

    function bridgingvklaimdatapasien() {
        if ($("#no_kartu").val() == '' || $("#no_kartu").val() == 'undefined') {
            alert('isi nomor kartu dan tekan enter');
            return;
        }
        var c = '';
        var param = {
            noka: $("#no_kartu").val(),
        };
        apiPOST('Bridging/CariDetailPesertaBPJS', param, hasil => {
            var res = hasil['peserta'];
            if (res['hakKelas']['kode'] == '1') {
                var kelas = "Kelas 1";
            }
            if (res['hakKelas']['kode'] == '2') {
                var kelas = "Kelas 2";
            }
            if (res['hakKelas']['kode'] == '3') {
                var kelas = "Kelas 3";
            }
            //   alert(kelas);
            document.getElementById("hak_kelas").value = kelas;
            document.getElementById("tgl_lahir").value = res['tglLahir'];
        });
    }

    function bridgingvklaimcarisep() {
        if ($("#sep").val() == '' || $("#sep").val() == 'undefined') {
            alert('isi nomor sep dan tekan enter');
            return;
        }
        var c = '';
        var param = {
            sep: $("#sep").val(),
        };
        apiPOST('Bridging/carisepeklaim', param, hasil => {
            //var res=hasil['peserta'];
            //alert(hasil['noSep']);
            //console.log('klsRawatHak' + hasil['klsRawat']['klsRawatHak']);
            //console.log('klsRawatNaik'+hasil['klsRawatNaik']['klsRawatNaik']);

            document.getElementById("sep").value = hasil['noSep'];
            if (hasil['klsRawat']['klsRawatNaik'] == null) {
                document.getElementById("upgrade_class_ind").value = '0';
                // document.getElementById("upgrade_class_ind").value = 'Tidak';
            } else {
                document.getElementById("upgrade_class_ind").value = '1';
                // document.getElementById("ket_naik_kelas").value = 'Ya';
                //munculkan naik ke kelasberapa
                switch (hasil['klsRawat']['klsRawatNaik']) {
                    case 1: // VVIP
                        // code block
                        var naik = 'vip';
                        break;
                    case 2: //VIP
                        // code block
                        var naik = 'vip';
                        break;
                    case 3: // Kelas 1
                        // code block
                        var naik = 'kelas_1';
                        break;
                    case 4: // Kelas 2
                        // code block
                        var naik = 'kelas_2';
                        break;
                    case 5: // Kelas 3
                        // code block
                        var naik = 'kelas_3';
                        break;
                    case 6: // ICCU
                        // code block
                        var naik = 'kelas_1';
                        break;
                    case 7: // ICU
                        // code block
                        var naik = 'kelas_1';
                        break;
                    case 8: // Ditas KElas I
                        // code block
                        var naik = 'vip';
                        break;
                    default:
                        var naik = 'vip';
                        // code block
                }
                document.getElementById("naik_ke_kelas").style.display = "block";
                document.getElementById("naik_ke").value = naik;
                document.getElementById("upgrade_class_class").value = naik;
            }


        });

        //cek nomor kartu berdasarkan nik
        if ($("#no_kartu").val() == '' || $("#no_kartu").val() == null || $("#no_kartu").val() == 'undefined' || $("#no_kartu").val() == undefined) {
            var param = {
                nik: $("#nik").val(),
            };
            apiPOST('Bridging/cekNik', param, hasil => {
                var res = hasil['peserta'];
                document.getElementById("no_kartu").value = hasil['peserta']['noKartu'];

                var param = {
                    noka: hasil['peserta']['noKartu'],
                };
                apiPOST('Bridging/CariDetailPesertaBPJS', param, hasil => {
                    var res = hasil['peserta'];
                    if (res['hakKelas']['kode'] == '1') {
                        var kelas = "Kelas 1";
                    }
                    if (res['hakKelas']['kode'] == '2') {
                        var kelas = "Kelas 2";
                    }
                    if (res['hakKelas']['kode'] == '3') {
                        var kelas = "Kelas 3";
                    }
                    //   alert(kelas);
                    document.getElementById("hak_kelas").value = kelas;
                    document.getElementById("tgl_lahir").value = res['tglLahir'];
                });

            });


        }

    }

    $("#simpanKlaim").click(function() {
        //$('#loading_modal_eklaim').show();
        // $("#simpan").click();
        // var id = $(this).attr("data-id");
        // var _finalVerif = "";
        //_finalVerif = _verifSEP.join(";");
        // var _finalVerif = $("#hidden_kd_pasien").val().trim() + "#" + $("#hidden_tgl_masuk").val().trim() + "#" + $("#kd_unit").val().trim() + "#" + $("#hidden_no_sep").val().trim();
        // var strArray = id.split("#");
        // var kd_pasien = $("#hidden_kd_pasien").val().trim();
        var no_sep = $("#hidden_no_sep").val().trim();
        var data = $("#form-inadrg").serialize();

        // console.log(data);
        // exit;

        // $('body').loadingModal({
        //     text: 'Loading...',
        //     opacity: '0',
        //     color: '#000',
        //     backgroundColor: 'rgb(255,255,255)',
        // });
        $.ajax({
                method: "POST",
                // url: apiPOST('Eklaim/simpanEklaim'),
                url: "<?php echo base_url('Eklaim/simpanEklaim'); ?>",
                //data: "{kd_pasien:'" + kd_pasien +"',tgl_masuk:'"+tgl_masuk+"',kd_unit:'"+kd_unit+"'}"
                // data: "kd_pasien=" + kd_pasien + "&no_sep=" + no_sep
                data: data

            })
            .done(function(data) {
                var out = jQuery.parseJSON(data);
                var pesan = "";
                var tipe = "";
                if (out.status == 'ok') {
                    // if (out.hasOwnProperty("validate_sitb")) {
                    //     console.log("kasus sitb");
                    //     if (out.validate_sitb == "true") {
                    //         $("#form-update-rajal-inadrg button[name='btn_validate_sitb']").removeClass("btn btn-warning");
                    //         $("#form-update-rajal-inadrg button[name='btn_validate_sitb']").addClass("btn btn-success");
                    //         $("#form-update-rajal-inadrg #i_validate_sitb").removeClass("glyphicon glyphicon-remove");
                    //         $("#form-update-rajal-inadrg #i_validate_sitb").addClass("glyphicon glyphicon-ok");
                    //         $("#form-update-rajal-inadrg button[name='btn_validate_sitb']").attr("title", "SITB Valid");
                    //         console.log("sitb true");
                    //     } else {
                    //         $("#form-update-rajal-inadrg button[name='btn_validate_sitb']").removeClass("btn btn-success");
                    //         $("#form-update-rajal-inadrg button[name='btn_validate_sitb']").addClass("btn btn-warning");
                    //         $("#form-update-rajal-inadrg #i_validate_sitb").removeClass("glyphicon glyphicon-ok");
                    //         $("#form-update-rajal-inadrg #i_validate_sitb").addClass("glyphicon glyphicon-remove");
                    //         $("#form-update-rajal-inadrg button[name='btn_validate_sitb']").attr("title", "invalid");
                    //         console.log("sitb false");
                    //     }
                    // } else {
                    //     console.log("bukan sitb");
                    // }
                    // pesan = 'SEP Berhasil disimpan ke Eklaim!';
                    // tipe = "success";
                    toastr.info("SEP Berhasil disimpan ke Eklaim!");

                    // $.ajax({
                    //         method: 'GET',
                    //         url: '<?php //echo base_url('Rajal/updateStatusClaim/'); 
                                        ?>' + no_sep + '/1',
                    //     })
                    //     .done(function(data) {
                    //         var out = jQuery.parseJSON(data);
                    //         if (out.status == 'form') {
                    //             effect_msg2("warning", out.msg);
                    //         } else {
                    //             $("[data-id-sep='" + no_sep + "']").removeClass('btn btn-dark checbox');
                    //             $("[data-id-sep='" + no_sep + "']").addClass('btn btn-danger checbox');
                    //             $("[data-id-sep='" + no_sep + "']").prop('title', 'Klaim Sudah diSimpan, belum diGrouping');
                    //             $("[data-id-sep='" + no_sep + "']").html('<i class="glyphicon glyphicon-check"></i>');
                    //         }
                    //     })
                    $.ajax({
                            method: "GET",
                            url: "Eklaim/autoGrouper/" + no_sep,
                            //data: "{kd_pasien:'" + kd_pasien +"',tgl_masuk:'"+tgl_masuk+"',kd_unit:'"+kd_unit+"'}"
                            // data: "kd_pasien=" + kd_pasien + "&no_sep=" + no_sep
                            // data: data
                        })
                        .done(function(data) {
                            var out = jQuery.parseJSON(data);
                            console.log(out);
                            var pesan = "";
                            var tipe = "";
                            if (out.metadata.code == '200') {
                                $.ajax({
                                        //cek update tarif naik kelas
                                        method: "GET",
                                        url: "Eklaim/getClaimData/" + no_sep + "/false",
                                    })
                                    .done(function(getClaimData) {
                                        var outGetClaimData = jQuery.parseJSON(getClaimData);
                                        console.log("outGetClaimData=" + outGetClaimData.metadata.code);
                                        if (outGetClaimData.metadata.code == '200') {
                                            console.log("tekan kene");
                                            $("#hidden_add_payment_pct").val(outGetClaimData.response.data.add_payment_pct);
                                            $("#hidden_add_payment_amt").val(outGetClaimData.response.data.add_payment_amt);
                                            // cek_grouping_home();
                                        }
                                    });
                                // $.ajax({
                                //         method: 'GET',
                                //         url: '<?php //echo base_url('Rajal/updateStatusClaim/'); 
                                                    ?>' + no_sep + '/2',
                                //     })
                                //     .done(function(data) {
                                //         var out = jQuery.parseJSON(data);
                                //         if (out.status == 'form') {
                                //             effect_msg2("warning", out.msg);
                                //         } else {
                                //             $("[data-id-sep='" + no_sep + "']").removeClass('btn btn-danger checbox');
                                //             $("[data-id-sep='" + no_sep + "']").addClass('btn btn-warning checbox');
                                //             $("[data-id-sep='" + no_sep + "']").prop('title', 'Klaim sudah diGrouping, belum diFinal');
                                //             $("[data-id-sep='" + no_sep + "']").html('<i class="glyphicon glyphicon-check"></i>');
                                //         }
                                //     })
                                // pesan = 'Grouping berhasil!';
                                // tipe = "success";
                                toastr.info("Grouping berhasil!");

                                $("#cbg_code").html(out.response.cbg.code);
                                $("#cbg_desc").html(out.response.cbg.description);
                                $("#hidden_cbg_base_tariff").val(out.response.cbg.base_tariff);
                                var base_tariff = new Intl.NumberFormat('id-ID').format(out.response.cbg.base_tariff);
                                console.log('base_tariff=' + base_tariff);
                                $("#cbg_tariff").html(base_tariff);
                                // if (out.response.hasOwnProperty("special_cmg")) {
                                //     out.response.special_cmg.forEach(datacmg => {
                                //         console.log(datacmg);
                                //         var tariff_cmg = new Intl.NumberFormat('id-ID').format(datacmg.tariff);
                                //         if (datacmg.type == "Special Procedure") {
                                //             $("#span_cmg_special_procedure_code").html(datacmg.code);
                                //             $("#div_cmg_special_procedure_description").html(datacmg.description);
                                //             $("#span_cmg_special_procedure_tariff").html(tariff_cmg);
                                //         }
                                //         if (datacmg.type == "Special Prosthesis") {
                                //             $("#span_cmg_special_prosthesis_code").html(datacmg.code);
                                //             $("#div_cmg_special_prosthesis_description").html(datacmg.description);
                                //             $("#span_cmg_special_prosthesis_tariff").html(tariff_cmg);
                                //         }
                                //         if (datacmg.type == "Special Investigation") {
                                //             $("#span_cmg_special_investigation_code").html(datacmg.code);
                                //             $("#div_cmg_special_investigation_description").html(datacmg.description);
                                //             $("#span_cmg_special_investigation_tariff").html(tariff_cmg);
                                //         }
                                //         if (datacmg.type == "Special Drug") {
                                //             $("#span_cmg_special_drug_code").html(datacmg.code);
                                //             $("#div_cmg_special_drug_description").html(datacmg.description);
                                //             $("#span_cmg_special_drug_tariff").html(tariff_cmg);
                                //         }
                                //     })
                                // }
                                // $("#mdc_number").html(out.response_inagrouper.mdc_number);
                                // $("#mdc_desc").html(out.response_inagrouper.mdc_description);
                                // $("#drg_code").html(out.response_inagrouper.drg_code);
                                // $("#drg_desc").html(out.response_inagrouper.drg_description);

                                var total = new Intl.NumberFormat('id-ID').format(out.response.cbg.tariff);
                                var selisih = out.response.cbg.tariff - $("#hidden_total_biaya").val();
                                selisih = new Intl.NumberFormat('id-ID').format(selisih);
                                $("#selisih").val(selisih);
                                console.log('total=' + total);
                                $(".total_claim").html(total);
                                $('#loading_modal_eklaim').hide();

                                // $("#collapse1").collapse("hide");
                                // $("#collapse2").collapse("show");

                                // $("#form-update-rajal-inadrg #cetakKlaim").hide();
                                // $("#form-update-rajal-inadrg #editKlaim").hide();
                                // $("#form-update-rajal-inadrg #kirimKlaim").hide();
                                // $("#form-update-rajal-inadrg #finalKlaim").show();
                                // $("#form-update-rajal-inadrg input[name='upgrade_class_payor']").attr("disabled", false);
                                // $("#form-update-rajal-inadrg input[name='add_payment_pct']").attr("disabled", false);
                                // cek_grouping_home();
                            } else {
                                // pesan = 'Gagal grouping ke Eklaim, error: ' + out.metadata.code + " / " + out.metadata.message;
                                // tipe = "warning";
                                toastr.error("Gagal grouping ke Eklaim, error: '" + out.metadata.code + " / " + out.metadata.message);
                                $('#loading_modal_eklaim').hide();

                            }
                            // $.notify({
                            //     message: pesan
                            // }, {
                            //     // settings
                            //     delay: 5000,
                            //     placement: {
                            //         from: "top",
                            //         align: "center"
                            //     },
                            //     type: tipe,
                            //     z_index: 2000
                            // });
                            // $('body').loadingModal('destroy');
                        })
                } else {
                    // pesan = 'Gagal simpan ke Eklaim, error: ' + out.pesan;
                    // tipe = "warning";
                    toastr.error("Gagal simpan ke Eklaim, error: " + out.pesan);
                    $('#loading_modal_eklaim').hide();

                }
                // $.notify({
                //     message: pesan
                // }, {
                //     // settings
                //     delay: 5000,
                //     placement: {
                //         from: "top",
                //         align: "center"
                //     },
                //     type: tipe,
                //     z_index: 2000
                // });
                // $('body').loadingModal('destroy');
            })

        // e.preventDefault();
        // });
    });

    var id_transaksi = <?php echo $row['id_transaksi']  ?>;

    function rincianpasien() {
        var tarifcbg = <?php echo $rowtarifcbg ?>;
        param = {
            id_transaksi: id_transaksi,
        };
        apiPOST('Eklaim/tampilrinciandetailtransaksi', param, hasil => {
            if (hasil['status'] == 'sukses') {
                var a = hasil['data'];
                for (var i = 0; i < a.length; i++) {
                    // alert(a[i].totalnominalpasien);
                    document.getElementById('totalbiaya').value = format_ribuan(a[i].totalnominalpasien);
                    document.getElementById('hidden_total_biaya').value = a[i].totalnominalpasien;
                    var selisih = tarifcbg - a[i].totalnominalpasien;
                    // alert(+ tarifcbg+ '-' +a[i].totalnominalpasien+'='+selisih);
                    document.getElementById('selisih').value = format_ribuan(selisih);
                }
                document.getElementById('loading_modal_eklaim').style.display = 'none';
            } else {
                // document.getElementById('loading_modal_eklaim').style.display = 'none';
            }
        });
    }

    function detailkunjunganeklaimunit() {
        //alert(id_transaksi);
        param = {
            id_transaksi: id_transaksi,
        };
        apiPOST('Eklaim/unittampilkunjungan', param, hasil => {
            if (hasil['code'] == '200') {
                var pelayanan = hasil['data'];

                document.getElementById('kd_unit').value = pelayanan;
                document.getElementById('loading_modal_eklaim').style.display = 'none';
                if (pelayanan == 'pelayananranap') {
                    document.getElementById("ranap").style.display = "block";

                }

            }
        });
    }

    function rincianbiayaeklaim() {

        //alert(id_transaksi);
        param = {
            id_transaksi: id_transaksi,
            // nosep:val_nosep
        };
        apiPOST('Eklaim/tampilrincianbiayaeklaim', param, hasil => {
            if (hasil['status'] == 'sukses') {
                var a = hasil['data'];
                for (var i = 0; i < a.length; i++) {
                    // alert(a[i].deskripsi);
                    if (a[i].id_jenis_produk == '12') {
                        document.getElementsByName("tarif[5]")[0].value = a[i].sum;
                    }
                    if (a[i].id_jenis_produk == '13') {
                        document.getElementsByName("tarif[3]")[0].value = a[i].sum;
                    }
                    if (a[i].id_jenis_produk == '7') {
                        document.getElementsByName("tarif[13]")[0].value = a[i].sum;
                    }
                    if (a[i].id_jenis_produk == '2') {
                        document.getElementsByName("tarif[1]")[0].value = a[i].sum;
                    }
                    if (a[i].id_jenis_produk == '5') {
                        document.getElementsByName("tarif[2]")[0].value = a[i].sum;
                    }
                    if (a[i].id_jenis_produk == '15') {
                        document.getElementsByName("tarif[4]")[0].value = a[i].sum;
                    }
                    //   if(a[i].id_jenis_produk=='x'){
                    document.getElementsByName("tarif[6]")[0].value = '0';
                    // }
                    if (a[i].id_jenis_produk == '4') {
                        document.getElementsByName("tarif[7]")[0].value = a[i].sum;
                    }
                    if (a[i].id_jenis_produk == '3') {
                        document.getElementsByName("tarif[8]")[0].value = a[i].sum;
                    }
                    // if(a[i].id_jenis_produk=='x'){
                    document.getElementsByName("tarif[9]")[0].value = '0';
                    // }
                    // if(a[i].id_jenis_produk=='x'){
                    document.getElementsByName("tarif[10]")[0].value = '0';
                    // }
                    if (a[i].id_jenis_produk == '8') {
                        document.getElementsByName("tarif[11]")[0].value = a[i].sum;
                    }
                    // if(a[i].id_jenis_produk=='x'){
                    document.getElementsByName("tarif[12]")[0].value = '0';
                    // }
                    // if(a[i].id_jenis_produk=='x'){
                    document.getElementsByName("tarif[14]")[0].value = '0';
                    // }
                    // if(a[i].id_jenis_produk=='x'){
                    document.getElementsByName("tarif[15]")[0].value = '0';
                    // }
                    if (a[i].id_jenis_produk == '14') {
                        document.getElementsByName("tarif[16]")[0].value = a[i].sum;
                    }
                    if (a[i].id_jenis_produk == '11') {
                        document.getElementsByName("tarif[17]")[0].value = a[i].sum;
                    }
                    // if(a[i].id_jenis_produk=='x'){
                    document.getElementsByName("tarif[18]")[0].value = '0';
                    // }

                }
                document.getElementById('loading_modal_eklaim').style.display = 'none';

            } else {
                document.getElementById('loading_modal_eklaim').style.display = 'none';

            }
        });
    }

    function detailreferensidiagnosa() {
        var listParam = [
            'id_transaksi'
        ];
        var param = {
            idtransaksi: id_transaksi,
        };
        apiPOST("Eklaim/detailreferensidiagnosa", param, hasil => {
            if (hasil['data'] !== null) {
                //alert('tes');
                if (hasil['code'] == 'XX') {
                    toastr.error('Data Tidak ditemukan');
                }
                var no = $('#tablereferensidiagnosa tbody tr').length + 1;
                var Baris = '';
                var a = hasil['data'];
                for (var i = 0; i < a.length; i++) {

                    Baris += '<tr>';
                    Baris += '<td>' + no + '</td>';
                    Baris += '<td>' + a[i].tgl_kunjungan + '</td>';
                    Baris += '<td>' + a[i].id_penyakit + ' ' + a[i].penyakit + '</td>';
                    Baris += '<td>' + a[i].statusdiagnosa + '</td>';
                    Baris += '<td>' + a[i].nama_unit + '</td>';

                    Baris += "</tr>";
                    no++;
                }
                document.getElementById("listtablereferensidiagnosa").innerHTML = Baris;
                $('#loading_Klaim').hide();

            }

        }, listParam);
    };

    function detailreferensitindakan() {
        var listParam = [
            'id_transaksi'
        ];
        var param = {
            idtransaksi: id_transaksi,
        };
        apiPOST("Eklaim/detailreferensitindakan", param, hasil => {
            if (hasil['data'] !== null) {
                //alert('tes');
                if (hasil['code'] == 'XX') {
                    toastr.error('Data Tindakan Tidak ditemukan');
                }
                var no = $('#tablereferensidiagnosa tbody tr').length + 1;
                var Baris = '';
                var a = hasil['data'];
                for (var i = 0; i < a.length; i++) {

                    Baris += '<tr>';
                    Baris += '<td>' + no + '</td>';
                    Baris += '<td>' + a[i].tgl_tindakan + '</td>';
                    Baris += '<td>' + a[i].kd_icd9 + ' ' + a[i].penyakit + '</td>';
                    Baris += '<td>' + a[i].deskripsi + '</td>';

                    Baris += "</tr>";
                    no++;
                }
                document.getElementById("listtablereferensitindakan").innerHTML = Baris;
                $('#loading_Klaim').hide();

            }

        }, listParam);
    };

    $("#modal_eklaim").modal({
        backdrop: "static"
    });
    $('#modal_eklaim').on('shown.bs.modal', function() {});

    function keluarmodal_eklaim() {
        $('#modal_eklaim').modal('hide');
        $('.modal-backdrop').hide();
    }
</script>