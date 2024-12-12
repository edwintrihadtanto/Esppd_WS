<link rel="stylesheet" href="<?= base_url('_assets/dist/css/adminlte.min.css'); ?>">
<?php
function format_nominal($angka)
{

    $hasil = number_format($angka, 2, ',', '.');
    return $hasil;
}
?>
<table>
    <tr>
        <th>RSU DARMAYU MADIUN</th>
    </tr>
    <tr>
        <td>Jl. Kapten Tendean No. 47, Kelurahan Demangan, Kecamatan Taman, Kota Madiun</td>
    </tr>
    <tr>
        <th>
            NERACA
        </th>
    </tr>
</table>
<table border='1' style='font-family: Arial, Helvetica, sans-serif;' class="table-sm">
    <thead>
        <tr border='1' class="text-center" style="vertical-align: center;">
            <th rowspan="2" class="pl-0" width="10">No.</th>
            <th rowspan="2" width="50">Bulan</th>
            <th style="vertical-align: center;" rowspan="2" width="50">Tahun</th>
            <th style="vertical-align: center;" rowspan="2" width="50">Kode</th>
            <th rowspan="2" width="150">COA</th>
            <th colspan="2" width="100">Saldo Awal</th>
            <th colspan="2" width="100">Transaksi</th>
            <th colspan="2" width="100">Saldo Akhir</th>
        </tr>
        <tr class="text-center">
            <th width="100">Debit</th>
            <th width="100">Kredit</th>
            <th width="100">Debit</th>
            <th width="100">Kredit</th>
            <th width="100">Debit</th>
            <th width="100">Kredit</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sumawal_d = 0;
        $sumawal_k = 0;
        $sumtrans_d = 0;
        $sumtrans_k = 0;
        $sumahir_d = 0;
        $sumahir_k = 0;
        $no = 1;
        foreach ($neraca as $row) :
            $listbulan  = [null, "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $listbulan[$bulan] ?></td>
                <td><?= $tahun ?></td>
                <td><?= $row->id_coa ?></td>
                <td><?= $row->coa ?></td>
                <td class="text-right"><?= format_nominal($row->awald) ?></td>
                <td class="text-right"><?= format_nominal($row->awalk) ?></td>
                <td class="text-right"><?= format_nominal($row->transd) ?></td>
                <td class="text-right"><?= format_nominal($row->transk) ?></td>
                <td class="text-right"><?= format_nominal($row->ahird) ?></td>
                <td class="text-right"><?= format_nominal($row->ahirk) ?></td>
            </tr>
        <?php
        $sumawal_d += $row->awald;
        $sumawal_k += $row->awalk;
        $sumtrans_d += $row->transd;
        $sumtrans_k += $row->transk;
        $sumahir_d += $row->ahird;
        $sumahir_k += $row->ahirk;
        endforeach;
        ?>
        <tr>
            <td colspan="5"></td>
            <td class="text-right"><?= format_nominal($sumawal_d) ?></td>
            <td class="text-right"><?= format_nominal($sumawal_k) ?></td>
            <td class="text-right"><?= format_nominal($sumtrans_d) ?></td>
            <td class="text-right"><?= format_nominal($sumtrans_k) ?></td>
            <td class="text-right"><?= format_nominal($sumahir_d) ?></td>
            <td class="text-right"><?= format_nominal($sumahir_k) ?></td>
        </tr>
    </tbody>
</table>