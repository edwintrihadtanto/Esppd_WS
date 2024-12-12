<?php
$data = json_decode($_GET['data']);
$id_acc       = str_replace('"', '', json_encode($data->id_acc));
?>
<div class="col-md-12 p-2" id="modkeuanganAR_list1">
    <div class="card card-outline">
        <div class="overlay-wrapper" id="loadingmodkeuanganAR">
            <div class="overlay">
                <i class="fas fa-3x fa-sync-alt fa-spin"></i>
            </div>
        </div>

        <div class="card-body p-1" style="max-height: 420px; overflow: auto;">
            <div class="card" style="box-shadow: 0 0 3px #343a40; margin-bottom: 0;">
                <div>
                    <div class="card-header p-1">
                        <div class="row">
                            <div class="col-md-12">
                                <h6 class="hr6-custom" id="modkeuanganAR_titleheader"><i class="fas fa-boxes"></i> </i> Account Receivable (AR)</h6>
                                <button type="button" class="btn btn-outline-danger btn-xs" onclick="modkeuanganAR_kembali()"><i class="fa fa-arrow-left"></i> Kembali</button>
                                <button type="button" class="btn btn-info btn-xs" onclick="modkeuanganAR_refresh()"><i class="fa fa-sync-alt fa-spin"></i> Refresh Data</button>
                            </div>
                        </div>
                        <!-- END LETAK BUTTON -->
                    </div>
                </div>
            </div>

            <table id="modkeuanganAR_daftar" class="table table-striped table-sm choose">
                <thead>
                    <tr>
                        <th class="pl-0" width="5" style="text-align:center;">No.</th>
                        <th width="5">
                            <div class="custom-control custom-checkbox "><input name="keuanganJurnalUmum_checkedtgl" type="checkbox" class="custom-control-input" id="keuanganJurnalUmum_checkedtgl" onclick="tampilkeuanganJurnalUmum_checkBox()"><label class="custom-control-label" for="keuanganJurnalUmum_checkedtgl"></label></div>
                            </td>
                        </th>
                        <th width="5">ID</th>
                        <th width="100">
                            Penerima
                        </th>
                        <th width="50">
                            Tgl. Transaksi
                        </th>
                        <th width="50">
                            Debit
                        </th>
                        <th width="50">
                            Kredit
                        </th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

    </div>
</div>

<div class="modmodkeuanganAR_content"></div>

<script>
    var idaccAR = "<?php echo $id_acc; ?>";


    tampilmodkeuanganAR();

    function tampilmodkeuanganAR() {
        $('#loadingmodkeuanganAR').show();
        var param = {
            id_acc: idaccAR
        };

        apiPOST("Keuangan/list_modkeuanganAR", param, hasil => {
            $('#loadingmodkeuanganAR').hide();
            $('#modkeuanganAR_daftar tbody').html('');
            var a = hasil['data'];
            if (hasil['data'] !== null) {
                if (hasil['code'] == 'XX') {
                    toastr.error("Data tidak ditemukan");
                    var Baris = "";
                    Baris += '<tr><td colspan="7" align="center">Data tidak ditemukan</td></tr>';
                    $('#modkeuanganAR_daftar').append(Baris);
                } else {
                    toastr.success("Data ditemukan");
                    var Baris = '';
                    for (var i = 0; i < a.length; i++) {
                        var id_ar = a[i].id_ar;
                        var nm_penerima = a[i].nm_penerima;
                        var debit = a[i].debit;
                        var kredit = a[i].kredit;
                        var date_create = a[i].date_create;
                        var no = i + 1;


                        Baris += '<tr>';
                        Baris += '<td class="text-center">' + no + '</td>';
                        Baris += '<td><div class="custom-control custom-checkbox "><input name="keuanganJurnalUmum_checkedtgl" type="checkbox" class="custom-control-input" id="keuanganJurnalUmum_checkedtgl" onclick="tampilkeuanganJurnalUmum_checkBox()"><label class="custom-control-label" for="keuanganJurnalUmum_checkedtgl"></label></div></td>';
                        Baris += '<td>' + id_ar + '</td>';
                        Baris += '<td>' + nm_penerima + '</td>';
                        Baris += '<td>' + date_create + '</td>';
                        Baris += '<td class="text-center">' + formatMoney(debit) + '</td>';
                        Baris += '<td class="text-center">' + formatMoney(kredit) + '</td>';
                        Baris += '</tr>';
                    }
                    $('#modkeuanganAR_daftar').append(Baris);
                }
            }
        });

    }

    function modkeuanganAR_refresh() {
        document.getElementById('modkeuanganAR_GudangUnit').value = '';
        tampilmodkeuanganAR();
    }

    function modkeuanganAR_kembali() {
        $('#modkeuanganAR_list1').hide();
        $('#keuanganAR_listtransaksi1').show();
        $('#keuanganAR_listtransaksi2').show();
        tampilkeuanganAR();
    }
</script>