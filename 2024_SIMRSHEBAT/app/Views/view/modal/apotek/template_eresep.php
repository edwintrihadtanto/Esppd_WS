<?php
  $data = json_decode($_GET['data']);
  $id      = str_replace('"','', json_encode($data->templateResepView_id));
  $tgl     = str_replace('"','', json_encode($data->templateResepView_tgl));
  $status  = str_replace('"','', json_encode($data->templateResepView_status));
  $idpeg   = str_replace('"','', json_encode($data->templateResepView_idpeg));
  $tglbuat = date_format(date_create($tgl), 'd-M-Y'); //FORMAT TGL 02-Feb-2023
?>
<section class="content pb-0">
  <div class="container-fluid h-100">
    <div class="card card-row">
      <div class="card-header p-1">
        <div class="row p-1">
          <div class="col-sm-4 mb-0">
            <div class="form-group row mb-1">
              <label for="templateresep_idtemplate" class="col-sm-4">Id.Template E-Resep</label>
              <div class="input-group col-sm-8">
                <input type="text" class="form-control form-control-xs" id="templateresep_idtemplate" name="templateresep_idtemplate" disabled>
                <div class="input-group-prepend">
                  <button type="button" class="btn btn-danger btn-xs" id="templateresep_btnhpus_order" onclick="templateresep_hpustemplate()"><i class="fa fa-trash"></i></button>
                </div>
              </div>                  
            </div>
            <div class="form-group row mb-1">
              <label for="templateresep_tgltemplate" class="col-sm-4">Tanggal</label>
              <div class="col-sm-8">
                <input type="date" class="form-control form-control-xs" id="templateresep_tgltemplate" name="templateresep_tgltemplate">
              </div>
            </div>
            <div class="form-group row mb-1">
              <label for="templateresep_dokter" class="col-sm-4">Dokter</label>
              <div class="col-sm-8">
                <select class="form-control form-control-xs" id="templateresep_dokter"></select>
              </div>
            </div>
            <div class="form-group row mb-1" style="display: none;">
              <label class="col-sm-4">Total Jumlah</label>
              <label class="col-sm-2">Rp.</label>
              <h5 class="col-sm-6" id="vtemplateresep_grandtotal" style="text-align:right; font-weight: bold;" >0</h5>
              <input type="text" value="0" class="form-control form-control-xs" id="templateresep_grandtotal" name="templateresep_grandtotal" disabled hidden>
              
            </div>
          </div>
          
          <div class="col-sm-8 mb-0">
            <div class="form-group row mb-1">
              <label for="templateresep_catatandokter" class="col-sm-2">Catatan / Iter</label>
              <div class="col-sm-10">
                <textarea class="form-control form-control-sm" id="templateresep_catatandokter" name="templateresep_catatandokter" style="height:50px;"></textarea>
              </div>
            </div>
            <div class="form-group row mb-1">
              <label for="templateresep_jenisresep" class="col-sm-2">Jenis Resep</label>
              <div class="col-sm-10">
                <select class="form-control form-control-xs" id="templateresep_jenisresep">
                  <option value="">---</option>
                  <option value="1">Resep PRB (Program Rujuk Balik)</option>
                  <option value="2">Resep Kronis</option>
                  <option value="3">Resep Kemoterapi</option>
                </select>
              </div>
            </div>
          </div>

        </div>
      </div>
      <div class="card-header p-1 darkgrey-custom">
        <button type="button" class="btn bg-gradient-info btn-xs" id="templateresep_simpantemplate" onclick="templateresep_simpantemplate()"><i class="fa fa-save"></i> Simpan</button>
        <button type="button" class="btn bg-gradient-danger btn-xs" id="templateresep_preview_detailObat" onclick="templateresep_preview_detailObat()"><i class="fa fa-arrow-right"></i> Selesai</button>
        <button type="button" class="btn bg-gradient-info btn-xs" onclick="templateresep_preview_detailObat2()"><i class="fa fa-eye"></i> Preview</button>
        <button type="button" class="btn btn-info btn-xs" onclick="getData_templateresep()"><i class="fa fa-sync-alt fa-spin"></i> Refresh Data</button>
        <button type="button" class="btn btn-outline-danger btn-xs" onclick="templateresep_kembalikeawal()"><i class="fa fa-arrow-left"></i> Kembali</button>
        <input type="text" class="form-control form-control-xs" id="templateresep_penentu_resepobat" value="0" disabled style="width:50px; display:none;">
      </div>
      <div class="modal-body p-1">
        <div class="overlay-wrapper" id="loading_modal_templateresep">
          <div class="overlay dark">
            <i class="fas fa-3x fa-sync-alt fa-spin"></i>            
          </div>
        </div>

        <div class="card-body p-0">
          <ul class="nav nav-tabs" id="rwj_resep_custom-content-above-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="pill" href="#rwj_resep_obatjadi" role="tab" aria-selected="true" onclick="tabrwj_resep_obatjadi();">Obat Jadi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="pill" href="#rwj_resep_obatracik" role="tab" aria-selected="true" onclick="tabrwj_resep_obatracik();">Obat Racik</a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn-danger" data-toggle="pill" href="#" role="tab" aria-selected="true" id="templateresep_infojenis_racikan" style="font-weight: bold; color: white;">-</a>
            </li>
          </ul>

          <div class="tab-content" id="rwj_resep_custom-content-above-tabContent">
            <div class="tab-pane p-0 fade active show" id="rwj_resep_obatjadi" role="tabpanel">
              <div class="col-sm-12 p-1" style="max-height: 323px; overflow-x: hidden;">
                <div class="row mb-1" id="templateresep_inputan_obat_jadi">
                  <!-- <div class="col-md-3">
                    <div class="form_group">
                      <label>Pencarian Obat</label>
                      <select class="form-control form-control-xs templateresep_pencarian" id="templateresep_pencarian"></select>
                    </div>
                  </div> -->

                  <div class="input-group col-sm-3">
                    <input type="text" class="form-control form-control-xs" id="templateresep_obatjadi_urut" hidden disabled>
                    <div class="input-group-prepend">
                      <span class="input-group-text form-control-xs">Nama</span>
                    </div>
                    <input type="search" class="form-control form-control-xs" placeholder="Ketikkan Nama Obat" id="templateresep_obatjadi_nm" autocomplete="false">
                  </div>
                  <div class="col-sm-2">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text form-control-xs">Banyak</span>
                      </div>              
                      <input type="number" class="form-control form-control-xs" id="templateresep_obatjadi_qty">
                    </div>
                  </div>
                  <div class="input-group col-sm-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text form-control-xs">Signa</span>
                    </div>
                    <input type="search" class="form-control form-control-xs" id="templateresep_obatjadi_signa">
                  </div>
                  <div class="input-group col-sm-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text form-control-xs">Ket.</span>
                    </div>
                    <input type="text" class="form-control form-control-xs" id="templateresep_obatjadi_ket">
                    <div class="input-group-prepend">
                      <button type="button" class="btn btn-primary btn-xs" id="templateresep_btn_check_obatjadi"><i class="fa fa-check"></i></button>
                      <button type="button" class="btn btn-outline-primary btn-xs" onclick="kosongObatJadi()"><i class="fa fa-file"></i> Baru</button>
                    </div>
                  </div>
                  
                </div> 
                <table border="0" cellpadding="0" cellspacing="0" id="templatereseptable_obatjadi" class="table table-striped table-sm choose">
                  <thead>
                    <tr>
                      <th class="pl-0" width="30" style="text-align:center;">#</th>
                      <th width="100">Act</th>
                      <th width="100">Kode Produk</th>
                      <th>Nama Obat</th>
                      <th width="70">Qty</th>
                      <th width="250">Signa</th>
                      <th width="250">Catatan</th>
                      <!-- <th width="100">Hrga</th>
                      <th width="100">Jumlah</th> -->
                      <!-- <th width="70">Satuan</th> -->
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table> 
              </div>
            </div>
            <div class="tab-pane p-0 fade" id="rwj_resep_obatracik" role="tabpanel">
              <div class="col-sm-12 p-1">
                <div class="mb-1" id="templateresep_inputan_obat_racik">
                  <div class="row" id="templateresep_inputan_obat_racik1">
                    <div class="input-group col-sm-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text form-control-xs">Racikan</span>
                      </div>
                      <input type="search" class="form-control form-control-xs" placeholder="Ketikkan Nama Racikan" id="templateresep_nmaracikan">
                    </div>
                    <div class="input-group col-sm-2">
                      <div class="input-group-prepend">
                        <span class="input-group-text form-control-xs">Banyak</span>
                      </div>
                      <input type="number" class="form-control form-control-xs" id="templateresep_bnykracikan">
                    </div> 
                    <div class="input-group col-sm-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text form-control-xs">Signa</span>
                      </div>
                      <input type="search" class="form-control form-control-xs" id="templateresep_signaracikan">
                    </div>
                    <div class="input-group col-sm-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text form-control-xs">Ket.</span>
                      </div>
                      <input type="text" class="form-control form-control-xs" id="templateresep_ketracikan">
                      <div class="input-group-prepend">
                        <button type="button" class="btn btn-outline-primary btn-xs" onclick="templateresep_mulaiawalRacikan()"><i class="fa fa-file"></i> Baru</button>
                      </div>
                    </div>

                  </div>
                  <hr class="mt-2 mb-2" width="95%">
                  <div class="row" id="templateresep_inputan_obat_racik2">
                    <!-- <div class="col-sm-auto">
                      <button type="button" class="btn btn-danger btn-xs" id="templateresep_infojenis_racikan"></button>
                    </div> -->
                    <div class="input-group col-sm-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text form-control-xs">Nama</span>
                      </div>
                      <input type="search" class="form-control form-control-xs" placeholder="Ketikkan Nama Obat" autocomplete="false" id="templateresep_obat_racik_nmaobat">
                    </div>
                    <div class="col-sm-2">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text form-control-xs">Dosis</span>
                        </div>
                        <input type="number" class="form-control form-control-xs" id="templateresep_obat_racik_dosis">
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text form-control-xs">Banyak</span>
                        </div>
                        <input type="number" class="form-control form-control-xs" id="templateresep_obat_racik_qty">
                      </div>
                    </div>
                    <div class="input-group col-sm-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text form-control-xs">Ket.</span>
                      </div>
                      <input type="text" class="form-control form-control-xs" id="templateresep_obat_racik_ket">
                      <div class="input-group-prepend">
                        <button type="button" class="btn btn-outline-primary btn-xs" id="templateresep_btn_check_obatracik"><i class="fa fa-check"></i> Pilih</button>
                      </div>
                    </div>
                  </div>

                </div>                  
                <div class="row p-1">
                  <div class="col-sm-3" style="max-height: 323px; overflow: hidden;">
                    <table border="0" cellpadding="0" cellspacing="0" id="templatereseptable_obatracik_jenisracikan" class="table table-striped table-sm choose">
                    <thead>
                      <tr>
                        <th width="10">#</th>
                        <th width="50">Act</th>
                        <!-- <th width="50">Kode</th> -->
                        <th>Racikan</th>
                        <!-- <th width="50">Banyak</th>
                        <th width="100">Signa</th>
                        <th width="100">Keterangan</th> -->
                      </tr>
                    </thead>
                    <tbody></tbody>
                    </table>
                  </div>
                  <div class="col-sm-9" style="max-height: 323px; overflow-x: hidden;">
                    <table border="0" cellpadding="0" cellspacing="0" id="templatereseptable_obatracik" class="table table-striped table-sm choose">
                    <thead>
                      <tr>
                        <th width="10">#</th>
                        <th width="50">Act</th>
                        <th width="100">Kode Produk</th>
                        <th>Nama Obat</th>
                        <th width="100">Dosis</th>
                        <th width="90">Qty</th>
                        <th width="150">Keterangan</th>
                      </tr>
                    </thead>
                    <tbody></tbody>
                    </table> 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> 
      </div>

    </div>
  </div>
  
