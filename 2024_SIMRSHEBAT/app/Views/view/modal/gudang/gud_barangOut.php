<?php
  $data = json_decode($_GET['data']);
  $no_gud_out = str_replace('"','', json_encode($data->vGudBarangOut_no));
  $tgl        = str_replace('"','', json_encode($data->vGudBarangOut_tgl));
  $id_unit    = str_replace('"','', json_encode($data->vGudBarangOut_idunit));
  $posting    = str_replace('"','', json_encode($data->vGudBarangOut_posting));
  $tglbuat    = date_format(date_create($tgl), 'Y-m-d'); //FORMAT d-M-Y TGL 02-Feb-2023
  $remark     = str_replace('"','', json_encode($data->vGudBarangOut_remark));
  
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
              <td><input type="date" class="form-control form-control-xs" id="gud_barangOut_tgl"></td>
            </tr>
            <tr>
              <td>No. Pengeluaran</td>
              <td>:</td>
              <td>
                <div class="input-group col-sm-12 p-0">
                  <input type="text" class="form-control form-control-xs" id="gud_barangOut_nomor" disabled>
                  <div class="input-group-prepend">
                    <button type="button" class="btn btn-outline-danger btn-xs" onclick="gud_barangOut_hapuspengeluaran()" id="gud_barangOut_btnhapus"><i class="fa fa-trash"></i></button>
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
              <td width="70">Unit</td>
              <td>:</td>
              <td><select class="form-control form-control-xs" id="gud_barangOut_unit"></select>
              </td>
            </tr>
            <tr>
              <td>Remark</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="gud_barangOut_remark"></td>
            </tr>
          </table>
        </div>
      </div>

    </div>
    <div class="card card-row">
      <div class="overlay-wrapper" id="gud_barangOut_loading">
        <div class="overlay dark">
          <i class="fas fa-3x fa-sync-alt fa-spin"></i>
        </div>
      </div>

      <div class="card-header p-1 darkgrey-custom">
        <!-- <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="gud_barangOut_hometable()" id="gud_barangOut_obat"><i class="fa fa-plus"></i> Tambah Obat</button> -->
        <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="gud_barangOut_delRow('gud_barangOut_tableentry')"><i class="fa fa-times"></i> Hapus Obat</button>
        <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="gud_barangOut_save()" id="gud_barangOut_simpan"><i class="fa fa-save"></i> Simpan</button>
        <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="gud_barangOut_pos()" id="gud_barangOut_posting"><i class="fa fa-arrow-right"></i> Posting</button>
        <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="gud_barangOut_unpos()" id="gud_barangOut_unposting" disabled><i class="fa fa-arrow-left"></i> UnPosting</button>
        <button type="button" class="btn btn-outline-danger btn-xs" onclick="gud_barangOut_back()"><i class="fa fa-arrow-left"></i> Kembali</button>
      </div>

      <div class="modal-body p-0">
        <div class="card-body p-0">
          
          <div class="col-sm-12 p-0 uk-layar" style="height: 72vh; max-height: 72vh; overflow-x: hidden;">
            
            <table class="table table-striped table-sm choose" style="border-collapse: inherit;">
              <thead>
                <tr>
                  <th class="pl-0" width="20" style="text-align:center;">Act</th>
                  <th width="50">Kd. Obat</th>
                  <th width="140">Nm. Obat</th>
                  <th width="40" style="text-align:center;">Sat B</th>
                  <th width="40" style="text-align:center;">Qty B</th>
                  <th width="40" style="text-align:center;">Frac</th>
                  <th width="40" style="text-align:center;">Qty</th>
                  <th width="50" style="text-align:center;">Harga</th>
                  <th width="50" style="text-align:center;">Sisa</th>
                  <th width="40">Expired</th>
                  <th width="40" style="text-align:center;">Total</th>
                </tr>
              </thead>
              <tbody id="gud_barangOut_tableentry"></tbody>
              <tfoot style="background-color: #a8d4da; color: black;">
                <tr>
                  <td colspan="3" class="pl-0 pr-0 pt-2">
                    <input type='search' class='form-control form-control-xxs' id='gud_barangOut_tfoot_nmobat' placeholder="Pencarian Obat" autocomplete="off">
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='text' class='form-control form-control-xxs' id='gud_barangOut_tfoot_satB' readonly>
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type="number" placeholder="1.00" step="0.01" min="0" max="10" class='form-control form-control-xxs' id='gud_barangOut_tfoot_qtyB'>
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='number' class='form-control form-control-xxs' id='gud_barangOut_tfoot_frac' value="0">
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='number' class='form-control form-control-xxs' id='gud_barangOut_tfoot_qty' value="0" placeholder="0.00" step="0.01" min="0">
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='number' class='form-control form-control-xxs' id='gud_barangOut_tfoot_harga' value="0" disabled>
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='number' class='form-control form-control-xxs' id='gud_barangOut_tfoot_stoktersedia' value="0" disabled>
                  </td>
                  <td class="pl-0 pr-0 pt-2" colspan="2" >
                    <input type='date' class='form-control form-control-xxs' id='gud_barangOut_tfoot_exp'>
                  </td>
                  <td class="pl-0 pr-0 pt-2" width="50" hidden>
                    <input type='number' class='form-control form-control-xxs' id='gud_barangOut_tfoot_stoktersedia_backup' value="0" disabled>
                  </td>
                </tr>
              </tfoot>
            </table> 
          </div>
          
        </div>

        <div class="card-footer p-1 darkgrey-custom" style="border-top: 1px solid; bottom: 40px; position: sticky;">
          <div class="row" style="justify-content: right; font-weight: bold;">
            <div class="input-group col-sm-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text form-control-xs">GrandTotal Rp.&nbsp;</span>
                </div>
                <h4 id="veresepRWJAPT_hargaTotal" name="veresepRWJAPT_hargaTotal" hidden></h4>
                <input type="text" class="form-control form-control-xs" id="gud_barangOut_total" value="0" style="font-size: 17px; font-weight: bold; text-align: right;" readonly>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<script type="text/javascript">
