<div class="col-md-12 p-2">
  <div class="card card-outline card-danger">
    
    <div class="card-body p-2 darkgrey-custom">
      <div class="row row-custom">
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Cari No. RM / Nama Pasien :</label>
            <div class="input-group input-group-sm mb-2">
              <div class="input-group-prepend">
                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="height:25px;"></button>
                <ul class="dropdown-menu">
                  <li class="dropdown-item rwj_kasir_cri_norm" onclick="show_rwj_kasir_cri_norm()">No. RekamMedik</a></li>
                  <li class="dropdown-item rwj_kasir_cri_nmpasien" onclick="show_rwj_kasir_cri_nmpasien()">Nama Pasien</a></li>
                </ul>
              </div>
              <!-- /btn-group -->
              <input type="text" class="form-control form-control-xs" placeholder="Masukkan No. RM" id="rwj_kasir_cri_by_norm">
              <input type="text" class="form-control form-control-xs" placeholder="Masukkan Nama Pasien" id="rwj_kasir_cri_by_nmpasien">
            </div>
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Tgl. Kunjung :</label>            
            <input type="date" class="form-control form-control-xs">
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label>s/d</label>
            <input type="date" class="form-control form-control-xs">
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Status Posting :</label>
            <select class="form-control form-control-xs">
              <option>Posting</option>
              <option>Belum Posting</option>
            </select>
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Status Pembayaran :</label>
            <select class="form-control form-control-xs">
              <option>Lunas</option>
              <option>Belum Lunas</option>
            </select>
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Kel. Pasien :</label>
            <select class="form-control form-control-xs">
              <option>Semua</option>
            </select>
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Customer :</label>
            <select class="form-control form-control-xs">
              <option>Umum</option>
              <option>BPJS PBI</option>
              <option>BPJS Non PBI</option>
            </select>
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Jumlah Data :</label>
            <select class="form-control form-control-xs">
              <option>10 Pasien</option>
              <option>15 Pasien</option>
              <option>20 Pasien</option>
              <option>25 Pasien</option>
              <option>30 Pasien</option>
            </select>
          </div>
        </div>

      </div>
    </div>
    <div class="col-12 p-1">
      <div class="card">
        <div class="card-header p-2 darkgrey-custom">
          <h6 class="hr6-custom"><i class="fas fa-hospital-user"></i> Daftar Pasien</h6>
          
          <!-- LETAK BUTTON -->
          <!-- <span class="vertical-divider"></span> -->          
          <!-- END LETAK BUTTON -->
        </div>
        <div class="overlay-wrapper" id="loading_kasir_rajal">
          <div class="overlay">
            <i class="fas fa-3x fa-sync-alt fa-spin"></i>
          </div>
        </div>
        <div class="card-body" style="padding: 0px; max-height: 320px; overflow: auto;">
          <table id="rwj_kasir_data_pasien" class="table table-striped table-sm choose" style="border-collapse: inherit;">
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

<div class="dtlKasirRWJ"></div>
<div class="dtlBayarKasirRWJ"></div>
<!-- /.nav-tabs-custom -->

<script type="text/javascript">
  
  $('#rwj_kasir_cri_by_norm').show();
  $('#rwj_kasir_cri_by_nmpasien').hide();

  function show_rwj_kasir_cri_norm() {
    $('#rwj_kasir_cri_by_norm').show();
    $('#rwj_kasir_cri_by_nmpasien').hide();
    $("#rwj_kasir_cri_by_norm").trigger('focus');
  }

  function show_rwj_kasir_cri_nmpasien() {
    $('#rwj_kasir_cri_by_norm').hide();
    $('#rwj_kasir_cri_by_nmpasien').show();
    $("#rwj_kasir_cri_by_nmpasien").trigger('focus');
  }

  function data_pasien_kasir_rajal() {
    /*var Baris = "";
    for (var i = 0; i < 1; i++) {
      var no = i + 1;
      Baris += '<div class="col-md-4" onclick="tamp_dtlKasirRAJAL()">';
      Baris += '<div class="small-box small-box bg-danger" style="border: 2px solid black; margin-bottom: 8px; height: 120px; cursor: pointer;">';
      Baris += '<div class="inner">';
      Baris += '<h6 style="text-align:right; top: 0; right: 5px; position: absolute;">0-00-00-0' + no + ' / BPJS NON PBI</h6>';
      Baris += '<h6>' + no + '. BELUM LUNAS</h6>';
      Baris += '<h6>no transaksi : 12345678</h6>';
      Baris += '<h6>23 April 2027</h8>';
      Baris += '<h6>Reski Alfan Dika , TN</h8>';
      Baris += '<label style="text-align:right; bottom: 0; right: 5px; position: absolute;">POLIKLINIK DALAM</label>';
      Baris += '</div>';
      Baris += '<div class="icon">';
      Baris += '<i class="fa fa-user" style="top:10px;"></i>';
      Baris += '</div>';
      Baris += '</div>';
      Baris += '</div>';

      Baris += '<div class="col-md-4" onclick="tamp_dtlKasirRAJAL()">';
      Baris += '<div class="small-box small-box bg-teal" style="border: 2px solid black; margin-bottom: 8px; height: 120px; cursor: pointer;">';
      Baris += '<div class="inner">';
      Baris += '<h6 style="text-align:right; top: 0; right: 5px; position: absolute;">0-00-00-0' + no + ' / BPJS NON PBI</h6>';
      Baris += '<h6>' + no + '. LUNAS</h6>';
      Baris += '<h6>no transaksi : 12345678</h6>';
      Baris += '<h6>23 April 2027</h8>';
      Baris += '<h6>Reski Alfan Dika , TN</h8>';
      Baris += '<label style="text-align:right; bottom: 0; right: 5px; position: absolute;">POLIKLINIK DALAM</label>';
      Baris += '</div>';
      Baris += '<div class="icon">';
      Baris += '<i class="fa fa-user" style="top:10px;"></i>';
      Baris += '</div>';
      Baris += '</div>';
      Baris += '</div>';
    }

    $('#data_pasien_kasir_rajal').append(Baris);*/

    var Baris = '<tr>';
    for (var i = 0; i < 15; i++) {
      var no = i + 1;
      Baris += '<td>' + no + '</td>';
      Baris += '<td>000' + no + '</td>';
      Baris += '<td onclick="tamp_dtlKasirRAJAL()">PRIMANTO</td>';
      Baris += '<td>Ngawi No: ' + no + '</td>';
      Baris += '<td>08' + no + '837388888</td>';
      Baris += '<td>01-Feb-2023</td>'
      Baris += '<td>Jantung</td>';
      Baris += "</tr>";
    }
    $('#rwj_kasir_data_pasien tbody').append(Baris);
  }

  function tamp_dtlKasirRAJAL() {
    $('.dtlKasirRWJ').load('Rawatjalan/mod_RWJkasir');
  }
  
  function tamp_bayarRajal() {    
    $('.dtlBayarKasirRWJ').load('Rawatjalan/mod_RWJBayarkasir');
  }

  // $("#kd_pasiencari").keypress(function() {
  $(document).on('keypress', function(e) {
    if (e.which == 13) {
      data_pasien_kasir_rajal();
    }
  })

  function refresh_kasir_rajal() {
    $('#loading_kasir_rajal').hide();
  }

  setTimeout(refresh_kasir_rajal, 1000);

  // });
</script>