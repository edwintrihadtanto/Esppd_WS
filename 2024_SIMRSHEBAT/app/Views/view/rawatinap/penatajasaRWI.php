<?php
date_default_timezone_set('Asia/Jakarta');
$nextday    = date('Y-m-d');
$nowday     = date('Y-m-d', strtotime('-31 days', strtotime($nextday))); 
// $nowday     = date('2023-06-01');
//$nextday    = $nowday; 
?>
<div class="col-md-12 p-2" id="penatajasaRWI_1">
  <div class="card card-outline card-default" style="margin-bottom:0;">
    
    <div class="overlay-wrapper" id="penatajasaRWI_loading">
      <div class="overlay">
        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
      </div>
    </div>
 
    <div class="card-body p-2 darkgrey-custom">
      <div class="row row-custom">
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Cari No. RM / Nama Pasien :</label>
            <div class="input-group input-group-sm mb-3">
              <div class="input-group-prepend">                
                <button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="height:25px;"></button>
                <ul class="dropdown-menu">
                  <li class="dropdown-item" onclick="show_cri_normxRWIpenatajasaRWI()">No. RekamMedik</li>
                  <li class="dropdown-item" onclick="show_cri_nmpasienpenatajasaRWI()">Nama Pasien</li>
                </ul>
              </div>
              <!-- /btn-group -->
              <input type="number" class="form-control form-control-xs" placeholder="Entry No. RM" id="cri_by_normpenatajasaRWI">
              <input type="text" class="form-control form-control-xs" placeholder="Entry Nama Pasien" id="cri_by_nmpasienpenatajasaRWI">
            </div>
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label> NIK:</label>
            <input type="search" class="form-control form-control-xs" id="penatajasaRWI_search_nik" placeholder="Entry NIK" autocomplete="off">
          </div>
        </div>
        <!-- <div class="col-sm-auto">
          <div class="form-group">
            <label for="exempel1"> Telp :</label>
            <input type="search" class="form-control form-control-xs" id="penatajasaRWI_search_telp" placeholder="Entry Telp" autocomplete="off">
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label for="exempel1"> Alamat :</label>
            <input type="search" class="form-control form-control-xs" id="penatajasaRWI_search_alamat" placeholder="Entry Alamat" autocomplete="off">
          </div>
        </div> -->
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Kamar :</label>
            <select class="form-control form-control-xs" id="penatajasaRWI_search_unitPoli"></select>
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Posting :</label>
            <select class="form-control form-control-xs" id="penatajasaRWI_search_posting">
              <option value="f"  >Belum Posting</option>
              <option value="t" >Posting</option>
            </select>
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Jumlh Pasien :</label>
            <select class="form-control form-control-xs" id="penatajasaRWI_search_jumlah">
              <option value="5"  >5 Pasien</option>
              <option value="10" >10 Pasien</option>
              <option value="15" >15 Pasien</option>
              <option value="20" >20 Pasien</option>
              <option value="25" >25 Pasien</option>
              <option value="30" >30 Pasien</option>
            </select>
          </div>
        </div>      
      </div>
    </div>
    
    <div class="col-12 p-1">
      <div class="card">
        <div>
          <div class="card-header p-2 darkgrey-custom">
            <div class="row">
              <div class="col-md-8">
                <h6 class="hr6-custom" id="penatajasaRWI_titleheader"><i class="fas fa-users"></i> Daftar Pasien Rawat Inap</h6>
                <!-- <div id="penatajasaRWI_button1">
                  <button type="button" class="btn bg-gradient-secondary btn-xs"> <i class="fas fa-arrow-left"></i></i> Kembali</button>
                </div> -->
              </div>
              <div class="col-md-2">
                <div class="form_group">
                <label>Tgl. Kunjung :</label>
                <input type="date" id="penatajasaRWI_tglkunjungan_start" class="form-control form-control-xs">
                </div>
              </div>
              <div class="col-md-2">
                <div class="form_group">
                <label>s/d</label>
                <input type="date" id="penatajasaRWI_tglkunjungan_end" class="form-control form-control-xs">
                </div>
              </div>
            </div>
          </div>

          <div class="card-body" id='div_penatajasaRWI' style="padding: 0px; max-height: 320px; overflow: auto;">
            <table id="penatajasaRWI_tablepasien" class="table table-striped table-sm choose" style="border-collapse: inherit;">
              <thead>
                <tr>
                  <th width="15">#</th>
                  <th>Id Transaksi</th>
                  <th>No. RM</th>
                  <th>Nama Pasien</th>
                  <th>Alamat(s)</th>
                  <th>Telp</th>
                  <th>Tgl Kunjungan</th>
                  <th>Tgl Keluar</th>
                  <th>Kamar</th>
                  <th>Penjamin</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>

        </div>
      </div>
    </div>

  </div> <!-- card-outline -->
</div> <!-- penatajasaRWI_1 -->

