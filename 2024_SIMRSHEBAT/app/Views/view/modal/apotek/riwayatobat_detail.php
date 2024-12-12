<?php
  $data     = json_decode($_GET['data']);
  $nowday   = date('Y-m-d');
  $id_kunj  = str_replace('"','', json_encode($data->vriwayatobat_id_kunj));
  $tgl_kunj = str_replace('"','', json_encode($data->vriwayatobat_tgl_masuk));
  $no_rm    = str_replace('"','', json_encode($data->vriwayatobat_no_rm));
  $idunit   = str_replace('"','', json_encode($data->vriwayatobat_id_unit));
  $noresep  = str_replace('"','', json_encode($data->vriwayatobat_noresep));
  $tglresep = str_replace('"','', json_encode($data->vriwayatobat_tglresep));
  $id_trans = str_replace('"','', json_encode($data->vriwayatobat_id_trans));

?>

<div class="modal fade" id="modal_riwayatobat_detail" style="background-color: #000000b8;">
  <div class="modal-dialog modal-lg" > <!-- style="max-width: 714px;" -->
    <div class="modal-content">
      <div class="overlay-wrapper" id="loading_modal_riwayatobat_detail">
        <div class="overlay dark">
          <i class="fas fa-3x fa-sync-alt fa-spin"></i>            
        </div>
      </div>
      <div class="modal-body">
        <div class="col-sm-6" style="position:absolute;">
          <img src="<?= base_url('_assets/dist/img/darmayu.png') ?>" style="opacity: .8" alt="Logo SIM-RS" width="50" height="50">
        </div>
        <h5 class="mt-3" style="text-align: center; font-weight: 300"><u>Detail Obat Resep</u></h5>
        <hr>
        <div id="riwayatobat_detail_prev"></div>
        
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-danger btn-xs" onclick="dismisspreview_riwayatobat_detail();"><i class="fa fa-reply"></i> Kembali (Esc)</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<script type="text/javascript">
  var id_kunj   = "<?php echo $id_kunj; ?>";
  var tgl_kunj  = "<?php echo $tgl_kunj ?>";
  var tglresep  = "<?php echo $tglresep; ?>";  
  var no_rm     = "<?php echo $no_rm; ?>";
  var idunit    = "<?php echo $idunit; ?>";
  var noresep   = "<?php echo $noresep; ?>";
  var id_trans  = "<?php echo $id_trans; ?>";

  $(document).ready(function() {
    $("#modal_riwayatobat_detail").modal({backdrop: "static"});
    $('#modal_riwayatobat_detail').on('shown.bs.modal', function () {
      var data = document.getElementById("riwayatobat_detail_prev").value;
      $('#loading_modal_riwayatobat_detail').show();
      if (data != ''){
        $('#loading_modal_riwayatobat_detail').hide();
      }
      get_modal_riwayatobat_detail();
      
    });
  });

function dismisspreview_riwayatobat_detail(){
  $('#modal_riwayatobat_detail').modal('hide');
  $('.modal-backdrop').hide();
}

