<?php
  $data = json_decode($_GET['data']);
  $nm_modul     = str_replace('"','', json_encode($data->nm_modul));
  $id_kunj      = str_replace('"','', json_encode($data->id_kunj));
  $tgl_kunj     = str_replace('"','', json_encode($data->tgl_kunj));
  $tgl_resep    = str_replace('"','', json_encode($data->tgl_resep));
  //$tgl_resepx      = date_format(date_create($tgl_resep), 'd-M-Y'); //FORMAT TGL 02-Feb-2023
  $no_rm        = str_replace('"','', json_encode($data->no_rm));
  $idunit       = str_replace('"','', json_encode($data->idunit));
  $noresep      = str_replace('"','', json_encode($data->noresep));  
?>

<div class="modal fade" id="telaah_resep" style="background-color: #000000b8;">
  <div class="modal-dialog modal-md" > <!-- style="max-width: 714px;" -->
    <div class="modal-content">
      <div class="overlay-wrapper" id="loading_telaah_resep">
        <div class="overlay dark">
          <i class="fas fa-3x fa-sync-alt fa-spin"></i>            
        </div>
      </div>
      <div class="modal-body p-1">
        <h5 align="center">Telaah Resep</h5>
    <!-- <div class="row p-1"> -->
        <div class="col-md-12 p-1">
          
            <table class="table table-sm p-1" border="0" cellpadding="0" cellspacing="0" style="background-color: transparent; font-weight: 700;" >
              <tr>
                <td width="150">P1 = Penerima</td>
                <td>:</td>
                <td><select class="form-control form-control-xs" id="TelaahResepRJIGDRI_penerima" name="TelaahResepRJIGDRI_penerima"></select></td>
              </tr>
              <tr>
                <td>P2 = Penyiapan</td>
                <td>:</td>
                <td><select class="form-control form-control-xs" id="TelaahResepRJIGDRI_penyiapan" name="TelaahResepRJIGDRI_penyiapan"></select></td>              
              </tr>
              <tr>
                <td>P3 = Peracik</td>
                <td>:</td>
                <td><select class="form-control form-control-xs" id="TelaahResepRJIGDRI_peracik" name="TelaahResepRJIGDRI_peracik"></select></td>              
              </tr>
              <tr>
                <td>P4 = Pengesahan, Penyerahan</td>
                <td>:</td>
                <td><select class="form-control form-control-xs" id="TelaahResepRJIGDRI_pengesahan" name="TelaahResepRJIGDRI_pengesahan"></select></td>              
              </tr>
              <tr>
                <td>** Konsultasi</td>
                <td>:</td>
                <td height="60"><textarea class="form-control pt-0 pl-1" id="TelaahResepRJIGDRI_konsul" rows="3" style="height:80px;"></textarea></td>
              </tr>
              <tr>
                <td colspan="3" style="color: red;">** Bila diperlukan</td>
              </tr>
            </table>
            <hr>
            <table class="table table-sm p-1" border="0" cellpadding="0" cellspacing="0" style="background-color: transparent; font-weight: 700;">
              <tr>
                <td width="10">1.</td>
                <td width="150">Kejelasan Tulisan Resep</td>
                <td width="10">:</td>
                <td>
                  <select class="form-control form-control-xs" id="TelaahResepRJIGDRI_kejelasan" name="TelaahResepRJIGDRI_kejelasan">
                    <option value="f">Tidak</option>
                    <option value="t">Ya</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td></td>
                <td>Keterangan Tindak Lanjut</td>
                <td>:</td>
                <td><textarea class="form-control pt-0 pl-1" id="TelaahResepRJIGDRI_kejelasanket"></textarea></td>
              </tr>
              <tr>
                <td>2.</td>
                <td>Tepat Obat</td>
                <td>:</td>
                <td>
                  <select class="form-control form-control-xs" id="TelaahResepRJIGDRI_ketepatanobat" name="TelaahResepRJIGDRI_ketepatanobat">
                    <option value="f">Tidak</option>
                    <option value="t">Ya</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td></td>
                <td>Keterangan Tindak Lanjut</td>
                <td>:</td>
                <td><textarea class="form-control pt-0 pl-1" id="TelaahResepRJIGDRI_ketepatanobatket"></textarea></td>
              </tr>
              <tr>
                <td>3.</td>
                <td>Tepat Dosis</td>
                <td>:</td>
                <td>
                  <select class="form-control form-control-xs" id="TelaahResepRJIGDRI_ketepatandosis" name="TelaahResepRJIGDRI_ketepatandosis">
                    <option value="f">Tidak</option>
                    <option value="t">Ya</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td></td>
                <td>Keterangan Tindak Lanjut</td>
                <td>:</td>
                <td><textarea class="form-control pt-0 pl-1" id="TelaahResepRJIGDRI_ketepatandosisket"></textarea></td>
              </tr>
              <tr>
                <td>4.</td>
                <td>Tepat Rute</td>
                <td>:</td>
                <td>
                  <select class="form-control form-control-xs" id="TelaahResepRJIGDRI_ketepatanrute" name="TelaahResepRJIGDRI_ketepatanrute">
                    <option value="f">Tidak</option>
                    <option value="t">Ya</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td></td>
                <td>Keterangan Tindak Lanjut</td>
                <td>:</td>
                <td><textarea class="form-control pt-0 pl-1" id="TelaahResepRJIGDRI_ketepatanruteket"></textarea></td>
              </tr>
              <tr>
                <td>5.</td>
                <td>Tepat Waktu</td>
                <td>:</td>
                <td>
                  <select class="form-control form-control-xs" id="TelaahResepRJIGDRI_ketepatanwaktu" name="TelaahResepRJIGDRI_ketepatanwaktu">
                    <option value="f">Tidak</option>
                    <option value="t">Ya</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td></td>
                <td>Keterangan Tindak Lanjut</td>
                <td>:</td>
                <td><textarea class="form-control pt-0 pl-1" id="TelaahResepRJIGDRI_ketepatanwaktuket"></textarea></td>
              </tr>
              <tr>
                <td>6.</td>
                <td>Duplikasi</td>
                <td>:</td>
                <td>
                  <select class="form-control form-control-xs" id="TelaahResepRJIGDRI_duplikat" name="TelaahResepRJIGDRI_duplikat">
                    <option value="f">Tidak</option>
                    <option value="t">Ya</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td></td>
                <td>Keterangan Tindak Lanjut</td>
                <td>:</td>
                <td><textarea class="form-control pt-0 pl-1" id="TelaahResepRJIGDRI_duplikatket"></textarea></td>
              </tr>
              <tr>
                <td>7.</td>
                <td>Alergi</td>
                <td>:</td>
                <td>
                  <select class="form-control form-control-xs" id="TelaahResepRJIGDRI_alergi" name="TelaahResepRJIGDRI_alergi">
                    <option value="f">Tidak</option>
                    <option value="t">Ya</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td></td>
                <td>Keterangan Tindak Lanjut</td>
                <td>:</td>
                <td><textarea class="form-control pt-0 pl-1" id="TelaahResepRJIGDRI_alergiket"></textarea></td>
              </tr>
              <tr>
                <td>8.</td>
                <td>Interaksi Obat</td>
                <td>:</td>
                <td>
                  <select class="form-control form-control-xs" id="TelaahResepRJIGDRI_interaksi" name="TelaahResepRJIGDRI_interaksi">
                    <option value="f">Tidak</option>
                    <option value="t">Ya</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td></td>
                <td>Keterangan Tindak Lanjut</td>
                <td>:</td>
                <td><textarea class="form-control pt-0 pl-1" id="TelaahResepRJIGDRI_interaksiket"></textarea></td>
              </tr>
              <tr>
                <td>9.</td>
                <td>Berat Badan (Pasien Anak)</td>
                <td>:</td>
                <td>
                  <select class="form-control form-control-xs" id="TelaahResepRJIGDRI_beratbadananak" name="TelaahResepRJIGDRI_beratbadananak">
                    <option value="f">Tidak</option>
                    <option value="t">Ya</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td></td>
                <td>Keterangan Tindak Lanjut</td>
                <td>:</td>
                <td><textarea class="form-control pt-0 pl-1" id="TelaahResepRJIGDRI_beratbadananakket"></textarea></td>
              </tr>
              <tr>
                <td>10.</td>
                <td>Kontra Indikasi Lain</td>
                <td>:</td>
                <td>
                  <select class="form-control form-control-xs" id="TelaahResepRJIGDRI_kontradiksi" name="TelaahResepRJIGDRI_kontradiksi">
                    <option value="f">Tidak</option>
                    <option value="t">Ya</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td></td>
                <td>Keterangan Tindak Lanjut</td>
                <td>:</td>
                <td><textarea class="form-control pt-0 pl-1" id="TelaahResepRJIGDRI_kontradiksiket"></textarea></td>
              </tr>

              <tr>
                <td colspan="4">Konsul Via Telepon :</td>
              </tr>
              <tr>
                <td colspan="4"><textarea class="form-control pt-0 pl-1" id="TelaahResepRJIGDRI_konsultelp"></textarea></td>
              </tr>
            </table>
          
        </div>
    <!-- </div> -->

      </div>
      <div class="modal-footer justify-content-between p-1">
        <button type="button" class="btn btn-outline-danger btn-sm" onclick="telaah_resep_close();"><i class="fa fa-reply"></i> Kembali</button>
        <button type="button" class="btn btn-outline-success btn-sm" onclick="telaah_resep_save();"><i class="fa fa-save"></i> Simpan Telaah</button>
      </div>
    </div>    
  </div>
  <!-- /.modal-dialog -->
