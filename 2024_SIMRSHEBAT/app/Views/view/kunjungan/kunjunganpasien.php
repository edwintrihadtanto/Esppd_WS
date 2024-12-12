<?php
date_default_timezone_set('Asia/Jakarta');
$nowday     = date('Y-m-d');
//$nextday    = date('Y-m-d', strtotime('+1 days', strtotime($nowday))); 
$nextday    = $nowday;
?>
<div class="col-md-12 p-2" id="historykunjungan_1">
  <div class="card card-outline card-default" style="margin-bottom:0;">

    <div class="overlay-wrapper" id="historykunjungan_loading">
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
                  <li class="dropdown-item" onclick="show_cri_normhistorykunjungan()">No. RekamMedik</a></li>
                  <li class="dropdown-item" onclick="show_cri_nmpasienhistorykunjungan()">Nama Pasien</a></li>
                </ul>
              </div>
              <!-- /btn-group -->
              <input type="search" class="form-control form-control-xs" placeholder="Entry No. RM" id="cri_by_normhistorykunjungan" autocomplete="off">
              <input type="search" class="form-control form-control-xs" placeholder="Entry Nama Pasien" id="cri_by_nmpasienhistorykunjungan" autocomplete="off">
            </div>
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label> NIK:</label>
            <input type="search" class="form-control form-control-xs" id="historykunjungan_search_nik" placeholder="Entry NIK" autocomplete="off">
          </div>
        </div>
        <!-- <div class="col-sm-auto">
          <div class="form-group">
            <label for="exempel1"> Telp :</label>
            <input type="search" class="form-control form-control-xs" id="historykunjungan_search_telp" placeholder="Entry Telp" autocomplete="off">
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label for="exempel1"> Alamat :</label>
            <input type="search" class="form-control form-control-xs" id="historykunjungan_search_alamat" placeholder="Entry Alamat" autocomplete="off">
          </div>
        </div> -->

        <div class="col-sm-auto">
          <div class="form-group">
            <label>Jumlh Pasien :</label>
            <select class="form-control form-control-xs" id="historykunjungan_search_jumlah">
              <option value="10">10 Pasien</option>
              <option value="35">35 Pasien</option>
              <option value="50">50 Pasien</option>
              <option value="85">85 Pasien</option>
              <option value="100">100 Pasien</option>
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
              <div class="col-md-12">
                <h6 class="hr6-custom" id="historykunjungan_titleheader"><i class="fas fa-users"></i> Daftar Kunjungan Pasien</h6>
                <!-- <div id="historykunjungan_button1">
                  <button type="button" class="btn bg-gradient-secondary btn-xs"> <i class="fas fa-arrow-left"></i></i> Kembali</button>
                </div> -->
              </div>
            </div>
          </div>

          <div class="card-body" id='div_historykunjungan' style="padding: 0px; max-height: 320px; overflow: auto;">
            <table id="historykunjungan_tablepasien" class="table table-striped table-sm choose" style="border-collapse: inherit;">
              <thead>
                <tr>
                  <th width="15">#</th>
                  <th>No. RM</th>
                  <th>Nama Pasien</th>
                  <th>Alamat Pasien</th>
                  <th>Telepon</th>
                  <th>NIK</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>

        </div>
      </div>
    </div>

  </div> <!-- card-outline -->
</div> <!-- historykunjungan_1 -->

<div class="historykunjungan_content"></div>

