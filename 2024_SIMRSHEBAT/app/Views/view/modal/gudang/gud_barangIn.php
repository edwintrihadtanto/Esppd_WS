<?php
  $data = json_decode($_GET['data']);
  $no_gud_in  = str_replace('"','', json_encode($data->vGudBarangIn_no));
  $tgl        = str_replace('"','', json_encode($data->vGudBarangIn_tgl));
  $kd_vendor  = str_replace('"','', json_encode($data->vGudBarangIn_kdvendor));
  $vendor     = str_replace('"','', json_encode($data->vGudBarangIn_nama));
  $posting    = str_replace('"','', json_encode($data->vGudBarangIn_posting));
  $tglbuat    = date_format(date_create($tgl), 'Y-m-d'); //FORMAT d-M-Y TGL 02-Feb-2023
  $faktur     = str_replace('"','', json_encode($data->vGudBarangIn_faktur));
  $fakturvendor = str_replace('"','', json_encode($data->vGudBarangIn_fakturvendor));
  $npwpvendor   = str_replace('"','', json_encode($data->vGudBarangIn_npwpvendor));
  $acc        = str_replace('"','', json_encode($data->vGudBarangIn_acc));
?>
<section class="content pb-0">
  <div class="container-fluid h-100">
    <div class="row p-1">
      <div class="col-md-4 col-sm-6 col-12 p-1">
        <div class="info-box mb-0">
          <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="90">Tanggal</td>
              <td>:</td>
              <td><input type="date" class="form-control form-control-xs" id="gud_barangIn_tgl"></td>
            </tr>
            <tr>
              <td>No. Penerimaan</td>
              <td>:</td>
              <td>
                <div class="input-group col-sm-12 p-0">
                  <input type="text" class="form-control form-control-xs" id="gud_barangIn_nomor" disabled>
                  <div class="input-group-prepend">
                    <button type="button" class="btn btn-outline-danger btn-xs" onclick="gud_barangIn_hapuspenerimaan()" id="gud_barangIn_btnhapus"><i class="fa fa-trash"></i></button>
                  </div>
                </div>
              </td>
            </tr>
          </table>
        </div>
      </div>
      
      <div class="col-md-8 col-sm-6 col-12 p-1">
        <div class="info-box mb-0">
          <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="70">PBF</td>
              <td>:</td>
              <td><select class="form-control form-control-xs" id="gud_barangIn_vendor"></select></td>
              <td>Faktur Vendor</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="gud_barangIn_fakturvendor"></td>
            </tr>
            <tr>
              <td>No. Faktur</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="gud_barangIn_faktur"></td>
              <td>NPWP</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="gud_barangIn_npwp"></td>
            </tr>
          </table>
        </div>
      </div>

    </div>
    <div class="card card-row">
      <div class="overlay-wrapper" id="gud_barangIn_loading">
        <div class="overlay dark">
          <i class="fas fa-3x fa-sync-alt fa-spin"></i>
        </div>
      </div>

      <div class="card-header p-1 darkgrey-custom">
        <!-- <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="gud_barangIn_hometable()" id="gud_barangIn_obat"><i class="fa fa-plus"></i> Tambah Obat</button> -->
        <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="gud_barangIn_delROw('gud_barangIn_tableentry')" id="gud_barangIn_delROw"><i class="fa fa-times"></i> Hapus Obat</button>
        <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="gud_barangIn_save()" id="gud_barangIn_simpan"><i class="fa fa-save"></i> Simpan</button>
        <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="gud_barangIn_pos()" id="gud_barangIn_posting"><i class="fa fa-arrow-right"></i> Posting</button>
        <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="cetakPenerimaanGudBarang()" id="gud_barangIn_print"><i class="fa fa-print"></i> Cetak Penerimaan</button>
        <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="gud_barangIn_unpos()" id="gud_barangIn_unposting" disabled><i class="fa fa-arrow-left"></i> UnPosting</button>
        <button type="button" class="btn btn-outline-danger btn-xs" onclick="gud_barangIn_back()"><i class="fa fa-arrow-left"></i> Kembali</button>
        <button type="button" class="btn btn-danger btn-xs" onclick="gud_barangIn_acc()" style="display: none;" id="gud_barangIn_acc"><i class="fa fa-check"></i> ACC Penerimaan</button>
      </div>

      <div class="modal-body p-1">
        <div class="card-body p-0">
          
          <div class="col-sm-12 p-0 uk-layar" style="height: 70vh; max-height: 70vh; overflow-x: hidden;">
            
            <table class="table table-striped table-sm choose" style="border-collapse: inherit;">
              <thead>
                <tr>
                  <!-- <th class="pl-0" width="30" style="text-align:center;">#</th> -->
                  <th class="pl-0" width="20">Act</th>
                  <th width="50">Kd. Obat</th>
                  <th width="120">Nm. Obat</th>
                  <th width="40" style="text-align:center;" title="Satuan Besar">Sat B</th>
                  <th width="40" style="text-align:center;" >Qty B</th>
                  <th width="40" style="text-align:center;" title="Fraction">Frac</th>
                  <th width="60" style="text-align:center;">Harga</th>
                  <th width="40" style="text-align:center;">Qty K</th>
                  <th width="40" style="text-align:center;">Disc%</th>
                  <th width="70" style="text-align:center;">Disc Rp.</th>
                  <th width="40" style="text-align:center;">PPn%</th>
                  <th width="70" style="text-align:center;">Jumlah</th>
                  <th width="20" title="Wajib diisi">Expired</th>
                  <th width="50" style="text-align:center;">Batch</th>
                  <th width="80" style="text-align:center;">Pabrik</th>
                  <th width="90" style="text-align:center;" title="HNA+PPn-Disc%">Total</th>
                  <!-- <th width="30" style="text-align:center;">PPN_Rp</th>
                  <th width="30" style="text-align:center;">HrgaSat</th> -->
                </tr>
              </thead>
              <!-- <tbody></tbody> -->
              <tbody id="gud_barangIn_tableentry">
                <!-- <tr onclick="onclick_cekbox()">
                  <td class='pl-0'>
                    <input style='text-align:center;' type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_urut[]'disabled>
                  </td>
                  <td><input type='checkbox' name='gud_barangIn_hometable_check[]'/></td>
                  <td>
                    <input type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_kdobat[]'>
                  </td>
                  <td>
                    <input type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_nmobat[]'>
                  </td>
                  <td>
                    <input type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_satB[]'>
                  </td>
                  <td>
                    <input type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_qtyB[]'>
                  </td>
                  <td>
                    <input type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_frac[]'>
                  </td>
                  <td>
                    <input type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_harga[]'>
                  </td>
                  <td>
                    <input type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_qty[]'>
                  </td>
                  <td>
                    <input type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_jmlh[]'>
                  </td>
                  <td>
                    <input type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_ppn[]'>
                  </td>
                  <td>
                    <input type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_subtotal[]'>
                  </td>
                  <td>
                    <input type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_expired[]'>
                  </td>
                  <td>
                    <input type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_batch[]'>
                  </td>
                  <td>
                    <input type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_pabrik[]'>
                  </td>
                </tr> -->
                <!-- <tr>
                    <td><input name="chk_a[]" type="checkbox" class="checkall_a" value=""/></td>
                    <td>
                        <div class="form-group">
                        <input type="text" class="form-control" required="required" name="nama[]" placeholder="Nama satuan">
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                        <input type="text" class="form-control" name="keterangan[]" placeholder="Keterangan satuan">
                        </div>
                    </td>
                </tr> -->
              </tbody>
              <tfoot style="background-color: #a8d4da; color: black;">
                <tr>
                  <td colspan="3" class="pl-0 pr-0 pt-2">
                    <input type='search' class='form-control form-control-xxs' id='gud_barangIn_tfoot_nmobat' placeholder="Pencarian Obat" autocomplete="off">
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='text' class='form-control form-control-xxs' id='gud_barangIn_tfoot_satB' readonly>
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type="number" placeholder="1.00" step="0.01" min="0" max="10" class='form-control form-control-xxs' id='gud_barangIn_tfoot_qtyB' value="1">
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='number' class='form-control form-control-xxs' id='gud_barangIn_tfoot_frac' value="0">
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='number' class='form-control form-control-xxs' id='gud_barangIn_tfoot_harga' value="0">
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='number' class='form-control form-control-xxs' id='gud_barangIn_tfoot_qty' value="0">
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='number' class='form-control form-control-xxs' id='gud_barangIn_tfoot_disc' placeholder="0.00" step="0.01" min="0" max="100">
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='number' class='form-control form-control-xxs' id='gud_barangIn_tfoot_discrp' placeholder="0.00" step="0.01" min="0" readonly>
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='number' class='form-control form-control-xxs' id='gud_barangIn_tfoot_ppn' value="11" placeholder="0.00" step="0.01" min="0" max="100">
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='number' class='form-control form-control-xxs pr-0' id='gud_barangIn_tfoot_jmlh' value="0" disabled>
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='date' class='form-control form-control-xxs' id='gud_barangIn_tfoot_exp'>
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='text' class='form-control form-control-xxs' id='gud_barangIn_tfoot_batch' placeholder="No. Batch">
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='text' class='form-control form-control-xxs' id='gud_barangIn_tfoot_pabrik' placeholder="Pabrik">
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='number' class='form-control form-control-xxs pr-0' id='gud_barangIn_tfoot_subtotal' value="0" disabled>
                  </td>
                  <td class="pl-0 pr-0 pt-2" width="50" style='display: none;'>
                    <input type='number' class='form-control form-control-xxs pr-0' id='gud_barangIn_tfoot_ppnrp' placeholder="PPNRP" step="0.01" min="0" disabled>
                  </td>
                  <td class="pl-0 pr-0 pt-2" width="50" style='display: none;'>
                    <input type='text' class='form-control form-control-xxs pr-0' id='gud_barangIn_tfoot_hargasatuan' placeholder="HRGASAT" disabled>
                  </td>
                </tr>
                <tr>
                  <td colspan="11" class="pl-0 pr-0" style="text-align: -webkit-right;">
                    <div class="input-group col-sm-4 pl-0 pr-0">
                      <div class="input-group-prepend">
                        <span class="input-group-text form-control-xs">Disc(-) : </span>
                      </div>
                      <input type="number" class="form-control form-control-xxs" id="gud_barangIn_tfoot_GrandDisc" style='text-align: right;' readonly>
                    </div>
                  </td>
                  <td>&nbsp;</td>
                  <td colspan="4" class="pl-0 pr-0" style="text-align: -webkit-right;">
                    <div class="input-group col-sm-auto pl-0 pr-0">
                      <div class="input-group-prepend">
                        <span class="input-group-text form-control-xs">PPN(+) : </span>
                      </div>
                      <input type="number" class="form-control form-control-xxs" id="gud_barangIn_tfoot_GrandPPN" style='text-align: right;' readonly>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td colspan="11" class="pl-0 pr-1" style="text-align: -webkit-right;">
                    <div class="input-group col-sm-4 pr-0" style="display: none;">
                      <div class="input-group-prepend">
                        <span class="input-group-text form-control-xs">Grand Jumlah : </span>
                      </div>
                      <input type="number" class="form-control form-control-xxs" id="gud_barangIn_tfoot_GrandSubTotal" value="0" style='text-align: right;' readonly>
                    </div>
                    <h6 id="Vgud_barangIn_tfoot_GrandSubTotal">Sub Jumlah : Rp. 0</h6>
                  </td>
                  <td colspan="1">&nbsp;</td>
                  <td colspan="4" class="pl-0 pr-0" style="text-align: -webkit-right;">
                    <div class="input-group col-sm-auto pl-0 pr-0">
                      <div class="input-group-prepend">
                        <span class="input-group-text form-control-xs">Diskon : </span>
                      </div>
                      <input type="number" class="form-control form-control-xxs" id="gud_barangIn_tfoot_DiskonFak" onchange="hitung_diskonperfaktur()" placeholder="0.00" step="0.01" min="0" max="100" style="text-align: right;">
                      <input type="number" class="form-control form-control-xxs" id="gud_barangIn_tfoot_DiskonFakRp" style="text-align: right;" readonly disabled>
                    </div>
                  </td>
                </tr>
                <tr> 
                  <td colspan="16" class="pl-0 pr-1" style="text-align: -webkit-right;">
                    <div class="col-sm-3 pl-0 pr-0" style="display: none;">
                      <input type="number" class="form-control form-control-xxs" id="gud_barangIn_tfoot_GrandTotal" value="0" style='text-align: right;' readonly>
                      <input type="number" class="form-control form-control-xxs" id="gud_barangIn_tfoot_GrandTotalDiskon" value="0" style='text-align: right;' readonly>
                    </div>
                    <h6 id="Vgud_barangIn_tfoot_GrandTotal">Grand Total : Rp. 0</h6>
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
$('.gudangIn').show();
$('#gud_barangIn_loading').hide();