</section>

<script type="text/javascript">
$('.templateresep').show();

var idtemplate    = "<?php echo $id; ?>";
var nowday        = "<?php echo $tgl; ?>";
var tgltemplate   = "<?php echo $tgl; ?>";
var idpeg         = "<?php echo $idpeg; ?>";
var status        = "<?php echo $status; ?>";

var kd_produkObatJadiTemplateResep;
var kd_JenisRacikanTemplateResep;
var kd_produkObatRacikTemplateResep;
var kd_signaObatJadiTemplateResep;
var kd_signaObatRacikTemplateResep;
var nama_racikan;

kd_signaObatJadiTemplateResep   = new AutoCompleteObat("templateresep_obatjadi_signa");
kd_signaObatRacikTemplateResep  = new AutoCompleteObat("templateresep_signaracikan");
kd_produkObatJadiTemplateResep  = new AutoCompleteObat("templateresep_obatjadi_nm");
kd_produkObatRacikTemplateResep = new AutoCompleteObat("templateresep_obat_racik_nmaobat");
kd_JenisRacikanTemplateResep    = new AutoCompleteObat("templateresep_nmaracikan");

document.getElementById('templateresep_tgltemplate').value = tgltemplate;
var maxdate = "templateresep_tgltemplate";
max_date(maxdate);

templateresep_ObatJadi();
templateresep_ObatRacik();
tabrwj_resep_obatjadi();
getObat_templateresep();
getSignaTemplate();
getDokterTemplate();
getData_templateresep();

if (status == 't'){
  document.getElementById('templateresep_simpantemplate').disabled = true;
  document.getElementById('templateresep_preview_detailObat').disabled = true;
}

function getDokterTemplate() {
  apiPOST('Setup/getDokter', null, hasil => {
    var data = hasil['data'];
    var dok = '';
      dok += '<option value="0">- Dokter -</option>';
    for (var i = 0; i < data.length; i++) {
      dok += '<option value="'+ data[i]['id_pegawai'] +'">'+ data[i]['nama_pegawai'].toUpperCase()+'</option>';
    }
    document.getElementById('templateresep_dokter').innerHTML = dok;
    document.getElementById('templateresep_dokter').value = idpeg;
  });
}

function getObat_templateresep(){  
  var param = {
    obatcari: document.getElementById("templateresep_obatjadi_nm").value,
  };
  
  apiPOST('Apotek/getObat_eresep', param, hasil => {
    if (hasil !== null) {
      var list = hasil['data'];
      list.forEach(baru => {
        kd_produkObatJadiTemplateResep.addData(baru['kd_obat'], baru['nama_obat']);
        kd_produkObatRacikTemplateResep.addData(baru['kd_obat'], baru['nama_obat']);
      });
    }
  });

  apiPOST('Apotek/getJnsRacikan_eresep', null, hasil => {
    if (hasil !== null) {
      var list = hasil['data'];
      list.forEach(baru => {
        kd_JenisRacikanTemplateResep.addData(baru['id_jns_racik'], baru['jns_racik']);
      });
    }
  });
}

function getSignaTemplate(){
  
  apiPOST('Apotek/getSigna', null, hasil => {
    if (hasil !== null) {
      var list = hasil['data'];
      list.forEach(baru => {
        kd_signaObatJadiTemplateResep.addData(baru['id_signa'], baru['signa']);
        kd_signaObatRacikTemplateResep.addData(baru['id_signa'], baru['signa']);
      });
    }
  });
}

