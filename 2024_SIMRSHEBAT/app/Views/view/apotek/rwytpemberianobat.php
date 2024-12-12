<?php
date_default_timezone_set("Asia/Jakarta");

$nowday     = date('Y-m-d');
//$nextday    = date('Y-m-d', strtotime('+1 days', strtotime($nowday))); 
$nextday    = $nowday; 
?>
<div class="col-md-12 p-2" id="riwayatobat_pertama">
  <div class="card card-outline card-default" style="margin-bottom:0;">
    
    <div class="card-body p-2 darkgrey-custom">
      <div class="row row-custom">
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Cari No. RM / Nama Pasien :</label>
            <div class="input-group input-group-sm mb-3">
              <div class="input-group-prepend">                
                <button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="height:25px;"></button>
                <ul class="dropdown-menu">
                  <li class="dropdown-item" onclick="show_cri_norm_riwayatobat()">No. RekamMedik</a></li>
                  <li class="dropdown-item" onclick="show_cri_nmpasien_riwayatobat()">Nama Pasien</a></li>
                </ul>
              </div>
              <!-- /btn-group -->
              <input type="text" class="form-control form-control-xs" placeholder="Entry No. RM" id="cri_by_norm_riwayatobat" onchange="tampilkan_isi_riwayatobat()">
              <input type="text" class="form-control form-control-xs" placeholder="Entry Nama Pasien" id="cri_by_nmpasien_riwayatobat" onchange="tampilkan_isi_riwayatobat()">
            </div>
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label for="riwayatobat_tgl">Tgl. Kunjung :</label>
            <input type="date" class="form-control form-control-xs" id="riwayatobat_tgl" name="riwayatobat_tgl" onkeypress="tampilkan_isi_riwayatobat()">
          </div>
        </div>  
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Jumlah Data :</label>
            <select class="form-control form-control-xs" id="riwayatobat_jumlah" onchange="tampilkan_isi_riwayatobat()">
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

<div class="col-md-12 p-2" id="riwayatobat_kedua">
  <div class="card card-outline">
    <div class="overlay-wrapper" id="riwayatobat_progress">
      <div class="overlay">
        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
      </div>
    </div>  
    <div class="card-body p-1" style="max-height: 67vh; overflow-x: hidden;">
      <div class="card" style="box-shadow: 0 0 3px #343a40; margin-bottom: 0;">
        <div>
          <div class="card-header p-1">
            <div class="row">
              <div class="col-md-12">
                <h6 class="hr6-custom"><i class="fas fa-heartbeat"></i> Daftar Riwayat Pemberian Obat</h6>
              </div>
            </div>         
          </div>
        </div>
      </div>

      <table id="riwayatobat_datatable" class="table table-striped table-sm choose" style="border-collapse: inherit;">
        <thead>
          <tr>
            <th width="20">#</th>
            <th width="100">Transaski</th>
            <th width="100">ID.Kunj</th>
            <th width="100">No. Resep</th>
            <th width="100">Tgl. Resep</th>
            <th>No. RM / Nama Pasien</th>
            <th width="200">Unit</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>      
    </div>

  </div>  
</div>

<div class="riwayatobat_content"></div>

<script type="text/javascript">
document.getElementById('riwayatobat_tgl').value = "<?php echo date('Y-m-d'); ?>";
tampilkan_isi_riwayatobat();
$('#cri_by_norm_riwayatobat').show();
$('#cri_by_nmpasien_riwayatobat').hide();

function show_cri_norm_riwayatobat(){
  $('#cri_by_norm_riwayatobat').show();
  $('#cri_by_nmpasien_riwayatobat').hide();
}

function show_cri_nmpasien_riwayatobat(){
  $('#cri_by_norm_riwayatobat').hide();
  $('#cri_by_nmpasien_riwayatobat').show();
  $("#cri_by_nmpasien_riwayatobat").trigger('focus');
}

function tampilkan_isi_riwayatobat(){  
   $('#riwayatobat_progress').show();
  var listParam = [
    'cri_by_norm_riwayatobat', 'cri_by_nmpasien_riwayatobat'
  ];

  var param = {
    norm      : document.getElementById('cri_by_norm_riwayatobat').value,
    nmpasien  : document.getElementById('cri_by_nmpasien_riwayatobat').value,
    tglmasuk  : document.getElementById('riwayatobat_tgl').value,
    jmlh      : document.getElementById('riwayatobat_jumlah').value,
    idfar     : user['id_far']
  };

  apiPOST("Apotek/riwayatobat_listapotek", param, hasil => {   
    $('#riwayatobat_progress').hide();
    $('#riwayatobat_datatable tbody').html('');

    if (hasil['data'] !== null) {
      if (hasil['code'] == '200') {

        var Baris = "";
        var a = hasil['data'];
        for (var i = 0; i < a.length; i++) {
          var no_rm       = a[i].no_rm;
          var nama        = a[i].nama.replace(/'/g, '');
          var tgl_masuk   = a[i].tgl_masuk;
          var id_kunjungan= a[i].id_kunjungan;
          var noresep     = a[i].noresep;
          var tglresep    = a[i].tglresep;
          var id_unit     = a[i].id_unit;
          var nama_unit   = a[i].nama_unit;
          var id_trans    = a[i].id_transaksi;
          var no = i + 1;
          
          Baris += '<tr onclick="vriwayatobat('+"'"+no_rm+"','"+nama+"','"+tgl_masuk+"','"+id_kunjungan+"','"+noresep+"','"+tglresep+"','"+id_unit+"','"+nama_unit+"','"+id_trans+"'"+')">';
          Baris += '<td>'+no+'</td>';
          Baris += '<td>'+id_trans+'</td>';
          Baris += '<td>'+id_kunjungan+'</td>';
          Baris += '<td>'+noresep+'</td>';
          Baris += '<td>'+tglresep+'</td>';
          Baris += '<td>'+no_rm+' / '+nama.toUpperCase()+'</td>';
          Baris += '<td>'+nama_unit+'</td>';
          Baris += "</tr>";
        }
        $('#riwayatobat_datatable tbody').append(Baris);

      }else{

        toastr.error("Data tidak ditemukan");
        var Baris = '<tr>';  
            Baris += '<td colspan="7" align="center"><h6>Belum Ada History Resep Pasien<h6></td>';
            Baris += "</tr>";

        $('#riwayatobat_datatable tbody').append(Baris);
        document.getElementById('cri_by_norm_riwayatobat').value     = '';
        document.getElementById('cri_by_nmpasien_riwayatobat').value = '';
      
      }       
    }

  });  
  
}

function vriwayatobat(no_rm, nama, tgl_masuk, id_kunjungan, noresep, tglresep, id_unit, nama_unit, id_trans){
  var json_data = {
    'vriwayatobat_id_trans'  : id_trans,
    'vriwayatobat_no_rm'     : no_rm,
    'vriwayatobat_nama'      : nama.replace(/ /g, '%20'),
    'vriwayatobat_tgl_masuk' : tgl_masuk,
    'vriwayatobat_id_kunj'   : id_kunjungan,
    'vriwayatobat_noresep'   : noresep,
    'vriwayatobat_tglresep'  : tglresep,
    'vriwayatobat_id_unit'   : id_unit,
    'vriwayatobat_nama_unit' : nama_unit.replace(/ /g, '%20')
  };

  var data = JSON.stringify(json_data);
 
  // $('#riwayatobat_pertama').hide();
  // $('#riwayatobat_kedua').hide();
  $('.riwayatobat_content').load('Apotek/riwayatobat_detail?data='+ data);

}
</script>