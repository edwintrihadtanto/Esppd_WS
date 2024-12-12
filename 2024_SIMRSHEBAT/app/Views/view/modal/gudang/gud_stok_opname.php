<?php
  $data     = json_decode($_GET['data']);
  $no_so    = str_replace('"','', json_encode($data->vStokOpname_noso));
  $tgl_so   = str_replace('"','', json_encode($data->vStokOpname_tglso));
  $id_unit  = str_replace('"','', json_encode($data->vStokOpname_idunit));
  $unit     = str_replace('"','', json_encode($data->vStokOpname_nama_unit));
  $posting  = str_replace('"','', json_encode($data->vStokOpname_posting));
  $noba     = str_replace('"','', json_encode($data->vStokOpname_noba));
  $ketso    = str_replace('"','', json_encode($data->vStokOpname_ket_so));
  $tglbuat  = date_format(date_create($tgl_so), 'Y-m-d'); //FORMAT d-M-Y TGL 02-Feb-2023
  
?>
<section class="content pb-0">
  <div class="container-fluid h-100">
    <div class="row p-1">
      <div class="col-md-4 col-sm-6 col-12 p-1">
        <div class="info-box mb-0">
          <table class="table table-striped table-sm mb-0" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="150">Tanggal</td>
              <td>:</td>
              <td><input type="date" class="form-control form-control-xs" id="gud_so_tglso"></td>
            </tr>
            <tr>
              <td>No. Stok Opname</td>
              <td>:</td>
              <td>
                <div class="input-group col-sm-12 p-0">
                  <input type="text" class="form-control form-control-xs" id="gud_so_nomorso" disabled>
                  <div class="input-group-prepend">
                    <button type="button" class="btn btn-outline-danger btn-xs" onclick="gud_so_hapus()" id="gud_so_btnhapus"><i class="fa fa-trash"></i></button>
                  </div>
                </div>
              </td>
            </tr>
          </table>
        </div>
      </div>
      
      <div class="col-md-4 col-sm-6 col-12 p-1">
        <div class="info-box mb-0">
          <table class="table table-striped table-sm mb-0" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="120">Unit</td>
              <td>:</td>
              <td><select class="form-control form-control-xs" id="gud_so_unit" onchange="gud_so_changeunit()"></select></td>
            </tr>
            <tr>
              <td>No. BA Stok Opname</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="gud_so_noba"></td>
            </tr>
          </table>
        </div>
      </div>

      <div class="col-md-4 col-sm-6 col-12 p-1">
        <div class="info-box mb-0">
          <table class="table table-striped table-sm mb-0" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td>Keterangan</td>
              <td>:</td>
              <td><textarea type="text" class="form-control pl-1 pt-0" id="gud_so_ket"></textarea>
            </tr>
          </table>
        </div>
      </div>

    </div>
    <div class="card card-row">
      <div class="overlay-wrapper" id="gud_so_loading">
        <div class="overlay dark">
          <i class="fas fa-3x fa-sync-alt fa-spin"></i>
        </div>
      </div>

      <div class="card-header p-1 darkgrey-custom">
        <!-- <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="gud_so_hometable()" id="gud_so_obat"><i class="fa fa-plus"></i> Tambah Obat</button> -->
        <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="gud_so_delROw('gud_so_tableentry')"><i class="fa fa-times"></i> Hapus Obat</button>
        <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="gud_so_save()" id="gud_so_simpan"><i class="fa fa-save"></i> Simpan</button>
        <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="gud_so_pos()" id="gud_so_posting"><i class="fa fa-arrow-right"></i> Posting</button>
        <button type="button" class="btn btn-outline-danger btn-xs" onclick="gud_so_back()"><i class="fa fa-arrow-left"></i> Kembali</button>
      </div>

      <div class="modal-body p-0">
        <div class="card-body p-0">
          
          <div class="col-sm-12 p-0 uk-layar" style="height: 72vh; max-height: 72vh; overflow-x: auto;">
            
            <table class="table table-striped table-sm choose" style="border-collapse: inherit;">
              <thead>
                <tr>
                  <th class="pl-0" width="20">Act</th>
                  <th width="100" style="text-align:center;">Kd.Obat</th>
                  <th>Nm.Obat</th>
                  <th width="100" style="text-align:center;" title="Stok Awal">Stok Awal</th>
                  <th width="100" style="text-align:center;" title="Tarif Harga Jual">Harga</th>
                  <th width="100" style="text-align:center;">Expired</th>
                  <th width="100" style="text-align:center;">Batch</th>
                  <th width="100" style="text-align:center;" title="Adjusment Stok">Stok Opname</th>
                  <th width="100" style="text-align:center;">Selisih</th>
                </tr>
              </thead>
              <tbody id="gud_so_tableentry"></tbody>
              <tfoot style="background-color: #a8d4da; color: black;">
                <tr>
                  <td colspan="3" class="pl-0 pr-0 pt-2">
                    <input type='search' class='form-control form-control-xxs' id='gud_so_tfoot_nmobat' placeholder="Pencarian Obat" autocomplete="off">
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='number' class='form-control form-control-xxs' id='gud_so_tfoot_stokawal' value="0" placeholder="0.00" step="0.01" min="0" max="100" readonly style="text-align:center;">
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='number' class='form-control form-control-xxs' id='gud_so_tfoot_harga' value="0" readonly style="text-align:right;">
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='date' class='form-control form-control-xxs' id='gud_so_tfoot_exp' readonly style="text-align:center;">
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='text' class='form-control form-control-xxs' id='gud_so_tfoot_batch' placeholder="No. Batch" readonly style="text-align:center;">
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='number' class='form-control form-control-xxs pr-0' id='gud_so_tfoot_stokopname' placeholder="0.00" step="0.01" min="0" onchange="hitung_selisih()" style="text-align:center;">
                  </td>
                  <td class="pl-0 pr-0 pt-2">
                    <input type='number' class='form-control form-control-xxs pr-0' id='gud_so_tfoot_selisih' placeholder="0.00" readonly style="text-align:center;">
                  </td>
                  <td class="pl-0 pr-0 pt-2" style="display: none;">
                    <input type='number' class='form-control form-control-xxs pr-0' id='gud_so_tfoot_kd_milik' style="text-align:center;" disabled>
                  </td>
                  <td class="pl-0 pr-0 pt-2" style="display: none;">
                    <input type='number' class='form-control form-control-xxs' id='gud_so_tfoot_harga_beli' value="0" readonly style="text-align:right;">
                  </td>
                </tr>
                <tr>
                  <td colspan="9" class="pl-0 pr-0" style="text-align: -webkit-right;">
                    <div class="input-group col-sm-2 pr-0">
                      <div class="input-group-prepend">
                        <span class="input-group-text form-control-xs">Total : </span>
                      </div>
                      <input type="number" class="form-control form-control-xxs" id="gud_so_tfoot_GrandTotal" value="0" style='text-align: right;' disabled>
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
$('.stokopnameView').show();
$('#gud_so_loading').hide();