function getData_templateresep(){
  $('#loading_modal_templateresep').show();
  var param = {
    idtemplate   : idtemplate,
    tgltemplate  : document.getElementById('templateresep_tgltemplate').value,
    iduser       : user['id_user'],
    iddokter     : document.getElementById('templateresep_dokter').value,
  };

  apiPOST('Apotek/getData_templateresep', param, hasil => {
    // sessionStorage.clear();
    if (hasil !== null) {
      $('#loading_modal_templateresep').hide();
      if (hasil['code'] == '200'){
        var data        = hasil['data'];
        var ObatJadi    = hasil['ObatJadi'];
        var GroupRacik  = hasil['GroupRacik'];
        var ObatRacik   = hasil['ObatRacik'];

        if (hasil['count'] > 1){
          toastr.warning('Terdapat Lebih dari 1 Template Resep!');
        }else{
          $('#templatereseptable_obatjadi tbody').html('');
          $('#templatereseptable_obatracik_jenisracikan tbody').html('');
          $('#templatereseptable_obatracik tbody').html('');
          document.getElementById("templateresep_grandtotal").value = 0;

          for (var i = 0; i < data.length; i++) {
            document.getElementById("templateresep_idtemplate").value     = data[i].id_template;
            document.getElementById("templateresep_tgltemplate").value    = data[i].tgl_buat;
            document.getElementById("templateresep_catatandokter").value  = data[i].catatandokter;
            document.getElementById("templateresep_jenisresep").value     = data[i].jnsresep;
          }

          for (var o = 0; o < ObatJadi.length; o++) {
            var kd_obat    = ObatJadi[o].kd_obat;
            var nm_obat   = ObatJadi[o].nama_obat;
            var qty       = ObatJadi[o].jumlah;
            var id_signa  = ObatJadi[o].id_signa;
            var signa     = ObatJadi[o].signa;
            var ket       = ObatJadi[o].ket;

            tampilkan_isi_obatjdi_templateresep(kd_obat, nm_obat, qty, id_signa, signa, ket);
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
              groupracikan[g]   = GroupRacik[g].jns_racikan;
              
              var Nomor = $('#templatereseptable_obatracik_jenisracikan tbody tr').length + 1;
              var Baris = "<tr>";
                 Baris += "<td>"+Nomor+"</td>";
                 Baris += '<td style="display: flex; justify-content: left;"><button type="button" class="btn btn-xs btn-warning" title="Tampilkan '+ nama_racikan+'" onclick="tampilkan_jenisracik_templateresep('+"'"+Nomor+"','"+nma_racikan+"','"+byk_racikan+"','"+sig_racikan+"','"+ket_racikan+"','"+x+"'"+')"><i class="fa fa-arrow-up"></i></button>&nbsp;<button type="button" class="btn btn-xs btn-danger" onclick="hapus_jenisracik_templateresep(this, '+"'"+Nomor+"','"+nma_racikan+"','"+byk_racikan+"','"+sig_racikan+"','"+ket_racikan+"','"+nama_racikan+"'"+')"><i class="fa fa-times"></i></button></td>';
                 Baris += "<td hidden>"+Nomor+"</td>";
                 Baris += "<td>";
                 Baris += "<input type='text' class='form-control form-control-xs' name='templateresep_nma_jenisracikan[]' value='" + nama_racikan +"' disabled>";
                 Baris += "</td>";
                 Baris += "<td hidden><input type='text' class='form-control form-control-xs' name='templateresep_nma_byk_racikan[]' value='" + byk_racikan +"' disabled></td>";
                 Baris += "<td hidden><input type='text' class='form-control form-control-xs' name='templateresep_nma_idsig_racikan[]' value='" + id_sig_rac +"' disabled></td>";
                 Baris += "<td hidden><input type='text' class='form-control form-control-xs' name='templateresep_nma_sig_racikan[]' value='" + sig_racikan +"' disabled></td>";
                 Baris += "<td hidden><input type='text' class='form-control form-control-xs' name='templateresep_nma_ket_racikan[]' value='" + ket_racikan +"' disabled></td>";
                 Baris += "</tr>";
              
              $('#templatereseptable_obatracik_jenisracikan tbody').append(Baris);
              sessionStorage['RACIK_'+nama_racikan] = '[{"racikan":"'+nama_racikan+'","qty":"'+byk_racikan+'","idsigna":"'+id_sig_rac+'","signa":"'+sig_racikan+'","ket":"'+ket_racikan+'"}]';
            }

            var group_racikan = groupracikan.filter(onlyUnique);
            //console.log(group_racikan);
            const group_racikandriOBAT = groupBy(ObatRacik, "jns_racikan");
            //console.log(group_racikandriOBAT);
          
            for (let a = 0; a < group_racikan.length; a++) {
              var nm_kelompok = group_racikan[a];
              const params    = []; 
              for (let i = 0; i < group_racikandriOBAT[nm_kelompok].length; i++) {
                var kd_obat    = group_racikandriOBAT[nm_kelompok][i].kd_obat;
                var nm_obat   = group_racikandriOBAT[nm_kelompok][i].nama_obat;
                var dosis     = group_racikandriOBAT[nm_kelompok][i].dosis;
                var qty       = group_racikandriOBAT[nm_kelompok][i].jumlah;
                var ket       = group_racikandriOBAT[nm_kelompok][i].ket;
                var jns_racik = group_racikandriOBAT[nm_kelompok][i].jns_racikan;
                var id_signa  = group_racikandriOBAT[nm_kelompok][i].id_signa;

                var x = {};
                var no = i + 1;
                    x.urut    = no;
                    x.kd_obat  = kd_obat;
                    x.nm_prd  = nm_obat;
                    if (dosis !== ''){
                      x.dosis = dosis;
                    }else{
                      x.dosis = "0";
                    }
                    x.qty     = qty;
                    x.ket     = ket;
                    x.jnsracik= jns_racik;
                    params.push(x);

                sessionStorage[jns_racik] = JSON.stringify(params);
                //PROSES PENJUMLAHAN HARGA OBAT
                var totalx = document.getElementById("templateresep_grandtotal").value;
                total = parseInt(totalx) + parseInt(qty);
                document.getElementById("templateresep_grandtotal").value = total;
                document.getElementById("vtemplateresep_grandtotal").innerHTML = format_ribuan(total);
              }
            }
          }

        }
      
      }else{
        toastr.info("Belum Ada Template E-Resep.");
        
        $('#templatereseptable_obatjadi tbody').html('');
        $('#templatereseptable_obatracik_jenisracikan tbody').html('');
        $('#templatereseptable_obatracik tbody').html('');
      }
    }else{

    }
  });
}

function templateresep_ObatJadi(){

  kd_produkObatJadiTemplateResep.onPilih(()=>{
    $("#templateresep_obatjadi_qty").trigger('focus');
    $("#templateresep_obatjadi_qty").val(1);
  });

  $("#templateresep_obatjadi_qty").on("keyup", function(event){
    if (event.keyCode == 13) {
      $("#templateresep_obatjadi_signa").trigger('focus');
    }
  });

  $("#templateresep_obatjadi_signa").on("keyup", function(event){
    if (event.keyCode == 13) {
      $("#templateresep_obatjadi_ket").trigger('focus');
    }
  });

  $("#templateresep_obatjadi_ket").on("keyup", function(event){
    if (event.keyCode == 13) {
      var kd_obat  = kd_produkObatJadiTemplateResep.getValue();      
      var nm_obat = document.getElementById("templateresep_obatjadi_nm").value;
      var cekqty  = document.getElementById("templateresep_obatjadi_qty").value;
      if (cekqty != ''){
        var qty = cekqty;
      }else{
        var qty = '0';
      }
      var id_signa= kd_signaObatJadiTemplateResep.getValue();
      var signa   = document.getElementById("templateresep_obatjadi_signa").value.toUpperCase();
      var ket     = document.getElementById("templateresep_obatjadi_ket").value;
      if (kd_obat != null){
        if ((qty != '0')||(qty != '')||(signa != '')){
          if (id_signa != null){
            tampilkan_isi_obatjdi_templateresep(kd_obat, nm_obat, qty, id_signa, signa, ket);
            kosongObatJadi();
          }else{
            // toastr.error("Signa obat tidak ditemukan!!");
            // $("#templateresep_obatjadi_signa").trigger('focus');
            autosimpan_signabaruObatJadi(kd_obat, nm_obat, qty, signa, ket);
          }
        }else{
          toastr.error("Inputan Masih Kosong!!");  
        }
      }else{
        toastr.error("Nama obat tidak ditemukan!!");
        kosongObatJadi();
      }
            
    }
  });  

  $("#templateresep_btn_check_obatjadi").click(function( event ) {
    var kd_obat  = kd_produkObatJadiTemplateResep.getValue();
    var nm_obat = document.getElementById("templateresep_obatjadi_nm").value;
    var cekqty  = document.getElementById("templateresep_obatjadi_qty").value;
    if (cekqty != ''){
      var qty = cekqty;
    }else{
      var qty = '0';
    }
    var id_signa= kd_signaObatJadiTemplateResep.getValue();
    var signa   = document.getElementById("templateresep_obatjadi_signa").value.toUpperCase();
    var ket     = document.getElementById("templateresep_obatjadi_ket").value;
    if (kd_obat != null){
      if ((qty != '0')||(qty != '')||(signa != '')){
        if (id_signa != null){
          tampilkan_isi_obatjdi_templateresep(kd_obat, nm_obat, qty, id_signa, signa, ket);
          kosongObatJadi();
        }else{
          // toastr.error("Signa obat tidak ditemukan!!");
          // $("#templateresep_obatjadi_signa").trigger('focus');
          autosimpan_signabaruObatJadi(kd_obat, nm_obat, qty, signa, ket);
        }
      }else{
        toastr.error("Inputan Masih Kosong!!");  
      }
    }else{
      toastr.error("Nama obat tidak ditemukan!!");
      kosongObatJadi();
    }
  });

}

