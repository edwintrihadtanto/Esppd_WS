<div class="col-md-12 p-2">
  <div class="card card-outline card-danger">
    <div class="overlay-wrapper" id="loading_Klaim">
      <div class="overlay">
        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
      </div>
    </div>
    <form id='pencarianKlaim'>
      <div class="card-body p-2 darkgrey-custom" id="DivcaripasieneklaimKlaim">
        <div class="row row-custom">
          <div class="col-sm-auto">
            <div class="form-group">
              <label>Cari No. RM / Nama Pasien :</label>
              <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                  <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="height:25px;"></button>
                  <ul class="dropdown-menu">
                    <li class="dropdown-item cri_normKlaim" onclick="show_cri_normKlaim()">No. RekamMedik</a></li>
                    <li class="dropdown-item cri_nmpasienKlaim" onclick="show_cri_nmpasienKlaim()">Nama Pasien</a></li>
                  </ul>
                </div>
                <input type="search" class="form-control form-control-xs" placeholder="No. RM..." id="kd_pasiencariKlaim" name="kd_pasiencariKlaim" autocomplete="off">
                <input type="search" class="form-control form-control-xs" placeholder="Nama Pasien..." id="nm_pasiencariKlaim" autocomplete="off">
              </div>
            </div>
          </div>


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

          <!-- <div class="col-sm-auto">
            <div class="form-group">
              <label for="exempel1"> Status :</label>
              <select size="1" class="form-control form-control-xs" id="_cari_status_lunas" onchange="caripasieneklaim()">
                <option value="all"> - Semua - </option>
                <option value="f">Belum Lunas</option>
                <option value="t">Lunas</option>
              </select>
            </div>
          </div> -->

          <div class="col-sm-auto">
            <div class="form-group">
              <label for="exempel1"> Tutup Transaksi :</label>
              <select size="1" class="form-control form-control-xs" id="_cari_status_tutup_transaksi" onchange="caripasieneklaim()">
                <option value="all"> - Semua - </option>
                <option value="f">Belum Tutup Transakasi</option>
                <option value="t">Tutup Transaksi</option>
              </select>
            </div>
          </div>

          <!-- <div class="col-sm-auto">
            <div class="form-group">
              <label for="exempel1"> Tipe :</label>
              <select size="1" class="form-control form-control-xs" id="tipe_pelayanan" onchange="caripasieneklaim()">
                <option value="all"> - Semua - </option>
                <option value="f">Rawat Inap</option>
                <option value="t">Rawat Jalan</option>
              </select>
            </div>
          </div> -->


          <div class="col-sm-auto">
            <div class="form-group">
              <label for="exempel1"> Jumlah Pasien :</label>
              <select size="1" class="form-control form-control-xs" id="jml_pasien__cari" onchange="caripasieneklaim()">
                <option value="10">10 Pasien</option>
                <option value="15">15 Pasien</option>
                <option value="20">20 Pasien</option>
                <option value="25">25 Pasien</option>
                <option value="30">30 Pasien</option>
                <option value="all">Semuas Pasien</option>
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
          <table id="tableKlaim" class="table table-striped table-sm choose" style="border-collapse: inherit;">
            <thead>
              <tr>
                <th>#</th>
                <th>Status Transaksi</th>
                <!-- <th>Status Bayar</th> -->
                <th>No. Transaksi</th>
                <th>Tgl Kunjungan</th>
                <th>No. RM</th>
                <th>Nama Pasien</th>
                <th>Sep</th>
                <th>Aksi</th>

              </tr>
            </thead>
            <tbody id='listtableKlaim'>

            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</div>
<div class="dtlKlaim"></div>
<div class="dtlBayar"></div>
<div class="lookkup"></div>
<div class="bukatransakasiKlaim"></div>
<div class="tutuptransakasiKlaim"></div>
<div class="bataltransakasiKlaim"></div>
<div class="depositpasien"></div>
<div class="tambahpenjaminKlaim"></div>
<div class="dtlhistoryPiutang"></div>
<div class="dtlBayarPelunasan"></div>





