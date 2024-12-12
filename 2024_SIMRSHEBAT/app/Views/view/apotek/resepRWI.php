<?php date_default_timezone_set("Asia/Jakarta"); ?>
<div class="col-md-12 p-2" id="resepRWIAPT_pertama">
  <div class="card card-outline card-default" style="margin-bottom:0;">
    
    <div class="card-body p-2 darkgrey-custom">
      <div class="row row-custom">
        <div class="col-sm-auto">
          <div class="form-group">
            <label>No. Resep :</label>
            <input type="text" class="form-control form-control-xs" placeholder="Entry Resep" id="resepRWIAPT_noresep" onchange="tampilkan_isi_resepRWI()">
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Cari No. RM / Nama Pasien :</label>
            <div class="input-group input-group-sm mb-3">
              <div class="input-group-prepend">                
                <button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="height:25px;"></button>
                <ul class="dropdown-menu">
                  <li class="dropdown-item" onclick="show_cri_norm_resepRWIAPT()">No. RekamMedik</a></li>
                  <li class="dropdown-item" onclick="show_cri_nmpasien_resepRWIAPT()">Nama Pasien</a></li>
                </ul>
              </div>
              <!-- /btn-group -->
              <input type="text" class="form-control form-control-xs" placeholder="Entry No. RM" id="cri_by_norm_resepRWIAPT" onchange="tampilkan_isi_resepRWI()">
              <input type="text" class="form-control form-control-xs" placeholder="Entry Nama Pasien" id="cri_by_nmpasien_resepRWIAPT" onchange="tampilkan_isi_resepRWI()">
            </div>
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Tgl. Resep :</label>
            <input type="date" class="form-control form-control-xs" id="resepRWIAPT_tglawal" onkeypress="tampilkan_isi_resepRWI()">
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label>s/d</label>
            <input type="date" class="form-control form-control-xs" id="resepRWIAPT_tglakhir" onkeypress="tampilkan_isi_resepRWI()">
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Status Dilayani :</label>
            <select class="form-control form-control-xs" id="resepRWIAPT_dilayani" onchange="tampilkan_isi_resepRWI()">
              <option value="-">Tampilkan Semua</option>
              <option value="0">Belum Dilayani</option>
              <option value="1">Sudah Dilayani</option>
            </select>
          </div>
        </div>        
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Unit :</label>
            <select class="form-control form-control-xs" id="resepRWIAPT_unitPoli" onchange="tampilkan_isi_resepRWI()"></select>
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Jumlah Pasien :</label>
            <select class="form-control form-control-xs" id="resepRWIAPT_jumlahpasien" onchange="tampilkan_isi_resepRWI()">
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

<div class="col-md-12 p-2" id="resepRWIAPT_kedua">
  <div class="card card-outline">
    <div class="overlay-wrapper" id="resepRWIAPT_progress">
      <div class="overlay">
        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
      </div>
    </div>  
    <div class="card-body p-0 " style="height: 67vh; max-height: 67vh; overflow-x: hidden;">
      <div class="card" style="box-shadow: 0 0 3px #343a40; margin-bottom: 0;">
        <div>
          <div class="card-header p-1">
            <div class="row">
              <div class="col-md-12">
                <h6 class="hr6-custom"><i class="fas fa-heartbeat"></i> Daftar Resep Apotek Rawat Inap</h6>
                <div style="display: block;">
                  <button type="button" class="btn bg-gradient-warning btn-xs" type="submit" onclick="showModalPasienKunjunganLangsung(vresepRWI_kunjlangsung)" id="resepRWI_kunjlangsung"> <i class="fas fa-user-plus"></i> Kunjungan Langsung</button>
                </div>
              </div>
            </div>         
          </div>
        </div>
      </div>

      <table id="resepRWIAPT_datatable" class="table table-striped table-sm choose" style="border-collapse: inherit;">
        <thead>
          <tr>
            <th width="15">#</th>
            <th width="50">Status</th>
            <th width="100">Tgl. Resep</th>
            <th width="100">No. Resep</th>
            <th>No. RM / Nama Pasien</th>
            <th width="200">Unit</th>
            <th width="300">Dokter</th>
            <th width="100">ID Order</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>      
    </div>

  </div>  
</div>

<div class="resepRWI_content"></div>
<div class="resepRWI_contentobat"></div>

<script type="text/javascript">
var nowday      = "<?php echo date('Y-m-d'); ?>";

document.getElementById('resepRWIAPT_tglawal').value  = nowday;
document.getElementById('resepRWIAPT_tglakhir').value = nowday;
var a = "resepRWIAPT_tglawal";
var b = "resepRWIAPT_tglakhir";
max_date(a);
max_date(b);
resepRWI_unit();
tampilkan_isi_resepRWI();
$('#cri_by_norm_resepRWIAPT').show();
$('#cri_by_nmpasien_resepRWIAPT').hide();

function resepRWI_unit() {
  apiPOST('Rawat_inap/unit', null, hasil => {
    var data = hasil['data'];
    var unit = '';
      unit += '<option value="0">Semua Unit</option>';
    for (var i = 0; i < data.length; i++) {
      unit += '<option value="'+ data[i]['id_unit'] +'">'+ data[i]['nama_unit']+'</option>';
    }
    document.getElementById('resepRWIAPT_unitPoli').innerHTML = unit;
  });
}

function show_cri_norm_resepRWIAPT(){
  $('#cri_by_norm_resepRWIAPT').show();
  $('#cri_by_nmpasien_resepRWIAPT').hide();
}