var no_so     = "<?php echo $no_so; ?>";
var tgl_so    = "<?php echo $tgl_so; ?>";
var id_unit   = "<?php echo $id_unit; ?>";
var unit      = "<?php echo $unit; ?>";
var posting   = "<?php echo $posting; ?>";
var noba      = "<?php echo $noba; ?>";
var ketso     = "<?php echo $ketso; ?>";

var flag;
console.log("Resolution: "+screen.height);
document.getElementById('gud_so_nomorso').value = no_so;

var kd_obatauto_stokopname;
kd_obatauto_stokopname = new AutoComplete("gud_so_tfoot_nmobat");

var maxdate = "gud_so_tglso";
max_date(maxdate);
gud_so_unit(id_unit);
gud_so_changeunit();

if (no_so == ''){
  document.getElementById('gud_so_tglso').value = nowday;
  flag = false;
  gud_so_OlahInput(flag);
  document.getElementById('gud_so_btnhapus').disabled = flag;
}else{
  gud_so_showdataDetail(no_so, tgl_so);
  document.getElementById('gud_so_tglso').value = tgl_so;
  document.getElementById('gud_so_noba').value  = noba;
  document.getElementById('gud_so_ket').value   = ketso;
  
  if (posting == 't'){ //SUDAH DIPOSTING
    flag = true;
    document.getElementById('gud_so_btnhapus').disabled     = flag;
    gud_so_OlahInput(flag);
  }else{
    flag = false;
    document.getElementById('gud_so_btnhapus').disabled     = flag;
    gud_so_OlahInput(flag);
  }
}

