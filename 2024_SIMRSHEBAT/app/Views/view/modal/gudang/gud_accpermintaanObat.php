<?php
  $data = json_decode($_GET['data']);
  $nowday     = date('Y-m-d');
  $no_obat_out  = str_replace('"','', json_encode($data->vGudlistpermintaan_unit_no_obat_out));
  $nopermint  = str_replace('"','', json_encode($data->vGudlistpermintaan_unit_no));
  $tglpermint = str_replace('"','', json_encode($data->vGudlistpermintaan_unit_tgl));
  $id_unit    = str_replace('"','', json_encode($data->vGudlistpermintaan_unit_idunit));
  $posting    = str_replace('"','', json_encode($data->vGudlistpermintaan_unit_posting));
  $postinggud = str_replace('"','', json_encode($data->vGudlistpermintaan_unit_posting_gud));
  $tglbuat    = date_format(date_create($tglpermint), 'Y-m-d'); //FORMAT d-M-Y TGL 02-Feb-2023
  $keterangan = str_replace('"','', json_encode($data->vGudlistpermintaan_unit_ket));
  
?>
<section class="content pb-0">
  <div class="container-fluid h-100">
    <div class="row p-1">
      <div class="col-md-4 col-sm-6 col-12 p-1">
        <div class="info-box mb-0">
          <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="90">Tgl Permintaan</td>
              <td>:</td>
              <td><input type="date" class="form-control form-control-xs" id="gud_accpermintaan_tgl" disabled></td>
            </tr>
            <tr>
              <td>No. Pengeluaran</td>
              <td>:</td>
              <td>
                <div class="input-group col-sm-12 p-0">
                  <input type="text" class="form-control form-control-xs" id="gud_accpermintaan_nomorpengeluaran" disabled>
                  <div class="input-group-prepend">
                    <button type="button" class="btn btn-outline-danger btn-xs" onclick="gud_accpermintaan_hapuspengeluaran()" id="gud_accpermintaan_btnhapus"><i class="fa fa-trash"></i></button>
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
              <td width="100">No. Permintaan</td>
              <td>:</td>
              <td width="200"><input type="text" class="form-control form-control-xs" id="gud_accpermintaan_nomor" disabled></td>
              <td >Unit</td>
              <td>:</td>
              <td><select class="form-control form-control-xs" id="gud_accpermintaan_unit" disabled></select></td>
            </tr>
            <tr>
              <td>Keterangan</td>
              <td>:</td>
              <td colspan="4"><input type="text" class="form-control form-control-xs" id="gud_accpermintaan_keterangan"></td>
            </tr>
          </table>
        </div>
      </div>

    </div>
    <div class="card card-row">
      <div class="overlay-wrapper" id="gud_accpermintaan_loading">
        <div class="overlay dark">
          <i class="fas fa-3x fa-sync-alt fa-spin"></i>
        </div>
      </div>

      <div class="card-header p-1 darkgrey-custom">
        <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="gud_accpermintaan_delRow('gud_accpermintaan_tableentry')"><i class="fa fa-times"></i> Hapus Obat</button>
        <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="gud_accpermintaan_save()" id="gud_accpermintaan_simpan"><i class="fa fa-save"></i> Simpan</button>
        <button type="button" class="btn btn-outline-danger btn-xs" onclick="gud_accpermintaan_back()"><i class="fa fa-arrow-left"></i> Kembali</button>
      </div>

      <div class="modal-body p-0">
        <div class="card-body p-0">
          
          <div class="col-sm-12 p-0 uk-layar" style="height: 72vh; max-height: 72vh; overflow-x: hidden;">
            
            <table class="table table-striped table-sm choose" style="border-collapse: inherit;">
              <thead>
                <tr>
                  <th class="pl-0 d-none" width="20" style="text-align:center;">No</th>
                  <th class="pl-0" width="20" style="text-align:center;">Act</th>
                  <th width="40">Kd. Obat</th>
                  <th width="140">Nm. Obat</th>
                  <th width="30" style="text-align:center;">Sat B</th>
                  <th width="40" style="text-align:center;">Qty B</th>
                  <th width="40" style="text-align:center;">Frac</th>
                  <th width="40" style="text-align:center;">Qty</th>
                  <th width="50" style="text-align:center;">Harga</th>
                  <th width="50" style="text-align:center;">Qty Acc</th>
                  <th width="50" style="text-align:center;">StokAwal</th>
                  <th width="40">Expired</th>
                  <th width="40" style="text-align:center;">Total</th>
                </tr>
              </thead>
              <tbody id="gud_accpermintaan_tableentry"></tbody>
              <tfoot class="d-none" style="background-color: #a8d4da; color: black;">
                <tr>
                  <td colspan="3" class="pl-0 pr-0 pt-2">
                    <input type='search' class='form-control form-control-xxs' id='gud_accpermintaan_tfoot_nmobat' placeholder="Pencarian Obat" autocomplete="off">
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='text' class='form-control form-control-xxs' id='gud_accpermintaan_tfoot_satB' readonly>
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type="number" placeholder="1.00" step="0.01" min="0" max="10" class='form-control form-control-xxs' id='gud_accpermintaan_tfoot_qtyB'>
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='number' class='form-control form-control-xxs' id='gud_accpermintaan_tfoot_frac' value="0">
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='number' class='form-control form-control-xxs' id='gud_accpermintaan_tfoot_qty' value="0" placeholder="0.00" step="0.01" min="0">
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='number' class='form-control form-control-xxs' id='gud_accpermintaan_tfoot_harga' value="0" disabled>
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='number' class='form-control form-control-xxs' id='gud_accpermintaan_tfoot_stoktersedia' value="0" disabled>
                  </td>
                  <td class="pl-0 pr-0 pt-2" colspan="2" >
                    <input type='date' class='form-control form-control-xxs' id='gud_accpermintaan_tfoot_exp'>
                  </td>
                  <td class="pl-0 pr-0 pt-2" width="50" hidden>
                    <input type='number' class='form-control form-control-xxs' id='gud_accpermintaan_tfoot_stoktersedia_backup' value="0" disabled>
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
                <input type="text" class="form-control form-control-xs" id="gud_accpermintaan_total" value="0" style="font-size: 17px; font-weight: bold; text-align: right;" readonly>
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
$('#gud_accpermintaan_loading').hide();

