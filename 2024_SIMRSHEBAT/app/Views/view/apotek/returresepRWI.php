<?php
date_default_timezone_set("Asia/Jakarta");
$nowday     = date('Y-m-d');
$nextday    = $nowday; 
?>
<div class="col-md-12 p-2" id="returRIFar_pertama">
  <div class="card card-outline card-default" style="margin-bottom:0;">
    
    <div class="card-body p-2 darkgrey-custom">
      <div class="row row-custom">
        <div class="col-sm-auto">
          <div class="form-group">
            <label>No. Retur :</label>
            <input type="text" class="form-control form-control-xs" placeholder="Entry No.Retur" id="returRIFar_noretur" onchange="tampilkan_isi_returRIFar()">
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Cari No. RM / Nama Pasien :</label>
            <div class="input-group input-group-sm mb-3">
              <div class="input-group-prepend">                
                <button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="height:25px;"></button>
                <ul class="dropdown-menu">
                  <li class="dropdown-item" onclick="show_cri_norm_returRIFar()">No. RekamMedik</a></li>
                  <li class="dropdown-item" onclick="show_cri_nmpasien_returRIFar()">Nama Pasien</a></li>
                </ul>
              </div>
              <!-- /btn-group -->
              <input type="text" class="form-control form-control-xs" placeholder="Entry No. RM" id="cri_by_norm_returRIFar" onchange="tampilkan_isi_returRIFar()">
              <input type="text" class="form-control form-control-xs" placeholder="Entry Nama Pasien" id="cri_by_nmpasien_returRIFar" onchange="tampilkan_isi_returRIFar()">
            </div>
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Tgl. Retur :</label>
            <input type="date" class="form-control form-control-xs" id="returRIFar_tglawal" onkeypress="tampilkan_isi_returRIFar()">
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label>s/d</label>
            <input type="date" class="form-control form-control-xs" id="returRIFar_tglakhir" onkeypress="tampilkan_isi_returRIFar()">
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Status Posting :</label>
            <select class="form-control form-control-xs" id="returRIFar_posting" onchange="tampilkan_isi_returRIFar()">
              <option value="-">Tampilkan Semua</option>
              <option value="f">Belum Posting</option>
              <option value="t">Sudah Posting</option>
            </select>
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Jumlah Data :</label>
            <select class="form-control form-control-xs" id="returRIFar_jumlah" onchange="tampilkan_isi_returRIFar()">
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

<div class="col-md-12 p-2" id="returRIFar_kedua">
  <div class="card card-outline">
    <div class="overlay-wrapper" id="returRIFar_progress">
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
                <h6 class="hr6-custom"><i class="fas fa-heartbeat"></i> Daftar Retur Apotek Rawat Inap</h6>
                <div>
                  <button type="button" class="btn bg-gradient-warning btn-xs" onclick="VreturresepRI()"> <i class="fas fa-plus"></i> Tambah Retur Resep</button>
                </div>
              </div>
            </div>         
          </div>
        </div>
      </div>

      <table id="returRIFar_datatable" class="table table-striped table-sm choose" style="border-collapse: inherit;">
        <thead>
          <tr>
            <th width="15">#</th>
            <th width="50">Status</th>
            <th width="100">Tgl. Retur</th>
            <th width="100">No. Retur</th>
            <th>No. RM / Nama Pasien</th>
            <th width="150">Unit Rawat</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>      
    </div>

  </div>  
</div>

<div class="returRI_content"></div>
<div class="returRI_pasien"></div>

<script type="text/javascript">  
var nowday      = "<?php echo $nowday; ?>";
var nextday     = "<?php echo $nextday; ?>";

document.getElementById('returRIFar_tglawal').value  = nowday;
document.getElementById('returRIFar_tglakhir').value = nextday;
var a = "returRIFar_tglawal";
max_date(a);
var b = "returRIFar_tglakhir";
max_date(b);
tampilkan_isi_returRIFar();
$('#cri_by_norm_returRIFar').show();
$('#cri_by_nmpasien_returRIFar').hide();

function show_cri_norm_returRIFar(){
  $('#cri_by_norm_returRIFar').show();
  $('#cri_by_nmpasien_returRIFar').hide();
}

function show_cri_nmpasien_returRIFar(){
  $('#cri_by_norm_returRIFar').hide();
  $('#cri_by_nmpasien_returRIFar').show();
  $("#cri_by_nmpasien_returRIFar").trigger('focus');
}

