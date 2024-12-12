<?php
foreach ($data as $row)
  //var_dump($data);
  //echo "" . $row['id_transaksi'] . "";
  $tgltransaksi = date_create(substr($row['tgl_transaksi'], 0, 10));
$jamtransaksi = substr($row['tgl_transaksi'], 10, 16);
?>
<div class="content modal fade" id="mod_kasirpenjamintransaksi" style="margin-left: 180px;">
  <div class="container-fluid ">
    <div class="row" style="margin-top:-40px">
      <!-- content kanan -->
      <div class="col-md-8" style="margin-top: 20px;margin-bottom: 0px;">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12" style="margin-top: 0px;margin-bottom: 0px;">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>

                  <div class="card card-outline card-danger col-md-12">
                    <span class="badge badge-secondary float-right" style="font-size:15px">
                      <u>Halaman Penjamin Transaksi</u>
                    </span>
                    <div class="row">

                      <div class="col-md-6 col-sm-6 col-6 p-1">
                        <div class="info-box mb-0">
                          <table class="table table-striped table-sm" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                              <tr>
                                <td width="70">No. Transaksi.</td>
                                <td>:</td>
                                <td><input type="text" class="form-control form-control-xs " value='<?php echo $row['id_transaksi'] ?>' id='idtransaksi' name="idtransaksi" readonly></td>
                              </tr>
                              <tr>
                                <td>Tgl. Kunj.</td>
                                <td>:</td>
                                <td>
                                  <input type="text" class="form-control form-control-xs " id="tgltransaksi" value='<?php echo date_format($tgltransaksi, "d/m/Y");  ?>' name="tgltransaksi" readonly>

                                </td>
                              </tr>
                              <tr>
                                <td>No. Rm</td>
                                <td>:</td>
                                <td><input type="text" class="form-control form-control-xs" id='norm' value='<?php echo $row['no_rm'] ?>' name="norm" readonly></td>
                              </tr>
                              <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td><input type="text" class="form-control form-control-xs" id='namapas' value='<?php echo $row['nama'] ?>' name="namapas" readonly></td>
                              </tr>
                              <!-- <tr>
                                <td>SJP</td>
                                <td>:</td>
                                <td><textarea class="form-control form-control-xs" id='nosjp' name='nosjp' readonly></textarea></td>
                              </tr> -->
                            </tbody>
                          </table>
                        </div>

                      </div>

                      <div class="col-md-6 col-sm-6 col-6 p-1">
                        <div class="info-box mb-0">
                          <table class="table table-striped table-sm" id="pembayaranvalue" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                              <tr>
                                <td width="70">Penjamin</td>
                                <td>:</td>
                                <td>
                                  <select class="form-control form-control-xs" id='penjamintransaksikasir' name="penjamintransaksikasir" onchange="ambilnomorkartu(event);"></select>
                                </td>
                              </tr>

                              <tr>
                                <td width="70">Penjamin Utama?</td>
                                <td>:</td>
                                <td>
                                  <select class="form-control form-control-xs" id='penjaminutama' name="penjaminutama">
                                  <option value="f">TIDAK</option>
                                  <option value="t">IYA</option>
                                  </select>
                                </td>
                              </tr>

                              <tr>
                                <td width="70">SEP</td>
                                <td>:</td>
                                <td>
                                  <input type="text" class="form-control form-control-xs" id='penjaminsep' name="penjaminsep">
                                </td>
                              </tr>

                              <tr>
                                <td width="70">Nomor Kartu</td>
                                <td>:</td>
                                <td>
                                  <input type="text" class="form-control form-control-xs" id='nokartupenjamin' name="nokartupenjamin">
                                </td>
                              </tr>



                              <tr>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                  <button type="button" class="btn bg-gradient-info btn-xs BtnTambahPenjaminTransaksi float-right"><i class="fa fa-close"></i>Tambah Penjamin</button>
                                </td>
                              </tr>


                            </tbody>
                          </table>
                        </div>
                      </div>
                      

                    </div>
                    <div class="col-md-12" id="div_tablehistory_penjamintransaksi" style="margin-top:10px;max-height: 10rem; overflow: auto">
                        <table id="tablehistory_penjamintransaksi" class="table table-striped table-sm" style="border-collapse: inherit;">
                          <thead>
                            <tr>
                              <th width="100">Penjamin</th>
                              <th width="90">Keterangan</th>
                              <th width="90">nomor SEP</th>
                              <th width="250">Aksi</th>
                            </tr>
                          </thead>
                          <tbody id="list_tablehistory_penjamintransaksi" ;>

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
<div class="editSep"></div>

