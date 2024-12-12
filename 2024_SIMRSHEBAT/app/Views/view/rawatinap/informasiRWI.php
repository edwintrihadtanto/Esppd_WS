<div class="col-md-12 p-2">
  <div class="card card-outline card-danger">
    <div class="card-body p-2 darkgrey-custom">
      <form id='pencarianpasienrwiinfo'>
        <div class="row row-custom">
          <div class="col-sm-auto">
            <div class="form-group">
              <label>Cari No. RM / Nama Pasien :</label>
              <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                  <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false"></button>
                  <ul class="dropdown-menu">
                    <li class="dropdown-item rwi_kasir_cri_norm" onclick="show_rwi_kasir_cri_norm()">No. RekamMedik</a></li>
                    <li class="dropdown-item rwi_kasir_cri_nmpasien" onclick="show_rwi_kasir_cri_nmpasien()">Nama Pasien</a></li>
                  </ul>
                </div>
                <input type="text" class="form-control form-control-sm" placeholder="Masukkan No. RM" id="rwi_kasir_cri_by_norm">
                <input type="text" class="form-control form-control-sm" placeholder="Masukkan Nama Pasien" id="rwi_kasir_cri_by_nmpasien">
              </div>
            </div>
          </div>
          <!-- <div class="col-sm-auto">
          <div class="form-group">
            <label>Tgl. Kunjung :</label>
            <input type="date" class="form-control form-control-sm">
          </div>
        </div> -->
          <!-- <div class="col-sm-auto">
          <div class="form-group">
            <label>s/d</label>
            <input type="date" class="form-control form-control-sm">
          </div>
        </div> -->
          <div class="col-sm-auto">
            <div class="form-group">
              <label>Kelas :</label>
              <select class="form-control form-control-sm" id="cari_rwi_unit" name="cari_rwi_unit" onchange="tampil_rwipendfruang(event)">
              </select>
            </div>
          </div>
          <div class="col-sm-auto">
            <div class="form-group">
              <label>Ruang :</label>
              <select class="form-control form-control-sm" id="cari_rwi_ruang" name="cari_rwi_ruang" onchange="tampil_rwipendfkamar(event)">
                <option value="">Semua</option>
              </select>
            </div>
          </div>
          <div class="col-sm-auto">
            <div class="form-group">
              <label>Kamar :</label>
              <select class="form-control form-control-sm" id="cari_rwi_kamar" name="cari_rwi_kamar">
                <option value="">Semua</option>
              </select>
            </div>
          </div>
          <div class="col-sm-auto">
            <div class="form-group">
              <label>Status Pulang :</label>
              <select class="form-control form-control-sm" id="status_pulang" name="status_pulang">
                <option value="0">Belum Pulang</option>
                <option value="1">Pulang</option>

              </select>
            </div>
          </div>
          <input type="submit" style="display:none" />
        </div>
    </div>
    </form>

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
          <table id="tabel_rwi_info" class="table table-striped table-sm choose" style="border-collapse: inherit;">
            <thead>
              <tr>
                <th width="50">#</th>
                <th>No. RM</th>
                <th>Nama Pasien</th>
                <th>Alamat(s)</th>
                <th>Tgl Masuk Inap</th>
                <th>Ruang</th>
                <th>Kamar</th>
              </tr>
            </thead>
            <tbody id='listtablePasienRwiinfo'></tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</div>

<div class="dtlKasirRWI"></div>
<div class="dtlBayarKasirRWI"></div>

