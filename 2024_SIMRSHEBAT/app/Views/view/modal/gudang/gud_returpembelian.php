<?php
  $data = json_decode($_GET['data']);
  $no_retur   = str_replace('"','', json_encode($data->vGudRetur_no));
  $tgl        = str_replace('"','', json_encode($data->vGudRetur_tgl));
  $kd_vendor  = str_replace('"','', json_encode($data->vGudRetur_kdvendor));
  $vendor     = str_replace('"','', json_encode($data->vGudRetur_nama));
  $posting    = str_replace('"','', json_encode($data->vGudRetur_posting));
  $tglbuat    = date_format(date_create($tgl), 'Y-m-d'); //FORMAT d-M-Y TGL 02-Feb-2023
  $remark     = str_replace('"','', json_encode($data->vGudRetur_remark));
  
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
              <td><input type="date" class="form-control form-control-xs" id="gud_retur_tgl"></td>
            </tr>
            <tr>
              <td>No. Retur</td>
              <td>:</td>
              <td>
                <div class="input-group col-sm-12 p-0">
                  <input type="text" class="form-control form-control-xs" id="gud_retur_nomor" disabled>
                  <div class="input-group-prepend">
                    <button type="button" class="btn btn-outline-danger btn-xs" onclick="gud_retur_hapus()" id="gud_retur_btnhapus"><i class="fa fa-trash"></i></button>
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
              <td><select class="form-control form-control-xs" id="gud_retur_vendor" onchange="gud_retur_changepbf()"></select></td>
            </tr>
            <tr>
              <td>Remark</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="gud_retur_remark"></td>
            </tr>
          </table>
        </div>
      </div>

    </div>
    <div class="card card-row">
      <div class="overlay-wrapper" id="gud_retur_loading">
        <div class="overlay dark">
          <i class="fas fa-3x fa-sync-alt fa-spin"></i>
        </div>
      </div>

      <div class="card-header p-1 darkgrey-custom">
        <!-- <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="gud_retur_hometable()" id="gud_retur_obat"><i class="fa fa-plus"></i> Tambah Obat</button> -->
        <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="gud_retur_delROw('gud_retur_tableentry')"><i class="fa fa-times"></i> Hapus Obat</button>
        <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="gud_retur_save()" id="gud_retur_simpan"><i class="fa fa-save"></i> Simpan</button>
        <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="gud_retur_pos()" id="gud_retur_posting"><i class="fa fa-arrow-right"></i> Posting</button>
        <button type="button" class="btn btn-outline-danger btn-xs" onclick="gud_retur_back()"><i class="fa fa-arrow-left"></i> Kembali</button>
      </div>

      <div class="modal-body p-1">
        <div class="card-body p-0">
          
          <div class="col-sm-12 p-0 uk-layar" style="height: 72vh; max-height: 72vh; overflow-x: hidden;">
            
            <table class="table table-striped table-sm choose" style="border-collapse: inherit;">
              <thead>
                <tr>
                  <th class="pl-0" width="20">Act</th>
                  <th width="50">No.Gudang</th>
                  <th width="50">Kd.Obat</th>
                  <th width="120">Nm.Obat</th>
                  <th width="40" style="text-align:center;" title="Satuan Kecil">Sat K</th>
                  <th width="70" style="text-align:center;">Harga</th>
                  <th width="40" style="text-align:center;" title="Stok Pembelian">Stok</th>
                  <th width="40" style="text-align:center;" title="Qty Besar">QtyB</th>
                  <th width="40" style="text-align:center;">Frac</th>
                  <th width="40" style="text-align:center;">Qty</th>
                  <th width="40" style="text-align:center;">Ppn%</th>
                  <th width="70" style="text-align:center;" title="Harga x Qty Besar">Jumlah</th>
                  <th width="30">Expired</th>
                  <th width="50" style="text-align:center;">Batch</th>
                  <th width="80" style="text-align:center;" title="HNA+PPn">Total</th>
                  <!-- <th width="30" style="text-align:center;">PPN_Rp</th>
                  <th width="30" style="text-align:center;">HrgaSat</th> -->
                </tr>
              </thead>
              <tbody id="gud_retur_tableentry"></tbody>
              <tfoot style="background-color: #a8d4da; color: black;">
                <tr>
                  <td colspan="4" class="pl-0 pr-0 pt-2">
                    <input type='search' class='form-control form-control-xxs' id='gud_retur_tfoot_nmobat' placeholder="Pencarian Obat" autocomplete="off">
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='text' class='form-control form-control-xxs' id='gud_retur_tfoot_satK' readonly>
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='number' class='form-control form-control-xxs' id='gud_retur_tfoot_harga' value="0" readonly>
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='number' class='form-control form-control-xxs' id='gud_retur_tfoot_stok' value="0" readonly>
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='number' class='form-control form-control-xxs' id='gud_retur_tfoot_qtyB' value="0" readonly>
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='number' class='form-control form-control-xxs' id='gud_retur_tfoot_frac' value="0" readonly>
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='number' class='form-control form-control-xxs' id='gud_retur_tfoot_qty' value="0">
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='number' class='form-control form-control-xxs' id='gud_retur_tfoot_ppn' placeholder="0.00" step="0.01" min="0" max="100" readonly>
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='number' class='form-control form-control-xxs pr-0' id='gud_retur_tfoot_jmlh' value="0" disabled>
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='date' class='form-control form-control-xxs' id='gud_retur_tfoot_exp' readonly>
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='text' class='form-control form-control-xxs' id='gud_retur_tfoot_batch' placeholder="No. Batch" readonly>
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='number' class='form-control form-control-xxs pr-0' id='gud_retur_tfoot_subtotal' value="0" disabled>
                  </td>
                  <td class="pl-0 pr-0 pt-2" width="50" hidden>
                    <input type='number' class='form-control form-control-xxs pr-0' id='gud_retur_tfoot_ppnrp' placeholder="0.00" step="0.01" min="0" disabled>
                  </td>
                  <td class="pl-0 pr-0 pt-2" width="50" hidden>
                    <input type='number' class='form-control form-control-xxs pr-0' id='gud_retur_tfoot_kdmilik' disabled>
                  </td>
                </tr>
                
                <tr>
                  <td colspan="15" class="pl-0 pr-0" >
                    <div class="row pl-0 pr-0" style="justify-content: flex-end;">
                      <div class="col-sm-2">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text form-control-xs">PPN: </span>
                          </div>
                          <input type="number" class="form-control form-control-xxs" id="gud_retur_tfoot_GrandPPN" placeholder="0.00" style='text-align: right;' readonly>
                        </div>
                      </div>
                      <div class="col-sm-2.5 pr-2">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text form-control-xs">Sub Jumlah : </span>
                          </div>
                          <input type="number" class="form-control form-control-xxs" id="gud_retur_tfoot_GrandSubTotal" value="0" style='text-align: right;' disabled>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td colspan="15" class="pl-0 pr-0" style="text-align: -webkit-right;">
                    <div class="input-group col-sm-2 pr-0">
                      <div class="input-group-prepend">
                        <span class="input-group-text form-control-xs">Total : </span>
                      </div>
                      <input type="number" class="form-control form-control-xxs" id="gud_retur_tfoot_GrandTotal" value="0" style='text-align: right;' disabled>
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
$('.gudangRetur').show();
$('#gud_retur_loading').hide();

