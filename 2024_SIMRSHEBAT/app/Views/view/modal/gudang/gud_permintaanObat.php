<?php
  $data = json_decode($_GET['data']);
  $nopermint  = str_replace('"','', json_encode($data->vGudPermintaanObatIn_no));
  $tglpermint = str_replace('"','', json_encode($data->vGudPermintaanObatIn_tgl));
  $id_unittuj = str_replace('"','', json_encode($data->vGudPermintaanObatIn_tujuan));
  $keterangan = str_replace('"','', json_encode($data->vGudPermintaanObatIn_ket));
  $posting    = str_replace('"','', json_encode($data->vGudPermintaanObatIn_posting));
  $tglbuat    = date_format(date_create($tglpermint), 'Y-m-d'); //FORMAT d-M-Y TGL 02-Feb-2023
  $acc        = str_replace('"','', json_encode($data->vGudPermintaanObatIn_acc));
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
              <td><input type="date" class="form-control form-control-xs" id="gud_permintaanObat_tgl"></td>
            </tr>
            <tr>
              <td>No. Permintaan</td>
              <td>:</td>
              <td>
                <div class="input-group col-sm-12 p-0">
                  <input type="text" class="form-control form-control-xs" id="gud_permintaanObat_nomor" disabled>
                  <div class="input-group-prepend">
                    <button type="button" class="btn btn-outline-danger btn-xs" onclick="gud_permintaanObat_hapuspengeluaran()" id="gud_permintaanObat_btnhapus"><i class="fa fa-trash"></i></button>
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
              <td width="70">Unit Tujuan</td>
              <td>:</td>
              <td><select class="form-control form-control-xs" id="gud_permintaanObat_unit" onchange="gud_permintaanObat_change()"></select>
              </td>
            </tr>
            <tr>
              <td>Keterangan</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="gud_permintaanObat_keterangan"></td>
            </tr>
          </table>
        </div>
      </div>

    </div>
    <div class="card card-row">
      <div class="overlay-wrapper" id="gud_permintaanObat_loading">
        <div class="overlay dark">
          <i class="fas fa-3x fa-sync-alt fa-spin"></i>
        </div>
      </div>

      <div class="card-header p-1 darkgrey-custom">
        <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="gud_permintaanObat_delRow('gud_permintaanObat_tableentry')"><i class="fa fa-times"></i> Hapus Obat</button>
        <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="gud_permintaanObat_save()" id="gud_permintaanObat_simpan"><i class="fa fa-save"></i> Simpan</button>
        <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="gud_permintaanObat_pos()" id="gud_permintaanObat_posting"><i class="fa fa-arrow-right"></i> Posting</button>
        <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="gud_permintaanObat_unpos()" id="gud_permintaanObat_unposting" disabled><i class="fa fa-arrow-left"></i> UnPosting</button>
        <button type="button" class="btn btn-outline-danger btn-xs" onclick="gud_permintaanObat_back()"><i class="fa fa-arrow-left"></i> Kembali</button>
      </div>

      <div class="modal-body p-0">
        <div class="card-body p-0">
          
          <div class="col-sm-12 p-0 uk-layar" style="height: 71vh; max-height: 72vh; overflow-x: hidden;">
            
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
                  <th width="50" style="text-align:center;">Expired</th>
                  <th width="140">Keterangan</th>
                  <!-- <th width="50" style="text-align:center;">Harga</th>
                  <th width="40" style="text-align:center;">Total</th> -->
                </tr>
              </thead>
              <tbody id="gud_permintaanObat_tableentry"></tbody>
              <tfoot id="gud_permintaanObat_tfoot" style="background-color: #a8d4da; color: black;">
                <tr>
                  <td colspan="3" class="pl-0 pr-0 pt-2">
                    <input type='search' class='form-control form-control-xxs' id='gud_permintaanObat_tfoot_nmobat' placeholder="Pencarian Obat" autocomplete="off">
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='text' class='form-control form-control-xxs' id='gud_permintaanObat_tfoot_satB' readonly>
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type="number" placeholder="1.00" step="0.01" min="0" max="10" class='form-control form-control-xxs' id='gud_permintaanObat_tfoot_qtyB'>
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='number' class='form-control form-control-xxs' id='gud_permintaanObat_tfoot_frac' value="0" disabled>
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='number' class='form-control form-control-xxs' id='gud_permintaanObat_tfoot_qty' value="0" placeholder="0.00" step="0.01" min="0">
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='date' class='form-control form-control-xxs' id='gud_permintaanObat_tfoot_exp' readonly>
                  </td>
                  <td class="pl-0 pr-0 pt-2" colspan="2" >
                    <input type='text' class='form-control form-control-xxs' id='gud_permintaanObat_tfoot_keterangan'>
                  </td>
                  <td class="pl-0 pr-0 pt-2 d-none">
                    <input type='number' class='form-control form-control-xxs' id='gud_permintaanObat_tfoot_stoktersedia_backup' disabled>
                  </td>
                  <td class="pl-0 pr-0 pt-2 d-none">
                    <input type='number' class='form-control form-control-xxs' id='gud_permintaanObat_tfoot_harga' value="0" disabled>
                  </td>
                </tr>
              </tfoot>
            </table> 
          </div>
          
        </div>

        <div class="card-footer p-1 darkgrey-custom d-none" style="border-top: 1px solid; bottom: 40px; position: sticky;">
          <div class="row" style="justify-content: right; font-weight: bold;">
            <div class="input-group col-sm-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text form-control-xs">GrandTotal Rp.&nbsp;</span>
                </div>
                <input type="text" class="form-control form-control-xs" id="gud_permintaanObat_total" value="0" style="font-size: 17px; font-weight: bold; text-align: right;" readonly>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<script type="text/javascript">