<script type="text/javascript">
  var nowday = "<?php echo $nowday; ?>";
  show_cri_normhistorykunjungan();
  historykunjungan_tablepasien();

  $("#cri_by_normhistorykunjungan").keydown(function(event) {
    switch (event.which) {
      case 13:
        $('#historykunjungan_loading').show();
        historykunjungan_tablepasien();
        break;
    }
  });

  $("#cri_by_nmpasienhistorykunjungan").keydown(function(event) {
    switch (event.which) {
      case 13:
        $('#historykunjungan_loading').show();
        historykunjungan_tablepasien();
        break;
    }
  });

  $("#historykunjungan_search_nik").keydown(function(event) {
    switch (event.which) {
      case 13:
        $('#historykunjungan_loading').show();
        historykunjungan_tablepasien();
        break;
    }
  });

  $("#historykunjungan_search_jumlah").change(function(event) {
    $('#historykunjungan_loading').show();
    historykunjungan_tablepasien();
  });


  function show_cri_normhistorykunjungan() {
    $('#cri_by_normhistorykunjungan').show();
    $('#cri_by_nmpasienhistorykunjungan').hide();
    $("#cri_by_normhistorykunjungan").trigger('focus');
    document.getElementById('cri_by_nmpasienhistorykunjungan').value = '';
  }

  function show_cri_nmpasienhistorykunjungan() {
    $('#cri_by_normhistorykunjungan').hide();
    $('#cri_by_nmpasienhistorykunjungan').show();
    $("#cri_by_nmpasienhistorykunjungan").trigger('focus');
    document.getElementById('cri_by_normhistorykunjungan').value = '';
  }

  function historykunjungan_tablepasien() {
    var normIGD = document.getElementById('cri_by_normhistorykunjungan').value;
    // document.getElementById('cri_by_normhistorykunjungan').value = normOtomatis(normIGD);
    $('#historykunjungan_loading').show();
    var listParam = [
      'cri_by_normhistorykunjungan', 'cri_by_nmpasienhistorykunjungan', 'historykunjungan_search_nik', 'historykunjungan_search_telp', 'historykunjungan_search_alamat'
    ];
    var param = {
      norm: normIGD,
      nmpasien: document.getElementById('cri_by_nmpasienhistorykunjungan').value,
      nik: document.getElementById('historykunjungan_search_nik').value,
      jml: document.getElementById('historykunjungan_search_jumlah').value,
    };

    apiPOST("Historykunjungan/historykunjungan_detailpasien", param, hasil => {
      $('#historykunjungan_loading').hide();
      $('#historykunjungan_tablepasien tbody').html('');
      if (hasil['data'] !== null) {
        if (hasil['code'] == 'XX') {
          //toastr.error("Data tidak ditemukan");
          var Baris = "";
          Baris += "<tr>";
          Baris += '<td colspan="7" align="center">Data tidak ditemukan</td>';
          Baris += "</tr>";
          $('#historykunjungan_tablepasien tbody').append(Baris);
          document.getElementById('cri_by_normhistorykunjungan').value = '';
          document.getElementById('cri_by_nmpasienhistorykunjungan').value = '';
          document.getElementById('historykunjungan_search_nik').value = '';

        } else {

          var Baris = "";
          var a = hasil['data'];
          for (var i = 0; i < a.length; i++) {
            var no = i + 1;
            var norm = a[i].no_rm;
            var nama = a[i].nama;
            var alamat = a[i].alamat;
            var umur = a[i].tgl_lahir;
            var telp = a[i].telepon;
            var unit = a[i].nama_unit;
            var nik = a[i].nik;

            Baris += '<tr onclick="historykunjungan_detailpasien(' + "'" + norm + "','" + nama + "','" + alamat + "','" + umur + "','" + telp +"'"+')">';
            Baris += '<td>' + no + '</td>';
            Baris += '<td>' + norm + '</td>';
            Baris += '<td>' + nama.toUpperCase() + '</td>';
            Baris += '<td>' + alamat.toUpperCase() + '</td>';
            Baris += '<td>' + telp + '</td>';
            Baris += '<td>' + nik + '</td>'
            Baris += "</tr>";
          }
          $('#historykunjungan_tablepasien tbody').append(Baris);
        }
      }
    });

  }

  function historykunjungan_detailpasien(norm, nama, alamat, umur,telp,nik) {

    $('#historykunjungan_content').show();
    $('#historykunjungan_1').hide();
    var json_data = {
  
      'no_rm': norm,
      'nama': nama.replace(/ /g, '%20'),
      'alamat': alamat.replace(/ /g, '%20'),
      'umur': umur.replace(/ /g, '%20'),
      'telp': telp.replace(/ /g, '%20'),
      'nik': nik,
    };

    var myJSON = JSON.stringify(json_data);
    $('.historykunjungan_content').load('Historykunjungan/mod_hiskunjungan?data=' + myJSON);
  }

  
</script>