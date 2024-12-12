<?php
  $data = json_decode($_GET['data']);
  $nowday       = str_replace('"','', json_encode($data->nowday));
  $tglkunj      = str_replace('"','', json_encode($data->tgl_kunj));
  //$tglkunj      = date_format(date_create($tglkunjungan), 'd-M-Y'); //FORMAT TGL 02-Feb-2023
  $norm         = str_replace('"','', json_encode($data->no_rm));
  $nmapasien    = str_replace('"','', json_encode($data->nama));
  $alamat       = str_replace('"','', json_encode($data->alamat));
  $umur         = str_replace('"','', json_encode($data->umur));
  $penjamin     = str_replace('"','', json_encode($data->penjamin));
  $sep          = str_replace('"','', json_encode($data->sep));
  $telp         = str_replace('"','', json_encode($data->telp));
  $unit         = str_replace('"','', json_encode($data->unit));  
  
?>
<section class="content pb-0" id="eresepRWJDokter_content">
  <div class="container-fluid h-100">
    <div class="row">
      <div class="col-md-3 col-sm-6 col-12 p-1">
        <div class="info-box mb-0">
          <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="70">Tgl. Resep.</td>
              <td>:</td>
              <td><input type="date" class="form-control form-control-xs" id="eresepRWJdokter_tglresep"></td>
            </tr>
            <tr>
              <td>Tgl. Kunj.</td>
              <td>:</td>
              <td><input type="date" class="form-control form-control-xs" id="eresepRWJdokter_tglkunj" disabled></td>
            </tr>
            <tr>
              <td>No. Order</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="eresepRWJdokter_order" disabled></td>
            </tr> 
            <tr>
              <td>Dokter</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="eresepRWJdokter_dokter" disabled></td>
            </tr>
          </table>
        </div>
      </div>
      
      <div class="col-md-3 col-sm-6 col-12 p-1">
        <div class="info-box mb-0">
          <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="70">No. RM</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="eresepRWJdokter_norm" readonly></td>
            </tr>
            <tr>
              <td>Nama</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="eresepRWJdokter_nmpasien" disabled></td>
            </tr>
            <tr>
              <td>Umur</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="eresepRWJdokter_umur" disabled></td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="eresepRWJdokter_alamat" disabled></td>
            </tr>
          </table>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-12 p-1">
        <div class="info-box mb-0">
          <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="70">Penjamin</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="eresepRWJdokter_penjamin" disabled></td>
            </tr>
            <tr>
              <td>SEP</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="eresepRWJdokter_nosep" disabled></td>
            </tr>
            <tr>
              <td>Telp</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="eresepRWJdokter_telp" disabled></td>
            </tr>
            <tr>
              <td>Unit</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="eresepRWJdokter_unit" disabled></td>
            </tr>
          </table>
        </div>
      </div>

    </div>        
    <div class="card card-row">
      <div class="card-header p-1 darkgrey-custom">
        <!-- <h6 class="hr6-custom"><i class="fas fa-heartbeat"></i> Resep Rawat Jalan / Gawat Darurat</h6> -->
        <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="eresepRWJDokter_modaldaftarobat()" id="reseprwj_btn_daftarobat"><i class="fa fa-plus"></i> Tambah Obat</button>
        <button type="button" class="btn bg-gradient-secondary btn-xs" ><i class="fa fa-save"></i> Simpan</button>
        <button type="button" class="btn bg-gradient-secondary btn-xs"><i class="fa fa-arrow-right"></i> Kirim ke Unit Farmasi</button>
        <button type="button" class="btn btn-outline-danger btn-xs" onclick="resepRWJDokter_kembalikeawal()">
          <i class="fa fa-arrow-left"></i> Kembali</button>

        <input type="text" class="form-control form-control-xs" id="reseprwj_penentu_resepobat" value="0" disabled style="width:50px; display:none;">

      </div>
      <div class="modal-body p-1">
        
        <div class="row" id="resep_rwj_inputan_obat_jadi">
          <div class="input-group col-sm-2">
            <div class="input-group-prepend">
              <span class="input-group-text form-control-xs">Nama</span>
            </div>
            <input type="text" class="form-control form-control-xs" id="eresepRWJdokter_obatjadi_kdprd" hidden>
            <input type="text" class="form-control form-control-xs" placeholder="Nama Obat" id="eresepRWJdokter_obatjadi_nm" disabled>
          </div>
          <div class="col-sm-2">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text form-control-xs">Banyak</span>
              </div>              
              <input type="number" class="form-control form-control-xs" id="eresepRWJdokter_obatjadi_qty">
            </div>
          </div>
          <div class="col-sm-2">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text form-control-xs">Exp</span>
              </div>
              <input type="date" class="form-control form-control-xs" id="eresepRWJdokter_obatjadi_exp">
            </div>
          </div>
          <div class="col-sm-2">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text form-control-xs">Bud</span>
              </div>
              <input type="date" class="form-control form-control-xs" id="eresepRWJdokter_obatjadi_bud">
            </div>
          </div>
          <div class="input-group col-sm-2">
            <div class="input-group-prepend">
              <span class="input-group-text form-control-xs">Signa</span>
            </div>
            <input type="text" class="form-control form-control-xs" id="eresepRWJdokter_obatjadi_signa">
          </div>
          <div class="input-group col-sm-2">
            <div class="input-group-prepend">
              <span class="input-group-text form-control-xs">Ket.</span>
            </div>
            <input type="text" class="form-control form-control-xs" id="eresepRWJdokter_obatjadi_ket">
            <div class="input-group-prepend">
              <button type="button" class="btn btn-primary btn-xs" id="resep_rwj_btn_check_obatjadi"><i class="fa fa-check"></i></button>
            </div>
          </div>
        </div> 

        <div id="resep_rwj_inputan_obat_racik">
          <div class="row" id="resep_rwj_inputan_obat_racik1">
            <div class="input-group col-sm-2">
              <div class="input-group-prepend">
                <span class="input-group-text form-control-xs">Racikan</span>
              </div>
              <input type="text" class="form-control form-control-xs" placeholder="Nama Racikan" id="resep_rwj_nmaracikan">
            </div>
            <div class="input-group col-sm-2">
              <div class="input-group-prepend">
                <span class="input-group-text form-control-xs">Banyak</span>
              </div>
              <input type="number" class="form-control form-control-xs" id="resep_rwj_bnykracikan">
            </div>
            <div class="input-group col-sm-2">
              <div class="input-group-prepend">
                <span class="input-group-text form-control-xs">Exp</span>
              </div>
              <input type="date" class="form-control form-control-xs" id="resep_rwj_expracikan">
            </div>
            <div class="input-group col-sm-2">
              <div class="input-group-prepend">
                <span class="input-group-text form-control-xs">Bud</span>
              </div>
              <input type="date" class="form-control form-control-xs" id="resep_rwj_budracikan">
            </div>
            <div class="input-group col-sm-2">
              <div class="input-group-prepend">
                <span class="input-group-text form-control-xs">Signa</span>
              </div>
              <input type="text" class="form-control form-control-xs" id="resep_rwj_signaracikan">
            </div>
            <div class="input-group col-sm-2">
              <div class="input-group-prepend">
                <span class="input-group-text form-control-xs">Ket.</span>
              </div>
              <input type="text" class="form-control form-control-xs" id="resep_rwj_ketracikan">
            </div>
          </div>

          <div class="row" id="resep_rwj_inputan_obat_racik2">
            <div class="col-sm-auto">
              <button type="button" class="btn btn-danger btn-xs" id="resep_rwj_infojenis_racikan"></button>
            </div>
            <div class="input-group col-sm-2">
              <div class="input-group-prepend">
                <span class="input-group-text form-control-xs">Nama</span>
              </div>
              <input type="text" class="form-control form-control-xs" placeholder="Nama Obat">
            </div>
            <div class="col-sm-2">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text form-control-xs">Dosis</span>
                </div>
                <input type="number" class="form-control form-control-xs">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text form-control-xs">Banyak</span>
                </div>
                <input type="number" class="form-control form-control-xs">
              </div>
            </div>
            <div class="input-group col-sm-2">
              <div class="input-group-prepend">
                <span class="input-group-text form-control-xs">Ket.</span>
              </div>
              <input type="text" class="form-control form-control-xs">
            </div>
            <div class="col-sm-auto">
              <button type="button" class="btn btn-primary btn-xs" id="resep_rwj_btn_check_obatracik" onclick=""><i class="fa fa-check"></i></button>
            </div>
          </div>

        </div> 
        
        <div class="card-body p-0">
          <ul class="nav nav-tabs" id="rwj_resep_custom-content-above-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="pill" href="#rwj_resep_obatjadi" role="tab" aria-selected="true" onclick="tabrwj_resep_obatjadi();">Obat Jadi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="pill" href="#rwj_resep_obatracik" role="tab" aria-selected="true" onclick="tabrwj_resep_obatracik();">Obat Racik</a>
            </li>
          </ul>

          <div class="tab-content" id="rwj_resep_custom-content-above-tabContent">
            <div class="tab-pane p-0 fade active show" id="rwj_resep_obatjadi" role="tabpanel">
              <div class="col-sm-12 p-1" style="max-height: 237px; overflow: auto;">
                <table border="0" cellpadding="0" cellspacing="0" id="resepRWJ_table_obatjadi" class="table table-striped table-sm choose">
                  <thead>
                    <tr>
                      <th width="10">#</th>
                      <th width="70">Act</th>
                      <th width="100">ID</th>
                      <th>Nama Obat</th>
                      <th width="50">Qty</th>
                      <th width="250">Signa</th>
                      <th width="250">Catatan</th>
                      <!-- <th width="100">Hrga</th>
                      <th width="100">Jumlah</th> -->
                      <th width="70">Satuan</th>                      
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table> 
              </div>
            </div>
            <div class="tab-pane p-0 fade" id="rwj_resep_obatracik" role="tabpanel">
              <div class="row">
                <div class="col-sm-4 p-1" style="max-height: 237px; overflow: auto;">
                  <table border="2" cellpadding="0" cellspacing="0" id="resepRWJ_table_obatracik_jenisracikan" class="table table-striped table-sm choose">
                  <thead>
                    <tr>
                      <th width="10">#</th>
                      <th width="50">Act</th>
                      <th width="50">ID</th>
                      <th>Racikan</th>
                      <th width="50">Banyak</th>
                      <th width="100">Exp</th>
                      <th width="100">Bud</th>
                      <th width="100">Signa</th>
                      <th width="100">Keterangan</th>
                    </tr>
                  </thead>
                  <tbody></tbody>
                  </table>
                </div>
                <div class="col-sm-8 p-1" style="max-height: 237px; overflow: auto;">
                  <table border="2" cellpadding="0" cellspacing="0" id="resepRWJ_table_obatracik" class="table table-striped table-sm choose">
                  <thead>
                    <tr>
                      <th width="10">#</th>
                      <th width="50">Act</th>
                      <th width="50">ID</th>
                      <th>Nama Obat</th>
                      <th width="100">Dosis</th>
                      <th width="50">Qty</th>
                      <th width="100">Hrga</th>
                      <th width="100">Jumlah</th>
                      <th width="100">Keterangan</th>
                      <th width="70">Satuan</th>                      
                    </tr>
                  </thead>
                  <tbody></tbody>
                  </table> 
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</section>

