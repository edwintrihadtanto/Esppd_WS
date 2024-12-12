<div class="content modal fade" id="modKeuanganKasBank_ListAsuransi_daftar">
    <div class="container-fluid ">
        <div class="modal-dialog modal-lg">
            <div class="overlay-wrapper" id="modKeuanganKasBank_ListAsuransi_loading">
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
                            <table id="modKeuanganKasBank_ListAsuransi_table_daftar" data-single-select="true" data-click-to-select="true" data-sticky-header="true" data-header-style="headerStyleLookupListAsuransi" data-row-style="rowStyleLookupListAsuransi" data-pagination="true" data-pagination-parts="['pageInfo', 'pageList']" data-search="true" class="table-sm">
                                <thead>
                                    <tr>
                                        <th data-field="id_penjamin" data-sortable="true" data-width="60">ID</th>
                                        <th data-field="nama_penjamin" data-sortable="true" data-width="250">Asuransi</th>
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
    showUp_modKeuanganKasBank_ListAsuransi()
    var idmodKeuanganKasBank_ListAsuransi = '';


    function showUp_modKeuanganKasBank_ListAsuransi() {
        $("#modKeuanganKasBank_ListAsuransi_daftar").modal({
            backdrop: "static"
        });
        $('#modKeuanganKasBank_ListAsuransi_daftar').on('shown.bs.modal', function() {});
    }

    $('#modKeuanganKasBank_ListAsuransi_table_daftar').bootstrapTable({
        onClickRow: (row, element, field) => {
            if (row['id_penjamin'] == idmodKeuanganKasBank_ListAsuransi) {
                hideDetailmodKeuanganKasBank_ListAsuransi();
            } else {
                showDetailmodKeuanganKasBank_ListAsuransi(row, element[0]);
            }
        }
    });

    modKeuanganKasBank_ListAsuransi()
    var modKeuanganKasBank_Carilist_ListAsuransi = false;


    function modKeuanganKasBank_ListAsuransi() {
        apiPOST('Keuangan/ListAsuransi', null, hasil => {
            if (hasil !== null) {
                $('#modKeuanganKasBank_ListAsuransi_table_daftar').bootstrapTable('append', hasil['data']);
                $('#modKeuanganKasBank_ListAsuransi_loading').hide();

            }
        }).then(value => {
            modKeuanganKasBank_Carilist_ListAsuransi = true;
            // selesaiLoadingAwalSetupproduk();
        });
    }


    function headerStyleLookupListAsuransi(column) {
        return {
            css: {
                background: '#a8d4da',
                color: 'black',
                border: '2px solid black',
                padding: '0px'
            }
        };
    }

    function rowStyleLookupListAsuransi(row, index) {
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

    function showDetailmodKeuanganKasBank_ListAsuransi(data = null, parent = null) {
        modKeuanganBukuBesar_ListPenerima_pilih(data['nama_penjamin'])
        keluarmodKeuanganKasBank_ListAsuransi_daftar()
    }



    function keluarmodKeuanganKasBank_ListAsuransi_daftar() {
        $('#modKeuanganKasBank_ListAsuransi_daftar').modal('hide');
        $('.modal-backdrop').hide();
        // sessionStorage.clear();
    }
</script>