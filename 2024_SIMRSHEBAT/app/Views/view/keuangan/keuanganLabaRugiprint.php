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
            Laba Rugi
        </th>
    </tr>
</table>
<table border='1' style='font-family: Arial, Helvetica, sans-serif;' class="table-sm">
    <thead>
        <tr class="text-center">
            <th class="pl-0" width="10">No.</th>
            <th width="30">Kode</th>
            <th width="150">COA</th>
            <th width="70">Debit</th>
            <th width="70">Kredit</th>
            <th width="70">Jumlah</th>
            <th width="70">Total</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($labarugi as $row) :
            $jumlah = $row->trans_k - $row->trans_d;
        ?>

            <tr>
                <td><?= $no++ ?></td>
                <?php
                if ($row->id_coa == null) {
                    echo '<td></td>';
                } else {
                    echo '<td>' . $row->id_coa . '</td>';
                }
                if ($row->normal == "INDUK") {
                    if ($row->level == 1) {
                        echo "<td>" . $row->coa . "</td>";
                    }
                    if ($row->level == 2 || $row->level == 5) {
                        echo '<td style="padding-left: 20px;">' . $row->coa . "</td>";
                    }
                } else {
                    if ($row->level == 5 || $row->level == null) {
                        echo '<td style="padding-left: 30px;">' . $row->coa . "</td>";
                    }
                }

                if ($row->normal == "INDUK" || $row->normal == null) {
                    echo '<td></td><td></td><td></td>';
                    if ($row->normal == null) {
                        echo '<td class="text-right">' . format_nominal($row->jumlah) . '</td>';
                    } else {
                        echo '<td></td>';
                    }
                } else { ?>
                    <td class="text-right"><?= format_nominal($row->trans_d) ?></td>
                    <td class="text-right"><?= format_nominal($row->trans_k) ?></td>
                    <td class="text-right"><?= format_nominal($jumlah) ?></td>
                    <td></td>
                <?php }
                ?>
            <tr>
            <?php endforeach; ?>
    </tbody>
</table>