function get_modal_riwayatobat_detail(){
  $('#loading_modal_riwayatobat_detail').show();
  var param = {
    iduser      : user['id_user'],
    noresep     : noresep, 
    id_kunj     : id_kunj,
    id_unit     : idunit,
    norm        : no_rm,
    tgl_kunj    : tgl_kunj,
    tgl_resep   : tglresep,
    vi          : 'riwayatobat_detail_prev',
    id_transaksi: id_trans
  };

  apiPOST('Apotek/getData_EresepRWJAPT', param, hasil => {
    if (hasil !== null) {
      $('#loading_modal_riwayatobat_detail').hide();
      if (hasil['code'] == '200'){
        var data        = hasil['data'];
        var ObatJadi    = hasil['ObatJadi'];
        var GroupRacik  = hasil['GroupRacik'];
        var ObatRacik   = hasil['ObatRacik'];
        let totalsemua = 0;

        if (hasil['count'] > 1){

        }else{

          if (ObatJadi.length > 0){
            tabel_preview_single();
          }
          let grandTotal  = 0;
          for (var o = 0; o < ObatJadi.length; o++) {
            var no        = 1 + o; 
            var kd_prd    = ObatJadi[o].kd_prd;
            var nm_obat   = ObatJadi[o].nama_obat;
            var qty       = ObatJadi[o].jumlah;
            var id_signa  = ObatJadi[o].id_signa;
            var signa     = ObatJadi[o].signa;
            var ket       = ObatJadi[o].ket;
            var harga_beli  = ObatJadi[o].harga_beli;
            //let total_harga = ObatJadi[o].total_harga;
            var pembulatan    = Math.floor(ObatJadi[o].harga_jual);
            var harga_satuan  = numberformat(pembulatan);
            let total_harga   = numberformat(qty * pembulatan);
            let total_hargax  = (qty * pembulatan);
            grandTotal += Number(total_hargax);
            var persediaan = 0;

            var isi = '';
                isi += '<tr style="font-weight:400;">';
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
                isi  += '<td align="center"  style="font-weight:bold; font-size: 11px;">'+signa+'</td>'; 
              }else{
                isi  += '<td align="center">Tidak di ketahui</td>'; 
              }

              if (harga_satuan != ''){
                isi  += '<td align="center">'+harga_satuan+'</td>';
              }else{
                isi  += '<td align="center" style="color:red;">null</td>';
              }

              if (total_harga != ''){
                isi  += '<td align="right">'+total_harga+'</td>';
              }else{
                isi  += '<td align="center" style="color:red;">null</td>';
              }

                isi += '</tr>';
              if (ket != ''){
                isi += '<tr>';
                isi += '<td align="left" colspan="7">Catatan : '+ket+'</td>';
                // isi += '<td align="right" style="font-weight:bold;">Total : </td>';
                // isi += '<td align="right" style="font-weight:bold;">Rp. '+numberformat(grandTotal)+'</td>';
                isi += '</tr>';
              }

            $('#tabel_preview_single tbody').append(isi);
          }

          var isix = '';
          isix += '<tr>';
            isix += '<td align="right" colspan="6" style="font-weight:bold;">Total : </td>';
            isix += '<td align="right" style="font-weight:bold; background-color: darkgreen; color: white;">Rp. '+numberformat(grandTotal)+'</td>';
          isix += '</tr>';
          //$('#tabel_preview_single tbody').append(isix);

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
              
              var Nomor = $('#erm_eresepRWJtable_obatracik_jenisracikan tbody tr').length + 1;
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
              
              //$('#erm_eresepRWJtable_obatracik_jenisracikan tbody').append(Baris);              
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
                judulracikan  += '<td align="left" colspan="5">Jumlah Racikan : '+jmlh_rac+'</td>';
              judulracikan += '</tr>';

              $('#tabel_preview_racik'+nm_kelompok+' tbody').append(judulracikan);
              let grandTotalRacik = 0;
              const params    = []; 
              for (let i = 0; i < group_racikandriOBAT[nm_kelompok].length; i++) {
                var no        = 1 + i; 
                var kd_prd    = group_racikandriOBAT[nm_kelompok][i].kd_prd;
                var nm_obat   = group_racikandriOBAT[nm_kelompok][i].nama_obat;
                var dosis     = group_racikandriOBAT[nm_kelompok][i].dosis;
                var qty       = group_racikandriOBAT[nm_kelompok][i].jumlah;
                var ket       = group_racikandriOBAT[nm_kelompok][i].ket;
                var jns_racik = group_racikandriOBAT[nm_kelompok][i].jns_racikan;
                var harga_beli  = group_racikandriOBAT[nm_kelompok][i].harga_beli;
                //let total_harga = group_racikandriOBAT[nm_kelompok][i].total_harga;
                var pembulatan    = Math.floor(group_racikandriOBAT[nm_kelompok][i].harga_jual);
                var harga_satuan  = numberformat(pembulatan);
                let total_harga   = numberformat(qty * pembulatan);
                let total_hargax   = (qty * pembulatan);
                grandTotalRacik += Number(total_hargax);

                var persediaan = 0;

                var isi = '';
                    isi += '<tr style="font-weight:400;">';
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
                    if (harga_satuan != ''){
                      isi  += '<td align="center">'+harga_satuan+'</td>';
                    }else{
                      isi  += '<td align="center" style="color:red;">null</td>';
                    }
                    if (total_harga != ''){
                      isi  += '<td align="right">'+total_harga+'</td>';
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
                  tambahan += '<td align="Left" colspan="7">Signa : <strong>'+signa+'</strong></td>';
                tambahan += '</tr>';

                tambahan += '<tr>';
                  tambahan += '<td align="Left" colspan="7">Catatan : <strong>'+catatan+'</strong></td>';
                  /*tambahan += '<td align="right" style="font-weight:bold;">Total : </td>';
                  tambahan += '<td align="right" style="font-weight:bold; background-color: darkgreen; color: white;">Rp. '+numberformat(grandTotalRacik)+'</td>';*/
                tambahan += '</tr>';

                $('#tabel_preview_racik'+nm_kelompok+' tbody').append(tambahan);
              }

            }
            
          }

          tabel_all();
          var cv = '';
          cv += '<tr style="background-color: darkgreen; color: white;">';
            cv += '<td align="right"><h6>Grand Total : </h6></td>';
            cv += '<td align="right" width="100"><h6>Rp. '+numberformat(data[0].gatot)+'</h6></td>';
          cv += '</tr>';

          //$('#tabel_all tbody').append(cv);
        }
      
      }else{
        toastr.error("Belum Ada Order Resep Hari Ini.");
      }
    }
  }).then(function(){
    $('#loading_modal_riwayatobat_detail').hide();
    //toastr.error("Order Resep Sudah Terlayani!!");
  });
}

