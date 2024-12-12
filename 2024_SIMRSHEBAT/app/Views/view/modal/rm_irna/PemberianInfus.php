<?php
$data 						= json_decode($_GET['data']);
$rm 							= str_replace('"','', json_encode($data->rm));
$unit     				= str_replace('"','', json_encode($data->unit));
$id_kunjungan     = str_replace('"','', json_encode($data->id_kunjungan));
$id_transaksi     = str_replace('"','', json_encode($data->id_transaksi));
?>

<div class="col-md-12 p-2">
  <div class="card">
    <div class="card-header">
      <h3>Daftar Pemberian infus</h3>
    </div>
    <div class="card-body">
      <button onclick="viewDftarberiinfus()" class="btn btn-primary">Tambah</button>
      <table   class="table table-striped table-sm">
        <thead>
          <tr>
            <th style="width: 15px">#</th>
            <th style="width: 80px">Jenis infus</th>
            <th>Nama infus</th>
            <th style="width: 180px">Tanggal</th>
            <th style="width: 180px">Keterangan</th>
          </tr>
        </thead>
        <tbody id="bodyhistoripemberianinfus"></tbody>
      </table>
    </div>
  </div>
  <div class="card">
    <div class="card-header">
      <h3>Daftar Pemberian infus High Alert</h3>
    </div>
    <div class="card-body">
      <button class="btn btn-primary" onclick="viewDftarberiinfusHigh()">Tambah</button>
      <table   class="table table-striped table-sm">
        <thead>
          <tr>
            <th style="width: 15px">#</th>
            <th style="width: 80px">Jenis infus</th>
            <th>Nama infus</th>
            <th style="width: 180px">Tanggal</th>
            <th style="width: 180px">Keterangan</th>
          </tr>
        </thead>
        <tbody id="bodyhistoripemberianinfushigh"></tbody>
      </table>
    </div>
  </div>