function gud_so_unit(id_unit) {
  apiPOST('Setup/getUnitFarmasi', {id_unit : '4004'}, hasil => {
    var data = hasil['data'];
    var ven = '';
        ven += '<option value="0" >- Pilih Unit -</option>';
    for (var i = 0; i < data.length; i++) {
        ven += '<option value="'+ data[i]['id_unit'] +'">'+ data[i]['nama_unit']+'</option>';
    }
    document.getElementById('gud_so_unit').innerHTML = ven;
    if (id_unit > 0){
      document.getElementById('gud_so_unit').value  = id_unit;
    }
  });
}

function gud_so_showdataDetail(no_so, tgl_so){
  var param = {
    iduser  : user['id_user'],
    no_so   : no_so,
    tgl_so  : tgl_so
  };

  apiPOST('Gudang/gud_so_showdataDetail', param, hasil => {
    if (hasil !== null) {
      var list = hasil['data'];
      for (var i = 0; i < list.length; i++) {
        var kd_obat       = list[i]['kd_obat'];
        var nm_obat       = list[i]['nama_obat'];
        var stokUnit      = list[i]['stok_awal'];
        var harga_beli    = list[i]['harga_beli'];
        var harga         = list[i]['harga_jual_awal'];
        var exp           = list[i]['exp_so'];
        var batch         = list[i]['batch_so'];
        var stokOpname    = list[i]['stok_akhir'];
        var stokSelisih   = list[i]['stok_selisih'];
        var kd_milik      = list[i]['kd_milik'];
        var gab = kd_obat+exp;
        if (batch == null){
          batch = '';
        }else{
          batch = list[i]['batch_so'];
        }
        
        gud_so_lanjutan(gab, kd_obat, nm_obat, stokUnit, harga, exp, batch, stokOpname, stokSelisih, kd_milik, harga_beli);

      }
    }
  });
}

function gud_so_changeunit(){
  var count = $('#gud_so_tableentry tr').length;
  var idunitsementara = document.getElementById('gud_so_unit').value;
  if (count != 0){
    
    pertanyaan.fire({
      title             : 'Merubah Unit Farmasi Tujuan',
      html              : '<span>Inputan akan dikosongkan, lanjutkan ?</span>',
      icon              : 'question',
      showCancelButton  : true,
      reverseButtons    : false,
      allowOutsideClick : false
    }).then((result) => {
      if (result.isConfirmed) {
        id_unit = '0';
        
        $('#gud_so_tableentry').html('');
        document.getElementById("gud_so_tfoot_GrandTotal").value     = 0;
        gud_so_pencarianobat();

      }else if(result.dismiss === Swal.DismissReason.cancel){
        if (id_unit != '0'){
          document.getElementById('gud_so_unit').value  = id_unit;
        }else{
          document.getElementById('gud_so_unit').value  = idunitsementara;
        }
      }
    })
  }else{
    gud_so_pencarianobat();
  }
  kd_obatauto_stokopname.resetData();
}