<script type="text/javascript">
//$('#eresepRWJDokter_content').show();  
var nowday    = "<?php echo $nowday; ?>";
var tglkunj   = "<?php echo $tglkunj; ?>";
var norm      = "<?php echo $norm; ?>";
var nmapasien = "<?php echo $nmapasien; ?>";
var alamat    = "<?php echo $alamat; ?>";
var umur      = "<?php echo $umur; ?>";
var penjamin  = "<?php echo $penjamin; ?>";
var sep       = "<?php echo $sep; ?>";
var telp      = "<?php echo $telp; ?>";
var unit      = "<?php echo $unit; ?>";

document.getElementById('eresepRWJdokter_tglresep').value = nowday;
document.getElementById('eresepRWJdokter_tglkunj').value  = tglkunj;
document.getElementById('eresepRWJdokter_norm').value     = norm;
document.getElementById('eresepRWJdokter_nmpasien').value = nmapasien;
document.getElementById('eresepRWJdokter_alamat').value   = alamat;
document.getElementById('eresepRWJdokter_umur').value     = umur; 
document.getElementById('eresepRWJdokter_penjamin').value = penjamin; 
document.getElementById('eresepRWJdokter_nosep').value    = sep; 
document.getElementById('eresepRWJdokter_telp').value     = telp; 
document.getElementById('eresepRWJdokter_unit').value     = unit; 