function autosimpan_signabaruObatJadi(kd_obat, nm_obat, qty, signa, ket){
  var param = {
    proses    : false,
    id_signa  : '',
    signa     : signa,
    user      : user['id_user']
  };

  apiPOST('Setup/mappingsigna_addeditSigna', param, hasil => {
    if (hasil !== null) {
      if (hasil['code'] == '200'){
        var id_signa= hasil['id_signa'];
        tampilkan_isi_obatjdi_templateresep(kd_obat, nm_obat, qty, id_signa, signa, ket);
        kosongObatJadi();
        getSignaTemplate();
      }else{
        toastr.error("Gagal Tambah Signa!");
      }
    }
  });
  console.clear();
}

function autosimpan_signabaruObatRacik(nma_racikan, byk_racikan, sig_racikan, ket_racikan){
  var param = {
    proses    : false,
    id_signa  : '',
    signa     : sig_racikan,
    user      : user['id_user'],
  };

  apiPOST('Setup/mappingsigna_addeditSigna', param, hasil => {
    if (hasil !== null) {
      if (hasil['code'] == '200'){
        var id_sig_rac = hasil['id_signa'];
        tampilkan_isi_obatracik_jenisracikan_templateresep(nma_racikan, byk_racikan, id_sig_rac, sig_racikan, ket_racikan);
        disabledObatJenisRacik_TemplateResep();
        getSignaTemplate();
      }else{
        toastr.error("Gagal Tambah Signa!");
      }
    }
  });
  console.clear();
}

function templateresep_ObatRacik(){
  /*INPUTAN JENIS RACIKAN*/
  kd_JenisRacikanTemplateResep.onPilih(()=>{
    $("#templateresep_bnykracikan").trigger('focus');
    $("#templateresep_bnykracikan").val(1);
  });

  $("#templateresep_bnykracikan").on("keyup", function(event){
    if (event.keyCode == 13) {
      $("#templateresep_signaracikan").trigger('focus');
      //$("#templateresep_signaracikan").val('3x1');
    }
  });

  $("#templateresep_signaracikan").on("keyup", function(event){
    if (event.keyCode == 13) {
      $("#templateresep_ketracikan").trigger('focus');
    }
  });

  kd_signaObatRacikTemplateResep.onPilih(()=>{
    $("#templateresep_ketracikan").trigger('focus');
  });

  $("#templateresep_ketracikan").on("keyup", function(event){
    if (event.keyCode == 13) {
      var nma_racikan = $('#templateresep_nmaracikan').val().toUpperCase().replace(/ /gi, "_");
      var byk_racikan = $('#templateresep_bnykracikan').val();
      var id_sig_rac  = kd_signaObatRacikTemplateResep.getValue();
      var sig_racikan = $('#templateresep_signaracikan').val().toUpperCase();
      var ket_racikan = $('#templateresep_ketracikan').val().toUpperCase();
      if (id_sig_rac != null){
        if (nma_racikan == '' || byk_racikan == '' || sig_racikan == ''){
          toastr.error("Inputan masih kosong!!");
        }else{
          $('#templateresep_inputan_obat_racik1').show(); 
          $('#templateresep_inputan_obat_racik2').show();
          $("#templateresep_obat_racik_nmaobat").trigger('focus');
          $('#templatereseptable_obatracik tbody').html('');

          tampilkan_isi_obatracik_jenisracikan_templateresep(nma_racikan, byk_racikan, id_sig_rac, sig_racikan, ket_racikan);
          disabledObatJenisRacik_TemplateResep();
        }
      }else{
        autosimpan_signabaruObatRacik(nma_racikan, byk_racikan, sig_racikan, ket_racikan);
        // toastr.error("Signa obat tidak ditemukan!!");
        // $("#templateresep_signaracikan").trigger('focus');
      }  
    }
  }); 
  /*END INPUTAN JENIS RACIKAN*/
  /*INPUTAN OBAT RACIKAN*/  

  kd_produkObatRacikTemplateResep.onPilih(()=>{
    $("#templateresep_obat_racik_dosis").trigger('focus');
  });

  $("#templateresep_obat_racik_dosis").on("keyup", function(event){
    if (event.keyCode == 13) {
      $("#templateresep_obat_racik_qty").trigger('focus');
      $("#templateresep_obat_racik_qty").val(1);
    }
  });

  $("#templateresep_obat_racik_qty").on("keyup", function(event){
    if (event.keyCode == 13) {
      $("#templateresep_obat_racik_ket").trigger('focus');
    }
  });

  $("#templateresep_obat_racik_ket").on("keyup", function(event){
    if (event.keyCode == 13) {
      var kd_obat  = kd_produkObatRacikTemplateResep.getValue();
      var nm_obat = document.getElementById("templateresep_obat_racik_nmaobat").value;
      var cekdosis = document.getElementById("templateresep_obat_racik_dosis").value;
      if (cekdosis != ''){
        var dosis = cekdosis;
      }else{
        var dosis = '0';
      }    
      var cekqty  = document.getElementById("templateresep_obat_racik_qty").value;
      if (cekqty != ''){
        var qty = cekqty;
      }else{
        var qty = '0';
      }
      var ket     = document.getElementById("templateresep_obat_racik_ket").value;
      
      if (kd_obat != null){
        if ((qty != '0')||(qty != '')){
          //PROSES PENJUMLAHAN HARGA OBAT
          var totalx = document.getElementById("templateresep_grandtotal").value;
          total = parseInt(totalx) + parseInt(qty);
          document.getElementById("templateresep_grandtotal").value = total;
          document.getElementById("vtemplateresep_grandtotal").innerHTML = format_ribuan(total);
          tampilkan_isi_obatracik(kd_obat, nm_obat, dosis, qty, ket);
          kosongObatRacik();
        }else{
          toastr.error("Inputan Masih Kosong!!");  
        }
      }else{
        toastr.error("Nama obat tidak ditemukan!!");
        kosongObatRacik();
      }
    }
  });  

  $("#templateresep_btn_check_obatracik").click(function( event ) {
    var kd_obat  = kd_produkObatRacikTemplateResep.getValue();
    var nm_obat = document.getElementById("templateresep_obat_racik_nmaobat").value;
    var cekdosis   = document.getElementById("templateresep_obat_racik_dosis").value;
    if (cekdosis != ''){
      var dosis = cekdosis;
    }else{
      var dosis = '0';
    }
    var cekqty  = document.getElementById("templateresep_obat_racik_qty").value;
    if (cekqty != ''){
      var qty = cekqty;
    }else{
      var qty = '0';
    }      
    var ket     = document.getElementById("templateresep_obat_racik_ket").value;
    if (kd_obat != null){
      if ((qty != '0')||(qty != '')){
        //PROSES PENJUMLAHAN HARGA OBAT
        var totalx = document.getElementById("templateresep_grandtotal").value;
        total = parseInt(totalx) + parseInt(qty);
        document.getElementById("templateresep_grandtotal").value = total;
        document.getElementById("vtemplateresep_grandtotal").innerHTML = format_ribuan(total);  
        tampilkan_isi_obatracik(kd_obat, nm_obat, dosis, qty, ket);
        kosongObatRacik();
      }else{
        toastr.error("Inputan Masih Kosong!!");  
      }
    }else{
      toastr.error("Nama obat tidak ditemukan!!");
      kosongObatRacik();
    }
  });

}

