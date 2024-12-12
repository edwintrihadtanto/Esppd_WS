<?php
$data = json_decode($_GET['data']);
$id_gudang_unit       = str_replace('"', '', json_encode($data->id_gudang_unit));
?>
<div class="content modal fade" id="mod_ListBarangLogistikUnitpakai_daftarBarang">
    <div class="container-fluid ">
        <div class="modal-dialog modal-lg">
            <div class="overlay-wrapper" id="mod_ListBarangLogistikUnitpakai_loading">
                <div class="overlay">
                    <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                </div>
            </div>
            <h6 id="nm_function" style="display: none;"></h6>
            <div class="modal-content" style="overflow: auto;">
                <div class="modal-body p-1">
                    <div class="row">
                        <div class="col-sm-11 input-group">
                            <input type="search" class="form-control form-control-xs" id="emod_ListBarangLogistikUnitpakai_pencarianbarang" placeholder="Pencarian Barang" autocomplete="off">
                        </div>
                        <div class="col-sm-1">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    </div>
                    <div class="p-1">
                        <table id="mod_ListBarangLogistikUnitpakai_table_daftarBarang" class="table table-striped table-sm choose">
                            <thead>
                                <tr>
                                    <th width="10">#</th>
                                    <th width="80">ID</th>
                                    <th>Nama Barang</th>
                                    <th width="50">Stok</th>
                                </tr>
                            </thead>
                            <tbody id="mod_ListBarangLogistikUnitpakai_table_listdaftarBarang"></tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    var id_gd_unit = <?= $id_gudang_unit ?>;
    /* var nm = $("#nm_function").html(); */
    showUp_ModKeuanganJurnalUmum()

    function showUp_ModKeuanganJurnalUmum() {
        $("#mod_ListBarangLogistikUnitpakai_daftarBarang").modal({
            backdrop: "static"
        });
        $('#mod_ListBarangLogistikUnitpakai_daftarBarang').on('shown.bs.modal', function() {});
    }
    /* $("#mod_ListBarangLogistikUnitpakai_daftarBarang").modal({
        backdrop: "static"
    });
    $('#mod_ListBarangLogistikUnitpakai_daftarBarang').on('shown.bs.modal', function() {
        $('#emod_ListBarangLogistikUnitpakaiDokter_pencarianobat').focus();
    }) */
    var searchnmobat = '';
    show(searchnmobat);
    $('#mod_ListBarangLogistikUnitpakai_table_daftarBarang').dataTable({
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
        tabel_obatpencarian = $('#mod_ListBarangLogistikUnitpakai_table_daftarBarang').dataTable();
    }
    // $('#tabletindakan_mod_ListBarangLogistikUnitpakai_daftarBarang tbody tr').each(function() {
    //   $(this).find('td:nth-child(2) input').focus();
    // });
    document.getElementById("emod_ListBarangLogistikUnitpakai_pencarianbarang").onkeyup = function(event) {
        searching_obat(event)
    };

    function searching_obat(event) {
        if ((event.keyCode == 13) || (event.keyCode == 37) || (event.keyCode == 39) || (event.keyCode == 38) || (event.keyCode == 40)) {
            event.preventDefault();
        } else if ((event.keyCode >= 65) && (event.keyCode <= 90)) {
            $('#mod_ListBarangLogistikUnitpakai_loading').show();
            searchpemakaianLogistik = document.getElementById("emod_ListBarangLogistikUnitpakai_pencarianbarang").value;
            if (searchpemakaianLogistik == '') {
                $('#mod_ListBarangLogistikUnitpakai_loading').hide();
                $('#mod_ListBarangLogistikUnitpakai_table_listdaftarBarang').html('');
                $('#mod_ListBarangLogistikUnitpakai_table_listdaftarBarang').append("<tr><td colspan ='6' align='center'>Data Tidak Ditemukan ...</td></tr>");
                $('#emod_ListBarangLogistikUnitpakai_pencarianbarang').focus();
            } else if (searchpemakaianLogistik.length >= 3) {
                $('#mod_ListBarangLogistikUnitpakai_table_listdaftarBarang').html('');
                show(searchpemakaianLogistik);
            } else {
                $('#mod_ListBarangLogistikUnitpakai_loading').hide();
                $('#mod_ListBarangLogistikUnitpakai_table_listdaftarBarang').html('');
                $('#mod_ListBarangLogistikUnitpakai_table_listdaftarBarang').append("<tr><td colspan ='6' align='center'>Data Tidak Ditemukan ...</td></tr>");
            }
        }

    }

    function show(searchpemakaianLogistik) {
        $('#mod_ListBarangLogistikUnitpakai_loading').hide();
        /* var listParam = [
            'emod_ListBarangLogistikUnitpakaiDokter_pencarianobat'
        ]; */
        var param = {
            cari_barang: searchpemakaianLogistik,
            id_gd_unit: user['id_gudang_unit']
        };
        apiPOST("Logistik/getlistStokUnit", param, hasil => {
            if (hasil['data'] !== null) {
                if (hasil['code'] == 'XX') {
                    toastr.error("Daftar Barang tidak ditemukan.");
                    //$('#mod_ListBarangLogistikUnitpakai_table_listdaftarBarang').append("<tr><td colspan ='6' align='center'>Data Tidak Ditemukan ...</td></tr>");
                } else {
                    var Baris = '';
                    var a = hasil['data'];
                    for (var i = 0; i < a.length; i++) {
                        var no = i + 1;
                        var id_barang_logistik = a[i].id_barang_logistik;
                        var nama_barang = a[i].nama_barang;
                        var qty_total = a[i].qty_total;
                        var id_acc = a[i].id_acc;
                        var harga_beli = a[i].harga_beli;
                        var harga_pokok = a[i].harga_pokok;


                        Baris += '<tr class="odd" onclick="ModPemakaianLogistik_pilih(' + "'" + id_barang_logistik + "','" + nama_barang + "','" + qty_total + "','" + id_acc + "','" + harga_beli + "','" + harga_pokok + "'" + ')">';
                        Baris += '<td>' + no + '</td>';
                        Baris += '<td>' + id_barang_logistik + '</td>';
                        Baris += '<td>' + nama_barang + '</td>';
                        Baris += '<td>' + qty_total + '</td>';
                        Baris += "</tr>";
                        no++;
                    }
                    /* tabel_obatpencarian.fnDestroy(); */
                    document.getElementById("mod_ListBarangLogistikUnitpakai_table_listdaftarBarang").innerHTML = Baris;
                    refresh();
                }
                $('#mod_ListBarangLogistikUnitpakai_loading').hide();
                /* document.getElementById("mod_ListBarangLogistikUnitpakai_table_daftarBarang_filter").style.display = "none"; */
                document.getElementById("mod_ListBarangLogistikUnitpakai_table_daftarBarang_length").style.display = "none";
                document.getElementById("mod_ListBarangLogistikUnitpakai_table_daftarBarang_paginate").style.display = "none";
            }

        });
    };



    function keluarmod_ListBarangLogistikUnitpakai_daftarBarang() {
        $('#mod_ListBarangLogistikUnitpakai_daftarBarang').modal('hide');
        $('.modal-backdrop').hide();
        // sessionStorage.clear();
    }

    /* function ReturnLogistik_pilih(id_logistik_pemakaian, nama_barang, qty_total) {

    } */
</script>