<?php
  $data = json_decode($_GET['data']);

  $posting    = str_replace('"','', json_encode($data->vReturRJIGD_posting));
  $noretur    = str_replace('"','', json_encode($data->vReturRJIGD_no_retur));
  $tglretur   = str_replace('"','', json_encode($data->vReturRJIGD_tgl_retur));
  $norm       = str_replace('"','', json_encode($data->vReturRJIGD_no_rm));
  $nama       = str_replace('"','', json_encode($data->vReturRJIGD_nama));
  $id_unit    = str_replace('"','', json_encode($data->vReturRJIGD_id_unit));
  $unit       = str_replace('"','', json_encode($data->vReturRJIGD_unit));
  $id_trans   = str_replace('"','', json_encode($data->vReturRJIGD_id_trans));
  $tglkunj    = str_replace('"','', json_encode($data->vReturRJIGD_tgl_kunj));
  $tgl_lahir  = str_replace('"','', json_encode($data->vReturRJIGD_tgl_lahir));
  $no_sjp     = str_replace('"','', json_encode($data->vReturRJIGD_no_sjp));
  $idpenjamin = str_replace('"','', json_encode($data->vReturRJIGD_idpenjamin));
  $penjamin   = str_replace('"','', json_encode($data->vReturRJIGD_penjamin));
  $telepon    = str_replace('"','', json_encode($data->vReturRJIGD_telepon));
  $id_dokter  = str_replace('"','', json_encode($data->vReturRJIGD_id_dokter));
  $nm_dokter  = str_replace('"','', json_encode($data->vReturRJIGD_nm_dokter));

  //$tglreturx      = date_format(date_create($tglretur), 'd-M-Y'); //FORMAT TGL 02-Feb-2023
