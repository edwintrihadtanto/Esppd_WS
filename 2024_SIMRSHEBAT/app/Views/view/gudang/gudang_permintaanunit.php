<?php
date_default_timezone_set("Asia/Jakarta");
$nowday     = date('Y-m-d');
$nextday    = $nowday; 
?>
<div class="col-md-12 p-2" id="gudang_permintaanunit">
  <div class="card card-outline card-default" style="margin-bottom:0;">
    
    <div class="card-body p-2 darkgrey-custom">
      <div class="row row-custom">
        <div class="col-sm-2">
          <div class="form-group">
            <label>No. Permintaan :</label>
            <input type="text" class="form-control form-control-xs" placeholder="Entry Nomor" id="gudang_permintaanunit_nomor" onchange="gudang_permintaanunit_showdata()">
          </div>
        </div>

        <div class="col-sm-auto">
          <div class="form-group">
            <label>Tgl. Permintaan :</label>
            <input type="date" class="form-control form-control-xs" id="gudang_permintaanunit_tglawal" onkeypress="gudang_permintaanunit_showdata()">
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label>s/d</label>
            <input type="date" class="form-control form-control-xs" id="gudang_permintaanunit_tglakhr" onkeypress="gudang_permintaanunit_showdata()">
          </div>
        </div>
        
        <div class="col-sm-2">
          <div class="form-group">
            <label>Unit Tujuan:</label>
            <select class="form-control form-control-xs" id="gudang_permintaanunit_unit" onchange="gudang_permintaanunit_showdata()"></select>
          </div>
        </div>

        <div class="col-sm-2">
          <div class="form-group">
            <label>Posting</label>
            <select class="form-control form-control-xs" id="gudang_permintaanunit_posting" onchange="gudang_permintaanunit_showdata()">
              <option value="">Tampilkan Semua</option>
              <option value="t">Posting</option>
              <option value="f">Belum Posting</option>
            </select>
          </div>
        </div>
        
        <div class="col-sm-1">
          <div class="form-group">
            <label>Jumlah Data :</label>
            <select class="form-control form-control-xs" id="gudang_permintaanunit_jmlh" onchange="gudang_permintaanunit_showdata()">
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


<div class="col-md-12 p-2" id="gudang_permintaanunit_kedua">
  <div class="card card-outline">
    <div class="overlay-wrapper" id="gudang_permintaanunit_loading">
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
                <h6 class="hr6-custom"><i class="fas fa-heartbeat"></i> Daftar Permintaan Obat</h6>
                <div>
                  <button type="button" class="btn bg-gradient-warning btn-xs" onclick="gudang_permintaanunit_addnew()" id="gudang_permintaanunit_addnew"> <i class="fas fa-plus"></i> Tambah Permintaan</button>
                </div>
              </div>
            </div>         
          </div>
        </div>
      </div>

      <table id="gudang_permintaanunit_table" class="table table-striped table-sm choose" style="border-collapse: inherit;">
        <thead>
          <tr>
            <th width="15">#</th>
            <th width="100">Status</th>
            <th width="100">No Permintaan</th>
            <th width="100">Tgl. Permintaan</th>
            <th width="150">Depo / Unit</th>
            <th width="150">Depo / Unit Tujuan</th>
            <th width="250">Kepimilikan</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>      
    </div>

  </div>  
</div>

<div class="gudangObatIn"></div>
<div class="gudangObatIn_contentobat"></div>

<script type="text/javascript">  
var nowday      = "<?php echo $nowday; ?>";
var nextday     = "<?php echo $nextday; ?>";

document.getElementById('gudang_permintaanunit_tglawal').value = nowday;
document.getElementById('gudang_permintaanunit_tglakhr').value = nextday;

var a = "gudang_permintaanunit_tglawal";
max_date(a);
var b = "gudang_permintaanunit_tglakhr";
max_date(b);

gudang_permintaanunit_unit();
gudang_permintaanunit_showdata();
// cekAccJurnalAwal();

function gudang_permintaanunit_unit() {
  var param = {
    id_unit : user['id_far'],
  }
  apiPOST('Apotek/getUnitDepoFarmasi', param, hasil => {
    var data = hasil['data'];
    var ven = '';
      ven += '<option value="0">- Pilih Unit -</option>';
    for (var i = 0; i < data.length; i++) {
      ven += '<option value="'+ data[i]['id_unit'] +'">'+ data[i]['nama_unit'].toUpperCase()+'</option>';
    }
    document.getElementById('gudang_permintaanunit_unit').innerHTML = ven;
  });
}

