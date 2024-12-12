<?php
  $data     = json_decode($_GET['data']);
  $nowday   = date('Y-m-d');
  $id_kunj  = str_replace('"','', json_encode($data->id_kunj));
  $tglkunj  = str_replace('"','', json_encode($data->tgl_kunj));
  $no_rm    = str_replace('"','', json_encode($data->no_rm));
  $idunit   = str_replace('"','', json_encode($data->idunit)); 
?>
<div class="content modal fade" id="templateorder_eresep">
  <div class="container-fluid">
    <div class="modal-dialog modal-xl" style="min-width: 100%;">
      
      <div class="modal-content" style="height: 580px;max-height: 580px;overflow-x: hidden;">
        <div class="overlay-wrapper" id="loading_templateorder_eresep">
          <div class="overlay dark">
            <i class="fas fa-3x fa-sync-alt fa-spin"></i>            
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-12">
            <div class="card-header p-1 darkgrey-custom">
              <h3 class="card-title">Template Resep Dokter</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color: black;">×</span>
              </button>
            </div>
            <div class="p-1 darkgrey-custom">
              <div class="row">
                <div class="input-group col-sm-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text form-control-xs">Jumlah Data :</span>
                  </div>
                  <select class="form-control form-control-xs" id="templateorder_eresep_jmlh" name="templateorder_eresep_jmlh" onchange="getHistoryTemplateOrderResep()">
                    <option value="5">5 Data</option>
                    <option value="10">10 Data</option>
                    <option value="20">20 Data</option>
                    <option value="30">30 Data</option>
                    <option value="40">40 Data</option> 
                    <option value="50">50 Data</option>
                    <option value="0">- Semua Data -</option>
                  </select>
                </div>
                <!-- <div class="col-sm-3">
                 <button type="button" class="btn btn-sm bg-gradient-info" onclick="buattemplate()"><i class="fa fa-edit"></i> Buat Template</button>
                </div> -->
              </div>
            </div>

              <div class="card-body p-2">

                <div id="accordion">
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
//sessionStorage.clear();

var id_kunj  = "<?php echo $id_kunj; ?>";
var tglkunj  = "<?php echo $tglkunj; ?>";
var no_rm    = "<?php echo $no_rm; ?>";
var idunit   = "<?php echo $idunit; ?>";

$(document).ready(function() {
  showUp_templateorder_eresep();
  getHistoryTemplateOrderResep();
});

function showUp_templateorder_eresep(){ 
  $("#templateorder_eresep").modal({backdrop: "static"});
  $('#templateorder_eresep').on('shown.bs.modal', function() { });
}

function keluar_templateorder_eresep() {
  $('#templateorder_eresep').modal('hide');
  // $('.modal-backdrop').hide();
}

function getHistoryTemplateOrderResep(){
  $('#accordion').html('');
  $('#loading_templateorder_eresep').show();
  var param ={
    iddokter    : user['id_pegawai'],
    jmlh        : document.getElementById("templateorder_eresep_jmlh").value
  };

  apiPOST('Apotek/getTemplateOrderEResep', param, hasil => {
    $('#loading_templateorder_eresep').hide();
    if(hasil !== null){
      
      if (hasil['code'] == '200') {

        var Data    = hasil['data'];
        for (var o = 0; o < Data.length; o++) {
          var tgl_buat      = Data[o].tgl_buat;
          var id_template   = Data[o].id_template;
          var nama_pegawai  = Data[o].nama_pegawai;
          
          var baris = '';
              baris += '<div class="card card-info mb-2" style="box-shadow: 0px 0px 0px 1px #000000, 0px 0px 2px 2px #abdaa8">';
              baris += '<div class="card-header p-2">';
              baris += '<span>';
              baris += '<a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapse'+o+'" aria-expanded="false" onclick="ViewgetTemplateOrderResep('+"'collapse"+o+"','"+id_template+"','"+tgl_buat+"'"+')">#'+(o+1)+' <i>'+nama_pegawai.toUpperCase()+'</i></a>';
              baris += '</span>';
              baris += '</div>';
              baris += '<button class="btn btn-outline-warning m-2" onclick="gunakantemplateresep('+"'"+id_template+"','"+tgl_buat+"'"+')" style="float: right; font-size: 12px; font-weight: 700;line-height: 1;"><i class="fa fa-check"></i> Gunakan Template Resep</button>';
              baris += '<div id="collapse'+o+'" class="collapse p-2" data-parent="#accordion"></div>';
              baris += '</div>';
          $('#accordion').append(baris);
        }
      }else{
        toastr.info("Belum Memiliki Template Resep.");
      }
    }
  }).then(value => {

  });
}

