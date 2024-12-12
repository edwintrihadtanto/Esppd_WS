<?php
$data = json_decode($_GET['data']);
$nm_function  = str_replace('"','', json_encode($data->view));
// $url = str_replace('"','', json_encode($data->url));
?>
<div class="content modal fade" id="modallistpasienirna">
  <div class="modal-dialog modal-xxl">
    <input type="hidden" id="nm_function" class="form-control form-control-sm" value="<?php echo $nm_function; ?>">
    <div class="modal-content" style="overflow: auto;">
      <div class="modal-header p-2">
        <h5 class="modal-title">Pencarian Data Pasien :</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="tutupmodallistpasienirna()"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body p-1">
        <div class="card card-outline">
          <div class="card-body p-2 darkgrey-custom" id='DivListPasienErmIrna'>
            <div class="row ">
              <div class="col-sm-auto">
                <div class="form-group">
                  <label for="tglcariirna" id="labeltglcariirna">Tgl. Masuk :</label>
                  <input type="date" name="tglcariirna" id="tglcariirna" class="form-control form-control-sm" value="<?php echo date('Y-m-d'); ?>" onchange="pencarianDataListPasien()">
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group ">
                  <label>Cari Berdasarkan No. RM / Nama Pasien :</label>
                  <!-- <input type="search" id="searchPxRmlistermirna" class="form-control form-control-sm" placeholder="Entry RM..." autocomplete="off" onchange="searchpxirnaby()"> -->
                  <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">                
                      <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" ></button>
                      <ul class="dropdown-menu">
                        <li class="dropdown-item" onclick="show_cri_norm_listermirna()">No. RekamMedik</a></li>
                        <li class="dropdown-item" onclick="show_cri_nmpasien_listermirna()">Nama Pasien</a></li>
                      </ul>
                    </div>
                    <input type="text" class="form-control form-control-sm" placeholder="Entry No. RM" id="cri_by_norm_listermirna" onchange="pencarianDataListPasien()">
                    <input type="text" class="form-control form-control-sm" placeholder="Entry Nama Pasien" id="cri_by_nmpasien_listermirna" onchange="pencarianDataListPasien()">
                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label>Unit / Kamar:</label>
                  <select class="form-control form-control-sm" id="cri_by_unit_listermirna" onchange="pencarianDataListPasien()">
                  </select>
                </div>
              </div> 
            </div>
          </div>
        </div>
        <div class="col-sm-12 p-0">
          <div class="card">

            <div class="overlay-wrapper" id="listpasienermirna_loadingawal">
              <div class="overlay">
                <i class="fas fa-3x fa-sync-alt fa-spin"></i>
              </div>
            </div>
            <div class="col-md-12 p-0">
              <div class="card-body p-1">
                <div class="row" id="listpasienermirna">
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<script type="text/javascript">

  $("#modallistpasienirna").modal({backdrop: "static"});
  $('#modallistpasienirna').on('shown.bs.modal', function () {
    $('#cri_by_norm_listermirna').focus();
  });

  var nma_function = $("#nm_function").val();
  var url   = "";
  var data  = document.getElementById('profilepasienirna').value;
  var getnamaview = "";
  console.log("listpasien : "+data);
  
  // if (data =='') {
  pencarianDataListPasien();
  // }
  function pencarianDataListPasien(){
    if (nma_function == "viewterimapasien"){
      url = "Rekammedisirna/listpasienserahterima";
      listpasienditerima();
    }else if(nma_function=="viewobsevasiirna"){
      url = "Rekammedisirna/listpasienby";
      pencarianData();
    }else{
      url = "Rekammedisirna/listpasienby";
      pencarianData();
    }

  }

  if (nma_function == "viewterimapasien"){
    getnamaview = nma_function;
    getUnitRI(getnamaview);
    document.getElementById("labeltglcariirna").innerHTML = "Tgl. Pindah"
  }else{
    getUnitRI(getnamaview);
  }

  $('#cri_by_norm_listermirna').show();
  $('#cri_by_nmpasien_listermirna').hide();
  var a = "tglcariirna";
  max_date(a);
  
  function show_cri_norm_listermirna(){
    $('#cri_by_norm_listermirna').show();
    $('#cri_by_nmpasien_listermirna').hide();
    $("#cri_by_norm_listermirna").trigger('focus');
    $('#cri_by_norm_listermirna').val('');
    $('#cri_by_nmpasien_listermirna').val('');
  }

  function show_cri_nmpasien_listermirna(){
    $('#cri_by_norm_listermirna').hide();
    $('#cri_by_nmpasien_listermirna').show();
    $("#cri_by_nmpasien_listermirna").trigger('focus');
    $('#cri_by_norm_listermirna').val('');
    $('#cri_by_nmpasien_listermirna').val('');
  }

  document.getElementById("cri_by_norm_listermirna").onkeyup = function(event){
    pencarianDataListPasien(event)
  };



  function pencarianData() {
    var listParam = [
      'cri_by_nmpasien_listermirna', 'cri_by_norm_listermirna'
      ];

    var param = {
      user        : user['id_user'],
      pegawai     : user['id_pegawai'],
      norm        : document.getElementById('cri_by_norm_listermirna').value,
      nmapasien   : document.getElementById('cri_by_nmpasien_listermirna').value,
      unit        : document.getElementById('cri_by_unit_listermirna').value,
      tgl         : document.getElementById('tglcariirna').value
    };

    $("#listpasienermirna_loadingawal").show();
    apiPOST(url, param, hasil => {

      $("#listpasienermirna_loadingawal").hide();
      $('#listpasienermirna').html('');
      if (hasil['data'] !== null) {
        var Baris = "";
        if (hasil['code'] == 'XXX') {
          toastr.error("Data tidak ditemukan");          
          Baris += '<div class="col-sm-12">';
          Baris += '<div class="small-box bg-danger">';
          Baris += '<div class="inner p-1" style="text-align:center;">';
          Baris += '<h6><i class="fa fa-times"></i> Data Tidak Ditemukan</h6>';
          Baris += '</div>';
          Baris += '</div>';
          Baris += '</div>';

          $('#listpasienermirna').append(Baris);
        }else{
            var a = hasil['data1'];
          for (var i = 0; i < a.length; i++) {
            var tglkunj     = a[i].tgl_masuk;
            var nama_kamar  = a[i].nama_kamar;
            var norm        = a[i].kd_pasien;
            var nama        = a[i].nama;
            var alamat      = a[i].alamat; 
            var unit        = a[i].nama_unit;
            var jam_masuk   = a[i].jam_inap;
            var tgl_inap    = a[i].tgl_inap;
            var jnskelamin  = a[i].jenis_kelamin;
            var umur        = a[i].umur;
            var kd_unit     = a[i].kd_unit;
            var nokamar     = a[i].no_kamar;
            var tgl_inap    = a[i].tgl_inap;
            var id_kunjungan= a[i].id_kunjungan;
            var urut_masuk  = a[i].id_kunjungan;
            var id_transaksi= a[i].id_transaksi;
            var penjamin    = a[i].penjamin;
            var pegawai     = user.id_pegawai;
            if (nama.length > 18) {
              namax = nama.substring(0, 18) + '...';
            } else {
              namax = nama;
            }

            if (alamat.length > 0) {
              if (alamat.length > 30) {
                alamatx = alamat.substring(0, 30) + '...';
              } else {
                alamatx = alamat;
              }
            }else{
              alamatx = '---';
            }

            // Baris += '<div class="col-sm-3">';
            // if (soap > '') {
            //   Baris += '<div class="small-box btn-info" style="border: solid 2px darkblue;">';
            // } else {
            //   Baris += '<div class="small-box btn-secondary-default" style="border: solid 2px #a8d4da; margin-bottom: 5px !important;">';
            // }

            Baris += '<div class="col-sm-3">';
            Baris += '<div class="small-box btn-info" style="border: solid 2px darkblue;">';
            Baris += '<div class="inner p-1">';
            Baris += '<h6><strong>' + norm + '</strong> / ' + namax + '</h6>';
            Baris += '<p class="p-0 mb-1" style="font-size:12px;">' + alamatx + '</p>';
            Baris += '<p class="p-0" style="font-size:12px;"><strong><i>' + unit + '</i></strong></p>';
            Baris += '<p class="p-0" style="font-size:12px;"><strong><i>' + nama_kamar + '</i></strong></p>';
            Baris += '<p class="p-0 mb-1" style="font-size:14px; text-align: center;"><i class="fa fa-clock"></i> ' +tgl_inap.substring(0,10)+' '+jam_masuk.substring(10) + ' WIB</p>';
            Baris += '</div>';
            Baris += '<div class="icon">';
            Baris += '<i class="fa fa-user"></i>';
            Baris += '</div>';
            Baris += '<a href="#" class="small-box-footer" style="background-color: #a8d4da; color: black;" onclick="tampilPasienermirna(' + "'" + norm + "','" + unit + "','" + id_kunjungan + "','" + kd_unit + "','" + nama + "','" + id_transaksi + "','"+a[i].tgl_lahir+"','" + alamat + "','" + jnskelamin+ "','" + nama_kamar+ "','" + jam_masuk+ "','" + umur + "','" + urut_masuk + "','" + tgl_inap + "','" + penjamin + "','" + pegawai + "'" + ')" style="cursor:pointer;">Klik Disini Baru <i class="fas fa-arrow-circle-right"></i></a>';
            Baris += '</div>';
            Baris += '</div>';
          }
          $('#listpasienermirna').append(Baris);
        }
      }
    });
  };

  function keluarmodallistpasienirna() {
    $('#modallistpasienirna').modal('hide');
    $('.modal-backdrop').hide();
  //sessionStorage.clear();
  }

  function tampilPasienermirna(no_rm,unit,id_kunjungan,id_unit,nama,transaksi,tgl_lahir,alamat,jnskelamin,nama_kamar,jam_masuk,umur,urut_masuk,tgl_inap,penjamin,id_pegawai) {
    $('#modallistpasienirna').modal('hide');
    $('.tab-empty').hide();
    
    showDetailDataPasienIrna(no_rm,unit,id_kunjungan,id_unit,nama,transaksi,tgl_lahir,alamat,jnskelamin,nama_kamar,jam_masuk,umur,urut_masuk,tgl_inap,penjamin,id_pegawai);
    document.getElementById('rmermirna').value          =no_rm;
    document.getElementById('namaermirna').value        =nama;
    document.getElementById('unitermirna').value        =unit;
    document.getElementById('idKunjunganermirna').value =id_kunjungan;
    document.getElementById('idunitermirna').value      =id_unit;
    document.getElementById('transaksiermirna').value   =transaksi;
    document.getElementById('alamatermirna').value      =alamat;
    document.getElementById('profilepasienirna').value  =id_kunjungan;
    document.getElementById('tgl_lahirermirna').value   =tgl_lahir;
    document.getElementById('urut_masukermirna').value  =urut_masuk;  
    document.getElementById('tgl_masukermirna').value   =tgl_inap;
  

    data.namas        = nama;
    data.norms        = no_rm;
    data.units        = unit;
    data.id_units     = id_unit;
    data.id_kunjungans= id_kunjungan;
    alamatpasien      = alamat;
    tgllahir          = tgl_lahir;
    jk                = jnskelamin;
    
    // console.log(nma_function);

    if (nma_function == "viewlistpasienermirna"){
      showdataListPasienIrna(no_rm, id_kunjungan, id_pegawai);
    }else if (nma_function == "viewinputpembedahan"){
      showInputPembedahan();
    }else if (nma_function == "viewinstruksipembedahan"){
      showInstruksiPembedahan();
    }else if (nma_function == "viewserahterima"){
      showSerahTerima();
    }else if (nma_function == "viewchecklistkeselamatanop"){
      showCheckliskeselamatanop();
    }else if (nma_function == "viewsuratlahir"){
      showInputSuratKelahiran();
    }else if (nma_function == "viewasuhanperioperatif"){
      showdetailasuhanPerioperatif(no_rm,unit,id_kunjungan,id_unit,nama,transaksi,tgl_lahir,alamat,id_pegawai,jnskelamin,nama_kamar,penjamin,jam_masuk, nama_dokter);
    }else if (nma_function == "viewsuratkematian"){
      showSuratKematian(no_rm, id_kunjungan, id_pegawai);
    }else if (nma_function == "viewsuratsehat"){
      showsuratkesehatan(no_rm,unit,id_kunjungan,id_unit,nama,transaksi,tgl_lahir,alamat,id_pegawai,jnskelamin,nama_kamar,penjamin,jam_masuk, nama_dokter);
    }else if (nma_function == "viewsuratsakit"){
      showDataSuratSakit(transaksi);
    }else if (nma_function == "viewterimapasien"){
      tampilterimaermirna(no_rm,unit,id_kunjungan,id_unit,nama,transaksi,tgl_lahir,alamat,id_pegawai,jnskelamin,nama_kamar,penjamin,jam_masuk, nama_dokter)
    }else if (nma_function == "viewRencanaPembedahan"){
      showRencanaPembedahan()
    }else if (nma_function == "viewassesmenAnak"){
      showAssessmenAnakRI(no_rm,unit,id_kunjungan,id_unit,nama,transaksi,tgl_lahir,alamat,id_pegawai,jnskelamin,nama_kamar,penjamin,jam_masuk, nama_dokter)
    }else if (nma_function == "viewassesmentNeonatus"){
      showAssessmenNeonatus(no_rm,unit,id_kunjungan,id_unit,nama,transaksi,tgl_lahir,alamat,id_pegawai,jnskelamin,nama_kamar,penjamin,jam_masuk, nama_dokter)
    }else if (nma_function == "viewobsevasiirna"){
      tampilobservasiirna()
    }else if (nma_function == "viewpemberianinfotindakanmedis"){

    }else{

    }

    bukadetailpasien();
  }

  function getUnitRI(getnamaview){
    var param = {
      view : getnamaview
    }

    apiPOST('Rekammedisirna/getUnitRI', param, hasil => {
      a = hasil['data'];
      var b = '';
      b += '<option value="0">--Pilih Unit / Kamar--</option>';
      if (hasil !== null){ 
        for (var i = 0; i < a.length; i++) {
          z = hasil['data'][i];
          b+='<option value="'+z.id_unit+'">'+z.nama_unit+'</option>';
        }
        document.getElementById('cri_by_unit_listermirna').innerHTML = b;
      } 
    });
  }

  function listpasienditerima(){
    var listParam = [
      'cri_by_nmpasien_listermirna'
      ];
    var param = {
      unitakses    : user.unit_akses,
      norm         : document.getElementById('cri_by_norm_listermirna').value,
      unittujuan   : document.getElementById('cri_by_unit_listermirna').value,
      tglpindah    : document.getElementById('tglcariirna').value
    };

    $("#listpasienermirna_loadingawal").show();
    apiPOST("Rekammedisirna/listpasienserahterima", param, hasil => {
      $("#listpasienermirna_loadingawal").hide();
      $('#listpasienermirna').html('');
      if (hasil['data'] !== null) {
        if (hasil['code'] == '201') {
          toastr.error("Data tidak ditemukan");
          var Baris = "";
          Baris += '<div class="col-sm-12">';
          Baris += '<div class="small-box bg-danger">';
          Baris += '<div class="inner p-1" style="text-align:center;">';
          Baris += '<h6><i class="fa fa-times"></i> Data Tidak Ditemukan</h6>';
          Baris += '</div>';
          Baris += '</div>';
          Baris += '</div>';

          $('#listpasienermirna').append(Baris);
          document.getElementById('cri_by_norm_listermirna').value = '';
        }else{
          var Baris = "";
          var a = hasil['data'];
          for (var i = 0; i < a.length; i++) {
            var transaksi     = a[i].id_transaksi;
            var kunjungan     = a[i].id_kunjungan;
            var id_unit       = a[i].id_unit_asal;
            var unit          = a[i].unit_asal;
            var nama_kamar    = a[i].nama_kamar;
            var nama          = a[i].nama;
            var nama_dokter   = a[i].nama_pegawai;
            var no_rm         = a[i].no_rm;
            var alamat        = a[i].alamat;
            var jnskelamin    = a[i].jenis_kelamin;
            var tgl_lahir     = a[i].tgl_lahir;
            var umur          = a[i].umur;
            var penjamin      = a[i].nama_penjamin;
            var id_pegawai    = a[i].id_pegawai;
            var jam_masuk     = "--";

            Baris += '<div class="col-lg-3 col-6">';
            Baris += '<div class="small-box btn-info" style="border: solid 2px black;">';
            Baris += '<div class="inner p-1">';
            Baris += '<h6><strong>'+no_rm+'</strong> / '+ nama +'</h6>';
            Baris += '<p class="p-0 mb-1">'+unit+'</p>';
            Baris += '<p class="p-0"><strong><i>'+nama_dokter+'</i></strong></p>';
            Baris += '</div>';
            Baris += '<div class="icon">';
            Baris += '<i class="fa fa-user"></i>';
            Baris += '</div>';

            Baris += '<a href="#" class="small-box-footer" style="background-color: #a8d4da; color: black;" onclick="tampilPasienermirna(' + "'" + no_rm + "','" + unit + "','" + kunjungan + "','" + id_unit + "','" + nama + "','" + transaksi + "','" + tgl_lahir + "','" + alamat + "','" + id_pegawai+ "','" + jnskelamin+ "','" + nama_kamar+ "','" + penjamin+ "','" + jam_masuk+ "','" + nama_dokter+ "','" + umur + "'" + ')" style="cursor:pointer;">Klik Disini Baru <i class="fas fa-arrow-circle-right"></i></a>';

            Baris += '</div>';
            Baris += '</div>';

          }

          $('#listpasienermirna').append(Baris);
        }       
      }
    });  
  };

</script>