<div class="content modal fade" id="modKeuanganBukuBesar_ListAccount_daftar">
    <div class="container-fluid ">
        <div class="modal-dialog modal-lg">
            <div class="overlay-wrapper" id="modKeuanganBukuBesar_ListAccount_loading">
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
                            <table id="modKeuanganBukuBesar_ListAccount_table_listdaftar" data-single-select="true" data-click-to-select="true" data-sticky-header="true" data-header-style="headerStyleLookupListSetupAccount" data-row-style="rowStyleLookupListSetupAccount" data-pagination="true" data-pagination-parts="['pageInfo', 'pageList']" data-search="true" class="table-sm">
                                <thead>
                                    <tr>
                                        <th data-field="id_acc" data-sortable="true" data-width="60">ID</th>
                                        <th data-field="id_coa" data-sortable="true" data-width="250">ID COA</th>
                                        <th data-field="coa" data-sortable="true">COA</th>
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
    showUp_modKeuanganBukuBesarAccount()
    var idACCOUNT = '';


    function showUp_modKeuanganBukuBesarAccount() {
        $("#modKeuanganBukuBesar_ListAccount_daftar").modal({
            backdrop: "static"
        });
        $('#modKeuanganBukuBesar_ListAccount_daftar').on('shown.bs.modal', function() {});
    }

    $('#modKeuanganBukuBesar_ListAccount_table_listdaftar').bootstrapTable({
        onClickRow: (row, element, field) => {
            if (row['id_acc'] == idACCOUNT) {
                hideDetailmodKeuanganBukuBesar_ListAccount();
            } else {
                showDetailmodKeuanganBukuBesar_ListAccount(row, element[0]);
            }
        }
    });

    modKeuanganBukuBesarAccount()
    var produk_Carilist_data_produk = false;


    function modKeuanganBukuBesarAccount() {
        var param = {
            accountcari: ''
        };
        apiPOST('Keuangan/getAccount', param, hasil => {
            if (hasil !== null) {
                console.log(hasil['data'])
                $('#modKeuanganBukuBesar_ListAccount_table_listdaftar').bootstrapTable('append', hasil['data']);
                $('#modKeuanganBukuBesar_ListAccount_loading').hide();

            }
        }).then(value => {
            produk_Carilist_data_produk = true;
            // selesaiLoadingAwalSetupproduk();
        });
    }


    function headerStyleLookupListSetupAccount(column) {
        return {
            css: {
                background: '#a8d4da',
                color: 'black',
                border: '2px solid black',
                padding: '0px'
            }
        };
    }

    function rowStyleLookupListSetupAccount(row, index) {
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

    function showDetailmodKeuanganBukuBesar_ListAccount(data = null, parent = null) {
        modKeuanganBukuBesar_pilih(data['id_acc'], data['id_coa'], data['coa'], data['normal'])
        keluarmodKeuanganBukuBesar_ListAccount_daftar()
    }



    function keluarmodKeuanganBukuBesar_ListAccount_daftar() {
        $('#modKeuanganBukuBesar_ListAccount_daftar').modal('hide');
        $('.modal-backdrop').hide();
        // sessionStorage.clear();
    }
</script>