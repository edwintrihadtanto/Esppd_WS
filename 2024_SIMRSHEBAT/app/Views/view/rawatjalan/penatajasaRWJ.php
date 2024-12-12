<div class="col-md-12 p-2">
  <div class="card card-outline card-danger">
    <div class="overlay-wrapper" id="rwj_penatajasa_loading">
      <div class="overlay">
        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
      </div>
    </div>

    <div class="card-body p-2 darkgrey-custom">
      <div class="row row-custom">
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Cari No. RM / Nama Pasien:</label>
            <div class="input-group input-group-sm mb-3">
              <div class="input-group-prepend">
                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false"></button>
                <ul class="dropdown-menu">
                  <li class="dropdown-item rwj_penatajasa_cri_norm" onclick="rwj_penatajasa_show_cri_norm()">No. RekamMedik</a></li>
                  <li class="dropdown-item rwj_penatajasa_cri_nmpasien" onclick="rwj_penatajasa_show_cri_nmpasien()">Nama Pasien</a></li>
                </ul>
              </div>
              <input type="search" class="form-control form-control-sm" placeholder="No. RM..." id="rwj_penatajasa_kd_pasiencari" autocomplete="off">
              <input type="search" class="form-control form-control-sm" placeholder="Nama Pasien..." id="rwj_penatajasa_nm_pasiencari" autocomplete="off">
            </div>
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label> NIK. Kependudukan :</label>
            <input type="search" class="form-control form-control-sm" id="rwj_penatajasa_nik" placeholder="NIK..." autocomplete="off">
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label for="exempel1"> Telp :</label>
            <input type="search" class="form-control form-control-sm" id="rwj_penatajasa_telp" placeholder="Telp..." autocomplete="off">
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label for="exempel1"> Alamat :</label>
            <input type="search" class="form-control form-control-sm" id="rwj_penatajasa_alamat" placeholder="Alamat..." autocomplete="off">
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label for="exempel1"> Jmlh Pasien :</label>
            <select size="1" class="form-control form-control-sm">
              <option value="10">10 Pasien</option>
              <option value="15">15 Pasien</option>
              <option value="20">20 Pasien</option>
              <option value="25">25 Pasien</option>
              <option value="30">30 Pasien</option>
              <option value="30">Semuas Pasien</option>
            </select>
          </div>
        </div>

      </div>
    </div>
    <div class="col-12 p-1">
      <div class="card">
        <div class="card-header p-2 darkgrey-custom">
          <h6 class="hr6-custom"><i class="fas fa-hospital-user"></i> List Pasien</h6>          
          <!-- LETAK BUTTON -->
          <!-- <span class="vertical-divider"></span> -->          
          <!-- END LETAK BUTTON -->
        </div>
        <div class="card-body" style="padding: 0px; max-height: 320px; overflow: auto;">
          <table id="rwj_penatajasa_data_pasien" class="table table-striped table-sm choose" style="border-collapse: inherit;">
            <thead>
              <tr>
                <th width="50">#</th>
                <th>No. RM</th>
                <th>Nama Pasien</th>
                <th>Alamat(s)</th>
                <th>Telp</th>
                <th>Tgl Kunjungan</th>
                <th>Unit</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>        
      
      </div>
    </div>    
    
  </div>  
</div>

<div class="tamp_dtlPenatajasaRWJ"></div>
<script type="text/javascript">  
$('#rwj_penatajasa_kd_pasiencari').show();
$('#rwj_penatajasa_nm_pasiencari').hide();
$('#rwj_penatajasa_loading').hide();

function rwj_penatajasa_show_cri_norm() {
  $('#rwj_penatajasa_kd_pasiencari').show();
  $('#rwj_penatajasa_nm_pasiencari').hide();
  $("#rwj_penatajasa_kd_pasiencari").trigger('focus');
}

function rwj_penatajasa_show_cri_nmpasien() {
  $('#rwj_penatajasa_kd_pasiencari').hide();
  $('#rwj_penatajasa_nm_pasiencari').show();
  $("#rwj_penatajasa_nm_pasiencari").trigger('focus');
}

function tamp_dtlPenatajasaRWJ(){
  $('.tamp_dtlPenatajasaRWJ').load('Rawatjalan/mod_RWJPenatajasa');
}

function rwjpenatajasa_datax() {
  var Baris = '<tr>';
  for (var i = 0; i < 15; i++) {
    var no = i + 1;
    Baris += '<td>' + no + '</td>';
    Baris += '<td onclick="tamp_dtlPenatajasaRWJ()">000' + no + '</td>';
    Baris += '<td>PRIMANTO</td>';
    Baris += '<td>Ngawi No: ' + no + '</td>';
    Baris += '<td>08' + no + '837388888</td>';
    Baris += '<td>01-Feb-2023</td>'
    Baris += '<td>Jantung</td>';
    Baris += "</tr>";
  }
  $('#rwj_penatajasa_data_pasien tbody').append(Baris);
}


$("#rwj_penatajasa_kd_pasiencari").click(function() {
  rwjpenatajasa_datax();
});
</script>