var nowday      = "<?php echo $nowday; ?>";
var no_obat_out   = "<?php echo $no_obat_out; ?>";
var nopermint   = "<?php echo $nopermint; ?>";
var tglpermint  = "<?php echo $tglpermint; ?>";
var tglbuat     = "<?php echo $tglbuat; ?>";
var id_unit     = "<?php echo $id_unit; ?>";
var keterangan  = "<?php echo $keterangan; ?>";
var posting     = "<?php echo $posting; ?>";
var postinggud  = "<?php echo $postinggud; ?>";
var flag;
var kd_obatauto_gud_accpermintaan;

document.getElementById('gud_accpermintaan_nomorpengeluaran').value = no_obat_out;
document.getElementById('gud_accpermintaan_nomor').value = nopermint;
document.getElementById('gud_accpermintaan_tgl').value   = tglbuat;
var maxdate = "gud_accpermintaan_tgl";
max_date(maxdate);

prosesInputan();

if (document.getElementById('gud_accpermintaan_nomor').value == ''){
  flag = true;
  gud_accpermintaan_pencarianobat(flag);
  document.getElementById('gud_accpermintaan_btnhapus').disabled     = flag;

}else{
  document.getElementById('gud_accpermintaan_keterangan').value   = keterangan;
  gud_accpermintaan_showdataDetail(nopermint, tglpermint, id_unit);

  if (postinggud == 't'){
    flag = true;
    rubahidunitpeminta(id_unit);
    document.getElementById('gud_accpermintaan_btnhapus').disabled   = flag;
    document.getElementById('gud_accpermintaan_simpan').disabled     = flag;
  }else{

    if (posting == 't'){ //SUDAH DIPOSTING dari permintaan
      flag = false;
      rubahidunitpeminta(id_unit);
      gud_accpermintaan_pencarianobat(flag);
      document.getElementById('gud_accpermintaan_btnhapus').disabled     = flag;
    }else{
      flag = true;
      rubahidunitpeminta(id_unit);
      gud_accpermintaan_pencarianobat(flag);
      document.getElementById('gud_accpermintaan_btnhapus').disabled     = flag;
    }
  }
}

