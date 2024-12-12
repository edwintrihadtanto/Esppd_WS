<?php
$nowday     = date('Y-m-d');
//$nextday    = date('Y-m-d', strtotime('+1 days', strtotime($nowday))); 
$nextday    = $nowday; 
?>
<div class="row">
  <section class="col-lg-6 connectedSortable ui-sortable p-2" id="gudang_pengeluaran_unit">
    <div class="card p-0">
      <div class="card-body p-2 darkgrey-custom">
        <div class="row row-custom">
          <div class="col-sm-3">
            <div class="form-group">
              <label>No. Pengeluaran :</label>
              <input type="text" class="form-control form-control-xs" placeholder="Entry Nomor" id="gudang_pengeluaran_unit_nomor" onchange="gudang_pengeluaran_unit_showdata()">
            </div>
          </div>        
          <div class="col-sm-auto">
            <div class="form-group">
              <label>Tgl. Pengeluaran :</label>
              <input type="date" class="form-control form-control-xs" id="gudang_pengeluaran_unit_tglawal" onkeypress="gudang_pengeluaran_unit_showdata()">
            </div>
          </div>
          <div class="col-sm-auto">
            <div class="form-group">
              <label>s/d</label>
              <input type="date" class="form-control form-control-xs" id="gudang_pengeluaran_unit_tglakhr" onkeypress="gudang_pengeluaran_unit_showdata()">
            </div>
          </div>        
          <div class="col-sm-3">
            <div class="form-group">
              <label>Unit :</label>
              <select class="form-control form-control-xs" id="gudang_pengeluaran_unit_unit" onchange="gudang_pengeluaran_unit_showdata()"></select>
            </div>
          </div>   
        </div>
      </div>
      <!-- card-outline -->
    </div>
    
    <div class="card p-0">
      
        <div class="overlay-wrapper" id="gudang_pengeluaran_unit_loading">
          <div class="overlay">
            <i class="fas fa-3x fa-sync-alt fa-spin"></i>
          </div>
        </div>  
        <div class="card-body p-1 uk-layar2" style="height: 76vh; max-height: 76vh; overflow: auto;">
          <div class="card" style="box-shadow: 0 0 3px #343a40; margin-bottom: 0;">
            <div>
              <div class="card-header p-1">
                <div class="row">
                  <div class="col-md-12">
                    <h6 class="hr6-custom"><i class="fas fa-heartbeat"></i> Daftar Pengeluaran</h6>
                    <div>
                      <button type="button" class="btn bg-gradient-warning btn-xs" onclick="gudang_pengeluaran_unit_addnew()"> <i class="fas fa-plus"></i> Tambah Pengeluaran</button>
                    </div>
                  </div>
                </div>         
              </div>
            </div>
          </div>

          <table id="gudang_pengeluaran_unit_table" class="table table-striped table-sm choose" style="border-collapse: inherit;">
            <thead>
              <tr>
                <th width="15">#</th>
                <th width="60">Status</th>
                <th width="100">No. Pengeluaran</th>
                <th width="150">Tgl. Keluar</th>
                <th>Unit</th>
                <th width="100">No. Permintaan</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>      
        </div>
    </div>
  </section>

  <section class="col-lg-6 connectedSortable ui-sortable p-2" id="gudang_pengeluaran_listpermintaan">
    <div class="card p-0">
      <div class="card-body p-2 darkgrey-custom">
        <div class="row row-custom">
          <div class="col-sm-3">
            <div class="form-group">
              <label>No. Permintaan :</label>
              <input type="text" class="form-control form-control-xs" placeholder="Entry Nomor" id="gudang_pengeluaran_listpermintaan_unit_nomor" onchange="gudang_pengeluaran_listpermintaan_unit_showdata()">
            </div>
          </div>
          <div class="col-sm-auto">
            <div class="form-group">
              <label>Tgl. Permintaan :</label>
              <input type="date" class="form-control form-control-xs" id="gudang_pengeluaran_listpermintaan_unit_tglawal" onkeypress="gudang_pengeluaran_listpermintaan_unit_showdata()">
            </div>
          </div>
          <div class="col-sm-auto">
            <div class="form-group">
              <label>s/d</label>
              <input type="date" class="form-control form-control-xs" id="gudang_pengeluaran_listpermintaan_unit_tglakhr" onkeypress="gudang_pengeluaran_listpermintaan_unit_showdata()">
            </div>
          </div>
          <div class="col-sm-auto">
            <div class="form-group">
              <label>Status Permintaan :</label>
              <select class="form-control form-control-xs" id="gudang_pengeluaran_listpermintaan_unit_status" onchange="gudang_pengeluaran_listpermintaan_unit_showdata()">
                <option value="f">Belum ACC</option>
                <option value="t">ACC</option>
              </select>
            </div>
          </div>     
        </div>
      </div>
      <!-- card-outline -->
    </div>
    
    <div class="card p-0">
      
        <div class="overlay-wrapper" id="gudang_pengeluaran_listpermintaan_unit_loading">
          <div class="overlay">
            <i class="fas fa-3x fa-sync-alt fa-spin"></i>
          </div>
        </div>  
        <div class="card-body p-1 uk-layar2" style="height: 76vh; max-height: 76vh; overflow: auto;">
          <div class="card" style="box-shadow: 0 0 3px #343a40; margin-bottom: 0;">
            <div>
              <div class="card-header p-1">
                <div class="row">
                  <div class="col-md-12">
                    <h6 class="hr6-custom"><i class="fas fa-heartbeat"></i> Daftar Permintaan</h6>
                    <div>
                      <button type="button" class="btn bg-gradient-info btn-xs" onclick="gudang_pengeluaran_listpermintaan_unit_showdata()"> <i class="fas fa-sync-alt"></i> Refresh Data</button>
                    </div>
                  </div>
                </div>         
              </div>
            </div>
          </div>

          <table id="gudang_pengeluaran_listpermintaan_unit_table" class="table table-striped table-sm choose" style="border-collapse: inherit;">
            <thead>
              <tr>
                <th width="15">#</th>
                <th width="60">Status</th>
                <th width="100">No. Permintaan</th>
                <th width="150">Tgl. Permintaan</th>
                <th>Unit</th>
                <th width="150">User</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>      
        </div>
    </div>
  </section>
