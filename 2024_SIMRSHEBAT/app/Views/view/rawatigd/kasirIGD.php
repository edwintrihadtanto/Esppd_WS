<div class="col-md-12 p-2">
  <div class="card card-outline card-danger">
    <div class="overlay-wrapper" id="loading_kasirIGD">
      <div class="overlay">
        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
      </div>
    </div>
    <form id='pencariankasirigd'>
      <div class="card-body p-2 darkgrey-custom" id="DivCariPasienKasirIGD">
        <div class="row row-custom">
          <div class="col-sm-auto">
            <div class="form-group">
              <label>Cari No. RM / Nama Pasien :</label>
              <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                  <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="height:25px;"></button>
                  <ul class="dropdown-menu">
                    <li class="dropdown-item cri_normKasirIGD" onclick="show_cri_normKasirIGD()">No. RekamMedik</a></li>
                    <li class="dropdown-item cri_nmpasienKasirIGD" onclick="show_cri_nmpasienKasirIGD()">Nama Pasien</a></li>
                  </ul>
                </div>
                <input type="search" class="form-control form-control-xs" placeholder="No. RM..." id="kd_pasiencariKasirIGD" name="kd_pasiencariKasirIGD" autocomplete="off">
                <input type="search" class="form-control form-control-xs" placeholder="Nama Pasien..." id="nm_pasiencariKasirIGD" autocomplete="off">
              </div>
            </div>
          </div>
          <!-- <div class="col-sm-auto">
            <div class="form-group">
              <label> Nik. Kependudukan :</label>
              <input type="search" class="form-control form-control-xs" id="nik_cariigd" name="nik_cariigd" placeholder="NIK..." autocomplete="off">
            </div>
          </div> -->

          <!-- <div class="col-sm-auto">
            <div class="form-group">
              <label for="exempel1"> Telp :</label>
              <input type="search" class="form-control form-control-xs" id="igd_cari_telp" name="igd_cari_telp" placeholder="Telp..." autocomplete="off">
            </div>
          </div> -->

          <!-- <div class="col-sm-auto">
            <div class="form-group">
              <label for="exempel1"> Alamat :</label>
              <input type="search" class="form-control form-control-xs" id="igd_cari_alamat" name="igd_cari_alamat" placeholder="Alamat..." autocomplete="off">
            </div>
          </div> -->

          <div class="col-sm-auto">
            <div class="form-group">
              <label for="exempel1"> Tgl. Kunjung :</label>
              <input type="date" class="form-control form-control-xs" data-date-format="dd-mm-yyyy" id="igd_cari_tgl1" name="igd_cari_tgl1" placeholder="date..." autocomplete="off">
            </div>
          </div>

          <div class="col-sm-auto">
            <div class="form-group">
              <label for="exempel1">s/d</label>
              <input type="date" class="form-control form-control-xs" id="igd_cari_tgl2" name="igd_cari_tgl2" placeholder="date..." autocomplete="off">
            </div>
          </div>

          <div class="col-sm-auto">
            <div class="form-group">
              <label for="exempel1"> Status :</label>
              <select size="1" class="form-control form-control-xs" id="igd_cari_status_lunas">
                <option value="f">Belum Lunas</option>
                <option value="t">Lunas</option>
              </select>
            </div>
          </div>


          <div class="col-sm-auto">
            <div class="form-group">
              <label for="exempel1"> Jmlh Pasien :</label>
              <select size="1" class="form-control form-control-xs" id="jml_pasien_igd_cari">
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
      <input type="submit" style="display:none" />
    </form>
    <div class="col-12 p-1">
      <div class="card">
        <div class="card-header p-2 darkgrey-custom">
          <h6 class="hr6-custom"><i class="fas fa-hospital-user"></i> Daftar Pasien</h6>
        </div>
        <div class="card-body" style="padding: 0px; max-height: 320px; overflow: auto;">
          <table id="tableKasirIGD" class="table table-striped table-sm choose" style="border-collapse: inherit;">
            <thead>
              <tr>
                <th>#</th>
                <th>Status Bayar</th>
                <th>No. Transaksi</th>
                <th>Tgl Kunjungan</th>
                <th>No. RM</th>
                <th>Nama Pasien</th>
                <th>Penjamin</th>
                <th>Poliklinik</th>
              </tr>
            </thead>
            <tbody id='listtableKasirIGD'>

            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</div>

<div class="dtlKasirIGD"></div>
<div class="dtlBayarIGD"></div>
<div class="lookkup"></div>
<div class="depositpasien"></div>