$('.gudangOut').show();
$('#gud_barangOut_loading').hide();

var no_gud_out  = "<?php echo $no_gud_out; ?>";
var tglbuat     = "<?php echo $tglbuat; ?>";
var id_unit     = "<?php echo $id_unit; ?>";
var remark      = "<?php echo $remark; ?>";
var posting     = "<?php echo $posting; ?>";
var flag;

document.getElementById('gud_barangOut_nomor').value = no_gud_out;

var kd_obatauto_gud_barangOut;

var maxdate = "gud_barangOut_tgl";
max_date(maxdate);

gud_barangOut_unit();

if (document.getElementById('gud_barangOut_nomor').value == ''){
  document.getElementById('gud_barangOut_tgl').value = nowday;
  flag = false;
  gud_barangOut_pencarianobat(flag);
  document.getElementById('gud_barangOut_unposting').disabled    = true;
  document.getElementById('gud_barangOut_btnhapus').disabled     = true;

}else{
  document.getElementById('gud_barangOut_tgl').value      = tglbuat;
  document.getElementById('gud_barangOut_remark').value   = remark;
  gud_barangOut_showdataDetail(no_gud_out);

  if (posting != 'f'){ //SUDAH DIPOSTING
    flag = true;
    gud_barangOut_pencarianobat(flag);
    document.getElementById('gud_barangOut_unposting').disabled    = false;
    document.getElementById('gud_barangOut_btnhapus').disabled     = flag;
  }else{
    flag = false;
    gud_barangOut_pencarianobat(flag);
    document.getElementById('gud_barangOut_unposting').disabled    = true;
    document.getElementById('gud_barangOut_btnhapus').disabled     = flag;
  }

}