?>
<section class="content pb-0">
  <div class="container-fluid h-100">
    <div class="row p-0">
      <div class="col-md-3 col-sm-6 col-12 p-1">
        <div class="info-box mb-0">
          <table class="table table-striped table-sm mb-0" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="90">Tgl. Kunj.</td>
              <td>:</td>
              <td><input type="date" class="form-control form-control-xs" id="returresepRJIGD_tglkunj"></td>
            </tr>
            <tr>
              <td width="90">Tgl. Retur</td>
              <td>:</td>
              <td><input type="date" class="form-control form-control-xs" id="returresepRJIGD_tglretur"></td>
            </tr>
            <tr>
              <td>No. Retur</td>
              <td>:</td>
              <td>
                <div class="input-group col-sm-12 p-0">
                  <input type="text" class="form-control form-control-xs" id="returresepRJIGD_nomor" disabled>
                  <div class="input-group-prepend">
                    <button type="button" class="btn btn-outline-danger btn-xs" onclick="returresepRJIGD_hapusretur()" id="returresepRJIGD_btnhapus"><i class="fa fa-trash"></i></button>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="3" align="center"><i><h6 id="returresepRJIGD_judul" style="font-weight: bold; border: 1px dashed currentColor;"></h6></i></td> 
            </tr>
          </table>
        </div>
      </div>
      
      <div class="col-md-5 col-sm-6 col-12 p-1">
        <div class="info-box mb-0">
          <table class="table table-striped table-sm mb-0" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="70">No. RM</td>
              <td>:</td>
              <td><input type="number" class="form-control form-control-xs" id="returresepRJIGD_norm" placeholder="Pencarian No RM" autocomplete="off"></td>
              <td>ID.Transaksi</td>
              <td>:</td>
              <td width="70"><input type="number" class="form-control form-control-xs" id="returresepRJIGD_idtransaksi" disabled></td>
            </tr>
            <tr>
              <td>Nm. Pasien</td>
              <td>:</td>
              <td colspan="4"><input type="search" class="form-control form-control-xs" id="returresepRJIGD_nmpasien" placeholder="Pencarian Nama Pasien" autocomplete="off"></td>
            </tr>
            <tr>
              <td>Umur</td>
              <td>:</td>
              <td colspan="4"><input type="text" class="form-control form-control-xs" id="returresepRJIGD_umur" disabled></td>
            </tr>
            <tr>
              <td>Telp</td>
              <td>:</td>
              <td colspan="4"><input type="text" class="form-control form-control-xs" id="returresepRJIGD_telp" disabled></td>
            </tr>
          </table>
        </div>
      </div>

      <div class="col-md-4 col-sm-6 col-12 p-1">
        <div class="info-box mb-0">
          <table class="table table-striped table-sm mb-0" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td>Penjamin</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control form-control-xs" id="returresepRJIGD_idpenjamin" disabled hidden>
                <input type="text" class="form-control form-control-xs" id="returresepRJIGD_penjamin" disabled>
              </td>
            </tr>
            <tr>
              <td width="70">SEP</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="returresepRJIGD_sep" disabled></td>
            </tr>
            <tr>
              <td>Dokter</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control form-control-xs" id="returresepRJIGD_iddokter" disabled hidden>
                <input type="text" class="form-control form-control-xs" id="returresepRJIGD_dokter" disabled>
              </td>
            </tr>
            <tr>
              <td>Unit</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control form-control-xs" id="returresepRJIGD_idunit" disabled hidden>
                <input type="text" class="form-control form-control-xs" id="returresepRJIGD_unit" disabled>
              </td>
            </tr>
          </table>
        </div>
      </div>

    </div>
    <div class="card card-row">
      <div class="overlay-wrapper" id="returresepRJIGD_loading">
        <div class="overlay dark">
          <i class="fas fa-3x fa-sync-alt fa-spin"></i>
        </div>
      </div>

      <div class="card-header p-1 darkgrey-custom">
        <button type="button" class="btn bg-gradient-secondary btn-xs" id="returresepRJIGD_delRow" onclick="returresepRJIGD_delRow('returresepRJIGD_tableentry')"><i class="fa fa-times"></i> Hapus Obat</button>
        <button type="button" class="btn bg-gradient-secondary btn-xs" id="returresepRJIGD_save" onclick="returresepRJIGD_save()" id="returresepRJIGD_simpan"><i class="fa fa-save"></i> Simpan</button>
        <button type="button" class="btn bg-gradient-secondary btn-xs" id="returresepRJIGD_pos" onclick="returresepRJIGD_pos()" id="returresepRJIGD_posting"><i class="fa fa-arrow-right"></i> Posting</button>
        <button type="button" class="btn btn-outline-danger btn-xs" onclick="returresepRJIGD_back()"><i class="fa fa-arrow-left"></i> Kembali</button>
      </div>

      <div class="modal-body p-0">
        <div class="card-body p-0">
          
          <div class="col-sm-12 p-0" style="height: 73vh; overflow-x: hidden;">
            
            <table class="table table-striped table-sm choose" style="border-collapse: inherit;">
              <thead>
                <tr>
                  <th class="pl-0 pr-0" width="30" style="text-align:center;">Act</th>
                  <th width="70">No.Resep</th>
                  <th width="90" style="text-align:center;">Racikan</th>
                  <th width="70">Kd.Obat</th>
                  <th>Nm.Obat</th>
                  <th width="70" style="text-align:center;">Dosis</th>
                  <th width="100" style="text-align:center;" title="Harga Jual Dari Penjualan Obat Resep">HargaJual</th>
                  <th width="70" style="text-align:center;">Qty</th>
                  <th width="70" style="text-align:center;">Expired</th>
                  <th width="130" style="text-align:center;">Total</th>
                  <th width="170" style="text-align:center;">Catatan</th>
                </tr>
              </thead>
              <tbody id="returresepRJIGD_tableentry"></tbody>
              <tfoot style="background-color: #a8d4da; color: black;">
                <tr>
                  <td colspan="5" class="pl-0 pr-0 pt-2">
                    <div class="input-group col-sm-12 p-0">
                      <input type='search' class='form-control form-control-xxs' id='returresepRJIGD_tfoot_nmobat' placeholder="Pencarian Obat" autocomplete="off">
                      <div class="input-group-prepend">
                        <button type="button" class="btn btn-outline-primary btn-xs" onclick="returresepRJIGD_pencarian_resep()" title="Refresh Obat Resep"><i class="fa fa-sync-alt fa-spin"></i></button>
                      </div>
                    </div>
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='number' class='form-control form-control-xxs' id='returresepRJIGD_tfoot_dosis' style='text-align: center;' readonly>
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='text' class='form-control form-control-xxs' id='returresepRJIGD_tfoot_hargajual'  style='text-align: center;' readonly>
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='number' class='form-control form-control-xxs' id='returresepRJIGD_tfoot_qty' value="0" placeholder="0.00" step="0.01" min="0" style='text-align: center;'>
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='date' class='form-control form-control-xxs' id='returresepRJIGD_tfoot_exp' style='text-align: center;' readonly>
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='number' class='form-control form-control-xxs' id='returresepRJIGD_tfoot_hargatot' value="0" style='text-align: right;' readonly>
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='text' class='form-control form-control-xxs' id='returresepRJIGD_tfoot_catatan' readonly>
                  </td>

                  <td class="pl-0 pr-0 pt-2" style='display: none;'>
                    <input type='text' class='form-control form-control-xxs' id='returresepRJIGD_tfoot_hargasatuan' value="0" disabled>
                  </td>
                  <td class="pl-0 pr-0 pt-2" style='display: none;'>
                    <input type='number' class='form-control form-control-xxs' id='returresepRJIGD_tfoot_qtytersedia' value="0" disabled>
                  </td>
                  <td class="pl-0 pr-0 pt-2" style='display: none;'>
                    <input type='number' class='form-control form-control-xxs' id='returresepRJIGD_tfoot_noresep' value="0" disabled>
                  </td>
                  <td class="pl-0 pr-0 pt-2" style='display: none;'>
                    <input type='date' class='form-control form-control-xxs' id='returresepRJIGD_tfoot_tglresep' disabled>
                  </td>
                  <td class="pl-0 pr-0 pt-2" style='display: none;'>
                    <input type='text' class='form-control form-control-xxs' id='returresepRJIGD_tfoot_racikan' value="0" disabled>
                  </td>
                  <td class="pl-0 pr-0 pt-2" style='display: none;'>
                    <input type='text' class='form-control form-control-xxs' id='returresepRJIGD_tfoot_kdmilik' value="0" disabled>
                  </td>
                  <td class="pl-0 pr-0 pt-2" style='display: none;'>
                    <input type='number' class='form-control form-control-xxs' id='returresepRJIGD_tfoot_markup' placeholder='0.00' step='0.01' min='0' disabled>
                  </td>
                </tr>

                <tr>
                  <td colspan="11" class="pl-0 pr-0" style="text-align: -webkit-right;">
                    <div class="input-group col-sm-5 pr-0">
                      <div class="input-group-prepend">
                        <span class="input-group-text form-control-xs">PPn : </span>
                      </div>
                      <input type="number" class="form-control form-control-xs" id="returresepRJIGD_tfoot_PPn" value="0" style='text-align: right; font-size: 15px; font-weight: bold;' disabled>
                      <div class="input-group-prepend">
                        <span class="input-group-text form-control-xs">SubTotal : </span>
                      </div>
                      <input type="number" class="form-control form-control-xs" id="returresepRJIGD_tfoot_SubTotal" value="0" style='text-align: right; font-size: 15px; font-weight: bold;' disabled>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td colspan="11" class="pl-0 pr-0" style="text-align: -webkit-right;">
                    <div class="input-group pr-0" style="width: 269px;">
                      <div class="input-group-prepend">
                        <span class="input-group-text form-control-xs">GrandTotal : </span>
                      </div>
                      <input type="number" class="form-control form-control-xs" id="returresepRJIGD_tfoot_GrandTotal" value="0" style='text-align: right; font-size: 15px; font-weight: bold;' disabled>
                    </div>
                  </td>
                </tr>
              </tfoot>
            </table> 
          </div>
          
        </div>
      </div>
    </div>
  </div>
</section>

<script type="text/javascript">
$('.returRJIGD_content').show();
document.getElementById('returresepRJIGD_loading').style.display = 'none';