</div>

<script type="text/javascript">
var nm_modul  = "<?php echo $nm_modul; ?>";
var id_kunj   = "<?php echo $id_kunj; ?>";
var noresep   = "<?php echo $noresep; ?>";
var tgl_resep = "<?php echo $tgl_resep; ?>";

$(document).ready(function() {
  $("#telaah_resep").modal({backdrop: "static"});
  $('#telaah_resep').on('shown.bs.modal', function () {
    load_user_pegawai();
    getdataTelaahResep();
  });
});

function getdataTelaahResep(){
  document.getElementById("loading_telaah_resep").style.display = "block";
  
  var param = {
    id_kunjungan_far  : id_kunj,
    noresep           : noresep,
    tglresep          : tgl_resep,
  };

  if ((noresep == '')&&(id_kunjungan_far == '')){
    toastr.warning('Resep Belum diSimpan');
    telaah_resep_close();
  }else{
    apiPOST("Apotek/getdataTelaahResep", param, hasil => {
      document.getElementById("loading_telaah_resep").style.display = "none";

      if (hasil !== null) {
        if (hasil['code'] == 200){
          var Data        = hasil['result'];
          document.getElementById(nm_modul).value = "1";

          document.getElementById('TelaahResepRJIGDRI_penerima').value    = Data[0].penerima;
          document.getElementById('TelaahResepRJIGDRI_penyiapan').value   = Data[0].penyiapan;
          document.getElementById('TelaahResepRJIGDRI_peracik').value     = Data[0].peracik;
          document.getElementById('TelaahResepRJIGDRI_pengesahan').value  = Data[0].pengesahan;
          document.getElementById('TelaahResepRJIGDRI_konsul').value      = Data[0].konsul;

          document.getElementById('TelaahResepRJIGDRI_kejelasan').value         = Data[0].kejelasan;
          document.getElementById('TelaahResepRJIGDRI_kejelasanket').value      = Data[0].kejelasanket;
          document.getElementById('TelaahResepRJIGDRI_ketepatanobat').value     = Data[0].ketepatanobat;
          document.getElementById('TelaahResepRJIGDRI_ketepatanobatket').value  = Data[0].ketepatanobatket;
          document.getElementById('TelaahResepRJIGDRI_ketepatandosis').value    = Data[0].ketepatandosis;
          document.getElementById('TelaahResepRJIGDRI_ketepatandosisket').value = Data[0].ketepatandosisket;
          document.getElementById('TelaahResepRJIGDRI_ketepatanrute').value     = Data[0].ketepatanrute;
          document.getElementById('TelaahResepRJIGDRI_ketepatanruteket').value  = Data[0].ketepatanruteket;
          document.getElementById('TelaahResepRJIGDRI_ketepatanwaktu').value    = Data[0].ketepatanwaktu;
          document.getElementById('TelaahResepRJIGDRI_ketepatanwaktuket').value = Data[0].ketepatanwaktuket;
          document.getElementById('TelaahResepRJIGDRI_duplikat').value          = Data[0].duplikat;
          document.getElementById('TelaahResepRJIGDRI_duplikatket').value       = Data[0].duplikatket;
          document.getElementById('TelaahResepRJIGDRI_alergi').value            = Data[0].alergi;
          document.getElementById('TelaahResepRJIGDRI_alergiket').value         = Data[0].alergiket;
          document.getElementById('TelaahResepRJIGDRI_interaksi').value         = Data[0].interaksi;
          document.getElementById('TelaahResepRJIGDRI_interaksiket').value      = Data[0].interaksiket;
          document.getElementById('TelaahResepRJIGDRI_beratbadananak').value    = Data[0].beratbadananak;
          document.getElementById('TelaahResepRJIGDRI_beratbadananakket').value = Data[0].beratbadananakket;
          document.getElementById('TelaahResepRJIGDRI_kontradiksi').value       = Data[0].kontradiksi;
          document.getElementById('TelaahResepRJIGDRI_kontradiksiket').value    = Data[0].kontradiksiket;
          document.getElementById('TelaahResepRJIGDRI_konsultelp').value        = Data[0].konsultelp;

        }else{
          toastr.info('Resep Belum di Telaah!!');
          document.getElementById(nm_modul).value = "0";
        }
      }
    });
  }
}

