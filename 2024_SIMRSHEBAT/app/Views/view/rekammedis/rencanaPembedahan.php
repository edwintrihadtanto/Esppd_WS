<div class="col-md-12 mb-5">
    <div class="overlay-wrapper" id="loading_rencana_pembedahan">
        <div class="overlay">
            <i class="fas fa-3x fa-sync-alt fa-spin"></i>
        </div>
    </div>
    <div class="card ">
        <div class="card-header" style="background-color:black;">
          <h3 class="card-title" style="color:white;">List Rencana Pembedahan</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" onclick="showDataRencanaPembedahan()">
              <i class="fas fa-sync-alt"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-1">
            <table border="0" cellpadding="0" id="tabel_rencana_pembedahan" cellspacing="0" class="table table-sm table-bordered table-colored">
                <thead>
                    <tr style="font-size: 14px;">
                        <th class="pl-0" width="10" style="vertical-align:middle; text-align: center;">Act</th>
                        <th width="50" style="vertical-align:middle; text-align: center;">No. RM</th>
                        <th width="100" style="vertical-align:middle; text-align: center;">Nama Pasien</th>
                        <th width="100" style="vertical-align:middle; text-align: center;">Alamat Pasien</th>
                        <th width="50" style="vertical-align:middle; text-align: center;">Tanggal Rencana Operasi</th>
                        <th width="50" style="vertical-align:middle; text-align: center;">Waktu dibuat</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table> 
        </div>
    </div>

    <div class="card ">
        <div class="card-header" style="background-color:black;">
          <h3 class="card-title" style="color:white;">Rencana Pembedahan</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-1">
            <div class="row">
                <div class="col-md-3">
                    <div class="input-group m-1">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="label_tgl_operasi_rencana_pembedahan">Tanggal Operasi</span>
                        </div>
                        <input type="date" id="tgl_operasi_rencana_pembedahan" aria-describedby="label_tgl_operasi_rencana_pembedahan" class="form-control" autocomplete="off">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group m-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="label_waktu_pembuatan_rencana_pembedahan">Waktu Pembuatan</span>
                        </div>
                        <input type="datetime-local" id="waktu_pembuatan_rencana_pembedahan" aria-describedby="label_waktu_pembuatan_rencana_pembedahan" class="form-control">
                    </div>
                </div>
            </div>
            <div class="input-group m-1">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="label_pembuat_rencana_pembedahan">Pembuat</span>
                </div>
                <input type="text" id="pembuat_rencana_pembedahan" aria-describedby="label_pembuat_rencana_pembedahan" class="form-control">
            </div>
        </div>
    </div>

    <div class="card ">
        <div class="card-body p-1">
            <div class="row">
                <div class="col">
                    <div class="row justify-content-md-center">
                        <div class="col-auto p-2">
                            <div class="row">  
                                <button class="btn btn-warning m-1" onclick="showGambarTubuhRencanaPembedahan();">Edit</button>
                                <button class="btn btn-danger m-1">Default</button>
                            </div>
                            <div id="gambarTubuhRencanaPembedahan"></div>
                        </div>
                        <div class="col-auto">
                            <div class="row p-2">
                                <div class="col">
                                    <div class="row">  
                                        <div class="col-auto p-2">
                                            <button class="btn btn-warning m-1" onclick="showGambarKepalaSampingRencanaPembedahan();">Edit</button>
                                            <button class="btn btn-danger m-1">Default</button>
                                        </div>
                                    </div>
                                    <div id="gambarKepalaSampingRencanaPembedahan"></div>
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col">
                                    <div class="row">  
                                        <div class="col-auto p-2">
                                            <button class="btn btn-warning m-1" onclick="showGambarKepalaDepanRencanaPembedahan();">Edit</button>
                                            <button class="btn btn-danger m-1">Default</button>
                                        </div>
                                    </div>
                                    <div id="gambarKepalaDepanRencanaPembedahan"></div>
                                </div>
                            </div>

                            <div class="row p-2">
                                <div class="col">
                                    <div class="row">  
                                        <div class="col-auto p-2">
                                            <button class="btn btn-warning m-1" onclick="showGambarTanganAtasRencanaPembedahan();">Edit</button>
                                            <button class="btn btn-danger m-1">Default</button>
                                        </div>
                                    </div>
                                    <div id="gambarTanganAtasRencanaPembedahan"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-md-center">
                        <div class="col-auto p-2">
                            <div class="col">
                                <div class="row">  
                                    <div class="col-auto p-2">
                                      <button class="btn btn-warning m-1" onclick="showGambarKakiRencanaPembedahan();">Edit</button>
                                      <button class="btn btn-danger m-1">Default</button>
                                    </div>
                                </div>
                                <div id="gambarKakiRencanaPembedahan"></div>
                            </div>
                        </div>
                        <div id="gambarTanganBawahRencanaPembedahan" class="col-auto p-2">
                            <div class="col">
                                <div class="row">  
                                    <div class="col-auto p-2">
                                        <button class="btn btn-warning m-1" onclick="showGambarTanganBawahRencanaPembedahan();">Edit</button>
                                        <button class="btn btn-danger m-1">Default</button>
                                    </div>
                                </div>
                                <div id="gambarTanganBawahRencanaPembedahan"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row m-1">
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text">Keterangan</span>
                    </div>
                    <textarea class="form-control" id="keterangan_rencana_pembedahan"></textarea>
                </div> 
            </div>
        </div>

        <div class="card-footer">
            <button type="button" class="btn btn-success btn-sm" onclick="simpanRencanaPembedahan();" data-dismiss="modal"><i class="fa fa-save"></i> Simpan</button>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        var data =document.getElementById('profilepasienirna').value;
        if (data=='') {
            var url  = '';
            var view = 'viewRencanaPembedahan';
            onCall_listpasien(view, url);
        }else{
            showRencanaPembedahan();
        }
    });

