<?php
  $data 						= json_decode($_GET['data']);
  $rm 							= str_replace('"','', json_encode($data->rm));
  $namapasien       = str_replace('"','', json_encode($data->namapasien));
  $unit     				= str_replace('"','', json_encode($data->unit));
  $id_kunjungan     = str_replace('"','', json_encode($data->id_kunjungan));
  $id_transaksi     = str_replace('"','', json_encode($data->id_transaksi));
  $jeniskelamin     = str_replace('"','', json_encode($data->jeniskelamin));
?>
<div class="col-md-12 p-0">
  <div class="card "><!-- DATA PASIEN -->
    <div class="card-header" style="background-color:black;">
      <h3 class="card-title" style="color:white;">PERSETUJUAN TINDAKAN</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>       
      </div>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-6 d-none">
          <div class="form-group row">
            <div class="col-md-3">
              <label class="col-form-label">ID</label>
            </div>
            <div class="col-md-3">
              <input id="dacpersetujuantindakan_id" name="id" type="text" class="form-control form-control-sm" readonly="readonly">
            </div>
          </div>
          
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <div class="col-md-3">
              <label class="col-form-label">Tgl. Persetujuan</label>
            </div>
            <div class="col-md-4">
              <div class="input-group date" id="dacpersetujuantindakan_datgl" data-target-input="nearest">
                <input id="dacpersetujuantindakan_atgl" name="atgl" type="date" class="form-control form-control-sm" value="<?php echo date('Y-m-d');?>">
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-3">
              <label class="col-form-label">Perawat / Bidan</label>
            </div>
            <div class="col-md-7">
              <select id="dacpersetujuantindakan_apjId" name="apjId" class="form-control form-control-sm"></select>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <div class="col-md-3">
              <label class="col-form-label">Dokter</label>
            </div>
            <div class="col-md-7">
              <select id="dacpersetujuantindakan_apj2Id" name="apjId" class="form-control form-control-sm"></select>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="card "><!-- IDENTITAS YANG BERTANDA TANGAN -->
    <div class="card-header" style="background-color:black;">
      <h3 class="card-title" style="color:white;">IDENTITAS YANG BERTANDA TANGAN</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>       
      </div>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group row">
            <div class="col-md-3">
              <label class="col-form-label">Nama</label>
            </div>
            <div class="col-md-7">
              <input type="text" class="form-control form-control-sm" id="dacpersetujuantindakan_bnama" maxlength="50">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-3">
              <label class="col-form-label">Hubungan</label>
            </div>
            <div class="col-md-7">
              <div class="input-group">
                <select name="hubId" id="dacpersetujuantindakan_hubId" class="form-control form-control-sm">
                  <option value="0">--Pilih--</option>
                  <option value="1">Diri Sendiri</option>
                  <option value="2">Suami</option>
                  <option value="3">Istri</option>
                  <option value="4">Anak</option>
                  <option value="5">Orang Tua</option>
                  <option value="6">Keluarga</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-3">
              <label class="col-form-label">Umur</label>
            </div>
            <div class="col-md-7">
              <div class="input-group input-group-sm">
                <input type="number" class="form-control form-control-sm" id="dacpersetujuantindakan_bumur" maxlength="50">
                <span class="input-group-append">
                  <button type="button" class="btn btn-info btn-flat">Tahun</button>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-3">
              <label class="col-form-label">Alamat</label>
            </div>
            <div class="col-md-7">
              <input type="text" class="form-control form-control-sm" id="dacpersetujuantindakan_balamat" maxlength="100">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-3">
              <label class="col-form-label">Telp / HP</label>
            </div>
            <div class="col-md-7">
              <input type="number" class="form-control form-control-sm" id="dacpersetujuantindakan_btelp" maxlength="100">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-3">
              <label class="col-form-label">No. Identitas / KTP</label>
            </div>
            <div class="col-md-7">
              <input type="number" class="form-control form-control-sm" id="dacpersetujuantindakan_bnoktp" maxlength="100">
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <div class="col-md-12">
              <h6><u>IDENTITAS PASIEN</u></h6>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-3">
              <label class="col-form-label">Nama Pasien</label>
            </div>
            <div class="col-md-7">
              <b><label class="col-form-label" id="dacpersetujuantindakan_lnamapasien"></label></b>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-3">
              <label class="col-form-label">Nomor RM / Gender</label>
            </div>
            <div class="col-md-7">
              <label class="col-form-label" id="dacpersetujuantindakan_lnorm"></label>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-3">
              <label class="col-form-label">DPJP</label>
            </div>
            <div class="col-md-7">
              <label class="col-form-label" id="dacpersetujuantindakan_ldpjp"></label>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-3">
              <label class="col-form-label">Saksi Pasien</label>
            </div>
            <div class="col-md-7">
              <input type="text" class="form-control form-control-sm" id="dacpersetujuantindakan_saksi" maxlength="100">
            </div>
          </div>
        </div>  
      </div>
    </div>
  </div>

  <div class="card "><!-- PERSETUJUAN -->
    <div class="card-header" style="background-color:black;">
      <h3 class="card-title" style="color:white;">PERSETUJUAN</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>       
      </div>
    </div>
    <div class="card-body">
      <div class="col-md-6">
        <div class="form-group row">
          <div class="col-md-3">
            <label class="col-form-label"><b>Format </b> </label>
          </div>
          <div class="col-md-8">
            <select name="selectsearch" id="dacpersetujuantindakan_jenis1" class="form-control form-control-sm">
              <option value="0">--PILIH--</option>
              <option value="1">UMUM</option>
              <option value="2">Anestesi</option>
            </select>          
          </div> 
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row">
          <h6>Dengan ini menyatakan PERSETUJUAN  untuk dilakukannya :</h6>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row" id="dacpersetujuantindakan_divjenis" >
          <div class="col-md-3">
            <label class="col-form-label" title="Katagori Pencarian">Tindakan</label>
          </div>
          <div class="col-md-8">
            <select name="selectsearch" id="dacpersetujuantindakan_jenis2" class="form-control form-control-sm">
              <option value="0">--Semua--</option>
              <option value="1">Bius Umum</option>
              <option value="2">Bius Spinal</option>
              <option value="3">Sedasi</option>
              <option value="4">Bius Lokal</option>
              <option value="5">Lain-lain</option>
            </select>
            <input type="text" class="form-control mt-1 form-control-sm" id="dacpersetujuantindakan_jenis2ket">
          </div>
        </div>        
        <div class="form-group row" id="dacpersetujuantindakan_divalasan" >
          <div class="col-md-3">
            <label class="col-form-label">Nama Tindakan</label>
          </div>
          <div class="col-md-8">
            <textarea rows="3" name="dacpersetujuantindakan_aalasan" id="dacpersetujuantindakan_aalasan" style="width:100%;" class="form-control form-control-sm"></textarea>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group row">
          <div class="col-md-12" style="text-align: center;">
            <h6><p>
              Saya memahami dan mengerti perlunya dan manfaat tindakan sebagaimana telah dijelaskan seperti di atas kepada saya, termasuk risiko dan komplikasi yang mungkin timbul.</p></h6>
          </div>
          <div class="col-md-12" style="text-align: center;">
            <h6><p>
              Saya juga menyadari bahwa dokter melakukan suatu upaya dan oleh karena ilmu kedokteran bukanlah ilmu pasti, maka keberhasilan tindakan kedokteran bukanlah keniscayaan, melainkan sangat bergantung kepada izin Tuhan Yang Maha Esa. </p></h6>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="card"><!-- TTD -->
    <div class="card-body">
      <div class="row">
        <div class="col-md-3" align="center">
          <label>Dokter</label>
          <div style="text-align: center;">
            <img style="width:200px;height:200px;border: 2px dashed;background-color: #535b62d1;" id="Gambarpaint_ttdpersetujuantindakani1">
            <input type="text" class="form-control form-control-sm text-center d-none" id="Hasilpaint_ttdpersetujuantindakani1" disabled>
          </div>
          <button  class="btn btn-warning btn-sm" onclick="ShowModalpaint_ttdpersetujuantindakani1();">Klik Tanda Tangan</button><br>
          <label>Nama &amp; Tanda tangan</label>
        </div>

        <div class="col-md-3" align="center">
          <label>Perawat / Bidan</label>
          <div style="text-align: center;">
            <img style="width:200px;height:200px;border: 2px dashed;background-color: #535b62d1;" id="Gambarpaint_ttdpersetujuantindakani2">
            <input type="text" class="form-control form-control-sm text-center d-none" id="Hasilpaint_ttdpersetujuantindakani2" disabled>
          </div>
          <button  class="btn btn-warning btn-sm" onclick="ShowModalpaint_ttdpersetujuantindakani2();">Klik Tanda Tangan</button><br>
          <label>Nama &amp; Tanda tangan</label>
        </div>

        <div class="col-md-3" align="center">
          <label>Yang Membuat Pernyatan</label>
          <div style="text-align: center;">
            <img style="width:200px;height:200px;border: 2px dashed;background-color: #535b62d1;" id="Gambarpaint_ttdpersetujuantindakani3">
            <input type="text" class="form-control form-control-sm text-center d-none" id="Hasilpaint_ttdpersetujuantindakani3" disabled>
          </div>
          <button  class="btn btn-warning btn-sm" onclick="ShowModalpaint_ttdpersetujuantindakani3();">Klik Tanda Tangan</button><br>
          <label>Nama &amp; Tanda tangan</label>
        </div>

        <div class="col-md-3" align="center">
          <label>Saksi Pasien / Keluarga</label>
          <div style="text-align: center;">
            <img style="width:200px;height:200px;border: 2px dashed;background-color: #535b62d1;" id="Gambarpaint_ttdpersetujuantindakani4">
            <input type="text" class="form-control form-control-sm text-center d-none" id="Hasilpaint_ttdpersetujuantindakani4" disabled>
          </div>
          <button  class="btn btn-warning btn-sm" onclick="ShowModalpaint_ttdpersetujuantindakani4();">Klik Tanda Tangan</button><br>
          <label>Nama &amp; Tanda tangan</label>
        </div>
        
      </div>
    </div>
    <div class="card-footer">
      <button id="dacpersetujuantindakan_btsave" onclick="saveSetuju()" type="button" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Simpan Persetujuan Tindakan</button>
      <button id="dacpersetujuantindakan_btreset" type="button" class="btn btn-sm btn-warning" style="display:none;">Reset</button>
      <button id="dacpersetujuantindakan_btdelete" type="button" class="btn btn-sm btn-danger" style="display:none;">Hapus</button>
      <button id="dacpersetujuantindakan_btprint" type="button" class="btn btn-sm btn-success" style="display:none;">Cetak PDF</button>
      <button id="dacpersetujuantindakan_btpantau" type="button" class="btn btn-sm btn-success" style="display:none;">Pemantauan Restraint</button>
    </div>
  </div>