function gud_accpermintaan_input(flag){
  document.getElementById('gud_accpermintaan_tfoot_nmobat').disabled = flag;
  document.getElementById('gud_accpermintaan_tfoot_qtyB').disabled   = flag;
  document.getElementById('gud_accpermintaan_tfoot_frac').disabled   = flag;
  document.getElementById('gud_accpermintaan_tfoot_harga').disabled  = flag;
  document.getElementById('gud_accpermintaan_tfoot_qty').disabled    = flag;
  document.getElementById('gud_accpermintaan_tfoot_exp').disabled    = flag;
  document.getElementById('gud_accpermintaan_simpan').disabled       = flag;
}

function prosesInputan(){
  gud_accpermintaan_unit();
  $("#gud_accpermintaan_tfoot_satB").on( "keydown", function(e) {
    switch(event.which){      
      case 13:
        $('#gud_accpermintaan_tfoot_qtyB').trigger('focus');
        break;
    }
  });

  $("#gud_accpermintaan_tfoot_qtyB").on( "keydown", function(e) {
    switch(event.which){      
      case 13:
        var frac  = $('#gud_accpermintaan_tfoot_frac').val();
        var qtyB  = $(this).val();
        if (qtyB == ''){
          qtyB = 0;
        }else{
          qtyB = $(this).val();
        }
        let qty   = 0;
        
        qty = parseFloat(qtyB) * parseFloat(frac);
        
        $("#gud_accpermintaan_tfoot_qty").val(qty);

        $('#gud_accpermintaan_tfoot_frac').trigger('focus');
        break;
    }
  });

  $("#gud_accpermintaan_tfoot_frac").on( "keydown", function(e) {
    switch(event.which){      
      case 13:

        var frac  = $(this).val();
        var qtyB  = $('#gud_accpermintaan_tfoot_qtyB').val();
        
        if (qtyB == ''){
          qtyB = 0;
        }else{
          qtyB = $('#gud_accpermintaan_tfoot_qtyB').val();
        }

        if (frac == ''){
          frac = 0;
        }else{
          frac = $(this).val();
        }

        let qty   = 0;
        qty = parseFloat(qtyB) * parseFloat(frac);
        
        $("#gud_accpermintaan_tfoot_qty").val(qty);
 
        $('#gud_accpermintaan_tfoot_qty').trigger('focus');
        break;
    }
  });

  $("#gud_accpermintaan_tfoot_qty").on( "keydown", function(e) {
    switch(event.which){      
      case 13:
        var qtyK  = $(this).val();        
        var frac  = $('#gud_accpermintaan_tfoot_frac').val();

        if (qtyK == ''){
          qtyK = 0;
        }else{
          qtyK = $(this).val();
        }

        let qtyB  = 0;
        qtyB = parseFloat(qtyK) / parseFloat(frac);
        
        $("#gud_accpermintaan_tfoot_qtyB").val(qtyB.toFixed(2));

        $('#gud_accpermintaan_tfoot_exp').trigger('focus');
        break;
    }
  });


  $("#gud_accpermintaan_tfoot_exp").on( "keydown", function(e) {
    switch(event.which){      
      case 13:
        cekstok();
        break;
    }
  });
}

function cekstok(){
  var stokTersedia = $('#gud_accpermintaan_tfoot_stoktersedia_backup').val();
  var qtyK         = $('#gud_accpermintaan_tfoot_qty').val();
  let result = 0;
  result = parseFloat(stokTersedia) - parseFloat(qtyK);

  if (parseFloat(qtyK) > parseFloat(stokTersedia)){
    toastr.error("Jumlah Obat Melebihi Stok Tersedia!");
    //$('#gud_accpermintaan_tfoot_stoktersedia').val(result);
  }else{
    $('#gud_accpermintaan_tfoot_stoktersedia').val(result);
    gud_accpermintaan_next();
  }
}