$('.gudangObatIn').show();
$('#gud_permintaanObat_loading').hide();

var nopermint   = "<?php echo $nopermint; ?>";
var tglpermint  = "<?php echo $tglpermint; ?>";
var id_unittuj  = "<?php echo $id_unittuj; ?>";
var remark      = "<?php echo $keterangan; ?>";
var posting     = "<?php echo $posting; ?>";
var accUnit     = "<?php echo $acc; ?>";
var tglbuat     = "<?php echo $tglbuat; ?>";
var kd_obatauto_gud_permintaanObat;
var flag;

document.getElementById('gud_permintaanObat_nomor').value = nopermint;

var maxdate = "gud_permintaanObat_tgl";
max_date(maxdate);



if (document.getElementById('gud_permintaanObat_nomor').value == ''){
  document.getElementById('gud_permintaanObat_tgl').value = nowday;
  flag = false;
  gud_permintaanObat_pencarianobat(flag);
  document.getElementById('gud_permintaanObat_unposting').disabled    = true;
  document.getElementById('gud_permintaanObat_btnhapus').disabled     = true;
  prosesInputan(flag);
}else{
  document.getElementById('gud_permintaanObat_tgl').value             = tglbuat;
  document.getElementById('gud_permintaanObat_keterangan').value      = remark;
  gud_permintaanObat_showdataDetail(nopermint, tglpermint, id_unittuj);

  if (accUnit == 't'){
    flag = true;
    prosesInputan(flag);
    rubahidunittujuan(id_unittuj);
    document.getElementById('gud_permintaanObat_simpan').disabled     = flag;
    document.getElementById('gud_permintaanObat_posting').disabled    = flag;
    document.getElementById('gud_permintaanObat_unposting').disabled  = flag;
    document.getElementById('gud_permintaanObat_btnhapus').disabled   = flag;
    document.getElementById('gud_permintaanObat_tfoot').style.display = 'none';
  }else if (accUnit == 'f'){

    if (posting != 'f'){ //SUDAH DIPOSTING
      flag = true;
      rubahidunittujuan(id_unittuj);
      gud_permintaanObat_pencarianobat(flag);
      document.getElementById('gud_permintaanObat_unposting').disabled    = false;
      document.getElementById('gud_permintaanObat_btnhapus').disabled     = flag;
    }else{
      flag = false;
      rubahidunittujuan(id_unittuj);
      gud_permintaanObat_pencarianobat(flag);
      document.getElementById('gud_permintaanObat_unposting').disabled    = true;
      document.getElementById('gud_permintaanObat_btnhapus').disabled     = flag;
    }

    prosesInputan(flag);

  }

}

