<div class="content modal fade" id="modal_Pembayaran_RWIkasir">
  <div class="container-fluid ">
    <div class="row">
      <!-- <div class="modal fade" id="modal_Pembayaran_RWIkasir"> -->            
      <div class="col-md-12">
        <div class="form-group">
          <div>
            <div class="modal-dialog">
              <div class="modal-content" style="overflow: auto;">
                <div class="card-header">
                  <h5>Pembayaran Kasir Rawat Inap
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  </button>
                  </h5>
                </div>
                <div class="modal-body">
                  <div class="row" >
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Tgl. Transaksi :</label>
                        <input type="date" class="form-control form-control-sm">
                      </div>
                    </div>
                    <div class="col-sm-auto">
                      <div class="form-group">
                        <label>No. Transaksi :</label>
                        <input type="text" class="form-control form-control-sm">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>No. RM :</label>
                        <input type="text" class="form-control form-control-sm">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Nama Pasien:</label>
                        <input type="text" class="form-control form-control-sm">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Pembayaran</label>                    
                        <select class="form-control form-control-sm">
                          <option>Umum</option>
                          <option>Asuransi</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Jenis Penjamin</label>                    
                        <select class="form-control form-control-sm">
                          <option>BPJS PBI</option>
                          <option>BPJS NON PBI</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>SEP</label>
                        <input type="text" class="form-control form-control-sm">
                      </div>                      
                    </div>

                  </div>

                  <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="content-mod-PembayaranRWIKasir1" data-toggle="pill" href="#content-mod-PembayaranRWIKasir-summary" role="tab" aria-controls="content-mod-PembayaranRWIKasir-summary" aria-selected="true">Summary Bayar</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="content-mod-PembayaranRWIKasir2" data-toggle="pill" href="#content-mod-PembayaranRWIKasir-detail" role="tab" aria-controls="content-mod-PembayaranRWIKasir-detail" aria-selected="false">Detail Bayar</a>
                    </li>
                  </ul>                  
                  <div class="tab-content" id="custom-content-above-tabContent">
                    <div class="tab-pane fade active show" id="content-mod-PembayaranRWIKasir-summary" role="tabpanel" aria-labelledby="content-mod-PembayaranRWIKasir1">
                      <div class="tab-custom-content">
                        <p class="lead mb-0"><button type="button" class="btn btn-sm btn-info"><i class="fa fa-save"></i> Simpan</button>
                        Shift Aktif : 3</p>
                      </div>                                              
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Total Tagihan</label>
                        <label class="col-sm-auto col-form-label">:</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control form-control-sm">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Sudah Bayar</label>
                        <label class="col-sm-auto col-form-label">:</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control form-control-sm">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Sisa Tagihan</label>
                        <label class="col-sm-auto col-form-label">:</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control form-control-sm">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Total Bayar</label>
                        <label class="col-sm-auto col-form-label">:</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control form-control-sm">
                        </div>
                      </div>
                      
                    </div>
                    <div class="tab-pane fade" id="content-mod-PembayaranRWIKasir-detail" role="tabpanel" aria-labelledby="content-mod-PembayaranRWIKasir2">
                      <div class="tab-custom-content">
                        <p class="lead mb-0"><button type="button" class="btn btn-sm btn-info" id="bayar_RWIKAsir"><i class="fa fa-save"></i> Bayar</button>
                        Shift Aktif : 3</p>
                      </div>
                      <table id="tableDetailBayar_modal_PembayaranRWIkasir" class="table table-striped table-sm choose" style="border-collapse: inherit;">
                        <thead>
                          <tr>
                            <th width="5">#</th>
                            <th>Nama Produk</th>
                            <th width="100">Qty</th>                
                            <th width="100">Harga</th>
                            <th width="100">Tunai</th>
                          </tr>
                        </thead>
                        <tbody></tbody>
                      </table> 
                    </div>
                  </div>

                </div>
              </div>              
              <!-- /.modal-content -->
            </div>
          </div>
        </div>
      </div>
      

    </div>    
  </div>
</div>

<script type="text/javascript">  
$('#loading_modal_Pembayaran_RWIkasir').hide();
$("#modal_Pembayaran_RWIkasir").modal({backdrop: "static"});
$('#modal_Pembayaran_RWIkasir').on('shown.bs.modal', function () {

})  

tampilkanDetailBayar_modPembayaranRWIKasir();

function tampilkanDetailBayar_modPembayaranRWIKasir(){  
  var Baris = '<tr>';
  for (var i = 0; i < 5; i++) {
    var no = i+1;
        Baris += '<td>'+no+'</td>';
        Baris += '<td>'+no+'-Feb-2023</td>';
        Baris += '<td>000'+no+'</td>';
        Baris += '<td>Unit '+no+'</td>';
        Baris += '<td>kdProduk'+no+'</td>';
      Baris += "</tr>";
  }
  $('#tableDetailBayar_modal_PembayaranRWIkasir tbody').append(Baris);
}

$("#bayar_RWIKAsir").click(function(){
  BarisBaru_HistoryRWIKasir();
});

</script>