function load_user_pegawai(){

  apiPOST('Setup/getUserPegawai', null, hasil => {
    $('#loading_telaah_resep').hide();
    var data = hasil['data'];
    if(hasil !== null){
        data = hasil['data'];
        var penerima    = document.getElementById('TelaahResepRJIGDRI_penerima');
        var penyiapan   = document.getElementById('TelaahResepRJIGDRI_penyiapan');
        var peracik     = document.getElementById('TelaahResepRJIGDRI_peracik');
        var pengesahan  = document.getElementById('TelaahResepRJIGDRI_pengesahan');
        data.forEach(baru => {
            var option = document.createElement('option');
            option.value = baru['id_pegawai'];
            option.innerHTML = baru['nama_pegawai'];
            penerima.appendChild(option);
        });
        data.forEach(baru => {
            var option = document.createElement('option');
            option.value = baru['id_pegawai'];
            option.innerHTML = baru['nama_pegawai'];
            penyiapan.appendChild(option);
        });
        data.forEach(baru => {
            var option = document.createElement('option');
            option.value = baru['id_pegawai'];
            option.innerHTML = baru['nama_pegawai'];
            peracik.appendChild(option);
        });
        data.forEach(baru => {
            var option = document.createElement('option');
            option.value = baru['id_pegawai'];
            option.innerHTML = baru['nama_pegawai'];
            pengesahan.appendChild(option);
        });
    }
  });

}