function gud_barangOut_input(flag){
  document.getElementById('gud_barangOut_tfoot_nmobat').disabled = flag;
  document.getElementById('gud_barangOut_tfoot_qtyB').disabled   = flag;
  document.getElementById('gud_barangOut_tfoot_frac').disabled   = flag;
  document.getElementById('gud_barangOut_tfoot_harga').disabled  = flag;
  document.getElementById('gud_barangOut_tfoot_qty').disabled    = flag;
  document.getElementById('gud_barangOut_tfoot_exp').disabled    = flag;

  document.getElementById('gud_barangOut_simpan').disabled       = flag;
  document.getElementById('gud_barangOut_posting').disabled      = flag;

  kd_obatauto_gud_barangOut.onPilih(()=>{
    var kd_obat     = kd_obatauto_gud_barangOut.getValue();
    var nm_obat     = $('#gud_barangOut_tfoot_nmobat').val();
    var arrnm_obat  = nm_obat.split('<br>Satuan Besar : ');
    var arrnm_obat2 = arrnm_obat[1].split(' , Fraction : ');
    var arrnm_obat3 = arrnm_obat2[1].split('<br>Stok Tersedia : ');
    var arrnm_obat4 = arrnm_obat3[1].split(' , Harga Satuan : ');
    var arrnm_obat5 = arrnm_obat4[1].split(' , Expired : ');
    
    var arrnamaobat = arrnm_obat[0];
    var arrsatBesar = arrnm_obat2[0];
    var arrFraction = arrnm_obat3[0];
    var arrStokSedia= arrnm_obat4[0];
    var arrHargaObat= arrnm_obat5[0];
    var arrExpObat  = arrnm_obat5[1];
    
    $('#gud_barangOut_tfoot_nmobat').val(arrnamaobat);
    if (arrsatBesar != 'null'){
      $('#gud_barangOut_tfoot_satB').val(arrsatBesar);
    }else{
      $('#gud_barangOut_tfoot_satB').val('-');
    }
    
    $('#gud_barangOut_tfoot_frac').val(arrFraction);
    $('#gud_barangOut_tfoot_stoktersedia').val(arrStokSedia);
    $('#gud_barangOut_tfoot_stoktersedia_backup').val(arrStokSedia);
    $('#gud_barangOut_tfoot_harga').val(arrHargaObat);
    $('#gud_barangOut_tfoot_exp').val(arrExpObat);

    $('#gud_barangOut_tfoot_qtyB').trigger('focus');
  });

  $("#gud_barangOut_tfoot_satB").on( "keydown", function(e) {
    switch(event.which){      
      case 13:
        $('#gud_barangOut_tfoot_qtyB').trigger('focus');
        break;
    }
  });

  $("#gud_barangOut_tfoot_qtyB").on( "keydown", function(e) {
    switch(event.which){      
      case 13:
        var frac  = $('#gud_barangOut_tfoot_frac').val();
        var qtyB  = $(this).val();
        if (qtyB == ''){
          qtyB = 0;
        }else{
          qtyB = $(this).val();
        }
        let qty   = 0;
        
        qty = parseFloat(qtyB) * parseFloat(frac);
        
        $("#gud_barangOut_tfoot_qty").val(qty);

        $('#gud_barangOut_tfoot_frac').trigger('focus');
        break;
    }
  });

  $("#gud_barangOut_tfoot_frac").on( "keydown", function(e) {
    switch(event.which){      
      case 13:

        var frac  = $(this).val();
        var qtyB  = $('#gud_barangOut_tfoot_qtyB').val();
        
        if (qtyB == ''){
          qtyB = 0;
        }else{
          qtyB = $('#gud_barangOut_tfoot_qtyB').val();
        }

        if (frac == ''){
          frac = 0;
        }else{
          frac = $(this).val();
        }

        let qty   = 0;
        qty = parseFloat(qtyB) * parseFloat(frac);
        
        $("#gud_barangOut_tfoot_qty").val(qty);
 
        $('#gud_barangOut_tfoot_qty').trigger('focus');
        break;
    }
  });

  $("#gud_barangOut_tfoot_qty").on( "keydown", function(e) {
    switch(event.which){      
      case 13:
        var qtyK  = $(this).val();        
        var frac  = $('#gud_barangOut_tfoot_frac').val();

        if (qtyK == ''){
          qtyK = 0;
        }else{
          qtyK = $(this).val();
        }

        let qtyB  = 0;
        qtyB = parseFloat(qtyK) / parseFloat(frac);
        
        $("#gud_barangOut_tfoot_qtyB").val(qtyB.toFixed(2));

        $('#gud_barangOut_tfoot_exp').trigger('focus');
        break;
    }
  });


  $("#gud_barangOut_tfoot_exp").on( "keydown", function(e) {
    switch(event.which){      
      case 13:
        cekstok();
        break;
    }
  });
}

function cekstok(){
  var stokTersedia = $('#gud_barangOut_tfoot_stoktersedia_backup').val();
  var qtyK         = $('#gud_barangOut_tfoot_qty').val();
  let result = 0;
  result = parseFloat(stokTersedia) - parseFloat(qtyK);

  if (parseFloat(qtyK) > parseFloat(stokTersedia)){
    toastr.error("Jumlah Obat Melebihi Stok Tersedia!");
    //$('#gud_barangOut_tfoot_stoktersedia').val(result);
  }else{
    $('#gud_barangOut_tfoot_stoktersedia').val(result);
    gud_barangOut_next();
  }
}

