<?php $nowday       = date('Y-m-d'); ?>
<div class="content modal fade" id="modal_LapOperasi">
  <div class="container-fluid ">
    <div class="row">
      
      <div class="col-md-12">
        <div class="form-group">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="card-header">
                <h5>Laporan Operasi
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
                </h5>
              </div>
              <div class="modal-body">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="LapOperasi_tglkunjung">Tgl. Masuk :</label>
                    <input type="date" class="form-control form-control-sm" id="LapOperasi_tglkunjung" onchange="pencarianDataPasien()">
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="LapOperasi_normnmpasien">Pencarian No.Rekam Medis / Nama Pasien :</label>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">                
                            <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" ></button>
                            <ul class="dropdown-menu">
                              <li class="dropdown-item" onclick="LapOperasi_cri_by_norm()">No. RekamMedik</a></li>
                              <li class="dropdown-item" onclick="LapOperasi_cri_by_nmpasien()">Nama Pasien</a></li>
                            </ul>
                        </div>
                        <input type="text" class="form-control form-control-sm" placeholder="Entry No. RM" id="LapOperasi_cri_by_norm" onchange="pencarianDataPasien()">
                        <input type="text" class="form-control form-control-sm" placeholder="Entry Nama Pasien" id="LapOperasi_cri_by_nmpasien" onchange="pencarianDataPasien()" onkeyup="pencarianDataPasien()">
                    </div>
                  </div>
                </div>
                
                <input type="text" class="form-control form-control-sm" id="idkunjunganLapOperasi" disabled hidden>
                <input type="text" class="form-control form-control-sm" id="idtransaksiLapOperasi" disabled hidden>
              </div>
              <div class="modal-footer p-1">
                <button type="button" class="btn btn-xs btn-info" id="laporanoperasi" onclick="laporanoperasi()" disabled><i class="fa fa-file"></i> Tampilkan</button>
                <button type="button" class="btn btn-xs btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>    
  </div>
</div>

<div class="content modal fade" id="modal_LapOperasi_DataPasien">
  <div class="container-fluid ">
    <div class="row">
      
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          
          <div class="modal-body">
            <table class="table table-striped table-sm choose" style="border-collapse: inherit;">
              <thead>
                <tr>
                  <th width="140" style="text-align:center;">Tgl Jam Masuk</th>
                  <th width="100" style="text-align:left;">No. Rekam Medis</th>
                  <th>Nm.Pasien</th>
                  <th width="150" style="text-align:center;">Unit</th>
                  <th width="220" style="text-align:center;">Kamar</th>
                  <th width="300" style="text-align:left;">Alamat</th>
                </tr>
              </thead>
              <tbody id="LapOperasi_DataPasien"></tbody>
            </table> 
          </div>
          <div class="modal-footer p-1">
            <button type="button" class="btn btn-xs btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
          </div>
        </div>
      </div>
      
    </div>    
  </div>
</div>
<!-- 
<div class="modal fade show" id="modal-default" aria-modal="true" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Default Modal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <p>One fine body…</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
 -->
<script type="text/javascript">  
$("#modal_LapOperasi").modal({backdrop: "static"});
$('#modal_LapOperasi').on('shown.bs.modal', function () { 
});

var nowday = "<?php echo $nowday ?>";
$('#LapOperasi_cri_by_norm').show();
$('#LapOperasi_cri_by_nmpasien').hide();
document.getElementById("LapOperasi_tglkunjung").value = nowday;
var a = "LapOperasi_tglkunjung";
max_date(a);

function LapOperasi_cri_by_norm(){
  $('#LapOperasi_cri_by_norm').show();
  $('#LapOperasi_cri_by_nmpasien').hide();
  $("#LapOperasi_cri_by_norm").trigger('focus');
  $('#LapOperasi_cri_by_norm').val('');
  $('#LapOperasi_cri_by_nmpasien').val('');
}

function LapOperasi_cri_by_nmpasien(){
  $('#LapOperasi_cri_by_norm').hide();
  $('#LapOperasi_cri_by_nmpasien').show();
  $("#LapOperasi_cri_by_nmpasien").trigger('focus');
  $('#LapOperasi_cri_by_norm').val('');
  $('#LapOperasi_cri_by_nmpasien').val('');
}

