
<div class="content modal fade" id="showdetailinstruksipembedahan">
    <div class="container-fluid">
      <div class="modal-dialog modal-xl" style="min-width: 100%;">
        <!-- <div class="card card-row"> -->
            <div class="modal-content" style="overflow: auto;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <div class="col-md-12 p-2">

    <div class="card-body p-2 darkgrey-custom" id="Divinstruksipembedahan" >



        <div class="card"><!-- DATA PASIEN -->
            <div class="card-header" style="background-color:black;">
                <h3 class="card-title" style="color:white;">KONDISI PASIEN</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>             
                </div>
            </div>
            <div class="card-body">
                <div class="col-lg-12 row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="col-form-label" title="ID">ID</label>
                            </div>
                            <div class="col-md-5">
                                <input id="qacintruksibedahemr_id" name="id" type="hidden" value="0">
                                <label id="qacintruksibedahemr_lid" class="col-form-label">-</label>
                                <input id="qacintruksibedahemr_idkun" name="idkunl" type="hidden" value="">
                                <input id="qacintruksibedahemr_isi" name="isi" type="hidden" value="">
                            </div>
                        </div>
                        <div class="form-group row d-none">
                            <div class="col-md-3">
                                <label class="col-form-label">ID Kunjungan</label>
                            </div>
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-1">
                                <label id="qacintruksibedahemr_lidkun" class="col-form-label">-</label>
                                <input id="qacintruksibedahemr_kun_id" name="id" type="hidden" value="0">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="col-form-label">Tanggal</label>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group date" id="qacintruksibedahemr_dtgl" data-target-input="nearest">
                                    <input id="qacintruksibedahemr_tgl" name="tgl" type="date" class="form-control datetimepicker-input" data-target="#qacintruksibedahemr_dtgl" data-toggle="datetimepicker" onkeydown="return false">

                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="col-form-label">Dokter</label>
                            </div>
                            <div class="col-md-7">
                                <select id="qacintruksibedahemr_dok1Id" name="dok1Id" class="form-control" ></select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="col-form-label">Diagnosa Pasca Bedah</label>
                            </div>
                            <div class="col-md-5">
                                <div class="form_group">
                            <!--        <select class="diagnosa_insbedah form-control form-control-xs" id="diagnosa_insbedah">
                                    </select> -->
                                    <input id="diagnosa_insbedah" name="diagnosa_insbedah" type="text" >
                                </div>
                            <!--<button type="button" class="btn btn-sm btn-primary btn-block" id="qacintruksibedahemr_bticd" title="Diagnosis ICD">
                                 <i class="far fa-file"></i> 
                                </button>-->
                            </div>
                            <div class="col-md-4">
                                <label id="qacintruksibedahemr_licd" class="col-form-label">NON ICD</label>
                                <input id="qacintruksibedahemr_icd" name="icd" type="hidden" value="0">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-5">
                                <label class="col-form-label">1.&nbsp;&nbsp;Pemeriksaan Berkala</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="col-form-label" title="Tensi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tensi Setiap</label>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type="number" class="form-control" id="qacintruksibedahemr_tensi">
                                    <span class="input-group-append">
                                        <span class="input-group-text"> &nbsp;Menit &nbsp; </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="col-form-label" title="Nadi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nadi Setiap</label>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type="number" class="form-control" id="qacintruksibedahemr_nadi">
                                    <span class="input-group-append">
                                        <span class="input-group-text"> &nbsp;Menit &nbsp; </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="col-form-label" title="Suhu">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Suhu Setiap</label>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type="number" class="form-control" id="qacintruksibedahemr_suhu">
                                    <span class="input-group-append">
                                        <span class="input-group-text"> &nbsp;Menit &nbsp; </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="col-form-label" title="Pernafasan">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pernafasan Setiap</label>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type="number" class="form-control" id="qacintruksibedahemr_nafas">
                                    <span class="input-group-append">
                                        <span class="input-group-text"> &nbsp;Menit &nbsp; </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="col-form-label">2.&nbsp;&nbsp;Boleh Minum</label>
                            </div>
                            <div class="col-md-8">
                                <textarea class="form-control" rows="3" id="qacintruksibedahemr_minum" name="ket"></textarea>
                                <!--    <input type="text" name="minum" th:id="${ccm+'_minum'}" maxlength="30" class="form-control"/> -->
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="col-form-label" title="Keterangan">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Boleh Makan</label>
                            </div>
                            <div class="col-md-8">
                                <textarea class="form-control" rows="3" id="qacintruksibedahemr_makan" name="ket"></textarea>
                                <!--    <input type="text" name="makan" th:id="${ccm+'_makan'}" maxlength="30" class="form-control"/> -->
                            </div>
                        </div>
                    </div>
                    <!-- TENGAH --> 
                    <div class="col-md-6">
                        <div class="form-group row d-none">
                            <div class="col-md-3">
                                <label class="col-form-label" title="No RM Ibu">No RM</label>
                            </div>
                            <div class="col-md-7">
                                <label id="qacintruksibedahemr_norm" class="col-form-label">-</label>
                            </div>
                        </div>
                        <div class="form-group row d-none">
                            <div class="col-md-3">
                                <label class="col-form-label" title="Nama RM">Nama RM</label>
                            </div>
                            <div class="col-md-7">
                                <label id="qacintruksibedahemr_nama" class="col-form-label">-</label>
                            </div>
                        </div>
                    <!-- <div class="form-group row">
                        <div class="col-md-3">
                            <label class="col-form-label" title="No Asuransi">No Asuransi</label>
                        </div>
                        <div class="col-md-7">
                            <label th:id="${ccm+'_noasuransi'}" class="col-form-label" >-</label>
                        </div>
                    </div> -->
                    <div class="form-group row d-none">
                        <div class="col-md-3">
                            <label class="col-form-label" title="Jenis Kelamin">Jenis Kelamin</label>
                        </div>
                        <div class="col-md-7">
                            <label id="qacintruksibedahemr_gender" class="col-form-label">-</label>
                        </div>
                    </div>
                    <div class="form-group row d-none">
                        <div class="col-md-3">
                            <label class="col-form-label" title="Tanggal Lahir">Tanggal Lahir</label>
                        </div>
                        <div class="col-md-7">
                            <label id="qacintruksibedahemr_tgl_kunjungan" class="col-form-label">-</label>
                        </div>
                    </div>
                    <!-- <div class="form-group row">
                        <div class="col-md-3">
                            <label class="col-form-label" title="Penanggung">Penanggung</label>
                        </div>
                        <div class="col-md-7">
                            <label th:id="${ccm+'_penanggung'}" class="col-form-label" >-</label>
                        </div>
                    </div> -->
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label class="col-form-label">3.&nbsp;&nbsp;Infus</label>&nbsp;&nbsp;<label><span class="badge bg-primary rounded-pill" onclick="showmodaltambahpenyakitkelassmedermrwj()" title="tambah icd">Tambah</span></label>
                        </div>

                        <div class="col-md-9" style="border: solid;overflow-y: scroll;" >
                            &nbsp;&nbsp;&nbsp;
                            <table   class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th style="width: 15px">#</th>
                                        <th style="width: 80px">ICD 10</th>
                                        <th>Penyakit</th>
                                    </tr>
                                </thead>
                                <tbody id="bodyhistoripenyakitkelassmedermrwj"></tbody>
                            </table>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label class="col-form-label" title="Keterangan">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Infus Dihentikan Setelah</label>
                        </div>
                        <div class="col-md-9">
                            <!-- <textarea class="form-control" rows="2" th:id="${ccm+'_makan'}" name="ket"></textarea> -->
                            <input type="text" name="makan" id="qacintruksibedahemr_infus2" maxlength="30" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label class="col-form-label">4.&nbsp;&nbsp;Obat - Obat</label>
                        </div>
                        <div class="col-md-9">
                            <textarea class="form-control" rows="3" id="qacintruksibedahemr_obat" name="ket"></textarea>
                            <!-- <input type="text" name="minum" th:id="${ccm+'_obat'}" maxlength="30" class="form-control"/> -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label class="col-form-label">5.&nbsp;&nbsp;Intruksi Khusus</label>
                        </div>
                        <div class="col-md-9">
                            <textarea class="form-control" rows="3" id="qacintruksibedahemr_intruksi" name="ket"></textarea>
                            <!-- <input type="text" name="minum" th:id="${ccm+'_intruksi'}" maxlength="30" class="form-control"/> -->
                        </div>
                    </div>
                    <div class="col-lg-12 row">
                        <div class="col-md-3"> </div>
                        <div class="col-md-9">
                            <div class="form-group row">
                                <div class="col-md-12" align="center">
                                    <label class="col-form-label">Dokter Penanggung Jawab Pasien</label>
                                </div>
                            </div>
                            <div class="form-group row d-none" id="qacintruksibedahemr_divqrcode">
                                <div class="col-md-12" align="center">
                                    <img id="qacintruksibedahemr_qrcode">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12" align="center">
                                    <table>
                                        <tbody><tr>
                                            <td width="50%" style="padding:0;">
                                                <input type="text" class="form-control text-center" id="qacintruksibedahemr_zpjttd1" readonly="readonly">
                                            </td>
                                        </tr>
                                    </tbody></table>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12" align="center">
                                    <label class="col-form-label">Nama &amp; Tanda Tangan</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div align="center" class="col-md-12">
                                    <button id="qacintruksibedahemr_btttd1" type="button" class="btn btn-sm btn-danger "><!-- <i class="fas fa-signature"></i> --> Validasi</button>
                                    <button onclick="saveintruksibedah()" id="qacintruksibedahemr_btsave" type="button" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         </div>
    </div>