var no_retur  = "<?php echo $no_retur; ?>";
var tglbuat   = "<?php echo $tglbuat; ?>";
var kd_vendor = "<?php echo $kd_vendor; ?>";
var faktur    = "<?php echo $remark; ?>";
var posting   = "<?php echo $posting; ?>";
var no_obat_in;
var flag;
document.getElementById('gud_retur_nomor').value = no_retur;

var kd_obatauto_retur;
kd_obatauto_retur = new AutoComplete("gud_retur_tfoot_nmobat");

var maxdate = "gud_retur_tgl";
max_date(maxdate);
gud_retur_pbf(kd_vendor);
gud_retur_changepbf();


if (no_retur == ''){
  document.getElementById('gud_retur_tgl').value = nowday;
  flag = false;
  gud_retur_OlahInput(flag);
  document.getElementById('gud_retur_btnhapus').disabled     = true;
}else{
  gud_retur_showdataDetail(no_retur, tglbuat);
  document.getElementById('gud_retur_tgl').value     = tglbuat;
  document.getElementById('gud_retur_remark').value  = faktur;
  
  if (posting != 'f'){ //SUDAH DIPOSTING
    flag = true;
    document.getElementById('gud_retur_btnhapus').disabled     = flag;
    gud_retur_OlahInput(flag);
  }else{
    flag = false;
    document.getElementById('gud_retur_btnhapus').disabled     = flag;
    gud_retur_OlahInput(flag);
  }
}

function gud_retur_pbf(kd_vendor) {
  apiPOST('Setup/vendor', null, hasil => {
    var data = hasil['data'];
    var ven = '';
        ven += '<option value="0" >- Pilih PBF -</option>';
    for (var i = 0; i < data.length; i++) {
        ven += '<option value="'+ data[i]['kd_vendor'] +'">'+ data[i]['nama']+'</option>';
    }
    document.getElementById('gud_retur_vendor').innerHTML = ven;
    if (kd_vendor > 0){
      document.getElementById('gud_retur_vendor').value  = kd_vendor;
    }
  });
}

