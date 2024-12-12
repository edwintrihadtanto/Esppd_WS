<?php
date_default_timezone_set("Asia/Jakarta");
$nowday     = date('Y-m-d');
$nextday    = $nowday; 
?>
<div class="col-md-12 p-2" id="gudang_penerimaanbarang_awal">
  <div class="card card-outline card-default" style="margin-bottom:0;">
    
    <div class="card-body p-2 darkgrey-custom">
      <div class="row row-custom">
        <div class="col-sm-2">
          <div class="form-group">
            <label>No. Barang :</label>
            <input type="text" class="form-control form-control-xs" placeholder="Entry Nomor" id="gudang_penerimaanbarang_nomor" onchange="gudang_penerimaanbarang_showdata()">
          </div>
        </div>

        <div class="col-sm-2">
          <div class="form-group">
            <label>No. Faktur :</label>
            <input type="text" class="form-control form-control-xs" placeholder="Entry Nomor Faktur" id="gudang_penerimaanbarang_nomorfaktur" onchange="gudang_penerimaanbarang_showdata()">
          </div>
        </div>
        
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Tgl. Barang Masuk :</label>
            <input type="date" class="form-control form-control-xs" id="gudang_penerimaanbarang_tglawal" onkeypress="gudang_penerimaanbarang_showdata()">
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label>s/d</label>
            <input type="date" class="form-control form-control-xs" id="gudang_penerimaanbarang_tglakhr" onkeypress="gudang_penerimaanbarang_showdata()">
          </div>
        </div>
        
        <div class="col-sm-2">
          <div class="form-group">
            <label>PBF :</label>
            <select class="form-control form-control-xs" id="gudang_penerimaanbarang_vendor" onchange="gudang_penerimaanbarang_showdata()"></select>
          </div>
        </div>

        <div class="col-sm-2">
          <div class="form-group">
            <label>Posting</label>
            <select class="form-control form-control-xs" id="gudang_penerimaanbarang_posting" onchange="gudang_penerimaanbarang_showdata()">
              <option value="">Tampilkan Semua</option>
              <option value="t">Posting</option>
              <option value="f">Belum Posting</option>
            </select>
          </div>
        </div>
        
        <div class="col-sm-1">
          <div class="form-group">
            <label>Jumlah Data :</label>
            <select class="form-control form-control-xs" id="gudang_penerimaanbarang_jmlh" onchange="gudang_penerimaanbarang_showdata()">
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


<div class="col-md-12 p-2" id="gudang_penerimaanbarang_kedua">
  <div class="card card-outline">
    <div class="overlay-wrapper" id="gudang_penerimaanbarang_loading">
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
                <h6 class="hr6-custom"><i class="fas fa-heartbeat"></i> Daftar Penerimaan Barang Masuk</h6>
                <div>
                  <button type="button" class="btn bg-gradient-warning btn-xs" onclick="gudang_penerimaanbarang_addnew()" id="gudang_penerimaanbarang_addnew"> <i class="fas fa-plus"></i> Tambah Penerimaan</button>
                </div>
              </div>
            </div>         
          </div>
        </div>
      </div>

      <table id="gudang_penerimaanbarang_table" class="table table-striped table-sm choose" style="border-collapse: inherit;">
        <thead>
          <tr>
            <th width="15">#</th>
            <th width="100">Status</th>
            <th width="100">No Barang</th>
            <th width="150">Tgl. Masuk</th>
            <th>PBF</th>
            <th width="100">No. Faktur</th>
            <th width="250">User</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>      
    </div>

  </div>  
</div>

<div class="gudangIn"></div>
<div class="gudang_contentobat"></div>

<script type="text/javascript">  
var nowday      = "<?php echo $nowday; ?>";
var nextday     = "<?php echo $nextday; ?>";

document.getElementById('gudang_penerimaanbarang_tglawal').value = nowday;
document.getElementById('gudang_penerimaanbarang_tglakhr').value = nextday;

