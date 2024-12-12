<?php  
  $data     = json_decode($_GET['data']);
  $norm     = str_replace('"','', json_encode($data->vreturresepRJIGDRI_norm));
  $nmpas    = str_replace('"','', json_encode($data->vreturresepRJIGDRI_nmpasien));
  $tglkunj  = str_replace('"','', json_encode($data->vreturresepRJIGDRI_tglkunj));
  $nm_function_ret = str_replace('"','', json_encode($data->vreturresepRJIGDRI_nmfunct));
?>
<div class="modal fade" id="searchPasienFar">
  <div class="modal-dialog modal-lg" > <!-- style="max-width: 714px;" -->
    <div class="modal-content">
      <div class="overlay-wrapper" id="loading_searchPasienFar">
        <div class="overlay dark">
          <i class="fas fa-3x fa-sync-alt fa-spin"></i>            
        </div>
      </div>
      <div class="modal-body p-1">
        <h6 id="nm_function_ret" style="display: none;"><?php echo $nm_function_ret; ?></h6>
        <div id="detail_isi"></div>
      </div>
      <div class="modal-footer justify-content-between p-1">
        <button type="button" class="btn btn-outline-danger btn-xs" onclick="searchPasienFar_close();"><i class="fa fa-reply"></i> Kembali</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<script type="text/javascript">
var norm    = "<?php echo $norm; ?>";
var nmpas   = "<?php echo $nmpas; ?>";
var tglkunj = "<?php echo $tglkunj; ?>";
var nmfunct = $("#nm_function_ret").html();

$(document).ready(function() {
  $("#searchPasienFar").modal({backdrop: "static"});
  $('#searchPasienFar').on('shown.bs.modal', function () {
    getdataPasien();
  });
});

function getdataPasien(){  
  document.getElementById("loading_searchPasienFar").style.display = "block";
  var listParam = [
    'norm', 'tglkunj'
  ];

  var param = {
    norm      : norm,
    nmpas     : nmpas,
    tglkunj   : tglkunj,
    idfar     : user['id_far']
  };

  if ((norm == '')&&(nmpas == '')){
    toastr.warning('No.RM / Nm.Pasien Masih Kosong.');
    searchPasienFar_close();
  }else{
    apiPOST("Apotek/getKunjunganPasienRJRIIGD", param, hasil => {      
      if (hasil !== null) {
        if (hasil['code'] == '200'){
          var Data        = hasil['data'];
          
          if (Data.length > 0){
            datanya();
          }

          for (var i = 0; i < Data.length; i++) {
            var no            = 1 + i; 
            var no_rm         = Data[i].no_rm;
            var nama          = Data[i].nama;
            var jam_masuk     = Data[i].jam_masuk;
            var id_unit       = Data[i].id_unit;
            var nama_unit     = Data[i].nama_unit;
            var id_dokter     = Data[i].id_pegawai;
            var dokter        = Data[i].nama_pegawai;
            var umur          = Data[i].tgl_lahir;
            var no_sjp        = Data[i].no_sjp;
            var telepon       = Data[i].telepon;
            var penjamin      = Data[i].nama_penjamin;
            var tgl_trans     = Data[i].tgl_transaksi;
            var id_transaksi  = Data[i].id_transaksi;
            var idpenjamin    = Data[i].id_penjamin;
            var isi = '';
                isi += '<tr onclick="'+nmfunct+'('+"'"+no_rm+"','"+nama+"','"+id_unit+"','"+nama_unit+"','"+id_dokter+"','"+dokter+"','"+umur+"','"+no_sjp+"','"+telepon+"','"+penjamin+"','"+tgl_trans+"','"+id_transaksi+"','"+idpenjamin+"'"+')">';
                isi  += '<td>'+no+'</td>';
                isi  += '<td>'+no_rm+'</td>';
                isi  += '<td>'+nama+'</td>';
                isi  += '<td>'+jam_masuk.substring(0, 16)+'</td>';
                isi  += '<td>'+nama_unit+'</td>';
                isi  += '<td>'+dokter+'</td>';
                isi += '</tr>';
            $('#tabel_pencarianpasien tbody').append(isi);
          }

          document.getElementById("loading_searchPasienFar").style.display = "none";
        }else if (hasil['code'] == '100'){
          document.getElementById("loading_searchPasienFar").style.display = "none";
          searchPasienFar_close();
          toastr.error("Data Pasien Tidak ditemukan / Sudah Tutup Transaksi!!");
        }
        
      }else{
        
        document.getElementById("loading_searchPasienFar").style.display = "none";
        searchPasienFar_close();
      }
    });
  }
}

function datanya(){
  var tabel = ''; 
      tabel += '<table id="tabel_pencarianpasien" class="table table-md table-bordered choose" >';
      tabel += '<thead>';
        tabel += '<tr>';
          tabel += '<th width="10">#</th>';
          tabel += '<th width="70">No.RM</th>';
          tabel += '<th>Nm.Pasien</th>';
          tabel += '<th width="150">Tgl.Kunjung</th>';
          tabel += '<th width="100">Unit</th>';
          tabel += '<th width="250">Dokter</th>';
        tabel += '</tr>';
      tabel += '</thead>';
      tabel += '<tbody>';    
      tabel += '</tbody>';
      tabel += '</table>';

  $('#detail_isi').append(tabel);
}

function searchPasienFar_close(){
  $('#searchPasienFar').modal('hide');
  $('.modal-backdrop').hide();
}

//DIDAPAT DRI PENCARIAN PASIEN
function returresepRJIGD(no_rm, nama, id_unit, nama_unit, id_dokter, dokter, umur, no_sjp, telepon, penjamin, tgl_trans, id_transaksi, idpenjamin){
  searchPasienFar_close();
  view_returresepRJIGD(no_rm, nama, id_unit, nama_unit, id_dokter, dokter, umur, no_sjp, telepon, penjamin, tgl_trans, id_transaksi, idpenjamin)
}

function returresepRI(no_rm, nama, id_unit, nama_unit, id_dokter, dokter, umur, no_sjp, telepon, penjamin, tgl_trans, id_transaksi, idpenjamin){
  searchPasienFar_close();
  view_returresepRI(no_rm, nama, id_unit, nama_unit, id_dokter, dokter, umur, no_sjp, telepon, penjamin, tgl_trans, id_transaksi, idpenjamin)
}
</script>