function kosongObatJadi(){ 
  document.getElementById("templateresep_obatjadi_nm").disabled = false;
  $("#templateresep_obatjadi_nm").trigger('focus');
  document.getElementById("templateresep_obatjadi_urut").value  = '';
  document.getElementById("templateresep_obatjadi_nm").value    = '';
  document.getElementById("templateresep_obatjadi_qty").value   = '';
  document.getElementById("templateresep_obatjadi_signa").value = '';
  document.getElementById("templateresep_obatjadi_ket").value   = '';
  kd_produkObatJadiTemplateResep.reset();
  kd_signaObatJadiTemplateResep.reset();
}

function kosongJenisRacikan(){
  //kd_JenisRacikanTemplateResep.reset();
  //kd_signaObatRacikTemplateResep.reset();
  //$("#templateresep_nmaracikan").trigger('focus');
  document.getElementById("templateresep_nmaracikan").value   = '';
  document.getElementById("templateresep_bnykracikan").value  = '';
  document.getElementById("templateresep_signaracikan").value = '';
  document.getElementById("templateresep_ketracikan").value   = '';
  enabledObatJenisRacik();
}

function kosongObatRacik(){
  kd_produkObatRacikTemplateResep.reset();
  document.getElementById("templateresep_obat_racik_nmaobat").value = '';
  document.getElementById("templateresep_obat_racik_dosis").value   = '';
  document.getElementById("templateresep_obat_racik_qty").value     = '';
  document.getElementById("templateresep_obat_racik_ket").value     = '';
  $("#templateresep_obat_racik_nmaobat").trigger('focus');
}

function disabledObatJenisRacik_TemplateResep(){
  document.getElementById("templateresep_nmaracikan").disabled      = true;
  document.getElementById("templateresep_bnykracikan").disabled     = true;
  document.getElementById("templateresep_signaracikan").disabled    = true;
  document.getElementById("templateresep_ketracikan").disabled      = true;
}

function enabledObatJenisRacik(){
  document.getElementById("templateresep_nmaracikan").disabled      = false;
  document.getElementById("templateresep_bnykracikan").disabled     = false;
  document.getElementById("templateresep_signaracikan").disabled    = false;
  document.getElementById("templateresep_ketracikan").disabled      = false;
  //$("#templateresep_nmaracikan").trigger('focus');
}

function kosongObatJenisRacik(){
  //document.getElementById("templateresep_nmaracikan").disabled  = false;
  document.getElementById("templateresep_nmaracikan").value     = '';
  document.getElementById("templateresep_bnykracikan").value    = '';
  document.getElementById("templateresep_signaracikan").value   = '';
  document.getElementById("templateresep_ketracikan").value     = '';
}

function templateresep_mulaiawalRacikan(){
  $("#templateresep_nmaracikan").trigger('focus');
  kd_JenisRacikanTemplateResep.reset();
  kd_signaObatRacikTemplateResep.reset();
  kosongJenisRacikan();
  $('#templatereseptable_obatracik tbody').html('');
  $('#templateresep_inputan_obat_racik2').hide();
}

function tampilkan_isi_obatjdi_templateresep(kd_obat, nm_obat, qty, id_signa, signa, ket){
  //$('#templatereseptable_obatjadi tbody').html('');
  var nomor = $('#templatereseptable_obatjadi tbody tr').length + 1;  
  var Baris = '';
      Baris += "<tr>";
      //Baris += '<td>'+nomor+'</td>';
      Baris += "<td class='pl-0'>";
      Baris += "<input style='text-align:center;' type='text' class='form-control form-control-xs' name='templateresep_obtjadiurut[]' value='" + nomor + "' disabled>";
      Baris += "</td>";
      Baris += "<td style='display: flex;'><button type='button' class='btn btn-xs btn-danger' onclick='hapusbaris_obatjadi(this, "+nomor+")' id='hapusbaris_obatjadi" + nomor + "' style='width:100%'><i class='fa fa-times'></i></button><button type='button' class='btn btn-xs btn-outline-warning' onclick='editbaris_obatjadi(this, "+nomor+")' id='editbaris_obatjadi" + nomor + "' style='width:100%'><i class='fa fa-edit'></i></button></td>";
      Baris += "<td>";
      Baris += "<input type='text' class='form-control form-control-xs' name='templateresep_obtjadikd_obat[]' value='" + kd_obat + "' disabled>";
      Baris += "</td>";
      Baris += "<td>";
      Baris += "<input type='text' class='form-control form-control-xs' name='templateresep_obtjadinm_obat[]' value='" + nm_obat + "' disabled>";
      Baris += "</td>";
      Baris += "<td>";
      Baris += "<input type='text' class='form-control form-control-xs' name='templateresep_obtjadiqty[]' value='" + qty + "' disabled>";
      Baris += "</td>";
      Baris += "<td>";
      Baris += "<input type='text' class='form-control form-control-xs' name='templateresep_obtjadisigna[]' value='" + signa + "' disabled>";
      Baris += "</td>";
      Baris += "<td>";
      Baris += "<input type='text' class='form-control form-control-xs' name='templateresep_obtjadiket[]' value='" + ket + "' disabled>";
      Baris += "</td>";
      Baris += "<td style='display:none;'>";
      Baris += "<input type='text' class='form-control form-control-xs' name='templateresep_obtjadiidsigna[]' value='" + id_signa + "'>";
      Baris += "</td>";
      Baris += "</tr>";

  var getkd_obat = document.getElementsByName('templateresep_obtjadikd_obat[]');
  //var hrgaobat  = document.getElementsByName('templateresep_obtjadiqty[]');
  var jmlObat   = $('#templatereseptable_obatjadi tbody tr').length;
  let total     = 0;
  const data    = [];

  for(var i = 0, iLen = jmlObat ; i < iLen; i++){
    //PROSES ARRAY PENGECEKAN KODE OBAT
    var datax = {};
    datax.kd_obat = getkd_obat[i].value;
    data.push(datax);
  }
  
  const cekkd_obat = data.map(el => el.kd_obat); // returns ['00007414', '00000019', '00000017']
  const status_kd_obatk = cekkd_obat.includes(kd_obat); // returns true
  //console.log(status_kd_obatk);

  if (status_kd_obatk == false){
    $('#templatereseptable_obatjadi tbody').append(Baris);
    //PROSES PENJUMLAHAN HARGA OBAT
    // for(var i = 0, iLen = jmlObat ; i < iLen; i++){     
    //   total+=Number(hrgaobat[i].value);
    //   document.getElementById("templateresep_grandtotal").value = total;
    document.getElementById("vtemplateresep_grandtotal").innerHTML = format_ribuan(total);
    // }
    var totalx = document.getElementById("templateresep_grandtotal").value;
    total = parseInt(totalx) + parseInt(qty);
    document.getElementById("templateresep_grandtotal").value = total;
    document.getElementById("vtemplateresep_grandtotal").innerHTML = format_ribuan(total);

  }else{
    var urut = document.getElementById("templateresep_obatjadi_urut").value;
    if (urut != ''){
      $('#templatereseptable_obatjadi tbody').append(Baris);
      var totalx = document.getElementById("templateresep_grandtotal").value;
      total = parseInt(totalx) + parseInt(qty);
      document.getElementById("templateresep_grandtotal").value = total;
      document.getElementById("vtemplateresep_grandtotal").innerHTML = format_ribuan(total);
      
      var hapusrow = document.getElementById("hapusbaris_obatjadi"+urut); 
      hapusrow.click();
      //hapusbaris_obatjadi(this, urut)
      //document.getElementById("templatereseptable_obatjadi").deleteRow(urut);  
    }else{
      toastr.error("Obat Sudah Diinputkan!!");  
    }
    
  }
}