function gud_barangOut_next(){
  var kd_obat   = kd_obatauto_gud_barangOut.getValue();
  var nm_obat   = $('#gud_barangOut_tfoot_nmobat').val();
  var satB      = $('#gud_barangOut_tfoot_satB').val();
  var qtyB      = $('#gud_barangOut_tfoot_qtyB').val();
  var frac      = $('#gud_barangOut_tfoot_frac').val();
  var qty       = $('#gud_barangOut_tfoot_qty').val();
  var exp       = $('#gud_barangOut_tfoot_exp').val();
  var harga     = $('#gud_barangOut_tfoot_harga').val();
  var sisa      = $('#gud_barangOut_tfoot_stoktersedia').val();
  let totalperitem = 0;
  totalperitem  = parseFloat(qty) * parseFloat(harga);

  if (kd_obat != null){
    if (qtyB == ''){
      toastr.error("Qty Besar masih kosong!!");
    }else if(frac == ''){
      toastr.error("Fraction masih kosong!!");
    }else if(qty == ''){
      toastr.error("Jumlah Obat masih kosong!!");
    }else if(exp == ''){
      toastr.error("Expired masih kosong!!");
    }else if (qty <= 0){
      toastr.error("Jumlah Obat masih kosong!!");
    }else if (sisa < 0){
      toastr.error("Stok Tersedia Minus, Jumlah Obat Melebihi Jumlah Stok.");
    }else{
      gud_barangOut_replace(kd_obat, nm_obat, satB, qtyB, frac, qty, harga, sisa, exp, totalperitem);
    }
  }else{
    toastr.error("Nama obat tidak ditemukan!!");
  }
  
}

function gud_barangOut_showdataDetail(no_gud_out){
  var param = {
    iduser       : user['id_user'],
    no_gud_out   : no_gud_out
  };

  apiPOST('Gudang/gud_barangOut_showdataDetail', param, hasil => {
    if (hasil !== null) {
      var list = hasil['data'];
      for (var i = 0; i < list.length; i++) {
        var kd_obat   = list[i]['kd_obat'];
        var nm_obat   = list[i]['nama_obat'].toUpperCase();
        var satB      = list[i]['kd_sat_besar'];
        let qtyB      = 0;
        var frac      = list[i]['fraction'];
        var qty       = list[i]['stok_dikeluarkan'];
        var harga     = list[i]['harga_beli'];
        var stok_unit = list[i]['stok_unit'];
        var exp       = list[i]['exp'];

        let totalperitem  = 0;
        totalperitem      = parseFloat(qty) * parseFloat(harga);
        qtyB = parseFloat(qty) / parseFloat(frac);

        if (satB == null){
          satB = '-';
        }else{
          satB = list[i]['kd_sat_besar'];
        }

        if (stok_unit > 0){
          var sisa      = stok_unit - qty;
        }else{
          var sisa      = stok_unit;
        }

        gud_barangOut_replace(kd_obat, nm_obat, satB, qtyB, frac, qty, harga, sisa, exp, totalperitem);
      }
    }
  });
}

function gud_barangOut_emptyRow(){
  kd_obatauto_gud_barangOut.reset();
  document.getElementById('gud_barangOut_tfoot_satB').value         = "";
  document.getElementById('gud_barangOut_tfoot_qtyB').value         = "";
  document.getElementById('gud_barangOut_tfoot_frac').value         = "0";
  document.getElementById('gud_barangOut_tfoot_qty').value          = "0";
  document.getElementById('gud_barangOut_tfoot_exp').value          = "";
  document.getElementById('gud_barangOut_tfoot_harga').value        = "";
  document.getElementById('gud_barangOut_tfoot_stoktersedia').value = "";
  document.getElementById('gud_barangOut_tfoot_stoktersedia_backup').value = "";
  setTimeout(refresh, 500);
}

function refresh(){
  document.getElementById('gud_barangOut_tfoot_nmobat').focus();
}

function gud_barangOut_unit() {
  var param = {
    id_unit : user['id_far'],
  }
  apiPOST('Apotek/getUnitDepoFarmasi', param, hasil => {
    var data = hasil['data'];
    var ven = '';
      ven += '<option value="0">- Pilih Unit -</option>';
    for (var i = 0; i < data.length; i++) {
      ven += '<option value="'+ data[i]['id_unit'] +'">'+ data[i]['nama_unit'].toUpperCase()+'</option>';
    }
    document.getElementById('gud_barangOut_unit').innerHTML = ven;
  });
}

