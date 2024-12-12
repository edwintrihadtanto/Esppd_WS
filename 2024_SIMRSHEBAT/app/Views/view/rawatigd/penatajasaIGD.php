<?php
date_default_timezone_set('Asia/Jakarta'); 
$nowday     = date('Y-m-d');
//$nextday    = date('Y-m-d', strtotime('+1 days', strtotime($nowday))); 
$nextday    = $nowday;
?>
<div class="col-md-12 p-2" id="penatajasaIGD_1">
  <div class="card card-outline card-default" style="margin-bottom:0;">

    <div class="overlay-wrapper" id="penatajasaIGD_loading">
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
                  <li class="dropdown-item" onclick="show_cri_normpenatajasaIGD()">No. RekamMedik</a></li>
                  <li class="dropdown-item" onclick="show_cri_nmpasienpenatajasaIGD()">Nama Pasien</a></li>
                </ul>
              </div>
              <!-- /btn-group -->
              <input type="number" class="form-control form-control-xs" placeholder="Entry No. RM" id="cri_by_normpenatajasaIGD">
              <input type="text" class="form-control form-control-xs" placeholder="Entry Nama Pasien" id="cri_by_nmpasienpenatajasaIGD">
            </div>
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label> NIK:</label>
            <input type="search" class="form-control form-control-xs" id="penatajasaIGD_search_nik" placeholder="Entry NIK" autocomplete="off">
          </div>
        </div>
        <!-- <div class="col-sm-auto">
          <div class="form-group">
            <label for="exempel1"> Telp :</label>
            <input type="search" class="form-control form-control-xs" id="penatajasaIGD_search_telp" placeholder="Entry Telp" autocomplete="off">
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label for="exempel1"> Alamat :</label>
            <input type="search" class="form-control form-control-xs" id="penatajasaIGD_search_alamat" placeholder="Entry Alamat" autocomplete="off">
          </div>
        </div> -->
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Poliklinik :</label>
            <select class="form-control form-control-xs" id="penatajasaIGD_search_unitPoli"></select>
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Jumlh Pasien :</label>
            <select class="form-control form-control-xs" id="penatajasaIGD_search_jumlah">
              <option value="5">5 Pasien</option>
              <option value="10">10 Pasien</option>
              <option value="15">15 Pasien</option>
              <option value="20">20 Pasien</option>
              <option value="25">25 Pasien</option>
              <option value="30">30 Pasien</option>
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
                <h6 class="hr6-custom" id="penatajasaIGD_titleheader"><i class="fas fa-users"></i> Daftar Pasien IGD</h6>
                <!-- <div id="penatajasaIGD_button1">
                  <button type="button" class="btn bg-gradient-secondary btn-xs"> <i class="fas fa-arrow-left"></i></i> Kembali</button>
                </div> -->
              </div>
              <div class="col-md-2">
                <div class="form_group">
                  <label>Tgl. Kunjung :</label>
                  <input type="date" id="penatajasaIGD_tglkunjungan" class="form-control form-control-xs">
                </div>
              </div>
            </div>
          </div>

          <div class="card-body" id='div_penatajasaIGD' style="padding: 0px; max-height: 320px; overflow: auto;">
            <table id="penatajasaIGD_tablepasien" class="table table-striped table-sm choose" style="border-collapse: inherit;">
              <thead>
                <tr>
                  <th width="15">#</th>
                  <th>No. RM</th>
                  <th>Nama Pasien</th>
                  <th>Alamat(s)</th>
                  <th>Telp</th>
                  <th>Tgl Kunjungan</th>
                  <th>Jam</th>
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
</div> <!-- penatajasaIGD_1 -->

<div class="penatajasaIGD_content"></div>