<div class="penatajasaRWI_content"></div>

<script type="text/javascript">
var nowday      = "<?php echo $nowday; ?>";
var nextday      = "<?php echo $nextday; ?>";
show_cri_normxRWIpenatajasaRWI();
penatajasaRWI_unit();
penatajasaRWI_tablepasien();

$("#cri_by_normpenatajasaRWI").keydown(function( event ){
  switch(event.which){
    case 13:
    $('#penatajasaRWI_loading').show();
    penatajasaRWI_tablepasien();    
    break;
  }
});

$("#cri_by_nmpasienpenatajasaRWI").keydown(function( event ){
  switch(event.which){
    case 13:
    $('#penatajasaRWI_loading').show();
    penatajasaRWI_tablepasien();    
    break;
  }
});

$("#penatajasaRWI_search_nik").keydown(function( event ){
  switch(event.which){
    case 13:
    $('#penatajasaRWI_loading').show();
    penatajasaRWI_tablepasien();    
    break;
  }
});

$("#penatajasaRWI_search_unitPoli").change(function( event ){
  $('#penatajasaRWI_loading').show();
  penatajasaRWI_tablepasien();
});

$("#penatajasaRWI_search_posting").change(function( event ){
  $('#penatajasaRWI_loading').show();
  penatajasaRWI_tablepasien();
});

$("#penatajasaRWI_search_jumlah").change(function( event ){
  $('#penatajasaRWI_loading').show();
  penatajasaRWI_tablepasien();
});

$("#penatajasaRWI_tglkunjungan_start").keydown(function( event ){
  switch(event.which){
    case 13:
    $('#penatajasaRWI_loading').show();
    penatajasaRWI_tablepasien();
    break;
  }
});

$("#penatajasaRWI_tglkunjungan_end").keydown(function( event ){
  switch(event.which){
    case 13:
    $('#penatajasaRWI_loading').show();
    penatajasaRWI_tablepasien();
    break;
  }
});

function show_cri_normxRWIpenatajasaRWI(){
  $('#cri_by_normpenatajasaRWI').show();
  $('#cri_by_nmpasienpenatajasaRWI').hide();
  $("#cri_by_normpenatajasaRWI").trigger('focus');
  document.getElementById('penatajasaRWI_tglkunjungan_start').value = nowday;  
  document.getElementById('penatajasaRWI_tglkunjungan_end').value = nextday;
  document.getElementById('cri_by_nmpasienpenatajasaRWI').vsalue = '';
}

function show_cri_nmpasienpenatajasaRWI(){
  $('#cri_by_normpenatajasaRWI').hide();
  $('#cri_by_nmpasienpenatajasaRWI').show();
  $("#cri_by_nmpasienpenatajasaRWI").trigger('focus');
  document.getElementById('cri_by_normpenatajasaRWI').value = '';
}

function penatajasaRWI_unit() {
  apiPOST('Rawat_inap/unit', null, hasil => {
    var data = hasil['data'];
    var unit = '';
      unit += '<option value="0">Semua Kamar</option>';
    for (var i = 0; i < data.length; i++) {
      unit += '<option value="'+ data[i]['id_unit'] +'">'+ data[i]['nama_unit']+'</option>';
    }
    document.getElementById('penatajasaRWI_search_unitPoli').innerHTML = unit;
  });
}

