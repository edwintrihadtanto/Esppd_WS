<?php
$nowday     = date('Y-m-d');
//$nextday    = date('Y-m-d', strtotime('+1 days', strtotime($nowday))); 
$nextday    = $nowday;
?>

<div class="col-md-12 p-2" id="keuanganAkseskeu_listtransaksi2">
    <div class="card card-outline">
        <div class="overlay-wrapper" id="loadingkeuanganAkseskeu">
            <div class="overlay">
                <i class="fas fa-3x fa-sync-alt fa-spin"></i>
            </div>
        </div>

        <div class="card-body p-1" style="max-height: 450px; overflow: auto; overflow-x: hidden;">
            <div class="card" style="box-shadow: 0 0 3px #343a40; margin-bottom: 0;">
                <div class="card-header p-1">
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="hr6-custom" id="keuanganAkseskeu_titleheader"><i class="fas fa-boxes"></i> Akses Keuangan (AP)</h6>
                            <div>
                                <button type="button" class="btn bg-gradient-secondary btn-xs" type="submit" id='keuanganAkseskeu_btn_tambah' onclick="keuanganAkseskeu_Simpan()"> <i class="fas fa-user-plus"></i> Simpan</button>
                                <button type="button" class="btn btn-info btn-xs" onclick="tampilkeuanganAkseskeu()()"><i class="fa fa-sync-alt fa-spin"></i> Refresh Data</button>
                            </div>
                        </div>
                    </div>
                    <!-- END LETAK BUTTON -->
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-6" id="keuanganAkseskeu_dataTable">
                    <div class="card" style="box-shadow: 0 0 3px #343a40; margin-bottom: 0;">
                        <div class="card-header p-1">
                            <table id="keuanganAkseskeu_table_daftar" data-single-select="true" data-click-to-select="true" data-sticky-header="true" data-header-style="headerStyleLookupkeuanganAkseskeu" data-row-style="rowStyleLookupkeuanganAkseskeu" data-pagination="true" data-pagination-parts="['pageInfo', 'pageList']" data-search="true" class="table table-striped table-sm choose table-bordered">
                                <thead>
                                    <tr>
                                        <th data-field="nama" data-sortable="true" data-width="250">Nama</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card" style="box-shadow: 0 0 3px #343a40; margin-bottom: 0;">
                        <div class="card-header p-1">
                            <h6 class="hr6-custom" id="keuanganAkseskeu_titleheader"><i class="fas fa-boxes"></i> List Akses Keuangan</h6>
                            <div>
                                <table id="keuanganAkseskeu_daftaraktif" class="table table-striped table-sm choose table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="pl-0" width="10" style="text-align:center;">No.</th>
                                            <th width="100">Nama</th>
                                            <th width="10">Status</th>
                                            <th width="10">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modkeuanganAkseskeu_content"></div>

    <script>
        var nowday = "<?php echo $nowday; ?>";
        var idkeuanganAkseskeu = '';



        $('#keuanganAkseskeu_table_daftar').bootstrapTable({
            onClickRow: (row, element, field) => {
                if (row['id_user'] == idkeuanganAkseskeu) {
                    hideDetailkeuanganAkseskeu();
                } else {
                    showDetailkeuanganAkseskeu(row, element[0]);
                }
            }
        });

        keuanganAkseskeu()
        var modKeuanganKasBank_Carilist_keuanganAkseskeu = false;


        function keuanganAkseskeu() {
            // $('#loadingkeuanganAkseskeu').hide();

            apiPOST('Keuangan/getPegawaiAkses', null, hasil => {
                if (hasil !== null) {
                    $('#keuanganAkseskeu_table_daftar').bootstrapTable('append', hasil['data']);
                    $('#keuanganAkseskeu_loading').hide();

                }
            }).then(value => {
                modKeuanganKasBank_Carilist_keuanganAkseskeu = true;
                // selesaiLoadingAwalSetupproduk();
            });
        }

        searchStyleListkeuanganAkseskeu()

        function searchStyleListkeuanganAkseskeu() {
            keuanganAkseskeu_dataTable = document.getElementById('keuanganAkseskeu_dataTable');
            keuanganAkseskeu_dataTable.querySelectorAll('input').forEach((v, i) => {
                v.className = 'form-control form-control-xs'
            });
        }


        function headerStyleLookupkeuanganAkseskeu(column) {
            return {
                css: {
                    background: '#a8d4da',
                    color: 'black',
                    border: '2px solid black',
                    padding: '0px'
                }
            };
        }

        function rowStyleLookupkeuanganAkseskeu(row, index) {
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

        function showDetailkeuanganAkseskeu(data = null, parent = null) {

            var no = $('#keuanganAkseskeu_daftaraktif tbody tr').length + 1;

            Baris = '';
            Baris += '<tr>'
            Baris += '<td id="nomorurutaktifdaftar">' + no + '</td>';
            Baris += "<td><input type='text' class='form-control form-control-xs' name='keuanganAkseskeu_id_user[]' value='" + data['id_user'] + "' hidden>" + data['nama'] + "</td>";
            Baris += "<td><select class='form-control form-control-xs' name='keuanganAkseskeu_hak_akses[]' value=''>";
            Baris += '<option value="t">Aktif</option>';
            Baris += '<option value="f">Tidak Aktif</option>';
            Baris += '</select></td>';
            Baris += "<td><button type='button' class='btn btn-xs btn-danger' onclick='hapusbaris_keuanganAkseskeu(this, " + no + ")' id='hapusbaris_keuanganAkseskeu" + no + "' style='width:100%'><i class='fa fa-times'></i></button></td>";
            Baris += '</tr>';

            var count = $('#keuanganAkseskeu_daftaraktif tbody tr').length;
            var idUser = document.getElementsByName('keuanganAkseskeu_id_user[]');
            for (var i = 0, iLen = count; i < iLen; i++) {
                getId_User = idUser[i].value;
                if (getId_User == data['id_user']) {
                    var flag = true
                    break;
                } else {
                    var flag = false
                }
            }
            if (flag == true) {
                toastr.error("Data Sudah Ada");
            } else {
                $('#keuanganAkseskeu_daftaraktif').append(Baris);
            }
        }

        function hapusbaris_keuanganAkseskeu(btn, nomor) {
            var row = btn.parentNode.parentNode;

            row.parentNode.removeChild(row);
            var no = 1;
            $('#keuanganAkseskeu_daftaraktif tbody tr').each(function() {
                $(this).find('td:nth-child(1)').html("<td id='nomorurutaktifdaftar'>" + no + "</td>");
                no++;
            });

        }


        tampilkeuanganAkseskeu();


        function tampilkeuanganAkseskeu() {
            $('#loadingkeuanganAkseskeu').show();

            apiPOST('Keuangan/getListPegawaiAkses', null, hasil => {
                $('#loadingkeuanganAkseskeu').hide();
                $('#keuanganAkseskeu_daftaraktif tbody').html('');
                var a = hasil['data'];
                var Baris = '';

                if (hasil['data'] !== "") {
                    // if (hasil['code'] == 'XX') {
                    //     toastr.error("Data tidak ditemukan");
                    //     var Baris = "";
                    //     Baris += '<tr><td colspan="7" align="center">Data tidak ditemukan</td></tr>';
                    //     $('#keuanganAkseskeu_daftar').append(Baris);
                    // } else {
                    toastr.success("Data ditemukan");
                    for (var i = 0; i < a.length; i++) {

                        id_user = a[i]['id_user'];
                        nama = a[i]['nama'];
                        hak_akses = a[i]['hak_akses'];
                        no = i + 1;

                        Baris += '<tr>'
                        Baris += '<td id="nomorurutaktifdaftar">' + no + '</td>';
                        Baris += "<td><input type='text' class='form-control form-control-xs' name='keuanganAkseskeu_id_user[]' value='" + id_user + "' hidden>" + nama + "</td>";
                        Baris += "<td><select class='form-control form-control-xs' name='keuanganAkseskeu_hak_akses[]' value=''>";
                        if (hak_akses == 't') {
                            sel2 = '';
                            sel1 = 'selected';
                        } else {
                            sel2 = 'selected';
                            sel1 = '';
                        }
                        Baris += '<option value="t" ' + sel1 + '>Aktif</option>';
                        Baris += '<option value="f" ' + sel2 + '>Tidak Aktif</option>';
                        Baris += '</select></td>';
                        Baris += "<td><button type='button' class='btn btn-xs btn-danger' onclick='hapusbaris_keuanganAkseskeu(this, " + no + ")' id='hapusbaris_keuanganAkseskeu" + no + "' style='width:100%'><i class='fa fa-times'></i></button></td>";
                        Baris += '</tr>';
                    }
                    $('#keuanganAkseskeu_daftaraktif').append(Baris);

                    // }
                } else {
                    toastr.error("Data tidak ditemukan");
                }
            });
        }

        function params_keuanganAkseskeu() {
            var idUser = document.getElementsByName('keuanganAkseskeu_id_user[]');
            var hakAkses = document.getElementsByName('keuanganAkseskeu_hak_akses[]');
            var count = $('#keuanganAkseskeu_daftaraktif tbody tr').length;

            var params = {};
            params.data = [];
            for (var i = 0, iLen = count; i < iLen; i++) {
                var x = {};
                x.getId_User = idUser[i].value;
                x.getHakAkses = hakAkses[i].value;

                params.data.push(x);
            }
            return params.data;
        }

        function keuanganAkseskeu_Simpan() {
            cek = params_keuanganAkseskeu().length;
            if (cek == 0) {
                toastr.error("List Kosong");
            } else {
                var param = {
                    data: params_keuanganAkseskeu(),
                    count: cek,
                }
                apiPOST('Keuangan/keuanganAkseskeu_Simpan', param, hasil => {

                })

            }
        }
    </script>