function gud_retur_showdataDetail(no_retur, tglbuat){
  var param = {
    iduser     : user['id_user'],
    no_retur   : no_retur,
    tglcreate  : tglbuat
  };

  apiPOST('Gudang/gud_retur_showdataDetail', param, hasil => {
    if (hasil !== null) {
      var list = hasil['data'];
      for (var i = 0; i < list.length; i++) {
        var no_penerimaan = list[i]['no_obat_in'];
        var kd_obat   = list[i]['kd_obat'];
        var nm_obat   = list[i]['nama_obat'];
        var satK      = list[i]['kd_satuan'];
        var frac      = list[i]['frac'];
        var harga     = list[i]['hargasat'];
        var stok      = list[i]['jml_in_obt'];
        var qty       = list[i]['qty_ret'];
        let qtyB      = 0;
        qtyB          = parseFloat(qty) / parseFloat(frac);
        var ppn       = list[i]['ppn_item'];
        let ppnrp     = 0;
        ppnrp         = (parseFloat(harga) * parseFloat(ppn)) / 100;
        let jmlh      = 0;
        // jmlh          = parseFloat(qtyB) * parseFloat(harga);
        jmlh          = parseFloat(qty) * parseFloat(harga);
        var exp       = list[i]['exp_ret'];
        var batch     = list[i]['batch_ret'];
        let subtotal  = 0;
        //subtotal      = parseFloat(harga) + parseFloat(ppnrp); //HNA + PPN
        subtotal      = parseFloat(jmlh) + parseFloat(ppnrp); //HNA + PPN
        var kdmilik   = list[i]['kd_milik'];
        
        if (satK == null){
          satK = '-';
        }else{
          satK = list[i]['kd_satuan'];
        }
        
        returreplace(no_penerimaan, kd_obat, nm_obat, satK, qtyB, frac, harga, stok, qty, ppn, ppnrp, jmlh, exp, batch, subtotal, kdmilik);

      }
    }
  });
}

function gud_retur_changepbf(){
  var count = $('#gud_retur_tableentry tr').length;
  if (count != 0){
    
    pertanyaan.fire({
      title             : 'Merubah PBF',
      html              : '<span>Inputan akan dikosongkan, lanjutkan ?</span>',
      icon              : 'question',
      showCancelButton  : true,
      reverseButtons    : false,
      allowOutsideClick : false
    }).then((result) => {
      if (result.isConfirmed) {
        kd_vendor = '0';
        
        $('#gud_retur_tableentry').html('');
        document.getElementById("gud_retur_tfoot_GrandTotal").value     = 0;
        document.getElementById("gud_retur_tfoot_GrandSubTotal").value  = 0;
        document.getElementById("gud_retur_tfoot_GrandPPN").value       = 0;
        
        gud_retur_pencarianobat();
      }else if(result.dismiss === Swal.DismissReason.cancel){
        if (kd_vendor != '0'){
          document.getElementById('gud_retur_vendor').value  = kd_vendor;
        }
      }
    })
  }else{
    gud_retur_pencarianobat();
  }
  kd_obatauto_retur.resetData();
}