function gud_so_OlahInput(flag){
  document.getElementById('gud_so_tfoot_nmobat').disabled     = flag;
  document.getElementById('gud_so_tfoot_stokopname').disabled = flag;
  document.getElementById('gud_so_simpan').disabled           = flag;
  document.getElementById('gud_so_posting').disabled          = flag;
  document.getElementById('gud_so_unit').disabled             = flag;
 
  kd_obatauto_stokopname.onPilih(() => {
    var kd_obat     = kd_obatauto_stokopname.getValue();
    var getnm_obat  = $('#gud_so_tfoot_nmobat').val();
    var arrsplit    = getnm_obat.split('<br><p style="display:none;">');
    var arrData     = arrsplit[1].split('#');
    
    //console.log(arrData);
    var nm_obat     = arrsplit[0];
    var stokUnit    = arrData[0];
    var exp         = arrData[1];
    var harga       = arrData[2];
    var batch       = arrData[3];
    var kd_milik    = arrData[4];
    var harga_beli  = arrData[5];
    
    if (batch == 'null'){
      batch = '';
    }else{
      batch = arrData[3];
    }

    $('#gud_so_tfoot_nmobat').val(nm_obat);
    $('#gud_so_tfoot_stokawal').val(stokUnit);
    $('#gud_so_tfoot_harga').val(harga);
    $('#gud_so_tfoot_exp').val(exp);
    $('#gud_so_tfoot_batch').val(batch);
    $('#gud_so_tfoot_stokopname').val(0);
    $('#gud_so_tfoot_selisih').val(0);
    $('#gud_so_tfoot_kd_milik').val(kd_milik);
    $('#gud_so_tfoot_harga_beli').val(harga_beli);

    $('#gud_so_tfoot_stokopname').trigger('focus');
  });

  $("#gud_so_tfoot_stokopname").on( "keydown", function(e) {
    switch(event.which){      
      case 13:
        var so  = parseFloat($(this).val());

        if ((so != '')||(so != '0')){
          hitung_selisih();
          gud_so_next();
        }else{
          toastr.warning("Inputan Stok Opname diisi 0 !!");
          hitung_selisih();
          gud_so_next();
        }
        
        break;
    }
  });

}

function hitung_selisih(){
  var so       = parseFloat($('#gud_so_tfoot_stokopname').val());
  var stokUnit = parseFloat($('#gud_so_tfoot_stokawal').val());
  let val = 0;

  if (stokUnit > so){
    val = stokUnit - so;
  }else if (stokUnit < so){
    val = so - stokUnit;
  }else if (stokUnit == so){
    val = so - stokUnit;
  }else{
    toastr.error("Error Hitung Selisih!!");
  }

  $('#gud_so_tfoot_selisih').val(val);

}

function gud_so_pencarianobat(){
  $('#gud_so_tfoot_nmobat').trigger('focus');
  if (id_unit != '0'){
    id_unitx = id_unit;
  }else{
    id_unitx = document.getElementById("gud_so_unit").value;
  }

  if (id_unitx > 0){
    var param = {
      id_unitFar : id_unitx,
      kd_milik   : user['kepemilikan_obat']
    };

    apiPOST('Gudang/pencarian_obatstkopname', param, hasil => {
      if (hasil !== null) {
        var list = hasil['data'];
        list.forEach(baru => {
          kd_obatauto_stokopname.addData(baru['kd_obat'], baru['nama_obat']+'|| Exp : '+  baru['exp']+'<br><p style="display:none;">'+baru['stok_unit']+'#'+baru['exp']+'#'+baru['tarif_harga_jual']+'#'+baru['batch']+'#'+baru['kd_milik']+'#'+baru['harga_beli']);
        });
        gud_so_emptyRow();
      } 
    });
    
  }else{
    toastr.warning("Tentukan Unit Dahulu!!");
    $('#gud_so_unit').trigger('focus');
  }
}