<!-- //menu kiri -->


<script type="text/javascript">
  $(document).ready(function() {
    $('#loading_kasir_mod').hide();
    var MyTablekasir = $('#tablehistory_lokup_produk').dataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": false,
      "autoWidth": false
    });
    tampilkan_isi_penjamin_transaksi();

    function kasirgeneralrefresh() {
      MyTablekasir = $('#tablehistory_lokup_produk').dataTable();
    }

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

    var id = <?php echo $row['id_transaksi'] ?>;
    var param = {
      idtrans: id,
    };
    apiPOST('Kasirgeneral/kelolapenjamintransaksi', param, hasil => {
      // var aga = "<option value=''> * Pilih Penjamin </option>";
      var aga = "<option value=''>* Silahkan Pilih</option>";
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        aga += '<option value="' + a[i]['id_penjamin'] + '">' + a[i]['nama_penjamin'] + '</option>';
      }
      document.getElementById('penjamintransaksikasir').innerHTML = aga;
    });

  });

  function tampilkan_isi_penjamin_transaksi() {
    var listParam = [
      'id_transaksi'
    ];
    var param = {
      id_transaksi: <?php echo $row['id_transaksi'] ?>,
    };
    apiPOST("Kasirgeneral/tampilpenjamintransaksi", param, hasil => {
      if (hasil['data'] !== null) {
        //alert('tes');
        if (hasil['code'] == 'XX') {
          toastr.error('Data Tidak ditemukan');
        }
        var no = $('#tablehistory_penjamintransaksi tbody tr').length + 1;
        var Barispenjamin = '<tr id="trpenjamintransaksi' + no + '">';
        var a = hasil['data'];
        for (var i = 0; i < a.length; i++) {
          if(a[i].no_sjp == null || a[i].no_sjp == ''){
          var nosjp = '0';
        }else{
          var nosjp = a[i].no_sjp;
        }
        
          Barispenjamin += '<td>' + a[i].nama_penjamin + '</td>';
          Barispenjamin += '<td>' + a[i].penjaminutama + '</td>';
          Barispenjamin += '<td>' + a[i].no_sjp + '</td>';
          if(a[i].penjamin_utama == 't'){
            Barispenjamin += '<td><button type="button" class="btn bg-gradient-warning btn-xs" onclick="editsep(' + "'" + a[i].id_penjamin +"','" + a[i].id_transaksi +"','" + nosjp + "'" + ');"  ><i class="fa fa-edit"></i> Edit SEP</button></td>';
          }
          else{
            Barispenjamin += '<td><button type="button" class="btn bg-gradient-danger btn-xs hapuspenjamin" data-id="' + a[i].id_penjamin + '" data-id1="' + a[i].id_transaksi + '" data-id2="' + a[i].nama_penjamin + '" data-id3="' + a[i].no_sjp + '" ><i class="fa fa-trash-alt"></i> Hapus</button> | <button type="button" class="btn bg-gradient-info btn-xs gantijadiutama" data-id="' + a[i].id_penjamin + '" data-id1="' + a[i].id_transaksi + '" data-id2="' + a[i].nama_penjamin + '" data-id3="' + a[i].no_sjp + '" ><i class="fa fa-check"></i> jadikan Utama</button></td>';
          }
          Barispenjamin += "</tr>";
          no++;
        }
        // $('#tablehistory_modal_kasir_pelunasan tbody').append(Barisbayar);
        document.getElementById("list_tablehistory_penjamintransaksi").innerHTML = Barispenjamin;

      }
    }, listParam);
  }
  $('#loading_kasir_mod').hide();
  $('#loading_modal_kasir').hide();

  $("#mod_kasirpenjamintransaksi").modal({
    backdrop: "static"
  });
  $('#mod_kasirpenjamintransaksi').on('shown.bs.modal', function() {

  })
  $(".BtnTambahPenjaminTransaksi").click(function() {
    //tambahbayar();
    var id_transaksi = <?php echo $row['id_transaksi'] ?>;
    var user = JSON.parse(localStorage['data_user']);
    var id_user = user['id_user'];
    var id_penjamin = $("#penjamintransaksikasir").val();
    var apakahutama = $("#penjaminutama").val();
    var val_sep = $("#penjaminsep").val();
    var no_kartu = $("#nokartupenjamin").val();
    var norm = $("#norm").val();

    if(no_kartu == '' && id_penjamin=='2'){
      alert('silahkan isi nomor kartunya');
      exit();
    }

    pertanyaan.fire({
      title: 'Apakah Anda Yakin Akan menambahkan Penjamin',
      html: '<span>Transaksi Nomor ' + id_transaksi + ' ?</span>',
      icon: 'question',
      showCancelButton: true,
      reverseButtons: false,
      allowOutsideClick: false
    }).then((result) => {
      if (result.isConfirmed) {
        //$('#tabletindakan_modal_kasir tbody').html('');
        var param = {
          id_transaksi: id_transaksi,
          val_id_user: id_user,
          apakahutama : apakahutama,
          sep : val_sep,
          id_penjamin : id_penjamin,
          no_kartu : no_kartu,
          norm : norm
        };
        apiPOST('Kasirgeneral/tambahtransaksipenjamin', param, hasil => {
          // mod_RWJPenatajasa_getlistproduk();
          //$("body").find("#" + id).remove();
          if (hasil['status'] == 'sukses') {
          // remove_disdiv();
          tampilkan_isi_penjamin_transaksi();
          tampil_kunjungan();
          tampilkan_isi_penjamin_transaksi();


          // $('#mod_kasirpenjamintransaksi').modal('hide');

          }
        });
      } else if (result.dismiss === Swal.DismissReason.cancel) {

      }
    })

  });

  $(document).on("click", ".hapuspenjamin", function() {
    // var txt;
    var id = this.id;
    // var r = confirm("Apakah yakin akan menghapus!");
    // if (r == true) {
    //   txt = "You pressed OK! ";
    //   //console.log(txt);
    var id = jQuery(this).closest('tr').attr('id');
    //   // $("body").find(id).remove();
    //   $("body").find("#" + id).remove();
    //   // console.log('tes hapus a' + id_barang);
    //   console.log('tes hapus id =' + id)
    //   // calculate_total();
    var id_penjamin = $(this).attr("data-id");
    var idtransaksi = $(this).attr("data-id1");
    var penjamin = $(this).attr("data-id2");
    var nosjp = $(this).attr("data-id3");

    //   alert(iddetailkunjungan);
    // } else {
    //   txt = "You pressed Cancel!";
    // }
    var user = JSON.parse(localStorage['data_user']);
    var id_user = user['id_user'];

    pertanyaan.fire({
      title: 'Hapus History Penjamin',
      html: '<span>Benarkah Penjamin ' + penjamin + ', di Hapus ???</span>',
      icon: 'question',
      showCancelButton: true,
      reverseButtons: false,
      allowOutsideClick: false
    }).then((result) => {
      if (result.isConfirmed) {
        //$('#tabletindakan_modal_kasir tbody').html('');
        // var alasan = $('#alasanhapuspembayaran').val();
        // console.log('ini'+alasan);
        // alert(alasan);
        // exit();
        var param = {
          id_penjamin: id_penjamin,
          idtransaksi: idtransaksi,
          nosjp : nosjp
        };

        apiPOST('Kasirgeneral/Kasir_deletepenjaminhistory', param, hasil => {
          // mod_RWJPenatajasa_getlistproduk();
          // $("body").find("#" + id).remove();
          tampilkan_isi_penjamin_transaksi();
          tampil_kunjungan();
          tampilkan_isi_penjamin_transaksi();

        });
      } else if (result.dismiss === Swal.DismissReason.cancel) {

      }
    })

  });

  $(document).on("click", ".gantijadiutama", function() {
    // var txt;
    var id = this.id;
    // var r = confirm("Apakah yakin akan menghapus!");
    // if (r == true) {
    //   txt = "You pressed OK! ";
    //   //console.log(txt);
    var id = jQuery(this).closest('tr').attr('id');
    //   // $("body").find(id).remove();
    //   $("body").find("#" + id).remove();
    //   // console.log('tes hapus a' + id_barang);
    //   console.log('tes hapus id =' + id)
    //   // calculate_total();
    var id_penjamin = $(this).attr("data-id");
    var idtransaksi = $(this).attr("data-id1");
    var penjamin = $(this).attr("data-id2");
    var nosjp = $(this).attr("data-id3");

    //   alert(iddetailkunjungan);
    // } else {
    //   txt = "You pressed Cancel!";
    // }
    var user = JSON.parse(localStorage['data_user']);
    var id_user = user['id_user'];

    pertanyaan.fire({
      title: 'Yakin',
      html: '<span>Penjamin ' + penjamin + ', di jadikan penjamin utama ???</span>',
      icon: 'question',
      showCancelButton: true,
      reverseButtons: false,
      allowOutsideClick: false
    }).then((result) => {
      if (result.isConfirmed) {
        //$('#tabletindakan_modal_kasir tbody').html('');
        // var alasan = $('#alasanhapuspembayaran').val();
        // console.log('ini'+alasan);
        // alert(alasan);
        // exit();
        var param = {
          id_penjamin: id_penjamin,
          idtransaksi: idtransaksi,
          nosjp : nosjp
        };

        apiPOST('Kasirgeneral/Kasir_ubahpenjamintransaksiutama', param, hasil => {
          // mod_RWJPenatajasa_getlistproduk();
          // $("body").find("#" + id).remove();
          tampilkan_isi_penjamin_transaksi();
          tampil_kunjungan();
          tampilkan_isi_penjamin_transaksi();

        });
      } else if (result.dismiss === Swal.DismissReason.cancel) {

      }
    })

  });

  function ambilnomorkartu(){
    var param = {
      id_penjamin: $("#penjamintransaksikasir").val(),
      no_rm: $("#norm").val(),

    };
    apiPOST('Kasirgeneral/ambilnomorkartu', param, hasil => {
      var a = hasil['data'];
      if (hasil['status'] == 'sukses') {
      for (var i = 0; i < a.length; i++) {
        document.getElementById('nokartupenjamin').value = a[i].no_kartu;	
      }
    }
    else{

    }
   
    })

  }

  
  function editsep(id_penjamin,id_transaksi,no_sjp) {
    $('#loading_Sep_modal').show();
    var json_data = {
      'id_penjamin': id_penjamin,
      'id_transaksi': id_transaksi,
      'no_sjp': no_sjp,
    };
    var myJSON = JSON.stringify(json_data);
    $('#loading_Sep').show();
    //alert(id);
    $('.editSep').load('Historykunjungan/mod_Sep_ubah?data=' + myJSON);
  };

  function keluarmodal_kasir() {
    $('#modal_kasir').modal('hide');
    $('.modal-backdrop').hide();
  }
</script>