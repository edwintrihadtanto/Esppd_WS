<div class="col-md-12 p-2" id="gudang_infstok_awal">
  <div class="card card-outline card-default" style="margin-bottom:0;">
    
    <div class="card-body p-2 darkgrey-custom">
      <div class="row row-custom">
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Kode Obat:</label>
            <input type="text" class="form-control form-control-xs" placeholder="Entry Kode Obat" id="gudang_infstok_kdobat" onchange="gudang_infstok_showdata()">
          </div>
        </div>

        <div class="col-sm-auto">
          <div class="form-group">
            <label>Nama Obat:</label>
            <input type="text" class="form-control form-control-xs" placeholder="Entry Nama Obat" id="gudang_infstok_nmobat" onchange="gudang_infstok_showdata()">
          </div>
        </div>
        
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Unit</label>
            <select class="form-control form-control-xs" id="gudang_infstok_unit" onchange="gudang_infstok_showdata()"></select>
          </div>
        </div>

        <div class="col-sm-auto">
          <div class="form-group">
            <label>Kepemilikan Obat</label>
            <select class="form-control form-control-xs" id="gudang_infstok_milik" onchange="gudang_infstok_showdata()"></select>
          </div>
        </div>

        <div class="col-sm-auto">
          <div class="form-group">
            <label>Jumlah Data :</label>
            <select class="form-control form-control-xs" id="gudang_infstok_jmlh" onchange="gudang_infstok_showdata()">              
              <option value="25">25 Data</option>              
              <option value="50">50 Obat</option>
              <option value="85">85 Obat</option>
              <option value="100">100 Obat</option>
              <option value="0">Tampilkan Semua</option>
            </select>
          </div>
        </div>      
      </div>
    </div>
    <!-- card-outline -->
  </div>   
</div>


<div class="col-md-12 p-2" id="gudang_infstok_kedua">
  <div class="card card-outline">
    <div class="overlay-wrapper" id="gudang_infstok_loading">
      <div class="overlay">
        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
      </div>
    </div>  
    <div class="card-body p-0 uk-layar2" style="height: 76vh; max-height: 76vh; overflow-x: hidden;">
      <div class="card" style="box-shadow: 0 0 3px #343a40; margin-bottom: 0;">
        <div>
          <div class="card-header p-1">
            <div class="row">
              <div class="col-md-12">
                <h6 class="hr6-custom"><i class="fas fa-heartbeat"></i> Informasi Stok Semua Depo / Unit</h6>
              </div>
            </div>         
          </div>
        </div>
      </div>

      <table id="gudang_infstok_table" class="table table-striped table-sm choose" style="border-collapse: inherit;">
        <thead>
          <tr>
            <th width="15">#</th>
            <th width="150">Kepemilikan</th>
            <th width="150">Unit</th>
            <th width="100">Kd Obat</th>
            <th>Nama Obat</th>
            <th width="150">Stok Unit</th>
            <th width="150">Expired Obat</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>      
    </div>

  </div>  
</div>

<script type="text/javascript">  

gudang_infstok_unit();
gudang_infstok_showdata();

apiPOST('Apotek/getKepemilikanObat', null, hasil => {
  var data  = hasil['data'];
  var milik = '';
    milik += '<option value="0">Kepemilikan Obat Aktif</option>';
  for (var i = 0; i < data.length; i++) {
    milik += '<option value="'+ data[i]['kd_milik'] +'">'+ data[i]['milik'].toUpperCase()+'</option>';
  }
  document.getElementById('gudang_infstok_milik').innerHTML = milik;
  $("#gudang_infstok_milik").val(user['kepemilikan_obat']);
});

function gudang_infstok_unit() {
  var param = {
    id_unit : ''
  }
  apiPOST('Apotek/getUnitDepoFarmasi', param, hasil => {
    var data = hasil['data'];
    var u = '';
      u += '<option value="">Semua Depo / Unit</option>';
    for (var i = 0; i < data.length; i++) {
      u += '<option value="'+ data[i]['id_unit'] +'">'+ data[i]['nama_unit'].toUpperCase() +'</option>';
    }
    document.getElementById('gudang_infstok_unit').innerHTML = u;
  });
}

function gudang_infstok_showdata(){  
  $('#gudang_infstok_loading').show();
  
  var param = {
    kd_obat : document.getElementById('gudang_infstok_kdobat').value,
    nm_obat : document.getElementById('gudang_infstok_nmobat').value,
    unit    : document.getElementById('gudang_infstok_unit').value,
    jmlh    : document.getElementById('gudang_infstok_jmlh').value,
    iduser  : user['id_user'],
    milik   : document.getElementById('gudang_infstok_milik').value,
  };

  apiPOST("Gudang/gud_informasi_stok", param, hasil => {   
    $('#gudang_infstok_loading').hide();
    $('#gudang_infstok_table tbody').html('');

    if (hasil['data'] !== null) {
        
      var a = hasil['data'];
      if (a.length > 0){
        var Baris = "";
        for (var i = 0; i < a.length; i++) {
          var kd_obat = a[i].kd_obat;
          var nm_obat = a[i].nama_obat;
          var unit    = a[i].nama_unit;
          var exp     = a[i].exp;
          var qty     = a[i].stok_unit;
          var milik   = a[i].milik;

          var no      = i + 1;
          
          Baris += '<tr>';
          Baris += '<td>'+no+'</td>';
          Baris += '<td>'+milik+'</td>';
          Baris += '<td>'+unit+'</td>';
          Baris += '<td>'+kd_obat+'</td>';
          Baris += '<td>'+nm_obat+'</td>';
          Baris += '<td>'+qty+'</td>';
          Baris += '<td>'+exp+'</td>';
          Baris += "</tr>";
        }
        $('#gudang_infstok_table tbody').append(Baris);
      }else{
        toastr.error("Data tidak ditemukan");
        var Baris = '<tr>';  
            Baris += '<td colspan="7" align="center"><h6>Tidak ada data<h6></td>';
            Baris += "</tr>";

        $('#gudang_infstok_table tbody').append(Baris);
        document.getElementById('gudang_infstok_kdobat').value     = '';
        document.getElementById('gudang_infstok_nmobat').value     = '';
      }
    }

  });  
  
}

</script>