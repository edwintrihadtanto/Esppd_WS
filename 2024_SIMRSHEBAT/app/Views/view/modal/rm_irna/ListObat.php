<?php
  $data 						= json_decode($_GET['data']);
  $rm 							= str_replace('"','', json_encode($data->rm));
  $unit     				= str_replace('"','', json_encode($data->unit));
  $id_kunjungan     = str_replace('"','', json_encode($data->id_kunjungan));
  $id_transaksi     = str_replace('"','', json_encode($data->id_transaksi));
?>
<div class="col-md-12 p-0">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header p-2">
        <h6><strong>Daftar Pemberian Obat</strong></h6>
      </div>
      <div class="card-body p-2">
        <div class="pb-2">
          <button class="btn btn-primary btn-sm"  onclick="viewDftarberiobat()"><i class="fa fa-save"></i> Tambah</button>
        </div>
        <table   class="table table-striped table-sm table-bordered choose">
          <thead>
            <tr>
              <th style="width: 15px">#</th>
              <th style="width: 80px">Jenis Obat</th>
              <th>Nama Obat</th>
              <th style="width: 180px">Tanggal</th>
              <th style="width: 180px">Keterangan</th>
            </tr>
          </thead>
          <tbody id="bodyhistoripemberianobat"></tbody>
        </table>
      </div>
    </div>
    <div class="card">
      <div class="card-header p-2">
        <h6><strong>Daftar Pemberian Obat High Alert</strong></h6>
      </div>
      <div class="card-body p-2">
        <div class="pb-2">
          <button class="btn btn-primary btn-sm" onclick="viewDftarberiobatHigh()"><i class="fa fa-save"></i> Tambah</button>
        </div>
        <table   class="table table-striped table-sm table-bordered choose">
          <thead>
            <tr>
              <th style="width: 15px">#</th>
              <th style="width: 80px">Jenis Obat</th>
              <th>Nama Obat</th>
              <th style="width: 180px">Tanggal</th>
              <th style="width: 180px">Keterangan</th>
            </tr>
          </thead>
          <tbody id="bodyhistoripemberianobathigh"></tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="Modalpemberianobat">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h6>Tambah Daftar Pemberian Obat</h6>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label class="col-form-label">ID</label>
                      </div>
                      <div class="col-md-7">
                        <input id="dacriberiobat_id1" name="iddet" type="text" class="form-control" readonly="readonly">
                      </div>
                    </div>
                    <div class="form-group row d-none">
                      <div class="col-md-4">
                        <label class="col-form-label">ID Kunjungan</label>
                      </div>
                      <div class="col-md-7">
                        <input id="dacriberiobat_idkun" name="idkun" type="text" class="form-control" readonly="readonly">
                      </div>
                    </div>                    
                    <div class="form-group row">
                      <div class="col-md-4  text-truncate">
                        <label class="col-form-label">Tanggal</label>
                      </div>
                      <div class="col-md-7">
                        <div class="input-group date" id="dacriberiobat_datgl" data-target-input="nearest">

                          <input id="dacriberiobat_atgl" name="atgl" type="date" class="form-control datetimepicker-input" data-target="#dacriberiobat_datgl" data-toggle="datetimepicker">
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label class="col-form-label">Jenis Obat</label>
                      </div>
                      <div class="col-md-7">
                        <select name="jenisobat" id="dacriberiobat_jenisobatId1" class="form-control">
                          <option value="1">Obat Jadi</option>
                          <option value="2">Obat Racik</option>
                        </select>
                      </div>
                    </div>    
                    <div class="form-group row" id="dacriberiobat_divracik1" style="display:none;">
                      <div class="col-md-4">
                        <label class="col-form-label">Deskripsi Racikan</label>
                      </div>
                      <div class="col-md-7">
                        <textarea rows="3" name="dacriberiobat_jenisobatket" id="dacriberiobat_jenisobatket" style="width: 100%;" class="form-control"></textarea>
                      </div>
                    </div>                                    
                    <div class="form-group row" id="dacriberiobat_divjadi" style="">
                      <div class="col-md-4">
                        <label class="col-form-label">Nama Obat</label>
                      </div>
                      <div class="col-md-7">
                        <input id="dacriberiobat_jenisId" type="hidden" value="1"> 
                        <select id="dacriberiobat_obatId" name="obat" class="form-control"></select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label class="col-form-label">Dosis</label>
                      </div>
                      <div class="col-md-7">
                        <input type="text" class="form-control" id="dacriberiobat_dosis">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label class="col-form-label">Ket. Waktu Pemberian</label>
                      </div>
                      <div class="col-md-7">
                        <textarea rows="3" name="dacriberiobat_jamberi" id="dacriberiobat_jamberi" style="width: 100%;" class="form-control"></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label class="col-form-label">Rute</label>
                      </div>
                      <div class="col-md-7">
                        <select name="rute" id="dacriberiobat_rute1" class="form-control">
                          <option value="0">--Pilih--</option>
                          <option value="1">Oral</option>
                          <option value="2">Intravena</option>
                          <option value="3">Intramuskular</option>
                          <option value="4">Subkutan</option>
                          <option value="5">Sublingual</option>
                          <option value="6">Per rektal</option>
                          <option value="7">Per vaginam</option>
                          <option value="8">Tetes Mata</option>
                          <option value="9">Tetes Telinga</option>
                          <option value="10">Tetes Hidung</option>
                          <option value="11">Semprot Hidung</option>
                          <option value="12">Inhalasi</option>
                          <option value="13">Nebulisasi</option>
                          <option value="14">Penggunaan Luar</option>
                          <option value="15">Transdermal</option>
                          <option value="16">Intracutan</option>
                          <option value="17">Lain-lain</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row" id="dacriberiobat_divrute1" style="display: none;">
                      <div class="col-md-4">&nbsp;</div>
                      <div class="col-md-7">
                        <input type="text" class="form-control" id="dacriberiobat_rute1lain">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label class="col-form-label">Dokter</label>
                      </div>
                      <div class="col-md-6">
                        <select id="dacriberiobat_apj1Id1" name="apj1Id1" class="form-control"></select>
                      </div>
                      <div class="col-md-1">
                        <button id="dacriberiobat_btpjdef1" class="btn btn-sm btn-primary" type="button" onclick="$('#dacriberiobat_apj1Id1').val('0').change()" title="Default PJ"><i class="fas fa-undo"></i></button>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label class="col-form-label">Perawat</label>
                      </div>
                      <div class="col-md-6">
                        <select id="dacriberiobat_apj2Id1" name="apj2Id" class="form-control"></select>
                      </div>
                      <div class="col-md-1">
                        <button id="dacriberiobat_btpjdef2" class="btn btn-sm btn-primary" type="button" title="Default PJ"><i class="fas fa-undo"></i></button>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label class="col-form-label">Instruksi</label>
                      </div>
                      <div class="col-md-7">
                        <div class="form-group">
                          <div class="custom-control custom-checkbox">
                            <input id="dacriberiobat_aksi1" name="dacriberiobat_aksi1" type="checkbox" class="custom-control-input" id="dacriberiobat_aksi1"> <label class="custom-control-label" for="dacriberiobat_aksi1">&nbsp;</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row" id="dacriberiobat_divint1" style="display: none;">
                      <div class="col-md-4">
                        &nbsp;&nbsp; <label class="col-form-label">Keterangan
                        Instruksi</label>
                      </div>
                      <div class="col-md-7">
                        <select name="intruksi" id="dacriberiobat_intruksi" class="form-control">
                          <option value="0">--Pilih--</option>
                          <option value="1">Stop</option>
                          <option value="2">Perubahan Aturan Pakai</option>
                          <option value="3">Lain-Lain</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row" id="dacriberiobat_divintlain" style="display: none;">
                      <div class="col-md-4">&nbsp;</div>
                      <div class="col-md-7">
                        <input type="text" class="form-control" id="dacriberiobat_intruksilain">
                      </div>
                    </div>                    
                    <div class="form-group row" style="display: none;" id="dacriberiobat_divinttgl">
                      <div class="col-md-4  text-truncate">
                        &nbsp;&nbsp; <label class="col-form-label">Tanggal</label>
                      </div>
                      <div class="col-md-7">
                        <div class="input-group date" id="dacriberiobat_daksiatgl" data-target-input="nearest">
                          <input id="dacriberiobatnonhigh_aksiatgl" name="atgl" type="date" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="form-group row" id="dacriberiobat_divint2" style="display: none;">
                      <div class="col-md-4">
                        &nbsp;&nbsp; <label class="col-form-label">Instruksi Diberikan Oleh</label>
                      </div>
                      <div class="col-md-6">
                        <select id="dacriberiobat_apj3Id" name="apj3Id" class="form-control"></select>
                      </div>
                      <div class="col-md-1">
                        <button id="dacriberiobat_btpjdef3" class="btn btn-sm btn-primary" type="button" onclick="$('#dacriberiobat_apj3Id').val('0').change()" title="Default PJ"><i class="fas fa-undo"></i></button>
                      </div>
                    </div>
                    <div class="form-group row" id="dacriberiobat_divint3" style="display: none;">
                      <div class="col-md-4">
                        &nbsp;&nbsp; <label class="col-form-label">Perawat</label>
                      </div>
                      <div class="col-md-6">
                        <select id="dacriberiobat_apj4Id" name="apj4Id" class="form-control"></select>
                      </div>
                      <div class="col-md-1">
                        <button id="dacriberiobat_btpjdef4" class="btn btn-sm btn-primary" type="button" onclick="$('#dacriberiobat_apj4Id').val('0').change()" title="Default PJ"><i class="fas fa-undo"></i></button>
                      </div>
                    </div>
                    <div class="form-group row" id="dacriberiobat_divintpj3" style="display: none;">
                      <div class="col-md-4">&nbsp;</div>
                      <div class="col-md-6">
                        <div class="table-responsive" align="left">
                          <table class="table table-bordered table-condensed" style="width: 240px; height: 80px;">
                            <tbody>
                              <tr>
                                <td width="30%" style="padding: 0;">
                                  <div id="dacriberiobat2_ttdid4" class="sigPad border border-dark" style="width: 240px; height: 100px;">
                                    <img id="GambarTtdPemberianObatNonHigh" style="width: 230px; height: 90px;">
                                    <input id="HasilTtdPemberianObatNonHigh" type="hidden" >
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="col-md-1">
                        <button onclick="showModalPemberianObatNonHigh()" type="button" class="btn btn-sm btn-warning">TTD</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer p-1">

                <button id="dacriberiobat_btsave" type="button" onclick="Saveberiobat()" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Simpan
                </button>
                <button id="dacriberiobat_btreset" type="button" class="btn btn-sm btn-warning" onclick="dismiss_modallistobat()"><i class="fas fa-times"></i> Tutup
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="Modalpemberianobathigh">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h6>Tambah Daftar Pemberian Obat High Alert</h6>
      </div>
      <div class="modal-body">        
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label class="col-form-label">ID</label>
                      </div>
                      <div class="col-md-7">
                        <input id="dacriberiobat2_id" name="iddet" type="text" class="form-control" readonly="readonly">
                      </div>
                    </div>
                    <div class="form-group row d-none">
                      <div class="col-md-4">
                        <label class="col-form-label">ID Kunjungan</label>
                      </div>
                      <div class="col-md-7">
                        <input id="dacriberiobat2_idkun" name="idkun" type="text" class="form-control" readonly="readonly">
                      </div>
                    </div>                    
                    <div class="form-group row">
                      <div class="col-md-4  text-truncate">
                        <label class="col-form-label">Tanggal</label>
                      </div>
                      <div class="col-md-7">
                        <div class="input-group date" id="dacriberiobat2_datgl" data-target-input="nearest">
                          <input id="dacriberiobat2_atgl" name="atgl" type="date" class="form-control" value="<?php echo date('Y-m-d')?>">
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label class="col-form-label">Jenis Obat</label>
                      </div>
                      <div class="col-md-7">
                        <select name="jenisobat" id="dacriberiobat2_jenisobatId2" class="form-control">
                          <option value="1">Obat Jadi</option>
                          <option value="2">Obat Racik</option>
                        </select>
                      </div>
                    </div>    
                    <div class="form-group row" id="dacriberiobat2_divracik2" style="display:none;">
                      <div class="col-md-4">
                        <label class="col-form-label">Deskripsi Racikan</label>
                      </div>
                      <div class="col-md-7">
                        <textarea rows="3" name="dacriberiobat2_jenisobatket" id="dacriberiobat2_jenisobatket" style="width: 100%;" class="form-control"></textarea>
                      </div>
                    </div>                                    
                    <div class="form-group row" id="dacriberiobat2_divjadi" style="">
                      <div class="col-md-4">
                        <label class="col-form-label">Nama Obat</label>
                      </div>
                      <div class="col-md-7">
                        <input id="dacriberiobat2_jenisId" type="hidden" value="2"> 
                        <select id="dacriberiobat2_obatId" name="obat" class="form-control"></select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label class="col-form-label">Dosis</label>
                      </div>
                      <div class="col-md-7">
                        <input type="text" class="form-control" id="dacriberiobat2_dosis">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label class="col-form-label">Ket. Waktu Pemberian</label>
                      </div>
                      <div class="col-md-7">
                        <textarea rows="3" name="dacriberiobat2_jamberi" id="dacriberiobat2_jamberi" style="width: 100%;" class="form-control"></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label class="col-form-label">Rute</label>
                      </div>
                      <div class="col-md-7">
                        <select name="rute" id="dacriberiobat2_rute2" class="form-control">
                          <option value="0">--Pilih--</option>
                          <option value="1">Oral</option>
                          <option value="2">Intravena</option>
                          <option value="3">Intramuskular</option>
                          <option value="4">Subkutan</option>
                          <option value="5">Sublingual</option>
                          <option value="6">Per rektal</option>
                          <option value="7">Per vaginam</option>
                          <option value="8">Tetes Mata</option>
                          <option value="9">Tetes Telinga</option>
                          <option value="10">Tetes Hidung</option>
                          <option value="11">Semprot Hidung</option>
                          <option value="12">Inhalasi</option>
                          <option value="13">Nebulisasi</option>
                          <option value="14">Penggunaan Luar</option>
                          <option value="15">Transdermal</option>
                          <option value="16">Intracutan</option>
                          <option value="17">Lain-lain</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row" id="dacriberiobat2_divrute2" style="display: none;">
                      <div class="col-md-4">&nbsp;</div>
                      <div class="col-md-7">
                        <input type="text" class="form-control" id="dacriberiobat2_rute2lain">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label class="col-form-label">Dokter</label>
                      </div>
                      <div class="col-md-6">
                        <select id="dacriberiobat2_apj1Id" name="apj1Id" class="form-control"></select>
                      </div>
                      <div class="col-md-1">

                        <button id="dacriberiobat_btpjdef1" class="btn btn-sm btn-primary" type="button" title="Default PJ">
                          <!-- <i class="fas fa-undo"></i> -->
                        </button>

                        <button id="dacriberiobat2_btpjdef2" class="btn btn-sm btn-primary" type="button" onclick="$('#dacriberiobat2_apj1Id').val('0').change()" title="Default PJ"><i class="fas fa-undo"></i> </button>

                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label class="col-form-label">Perawat</label>
                      </div>
                      <div class="col-md-6">
                        <select id="dacriberiobat2_apj2Id2" name="apj2Id" class="form-control"></select>
                      </div>
                      <div class="col-md-1">

                        <button id="dacriberiobat2_btpjdef2" class="btn btn-sm btn-primary" type="button" onclick="$('#dacriberiobat2_apj2Id2').val('0').change()" title="Default PJ"><i class="fas fa-undo"></i></button>

                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label class="col-form-label">Instruksi</label>
                      </div>
                      <div class="col-md-7">
                        <div class="form-group">
                          <div class="custom-control custom-checkbox">
                            <input name="dacriberiobat2_aksi2" type="checkbox" class="custom-control-input" id="dacriberiobat2_aksi2"> <label class="custom-control-label" for="dacriberiobat2_aksi2">&nbsp;</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row" id="dacriberiobat2_divint1" style="display: none;">
                      <div class="col-md-4">
                        &nbsp;&nbsp; <label class="col-form-label">Keterangan
                        Instruksi</label>
                      </div>
                      <div class="col-md-7">
                        <select name="intruksi" id="dacriberiobat2_intruksi" class="form-control">
                          <option value="0">--Pilih--</option>
                          <option value="1">Stop</option>
                          <option value="2">Perubahan Aturan Pakai</option>
                          <option value="3">Lain-Lain</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row" id="dacriberiobat2_divintlain" style="display: none;">
                      <div class="col-md-4">&nbsp;</div>
                      <div class="col-md-7">
                        <input type="text" class="form-control" id="dacriberiobat2_intruksilain">
                      </div>
                    </div>                    
                    <div class="form-group row" style="display: none;" id="dacriberiobat2_divinttgl">
                      <div class="col-md-4  text-truncate">
                        &nbsp;&nbsp; <label class="col-form-label">Tanggal Instruksi</label>
                      </div>
                      <div class="col-md-7">

                        <div class="input-group date" id="dacriberiobat_daksiatgl" data-target-input="nearest">
                          <input id="dacriberiobat_aksiatgl" name="atgl" type="date" class="form-control" value="<?php echo date('Y-m-d');?>">


                        </div>
                      </div>
                    </div>
                    <div class="form-group row" id="dacriberiobat2_divint2" style="display: none;">
                      <div class="col-md-4">
                        &nbsp;&nbsp; <label class="col-form-label">Instruksi Diberikan Oleh</label>
                      </div>
                      <div class="col-md-6">
                        <select id="dacriberiobat2_apj3Id" name="apj3Id" class="form-control"></select>
                      </div>
                      <div class="col-md-1">



                        <button id="dacriberiobat2_btpjdef3" class="btn btn-sm btn-primary" type="button" onclick="$('#dacriberiobat2_apj3Id').val('0').change()" title="Default PJ"><i class="fas fa-undo"></i></button>

                      </div>
                    </div>
                    <div class="form-group row" id="dacriberiobat2_divint3" style="display: none;">
                      <div class="col-md-4">
                        &nbsp;&nbsp; <label class="col-form-label">Perawat</label>
                      </div>
                      <div class="col-md-6">
                        <select id="dacriberiobat2_apj4Id" name="apj4Id" class="form-control"></select>
                      </div>
                      <div class="col-md-1">
                        <button id="dacriberiobat2_btpjdef4" class="btn btn-sm btn-primary" type="button" onclick="$('#dacriberiobat2_apj4Id').val('0').change()" title="Default PJ"><i class="fas fa-undo"></i></button>
                      </div>
                    </div>
    <div class="form-group row" id="dacriberiobat2_divintpj3" >
      <div class="col-md-6">
        <div class="table-responsive" align="left">
          <table class="table table-bordered table-condensed" style="width: 240px; height: 80px;">
            <tbody>
              <tr>
                <td width="30%" style="padding: 0;">
                  <div id="dacriberiobat2_ttdid4" class="sigPad border border-dark" style="width: 240px; height: 100px;">
                    <img id="GambarTtdPemberianObatHigh" style="width: 230px; height: 90px;">
                    <input id="HasilTtdPemberianObatHigh" type="hidden" >
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-md-1">
        <button onclick="showModalPemberianObatHigh()" type="button" class="btn btn-sm btn-warning">TTD</button>
      </div>
    </div>