var URLGambarTubuhMRencanaPembedahan        = "<?php echo base_url('/gambar/body_polos/7.png'); ?>";
var URLGambarTubuhFRencanaPembedahan        = "<?php echo base_url('/gambar/body_polos/6.png'); ?>";
var URLGambarKepalaSampingRencanaPembedahan = "<?php echo base_url('/gambar/body_polos/1.png'); ?>";
var URLGambarKepalaDepanRencanaPembedahan   = "<?php echo base_url('/gambar/body_polos/2.png'); ?>";
var URLGambarTanganAtasRencanaPembedahan    = "<?php echo base_url('/gambar/body_polos/4.png'); ?>";
var URLGambarTanganBawahRencanaPembedahan   = "<?php echo base_url('/gambar/body_polos/5.png'); ?>";
var URLGambarKakiRencanaPembedahan          = "<?php echo base_url('/gambar/body_polos/3.png'); ?>";

var gambarTubuhRencanaPembedahan            = new WPaintX('gambarTubuhRencanaPembedahan');
var gambarKepalaSampingRencanaPembedahan    = new WPaintX('gambarKepalaSampingRencanaPembedahan');
var gambarKepalaDepanRencanaPembedahan      = new WPaintX('gambarKepalaDepanRencanaPembedahan');
var gambarTanganAtasRencanaPembedahan       = new WPaintX('gambarTanganAtasRencanaPembedahan');
var gambarTanganBawahRencanaPembedahan      = new WPaintX('gambarTanganBawahRencanaPembedahan');
var gambarKakiRencanaPembedahan             = new WPaintX('gambarKakiRencanaPembedahan');