function gudang_permintaanunit_showdata(){  
   $('#gudang_permintaanunit_loading').show();
  var listParam = [
    'gudang_permintaanunit_nomor'
  ];

  var param = {
    noin    : document.getElementById('gudang_permintaanunit_nomor').value,
    tglsatu : document.getElementById('gudang_permintaanunit_tglawal').value,
    tgldua  : document.getElementById('gudang_permintaanunit_tglakhr').value,
    unit    : document.getElementById('gudang_permintaanunit_unit').value,
    jmlh    : document.getElementById('gudang_permintaanunit_jmlh').value,
    iduser  : user['id_user'],
    posting : document.getElementById('gudang_permintaanunit_posting').value,
    acc     : ''
  };

  apiPOST("Gudang/gud_permintaanObat_showdata", param, hasil => {   
    $('#gudang_permintaanunit_loading').hide();
    $('#gudang_permintaanunit_table tbody').html('');

    if (hasil['data'] !== null) {
        
      var a = hasil['data'];
      if (a.length > 0){
        var Baris = "";
        for (var i = 0; i < a.length; i++) {
          var id_permintaan     = a[i].id_permintaan;
          var tgl_permintaan    = a[i].tgl_permintaan;
          var nama_unit         = a[i].nama_unit;
          var id_unit_tujuan    = a[i].id_unit_tujuan;
          var nama_unit_tujuan  = a[i].nama_unit_tujuan;
          var posting           = a[i].posting;
          var acc               = a[i].acc;
          var milik             = a[i].milik;
          var keterangan        = a[i].keterangan;

          var no = i + 1;
          
          Baris += '<tr onclick="vGudPermintaanObatIn('+"'"+id_permintaan+"','"+tgl_permintaan+"','"+id_unit_tujuan+"','"+keterangan+"','"+posting+"','"+acc+"'"+')">';
          Baris += '<td>'+no+'</td>';
          Baris += '<td>';
          
          if (posting == 't'){
            Baris += '&nbsp;<div class="col-sm-1" style="display:contents;"><img src="<?= base_url('_assets/dist/img/checklist.png') ?>" width="20px" height="20px" title="Posting"/></div>';
          }else{
            Baris += '&nbsp;<div class="col-sm-1" style="display:contents;"><img src="<?= base_url('_assets/dist/img/cancel.png') ?>" width="20px" height="20px" title="Belum Posting"/></div>';
          }

          if (acc == 't'){
            Baris += '&nbsp;<div class="col-sm-1" style="display:contents;"><img src="<?= base_url('_assets/dist/img/checklist.png') ?>" width="20px" height="20px" title="Sudah ACC"/></div>';
          }else{
            Baris += '&nbsp;<div class="col-sm-1" style="display:contents;"><img src="<?= base_url('_assets/dist/img/cancel.png') ?>" width="20px" height="20px" title="Belum ACC"/></div>';
          }

          Baris += '</td>';
          Baris += '<td>'+id_permintaan+'</td>';
          Baris += '<td>'+tgl_permintaan+'</td>';
          Baris += '<td>'+nama_unit+'</td>';
          Baris += '<td>'+nama_unit_tujuan+'</td>';
          Baris += '<td>'+milik+'</td>';
          Baris += "</tr>";
        }
        $('#gudang_permintaanunit_table tbody').append(Baris);
      }else{
        toastr.error("Data tidak ditemukan");
        var Baris = '<tr>';  
            Baris += '<td colspan="7" align="center"><h6>Belum Ada Permintaan Obat Unit<h6></td>';
            Baris += "</tr>";

        $('#gudang_permintaanunit_table tbody').append(Baris);
        document.getElementById('gudang_permintaanunit_nomor').value     = '';
      }
    }

  });  
  
}

function vGudPermintaanObatIn(id_permintaan, tgl_permintaan, id_unit_tujuan, keterangan, posting, acc){
  var json_data = {
    'vGudPermintaanObatIn_no'       : id_permintaan,
    'vGudPermintaanObatIn_tgl'      : tgl_permintaan,
    'vGudPermintaanObatIn_tujuan'   : id_unit_tujuan,
    'vGudPermintaanObatIn_ket'      : keterangan.replace(/ /g, '%20'),
    'vGudPermintaanObatIn_posting'  : posting,
    'vGudPermintaanObatIn_acc'      : acc,
  };

  var data = JSON.stringify(json_data);
  //if (posting == '0'){
    $('#gudang_permintaanunit').hide();
    $('#gudang_permintaanunit_kedua').hide();
    $('.gudangObatIn').load('Gudang/addnewPermintaan?data='+ data);
  // }else{
  //   sukses("Sudah di Posting", '');
  // }

}

function gudang_permintaanunit_addnew(){
  var json_data = {
    'vGudPermintaanObatIn_no'      : '',
    'vGudPermintaanObatIn_tgl'     : nowday,
    'vGudPermintaanObatIn_tujuan'  : 0,
    'vGudPermintaanObatIn_ket'     : '',
    'vGudPermintaanObatIn_posting' : 'f',
    'vGudPermintaanObatIn_acc'     : 'f',

  };

  var data = JSON.stringify(json_data);
  $('#gudang_permintaanunit').hide();
  $('#gudang_permintaanunit_kedua').hide();
  $('.gudangObatIn').load('Gudang/addnewPermintaan?data='+ data);
}

function cekAccJurnalAwal(){
  apiPOST('Gudang/cekAccJurnal', {iduser : user['id_user']}, hasil => {
    if (hasil !== null) {
      if (hasil['code'] == '200'){

        if (hasil['data'][0].acc == 't'){
          if (user['id_user'] == '1'){
            document.getElementById("gudang_permintaanunit_addnew").disabled = false;
          }else{
            document.getElementById("gudang_permintaanunit_addnew").disabled = true;
          }
        }
      }

    }
  });
}
</script>