</div>
        </div>
    </div>
</div>
</div>
<script>

    $(document).ready(function() {
      $("#showdetailinstruksipembedahan").modal({backdrop: "static"});
      $('#showdetailinstruksipembedahan').on('shown.bs.modal', function() { });
      getDokterbedah();
      getPerawatbedah();
      $(".diagnos_prabedah").select2({
        placeholder: "Ketikan Kode Diagnosa",
        allowClear: true
    });
      $(".diagnos_pascabedah").select2({
        placeholder: "Ketikan Kode Diagnosa",
        allowClear: true
    });
  });
    function tampilPasienermirna(no_rm,unit,id_kunjungan,id_unit,nama,transaksi,tgl_lahir,alamat,id_pegawai) {
        $('#modallistpasienirna').modal('hide');
        $('.tab-empty').hide();
        showDetailDataPasienIrna();
        document.getElementById('rmermirna').value          =no_rm;
        document.getElementById('namaermirna').value        =nama;
        document.getElementById('unitermirna').value        =unit;
        document.getElementById('idKunjunganermirna').value =id_kunjungan;
        document.getElementById('idunitermirna').value      =id_unit;
        document.getElementById('transaksiermirna').value   =transaksi;
        document.getElementById('alamatermirna').value      =alamat;
        document.getElementById('profilepasienirna').value  =id_kunjungan;
        data.namas    =nama;
        data.norms    =no_rm;
        data.units    =unit;
        data.id_units =id_unit;
        data.id_kunjungans=id_kunjungan;
        alamatpasien  =alamat;
        tgllahir      =tgl_lahir;


    }
    function listpasienerminputpembedahan(){  
        var listParam = [
            'normpas_preoperasi', 
            ];
        var param = {
            user    : user['id_user'],
            norm    : document.getElementById('normpas_preoperasi').value,
        //nmpasien: document.getElementById('RWJERMnmlistermirna').value
        };
        apiPOST("Rekammedisirna/listpasien", param, hasil => {   
            $('#listpasermirna_operasi').html('');
            if (hasil['data'] !== null) {
                if (hasil['code'] == 'XX') {
                    toastr.error("Data tidak ditemukan");
                    var Baris = "";
                    Baris += '<div class="col-sm-12">';
                    Baris += '<div class="small-box bg-danger">';
                    Baris += '<div class="inner p-1" style="text-align:center;">';
                    Baris += '<h6><i class="fa fa-times"></i> Data Tidak Ditemukan</h6>';
                    Baris += '</div>';
                    Baris += '</div>';
                    Baris += '</div>';

                    $('#listpasermirna_operasi').append(Baris);
                    document.getElementById('normpas_preoperasi').value = '';
                //document.getElementById('RWJERMnmlistermirna').value = '';
                }else{
                    var Baris = "";
                    var a = hasil['data'];
                    for (var i = 0; i < a.length; i++) {
                        var tglkunj   = a[i].tgl_masuk;
                        var transaksi   = a[i].id_transaksi;
                        var norm      = a[i].no_rm;
                        var nama      = a[i].nama;
                        var alamat    = a[i].alamat;
                        var umur      = a[i].tgl_lahir;
                        var penjamin  = a[i].nama_penjamin;
                        var sep       = a[i].no_sjp;
                        var telp      = a[i].telepon;
                        var unit      = a[i].nama_unit;
                        var kunjungan = a[i].id_kunjungan;
                        var id_unit   = a[i].id_unit;
                        var nama_unit = a[i].nama_unit;
                        var soap      = a[i].soap;
                        var tgl_lahir = a[i].tgl_lahir;
                        var id_pegawai = a[i].id_pegawai;
                        if (nama.length > 18){
                            namax  = nama.substring(0, 18)+'...';
                        }else{
                            namax  = nama;
                        }

                        if (alamat.length > 30){
                            alamatx = alamat.substring(0, 30)+'...';
                        }else{
                            alamatx = alamat;
                        }

                        Baris += '<div class="col-sm-3">';
                        if (soap>''){
                            Baris += '<div class="small-box btn-info" style="border: solid 2px darkblue;">';
                        }else{
                            Baris += '<div class="small-box btn-secondary-default" style="border: solid 2px #a8d4da; margin-bottom: 5px !important;">';
                        }
                    // Baris += '<div class="inner p-1">';
                    // Baris += '<h6><strong>'+norm+'</strong> / '+ namax +'</h6>';
                    // Baris += '<p class="p-0 mb-1">'+alamatx+'</p>';
                    // Baris += '<p class="p-0"><strong><i>'+nama_unit+'</i></strong></p>';
                    // Baris += '</div>';
                    // Baris += '<div class="icon">';
                    // Baris += '<i class="fa fa-user"></i>';
                    // Baris += '</div>';
                    // Baris += '<a href="#" class="small-box-footer" style="background-color: #a8d4da; color: black;" onclick="tampilPasienermirna('+"'"+norm+"','"+unit+"','"+kunjungan+"','"+id_unit+"','"+nama+"','"+transaksi+"','"+tgl_lahir+"','"+alamat+"'"+')">Klik Detail <i class="fas fa-arrow-circle-right"></i></a>';
                    // Baris += '</div>';
                    // Baris += '</div>';

                        Baris += '<div class="inner p-1">';
                        Baris += '<h6><strong>'+norm+'</strong> / '+ namax +'</h6>';
                        Baris += '<p class="p-0 mb-1" style="font-size:12px;">'+alamatx+'</p>';
                        Baris += '<p class="p-0" style="font-size:12px;"><strong><i>'+unit+'</i></strong></p>';
                        Baris += '</div>';
                        Baris += '<div class="icon">';
                        Baris += '<i class="fa fa-user"></i>';
                        Baris += '</div>';
                        Baris += '<a href="#" class="small-box-footer" style="background-color: #a8d4da; color: black;" onclick="tampilPasienerminputpembedahan('+"'"+norm+"','"+unit+"','"+kunjungan+"','"+id_unit+"','"+nama+"','"+transaksi+"','"+tgl_lahir+"','"+alamat+"','"+id_pegawai+"'"+')" style="cursor:pointer;">Klik Disini <i class="fas fa-arrow-circle-right"></i></a>';
                        Baris += '</div>';
                        Baris += '</div>';
                    }
                    $('#listpasermirna_operasi').append(Baris);
                }       
            }
        });  
};
function tampilPasienerminputpembedahan() {
    document.getElementById('Divinputpembedahan').style.display='block';
    document.getElementById('Divcardlistpasermirna_operasi').style.display='none';
}
$(document).on('keyup', '.select2-search__field', function(ev) {
    var self = $(this);
    if (self.val().length > 1) {
        tampil_diagnosa_pra(self.val());
    }
});