</div>


<div class="gudangOut"></div>
<div class="gudang_contentobat"></div>

<script type="text/javascript">  
var nowday      = "<?php echo $nowday; ?>";
var nextday     = "<?php echo $nextday; ?>";

document.getElementById('gudang_pengeluaran_unit_tglawal').value = nowday;
document.getElementById('gudang_pengeluaran_unit_tglakhr').value = nextday;
document.getElementById('gudang_pengeluaran_listpermintaan_unit_tglawal').value = nowday;
document.getElementById('gudang_pengeluaran_listpermintaan_unit_tglakhr').value = nextday;

var a = "gudang_pengeluaran_unit_tglawal";
max_date(a);
var b = "gudang_pengeluaran_unit_tglakhr";
max_date(b);

var c = "gudang_pengeluaran_listpermintaan_unit_tglawal";
max_date(c);
var d = "gudang_pengeluaran_listpermintaan_unit_tglakhr";
max_date(d);

gudang_pengeluaran_unit_unit();
gudang_pengeluaran_unit_showdata();
gudang_pengeluaran_listpermintaan_unit_showdata();

function gudang_pengeluaran_unit_unit() {
  var param = {
    id_unit : user['id_far'],
  }
  apiPOST('Apotek/getUnitDepoFarmasi', param, hasil => {
    var data = hasil['data'];
    var ven = '';
      ven += '<option value="0">Semua Unit</option>';
    for (var i = 0; i < data.length; i++) {
      ven += '<option value="'+ data[i]['id_unit'] +'">'+ data[i]['nama_unit'].toUpperCase()+'</option>';
    }
    document.getElementById('gudang_pengeluaran_unit_unit').innerHTML = ven;
  });
}

