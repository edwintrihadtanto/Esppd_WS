<?php
  $data = json_decode($_GET['data']);
  $eresepRWJ  = str_replace('"','', json_encode($data->eresepRWJ));
  $tabObat    = str_replace('"','', json_encode($data->tabObat));
  $jumlahObat = str_replace('"','', json_encode($data->jumlah));
  $kdObat     = str_replace('"','', json_encode($data->kdObat));
  $nomor      = str_replace('"','', json_encode($data->nomor));
  $id_kunj_far = str_replace('"','', json_encode($data->id_kunj_far));
  $eresepRacik  = str_replace('"','', json_encode($data->eresepRacik));
?>
<div class="content modal fade" id="resepRWJ_expiredObat">
  <div class="container-fluid ">
    <div class="modal-dialog">
      <div class="overlay-wrapper" id="resepRWJ_expiredObat_loading">
        <div class="overlay">
          <i class="fas fa-3x fa-sync-alt fa-spin"></i>
        </div>
      </div>
      <h6 id="nm_function" style="display: none;"><?php echo $eresepRWJ; ?></h6>
      <div class="modal-content" style="overflow: auto;">
        <div class="modal-body p-1">
          <div class="row">
            <div class="col-sm-11">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text form-control-xs">Jumlah Obat</span>
                </div>
                <input type="number" class="form-control form-control-xs" id="jumlahstok" value="<?php echo $jumlahObat; ?>" disabled>
              </div>
            </div>
            <div class="col-sm-1">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
          </div>
          <div class="p-1">
            <table border="0" cellpadding="0" cellspacing="0" id="list_data_expiredObat" class="table table-striped table-bordered table-hover table-sm choose">
              <thead>
                <tr>
                  <th data-sortable="true" data-width="80">Kep.Obat</th>
                  <th data-sortable="true" data-width="80">Expired Obat</th>
                  <th data-sortable="true" data-width="80">Stok</th>
                  <th>Jumlah</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
          
        </div>
        <div class="modal-footer p-1">
          <button class="btn btn-xs btn-success" onclick="simpanexpired();" id="simpanexpired" disabled><i class="fa fa-save"></i> Simpan</button>
        </div>
      </div>

    </div>
  </div>
</div>

<script type="text/javascript">
var tabAktif    = "<?php echo $tabObat; ?>";
var kdObat      = "<?php echo $kdObat; ?>";
var jumlahObat  = "<?php echo $jumlahObat; ?>";
var nomor       = "<?php echo $nomor; ?>";
var id_kunj_far = "<?php echo $id_kunj_far; ?>";
var content     = "<?php echo $eresepRWJ; ?>";
var eresepRacik = "<?php echo $eresepRacik; ?>";
// if (id_kunj_far == '0'){
//   document.getElementById('resepRWJ_expiredObat_loading').style.display = 'block';
// }else{
//   resepRWJ_expiredObat();
// }
var nm = $("#nm_function").html();
$("#resepRWJ_expiredObat").modal({backdrop: "static"});
$('#resepRWJ_expiredObat').on('shown.bs.modal', function () {
  
});

document.getElementById('resepRWJ_expiredObat_loading').style.height = document.documentElement.clientHeight;
var cek_data = false;
resepRWJ_expiredObat();
function resepRWJ_expiredObat(){
  document.getElementById('resepRWJ_expiredObat_loading').style.display = 'block';
  var param ={
    kd_obat     : kdObat,
    id_unit     : idunit,
    jumlahObat  : jumlahObat,
    id_user     : user['id_user'],
    kd_milik    : user['kepemilikan_obat'],
  };
  apiPOST('Apotek/getExpObat', param, hasil => {
    if(hasil !== null){
      cek_data = true;
      loading();

      var ExpObat    = hasil['data'];
      for (var o = 0; o < ExpObat.length; o++) {
        var kd_obt    = ExpObat[o].kd_obat;
        var nm_obat   = ExpObat[o].nama_obat;
        var expired   = ExpObat[o].exp;
        var stok_unit = ExpObat[o].stok_unit;
        var kd_milik  = ExpObat[o].kd_milik;
        var milik     = ExpObat[o].milik;
        var id_unit   = ExpObat[o].id_unit;
        var jumlah    = 0;
        resepRWJ_expiredObat_data(kd_obt, nm_obat, expired, stok_unit, jumlah, kd_milik, milik, id_unit);
      }
    }
  }).then(value => {
      loading();
  });
}