function gud_permintaanObat_input(flag){
  document.getElementById('gud_permintaanObat_tfoot_nmobat').disabled = flag;
  document.getElementById('gud_permintaanObat_tfoot_qtyB').disabled   = flag;
  document.getElementById('gud_permintaanObat_tfoot_frac').disabled   = flag;
  document.getElementById('gud_permintaanObat_tfoot_qty').disabled    = flag;
  document.getElementById('gud_permintaanObat_tfoot_exp').disabled    = flag;

  document.getElementById('gud_permintaanObat_simpan').disabled       = flag;
  document.getElementById('gud_permintaanObat_posting').disabled      = flag;
}

function prosesInputan(flag){
  gud_permintaanObat_unit(flag);
  $("#gud_permintaanObat_tfoot_satB").on( "keydown", function(e) {
    switch(event.which){      
      case 13:
        $('#gud_permintaanObat_tfoot_qtyB').trigger('focus');
        break;
    }
  });

  $("#gud_permintaanObat_tfoot_qtyB").on( "keydown", function(e) {
    switch(event.which){      
      case 13:
        var frac  = $('#gud_permintaanObat_tfoot_frac').val();
        var qtyB  = $(this).val();
        if (qtyB == ''){
          qtyB = 0;
        }else{
          qtyB = $(this).val();
        }
        let qty   = 0;
        
        qty = parseFloat(qtyB) * parseFloat(frac);
        
        $("#gud_permintaanObat_tfoot_qty").val(qty);

        $('#gud_permintaanObat_tfoot_frac').trigger('focus');
        break;
    }
  });

  $("#gud_permintaanObat_tfoot_frac").on( "keydown", function(e) {
    switch(event.which){      
      case 13:

        var frac  = $(this).val();
        var qtyB  = $('#gud_permintaanObat_tfoot_qtyB').val();
        
        if (qtyB == ''){
          qtyB = 0;
        }else{
          qtyB = $('#gud_permintaanObat_tfoot_qtyB').val();
        }

        if (frac == ''){
          frac = 0;
        }else{
          frac = $(this).val();
        }

        let qty   = 0;
        qty = parseFloat(qtyB) * parseFloat(frac);
        
        $("#gud_permintaanObat_tfoot_qty").val(qty);
 
        $('#gud_permintaanObat_tfoot_qty').trigger('focus');
        break;
    }
  });

  $("#gud_permintaanObat_tfoot_qty").on( "keydown", function(e) {
    switch(event.which){      
      case 13:
        var qtyK  = $(this).val();        
        var frac  = $('#gud_permintaanObat_tfoot_frac').val();

        if (qtyK == ''){
          qtyK = 0;
        }else{
          qtyK = $(this).val();
        }

        let qtyB  = 0;
        qtyB = parseFloat(qtyK) / parseFloat(frac);
        
        $("#gud_permintaanObat_tfoot_qtyB").val(qtyB.toFixed(2));

        $('#gud_permintaanObat_tfoot_keterangan').trigger('focus');
        break;
    }
  });

  $("#gud_permintaanObat_tfoot_keterangan").on( "keydown", function(event) {
    switch(event.which){
      case 13:
        cekketersediaanstok();
        // console.log(event.key);
        break;
    }
  });
}

function cekketersediaanstok(){
  var stokTersedia = $('#gud_permintaanObat_tfoot_stoktersedia_backup').val();
  var qtyK         = $('#gud_permintaanObat_tfoot_qty').val();
  let result = 0;
  result = parseFloat(stokTersedia) - parseFloat(qtyK);

  if (parseFloat(qtyK) > parseFloat(stokTersedia)){
    toastr.error("Jumlah Obat Melebihi Stok Tersedia!");
  }else{
    //$('#gud_permintaanObat_tfoot_stoktersedia').val(result);
    gud_permintaanObat_next();
  }
}