$(document).on('keyup', '.select2-search__field', function(ev) {
    var selfa = $(this);
    if (selfa.val().length > 1) {
        tampil_diagnosa_pasca(selfa.val());
    }
});

function getPerawatbedah(){

    apiPOST('Rekammedisirna/searchPerawat', null, hasil => {
        a=hasil['data'];
        var b='';

        if (hasil !==null){ 
            for (var i = 0; i < a.length; i++) {
                z = hasil['data'][i];
                b+='<option value="'+z.id_pegawai+'">'+z.nama_pegawai+'</option>';
            }
            document.getElementById('qacbedahemr_assb1_id').innerHTML=b;
            document.getElementById('qacbedahemr_assb2_id').innerHTML=b;
            document.getElementById('qacbedahemr_ins_id').innerHTML=b;
            document.getElementById('qacbedahemr_omloop_id').innerHTML=b;
            document.getElementById('qacbedahemr_omloop2_id').innerHTML=b;
            document.getElementById('qacbedahemr_omloop3_id').innerHTML=b;
            document.getElementById('qacbedahemr_omloop4_id').innerHTML=b;
            document.getElementById('qacbedahemr_pntantesi_id').innerHTML=b;
            document.getElementById('qacbedahemr_pntantesi2_id').innerHTML=b;
        } 
    });
}