//tampilkan_isi_obatjdi();
tampilkan_isi_obatracik();
tabrwj_resep_obatjadi();
batas_max_tgl();

function batas_max_tgl(){
  var date           = new Date();
  var day            = date.getDate();
  var month          = date.getMonth() + 1;
  var year           = date.getFullYear();
  if(day < 10){
    day  = '0' + day;
  }
  if(month < 10){
    month = '0' + month;
  }
  var minDate = year +'-'+month+'-'+day;
  document.getElementById('eresepRWJdokter_tglresep').setAttribute("max", minDate);
}
function eresepRWJDokter_modaldaftarobat(){
  var json_data = {
    'eresepRWJ': 'eresepRWJDokter', 
  };

  var myJSON = JSON.stringify(json_data);
  $('.eresepRWJDokter_contentobat').load('Apotek/obatresepRWJ?data='+myJSON);
}

function eresepRWJDokter(kd_prd, nama_obat, kd_satuan){
  document.getElementById("eresepRWJdokter_obatjadi_kdprd").value = kd_prd;
  document.getElementById("eresepRWJdokter_obatjadi_nm").value    = nama_obat;
  document.getElementById("eresepRWJdokter_obatjadi_qty").value   = 0;
  document.getElementById("eresepRWJdokter_obatjadi_exp").value   = nowday;
  document.getElementById("eresepRWJdokter_obatjadi_bud").value   = nowday;
  document.getElementById("eresepRWJdokter_obatjadi_signa").value = 'signa';
  document.getElementById("eresepRWJdokter_obatjadi_ket").value   = kd_satuan;
  $('#eresepRWJdokter_obatjadi_qty').trigger('focus');
  $('#modal_RWJresep_daftarobat').modal('toggle');

  $('#eresepRWJdokter_obatjadi_qty').keydown(function( event ) {
    switch(event.which){
      case 13:
      $('#eresepRWJdokter_obatjadi_exp').trigger('focus');
      break;
    }
  });

  $('#eresepRWJdokter_obatjadi_exp').keydown(function( event ) {
    switch(event.which){
      case 13:
      $('#eresepRWJdokter_obatjadi_bud').trigger('focus');
      break;
    }
  });

  $('#eresepRWJdokter_obatjadi_bud').keydown(function( event ) {
    switch(event.which){
      case 13:
      $('#eresepRWJdokter_obatjadi_signa').trigger('focus');
      break;
    }
  });

  $('#eresepRWJdokter_obatjadi_signa').keydown(function( event ) {
    switch(event.which){
      case 13:
      $('#eresepRWJdokter_obatjadi_ket').trigger('focus');
      break;
    }
  });

  $("#eresepRWJdokter_obatjadi_ket").keydown(function( event ) {
    // document.body.onkeydown = function(event){  
    //   event.stopPropagation();
    // }

    switch(event.which){
      case 13:
        var kd_prd  = document.getElementById("eresepRWJdokter_obatjadi_kdprd").value;
        var nm_obat = document.getElementById("eresepRWJdokter_obatjadi_nm").value;
        var qty     = document.getElementById("eresepRWJdokter_obatjadi_qty").value;
        var exp     = document.getElementById("eresepRWJdokter_obatjadi_exp").value;
        var bud     = document.getElementById("eresepRWJdokter_obatjadi_bud").value;
        var signa   = document.getElementById("eresepRWJdokter_obatjadi_signa").value;
        var ket     = document.getElementById("eresepRWJdokter_obatjadi_ket").value;
        tampilkan_isi_obatjdi(kd_prd, nm_obat, qty, exp, bud, signa, ket, kd_satuan);
      break;
    }
  });

  $("#resep_rwj_btn_check_obatjadi").click(function( event ) {
    var kd_prd  = document.getElementById("eresepRWJdokter_obatjadi_kdprd").value;
    var nm_obat = document.getElementById("eresepRWJdokter_obatjadi_nm").value;
    var qty     = document.getElementById("eresepRWJdokter_obatjadi_qty").value;
    var exp     = document.getElementById("eresepRWJdokter_obatjadi_exp").value;
    var bud     = document.getElementById("eresepRWJdokter_obatjadi_bud").value;
    var signa   = document.getElementById("eresepRWJdokter_obatjadi_signa").value;
    var ket     = document.getElementById("eresepRWJdokter_obatjadi_ket").value;
    tampilkan_isi_obatjdi(kd_prd, nm_obat, qty, exp, bud, signa, ket, kd_satuan);
  });

}

