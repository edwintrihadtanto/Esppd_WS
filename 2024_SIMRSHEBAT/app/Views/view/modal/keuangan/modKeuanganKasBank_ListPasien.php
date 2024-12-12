<div class="content modal fade" id="modKeuanganKasBank_ListPasien_daftar">
    <div class="container-fluid ">
        <div class="modal-dialog modal-lg">
            <div class="overlay-wrapper" id="modKeuanganKasBank_ListPasien_loading">
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
                            <table id="modKeuanganKasBank_ListPasien_table_daftar" data-single-select="true" data-click-to-select="true" data-sticky-header="true" data-header-style="headerStyleLookupListPasien" data-row-style="rowStyleLookupListPasien" data-pagination="true" data-pagination-parts="['pageInfo', 'pageList']" data-search="true" class="table-sm">
                                <thead>
                                    <tr>
                                        <th data-field="no_rm" data-sortable="true" data-width="60">No. RM</th>
                                        <th data-field="nama" data-sortable="true" data-width="250">Nama Pasien</th>
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
    showUp_modKeuanganKasBank_ListPasien()
    var idmodKeuanganKasBank_ListPasien = '';


    function showUp_modKeuanganKasBank_ListPasien() {
        $("#modKeuanganKasBank_ListPasien_daftar").modal({
            backdrop: "static"
        });
        $('#modKeuanganKasBank_ListPasien_daftar').on('shown.bs.modal', function() {});
    }

    $('#modKeuanganKasBank_ListPasien_table_daftar').bootstrapTable({
        onClickRow: (row, element, field) => {
            if (row['no_rm'] == idmodKeuanganKasBank_ListPasien) {
                hideDetailmodKeuanganKasBank_ListPasien();
            } else {
                showDetailmodKeuanganKasBank_ListPasien(row, element[0]);
            }
        }
    });

    modKeuanganKasBank_ListPasien()
    var modKeuanganKasBank_Carilist_ListPasien = false;


    function modKeuanganKasBank_ListPasien() {
        apiPOST('Keuangan/listPasien', null, hasil => {
            if (hasil !== null) {
                $('#modKeuanganKasBank_ListPasien_table_daftar').bootstrapTable('append', hasil['data']);
                $('#modKeuanganKasBank_ListPasien_loading').hide();

            }
        }).then(value => {
            modKeuanganKasBank_Carilist_ListPasien = true;
            // selesaiLoadingAwalSetupproduk();
        });
    }


    function headerStyleLookupListPasien(column) {
        return {
            css: {
                background: '#a8d4da',
                color: 'black',
                border: '2px solid black',
                padding: '0px'
            }
        };
    }

    function rowStyleLookupListPasien(row, index) {
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

    function showDetailmodKeuanganKasBank_ListPasien(data = null, parent = null) {
        modKeuanganBukuBesar_ListPenerima_pilih(data['nama'])
        keluarmodKeuanganKasBank_ListPasien_daftar()
    }



    function keluarmodKeuanganKasBank_ListPasien_daftar() {
        $('#modKeuanganKasBank_ListPasien_daftar').modal('hide');
        $('.modal-backdrop').hide();
        // sessionStorage.clear();
    }
</script>