function gud_barangOut_pencarianobat(flag){
  $('#gud_barangOut_tfoot_nmobat').trigger('focus');
  var param = {
    obatcari: '',
    id_user : user['id_user'],
  };

  kd_obatauto_gud_barangOut = new AutoComplete("gud_barangOut_tfoot_nmobat");
  apiPOST('Gudang/gud_barangOut_searching', param, hasil => {
    if (hasil !== null) {
      var list = hasil['data'];
      list.forEach(baru => {
        kd_obatauto_gud_barangOut.addData(baru['kd_obat'], baru['nama_obat']+'<br>Satuan Besar : '+baru['kd_sat_besar']+' , Fraction : '+baru['fraction']+'<br>Stok Tersedia : '+baru['stok_unit']+' , Harga Satuan : '+baru['harga_satuan']+' , Expired : '+baru['exp']);
      });
    }
    if (id_unit > 0){
      document.getElementById('gud_barangOut_unit').value     = id_unit;
    }
    
  });

  gud_barangOut_input(flag);
}

function gud_barangOut_delRow(tableID) {
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
}

function gud_barangOut_replace(kd_obat, nm_obat, satB, qtyB, frac, qty, harga, sisa, exp, totalperitem){
  
  var data = '';
      data += "<tr>";
      data += "<td class='pl-0' style='text-align:center;'><input type='checkbox' name='gud_barangOut_hometable_check[]' class='form-control-xs'/></td>"; //1
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_barangOut_hometable_kdobat[]' value='" + kd_obat + "'  disabled>";
      data += "</td>"; //2
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_barangOut_hometable_nmobat[]' value='" + nm_obat + "' disabled>";
      data += "</td>"; //3
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_barangOut_hometable_satB[]' value='" + satB + "' style='text-align: center;' disabled>";
      data += "</td>"; //4
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_barangOut_hometable_qtyB[]' value='" + qtyB + "' style='text-align: center;' disabled>";
      data += "</td>"; //5
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_barangOut_hometable_frac[]' value='" + frac + "' style='text-align: center;' disabled>";
      data += "</td>"; //6
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_barangOut_hometable_qty[]' value='" + qty + "' style='text-align: center;' disabled>";
      data += "</td>"; //7
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_barangOut_hometable_harga[]' value='" + harga + "' style='text-align: center;' disabled>";
      data += "</td>"; //8
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_barangOut_hometable_sisa[]' value='" + sisa + "' style='text-align: center;' disabled>";
      data += "</td>"; //9
      data += "<td class='pr-0'>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_barangOut_hometable_expired[]' value='" + exp + "' disabled>";
      data += "</td>"; //10
      data += "<td class='pr-0'>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_barangOut_hometable_total[]' value='" + totalperitem + "' style='text-align: right;' disabled>";
      data += "</td>"; //11
      
      data += "</tr>";

  var getkd_obat  = document.getElementsByName('gud_barangOut_hometable_kdobat[]');
  var jmlRow      = $('#gud_barangOut_tableentry tr').length;
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
    $('#gud_barangOut_tableentry').append(data);
    gud_barangOut_proses_penjumlahan(totalperitem);
  }else{
    toastr.error("Obat Sudah Diinputkan!!");
  }

  gud_barangOut_emptyRow();
}

function gud_barangOut_proses_penjumlahan(totalperitem){
  var totalx  = document.getElementById("gud_barangOut_total").value;
  let result = 0;
  result = parseFloat(totalx) + parseFloat(totalperitem);

  document.getElementById("gud_barangOut_total").value = result;
}

function gud_barangOut_back(){
  var noresepAPTRWJ = document.getElementById("gud_barangOut_nomor").value;
  if (noresepAPTRWJ == ''){    
    pertanyaan.fire({
      title             : 'Kembali ke menu awal',
      html              : '<span>Data Pengeluaran Barang belum tersimpan, tetap kembali ?</span>',
      icon              : 'question',
      showCancelButton  : true,
      reverseButtons    : false,
      allowOutsideClick : false
    }).then((result) => {
      if (result.isConfirmed) {
        gud_barangOut_backk();
      }else if(result.dismiss === Swal.DismissReason.cancel){
        
      }
    })
  }else{
    gud_barangOut_backk();
  }
}