</div>
</div>
</div>
<div class="card-footer p-1">
  <button id="dacriberiobat2_btsave" type="button" onclick="Saveberiobathigh()" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Simpan</button>
  <button id="dacriberiobat2_btreset" type="button" class="btn btn-sm btn-warning" onclick="dismiss_modallistobathigh()"><i class="fas fa-times"></i> Tutup</button>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- TTD -->
<div class="modal fade"  id="ModalTtdPemberianObatHigh" role="dialog">
  <div class="modal-dialog" style="width: 408px;">
    <div class="modal-content">
      <div class="modal-body">
        <div id="paint_ttdPemberianObatHigh"></div>
      </div>
      <div class="modal-footer">
        
        <button class="btn btn-sm btn-primary" onclick="takeTtdPemberianObatHigh();">Simpan</button>
        <button class="btn btn-sm btn-outline-danger" onclick="$('#ModalTtdPemberianObatHigh').modal('hide');">Batal</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade"  id="ModalTtdPemberianObatNonHigh" role="dialog">
  <div class="modal-dialog " style="width:408px;">
    <div class="modal-content">
      <div class="modal-body">
        <div id="paint_ttdPemberianObatNonHigh"></div>
      </div>
      <div class="modal-footer">
        <button onclick="takeTtdPemberianObatNonHigh();">Simpan</button>
        <button onclick="$('#ModalTtdPemberianObatNonHigh').modal('hide');">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- END TTD -->