var posting     = "<?php echo $posting; ?>";
var noretur     = "<?php echo $noretur; ?>";
var tglretur    = "<?php echo $tglretur; ?>";
var norm        = "<?php echo $norm; ?>";
var nama        = "<?php echo $nama; ?>";
var id_unit     = "<?php echo $id_unit; ?>";
var nama_unit   = "<?php echo $unit; ?>";
var id_trans    = "<?php echo $id_trans; ?>";
var tgl_trans   = "<?php echo $tglkunj; ?>";
var tgl_lahir   = "<?php echo $tgl_lahir; ?>";
var no_sjp      = "<?php echo $no_sjp; ?>";
var idpenjamin  = "<?php echo $idpenjamin; ?>";
var penjamin    = "<?php echo $penjamin; ?>";
var telepon     = "<?php echo $telepon; ?>";
var id_dokter   = "<?php echo $id_dokter; ?>";
var nm_dokter   = "<?php echo $nm_dokter; ?>";

var pencarian_resepKdObat;
pencarian_resepKdObat = new AutoComplete("returresepRJIGD_tfoot_nmobat");
var flag;
var returresepRJIGD_tglkunj  = "returresepRJIGD_tglkunj";
var returresepRJIGD_tglretur = "returresepRJIGD_tglretur";
max_date(returresepRJIGD_tglkunj);
max_date(returresepRJIGD_tglretur);

document.getElementById('returresepRJIGD_judul').innerHTML  = 'Retur Resep IGD / Rawat Jalan';

if ((noretur != '')&&(id_trans != '')){

  document.getElementById('returresepRJIGD_nomor').value        = noretur;
  document.getElementById('returresepRJIGD_norm').value         = norm;
  document.getElementById('returresepRJIGD_nmpasien').value     = nama;
  document.getElementById('returresepRJIGD_umur').value         = tgl_lahir;
  document.getElementById('returresepRJIGD_telp').value         = telepon;
  document.getElementById('returresepRJIGD_idpenjamin').value   = idpenjamin;
  document.getElementById('returresepRJIGD_penjamin').value     = penjamin;
  document.getElementById('returresepRJIGD_sep').value          = no_sjp;
  document.getElementById('returresepRJIGD_iddokter').value     = id_dokter;
  document.getElementById('returresepRJIGD_dokter').value       = nm_dokter;
  document.getElementById('returresepRJIGD_idunit').value       = id_unit;
  document.getElementById('returresepRJIGD_unit').value         = nama_unit;
  document.getElementById('returresepRJIGD_tglkunj').value      = tgl_trans;
  document.getElementById('returresepRJIGD_tglretur').value     = tglretur;
  document.getElementById('returresepRJIGD_idtransaksi').value  = id_trans;
  getData_returresepRJIGD(noretur, tglretur);
  returresepRJIGD_pencarian_resep();

}else{

  document.getElementById('returresepRJIGD_tglkunj').value    = nowday;
  document.getElementById('returresepRJIGD_tglretur').value   = nowday;
  $('#returresepRJIGD_norm').trigger('focus');

}

$("#returresepRJIGD_norm").on("keyup", function(event){
  if (event.keyCode == 13) {
    returresepRJIGD_pencarian_pasien();
  }
});

$("#returresepRJIGD_nmpasien").on("keyup", function(event){
  if (event.keyCode == 13) {
    returresepRJIGD_pencarian_pasien();
  }
});

function getData_returresepRJIGD(noretur, tglretur){
  document.getElementById('returresepRJIGD_loading').style.display = 'block';
  var param = {
    iduser    : user['id_user'],
    noretur   : noretur,
    tglretur  : tglretur
  };

  if ((noretur != '0')||(noretur != null)){
    apiPOST('Apotek/lookup_detailobatreturRJRIIGD', param, hasil => {
  
      if (hasil !== null) {
        if (hasil['code'] == '200'){
          var data  = hasil['data'];
          var Obat  = hasil['ObatRetur'];

          $('#returresepRJIGD_tableentry').html('');
          
          if (Obat.length == 0){
            toastr.info("Belum Ada Inputan Obat !!");
          }

          for (var o = 0; o < Obat.length; o++) {
            var kd_obt        = Obat[o].kd_obat;
            var nmaobat       = Obat[o].nama_obat;
            var qty           = Obat[o].jumlah;
            var kd_milik      = Obat[o].kd_milik;
            var noresep       = Obat[o].noresep;
            var tglresep      = Obat[o].tglresep;
            var dosis         = Obat[o].dosis;
            var hrgajual      = Obat[o].hrga_jual;
            var hrgasat       = Obat[o].hrga_pokok;
            var exp           = Obat[o].exp_retur;
            //var hargatot      = parseFloat(Obat[o].total_harga);
            var catatan       = Obat[o].catatan;
            var qty_awal      = Obat[o].stok_awal;
            var stoktersedia  = Obat[o].stok_tersedia;
            var racik         = Obat[o].jns_racikan;
            var markup        = Obat[o].markup;
            var kdmilik       = Obat[o].kd_milik;

            var hrgajual      = Math.floor(Obat[o].hrga_jual);
            var hargatot      = qty * hrgajual;

            returresepRJIGD_steplanjut(kd_obt, nmaobat, dosis, hrgajual, qty, exp, hargatot, catatan, hrgasat, stoktersedia, noresep, tglresep, racik, kdmilik, markup);
          }

        }else if (hasil['code'] == '100'){
          var Obat  = hasil['ObatRetur'];

          $('#returresepRJIGD_tableentry').html('');
          
          if (Obat.length == 0){
            toastr.info("Belum Ada Inputan Obat !!");
          }

          for (var o = 0; o < Obat.length; o++) {
            var kd_obt        = Obat[o].kd_obat;
            var nmaobat       = Obat[o].nama_obat;
            var qty           = Obat[o].jumlah;
            var kd_milik      = Obat[o].kd_milik;
            var noresep       = Obat[o].noresep;
            var tglresep      = Obat[o].tglresep;
            var dosis         = Obat[o].dosis;
            var hrgajual      = Obat[o].hrga_jual;
            var hrgasat       = Obat[o].hrga_pokok;
            var exp           = Obat[o].exp_retur;
            //var hargatot      = parseFloat(Obat[o].total_harga);
            var catatan       = Obat[o].catatan;
            var qty_awal      = Obat[o].stok_awal;
            var stoktersedia  = Obat[o].stok_tersedia;
            var racik         = Obat[o].jns_racikan;
            var markup        = Obat[o].markup;
            var kdmilik       = Obat[o].kd_milik;

            var hrgajual      = Math.floor(Obat[o].hrga_jual);
            var hargatot      = qty * hrgajual;

            returresepRJIGD_steplanjut(kd_obt, nmaobat, dosis, hrgajual, qty, exp, hargatot, catatan, hrgasat, stoktersedia, noresep, tglresep, racik, kdmilik, markup);
          }

          sukses('Retur Sudah Posting!!', '');
          document.getElementById('returresepRJIGD_norm').disabled = 'true';
          document.getElementById('returresepRJIGD_nmpasien').disabled = 'true';
          document.getElementById('returresepRJIGD_tfoot_nmobat').disabled = 'true';
          document.getElementById('returresepRJIGD_delRow').disabled = 'true';
          document.getElementById('returresepRJIGD_save').disabled = 'true';
          document.getElementById('returresepRJIGD_pos').disabled = 'true';
          
        }else{
          toastr.error("Belum Ada Retur Hari Ini.");
        }
      }
    }).then(function(){
      document.getElementById('returresepRJIGD_loading').style.display = 'none';
    });
  }else{
    toastr.error('Nomor Retur Tidak Diketahui!!');
  }
}