function editbaris_obatjadi(btn, nomor){
  
  var kd_obat  = document.getElementById("templatereseptable_obatjadi").rows[nomor].cells[2].firstChild.value;
  var nm_obat = document.getElementById("templatereseptable_obatjadi").rows[nomor].cells[3].firstChild.value;
  var qty     = document.getElementById("templatereseptable_obatjadi").rows[nomor].cells[4].firstChild.value;
  var signa   = document.getElementById("templatereseptable_obatjadi").rows[nomor].cells[5].firstChild.value;
  var ket     = document.getElementById("templatereseptable_obatjadi").rows[nomor].cells[6].firstChild.value;
  
  //kd_produkObatJadiTemplateResep.reset();
  //kd_produkObatJadiTemplateResep = kd_obat;
  $("#templateresep_obatjadi_qty").trigger('focus');

  kd_produkObatJadiTemplateResep.setValue(nm_obat);
  kd_signaObatJadiTemplateResep.setValue(signa);
  document.getElementById("templateresep_obatjadi_urut").value  = nomor;
  document.getElementById("templateresep_obatjadi_nm").disabled = true;
  //document.getElementById("templateresep_obatjadi_nm").value    = nm_obat;
  document.getElementById("templateresep_obatjadi_qty").value   = qty;
  //document.getElementById("templateresep_obatjadi_signa").value = signa;
  document.getElementById("templateresep_obatjadi_ket").value   = ket;
}

function hapusbaris_obatjadi(btn, nomor){
  document.getElementById("templateresep_obatjadi_urut").value = '';
  var row = btn.parentNode.parentNode;
  
  let total   = 0;
  var qty     = document.getElementById("templatereseptable_obatjadi").rows[nomor].cells[4].firstChild.value;
  var totalx  = document.getElementById("templateresep_grandtotal").value;
  total = parseInt(totalx) - parseInt(qty);
  document.getElementById("templateresep_grandtotal").value = total;
  document.getElementById("vtemplateresep_grandtotal").innerHTML = format_ribuan(total);

  row.parentNode.removeChild(row);
  var no = 1;
  $('#templatereseptable_obatjadi tbody tr').each(function(){
    //$(this).find('td:nth-child(1)').html(no);
    $(this).find('td:nth-child(1)').html("<input style='text-align:center;' type='text' class='form-control form-control-xs' name='templateresep_obtjadiurut[]' value='" + no + "' disabled>");
    $(this).find('td:nth-child(2)').html("<button type='button' class='btn btn-xs btn-danger' onclick='hapusbaris_obatjadi(this, "+no+")' id='hapusbaris_obatjadi" + no + "' style='width:100%'><i class='fa fa-times'></i></button><button type='button' class='btn btn-xs btn-outline-warning' onclick='editbaris_obatjadi(this, "+no+")' id='editbaris_obatjadi" + no + "' style='width:100%'><i class='fa fa-edit'></i></button>");
    no++;
  });

}

function tampilkan_isi_obatracik(kd_obat, nm_obat, dosis, qty, ket){
  var nomor = $('#templatereseptable_obatracik tbody tr').length + 1;  
  var Baris = '';
      Baris += '<tr>';
      Baris += "<td class='pl-0'>";
      Baris += "<input style='text-align:center;' type='text' class='form-control form-control-xs' name='templateresep_obtracikurut[]' value='" + nomor + "' disabled>";
      Baris += "</td>";
      Baris += "<td style='display: grid;align-content: space-around;'><button type='button' class='btn btn-xs btn-danger' onclick='hapusbaris_obatracik(this, "+nomor+")' ><i class='fa fa-times'></i></button></td>";
      Baris += "<td>";
      Baris += "<input type='text' class='form-control form-control-xs' name='templateresep_obtracikkd_obat[]' value='" + kd_obat + "' disabled>";
      Baris += "</td>";
      Baris += "<td>";
      Baris += "<input type='text' class='form-control form-control-xs' name='templateresep_obtraciknm_obat[]' value='" + nm_obat + "' disabled>";
      Baris += "</td>";
      Baris += "<td>";
      Baris += "<input type='text' class='form-control form-control-xs' name='templateresep_obtracikdosis[]' value='" + dosis + "' disabled>";
      Baris += "</td>";
      Baris += "<td>";
      Baris += "<input type='text' class='form-control form-control-xs' name='templateresep_obtracikqty[]' value='" + qty + "' disabled>";
      Baris += "</td>";
      Baris += "<td>";
      Baris += "<input type='text' class='form-control form-control-xs' name='templateresep_obtracikket[]' value='" + ket + "' disabled>";
      Baris += "</td>";      
      Baris += "</tr>";

  //$('#templatereseptable_obatracik tbody').append(Baris);
  var getkd_obatx = document.getElementsByName('templateresep_obtracikkd_obat[]');
  
  var jmlObat   = $('#templatereseptable_obatracik tbody tr').length;
  let total     = 0;
  const data    = [];  
  for(var i = 0, iLen = jmlObat ; i < iLen; i++){
    //PROSES ARRAY PENGECEKAN KODE OBAT
    var datax = {};
    datax.kd_obat  = getkd_obatx[i].value;
    data.push(datax);
  }

  const cekkd_obat = data.map(el => el.kd_obat); // returns ['00007414', '00000019', '00000017']
  const status_kd_obatk = cekkd_obat.includes(kd_obat); // returns true
  //console.log(status_kd_obatk);

  if (status_kd_obatk == false){
    $('#templatereseptable_obatracik tbody').append(Baris);
    
    sessionStorage_Racikan();
  }else{
    toastr.error("Obat Sudah Diinputkan!!");
  }  
}

function sessionStorage_Racikan(){
  var getkd_obat = document.getElementsByName('templateresep_obtracikkd_obat[]');
  var getnm_prd = document.getElementsByName('templateresep_obtraciknm_obat[]');
  var getdosis  = document.getElementsByName('templateresep_obtracikdosis[]');
  var getqty    = document.getElementsByName('templateresep_obtracikqty[]');
  var getket    = document.getElementsByName('templateresep_obtracikket[]');
  var geturut   = document.getElementsByName('templateresep_obtracikurut[]');
  var count     = $('#templatereseptable_obatracik tbody tr').length;
  
  const params    = [];  
  
  for(var i = 0, iLen = count ; i < iLen; i++){
    var x = {};
    x.urut    = geturut[i].value;
    x.kd_obat  = getkd_obat[i].value;
    x.nm_prd  = getnm_prd[i].value;
    //x.dosis   = getdosis[i].value;
    
    if (getdosis[i].value !== ''){
      x.dosis   = getdosis[i].value;
    }else{
      x.dosis   = "0";
    }

    x.qty     = getqty[i].value;
    x.ket     = getket[i].value
    
    params.push(x);
  }
  
  if (nama_racikan != '' || nama_racikan != null){
    sessionStorage[nama_racikan] = JSON.stringify(params);
  }else{

  }
}

function hapusbaris_obatracik(btn, nomor){
  var row = btn.parentNode.parentNode;
  
  let total   = 0;
  var qty     = document.getElementById("templatereseptable_obatracik").rows[nomor].cells[5].firstChild.value;
  var totalx  = document.getElementById("templateresep_grandtotal").value;
  total = parseInt(totalx) - parseInt(qty);
  document.getElementById("templateresep_grandtotal").value = total;
  document.getElementById("vtemplateresep_grandtotal").innerHTML = format_ribuan(total);

  row.parentNode.removeChild(row);
  sessionStorage_Racikan();
  var no = 1;
  $('#templatereseptable_obatracik tbody tr').each(function(){
    $(this).find('td:nth-child(1)').html("<input style='text-align:center;' type='text' class='form-control form-control-xs' name='templateresep_obtracikurut[]' value='" + no + "' disabled>");
    $(this).find('td:nth-child(2)').html("<button type='button' class='btn btn-xs btn-danger' onclick='hapusbaris_obatracik(this, "+no+")' ><i class='fa fa-times'></i></button>");
    no++;
  });
}

