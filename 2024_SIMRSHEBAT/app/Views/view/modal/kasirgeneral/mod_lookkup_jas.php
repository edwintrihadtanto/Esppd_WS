<div class="content modal fade" id="mod_lookkup_jas" style="margin-left: 180px;">
  <div class="container-fluid ">
    <div class="row" style="margin-top:-40px">
      <!-- content kanan -->
      <div class="col-md-8" style="margin-top: 20px;margin-bottom: 0px;">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-body">
              <!-- detail transaksi -->
              <div class="row">
                <div class="col-md-12" style="margin-top: 0px;margin-bottom: 0px;">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>



                  <div class="card card-outline card-danger col-md-12">
                    <div style="max-height: 12rem; overflow: auto;">
                      <table class="table table-bordered table-hover table-sm" id='tablehistory_lokup_componen'>
                        <thead>
                          <tr>
                            <th style="width:10px;">No</th>
                            <th style="width:15px;">Component Tarif</th>
                            <th style="width:20px;">kalkulasi</th>
                            <th style="width:60px;">Tarif</th>
                            <th style="width:25px;">Pegawai</th>
                            <th style="width:10px;"></th>
                            <th style="width:25px;">Diskon%</th>
                            <th style="width:60px;">Jumlah</th>
                          </tr>
                        </thead>
                        <tbody id='listlookup_componen'>
                        </tbody>
                      </table>
                    </div>
                    <div>

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

<!-- //menu kiri -->