<script type="text/javascript">
  //  toastr.error('Sekarang Shift 1');
  $(document).ready(function() {
    caripasieneklaim();
  });
  var MyTableKlaim = $('#tableKlaim').dataTable({
    "paging": true,
    "lengthChange": true,
    "searching": false,
    "ordering": true,
    "info": false,
    "autoWidth": false
  });

  function Eklaimrefresh() {
    MyTableKlaim = $('#tableKlaim').dataTable();
  }

  function caripasieneklaim() {
    $('#loading_Klaim').show();
    // var normxrwi = document.getElementById('kd_pasiencariKlaim').value;
    // document.getElementById('kd_pasiencariKlaim').value = normOtomatis(normxrwi);
    var listParam = [
      '_cari_tgl1', '_cari_tgl2'
    ];
    var param = {
      kdpasiencariKlaim: $("#kd_pasiencariKlaim").val(),
      nmpasiencariKlaim: $("#nm_pasiencariKlaim").val(),
      nikcari: $("#nik_cari").val(),
      // carialamat: $("#_cari_alamat").val(),
      // caritelp: $("#_cari_telp").val(),
      jmlpasiencari: $("#jml_pasien__cari").val(),
      caritgl1: $("#_cari_tgl1").val(),
      caritgl2: $("#_cari_tgl2").val(),
      caristatustutuptransaksi: $("#_cari_status_tutup_transaksi").val(),
      tipe_pelayanan: $("#tipe_pelayanan").val()


    };
    apiPOST("Eklaim/caripasien", param, hasil => {
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
        
          Baris += '<tr class="odd"  ondblclick="caritransaksiKlaim('+"'"+a[i].id_transaksi+"','"+a[i].no_sjp+"'"+')">';
          Baris += '<td>' + no + '</td>';
          Baris += '<td >' + tutup + '</td>';
          // Baris += '<td >' + status + '</td>';
          Baris += '<td>' + a[i].id_transaksi + '</td>';
          Baris += '<td>' + tgltransaksi + ' ' + jamtranskasi + '</td>';
          Baris += '<td>' + a[i].no_rm + '</td>';
          Baris += '<td>' + a[i].nama + '</td>';
          Baris += '<td>' + a[i].no_sjp + '</td>';
          Baris += '<td><button type="button" class="btn btn-info btn-sm" aria-expanded="false" style="height:25px;">Lihat</button> </td>';
          Baris += "</tr>";
          // alert('cari pasien' + a[i].id_transaksi );
          no++;
        }
        MyTableKlaim.fnDestroy();
        //$('#tableKlaim tbody').append(Baris);
        document.getElementById("listtableKlaim").innerHTML = Baris;
        Eklaimrefresh();
        $('#loading_Klaim').hide();


      }

    }, listParam);
  };

  $('#kd_pasiencariKlaim').show();
  $('#nm_pasiencariKlaim').hide();
  $('#loading_Klaim').hide();

  function show_cri_normKlaim() {
    $('#kd_pasiencariKlaim').show();
    $('#nm_pasiencariKlaim').hide();
    $("#kd_pasiencariKlaim").trigger('focus');
  }

  function show_cri_nmpasienKlaim() {
    $('#kd_pasiencariKlaim').hide();
    $('#nm_pasiencariKlaim').show();
    $("#nm_pasiencariKlaim").trigger('focus');
  }

  $("#kd_pasiencariKlaim").click(function() {
    //$('#loading_Klaim').show();
    //data_Klaim();
  });


  function caripasieneklaimKlaim() {
    $('.dtlKlaim').load('Eklaim/mod_Klaim/');
  }

  function lihatklaim(val_idtransaksi,val_sep){
    caritransaksiKlaim(val_idtransaksi,val_sep);
  }


  function caritransaksiKlaim(val_idtransaksi,val_sep) {
    $('#loading_Klaim').show();

    var idtransaksi = val_idtransaksi;
    var sep = val_sep;
    var json_data = {
      'id_transaksi': idtransaksi,
      'no_sjp':val_sep
    };
    var myJSON = JSON.stringify(json_data);
    $('#loading_Klaim').show();
    //alert(id);
    $('.dtlKlaim').load('Eklaim/mod_Klaim?data=' + myJSON);

  };

  

  function tamp_tutuptransaksiKlaim() {
    $('.lookkup').load('Eklaim/mod_tutuptransaksi');
  }




  $("#pencarianKlaim").submit(function(event) {
    caripasieneklaim();
    // alert("Handler for .submit() called.");
    event.preventDefault();
  });

  function kirim_keeklaim(val_idtransaksi) {
    alert('Sukses Kirim eklaim');
  }

  



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