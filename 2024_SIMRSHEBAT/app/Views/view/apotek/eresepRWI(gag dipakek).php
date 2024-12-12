<?php $nowday       = date('Y-m-d'); ?>
<div class="col-md-12 p-2" id="eresepRWI_listpasien1">
  <div class="card card-outline card-default mb-0">
    
    <div class="card-body p-2 darkgrey-custom">
      <div class="row row-custom">
        <div class="col-sm-auto">
          <div class="form-group">
            <label for="eresepRWI_noorder">No. Order Resep :</label>
            <input type="search" class="form-control form-control-xs" placeholder="Entry No. Order" id="eresepRWI_noorder" name="eresepRWI_noorder" onchange="eresepRWI_showdataOrderResep()">
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label for="eresepRWI_criby_norm">Cari No. RM / Nama Pasien :</label>
            <div class="input-group input-group-sm mb-3">
              <div class="input-group-prepend">                
                <button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="height:25px;"></button>
                <ul class="dropdown-menu">
                  <li class="dropdown-item" onclick="show_cri_normResepRWI()">No. RekamMedik</li>
                  <li class="dropdown-item" onclick="show_cri_nmpasienResepRWI()">Nama Pasien</li>
                </ul>
              </div>
              <!-- /btn-group -->
              <input type="search" class="form-control form-control-xs" placeholder="Entry No. RM" id="eresepRWI_criby_norm" name="eresepRWI_criby_norm" onchange="eresepRWI_showdataOrderResep()">
              <input type="search" class="form-control form-control-xs" placeholder="Entry Nama Pasien" id="eresepRWI_criby_nmapasien" name="eresepRWI_criby_nmapasien" onchange="eresepRWI_showdataOrderResep()">
            </div>
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label for="eresepRWI_tglawal">Tgl. Order :</label>
            <input type="date" class="form-control form-control-xs" id="eresepRWI_tglawal" name="eresepRWI_tglawal" onkeypress="eresepRWI_showdataOrderResep()">
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label for="eresepRWI_tglakhir">s/d</label>
            <input type="date" class="form-control form-control-xs" id="eresepRWI_tglakhir" name="eresepRWI_tglakhir" onkeypress="eresepRWI_showdataOrderResep()">
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label for="eresepRWI_stsorder">Status Order :</label>
            <select class="form-control form-control-xs" id="eresepRWI_stsorder" name="eresepRWI_stsorder" onchange="eresepRWI_showdataOrderResep()">
              <option value="0">Belum Dilayani</option>
              <option value="1">Dilayani</option>
            </select>
          </div>
        </div>        
        <div class="col-sm-auto">
          <div class="form-group">
            <label for="eresepRWI_unitPoli">Poliklinik :</label>
            <select class="form-control form-control-xs" id="eresepRWI_unitPoli" name="eresepRWI_unitPoli" onchange="eresepRWI_showdataOrderResep()"></select>
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label for="eresepRWI_jmlorder">Jumlh Order :</label>
            <select class="form-control form-control-xs" id="eresepRWI_jmlorder" name="eresepRWI_jmlorder" onchange="eresepRWI_showdataOrderResep()">
              <option value="10">10 Order</option>
              <option value="20">20 Order</option>
              <option value="30">30 Order</option>
              <option value="40">40 Order</option> 
              <option value="50">50 Order</option>
              <option value="0">Semua Order</option>
            </select>
          </div>
        </div>      
      </div>
    </div>
  </div>   
</div>

<div class="col-md-12 p-2" id="eresepRWI_listpasien2">
  <div class="card card-outline">
    <div class="overlay-wrapper" id="eresepRWI_loadingawal">
      <div class="overlay">
        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
      </div>
    </div>
    
    <div class="card-body p-1" style="max-height: 420px; overflow: auto;">
      <div class="card" style="box-shadow: 0 0 3px #343a40; margin-bottom: 0;">
        <div>
          <div class="card-header p-1">
            <div class="row">
              <div class="col-md-12">
                <h6 class="hr6-custom"><i class="fas fa-heartbeat"></i> Daftar Order E-Resep Rawat Inap</h6>
                <!-- <div>
                  <button type="button" class="btn bg-gradient-warning btn-xs" type="submit" id='resepRWI_btn_editresep' onclick="viewmodel_eresepRWI()"><i class="fas fa-user-plus"></i> Tambah Order Resep</button> 
                </div> -->
              </div>
            </div>
            <!-- END LETAK BUTTON -->            
          </div>
        </div>
      </div>

      <table id="eresepRWI_daftarorder" class="table table-striped table-sm choose">
        <thead>
          <tr>
            <th class="pl-0" width="10" style="text-align:center;">No.</th>          
            <th width="90"></th>
            <th width="80">No.Transaksi</th>
            <th width="100">Tgl.Order</th>
            <th width="80">No.Order</th>
            <th width="90">No. RM</th>
            <th>Nama Pasien</th>
            <th width="150">Poliklinik</th>            
            <th width="240">Dokter</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>      
    </div>

  </div>  
