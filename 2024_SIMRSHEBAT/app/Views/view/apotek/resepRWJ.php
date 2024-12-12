<?php
date_default_timezone_set("Asia/Jakarta");
$nowday     = date('Y-m-d');
//$nextday    = date('Y-m-d', strtotime('+1 days', strtotime($nowday))); 
$nextday    = $nowday; 
?>
<div class="col-md-12 p-2" id="resepRJAPT_pertama">
  <div class="card card-outline card-default" style="margin-bottom:0;">
    
    <div class="card-body p-2 darkgrey-custom">
      <div class="row row-custom">
        <div class="col-sm-auto">
          <div class="form-group">
            <label>No. Resep :</label>
            <input type="text" class="form-control form-control-xs" placeholder="Entry Resep" id="resepRJAPT_noresep" onchange="tampilkan_isi_resepRWJ()">
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Cari No. RM / Nama Pasien :</label>
            <div class="input-group input-group-sm mb-3">
              <div class="input-group-prepend">                
                <button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="height:25px;"></button>
                <ul class="dropdown-menu">
                  <li class="dropdown-item" onclick="show_cri_norm_resepRJAPT()">No. RekamMedik</a></li>
                  <li class="dropdown-item" onclick="show_cri_nmpasien_resepRJAPT()">Nama Pasien</a></li>
                </ul>
              </div>
              <!-- /btn-group -->
              <input type="text" class="form-control form-control-xs" placeholder="Entry No. RM" id="cri_by_norm_resepRJAPT" onchange="tampilkan_isi_resepRWJ()">
              <input type="text" class="form-control form-control-xs" placeholder="Entry Nama Pasien" id="cri_by_nmpasien_resepRJAPT" onchange="tampilkan_isi_resepRWJ()">
            </div>
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Tgl. Resep :</label>
            <input type="date" class="form-control form-control-xs" id="resepRJAPT_tglawal" onkeypress="tampilkan_isi_resepRWJ()">
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label>s/d</label>
            <input type="date" class="form-control form-control-xs" id="resepRJAPT_tglakhir" onkeypress="tampilkan_isi_resepRWJ()">
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Status Dilayani :</label>
            <select class="form-control form-control-xs" id="resepRJAPT_dilayani" onchange="tampilkan_isi_resepRWJ()">
              <option value="-">Tampilkan Semua</option>
              <option value="0">Belum Dilayani</option>
              <option value="1">Sudah Dilayani</option>
            </select>
          </div>
        </div>        
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Poliklinik :</label>
            <select class="form-control form-control-xs" id="resepRJAPT_unitPoli" onchange="tampilkan_isi_resepRWJ()"></select>
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Jumlah Pasien :</label>
            <select class="form-control form-control-xs" id="resepRJAPT_jumlahpasien" onchange="tampilkan_isi_resepRWJ()">
              <option value="10">10 Pasien</option>
              <option value="15">15 Pasien</option>
              <option value="30">30 Pasien</option>
              <option value="50">50 Pasien</option>
              <option value="100">100 Pasien</option>
            </select>
          </div>
        </div>      
      </div>
    </div>
    <!-- card-outline -->
  </div>   
</div>

<div class="col-md-12 p-2" id="resepRJAPT_kedua">
  <div class="card card-outline">
    <div class="overlay-wrapper" id="resepRJAPT_progress">
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
                <h6 class="hr6-custom"><i class="fas fa-heartbeat"></i> Daftar Resep Apotek Gawat Darurat / Rawat Jalan</h6>
                <div>
                  <button type="button" class="btn bg-gradient-warning btn-xs" type="submit" onclick="showModalPasienKunjunganLangsung(vResepRJ_kunjlangsung)"> <i class="fas fa-user-plus"></i> Kunjungan Langsung</button>
                </div>
              </div>
            </div>         
          </div>
        </div>
      </div>

      <table id="resepRJAPT_datatable" class="table table-striped table-sm choose" style="border-collapse: inherit;">
        <thead>
          <tr>
            <th width="15">#</th>
            <th width="50">Status</th>
            <th width="100">Tgl. Resep</th>
            <th width="100">No. Resep</th>
            <th>No. RM / Nama Pasien</th>
            <th width="200">Poliklinik</th>
            <th width="300">Dokter</th>
            <th width="100">ID Order</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>      
    </div>

  </div>  
</div>

<div class="resepRJ_content"></div>
<div class="resepRJ_contentobat"></div>