var no_gud_in = "<?php echo $no_gud_in; ?>";
var tglbuat   = "<?php echo $tglbuat; ?>";
var kd_vendor = "<?php echo $kd_vendor; ?>";
var faktur    = "<?php echo $faktur; ?>";
var fakturvendor  = "<?php echo $fakturvendor; ?>";
var npwpvendor    = "<?php echo $npwpvendor; ?>";
var posting   = "<?php echo $posting; ?>";
var acc       = "<?php echo $acc; ?>";

var flag;
document.getElementById('gud_barangIn_nomor').value = no_gud_in;

var kd_obatauto;
var kd_pabrikauto;
gud_barangIn_pbf();
var maxdate = "gud_barangIn_tgl";
max_date(maxdate);

gud_barangIn_pencarianobat();
gud_barangIn_pencarianpabrik(kd_vendor);

if (document.getElementById('gud_barangIn_nomor').value == ''){
  document.getElementById('gud_barangIn_tgl').value = nowday;
  flag = false;
  gud_barangIn_OlahInput(flag);
  document.getElementById('gud_barangIn_unposting').disabled    = true;
  document.getElementById('gud_barangIn_btnhapus').disabled     = true;
  cekAccJurnal();
}else{
  gud_barangIn_showdataDetail(no_gud_in);
  document.getElementById('gud_barangIn_tgl').value     = tglbuat;
  document.getElementById('gud_barangIn_faktur').value  = faktur;
  document.getElementById("gud_barangIn_fakturvendor").value  = fakturvendor;
  document.getElementById("gud_barangIn_npwp").value          = npwpvendor;

  if (posting == 't'){ //SUDAH DIPOSTING
    flag = true;
    gud_barangIn_OlahInput(flag);
    document.getElementById('gud_barangIn_unposting').disabled    = false;
    document.getElementById('gud_barangIn_btnhapus').disabled     = flag;
  }else{
    flag = false;
    gud_barangIn_OlahInput(flag);
    document.getElementById('gud_barangIn_unposting').disabled    = true;
    document.getElementById('gud_barangIn_btnhapus').disabled     = flag;
  }

  cekAccJurnal();

  if (acc == 't'){ //SUDAH DIACC
    flag = true;
    gud_barangIn_OlahInput(flag);
    document.getElementById("gud_barangIn_acc").disabled          = flag;
    document.getElementById("gud_barangIn_simpan").disabled       = flag;
    document.getElementById("gud_barangIn_posting").disabled      = flag;
    document.getElementById("gud_barangIn_tfoot_nmobat").disabled = flag;
    document.getElementById("gud_barangIn_delROw").disabled       = flag;
    document.getElementById('gud_barangIn_unposting').disabled    = flag;
  }

}

function gud_barangIn_showdataDetail(no_gud_in){
  var param = {
    iduser      : user['id_user'],
    no_gud_in   : no_gud_in
  };

  apiPOST('Gudang/gud_barangIn_showdataDetail', param, hasil => {
    if (hasil !== null) {
      var list = hasil['data'];
      for (var i = 0; i < list.length; i++) {
        var harga_beli = parseFloat(list[i]['harga_beli']);
        var kd_obat   = list[i]['kd_obat'];
        var nm_obat   = list[i]['nama_obat'].toUpperCase();
        var satB      = list[i]['kd_sat_besar'];
        var qtyB      = list[i]['boxqty'];
        var frac      = list[i]['frac'];
        var harga     = list[i]['hrg_beli_obt'];
        var hargaSat  = list[i]['hrg_satuan'];
        var qty       = list[i]['jml_in_obt'];
        var disc      = list[i]['disc'];
        var discrp    = list[i]['disc_rupiah'];
        let jmlh      = 0;
        var ppn       = list[i]['ppn_item'];
        var ppnrp     = list[i]['ppn_rupiah'];
        let subtotal  = 0;
        var exp       = list[i]['exp'];
        var batch     = list[i]['batch'];
        var kd_pabrik = list[i]['kd_pabrik'];
        var pabrik    = list[i]['pabrik'];
        var discFak   = list[i]['discfak'];
        var disc_total= list[i]['disc_total'];

        // var ppn       = 0;
        // let ppnrp     = 0;

        //jmlh     = parseFloat(qtyB) * parseFloat(harga); // DIKALI HARGA BELI  x Qty Besar
        //jmlh     = parseFloat(qtyB) * parseFloat(hargaSat); //DIKALI HARGA SATUAN x Qty Besar
        jmlh       = parseFloat(qty) * parseFloat(harga); // DIKALI HARGA BELI x Qty KEcil

        //ppnrp = (parseFloat(jmlh) * parseFloat(ppn)) / 100;
        //let totHNAPPN  = parseFloat(hargaSat) + ppnrp; //DiJUMLAH HARGA SATUAN
        //let totHNAPPN  = parseFloat(harga) + parseFloat(ppnrp); //DiJUMLAH HARGA BELI
        let totHNAPPN  = parseFloat(jmlh) + parseFloat(ppnrp); //DiJUMLAH HARGA BELI
        //value_disc   = totHNAPPN * parseFloat(getdisc)/100;
        subtotal       = (parseFloat(totHNAPPN) - parseFloat(discrp)).toFixed(2);

        document.getElementById('gud_barangIn_tfoot_DiskonFak').value   = discFak;
        document.getElementById('gud_barangIn_tfoot_DiskonFakRp').value = disc_total;

        if (satB == null){
          satB = '-';
        }else{
          satB = list[i]['kd_sat_besar'];
        }
        replace(kd_obat, nm_obat, satB, qtyB, frac, harga, qty, disc, discrp, jmlh, ppn, subtotal, exp, batch, kd_pabrik, ppnrp, hargaSat);
      }
    }
  });
}

