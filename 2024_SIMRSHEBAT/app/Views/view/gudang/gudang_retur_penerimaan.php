<?php
$nowday     = date('Y-m-d');
//$nextday    = date('Y-m-d', strtotime('+1 days', strtotime($nowday))); 
$nextday    = $nowday; 
?>
<div class="col-md-12 p-2" id="gudang_returpembelian_awal">
  <div class="card card-outline card-default" style="margin-bottom:0;">
    
    <div class="card-body p-2 darkgrey-custom">
      <div class="row row-custom">
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Nomor Retur:</label>
            <input type="text" class="form-control form-control-xs" placeholder="Entry Nomor Retur" id="gudang_returpembelian_nomor" onchange="gudang_returpembelian_showdata()">
          </div>
        </div>
        
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Tgl. Retur :</label>
            <input type="date" class="form-control form-control-xs" id="gudang_returpembelian_tglawal" onkeypress="gudang_returpembelian_showdata()">
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label>s/d</label>
            <input type="date" class="form-control form-control-xs" id="gudang_returpembelian_tglakhr" onkeypress="gudang_returpembelian_showdata()">
          </div>
        </div>
        
        <div class="col-sm-auto">
          <div class="form-group">
            <label>PBF :</label>
            <select class="form-control form-control-xs" id="gudang_returpembelian_vendor" onchange="gudang_returpembelian_showdata()"></select>
          </div>
        </div>

        <div class="col-sm-auto">
          <div class="form-group">
            <label>Jumlah Data :</label>
            <select class="form-control form-control-xs" id="gudang_returpembelian_jmlh" onchange="gudang_returpembelian_showdata()">
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


<div class="col-md-12 p-2" id="gudang_returpembelian_kedua">
  <div class="card card-outline">
    <div class="overlay-wrapper" id="gudang_returpembelian_loading">
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
                <h6 class="hr6-custom"><i class="fas fa-heartbeat"></i> Retur Pembelian Obat</h6>
                <div>
                  <button type="button" class="btn bg-gradient-warning btn-xs" onclick="gudang_returpembelian_addnew()"> <i class="fas fa-plus"></i> Tambah Retur</button>
                </div>
              </div>
            </div>         
          </div>
        </div>
      </div>

      <table id="gudang_returpembelian_table" class="table table-striped table-sm choose" style="border-collapse: inherit;">
        <thead>
          <tr>
            <th width="15" align="center">#</th>
            <th width="30">Status</th>
            <th width="150">No. Retur</th>
            <th width="100">PBF</th>
            <th width="150">Tgl Retur</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>      
    </div>

  </div>  
</div>

<div class="gudangRetur"></div>

<script type="text/javascript">  
var nowday      = "<?php echo $nowday; ?>";
var nextday     = "<?php echo $nextday; ?>";

document.getElementById('gudang_returpembelian_tglawal').value = nowday;
document.getElementById('gudang_returpembelian_tglakhr').value = nextday;

var a = "gudang_returpembelian_tglawal";
max_date(a);
var b = "gudang_returpembelian_tglakhr";
max_date(b);

gudang_returpembelian_vendor();
gudang_returpembelian_showdata();

function gudang_returpembelian_vendor() {
  apiPOST('Setup/vendor', null, hasil => {
    var data = hasil['data'];
    var ven = '';
      ven += '<option value="">Semua PBF</option>';
    for (var i = 0; i < data.length; i++) {
      ven += '<option value="'+ data[i]['kd_vendor'] +'">'+ data[i]['nama']+'</option>';
    }
    document.getElementById('gudang_returpembelian_vendor').innerHTML = ven;
  });
}

function gudang_returpembelian_showdata(){  
  $('#gudang_returpembelian_loading').show();
 
  var param = {
    noretur : document.getElementById('gudang_returpembelian_nomor').value,
    tglsatu : document.getElementById('gudang_returpembelian_tglawal').value,
    tgldua  : document.getElementById('gudang_returpembelian_tglakhr').value,
    pbf     : document.getElementById('gudang_returpembelian_vendor').value,
    jmlh    : document.getElementById('gudang_returpembelian_jmlh').value,
    iduser  : user['id_user'],
  };

  apiPOST("Gudang/gud_returpembelian_showdata", param, hasil => {   
    $('#gudang_returpembelian_loading').hide();
    $('#gudang_returpembelian_table tbody').html('');

    if (hasil['data'] !== null) {
        
      var a = hasil['data'];
      if (a.length > 0){
        var Baris = "";
        for (var i = 0; i < a.length; i++) {
          var no_ret      = a[i].no_ret;
          var tgl_ret     = a[i].tgl_ret;
          var kd_vendor   = a[i].kd_vendor;
          var nama        = a[i].nama;
          var posting     = a[i].posting;
          var remark      = a[i].remark;
          var no = i + 1;
          
          Baris += '<tr onclick="vGudRetur('+"'"+no_ret+"','"+tgl_ret+"','"+kd_vendor+"','"+nama+"','"+posting+"','"+remark+"'"+')">';
          Baris += '<td style="text-align:center;">'+no+'</td>';
          Baris += '<td>';
          if (posting == 't'){
            Baris += '&nbsp;<div class="col-sm-1" style="display:contents;"><img src="<?= base_url('_assets/dist/img/checklist.png') ?>" width="20px" height="20px" title="Posting"/></div>';
          }else{
            Baris += '&nbsp;<div class="col-sm-1" style="display:contents;"><img src="<?= base_url('_assets/dist/img/cancel.png') ?>" width="20px" height="20px" title="Belum Posting"/></div>';
          }

          Baris += '</td>';
          Baris += '<td>'+no_ret+'</td>';
          Baris += '<td>'+nama+'</td>';
          Baris += '<td>'+tgl_ret+'</td>';
          Baris += "</tr>";
        }
        $('#gudang_returpembelian_table tbody').append(Baris);
      }else{
        toastr.error("Data tidak ditemukan");
        var Baris = '<tr>';  
            Baris += '<td colspan="5" align="center"><h6>Belum Ada Retur Pembelian<h6></td>';
            Baris += "</tr>";

        $('#gudang_returpembelian_table tbody').append(Baris);
        document.getElementById('gudang_returpembelian_nomor').value     = '';
      }
    }

  });  
  
}

function vGudRetur(no_ret, tgl_ret, kd_vendor, nama, posting, remark){
  var json_data = {
    'vGudRetur_no'      : no_ret,
    'vGudRetur_tgl'     : tgl_ret.replace(/ /g, '%20'),
    'vGudRetur_kdvendor': kd_vendor,
    'vGudRetur_nama'    : nama.replace(/ /g, '%20'),
    'vGudRetur_posting' : posting,
    'vGudRetur_remark'  : remark.replace(/ /g, '%20'),
  };

  var data = JSON.stringify(json_data);
  
  $('#gudang_returpembelian_awal').hide();
  $('#gudang_returpembelian_kedua').hide();
  $('.gudangRetur').load('Gudang/addnewRetur?data='+ data);
}

function gudang_returpembelian_addnew(){
  var json_data = {
    'vGudRetur_no'      : '',
    'vGudRetur_tgl'     : nowday,
    'vGudRetur_kdvendor': '0',
    'vGudRetur_nama'    : '',
    'vGudRetur_posting' : 'f',
    'vGudRetur_remark'  : '',
  };

  var data = JSON.stringify(json_data);
  $('#gudang_returpembelian_awal').hide();
  $('#gudang_returpembelian_kedua').hide();
  $('.gudangRetur').load('Gudang/addnewRetur?data='+ data);
}

</script>