function gunakantemplateresep(id_template, tgl_buat) {
  pertanyaan.fire({
    title             : 'Penggunaan Template Resep',
    html              : '<span>Resep yang sudah dientry sebelumnya akan digantikan dengan Resep Template yang dipilih, tetap lanjut ? </span>',
    icon              : 'warning',
    showCancelButton  : true,
    reverseButtons    : false,
    allowOutsideClick : false
  }).then((result) => {
    if (result.isConfirmed) {
      var param = {
        id_template   : id_template,
        tgl_buat      : tgl_buat,
        id_kunj       : id_kunj,
        id_unit       : id_unit,
        id_peg        : user['id_pegawai'],
        user          : user['id_user'],
        id_order      : document.getElementById("erm_eresepGab_idresep").value,
        tglorder      : document.getElementById('erm_eresepGab_tglresep').value,
        diag          : document.getElementById("erm_eresepGab_diagnosa").value,
        iter          : document.getElementById("erm_eresepGab_iter").value,
      };

      apiPOST('Apotek/CreateOrderResepRWJ_templateresep', param, hasil => {
        if (hasil !== null) {
          document.getElementById("erm_eresepGab_idresep").value = hasil['id_order'];
          keluar_templateorder_eresep();
          getData_erm_eresepGab();
        }
      });
    }else if(result.dismiss === Swal.DismissReason.cancel){
      
    }
  })
}

