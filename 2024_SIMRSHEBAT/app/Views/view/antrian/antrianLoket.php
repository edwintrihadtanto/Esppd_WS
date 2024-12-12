<?php
$nowday     = date('Y-m-d');
//$nextday    = date('Y-m-d', strtotime('+1 days', strtotime($nowday))); 
$nextday    = $nowday;
?>
<div class="col-md-12 p-2" id="loket_list1">
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

<div class="col-md-12 p-2" id="loket_list2">
  <div class="card card-outline">
    <div class="overlay-wrapper" id="loket_loading2">
      <div class="overlay">
        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
      </div>
    </div>

    <div class="card-body p-1" style="max-height: 420px; overflow: auto;">
      <div class="row" id="loket_list">
      </div>
    </div>
  </div>
</div>

<div class="antrianLoket_content"></div>

<script type="text/javascript">
  var nowday = "<?php echo $nowday ?>";


  antrianLoket_list();


  function antrianLoket_list() {
    apiPOST("Antrian/loket_list", null, hasil => {
      $('#loket_loading2').hide();
      $('#loket_list').html('');
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
          $('#loket_list').append(Baris);
          document.getElementById('cri_by_normloket').value = '';
          document.getElementById('cri_by_nmpasienloket').value = '';
        } else {

          var Baris = "";
          var a = hasil['data'];
          for (var i = 0; i < a.length; i++) {
            var id_loket = a[i].id_loket;
            var jenis_loket = a[i].jenis_loket;
            var nama_loket = a[i].nama_loket;
            Baris += '<div class="col-md-3" onclick="vbukaLoket(' + "'" + id_loket + "','" + nama_loket + "','" + jenis_loket + "'" + ')" style="cursor:pointer;">';
            Baris += '<div class="info-box info-box-hover shadow mb-1" style="border: 2px solid;">'
            Baris += '<span class="info-box-icon bg-default"><i class="fas fa-desktop"></i></span>';
            Baris += '<div class="info-box-content">';
            Baris += '<span style="font-size: 20px" class="info-box-text">LOKET ' + nama_loket + id_loket + '</span>';
            Baris += '</div>';
            Baris += '</div>';
            Baris += '</div>';
          }
          $('#loket_list').append(Baris);
        }
      }
    });
  }

  function vbukaLoket(id_loket, nama_loket, jenis_loket) {
    $('#loket_list1').hide();
    $('#loket_list2').hide();
    var data = {
      id_loket: id_loket,
      nama_loket: nama_loket,
      jenis_loket: jenis_loket,
      hariini: nowday,
    }
    var datax = JSON.stringify(data);
    $('.antrianLoket_content').load('Antrian/antrianLoketRS?data=' + datax);
  }
</script>