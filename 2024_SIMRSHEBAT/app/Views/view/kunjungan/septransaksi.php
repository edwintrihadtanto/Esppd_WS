<div class="col-md-12 p-2">
  <div class="card card-outline card-danger">
    <div class="overlay-wrapper" id="loading_Sep">
      <div class="overlay">
        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
      </div>
    </div>
    <form id='pencarianSep'>
      <div class="card-body p-2 darkgrey-custom" id="DivCariPasienSep">
        <div class="row row-custom">
          <div class="col-sm-auto">
            <div class="form-group">
              <label>Cari No. RM / Nama Pasien :</label>
              <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                  <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="height:25px;"></button>
                  <ul class="dropdown-menu">
                    <li class="dropdown-item cri_normSep" onclick="show_cri_normSep()">No. RekamMedik</a></li>
                    <li class="dropdown-item cri_nmpasienSep" onclick="show_cri_nmpasienSep()">Nama Pasien</a></li>
                  </ul>
                </div>
                <input type="search" class="form-control form-control-xs" placeholder="No. RM..." id="kd_pasiencariSep" name="kd_pasiencariSep" autocomplete="off">
                <input type="search" class="form-control form-control-xs" placeholder="Nama Pasien..." id="nm_pasiencariSep" autocomplete="off">
              </div>
            </div>
          </div>
          <!-- <div class="col-sm-auto">
            <div class="form-group">
              <label> Nik. Kependudukan :</label>
              <input type="search" class="form-control form-control-xs" id="nik_cari" name="nik_cari" placeholder="NIK..." autocomplete="off">
            </div>
          </div> -->

          <!-- <div class="col-sm-auto">
            <div class="form-group">
              <label for="exempel1"> Telp :</label>
              <input type="search" class="form-control form-control-xs" id="_cari_telp" name="_cari_telp" placeholder="Telp..." autocomplete="off">
            </div>
          </div> -->

          <!-- <div class="col-sm-auto">
            <div class="form-group">
              <label for="exempel1"> Alamat :</label>
              <input type="search" class="form-control form-control-xs" id="_cari_alamat" name="_cari_alamat" placeholder="Alamat..." autocomplete="off">
            </div>
          </div> -->

          <div class="col-sm-auto">
            <div class="form-group">
              <label for="exempel1"> Tgl. Kunjung :</label>
              <input type="date" class="form-control form-control-xs" data-date-format="dd-mm-yyyy" id="_cari_tgl1" name="_cari_tgl1" placeholder="date..." autocomplete="off">
            </div>
          </div>

          <div class="col-sm-auto">
            <div class="form-group">
              <label for="exempel1">s/d</label>
              <input type="date" class="form-control form-control-xs" id="_cari_tgl2" name="_cari_tgl2" placeholder="date..." autocomplete="off">
            </div>
          </div>




          <div class="col-sm-auto">
            <div class="form-group">
              <label for="exempel1"> Jmlh Pasien :</label>
              <select size="1" class="form-control form-control-xs" id="jml_pasien__cari" onchange="caripasien()">
                <option value="10">10 Pasien</option>
                <option value="15">15 Pasien</option>
                <option value="20">20 Pasien</option>
                <option value="25">25 Pasien</option>
                <option value="30">30 Pasien</option>
                <option value="30">Semuas Pasien</option>
              </select>
              <input type='hidden' id='namakas' name='namakas'>

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
        <div class="card-body" style="padding: 0px; max-height: 350px; overflow: auto;">
          <table id="tableseptransaksi" class="table table-striped table-sm choose" style="border-collapse: inherit;">
            <thead>
              <tr>
                <th>#</th>
                <th>Kunjungan</th>
                <th>No. Transaksi</th>
                <th>Tgl Kunjungan</th>
                <th>No. RM</th>
                <th>Nama Pasien</th>
                <th>Penjamin Utama</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody id='listtableseptransaksi'>

            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</div>
<div class="dtlSep"></div>
<div class="editSep"></div>


