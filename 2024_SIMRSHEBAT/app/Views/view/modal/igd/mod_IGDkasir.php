<?php
foreach ($data as $row)
?>
<div class="content modal fade" id="modal_IGDkasir">
  <div class="container-fluid ">
    <div class="row" style="margin-top:-40px">
      <!-- content kanan -->
      <div class="col-md-10" style="margin-top: 20px;margin-bottom: 0px;">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-body">
              <!-- detail transaksi -->
              <div class="row">
                <div class="col-md-12" style="margin-top: 0px;margin-bottom: 0px;">
                  <div class="card card-outline card-danger">
                    <div class="card-header">
                      <div class="btn">
                        <button type="button" class="btn bg-gradient-secondary btn-xs tambahbaris"><i class="fa fa-pencil-alt"></i> Tambah Baris</button>
                        <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="tamp_look()"><i class="fab fa-searchengin"></i> Look Up Produk</button>
                        <button type="button" class="btn bg-gradient-secondary btn-xs" onclick="tamp_depositpasien()"><i class="fas fa-money-bill"></i> Deposit Pasien</button>

                        <!-- <button type="button" class="btn btn-block bg-gradient-secondary btn-xs"><i class="fab fa-searchengin"></i> Look Up Produk</button> -->
                        <!-- <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask> -->
                      </div>

                      <span class="badge badge-info float-right">
                        <u>Detail Transaksi</u>
                      </span>

                    </div>
                  </div>
                </div>
                <div class="col-md-12" style="margin-top: -10px;max-height: 17rem; overflow: auto;height: 90vh;">
                  <table id="tabletindakan_modal_IGDkasir" class="table table-bordered table-hover table-sm" style="border-collapse: inherit;">
                    <thead>
                      <tr>
                        <th width="5">#</th>
                        <th width="100">Tgl. Transaksi</th>
                        <th width="100">Unit</th>
                        <th width="100">Kd Produk</th>
                        <th width="150">Nma Produk</th>
                        <th>Dokter</th>
                        <th width="100">Qty</th>
                        <th width="100">Tarif</th>
                        <th width="100">Jumlah</th>
                        <th width="100">Aksi</th>

                      </tr>
                    </thead>
                    <tbody></tbody>
                  </table>
                </div>
              </div>

              <!-- histori bayar -->
              <div class="col-md-12" style="margin-top: 20px;">
                <div class="row">
                  <div class="col-md-12" style="margin-top: 0px;margin-bottom: 0px;">
                    <div class="card card-outline card-danger">
                      <div class="card-header">
                        <span class="badge badge-info float-right">
                          <u>Histori Bayar</u>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12" style="margin-top: -10px;max-height: 7rem; overflow: auto">
                    <table id="tablehistory_modal_IGDkasir" class="table table-striped table-sm" style="border-collapse: inherit;">
                      <thead>
                        <tr>
                          <th width="5">#</th>
                          <th width="150">Urut Bayar</th>
                          <th width="100">Tgl. Bayar</th>
                          <th width="90">No. Transaksi</th>
                          <th width="100">Shift</th>
                          <th>Pembayaran</th>
                          <th width="100">Jumlah</th>
                          <th width="100">Petugas</th>
                          <th width="100">Aksi</th>

                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                    </table>
                  </div>

                </div>
              </div>
              <!-- // histori bAYAR -->
            </div>
          </div>
        </div>
      </div>
      <!-- menu kiri -->

      <div class="col-md-2" style="margin-top:20px">
        <!-- <div class="col-md-2" style="margin-top: 15px;margin-bottom: 0px;">
        <div class="col-md-2"> -->
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-body">

              <div class="col-md-12 justify-content-between">
                <table class="table table-striped table-sm" border="0" style="margin:0px;size:100%">
                  <tr>
                    <td>No.Transaksi</td>
                    <td> : </td>
                    <td><?php echo $row['id_transaksi'] ?></td>
                  </tr>
                  <tr>
                    <td>Kode. RM</td>
                    <td> : </td>
                    <td><?php echo $row['no_rm'] ?></td>
                  </tr>
                  <tr>
                    <td>Unit</td>
                    <td> : </td>
                    <td><?php echo $row['nama_unit'] ?></td>
                  </tr>
                </table>
              </div>

              <div class="btn-group-vertical" style="width: 100%;margin-top:10px">
                <button type="button" class="btn btn-block bg-gradient-secondary btn-xs" style="text-align: start;" onclick="tamp_bayarIGD()"><i class="fa fa-pencil-alt"></i> Pembayaran</button>
                <button type="button" class="btn btn-block bg-gradient-info btn-xs" style="text-align: start;" onclick="tamp_bayarIGD()"><i class="fa fa-pencil-alt"></i> Pelunasan</button>
                <button type="button" class="btn btn-block bg-gradient-danger btn-xs" style="text-align: start;"><i class="fas fa-door-closed"></i> Tutup Transaksi</button>
                <button type="button" class="btn btn-block bg-gradient-info btn-xs" style="text-align: start;"><i class="fas fa-check"></i> Buka Transaksi</button>
                <button type="button" class="btn btn-block bg-gradient-danger btn-xs" style="text-align: start;"><i class="fas fa-trash"></i> Batal Transaksi</button>
              </div>


              <div class="btn-group-vertical" style="width: 100%;">

                <div class="btn-group">
                  <button type="button" class="btn btn-block bg-gradient-info btn-xs" style="text-align: start;"><i class="fa fa-pencil-alt"></i> Update Data</button>
                  <button type="button" class="btn bg-gradient-info btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                    <span class="sr-only"></span>
                  </button>
                  <div class="dropdown-menu" role="menu">
                    <a class="dropdown-item" href="#">Ganti Dokter</a>
                    <a class="dropdown-item" href="#">Ganti Kelompok Pasien</a>
                  </div>
                </div>
                <button type="button" class="btn btn-block bg-gradient-secondary btn-xs" style="text-align: start;"><i class="fa fa-print"></i> Cetak</button>
              </div>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger btn-sm" onclick="keluarmodal_IGDkasir();"><i class="fa fa-reply"></i> Kembali</button>

            </div>


          </div>
          <!-- /.modal-content -->
        </div>
        <!-- </div>
      </div> -->

      </div>
    </div>
  </div>
