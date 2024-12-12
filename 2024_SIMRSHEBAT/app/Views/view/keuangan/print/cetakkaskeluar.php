<?php
function penyebut($nilai)
{
    $nilai = abs($nilai);
    $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
    $temp = "";
    if ($nilai < 12) {
        $temp = " " . $huruf[$nilai];
    } else if ($nilai < 20) {
        $temp = penyebut($nilai - 10) . " Belas";
    } else if ($nilai < 100) {
        $temp = penyebut($nilai / 10) . " Puluh" . penyebut($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " Seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = penyebut($nilai / 100) . " Ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " Seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = penyebut($nilai / 1000) . " Ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = penyebut($nilai / 1000000) . " Juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = penyebut($nilai / 1000000000) . " Milyar" . penyebut(fmod($nilai, 1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = penyebut($nilai / 1000000000000) . " Trilyun" . penyebut(fmod($nilai, 1000000000000));
    }
    return $temp;
}

// function terbilang($nilai)
// {
//     if ($nilai < 0) {
//         $hasil = "Minus " . trim(penyebut($nilai));
//     } else {
//         $hasil = trim(penyebut($nilai));
//     }
//     return $hasil;
// }
?>
<html>

<body>
    <div>
        <table border='0' style='font-family: Arial, Helvetica, sans-serif;'>
            <tr>
                <td rowspan='5' style='align:center;'><img src='_assets/dist/img/darmayu.jpg' height='100px' width='100px'></td>
                <td style='width: 600px;text-align: center;font-weight: bold;font-size: 20px;letter-spacing: 2px;'>
                    RUMAH SAKIT UMUM DARMAYU
                </td>
            </tr>
            <tr>
                <td style='width: 650px;text-align: center;font-size: 12px;letter-spacing: 1px;'>Jl. Kapten Tendean No. 47, Kelurahan Demangan, Kecamatan Taman, Kota Madiun</td>
            </tr>
            <tr>
                <td style='width: 650px;text-align: center;font-size: 14px;font-weight: bold;letter-spacing: 1px;'>Telp 0351-4109999 | Email : rsudarmayumdn@yahoo.com</td>
            </tr>
        </table>
        <hr>
        <p style='text-align:center; font-weight: bold'>Bukti Pengeluaran Kas Bank</p>
        <table border='0' style='font-family: Arial, Helvetica, sans-serif; width:100%'>
            <tr>
                <td>Dibayarkan Kepada</td>
                <td>:</td>
                <td><?= $penerima ?></td>
                <td>Tanggal</td>
                <td>:</td>
                <td><?= date('d-m-Y', strtotime($tgl)) ?></td>
            </tr>
            <tr>
                <td>Uang Sebanyak</td>
                <td>:</td>
                <td><?= number_format($jumlah, 2, ",", ".") ?></td>
                <td>No Kas Bank</td>
                <td>:</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: right;">
                    <p style="font-style: italic; text-decoration:underline;"><?= penyebut($jumlah) ?> Rupiah</p>
                </td>
            </tr>
            <tr>
                <td colspan="6">Sebagai Pembayaran <?= $ket ?></td>
            </tr>
        </table>
        <table border='1' style='font-family: Arial, Helvetica, sans-serif;width:100%;border-collapse: collapse; margin-top: 3px;'>
            <tr>
                <th>No Akun</th>
                <th>Keterangan</th>
                <th>Jumlah</th>
            </tr>
            <?php
            $total = 0;
            foreach ($datadetail as $row) :
                $total += $row->debit;
            ?>
                <tr>
                    <td style="text-align: center; width: 100px"><?= $row->id_coa ?></td>
                    <td><?= $row->keterangan ?></td>
                    <td style="text-align: right"><?= number_format($row->debit, 2, ",", ".") ?></td>
                </tr>
            <?php endforeach ?>
            <tr>
                <td colspan="2">Lampiran: ............ Helai Bon / Kwintansi</td>
                <td style='text-align:right;'><?= number_format($total, 2, ",", ".") ?></td>
            </tr>
        </table>

        <p style='text-align:center; font-weight: bold'>Dibayar : <?= $kasbank ?></p>

        <table border='1' style='font-family: Arial, Helvetica, sans-serif;width:100%;border-collapse: collapse;'>
            <tr>
                <th>Dibuat/Dibayar Oleh,</th>
                <th>Disetujui Dibayar,</th>
                <th>Telah Diteliti,</th>
                <th>Yang Menerima,</th>
            </tr>
            <tr>
                <td style='height: 90px; vertical-align: bottom; text-align:center;'><?= $nama ?></td>
                <td style='height: 90px; vertical-align: bottom; text-align:center;'>drg. Priyo Langgeng Tribinuko, M.M.</td>
                <td style='height: 90px; vertical-align: bottom; text-align:center;'>Kiki Rismayati, S.E, M.E</td>
                <td style='height: 90px; vertical-align: bottom; text-align:center;'>..............</td>
            </tr>
        </table>
    </div>
</body>

</html>