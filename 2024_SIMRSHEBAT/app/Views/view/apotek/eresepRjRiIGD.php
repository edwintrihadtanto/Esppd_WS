<?php
date_default_timezone_set("Asia/Jakarta");

$nowday     = date('Y-m-d');
//$nextday    = date('Y-m-d', strtotime('+1 days', strtotime($nowday))); 
$nextday    = $nowday; 
?>
<div class="col-md-12 p-2" id="eresepRjRiIGDDokter_listpasien1">
  <div class="card card-outline card-default" style="margin-bottom:0;">
    
    <div class="card-body p-2 darkgrey-custom">
      <div class="row row-custom">
        <div class="col-sm-auto">
          <div class="form-group">
            <label for="cri_by_normeresepRjRiIGDDokter">Cari No. RM / Nama Pasien :</label>
            <div class="input-group input-group-sm mb-3">
              <div class="input-group-prepend">                
                <button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="height:25px;"></button>
                <ul class="dropdown-menu">
                  <li class="dropdown-item cri_normeresepRjRiIGDDokter" onclick="show_cri_normeresepRjRiIGDDokter()">No. RekamMedik</li>
                  <li class="dropdown-item cri_nmpasieneresepRjRiIGDDokter" onclick="show_cri_nmpasieneresepRjRiIGDDokter()">Nama Pasien</li>
                </ul>
              </div>
              <!-- /btn-group -->
              <input type="text" class="form-control form-control-xs" placeholder="Entry No. RM" id="cri_by_normeresepRjRiIGDDokter">
              <input type="text" class="form-control form-control-xs" placeholder="Entry Nama Pasien" id="cri_by_nmpasieneresepRjRiIGDDokter">
            </div>
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label for="eresepRjRiIGDDokter_tglawal">Tgl. Kunjung :</label>
            <input type="date" class="form-control form-control-xs" id="eresepRjRiIGDDokter_tglawal" name="eresepRjRiIGDDokter_tglawal" onkeypress="eresepRjRiIGDDokter_listpasien()">
          </div>
        </div>  
        <div class="col-sm-auto">
          <div class="form-group">
            <label for="eresepRjRiIGDDokter_unitPoli">Poliklinik :</label>
            <select class="form-control form-control-xs" id="eresepRjRiIGDDokter_unitPoli" name="eresepRjRiIGDDokter_unitPoli" onchange="eresepRjRiIGDDokter_listpasien()"></select>
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label for="eresepRjRiIGDDokter_jmlhpasien">Jumlh Pasien :</label>
            <select class="form-control form-control-xs" id="eresepRjRiIGDDokter_jmlhpasien" name="eresepRjRiIGDDokter_jmlhpasien" onchange="eresepRjRiIGDDokter_listpasien()">
              <option value="0">- Semua Pasien -</option>
              <option value="10">10 Pasien</option>
              <option value="20">20 Pasien</option>
              <option value="30">30 Pasien</option>
              <option value="40">40 Pasien</option> 
              <option value="50">50 Pasien</option>
              <option value="100">100 Pasien</option>
            </select>
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label for="eresep_KelompokPasien">Jenis Pasien:</label>
            <select class="form-control form-control-xs" id="eresep_KelompokPasien" name="eresep_KelompokPasien" onchange="eresepRjRiIGDDokter_listpasien()">
              <option value="0">- Pilih Jenis Pasien -</option>
              <option value="1">Rawat Jalan</option>
              <option value="2">Rawat Inap</option>
              <option value="3">Gawat Darurat</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <!-- card-outline -->
  </div>   
</div>

<div class="col-md-12 p-2" id="eresepRjRiIGDDokter_listpasien2">
  <div class="card card-outline">
    <div class="overlay-wrapper" id="eresepRjRiIGDDokter_loading2">
      <div class="overlay dark">
        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
      </div>
    </div>
    
    <div class="card-body p-1" style="height: 67vh; max-height: 67vh; overflow-x: hidden;">
      <div class="row" id="eresepRjRiIGDDokter_listpasien">
      </div>
    </div>

  </div>  
</div>

<div class="eresepRjRiIGDDokter_content"></div>
<div class="eresepRjRiIGDDokter_contentobat"></div>
<!-- <div class="rekammedisRWJ_eresepRjRiIGD_preview"></div>
 -->
<script type="text/javascript">  
var nowday      = "<?php echo $nowday; ?>";
var nextday     = "<?php echo $nextday; ?>";

document.getElementById('eresepRjRiIGDDokter_tglawal').value        = nowday;
document.getElementById('cri_by_normeresepRjRiIGDDokter').value     = '';
document.getElementById('cri_by_nmpasieneresepRjRiIGDDokter').value = '';
eresepRjRiIGDDokter_listpasien();
$('#eresepRjRiIGDDokter_content').hide();
$('#cri_by_normeresepRjRiIGDDokter').show();
$('#cri_by_nmpasieneresepRjRiIGDDokter').hide();

