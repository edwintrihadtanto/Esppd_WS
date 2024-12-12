<?php 
date_default_timezone_set("Asia/Jakarta");
$nowday       = date('Y-m-d'); 
?>
<div class="col-md-12 p-2" id="eresepRWJ_listpasien1">
  <div class="card card-outline card-default mb-0">
    
    <div class="card-body p-2 darkgrey-custom">
      <div class="row row-custom">
        <div class="col-sm-auto">
          <div class="form-group">
            <label for="eresepRWJ_noorder">No. Order Resep :</label>
            <input type="search" class="form-control form-control-xs" placeholder="Entry No. Order" id="eresepRWJ_noorder" name="eresepRWJ_noorder" onchange="eresepRWJ_showdataOrderResep()">
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label for="eresepRWJ_criby_norm">Cari No. RM / Nama Pasien :</label>
            <div class="input-group input-group-sm mb-3">
              <div class="input-group-prepend">                
                <button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="height:25px;"></button>
                <ul class="dropdown-menu">
                  <li class="dropdown-item" onclick="show_cri_normResepRWJ()">No. RekamMedik</li>
                  <li class="dropdown-item" onclick="show_cri_nmpasienResepRWJ()">Nama Pasien</li>
                </ul>
              </div>
              <!-- /btn-group -->
              <input type="search" class="form-control form-control-xs" placeholder="Entry No. RM" id="eresepRWJ_criby_norm" name="eresepRWJ_criby_norm" onchange="eresepRWJ_showdataOrderResep()">
              <input type="search" class="form-control form-control-xs" placeholder="Entry Nama Pasien" id="eresepRWJ_criby_nmapasien" name="eresepRWJ_criby_nmapasien" onchange="eresepRWJ_showdataOrderResep()">
            </div>
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label for="eresepRWJ_tglawal">Tgl. Order :</label>
            <input type="date" class="form-control form-control-xs" id="eresepRWJ_tglawal" name="eresepRWJ_tglawal" onkeypress="eresepRWJ_showdataOrderResep()">
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label for="eresepRWJ_tglakhir">s/d</label>
            <input type="date" class="form-control form-control-xs" id="eresepRWJ_tglakhir" name="eresepRWJ_tglakhir" onkeypress="eresepRWJ_showdataOrderResep()">
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label for="eresepRWJ_stsorder">Status Order :</label>
            <select class="form-control form-control-xs" id="eresepRWJ_stsorder" name="eresepRWJ_stsorder" onchange="eresepRWJ_showdataOrderResep()">
              <option value="0">Belum Dilayani</option>
              <option value="1">Dilayani</option>
            </select>
          </div>
        </div>        
        <div class="col-sm-auto">
          <div class="form-group">
            <label for="eresepRWJ_unitPoli">Poliklinik :</label>
            <select class="form-control form-control-xs" id="eresepRWJ_unitPoli" name="eresepRWJ_unitPoli" onchange="eresepRWJ_showdataOrderResep()"></select>
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label for="eresepRWJ_jmlorder">Jumlh Order :</label>
            <select class="form-control form-control-xs" id="eresepRWJ_jmlorder" name="eresepRWJ_jmlorder" onchange="eresepRWJ_showdataOrderResep()">
              <option value="10">10 Order</option>
              <option value="20">20 Order</option>
              <option value="30">30 Order</option>
              <option value="40">40 Order</option> 
              <option value="50">50 Order</option>
              <option value="0">- Semua Order -</option>
            </select>
          </div>
        </div>      
      </div>
    </div>

  </div>   
</div>

<div class="col-md-12 p-2" id="eresepRWJ_listpasien2">
  <div class="card card-outline">
    <div class="overlay-wrapper" id="eresepRWJ_loadingawal">
      <div class="overlay">
        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
      </div>
    </div>
    
    <div class="card-body p-0" style="height: 67vh; max-height: 67vh; overflow: auto;">
      <div class="card" style="box-shadow: 0 0 3px #343a40; margin-bottom: 0;">
        <div>
          <div class="card-header p-1">
            <div class="row">
              <div class="col-md-12">
                <h6 id="title" class="hr6-custom"></h6>
              </div>
            </div>
            <!-- END LETAK BUTTON -->            
          </div>
        </div>
      </div>

      <table id="eresepRWJ_daftarorder" class="table table-striped table-sm choose">
        <thead>
          <tr>
            <th class="pl-0" width="10" style="text-align:center;">No.</th>          
            <th width="80"></th>
            <th width="80">No.Transaksi</th>
            <th width="90">Tgl.Order</th>
            <th width="80">No.Order</th>
            <th width="90">No. RM</th>
            <th>Nama Pasien</th>
            <!-- <th width="100">Penjamin</th> -->
            <th width="150">Poliklinik</th>
            <!-- <th width="200">SEP</th> -->
            <th width="290">Dokter</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>      
    </div>

  </div>  
</div>