</div>

<div class="modal fade"  id="Modalpaint_ttdpersetujuantindakani1" role="dialog">
  <div class="modal-dialog" style="width: 408px;">
    <div class="modal-content">
      <div class="modal-body">
        <div id="paint_ttdpersetujuantindakani1"></div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-sm btn-primary" onclick="takepaint_ttdpersetujuantindakani1()"><i class="fa fa-save"></i> Simpan</button>
        <button class="btn btn-sm btn-outline-danger" onclick="$('#Modalpaint_ttdpersetujuantindakani1').modal('hide')"><i class="fa fa-times"></i> Batal</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade"  id="Modalpaint_ttdpersetujuantindakani2" role="dialog">
  <div class="modal-dialog" style="width: 408px;">
    <div class="modal-content">
      <div class="modal-header"></div>
      <div class="modal-body">
        <div id="paint_ttdpersetujuantindakani2"></div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-sm btn-primary" onclick="takepaint_ttdpersetujuantindakani2()"><i class="fa fa-save"></i> Simpan</button>
        <button class="btn btn-sm btn-outline-danger" onclick="$('#Modalpaint_ttdpersetujuantindakani2').modal('hide')"><i class="fa fa-times"></i> Batal</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade"  id="Modalpaint_ttdpersetujuantindakani3" role="dialog">
  <div class="modal-dialog " style="width: 408px;">
    <div class="modal-content">
      <div class="modal-body">
        <div id="paint_ttdpersetujuantindakani3"></div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-sm btn-primary" onclick="takepaint_ttdpersetujuantindakani3()"><i class="fa fa-save"></i> Simpan</button>
        <button class="btn btn-sm btn-outline-danger" onclick="$('#Modalpaint_ttdpersetujuantindakani3').modal('hide')"><i class="fa fa-times"></i> Batal</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade"  id="Modalpaint_ttdpersetujuantindakani4" role="dialog">
  <div class="modal-dialog" style="width: 408px;">
    <div class="modal-content">
      <div class="modal-body">
        <div id="paint_ttdpersetujuantindakani4"></div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-sm btn-primary" onclick="takepaint_ttdpersetujuantindakani4()"><i class="fa fa-save"></i> Simpan</button>
        <button class="btn btn-sm btn-outline-danger" onclick="$('#Modalpaint_ttdpersetujuantindakani4').modal('hide')"><i class="fa fa-times"></i> Batal</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
