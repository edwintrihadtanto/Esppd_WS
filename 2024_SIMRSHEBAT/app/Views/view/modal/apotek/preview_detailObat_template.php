<?php
  $data         = json_decode($_GET['data']);
  $idtemplate   = str_replace('"','', json_encode($data->idtemplate));
  $tgltemplate  = str_replace('"','', json_encode($data->tgltemplate));
  $iddokter     = str_replace('"','', json_encode($data->iddokter));
  $jnsresep     = str_replace('"','', json_encode($data->jnsresep));
  $catdokter    = str_replace('"','', json_encode($data->catdokter));
  $status       = str_replace('"','', json_encode($data->status));
  $catdokter2   = str_replace('\/','/', $catdokter);
?>

<div class="modal fade" id="modalpreview_templateeresep" style="background-color: #000000b8;">
  <div class="modal-dialog modal-lg" > <!-- style="max-width: 714px;" -->
    <div class="modal-content">
      <div class="overlay-wrapper" id="loading_modalpreview_templateeresep">
        <div class="overlay dark">
          <i class="fas fa-3x fa-sync-alt fa-spin"></i>            
        </div>
      </div>
      <div class="modal-body">
        <div class="col-sm-6" style="position:absolute;">
          <img src="<?= base_url('_assets/dist/img/darmayu.png') ?>" alt="Logo SIM-RS" width="80" height="80">
        </div>
        <h5 class="mt-3" style="text-align: center; font-weight: 500"><u>Preview Template E-Resep</u></h5>
        <hr class="mt-5">
        <table border="0" cellpadding='0' width="100%">
        <tr>
          <td style="width: 60%;vertical-align: baseline;">
            <div class="row">
              <div class="col-sm-3"><h6>Id.Template</h6></div>
              <div class="col-sm-auto"><h6>:</h6></div>
              <div class="col-sm-8"><h6><?php echo $idtemplate; ?></h6></div>
            </div>
            <div class="row">
              <div class="col-sm-3"><h6>Tgl Dibuat</h6></div>
              <div class="col-sm-auto"><h6>:</h6></div>
              <div class="col-sm-8"><h6><?php echo $tgltemplate ?></h6></div>
            </div>
            <div class="row">
              <div class="col-sm-3"><h6>Catatan Dokter</h6></div>
              <div class="col-sm-auto"><h6>:</h6></div>
              <div class="col-sm-8"><h6><?php echo $catdokter2; ?></h6></div>
            </div>
            <div class="row">
              <div class="col-sm-3"><h6>Jenis Resep</h6></div>
              <div class="col-sm-auto"><h6>:</h6></div>
              <div class="col-sm-8"><h6><?php echo $jnsresep; ?></h6></div>
            </div>
            
          </td>
          <td style="vertical-align: baseline;">
            <div class="row">
              <div class="col-sm-2"><h6>User</h6></div>
              <div class="col-sm-auto"><h6>:</h6></div>
              <div class="col-sm-9"><h6 id="userpembuat_templateresep"></h6></div>
            </div>
            <div class="row">
              <div class="col-sm-2"><h6>Dokter</h6></div>
              <div class="col-sm-auto"><h6>:</h6></div>
              <div class="col-sm-9"><h6 id="dokterpembuat_templateresep"></h6></div>
            </div>
          </td>
        </tr>
        </table>
        <hr>
        <div id="templateresep_contentprev"></div>
        
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-danger btn-sm" onclick="dismisspreview_templateresep();"><i class="fa fa-reply"></i> Kembali (Esc)</button>
        <button type="button" class="btn btn-info btn-sm" id="selesaitemplateresep" onclick="selesaitemplateresep();" style="display: none;"><i class="fa fa-share"></i> Selesai</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<script type="text/javascript">
  var idtemplate  = "<?php echo $idtemplate; ?>";
  var tgltemplate = "<?php echo $tgltemplate; ?>";
  var iddokter    = "<?php echo $iddokter; ?>";
  var jnsresep    = "<?php echo $jnsresep; ?>";
  var statusblock = "<?php echo $status; ?>";

  $(document).ready(function() {
    $("#modalpreview_templateeresep").modal({backdrop: "static"});
    $('#modalpreview_templateeresep').on('shown.bs.modal', function () {
      var data = document.getElementById("templateresep_contentprev").value;
      $('#loading_modalpreview_templateeresep').show();
      if (data != ''){
        $('#loading_modalpreview_templateeresep').hide();
      }
      get_modalpreview_templateeresep();

      if (statusblock == ''){
        document.getElementById('selesaitemplateresep').style.display = 'block';
      }
    });
  });