function pencarianDataPasien() {
  $('#modal_LapOperasi_DataPasien').modal('show');
  var listParam = [
    'LapOperasi_cri_by_norm', 'LapOperasi_cri_by_nmpasien'
  ];

  var param = {
      user      : user['id_user'],
      pegawai   : user['id_pegawai'],
      norm      : document.getElementById('LapOperasi_cri_by_norm').value,
      nmapasien : document.getElementById('LapOperasi_cri_by_nmpasien').value,
      tgl       : document.getElementById('LapOperasi_tglkunjung').value
  };

  apiPOST("Rekammedisirna/pencarian_pasienRIOK", param, hasil => {
      $('#LapOperasi_DataPasien').html('');
      var Baris = "";
      if (hasil['data'] !== null) {
        if (hasil['code'] == 'XX') {
          toastr.error("Data tidak ditemukan");
          Baris += "<tr>";
            Baris += "<td colspan='6' align='center' >Data Tidak Ditemukan</td>";
          Baris += "</tr>";
          $('#LapOperasi_DataPasien').append(Baris);
        } else {
            var a = hasil['data'];
            for (var i = 0; i < a.length; i++) {
              var tglkunj     = a[i].tgl_masuk;
              var transaksi   = a[i].id_transaksi;
              var norm        = a[i].no_rm;
              var nama        = a[i].nama;
              var alamat      = a[i].alamat;
              var umur        = a[i].tgl_lahir;
              var penjamin    = a[i].nama_penjamin;
              var sep         = a[i].no_sjp;
              var telp        = a[i].telepon;
              var unit        = a[i].nama_unit;
              var kunjungan   = a[i].id_kunjungan;
              var id_unit     = a[i].id_unit;
              var nama_unit   = a[i].nama_unit;
              var soap        = a[i].soap;
              var tgl_lahir   = a[i].tgl_lahir;
              var id_pegawai  = a[i].id_pegawai;
              var nama_kamar  = a[i].nama_kamar;
              var jam_masuk   = a[i].jam_masuk.substring(0, 16);
              
              if (nama.length > 18) {
                namax = nama.substring(0, 20) + '...';
              } else {
                namax = nama;
              }

              if (alamat.length > 0) {
                if (alamat.length > 30) {
                  alamatx = alamat.substring(0, 35) + '...';
                } else {
                  alamatx = alamat;
                }
              }else{
                alamatx = '---';
              }

              Baris += '<tr onclick="LapOperasi_clikDataPasien(' + "'" + norm + "','" + unit + "','" + kunjungan + "','" + id_unit + "','" + nama + "','" + transaksi + "','" + tgl_lahir + "','" + alamat + "','" + id_pegawai + "'" + ')">';
                Baris += "<td style='text-align:center;'>" + jam_masuk + "</td>";
                Baris += "<td style='text-align:center;'>" + norm + "</td>";
                Baris += "<td style='text-align:left;'>" + namax + "</td>";
                Baris += "<td style='text-align:center;'>" + unit + "</td>";
                Baris += "<td style='text-align:center;'>" + nama_kamar + "</td>";
                Baris += "<td style='text-align:left;'>" + alamatx + "</td>";
              Baris += "</tr>";

            }

            $('#LapOperasi_DataPasien').append(Baris);
        }
      }
  });
}

function LapOperasi_clikDataPasien(norm,unit,kunjungan,id_unit,nama,transaksi,tgl_lahir,alamat,id_pegawai){
  $("#LapOperasi_cri_by_norm").val(norm);
  $("#LapOperasi_cri_by_nmpasien").val(nama);
  $('#modal_LapOperasi_DataPasien').modal('hide');

  var listParam = [
    'LapOperasi_cri_by_norm', 'LapOperasi_cri_by_nmpasien'
  ];

  var param = {
      id_transaksi    : transaksi,
      id_kunjungan    : kunjungan,
      norm            : norm,
      tgl             : document.getElementById('LapOperasi_tglkunjung').value
  };
  apiPOST("Rekammedisirna/showinputpembedahan", param, hasil => {
      if (hasil['data'].length > 0){
        toastr.info(hasil['pesan']);
        document.getElementById('laporanoperasi').disabled  = false;
        $("#idkunjunganLapOperasi").val(kunjungan);
        $("#idtransaksiLapOperasi").val(transaksi);
      }else{
        toastr.error('Laporan Operasi Pasien Tidak Ditemukan!');
        document.getElementById('laporanoperasi').disabled  = true;
      }
  });
}

function laporanoperasi() {
  var idkunj      = $("#idkunjunganLapOperasi").val();
  var idtransaksi = $("#idtransaksiLapOperasi").val();
  
  if ((idkunj == '')||(idtransaksi == '')){
    toastr.error("Laporan Operasi Pasien Tidak Ditemukan!!");
    return;
  }

  var param = {
    tglkunj      : $("#LapOperasi_tglkunjung").val(),
    idkunj       : $("#idkunjunganLapOperasi").val(),
    idtransaksi  : $("#idtransaksiLapOperasi").val(),
  };

  newTabPOST('API/Laporan/laporanoperasi', param);
  return;
}

</script>