function gud_retur_OlahInput(flag){
  document.getElementById('gud_retur_tfoot_nmobat').disabled  = flag;
  document.getElementById('gud_retur_tfoot_qty').disabled     = flag;
  document.getElementById('gud_retur_simpan').disabled        = flag;
  document.getElementById('gud_retur_posting').disabled       = flag;
  document.getElementById('gud_retur_vendor').disabled        = flag;
 
  kd_obatauto_retur.onPilih(()=>{
    var kd_obat     = kd_obatauto_retur.getValue();
    var nm_obat     = $('#gud_retur_tfoot_nmobat').val();
    var arrnm_obat  = nm_obat.split('<br>Satuan Kecil : ');
    var arrnm_obat2 = arrnm_obat[1].split(' , QtyB : ');
    var arrnm_obat3 = arrnm_obat2[1].split(' , Fraction : ');
    var arrnm_obat4 = arrnm_obat3[1].split(' , Jumlh Beli : ');
    var arrnm_obat5 = arrnm_obat4[1].split('<br>Harga Satuan : ');
    var arrnm_obat6 = arrnm_obat5[1].split(' , Expired : ');
    var arrnm_obat7 = arrnm_obat6[1].split(' , Batch : ');
    var arrnm_obat8 = arrnm_obat7[1].split(' , PPn : ');

    var arrsplit    = arrnm_obat[0].split('#');
    no_obat_in      = arrsplit[0];
    var namaobat    = arrsplit[1];

    var arrsatKecil = arrnm_obat2[0];
    var arrqtyBesar = arrnm_obat3[0];
    var arrFraction = arrnm_obat4[0];
    var arrStokSedia= arrnm_obat5[0];
    var arrHargaObat= arrnm_obat6[0];
    var arrExpObat  = arrnm_obat7[0];
    var arrBatch    = arrnm_obat8[0];

    var arrsplit2    = arrnm_obat8[1].split('-');
    var arrPPN       = arrsplit2[0];
    var arrkdMilik   = arrsplit2[1];

    $('#gud_retur_tfoot_nmobat').val(namaobat);
    if ((arrsatKecil != 'null')||(arrsatKecil != '')){
      $('#gud_retur_tfoot_satK').val(arrsatKecil);
    }else{
      $('#gud_retur_tfoot_satK').val('-');
    }
    
    $('#gud_retur_tfoot_harga').val(arrHargaObat);
    $('#gud_retur_tfoot_stok').val(arrStokSedia);
    $('#gud_retur_tfoot_exp').val(arrExpObat);
    $('#gud_retur_tfoot_batch').val(arrBatch);
    $('#gud_retur_tfoot_qtyB').val(arrqtyBesar);
    $('#gud_retur_tfoot_frac').val(arrFraction);
    $('#gud_retur_tfoot_ppn').val(arrPPN);
    $('#gud_retur_tfoot_kdmilik').val(arrkdMilik);

    $('#gud_retur_tfoot_qty').trigger('focus');
  });

  $("#gud_retur_tfoot_qty").on( "keydown", function(e) {
    switch(event.which){      
      case 13:
        var qtyK    = $(this).val();
        var qtyB    = $('#gud_retur_tfoot_qtyB').val();
        var frac    = $('#gud_retur_tfoot_frac').val();
        var harga   = $('#gud_retur_tfoot_harga').val(); //HNA
        var stok    = $('#gud_retur_tfoot_stok').val();  //Stok Beli
        var getPPN  = $('#gud_retur_tfoot_ppn').val();   //PPN

        if (qtyB != ''){
          qtyB = $('#gud_retur_tfoot_qtyB').val();
          if (frac != ''){
            frac = $('#gud_retur_tfoot_frac').val();
          }else{
            frac = 0;
          }
        }else{
          qtyB = 0;
        }
        let qtyB_val = 0;
        qtyB_val = parseFloat(qtyK) / parseFloat(frac);
        $('#gud_retur_tfoot_qtyB').val(qtyB_val);

        let result  = 0;
        // result = parseFloat(qtyB_val) * parseFloat(harga); //QTYB x Harga
        result = parseFloat(qtyK) * parseFloat(harga); //QTYK x Harga
        
        let value_hnappn = 0;
        value_hnappn  = (parseFloat(harga) * parseFloat(getPPN)) / 100;

        let result_total = 0;
        //result_total  = parseFloat(result) + parseFloat(value_hnappn); //JUMLAH + PPN
        result_total  = parseFloat(result) + parseFloat(value_hnappn); //HNA + PPN

        if ((parseFloat(qtyK)) > (parseFloat(stok))||(parseFloat(qtyK)) < 0){
          toastr.error("Jumlah tidak sesuai stok pembelian.");
        }else{
          $('#gud_retur_tfoot_ppnrp').val(value_hnappn.toFixed(2));
          $("#gud_retur_tfoot_jmlh").val(result.toFixed(2));
          $("#gud_retur_tfoot_subtotal").val(result_total.toFixed(2));
          gud_retur_next();
          $('#gud_retur_tfoot_qty').blur();
        }
        
        break;
    }
  });

}

function gud_retur_pencarianobat(){
  $('#gud_retur_tfoot_nmobat').trigger('focus');
  if (kd_vendor != '0'){
    pbfx = kd_vendor;
  }else{
    pbfx = document.getElementById("gud_retur_vendor").value;
  }

  if (pbfx > 0){
    var param = {
      pbf     : pbfx
    };

    apiPOST('Gudang/pencarian_obatretur', param, hasil => {
      if (hasil !== null) {
        var list = hasil['data'];
        list.forEach(baru => {
          kd_obatauto_retur.addData(baru['kd_obat'], baru['no_obat_in']+'#'+baru['nama_obat']+'<br>Satuan Kecil : '+baru['kd_satuan']+' , QtyB : '+baru['boxqty']+' , Fraction : '+baru['frac']+' , Jumlh Beli : '+baru['jml_in_obt']+'<br>Harga Satuan : '+baru['hrg_satuan']+' , Expired : '+baru['exp']+' , Batch : '+baru['batch']+' , PPn : '+baru['ppn_item']+'-'+baru['kd_milik']);
        });
        gud_retur_emptyRow();
      } 
    });
    
  }else{
    toastr.warning("Tentukan PBF Dahulu!!");
    $('#gud_retur_vendor').trigger('focus');
  }
}