function getDokterbedah(){
    apiPOST('Rekammedisirna/searchDokter', null, hasil => {
        a=hasil['data'];    
        var b='';

        if (hasil !==null){ 
            for (var i = 0; i < a.length; i++) {
                z = hasil['data'][i];
                b+='<option value="'+z.id_pegawai+'">'+z.nama_pegawai+'</option>';
            }
            document.getElementById('qacbedahemr_op1_id').innerHTML=b;
            document.getElementById('qacbedahemr_op2_id').innerHTML=b;
            document.getElementById('qacbedahemr_an_id').innerHTML=b;
            document.getElementById('qacbedahemr_an2_id').innerHTML=b;
        } 
    });
}


function tampil_diagnosa_pra(kode) {
    var param = {
        id: kode
    };
    apiPOST('Data_Sosial/diagnosabyname', param, hasil => {
        var penjamin = '';
        var a = hasil['data'];
        for (var i = 0; i < a.length; i++) {
            penjamin += '<option value="' + a[i]['id_penyakit'] + '">' + a[i]['id_penyakit'] + ' | ' + a[i]['penyakit'] + '</option>';
        }
        document.getElementById('diagnos_prabedah').innerHTML = penjamin;
    });
}

function tampil_diagnosa_pasca(kode) {
    var param = {
        id: kode
    };
    apiPOST('Data_Sosial/diagnosabyname', param, hasil => {
        var penjamin = '';
        var a = hasil['data'];
        for (var i = 0; i < a.length; i++) {
            penjamin += '<option value="' + a[i]['id_penyakit'] + '">' + a[i]['id_penyakit'] + ' | ' + a[i]['penyakit'] + '</option>';
        }
        document.getElementById('diagnos_pascabedah').innerHTML = penjamin;
    });
}