<script type="text/javascript">
  $(document).ready(function() {
    tampil_pendfrwiunit();
    caripasienrwiinfo();

  })


  $("#pencarianpasienrwiinfo").submit(function(event) {
    caripasienrwiinfo();
    // alert("Handler for .submit() called.");
    event.preventDefault();
  });

  function caripasienrwiinfo() {
    $('#tabel_rwi_info tbody').html('');
    var Baris = '';
    var listParam = [
      'cri_normpendfRWI', 'cri_nmpasienpendfRWI'
    ];
    var param = {
      RWIpendkdpasiencari: $("#rwi_kasir_cri_by_norm").val(),
      RWIpendnmpasiencari: $("#rwi_kasir_cri_by_nmpasien").val(),
      carirwiunit: $("#cari_rwi_unit").val(),
      carirwiruang: $("#cari_rwi_ruang").val(),
      carirwikamar: $("#cari_rwi_kamar").val(),
      statuspulang: $("#status_pulang").val()
      // igdcarialamat: $("#igd_cari_alamat").val(),
      // igdcaritelp: $("#igd_cari_telp").val(),
      // jmlpasienrwicari: $("#jml_pasien_rwi_cari").val(),
    };
    apiPOST("Rawat_inap/caripasienrwiinfo", param, hasil => {
      if (hasil['data'] !== null || hasil['data'] !== '' || empty(hasil['data'])) {
        //alert('tes');
        var a = hasil['data'];
        if (hasil['code'] == 'XX') {
          toastr.error('Data Tidak ditemukan');
        }
        for (var i = 0; i < a.length; i++) {
          // alert(a[i].tgl_transaksi);
          var tgl = a[i].tgl_masuk.substr(8, 2);
          var bln = a[i].tgl_masuk.substr(5, 2);
          var thn = a[i].tgl_masuk.substr(0, 4);
          tglmasuk = tgl + '/' + bln + '/' + thn;
          var no = i + 1;

          Baris += '<tr>';
          Baris += '<td>' + no + '</td>';
          Baris += '<td>' + a[i].no_rm + '</td>';
          Baris += '<td>' + a[i].nama + '</td>';
          Baris += '<td>' + a[i].alamat + '</td>';
          Baris += '<td>' + tglmasuk + '</td>'
          Baris += '<td>' + a[i].nama_ruang + '</td>';
          Baris += '<td>' + a[i].nama_kamar + '</td>';
          Baris += "</tr>";
          // alert('cari pasien' + a[i].id_transaksi );
          no++;
        }
        // $('#RWIpendf_tabel tbody').append(Baris);
        document.getElementById("listtablePasienRwiinfo").innerHTML = Baris;
      }

    }, listParam);
  };


  function tampil_pendfrwiunit() {
    apiPOST('Rawat_inap/unit', null, hasil => {
      var unit = "<option value=''> *Pilih </option>";
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        unit += '<option value="' + a[i]['id_unit'] + '">' + a[i]['nama_unit'] + '</option>';
      }
      document.getElementById('cari_rwi_unit').innerHTML = unit;
    });
  }

  function tampil_rwipendfruang() {
    var param = {
      id: $("#cari_rwi_unit").val()
    };
    apiPOST('Rawat_inap/ruangsps', param, hasil => {
      var ruang = "<option value=''> *Pilih </option>";
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        ruang += '<option value="' + a[i]['id_ruang'] + '">' + a[i]['nama_ruang'] + '</option>';
      }
      document.getElementById('cari_rwi_ruang').innerHTML = ruang;
    });
  }

  function tampil_rwipendfkamar() {
    var param = {
      id: $("#cari_rwi_ruang").val(),
    };
    apiPOST('Data_Sosial/kamarsps', param, hasil => {
      var kamar = "<option value=''> *Pilih </option>";
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        kamar += '<option value="' + a[i]['id_kamar'] + '">' + a[i]['nama_kamar'] + '</option>';
      }
      document.getElementById('cari_rwi_kamar').innerHTML = kamar;
    });
  }

  $('#rwi_kasir_cri_by_norm').show();
  $('#rwi_kasir_cri_by_nmpasien').hide();



  function rwi_kasir_refresh() {
    $('#rwi_kasir_loading').hide();
  }

  setTimeout(rwi_kasir_refresh, 1000);

  function show_rwi_kasir_cri_norm() {
    $('#rwi_kasir_cri_by_norm').show();
    $('#rwi_kasir_cri_by_nmpasien').hide();
    $("#rwi_kasir_cri_by_norm").trigger('focus');
  }

  function show_rwi_kasir_cri_nmpasien() {
    $('#rwi_kasir_cri_by_norm').hide();
    $('#rwi_kasir_cri_by_nmpasien').show();
    $("#rwi_kasir_cri_by_nmpasien").trigger('focus');
  }
</script>