var a = "gudang_penerimaanbarang_tglawal";
max_date(a);
var b = "gudang_penerimaanbarang_tglakhr";
max_date(b);

gudang_penerimaanbarang_vendor();
gudang_penerimaanbarang_showdata();
cekAccJurnalAwal();

function gudang_penerimaanbarang_vendor() {
  apiPOST('Setup/vendor', null, hasil => {
    var data = hasil['data'];
    var ven = '';
      ven += '<option value="">Semua PBF</option>';
    for (var i = 0; i < data.length; i++) {
      ven += '<option value="'+ data[i]['kd_vendor'] +'">'+ data[i]['nama']+'</option>';
    }
    document.getElementById('gudang_penerimaanbarang_vendor').innerHTML = ven;
  });
}

function gudang_penerimaanbarang_showdata(){  
   $('#gudang_penerimaanbarang_loading').show();
  var listParam = [
    'gudang_penerimaanbarang_nomor'
  ];

  var param = {
    noin    : document.getElementById('gudang_penerimaanbarang_nomor').value,
    tglsatu : document.getElementById('gudang_penerimaanbarang_tglawal').value,
    tgldua  : document.getElementById('gudang_penerimaanbarang_tglakhr').value,
    pbf     : document.getElementById('gudang_penerimaanbarang_vendor').value,
    jmlh    : document.getElementById('gudang_penerimaanbarang_jmlh').value,
    iduser  : user['id_user'],
    faktur  : document.getElementById('gudang_penerimaanbarang_nomorfaktur').value,
    posting : document.getElementById('gudang_penerimaanbarang_posting').value
  };

  apiPOST("Gudang/gud_barangIn_showdata", param, hasil => {   
    $('#gudang_penerimaanbarang_loading').hide();
    $('#gudang_penerimaanbarang_table tbody').html('');

    if (hasil['data'] !== null) {
        
      var a = hasil['data'];
      if (a.length > 0){
        var Baris = "";
        for (var i = 0; i < a.length; i++) {
          var no_obat_in  = a[i].no_obat_in;
          var tgl_obat_in = a[i].tgl_obat_in;
          var kd_vendor   = a[i].kd_vendor;
          var nama        = a[i].nm_vendor;
          // var posting     = a[i].posting;
          var posting     = a[i].stsentri;
          var stsacc      = a[i].stsacc;
          var faktur      = a[i].remark;
          var fakturvendor= a[i].fakturpajak;
          var npwp        = a[i].npwp;
          var pegawai     = a[i].pegawai;
          var no = i + 1;
          
          Baris += '<tr onclick="vGudBarangIn('+"'"+no_obat_in+"','"+tgl_obat_in+"','"+kd_vendor+"','"+nama+"','"+posting+"','"+faktur+"','"+stsacc+"','"+fakturvendor+"','"+npwp+"'"+')">';
          Baris += '<td>'+no+'</td>';
          Baris += '<td>';
          
          if (posting == 't'){
            Baris += '&nbsp;<div class="col-sm-1" style="display:contents;"><img src="<?= base_url('_assets/dist/img/checklist.png') ?>" width="20px" height="20px" title="Posting"/></div>';
          }else{
            Baris += '&nbsp;<div class="col-sm-1" style="display:contents;"><img src="<?= base_url('_assets/dist/img/cancel.png') ?>" width="20px" height="20px" title="Belum Posting"/></div>';
          }

          // if (stsentri == 't'){
          //   Baris += '&nbsp;<div class="col-sm-1" style="display:contents;"><img src="<?= base_url('_assets/dist/img/checklist.png') ?>" width="20px" height="20px" title="Sudah Selesai Entry"/></div>';
          // }else{
          //   Baris += '&nbsp;<div class="col-sm-1" style="display:contents;"><img src="<?= base_url('_assets/dist/img/cancel.png') ?>" width="20px" height="20px" title="Belum Selesai Entry"/></div>';
          // }

          if (stsacc == 't'){
            Baris += '&nbsp;<div class="col-sm-1" style="display:contents;"><img src="<?= base_url('_assets/dist/img/checklist.png') ?>" width="20px" height="20px" title="Sudah ACC"/></div>';
          }else{
            Baris += '&nbsp;<div class="col-sm-1" style="display:contents;"><img src="<?= base_url('_assets/dist/img/cancel.png') ?>" width="20px" height="20px" title="Belum ACC"/></div>';
          }

          Baris += '</td>';
          Baris += '<td>'+no_obat_in+'</td>';
          Baris += '<td>'+tgl_obat_in+'</td>';
          Baris += '<td>'+kd_vendor+' / '+nama+'</td>';
          Baris += '<td>'+faktur+'</td>';
          Baris += '<td>'+pegawai+'</td>';
          Baris += "</tr>";
        }
        $('#gudang_penerimaanbarang_table tbody').append(Baris);
      }else{
        toastr.error("Data tidak ditemukan");
        var Baris = '<tr>';  
            Baris += '<td colspan="7" align="center"><h6>Belum Ada Penerimaan Barang Masuk<h6></td>';
            Baris += "</tr>";

        $('#gudang_penerimaanbarang_table tbody').append(Baris);
        document.getElementById('gudang_penerimaanbarang_nomor').value     = '';
      }
    }

  });  
  
}

