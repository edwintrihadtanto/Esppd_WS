<?php
$nowday     = date('Y-m-d');
//$nextday    = date('Y-m-d', strtotime('+1 days', strtotime($nowday))); 
$nextday    = $nowday;
?>
<div class="col-md-12 p-2" id="penatajasaRWJ_1">
  <div class="card card-outline card-default" style="margin-bottom:0;">

    <div class="overlay-wrapper" id="penatajasaRWJ_loading">
      <div class="overlay">
        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
      </div>
    </div>

    <div class="card-body p-2 darkgrey-custom">
      <div class="row row-custom">
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Cari No. RM / Nama Pasienx :</label>
            <div class="input-group input-group-sm mb-3">
              <div class="input-group-prepend">
                <button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="height:25px;"></button>
                <ul class="dropdown-menu">
                  <li class="dropdown-item" onclick="show_cri_normpenatajasaRWJ()">No. RekamMedik</a></li>
                  <li class="dropdown-item" onclick="show_cri_nmpasienpenatajasaRWJ()">Nama Pasien</a></li>
                </ul>
              </div>
              <!-- /btn-group -->
              <input type="number" class="form-control form-control-xs" placeholder="Entry No. RM" id="cri_by_normpenatajasaRWJ">
              <input type="text" class="form-control form-control-xs" placeholder="Entry Nama Pasien" id="cri_by_nmpasienpenatajasaRWJ">
            </div>
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label> NIK:</label>
            <input type="search" class="form-control form-control-xs" id="penatajasaRWJ_search_nik" placeholder="Entry NIK" autocomplete="off">
          </div>
        </div>
        <!-- <div class="col-sm-auto">
          <div class="form-group">
            <label for="exempel1"> Telp :</label>
            <input type="search" class="form-control form-control-xs" id="penatajasaRWJ_search_telp" placeholder="Entry Telp" autocomplete="off">
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label for="exempel1"> Alamat :</label>
            <input type="search" class="form-control form-control-xs" id="penatajasaRWJ_search_alamat" placeholder="Entry Alamat" autocomplete="off">
          </div>
        </div> -->
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Poliklinik :</label>
            <select class="form-control form-control-xs" id="penatajasaRWJ_search_unitPoli" onchange="penatajasaRWJ_tablepasien()"></select>
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Dokter :</label>
            <select class="form-control form-control-xs" id="penatajasaRWJ_search_dokter" onchange="penatajasaRWJ_tablepasien()"></select>
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Jumlh Pasien :</label>
            <select class="form-control form-control-xs" id="penatajasaRWJ_search_jumlah" onchange="penatajasaRWJ_tablepasien()">
              <option value="5">5 Pasien</option>
              <option value="10">10 Pasien</option>
              <option value="15">15 Pasien</option>
              <option value="20">20 Pasien</option>
              <option value="25">25 Pasien</option>
              <option value="30">30 Pasien</option>
              <option value="all"> - Semua -</option>

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
              <div class="col-md-10">
                <h6 class="hr6-custom" id="penatajasaRWJ_titleheader"><i class="fas fa-users"></i> Daftar Pasien Rawat Jalan</h6>
              </div>
              <div class="col-md-2">
                <div class="form_group">
                  <label>Tgl. Kunjung :</label>
                  <input type="date" id="penatajasaRWJ_tglkunjungan" class="form-control form-control-xs">
                </div>
              </div>
            </div>
          </div>

          <div class="card-body" id='div_penatajasaRWJ' style="padding: 0px; max-height: 320px; overflow: auto;">
            <table id="penatajasaRWJ_tablepasien" class="table table-striped table-sm choose" style="border-collapse: inherit;">
              <thead>
                <tr>
                  <th width="15">#</th>
                  <th>No. RM</th>
                  <th>Nama Pasien</th>
                  <th>Alamat(s)</th>
                  <th>Telp</th>
                  <th>Tgl Kunjungan</th>
                  <th>Unit</th>
                  <th>Dokter</th>
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
</div> <!-- penatajasaRWJ_1 -->

<div class="penatajasaRWJ_content"></div>

