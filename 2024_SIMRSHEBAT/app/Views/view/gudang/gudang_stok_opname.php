<?php
date_default_timezone_set("Asia/Jakarta");
$nowday     = date('Y-m-d');
$nextday    = $nowday; 
?>
<div class="col-md-12 p-2" id="gudang_stok_opname_awal">
  <div class="card card-outline card-default" style="margin-bottom:0;">
    
    <div class="card-body p-2 darkgrey-custom">
      <div class="row row-custom">
        <div class="col-sm-auto">
          <div class="form-group">
            <label>No. SO :</label>
            <input type="text" class="form-control form-control-xs" placeholder="Entry Nomor" id="gudang_stok_opname_nomor" onchange="gudang_stok_opname_showdata()">
          </div>
        </div>
        
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Tgl. SO :</label>
            <input type="date" class="form-control form-control-xs" id="gudang_stok_opname_tglawal" onkeypress="gudang_stok_opname_showdata()">
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label>s/d</label>
            <input type="date" class="form-control form-control-xs" id="gudang_stok_opname_tglakhr" onkeypress="gudang_stok_opname_showdata()">
          </div>
        </div>
        
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Unit :</label>
            <select class="form-control form-control-xs" id="gudang_stok_opname_unitdepo" onchange="gudang_stok_opname_showdata()"></select>
          </div>
        </div>        
        
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Jumlah Data :</label>
            <select class="form-control form-control-xs" id="gudang_stok_opname_jmlh" onchange="gudang_stok_opname_showdata()">
              <option value="10">10 Data</option>
              <option value="20">20 Data</option>
              <option value="30">30 Data</option>
              <option value="50">50 Data</option>
              <option value="100">100 Data</option>
              <option value="0">Tampilkan Semua</option>
            </select>
          </div>
        </div>      
      </div>
    </div>
    <!-- card-outline -->
  </div>   
</div>


<div class="col-md-12 p-2" id="gudang_stok_opname_kedua">
  <div class="card card-outline">
    <div class="overlay-wrapper" id="gudang_stok_opname_loading">
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
                <h6 class="hr6-custom"><i class="fas fa-heartbeat"></i> Daftar Stok Opname</h6>
                <div>
                  <button type="button" class="btn bg-gradient-warning btn-xs" onclick="gudang_stok_opname_addnew()"> <i class="fas fa-plus"></i> Tambah Stok Opname</button>
                </div>
              </div>
            </div>         
          </div>
        </div>
      </div>

      <table id="gudang_stok_opname_table" class="table table-striped table-sm choose" style="border-collapse: inherit;">
        <thead>
          <tr>
            <th width="15">#</th>
            <th width="80">Status</th>
            <th width="100">No. Stok Opname</th>
            <th width="100">Unit</th>
            <th width="150">No. BA</th>
            <th width="150">Tgl. Created</th>
            <th>User</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>      
    </div>

  </div>  
</div>

<div class="stokopnameView"></div>
<div class="stokopnameView2"></div>

<script type="text/javascript">  
var nowday      = "<?php echo $nowday; ?>";
var nextday     = "<?php echo $nextday; ?>";

document.getElementById('gudang_stok_opname_tglawal').value = nowday;
document.getElementById('gudang_stok_opname_tglakhr').value = nextday;

var a = "gudang_stok_opname_tglawal";
max_date(a);
var b = "gudang_stok_opname_tglakhr";
max_date(b);

gudang_stok_opname_unitdepo();
gudang_stok_opname_showdata();

function gudang_stok_opname_unitdepo() {
  apiPOST('Setup/getUnitFarmasi', {id_unit : '4004'}, hasil => {
    var data = hasil['data'];
    var nit = '';
      nit += '<option value="">Semua Unit</option>';
    for (var i = 0; i < data.length; i++) {
      nit += '<option value="'+ data[i]['id_unit'] +'">'+ data[i]['nama_unit']+'</option>';
    }
    document.getElementById('gudang_stok_opname_unitdepo').innerHTML = nit;
  });
}