function gud_barangIn_OlahInput(flag){
  document.getElementById('gud_barangIn_tfoot_nmobat').disabled = flag;
  document.getElementById('gud_barangIn_tfoot_qtyB').disabled   = flag;
  document.getElementById('gud_barangIn_tfoot_frac').disabled   = flag;
  document.getElementById('gud_barangIn_tfoot_harga').disabled  = flag;
  document.getElementById('gud_barangIn_tfoot_qty').disabled    = flag;
  document.getElementById('gud_barangIn_tfoot_disc').disabled   = flag;
  document.getElementById('gud_barangIn_tfoot_discrp').disabled = flag;
  document.getElementById('gud_barangIn_tfoot_ppn').disabled    = flag;
  document.getElementById('gud_barangIn_tfoot_exp').disabled    = flag;
  document.getElementById('gud_barangIn_tfoot_batch').disabled  = flag;
  document.getElementById('gud_barangIn_tfoot_pabrik').disabled = flag;
  document.getElementById('gud_barangIn_simpan').disabled       = flag;
  document.getElementById('gud_barangIn_posting').disabled      = flag;
 
  kd_obatauto.onPilih(()=>{
    var kd_obat = kd_obatauto.getValue();
    var nm_obat     = $('#gud_barangIn_tfoot_nmobat').val();
    var arrnm_obat  = nm_obat.split('<br>Satuan Besar : ');
    var arrnm_obat2 = arrnm_obat[1].split(' , Fraction : ');
    var arrnamaobat = arrnm_obat[0];
    var arrsatBesar = arrnm_obat2[0];
    var arrFraction = arrnm_obat2[1];
    
    $('#gud_barangIn_tfoot_nmobat').val(arrnamaobat);
    gud_barangIn_hargaObat(kd_obat);
    if (arrsatBesar != 'null'){
      $('#gud_barangIn_tfoot_satB').val(arrsatBesar);
    }else{
      $('#gud_barangIn_tfoot_satB').val('-');
    }
    
    $('#gud_barangIn_tfoot_frac').val(arrFraction);
    $('#gud_barangIn_tfoot_qtyB').trigger('focus');
  });

  $("#gud_barangIn_tfoot_satB").on( "keydown", function(e) {
    switch(event.which){      
      case 13:
        $('#gud_barangIn_tfoot_qtyB').trigger('focus');
        break;
    }
  });

  $("#gud_barangIn_tfoot_qtyB").on( "keydown", function(e) {
    switch(event.which){      
      case 13:
        $('#gud_barangIn_tfoot_frac').trigger('focus');
        break;
    }
  });

  $("#gud_barangIn_tfoot_frac").on( "keydown", function(e) {
    switch(event.which){      
      case 13:

        var frac    = $(this).val();
        var qtyB    = $('#gud_barangIn_tfoot_qtyB').val();
        var qtyK    = $('#gud_barangIn_tfoot_qty').val();
        var hrgaSat = $('#gud_barangIn_tfoot_harga').val();
        let qty   = 0;
        let jumlah= 0;
        qty = parseFloat(qtyB) * parseFloat(frac);
        jumlah = parseFloat(qtyK) * parseFloat(hrgaSat);
        $("#gud_barangIn_tfoot_qty").val(qty);
        $("#gud_barangIn_tfoot_jmlh").val(jumlah);

        $('#gud_barangIn_tfoot_harga').trigger('focus');
        break;
    }
  });

  $("#gud_barangIn_tfoot_harga").on( "keydown", function(e) {
    switch(event.which){
      case 13:
        var hrgaSat = $(this).val();        
        var qtyB    = $('#gud_barangIn_tfoot_qtyB').val();
        var qtyK    = $('#gud_barangIn_tfoot_qty').val();
        let jumlah  = 0;
        jumlah = parseFloat(qtyK) * parseFloat(hrgaSat);
        
        $("#gud_barangIn_tfoot_jmlh").val(jumlah);
        hitung_diskon();
        $('#gud_barangIn_tfoot_qty').trigger('focus');
        break;
    }
  });

  $("#gud_barangIn_tfoot_qty").on( "keydown", function(e) {
    switch(event.which){      
      case 13:
        var qtyK = $(this).val();        
        var frac    = $('#gud_barangIn_tfoot_frac').val();
        let qtyB  = 0;
        qtyB = parseFloat(qtyK) / parseFloat(frac);
        
        $("#gud_barangIn_tfoot_qtyB").val(qtyB);

        hitung_diskon();
        $('#gud_barangIn_tfoot_disc').trigger('focus');
        break;
    }
  });

  $("#gud_barangIn_tfoot_disc").on( "keydown", function(e) {
    switch(event.which){      
      case 13:
        hitung_diskon();
        $('#gud_barangIn_tfoot_ppn').trigger('focus');
        break;
    }
  });

  $("#gud_barangIn_tfoot_ppn").on( "keydown", function(e) {
    switch(event.which){      
      case 13:
        // var ppn         = $(this).val();
        // var HNA         = $('#gud_barangIn_tfoot_hargasatuan').val();
        // let HNA_PPN     = 0;
        // let subJumlh    = 0;

        // let discAwal    = $('#gud_barangIn_tfoot_discrp').val();
        // let subDisc     = 0;

        // HNA_PPN = (HNA * ppn)/100;
        // subJumlh = parseFloat(HNA_PPN) - parseFloat(discAwal);
        // $('#gud_barangIn_tfoot_ppnrp').val(HNA_PPN.toFixed(2));
        // $('#gud_barangIn_tfoot_subtotal').val(subJumlh.toFixed(2));
        
        // let GrandPPN  = 0;
        // var getppn    = document.getElementById("gud_barangIn_tfoot_GrandPPN").value;
        // if (getppn == ''){
        //   GrandPPN = parseFloat(HNA_PPN).toFixed(2);
        // }else{
        //   GrandPPN = parseFloat(getppn) + parseFloat(HNA_PPN);
        // }
        
        // document.getElementById("gud_barangIn_tfoot_GrandPPN").value = GrandPPN;

        // var getdisc    = document.getElementById("gud_barangIn_tfoot_GrandDisc").value;
        // if (getdisc == ''){
        //   subDisc = parseFloat(discAwal).toFixed(2);
        // }else{
        //   subDisc = parseFloat(discAwal) + parseFloat(getdisc);
        // }

        // document.getElementById("gud_barangIn_tfoot_GrandDisc").value = subDisc;

        
        hitung_diskon();
        $("#gud_barangIn_tfoot_exp").trigger('focus');
        break;
    }
  });

  $("#gud_barangIn_tfoot_exp").on( "keydown", function(e) {
    switch(event.which){      
      case 13:
        $('#gud_barangIn_tfoot_batch').trigger('focus');
        break;
    }
  });

  $("#gud_barangIn_tfoot_batch").on( "keydown", function(e) {
    switch(event.which){      
      case 13:
        $('#gud_barangIn_tfoot_pabrik').trigger('focus');
        break;
    }
  });

  // $("#gud_barangIn_tfoot_pabrik").on( "keydown", function(e) {
  //   switch(event.which){
  //     case 13:
  //       $('#gud_barangIn_tfoot_ppn').trigger('focus');
  //       break;
  //   }
  // });
  kd_pabrikauto.onPilih(()=>{
    // var kd_obat   = kd_obatauto.getValue();
    // var nm_obat   = $('#gud_barangIn_tfoot_nmobat').val();
    // var satB      = $('#gud_barangIn_tfoot_satB').val();
    // var qtyB      = $('#gud_barangIn_tfoot_qtyB').val();
    // var frac      = $('#gud_barangIn_tfoot_frac').val();
    // var harga     = $('#gud_barangIn_tfoot_harga').val();
    // var qty       = $('#gud_barangIn_tfoot_qty').val();
    // var disc      = $('#gud_barangIn_tfoot_disc').val();
    // var discrp    = $('#gud_barangIn_tfoot_discrp').val();
    // var jmlh      = $('#gud_barangIn_tfoot_jmlh').val();
    // var ppn       = $('#gud_barangIn_tfoot_ppn').val();
    // var subtotal  = $('#gud_barangIn_tfoot_subtotal').val();
    // var exp       = $('#gud_barangIn_tfoot_exp').val();
    // var batch     = $('#gud_barangIn_tfoot_batch').val();
    // var kd_pabrik = kd_pabrikauto.getValue();
    // var pabrik    = $('#gud_barangIn_tfoot_pabrik').val();

    // //console.log(kd_obat, pabrik);
    // if (kd_obat != null){
    //   if (pabrik != null){
    //     replace(kd_obat, nm_obat, satB, qtyB, frac, harga, qty, disc, discrp, jmlh, ppn, subtotal, exp, batch, kd_pabrik);
    //   }else{
    //     toastr.error("Pabrik tidak ditemukan!!");
    //   }
    // }else{
    //   toastr.error("Nama obat tidak ditemukan!!");
    // }

    //$('#gud_barangIn_tfoot_nmobat').val('');
    //$('#gud_barangIn_tfoot_nmobat').trigger('focus');
    gud_barangIn_next();

    $('#gud_barangIn_tfoot_pabrik').blur();
  });

  

}

