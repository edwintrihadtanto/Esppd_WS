<?php
date_default_timezone_set("Asia/Jakarta");
$nowday     = date('Y-m-d');
$nextday    = $nowday; 
?>
<div class="col-md-12 p-2" id="setuptemplateresep">
  <div class="card card-outline card-default" style="margin-bottom:0;">
    
    <div class="card-body p-2 darkgrey-custom">
      <div class="row row-custom">
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Tgl. Buat :</label>
            <input type="date" class="form-control form-control-xs" id="setuptemplateresep_tglawal" onkeypress="setuptemplateresep_showdata()">
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label>s/d</label>
            <input type="date" class="form-control form-control-xs" id="setuptemplateresep_tglakhr" onkeypress="setuptemplateresep_showdata()">
          </div>
        </div>
        
        <div class="col-sm-2">
          <div class="form-group">
            <label>Status</label>
            <select class="form-control form-control-xs" id="setuptemplateresep_status" onchange="setuptemplateresep_showdata()">
              <option value="">Tampilkan Semua</option>
              <option value="t">Selesai</option>
              <option value="f">Belum Selesai</option>
            </select>
          </div>
        </div>
        
        <div class="col-sm-2">
          <div class="form-group">
            <label>Jumlah Data :</label>
            <select class="form-control form-control-xs" id="setuptemplateresep_jmlh" onchange="setuptemplateresep_showdata()">
              <option value="0">Tampilkan Semua</option>
              <option value="10">10 Data</option>
              <option value="20">20 Data</option>
              <option value="30">30 Data</option>
              <option value="50">50 Data</option>
              <option value="100">100 Data</option>
            </select>
          </div>
        </div>      
      </div>
    </div>
    <!-- card-outline -->
  </div>   
</div>


<div class="col-md-12 p-2" id="setuptemplateresep_kedua">
  <div class="card card-outline">
    <div class="overlay-wrapper" id="loading_setuptemplateresep">
      <div class="overlay">
        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
      </div>
    </div>  
    <div class="card-body p-1 uk-layar2" style="height: 76vh; max-height: 76vh; overflow: auto;">
      <div class="card" style="box-shadow: 0 0 3px #343a40; margin-bottom: 0;">
        <div>
          <div class="card-header p-1">
            <div class="row">
              <div class="col-md-12">
                <h6 class="hr6-custom"><i class="fas fa-heartbeat"></i> Daftar Template E-Resep</h6>
                <div>
                  <button type="button" class="btn bg-gradient-info btn-xs" onclick="setuptemplateresep_addnew()" id="setuptemplateresep_addnew"> <i class="fas fa-plus"></i> Buat Baru Template</button>
                </div>
              </div>
            </div>         
          </div>
        </div>
      </div>

      <table id="setuptemplateresep_table" class="table table-striped table-sm choose" style="border-collapse: inherit;">
        <thead>
          <tr>
            <th width="15">#</th>
            <th width="30">Status</th>
            <th width="100">Tgl. Buat</th>
            <th width="150">User</th>
            <th width="150">Nama Pegawai</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>      
    </div>

  </div>  
</div>

<div class="templateresep"></div>
<div class="templateresep_prevobat"></div>

<script type="text/javascript">  
var nowday      = "<?php echo $nowday; ?>";
var nextday     = "<?php echo $nextday; ?>";

document.getElementById('setuptemplateresep_tglawal').value = nowday;
document.getElementById('setuptemplateresep_tglakhr').value = nextday;

var a = "setuptemplateresep_tglawal";
max_date(a);
var b = "setuptemplateresep_tglakhr";
max_date(b);

setuptemplateresep_showdata();

function setuptemplateresep_showdata(){  
   $('#loading_setuptemplateresep').show();
  var listParam = [];

  var param = {
    tglsatu : document.getElementById('setuptemplateresep_tglawal').value,
    tgldua  : document.getElementById('setuptemplateresep_tglakhr').value,
    jmlh    : document.getElementById('setuptemplateresep_jmlh').value,
    iduser  : user['id_user'],
    status  : document.getElementById('setuptemplateresep_status').value
  };

  apiPOST("Apotek/templateresep_showdata", param, hasil => {   
    $('#loading_setuptemplateresep').hide();
    $('#setuptemplateresep_table tbody').html('');

    if (hasil['data'] !== null) {
        
      var a = hasil['data'];
      if (a.length > 0){
        var Baris = "";
        for (var i = 0; i < a.length; i++) {
          var id_template   = a[i].id_template;
          var tgl_buat      = a[i].tgl_buat;
          var status        = a[i].status;
          var nama          = a[i].nama;
          var id_user       = a[i].id_user;
          var id_pegawai    = a[i].id_pegawai;
          var namapeg       = a[i].namapeg;

          var no = i + 1;
          
          Baris += '<tr onclick="templateResepView('+"'"+id_template+"','"+tgl_buat+"','"+status+"','"+id_pegawai+"'"+')">';
          Baris += '<td>'+no+'</td>';
          Baris += '<td>';
          
          if (status == 't'){
            Baris += '&nbsp;<div class="col-sm-1" style="display:contents;"><img src="<?= base_url('_assets/dist/img/checklist.png') ?>" width="20px" height="20px" title="Selesai"/></div>';
          }else{
            Baris += '&nbsp;<div class="col-sm-1" style="display:contents;"><img src="<?= base_url('_assets/dist/img/cancel.png') ?>" width="20px" height="20px" title="Belum Selesai"/></div>';
          }

          Baris += '</td>';
          Baris += '<td>'+tgl_buat+'</td>';
          Baris += '<td>'+nama+'</td>';
          Baris += '<td><b>'+namapeg+'</b></td>';
          Baris += "</tr>";
        }
        $('#setuptemplateresep_table tbody').append(Baris);
      }else{
        toastr.error("Data tidak ditemukan");
        var Baris = '<tr>';  
            Baris += '<td colspan="5" align="center"><h6>Belum Ada Template Resep<h6></td>';
            Baris += "</tr>";

        $('#setuptemplateresep_table tbody').append(Baris);
      }
    }

  });  
  
}

function templateResepView(id_template, tgl_buat, status, id_pegawai){
    var json_data = {
        'templateResepView_id'       : id_template,
        'templateResepView_tgl'      : tgl_buat,
        'templateResepView_status'   : status,
        'templateResepView_idpeg'    : user['id_pegawai'],
    };

    var data = JSON.stringify(json_data);
    $('#setuptemplateresep').hide();
    $('#setuptemplateresep_kedua').hide();
    $('.templateresep').load('Apotek/addnewtemplate?data='+ data);
}

function setuptemplateresep_addnew(){
    var json_data = {
        'templateResepView_id'      : '',
        'templateResepView_tgl'     : nowday,
        'templateResepView_status'  : 'f',
        'templateResepView_idpeg'   : user['id_pegawai'],
    };

    var data = JSON.stringify(json_data);
    $('#setuptemplateresep').hide();
    $('#setuptemplateresep_kedua').hide();
    $('.templateresep').load('Apotek/addnewtemplate?data='+ data);
}

</script>