function dismisspreview_templateresep(){
  $('#modalpreview_templateeresep').modal('hide');
  $('.modal-backdrop').hide();
}

function get_modalpreview_templateeresep(){
  $('#loading_modalpreview_templateeresep').show();
  var param = {
    idtemplate    : idtemplate, 
    tgltemplate   : tgltemplate,
    iddokter      : iddokter
  };

  apiPOST('Apotek/getData_templateresep', param, hasil => {
    if (hasil !== null) {
      $('#loading_modalpreview_templateeresep').hide();
      if (hasil['code'] == '200'){
        var data        = hasil['data'];
        var ObatJadi    = hasil['ObatJadi'];
        var GroupRacik  = hasil['GroupRacik'];
        var ObatRacik   = hasil['ObatRacik'];

        if (hasil['count'] > 1){

        }else{

          document.getElementById('dokterpembuat_templateresep').innerHTML = data[0].nama_pegawai;
          document.getElementById('userpembuat_templateresep').innerHTML   = data[0].nama_user;

          if (ObatJadi.length > 0){
            tabel_preview_single();
          }          
          for (var o = 0; o < ObatJadi.length; o++) {
            var no        = 1 + o; 
            var kd_prd    = ObatJadi[o].kd_prd;
            var nm_obat   = ObatJadi[o].nama_obat;
            var qty       = ObatJadi[o].jumlah;
            var id_signa  = ObatJadi[o].id_signa;
            var signa     = ObatJadi[o].signa;
            var ket       = ObatJadi[o].ket;
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

            $('#tabel_preview_single tbody').append(isi);
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
              
              var Nomor = $('#erm_eresepGabtable_obatracik_jenisracikan tbody tr').length + 1;
              var Baris = "<tr>";
                 Baris += "<td>"+Nomor+"</td>";
                 Baris += '<td style="display: flex; justify-content: left;"><button type="button" class="btn btn-xs btn-warning" title="Tampilkan '+ nama_racikan+'" onclick="tampilkan_jenisracik('+"'"+Nomor+"','"+nma_racikan+"','"+byk_racikan+"','"+sig_racikan+"','"+ket_racikan+"','"+x+"'"+')"><i class="fa fa-arrow-up"></i></button>&nbsp;<button type="button" class="btn btn-xs btn-danger" onclick="hapus_jenisracik(this, '+"'"+Nomor+"','"+nma_racikan+"','"+byk_racikan+"','"+sig_racikan+"','"+ket_racikan+"','"+nama_racikan+"'"+')"><i class="fa fa-times"></i></button></td>';
                 Baris += "<td hidden>"+Nomor+"</td>";
                 Baris += "<td>";
                 Baris += "<input type='text' class='form-control form-control-xs' name='ermIrja_nma_jenisracikan[]' value='" + nama_racikan +"' disabled>";
                 Baris += "</td>";
                 Baris += "<td hidden><input type='text' class='form-control form-control-xs' name='ermIrja_nma_byk_racikan[]' value='" + byk_racikan +"' disabled></td>";
                 Baris += "<td hidden><input type='text' class='form-control form-control-xs' name='ermIrja_nma_idsig_racikan[]' value='" + id_sig_rac +"' disabled></td>";
                 Baris += "<td hidden><input type='text' class='form-control form-control-xs' name='ermIrja_nma_sig_racikan[]' value='" + sig_racikan +"' disabled></td>";
                 Baris += "<td hidden><input type='text' class='form-control form-control-xs' name='ermIrja_nma_ket_racikan[]' value='" + ket_racikan +"' disabled></td>";
                 Baris += "</tr>";
              
              //$('#erm_eresepGabtable_obatracik_jenisracikan tbody').append(Baris);              
            }

            var group_racikan = groupracikan.filter(onlyUnique);
            //console.log(group_racikan);
            const group_racikandriOBAT = groupBy(ObatRacik, "jns_racikan");
            //console.log(group_racikandriOBAT);
            
            for (let a = 0; a < group_racikan.length; a++) {
              var nm_kelompok   = group_racikan[a];
              
              var judulracikan  = '';
              tabel_preview_racik(nm_kelompok);
              jmlh_rac = group_racikandriOBAT[nm_kelompok][0].qty_racik;          

              judulracikan += '<tr class="group">';
                judulracikan  += '<td align="left" colspan="2"><u><i><span>'+nm_kelompok+'</span></i></u></td>';
                judulracikan  += '<td align="left" colspan="3">Jumlah Racikan : '+jmlh_rac+'</td>';
              judulracikan += '</tr>';

              $('#tabel_preview_racik'+nm_kelompok+' tbody').append(judulracikan);

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
                $('#tabel_preview_racik'+nm_kelompok+' tbody').append(isi);

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
                $('#tabel_preview_racik'+nm_kelompok+' tbody').append(tambahan);
              }

            }
          }

        }
      
      }else{
        toastr.error("Belum Ada Template Resep!.");
      }
    }
  });
}

