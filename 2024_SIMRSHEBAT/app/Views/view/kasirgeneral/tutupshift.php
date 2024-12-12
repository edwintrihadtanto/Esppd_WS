<div class="col-md-12 p-2">
  <div class="card card-outline card-danger">
    <div class="overlay-wrapper" id="loading_tutup_shift">

      <div class="overlay">
        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
      </div>
    </div>
    <form id='pencariankasir'>
      <div class="card-body p-2 darkgrey-custom" id="DivCariPasienKasir">
        <div class="row row-custom">
          <div class="col-sm-auto">
            <div class="form-group">

            </div>
          </div>

          <div class="col-md-6 col-sm-6 col-12 p-1">
                        <div class="info-box mb-0">
                          <table class="table table-striped table-sm" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                              <tr>
                                <td width="70">Saat ini Shift</td>
                                <td>:</td>
                                <td>
                                <input type="number" class="form-control form-control-xs" id="shift_yg_ditutup" name="shift_yg_ditutup" placeholder="shift yang mau ditutup" readonly>
                                </td>
                              </tr>
                              <tr>
                                <td>Shift Selanjutnya</td>
                                <td>:</td>
                                <td>
                                <input type="number" class="form-control form-control-xs" id="shift_selanjutnya" name="shift_selanjutnya" placeholder="shift selanjutnya" readonly>
                                </td>
                              </tr>
                              <tr>
                                <td>Tanggal</td>
                                <td>:</td>
                                <td>
                                <input type="text" class="form-control form-control-xs" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric" id="tgltutupshiftkasir" name="tgltutupshiftkasir" value="" placeholder="dd/mm/yyyy" readonly>
                                </td>
                              </tr>
                              <tr>
                                <td>Jam</td>
                                <td>:</td>
                                <td>
                                <input type="text" class="form-control form-control-xs" id="jamtutupshiftkasir" name="jamtutupshiftkasir" placeholder="shift selanjutnya" readonly>
                                </td>
                              </tr>
                              <tr>
                                <td colspan="3">
                                <button type="button" class="btn btn-success btn-sm float-right" onclick="savetutupshift();"> Tutup Shift</button>

                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
        </div>
      </div>
  </div>

</div>

<script type="text/javascript">
  $(document).ready(function() {
    lihatshifkasir();
   

    // time();
    // unit();
    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', {
      'placeholder': 'dd/mm/yyyy'
    })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', {
      'placeholder': 'mm/dd/yyyy'
    })
    //Money Euro
    $('[data-mask]').inputmask()
  });

  function lihatshifkasir(idbayar) {
    var today = new Date();
    //alert(today);
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    tgl = dd + '/' + mm + '/' + yyyy; // in   "mm/dd/yyyy" format
    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    document.getElementById('tgltutupshiftkasir').value = tgl;
    document.getElementById('jamtutupshiftkasir').value = time;
    apiPOST('Kasirgeneral/lihatshifkasir', null, hasil => {
      var a = hasil['data'];
      var shiftsekarang = a;
      if(shiftsekarang==3 || shiftsekarang=='3'){
        shiftselanjutnya = 1;
      }
      else{
        var shiftselanjutnya = setInt(shiftsekarang) + 1;
      }
      document.getElementById('shift_yg_ditutup').value = shiftsekarang;
      document.getElementById('shift_selanjutnya').value = shiftselanjutnya;
      $('#loading_tutup_shift').hide();


    });
  }

  function savetutupshift(){
    var shiftsaatini = $('#shift_yg_ditutup').val();
    var shifselanjutnya =$('#shift_selanjutnya').val();
    var tanggalshift = $('#tgltutupshiftkasir').val();
    var jamshift = $('#jamtutupshiftkasir').val();
    var user = JSON.parse(localStorage['data_user']);
    var id_user = user['id_user'];

    pertanyaan.fire({
      title: 'Pergantian Shift',
      html: '<span>Ganti Shift ' + shiftsaatini + ' ke Shift' + shifselanjutnya + ' , Apakah Anda Yakin ?</span>',
      icon: 'question',
      showCancelButton: true,
      reverseButtons: false,
      allowOutsideClick: false
    }).then((result) => {
      if (result.isConfirmed) {
        var param = {
          val_shiftsaatini: shiftsaatini,
          val_shifselanjutnya : shifselanjutnya,
          val_tanggalshift : tanggalshift,
          val_jamshift : jamshift,
          val_id_user : id_user
        };
        apiPOST('Kasirgeneral/Kasir_pergantianshift', param, hasil => {
          lihatshifkasir();
          // $("body").find("#" + id).remove();
        });
      } else if (result.dismiss === Swal.DismissReason.cancel) {

      }
    })

  }
</script>