function hitung_diskonLAMA(){
  //DISKON = (HNA + PPN) * diskon
  // var getHNA   = $('#gud_barangIn_tfoot_harga').val(); // HARGA BELI
  //var getHNA   = $('#gud_barangIn_tfoot_hargasatuan').val(); // HARGA SATUAN
  var getHNA   = $('#gud_barangIn_tfoot_jmlh').val();

  var getPPN   = $('#gud_barangIn_tfoot_ppn').val();
  var getdisc  = $('#gud_barangIn_tfoot_disc').val();
  if (getdisc > 0){
    getdisc  = $('#gud_barangIn_tfoot_disc').val();
  }else{
    getdisc  = 0;
  }

  if (getPPN > 0){
    getPPN  = $('#gud_barangIn_tfoot_ppn').val();
  }else{
    getPPN  = 0;
  }

  let value_hnappn  = 0;
  let value_disc    = 0;
  let subJumlh      = 0;
  let totHNAPPN     = 0;
  value_hnappn  = (parseFloat(getHNA) * parseFloat(getPPN)) / 100;
  totHNAPPN     = parseFloat(getHNA) + parseFloat(value_hnappn);
  value_disc    = totHNAPPN * parseFloat(getdisc)/100;
  subJumlh      = totHNAPPN - value_disc;
  $('#gud_barangIn_tfoot_ppnrp').val(value_hnappn.toFixed(2));
  $('#gud_barangIn_tfoot_subtotal').val(subJumlh.toFixed(2));
  $('#gud_barangIn_tfoot_discrp').val(value_disc.toFixed(2));
  // console.log(value_hnappn);
  // console.log(totHNAPPN);
  // console.log(value_disc);
  // console.log(subJumlh);

}

function hitung_diskon(){
  //DISKON = (HNA + PPN) * diskon
  // var getHNA   = $('#gud_barangIn_tfoot_harga').val(); // HARGA BELI
  //var getHNA   = $('#gud_barangIn_tfoot_hargasatuan').val(); // HARGA SATUAN
  var getQtyK     = $('#gud_barangIn_tfoot_qty').val();
  var getHargaSat = $('#gud_barangIn_tfoot_harga').val();

  //STEP 1
  var hasilnya    = 0;
  hasilnya = (parseFloat(getQtyK) * parseFloat(getHargaSat));

  var hasil_kenadisc = 0;
  var getdisc  = $('#gud_barangIn_tfoot_disc').val();
  if (getdisc > 0){
    getdisc  = $('#gud_barangIn_tfoot_disc').val();
  }else{
    getdisc  = 0;
  }
  //STEP 2
  hasil_kenadisc  = hasilnya * parseFloat(getdisc)/100;
  //STEP 3
  var hasilbaru   = 0;  
  hasilbaru       = hasilnya - hasil_kenadisc;
  
  var getPPN   = $('#gud_barangIn_tfoot_ppn').val(); 
  if (getPPN > 0){
    getPPN  = $('#gud_barangIn_tfoot_ppn').val();
  }else{
    getPPN  = 0;
  }

  //STEP 4
  var hasil_kenappn = 0;
  hasil_kenappn = (hasilbaru * parseFloat(getPPN)) / 100;
  //STEP 5
  var hasil_akhir = 0;
  hasil_akhir = Math.round(hasilbaru + hasil_kenappn);

  // var getHNA   = $('#gud_barangIn_tfoot_jmlh').val();
  

  // let value_hnappn  = 0;
  // let value_disc    = 0;
  // let subJumlh      = 0;
  // let totHNAPPN     = 0;
  // value_disc    = totHNAPPN * parseFloat(getdisc)/100;

  // value_hnappn  = (parseFloat(getHNA) * parseFloat(getPPN)) / 100;
  // totHNAPPN     = parseFloat(getHNA) + parseFloat(value_hnappn);
  
  // subJumlh      = totHNAPPN - value_disc;
  $("#gud_barangIn_tfoot_jmlh").val(hasilnya)
  $('#gud_barangIn_tfoot_ppnrp').val(hasil_kenappn.toFixed(2));
  $('#gud_barangIn_tfoot_subtotal').val(hasil_akhir.toFixed(2));
  $('#gud_barangIn_tfoot_discrp').val(hasil_kenadisc.toFixed(2));
  // console.log(value_hnappn);
  // console.log(totHNAPPN);
  // console.log(value_disc);
  // console.log(subJumlh);

}

function hitung_diskonperfaktur(){
  var getSubTotal   = $('#gud_barangIn_tfoot_GrandTotal').val();
  var getdiscFaktur = $('#gud_barangIn_tfoot_DiskonFak').val();
  var jmlObat       = $('#gud_barangIn_tableentry tr').length;
  let value_disc    = 0;
  let subJumlh      = 0;
 
  value_disc    = parseFloat(getSubTotal) * parseFloat(getdiscFaktur)/100;
  subJumlh      = parseFloat(getSubTotal) - value_disc;
  
  document.getElementById("gud_barangIn_tfoot_DiskonFakRp").value       = parseFloat(value_disc.toFixed(2));
  document.getElementById("gud_barangIn_tfoot_GrandTotalDiskon").value  = parseFloat(subJumlh.toFixed(2));
  document.getElementById("Vgud_barangIn_tfoot_GrandTotal").innerHTML   = "Grand Total : Rp. "+numberformat(subJumlh.toFixed(2));

  if (jmlObat == 0){
    $('#gud_barangIn_tfoot_DiskonFak').val(0);
  }
  
  // console.log(value_disc.toFixed(2));
  // console.log(subJumlh.toFixed(2));

}


function gud_barangIn_pbf() {
  apiPOST('Setup/vendor', null, hasil => {
    var data = hasil['data'];
    var ven = '';
      ven += '<option value="0">Semua PBF</option>';
    for (var i = 0; i < data.length; i++) {
      ven += '<option value="'+ data[i]['kd_vendor'] +'">'+ data[i]['nama']+'</option>';
    }
    document.getElementById('gud_barangIn_vendor').innerHTML = ven;
  });
}

function gud_barangIn_next(){
  var kd_obat   = kd_obatauto.getValue();
  var nm_obat   = $('#gud_barangIn_tfoot_nmobat').val();
  var satB      = $('#gud_barangIn_tfoot_satB').val();
  var qtyB      = $('#gud_barangIn_tfoot_qtyB').val();
  var frac      = $('#gud_barangIn_tfoot_frac').val();
  var harga     = $('#gud_barangIn_tfoot_harga').val();
  var hargaSat  = $('#gud_barangIn_tfoot_hargasatuan').val();
  var qty       = $('#gud_barangIn_tfoot_qty').val();
  var disc      = $('#gud_barangIn_tfoot_disc').val();
  var discrp    = $('#gud_barangIn_tfoot_discrp').val();
  var jmlh      = $('#gud_barangIn_tfoot_jmlh').val();
  var ppn       = $('#gud_barangIn_tfoot_ppn').val();
  var ppnrp     = $('#gud_barangIn_tfoot_ppnrp').val();
  var subtotal  = $('#gud_barangIn_tfoot_subtotal').val();
  var exp       = $('#gud_barangIn_tfoot_exp').val();
  var batch     = $('#gud_barangIn_tfoot_batch').val();
  var kd_pabrik = kd_pabrikauto.getValue();
  var pabrik    = $('#gud_barangIn_tfoot_pabrik').val();

  if (kd_obat != null){
    if (qtyB == ''){
      toastr.error("Qty Besar masih kosong!!");
    }else if(frac == ''){
      toastr.error("Fraction masih kosong!!");
    }else if(harga == ''){
      toastr.error("Harga masih kosong!!");
    }else if(qty == ''){
      toastr.error("Qty Kecil masih kosong!!");
    }else if(jmlh == ''){
      toastr.error("Jumlah Total masih kosong!!");
    }else if(ppn == ''){
      toastr.error("PPn masih kosong!!");
    }else if(exp == ''){
      toastr.error("Expired masih kosong!!");
    }else if(batch == ''){
      toastr.error("Batch masih kosong!!");
    }else if(kd_pabrik == null){
      toastr.error("Pabrik masih kosong!!");
    }else{
      //console.log(kd_obat, nm_obat, satB, qtyB, frac, harga, qty, disc, discrp, jmlh, ppn, subtotal, exp, batch, kd_pabrik);
      replace(kd_obat, nm_obat, satB, qtyB, frac, harga, qty, disc, discrp, jmlh, ppn, subtotal, exp, batch, kd_pabrik, ppnrp, hargaSat);
    }
  }else{
    toastr.error("Nama obat tidak ditemukan!!");
  }
  
}
function gud_barangIn_emptyRow(){
  kd_obatauto.reset();
  document.getElementById('gud_barangIn_tfoot_satB').value      = "";
  document.getElementById('gud_barangIn_tfoot_qtyB').value      = "1";
  document.getElementById('gud_barangIn_tfoot_frac').value      = "0";
  document.getElementById('gud_barangIn_tfoot_harga').value     = "0";
  document.getElementById('gud_barangIn_tfoot_qty').value       = "0";
  document.getElementById('gud_barangIn_tfoot_disc').value      = "";
  document.getElementById('gud_barangIn_tfoot_discrp').value    = "";
  document.getElementById('gud_barangIn_tfoot_jmlh').value      = "0";
  document.getElementById('gud_barangIn_tfoot_ppn').value       = "11";
  document.getElementById('gud_barangIn_tfoot_ppnrp').value     = "";
  document.getElementById('gud_barangIn_tfoot_subtotal').value  = "0";
  document.getElementById('gud_barangIn_tfoot_exp').value       = "";
  document.getElementById('gud_barangIn_tfoot_batch').value     = "";
  document.getElementById('gud_barangIn_tfoot_hargasatuan').value = "";

  kd_pabrikauto.reset();
  setTimeout(gud_barangIn_refresh, 500);
}

function gud_barangIn_refresh(){
  document.getElementById('gud_barangIn_tfoot_nmobat').focus();
}

function gud_barangIn_hargaObat(kd_obat){
  var param = {
    iduser  : user['id_user'],
    kdobat  : kd_obat
  };

  apiPOST('Gudang/gud_barangIn_hargaObat', param, hasil => {
    if (hasil !== null) {
      var list = hasil['data'];
      for (var i = 0; i < list.length; i++) {
        var harga_beli = parseFloat(list[i]['harga_beli']);
        $('#gud_barangIn_tfoot_harga').val(harga_beli);
        $('#gud_barangIn_tfoot_hargasatuan').val(harga_beli);
      }
    }
  });
}