<script type="text/javascript">
var no_rm   				= "<?php echo $rm; ?>";
var id_unit   			= "<?php echo $unit; ?>";
var id_kunjungan   	= "<?php echo $id_kunjungan; ?>";
var id_transaksi   	= "<?php echo $id_transaksi; ?>";
var ttdPemberianObatHigh    = new WPaintX('paint_ttdPemberianObatHigh'); 
var ttdPemberianObatNonHigh = new WPaintX('paint_ttdPemberianObatNonHigh'); 

$('#dacriberiobat_jenisobatId1').on('change', function() {
  if($('#dacriberiobat_jenisobatId1').val()==2){
    $("#dacriberiobat_divracik1").show();
    $("#dacriberiobat_divjadi").hide();
  }else{
    $("#dacriberiobat_divracik1").hide();
    $("#dacriberiobat_divjadi").show();
  }
});

$('#dacriberiobat2_jenisobatId2').on('change', function() {
  if($('#dacriberiobat2_jenisobatId2').val()==2){
    $("#dacriberiobat2_divracik2").show();
    $("#dacriberiobat2_divjadi").hide();
  }else{
    $("#dacriberiobat2_divracik2").hide();
    $("#dacriberiobat2_divjadi").show();
  }
});

$('#dacriberiobat_rute1').on('change', function() {
  if($('#dacriberiobat_rute1').val()==17){
    $("#dacriberiobat_divrute1").show();
  }else{
    $("#dacriberiobat_divrute1").hide();
  }
});