<script type="text/javascript">  
var nowday      = "<?php echo $nowday; ?>";
var nextday     = "<?php echo $nextday; ?>";

document.getElementById('resepRJAPT_tglawal').value  = nowday;
document.getElementById('resepRJAPT_tglakhir').value = nextday;
var a = "resepRJAPT_tglawal";
var b = "resepRJAPT_tglakhir";
max_date(a);
max_date(b);
resepRJ_unit();
tampilkan_isi_resepRWJ();
$('#cri_by_norm_resepRJAPT').show();
$('#cri_by_nmpasien_resepRJAPT').hide();

function resepRJ_unit() {
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
    document.getElementById('resepRJAPT_unitPoli').innerHTML = unit;
  });

}

function show_cri_norm_resepRJAPT(){
  $('#cri_by_norm_resepRJAPT').show();
  $('#cri_by_nmpasien_resepRJAPT').hide();
}

function show_cri_nmpasien_resepRJAPT(){
  $('#cri_by_norm_resepRJAPT').hide();
  $('#cri_by_nmpasien_resepRJAPT').show();
  $("#cri_by_nmpasien_resepRJAPT").trigger('focus');
}

function tampilkan_isi_resepRWJ(){  
   $('#resepRJAPT_progress').show();
  var listParam = [
    'cri_by_norm_resepRJAPT', 'cri_by_nmpasien_resepRJAPT'
  ];

  var param = {
    noresep   : document.getElementById('resepRJAPT_noresep').value,
    norm      : document.getElementById('cri_by_norm_resepRJAPT').value,
    nmpasien  : document.getElementById('cri_by_nmpasien_resepRJAPT').value,
    tglresep1 : document.getElementById('resepRJAPT_tglawal').value,
    tglresep2 : document.getElementById('resepRJAPT_tglakhir').value,
    stsdilayni: document.getElementById('resepRJAPT_dilayani').value,
    poli      : document.getElementById('resepRJAPT_unitPoli').value,
    jmlh      : document.getElementById('resepRJAPT_jumlahpasien').value,
    idfar     : user['id_far']
  };

  apiPOST("Apotek/resepRWJ_listapotek", param, hasil => {   
    $('#resepRJAPT_datatable tbody').html('');

    if (hasil['data'] !== null) {
      if (hasil['code'] == 'XX') {
        $('#resepRJAPT_progress').hide();
        toastr.error("Data tidak ditemukan");
        var Baris = '<tr>';  
            Baris += '<td colspan="8" align="center"><h6>Belum Ada Resep<h6></td>';
            Baris += "</tr>";

        $('#resepRJAPT_datatable tbody').append(Baris);
        document.getElementById('cri_by_norm_resepRJAPT').value     = '';
        document.getElementById('cri_by_nmpasien_resepRJAPT').value = '';
      
      }else{
        $('#resepRJAPT_progress').hide();
        var Baris = "";
        var a = hasil['data'];
        var b = hasil['penjamin'];
        for (var i = 0; i < a.length; i++) {
          var id_trans  = a[i].id_transaksi;
          var id_kunj   = a[i].id_kunjungan;
          var tglkunj   = a[i].tgl_masuk;
          var noresep   = a[i].noresep;
          var id_order  = a[i].id_order;
          var id_unit   = a[i].id_unit;
          var unit      = a[i].nama_unit;
          var id_dokter = a[i].id_pegawai;
          var dokter    = a[i].nama_pegawai;
          var cat_alergi= a[i].cat_alergi;
          var tglresep  = a[i].tglresep;
          var no_rm     = a[i].no_rm;
          var nm_pasien = a[i].nama.replace(/'/g, '');
          var telepon   = a[i].telepon;
          var tgllahir  = a[i].tgl_lahir;
          var dilayani  = a[i].dilayani;
          var tgl_tutup = a[i].tgl_tutup;
          var liveresep = a[i].liveresep;
          var id_kunjfar= a[i].id_kunjungan_far;
          var no = i + 1;
          
          Baris += '<tr onclick="vResepRJ('+"'"+id_kunj+"','"+noresep+"','"+id_unit+"','"+unit+"','"+id_dokter+"','"+cat_alergi+"','"+tglresep+"','"+no_rm+"','"+nm_pasien+"','"+tglkunj+"','"+tgllahir+"','"+telepon+"','"+id_trans+"','"+tgl_tutup+"','"+id_order+"','"+liveresep+"','"+id_kunjfar+"'"+')">';
          Baris += '<td>'+no+'</td>';
          Baris += '<td>';
          if (dilayani == 1){
            Baris += '&nbsp;<div class="col-sm-1" style="display:contents;"><img src="<?= base_url('_assets/dist/img/checklist.png') ?>" width="20px" height="20px" title="Sudah Dilayani"/></div>';
          }else{
            Baris += '&nbsp;<div class="col-sm-1" style="display:contents;"><img src="<?= base_url('_assets/dist/img/cancel.png') ?>" width="20px" height="20px" title="Belum Dilayani"/></div>';
          }

          if (id_order != null){
            var id_orderx = id_order;
          }else{
            var id_orderx = '-';
          }
          Baris += '</td>';
          Baris += '<td>'+tglresep+'</td>';
          Baris += '<td>'+noresep+'</td>';
          Baris += '<td>'+no_rm+' / '+nm_pasien.toUpperCase()+'</td>';
          Baris += '<td>'+unit+'</td>';
          Baris += '<td>'+dokter.toUpperCase()+'</td>';
          Baris += '<td>'+id_orderx+'</td>';
          Baris += "</tr>";
        }
        $('#resepRJAPT_datatable tbody').append(Baris);
      }
    }

  });  
  
}

function vResepRJ(id_kunj, noresep, id_unit, unit, id_dokter, cat_alergi, tglresep, no_rm, nm_pasien, tglkunj, tgllahir,telepon, id_trans, tgl_tutup, id_order, liveresep, id_kunjfar){
  var json_data = {
    'vResepRJ_id_transaksi' : id_trans,
    'vResepRJ_no_resep'     : noresep,
    'vResepRJ_id_kunj'      : id_kunj,
    'vResepRJ_tgl_kunj'     : tglkunj,
    'vResepRJ_tgl_resep'    : tglresep,
    'vResepRJ_no_rm'        : no_rm,
    'vResepRJ_nama'         : nm_pasien.replace(/ /g, '%20'),
    'vResepRJ_umur'         : tgllahir,
    'vResepRJ_telp'         : telepon,
    'vResepRJ_idunit'       : id_unit,
    'vResepRJ_unit'         : unit.replace(/ /g, '%20'),
    'vResepRJ_idpeg'        : id_dokter,
    'vResepRJ_idorder'      : id_order,
    'vResepRJ_kunjlangsung' : liveresep,
    'vResepRJ_id_kunjfar'   : id_kunjfar
  };

  var data = JSON.stringify(json_data);
  //if (tgl_tutup == 'null'){
    $('#resepRJAPT_pertama').hide();
    $('#resepRJAPT_kedua').hide();
    $('.resepRJ_content').load('Apotek/resepRJIGDAPT?data='+ data);
  // }else{
  //   sukses("Transaksi Sudah Di Tutup !!\nHub. Kasir", '');
  // }

}

/*function refresh() {       
   $('#resepRJAPT_LOADING').hide();   
   $('#resepRJAPT_LOADING2').hide();   
}
setTimeout(refresh, 1000);*/

function vResepRJ_kunjlangsung(data){    
  var json_data = {
    'vResepRJ_id_transaksi' : '',
    'vResepRJ_no_resep'     : '',
    'vResepRJ_id_kunj'      : '',
    'vResepRJ_tgl_kunj'     : nowday,
    'vResepRJ_tgl_resep'    : nowday,
    'vResepRJ_no_rm'        : data.no_rm,
    'vResepRJ_nama'         : data.nama.replace(/ /g, '%20'),
    'vResepRJ_umur'         : data.tgl_lahir,
    'vResepRJ_telp'         : data.telepon,
    'vResepRJ_idunit'       : '',
    'vResepRJ_unit'         : '',
    'vResepRJ_idpeg'        : '',
    'vResepRJ_dokter'       : '',
    'vResepRJ_idorder'      : '',
    'vResepRJ_kunjlangsung' : '1',
    'vResepRJ_id_kunjfar'   : ''
  };

  var file = JSON.stringify(json_data);
  
  $('#resepRJAPT_pertama').hide();
  $('#resepRJAPT_kedua').hide();
  //$('.resepRJ_content').load('Apotek/resepRWJAPT_kunjLangsung?data='+ file);
  $('.resepRJ_content').load('Apotek/resepRJIGDAPT?data='+ file);

}
  

</script>