function gud_accpermintaan_showdataDetail(nopermint, tglpermint){
  $('#gud_accpermintaan_loading').show();
  var idunitUser = user['id_unit'];
  if (idunitUser == ''){
    toastr.error("Cek Modul Unit Aktif Anda!!");
    return;
  }

  var param = {
    iduser      : user['id_user'],
    nopermint   : nopermint,
    tglpermint  : tglpermint,
    idunittujuan: idunitUser
  };

  apiPOST('Gudang/gud_permintaanObat_showdataDetail', param, hasil => {
    $('#gud_accpermintaan_loading').hide();
    if (hasil !== null) {
      var list = hasil['data'];
      for (var i = 0; i < list.length; i++) {
        var kd_obat       = list[i]['kd_obat'];
        var nm_obat       = list[i]['nama_obat'].toUpperCase();
        var satB          = list[i]['kd_sat_besar'];
        let qtyB          = list[i]['qtyb'];
        var frac          = list[i]['frac'];
        var qty           = list[i]['qty'];
        var harga         = list[i]['hargasat'];
        var stok_unit     = list[i]['stok_unit'];
        var exp           = list[i]['expired'];
        var qtyacc        = list[i]['qtyacc'];
        // let totalperitem  = list[i]['totalperitem']; // qty * harga
        let sisa          = list[i]['sisa_stok'];
        let totalperitem  = 0;
        totalperitem      = parseFloat(qtyacc) * parseFloat(harga);
        //qtyB = parseFloat(qty) / parseFloat(frac);

        if (satB == ''){
          satB = '-';
        }else{
          satB = list[i]['kd_sat_besar'];
        }

        gud_accpermintaan_replace(kd_obat, nm_obat, satB, qtyB, frac, qty, harga, sisa, stok_unit, exp, totalperitem, qtyacc);
      }

      $(".cekstoktersedia").on( "keyup", function(e){
        var $row = $(this).closest("tr");    // Find the row
        var nomor = $row.find(".nr").text(); // Find the text
        cekstoktersedia(nomor);
      });
    }
  });
}

function gud_accpermintaan_emptyRow(){
  kd_obatauto_gud_accpermintaan.reset();
  document.getElementById('gud_accpermintaan_tfoot_satB').value         = "";
  document.getElementById('gud_accpermintaan_tfoot_qtyB').value         = "";
  document.getElementById('gud_accpermintaan_tfoot_frac').value         = "0";
  document.getElementById('gud_accpermintaan_tfoot_qty').value          = "0";
  document.getElementById('gud_accpermintaan_tfoot_exp').value          = "";
  document.getElementById('gud_accpermintaan_tfoot_harga').value        = "";
  document.getElementById('gud_accpermintaan_tfoot_stoktersedia').value = "";
  document.getElementById('gud_accpermintaan_tfoot_stoktersedia_backup').value = "";
  setTimeout(refresh, 500);
}

function refresh(){
  document.getElementById('gud_accpermintaan_tfoot_nmobat').focus();
}

function gud_accpermintaan_unit() {
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
    document.getElementById('gud_accpermintaan_unit').innerHTML = ven;

    if (id_unit > 0){
      document.getElementById('gud_accpermintaan_unit').value = id_unit;
    }
  });
}

function gud_accpermintaan_pencarianobat(flag){
  $('#gud_accpermintaan_tfoot_nmobat').trigger('focus');
  var param = {
    obatcari: '',
    id_user : user['id_user'],
  };

  kd_obatauto_gud_accpermintaan = new AutoComplete("gud_accpermintaan_tfoot_nmobat");
  apiPOST('Gudang/gud_barangOut_searching', param, hasil => {
    if (hasil !== null) {
      var list = hasil['data'];
      list.forEach(baru => {
        kd_obatauto_gud_accpermintaan.addData(baru['kd_obat'], baru['nama_obat']+'<br>Satuan Besar : '+baru['kd_sat_besar']+' , Fraction : '+baru['fraction']+'<br>Stok Tersedia : '+baru['stok_unit']+' , Harga Satuan : '+baru['harga_satuan']+' , Expired : '+baru['exp']);
      });

      kd_obatauto_gud_accpermintaan.onPilih(()=>{
        var kd_obat     = kd_obatauto_gud_accpermintaan.getValue();
        var nm_obat     = $('#gud_accpermintaan_tfoot_nmobat').val();
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
        
        $('#gud_accpermintaan_tfoot_nmobat').val(arrnamaobat);
        if (arrsatBesar != 'null'){
          $('#gud_accpermintaan_tfoot_satB').val(arrsatBesar);
        }else{
          $('#gud_accpermintaan_tfoot_satB').val('-');
        }
        
        $('#gud_accpermintaan_tfoot_frac').val(arrFraction);
        $('#gud_accpermintaan_tfoot_stoktersedia').val(arrStokSedia);
        $('#gud_accpermintaan_tfoot_stoktersedia_backup').val(arrStokSedia);
        $('#gud_accpermintaan_tfoot_harga').val(arrHargaObat);
        $('#gud_accpermintaan_tfoot_exp').val(arrExpObat);

        $('#gud_accpermintaan_tfoot_qtyB').trigger('focus');
      });
    }
  });

  gud_accpermintaan_input(flag);
}