function vGudBarangIn(no_obat_in, tgl_obat_in, kd_vendor, nama, posting, faktur, stsacc, fakturvendor, npwp){
  var json_data = {
    'vGudBarangIn_no'      : no_obat_in,
    'vGudBarangIn_tgl'     : tgl_obat_in.replace(/ /g, '%20'),
    'vGudBarangIn_kdvendor': kd_vendor,
    'vGudBarangIn_nama'    : nama.replace(/ /g, '%20'),
    'vGudBarangIn_posting' : posting,
    'vGudBarangIn_faktur'  : faktur.replace(/ /g, '%20'),
    'vGudBarangIn_fakturvendor'  : fakturvendor.replace(/ /g, '%20'),
    'vGudBarangIn_npwpvendor'    : npwp.replace(/ /g, '%20'),
    'vGudBarangIn_acc'     : stsacc,
  };

  var data = JSON.stringify(json_data);
  //if (posting == '0'){
    $('#gudang_penerimaanbarang_awal').hide();
    $('#gudang_penerimaanbarang_kedua').hide();
    $('.gudangIn').load('Gudang/addnew?data='+ data);
  // }else{
  //   sukses("Sudah di Posting", '');
  // }

}

function gudang_penerimaanbarang_addnew(){
  var json_data = {
    'vGudBarangIn_no'             : '',
    'vGudBarangIn_tgl'            : nowday,
    'vGudBarangIn_kdvendor'       : 0,
    'vGudBarangIn_nama'           : '',
    'vGudBarangIn_posting'        : 'false',
    'vGudBarangIn_faktur'         : '',
    'vGudBarangIn_fakturvendor'   : '',
    'vGudBarangIn_npwpvendor'     : '',
    'vGudBarangIn_acc'            : '',

  };

  var data = JSON.stringify(json_data);
  $('#gudang_penerimaanbarang_awal').hide();
  $('#gudang_penerimaanbarang_kedua').hide();
  $('.gudangIn').load('Gudang/addnew?data='+ data);
}

function cekAccJurnalAwal(){
  apiPOST('Gudang/cekAccJurnal', {iduser : user['id_user']}, hasil => {
    if (hasil !== null) {
      if (hasil['code'] == '200'){

        if (hasil['data'][0].acc == 't'){
          if (user['id_user'] == '1'){
            document.getElementById("gudang_penerimaanbarang_addnew").disabled = false;
          }else{
            document.getElementById("gudang_penerimaanbarang_addnew").disabled = true;
          }
        }
      }

    }
  });
}
</script>