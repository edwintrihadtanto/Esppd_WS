<?php
$data = json_decode($_GET['data']);
$kode_vendor       = str_replace('"', '', json_encode($data->kode_vendor));
$nm_Vendor       = str_replace('"', '', json_encode($data->nama_ven));
$idAcc_ap       = str_replace('"', '', json_encode($data->id_acc));
?>

<div class="container-fluid" id="ModKeuanganAP_listtransaksi1">
    <div class="row p-0">
        <div class="col-md-3 col-sm-6 col-12 p-1">
            <div class="info-box pb-0">
                <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="70">ID</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="form-control form-control-xs" id="ModKeuanganAP_id" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td>:</td>
                        <td><input type="date" class="form-control form-control-xs" id="ModKeuanganAP_tgltrans"></td>
                    </tr>
                    <tr>
                        <td>Kas - Bank</td>
                        <td>:</td>
                        <td>
                            <select class="form-control form-control-xs" id="ModKeuanganAP_kasbank">
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12 p-1">
            <div class="info-box pb-0">
                <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="70">Jumlah</td>
                        <td>:</td>
                        <td><input type="text" class="form-control form-control-xs" id="ModKeuanganAP_totaljumlah" value="" placeholder="0,00" disabled></td>
                    </tr>
                    <tr>
                        <td width="70">Sisa Return</td>
                        <td>:</td>
                        <td><input type="text" class="form-control form-control-xs" id="ModKeuanganAP_sisareturn" value="" placeholder="0,00" disabled hidden><input type="text" class="form-control form-control-xs" id="ModKeuanganAP_sisareturnview" value="" placeholder="0,00" disabled></td>
                    </tr>
                    <tr>
                        <td width="70">Total Tagihan</td>
                        <td>:</td>
                        <td><input type="text" class="form-control form-control-xs" id="ModKeuanganAP_totaltagihan" value="" placeholder="0,00" disabled hidden><input type="text" class="form-control form-control-xs" id="ModKeuanganAP_totaltagihanview" value="" placeholder="0,00" disabled></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12 p-1">
            <div class="info-box pb-0">
                <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td>Jenis Penerima</td>
                        <td>:</td>
                        <td>
                            <select class="form-control form-control-xs" id="ModKeuanganAP_jenispenerima" disabled>
                                <option value="1">SUPPLIER</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Penerima</td>
                        <td>:</td>
                        <td>
                            <div class="input-group-prepend">
                                <input type="text" class="form-control form-control-xs" id="ModKeuanganAP_penerima" disabled>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12 p-1">
            <div class="info-box pb-0">
                <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td>Keterangan</td>
                        <td>:</td>
                        <td><textarea class="form-control form-control-sm" id="ModKeuanganAP_keterangan" name="ModKeuanganAP_keterangan" style="height:50px;"></textarea></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="card card-row">
        <div class="overlay-wrapper" id="loadingModKeuanganAP">
            <div class="overlay dark">
                <i class="fas fa-3x fa-sync-alt fa-spin"></i>
            </div>
        </div>
        <div class="card-header p-1 darkgrey-custom">
            <div class="row">
                <div class="col-auto">
                    <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="ModKeuanganAP_simpan()" id="ModKeuanganAP_simpan" hidden><i class="fa fa-save"></i> Simpan</button>
                    <div class="btn-group" style="display: none;">
                        <button type="button" class="btn bg-gradient-secondary btn-xs" hidden><i class="fa fa-print"></i> Cetak</button>
                        <button type="button" class="btn bg-gradient-secondary btn-xs dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                            <span class="sr-only"></span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="#"><span><i class="fa fa-print"></i> Cetak</span></a>
                        </div>
                    </div>
                    <button type="button" class="btn btn-outline-danger btn-xs" onclick="ModKeuanganAP_kembalikeawal()"><i class="fa fa-arrow-left"></i> Kembali</button>
                    <button type="button" class="btn bg-gradient-warning btn-xs" onclick="bukamodkeuanganAPRwtByr('<?= $kode_vendor ?>')"><i class="fa fa-file"></i> Riwayat Pembayaran</button>
                    <button type="button" class="btn bg-gradient-danger btn-xs" onclick="ModPembelianLogistik_bayar()"><i class="fa fa-money-bill"></i> Bayar</button>
                </div>
                <div class="col-auto">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text form-control-xs">Filter Tgl. Transaksi</span>
                        </div>
                        <input type="date" class="form-control form-control-xs" onchange="filterTanggalKeuanganAP()" id="ModKeuanganAP_filtertgl">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="col-sm-12 p-1" style="max-height: 350px; overflow-x: hidden;">
                <table border="0" cellpadding="0" cellspacing="0" id="ModKeuanganAP_ListDetailKeuanganAP" class="table table-striped table-sm choose table-bordered">
                    <thead>
                        <tr>
                            <th class="pl-0" width="5" style="text-align:center;">No.</th>
                            <th width="10" style='text-align:center;'><input type='checkbox' id='checklistdataTransaksiAll'></th>
                            <th width="10">ID</th>
                            <th width="50">Vendor</th>
                            <th width="10">Kode Faktur</th>
                            <th width="30">COA</th>
                            <th width="100">Keterangan</th>
                            <th class="pl-0" width="30">Tgl Transaksi</th>
                            <th class="pl-0" width="70" style="text-align:center;">Jumlah</th>
                            <th class="pl-0" width="70" style="text-align:center;">Pegawai</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="content modal fade" id="modalKonfirmasiBayarAP">
    <div class="container-fluid ">
        <div class="modal-dialog modal-lg">
            <div class="overlay-wrapper" id="modalKonfirmasiBayarAP_loading">
                <div class="overlay">
                    <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                </div>
            </div>
            <h6 id="nm_function" style="display: none;"></h6>
            <div class="modal-content" style="overflow: auto;">
                <div class="modal-body p-1">
                    <div class="p-1">
                        <div class="col">
                            <button type="button" class="btn btn-outline-danger btn-xs" data-dismiss="modal" aria-label="Close"><i class="fa fa-arrow-left"></i> Kembali</button>
                        </div>
                    </div>
                    <div class="col">
                        <table class="table table-sm">
                            <tr>
                                <th>Penerima</th>
                                <th>:</th>
                                <th>
                                    <input type="text" class="form-control form-control-xs" id="modalKonfirmasiBayarAP_penerima" disabled>
                                </th>
                            </tr>
                            <tr>
                                <th>Sumber Kas</th>
                                <th>:</th>
                                <th>
                                    <input type="text" class="form-control form-control-xs" id="modalKonfirmasiBayarAP_sbrKas" disabled>
                                </th>
                            </tr>
                            <tr>
                                <th>Tagihan</th>
                                <th>:</th>
                                <th>
                                    <input type="text" class="form-control form-control-xs" id="modalKonfirmasiBayarAP_totaltagihan" disabled>
                                </th>
                            </tr>
                            <tr>
                                <th>Dibayar</th>
                                <th>:</th>
                                <th>
                                    <input type="text" class="form-control form-control-xs" id="modalKonfirmasiBayarAP_dibayar" disabled>
                                </th>
                            </tr>
                        </table>
                    </div>
                    <div class="p-1">
                        <div class="col">
                            <button type="button" class="btn bg-gradient-success btn-xs" onclick="ModKeuanganAP_simpan()"><i class="fa fa-money"></i>Ya Bayar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modkeuanganAPRwtByr_content"></div>