function rubahidunitpeminta(id_unit){
  // console.log(id_unit);

  if (id_unit == 0){
    document.getElementById("gud_accpermintaan_unit").value = 0;
  }else if (id_unit > 0){
    document.getElementById("gud_accpermintaan_unit").value = id_unit;
  }
  
}

function gud_accpermintaan_delRow(tableID) {
  try {
    var table = document.getElementById(tableID);
    var rowCount = table.rows.length;
    //console.log(rowCount);
    for (var i = 0; i < rowCount; i++) {
      var row = table.rows[i];
      var chkbox = row.cells[1].childNodes[0];
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

    let rows = table.getElementsByTagName("tr");

    for (var i=0; i<rows.length; i++) {
        var dataRow = rows[i].children[0];
        //dataRow.querySelector("input").value = i;
        dataRow.textContent = i;
    }

  } catch (e) {
    alert(e);
  }

  HitungGrandTotalPermintaanObat();
}

function gud_accpermintaan_replace(kd_obat, nm_obat, satB, qtyB, frac, qty, harga, sisa, stok_unit, exp, totalperitem, qtyacc){
  
  var nomor = $('#gud_accpermintaan_tableentry tr').length;
  var data = '';
      data += "<tr>";
      data += "<td class='nr pl-0 pr-0 d-none' style='text-align:center;'><span>" + nomor + "</span>";
      data += "</td>";
      data += "<td class='pl-0' style='text-align:center;'><input type='checkbox' name='gud_accpermintaan_hometable_check[]' class='form-control-xs'/></td>"; //1
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_accpermintaan_hometable_kdobat[]' value='" + kd_obat + "'  disabled>";
      data += "</td>"; //2
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_accpermintaan_hometable_nmobat[]' value='" + nm_obat + "' disabled>";
      data += "</td>"; //3
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_accpermintaan_hometable_satB[]' value='" + satB + "' style='text-align: center;' disabled>";
      data += "</td>"; //4
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_accpermintaan_hometable_qtyB[]' value='" + qtyB + "' style='text-align: center;' disabled>";
      data += "</td>"; //5
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_accpermintaan_hometable_frac[]' value='" + frac + "' style='text-align: center;' disabled>";
      data += "</td>"; //6
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_accpermintaan_hometable_qty[]' value='" + qty + "' style='text-align: center;' disabled>";
      data += "</td>"; //7
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_accpermintaan_hometable_harga[]' value='" + harga + "' style='text-align: center;' disabled>";
      data += "</td>"; //8
      data += "<td>";
      data += "<input type='number' class='form-control form-control-xxs cekstoktersedia' name='gud_accpermintaan_hometable_qtyacc[]' id='gud_accpermintaan_hometable_qtyacc' value='"+ qtyacc +"' placeholder='0.00' step='0.01' min='0'>";
      data += "</td>"; //9 onkeyup='cekstoktersedia(this, "+nomor+")' 
      data += "<td>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_accpermintaan_hometable_stokawal[]' value='" + stok_unit + "' style='text-align: center;' disabled>";
      data += "</td>"; //10
      data += "<td class='pr-0'>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_accpermintaan_hometable_expired[]' value='" + exp + "' disabled>";
      data += "</td>"; //11
      data += "<td class='pr-0'>";
      data += "<input type='text' class='form-control form-control-xxs' name='gud_accpermintaan_hometable_total[]' value='" + totalperitem + "' style='text-align: right;' disabled>";
      data += "</td>"; //12
      // data += "<td class='nr pr-0'>" + nomor;
      // // data += "<input type='text' class='form-control form-control-xxs' value='" + nomor + "' style='text-align: right;' disabled>";
      // data += "</td>"; //13
      
      data += "</tr>";

  var getkd_obat  = document.getElementsByName('gud_accpermintaan_hometable_kdobat[]');
  var jmlRow      = $('#gud_accpermintaan_tableentry tr').length;
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
    $('#gud_accpermintaan_tableentry').append(data);
    gud_accpermintaan_proses_penjumlahan(totalperitem);
  }else{
    toastr.error("Obat Sudah Diinputkan!!");
  }

  gud_accpermintaan_emptyRow();
}