function gud_barangOut_backk() {
  $('.gudangOut').hide();
  $('#gudang_pengeluaran_unit').show();
  $('#gudang_pengeluaran_listpermintaan').show();
  gudang_pengeluaran_unit_showdata();
  gudang_pengeluaran_listpermintaan_unit_showdata();
}

function gud_barangOut_paramSimpan(){

  var kd_obt    = document.getElementsByName('gud_barangOut_hometable_kdobat[]');
  var nmobat    = document.getElementsByName('gud_barangOut_hometable_nmobat[]');
  var satB      = document.getElementsByName('gud_barangOut_hometable_satB[]');
  var qtyB      = document.getElementsByName('gud_barangOut_hometable_qtyB[]');
  var frac      = document.getElementsByName('gud_barangOut_hometable_frac[]');
  var qtyK      = document.getElementsByName('gud_barangOut_hometable_qty[]');
  var hargaSat  = document.getElementsByName('gud_barangOut_hometable_harga[]');
  var sisa      = document.getElementsByName('gud_barangOut_hometable_sisa[]');
  var exp       = document.getElementsByName('gud_barangOut_hometable_expired[]');

  var count     = $('#gud_barangOut_tableentry tr').length;
  
  var params = {};  
  params.data     = [];
  for(var i = 0, iLen = count ; i < iLen; i++){
    var x = {};
    x.kd_obt    = kd_obt[i].value;
    x.nmobat    = nmobat[i].value;
    x.satB      = satB[i].value;
    x.qtyB      = qtyB[i].value;
    x.frac      = frac[i].value;
    x.qtyK      = qtyK[i].value;
    x.hargaSat  = hargaSat[i].value;
    x.sisa      = sisa[i].value;
    x.exp       = exp[i].value;
    
    //if (typeof(disc[i].value) !== 'undefined') {
    // if (disc[i].value !== '') {
    //   x.disc   = disc[i].value;
    // }else{
    //   x.disc   = 0;
    // }

    params.data.push(x);
  }
  
  console.log(params.data);
  return params.data;
}

function gud_barangOut_save(){
  $('#gud_barangOut_loading').show();
  var no_gud_out  = document.getElementById("gud_barangOut_nomor").value;
  var unit        = document.getElementById("gud_barangOut_unit").value;
  var remark      = document.getElementById("gud_barangOut_remark").value;
  var total       = document.getElementById('gud_barangOut_total').value;

  if (total != ''){
    total = document.getElementById('gud_barangOut_total').value;
  }else{
    total = 0;
  }

  var param = {
    map_idunit    : user['map_bpjs'],
    no_gud_out    : no_gud_out,
    unit          : unit,
    remark        : remark,
    tglcreate     : document.getElementById("gud_barangOut_tgl").value,
    iduser        : user['id_user'],
    idpeg         : user['id_pegawai'],
    id_farUser    : user['id_far'],
    data          : gud_barangOut_paramSimpan(),
    countRow      : $('#gud_barangOut_tableentry tr').length,
    total         : total
  };
  
  if (unit == '0'){
    toastr.error("Unit tujuan Belum dipilih.");
    $('#gud_barangOut_loading').hide();
  }else if (remark == ''){
    toastr.error("Remark Wajib diisi.");
    $('#gud_barangOut_loading').hide();
  }else if (user['id_far'] == ''){
    toastr.error("Periksa Kembali Konfigurasi Modul Anda.");
    $('#gud_barangOut_loading').hide();
  }else{
    apiPOST('Gudang/CreateGudangBarangOut', param, hasil => {
      $('#gud_barangOut_loading').hide();
      if (hasil !== null) {
        if (hasil['code'] == '200'){
          document.getElementById("gud_barangOut_nomor").value = hasil['no_gud_out'];
        }else{
          toastr.error('Gagal Simpan Pengeluaran Barang!!');
        }
      }
      //gud_barangOut_pencarianobat();
    }).then(function(){
      $('#gud_barangOut_loading').hide();
    });
  }
}

