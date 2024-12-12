<?php
  $data = json_decode($_GET['data']);
  $eresepRWJ  = str_replace('"','', json_encode($data->eresepRWJ));
  $tabObat    = str_replace('"','', json_encode($data->tabObat));
  $penjaminpas= str_replace('"','', json_encode($data->penjaminpas));
  $id_unit    = str_replace('"','', json_encode($data->id_unit));
?>
<div class="content modal fade" id="modal_RWJresep_daftarobat">
  <div class="container-fluid ">
    <div class="modal-dialog modal-lg">
      <div class="overlay-wrapper" id="modal_RWJresep_loading">
        <div class="overlay">
          <i class="fas fa-3x fa-sync-alt fa-spin"></i>
        </div>
      </div>
      <h6 id="nm_function" style="display: none;"><?php echo $eresepRWJ; ?></h6>
      <div class="modal-content" style="overflow: auto;">
        <div class="modal-body p-1">
          <div class="row">
            <div class="col-sm-11 input-group">
              <input type="search" class="form-control form-control-xs" id="eresepRWJDokter_pencarianobat" placeholder="Pencarian Obat" autocomplete="off">
            </div>
            <div class="col-sm-1">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
          </div>
          <div class="p-1">
            <table id="resepRWJ_table_daftarobat" class="table table-striped table-sm choose">
              <thead>
                <tr>
                  <th width="10">#</th>
                  <th width="50">Kd.Obat</th>
                  <th>Nama Obat</th>
                  <th width="80" style="text-align: center;">Harga Satuan</th>
                  <th width="50">Stok</th>
                  <th width="60" style="text-align: center;" title="Harga Satuan x Margin">Harga Jual</th>
                  <th width="70" style="text-align: center;">Kep.Obat</th>
                </tr>
              </thead>
              <tbody id="resepRWJ_table_listdaftarobat"></tbody>            
            </table>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>

<script type="text/javascript">
var tabAktif = "<?php echo $tabObat; ?>";
var penjaminpas = "<?php echo $penjaminpas; ?>";
var idunit = "<?php echo $id_unit; ?>";
var nm = $("#nm_function").html();


$("#modal_RWJresep_daftarobat").modal({backdrop: "static"});
$('#modal_RWJresep_daftarobat').on('shown.bs.modal', function () {
  $('#eresepRWJDokter_pencarianobat').focus();
})  
var searchnmobat = '';
show(searchnmobat);
var tabel_obatpencarian = $('#resepRWJ_table_daftarobat').dataTable({
                "paging"        : true,
                "lengthChange"  : true,
                "searching"     : false,
                "ordering"      : false,
                "info"          : false,
                "autoWidth"     : false,
                "processing"    : true,
                //"serverSide"    : true,
                "responsive"    : true,
                "retrieve"      : true,
              });

function refresh() {
  tabel_obatpencarian = $('#resepRWJ_table_daftarobat').dataTable();  
}
 // $('#tabletindakan_modal_RWJresep_daftarobat tbody tr').each(function() {
 //   $(this).find('td:nth-child(2) input').focus();
 // });
document.getElementById("eresepRWJDokter_pencarianobat").onkeyup = function(event){
  searching_obat(event)
};

