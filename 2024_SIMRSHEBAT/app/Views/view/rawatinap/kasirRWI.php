<div class="col-md-12 p-2">
  <div class="card card-outline card-danger">
    <div class="card-body p-2 darkgrey-custom">
      <div class="row row-custom">
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Cari No. RM / Nama Pasien :</label>
            <div class="input-group input-group-sm mb-3">
              <div class="input-group-prepend">                
                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="height:25px;"></button>
                <ul class="dropdown-menu">
                  <li class="dropdown-item rwi_kasir_cri_norm" onclick="show_rwi_kasir_cri_norm()">No. RekamMedik</a></li>
                  <li class="dropdown-item rwi_kasir_cri_nmpasien" onclick="show_rwi_kasir_cri_nmpasien()">Nama Pasien</a></li>
                </ul>
              </div>              
              <input type="text" class="form-control form-control-xs" placeholder="Masukkan No. RM" id="rwi_kasir_cri_by_norm">
              <input type="text" class="form-control form-control-xs" placeholder="Masukkan Nama Pasien" id="rwi_kasir_cri_by_nmpasien">
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
          <h6 class="hr6-custom"><i class="fas fa-hospital-user"></i> List Pasien</h6>          
          <!-- LETAK BUTTON -->
          <!-- <span class="vertical-divider"></span> -->          
          <!-- END LETAK BUTTON -->
        </div>
        <div class="overlay-wrapper" id="rwi_kasir_loading">
          <div class="overlay">
            <i class="fas fa-3x fa-sync-alt fa-spin"></i>
          </div>
        </div>
        <div class="card-body" style="padding: 0px; max-height: 320px; overflow: auto;">
          <table id="rwi_kasir_data_pasien" class="table table-striped table-sm choose" style="border-collapse: inherit;">
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

<div class="dtlKasirRWI"></div>
<div class="dtlBayarKasirRWI"></div>

<script type="text/javascript">
$('#rwi_kasir_cri_by_norm').show();
$('#rwi_kasir_cri_by_nmpasien').hide();

function data_pasien_kasir_ranap(){
  $('#rwi_kasir_data_pasien tbody').html('');
  var Baris = '<tr>';
  for (var i = 0; i < 15; i++) {
    var no = i + 1;
    Baris += '<td>' + no + '</td>';
    Baris += '<td onclick="tamp_dtlKasirRWI()">000' + no + '</td>';
    Baris += '<td>PRIMANTO</td>';
    Baris += '<td>Ngawi No: ' + no + '</td>';
    Baris += '<td>08' + no + '837388888</td>';
    Baris += '<td>01-Feb-2023</td>'
    Baris += '<td>Jantung</td>';
    Baris += "</tr>";
  }
  $('#rwi_kasir_data_pasien tbody').append(Baris);
}

$("#rwi_kasir_cri_by_norm").click(function() {
  data_pasien_kasir_ranap();
});

function tamp_dtlKasirRWI(){
  $('.dtlKasirRWI').load('Rawatinap/mod_RWIkasir');
}

function tamp_dtlBayarKasirRWI(){
  $('.dtlBayarKasirRWI').load('Rawatinap/mod_PembayaranRWIkasir');  
}

function rwi_kasir_refresh(){   
   $('#rwi_kasir_loading').hide();   
}

setTimeout(rwi_kasir_refresh, 1000);

function show_rwi_kasir_cri_norm(){
  $('#rwi_kasir_cri_by_norm').show();
  $('#rwi_kasir_cri_by_nmpasien').hide();
  $("#rwi_kasir_cri_by_norm").trigger('focus');
}

function show_rwi_kasir_cri_nmpasien(){
  $('#rwi_kasir_cri_by_norm').hide();
  $('#rwi_kasir_cri_by_nmpasien').show();
  $("#rwi_kasir_cri_by_nmpasien").trigger('focus');
}


</script>