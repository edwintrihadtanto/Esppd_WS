<?php
$data 						= json_decode($_GET['data']);
$rm 							= str_replace('"','', json_encode($data->rm));
$unit     				= str_replace('"','', json_encode($data->unit));
$id_kunjungan     = str_replace('"','', json_encode($data->id_kunjungan));
$id_transaksi     = str_replace('"','', json_encode($data->id_transaksi));
?>

<div class="col-md-12 p-2">
  <div class="card">
    <div class="card-header">
      <h3>Tindakan Hemodialisa</h3>
    </div>
    <div class="card-body" style="overflow-x: auto;">
      <button onclick="$('#Modalmonitoringhd').modal('show')" class="btn btn-primary">Tambah</button>
      <table   class="table table-striped table-sm" style="border: 1px;">
        <thead>
          <tr>
            <th style="width: 15px">#</th>
            <th>Tgl</th>
            <th>Observasi</th>
            <th>Quick Of Blood</th>
            <th>Ultra Filtration Rate</th>
            <th>Tensi Darah</th>
            <th>Heart Rate</th>
            <th>Suhu</th>
            <th>RR</th>
            <th>MAP</th>
            <th>TMP</th>
            <th>VP</th>
            <th>AP</th>
            <th>Skala Nyeri</th>
            <th>GCS</th>
            <th>Target UFG</th>
            <th>NaCL 0.9%</th>
            <th>Dektros 40%</th>
            <th>Makan Minum</th>
            <th>Lain-lain</th>
            <th>Jml CC</th>
            <th>UF Volume</th>
            <th>Keterangan</th>
            <th>Perawat</th>
          </tr>
        </thead>
        <tbody id="bodyhistoriMonitoringHD"></tbody>
      </table>
    </div>
  </div>

</div>
<div class="modal fade" id="Modalmonitoringhd" data-bs-backdrop="static">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header"><h3>MONITORING HD</h3></div>
    <div class="modal-body">
     <div class="card-body row">
      <div class="col-md-6">
        
        <div class="form-group row">
          <div class="col-md-3">
            <label class="col-form-label">Perawat</label>
          </div>
          <div class="col-md-8">
           <div class="input-group">
            <select id="dactindakanhd_bparaf" name="paraf" class="form-control"></select>
          </div>
        </div>
        <div class="col-md-1">
          <button id="dactindakanhd_btpjdef" class="btn btn-warning d-none" type="button" title="Default PJ">
            &nbsp;<svg class="svg-inline--fa fa-undo fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="undo" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M212.333 224.333H12c-6.627 0-12-5.373-12-12V12C0 5.373 5.373 0 12 0h48c6.627 0 12 5.373 12 12v78.112C117.773 39.279 184.26 7.47 258.175 8.007c136.906.994 246.448 111.623 246.157 248.532C504.041 393.258 393.12 504 256.333 504c-64.089 0-122.496-24.313-166.51-64.215-5.099-4.622-5.334-12.554-.467-17.42l33.967-33.967c4.474-4.474 11.662-4.717 16.401-.525C170.76 415.336 211.58 432 256.333 432c97.268 0 176-78.716 176-176 0-97.267-78.716-176-176-176-58.496 0-110.28 28.476-142.274 72.333h98.274c6.627 0 12 5.373 12 12v48c0 6.627-5.373 12-12 12z"></path></svg><!-- <i class="fas fa-undo"></i> -->&nbsp;
          </button>
        </div>                      
      </div>              
      <div class="form-group row">
        <div class="col-md-3">
          <label class="col-form-label">Tanggal &amp; Jam</label>
        </div>
        <div class="col-md-8">
          <div class="input-group date" id="dactindakanhd_datgl" data-target-input="nearest">
            <input id="dactindakanhd_atgl" name="atgl" type="datetime-local" class="form-control" value="<?php echo date('Y-m-d')?>">

          </div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-3">
          <label class="col-form-label">Observasi</label>
        </div>
        <div class="col-md-8">
         <div class="input-group">
          <select name="observasi" id="dactindakanhd_observasi" class="form-control">
            <option value="1">PRE-HD</option>
            <option value="2">INTRA HEMODIALISIS</option>
            <option value="3">POST-HD</option>
          </select>
        </div>
      </div>
    </div>              
    <div class="form-group row" id="dactindakanhd_divhd1">
      <div class="col-md-3">
        <label class="col-form-label">Quick Of Blood</label>
      </div>
      <div class="col-md-8">
       <div class="input-group">
        <input type="number" class="form-control" id="dactindakanhd_bqb" value=0 required>
        <span class="input-group-append ">
          <span class="input-group-text">ml/mnt</span>
        </span>
      </div>
    </div>
  </div>
  <div class="form-group row" id="dactindakanhd_divhd2">
    <div class="col-md-3">
      <label class="col-form-label">Ultra Filtration Rate</label>
    </div>
    <div class="col-md-8">
     <div class="input-group">
      <input type="number" class="form-control" id="dactindakanhd_bufr" value=0 required>
      <span class="input-group-append ">
        <span class="input-group-text">ml</span>
      </span>                   
    </div>
  </div>