function tampilkan_isi_obatjdi(kd_prd, nm_obat, qty, exp, bud, signa, ket, kd_satuan){
  //$('#resepRWJ_table_obatjadi tbody').html('');
  var nomor = $('#resepRWJ_table_obatjadi tbody tr').length + 1;  
  var Baris = '';
      Baris += '<tr>';
      Baris += '<td>'+nomor+'</td>';
      Baris += '<td onclick=""><button type="button" class="btn btn-xs btn-outline-info"><i class="fa fa-edit"></i></button>&nbsp;&nbsp;<button type="button" class="btn btn-xs btn-outline-danger"><i class="fa fa-trash"></i></button></td>';
      Baris += '<td>'+kd_prd+'</td>';
      Baris += '<td>'+nm_obat+'</td>';
      Baris += '<td>'+qty+'</td>';
      Baris += '<td>'+signa+'</td>';
      Baris += '<td>'+ket+'</td>';
      Baris += '<td>'+kd_satuan+'</td>';
      Baris += "</tr>";
  
  $('#resepRWJ_table_obatjadi tbody').append(Baris);

  /*var resepRWJ_listentryobat;
  if ($.fn.dataTable.isDataTable( '#resepRWJ_table_obatjadi' ) ) {
    resepRWJ_listentryobat = $('#resepRWJ_table_obatjadi').DataTable();
  }else{
    resepRWJ_listentryobat = $('#resepRWJ_table_obatjadi').DataTable({         
        responsive: true,
        retrieve  : true,
        autoWidth : false,
        processing: true, //Feature control the processing indicator.
        serverSide: true, //Feature control DataTables' server-side processing mode.
        order     : [],   //Initial no order.
        ajax      : {
          url: apiPOST('Apotek/readGridObatRWJ', null, hasil => {

              }),
          //type: "POST"
        },
        columnDefs: [
          {
            targets: [ 0 ], //last column
            orderable: false, //set not orderable
          },
        ],

    });
  }*/

}