$('#dacriberiobat2_rute2').on('change', function() {
  if($('#dacriberiobat2_rute2').val()==17){
    $("#dacriberiobat2_divrute2").show();
  }else{
    $("#dacriberiobat2_divrute2").hide();
  }
});

$('#dacriberiobat_intruksi').on('change', function() {
  if($('#dacriberiobat_intruksi').val()==3){
    $("#dacriberiobat_divintlain").show();
  }else{
    $("#dacriberiobat_divintlain").hide();
  }
});

$('#dacriberiobat2_intruksi').on('change', function() {
  if($('#dacriberiobat2_intruksi').val()==3){
    $("#dacriberiobat2_divintlain").show();
  }else{
    $("#dacriberiobat2_divintlain").hide();
  }
});

document.getElementById("dacriberiobat_aksi1").checked='true';
$("#dacriberiobat_divint1").show();
$("#dacriberiobat_divinttgl").show();
$("#dacriberiobat_divint2").show();
$("#dacriberiobat_divint3").show();
$("#dacriberiobat_divintpj3").show();

document.getElementById("dacriberiobat2_aksi2").checked='true';
$("#dacriberiobat2_divint1").show();
$("#dacriberiobat2_divinttgl").show();
$("#dacriberiobat2_divint2").show();
$("#dacriberiobat2_divint3").show();
$("#dacriberiobat2_divintpj3").show();

