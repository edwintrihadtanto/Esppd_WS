<?php  
 
  $data             = json_decode($_GET['data']);
  $no_rmprevRWJ     = str_replace('"','', json_encode($data->no_rmprevRWJ));
  $namaprevRWJ      = str_replace('"','', json_encode($data->namaprevRWJ));
  $umurprevRWJ      = str_replace('"','', json_encode($data->umurprevRWJ));
  $alamatprevRWJ    = str_replace('"','', json_encode($data->alamatprevRWJ));
  $id_kunjprevRWJ   = str_replace('"','', json_encode($data->id_kunjprevRWJ));
  $tgl_kunjprevRWJ  = str_replace('"','', json_encode($data->tgl_kunjprevRWJ));
  $tgl_ordprevRWJ   = str_replace('"','', json_encode($data->tgl_ordprevRWJ));
  $nowdayprevRWJ    = str_replace('"','', json_encode($data->nowdayprevRWJ));
  $unitprevRWJ      = str_replace('"','', json_encode($data->unitprevRWJ));
  $idresepprevRWJ   = str_replace('"','', json_encode($data->idresepRWJ));
  $jnsresep         = str_replace('"','', json_encode($data->jnsresep));
  $idjnsresep       = str_replace('"','', json_encode($data->idjnsresep));
  $alamatprevRWJ2   = str_replace('\/','/', $alamatprevRWJ);
?>
<div class="modal fade" id="modalpreview_eresepGab" style="background-color: #000000b8;">
  <div class="modal-dialog modal-lg" > <!-- style="max-width: 714px;" -->
    <div class="modal-content">
      <div class="overlay-wrapper" id="loading_modalpreview_eresepGab">
        <div class="overlay dark">
          <i class="fas fa-3x fa-sync-alt fa-spin"></i>            
        </div>
      </div>
      <div class="modal-body">
        <div class="col-sm-6" style="position:absolute;">
          <img src="<?= base_url('_assets/dist/img/darmayu.png') ?>" style="opacity: .8" alt="Logo SIM-RS" width="50" height="50">
        </div>
        <h5 class="mt-3" style="text-align: center; font-weight: 300"><u>Preview Order Resep</u></h5>
        <hr>
        <table border="0" cellpadding='0' width="100%">
        <tr>
          <td style="width: 60%;vertical-align: baseline;">
            <div class="row">
              <div class="col-sm-3"><span>Id.Resep</span></div>
              <div class="col-sm-auto"><span>:</span></div>
              <div class="col-sm-8"><label><?php echo $idresepprevRWJ; ?></label></div>
            </div>
            <div class="row">
              <div class="col-sm-3"><span>No.RM/Tgl.Lhir</span></div>
              <div class="col-sm-auto"><span>:</span></div>
              <div class="col-sm-8"><label><?php echo $no_rmprevRWJ." / ".$umurprevRWJ ?></label></div>
            </div>
            <div class="row">
              <div class="col-sm-3"><span>Nama Pasien</span></div>
              <div class="col-sm-auto"><span>:</span></div>
              <div class="col-sm-8"><label><?php echo $namaprevRWJ; ?></label></div>
            </div>
            <div class="row">
              <div class="col-sm-3"><span>Alamat</span></div>
              <div class="col-sm-auto"><span>:</span></div>
              <div class="col-sm-8"><label><?php echo $alamatprevRWJ; ?></label></div>
            </div>
            <div class="row">
              <div class="col-sm-3"><span>Poliklinik</span></div>
              <div class="col-sm-auto"><span>:</span></div>
              <div class="col-sm-8"><label><?php echo $unitprevRWJ; ?></label></div>
            </div>
            <div class="row">
              <div class="col-sm-3"><span>Jenis Resep</span></div>
              <div class="col-sm-auto"><span>:</span></div>
              <div class="col-sm-8"><label><?php echo $jnsresep; ?></label></div>
            </div>
          </td>
          <td style="vertical-align: baseline;">            
            <div align="center">
              <div>Dokter Pemberi Resep</div>
              <br>
              <span>ttd</span>
              <br>
              <br>
              <strong><u><h6 id="erm_eresepGab_dokter_pemberi_orderresep"></h6></strong>
            </div>
          </td>
        </tr>
        </table>
        <hr>
        <div id="erm_eresepGab_preview"><?php //echo $isi ?></div>
        
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-danger btn-xs" onclick="dismisspreview();"><i class="fa fa-reply"></i> Kembali (Esc)</button>
        <button type="button" class="btn btn-primary btn-xs" onclick="nextposting();"><i class="fa fa-share"></i> Selesai</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<script type="text/javascript">
  // document.getElementById('erm_eresepGab_dokter_pemberi_orderresep').innerHTML   = user.nama_pegawai;
  var id_kunjprevRWJ  = "<?php echo $id_kunjprevRWJ; ?>";
  var idresepprevRWJ  = "<?php echo $idresepprevRWJ; ?>";
  var no_rmprevRWJ    = "<?php echo $no_rmprevRWJ; ?>";  
  var tgl_ordprevRWJ  = "<?php echo $tgl_ordprevRWJ; ?>";
  var tgl_kunjprevRWJ = "<?php echo $tgl_kunjprevRWJ; ?>";
  var idjnsresep      = "<?php echo $idjnsresep; ?>";

  $(document).ready(function() {
    $("#modalpreview_eresepGab").modal({backdrop: "static"});
    $('#modalpreview_eresepGab').on('shown.bs.modal', function () {
      var data = document.getElementById("erm_eresepGab_preview").value;
      $('#loading_modalpreview_eresepGab').show();
      if (data != ''){
        $('#loading_modalpreview_eresepGab').hide();
      }
      get_modalpreview_eresepGab();
      //get_no_urut();
      //$('#erm_eresepGab_preview').html('');
      //tablepreviewobat();    
      //get_previewdetail_obat(idmrresep, medrek)
    });
  });

