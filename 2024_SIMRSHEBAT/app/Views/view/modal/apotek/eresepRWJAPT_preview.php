<?php  
  $data               = json_decode($_GET['data']);
  $id_kunjprevRWJAPT  = str_replace('"','', json_encode($data->id_kunjprevRWJAPT));
  $tgl_kunjprevRWJAPT = str_replace('"','', json_encode($data->tgl_kunjprevRWJAPT));
  $tgl_respprevRWJAPT = str_replace('"','', json_encode($data->tgl_respprevRWJAPT));
  $no_rmprevRWJAPT    = str_replace('"','', json_encode($data->no_rmprevRWJAPT));
  $idunitprevRWJAPT   = str_replace('"','', json_encode($data->idunitprevRWJAPT));
  $noresepRWJAPT      = str_replace('"','', json_encode($data->noresepRWJAPT));
?>
<div class="modal fade" id="modalpreview_eresepRWJAPT" style="background-color: #000000b8;">
  <div class="modal-dialog modal-lg" > <!-- style="max-width: 714px;" -->
    <div class="modal-content">
      <div class="overlay-wrapper" id="loading_modalpreview_eresepRWJAPT">
        <div class="overlay dark">
          <i class="fas fa-3x fa-sync-alt fa-spin"></i>            
        </div>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-3">
            <img src="<?= base_url('_assets/dist/img/darmayu.png') ?>" style="opacity: .8" alt="Logo SIM-RS" width="80" height="80">
          </div>
          <div class="col-sm-6">
            <h4 class="mt-3" style="text-align: center; font-weight: 300"><u>Preview Obat Resep</u></h4>
          </div>
        </div>
        <hr class="p-0">
        <div id="eresepRWJAPT_preview"></div>
        
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-danger btn-xs" onclick="dismisspreview();"><i class="fa fa-reply"></i> Kembali (Esc)</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<script type="text/javascript">
  var id_kunjprevRWJAPT   = "<?php echo $id_kunjprevRWJAPT; ?>";
  var tgl_kunjprevRWJAPT  = "<?php echo $tgl_kunjprevRWJAPT; ?>";
  var tgl_respprevRWJAPT  = "<?php echo $tgl_respprevRWJAPT; ?>";  
  var no_rmprevRWJAPT     = "<?php echo $no_rmprevRWJAPT; ?>";
  var idunitprevRWJAPT    = "<?php echo $idunitprevRWJAPT; ?>";
  var noresepRWJAPT       = "<?php echo $noresepRWJAPT; ?>";

  $(document).ready(function() {
    $("#modalpreview_eresepRWJAPT").modal({backdrop: "static"});
    $('#modalpreview_eresepRWJAPT').on('shown.bs.modal', function () {
      var data = document.getElementById("eresepRWJAPT_preview").value;
      $('#loading_modalpreview_eresepRWJAPT').show();
      if (data != ''){
        $('#loading_modalpreview_eresepRWJAPT').hide();
      }
      if (idunitprevRWJAPT == ''){
        toastr.error("Simpan Resep Dahulu, Kemudian Refresh Data!");
      }else{
        get_modalpreview_eresepRWJAPT();
      }
    });
  });

function dismisspreview(){
  $('#modalpreview_eresepRWJAPT').modal('hide');
  $('.modal-backdrop').hide();
}