function gud_permintaanObat_next(){
  var kd_obat   = kd_obatauto_gud_permintaanObat.getValue();
  var nm_obat   = $('#gud_permintaanObat_tfoot_nmobat').val();
  var satB      = $('#gud_permintaanObat_tfoot_satB').val();
  var qtyB      = $('#gud_permintaanObat_tfoot_qtyB').val();
  var frac      = $('#gud_permintaanObat_tfoot_frac').val();
  var qty       = $('#gud_permintaanObat_tfoot_qty').val();
  var exp       = $('#gud_permintaanObat_tfoot_exp').val();
  var ket       = $('#gud_permintaanObat_tfoot_keterangan').val();
  var harga     = $('#gud_permintaanObat_tfoot_harga').val();
  let total     = 0;
  let totalperitem = 0;
  total         = parseFloat(qty) * parseFloat(harga);
  totalperitem  = aptpembulatannotitik(total);
  // console.log(totalperitem);

  if (kd_obat != null){
    if (qtyB == ''){
      toastr.error("Qty Besar masih kosong!!");
    }else if(frac == ''){
      toastr.error("Fraction masih kosong!!");
    }else if(qty == ''){
      toastr.error("Jumlah Obat masih kosong!!");
    }else if(exp == ''){
      toastr.error("Expired masih kosong!!");
    }else if(qty <= 0){
      toastr.error("Jumlah Obat masih kosong!!");
    }else{
      gud_permintaanObat_replace(kd_obat, nm_obat, satB, qtyB, frac, qty, exp, ket, harga, totalperitem);
    }
  }else{
    toastr.error("Nama obat tidak ditemukan!!");
  }
  
}

function gud_permintaanObat_showdataDetail(nopermint, tglpermint, id_unittuj){
  $('#gud_permintaanObat_loading').show();
  var param = {
    iduser      : user['id_user'],
    nopermint   : nopermint,
    tglpermint  : tglpermint,
    idunittujuan: id_unittuj
  };

  apiPOST('Gudang/gud_permintaanObat_showdataDetail', param, hasil => {
    $('#gud_permintaanObat_loading').hide();
    if (hasil !== null) {
      var list = hasil['data'];
      for (var i = 0; i < list.length; i++) {
        var kd_obat   = list[i]['kd_obat'];
        var nm_obat   = list[i]['nama_obat'].toUpperCase();
        var satB      = list[i]['kd_sat_besar'];
        let qtyB      = list[i]['qtyb'];
        var frac      = list[i]['frac'];
        var qty       = list[i]['qty'];
        var qtyacc    = list[i]['qtyacc'];
        var ket       = list[i]['ket'];
        var harga     = list[i]['hargasat'];
        var exp       = list[i]['expired'];
        let total     = list[i]['totalperitem'];
        // total       = parseFloat(qty) * parseFloat(harga);
        let totalperitem  = 0;
        totalperitem = aptpembulatannotitik(total);

        if ((qtyB == 0)||(qtyB == '')){
          qtyB = parseFloat(qty) / parseFloat(frac);
        }else{
          qtyB = list[i]['qtyb'];
        }
        
        if (satB == ''){
          satB = '-';
        }else{
          satB = list[i]['kd_sat_besar'];
        }

        gud_permintaanObat_replace(kd_obat, nm_obat, satB, qtyB, frac, qty, exp, ket, harga, totalperitem);
      }
    }
  });
}

function gud_permintaanObat_emptyRow(){
  kd_obatauto_gud_permintaanObat.reset();
  document.getElementById('gud_permintaanObat_tfoot_satB').value         = "";
  document.getElementById('gud_permintaanObat_tfoot_qtyB').value         = "";
  document.getElementById('gud_permintaanObat_tfoot_frac').value         = "0";
  document.getElementById('gud_permintaanObat_tfoot_qty').value          = "0";
  document.getElementById('gud_permintaanObat_tfoot_exp').value          = "";
  document.getElementById('gud_permintaanObat_tfoot_harga').value        = "";
  document.getElementById('gud_permintaanObat_tfoot_keterangan').value   = "";
  document.getElementById('gud_permintaanObat_tfoot_stoktersedia_backup').value = "";
  setTimeout(refresh, 500);
}

function refresh(){
  document.getElementById('gud_permintaanObat_tfoot_nmobat').focus();
}