function tampilkan_isi_obatracik_jenisracikan_templateresep(nma_racikan, byk_racikan, id_sig_rac, sig_racikan, ket_racikan){  
  
  var Nomor = $('#templatereseptable_obatracik_jenisracikan tbody tr').length + 1;
  /*
    !important PuooolllLLL Simple tapi Bermanfaat
    PROSES PERULANGAN PENGECEKAN JENIS RACIKAN
  */
  for(var i = 1, iLen = 11 ; i < iLen; i++){ 
    var a = sessionStorage.getItem(nma_racikan+i);
    if (a == null){
      var x = nma_racikan+i;
      break;
    }else{
      let xx = Nomor + 1;
      var x = nma_racikan+''+xx;
    }
  }
  nama_racikan = x;

  var Baris = "<tr>";
     Baris += "<td>"+Nomor+"</td>";
     Baris += '<td style="display: flex; justify-content: left;"><button type="button" class="btn btn-xs btn-warning" title="Tampilkan '+ nama_racikan+'" onclick="tampilkan_jenisracik_templateresep('+"'"+Nomor+"','"+nma_racikan+"','"+byk_racikan+"','"+sig_racikan+"','"+ket_racikan+"','"+x+"'"+')"><i class="fa fa-arrow-up"></i></button>&nbsp;<button type="button" class="btn btn-xs btn-danger" onclick="hapus_jenisracik_templateresep(this, '+"'"+Nomor+"','"+nma_racikan+"','"+byk_racikan+"','"+sig_racikan+"','"+ket_racikan+"','"+nama_racikan+"'"+')"><i class="fa fa-times"></i></button></td>';
     Baris += "<td hidden>"+Nomor+"</td>";
     Baris += "<td>";
     Baris += "<input type='text' class='form-control form-control-xs' name='templateresep_nma_jenisracikan[]' value='" + nama_racikan +"' disabled>";
     Baris += "</td>";
     Baris += "<td hidden><input type='text' class='form-control form-control-xs' name='templateresep_nma_byk_racikan[]' value='" + byk_racikan +"' disabled></td>";
     Baris += "<td hidden><input type='text' class='form-control form-control-xs' name='templateresep_nma_idsig_racikan[]' value='" + id_sig_rac +"' disabled></td>";
     Baris += "<td hidden><input type='text' class='form-control form-control-xs' name='templateresep_nma_sig_racikan[]' value='" + sig_racikan +"' disabled></td>";
     Baris += "<td hidden><input type='text' class='form-control form-control-xs' name='templateresep_nma_ket_racikan[]' value='" + ket_racikan +"' disabled></td>";
     Baris += "</tr>";
  
  $('#templatereseptable_obatracik_jenisracikan tbody').append(Baris);
  $('#templateresep_infojenis_racikan').html('<i class="fa fa-check"></i> '+nama_racikan);

  sessionStorage[nama_racikan] = '[{"urut":"1","kd_obat":"kosong","nm_prd":"","dosis":"","qty":"","ket":""}]';
  sessionStorage['RACIK_'+nama_racikan] = '[{"racikan":"'+nama_racikan+'","qty":"'+byk_racikan+'","idsigna":"'+id_sig_rac+'","signa":"'+sig_racikan+'","ket":"'+ket_racikan+'"}]';
}

function tampilkan_jenisracik_templateresep(Nomor, nma_racikan, byk_racikan, sig_racikan, ket_racikan, x){
  nama_racikan = x;
  document.getElementById("templateresep_nmaracikan").value   = nma_racikan;
  document.getElementById("templateresep_bnykracikan").value  = byk_racikan;
  document.getElementById("templateresep_signaracikan").value = sig_racikan;
  document.getElementById("templateresep_ketracikan").value   = ket_racikan;

  $('#templateresep_infojenis_racikan').html('<i class="fa fa-check"></i> '+nama_racikan);  
  $('#templateresep_inputan_obat_racik2').show();
  $("#templateresep_obat_racik_nmaobat").trigger('focus');
  disabledObatJenisRacik_TemplateResep();
  //kosongObatRacik();
  //console.log(sessionStorage.getItem(nama_racikan));
  var storedArray_ObatRacik = JSON.parse(sessionStorage.getItem(nama_racikan));
  //console.log(storedArray_ObatRacik);
  
  $('#templatereseptable_obatracik tbody').html('');
  
  var i;
  for (i = 0; i < storedArray_ObatRacik.length; i++) {
    var kd_obat  = storedArray_ObatRacik[i].kd_obat;
    if (kd_obat != 'kosong'){
      var nm_obat = storedArray_ObatRacik[i].nm_prd;
      var dosis   = storedArray_ObatRacik[i].dosis;
      var qty     = storedArray_ObatRacik[i].qty;
      var ket     = storedArray_ObatRacik[i].ket;
      tampilkan_isi_obatracik(kd_obat, nm_obat, dosis, qty, ket);
    }
    //console.log(kd_obat, nm_obat, dosis, qty, ket);
  }
  
}

function hapus_jenisracik_templateresep(btn, Nomor, nma_racikan, byk_racikan, sig_racikan, ket_racikan, nama_racikan){
  var session_nama_racikan = nama_racikan;

  var row = btn.parentNode.parentNode;
  row.parentNode.removeChild(row);
  
  //PROSES GET TOTAL QTY OBAT RACIK
  // CARA 2 => let count     =  Object.keys(JSON.parse(sessionStorage.getItem(session_nama_racikan))).length;
  let count     = JSON.parse(sessionStorage.getItem(session_nama_racikan));
  let xtotal    = 0;
  var i;
  for (i = 0; i < count.length; i++) {
    var kd_obat  = count[i].kd_obat;
    if (kd_obat != 'kosong'){
      let hrgaobat     = count[i].qty;
      xtotal += Number(hrgaobat);
    }
  }
  
  var totalx = document.getElementById("templateresep_grandtotal").value;
  total = parseInt(totalx) - parseInt(xtotal);
  document.getElementById("templateresep_grandtotal").value = total;
  document.getElementById("vtemplateresep_grandtotal").innerHTML = format_ribuan(total);

  var no = 1;
  $('#templatereseptable_obatracik_jenisracikan tbody tr').each(function(){
    $(this).find('td:nth-child(1)').html(no);
    no++;
  });

  sessionStorage.removeItem(session_nama_racikan);
  sessionStorage.removeItem('RACIK_'+session_nama_racikan);
  $('#templatereseptable_obatracik tbody').html('');
  tabrwj_resep_obatracik();
  enabledObatJenisRacik();
  $("#templateresep_nmaracikan").trigger('focus');
}

function tabrwj_resep_obatjadi(){
  $('#templateresep_inputan_obat_jadi').show();
  $('#templateresep_inputan_obat_racik').hide();
  $('#templateresep_inputan_obat_racik1').hide(); 
  $('#templateresep_inputan_obat_racik2').hide(); 
  $('#templateresep_penentu_resepobat').val(0);
  $("#templateresep_obatjadi_nm").trigger('focus');
  $('#templateresep_infojenis_racikan').html('-');
}

function tabrwj_resep_obatracik(){
  $('#templateresep_inputan_obat_jadi').hide();
  $('#templateresep_inputan_obat_racik').show(); 
  $('#templateresep_inputan_obat_racik1').show(); 
  $('#templateresep_inputan_obat_racik2').hide(); 
  $('#templateresep_penentu_resepobat').val(1);  
  kosongObatJenisRacik();
  //$("#templateresep_nmaracikan").trigger('focus');
}

function keluarmodal_templateresep() {
  $('.templateresep').hide();
  $('#setuptemplateresep').show();
  $('#setuptemplateresep_kedua').show();
  setuptemplateresep_showdata();
}

function templateresep_kembalikeawal(){
  var id = document.getElementById("templateresep_idtemplate").value;
  if (id == ''){    
    pertanyaan.fire({
      title             : 'Kembali ke menu awal',
      html              : '<span>Data Input Belum diSimpan, Data yang sudah dientry akan hilang, tetap kembali ?</span>',
      icon              : 'question',
      showCancelButton  : true,
      reverseButtons    : false,
      allowOutsideClick : false
    }).then((result) => {
      if (result.isConfirmed) {
        keluarmodal_templateresep();
      }else if(result.dismiss === Swal.DismissReason.cancel){
        
      }
    })
  }else{
    keluarmodal_templateresep();
  }
}

