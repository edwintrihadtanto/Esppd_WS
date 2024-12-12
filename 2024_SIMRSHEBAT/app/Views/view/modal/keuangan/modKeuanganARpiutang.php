<?php
$data = json_decode($_GET['data']);
$id_pembayaran       = str_replace('"', '', json_encode($data->id_pembayaran));
$deskripsi_pembayaran       = str_replace('"', '', json_encode($data->deskripsi_pembayaran));
?>
<div class="col-md-12 p-2" id="modKeuanganARpiutang_list1">
    <div class="card card-outline">
        <div class="overlay-wrapper" id="loadingmodKeuanganARpiutang">
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
                                <h6 class="hr6-custom" id="modKeuanganARpiutang_titleheader"><i class="fas fa-boxes"></i> </i> Account Receivable (AR) <?= $deskripsi_pembayaran ?></h6>
                                <button type="button" class="btn btn-outline-danger btn-xs" onclick="modKeuanganARpiutang_kembali()"><i class="fa fa-arrow-left"></i> Kembali</button>
                                <button type="button" class="btn btn-info btn-xs" onclick="modKeuanganARpiutang_refresh()"><i class="fa fa-sync-alt fa-spin"></i> Refresh Data</button>
                            </div>
                        </div>
                        <!-- END LETAK BUTTON -->
                    </div>
                </div>
            </div>

            <table id="modKeuanganARpiutang_daftar" class="table table-striped table-sm choose">
                <thead>
                    <tr>
                        <th class="pl-0" width="5" style="text-align:center;">No.</th>
                        <th width="10" style='text-align:center;'><input type='checkbox' id='checklistmodKeuanganARpiutangTransaksiAll'></th>
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

<div class="modmodKeuanganARpiutang_content"></div>

<script>
    var id_pembayaranAR = "<?php echo $id_pembayaran; ?>";


    tampilmodKeuanganARpiutang();

    function tampilmodKeuanganARpiutang() {
        $('#loadingmodKeuanganARpiutang').show();
        var param = {
            id_pembayaran: id_pembayaranAR
        };

        apiPOST("Keuangan/list_modKeuanganARpiutang", param, hasil => {
            $('#loadingmodKeuanganARpiutang').hide();
            $('#modKeuanganARpiutang_daftar tbody').html('');
            var a = hasil['data'];
            if (hasil['data'] !== null) {
                if (hasil['code'] == 'XX') {
                    toastr.error("Data tidak ditemukan");
                    var Baris = "";
                    Baris += '<tr><td colspan="7" align="center">Data tidak ditemukan</td></tr>';
                    $('#modKeuanganARpiutang_daftar').append(Baris);
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
                        Baris += "<td class='text-center'><input type='checkbox' id='checklistmodKeuanganARpiutangTransaksi' name='modKeuanganARpiutang_checklistdataTransaksi[]' onchange='checklistmodKeuanganARpiutangTransaksi()' value='[" + id_ar + "," + debit + "]'></td>";
                        Baris += '<td>' + id_ar + '</td>';
                        Baris += '<td>' + nm_penerima + '</td>';
                        Baris += '<td>' + date_create + '</td>';
                        Baris += '<td class="text-center">' + formatMoney(debit) + '</td>';
                        Baris += '<td class="text-center">' + formatMoney(kredit) + '</td>';
                        Baris += '</tr>';
                    }
                    $('#modKeuanganARpiutang_daftar').append(Baris);
                }
            }
        });

    }

    $('#checklistmodKeuanganARpiutangTransaksiAll').click(function(event) {
        if (this.checked) {
            $('#modKeuanganARpiutang_daftar tbody tr').find('#checklistmodKeuanganARpiutangTransaksi').each(function() {
                this.checked = true;
                checklistmodKeuanganARpiutangTransaksi()
            });
        } else {
            $('#modKeuanganARpiutang_daftar tbody tr').find('#checklistmodKeuanganARpiutangTransaksi').each(function() {
                this.checked = false;
                checklistmodKeuanganARpiutangTransaksi()
            });
        }
    });

    function checklistmodKeuanganARpiutangTransaksi() {
        var total = 0;
        // cek = document.getElementById("ModKeuanganAP_sisareturn").value;
        $('#modKeuanganARpiutang_daftar tbody tr').find(':checkbox:checked').each(function(i, n) {
            const totalarray = JSON.parse($(n).val());
            total += totalarray[1];
        })
        if (total == 0) {
            hasil = 0
        } else {
            hasil = parseFloat(total);
        }
        // document.getElementById("ModKeuanganAP_totaltagihanview").value = formatMoney(hasil);
        // document.getElementById("ModKeuanganAP_totaltagihan").value = hasil;

        // $('#ModKeuanganAP_totaljumlah').val(formatMoney(total));
    }

    function modKeuanganARpiutang_refresh() {
        document.getElementById('modKeuanganARpiutang_GudangUnit').value = '';
        tampilmodKeuanganARpiutang();
    }

    function modKeuanganARpiutang_kembali() {
        $('#modKeuanganARpiutang_list1').hide();
        $('#keuanganAR_listtransaksi1').show();
        $('#keuanganAR_listtransaksi2').show();
        tampilkeuanganAR();
    }
</script>