function gud_permintaanObat_unit(flag) {
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
    document.getElementById('gud_permintaanObat_unit').innerHTML = ven;

    if (id_unittuj > 0){
      document.getElementById('gud_permintaanObat_unit').value = id_unittuj;
      gud_permintaanObat_pencarianobat(flag);
    }
  });
}

function gud_permintaanObat_pencarianobat(flag){
  $('#gud_permintaanObat_tfoot_nmobat').trigger('focus');

  var param = {
    obatcari    : '',
    id_user     : user['id_user'],
    unit_tujuan : document.getElementById('gud_permintaanObat_unit').value,
  };

  kd_obatauto_gud_permintaanObat = new AutoComplete("gud_permintaanObat_tfoot_nmobat");
  apiPOST('Gudang/gud_ObatPermintaan_searching', param, hasil => {
    if (hasil !== null) {
      var list = hasil['data'];
      list.forEach(baru => {
        kd_obatauto_gud_permintaanObat.addData(baru['kd_obat'], baru['nama_obat']+'<br>Satuan Besar : '+baru['kd_sat_besar']+' , Fraction : '+baru['fraction']+'<br>Stok Tersedia : '+baru['stok_unit']+', Expired : '+baru['exp']+'<span hidden>'+baru['harga_satuan']);
      });

      kd_obatauto_gud_permintaanObat.onPilih(()=>{
        var kd_obat     = kd_obatauto_gud_permintaanObat.getValue();
        var nm_obat     = $('#gud_permintaanObat_tfoot_nmobat').val();
        var arrnm_obat  = nm_obat.split('<br>Satuan Besar : ');
        var arrnm_obat2 = arrnm_obat[1].split(' , Fraction : ');
        var arrnm_obat3 = arrnm_obat2[1].split('<br>Stok Tersedia : ');
        var arrnm_obat4 = arrnm_obat3[1].split(', Expired : ');
        var arrnm_obat5 = arrnm_obat4[1].split('<span hidden>');
        
        var arrnamaobat = arrnm_obat[0];
        var arrsatBesar = arrnm_obat2[0];
        var arrFraction = arrnm_obat3[0];
        var arrStokSedia= arrnm_obat4[0];
        var arrExpObat  = arrnm_obat5[0];
        var arrHargaObat= arrnm_obat5[1];
        
        $('#gud_permintaanObat_tfoot_nmobat').val(arrnamaobat);
        if (arrsatBesar != 'null'){
          $('#gud_permintaanObat_tfoot_satB').val(arrsatBesar);
        }else{
          $('#gud_permintaanObat_tfoot_satB').val('-');
        }
        
        $('#gud_permintaanObat_tfoot_frac').val(arrFraction);
        $('#gud_permintaanObat_tfoot_exp').val(arrExpObat);
        $('#gud_permintaanObat_tfoot_harga').val(arrHargaObat);
        $('#gud_permintaanObat_tfoot_stoktersedia_backup').val(arrStokSedia);

        $('#gud_permintaanObat_tfoot_qtyB').trigger('focus');
      });
    }
  });

  gud_permintaanObat_input(flag);
}

function gud_permintaanObat_change(){
  var count = $('#gud_permintaanObat_tableentry tr').length;
  if (count != 0){
    
    pertanyaan.fire({
      title             : 'Merubah Unit Tujuan',
      html              : '<span>Inputan akan dikosongkan, lanjutkan ?</span>',
      icon              : 'question',
      showCancelButton  : true,
      reverseButtons    : false,
      allowOutsideClick : false
    }).then((result) => {
      if (result.isConfirmed) {
        var x = document.getElementById("gud_permintaanObat_unit").value;
        rubahidunittujuan(x);
        $('#gud_permintaanObat_tableentry').html('');
        
        gud_permintaanObat_pencarianobat();
      }else if(result.dismiss === Swal.DismissReason.cancel){
        if (id_unittuj != '0'){
          document.getElementById('gud_permintaanObat_unit').value  = id_unittuj;
        }
      }
    })
  }else{
    var x = document.getElementById("gud_permintaanObat_unit").value;
    rubahidunittujuan(x);
    gud_permintaanObat_pencarianobat();
  }
  kd_obatauto_gud_permintaanObat.resetData();
}