function tampilkan_isi_returRIFar(){  
   $('#returRIFar_progress').show();
  var listParam = [
    'cri_by_norm_returRIFar', 'cri_by_nmpasien_returRIFar'
  ];

  var param = {
    noretur   : document.getElementById('returRIFar_noretur').value,
    norm      : document.getElementById('cri_by_norm_returRIFar').value,
    nmpasien  : document.getElementById('cri_by_nmpasien_returRIFar').value,
    tglretur1 : document.getElementById('returRIFar_tglawal').value,
    tglretur2 : document.getElementById('returRIFar_tglakhir').value,
    stsposting: document.getElementById('returRIFar_posting').value,
    jmlh      : document.getElementById('returRIFar_jumlah').value,
    idfar     : user['id_far']
  };

  apiPOST("Apotek/returRI_listapotek", param, hasil => {   
    
    $('#returRIFar_datatable tbody').html('');

    if (hasil['data'] !== null) {
      if (hasil['code'] == 'XX') {
        
        toastr.error("Data tidak ditemukan");
        var Baris = '<tr>';  
            Baris += '<td colspan="6" align="center"><h6>Belum Ada Retur Resep Rawat Inap<h6></td>';
            Baris += "</tr>";

        $('#returRIFar_datatable tbody').append(Baris);
        document.getElementById('cri_by_norm_returRIFar').value     = '';
        document.getElementById('cri_by_nmpasien_returRIFar').value = '';
        $('#returRIFar_progress').hide();

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
          
          Baris += '<tr onclick="vReturRI('+"'"+posting+"','"+no_retur+"','"+tgl_retur+"','"+no_rm+"','"+nama+"','"+id_unit+"','"+unit+"','"+id_trans+"','"+tgl_kunj+"','"+tgl_lahir+"','"+no_sjp+"','"+penjamin+"','"+telepon+"','"+id_dokter+"','"+nm_dokter+"','"+idpenjamin+"'"+')">';
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
        $('#returRIFar_datatable tbody').append(Baris);
        $('#returRIFar_progress').hide();
      }       
    }

  });  
  
}

function vReturRI(posting, no_retur, tgl_retur, no_rm, nama, id_unit, unit, id_trans, tgl_kunj, tgl_lahir, no_sjp, penjamin, telepon, id_dokter, nm_dokter, idpenjamin){
  var json_data = {
    'vReturRI_posting'   : posting,
    'vReturRI_no_retur'  : no_retur,
    'vReturRI_tgl_retur' : tgl_retur,
    'vReturRI_no_rm'     : no_rm,
    'vReturRI_nama'      : nama.replace(/ /g, '%20'),
    'vReturRI_id_unit'   : id_unit,
    'vReturRI_unit'      : unit.replace(/ /g, '%20'),
    'vReturRI_id_trans'  : id_trans,
    'vReturRI_tgl_kunj'  : tgl_kunj,
    'vReturRI_tgl_lahir' : tgl_lahir.replace(/ /g, '%20'),
    'vReturRI_no_sjp'    : no_sjp,
    'vReturRI_idpenjamin': idpenjamin,
    'vReturRI_penjamin'  : penjamin.replace(/ /g, '%20'),
    'vReturRI_telepon'   : telepon,
    'vReturRI_id_dokter' : id_dokter,
    'vReturRI_nm_dokter' : nm_dokter.replace(/ /g, '%20')
  };

  var data = JSON.stringify(json_data);
  $('#returRIFar_pertama').hide();
  $('#returRIFar_kedua').hide();
  $('.returRI_content').load('Apotek/returRIAPT?data='+ data);

}

function VreturresepRI(){
  var json_data = {
    'vReturRI_posting'   : 'f',
    'vReturRI_no_retur'  : '',
    'vReturRI_tgl_retur' : nowday,
    'vReturRI_no_rm'     : '',
    'vReturRI_nama'      : '',
    'vReturRI_id_unit'   : '',
    'vReturRI_unit'      : '',
    'vReturRI_id_trans'  : '',
    'vReturRI_tgl_kunj'  : '',
    'vReturRI_tgl_lahir' : '',
    'vReturRI_no_sjp'    : '',
    'vReturRI_idpenjamin': '',
    'vReturRI_penjamin'  : '',
    'vReturRI_telepon'   : '',
    'vReturRI_id_dokter' : '',
    'vReturRI_nm_dokter' : ''

  };

  var data = JSON.stringify(json_data);
  $('#returRIFar_pertama').hide();
  $('#returRIFar_kedua').hide();
  $('.returRI_content').load('Apotek/returRIAPT?data='+ data);

}
</script>