function showRencanaPembedahan(){
    // console.log(data);
    //if(data == null){
        gambarTubuhRencanaPembedahan.setSRC(URLGambarTubuhMRencanaPembedahan);
        gambarKepalaSampingRencanaPembedahan.setSRC(URLGambarKepalaSampingRencanaPembedahan);
        gambarKepalaDepanRencanaPembedahan.setSRC(URLGambarKepalaDepanRencanaPembedahan);
        gambarTanganAtasRencanaPembedahan.setSRC(URLGambarTanganAtasRencanaPembedahan);
        gambarTanganBawahRencanaPembedahan.setSRC(URLGambarTanganBawahRencanaPembedahan);
        gambarKakiRencanaPembedahan.setSRC(URLGambarKakiRencanaPembedahan);
    //}

    gambarTubuhRencanaPembedahan.hideEditor();
    gambarKepalaSampingRencanaPembedahan.hideEditor();
    gambarKepalaDepanRencanaPembedahan.hideEditor();
    gambarTanganAtasRencanaPembedahan.hideEditor();
    gambarTanganBawahRencanaPembedahan.hideEditor();
    gambarKakiRencanaPembedahan.hideEditor();

    showDataRencanaPembedahan();
}

function showGambarTubuhRencanaPembedahan(){
    gambarTubuhRencanaPembedahan.show();
}
function showGambarKepalaSampingRencanaPembedahan(){
    gambarKepalaSampingRencanaPembedahan.show();
}
function showGambarKepalaDepanRencanaPembedahan(){
    gambarKepalaDepanRencanaPembedahan.show();
}
function showGambarTanganAtasRencanaPembedahan(){
    gambarTanganAtasRencanaPembedahan.show();
}
function showGambarKakiRencanaPembedahan(){
    gambarKakiRencanaPembedahan.show();
}
function showGambarTanganBawahRencanaPembedahan(){
    gambarTanganBawahRencanaPembedahan.show();
}

function simpanRencanaPembedahan() {
    var tubuh         = gambarTubuhRencanaPembedahan.getData();
    var kepalaSamping = gambarKepalaSampingRencanaPembedahan.getData();
    var kepalaDepan   = gambarKepalaDepanRencanaPembedahan.getData();
    var tanganAtas    = gambarTanganAtasRencanaPembedahan.getData();
    var tanganBawah   = gambarTanganBawahRencanaPembedahan.getData();
    var kaki          = gambarKakiRencanaPembedahan.getData();
    param={
        tgl_operasi             : $('#tgl_operasi_rencana_pembedahan').val(),
        waktu_dibuat            : $('#waktu_pembuatan_rencana_pembedahan').val(),
        pembuat_rencana         : $('#pembuat_rencana_pembedahan').val(),
        keterangan              : $('#keterangan_rencana_pembedahan').val(),
        gambar_tubuh            : tubuh,
        gambar_kepala_samping   : kepalaSamping,
        gambar_kepala_depan     : kepalaDepan,
        gambar_tangan_atas      : tanganAtas,
        gambar_tangan_bawah     : tanganBawah,
        gambar_kaki             : kaki,
        user                    : user.id_user,
        no_rm                   : $('#rmermirna').val(),
        transaksi               : document.getElementById('transaksiermirna').value,
        id_kunjungan            : document.getElementById('idKunjunganermirna').value,
    };

    apiPOST('Rekammedisirna/saverencanaoperasi', param, hasil => {
        if (hasil['data'] != null){
            if (hasil['data'] == "ok"){
                toastr.success("Berhasil di simpan");
            }else{
                toastr.error("Gagal di simpan");
            }
        }
    });

    // console.log(param);
}

