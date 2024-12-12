<?php
$data = json_decode($_GET['data']);
$flag       = str_replace('"', '', json_encode($data->flag));
?>
<div class="content modal fade" id="modpenerimaanAsetListAccount_Account">
    <div class="container-fluid ">
        <div class="modal-dialog modal-lg">
            <div class="overlay-wrapper" id="modpenerimaanAsetListAccount_loading">
                <div class="overlay">
                    <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                </div>
            </div>
            <h6 id="nm_function" style="display: none;"></h6>
            <div class="modal-content" style="overflow: auto;">
                <div class="modal-body p-1">
                    <div class="row">
                        <div class="col-sm-11 input-group">
                            <input type="search" class="form-control form-control-xs" id="emodpenerimaanAsetListAccount_cariaccount" placeholder="Pencarian Account" autocomplete="off">
                        </div>
                        <div class="col-sm-1">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    </div>
                    <div class="p-1">
                        <table id="modpenerimaanAsetListAccount_table_Account" class="table table-striped table-sm choose">
                            <thead>
                                <tr>
                                    <th width="10">#</th>
                                    <th width="80">Kode Account</th>
                                    <th>Account</th>
                                </tr>
                            </thead>
                            <tbody id="modpenerimaanAsetListAccount_table_listAccount"></tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    var flag = '<?= $flag ?>';
    var nm = $("#nm_function").html();
    showUp_modpenerimaanAsetListAccount()

    function showUp_modpenerimaanAsetListAccount() {
        $("#modpenerimaanAsetListAccount_Account").modal({
            backdrop: "static"
        });
        $('#modpenerimaanAsetListAccount_Account').on('shown.bs.modal', function() {});
    }
    /* $("#modpenerimaanAsetListAccount_Account").modal({
        backdrop: "static"
    });
    $('#modpenerimaanAsetListAccount_Account').on('shown.bs.modal', function() {
        $('#emodpenerimaanAsetListAccount_cariaccount').focus();
    }) */
    var searchnmobat = '';
    show(searchnmobat);
    $('#modpenerimaanAsetListAccount_table_Account').dataTable({
        "paging": true,
        "lengthChange": true,
        "searching": false,
        "ordering": false,
        "info": false,
        "autoWidth": false,
        "processing": true,
        //"serverSide"    : true,
        "responsive": true,
        "retrieve": true,
    });

    function refresh() {
        tabel_obatpencarian = $('#modpenerimaanAsetListAccount_table_Account').dataTable();
    }
    // $('#tabletindakan_modpenerimaanAsetListAccount_Account tbody tr').each(function() {
    //   $(this).find('td:nth-child(2) input').focus();
    // });
    document.getElementById("emodpenerimaanAsetListAccount_cariaccount").onkeyup = function(event) {
        searching_obat(event)
    };

    function searching_obat(event) {
        if ((event.keyCode == 13) || (event.keyCode == 37) || (event.keyCode == 39) || (event.keyCode == 38) || (event.keyCode == 40)) {
            event.preventDefault();
        } else if ((event.keyCode >= 65) && (event.keyCode <= 90)) {
            $('#modpenerimaanAsetListAccount_loading').show();
            searchnmobat = document.getElementById("emodpenerimaanAsetListAccount_cariaccount").value;
            if (searchnmobat == '') {
                $('#modpenerimaanAsetListAccount_loading').hide();
                $('#modpenerimaanAsetListAccount_table_listAccount').html('');
                $('#modpenerimaanAsetListAccount_table_listAccount').append("<tr><td colspan ='6' align='center'>Data Tidak Ditemukan ...</td></tr>");
                $('#emodpenerimaanAsetListAccount_cariaccount').focus();
            } else if (searchnmobat.length >= 3) {
                $('#modpenerimaanAsetListAccount_table_listAccount').html('');
                show(searchnmobat);
            } else {
                $('#modpenerimaanAsetListAccount_loading').hide();
                $('#modpenerimaanAsetListAccount_table_listAccount').html('');
                $('#modpenerimaanAsetListAccount_table_listAccount').append("<tr><td colspan ='6' align='center'>Data Tidak Ditemukan ...</td></tr>");
            }
        }

    }

    function show() {
        $('#modpenerimaanAsetListAccount_loading').hide();
        /* var listParam = [
            'emodpenerimaanAsetListAccount_cariaccount'
        ];
        var param = {
            obatcari: searchnmobat,
            id_user: user['id_user'],
        }; */
        apiPOST("Aset/getAccount_pAset", null, hasil => {
            if (hasil['data'] !== null) {
                if (hasil['code'] == 'XX') {
                    toastr.error("Daftar Account tidak ditemukan.");
                    //$('#modpenerimaanAsetListAccount_table_listAccount').append("<tr><td colspan ='6' align='center'>Data Tidak Ditemukan ...</td></tr>");
                } else {
                    var Baris = '';
                    var a = hasil['data'];
                    for (var i = 0; i < a.length; i++) {
                        var no = i + 1;
                        var id_coa = a[i].id_coa;
                        var coa = a[i].coa;


                        Baris += '<tr class="odd" onclick="ListAccountpenerimaanAset_pilih(' + "'" + flag + "','" + id_coa + "','" + coa + "'" + ')">';
                        Baris += '<td>' + no + '</td>';
                        Baris += '<td>' + id_coa + '</td>';
                        Baris += '<td>' + coa + '</td>';
                        Baris += "</tr>";
                        no++;
                    }
                    /* tabel_obatpencarian.fnDestroy(); */
                    document.getElementById("modpenerimaanAsetListAccount_table_listAccount").innerHTML = Baris;
                    refresh();
                }
                $('#modpenerimaanAsetListAccount_loading').hide();
                /* document.getElementById("modpenerimaanAsetListAccount_table_Account_filter").style.display = "none"; */
                document.getElementById("modpenerimaanAsetListAccount_table_Account_length").style.display = "none";
                document.getElementById("modpenerimaanAsetListAccount_table_Account_paginate").style.display = "none";
            }

        });
    };



    function keluarmodpenerimaanAsetListAccount_Account() {
        $('#modpenerimaanAsetListAccount_Account').modal('hide');
        $('.modal-backdrop').hide();
        // sessionStorage.clear();
    }

    /* function ReturnLogistik_pilih(id_logistik_pemakaian, nama_barang, qty_total) {

    } */
</script>