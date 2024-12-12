<?php
  $data     = json_decode($_GET['data']);
  $nowday   = date('Y-m-d');
  $id_kunj  = str_replace('"','', json_encode($data->id_kunj));
  $tglkunj  = str_replace('"','', json_encode($data->tgl_kunj));
  $no_rm    = str_replace('"','', json_encode($data->no_rm));
  $idunit   = str_replace('"','', json_encode($data->idunit)); 
?>
<div class="content modal fade" id="historyorder_eresep">
  <div class="container-fluid">
    <div class="modal-dialog modal-xl" style="min-width: 100%;">
      
      <div class="modal-content" style="height: 489px;max-height: 489px;overflow-x: hidden;">
        <div class="overlay-wrapper" id="loading_historyorder_eresep">
          <div class="overlay dark">
            <i class="fas fa-3x fa-sync-alt fa-spin"></i>            
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-12">
            <div class="card-header p-1 darkgrey-custom">
              <h3 class="card-title">History Order Resep Dokter</h3>
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
                  <select class="form-control form-control-xs" id="historyorder_eresep_jmlh" name="historyorder_eresep_jmlh" onchange="getHistory()">
                    <option value="5">5 Data</option>
                    <option value="10">10 Data</option>
                    <option value="20">20 Data</option>
                    <option value="30">30 Data</option>
                    <option value="40">40 Data</option> 
                    <option value="50">50 Data</option>
                    <option value="0">- Semua Data -</option>
                  </select>
                </div>
              </div>
            </div>
              <div class="card-body p-2">

                <div id="accordion">
                  
                  <!-- <div class="card card-primary">
                    <div class="card-header">
                      <h4 class="card-title w-100">
                        <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseOne" aria-expanded="false">
                        Group Item #1
                        </a>
                      </h4>
                    </div>
                    <div id="collapseOne" class="collapse" data-parent="#accordion" style="">
                      <div class="card-body">ISINE 1
                      </div>
                    </div>
                  </div>

                  <div class="card card-danger">
                    <div class="card-header">
                      <h4 class="card-title w-100">
                        <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false">Group Item #2</a>
                      </h4>
                    </div>
                    <div id="collapseTwo" class="collapse" data-parent="#accordion" style="">
                      <div class="card-body">ISINE 2
                      </div>
                    </div>
                  </div> -->

                </div> <!-- accordion -->
              </div><!-- card-body -->

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
  showUp_historyorder_eresep();
  getHistory();
});

function showUp_historyorder_eresep(){ 
  $("#historyorder_eresep").modal({backdrop: "static"});
  $('#historyorder_eresep').on('shown.bs.modal', function() { });
}

function keluar_historyorder_eresep() {
  $('#historyorder_eresep').modal('hide');
  // $('.modal-backdrop').hide();
}

function getHistory(){
  $('#accordion').html('');
  $('#loading_historyorder_eresep').show();
  var param ={
    id_kunj     : id_kunj,
    id_unit     : idunit,
    tglkunj     : tglkunj,
    no_rm       : no_rm,
    jmlh        : document.getElementById("historyorder_eresep_jmlh").value
  };

  apiPOST('Apotek/getHistoryOrderResep', param, hasil => {
    $('#loading_historyorder_eresep').hide();
    if(hasil !== null){
      
      if (hasil['code'] == '200') {

        var Data    = hasil['data'];
        for (var o = 0; o < Data.length; o++) {
          var tgl_masukx     = Data[o].tgl_masuk;
          var tglorderx      = Data[o].tglorder;
          var id_kunjunganx  = Data[o].id_kunjungan;
          var id_orderx      = Data[o].id_order;
          var id_unitx       = Data[o].id_unit;
          var nama_unitx     = Data[o].nama_unit;
          
          var baris = '';
              baris += '<div class="card card-info mb-2" style="box-shadow: 0px 0px 0px 1px #000000, 5px 5px 8px 3px #6c757d">';
              baris += '<div class="card-header p-2">';
              baris += '<span>';
              baris += '<a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapse'+o+'" aria-expanded="false" onclick="caridataorder_resep('+"'collapse"+o+"','"+tglorderx+"','"+id_kunjunganx+"','"+id_orderx+"'"+')">#'+(o+1)+'. Tgl. Kunjung : '+tglorderx+' || '+nama_unitx.toUpperCase()+'</a>';
              baris += '</span>';
              baris += '</div>';
              baris += '<button class="btn btn-danger m-2" onclick="gunakanhistory('+"'"+tglorderx+"','"+id_kunjunganx+"','"+id_orderx+"'"+')" style="float: right; font-size: 12px; font-weight: 700;line-height: 1;"><i class="fa fa-check"></i> Gunakan History</button>';
              baris += '<div id="collapse'+o+'" class="collapse p-2" data-parent="#accordion"></div>';
              baris += '</div>';
          $('#accordion').append(baris);
        }
      }else{
        toastr.info("Belum Memiliki Riwayat Order Resep.");
      }
    }
  }).then(value => {

  });
}