resepRWJ_unit();

$("#cri_by_normeresepRjRiIGDDokter").keydown(function(event) {
  // document.body.onkeydown = function(event){  
  //   event.stopPropagation();
  // }
  if ( event.which == 13 ) {
    $('#eresepRjRiIGDDokter_loading2').show();
    eresepRjRiIGDDokter_listpasien();    
  }    
});

$("#cri_by_nmpasieneresepRjRiIGDDokter").keydown(function(event) {
  if ( event.which == 13 ) {
    $('#eresepRjRiIGDDokter_loading2').show();
    eresepRjRiIGDDokter_listpasien();
  }    
});

function resepRWJ_unit() {
  apiPOST('Apotek/getUnitAPT', null, hasil => {
    var data = hasil['data'];
    var unit = '';
      unit += '<option value="0">- Semua Poli -</option>';
    for (var i = 0; i < data.length; i++) {
      unit += '<option value="'+ data[i]['id_unit'] +'">'+ data[i]['nama_unit'].toUpperCase() +'</option>';
    }
    document.getElementById('eresepRjRiIGDDokter_unitPoli').innerHTML = unit;
  });
}

function show_cri_normeresepRjRiIGDDokter(){
  $('#cri_by_normeresepRjRiIGDDokter').show();
  $('#cri_by_nmpasieneresepRjRiIGDDokter').hide();
  document.getElementById('cri_by_normeresepRjRiIGDDokter').value = '';
  document.getElementById('cri_by_nmpasieneresepRjRiIGDDokter').value = '';
}

function show_cri_nmpasieneresepRjRiIGDDokter(){
  $('#cri_by_normeresepRjRiIGDDokter').hide();
  $('#cri_by_nmpasieneresepRjRiIGDDokter').show();
  $("#cri_by_nmpasieneresepRjRiIGDDokter").trigger('focus');
  document.getElementById('cri_by_normeresepRjRiIGDDokter').value = '';
  document.getElementById('cri_by_nmpasieneresepRjRiIGDDokter').value = '';
}