var ttdpaint_ttdpersetujuantindakani1   = new WPaintX('paint_ttdpersetujuantindakani1');
var ttdpaint_ttdpersetujuantindakani2   = new WPaintX('paint_ttdpersetujuantindakani2');
var ttdpaint_ttdpersetujuantindakani3   = new WPaintX('paint_ttdpersetujuantindakani3');
var ttdpaint_ttdpersetujuantindakani4   = new WPaintX('paint_ttdpersetujuantindakani4');

var no_rm   				= "<?php echo $rm; ?>";
var namapasien      = "<?php echo $namapasien; ?>";
var id_unit   			= "<?php echo $unit; ?>";
var id_kunjungan   	= "<?php echo $id_kunjungan; ?>";
var id_transaksi   	= "<?php echo $id_transaksi; ?>";
var jeniskelamin    = "<?php echo $jeniskelamin; ?>";

viewSetuju();
loadPersetujTind();

function showpaint_ttdpersetujuantindakani1(){
  ttdpaint_ttdpersetujuantindakani1.show();
}
function showpaint_ttdpersetujuantindakani2(){
  ttdpaint_ttdpersetujuantindakani2.show();
}
function showpaint_ttdpersetujuantindakani3(){
  ttdpaint_ttdpersetujuantindakani3.show();
}
function showpaint_ttdpersetujuantindakani4(){
  ttdpaint_ttdpersetujuantindakani4.show();
}