function get_modalpreview_eresepRWJAPT(){
  $('#loading_modalpreview_eresepRWJAPT').show();
  var param = {
    iduser      : user['id_user'],
    noresep     : noresepRWJAPT, 
    id_kunj     : id_kunjprevRWJAPT,
    id_unit     : idunitprevRWJAPT,
    norm        : no_rmprevRWJAPT,
    tgl_kunj    : tgl_kunjprevRWJAPT,
    tgl_resep   : tgl_respprevRWJAPT,
    vi          : 'eresepRWJAPT_preview',
    id_transaksi : id_trans
  };

  // apiPOST('Apotek/getData_EresepRWJAPT', param, hasil => {
  apiPOST('Apotek/lookup_detailobatRJRIIGD', param, hasil => {
    if (hasil !== null) {
      $('#loading_modalpreview_eresepRWJAPT').hide();
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
                isi  += '<td align="right">'+harga_satuan+'</td>';
              }else{
                isi  += '<td align="right" style="color:red;">null</td>';
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
            isix += '<td align="right" style="font-weight:bold; background-color: #abdaa8; color: black;">Rp. '+numberformat(grandTotal)+'</td>';
          isix += '</tr>';
          $('#tabel_preview_single tbody').append(isix);

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
              
              /*var Nomor = $('#erm_eresepRWJtable_obatracik_jenisracikan tbody tr').length + 1;
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
                 Baris += "</tr>";*/
              
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
                      isi  += '<td align="right">'+harga_satuan+'</td>';
                    }else{
                      isi  += '<td align="right" style="color:red;">null</td>';
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
                  tambahan += '<td align="Left" colspan="5">Catatan : <strong>'+catatan+'</strong></td>';
                  tambahan += '<td align="right" style="font-weight:bold;">Total : </td>';
                  tambahan += '<td align="right" style="font-weight:bold; background-color: #abdaa8; color: black;">Rp. '+numberformat(grandTotalRacik)+'</td>';
                tambahan += '</tr>';

                $('#tabel_preview_racik'+nm_kelompok+' tbody').append(tambahan);
              }

            }
            
          }

          tabel_all();
          var cv = '';
          cv += '<tr style="background-color: #abdaa8; color: black;">';
            cv += '<td align="right"><h6>Sub Total : Rp. </h6></td>';
            // cv += '<td align="right" width="100"><h6>'+numberformat(Math.ceil(data[0].gatot))+'</h6></td>';
            cv += '<td align="right" width="100"><h6>'+numberformat(data[0].gatot)+'</h6></td>';
          cv += '</tr>';

          cv += '<tr style="background-color: #abdaa8; color: black;">';
            cv += '<td align="right"><h6>Ppn : Rp. </h6></td>';
            //cv += '<td align="right" width="100"><h6>'+numberformat(Math.ceil(data[0].ppn))+'</h6></td>';
            cv += '<td align="right" width="100"><h6>'+numberformat(data[0].ppn)+'</h6></td>';
          cv += '</tr>';

          cv += '<tr style="background-color: #abdaa8; color: black;">';
            cv += '<td align="right"><h6>Grand Total : Rp. </h6></td>';
            // cv += '<td align="right" width="100"><h6>'+numberformat(Math.ceil(data[0].grandtotal))+'</h6></td>';
            cv += '<td align="right" width="100"><h6>'+numberformat(data[0].grandtotal)+'</h6></td>';
          cv += '</tr>';

          $('#tabel_all tbody').append(cv);
        }
      
      }else{
        toastr.error("Belum Ada Order Resep Hari Ini.");
      }
    }
  }).then(function(){
    $('#loading_modalpreview_eresepRWJAPT').hide();
    //toastr.error("Order Resep Sudah Terlayani!!");
  });
}

function tabel_preview_single(){  
  var tabel = ''; 
      tabel += '<table id="tabel_preview_single" class="table table-striped table-sm table-bordered" >';
      tabel += '<thead>';
        tabel += '<tr style="background-color: #abdaa8; color:black;">';
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

  $('#eresepRWJAPT_preview').append(tabel);
}

function tabel_preview_racik(nm_kelompok){  
  var tabel = ''; 
      tabel += '<table id="tabel_preview_racik'+nm_kelompok+'" class="table table-striped table-sm table-bordered" >';
      tabel += '<thead>';
        tabel += '<tr style="background-color: #abdaa8; color:black;">';
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

  $('#eresepRWJAPT_preview').append(tabel);
}

function tabel_all(){  
  var tabel = ''; 
      tabel += '<table id="tabel_all" class="table table-sm table-striped" >';
      tabel += '<thead>';
      tabel += '</thead>';
      tabel += '<tbody>';    
      tabel += '</tbody>';
      tabel += '</table>';

  $('#eresepRWJAPT_preview').append(tabel);
}
function nextposting(){
  $('#loading_modalpreview_eresepRWJAPT').show();
  
  pertanyaan.fire({
    title: '<strong>Informasi <u>Posting Obat</u></strong>',
    html: "Resep sudah <b>BENAR</b>, Resep siap dilayani Unit Farmasi",
    icon: 'question',
    showCancelButton: true,
    confirmButtonText: '<i class="fa fa-check"></i> SELESAI',
    cancelButtonText: '<i class="fa fa-times"></i> Batal!',
    reverseButtons: false,
    allowOutsideClick : false
  }).then((result) => {
    if (result.isConfirmed) {
      PostingOrderResepRJ();
    }else if(result.dismiss === Swal.DismissReason.cancel){
      $('#loading_modalpreview_eresepRWJAPT').hide();
    }
  });
}

function PostingOrderResepRJ(){
  var param = {
    idresep   : idresepprevRWJ, 
    id_kunj   : id_kunjprevRWJ,
    tgl_kunj  : tgl_kunjprevRWJ,
    tglorder  : tgl_ordprevRWJ,
  };

  apiPOST('Apotek/PostingOrderResepRJ', param, hasil => {
    if (hasil !== null) {
      $('#loading_modalpreview_eresepRWJAPT').hide();
      dismisspreview();
      keluarmodal_erm_eresepRWJ();
    }
  });
}

</script>