function tampilkan_isi_obatracik(){
  var Baris = '<tr>';
  for (var i = 0; i < 10; i++) {
    var no = i+1;
        Baris += '<td>'+no+'</td>';
        Baris += '<td onclick=""><button type="button" class="btn btn-xs"><i class="fa fa-edit"></i></button><button type="button" class="btn btn-xs"><i class="fa fa-trash"></i></button></td>';
        Baris += '<td>0000'+no+'</td>';
        Baris += '<td>Paracetamol '+no+'00 Mg</td>';
        Baris += '<td>'+no+'</td>';
        Baris += '<td>'+(no+1)+' X SEHARI</td>';
        Baris += '<td></td>';
        Baris += '<td>Rp. '+(9000+(no+5))+'</td>';
        Baris += '<td>Rp. '+(no*(9000+(no+5)))+'</td>';
        Baris += '<td>TABLET</td>';
      Baris += "</tr>";
  }
  $('#resepRWJ_table_obatracik tbody').append(Baris);
}

function tabrwj_resep_obatjadi(){
  $('#resep_rwj_inputan_obat_jadi').show();
  $('#resep_rwj_inputan_obat_racik').hide();
  $('#resep_rwj_inputan_obat_racik1').hide(); 
  $('#resep_rwj_inputan_obat_racik2').hide(); 
  $('#reseprwj_penentu_resepobat').val(0); 
  document.getElementById("reseprwj_btn_daftarobat").disabled = false;
}