<script type="text/javascript">
  var nowday = "<?php echo $nowday; ?>";
  show_cri_normpenatajasaIGD();
  penatajasaIGD_unit();
  penatajasaIGD_tablepasien();

  $("#cri_by_normpenatajasaIGD").keydown(function(event) {
    switch (event.which) {
      case 13:
        $('#penatajasaIGD_loading').show();
        penatajasaIGD_tablepasien();
        break;
    }
  });

  $("#cri_by_nmpasienpenatajasaIGD").keydown(function(event) {
    switch (event.which) {
      case 13:
        $('#penatajasaIGD_loading').show();
        penatajasaIGD_tablepasien();
        break;
    }
  });

  $("#penatajasaIGD_search_nik").keydown(function(event) {
    switch (event.which) {
      case 13:
        $('#penatajasaIGD_loading').show();
        penatajasaIGD_tablepasien();
        break;
    }
  });

  $("#penatajasaIGD_search_unitPoli").change(function(event) {
    $('#penatajasaIGD_loading').show();
    penatajasaIGD_tablepasien();
  });

  $("#penatajasaIGD_search_jumlah").change(function(event) {
    $('#penatajasaIGD_loading').show();
    penatajasaIGD_tablepasien();
  });

  $("#penatajasaIGD_tglkunjungan").keydown(function(event) {
    switch (event.which) {
      case 13:
        $('#penatajasaIGD_loading').show();
        penatajasaIGD_tablepasien();
        break;
    }
  });

  function show_cri_normpenatajasaIGD() {
    $('#cri_by_normpenatajasaIGD').show();
    $('#cri_by_nmpasienpenatajasaIGD').hide();
    $("#cri_by_normpenatajasaIGD").trigger('focus');
    document.getElementById('penatajasaIGD_tglkunjungan').value = nowday;
    document.getElementById('cri_by_nmpasienpenatajasaIGD').value = '';
  }

  function show_cri_nmpasienpenatajasaIGD() {
    $('#cri_by_normpenatajasaIGD').hide();
    $('#cri_by_nmpasienpenatajasaIGD').show();
    $("#cri_by_nmpasienpenatajasaIGD").trigger('focus');
    document.getElementById('cri_by_normpenatajasaIGD').value = '';
  }

  function penatajasaIGD_unit() {
    apiPOST('Gawat_Darurat/unit', null, hasil => {
      var data = hasil['data'];
      var unit = '';
      unit += '<option value="0">Semua Poli</option>';
      for (var i = 0; i < data.length; i++) {
        unit += '<option value="' + data[i]['id_unit'] + '">' + data[i]['nama_unit'] + '</option>';
      }
      document.getElementById('penatajasaIGD_search_unitPoli').innerHTML = unit;
    });
  }

  function penatajasaIGD_tablepasien() {
    var normIGD = document.getElementById('cri_by_normpenatajasaIGD').value;
    // document.getElementById('cri_by_normpenatajasaIGD').value = normOtomatis(normIGD);
    $('#penatajasaIGD_loading').show();
    var listParam = [
      'cri_by_normpenatajasaIGD', 'cri_by_nmpasienpenatajasaIGD', 'penatajasaIGD_search_nik', 'penatajasaIGD_search_telp', 'penatajasaIGD_search_alamat', 'penatajasaIGD_search_unitPoli', 'penatajasaIGD_tglkunjungan'
    ];
    var param = {
      norm: normIGD,
      nmpasien: document.getElementById('cri_by_nmpasienpenatajasaIGD').value,
      nik: document.getElementById('penatajasaIGD_search_nik').value,
      poli: document.getElementById('penatajasaIGD_search_unitPoli').value,
      jml: document.getElementById('penatajasaIGD_search_jumlah').value,
      tglkunj: document.getElementById('penatajasaIGD_tglkunjungan').value
    };

    apiPOST("Gawat_Darurat/penatajasaIGD_detailpasien", param, hasil => {
      $('#penatajasaIGD_loading').hide();
      $('#penatajasaIGD_tablepasien tbody').html('');
      if (hasil['data'] !== null) {
        if (hasil['code'] == 'XX') {
          //toastr.error("Data tidak ditemukan");
          var Baris = "";
          Baris += "<tr>";
          Baris += '<td colspan="8" align="center">Data tidak ditemukan</td>';
          Baris += "</tr>";
          $('#penatajasaIGD_tablepasien tbody').append(Baris);
          document.getElementById('cri_by_normpenatajasaIGD').value = '';
          document.getElementById('cri_by_nmpasienpenatajasaIGD').value = '';
          document.getElementById('penatajasaIGD_search_nik').value = '';

        } else {

          var Baris = "";
          var a = hasil['data'];
          for (var i = 0; i < a.length; i++) {
            var nama = a[i].nama.replace(/'/g, ' ');
            var no = i + 1;
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
            var jammasuk = a[i].jam_masuk.substr(10, 6);
            

            Baris += '<tr onclick="penatajasaIGD_detailpasien(' + "'" + id + "','" + idkunj + "','" + posting + "','" + tglkunj + "','" + norm + "','" + nama + "','" + alamat + "','" + umur + "','" + penjamin + "','" + sep + "','" + telp + "','" + unit + "','"+dokter+"','"+id_unit+"','"+id_penjamin+"','"+id_pegawai+"'"+')">';
            Baris += '<td>' + no + '</td>';
            Baris += '<td>' + norm + '</td>';
            Baris += '<td>' + nama + '</td>';
            Baris += '<td>' + alamat + '</td>';
            Baris += '<td>' + telp + '</td>';
            Baris += '<td>' + tglkunj + '</td>';
            Baris += '<td>' + jammasuk + '</td>';
            Baris += '<td>' + unit + '</td>';
            Baris += '<td>' + dokter + '</td>';
            Baris += '<td>' + a[i].nama_penjamin; + '</td>';
            Baris += "</tr>";
          }
          $('#penatajasaIGD_tablepasien tbody').append(Baris);
        }
      }
    });

  }

  function penatajasaIGD_detailpasien(id, idkunj,posting, tglkunj, norm, nama, alamat, umur, penjamin, sep, telp, unit, dokter,id_unit,id_penjamin,id_pegawai) {

    $('#penatajasaIGD_content').show();
    $('#penatajasaIGD_1').hide();
    var dokterx = dokter.replace(",", " ");
    var json_data = {
      'idtrans': id,
      'idkunj': idkunj,
      'tgl_kunj': tglkunj,
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
      'dokter': dokterx.replace(/ /g, '%20'),
      'id_unit': id_unit,
      'id_penjamin': id_penjamin,
      'id_pegawai': id_pegawai
    };

    var myJSON = JSON.stringify(json_data);
    $('.penatajasaIGD_content').load('Gawatdarurat/mod_IGDPenatajasa?data=' + myJSON);
  }

  
</script>