</div>
<div class="content modal fade"  id="ModalpemberianInfushigh"  >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        Pemberian Infus 
      </div>
      <div class="modal-body">        
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12" data-select2-id="39">
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label class="col-form-label">ID</label>
                      </div>
                      <div class="col-md-3">
                        <input id="dacriberiinfus_id" name="iddet" type="text" class="form-control" readonly="readonly">
                      </div>
                    </div>
                    <div class="form-group row d-none">
                      <div class="col-md-4">
                        <label class="col-form-label">Kategori</label>
                      </div>
                      <div class="col-md-7">
                        <input id="dacriberiinfus_idkun" name="idkun" type="text" class="form-control" readonly="readonly">
                      </div>
                    </div>                      
                    <div class="form-group row">
                      <div class="col-md-4  text-truncate">
                        <label class="col-form-label">Tanggal</label>
                      </div>
                      <div class="col-md-4">
                        <div class="input-group date" id="dacriberiinfus_datgl" data-target-input="nearest">
                          <input id="dacriberiinfus_atgl" name="atgl" type="date" class="form-control" >

                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label class="col-form-label">Nama Infus</label>
                      </div>
                      <div class="col-md-7">
                       <select id="dacriberiinfus_infusId" name="obat" class="form-control"></select>
                     </div>
                   </div>
                   <div class="form-group row">
                    <div class="col-md-4">
                      <label class="col-form-label">Jumlah Tetesan</label>
                    </div>
                    <div class="col-md-7">
                      <div class="row" id="divdacriberiinfus_infsupump">
                        <label class="col-form-label font-weight-bold">Infus Pump : </label>
                        <div class="col-md-12">
                          <div class="form-group">
                            <div class="row custom-control custom-checkbox custom-control-inline">
                              <input name="dacriberiinfus_infsupump" value="2" type="radio" class="custom-control-input" id="dacriberiinfus_infsupump_2"> <label class="custom-control-label" for="dacriberiinfus_infsupump_2">Ya</label>
                            </div>

                            <div class="row" id="dacriberiinfus_div_infsupump2" style="display: none;">
                              <div class="col-md-1"></div>
                              <div class="col-md-5">
                                <div class="input-group">
                                  <input type="text" onfocus="this.select();" class="form-control" id="dacriberiinfus_pumpyes" maxlength="20"> <span class="input-group-append"> <span class="input-group-text">cc/Jam</span>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <div class="row custom-control custom-checkbox custom-control-inline">
                            <input name="dacriberiinfus_infsupump" value="1" type="radio" class="custom-control-input" id="dacriberiinfus_infsupump_1"> <label class="custom-control-label" for="dacriberiinfus_infsupump_1">Tidak</label>
                          </div>
                          <div class="row" id="dacriberiinfus_div_infsupump1" >
                            <div class="col-md-1"></div>
                            <div class="col-md-11">
                              <div class="row" id="divdacriberiinfus_pumpno">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                      <input name="dacriberiinfus_pumpno" value="1" type="radio" class="custom-control-input" id="dacriberiinfus_pumpno_1"> <label class="custom-control-label" for="dacriberiinfus_pumpno_1">Loading</label>
                                    </div>
                                    <div class="row" id="dacriberiinfus_div_pumpno1" >
                                      <div class="col-md-1"></div>
                                      <div class="col-md-8">
                                        <div class="input-group">
                                          <input type="text" onfocus="this.select();" class="form-control" id="dacriberiinfus_loading1" maxlength="20"> <span class="input-group-append"> <span class="input-group-text">cc</span>
                                        </span> <input type="text" onfocus="this.select();" class="form-control" id="dacriberiinfus_loading2" maxlength="20"> <span class="input-group-append"> <span class="input-group-text">Jam</span>
                                      </span>
                                    </div>
                                  </div>
                                </div>


                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <div class="row custom-control custom-checkbox custom-control-inline">
                                  <input name="dacriberiinfus_pumpno" value="2" type="radio" class="custom-control-input" id="dacriberiinfus_pumpno_2" onclick="makro()"> <label class="custom-control-label" for="dacriberiinfus_pumpno_2">Makro</label>
                                </div>

                                <div class="row" id="dacriberiinfus_div_pumpno2" style="display: none;">
                                  <div class="col-md-1"></div>
                                  <div class="col-md-8">
                                    <div class="input-group">
                                      <input type="text" onfocus="this.select();" class="form-control" id="dacriberiinfus_makro" maxlength="20"> <span class="input-group-append"> <span class="input-group-text">Tetes/Menit</span>
                                    </span>
                                  </div>
                                </div>
                              </div>

                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <div class="row custom-control custom-checkbox custom-control-inline">
                                <input name="dacriberiinfus_pumpno" value="3" type="radio" class="custom-control-input" id="dacriberiinfus_pumpno_3" onclick="mikro()"> <label class="custom-control-label" for="dacriberiinfus_pumpno_3">Mikro</label>
                              </div>


                              <div class="row" id="dacriberiinfus_div_pumpno3" style="display: none;">
                                <div class="col-md-1"></div>
                                <div class="col-md-8">
                                  <div class="input-group">
                                    <input type="text" onfocus="this.select();" class="form-control" id="dacriberiinfus_mikro" maxlength="20"> <span class="input-group-append"> <span class="input-group-text">Tetes/Menit</span>
                                  </span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-md-4">
            <label class="col-form-label">Kolf Ke</label>
          </div>
          <div class="col-md-3">
            <input type="number" onfocus="this.select();" class="form-control" id="dacriberiinfus_kolf">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-4">
            <label class="col-form-label">Jam Pasang</label>
          </div>
          <div class="col-md-3">
            <div class="input-group date" id="dacriberiinfus_djampasang" data-target-input="nearest">
              <input id="dacriberiinfus_jampasang" name="jampasang" type="time" class="form-control datetimepicker-input" data-target="#dacriberiinfus_djampasang" data-toggle="datetimepicker" maxlength="5">
              <div class="input-group-append" data-target="#dacriberiinfus_djampasang" data-toggle="datetimepicker">
                <div class="input-group-text">
                  <!-- <i class="far fa-calendar"></i> -->
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="form-group row">
          <div class="col-md-4">
            <label class="col-form-label">Jam</label>
            <select name="modejam" id="dacriberiinfus_modejam">
              <option value="1">Ganti</option>
              <option value="2">Habis</option>                          
            </select>
          </div>
          <div class="col-md-3">
            <div class="input-group date" id="divdacriberiinfus_djamphabis" data-target-input="nearest">
              <input id="dacriberiinfus_jamphabis" name="jamphabis" type="time" class="form-control datetimepicker-input" data-target="#dacriberiinfus_djamphabis" data-toggle="datetimepicker" maxlength="5">
              <div class="input-group-append" data-target="#dacriberiinfus_djamphabis" data-toggle="datetimepicker">
                <div class="input-group-text">
                  <!-- <i class="far fa-calendar"></i> -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row" data-select2-id="38">
          <div class="col-md-4">
            <label class="col-form-label">Perawat</label>
          </div>
          <div class="col-md-7" data-select2-id="37">
            <select id="dacriberiinfus_apj1Id" name="apj1Id" class="form-control"></select>
          </div>
          <div class="col-md-1">
            <button id="dacriberiinfus_btpjdef1" class="btn btn-sm btn-primary" type="button" title="Default PJ">
              <!-- <i class="fas fa-undo"></i> -->
            </button>
          </div>
        </div>
        <div class="form-group row" id="">
          <div class="col-md-4">&nbsp;</div>
          <div class="col-md-6">
            <div class="table-responsive" align="left">
              <table class="table table-bordered table-condensed" style="width: 240px; height: 80px;">
                <tbody>
                  <tr>
                    <td width="30%" style="padding: 0;">
                      <div id="dacriberiinfus_ttdid1" class="sigPad border border-dark" style="width: 240px;">
                        <div class="sig sigWrapper border border-dark current" style="height: auto; display: block;">
                          <img id="ImgTtdPemberianInfus1" style="width:250px;height:250px;">
                        </div>
                        <input type="hidden" name="HasilTtdPemberianInfus1" id="HasilTtdPemberianInfus1">
                        <div><button class="btn btn-primary" onclick="showModalPemberianInfus1()">TTD</button> </div>
                      </div>
                      <div id="divttdpemberianinfus1" style="display: none;">
                        <div  style="width: 408px;border: 1px;" id="paint_ttdPemberianInfus1" ></div>

                        <div>

                          <button class="btn btn-sm btn-primary" onclick="takeTtdPemberianinfus1();">Simpan</button>
                          <button class="btn btn-sm btn-outline-danger" onclick="$('#ModalTtdPemberianinfus1').modal('hide');">Batal</button>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody></table>
              </div>
            </div>
            <div class="col-md-1">
              <button id="dacriberiinfus_btclearttd1" type="button" class="btn btn-sm btn-warning">Reset</button>
            </div>
          </div>

          <div id="dacriberiinfus_apj2Div" style="display: none;">
            <div class="form-group row">
              <div class="col-md-4">
                <label class="col-form-label">Perawat 2</label>
              </div>
              <div class="col-md-7">
                <select id="dacriberiinfus_apj2Id" name="apj2Id" class="form-control select2-hidden-accessible" data-select2-id="dacriberiinfus_apj2Id" tabindex="-1" aria-hidden="true"><option value="1" selected="" data-select2-id="12">UMUM</option></select><span class="select2 select2-container select2-container--bootstrap4" dir="ltr" data-select2-id="5"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-dacriberiinfus_apj2Id-container"><span class="select2-selection__rendered" id="select2-dacriberiinfus_apj2Id-container" role="textbox" aria-readonly="true" title="UMUM"><span class="select2-selection__clear" data-select2-id="27">×</span>UMUM</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
              </div>
              <div class="col-md-1">
                <button id="dacriberiinfus_btpjdef2" class="btn btn-sm btn-primary" type="button" title="Default PJ">
                 <!-- <i class="fas fa-undo"></i> -->
               </button>
             </div>
           </div>
           <div class="form-group row">
            <div class="col-md-4">&nbsp;</div>
            <div class="col-md-6">
              <div class="table-responsive" align="left">
                <table class="table table-bordered table-condensed" style="width: 240px; height: 80px;">
                  <tbody><tr>
                    <td width="30%" style="padding: 0;">
                      <div id="dacriberiinfus_ttdid4" class="sigPad border border-dark" style="width: 240px;">
                        <a id="dacriberiinfus_resetttd2" class="clearButton btn btn-primary " href="#clear" hidden="true" style="display: block;">Reset</a>
                        <div class="sig sigWrapper border border-dark current" style="height: auto; display: block;">
                          <canvas id="dacriberiinfus_ttd2" class="pad" width="230" height="80"></canvas>
                          <input id="dacriberiinfus_codesig2" type="hidden" name="output-3" class="output" value="">
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody></table>
              </div>
            </div>
            <div class="col-md-1">
              <button id="dacriberiinfus_btclearttd2" type="button" class="btn btn-sm btn-warning">Reset</button>
            </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-md-4">
            <label class="col-form-label">Keterangan</label>
          </div>
          <div class="col-md-7">
            <textarea rows="4" name="ket" id="dacriberiinfus_ket" style="width: 100%;" class="form-control"></textarea>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-4">
            <label class="col-form-label">Instruksi</label>
          </div>
          <div class="col-md-7">
            <div class="form-group">
              <div class="custom-control custom-checkbox">
                <input name="dacriberiinfus_aksi" type="checkbox" class="custom-control-input" id="dacriberiinfus_aksi" onclick="cekdacriberiinfus_divint1()"> <label class="custom-control-label" for="dacriberiinfus_aksi">&nbsp;</label>
              </div>
            </div>
          </div>
        </div>  
        <div class="form-group row" id="dacriberiinfus_divint1" style="display: none;">
          <div class="col-md-4">
            &nbsp;&nbsp; <label class="col-form-label">Keterangan
            Instruksi</label>
          </div>
          <div class="col-md-7">
            <select name="intruksi" id="dacriberiinfus_intruksi" class="form-control">
              <option value="0">--Pilih--</option>
              <option value="1">Stop</option>
              <option value="2">Perubahan Aturan Pakai</option>
              <option value="3">Lain-Lain</option>
            </select>
          </div>
        </div>
        <div class="form-group row" id="dacriberiinfus_divintlain" style="display: none;">
          <div class="col-md-4">&nbsp;</div>
          <div class="col-md-7">
            <input type="text" class="form-control" id="dacriberiinfus_intruksilain">
          </div>
        </div>                    
        <div class="form-group row" id="dacriberiinfus_divinttgl" style="display: none;">
          <div class="col-md-4  text-truncate">
            &nbsp;&nbsp; <label class="col-form-label">Tanggal</label>
          </div>
          <div class="col-md-7">
            <div class="input-group date" id="dacriberiinfus_daksiatgl" data-target-input="nearest">
              <input id="dacriberiinfus_aksiatgl" name="atgl" type="date" class="form-control">
            </div>
          </div>
        </div>
        <div class="form-group row" id="dacriberiinfus_divint2" style="display: none;">
          <div class="col-md-4">
            &nbsp;&nbsp; <label class="col-form-label">Instruksi Diberikan Oleh</label>
          </div>
          <div class="col-md-6">
            <select id="dacriberiinfus_apj3Id" name="apj3Id" class="form-control select2-hidden-accessible" data-select2-id="dacriberiinfus_apj3Id" tabindex="-1" aria-hidden="true">
            </select>
          </div>
          <div class="col-md-1">
            <button id="dacriberiinfus_btpjdef3" class="btn btn-sm btn-primary" type="button" title="Default PJ">
              <!-- <i class="fas fa-undo"></i> -->
            </button>
          </div>
        </div>
        <div class="form-group row" id="dacriberiinfus_divint3" style="display: none;" data-select2-id="dacriberiinfus_divint3">
          <div class="col-md-4">
            &nbsp;&nbsp; <label class="col-form-label">Perawat</label>
          </div>
          <div class="col-md-6" data-select2-id="81">
            <select id="dacriberiinfus_apj4Id" name="apj4Id" class="form-control">></select>
          </div>
          <div class="col-md-1">
            <button id="dacriberiinfus_btpjdef4" class="btn btn-sm btn-primary" type="button" title="Default PJ">
              <!-- <i class="fas fa-undo"></i> -->
            </button>
          </div>
        </div>
        <div class="form-group row" id="dacriberiinfus_divintpj3" style="display: none;">
          <div class="col-md-4">&nbsp;</div>
          <div class="col-md-6">
            <div class="table-responsive" align="left">
              <table class="table table-bordered table-condensed" style="width: 240px; height: 80px;">
                <tbody><tr>
                  <td width="30%" style="padding: 0;">
                   <div id="dacriberiinfus_ttdid2" class="sigPad border border-dark" style="width: 240px;">
                    <div class="sig sigWrapper border border-dark current" style="height: auto; display: block;">
                      <img id="ImgTtdPemberianInfus2" style="width:250px;height:250px;">
                    </div>
                    <input type="hidden" name="HasilTtdPemberianInfus2" id="HasilTtdPemberianInfus2">
                    <div><button class="btn btn-primary" onclick="showModalPemberianInfus2()">TTD</button> 
                    </div>
                  </div>
                  <div id="divttdpemberianinfus2" style="display: none;">
                    <div  style="width: 408px;border: 1px;" id="paint_ttdPemberianInfus2" ></div>

                    <div>

                      <button class="btn btn-sm btn-primary" onclick="takeTtdPemberianinfus2();">Simpan</button>
                      <button class="btn btn-sm btn-outline-danger" onclick="$('#ModalTtdPemberianinfus2').modal('hide');">Batal</button>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody></table>
          </div>
        </div>
        <div class="col-md-1">
          <button id="dacriberiinfus_btclearttd4" type="button" class="btn btn-sm btn-warning">Reset</button>
        </div>
      </div>  
      <div class="form-group row" >
        <div class="col-md-12">
          &nbsp;&nbsp; <button class="btn btn-primary" onclick="simpanPemberianInfus()">SIMPAN</button>
        </div>

      </div>                                    
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<script type="text/javascript">
  var no_rm   				= "<?php echo $rm; ?>";
  var id_unit   			= "<?php echo $unit; ?>";
  var id_kunjungan   	= "<?php echo $id_kunjungan; ?>";
  var id_transaksi   	= "<?php echo $id_transaksi; ?>";
  var listperawat 		= [];
  document.getElementById('loading_DaftarPemberianInfus').style.display = 'none';
  $(document).ready(function() {
    daftarpemberianinfus();
  })
  function instruksiinfushigh() {
    if (document.getElementById('dacriberiinfus2_aksi2').checked==true) {
      document.getElementById('dacriberiinfus2_divint3').style.display='block';
      document.getElementById('dacriberiinfus2_divint2').style.display='block';
      document.getElementById('dacriberiinfus2_divinttgl').style.display='block';
      document.getElementById('dacriberiinfus2_divint1').style.display='block';
      document.getElementById('dacriberiinfus2_divintlain').style.display='block';
    }else{
      document.getElementById('dacriberiinfus2_divint3').style.display ='none';
      document.getElementById('dacriberiinfus2_divint2').style.display ='none';
      document.getElementById('dacriberiinfus2_divinttgl').style.display='none';
      document.getElementById('dacriberiinfus2_divint1').style.display ='none';
      document.getElementById('dacriberiinfus2_divintlain').style.display='none';

    }
  }
  function instruksiinfushigh() {
    if (document.getElementById('dacriberiinfus2_aksi2').checked==true) {
      document.getElementById('dacriberiinfus2_divint3').style.display='block';
      document.getElementById('dacriberiinfus2_divint2').style.display='block';
      document.getElementById('dacriberiinfus2_divinttgl').style.display='block';
      document.getElementById('dacriberiinfus2_divint1').style.display='block';
      document.getElementById('dacriberiinfus2_divintlain').style.display='block';
    }else{
      document.getElementById('dacriberiinfus2_divint3').style.display ='none';
      document.getElementById('dacriberiinfus2_divint2').style.display ='none';
      document.getElementById('dacriberiinfus2_divinttgl').style.display='none';
      document.getElementById('dacriberiinfus2_divint1').style.display ='none';
      document.getElementById('dacriberiinfus2_divintlain').style.display='none';

    }
  }
  function viewDftarberiinfusHigh(){
    viewjenisobat();
    $('#ModalpemberianInfushigh').modal('show');
    document.getElementById('dacriberiinfus_id').value='high_alert';
    document.getElementById('dacriberiinfus_idkun').value=2;

    apiPOST('Rekammedisirna/searchPerawat', data.id_unit, hasil => {
      var sus = "<option value='0'> - Silahkan Pilih -</option>";
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        sus += '<option value="' + a[i]['id_pegawai'] + '">' + a[i]['nama_pegawai'] + '</option>';
      }
      document.getElementById('dacriberiinfus_apj1Id').innerHTML = sus;
      document.getElementById('dacriberiinfus_apj4Id').innerHTML = sus;
    })

  }
  function viewDftarberiinfus(){
    viewjenisobat();
    $('#ModalpemberianInfushigh').modal('show');
    document.getElementById('dacriberiinfus_id').value='non_high_alert';
    document.getElementById('dacriberiinfus_idkun').value=1;

    apiPOST('Rekammedisirna/searchPerawat', data.id_unit, hasil => {
      var sus = "<option value='0'> - Silahkan Pilih -</option>";
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        sus += '<option value="' + a[i]['id_pegawai'] + '">' + a[i]['nama_pegawai'] + '</option>';
      }
      document.getElementById('dacriberiinfus_apj1Id').innerHTML = sus;
      document.getElementById('dacriberiinfus_apj4Id').innerHTML = sus;
    })

  }
  function viewjenisobat(){

    apiPOST('Rekammedisirna/jenisinfus', data.id_unit, hasil => {
      var sus = "<option value='0'> - Silahkan Pilih -</option>";
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        sus += '<option value="' + a[i]['kd_obat'] + '">' + a[i]['nama_obat'] + '</option>';
      }
      document.getElementById('dacriberiinfus_infusId').innerHTML = sus;
    })

  }
 //1
  function cekdacriberiinfus_divint1() {
    if (document.getElementById('dacriberiinfus_aksi').checked==true) {
      document.getElementById('dacriberiinfus_divint1').style.display='block';
      document.getElementById('dacriberiinfus_divintpj3').style.display='block';
      document.getElementById('dacriberiinfus_divint3').style.display='block';
      document.getElementById('dacriberiinfus_divint2').style.display='block';
      document.getElementById('dacriberiinfus_divinttgl').style.display='block';
    } else {
      document.getElementById('dacriberiinfus_divint1').style.display='none';
      document.getElementById('dacriberiinfus_divintpj3').style.display='none';
      document.getElementById('dacriberiinfus_divint3').style.display='none';
      document.getElementById('dacriberiinfus_divint2').style.display='none';
      document.getElementById('dacriberiinfus_divinttgl').style.display='none';
    }
  }
  var ttdPemberianInfus1      = new WPaintX('paint_ttdPemberianInfus1');
  function showModalPemberianInfus1() {
    showttdPemberianInfus1();
    document.getElementById('divttdpemberianinfus1').style.display='block';
    document.getElementById('dacriberiinfus_ttdid1').style.display='none';
    //$('#ModalTtdPemberianinfus1').modal('show');

  }
  function showttdPemberianInfus1(){
    ttdPemberianInfus1.show();
  }
  function takeTtdPemberianinfus1() {
    document.getElementById('ImgTtdPemberianInfus1').src=ttdPemberianInfus1.getData();
    document.getElementById('HasilTtdPemberianInfus1').value=ttdPemberianInfus1.getData();
    document.getElementById('divttdpemberianinfus1').style.display='none';
    document.getElementById('dacriberiinfus_ttdid1').style.display='block';
  }
  //2
  var ttdPemberianInfus2      = new WPaintX('paint_ttdPemberianInfus2');
  function showModalPemberianInfus2() {
    showttdPemberianInfus2();
    //$('#ModalTtdPemberianinfus2').modal('show');
    document.getElementById('divttdpemberianinfus2').style.display='block';
    document.getElementById('dacriberiinfus_ttdid2').style.display='none';
  }
  function showttdPemberianInfus2(){
    ttdPemberianInfus2.show();
  }
  function takeTtdPemberianinfus2() {
    document.getElementById('ImgTtdPemberianInfus2').src=ttdPemberianInfus2.getData();
    document.getElementById('HasilTtdPemberianInfus2').value=ttdPemberianInfus2.getData();
    document.getElementById('divttdpemberianinfus2').style.display='none';
    document.getElementById('dacriberiinfus_ttdid2').style.display='block';

  }
  //3
  var ttdPemberianInfus3      = new WPaintX('paint_ttdPemberianInfus3');
  function showModalPemberianInfus3() {
    showttdPemberianInfus3();
    $('#ModalTtdPemberianinfus3').modal('show');
  }
  function showttdPemberianInfus3(){
    ttdPemberianInfus3.show();
  }
  function takeTtdPemberianInfus3() {
    document.getElementById('ImgTtdPemberianInfus3').src=ttdPemberianInfus3.getData();
    document.getElementById('HasilTtdPemberianInfus3').value=ttdPemberianInfus3.getData();
    $('#ModalTtdPemberianInfus3').modal('hide');

  }
  function makro() {
    document.getElementById('dacriberiinfus_div_pumpno2').style.display='block';
    document.getElementById('dacriberiinfus_div_pumpno3').style.display='none';
    
  }
  function mikro() {
    document.getElementById('dacriberiinfus_div_pumpno3').style.display='block';
    document.getElementById('dacriberiinfus_div_pumpno2').style.display='none';
    
  }
  function simpanPemberianInfus() {
    if ($('input[name=dacriberiinfus_pumpno]:checked').val() == 1) {
      pumpno1 = $('#dacriberiinfus_loading1').val();
      pumpno2 = $('#dacriberiinfus_loading2').val();
    } else if($('input[name=dacriberiinfus_pumpno]:checked').val() == 2){
      pumpno1 = $('#dacriberiinfus_makro').val();
      pumpno2 = '';
    } else{
      pumpno1 = $('#dacriberiinfus_mikro').val();
      pumpno2 = '';
    }
    if (document.getElementById('dacriberiinfus_aksi').checked==true) {
      ins='t';
    }else{
        ins='f';
    }
    
    var param = {
      id_kat      :$('#dacriberiinfus_idkun').val(),
      tgl_pem_in  :$('#dacriberiinfus_atgl').val(),
      nama_infus  :$('#dacriberiinfus_infusId').val(),
      pump        :$('input[name=dacriberiinfus_infsupump]:checked').val(), 
      pumpno      :$('input[name=dacriberiinfus_pumpno]:checked').val(),
      kolf        :$('#dacriberiinfus_kolf').val(),
      jam_pasang  :$('#dacriberiinfus_jampasang').val(),
      jam_ganti   :$('#dacriberiinfus_jamphabis').val(),
      modejam     :$('#dacriberiinfus_modejam').val(),
      perawat1    :$('#dacriberiinfus_apj1Id').val(),
      ttdPerawat1 :$('#HasilTtdPemberianInfus1').val(),
      keterangan   :$('#dacriberiinfus_ket').val(),
      instruksi   :ins,
      ket_instruksi:$('#dacriberiinfus_intruksi').val(),
      ins_lain    :$('#dacriberiinfus_intruksilain').val(),
      tgl_ins     :$('#dacriberiinfus_aksiatgl').val(),
      perawat2    :$('#dacriberiinfus_apj4Id').val(),
      ttdperawat2 :$('#HasilTtdPemberianInfus2').val(),
      id_kunjungan:$('#idKunjunganermirna').val(),
      id_transaksi:$('#transaksiermirna').val(),
      ukuran_infus:pumpno1,
      frekuensi_infus:pumpno2,
    }
    apiPOST('Rekammedisirna/tesinfus', param, hasil => {

    })
  }
  function daftarpemberianinfus(){
        document.getElementById('bodyhistoripemberianinfus').innerHTML="";
        document.getElementById('bodyhistoripemberianinfushigh').innerHTML="";
        var param = {
          id_transaksi:$('#transaksiermirna').val(),
        };
        apiPOST('Rekammedisirna/daftarpemberianinfus', param, hasil => {
          var v='';
          var h='';
          var a = hasil['nonhigh'];
          var b = hasil['high'];
          for (var i = 0; i < a.length; i++) {
            v+='<tr>';
            v+='<td style="width: 15px">#</td>';
            v+='<td>' + a[i]['nama_obat'] + '</td>';
            v+='<td>' + a[i]['nama_obat'] + '</td>';
            v+='<td style="width: 80px">' + a[i]['tgl_pemberian_infus'] + '</td>';
            v+='<td style="width: 80px">' + a[i]['jam_pasang'] + '</td>';
            v+='</tr>';


          }
          for (var j = 0; j < b.length; j++) {


            h+='<tr>';
            h+='<td style="width: 15px">#</td>';
            h+='<td>' + b[j]['nama_obat'] + '</td>';
            h+='<td>' + b[j]['nama_obat'] + '</td>';
            h+='<td style="width: 80px">' + b[j]['tgl_pemberian_infus'] + '</td>';
            h+='<td style="width: 80px">' + b[j]['jam_pasang'] + '</td>';
            h+='</tr>';

          }

          document.getElementById('bodyhistoripemberianinfus').innerHTML=v;
          document.getElementById('bodyhistoripemberianinfushigh').innerHTML=h;
        })
      }

</script>