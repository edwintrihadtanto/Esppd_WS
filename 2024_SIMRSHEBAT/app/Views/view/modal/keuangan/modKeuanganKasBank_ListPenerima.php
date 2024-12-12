<div class="content modal fade" id="modKeuanganKasBank_ListPenerima_daftar">
    <div class="container-fluid ">
        <div class="modal-dialog modal-lg">
            <div class="overlay-wrapper" id="modKeuanganKasBank_ListPenerima_loading">
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
                            <table id="modKeuanganKasBank_ListPenerima_table_daftar" data-single-select="true" data-click-to-select="true" data-sticky-header="true" data-header-style="headerStyleLookupListPenerima" data-row-style="rowStyleLookupListPenerima" data-pagination="true" data-pagination-parts="['pageInfo', 'pageList']" data-search="true" class="table-sm">
                                <thead>
                                    <tr>
                                        <th data-field="id_pegawai" data-sortable="true" data-width="60">ID</th>
                                        <th data-field="nama_pegawai" data-sortable="true" data-width="250">Nama Pegawai</th>
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
    showUp_modKeuanganKasBank_ListPenerima()
    var idmodKeuanganKasBank_ListPenerima = '';


    function showUp_modKeuanganKasBank_ListPenerima() {
        $("#modKeuanganKasBank_ListPenerima_daftar").modal({
            backdrop: "static"
        });
        $('#modKeuanganKasBank_ListPenerima_daftar').on('shown.bs.modal', function() {});
    }

    $('#modKeuanganKasBank_ListPenerima_table_daftar').bootstrapTable({
        onClickRow: (row, element, field) => {
            if (row['id_pegawai'] == idmodKeuanganKasBank_ListPenerima) {
                hideDetailmodKeuanganKasBank_ListPenerima();
            } else {
                showDetailmodKeuanganKasBank_ListPenerima(row, element[0]);
            }
        }
    });

    modKeuanganKasBank_ListPenerima()
    var modKeuanganKasBank_Carilist_ListPenerima = false;


    function modKeuanganKasBank_ListPenerima() {
        apiPOST('Keuangan/list_penerimaKaryawan', null, hasil => {
            if (hasil !== null) {
                $('#modKeuanganKasBank_ListPenerima_table_daftar').bootstrapTable('append', hasil['data']);
                $('#modKeuanganKasBank_ListPenerima_loading').hide();

            }
        }).then(value => {
            modKeuanganKasBank_Carilist_ListPenerima = true;
            // selesaiLoadingAwalSetupproduk();
        });
    }


    function headerStyleLookupListPenerima(column) {
        return {
            css: {
                background: '#a8d4da',
                color: 'black',
                border: '2px solid black',
                padding: '0px'
            }
        };
    }

    function rowStyleLookupListPenerima(row, index) {
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

    function showDetailmodKeuanganKasBank_ListPenerima(data = null, parent = null) {
        modKeuanganBukuBesar_ListPenerima_pilih(data['nama_pegawai'])
        keluarmodKeuanganKasBank_ListPenerima_daftar()
    }



    function keluarmodKeuanganKasBank_ListPenerima_daftar() {
        $('#modKeuanganKasBank_ListPenerima_daftar').modal('hide');
        $('.modal-backdrop').hide();
        // sessionStorage.clear();
    }
</script>