function resepRWJ_expiredObat_data(kd_obt, nm_obat, expired, stok_unit, jumlah, kd_milik, milik, id_unit){
  var nomor = $('#list_data_expiredObat tbody tr').length + 1;  
  var Baris = '';
      Baris += '<tr>';
      Baris += "<td hidden>";
      Baris += "<input type='text' name='resepRWJ_expiredObat_kd_obt[]' value='" + kd_obt + "' disabled >";
      Baris += "</td>";
      Baris += "<td >";
      Baris += "<input type='text' class='form-control form-control-xxs' value='" + milik + "' disabled >";
      Baris += "</td>";
      Baris += "<td>";
      Baris += "<input style='text-align:left;' type='text' class='form-control form-control-xxs' name='resepRWJ_expiredObat_exp[]' value='" + expired + "' disabled>";
      Baris += "</td>";
      Baris += "<td><input style='text-align:center;' type='text' class='form-control form-control-xxs' name='resepRWJ_expiredObat_stok[]' value='" + stok_unit + "' disabled></td>";
      Baris += "<td>";
      Baris += "<input type='number' class='form-control form-control-xxs' name='resepRWJ_expiredObat_jmlh[]' value='" + jumlah + "' onkeyup='resepRWJ_expiredObat_jmlh(this, "+nomor+")'>";
      Baris += "</td>";
      Baris += "<td hidden><input type='number' class='form-control form-control-xxs' name='resepRWJ_expiredObat_kdmilik[]' value='" + kd_milik + "' disabled></td>";
      Baris += "<td hidden><input type='number' class='form-control form-control-xxs' name='resepRWJ_expiredObat_idunitfar[]' value='" + id_unit + "' disabled></td>";
      Baris += "</tr>";

    $('#list_data_expiredObat tbody').append(Baris);
}

function resepRWJ_expiredObat_jmlh(value, nomor) {
  //document.getElementById('simpanexpired').disabled = true;
  let qty  = Number(document.getElementById("list_data_expiredObat").rows[nomor].cells[4].firstChild.value);
  let jmlh_stok_tersedia  = Number(document.getElementById("list_data_expiredObat").rows[nomor].cells[3].firstChild.value);
  if (qty > jmlh_stok_tersedia){
    toastr.error("Jumlah Obat Melebihi Stok...");
    document.getElementById('simpanexpired').disabled = true;
  }else{
    document.getElementById('simpanexpired').disabled = false;
  }
}

function loading(){
  if(cek_data){
    document.getElementById('resepRWJ_expiredObat_loading').style.display = 'none';
  }
}

function keluarresepRWJ_expiredObat() {
  $('#resepRWJ_expiredObat').modal('hide');
  $('.modal-backdrop').hide();
}