function gud_barangIn_pencarianobat(){
  $('#gud_barangIn_tfoot_nmobat').trigger('focus');
  var param = {
    obatcari: '',
  };

  kd_obatauto = new AutoComplete("gud_barangIn_tfoot_nmobat");
  apiPOST('Apotek/getObat_eresep', param, hasil => {
    if (hasil !== null) {
      var list = hasil['data'];
      list.forEach(baru => {
        kd_obatauto.addData(baru['kd_obat'], baru['nama_obat']+'<br>Satuan Besar : '+baru['kd_sat_besar']+' , Fraction : '+baru['fraction']);
      });
    }
  });
}

function gud_barangIn_pencarianpabrik(){
  
  kd_pabrikauto = new AutoComplete("gud_barangIn_tfoot_pabrik");
  apiPOST('Setup/Pabrik', null, hasil => {
    if (hasil !== null) {
      var pab = hasil['data'];
      pab.forEach(baru => {
        kd_pabrikauto.addData(baru['kd_pabrik'], baru['pabrik']);
      });
    }
    if (kd_vendor > 0){
      document.getElementById('gud_barangIn_vendor').value  = kd_vendor;
    }
    
  });
}


//data += "<td style='display: flex;'><button type='button' class='btn btn-xs btn-danger' onclick='' id='gud_barangIn_hometable_hapus" + nomor + "' style='width:100%'><i class='fa fa-times'></i></button></td>"; // 2
/*function gud_barangIn_hometable(){
  
  var nomor = $('#gud_barangIn_tableentry tbody tr').length + 1;  
  
  var data = '';
      data += "<tr disabled>";
      data += "<td class='pl-0'>";
      data += "<input style='text-align:center;' type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_urut[]' value='" + nomor + "'>";
      data += "</td>"; // 1
      data += "<td><input type='checkbox' name='gud_barangIn_hometable_check[]' class='form-control form-control-xs'/></td>"; //2
      data += "<td>";
      //data += "<input type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_kdobat[]' id='gud_barangIn_hometable_kdobat" + nomor + "' disabled>";
      data += "</td>"; //3
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_nmobat[]' id='gud_barangIn_hometable_nmobat" + nomor + "'>"; //onchange='gud_barangIn_pencarianobat("+'"'+nomor+'"'+");'
      data += "</td>"; //4
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_satB[]' id='gud_barangIn_hometable_satB" + nomor + "'>";
      data += "</td>"; //5
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_qtyB[]'>";
      data += "</td>"; //6
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_frac[]'>";
      data += "</td>"; //7
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_harga[]'>";
      data += "</td>"; //8
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_qty[]'>";
      data += "</td>"; //9
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_disc[]'>";
      data += "</td>"; //10
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_discrp[]'>";
      data += "</td>"; //11
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_jmlh[]'>";
      data += "</td>"; //12
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_ppn[]'>";
      data += "</td>"; //13
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_subtotal[]'>";
      data += "</td>"; //14
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_expired[]'>";
      data += "</td>"; //15
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_batch[]'>";
      data += "</td>"; //16
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_pabrik[]'>";
      data += "</td>"; //17
      data += "</tr>";

  $('#gud_barangIn_tableentry tbody').append(data);
  var kd_obat = 'gud_barangIn_hometable_kdobat'+nomor;
  // var nm_obat = $('#gud_barangIn_hometable_nmobat'+nomor).val();
 
  var table = document.getElementById('gud_barangIn_tableentry');
  //table.rows[0].cells[3].innerHTML = "<input style='text-align:center;' type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_urut[]' value='" + nomor + "' disabled>";
  //gud_barangIn_pencarianobat(kd_obat, nm_obat);
  //table.find('td:nth-child(3) input').focus();
  //table.rows[0].cells[3].focus();
  //document.getElementById("gud_barangIn_tableentry").rows[0].cells[3].focus();

  var no = 1;
  $('#gud_barangIn_tableentry tbody tr').each(function() {
    $(this).find('td:nth-child(4) input').focus();
    no++;
  });

  gud_barangIn_pencarianobat(nomor);
  kd_obatauto.onPilih(()=>{
    var kd_obat  = kd_obatauto.getValue();
    //$('#gud_barangIn_hometable_kdobat'+nomor).val(kd_obat);
    $(this).find('td:nth-child(3)').html(kd_obat);
    $('#gud_barangIn_hometable_nmobat'+nomor).attr('disabled','disabled');
    $('#gud_barangIn_hometable_satB'+nomor).trigger('focus');

  });

  $("#gud_barangIn_hometable_satB"+nomor).on( "change", function() {
    
  });

}*/
/*
function addRow(tableID) {
  var table = document.getElementById(tableID);
  var rowCount = table.rows.length;
  var row = table.insertRow(rowCount);
  var colCount = table.rows[0].cells.length;
  console.log(rowCount);
  console.log(colCount);
  //console.log(table.rowIndex);
  var nomor = rowCount + 1;

  for (var i = 0; i < colCount; i++) {
    console.log(i);
    var newcell = row.insertCell(i);
    newcell.innerHTML = table.rows[0].cells[i].innerHTML;
    //table.rows[nomor].cells[0].innerHTML = nomor;
    var child = newcell.children;
    for (var i2 = 0; i2 < child.length; i2++) {
      var test = newcell.children[i2].tagName;
      switch (test) {
        case "INPUT":
          if (newcell.children[i2].type == "checkbox") {
            newcell.children[i2].value = "";
            newcell.children[i2].checked = false;
          } else {
            newcell.children[i2].value = "";
          }
          break;
        case "SELECT":
          newcell.children[i2].value = "";
          break;
        default:
          break;
      }
    }
  }
}
*/