<script>
    var kode_vendor = '<?= $kode_vendor ?>';
    var nm_Vendor = '<?= $nm_Vendor ?>';
    var idAcc_ap = '<?= $idAcc_ap ?>';

    document.getElementById("ModKeuanganAP_id").value = kode_vendor;
    document.getElementById("ModKeuanganAP_id").value = kode_vendor;
    document.getElementById("ModKeuanganAP_penerima").value = nm_Vendor;
    document.getElementById("ModKeuanganAP_tgltrans").value = nowday;

    // showUp_ModKeuanganAP();
    tampilkan_ListDetailKeuanganAP();
    getKasmasuk_ModKeuanganAP();


    /* function showUp_ModKeuanganAP() {
        $("#modal_ModKeuanganAP").modal({
            backdrop: "static"
        });
        $('#modal_ModKeuanganAP').on('shown.bs.modal', function() {});
    }
    $('#loadingModKeuanganAP').hide(); */

    function getKasmasuk_ModKeuanganAP() {
        var param = {
            kascari: ''
        };
        apiPOST('Keuangan/getKas', param, hasil => {
            var data = '';
            if (hasil !== null) {
                var a = hasil['data'];
                for (var i = 0; i < a.length; i++) {
                    data += '<option value="' + a[i]['id_acc'] + '">' + a[i]['kas_nama'] + '</option>';
                }
                document.getElementById('ModKeuanganAP_kasbank').innerHTML = data;
            }
        });
    }
    list_returnKeuanganAP()

    function list_returnKeuanganAP() {
        var param = {
            kode_vendor: kode_vendor
        };
        apiPOST('Keuangan/listReturn_keuanganAP', param, hasil => {
            var a = hasil['data'];

            if (hasil['data'] !== null) {
                var sumtotal = 0;
                for (var i = 0; i < a.length; i++) {

                    no_ret = a[i]['no_ret'];
                    total_return = a[i]['total_return'];
                    sumtotal += parseFloat(total_return);
                }
                document.getElementById("ModKeuanganAP_sisareturnview").value = formatMoney(sumtotal);
                document.getElementById("ModKeuanganAP_sisareturn").value = sumtotal;
            }
        });
    }

    function filterTanggalKeuanganAP() {
        $('#ModKeuanganAP_ListDetailKeuanganAP tbody tr').find('#checklistdataTransaksi').each(function() {
            this.checked = false;
            checklistdataTransaksi()
        });
        document.getElementById("checklistdataTransaksiAll").checked = false;

        tampilkan_ListDetailKeuanganAP()
    }

    function tampilkan_ListDetailKeuanganAP() {
        var param = {
            kode_vendor: kode_vendor,
            filterTgl: document.getElementById("ModKeuanganAP_filtertgl").value
        };
        apiPOST('Keuangan/list_keuanganAPdetail', param, hasil => {
            $('#loadingModKeuanganAP').hide();
            $('#ModKeuanganAP_ListDetailKeuanganAP tbody').html('');
            var a = hasil['data'];
            var Baris = '';

            if (hasil['data'] !== null) {
                if (hasil['code'] == 'XX') {
                    toastr.error("Data tidak ditemukan");
                    var Baris = "";
                    Baris += '<tr><td colspan="10" align="center">Data tidak ditemukan</td></tr>';
                    $('#ModKeuanganAP_ListDetailKeuanganAP').append(Baris);
                } else {
                    toastr.success("Data ditemukan");
                    for (var i = 0; i < a.length; i++) {

                        id_jurnal = a[i]['id_jurnal'];
                        nama_ven = a[i]['nama'];
                        coa = a[i]['coa'];
                        id_coa = a[i]['id_coa'];
                        keterangan = a[i]['keterangan'];
                        date_created = a[i]['date_created'];
                        nama_pegawai = a[i]['nama_pegawai'];
                        kode_fak = a[i]['kode_fak'];
                        kredit = a[i]['kredit'];
                        id_beli = a[i]['id_beli'];
                        no = i + 1;

                        Baris += '<tr>';
                        Baris += '<td>' + no + '</td>';
                        // Baris += "<td style='text-align:center;'><input type='checkbox' id='checklistdataTransaksi' name='ModKeuanganAP_checklistdataTransaksi[]' onchange='checklistdataTransaksi()' value='[" + '"' + kredit + '","' + id_jurnal + '","' + id_coa + '"' + "]'></td>";
                        Baris += "<td style='text-align:center;'><input type='checkbox' id='checklistdataTransaksi' name='ModKeuanganAP_checklistdataTransaksi[]' onchange='checklistdataTransaksi()' value='[" + kredit + "," + id_jurnal + "," + id_beli + "]'></td>";
                        Baris += '<td>'
                        Baris += id_jurnal;
                        Baris += "<input type='text' class='form-control form-control-xs' name='ModKeuanganAP_inputidjurnal[]' value='" + id_jurnal + "' hidden>"
                        Baris += "<input type='text' class='form-control form-control-xs' name='ModKeuanganAP_inputidjml[]' value='" + kredit + "' hidden>"
                        Baris += '</td>';
                        Baris += '<td>' + nama_ven + '</td>';
                        Baris += '<td>' + kode_fak + '</td>';
                        Baris += '<td>' + id_coa + ' || ' + coa + '</td>';
                        Baris += '<td>' + keterangan + '</td>';
                        Baris += '<td>' + date_created + '</td>';
                        Baris += '<td class="text-right">' + formatMoney(kredit) + '</td>';
                        Baris += '<td>' + nama_pegawai + '</td>';
                    }
                    $('#ModKeuanganAP_ListDetailKeuanganAP').append(Baris);

                }
            }
        });
    }

    $('#checklistdataTransaksiAll').click(function(event) {
        if (this.checked) {
            $('#ModKeuanganAP_ListDetailKeuanganAP tbody tr').find('#checklistdataTransaksi').each(function() {
                this.checked = true;
                checklistdataTransaksi()
            });
        } else {
            $('#ModKeuanganAP_ListDetailKeuanganAP tbody tr').find('#checklistdataTransaksi').each(function() {
                this.checked = false;
                checklistdataTransaksi()
            });
        }
    });

    function checklistdataTransaksi() {
        var total = 0;
        cek = document.getElementById("ModKeuanganAP_sisareturn").value;
        $('#ModKeuanganAP_ListDetailKeuanganAP tbody tr').find(':checkbox:checked').each(function(i, n) {
            const totalarray = JSON.parse($(n).val());
            total += totalarray[0];
        })
        if (total == 0) {
            hasil = 0
        } else {
            hasil = parseFloat(total) - parseFloat(cek);
        }
        document.getElementById("ModKeuanganAP_totaltagihanview").value = formatMoney(hasil);
        document.getElementById("ModKeuanganAP_totaltagihan").value = hasil;

        $('#ModKeuanganAP_totaljumlah').val(formatMoney(total));
    }



    function ModKeuanganAP_kembalikeawal() {
        /* var id = document.getElementById("ModKeuanganAP_id").value;
        if (id !== '') { */
        pertanyaan.fire({
            title: 'Kembali ke menu awal',
            // html: '<span>Data Input Pembelian Belum diSimpan, Data yang sudah dientry akan hilang, tetap kembali ?</span>',
            icon: 'question',
            showCancelButton: true,
            reverseButtons: false,
            allowOutsideClick: false
        }).then((result) => {
            if (result.isConfirmed) {
                keluarmodal_ModKeuanganAP();
            } else if (result.dismiss === Swal.DismissReason.cancel) {

            }
        })
        /* } else {
            keluarmodal_ModKeuanganAP();
        } */
    }

    function keluarmodal_ModKeuanganAP() {
        $('#ModKeuanganAP_listtransaksi1').hide();
        $('#keuanganAP_listtransaksi1').show();
        $('#keuanganAP_listtransaksi2').show();
        $('.modal-backdrop').hide();
        tampilkeuanganAP();


        sessionStorage.clear();
    }

    function ModPembelianLogistik_bayar() {
        cektagihan = document.getElementById("ModKeuanganAP_totaltagihan").value;
        /* if (cektagihan <= 0) {
            toastr.error("Inputan masih kosong !!!");
        } else { */
        cek_total_trans = document.getElementById("ModKeuanganAP_totaljumlah").value;
        total_trans = cek_total_trans.replace('.', '')
        var param = {
            cek_id_kas: document.getElementById("ModKeuanganAP_kasbank").value,
        };
        apiPOST('Keuangan/getCekKas', param, hasil => {
            cek = document.getElementById("ModKeuanganAP_totaljumlah").value;
            cekket = document.getElementById("ModKeuanganAP_keterangan").value;
            if (cek == '' || cek == '0,00' || cekket == '') {
                toastr.error("Inputan masih kosong !!!");
            } else {
                if (parseFloat(total_trans) > parseFloat(hasil['saldo'])) {
                    toastr.error("Saldo Kas tidak Cukup !!!");
                } else {
                    $("#modalKonfirmasiBayarAP").modal({
                        backdrop: "static"
                    });
                    $('#modalKonfirmasiBayarAP').on('shown.bs.modal', function() {
                        $('#modalKonfirmasiBayarAP_loading').hide();
                        var cek_modalApKasbank = document.getElementById("ModKeuanganAP_kasbank");
                        var modalApKasbank = cek_modalApKasbank.options[cek_modalApKasbank.selectedIndex].text;
                        modalApTagihan = document.getElementById("ModKeuanganAP_totaljumlah").value;
                        modalApDibayar = document.getElementById("ModKeuanganAP_totaljumlah").value;
                        document.getElementById("modalKonfirmasiBayarAP_penerima").value = nm_Vendor;
                        document.getElementById("modalKonfirmasiBayarAP_sbrKas").value = modalApKasbank;
                        document.getElementById("modalKonfirmasiBayarAP_totaltagihan").value = modalApTagihan;
                        document.getElementById("modalKonfirmasiBayarAP_dibayar").value = modalApDibayar;
                    });
                }
            }
        });
        /* } */
    }

    params_KeuanganAPRet()


    function params_KeuanganAPRet() {
        var param = {
            kode_vendor: kode_vendor
        };
        if (kode_vendor.substr(0, 1) == 'F') {
            apiPOST('Keuangan/listReturn_keuanganAP', param, hasil => {
                if (hasil['data'] !== null) {
                    a = hasil['data'];
                } else {
                    a = [];
                }
            });
            return a;
        } else {
            a = [];
            return a;
        }

    }

    // console.log(params_KeuanganAPRet())


    function params_ModKeuanganAP() {

        var get_idJurnal = document.getElementsByName('ModKeuanganAP_inputidjurnal[]');
        var test = document.getElementsByName('ModKeuanganAP_checklistdataTransaksi[]');
        var get_itemJml = document.getElementsByName('ModKeuanganAP_inputidjml[]');
        var count = $('#ModKeuanganAP_ListDetailKeuanganAP tbody tr').length;

        var params = {};
        params.data = [];
        $('#ModKeuanganAP_ListDetailKeuanganAP tbody tr').find(':checkbox:checked').each(function(i, n) {
            const totalarray = JSON.parse($(n).val());
            var x = {};
            x.id_jurnal = totalarray[1];
            x.jml = totalarray[0];
            x.id_beli = totalarray[2];
            params.data.push(x);
        })
        return params.data;

    }

    function ModKeuanganAP_simpan() {
        cektotal_jumlah1 = document.getElementById("ModKeuanganAP_totaljumlah").value;
        cektotal_jumlah2 = cektotal_jumlah1.replace('.', '');
        total_jumlah = cektotal_jumlah2.replace(',', '.');

        var param = {
            kode_vendor: kode_vendor,
            kas_bank: document.getElementById("ModKeuanganAP_kasbank").value,
            tgl_trans: document.getElementById("ModKeuanganAP_tgltrans").value,
            jenis_penerima: document.getElementById("ModKeuanganAP_jenispenerima").value,
            total_jumlah: total_jumlah,
            penerima: nm_Vendor,
            idAcc_ap: idAcc_ap,
            ket: document.getElementById("ModKeuanganAP_keterangan").value,
            id_user: user['id_user'],
            data: params_ModKeuanganAP(),
            count: params_ModKeuanganAP().length,
            dataRet: params_KeuanganAPRet(),
            countRet: params_KeuanganAPRet().length
        };

        apiPOST('Keuangan/SimpanModKeuanganAP', param, hasil => {
            if (hasil != null) {
                toastr.success("Simpan Berhasil");
                $('#modalKonfirmasiBayarAP').hide();

                keluarmodal_ModKeuanganAP()
            }
        });
    }

    /* Tanpa Rupiah */
    var tanpa_rupiah = document.getElementById('ModKeuanganAP_totaljumlah');
    tanpa_rupiah.addEventListener('keyup', function(e) {
        tanpa_rupiah.value = formatRupiah(this.value);
    });

    /* Fungsi */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? +rupiah : '');
    }

    function bukamodkeuanganAPRwtByr(kode_vendor) {
        $('#ModKeuanganAP_listtransaksi1').hide();

        var data = {
            kode_vendor: kode_vendor

        }
        var datax = JSON.stringify(data);
        $('.modkeuanganAPRwtByr_content').load('Keuangan/modKeuanganAPRwtByr?data=' + datax);
    }
</script>