function gud_so_next(){
  var kd_obat     = kd_obatauto_stokopname.getValue();
  var nm_obat     = $('#gud_so_tfoot_nmobat').val();
  var stokUnit    = $('#gud_so_tfoot_stokawal').val();
  var harga       = $('#gud_so_tfoot_harga').val();
  var exp         = $('#gud_so_tfoot_exp').val();
  var batch       = $('#gud_so_tfoot_batch').val();
  var stokOpname  = $('#gud_so_tfoot_stokopname').val();
  var stokSelisih = $('#gud_so_tfoot_selisih').val();
  var kd_milik    = $('#gud_so_tfoot_kd_milik').val();
  var harga_beli  = $('#gud_so_tfoot_harga_beli').val();
  var gab         = kd_obat+exp;

  if (kd_obat > 0){
    if(stokSelisih < 0){
      toastr.error("Selisih Minus!!");
    }else if(stokSelisih == 0){
      toastr.warning("Selisih 0 : Stok Awal Sama Dengan Stok Opname!!");
      gud_so_lanjutan(gab, kd_obat, nm_obat, stokUnit, harga, exp, batch, stokOpname, stokSelisih, kd_milik, harga_beli);
    }else{
      gud_so_lanjutan(gab, kd_obat, nm_obat, stokUnit, harga, exp, batch, stokOpname, stokSelisih, kd_milik, harga_beli);
    }
  }else{
    toastr.error("Nama obat tidak ditemukan!!");
  }
  
}

function gud_so_emptyRow(){
  kd_obatauto_stokopname.reset();
  document.getElementById('gud_so_tfoot_stokawal').value     = "0";
  document.getElementById('gud_so_tfoot_harga').value        = "0";
  document.getElementById('gud_so_tfoot_exp').value          = "";
  document.getElementById('gud_so_tfoot_batch').value        = "";
  document.getElementById('gud_so_tfoot_stokopname').value   = "0";
  document.getElementById('gud_so_tfoot_selisih').value      = "0";
  // document.getElementById('gud_so_tfoot_GrandTotal').value   = "0";
 
  setTimeout(gud_so_refresh, 500);
}

function gud_so_refresh(){
  document.getElementById('gud_so_tfoot_nmobat').focus();
}

function gud_so_delROw(tableID) {
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

  let xtotalSubT  = 0;  
  var getSubTot   = document.getElementsByName('gud_so_hometable_harga[]');

  var jmlObat = $('#gud_so_tableentry tr').length;
  var i;
  for (i = 0; i < jmlObat; i++) {
    let subToRp = getSubTot[i].value;
    xtotalSubT  += Number(subToRp);
  }

  document.getElementById("gud_so_tfoot_GrandTotal").value     = parseFloat(xtotalSubT);
}