daftarpemberianobat();

function showModalPemberianObatHigh() {
  showttdPemberianObatHigh();
  $('#ModalTtdPemberianObatHigh').modal('show');
}
function showModalPemberianObatNonHigh() {
  showttdPemberianObatNonHigh();
  $('#ModalTtdPemberianObatNonHigh').modal('show');
}

function showttdPemberianObatHigh(){
  ttdPemberianObatHigh.show();
}
function showttdPemberianObatNonHigh(){
  ttdPemberianObatNonHigh.show();
}

function takeTtdPemberianObatHigh() {
  document.getElementById('GambarTtdPemberianObatHigh').src=ttdPemberianObatHigh.getData();
  document.getElementById('HasilTtdPemberianObatHigh').value=ttdPemberianObatHigh.getData();
  $('#ModalTtdPemberianObatHigh').modal('hide');
}
function takeTtdPemberianObatNonHigh() {
  document.getElementById('GambarTtdPemberianObatNonHigh').src=ttdPemberianObatNonHigh.getData();
  document.getElementById('HasilTtdPemberianObatNonHigh').value=ttdPemberianObatNonHigh.getData();
  $('#ModalTtdPemberianObatNonHigh').modal('hide');
}

function daftarpemberianobat(){
  document.getElementById('bodyhistoripemberianobat').innerHTML="";
  document.getElementById('bodyhistoripemberianobathigh').innerHTML="";

  var param = {
    id_kunjungan: id_kunjungan,
    id_transaksi: id_transaksi,
  };
  apiPOST('Rekammedisirna/daftarpemberianobat', param, hasil => {
    var v='';
    var h='';
    var nonhigh = hasil['nonhigh'];
    var high = hasil['high'];

    for (var i = 0; i < nonhigh.length; i++) {
      v+='<tr>';
      v+='<td style="width: 15px">#</td>';
      v+='<td>' + nonhigh[i]['jenis_obat_far'] + '</td>';
      v+='<td>' + nonhigh[i]['nama_obat'] + '</td>';
      v+='<td style="width: 80px">' + nonhigh[i]['tgl_pemberian'] + '</td>';
      v+='<td style="width: 80px">' + nonhigh[i]['ket_waktu'] + '</td>';
      v+='</tr>';
    }
    for (var j = 0; j < high.length; j++) {
      h+='<tr>';
      h+='<td style="width: 15px">#</td>';
      h+='<td>' + high[j]['jenis_obat_far'] + '</td>';
      h+='<td>' + high[j]['nama_obat'] + '</td>';
      h+='<td style="width: 80px">' + high[j]['tgl_pemberian'] + '</td>';
      h+='<td style="width: 80px">' + high[j]['ket_waktu'] + '</td>';
      h+='</tr>';

    }

    var empty = '<tr><td colspan="5">Data Kosong</td></tr>';

    if (nonhigh.length > 0){
      document.getElementById('bodyhistoripemberianobat').innerHTML=v;
    }else{
      document.getElementById('bodyhistoripemberianobat').innerHTML=empty;
    }
    
    if (high.length > 0){
      document.getElementById('bodyhistoripemberianobathigh').innerHTML=h;
    }else{
      document.getElementById('bodyhistoripemberianobathigh').innerHTML=empty;
    }

    document.getElementById("loading_daftarpemberianobat").style.display = 'none';
  });
  document.getElementById("loading_daftarpemberianobat").style.display = 'none';
}