function saveInputBedah(){
    if($('input[name=qacbedahemr_screningmrsa]:checked').val()==2){
        mrsa=$('input[name=screningmrsahasil]:checked').val();
    }else{
        mrsa=$('input[name=qacbedahemr_screningmrsa]:checked').val();
    }
    if($('input[name=qacbedahemr_prokfilaksis]:checked').val()==2){
        profil=$('#qacbedahemr_prokfilaksisobat').val()+','+$('#qacbedahemr_prokfilaksidosis').val()+','+$('#qacbedahemr_dprokfilaksidiberikanjam').val()
    }else{
        profil=$('input[name=qacbedahemr_prokfilaksis]:checked').val();
    }
    if($('input[name=qacbedahemr_antibiotiktambahan]:checked').val()==2){
        anti=$('#qacbedahemr_antibiotiktambahanobat').val()+','+$('#qacbedahemr_antibiotiktambahandosis').val()+','+$('#qacbedahemr_antibiotiktambahandiberikanjam').val()
    }else{
        anti=$('input[name=qacbedahemr_antibiotiktambahan]:checked').val();
    }
    if($('input[name=qacbedahemr_jarpart]:checked').val()==2){
        pato=$('#qacbedahemr_dtgljarpart').val()+','+$('#qacbedahemr_asaljarpat').val();
    }else{
        pato=$('input[name=qacbedahemr_jarpart]:checked').val();
    }
    if($('input[name=qacbedahemr_komplikasi]:checked').val()==2){
        kmpli=$('#qacbedahemr_komplikasiisi').val();
    }else{
        kmpli=$('input[name=qacbedahemr_komplikasi]:checked').val();
    }
    var sakit=Array.from(document.querySelectorAll('input[name=qacbedahemr_penyakitsaatini]:checked')).map(c=>c.value);
    sakit.push($('#qacbedahemr_penyakitsaatiniisi').val());
    pnyakit=sakit.join();
    var inf=Array.from(document.querySelectorAll('input[name=qacbedahemr_penyakitinfeksi]:checked')).map(c=>c.value);
    inf.push($('#qacbedahemr_penyakitinfeksiisi').val());
    feksi=inf.join();
    var deinf=Array.from(document.querySelectorAll('input[name=qacbedahemr_disinfeksikulit]:checked')).map(c=>c.value);
    deinf.push($('#qacbedahemr_disinfeksikulitisi').val());
    desin=deinf.join();
    var ins=Array.from(document.querySelectorAll('input[name=qacbedahemr_indikatorinstrumen]:checked')).map(c=>c.value);
    instr=ins.join();

    var param={
        transaksi   :$('#transaksiermirna').val(),
        id_kunjungan:$('#idKunjunganermirna').val(),
        berat:$('#qacbedahemr_beratbadan').val(),
        suhu:$('input[name=suhupasien]:checked').val(),
        gula:$('input[name=guladarah]:checked').val(),
        rokok:$('input[name=qacbedahemr_merokok]:checked').val(),
        kelengkapan:$('input[name=qacbedahemr_informedconsent]:checked').val(),
        albumin:$('#qacbedahemr_albumin').val(),
        penyakit:pnyakit,
        asesmen_dpjp:$('input[name=qacbedahemr_assesmentdpjp]:checked').val(),
        asesmen_anestesi:$('input[name=qacbedahemr_assesmentanastesi]:checked').val(),
        mrsa:mrsa,
        cukur:$('#qacbedahemr_pencukuran').val(),
        waktu_cukur:$('#qacbedahemr_dwaktupencukuran').val(),
        bowel:$('input[name=qacbedahemr_mechanicalbowel]:checked').val(),
        steroid:$('input[name=qacbedahemr_steroidjangkapanjang]:checked').val(),
        radioterapi:$('input[name=qacbedahemr_radiotrapisebelumnya]:checked').val(),
        mandi:$('#qacbedahemr_mandisebelumop').val(),
        profilaksis:profil,
        infeksi:feksi,
        ruang:$('#qacbedahemr_ruangoprasi').val(),
        trauma:$('input[name=qacbedahemr_oprasikarnatrauma]:checked').val(),
        ssc:$('input[name=qacbedahemr_ssc]:checked').val(),
        prosedur:$('#qacbedahemr_prosedureoprasi').val(),
        diagnosa:$('#qacbedahemr_diagnosa').val(),
        multiprosedur:$('input[name=qacbedahemr_multiprosedure]:checked').val(),
        asa:$('#qacbedahemr_asascore').val(),
        luka:$('#qacbedahemr_klasifikasiluka').val(),
        sirkulasi:$('#qacbedahemr_sirkulasiudaraok').val(),
        tekanan:$('input[name=tekananudara]:checked').val(),
        suhuruang:$('#qacbedahemr_suhuruang').val(),
        staff:$('#qacbedahemr_jumlahstaf').val(),
        air_count:$('#qacbedahemr_aircountok').val(),
        jamur:$('input[name=qacbedahemr_jamurac]:checked').val(),
        lembab:$('#qacbedahemr_kelembabanok').val(),
        drain:$('input[name=qacbedahemr_drain]:checked').val(),
        posisi_drain:$('input[name=posisidrain]:checked').val(),
        jns_drain:$('#qacbedahemr_jenidrain').val(),
        no_reg:$('#qacbedahemr_noregis').val(),
        sterilisasi:$('input[name=qacbedahemr_sterilisasi]:checked').val(),
        desinfeksi:desin,
        alat:instr,
        antibiotik:anti,
        jns_bedah    :$('#qacbedahemr_jenistrans_id').val(),
        dok_op1      :$('#qacbedahemr_op1_id').val(),
        dok_op2      :$('#qacbedahemr_op2_id').val(),
        dok_ane1:$('#qacbedahemr_an_id').val(),
        dok_ane2:$('#qacbedahemr_an2_id').val(),
        sus_ass1:$('#qacbedahemr_assb1_id').val(),
        sus_ass2:$('#qacbedahemr_assb2_id').val(),
        sus_instru:$('#qacbedahemr_ins_id').val(),
        sus_omloop1:$('#qacbedahemr_omloop_id').val(),
        sus_omloop2:$('#qacbedahemr_omloop2_id').val(),
        sus_omloop3:$('#qacbedahemr_omloop3_id').val(),
        sus_omloop4:$('#qacbedahemr_omloop4_id').val(),
        nata_anes1:$('#qacbedahemr_pntantesi_id').val(),
        nata_anes2:$('#qacbedahemr_pntantesi2_id').val(),
        tgl_awal:$('#qacbedahemr_tglstart').val(),
        tgl_akhir:$('#qacbedahemr_tglstop').val(),
        klasifikasi:$('#qacbedahemr_klasifikasi_id').val(),
        bedah:$('#qacbedahemr_jenisbedah_id').val(),
        jns_anestesi:$('#qacbedahemr_jenisan_id').val(),
        icd_pra:$('#diagnos_prabedah').val(),
        icd_pasca:$('#diagnos_pascabedah').val(),
        diagnose_pra:$('#qacbedahemr_diagklinisprabedah').val(),
        diagnose_pasca:$('#qacbedahemr_diagklinispascabedah').val(),
        pendarahan:$('#qacbedahemr_jumperdarahan').val(),
        transfusi:$('#qacbedahemr_jumdarahtransfusi').val(),
        patologi:pato,
        komplikasi:kmpli,
        implant:$('input[name=qacbedahemr_komplikasi]:checked').val(),
        jns_implant:$('#qacbedahemr_jeniimplat').val(),
        uraian:$('#urai_bedah').val(),
    };
    apiPOST('Rekammedisirna/inputpembedahan', param, hasil => {
        if (hasil['pesan']=='Berhasil') {
            alert(hasil['pesan']); 
        }else{
            alert(hasil['data']); 
        }
    })
/*  console.log(param_databed);
    console.log(param_konbed);
    console.log(param_konPas);*/
}
</script>