function simpanexpired(){
  var getkd_obt    = document.getElementsByName('resepRWJ_expiredObat_kd_obt[]');
  var getexp       = document.getElementsByName('resepRWJ_expiredObat_exp[]');
  var getstokawal  = document.getElementsByName('resepRWJ_expiredObat_stok[]');
  var getjumlah    = document.getElementsByName('resepRWJ_expiredObat_jmlh[]');
  var getkdmilik   = document.getElementsByName('resepRWJ_expiredObat_kdmilik[]');
  var getidunitfar = document.getElementsByName('resepRWJ_expiredObat_idunitfar[]');
  var count        = $('#list_data_expiredObat tbody tr').length;
  let xtotal       = 0;
  let xtotal_stok  = 0;
  
  const params    = [];
  // var params  = {};
  // params.data = [];
  for(var i = 0, iLen = count ; i < iLen; i++){
    var x = {};
    //console.log(getjumlah[i].value);
    if ((getjumlah[i].value == '')||(getjumlah[i].value == '0')){
      //x.getjumlah   = 0;
    }else{
      x.id_kunj_far   = id_kunj_far;
      x.getexp        = getexp[i].value;
      x.getbatch      = '';
      x.getkd_obt     = getkd_obt[i].value;
      x.getidUnit     = getidunitfar[i].value;
      x.getkdmilik    = getkdmilik[i].value;
      x.getstokawal   = getstokawal[i].value;
      x.getjumlah     = getjumlah[i].value;
      if (tabAktif != 0){
        x.jns_racikan   = nama_racikan;
      }else{
        x.jns_racikan   = '0';
      }
      params.push(x);  
    }
    
    xtotal      += Number(getjumlah[i].value);
    xtotal_stok += Number(getstokawal[i].value);
  }
  
  if ((xtotal != jumlahObat)||(xtotal == 0)){
    toastr.warning("Jumlah Obat Tidak Sesuai...");
  }else{
    if (xtotal > xtotal_stok){
      toastr.warning("Jumlah Obat Melebihi Stok...");
    }else{
      var getexpired_row = document.getElementById("list_data_expiredObat").rows[1].cells[2].firstChild.value;
      
      if (tabAktif != 0){ //RACIK
        if (content == 'eresepRWJAPT'){
          sessionStorage[nama_racikan+"RJ"+kdObat] = JSON.stringify(params);
          //sessionStorage["ObatRacikRJ"+kdObat] = JSON.stringify(params);
          //document.getElementById("eresepRWJAPTtable_obatracik").rows[nomor].cells[7].firstChild.value = getexpired_row;
          document.getElementById('eresepRWJAPT_obat_racik_exp').value        = getexpired_row;
          $("#eresepRWJAPT_obat_racik_ket").trigger('focus');
          stok_unit = jumlahObat;
        }else if (content == 'eresepRWIAPT'){
          sessionStorage[nama_racikan+"RI"+kdObat] = JSON.stringify(params);
          document.getElementById('eresepRWIAPT_obat_racik_exp').value        = getexpired_row;
          $("#eresepRWIAPT_obat_racik_ket").trigger('focus');
          stok_unit = jumlahObat;
        }else if (content == 'eresepIGDAPT'){
          sessionStorage[nama_racikan+"IGD"+kdObat] = JSON.stringify(params);
          document.getElementById('eresepIGDAPT_obat_racik_exp').value        = getexpired_row;
          $("#eresepIGDAPT_obat_racik_ket").trigger('focus');
          stok_unit = jumlahObat;
        }else if (content == 'resepRJIGDAPT'){
          sessionStorage[nama_racikan+"RJIGDFAR"+kdObat] = JSON.stringify(params);
          document.getElementById('resepRJIGDAPT_obat_racik_exp').value         = getexpired_row;
          $("#resepRJIGDAPT_obat_racik_ket").trigger('focus');
          stok_unitRJFAR = jumlahObat;
        }else if (content == 'resepRIAPT'){
          sessionStorage[nama_racikan+"RIFAR"+kdObat] = JSON.stringify(params);
          document.getElementById('resepRIAPT_obat_racik_exp').value         = getexpired_row;
          $("#resepRIAPT_obat_racik_ket").trigger('focus');
          stok_unitRIFAR = jumlahObat;
        }else{
          toastr.error("ERROR EXPIRED OBAT RACIK!!");
        }
        // else{
        //   sessionStorage[nama_racikan+"RJFAR"+kdObat] = JSON.stringify(params);
        //   document.getElementById('resepRJIGDAPT_obat_racik_exp').value        = getexpired_row;
        //   $("#resepRJIGDAPT_obat_racik_ket").trigger('focus');
        //   stok_unitRJFAR = jumlahObat;
        // }
        
      }else{ //OBAT
        if (content == 'eresepRWJAPT'){
          sessionStorage["ObatJadiRJ"+kdObat] = JSON.stringify(params)
          document.getElementById('eresepRWJAPT_obatjadi_signa').disabled     = false;
          document.getElementById('eresepRWJAPT_obatjadi_ket').disabled       = false;
          document.getElementById('eresepRWJAPT_btn_check_obatjadi').disabled = false;
          document.getElementById('eresepRWJAPT_obatjadi_expired').value      = getexpired_row;
          $("#eresepRWJAPT_obatjadi_signa").trigger('focus');
          stok_unit = jumlahObat;
        }else if (content == 'eresepRWIAPT'){
          sessionStorage["ObatJadiRI"+kdObat] = JSON.stringify(params)
          document.getElementById('eresepRWIAPT_obatjadi_signa').disabled     = false;
          document.getElementById('eresepRWIAPT_obatjadi_ket').disabled       = false;
          document.getElementById('eresepRWIAPT_btn_check_obatjadi').disabled = false;
          document.getElementById('eresepRWIAPT_obatjadi_expired').value      = getexpired_row;
          $("#eresepRWIAPT_obatjadi_signa").trigger('focus');
          stok_unit = jumlahObat;
        }else if (content == 'eresepIGDAPT'){
          sessionStorage["ObatJadiIGD"+kdObat] = JSON.stringify(params)
          document.getElementById('eresepIGDAPT_obatjadi_signa').disabled     = false;
          document.getElementById('eresepIGDAPT_obatjadi_ket').disabled       = false;
          document.getElementById('eresepIGDAPT_btn_check_obatjadi').disabled = false;
          document.getElementById('eresepIGDAPT_obatjadi_expired').value      = getexpired_row;
          $("#eresepIGDAPT_obatjadi_signa").trigger('focus');
          stok_unit = jumlahObat;
        }else if (content == 'resepRJIGDAPT'){
          sessionStorage["ObatJadiRJIGDFAR"+kdObat] = JSON.stringify(params)
          document.getElementById('resepRJIGDAPT_obatjadi_signa').disabled     = false;
          document.getElementById('resepRJIGDAPT_obatjadi_ket').disabled       = false;
          document.getElementById('resepRJIGDAPT_btn_check_obatjadi').disabled = false;
          document.getElementById('resepRJIGDAPT_obatjadi_expired').value      = getexpired_row;
          $("#resepRJIGDAPT_obatjadi_signa").trigger('focus');
          stok_unitRJFAR = jumlahObat;
        }else if (content == 'resepRIAPT'){
          sessionStorage["ObatJadiRIFAR"+kdObat] = JSON.stringify(params)
          document.getElementById('resepRIAPT_obatjadi_signa').disabled     = false;
          document.getElementById('resepRIAPT_obatjadi_ket').disabled       = false;
          document.getElementById('resepRIAPT_btn_check_obatjadi').disabled = false;
          document.getElementById('resepRIAPT_obatjadi_expired').value      = getexpired_row;
          $("#resepRIAPT_obatjadi_signa").trigger('focus');
          stok_unitRIFAR = jumlahObat;
        }else{
          toastr.error("ERROR EXPIRED OBAT JADI!!");
          // sessionStorage["ObatJadiIGDFAR"+kdObat] = JSON.stringify(params)
          // document.getElementById('eresepRWIAPT_obatjadi_signa').disabled     = false;
          // document.getElementById('eresepRWIAPT_obatjadi_ket').disabled       = false;
          // document.getElementById('eresepRWIAPT_btn_check_obatjadi').disabled = false;
          // document.getElementById('eresepRWIAPT_obatjadi_expired').value      = getexpired_row;
          // $("#eresepRWIAPT_obatjadi_signa").trigger('focus');
          // stok_unitRJFAR = jumlahObat;
        }
      }
      keluarresepRWJ_expiredObat();
    }
  }
}

</script>