function gud_so_lanjutan(gab, kd_obat, nm_obat, stokUnit, harga, exp, batch, stokOpname, stokSelisih, kd_milik, harga_beli){
  var data = '';
      data += "<tr>";
        data += "<td class='pl-0' style='text-align:center;'><input type='checkbox' name='gud_so_hometable_check[]' class='form-control-xs' /></td>";                     //1
        data += "<td><input type='text' class='form-control form-control-xxs' name='gud_so_hometable_kdobat[]' value='" + kd_obat + "' style='text-align:center;' disabled></td>";        //2
        data += "<td><input type='text' class='form-control form-control-xxs' name='gud_so_hometable_nmobat[]' value='" + nm_obat + "' style='text-align: left;' disabled></td>";         //3
        data += "<td><input type='text' class='form-control form-control-xxs' name='gud_so_hometable_stokUnit[]' value='" + stokUnit + "' style='text-align: center;' disabled></td>";    //4
        data += "<td><input type='text' class='form-control form-control-xxs' name='gud_so_hometable_harga[]' value='" + harga + "' style='text-align: center;' disabled></td>";          //5
        data += "<td><input type='date' class='form-control form-control-xxs' name='gud_so_hometable_expired[]' value='" + exp + "' style='text-align: center;' disabled></td>";          //6
        data += "<td><input type='text' class='form-control form-control-xxs' name='gud_so_hometable_batch[]' value='" + batch + "' style='text-align: center;' disabled></td>";          //7
        data += "<td><input type='text' class='form-control form-control-xxs' name='gud_so_hometable_stokopname[]' value='" + stokOpname + "' style='text-align: center;' disabled></td>";//8
        data += "<td class='pl-0 pr-0'><input type='text' class='form-control form-control-xxs' name='gud_so_hometable_selisih[]' value='" + stokSelisih + "' style='text-align: center;' disabled></td>";      //9
        data += "<td class='pl-0 pr-0' style='display: none;'><input type='text' class='form-control form-control-xxs' name='gud_so_hometable_kd_milik[]' value='" + kd_milik + "' disabled></td>";  //10
        data += "<td class='pl-0 pr-0' style='display: none;'><input type='text' class='form-control form-control-xxs' name='gud_so_hometable_kdobt_exp[]' value='" + gab + "' disabled></td>";      //11
        data += "<td class='pl-0 pr-0' style='display: none;'><input type='text' class='form-control form-control-xxs' name='gud_so_hometable_harga_beli[]' value='" + harga_beli + "' disabled></td>";      //12
      data += "</tr>";

  var getkd_obatso  = document.getElementsByName('gud_so_hometable_kdobt_exp[]');
  var jmlRow      = $('#gud_so_tableentry tr').length;
  const count     = [];

  for(var i = 0, iLen = jmlRow ; i < iLen; i++){
    //PROSES ARRAY PENGECEKAN KODE OBAT
    var datax     = {};
    datax.kd_obat = getkd_obatso[i].value;
    count.push(datax);
  }
  
  const cekkd_obatso = count.map(el => el.kd_obat);     // returns (2)['21462026-10-31', '21462026-08-31']
  const status_kd_obatso = cekkd_obatso.includes(gab);  // returns true
  // console.log(cekkd_obatso);
  // console.log(status_kd_obatso);

  if (status_kd_obatso == false){
    $('#gud_so_tableentry').append(data);
    gud_so_penjumlahan(harga);
  }else{
    toastr.error("Obat Sudah Diinputkan<br>Cek Expired Obat, Tidak Boleh Sama!");
  }

  gud_so_emptyRow();
}

function gud_so_penjumlahan(harga){

  var totalx  = document.getElementById("gud_so_tfoot_GrandTotal").value;
  Total  = parseFloat(totalx) + parseFloat(harga);

  document.getElementById("gud_so_tfoot_GrandTotal").value    = Total;
}

function gud_so_paramSimpan(){
  var kd_obat     = document.getElementsByName('gud_so_hometable_kdobat[]');
  var nm_obat     = document.getElementsByName('gud_so_hometable_nmobat[]');
  var stokUnit    = document.getElementsByName('gud_so_hometable_stokUnit[]');
  var harga       = document.getElementsByName('gud_so_hometable_harga[]');
  var exp         = document.getElementsByName('gud_so_hometable_expired[]');
  var batch       = document.getElementsByName('gud_so_hometable_batch[]');
  var stokOpname  = document.getElementsByName('gud_so_hometable_stokopname[]');
  var stokSelisih = document.getElementsByName('gud_so_hometable_selisih[]');
  var kd_milik    = document.getElementsByName('gud_so_hometable_kd_milik[]');
  var harga_beli  = document.getElementsByName('gud_so_hometable_harga_beli[]');

  var count       = $('#gud_so_tableentry tr').length;
  
  var params = {};  
  params.data     = [];
  for(var i = 0, iLen = count ; i < iLen; i++){
    var x = {};
    x.kd_obat      = kd_obat[i].value;
    x.nm_obat      = nm_obat[i].value;
    x.stokUnit     = stokUnit[i].value;
    x.harga_beli   = harga_beli[i].value;
    x.harga        = harga[i].value;
    x.exp          = exp[i].value;
    x.batch        = batch[i].value;
    x.stokOpname   = stokOpname[i].value;
    x.stokSelisih  = stokSelisih[i].value;
    x.kd_milik     = kd_milik[i].value;
    params.data.push(x);
  }

  console.log(params.data);
  return params.data;
}