function gud_retur_next(){
  var no_penerimaan = no_obat_in;
  var kd_obat   = kd_obatauto_retur.getValue();
  var nm_obat   = $('#gud_retur_tfoot_nmobat').val();
  var satK      = $('#gud_retur_tfoot_satK').val();
  var qtyB      = $('#gud_retur_tfoot_qtyB').val();
  var frac      = $('#gud_retur_tfoot_frac').val();
  var harga     = $('#gud_retur_tfoot_harga').val();
  var stok      = $('#gud_retur_tfoot_stok').val();
  var qty       = $('#gud_retur_tfoot_qty').val();
  var ppn       = $('#gud_retur_tfoot_ppn').val();
  var ppnrp     = $('#gud_retur_tfoot_ppnrp').val();
  var jmlh      = $('#gud_retur_tfoot_jmlh').val();
  var exp       = $('#gud_retur_tfoot_exp').val();
  var batch     = $('#gud_retur_tfoot_batch').val();
  var subtotal  = $('#gud_retur_tfoot_subtotal').val();
  var kdmilik   = $('#gud_retur_tfoot_kdmilik').val();
  //console.log(kd_obat);
  if (kd_obat > 0){
    if(qty <= 0){
      toastr.error("Jumlah Kosong!!");
    }else if(ppn == ''){
      toastr.error("PPn Kosong!!");
    }else if(exp == ''){
      toastr.error("Exp Kosong!!");
    }else if(batch == ''){
      toastr.error("Batch Kosong!!");
    }else if(harga == ''){
      toastr.error("Harga Masih Kosong!!");
    }else{
      returreplace(no_penerimaan, kd_obat, nm_obat, satK, qtyB, frac, harga, stok, qty, ppn, ppnrp, jmlh, exp, batch, subtotal, kdmilik);
    }
  }else{
    toastr.error("Nama obat tidak ditemukan!!");
  }
  
}
function gud_retur_emptyRow(){
  kd_obatauto_retur.reset();
  document.getElementById('gud_retur_tfoot_satK').value     = "";
  document.getElementById('gud_retur_tfoot_qtyB').value     = "0";
  document.getElementById('gud_retur_tfoot_frac').value     = "0";
  document.getElementById('gud_retur_tfoot_harga').value    = "0";
  document.getElementById('gud_retur_tfoot_stok').value     = "0";
  document.getElementById('gud_retur_tfoot_qty').value      = "0";
  document.getElementById('gud_retur_tfoot_ppn').value      = "";
  document.getElementById('gud_retur_tfoot_ppnrp').value    = "0";
  document.getElementById('gud_retur_tfoot_jmlh').value     = "0";
  document.getElementById('gud_retur_tfoot_exp').value      = "";
  document.getElementById('gud_retur_tfoot_batch').value    = "";
  document.getElementById('gud_retur_tfoot_subtotal').value = "0";
 
  setTimeout(gud_retur_refresh, 500);
}

function gud_retur_refresh(){
  document.getElementById('gud_retur_tfoot_nmobat').focus();
}

function gud_retur_delROw(tableID) {
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

  let xtotalPPN   = 0;
  let xtotalJuml  = 0;
  let xtotalSubT  = 0;
  
  var getPPNRP    = document.getElementsByName('gud_retur_hometable_ppnrp[]');
  var getJumlh    = document.getElementsByName('gud_retur_hometable_jmlh[]');
  var getSubTot   = document.getElementsByName('gud_retur_hometable_subtotal[]');

  var jmlObat = $('#gud_retur_tableentry tr').length;
  var i;
  for (i = 0; i < jmlObat; i++) {

    let ppnRp   = getPPNRP[i].value;
    let jmlhRp  = getJumlh[i].value;
    let subToRp = getSubTot[i].value;
    xtotalPPN   += Number(ppnRp);
    xtotalJuml  += Number(jmlhRp);
    xtotalSubT  += Number(subToRp);
  }

  document.getElementById("gud_retur_tfoot_GrandTotal").value     = parseFloat(xtotalSubT);
  document.getElementById("gud_retur_tfoot_GrandSubTotal").value  = parseFloat(xtotalJuml);

  document.getElementById("gud_retur_tfoot_GrandPPN").value  = parseFloat(xtotalPPN).toFixed(2);
}