function gudang_stok_opname_showdata(){  
   $('#gudang_stok_opname_loading').show();
  var listParam = [
    'gudang_stok_opname_nomor'
  ];

  var param = {
    no_so   : document.getElementById('gudang_stok_opname_nomor').value,
    tglsatu : document.getElementById('gudang_stok_opname_tglawal').value,
    tgldua  : document.getElementById('gudang_stok_opname_tglakhr').value,
    unit    : document.getElementById('gudang_stok_opname_unitdepo').value,
    jmlh    : document.getElementById('gudang_stok_opname_jmlh').value,
    iduser  : user['id_user'],
  };

  apiPOST("Gudang/gud_stok_opname_showdata", param, hasil => {   
    $('#gudang_stok_opname_loading').hide();
    $('#gudang_stok_opname_table tbody').html('');

    if (hasil['data'] !== null) {
        
      var a = hasil['data'];
      if (a.length > 0){
        var Baris = "";
        for (var i = 0; i < a.length; i++) {
          var no_so       = a[i].no_so;
          var tgl_so      = a[i].tgl_so;
          var id_unit     = a[i].id_unit;
          var nama_unit   = a[i].nama_unit;
          var nama        = a[i].nama_pegawai;
          var posting     = a[i].posting;
          var nobaso      = a[i].no_ba_so;
          var ket_so      = a[i].ket_so;
          var no = i + 1;
          
          Baris += '<tr onclick="vStokOpname('+"'"+no_so+"','"+tgl_so+"','"+id_unit+"','"+nama_unit+"','"+posting+"','"+nobaso+"','"+ket_so+"'"+')">';
          Baris += '<td>'+no+'</td>';
          Baris += '<td>';
          if (posting == 't'){
            Baris += '&nbsp;<div class="col-sm-1" style="display:contents;"><img src="<?= base_url('_assets/dist/img/checklist.png') ?>" width="20px" height="20px" title="Posting"/></div>';
          }else{
            Baris += '&nbsp;<div class="col-sm-1" style="display:contents;"><img src="<?= base_url('_assets/dist/img/cancel.png') ?>" width="20px" height="20px" title="Belum Posting"/></div>';
          }

          Baris += '</td>';
          Baris += '<td>'+no_so+'</td>';
          Baris += '<td>'+nama_unit+'</td>';
          Baris += '<td>'+nobaso+'</td>';
          Baris += '<td>'+tgl_so+'</td>';
          Baris += '<td>'+nama+'</td>';
          Baris += "</tr>";
        }
        $('#gudang_stok_opname_table tbody').append(Baris);

      }else{

        toastr.error("Data tidak ditemukan");
        var Baris = '<tr>';  
            Baris += '<td colspan="7" align="center"><h6>Belum Ada Stok Opname<h6></td>';
            Baris += "</tr>";

        $('#gudang_stok_opname_table tbody').append(Baris);
        document.getElementById('gudang_stok_opname_nomor').value = '';
      }
    }

  });  
  
}

function vStokOpname(no_so, tgl_so, id_unit, nama_unit, posting, nobaso, ket_so){
  var json_data = {
    'vStokOpname_noso'      : no_so,
    'vStokOpname_tglso'     : tgl_so,
    'vStokOpname_idunit'    : id_unit,
    'vStokOpname_nama_unit' : nama_unit.replace(/ /g, '%20'),
    'vStokOpname_posting'   : posting,
    'vStokOpname_noba'      : nobaso.replace(/ /g, '%20'),
    'vStokOpname_ket_so'    : ket_so.replace(/ /g, '%20')
  };

  var data = JSON.stringify(json_data);
  $('#gudang_stok_opname_awal').hide();
  $('#gudang_stok_opname_kedua').hide();
  $('.stokopnameView').load('Gudang/addnewStokOpname?data='+ data);
}

function gudang_stok_opname_addnew(){
  var json_data = {
    'vStokOpname_noso'      : '',
    'vStokOpname_tglso'     : nowday,
    'vStokOpname_idunit'    : '0',
    'vStokOpname_nama_unit' : '',
    'vStokOpname_posting'   : 'f',
    'vStokOpname_noba'      : '',
    'vStokOpname_ket_so'    : ''
  };

  var data = JSON.stringify(json_data);
  $('#gudang_stok_opname_awal').hide();
  $('#gudang_stok_opname_kedua').hide();
  $('.stokopnameView').load('Gudang/addnewStokOpname?data='+ data);
}
</script>