function penatajasaRWI_tablepasien() {
  var user = JSON.parse(localStorage['data_user']);
    var id_user = user['id_user'];
  var normRWI = document.getElementById('cri_by_normpenatajasaRWI').value;
  // document.getElementById('cri_by_normpenatajasaRWI').value = normOtomatis(normRWI);
  $('#penatajasaRWI_loading').show();
  var listParam = [
    'cri_by_normpenatajasaRWI', 'cri_by_nmpasienpenatajasaRWI', 'penatajasaRWI_search_nik', 'penatajasaRWI_search_telp', 'penatajasaRWI_search_alamat', 'penatajasaRWI_search_unitPoli', 'penatajasaRWI_tglkunjungan_start', 'penatajasaRWI_tglkunjungan_end'
  ];
  var param = {
    norm    : normRWI,
    nmpasien: document.getElementById('cri_by_nmpasienpenatajasaRWI').value,
    nik     : document.getElementById('penatajasaRWI_search_nik').value,
    poli    : document.getElementById('penatajasaRWI_search_unitPoli').value,
    jml     : document.getElementById('penatajasaRWI_search_jumlah').value,
    posting     : document.getElementById('penatajasaRWI_search_posting').value,
    tglkunj_start : document.getElementById('penatajasaRWI_tglkunjungan_start').value,
    tglkunj_end   : document.getElementById('penatajasaRWI_tglkunjungan_end').value,
    id_user:id_user
  };

  apiPOST("Rawat_inap/penatajasaRWI_detailpasien", param, hasil => {   
    $('#penatajasaRWI_loading').hide();
    $('#penatajasaRWI_tablepasien tbody').html('');
    if (hasil['data'] !== null) {
      if (hasil['code'] == 'XX') {
        //toastr.error("Data tidak ditemukan");
      var Baris = "";
          Baris += "<tr>";
          Baris += '<td colspan="7" align="center">Data tidak ditemukan</td>';
          Baris += "</tr>";
        $('#penatajasaRWI_tablepasien tbody').append(Baris);
        document.getElementById('cri_by_normpenatajasaRWI').value       = '';
        document.getElementById('cri_by_nmpasienpenatajasaRWI').value   = '';
        document.getElementById('penatajasaRWI_search_nik').value       = '';

      }else{

        var Baris = "";
        var a = hasil['data'];
        for (var i = 0; i < a.length; i++) {
          var nama = a[i].nama.replace(/'/g, ' ');
          var no = i + 1;
          var id        = a[i].id_transaksi;
          var normxRWI  = a[i].no_rm;
          var nama      = nama;
          var alamat    = a[i].alamat;
          var umur      = a[i].tgl_lahir;
          var penjamin  = a[i].nama_penjamin;
          var sep       = a[i].no_sjp;
          var telp      = a[i].telepon;
          var unit      = a[i].nama_unit;
          var tglkunj   = a[i].tgl_transaksi;
          var idkunj    = a[i].id_kunjungan;
          var posting   = a[i].posting;
          var idunit    = a[i].id_unit;
          var idpegawai    = a[i].id_pegawai;
          var dokter    = a[i].nama_pegawai;
          var id_penjamin    = a[i].id_penjamin;
          var nama_ruang    = a[i].nama_ruang;
          var nama_kamar    = a[i].nama_kamar;
          var id_kamar    = a[i].id_kamar;
          var tglkeluar    = a[i].tgl_keluar;

          if(tglkeluar == null){
            tglkeluar ='-';
          }

          Baris += '<tr onclick="penatajasaRWI_detailpasien('+"'"+id+"','"+tglkunj+"','"+normxRWI+"','"+nama+"','"+alamat+"','"+umur+"','"+penjamin+"','"+sep+"','"+telp+"','"+unit+"','"+idkunj+"','"+posting+"','"+idunit+"','"+idpegawai+"','"+dokter+"','"+id_penjamin+"','"+nama_ruang+"','"+nama_kamar+"','"+id_kamar+"'"+')">';
          Baris += '<td>' + no + '</td>';
          Baris += '<td>' + id + '</td>';
          Baris += '<td>' + normxRWI + '</td>';
          Baris += '<td>' + nama + '</td>';
          Baris += '<td>' + alamat + '</td>';
          Baris += '<td>' + telp + '</td>';      
          Baris += '<td>' + tglkunj + '</td>';
          Baris += '<td>' + tglkeluar + '</td>';
          Baris += '<td>' + unit + ' / ' + a[i].nama_ruang + ' / ' + a[i].nama_kamar + '</td>';
          Baris += '<td>' +  a[i].nama_penjamin + '</td>';
          Baris += "</tr>";
        }
        $('#penatajasaRWI_tablepasien tbody').append(Baris);
      }       
    }
  });

}

function penatajasaRWI_detailpasien(id, tglkunj, normxRWI, nama, alamat, umur, penjamin, sep, telp, unit, idkunj, posting, idunit,idpegawai,dokter,id_penjamin,nama_ruang,nama_kamar,id_kamar){  
  
  $('#penatajasaRWI_content').show();
  $('#penatajasaRWI_1').hide();
  var dokterx = dokter.replace(",", " ");

  var json_data = {
    'idtrans' : id,
    'tgl_kunj': tglkunj,
    'nowday'  : nowday,
    'no_rm'   : normxRWI,
    'nama'    : nama.replace(/ /g, '%20'),
    'alamat'  : alamat.replace(/ /g, '%20'),
    'umur'    : umur.replace(/ /g, '%20'),
    'penjamin': penjamin.replace(/ /g, '%20'),
    'sep'     : sep.replace(/ /g, '%20'),
    'telp'    : telp.replace(/ /g, '%20'),
    'unit'    : unit.replace(/ /g, '%20'),
    'idkunj'  : idkunj,
    'posting' : posting,
    'idunit'  : idunit,
    'idpegawai'  : idpegawai,
    'dokter': dokterx.replace(/ /g, '%20'),
    'id_penjamin'  : id_penjamin,
    'namaruang'  : nama_ruang.replace(/ /g, '%20'),
    'namakamar'  : nama_kamar.replace(/ /g, '%20'),
    'id_kamar' : id_kamar,
  };

  var myJSON = JSON.stringify(json_data);
  $('.penatajasaRWI_content').load('Rawatinap/mod_RWIPenatajasa?data='+myJSON);
}

</script>