function returresepRJIGD_pencarian_pasien(){
  var json_data = {
    'vreturresepRJIGDRI_norm'     : document.getElementById('returresepRJIGD_norm').value,
    'vreturresepRJIGDRI_nmpasien' : document.getElementById('returresepRJIGD_nmpasien').value.replace(/ /g, '%20'),
    'vreturresepRJIGDRI_tglkunj'  : document.getElementById('returresepRJIGD_tglkunj').value,
    'vreturresepRJIGDRI_nmfunct'  : 'returresepRJIGD',
  };
  
  var data    = JSON.stringify(json_data);
  var jmlRow  = $('#returresepRJIGD_tableentry tr').length;
  if(jmlRow > 0){
    pertanyaan.fire({
      title             : 'Peringatan',
      html              : '<span>Item Obat Akan dihapus, tetap lanjut ?!</span>',
      icon              : 'question',
      showCancelButton  : true,
      reverseButtons    : false,
      allowOutsideClick : false
    }).then((result) => {
      if (result.isConfirmed) {
        $('#returresepRJIGD_tableentry').html('');
        $('.returRJIGD_pasien').load('Apotek/pencarian_pasienretur?data='+ data);
      }else if(result.dismiss === Swal.DismissReason.cancel){
        
      }
    })
    
  }else{
    $('.returRJIGD_pasien').load('Apotek/pencarian_pasienretur?data='+ data);
  }
  
}

//DIDAPAT DRI PENCARIAN PASIEN
function view_returresepRJIGD(no_rm, nama, id_unit, nama_unit, id_dokter, dokter, umur, no_sjp, telepon, penjamin, tgl_trans, id_transaksi, idpenjamin){
  document.getElementById('returresepRJIGD_norm').value         = no_rm;
  document.getElementById('returresepRJIGD_nmpasien').value     = nama;
  document.getElementById('returresepRJIGD_umur').value         = umur;
  document.getElementById('returresepRJIGD_telp').value         = telepon;
  document.getElementById('returresepRJIGD_penjamin').value     = penjamin;
  document.getElementById('returresepRJIGD_idpenjamin').value   = idpenjamin;
  document.getElementById('returresepRJIGD_sep').value          = no_sjp;
  document.getElementById('returresepRJIGD_iddokter').value     = id_dokter;
  document.getElementById('returresepRJIGD_dokter').value       = dokter;
  document.getElementById('returresepRJIGD_idunit').value       = id_unit;
  document.getElementById('returresepRJIGD_unit').value         = nama_unit;
  document.getElementById('returresepRJIGD_tglkunj').value      = tgl_trans;
  document.getElementById('returresepRJIGD_idtransaksi').value  = id_transaksi;

  returresepRJIGD_pencarian_resep();
}

function returresepRJIGD_pencarian_resep(){
  
  var norm      = document.getElementById('returresepRJIGD_norm').value;
  var nmapasien = document.getElementById('returresepRJIGD_nmpasien').value;
  var id_trans  = document.getElementById("returresepRJIGD_idtransaksi").value;

  if ((norm == '')||(nmapasien == '')){
    toastr.warning("No. RM / Nama Pasien Tidak Di Ketahui!!");
    return;
  }else if (id_trans == ''){
    toastr.warning('LookUp Pasien Terlebih Dahulu!!');
    document.getElementById('returresepRJIGD_norm').value     = '';
    document.getElementById('returresepRJIGD_nmpasien').value = '';
    $('#returresepRJIGD_norm').trigger('focus');
    return;
  }

  //pencarian_resepKdObat.reset();
  pencarian_resepKdObat.resetData();
  $('#returresepRJIGD_tfoot_nmobat').trigger('focus');
  var param = {
    norm     : document.getElementById('returresepRJIGD_norm').value,
    tglkunj  : document.getElementById('returresepRJIGD_tglkunj').value,
    idfar    : user['id_far']
  };

  apiPOST('Apotek/returresepRJIGDRI_pencarian_resep', param, hasil => {
    if (hasil !== null) {
      var list = hasil['data'];
      list.forEach(baru => {
        
        pencarian_resepKdObat.addData(baru['kd_obat'], 'Tgl.Resep : '+baru['tglresep']+' / No.Resep : '+baru['noresep']+' / #Racikan : '+baru['jns_racikan']+' #QtyRacik : '+baru['qty_racik']+'<br><b>'+baru['nama_obat']+'</b> #Dosis: '+baru['dosis']+' #Qty: '+baru['jumlah']+' #Catatan: '+baru['catatan']+'<br>Expired : '+baru['exp']+' , Harga Jual : '+baru['harga_jual']+' , HPP : '+baru['harga_sat']+' | '+ baru['kd_milik']+' | '+ baru['markup']);
        
      });
    } 
  });

  flag = false;
  returresepRJIGD_disabledenabled(flag);
  returresepRJIGD_inputan();
}