function rubahidunittujuan(x){
  console.log(x);

  if (x == 0){
    document.getElementById("gud_permintaanObat_unit").value = 0;
  }else if (x > 0){
    document.getElementById("gud_permintaanObat_unit").value = x;
  }
  
}

function gud_permintaanObat_delRow(tableID) {
  try {
    var table = document.getElementById(tableID);
    var rowCount = table.rows.length;
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

  let xtotalSubT  = 0;
  var getSubTot   = document.getElementsByName('gud_permintaanObat_hometable_total[]');

  var jmlObat = $('#gud_permintaanObat_tableentry tr').length;
  var i;
  for (i = 0; i < jmlObat; i++) {
    let subToRp = getSubTot[i].value;
    xtotalSubT  += Number(subToRp);
  }

  document.getElementById("gud_permintaanObat_total").value  = parseFloat(xtotalSubT);
}

function gud_permintaanObat_replace(kd_obat, nm_obat, satB, qtyB, frac, qty, exp, ket, harga, totalperitem){
  
  var data = '';
      data += "<tr>";
      data += "<td class='pl-0' style='text-align:center;'><input type='checkbox' name='gud_permintaanObat_hometable_check[]' class='form-control-xs'/></td>"; //1
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_permintaanObat_hometable_kdobat[]' value='" + kd_obat + "'  disabled>";
      data += "</td>"; //2
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_permintaanObat_hometable_nmobat[]' value='" + nm_obat + "' disabled>";
      data += "</td>"; //3
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_permintaanObat_hometable_satB[]' value='" + satB + "' style='text-align: center;' disabled>";
      data += "</td>"; //4
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_permintaanObat_hometable_qtyB[]' value='" + qtyB + "' style='text-align: center;' disabled>";
      data += "</td>"; //5
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_permintaanObat_hometable_frac[]' value='" + frac + "' style='text-align: center;' disabled>";
      data += "</td>"; //6
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_permintaanObat_hometable_qty[]' value='" + qty + "' style='text-align: center;' disabled>";
      data += "</td>"; //7
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_permintaanObat_hometable_expired[]' value='" + exp + "' disabled>";
      data += "</td>"; //8
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_permintaanObat_hometable_keterangan[]' value='" + ket + "' style='text-align: center;' disabled>";
      data += "</td>"; //9
      data += "<td class='d-none'>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_permintaanObat_hometable_harga[]' value='" + harga + "' style='text-align: center;' disabled>";
      data += "</td>"; //10
     
      data += "<td class='pr-0 d-none'>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_permintaanObat_hometable_total[]' value='" + totalperitem + "' style='text-align: right;' disabled>";
      data += "</td>"; //11
      
      data += "</tr>";

  var getkd_obat  = document.getElementsByName('gud_permintaanObat_hometable_kdobat[]');
  var jmlRow      = $('#gud_permintaanObat_tableentry tr').length;
  const count     = [];

  for(var i = 0, iLen = jmlRow ; i < iLen; i++){
    var datax     = {};
    datax.kd_obat = getkd_obat[i].value;
    count.push(datax);
  }
  
  const cekkd_obat = count.map(el => el.kd_obat);
  const status_kd_obatk = cekkd_obat.includes(kd_obat); // returns true
  
  if (status_kd_obatk == false){
    $('#gud_permintaanObat_tableentry').append(data);
    gud_permintaanObat_proses_penjumlahan(totalperitem);
  }else{
    toastr.error("Obat Sudah Diinputkan!!");
  }

  gud_permintaanObat_emptyRow();
}

function gud_permintaanObat_proses_penjumlahan(totalperitem){
  var totalx  = document.getElementById("gud_permintaanObat_total").value;
  let result = 0;
  result = parseFloat(totalx) + parseFloat(totalperitem);

  document.getElementById("gud_permintaanObat_total").value = result;
}

function gud_permintaanObat_back(){
  var noresepAPTRWJ = document.getElementById("gud_permintaanObat_nomor").value;
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
        gud_permintaanObat_backk();
      }else if(result.dismiss === Swal.DismissReason.cancel){
        
      }
    })
  }else{
    gud_permintaanObat_backk();
  }
}

