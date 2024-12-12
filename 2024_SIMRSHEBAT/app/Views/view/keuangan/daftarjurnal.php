<div class="col-md-12 p-2">
  <div class="card card-outline card-danger">
    <div class="overlay-wrapper" id="loading_kasir">
      <div class="overlay">
        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
      </div>
    </div>
    <form id='pencariandaftarjurnal'>
      <div class="card-body p-2 darkgrey-custom" id="DivCariPasienKasir">
        <div class="row row-custom">
          <div class="col-sm-auto">
            <div class="form-group">
              <label>Cari No. Transaksi / Id GL :</label>
              <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                  <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="height:25px;"></button>
                  <ul class="dropdown-menu">
                    <li class="dropdown-item cri_normKasir" onclick="show_cri_normKasir()">No. Transaksi</a></li>
                    <li class="dropdown-item cri_nmpasienKasir" onclick="show_cri_nmpasienKasir()">ID GL</a></li>
                  </ul>
                </div>
                <input type="search" class="form-control form-control-xs" placeholder="No. Transaksi..." id="kd_pasiencariKasir" name="kd_pasiencariKasir" autocomplete="off">
                <input type="search" class="form-control form-control-xs" placeholder="ID GL..." id="nm_pasiencariKasir" autocomplete="off">
              </div>
            </div>
          </div>
          
          <div class="col-sm-auto">
            <div class="form-group">
              <label for="exempel1"> Periode Tanggal :</label>
              <input type="date" class="form-control form-control-xs" data-date-format="dd-mm-yyyy" id="_cari_tgl1" name="_cari_tgl1" placeholder="date..." autocomplete="off">
            </div>
          </div>

          <div class="col-sm-auto">
            <div class="form-group">
              <label for="exempel1">s/d</label>
              <input type="date" class="form-control form-control-xs" id="_cari_tgl2" name="_cari_tgl2" placeholder="date..." autocomplete="off">
            </div>
          </div>

          
          </div>
        </div>


      </div>
      <input type="submit" style="display:none" />
    </form>
    <div class="col-12 p-1">
      <div class="card">
        <div class="card-header p-2 darkgrey-custom">
          <h6 class="hr6-custom"><i class="fas fa-hospital-user"></i> Daftar Jurnal</h6>
        </div>
        <div class="card-body" style="padding: 0px; max-height: 350px; overflow: auto;">
          <table id="tableKasir" class="table table-striped table-sm choose" style="border-collapse: inherit;">
            <thead>
              <tr>
                <th>#</th>
                <th>Tgl Transaksi</th>
                <th>Keterangan</th>
                <th>Jumlah</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody id='listtableDaftarJurnal'>

            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</div>
<div class="dtlKasir"></div>
<div class="dtlBayar"></div>
<div class="lookkup"></div>
<div class="bukatransakasikasir"></div>
<div class="tutuptransakasikasir"></div>
<div class="bataltransakasikasir"></div>
<div class="depositpasien"></div>
<div class="tambahpenjaminkasir"></div>
<div class="dtlhistoryPiutang"></div>
<div class="dtlBayarPelunasan"></div>