</div>
<div class="form-group row">
  <div class="col-md-3">
    <label class="col-form-label">Tensi Darah</label>
  </div>
  <div class="col-md-8">
    <div class="input-group">
      <input type="number" onfocus="this.select();" class="form-control" id="dactindakanhd_btensi" value=0 required>
      <label class="col-form-label">/</label>
      <input type="number" onfocus="this.select();" class="form-control" id="dactindakanhd_btensi1" value=0 required>
      <span class="input-group-append ">
        <span class="input-group-text">mmHg</span>
      </span>                   
    </div>
  </div>                                      
</div>
<div class="form-group row">
  <div class="col-md-3">
    <label class="col-form-label">Heart Rate</label>
  </div>
  <div class="col-md-8">
   <div class="input-group">
    <input type="number" class="form-control" id="dactindakanhd_bhr" value=0 required>
    <span class="input-group-append ">
      <span class="input-group-text">x/Menit</span>
    </span>
  </div>
</div>
</div>
<div class="form-group row">
  <div class="col-md-3">
    <label class="col-form-label">Suhu</label>
  </div>
  <div class="col-md-8">
   <div class="input-group">
    <input type="number" class="form-control" id="dactindakanhd_bsuhu" value=0 required>
    <span class="input-group-append">
      <span class="input-group-text">°C</span>
    </span>
  </div>
</div>
</div>
<div class="form-group row">
  <div class="col-md-3">
    <label class="col-form-label">RR</label>
  </div>
  <div class="col-md-8">
   <div class="input-group">
    <input type="number" class="form-control" id="dactindakanhd_brr" value=0 required>
    <span class="input-group-append ">
      <span class="input-group-text">x/Menit</span>
    </span>
  </div>
</div>
</div>
<div class="form-group row">
  <div class="col-md-3">
    <label class="col-form-label">MAP</label>
  </div>
  <div class="col-md-8">
   <div class="input-group">
    <input type="number" value=0 required onfocus="this.select();" class="form-control" id="dactindakanhd_bmap">
  </div>
</div>
</div>
<div class="form-group row" id="dactindakanhd_divhd3">
  <div class="col-md-3">
    <label class="col-form-label">TMP</label>
  </div>
  <div class="col-md-8">
   <div class="input-group">
    <input type="number" class="form-control" id="dactindakanhd_btmp" value=0 required>
  </div>
</div>
</div>
<div class="form-group row" id="dactindakanhd_divhd4">
  <div class="col-md-3">
    <label class="col-form-label">VP</label>
  </div>
  <div class="col-md-8">
   <div class="input-group">
    <input type="number" class="form-control" id="dactindakanhd_bvp" value=0 required>
  </div>
</div>
</div>
<div class="form-group row" id="dactindakanhd_divhd5">
  <div class="col-md-3">
    <label class="col-form-label">AP</label>
  </div>
  <div class="col-md-8">
   <div class="input-group">
    <input type="number" class="form-control" id="dactindakanhd_bap" value=0 required>
  </div>
</div>
</div>                            
<div class="form-group row">
  <div class="col-md-3">
    <label class="col-form-label">Skala Nyeri</label>
  </div>
  <div class="col-md-8">
   <input type="number" class="form-control" id="dactindakanhd_bnyeri" value=0 required>
 </div>