function tabrwj_resep_obatracik(){
  $('#resep_rwj_inputan_obat_jadi').hide();
  $('#resep_rwj_inputan_obat_racik').show(); 
  $('#resep_rwj_inputan_obat_racik1').show(); 
  $('#resep_rwj_inputan_obat_racik2').hide(); 
  $('#reseprwj_penentu_resepobat').val(1); 
  
  document.getElementById("reseprwj_btn_daftarobat").disabled = true;
}

$("#resep_rwj_nmaracikan").keydown(function( event ) {
  // document.body.onkeydown = function(event){  
  //   event.stopPropagation();
  // }

  switch(event.which){
    case 13:          
      $('#resep_rwj_inputan_obat_racik1').hide(); 
      $('#resep_rwj_inputan_obat_racik2').show();
      document.getElementById("reseprwj_btn_daftarobat").disabled = false;
      tampilkan_isi_obatracik_jenisracikan();    
    break;
  }
}); 

function tampilkan_isi_obatracik_jenisracikan(){  
  var nma_racikan = $('#resep_rwj_nmaracikan').val();
  var byk_racikan = $('#resep_rwj_bnykracikan').val();
  var exp_racikan = $('#resep_rwj_expracikan').val();
  var bud_racikan = $('#resep_rwj_budracikan').val();
  var sig_racikan = $('#resep_rwj_signaracikan').val();
  var ket_racikan = $('#resep_rwj_ketracikan').val();

 var Nomor = $('#resepRWJ_table_obatracik_jenisracikan tbody tr').length + 1;
 var Baris = "<tr>";
     Baris += "<td>"+Nomor+"</td>";
     Baris += "<td onclick=''><button type='button' class='btn btn-xs'><i class='fa fa-arrow-up'></i></button></td>";
     Baris += "<td>"+Nomor+"</td>";
     Baris += "<td>"+nma_racikan+" "+Nomor+"</td>";
     Baris += "<td>"+byk_racikan+"</td>";
     Baris += "<td>"+exp_racikan+"</td>";
     Baris += "<td>"+bud_racikan+"</td>";
     Baris += "<td>"+sig_racikan+"</td>";
     Baris += "<td>"+ket_racikan+"</td>";     
    Baris += "</tr>";
 
 $('#resepRWJ_table_obatracik_jenisracikan tbody').append(Baris);
 $('#resep_rwj_infojenis_racikan').html('<i class="fa fa-check"></i> '+nma_racikan+' '+Nomor);  
 
 // $('#resepRWJ_table_obatracik_jenisracikan tbody tr').each(function() {
 //   $(this).find('td:nth-child(2) input').focus();
 // });
}

function resepRWJDokter_kembalikeawal(){
  pertanyaan.fire({
    title             : 'Kembali ke menu awal',
    html              : '<span>Data yang sudah dientry akan hilang, tetap kembali ?</span>',
    icon              : 'question',
    showCancelButton  : true,
    reverseButtons    : false,
    allowOutsideClick : false
  }).then((result) => {
    if (result.isConfirmed) {
      $('#eresepRWJDokter_content').hide();
      $('#eresepRWJDokter_listpasien1').show();
      $('#eresepRWJDokter_listpasien2').show();
      
    }else if(result.dismiss === Swal.DismissReason.cancel){
      
    }
  })
}
</script>