<script type="text/javascript">
  //  toastr.error('Sekarang Shift 1');
  $(document).ready(function() {
    caripasien();
  });
  var Mytableseptransaksi = $('#tableseptransaksi').dataTable({
    "paging": true,
    "lengthChange": true,
    "searching": false,
    "ordering": true,
    "info": false,
    "autoWidth": false
  });

  function Historykunjunganrefresh() {
    Mytableseptransaksi = $('#tableseptransaksi').dataTable();
  }

  function caripasien() {
    $('#loading_Sep').show();
    // var normxrwi = document.getElementById('kd_pasiencariSep').value;
    // document.getElementById('kd_pasiencariSep').value = normOtomatis(normxrwi);
    var listParam = [
      '_cari_tgl1', '_cari_tgl2'
    ];
    var param = {
      kdpasiencariSep: $("#kd_pasiencariSep").val(),
      nmpasiencariSep: $("#nm_pasiencariSep").val(),
      nikcari: $("#nik_cari").val(),
      jmlpasiencari: $("#jml_pasien__cari").val(),
      caritgl1: $("#_cari_tgl1").val(),
      caritgl2: $("#_cari_tgl2").val(),


    };
    apiPOST("Historykunjungan/caripasien", param, hasil => {
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
          if (a[i].tgl_tutup == null) {
            var tutup = 'OPEN';
          } else {
            var tutup = 'CLOSE';
          }

          if(a[i].namaunit==null|a[i].namaunit==''){
            var namaunit ='';
          }
          else{
            var namaunit =a[i].namaunit;
          }

          // var namaunit = a[i].namaunit;
          var namaunit = namaunit.replace(/("|{|})/g, ' ');
          // Baris += '<tr class="odd" data-id="'+a[i].id_transaksi +'" data-id1="'+a[i].id_kunjungan +'" onclick="caripasienSep(' + a[i].id_transaksi + ')" >';
          // Baris += '<tr class="odd caritransaksi" data-id="' + a[i].id_transaksi + '" data-id1="' + a[i].id_kunjungan + '">';
          Baris += '<tr class="odd" >';
          Baris += '<td>' + no + '</td>';
          Baris += '<td >' + namaunit + '</td>';
          Baris += '<td>' + a[i].id_transaksi + '</td>';
          Baris += '<td>' + tgltransaksi + ' ' + jamtranskasi + '</td>';
          Baris += '<td>' + a[i].no_rm + '</td>';
          Baris += '<td>' + a[i].nama + '</td>';
          Baris += '<td>' + a[i].nama_penjamin + '</td>';
          if (a[i].nama_penjamin == 'BPJS') {
            Baris += '<td><button type="button" class="btn btn-block bg-gradient-info btn-xs" ondblclick="caritransaksiSep(' + a[i].id_transaksi + ');" ><i class="fa fa-check"></i> Sep</button></td>';
          } else {
            Baris += '<td></td>';
          }
          Baris += "</tr>";
          // alert('cari pasien' + a[i].id_transaksi );
          no++;
        }
        Mytableseptransaksi.fnDestroy();
        //$('#tableseptransaksi tbody').append(Baris);
        document.getElementById("listtableseptransaksi").innerHTML = Baris;
        Historykunjunganrefresh();
        $('#loading_Sep').hide();
      }

    }, listParam);
  };

  $('#kd_pasiencariSep').show();
  $('#nm_pasiencariSep').hide();
  $('#loading_Sep').hide();

  function show_cri_normSep() {
    $('#kd_pasiencariSep').show();
    $('#nm_pasiencariSep').hide();
    $("#kd_pasiencariSep").trigger('focus');
  }

  function show_cri_nmpasienSep() {
    $('#kd_pasiencariSep').hide();
    $('#nm_pasiencariSep').show();
    $("#nm_pasiencariSep").trigger('focus');
  }

  $("#kd_pasiencariSep").click(function() {
    //$('#loading_Sep').show();
    //data_Sep();
  });

  function caripasienSep() {
    $('.dtlSep').load('Historykunjungan/mod_Sep/');
  }


  function caritransaksiSep(val_idtransaksi) {
    $('#loading_Sep').show();
    var idtransaksi = val_idtransaksi;
    var json_data = {
      'id_transaksi': idtransaksi
    };

    var myJSON = JSON.stringify(json_data);
    $('#loading_Sep').show();
    //alert(id);
    $('.dtlSep').load('Historykunjungan/mod_Sep?data=' + myJSON);
  };



  $("#pencarianSep").submit(function(event) {
    caripasien();
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
    $('#_cari_tgl1').val(tgl1);


    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var tgl2 = now.getFullYear() + "-" + (month) + "-" + (day);
    $('#_cari_tgl2').val(tgl2);
  }
  // })
</script>