<!-- <div class="eresepRWJAPT_content"></div>
<div class="eresepRWJAPT_contentobat"></div> -->
<div class="listeresepRjRIIGD_content"></div>
<div class="listeresepRjRIIGD_contentobat"></div>

<script type="text/javascript">  
var nowday = "<?php echo $nowday ?>";
var url;
if (user['id_far'] == '4001'){
  url = "eresepRWJAPT";
  document.getElementById('title').innerHTML = '<i class="fas fa-heartbeat"></i> Daftar Order E-Resep Rawat Jalan';  
}else if (user['id_far'] == '4002'){
  url = "eresepRWIAPT";
  document.getElementById('title').innerHTML = '<i class="fas fa-heartbeat"></i> Daftar Order E-Resep Rawat Inap';  
}else if (user['id_far'] == '4003'){
  url = "eresepIGDAPT";
  document.getElementById('title').innerHTML = '<i class="fas fa-heartbeat"></i> Daftar Order E-Resep Gawat Darurat';  
}else{
  toastr.error("Cek Modul Farmasi!!");
  url = "null";
  document.getElementById('title').innerHTML = '<i class="fas fa-heartbeat"></i> Daftar Order E-Resep';
}

document.getElementById('eresepRWJ_tglawal').value          = nowday;
document.getElementById('eresepRWJ_tglakhir').value         = nowday;
document.getElementById('eresepRWJ_criby_norm').hidden      = false;
document.getElementById('eresepRWJ_criby_nmapasien').hidden = true;

var eresepRWJTglAwal = "eresepRWJ_tglawal";
var eresepRWJTglAkhr = "eresepRWJ_tglakhir";
max_date(eresepRWJTglAwal);
max_date(eresepRWJTglAkhr);

eresepRWJ_unit();
eresepRWJ_showdataOrderResep();

function eresepRWJ_unit() {
  var param = {
    idfar : user['id_far']
  }
  apiPOST('Apotek/getUnitOrderResep', param, hasil => {
    var data = hasil['data'];
    var unit = '';
      unit += '<option value="0">- Semua Poli -</option>';
    for (var i = 0; i < data.length; i++) {
      unit += '<option value="'+ data[i]['id_unit'] +'">'+ data[i]['nama_unit'].toUpperCase()+'</option>';
    }
    document.getElementById('eresepRWJ_unitPoli').innerHTML = unit;
  });
}

function show_cri_normResepRWJ(){
  document.getElementById('eresepRWJ_criby_norm').hidden      = false;
  document.getElementById('eresepRWJ_criby_nmapasien').hidden = true;
  $("#eresepRWJ_criby_norm").trigger('focus');
}

function show_cri_nmpasienResepRWJ(){
  document.getElementById('eresepRWJ_criby_norm').hidden      = true;
  document.getElementById('eresepRWJ_criby_nmapasien').hidden = false;
  $("#eresepRWJ_criby_nmapasien").trigger('focus');
}

