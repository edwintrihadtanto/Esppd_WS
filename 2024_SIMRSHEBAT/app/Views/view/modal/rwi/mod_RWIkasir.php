<div class="content modal fade" id="modal_RWIkasir">
  <div class="container-fluid ">
    <div class="row">
      <!-- <div class="modal fade" id="modal_RWIkasir"> -->      
      <div class="col-md-10">
        <div class="form-group">
          <div>
            <div class="modal-dialog modal-xl">
              <div class="modal-content" style="height: 22rem; max-height: 22rem; overflow: auto;">
                <div class="card-header p-1 darkgrey-custom">
                  <h6 class="hr6-custom"><i class="fas fa-hospital-user"></i> Tindakan yang diberikan</h6>
                  <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="tamp_dtlBayarKasirRWI()"><i class="fa fa-pencil-alt"></i> Pembayaran</button>
                  <button type="button" class="btn bg-gradient-danger btn-xs"><i class="fa fa-times"></i> Tutup Transaksi</button>                  
                  <div class="btn-group">
                    <button type="button" class="btn bg-gradient-info btn-xs"><i class="fa fa-pencil-alt"></i> Bayar lain</button>
                    <button type="button" class="btn bg-gradient-info btn-xs dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                      <span class="sr-only"></span>
                    </button>
                    <div class="dropdown-menu" role="menu" style="">
                      <a class="dropdown-item" href="#">Transfer</a>
                      <a class="dropdown-item" href="#">Deposit</a>
                      <a class="dropdown-item" href="#">Diskon</a>          
                    </div>
                  </div>                  

                  <div class="btn-group">        
                    <div class="btn-group">
                      <button type="button" class="btn bg-gradient-info btn-xs"><i class="fa fa-pencil-alt"></i> Kamar</button>
                      <button type="button" class="btn bg-gradient-info btn-xs dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                        <span class="sr-only"></span>
                      </button>
                      <div class="dropdown-menu" role="menu" style="">
                        <a class="dropdown-item" href="#">Pindah Kamar</a>
                        <a class="dropdown-item" href="#">Ganti Kamar</a>
                        <a class="dropdown-item" href="#">History Pindah Kamar</a>    
                      </div>
                    </div>
                    <div class="btn-group">
                      <button type="button" class="btn bg-gradient-navy btn-xs"><i class="fa fa-pencil-alt"></i> Update Data</button>
                      <button type="button" class="btn bg-gradient-navy btn-xs dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                        <span class="sr-only"></span>
                      </button>
                      <div class="dropdown-menu" role="menu" style="">
                        <a class="dropdown-item" href="#">Ganti Dokter</a>
                        <a class="dropdown-item" href="#">Ganti Kelompok Pasien</a>            
                      </div>
                      <button type="button" class="btn bg-gradient-warning btn-xs"><i class="fa fa-print"></i> Cetak</button>
                    </div>
                  </div>

                </div>
                <div class="modal-body p-1">
                  <table id="tabletindakan_modal_RWIkasir" class="table table-striped table-sm choose" style="border-collapse: inherit;">
                    <thead>
                      <tr>
                        <th width="10">#</th>
                        <th width="100">Tgl. Transaksi</th>
                        <th width="90">No. Faktur</th>                
                        <th width="100">Unit</th>
                        <th width="100">Kd Produk</th>
                        <th width="150">Nma Produk</th>
                        <th>Dokter</th>
                        <th width="30">Qty</th>
                        <th width="100">Tarif</th>
                        <th width="80">Folio</th>
                        <th width="20">Act</th>
                      </tr>
                    </thead>
                    <tbody></tbody>
                  </table> 
                </div>            
              </div>
              <!-- /.modal-content -->
            </div>
          </div>
        </div>

        <div class="form-group">
          <div>
            <div class="modal-dialog modal-xl">
              <div class="modal-content" style="height: 13rem; max-height: 13rem; overflow: auto;">
                <div class="modal-body p-1">
                 <div class="card-header p-1 darkgrey-custom">
                  <h6 class="hr6-custom"><i class="fas fa-hospital-user"></i> History Pembayaran</h6>
                 </div>
                  <table id="tablehistory_modal_RWIkasir" class="table table-striped table-sm choose" style="border-collapse: inherit;">
                    <thead>
                      <tr>
                        <th width="10">#</th>
                        <th width="150">Urut Bayar</th>
                        <th width="100">Tgl. Bayar</th>
                        <th width="90">No. Transaksi</th>                
                        <th width="100">Shift</th>
                        <th width="100">Kd Unit</th>                    
                        <th>Pembayaran</th>
                        <th width="100">Jumlah</th>
                        <th width="100">Petugas</th>
                        <th width="25">Act</th>
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
      <div class="col-md-2">
        <div class="form-group">
          <div>
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-body p-2">
                  <h6><u>Informasi Pasien</u>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  </button>
                  </h6>
                  <table class="table table-striped table-sm" border="0" style="margin:0px;size:100%">
                  <tr>
                    <td>Tgl. Kunjung</td><td>:</td><td>21-Feb-2023</td>
                  </tr>
                  <tr>
                    <td>No. RM</td><td>:</td><td>000002</td>
                  </tr>
                  <tr>
                    <td>Nama Pasien</td><td>:</td><td>Tn. Edwin Tri H.</td>
                  </tr>
                  <tr>
                    <td>Penjamin</td><td>:</td><td>BPJS NON PBI</td>
                  </tr>
                </table>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
          </div>
          <div>
            <div class="modal-dialog modal-xl">
              <div class="modal-content">            
                <div class="modal-body p-2">
                  <div class="btn-group-vertical" style="width: 100%;">
                    <button type="button" class="btn bg-gradient-info btn-sm" id="tmbhTindakan_RWIKAsir" style="text-align: start;"><i class="fa fa-plus"></i> Tambah Tindakan</button>
                    <!-- <button type="button" class="btn bg-gradient-danger btn-sm" id="hapusTindakan_RWIKAsir" style="text-align: start;"><i class="fa fa-times"></i> Hapus Tindakan</button> -->
                    <button type="button" class="btn bg-gradient-success btn-sm" id="previewTindakan_RWIKAsir" style="text-align: start;"><i class="fa fa-eye"></i> Preview Billing</button>
                    <div class="btn-group">
                      <button type="button" class="btn bg-gradient-secondary btn-sm" style="text-align: start;"><i class="fa fa-pencil-alt"></i> Produk</button>
                      <button type="button" class="btn bg-gradient-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                        <span class="sr-only"></span>
                      </button>
                      <div class="dropdown-menu" role="menu" style="">
                        <a class="dropdown-item" href="#">LookUp Produk</a>
                        <a class="dropdown-item" href="#">Produk Manual</a>
                      </div>
                    </div>
                    <div class="input-group" style="display: flex; flex-wrap: nowrap; width: 100%; flex-direction: row;">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <input type="checkbox">
                        </span>
                      </div>
                      <select class="bg-gradient-secondary form-control-sm" style="width: 100%;">
                        <option>Daftar Kamar</option>
                        <option>Kamar 1</option>
                        <option>Kamar 2</option>
                        <option>Kamar 3</option>                    
                      </select>
                    </div>
                    <div class="input-group" style="display: flex; flex-wrap: nowrap; width: 100%; flex-direction: row;">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <input type="checkbox">
                        </span>
                      </div>
                      <select class="bg-gradient-secondary form-control-sm" style="width: 100%;">
                        <option>Daftar Perawat</option>
                        <option>Perawat 1</option>
                        <option>Perawat 2</option>
                        <option>Perawat 3</option>
                      </select>
                    </div>
                    <div class="input-group" style="display: flex; flex-wrap: nowrap; width: 100%; flex-direction: row;">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <input type="checkbox">
                        </span>
                      </div>
                      <select class="bg-gradient-secondary form-control-sm" style="width: 100%;">
                        <option>Daftar Dokter</option>
                        <option>Dokter 1</option>
                        <option>Dokter 2</option>
                        <option>Dokter 3</option>
                      </select>
                    </div>

                  </div>

                </div>
                <!-- <div class="modal-footer justify-content-between">
                  <button type="button" class="btn bg-gradient-danger btn-sm" onclick="keluarmodal_RWIkasir();"><i class="fa fa-reply"></i> Tutup</button>
                </div> -->
              </div>
              <!-- /.modal-content -->
            </div>
          </div>
          <!-- <div>
            <div class="modal-dialog modal-xl">
              <div class="modal-content">            
                <div class="modal-body">
                  <div class="btn-group-vertical" style="width: 100%;">
                    <button type="button" class="btn bg-gradient-danger btn-sm" style="text-align: start;"><i class="fa fa-times"></i> Hapus Pembayaran</button>                
                  </div>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-danger btn-sm" onclick="keluarmodal_RWIkasir();"><i class="fa fa-reply"></i> Kembali</button>
                </div>
              </div>          
            </div>
          </div> -->
        </div>  
      </div>    

    </div>
    <div class="mod_onmod_KasirRWI"></div>
  </div>