function returresepRJIGD_disabledenabled(flag){
  document.getElementById('returresepRJIGD_tfoot_nmobat').disabled    = flag;
  document.getElementById('returresepRJIGD_tfoot_dosis').disabled     = flag;
  document.getElementById('returresepRJIGD_tfoot_hargajual').disabled = flag;
  document.getElementById('returresepRJIGD_tfoot_qty').disabled       = flag;
  document.getElementById('returresepRJIGD_tfoot_exp').disabled       = flag;
  document.getElementById('returresepRJIGD_tfoot_hargatot').disabled  = flag;

  // document.getElementById('gud_barangOut_simpan').disabled       = flag;
  // document.getElementById('gud_barangOut_posting').disabled      = flag;

}

function returresepRJIGD_empty(){
  pencarian_resepKdObat.reset();
  $('#returresepRJIGD_tfoot_nmobat').val('');
  $('#returresepRJIGD_tfoot_dosis').val('');
  $('#returresepRJIGD_tfoot_hargajual').val('');
  $('#returresepRJIGD_tfoot_qty').val('');
  $('#returresepRJIGD_tfoot_exp').val('');
  $('#returresepRJIGD_tfoot_hargatot').val(0);
  $('#returresepRJIGD_tfoot_catatan').val('');
  
  $('#returresepRJIGD_tfoot_hargasatuan').val('');
  $('#returresepRJIGD_tfoot_qtytersedia').val('');
  $('#returresepRJIGD_tfoot_noresep').val('');
  $('#returresepRJIGD_tfoot_racikan').val('');
  setTimeout(refreshInput, 500);
}

function refreshInput(){
  document.getElementById('returresepRJIGD_tfoot_nmobat').focus();
}

function returresepRJIGD_inputan(){
  
  pencarian_resepKdObat.onPilih(()=>{
    //var kd_obat       = pencarian_resepKdObat.getValue();
    var nm_obat       = $('#returresepRJIGD_tfoot_nmobat').val();
    var splitresep    = nm_obat.split(' / No.Resep : ');
    var splitresep1   = splitresep[0].split('Tgl.Resep : ');
    var splitresep2   = splitresep[1].split(' / #Racikan : ');
    var splitracikan  = splitresep2[1].split(' #QtyRacik : ');
    var splitqtyracik = splitracikan[1].split('<br><b>');
    var splitnmobat   = splitresep[1].split('<br><b>');
    var splitnmobat2  = splitnmobat[1].split('</b> #Dosis: ');
    var splitdosis    = splitnmobat2[1].split(' #Qty: ');
    var splitqty      = splitdosis[1].split(' #Catatan: ');
    var splitcatatan  = splitqty[1].split('<br>Expired : ');
    var splitexpired  = splitcatatan[1].split(' , Harga Jual : ');
    var splithrgjual  = splitexpired[1].split(' , HPP : ');
    var splithrgasat  = splithrgjual[1].split(' | ');
    //console.log(splitresep1);
    // console.log(splitnmobat);
    // console.log(splitdosis);
    // console.log(splitqty);
    var gettglresep = splitresep1[1];
    var getnoresep  = splitresep2[0];
    var getracik    = splitracikan[0];
    var getqtyracik = splitqtyracik[0];
    var getnmaobat  = splitnmobat2[0];
    var getdosis    = splitdosis[0];
    var getqty      = splitqty[0];
    var getcatatan  = splitcatatan[0];
    var getexp      = splitexpired[0];
    var gethrgajual = splithrgjual[0];
    var gethrgasat  = splithrgasat[0];
    var getkdmilik  = splithrgasat[1];
    var getmarkup   = splithrgasat[2];
    //console.log(getnoresep, getracik, getqtyracik, getnmaobat, getdosis, getqty, getcatatan, getexp, gethrgajual, gethrgasat);
    if (getqtyracik != 'null'){
      getqtyracik = getqtyracik;
    }else{
      getqtyracik = '';
    }
    
    $('#returresepRJIGD_tfoot_nmobat').val(getnmaobat);
    $('#returresepRJIGD_tfoot_dosis').val(getdosis);
    $('#returresepRJIGD_tfoot_hargajual').val(gethrgajual);
    $('#returresepRJIGD_tfoot_qty').val(getqty);
    $('#returresepRJIGD_tfoot_exp').val(getexp);
    $('#returresepRJIGD_tfoot_hargatot').val(0);
    $('#returresepRJIGD_tfoot_catatan').val(getcatatan);
    
    $('#returresepRJIGD_tfoot_hargasatuan').val(gethrgasat);
    $('#returresepRJIGD_tfoot_qtytersedia').val(getqty);
    $('#returresepRJIGD_tfoot_noresep').val(getnoresep);
    $('#returresepRJIGD_tfoot_tglresep').val(gettglresep);
    $('#returresepRJIGD_tfoot_racikan').val(getracik);
    $('#returresepRJIGD_tfoot_kdmilik').val(getkdmilik);
    $('#returresepRJIGD_tfoot_markup').val(getmarkup);

    $('#returresepRJIGD_tfoot_qty').trigger('focus');
  });

  $("#returresepRJIGD_tfoot_qty").on( "keydown", function(e) {
    switch(event.which){      
      case 13:
        var qty       = $(this).val();        
        var hrgajual  = $('#returresepRJIGD_tfoot_hargajual').val();
        var hrgasat   = $('#returresepRJIGD_tfoot_hargasatuan').val();

        if (qty == ''){
          qty = 0;
        }else{
          qty = $(this).val();
        }

        let hargatot  = 0;

        hargatot = parseFloat(qty) * Math.floor(parseFloat(hrgajual));
        
        $("#returresepRJIGD_tfoot_hargatot").val(hargatot);

        returresepRJIGD_cekstok();

        break;
    }
  });
}

