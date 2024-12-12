<?php
date_default_timezone_set("Asia/Jakarta");
$nowday     = date('Y-m-d');
$nextday    = $nowday; 
?>
<div class="col-md-12 p-2" id="returRJIGDFar_pertama">
  <div class="card card-outline card-default" style="margin-bottom:0;">
    
    <div class="card-body p-2 darkgrey-custom">
      <div class="row row-custom">
        <div class="col-sm-auto">
          <div class="form-group">
            <label>No. Retur :</label>
            <input type="text" class="form-control form-control-xs" placeholder="Entry No.Retur" id="returRJIGDFar_noretur" onchange="tampilkan_isi_returRJIGDFar()">
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Cari No. RM / Nama Pasien :</label>
            <div class="input-group input-group-sm mb-3">
              <div class="input-group-prepend">                
                <button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="height:25px;"></button>
                <ul class="dropdown-menu">
                  <li class="dropdown-item" onclick="show_cri_norm_returRJIGDFar()">No. RekamMedik</a></li>
                  <li class="dropdown-item" onclick="show_cri_nmpasien_returRJIGDFar()">Nama Pasien</a></li>
                </ul>
              </div>
              <!-- /btn-group -->
              <input type="text" class="form-control form-control-xs" placeholder="Entry No. RM" id="cri_by_norm_returRJIGDFar" onchange="tampilkan_isi_returRJIGDFar()">
              <input type="text" class="form-control form-control-xs" placeholder="Entry Nama Pasien" id="cri_by_nmpasien_returRJIGDFar" onchange="tampilkan_isi_returRJIGDFar()">
            </div>
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Tgl. Retur :</label>
            <input type="date" class="form-control form-control-xs" id="returRJIGDFar_tglawal" onkeypress="tampilkan_isi_returRJIGDFar()">
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label>s/d</label>
            <input type="date" class="form-control form-control-xs" id="returRJIGDFar_tglakhir" onkeypress="tampilkan_isi_returRJIGDFar()">
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Status Posting :</label>
            <select class="form-control form-control-xs" id="returRJIGDFar_posting" onchange="tampilkan_isi_returRJIGDFar()">
              <option value="-">Tampilkan Semua</option>
              <option value="f">Belum Posting</option>
              <option value="t">Sudah Posting</option>
            </select>
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Jumlah Data :</label>
            <select class="form-control form-control-xs" id="returRJIGDFar_jumlah" onchange="tampilkan_isi_returRJIGDFar()">
              <option value="10">10 Data</option>
              <option value="15">15 Data</option>
              <option value="30">30 Data</option>
              <option value="50">50 Data</option>
              <option value="100">100 Data</option>
            </select>
          </div>
        </div>      
      </div>
    </div>
    <!-- card-outline -->
  </div>   
</div>

<div class="col-md-12 p-2" id="returRJIGDFar_kedua">
  <div class="card card-outline">
    <div class="overlay-wrapper" id="returRJIGDFar_progress">
      <div class="overlay">
        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
      </div>
    </div>  
    <div class="card-body p-1" style="height: 76vh; max-height: 76vh; overflow: auto;">
      <div class="card" style="box-shadow: 0 0 3px #343a40; margin-bottom: 0;">
        <div>
          <div class="card-header p-1">
            <div class="row">
              <div class="col-md-12">
                <h6 class="hr6-custom"><i class="fas fa-heartbeat"></i> Daftar Retur Apotek Gawat Darurat / Rawat Jalan</h6>
                <div>
                  <button type="button" class="btn bg-gradient-warning btn-xs" onclick="VreturresepRJIGD()"> <i class="fas fa-plus"></i> Tambah Retur Resep</button>
                </div>
              </div>
            </div>         
          </div>
        </div>
      </div>

      <table id="returRJIGDFar_datatable" class="table table-striped table-sm choose" style="border-collapse: inherit;">
        <thead>
          <tr>
            <th width="15">#</th>
            <th width="50">Status</th>
            <th width="100">Tgl. Retur</th>
            <th width="100">No. Retur</th>
            <th>No. RM / Nama Pasien</th>
            <th width="150">Poliklinik</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>      
    </div>

  </div>  