function gud_permintaanObat_backk() {
  $('.gudangObatIn').hide();
  $('#gudang_permintaanunit').show();
  $('#gudang_permintaanunit_kedua').show();
  gudang_permintaanunit_showdata();
}

function gud_permintaanObat_paramSimpan(){

  var kd_obt    = document.getElementsByName('gud_permintaanObat_hometable_kdobat[]');
  var nmobat    = document.getElementsByName('gud_permintaanObat_hometable_nmobat[]');
  var satB      = document.getElementsByName('gud_permintaanObat_hometable_satB[]');
  var qtyB      = document.getElementsByName('gud_permintaanObat_hometable_qtyB[]');
  var frac      = document.getElementsByName('gud_permintaanObat_hometable_frac[]');
  var qtyK      = document.getElementsByName('gud_permintaanObat_hometable_qty[]');
  var exp       = document.getElementsByName('gud_permintaanObat_hometable_expired[]');
  var ket       = document.getElementsByName('gud_permintaanObat_hometable_keterangan[]');
  var hargaSat  = document.getElementsByName('gud_permintaanObat_hometable_harga[]');
  var totalHarga= document.getElementsByName('gud_permintaanObat_hometable_total[]');

  var count     = $('#gud_permintaanObat_tableentry tr').length;
  
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
    x.exp       = exp[i].value;
    x.ket       = ket[i].value;
    x.hargaSat  = hargaSat[i].value;
    x.total     = totalHarga[i].value;
    
    params.data.push(x);
  }
  
  // console.log(params.data);
  return params.data;
}

function gud_permintaanObat_save(){
  $('#gud_permintaanObat_loading').show();
  var nopermint   = document.getElementById("gud_permintaanObat_nomor").value;
  var unittujuan  = document.getElementById("gud_permintaanObat_unit").value;
  var keterangan  = document.getElementById("gud_permintaanObat_keterangan").value;
  var total       = document.getElementById('gud_permintaanObat_total').value;

  if (total != ''){
    total = document.getElementById('gud_permintaanObat_total').value;
  }else{
    total = 0;
  }

  var param = {
    nopermint     : nopermint,
    unittujuan    : unittujuan,
    keterangan    : keterangan,
    tglcreate     : document.getElementById("gud_permintaanObat_tgl").value,
    iduser        : user['id_user'],
    idpeg         : user['id_pegawai'],
    id_farUser    : user['id_far'],
    map_idunit    : user['map_bpjs'],
    data          : gud_permintaanObat_paramSimpan(),
    countRow      : $('#gud_permintaanObat_tableentry tr').length,
    total         : total
  };
  
  if (unittujuan == '0'){
    toastr.error("Unit tujuan Belum dipilih.");
    $('#gud_permintaanObat_loading').hide();
  }else if (keterangan == ''){
    toastr.error("Keterangan Belum diisi.");
    $('#gud_permintaanObat_loading').hide();
  }else if (user['id_far'] == ''){
    toastr.error("Periksa Kembali Konfigurasi Modul Anda.");
    $('#gud_permintaanObat_loading').hide();
  }else{
    apiPOST('Gudang/CreateGudangPermintaanObat', param, hasil => {
      if (hasil !== null) {
        if (hasil['code'] == '200'){
          document.getElementById("gud_permintaanObat_nomor").value = hasil['nopermint'];
        }else{
          toastr.error('Gagal Simpan Permintaan Obat!!');
        }
      }
      $('#gud_permintaanObat_loading').hide();
    });
  }
}