function telaah_resep_save() {

  document.getElementById("loading_telaah_resep").style.display = "block";
  var param = {
    id_kunjungan_far  : id_kunj,
    noresep           : noresep,
    penerima          : document.getElementById('TelaahResepRJIGDRI_penerima').value,
    penyiapan         : document.getElementById('TelaahResepRJIGDRI_penyiapan').value,
    peracik           : document.getElementById('TelaahResepRJIGDRI_peracik').value,
    pengesahan        : document.getElementById('TelaahResepRJIGDRI_pengesahan').value,
    konsul            : document.getElementById('TelaahResepRJIGDRI_konsul').value,
    kejelasan         : document.getElementById('TelaahResepRJIGDRI_kejelasan').value,
    kejelasanket      : document.getElementById('TelaahResepRJIGDRI_kejelasanket').value,
    ketepatanobat     : document.getElementById('TelaahResepRJIGDRI_ketepatanobat').value,
    ketepatanobatket  : document.getElementById('TelaahResepRJIGDRI_ketepatanobatket').value,
    ketepatandosis    : document.getElementById('TelaahResepRJIGDRI_ketepatandosis').value,
    ketepatandosisket : document.getElementById('TelaahResepRJIGDRI_ketepatandosisket').value,
    ketepatanrute     : document.getElementById('TelaahResepRJIGDRI_ketepatanrute').value,
    ketepatanruteket  : document.getElementById('TelaahResepRJIGDRI_ketepatanruteket').value,
    ketepatanwaktu    : document.getElementById('TelaahResepRJIGDRI_ketepatanwaktu').value,
    ketepatanwaktuket : document.getElementById('TelaahResepRJIGDRI_ketepatanwaktuket').value,
    duplikat          : document.getElementById('TelaahResepRJIGDRI_duplikat').value,
    duplikatket       : document.getElementById('TelaahResepRJIGDRI_duplikatket').value,
    alergi            : document.getElementById('TelaahResepRJIGDRI_alergi').value,
    alergiket         : document.getElementById('TelaahResepRJIGDRI_alergiket').value,
    interaksi         : document.getElementById('TelaahResepRJIGDRI_interaksi').value,
    interaksiket      : document.getElementById('TelaahResepRJIGDRI_interaksiket').value,
    beratbadananak    : document.getElementById('TelaahResepRJIGDRI_beratbadananak').value,
    beratbadananakket : document.getElementById('TelaahResepRJIGDRI_beratbadananakket').value,
    kontradiksi       : document.getElementById('TelaahResepRJIGDRI_kontradiksi').value,
    kontradiksiket    : document.getElementById('TelaahResepRJIGDRI_kontradiksiket').value,
    konsultelp        : document.getElementById('TelaahResepRJIGDRI_konsultelp').value,
    tglresep          : tgl_resep,
  }

  apiPOST('Apotek/SimpanTelaahResep', param, hasil => {
    document.getElementById("loading_telaah_resep").style.display = "none";
    if (hasil !== null) {
      if (hasil['code'] == 200){
        document.getElementById(nm_modul).value = "1";
      }else{
        document.getElementById(nm_modul).value = "0";
      }
      telaah_resep_close();
    }
  });
}
function telaah_resep_close(){
  $('#telaah_resep').modal('hide');
  $('.modal-backdrop').hide();
}

</script>