function gudang_pengeluaran_unit_showdata(){  
   $('#gudang_pengeluaran_unit_loading').show();
  var listParam = [
    'gudang_pengeluaran_unit_nomor'
  ];

  var param = {
    noout   : document.getElementById('gudang_pengeluaran_unit_nomor').value,
    tglsatu : document.getElementById('gudang_pengeluaran_unit_tglawal').value,
    tgldua  : document.getElementById('gudang_pengeluaran_unit_tglakhr').value,
    id_unit : document.getElementById('gudang_pengeluaran_unit_unit').value,
    jmlh    : 0,
    id_user : user['id_user'],
  };

  apiPOST("Gudang/gud_barangOut_showdata", param, hasil => {   
    $('#gudang_pengeluaran_unit_loading').hide();
    $('#gudang_pengeluaran_unit_table tbody').html('');

    if (hasil['data'] !== null) {
        
      var a = hasil['data'];
      if (a.length > 0){
        var Baris = "";
        for (var i = 0; i < a.length; i++) {
          var no_obat_out  = a[i].no_obat_out;
          var tgl_obat_out = a[i].tgl_obat_out;
		      var id_unit      = a[i].id_unit;
          var nama         = a[i].nama_unit;
          var posting      = a[i].posting;
          var remark       = a[i].remark; 
          var id_permintaan; 
          if (a[i].id_permintaan != null){
            id_permintaan     = a[i].id_permintaan;
          }else{
            id_permintaan     = '';
          }

          var no = i + 1;
          
          Baris += '<tr onclick="vGudBarangOut('+"'"+no_obat_out+"','"+tgl_obat_out+"','"+id_unit+"','"+nama+"','"+posting+"','"+remark+"'"+')">'; 
          Baris += '<td>'+no+'</td>';
          Baris += '<td>';
          if (posting == 't'){
            Baris += '&nbsp;<div class="col-sm-1" style="display:contents;"><img src="<?= base_url('_assets/dist/img/checklist.png') ?>" width="20px" height="20px" title="Posting"/></div>';
          }else{
            Baris += '&nbsp;<div class="col-sm-1" style="display:contents;"><img src="<?= base_url('_assets/dist/img/cancel.png') ?>" width="20px" height="20px" title="Belum Posting"/></div>';
          }

          Baris += '</td>';
          Baris += '<td>'+no_obat_out+'</td>';
          Baris += '<td>'+tgl_obat_out+'</td>';
          Baris += '<td>'+nama+'</td>';
          Baris += '<td>'+id_permintaan+'</td>';
          Baris += "</tr>";
        }
        $('#gudang_pengeluaran_unit_table tbody').append(Baris);
      }else{
        toastr.error("Data tidak ditemukan");
        var Baris = '<tr>';  
            Baris += '<td colspan="5" align="center"><h6>Belum Ada Barang Keluar<h6></td>';
            Baris += "</tr>";

        $('#gudang_pengeluaran_unit_table tbody').append(Baris);
        document.getElementById('gudang_pengeluaran_unit_nomor').value= '';
      }
    }
  });  
}