function returreplace(no_penerimaan, kd_obat, nm_obat, satK, qtyB, frac, harga, stok, qty, ppn, ppnrp, jmlh, exp, batch, subtotal, kdmilik){
  var data = '';
      data += "<tr>";
      data += "<td class='pl-0' style='text-align:center;'><input type='checkbox' name='gud_retur_hometable_check[]' class='form-control-xs'/></td>";              //1
      data += "<td><input type='text' class='form-control form-control-xxs' name='gud_retur_hometable_nopenerimaan[]' value='" + no_penerimaan + "'  disabled></td>";  //2
      data += "<td><input type='text' class='form-control form-control-xxs' name='gud_retur_hometable_kdobat[]' value='" + kd_obat + "'  disabled></td>";                //3 
      data += "<td><input type='text' class='form-control form-control-xxs' name='gud_retur_hometable_nmobat[]' value='" + nm_obat + "' disabled></td>";                 //4
      data += "<td><input type='text' class='form-control form-control-xxs' name='gud_retur_hometable_satK[]' value='" + satK + "' style='text-align: center;' disabled></td>";   //5
      data += "<td><input type='text' class='form-control form-control-xxs' name='gud_retur_hometable_harga[]' value='" + harga + "' style='text-align: right;' disabled></td>";   //6
      data += "<td><input type='text' class='form-control form-control-xxs' name='gud_retur_hometable_stok[]' value='" + stok + "' style='text-align: right;' disabled></td>";    //7
      data += "<td><input type='text' class='form-control form-control-xxs' name='gud_retur_hometable_qtyB[]' value='" + qtyB + "' style='text-align: center;' disabled></td>";   //8
      data += "<td><input type='text' class='form-control form-control-xxs' name='gud_retur_hometable_frac[]' value='" + frac + "' style='text-align: center;' disabled></td>";   //9
      data += "<td><input type='text' class='form-control form-control-xxs' name='gud_retur_hometable_qty[]' value='" + qty + "' style='text-align: center;' disabled></td>";        //10
      data += "<td><input type='text' class='form-control form-control-xxs' name='gud_retur_hometable_ppn[]' value='" + ppn + "' disabled></td>";                                    //11 
      data += "<td><input type='text' class='form-control form-control-xxs' name='gud_retur_hometable_jmlh[]' value='" + jmlh + "' style='text-align: right;' disabled></td>";    //12
      data += "<td><input type='text' class='form-control form-control-xxs' name='gud_retur_hometable_expired[]' value='" + exp + "' disabled></td>";                                //13
      data += "<td><input type='text' class='form-control form-control-xxs' name='gud_retur_hometable_batch[]' value='" + batch + "' disabled></td>";                              //14
      data += "<td class='pr-0'><input type='text' class='form-control form-control-xxs' name='gud_retur_hometable_subtotal[]' value='" + subtotal + "' style='text-align: right;' disabled></td>"; //15
      data += "<td class='pr-0' hidden><input type='text' class='form-control form-control-xxs' name='gud_retur_hometable_ppnrp[]' value='" + ppnrp + "' disabled></td>"; //16
      data += "<td class='pr-0' hidden><input type='text' class='form-control form-control-xxs' name='gud_retur_hometable_kdmilik[]' value='" + kdmilik + "' disabled></td>"; //17
      data += "</tr>";

  var getkd_obat  = document.getElementsByName('gud_retur_hometable_kdobat[]');
  var jmlRow      = $('#gud_retur_tableentry tr').length;
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
    $('#gud_retur_tableentry').append(data);
    retur_proses_penjumlahan(jmlh, ppn, subtotal, ppnrp, subtotal);
  }else{
    toastr.error("Obat Sudah Diinputkan!!");
  }

  gud_retur_emptyRow();
}

function retur_proses_penjumlahan(jmlh, ppn, subtotal, ppnrp, subtotal){

  var totalx  = document.getElementById("gud_retur_tfoot_GrandTotal").value;
  Total  = parseFloat(totalx) + parseFloat(subtotal);

  var granjml = document.getElementById("gud_retur_tfoot_GrandSubTotal").value;
  Grandjmlah  = parseFloat(granjml) + parseFloat(jmlh);

  document.getElementById("gud_retur_tfoot_GrandSubTotal").value = Grandjmlah.toFixed(2);
  document.getElementById("gud_retur_tfoot_GrandTotal").value    = Total.toFixed(2);

  let GrandPPN  = 0;
  var getppn    = document.getElementById("gud_retur_tfoot_GrandPPN").value;
  if (getppn == ''){
    GrandPPN = parseFloat(ppnrp);
  }else{
    GrandPPN = parseFloat(getppn) + parseFloat(ppnrp);
  }
  document.getElementById("gud_retur_tfoot_GrandPPN").value = GrandPPN.toFixed(2);
}