function ViewgetTemplateOrderResep(id, id_template, tgl_buat){
  var param ={
    id_template : id_template,
    tgl_buat    : tgl_buat
  };

  apiPOST('Apotek/getTemplateOrderResepDetail', param, hasil => {
    if(hasil !== null){
      $('#'+id).html('');
      if (hasil['code'] == '200') {
        var ObatJadi    = hasil['ObatJadi'];
        var GroupRacik  = hasil['GroupRacik'];
        var ObatRacik   = hasil['ObatRacik'];

        if (ObatJadi.length > 0){
          tabel_detailtemplateresep_ObatJadi(id);
        }          
        for (var Oj = 0; Oj < ObatJadi.length; Oj++) {
          var no        = 1 + Oj; 
          var kd_prd    = ObatJadi[Oj].kd_prd;
          var nm_obat   = ObatJadi[Oj].nama_obat;
          var qty       = ObatJadi[Oj].jumlah;
          var id_signa  = ObatJadi[Oj].id_signa;
          var signa     = ObatJadi[Oj].signa;
          var ket       = ObatJadi[Oj].ket;
          var persediaan = 0;

          var isi = '';
              isi += '<tr style="font-weight:bold;">';
              isi  += '<td>'+no+'</td>';
              isi  += '<td>'+nm_obat+'</td>';
            
            if (persediaan > 0){
              isi  += '<td align="center">'+persediaan+'</td>';
            }else{
              isi  += '<td align="center">0</td>';
            }
            if (qty > 0){
              isi  += '<td align="center">'+qty+'</td>';
            }else{
              isi  += '<td align="center" style="color:red;">null</td>';
            }                
            if ((id_signa != null)||(id_signa != '')){
              isi  += '<td align="center">'+signa+'</td>'; 
            }else{
              isi  += '<td align="center">Tidak di ketahui</td>'; 
            }
              isi += '</tr>';
            if (ket != ''){
              isi += '<tr>';
              isi += '<td align="left" colspan="5">Catatan : '+ket+'</td>';
              isi += '</tr>';
            }

          $('#tabel_detailtemplateresep_obatjadi'+id+' tbody').append(isi);
        }

        if (GroupRacik.length > 0){
            
            groupracikan = [];
            for (var g = 0; g < GroupRacik.length; g++) {
              var nama_racikan  = GroupRacik[g].jns_racikan;
              var nma_racikan   = GroupRacik[g].jns_racikan;
              var byk_racikan   = GroupRacik[g].qty_racik;
              var ket_racikan   = GroupRacik[g].ket_racik;
              var id_sig_rac    = GroupRacik[g].id_signa;
              var sig_racikan   = GroupRacik[g].signa;
              var x             = GroupRacik[g].jns_racikan;
              groupracikan[g]   = GroupRacik[g].jns_racikan;         
            }

            var group_racikan = groupracikan.filter(onlyUnique);
            // console.log(group_racikan);
            const group_racikandriOBAT = groupBy(ObatRacik, "jns_racikan");
            // console.log(group_racikandriOBAT);
            
            for (let a = 0; a < group_racikan.length; a++) {
              var nm_kelompok   = group_racikan[a];
              var judulracikan  = '';
              tabel_detailtemplateresep_ObatRacik(id, nm_kelompok);
              jmlh_rac = group_racikandriOBAT[nm_kelompok][0].qty_racik;          

              judulracikan += '<tr class="group">';
                judulracikan  += '<td align="left" colspan="2"><u><i><span>'+nm_kelompok+'</span></i></u></td>';
                judulracikan  += '<td align="left" colspan="3">Jumlah Racikan : '+jmlh_rac+'</td>';
              judulracikan += '</tr>';

              $('#tabel_detailtemplateresep_obatracik'+nm_kelompok+' tbody').append(judulracikan);

              const params    = []; 
              for (let i = 0; i < group_racikandriOBAT[nm_kelompok].length; i++) {
                var no        = 1 + i; 
                var kd_prd    = group_racikandriOBAT[nm_kelompok][i].kd_prd;
                var nm_obat   = group_racikandriOBAT[nm_kelompok][i].nama_obat;
                var dosis     = group_racikandriOBAT[nm_kelompok][i].dosis;
                var qty       = group_racikandriOBAT[nm_kelompok][i].jumlah;
                var ket       = group_racikandriOBAT[nm_kelompok][i].ket;
                var jns_racik = group_racikandriOBAT[nm_kelompok][i].jns_racikan;
                var persediaan = 0;

                var isi = '';
                    isi += '<tr style="font-weight:bold;">';
                    isi  += '<td>'+no+'</td>';
                    isi  += '<td>'+nm_obat+'</td>';
                    if (persediaan > 0){
                      isi  += '<td align="center">'+persediaan+'</td>';
                    }else{
                      isi  += '<td align="center">0</td>';
                    }
                    
                    isi  += '<td align="center">'+dosis+'</td>';

                    if (qty > 0){
                      isi  += '<td align="center">'+qty+'</td>';
                    }else{
                      isi  += '<td align="center" style="color:red;">null</td>';
                    }

                    isi += '</tr>';
                $('#tabel_detailtemplateresep_obatracik'+nm_kelompok+' tbody').append(isi);

              }
              
              if (group_racikandriOBAT[nm_kelompok][0].jns_racikan == nm_kelompok){
                
                signa   = group_racikandriOBAT[nm_kelompok][0].signa;
                catatan = group_racikandriOBAT[nm_kelompok][0].ket_racik;
                
                var tambahan = '';

                tambahan += '<tr>';
                  tambahan += '<td align="Left" colspan="5">Signa : <strong>'+signa+'</strong></td>';
                tambahan += '</tr>';

                tambahan += '<tr>';
                  tambahan += '<td align="Left" colspan="5">Catatan : <strong>'+catatan+'</strong></td>';
                tambahan += '</tr>';
                $('#tabel_detailtemplateresep_obatracik'+nm_kelompok+' tbody').append(tambahan);
              }

            }
          }

      }else{
        toastr.info("Belum Memiliki Riwayat Order Resep.");
      }
    }
  }).then(value => {

  });
}
function tabel_detailtemplateresep_ObatJadi(id){
  $('#tabel_detailtemplateresep_obatjadi'+id+' tbody').html('');
  var tabel = ''; 
      tabel += '<table id="tabel_detailtemplateresep_obatjadi'+id+'" class="table table-striped table-sm" >';
      tabel += '<thead>';
        tabel += '<tr style="background-color: darkgreen; color:white;">';
          tabel += '<th width="5">#</th>';
          tabel += '<th width="280">Nama Obat</th>';
          tabel += '<th width="100" style="text-align: center;">Dosis Obat</th>';
          tabel += '<th width="120" style="text-align: center;">Jumlah</th>';
          tabel += '<th style="text-align: center;">Signa</th>';        
        tabel += '</tr>';
      tabel += '</thead>';
      tabel += '<tbody>';    
      tabel += '</tbody>';
      tabel += '</table>';

  $('#'+id).append(tabel);
}

function tabel_detailtemplateresep_ObatRacik(id, namaracikan){
  $('#tabel_detailtemplateresep_obatracik'+namaracikan+' tbody').html('');
  var tabel = ''; 
      tabel += '<table id="tabel_detailtemplateresep_obatracik'+namaracikan+'" class="table table-striped table-sm" >';
      tabel += '<thead>';
        tabel += '<tr style="background-color: darkgreen; color:white;">';
          tabel += '<th width="5">#</th>';
          tabel += '<th width="280">Nama Obat</th>';
          tabel += '<th width="100" style="text-align: center;">Dosis Obat</th>';
          tabel += '<th width="120" style="text-align: center;">Permintaan</th>';
          tabel += '<th style="text-align: center;">Jumlah</th>';
        tabel += '</tr>';
      tabel += '</thead>';
      tabel += '<tbody>';    
      tabel += '</tbody>';
      tabel += '</table>';

  $('#'+id).append(tabel);
}

function buattemplate() {
  document.getElementById('07012').click();
  keluar_templateorder_eresep();
  keluarmodal_erm_eresepGab();
}
</script>