</div>
<div class="form-group row">
  <div class="col-md-3">
    <label class="col-form-label">GCS</label>
  </div>
  <div class="col-md-8">
   <div class="input-group">
    <input type="number" class="form-control" id="dactindakanhd_bgcs" value=0 required>
  </div>
</div>
</div>
<div class="form-group row" id="dactindakanhd_divhd6">
  <div class="col-md-3">
    <label class="col-form-label">Target UFG</label>
  </div>
  <div class="col-md-8">
   <div class="input-group">
    <input type="number" class="form-control" id="dactindakanhd_targetufg" value=0 required>
  </div>
</div>
</div>              
</div>
<div class="col-md-6">
  <div class="form-group row">
    <div class="col-md-3">
      <label class="col-form-label font-weight-bold">INTAKE</label>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-md-3">
      <label class="col-form-label">NaCL 0.9%</label>
    </div>
    <div class="col-md-8">
     <div class="input-group">
      <input type="number" class="form-control" id="dactindakanhd_bnacl" value=0 required>
      <span class="input-group-append">
        <span class="input-group-text">cc</span>
      </span>
    </div>
  </div>
</div>  
<div class="form-group row">
  <div class="col-md-3">
    <label class="col-form-label">Dektros 40%</label>
  </div>
  <div class="col-md-8">
   <div class="input-group">
    <input type="number" class="form-control" id="dactindakanhd_bdektros" value=0 required>
    <span class="input-group-append">
      <span class="input-group-text">cc</span>
    </span>
  </div>
</div>
</div>
<div class="form-group row">
  <div class="col-md-3">
    <label class="col-form-label">Makan Minum</label>
  </div>
  <div class="col-md-8">
   <div class="input-group">
    <input type="number" class="form-control" id="dactindakanhd_bmakanminum" value=0 required>
    <span class="input-group-append">
      <span class="input-group-text">cc</span>
    </span>                   
  </div>
</div>
</div>
<div class="form-group row">
  <div class="col-md-3">
    <label class="col-form-label">Lain-lain</label>
  </div>
  <div class="col-md-8">
   <div class="input-group">
    <textarea class="form-control" id="dactindakanhd_bket" rows="2" cols="5"></textarea>
  </div>
</div>
</div>
<div class="form-group row">
  <div class="col-md-3">
    <label class="col-form-label">Jml CC</label>
  </div>
  <div class="col-md-8">
   <div class="input-group">
    <input type="number" class="form-control" id="dactindakanhd_bketisi" value=0 required>
    <span class="input-group-append">
      <span class="input-group-text">cc</span>
    </span>                   
  </div>
</div>
</div>
<div class="form-group row">
  <div class="col-md-3">
    <label class="col-form-label font-weight-bold">OUT PUT</label>
  </div>
</div>        
<div class="form-group row">
  <div class="col-md-3">
    <label class="col-form-label">UF Volume</label>
  </div>
  <div class="col-md-8">
   <div class="input-group">
    <input type="number" class="form-control" id="dactindakanhd_bvolume" value=0 required>
    <span class="input-group-append">
      <span class="input-group-text">cc</span>
    </span>                   
  </div>
</div>
</div>
<div class="form-group row">
  <div class="col-md-3">
    <label class="col-form-label">Keterangan</label>
  </div>
  <div class="col-md-8">
   <div class="input-group">
    <textarea class="form-control" id="dactindakanhd_bket1" rows="3" cols="10"></textarea>
  </div>
</div>
</div>
<div class="form-group row" id="dactindakanhd_div_post" style="display:none;">
  <div class="col-md-3">
    <label class="col-form-label font-weight-bold">POST HD</label>
  </div>
</div>                
<div class="form-group row" id="dactindakanhd_div_ufg" style="display:none;">
  <div class="col-md-3">
    <label class="col-form-label">UFG</label>
  </div>
  <div class="col-md-8">
   <div class="input-group">
    <input type="number" class="form-control" id="dactindakanhd_ufg">
    <span class="input-group-append ">
      <span class="input-group-text">ml</span>
    </span>                   
  </div>