function searching_obat(event) {
  if ((event.keyCode == 13)||(event.keyCode == 37)||(event.keyCode == 39)||(event.keyCode == 38)||(event.keyCode == 40)){
    event.preventDefault();
  }else if ((event.keyCode >= 65)&&(event.keyCode <= 90)){
    $('#modal_RWJresep_loading').show();
    searchnmobat = document.getElementById("eresepRWJDokter_pencarianobat").value;    
    if (searchnmobat == ''){
      $('#modal_RWJresep_loading').hide();
      $('#resepRWJ_table_listdaftarobat').html('');
      $('#resepRWJ_table_listdaftarobat').append("<tr><td colspan ='7' align='center'>Data Tidak Ditemukan ...</td></tr>");
      $('#eresepRWJDokter_pencarianobat').focus();
    }else if (searchnmobat.length == 0) {
      $('#resepRWJ_table_listdaftarobat').html('');      
      show(searchnmobat);      
    }else if (searchnmobat.length >= 1) {
      $('#resepRWJ_table_listdaftarobat').html('');      
      show(searchnmobat);
    }else{
      $('#modal_RWJresep_loading').hide();
      $('#resepRWJ_table_listdaftarobat').html('');
      $('#resepRWJ_table_listdaftarobat').append("<tr><td colspan ='7' align='center'>Data Tidak Ditemukan ...</td></tr>");
    }
  }
  
}

function show(searchnmobat){
  $('#modal_RWJresep_loading').show();
  var listParam = [
    'eresepRWJDokter_pencarianobat'
  ];

  if (penjaminpas == ''){
    toastr.error("Penjamin Pasien Belum di Pilih!!");
    $('#modal_RWJresep_loading').hide();
    return;
  }else{
    var param = {
      obatcari    : searchnmobat,
      id_user     : user['id_user'],
      penjaminpas : penjaminpas,
      kd_milik    : user['kepemilikan_obat'],
      id_unit     : idunit,
    };
    apiPOST("Apotek/pencarianobat", param, hasil => {   
      if (hasil['data'] !== null) {
        if (hasil['code'] == 'XX') {
          toastr.error("Daftar Obat tidak ditemukan.");
          //$('#resepRWJ_table_listdaftarobat').append("<tr><td colspan ='6' align='center'>Data Tidak Ditemukan ...</td></tr>");
        }else{
          var Baris = '';
          var a     = hasil['data'];
          var margin= hasil['margin'];
          for (var i = 0; i < a.length; i++) {
            var no      = i + 1;
            var kd_obat = a[i].kd_obat;
            var nm_obat = a[i].nama_obat;
            var stok    = a[i].stok_unit;
            var milik   = a[i].milik;
            var hargasat      = Math.floor(a[i].tarif_harga_satuan);     // BELUM KE MARGIN
            var harga_jual    = Math.floor(a[i].harga_jual);             // SUDAH KE MARGIN
            var vharga_jual   = numberformat(harga_jual);                // SUDAH KE MARGIN
            
            Baris += '<tr class="odd" onclick="'+nm+'('+"'"+kd_obat+"','"+nm_obat+"','"+harga_jual+"','"+stok+"','"+tabAktif+"','"+hargasat+"'"+')">';
            Baris += '<td>' + no + '</td>';
            Baris += '<td>' + kd_obat + '</td>';
            Baris += '<td>' + nm_obat + '</td>';
            Baris += '<td style="text-align:center;">' + hargasat + '</td>';
            Baris += '<td style="text-align:center;">' + stok + '</td>';
            Baris += '<td style="text-align:center;">' + vharga_jual + '</td>';
            Baris += '<td style="text-align:center;">' + milik + '</td>';
            Baris += "</tr>";
            no++;
          }
          tabel_obatpencarian.fnDestroy();
          document.getElementById("resepRWJ_table_listdaftarobat").innerHTML = Baris;
          refresh();
        } 
        $('#modal_RWJresep_loading').hide();
        document.getElementById("resepRWJ_table_daftarobat_filter").style.display   = "none";
        document.getElementById("resepRWJ_table_daftarobat_length").style.display   = "none";
        document.getElementById("resepRWJ_table_daftarobat_paginate").style.display = "none";
      }

    }); 
  }
};



function keluarmodal_RWJresep_daftarobat() {
  $('#modal_RWJresep_daftarobat').modal('hide');
  $('.modal-backdrop').hide();
  //sessionStorage.clear();
}

// function eresepRWIAPT(kd_obt, nama_obat, harga_jual, stok, tabAktif){

// }

</script>