</div>

<div class="eresepRWIAPT_content"></div>
<div class="eresepRWIAPT_contentobat"></div>

<script type="text/javascript">  
var nowday = "<?php echo $nowday ?>";

document.getElementById('eresepRWI_tglawal').value          = '2023-08-01';
document.getElementById('eresepRWI_tglakhir').value         = nowday;
document.getElementById('eresepRWI_criby_norm').hidden      = false;
document.getElementById('eresepRWI_criby_nmapasien').hidden = true;

var eresepRWITglAwal = "eresepRWI_tglawal";
var eresepRWITglAkhr = "eresepRWI_tglakhir";
max_date(eresepRWITglAwal);
max_date(eresepRWITglAkhr);

eresepRWI_unit();
eresepRWI_showdataOrderResep();

function eresepRWI_unit() {
  apiPOST('Rawatjalan/unit', null, hasil => {
    var data = hasil['data'];
    var unit = '';
      unit += '<option value="0">Semua Poli</option>';
    for (var i = 0; i < data.length; i++) {
      unit += '<option value="'+ data[i]['id_unit'] +'">'+ data[i]['nama_unit'].toUpperCase()+'</option>';
    }
    document.getElementById('eresepRWI_unitPoli').innerHTML = unit;
  });
}

function show_cri_normResepRWI(){
  document.getElementById('eresepRWI_criby_norm').hidden      = false;
  document.getElementById('eresepRWI_criby_nmapasien').hidden = true;
  $("#eresepRWI_criby_norm").trigger('focus');
}

function show_cri_nmpasienResepRWI(){
  document.getElementById('eresepRWI_criby_norm').hidden      = true;
  document.getElementById('eresepRWI_criby_nmapasien').hidden = false;
  $("#eresepRWI_criby_nmapasien").trigger('focus');
}

