<?php
$data = json_decode($_GET['data']);
$kode_vendor       = str_replace('"', '', json_encode($data->kode_vendor));
?>
<div class="container-fluid p-2" id="modKeuanganAPRwtBayar_listtransaksi1">
    <div class="card card-row">
        <div class="overlay-wrapper" id="loadingmodKeuanganAPRwtBayar">
            <div class="overlay dark">
                <i class="fas fa-3x fa-sync-alt fa-spin"></i>
            </div>
        </div>
        <div class="card-body p-1">

            <div class="card" style="box-shadow: 0 0 3px #343a40; margin-bottom: 0;">
                <div class="card-header p-1">
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="hr6-custom" id="modKeuanganAPRwtBayar_titleheader"><i class="fas fa-boxes"></i> </i> Riwayat Pembayaran AP</h6>
                            <div class="row">
                                <div class="col-auto">
                                    <button type="button" class="btn btn-outline-danger btn-xs" onclick="keluarmodal_modKeuanganAPRwtBayar()"><i class="fa fa-arrow-left"></i> Kembali</button>
                                </div>
                                <div class="col-auto">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text form-control-xs">Jumlah Transaksi :</span>
                                        </div>
                                        <select class="form-control form-control-xs" id="keuanganAP_jmltransaksi" name="keuanganAP_jmltransaksi" onchange="tampilkeuanganAP()">
                                            <option value="0">Semua Transaksi</option>
                                            <option value="10">10 Transaksi</option>
                                            <option value="20">20 Transaksi</option>
                                            <option value="30">30 Transaksi</option>
                                            <option value="40">40 Transaksi</option>
                                            <option value="50">50 Transaksi</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END LETAK BUTTON -->
                </div>
            </div>
            <div class="col-sm-12 p-1" style="max-height: 350px; overflow-x: hidden;">
                <table border="0" cellpadding="0" cellspacing="0" id="modKeuanganAPRwtBayar_ListDetailKeuanganAP" class="table table-striped table-sm choose table-bordered">
                    <thead>
                        <tr>
                            <th class="pl-0" width="5" style="text-align:center;">No.</th>
                            <th width="10"></th>
                            <th width="100">Vendor</th>
                            <th width="10">Kode Faktur</th>
                            <th width="100">Keterangan</th>
                            <th class="pl-0" width="30">Tgl Transaksi</th>
                            <th class="pl-0" width="50" style="text-align:center;">Jumlah</th>
                            <th class="pl-0" width="50" style="text-align:center;">Sumber Kas</th>
                            <th class="pl-0" width="50" style="text-align:center;">Pegawai</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    // document.getElementById("modKeuanganAPRwtBayar_id").value = kode_vendor;
    // document.getElementById("modKeuanganAPRwtBayar_id").value = kode_vendor;
    // document.getElementById("modKeuanganAPRwtBayar_penerima").value = nm_Vendor;
    // document.getElementById("modKeuanganAPRwtBayar_tgltrans").value = nowday;

    // showUp_modKeuanganAPRwtBayar();
    tampilkan_ListDetailKeuanganAP();
    // getKasmasuk_modKeuanganAPRwtBayar();


    /* function showUp_modKeuanganAPRwtBayar() {
        $("#modal_modKeuanganAPRwtBayar").modal({
            backdrop: "static"
        });
        $('#modal_modKeuanganAPRwtBayar').on('shown.bs.modal', function() {});
    }
    $('#loadingmodKeuanganAPRwtBayar').hide(); */
    function tampilkan_ListDetailKeuanganAP() {

        var param = {
            kode_vendor: kode_vendor
        };
        apiPOST('Keuangan/list_keuanganAPRwtByr', param, hasil => {
            $('#loadingmodKeuanganAPRwtBayar').hide();
            $('#modKeuanganAPRwtBayar_ListDetailKeuanganAP tbody').html('');
            var a = hasil['data'];
            var Baris = '';

            if (hasil['data'] !== null) {
                if (hasil['code'] == 'XX') {
                    toastr.error("Data tidak ditemukan");
                    var Baris = "";
                    Baris += '<tr><td colspan="10" align="center">Data tidak ditemukan</td></tr>';
                    $('#modKeuanganAPRwtBayar_ListDetailKeuanganAP').append(Baris);
                } else {
                    toastr.success("Data ditemukan");
                    for (var i = 0; i < a.length; i++) {

                        id_ac_apbayar = a[i]['id_ac_apbayar'];
                        nama_ven = a[i]['nama'];
                        tgl_bayar = a[i]['tgl_bayar'];
                        jml = a[i]['jml'];
                        kas_nama = a[i]['kas_nama'];
                        nama_peg = a[i]['nama_peg'];
                        id_jurnal_debit = a[i]['id_jurnal_debit'];
                        ket = a[i]['ket'];
                        no = i + 1;

                        Baris += '<tr>';
                        Baris += '<td>' + no + '</td>';
                        Baris += '<td>';
                        Baris += '<button type="button" class="btn btn-xs btn-light p-0" id="" onclick = "(keuanganAPRwtByr_cetak(' + "'" + id_jurnal_debit + "','" + nama_ven + "','" + kas_nama + "','" + tgl_bayar + "','" + jml + "','" + ket + "'" + '))" style="width:50%"><i class="fas fa-print"></i></button>';
                        Baris += '</td>';
                        Baris += '<td>' + nama_ven + '</td>';
                        Baris += '<td>' + kode_fak + '</td>';
                        Baris += '<td>' + ket + '</td>';
                        Baris += '<td>' + tgl_bayar + '</td>';
                        Baris += '<td class="text-right">' + formatMoney(jml) + '</td>';
                        Baris += '<td>' + kas_nama + '</td>';
                        Baris += '<td>' + nama_peg + '</td>';
                    }
                    $('#modKeuanganAPRwtBayar_ListDetailKeuanganAP').append(Baris);
                }
            }
        });
    }

    function keuanganAPRwtByr_cetak(id_jurnal_debit, penerima, kasbank, tgl, jumlah, ket) {
        var param = {
            id_jurnal: id_jurnal_debit,
            id_gl: '',
            ket: ket,
            penerima: penerima,
            tgl: tgl,
            jumlah: jumlah,
            kasbank: kasbank,
            nama: user['nama_pegawai']
        };
        newTabPOST('API/Keuangan/CetakKasKeluar', param);
        return;
    }

    function keluarmodal_modKeuanganAPRwtBayar() {
        $('#modKeuanganAPRwtBayar_listtransaksi1').hide();
        $('#ModKeuanganAP_listtransaksi1').show();
        // $('#keuanganAP_listtransaksi2').show();
        /* $('.modal-backdrop').hide(); */
        sessionStorage.clear();
    }
</script>