function gunakanhistory(tglorderx, id_kunjunganx, id_orderx) {
  pertanyaan.fire({
    title             : 'Penggunaan History Obat',
    html              : '<span>Resep yang sudah dientry sebelumnya akan digantikan dengan Resep History yang dipilih, tetap lanjut ? </span>',
    icon              : 'question',
    showCancelButton  : true,
    reverseButtons    : false,
    allowOutsideClick : false
  }).then((result) => {
    if (result.isConfirmed) {
      var param = {
        caritglorderx : tglorderx,
        cariid_kunj   : id_kunjunganx,
        cariid_orderx : id_orderx,
        id_kunj       : id_kunj,
        id_unit       : id_unit,
        id_peg        : user['id_pegawai'],
        id_order      : document.getElementById("erm_eresepGab_idresep").value,
        diag          : document.getElementById("erm_eresepGab_diagnosa").value,
        iter          : document.getElementById("erm_eresepGab_iter").value,
        user          : user['id_user'],
        tglorder      : document.getElementById('erm_eresepGab_tglresep').value,
        
      };

      apiPOST('Apotek/CreateOrderResepRWJ_history', param, hasil => {
        if (hasil !== null) {
          document.getElementById("erm_eresepGab_idresep").value = hasil['id_order'];
          keluar_historyorder_eresep();
          getData_erm_eresepGab();
        }
      });
    }else if(result.dismiss === Swal.DismissReason.cancel){
      
    }
  })
}

function caridataorder_resep(id, tglorderx, id_kunjunganx, id_orderx){
  var param ={
    tglorder : tglorderx,
    id_order : id_orderx
  };

  apiPOST('Apotek/getDetail_HistoryOrderResep', param, hasil => {
    if(hasil !== null){
      $('#'+id).html('');
      if (hasil['code'] == '200') {
        var ObatJadi    = hasil['ObatJadi'];
        var GroupRacik  = hasil['GroupRacik'];
        var ObatRacik   = hasil['ObatRacik'];

        if (ObatJadi.length > 0){
          tabel_detailorder_ObatJadi(id);
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

          $('#tabel_detailorder_obatjadi'+id+' tbody').append(isi);
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
              groupracikan[g] = GroupRacik[g].jns_racikan;       
            }

            var group_racikan = groupracikan.filter(onlyUnique);
            //console.log(group_racikan);
            const group_racikandriOBAT = groupBy(ObatRacik, "jns_racikan");
            //console.log(group_racikandriOBAT);
            
            for (let a = 0; a < group_racikan.length; a++) {
              var nm_kelompok   = group_racikan[a];
              var judulracikan  = '';
              tabel_detailorder_ObatRacik(id, nm_kelompok);
              jmlh_rac = group_racikandriOBAT[nm_kelompok][0].qty_racik;          

              judulracikan += '<tr class="group">';
                judulracikan  += '<td align="left" colspan="2"><u><i><span>'+nm_kelompok+'</span></i></u></td>';
                judulracikan  += '<td align="left" colspan="3">Jumlah Racikan : '+jmlh_rac+'</td>';
              judulracikan += '</tr>';

              $('#tabel_detailorder_obatracik'+nm_kelompok+' tbody').append(judulracikan);

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
                $('#tabel_detailorder_obatracik'+nm_kelompok+' tbody').append(isi);

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
                $('#tabel_detailorder_obatracik'+nm_kelompok+' tbody').append(tambahan);
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
function tabel_detailorder_ObatJadi(id){
  $('#tabel_detailorder_obatjadi'+id+' tbody').html('');
  var tabel = ''; 
      tabel += '<table id="tabel_detailorder_obatjadi'+id+'" class="table table-striped table-sm" >';
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

function tabel_detailorder_ObatRacik(id, nm_kelompok){
  $('#tabel_detailorder_obatracik'+nm_kelompok+' tbody').html('');
  var tabel = ''; 
      tabel += '<table id="tabel_detailorder_obatracik'+nm_kelompok+'" class="table table-striped table-sm" >';
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
</script>