function gudang_pengeluaran_listpermintaan_unit_showdata(){  
   $('#gudang_pengeluaran_listpermintaan_unit_loading').show();
  var listParam = [
    'gudang_pengeluaran_listpermintaan_unit_nomor'
  ];

  var param = {
    noin        : document.getElementById('gudang_pengeluaran_listpermintaan_unit_nomor').value,
    tglsatu     : document.getElementById('gudang_pengeluaran_listpermintaan_unit_tglawal').value,
    tgldua      : document.getElementById('gudang_pengeluaran_listpermintaan_unit_tglakhr').value,
    posting     : 't',
    acc         : document.getElementById('gudang_pengeluaran_listpermintaan_unit_status').value,
    jmlh        : 0,
    iduser      : user['id_user'],
    unit        : 'listpermintaan'
  };

  apiPOST("Gudang/gud_permintaanObat_showdata", param, hasil => {   
    $('#gudang_pengeluaran_listpermintaan_unit_loading').hide();
    $('#gudang_pengeluaran_listpermintaan_unit_table tbody').html('');

    if (hasil['data'] !== null) {
        
      var a = hasil['data'];
      if (a.length > 0){
        var Baris = "";
        for (var i = 0; i < a.length; i++) {
          var id_permintaan   = a[i].id_permintaan;
          var tgl_permintaan  = a[i].tgl_permintaan;
          var id_unit         = a[i].id_unit;
          var nama_unit       = a[i].nama_unit;
          var posting         = a[i].posting;
          var keterangan      = a[i].keterangan; 
          var acc             = a[i].acc; 
          var user            = a[i].nama; 
          var no_obat_out;
          if (a[i].no_obat_out != null){
            no_obat_out     = a[i].no_obat_out;
          }else{
            no_obat_out     = '';
          }

          var posting_gud; 
          if (a[i].posting_gud != null){
            posting_gud     = a[i].posting_gud;
          }else{
            posting_gud     = 'f';
          }

          var no = i + 1;
          
          Baris += '<tr onclick="vGudlistpermintaan_unit('+"'"+id_permintaan+"','"+tgl_permintaan+"','"+id_unit+"','"+posting+"','"+keterangan+"','"+no_obat_out+"','"+posting_gud+"'"+')">'; 
          Baris += '<td>'+no+'</td>';
          Baris += '<td>';
          if (posting == 't'){
            Baris += '&nbsp;<div class="col-sm-1" style="display:contents;"><img src="<?= base_url('_assets/dist/img/checklist.png') ?>" width="20px" height="20px" title="Posting"/></div>';
          }else{
            Baris += '&nbsp;<div class="col-sm-1" style="display:contents;"><img src="<?= base_url('_assets/dist/img/cancel.png') ?>" width="20px" height="20px" title="Belum Posting"/></div>';
          }

          if (acc == 't'){
            Baris += '&nbsp;<div class="col-sm-1" style="display:contents;"><img src="<?= base_url('_assets/dist/img/checklist.png') ?>" width="20px" height="20px" title="Sudah Acc"/></div>';
          }else{
            Baris += '&nbsp;<div class="col-sm-1" style="display:contents;"><img src="<?= base_url('_assets/dist/img/cancel.png') ?>" width="20px" height="20px" title="Belum Acc"/></div>';
          }

          Baris += '</td>';
          Baris += '<td>'+id_permintaan+'</td>';
          Baris += '<td>'+tgl_permintaan+'</td>';
          Baris += '<td>'+nama_unit+'</td>';
          Baris += '<td>'+user+'</td>';
          Baris += "</tr>";
        }
        $('#gudang_pengeluaran_listpermintaan_unit_table tbody').append(Baris);
      }else{
        toastr.error("Data tidak ditemukan");
        var Baris = '<tr>';  
            Baris += '<td colspan="6" align="center"><h6>Belum Ada Permintaan<h6></td>';
            Baris += "</tr>";

        $('#gudang_pengeluaran_listpermintaan_unit_table tbody').append(Baris);
        document.getElementById('gudang_pengeluaran_listpermintaan_unit_nomor').value= '';
      }
    }
  });  
}
function vGudBarangOut(no_obat_out, tgl_obat_out, id_unit, nama_unit, posting, remark){
  var json_data = {
    'vGudBarangOut_no'      : no_obat_out,
    'vGudBarangOut_tgl'     : tgl_obat_out.replace(/ /g, '%20'),
    'vGudBarangOut_idunit'  : id_unit,
    'vGudBarangOut_nama'    : nama_unit.replace(/ /g, '%20'),
    'vGudBarangOut_posting' : posting,
    'vGudBarangOut_remark'  : remark.replace(/ /g, '%20'),
  };

  var data = JSON.stringify(json_data);
  // if (posting == '0'){
    $('#gudang_pengeluaran_unit').hide();
    $('#gudang_pengeluaran_listpermintaan').hide();
    $('.gudangOut').load('Gudang/addnewOut?data='+ data);
  // }else{
  //   sukses("Sudah di Posting", '');
  // }
}

function gudang_pengeluaran_unit_addnew(){
  var json_data = {
    'vGudBarangOut_no'      : '',
    'vGudBarangOut_tgl'     : nowday,
    'vGudBarangOut_idunit'  : '',
    'vGudBarangOut_nama'    : '',
    'vGudBarangOut_posting' : 'f',
    'vGudBarangOut_remark'  : '',
  };

  var data = JSON.stringify(json_data);

  $('#gudang_pengeluaran_unit').hide();
  $('#gudang_pengeluaran_listpermintaan').hide();
  $('.gudangOut').load('Gudang/addnewOut?data='+ data);
}

function vGudlistpermintaan_unit(id_permintaan, tgl_permintaan, id_unit, posting, keterangan, no_obat_out, posting_gud){
  var json_data = {
    'vGudlistpermintaan_unit_no_obat_out' : no_obat_out,
    'vGudlistpermintaan_unit_no'          : id_permintaan,
    'vGudlistpermintaan_unit_tgl'         : tgl_permintaan.replace(/ /g, '%20'),
    'vGudlistpermintaan_unit_idunit'      : id_unit,
    'vGudlistpermintaan_unit_posting'     : posting,
    'vGudlistpermintaan_unit_posting_gud' : posting_gud,
    'vGudlistpermintaan_unit_ket'         : keterangan.replace(/ /g, '%20'),
  };

  var data = JSON.stringify(json_data);
  $('#gudang_pengeluaran_unit').hide();
  $('#gudang_pengeluaran_listpermintaan').hide();
  $('.gudangOut').load('Gudang/addnewOutACCPermintaan?data='+ data);
}
</script>