function gud_retur_paramSimpan(){
  var nopenerimaan  = document.getElementsByName('gud_retur_hometable_nopenerimaan[]');
  var kdobat        = document.getElementsByName('gud_retur_hometable_kdobat[]');
  var nmobat        = document.getElementsByName('gud_retur_hometable_nmobat[]');
  var satK          = document.getElementsByName('gud_retur_hometable_satK[]');
  var harga         = document.getElementsByName('gud_retur_hometable_harga[]');
  var stok          = document.getElementsByName('gud_retur_hometable_stok[]');
  var qtyB          = document.getElementsByName('gud_retur_hometable_qtyB[]');
  var frac          = document.getElementsByName('gud_retur_hometable_frac[]');
  var qty           = document.getElementsByName('gud_retur_hometable_qty[]');
  var ppn           = document.getElementsByName('gud_retur_hometable_ppn[]');
  var jmlh          = document.getElementsByName('gud_retur_hometable_jmlh[]');
  var exp           = document.getElementsByName('gud_retur_hometable_expired[]');
  var batch         = document.getElementsByName('gud_retur_hometable_batch[]');
  var subtotal      = document.getElementsByName('gud_retur_hometable_subtotal[]');
  var ppnrp         = document.getElementsByName('gud_retur_hometable_ppnrp[]');
  var kdmilik       = document.getElementsByName('gud_retur_hometable_kdmilik[]');

  var GrandSubTotal = document.getElementsByName('gud_retur_tfoot_GrandSubTotal[]');
  var GrandPPN      = document.getElementsByName('gud_retur_tfoot_GrandPPN[]');
  var GrandTotal    = document.getElementsByName('gud_retur_tfoot_GrandTotal[]');

  var count         = $('#gud_retur_tableentry tr').length;
  
  var params = {};  
  params.data     = [];
  for(var i = 0, iLen = count ; i < iLen; i++){
    var x = {};
    x.no_gud_in = nopenerimaan[i].value;
    x.kdobat    = kdobat[i].value;
    x.nmobat    = nmobat[i].value;
    x.satK      = satK[i].value;
    x.harga     = harga[i].value;
    x.stok      = stok[i].value;
    x.qtyB      = qtyB[i].value;
    x.frac      = frac[i].value;
    x.qty       = qty[i].value;
    
    x.ppn       = ppn[i].value;
    x.jmlh      = jmlh[i].value;
    x.exp       = exp[i].value;
    x.batch     = batch[i].value;
    x.subtotal  = subtotal[i].value;
    x.ppnrp     = ppnrp[i].value;
    x.kdmilik   = kdmilik[i].value;
    params.data.push(x);
  }
  
  console.log(params.data);
  return params.data;
}

function gud_retur_save(){
  $('#gud_retur_loading').show();
  var no_retur    = document.getElementById("gud_retur_nomor").value;
  var pbf         = document.getElementById("gud_retur_vendor").value;
  var remark      = document.getElementById("gud_retur_remark").value;
  var GrandPPN    = document.getElementById('gud_retur_tfoot_GrandPPN').value;
  var GrandTotal  = document.getElementById('gud_retur_tfoot_GrandTotal').value;
  var countRow    = $('#gud_retur_tableentry tr').length;

  if (GrandPPN != ''){
    GrandPPN = document.getElementById('gud_retur_tfoot_GrandPPN').value;
  }else{
    GrandPPN = 0;
  }

  if (GrandTotal != ''){
    GrandTotal = document.getElementById('gud_retur_tfoot_GrandTotal').value;
  }else{
    GrandTotal = 0;
  }
    
  var param = {
    map_idunit    : user['map_bpjs'],
    no_retur      : no_retur,
    pbf           : pbf,
    remark        : remark,
    tglcreate     : document.getElementById("gud_retur_tgl").value,
    iduser        : user['id_user'],
    idpeg         : user['id_pegawai'],
    id_farUser    : user['id_far'],
    data          : gud_retur_paramSimpan(),
    countRow      : countRow,
    GrandPPN      : GrandPPN,
    GrandTotal    : GrandTotal
  };
  
  if (pbf == '0'){
    toastr.error("PBF Belum dipilih.");
    $('#gud_retur_loading').hide();
  }else if (remark == ''){
    toastr.error("Remark Wajib diisi.");
    $('#gud_retur_loading').hide();
  }else if (user['id_far'] == ''){
    toastr.error("Periksa Kembali Konfigurasi Modul Anda.");
    $('#gud_retur_loading').hide();
  }else{
    // swal_center("Sedang Maintenance!!.", "error");
    apiPOST('Gudang/CreateGudangReturBarang', param, hasil => {
      $('#gud_retur_loading').hide();
      if (hasil !== null) {
        if (hasil['code'] == '200'){
          document.getElementById("gud_retur_nomor").value = hasil['no_retur'];
        }else{
          toastr.error('Gagal Simpan Retur!');
        }
      }
    }).then(function(){
      $('#gud_retur_loading').hide();
    });
  }
}