</div>

<script type="text/javascript">  
$('#loading_modal_RWIkasir').hide();

$("#modal_RWIkasir").modal({backdrop: "static"});
$('#modal_RWIkasir').on('shown.bs.modal', function () {

})  

tampilkan_isi_tindakan();
tampilkan_isi_history();

function keluarmodal_RWIkasir(){
  $('#modal_RWIkasir').modal('hide');
  $('.modal-backdrop').hide();
}

function tampilkan_isi_tindakan(){  
  var Baris = '<tr>';
  for (var i = 0; i < 6; i++) {
    var no = i+1;
        Baris += '<td>'+no+'</td>';
        Baris += '<td>'+no+'-Feb-2023</td>';
        Baris += '<td>000'+no+'</td>';
        Baris += '<td>Unit '+no+'</td>';
        Baris += '<td>kdProduk'+no+'</td>';
        Baris += '<td>Biaya Obat Transfer'+no+'</td>';
        Baris += '<td>dr. Joko Islami</td>';
        Baris += '<td>'+(no+5)+'</td>';
        Baris += '<td>Rp. '+no+'000</td>';
        Baris += '<td></td>';
        Baris += '<td onclick="hapusTindakan_RWIKAsir()"><i class="fa fa-times" style="color:darkred; font-size:15px;"></i></td>';
      Baris += "</tr>";
  }
  $('#tabletindakan_modal_RWIkasir tbody').append(Baris);
}