function returresepRJIGD_cekstok(){
  var stokTersedia = $('#returresepRJIGD_tfoot_qtytersedia').val();
  var qty          = $('#returresepRJIGD_tfoot_qty').val();
  
  let result = 0;
  result = parseFloat(stokTersedia) - parseFloat(qty);

  if (parseFloat(qty) > parseFloat(stokTersedia)){
    toastr.error("Jumlah Obat Melebihi Stok Tersedia!");
    return;
  }else{
    $('#returresepRJIGD_tfoot_qtytersedia').val(result);

    var kd_obt    = pencarian_resepKdObat.getValue();
    var nmaobat   = $('#returresepRJIGD_tfoot_nmobat').val();
    var dosis     = $('#returresepRJIGD_tfoot_dosis').val();
    var hrgajual  = $('#returresepRJIGD_tfoot_hargajual').val();
    var qty       = $('#returresepRJIGD_tfoot_qty').val();
    var exp       = $('#returresepRJIGD_tfoot_exp').val();
    var hargatot  = $('#returresepRJIGD_tfoot_hargatot').val();
    var catatan   = $('#returresepRJIGD_tfoot_catatan').val();
    
    var hrgasat       = $('#returresepRJIGD_tfoot_hargasatuan').val();
    var stoktersedia  = $('#returresepRJIGD_tfoot_qtytersedia').val();
    var noresep       = $('#returresepRJIGD_tfoot_noresep').val();
    var tglresep      = $('#returresepRJIGD_tfoot_tglresep').val();
    var racik         = $('#returresepRJIGD_tfoot_racikan').val();
    var kdmilik       = $('#returresepRJIGD_tfoot_kdmilik').val();
    var markup        = $('#returresepRJIGD_tfoot_markup').val();
    
    if (kd_obt != null){
      if (noresep == ''){
        toastr.error("No. Resep masih kosong!!");
      }else if(tglresep == ''){
        toastr.error("Tgl resep masih kosong!!");
      }else if(qty <= 0){
        toastr.error("Jumlah masih kosong!!");
      }else if(hrgajual == ''){
        toastr.error("Harga jual masih kosong!!");
      }else if(exp == ''){
        toastr.error("Espired masih kosong!!");
      }else if(hrgasat == ''){
        toastr.error("Satuan harga masih kosong!!");
      }else if(kdmilik == ''){
        toastr.error("Kepemilikan obat resep masih kosong!!");
      }else{
        returresepRJIGD_steplanjut(kd_obt, nmaobat, dosis, hrgajual, qty, exp, hargatot, catatan, hrgasat, stoktersedia, noresep, tglresep, racik, kdmilik, markup);
      }
    }else{
      toastr.error("Nama obat tidak ditemukan!!");
    }
    
  }
}

function returresepRJIGD_steplanjut(kd_obt, nmaobat, dosis, hrgajual, qty, exp, hargatot, catatan, hrgasat, stoktersedia, noresep, tglresep, racik, kdmilik, markup){
  
  var data = '';
      data += "<tr>";
      data += "<td class='pl-0' style='text-align:center;'>";
      data += "<input type='checkbox' name='returresepRJIGD_hometable_check[]' class='form-control-xs'/>";
      data += "</td>"; //1
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='returresepRJIGD_hometable_noresep[]' value='" + noresep + "' disabled>";
      data += "</td>"; //2
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='returresepRJIGD_hometable_racik[]' value='" + racik + "' style='text-align: center;' disabled>";
      data += "</td>"; //3
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='returresepRJIGD_hometable_kdobat[]' value='" + kd_obt + "' disabled>";
      data += "</td>"; //4
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='returresepRJIGD_hometable_nmobat[]' value='" + nmaobat + "' disabled>";
      data += "</td>"; //5
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='returresepRJIGD_hometable_dosis[]' value='" + dosis + "' style='text-align: center;' disabled>";
      data += "</td>"; //6
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='returresepRJIGD_hometable_hargajual[]' value='" + hrgajual + "' style='text-align: center;' disabled>";
      data += "</td>"; //7
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='returresepRJIGD_hometable_qty[]' value='" + qty + "' style='text-align: center;' disabled>";
      data += "</td>"; //8
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='returresepRJIGD_hometable_exp[]' value='" + exp + "' style='text-align: center;' disabled>";
      data += "</td>"; //9
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='returresepRJIGD_hometable_hargatotal[]' value='" + hargatot + "' style='text-align: right;' disabled>";
      data += "</td>"; //10
      data += "<td class='pr-0'>";
      data += "<input type='text' class='form-control form-control-xxs' name='returresepRJIGD_hometable_catatan[]' value='" + catatan + "' style='text-align: center;' disabled>";
      data += "</td>"; //11

      data += "<td class='pr-0' style='display: none;'>";
      data += "<input type='text' class='form-control form-control-xxs' name='returresepRJIGD_hometable_hrgasat[]' value='" + hrgasat + "' disabled>";
      data += "</td>"; //12
      data += "<td class='pr-0' style='display: none;'>";
      data += "<input type='text' class='form-control form-control-xxs' name='returresepRJIGD_hometable_stoktersedia[]' value='" + stoktersedia + "' disabled>";
      data += "</td>"; //13
      data += "<td class='pr-0' style='display: none;'>";
      data += "<input type='date' class='form-control form-control-xxs' name='returresepRJIGD_hometable_tglresep[]' value='" + tglresep + "' disabled>";
      data += "</td>"; //14

      data += "<td class='pr-0' style='display: none;'>";
      data += "<input type='text' class='form-control form-control-xxs' name='returresepRJIGD_hometable_kdmilik[]' value='" + kdmilik + "' disabled>";
      data += "</td>"; //15
      data += "<td class='pr-0' style='display: none;'>";
      data += "<input type='number' class='form-control form-control-xxs' name='returresepRJIGD_hometable_markup[]' placeholder='0.00' step='0.01' min='0' value='" + markup + "' disabled>";
      data += "</td>"; //16

      data += "</tr>";

  var getkd_obat  = document.getElementsByName('returresepRJIGD_hometable_kdobat[]');
  var jmlRow      = $('#returresepRJIGD_tableentry tr').length;
  const count     = [];

  for(var i = 0, iLen = jmlRow ; i < iLen; i++){
    var datax     = {};
    datax.kd_obat = getkd_obat[i].value;
    count.push(datax);
  }
  
  const cekkd_obat_retur      = count.map(el => el.kd_obat);
  const status_kd_obat_retur  = cekkd_obat_retur.includes(kd_obt);
  
  if (status_kd_obat_retur == false){
    $('#returresepRJIGD_tableentry').append(data);
    returresepRJIGD_proses_penjumlahan(hargatot);
  }else{
    toastr.error("Obat Sudah Diinputkan!!");
  }

  returresepRJIGD_empty();
}

function returresepRJIGD_proses_penjumlahan(hargatot){
  var totalx  = document.getElementById("returresepRJIGD_tfoot_SubTotal").value;
  let result  = 0;
  result = parseFloat(totalx) + parseFloat(hargatot);

  document.getElementById("returresepRJIGD_tfoot_SubTotal").value = Math.ceil(result);
  returresepRJIGD_getPPnValue();
}

