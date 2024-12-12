<div class="col-md-12 p-2" id="keuanganTutupTahun_listtransaksi1">
    <div class="card card-outline card-default mb-0">
        <div class="card-body p-2 darkgrey-custom">
            <div class="row row-custom">
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="keuanganTutupTahun_tahun">Tahun</label>
                        <select type="date" class="form-control form-control-xs" id="keuanganTutupTahun_tahun" name="keuanganTutupTahun_tahun" onchange="tampilkeuanganTutupTahun()">
                            <option value="">Semua</option>
                            <option value="">2023</option>
                            <option value="">2024</option>
                            <option value="">2025</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="keuanganTutupTahun_status">Status</label>
                        <select type="date" class="form-control form-control-xs" id="keuanganTutupTahun_status" name="keuanganTutupTahun_status" onchange="tampilkeuanganTutupTahun()">
                            <option value="">Semua</option>
                            <option value="">Terbuka</option>
                            <option value="">Tertutup</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="keuanganTutupTahun_jmltransaksi">Jumlah List :</label>
                        <select class="form-control form-control-xs" id="keuanganTutupTahun_jmltransaksi" name="keuanganTutupTahun_jmltransaksi" onchange="tampilkeuanganTutupTahun()">
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

<div class="col-md-12 p-2" id="keuanganTutupTahun_listtransaksi2">
    <div class="card card-outline">
        <div class="overlay-wrapper" id="loadingkeuanganTutupTahun">
            <div class="overlay">
                <i class="fas fa-3x fa-sync-alt fa-spin"></i>
            </div>
        </div>

        <div class="card-body p-1" style="max-height: 420px; overflow: auto;">
            <div class="card" style="box-shadow: 0 0 3px #343a40; margin-bottom: 0;">
                <div class="card-header p-1">
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="hr6-custom" id="keuanganTutupTahun_titleheader"><i class="fas fa-boxes"></i> </i> Tutup Tahun</h6>
                            <div>
                                <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="viewaddtransaksitutupTahun()"> <i class="fas fa-user-plus"></i> Tambah Transaksi</button>
                            </div>
                        </div>
                    </div>
                    <!-- END LETAK BUTTON -->
                </div>
            </div>

            <table id="keuanganTutupTahun_daftar" class="table table-striped table-sm choose">
                <thead>
                    <tr>
                        <th class="pl-0" width="10" style="text-align:center;">No.</th>
                        <th width="10"></th>
                        <th width="50">ID</th>
                        <!-- <th width="100">Tgl. Transaksi</th> -->
                        <th width="100">Tahun</th>
                        <th width="100">Status</th>
                        <th width="100">Created By</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

    </div>
</div>

<div class="modal fade" id="viewaddtransaksitutupTahun" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header p-1">
                <h6 class="modal-title" id="exampleModalLabel">Tambah Tutup Tahun</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row row-custom">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="keuanganTutupTahun_tgltransaksi">Tahun</label>
                            <select class="viewaddtransaksitutupTahun_tahun form-control form-control-xs" id="viewaddtransaksitutupTahun_tahun"></select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-xs bg-gradient-warning" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-xs bg-gradient-primary">Buat ID</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="viewaddtransaksitutupTahunlistbtn" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header p-1">
                <h6 class="modal-title" id="exampleModalLabel">Tutup Tahun</h6>
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
                                    <td><input type="text" class="form-control form-control-xs" id="viewaddtransaksitutupTahun_id" value="0" disabled></td>
                                </tr>
                                <tr>
                                    <td>Tahun</td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control form-control-xs" id="viewaddtransaksitutupTahun_year" value="0" disabled></td>
                                </tr>
                            </table>
                        </div>
                        <div>
                            <button type="button" class="btn bg-gradient-success btn-xs" onclick="btntest()"> Neraca <i class="fas fa-arrow-right"></i></button>
                            <button type="button" class="btn bg-gradient-success btn-xs" onclick="btntest()"> Laba Rugi <i class="fas fa-arrow-right"></i></button>
                            <button type="button" class="btn bg-gradient-success btn-xs" onclick="btntest()"> Modal <i class="fas fa-arrow-right"></i></button>
                            <button type="button" class="btn bg-gradient-success btn-xs" onclick="btntest()"> Arus Kas <i class="fas fa-arrow-right"></i></button>
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


<div class="modkeuanganTutupTahun_content"></div>

<script>
    $('#loadingkeuanganTutupTahun').hide();
    tampilkeuanganTutupTahun();

    function listtahun() {
        const tahun = new Date();
        var Option = '';
        for (i = tahun.getFullYear(); i >= 2000; i -= 1) {
            Option += "<option value=''>" + i + "</option>";
        }
        document.getElementById('viewaddtransaksitutupTahun_tahun').innerHTML = Option;
    }

    function btntest() {
        Swal.fire({
            html: '<span>Inpo</span>',
            icon: 'warning',
        });
    }

    function viewaddtransaksitutupTahun() {
        toastr.error("BELUM BISA!!");

        /* listtahun()
        $('#viewaddtransaksitutupTahun').modal("show"); */
    }

    function viewaddtransaksitutupTahunlistbtn(id, tahun) {
        toastr.error("BELUM BISA!!");

        document.getElementById('viewaddtransaksitutupTahun_id').value = id;
        document.getElementById('viewaddtransaksitutupTahun_year').value = tahun;

        $('#viewaddtransaksitutupTahunlistbtn').modal("show");
    }

    function tampilkeuanganTutupTahun() {
        // var Baris = '';
        // var tahun = '2023';
        // for (var i = 1; i <= 10; i++) {
        //     var id = i * 2;

        //     Baris += '<tr>';
        //     Baris += '<td>' + i + '</td>';
        //     Baris += '<td style="display: flex;">';
        //     Baris += '<button type="button" class="btn btn-xs btn-warning" id="" onclick = "(viewaddtransaksitutupTahunlistbtn(' + "'" + id + "','" + tahun + "'" + '))" style="width:100%"><i class="fa fa-pencil-alt"></i></button>';
        //     Baris += '<button type="button" class="btn btn-xs btn-danger" id="" onclick = "(bukamodkeuanganTutupTahun(' + id + '))" style="width:100%"><i class="fa fa-times"></i></button>';
        //     // if (status == 1) {
        //     Baris += '&nbsp;<div class="col-sm-1" style="display:contents;"><img src="<?= base_url('_assets/dist/img/checklist.png') ?>" width="20px" height="20px" title="Sudah Dilayani"/></div>';
        //     /* } else {
        //         Baris += '&nbsp;<div class="col-sm-1" style="display:contents;"><img src="<?= base_url('_assets/dist/img/cancel.png') ?>" width="20px" height="20px" title="Belum Dilayani"/></div>';
        //     } */
        //     Baris += '</td>';
        //     Baris += '<td>' + id + '</td>';
        //     Baris += '<td>' + tahun + '</td>';
        //     Baris += '<td>Terbuka</td>';
        //     Baris += '<td>Basir</td>';
        // }
        // $('#keuanganTutupTahun_daftar').append(Baris);

    }
</script>