function ShowModalpaint_ttdpersetujuantindakani1() {
  showpaint_ttdpersetujuantindakani1();
  $('#Modalpaint_ttdpersetujuantindakani1').modal('show');
}
function ShowModalpaint_ttdpersetujuantindakani2() {
  showpaint_ttdpersetujuantindakani2();
  $('#Modalpaint_ttdpersetujuantindakani2').modal('show');
}
function ShowModalpaint_ttdpersetujuantindakani3() {
  showpaint_ttdpersetujuantindakani3();
  $('#Modalpaint_ttdpersetujuantindakani3').modal('show');
}
function ShowModalpaint_ttdpersetujuantindakani4() {
  showpaint_ttdpersetujuantindakani4();
  $('#Modalpaint_ttdpersetujuantindakani4').modal('show');
}

function takepaint_ttdpersetujuantindakani4() {
  document.getElementById('Gambarpaint_ttdpersetujuantindakani4').src = ttdpaint_ttdpersetujuantindakani4.getData();
  document.getElementById('Hasilpaint_ttdpersetujuantindakani4').value = ttdpaint_ttdpersetujuantindakani4.getData();
  $('#Modalpaint_ttdpersetujuantindakani4').modal('hide');
}

function takepaint_ttdpersetujuantindakani3() {
  document.getElementById('Gambarpaint_ttdpersetujuantindakani3').src = ttdpaint_ttdpersetujuantindakani3.getData();
  document.getElementById('Hasilpaint_ttdpersetujuantindakani3').value = ttdpaint_ttdpersetujuantindakani3.getData();
  $('#Modalpaint_ttdpersetujuantindakani3').modal('hide');
}
function takepaint_ttdpersetujuantindakani2() {
  document.getElementById('Gambarpaint_ttdpersetujuantindakani2').src = ttdpaint_ttdpersetujuantindakani2.getData();
  document.getElementById('Hasilpaint_ttdpersetujuantindakani2').value = ttdpaint_ttdpersetujuantindakani2.getData();
  $('#Modalpaint_ttdpersetujuantindakani2').modal('hide');
}
function takepaint_ttdpersetujuantindakani1() {
  document.getElementById('Gambarpaint_ttdpersetujuantindakani1').src = ttdpaint_ttdpersetujuantindakani1.getData();
  document.getElementById('Hasilpaint_ttdpersetujuantindakani1').value = ttdpaint_ttdpersetujuantindakani1.getData();
  $('#Modalpaint_ttdpersetujuantindakani1').modal('hide');
}

