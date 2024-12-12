<?php
$data = json_decode($_GET['data']);
$HISTORYnorm         = str_replace('"', '', json_encode($data->no_rm));
$HISTORYnmapasien    = str_replace('"', '', json_encode($data->nama));
$HISTORYalamat       = str_replace('"', '', json_encode($data->alamat));
$HISTORYumur         = date_indo(str_replace('"', '', json_encode($data->umur)));
$HISTORYtelp         = str_replace('"', '', json_encode($data->telp));

?>
<section class="content pb-0" id="mod_HISTORYPenatajasa_content">
  <div class="container-fluid h-100">
    <div class="row">

      <div class="col-md-3 p-1">
        <div class="info-box mb-0">
          <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td>No. RM</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="mod_HISTORYPenatajasa_norm" disabled></td>
            </tr>
            <tr>
              <td>Nama</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="mod_HISTORYPenatajasa_nmpasien" disabled></td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="mod_HISTORYPenatajasa_alamat" disabled></td>
            </tr>
            <tr>
              <td>Tgl. Lahir</td>
              <td>:</td>
              <td><input type="text" class="form-control form-control-xs" id="mod_HISTORYPenatajasa_umur" disabled></td>
            </tr>

          </table>
        </div>
      </div>

      <div class="col-md-9 p-1">
        <div class="card card-row">
          <div class="card-header p-1 darkgrey-custom">
            <button type="button" class="btn btn-outline-danger btn-xs" onclick="mod_HISTORYPenatajasa_kembalikeawal()">
              <i class="fa fa-arrow-left"></i> Kembali</button>
          </div>
          <div class="modal-body p-1">

            <div class="card-body p-0">
              <ul class="nav nav-tabs" id="mod_HISTORYPenatajasa_custom-content-above-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="pill" href="#div_mod_HISTORYPenatajasa_tindakan" role="tab" aria-selected="true">History Kunjungan</a>
                </li>
              </ul>

              <div class="tab-content" id="mod_HISTORYPenatajasa_custom-content-above-tabContent">
                <div class="tab-pane p-1 fade active show" id="div_mod_HISTORYPenatajasa_tindakan" role="tabpanel">
                  <table id="mod_HISTORYPenatajasa_tabletindakan" class="table table-striped table-sm choose">
                    <thead>
                      <tr>
                        <!-- <th width="120">Kode Produk</th> -->
                        <th>Tanggal</th>
                        <th>Unit</th>
                        <th>Act</th>
                      </tr>
                    </thead>
                    <tbody id="list_mod_HISTORYPenatajasa_tabletindakan"></tbody>
                  </table>
                  <!-- </div> -->

                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<script type="text/javascript">
  var HISTORYnorm = "<?php echo $HISTORYnorm; ?>";
  var HISTORYnmapasien = "<?php echo $HISTORYnmapasien; ?>";
  var HISTORYalamat = "<?php echo $HISTORYalamat; ?>";
  var HISTORYumur = "<?php echo $HISTORYumur; ?>";
  var HISTORYtelp = "<?php echo $HISTORYtelp; ?>";

  mod_datasosial();
  mod_Historykunjungan();

  function mod_datasosial() {
    document.getElementById('mod_HISTORYPenatajasa_norm').value = HISTORYnorm;
    document.getElementById('mod_HISTORYPenatajasa_nmpasien').value = HISTORYnmapasien;
    document.getElementById('mod_HISTORYPenatajasa_alamat').value = HISTORYalamat;
    document.getElementById('mod_HISTORYPenatajasa_umur').value = HISTORYumur;
  }

  function mod_HISTORYPenatajasa_kembalikeawal() {
    pertanyaan.fire({
      title: 'Kembali ke menu awal',
      html: '<span>Apakah, tetap kembali ?</span>',
      icon: 'question',
      showCancelButton: true,
      reverseButtons: false,
      allowOutsideClick: false
    }).then((result) => {
      if (result.isConfirmed) {
        $('#mod_HISTORYPenatajasa_content').hide();
        $('#historykunjungan_1').show();
        historykunjungan_tablepasien();
      } else if (result.dismiss === Swal.DismissReason.cancel) {

      }
    })
  }


  function mod_Historykunjungan() {
    $('#mod_HISTORYPenatajasa_tabletindakan tbody').html('');
    var param = {
      norm: HISTORYnorm,
    };
    apiPOST('Historykunjungan/detail_kunjungan', param, hasil => {
      //alert(hasil['status']);
      if (hasil['data'] !== null) {
        if (hasil['status'] !== 'gagal') {
          var a = hasil['data'];
          var Baris='';
          for (var i = 0; i < a.length; i++) {
            var Nomor = $('#mod_RWIPenatajasa_tabletindakan tbody tr').length + 1;
            var tglmasuk = a[i].tgl_masuk.substr(8, 2);
            var blnmasuk = a[i].tgl_masuk.substr(5, 2);
            var thnmasuk = a[i].tgl_masuk.substr(0, 4);
            var tglkunjung = tglmasuk + '/' + blnmasuk + '/' + thnmasuk;
            // alert(tglmasuk);
            // exit();
            if (a[i]['nama_ruang'] == null) {
              var namaruang = '';
            } else {
              var namaruang = a[i]['nama_ruang'] + ' ' + a[i]['nama_kamar'];
            }
            Baris += "<tr id='baris" + Nomor + "'>";
            Baris += "<td><input type='text' class='form-control form-control-xs' name='mod_penata_jasa_tglmasuk[]' id='mod_penata_jasa_tglmasuk" + Nomor + "' value='" + tglkunjung + "' disabled></td>";
            Baris += "<td><input type='text' class='form-control form-control-xs' name='mod_penata_jasa_namaunit[]' id='mod_penata_jasa_namaunit" + Nomor + "' value='" + a[i]['nama_unit'] + " " + namaruang + "' disabled></td>";
            if ((user['id_far'] == '4001')||(user['id_far'] == '4002')||(user['id_far'] == '4003')||(user['id_far'] == '4004')){
              // Baris += "<td><button type='button' class='btn btn-xs btn-outline-danger mod_deleteKunjungan' data-id='" + a[i].id_kunjungan + "' data-id1='" + a[i].nama_unit + "' data-id2='" + tglkunjung + "'  data-id3='" +  a[i].id_transaksi + "' ><i class='fa fa-trash'></i></button> || <button type='button' class='btn btn-xs btn-outline-info printlabel' title='PRINT LABEL' data-id='" + a[i].id_transaksi + "' data-id1='" + a[i].id_kunjungan + "' data-id2='" +  a[i].no_rm+ "' ><i class='fa fa-print'></i></button></td>";
              Baris += "<td><button type='button' class='btn btn-xs btn-outline-info printlabel' title='PRINT LABEL' data-id='" + a[i].id_transaksi + "' data-id1='" + a[i].id_kunjungan + "' data-id2='" +  a[i].no_rm+ "' ><i class='fa fa-print'></i></button></td></td>";
            }else{
              Baris += "<td><button type='button' class='btn btn-xs btn-outline-danger mod_deleteKunjungan' data-id='" + a[i].id_kunjungan + "' data-id1='" + a[i].nama_unit + "' data-id2='" + tglkunjung + "'  data-id3='" +  a[i].id_transaksi + "' ><i class='fa fa-trash'></i></button> || <button type='button' class='btn btn-xs btn-outline-info printlabel' title='PRINT LABEL' data-id='" + a[i].id_transaksi + "' data-id1='" + a[i].id_kunjungan + "' data-id2='" +  a[i].no_rm+ "' ><i class='fa fa-print'></i></button></td>";             
            }
            Baris += "</tr>";

            // $('#mod_HISTORYPenatajasa_tabletindakan tbody').append(Baris);


          }
          document.getElementById("list_mod_HISTORYPenatajasa_tabletindakan").innerHTML = Baris;

        } 
      }

    });
  }

  $(document).on("click", ".mod_deleteKunjungan", function() {
    var id = this.id;
    var id = jQuery(this).closest('tr').attr('id');
    var idkunjungan = $(this).attr("data-id");
    var namaunit = $(this).attr("data-id1");
    var tglkunjung = $(this).attr("data-id2");
    var idtransaksi = $(this).attr("data-id3");

    pertanyaan.fire({
      title: 'Hapus Kunjungan',
      html: '<span>Benarkah Kunjungan <b>'+namaunit+'</b> tgl kunjung <b>'+tglkunjung+'</b>, di Hapus ?</span>',
      icon: 'question',
      showCancelButton: true,
      reverseButtons: false,
      allowOutsideClick: false
    }).then((result) => {
      if (result.isConfirmed) {
        var param = {
          id_kunjungan: idkunjungan,
          id_transaksi: idtransaksi
        };
        apiPOST('Historykunjungan/hapuskunjungan', param, hasil => {
          if (hasil['code'] == '200') {
            $("body").find("#" + id).remove();
            // $('#mod_HISTORYPenatajasa_tabletindakan tbody').html('');
            // mod_HISTORYPenatajasa_getlistproduk();

          }
          else{

          }
        });
      } else if (result.dismiss === Swal.DismissReason.cancel) {

      }
    })
  })

  $(document).on("click", ".printlabel", function() {
    // if (document.getElementById('rwipendafkdpasien').value == ''){
    //    toastr.error('Silahkan Lakukan Pendaftaran Dahulu.');
    // }else{
       var idtransaksi = $(this).attr("data-id");
       var idkunjungan = $(this).attr("data-id1");
       var norm = $(this).attr("data-id2");

      var param = {
        idtransaksi : idtransaksi,
        idkunjungan :idkunjungan,
        norm:norm ,
        modul     : 'rahasia'
      };
      newTabPOST('API/Historykunjungan/createlabel',param);
      return;
    // }
  })
</script>