</div>

<!-- //menu kiri -->


<script type="text/javascript">
  function hanyaAngka(evt) {
    //alert('hai');
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;
    return true;
  }



  function tampil_diagnosa(kode) {
    var param = {
      id: kode
    };
    apiPOST('Data_Sosial/diagnosabyname', param, hasil => {
      var penjamin = '<option value=>*Pilih</option>';
      var a = hasil['data'];
      for (var i = 0; i < a.length; i++) {
        penjamin += '<option value="' + a[i]['id_penyakit'] + '">' + a[i]['id_penyakit'] + ' | ' + a[i]['penyakit'] + '</option>';
      }
      document.getElementById('diagnosa').innerHTML = penjamin;
    });
  }

  $('.tglinput').inputmask('dd/mm/yyyy', {
    'placeholder': 'dd/mm/yyyy'
  })
  //Money Euro
  //Datemask2 mm/dd/yyyy
  $('#datemask2').inputmask('mm/dd/yyyy', {
    'placeholder': 'mm/dd/yyyy'
  })
  //Money Euro
  $('[data-mask]').inputmask();

  $('.js-mySelect2').select2({
    dropdownCssClass: "custom-dropdown"
  }).on("select2:open", function(e) {
    var self = $(this);
    self.on('keyup', function() {
      console.log('ini' + self.val());
      //console.log('fru');
    })
  });


  $(document).ready(function() {

    // time();
    // unit();
    //Datemask dd/mm/yyyy

    $(".tambahbaris").click(function() {
      $('.js-mySelect2').select2({
        dropdownCssClass: "custom-dropdown"
      }).on("select2:open", function(e) {
        var self = $(this);
        self.on('keyup', function() {
          console.log('ini' + self.val());
          //console.log('fru');
        })
      });

      $(document).on('keyup', '.custom-dropdown .select2-search__field', function(ev) {
        var self = $(this);
        if (self.val().length > 1) {
          console.log('itu' + self.val());
          tampil_diagnosa(self.val());
        }
      });
      $('.tglinput').inputmask('dd/mm/yyyy', {
        'placeholder': 'dd/mm/yyyy'
      })
      //Money Euro
      //Datemask2 mm/dd/yyyy
      $('#datemask2').inputmask('mm/dd/yyyy', {
        'placeholder': 'mm/dd/yyyy'
      })
      //Money Euro
      $('[data-mask]').inputmask();

      var now = new Date();
      var day = ("0" + now.getDate()).slice(-2);
      var month = ("0" + (now.getMonth() + 1)).slice(-2);
      var tglsekarang = (day) + "/" + (month) + "/" + now.getFullYear();

      var Nomor = $('#tabletindakan_modal_IGDkasir tbody tr').length + 1;
      var Baris = "<tr id="+Nomor+">";
      Baris += "<td>" + Nomor + "</td>";
      Baris += "<td><input type='text' class='form-control form-control-sm' inputmode='numeric' data-inputmask-alias='datetime' data-inputmask-inputformat='dd/mm/yyyy' value='" + tglsekarang + "' data-mask></td>";
      Baris += "<td><input type='text' class='form-control form-control-sm' name='tes' id='tes' onkeypress='return hanyaAngka(event)'></td>";
      Baris += "<td><input type='text' class='form-control form-control-sm' name='tes' id='tes'></td>";
      Baris += "<td><select class='select2 form-control form-control-sm' id='nama_produk' name='nama_produk'></select></td>";
      Baris += "<td><input type='text' class='form-control form-control-sm' name='tes' id='tes'></td>";
      Baris += "<td><input type='text' class='form-control form-control-sm' name='tes' id='tes'></td>";
      Baris += "<td><input type='text' class='form-control form-control-sm' name='tes' id='tes'></td>";
      Baris += "<td><input type='text' class='form-control form-control-sm' name='tes' id='tes'></td>";
      Baris += "<td><button type='button' class='btn btn-block bg-gradient-danger btn-xs hapuskosongan'><i class='fa fa-trash-alt'></i>Hapus</button></td>";
      Baris += "</tr>";

      $('#tabletindakan_modal_IGDkasir tbody').append(Baris);

      $('#tabletindakan_modal_IGDkasir tbody tr').each(function() {
        $(this).find('td:nth-child(5) input').focus();
      });

    });

  })



  $('#loading_modal_IGDkasir').hide();

  $("#modal_IGDkasir").modal({
    backdrop: "static"
  });

  $('#modal_IGDkasir').on('shown.bs.modal', function() {});


  tampilkan_isi_tindakan();
  tampilkan_isi_history();

  function keluarmodal_IGDkasir() {
    $('#modal_IGDkasir').modal('hide');
    $('.modal-backdrop').hide();
  }

  function tampilkan_isi_tindakanx() {
    var Baris = '';
    for (var i = 0; i < 3; i++) {
      var no = i + 1;
      Baris += '<tr id="baris' + no + '">';
      Baris += '<td>' + no + '</td>';
      Baris += '<td>02/06/2023</td>';
      Baris += '<td>Unit ' + no + '</td>';
      Baris += '<td>kdProduk' + no + '</td>';
      Baris += '<td>Biaya Obat Transfer' + no + '</td>';
      Baris += '<td>dr. Joko Islami</td>';
      Baris += '<td>' + (no + 5) + '</td>';
      Baris += '<td>Rp. ' + no + '000</td>';
      Baris += "<td><button type='button' class='btn btn-block bg-gradient-danger btn-xs hapuskosongan'><i class='fa fa-trash-alt'></i>Hapus</button></td>";
      Baris += "</tr>";
    }
    $('#tabletindakan_modal_IGDkasir tbody').append(Baris);
  }

  function tampilkan_isi_tindakan() {
    var listParam = [
      'id_transaksi', 'id_kunjungan'
    ];
    var param = {
      id_transaksi: <?php echo $row['id_transaksi'] ?>,
      id_kunjungan: <?php echo $row['id_kunjungan'] ?>,

    };
    apiPOST("Gawat_Darurat/detailtransaksiigd", param, hasil => {
      if (hasil['data'] !== null) {
        //alert('tes');
        if (hasil['code'] == 'XX') {
          toastr.error('Data Tidak ditemukan');
        }
        var Baris = '';
        var a = hasil['data'];
        for (var i = 0; i < a.length; i++) {
          // alert(a[i].tgl_transaksi);
          var tgl = a[i].tgl_input.substr(8, 2);
          var bln = a[i].tgl_input.substr(5, 2);
          var thn = a[i].tgl_input.substr(0, 4);
          tgltransaksi = tgl + '/' + bln + '/' + thn;
          jamtranskasi = a[i].tgl_input.substr(11, 8);
          var nominaljumlah = parseFloat(a[i].jumlah) * parseFloat(a[i].harga);
          var no = i + 1;
          Baris += '<tr id="baris' + no + '">';
          Baris += '<td>' + no + '</td>';
          Baris += '<td>' + tgltransaksi + '</td>';
          Baris += '<td>' + a[i].nama_unit + '</td>';
          Baris += '<td>' + a[i].id_produk + '</td>';
          Baris += '<td>' + a[i].nama_produk + '</td>';
          Baris += '<td>dr. Joko Islami</td>';
          Baris += '<td>' + a[i].jumlah + '</td>';
          Baris += '<td>' + a[i].harga + '</td>';
          Baris += '<td>' + nominaljumlah + '</td>';
          Baris += "<td><button type='button' class='btn btn-block bg-gradient-danger btn-xs hapuskosongan'><i class='fa fa-trash-alt'></i>Hapus</button></td>";
          Baris += "</tr>";
        }
        MyTable.fnDestroy();
        //$('#tableKasirIGD tbody').append(Baris);
        $('#tabletindakan_modal_IGDkasir tbody').append(Baris);
        refresh();

      }

    }, listParam);
  };

  $(document).on("click", ".hapuskosongan", function() {
    var txt;
    // var id = this.id;
    var r = confirm("Apakah yakin akan menghapus!");
    if (r == true) {
      txt = "You pressed OK! ";
      //console.log(txt);
      var id = jQuery(this).closest('tr').attr('id');
      // $("body").find(id).remove();
      $("body").find("#" + id).remove();
      // console.log('tes hapus a' + id_barang);
      console.log('tes hapus id =' + id)
      // calculate_total();

    } else {
      txt = "You pressed Cancel!";
    }
  })

  $(document).on("click", ".hapusbayar", function() {
    var txt;
    // var id = this.id;
    var r = confirm("Apakah yakin akan menghapus!");
    if (r == true) {
      txt = "You pressed OK! ";
      console.log(txt);
      var id = jQuery(this).closest('tr').attr('id');
      // $("body").find(id).remove();
      $("body").find("#" + id).remove();
      // console.log('tes hapus a' + id_barang);
      console.log('tes hapus id =' + id)
      // calculate_total();

    } else {
      txt = "You pressed Cancel!";
    }
  })

  function tampilkan_isi_history() {
    var no = $('#tablehistory_modal_IGDkasir tbody tr').length + 1;
    var Barisbayar = '<tr id="trbayar' + no + '">';
    // for (var i = 0; i < 1; i++) {
    // var no = i + 1;
    Barisbayar += '<td>' + no + '</td>';
    Barisbayar += '<td>UrutBayar ' + no + '</td>';
    Barisbayar += '<td>' + no + ' Maret 2023</td>';
    Barisbayar += '<td>0232' + no + '</td>';
    Barisbayar += '<td>Shift ' + no + '</td>';
    Barisbayar += '<td>BPJS</td>';
    Barisbayar += '<td>Rp. 19' + no + '</td>';
    Barisbayar += '<td>Edwin Tri H.</td>';
    Barisbayar += '<td><button type="button" class="btn btn-block bg-gradient-danger btn-xs hapusbayar"><i class="fa fa-trash-alt"></i>Hapus</button></td>';
    Barisbayar += "</tr>";
    // }
    $('#tablehistory_modal_IGDkasir tbody').append(Barisbayar);
  }


  // $(".tambahbaris").click(function() {
  //   // alert("tambah");
  //   BarisBaru();
  // });

  function tambahbayar() {
    tampilkan_isi_history();

  }
</script>