function show_cri_nmpasien_resepRWIAPT(){
  $('#cri_by_norm_resepRWIAPT').hide();
  $('#cri_by_nmpasien_resepRWIAPT').show();
  $("#cri_by_nmpasien_resepRWIAPT").trigger('focus');
}

function tampilkan_isi_resepRWI(){  
   $('#resepRWIAPT_progress').show();
  var listParam = [
    'cri_by_norm_resepRWIAPT', 'cri_by_nmpasien_resepRWIAPT'
  ];

  var param = {
    noresep   : document.getElementById('resepRWIAPT_noresep').value,
    norm      : document.getElementById('cri_by_norm_resepRWIAPT').value,
    nmpasien  : document.getElementById('cri_by_nmpasien_resepRWIAPT').value,
    tglresep1 : document.getElementById('resepRWIAPT_tglawal').value,
    tglresep2 : document.getElementById('resepRWIAPT_tglakhir').value,
    stsdilayni: document.getElementById('resepRWIAPT_dilayani').value,
    poli      : document.getElementById('resepRWIAPT_unitPoli').value,
    jmlh      : document.getElementById('resepRWIAPT_jumlahpasien').value,
    idfar     : user['id_far']
  };

  apiPOST("Apotek/resepRWI_listapotek", param, hasil => {   
    
    $('#resepRWIAPT_datatable tbody').html('');

    if (hasil['data'] !== null) {
      if (hasil['code'] == 'XX') {
        $('#resepRWIAPT_progress').hide();
        toastr.error("Data tidak ditemukan");
        var Baris = '<tr>';  
            Baris += '<td colspan="8" align="center"><h6>Belum Ada Resep<h6></td>';
            Baris += "</tr>";

        $('#resepRWIAPT_datatable tbody').append(Baris);
        document.getElementById('cri_by_norm_resepRWIAPT').value     = '';
        document.getElementById('cri_by_nmpasien_resepRWIAPT').value = '';
      
      }else{
        $('#resepRWIAPT_progress').hide();
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
          
          Baris += '<tr onclick="vresepRWI('+"'"+id_kunj+"','"+noresep+"','"+id_unit+"','"+unit+"','"+id_dokter+"','"+cat_alergi+"','"+tglresep+"','"+no_rm+"','"+nm_pasien+"','"+tglkunj+"','"+tgllahir+"','"+telepon+"','"+id_trans+"','"+tgl_tutup+"','"+id_order+"','"+liveresep+"','"+id_kunjfar+"'"+')">';
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
          Baris += '<td>'+dokter+'</td>';
          Baris += '<td>'+id_orderx+'</td>';
          Baris += "</tr>";
        }
        $('#resepRWIAPT_datatable tbody').append(Baris);
      }       
    }else{
      document.getElementById("resepRWI_kunjlangsung").disabled  = true;
    }

  });    
}

function vresepRWI(id_kunj, noresep, id_unit, unit, id_dokter, cat_alergi, tglresep, no_rm, nm_pasien, tglkunj, tgllahir,telepon, id_trans, tgl_tutup, id_order, liveresep, id_kunjfar){
  var json_data = {
    'vresepRWI_id_transaksi' : id_trans,
    'vresepRWI_no_resep'     : noresep,
    'vresepRWI_id_kunj'      : id_kunj,
    'vresepRWI_tgl_kunj'     : tglkunj,
    'vresepRWI_tgl_resep'    : tglresep,
    'vresepRWI_no_rm'        : no_rm,
    'vresepRWI_nama'         : nm_pasien.replace(/ /g, '%20'),
    'vresepRWI_umur'         : tgllahir,
    'vresepRWI_telp'         : telepon,
    'vresepRWI_idunit'       : id_unit,
    'vresepRWI_unit'         : unit.replace(/ /g, '%20'),
    'vresepRWI_idpeg'        : id_dokter,
    'vresepRWI_idorder'      : id_order,
    'vresepRWI_kunjlangsung' : liveresep,
    'vresepRWI_id_kunjfar'   : id_kunjfar
  };

  var data = JSON.stringify(json_data);
  //if (tgl_tutup == 'null'){
    $('#resepRWIAPT_pertama').hide();
    $('#resepRWIAPT_kedua').hide();
    $('.resepRWI_content').load('Apotek/resepRWIAPT?data='+ data);
  // }else{
  //   sukses("Transaksi Sudah Di Tutup !!\nHub. Kasir", '');
  // }
}


function vresepRWI_kunjlangsung(data){    
  var json_data = {
    'vresepRWI_id_transaksi' : '',
    'vresepRWI_no_resep'     : '',
    'vresepRWI_id_kunj'      : '',
    'vresepRWI_tgl_kunj'     : nowday,
    'vresepRWI_tgl_resep'    : nowday,
    'vresepRWI_no_rm'        : data.no_rm,
    'vresepRWI_nama'         : data.nama.replace(/ /g, '%20'),
    'vresepRWI_umur'         : data.tgl_lahir,
    'vresepRWI_telp'         : data.telepon,
    'vresepRWI_idunit'       : '',
    'vresepRWI_unit'         : '',
    'vresepRWI_idpeg'        : '',
    'vresepRWI_dokter'       : '',
    'vresepRWI_idorder'      : '',
    'vresepRWI_kunjlangsung' : '1',
    'vresepRWI_id_kunjfar'   : ''
  };

  var file = JSON.stringify(json_data);
  
  $('#resepRWIAPT_pertama').hide();
  $('#resepRWIAPT_kedua').hide();
  //$('.resepRWI_content').load('Apotek/resepRWIAPT_kunjLangsung?data='+ file);
  $('.resepRWI_content').load('Apotek/resepRWIAPT?data='+ file);
  sessionStorage.clear();

}
  

</script>
