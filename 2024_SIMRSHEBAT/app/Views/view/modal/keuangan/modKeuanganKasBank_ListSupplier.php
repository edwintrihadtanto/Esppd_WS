<div class="content modal fade" id="modKeuanganKasBank_ListSupplier_daftar">
    <div class="container-fluid ">
        <div class="modal-dialog modal-lg">
            <div class="overlay-wrapper" id="modKeuanganKasBank_ListSupplier_loading">
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
                            <table id="modKeuanganKasBank_ListSupplier_table_daftar" data-single-select="true" data-click-to-select="true" data-sticky-header="true" data-header-style="headerStyleLookupListSupplier" data-row-style="rowStyleLookupListSupplier" data-pagination="true" data-pagination-parts="['pageInfo', 'pageList']" data-search="true" class="table-sm">
                                <thead>
                                    <tr>
                                        <th data-field="id" data-sortable="true" data-width="60">ID</th>
                                        <th data-field="nama" data-sortable="true" data-width="250">Supplier</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    showUp_modKeuanganKasBank_ListSupplier()
    var idmodKeuanganKasBank_ListSupplier = '';


    function showUp_modKeuanganKasBank_ListSupplier() {
        $("#modKeuanganKasBank_ListSupplier_daftar").modal({
            backdrop: "static"
        });
        $('#modKeuanganKasBank_ListSupplier_daftar').on('shown.bs.modal', function() {});
    }

    $('#modKeuanganKasBank_ListSupplier_table_daftar').bootstrapTable({
        onClickRow: (row, element, field) => {
            if (row['id_penjamin'] == idmodKeuanganKasBank_ListSupplier) {
                hideDetailmodKeuanganKasBank_ListSupplier();
            } else {
                showDetailmodKeuanganKasBank_ListSupplier(row, element[0]);
            }
        }
    });

    modKeuanganKasBank_ListSupplier()
    var modKeuanganKasBank_Carilist_ListSupplier = false;


    function modKeuanganKasBank_ListSupplier() {
        apiPOST('Keuangan/ListSupplier', null, hasil => {
            if (hasil !== null) {
                $('#modKeuanganKasBank_ListSupplier_table_daftar').bootstrapTable('append', hasil['data']);
                $('#modKeuanganKasBank_ListSupplier_loading').hide();

            }
        }).then(value => {
            modKeuanganKasBank_Carilist_ListSupplier = true;
            // selesaiLoadingAwalSetupproduk();
        });
    }


    function headerStyleLookupListSupplier(column) {
        return {
            css: {
                background: '#a8d4da',
                color: 'black',
                border: '2px solid black',
                padding: '0px'
            }
        };
    }

    function rowStyleLookupListSupplier(row, index) {
        if (localStorage.getItem("mode") == "dark-theme") {
            return {
                css: {
                    background: 'transparant',
                    border: '2px solid black',
                    padding: '2px'
                }
            };
        } else {
            return {
                css: {
                    background: 'white',
                    border: '2px solid black',
                    padding: '2px'
                }
            };
        }
    }

    function showDetailmodKeuanganKasBank_ListSupplier(data = null, parent = null) {
        modKeuanganBukuBesar_ListPenerima_pilih(data['nama_penjamin'])
        keluarmodKeuanganKasBank_ListSupplier_daftar()
    }



    function keluarmodKeuanganKasBank_ListSupplier_daftar() {
        $('#modKeuanganKasBank_ListSupplier_daftar').modal('hide');
        $('.modal-backdrop').hide();
        // sessionStorage.clear();
    }
</script>