function eresepRjRiIGDDokter_listpasien(){
  $('#eresepRjRiIGDDokter_loading2').show();
  var listParam = [
    'cri_by_normeresepRjRiIGDDokter', 'cri_by_nmpasieneresepRjRiIGDDokter'
  ];

  var option = document.getElementById('eresep_KelompokPasien').value;
  if (option == '1'){
    siuuu = "Apotek/resepRWJDokter_listpasien";
  }else if (option == '2'){
    siuuu = "Apotek/resepRWIDokter_listpasien";
  }else if (option == '3'){
    siuuu = "Apotek/resepIGDDokter_listpasien";
  }else{
    $('#eresepRjRiIGDDokter_listpasien').html('');
    siuuu = "";
    sukses("Pilih Jenis Pasien");
    $('#eresepRjRiIGDDokter_loading2').hide();
    var x = "";
        x += '<div class="col-sm-12 pt-1 pl-2 pr-2 pb-1">';
          x += '<div class="small-box bg-danger">';
            x += '<div class="inner p-1" style="text-align:center;">';
              x += '<h6><i class="fa fa-times"></i> Data Tidak Ditemukan</h6>';
            x += '</div>';
          x += '</div>';
        x += '</div>';

    $('#eresepRjRiIGDDokter_listpasien').append(x);
    return;
  }

  var param = {
    norm      : document.getElementById('cri_by_normeresepRjRiIGDDokter').value,
    nmpasien  : document.getElementById('cri_by_nmpasieneresepRjRiIGDDokter').value,
    tglkunj   : document.getElementById('eresepRjRiIGDDokter_tglawal').value,
    stsorder  : document.getElementById('eresepRjRiIGDDokter_unitPoli').value,
    poli      : document.getElementById('eresepRjRiIGDDokter_unitPoli').value,
    jmlh      : document.getElementById('eresepRjRiIGDDokter_jmlhpasien').value,
  };

  apiPOST(siuuu, param, hasil => {   
    $('#eresepRjRiIGDDokter_loading2').hide();
    $('#eresepRjRiIGDDokter_listpasien').html('');
    if (hasil['data'] !== null) {
      if (hasil['code'] == 'XX') {
        toastr.error("Data tidak ditemukan");
        var Baris = "";
            Baris += '<div class="col-sm-12">';
              Baris += '<div class="small-box bg-danger">';
                Baris += '<div class="inner p-1" style="text-align:center;">';
                  Baris += '<h6><i class="fa fa-times"></i> Data Tidak Ditemukan</h6>';
                Baris += '</div>';
              Baris += '</div>';
            Baris += '</div>';

        $('#eresepRjRiIGDDokter_listpasien').append(Baris);
        document.getElementById('cri_by_normeresepRjRiIGDDokter').value = '';
        document.getElementById('cri_by_nmpasieneresepRjRiIGDDokter').value = '';
      }else{

        var Baris = "";
        var a = hasil['data'];
        for (var i = 0; i < a.length; i++) {
          var tglkunj   = a[i].tgl_transaksi;
          var norm      = a[i].no_rm;
          var nama      = a[i].nama.replace(/'/g, '');
          var alamat    = a[i].alamat;
          var umur      = a[i].tgl_lahir;
          var penjamin  = a[i].nama_penjamin;
          var sep       = a[i].no_sjp;
          var telp      = a[i].telepon;
          var unit      = a[i].nama_unit;
          var id_unit   = a[i].id_unit;
          var id_kunj   = a[i].id_kunjungan;
          var jam_masuk = a[i].jam_masuk.substring(0, 16);
          if (nama.length > 18){
            namax  = nama.substring(0, 18)+'...';
          }else{
            namax  = nama;
          }

          if (alamat.length > 30){
            alamatx = alamat.substring(0, 30)+'...';
          }else{
            alamatx = alamat;
          }
          Baris += '<div class="col-sm-3">';
            if (id_kunj == ''){
              Baris += '<div class="small-box btn-info" style="border: solid 2px darkblue;">';
            }else{
              Baris += '<div class="small-box btn-secondary-default" style="border: solid 2px #a8d4da; margin-bottom: 5px !important;">';
            }
              Baris += '<div class="inner p-1">';
                  Baris += '<h6><strong>'+norm+'</strong> / '+ namax +'</h6>';
                  Baris += '<p class="p-0 mb-1" style="font-size:12px;">'+alamatx+'</p>';
                  Baris += '<p class="p-0 mb-1" style="font-size:12px;"><strong><i>'+unit+'</i></strong></p>';
                  Baris += '<p class="p-0 mb-1" style="font-size:14px; text-align: center;"><i class="fa fa-clock"></i> '+jam_masuk+'</p>';
              Baris += '</div>';
              Baris += '<div class="icon">';
                Baris += '<i class="fa fa-user"></i>';
              Baris += '</div>';
              Baris += '<a href="#" class="small-box-footer" style="background-color: #a8d4da; color: black;" onclick="eresepRjRiIGD_entryobatDokter('+"'"+tglkunj+"','"+norm+"','"+nama+"','"+alamat+"','"+umur+"','"+penjamin+"','"+sep+"','"+telp+"','"+unit+"','"+id_unit+"','"+id_kunj+"'"+')" style="cursor:pointer;">Klik Disini <i class="fas fa-arrow-circle-right"></i></a>';
            Baris += '</div>';
          Baris += '</div>';

        }
        $('#eresepRjRiIGDDokter_listpasien').append(Baris);
      }       
    }
  });  
}

function eresepRjRiIGD_entryobatDokter(tglkunj, norm, nama, alamat, umur, penjamin, sep, telp, unit, id_unit, id_kunj){  
  
  // $('#eresepRjRiIGDDokter_content').show();
  // $('#eresepRjRiIGDDokter_listpasien1').hide();
  // $('#eresepRjRiIGDDokter_listpasien2').hide();
  // console.log(tglkunj, norm, nama, alamat, umur, penjamin, sep, telp, unit, id_unit, id_kunj);
  var json_data = {
    'id_kunjOrdEresep'  : id_kunj,
    'tgl_kunjOrdEresep' : tglkunj,
    'nowdayOrdEresep'   : nowday,
    'no_rmOrdEresep'    : norm,
    'namaOrdEresep'     : nama.replace(/ /g, '%20'),
    'alamatOrdEresep'   : alamat.replace(/ /g, '%20'),
    'umurOrdEresep'     : umur.replace(/ /g, '%20'),
    'penjaminOrdEresep' : penjamin.replace(/ /g, '%20'),
    'sepOrdEresep'      : sep.replace(/ /g, '%20'),
    'telpOrdEresep'     : telp.replace(/ /g, '%20'),
    'idunitOrdEresep'   : id_unit,
    'unitOrdEresep'     : unit.replace(/ /g, '%20'),
    'eresepRWJOrdEresep': 'MENU_ERESEP_GAB',
    'rekammedis'        : 'eresepRjRiIGDDokter_content',
    'rekammedis_prev'   : 'eresepRjRiIGDDokter_contentobat'
  };

  var myJSON = JSON.stringify(json_data);
  //$('.eresepRjRiIGDDokter_content').load('Apotek/resepRWJDokter_input?data='+myJSON);
  // $('.eresepRjRiIGDDokter_content').load('Apotek/erm_eresepRWJ?data='+myJSON); // KE TAMPILAN ERESEP ERM
  //$('.eresepRjRiIGDDokter_content').load('Apotek/obatresepRWJ?data='+myJSON);
  $('.eresepRjRiIGDDokter_content').load('Apotek/erm_eresepGabung?data='+myJSON); // KE TAMPILAN ERESEP ERM
}

</script>