</div>
</div>
<div class="form-group row" id="dactindakanhd_div_ktv" style="display:none;">
  <div class="col-md-3">
    <label class="col-form-label">Kt/v</label>
  </div>
  <div class="col-md-8">
   <div class="input-group">
    <input type="number" class="form-control" id="dactindakanhd_ktv">
  </div>
</div>
</div>
<div class="form-group row" id="dactindakanhd_div_clear" style="display:none;">
  <div class="col-md-3">
    <label class="col-form-label">Clear</label>
  </div>
  <div class="col-md-8">
   <div class="input-group">
    <input type="number" class="form-control" id="dactindakanhd_clear">
  </div>
</div>
</div>                                          
<div class="form-group row">
  <div class="col-md-12">Tanda Tangan                                                          
    <table class="table table-bordered table-condensed" style="width: 240px; height: 80px;">
      <tbody>
        <tr>
          <td width="30%" style="padding: 0;">
            <div id="dacriberiMonitorHDid1" class="sigPad border border-dark" style="width: 240px;">
              <div class="sig sigWrapper border border-dark current" style="height: auto; display: block;">
                <img id="ImgTtdMonitorHD1" style="width:250px;height:250px;">
              </div>
              <input type="hidden" name="HasilTtdMonitorHD1" id="HasilTtdMonitorHD1">
              <div><button class="btn btn-primary" onclick="showModalMonitorHD1()">TTD</button> </div>
            </div>
            <div id="divttdMonitorHD1" style="display: none;">
              <div  style="width: 408px;border: 1px;" id="paint_ttdMonitorHD1" ></div>
              <div>
                <button class="btn btn-sm btn-primary" onclick="takeTtdMonitorHD1();">Simpan</button>
                <button class="btn btn-sm btn-outline-danger" onclick="$('#ModalTtdPemberianinfus1').modal('hide');">Batal</button>
              </div>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
</div>                      
</div>
</div>
<div class="modal-footer">
  <button class="btn btn-primary" onclick="insertmonitoringhd()">Simpan</button><button class="btn btn-default" onclick="$('#Modalmonitoringhd').modal('hide');">Close</button>
</div>
</div>
</div>  
</div>