function gud_so_save(){
  $('#gud_so_loading').show();

  var tglno_so    = document.getElementById("gud_so_tglso").value;
  var no_so       = document.getElementById("gud_so_nomorso").value;
  var id_unit     = document.getElementById("gud_so_unit").value;
  var no_ba_so    = document.getElementById("gud_so_noba").value;
  var ket_so      = document.getElementById('gud_so_ket').value;
  var GrandTotal  = document.getElementById('gud_so_tfoot_GrandTotal').value;
  var countRow    = $('#gud_so_tableentry tr').length;

  // if (GrandTotal != ''){
  //   GrandTotal = document.getElementById('gud_so_tfoot_GrandTotal').value;
  // }else{
  //   GrandTotal = 0;
  //   toastr.warning("Total Masih Kosong!");
  //   $('#gud_so_loading').hide();
  //   return;
  // }

  // if (countRow == 0){
  //   toastr.warning("Belum Ada Inputan Stok Opname!!");
  //   $('#gud_so_loading').hide();
  //   return;
  // }

  var param = {
    tglno_so      : tglno_so,
    no_so         : no_so,
    id_unit       : id_unit,
    no_ba_so      : no_ba_so,
    ket_so        : ket_so,
    iduser        : user['id_user'],
    idpeg         : user['id_pegawai'],
    id_farUser    : user['id_far'],
    map_idunit    : user['map_bpjs'],
    countRow      : countRow,
    data          : gud_so_paramSimpan(),
    GrandTotal    : GrandTotal
  };
  
  if (id_unit == '0'){
    toastr.warning("Unit Belum dipilih.");
    $('#gud_so_loading').hide();
  }else if (no_ba_so == ''){
    toastr.warning("No. BA Stok Opname Wajib diisi.");
    $('#gud_so_loading').hide();
  }else if (user['id_far'] == ''){
    toastr.warning("Periksa Kembali Konfigurasi Modul Anda.");
    $('#gud_so_loading').hide();
  }else if (GrandTotal == 0){
    toastr.warning("Total Masih Kosong!");
    $('#gud_so_loading').hide();
  }else if (countRow == 0){
    toastr.warning("Belum Ada Inputan Stok Opname!!");
    $('#gud_so_loading').hide();
  }else{
    apiPOST('Gudang/CreateStokOpname', param, hasil => {
      $('#gud_so_loading').hide();
      if (hasil !== null) {
        if (hasil['code'] == '200'){
          document.getElementById("gud_so_nomorso").value = hasil['no_so'];
        }else{
          toastr.error('Gagal Simpan Stok Opname!!');
        }
      }
    });
  }
}