<script type="text/javascript">
  $(document).ready(function() {



    //tampil_idpegawaidetail();
    $('#loading_kasir_mod').hide();
    // var MyTable = $('#tablehistory_lokup_componen').dataTable({
    //   "paging": false,
    //   "lengthChange": true,
    //   "searching": false,
    //   "ordering": false,
    //   "info": false,
    //   "autoWidth": false
    // });

    // function refresh() {
    //   MyTable = $('#tablehistory_lokup_componen').dataTable();
    // }

    //tampil_produk();
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
    $('[data-mask]').inputmask();



  });
  tampilkan_isi_component();


  function tampil_idpegawaidetail(idjeniscomp, idpeg, iddetailtran) {
    var param = {
      idjeniscomponent: idjeniscomp,
      idpegawai: idpeg,
      iddetailtransaksi: iddetailtran
    };
    apiPOST('Kasirgeneral/pegawaibyid', param, hasil => {
      var peg = "<option value=''> * Pilih Pegawai </option>";
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        peg += '<option value="' + a[i]['id_pegawai'] + '||' + iddetailtran + '||' + idjeniscomp + '">' + a[i]['nama_pegawai'] + '</option>';
      }
      var tes = document.getElementById('idpegcomponen' + idjeniscomp + '').innerHTML = peg;
      if (tes) {
        valueselected(idjeniscomp, idpeg, iddetailtran);
      }

      $('#idpegcomponen' + idjeniscomp + '').on('change', function() {
        var valueselected = this.value;
        var arrvalueselectedvalue = valueselected.split('||');
        var valueidpeg = arrvalueselectedvalue[0]; //idpeg
        var valueiddetailtransaksi = arrvalueselectedvalue[1]; //iddetailtransaksi
        var valueidjeniscomponent = arrvalueselectedvalue[2]; //idjeniskomponen
        //alert(valueidpeg + valueiddetailtransaksi + valueidjeniscomponent);
        // var validpenjaminkasir = $("#idpenjaminkasir").val();

        var listParam = [
          'valueidpeg', 'valueiddetailtransaksi', 'valueidjeniscomponent'
        ];
        var param = {
          valueidpeg: valueidpeg,
          valueiddetailtransaksi: valueiddetailtransaksi,
          valueidjeniscomponent: valueidjeniscomponent
        };
        apiPOST("Kasirgeneral/updatedetailcomponentpeg", param, hasil => {
          if (hasil['data'] !== null) {
            //alert('tes');
            if (hasil['code'] == 'XX') {
              toastr.error('Gagal Silahkan Ulangi Lagi');
            } else {
              //
              tampilkan_isi_component();
              tampilkan_isi_tindakan();
            }
          }
          //
        }, listParam);

      });

    });
  };



  function valueselected(idjeniscomp, idpeg, iddetailtran) {
    document.getElementById('idpegcomponen' + idjeniscomp + '').value = "" + idpeg + "||" + iddetailtran + "||" + idjeniscomp + "";
  }

  function tampilkan_isi_component() {
    var viddetailtransaksi = <?php echo $data ?>;
    var listParam = [
      'iddetailtransaksi'
    ];
    var param = {
      id_detailtransaksi: viddetailtransaksi,
    };
    apiPOST("Kasirgeneral/selectdetailcomponent", param, hasil => {
      if (hasil['data'] !== null) {
        //alert('tes');
        if (hasil['code'] == 'XX') {
          toastr.error('Data Tidak ditemukan');
        }
        var Baris = '';
        var a = hasil['data'];
        for (var i = 0; i < a.length; i++) {
          // alert(a[i].tgl_transaksi);
          var no = i + 1;
          Baris += '<tr id="baris' + no + '" >';
          Baris += '<td>' + no + '</td>';
          Baris += '<td>' + a[i].jenis_component + '</td>';
          Baris += '<td>' + a[i].operator + '</td>';

          // Baris += '<td>' + format_ribuan(a[i].harga) + ' </td>';
          if (a[i].edit == "t") {
            Baris += '<td><input type="number" class="form-control form-control-xs" name="ubahcompharga[]" id="ubahcompharga' + a[i].id_detail_transaksi + a[i].id_jenis_component + '" value="' + a[i].harga_asli + '" data-id="' + a[i].id_detail_transaksi + '" data-id1="' + a[i].id_jenis_component + '"></td>';
            Baris += '<td><div><select class="form-control form-control-xs selectidpeg" name="idpegcomponen' + a[i].id_jenis_component + '" id="idpegcomponen' + a[i].id_jenis_component + '" style="width: 100%;"></select> </div></td>';
            Baris += '<td><button type="button" class="btn btn-xs btn-outline-danger buttondeletepegawairj" id="mod_deletepegawairj" onclick="kasirdeletejasaidpegawai('+ a[i].id_jenis_component +','+ a[i].id_detail_transaksi +')"  "><i class="fa fa-trash"></i></button></td>';
            Baris += '<td><input type="number" min="1" max="3" class="form-control form-control-xs" name="diskonpersencomp[]" id="diskonpersencomp' + a[i].id_jenis_component + '" value="' + a[i].diskon_persen + '"  data-id="' + a[i].id_detail_transaksi + '" data-id1="' + a[i].id_jenis_component + '" placehoder="0" > <div> Rp.' + format_ribuan(a[i].diskon_rupiah) + '</div></td>';
            Baris += '<td><input type="text" class="form-control form-control-xs" name="totalubahcompharga[]" id="totalubahcompharga' + a[i].id_jenis_component + '" value="' + format_ribuan(a[i].harga) + '"  data-id="' + a[i].id_detail_transaksi + '" data-id1="' + a[i].id_jenis_component + '" readonly> </td>';

          } else {
            Baris += '<td><input type="number" class="form-control form-control-xs" name="ubahcomphargax[]" id="ubahcomphargax' + a[i].id_detail_transaksi + a[i].id_jenis_component + '" value="' + a[i].harga_asli + '" data-id="' + a[i].id_detail_transaksi + '" data-id1="' + a[i].id_jenis_component + '"></td>';
            Baris += '<td><div><select class="form-control form-control-xs selectidpeg" name="idpegcomponen' + a[i].id_jenis_component + '" id="idpegcomponen' + a[i].id_jenis_component + '" style="width: 100%;" disabled></select></div></td>';
            Baris += '<td></td>';
            Baris += '<td><input type="number" class="form-control form-control-xs" name="diskonpersencompx[]" id="diskonpersencompx' + a[i].id_jenis_component + '" value="' + a[i].diskon_persen + '"  data-id="' + a[i].id_detail_transaksi + '" data-id1="' + a[i].id_jenis_component + '" placehoder="0" readonly> <div> Rp.' + format_ribuan(a[i].diskon_rupiah) + '</div></td>';
            Baris += '<td><input type="text" class="form-control form-control-xs" name="totalubahcomphargax[]" id="totalubahcomphargax" value="' + format_ribuan(a[i].harga) + '" readonly> </td>';

          }

          Baris += "</tr>";
          tampil_idpegawaidetail(a[i].id_jenis_component, a[i].id_pegawai, a[i].id_detail_transaksi);
        }
        // Baris += '<input type="text" name="myInput" id="a" value="" data-id="123">';
        // MyTable.fnDestroy();
        document.getElementById("listlookup_componen").innerHTML = Baris;
        //refresh();
        $("input[name='ubahcompharga[]']").change(function() {
          var id_detail_transaksi = $(this).attr("data-id");
          var id_jenis_component = $(this).attr("data-id1");
          var val_nominalubah = $(this).val();

          var paramc = {
            id_detail_transaksi: id_detail_transaksi,
            id_jenis_component: id_jenis_component,
            val_nominalubah: val_nominalubah
          };
          apiPOST("Kasirgeneral/updatedetailcomponentransaksi", paramc, hasil => {
            if (hasil['status'] == 'sukses') {
              tampilkan_isi_component();
              tampilkan_isi_tindakan();
            }
          });
        });

        $("input[name='compharga[]']").change(function() {
          var id_detail_transaksi = $(this).attr("data-id");
          var id_jenis_component = $(this).attr("data-id1");
          var val_nominalubah = $(this).val();

          var paramc = {
            id_detail_transaksi: id_detail_transaksi,
            id_jenis_component: id_jenis_component,
            val_nominalubah: val_nominalubah
          };
          apiPOST("Kasirgeneral/updatedetailcomponentransaksi", paramc, hasil => {
            if (hasil['status'] == 'sukses') {
              tampilkan_isi_component();
              tampilkan_isi_tindakan();
            }
          });
        });

        $("input[name='diskonpersencomp[]']").change(function() {
          var id_detail_transaksi = $(this).attr("data-id");
          var id_jenis_component = $(this).attr("data-id1");
          var val_nominalubah = $(this).val();

          var paramc = {
            id_detail_transaksi: id_detail_transaksi,
            id_jenis_component: id_jenis_component,
            val_nominalubah: val_nominalubah
          };
          apiPOST("Kasirgeneral/updatedetailcomponentransaksidiskon", paramc, hasil => {
            if (hasil['status'] == 'sukses') {
              tampilkan_isi_component();
              tampilkan_isi_tindakan();
            }
          });
        });

      }

    }, listParam);
    $('#loading_kasir_mod').hide();
    $('#loading_kasir').hide();






  };

  function kasirdeletejasaidpegawai(id_jenis_component, id_detail_transaksi) {
    pertanyaan.fire({
      title: 'Kosongkan',
      html: '<span>Yakin dokter akan dikosongkan ? </span>',
      icon: 'question',
      showCancelButton: true,
      reverseButtons: false,
      allowOutsideClick: false
    }).then((result) => {
      if (result.isConfirmed) {
        var param = {
          id_jenis_component: id_jenis_component,
          id_detail_transaksi: id_detail_transaksi,
        };

        apiPOST('Kasirgeneral/penatajasaRWJ_deletecomponentpegawai', param, hasil => {
          if (hasil['code'] == '200') {
            tampilkan_isi_component();
          }
        });
      } else if (result.dismiss === Swal.DismissReason.cancel) {

      }
    })
  }

  $('#loading_kasir').hide();

  $("#mod_lookkup_jas").modal({
    backdrop: "static"
  });
  $('#mod_lookkup_jas').on('shown.bs.modal', function() {

  })
  $(".BayarIGDKasir").click(function() {
    tambahbayar();
    $('#mod_lookkup_jas').modal('hide');
  });
</script>