function viewSetuju(){
  document.getElementById('dacpersetujuantindakan_id').value              = no_rm;
  document.getElementById('dacpersetujuantindakan_lnamapasien').innerHTML = namapasien;
  document.getElementById('dacpersetujuantindakan_lnorm').innerHTML       = no_rm +' / '+jeniskelamin;

  apiPOST('Rekammedisirna/searchDokter', data.id_unit, hasil => {
    var dok = "<option value='0'> - Silahkan Pilih -</option>";
    var b = hasil['data'];
    for (var j = 0; j < b.length; j++) {
      if(b[j]['id_pegawai']==$('#dpjpResumeermirna').val()){
        dok += '<option value="' + b[j]['id_pegawai'] + '" selected>' + b[j]['nama_pegawai'] + '</option>';
        document.getElementById('dacpersetujuantindakan_ldpjp').innerHTML = b[j]['nama_pegawai'];
      }else{
        dok += '<option value="' + b[j]['id_pegawai'] + '">' + b[j]['nama_pegawai'] + '</option>';
      }
    }
    document.getElementById('dacpersetujuantindakan_apj2Id').innerHTML = dok;

  });

  apiPOST('Rekammedisirna/searchPerawat', data.id_unit, hasil => {
    var sus = "<option value='0'> - Silahkan Pilih -</option>";
    var a = hasil['data'];
    for (var i = 0; i < a.length; i++) {
      sus += '<option value="' + a[i]['id_pegawai'] + '">' + a[i]['nama_pegawai'] + '</option>';
    }
    document.getElementById('dacpersetujuantindakan_apjId').innerHTML = sus;
  
  });
}

function saveSetuju(){
  document.getElementById("loading_persetujuantindakan").style.display = 'block';
  var param = {
    id_transaksi    : id_transaksi,
    id_kunjungan    : id_kunjungan,
    tgl             : $('#dacpersetujuantindakan_atgl').val(),
    perawat         : $('#dacpersetujuantindakan_apjId').val(),
    dokter          : $('#dacpersetujuantindakan_apj2Id').val(),
    nama            : $('#dacpersetujuantindakan_bnama').val(),
    hubung          : $('#dacpersetujuantindakan_hubId').val(),
    umur            : $('#dacpersetujuantindakan_bumur').val(),
    alamat          : $('#dacpersetujuantindakan_balamat').val(),
    telp            : $('#dacpersetujuantindakan_btelp').val(),
    ktp             : $('#dacpersetujuantindakan_bnoktp').val(),
    saksi           : $('#dacpersetujuantindakan_saksi').val(),
    format          : $('#dacpersetujuantindakan_jenis1').val(),
    tindakan        : $('#dacpersetujuantindakan_jenis2').val(),
    tindakan_ket    : $('#dacpersetujuantindakan_jenis2ket').val(),
    alasan_tindakan : $('#dacpersetujuantindakan_aalasan').val(),
    ttddokter       : $('#Hasilpaint_ttdpersetujuantindakani1').val(),
    ttdperawat      : $('#Hasilpaint_ttdpersetujuantindakani2').val(),
    ttdpembuat      : $('#Hasilpaint_ttdpersetujuantindakani3').val(),
    ttdsaksi        : $('#Hasilpaint_ttdpersetujuantindakani4').val(),
    iduser          : user.id_user,
  }
  apiPOST('Rekammedisirna/savepersetujuantindakan', param,hasil=>{
    document.getElementById("loading_persetujuantindakan").style.display = 'none';
  });
}

