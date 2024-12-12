<div class="col-md-12 p-2" id="keuanganTutupBulan_listtransaksi1">
    <div class="card card-outline card-default mb-0">
        <div class="card-body p-2 darkgrey-custom">
            <div class="row row-custom">
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="keuanganTutupBulan_bulan">Bulan</label>
                        <select type="date" class="form-control form-control-xs" placeholder="Entry No. Faktur" id="keuanganTutupBulan_bulan" name="keuanganTutupBulan_bulan" onkeypress="tampilkeuanganTutupBulan()">
                        </select>
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="keuanganTutupBulan_tahun">Tahun</label>
                        <select type="date" class="form-control form-control-xs" id="keuanganTutupBulan_tahun" name="keuanganTutupBulan_tahun" onchange="tampilkeuanganTutupBulan()">
                            <?php
                            for ($i = date('Y'); $i >= date('Y') - 32; $i -= 1) {
                                echo "<option value = '$i' > $i </option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <!-- <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="keuanganTutupBulan_status">Status</label>
                        <select type="date" class="form-control form-control-xs" id="keuanganTutupBulan_status" name="keuanganTutupBulan_status" onchange="tampilkeuanganTutupBulan()">
                            <option value="">Semua</option>
                            <option value="">Terbuka</option>
                            <option value="">Tertutup</option>
                        </select>
                    </div>
                </div> -->
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="keuanganTutupBulan_jmltransaksi">Jumlah List :</label>
                        <select class="form-control form-control-xs" id="keuanganTutupBulan_jmltransaksi" name="keuanganTutupBulan_jmltransaksi" onchange="tampilkeuanganTutupBulan()">
                            <option value="0">Semua Transaksi</option>
                            <option value="10">10 Transaksi</option>
                            <option value="20">20 Transaksi</option>
                            <option value="30">30 Transaksi</option>
                            <option value="40">40 Transaksi</option>
                            <option value="50">50 Transaksi</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12 p-2" id="keuanganTutupBulan_listtransaksi2">
    <div class="card card-outline">
        <div class="overlay-wrapper" id="loadingkeuanganTutupBulan">
            <div class="overlay">
                <i class="fas fa-3x fa-sync-alt fa-spin"></i>
            </div>
        </div>

        <div class="card-body p-1" style="max-height: 420px; overflow: auto;">
            <div class="card" style="box-shadow: 0 0 3px #343a40; margin-bottom: 0;">
                <div class="card-header p-1">
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="hr6-custom" id="keuanganTutupBulan_titleheader"><i class="fas fa-boxes"></i> </i> Tutup Bulan</h6>
                            <div>
                                <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="viewaddtransaksitutupBulan()"> <i class="fas fa-user-plus"></i> Tambah Transaksi</button>
                                <input type="text" class="form-control form-control-xs" id="keuanganTutupBulan_bulantoneraca" hidden>
                                <input type="text" class="form-control form-control-xs" id="keuanganTutupBulan_bulantolabarugi" hidden>
                            </div>
                        </div>
                    </div>
                    <!-- END LETAK BUTTON -->
                </div>
            </div>

            <table id="keuanganTutupBulan_daftar" class="table table-striped table-sm choose">
                <thead>
                    <tr>
                        <th class="pl-0" width="10" style="text-align:center;">No.</th>
                        <th width="10"></th>
                        <th width="50">ID</th>
                        <!-- <th width="100">Tgl. Transaksi</th> -->
                        <th width="100">Bulan</th>
                        <th width="100">Tahun</th>
                        <th width="100">Pembuat</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="viewaddtransaksitutupBulan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header p-1">
                <h6 class="modal-title" id="exampleModalLabel">Tambah Tutup Bulan</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row row-custom">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="keuanganTutupBulan_tgltransaksi">Bulan</label>
                            <select name="bulan" id="keuanganTutupBulan_tgltransaksibulan" class="form-control form-control-xs">
                                <!-- <option value="1">Januari</option>
                                <option value="2">Febuari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option> -->
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="keuanganTutupBulan_tgltransaksi">Tahun</label>
                            <select name="bulan" id="keuanganTutupBulan_tgltransaksitahun" class="form-control form-control-xs">
                                <?php
                                for ($i = date('Y'); $i >= date('Y') - 32; $i -= 1) {
                                    echo "<option value = '$i' > $i </option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-xs bg-gradient-warning" data-dismiss="modal">Close</button>
                <button type="button" onclick="keuanganTutupBulan_simpan()" class="btn btn-xs bg-gradient-primary">Buat ID</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="viewaddtransaksitutupBulanlistbtn" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header p-1">
                <h6 class="modal-title" id="exampleModalLabel">Tutup Bulan</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="info-box mb-0">
                            <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="70">ID</td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control form-control-xs" id="viewaddtransaksitutupBulan_id" disabled></td>
                                </tr>
                                <tr>
                                    <td width="70">Bulan</td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control form-control-xs" id="viewaddtransaksitutupBulan_month" disabled></td>
                                </tr>
                                <tr>
                                    <td>Tahun</td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control form-control-xs" id="viewaddtransaksitutupBulan_year" disabled></td>
                                </tr>
                            </table>
                        </div>
                        <div id="viewButtonmodaltutupBulan">

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-xs bg-gradient-warning" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="modkeuanganTutupBulan_content"></div>
<!-- <div class="keuanganTutupBulan_neracaView_content"></div> -->

<script>
    var listbulan = [null, "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
    var databulan = '';
    for (i = 1; i <= listbulan.length; i++) {
        databulan += '<option value="' + i + '">' + listbulan[i] + '</option>'
    }
    console.log(databulan)
    document.getElementById('keuanganTutupBulan_tgltransaksibulan').innerHTML = databulan;
    document.getElementById('keuanganTutupBulan_bulan').innerHTML = databulan;


    $('#loadingkeuanganTutupBulan').hide();
    tampilkeuanganTutupBulan();


    function btntest() {
        Swal.fire({
            html: '<span>Inpo</span>',
            icon: 'warning',
        });
    }

    function viewaddtransaksitutupBulan() {
        $('#viewaddtransaksitutupBulan').modal("show");
    }

    function viewaddtransaksitutupBulanlistbtn(id, bulan, tahun) {
        document.getElementById('viewaddtransaksitutupBulan_id').value = id;
        document.getElementById('viewaddtransaksitutupBulan_month').value = listbulan[bulan];
        document.getElementById('viewaddtransaksitutupBulan_year').value = tahun;

        var baris = '';
        baris += '<button type="button" class="btn bg-gradient-success btn-xs" onclick="bukamodalviewKeuanganNeraca(' + "'" + bulan + "','" + tahun + "'" + ')"> Neraca <i class="fas fa-arrow-right"></i></button>';
        baris += '<button type="button" class="btn bg-gradient-success btn-xs" onclick="bukamodalviewKeuanganLabaRugi(' + "'" + bulan + "','" + tahun + "'" + ')"> Laba Rugi <i class="fas fa-arrow-right"></i></button>';
        baris += '<button type="button" class="btn bg-gradient-success btn-xs" onclick="bukamodalviewKeuanganModal()"> Modal <i class="fas fa-arrow-right"></i></button>';
        baris += '<button type="button" class="btn bg-gradient-success btn-xs" onclick="bukamodalviewKeuanganArusKas()"> Arus Kas <i class="fas fa-arrow-right"></i></button>';
        document.getElementById('viewButtonmodaltutupBulan').innerHTML = baris;


        $('#viewaddtransaksitutupBulanlistbtn').modal("show");
    }

    function tampilkeuanganTutupBulan() {
        $('#loadingkeuanganTutupBulan').show();

        apiPOST('Keuangan/list_keuanganTutupBulan', null, hasil => {
            $('#loadingkeuanganTutupBulan').hide();
            $('#keuanganTutupBulan_daftar tbody').html('');
            var a = hasil['data'];
            var Baris = '';

            if (hasil['data'] !== null) {
                if (hasil['code'] == 'XX') {
                    toastr.error("Data tidak ditemukan");
                    var Baris = "";
                    Baris += '<tr><td colspan="7" align="center">Data tidak ditemukan</td></tr>';
                    $('#keuanganTutupBulan_daftar').append(Baris);
                } else {
                    toastr.success("Data ditemukan");
                    for (var i = 0; i < a.length; i++) {

                        id_bulan = a[i]['id_bulan'];
                        bulan = a[i]['bulan'];
                        tahun = a[i]['tahun'];
                        nama = a[i]['nama'];
                        var no = i + 1;


                        Baris += '<tr>';
                        Baris += '<td>' + no + '</td>';
                        Baris += '<td>';
                        Baris += '<button type="button" class="btn btn-xs btn-warning" id="" onclick = "(viewaddtransaksitutupBulanlistbtn(' + "'" + id_bulan + "','" + bulan + "','" + tahun + "'" + '))" style="width:50%"><i class="fa fa-pencil-alt"></i></button>';
                        Baris += '<button type="button" class="btn btn-xs btn-danger" id="" onclick = "(keuanganTutupBulan_hapus(' + id_bulan + '))" style="width:50%"><i class="fa fa-times"></i></button>';
                        Baris += '</td>';
                        Baris += '<td>' + id_bulan + '</td>';
                        Baris += '<td>' + listbulan[bulan] + '</td>';
                        Baris += '<td>' + tahun + '</td>';
                        Baris += '<td>' + nama + '</td>';
                    }
                    $('#keuanganTutupBulan_daftar').append(Baris);
                }
            }
        });

    }

    function keuanganTutupBulan_simpan() {
        var param = {
            bulan: document.getElementById("keuanganTutupBulan_tgltransaksibulan").value,
            tahun: document.getElementById("keuanganTutupBulan_tgltransaksitahun").value,
            id_peg: user['id_user']
        };

        apiPOST('Keuangan/SimpankeuanganTutupBulan', param, hasil => {
            if (hasil['xx'] == '') {
                toastr.error("Data Sudah Ada");
            } else {
                tampilkeuanganTutupBulan()
                $('#viewaddtransaksitutupBulan').modal("hide");
            }
        });
    }

    function keuanganTutupBulan_hapus(id_bulan) {
        var param = {
            id_user: user['id_user']
        };
        apiPOST("Keuangan/cekAksesKeu", param, hasil => {
            if (hasil['data'] == 'f' || hasil['data'] == '') {
                pertanyaan.fire({
                    title: 'Anda Tidak Memiliki Akses',
                    icon: 'error'
                })
            } else {
                pertanyaan.fire({
                    title: 'Apakah Anda Yakin Hapus Data ID : ' + id_bulan + '?',
                    html: '<span>Data akan dihapus secara permanen, Data yang sudah dihapus akan hilang, tetap hapus ?</span>',
                    icon: 'question',
                    showCancelButton: true,
                    reverseButtons: false,
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        var paramhapus = {
                            id_bulan: id_bulan
                        };
                        apiPOST("Keuangan/keuanganTutupBulan_hapus", paramhapus, hasil => {
                            if (hasil['code'] == 'XX') {
                                toastr.success("Berhasil Hapus");
                            } else {
                                toastr.success("Gagal Hapus");
                            }
                            tampilkeuanganTutupBulan();
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {

                    }
                })
            }
        });
    }

    // function keuanganTutupBulan_ViewTab(modul) {
    //     if (modul == 'neraca') {
    //         keuanganNeraca = document.getElementById('keuanganNeraca');
    //         bulantoneraca = document.getElementById('viewaddtransaksitutupBulan_month').value;
    //         keuanganNeraca.click();

    //         $('#viewaddtransaksitutupBulanlistbtn').modal('hide');
    //         test = document.getElementById('keuanganNeraca_priodebulan');
    //         if (test != null) {
    //             document.getElementById('keuanganNeraca_priodebulan').value = bulantoneraca;
    //         } else {
    //             document.getElementById('keuanganTutupBulan_bulantoneraca').value = bulantoneraca;
    //         }
    //     }
    //     if (modul == 'labarugi') {
    //         keuanganLabaRugi = document.getElementById('keuanganLabaRugi');
    //         bulantolabarugi = document.getElementById('viewaddtransaksitutupBulan_month').value;
    //         keuanganLabaRugi.click();

    //         $('#viewaddtransaksitutupBulanlistbtn').modal('hide');
    //         document.getElementById('keuanganTutupBulan_bulantolabarugi').value = bulantolabarugi;
    //     }
    // }

    function bukamodalviewKeuanganNeraca(bulan, tahun) {
        // $('#keuanganTutupBulan_listtransaksi1').hide();
        // $('#keuanganTutupBulan_listtransaksi2').hide();
        // $('#viewaddtransaksitutupBulanlistbtn').hide();
        // $('.modal-backdrop').hide();

        var data = {
            bulan: bulan,
            tahun: tahun
        }
        var datax = JSON.stringify(data);
        $('.modkeuanganTutupBulan_content').load('Keuangan/modalviewKeuanganNeraca?data=' + datax);
    }

    function bukamodalviewKeuanganLabaRugi(bulan, tahun) {
        // $('#keuanganTutupBulan_listtransaksi1').hide();
        // $('#keuanganTutupBulan_listtransaksi2').hide();
        // $('#viewaddtransaksitutupBulanlistbtn').hide();
        // $('.modal-backdrop').hide();

        var data = {
            bulan: bulan,
            tahun: tahun
        }
        var datax = JSON.stringify(data);
        $('.modkeuanganTutupBulan_content').load('Keuangan/modalviewKeuanganLabaRugi?data=' + datax);
    }

    function bukamodalviewKeuanganModal() {
        toastr.error("BELUM BISA!!");
    }

    function bukamodalviewKeuanganArusKas() {
        toastr.error("BELUM BISA!!");
    }
</script>