function gud_barangIn_delROw(tableID) {
  try {
    var table = document.getElementById(tableID);
    var rowCount = table.rows.length;
    //console.log(rowCount);
    for (var i = 0; i < rowCount; i++) {
      var row = table.rows[i];
      var chkbox = row.cells[0].childNodes[0];
      if (null != chkbox && true == chkbox.checked) {
        if (rowCount <= 0) {
          toastr.error("Tidak dapat Obat yang di Hapus!!");
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

  let xtotalDisc  = 0;
  let xtotalPPN   = 0;
  let xtotalJuml  = 0;
  let xtotalSubT  = 0;
  var getDiscRP   = document.getElementsByName('gud_barangIn_hometable_discrp[]');
  var getPPNRP    = document.getElementsByName('gud_barangIn_hometable_ppnrp[]');
  var getJumlh    = document.getElementsByName('gud_barangIn_hometable_jmlh[]');
  var getSubTot   = document.getElementsByName('gud_barangIn_hometable_subtotal[]');

  var jmlObat = $('#gud_barangIn_tableentry tr').length;
  var i;
  for (i = 0; i < jmlObat; i++) {
  //for(var i = 0, iLen = jmlObat ; i < iLen; i++){  
    let discRp  = getDiscRP[i].value;
    let ppnRp   = getPPNRP[i].value;
    let jmlhRp  = getJumlh[i].value;
    let subToRp = getSubTot[i].value;
    xtotalDisc  += Number(discRp);
    xtotalPPN   += Number(ppnRp);
    xtotalJuml  += Number(jmlhRp);
    xtotalSubT  += Number(subToRp);
  }

  // console.log(jmlObat);
  // console.log(xtotalDisc);
  // console.log(xtotalPPN);
  // console.log(xtotalJuml);
  // console.log(xtotalSubT);

  document.getElementById("gud_barangIn_tfoot_GrandTotal").value     = parseFloat(xtotalSubT);
  document.getElementById("gud_barangIn_tfoot_GrandSubTotal").value  = parseFloat(xtotalJuml);

  document.getElementById("Vgud_barangIn_tfoot_GrandTotal").innerHTML = "Grand Total : Rp. "+numberformat(xtotalSubT);
  document.getElementById("Vgud_barangIn_tfoot_GrandSubTotal").innerHTML = "Sub Jumlah : Rp. "+numberformat(xtotalJuml);
  document.getElementById("gud_barangIn_tfoot_GrandPPN").value  = parseFloat(xtotalPPN).toFixed(2);
  document.getElementById("gud_barangIn_tfoot_GrandDisc").value = parseFloat(xtotalDisc).toFixed(2);
  hitung_diskonperfaktur();
}

function replace(kd_obat, nm_obat, satB, qtyB, frac, harga, qty, disc, discrp, jmlh, ppn, subtotal, exp, batch, kd_pabrik, ppnrp, hargaSat){
  // $('#gud_barangIn_tfoot_nmobat').trigger('focus');
  var data = '';
      data += "<tr>";
      data += "<td class='pl-0' style='text-align:center;'><input type='checkbox' name='gud_barangIn_hometable_check[]' class='form-control-xs'/></td>"; //1
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_kdobat[]' value='" + kd_obat + "'  disabled>";
      data += "</td>"; //2 
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_nmobat[]' value='" + nm_obat + "' disabled>";
      data += "</td>"; //3
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_satB[]' value='" + satB + "' style='text-align: center;' disabled>";
      data += "</td>"; //4
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_qtyB[]' value='" + qtyB + "' style='text-align: center;' disabled>";
      data += "</td>"; //5
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_frac[]' value='" + frac + "' style='text-align: center;' disabled>";
      data += "</td>"; //6
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_harga[]' value='" + harga + "' style='text-align: right;' disabled>";
      data += "</td>"; //7
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_qty[]' value='" + qty + "' style='text-align: center;' disabled>";
      data += "</td>"; //8
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_disc[]' value='" + disc + "' style='text-align: center;' disabled>";
      data += "</td>"; //9
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_discrp[]' value='" + discrp + "' style='text-align: center;' disabled>";
      data += "</td>"; //10
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_ppn[]' value='" + ppn + "' disabled>";
      data += "</td>"; //11
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_jmlh[]' value='" + jmlh + "' style='text-align: right;' disabled>";
      data += "</td>"; //12
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_expired[]' value='" + exp + "' disabled>";
      data += "</td>"; //13
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_batch[]' value='" + batch + "' disabled>";
      data += "</td>"; //14
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_pabrik[]' value='" + kd_pabrik + "'  disabled>";
      data += "</td>"; //15
      
      data += "<td class='pr-0'>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_subtotal[]' value='" + subtotal + "' style='text-align: right;' disabled>";
      data += "</td>"; //16
      data += "<td class='pr-0' style='display: none;'>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_ppnrp[]' value='" + ppnrp + "' disabled>";
      data += "</td>"; //17
      data += "<td class='pr-0' style='display: none;'>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_hargasatuan[]' value='" + hargaSat + "' disabled>";
      data += "</td>"; //18
      data += "</tr>";

  //$('#gud_barangIn_tableentry').append(data);

  var getkd_obat  = document.getElementsByName('gud_barangIn_hometable_kdobat[]');
  var jmlRow      = $('#gud_barangIn_tableentry tr').length;
  // let Grandtotal  = 0;
  // let Grandjmlah  = 0;
  const count     = [];

  for(var i = 0, iLen = jmlRow ; i < iLen; i++){
    //PROSES ARRAY PENGECEKAN KODE OBAT
    var datax     = {};
    datax.kd_obat = getkd_obat[i].value;
    count.push(datax);
  }
  
  const cekkd_obat = count.map(el => el.kd_obat); // returns ['00007414', '00000019', '00000017']
  const status_kd_obatk = cekkd_obat.includes(kd_obat); // returns true
  
  if (status_kd_obatk == false){
    $('#gud_barangIn_tableentry').append(data);
    // var totalx  = document.getElementById("gud_barangIn_tfoot_GrandTotal").value;
    // var granjml = document.getElementById("gud_barangIn_tfoot_GrandSubTotal").value;

    // Grandtotal = parseFloat(totalx) + parseFloat(subtotal);
    // Grandjmlah = parseFloat(granjml) + parseFloat(jmlh);

    // document.getElementById("gud_barangIn_tfoot_GrandTotal").value     = Grandtotal;
    // document.getElementById("gud_barangIn_tfoot_GrandSubTotal").value  = Grandjmlah;

    // document.getElementById("Vgud_barangIn_tfoot_GrandTotal").innerHTML = "Grand Total : Rp. "+numberformat(Grandtotal);
    // document.getElementById("Vgud_barangIn_tfoot_GrandSubTotal").innerHTML = "Sub Jumlah : Rp. "+numberformat(Grandjmlah);

    proses_penjumlahan(disc, discrp, jmlh, ppn, subtotal, ppnrp);
    // kd_obatauto.reset();
    // kd_pabrikauto.reset();
  }else{
    toastr.error("Obat Sudah Diinputkan!!");
  }

  gud_barangIn_emptyRow();
}

//Model Awal
function proses_penjumlahanXXX(disc, discrp, jmlh, ppn, subtotal, ppnrp){
  //console.log(disc, discrp, jmlh, ppn, subtotal, ppnrp);
  var totalx  = document.getElementById("gud_barangIn_tfoot_GrandTotal").value;
  var granjml = document.getElementById("gud_barangIn_tfoot_GrandSubTotal").value;

  Grandtotal = parseFloat(totalx) + parseFloat(subtotal);
  Grandjmlah = parseFloat(granjml) + parseFloat(jmlh);

  document.getElementById("gud_barangIn_tfoot_GrandTotal").value     = Grandtotal;
  document.getElementById("gud_barangIn_tfoot_GrandSubTotal").value  = Grandjmlah;

  document.getElementById("Vgud_barangIn_tfoot_GrandTotal").innerHTML = "Grand Total : Rp. "+numberformat(Grandtotal.toFixed(2));
  document.getElementById("Vgud_barangIn_tfoot_GrandSubTotal").innerHTML = "Sub Jumlah : Rp. "+numberformat(Grandjmlah.toFixed(2));

  let GrandPPN  = 0;
  var getppn    = document.getElementById("gud_barangIn_tfoot_GrandPPN").value;
  if (getppn == ''){
    GrandPPN = parseFloat(ppnrp);
  }else{
    GrandPPN = parseFloat(getppn) + parseFloat(ppnrp);
  }
  document.getElementById("gud_barangIn_tfoot_GrandPPN").value = GrandPPN.toFixed(2);
  
  let subDisc    = 0;
  var getdisc    = document.getElementById("gud_barangIn_tfoot_GrandDisc").value;
  if (getdisc == ''){
    subDisc = parseFloat(discrp);
  }else{
    subDisc = parseFloat(discrp) + parseFloat(getdisc);
  }

  document.getElementById("gud_barangIn_tfoot_GrandDisc").value = subDisc.toFixed(2);

}

function proses_penjumlahan(disc, discrp, jmlh, ppn, subtotal, ppnrp){
  //console.log(disc, discrp, jmlh, ppn, subtotal, ppnrp);
  var discFak     = document.getElementById('gud_barangIn_tfoot_DiskonFak').value;
  var disc_total  = document.getElementById('gud_barangIn_tfoot_DiskonFakRp').value;
        
  var totalx  = document.getElementById("gud_barangIn_tfoot_GrandTotal").value;
  var granjml = document.getElementById("gud_barangIn_tfoot_GrandSubTotal").value;
  Grandjmlah  = parseFloat(granjml) + parseFloat(jmlh);

  if (discFak > 0){
    Grandtotal = parseFloat(totalx) + parseFloat(subtotal);
    subJumlh   = Grandtotal - parseFloat(disc_total);
    
    document.getElementById("gud_barangIn_tfoot_GrandTotal").value        = Grandtotal.toFixed(2);
    document.getElementById("gud_barangIn_tfoot_GrandTotalDiskon").value  = parseFloat(subJumlh.toFixed(2));
    document.getElementById("Vgud_barangIn_tfoot_GrandTotal").innerHTML   = "Grand Total : Rp. "+numberformat(subJumlh.toFixed(2));
    
  }else{
    Grandtotal = parseFloat(totalx) + parseFloat(subtotal);
    document.getElementById("gud_barangIn_tfoot_GrandTotal").value      = Grandtotal.toFixed(2);
    document.getElementById("Vgud_barangIn_tfoot_GrandTotal").innerHTML = "Grand Total : Rp. "+numberformat(Grandtotal.toFixed(2));
    
  }
  
  document.getElementById("gud_barangIn_tfoot_GrandSubTotal").value       = Grandjmlah.toFixed(2);
  document.getElementById("Vgud_barangIn_tfoot_GrandSubTotal").innerHTML  = "Sub Jumlah : Rp. "+numberformat(Grandjmlah.toFixed(2));

  let GrandPPN  = 0;
  var getppn    = document.getElementById("gud_barangIn_tfoot_GrandPPN").value;
  if (getppn == ''){
    GrandPPN = parseFloat(ppnrp);
  }else{
    GrandPPN = parseFloat(getppn) + parseFloat(ppnrp);
  }
  document.getElementById("gud_barangIn_tfoot_GrandPPN").value = GrandPPN.toFixed(2);
  
  let subDisc    = 0;
  var getdisc    = document.getElementById("gud_barangIn_tfoot_GrandDisc").value;
  if (getdisc == ''){
    subDisc = parseFloat(discrp);
  }else{
    subDisc = parseFloat(discrp) + parseFloat(getdisc);
  }

  document.getElementById("gud_barangIn_tfoot_GrandDisc").value = subDisc.toFixed(2);

}

/*GAG DIPAKEK*/
function InsertRow(tableID) {
  try {
    var table = document.getElementById('gud_barangIn_tableentry');
    var rowCount = table.rows.length;
    for (var i = 0; i < rowCount; i++) {
      var row = table.rows[i];
      var chkbox = row.cells[1].childNodes[0];
      if (null != chkbox && true == chkbox.checked) {
        var newRow = table.insertRow(i + 1);
        var colCount = table.rows[0].cells.length;
        for (h = 0; h < colCount; h++) {
          var newCell = newRow.insertCell(h);
          newCell.innerHTML = table.rows[0].cells[h].innerHTML;
          var child = newCell.children;
          table.rows[1].cells[0].innerHTML = "<td class='pl-0'><input style='text-align:center;' type='text' class='form-control form-control-xxs' name='gud_barangIn_hometable_urut[]' value='" + i + "' disabled></td>";
          for (var i2 = 0; i2 < child.length; i2++) {
            var test = newCell.children[i2].tagName;
            console.log(test);
            switch (test) {
              case "INPUT":
                if (newCell.children[i2].type == "checkbox") {
                  newCell.children[i2].value = "";
                  newCell.children[i2].checked = false;
                } else {
                  newCell.children[i2].value = "";
                }
                break;
              case "SELECT":
                newCell.children[i2].value = "";
                break;
              default:
                break;
            }
          }
        }
      }
      i++;
    }
  } catch (e) {
    alert(e);
  }
}

function gud_barangIn_back(){
  var noresepAPTRWJ = document.getElementById("gud_barangIn_nomor").value;
  if (noresepAPTRWJ == ''){    
    pertanyaan.fire({
      title             : 'Kembali ke menu awal',
      html              : '<span>Data Penerimaan Barang Masuk belum terSimpan, tetap kembali ?</span>',
      icon              : 'question',
      showCancelButton  : true,
      reverseButtons    : false,
      allowOutsideClick : false
    }).then((result) => {
      if (result.isConfirmed) {
        gud_barangIn_backk();
      }else if(result.dismiss === Swal.DismissReason.cancel){
        
      }
    })
  }else{
    gud_barangIn_backk();
  }
}

function gud_barangIn_backk() {
  $('.gudangIn').hide();
  $('#gudang_penerimaanbarang_awal').show();
  $('#gudang_penerimaanbarang_kedua').show();
  gudang_penerimaanbarang_showdata();
}

function gud_barangIn_paramSimpan(){

  var kd_obt    = document.getElementsByName('gud_barangIn_hometable_kdobat[]');
  var nmobat    = document.getElementsByName('gud_barangIn_hometable_nmobat[]');
  var satB      = document.getElementsByName('gud_barangIn_hometable_satB[]');
  var qtyB      = document.getElementsByName('gud_barangIn_hometable_qtyB[]');
  var frac      = document.getElementsByName('gud_barangIn_hometable_frac[]');
  var hargaBeli = document.getElementsByName('gud_barangIn_hometable_harga[]');
  var hargaSat  = document.getElementsByName('gud_barangIn_hometable_hargasatuan[]');
  var qty       = document.getElementsByName('gud_barangIn_hometable_qty[]');
  var disc      = document.getElementsByName('gud_barangIn_hometable_disc[]');
  var discrp    = document.getElementsByName('gud_barangIn_hometable_discrp[]');
  var jmlh      = document.getElementsByName('gud_barangIn_hometable_jmlh[]');
  var expired   = document.getElementsByName('gud_barangIn_hometable_expired[]');
  var batch     = document.getElementsByName('gud_barangIn_hometable_batch[]');
  var pabrik    = document.getElementsByName('gud_barangIn_hometable_pabrik[]');
  var ppn       = document.getElementsByName('gud_barangIn_hometable_ppn[]');
  var subtotal  = document.getElementsByName('gud_barangIn_hometable_subtotal[]');
  var ppnrp     = document.getElementsByName('gud_barangIn_hometable_ppnrp[]');

  var GrandDisc     = document.getElementsByName('gud_barangIn_tfoot_GrandDisc[]');
  var GrandSubTotal = document.getElementsByName('gud_barangIn_tfoot_GrandSubTotal[]');
  var GrandPPN      = document.getElementsByName('gud_barangIn_tfoot_GrandPPN[]');
  var GrandTotal    = document.getElementsByName('gud_barangIn_tfoot_GrandTotal[]');

  var count     = $('#gud_barangIn_tableentry tr').length;
  
  var params = {};  
  params.data     = [];
  for(var i = 0, iLen = count ; i < iLen; i++){
    var x = {};
    x.kd_obt    = kd_obt[i].value;
    x.nmobat    = nmobat[i].value;
    x.satB      = satB[i].value;
    x.qtyB      = qtyB[i].value;
    x.frac      = frac[i].value;
    x.hargaBeli = hargaBeli[i].value;
    x.hargaSat  = hargaSat[i].value;
    x.qty       = qty[i].value;
    
    x.discrp    = discrp[i].value;
    x.jmlh      = jmlh[i].value;
    x.expired   = expired[i].value;
    x.batch     = batch[i].value;
    x.pabrik    = pabrik[i].value;
    x.ppn       = ppn[i].value;
    x.subtotal  = subtotal[i].value;
    x.ppnrp     = ppnrp[i].value;
    
    //if (typeof(disc[i].value) !== 'undefined') {
    if (disc[i].value !== '') {
      x.disc   = disc[i].value;
    }else{
      x.disc   = 0;
    }

    params.data.push(x);
  }
  
  console.log(params.data);
  return params.data;
}

function gud_barangIn_save(){
  $('#gud_barangIn_loading').show();
  var no_gud_in   = document.getElementById("gud_barangIn_nomor").value;
  var pbf         = document.getElementById("gud_barangIn_vendor").value;
  var faktur      = document.getElementById("gud_barangIn_faktur").value;
  var fakturvendor= document.getElementById("gud_barangIn_fakturvendor").value;
  var npwp        = document.getElementById("gud_barangIn_npwp").value;
  //var GrandDisc   = document.getElementById('gud_barangIn_tfoot_GrandDisc').value;
  var GrandDisc   = document.getElementById('gud_barangIn_tfoot_DiskonFakRp').value;
  var GrandPPN    = document.getElementById('gud_barangIn_tfoot_GrandPPN').value;
  var countRow    = $('#gud_barangIn_tableentry tr').length;

  if (GrandDisc != ''){
    //GrandDisc = document.getElementById('gud_barangIn_tfoot_GrandDisc').value;
    GrandDisc = document.getElementById('gud_barangIn_tfoot_DiskonFakRp').value;
  }else{
    GrandDisc = 0;
  }

  if (GrandPPN != ''){
    GrandPPN = document.getElementById('gud_barangIn_tfoot_GrandPPN').value;
  }else{
    GrandPPN = 0;
  }
  
  var DiskonFaktur = document.getElementById('gud_barangIn_tfoot_DiskonFak').value;
  if (DiskonFaktur > 0){
    var GrandTotal   = document.getElementById('gud_barangIn_tfoot_GrandTotalDiskon').value;
    DiskonFaktur = document.getElementById('gud_barangIn_tfoot_DiskonFak').value;
  }else{
    var GrandTotal   = document.getElementById('gud_barangIn_tfoot_GrandTotal').value;
    DiskonFaktur = 0;
  }

  var param = {
    map_idunit    : user['map_bpjs'],
    no_gud_in     : no_gud_in,
    pbf           : pbf,
    faktur        : faktur,
    fakturvendor  : fakturvendor,
    npwp          : npwp,
    tglcreate     : document.getElementById("gud_barangIn_tgl").value,
    iduser        : user['id_user'],
    idpeg         : user['id_pegawai'],
    id_farUser    : user['id_far'],
    data          : gud_barangIn_paramSimpan(),
    countRow      : $('#gud_barangIn_tableentry tr').length,
    GrandDisc     : GrandDisc,
    GrandSubTotal : document.getElementById('gud_barangIn_tfoot_GrandSubTotal').value,
    GrandPPN      : GrandPPN,
    GrandTotal    : GrandTotal,
    DiskonFaktur  : DiskonFaktur,
  };
  
  if (pbf == '0'){
    toastr.error("PBF Belum dipilih.");
    $('#gud_barangIn_loading').hide();
  }else if (faktur == ''){
    toastr.error("Faktur Wajib diisi.");
    $('#gud_barangIn_loading').hide();
  }else if (user['id_far'] == ''){
    toastr.error("Periksa Kembali Konfigurasi Modul Anda.");
    $('#gud_barangIn_loading').hide();
  }else{
    apiPOST('Gudang/CreateGudangBarangIn', param, hasil => {
      $('#gud_barangIn_loading').hide();
      if (hasil !== null) {
        if (hasil['code'] == '200'){
          document.getElementById("gud_barangIn_nomor").value = hasil['no_gud_in'];
        }else{
          toastr.error('Gagal Simpan Penerimaan!!');
        }
      }
    }).then(function(){
      $('#gud_barangIn_loading').hide();
    });
  }
}

function gud_barangIn_pos(){
  
  $('#gud_barangIn_loading').show();
  var no_gud_in  = document.getElementById("gud_barangIn_nomor").value;
  var DiskonFaktur = document.getElementById('gud_barangIn_tfoot_DiskonFak').value;
  var GrandDisc   = document.getElementById('gud_barangIn_tfoot_DiskonFakRp').value;
  var GrandPPN    = document.getElementById('gud_barangIn_tfoot_GrandPPN').value;

  if (DiskonFaktur > 0){
    var GrandTotal   = document.getElementById('gud_barangIn_tfoot_GrandTotalDiskon').value;
    DiskonFaktur = document.getElementById('gud_barangIn_tfoot_DiskonFak').value;
  }else{
    var GrandTotal   = document.getElementById('gud_barangIn_tfoot_GrandTotal').value;
    DiskonFaktur = 0;
  }

  if (GrandDisc != ''){
    //GrandDisc = document.getElementById('gud_barangIn_tfoot_GrandDisc').value;
    GrandDisc = document.getElementById('gud_barangIn_tfoot_DiskonFakRp').value;
  }else{
    GrandDisc = 0;
  }

  if (GrandPPN != ''){
    GrandPPN = document.getElementById('gud_barangIn_tfoot_GrandPPN').value;
  }else{
    GrandPPN = 0;
  }

  var param = {
    no_gud_in     : no_gud_in,
    tglcreate     : document.getElementById("gud_barangIn_tgl").value,
    iduser        : user['id_user'],
    idpeg         : user['id_pegawai'],
    id_farUser    : user['id_far'],
    pbf           : document.getElementById("gud_barangIn_vendor").value,
    GrandDisc     : GrandDisc,
    GrandPPN      : GrandPPN,
    GrandTotal    : GrandTotal,
    DiskonFaktur  : DiskonFaktur,
  };
  
  pertanyaan.fire({
    title             : 'Posting Data',
    html              : '<span>Penerimaan Barang Masuk Sudah Benar?,<br>Posting dan Kirim Ke Bag. Verifikasi </span>',
    icon              : 'question',
    showCancelButton  : true,
    reverseButtons    : false,
    allowOutsideClick : false
  }).then((result) => {
    if (result.isConfirmed) {
      apiPOST('Gudang/PostingGudangBarangIn', param, hasil => {
      $('#gud_barangIn_loading').hide();
        if (hasil !== null) {
          if (hasil['code'] == '200'){
            gud_barangIn_backk();
          }else{
            toastr.error('Gagal Posting Penerimaan!!');
          }
        }
      }).then(function(){
        $('#gud_barangIn_loading').hide();
      });

    }else if(result.dismiss === Swal.DismissReason.cancel){
      $('#gud_barangIn_loading').hide();
    }
  })
}

function gud_barangIn_unpos(){
  
  $('#gud_barangIn_loading').show();
  var no_gud_in  = document.getElementById("gud_barangIn_nomor").value;
  
  var param = {
    no_gud_in     : no_gud_in,
    tglcreate     : document.getElementById("gud_barangIn_tgl").value,
    iduser        : user['id_user'],
    idpeg         : user['id_pegawai'],
    id_farUser    : user['id_far']
  };
  
  pertanyaan.fire({
    title             : 'UnPosting Penerimaan Barang',
    html              : '<span>Penerimaan Barang Masuk Sudah Ditutup, Buka Kembali ?</span>',
    icon              : 'question',
    showCancelButton  : true,
    reverseButtons    : false,
    allowOutsideClick : false
  }).then((result) => {
    if (result.isConfirmed) {
      apiPOST('Gudang/UnPostingGudangBarangIn', param, hasil => {
      $('#gud_barangIn_loading').hide();
        if (hasil !== null) {
          if (hasil['code'] == '200'){
            gud_barangIn_backk();
          }else{
            toastr.error('Gagal UnPosting Penerimaan!!');
          }
        }
      }).then(function(){
        $('#gud_barangIn_loading').hide();
      });

    }else if(result.dismiss === Swal.DismissReason.cancel){
      $('#gud_barangIn_loading').hide();
    }
  })
}

function gud_barangIn_hapuspenerimaan(){
  $('#gud_barangIn_loading').show();
  var no_gud_in  = document.getElementById("gud_barangIn_nomor").value;
  if (no_gud_in != ''){    
    pertanyaan.fire({
      title             : 'Hapus Penerimaan Gudang, masukkan alasan dihapus ?',
      html              : '<input type="text" class="form-control form-control-sm" id="gud_barangIn_alasan" class="swal2-input" placeholder="Enter your reason" autocomplete="off" required>',
      icon              : 'error',
      showCancelButton  : true,
      reverseButtons    : false,
      allowOutsideClick : false
    }).then((result) => {
      if (result.isConfirmed) {
        var alasan = document.getElementById('gud_barangIn_alasan').value;
        if (alasan != ''){
          
          var param = {
            kdFar         : user['map_bpjs'],
            no_gud        : no_gud_in,
            tglcreate     : document.getElementById("gud_barangIn_tgl").value,
            iduser        : user['id_user'],
            idpeg         : user['id_pegawai'],
            id_farUser    : user['id_far'],
            reason        : alasan,
            GrandTotal    : document.getElementById('gud_barangIn_tfoot_GrandTotal').value,
            code          : '01'
          };

          apiPOST('Gudang/LogHapusPenerimaan', param, hasil => {
            $('#gud_barangIn_loading').hide();
            if (hasil !== null) {
              gud_barangIn_backk();
            }
          }).then(function(){
            //$('#gud_barangIn_loading').hide();
          });
        }else{
          swal_center('Alasan tidak boleh kosong!!','error');
        }
        
      }else if(result.dismiss === Swal.DismissReason.cancel){
        $('#gud_barangIn_loading').hide();
      }
    })
  }
}

function cetakPenerimaanGudBarang(){

  var param = {
    'no_gud_in'   : document.getElementById("gud_barangIn_nomor").value,
    'pbf'         : document.getElementById("gud_barangIn_vendor").value,
    'tgl_gud_in'  : document.getElementById("gud_barangIn_tgl").value,
    'no_faktur'   : document.getElementById("gud_barangIn_faktur").value
  };
  
  if (document.getElementById("gud_barangIn_nomor").value == ''){
    toastr.error('Penerimaan Barang Masuk Belum Disimpan!!');
  }else{
    newTabPOST('API/Laporan/LaporanPenerimaanBarangMasuk', param);
  }
  return;
}

function cekAccJurnal(){
  apiPOST('Gudang/cekAccJurnal', {iduser : user['id_user']}, hasil => {
    if (hasil !== null) {
      if (hasil['code'] == '200'){

        if (hasil['data'][0].acc == 't'){
          if (user['id_user'] == '1'){
            document.getElementById("gud_barangIn_acc").style.display     = 'inline-block';
            document.getElementById("gud_barangIn_simpan").disabled       = false;
            document.getElementById("gud_barangIn_posting").disabled      = false;
            document.getElementById("gud_barangIn_tfoot_nmobat").disabled = false;
            document.getElementById("gud_barangIn_delROw").disabled       = false;
          }else{
            document.getElementById("gud_barangIn_acc").style.display     = 'inline-block';
            document.getElementById("gud_barangIn_simpan").disabled       = true;
            document.getElementById("gud_barangIn_posting").disabled      = true;
            document.getElementById("gud_barangIn_tfoot_nmobat").disabled = true;
            document.getElementById("gud_barangIn_delROw").disabled       = true;
            document.getElementById('gud_barangIn_unposting').disabled    = true;
          }
        }

        /* CATATAN : 
          perlu dirubah konsepe

             yg awalx : harga x jumlah x 11 % = (hasilx + harga) x disc 5% menjadi
              --------
             harga x jumlah = (hasilnya x disc 5%) = hasil_kenadisc
            
             hasilnya - hasil_kenadisc = (hasilbaru x 11%) = hasil_kenappn
            
             hasilbaru + hasil_kenappn = hasil_akhir ()


    
        */  
        // }else{
        //   document.getElementById("gud_barangIn_acc").style.display     = 'none';
        //   document.getElementById("gud_barangIn_simpan").disabled       = true;
        //   document.getElementById("gud_barangIn_posting").disabled      = true;
        //   document.getElementById("gud_barangIn_tfoot_nmobat").disabled = true;
        //   document.getElementById("gud_barangIn_delROw").disabled       = true;
        // } 
      }

    }
  });
}

function gud_barangIn_acc(){

  $('#gud_barangIn_loading').show();
  var no_gud_in   = document.getElementById("gud_barangIn_nomor").value;
  var DiskonFaktur = document.getElementById('gud_barangIn_tfoot_DiskonFak').value;
  var GrandDisc   = document.getElementById('gud_barangIn_tfoot_DiskonFakRp').value;
  var GrandPPN    = document.getElementById('gud_barangIn_tfoot_GrandPPN').value;

  if (DiskonFaktur > 0){
    var GrandTotal   = document.getElementById('gud_barangIn_tfoot_GrandTotalDiskon').value;
    DiskonFaktur = document.getElementById('gud_barangIn_tfoot_DiskonFak').value;
  }else{
    var GrandTotal   = document.getElementById('gud_barangIn_tfoot_GrandTotal').value;
    DiskonFaktur = 0;
  }

  if (GrandDisc != ''){
    //GrandDisc = document.getElementById('gud_barangIn_tfoot_GrandDisc').value;
    GrandDisc = document.getElementById('gud_barangIn_tfoot_DiskonFakRp').value;
  }else{
    GrandDisc = 0;
  }

  if (GrandPPN != ''){
    GrandPPN = document.getElementById('gud_barangIn_tfoot_GrandPPN').value;
  }else{
    GrandPPN = 0;
  }

  var param = {
    no_gud_in     : no_gud_in,
    tglcreate     : document.getElementById("gud_barangIn_tgl").value,
    iduser        : user['id_user'],
    idpeg         : user['id_pegawai'],
    id_farUser    : user['id_far'],
    pbf           : document.getElementById("gud_barangIn_vendor").value,
    GrandDisc     : GrandDisc,
    GrandPPN      : GrandPPN,
    GrandTotal    : GrandTotal,
    DiskonFaktur  : DiskonFaktur,
  };

  var jmlRow  = $('#gud_barangIn_tableentry tr').length;
  if(jmlRow > 0){
    pertanyaan.fire({
      title             : 'ACC Penerimaan Barang Masuk',
      html              : '<span>Data Sudah Benar ??, Lanjut Simpan untuk Proses Jurnal dan Stok Farmasi..</span>',
      icon              : 'question',
      showCancelButton  : true,
      reverseButtons    : false,
      allowOutsideClick : false
    }).then((result) => {
      if (result.isConfirmed) {
        apiPOST('Gudang/ACCGudangBarangIn', param, hasil => {
        $('#gud_barangIn_loading').hide();
          if (hasil !== null) {
            if (hasil['code'] == '200'){
              gud_barangIn_backk();
            }else{
              toastr.error('Gagal Verifikasi Penerimaan!!');
            }
          }
        }).then(function(){
          $('#gud_barangIn_loading').hide();
        });

      }else if(result.dismiss === Swal.DismissReason.cancel){
        $('#gud_barangIn_loading').hide();
      }
    })
  }else{
    toastr.warning('Belum Ada Entrian Obat Masuk!!');
    $('#gud_barangIn_loading').hide();
  }
}
</script>