function loadPersetujTind(){
  var param = {
    norm            : no_rm,
    id_kunjungan    : id_kunjungan,
    id_transaksi    : id_transaksi,
  };

  document.getElementById("loading_persetujuantindakan").style.display = 'block';
  apiPOST('Rekammedisirna/loadPersetujTind', param, hasil => {
    if (hasil['data'] != 0){
      var PersetujuanTind = hasil['data'];

      var id_transaksi    = PersetujuanTind[0].id_transaksi;
      var id_kunjungan    = PersetujuanTind[0].id_kunjungan;
      var id_pegawai      = PersetujuanTind[0].id_pegawai;
      var tgl_tindakan    = PersetujuanTind[0].tgl_tindakan;
      var perawat         = PersetujuanTind[0].perawat;
      var nama            = PersetujuanTind[0].nama;
      var hub             = PersetujuanTind[0].hub;
      var umur            = PersetujuanTind[0].umur;
      var alamat          = PersetujuanTind[0].alamat;
      var telp            = PersetujuanTind[0].telp;
      var ktp             = PersetujuanTind[0].ktp;
      var saksi           = PersetujuanTind[0].saksi;
      var format          = PersetujuanTind[0].format;
      var tindakan        = PersetujuanTind[0].tindakan;
      var tindakan_ket    = PersetujuanTind[0].tindakan_ket;
      var alasan_tindakan = PersetujuanTind[0].alasan_tindakan;
      var ttddokter       = PersetujuanTind[0].ttddokter;
      var ttdperawat      = PersetujuanTind[0].ttdperawat;
      var ttdpembuat      = PersetujuanTind[0].ttdpembuat;
      var ttdsaksi        = PersetujuanTind[0].ttdsaksi;
      var aktif           = PersetujuanTind[0].aktif;
      var id_dokter       = PersetujuanTind[0].id_dokter;

      document.getElementById('dacpersetujuantindakan_apjId').value     = perawat;
      document.getElementById('dacpersetujuantindakan_atgl').value      = tgl_tindakan;
      document.getElementById('dacpersetujuantindakan_bnama').value     = nama;
      document.getElementById('dacpersetujuantindakan_hubId').value     = hub;
      document.getElementById('dacpersetujuantindakan_bumur').value     = umur;
      document.getElementById('dacpersetujuantindakan_balamat').value   = alamat;
      document.getElementById('dacpersetujuantindakan_btelp').value     = telp;
      document.getElementById('dacpersetujuantindakan_bnoktp').value    = ktp;
      document.getElementById('dacpersetujuantindakan_saksi').value     = saksi;
      document.getElementById('dacpersetujuantindakan_jenis1').value    = format;
      document.getElementById('dacpersetujuantindakan_jenis2').value    = tindakan;
      document.getElementById('dacpersetujuantindakan_jenis2ket').value = tindakan_ket;
      document.getElementById('dacpersetujuantindakan_aalasan').value   = alasan_tindakan;

      var imgDokter = document.getElementById('Gambarpaint_ttdpersetujuantindakani1'); 
      imgDokter.src = ttddokter;

      var imgPerawat = document.getElementById('Gambarpaint_ttdpersetujuantindakani2'); 
      imgPerawat.src = ttdperawat;

      var imgUser = document.getElementById('Gambarpaint_ttdpersetujuantindakani3'); 
      imgUser.src = ttdpembuat;

      var imgSaksi = document.getElementById('Gambarpaint_ttdpersetujuantindakani4'); 
      imgSaksi.src = ttdsaksi;

    }else{
      toastr.error("Persetujuan Tindakan Masih Kosong!!");
    }
    document.getElementById("loading_persetujuantindakan").style.display = 'none';
  });
}
</script>