</div>

<div class="returRJIGD_content"></div>
<div class="returRJIGD_pasien"></div>

<script type="text/javascript">  
var nowday      = "<?php echo $nowday; ?>";
var nextday     = "<?php echo $nextday; ?>";

document.getElementById('returRJIGDFar_tglawal').value  = nowday;
document.getElementById('returRJIGDFar_tglakhir').value = nextday;
var a = "returRJIGDFar_tglawal";
max_date(a);
var b = "returRJIGDFar_tglakhir";
max_date(b);
tampilkan_isi_returRJIGDFar();
$('#cri_by_norm_returRJIGDFar').show();
$('#cri_by_nmpasien_returRJIGDFar').hide();

function show_cri_norm_returRJIGDFar(){
  $('#cri_by_norm_returRJIGDFar').show();
  $('#cri_by_nmpasien_returRJIGDFar').hide();
}

function show_cri_nmpasien_returRJIGDFar(){
  $('#cri_by_norm_returRJIGDFar').hide();
  $('#cri_by_nmpasien_returRJIGDFar').show();
  $("#cri_by_nmpasien_returRJIGDFar").trigger('focus');
}

function tampilkan_isi_returRJIGDFar(){  
   $('#returRJIGDFar_progress').show();
  var listParam = [
    'cri_by_norm_returRJIGDFar', 'cri_by_nmpasien_returRJIGDFar'
  ];

  var param = {
    noretur   : document.getElementById('returRJIGDFar_noretur').value,
    norm      : document.getElementById('cri_by_norm_returRJIGDFar').value,
    nmpasien  : document.getElementById('cri_by_nmpasien_returRJIGDFar').value,
    tglretur1 : document.getElementById('returRJIGDFar_tglawal').value,
    tglretur2 : document.getElementById('returRJIGDFar_tglakhir').value,
    stsposting: document.getElementById('returRJIGDFar_posting').value,
    jmlh      : document.getElementById('returRJIGDFar_jumlah').value,
    idfar     : user['id_far']
  };

  apiPOST("Apotek/returRJIGD_listapotek", param, hasil => {   
    
    $('#returRJIGDFar_datatable tbody').html('');

    if (hasil['data'] !== null) {
      if (hasil['code'] == 'XX') {

        toastr.error("Data tidak ditemukan");
        var Baris = '<tr>';  
            Baris += '<td colspan="6" align="center"><h6>Belum Ada Retur Resep IGD / RJ<h6></td>';
            Baris += "</tr>";

        $('#returRJIGDFar_datatable tbody').append(Baris);
        document.getElementById('cri_by_norm_returRJIGDFar').value     = '';
        document.getElementById('cri_by_nmpasien_returRJIGDFar').value = '';
        $('#returRJIGDFar_progress').hide();

      }else{
        
        var Baris = "";
        var a = hasil['data'];
        var b = hasil['penjamin'];
        for (var i = 0; i < a.length; i++) {
          var posting     = a[i].posting;
          var no_retur    = a[i].no_retur;
          var tgl_retur   = a[i].tgl_retur;
          var no_rm       = a[i].no_rm;
          var nama        = a[i].nama.replace(/'/g, '');
          var id_unit     = a[i].id_unit;          
          var unit        = a[i].nama_unit;
          var id_trans    = a[i].id_transaksi;
          var tgl_kunj    = a[i].tgl_kunj;
          var tgl_lahir   = a[i].tgl_lahir;
          var no_sjp      = a[i].no_sjp;
          var idpenjamin  = a[i].id_penjamin;
          var penjamin    = a[i].nama_penjamin;
          var telepon     = a[i].telepon;
          var id_dokter   = a[i].id_pegawai;
          var nm_dokter   = a[i].nama_pegawai;

          var no = i + 1;
          
          Baris += '<tr onclick="vReturRJIGD('+"'"+posting+"','"+no_retur+"','"+tgl_retur+"','"+no_rm+"','"+nama+"','"+id_unit+"','"+unit+"','"+id_trans+"','"+tgl_kunj+"','"+tgl_lahir+"','"+no_sjp+"','"+penjamin+"','"+telepon+"','"+id_dokter+"','"+nm_dokter+"','"+idpenjamin+"'"+')">';
          Baris += '<td>'+no+'</td>';
          Baris += '<td>';
          if (posting == 't'){
            Baris += '&nbsp;<div class="col-sm-1" style="display:contents;"><img src="<?= base_url('_assets/dist/img/checklist.png') ?>" width="20px" height="20px" title="Sudah Di Posting"/></div>';
          }else{
            Baris += '&nbsp;<div class="col-sm-1" style="display:contents;"><img src="<?= base_url('_assets/dist/img/cancel.png') ?>" width="20px" height="20px" title="Belum Di Posting"/></div>';
          }

          Baris += '</td>';
          Baris += '<td>'+tgl_retur+'</td>';
          Baris += '<td>'+no_retur+'</td>';
          Baris += '<td>'+no_rm+' / '+nama.toUpperCase()+'</td>';
          Baris += '<td>'+unit.toUpperCase()+'</td>';
          Baris += "</tr>";
        }
        $('#returRJIGDFar_datatable tbody').append(Baris);
        $('#returRJIGDFar_progress').hide();
      }       
    }

  });  
  
}

function vReturRJIGD(posting, no_retur, tgl_retur, no_rm, nama, id_unit, unit, id_trans, tgl_kunj, tgl_lahir, no_sjp, penjamin, telepon, id_dokter, nm_dokter, idpenjamin){
  var json_data = {
    'vReturRJIGD_posting'   : posting,
    'vReturRJIGD_no_retur'  : no_retur,
    'vReturRJIGD_tgl_retur' : tgl_retur,
    'vReturRJIGD_no_rm'     : no_rm,
    'vReturRJIGD_nama'      : nama.replace(/ /g, '%20'),
    'vReturRJIGD_id_unit'   : id_unit,
    'vReturRJIGD_unit'      : unit.replace(/ /g, '%20'),
    'vReturRJIGD_id_trans'  : id_trans,
    'vReturRJIGD_tgl_kunj'  : tgl_kunj,
    'vReturRJIGD_tgl_lahir' : tgl_lahir.replace(/ /g, '%20'),
    'vReturRJIGD_no_sjp'    : no_sjp,
    'vReturRJIGD_idpenjamin': idpenjamin,
    'vReturRJIGD_penjamin'  : penjamin.replace(/ /g, '%20'),
    'vReturRJIGD_telepon'   : telepon,
    'vReturRJIGD_id_dokter' : id_dokter,
    'vReturRJIGD_nm_dokter' : nm_dokter.replace(/ /g, '%20')
  };

  var data = JSON.stringify(json_data);
  $('#returRJIGDFar_pertama').hide();
  $('#returRJIGDFar_kedua').hide();
  $('.returRJIGD_content').load('Apotek/returRJIGDAPT?data='+ data);

}

function VreturresepRJIGD(){
  var json_data = {
    'vReturRJIGD_posting'   : 'f',
    'vReturRJIGD_no_retur'  : '',
    'vReturRJIGD_tgl_retur' : nowday,
    'vReturRJIGD_no_rm'     : '',
    'vReturRJIGD_nama'      : '',
    'vReturRJIGD_id_unit'   : '',
    'vReturRJIGD_unit'      : '',
    'vReturRJIGD_id_trans'  : '',
    'vReturRJIGD_tgl_kunj'  : '',
    'vReturRJIGD_tgl_lahir' : '',
    'vReturRJIGD_no_sjp'    : '',
    'vReturRJIGD_idpenjamin': '',
    'vReturRJIGD_penjamin'  : '',
    'vReturRJIGD_telepon'   : '',
    'vReturRJIGD_id_dokter' : '',
    'vReturRJIGD_nm_dokter' : ''

  };

  var data = JSON.stringify(json_data);
  $('#returRJIGDFar_pertama').hide();
  $('#returRJIGDFar_kedua').hide();
  $('.returRJIGD_content').load('Apotek/returRJIGDAPT?data='+ data);

}
</script>