function eresepRWI_showdataOrderResep(){
  $('#eresepRWI_loadingawal').show();
  var listParam = [
    'eresepRWI_criby_norm', 'eresepRWI_criby_nmapasien'
  ];

  var param = {
    noorder   : document.getElementById('eresepRWI_noorder').value,
    norm      : document.getElementById('eresepRWI_criby_norm').value,
    nmpasien  : document.getElementById('eresepRWI_criby_nmapasien').value,
    tglorder1 : document.getElementById('eresepRWI_tglawal').value,
    tglorder2 : document.getElementById('eresepRWI_tglakhir').value,
    stsorder  : document.getElementById('eresepRWI_stsorder').value,
    poli      : document.getElementById('eresepRWI_unitPoli').value,
    jmlh      : document.getElementById('eresepRWI_jmlorder').value,
  };

  apiPOST("Apotek/eresepRWI_listorder", param, hasil => {   
    $('#eresepRWI_loadingawal').hide();
    $('#eresepRWI_daftarorder tbody').html('');

    if (hasil['data'] !== null) {
      if (hasil['code'] == 'XX') {
        toastr.error("Data tidak ditemukan");
        var Baris = '<tr>';  
        //for (var i = 0; i < 19; i++) {
          Baris += '<td colspan="9" align="center"><h6>Belum Ada Order Resep<h6></td>';
          Baris += "</tr>";
        //}

        $('#eresepRWI_daftarorder tbody').append(Baris);
        document.getElementById('eresepRWI_criby_norm').value     = '';
        document.getElementById('eresepRWI_criby_nmapasien').value = '';
      
      }else{

        var Baris = "";
        var a = hasil['data'];
        var b = hasil['penjamin'];
        for (var i = 0; i < a.length; i++) {
          var id_trans  = a[i].id_transaksi;
          var id_kunj   = a[i].id_kunjungan;
          var tglkunj   = a[i].tgl_masuk;
          var id_order  = a[i].id_order;
          var id_unit   = a[i].id_unit;
          var unit      = a[i].nama_unit;
          var id_dokter = a[i].id_pegawai;
          var dokter    = a[i].nama_pegawai;
          var diag      = a[i].cat_diagnosa;
          var iter      = a[i].cat_iter;
          var order_mng = a[i].order_mng;
          var tglorder  = a[i].tglorder;
          var no_rm     = a[i].no_rm;
          var nm_pasien = a[i].nama;
          var telepon   = a[i].telepon;
          var tgllahir  = a[i].tgl_lahir;
          var dilayani  = a[i].dilayani;
          var dilayaniFar  = a[i].dilayanifar;
          var tgl_tutup = a[i].tgl_tutup;
          var no = i + 1;
                    
          Baris += '<tr onclick="vOrderResepDokterRWI('+"'"+id_kunj+"','"+id_order+"','"+id_unit+"','"+unit+"','"+id_dokter+"','"+diag+"','"+iter+"','"+order_mng+"','"+tglorder+"','"+no_rm+"','"+nm_pasien+"','"+tglkunj+"','"+tgllahir+"','"+telepon+"','"+dokter+"','"+id_trans+"','"+tgl_tutup+"'"+')">';
          Baris += '<td>'+no+'</td>';
          Baris += '<td style="display: flex;">';
          if (dilayani == 1){
            Baris += '&nbsp;<div class="col-sm-1" style="display:contents;"><img src="<?= base_url('_assets/dist/img/checklist.png') ?>" width="20px" height="20px" title="Sudah Dilayani"/></div>';
          }else{
            Baris += '&nbsp;<div class="col-sm-1" style="display:contents;"><img src="<?= base_url('_assets/dist/img/cancel.png') ?>" width="20px" height="20px" title="Belum Dilayani"/></div>';
          }
          if (dilayaniFar == 1){
            Baris += '&nbsp;<div class="col-sm-1" style="display:contents;"><img src="<?= base_url('_assets/dist/img/checklist.png') ?>" width="20px" height="20px" title="Sudah Transfer"/></div>';
          }else{
            Baris += '&nbsp;<div class="col-sm-1" style="display:contents;"><img src="<?= base_url('_assets/dist/img/cancel.png') ?>" width="20px" height="20px" title="Belum Transfer"/></div>';
          }
          Baris += '</td>';
          Baris += '<td>'+id_trans+'</td>';
          Baris += '<td>'+tglorder+'</td>';
          Baris += '<td>'+id_order+'</td>';
          Baris += '<td>'+no_rm+'</td>';
          Baris += '<td>'+nm_pasien.toUpperCase()+'</td>';
          // Baris += '<td>'+penjamin.toUpperCase()+'</td>';
          Baris += '<td>'+unit.toUpperCase()+'</td>';
          // if (id_penjamin != '1'){
          //   Baris += '<td>'+no_sjp+'</td>';
          // }else{
          //   Baris += '<td>-</td>';
          // }
          Baris += '<td>'+dokter.toUpperCase()+'</td>';
          Baris += "</tr>";
        }
        $('#eresepRWI_daftarorder tbody').append(Baris);
      }       
    }

  });  

}

function vOrderResepDokterRWI(id_kunj, id_order, id_unit, unit, id_dokter, diag, iter, order_mng, tglorder, no_rm, nm_pasien, tglkunj, tgllahir, telepon, dokter, id_trans, tgl_tutup){
  
  var json_data = {
    'veresepRWI_APT_id_transaksi' : id_trans,
    'veresepRWI_APT_id_order'     : id_order,
    'veresepRWI_APT_id_kunj'      : id_kunj,
    'veresepRWI_APT_tgl_kunj'     : tglkunj,
    'veresepRWI_APT_tgl_ord'      : tglorder,
    'veresepRWI_APT_no_rm'        : no_rm,
    'veresepRWI_APT_nama'         : nm_pasien.replace(/ /g, '%20'),
    'veresepRWI_APT_umur'         : tgllahir,
    // 'veresepRWI_APT_penjamin' : penjamin.replace(/ /g, '%20'),        
    // 'veresepRWI_APT_sep'      : no_sjp,
    'veresepRWI_APT_telp'         : telepon,
    'veresepRWI_APT_idunit'       : id_unit,
    'veresepRWI_APT_unit'         : unit.replace(/ /g, '%20'),
    'veresepRWI_APT_iddokter'     : id_dokter,
    'veresepRWI_APT_dokter'       : dokter.replace(/ /g, '%20'),
  };

  var data = JSON.stringify(json_data);
 //if (tgl_tutup == 'null'){
    $('#eresepRWI_listpasien1').hide();
    $('#eresepRWI_listpasien2').hide();
    $('.eresepRWIAPT_content').load('Apotek/eresepRWIAPT?data='+ data);
  // }else{
  //   sukses("Transaksi Sudah Di Tutup !!\nHub. Kasir", '');
  // }
  
}
/*
function viewmodel_eresepRWI(){
	$('.eresepRWIAPT_contentobat').load('Apotek/erm_eresepGabung?data=');
}*/
</script>