<script type="text/javascript">
  //  toastr.error('Sekarang Shift 1');
  // $(document).ready(function() {
  var MyTablekasir = $('#tableKasir').dataTable({
    "paging": true,
    "lengthChange": true,
    "searching": false,
    "ordering": true,
    "info": false,
    "autoWidth": false
  });

  function kasirgeneralrefresh() {
    MyTablekasir = $('#tableKasir').dataTable();
  }

  function caripasien() {
    $('#loading_kasir').show();
    var normxrwi = document.getElementById('kd_pasiencariKasir').value;
    document.getElementById('kd_pasiencariKasir').value = normOtomatis(normxrwi);
    var listParam = [
      '_cari_tgl1', '_cari_tgl2'
    ];
    var param = {
      kdpasiencariKasir: $("#kd_pasiencariKasir").val(),
      nmpasiencariKasir: $("#nm_pasiencariKasir").val(),
      nikcari: $("#nik_cari").val(),
      // carialamat: $("#_cari_alamat").val(),
      // caritelp: $("#_cari_telp").val(),
      jmlpasiencari: $("#jml_pasien__cari").val(),
      caritgl1: $("#_cari_tgl1").val(),
      caritgl2: $("#_cari_tgl2").val(),
      caristatuslunas: $("#_cari_status_lunas").val(),
      caristatustutuptransaksi: $("#_cari_status_tutup_transaksi").val()

    };
    apiPOST("Keuangan/caripasien", param, hasil => {
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
          // Baris += '<tr class="odd" data-id="'+a[i].id_transaksi +'" data-id1="'+a[i].id_kunjungan +'" onclick="caripasienKasir(' + a[i].id_transaksi + ')" >';
          // Baris += '<tr class="odd caritransaksi" data-id="' + a[i].id_transaksi + '" data-id1="' + a[i].id_kunjungan + '">';
          Baris += '<tr class="odd" onclick="caritransaksikasir(' + a[i].id_transaksi + ');">';
          Baris += '<td>' + no + '</td>';
          Baris += '<td >' + tutup + '</td>';
          Baris += '<td >' + status + '</td>';
          Baris += '<td>' + a[i].id_transaksi + '</td>';
          Baris += '<td>' + tgltransaksi + ' ' + jamtranskasi + '</td>';
          Baris += '<td>' + a[i].no_rm + '</td>';
          Baris += '<td>' + a[i].nama + '</td>';
          Baris += "</tr>";
          // alert('cari pasien' + a[i].id_transaksi );
          no++;
        }
        MyTablekasir.fnDestroy();
        //$('#tableKasir tbody').append(Baris);
        document.getElementById("listtableDaftarJurnal").innerHTML = Baris;
        kasirgeneralrefresh();
        $('#loading_kasir').hide();


      }

    }, listParam);
  };

  $('#kd_pasiencariKasir').show();
  $('#nm_pasiencariKasir').hide();
  $('#loading_kasir').hide();

  function show_cri_normKasir() {
    $('#kd_pasiencariKasir').show();
    $('#nm_pasiencariKasir').hide();
    $("#kd_pasiencariKasir").trigger('focus');
  }

  function show_cri_nmpasienKasir() {
    $('#kd_pasiencariKasir').hide();
    $('#nm_pasiencariKasir').show();
    $("#nm_pasiencariKasir").trigger('focus');
  }

  $("#kd_pasiencariKasir").click(function() {
    //$('#loading_kasir').show();
    //data_Kasir();
  });



  function caripasienKasir() {
    $('.dtlKasir').load('Keuangan/mod_kasir/');
  }

  $(document).on("click", ".caritransaksi", function() {
    //alert('ok');
    $('#loading_kasir').show();
    var idtransaksi = $(this).attr("data-id");
    var idkunjungan = $(this).attr("data-id");
    var json_data = {
      'id_transaksi': idtransaksi,
      'id_kunjungan': idkunjungan,
    };
    var myJSON = JSON.stringify(json_data);
    //alert(id);
    $('.dtlKasir').load('Keuangan/mod_kasir?data=' + myJSON);
  })

  function caritransaksikasir(val_idtransaksi) {
    //alert('ok');
    $('#loading_kasir').show();
    var idtransaksi = val_idtransaksi;
    var json_data = {
      'id_transaksi': idtransaksi
    };
    var myJSON = JSON.stringify(json_data);
    //alert(id);
    $('.dtlKasir').load('Keuangan/mod_kasir?data=' + myJSON);
  };

  
  function tamp_tutuptransaksikasir() {
    $('.lookkup').load('Keuangan/mod_tutuptransaksi');
  }
  $("#pencariandaftarjurnal").submit(function(event) {
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