function Saveberiobathigh(){
  if($('#dacriberiobat2_jenisobatId2').val()==2){
    nama=$('#dacriberiobat2_jenisobatket').val();
  }else{
    nama=$('#dacriberiobat2_obatId').val();
  }
  if($('#dacriberiobat2_rute2').val()==17){
    rut=$('#dacriberiobat2_rute2lain').val();
  }else{
    rut=$('#dacriberiobat2_rute2').val();
  }
  if($('#dacriberiobat2_aksi2').checked){ ins=1;  }else{  ins=0;  }
  if($('#dacriberiobat2_intruksi').val()==3){
    kete_ins=$('#dacriberiobat2_intruksilain').val();
  }else{
    kete_ins=$('#dacriberiobat2_intruksi').val();
  }
  var param={
    id          :$('#idKunjunganermirna').val(),
    id_transaksi:$('#transaksiermirna').val(),
    tgl         :$('#dacriberiobat2_atgl').val(),
    jns_obat    :$('#dacriberiobat2_jenisobatId2').val(),
    nma_obat    :nama,
    dosis       :$('#dacriberiobat2_dosis').val(),
    ket_waktu   :$('#dacriberiobat2_jamberi').val(),
    rute        :rut,
    dokter      :$('#dacriberiobat2_apj1Id').val(),
    suster      :$('#dacriberiobat2_apj2Id2').val(),
    instruksi   :ins,
    ket_ins     :kete_ins,
    tgl_ins     :$('#dacriberiobat_aksiatgl').val(),
    dok_ins     :$('#dacriberiobat2_apj3Id').val(),
    sus_ins     :$('#dacriberiobat2_apj4Id').val(),
    ttd         :$('#HasilTtdPemberianObatHigh').val()
  }
  apiPOST('Rekammedisirna/savepemberianobathigh', param,hasil=>{
    //$('#ModalpemberianobatHigh').modal('hide');
    daftarpemberianobat();
  });
  
}
function Saveberiobat(){
  if($('#dacriberiobat_jenisobatId1').val()==2){
    nama=$('#dacriberiobat_jenisobatket').val();
  }else{
    nama=$('#dacriberiobat_obatId').val();
  }
  if($('#dacriberiobat_rute1').val()==17){
    rut=$('#dacriberiobat_rute1lain').val();
  }else{
    rut=$('#dacriberiobat_rute1').val();
  }
  if($('#dacriberiobat_aksi2').checked){  ins=1;  }else{  ins=0;  }
  if($('#dacriberiobat_intruksi').val()==3){
    kete_ins=$('#dacriberiobat_intruksilain').val();
  }else{
    kete_ins=$('#dacriberiobat_intruksi').val();
  }
  var param={
    id          :$('#idKunjunganermirna').val(),
    id_transaksi:$('#transaksiermirna').val(),
    tgl         :$('#dacriberiobat_atgl').val(),
    jns_obat    :$('#dacriberiobat_jenisobatId1').val(),
    nma_obat    :nama,
    dosis       :$('#dacriberiobat_dosis').val(),
    ket_waktu   :$('#dacriberiobat_jamberi').val(),
    rute        :rut,
    dokter      :$('#dacriberiobat_apj1Id1').val(),
    suster      :$('#dacriberiobat_apj2Id1').val(),
    instruksi   :ins,
    ket_ins     :kete_ins,
    tgl_ins     :$('#dacriberiobatnonhigh_aksiatgl').val(),
    dok_ins     :$('#dacriberiobat_apj3Id').val(),
    sus_ins     :$('#dacriberiobat_apj4Id').val(),
    ttd         :$('#HasilTtdPemberianObatHigh').val()
  }
  apiPOST('Rekammedisirna/savepemberianobatnonhigh', param,hasil=>{
    //$('#Modalpemberianobat').modal('hide');
    daftarpemberianobat();
  });
}