function tabel_preview_single(){  
  var tabel = ''; 
      tabel += '<table id="tabel_preview_single" class="table table-striped table-sm" >';
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

  $('#templateresep_contentprev').append(tabel);
}

function tabel_preview_racik(nm_kelompok){  
  var tabel = ''; 
      tabel += '<table id="tabel_preview_racik'+nm_kelompok+'" class="table table-striped table-sm" >';
      tabel += '<thead>';
        tabel += '<tr style="background-color: darkgreen; color:white;">';
          tabel += '<th width="5">#</th>';
          tabel += '<th width="280">Nama Obat</th>';
          tabel += '<th width="100" style="text-align: center;">Dosis Obat</th>';
          tabel += '<th width="120" style="text-align: center;">Permintaan</th>';
          tabel += '<th style="text-align: center;">Qty Obat yg dikeluarkan</th>';
        tabel += '</tr>';
      tabel += '</thead>';
      tabel += '<tbody>';    
      tabel += '</tbody>';
      tabel += '</table>';

  $('#templateresep_contentprev').append(tabel);
}

function selesaitemplateresep(){
  $('#loading_modalpreview_templateeresep').show();
  
  pertanyaan.fire({
    title: '<strong>Informasi <u>Template Resep</u></strong>',
    html: "Detail Obat sudah <b>BENAR</b>, Template Resep Siap di Gunakan",
    icon: 'question',
    showCancelButton: true,
    confirmButtonText: '<i class="fa fa-check"></i> SELESAI',
    cancelButtonText: '<i class="fa fa-times"></i> Batal!',
    reverseButtons: false,
    allowOutsideClick : false
  }).then((result) => {
    if (result.isConfirmed) {
      PostingTemplateResep();
    }else if(result.dismiss === Swal.DismissReason.cancel){
      $('#loading_modalpreview_templateeresep').hide();
    }
  });
}

var cek_data = false;

function PostingTemplateResep(){
  document.getElementById('loading_modalpreview_templateeresep').style.display = 'block';
  var param = {
    idtemplate    : idtemplate, 
    tgltemplate   : tgltemplate,
    iddokter      : iddokter
  };

  apiPOST('Apotek/PostingTemplateResep', param, hasil => {
    cek_data = true;
    loadingtemplate();
    if (hasil !== null) {
      dismisspreview_templateresep();
      keluarmodal_templateresep();
    }
  });
}

function loadingtemplate(){
  if(cek_data){
    document.getElementById('loading_modalpreview_templateeresep').style.display = 'none';
  }else{
    document.getElementById('loading_modalpreview_templateeresep').style.display = 'none';
  }
}

</script>