function tampilkan_isi_history(){  
  var Baris = '<tr>';
  for (var i = 0; i < 3; i++) {
    var no = i+1;
        Baris += '<td>'+no+'</td>';
        Baris += '<td>UrutBayar '+no+'</td>';
        Baris += '<td>'+no+'-Mar-2023</td>';
        Baris += '<td>0232'+no+'</td>';
        Baris += '<td>Shift '+no+'</td>';
        Baris += '<td>Unit '+no+'</td>';
        Baris += '<td>Bayar Sandal</td>';
        Baris += '<td>Rp. 19'+no+'</td>';
        Baris += '<td>Edwin Tri H.</td>';
        Baris += '<td><i class="fa fa-times" style="color:darkred; font-size:15px;"></i></td>';
      Baris += "</tr>";
  }
  $('#tablehistory_modal_RWIkasir tbody').append(Baris);
}

function tamp_modonmodKasirRWI(){
 $('.mod_onmod_KasirRWI').load('Rawatjalan/mod_PembayaranRWIkasir');
}

function BarisBaru_TindakanRWIKasir(){
 var Nomor = $('#tabletindakan_modal_RWIkasir tbody tr').length + 1;
 var Baris = "<tr>";
     Baris += "<td>"+Nomor+"</td>";
     Baris += "<td><input type='text' class='form-control form-control-sm' ></td>";
     Baris += "<td><input type='text' class='form-control form-control-sm' ></td></td>";
     Baris += "<td><input type='text' class='form-control form-control-sm' ></td></td>";
     Baris += "<td><input type='text' class='form-control form-control-sm' ></td></td>";
     Baris += "<td><input type='text' class='form-control form-control-sm' ></td></td>";
     Baris += "<td><input type='text' class='form-control form-control-sm' ></td></td>";
     Baris += "<td><input type='text' class='form-control form-control-sm' ></td></td>";
     Baris += "<td><input type='text' class='form-control form-control-sm' ></td></td>";
     Baris += "<td><input type='text' class='form-control form-control-sm' ></td></td>";
    Baris += "</tr>";
 $('#tabletindakan_modal_RWIkasir tbody').append(Baris);
 
 $('#tabletindakan_modal_RWIkasir tbody tr').each(function() {
   $(this).find('td:nth-child(2) input').focus();
 });
}

function BarisBaru_HistoryRWIKasir() {
    var no = $('#tablehistory_modal_RWIkasir tbody tr').length + 1;
    var Baris = "<tr>";        
        Baris += '<td>'+no+'</td>';
        Baris += '<td>UrutBayar '+no+'</td>';
        Baris += '<td>'+no+'-Mar-2023</td>';
        Baris += '<td>0232'+no+'</td>';
        Baris += '<td>Shift '+no+'</td>';
        Baris += '<td>Unit '+no+'</td>';
        Baris += '<td>Bayar Sandal</td>';
        Baris += '<td>Rp. 19'+no+'</td>';
        Baris += '<td>Edwin Tri H.</td>';
        Baris += '<td><i class="fa fa-times" style="color:darkred; font-size:15px;"></i></td>';
       Baris += "</tr>";
    $('#tablehistory_modal_RWIkasir tbody').append(Baris);

    // $('#tablehistory_modal_RWIkasir tbody tr').each(function() {
    //   $(this).find('td:nth-child(2) input').focus();
    // });
}

$("#tmbhTindakan_RWIKAsir").click(function(){
  BarisBaru_TindakanRWIKasir();
});

function hapusTindakan_RWIKAsir(){
 alert("Hapus Tindakan!!");
}

$("#previewTindakan_RWIKAsir").click(function(){
  
});

</script>