function gud_permintaanObat_pos(){
  
  $('#gud_permintaanObat_loading').show();
  var nopermint   = document.getElementById("gud_permintaanObat_nomor").value;
  var total       = document.getElementById('gud_permintaanObat_total').value;

  if (nopermint == ''){
    toastr.error("No. Permintaan Tidak diKetahui!");
    return;
  }

  if (total != ''){
    total = document.getElementById('gud_permintaanObat_total').value;
  }else{
    total = 0;
  }

  var param = {
    nopermint     : nopermint,
    tglpermint    : document.getElementById("gud_permintaanObat_tgl").value,
    iduser        : user['id_user'],
    idpeg         : user['id_pegawai'],
    id_farUser    : user['id_far'],
    total         : total
  };
  
  pertanyaan.fire({
    title             : 'Posting Data',
    html              : '<span>Permintaan Obat Ke Depo/Unit Sudah Benar?,<br>Lanjut Posting</span>',
    icon              : 'question',
    showCancelButton  : true,
    reverseButtons    : false,
    allowOutsideClick : false
  }).then((result) => {
    if (result.isConfirmed) {
      apiPOST('Gudang/PostingPermintaanObat', param, hasil => {
      $('#gud_permintaanObat_loading').hide();
        if (hasil !== null) {
          if (hasil['code'] == '200'){
            gud_permintaanObat_backk();
          }else{
            toastr.error('Gagal Posting Permintaan!!');
          }
        }
      }).then(function(){
        $('#gud_permintaanObat_loading').hide();
      });

    }else if(result.dismiss === Swal.DismissReason.cancel){
      $('#gud_permintaanObat_loading').hide();
    }
  })
}

function gud_permintaanObat_unpos() {
  $('#gud_permintaanObat_loading').show();
  var nopermint  = document.getElementById("gud_permintaanObat_nomor").value;
  
  if (nopermint == ''){
    toastr.error("No. Permintaan Tidak diKetahui!");
    return;
  }

  var param = {
    nopermint     : nopermint,
    tglpermint    : document.getElementById("gud_permintaanObat_tgl").value,
    iduser        : user['id_user'],
    idpeg         : user['id_pegawai'],
    id_farUser    : user['id_far']
  };
  
  pertanyaan.fire({
    title             : 'UnPosting Permintaan Obat',
    html              : '<span>Permintaan Obat Sudah Posting, Buka Kembali ?</span>',
    icon              : 'question',
    showCancelButton  : true,
    reverseButtons    : false,
    allowOutsideClick : false
  }).then((result) => {
    if (result.isConfirmed) {
      $('#gud_permintaanObat_loading').hide();
      if (accUnit == 't'){
        toastr.info("Permintaan Obat Sudah di ACC.\nSilahkan Buat Permintaan Obat Baru!");
        return;
      }else{
        apiPOST('Gudang/UnPostingPermintaanObat', param, hasil => {
            if (hasil !== null) {
              if (hasil['code'] == '200'){
                gud_permintaanObat_backk();
              }else{
                toastr.error('Gagal UnPosting Permintaan!!');
              }
            }
          }).then(function(){
            $('#gud_permintaanObat_loading').hide();
        });
      }
    }else if(result.dismiss === Swal.DismissReason.cancel){
      $('#gud_permintaanObat_loading').hide();
    }
  })
}

function gud_permintaanObat_hapuspengeluaran() {
  $('#gud_permintaanObat_loading').show();
  var nopermint  = document.getElementById("gud_permintaanObat_nomor").value;
  
  if (nopermint == ''){
    toastr.error("No. Permintaan Tidak diKetahui!");
    return;
  }

  var param = {
    nopermint     : nopermint,
    tglpermint    : document.getElementById("gud_permintaanObat_tgl").value,
    iduser        : user['id_user'],
    idpeg         : user['id_pegawai'],
    id_farUser    : user['id_far']
  };
  
  pertanyaan.fire({
    title             : 'Hapus Permintaan Obat',
    html              : '<span>Hapus Permintaan Obat,?</span>',
    icon              : 'error',
    showCancelButton  : true,
    reverseButtons    : false,
    allowOutsideClick : false
  }).then((result) => {
    if (result.isConfirmed) {
      $('#gud_permintaanObat_loading').hide();
      if (accUnit == 't'){
        toastr.info("Permintaan Obat Sudah di ACC.\nSilahkan Buat Permintaan Obat Baru!");
        return;
      }else{
        apiPOST('Gudang/DeletePermintaanObat', param, hasil => {
            if (hasil !== null) {
              if (hasil['code'] == '200'){
                gud_permintaanObat_backk();
              }else{
                toastr.error('Gagal Hapus Permintaan!!');
              }
            }
          }).then(function(){
            $('#gud_permintaanObat_loading').hide();
        });
      }
    }else if(result.dismiss === Swal.DismissReason.cancel){
      $('#gud_permintaanObat_loading').hide();
    }
  })
}

</script>