function templateresep_hpustemplate(){
  var idtemplate = document.getElementById("templateresep_idtemplate").value;
  if (idtemplate != ''){
    pertanyaan.fire({
      title             : 'Hapus Template Resep ?',
      html              : '<span>Yakin dihapus ?</span>',
      icon              : 'question',
      showCancelButton  : true,
      reverseButtons    : false,
      allowOutsideClick : false
    }).then((result) => {
      if (result.isConfirmed) {
        var param = {
          idtemplate    : idtemplate,
          tgltemplate   : document.getElementById("templateresep_tgltemplate").value,
          user          : user['id_user'],
          id_peg        : user['id_pegawai'],
        };

        apiPOST('Apotek/HapusTemplateResep', param, hasil => {
          if (hasil !== null) {
            sessionStorage.clear();
            var penentu = $('#templateresep_penentu_resepobat').val(1);  

            if(penentu != 0){ // OBAT RACIK
              tabrwj_resep_obatracik();
              enabledObatJenisRacik();
            }else{
              tabrwj_resep_obatjadi();
            }
            
            $('#templatereseptable_obatjadi tbody').html('');
            $('#templatereseptable_obatracik_jenisracikan tbody').html('');
            $('#templatereseptable_obatracik tbody').html('');
            document.getElementById("templateresep_idtemplate").value       = '';
            document.getElementById("templateresep_catatandokter").value    = '';
            document.getElementById("templateresep_grandtotal").value       = '0';
            document.getElementById("vtemplateresep_grandtotal").innerHTML  = '0';
            templateresep_kembalikeawal();
          }
        });
      }else if(result.dismiss === Swal.DismissReason.cancel){
        
      }
    })
  }
}

function params_SimpanObatJadiTemplateResep(){  
  var getkd_obat = document.getElementsByName('templateresep_obtjadikd_obat[]');
  var getnm_prd = document.getElementsByName('templateresep_obtjadinm_obat[]');
  var getqty    = document.getElementsByName('templateresep_obtjadiqty[]');
  var getidsig  = document.getElementsByName('templateresep_obtjadiidsigna[]');
  var getsigna  = document.getElementsByName('templateresep_obtjadisigna[]');
  var getket    = document.getElementsByName('templateresep_obtjadiket[]');
  var geturut   = document.getElementsByName('templateresep_obtjadiurut[]');
  var count     = $('#templatereseptable_obatjadi tbody tr').length;
  
  var params = {};  
  params.data     = [];
  for(var i = 0, iLen = count ; i < iLen; i++){
    var x = {};
    x.kd_obat  = getkd_obat[i].value;
    x.nm_prd  = getnm_prd[i].value;
    x.qty     = getqty[i].value;
    x.signa   = getidsig[i].value;
    x.ket     = getket[i].value;
    if (typeof(geturut[i].value) !== 'undefined') {
      x.urut  = geturut[i].value;
    }else{
      x.urut  = "";
    }

    params.data.push(x);
  }
  console.log(params.data);
  return params.data;
}

function params_SimpanObatRacikTemplateResep(){

  var getNma      = document.getElementsByName('templateresep_nma_jenisracikan[]');
  var getBnyk     = document.getElementsByName('templateresep_nma_byk_racikan[]');
  var getIdSigna  = document.getElementsByName('templateresep_nma_idsig_racikan[]');
  var getSigna    = document.getElementsByName('templateresep_nma_sig_racikan[]');
  var getKet      = document.getElementsByName('templateresep_nma_ket_racikan[]');
  var count       = $('#templatereseptable_obatracik_jenisracikan tbody tr').length;
  
  // const params    = [];  
  var params = {};  
  params.data     = [];
  for(var i = 0, iLen = count ; i < iLen; i++){
    var x = {};
    x.Nama  = getNma[i].value;
    x.Bnyk  = getBnyk[i].value;
    x.Signa = getIdSigna[i].value;
    x.Ket   = getKet[i].value;
    
    x.obat  = JSON.parse(sessionStorage.getItem(x.Nama));
    x.count = x.obat.length;

    params.data.push(x);
  }
  // console.log(params.data);
  return params.data;
}

function templateresep_simpantemplate(){
  $('#loading_modal_templateresep').show();
  var jnsresep = document.getElementById('templateresep_jenisresep').value;
  var iddokter = document.getElementById('templateresep_dokter').value;

  if (jnsresep == ''){
    toastr.warning("Jenis Resep Belum ditentukan!!");
    $('#templateresep_jenisresep').trigger('focus');
    $('#loading_modal_templateresep').hide();
    return;
  }

  if (iddokter == '0'){
    toastr.warning("Dokter Belum ditentukan!!");
    $('#templateresep_dokter').trigger('focus');
    $('#loading_modal_templateresep').hide();
    return;
  }

  var param = {
    idtemplate    : document.getElementById('templateresep_idtemplate').value,
    tgltemplate   : document.getElementById('templateresep_tgltemplate').value,
    iddokter      : iddokter,
    catatan       : document.getElementById("templateresep_catatandokter").value,
    jnsresep      : jnsresep,
    user          : user['id_user'],
    data          : params_SimpanObatJadiTemplateResep(),
    jmlObat       : $('#templatereseptable_obatjadi tbody tr').length,
    data_racik    : params_SimpanObatRacikTemplateResep(),
    jmlObatRacik  : $('#templatereseptable_obatracik_jenisracikan tbody tr').length,
  };

  apiPOST('Apotek/SimpanTemplateResep', param, hasil => {
    if (hasil !== null) {
      document.getElementById("templateresep_idtemplate").value = hasil['x'];
      $('#loading_modal_templateresep').hide();
    }else{
      $('#loading_modal_templateresep').hide();
    }
  });
}

function templateresep_preview_detailObat(){  
  var jnsresep = document.getElementById('templateresep_jenisresep').value;
  if (jnsresep == ''){
    toastr.warning("Jenis Resep Belum ditentukan!!");
    $('#templateresep_jenisresep').trigger('focus');
    var textjnsresep = '---';
    return;
  }else{
    if (jnsresep == '1'){
      var textjnsresep = 'Resep PRB (Program Rujuk Balik)';
    }else if (jnsresep == '2'){
      var textjnsresep = 'Resep Kronis';
    }else if (jnsresep == '3'){
      var textjnsresep = 'Resep Kemoterapi';
    } 
  }

  var json_data = {
    'idtemplate' : document.getElementById('templateresep_idtemplate').value,
    'tgltemplate': document.getElementById('templateresep_tgltemplate').value,
    'iddokter'   : document.getElementById('templateresep_dokter').value,
    'jnsresep'   : textjnsresep.replace(/ /g, '%20'),
    'catdokter'  : document.getElementById('templateresep_catatandokter').value.replace(/ /g, '%20'),
    'status'     : ''
  };

  var myJSON = JSON.stringify(json_data);
  $('.templateresep_prevobat').load('Apotek/templateresep_preview_detailObat?data='+ myJSON);
  
}

function templateresep_preview_detailObat2(){  
  var jnsresep = document.getElementById('templateresep_jenisresep').value;
  if (jnsresep == ''){
    toastr.warning("Jenis Resep Belum ditentukan!!");
    $('#templateresep_jenisresep').trigger('focus');
    var textjnsresep = '---';
    return;
  }else{
    if (jnsresep == '1'){
      var textjnsresep = 'Resep PRB (Program Rujuk Balik)';
    }else if (jnsresep == '2'){
      var textjnsresep = 'Resep Kronis';
    }else if (jnsresep == '3'){
      var textjnsresep = 'Resep Kemoterapi';
    } 
  }

  var json_data = {
    'idtemplate' : document.getElementById('templateresep_idtemplate').value,
    'tgltemplate': document.getElementById('templateresep_tgltemplate').value,
    'iddokter'   : document.getElementById('templateresep_dokter').value,
    'jnsresep'   : textjnsresep.replace(/ /g, '%20'),
    'catdokter'  : document.getElementById('templateresep_catatandokter').value.replace(/ /g, '%20'),
    'status'     : 'block'
  };

  var myJSON = JSON.stringify(json_data);
  $('.templateresep_prevobat').load('Apotek/templateresep_preview_detailObat?data='+ myJSON);
  
}

</script>