<script type="text/javascript">
  var nowday = "<?php echo $nowday; ?>";
  show_cri_normpenatajasaRWJ();
  penatajasaRWJ_unit();
  penatajasaRWJ_tablepasien();

  $("#cri_by_normpenatajasaRWJ").keydown(function(event) {
    switch (event.which) {
      case 13:
        $('#penatajasaRWJ_loading').show();
        penatajasaRWJ_tablepasien();
        break;
    }
  });

  $("#cri_by_nmpasienpenatajasaRWJ").keydown(function(event) {
    switch (event.which) {
      case 13:
        $('#penatajasaRWJ_loading').show();
        penatajasaRWJ_tablepasien();
        break;
    }
  });

  $("#penatajasaRWJ_search_nik").keydown(function(event) {
    switch (event.which) {
      case 13:
        $('#penatajasaRWJ_loading').show();
        penatajasaRWJ_tablepasien();
        break;
    }
  });

  $("#penatajasaRWJ_search_unitPoli").change(function(event) {
    $('#penatajasaRWJ_loading').show();
    penatajasaRWJ_tablepasien();
  });

  $("#penatajasaRWJ_search_jumlah").change(function(event) {
    $('#penatajasaRWJ_loading').show();
    penatajasaRWJ_tablepasien();
  });

  $("#penatajasaRWJ_tglkunjungan").keydown(function(event) {
    switch (event.which) {
      case 13:
        $('#penatajasaRWJ_loading').show();
        penatajasaRWJ_tablepasien();
        break;
    }
  });

  function show_cri_normpenatajasaRWJ() {
    $('#cri_by_normpenatajasaRWJ').show();
    $('#cri_by_nmpasienpenatajasaRWJ').hide();
    $("#cri_by_normpenatajasaRWJ").trigger('focus');
    document.getElementById('penatajasaRWJ_tglkunjungan').value = nowday;
    document.getElementById('cri_by_nmpasienpenatajasaRWJ').value = '';
  }

  function show_cri_nmpasienpenatajasaRWJ() {
    $('#cri_by_normpenatajasaRWJ').hide();
    $('#cri_by_nmpasienpenatajasaRWJ').show();
    $("#cri_by_nmpasienpenatajasaRWJ").trigger('focus');
    document.getElementById('cri_by_normpenatajasaRWJ').value = '';
  }

  function penatajasaRWJ_unit() {
    apiPOST('Rawatjalan/unit', null, hasil => {
      var data = hasil['data'];
      var unit = '';
      unit += '<option value="0">Semua Poli</option>';
      for (var i = 0; i < data.length; i++) {
        unit += '<option value="' + data[i]['id_unit'] + '">' + data[i]['nama_unit'] + '</option>';
      }
      document.getElementById('penatajasaRWJ_search_unitPoli').innerHTML = unit;
    });
  }

  function penatajasaRWJ_refreshawal() {
    $('#penatajasaRWJ_loading').hide();
  }
  //setTimeout(penatajasaRWJ_refreshawal, 1000);

  function penatajasaRWJ_tablepasien() {

    var normxRWJ = document.getElementById('cri_by_normpenatajasaRWJ').value;
    document.getElementById('cri_by_normpenatajasaRWJ').value = normOtomatis(normxRWJ);
    var user = JSON.parse(localStorage['data_user']);
    var id_user = user['id_user'];
    var listParam = [
      'cri_by_normpenatajasaRWJ', 'cri_by_nmpasienpenatajasaRWJ', 'penatajasaRWJ_search_nik', 'penatajasaRWJ_search_telp', 'penatajasaRWJ_search_alamat', 'penatajasaRWJ_search_unitPoli', 'penatajasaRWJ_tglkunjungan'
    ];
    var param = {
      norm: normOtomatis(normxRWJ),
      nmpasien: document.getElementById('cri_by_nmpasienpenatajasaRWJ').value,
      nik: document.getElementById('penatajasaRWJ_search_nik').value,
      poli: document.getElementById('penatajasaRWJ_search_unitPoli').value,
      jml: document.getElementById('penatajasaRWJ_search_jumlah').value,
      tglkunj: document.getElementById('penatajasaRWJ_tglkunjungan').value,
      id_user: id_user,
      id_pegawai : document.getElementById('penatajasaRWJ_search_dokter').value
    };

    apiPOST("Rawatjalan/penatajasaRWJ_detailpasien", param, hasil => {
      $('#penatajasaRWJ_loading').hide();
      $('#penatajasaRWJ_tablepasien tbody').html('');
      if (hasil['data'] !== null) {
        if (hasil['code'] == 'XX') {
          //toastr.error("Data tidak ditemukan");
          var Baris = "";
          Baris += "<tr>";
          Baris += '<td colspan="7" align="center">Data tidak ditemukan</td>';
          Baris += "</tr>";
          $('#penatajasaRWJ_tablepasien tbody').append(Baris);
          document.getElementById('cri_by_normpenatajasaRWJ').value = '';
          document.getElementById('cri_by_nmpasienpenatajasaRWJ').value = '';
          document.getElementById('penatajasaRWJ_search_nik').value = '';

        } else {

          var Baris = "";
          var a = hasil['data'];
          for (var i = 0; i < a.length; i++) {
            var no = i + 1;
            var nama = a[i].nama.replace(/'/g, ' ');
            var id = a[i].id_transaksi;
            var idkunj = a[i].id_kunjungan;
            var posting = a[i].posting;
            var norm = a[i].no_rm;
            var nama = nama;
            var alamat = a[i].alamat;
            var umur = a[i].tgl_lahir;
            var penjamin = a[i].nama_penjamin;
            var sep = a[i].no_sjp;
            var telp = a[i].telepon;
            var unit = a[i].nama_unit;
            var tglkunj = a[i].tgl_transaksi;
            var dokter = a[i].nama_pegawai;
            var id_unit = a[i].id_unit;
            var id_penjamin = a[i].id_penjamin;
            var id_pegawai = a[i].id_pegawai;

            Baris += '<tr onclick="penatajasaRWJ_detailpasien(' + "'" + id + "','" + idkunj + "','" + posting + "','" + tglkunj + "','" + norm + "','" + nama + "','" + alamat + "','" + umur + "','" + penjamin + "','" + sep + "','" + telp + "','" + unit + "','" + dokter + "','" + id_unit + "','" + id_penjamin + "','" + id_pegawai + "'" + ')">';
            Baris += '<td>' + no + '</td>';
            Baris += '<td>' + norm + '</td>';
            Baris += '<td>' + nama + '</td>';
            Baris += '<td>' + alamat + '</td>';
            Baris += '<td>' + telp + '</td>';
            Baris += '<td>' + tglkunj + '</td>'
            Baris += '<td>' + unit + '</td>';
            Baris += '<td>' + dokter + '</td>';
            Baris += '<td>' + a[i].nama_penjamin + '</td>';
            Baris += '</tr>';
          }
          $('#penatajasaRWJ_tablepasien tbody').append(Baris);
        }
      }
    });

  }

  function penatajasaRWJ_detailpasien(id, idkunj, posting, tglkunj, norm, nama, alamat, umur, penjamin, sep, telp, unit,dokter,id_unit,id_penjamin,id_pegawai) {
    // alert(norm);
    // exit();
    $('#penatajasaRWJ_content').show();
    $('#penatajasaRWJ_1').hide();

    var json_data = {
      'idtrans': id,
      'tgl_kunj': tglkunj,
      'idkunj': idkunj,
      'posting': posting,
      'nowday': nowday,
      'no_rm': norm,
      'nama': nama.replace(/ /g, '%20'),
      'alamat': alamat.replace(/ /g, '%20'),
      'umur': umur.replace(/ /g, '%20'),
      'penjamin': penjamin.replace(/ /g, '%20'),
      'sep': sep.replace(/ /g, '%20'),
      'telp': telp.replace(/ /g, '%20'),
      'unit': unit.replace(/ /g, '%20'),
      'dokter': dokter.replace(/ /g, '%20'),
      'id_unit': id_unit,
      'id_penjamin': id_penjamin,
      'id_pegawai': id_pegawai,
    };

    var myJSON = JSON.stringify(json_data);
    $('.penatajasaRWJ_content').load('Rawatjalan/mod_RWJPenatajasa?data=' + myJSON);
  }
  function penatajasaRWJ_dokter() {
    apiPOST('Rawatjalan/dokter_pilih', null, hasil => {
      var data = hasil['data'];
      var unit = '';
      unit += '<option value="all">Semua</option>';
      for (var i = 0; i < data.length; i++) {
        unit += '<option value="' + data[i]['id_pegawai'] + '">' + data[i]['nama_pegawai'] + '</option>';
      }
      document.getElementById('penatajasaRWJ_search_dokter').innerHTML = unit;
    });
  }
  penatajasaRWJ_dokter();
</script>