function viewDftarberiobat(){
  var param = {
    obatcari: document.getElementById("dacriberiobat_jenisId").value,
  };

  $('#Modalpemberianobat').modal('show');
  document.getElementById('dacriberiobat_id1').value=data.id_kunjungans;

  apiPOST('Rekammedisirna/searchDokter', data.id_unit, hasil => {
    var dok = "<option value='0'> - Silahkan Pilih -</option>";
    var a = hasil['data'];
    for (var i = 0; i < a.length; i++) {
      dok += '<option value="' + a[i]['id_pegawai'] + '">' + a[i]['nama_pegawai'] + '</option>';
    }
    document.getElementById('dacriberiobat_apj1Id1').innerHTML = dok;
    document.getElementById('dacriberiobat_apj3Id').innerHTML = dok;
  })
  apiPOST('Rekammedisirna/searchPerawat', data.id_unit, hasil => {
    var sus = "<option value='0'> - Silahkan Pilih -</option>";
    var a = hasil['data'];
    for (var i = 0; i < a.length; i++) {
      sus += '<option value="' + a[i]['id_pegawai'] + '">' + a[i]['nama_pegawai'] + '</option>';
    }
    document.getElementById('dacriberiobat_apj2Id1').innerHTML = sus;
    document.getElementById('dacriberiobat_apj4Id').innerHTML = sus;
  })
  apiPOST('Apotek/getObat_eresep', param, hasil => {
    var bat = "<option value='0'> - Silahkan Pilih -</option>";
    var a = hasil['data'];
    for (var i = 0; i < a.length; i++) {
      bat += '<option value="' + a[i]['kd_obat'] + '">' + a[i]['nama_obat'] + '</option>';
    }
    document.getElementById('dacriberiobat_obatId').innerHTML = bat;
  })
}