function eresepRWJ_showdataOrderResep(){
  $('#eresepRWJ_loadingawal').show();
  var listParam = [
    'eresepRWJ_criby_norm', 'eresepRWJ_criby_nmapasien'
  ];

  var param = {
    noorder   : document.getElementById('eresepRWJ_noorder').value,
    norm      : document.getElementById('eresepRWJ_criby_norm').value,
    nmpasien  : document.getElementById('eresepRWJ_criby_nmapasien').value,
    tglorder1 : document.getElementById('eresepRWJ_tglawal').value,
    tglorder2 : document.getElementById('eresepRWJ_tglakhir').value,
    stsorder  : document.getElementById('eresepRWJ_stsorder').value,
    poli      : document.getElementById('eresepRWJ_unitPoli').value,
    jmlh      : document.getElementById('eresepRWJ_jmlorder').value,
    idfar     : user['id_far']
  };

  apiPOST("Apotek/eresepRjRiIGD_listorder", param, hasil => {   
    $('#eresepRWJ_loadingawal').hide();
    $('#eresepRWJ_daftarorder tbody').html('');

    if (hasil['data'] !== null) {
      if (hasil['code'] == 'XX') {
        toastr.error("Data tidak ditemukan");
        var Baris = '<tr>';  
        //for (var i = 0; i < 19; i++) {
          Baris += '<td colspan="9" align="center"><h6>Belum Ada Order Resep<h6></td>';
          Baris += "</tr>";
        //}

        $('#eresepRWJ_daftarorder tbody').append(Baris);
        document.getElementById('eresepRWJ_criby_norm').value     = '';
        document.getElementById('eresepRWJ_criby_nmapasien').value = '';
      
      }else{

        var Baris = "";
        var a = hasil['data'];
        var b = hasil['penjamin'];
        for (var i = 0; i < a.length; i++) {
          var id_trans  = a[i].id_transaksi;
          var id_kunj   = a[i].id_kunjungan;
          var tglkunj   = a[i].tgl_masuk;
          var id_order  = a[i].id_order;
          var id_unit   = a[i].id_unit;
          var unit      = a[i].nama_unit;
          var id_dokter = a[i].id_pegawai;
          var dokter    = a[i].nama_pegawai;
          var diag      = a[i].cat_diagnosa.replace(/ /g, '%20');
          var iter      = a[i].cat_iter;
          var order_mng = a[i].order_mng;
          var tglorder  = a[i].tglorder;
          var no_rm     = a[i].no_rm;
          var nm_pasien = a[i].nama.replace(/'/g, '');
          var telepon   = a[i].telepon;
          var tgllahir  = a[i].tgl_lahir;
          var dilayani  = a[i].dilayani;
          var dilayaniFar  = a[i].dilayanifar;
          var tgl_tutup = a[i].tgl_tutup;
          var no = i + 1;
          
          Baris += '<tr onclick="vOrderResepDokter('+"'"+id_kunj+"','"+id_order+"','"+id_unit+"','"+unit+"','"+id_dokter+"','"+diag+"','"+iter+"','"+order_mng+"','"+tglorder+"','"+no_rm+"','"+nm_pasien+"','"+tglkunj+"','"+tgllahir+"','"+telepon+"','"+dokter+"','"+id_trans+"','"+tgl_tutup+"'"+')">';
          Baris += '<td>'+no+'</td>';
          Baris += '<td style="display: flex;">';
          if (dilayani == 1){
            Baris += '&nbsp;<div class="col-sm-1" style="display:contents;"><img src="<?= base_url('_assets/dist/img/checklist.png') ?>" width="20px" height="20px" title="Sudah Dilayani"/></div>';
          }else{
            Baris += '&nbsp;<div class="col-sm-1" style="display:contents;"><img src="<?= base_url('_assets/dist/img/cancel.png') ?>" width="20px" height="20px" title="Belum Dilayani"/></div>';
          }
          if (dilayaniFar == 1){
            Baris += '&nbsp;<div class="col-sm-1" style="display:contents;"><img src="<?= base_url('_assets/dist/img/checklist.png') ?>" width="20px" height="20px" title="Sudah Transfer"/></div>';
          }else{
            Baris += '&nbsp;<div class="col-sm-1" style="display:contents;"><img src="<?= base_url('_assets/dist/img/cancel.png') ?>" width="20px" height="20px" title="Belum Transfer"/></div>';
          }
          Baris += '</td>';
          Baris += '<td>'+id_trans+'</td>';
          Baris += '<td>'+tglorder+'</td>';
          Baris += '<td>'+id_order+'</td>';
          Baris += '<td>'+no_rm+'</td>';
          Baris += '<td>'+nm_pasien.toUpperCase()+'</td>';
          // Baris += '<td>'+penjamin.toUpperCase()+'</td>';
          Baris += '<td>'+unit.toUpperCase()+'</td>';
          // if (id_penjamin != '1'){
          //   Baris += '<td>'+no_sjp+'</td>';
          // }else{
          //   Baris += '<td>-</td>';
          // }
          Baris += '<td>'+dokter.toUpperCase()+'</td>';
          Baris += "</tr>";
        }
        $('#eresepRWJ_daftarorder tbody').append(Baris);
      }       
    }

  });  

}

function vOrderResepDokter(id_kunj, id_order, id_unit, unit, id_dokter, diag, iter, order_mng, tglorder, no_rm, nm_pasien, tglkunj, tgllahir, telepon, dokter, id_trans, tgl_tutup){
  
  var json_data = {
    'veresepRWJ_APT_id_transaksi' : id_trans,
    'veresepRWJ_APT_id_order'     : id_order,
    'veresepRWJ_APT_id_kunj'      : id_kunj,
    'veresepRWJ_APT_tgl_kunj'     : tglkunj,
    'veresepRWJ_APT_tgl_ord'      : tglorder,
    'veresepRWJ_APT_no_rm'        : no_rm,
    'veresepRWJ_APT_nama'         : nm_pasien.replace(/ /g, '%20'),
    'veresepRWJ_APT_umur'         : tgllahir,
    // 'veresepRWJ_APT_penjamin' : penjamin.replace(/ /g, '%20'),        
    // 'veresepRWJ_APT_sep'      : no_sjp,
    'veresepRWJ_APT_telp'         : telepon.replace(/ /g, '%20'),
    'veresepRWJ_APT_idunit'       : id_unit,
    'veresepRWJ_APT_unit'         : unit.replace(/ /g, '%20'),
    'veresepRWJ_APT_iddokter'     : id_dokter,
    'veresepRWJ_APT_dokter'       : dokter.replace(/ /g, '%20'),
  };

  var data = JSON.stringify(json_data);
 //if (tgl_tutup == 'null'){
    $('#eresepRWJ_listpasien1').hide();
    $('#eresepRWJ_listpasien2').hide();
    $('.listeresepRjRIIGD_content').load('Apotek/'+url+'?data='+ data);
  // }else{
  //   sukses("Transaksi Sudah Di Tutup !!\nHub. Kasir", '');
  // }
  
}
</script>