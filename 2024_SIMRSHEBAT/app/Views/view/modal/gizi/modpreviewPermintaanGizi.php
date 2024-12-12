<?php
$data = json_decode($_GET['data']);
$no_rm  = str_replace('"', '', json_encode($data->no_rm));
$nmpasien  = str_replace('"', '', json_encode($data->nmpasien));
$umur  = str_replace('"', '', json_encode($data->umurPasien));
$id_unit  = str_replace('"', '', json_encode($data->idunitPasienGizi));
$unit  = str_replace('"', '', json_encode($data->unitPasienGizi));
$dokter  = str_replace('"', '', json_encode($data->dokterPasienGizi));
$id_order  = str_replace('"', '', json_encode($data->id_order));
$id_kunj  = str_replace('"', '', json_encode($data->id_kunj));
?>
<div class="modal fade" id="modalPrevieKirimOrder" style="background-color: #000000b8;">
    <div class="modal-dialog modal-lg"> <!-- style="max-width: 714px;" -->
        <div class="modal-content">
            <!-- <div class="overlay-wrapper" id="loading_modalpreviewpermintaanGizi">
                <div class="overlay dark">
                    <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                </div>
            </div> -->
            <div class="modal-body">
                <div class="col-sm-6" style="position:absolute;">
                    <img src="<?= base_url('_assets/dist/img/darmayu.png') ?>" style="opacity: .8" alt="Logo SIM-RS" width="50" height="50">
                </div>
                <h5 class="mt-3" style="text-align: center; font-weight: 300"><u>Preview Order Gizi</u></h5>
                <hr>
                <table border="0" cellpadding='0' width="100%">
                    <tr>
                        <td style="width: 60%;vertical-align: baseline;">
                            <div class="row">
                                <div class="col-sm-3"><span>Id.Order</span></div>
                                <div class="col-sm-auto"><span>:</span></div>
                                <div class="col-sm-8"><label><?php echo $id_order; ?></label></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"><span>No.RM/Usia</span></div>
                                <div class="col-sm-auto"><span>:</span></div>
                                <div class="col-sm-8"><label><?php echo $no_rm . " / " . $umur ?></label></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"><span>Nama Pasien</span></div>
                                <div class="col-sm-auto"><span>:</span></div>
                                <div class="col-sm-8"><label><?php echo $nmpasien; ?></label></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"><span>Unit</span></div>
                                <div class="col-sm-auto"><span>:</span></div>
                                <div class="col-sm-8"><label><?php echo $unit; ?></label></div>
                            </div>
                        </td>
                        <td style="vertical-align: baseline;">
                            <div align="center">
                                <div>Dokter </div>
                                <br>
                                <br>
                                <br>
                                <strong><u><span><?php echo $dokter ?></span></strong>
                            </div>
                        </td>
                    </tr>
                </table>
                <hr>
                <div id="prewiewPermintaanGizidetail"></div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-danger btn-xs" onclick="tutupmodal();"><i class="fa fa-reply"></i> Kembali</button>
                <button type="button" class="btn btn-success btn-xs" onclick="kirimkegizi();"><i class="fas fa-paper-plane"></i> Kirim</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
    $(document).ready(function() {
        showpreview();
    });

    // $(document).ready(function() {
    //     $("#modalPrevieKirimOrder").modal({
    //         backdrop: "static"
    //     });
    //     $('#modalPrevieKirimOrder').on('shown.bs.modal', function() {
    //         var data = document.getElementById("erm_eresepRWJ_preview").value;
    //         $('#loading_modalpreviewpermintaanGizi').show();
    //         if (data != '') {
    //             $('#loading_modalpreviewpermintaanGizi').hide();
    //         }
    //         get_modalpreview_eresepRWJ();
    //         //get_no_urut();
    //         //$('#erm_eresepRWJ_preview').html('');
    //         //tablepreviewobat();    
    //         //get_previewdetail_obat(idmrresep, medrek)
    //     });
    // });

    function showpreview() {
        $("#modalPrevieKirimOrder").modal({
            backdrop: "static"
        });
        $('#modalPrevieKirimOrder').on('shown.bs.modal', function() {});
    }

    function tutupmodal() {
        $('#modalPrevieKirimOrder').modal('hide');
        $('.modal-backdrop').hide();
    }

    function kirimkegizi() {
        pertanyaan.fire({
            title: '<strong>Data <u>Order</u></strong>',
            html: "Gizi sudah <b>BENAR</b>, Order makanan siap dilayani Unit Gizi",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fa fa-check"></i> SELESAI',
            cancelButtonText: '<i class="fa fa-times"></i> Batal!',
            reverseButtons: false,
            allowOutsideClick: false
        }).then((result) => {
            if (result.isConfirmed) {
                KirimOrderkeGizi();
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                tutupmodal();
            }
        });
    }

    function KirimOrderkeGizi() {
        var param = {
            id_order: id_order,
            id_kunj: id_kunj
        };

        apiPOST('Gizi/KirimOrderkeGizi', param, hasil => {
            if (hasil !== null) {
                tutupmodal();
            }
        });
    }
</script>