function viewDftarberiobatHigh(){
  var param = {
    obatcari: document.getElementById("dacriberiobat2_jenisId").value,
  };
  $('#Modalpemberianobathigh').modal('show');
  document.getElementById('dacriberiobat2_id').value=data.id_kunjungans;
  apiPOST('Rekammedisirna/searchDokter', data.id_unit, hasil => {
    var dok = "<option value='0'> - Silahkan Pilih -</option>";
    var a = hasil['data'];
    for (var i = 0; i < a.length; i++) {
      dok += '<option value="' + a[i]['id_pegawai'] + '">' + a[i]['nama_pegawai'] + '</option>';
    }
    document.getElementById('dacriberiobat2_apj1Id').innerHTML = dok;
    document.getElementById('dacriberiobat2_apj3Id').innerHTML = dok;
  })
  apiPOST('Rekammedisirna/searchPerawat', data.id_unit, hasil => {
    var sus = "<option value='0'> - Silahkan Pilih -</option>";
    var a = hasil['data'];
    for (var i = 0; i < a.length; i++) {
      sus += '<option value="' + a[i]['id_pegawai'] + '">' + a[i]['nama_pegawai'] + '</option>';
    }
    document.getElementById('dacriberiobat2_apj2Id2').innerHTML = sus;
    document.getElementById('dacriberiobat2_apj4Id').innerHTML = sus;
  })
  apiPOST('Apotek/getObat_eresep', param, hasil => {
    var bat = "<option value='0'> - Silahkan Pilih -</option>";
    var a = hasil['data'];
    for (var i = 0; i < a.length; i++) {
      bat += '<option value="' + a[i]['kd_obat'] + '">' + a[i]['nama_obat'] + '</option>';
    }
    document.getElementById('dacriberiobat2_obatId').innerHTML = bat;
  })
}

function dismiss_modallistobat() {
  $('#Modalpemberianobat').modal('hide');
  $('.modal-backdrop').hide();
}

function dismiss_modallistobathigh() {
  $('#Modalpemberianobathigh').modal('hide');
  $('.modal-backdrop').hide();
}

</script>