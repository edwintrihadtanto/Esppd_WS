<?php
$nowday     = date('Y-m-d');
//$nextday    = date('Y-m-d', strtotime('+1 days', strtotime($nowday))); 
$nextday    = $nowday;
?>
<div class="col-md-12 p-2" id="poli_list1">
  <div class="card card-outline card-default" style="margin-bottom:0;">
    <div class="card-body p-2 darkgrey-custom">
      <div class="row row-custom">
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Nama Loket</label>
            <input type="text" class="form-control form-control-xs" placeholder="" id="eresepRWJDokter_crinoorder">
          </div>
        </div>
      </div>
    </div>
    <!-- card-outline -->
  </div>
</div>

<div class="col-md-12 p-2" id="poli_list2">
  <div class="card card-outline">
    <div class="overlay-wrapper" id="loketpoli_loading2">
      <div class="overlay">
        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
      </div>
    </div>

    <div class="card-body p-1" style="max-height: 420px; overflow: auto;">
      <div class="row" id="poli_list">
      </div>
    </div>
  </div>
</div>

<div class="antrianPoli_content"></div>

<script type="text/javascript">
  var nowday = "<?php echo $nowday ?>";


  antrianPoli_list();


  function antrianPoli_list() {
    apiPOST("Antrian/poli_list", null, hasil => {
      $('#loketpoli_loading2').hide();
      $('#poli_list').html('');
      if (hasil['data'] !== null) {
        if (hasil['code'] == 'XX') {
          toastr.error("Data tidak ditemukan");
          var Baris = "";
          Baris += '<div class="col-md-12" style="cursor:not-allowed;">';
          Baris += '<div class="info-box shadow mb-1" style="border: 2px solid; background-color: darksalmon; font-weight: bolder;">'
          Baris += '<span class="info-box-icon bg-danger"><i class="fa fa-times"></i></span>';
          Baris += '<div class="info-box-content">';
          Baris += '<span class="info-box-number"></span>';
          Baris += '<span class="info-box-text"></span>';
          Baris += '<h5 class="info-box-text">Data tidak ditemukan</h5>';
          Baris += '</div>';
          Baris += '</div>';
          Baris += '</div>';
          $('#poli_list').append(Baris);
          document.getElementById('cri_by_normloket').value = '';
          document.getElementById('cri_by_nmpasienloket').value = '';
        } else {

          var Baris = "";
          var a = hasil['data'];
          for (var i = 0; i < a.length; i++) {
            var id_pegawai = a[i].id_pegawai;
            var nama_unit = a[i].nama_unit;
            var nama_pegawai = a[i].nama_pegawai;
            Baris += '<div class="col-md-3" onclick="vbukaPoli(' + "'" + id_pegawai + "','" + nama_unit + "'" + ')" style="cursor:pointer;">';
            Baris += '<div class="info-box info-box-hover shadow mb-1" style="border: 2px solid;">'
            Baris += '<span class="info-box-icon bg-default"><i class="fas fa-desktop"></i></span>';
            Baris += '<div class="info-box-content">';
            Baris += '<span style="font-size: 10px" class="info-box-text">' + nama_unit + '</span>';
            Baris += '<span style="font-size: 10px" class="info-box-text font-weight-bold">' + nama_pegawai + '</span>';
            Baris += '</div>';
            Baris += '</div>';
            Baris += '</div>';
          }
          $('#poli_list').append(Baris);
        }
      }
    });
  }

  function vbukaPoli(id_pegawai, nama_unit) {
    $('#poli_list1').hide();
    $('#poli_list2').hide();
    namaunit = nama_unit.replaceAll(" ", "-");
    var data = {
      id_pegawai: id_pegawai,
      nama_unit: namaunit,
      hariini: nowday,
    }
    var datax = JSON.stringify(data);
    $('.antrianPoli_content').load('Antrian/antrianPoliRS?data=' + datax);
  }
</script>