function tabel_preview_single(){  
  var tabel = ''; 
      tabel += '<table id="tabel_preview_single" class="table table-striped table-sm table-bordered" >';
      tabel += '<thead>';
        tabel += '<tr style="background-color: darkgreen; color:white;">';
          tabel += '<th width="5">#</th>';
          tabel += '<th width="230">Nama Obat</th>';
          tabel += '<th width="70" style="text-align: center;">Dosis Obat</th>';
          tabel += '<th width="80" style="text-align: center;">Jumlah Obat</th>';
          tabel += '<th style="text-align: center;">Signa</th>';
          tabel += '<th width="80" style="text-align: center;">Harga Satuan</th>';
          tabel += '<th width="100" style="text-align: center;">Total Harga</th>';
        tabel += '</tr>';
      tabel += '</thead>';
      tabel += '<tbody>';    
      tabel += '</tbody>';
      tabel += '</table>';

  $('#riwayatobat_detail_prev').append(tabel);
}

function tabel_preview_racik(nm_kelompok){  
  var tabel = ''; 
      tabel += '<table id="tabel_preview_racik'+nm_kelompok+'" class="table table-striped table-sm table-bordered" >';
      tabel += '<thead>';
        tabel += '<tr style="background-color: darkgreen; color:white;">';
          tabel += '<th width="5">#</th>';
          tabel += '<th width="230">Nama Obat</th>';
          tabel += '<th width="70" style="text-align: center;">Dosis Obat</th>';
          tabel += '<th width="80" style="text-align: center;">Permintaan</th>';
          tabel += '<th style="text-align: center;">Jumlah Obat</th>';
          tabel += '<th width="80" style="text-align: center;">Harga Satuan</th>';
          tabel += '<th width="100" style="text-align: center;">Total Harga</th>';
        tabel += '</tr>';
      tabel += '</thead>';
      tabel += '<tbody>';    
      tabel += '</tbody>';
      tabel += '</table>';

  $('#riwayatobat_detail_prev').append(tabel);
}

function tabel_all(){  
  var tabel = ''; 
      tabel += '<table id="tabel_all" class="table table-sm table-striped" >';
      tabel += '<thead>';
      tabel += '</thead>';
      tabel += '<tbody>';    
      tabel += '</tbody>';
      tabel += '</table>';

  $('#riwayatobat_detail_prev').append(tabel);
}

</script>