function gud_so_pos(){
  
  $('#gud_so_loading').show();
  var no_so       = document.getElementById("gud_so_nomorso").value;  
  var GrandTotal  = document.getElementById('gud_so_tfoot_GrandTotal').value;
  var countRow    = $('#gud_so_tableentry tr').length;
  var id_unit     = document.getElementById("gud_so_unit").value;

  if (no_so == ''){
   toastr.error("Stok Opname Belum diSimpan!!.");
   $('#gud_so_loading').hide();
   return;
  }

  if (GrandTotal != ''){
    GrandTotal = document.getElementById('gud_so_tfoot_GrandTotal').value;
  }else{
    GrandTotal = 0;
    toastr.error("Total Masih Kosong!");
    $('#gud_so_loading').hide();
    return;
  }

  var param = {
    no_so         : no_so,
    tgl_so        : document.getElementById("gud_so_tglso").value,
    iduser        : user['id_user'],
    idpeg         : user['id_pegawai'],
    id_farUser    : user['id_far'],    
    GrandTotal    : GrandTotal,
    data          : gud_so_paramSimpan(),
    id_unit       : id_unit,
    countRow      : countRow
  };
  
  pertanyaan.fire({
    title             : 'Posting Data',
    html              : '<span>Stok Opname Sudah Selesai ?!<br>Posting dan Simpan Ke Jurnal.<br>Adjustment Stok Tidak Bisa Di Rubah Setelah di Posting!!</span>',
    icon              : 'warning',
    showCancelButton  : true,
    reverseButtons    : false,
    allowOutsideClick : false
  }).then((result) => {
    if (result.isConfirmed) {
      apiPOST('Gudang/gud_so_PostingStokOpname', param, hasil => {
      $('#gud_so_loading').hide();
        if (hasil !== null) {
          if (hasil['code'] == '200'){
            gud_so_backk();
          }else{
            toastr.error('Gagal Posting Stok Opname!!');
          }
        }
      }).then(function(){
        $('#gud_so_loading').hide();
      });

    }else if(result.dismiss === Swal.DismissReason.cancel){
      $('#gud_so_loading').hide();
    }
  })
}

function gud_so_hapus(){
  $('#gud_so_loading').show();
  var no_so  = document.getElementById("gud_so_nomorso").value;
  if (no_so != ''){
    pertanyaan.fire({
      title             : 'Hapus Stok Opname, Masukkan alasan dihapus ?!',
      html              : '<input type="text" class="form-control form-control-sm" id="gud_so_alasan" class="swal2-input" placeholder="Enter your reason" autocomplete="off" required>',
      icon              : 'error',
      showCancelButton  : true,
      reverseButtons    : false,
      allowOutsideClick : false
    }).then((result) => {
      if (result.isConfirmed) {
        var alasan = document.getElementById('gud_so_alasan').value;
        if (alasan != ''){
          
          var param = {
            kdFar         : user['map_bpjs'],
            no_so         : no_so,
            tgl_so        : document.getElementById("gud_so_tglso").value,
            iduser        : user['id_user'],
            idpeg         : user['id_pegawai'],
            id_farUser    : user['id_far'],
            id_unit       : document.getElementById("gud_so_unit").value,
            reason        : alasan,
            GrandTotal    : document.getElementById('gud_so_tfoot_GrandTotal').value,
          };

          apiPOST('Gudang/LogHapusStokOpname', param, hasil => {
            $('#gud_so_loading').hide();
            if (hasil !== null) {
              gud_so_backk();
            }
          });
        }else{
          swal_center('Alasan tidak boleh kosong!!','error');
        }
        
      }else if(result.dismiss === Swal.DismissReason.cancel){
        $('#gud_so_loading').hide();
      }
    })
  }
}

function gud_so_back(){
  var no_so = document.getElementById("gud_so_nomorso").value;
  if (no_so == ''){    
    pertanyaan.fire({
      title             : 'Kembali ke menu awal',
      html              : '<span>Data Stok Opname belum ter Simpan, tetap kembali ?</span>',
      icon              : 'question',
      showCancelButton  : true,
      reverseButtons    : false,
      allowOutsideClick : false
    }).then((result) => {
      if (result.isConfirmed) {
        gud_so_backk();
      }else if(result.dismiss === Swal.DismissReason.cancel){
        
      }
    })
  }else{
    gud_so_backk();
  }
}

function gud_so_backk() {
  $('.stokopnameView').hide();
  $('#gudang_stok_opname_awal').show();
  $('#gudang_stok_opname_kedua').show();
  gudang_stok_opname_showdata();
}

</script>