function cekstoktersedia(nomor){
  var harga     = document.getElementById("gud_accpermintaan_tableentry").rows[nomor].cells[8].querySelector("input").value;
  var qtyacc    = document.getElementById("gud_accpermintaan_tableentry").rows[nomor].cells[9].querySelector("input").value;
  var stokawal  = document.getElementById("gud_accpermintaan_tableentry").rows[nomor].cells[10].querySelector("input").value;

  let totalperitem = 0;
  totalperitem = parseFloat(qtyacc) * parseFloat(harga);

  if (parseFloat(qtyacc) > parseFloat(stokawal)){
    toastr.error("Jumlah Obat Melebihi Stok Tersedia!");
    document.getElementById("gud_accpermintaan_tableentry").rows[nomor].cells[12].querySelector("input").value = 0;
  }else{
    document.getElementById("gud_accpermintaan_tableentry").rows[nomor].cells[12].querySelector("input").value = parseFloat(totalperitem);
  }
  HitungGrandTotalPermintaanObat();
}

function HitungGrandTotalPermintaanObat() {
  let xtotalSubT  = 0;
  var getSubTot   = document.getElementsByName('gud_accpermintaan_hometable_total[]');

  var jmlObat = $('#gud_accpermintaan_tableentry tr').length;
  var i;
  for (i = 0; i < jmlObat; i++) {
    let subToRp = getSubTot[i].value;
    xtotalSubT  += Number(subToRp);
  }

  document.getElementById("gud_accpermintaan_total").value  = parseFloat(xtotalSubT);
}

function gud_accpermintaan_proses_penjumlahan(totalperitem){
  var totalx  = document.getElementById("gud_accpermintaan_total").value;
  let result = 0;
  result = parseFloat(totalx) + parseFloat(totalperitem);

  document.getElementById("gud_accpermintaan_total").value = result;
}

function gud_accpermintaan_back(){
  var nomorpermint = document.getElementById("gud_accpermintaan_nomor").value;
  var nomorpengeluaran = document.getElementById("gud_accpermintaan_nomorpengeluaran").value;
  if (nomorpengeluaran == ''){
    pertanyaan.fire({
      title             : 'Kembali ke menu awal',
      html              : '<span>Data Permintaan Obat belum tersimpan, tetap kembali ?</span>',
      icon              : 'question',
      showCancelButton  : true,
      reverseButtons    : false,
      allowOutsideClick : false
    }).then((result) => {
      if (result.isConfirmed) {
        gud_accpermintaan_backk();
      }else if(result.dismiss === Swal.DismissReason.cancel){
        
      }
    })
  }else{
    gud_accpermintaan_backk();
  }
}

function gud_accpermintaan_backk() {
  $('.gudangOut').hide();
  $('#gudang_pengeluaran_unit').show();
  $('#gudang_pengeluaran_listpermintaan').show();
  gudang_pengeluaran_unit_showdata();
  gudang_pengeluaran_listpermintaan_unit_showdata();
}