function dismisspreview(){
  $('#modalpreview_eresepGab').modal('hide');
  $('.modal-backdrop').hide();
}

function get_modalpreview_eresepGab(){
  $('#loading_modalpreview_eresepGab').show();
  var param = {
    idresep   : idresepprevRWJ, 
    id_kunj   : id_kunjprevRWJ,
    tgl_kunj  : tgl_kunjprevRWJ,
    tglorder  : tgl_ordprevRWJ,
  };

  apiPOST('Apotek/getData_erm_eresepGab', param, hasil => {
    if (hasil !== null) {
      $('#loading_modalpreview_eresepGab').hide();
      if (hasil['code'] == '200'){
        var data        = hasil['data'];
        var ObatJadi    = hasil['ObatJadi'];
        var GroupRacik  = hasil['GroupRacik'];
        var ObatRacik   = hasil['ObatRacik'];

        for (var d = 0; d < data.length; d++) {
          document.getElementById('erm_eresepGab_dokter_pemberi_orderresep').innerHTML = data[d].nama_pegawai;
        }

        if (hasil['count'] > 1){

        }else{

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
        toastr.error("Belum Ada Order Resep Hari Ini.");
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

  $('#erm_eresepGab_preview').append(tabel);
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

  $('#erm_eresepGab_preview').append(tabel);
}

function nextposting(){
  $('#loading_modalpreview_eresepGab').show();
  
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
      $('#loading_modalpreview_eresepGab').hide();
    }
  });
}

var cek_data = false;

function PostingOrderResepRJ(){
  document.getElementById('loading_modalpreview_eresepGab').style.display = 'block';
  var param = {
    idresep   : idresepprevRWJ, 
    id_kunj   : id_kunjprevRWJ,
    tgl_kunj  : tgl_kunjprevRWJ,
    tglorder  : tgl_ordprevRWJ,
    jnsresep  : idjnsresep
  };

  apiPOST('Apotek/PostingOrderResepRJ', param, hasil => {
    cek_data = true;
    erm_eresepGab_loading();
    if (hasil !== null) {
      dismisspreview();
      keluarmodal_erm_eresepGab();
    }
  }).then(function(){
    //erm_eresepGab_loading();
  });
}

function erm_eresepGab_loading(){
  if(cek_data){
    document.getElementById('loading_modalpreview_eresepGab').style.display = 'none';
  }else{
    document.getElementById('loading_modalpreview_eresepGab').style.display = 'none';
  }
}

</script>