function showDataRencanaPembedahan() {
    document.getElementById('loading_rencana_pembedahan').style.display = 'block';
    param={
        idrencana       : '',
        no_rm           : $('#rmermirna').val(),
        transaksi       : document.getElementById('transaksiermirna').value,
        id_kunjungan    : document.getElementById('idKunjunganermirna').value,
    };

    apiPOST('Rekammedisirna/showDataRencanaPembedahan', param, hasil => {
        document.getElementById('loading_rencana_pembedahan').style.display = 'none';
        if (hasil['data'] != null){
            if (hasil['status'] == "sukses"){
                var DetailRencana   = hasil['data'];
                $('#tabel_rencana_pembedahan tbody').html('');
                if (DetailRencana.length > 0){
                    for (var d = 0; d < DetailRencana.length; d++) {

                        var tgloperasi  = DetailRencana[d].tgl_operasi;
                        var idrencana   = DetailRencana[d].id_rencana_pembedahan;
                        var norm        = DetailRencana[d].no_rm;
                        var nama        = DetailRencana[d].nama;
                        var alamat      = DetailRencana[d].alamat;
                        var id_transaksi= DetailRencana[d].transaksi;
                        var id_kunjungan= DetailRencana[d].id_kunjungan;
                        var waktudibuat = DetailRencana[d].waktu_dibuat;
                        var html = "";
                            html += '<tr>';
                            html += '<td style="vertical-align: middle;"><button type="button" class="btn btn-xs btn-info" onclick="tampilgambarrencanapembedahan('+"'"+idrencana+"','"+id_transaksi+"','"+id_kunjungan+"','"+norm+"'"+')" style="width:100%"><i class="fa fa-eye"></i></button></td>';
                            html += '<td>'+norm+'</td>';
                            html += '<td>'+nama+'</td>';
                            html += '<td>'+alamat+'</td>';
                            html += '<td>'+tgloperasi+'</td>';
                            html += '<td>'+waktudibuat+'</td>';
                        $('#tabel_rencana_pembedahan').append(html);
                    }
                }else{
                    var tabel = '';
                    tabel += '<tr style="font-weight:bold;">';
                        tabel += '<td align="center" colspan="6"><h5>Belum Ada Rencana Pembedahan</h5></td>';
                    tabel += '</tr>';
                
                    $('#tabel_rencana_pembedahan').append(tabel);
                }
            }
        }
    });
}

function tampilgambarrencanapembedahan(idrencana,id_transaksi,id_kunjungan,norm){
    document.getElementById('loading_rencana_pembedahan').style.display = 'block';
    param={
        idrencana       : idrencana,
        no_rm           : norm,
        transaksi       : id_transaksi,
        id_kunjungan    : id_kunjungan,
    };

    apiPOST('Rekammedisirna/showDataRencanaPembedahan', param, hasil => {
        document.getElementById('loading_rencana_pembedahan').style.display = 'none';
        if (hasil['data'] != null){
            if (hasil['status'] == "sukses"){
                var DetailRencana   = hasil['data'];
                if (DetailRencana.length > 0){
                    for (var d = 0; d < DetailRencana.length; d++) {

                        var gambar_tubuh            = DetailRencana[d].gambar_tubuh;
                        var gambar_kepala_samping   = DetailRencana[d].gambar_kepala_samping;
                        var gambar_kepala_depan     = DetailRencana[d].gambar_kepala_depan;
                        var gambar_tangan_atas      = DetailRencana[d].gambar_tangan_atas;
                        var gambar_tangan_bawah     = DetailRencana[d].gambar_tangan_bawah;
                        var gambar_kaki             = DetailRencana[d].gambar_kaki;

                        $('#tgl_operasi_rencana_pembedahan').val(DetailRencana[d].tgl_operasi);
                        $('#waktu_pembuatan_rencana_pembedahan').val(DetailRencana[d].waktu_dibuat);
                        $('#pembuat_rencana_pembedahan').val(DetailRencana[d].pembuat_rencana);
                        $('#keterangan_rencana_pembedahan').val(DetailRencana[d].keterangan);

                        gambarTubuhRencanaPembedahan.setSRC(gambar_tubuh);
                        gambarKepalaSampingRencanaPembedahan.setSRC(gambar_kepala_samping);
                        gambarKepalaDepanRencanaPembedahan.setSRC(gambar_kepala_depan);
                        gambarTanganAtasRencanaPembedahan.setSRC(gambar_tangan_atas);
                        gambarTanganBawahRencanaPembedahan.setSRC(gambar_tangan_bawah);
                        gambarKakiRencanaPembedahan.setSRC(gambar_kaki);
                    }
                }else{
                    
                }
            }
        }
    });
}
</script>