function gud_accpermintaan_save(){
  $('#gud_accpermintaan_loading').show();
  var nopermint   = document.getElementById("gud_accpermintaan_nomor").value;
  var unit        = document.getElementById("gud_accpermintaan_unit").value;
  var keterangan  = document.getElementById("gud_accpermintaan_keterangan").value;
  var total       = document.getElementById('gud_accpermintaan_total').value;

  if (nopermint == ''){
    toastr.error("Nomor Permintaan Tidak di Ketahui!");
    return;
  }

  if (total != ''){
    total = document.getElementById('gud_accpermintaan_total').value;
  }else{
    total = 0;
  }

  var kd_obt    = document.getElementsByName('gud_accpermintaan_hometable_kdobat[]');
  var nmobat    = document.getElementsByName('gud_accpermintaan_hometable_nmobat[]');
  var satB      = document.getElementsByName('gud_accpermintaan_hometable_satB[]');
  var qtyB      = document.getElementsByName('gud_accpermintaan_hometable_qtyB[]');
  var frac      = document.getElementsByName('gud_accpermintaan_hometable_frac[]');
  var qtyK      = document.getElementsByName('gud_accpermintaan_hometable_qty[]');
  var hargaSat  = document.getElementsByName('gud_accpermintaan_hometable_harga[]');
  var qtyacc    = document.getElementsByName('gud_accpermintaan_hometable_qtyacc[]');
  var sisa      = document.getElementsByName('gud_accpermintaan_hometable_stokawal[]');
  var exp       = document.getElementsByName('gud_accpermintaan_hometable_expired[]');

  var count     = $('#gud_accpermintaan_tableentry tr').length;
  
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
    //x.qtyacc    = qtyacc[i].value;
    x.exp       = exp[i].value;
    
    if (typeof(qtyacc[i].value) !== 'undefined') {
      if ((qtyacc[i].value == '')||(qtyacc[i].value == '0')) {
        toastr.warning("Obat "+x.nmobat+" Belum di Acc!<br>Hapus jika tidak di Acc!");
        $('#gud_accpermintaan_loading').hide();
        return;
      }else{
        x.qtyacc = qtyacc[i].value;
      }
    }

    if (typeof(sisa[i].value) !== 'undefined') {
      if ((sisa[i].value == '')||(sisa[i].value == '0')) {
        toastr.warning("Stok Awal Obat "+x.nmobat+" Kosong!<br> Hapus jika tidak di Acc!");
        $('#gud_accpermintaan_loading').hide();
        return;
      }else{
        x.sisa = sisa[i].value;
      }
    }

    params.data.push(x);
  }

  var param = {
    no_gud_out    : document.getElementById("gud_accpermintaan_nomorpengeluaran").value,
    nopermint     : nopermint,
    tglpermint    : document.getElementById("gud_accpermintaan_tgl").value,
    unit          : unit,
    keterangan    : keterangan,
    tglcreate     : nowday,
    iduser        : user['id_user'],
    idpeg         : user['id_pegawai'],
    id_farUser    : user['id_far'],
    data          : params.data,
    countRow      : $('#gud_accpermintaan_tableentry tr').length,
    total         : total
  };
  
  if (unit == '0'){
    toastr.error("Unit Permintaan tidak diketahui.");
    $('#gud_accpermintaan_loading').hide();
  }else if (keterangan == ''){
    toastr.error("Keterangan Belum diisi.");
    $('#gud_accpermintaan_loading').hide();
  }else if (user['id_far'] == ''){
    toastr.error("Periksa Kembali Konfigurasi Modul Anda.");
    $('#gud_accpermintaan_loading').hide();
  }else{
    apiPOST('Gudang/CreateGudangACCPermintaanObat', param, hasil => {
      $('#gud_accpermintaan_loading').hide();
      if (hasil !== null) {
        if (hasil['code'] == '200'){
          document.getElementById("gud_accpermintaan_nomorpengeluaran").value = hasil['no_gud_out'];
        }else{
          toastr.error('Gagal Simpan Permintaan Obat!!');
        }
      }
    });
  }
}

function gud_accpermintaan_hapuspengeluaran(){
  $('#gud_accpermintaan_loading').show();
  var no_gud     = document.getElementById("gud_accpermintaan_nomorpengeluaran").value;
  var nopermint  = document.getElementById("gud_accpermintaan_nomor").value;
  var total      = document.getElementById('gud_accpermintaan_total').value;

  if (total != ''){
    total = document.getElementById('gud_accpermintaan_total').value;
  }else{
    total = 0;
  }

  if ((no_gud != '')||(no_gud != '0')){
    pertanyaan.fire({
      title             : 'Batal Acc Permintaan Obat Unit, masukkan alasan dibatalkan ?',
      html              : '<input type="text" class="form-control form-control-sm" id="gud_accpermintaan_alasan" class="swal2-input" placeholder="Enter your reason" autocomplete="off" required>',
      icon              : 'error',
      showCancelButton  : true,
      reverseButtons    : false,
      allowOutsideClick : false
    }).then((result) => {
      if (result.isConfirmed) {
        var alasan = document.getElementById('gud_accpermintaan_alasan').value;
        if (alasan != ''){
          
          var param = {
            kdFar         : user['map_bpjs'],
            no_gud        : no_gud,
            tglcreate     : document.getElementById("gud_accpermintaan_tgl").value,
            iduser        : user['id_user'],
            idpeg         : user['id_pegawai'],
            id_farUser    : user['id_far'],
            idunit        : id_unit,
            reason        : alasan,
            GrandTotal    : total,
            code          : '03'
          };

          apiPOST('Gudang/LogHapusPenerimaan', param, hasil => {
            $('#gud_accpermintaan_loading').hide();
            if (hasil !== null) {
              gud_accpermintaan_backk();
            }
          });
        }else{
          swal_center('Alasan tidak boleh kosong!!','error');
        }
        
      }else if(result.dismiss === Swal.DismissReason.cancel){
        $('#gud_accpermintaan_loading').hide();
      }
    })
  }
}
</script>