function gud_barangOut_pos(){
  
  $('#gud_barangOut_loading').show();
  var no_gud_out  = document.getElementById("gud_barangOut_nomor").value;
  var total       = document.getElementById('gud_barangOut_total').value;

  if (total != ''){
    total = document.getElementById('gud_barangOut_total').value;
  }else{
    total = 0;
  }

  var param = {
    no_gud_out    : no_gud_out,
    tglcreate     : document.getElementById("gud_barangOut_tgl").value,
    iduser        : user['id_user'],
    idpeg         : user['id_pegawai'],
    id_farUser    : user['id_far'],
    total         : total
  };
  
  pertanyaan.fire({
    title             : 'Posting Data',
    html              : '<span>Pengeluaran Barang Ke Depo/Unit Sudah Benar?,<br>Lanjut Posting</span>',
    icon              : 'question',
    showCancelButton  : true,
    reverseButtons    : false,
    allowOutsideClick : false
  }).then((result) => {
    if (result.isConfirmed) {
      apiPOST('Gudang/PostingGudangBarangOut', param, hasil => {
      $('#gud_barangOut_loading').hide();
        if (hasil !== null) {
          if (hasil['code'] == '200'){
            gud_barangOut_backk();
          }else{
            toastr.error('Gagal Posting Pengeluaraan!!');
          }
        }
      }).then(function(){
        $('#gud_barangOut_loading').hide();
      });

    }else if(result.dismiss === Swal.DismissReason.cancel){
      $('#gud_barangOut_loading').hide();
    }
  })
}

function gud_barangOut_unpos() {
  $('#gud_barangOut_loading').show();
  var no_gud_out  = document.getElementById("gud_barangOut_nomor").value;
  
  var param = {
    no_gud_out     : no_gud_out,
    tglcreate     : document.getElementById("gud_barangOut_tgl").value,
    iduser        : user['id_user'],
    idpeg         : user['id_pegawai'],
    id_farUser    : user['id_far']
  };
  
  pertanyaan.fire({
    title             : 'UnPosting Pengeluaran Barang',
    html              : '<span>Pengeluaran Barang Keluar Sudah Ditutup, Buka Kembali ?</span>',
    icon              : 'question',
    showCancelButton  : true,
    reverseButtons    : false,
    allowOutsideClick : false
  }).then((result) => {
    if (result.isConfirmed) {
      apiPOST('Gudang/UnPostingGudangBarangOut', param, hasil => {
      $('#gud_barangOut_loading').hide();
        if (hasil !== null) {
          if (hasil['code'] == '200'){
            gud_barangOut_backk();
          }else{
            toastr.error('Gagal UnPosting Pengeluaran!!');
          }
        }
      }).then(function(){
        $('#gud_barangOut_loading').hide();
      });

    }else if(result.dismiss === Swal.DismissReason.cancel){
      $('#gud_barangOut_loading').hide();
    }
  })
}

function gud_barangOut_hapuspengeluaran(){
  $('#gud_barangOut_loading').show();
  var no_gud_out  = document.getElementById("gud_barangOut_nomor").value;
  var total       = document.getElementById('gud_barangOut_total').value;

  if (total != ''){
    total = document.getElementById('gud_barangOut_total').value;
  }else{
    total = 0;
  }

  if (no_gud_out != ''){    
    pertanyaan.fire({
      title             : 'Hapus Pengeluaran Gudang, masukkan alasan dihapus ?',
      html              : '<input type="text" class="form-control form-control-sm" id="gud_barangOut_alasan" class="swal2-input" placeholder="Enter your reason" autocomplete="off" required>',
      icon              : 'error',
      showCancelButton  : true,
      reverseButtons    : false,
      allowOutsideClick : false
    }).then((result) => {
      if (result.isConfirmed) {
        var alasan = document.getElementById('gud_barangOut_alasan').value;
        if (alasan != ''){
          
          var param = {
            kdFar         : user['map_bpjs'],
            no_gud        : no_gud_out,
            tglcreate     : document.getElementById("gud_barangOut_tgl").value,
            iduser        : user['id_user'],
            idpeg         : user['id_pegawai'],
            id_farUser    : user['id_far'],
            idunit        : id_unit,
            reason        : alasan,
            GrandTotal    : total,
            code          : '02'
          };

          apiPOST('Gudang/LogHapusPenerimaan', param, hasil => {
            $('#gud_barangOut_loading').hide();
            if (hasil !== null) {
              gud_barangOut_backk();
            }
          }).then(function(){
            //$('#gud_barangOut_loading').hide();
          });
        }else{
          swal_center('Alasan tidak boleh kosong!!','error');
        }
        
      }else if(result.dismiss === Swal.DismissReason.cancel){
        $('#gud_barangOut_loading').hide();
      }
    })
  }
}
</script>