function gud_retur_pos(){
  
  $('#gud_retur_loading').show();
  var no_retur    = document.getElementById("gud_retur_nomor").value;
  var GrandPPN    = document.getElementById('gud_retur_tfoot_GrandPPN').value;
  var GrandTotal  = document.getElementById('gud_retur_tfoot_GrandTotal').value;
  var countRow    = $('#gud_retur_tableentry tr').length;
  var pbf         = document.getElementById("gud_retur_vendor").value;

  if (GrandPPN != ''){
    GrandPPN = document.getElementById('gud_retur_tfoot_GrandPPN').value;
  }else{
    GrandPPN = 0;
  }

  if (GrandTotal != ''){
    GrandTotal = document.getElementById('gud_retur_tfoot_GrandTotal').value;
  }else{
    GrandTotal = 0;
  }

  var param = {
    no_retur      : no_retur,
    tglcreate     : document.getElementById("gud_retur_tgl").value,
    iduser        : user['id_user'],
    idpeg         : user['id_pegawai'],
    id_farUser    : user['id_far'],
    GrandPPN      : GrandPPN,
    GrandTotal    : GrandTotal,
    pbf           : pbf
  };
  
  pertanyaan.fire({
    title             : 'Posting Data',
    html              : '<span>Retur Pembelian Sudah Benar?,<br>Posting dan Simpan Ke Jurnal</span>',
    icon              : 'question',
    showCancelButton  : true,
    reverseButtons    : false,
    allowOutsideClick : false
  }).then((result) => {
    if (result.isConfirmed) {
      apiPOST('Gudang/PostingGudangReturBarang', param, hasil => {
      $('#gud_retur_loading').hide();
        if (hasil !== null) {
          if (hasil['code'] == '200'){
            gud_retur_backk();
          }else{
            toastr.error('Gagal Posting Retur!!');
          }
        }
      }).then(function(){
        $('#gud_retur_loading').hide();
      });

    }else if(result.dismiss === Swal.DismissReason.cancel){
      $('#gud_retur_loading').hide();
    }
  })
}

function gud_retur_hapus(){
  $('#gud_retur_loading').show();
  var no_retur  = document.getElementById("gud_retur_nomor").value;
  if (no_retur != ''){    
    pertanyaan.fire({
      title             : 'Hapus Retur, masukkan alasan dihapus ?',
      html              : '<input type="text" class="form-control form-control-sm" id="gud_retur_alasan" class="swal2-input" placeholder="Enter your reason" autocomplete="off" required>',
      icon              : 'error',
      showCancelButton  : true,
      reverseButtons    : false,
      allowOutsideClick : false
    }).then((result) => {
      if (result.isConfirmed) {
        var alasan = document.getElementById('gud_retur_alasan').value;
        if (alasan != ''){
          
          var param = {
            kdFar         : user['map_bpjs'],
            no_retur      : no_retur,
            tglcreate     : document.getElementById("gud_retur_tgl").value,
            iduser        : user['id_user'],
            idpeg         : user['id_pegawai'],
            id_farUser    : user['id_far'],
            reason        : alasan,
            GrandTotal    : document.getElementById('gud_retur_tfoot_GrandTotal').value,
          };

          apiPOST('Gudang/LogHapusRetur', param, hasil => {
            $('#gud_retur_loading').hide();
            if (hasil !== null) {
              gud_retur_backk();
            }
          }).then(function(){
            //$('#gud_retur_loading').hide();
          });
        }else{
          swal_center('Alasan tidak boleh kosong!!','error');
        }
        
      }else if(result.dismiss === Swal.DismissReason.cancel){
        $('#gud_retur_loading').hide();
      }
    })
  }
}

function gud_retur_back(){
  var noresepAPTRWJ = document.getElementById("gud_retur_nomor").value;
  if (noresepAPTRWJ == ''){    
    pertanyaan.fire({
      title             : 'Kembali ke menu awal',
      html              : '<span>Data Retur belum terSimpan, tetap kembali ?</span>',
      icon              : 'question',
      showCancelButton  : true,
      reverseButtons    : false,
      allowOutsideClick : false
    }).then((result) => {
      if (result.isConfirmed) {
        gud_retur_backk();
      }else if(result.dismiss === Swal.DismissReason.cancel){
        
      }
    })
  }else{
    gud_retur_backk();
  }
}

function gud_retur_backk() {
  $('.gudangRetur').hide();
  $('#gudang_returpembelian_awal').show();
  $('#gudang_returpembelian_kedua').show();
  gudang_returpembelian_showdata();
}

</script>