function returresepRJIGD_getPPnValue(){
  var total = document.getElementById("returresepRJIGD_tfoot_SubTotal").value;
  var grandtotal = document.getElementById("returresepRJIGD_tfoot_GrandTotal").value;

  if (user['id_far'] == '4001'){
    let ppnrp = 0;
    ppnrp = (parseFloat(total) * 11) / 100;
    document.getElementById("returresepRJIGD_tfoot_PPn").value = Math.ceil(ppnrp);
    let grandtotalx = 0;
    grandtotalx = parseFloat(total) + Math.ceil(ppnrp);
    document.getElementById("returresepRJIGD_tfoot_GrandTotal").value = Math.ceil(grandtotalx);
  }else{
    let grandtotalx = 0;
    grandtotalx = parseFloat(total);
    document.getElementById("returresepRJIGD_tfoot_GrandTotal").value = Math.ceil(grandtotalx);
  }
}

function returresepRJIGD_delRow(tableID) {
  try {
    var table = document.getElementById(tableID);
    var rowCount = table.rows.length;
    //console.log(rowCount);
    for (var i = 0; i < rowCount; i++) {
      var row = table.rows[i];
      var chkbox = row.cells[0].childNodes[0];
      if (null != chkbox && true == chkbox.checked) {
        if (rowCount <= 0) {
          toastr.error("Tidak ada Obat yang di Hapus!!");
          break;
        }
        table.deleteRow(i);
        rowCount--;
        i--;
      }
    }
  } catch (e) {
    alert(e);
  }

  let total  = 0;
  var getTotal   = document.getElementsByName('returresepRJIGD_hometable_hargatotal[]');

  var jmlObat = $('#returresepRJIGD_tableentry tr').length;
  var i;
  for (i = 0; i < jmlObat; i++) {
    let totalRP = getTotal[i].value;
    total  += Number(totalRP);
  }

  document.getElementById("returresepRJIGD_tfoot_SubTotal").value  = Math.ceil(parseFloat(total));
  returresepRJIGD_getPPnValue();
}

function returresepRJIGD_paramsretur(){  
  var getnoresep    = document.getElementsByName('returresepRJIGD_hometable_noresep[]');
  var gettglresep   = document.getElementsByName('returresepRJIGD_hometable_tglresep[]');
  var getkd_obt     = document.getElementsByName('returresepRJIGD_hometable_kdobat[]');
  var getnm_obt     = document.getElementsByName('returresepRJIGD_hometable_nmobat[]');
  var getdosis      = document.getElementsByName('returresepRJIGD_hometable_dosis[]');
  var gethrgajual   = document.getElementsByName('returresepRJIGD_hometable_hargajual[]');
  var getqty        = document.getElementsByName('returresepRJIGD_hometable_qty[]');
  var getexp        = document.getElementsByName('returresepRJIGD_hometable_exp[]');
  var gethrgasat    = document.getElementsByName('returresepRJIGD_hometable_hrgasat[]');
  var getkdmilik    = document.getElementsByName('returresepRJIGD_hometable_kdmilik[]');
  var getmarkup     = document.getElementsByName('returresepRJIGD_hometable_markup[]');
  var getjnsracik   = document.getElementsByName('returresepRJIGD_hometable_racik[]');
  var count         = $('#returresepRJIGD_tableentry tr').length;
  
  var params    = {};  
  params.data   = [];
  for(var i = 0, iLen = count ; i < iLen; i++){
    var x = {};
    x.noresep   = getnoresep[i].value;
    x.tglresep  = gettglresep[i].value;
    x.kd_obt    = getkd_obt[i].value;
    x.nm_prd    = getnm_obt[i].value;
    x.dosis     = getdosis[i].value;
    x.hargajual = gethrgajual[i].value;
    x.qty       = getqty[i].value;
    x.exp       = getexp[i].value;
    x.kd_milik  = getkdmilik[i].value;
    x.markup    = getmarkup[i].value;
    x.hargasat  = gethrgasat[i].value;
    x.hargaTot  = (x.qty * x.hargajual);
    x.jnsracik  = getjnsracik[i].value;

    if (getexp[i].value != ''){
      x.exp     = getexp[i].value;
    }else{
      toastr.error('Expired Date Obat Kosong!');
      return;
    }
    
    params.data.push(x);
  }
  return params.data;
}

function returresepRJIGD_save(){
  document.getElementById('returresepRJIGD_loading').style.display = 'block';

  var norm          = document.getElementById("returresepRJIGD_norm").value;
  var nmapasien     = document.getElementById("returresepRJIGD_nmpasien").value;
  var id_unit       = document.getElementById("returresepRJIGD_idunit").value;
  var jmlhbayar     = document.getElementById("returresepRJIGD_tfoot_SubTotal").value;
  var id_transaksi  = document.getElementById("returresepRJIGD_idtransaksi").value;
  var tgl_kunj      = document.getElementById("returresepRJIGD_tglkunj").value;
  var id_dokter     = document.getElementById("returresepRJIGD_iddokter").value;
  var jmlh_item     = $('#returresepRJIGD_tableentry tr').length;

  if ((norm == '')||(nmapasien == '')||(id_unit == '')||(id_dokter == '')){
    document.getElementById('returresepRJIGD_loading').style.display = 'none';
    toastr.error('Data Pasien Tidak Ditemukan!!');
    return;
  }else if (id_transaksi == ''){
    toastr.error('Id Transaksi Tidak Diketahui!!');
    return;
  }else if ((jmlhbayar <= 0)|| (jmlh_item == 0)){
    document.getElementById('returresepRJIGD_loading').style.display = 'none';
    toastr.error('Tidak ada item obat yang diretur!!');
    return;
  }

  var param = {
    noretur       : document.getElementById("returresepRJIGD_nomor").value,
    tgl_retur     : document.getElementById("returresepRJIGD_tglretur").value,
    id_unit       : id_unit,
    id_user       : user['id_user'],
    id_unit_far   : user['id_far'],
    no_rm         : norm,
    penjamin      : document.getElementById("returresepRJIGD_idpenjamin").value,
    jmlhbayar     : document.getElementById("returresepRJIGD_tfoot_SubTotal").value,
    hppbayar      : 0,
    ppnbayar      : document.getElementById("returresepRJIGD_tfoot_PPn").value,
    dataObat      : returresepRJIGD_paramsretur(),
    id_transaksi  : id_transaksi,
    tgl_kunj      : tgl_kunj,
    jmlh_item     : jmlh_item,
    id_dokter     : id_dokter
  };
  
  apiPOST('Apotek/saveReturRJIGDRI', param, hasil => {
    document.getElementById('returresepRJIGD_loading').style.display = 'none';
    if (hasil !== null) {
      if (hasil['code'] == '200'){
        document.getElementById("returresepRJIGD_nomor").value = hasil['noretur'];
      }else if (hasil['code'] == '501'){
        toastr.error('Retur Sudah Terposting!!');
      }else if (hasil['code'] == '502'){
        toastr.error('Expired Date Obat Kosong');
      }else{
        toastr.error('Gagal Simpan Resep!!');
      }
    }
  }).then(function(){
    //eresepIGDAPT_loading();
  });
}