<script type="text/javascript">
  // $(document).ready(function() {
  var MyTable = $('#tableKasirIGD').dataTable({
    "paging"        : true,
    "lengthChange"  : true,
    "searching"     : false,
    "ordering"      : true,
    "info"          : false,
    "autoWidth"     : false
  });

  function refresh() {
    MyTable = $('#tableKasirIGD').dataTable();
  }

  function caripasienigd() {
    var listParam = [
      'igd_cari_tgl1', 'igd_cari_tgl2'
    ];
    var param = {
      kdpasiencariKasirIGD  : $("#kd_pasiencariKasirIGD").val(),
      nikcariigd            : $("#nik_cariigd").val(),
      // igdcarialamat: $("#igd_cari_alamat").val(),
      // igdcaritelp: $("#igd_cari_telp").val(),
      jmlpasienigdcari      : $("#jml_pasien_igd_cari").val(),
      igdcaritgl1           : $("#igd_cari_tgl1").val(),
      igdcaritgl2           : $("#igd_cari_tgl2").val(),
      igdcaristatuslunas    : $("#igd_cari_status_lunas").val()
    };
    apiPOST("Gawat_Darurat/caripasienigd", param, hasil => {
      if (hasil['data'] !== null) {
        //alert('tes');
        if (hasil['code'] == 'XX') {
          toastr.error('Data Tidak ditemukan');
        }
        var Baris = '';
        var a = hasil['data'];
        for (var i = 0; i < a.length; i++) {
          // alert(a[i].tgl_transaksi);
          var tgl = a[i].tgl_transaksi.substr(8, 2);
          var bln = a[i].tgl_transaksi.substr(5, 2);
          var thn = a[i].tgl_transaksi.substr(0, 4);
          tgltransaksi = tgl + '/' + bln + '/' + thn;
          jamtranskasi = a[i].tgl_transaksi.substr(11, 8);
          var no = i + 1;
          if (a[i].lunas == false || a[i].lunas == 'f') {
            var status = 'BELUM LUNAS';
          } else {
            var status = 'LUNAS';
          }
          // Baris += '<tr class="odd" data-id="'+a[i].id_transaksi +'" data-id1="'+a[i].id_kunjungan +'" onclick="caripasienKasirIGD(' + a[i].id_transaksi + ')" >';
          Baris += '<tr class="odd caritransaksi" data-id="' + a[i].id_transaksi + '" data-id1="' + a[i].id_kunjungan + '">';
          Baris += '<td>' + no + '</td>';
          Baris += '<td >' + status + '</td>';
          Baris += '<td>' + a[i].id_transaksi + '</td>';
          Baris += '<td>' + tgltransaksi + ' ' + jamtranskasi + '</td>';
          Baris += '<td>' + a[i].no_rm + '</td>';
          Baris += '<td>' + a[i].nama + '</td>';
          Baris += '<td>' + a[i].nama_penjamin + '</td>';
          Baris += '<td>' + a[i].nama_unit + '</td>';
          Baris += "</tr>";
          // alert('cari pasien' + a[i].id_transaksi );
          no++;
        }
        MyTable.fnDestroy();
        //$('#tableKasirIGD tbody').append(Baris);
        document.getElementById("listtableKasirIGD").innerHTML = Baris;
        refresh();

      }

    }, listParam);
  };

  $('#kd_pasiencariKasirIGD').show();
  $('#nm_pasiencariKasirIGD').hide();
  $('#loading_kasirIGD').hide();

  function show_cri_normKasirIGD() {
    $('#kd_pasiencariKasirIGD').show();
    $('#nm_pasiencariKasirIGD').hide();
    $("#kd_pasiencariKasirIGD").trigger('focus');
  }

  function show_cri_nmpasienKasirIGD() {
    $('#kd_pasiencariKasirIGD').hide();
    $('#nm_pasiencariKasirIGD').show();
    $("#nm_pasiencariKasirIGD").trigger('focus');
  }

  $("#kd_pasiencariKasirIGD").click(function() {
    //$('#loading_kasirIGD').show();
    //data_KasirIGD();
  });

  // function data_KasirIGD() {
  //   $('#loading_kasirIGD').hide();
  //   $('#tableKasirIGD tbody').html('');
  //   var Baris = '<tr>';
  //   for (var i = 0; i < 15; i++) {
  //     var no = i + 1;
  //     Baris += '<td>' + no + '</td>';
  //     Baris += '<td onclick="caripasienKasirIGD()">LUNAS</td>';
  //     Baris += '<td onclick="caripasienKasirIGD()">10000' + no + '</td>';
  //     Baris += '<td onclick="caripasienKasirIGD()">' + no + '-Feb-2023</td>';
  //     Baris += '<td>000' + no + '</td>';
  //     Baris += '<td>Reski Alfan D.</td>';
  //     Baris += '<td>BPJS NON PBI</td>';
  //     Baris += '<td>Syaraf</td>';
  //     Baris += "</tr>";
  //   }
  //   $('#tableKasirIGD tbody').append(Baris);
  // }

  function caripasienKasirIGD() {
    $('.dtlKasirIGD').load('Gawatdarurat/mod_IGDkasir/');
  }

  $(document).on("click", ".caritransaksi", function() {
        //alert('ok');
        var idtransaksi = $(this).attr("data-id");
        var idkunjungan = $(this).attr("data-id");
        var json_data = {
          'id_transaksi': idtransaksi,
          'id_kunjungan': idkunjungan,
        };

        var myJSON = JSON.stringify(json_data);
        //alert(id);

        $('.dtlKasirIGD').load('Gawatdarurat/mod_IGDkasir?data=' + myJSON);

        })


      function tamp_bayarIGD() {
        $('.dtlBayarIGD').load('Gawatdarurat/mod_IGDBayarkasir');
      }

      function tamp_look() {
        $('.lookkup').load('Transaksi/mod_lookkup');
      }
      function tamp_depositpasien() {
        $('.lookkup').load('Transaksi/mod_deposit');
      }

      $("#pencariankasirigd").submit(function(event) {
        caripasienigd();
        // alert("Handler for .submit() called.");
        event.preventDefault();
      });



      awal();

      function awal() {

        var inputHari = 30;
        var harike1 = new Date(new Date().getTime() - (inputHari * 24 * 60 * 60 * 1000)); // 1000 ini buat pengkalian milisecondnya date object
        var day1 = ("0" + harike1.getDate()).slice(-2);
        var month1 = ("0" + (harike1.getMonth() + 1)).slice(-2);
        var tgl1 = harike1.getFullYear() + "-" + (month1) + "-" + (day1);
        $('#igd_cari_tgl1').val(tgl1);


        var now = new Date();
        var day = ("0" + now.getDate()).slice(-2);
        var month = ("0" + (now.getMonth() + 1)).slice(-2);
        var tgl2 = now.getFullYear() + "-" + (month) + "-" + (day);
        $('#igd_cari_tgl2').val(tgl2);

        //alert(harike1);

      }
      // })
</script>