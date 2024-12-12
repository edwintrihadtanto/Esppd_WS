<div class="content modal fade" id="IGDmodal_lap_pendapatan">
  <div class="container-fluid ">
    <div class="row">

      <div class="col-md-12">
        <div class="form-group">
          <div>
            <div class="modal-dialog">
              <div class="modal-content" style="overflow: auto;">
                <div class="card-header">
                  <h5>Laporan Jasa Dokter
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </h5>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Tgl. Awal</label>
                        <input type="date" id="tglawal" name="tglawal" class="form-control form-control-sm">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Tgl. Akhir</label>
                        <input type="date" id="tglakhir" name="tglakhir" class="form-control form-control-sm">
                      </div>
                    </div>

                    
                    <div class="col-sm-6">
                      <label>Nama</label>
                      <div class="form-group">
                        <select name="id_pegawai_lap_jasa" id="id_pegawai_lap_jasa" class="form-control form-control-xs"></select>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <label>Status Transaksi</label>
                      <div class="form-group">
                        <select name="status_transaksi" id="status_transaksi" class="form-control form-control-xs">
                          <option value="0"> - Semua - </option>
                          <option value="1"> Transaksi Selesai </option>
                          <option value="2"> Transaksi Belum Selesai </option>

                        </select>
                      </div>
                    </div>

                   
                  </div>
                  <p class="lead mb-0"><button type="button" class="btn btn-sm btn-info" onclick="lihatlaporanjasadokter()"><i class="fa fa-save"></i> Cari</button></p>
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
  $(document).ready(function() {
    tampil_pegawai();
    $('#datemask').inputmask('dd/mm/yyyy', {
      'placeholder': 'dd/mm/yyyy'
    })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', {
      'placeholder': 'mm/dd/yyyy'
    })
    //Money Euro
    $('[data-mask]').inputmask()

    $("#IGDmodal_lap_pendapatan").modal({
      backdrop: "static"
    });

    var today = new Date();
    //alert(today);
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    tglsekarang = dd + '/' + mm + '/' + yyyy; // in   "mm/dd/yyyy" format
    // var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    document.getElementById('tglawal').value = tglsekarang;
    document.getElementById('tglakhir').value = tglsekarang;
  })

  function tampil_pegawai() {
    apiPOST('Laporan/pegawai', null, hasil => {
      var dar = "<option value='all'>  Semua  </option>";
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        dar += '<option value="' + a[i]['id_pegawai'] + '">' + a[i]['nama_pegawai'] + '</option>';
      }
      document.getElementById('id_pegawai_lap_jasa').innerHTML = dar;
    });
  }



  // $(document).on("click", ".cetakkwitansi", function() {
  function lihatlaporanjasadokter() {
    var tglawal = $("#tglawal").val();
    var tglakhir = $("#tglakhir").val();
    var status_transaksi = $("#status_transaksi").val();
    var idpeg = $("#id_pegawai_lap_jasa").val();
    var param = {
      tglawal: tglawal,
      tglakhir: tglakhir,
      statustransaksi:status_transaksi,
      id_pegawai_lap_jasa:idpeg
    };
    newTabPOST('API/Laporan/lapjasa', param);
    return;
  };


</script>