function returresepRJIGD_pos(){
  document.getElementById('returresepRJIGD_loading').style.display = 'block';
  var no_retur = document.getElementById("returresepRJIGD_nomor").value;
  
  if (no_retur != ''){
    pertanyaan.fire({
      title             : 'Posting Resep',
      html              : 'Retur sudah benar, lanjut posting ?',
      icon              : 'warning',
      reverseButtons    : false,
      allowOutsideClick : false,
      showDenyButton    : true,
      confirmButtonText : '<i class="fa fa-thumbs-up"></i> Posting',
      denyButtonText    : '<i class="fa fa-times"></i> Batal',
      focusConfirm      : false,
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById('returresepRJIGD_loading').style.display = 'none';
        var param = {
          no_retur  : no_retur,
          id_trans  : document.getElementById("returresepRJIGD_idtransaksi").value,
          id_unit   : document.getElementById("returresepRJIGD_idunit").value,
          norm      : norm,
          nm_pasien : document.getElementById("returresepRJIGD_nmpasien").value,
          tgl_kunj  : document.getElementById("returresepRJIGD_tglkunj").value,
          tgl_retur : document.getElementById('returresepRJIGD_tglretur').value,
          id_dokter : document.getElementById('returresepRJIGD_iddokter').value,
          user      : user['id_user'],
          jmlhbayar : document.getElementById("returresepRJIGD_tfoot_SubTotal").value,
          ppnbayar  : document.getElementById("returresepRJIGD_tfoot_PPn").value,
        };

        apiPOST('Apotek/transferRetur_penjualanApotek', param, hasil => {
          if (hasil !== null) {
            var pesan = hasil['pesan'];
            document.getElementById('returresepRJIGD_loading').style.display = 'none';
            //toastr.success("Berhasil di Transfer!!");
            keluar_returresepRJIGD();
            //sukses('Berhasil di Retur', '');
            sukses(pesan, '');
          }
        }).then(function(){
          //document.getElementById('returresepRJIGD_loading').style.display = 'none';
        });
        
      }else if (result.isDenied) {
        document.getElementById('returresepRJIGD_loading').style.display = 'none';
      }
    })
  }else{
    document.getElementById('returresepRJIGD_loading').style.display = 'none';
    toastr.warning("Retur Belum disimpan...");
  }
}

function returresepRJIGD_hapusretur(){
  document.getElementById('returresepRJIGD_loading').style.display = 'block';
  var no_retur = document.getElementById("returresepRJIGD_nomor").value;
  
  if (no_retur != ''){    
    pertanyaan.fire({
      title             : 'Hapus Retur RJ/IGD, masukkan alasan dihapus ?',
      html              : '<input type="text" class="form-control form-control-sm" id="reasonhapus_retur" class="swal2-input" placeholder="Enter your reason" autocomplete="off" required>',
      icon              : 'error',
      showCancelButton  : true,
      reverseButtons    : false,
      allowOutsideClick : false
    }).then((result) => {
      if (result.isConfirmed) {
        var reasonhapus_retur = document.getElementById('reasonhapus_retur').value;
        if (reasonhapus_retur != ''){
          
          var param = {
            id_peg    : user['id_pegawai'],
            no_retur  : no_retur,
            id_trans  : id_trans,
            idunit    : document.getElementById("returresepRJIGD_idunit").value,
            user      : user['id_user'],
            tgl_kunj  : document.getElementById("returresepRJIGD_tglkunj").value,
            tgl_retur : document.getElementById('returresepRJIGD_tglretur').value,
            norm      : norm,
            reason    : reasonhapus_retur,
            total     : document.getElementById("returresepRJIGD_tfoot_GrandTotal").value,
          };

          apiPOST('Apotek/HapusReturRJIGDRI', param, hasil => {
            document.getElementById('returresepRJIGD_loading').style.display = 'none';
            if (hasil !== null) {
              keluar_returresepRJIGD();
            }else{
              keluar_returresepRJIGD();
            }
          });
        }else{
          swal_center('Alasan tidak boleh kosong!!','error')
        }
        
      }else if(result.dismiss === Swal.DismissReason.cancel){
        document.getElementById('returresepRJIGD_loading').style.display = 'none';
      }
    })
  }else{
    document.getElementById('returresepRJIGD_loading').style.display = 'none';
  }
}

function returresepRJIGD_back(){
  var noretur = document.getElementById("returresepRJIGD_nomor").value;
  if (noretur == ''){    
    pertanyaan.fire({
      title             : 'Kembali ke menu awal',
      html              : '<span>Retur Belum diSimpan, Data yang sudah dientry akan hilang, tetap kembali ?</span>',
      icon              : 'question',
      showCancelButton  : true,
      reverseButtons    : false,
      allowOutsideClick : false
    }).then((result) => {
      if (result.isConfirmed) {
        keluar_returresepRJIGD();
      }else if(result.dismiss === Swal.DismissReason.cancel){
        
      }
    })
  }else{
    keluar_returresepRJIGD();
  }
}

function keluar_returresepRJIGD() {
  $('.returRJIGD_content').hide();
  $('#returRJIGDFar_pertama').show();
  $('#returRJIGDFar_kedua').show();
  tampilkan_isi_returRJIGDFar();
}
</script>