<script type="text/javascript">

  var listperawat 		= [];
  //document.getElementById('loading_DaftarPemberianInfus').style.display = 'none';
  $(document).ready(function() {
    viewDftarPerawat();
    daftarMonitoringHD();
  })
  function viewDftarPerawat(){
    apiPOST('Rekammedisirna/searchPerawat', data.id_unit, hasil => {
      var sus = "<option value='0'> - Silahkan Pilih -</option>";
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        sus += '<option value="' + a[i]['id_pegawai'] + '">' + a[i]['nama_pegawai'] + '</option>';
      }
      document.getElementById('dactindakanhd_bparaf').innerHTML = sus;
    })

  }


  function viewjenisobat(){

    apiPOST('Rekammedisirna/jenisinfus', data.id_unit, hasil => {
      var sus = "<option value='0'> - Silahkan Pilih -</option>";
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        sus += '<option value="' + a[i]['kd_obat'] + '">' + a[i]['nama_obat'] + '</option>';
      }
      document.getElementById('dacriberiinfus_infusId').innerHTML = sus;
    })

  }

  var ttdMonitorHD1      = new WPaintX('paint_ttdMonitorHD1');
  function showModalMonitorHD1() {
    showttdMonitorHD1();
    document.getElementById('divttdMonitorHD1').style.display='block';
    document.getElementById('dacriberiMonitorHDid1').style.display='none';

  }
  function showttdMonitorHD1(){
    ttdMonitorHD1.show();
  }
  function takeTtdMonitorHD1() {
    document.getElementById('ImgTtdMonitorHD1').src=ttdMonitorHD1.getData();
    document.getElementById('HasilTtdMonitorHD1').value=ttdMonitorHD1.getData();
    document.getElementById('divttdMonitorHD1').style.display='none';
    document.getElementById('dacriberiMonitorHDid1').style.display='block';
  }
  

  function insertmonitoringhd() {
    param={
      id_kunjungan:$('#idKunjunganErmKeperawatanIrja').val(),
      id_transaksi:$('#idTransaksiErmKeperawatanIrja').val(),
      user        :user.id_pegawai,
      perawat     :$('#dactindakanhd_bparaf').val(),
      tgl         :$('#dactindakanhd_atgl').val(),
      observasi   :$('#dactindakanhd_observasi').val(),
      qb          :$('#dactindakanhd_bqb').val(),
      ufr         :$('#dactindakanhd_bufr').val(),
      tensi       :$('#dactindakanhd_btensi').val(),
      tensi1      :$('#dactindakanhd_btensi1').val(),
      hr          :$('#dactindakanhd_bhr').val(),
      suhu        :$('#dactindakanhd_bsuhu').val(), 
      rr          :$('#dactindakanhd_brr').val(),
      map         :$('#dactindakanhd_bmap').val(),
      tmp         :$('#dactindakanhd_btmp').val(),
      vp          :$('#dactindakanhd_bvp').val(),
      ap          :$('#dactindakanhd_bap').val(),
      nyeri       :$('#dactindakanhd_bnyeri').val(),
      gcs         :$('#dactindakanhd_bgcs').val(),
      targetufg   :$('#dactindakanhd_targetufg').val(),
      bnacl       :$('#dactindakanhd_bnacl').val(),
      bdektros    :$('#dactindakanhd_bdektros').val(),
      bmakanminum :$('#dactindakanhd_bmakanminum').val(),
      bket        :$('#dactindakanhd_bket').val(),
      bketisi     :$('#dactindakanhd_bketisi').val(),
      bvolume     :$('#dactindakanhd_bvolume').val(),
      bket1       :$('#dactindakanhd_bket1').val(),
      ufg         :$('#dactindakanhd_ufg').val(),
      ktv         :$('#dactindakanhd_ktv').val(),
      clear       :$('#dactindakanhd_clear').val(),
      ttd         :$('#HasilTtdMonitorHD1').val()
    };

    apiPOST('Rekammedisirja/savemonitoringhd',param,hasil=>{
      $('#Modalmonitoringhd').modal('hide');

    })
  }
  function daftarMonitoringHD(){
    document.getElementById('bodyhistoriMonitoringHD').innerHTML="";
    var param = {
      id_transaksi:$('#idTransaksiErmKeperawatanIrja').val(),
    };
    apiPOST('Rekammedisirja/daftarMonitoringHD', param, hasil => {
      var v='';
      var a = hasil['monitorhd'];
      var no=1;
      for (var i = 0; i < a.length; i++) {
        v+='<tr>';
        v+='<td>  #  </td>'; 
        v+='<td>' + a[i]['tgl_masuk'] + '</td>';        
        v+='<td>' + a[i]['observasi'] + '</td>';
        v+='<td>' + a[i]['qblood'] + '</td>';
        v+='<td>' + a[i]['ufr'] + '</td>';
        v+='<td>' + a[i]['tensi'] +'/'+a[i]['tensi1']+'</td>';
        v+='<td>' + a[i]['hr'] + '</td>';
        v+='<td>' + a[i]['suhu'] + '</td>';
        v+='<td>' + a[i]['rr'] + '</td>';
        v+='<td>' + a[i]['map'] + '</td>';
        v+='<td>' + a[i]['tmp'] + '</td>';
        v+='<td>' + a[i]['vp'] + '</td>';
        v+='<td>' + a[i]['ap'] + '</td>';
        v+='<td>' + a[i]['nyeri'] + '</td>';
        v+='<td>' + a[i]['gcs'] + '</td>';
        v+='<td>' + a[i]['targerufg'] + '</td>';
        v+='<td>' + a[i]['nacl'] + '</td>';
        v+='<td>' + a[i]['dektros'] + '</td>';
        v+='<td>' + a[i]['mamin'] + '</td>';
        v+='<td>' + a[i]['lain'] + '</td>';
        v+='<td>' + a[i]['jmlcc'] + '</td>';
        v+='<td>' + a[i]['uf_vol'] + '</td>';
        v+='<td>' + a[i]['ket'] + '</td>';
        v+='<td>' + a[i]['nama_pegawai'] + '</td>';
        v+='</tr>';


      }

      document.getElementById('bodyhistoriMonitoringHD').innerHTML=v;
    })
  }

</script>