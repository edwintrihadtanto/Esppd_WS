<?php
$nowday     = date('Y-m-d');
$nextday    = date('Y-m-d', strtotime('+1 days', strtotime($nowday)));
?>
<style>
    .newtable {
        border-collapse: collapse;
        background-color: #f3f6f4;
    }

    .newtable td {
        border: 1px solid;
    }
</style>

<div class="col-md-12 p-2">
    <div style="max-height: 800px; overflow: auto;" >
        <div class="card card-outline card-danger">
            <div class="col-12 p-1">
                <div class="card">
                    <div class="card-header p-2 darkgrey-custom" id="formAssesmenetNeonatus">
                        <h4 class="text-center">
                            ASSESMEN NEONATUS
                        </h4>
                    </div>
                </div>
                <!-- Batas BY GEMOY -->
                <div class="card card-default">
                    <div class="card-header" style="background-color:black;">
                        <h3 class="card-title" style="color:white;">APGAR SCORE</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                    <i class="fas fa-times"></i>
                                                </button> -->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered newtable">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="13" style="padding: 2px;">
                                                            <div class="row d-flex justify-content-center">
                                                                <label class="col-form-label font-weight-bold">APGAR SCORE &nbsp;</label>
                                                                <label class="col-form-label font-italic">(diisi untuk bayi yang lahir di dalam rumah sakit) </label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan="2" width="10%" class="align-middle">
                                                            <div class="row d-flex justify-content-center">
                                                                <label class="col-form-label font-weight-bold">APGAR SCORE</label>
                                                            </div>
                                                        </td>
                                                        <td colspan="3" style="padding: 1px;">
                                                            <div class="row d-flex justify-content-center">
                                                                <label class="col-form-label font-weight-bold">Menit Ke 1</label>
                                                            </div>
                                                        </td>
                                                        <td colspan="3" style="padding: 1px;">
                                                            <div class="row d-flex justify-content-center">
                                                                <label class="col-form-label font-weight-bold">Menit Ke 5</label>
                                                            </div>
                                                        </td>
                                                        <td colspan="3" style="padding: 1px;">
                                                            <div class="row d-flex justify-content-center">
                                                                <label class="col-form-label font-weight-bold">Menit Ke 10</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="14%" style="padding: 1px;">
                                                            <div class="row d-flex justify-content-center">
                                                                <label class="col-form-label font-weight-bold">Kategori</label>
                                                            </div>
                                                        </td>
                                                        <td width="7%" style="padding: 1px;">
                                                            <div class="row d-flex justify-content-center">
                                                                <label class="col-form-label font-weight-bold">Skor</label>
                                                            </div>
                                                        </td>
                                                        <td width="8%" style="padding: 1px;">
                                                            <div class="row d-flex justify-content-center">
                                                                <label class="col-form-label font-weight-bold">Hasil Skor 1’</label>
                                                            </div>
                                                        </td>
                                                        <td width="14%" style="padding: 1px;">
                                                            <div class="row d-flex justify-content-center">
                                                                <label class="col-form-label font-weight-bold">Kategori</label>
                                                            </div>
                                                        </td>
                                                        <td width="7%" style="padding: 1px;">
                                                            <div class="row d-flex justify-content-center">
                                                                <label class="col-form-label font-weight-bold">Skor</label>
                                                            </div>
                                                        </td>
                                                        <td width="8%" style="padding: 1px;">
                                                            <div class="row d-flex justify-content-center">
                                                                <label class="col-form-label font-weight-bold">Hasil Skor 5’</label>
                                                            </div>
                                                        </td>
                                                        <td width="14%" style="padding: 1px;">
                                                            <div class="row d-flex justify-content-center">
                                                                <label class="col-form-label font-weight-bold">Kategori</label>
                                                            </div>
                                                        </td>
                                                        <td width="7%" style="padding: 1px;">
                                                            <div class="row d-flex justify-content-center">
                                                                <label class="col-form-label font-weight-bold">Skor</label>
                                                            </div>
                                                        </td>
                                                        <td width="8%" style="padding: 1px;">
                                                            <div class="row d-flex justify-content-center">
                                                                <label class="col-form-label font-weight-bold">Hasil Skor 10’</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle">
                                                            <div class="row">
                                                                <b>Warna Kulit<br>&nbsp;&nbsp;(Appearance)</label>
                                                            </div>
                                                        </td>
                                                        <td style="padding: 0;">
                                                            <table class="table-bordered table-condensed table-hover" width="100%">
                                                                <tbody>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(1, 0, 1);">
                                                                        <td style="padding: 0;">
                                                                            <label class="col-form-label">&nbsp;&nbsp;Biru / Pucat</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(1, 1, 1);">
                                                                        <td style="padding: 0;">
                                                                            <label class="col-form-label">&nbsp;&nbsp;Ujung-ujung Biru</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(1, 2, 1);">
                                                                        <td style="padding: 0;">
                                                                            <label class="col-form-label">&nbsp;&nbsp;Merah Jambu</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td style="padding: 0;">
                                                            <table class="table-bordered table-condensed table-hover" width="100%">
                                                                <tbody>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(1, 0, 1);">
                                                                        <td align="center" style="padding: 0;">
                                                                            <label class="col-form-label">0</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(1, 1, 1);">
                                                                        <td align="center" style="padding: 0;">
                                                                            <label class="col-form-label">1</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(1, 2, 1);">
                                                                        <td align="center" style="padding: 0;">
                                                                            <label class="col-form-label">2</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td style="padding: 1;" class="align-middle">
                                                            <input type="text" class="form-control" id="dacriasesmenneonatus_apgarSatu" style="text-align:center; font-size: 40px" value="0" disabled>
                                                        </td>
                                                        <td style="padding: 0;">
                                                            <table class="table-bordered table-condensed table-hover" width="100%">
                                                                <tbody>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(2, 0, 1);">
                                                                        <td style="padding: 0;">
                                                                            <label class="col-form-label">&nbsp;&nbsp;Biru / Pucat</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(2, 1, 1);">
                                                                        <td style="padding: 0;">
                                                                            <label class="col-form-label">&nbsp;&nbsp;Ujung-ujung Biru</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(2, 2, 1);">
                                                                        <td style="padding: 0;">
                                                                            <label class="col-form-label">&nbsp;&nbsp;Merah Jambu</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td style="padding: 0;">
                                                            <table class="table-bordered table-condensed table-hover" width="100%">
                                                                <tbody>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(2, 0, 1);">
                                                                        <td align="center" style="padding: 0;">
                                                                            <label class="col-form-label">0</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(2, 1, 1);">
                                                                        <td align="center" style="padding: 0;">
                                                                            <label class="col-form-label">1</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(2, 2, 1);">
                                                                        <td align="center" style="padding: 0;">
                                                                            <label class="col-form-label">2</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td style="padding: 1;" class="align-middle">
                                                            <input type="text" class="form-control" id="dacriasesmenneonatus_apgarDua" style="text-align:center; font-size: 40px" value="0" disabled>
                                                        </td>
                                                        <td style="padding: 0;">
                                                            <table class="table-bordered table-condensed table-hover" width="100%">
                                                                <tbody>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(3, 0, 1);">
                                                                        <td style="padding: 0;">
                                                                            <label class="col-form-label">&nbsp;&nbsp;Biru / Pucat</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(3, 1, 1);">
                                                                        <td style="padding: 0;">
                                                                            <label class="col-form-label">&nbsp;&nbsp;Ujung-ujung Biru</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(3, 2, 1);">
                                                                        <td style="padding: 0;">
                                                                            <label class="col-form-label">&nbsp;&nbsp;Merah Jambu</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td style="padding: 0;">
                                                            <table class="table-bordered table-condensed table-hover" width="100%">
                                                                <tbody>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(3, 0, 1);">
                                                                        <td align="center" style="padding: 0;">
                                                                            <label class="col-form-label">0</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(3, 1, 1);">
                                                                        <td align="center" style="padding: 0;">
                                                                            <label class="col-form-label">1</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(3, 2, 1);">
                                                                        <td align="center" style="padding: 0;">
                                                                            <label class="col-form-label">2</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td style="padding: 1;" class="align-middle">
                                                            <input type="text" class="form-control" id="dacriasesmenneonatus_apgarTiga" style="text-align:center; font-size: 40px" value="0" disabled>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle">
                                                            <div class="row">
                                                                <b>Denyut Jantung<br>(Pulse)</b>
                                                            </div>
                                                        </td>
                                                        <td style="padding: 0;">
                                                            <table class="table-bordered table-condensed table-hover" width="100%">
                                                                <tbody>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(1, 0, 2);">
                                                                        <td style="padding: 0;">
                                                                            <label class="col-form-label">&nbsp;&nbsp;Tidak Ada</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(1, 1, 2);">
                                                                        <td style="padding: 0;">
                                                                            <label class="col-form-label">&nbsp;&nbsp;&lt; 100</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(1, 2, 2);">
                                                                        <td style="padding: 0;">
                                                                            <label class="col-form-label">&nbsp;&nbsp;&gt; 100</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td style="padding: 0;">
                                                            <table class="table-bordered table-condensed table-hover" width="100%">
                                                                <tbody>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(1, 0, 2);">
                                                                        <td align="center" style="padding: 0;">
                                                                            <label class="col-form-label">0</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(1, 1, 2);">
                                                                        <td align="center" style="padding: 0;">
                                                                            <label class="col-form-label">1</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(1, 2, 2);">
                                                                        <td align="center" style="padding: 0;">
                                                                            <label class="col-form-label">2</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td style="padding: 1;" class="align-middle">
                                                            <input type="text" class="form-control" id="dacriasesmenneonatus_apgarEmpat" style="text-align:center; font-size: 40px" value="0" disabled>
                                                        </td>
                                                        <td style="padding: 0;">
                                                            <table class="table-bordered table-condensed table-hover" width="100%">
                                                                <tbody>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(2, 0, 2);">
                                                                        <td style="padding: 0;">
                                                                            <label class="col-form-label">&nbsp;&nbsp;Tidak Ada</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(2, 1, 2);">
                                                                        <td style="padding: 0;">
                                                                            <label class="col-form-label">&nbsp;&nbsp;&lt; 100</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(2, 2, 2);">
                                                                        <td style="padding: 0;">
                                                                            <label class="col-form-label">&nbsp;&nbsp;&gt; 100</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td style="padding: 0;">
                                                            <table class="table-bordered table-condensed table-hover" width="100%">
                                                                <tbody>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(2, 0, 2);">
                                                                        <td align="center" style="padding: 0;">
                                                                            <label class="col-form-label">0</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(2, 1, 2);">
                                                                        <td align="center" style="padding: 0;">
                                                                            <label class="col-form-label">1</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(2, 2, 2);">
                                                                        <td align="center" style="padding: 0;">
                                                                            <label class="col-form-label">2</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td style="padding: 1;" class="align-middle">
                                                            <input type="text" class="form-control" id="dacriasesmenneonatus_apgarLima" style="text-align:center; font-size: 40px" value="0" disabled>
                                                        </td>
                                                        <td style="padding: 0;">
                                                            <table class="table-bordered table-condensed table-hover" width="100%">
                                                                <tbody>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(3, 0, 2);">
                                                                        <td style="padding: 0;">
                                                                            <label class="col-form-label">&nbsp;&nbsp;Tidak Ada</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(3, 1, 2);">
                                                                        <td style="padding: 0;">
                                                                            <label class="col-form-label">&nbsp;&nbsp;&lt; 100</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(3, 2, 2);">
                                                                        <td style="padding: 0;">
                                                                            <label class="col-form-label">&nbsp;&nbsp;&gt; 100</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td style="padding: 0;">
                                                            <table class="table-bordered table-condensed table-hover" width="100%">
                                                                <tbody>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(3, 0, 2);">
                                                                        <td align="center" style="padding: 0;">
                                                                            <label class="col-form-label">0</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(3, 1, 2);">
                                                                        <td align="center" style="padding: 0;">
                                                                            <label class="col-form-label">1</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(3, 2, 2);">
                                                                        <td align="center" style="padding: 0;">
                                                                            <label class="col-form-label">2</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td style="padding: 1;" class="align-middle">
                                                            <input type="text" class="form-control" id="dacriasesmenneonatus_apgarEnam" style="text-align:center; font-size: 40px" value="0" disabled>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle">
                                                            <div class="row">
                                                                <b>Peka Rangsangan<br>(Grimace)</b>
                                                            </div>
                                                        </td>
                                                        <td style="padding: 0;">
                                                            <table class="table-bordered table-condensed table-hover" width="100%">
                                                                <tbody>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(1, 0, 3);">
                                                                        <td style="padding: 0;">
                                                                            <label class="col-form-label">&nbsp;&nbsp;Tidak Ada</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(1, 1, 3);">
                                                                        <td style="padding: 0;">
                                                                            <label class="col-form-label">&nbsp;&nbsp;Meringis</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(1, 2, 3);">
                                                                        <td style="padding: 0;">
                                                                            <label class="col-form-label">&nbsp;&nbsp;Menangis</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td style="padding: 0;">
                                                            <table class="table-bordered table-condensed table-hover" width="100%">
                                                                <tbody>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(1, 0, 3);">
                                                                        <td align="center" style="padding: 0;">
                                                                            <label class="col-form-label">0</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(1, 1, 3);">
                                                                        <td align="center" style="padding: 0;">
                                                                            <label class="col-form-label">1</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(1, 2, 3);">
                                                                        <td align="center" style="padding: 0;">
                                                                            <label class="col-form-label">2</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td style="padding: 1;" class="align-middle">
                                                            <input type="text" class="form-control" id="dacriasesmenneonatus_apgarTujuh" style="text-align:center; font-size: 40px" value="0" disabled>
                                                        </td>
                                                        <td style="padding: 0;">
                                                            <table class="table-bordered table-condensed table-hover" width="100%">
                                                                <tbody>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(2, 0, 3);">
                                                                        <td style="padding: 0;">
                                                                            <label class="col-form-label">&nbsp;&nbsp;Tidak Ada</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(2, 1, 3);">
                                                                        <td style="padding: 0;">
                                                                            <label class="col-form-label">&nbsp;&nbsp;Meringis</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(2, 2, 3);">
                                                                        <td style="padding: 0;">
                                                                            <label class="col-form-label">&nbsp;&nbsp;Menangis</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td style="padding: 0;">
                                                            <table class="table-bordered table-condensed table-hover" width="100%">
                                                                <tbody>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(2, 0, 3);">
                                                                        <td align="center" style="padding: 0;">
                                                                            <label class="col-form-label">0</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(2, 1, 3);">
                                                                        <td align="center" style="padding: 0;">
                                                                            <label class="col-form-label">1</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(2, 2, 3);">
                                                                        <td align="center" style="padding: 0;">
                                                                            <label class="col-form-label">2</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td style="padding: 1;" class="align-middle">
                                                            <input type="text" class="form-control" id="dacriasesmenneonatus_apgarDelapan" style="text-align:center; font-size: 40px" value="0" disabled>
                                                        </td>
                                                        <td style="padding: 0;">
                                                            <table class="table-bordered table-condensed table-hover" width="100%">
                                                                <tbody>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(3, 0, 3);">
                                                                        <td style="padding: 0;">
                                                                            <label class="col-form-label">&nbsp;&nbsp;Tidak Ada</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(3, 1, 3);">
                                                                        <td style="padding: 0;">
                                                                            <label class="col-form-label">&nbsp;&nbsp;Meringis</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(3, 2, 3);">
                                                                        <td style="padding: 0;">
                                                                            <label class="col-form-label">&nbsp;&nbsp;Menangis</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td style="padding: 0;">
                                                            <table class="table-bordered table-condensed table-hover" width="100%">
                                                                <tbody>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(3, 0, 3);">
                                                                        <td align="center" style="padding: 0;">
                                                                            <label class="col-form-label">0</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(3, 1, 3);">
                                                                        <td align="center" style="padding: 0;">
                                                                            <label class="col-form-label">1</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(3, 2, 3);">
                                                                        <td align="center" style="padding: 0;">
                                                                            <label class="col-form-label">2</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td style="padding: 1;" class="align-middle">
                                                            <input type="text" class="form-control" id="dacriasesmenneonatus_apgarSembilan" style="text-align:center; font-size: 40px" value="0" disabled>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle">
                                                            <div class="row">
                                                                <b>Tonus Otot<br>(Activity)</b>
                                                            </div>
                                                        </td>
                                                        <td style="padding: 0;">
                                                            <table class="table-bordered table-condensed table-hover" width="100%">
                                                                <tbody>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(1, 0, 4);">
                                                                        <td style="padding: 0;">
                                                                            <label class="col-form-label">&nbsp;&nbsp;Lemah</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(1, 1, 4);">
                                                                        <td style="padding: 0;">
                                                                            <label class="col-form-label">&nbsp;&nbsp;Sedang</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(1, 2, 4);">
                                                                        <td style="padding: 0;">
                                                                            <label class="col-form-label">&nbsp;&nbsp;Baik</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td style="padding: 0;">
                                                            <table class="table-bordered table-condensed table-hover" width="100%">
                                                                <tbody>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(1, 0, 4);">
                                                                        <td align="center" style="padding: 0;">
                                                                            <label class="col-form-label">0</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(1, 1, 4);">
                                                                        <td align="center" style="padding: 0;">
                                                                            <label class="col-form-label">1</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(1, 2, 4);">
                                                                        <td align="center" style="padding: 0;">
                                                                            <label class="col-form-label">2</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td style="padding: 1;" class="align-middle">
                                                            <input type="text" class="form-control" id="dacriasesmenneonatus_apgarSepuluh" style="text-align:center; font-size: 40px" value="0" disabled>
                                                        </td>
                                                        <td style="padding: 0;">
                                                            <table class="table-bordered table-condensed table-hover" width="100%">
                                                                <tbody>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(2, 0, 4);">
                                                                        <td style="padding: 0;">
                                                                            <label class="col-form-label">&nbsp;&nbsp;Lemah</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(2, 1, 4);">
                                                                        <td style="padding: 0;">
                                                                            <label class="col-form-label">&nbsp;&nbsp;Sedang</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(2, 2, 4);">
                                                                        <td style="padding: 0;">
                                                                            <label class="col-form-label">&nbsp;&nbsp;Baik</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td style="padding: 0;">
                                                            <table class="table-bordered table-condensed table-hover" width="100%">
                                                                <tbody>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(2, 0, 4);">
                                                                        <td align="center" style="padding: 0;">
                                                                            <label class="col-form-label">0</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(2, 1, 4);">
                                                                        <td align="center" style="padding: 0;">
                                                                            <label class="col-form-label">1</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(2, 2, 4);">
                                                                        <td align="center" style="padding: 0;">
                                                                            <label class="col-form-label">2</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td style="padding: 1;" class="align-middle">
                                                            <input type="text" class="form-control" id="dacriasesmenneonatus_apgarSebelas" style="text-align:center; font-size: 40px" value="0" disabled>
                                                        </td>
                                                        <td style="padding: 0;">
                                                            <table class="table-bordered table-condensed table-hover" width="100%">
                                                                <tbody>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(3, 0, 4);">
                                                                        <td style="padding: 0;">
                                                                            <label class="col-form-label">&nbsp;&nbsp;Lemah</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(3, 1, 4);">
                                                                        <td style="padding: 0;">
                                                                            <label class="col-form-label">&nbsp;&nbsp;Sedang</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(3, 2, 4);">
                                                                        <td style="padding: 0;">
                                                                            <label class="col-form-label">&nbsp;&nbsp;Baik</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td style="padding: 0;">
                                                            <table class="table-bordered table-condensed table-hover" width="100%">
                                                                <tbody>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(3, 0, 4);">
                                                                        <td align="center" style="padding: 0;">
                                                                            <label class="col-form-label">0</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(3, 1, 4);">
                                                                        <td align="center" style="padding: 0;">
                                                                            <label class="col-form-label">1</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(3, 2, 4);">
                                                                        <td align="center" style="padding: 0;">
                                                                            <label class="col-form-label">2</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td style="padding: 1;" class="align-middle">
                                                            <input type="text" class="form-control" id="dacriasesmenneonatus_apgarDuabelas" style="text-align:center; font-size: 40px" value="0" disabled>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle">
                                                            <div class="row">
                                                                <b>Pernafasan<br>(Respiration)</b>
                                                            </div>
                                                        </td>
                                                        <td style="padding: 0;">
                                                            <table class="table-bordered table-condensed table-hover" width="100%">
                                                                <tbody>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(1, 0, 5);">
                                                                        <td style="padding: 0;">
                                                                            <label class="col-form-label">&nbsp;&nbsp;Tidak Ada</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(1, 1, 5);">
                                                                        <td style="padding: 0;">
                                                                            <label class="col-form-label">&nbsp;&nbsp;Tidak Teratur</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(1, 2, 5);">
                                                                        <td style="padding: 0;">
                                                                            <label class="col-form-label">&nbsp;&nbsp;Baik</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td style="padding: 0;">
                                                            <table class="table-bordered table-condensed table-hover" width="100%">
                                                                <tbody>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(1, 0, 5);">
                                                                        <td align="center" style="padding: 0;">
                                                                            <label class="col-form-label">0</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(1, 1, 5);">
                                                                        <td align="center" style="padding: 0;">
                                                                            <label class="col-form-label">1</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(1, 2, 5);">
                                                                        <td align="center" style="padding: 0;">
                                                                            <label class="col-form-label">2</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td style="padding: 1;" class="align-middle">
                                                            <input type="text" class="form-control" id="dacriasesmenneonatus_apgarTigabelas" style="text-align:center; font-size: 40px" value="0" disabled>
                                                        </td>
                                                        <td style="padding: 0;">
                                                            <table class="table-bordered table-condensed table-hover" width="100%">
                                                                <tbody>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(2, 0, 5);">
                                                                        <td style="padding: 0;">
                                                                            <label class="col-form-label">&nbsp;&nbsp;Tidak Ada</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(2, 1, 5);">
                                                                        <td style="padding: 0;">
                                                                            <label class="col-form-label">&nbsp;&nbsp;Tidak Teratur</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(2, 2, 5);">
                                                                        <td style="padding: 0;">
                                                                            <label class="col-form-label">&nbsp;&nbsp;Baik</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td style="padding: 0;">
                                                            <table class="table-bordered table-condensed table-hover" width="100%">
                                                                <tbody>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(2, 0, 5);">
                                                                        <td align="center" style="padding: 0;">
                                                                            <label class="col-form-label">0</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(2, 1, 5);">
                                                                        <td align="center" style="padding: 0;">
                                                                            <label class="col-form-label">1</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(2, 2, 5);">
                                                                        <td align="center" style="padding: 0;">
                                                                            <label class="col-form-label">2</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td style="padding: 1;" class="align-middle">
                                                            <input type="text" class="form-control" id="dacriasesmenneonatus_apgarEmpatbelas" style="text-align:center; font-size: 40px" value="0" disabled>
                                                        </td>
                                                        <td style="padding: 0;">
                                                            <table class="table-bordered table-condensed table-hover" width="100%">
                                                                <tbody>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(3, 0, 5);">
                                                                        <td style="padding: 0;">
                                                                            <label class="col-form-label">&nbsp;&nbsp;Tidak Ada</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(3, 1, 5);">
                                                                        <td style="padding: 0;">
                                                                            <label class="col-form-label">&nbsp;&nbsp;Tidak Teratur</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(3, 2, 5);">
                                                                        <td style="padding: 0;">
                                                                            <label class="col-form-label">&nbsp;&nbsp;Baik</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td style="padding: 0;">
                                                            <table class="table-bordered table-condensed table-hover" width="100%">
                                                                <tbody>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(3, 0, 5);">
                                                                        <td align="center" style="padding: 0;">
                                                                            <label class="col-form-label">0</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(3, 1, 5);">
                                                                        <td align="center" style="padding: 0;">
                                                                            <label class="col-form-label">1</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setApgar(3, 2, 5);">
                                                                        <td align="center" style="padding: 0;">
                                                                            <label class="col-form-label">2</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td style="padding: 1;" class="align-middle">
                                                            <input type="text" class="form-control" id="dacriasesmenneonatus_apgarLimabelas" style="text-align:center; font-size: 40px" value="0" disabled>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding: 0;" class="align-middle">
                                                            <div class="row d-flex justify-content-center">
                                                                <label class="col-form-label font-weight-bold">TOTAL</label>
                                                            </div>
                                                        </td>
                                                        <td colspan="2" style="padding: 0;" class="align-middle">
                                                            <div class="row d-flex justify-content-center">
                                                                <label class="col-form-label font-weight-bold">SKOR 1'</label>
                                                            </div>
                                                        </td>
                                                        <td style="padding: 1;" class="align-middle">
                                                            <input type="text" class="form-control" id="dacriasesmenneonatus_apgartotMsatu" style="text-align:center; font-size: 40px" value="0" disabled>
                                                        </td>
                                                        <td colspan="2" style="padding: 0;" class="align-middle">
                                                            <div class="row d-flex justify-content-center">
                                                                <label class="col-form-label font-weight-bold">SKOR 5'</label>
                                                            </div>
                                                        </td>
                                                        <td style="padding: 1;" class="align-middle">
                                                            <input type="text" class="form-control" id="dacriasesmenneonatus_bpgartotMlima" style="text-align:center; font-size: 40px" value="0" disabled>
                                                        </td>
                                                        <td colspan="2" style="padding: 0;" class="align-middle">
                                                            <div class="row d-flex justify-content-center">
                                                                <label class="col-form-label font-weight-bold">SKOR 10'</label>
                                                            </div>
                                                        </td>
                                                        <td style="padding: 1;" class="align-middle">
                                                            <input type="text" class="form-control" id="dacriasesmenneonatus_cpgartotMsepuluh" style="text-align:center; font-size: 40px" value="0" disabled>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="info-box mb-0">
                                <div class="col-md-12">
                                    <div class="form-group row" style="border-bottom-style: solid; border-bottom-width: thin;">
                                        <div class="col-md-2">
                                            <label class="col-form-label">Sumber Informasi </label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row" id="dacriasesmenneonatus_bsumberlist">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline" id="dacriasesmenneonatus_bsumberlistdiv_1">
                                                            <input name="dacriasesmenneonatus_bsumberlist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_bsumberlist_1">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_bsumberlist_1">Petugas Kesehatan</label>
                                                        </div>
                                                        <div class="row" id="dacriasesmenneonatus_div_bsumberlist1" style="display: none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input type="text" name="dacriasesmenneonatus_bsumberlistket1" id="dacriasesmenneonatus_bsumberlistket1" style="width:100%;" class="form-control form-control-xs">
                                                            </div>*
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline" id="dacriasesmenneonatus_bsumberlistdiv_2">
                                                            <input name="dacriasesmenneonatus_bsumberlist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_bsumberlist_2">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_bsumberlist_2">Keluarga / Orang Lain</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline" id="dacriasesmenneonatus_bsumberlistdiv_3" style="display: none;">
                                                            <input name="dacriasesmenneonatus_bsumberlist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_bsumberlist_3">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_bsumberlist_3">Hub dengan Pasien</label>
                                                        </div>

                                                        <div class="row" id="dacriasesmenneonatus_div_bsumberlist3" style="display: none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input type="text" name="dacriasesmenneonatus_bsumberlistket3" id="dacriasesmenneonatus_bsumberlistket3" style="width:100%;" class="form-control form-control-xs">
                                                            </div>*
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0" style="padding-bottom: 6px; border-bottom-style: solid; border-bottom-width: thin;">
                                        <div class="col-md-2">
                                            <label class="col-form-label">Cara Masuk</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row" id="dacriasesmenneonatus_bmasukId">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_bmasukId" value="1" type="radio" class="custom-control-input" id="dacriasesmenneonatus_bmasukId_1" checked>
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_bmasukId_1">Digendong</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_bmasukId" value="2" type="radio" class="custom-control-input" id="dacriasesmenneonatus_bmasukId_2">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_bmasukId_2">Infant Warmer</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_bmasukId" value="3" type="radio" class="custom-control-input" id="dacriasesmenneonatus_bmasukId_3">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_bmasukId_3">Box Bayi</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_bmasukId" value="4" type="radio" class="custom-control-input" id="dacriasesmenneonatus_bmasukId_4">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_bmasukId_4">Incubator Transport</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_bmasukId" value="5" type="radio" class="custom-control-input" id="dacriasesmenneonatus_bmasukId_5">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_bmasukId_5">Lain-lain</label>
                                                        </div>
                                                        <div class="row" id="dacriasesmenneonatus_div_bmasukId5" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input type="text" name="dacriasesmenneonatus_bmasuklain" id="dacriasesmenneonatus_bmasuklain" style="width:100%;" class="form-control">
                                                            </div>*
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row" style="padding-bottom: 6px; border-bottom-style: solid; border-bottom-width: thin;">
                                        <div class="col-md-2">
                                            <label class="col-form-label">Asal Masuk Pasien</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row" id="dacriasesmenneonatus_basalId">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_basalId" value="1" type="radio" class="custom-control-input" id="dacriasesmenneonatus_basalId_1" checked>
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_basalId_1">IGD</label>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_basalId" value="2" type="radio" class="custom-control-input" id="dacriasesmenneonatus_basalId_2">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_basalId_2">Poliklinik</label>
                                                        </div>
                                                        <div class="row" id="dacriasesmenneonatus_div_basalId2" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input type="text" name="dacriasesmenneonatus_basalpoli" id="dacriasesmenneonatus_basalpoli" style="width:100%;" class="form-control">
                                                            </div>*
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_basalId" value="3" type="radio" class="custom-control-input" id="dacriasesmenneonatus_basalId_3">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_basalId_3">Kamar Bersalin</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_basalId" value="4" type="radio" class="custom-control-input" id="dacriasesmenneonatus_basalId_4">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_basalId_4">NICU</label>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_basalId" value="5" type="radio" class="custom-control-input" id="dacriasesmenneonatus_basalId_5">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_basalId_5">Kamar Operasi</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_basalId" value="6" type="radio" class="custom-control-input" id="dacriasesmenneonatus_basalId_6">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_basalId_6">Lain-lain</label>
                                                        </div>

                                                        <div class="row" id="dacriasesmenneonatus_div_basalId6" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input type="text" name="dacriasesmenneonatus_basallain" id="dacriasesmenneonatus_basallain" style="width:100%;" class="form-control">
                                                            </div>*
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
                <div class="card card-default">
                    <div class="card-header" style="background-color:black;">
                        <h3 class="card-title" style="color:white;">Riwayat Kehamilan Ibu &amp; Persalinan</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                    <i class="fas fa-times"></i>
                                                </button> -->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row mb-0">
                                    <div class="col-md-4">
                                        <label class="col-form-label">Kehamilan Ke</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <span class="input-group-prepend">
                                                        <span class="input-group-text form-control-xs">&nbsp;G&nbsp;</span>
                                                    </span>
                                                    <input type="number" onfocus="this.select();" class="form-control form-control-xs" id="dacriasesmenneonatus_bg">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <span class="input-group-prepend">
                                                        <span class="input-group-text form-control-xs">&nbsp;P&nbsp;</span>
                                                    </span>
                                                    <input type="number" onfocus="this.select();" class="form-control form-control-xs" id="dacriasesmenneonatus_bp">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <span class="input-group-prepend">
                                                        <span class="input-group-text form-control-xs">&nbsp;A&nbsp;</span>
                                                    </span>
                                                    <input type="number" onfocus="this.select();" class="form-control form-control-xs" id="dacriasesmenneonatus_ba">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-4">
                                        <label class="col-form-label">Usia Kehamilan</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <input type="number" onfocus="this.select();" class="form-control form-control-xs" id="dacriasesmenneonatus_busiahamil">
                                                    <span class="input-group-append">
                                                        <span class="input-group-text form-control-xs">minggu</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-4">
                                        <label class="col-form-label">Komplikasi/Penyulit Hamil</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row" id="dacriasesmenneonatus_bkomplikasi">
                                            <div class="col-md-5">
                                                <div class="col-md-12">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenneonatus_bkomplikasi" value="1" type="radio" class="custom-control-input" id="dacriasesmenneonatus_bkomplikasi_1" checked>
                                                        <label class="custom-control-label" for="dacriasesmenneonatus_bkomplikasi_1">Tidak</label>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="col-md-12">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenneonatus_bkomplikasi" value="2" type="radio" class="custom-control-input" id="dacriasesmenneonatus_bkomplikasi_2">
                                                        <label class="custom-control-label" for="dacriasesmenneonatus_bkomplikasi_2">Ya</label>
                                                    </div>
                                                    <div class="row" id="dacriasesmenneonatus_div_bkomplikasi2" style="display:none;">
                                                        <div class="col-md-1">
                                                        </div>
                                                        <div class="col-md-10">
                                                            <input type="text" name="dacriasesmenneonatus_bkomplikasiket" id="dacriasesmenneonatus_bkomplikasiket" style="width:100%;" class="form-control">
                                                        </div>*
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-4">
                                        <label class="col-form-label">Golongan Darah Ibu</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row" id="dacriasesmenneonatus_bgoldaribu">
                                            <div class="col-md-5">
                                                <div class="col-md-12">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenneonatus_bgoldaribu" value="1" type="radio" class="custom-control-input" id="dacriasesmenneonatus_bgoldaribu_1" checked>
                                                        <label class="custom-control-label" for="dacriasesmenneonatus_bgoldaribu_1">A</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="col-md-12">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenneonatus_bgoldaribu" value="2" type="radio" class="custom-control-input" id="dacriasesmenneonatus_bgoldaribu_2">
                                                        <label class="custom-control-label" for="dacriasesmenneonatus_bgoldaribu_2">B</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="col-md-12">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenneonatus_bgoldaribu" value="3" type="radio" class="custom-control-input" id="dacriasesmenneonatus_bgoldaribu_3">
                                                        <label class="custom-control-label" for="dacriasesmenneonatus_bgoldaribu_3">O</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="col-md-12">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenneonatus_bgoldaribu" value="4" type="radio" class="custom-control-input" id="dacriasesmenneonatus_bgoldaribu_4">
                                                        <label class="custom-control-label" for="dacriasesmenneonatus_bgoldaribu_4">AB</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="col-md-12">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenneonatus_bgoldaribu" value="5" type="radio" class="custom-control-input" id="dacriasesmenneonatus_bgoldaribu_5">
                                                        <label class="custom-control-label" for="dacriasesmenneonatus_bgoldaribu_5">Belum Diperiksa</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-4">
                                        <label class="col-form-label">Rhesus Ibu</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row" id="dacriasesmenneonatus_brhesus">
                                            <div class="col-md-5">
                                                <div class="col-md-12">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenneonatus_brhesus" value="1" type="radio" class="custom-control-input" id="dacriasesmenneonatus_brhesus_1" checked>
                                                        <label class="custom-control-label" for="dacriasesmenneonatus_brhesus_1">Rh+</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="col-md-12">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenneonatus_brhesus" value="2" type="radio" class="custom-control-input" id="dacriasesmenneonatus_brhesus_2">
                                                        <label class="custom-control-label" for="dacriasesmenneonatus_brhesus_2">Rh-</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="col-md-12">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenneonatus_brhesus" value="3" type="radio" class="custom-control-input" id="dacriasesmenneonatus_brhesus_3">
                                                        <label class="custom-control-label" for="dacriasesmenneonatus_brhesus_3">Belum Diperiksa</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-4">
                                        <label class="col-form-label">Jenis Persalinan</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row" id="dacriasesmenneonatus_bjenispersalinan">
                                            <div class="col-md-5">
                                                <div class="col-md-12">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenneonatus_bjenispersalinan" value="1" type="radio" class="custom-control-input" id="dacriasesmenneonatus_bjenispersalinan_1" checked>
                                                        <label class="custom-control-label" for="dacriasesmenneonatus_bjenispersalinan_1">Spontan</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="col-md-12">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenneonatus_bjenispersalinan" value="2" type="radio" class="custom-control-input" id="dacriasesmenneonatus_bjenispersalinan_2">
                                                        <label class="custom-control-label" for="dacriasesmenneonatus_bjenispersalinan_2">Vacum Ekstraksi</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="col-md-12">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenneonatus_bjenispersalinan" value="3" type="radio" class="custom-control-input" id="dacriasesmenneonatus_bjenispersalinan_3">
                                                        <label class="custom-control-label" for="dacriasesmenneonatus_bjenispersalinan_3">Sectio Caesarian</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row mb-0">
                                    <div class="col-md-4">
                                        <label class="col-form-label">Indikasi Jenis Persalinan *</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="text" name="dacriasesmenneonatus_bindikasi" id="dacriasesmenneonatus_bindikasi" style="width:100%;" class="form-control form-control-xs">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-4">
                                        <label class="col-form-label">Presentasi *</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="text" name="dacriasesmenneonatus_bpersentasi" id="dacriasesmenneonatus_bpersentasi" style="width:100%;" class="form-control form-control-xs">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-4">
                                        <label class="col-form-label">Placenta Lahir</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row" id="dacriasesmenneonatus_bplacenta">
                                            <div class="col-md-5">
                                                <div class="col-md-12">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenneonatus_bplacenta" value="1" type="radio" class="custom-control-input" id="dacriasesmenneonatus_bplacenta_1">
                                                        <label class="custom-control-label" for="dacriasesmenneonatus_bplacenta_1">Spontan</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="col-md-12">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenneonatus_bplacenta" value="2" type="radio" class="custom-control-input" id="dacriasesmenneonatus_bplacenta_2">
                                                        <label class="custom-control-label" for="dacriasesmenneonatus_bplacenta_2">Manual</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-4">
                                        <label class="col-form-label">KPD</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row" id="dacriasesmenneonatus_bkpd">
                                            <div class="col-md-5">
                                                <div class="col-md-12">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenneonatus_bkpd" value="1" type="radio" class="custom-control-input" id="dacriasesmenneonatus_bkpd_1">
                                                        <label class="custom-control-label" for="dacriasesmenneonatus_bkpd_1">Tidak</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="col-md-12">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenneonatus_bkpd" value="2" type="radio" class="custom-control-input" id="dacriasesmenneonatus_bkpd_2">
                                                        <label class="custom-control-label" for="dacriasesmenneonatus_bkpd_2">Ya</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-0 d-none">
                                    <div class="col-md-4">
                                        <label class="col-form-label">APGAR Skor</label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <input type="number" class="form-control" onfocus="this.select();" id="dacriasesmenneonatus_bapgar1">
                                                    <span class="input-group-append">
                                                        <span class="input-group-text">&nbsp;/&nbsp;</span>
                                                    </span>
                                                    <input type="number" class="form-control" onfocus="this.select();" id="dacriasesmenneonatus_bapgar2">
                                                    <span class="input-group-append">
                                                        <span class="input-group-text">&nbsp;/&nbsp;</span>
                                                    </span>
                                                    <input type="number" class="form-control" onfocus="this.select();" id="dacriasesmenneonatus_bapgar3">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-4">
                                        <label class="col-form-label">Obat-obatan Selama Persalinan</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row" id="dacriasesmenneonatus_bobatsalin">
                                            <div class="col-md-5">
                                                <div class="col-md-12">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenneonatus_bobatsalin" value="1" type="radio" class="custom-control-input" id="dacriasesmenneonatus_bobatsalin_1">
                                                        <label class="custom-control-label" for="dacriasesmenneonatus_bobatsalin_1">Tidak</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="col-md-12">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenneonatus_bobatsalin" value="2" type="radio" class="custom-control-input" id="dacriasesmenneonatus_bobatsalin_2">
                                                        <label class="custom-control-label" for="dacriasesmenneonatus_bobatsalin_2">Ya</label>
                                                    </div>
                                                    <div class="row" id="dacriasesmenneonatus_div_bobatsalin2" style="display:none;">
                                                        <div class="col-md-1">
                                                        </div>
                                                        <div class="col-md-10">
                                                            <textarea rows="3" name="dacriasesmenneonatus_bobatsalinket" id="dacriasesmenneonatus_bobatsalinket" style="width:100%;" class="form-control"></textarea>
                                                        </div>*
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-4">
                                        <label class="col-form-label">Persalinan Ditolong Oleh</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row" id="dacriasesmenneonatus_btolong">
                                            <div class="col-md-5">
                                                <div class="col-md-12">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenneonatus_btolong" value="1" type="radio" class="custom-control-input" id="dacriasesmenneonatus_btolong_1">
                                                        <label class="custom-control-label" for="dacriasesmenneonatus_btolong_1">Dokter Obsgyn</label>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="col-md-12">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenneonatus_btolong" value="2" type="radio" class="custom-control-input" id="dacriasesmenneonatus_btolong_2">
                                                        <label class="custom-control-label" for="dacriasesmenneonatus_btolong_2">Dokter Umum</label>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="col-md-12">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenneonatus_btolong" value="3" type="radio" class="custom-control-input" id="dacriasesmenneonatus_btolong_3">
                                                        <label class="custom-control-label" for="dacriasesmenneonatus_btolong_3">Bidan</label>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="col-md-12">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenneonatus_btolong" value="4" type="radio" class="custom-control-input" id="dacriasesmenneonatus_btolong_4">
                                                        <label class="custom-control-label" for="dacriasesmenneonatus_btolong_4">Dukun</label>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="col-md-12">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenneonatus_btolong" value="5" type="radio" class="custom-control-input" id="dacriasesmenneonatus_btolong_5">
                                                        <label class="custom-control-label" for="dacriasesmenneonatus_btolong_5">Lain-Lain</label>
                                                    </div>
                                                    <div class="row" id="dacriasesmenneonatus_div_btolong5" style="display:none;">
                                                        <div class="col-md-1">
                                                        </div>
                                                        <div class="col-md-10">
                                                            <input type="text" name="dacriasesmenneonatus_btolongket" id="dacriasesmenneonatus_btolongket" style="width:100%;" class="form-control">
                                                        </div>*
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
                <!-- BATAS -->
                <div class="card card-default">
                    <div class="card-header" style="background-color:black;">
                        <h3 class="card-title" style="color:white;">Imunisasi yang Sudah Diberikan</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                    <i class="fas fa-times"></i>
                                                </button> -->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="row ">
                                </div>
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-default">
                    <div class="card-header" style="background-color:black;">
                        <h3 class="card-title" style="color:white;">Risiko Terjadi Infeksi Nosokomial</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                    <i class="fas fa-times"></i>
                                                </button> -->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-group row mb-0">
                                    <div class="col-md-2">
                                        <label class="col-form-label">Pasien Intensive Neonatus</label>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row" id="dacriasesmenneonatus_bintensive">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenneonatus_bintensive" value="1" type="radio" class="custom-control-input" id="dacriasesmenneonatus_bintensive_1">
                                                        <label class="custom-control-label" for="dacriasesmenneonatus_bintensive_1">Tidak</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenneonatus_bintensive" value="2" type="radio" class="custom-control-input" id="dacriasesmenneonatus_bintensive_2">
                                                        <label class="custom-control-label" for="dacriasesmenneonatus_bintensive_2">Ya</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-0" id="dacriasesmenneonatus_div_bintensive2" style="display: none;">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-10">
                                        <div class="row" id="dacriasesmenneonatus_bintensiveisi">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenneonatus_bintensiveisi" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_bintensiveisi_1">
                                                        <label class="custom-control-label" for="dacriasesmenneonatus_bintensiveisi_1">Tidak Ada</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenneonatus_bintensiveisi" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_bintensiveisi_2">
                                                        <label class="custom-control-label" for="dacriasesmenneonatus_bintensiveisi_2">Ada Luka</label>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenneonatus_bintensiveisi" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_bintensiveisi_3">
                                                        <label class="custom-control-label" for="dacriasesmenneonatus_bintensiveisi_3">Imunitas Menurun</label>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenneonatus_bintensiveisi" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_bintensiveisi_4">
                                                        <label class="custom-control-label" for="dacriasesmenneonatus_bintensiveisi_4">Post Oprasi Besar</label>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenneonatus_bintensiveisi" value="5" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_bintensiveisi_5">
                                                        <label class="custom-control-label" for="dacriasesmenneonatus_bintensiveisi_5">Terpasang Alat Medis Invasif</label>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenneonatus_bintensiveisi" value="6" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_bintensiveisi_6">
                                                        <label class="custom-control-label" for="dacriasesmenneonatus_bintensiveisi_6">Lain-lain</label>
                                                    </div>
                                                    <div class="row" id="dacriasesmenneonatus_div_bintensiveisi6" style="display:none;">
                                                        <div class="col-md-1">
                                                        </div>
                                                        <div class="col-md-10">
                                                            <input type="text" name="dacriasesmenneonatus_bintensiveisiket6" id="dacriasesmenneonatus_bintensiveisiket6" style="width:100%;" class="form-control">
                                                        </div>*
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-2">
                                        <label class="col-form-label font-weight-bold">Risiko Memaparkan Infeksi</label>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row p-0" id="dacriasesmenneonatus_binfeksi">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenneonatus_binfeksi" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_binfeksi_1">
                                                        <label class="custom-control-label" for="dacriasesmenneonatus_binfeksi_1">Tidak Ada Risiko</label>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenneonatus_binfeksi" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_binfeksi_2">
                                                        <label class="custom-control-label" for="dacriasesmenneonatus_binfeksi_2">Pneumonia / Influenza</label>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenneonatus_binfeksi" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_binfeksi_3">
                                                        <label class="custom-control-label" for="dacriasesmenneonatus_binfeksi_3">Hepatitis A</label>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenneonatus_binfeksi" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_binfeksi_4">
                                                        <label class="custom-control-label" for="dacriasesmenneonatus_binfeksi_4">Hepatitis B</label>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenneonatus_binfeksi" value="5" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_binfeksi_5">
                                                        <label class="custom-control-label" for="dacriasesmenneonatus_binfeksi_5">Hepatitis C</label>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenneonatus_binfeksi" value="6" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_binfeksi_6">
                                                        <label class="custom-control-label" for="dacriasesmenneonatus_binfeksi_6">Thypoid</label>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenneonatus_binfeksi" value="7" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_binfeksi_7">
                                                        <label class="custom-control-label" for="dacriasesmenneonatus_binfeksi_7">Diare</label>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenneonatus_binfeksi" value="8" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_binfeksi_8">
                                                        <label class="custom-control-label" for="dacriasesmenneonatus_binfeksi_8">HIV / AIDS</label>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenneonatus_binfeksi" value="9" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_binfeksi_9">
                                                        <label class="custom-control-label" for="dacriasesmenneonatus_binfeksi_9">TB</label>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="row custom-control custom-checkbox custom-control-inline">
                                                        <input name="dacriasesmenneonatus_binfeksi" value="10" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_binfeksi_10">
                                                        <label class="custom-control-label" for="dacriasesmenneonatus_binfeksi_10">Lain-lain</label>
                                                    </div>
                                                    <div class="row" id="dacriasesmenneonatus_div_binfeksi10" style="display:none;">
                                                        <div class="col-md-1">
                                                        </div>
                                                        <div class="col-md-10">
                                                            <input type="text" name="dacriasesmenneonatus_binfeksiket10" id="dacriasesmenneonatus_binfeksiket10" style="width:100%;" class="form-control">
                                                        </div>*
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
                <div class="card card-default">
                    <div class="card-header" style="background-color:black;">
                        <h3 class="card-title" style="color:white;">PEMERIKSAAN FISIK (Tanda Vital)</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                    <i class="fas fa-times"></i>
                                                </button> -->
                        </div>
                    </div>
                    <div class="col-lg-12 row">
                        <div class="card-body">
                            <div class="row ">
                                <div class="col-md-4">
                                    <div class="form-group row mb-0">
                                        <div class="col-md-3">
                                            <label class="col-form-label" title="Keadaan Umum">Keadaan Umum</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <select name="akeadaan" id="dacriasesmenneonatus_akeadaan" class="form-control form-control-xs">
                                                    <option value="1">Tampak Tidak Sakit</option>
                                                    <option value="2">Sakit Ringan</option>
                                                    <option value="3">Sakit Sedang</option>
                                                    <option value="4">Sakit Berat</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-3">
                                            <label class="col-form-label" title="Respirasi">Respirasi</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input type="number" onfocus="this.select();" class="form-control form-control-xs" id="dacriasesmenneonatus_crespirasi">
                                                <span class="input-group-append">
                                                    <span class="input-group-text form-control-xs">x/Menit</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-3">
                                            <label class="col-form-label" title="Nadi">Nadi</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input type="number" onfocus="this.select();" class="form-control form-control-xs" id="dacriasesmenneonatus_dnadi">
                                                <span class="input-group-append">
                                                    <span class="input-group-text form-control-xs">x/Menit</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-3">
                                            <label class="col-form-label" title="Spo2">SpO2</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input type="number" onfocus="this.select();" class="form-control form-control-xs" id="dacriasesmenneonatus_hspo2">
                                                <span class="input-group-append">
                                                    <span class="input-group-text form-control-xs">%</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-3">
                                            <label class="col-form-label" title="Reflek Cahaya">Reflek Cahaya</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text form-control-xs">Kiri</span>
                                                </span>
                                                <select name="ireflek1" id="dacriasesmenneonatus_ireflek1" class="form-control form-control-xs">
                                                    <option value="1">+</option>
                                                    <option value="2">-</option>
                                                </select>
                                                -
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text form-control-xs">Kanan</span>
                                                </span>
                                                <select name="ireflek1" id="dacriasesmenneonatus_ireflek2" class="form-control form-control-xs">
                                                    <option value="1">+</option>
                                                    <option value="2">-</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-3">
                                            <label class="col-form-label" title="Pupil">Pupil</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text form-control-xs">Kiri</span>
                                                </span>
                                                <select name="epupil1" id="dacriasesmenneonatus_epupil1" class="form-control form-control-xs">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                                -
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text form-control-xs">Kanan</span>
                                                </span>
                                                <select name="epupil2" id="dacriasesmenneonatus_epupil2" class="form-control form-control-xs">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                                <span class="input-group-append">
                                                    <span class="input-group-text form-control-xs">mm</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row mb-0">
                                        <div class="col-md-3">
                                            <label class="col-form-label" title="Tensi">Tekanan Darah</label>
                                        </div>
                                        <div class="col-md-9" id="dacriasesmenneonatus_gtdId">
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmenneonatus_gtdId" value="1" type="radio" class="custom-control-input" id="dacriasesmenneonatus_gtdId_1">
                                                <label class="custom-control-label" for="dacriasesmenneonatus_gtdId_1">Tidak Diperiksa</label>
                                            </div>
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input name="dacriasesmenneonatus_gtdId" value="2" type="radio" class="custom-control-input" id="dacriasesmenneonatus_gtdId_2">
                                                <label class="custom-control-label" for="dacriasesmenneonatus_gtdId_2">Diperiksa</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0" id="dacriasesmenneonatus_div_gtdId2" style="display: none;">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-8" style="padding-bottom: 3px;">
                                            <div class="input-group">
                                                <input type="number" onfocus="this.select();" class="form-control form-control-xs" id="dacriasesmenneonatus_ftensi1">
                                                <label class="col-form-label">/</label>
                                                <input type="number" onfocus="this.select();" class="form-control form-control-xs" id="dacriasesmenneonatus_ftensi2">
                                                <span class="input-group-append">
                                                    <span class="input-group-text form-control-xs">mmHg</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-3">
                                            <label class="col-form-label" title="Tensi"></label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input type="text" id="dacriasesmenneonatus_fpalpasi" class="form-control form-control-xs" placeholder="Diisi jika Palpasi">
                                                <span class="input-group-append">
                                                    <span class="input-group-text form-control-xs">Per palpasi</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-3">
                                            <label class="col-form-label" title="Suhu">Suhu</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input type="number" onfocus="this.select();" class="form-control form-control-xs" id="dacriasesmenneonatus_gsuhu">
                                                <span class="input-group-append">
                                                    <span class="input-group-text form-control-xs">°C</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-3">
                                            <label class="col-form-label">Lingkar Kepala</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input type="number" onfocus="this.select();" class="form-control form-control-xs" id="dacriasesmenneonatus_glk">
                                                <span class="input-group-append">
                                                    <span class="input-group-text form-control-xs">Cm</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-3">
                                            <label class="col-form-label">Lingkar Dada</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input type="number" onfocus="this.select();" class="form-control form-control-xs" id="dacriasesmenneonatus_gld">
                                                <span class="input-group-append">
                                                    <span class="input-group-text form-control-xs">Cm</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-3">
                                            <label class="col-form-label">Lingkar Perut</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input type="number" onfocus="this.select();" class="form-control form-control-xs" id="dacriasesmenneonatus_glp">
                                                <span class="input-group-append">
                                                    <span class="input-group-text form-control-xs">Cm</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-3">
                                            <label class="col-form-label">Lingkar Lengan</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input type="number" onfocus="this.select();" class="form-control form-control-xs" id="dacriasesmenneonatus_gll">
                                                <span class="input-group-append">
                                                    <span class="input-group-text form-control-xs">Cm</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row mb-0">
                                        <div class="col-md-12">
                                            <label class="col-form-label text-danger font-weight-bold font-italic" title="Berat Badan">Note (*) Nominal ribuan = gram, satuan / puluhan / ratusan = kg</label>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-3">
                                            <label class="col-form-label" title="Berat Badan">Berat Badan</label> <span class="text-danger">*</span>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input type="number" onfocus="this.select();" class="form-control form-control-xs" id="dacriasesmenneonatus_jbb" onkeyup="dacriasesmenneonatusex.onChangeIMT();">
                                                <span class="input-group-append">
                                                    <span class="input-group-text form-control-xs" id="dacriasesmenneonatus_divbb">Gram</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-3">
                                            <label class="col-form-label" title="Tinggi Badan">Panjang Badan</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input type="number" onfocus="this.select();" class="form-control form-control-xs" id="dacriasesmenneonatus_jtb" onkeyup="dacriasesmenneonatusex.onChangeIMT();">
                                                <span class="input-group-append">
                                                    <span class="input-group-text form-control-xs">Cm</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-3">
                                            <label class="col-form-label" title="Tinggi Badan">IMT</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="number" onfocus="this.select();" class="form-control form-control-xs" id="dacriasesmenneonatus_kimt">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-3">
                                            <label class="col-form-label" title="Tinggi Badan">Kategori IMT</label>
                                        </div>
                                        <div class="col-md-8">
                                            <label class="col-form-label font-weight-bold" id="dacriasesmenneonatus_hasilimt">Kekurangan berat badan tingkat BERAT</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- DOWN SCORE -->
                            <div class="row ">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered newtable table-sm" width="100%">
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="5" width="30%">
                                                                <div class="row d-flex justify-content-center">
                                                                    <label class="col-form-label font-weight-bold" style="font-size: 14px;">Down Score</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                                <div class="row d-flex" style="padding-left: 15px;">
                                                                    <b>Kriteria</b>
                                                                </div>
                                                            </td>
                                                            <td width="20%">
                                                                <div class="row d-flex justify-content-center">
                                                                    <b>0</b>
                                                                </div>
                                                            </td>
                                                            <td width="20%">
                                                                <div class="row d-flex justify-content-center">
                                                                    <b>1</b>
                                                                </div>
                                                            </td>
                                                            <td width="20%">
                                                                <div class="row d-flex justify-content-center">
                                                                    <b>2</b>
                                                                </div>
                                                            </td>
                                                            <td width="20%">
                                                                <div class="row d-flex justify-content-center">
                                                                    <b>Skor</b>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="row d-flex" style="padding-left: 15px;">
                                                                    <b>Pernafasan</b>
                                                                </div>
                                                            </td>
                                                            <td onclick="dacriasesmenneonatusex_setScoreDS(0, 1);">
                                                                <div class="row d-flex justify-content-center">
                                                                    <b>60 x/menit</b>
                                                                </div>
                                                            </td>
                                                            <td onclick="dacriasesmenneonatusex_setScoreDS(1, 1);">
                                                                <div class="row d-flex justify-content-center">
                                                                    <b>60 - 80 x/menit</b>
                                                                </div>
                                                            </td>
                                                            <td onclick="dacriasesmenneonatusex_setScoreDS(2, 1);">
                                                                <div class="row d-flex justify-content-center">
                                                                    <b>&gt; 80 x/menit</b>
                                                                </div>
                                                            </td>
                                                            <td align="center" width="100%" style="padding: 0;">
                                                                <input type="text" class="form-control" id="dacriasesmenneonatusex_setScoreDSSatu" style="text-align:center; font-size: 40px" value="0" disabled>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="row d-flex" style="padding-left: 15px;">
                                                                    <b>Retraksi</b>
                                                                </div>
                                                            </td>
                                                            <td onclick="dacriasesmenneonatusex_setScoreDS(0, 2);">
                                                                <div class="row d-flex justify-content-center">
                                                                    <b>Tidak Ada</b>
                                                                </div>
                                                            </td>
                                                            <td onclick="dacriasesmenneonatusex_setScoreDS(1, 2);">
                                                                <div class="row d-flex justify-content-center">
                                                                    <b>Retraksi Ringan</b>
                                                                </div>
                                                            </td>
                                                            <td onclick="dacriasesmenneonatusex_setScoreDS(2, 2);">
                                                                <div class="row d-flex justify-content-center">
                                                                    <b>Retraksi Berat</b>
                                                                </div>
                                                            </td>
                                                            <td align="center" width="100%" style="padding: 0;">
                                                                <input type="text" class="form-control" id="dacriasesmenneonatusex_setScoreDSDua" style="text-align:center; font-size: 40px" value="0" disabled>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="row d-flex" style="padding-left: 15px;">
                                                                    <b>Sianosis</b>
                                                                </div>
                                                            </td>
                                                            <td onclick="dacriasesmenneonatusex_setScoreDS(0, 3);">
                                                                <div class="row d-flex justify-content-center">
                                                                    <b>Tidak Ada</b>
                                                                </div>
                                                            </td>
                                                            <td onclick="dacriasesmenneonatusex_setScoreDS(1, 3);">
                                                                <div class="row d-flex justify-content-center">
                                                                    <b>Hilang Dengan Pemberian O2</b>
                                                                </div>
                                                            </td>
                                                            <td onclick="dacriasesmenneonatusex_setScoreDS(2, 3);">
                                                                <div class="row d-flex justify-content-center">
                                                                    <b>Menetap Walaupun Diberi O2</b>
                                                                </div>
                                                            </td>
                                                            <td align="center" width="100%" style="padding: 0;">
                                                                <input type="text" class="form-control" id="dacriasesmenneonatusex_setScoreDSTiga" style="text-align:center; font-size: 40px" value="0" disabled>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="row d-flex" style="padding-left: 15px;">
                                                                    <b>Air Entry</b>
                                                                </div>
                                                            </td>
                                                            <td onclick="dacriasesmenneonatusex_setScoreDS(0, 4);">
                                                                <div class="row d-flex justify-content-center">
                                                                    <b>Udara Masuk Bilateral Baik</b>
                                                                </div>
                                                            </td>
                                                            <td onclick="dacriasesmenneonatusex_setScoreDS(1, 4);">
                                                                <div class="row d-flex justify-content-center">
                                                                    <b>Penurunan Ringan Udara Masuk</b>
                                                                </div>
                                                            </td>
                                                            <td onclick="dacriasesmenneonatusex_setScoreDS(2, 4);">
                                                                <div class="row d-flex justify-content-center">
                                                                    <b>Tidak Ada Udara Masuk</b>
                                                                </div>
                                                            </td>
                                                            <td align="center" width="100%" style="padding: 0;">
                                                                <input type="text" class="form-control" id="dacriasesmenneonatusex_setScoreDSEmpat" style="text-align:center; font-size: 40px" value="0" disabled>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="row d-flex" style="padding-left: 15px;">
                                                                    <b>Merintih</b>
                                                                </div>
                                                            </td>
                                                            <td onclick="dacriasesmenneonatusex_setScoreDS(0, 5);">
                                                                <div class="row d-flex justify-content-center">
                                                                    <b>Tidak Merintih</b>
                                                                </div>
                                                            </td>
                                                            <td onclick="dacriasesmenneonatusex_setScoreDS(1, 5);">
                                                                <div class="row d-flex justify-content-center">
                                                                    <b>Dapat Didengar Dengan Stetoskop</b>
                                                                </div>
                                                            </td>
                                                            <td onclick="dacriasesmenneonatusex_setScoreDS(2, 5);">
                                                                <div class="row d-flex justify-content-center">
                                                                    <b>Dapat Didengar Tanpa Alat Bantu</b>
                                                                </div>
                                                            </td>
                                                            <td align="center" width="100%" style="padding: 0;">
                                                                <input type="text" class="form-control" id="dacriasesmenneonatusex_setScoreDSLima" style="text-align:center; font-size: 40px" value="0" disabled>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="4">
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <label class="col-form-label font-weight-bold" style="padding-left: 13px;">Hasil Down Score</b>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="input-group">
                                                                            <select name="downscore" id="dacriasesmenneonatus_downscore" class="form-control form-control-xs font-weight-bold">
                                                                                <option value="1">Tidak Ada Distress Napas</option>
                                                                                <option value="2">Distress Napas Ringan</option>
                                                                                <option value="3">Distress Napas Sedang</option>
                                                                                <option value="4">Distress Napas Berat</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td align="center" width="100%" style="padding: 0;">
                                                                <input type="text" class="form-control" id="dacriasesmenneonatusex_setScoreDSTotal" style="text-align:center; font-size: 40px" value="0" disabled>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="5">
                                                                <div class="form-group row">
                                                                    <div class="col-md-1">
                                                                        <label class="col-form-label font-italic" style="padding-left: 13px;">
                                                                            Keterangan:
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-11">
                                                                        <label class="col-form-label font-italic" style="padding-left: 13px;">
                                                                            * 1 - 3 : Distress Napas Ringan, Konsul Dokter, Apakah Perlu Membutuhkan O2 Nasal / Headbox
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-1"></div>
                                                                    <div class="col-md-11">
                                                                        <label class="col-form-label font-italic" style="padding-left: 13px;">
                                                                            * 4 - 6 : Distress Napas Sedang, Konsul Dokter, Apakah Perlu Membutuhkan Nasal CPAP
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-1"></div>
                                                                    <div class="col-md-11">
                                                                        <label class="col-form-label font-italic" style="padding-left: 13px;">
                                                                            * &gt;= 7 : Distress Napas Berat, Ancaman Gagal Nafas, Konsul Dokter, Apakah Perlu Membutuhkan Intubasi (Perlu Diperiksa Analisa Gas Darah / AGD)
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- GCS -->
                            <div class="row ">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-sm newtable" width="100%">
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="4" width="30%">
                                                                <div class="row d-flex justify-content-center">
                                                                    <label class="col-form-label font-weight-bold" style="font-size: 14px;">Glasgow Coma Scale ( GCS )</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" width="30%">
                                                                <div class="row d-flex justify-content-center">
                                                                    <label class="col-form-label font-weight-bold">Kategori</label>
                                                                </div>
                                                            </td>
                                                            <td width="20%">
                                                                <div class="row d-flex justify-content-center">
                                                                    <label class="col-form-label font-weight-bold">Skor</label>
                                                                </div>
                                                            </td>
                                                            <td width="20%">
                                                                <div class="row d-flex justify-content-center">
                                                                    <label class="col-form-label font-weight-bold">Hasil Skor</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%" style="padding:0;">
                                                                <div class="row d-flex" style="padding-left: 15px;">
                                                                    <label class="col-form-label font-weight-bold">Respon Buka Mata (Eye Opening : E)</label>
                                                                </div>
                                                            </td>
                                                            <td width="40%" style="padding:0;">
                                                                <table class="table-bordered table-condensed table-hover" width="100%">
                                                                    <tbody>
                                                                        <tr onclick="dacriasesmenneonatusex_setScore(4, 1);">
                                                                            <td width="100%" style="padding:0;">
                                                                                <label class="col-form-label">&nbsp;Spontan</label>
                                                                            </td>
                                                                        </tr>

                                                                        <tr onclick="dacriasesmenneonatusex_setScore(3, 1);">
                                                                            <td style="padding:0;">
                                                                                <label class="col-form-label">&nbsp;Terhadap Suara</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr onclick="dacriasesmenneonatusex_setScore(2, 1);">
                                                                            <td style="padding:0;">
                                                                                <label class="col-form-label">&nbsp;Terhadap Nyeri</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr onclick="dacriasesmenneonatusex_setScore(1, 1);">
                                                                            <td style="padding:0;">
                                                                                <label class="col-form-label">&nbsp;Tidak ada</label>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td width="20%" style="padding:0;">
                                                                <table class="table-bordered table-condensed table-hover" width="100%">
                                                                    <tbody>
                                                                        <tr onclick="dacriasesmenneonatusex_setScore(4, 1);">
                                                                            <td align="center" style="padding:0;">
                                                                                <label class="col-form-label">4</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr onclick="dacriasesmenneonatusex_setScore(3, 1);">
                                                                            <td align="center" style="padding:0;">
                                                                                <label class="col-form-label">3</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr onclick="dacriasesmenneonatusex_setScore(2, 1);">
                                                                            <td align="center" style="padding:0;">
                                                                                <label class="col-form-label">2</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr onclick="dacriasesmenneonatusex_setScore(1, 1);">
                                                                            <td align="center" style="padding:0;">
                                                                                <label class="col-form-label">1</label>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td align="center" width="100%" style="padding:0;">
                                                                <input type="text" class="form-control" id="dacriasesmenneonatus_bgcsa" style="text-align:center; font-size: 40px" value="4" disabled>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding:0;" width="20%">
                                                                <div class="row d-flex" style="padding-left: 15px;">
                                                                    <label class="col-form-label font-weight-bold">Respon Verbal (V)</label>
                                                                </div>
                                                            </td>
                                                            <td style="padding:0;" width="40%">
                                                                <table class="table-bordered table-condensed table-hover" width="100%">
                                                                    <tbody>
                                                                        <tr onclick="dacriasesmenneonatusex_setScore(5, 3);">
                                                                            <td style="padding:0;">
                                                                                <label class="col-form-label">&nbsp;Berorientasi Baik</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr onclick="dacriasesmenneonatusex_setScore(4, 3);">
                                                                            <td style="padding:0;">
                                                                                <label class="col-form-label">&nbsp;Berbicara mengacau (bingung)</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr onclick="dacriasesmenneonatusex_setScore(3, 3);">
                                                                            <td style="padding:0;">
                                                                                <label class="col-form-label">&nbsp;Kata-Kata tidak teratur</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr onclick="dacriasesmenneonatusex_setScore(2, 3);">
                                                                            <td style="padding:0;">
                                                                                <label class="col-form-label">&nbsp;Suara Tidak Jelas</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr onclick="dacriasesmenneonatusex_setScore(1, 3);">
                                                                            <td style="padding:0;">
                                                                                <label class="col-form-label">&nbsp;Tidak Ada</label>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td style="padding:0;" width="20%">
                                                                <table class="table-bordered table-condensed table-hover" width="100%">
                                                                    <tbody>
                                                                        <tr onclick="dacriasesmenneonatusex_setScore(5, 3);">
                                                                            <td style="padding:0;" align="center">
                                                                                <label class="col-form-label">5</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr onclick="dacriasesmenneonatusex_setScore(4, 3);">
                                                                            <td style="padding:0;" align="center">
                                                                                <label class="col-form-label">4</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr onclick="dacriasesmenneonatusex_setScore(3, 3);">
                                                                            <td style="padding:0;" align="center">
                                                                                <label class="col-form-label">3</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr onclick="dacriasesmenneonatusex_setScore(2, 3);">
                                                                            <td style="padding:0;" align="center">
                                                                                <label class="col-form-label">2</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr onclick="dacriasesmenneonatusex_setScore(1, 3);">
                                                                            <td style="padding:0;" align="center">
                                                                                <label class="col-form-label">1</label>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td style="padding:0;" align="center">
                                                                <input type="text" class="form-control" id="dacriasesmenneonatus_bgcsc" style="text-align:center; font-size: 40px" value="5" disabled>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%" style="padding:0;">
                                                                <div class="row d-flex" style="padding-left: 15px;">
                                                                    <label class="col-form-label font-weight-bold">Respon Motorik Terbaik (M)</label>
                                                                </div>
                                                            </td>
                                                            <td width="40%" style="padding:0;">
                                                                <table class="table-bordered table-condensed table-hover" width="100%">
                                                                    <tbody>
                                                                        <tr onclick="dacriasesmenneonatusex_setScore(6, 2);">
                                                                            <td width="100%" style="padding:0;">
                                                                                <label class="col-form-label">&nbsp;Turut Perintah</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr onclick="dacriasesmenneonatusex_setScore(5, 2);">
                                                                            <td style="padding:0;">
                                                                                <label class="col-form-label">&nbsp;Melokalisir Nyeri</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr onclick="dacriasesmenneonatusex_setScore(4, 2);">
                                                                            <td style="padding:0;">
                                                                                <label class="col-form-label">&nbsp;Fleksi Normal (Menarik anggota gerak yang dirangsang)</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr onclick="dacriasesmenneonatusex_setScore(3, 2);">
                                                                            <td style="padding:0;">
                                                                                <label class="col-form-label">&nbsp;Fleksi Abnormal (dekortikasi)</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr onclick="dacriasesmenneonatusex_setScore(2, 2);">
                                                                            <td style="padding:0;">
                                                                                <label class="col-form-label">&nbsp;Ekstensi Abnormal (deserebrasi)</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr onclick="dacriasesmenneonatusex_setScore(1, 2);">
                                                                            <td style="padding:0;">
                                                                                <label class="col-form-label">&nbsp;Tidak Ada (Flasid)</label>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td width="20%" style="padding:0;">
                                                                <table class="table-bordered table-condensed table-hover" width="100%">
                                                                    <tbody>
                                                                        <tr onclick="dacriasesmenneonatusex_setScore(6, 2);">
                                                                            <td align="center" style="padding:0;">
                                                                                <label class="col-form-label">6</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr onclick="dacriasesmenneonatusex_setScore(5, 2);">
                                                                            <td align="center" style="padding:0;">
                                                                                <label class="col-form-label">5</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr onclick="dacriasesmenneonatusex_setScore(4, 2);">
                                                                            <td style="padding:0;" align="center">
                                                                                <label class="col-form-label">4</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr onclick="dacriasesmenneonatusex_setScore(3, 2);">
                                                                            <td style="padding:0;" align="center">
                                                                                <label class="col-form-label">3</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr onclick="dacriasesmenneonatusex_setScore(2, 2);">
                                                                            <td style="padding:0;" align="center">
                                                                                <label class="col-form-label">2</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr onclick="dacriasesmenneonatusex_setScore(1, 2);">
                                                                            <td style="padding:0;" align="center">
                                                                                <label class="col-form-label">1</label>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td style="padding:0;" align="center">
                                                                <input type="text" class="form-control" id="dacriasesmenneonatus_bgcsb" style="text-align:center; font-size: 40px" value="4" disabled>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">
                                                                <div class="form-group row">
                                                                    <div class="col-md-3">
                                                                        <label class="col-form-label font-weight-bold" style="padding-left: 14px;" title="Kesadaran">Kesadaran</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="input-group">
                                                                            <select name="asadar" id="dacriasesmenneonatus_asadar" class="form-control form-control-xs font-weight-bold">
                                                                                <option value="1">Compos Mentis</option>
                                                                                <option value="2">Apatis</option>
                                                                                <option value="3">Somnolen</option>
                                                                                <option value="4">Delirium</option>
                                                                                <option value="5">Sopor</option>
                                                                                <option value="6">Coma</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td style="padding:0;" align="center">
                                                                <input type="text" class="form-control" id="dacriasesmenneonatus_bgcstot" style="text-align:center; font-size: 40px" value="15" disabled>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-12">
                                    <div class="form-group row mb-0" style="border-bottom-style: solid; border-bottom-width: thin;">
                                        <div class="col-md-2">
                                            <b><i class="fas fa-angle-right"></i> Kepala</b>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row" id="dacriasesmenneonatus_kkepalalist">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kkepalalist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kkepalalist_1">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kkepalalist_1">Normal</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kkepalalist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kkepalalist_2">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kkepalalist_2">Asimetris</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kkepalalist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kkepalalist_3">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kkepalalist_3">Cepal Hematom</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kkepalalist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kkepalalist_4">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kkepalalist_4">Caput Succedaneum</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kkepalalist" value="5" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kkepalalist_5">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kkepalalist_5">Microsefal</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kkepalalist" value="6" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kkepalalist_6">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kkepalalist_6">Macrosefal</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kkepalalist" value="7" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kkepalalist_7">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kkepalalist_7">Lain-lain</label>
                                                        </div>
                                                        <div class="row" id="dacriasesmenneonatus_div_kkepalalist7" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea rows="2" name="dacriasesmenneonatus_kkepalalistket7" id="dacriasesmenneonatus_kkepalalistket7" style="width:100%;" class="form-control"></textarea>
                                                            </div>*
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0" style="border-bottom-style: solid; border-bottom-width: thin;">
                                        <div class="col-md-2">
                                            &ensp;&ensp;&ensp;<label class="col-form-label"> Sutura Sagitalis</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row" id="dacriasesmenneonatus_ksaturalist">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_ksaturalist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_ksaturalist_1">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_ksaturalist_1">Tepat</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_ksaturalist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_ksaturalist_2">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_ksaturalist_2">Terpisah</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_ksaturalist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_ksaturalist_3">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_ksaturalist_3">Menjauh</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_ksaturalist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_ksaturalist_4">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_ksaturalist_4">Lain-lain</label>
                                                        </div>
                                                        <div class="row" id="dacriasesmenneonatus_div_ksaturalist4" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea rows="2" name="dacriasesmenneonatus_ksaturalistket4" id="dacriasesmenneonatus_ksaturalistket4" style="width:100%;" class="form-control"></textarea>
                                                            </div>*
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0" style="border-bottom-style: solid; border-bottom-width: thin;">
                                        <div class="col-md-2">
                                            &ensp;&ensp;&ensp;<label class="col-form-label"> Fontanel</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row" id="dacriasesmenneonatus_kfontanellist">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kfontanellist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kfontanellist_1">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kfontanellist_1">Lunak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kfontanellist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kfontanellist_2">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kfontanellist_2">Tegas</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kfontanellist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kfontanellist_3">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kfontanellist_3">Cekung</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kfontanellist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kfontanellist_4">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kfontanellist_4">Cembung</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kfontanellist" value="5" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kfontanellist_5">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kfontanellist_5">Datar</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0" style="border-bottom-style: solid; border-bottom-width: thin;">
                                        <div class="col-md-2">
                                            <label class="col-form-label font-weight-bold"><i class="fas fa-angle-right"></i> Muka</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row" id="dacriasesmenneonatus_kmukalist">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kmukalist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kmukalist_1">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kmukalist_1">Normal</label>
                                                        </div>




                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kmukalist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kmukalist_2">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kmukalist_2">Asimetris</label>
                                                        </div>




                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kmukalist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kmukalist_3">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kmukalist_3">Bells palsy</label>
                                                        </div>
                                                        <div class="row" id="dacriasesmenneonatus_div_kmukalist3" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-11" style="padding-top: 4px;">
                                                                <div class="row" id="dacriasesmenneonatus_kmuka3Id">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                                <input name="dacriasesmenneonatus_kmuka3Id" value="1" type="radio" class="custom-control-input" id="dacriasesmenneonatus_kmuka3Id_1">
                                                                                <label class="custom-control-label" for="dacriasesmenneonatus_kmuka3Id_1">Kanan</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                                <input name="dacriasesmenneonatus_kmuka3Id" value="2" type="radio" class="custom-control-input" id="dacriasesmenneonatus_kmuka3Id_2">
                                                                                <label class="custom-control-label" for="dacriasesmenneonatus_kmuka3Id_2">Kiri</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- <div class="col-md-10">
										     		<textarea rows="2" th:name="${ccm+'_kmukalistket3'}" th:id="${ccm+'_kmukalistket3'}" 
							            				style="width:100%;" class="form-control"></textarea>
												</div>* -->
                                                        </div>



                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kmukalist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kmukalist_4">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kmukalist_4">Tic Facial</label>
                                                        </div>

                                                        <div class="row" id="dacriasesmenneonatus_div_kmukalist4" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea rows="2" name="dacriasesmenneonatus_kmukalistket4" id="dacriasesmenneonatus_kmukalistket4" style="width:100%;" class="form-control"></textarea>
                                                            </div>*
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kmukalist" value="5" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kmukalist_5">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kmukalist_5">Kelainan konginetal</label>
                                                        </div>


                                                        <div class="row" id="dacriasesmenneonatus_div_kmukalist5" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea rows="2" name="dacriasesmenneonatus_kmukalistket5" id="dacriasesmenneonatus_kmukalistket5" style="width:100%;" class="form-control"></textarea>
                                                            </div>*
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kmukalist" value="6" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kmukalist_6">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kmukalist_6">Lain-lain</label>
                                                        </div>



                                                        <div class="row" id="dacriasesmenneonatus_div_kmukalist6" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea rows="2" name="dacriasesmenneonatus_kmukalistket6" id="dacriasesmenneonatus_kmukalistket6" style="width:100%;" class="form-control"></textarea>
                                                            </div>*
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0" style="border-bottom-style: solid; border-bottom-width: thin;">
                                        <div class="col-md-2">
                                            <label class="col-form-label font-weight-bold"><i class="fas fa-angle-right"></i> Mata</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row" id="dacriasesmenneonatus_kmatalist">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kmatalist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kmatalist_1">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kmatalist_1">Normal</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kmatalist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kmatalist_2">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kmatalist_2">Sclera Ikterik</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kmatalist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kmatalist_3">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kmatalist_3">Konjungtiva anemis</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kmatalist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kmatalist_4">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kmatalist_4">Anisokor</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kmatalist" value="5" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kmatalist_5">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kmatalist_5">Sekret</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kmatalist" value="6" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kmatalist_6">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kmatalist_6">Midriasis</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kmatalist" value="7" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kmatalist_7">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kmatalist_7">Miosis</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kmatalist" value="8" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kmatalist_8">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kmatalist_8">Tidak ada reaksi cahaya</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kmatalist" value="9" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kmatalist_9">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kmatalist_9">Lain-lain</label>
                                                        </div>
                                                        <div class="row" id="dacriasesmenneonatus_div_kmatalist9" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea rows="2" name="dacriasesmenneonatus_kmatalistket9" id="dacriasesmenneonatus_kmatalistket9" style="width:100%;" class="form-control"></textarea>
                                                            </div>*
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0" style="border-bottom-style: solid; border-bottom-width: thin;">
                                        <div class="col-md-2">
                                            <label class="col-form-label font-weight-bold"><i class="fas fa-angle-right"></i> Telinga</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row" id="dacriasesmenneonatus_ktelingalist">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_ktelingalist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_ktelingalist_1">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_ktelingalist_1">Normal</label>
                                                        </div>



                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_ktelingalist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_ktelingalist_2">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_ktelingalist_2">Kotor/Serumen</label>
                                                        </div>



                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_ktelingalist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_ktelingalist_3">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_ktelingalist_3">Keluar Cairan</label>
                                                        </div>
                                                        <div class="row" id="dacriasesmenneonatus_div_ktelingalist3" style="display:none;">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-11" style="padding-top: 4px;">
                                                                <div class="row" id="dacriasesmenneonatus_ktelinga3Id">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                                <input name="dacriasesmenneonatus_ktelinga3_kanan" value="true" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_ktelinga3_kanan">
                                                                                <label class="custom-control-label" for="dacriasesmenneonatus_ktelinga3_kanan">Kanan</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                                <input name="dacriasesmenneonatus_ktelinga3_kiri" value="true" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_ktelinga3_kiri">
                                                                                <label class="custom-control-label" for="dacriasesmenneonatus_ktelinga3_kiri">Kiri</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- <div class="col-md-11">
										     		<textarea rows="2" th:name="${ccm+'_ktelingalistket3'}" th:id="${ccm+'_ktelingalistket3'}" 
							            				style="width:100%;" class="form-control"></textarea>
												</div> -->
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_ktelingalist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_ktelingalist_4">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_ktelingalist_4">Tidak Ada Lubang Drum</label>
                                                        </div>

                                                        <div class="row" id="dacriasesmenneonatus_div_ktelingalist4" style="display:none;">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-11" style="padding-top: 4px;">
                                                                <div class="row" id="dacriasesmenneonatus_ktelinga4Id">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                                <input name="dacriasesmenneonatus_ktelinga4_kanan" value="true" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_ktelinga4_kanan">
                                                                                <label class="custom-control-label" for="dacriasesmenneonatus_ktelinga4_kanan">Kanan</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                                <input name="dacriasesmenneonatus_ktelinga4_kiri" value="true" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_ktelinga4_kiri">
                                                                                <label class="custom-control-label" for="dacriasesmenneonatus_ktelinga4_kiri">Kiri</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- <div class="col-md-11">
										     		<textarea rows="2" th:name="${ccm+'_ktelingalistket3'}" th:id="${ccm+'_ktelingalistket3'}" 
							            				style="width:100%;" class="form-control"></textarea>
												</div> -->
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_ktelingalist" value="5" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_ktelingalist_5">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_ktelingalist_5">Lain-lain</label>
                                                        </div>


                                                        <div class="row" id="dacriasesmenneonatus_div_ktelingalist5" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea rows="2" name="dacriasesmenneonatus_ktelingalistket5" id="dacriasesmenneonatus_ktelingalistket5" style="width:100%;" class="form-control"></textarea>
                                                            </div>*
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0" style="border-bottom-style: solid; border-bottom-width: thin;">
                                        <div class="col-md-2">
                                            <label class="col-form-label font-weight-bold"><i class="fas fa-angle-right"></i> Hidung</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row" id="dacriasesmenneonatus_khidunglist">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_khidunglist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_khidunglist_1">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_khidunglist_1">Normal</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_khidunglist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_khidunglist_2">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_khidunglist_2">Tersumbat</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_khidunglist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_khidunglist_3">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_khidunglist_3">Sekret</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_khidunglist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_khidunglist_4">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_khidunglist_4">Epitaksis</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_khidunglist" value="5" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_khidunglist_5">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_khidunglist_5">Asimetris</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_khidunglist" value="6" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_khidunglist_6">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_khidunglist_6">Lain-lain</label>
                                                        </div>
                                                        <div class="row" id="dacriasesmenneonatus_div_khidunglist6" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea rows="2" name="dacriasesmenneonatus_khidunglistket6" id="dacriasesmenneonatus_khidunglistket6" style="width:100%;" class="form-control"></textarea>
                                                            </div>*
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0" style="border-bottom-style: solid; border-bottom-width: thin;">
                                        <div class="col-md-2">
                                            <label class="col-form-label font-weight-bold"><i class="fas fa-angle-right"></i> Mulut</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row" id="dacriasesmenneonatus_kmulutlist">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kmulutlist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kmulutlist_1">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kmulutlist_1">Normal</label>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kmulutlist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kmulutlist_2">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kmulutlist_2">Kotor</label>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kmulutlist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kmulutlist_3">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kmulutlist_3">Berbau</label>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kmulutlist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kmulutlist_4">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kmulutlist_4">Mucosa Kering</label>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kmulutlist" value="5" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kmulutlist_5">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kmulutlist_5">Sariawan</label>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kmulutlist" value="6" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kmulutlist_6">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kmulutlist_6">Kelainan Konginetal</label>
                                                        </div>
                                                        <div class="row" id="dacriasesmenneonatus_div_kmulutlist6" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea rows="2" name="dacriasesmenneonatus_kmulutlistket6" id="dacriasesmenneonatus_kmulutlistket6" style="width:100%;" class="form-control"></textarea>
                                                            </div>*
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kmulutlist" value="7" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kmulutlist_7">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kmulutlist_7">Lain-lain</label>
                                                        </div>

                                                        <div class="row" id="dacriasesmenneonatus_div_kmulutlist7" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea rows="2" name="dacriasesmenneonatus_kmulutlistket7" id="dacriasesmenneonatus_kmulutlistket7" style="width:100%;" class="form-control"></textarea>
                                                            </div>*
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0" style="border-bottom-style: solid; border-bottom-width: thin;">
                                        <div class="col-md-2">
                                            <label class="col-form-label font-weight-bold"><i class="fas fa-angle-right"></i> Lidah</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row" id="dacriasesmenneonatus_klidahlist">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_klidahlist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_klidahlist_1">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_klidahlist_1">Normal</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_klidahlist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_klidahlist_2">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_klidahlist_2">Kotor</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_klidahlist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_klidahlist_3">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_klidahlist_3">Putih</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_klidahlist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_klidahlist_4">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_klidahlist_4">Kering</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_klidahlist" value="5" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_klidahlist_5">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_klidahlist_5">Lain-lain</label>
                                                        </div>
                                                        <div class="row" id="dacriasesmenneonatus_div_klidahlist5" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea rows="2" name="dacriasesmenneonatus_klidahlistket5" id="dacriasesmenneonatus_klidahlistket5" style="width:100%;" class="form-control"></textarea>
                                                            </div>*
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0" style="border-bottom-style: solid; border-bottom-width: thin;">
                                        <div class="col-md-2">
                                            <label class="col-form-label font-weight-bold"><i class="fas fa-angle-right"></i> Dada</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row" id="dacriasesmenneonatus_kdadalist">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kdadalist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kdadalist_1">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kdadalist_1">Normal</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kdadalist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kdadalist_2">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kdadalist_2">Asimetris</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kdadalist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kdadalist_3">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kdadalist_3">Retraksi</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kdadalist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kdadalist_4">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kdadalist_4">Lain-lain</label>
                                                        </div>
                                                        <div class="row" id="dacriasesmenneonatus_div_kdadalist4" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea rows="2" name="dacriasesmenneonatus_kdadalistket4" id="dacriasesmenneonatus_kdadalistket4" style="width:100%;" class="form-control"></textarea>
                                                            </div>*
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0" style="border-bottom-style: solid; border-bottom-width: thin;">
                                        <div class="col-md-2">
                                            <label class="col-form-label font-weight-bold"><i class="fas fa-angle-right"></i> Respirasi</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row" id="dacriasesmenneonatus_krespirasilist">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_krespirasilist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_krespirasilist_1">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_krespirasilist_1">Normal</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_krespirasilist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_krespirasilist_2">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_krespirasilist_2">Dyspnoe</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_krespirasilist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_krespirasilist_3">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_krespirasilist_3">Cuping Hidung</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_krespirasilist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_krespirasilist_4">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_krespirasilist_4">Bradipnea</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_krespirasilist" value="5" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_krespirasilist_5">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_krespirasilist_5">Tachipnea</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_krespirasilist" value="6" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_krespirasilist_6">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_krespirasilist_6">Wheezing</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_krespirasilist" value="7" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_krespirasilist_7">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_krespirasilist_7">Ronchi</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_krespirasilist" value="8" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_krespirasilist_8">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_krespirasilist_8">Lain-lain</label>
                                                        </div>
                                                        <div class="row" id="dacriasesmenneonatus_div_krespirasilist8" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea rows="2" name="dacriasesmenneonatus_krespirasilistket8" id="dacriasesmenneonatus_krespirasilistket8" style="width:100%;" class="form-control"></textarea>
                                                            </div>*
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0" style="border-bottom-style: solid; border-bottom-width: thin;">
                                        <div class="col-md-2">
                                            &ensp;&ensp;&ensp;<label class="col-form-label"> Alat bantu Nafas</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row" id="dacriasesmenneonatus_kalatbantunafas">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kalatbantunafas" value="1" type="radio" class="custom-control-input" id="dacriasesmenneonatus_kalatbantunafas_1">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kalatbantunafas_1">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kalatbantunafas" value="2" type="radio" class="custom-control-input" id="dacriasesmenneonatus_kalatbantunafas_2">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kalatbantunafas_2">Ya</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0" id="dacriasesmenneonatus_div_kalatbantunafas2" style="display:none; border-bottom-style: solid; border-bottom-width: thin;">
                                        <div class="col-md-2">
                                            &ensp;&ensp;
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row" id="dacriasesmenneonatus_kalatbantunafaslist">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kalatbantunafaslist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kalatbantunafaslist_1">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kalatbantunafaslist_1">O2 Nasal Canul</label>
                                                        </div>



                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kalatbantunafaslist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kalatbantunafaslist_2">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kalatbantunafaslist_2">Sungkup</label>
                                                        </div>



                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kalatbantunafaslist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kalatbantunafaslist_3">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kalatbantunafaslist_3">Headbox</label>
                                                        </div>



                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kalatbantunafaslist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kalatbantunafaslist_4">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kalatbantunafaslist_4">T-Piece Resusitator</label>
                                                        </div>
                                                        <div class="row" id="dacriasesmenneonatus_div_kalatbantunafaslist4" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-11">PEEP :
                                                            </div>
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea rows="2" name="dacriasesmenneonatus_kalatbantunafaslistket4" id="dacriasesmenneonatus_kalatbantunafaslistket4" style="width:100%;" class="form-control"></textarea>
                                                            </div>*
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kalatbantunafaslist" value="5" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kalatbantunafaslist_5">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kalatbantunafaslist_5">Bubble CPAP</label>
                                                        </div>

                                                        <div class="row" id="dacriasesmenneonatus_div_kalatbantunafaslist5" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-11">PEEP :
                                                            </div>
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea rows="2" name="dacriasesmenneonatus_kalatbantunafaslistket5" id="dacriasesmenneonatus_kalatbantunafaslistket5" style="width:100%;" class="form-control"></textarea>
                                                            </div>*
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-11">FiO2 :
                                                            </div>
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea rows="2" name="dacriasesmenneonatus_kalatbantunafasfio" id="dacriasesmenneonatus_kalatbantunafasfio" style="width:100%;" class="form-control"></textarea>
                                                            </div>*
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kalatbantunafaslist" value="6" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kalatbantunafaslist_6">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kalatbantunafaslist_6">Lain-lain</label>
                                                        </div>


                                                        <div class="row" id="dacriasesmenneonatus_div_kalatbantunafaslist6" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea rows="2" name="dacriasesmenneonatus_kalatbantunafaslistket6" id="dacriasesmenneonatus_kalatbantunafaslistket6" style="width:100%;" class="form-control"></textarea>
                                                            </div>*
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0" style="border-bottom-style: solid; border-bottom-width: thin;">
                                        <div class="col-md-2">
                                            <label class="col-form-label font-weight-bold"><i class="fas fa-angle-right"></i> Abdomen</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row" id="dacriasesmenneonatus_kabdomenlist">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kabdomenlist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kabdomenlist_1">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kabdomenlist_1">Normal</label>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kabdomenlist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kabdomenlist_2">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kabdomenlist_2">Asites</label>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kabdomenlist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kabdomenlist_3">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kabdomenlist_3">Distensi</label>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kabdomenlist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kabdomenlist_4">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kabdomenlist_4">Bising Usus</label>
                                                        </div>
                                                        <div class="row" id="dacriasesmenneonatus_div_kabdomenlist4" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-11" style="padding-top: 4px;">
                                                                <div class="row" id="dacriasesmenneonatus_kabdomen4Id">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                                <input name="dacriasesmenneonatus_kabdomen4Id" value="1" type="radio" class="custom-control-input" id="dacriasesmenneonatus_kabdomen4Id_1">
                                                                                <label class="custom-control-label" for="dacriasesmenneonatus_kabdomen4Id_1">Normal</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                                <input name="dacriasesmenneonatus_kabdomen4Id" value="2" type="radio" class="custom-control-input" id="dacriasesmenneonatus_kabdomen4Id_2">
                                                                                <label class="custom-control-label" for="dacriasesmenneonatus_kabdomen4Id_2">Meningkat</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                                <input name="dacriasesmenneonatus_kabdomen4Id" value="3" type="radio" class="custom-control-input" id="dacriasesmenneonatus_kabdomen4Id_3">
                                                                                <label class="custom-control-label" for="dacriasesmenneonatus_kabdomen4Id_3">Menurun</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- <div class="col-md-11">
										     		<textarea rows="2" th:name="${ccm+'_kabdomenlistket4'}" th:id="${ccm+'_kabdomenlistket4'}" 
							            				style="width:100%;" class="form-control"></textarea>
												</div> -->
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kabdomenlist" value="5" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kabdomenlist_5">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kabdomenlist_5">Lain-lain</label>
                                                        </div>

                                                        <div class="row" id="dacriasesmenneonatus_div_kabdomenlist5" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea rows="2" name="dacriasesmenneonatus_kabdomenlistket5" id="dacriasesmenneonatus_kabdomenlistket5" style="width:100%;" class="form-control"></textarea>
                                                            </div>*
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0" style="border-bottom-style: solid; border-bottom-width: thin;">
                                        <div class="col-md-2">
                                            &ensp;&ensp;&ensp;<label class="col-form-label"> Tali Pusat</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row" id="dacriasesmenneonatus_ktalipusatlist">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_ktalipusatlist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_ktalipusatlist_1">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_ktalipusatlist_1">Kering</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_ktalipusatlist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_ktalipusatlist_2">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_ktalipusatlist_2">Basah</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_ktalipusatlist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_ktalipusatlist_3">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_ktalipusatlist_3">Hijau</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_ktalipusatlist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_ktalipusatlist_4">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_ktalipusatlist_4">Perdarahan</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_ktalipusatlist" value="5" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_ktalipusatlist_5">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_ktalipusatlist_5">Lain-lain</label>
                                                        </div>
                                                        <div class="row" id="dacriasesmenneonatus_div_ktalipusatlist5" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea rows="2" name="dacriasesmenneonatus_ktalipusatlistket5" id="dacriasesmenneonatus_ktalipusatlistket5" style="width:100%;" class="form-control"></textarea>
                                                            </div>*
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0" style="border-bottom-style: solid; border-bottom-width: thin;">
                                        <div class="col-md-2">
                                            <label class="col-form-label font-weight-bold"><i class="fas fa-angle-right"></i> Gastrointestinal</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row" id="dacriasesmenneonatus_kgastrointestinallist">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kgastrointestinallist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kgastrointestinallist_1">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kgastrointestinallist_1">Menyusu</label>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kgastrointestinallist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kgastrointestinallist_2">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kgastrointestinallist_2">Muntah</label>
                                                        </div>
                                                        <div class="row" id="dacriasesmenneonatus_div_kgastrointestinallist2" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <div class="input-group">
                                                                    <input type="number" onfocus="this.select();" class="form-control" id="dacriasesmenneonatus_kgastrointestinallistket2">
                                                                    <span class="input-group-append">
                                                                        <span class="input-group-text">&nbsp;Kali&nbsp;</span>
                                                                    </span>
                                                                </div>
                                                            </div>*
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kgastrointestinallist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kgastrointestinallist_3">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kgastrointestinallist_3">Lain-lain</label>
                                                        </div>

                                                        <div class="row" id="dacriasesmenneonatus_div_kgastrointestinallist3" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea rows="2" name="dacriasesmenneonatus_kgastrointestinallistket3" id="dacriasesmenneonatus_kgastrointestinallistket3" style="width:100%;" class="form-control"></textarea>
                                                            </div>*
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0" style="border-bottom-style: solid; border-bottom-width: thin;">
                                        <div class="col-md-2">
                                            &ensp;&ensp;&ensp;<label class="col-form-label"> Asupan Nutrisi</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row" id="dacriasesmenneonatus_kasupannutrisilist">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kasupannutrisilist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kasupannutrisilist_1">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kasupannutrisilist_1">Oral</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kasupannutrisilist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kasupannutrisilist_2">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kasupannutrisilist_2">NGT</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kasupannutrisilist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kasupannutrisilist_3">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kasupannutrisilist_3">Parenteral</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kasupannutrisilist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kasupannutrisilist_4">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kasupannutrisilist_4">Lain-lain</label>
                                                        </div>
                                                        <div class="row" id="dacriasesmenneonatus_div_kasupannutrisilist4" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea rows="2" name="dacriasesmenneonatus_kasupannutrisilistket4" id="dacriasesmenneonatus_kasupannutrisilistket4" style="width:100%;" class="form-control"></textarea>
                                                            </div>*
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0" style="border-bottom-style: solid; border-bottom-width: thin;">
                                        <div class="col-md-2">
                                            &ensp;&ensp;&ensp;<label class="col-form-label"> Reflek Isap</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row" id="dacriasesmenneonatus_kreflekisaplist">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kreflekisaplist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kreflekisaplist_1">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kreflekisaplist_1">Kuat</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kreflekisaplist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kreflekisaplist_2">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kreflekisaplist_2">Lemah</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kreflekisaplist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kreflekisaplist_3">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kreflekisaplist_3">Bingung Puting</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kreflekisaplist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kreflekisaplist_4">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kreflekisaplist_4">Lain-lain</label>
                                                        </div>
                                                        <div class="row" id="dacriasesmenneonatus_div_kreflekisaplist4" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea rows="2" name="dacriasesmenneonatus_kreflekisaplistket4" id="dacriasesmenneonatus_kreflekisaplistket4" style="width:100%;" class="form-control"></textarea>
                                                            </div>*
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0" style="border-bottom-style: solid; border-bottom-width: thin;">
                                        <div class="col-md-2">
                                            <label class="col-form-label font-weight-bold"><i class="fas fa-angle-right"></i> Genitalia</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row" id="dacriasesmenneonatus_kgenetaliaId">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kgenetaliaId" value="1" type="radio" class="custom-control-input" id="dacriasesmenneonatus_kgenetaliaId_1">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kgenetaliaId_1">Perempuan</label>
                                                        </div>
                                                        <div class="row" id="dacriasesmenneonatus_div_kgenetaliaId1" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-11">
                                                                <div class="row" id="dacriasesmenneonatus_kgenetaliawanitaId">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                                <input name="dacriasesmenneonatus_kgenetaliawanitaId" value="1" type="radio" class="custom-control-input" id="dacriasesmenneonatus_kgenetaliawanitaId_1">
                                                                                <label class="custom-control-label" for="dacriasesmenneonatus_kgenetaliawanitaId_1">Normal</label>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                                <input name="dacriasesmenneonatus_kgenetaliawanitaId" value="2" type="radio" class="custom-control-input" id="dacriasesmenneonatus_kgenetaliawanitaId_2">
                                                                                <label class="custom-control-label" for="dacriasesmenneonatus_kgenetaliawanitaId_2">Tidak Normal, Sebutkan</label>
                                                                            </div>
                                                                            <div class="row" id="dacriasesmenneonatus_div_kgenetaliawanitaId2" style="display:none;">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-10">
                                                                                    <textarea rows="2" name="dacriasesmenneonatus_kgenetaliawanitaket" id="dacriasesmenneonatus_kgenetaliawanitaket" style="width:100%;" class="form-control"></textarea>
                                                                                </div>*
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kgenetaliaId" value="2" type="radio" class="custom-control-input" id="dacriasesmenneonatus_kgenetaliaId_2">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kgenetaliaId_2">Laki-laki</label>
                                                        </div>

                                                        <div class="row" id="dacriasesmenneonatus_div_kgenetaliaId2" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-11">
                                                                <div class="row" id="dacriasesmenneonatus_kgenetalialakiId">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                                <input name="dacriasesmenneonatus_kgenetalialakiId" value="1" type="radio" class="custom-control-input" id="dacriasesmenneonatus_kgenetalialakiId_1">
                                                                                <label class="custom-control-label" for="dacriasesmenneonatus_kgenetalialakiId_1">Normal</label>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                                <input name="dacriasesmenneonatus_kgenetalialakiId" value="2" type="radio" class="custom-control-input" id="dacriasesmenneonatus_kgenetalialakiId_2">
                                                                                <label class="custom-control-label" for="dacriasesmenneonatus_kgenetalialakiId_2">Tidak Normal, Sebutkan</label>
                                                                            </div>
                                                                            <div class="row" id="dacriasesmenneonatus_div_kgenetalialakiId2" style="display:none;">
                                                                                <div class="col-md-1">
                                                                                </div>
                                                                                <div class="col-md-10">
                                                                                    <textarea rows="2" name="dacriasesmenneonatus_kgenetalialakiket" id="dacriasesmenneonatus_kgenetalialakiket" style="width:100%;" class="form-control"></textarea>
                                                                                </div>*
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
                                    <div class="form-group row mb-0" style="border-bottom-style: solid; border-bottom-width: thin;">
                                        <div class="col-md-2">
                                            <label class="col-form-label font-weight-bold"><i class="fas fa-angle-right"></i> Lubang Anus</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row" id="dacriasesmenneonatus_klubanganus">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_klubanganus" value="1" type="radio" class="custom-control-input" id="dacriasesmenneonatus_klubanganus_1">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_klubanganus_1">Ada</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_klubanganus" value="2" type="radio" class="custom-control-input" id="dacriasesmenneonatus_klubanganus_2">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_klubanganus_2">Tidak Ada</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0" style="border-bottom-style: solid; border-bottom-width: thin;">
                                        <div class="col-md-2">
                                            <label class="col-form-label font-weight-bold"><i class="fas fa-angle-right"></i> Eliminasi</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row" id="dacriasesmenneonatus_keliminasilist">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_keliminasilist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_keliminasilist_1">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_keliminasilist_1">BAB</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_keliminasilist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_keliminasilist_2">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_keliminasilist_2">BAK</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0" style="display:none; border-bottom-style: solid; border-bottom-width: thin;" id="dacriasesmenneonatus_div_keliminasilist1">
                                        <div class="col-md-2">
                                            &ensp;&ensp;&ensp;<label class="col-form-label"> BAB</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row" id="dacriasesmenneonatus_keliminasibablist">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_keliminasibablist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_keliminasibablist_1">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_keliminasibablist_1">Frekuensi</label>
                                                        </div>
                                                        <div class="row" id="dacriasesmenneonatus_div_keliminasibablist1" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <div class="input-group">
                                                                    <input type="number" onfocus="this.select();" class="form-control" id="dacriasesmenneonatus_keliminasibablistket1">
                                                                    <span class="input-group-append">
                                                                        <span class="input-group-text">&nbsp;x/Hari&nbsp;</span>
                                                                    </span>
                                                                </div>
                                                            </div>*
                                                        </div>




                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_keliminasibablist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_keliminasibablist_2">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_keliminasibablist_2">Konsistensi</label>
                                                        </div>

                                                        <div class="row" id="dacriasesmenneonatus_div_keliminasibablist2" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea rows="2" name="dacriasesmenneonatus_keliminasibablistket2" id="dacriasesmenneonatus_keliminasibablistket2" style="width:100%;" class="form-control"></textarea>
                                                            </div>*
                                                        </div>



                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_keliminasibablist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_keliminasibablist_3">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_keliminasibablist_3">Warna</label>
                                                        </div>


                                                        <div class="row" id="dacriasesmenneonatus_div_keliminasibablist3" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea rows="2" name="dacriasesmenneonatus_keliminasibablistket3" id="dacriasesmenneonatus_keliminasibablistket3" style="width:100%;" class="form-control"></textarea>
                                                            </div>*
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_keliminasibablist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_keliminasibablist_4">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_keliminasibablist_4">Meconium Pertama</label>
                                                        </div>



                                                        <div class="row" id="dacriasesmenneonatus_div_keliminasibablist4" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="row" id="dacriasesmenneonatus_kmeconium">
                                                                <div class="col-md-10">
                                                                    <div class="form-group">
                                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                                            <input name="dacriasesmenneonatus_kmeconium" value="1" type="radio" class="custom-control-input" id="dacriasesmenneonatus_kmeconium_1">
                                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kmeconium_1">Tidak</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <div class="form-group">
                                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                                            <input name="dacriasesmenneonatus_kmeconium" value="2" type="radio" class="custom-control-input" id="dacriasesmenneonatus_kmeconium_2">
                                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kmeconium_2">Ya</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-10" id="dacriasesmenneonatus_div_kmeconium2" style="display:none;">
                                                                <div class="row">
                                                                    <div class="input-group date" id="dacriasesmenneonatus_dkeliminasibablistket4" data-target-input="nearest">
                                                                        <input id="dacriasesmenneonatus_keliminasibablistket4" name="keliminasibablistket4" type="text" class="form-control datetimepicker-input" data-target="#dacriasesmenneonatus_dkeliminasibablistket4" data-toggle="datetimepicker">
                                                                        <div class="input-group-append" data-target="#dacriasesmenneonatus_dkeliminasibablistket4" data-toggle="datetimepicker">
                                                                            <div class="input-group-text"><svg class="svg-inline--fa fa-calendar fa-w-14" aria-hidden="true" focusable="false" data-prefix="far" data-icon="calendar" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                                                                    <path fill="currentColor" d="M400 64h-48V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H160V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zm-6 400H54c-3.3 0-6-2.7-6-6V160h352v298c0 3.3-2.7 6-6 6z"></path>
                                                                                </svg><!-- <i class="far fa-calendar"></i> -->
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- <div class="col-md-10">
										     		<textarea rows="2" th:name="${ccm+'_keliminasibablistket4'}" th:id="${ccm+'_keliminasibablistket4'}" 
							            				style="width:100%;" class="form-control"></textarea>
												</div>* -->
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_keliminasibablist" value="5" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_keliminasibablist_5">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_keliminasibablist_5">Konstipasi</label>
                                                        </div>





                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_keliminasibablist" value="6" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_keliminasibablist_6">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_keliminasibablist_6">Lain-lain</label>
                                                        </div>




                                                        <div class="row" id="dacriasesmenneonatus_div_keliminasibablist6" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea rows="2" name="dacriasesmenneonatus_keliminasibablistket6" id="dacriasesmenneonatus_keliminasibablistket6" style="width:100%;" class="form-control"></textarea>
                                                            </div>*
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0" style="display:none; border-bottom-style: solid; border-bottom-width: thin;" id="dacriasesmenneonatus_div_keliminasilist2">
                                        <div class="col-md-2">
                                            &ensp;&ensp;&ensp;<label class="col-form-label"> BAK</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row" id="dacriasesmenneonatus_keliminasibaklist">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_keliminasibaklist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_keliminasibaklist_1">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_keliminasibaklist_1">Spontan</label>
                                                        </div>
                                                        <div class="row" id="dacriasesmenneonatus_div_keliminasibaklist1" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-11">&nbsp;Frekuensi :
                                                            </div>'
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <div class="input-group">
                                                                    <input type="number" onfocus="this.select();" class="form-control" id="dacriasesmenneonatus_keliminasibaklistket1">
                                                                    <span class="input-group-append">
                                                                        <span class="input-group-text">&nbsp;x/Hari&nbsp;</span>
                                                                    </span>
                                                                </div>
                                                            </div>*
                                                        </div>



                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_keliminasibaklist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_keliminasibaklist_2">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_keliminasibaklist_2">Kateter Urin</label>
                                                        </div>




                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_keliminasibaklist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_keliminasibaklist_3">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_keliminasibaklist_3">Warna</label>
                                                        </div>

                                                        <div class="row" id="dacriasesmenneonatus_div_keliminasibaklist3" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea rows="2" name="dacriasesmenneonatus_keliminasibaklistket3" id="dacriasesmenneonatus_keliminasibaklistket3" style="width:100%;" class="form-control"></textarea>
                                                            </div>*
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_keliminasibaklist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_keliminasibaklist_4">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_keliminasibaklist_4">BAK Pertama</label>
                                                        </div>


                                                        <div class="row" id="dacriasesmenneonatus_div_keliminasibaklist4" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="row" id="dacriasesmenneonatus_kbakpertama">
                                                                <div class="col-md-10">
                                                                    <div class="form-group">
                                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                                            <input name="dacriasesmenneonatus_kbakpertama" value="1" type="radio" class="custom-control-input" id="dacriasesmenneonatus_kbakpertama_1">
                                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kbakpertama_1">Tidak</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <div class="form-group">
                                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                                            <input name="dacriasesmenneonatus_kbakpertama" value="2" type="radio" class="custom-control-input" id="dacriasesmenneonatus_kbakpertama_2">
                                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kbakpertama_2">Ya</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-10" id="dacriasesmenneonatus_div_kbakpertama2" style="display:none;">
                                                                <div class="row">
                                                                    <div class="input-group date" id="dacriasesmenneonatus_dkeliminasibaklistket4" data-target-input="nearest">
                                                                        <input id="dacriasesmenneonatus_keliminasibaklistket4" name="keliminasibaklistket4" type="text" class="form-control datetimepicker-input" data-target="#dacriasesmenneonatus_dkeliminasibaklistket4" data-toggle="datetimepicker">
                                                                        <div class="input-group-append" data-target="#dacriasesmenneonatus_dkeliminasibaklistket4" data-toggle="datetimepicker">
                                                                            <div class="input-group-text"><svg class="svg-inline--fa fa-calendar fa-w-14" aria-hidden="true" focusable="false" data-prefix="far" data-icon="calendar" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                                                                    <path fill="currentColor" d="M400 64h-48V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H160V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zm-6 400H54c-3.3 0-6-2.7-6-6V160h352v298c0 3.3-2.7 6-6 6z"></path>
                                                                                </svg><!-- <i class="far fa-calendar"></i> -->
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- <div class="col-md-10">
										     		<textarea rows="2" th:name="${ccm+'_keliminasibaklistket4'}" th:id="${ccm+'_keliminasibaklistket4'}" 
							            				style="width:100%;" class="form-control"></textarea>
												</div>* -->
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_keliminasibaklist" value="5" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_keliminasibaklist_5">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_keliminasibaklist_5">Lain-lain</label>
                                                        </div>



                                                        <div class="row" id="dacriasesmenneonatus_div_keliminasibaklist5" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea rows="2" name="dacriasesmenneonatus_keliminasibaklistket5" id="dacriasesmenneonatus_keliminasibaklistket5" style="width:100%;" class="form-control"></textarea>
                                                            </div>*
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-12">
                                            <label class="col-form-label font-weight-bold"><i class="fas fa-angle-right"></i> Integumen</label>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0" style="padding-bottom: 3px; padding-top: 3px; border-bottom-style: solid; border-bottom-width: thin;">
                                        <div class="col-md-2">
                                            &ensp;&ensp;&ensp;<label class="col-form-label"> Vernix Caseosa</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row" id="dacriasesmenneonatus_kverniclist">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kverniclist" value="1" type="radio" class="custom-control-input" id="dacriasesmenneonatus_kverniclist_1">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kverniclist_1">Ada</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kverniclist" value="2" type="radio" class="custom-control-input" id="dacriasesmenneonatus_kverniclist_2">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kverniclist_2">Tidak Ada</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kverniclist" value="3" type="radio" class="custom-control-input" id="dacriasesmenneonatus_kverniclist_3">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kverniclist_3">Lain-lain</label>
                                                        </div>
                                                        <div class="row" id="dacriasesmenneonatus_div_kverniclist3" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea rows="2" name="dacriasesmenneonatus_kverniclistket3" id="dacriasesmenneonatus_kverniclistket3" style="width:100%;" class="form-control"></textarea>
                                                            </div>*
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0" style="padding-bottom: 3px; padding-top: 3px; border-bottom-style: solid; border-bottom-width: thin;">
                                        <div class="col-md-2">
                                            &ensp;&ensp;&ensp;<label class="col-form-label"> Warna</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row" id="dacriasesmenneonatus_kintegwarnalist">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kintegwarnalist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kintegwarnalist_1">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kintegwarnalist_1">Normal</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kintegwarnalist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kintegwarnalist_2">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kintegwarnalist_2">Pucat</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kintegwarnalist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kintegwarnalist_3">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kintegwarnalist_3">Kuning</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kintegwarnalist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kintegwarnalist_4">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kintegwarnalist_4">Sianosis</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kintegwarnalist" value="5" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kintegwarnalist_5">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kintegwarnalist_5">Lain-lain</label>
                                                        </div>
                                                        <div class="row" id="dacriasesmenneonatus_div_kintegwarnalist5" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea rows="2" name="dacriasesmenneonatus_kintegwarnalistket5" id="dacriasesmenneonatus_kintegwarnalistket5" style="width:100%;" class="form-control"></textarea>
                                                            </div>*
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0" style="padding-bottom: 3px; padding-top: 3px; border-bottom-style: solid; border-bottom-width: thin;">
                                        <div class="col-md-2">
                                            &ensp;&ensp;&ensp;<label class="col-form-label"> Turgor</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row" id="dacriasesmenneonatus_kintegturgorlist">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kintegturgorlist" value="1" type="radio" class="custom-control-input" id="dacriasesmenneonatus_kintegturgorlist_1">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kintegturgorlist_1">Cepat</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kintegturgorlist" value="2" type="radio" class="custom-control-input" id="dacriasesmenneonatus_kintegturgorlist_2">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kintegturgorlist_2">Lambat</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kintegturgorlist" value="3" type="radio" class="custom-control-input" id="dacriasesmenneonatus_kintegturgorlist_3">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kintegturgorlist_3">Sangat Lambat</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0" style="padding-bottom: 3px; padding-top: 3px; border-bottom-style: solid; border-bottom-width: thin;">
                                        <div class="col-md-2">
                                            &ensp;&ensp;&ensp;<label class="col-form-label"> Kelainan Kulit</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row" id="dacriasesmenneonatus_kintegkulitlist">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kintegkulitlist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kintegkulitlist_1">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kintegkulitlist_1">Tidak Ada</label>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kintegkulitlist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kintegkulitlist_2">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kintegkulitlist_2">Rash</label>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kintegkulitlist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kintegkulitlist_3">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kintegkulitlist_3">Petechi</label>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kintegkulitlist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kintegkulitlist_4">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kintegkulitlist_4">Purpura</label>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kintegkulitlist" value="5" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kintegkulitlist_5">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kintegkulitlist_5">Bulae</label>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kintegkulitlist" value="6" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kintegkulitlist_6">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kintegkulitlist_6">Kusta</label>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kintegkulitlist" value="7" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kintegkulitlist_7">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kintegkulitlist_7">Lesi</label>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kintegkulitlist" value="8" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kintegkulitlist_8">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kintegkulitlist_8">Ulkus</label>
                                                        </div>
                                                        <div class="row" id="dacriasesmenneonatus_div_kintegkulitlist8" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea rows="2" name="dacriasesmenneonatus_kintegkulitlistket8" id="dacriasesmenneonatus_kintegkulitlistket8" style="width:100%;" class="form-control"></textarea>
                                                            </div>*
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kintegkulitlist" value="9" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kintegkulitlist_9">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kintegkulitlist_9">Lain-lain</label>
                                                        </div>

                                                        <div class="row" id="dacriasesmenneonatus_div_kintegkulitlist9" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea rows="2" name="dacriasesmenneonatus_kintegkulitlistket9" id="dacriasesmenneonatus_kintegkulitlistket9" style="width:100%;" class="form-control"></textarea>
                                                            </div>*
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0" style="padding-bottom: 3px; padding-top: 3px; border-bottom-style: solid; border-bottom-width: thin;">
                                        <div class="col-md-2">
                                            &ensp;&ensp;&ensp;<label class="col-form-label"> Luka Dekubitus</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row" id="dacriasesmenneonatus_kinteglukalist">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kinteglukalist" value="1" type="radio" class="custom-control-input" id="dacriasesmenneonatus_kinteglukalist_1">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kinteglukalist_1">Tidak Ada</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kinteglukalist" value="2" type="radio" class="custom-control-input" id="dacriasesmenneonatus_kinteglukalist_2">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kinteglukalist_2">Ada, Lokasi</label>
                                                        </div>
                                                        <div class="row" id="dacriasesmenneonatus_div_kinteglukalist2" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea rows="2" name="dacriasesmenneonatus_kinteglukalistket2" id="dacriasesmenneonatus_kinteglukalistket2" style="width:100%;" class="form-control"></textarea>
                                                            </div>*
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0" style="padding-bottom: 3px; padding-top: 3px; border-bottom-style: solid; border-bottom-width: thin;">
                                        <div class="col-md-2">
                                            <label class="col-form-label font-weight-bold"><i class="fas fa-angle-right"></i> Ekstremitas</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row" id="dacriasesmenneonatus_kekstreitaslist">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kekstreitaslist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kekstreitaslist_1">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kekstreitaslist_1">Normal</label>
                                                        </div>





                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kekstreitaslist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kekstreitaslist_2">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kekstreitaslist_2">Plegia</label>
                                                        </div>
                                                        <div class="row" id="dacriasesmenneonatus_div_kekstreitaslist2" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea rows="2" name="dacriasesmenneonatus_kekstreitaslistket2" id="dacriasesmenneonatus_kekstreitaslistket2" style="width:100%;" class="form-control"></textarea>
                                                            </div>*
                                                        </div>




                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kekstreitaslist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kekstreitaslist_3">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kekstreitaslist_3">Parese</label>
                                                        </div>

                                                        <div class="row" id="dacriasesmenneonatus_div_kekstreitaslist3" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea rows="2" name="dacriasesmenneonatus_kekstreitaslistket3" id="dacriasesmenneonatus_kekstreitaslistket3" style="width:100%;" class="form-control"></textarea>
                                                            </div>*
                                                        </div>



                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kekstreitaslist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kekstreitaslist_4">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kekstreitaslist_4">Oedem</label>
                                                        </div>


                                                        <div class="row" id="dacriasesmenneonatus_div_kekstreitaslist4" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea rows="2" name="dacriasesmenneonatus_kekstreitaslistket4" id="dacriasesmenneonatus_kekstreitaslistket4" style="width:100%;" class="form-control"></textarea>
                                                            </div>*
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kekstreitaslist" value="5" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kekstreitaslist_5">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kekstreitaslist_5">CRT</label>
                                                        </div>



                                                        <div class="row" id="dacriasesmenneonatus_div_kekstreitaslist5">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-11">
                                                                <div class="row" id="dacriasesmenneonatus_kekstreitas5Id">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                                <input name="dacriasesmenneonatus_kekstreitas5Id" value="1" type="radio" class="custom-control-input" id="dacriasesmenneonatus_kekstreitas5Id_1">
                                                                                <label class="custom-control-label" for="dacriasesmenneonatus_kekstreitas5Id_1">&lt; 3 Detik</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                                <input name="dacriasesmenneonatus_kekstreitas5Id" value="2" type="radio" class="custom-control-input" id="dacriasesmenneonatus_kekstreitas5Id_2">
                                                                                <label class="custom-control-label" for="dacriasesmenneonatus_kekstreitas5Id_2">&gt; 3 Detik</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- <div class="col-md-10">
										     		<textarea rows="1" th:name="${ccm+'_kekstreitaslistket5'}" th:id="${ccm+'_kekstreitaslistket5'}" 
							            				style="width:100%;" class="form-control"></textarea>
												</div>* -->
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kekstreitaslist" value="6" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kekstreitaslist_6">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kekstreitaslist_6">Lain-lain</label>
                                                        </div>




                                                        <div class="row" id="dacriasesmenneonatus_div_kekstreitaslist6" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea rows="2" name="dacriasesmenneonatus_kekstreitaslistket6" id="dacriasesmenneonatus_kekstreitaslistket6" style="width:100%;" class="form-control"></textarea>
                                                            </div>*
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-12">
                                            <label class="col-form-label font-weight-bold"><i class="fas fa-angle-right"></i> System Syaraf Pusat</label>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0" style="padding-bottom: 3px; padding-top: 3px; border-bottom-style: solid; border-bottom-width: thin;">
                                        <div class="col-md-2">
                                            &ensp;&ensp;&ensp;<label class="col-form-label"> Refleks</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row" id="dacriasesmenneonatus_kreflekslist">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kreflekslist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kreflekslist_1">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kreflekslist_1">Moro</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kreflekslist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kreflekslist_2">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kreflekslist_2">Menggenggam (Palmar Grasps)</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kreflekslist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kreflekslist_3">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kreflekslist_3">Rooting</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kreflekslist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kreflekslist_4">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kreflekslist_4">Menghisap (Sucking)</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kreflekslist" value="5" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kreflekslist_5">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kreflekslist_5">Tonik Neck</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kreflekslist" value="6" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_kreflekslist_6">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kreflekslist_6">Babinski</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0" style="padding-bottom: 3px; padding-top: 3px; border-bottom-style: solid; border-bottom-width: thin;">
                                        <div class="col-md-2">
                                            &ensp;&ensp;&ensp;<label class="col-form-label"> Gerak</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row" id="dacriasesmenneonatus_kgeraklist">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kgeraklist" value="1" type="radio" class="custom-control-input" id="dacriasesmenneonatus_kgeraklist_1">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kgeraklist_1">Aktif</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_kgeraklist" value="2" type="radio" class="custom-control-input" id="dacriasesmenneonatus_kgeraklist_2">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_kgeraklist_2">Tidak Aktif</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-2">
                                            &ensp;&ensp;&ensp;<label class="col-form-label"> Tangis Bayi</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row" id="dacriasesmenneonatus_ktangislist">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_ktangislist" value="1" type="radio" class="custom-control-input" id="dacriasesmenneonatus_ktangislist_1">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_ktangislist_1">Kuat</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_ktangislist" value="2" type="radio" class="custom-control-input" id="dacriasesmenneonatus_ktangislist_2">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_ktangislist_2">Lemah</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_ktangislist" value="3" type="radio" class="custom-control-input" id="dacriasesmenneonatus_ktangislist_3">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_ktangislist_3">Melengking</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_ktangislist" value="4" type="radio" class="custom-control-input" id="dacriasesmenneonatus_ktangislist_4">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_ktangislist_4">Lain-lain</label>
                                                        </div>
                                                        <div class="row" id="dacriasesmenneonatus_div_ktangislist4" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea rows="2" name="dacriasesmenneonatus_ktangislistket4" id="dacriasesmenneonatus_ktangislistket4" style="width:100%;" class="form-control"></textarea>
                                                            </div>*
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
                <div class="card card-default">
                    <div class="card-header" style="background-color:black;">
                        <h3 class="card-title" style="color:white;">ASPEK PENGKAJIAN NYERI</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                    <i class="fas fa-times"></i>
                                                </button> -->
                        </div>
                    </div>
                    <div class="col-lg-12 row">
                        <div class="card-body">
                            <div class="row" id="dacriasesmenneonatus_divnyeri1">
                                <div class="col-md-12">
                                    <div class="row d-none">
                                        <div class="col-md-12">
                                            <label class="col-form-label font-italic">* Pilihlah salah satu penilaian nyeri sesuai usia pasien dibawah ini dengan memberikan tanda √ di dalam kotak yang tersedia dan berikan skor</label>
                                        </div>
                                    </div>
                                    <div class="row " style="padding-bottom: 4px;">
                                        <div class="col-md-12 row d-flex">
                                            <label class="col-form-label font-italic">* Penilaian Nyeri Pada Pasien 0-28 Hari Dengan NEONATAL INFANTS PAIN SCALE (NIPS)</label>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-sm newtable" width="100%">
                                                <tbody>
                                                    <tr>
                                                        <td width="20%" style="padding:0; padding-bottom: 3px; padding-top: 3px;">
                                                            <div class="row d-flex justify-content-center">
                                                                <b><label class="col-form-label">KRITERIA</label></b>
                                                            </div>
                                                        </td>
                                                        <td width="50%" style="padding:0; padding-bottom: 3px; padding-top: 3px;">
                                                            <div class="row d-flex justify-content-center">
                                                                <b><label class="col-form-label">INDIKATOR</label></b>
                                                            </div>
                                                        </td>
                                                        <td width="15%" style="padding:0; padding-bottom: 3px; padding-top: 3px;">
                                                            <div class="row d-flex justify-content-center">
                                                                <b><label class="col-form-label">SKOR</label></b>
                                                            </div>
                                                        </td>
                                                        <td width="15%" style="padding:0; padding-bottom: 3px; padding-top: 3px;">
                                                            <div class="row d-flex justify-content-center">
                                                                <b><label class="col-form-label">HASIL</label></b>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center" width="20%">
                                                            <b>Ekspresi Wajah</b>
                                                        </td>
                                                        <td width="50%" style="padding:0;">
                                                            <table class="table-borderless table-condensed table-hover" width="100%">
                                                                <tbody>
                                                                    <tr onclick="dacriasesmenneonatusex_setScoreflacc(1, 0);">
                                                                        <td width="100%" style="padding:0;">
                                                                            <label class="col-form-label">&ensp;Santai</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setScoreflacc(1, 1);">
                                                                        <td style="padding:0;">
                                                                            <label class="col-form-label">&ensp;Meringis</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td width="15%" style="padding:0;">
                                                            <table class="table-borderless table-condensed table-hover" width="100%">
                                                                <tbody>
                                                                    <tr align="center" onclick="dacriasesmenneonatusex_setScoreflacc(1, 0);">
                                                                        <td width="100%" style="padding:0;">
                                                                            <label class="col-form-label">0</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr align="center" onclick="dacriasesmenneonatusex_setScoreflacc(1, 1);">
                                                                        <td style="padding:0;">
                                                                            <label class="col-form-label">1</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td width="15%" style="padding:1;">
                                                            <input type="text" class="form-control" id="dacriasesmenneonatus_cnyeriflacc1" style="text-align:center; font-size: 40px" value="0" disabled>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center" width="15%">
                                                            <b>Menangis</b>
                                                        </td>
                                                        <td width="50%" style="padding:0;">
                                                            <table class="table-borderless table-condensed table-hover" width="100%">
                                                                <tbody>
                                                                    <tr onclick="dacriasesmenneonatusex_setScoreflacc(2, 0);">
                                                                        <td width="100%" style="padding:0;">
                                                                            <label class="col-form-label">&ensp;Tidak Menangis</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setScoreflacc(2, 1);">
                                                                        <td style="padding:0;">
                                                                            <label class="col-form-label">&ensp;Merintih</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setScoreflacc(2, 2);">
                                                                        <td style="padding:0;">
                                                                            <label class="col-form-label">&ensp;Menangis Kuat</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td width="15%" style="padding:0;">
                                                            <table class="table-borderless table-condensed table-hover" width="100%">
                                                                <tbody>
                                                                    <tr align="center" onclick="dacriasesmenneonatusex_setScoreflacc(2, 0);">
                                                                        <td width="100%" style="padding:0;">
                                                                            <label class="col-form-label">0</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr align="center" onclick="dacriasesmenneonatusex_setScoreflacc(2, 1);">
                                                                        <td style="padding:0;">
                                                                            <label class="col-form-label">1</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr align="center" onclick="dacriasesmenneonatusex_setScoreflacc(2, 2);">
                                                                        <td style="padding:0;">
                                                                            <label class="col-form-label">2</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td width="15%">
                                                            <input type="text" class="form-control" id="dacriasesmenneonatus_cnyeriflacc2" style="text-align:center; font-size: 40px" value="0" disabled>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center" width="15%">
                                                            <b>Pola Bernafas</b>
                                                        </td>
                                                        <td width="50%" style="padding:0;">
                                                            <table class="table-borderless table-condensed table-hover" width="100%">
                                                                <tbody>
                                                                    <tr onclick="dacriasesmenneonatusex_setScoreflacc(3, 0);">
                                                                        <td width="100%" style="padding:0;">
                                                                            <label class="col-form-label">&ensp;Teratur</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setScoreflacc(3, 1);">
                                                                        <td style="padding:0;">
                                                                            <label class="col-form-label">&ensp;Tidak Teratur</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td width="15%" style="padding:0;">
                                                            <table class="table-borderless table-condensed table-hover" width="100%">
                                                                <tbody>
                                                                    <tr align="center" onclick="dacriasesmenneonatusex_setScoreflacc(3, 0);">
                                                                        <td width="100%" style="padding:0;">
                                                                            <label class="col-form-label">0</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr align="center" onclick="dacriasesmenneonatusex_setScoreflacc(3, 1);">
                                                                        <td style="padding:0;">
                                                                            <label class="col-form-label">1</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td width="15%">
                                                            <input type="text" class="form-control" id="dacriasesmenneonatus_cnyeriflacc3" style="text-align:center; font-size: 40px" value="0" disabled>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center" width="15%">
                                                            <b>Lengan</b>
                                                        </td>
                                                        <td width="50%" style="padding:0;">
                                                            <table class="table-borderless table-condensed table-hover" width="100%">
                                                                <tbody>
                                                                    <tr onclick="dacriasesmenneonatusex_setScoreflacc(4, 0);">
                                                                        <td width="100%" style="padding:0;">
                                                                            <label class="col-form-label">&ensp;Normal</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setScoreflacc(4, 1);">
                                                                        <td style="padding:0;">
                                                                            <label class="col-form-label">&ensp;Fleksi / Ekstensi</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td width="15%" style="padding:0;">
                                                            <table class="table-borderless table-condensed table-hover" width="100%">
                                                                <tbody>
                                                                    <tr align="center" onclick="dacriasesmenneonatusex_setScoreflacc(4, 0);">
                                                                        <td width="100%" style="padding:0;">
                                                                            <label class="col-form-label">0</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr align="center" onclick="dacriasesmenneonatusex_setScoreflacc(4, 1);">
                                                                        <td style="padding:0;">
                                                                            <label class="col-form-label">1</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td width="15%">
                                                            <input type="text" class="form-control" id="dacriasesmenneonatus_cnyeriflacc4" style="text-align:center; font-size: 40px" value="0" disabled>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center" width="15%">
                                                            <b>Kaki</b>
                                                        </td>
                                                        <td width="50%" style="padding:0;">
                                                            <table class="table-borderless table-condensed table-hover" width="100%">
                                                                <tbody>
                                                                    <tr onclick="dacriasesmenneonatusex_setScoreflacc(5, 0);">
                                                                        <td width="100%" style="padding:0;">
                                                                            <label class="col-form-label">&ensp;Normal</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setScoreflacc(5, 1);">
                                                                        <td style="padding:0;">
                                                                            <label class="col-form-label">&ensp;Fleksi / Ekstensi</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td width="15%" style="padding:0;">
                                                            <table class="table-borderless table-condensed table-hover" width="100%">
                                                                <tbody>
                                                                    <tr align="center" onclick="dacriasesmenneonatusex_setScoreflacc(5, 0);">
                                                                        <td width="100%" style="padding:0;">
                                                                            <label class="col-form-label">0</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr align="center" onclick="dacriasesmenneonatusex_setScoreflacc(5, 1);">
                                                                        <td style="padding:0;">
                                                                            <label class="col-form-label">1</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td width="15%">
                                                            <input type="text" class="form-control" id="dacriasesmenneonatus_cnyeriflacc5" style="text-align:center; font-size: 40px" value="0" disabled>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center" width="15%">
                                                            <b>Keadaan Rangsangan</b>
                                                        </td>
                                                        <td width="50%" style="padding:0;">
                                                            <table class="table-borderless table-condensed table-hover" width="100%">
                                                                <tbody>
                                                                    <tr onclick="dacriasesmenneonatusex_setScoreflacc(6, 0);">
                                                                        <td width="100%" style="padding:0;">
                                                                            <label class="col-form-label">&ensp;Tertidur / Bangun</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setScoreflacc(6, 1);">
                                                                        <td style="padding:0;">
                                                                            <label class="col-form-label">&ensp;Menangis</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td width="15%" style="padding:0;">
                                                            <table class="table-borderless table-condensed table-hover" width="100%">
                                                                <tbody>
                                                                    <tr align="center" onclick="dacriasesmenneonatusex_setScoreflacc(6, 0);">
                                                                        <td width="100%" style="padding:0;">
                                                                            <label class="col-form-label">0</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr align="center" onclick="dacriasesmenneonatusex_setScoreflacc(6, 1);">
                                                                        <td style="padding:0;">
                                                                            <label class="col-form-label">1</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td width="15%">
                                                            <input type="text" class="form-control" id="dacriasesmenneonatus_cnyeriflacc6" style="text-align:center; font-size: 40px" value="0" disabled>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center" width="20%">
                                                            <b>Total</b>
                                                        </td>
                                                        <td width="75%" colspan="2"></td>
                                                        <td width="15%">
                                                            <input type="text" class="form-control" id="dacriasesmenneonatus_cnyeriflacctot" style="text-align:center; font-size: 40px" value="0" disabled>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="dacriasesmenneonatus_divnyeri2">
                                <div class="col-md-6">
                                    <div class="row ">
                                        <div class="col-md-4">
                                            <label class="col-form-label font-weight-bold">BAYI PREMATURE</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row" id="dacriasesmenneonatus_cpremature">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_cpremature" value="1" type="radio" class="custom-control-input" id="dacriasesmenneonatus_cpremature_1">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_cpremature_1">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_cpremature" value="2" type="radio" class="custom-control-input" id="dacriasesmenneonatus_cpremature_2">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_cpremature_2">Ya</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" id="dacriasesmenneonatus_div_cpremature2" style="display: none;">
                                    <div class="row">
                                        <div class="col-md-12 row d-flex">
                                            <label class="col-form-label font-italic">* Pada Bayi Premature, Ditambahkan Dua Parameter Lagi Yaitu Frekuensi Detak Jantung dan Saturasi Oksigen</label>
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table table-bordered table-sm newtable" width="100%" style="padding:0;">
                                                <tbody>
                                                    <tr>
                                                        <td width="20%" style="padding:0; padding-bottom: 3px; padding-top: 3px;">
                                                            <div class="row d-flex justify-content-center">
                                                                <b><label class="col-form-label">PARAMETER</label></b>
                                                            </div>
                                                        </td>
                                                        <td width="50%" style="padding:0; padding-bottom: 3px; padding-top: 3px;">
                                                            <div class="row d-flex justify-content-center">
                                                                <b><label class="col-form-label">TEMUAN</label></b>
                                                            </div>
                                                        </td>
                                                        <td width="15%" style="padding:0; padding-bottom: 3px; padding-top: 3px;">
                                                            <div class="row d-flex justify-content-center">
                                                                <b><label class="col-form-label">SKOR</label></b>
                                                            </div>
                                                        </td>
                                                        <td width="15%" style="padding:0; padding-bottom: 3px; padding-top: 3px;">
                                                            <div class="row d-flex justify-content-center">
                                                                <b><label class="col-form-label">HASIL</label></b>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="20%" style="padding:1;">
                                                            <b>Frekuensi Detak Jantung</b>
                                                        </td>
                                                        <td width="50%" style="padding:0;">
                                                            <table class="table-borderless table-condensed table-hover" width="100%">
                                                                <tbody>
                                                                    <tr onclick="dacriasesmenneonatusex_setScoreflacc(7, 0);">
                                                                        <td width="100%" style="padding:0;">
                                                                            <label class="col-form-label">&ensp;10% Dari Baseline</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setScoreflacc(7, 1);">
                                                                        <td style="padding:0;">
                                                                            <label class="col-form-label">&ensp;11 - 20% Dari Baseline</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setScoreflacc(7, 2);">
                                                                        <td style="padding:0;">
                                                                            <label class="col-form-label">&ensp;&gt; 20% Dari Baseline</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td width="15%" style="padding:0;">
                                                            <table class="table-borderless table-condensed table-hover" width="100%">
                                                                <tbody>
                                                                    <tr align="center" onclick="dacriasesmenneonatusex_setScoreflacc(7, 0);">
                                                                        <td width="100%" style="padding:0;">
                                                                            <label class="col-form-label">0</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr align="center" onclick="dacriasesmenneonatusex_setScoreflacc(7, 1);">
                                                                        <td style="padding:0;">
                                                                            <label class="col-form-label">1</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr align="center" onclick="dacriasesmenneonatusex_setScoreflacc(7, 2);">
                                                                        <td style="padding:0;">
                                                                            <label class="col-form-label">2</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td width="15%" style="padding:1;">
                                                            <input type="text" class="form-control" id="dacriasesmenneonatus_cnyeriflacc7" style="text-align:center; font-size: 40px" value="0" disabled>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td width="15%" style="padding:1;">
                                                            <b>Saturasi Oksigen</b>
                                                        </td>
                                                        <td width="50%" style="padding:0;">
                                                            <table class="table-borderless table-condensed table-hover" width="100%">
                                                                <tbody>
                                                                    <tr onclick="dacriasesmenneonatusex_setScoreflacc(8, 0);">
                                                                        <td width="100%" style="padding:0;">
                                                                            <label class="col-form-label">&ensp;Tidak Diperlukan Oksigen Tambahan</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr onclick="dacriasesmenneonatusex_setScoreflacc(8, 1);">
                                                                        <td style="padding:0;">
                                                                            <label class="col-form-label">&ensp;Penambahan Oksigen Diperlukan</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td width="15%" style="padding:0;">
                                                            <table class="table-borderless table-condensed table-hover" width="100%">
                                                                <tbody>
                                                                    <tr align="center" onclick="dacriasesmenneonatusex_setScoreflacc(8, 0);">
                                                                        <td width="100%" style="padding:0;">
                                                                            <label class="col-form-label">0</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr align="center" onclick="dacriasesmenneonatusex_setScoreflacc(8, 1);">
                                                                        <td style="padding:0;">
                                                                            <label class="col-form-label">1</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td width="15%">
                                                            <input type="text" class="form-control" id="dacriasesmenneonatus_cnyeriflacc8" style="text-align:center; font-size: 40px" value="0" disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="">
                                                        <td width="20%" style="padding:1;">
                                                            <b>Total</b>
                                                        </td>
                                                        <td width="75%" colspan="2"></td>
                                                        <td width="15%">
                                                            <input type="text" class="form-control" id="dacriasesmenneonatus_cnyeriflacctot2" style="text-align:center; font-size: 40px" value="0" disabled>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12" style="padding-top: 5px;">
                                    <div class="row ">
                                        <div class="col-md-12 row d-flex">
                                            <label style="font-size: 13px;" class="col-form-label font-weight-bold"> Total Skor : &nbsp;</label>
                                            <label style="font-size: 13px;" class="col-form-label font-weight-bold" id="dacriasesmenneonatus_cnyeriflacctot3">0</label>
                                        </div>
                                        <div class="col-md-12 row d-flex">
                                            <label class="col-form-label font-italic">* Keterangan : Skor 0 Tidak Nyeri, 1-2 Nyeri Ringan, 3-4 Nyeri Sedang, &gt;4 Nyeri Hebat</label>
                                        </div>
                                        <div class="col-md-12 row d-flex">
                                            <label class="col-form-label font-weight-bold">Hasil Skrining :&nbsp;</label>
                                            <label class="col-form-label font-weight-bold" id="dacriasesmenneonatus_lskriningnyeri">TIDAK NYERI</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-default">
                    <div class="card-header" style="background-color:black;">
                        <h3 class="card-title" style="color:white;">SKRINING GIZI</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                    <i class="fas fa-times"></i>
                                                </button> -->
                        </div>
                    </div>
                    <div class="col-lg-12 row">
                        <div class="card-body">
                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="form-group row mb-0">
                                        <div class="col-md-4">
                                            <label class="col-form-label"><i class="fas fa-angle-right"></i> Minum</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row" id="dacriasesmenneonatus_egiziminumlist">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_egiziminumlist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_egiziminumlist_1">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_egiziminumlist_1">ASI</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_egiziminumlist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_egiziminumlist_2">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_egiziminumlist_2">PASI</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0" id="dacriasesmenneonatus_div_egiziminumlist2" style="display:none; padding-bottom: 4px;">
                                        <div class="col-md-4 "></div>
                                        <!-- <div class="col-md-4">&nbsp;</div>
                                        <div class="col-md-0">&ensp;&ensp;&ensp;&ensp;&nbsp;</div> -->
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text form-control-xs">Frekuensi</span>
                                                </span>
                                                <input type="number" class="form-control form-control-xs" id="dacriasesmenneonatus_egiziminumket">
                                                <span class="input-group-append">
                                                    <span class="input-group-text form-control-xs">x/24 Jam</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-4">
                                            &ensp;&ensp;&ensp;<label class="col-form-label">Masalah Dalam Minum</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row" id="dacriasesmenneonatus_egizia">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_egizia" value="1" type="radio" class="custom-control-input" id="dacriasesmenneonatus_egizia_1" onclick="dacriasesmenneonatusex.sethasilgizi();">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_egizia_1">Tidak Ada (0)</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_egizia" value="2" type="radio" class="custom-control-input" id="dacriasesmenneonatus_egizia_2" onclick="dacriasesmenneonatusex.sethasilgizi();">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_egizia_2">Ada (1)</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-4">
                                            <label class="col-form-label"><i class="fas fa-angle-right"></i> Penurunan Berat Badan</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row" id="dacriasesmenneonatus_egizib">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_egizib" value="1" type="radio" class="custom-control-input" id="dacriasesmenneonatus_egizib_1" onclick="dacriasesmenneonatusex.sethasilgizi();">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_egizib_1">Belum dapat dinilai/&lt;= 10% dari BBL (0)</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_egizib" value="2" type="radio" class="custom-control-input" id="dacriasesmenneonatus_egizib_2" onclick="dacriasesmenneonatusex.sethasilgizi();">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_egizib_2">&gt; 10% dari BBL (1)</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-4">
                                            <label class="col-form-label"><i class="fas fa-angle-right"></i> Penyakit yang Menyertai</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row" id="dacriasesmenneonatus_egizic">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_egizic" value="1" type="radio" class="custom-control-input" id="dacriasesmenneonatus_egizic_1" onclick="dacriasesmenneonatusex.sethasilgizi();">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_egizic_1">Tidak Ada (0)</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_egizic" value="2" type="radio" class="custom-control-input" id="dacriasesmenneonatus_egizic_2" onclick="dacriasesmenneonatusex.sethasilgizi();">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_egizic_2">Ada (2)</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row mb-0">
                                        <div class="col-md-4">
                                            <b><label class="col-form-label font-weight-bold">Total Skor </label></b>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="col-md-12">
                                                <input type="number" onfocus="this.select();" class="form-control form-control-xs font-weight-bold" name="dacriasesmenneonatus_egiziskor" id="dacriasesmenneonatus_egiziskor" value="0">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-12">
                                            <label class="col-form-label font-weight-bold">Tindak Lanjut</label>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0" id="dacriasesmenneonatus_div_egizitindak1list">
                                        <div class="col-md-5">
                                            &ensp;&ensp;<label class="col-form-label">Skor &lt; 2 : Diet yang Diberikan</label>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="row" id="dacriasesmenneonatus_egizitindak1">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_egizitindak1list" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_egizitindak1list_1">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_egizitindak1list_1">ASI</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_egizitindak1list" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_egizitindak1list_2">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_egizitindak1list_2">PASI</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_egizitindak1list" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_egizitindak1list_3">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_egizitindak1list_3">Peroral / NGT</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0" id="dacriasesmenneonatus_div_egizitindak2list" style="display: none;">
                                        <div class="col-md-4">
                                            &ensp;&ensp;<label class="col-form-label">Skor &gt;= 2 </label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row" id="dacriasesmenneonatus_egizitindak2">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_egizitindak2list" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_egizitindak2list_1">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_egizitindak2list_1">Lapor DPJP</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_egizitindak2list" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_egizitindak2list_2">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_egizitindak2list_2">Asesmen Lanjut Oleh Ahli Gizi</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-12 row d-flex justify-content-center">
                                    <label class="col-form-label font-weight-bold">Daftar Penyakit / Keadaan yang Berisiko Mengakibatkan Malnutrisi</label>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-condensed" width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="33%" style="padding:0;">
                                                    <div class="row ">
                                                        <div class="col-md-12">
                                                            <div class="form-group row mb-0">
                                                                <div class="col-md-12">
                                                                    <label class="col-form-label"><i class="fas fa-caret-right"></i> (Tersangka) Penyakit Jantung Bawaan</label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-0">
                                                                <div class="col-md-12">
                                                                    <label class="col-form-label"><i class="fas fa-caret-right"></i> (Tersangka) HIV</label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-0">
                                                                <div class="col-md-12">
                                                                    <label class="col-form-label"><i class="fas fa-caret-right"></i> (Tersangka) Kanker</label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-0">
                                                                <div class="col-md-12">
                                                                    <label class="col-form-label"><i class="fas fa-caret-right"></i> Penyakit Hati Kronik</label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-0">
                                                                <div class="col-md-12">
                                                                    <label class="col-form-label"><i class="fas fa-caret-right"></i> Kelainan Anatomi Daerah Mulut yang Menyebabkan Kesulitan Makan (Misal: Bibir Sumbing)</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td width="33%" style="padding:0;">
                                                    <div class="row ">
                                                        <div class="col-md-12">
                                                            <div class="form-group row mb-0">
                                                                <div class="col-md-12">
                                                                    <label class="col-form-label"><i class="fas fa-caret-right"></i> Diare kronik</label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-0">
                                                                <div class="col-md-12">
                                                                    <label class="col-form-label"><i class="fas fa-caret-right"></i> TB paru</label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-0">
                                                                <div class="col-md-12">
                                                                    <label class="col-form-label"><i class="fas fa-caret-right"></i> Luka Bakar Luas</label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-0">
                                                                <div class="col-md-12">
                                                                    <label class="col-form-label"><i class="fas fa-caret-right"></i> Terpasang stoma</label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-0">
                                                                <div class="col-md-12">
                                                                    <label class="col-form-label"><i class="fas fa-caret-right"></i> Trauma</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td width="34%" style="padding:0;">
                                                    <div class="row ">
                                                        <div class="col-md-12">
                                                            <div class="form-group row mb-0">
                                                                <div class="col-md-12">
                                                                    <label class="col-form-label"><i class="fas fa-caret-right"></i> Retardasi Mental</label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-0">
                                                                <div class="col-md-12">
                                                                    <label class="col-form-label"><i class="fas fa-caret-right"></i> Keterlambatan Perkembangan</label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-0">
                                                                <div class="col-md-12">
                                                                    <label class="col-form-label"><i class="fas fa-caret-right"></i> Rencana / Paska Pembedahan Mayor</label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-0">
                                                                <div class="col-md-12">
                                                                    <label class="col-form-label"><i class="fas fa-caret-right"></i> Lain-lain Sesuai Pertimbangan Dokter</label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-0">
                                                                <div class="col-md-12">
                                                                    <label class="col-form-label"><i class="fas fa-caret-right"></i> Kelainan Metabolic Bawaan</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-default">
                    <div class="card-header" style="background-color:black;">
                        <h3 class="card-title" style="color:white;">SKRINING RISIKO CEDERA / JATUH</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                    <i class="fas fa-times"></i>
                                                </button> -->
                        </div>
                    </div>
                    <div class="col-lg-12 row">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row ">
                                        <div class="col-md-12">
                                            <label class="col-form-label font-italic">* Untuk Semua Pasien Neonatus Ditetapkan Status RISIKO JATUH TINGGI </label>
                                            <!-- <label class="col-form-label font-weight-bold font-italic"> RISIKO JATUH TINGGI</label> -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-md-12 row d-flex justify-content-center">
                                    <label class="col-form-label font-weight-bold">INTERVENSI</label>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="table-responsive">
                                    <table class="table table-bordered tabele-sm newtable" width="100%">
                                        <tbody>
                                            <tr id="dacriasesmenneonatus_divmrisiko2">
                                                <td width="16%" class="text-center">
                                                    <b>Risiko Tinggi<< /b> <input hidden="true" class="form-control" id="dacriasesmenneonatus_mtinggiId">
                                                </td>
                                                <td width="80%">
                                                    <div class="col-md-12" id="dacriasesmenneonatus_mtinggilist">
                                                        <div class="row">
                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                <input name="dacriasesmenneonatus_mtinggilist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_mtinggilist_1">
                                                                <label class="custom-control-label" for="dacriasesmenneonatus_mtinggilist_1">Pasangkan Tanda Risiko Jatuh Pada Tiang Infus</label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                <input name="dacriasesmenneonatus_mtinggilist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_mtinggilist_2">
                                                                <label class="custom-control-label" for="dacriasesmenneonatus_mtinggilist_2">Pastikan Roda Tempat Tidur Terkunci</label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                <input name="dacriasesmenneonatus_mtinggilist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_mtinggilist_3">
                                                                <label class="custom-control-label" for="dacriasesmenneonatus_mtinggilist_3">Pagar Pengaman Tempat Tidur Dinaikkan</label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="row custom-control custom-checkbox custom-control-inline">
                                                                <input name="dacriasesmenneonatus_mtinggilist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_mtinggilist_4">
                                                                <label class="custom-control-label" for="dacriasesmenneonatus_mtinggilist_4">Edukasi Pasien / Keluarga Tentang Risiko Jatuh dan Pencegahannya</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-default">
                    <div class="card-header" style="background-color:black;">
                        <h3 class="card-title" style="color:white;">INPUT KEGIATAN*</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Kegiatan</h5>
                                <select id="rlkegiatanNeonatus" class="form-control">
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-default">
                    <div class="card-header" style="background-color:black;">
                        <h3 class="card-title" style="color:white;">KEBUTUHAN EDUKASI&nbsp; (Untuk Orangtua dan Atau Penanggung Jawab)</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                    <i class="fas fa-times"></i>
                                                </button> -->
                        </div>
                    </div>
                    <div class="col-lg-12 row">
                        <div class="card-body">
                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="form-group row" style="padding-bottom: 3px;">
                                        <div class="col-md-4">
                                            <label class="col-form-label"><i class="fas fa-angle-right"></i> Bicara</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row" id="dacriasesmenneonatus_ibicaraId">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_ibicaraId" value="1" type="radio" class="custom-control-input" id="dacriasesmenneonatus_ibicaraId_1">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_ibicaraId_1">Normal</label>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_ibicaraId" value="2" type="radio" class="custom-control-input" id="dacriasesmenneonatus_ibicaraId_2">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_ibicaraId_2">Gangguan Bicara</label>
                                                        </div>
                                                    </div>
                                                    <div class="row" id="dacriasesmenneonatus_div_ibicaraId2" style="display: none;">
                                                        <div class="col-md-1">
                                                        </div>
                                                        <div class="col-md-10">
                                                            <textarea rows="2" name="dacriasesmenneonatus_ibicaraket2" id="dacriasesmenneonatus_ibicaraket2" style="width:100%;" class="form-control"></textarea>
                                                        </div>*
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-4">
                                            <label class="col-form-label"><i class="fas fa-angle-right"></i> Terdapat Hambatan Pembelajaran</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row" id="dacriasesmenneonatus_ihambatId">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_ihambatId" value="1" type="radio" class="custom-control-input" id="dacriasesmenneonatus_ihambatId_1">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_ihambatId_1">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_ihambatId" value="2" type="radio" class="custom-control-input" id="dacriasesmenneonatus_ihambatId_2">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_ihambatId_2">Ya</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0 " id="dacriasesmenneonatus_div_ihambatId2" style="display: none;">
                                        <div class="col-md-4">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row" id="dacriasesmenneonatus_ihambatpilihlist">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_ihambatpilihlist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_ihambatpilihlist_1">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_ihambatpilihlist_1">Pendengaran</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_ihambatpilihlist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_ihambatpilihlist_2">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_ihambatpilihlist_2">Penglihatan</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_ihambatpilihlist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_ihambatpilihlist_3">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_ihambatpilihlist_3">Kognitif</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_ihambatpilihlist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_ihambatpilihlist_4">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_ihambatpilihlist_4">Fisik</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_ihambatpilihlist" value="5" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_ihambatpilihlist_5">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_ihambatpilihlist_5">Budaya</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_ihambatpilihlist" value="6" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_ihambatpilihlist_6">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_ihambatpilihlist_6">Agama</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_ihambatpilihlist" value="7" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_ihambatpilihlist_7">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_ihambatpilihlist_7">Emosi</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_ihambatpilihlist" value="8" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_ihambatpilihlist_8">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_ihambatpilihlist_8">Bahasa</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_ihambatpilihlist" value="9" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_ihambatpilihlist_9">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_ihambatpilihlist_9">Lainnya</label>
                                                        </div>
                                                        <div class="row" id="dacriasesmenneonatus_div_ihambatpilihlist9" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea rows="2" name="dacriasesmenneonatus_ihambatpilihlistket9" id="dacriasesmenneonatus_ihambatpilihlistket9" style="width:100%;" class="form-control"></textarea>
                                                            </div>*
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row mb-0" style="padding-bottom: 3px;">
                                        <div class="col-md-4">
                                            <label class="col-form-label"><i class="fas fa-angle-right"></i> Dibutuhkan Penterjemah</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row" id="dacriasesmenneonatus_iterjemahId">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_iterjemahId" value="1" type="radio" class="custom-control-input" id="dacriasesmenneonatus_iterjemahId_1">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_iterjemahId_1">Tidak</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_iterjemahId" value="2" type="radio" class="custom-control-input" id="dacriasesmenneonatus_iterjemahId_2">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_iterjemahId_2">Ya</label>
                                                        </div>
                                                        <div class="row" id="dacriasesmenneonatus_div_iterjemahId2" style="display: none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea rows="2" name="dacriasesmenneonatus_iterjemahket2" id="dacriasesmenneonatus_iterjemahket2" style="width:100%;" class="form-control"></textarea>
                                                            </div>*
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-4">
                                            <label class="col-form-label"><i class="fas fa-angle-right"></i> Kebutuhan Pembelajaran Orang Tua/</label>
                                            <br>
                                            &ensp;&nbsp;
                                            <label class="col-form-label">Penanggung Jawab Pasien</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input hidden="true" class="form-control" id="dacriasesmenneonatus_ibelajarId">
                                            <div class="row" id="dacriasesmenneonatus_ibelajarlist">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_ibelajarlist" value="1" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_ibelajarlist_1">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_ibelajarlist_1">Diagnosis</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_ibelajarlist" value="2" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_ibelajarlist_2">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_ibelajarlist_2">Obat-obatan</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_ibelajarlist" value="3" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_ibelajarlist_3">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_ibelajarlist_3">Diet &amp; nutrisi</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_ibelajarlist" value="4" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_ibelajarlist_4">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_ibelajarlist_4">Tindakan keperawatan</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_ibelajarlist" value="5" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_ibelajarlist_5">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_ibelajarlist_5">Rehabilitasi</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_ibelajarlist" value="6" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_ibelajarlist_6">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_ibelajarlist_6">Managemen nyeri</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <div class="row custom-control custom-checkbox custom-control-inline">
                                                            <input name="dacriasesmenneonatus_ibelajarlist" value="7" type="checkbox" class="custom-control-input" id="dacriasesmenneonatus_ibelajarlist_7">
                                                            <label class="custom-control-label" for="dacriasesmenneonatus_ibelajarlist_7">Lain-lain</label>
                                                        </div>
                                                        <div class="row" id="dacriasesmenneonatus_div_ibelajarlist7" style="display:none;">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea rows="2" name="dacriasesmenneonatus_ibelajarlistket7" id="dacriasesmenneonatus_ibelajarlistket7" style="width:100%;" class="form-control"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <button class="btn btn-xs btn-primary" onclick="simpan_Assesment_Neonatus()"><i class="fas fa-save"></i> Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    Rlkegiatan35();
    
    $(document).ready(function() {
        var data = document.getElementById('profilepasienirna').value;
        if (data=='') {
            var url  = '';
            var view = 'viewassesmentNeonatus';
            onCall_listpasien(view, url);
        }else{
            showAssessmenNeonatus();
        }

        //setTimeout(refresh_listpasermirna_instruksi, 1000); 
    });

    $('#dacriasesmenneonatus_bsumberlist_1').change(function() {
        var checkBox = document.getElementById("dacriasesmenneonatus_bsumberlist_1");
        if (checkBox.checked == true) {
            document.getElementById("dacriasesmenneonatus_div_bsumberlist1").style.display = 'block';
        } else {
            document.getElementById("dacriasesmenneonatus_div_bsumberlist1").style.display = 'none'

        }
    });

    $('#dacriasesmenneonatus_bsumberlist_2').change(function() {
        var checkBox = document.getElementById("dacriasesmenneonatus_bsumberlist_2");
        if (checkBox.checked == true) {
            document.getElementById("dacriasesmenneonatus_bsumberlistdiv_3").style.display = 'block';
            document.getElementById("dacriasesmenneonatus_div_bsumberlist3").style.display = 'block';
            document.getElementById("dacriasesmenneonatus_bsumberlist_3").checked = true;
        } else {
            document.getElementById("dacriasesmenneonatus_bsumberlistdiv_3").style.display = 'none';
            document.getElementById("dacriasesmenneonatus_div_bsumberlist3").style.display = 'none';
            document.getElementById("dacriasesmenneonatus_bsumberlist_3").checked = true;
        }
    });

    $('#dacriasesmenneonatus_bsumberlist_3').change(function() {
        var checkBox = document.getElementById("dacriasesmenneonatus_bsumberlist_3");
        if (checkBox.checked == true) {
            document.getElementById("dacriasesmenneonatus_div_bsumberlist3").style.display = 'block';
        } else {
            document.getElementById("dacriasesmenneonatus_div_bsumberlist3").style.display = 'none'

        }
    });

    $('#dacriasesmenneonatus_bintensive_2').change(function() {
        var checkBox = document.getElementById("dacriasesmenneonatus_bintensive_2");
        if (checkBox.checked == true) {
            document.getElementById("dacriasesmenneonatus_div_bintensive2").style.display = 'block';
        }
    });
    $('#dacriasesmenneonatus_bintensive_1').change(function() {
        var checkBox = document.getElementById("dacriasesmenneonatus_bintensive_2");
        if (checkBox.checked == false) {
            document.getElementById("dacriasesmenneonatus_div_bintensive2").style.display = 'none';
        }
    });

    function dacriasesmenneonatusex_setApgar(a, b, c) {
        switch (a) {
            case 1:
                switch (c) {
                    case 1:
                        document.getElementById('dacriasesmenneonatus_apgarSatu').value = b;
                        break;
                    case 2:
                        document.getElementById('dacriasesmenneonatus_apgarEmpat').value = b;
                        break;
                    case 3:
                        document.getElementById('dacriasesmenneonatus_apgarTujuh').value = b;
                        break;
                    case 4:
                        document.getElementById('dacriasesmenneonatus_apgarSepuluh').value = b;
                        break;
                    case 5:
                        document.getElementById('dacriasesmenneonatus_apgarTigabelas').value = b;
                        break;
                }
                break;
            case 2:
                switch (c) {
                    case 1:
                        document.getElementById('dacriasesmenneonatus_apgarDua').value = b;
                        break;
                    case 2:
                        document.getElementById('dacriasesmenneonatus_apgarLima').value = b;
                        break;
                    case 3:
                        document.getElementById('dacriasesmenneonatus_apgarDelapan').value = b;
                        break;
                    case 4:
                        document.getElementById('dacriasesmenneonatus_apgarSebelas').value = b;
                        break;
                    case 5:
                        document.getElementById('dacriasesmenneonatus_apgarEmpatbelas').value = b;
                        break;
                }
                break;
            case 3:
                switch (c) {
                    case 1:
                        document.getElementById('dacriasesmenneonatus_apgarTiga').value = b;
                        break;
                    case 2:
                        document.getElementById('dacriasesmenneonatus_apgarEnam').value = b;
                        break;
                    case 3:
                        document.getElementById('dacriasesmenneonatus_apgarSembilan').value = b;
                        break;
                    case 4:
                        document.getElementById('dacriasesmenneonatus_apgarDuabelas').value = b;
                        break;
                    case 5:
                        document.getElementById('dacriasesmenneonatus_apgarLimabelas').value = b;
                        break;
                }
                break;

        }
        hitung_dacriasesmenneonatusex_setApgar()
    }

    function hitung_dacriasesmenneonatusex_setApgar() {
        a = document.getElementById('dacriasesmenneonatus_apgarSatu').value;
        b = document.getElementById('dacriasesmenneonatus_apgarEmpat').value;
        c = document.getElementById('dacriasesmenneonatus_apgarTujuh').value;
        d = document.getElementById('dacriasesmenneonatus_apgarSepuluh').value;
        e = document.getElementById('dacriasesmenneonatus_apgarTigabelas').value;

        f = document.getElementById('dacriasesmenneonatus_apgarDua').value;
        g = document.getElementById('dacriasesmenneonatus_apgarEnam').value;
        h = document.getElementById('dacriasesmenneonatus_apgarDelapan').value;
        i = document.getElementById('dacriasesmenneonatus_apgarSebelas').value;
        j = document.getElementById('dacriasesmenneonatus_apgarEmpatbelas').value;

        k = document.getElementById('dacriasesmenneonatus_apgarTiga').value;
        l = document.getElementById('dacriasesmenneonatus_apgarLima').value;
        m = document.getElementById('dacriasesmenneonatus_apgarSembilan').value;
        n = document.getElementById('dacriasesmenneonatus_apgarDuabelas').value;
        o = document.getElementById('dacriasesmenneonatus_apgarLimabelas').value;
        totalSatu = parseInt(a) + parseInt(b) + parseInt(c) + parseInt(d) + parseInt(e);
        totalLima = parseInt(f) + parseInt(g) + parseInt(h) + parseInt(i) + parseInt(j);
        totalSepuluh = parseInt(k) + parseInt(l) + parseInt(m) + parseInt(n) + parseInt(o);
        document.getElementById('dacriasesmenneonatus_apgartotMsatu').value = totalSatu;
        document.getElementById('dacriasesmenneonatus_bpgartotMlima').value = totalLima;
        document.getElementById('dacriasesmenneonatus_cpgartotMsepuluh').value = totalSepuluh;

        /*  if (total == 20) {
             document.getElementById('dacriasesmenmt_lfungsionalId_1').checked = true;
         } else if (total >= 12 && total <= 19) {
             document.getElementById('dacriasesmenmt_lfungsionalId_2').checked = true;
         } else if (total >= 9 && total <= 11) {
             document.getElementById('dacriasesmenmt_lfungsionalId_3').checked = true;
         } else if (total >= 5 && total <= 8) {
             document.getElementById('dacriasesmenmt_lfungsionalId_4').checked = true;
         } */
    }

    function dacriasesmenneonatusex_setScoreDS(a, b) {
        switch (b) {
            case 1:
                document.getElementById('dacriasesmenneonatusex_setScoreDSSatu').value = a;
                break;
            case 2:
                document.getElementById('dacriasesmenneonatusex_setScoreDSDua').value = a;
                break;
            case 3:
                document.getElementById('dacriasesmenneonatusex_setScoreDSTiga').value = a;
                break;
            case 4:
                document.getElementById('dacriasesmenneonatusex_setScoreDSEmpat').value = a;
                break;
            case 5:
                document.getElementById('dacriasesmenneonatusex_setScoreDSLima').value = a;
                break;
        }
        hitung_dacriasesmenneonatusex_setScoreDS()
    }

    function hitung_dacriasesmenneonatusex_setScoreDS() {
        a = document.getElementById('dacriasesmenneonatusex_setScoreDSSatu').value;
        b = document.getElementById('dacriasesmenneonatusex_setScoreDSDua').value;
        c = document.getElementById('dacriasesmenneonatusex_setScoreDSTiga').value;
        d = document.getElementById('dacriasesmenneonatusex_setScoreDSEmpat').value;
        e = document.getElementById('dacriasesmenneonatusex_setScoreDSLima').value;


        total = parseInt(a) + parseInt(b) + parseInt(c) + parseInt(d) + parseInt(e);
        document.getElementById('dacriasesmenneonatusex_setScoreDSTotal').value = total;

        if (total == 0) {
            document.getElementById('dacriasesmenneonatus_downscore').value = 1;
        } else if (total >= 1 && total <= 3) {
            document.getElementById('dacriasesmenneonatus_downscore').value = 2;
        } else if (total >= 4 && total <= 6) {
            document.getElementById('dacriasesmenneonatus_downscore').value = 3;
        } else if (total >= 7) {
            document.getElementById('dacriasesmenneonatus_downscore').value = 4;
        }
    }

    function dacriasesmenneonatusex_setScore(a, b) {
        switch (b) {
            case 1:
                document.getElementById('dacriasesmenneonatus_bgcsa').value = a;
                break;
            case 2:
                document.getElementById('dacriasesmenneonatus_bgcsb').value = a;
                break;
            case 3:
                document.getElementById('dacriasesmenneonatus_bgcsc').value = a;
                break;
        }
        hitung_dacriasesmenneonatusex_setScore()
    }

    function hitung_dacriasesmenneonatusex_setScore() {
        a = document.getElementById('dacriasesmenneonatus_bgcsa').value;
        b = document.getElementById('dacriasesmenneonatus_bgcsb').value;
        c = document.getElementById('dacriasesmenneonatus_bgcsc').value;


        total = parseInt(a) + parseInt(b) + parseInt(c);
        document.getElementById('dacriasesmenneonatus_bgcstot').value = total;

        if (total <= 3) {
            document.getElementById('dacriasesmenneonatus_asadar').value = 6;
        } else if (total >= 4 && total <= 6) {
            document.getElementById('dacriasesmenneonatus_asadar').value = 5;
        } else if (total >= 7 && total <= 9) {
            document.getElementById('dacriasesmenneonatus_asadar').value = 4;
        } else if (total >= 10 && total <= 11) {
            document.getElementById('dacriasesmenneonatus_asadar').value = 3;
        } else if (total >= 12 && total <= 13) {
            document.getElementById('dacriasesmenneonatus_asadar').value = 2;
        } else if (total >= 14) {
            document.getElementById('dacriasesmenneonatus_asadar').value = 1;
        }
    }

    function dacriasesmenneonatusex_setScoreflacc(b, a) {
        switch (b) {
            case 1:
                document.getElementById('dacriasesmenneonatus_cnyeriflacc1').value = a;
                break;
            case 2:
                document.getElementById('dacriasesmenneonatus_cnyeriflacc2').value = a;
                break;
            case 3:
                document.getElementById('dacriasesmenneonatus_cnyeriflacc3').value = a;
                break;
            case 4:
                document.getElementById('dacriasesmenneonatus_cnyeriflacc4').value = a;
                break;
            case 5:
                document.getElementById('dacriasesmenneonatus_cnyeriflacc5').value = a;
                break;
            case 6:
                document.getElementById('dacriasesmenneonatus_cnyeriflacc6').value = a;
                break;
            case 7:
                document.getElementById('dacriasesmenneonatus_cnyeriflacc7').value = a;
                break;
            case 8:
                document.getElementById('dacriasesmenneonatus_cnyeriflacc8').value = a;
                break;
        }
        hitung_dacriasesmenneonatusex_setScoreflacc()
    }

    function hitung_dacriasesmenneonatusex_setScoreflacc() {
        a = document.getElementById('dacriasesmenneonatus_cnyeriflacc1').value;
        b = document.getElementById('dacriasesmenneonatus_cnyeriflacc2').value;
        c = document.getElementById('dacriasesmenneonatus_cnyeriflacc3').value;
        d = document.getElementById('dacriasesmenneonatus_cnyeriflacc4').value;
        e = document.getElementById('dacriasesmenneonatus_cnyeriflacc5').value;
        f = document.getElementById('dacriasesmenneonatus_cnyeriflacc6').value;
        g = document.getElementById('dacriasesmenneonatus_cnyeriflacc7').value;
        h = document.getElementById('dacriasesmenneonatus_cnyeriflacc8').value;


        total1 = parseInt(a) + parseInt(b) + parseInt(c) + parseInt(d) + parseInt(e) + parseInt(f);
        document.getElementById('dacriasesmenneonatus_cnyeriflacctot').value = total1;
        total2 = parseInt(g) + parseInt(h);
        document.getElementById('dacriasesmenneonatus_cnyeriflacctot2').value = total2;

        total = parseInt(total1) + parseInt(total2)
        document.getElementById('dacriasesmenneonatus_cnyeriflacctot3').innerHTML = total;

        if (total == 0) {
            document.getElementById('dacriasesmenneonatus_lskriningnyeri').innerHTML = "TIDAK NYERI";
        } else if (total >= 1 && total <= 2) {
            document.getElementById('dacriasesmenneonatus_lskriningnyeri').innerHTML = "NYERI RINGAN";
        } else if (total >= 3 && total <= 4) {
            document.getElementById('dacriasesmenneonatus_lskriningnyeri').innerHTML = "NYERI SEDANG";
        } else if (total >= 5) {
            document.getElementById('dacriasesmenneonatus_lskriningnyeri').innerHTML = "NYERI HEBAT";
        }
    }

    $('#dacriasesmenneonatus_cpremature_2').change(function() {
        var checkBox = document.getElementById("dacriasesmenneonatus_cpremature_2");
        if (checkBox.checked == true) {
            document.getElementById("dacriasesmenneonatus_div_cpremature2").style.display = 'block';
        }
    });
    $('#dacriasesmenneonatus_cpremature_1').change(function() {
        var checkBox = document.getElementById("dacriasesmenneonatus_cpremature_2");
        if (checkBox.checked == false) {
            document.getElementById("dacriasesmenneonatus_div_cpremature2").style.display = 'none';
        }
    });
    $('#dacriasesmenneonatus_egiziminumlist_2').change(function() {
        var checkBox = document.getElementById("dacriasesmenneonatus_egiziminumlist_2");
        if (checkBox.checked == true) {
            document.getElementById("dacriasesmenneonatus_div_egiziminumlist2").style.display = 'block';
        } else {
            document.getElementById("dacriasesmenneonatus_div_egiziminumlist2").style.display = 'none';
        }
    });

    function simpan_Assesment_Neonatus() {
        var params = {};
        params.dacriasesmenneonatus_bintensiveisi = [];
        $("input:checkbox[name=dacriasesmenneonatus_bintensiveisi]:checked").each(function() {
            params.dacriasesmenneonatus_bintensiveisi.push($(this).val());
        });
        params.dacriasesmenneonatus_binfeksi = [];
        $("input:checkbox[name=dacriasesmenneonatus_binfeksi]:checked").each(function() {
            params.dacriasesmenneonatus_binfeksi.push($(this).val());
        });
        params.dacriasesmenneonatus_egiziminumlist = [];
        $("input:checkbox[name=dacriasesmenneonatus_egiziminumlist]:checked").each(function() {
            params.dacriasesmenneonatus_egiziminumlist.push($(this).val());
        });
        params.dacriasesmenneonatus_egizitindak1list = [];
        $("input:checkbox[name=dacriasesmenneonatus_egizitindak1list]:checked").each(function() {
            params.dacriasesmenneonatus_egizitindak1list.push($(this).val());
        });
        params.dacriasesmenneonatus_mtinggilist = [];
        $("input:checkbox[name=dacriasesmenneonatus_mtinggilist]:checked").each(function() {
            params.dacriasesmenneonatus_mtinggilist.push($(this).val());
        });
        params.dacriasesmenneonatus_ibelajarlist = [];
        $("input:checkbox[name=dacriasesmenneonatus_ibelajarlist]:checked").each(function() {
            params.dacriasesmenneonatus_ibelajarlist.push($(this).val());
        });
        // form = document.getElementById('formAssesmenetNeonatus');
        // var checked = form.querySelector("input[type=radio]:checked");
        // if (!checked) {
        //     toastr.error("Inputan Masih Kosong!!");
        // } else {
            var cekdata = document.getElementById('profilepasienirna').value;
            if (cekdata == '') {
                $('#modallistpasienirna').modal('show');
            } else {
                cekid_KunjunganAN = document.getElementById('idKunjunganermirna').value,
                    param = {
                        id_KunjunganAN: cekid_KunjunganAN,
                        warna_kulit1: document.getElementById('dacriasesmenneonatus_apgarSatu').value,
                        warna_kulit5: document.getElementById('dacriasesmenneonatus_apgarDua').value,
                        warna_kulit10: document.getElementById('dacriasesmenneonatus_apgarTiga').value,
                        d_jantung1: document.getElementById('dacriasesmenneonatus_apgarEmpat').value,
                        d_jantung5: document.getElementById('dacriasesmenneonatus_apgarLima').value,
                        d_jantung10: document.getElementById('dacriasesmenneonatus_apgarEnam').value,
                        pk_rangsang1: document.getElementById('dacriasesmenneonatus_apgarTujuh').value,
                        pk_rangsang5: document.getElementById('dacriasesmenneonatus_apgarDelapan').value,
                        pk_rangsang10: document.getElementById('dacriasesmenneonatus_apgarSembilan').value,
                        t_otot1: document.getElementById('dacriasesmenneonatus_apgarSepuluh').value,
                        t_otot5: document.getElementById('dacriasesmenneonatus_apgarSebelas').value,
                        t_otot10: document.getElementById('dacriasesmenneonatus_apgarDuabelas').value,
                        pernafasan1: document.getElementById('dacriasesmenneonatus_apgarTigabelas').value,
                        pernafasan5: document.getElementById('dacriasesmenneonatus_apgarEmpatbelas').value,
                        pernafasan10: document.getElementById('dacriasesmenneonatus_apgarLimabelas').value,
                        skor_apgar1: document.getElementById('dacriasesmenneonatus_apgartotMsatu').value,
                        skor_apgar5: document.getElementById('dacriasesmenneonatus_bpgartotMlima').value,
                        skor_apgar10: document.getElementById('dacriasesmenneonatus_cpgartotMsepuluh').value,
                        sumber_informasi: document.getElementById('dacriasesmenneonatus_cpgartotMsepuluh').value,
                        ket_sumber_informasi: document.getElementById('dacriasesmenneonatus_cpgartotMsepuluh').value,
                        cara_masuk: document.getElementById('dacriasesmenneonatus_cpgartotMsepuluh').value,
                        asal_masuk: document.getElementById('dacriasesmenneonatus_cpgartotMsepuluh').value,
                        kehamilanke_bg: document.getElementById('dacriasesmenneonatus_bg').value,
                        kehamilanke_bp: document.getElementById('dacriasesmenneonatus_bp').value,
                        kehamilanke_ba: document.getElementById('dacriasesmenneonatus_ba').value,
                        usiahamil: document.getElementById('dacriasesmenneonatus_busiahamil').value,
                        komplikasi: document.querySelector('input[name=dacriasesmenneonatus_bkomplikasi]:checked').value,
                        goldar: document.querySelector('input[name=dacriasesmenneonatus_bgoldaribu]:checked').value,
                        rhesusibu: document.querySelector('input[name=dacriasesmenneonatus_brhesus]:checked').value,
                        jns_salin: document.querySelector('input[name=dacriasesmenneonatus_bjenispersalinan]:checked').value,
                        indikasi: document.getElementById('dacriasesmenneonatus_bindikasi').value,
                        presentasi: document.getElementById('dacriasesmenneonatus_bpersentasi').value,
                        placenta: document.querySelector('input[name=dacriasesmenneonatus_bplacenta]:checked').value,
                        kpd: document.querySelector('input[name=dacriasesmenneonatus_bkpd]:checked').value,
                        obat_obatan: document.querySelector('input[name=dacriasesmenneonatus_bobatsalin]:checked').value,
                        ditolong: document.querySelector('input[name=dacriasesmenneonatus_btolong]:checked').value,
                        intensive: document.querySelector('input[name=dacriasesmenneonatus_bintensive]:checked').value,
                        ket_intensive: params.dacriasesmenneonatus_bintensiveisi,
                        resiko_infeksi: params.dacriasesmenneonatus_binfeksi,
                        cn_ekpresi_wajah: document.getElementById('dacriasesmenneonatus_cnyeriflacc1').value,
                        cn_menangis: document.getElementById('dacriasesmenneonatus_cnyeriflacc2').value,
                        cn_pola_nafas: document.getElementById('dacriasesmenneonatus_cnyeriflacc3').value,
                        cn_lengan: document.getElementById('dacriasesmenneonatus_cnyeriflacc4').value,
                        cn_kaki: document.getElementById('dacriasesmenneonatus_cnyeriflacc5').value,
                        cn_keadaan_rangsang: document.getElementById('dacriasesmenneonatus_cnyeriflacc6').value,
                        cnyeriflacctot1: document.getElementById('dacriasesmenneonatus_cnyeriflacctot').value,
                        cn_frek_detak_jantung: document.getElementById('dacriasesmenneonatus_cnyeriflacc7').value,
                        cn_saturasi: document.getElementById('dacriasesmenneonatus_cnyeriflacc8').value,
                        cnyeriflacctot2: document.getElementById('dacriasesmenneonatus_cnyeriflacctot2').value,
                        prematur: document.querySelector('input[name=dacriasesmenneonatus_cpremature]:checked').value,
                        hasil_skrining: document.getElementById('dacriasesmenneonatus_lskriningnyeri').text,
                        minum: params.dacriasesmenneonatus_egiziminumlist,
                        frekuensi_pasi: document.getElementById('dacriasesmenneonatus_egiziminumket').value,
                        masalahminum: document.querySelector('input[name=dacriasesmenneonatus_egizia]:checked').value,
                        penurunan_bb: document.querySelector('input[name=dacriasesmenneonatus_egizib]:checked').value,
                        penyakit_menyertai: document.querySelector('input[name=dacriasesmenneonatus_egizic]:checked').value,
                        total_skorgizi: document.getElementById('dacriasesmenneonatus_egiziskor').value,
                        tindak_lanjut: params.dacriasesmenneonatus_egizitindak1list,
                        resiko_jatuh: params.dacriasesmenneonatus_mtinggilist,
                        e_bicara: document.querySelector('input[name=dacriasesmenneonatus_ibicaraId]:checked').value,
                        e_hambatan: document.querySelector('input[name=dacriasesmenneonatus_ihambatId]:checked').value,
                        e_terjemah: document.querySelector('input[name=dacriasesmenneonatus_iterjemahId]:checked').value,
                        e_pembelajaran: params.dacriasesmenneonatus_ibelajarlist,
                    }

                apiPOST('Assesmentbos/simpan_Assesment_Neonatus', param, hasil => {})
            }

    }

    function Rlkegiatan35() {
        apiPOST('Assesmentbos/Rlkegiatan35', null, hasil => {
            var a = hasil['data'];
            console.log(a)
            var rl = '<option value="">--Pilihan--</option>';
            for (var i = 0; i < a.length; i++) {
                rl += '<option value="' + a[i]['id_kegiatan'] + '">' + a[i]['nama_kegiatan'] + '</option>';
            }
            document.getElementById('rlkegiatanNeonatus').innerHTML = rl;
        });
    }

function showAssessmenNeonatus(no_rm,unit,id_kunjungan,id_unit,nama,transaksi,tgl_lahir,alamat,id_pegawai,jnskelamin,nama_kamar,penjamin,jam_masuk, nama_dokter){

}
</script>